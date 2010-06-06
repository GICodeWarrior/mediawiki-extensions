<?php

/**
 * File holding class MapsDistanceParser.
 *
 * @file Maps_DistanceParser.php
 * @ingroup Maps
 *
 * @author Jeroen De Dauw
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

/**
 * Static class for distance validation and parsing. Internal representatations are in meters.
 * 
 * @ingroup Maps
 * 
 * @author Jeroen De Dauw
 */
class MapsDistanceParser {
	
	private static $validatedDistanceUnit = false;
	
	/**
	 * Parses a distance optionaly containing a unit to a float value in meters.
	 * 
	 * @param string $distance
	 * 
	 * @return float The distance in meters.
	 */
	public static function parseDistance( $distance ) {
		if ( !self::isDistance( $distance ) ) {
			return false;
		}
		
		$matches = array();
		preg_match( '/^(\d+)((\.|,)(\d+))?\s*(.*)?$/', $distance, $matches );
		
		$value = (float)( $matches[1] . $matches[2] );
		$value *= self::getUnitRatio( $matches[5] );
		
		return $value;
	}
	
	/**
	 * Formats a given distance in meters to a distance in an optionaly specified notation.
	 * 
	 * @param float $meters
	 * @param string $unit
	 * @param integer $decimals
	 * 
	 * @return string
	 */
	public static function formatDistance( $meters, $unit = null, $decimals = 2 ) {
		$meters = round( $meters / self::getUnitRatio( $unit ), $decimals );
		return "$meters $unit";
	}
	
	/**
	 * Shortcut for converting from one unit to another.
	 * 
	 * @param string $distance
	 * @param string $unit
	 * @param integer $decimals
	 * 
	 * @return string
	 */
	public static function parseAndFormat( $distance, $unit = null, $decimals = 2 ) {
		return self::formatDistance( self::parseDistance( $distance ), $unit, $decimals );
	}
	
	/**
	 * Returns if the provided string is a valid distance.
	 * 
	 * @param string $distance
	 * 
	 * @return boolean
	 */
	public static function isDistance( $distance ) {
		return preg_match( '/^(\d+)((\.|,)(\d+))?\s*(.*)?$/', $distance );
	}
	
	/**
	 * Returns the unit to meter ratio in a safe way, by first resolving the unit.
	 * 
	 * @param string $unit
	 * 
	 * @return float
	 */
	public static function getUnitRatio( $unit = null ) {
		global $egMapsDistanceUnits;
		return $egMapsDistanceUnits[self::getValidUnit( $unit )];
	}
	
	/**
	 * Returns a valid unit. If the provided one is invalid, the default will be used.
	 * 
	 * @param string $unit
	 * 
	 * @return string
	 */
	public static function getValidUnit( $unit = null ) {
		global $egMapsDistanceUnit, $egMapsDistanceUnits;
		
		// This ensures the value for $egMapsDistanceUnit is correct, and caches the result.
		if ( !self::$validatedDistanceUnit ) {
			if ( !array_key_exists( $egMapsDistanceUnit, $egMapsDistanceUnits ) ) {
				$egMapsDistanceUnit = $egMapsDistanceUnits[0];
			}
			
			self::$validatedDistanceUnit = true;
		}		
		
		if ( $unit == null || !array_key_exists( $unit, $egMapsDistanceUnits ) ) {
			$unit = $egMapsDistanceUnit;
		}
		
		return $unit;
	}
	
	/**
	 * Returns a list of all suported units.
	 * 
	 * @return array
	 */
	public static function getUnits() {
		global $egMapsDistanceUnits;
		return array_keys( $egMapsDistanceUnits );
	}
	
}