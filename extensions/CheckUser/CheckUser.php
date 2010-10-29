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

// Increment this number every time you touch the .js file.
$wgCheckUserStyleVersion = 5;

# Recent changes data hook
global $wgHooks;
$wgHooks['RecentChange_save'][] = 'efUpdateCheckUserData';
$wgHooks['EmailUser'][] = 'efUpdateCUEmailData';
$wgHooks['User::mailPasswordInternal'][] = 'efUpdateCUPasswordResetData';
$wgHooks['AuthPluginAutoCreate'][] = 'efUpdateAutoCreateData';

$wgHooks['ParserTestTables'][] = 'efCheckUserParserTestTables';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'efCheckUserSchemaUpdates';
$wgHooks['ContributionsToolLinks'][] = 'efLoadCheckUserLink';

/**
 * Hook function for RecentChange_save
 * Saves user data into the cu_changes table
 */
function efUpdateCheckUserData( $rc ) {
	// Extract params
	extract( $rc->mAttribs );
	// Get IP
	$ip = wfGetIP();
	// Get XFF header
	$xff = wfGetForwardedFor();
	list( $xff_ip, $trusted ) = efGetClientIPfromXFF( $xff );
	// Our squid XFFs can flood this up sometimes
	$isSquidOnly = efXFFChainIsSquid( $xff );
	// Get agent
	$agent = wfGetAgent();
	// Store the log action text for log events
	// $rc_comment should just be the log_comment
	// BC: check if log_type and log_action exists
	// If not, then $rc_comment is the actiontext and comment
	if ( isset( $rc_log_type ) && $rc_type == RC_LOG ) {
		$target = Title::makeTitle( $rc_namespace, $rc_title );
		$actionText = LogPage::actionText( $rc_log_type, $rc_log_action, $target,
			null, LogPage::extractParams( $rc_params )
		);
	} else {
		$actionText = '';
	}

	$dbw = wfGetDB( DB_MASTER );
	$cuc_id = $dbw->nextSequenceValue( 'cu_changes_cu_id_seq' );
	$rcRow = array(
		'cuc_id'         => $cuc_id,
		'cuc_namespace'  => $rc_namespace,
		'cuc_title'      => $rc_title,
		'cuc_minor'      => $rc_minor,
		'cuc_user'       => $rc_user,
		'cuc_user_text'  => $rc_user_text,
		'cuc_actiontext' => $actionText,
		'cuc_comment'    => $rc_comment,
		'cuc_this_oldid' => $rc_this_oldid,
		'cuc_last_oldid' => $rc_last_oldid,
		'cuc_type'       => $rc_type,
		'cuc_timestamp'  => $rc_timestamp,
		'cuc_ip'         => IP::sanitizeIP( $ip ),
		'cuc_ip_hex'     => $ip ? IP::toHex( $ip ) : null,
		'cuc_xff'        => !$isSquidOnly ? $xff : '',
		'cuc_xff_hex'    => ( $xff_ip && !$isSquidOnly ) ? IP::toHex( $xff_ip ) : null,
		'cuc_agent'      => $agent
	);
	# On PG, MW unsets cur_id due to schema incompatibilites. So it may not be set!
	if ( isset( $rc_cur_id ) ) {
		$rcRow['cuc_page_id'] = $rc_cur_id;
	}
	$dbw->insert( 'cu_changes', $rcRow, __METHOD__ );

	# Every 100th edit, prune the checkuser changes table.
	if ( 0 == mt_rand( 0, 99 ) ) {
		# Periodically flush old entries from the recentchanges table.
		global $wgCUDMaxAge;
		$cutoff = $dbw->timestamp( time() - $wgCUDMaxAge );
		$recentchanges = $dbw->tableName( 'cu_changes' );
		$sql = "DELETE FROM $recentchanges WHERE cuc_timestamp < '{$cutoff}'";
		$dbw->query( $sql, __METHOD__ );
	}

	return true;
}

/**
 * Hook function to store password reset
 * Saves user data into the cu_changes table
 */
function efUpdateCUPasswordResetData( $user, $ip, $account ) {
	wfLoadExtensionMessages( 'CheckUser' );
	// Get XFF header
	$xff = wfGetForwardedFor();
	list( $xff_ip, $trusted ) = efGetClientIPfromXFF( $xff );
	// Our squid XFFs can flood this up sometimes
	$isSquidOnly = efXFFChainIsSquid( $xff );
	// Get agent
	$agent = wfGetAgent();
	$dbw = wfGetDB( DB_MASTER );
	$cuc_id = $dbw->nextSequenceValue( 'cu_changes_cu_id_seq' );
	$rcRow = array(
		'cuc_id'         => $cuc_id,
		'cuc_namespace'  => NS_USER,
		'cuc_title'      => '',
		'cuc_minor'      => 0,
		'cuc_user'       => $user->getId(),
		'cuc_user_text'  => $user->getName(),
		'cuc_actiontext' => wfMsgForContent( 'checkuser-reset-action', $account->getName() ),
		'cuc_comment'    => '',
		'cuc_this_oldid' => 0,
		'cuc_last_oldid' => 0,
		'cuc_type'       => RC_LOG,
		'cuc_timestamp'  => $dbw->timestamp( wfTimestampNow() ),
		'cuc_ip'         => IP::sanitizeIP( $ip ),
		'cuc_ip_hex'     => $ip ? IP::toHex( $ip ) : null,
		'cuc_xff'        => !$isSquidOnly ? $xff : '',
		'cuc_xff_hex'    => ( $xff_ip && !$isSquidOnly ) ? IP::toHex( $xff_ip ) : null,
		'cuc_agent'      => $agent
	);
	$dbw->insert( 'cu_changes', $rcRow, __METHOD__ );

	return true;
}

/**
 * Hook function to store email data
 * Saves user data into the cu_changes table
 */
function efUpdateCUEmailData( $to, $from, $subject, $text ) {
	global $wgSecretKey;
	if ( !$wgSecretKey || $from->name == $to->name ) {
		return true;
	}
	$userFrom = User::newFromName( $from->name );
	$userTo = User::newFromName( $to->name );
	$hash = md5( $userTo->getEmail() . $userTo->getId() . $wgSecretKey );
	// Get IP
	$ip = wfGetIP();
	// Get XFF header
	$xff = wfGetForwardedFor();
	list( $xff_ip, $trusted ) = efGetClientIPfromXFF( $xff );
	// Our squid XFFs can flood this up sometimes
	$isSquidOnly = efXFFChainIsSquid( $xff );
	// Get agent
	$agent = wfGetAgent();
	$dbw = wfGetDB( DB_MASTER );
	$cuc_id = $dbw->nextSequenceValue( 'cu_changes_cu_id_seq' );
	$rcRow = array(
		'cuc_id'         => $cuc_id,
		'cuc_namespace'  => NS_USER,
		'cuc_title'      => '',
		'cuc_minor'      => 0,
		'cuc_user'       => $userFrom->getId(),
		'cuc_user_text'  => $userFrom->getName(),
		'cuc_actiontext' => wfMsgForContent( 'checkuser-email-action', $hash ),
		'cuc_comment'    => '',
		'cuc_this_oldid' => 0,
		'cuc_last_oldid' => 0,
		'cuc_type'       => RC_LOG,
		'cuc_timestamp'  => $dbw->timestamp( wfTimestampNow() ),
		'cuc_ip'         => IP::sanitizeIP( $ip ),
		'cuc_ip_hex'     => $ip ? IP::toHex( $ip ) : null,
		'cuc_xff'        => !$isSquidOnly ? $xff : '',
		'cuc_xff_hex'    => ( $xff_ip && !$isSquidOnly ) ? IP::toHex( $xff_ip ) : null,
		'cuc_agent'      => $agent
	);
	$dbw->insert( 'cu_changes', $rcRow, __METHOD__ );

	return true;
}

/**
 * Hook function to store autocreation data from the auth plugin
 * Saves user data into the cu_changes table
 */
function efUpdateAutoCreateData( $user ) {
	// Get IP
	$ip = wfGetIP();
	// Get XFF header
	$xff = wfGetForwardedFor();
	list( $xff_ip, $trusted ) = efGetClientIPfromXFF( $xff );
	// Our squid XFFs can flood this up sometimes
	$isSquidOnly = efXFFChainIsSquid( $xff );
	// Get agent
	$agent = wfGetAgent();
	$dbw = wfGetDB( DB_MASTER );
	$cuc_id = $dbw->nextSequenceValue( 'cu_changes_cu_id_seq' );
	$rcRow = array(
		'cuc_id'         => $cuc_id,
		'cuc_page_id'    => 0,
		'cuc_namespace'  => NS_USER,
		'cuc_title'      => '',
		'cuc_minor'      => 0,
		'cuc_user'       => $user->getId(),
		'cuc_user_text'  => $user->getName(),
		'cuc_actiontext' => wfMsgForContent( 'checkuser-autocreate-action' ),
		'cuc_comment'    => '',
		'cuc_this_oldid' => 0,
		'cuc_last_oldid' => 0,
		'cuc_type'       => RC_LOG,
		'cuc_timestamp'  => $dbw->timestamp( wfTimestampNow() ),
		'cuc_ip'         => IP::sanitizeIP( $ip ),
		'cuc_ip_hex'     => $ip ? IP::toHex( $ip ) : null,
		'cuc_xff'        => !$isSquidOnly ? $xff : '',
		'cuc_xff_hex'    => ( $xff_ip && !$isSquidOnly ) ? IP::toHex( $xff_ip ) : null,
		'cuc_agent'      => $agent
	);
	$dbw->insert( 'cu_changes', $rcRow, __METHOD__ );

	return true;
}

/**
 * Locates the client IP within a given XFF string
 * @param string $xff
 * @param string $address, the ip that sent this header (optional)
 * @return array( string, bool )
 */
function efGetClientIPfromXFF( $xff, $address = null ) {
	if ( !$xff ) {
		return array( null, false );
	}
	// Avoid annoyingly long xff hacks
	$xff = trim( substr( $xff, 0, 255 ) );
	$client = null;
	$trusted = true;
	// Check each IP, assuming they are separated by commas
	$ips = explode( ',', $xff );
	foreach ( $ips as $n => $ip ) {
		$ip = trim( $ip );
		// If it is a valid IP, not a hash or such
		if ( IP::isIPAddress( $ip ) ) {
			# The first IP should be the client.
			# Start only from the first public IP.
			if ( is_null( $client ) ) {
				if ( IP::isPublic( $ip ) ) {
					$client = $ip;
				}
			# Check that all servers are trusted
			} elseif ( !wfIsTrustedProxy( $ip ) ) {
				$trusted = false;
				break;
			}
		}
	}
	// We still have to test if the IP that sent
	// this header is trusted to confirm results
	if ( $client != $address && ( !$address || !wfIsTrustedProxy( $address ) ) ) {
		$trusted = false;
	}

	return array( $client, $trusted );
}

function efXFFChainIsSquid( $xff ) {
	global $wgSquidServers, $wgSquidServersNoPurge;

	if ( !$xff ) {
		false;
	}
	// Avoid annoyingly long xff hacks
	$xff = trim( substr( $xff, 0, 255 ) );
	$squidOnly = true;
	// Check each IP, assuming they are separated by commas
	$ips = explode( ',', $xff );
	foreach ( $ips as $n => $ip ) {
		$ip = trim( $ip );
		// If it is a valid IP, not a hash or such
		if ( IP::isIPAddress( $ip ) ) {
			if ( $n == 0 ) {
				// The first IP should be the client...
			} elseif ( !in_array( $ip, $wgSquidServers ) && !in_array( $ip, $wgSquidServersNoPurge ) ) {
				$squidOnly = false;
				break;
			}
		}
	}

	return $squidOnly;
}

function efCheckUserSchemaUpdates( $updater = null ) {
	$base = dirname( __FILE__ );
	if ( $updater === null ) {
		global $wgDBtype, $wgExtNewIndexes;
		efCheckUserCreateTables();
		if ( $wgDBtype == 'mysql' ) {
			$wgExtNewIndexes[] = array(
				'cu_changes', 'cuc_ip_hex_time',
				"$base/archives/patch-cu_changes_indexes.sql"
			);
			$wgExtNewIndexes[] = array(
				'cu_changes', 'cuc_user_ip_time',
				"$base/archives/patch-cu_changes_indexes2.sql"
			);
		}
	} else {
		$updater->addExtensionUpdate( array( 'efCheckUserCreateTables' ) );
		if ( $updater->getDB()->getType() == 'mysql' ) {
			$updater->addExtensionUpdate( array( 'addIndex', 'cu_changes',
				'cuc_ip_hex_time', "$base/archives/patch-cu_changes_indexes.sql", true ) );
			$updater->addExtensionUpdate( array( 'addIndex', 'cu_changes',
				'cuc_user_ip_time', "$base/archives/patch-cu_changes_indexes2.sql", true ) );
		}
	}

	return true;
}

function efCheckUserCreateTables( $updater = null ) {
	if ( $updater === null ) {
		$db = wfGetDB( DB_MASTER );
	} else {
		$db = $updater->getDB();
	}

	$base = dirname( __FILE__ );

	if ( $db->tableExists( 'cu_changes' ) ) {
		wfOut( "...cu_changes table already exists.\n" );
	} else {
		require_once "$base/install.inc";
		create_cu_changes( $db );
	}

	if ( $db->tableExists( 'cu_log' ) ) {
		wfOut( "...cu_log table already exists.\n" );
	} else {
		require_once "$base/install.inc";
		create_cu_log( $db );
	}
}

/**
 * Tell the parser test engine to create a stub cu_changes table,
 * or temporary pages won't save correctly during the test run.
 */
function efCheckUserParserTestTables( &$tables ) {
	$tables[] = 'cu_changes';
	return true;
}

// Set up the new special page
$wgSpecialPages['CheckUser'] = 'CheckUser';
$wgSpecialPageGroups['CheckUser'] = 'users';
$wgAutoloadClasses['CheckUser'] = dirname( __FILE__ ) . '/CheckUser_body.php';

/**
 * Add a link to Special:CheckUser on Special:Contributions/<username> for
 * privileged users.
 * @param $id Integer: user ID
 * @param $nt Title: user page title
 * @param $links Array: tool links
 * @return true
 */
function efLoadCheckUserLink( $id, $nt, &$links ) {
	global $wgUser;
	if ( $wgUser->isAllowed( 'checkuser' ) ) {
		$links[] = $wgUser->getSkin()->makeKnownLinkObj(
			SpecialPage::getTitleFor( 'CheckUser' ),
			wfMsgHtml( 'checkuser-contribs' ),
			'user=' . urlencode( $nt->getText() )
		);
	}
	return true;
}
