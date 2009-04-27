<?php
/**
 * Wikimedia Foundation Board of Trustees Election
 *
 * @file
 * @ingroup Extensions
 * @author Tim Starling <tstarling@wikimedia.org>
 * @author Kwan Ting Chan
 * @link http://www.mediawiki.org/wiki/Extension:BoardVote Documentation
 */

# Not a valid entry point, skip unless MEDIAWIKI is defined
if( !defined('MEDIAWIKI') ) {
	die( "Not a valid entry point\n" );
}

# Extension credits
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'BoardVote',
	'author' => array( 'Tim Starling', 'Kwan Ting Chan', 'others' ),
	'url' => 'http://www.mediawiki.org/wiki/Extension:BoardVote',
	'description' => '[[meta:Board elections|Wikimedia Board of Trustees election]]',
	'descriptionmsg' => 'boardvote-desc',
);

# Default settings
$wgBoardVoteDB = 'boardvote';
$wgBoardCandidates = array();
/* $wgBoardCandidates = array( 'John Doe', 'Jane Doe', 'Joe Bloggs', 'John Smith', 'A. N. Other' ); */
$wgGPGCommand = 'gpg';
$wgGPGRecipient = 'boardvote';
$wgGPGHomedir = false;
$wgGPGPubKey = "C:\\Program Files\\GNU\\GnuPG\\pub.txt";
$wgBoardVoteEditCount = 600;
$wgBoardVoteRecentEditCount = 50;
$wgBoardVoteCountDate = '20080301000000';
$wgBoardVoteRecentFirstCountDate = '20080101000000';
$wgBoardVoteRecentCountDate = '20080529000000';
$wgBoardVoteStartDate = '20080601000000';
$wgBoardVoteEndDate = '20080622000000';
$wgBoardVoteDBServer = $wgDBserver;

# Vote admins
$wgAvailableRights[] = 'boardvote';
$wgGroupPermissions['boardvote']['boardvote'] = true;

// Set up the new special page
$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['BoardVote'] = $dir . 'BoardVote.i18n.php';
$wgExtensionAliasesFiles['BoardVote'] = $dir . 'BoardVote.alias.php';

if ( !defined( 'BOARDVOTE_REDIRECT_ONLY' ) ) {
	$wgAutoloadClasses['BoardVotePage'] = $dir . 'BoardVote_body.php';
	$wgSpecialPages['BoardVote'] = 'BoardVotePage';
	$wgExtensionFunctions[] = 'wfSetupBoardVote';
} else {
	$wgAutoloadClasses['GoToBoardVotePage'] = $dir . 'GoToBoardVote_body.php';
	$wgSpecialPages['BoardVote'] = 'GoToBoardVotePage';
}

function wfSetupBoardVote() {
	wfSetupSession();
	if ( isset( $_SESSION['bvLang'] ) && !isset( $_REQUEST['uselang'] ) ) {
		wfDebug( __METHOD__.": Setting user language to {$_SESSION['bvLang']}\n" );
		$_REQUEST['uselang'] = $_SESSION['bvLang'];
		global $wgLang;
		$wgLang = Language::factory( $_SESSION['bvLang'] );
	}
}
