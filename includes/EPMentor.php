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
		return EPOrg::select(
			$fields,
			array( array( 'ep_mentors_per_org', 'mentor_id' ), $this->getId() ),
			array(),
			array( 'orgs' => array( 'INNER JOIN', array( array( array( 'ep_mentors_per_org', 'org_id' ), array( 'orgs', 'id' ) ) ) ) )
		);
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
		return array(); // TODO
	}

}
