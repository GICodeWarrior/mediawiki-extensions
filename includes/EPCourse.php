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
			$this->getTitle(),
			htmlspecialchars( $this->getField( 'name' ) )
		);
	}
	
	/**
	 * Get the title of Special:Course/name.
	 *
	 * @since 0.1
	 *
	 * @return Title
	 */
	public function getTitle() {
		return SpecialPage::getTitleFor( 'Course', $this->getField( 'name' ) );
	}
	
	/**
	 * Returns the instructors as a list of EPInstructor objects.
	 * 
	 * @since 0.1
	 * 
	 * @return array of EPInstructor
	 */
	public function getInstructors() {
		if ( $this->instructors === false ) {
			$this->instructors = array();
			
			foreach ( $this->getField( 'instructors' ) as $userId ) {
				$this->instructors[] = EPInstructor::newFromId( $userId );
			}
		}

		return $this->instructors;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::setField()
	 */
	public function setField( $name, $value ) {
		if ( $name === 'instructors' ) {
			$this->instructors = false;
		}
		elseif ( $name === 'org_id' ) {
			$this->org = false;
		}
		
		parent::setField( $name, $value );
	}
	
	/**
	 * Adds a number of instructors to this course,
	 * by default also saving the course and only
	 * logging the adittion of the instructors.
	 * 
	 * @since 0.1
	 * 
	 * @param array|integer $newInstructors
	 * @param string $message
	 * @param boolean $save
	 * @param boolean $log
	 * 
	 * @return boolean Success indicator
	 */
	public function addInstructors( $newInstructors, $message = '', $save = true, $log = true ) {
		$instructors = $this->getField( 'instructors' );
		$addedInstructors = array();
		
		foreach ( (array)$newInstructors as $userId ) {
			if ( !is_integer( $userId ) ) {
				throw new MWException( 'Provided user id is not an integer' );
			}
			
			if ( !in_array( $userId, $instructors ) ) {
				$instructors[] = $userId;
				$addedInstructors[] = $userId;
			}
		}
		
		if ( count( $addedInstructors ) > 0 ) {
			$this->setField( 'instructors', $instructors );
			
			$success = true;
			
			if ( $save ) {
				$this->disableLogging();
				$success = $this->writeToDB();
				$this->enableLogging();
			}
			
			if ( $success && $log ) {
				$this->logInstructorChange( 'add', $addedInstructors, $message );
			}
			
			return $success;
		} 
		else {
			return true;
		}
	}
	
	/**
	 * Remove a number of instructors to this course,
	 * by default also saving the course and only
	 * logging the removal of the instructors.
	 * 
	 * @since 0.1
	 * 
	 * @param array|integer $sadInstructors
	 * @param string $message
	 * @param boolean $save
	 * @param boolean $log
	 * 
	 * @return boolean Success indicator
	 */
	public function removeInstructors( $sadInstructors, $message = '', $save = true, $log = true ) {
		$removedInstructors = array();
		$remaimingInstructors = array();
		$sadInstructors = (array)$sadInstructors;
		
		foreach ( $this->getField( 'instructors' ) as $userId ) {
			if ( in_array( $userId, $sadInstructors ) ) {
				$removedInstructors[] = $userId;
			}
			else {
				$remaimingInstructors[] = $userId;
			}
		}
		
		if ( count( $removedInstructors ) > 0 ) {
			$this->setField( 'instructors', $remaimingInstructors );
			
			$success = true;
		
			if ( $save ) {
				$this->disableLogging();
				$success = $this->writeToDB();
				$this->enableLogging();
			}
			
			if ( $success && $log ) {
				$this->logInstructorChange( 'remove', $removedInstructors, $message );
			}
			
			return $success;
		}
		else {
			return true;
		}
	}

	/**
	 * Log a change of the instructors of the course.
	 * 
	 * @since 0.1
	 * 
	 * @param string $action
	 * @param array $instructors
	 * @param string $message
	 */
	protected function logInstructorChange( $action, array $instructors, $message ) {
		$names = array();
		
		foreach ( $instructors as $userId ) {
			$names[] = EPInstructor::newFromId( $userId )->getName();
		}
		
		$info = array(
			'type' => 'instructor',
			'subtype' => $action,
			'title' => $this->getTitle(),
			'parameters' => array(
				'4::instructorcount' => count( $names ),
				'5::instructors' => $GLOBALS['wgLang']->listToText( $names )
			),
		);
		
		if ( $message !== '' ) {
			$info['comment'] = $message;
		}
		
		EPUtils::log( $info );
	}

}
