<?php
/*
 * config file for hawpedia
 * $Date$
 */

define("HAWIKI_TITLE",		"Wikipedia");    // browser window title
define("HAWPEDIA_ICON", "images/81px-Wikipedia-logo"); // must exist as .gif and .wbmp version
define("HAWPEDIA_ICON_WIDTH", 81);
define("HAWPEDIA_ICON_HEIGHT", 81);
define("DEFAULT_LANGUAGE",	"en");
define('FORCE_DEFAULT_LANGUAGE', 'subdomain');
						// not defined or FALSE - use browsers accept-language setting,
						//	if supported, else DAFAULT_LANGUAGE;
						// TRUE - always use DEFAULT_LANGUAGE;
						// 'subdomain' - use 1st (leftmost) subdomain as language code
						//	if supported, else DAFAULT_LANGUAGE.
define('DISABLE_IMAGES',	false);	// do not output images, if set & true.
define('IMG_MAX_WIDTH',		128);	// pixels maximum width for images (may be further reduced by displa size)

define("SEGLENGTH_WML",  600);
define("SEGLENGTH_HDML", 600);
define("SEGLENGTH_HTML", 2000);
define("SEGLENGTH_VXML", 10000000);

// comment out next line to disable vxml dispatcher 
//define("HAWPEDIA_VXML_TMP_FILE", "/tmp/hawpedia_vxml_dispatcher.tmp"); 

$supportedLanguages = Array(
"ar" => 1,
"bar" => 1,
"cs" => 1,
"de" => 1,
"el" => 1,
"en" => 1,
"es" => 1,
"fr" => 1,
"hu" => 1,
"ksh" => 1,
"nds" => 1,
"nl" => 1,
"pt" => 1,
"sr" => 1,
"zxx" => 0);

?>
