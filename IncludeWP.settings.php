<?php

/**
 * File defining the settings for the Include WP extension.
 * More info can be found at http://www.mediawiki.org/wiki/Extension:Include_WP#Settings
 *
 *                          NOTICE:
 * Changing one of these settings can be done by copieng or cutting it,
 * and placing it in LocalSettings.php, AFTER the inclusion of this extension.
 *
 * @file IncludeWP_Settings.php
 * @ingroup IncludeWP
 *
 * @licence GNU GPL v3
 *
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

$egIncWPWikis = array();

$egIncWPWikis['wikipedia'] = array(
	'name' => 'Wikipedia',
	'path' => 'http://en.wikipedia.org/w',
	'url' => 'http://en.wikipedia.org/wiki',
	'licencename' => 'CC-BY-SA',
	'licenceurl' => 'http://creativecommons.org/licenses/by-sa/3.0/'
); 
