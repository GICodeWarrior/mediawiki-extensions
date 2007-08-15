<?php

/**
 * Parser hook extension to add a <randomimage> tag
 *
 * @addtogroup Extensions
 * @author Rob Church <robchur@gmail.com>
 * @copyright © 2006 Rob Church
 * @licence GNU General Public Licence 2.0
 */
 
if( defined( 'MEDIAWIKI' ) ) {

	$wgAutoloadClasses['RandomImage'] = dirname( __FILE__ ) . '/RandomImage.class.php';
	$wgExtensionFunctions[] = 'efRandomImage';
	$wgExtensionCredits['parserhook'][] = array(
		'name' => 'RandomImage',
		'author' => 'Rob Church',
		'url' => 'http://www.mediawiki.org/wiki/Extension:RandomImage',
		'description' => 'Provides a random media picker using <tt>&lt;randomimage /&gt;</tt>',
	);
	
	/**
	 * Set this to true to disable the parser cache for pages which
	 * contain a <randomimage> tag; this keeps the galleries up to date
	 * at the cost of a performance overhead on page views
	 */
	$wgRandomImageNoCache = false;
	
	/**
	 * Extension initialisation function
	 */
	function efRandomImage() {
		global $wgParser;
		$wgParser->setHook( 'randomimage', 'RandomImage::hook' );
	}
	
} else {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	exit( 1 );
}