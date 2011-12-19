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
	 * Returns a lift of courses that can be administered by the provided user.
	 * 
	 * @since 0.1
	 * 
	 * @param User|int $user User object or user id
	 * 
	 * @return array of EPCourse
	 */
	public static function getCoursesForAdmin( $user ) {
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
				$courses = self::select();
			}
			elseif ( $user->isAllowed( 'epmentor' ) ) {
				$mentor = EPMentor::select( array( 'user_id' => $user->getId() ) );
				
				if ( $mentor !== false ) {
					$courses = $mentor->getCourses();
				}
			}
			
			$cache[$userId] = $courses;
		}
		
		return $cache[$userId];
	}

}
