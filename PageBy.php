<?php
/**
 * PageBy extension - shows recent changes on a wiki page.
 *
 * @package MediaWiki
 * @subpackage Extensions
 * @author Daniel Kinzler, brightbyte.de
 * @copyright © 2007 Daniel Kinzler
 * @licence GNU General Public Licence 2.0 or later
 */

if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

$wgExtensionCredits['other'][] = array(
	'name' => 'PageBy',
	'version' => preg_replace('/^.* (\d\d\d\d-\d\d-\d\d) .*$/', '\1', '$LastChangedDate$'), #just the date of the last change
	'author' => 'Daniel Kinzler, brightbyte.de',
	'url' => 'http://mediawiki.org/wiki/Extension:PageBy',
	'description' => 'Shows contributors inline on a wiki page using the tag <nowiki><pageby></nowiki>',
	'descriptionmsg' => 'pageby-desc',
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['PageBy'] = $dir . 'PageBy.i18n.php';
$wgExtensionFunctions[] = "wfPageByExtension";

$wgAutoloadClasses['PageByRenderer'] = $dir. 'PageByRenderer.php';

function wfPageByExtension() {
    global $wgParser;
    $wgParser->setHook( "pageby", "newsxRenderPageBy" );
}

function newsxRenderPageBy( $page, $argv, &$parser ) {
    $renderer = new PageByRenderer($page, $argv, $parser);
    return $renderer->renderPageBy();
}
