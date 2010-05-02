<?php

/**
 * File holding class MapsBaseMap.
 *
 * @file Maps_BaseMap.php
 * @ingroup Maps
 *
 * @author Jeroen De Dauw
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

/**
 * Abstract class MapsBaseMap provides the scafolding for classes handling display_map
 * calls for a spesific mapping service. It inherits from MapsMapFeature and therefore
 * forces inheriting classes to implement sereveral methods.
 *
 * @ingroup Maps
 *
 * @author Jeroen De Dauw
 */
abstract class MapsBaseMap implements iMapParserFunction {
	
	public $serviceName;
	
	protected $centreLat, $centreLon;

	protected $output = '';

	protected $spesificParameters = false;
	protected $featureParameters = false;
	
	/**
	 * Sets the map properties as class fields.
	 * 
	 * @param array $mapProperties
	 */
	protected function setMapProperties( array $mapProperties ) {
		foreach ( $mapProperties as $paramName => $paramValue ) {
			if ( !property_exists( __CLASS__, $paramName ) ) {
				$this-> { $paramName } = $paramValue;
			}
			else {
				// If this happens in any way, it could be a big vunerability, so throw an exception.
				throw new Exception( 'Attempt to override a class field during map property assignment. Field name: ' . $paramName );
			}
		}
	}
	
	/**
	 * @return array
	 */
	public function getSpecificParameterInfo() {
		return array();
	}
	
	/**
	 * @return array
	 */
	public function getFeatureParameters() {
		global $egMapsDefaultServices;
		
		return array(
			'service' => array(
				'default' => $egMapsDefaultServices['display_map']
			),
			'coordinates' => array(
				'required' => true,
				'aliases' => array( 'coords', 'location', 'address' ),
				'criteria' => array(
					'is_location' => array()
				),
				'output-type' => 'coordinateSet',
			),
		);
	}
	
	/**
	 * Handles the request from the parser hook by doing the work that's common for all
	 * mapping services, calling the specific methods and finally returning the resulting output.
	 *
	 * @param unknown_type $parser
	 * @param array $params
	 * 
	 * @return html
	 */
	public final function getMapHtml( Parser &$parser, array $params ) {
		$this->featureParameters = MapsDisplayMap::$parameters;
		
		$this->doMapServiceLoad();

		$this->setMapProperties( $params );
		
		$this->setCentre();
		
		if ( $this->zoom == 'null' ) {
			$this->zoom = $this->getDefaultZoom();
		}
		
		$this->addSpecificMapHTML( $parser );
		
		return $this->output;
	}
	
	/**
	 * Sets the $centre_lat and $centre_lon fields.
	 */
	private function setCentre() {
		if ( empty( $this->coordinates ) ) { // If centre is not set, use the default latitude and longitutde.
			global $egMapsMapLat, $egMapsMapLon;
			$this->centreLat = $egMapsMapLat;
			$this->centreLon = $egMapsMapLon;
		}
		else { // If a centre value is set, geocode when needed and use it.
			$this->coordinates = MapsGeocoder::attemptToGeocode( $this->coordinates, $this->geoservice, $this->serviceName );

			// If the centre is not false, it will be a valid coordinate, which can be used to set the  latitude and longitutde.
			if ( $this->coordinates ) {
				$this->centreLat = Xml::escapeJsString( $this->coordinates['lat'] );
				$this->centreLon = Xml::escapeJsString( $this->coordinates['lon'] );
			}
			else { // If it's false, the coordinate was invalid, or geocoding failed. Either way, the default's should be used.
				// TODO: Some warning this failed would be nice here. 
				global $egMapsMapLat, $egMapsMapLon;
				$this->centreLat = $egMapsMapLat;
				$this->centreLon = $egMapsMapLon;
			}
		}
	}
	
}
