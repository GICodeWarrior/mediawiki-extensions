<?php

/**
 * File holding the MapsOpenLayers class.
 *
 * @file Maps_OpenLayers.php
 * @ingroup MapsOpenLayers
 *
 * @author Jeroen De Dauw
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

/**
 * TODO
 * 
 * @ingroup MapsOpenLayers
 * 
 * @author Jeroen De Dauw
 */
class MapsOpenLayers extends MapsMappingService {
	
	function __construct() {
		parent::__construct(
			'openlayers',
			array( 'layers', 'openlayer' )
		);
		
		global $egMapsOLLoadedLayers;
		$egMapsOLLoadedLayers = array();
	}	
	
	protected function initParameterInfo( array &$parameters ) {
		global $egMapsServices, $egMapsOLLayers, $egMapsOLControls, $egMapsOpenLayersZoom;
		
		Validator::addOutputFormat( 'olgroups', array( __CLASS__, 'unpackLayerGroups' ) );
		
		$parameters = array(
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
									
		$parameters['zoom']['criteria']['in_range'] = array( 0, 19 );
	}
	
	/**
	 * @see MapsMappingService::getDependencies
	 * 
	 * @return array
	 */
	protected function getDependencies() {
		global $wgJsMimeType;
		global $egMapsStyleVersion, $egMapsJsExt, $egMapsScriptPath;
		
		return array(
			Html::linkedScript( "$egMapsScriptPath/Services/OpenLayers/OpenLayers/theme/default/style.css" ),
			Html::linkedScript( "$egMapsScriptPath/Services/OpenLayers/OpenLayers/OpenLayers.js?$egMapsStyleVersion" ),
			Html::linkedScript( "$egMapsScriptPath/Services/OpenLayers/OpenLayerFunctions{$egMapsJsExt}?$egMapsStyleVersion" ),
			Html::inlineScript( 'initOLSettings(200, 100);' )
		);			
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
	 * Build up a csv string with the layers, to be outputted as a JS array
	 *
	 * @param string $output
	 * @param array $layers
	 * 
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