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
	 * @return string
	 */
	public static function getDBTable() {
		return 'ep_mentors';
	}

	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	protected static function getFieldPrefix() {
		return 'mentor_';
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
		return array(); // TODO
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
