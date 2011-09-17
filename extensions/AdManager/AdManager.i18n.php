<?php
/**
 * Internationalization file for the AdManager extension.
 *
 * @file
 * @ingroup Extensions
 */
$messages = array();

/** English
 * @author Ike Hecht
 */
$messages['en'] = array(
	'admanager' => 'Ad Manager',
	'admanagerzones' => 'Ad Manager Zones',
	'admanager-desc' => 'Provides a [[Special:AdManager|special page]] which allows sysops to set the zone for pages or categories',
	'admanager_docu' => 'To add or remove the ad zone of a page or entire category, add or remove its title below.',
	'admanagerzones_docu' => 'Enter each ad zone number on its own line.',
	'admanager_invalidtargetpage' => 'No page found with title "$1".',
	'admanager_invalidtargetcategory' => 'No category found with title "$1".',
	'admanager_notable' => 'Error! A required database table was not found! Run update.php first.',
	'admanager_noAdManagerZones' => 'Error! You must add some ad zones. Enter them at [[Special:AdManagerZones]].',
	'admanager_labelPage' => 'Page titles',
	'admanager_labelCategory' => 'Category names',
	'admanager_submit' => 'Submit',
	'admanager_noads' => 'Display no ads',
	'admanager_Page' => 'Pages',
	'admanager_Category' => 'Categories',
	'admanager_added' => 'Your changes have been saved',
	'admanager_noadsset' => '$1 has been set to show no ads',
	'admanager_addedzone' => 'Added zone',
	'admanager_zonenum' => 'Zone #: $1',
	'admanager_zonenotnumber' => 'Error! $1 is not a number.',
	'admanager_return' => 'Return to [[Special:AdManager]]',
	'admanager_gotoads' => '[[Special:AdManager|Edit ad placement]]',
	'admanager_gotozones' => '[[Special:AdManagerZones|Edit ad zones]]',
	'right-admanager' => '[[Special:AdManager|Manage advertising configuration]]',
);