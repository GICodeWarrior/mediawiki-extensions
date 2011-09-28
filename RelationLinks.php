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
$wgExtensionCredits['other'][] = array(
    'path' => __FILE__,
    'name' => 'RelationLinks',
    'author' => '[http://www.dasch-tour.de DaSch]',
    'description' => 'Adds link rel to header, that can used for navigation and for SEO',
	'version'       =>  '0.2.1',
    'url' => 'http://www.mediawiki.org/wiki/Extension:RelationLinks',
);

$wgHooks['ParserBeforeTidy'][] = 'addRelationLinks';

function addRelationLinks( &$parser, &$text ) {
	global $wgArticlePath, $wgTitle;
	$parser->mOutput->addHeadItem('<link rel="start" type="text/html" title="'. wfMsg('Mainpage') .'" href="'. str_replace( '$1', wfMsg('Mainpage'), $wgArticlePath ) .'" />');
	$parser->mOutput->addHeadItem('<link rel="up" type="text/html" title="'. $wgTitle->getBaseText() .'" href="'. str_replace( '$1', $wgTitle->getBaseText(), $wgArticlePath ) .'" />');
	$parser->mOutput->addHeadItem('<link rel="help" type="text/html" title="'. wfMsg('Helppage') .'" href="'. str_replace( '$1', wfMsg('Helppage'), $wgArticlePath ) .'" />');
	$parser->mOutput->addHeadItem('<link rel="index" type="text/html" title="'. wfMsg('Allpages') .'" href="'. str_replace( '$1', 'Special:AllPages', $wgArticlePath ) . '" />');
	$parser->mOutput->addHeadItem('<link rel="search" type="text/html" title="'. wfMsg('Search') .'" href="'. str_replace( '$1', 'Special:Search', $wgArticlePath ) . '" />');
	return true;
}
