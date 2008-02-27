<?php

/**#@+
 * Extension used for blocking users names and IP addresses with regular expressions. Contains both the blocking mechanism and a special page to add/manage blocks
 *
 * @addtogroup SpecialPage
 *
 * @author Bartek
 * @copyright Copyright © 2007, Wikia Inc.
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
*/

/* generic reasons */

global $wgContactLink;

if($wgContactLink == ''){
	$wgContactLink = '[[Special:Contact|contact Wikia]]';
}

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'Regex Block',
	'version' => preg_replace('/^.* (\d\d\d\d-\d\d-\d\d) .*$/', '\1', '$LastChangedDate$'), #just the date of the last change
	'author' => 'Bartek',
	'description' => 'Extension used for blocking users names and IP addresses with regular expressions. Contains both the blocking mechanism and a special page to add/manage blocks.',
	'descriptionmsg' => 'regexblock-desc',
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['RegexBlock'] = $dir . 'regexBlock.i18n.php';

define ('REGEXBLOCK_PATH', '/') ;

/* get name of the table  */
function wfRegexBlockGetTable () {
	global $wgSharedDB ;
	if ("" != $wgSharedDB) {
		return "{$wgSharedDB}.blockedby" ;
	} else {
		return 'blockedby' ;
	}
}

/* get the name of the stats table */
function wfRegexBlockGetStatsTable () {
	global $wgSharedDB ;
	if ("" != $wgSharedDB) {
		return "{$wgSharedDB}.stats_blockedby" ;
	} else {
		return 'stats_blockedby' ;
	}
}

/* memcached expiration time (0 - infinite) */
define ('REGEXBLOCK_EXPIRE', 0) ;
/* modes for fetching data during blocking */
define ('REGEXBLOCK_MODE_NAMES',0) ;
define ('REGEXBLOCK_MODE_IPS',1) ;
/* for future use */
define ('REGEXBLOCK_USE_STATS', 1) ;

/* core includes */
require_once ($IP.REGEXBLOCK_PATH."extensions/regexBlock/regexBlockCore.php") ;
require_once ($IP.REGEXBLOCK_PATH."extensions/regexBlock/SpecialRegexBlock.php") ;
require_once ($IP.REGEXBLOCK_PATH."extensions/regexBlock/SpecialRegexBlockStats.php") ;

/* simplified regexes, this is shared with SpamRegex */
require_once ($IP.REGEXBLOCK_PATH."extensions/SimplifiedRegex/SimplifiedRegex.php") ;
