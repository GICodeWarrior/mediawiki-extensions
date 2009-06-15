<?php
/**
 * Usability Initiative PrefStats extension
 *
 * @file
 * @ingroup Extensions
 *
 * This file contains the include file for the EditWarning portion of the
 * UsabilityInitiative extension of MediaWiki.
 *
 * Usage: This file is included automatically by ../UsabilityInitiative.php
 *
 * @author Roan Kattouw <roan.kattouw@gmail.com>
 * @license GPL v2 or later
 * @version 0.1.1
 */

/* Configuration */

// .Set to false to disable tracking
$wgPrefStatsEnable = true;

// array('prefname' => 'value')
// value can't be the default value
// Tracking multiple values of the same preference is not possible
$wgPrefStatsTrackPrefs = array();

$wgPrefStatsChartDimensions = '1000x300';

$wgPrefStatsTimeUnit = 60*60; // one hour

/* Setup */

// Credits
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'PrefStats',
	'author' => 'Roan Kattouw',
	'version' => '0.1.1',
	'url' => 'http://www.mediawiki.org/wiki/Extension:UsabilityInitiative',
	'descriptionmsg' => 'prefstats-desc',
);

// Adds Autoload Classes
$wgAutoloadClasses['PrefStatsHooks'] =
	dirname( __FILE__ ) . '/PrefStats.hooks.php';
$wgAutoloadClasses['SpecialPrefStats'] =
	dirname( __FILE__ ). '/SpecialPrefStats.php';

$wgSpecialPages['PrefStats'] = 'SpecialPrefStats';

// Adds Internationalized Messages
$wgExtensionMessagesFiles['PrefStats'] =
	dirname( __FILE__ ) . '/PrefStats.i18n.php';
$wgExtensionAliasesFiles['PrefStats'] =
	dirname( __FILE__ ). '/PrefStats.alias.php';

// Registers Hooks
$wgHooks['LoadExtensionSchemaUpdates'][] = 'PrefStatsHooks::schema';
$wgHooks['UserSaveOptions'][] = 'PrefStatsHooks::save';
