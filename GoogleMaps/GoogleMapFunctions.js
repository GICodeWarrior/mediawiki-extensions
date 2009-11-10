 /**
  * Javascript functions for Google Maps functionallity in Maps and it's extensions.
  *
  * @file GoogleMapFunctions.js
  * @ingroup MapsGoogleMaps
  *
  * @author Robert Buzink
  * @author Yaron Koren   
  * @author Jeroen De Dauw
  */


/**
 * Returns GMarker object on the provided location. It will show a popup baloon
 * with title and label when clicked, if either of these is set.
 */
function createGMarker(point, title, label, icon) {
	var marker;
	
	if (icon != '') {
		var iconObj = new GIcon(G_DEFAULT_ICON);
		iconObj.image = icon;
		marker = new GMarker(point, {icon:iconObj});
	} else {
		marker = new GMarker(point);
	}
	
	if ((title + label).length > 0) {
		var bothTxtAreSet = title.length > 0 && label.length > 0;
		var popupText = bothTxtAreSet ? '<b>' + title + '</b><hr />' + label : title + label;	
		popupText = '<div style="overflow:auto;max-height:150px;">' + popupText + '</div>';

		GEvent.addListener(marker, 'click',
			function() {
				marker.openInfoWindowHtml(popupText, {maxWidth:350});
			}
		);		
	}

	return marker;
}

/**
 * Returns GMap2 object with the provided properties and markers.
 * This is done by setting the map centre and size, and passing the arguments to function createGoogleMap.
 */
function initializeGoogleMap(mapName, mapOptions, markers) {
	if (GBrowserIsCompatible()) {
		mapOptions.centre = (mapOptions.lat != null && mapOptions.lon != null) ? new GLatLng(mapOptions.lat, mapOptions.lon) : null;
		mapOptions.size = new GSize(mapOptions.width, mapOptions.height);	
		return createGoogleMap(document.getElementById(mapName), mapOptions, markers);	
	}
	else {
		return false;
	}
}

/**
 * Returns GMap2 object with the provided properties.
 */
function createGoogleMap(mapElement, mapOptions, markers) {
	var typesContainType = false;

	// TODO: Change labels of the moon/mars map types?
	for (var i = 0; i < mapOptions.types.length; i++) {
		if (mapOptions.types[i] == mapOptions.type) typesContainType = true;
	}
	
	if (! typesContainType) mapOptions.types.push(mapOptions.type);

	var map = new GMap2(mapElement, {size: mapOptions.size, mapTypes: mapOptions.types});
	
	map.setMapType(mapOptions.type);	
	
	// List of GControls: http://code.google.com/apis/maps/documentation/reference.html#GControl
	for (i in mapOptions.controls){
		switch (mapOptions.controls[i]) {
			case 'large' : 
				map.addControl(new GLargeMapControl3D());
				break;
			case 'small' : 
				map.addControl(new GSmallZoomControl3D());
				break;
			case 'large-original' : 
				map.addControl(new GLargeMapControl());
				break;
			case 'small-original' : 
				map.addControl(new GSmallMapControl());
				break;
			case 'zoom' : 
				map.addControl(new GSmallZoomControl());
				break;
			case 'type' : 
				map.addControl(new GMapTypeControl());
				break;		
			case 'type-menu' : 
				map.addControl(new GMenuMapTypeControl());
				break;
			case 'overview' : case 'overview-map' : 
				map.addControl(new GOverviewMapControl());
				break;					
			case 'scale' : 
				map.addControl(new GScaleControl());
				break;
			case 'nav-label' : case 'nav' : 
				map.addControl(new GNavLabelControl());
				break;	
		}
	}	
	
	var bounds = ((mapOptions.zoom == null || mapOptions.centre == null) && markers.length > 1) ? new GLatLngBounds() : null;
	
	for (i in markers) {
		var marker = markers[i];
		map.addOverlay(createGMarker(marker.point, marker.title, marker.label, marker.icon));
		if (bounds != null) bounds.extend(marker.point);
	}
	
	if (bounds != null) {
		map.setCenter(bounds.getCenter(), map.getBoundsZoomLevel(bounds));
	}
	
	if (mapOptions.centre != null) map.setCenter(mapOptions.centre);
	if (mapOptions.zoom != null) map.setZoom(mapOptions.zoom);
	
	if (mapOptions.scrollWheelZoom) map.enableScrollWheelZoom();
	
	map.enableContinuousZoom();
	
	return map;
}
 
function getGMarkerData(lat, lon, title, label, icon) {
		return {point: new GLatLng(lat, lon), title: title, label: label, icon: icon};
}
