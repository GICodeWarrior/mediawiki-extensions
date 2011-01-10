<?php

/**
 * File defining the settings for the Live Translate extension.
 * More info can be found at http://www.mediawiki.org/wiki/Extension:LiveTranslate#Configuration
 *
 *                          NOTICE:
 * Changing one of these settings can be done by copieng or cutting it,
 * and placing it in LocalSettings.php, AFTER the inclusion of Live Translate.
 *
 * @file LiveTranslate_Settings.php
 * @ingroup LiveTranslate
 *
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

# The name of the page on which the special words translations dirctionary is defined.
$egLiveTranslateDirPage = 'Live Translate Dictionary';

# https://code.google.com/apis/console
$egGoogleApiKey = '';

# A list of languages that should be available to translate to.
$egLiveTranslateLanguages = array(
	$wgLanguageCode,
);

# A list of translation memory exchange (TMX) files.
$egLiveTranslateTXMFiles = array(

);

# A list of translation memory files in the Google CSV format.
$egLiveTranslateGCVSFiles = array(

);

# Permission to mannage translation memories.
$wgGroupPermissions['sysop']['managetms'] = true;
