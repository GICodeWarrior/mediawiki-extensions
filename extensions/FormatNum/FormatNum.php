<?php
/**
* @addtogroup Extensions
*/
// Check environment
if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
	die( -1 );
}

/* Configuration */

// Credits
$wgExtensionCredits['parserhook'][] = array (
	'path'=> __FILE__ ,
	'name'=>'FormatNum',
	'url'=>'http://www.mediawiki.org/wiki/Extension:FormatNum',
	'descriptionmsg' => 'formatnum-desc',
	'author'=>'[http://www.dasch-tour.de DaSch]',
	'version'=>'0.2.0',
);
$dir = dirname( __FILE__ ) . '/';

// Internationalization
$wgExtensionMessagesFiles['FormatNum'] = $dir . 'FormatNum.i18n.php';

# Define a setup function
$wgHooks['ParserFirstCallInit'][] = 'efFormatNumParserFunction_Setup';
# Add a hook to initialise the magic word
$wgHooks['LanguageGetMagic'][]    = 'efFormatNumParserFunction_Magic';

function efFormatNumParserFunction_Setup( $parser ) {
	# Set a function hook associating the "example" magic word with our function
	$parser->setFunctionHook( 'formatnum', 'efFormatNumParserFunction_Render' );
	return true;
}

function efFormatNumParserFunction_Magic( &$magicWords, $langCode ) {
	# Add the magic word
	# The first array element is case sensitive, in this case it is not case sensitive
	# All remaining elements are synonyms for our parser function
	$magicWords['formatnum'] = array( 0, 'formatnum' );
	# unless we return true, other parser functions extensions won't get loaded.
	return true;
}

function efFormatNumParserFunction_Render( $parser, $param1 = 0, $param2 = 0, $param3 = '.', $param4 = ',' ) {
	# The parser function itself
	# The input parameters are wikitext with templates expanded
	# The output should be wikitext too
	if ( $param4 == '_' ){
		$param4 = ' ';
	}
	$output = number_format( $param1, $param2, $param3, $param4 );
	switch ($param4) {
		case 't':
			$output = str_replace ( 't', '&thinsp;', $output );
			break;
		case 'n':
			$output = str_replace ( 'n', '&nbsp;', $output );
			break;
	}
	return $output;
}