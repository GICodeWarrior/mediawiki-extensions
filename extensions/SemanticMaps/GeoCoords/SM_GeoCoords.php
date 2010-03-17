<?php

/**
 * File containing the registration and initialization code for the Semantic MediaWiki
 * Geographical Coordinates data type, and things it's dependent on.
 * 
 * @file SM_GeoCoords.php
 * @ingroup SemanticMaps
 * 
 * @author Jeroen De Dauw
 * @author Markus Krötzsch
 */

// Registration of the Geographical Coordinate type.
$wgAutoloadClasses['SMGeoCoordsValue'] = $smgDir . 'GeoCoords/SM_GeoCoordsValue.php';

// Registration of the Geographical Coordinate value description class.
$wgAutoloadClasses['SMGeoCoordsValueDescription'] = $smgDir . 'GeoCoords/SM_GeoCoordsValueDescription.php';

// Hook for initializing the Geographical Coordinate type.
$wgHooks['smwInitDatatypes'][] = 'smfInitGeoCoordsType';

// Hook for initializing the Geographical Proximity query support.
$wgHooks['smwGetSQLConditionForValue'][] = 'smfGetGeoProximitySQLCondition';

define( 'SM_CMP_NEAR', 101 ); // Define the near comparator for proximity queries.

/**
 * Adds support for the geographical coordinate data type to Semantic MediaWiki.
 * 
 * TODO: i18n keys still need to be moved
 */
function smfInitGeoCoordsType() {
	SMWDataValueFactory::registerDatatype( '_geo', 'SMGeoCoordsValue', 'Geographic coordinate' );
	return true;
}

/**
 * Custom SQL query extension for matching geographic coordinates.
 * 
 * TODO: Change the way coords are stored in the db from a string field to 2 float fields.
 * The geographic coordinate value object should provide functions to access the lat and lon data directly.
 * 
 * TODO: Add support for a per-coordinate set distance parameter.
 */
function smfGetGeoProximitySQLCondition( &$where, $description, $tablename, $fieldname, $dbs ) {
	$where = '';
	$dv = $description->getDatavalue();
	
	// Only execute the query when the description's type is geographical coordinates,
	// the description is valid, and the near comparator is used.
	if ( ( $dv->getTypeID() != '_geo' ) 
		|| ( !$dv->isValid() ) 
		|| ( $description->getComparator() != SM_CMP_NEAR )
		) return true; 

	$keys = $dv->getDBkeys();
	$geoarray = explode( ',', $keys[0] );
	
	if ( ( count( $geoarray ) != 2 ) 
		|| ( $geoarray[0] == '' )
		|| ( $geoarray[1] == '' )
		) return true; // There is something wrong with the lat/lon pair
		
	$latitude = $dbs->addQuotes( $geoarray[0] );
	$longitude = $dbs->addQuotes( $geoarray[1] );
	
	// Compute distances in miles:
	$distance = "ROUND(((ACOS( SIN({$latitude} * PI()/180 ) * SIN(SUBSTRING_INDEX({$tablename}.{$fieldname}, ',',1) * PI()/180 ) + COS({$latitude} * PI()/180 ) * COS(SUBSTRING_INDEX({$tablename}.{$fieldname}, ',',1) * PI()/180 ) * COS(({$longitude} - SUBSTRING_INDEX({$tablename}.{$fieldname}, ',',-1)) * PI()/180))*180/PI())*60*1.1515),6)";

	$where = "{$distance} <= " . $dbs->addQuotes( "5" );
	
	return true;
}