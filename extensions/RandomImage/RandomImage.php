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
	$wgExtensionCredits['parserhook'][] = array(
		'name'           => 'RandomImage',
		'author'         => 'Rob Church',
		'url'            => 'http://www.mediawiki.org/wiki/Extension:RandomImage',
	'svn-date' => '$LastChangedDate$',
	'svn-revision' => '$LastChangedRevision$',
		'description'    => 'Provides a random media picker using <tt>&lt;randomimage /&gt;</tt>',
		'descriptionmsg' => 'randomimage-desc',
	);

	$dir = dirname(__FILE__) . '/';
	$wgAutoloadClasses['RandomImage'] = $dir . 'RandomImage.class.php';
	$wgExtensionMessagesFiles['RandomImage'] = $dir . 'RandomImage.i18n.php';
	$wgHooks['ParserAfterStrip'][] = 'RandomImage::stripHook';
	$wgExtensionFunctions[] = 'efRandomImageSetup';

	/**
	 * Set this to true to disable the parser cache for pages which
	 * contain a <randomimage> tag; this keeps the galleries up to date
	 * at the cost of a performance overhead on page views
	 */
	$wgRandomImageNoCache = false;

	/**
	 * Set this to true to ensure that images selected from the database
	 * have an "IMAGE" MIME type
	 */
	$wgRandomImageStrict = !$wgMiserMode;

	/**
	 * Extension initialisation function
	 */
	function efRandomImageSetup() {
		if(defined('MW_SUPPORTS_PARSERFIRSTCALLINIT')) {
			global $wgHooks;
			$wgHooks['ParserFirstCallInit'][] = 'efRandomImage';
		} else {
			global $wgParser;
			efRandomImage($wgParser);
		}
	}
	function efRandomImage($parser) {
		$parser->setHook( 'randomimage', 'RandomImage::renderHook' );
		return true;
	}

} else {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	exit( 1 );
}