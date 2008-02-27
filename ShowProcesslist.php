<?php
# Not a valid entry point, skip unless MEDIAWIKI is defined
if (!defined('MEDIAWIKI')) {
	echo "This file is part of MediaWiki, it is not a valid entry point.\n";
	exit( 1 );
}

$wgExtensionCredits['specialpage'][] = array(
	'name'           => 'ShowProcesslist',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:Show_Process_List',
	'author'         => 'Brion VIBBER',
	'version' => preg_replace('/^.* (\d\d\d\d-\d\d-\d\d) .*$/', '\1', '$LastChangedDate$'), #just the date of the last change
	'description'    => 'Display the output of SHOW FULL PROCESSLIST',
	'descriptionmsg' => 'showprocesslist-desc',
);

if ( !function_exists( 'extAddSpecialPage' ) ) {
	require( dirname(__FILE__) . '/../ExtensionFunctions.php' );
}
extAddSpecialPage( dirname(__FILE__) . '/ShowProcesslist_body.php', 'ShowProcesslist', 'ShowProcesslistPage' );
$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['showprocesslist'] = $dir . 'ShowProcesslist.i18n.php';
