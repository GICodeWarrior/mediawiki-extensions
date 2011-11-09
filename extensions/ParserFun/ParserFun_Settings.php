<?php

/**
 * File defining the settings for the 'Parser Fun' extension.
 * More info can be found at http://www.mediawiki.org/wiki/Extension:Parser_Fun#Configuration
 *
 * NOTICE:
 * =======
 * Changing one of these settings can be done by copying and placing
 * it in LocalSettings.php, AFTER the inclusion of 'Parser Fun'.
 *
 * @file ParserFun_Settings.php
 * @ingroup ParserFun
 * @since 0.1
 *
 * @author Daniel Werner
 */

/**
 * Allows to define which functionalities provided by 'Parser Fun' should be disabled for the wiki.
 * 
 * @example
 * # disable 'THIS' prefix functionality:
 * $egParserFunDisabledFunctions = array( 'this' );
 * # disable '#parse' parser function:
 * $egParserFunDisabledFunctions = array( 'parse' );
 * 
 * @since 1.0.1
 * @var array
 */
$egParserFunDisabledFunctions = array();
