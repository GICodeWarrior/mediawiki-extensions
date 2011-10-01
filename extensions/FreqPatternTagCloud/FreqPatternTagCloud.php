<?php

/**
 * Frequent Pattern Tag Cloud Plug-in
 * Setup file
 * 
 * @author Tobias Beck, University of Heidelberg
 * @author Andreas Fay, University of Heidelberg
 * @version 1.0
 */

// Alert the user that this is not a valid entry point to MediaWiki if they try to access the special pages file directly.
if (!defined('MEDIAWIKI') || !$wgUseAjax) {
	echo <<<EOT
To install this extension, put the following line in LocalSettings.php:
\$wgUseAjax = true;
require_once( "\$IP/extensions/FreqPatternTagCloud/FreqPatternTagCloud.php" );
EOT;
	exit( 1 );
}

define("FPTC_PATH_HOME", dirname(__FILE__)."/");
define("FPTC_PATH_INCLUDES", dirname(__FILE__)."/includes/");
define("FPTC_PATH_RESOURCES", dirname(__FILE__)."/res/");

// Register plug-in with Special:Version
$wgExtensionCredits['specialpage'][] = array(
		'author' =>'Tobias Beck, Andreas Fay', 
		'name' => 'FreqPatternTagCloud',
		'description' => 'Extension is represented by a special page that allows to build a tag cloud based on properties and to search for similar property values.',
		'url' => 'http://www.mediawiki.org/wiki/Extension:FrequentPatternTagCloud',
		'version' => '1.0'
		);
$wgExtensionCredits['specialpage'][] = array(
		'author' =>'Tobias Beck, Andreas Fay', 
		'name' => 'FreqPatternTagCloudMaintenance',
		'description' => 'Extension is represented by a special page that allows to build a tag cloud based on properties and to search for similar property values.',
		'url' => 'http://www.mediawiki.org/wiki/Extension:FrequentPatternTagCloud',
		'version' => '1.0'
		);

// Register hook to prepare header files
$wgHooks['BeforePageDisplay'][] = 'fptc_initializeHeaders';

// Register files
$wgAutoloadClasses['FreqPatternTagCloud'] = FPTC_PATH_HOME.'FreqPatternTagCloud.body.php';
$wgExtensionMessagesFiles['FreqPatternTagCloud'] = FPTC_PATH_HOME.'FreqPatternTagCloud.i18n.php';
$wgSpecialPages['FreqPatternTagCloud'] = 'FreqPatternTagCloud';

$wgAutoloadClasses['FreqPatternTagCloudMaintenance'] = FPTC_PATH_HOME.'FreqPatternTagCloudMaintenance.php';
$wgExtensionMessagesFiles['FreqPatternTagCloudMaintenance'] = FPTC_PATH_HOME.'FreqPatternTagCloud.i18n.php';
$wgSpecialPages['FreqPatternTagCloudMaintenance'] = 'FreqPatternTagCloudMaintenance';

// Register ajax functions
$wgAjaxExportList[] = 'FreqPatternTagCloud::getAttributeSuggestions';
$wgAjaxExportList[] = 'FreqPatternTagCloud::getSearchSuggestions';
$wgAjaxExportList[] = 'FreqPatternTagCloud::getSuggestions';

include_once(FPTC_PATH_INCLUDES."FrequentPattern.php");


/**
 * Initializes page headers
 *
 * @return bool Success
 */
function fptc_initializeHeaders() {
	global $wgOut, $wgScriptPath, $wgFreqPatternTagCloudSearchBarModification;
	
	// Add jquery & jquery ui
	$wgOut->addLink( 
			array( 
				'rel' => 'stylesheet', 
				'type' => 'text/css', 
				'href' => $wgScriptPath.'/extensions/FreqPatternTagCloud/stylesheets/jquery/ui-lightness/jquery-ui-1.8.custom.css'
				) 
			);
	$wgOut->addScript('<script type="text/javascript" src="'.$wgScriptPath.'/extensions/FreqPatternTagCloud/javascripts/jquery-1.4.2.min.js"></script>');
	$wgOut->addScript('<script type="text/javascript" src="'.$wgScriptPath.'/extensions/FreqPatternTagCloud/javascripts/jquery-ui-1.8.custom.min.js"></script>');
	
	// Add search modification for suggestions using frequent pattern mining
	// Configuration
	if (!isset($wgFreqPatternTagCloudSearchBarModification)) {
		// Activate on default
		$wgFreqPatternTagCloudSearchBarModification = true;
	}
	
	if ($wgFreqPatternTagCloudSearchBarModification) {
		$wgOut->addLink( 
				array( 
					'rel' => 'stylesheet', 
					'type' => 'text/css', 
					'href' => $wgScriptPath.'/extensions/FreqPatternTagCloud/stylesheets/search.css'
					) 
				);
		$wgOut->addScript('<script type="text/javascript" src="'.$wgScriptPath.'/extensions/FreqPatternTagCloud/javascripts/search.js"></script>');
	}
	
	// Add freq pattern tag cloud
	$wgOut->addLink( 
			array( 
				'rel' => 'stylesheet', 
				'type' => 'text/css', 
				'href' => $wgScriptPath.'/extensions/FreqPatternTagCloud/stylesheets/jquery.contextMenu.css'
				)
			);
	$wgOut->addLink( 
			array( 
				'rel' => 'stylesheet', 
				'type' => 'text/css', 
				'href' => $wgScriptPath.'/extensions/FreqPatternTagCloud/stylesheets/main.css'
				) 
			);
	$wgOut->addScript('<script type="text/javascript" src="'.$wgScriptPath.'/extensions/FreqPatternTagCloud/javascripts/jquery.contextMenu.js"></script>');
	$wgOut->addScript('<script type="text/javascript" src="'.$wgScriptPath.'/extensions/FreqPatternTagCloud/javascripts/main.js"></script>');
	
	return true;
}