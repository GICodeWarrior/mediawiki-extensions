<?php

/**
 * File holding the registration and handling functions for the display_point parser function.
 *
 * @file Maps_DisplayPoint.php
 * @ingroup Maps
 *
 * @author Jeroen De Dauw
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

$wgAutoloadClasses['MapsDisplayPoint'] = __FILE__;
$wgAutoloadClasses['MapsBasePointMap'] = dirname( __FILE__ ) . '/Maps_BasePointMap.php';

if ( version_compare( $wgVersion, '1.16alpha', '<' ) ) {
	$wgHooks['LanguageGetMagic'][] = 'efMapsDisplayPointMagic';
}	
$wgHooks['ParserFirstCallInit'][] = 'efMapsRegisterDisplayPoint';

$egMapsFeatures['pf'][]	= 'MapsDisplayPoint::initialize';

/**
 * Adds the magic words for the parser functions.
 */
function efMapsDisplayPointMagic( &$magicWords, $langCode ) {
	// The display_address(es) aliases are for backward compatibility only, and will be removed eventually.
	$magicWords['display_point'] = array( 0, 'display_point', 'display_points' );
	
	return true; // Unless we return true, other parser functions won't get loaded.
}

/**
 * Adds the parser function hooks
 */
function efMapsRegisterDisplayPoint( &$wgParser ) {
	// Hooks to enable the '#display_point' and '#display_points' parser functions.
	$wgParser->setFunctionHook( 'display_point', array( 'MapsDisplayPoint', 'displayPointRender' ) );
	
	return true;
}

/**
 * Class containing the rendering functions for the display_point parser function.
 * 
 * @author Jeroen De Dauw
 *
 */
final class MapsDisplayPoint {
	
	public static $parameters = array();
	
	public static function initialize() {
	}
	
	/**
	 * Returns the output for a display_point call.
	 *
	 * @param unknown_type $parser
	 * 
	 * @return array
	 */
	public static function displayPointRender( &$parser ) {
		$args = func_get_args();
		return MapsParserFunctions::getMapHtml( $parser, $args, 'display_point' );
	}
	
}