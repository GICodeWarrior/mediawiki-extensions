<?php

/**
 * Class representing a single organization/institution.
 *
 * @since 0.1
 *
 * @file EPOrg.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPOrg extends EPDBObject {

	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public static function getDBTable() {
		return 'ep_orgs';
	}

	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	protected static function getFieldPrefix() {
		return 'org_';
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
		);
	}

}
