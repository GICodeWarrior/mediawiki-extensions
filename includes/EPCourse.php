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
	 * Field for caching the instructors.
	 *
	 * @since 0.1
	 * @var {array of EPInstructor}|false
	 */
	protected $instructors = false;
	
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
			'instructors' => 'array',

			'active' => 'bool',
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

			'active' => false,
			'students' => 0,
			'instructors' => array(),
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::loadSummaryFields()
	 */
	public function loadSummaryFields( $summaryFields = null ) {
		if ( is_null( $summaryFields ) ) {
			$summaryFields = array( 'students', 'active' );
		}
		else {
			$summaryFields = (array)$summaryFields;
		}

		$fields = array();

		if ( in_array( 'students', $summaryFields ) ) {
			$termIds = EPTerm::selectFields( 'id', array( 'course_id' => $this->getId() ) );

			if ( count( $termIds ) > 0 ) {
				$fields['students'] = wfGetDB( DB_SLAVE )->select(
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

		if ( in_array( 'active', $summaryFields ) ) {
			$now = wfGetDB( DB_SLAVE )->addQuotes( wfTimestampNow() );

			$fields['active'] = EPTerm::has( array(
				'course_id' => $this->getId(),
				'end >= ' . $now,
				'start <= ' . $now,
			) );
		}

		$this->setFields( $fields );
	}

	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::removeFromDB()
	 */
	public function removeFromDB() {
		$id = $this->getId();

		if ( $this->updateSummaries ) {
			$this->loadFields( array( 'org_id' ) );
			$orgId = $this->getField( 'org_id', false );
		}

		$success = parent::removeFromDB();

		if ( $success ) {
			foreach ( EPTerm::select( 'id', array( 'course_id' => $id ) ) as /* EPTerm */ $term ) {
				$term->setUpdateSummaries( false );
				$success = $term->removeFromDB() && $success;
			}
		}

		if ( $this->updateSummaries && $orgId !== false ) {
			EPOrg::updateSummaryFields( array( 'terms', 'students', 'courses', 'active' ), array( 'id' => $orgId ) );
		}

		return $success;
	}

	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::insertIntoDB()
	 */
	protected function insertIntoDB() {
		$success = parent::insertIntoDB();

		if ( $this->updateSummaries ) {
			EPOrg::updateSummaryFields( array( 'courses', 'active' ), array( 'id' => $this->getField( 'org_id' ) ) );
		}

		return $success;
	}

	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::updateInDB()
	 */
	protected function updateInDB() {
		$oldOrgId = $this->hasField( 'org_id' ) ? self::selectFieldsRow( 'org_id', array( 'id' => $this->getId() ) ) : false;

		$success = parent::updateInDB();

		if ( $this->updateSummaries && $success && $oldOrgId !== false && $oldOrgId !== $this->getField( 'org_id' ) ) {
			$conds = array( 'id' => array( $oldOrgId, $this->getField( 'org_id' ) ) );
			EPTerm::updateSummaryFields( 'org_id', array( 'course_id' => $this->getId() ) );
			EPOrg::updateSummaryFields( array( 'terms', 'students', 'courses', 'active' ), $conds );
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
	 * @param array|null $courses
	 *
	 * @return array
	 */
	public static function getCourseOptions( array /* EPCourse */ $courses = null ) {
		$options = array();

		if ( is_null( $courses ) ) {
			$courses = EPCourse::select( array( 'name', 'id' ) );
		}
		
		foreach ( $courses as /* EPCourse */ $course ) {
			$options[$course->getField( 'name' )] = $course->getId();
		}

		return $options;
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
		if ( !$context->getUser()->isAllowed( 'ep-course' ) ) {
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

		$select->addOptions( EPOrg::getOrgOptions() );
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

		$out->addHTML( Html::hidden( 'isnew', 1 ) );

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
		if ( EPOrg::has() ) {
			EPCourse::displayAddNewControl( $context, $args );
		}
		elseif ( $context->getUser()->isAllowed( 'ep-org' ) ) {
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
	 * Get a link to Special:Course/name.
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public function getLink() {
		return Linker::linkKnown(
			SpecialPage::getTitleFor( 'Course', $this->getField( 'name' ) ),
			htmlspecialchars( $this->getField( 'name' ) )
		);
	}
	
	/**
	 * Returns the instructors as a list of EPInstructor objects.
	 * 
	 * @since 0.1
	 * 
	 * @return array of EPInstructor
	 */
	public function getInstructors() {
		$this->setField( 'instructors', array( 1 ) );
		
		if ( $this->instructors === false ) {
			$this->instructors = array();
			
			foreach ( $this->getField( 'instructors' ) as $userId ) {
				$this->instructors[] = EPInstructor::newFromId( $userId );
			}
		}

		return $this->instructors;
	}

}
