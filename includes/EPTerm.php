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
		
			'year' => 'int',
			'start' => 'str', // TS_MW
			'end' => 'str', // TS_MW
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
		);
	}

}
