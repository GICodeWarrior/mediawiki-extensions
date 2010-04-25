<?php

/**
 * General map query printer class
 *
 * @file SM_Mapper.php
 * @ingroup SemanticMaps
 *
 * @author Jeroen De Dauw
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

final class SMMapper {
	
	private $queryPrinter;
	
	public function __construct( $format, $inline ) {
		global $egMapsDefaultServices, $egMapsServices;
		
		// TODO: allow service parameter to override the default
		// Note: if this is allowed, then the getParameters should only return the base parameters.
		if ( $format == 'map' ) $format = $egMapsDefaultServices['qp'];
		
		$service = MapsMapper::getValidService( $format, 'qp' );
		
		$this->queryPrinter = new $egMapsServices[$service]['features']['qp']( $format, $inline );
	}

	public static function getAliases() {
		return $this->queryPrinter->getAliases();
	}
	
	public static function setAliases() {
		return $this->queryPrinter->setAliases();
	}
	
	public function getName() {
		return wfMsg( 'maps_map' );
	}
	
	public function getQueryMode( $context ) {
		return $this->queryPrinter->getQueryMode( $context );
	}
	
	public function getResult( $results, $params, $outputmode ) {
		return  $this->queryPrinter->getResult( $results, $params, $outputmode );
	}
	
	protected function getResultText( $res, $outputmode ) {
		return $this->queryPrinter->getResultText( $res, $outputmode );
	}
	
	public function getParameters() {
		return $this->queryPrinter->getParameters();
	}
	
	public function getMimeType( $res ) {
		return $this->queryPrinter->getMimeType( $res );
	}
	
}
