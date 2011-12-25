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
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
	 * 
	 * @return array of EPOrg
	 */
	public function getOrgs( array $fields = null ) {
		if ( $this->orgs === false ) {
			$this->orgs = EPOrg::select(
				$fields,
				array( array( 'ep_mentors_per_org', 'mentor_id' ), $this->getId() ),
				array(),
				array( 'orgs' => array( 'INNER JOIN', array( array( array( 'ep_mentors_per_org', 'org_id' ), array( 'orgs', 'id' ) ) ) ) )
			);
		}
		
		return $this->orgs;
	}
	
	/**
	 * Retruns the courses this mentor can manage. 
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
	 * 
	 * @return array of EPCourse
	 */
	public function getCourses( array $fields = null ) {
		return array_reduce( $this->getOrgs(), function( array $courses, EPOrg $org ) use ( $fields ) {
			return array_merge( $courses, $org->getCourses( $fields ) );
		}, array() );
	}
	
	/**
	 * Retruns the terms this mentor can manage. 
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
	 * 
	 * @return array of EPTerm
	 */
	public function getTerms( array $fields = null ) {
		return array_reduce( $this->getOrgs(), function( array $terms, EPOrg $org ) use ( $fields ) {
			return array_merge( $terms, $org->getTerms( $fields ) );
		}, array() );
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
		return true; // TODO
	}
	
	/**
	 * Retruns if the mentor has any term matching the provided contitions. 
	 * 
	 * @since 0.1
	 * 
	 * @param array $conditions
	 * 
	 * @return boolean
	 */
	public function hasTerm( array $conditions = array() ) {
		return true; // TODO
	}

}
