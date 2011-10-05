<?php

/**
 * @author Anna Kantorovitch and Benedikt Kämpgen
 * @file SWB_Settings
 * @ingroup SWB
 */

#################################################################
#    CHANGING THE CONFIGURATION FOR SEMANTIC WEBBROWSER         #
#################################################################
# Do not change this file directly, but copy custom settings    #
# into your LocalSettings.php. Most settings should be make     #
# between including this file and the call to enableSemantics().#
# Exceptions that need to be set before are documented below.   #
#################################################################
$swbgIP = dirname( __FILE__ ) . '/../SemanticWebBrowser/';


// TODO: description does not look nice.
$wgExtensionCredits['semantic'][] = array(
	'path' => __FILE__,
	'name' => 'Semantic Web Browser',
	'version' => '0.2',
	'author' => 'Benedikt Kaempgen, Anna Kantorovitch.',
	'url' => 'http://semantic-mediawiki.org',
	'descriptionmsg' => 'This extension adds a special page (and later a factbox) Browse Wiki and Semantic Web.'
);


/**
 * The toolbox of each content page show a link to browse the semantic web
 *of that page using Special:Browse Wiki & Semantic Web 
 */

$swbgToolboxBrowseSemWeb = true;


// load global constants and setup functions
require_once( $swbgIP.'includes/SWB_Setup.php' );

?>