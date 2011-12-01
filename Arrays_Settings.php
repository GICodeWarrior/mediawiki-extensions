<?php

/**
 * File defining the settings for the 'Arrays' extension.
 * More info can be found at http://www.mediawiki.org/wiki/Extension:Arrays#Configuration
 *
 * NOTICE:
 * =======
 * Changing one of these settings can be done by copying and placing
 * it in LocalSettings.php, AFTER the inclusion of 'Arrays'.
 *
 * @file Arrays_Settings.php
 * @ingroup Arrays
 * @since 2.0
 *
 * @author Daniel Werner
 */

/**
 * Full compatbility to versions before 1.4.
 * Set to true by default since version 2.0.
 * Regretable, this one has a speclling error...
 *
 * @since 1.4 alpha
 *
 * @var boolean
 */
$egArrayExtensionCompatbilityMode = false;

/**
 * Contains a key-value par list of characters that should be replaced by a template or parser function
 * call within array values included into an #arrayprint. By replacing these special characters before
 * including the values into the string which is being parsed afterwards, array values can't distract
 * the surounding MW code. Otherwise the array values themselves would be parsed as well.
 *
 * This has no effect in case $egArrayExtensionCompatbilityMode is set to false!
 * 
 * @since 2.0
 *
 * @var array
 */
$egArraysEscapeTemplates = array(
	'='  => '{{=}}',
	'|'  => '{{!}}',
	'{{' => '{{((}}',
	'}}' => '{{))}}'
);