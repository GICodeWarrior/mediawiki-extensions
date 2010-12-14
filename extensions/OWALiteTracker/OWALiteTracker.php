

//Must come after "CentralNotice", which creates the "Geo" object

$wgHooks['SkinAfterBottomScripts'][] = 'efOWALiteTracker';

$wgOWAGeoTrackSites = array(
	array("country", "IN", "india-allproj.js"),
);

function efOWALiteTracker($skin, &$text){
	if( count( $wgOWAGeoTrackSites ) <= 0 ){ return; }
	$text .= "<script> var includeOWA = false; if(Geo){";
	foreach($condition in $wgOWAGeoTrackSites){
		$text .= "if (Geo.{$condition[0]} && Geo.{$condition[0]} == \"{$condition[1]}\"){ if(!includeOWA){includeOWA=true; importScriptURI( document.location.protocol +'//owa.wikimedia.org/owa/modules/base/js/owa.tracker-combined-min.js');} importScriptURI( document.location.protocol + '//owa.wikimedia.org/resources/{$condition[2]}');}";
	}
	$text .= "}</script>";
}