<?php
/**
 * Initializing file for the Semantic Result Formats extension.
 *
 * @file
 * @ingroup SemanticResultFormats
 */
if( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

define('SRF_VERSION', '1.4.2');

$srfgScriptPath = $wgScriptPath . '/extensions/SemanticResultFormats';
$srfgIP = $IP . '/extensions/SemanticResultFormats';
$wgExtensionMessagesFiles['SemanticResultFormats'] = $srfgIP . '/SRF_Messages.php';
$wgExtensionFunctions[] = 'srffSetup';

$srfgFormats = array('calendar', 'eventline', 'timeline', 'sum', 'average', 'min', 'max');

function srffSetup() {
	global $srfgFormats, $wgExtensionCredits;

	foreach($srfgFormats as $fn) srffInitFormat($fn);
	$formats_list = implode(', ', $srfgFormats);
	$wgExtensionCredits['other'][]= array(
		'name' => 'Semantic Result Formats',
		'version' => SRF_VERSION,
		'author' => "[http://simia.net Denny&nbsp;Vrandecic], Frank Dengler, Yaron Koren, Nathan Yergler, Joel Natividad, Fabian Howahl, [http://korrekt.org Markus Krötzsch]",
		'url' => 'http://semantic-mediawiki.org/wiki/Help:Semantic_Result_Formats',
		'description' => 'Additional formats for Semantic MediaWiki inline queries. Available formats: ' . $formats_list
	);
}

function srffInitFormat( $format ) {
	global $smwgResultFormats, $wgAutoloadClasses, $srfgIP;

	$class = '';
	$file = '';
	if ($format == 'graph') {
		$class = 'SRFGraph';
		$file = $srfgIP . '/GraphViz/SRF_Graph.php';
	}
	if ($format == 'googlebar') {
		$class = 'SRFGoogleBar';
		$file = $srfgIP . '/GoogleCharts/SRF_GoogleBar.php';
	}
	if ($format == 'googlepie') {
		$class = 'SRFGooglePie';
		$file = $srfgIP . '/GoogleCharts/SRF_GooglePie.php';
	}
	if ($format == 'ploticus') {
		$class = 'SRFPloticus';
		$file = $srfgIP . '/Ploticus/SRF_Ploticus.php';
	}
	if ($format == 'timeline' || $format == 'eventline') {
		$class = 'SRFTimeline';
		$file = $srfgIP . '/Timeline/SRF_Timeline.php';
	}
	if ($format == 'calendar') {
		$class = 'SRFCalendar';
		$file = $srfgIP . '/Calendar/SRF_Calendar.php';
	}
	if ($format == 'exhibit') {
		$class = 'SRFExhibit';
		$file = $srfgIP . '/Exhibit/SRF_Exhibit.php';
	}
	if ($format == 'sum' || $format == 'average' || $format == 'min' || $format == 'max') {
		$class = 'SRFMath';
		$file = $srfgIP . '/Math/SRF_Math.php';
	}
	if (($class != '') && ($file)) {
		$smwgResultFormats[$format] = $class;
		$wgAutoloadClasses[$class] = $file;
	}
}

