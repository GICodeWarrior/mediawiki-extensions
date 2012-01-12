<?php

/**
 * Class representing a single term.
 * These are "instances" of a course in a certain period.
 *
 * @since 0.1
 *
 * @file EPTerm.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPTerm extends EPDBObject {

	/**
	 * Field for caching the linked course.
	 *
	 * @since 0.1
	 * @var EPCourse|false
	 */
	protected $course = false;

	/**
	 * Field for caching the linked org.
	 *
	 * @since 0.1
	 * @var EPOrg|false
	 */
	protected $org = false;

	/**
	 * Returns a list of statuses a term can have.
	 * Keys are messages, values are identifiers.
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	public static function getStatuses() {
		return array(
			wfMsg( 'ep-term-status-passed' ) => 'passed',
			wfMsg( 'ep-term-status-current' ) => 'current',
			wfMsg( 'ep-term-status-planned' ) => 'planned',
		);
	}

	/**
	 * Returns the message for the provided status identifier.
	 *
	 * @since 0.1
	 *
	 * @param string $status
	 *
	 * @return string
	 */
	public static function getStatusMessage( $status ) {
		static $map = null;

		if ( is_null( $map ) ) {
			$map = array_flip( self::getStatuses() );
		}

		return $map[$status];
	}

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
			'course_id' => 'id',
			'org_id' => 'id',

			'year' => 'int',
			'start' => 'str', // TS_MW
			'end' => 'str', // TS_MW
			'description' => 'str',
			'token' => 'str',
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::getDefaults()
	 */
	public static function getDefaults() {
		return array(
			'year' => substr( wfTimestamp( TS_MW ), 0, 4 ),
			'start' => wfTimestamp( TS_MW ),
			'end' => wfTimestamp( TS_MW ),
			'description' => '',
			'token' => '',
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::loadSummaryFields()
	 */
	public function loadSummaryFields( $summaryFields = null ) {
		if ( is_null( $summaryFields ) ) {
			$summaryFields = array( 'org_id' );
		}
		else {
			$summaryFields = (array)$summaryFields;
		}

		$fields = array();

		if ( in_array( 'org_id', $summaryFields ) ) {
			$fields['org_id'] = $this->getCourse( 'org_id' )->getField( 'org_id' );
		}

		$this->setFields( $fields );
	}

	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::insertIntoDB()
	 */
	protected function insertIntoDB() {
		if ( !$this->hasField( 'org_id' ) ) {
			$this->setField( 'org_id', $this->getCourse( 'org_id' )->getField( 'org_id' ) );
		}

		$success = parent::insertIntoDB();

		if ( $success && $this->updateSummaries ) {
			EPOrg::updateSummaryFields( array( 'terms', 'active' ), array( 'id' => $this->getField( 'org_id' ) ) );
			EPCourse::updateSummaryFields( 'active', array( 'id' => $this->getField( 'course_id' ) ) );
		}

		return $success;
	}

	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::removeFromDB()
	 */
	public function removeFromDB() {
		$id = $this->getId();

		if ( $this->updateSummaries ) {
			$this->loadFields( array( 'org_id', 'course_id' ) );
			$orgId = $this->getField( 'org_id' );
			$courseId = $this->getField( 'course_id' );
		}

		$success = parent::removeFromDB();

		if ( $success && $this->updateSummaries ) {
			EPCourse::updateSummaryFields( 'students', array( 'id' => $courseId ) );
			EPOrg::updateSummaryFields( array( 'terms', 'students', 'active' ), array( 'id' => $orgId ) );
		}

		if ( $success ) {
			$success = wfGetDB( DB_MASTER )->delete( 'ep_students_per_term', array( 'spt_term_id' => $id ) ) && $success;
		}

		return $success;
	}

	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::updateInDB()
	 */
	protected function updateInDB() {
		if ( $this->updateSummaries ) {
			$oldOrgId = $this->hasField( 'org_id' ) ? self::selectFieldsRow( 'org_id', array( 'id' => $this->getId() ) ) : false;
			$oldCourseId = $this->hasField( 'course_id' ) ? self::selectFieldsRow( 'course_id', array( 'id' => $this->getId() ) ) : false;
		}

		if ( $this->hasField( 'course_id' ) ) {
			$oldCourseId = self::selectFieldsRow( 'course_id', array( 'id' => $this->getId() ) );

			if ( $this->getField( 'course_id' ) !== $oldCourseId ) {
				$this->setField( 'org_id', EPCourse::selectFieldsRow( 'org_id', array( 'id' => $this->getField( 'course_id' ) ) ) );
			}
		}

		$success = parent::updateInDB();

		if ( $this->updateSummaries && $success ) {
			if ( $oldOrgId !== false && $oldOrgId !== $this->getField( 'org_id' ) ) {
				$conds = array( 'id' => array( $oldOrgId, $this->getField( 'org_id' ) ) );
				EPOrg::updateSummaryFields( array( 'terms', 'students', 'active' ), $conds );
			}

			if ( $oldCourseId !== false && $oldCourseId !== $this->getField( 'org_id' ) ) {
				$conds = array( 'id' => array( $oldCourseId, $this->getField( 'course_id' ) ) );
				EPCourse::updateSummaryFields( array( 'active', 'students' ), $conds );
			}
		}

		return $success;
	}

	/**
	 * Returns the course associated with this term.
	 *
	 * @since 0.1
	 *
	 * @param string|array|null $fields
	 *
	 * @return EPCourse
	 */
	public function getCourse( $fields = null ) {
		if ( $this->course === false ) {
			$this->course = EPCourse::selectRow( $fields, array( 'id' => $this->loadAndGetField( 'course_id' ) ) );
		}

		return $this->course;
	}

	/**
	 * Returns the org associated with this term.
	 *
	 * @since 0.1
	 *
	 * @param string|array|null $fields
	 *
	 * @return EPOrg
	 */
	public function getOrg( $fields = null ) {
		if ( $this->org === false ) {
			$this->org = EPOrg::selectRow( $fields, array( 'id' => $this->loadAndGetField( 'org_id' ) ) );
		}

		return $this->org;
	}

	/**
	 * Display a pager with terms.
	 *
	 * @since 0.1
	 *
	 * @param IContextSource $context
	 * @param array $conditions
	 */
	public static function displayPager( IContextSource $context, array $conditions = array() ) {
		$pager = new EPTermPager( $context, $conditions );

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
			$context->getOutput()->addWikiMsg( 'ep-terms-noresults' );
		}
	}

	/**
	 * Adds a control to add a term org to the provided context.
	 * Additional arguments can be provided to set the default values for the control fields.
	 *
	 * @since 0.1
	 *
	 * @param IContextSource $context
	 * @param array $args
	 *
	 * @return boolean
	 */
	public static function displayAddNewControl( IContextSource $context, array $args ) {
		if ( !$context->getUser()->isAllowed( 'epmentor' ) ) {
			return false;
		}

		$out = $context->getOutput();

		$out->addHTML( Html::openElement(
			'form',
			array(
				'method' => 'post',
				'action' => SpecialPage::getTitleFor( 'EditTerm' )->getLocalURL(),
			)
		) );

		$out->addHTML( '<fieldset>' );

		$out->addHTML( '<legend>' . wfMsgHtml( 'ep-terms-addnew' ) . '</legend>' );

		$out->addHTML( Html::element( 'p', array(), wfMsg( 'ep-terms-namedoc' ) ) );

		$out->addHTML( Html::element( 'label', array( 'for' => 'newcourse' ), wfMsg( 'ep-terms-newcourse' ) ) );

		$select = new XmlSelect(
			'newcourse',
			'newcourse',
			array_key_exists( 'course', $args ) ? $args['course'] : false
		);

		$select->addOptions( EPCourse::getCourseOptions( EPCourse::getEditableCourses( $context->getUser() ) ) );
		$out->addHTML( $select->getHTML() );

		$out->addHTML( '&#160;' . Xml::inputLabel( wfMsg( 'ep-terms-newyear' ), 'newyear', 'newyear', 10 ) );

		$out->addHTML( '&#160;' . Html::input(
			'addnewterm',
			wfMsg( 'ep-terms-add' ),
			'submit'
		) );

		$out->addHTML( Html::hidden( 'isnew', 1 ) );

		$out->addHTML( '</fieldset></form>' );

		return true;
	}

	/**
	 * Adds a control to add a new term to the provided context
	 * or show a message if this is not possible for some reason.
	 *
	 * @since 0.1
	 *
	 * @param IContextSource $context
	 * @param array $args
	 */
	public static function displayAddNewRegion( IContextSource $context, array $args = array() ) {
		$courses = EPCourse::getEditableCourses( $context->getUser() );

		if ( count( $courses ) > 0 ) {
			EPTerm::displayAddNewControl( $context, $args );
		}
		elseif ( $context->getUser()->isAllowed( 'epadmin' ) ) {
			$context->getOutput()->addWikiMsg( 'ep-terms-nocourses' );
		}
		elseif ( $context->getUser()->isAllowed( 'epmentor' ) ) {
			$context->getOutput()->addWikiMsg( 'ep-terms-addcoursefirst' );
		}
	}

	/**
	 * Returns if the provided user can manage the term or not.
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
				return $mentor->hasTerm( array( 'id' => $this->getId() ) );
			}
		}

		return false;
	}

	/**
	 * Gets the amount of days left, rounded up to the nearest integer.
	 *
	 * @since 0.1
	 *
	 * @return integer
	 */
	public function getDaysLeft() {
		$timeLeft = (int)wfTimestamp( TS_UNIX, $this->getField( 'end' ) ) - time();
		return (int)ceil( $timeLeft / ( 60 * 60 * 24 ) );
	}

	/**
	 * Gets the amount of days since term start, rounded up to the nearest integer.
	 *
	 * @since 0.1
	 *
	 * @return integer
	 */
	public function getDaysPassed() {
		$daysPassed = time() - (int)wfTimestamp( TS_UNIX, $this->getField( 'start' ) );
		return (int)ceil( $daysPassed / ( 60 * 60 * 24 ) );
	}

	/**
	 * Returns the status of the term.
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public function getStatus() {
		if ( $this->getDaysLeft() <= 0 ) {
			$status = 'passed';
		}
		elseif ( $this->getDaysPassed() <= 0 ) {
			$status = 'planned';
		}
		else {
			$status = 'current';
		}

		return $status;
	}

	/**
	 * Get a link to Special:Term/id.
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public function getLink() {
		return Linker::linkKnown(
			SpecialPage::getTitleFor( 'Term', $this->getId() ),
			htmlspecialchars( $this->getId() )
		);
	}

}
