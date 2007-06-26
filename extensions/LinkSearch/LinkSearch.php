<?php

/**
 * Quickie special page to search the external-links table.
 * Currently only 'http' links are supported; LinkFilter needs to be
 * changed to allow other pretties.
 */

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'Linksearch',
	'author' => 'Brion Vibber',
	'description' => 'Search for Weblinks',
	'url' => 'http://www.mediawiki.org/wiki/Extension:LinkSearch',
);
$wgHooks['LoadAllMessages'][] = 'LinkSearchSpecialPage::initMessages';

$wgSpecialPages['Linksearch'] = array( /*class*/ 'LinkSearchSpecialPage', 
	/*name*/ 'Linksearch', /* permission */'', /*listed*/ true, 
	/*function*/ false, /*file*/ false );
$wgAutoloadClasses['LinkSearchPage'] = dirname(__FILE__) . '/LinkSearch_body.php';
$wgAutoloadClasses['LinkSearchSpecialPage'] = dirname(__FILE__) . '/LinkSearch_body.php';
?>
