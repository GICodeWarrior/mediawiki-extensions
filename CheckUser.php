<?php

# Not a valid entry point, skip unless MEDIAWIKI is defined
if (!defined('MEDIAWIKI')) {
	echo "CheckUser extension";
	exit(1);
}

# Internationalisation file
require_once( 'CheckUser.i18n.php' );

$wgExtensionCredits['specialpage'][] = array(
	'author' => array( 'Tim Starling', 'Aaron Schulz' ),
	'version' => '1.1',
	'name' => 'CheckUser',
	'url' => 'http://www.mediawiki.org/wiki/Extension:CheckUser',
	'description' => 'Grants users with the appropriate permission the ability to check user\'s IP addresses and other information',
);

$wgAvailableRights[] = 'checkuser';
$wgGroupPermissions['checkuser']['checkuser'] = true;

$wgCheckUserLog = '/home/wikipedia/logs/checkuser.log';

# How long to keep CU data?
$wgCUDMaxAge = 3 * 30 * 24 * 3600;

#Recent changes data hook
global $wgHooks;
$wgHooks['RecentChange_save'][] = 'efUpdateCheckUserData';
$wgHooks['ParserTestTables'][] = 'efCheckUserParserTestTables';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'efCheckUserSchemaUpdates';

/**
 * Hook function for RecentChange_save
 * Saves user data into the cu_changes table
 */
function efUpdateCheckUserData( $rc ) {
	global $wgUser;
	// Extract params
	extract( $rc->mAttribs );
	// Get IP
	$ip = wfGetIP();
	// Get XFF header
	$xff = wfGetForwardedFor();
	list($xff_ip,$trusted) = efGetClientIPfromXFF( $xff );
	// Our squid XFFs can flood this up sometimes
	$isSquidOnly = efXFFChainIsSquid( $xff );
	// Get agent
	$agent = wfGetAgent();
	// Store the log action text for log events
	// $rc_comment should just be the log_comment
	// BC: check if log_type and log_action exists
	// If not, then $rc_comment is the actiontext and comment
	if( isset($rc_log_type) && $rc_type==RC_LOG ) {
		$target = Title::makeTitle( $rc_namespace, $rc_title );
		$actionText = LogPage::actionText( $rc_log_type, $rc_log_action, $target, NULL, explode('\n',$rc_params) );
	} else {
		$actionText = '';
	}

	$rcRow = array(
		'cuc_namespace' => $rc_namespace,
		'cuc_title' => $rc_title,
		'cuc_minor' => $rc_minor,
		'cuc_user' => $rc_user,
		'cuc_user_text' => $rc_user_text,
		'cuc_actiontext' => $actionText,
		'cuc_comment' => $rc_comment,
		'cuc_page_id' => $rc_cur_id,
		'cuc_this_oldid' => $rc_this_oldid,
		'cuc_last_oldid' => $rc_last_oldid,
		'cuc_type' => $rc_type,
		'cuc_timestamp' => $rc_timestamp,
		'cuc_ip' => IP::sanitizeIP($ip),
		'cuc_ip_hex' => $ip ? IP::toHex( $ip ) : null,
		'cuc_xff' => !$isSquidOnly ? $xff : '',
		'cuc_xff_hex' => ($xff_ip && !$isSquidOnly) ? IP::toHex( $xff_ip ) : null,
		'cuc_agent' => $agent
	);

	$dbw = wfGetDB( DB_MASTER );
	$dbw->insert( 'cu_changes', $rcRow, __METHOD__ );

	# Every 100th edit, prune the checkuser changes table.
	wfSeedRandom();
	if ( 0 == mt_rand( 0, 99 ) ) {
		# Periodically flush old entries from the recentchanges table.
		global $wgCUDMaxAge;

		$dbw = wfGetDB( DB_MASTER );
		$cutoff = $dbw->timestamp( time() - $wgCUDMaxAge );
		$recentchanges = $dbw->tableName( 'cu_changes' );
		$sql = "DELETE FROM $recentchanges WHERE cuc_timestamp < '{$cutoff}'";
		$dbw->query( $sql );
	}

	return true;
}

/**
 * Locates the client IP within a given XFF string
 * @param string $xff
 * @param string $address, the ip that sent this header (optional)
 * @return array( string, bool )
 */
function efGetClientIPfromXFF( $xff, $address=NULL ) {
	if( !$xff )
		return array(null, false);
	// Avoid annoyingly long xff hacks
	$xff = trim( substr( $xff, 0, 255 ) );
	$client = null;
	$trusted = true;
	// Check each IP, assuming they are separated by commas
	$ips = explode(',',$xff);
	foreach( $ips as $n => $ip ) {
		$ip = trim($ip);
		// If it is a valid IP, not a hash or such
		if( IP::isIPAddress($ip) ) {
			# The first IP should be the client.
			# Start only from the first public IP.
			if( is_null($client) ) {
				if( IP::isPublic($ip) )
					$client = $ip;
			# Check that all servers are trusted
			} else if( !wfIsTrustedProxy($ip) ) {
				$trusted = false;
				break;
			}
		}
	}
	// We still have to test if the IP that sent
	// this header is trusted to confirm results
	if ( $client != $address && (!$address || !wfIsTrustedProxy($address)) )
		$trusted = false;

	return array( $client, $trusted );
}

function efXFFChainIsSquid( $xff ) {
	global $wgSquidServers, $wgSquidServersNoPurge;

	if ( !$xff )
		false;
	// Avoid annoyingly long xff hacks
	$xff = trim( substr( $xff, 0, 255 ) );
	$squidOnly = true;
	// Check each IP, assuming they are separated by commas
	$ips = explode(',',$xff);
	foreach( $ips as $n => $ip ) {
		$ip = trim($ip);
		// If it is a valid IP, not a hash or such
		if ( IP::isIPAddress($ip) ) {
			if ( $n==0 ) {
				// The first IP should be the client...
			} else if ( !in_array($ip,$wgSquidServers) && !in_array($ip,$wgSquidServersNoPurge) ) {
				$squidOnly = false;
				break;
			}
		}
	}

	return $squidOnly;
}

function efCheckUserSchemaUpdates() {
	global $wgDBtype, $wgExtNewIndexes;

	# Run install.inc as necessary
	$base = dirname(__FILE__);

	$db = wfGetDB( DB_MASTER );
	if( $db->tableExists( 'cu_changes' ) ) {
		echo "...cu_changes already exists.\n";
	} else {
		require_once "$base/install.inc";
		create_cu_changes( $db );
	}

	if ($wgDBtype == 'mysql') {
		$wgExtNewIndexes[] = array('cu_changes', 'cuc_ip_hex_time',
			"$base/archives/patch-cu_changes_indexes.sql" );
		$wgExtNewIndexes[] = array('cu_changes', 'cuc_user_ip_time',
			"$base/archives/patch-cu_changes_indexes2.sql" );
	}
	return true;
}

/**
 * Tell the parser test engine to create a stub cu_changes table,
 * or temporary pages won't save correctly during the test run.
 */
function efCheckUserParserTestTables( &$tables ) {
	$tables[] = 'cu_changes';
	return true;
}

$wgSpecialPages['CheckUser'] = 'CheckUser';
$wgAutoloadClasses['CheckUser'] = dirname(__FILE__) . '/CheckUser_body.php';
