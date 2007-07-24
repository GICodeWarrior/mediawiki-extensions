<?php

# Loader for spam blacklist feature
# Include this from LocalSettings.php

if ( defined( 'MEDIAWIKI' ) ) {

global $wgFilterCallback, $wgPreSpamFilterCallback;
global $wgSpamBlacklistFiles;
global $wgSpamBlacklistSettings;

$wgSpamBlacklistFiles = false;
$wgSpamBlacklistSettings = array();

if ( $wgFilterCallback ) {
	$wgPreSpamFilterCallback = $wgFilterCallback;
} else {
	$wgPreSpamFilterCallback = false;
}

$wgFilterCallback = 'wfSpamBlacklistLoader';
$wgExtensionCredits['other'][] = array(
	'name' => 'SpamBlacklist',
	'author' => 'Tim Starling',
	'url' => 'http://www.mediawiki.org/wiki/Extension:SpamBlacklist',
	'description' => 'Regex based anti spam tool',
);

$wgExtensionFunctions[] = 'wfSpamBlacklistMessageLoader';

$wgHooks['EditFilter'][] = 'wfSpamBlacklistValidate';
$wgHooks['ArticleSaveComplete'][] = 'wfSpamBlacklistClearCache';

function wfSpamBlacklistMessageLoader() {
	global $wgMessageCache;
	require_once( 'SpamBlacklist.i18n.php' );
	foreach( efSpamBlacklistMessages() as $lang => $messages ) {
		$wgMessageCache->addMessages( $messages, $lang );
	}
}

function wfSpamBlacklistLoader( &$title, $text, $section ) {
	static $spamObj = false;

	if ( $spamObj === false ) {
		$spamObj = wfSpamBlacklistObject();
	}

	return $spamObj->filter( $title, $text, $section );
}

function wfSpamBlacklistObject() {
	require_once( "SpamBlacklist_body.php" );
	global $wgSpamBlacklistFiles, $wgSpamBlacklistSettings, $wgPreSpamFilterCallback;
	$spamObj = new SpamBlacklist( $wgSpamBlacklistSettings );
	if( $wgSpamBlacklistFiles ) {
		$spamObj->files = $wgSpamBlacklistFiles;
	}
	$spamObj->previousFilter = $wgPreSpamFilterCallback;
	return $spamObj;
}

/**
 * Confirm that a local blacklist page being saved is valid,
 * and toss back a warning to the user if it isn't.
 */
function wfSpamBlacklistValidate( $editPage, $text, $section, &$hookError ) {
	$thisPageName = $editPage->mTitle->getPrefixedDBkey();
	
	$spamObj = wfSpamBlacklistObject();
	if( !$spamObj->isLocalSource( $editPage->mTitle ) ) {
		wfDebug( "Spam blacklist validator: [[$thisPageName]] not a local blacklist\n" );
		return true;
	}

	$lines = explode( "\n", $text );

	$badLines = SpamRegexBatch::getBadLines( $lines );
	if( $badLines ) {
		wfDebug( "Spam blacklist validator: [[$thisPageName]] given invalid input lines: " .
			implode( ', ', $badLines ) . "\n" );

		$badList = "*<tt>" .
			implode( "</tt>\n*<tt>",
				array_map( 'wfEscapeWikiText', $badLines ) ) .
			"</tt>\n";
		$hookError =
			"<div class='errorbox'>" .
			wfMsgExt( 'spam-invalid-lines', array( 'parsemag' ), count( $badLines ) ) .
			$badList .
			"</div>\n" .
			"<br clear='all' />\n";
		return true;
	} else {
		wfDebug( "Spam blacklist validator: [[$thisPageName]] ok or empty blacklist\n" );
		return true;
	}
}

/**
 * Clear local spam blacklist caches on page save.
 */
function wfSpamBlacklistClearCache( &$article, &$user, $text, $summary, $isminor, $iswatch, $section ) {
	$spamObj = wfSpamBlacklistObject();
	if( $spamObj->isLocalSource( $article->getTitle() ) ) {
		$spamObj->clearCache();
	}
	return true;
}


} # End invocation guard
