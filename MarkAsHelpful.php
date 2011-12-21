<?php
/**
 * HelpfulMarker extension
 * Allows specified users to mark certain objects as "Helpful"
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die();
}

// Extension credits that will show up on Special:Version
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'MarkAsHelpful',
	'version' => '0.1',
	'author' => array( 'Rob Moen', 'Benny Situ' ),
	'descriptionmsg' => 'markashelpful-desc',
	'url' => 'https://www.mediawiki.org/wiki/Mark_as_Helpful', // FIXME: A page in the extension namespace should be created
);

$dir = dirname( __FILE__ ) . '/';
// Object model
$wgAutoloadClasses['MarkAsHelpfulItem'] = $dir . 'includes/MarkAsHelpfulItem.php';
$wgAutoloadClasses['MarkAsHelpfulUtil'] = $dir . 'includes/MarkAsHelpfulUtil.php';

// API
$wgAutoloadClasses['ApiMarkAsHelpful'] = $dir . 'api/ApiMarkAsHelpful.php';
$wgAPIModules['markashelpful'] = 'ApiMarkAsHelpful';
$wgAutoloadClasses['ApiGetMarkAsHelpfulItem'] = $dir . 'api/ApiGetMarkAsHelpfulItem.php';
$wgAPIModules['getmarkashelpfulitem'] = 'ApiGetMarkAsHelpfulItem';

// Hooks
$wgAutoloadClasses['MarkAsHelpfulHooks'] = $dir . 'MarkAsHelpful.hooks.php';
$wgHooks['BeforePageDisplay'][] = 'MarkAsHelpfulHooks::onPageDisplay';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'MarkAsHelpfulHooks::onLoadExtensionSchemaUpdates';
$wgHooks['MakeGlobalVariablesScript'][] = 'MarkAsHelpfulHooks::makeGlobalVariablesScript';

// Special pages


// User rights
$wgAvailableRights[] = 'markashelpful-view';
$wgAvailableRights[] = 'markashelpful-admin';

$wgGroupPermissions['sysop']['makrashelpful-admin'] = true;

// Internationalisation
$wgExtensionMessagesFiles['MarkAsHelpful'] = $dir . 'MarkAsHelpful.i18n.php';

// Resources
$mahResourceTemplate = array(
	'localBasePath' => $dir . 'modules',
	'remoteExtPath' => 'MarkAsHelpful/modules'
);

$wgResourceModules['ext.markAsHelpful'] = $mahResourceTemplate + array(
	'styles' => 'ext.markAsHelpful/ext.markAsHelpful.css',
	'scripts' => 'ext.markAsHelpful/ext.markAsHelpful.js',
	'messages' => array(
		'helpful-text',
	),
	'position' => 'bottom',
	'dependencies' => array(
		'mediawiki.util'
	),
);