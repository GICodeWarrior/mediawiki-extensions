<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "This is the OggHandler extension. Please see the README file for installation instructions.\n";
	exit( 1 );
}

$oggDir = dirname(__FILE__);
$wgAutoloadClasses['OggHandler'] = "$oggDir/OggHandler_body.php";
$wgMediaHandlers['application/ogg'] = 'OggHandler';
if ( !in_array( 'ogg', $wgFileExtensions ) ) {
	$wgFileExtensions[] = 'ogg';
}
ini_set( 'include_path', 
	"$oggDir/PEAR/File_Ogg" .
	PATH_SEPARATOR .
	ini_get( 'include_path' ) );

// Bump this when updating OggPlayer.js to help update caches
$wgOggScriptVersion = '1';

$wgFFmpegLocation = 'ffmpeg';
$wgExtensionMessagesFiles['OggHandler'] = "$oggDir/OggHandler.i18n.php";
$wgParserOutputHooks['OggHandler'] = array( 'OggHandler', 'outputHook' );
$wgHooks['LanguageGetMagic'][] = 'OggHandler::registerMagicWords';

// Filename or URL path to the Cortado Java player applet.
//
// If no path is included, the path to this extension's
// directory will be used by default -- this should work
// on most local installations.
//
// You may need to include a full URL here if $wgUploadPath
// specifies a host different from where the wiki pages are
// served -- the applet .jar file must come from the same host
// as the uploaded media files or Java security rules will
// prevent the applet from loading them.
//
$wgCortadoJarFile = "cortado-ovt-stripped-0.2.2.1-patched.jar";
#$wgCortadoJarFile = "cortado-ovt-stripped-0.2.2.jar";

?>
