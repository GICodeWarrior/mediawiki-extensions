<?php

/**
 * Class representing a single mentor.
 *
 * @since 0.1
 *
 * @file EPMentor.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPMentor extends EPDBObject {

	/**
	 * Cached array of the linked EPOrg objects.
	 * 
	 * @since 0.1
	 * @var array|false
	 */
	protected $orgs = false;
	
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
		);
	}
	
	/**
	 * Returns the orgs this mentor is part of.
	 * Caches the result when no conditions are provided and all fields are selected.
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
	 * @param array $conditions
	 * 
	 * @return array of EPOrg
	 */
	public function getOrgs( array $fields = null, array $conditions = array() ) {
		if ( count( $conditions ) !== 0 ) {
			return $this->doGetOrgs( $fields, $conditions );
		}
		
		if ( $this->orgs === false ) {
			$orgs = $this->doGetOrgs( $fields, $conditions );
			
			if ( is_null( $fields ) ) {
				$this->orgs = $orgs;
			}

			return $orgs;
		}
		else {
			return $this->orgs;
		}
	}
	
	/**
	 * Returns the orgs this mentor is part of.
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
	 * @param array $conditions
	 * 
	 * @return array of EPOrg
	 */
	protected function doGetOrgs( $fields, array $conditions ) {
		$conditions = array_merge(
			array( array( 'ep_mentors', 'id' ), $this->getId() ),
			$conditions
		);
		
		return EPOrg::select(
			$fields,
			$conditions,
			array(),
			array(
				'ep_mentors_per_org' => array( 'INNER JOIN', array( array( array( 'ep_mentors_per_org', 'org_id' ), array( 'orgs', 'id' ) ) ) ),
				'ep_mentors' => array( 'INNER JOIN', array( array( array( 'ep_mentors_per_org', 'mentor_id' ), array( 'ep_mentors', 'id' ) ) ) )
			)
		);
	}
	
	/**
	 * Retruns the courses this mentor can manage. 
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
	 * @param array $conditions
	 * 
	 * @return array of EPCourse
	 */
	public function getCourses( array $fields = null, array $conditions = array() ) {
		return array_reduce(
			$this->getOrgs( $fields, $conditions ),
			function( array $courses, EPOrg $org ) use ( $fields ) {
				return array_merge( $courses, $org->getCourses( $fields ) );
			},
			array()
		);
	}
	
	/**
	 * Retruns the terms this mentor can manage. 
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
	 * @param array $conditions
	 * 
	 * @return array of EPTerm
	 */
	public function getTerms( array $fields = null, array $conditions = array() ) {
		return array_reduce(
			$this->getOrgs( $fields, $conditions ),
			function( array $terms, EPOrg $org ) use ( $fields ) {
				return array_merge( $terms, $org->getTerms( $fields ) );
			}, 
			array()
		);
	}
	
	/**
	 * Retruns if the mentor has any course matching the provided contitions. 
	 * 
	 * @since 0.1
	 * 
	 * @param array $conditions
	 * 
	 * @return boolean
	 */
	public function hasCourse( array $conditions = array() ) {
		return count( $this->getCourses( 'id', $conditions ) ) > 0;
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

}
