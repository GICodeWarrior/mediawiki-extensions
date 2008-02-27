<?php
/**
 * Extension adds "next" and "previous" alphabetic paging links to
 * the top of articles
 *
 * @addtogroup Extensions
 * @author Rob Church <robchur@gmail.com>
 */

if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

$wgAutoloadClasses['BackAndForth'] = dirname( __FILE__ ) . '/BackAndForth.class.php';
$wgExtensionFunctions[] = 'efBackAndForth';
$wgExtensionCredits['other'][] = array(
	'name' => 'Back and Forth',
	'version' => preg_replace('/^.* (\d\d\d\d-\d\d-\d\d) .*$/', '\1', '$LastChangedDate$'), #just the date of the last change
	'author' => 'Rob Church',
	'description' => 'Adds "Next" and "Previous" alphabetic paging links to the top of articles',
	'descriptionmsg' => 'backforth-desc',
	'url' => 'http://www.mediawiki.org/wiki/Extension:Back-and-Forth',
);

$wgExtensionMessagesFiles['BackAndForth'] = dirname(__FILE__) . '/BackAndForth.i18n.php';

/**
 * Extension setup function
 */
function efBackAndForth() {
	global $wgHooks;

	wfLoadExtensionMessages( 'BackAndForth' );

	$wgHooks['ArticleViewHeader'][] = 'BackAndForth::viewHook';
}
