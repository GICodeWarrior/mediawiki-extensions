<?php

/**
 * Class representing a single course.
 * These describe a specific course, time-independent.
 *
 * @since 0.1
 *
 * @file EPCourse.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPCourse extends EPDBObject {

	/**
	 * Field for caching the linked org.
	 * 
	 * @since 0.1
	 * @var EPOrg|false
	 */
	protected $org = false;
	
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
			'org_id' => 'id',
		
			'name' => 'str',
			'description' => 'str',
			'lang' => 'str',

			'students' => 'int',
		);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::getDefaults()
	 */
	public static function getDefaults() {
		return array(
			'description' => '',
		);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::removeFromDB()
	 */
	public function removeFromDB() {
		$id = $this->getId();
		
		$success = parent::removeFromDB();
		
		if ( $success ) {
			foreach ( EPTerm::select( 'id', array( 'course_id' => $id ) ) as /* EPTerm */ $term ) {
				$success = $term->removeFromDB() && $success;
			}
		}
		
		return $success;
	}
	
	/**
	 * Returns the org associated with this course.
	 * 
	 * @since 0.1
	 * 
	 * @param string|array|null $fields
	 * 
	 * @return EPOrg
	 */
	public function getOrg( $fields = null ) {
		if ( $this->org === false ) {
			$this->org = EPOrg::selectRow( $fields, array( 'id' => $this->getField( 'org_id' ) ) );
		}
		
		return $this->org;
	}
	
	/**
	 * Returns a list of courses in an array that can be fed to select inputs.
	 * 
	 * @since 0.1
	 * 
	 * @param array $orgs
	 * 
	 * @return array
	 */
	public static function getCourseOptions( array /* EPCourse */ $courses ) {
		$options = array();
		
		foreach ( $courses as /* EPCourse */ $course ) {
			$options[$course->getField( 'name' )] = $course->getId(); 
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
	 * @return array of EPCourse
	 */
	public static function getEditableCourses( $user, array $fields = null ) {
		static $cache = array();
		
		if ( is_int( $user ) ) {
			$userId = $user;
		}
		else {
			$userId = $user->getId();
		}
		
		if ( !array_key_exists( $userId, $cache ) ) {
			if ( is_int( $user ) ) {
				$user = User::newFromId( $userId );
			}
			
			$courses = array();
			
			if ( $user->isAllowed( 'epadmin' ) ) {
				$courses = self::select( $fields );
			}
			elseif ( $user->isAllowed( 'epmentor' ) ) {
				$mentor = EPMentor::select( array( 'user_id' => $user->getId() ) );
				
				if ( $mentor !== false ) {
					$courses = $mentor->getCourses( $fields );
				}
			}
			
			$cache[$userId] = $courses;
		}
		
		return $cache[$userId];
	}
	
	/**
	 * Adds a control to add a new course to the provided context.
	 * Additional arguments can be provided to set the default values for the control fields.
	 * 
	 * @since 0.1
	 * 
	 * @param IContextSource $context
	 * @param array $args
	 * 
	 * @return boolean
	 */
	public static function displayAddNewControl( IContextSource $context, array $args = array() ) {
		if ( !$context->getUser()->isAllowed( 'epmentor' ) ) {
			return false;
		}
		
		$out = $context->getOutput();

		$out->addHTML( Html::openElement(
			'form',
			array(
				'method' => 'post',
				'action' => SpecialPage::getTitleFor( 'EditCourse' )->getLocalURL(),
			)
		) );

		$out->addHTML( '<fieldset>' );

		$out->addHTML( '<legend>' . wfMsgHtml( 'ep-courses-addnew' ) . '</legend>' );

		$out->addHTML( Html::element( 'p', array(), wfMsg( 'ep-courses-namedoc' ) ) );

		$out->addHTML( Html::element( 'label', array( 'for' => 'neworg' ), wfMsg( 'ep-courses-neworg' ) ) );
		
		$out->addHTML( '&#160;' );
		
		$select = new XmlSelect(
			'neworg',
			'neworg',
			array_key_exists( 'org', $args ) ? $args['org'] : false
		);
		
		$select->addOptions( EPOrg::getOrgOptions( EPOrg::getEditableOrgs( $context->getUser() ) ) );
		$out->addHTML( $select->getHTML() );
		
		$out->addHTML( '&#160;' );
		
		$out->addHTML( Xml::inputLabel(
			wfMsg( 'ep-courses-newname' ),
			'newname',
			'newname',
			false,
			array_key_exists( 'name', $args ) ? $args['name'] : false
		) );

		$out->addHTML( '&#160;' );
		
		$out->addHTML( Html::input(
			'addneworg',
			wfMsg( 'ep-courses-add' ),
			'submit'
		) );

		$out->addHTML( Html::hidden( 'newEditToken', $context->getUser()->editToken() ) );

		$out->addHTML( '</fieldset></form>' );
		
		return true;
	}
	
	/**
	 * Adds a control to add a new course to the provided context
	 * or show a message if this is not possible for some reason.
	 * 
	 * @since 0.1
	 * 
	 * @param IContextSource $context
	 * @param array $args
	 */
	public static function displayAddNewRegion( IContextSource $context, array $args = array() ) {
		$orgs = EPOrg::getEditableOrgs( $context->getUser() );
		
		if ( count( $orgs ) > 0 ) {
			EPCourse::displayAddNewControl( $context, $args );
		}
		elseif ( $context->getUser()->isAllowed( 'epadmin' ) ) {
			$context->getOutput()->addWikiMsg( 'ep-courses-noorgs' );
		}
		elseif ( $context->getUser()->isAllowed( 'epmentor' ) ) {
			$context->getOutput()->addWikiMsg( 'ep-courses-addorgfirst' );
		}
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
		$pager = new EPCoursePager( $context, $conditions );
		
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
			$context->getOutput()->addWikiMsg( 'ep-courses-noresults' );
		}
	}
	
	/**
	 * Returns if the provided user can manage the course or not.
	 * 
	 * @since 0.1
	 * 
	 * @param User $user
	 * 
	 * @return boolean
	 */
	public function useCanManage( User $user ) {
		if ( $user->isAllowed( 'epadmin' ) ) {
			return true;
		}
		
		if ( $user->isAllowed( 'epmentor' ) ) {
			$mentor = EPMentor::selectRow( 'id', array( 'user_id' => $user->getId() ) );
			
			if ( $mentor !== false ) {
				return $mentor->hasCourse( array( 'id' => $this->getId() ) );
			}
		}
		
		return false;
	}

}
