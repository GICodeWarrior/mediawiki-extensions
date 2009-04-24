<?php
/**
 * RT (Request Tracker) extension for MediaWiki
 *
 * @file
 * @ingroup Extensions
 *
 * Usage: Add the following three lines to LocalSettings.php:
 * require_once( "$IP/extensions/RT/RT.php" );
 * $wgRequestTracker_URL = 'https://rt.example.com/Ticket/Display.html?id';
 * $wgRequestTracker_DBconn = 'user=rt dbname=rt';
 *
 * For other options, please see the complete documentation
 *
 * @author Greg Sabino Mullane <greg@endpoint.com>
 * @license MIT <http://www.opensource.org/licenses/mit-license.php>
 * @version 1.8
 * @link http://www.mediawiki.org/wiki/Extension:RT
 */

$rt_uri = 'http://www.mediawiki.org/wiki/Extension:RT';

## Default values: Override in LocalSettings.php, not here!
$wgRequestTracker_URL         = 'http://rt.example.com/Ticket/Display.html?id';
$wgRequestTracker_DBconn      = 'user=rt dbname=rt';
$wgRequestTracker_Formats     = array();
$wgRequestTracker_Cachepage   = 0;
$wgRequestTracker_Useballoons = 1;
$wgRequestTracker_Active      = 1;

## Time formatting
## Example formats:
## FMHH:MI AM FMMon DD, YYYY => 2:42 PM Jan 23, 2009
## HH:MI FMMonth DD, YYYY => 14:42 January 23, 2009
## YYYY/MM/DD => 2009/01/23
## For a more complete list of possibilities, please visit:
## http://www.postgresql.org/docs/current/interactive/functions-formatting.html
$wgRequestTracker_TIMEFORMAT_LASTUPDATED  = 'FMHH:MI AM FMMonth DD, YYYY';
$wgRequestTracker_TIMEFORMAT_LASTUPDATED2 = 'FMMonth DD, YYYY';
$wgRequestTracker_TIMEFORMAT_CREATED      = 'FMHH:MI AM FMMonth DD, YYYY';
$wgRequestTracker_TIMEFORMAT_CREATED2     = 'FMMonth DD, YYYY';
$wgRequestTracker_TIMEFORMAT_RESOLVED     = 'FMHH:MI AM FMMonth DD, YYYY';
$wgRequestTracker_TIMEFORMAT_RESOLVED2    = 'FMMonth DD, YYYY';
$wgRequestTracker_TIMEFORMAT_NOW          = 'FMHH:MI AM FMMonth DD, YYYY';

// Ensure nothing is done unless run via MediaWiki
if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
	echo( "Please visit $rt_uri\n" );
	die( -1 );
}

// Credits for Special:Version
$wgExtensionCredits['parserhook'][] = array(
	'name'           => 'RT',
	'version'        => '1.8',
	'author'         => array( 'Greg Sabino Mullane' ),
	'description'    => 'Fancy interface to RT (Request Tracker)',
	'descriptionmsg' => 'rt-desc',
	'url'            => $rt_uri,
	);

// Pull in the Internationalization file
$wgExtensionMessagesFiles['RT'] =  dirname( __FILE__ ) . '/RT.i18n.php';

// Use a hook to enable control of parsing <rt>...</rt> content
$wgExtensionFunctions[] = 'efRT_Setup';
function efRT_Setup() {

	global $wgParser, $wgUploadDirectory, $wgCommandLineMode;

	wfLoadExtensionMessages( 'RT' );

	if ( $wgCommandLineMode ) {
		return true;
	}

	$wgParser->setHook( 'rt', 'rtRender' );

	return true;
}

 
// This is called to process <rt>...</rt> within a page
function rtRender( $input, $args=array(), $parser=null ) {

	global $wgRequestTracker_Cachepage, $wgRequestTracker_Active, $wgRequestTracker_DBconn,
		$wgRequestTracker_TIMEFORMAT_LASTUPDATED,
		$wgRequestTracker_TIMEFORMAT_LASTUPDATED2,
		$wgRequestTracker_TIMEFORMAT_CREATED,
		$wgRequestTracker_TIMEFORMAT_CREATED2,
		$wgRequestTracker_TIMEFORMAT_RESOLVED,
		$wgRequestTracker_TIMEFORMAT_RESOLVED2,
		$wgRequestTracker_TIMEFORMAT_NOW;

	// Grab the number if one was given between the <tr> tags
	$ticketnum = 0;
	$matches = array();
	if ( preg_match( '/^\s*(\d+)\s*$/', $input, $matches ) ) {
		$ticketnum = $matches[0];
	}

	// Disable all caching unless told not to
	if ( !$wgRequestTracker_Cachepage ) {
		$parser->disableCache();
	}

	// Try and connect to the database if we are active
	if ( $wgRequestTracker_Active ) {
		global $wgUser;
		$dbh = pg_connect( $wgRequestTracker_DBconn );
		if ( $dbh == false ) {
			wfDebug( "DB connection error\n" );
			wfDebug( "Connection string: $wgRequestTracker_DBconn\n" );
			$wgRequestTracker_Active = 0;
		}
		$tz = $wgUser->getOption( 'timecorrection' );
		if ( $tz ) {
			$found = array();
			if ( preg_match ( '/((-?\d\d?):(\d\d))/', $tz, $found ) ) {
				if ( $found[3] === '00' ) {
					pg_query( "SET TIME ZONE $found[2]" );
				}
				else {
					print( "SET TIME ZONE INTERVAL '$found[1]' HOUR TO MINUTE" );
				}
			}
		}
	}

	// If we are not 'active', we leave right away, with minimal output	
	if ( !$wgRequestTracker_Active ) {
		if ( $ticketnum ) {
			return "<span class='rt-ticket-inactive'>RT #$ticketnum</span>";
		}
		$msg = wfMsg( 'rt-inactive' );
		return "<table class='rt-table-inactive' border='1'><tr><td>$msg</td></tr></table>";
	}

	// Standard info we gather
	$TZ = "AT TIME ZONE 'GMT'";
	$ticketinfo = 't.id, t.subject, t.priority, INITCAP(t.status) AS status, q.name AS queue,'
		. ' COALESCE(u.realname, u.name) AS owner,'
		. ' u.name AS username,'
		. ' COALESCE(u2.realname, u2.name) AS creator,'
		. " TO_CHAR(t.lastupdated $TZ, '$wgRequestTracker_TIMEFORMAT_LASTUPDATED'::text) AS lastupdated,"
		. " TO_CHAR(t.lastupdated $TZ, '$wgRequestTracker_TIMEFORMAT_LASTUPDATED2'::text) AS lastupdated2,"
		. " TO_CHAR(now() $TZ, '$wgRequestTracker_TIMEFORMAT_NOW'::text) AS nowtime,"
		. " TO_CHAR(t.created $TZ, '$wgRequestTracker_TIMEFORMAT_CREATED'::text) AS created,"
		. " TO_CHAR(t.created $TZ, '$wgRequestTracker_TIMEFORMAT_CREATED2'::text) AS created2,"
		. " TO_CHAR(t.resolved $TZ, '$wgRequestTracker_TIMEFORMAT_RESOLVED'::text) AS resolved,"
		. " TO_CHAR(t.resolved $TZ, '$wgRequestTracker_TIMEFORMAT_RESOLVED2'::text) AS resolved2,"
		. "	CASE WHEN (now() $TZ - t.created) <= '1 second'::interval THEN '1 second' ELSE"
		. " CASE WHEN (now() $TZ - t.created) <= '2 minute'::interval THEN EXTRACT(seconds FROM now() $TZ - t.created) || ' seconds' ELSE"
		. " CASE WHEN (now() $TZ - t.created) <= '2 hour'::interval THEN EXTRACT(minutes FROM now() $TZ - t.created) || ' minutes' ELSE"
		. " CASE WHEN (now() $TZ - t.created) <= '2 day'::interval THEN EXTRACT(hours FROM now() $TZ - t.created) || ' hours' ELSE"
		. " EXTRACT(days FROM now() $TZ - t.created) || ' days' END END END END AS age";

	// The standard query
	$ticketquery = "SELECT $ticketinfo FROM tickets t"
		. ' JOIN users u ON t.owner = u.id'
		. ' JOIN users u2 ON t.creator = u2.id'
		. ' JOIN queues q ON t.queue = q.id';

	// If just a single number, treat it as <rt>#</rt>
	if ( 1 === count( $args ) ) {
		if ( preg_match( '/^\d+$/', key($args) ) ) {
			$ticketnum = key($args);
		}
	}

	// Look up a single ticket number
	if ( $ticketnum ) {
		$SQL = "$ticketquery AND t.id = $ticketnum";
		$res = pg_query( $dbh, $SQL );
		if ( !$res ) {
			die ( wfMsg( 'rt-badquery' ) );
		}
		$info = pg_fetch_array( $res );
		if ( !$info ) {
			return "<span class='rt-nosuchticket'>RT #$ticketnum</span>";
		}
		return rtFancyLink( $info, $args, $parser, 0 );
	}

	// Add in a LIMIT clause if l=xx was used
	$limit = '';
	if ( array_key_exists( 'l', $args ) ) {
		$limit = trim( $args['l'] );
		if ( !preg_match( '/^ *\d+ *$/', $limit ) ) {
			die ( wfMsg ( 'rt-badlimit', $limit ) );
		}
		$limit = " LIMIT $limit";
	}

	// Change the default ORDER BY clause if ob=xx was used
	$orderby = 'ORDER BY t.lastupdated DESC, t.id';
	$valid_orderby = array
		(
		 'id'          => 't.id',
		 'subject'     => 't.subject',
		 'priority'    => 't.priority',
		 'status'      => 't.status',
		 'queue'       => 'q.name',
		 'owner'       => 'COALESCE(u.realname, u.name)',
		 'creator'     => 'COALESCE(u2.realname, u2.name)',
		 'lastupdated' => 't.lastupdated',
		 'created'     => 't.created',
		 'resolved'    => 't.resolved',
		 );
	if ( array_key_exists( 'ob', $args ) ) {
		$orderby = 'ORDER BY';
		$orderbyargs = trim( strtolower( $args['ob'] ) );
		foreach ( preg_split( '/\s*,\s*/', $orderbyargs ) as $word ) {
			$oldlen = strlen( $word );
			$word = ltrim( $word, '!' );
			$mod = $oldlen !== strlen( $word ) ? ' DESC' : '';
			if ( !preg_match( '/^\w+$/', $word ) ) {
				die ( wfMsg ( 'rt-badorderby', $word ) );
			}
			if ( array_key_exists( $word, $valid_orderby ) ) {
				$word = $valid_orderby[$word];
			}
			else if ( !preg_match ('/^\d+$/', $word ) ) {
				die ( wfMsg ( 'rt-badorderby', $word ) );
			}
			$orderby .= " $word$mod,";
		}
		$orderby = rtrim( $orderby, ',' );
	}

	// Determine what status to use. Default is new and open:
	$searchstatus = "AND t.status IN ('new','open')";
	$valid_status = array( 'new', 'open', 'resolved', 'deleted', 'stalled', 'rejected' );
	if ( array_key_exists( 's', $args ) ) {
		$statusargs = trim( strtolower( $args['s'] ) );
		if ( $statusargs === 'all' ) {
			$searchstatus = '';
		}
		else {
			$searchstatus = 'AND t.status IN (';
			foreach ( preg_split( '/\s*,\s*/', $statusargs ) as $word ) {
				if ( !in_array( $word, $valid_status ) ) {
					die ( wfMsg ( 'rt-badstatus', $word ) );
				}
				$searchstatus .= "'$word',";
			}
			$searchstatus = preg_replace( '/.$/', ')', $searchstatus );
		}
	}

	// See if we are limiting to one or more queues
	$searchq = '';
	if ( array_key_exists('q', $args ) ) {
		$qargs = trim( strtolower( $args['q'] ) );
		$searchq = 'AND LOWER(q.name) IN (';
		foreach ( preg_split( '/\s*,\s*/', $qargs ) as $word ) {
			$word = trim( $word );
			if ( !preg_match( '/^[\w \.-]+$/', $word ) ) {
				die ( wfMsg ( 'rt-badqueue', $word ) );
			}
			$searchq .= "'$word',";
		}
		$searchq = preg_replace( '/.$/', ')', $searchq );
	}

	// See if we are limiting to one or more owners
	$searchowner = '';
	if ( array_key_exists('o', $args ) ) {
		$oargs = trim( strtolower( $args['o'] ) );
		$searchowner = 'AND LOWER(u.name) IN (';
		foreach ( preg_split( '/\s*,\s*/', $oargs ) as $word ) {
			$word = trim( $word );
			if ( !preg_match( '/^[\w\@\.\-\:\/]+$/', $word ) ) {
				die ( wfMsg ( 'rt-badowner', $word ) );
			}
			$searchowner .= "'$word',";
		}
		$searchowner = preg_replace( '/.$/', ')', $searchowner );
	}

	// Build and run the final query
	$SQL = "$ticketquery $searchq $searchowner $searchstatus $orderby $limit";
	$res = pg_query( $dbh, $SQL );
	if ( !$res ) {
		die ( wfMsg( 'rt-badquery' ) );
	}
	$info = pg_fetch_all( $res );
	if ( !$info ) {
		$msg = wfMsg( 'rt-nomatches' );
		return "<table class='rt-table-empty' border='1'><tr><th>$msg</th><tr></table>";
	}

	// Figure out what columns to show
	// Anything specifically requested is shown
	// Everything else is either on or off by default, but can be overidden
	$output = '';

	// The queue: show by default unless searching a single queue
	$showqueue = 1;
	if ( array_key_exists('noqueue', $args )
		|| ($searchq
			&& false === strpos( $searchq, ',' )
			&& !array_key_exists( 'queue', $args ) ) ) {
		$showqueue = 0;
	}

	// The owner: show by default unless searching a single owner
	$showowner = 1;
	if ( array_key_exists( 'noowner', $args )
		|| ( $searchowner
			&& false === strpos( $searchowner, ',' )
			&& !array_key_exists( 'owner', $args ) ) ) {
		$showowner = 0;
	}

	// The status: show by default unless searching a single status
	$showstatus = 1;
	if ( array_key_exists( 'nostatus', $args )
		|| ( false === strpos($searchstatus, ',' )
			&& !array_key_exists( 'status', $args ) ) ) {
		$showstatus = 0;
	}

	// Things we always show unless told not to:
	$showsubject = ! array_key_exists( 'nosubject', $args );
	$showupdated = ! array_key_exists( 'noupdated', $args );
	$showticket  = ! array_key_exists( 'noticket',  $args );

	// Things we don't show unless asked to:
	$showpriority  = array_key_exists( 'priority',  $args );
	$showupdated2  = array_key_exists( 'updated2',  $args );
	$showcreated   = array_key_exists( 'created',   $args );
	$showcreated2  = array_key_exists( 'created2',  $args );
	$showresolved  = array_key_exists( 'resolved',  $args );
	$showresolved2 = array_key_exists( 'resolved2', $args );
	$showage       = array_key_exists( 'age',       $args );

	// Unless 'tablerows' has been set, output the table and header tags
	if ( !array_key_exists( 'tablerows',$args ) ) {

		$output = "<table class='rt-table' border='1'><tr>";

		if ( $showticket )    { $output .= '<th>Ticket</th>';       }
		if ( $showqueue )     { $output .= '<th>Queue</th>';        }
		if ( $showsubject )   { $output .= '<th>Subject</th>';      }
		if ( $showstatus )    { $output .= '<th>Status</th>';       }
		if ( $showpriority )  { $output .= '<th>Priority</th>';     }
		if ( $showowner )     { $output .= '<th>Owner</th>';        }
		if ( $showupdated )   { $output .= '<th>Last updated</th>'; }
		if ( $showupdated2 )  { $output .= '<th>Last updated</th>'; }
		if ( $showcreated )   { $output .= '<th>Created</th>';      }
		if ( $showcreated2 )  { $output .= '<th>Created</th>';      }
		if ( $showresolved )  { $output .= '<th>Resolved</th>';     }
		if ( $showresolved2 ) { $output .= '<th>Resolved</th>';     }
		if ( $showage )       { $output .= '<th>Age</th>';          }

		$output .= '</tr>';
	}

	foreach ( $info as $row ) {

		if ( $showticket )  {
			$id = rtFancyLink( $row, $args, $parser, 1 );
			$output .= "<td style='white-space: nowrap'>$id</td>"; 
		}
		if ( $showqueue )     { $output .= '<td>' . htmlspecialchars( $row['queue'] )   . '</td>'; }
		if ( $showsubject )   { $output .= '<td>' . htmlspecialchars( $row['subject'] ) . '</td>'; }
		if ( $showstatus )    { $output .= '<td>' . htmlspecialchars( $row['status'] )  . '</td>'; }
		if ( $showpriority )  { $output .= '<td>' . htmlspecialchars( $row['priority'] ). '</td>'; }
		if ( $showowner )     { $output .= '<td>' . htmlspecialchars( $row['owner'] )   . '</td>'; }
		if ( $showupdated )   { $output .= '<td>' . $row['lastupdated']                 . '</td>'; }
		if ( $showupdated2 )  { $output .= '<td>' . $row['lastupdated2']                . '</td>'; }
		if ( $showcreated )   { $output .= '<td>' . $row['created']                     . '</td>'; }
		if ( $showcreated2 )  { $output .= '<td>' . $row['created2']                    . '</td>'; }
		if ( $showresolved )  { $output .= '<td>' . $row['resolved']                    . '</td>'; }
		if ( $showresolved2 ) { $output .= '<td>' . $row['resolved2']                   . '</td>'; }
		if ( $showage )       { $output .= '<td>' . $row['age']                         . '</td>'; }
		$output .= '<tr>';
	}

	if ( !array_key_exists( 'tablerows',$args ) ) {
		$output .= '</table>';
	}

	return $output;
}


function rtFancyLink( $row, $args, $parser, $istable ) {

	global $wgRequestTracker_URL, $wgRequestTracker_Formats, $wgRequestTracker_Useballoons;

	$ticketnum = $row['id'];
	$ret = "[$wgRequestTracker_URL=$ticketnum RT #$ticketnum]";

	## Check for any custom format args in the rt tag.
	## If any are found, use that and ignore any other args
	$foundformat = 0;
	foreach ( array_keys( $args ) as $val ) {
		if ( array_key_exists( $val, $wgRequestTracker_Formats ) ) {
			$format = $wgRequestTracker_Formats[$val];
			foreach ( array_keys( $row ) as $rev ) {
				$format = str_replace( "?$rev?", "$row[$rev]", $format );
			}
			$ret .= " $format";
			$foundformat = 1;
			break;
		}
	}

	## Process any column-based args to the rt tag
	if ( !$foundformat and !$istable ) {
		foreach ( array_keys( $args ) as $val ) {
			if ( array_key_exists( $val, $row ) ) {
				$format = $args[$val];
				if ( false === strpos( $format, '?' ) ) {
					$showname = $val === 'lastupdated' ? 'Last updated' : ucfirst( $val );
					$ret .= " $showname: $row[$val]";
				}
				else {
					$ret .= " " . str_replace( '?', $row[$val], $format );
				}
			}
		}
	}

	$ret = $parser->recursiveTagParse( $ret );

	// Not using balloons? Just return the current text
	if ( !$wgRequestTracker_Useballoons || array_key_exists( 'noballoon', $args ) ) {
		return "<span class='rt-ticket-noballoon'>$ret</span>";
	}

	$safesub = preg_replace( '/\"/', '\"', $row['subject'] );
	$safesub = preg_replace( '/\'/', "\'", $safesub );
	$safesub = htmlspecialchars( $safesub );

	$safeowner = $row['owner'];
	if ($row['owner'] !== $row['username']) {
		$safeowner .= " ($row[username])";
	}
	$safeowner = preg_replace( '/\"/', '\"', $safeowner );
	$safeowner = preg_replace( '/\'/', "\'", $safeowner );
	$safeowner = htmlspecialchars( $safeowner );

	$safeq = preg_replace( '/\"/', '\"', $row['queue'] );
	$safeq = preg_replace( '/\'/', "\'", $safeq );
	$safeq = htmlspecialchars( $safeq );

	$text = "RT #<b>$ticketnum</b>";
	$text .= "<br />Status: <b>$row[status]</b>";
	$text .= "<br />Subject: <b>$safesub</b>";
	$text .= "<br />Owner: <b>$safeowner</b>";
	$text .= "<br />Queue: <b>$safeq</b>";
	$text .= "<br />Created: <b>$row[created]</b>";
	if ( $row['status'] === 'Resolved' ) {
		$text .= "<br />Resolved: <b>$row[resolved]</b>";
	}
	else {
		$text .= "<br />Last updated: <b>$row[lastupdated]</b>";
	}

	## Prepare some balloon-tek
	$link   = isset( $args['link'] )   ? $args['link']   : '';
	$target = isset( $args['target'] ) ? $args['target'] : '';
	$sticky = isset( $args['sticky'] ) ? $args['sticky'] : '0';
	$width  = isset( $args['width'] )  ? $args['width']  : '0';

	$event  = isset( $args['click'] ) && $args['click'] && !$link ? 'onclick' : 'onmouseover';
	$event2 = '';
	$event  = "$event=\"balloon.showTooltip(event,'${text}',${sticky},${width})\"";

	if ( preg_match( '/onclick/',$event ) && $args['hover'] ) {
		$event2 = " onmouseover=\"balloon.showTooltip(event,'" . $args['hover'] . "',0,${width})\"";
	}

	$has_style = isset( $args['style'] ) && $args['style'];
	$style  = "style=\"" . ($has_style ? $args['style'] . ";cursor:pointer\"" : "cursor:pointer\"");
	$target = $target ? "target=${target}" : '';
	$output = "<span class='rt-ticket' ${event} ${event2} ${style}>$ret</span>";

	return $output;
}

$rtDate = gmdate( 'YmdHis', @filemtime( __FILE__ ) );
$wgCacheEpoch = max( $wgCacheEpoch, $rtDate );
