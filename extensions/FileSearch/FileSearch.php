<?php

/**
 * Extension allows MediaWiki to index recognised uploaded files
 * for more intelligent searching
 *
 * @file
 * @ingroup Extensions
 * @author Rob Church <robchur@gmail.com>
 */
 
if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	exit( 1 );
}

$wgExtensionCredits['other'][] = array(
	'path'           => __FILE__,
	'name'           => 'FileSearch',
	'author'         => '',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:FileSearch',
);

$wgExtensionFunctions[] = 'efFileSearchSetup';
$wgAutoloadClasses['FileSearchIndexer'] = dirname( __FILE__ ) . '/FileSearchIndexer.php';
$wgAutoloadClasses['Extractor'] = dirname( __FILE__ ) . '/extract/Extractor.php';
$wgFileSearchExtractors['TextExtractor'] = dirname( __FILE__ ) . '/extract/TextExtractor.php';

function efFileSearchSetup() {
	global $wgHooks;
	$wgHooks['FileUpload'][] = 'FileSearchIndexer::upload';
	$wgHooks['SearchUpdate'][] = 'FileSearchIndexer::index';
	#FileSearchIndexer::initialise();
}

