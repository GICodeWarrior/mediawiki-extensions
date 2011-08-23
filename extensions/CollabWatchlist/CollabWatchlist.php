<?php
# Alert the user that this is not a valid entry point to MediaWiki if they try to access the special pages file directly.
if ( !defined( 'MEDIAWIKI' ) ) {
	echo <<<EOT
To install the CollabWatchlist extension, put the following line in LocalSettings.php:
require_once( "\$IP/extensions/CollabWatchlist/CollabWatchlist.php" );
EOT;
	exit( 1 );
}


$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'CollabWatchlist',
	'author' => 'Florian Hackenberger',
	'url' => 'http://www.mediawiki.org/wiki/User:Flohack',
	'descriptionmsg' => 'collabwatchlist-desc',
	'version' => '0.9.0',
);

# Autoload our classes
$wgDir = dirname( __FILE__ ) . '/';
$wgCollabWatchlistIncludes = $wgDir . 'includes/';
$wgExtensionMessagesFiles['CollabWatchlist'] = $wgDir . 'CollabWatchlist.i18n.php';
$wgExtensionAliasesFiles['CollabWatchlist'] = $wgDir . 'CollabWatchlist.alias.php';

$wgAutoloadClasses['SpecialCollabWatchlist'] = $wgCollabWatchlistIncludes . 'SpecialCollabWatchlist.php';
$wgAutoloadClasses['CollabWatchlistChangesList'] = $wgCollabWatchlistIncludes . 'CollabWatchlistChangesList.php';
$wgAutoloadClasses['CategoryTreeManip'] = $wgCollabWatchlistIncludes . 'CategoryTreeManip.php';
$wgAutoloadClasses['CollabWatchlistEditor'] = $wgCollabWatchlistIncludes . 'CollabWatchlistEditor.php';

$wgResourceModules['ext.CollabWatchlist'] = array(
        'scripts' => array( 'js/CollabWatchlist.js' ),
 
        // ResourceLoader needs to know where your files are; specify your
        // subdir relative to "/extensions" (or $wgExtensionAssetsPath)
        'localBasePath' => dirname( __FILE__ ),
        'remoteExtPath' => 'CollabWatchlist',
	'position' => 'top',
);

$wgSpecialPages['Collabwatchlist'] = 'SpecialCollabWatchlist'; # Let MediaWiki know about your new special page.
$wgSpecialPageGroups['Collabwatchlist'] = 'other';

$wgHooks['LoadExtensionSchemaUpdates'][] = 'fnCollabWatchlistDbSchema';
$wgHooks['GetPreferences'][] = 'fnCollabWatchlistPreferences';

function fnCollabWatchlistDbSchema( $updater = null ) {
	$sqlDir = dirname(__FILE__) . '/sql/';
	if ( $updater === null ) { // <= 1.16 support
		global $wgExtNewTables, $wgExtNewFields;
		$wgExtNewTables[] = array('collabwatchlist',  $sqlDir . 'collabwatchlist.sql');
		$wgExtNewTables[] = array('collabwatchlistuser',  $sqlDir . 'collabwatchlistuser.sql');
		$wgExtNewTables[] = array('collabwatchlistcategory',  $sqlDir . 'collabwatchlistcategory.sql');
		$wgExtNewTables[] = array('collabwatchlistrevisiontag', $sqlDir . 'collabwatchlistrevisiontag.sql');
		$wgExtNewTables[] = array('collabwatchlisttag', $sqlDir . 'collabwatchlisttag.sql');
		$wgExtNewFields[] = array('collabwatchlistrevisiontag', 'ct_rc_id', $sqlDir . 'patch-collabwatchlist_noctid.sql');
	} else { // >= 1.17 support
		$updater->addExtensionUpdate( array ( 'addTable', 'collabwatchlist',
			$sqlDir . 'collabwatchlist.sql', true ) );
		$updater->addExtensionUpdate( array ( 'addTable', 'collabwatchlistuser',
			$sqlDir . 'collabwatchlistuser.sql', true ) );
		$updater->addExtensionUpdate( array ( 'addTable', 'collabwatchlistcategory',
			$sqlDir . 'collabwatchlistcategory.sql', true ) );
		$updater->addExtensionUpdate( array ( 'addTable', 'collabwatchlistrevisiontag',
			$sqlDir . 'collabwatchlistrevisiontag.sql', true ) );
		$updater->addExtensionUpdate( array ( 'addTable', 'collabwatchlisttag',
			$sqlDir . 'collabwatchlisttag.sql', true ) );
		$updater->addExtensionUpdate( array( 'addField', 'collabwatchlistrevisiontag', 'ct_rc_id',
			$sqlDir . 'patch-collabwatchlist_noctid.sql', true ) );
	}
	return true;
}

function fnCollabWatchlistPreferences( $user, &$preferences ) {
	$preferences['collabwatchlisthidelistuser'] = array(
		'type' => 'toggle',
		'label-message' => 'tog-collabwatchlisthidelistusers',
		'section' => 'watchlist/advancedwatchlist',
	);
	return true;
}

// You might want to disable that, as it causes quite a bit of database
// and (if enabled) cache load and size
$wgCollabWatchlistRecursiveCatScan = true;
// The depth of the category tree we are building. -1 means infinite
// 0 fetches no child categories at all
$wgCollabWatchlistRecursiveCatMaxDepth = -1;
$wgCollabWatchlistNSPrefix = 'CollabWatchlist';
$wgCollabWatchlistPermissionDeniedPage = 'CollabWatchlistPermissionDenied';

# Unit tests
$wgHooks['UnitTestsList'][] = 'efCollabWatchlistUnitTests';

function efCollabWatchlistUnitTests( &$files ) {
	$files[] = dirname( __FILE__ ) . '/tests/CollabWatchlistTest.php';
	return true;
}

/**#@+
 * Collaborative watchlist user types
 * This defines constants for the collabwatchlistuser.rlu_type
 */
define( 'COLLABWATCHLISTUSER_OWNER',    'OWNER' ); // owners are allowed to edit the list
define( 'COLLABWATCHLISTUSER_OWNER_TEXT',    'Owner' ); // owners are allowed to edit the list
define( 'COLLABWATCHLISTUSER_USER',     'USER' ); // users are allowed to view the list and tag edits
define( 'COLLABWATCHLISTUSER_USER_TEXT',     'User' ); // users are allowed to view the list and tag edits
define( 'COLLABWATCHLISTUSER_TRUSTED_EDITOR', 'TRUSTED_EDITOR' ); // trusted editors are used to filter edits which don't require a review
define( 'COLLABWATCHLISTUSER_TRUSTED_EDITOR_TEXT', 'TrustedEditor' ); // trusted editors are used to filter edits which don't require a review

function fnCollabWatchlistUserTypeToText( $userType ) {
	if ( $userType === COLLABWATCHLISTUSER_OWNER )
		return COLLABWATCHLISTUSER_OWNER_TEXT;
	if ( $userType === COLLABWATCHLISTUSER_USER )
		return COLLABWATCHLISTUSER_USER_TEXT;
	if ( $userType === COLLABWATCHLISTUSER_TRUSTED_EDITOR )
		return COLLABWATCHLISTUSER_TRUSTED_EDITOR_TEXT;
}
/**#@-*/
