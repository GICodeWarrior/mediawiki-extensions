<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	exit(1);
}

$wgExtensionCredits['other'][] = array(
	'name' => 'Title Blacklist',
	'author' => 'VasilievVV',
	'description' => 'Allows to forbide creation of pages with specified titles'
);

$wgAutoloadClasses['TitleBlacklist']      = dirname( __FILE__ ) . '/TitleBlacklist.list.php';
$wgAutoloadClasses['TitleBlacklistHooks'] = dirname( __FILE__ ) . '/TitleBlacklist.hooks.php';

$wgExtensionFunctions[] = 'efInitTitleBlacklist';


$wgAvailableRights[] = 'tboverride';
$wgGroupPermissions['sysop']['tboverride'] = true;

function efInitTitleBlacklist() {
	global $wgTitleBlacklist;
	$wgTitleBlacklist = new TitleBlacklist();
	efSetupTitleBlacklistMessages();
	efSetupTitleBlacklistHooks();
}

function efSetupTitleBlacklistMessages() {
	global $wgMessageCache;
	require_once( 'TitleBlacklist.i18n.php' );
	foreach( efGetTitleBlacklistMessages() as $lang => $messages ) {
		$wgMessageCache->addMessages( $messages, $lang );
	}
}

function efSetupTitleBlacklistHooks() {
	global $wgHooks;
	$titleBlacklistHooks = new TitleBlacklistHooks();
	$wgHooks['userCan'][]   = array( $titleBlacklistHooks, 'userCan' );
	$wgHooks['AbortMove'][] = array( $titleBlacklistHooks, 'abortMove' );
	$wgHooks['UploadVerification'][] = array( $titleBlacklistHooks, 'verifyUpload' );
}