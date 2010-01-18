<?php

/** 
 * A class that holds static helper functions for common functionality that is not map-spesific.
 *
 * @file Maps_Mapper.php
 * @ingroup Maps
 *
 * @author Jeroen De Dauw
 */

if( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

final class MapsMapper {
	
	/**
	 * Array holding the parameters that are not spesific to a mapping service, 
	 * their aliases, criteria and default value.
	 *
	 * @var array
	 */
	private static $mainParams;

	public static function initializeMainParams() {
		global $egMapsSizeRestrictions, $egMapsMapWidth, $egMapsMapHeight;

		self::$mainParams = array
			(
			'zoom' => array(
				'type' => 'integer',
				'criteria' => array(
					'not_empty' => array(),
					'in_range' => array(0, 15)
					)				
				),
			'width' => array(
				'type' => 'integer',
				'criteria' => array(
					'not_empty' => array(),
					'in_range' => $egMapsSizeRestrictions['width']
					),
				'default' => $egMapsMapWidth		
				),
			'height' => array(
				'type' => 'integer',
				'criteria' => array(
					'not_empty' => array(),
					'in_range' => $egMapsSizeRestrictions['height']
					),
				'default' => $egMapsMapHeight
				),
			);
	}

	/**
	 * Returns the main parameters array.
	 * 
	 * @return array
	 */
	public static function getMainParams() {
		return self::$mainParams;
	}	
	
	/**
	 * Returns a valid service. When an invalid service is provided, the default one will be returned.
	 * Aliases are also chancged into the main service names @see MapsMapper::getMainServiceName().
	 *
	 * @param string $service
	 * @param string $feature
	 * 
	 * @return string
	 */
	public static function getValidService($service, $feature) {
		global $egMapsAvailableServices, $egMapsDefaultService, $egMapsDefaultServices, $egMapsServices;
		
		$service = self::getMainServiceName($service);
		
		$shouldChange = ! array_key_exists($service, $egMapsServices);
		if (! $shouldChange) $shouldChange = ! array_key_exists($feature, $egMapsServices[$service]);
		
		if ($shouldChange) {
			$service = array_key_exists($feature, $egMapsDefaultServices) ? $egMapsDefaultServices[$feature] : $egMapsDefaultService;
		}
		
		if(! in_array($service, $egMapsAvailableServices)) $service = $egMapsDefaultService;
		
		return $service;
	}
	
	/**
	 * Checks if the service name is an alias for an actual service,
	 * and changes it into the main service name if this is the case.
	 *
	 * @param string $service
	 * @return string
	 */
	private static function getMainServiceName($service) {
		global $egMapsServices;
		
		if (! array_key_exists($service, $egMapsServices)) {
			foreach ($egMapsServices as $serviceName => $serviceInfo) {
				if (in_array($service, $serviceInfo['aliases'])) {
					 $service = $serviceName;
					 break;
				}
			}
		}
		
		return $service;
	}	
}
