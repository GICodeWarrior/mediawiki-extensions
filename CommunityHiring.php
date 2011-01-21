<?php
// Community department job applications

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'CommunityHiring',
	'author' => 'Andrew Garrett',
	'url' => 'http://www.mediawiki.org/wiki/Extension:CommunityHirings',
);

$wgSpecialPages['CommunityHiring'] = 'SpecialCommunityHiring';
$wgAutoloadClasses['SpecialCommunityHiring'] = dirname(__FILE__) . "/SpecialCommunityHiring.php";

$wgExtensionMessagesFiles['CommunityHiring'] = dirname( __FILE__ ) . "/CommunityHiring.i18n.php";

$wgCommunityHiringDatabase = false;
