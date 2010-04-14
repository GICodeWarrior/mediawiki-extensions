<?php

/**
 * This groupe contains all Google Maps v3 related files of the Maps extension.
 * 
 * @defgroup MapsGoogleMaps3 Google Maps v3
 * @ingroup Maps
 */

/**
 * This file holds the general information for the Google Maps v3 service.
 *
 * @file Maps_GoogleMaps3.php
 * @ingroup MapsGoogleMaps3
 *
 * @author Jeroen De Dauw
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

$wgAutoloadClasses['MapsGoogleMaps3'] = dirname( __FILE__ ) . '/Maps_GoogleMaps3.php';

$wgHooks['MappingServiceLoad'][] = 'MapsGoogleMaps3::initialize';

$wgAutoloadClasses['MapsGoogleMaps3DispMap'] = dirname( __FILE__ ) . '/Maps_GoogleMaps3DispMap.php';

$egMapsServices[MapsGoogleMaps3::SERVICE_NAME] = array(
	'aliases' => array( 'google3', 'googlemap3', 'gmap3', 'gmaps3' ),
	'features' => array(
		'display_map' => 'MapsGoogleMaps3DispMap',
	)
);	

/**
 * Class for Google Maps v3 initialization.
 * 
 * @ingroup MapsGoogleMaps3
 * 
 * @author Jeroen De Dauw
 */
class MapsGoogleMaps3 {
	
	const SERVICE_NAME = 'googlemaps3';
	
	public static function initialize() {
		global $wgAutoloadClasses, $egMapsServices;

		self::initializeParams();
		
		Validator::addOutputFormat( 'gmap3type', array( 'MapsGoogleMaps3', 'setGMapType' ) );
		Validator::addOutputFormat( 'gmap3types', array( 'MapsGoogleMaps3', 'setGMapTypes' ) );
		
		return true;
	}
	
	private static function initializeParams() {
		global $egMapsServices, $egMapsGMaps3Type, $egMapsGMaps3Types;
		
		$allowedTypes = self::getTypeNames();
		
		$egMapsServices[self::SERVICE_NAME]['parameters'] = array(
			'type' => array(
				'aliases' => array( 'map-type', 'map type' ),
				'criteria' => array(
					'in_array' => $allowedTypes
				),
				'default' => $egMapsGMaps3Type, // FIXME: default value should not be used when not present in types parameter.
				'output-type' => 'gmap3type'
			),
				/*
			'types' => array(
				'type' => array('string', 'list'),
				'aliases' => array('map-types', 'map types'),
				'criteria' => array(
					'in_array' => $allowedTypes
				),
				'default' => $egMapsGMaps3Types,
				'output-types' => array('gmap3types', 'list')				
			),	
				*/
		);
	}
	
	private static $mapTypes = array(
		'normal' => 'ROADMAP',
		'roadmap' => 'ROADMAP',
		'satellite' => 'SATELLITE',
		'hybrid' => 'HYBRID',
		'terrain' => 'TERRAIN',
		'physical' => 'TERRAIN'
	);
	
	/**
	 * Returns the names of all supported map types.
	 * 
	 * @return array
	 */
	public static function getTypeNames() {
		return array_keys( self::$mapTypes );
	}
	
	/**
	 * Changes the map type name into the corresponding Google Maps API v3 identifier.
	 *
	 * @param string $type
	 * 
	 * @return string
	 */
	public static function setGMapType( &$type ) {
		$type = 'google.maps.MapTypeId.' . self::$mapTypes[ $type ];
	}
	
	/**
	 * Changes the map type names into the corresponding Google Maps API v3 identifiers.
	 * 
	 * @param array $types
	 * 
	 * @return array
	 */
	public static function setGMapTypes( array &$types ) {
		for ( $i = count( $types ) - 1; $i >= 0; $i-- ) {
			self::setGMapType( $types[$i] );
		}
	}
	
	/**
	 * Add references to the Google Maps API v3 and required JS file to the provided output 
	 *
	 * @param string $output
	 */
	public static function addGMap3Dependencies( &$output ) {
		global $wgJsMimeType, $wgLang;
		global $egMapsScriptPath, $egGMaps3OnThisPage, $egMapsStyleVersion, $egMapsJsExt;

		if ( empty( $egGMaps3OnThisPage ) ) {
			$egGMaps3OnThisPage = 0;

			$languageCode = self::getMappedLanguageCode( $wgLang->getCode() );
			$output .= "<script type='$wgJsMimeType' src='http://maps.google.com/maps/api/js?sensor=false&amp;language={$languageCode}'></script><script type='$wgJsMimeType' src='$egMapsScriptPath/GoogleMaps3/GoogleMap3Functions{$egMapsJsExt}?$egMapsStyleVersion'></script>";
		}
	}
	
	/**
	 * Maps language codes to Google Maps API v3 compatible values.
	 * 
	 * @param string $code
	 * 
	 * @return string The mapped code
	 */
	private static function getMappedLanguageCode( $code ) {
		$mappings = array(
	         'en_gb' => 'en-gb',// v3 supports en_gb - but wants us to call it en-gb
	         'he' => 'iw',      // iw is googlish for hebrew
	         'fj' => 'fil',     // google does not support Fijian - use Filipino as close(?) supported relative
		);
		if ( array_key_exists( $code, $mappings ) ) {
			$code = $mappings[$code];
		}
		return $code;
	}	
	
}
									