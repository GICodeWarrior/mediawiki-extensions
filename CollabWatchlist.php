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

$wgSpecialPages['Collabwatchlist'] = 'SpecialCollabWatchlist'; # Let MediaWiki know about your new special page.
$wgSpecialPageGroups['Collabwatchlist'] = 'other';

$wgHooks['LoadExtensionSchemaUpdates'][] = 'fnCollabWatchlistDbSchema';
$wgHooks['GetPreferences'][] = 'fnCollabWatchlistPreferences';

function fnCollabWatchlistDbSchema() {
	$wgSql = dirname(__FILE__) . '/sql/';
	if ( $updater === null ) { // <= 1.16 support
		global $wgExtNewTables;
		$wgExtNewTables[] = array('collabwatchlist',  $wgSql . 'collabwatchlist.sql');
		$wgExtNewTables[] = array('collabwatchlistuser',  $wgSql . 'collabwatchlistuser.sql');
		$wgExtNewTables[] = array('collabwatchlistcategory',  $wgSql . 'collabwatchlistcategory.sql');
		$wgExtNewTables[] = array('collabwatchlistrevisiontag', $wgSql . 'collabwatchlistrevisiontag.sql');
		$wgExtNewTables[] = array('collabwatchlisttag', $wgSql . 'collabwatchlisttag.sql');
		$wgExtNewFields[] = array('change_tag', 'ct_id', $wgSql . 'patch-change_tag_id.sql');
	} else { // >= 1.17 support
		$updater->addExtensionUpdate( array ( 'addTable', 'collabwatchlist',
			$wgSql . 'collabwatchlist.sql', true ) );
		$updater->addExtensionUpdate( array ( 'addTable', 'collabwatchlistuser',
			$wgSql . 'collabwatchlistuser.sql', true ) );
		$updater->addExtensionUpdate( array ( 'addTable', 'collabwatchlistcategory',
			$wgSql . 'collabwatchlistcategory.sql', true ) );
		$updater->addExtensionUpdate( array ( 'addTable', 'collabwatchlistrevisiontag',
			$wgSql . 'collabwatchlistrevisiontag.sql', true ) );
		$updater->addExtensionUpdate( array ( 'addTable', 'collabwatchlisttag',
			$wgSql . 'collabwatchlisttag.sql', true ) );
		$updater->addExtensionUpdate( array( 'modifyField', 'change_tag', 'ct_id',
			$wgSql . 'patch-change_tag_id.sql', true ) );
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

$wgCollabWatchlistNSPrefix = 'CollabWatchlist';
$wgCollabWatchlistPermissionDeniedPage = 'CollabWatchlistPermissionDenied';

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
