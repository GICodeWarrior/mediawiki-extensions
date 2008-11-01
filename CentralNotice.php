<?php

// Override this URL to point to the central notice text loader...
// This guy gets loaded from every page on every wiki, so caching helps!
///
// Can be set to a directory where static files will be made --
// match that up with $wgNoticeStaticDirectory and use rebuildTemplates.php
// to fill out the directory tree.
//
// Default: Local path to Special:NoticeText
//
// Loads: $wgNoticeCentralPath/<project>/<lang>/centralnotice.js
//
$wgNoticeCentralPath = false;

// This guy does much the same, but with the local sitenotice/anonnotice.
// Static generation isn't quite supported yet.
//
// Default: Local path to Special:NoticeLocal
//
// Loads: $wgNoticeLocalPath/sitenotice.js
//   -or- $wgNoticeLocalPath/anonnotice.js
//
$wgNoticeLocalPath = false;

// Override these per-wiki to pass on via the loader to the text system
// for localization by language and project.
// Actual user language is used for localization; $wgNoticeLang is used
// for selective enabling/disabling on sites.
$wgNoticeLang = $wgLanguageCode;
$wgNoticeProject = 'wikipedia';

// List of available projects, which will be used to generate static
// output .js in the batch generation...
$wgNoticeProjects = array(
	'wikipedia',
	'wiktionary',
	'wikiquote',
	'wikibooks',
	'wikinews',
	'wikisource',
	'wikiversity',
	'wikimedia',
	'commons',
	'meta',
	'wikispecies',
);

// Local filesystem path under which static .js output is written
// for the central notice system.
//
// $wgNoticeCentralDirectory = "/mnt/uploads/centralnotice";
//
$wgNoticeCentralDirectory = false;

// Local filesystem path under which static .js output is written
// for this wiki's local sitenotice and anonnotice.
//
// $wgNoticeLocalDirectory = "/mnt/uploads/sitenotice/$wgDBname";
//
$wgNoticeLocalDirectory = false;

// Enable the notice-hosting infrastructure on this wiki...
// Leave at false for wikis that only use a sister site for the control.
// All remaining options apply only to the infrastructure wiki.
$wgNoticeInfrastructure = true;

// Enable the loader itself
// Allows to control the loader visibility, without destroying infrastructure
// for cached content
$wgCentralNoticeLoader = true;

// If true, notice only displays if 'sitenotice=yes' is in the query string
$wgNoticeTestMode = false;

// Array of '$lang.$project' for exceptions to the test mode rule
$wgNoticeEnabledSites = array();

// Client-side cache timeout for the loader JS stub.
// If 0, clients will (probably) rechceck it on every hit,
// which is good for testing.
$wgNoticeTimeout = 0;

// Server-side cache timeout for the loader JS stub.
// Should be big if you won't include the counter info in the text,
// smallish if you will. :)
$wgNoticeServerTimeout = 0;

// Source for live counter information
$wgNoticeCounterSource = "http://donate.wikimedia.org/counter.php";

$wgExtensionFunctions[] = 'efCentralNoticeSetup';

$wgExtensionCredits['other'][] = array(
	'name'           => 'CentralNotice',
	'author'         => 'Brion Vibber',
	'svn-date'       => '$LastChangedDate$',
	'svn-revision'   => '$LastChangedRevision$',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:CentralNotice',
	'description'    => 'Adds a central sitenotice',
	'descriptionmsg' => 'centralnotice-desc',
);

$dir = dirname( __FILE__ ) . '/';

$wgExtensionMessagesFiles['CentralNotice'] = $dir . 'CentralNotice.i18n.php';

function efCentralNoticeSetup() {
	global $wgHooks, $wgNoticeInfrastructure, $wgAutoloadClasses, $wgSpecialPages;
	global $wgCentralNoticeLoader;
	
	$dir = dirname( __FILE__ ) . '/';
	
	if( $wgCentralNoticeLoader ) {
		$wgHooks['SiteNoticeAfter'][] = 'efCentralNoticeLoader';
	}
	
	$wgHooks['ArticleSaveComplete'][] = 'efCentralNoticeLocalSaveHook';
	$wgHooks['ArticleSaveComplete'][] = 'efCentralNoticeLocalDeleteHook';
	
	$wgAutoloadClasses['NoticePage'] = $dir . 'NoticePage.php';
	
	$wgSpecialPages['NoticeLocal'] = 'SpecialNoticeLocal';
	$wgAutoloadClasses['SpecialNoticeLocal'] = $dir . 'SpecialNoticeLocal.php';

	if ( $wgNoticeInfrastructure ) {
		$wgHooks['ArticleSaveComplete'][] = 'efCentralNoticeSaveHook';
		$wgHooks['ArticleSaveComplete'][] = 'efCentralNoticeDeleteHook';
		
		$wgAvailableRights[] = 'centralnotice_admin_rights';
		$wgGroupPermissions['sysop']['centralnotice_admin_rights'] = true; // Only sysops can make change
		$wgGroupPermissions['sysop']['centralnotice_translate_rights'] = true; // Only sysops can make change
		
		$wgSpecialPages['CentralNotice'] = 'CentralNotice';
		$wgSpecialPages['NoticeTemplate'] = 'SpecialNoticeTemplate';
		$wgSpecialPageGroups['CentralNotice'] = 'wiki'; // Wiki data and tools"
		$wgAutoloadClasses['CentralNotice'] = $dir . 'SpecialCentralNotice.php';
		
		$wgSpecialPages['NoticeLoader'] = 'SpecialNoticeLoader';
		$wgAutoloadClasses['SpecialNoticeLoader'] = $dir . 'SpecialNoticeLoader.php';
		
		$wgSpecialPages['NoticeText'] = 'SpecialNoticeText';
		$wgAutoloadClasses['SpecialNoticeText'] = $dir . 'SpecialNoticeText.php';
		
		$wgSpecialPages['NoticeTemplate'] = 'SpecialNoticeTemplate';
		$wgAutoloadClasses['SpecialNoticeTemplate'] = $dir . 'SpecialNoticeTemplate.php';
	}
}

function efCentralNoticeLoader( &$notice ) {
	global $wgScript, $wgUser, $wgLang;
	global $wgNoticeProject;
	
	global $wgNoticeCentralPath;
	global $wgNoticeLocalPath;
	
	$lang = $wgLang->getCode();
	$centralNotice = "$wgNoticeProject/$lang/centralnotice.js";
	$localNotice = ( is_object( $wgUser ) && $wgUser->isLoggedIn() )
		? 'sitenotice.js'
		: 'anonnotice.js';

	
	if ( $wgNoticeCentralPath === false ) {
		$centralLoader = SpecialPage::getTitleFor( 'NoticeText', $centralNotice )->getLocalUrl();
	} else {
		$centralLoader = "$wgNoticeCentralPath/$centralNotice";
	}
	$encCentralLoader = htmlspecialchars( $centralLoader );

	if ( $wgNoticeLocalPath === false ) {
		$localLoader = SpecialPage::getTitleFor( 'NoticeLocal', $localNotice )->getLocalUrl();
	} else {
		$localLoader = "$wgNoticeLocalPath/$localNotice";
	}
	$encLocalLoader = htmlspecialchars( $localLoader );

	// Throw away the classic notice, use the central loader...
	$notice = <<<EOT
<script type="text/javascript">
var wgNotice = "";
var wgNoticeLocal = "";
</script>
<script type="text/javascript" src="$encCentralLoader"></script>
<script type="text/javascript" src="$encLocalLoader"></script>
<script type="text/javascript">
if (wgNotice != "") {
  document.writeln(wgNotice);
}
if (wgNoticeLocal != "") {
  document.writeln(wgNoticeLocal);
}
</script>
EOT;
	return true;
}

/**
 * 'ArticleSaveComplete' hook
 * Trigger a purge of the notice loader when we've updated the source pages.
 */
function efCentralNoticeSaveHook( $article, $user, $text, $summary, $isMinor,
	$isWatch, $section, $flags, $revision ) {
	efCentralNoticeMaybePurge( $article->getTitle() );
	
	// Continue
	return true;
}

/**
 * 'ArticleSaveComplete' hook
 * Trigger a purge of the local notice when we've updated the source pages.
 */
function efCentralNoticeLocalSaveHook( $article, $user, $text, $summary, $isMinor,
    $isWatch, $section, $flags, $revision ) {
	efCentralNoticeMaybePurgeLocal( $article->getTitle() );
	
	// Continue
	return true;
}

/**
 * 'ArticleDeleteComplete' hook
 * Trigger a purge of the notice loader if this removed one of the source pages.
 */
function efCentralNoticeDeleteHook( $article, $user, $reason ) {
	efCentralNoticeMaybePurge( $article->getTitle() );
	
	// Continue
	return true;
}

/**
 * 'ArticleDeleteComplete' hook
 * Trigger a purge of the local notice if this removed one of the source pages.
 */
function efCentralNoticeLocalDeleteHook( $article, $user, $reason ) {
	efCentralNoticeMaybePurgeLocal( $article->getTitle() );
	
	// Continue
	return true;
}

/**
 * Purge the notice loader if the given page would affect notice display.
 */
function efCentralNoticeMaybePurge( $title ) {
	if ( $title->getNamespace() == NS_MEDIAWIKI &&
		substr( $title->getText(), 0, 14 ) == 'Centralnotice-' ) {
		efCentralNoticePurge();
	}
}

/**
 * Purge the notice loader if the given page would affect notice display.
 */
function efCentralNoticeMaybePurgeLocal( $title ) {
	if ( $title->getNamespace() == NS_MEDIAWIKI ) {
		global $wgScript;
		
		$purge = array();
		if ( $title->getText() == 'Sitenotice' ) {
			$purge[] = "$wgScript?title=Special:NoticeLocal&action=raw";
		}
		if ( $title->getText() == 'Sitenotice' || $title->getText() == 'Anonnotice' ) {
			$purge[] = "$wgScript?title=Special:NoticeLocal/anon&action=raw";
		}
		
		// Purge the squiddies...
		if ( $purge ) {
			$u = new SquidUpdate( $purge );
			$u->doUpdate();
		}
	}
}

/**
 * Purge the notice loader, triggering a refresh in all clients
 * once $wgNoticeTimeout has expired.
 */
function efCentralNoticePurge() {
	global $wgNoticeLoader;
	
	// Update the notice epoch...
	efCentralNoticeUpdateEpoch();
	
	// Purge the central loader URL...
	$u = new SquidUpdate( array( $wgNoticeLoader ) );
	$u->doUpdate();
}

/**
 * Return a nice little epoch that gives the last time we updated
 * something in the notice...
 * @return string timestamp
 */
function efCentralNoticeEpoch() {
	global $wgMemc;
	
	$epoch = $wgMemc->get( 'centralnotice-epoch' );
	if ( $epoch ) {
		return wfTimestamp( TS_MW, $epoch );
	} else {
		return efCentralNoticeUpdateEpoch();
	}
}

/**
 * Update the epoch.
 * @return string timestamp
 */
function efCentralNoticeUpdateEpoch() {
	global $wgMemc, $wgNoticeServerTimeout;
	
	$epoch = wfTimestamp( TS_MW );
	$wgMemc->set( "centralnotice-epoch", $epoch, $wgNoticeServerTimeout );
	return $epoch;
}
