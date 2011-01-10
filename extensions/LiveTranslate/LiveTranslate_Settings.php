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

# https://code.google.com/apis/console
$egGoogleApiKey = '';

# A list of languages that should be available to translate to.
$egLiveTranslateLanguages = array(
	$wgLanguageCode,
);

# Permission to mannage translation memories.
$wgGroupPermissions['sysop']['managetms'] = true;

# Default translation memory type.
# TMT_LTF, TMT_TMX, TMT_GCSV
$egLiveTranslateTMT = TMT_LTF;

# The name of the page on which the special words translations dirctionary is defined.
# NOTICE: This is only used for the initial setup. Use Special:LiveTranslate to modify after installation.
$egLiveTranslateDirPage = 'Live Translate Dictionary';
