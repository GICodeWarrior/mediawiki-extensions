<?php

/**
 * This groupe contains all OpenLayers related files of the Maps extension.
 * 
 * @defgroup MapsOpenLayers OpenLayers
 * @ingroup Maps
 */

/**
 * This file holds the general information for the OpenLayers service
 *
 * @file Maps_OpenLayers.php
 * @ingroup MapsOpenLayers
 *
 * @author Jeroen De Dauw
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

$wgAutoloadClasses['MapsOpenLayers'] = dirname( __FILE__ ) . '/Maps_OpenLayers.php';

$wgHooks['MappingServiceLoad'][] = 'MapsOpenLayers::initialize';

$wgAutoloadClasses['MapsOpenLayersDispMap'] = dirname( __FILE__ ) . '/Maps_OpenLayersDispMap.php';
$wgAutoloadClasses['MapsOpenLayersDispPoint'] = dirname( __FILE__ ) . '/Maps_OpenLayersDispPoint.php';

$egMapsServices[MapsOpenLayers::SERVICE_NAME] = array(
	'aliases' => array( 'layers', 'openlayer' ),
	'features' => array(
		'display_point' => 'MapsOpenLayersDispPoint',
		'display_map' => 'MapsOpenLayersDispMap',
	)
);

/**
 * Class for OpenLayers initialization.
 * 
 * @ingroup MapsOpenLayers
 * 
 * @author Jeroen De Dauw
 */
class MapsOpenLayers {
	
	const SERVICE_NAME = 'openlayers';
	
	public static function initialize() {
		global $wgAutoloadClasses, $egMapsServices, $egMapsOLLoadedLayers;
		
		$egMapsOLLoadedLayers = array();
		
		self::initializeParams();
		
		Validator::addOutputFormat( 'olgroups', array( __CLASS__, 'unpackLayerGroups' ) );
		
		return true;
	}
	
	private static function initializeParams() {
		global $egMapsServices, $egMapsOLLayers, $egMapsOLControls, $egMapsOpenLayersZoom;
		
		$egMapsServices[self::SERVICE_NAME]['parameters'] = array(
			'controls' => array(
				'type' => array( 'string', 'list' ),
				'criteria' => array(
					'in_array' => self::getControlNames()
				),
				'default' => $egMapsOLControls,
				'output-type' => array( 'list', ',', '\'' )
			),
			'layers' => array(
				'type' => array( 'string', 'list' ),
				'criteria' => array(
					'in_array' => self::getLayerNames( true )
				),
				'default' => $egMapsOLLayers,
				'output-types' => array(
					'unique_items',
					'olgroups',
					array( 'filtered_array', self::getLayerNames() ),
				)
			),
		);
									
		$egMapsServices[self::SERVICE_NAME]['parameters']['zoom']['criteria']['in_range'] = array( 0, 19 );
	}
	
	/**
	 * Returns the names of all supported controls. 
	 * This data is a copy of the one used to actually translate the names
	 * into the controls, since this resides client side, in OpenLayerFunctions.js. 
	 * 
	 * @return array
	 */
	public static function getControlNames() {
		return array(
			'argparser', 'attribution', 'button', 'dragfeature', 'dragpan',
			'drawfeature', 'editingtoolbar', 'getfeature', 'keyboarddefaults', 'layerswitcher',
			'measure', 'modifyfeature', 'mousedefaults', 'mouseposition', 'mousetoolbar',
			'navigation', 'navigationhistory', 'navtoolbar', 'overviewmap', 'pan',
			'panel', 'panpanel', 'panzoom', 'panzoombar', 'autopanzoom', 'permalink',
			'scale', 'scaleline', 'selectfeature', 'snapping', 'split',
			'wmsgetfeatureinfo', 'zoombox', 'zoomin', 'zoomout', 'zoompanel',
			'zoomtomaxextent'
		);
	}

	/**
	 * Returns the names of all supported layers.
	 * 
	 * @return array
	 */
	public static function getLayerNames( $includeGroups = false ) {
		global $egMapsOLAvailableLayers, $egMapsOLLayerGroups;
		$keys = array_keys( $egMapsOLAvailableLayers );
		if ( $includeGroups ) $keys = array_merge( $keys, array_keys( $egMapsOLLayerGroups ) );
		return $keys;
	}
	
	/**
	 * If this is the first open layers map on the page, load the API, styles and extra JS functions.
	 * 
	 * @param mixed $parserOrOut
	 */
	public static function addOLDependencies( &$parserOrOut ) {
		global $wgJsMimeType;
		global $egOpenLayersOnThisPage, $egMapsStyleVersion, $egMapsJsExt, $egMapsScriptPath;
		
		if ( empty( $egOpenLayersOnThisPage ) ) {
			$egOpenLayersOnThisPage = 0;
			
			if ( $parserOrOut instanceof Parser ) {
				$parser = $parserOrOut;
				
				$parser->getOutput()->addHeadItem( 
					Html::element(
						'link', 
						array(
							'rel' => 'stylesheet',
							'type' => 'text/css',
							'href' => "$egMapsScriptPath/Services/OpenLayers/OpenLayers/theme/default/style.css"
						)
					) .				
					Html::element(
						'script', 
						array(
							'type' => $wgJsMimeType,
							'src' => "$egMapsScriptPath/Services/OpenLayers/OpenLayers/OpenLayers.js?$egMapsStyleVersion"
						)
					) .	
					Html::element(
						'script', 
						array(
							'type' => $wgJsMimeType,
							'src' => "$egMapsScriptPath/Services/OpenLayers/OpenLayerFunctions{$egMapsJsExt}?$egMapsStyleVersion"
						)
					) .								
					Html::inlineScript( 'initOLSettings(200, 100);' )
				);				
			}
			else if ( $parserOrOut instanceof OutputPage ) {
				$out = $parserOrOut;
				$out->addStyle( "$egMapsScriptPath/Services/OpenLayers/OpenLayers/theme/default/style.css" );
				$out->addScriptFile( "$egMapsScriptPath/Services/OpenLayers/OpenLayers/OpenLayers.js?$egMapsStyleVersion" );
				$out->addScriptFile( "$egMapsScriptPath/Services/OpenLayers/OpenLayerFunctions{$egMapsJsExt}?$egMapsStyleVersion" );
			}			
		}			
	}
		
	/**
	 * Build up a csv string with the layers, to be outputted as a JS array
	 *
	 * @param string $output
	 * @param string $layers
	 * @return csv string
	 */
	public static function createLayersStringAndLoadDependencies( &$output, array $layers ) {
		global $egMapsOLAvailableLayers;
		$layerStr = array();
		
		foreach ( $layers as $layer ) {
			self::loadDependencyWhenNeeded( $output, $layer );
			$layerStr[] = is_array( $egMapsOLAvailableLayers[$layer] ) ? $egMapsOLAvailableLayers[$layer][0] : $egMapsOLAvailableLayers[$layer];
		}
		
		return 'new ' . implode( ',new ', $layerStr );
	}
	
	/**
	 * Load the dependencies of a layer if they are not loaded yet.
	 *
	 * @param string $output The output to which the html to load the dependencies needs to be added
	 * @param string $layer The layer to check (and load the dependencies for
	 */
	public static function loadDependencyWhenNeeded( &$output, $layer ) {
		global $wgJsMimeType;
		global $egMapsOLAvailableLayers, $egMapsOLLayerDependencies, $egMapsOLLoadedLayers;
		
		// Check if there is a dependency refered by the layer definition.
		if ( is_array( $egMapsOLAvailableLayers[$layer] )
			&& count( $egMapsOLAvailableLayers[$layer] ) > 1
			&& array_key_exists( $egMapsOLAvailableLayers[$layer][1], $egMapsOLLayerDependencies )
			&& !in_array( $egMapsOLAvailableLayers[$layer][1], $egMapsOLLoadedLayers ) ) {
			// Add the dependency to the output.
			$output .= $egMapsOLLayerDependencies[$egMapsOLAvailableLayers[$layer][1]];
			// Register that it's added so it does not get done multiple times.
			$egMapsOLLoadedLayers[] = $egMapsOLAvailableLayers[$layer][1];
		}
	}
	
	/**
	 * Removed the layer groups from the layer list, and adds their members back in.
	 * 
	 * @param array $layers
	 */
	public static function unpackLayerGroups( array &$layers, $name, array $parameters ) {
		global $egMapsOLLayerGroups;
		
		$unpacked = array();
		
		foreach ( $layers as $layerOrGroup ) {
			if ( array_key_exists( $layerOrGroup, $egMapsOLLayerGroups ) ) {
				$unpacked = array_merge( $unpacked, $egMapsOLLayerGroups[$layerOrGroup] );
			}
			else {
				$unpacked[] = $layerOrGroup;
			}
		}
		
		$layers = $unpacked;
	}
	
}
																		