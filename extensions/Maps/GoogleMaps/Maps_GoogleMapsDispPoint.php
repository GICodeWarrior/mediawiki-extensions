<?php

/**
 * File holding the MapsGoogleMapsDispPoint class.
 *
 * @file Maps_GoogleMapsDispPoint.php
 * @ingroup MapsGoogleMaps
 *
 * @author Jeroen De Dauw
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

/**
 * Class for handling the display_point(s) parser functions with Google Maps.
 *
 * @ingroup MapsGoogleMaps
 *
 * @author Jeroen De Dauw
 */
final class MapsGoogleMapsDispPoint extends MapsBasePointMap {
	
	public $serviceName = MapsGoogleMaps::SERVICE_NAME;

	/**
	 * @see MapsBaseMap::setMapSettings()
	 *
	 */
	protected function setMapSettings() {
		global $egMapsGoogleMapsZoom, $egMapsGoogleMapsPrefix, $egMapsGMapOverlays;
		
		$this->elementNamePrefix = $egMapsGoogleMapsPrefix;
		$this->defaultZoom = $egMapsGoogleMapsZoom;
		
		$this->markerStringFormat = 'getGMarkerData(lat, lon, \'title\', \'label\', "icon")';
		
		$this->spesificParameters = array(
			'overlays' => array(
				'type' => array( 'string', 'list' ),
				'criteria' => array(
					'is_google_overlay' => array()
					),
				'default' => $egMapsGMapOverlays,
				),
		);
	}
	
	/**
	 * @see MapsBaseMap::doMapServiceLoad()
	 *
	 */
	protected function doMapServiceLoad() {
		global $egGoogleMapsOnThisPage;
		
		MapsGoogleMaps::addGMapDependencies( $this->output );
		$egGoogleMapsOnThisPage++;
		
		$this->elementNr = $egGoogleMapsOnThisPage;
	}
	
	/**
	 * @see MapsBaseMap::addSpecificMapHTML()
	 *
	 */
	public function addSpecificMapHTML() {
		global $wgOut;
		
		MapsGoogleMaps::addOverlayOutput( $this->output, $this->mapName, $this->overlays, $this->controls );
		
		$this->output .= Html::element(
			'div',
			array(
				'id' => $this->mapName,
				'width' => $this->width,
				'height' => $this->height
			),
			null
		);
		
		$wgOut->addInlineScript(
			<<<EOT
addOnloadHook(
	function() {
		initializeGoogleMap('$this->mapName', 
			{
			lat: $this->centre_lat,
			lon: $this->centre_lon,
			zoom: $this->zoom,
			type: $this->type,
			types: [$this->types],
			controls: [$this->controls],
			scrollWheelZoom: $this->autozoom
			},
			[$this->markerString]
		);
	}
);
EOT
		);

	}
	
}

