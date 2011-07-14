<?php
/**
 * CheckUser extension - grants users with the appropriate permission the
 * ability to check user's IP addresses and other information.
 *
 * @file
 * @ingroup Extensions
 * @version 2.3
 * @author Tim Starling
 * @author Aaron Schulz
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @link http://www.mediawiki.org/wiki/Extension:CheckUser Documentation
 */

# Not a valid entry point, skip unless MEDIAWIKI is defined
if ( !defined( 'MEDIAWIKI' ) ) {
	echo "CheckUser extension";
	exit( 1 );
}

# Internationalisation file
$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['CheckUser'] = $dir . 'CheckUser.i18n.php';
$wgExtensionAliasesFiles['CheckUser'] = $dir . 'CheckUser.alias.php';

// Extension credits that will show up on Special:Version
$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'author' => array( 'Tim Starling', 'Aaron Schulz' ),
	'name' => 'CheckUser',
	'version' => '2.3',
	'url' => 'http://www.mediawiki.org/wiki/Extension:CheckUser',
	'descriptionmsg' => 'checkuser-desc',
);

// New user rights
// 'checkuser' right is required to query IPs/users through Special:CheckUser
// 'checkuser-log' is required to view the private log of checkuser checks
$wgAvailableRights[] = 'checkuser';
$wgAvailableRights[] = 'checkuser-log';
$wgGroupPermissions['checkuser']['checkuser'] = true;
$wgGroupPermissions['checkuser']['checkuser-log'] = true;

// Legacy variable, no longer used. Used to point to a file in the server where
// CheckUser would log all queries done through Special:CheckUser.
// If this file exists, the installer will try to import data from this file to
// the 'cu_log' table in the database.
$wgCheckUserLog = '/home/wikipedia/logs/checkuser.log';

# How long to keep CU data?
$wgCUDMaxAge = 3 * 30 * 24 * 3600; // 3 months

# Mass block limits
$wgCheckUserMaxBlocks = 200;

// Set this to true if you want to force checkusers into giving a reason for
// each check they do through Special:CheckUser.
$wgCheckUserForceSummary = false;

# Recent changes data hook
$wgHooks['RecentChange_save'][] = 'CheckUserHooks::updateCheckUserData';
$wgHooks['EmailUser'][] = 'CheckUserHooks::updateCUEmailData';
$wgHooks['User::mailPasswordInternal'][] = 'CheckUserHooks::updateCUPasswordResetData';
$wgHooks['AuthPluginAutoCreate'][] = 'CheckUserHooks::updateAutoCreateData';
$wgHooks['AddNewAccount'][] = 'CheckUserHooks::addNewAccount';

$wgHooks['ParserTestTables'][] = 'CheckUserHooks::checkUserParserTestTables';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'CheckUserHooks::checkUserSchemaUpdates';
$wgHooks['ContributionsToolLinks'][] = 'CheckUserHooks::loadCheckUserLink';

$wgResourceModules['ext.checkUser'] = array(
	'scripts'       => 'checkuser.js',
	'dependencies' 	=> array( 'mediawiki.util' ), // IP stuff
	'localBasePath' => dirname( __FILE__ ),
	'remoteExtPath' => 'CheckUser',
);

// Set up the new special page
$wgSpecialPages['CheckUser'] = 'CheckUser';
$wgSpecialPageGroups['CheckUser'] = 'users';

$wgAutoloadClasses['CheckUser'] = dirname( __FILE__ ) . '/CheckUser_body.php';
$wgAutoloadClasses['CheckUserHooks'] = dirname( __FILE__ ) . '/CheckUser.hooks.php';
