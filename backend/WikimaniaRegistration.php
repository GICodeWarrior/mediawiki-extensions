<?php
/* 
 * Class referring to a specific registration
 */

class WikimaniaRegistration {

	private static function fieldList() {
		return array(
		);
	}

	public static function getFields() {
		return array_keys( self::fieldList() );
	}

	public static function buildSchema() {

	}
}
