<?php

// Stub extension created a couple years ago
// (c) Brion Vibber 2007-2011
// GPLv2 blah blah

// @todo add other file metadata types via {{#fileinfo:...}}

# Define a setup function
$wgExtensionFunctions[] = 'efFilesizeParserFunction_Setup';
# Add a hook to initialise the magic word
$wgHooks['LanguageGetMagic'][]       = 'efFilesizeParserFunction_Magic';
 
function efFilesizeParserFunction_Setup() {
	global $wgParser;
	# Set a function hook associating the "filesize" magic word with our function
	$wgParser->setFunctionHook( 'filesize', 'efFilesizeParserFunction_Render' );
}
 
function efFilesizeParserFunction_Magic( &$magicWords, $langCode ) {
	# Add the magic word
	# The first array element is case sensitive, in this case it is not case sensitive
	# All remaining elements are synonyms for our parser function
	$magicWords['filesize'] = array( 0, 'filesize' );
	# unless we return true, other parser functions extensions won't get loaded.
	return true;
}
 
function efFilesizeParserFunction_Render( &$parser, $filename = '' ) {
	# The parser function itself
	# The input parameters are wikitext with templates expanded
	# The output should be wikitext too
	$file = wfFindFile( $filename );
	if( $file && $file->exists() ) {
		global $wgContLang;
		return $wgContLang->formatSize( $file->getSize() );
	} else {
		return '';
	}
}
