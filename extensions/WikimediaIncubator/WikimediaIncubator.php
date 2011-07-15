<?php
if ( !defined( 'MEDIAWIKI' ) ) { die( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" ); }
/**
 * An extension that adds features (such as a preference, recent changes, ...)
 * for a test wiki system (i.e. incubated wikis inside one actual wiki)
 * mainly intended for the Wikimedia Incubator
 *
 * @file
 * @ingroup Extensions
 */

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Wikimedia Incubator',
	'author' => 'SPQRobin',
	'version' => '3.1.1',
	'url' => 'http://www.mediawiki.org/wiki/Extension:WikimediaIncubator',
	'descriptionmsg' => 'wminc-desc',
);

/* Config */
$wgGroupPermissions['*']['viewuserlang'] = false;
$wgGroupPermissions['sysop']['viewuserlang'] = true;

/* General (globals and/or configuration) */
$wmincPref = 'incubatortestwiki'; // Name of the preference
$dir = dirname( __FILE__ ) . '/';
// only one-letter codes can be used for projects
$wmincProjects = array(
	'Wikipedia' => 'p',
	'Wikibooks' => 'b',
	'Wiktionary' => 't',
	'Wikiquote' => 'q',
	'Wikinews' => 'n',
);
$wmincProjectSite = array(
	'name' => 'Incubator',
	'short' => 'inc',
);
$wmincTestWikiNamespaces = array(
	NS_MAIN, NS_TALK,
	NS_TEMPLATE, NS_TEMPLATE_TALK,
	NS_CATEGORY, NS_CATEGORY_TALK,
);
$wmincLangCodeLength = 12; // can be changed if needed (depends on policy)
// Pseudo category namespaces like "Category:Maintenance:Delete", for easy whitelisting and structure
$wmincPseudoCategoryNSes = array(
	'Incubator', 'Help', 'Users', 'Maintenance', 'Files',
);

/* Test wiki admin user group */
$wgGroupPermissions['test-sysop']['delete'] = true;
$wgGroupPermissions['test-sysop']['undelete'] = true;
$wgGroupPermissions['test-sysop']['deletedhistory'] = true;
$wgGroupPermissions['test-sysop']['block'] = true;
$wgGroupPermissions['test-sysop']['blockemail'] = true;
$wgGroupPermissions['test-sysop']['rollback'] = true;
$wgAddGroups['bureaucrat']['test-sysop'] = true;
$wgRemoveGroups['bureaucrat']['test-sysop'] = true;

$wgExtensionMessagesFiles['WikimediaIncubator'] = $dir . 'WikimediaIncubator.i18n.php';

/* Special:ViewUserLang */
$wgAutoloadClasses['SpecialViewUserLang'] = $dir . 'SpecialViewUserLang.php';
$wgSpecialPages['ViewUserLang'] = 'SpecialViewUserLang';
$wgSpecialPageGroups['ViewUserLang'] = 'users';
$wgAvailableRights[] = 'viewuserlang';
$wgHooks['ContributionsToolLinks'][] = 'IncubatorTest::efLoadViewUserLangLink';

/* TestWiki preference */
$wgAutoloadClasses['IncubatorTest'] = $dir . 'IncubatorTest.php';
$wgHooks['GetPreferences'][] = 'IncubatorTest::onGetPreferences';
$wgHooks['MagicWordwgVariableIDs'][] = 'IncubatorTest::magicWordVariable';
$wgHooks['LanguageGetMagic'][] = 'IncubatorTest::magicWord';
$wgHooks['ParserGetVariableValueSwitch'][] = 'IncubatorTest::magicWordValue';

/* Create/move page permissions */
$wgHooks['getUserPermissionsErrors'][] = 'IncubatorTest::checkPrefixCreatePermissions';
$wgHooks['AbortMove'][] = 'IncubatorTest::checkPrefixMovePermissions';

/* Recent Changes */
$wgAutoloadClasses['TestWikiRC'] = $dir . 'TestWikiRC.php';
$wgHooks['SpecialRecentChangesQuery'][] = 'TestWikiRC::onRcQuery';
$wgHooks['SpecialRecentChangesPanel'][] = 'TestWikiRC::onRcForm';

/* Automatic pref on account creation */
$wgAutoloadClasses['AutoTestWiki'] = $dir . 'CreateAccountTestWiki.php';
$wgHooks['UserCreateForm'][] = 'AutoTestWiki::onUserCreateForm';
$wgHooks['AddNewAccount'][] = 'AutoTestWiki::onAddNewAccount';

/* Random page by test */
$wgAutoloadClasses['SpecialRandomByTest'] = $dir . 'SpecialRandomByTest.php';
$wgSpecialPages['RandomByTest'] = 'SpecialRandomByTest';
