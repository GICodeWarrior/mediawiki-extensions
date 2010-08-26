<?php

/**
 * Settings file for the Semantic Result Formats extension.
 * 
 * NOTE: Do not use this file as entry point, use SemanticresultFormats.php instead.
 *
 * @file
 * @ingroup SemanticResultFormats
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

define( 'SRF_VERSION', '1.5.1' );

$srfgScriptPath = $wgScriptPath . '/extensions/SemanticResultFormats'; // TODO: fix hardcoded path
$srfgIP = dirname( __FILE__ );
$wgExtensionMessagesFiles['SemanticResultFormats'] = $srfgIP . '/SRF_Messages.php';
$wgExtensionFunctions[] = 'srffSetup';

$wgAutoloadClasses['SRFParserFunctions'] = $srfgIP . '/SRF_ParserFunctions.php';

// used for jqplot formats
$srfgJQPlotIncluded = false;

// FIXME: Can be removed when new style magic words are used (introduced in r52503)
$wgHooks['LanguageGetMagic'][] = 'SRFParserFunctions::languageGetMagic';
$wgHooks['AdminLinks'][] = 'srffAddToAdminLinks';
$wgHooks['ParserFirstCallInit'][] = 'SRFParserFunctions::registerFunctions';

$srfgFormats = array( 'icalendar', 'vcard', 'bibtex', 'calendar', 'eventline', 'timeline', 'outline', 'gallery', 'jqplotbar', 'jqplotpie', 'sum', 'average', 'min', 'max' );

function srffSetup() {
	global $srfgFormats, $wgExtensionCredits;

	foreach ( $srfgFormats as $fn ) srffInitFormat( $fn );

	$wgExtensionCredits[defined( 'SEMANTIC_EXTENSION_TYPE' ) ? 'semantic' : 'other'][] = array(
		'path' => __FILE__,
		'name' => 'Semantic Result Formats',
		'version' => SRF_VERSION,
		'author' => array( 'Frank Dengler', '[http://steren.fr Steren Giannini]', 'Sanyam Goyal', 'Fabian Howahl', 'Yaron Koren', '[http://korrekt.org Markus Krötzsch]', 'David Loomer', 'Joel Natividad', '[http://simia.net Denny Vrandecic]', 'Nathan Yergler', 'Hans-Jörg Happel', 'Rowan Rodrik van der Molen' ),
		'url' => 'http://semantic-mediawiki.org/wiki/Help:Semantic_Result_Formats',
		'descriptionmsg' => 'srf-desc'
	);
}

function srffInitFormat( $format ) {
	global $smwgResultFormats, $wgAutoloadClasses, $srfgIP;

	$class = '';
	$file = '';
	switch ( $format ) {
		case 'timeline': case 'eventline':
			$class = 'SRFTimeline';
			$file = $srfgIP . '/Timeline/SRF_Timeline.php';
		break;
		case 'vcard':
			$class = 'SRFvCard';
			$file = $srfgIP . '/vCard/SRF_vCard.php';
		break;
		case 'icalendar':
			$class = 'SRFiCalendar';
			$file = $srfgIP . '/iCalendar/SRF_iCalendar.php';
		break;
		case 'bibtex':
			$class = 'SRFBibTeX';
			$file = $srfgIP . '/BibTeX/SRF_BibTeX.php';
		break;
		case 'calendar':
			$class = 'SRFCalendar';
			$file = $srfgIP . '/Calendar/SRF_Calendar.php';
		break;
		case 'outline':
			$class = 'SRFOutline';
			$file = $srfgIP . '/Outline/SRF_Outline.php';
		break;
		case  'sum': case 'average': case 'min': case 'max':
			$class = 'SRFMath';
			$file = $srfgIP . '/Math/SRF_Math.php';
		break;
		case 'exhibit':
			$class = 'SRFExhibit';
			$file = $srfgIP . '/Exhibit/SRF_Exhibit.php';
		break;
		case 'googlebar':
			$class = 'SRFGoogleBar';
			$file = $srfgIP . '/GoogleCharts/SRF_GoogleBar.php';
		break;
		case 'googlepie':
			$class = 'SRFGooglePie';
			$file = $srfgIP . '/GoogleCharts/SRF_GooglePie.php';
		break;
		case 'jqplotpie':
			$class = 'SRFjqPlotPie';
			$file = $srfgIP . '/jqPlot/SRF_jqPlotPie.php';
		break;
		case 'jqplotbar':
			$class = 'SRFjqPlotBar';
			$file = $srfgIP . '/jqPlot/SRF_jqPlotBar.php';
		break;
		case 'graph':
			$class = 'SRFGraph';
			$file = $srfgIP . '/GraphViz/SRF_Graph.php';
		break;
		case 'process':
			$class = 'SRFProcess';
			$file = $srfgIP . '/GraphViz/SRF_Process.php';
		break;
		case 'ploticusvbar':
			$class = 'SRFPloticusVBar';
			$file = $srfgIP . '/Ploticus/SRF_PloticusVBar.php';
		break;
		case 'gallery':
			$class = 'SRFGallery';
			$file = $srfgIP . '/Gallery/SRF_Gallery.php';
		break;
	}
	if ( ( $class ) && ( $file ) ) {
		$smwgResultFormats[$format] = $class;
		$wgAutoloadClasses[$class] = $file;
	}
}

/**
 * Adds a link to Admin Links page
 */
function srffAddToAdminLinks( &$admin_links_tree ) {
	$displaying_data_section = $admin_links_tree->getSection( wfMsg( 'smw_adminlinks_displayingdata' ) );
	// escape is SMW hasn't added links
	if ( is_null( $displaying_data_section ) )
		return true;
	$smw_docu_row = $displaying_data_section->getRow( 'smw' );
	wfLoadExtensionMessages( 'SemanticResultFormats' );
	$srf_docu_label = wfMsg( 'adminlinks_documentation', wfMsg( 'srf-name' ) );
	$smw_docu_row->addItem( AlItem::newFromExternalLink( "http://www.mediawiki.org/wiki/Extension:Semantic_Result_Formats", $srf_docu_label ) );
	return true;
}
