<?php

# Alert the user that this is not a valid entry point to MediaWiki if they try to access the special pages file directly.
if ( !defined( 'MEDIAWIKI' ) ) {
	echo <<<EOT
To install my extension, put the following line in LocalSettings.php:
require_once( "\$IP/extensions/ContributionTracking/ContributionTracking.php" );
EOT;
	exit( 1 );
}

$wgExtensionCredits['specialpage'][] = array(
	'path'           => __FILE__,
	'name'           => 'ContributionTracking',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:ContributionTracking',
	'author'         => 'David Strauss',
	'descriptionmsg' => 'contributiontracking-desc',
);

$dir = dirname( __FILE__ ) . '/';

$wgExtensionMessagesFiles['ContributionTracking'] = $dir . 'ContributionTracking.i18n.php';
$wgExtensionAliasesFiles['ContributionTracking'] = $dir . 'ContributionTracking.alias.php';
$wgAutoloadClasses['ContributionTracking'] = $dir . 'ContributionTracking_body.php';
$wgSpecialPages['ContributionTracking'] = 'ContributionTracking';

$wgContributionTrackingDBserver = $wgDBserver;
$wgContributionTrackingDBname = $wgDBname;
$wgContributionTrackingDBuser = $wgDBuser;
$wgContributionTrackingDBpassword = $wgDBpassword;

function contributionTrackingConnection() {
	global $wgContributionTrackingDBserver, $wgContributionTrackingDBname;
	global $wgContributionTrackingDBuser, $wgContributionTrackingDBpassword;

	static $db;

	if ( !$db ) {
		$db = new DatabaseMysql(
			$wgContributionTrackingDBserver,
			$wgContributionTrackingDBuser,
			$wgContributionTrackingDBpassword,
			$wgContributionTrackingDBname );
		$db->query( "SET names utf8" );
	}

	return $db;
}
