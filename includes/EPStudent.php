<?php

/**
 * Class representing a single student.
 *
 * @since 0.1
 *
 * @file EPStudent.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPStudent extends EPDBObject {

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
			'user_id' => 'id',

			'first_enroll' => 'str', // TS_MW

			'last_active' => 'str', // TS_MW
			'active_enroll' => 'bool',
		);
	}
	
	/**
	 * Get the student object of a user, or false if there is none.
	 * 
	 * @since 0.1
	 * 
	 * @param User $user
	 * @param string|array|null $fields
	 * 
	 * @return EPStudent|false
	 */
	public static function newFromUser( User $user, $fields = null ) {
		return self::selectRow( $fields, array( 'user_id' => $user->getId() ) );
	}

	/**
	 * Associate the student with the provided terms.
	 *
	 * @since 0.1
	 *
	 * @param array $terms
	 *
	 * @return bool
	 */
	public function associateWithTerms( array /* of EPTerm */ $terms ) {
		$dbw = wfGetDB( DB_MASTER );

		$success = true;

		$dbw->begin();

		foreach ( $terms as /* EPTerm */ $term ) {
			$success = $dbw->insert(
				'ep_students_per_term',
				array(
					'spt_student_id' => $this->getId(),
					'spt_term_id' => $term->getId(),
				)
			) && $success;
		}

		$dbw->commit();

		return $success;
	}

	/**
	 * Returns the orgs this mentor is part of.
	 * Caches the result when no conditions are provided and all fields are selected.
	 *
	 * @since 0.1
	 *
	 * @param string|array|null $fields
	 * @param array $conditions
	 *
	 * @return array of EPTerm
	 */
	public function getTerms( $fields = null, array $conditions = array() ) {
		if ( count( $conditions ) !== 0 ) {
			return $this->doGetTerms( $fields, $conditions );
		}

		if ( $this->terms === false ) {
			$terms = $this->doGetTerms( $fields, $conditions );

			if ( is_null( $fields ) ) {
				$this->terms = $terms;
			}

			return $terms;
		}
		else {
			return $this->terms;
		}
	}

	/**
	 * Returns the courses this student is linked to (via terms).
	 *
	 * @since 0.1
	 *
	 * @param string|null|array $fields
	 * @param array $conditions
	 * @param array $termConditions
	 *
	 * @return array of EPCourse
	 */
	public function getCourses( $fields = null, array $conditions = array(), array $termConditions = array() ) {
		$courseIds = array_reduce(
			$this->getTerms( 'course_id', $termConditions ),
			function( array $ids, EPTerm $term ) {
				$ids[] = $term->getField( 'course_id' );
				return $ids;
			},
			array()
		);

		if ( count( $courseIds ) < 1 ) {
			return array();
		}

		$conditions['id'] = array_unique( $courseIds );

		return EPCourse::select( $fields, $conditions );
	}

	/**
	 * Returns the courses this student is currently enrolled in.
	 *
	 * @since 0.1
	 *
	 * @param string|null|array $fields
	 * @param array $conditions
	 *
	 * @return array of EPCourse
	 */
	public function getCurrentCourses( $fields = null, array $conditions = array() ) {
		return $this->getCourses( $fields, $conditions, array(
			'end >= ' . wfGetDB( DB_SLAVE )->addQuotes( wfTimestampNow() )
		) );
	}

	/**
	 * Returns the courses this student was previously enrolled in.
	 *
	 * @since 0.1
	 *
	 * @param string|null|array $fields
	 * @param array $conditions
	 *
	 * @return array of EPCourse
	 */
	public function getPassedCourses( $fields = null, array $conditions = array() ) {
		return $this->getCourses( $fields, $conditions, array(
			'end < ' . wfGetDB( DB_SLAVE )->addQuotes( wfTimestampNow() )
		) );
	}

	/**
	 * Returns the terms this student is enrolled in.
	 *
	 * @since 0.1
	 *
	 * @param string|array|null $fields
	 * @param array $conditions
	 *
	 * @return array of EPTerm
	 */
	protected function doGetTerms( $fields, array $conditions ) {
		$conditions[] = array( array( 'ep_students', 'id' ), $this->getId() );

		return EPTerm::select(
			$fields,
			$conditions,
			array(),
			array(
				'ep_students_per_term' => array( 'INNER JOIN', array( array( array( 'ep_students_per_term', 'term_id' ), array( 'ep_terms', 'id' ) ) ) ),
				'ep_students' => array( 'INNER JOIN', array( array( array( 'ep_students_per_term', 'student_id' ), array( 'ep_students', 'id' ) ) ) )
			)
		);
	}

	/**
	 * Retruns if the mentor has any term matching the provided conditions.
	 *
	 * @since 0.1
	 *
	 * @param array $conditions
	 *
	 * @return boolean
	 */
	public function hasTerm( array $conditions = array() ) {
		return count( $this->getTerms( 'id', $conditions ) ) > 0;
	}

	/**
	 * Display a pager with students.
	 *
	 * @since 0.1
	 *
	 * @param IContextSource $context
	 * @param array $conditions
	 */
	public static function displayPager( IContextSource $context, array $conditions = array() ) {
		$pager = new EPStudentPager( $context, $conditions );

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
			$context->getOutput()->addWikiMsg( 'ep-students-noresults' );
		}
	}
	
}
