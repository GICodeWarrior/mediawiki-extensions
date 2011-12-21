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

}
