<?php

/**
 * A query printer for maps using the Open Layers API
 *
 * @file SM_OpenLayersQP.php 
 * @ingroup SMOpenLayers
 *
 * @author Jeroen De Dauw
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

final class SMOpenLayersQP extends SMMapPrinter {

	public $serviceName = MapsOpenLayers::SERVICE_NAME;
	
	/**
	 * @see SMMapPrinter::setQueryPrinterSettings()
	 *
	 */
	protected function setQueryPrinterSettings() {
		global $egMapsOpenLayersZoom, $egMapsOpenLayersPrefix;
		
		$this->elementNamePrefix = $egMapsOpenLayersPrefix;
		$this->defaultZoom = $egMapsOpenLayersZoom;
	}

	/**
	 * @see SMMapPrinter::doMapServiceLoad()
	 *
	 */
	protected function doMapServiceLoad() {
		global $egOpenLayersOnThisPage;
		
		MapsOpenLayers::addOLDependencies( $this->output );
		$egOpenLayersOnThisPage++;
		
		$this->elementNr = $egOpenLayersOnThisPage;
	}
	
	/**
	 * @see SMMapPrinter::addSpecificMapHTML()
	 *
	 */
	protected function addSpecificMapHTML( Parser $parser ) {
		// TODO: refactor up like done in maps with display point
		$markerItems = array();
		
		foreach ( $this->m_locations as $location ) {
			// Create a string containing the marker JS .
			list( $lat, $lon, $title, $label, $icon ) = $location;

			$markerItems[] = "getOLMarkerData($lon, $lat, '$title', '$label', '$icon')";
		}

		$markersString = implode( ',', $markerItems );

		$this->output .= Html::element(
			'div',
			array(
				'id' => $this->mapName,
				'style' => "width: $this->width; height: $this->height; background-color: #cccccc;",
			),
			wfMsg('maps-loading-map')
		);
		
		$layerItems = MapsOpenLayers::createLayersStringAndLoadDependencies( $this->output, $this->layers );
		
		$parser->getOutput()->addHeadItem(
			Html::inlineScript( <<<EOT
addOnloadHook(
	function() {
		initOpenLayer(
			'$this->mapName',
			$this->centreLat,
			$this->centreLon,
			$this->zoom,
			[$layerItems],
			[$this->controls],
			[$markersString]
		);
	}
);
EOT
		) );		
	}

	/**
	 * Returns type info, descriptions and allowed values for this QP's parameters after adding the spesific ones to the list.
	 */
    public function getParameters() {
        $params = parent::getParameters();
        
        $params[] = array( 'name' => 'controls', 'type' => 'enum-list', 'description' => wfMsg( 'semanticmaps_paramdesc_controls' ), 'values' => MapsOpenLayers::getControlNames() );
        $params[] = array( 'name' => 'layers', 'type' => 'enum-list', 'description' => wfMsg( 'semanticmaps_paramdesc_layers' ), 'values' => MapsOpenLayers::getLayerNames() );
        
        return $params;
    }
	
}
