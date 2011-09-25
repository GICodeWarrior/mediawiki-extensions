<?php
/**
 * MoodBar extension
 * Allows specified users to send their "mood" back to the site operator.
 */

$wgExtensionCredits['other'][] = array(
	'author' => array( 'Andrew Garrett', 'Timo Tijhof' ),
	'descriptionmsg' => 'moodbar-desc',
	'name' => 'MoodBar',
	'url' => 'http://www.mediawiki.org/wiki/MoodBar',
	'version' => '0.1',
	'path' => __FILE__,
);

// Object model
$wgAutoloadClasses['MBFeedbackItem'] = dirname(__FILE__).'/FeedbackItem.php';
$wgAutoloadClasses['MoodBarFormatter'] = dirname(__FILE__).'/Formatter.php';

// API
$wgAutoloadClasses['ApiMoodBar'] = dirname(__FILE__).'/ApiMoodBar.php';
$wgAPIModules['moodbar'] = 'ApiMoodBar';
$wgAutoloadClasses['ApiQueryMoodBarComments'] = dirname( __FILE__ ). '/ApiQueryMoodBarComments.php';
$wgAPIListModules['moodbarcomments'] = 'ApiQueryMoodBarComments';

// Hooks
$wgAutoloadClasses['MoodBarHooks'] = dirname(__FILE__).'/MoodBar.hooks.php';
$wgHooks['BeforePageDisplay'][] = 'MoodBarHooks::onPageDisplay';
$wgHooks['ResourceLoaderGetConfigVars'][] = 'MoodBarHooks::resourceLoaderGetConfigVars';
$wgHooks['MakeGlobalVariablesScript'][] = 'MoodBarHooks::makeGlobalVariablesScript';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'MoodBarHooks::onLoadExtensionSchemaUpdates';

// Special pages
$wgAutoloadClasses['SpecialMoodBar'] = dirname(__FILE__).'/SpecialMoodBar.php';
$wgSpecialPages['MoodBar'] = 'SpecialMoodBar';
$wgAutoloadClasses['SpecialMoodBarFeedback'] = dirname( __FILE__ ) . '/SpecialMoodBarFeedback.php';
$wgSpecialPages['MoodBarFeedback'] = 'SpecialMoodBarFeedback';

// User rights
$wgAvailableRights[] = 'moodbar-view';

// Internationalisation
$wgExtensionMessagesFiles['MoodBar'] = dirname(__FILE__).'/MoodBar.i18n.php';
$wgExtensionMessagesFiles['MoodBarAliases'] = dirname( __FILE__ ) . '/MoodBar.alias.php';

// Resources
$mbResourceTemplate = array(
	'localBasePath' => dirname(__FILE__) . '/modules',
	'remoteExtPath' => 'MoodBar/modules'
);

$wgResourceModules['ext.moodBar.init'] = $mbResourceTemplate + array(
	'styles' => 'ext.moodBar/ext.moodBar.init.css',
	'scripts' => 'ext.moodBar/ext.moodBar.init.js',
	'messages' => array(
		'moodbar-trigger-feedback',
		'moodbar-trigger-share',
		'moodbar-trigger-editing',
		'tooltip-p-moodbar-trigger-feedback',
		'tooltip-p-moodbar-trigger-share',
		'tooltip-p-moodbar-trigger-editing',
	),
	'position' => 'top',
	'dependencies' => array(
		'jquery.cookie',
		'jquery.client',
	),
);

$oldVersion = version_compare( $wgVersion, '1.17', '<=' );

if ( !$oldVersion ) {
	$wgResourceModules['ext.moodBar.init']['dependencies'][] = 'mediawiki.user';
}

$wgResourceModules['ext.moodBar.core'] = $mbResourceTemplate + array(
	'styles' => 'ext.moodBar/ext.moodBar.core.css',
	'scripts' => 'ext.moodBar/ext.moodBar.core.js',
	'messages' => array(
		'moodbar-close',
		'moodbar-intro-feedback',
		'moodbar-intro-share',
		'moodbar-intro-editing',
		'moodbar-type-happy-title',
		'moodbar-type-sad-title',
		'moodbar-type-confused-title',
		'tooltip-moodbar-what',
		'moodbar-what-target',
		'moodbar-what-label',
		'moodbar-what-expanded',
		'moodbar-what-collapsed',
		'moodbar-what-content',
		'moodbar-what-link',
		'moodbar-form-title',
		'moodbar-form-note',
		'moodbar-form-note-dynamic',
		'moodbar-form-policy-text',
		'moodbar-form-policy-label',
		'moodbar-form-submit',
		'moodbar-privacy',
		'moodbar-privacy-link',
		'moodbar-disable-link',
		'moodbar-loading-title',
		'moodbar-error-title',
		'moodbar-success-title',
		'moodbar-loading-subtitle',
		'moodbar-error-subtitle',
		'moodbar-success-subtitle',
	),
	'dependencies' => array(
		'mediawiki.util',
		'ext.moodBar.init', // just in case
		'jquery.localize',
		'jquery.moodBar',
	),
	'position' => 'bottom',
);

$wgResourceModules['ext.moodBar.dashboard'] = $mbResourceTemplate + array(
	'scripts' => 'ext.moodBar.dashboard/ext.moodBar.dashboard.js',
	'dependencies' => array( 'mediawiki.util' ),
	'messages' => array( 'moodbar-feedback-nomore', 'moodbar-feedback-ajaxerror' ),
);

$wgResourceModules['ext.moodBar.dashboard.styles'] = $mbResourceTemplate + array(
	'styles' => 'ext.moodBar.dashboard/ext.moodBar.dashboard.css',
);

$wgResourceModules['jquery.moodBar'] = $mbResourceTemplate + array(
	'scripts' => 'jquery.moodBar/jquery.moodBar.js',
	'dependencies' => array(
		'mediawiki.util',
	),
);

/** Configuration **/
/** The registration time after which users will be shown the MoodBar **/
$wgMoodBarCutoffTime = null;

/** MoodBar configuration settings **/
$wgMoodBarConfig = array(
	'bucketConfig' =>
		array(
			'buckets' =>
				array(
					'feedback' => 80,
					'share' => 10,
					'editing' => 10,
				),
			'version' => 3,
			'expires' => 30,
		),
	'infoUrl' => 'http://www.mediawiki.org/wiki/MoodBar',
	'privacyUrl' => 'about:blank',
	'disableExpiration' => 365,
);
