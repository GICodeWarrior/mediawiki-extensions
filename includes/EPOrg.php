<?php

/**
 * Class representing a single organization/institution.
 *
 * @since 0.1
 *
 * @file EPOrg.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPOrg extends EPDBObject {

	/**
	 * Cached array of the linked EPCourse objects.
	 * 
	 * @since 0.1
	 * @var array|false
	 */
	protected $courses = false;
	
	/**
	 * Cached array of the linked EPTerm objects.
	 * 
	 * @since 0.1
	 * @var array|false
	 */
	protected $terms = false;
	
	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	protected static function getFieldTypes() {
		return array(
			'id' => 'id',
			
			'name' => 'str',
			'city' => 'str',
			'country' => 'str',

			'courses' => 'int',
			'terms' => 'int',
			'mentors' => 'int',
			'students' => 'int',
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::getDefaults()
	 */
	public static function getDefaults() {
		return array(
			'name' => '',
			'city' => '',
			'country' => '',

			'courses' => 0,
			'terms' => 0,
			'mentors' => 0,
			'students' => 0,
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::loadSummaryFields()
	 */
	public function loadSummaryFields( $summaryFields = null ) {
		if ( is_null( $summaryFields ) ) {
			$summaryFields = array( 'courses', 'terms', 'mentors', 'students' );
		}
		else {
			$summaryFields = (array)$summaryFields;
		}

		$fields = array();

		if ( in_array( 'courses', $summaryFields ) ) {
			$fields['courses'] = EPCourse::count( array( 'org_id' => $this->getId() ) );
		}

		if ( in_array( 'terms', $summaryFields ) ) {
			$fields['terms'] = EPTerm::count( array( 'org_id' => $this->getId() ) );
		}

		$dbr = wfGetDB( DB_SLAVE );

		if ( in_array( 'mentors', $summaryFields ) ) {
			$fields['mentors'] = $dbr->select(
				'ep_mentors_per_org',
				'COUNT(*) AS rowcount',
				array( 'mpo_org_id' => $this->getId() )
			);

			$fields['mentors'] = $fields['mentors']->rowcount;
		}

		if ( in_array( 'students', $summaryFields ) ) {
			$termIds = EPTerm::selectFields( 'id', array( 'org_id' => $this->getId() ) );

			if ( count( $termIds ) > 0 ) {
				$fields['students'] = $dbr->select(
					'ep_students_per_term',
					'COUNT(*) AS rowcount',
					array( 'spt_term_id' => $termIds )
				);

				$fields['students'] = $fields['students']->fetchObject()->rowcount;
			}
			else {
				$fields['students'] = 0;
			}
		}

		$this->setFields( $fields );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::removeFromDB()
	 */
	public function removeFromDB() {
		$id = $this->getId();
		
		$success = parent::removeFromDB();
		
		if ( $success ) {
			$success = wfGetDB( DB_MASTER )->delete( 'ep_mentors_per_org', array( 'mpo_org_id' => $id ) ) && $success;
			
			foreach ( EPCourse::select( 'id', array( 'org_id' => $id ) ) as /* EPCourse */ $course ) {
				$success = $course->removeFromDB() && $success;
			}
		}
		
		return $success;
	}
	
	/**
	 * Returns a list of orgs in an array that can be fed to select inputs.
	 * 
	 * @since 0.1
	 * 
	 * @param array $orgs
	 * 
	 * @return array
	 */
	public static function getOrgOptions( array /* EPOrg */ $orgs ) {
		$options = array();
		
		foreach ( $orgs as /* EPOrg */ $org ) {
			$options[$org->getField( 'name' )] = $org->getId(); 
		}
		
		return $options;
	}
	
	/**
	 * Returns the list of orgs that the specified user can edit.
	 * 
	 * @since 0.1
	 * 
	 * @param User|int $user
	 * @param array|null $fields
	 * 
	 * @return array of EPOrg
	 */
	public static function getEditableOrgs( $user, array $fields = null ) {
		if ( is_int( $user ) ) {
			$userId = $user;
			$user = User::newFromId( $user );
		}
		else {
			$userId = $user->getId();
		}
		
		if ( $user->isAllowed( 'epadmin' ) ) {
			return self::select( $fields );
		}
		elseif ( $user->isAllowed( 'epmentor' ) ) {
			$mentor = EPMentor::selectRow( 'id', array( 'user_id' => $userId ) );
			return $mentor === false ? array() : $mentor->getOrgs( $fields );
		}
		else {
			return array();
		}
	}
	
	/**
	 * Adds a control to add a new org to the provided context.
	 * Adittional arguments can be provided to set the default values for the control fields.
	 * 
	 * @since 0.1
	 * 
	 * @param IContextSource $context
	 * @param array $args
	 * 
	 * @return boolean
	 */
	public static function displayAddNewControl( IContextSource $context, array $args = array() ) {
		if ( !$context->getUser()->isAllowed( 'epadmin' ) ) {
			return false;
		}
		
		$out = $context->getOutput();
		
		$out->addHTML( Html::openElement(
			'form',
			array(
				'method' => 'post',
				'action' => SpecialPage::getTitleFor( 'EditInstitution' )->getLocalURL(),
			)
		) );

		$out->addHTML( '<fieldset>' );

		$out->addHTML( '<legend>' . wfMsgHtml( 'ep-institutions-addnew' ) . '</legend>' );

		$out->addHTML( Html::element( 'p', array(), wfMsg( 'ep-institutions-namedoc' ) ) );

		$out->addHTML( Xml::inputLabel(
			wfMsg( 'ep-institutions-newname' ),
			'newname',
			'newname',
			false,
			array_key_exists( 'name', $args ) ? $args['name'] : false
		) );

		$out->addHTML( '&#160;' . Html::input(
			'addneworg',
			wfMsg( 'ep-institutions-add' ),
			'submit'
		) );

		$out->addHTML( Html::hidden( 'isnew', 1 ) );

		$out->addHTML( '</fieldset></form>' );
		
		return true;
	}
	
	/**
	 * Display a pager with courses.
	 * 
	 * @since 0.1
	 * 
	 * @param IContextSource $context
	 * @param array $conditions
	 */
	public static function displayPager( IContextSource $context, array $conditions = array() ) {
		$pager = new EPOrgPager( $context, $conditions );
		
		if ( $pager->getNumRows() ) {
			$context->getOutput()->addHTML(
				$pager->getFilterControl() .
				$pager->getNavigationBar() .
				$pager->getBody() .
				$pager->getNavigationBar() .
				$pager->getMultipleItemControl()
			);
		}
		else {
			$context->getOutput()->addHTML( $pager->getFilterControl( true ) );
			$context->getOutput()->addWikiMsg( 'ep-institutions-noresults' );
		}
	}
	
	/**
	 * Retruns the courses linked to this org. 
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
	 * 
	 * @return array of EPCourse
	 */
	public function getCourses( array $fields = null ) {
		if ( $this->courses === false ) {
			$this->courses = EPCourse::select( $fields, array( 'org_id' => $this->getId() ) );
		}
		
		return $this->courses;
	}
	
	/**
	 * Retruns the terms linked to this org. 
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
	 * 
	 * @return array of EPTerm
	 */
	public function getTerms( array $fields = null ) {
		if ( $this->terms === false ) {
			$this->terms = EPTerm::select( $fields, array( 'org_id' => $this->getId() ) );
		}
		
		return $this->terms;
	}
	
}
