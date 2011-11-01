<?php
/**
 * ***** BEGIN LICENSE BLOCK *****
 * This file is part of QPoll.
 * Uses parts of code from Quiz extension (c) 2007 Louis-Rémi BABE. All rights reserved.
 *
 * QPoll is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * QPoll is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with QPoll; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * ***** END LICENSE BLOCK *****
 *
 * QPoll is a poll tool for MediaWiki.
 *
 * To activate this extension :
 * * Create a new directory named QPoll into the directory "extensions" of MediaWiki.
 * * Place the files from the extension archive there.
 * * Add this line at the end of your LocalSettings.php file :
 * require_once "$IP/extensions/QPoll/qp_user.php";
 *
 * @version 0.8.0a
 * @link http://www.mediawiki.org/wiki/Extension:QPoll
 * @author QuestPC <questpc@rambler.ru>
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

class PollResults extends qp_SpecialPage {

	public function __construct() {
		parent::__construct( 'PollResults', 'read' );
		# for MW 1.15 (still being used by many customers)
		# please do not remove until 2012
		if ( qp_Setup::mediaWikiVersionCompare( '1.16' ) ) {
			wfLoadExtensionMessages( 'QPoll' );
		}
	}

	static $accessPermissions = array( 'read', 'pollresults' );

	static $UsersLink = "";
	static $PollsLink = "";

	/**
	 * Checks if the given user (identified by an object) can execute this special page
	 * @param $user User: the user to check
	 * @return Boolean: does the user have permission to view the page?
	 */
	public function userCanExecute( $user ) {
		# this fn is used to decide whether to show the page link at Special:Specialpages
		foreach ( self::$accessPermissions as $permission ) {
			if ( !$user->isAllowed( $permission ) ) {
				return false;
			}
		}
		return true;
	}

	public function execute( $par ) {
		global $wgOut, $wgRequest;
		global $wgServer; // "http://www.yourserver.org"
							// (should be equal to 'http://'.$_SERVER['SERVER_NAME'])
		global $wgScript;   // "/subdirectory/of/wiki/index.php"
		global $wgUser;

		# check whether the user has sufficient permissions
		foreach ( self::$accessPermissions as $permission ) {
			if ( !$wgUser->isAllowed( $permission ) ) {
				$wgOut->permissionRequired( $permission );
				return;
			}
		}

		if ( class_exists( 'ResourceLoader' ) ) {
			# MW 1.17+
			// $wgOut->addModules( 'jquery' );
			$wgOut->addModules( 'ext.qpoll.special.pollresults' );
		} else {
			# MW < 1.17
			$wgOut->addExtensionStyle( qp_Setup::$ScriptPath . '/clientside/qp_results.css' );
		}
		if ( self::$UsersLink == "" ) {
			self::$UsersLink = $this->qpLink( $this->getTitle(), wfMsg( 'qp_users_list' ), array( "style" => "font-weight:bold;" ), array( 'action' => 'users' ) );
		}
		if ( self::$PollsLink == "" ) {
			self::$PollsLink = $this->qpLink( $this->getTitle(), wfMsg( 'qp_polls_list' ), array( "style" => "font-weight:bold;" ) );
		}
		$wgOut->addHTML( '<div class="qpoll">' );
		$output = "";
		$this->setHeaders();
		$cmd = $wgRequest->getVal( 'action' );
		if ( $cmd === null ) {
			list( $limit, $offset ) = wfCheckLimits();
			$qpl = new qp_PollsList();
			$qpl->doQuery( $offset, $limit );
		} else {
			$pid = $wgRequest->getVal( 'id' );
			$uid = $wgRequest->getVal( 'uid' );
			$question_id = $wgRequest->getVal( 'qid' );
			$proposal_id = $wgRequest->getVal( 'pid' );
			$cid = $wgRequest->getVal( 'cid' );
			switch ( $cmd ) {
				case 'stats':
					if ( $pid !== null ) {
						$pid = intval( $pid );
						$output = self::getPollsLink();
						$output .= self::getUsersLink();
						$output .= $this->showStats( $pid );
					}
					break;
				case 'stats_xls':
				case 'voices_xls':
				case 'interpretation_xls':
						if ( $pid !== null ) {
							$pid = intval( $pid );
							$this->writeXLS( $cmd, $pid );
						}
					break;
				case 'uvote':
					if ( $pid !== null && $uid !== null ) {
						$pid = intval( $pid );
						$uid = intval( $uid );
						$output = self::getPollsLink();
						$output .= self::getUsersLink();
						$output .= $this->showUserVote( $pid, $uid );
					}
					break;
				case 'qpcusers':
					if ( $pid !== null && $question_id !== null && $proposal_id !== null && $cid !== null ) {
						$pid = intval( $pid );
						$question_id = intval( $question_id );
						$proposal_id = intval( $proposal_id );
						$cid = intval( $cid );
						list( $limit, $offset ) = wfCheckLimits();
						$qucl = new qp_UserCellList( $cmd, $pid, $question_id, $proposal_id, $cid );
						$qucl->doQuery( $offset, $limit );
					}
					break;
				case 'users':
				case 'users_a':
					list( $limit, $offset ) = wfCheckLimits();
					$qul = new qp_UsersList( $cmd );
					$qul->doQuery( $offset, $limit );
					break;
				case 'upolls':
				case 'nupolls':
					if ( $uid !== null ) {
						$uid = intval( $uid );
						list( $limit, $offset ) = wfCheckLimits();
						$qupl = new qp_UserPollsList( $cmd, $uid );
						$qupl->doQuery( $offset, $limit );
					}
					break;
				case 'pulist':
				case 'npulist':
					if ( $pid !== null ) {
						$pid = intval( $pid );
						list( $limit, $offset ) = wfCheckLimits();
						$qpul = new qp_PollUsersList( $cmd, $pid );
						$qpul->doQuery( $offset, $limit );
					}
					break;
			}
		}
		$wgOut->addHTML( $output . '</div>' );
	}

	private function getAnswerHeader( qp_PollStore $pollStore ) {
		$tags = array(
			array( '__tag' => 'div', 'style' => 'font-weight:bold;', wfMsg( 'qp_results_submit_attempts', intval( $pollStore->attempts ) ) )
		);
		$interpTitle = $pollStore->getInterpTitle();
		if ( !( $interpTitle instanceof Title ) ) {
			$tags[] = wfMsg( 'qp_poll_has_no_interpretation' );
			return $tags;
		}
		# 'parentheses' key is unavailable in MediaWiki 1.15.x
		$interp_link = $this->qpLink( $interpTitle, $interpTitle->getPrefixedText() );
		$tags[] = wfMsg( 'qp_browse_to_interpretation', $interp_link );
		$interpResultView = new qp_InterpResultView( true );
		$interpResultView->showInterpResults( $tags, $pollStore->interpResult, true );
		return $tags;
	}

	private function showUserVote( $pid, $uid ) {
		if ( $pid === null || $uid === null ) {
			return '';
		}
		$pollStore = new qp_PollStore( array( 'from' => 'pid', 'pid' => $pid ) );
		if ( $pollStore->pid === null ) {
			return '';
		}
		$pollStore->loadQuestions();
		$userName = $pollStore->getUserName( $uid );
		if ( $userName === false ) {
			return '';
		}
		$userTitle = Title::makeTitleSafe( NS_USER, $userName );
		$user_link = $this->qpLink( $userTitle, $userName );
		$pollStore->setLastUser( $userName, false );
		if ( !$pollStore->loadUserVote() ) {
			return '';
		}
		$poll_title = $pollStore->getTitle();
		# 'parentheses' key is unavailable in MediaWiki 1.15.x
		$poll_link = $this->qpLink( $poll_title, $poll_title->getPrefixedText() . wfMsg( 'word-separator' ) . wfMsg( 'qp_parentheses', $pollStore->mPollId ) );
		$output = wfMsg( 'qp_browse_to_user', $user_link ) . "<br />\n";
		$output .= wfMsg( 'qp_browse_to_poll', $poll_link ) . "<br />\n";
		$headerTags = $this->getAnswerHeader( $pollStore );
		$output .= qp_Renderer::renderTagArray( $headerTags );
		unset( $headerTags );
		foreach ( $pollStore->Questions as &$qdata ) {
			if ( $pollStore->isUsedQuestion( $qdata->question_id ) ) {
				$output .= "<br />\n<b>" . $qdata->question_id . ".</b> " . qp_Setup::entities( $qdata->CommonQuestion ) . "<br />\n";
				$qview = $qdata->getView();
				$output .= $qview->displayUserQuestionVote();
			}
		}
		return $output;
	}

	private function showStats( $pid ) {
		$output = "";
		if ( $pid !== null ) {
			$pollStore = new qp_PollStore( array( 'from' => 'pid', 'pid' => $pid ) );
			if ( $pollStore->pid !== null ) {
				$pollStore->loadQuestions();
				$pollStore->loadTotals();
				$pollStore->calculateStatistics();
				$poll_title = $pollStore->getTitle();
				# 'parentheses' is unavailable in 1.14.x
				$poll_link = $this->qpLink( $poll_title, $poll_title->getPrefixedText() . wfMsg( 'word-separator' ) . wfMsg( 'qp_parentheses', $pollStore->mPollId ) );
				$output .= wfMsg( 'qp_browse_to_poll', $poll_link ) . "<br />\n";
				$interpTitle = $pollStore->getInterpTitle();
				if ( $interpTitle !== null ) {
					$interp_link = $this->qpLink( $interpTitle, $interpTitle->getPrefixedText() );
					$output .= wfMsg( 'qp_browse_to_interpretation', $interp_link ) . "<br />\n";
				}
				$output .= $this->qpLink( $this->getTitle(), wfMsg( 'qp_export_to_xls' ), array( "style" => "font-weight:bold;" ), array( 'action' => 'stats_xls', 'id' => $pid ) ) . "<br />\n";
				$output .= $this->qpLink( $this->getTitle(), wfMsg( 'qp_voices_to_xls' ), array( "style" => "font-weight:bold;" ), array( 'action' => 'voices_xls', 'id' => $pid ) ) . "<br />\n";
				$output .= $this->qpLink( $this->getTitle(), wfMsg( 'qp_interpretation_results_to_xls' ), array( "style" => "font-weight:bold;" ), array( 'action' => 'interpretation_xls', 'id' => $pid ) ) . "<br />\n";
				foreach ( $pollStore->Questions as &$qdata ) {
					$qview = $qdata->getView();
					$output .= $qview->displayQuestionStats( $this, $pid );
				}
			}
		}
		return $output;
	}

	private function writeXLS( $cmd, $pid ) {
		if ( $pid === null ) {
			return;
		}
		$pollStore = new qp_PollStore( array( 'from' => 'pid', 'pid' => $pid ) );
		if ( $pollStore->pid === null ) {
			return;
		}
		# use default IIS / Apache execution time limit which is much larger than default PHP limit
		set_time_limit( 300 );
		$poll_id = $pollStore->getPollId();
		try {
			require_once( qp_Setup::$ExtDir . '/Excel/Excel_Writer.php' );
			$xls_fname = tempnam( "", ".xls" );
			$qp_xls = new qp_XlsPoll( $xls_fname );
			# setup common formats
			$qp_xls->addFormats( array(
				'heading' => array( 'bold' => 1 ),
				'answer' => array( 'fgcolor' => 0x1A /* 26 */, 'border' => 1 ),
				'even' => array( 'fgcolor' => 0x2A /* 42 */, 'border' => 1 ),
				'odd' => array( 'fgcolor' => 0x23 /* 35 */, 'border' => 1 )
			) );
			$qp_xls->getFormat( 'answer' )->setAlign( 'left' );
			$qp_xls->getFormat( 'even' )->setAlign( 'left' );
			$qp_xls->getFormat( 'odd' )->setAlign( 'left' );
			switch ( $cmd ) {
			case 'voices_xls' :
				$qp_xls->voicesToXLS( $pollStore );
				break;
			case 'stats_xls' :
				# statistics export uses additional formats
				$percent_num_format = '[Blue]0.0%;[Red]-0.0%;[Black]0%';
				$qp_xls->addFormats( array(
					'percent' => array( 'fgcolor' => 0x1A, 'border' => 1 )
				) );
				$qp_xls->getFormat( 'percent' )->setAlign( 'left' );
				$qp_xls->getFormat( 'percent' )->setNumFormat( $percent_num_format );
				$qp_xls->getFormat( 'even' )->setNumFormat( $percent_num_format );
				$qp_xls->getFormat( 'odd' )->setNumFormat( $percent_num_format );
				$qp_xls->statsToXLS( $pollStore );
				break;
			case 'interpretation_xls' :
				$qp_xls->interpretationToXLS( $pollStore );
				break;
			}
			$qp_xls->closeWorkbook();
			header( 'Content-Type: application/x-msexcel; name="' . $poll_id . '.xls"' );
			header( 'Content-Disposition: inline; filename="' . $poll_id . '.xls"' );
			$fxls = @fopen( $xls_fname, "rb" );
			@fpassthru( $fxls );
			@unlink( $xls_fname );
			exit();
		} catch ( Exception $e ) {
			if ( $e instanceof MWException ) {
				$e->reportHTML();
				exit();
			} else {
				die( "Error while exporting poll statistics to Excel table\n" );
			}
		}
	}

	static function getUsersLink() {
		return "<div>" . self::$UsersLink . "</div>\n";
	}

	static function getPollsLink() {
		return "<div>" . self::$PollsLink . "</div>\n";
	}

} /* end of PollResults class */

/**
 * List all users
 */
class qp_UsersList extends qp_QueryPage {
	var $cmd;
	var $order_by;
	var $different_order_by_link;

	public function __construct( $cmd ) {
		parent::__construct();
		$this->cmd = $cmd;
		if ( $cmd == 'users' ) {
			$this->order_by = 'count(pid) DESC, name ASC ';
			$this->different_order_by_link = $this->qpLink( $this->getTitle(), wfMsg( 'qp_order_by_username' ), array(), array( "action" => "users_a" ) );
		} else {
			$this->order_by = 'name ';
			$this->different_order_by_link = $this->qpLink( $this->getTitle(), wfMsg( 'qp_order_by_polls_count' ), array(), array( "action" => "users" ) );
		}
	}

	function getIntervalResults( $offset, $limit ) {
		$result = array();
		$db = & wfGetDB( DB_SLAVE );
		$qp_users = $db->tableName( 'qp_users' );
		$qp_users_polls = $db->tableName( 'qp_users_polls' );
		$res = $db->select( "$qp_users_polls qup, $qp_users qu",
			array( 'qu.uid as uid', 'name as username', 'count(pid) as pidcount' ),
			'qu.uid=qup.uid',
			__METHOD__,
			array( 'GROUP BY' => 'qup.uid',
						'ORDER BY' => $this->order_by,
						'OFFSET' => intval( $offset ),
						'LIMIT' => intval( $limit ) )
		);
		while ( $row = $db->fetchObject( $res ) ) {
			$result[] = $row;
		}
		return $result;
	}

	function formatResult( $result ) {
		global $wgLang, $wgContLang;
		$link = "";
		if ( $result !== null ) {
			$uid = intval( $result->uid );
			$userName = $result->username;
			$userTitle = Title::makeTitleSafe( NS_USER, $userName );
			$user_link = $this->qpLink( $userTitle, $userName );
			$user_polls_link = $this->qpLink( $this->getTitle(), wfMsgExt( 'qp_user_polls_link', array( 'parsemag' ), $result->pidcount, $userName ) , array(), array( "uid" => $uid, "action" => "upolls" ) );
			$user_missing_polls_link = $this->qpLink( $this->getTitle(), wfMsgExt( 'qp_user_missing_polls_link', 'parsemag', $userName ) , array(), array( "uid" => $uid, "action" => "nupolls" ) );
			$link = $user_link . ': ' . $user_polls_link . ', ' . $user_missing_polls_link;
		}
		return $link;
	}

	function linkParameters() {
		$params[ 'action' ] = $this->cmd;
		return $params;
	}

	function getPageHeader() {
		return PollResults::getPollsLink() . '<div class="head">' . wfMsg( 'qp_users_list' ) . '<div>' . $this->different_order_by_link . '</div></div>';
	}

} /* end of qp_UsersList class */

/**
 * List of polls in which selected user has (not) participated
 */
class qp_UserPollsList extends qp_QueryPage {
	var $uid;
	var $inverse;
	var $cmd;

	public function __construct( $cmd, $uid ) {
		parent::__construct();
		$this->uid = intval( $uid );
		$this->cmd = $cmd;
		$this->inverse = ( $cmd == "nupolls" );
	}

	function getPageHeader() {
		global $wgLang, $wgContLang;
		# fake pollStore to get username by uid: avoid to use this trick as much as possible
		$pollStore = new qp_PollStore();
		$userName = $pollStore->getUserName( $this->uid );
		$db = & wfGetDB( DB_SLAVE );
		$res = $db->select(
			array( 'qp_users_polls' ),
			array( 'count(pid) as pidcount' ),
			'uid=' . $db->addQuotes( $this->uid ),
			__METHOD__ );
		if ( $row = $db->fetchObject( $res ) ) {
			$pidcount = $row->pidcount;
		} else {
			$pidcount = 0;
		}
		if ( $userName !== false ) {
			$userTitle = Title::makeTitleSafe( NS_USER, $userName );
			$user_link = $this->qpLink( $userTitle, $userName );
			return PollResults::getPollsLink() . PollResults::getUsersLink() . '<div class="head">' . $user_link . ': ' . ( $this->inverse ? wfMsgExt( 'qp_user_missing_polls_link', 'parsemag', $userName ) : wfMsgExt( 'qp_user_polls_link', array( 'parsemag' ), $pidcount, $userName ) ) . ' ' . '</div>';
		}
	}

	function getIntervalResults( $offset, $limit ) {
		$result = Array();
		$db = & wfGetDB( DB_SLAVE );
		$page = $db->tableName( 'page' );
		$qp_poll_desc = $db->tableName( 'qp_poll_desc' );
		$qp_users_polls = $db->tableName( 'qp_users_polls' );
		$query = "SELECT pid, page_namespace AS ns, page_title AS title, poll_id ";
		$query .= "FROM ($qp_poll_desc, $page) ";
		$query .= " WHERE page_id=article_id AND pid " . ( $this->inverse ? "NOT " : "" ) . "IN ";
		$query .= "(SELECT pid ";
		$query .= "FROM $qp_users_polls ";
		$query .= "WHERE uid=" . $db->addQuotes( $this->uid ) . ") ";
		$query .= "ORDER BY page_namespace, page_title, poll_id ";
		$query .= "LIMIT " . intval( $offset ) . ", " . intval( $limit );
		$res = $db->query( $query, __METHOD__ );
		while ( $row = $db->fetchObject( $res ) ) {
			$result[] = $row;
		}
		return $result;
	}

	function formatResult( $result ) {
		global $wgLang, $wgContLang;
		$poll_title = Title::makeTitle( $result->ns, $result->title, qp_AbstractPoll::s_getPollTitleFragment( $result->poll_id, '' ) );
		$pagename = qp_Setup::specialchars( $wgContLang->convert( $poll_title->getPrefixedText() ) );
		$pollname = qp_Setup::specialchars( $result->poll_id );
		$goto_link = $this->qpLink( $poll_title, wfMsg( 'qp_source_link' ) );
		$voice_link = $this->qpLink( $this->getTitle(), wfMsg( 'qp_voice_link' . ( $this->inverse ? "_inv" : "" ) ), array(), array( "id" => intval( $result->pid ), "uid" => $this->uid, "action" => "uvote" ) );
		$link = wfMsg( 'qp_results_line_qupl', $pagename, $pollname, $voice_link );
		return $link;
	}

	function linkParameters() {
		$params[ "action" ] = $this->cmd;
		if ( $this->uid !== null ) {
			$params[ "uid" ] = $this->uid;
		}
		return $params;
	}

} /* end of qp_UserPollsList class */

/**
 * List all polls
 */
class qp_PollsList extends qp_QueryPage {

	function getIntervalResults( $offset, $limit ) {
		$result = array();
		$db = & wfGetDB( DB_SLAVE );
		$res = $db->select(
			array( 'page', 'qp_poll_desc' ),
			array( 'page_namespace as ns', 'page_title as title', 'pid', 'poll_id', 'order_id' ),
			'page_id=article_id',
			__METHOD__,
			array( 'ORDER BY' => 'page_namespace, page_title, order_id',
						'OFFSET' => intval( $offset ),
						'LIMIT' => intval( $limit ) )
		);
		while ( $row = $db->fetchObject( $res ) ) {
			$result[] = $row;
		}
		return $result;
	}

	function formatResult( $result ) {
		global $wgLang, $wgContLang;
		$poll_title = Title::makeTitle( $result->ns, $result->title, qp_AbstractPoll::s_getPollTitleFragment( $result->poll_id, '' ) );
		$pagename = qp_Setup::specialchars( $wgContLang->convert( $poll_title->getPrefixedText() ) );
		$pollname = qp_Setup::specialchars( $result->poll_id );
		$goto_link = $this->qpLink( $poll_title, wfMsg( 'qp_source_link' ) );
		$voices_link = $this->qpLink( $this->getTitle(), wfMsg( 'qp_stats_link' ), array(), array( "id" => intval( $result->pid ), "action" => "stats" ) );
		$users_link = $this->qpLink( $this->getTitle(), wfMsg( 'qp_users_link' ), array(), array( "id" => intval( $result->pid ), "action" => "pulist" ) );
		$not_participated_link = $this->qpLink( $this->getTitle(), wfMsg( 'qp_not_participated_link' ), array(), array( "id" => intval( $result->pid ), "action" => "npulist" ) );
		$link = wfMsg( 'qp_results_line_qpl', $pagename, $pollname, $goto_link, $voices_link, $users_link, $not_participated_link );
		return $link;
	}

	function getPageHeader() {
		return PollResults::getUsersLink() . '<div class="head">' . wfMsg( 'qp_polls_list' ) . '</div>';
	}

} /* end of qp_PollsList class */

/**
 * List of users, (not) participated in particular poll, defined by pid
 */
class qp_PollUsersList extends qp_QueryPage {

	var $pid;
	var $inverse;
	var $cmd;

	public function __construct( $cmd, $pid ) {
		parent::__construct();
		$this->pid = intval( $pid );
		$this->cmd = $cmd;
		$this->inverse = ( $cmd == "npulist" );
	}

	function getPageHeader() {
		global $wgLang, $wgContLang;
		$link = "";
		$db = & wfGetDB( DB_SLAVE );
		$res = $db->select(
			array( 'page', 'qp_poll_desc' ),
			array( 'page_namespace as ns', 'page_title as title', 'poll_id' ),
			'page_id=article_id and pid=' . $db->addQuotes( $this->pid ),
			__METHOD__ );
		if ( $row = $db->fetchObject( $res ) ) {
			$poll_title = Title::makeTitle( intval( $row->ns ), $row->title, qp_AbstractPoll::s_getPollTitleFragment( $row->poll_id, '' ) );
			$pagename = qp_Setup::specialchars( $wgContLang->convert( $poll_title->getPrefixedText() ) );
			$pollname = qp_Setup::specialchars( $row->poll_id );
			$goto_link = $this->qpLink( $poll_title, wfMsg( 'qp_source_link' ) );
			$spec = wfMsg( 'qp_header_line_qpul', wfMsg( $this->inverse ? 'qp_not_participated_link' : 'qp_users_link' ), $pagename, $pollname );
			$head[] = PollResults::getPollsLink();
			$head[] = PollResults::getUsersLink();
			$head[] = array( '__tag' => 'div', 'class' => 'head', 0 => $spec );
			$head[] = ' (' . $goto_link . ')';
			$link = qp_Renderer::renderTagArray( $head );
		}
		return $link;
	}

	function getIntervalResults( $offset, $limit ) {
		$result = Array();
		$db = & wfGetDB( DB_SLAVE );
		$qp_users = $db->tableName( 'qp_users' );
		$qp_users_polls = $db->tableName( 'qp_users_polls' );
		$query = "SELECT uid, name as username ";
		$query .= "FROM $qp_users ";
		$query .= "WHERE uid " . ( $this->inverse ? "NOT " : "" ) . "IN ";
		$query .= "(SELECT uid FROM $qp_users_polls WHERE pid=" . $db->addQuotes( $this->pid ) . ") ";
		$query .= "ORDER BY uid ";
		$query .= "LIMIT " . intval( $offset ) . ", " . intval( $limit );
		$res = $db->query( $query, __METHOD__ );
		while ( $row = $db->fetchObject( $res ) ) {
			$result[] = $row;
		}
		return $result;
	}

	function formatResult( $result ) {
		global $wgLang, $wgContLang;
		$link = "";
		if ( $result !== null ) {
			$uid = intval( $result->uid );
			$userName = $result->username;
			$userTitle = Title::makeTitleSafe( NS_USER, $userName );
			$user_link = $this->qpLink( $userTitle, $userName );
			$voice_link = $this->qpLink( $this->getTitle(), wfMsg( 'qp_voice_link' . ( $this->inverse ? "_inv" : "" ) ), array(), array( "id" => intval( $this->pid ), "uid" => $uid, "action" => "uvote" ) );
			$link = wfMsg( 'qp_results_line_qpul', $user_link, $voice_link );
		}
		return $link;
	}

	function linkParameters() {
		$params[ "action" ] = $this->cmd;
		if ( $this->pid !== null ) {
			$params[ "id" ] = $this->pid;
		}
		return $params;
	}

} /* end of qp_PollUsersList class */

/**
 * List of users who voted for particular choice of particular proposal of particular question
 */
class qp_UserCellList extends qp_QueryPage {
	var $cmd;
	var $pid = null;
	var $ns, $title, $poll_id;
	var $question_id, $proposal_id, $cat_id;
	var $inverse = false;

	public function __construct( $cmd, $pid, $question_id, $proposal_id, $cid ) {
		parent::__construct();
		$this->cmd = $cmd;
		$this->question_id = $question_id;
		$this->proposal_id = $proposal_id;
		$this->cat_id = $cid;
		$db = & wfGetDB( DB_SLAVE );
		$qp_poll_desc = $db->tableName( 'qp_poll_desc' );
		$page = $db->tableName( 'page' );
		$query = "SELECT pid, page_namespace as ns, page_title as title, poll_id ";
		$query .= "FROM ($qp_poll_desc, $page) ";
		$query .= "WHERE page_id=article_id AND pid=" . $db->addQuotes( $pid ) . "";
		$res = $db->query( $query, __METHOD__ );
		if ( $row = $db->fetchObject( $res ) ) {
			$this->pid = intval( $row->pid );
			$this->ns = intval( $row->ns );
			$this->title = $row->title;
			$this->poll_id = $row->poll_id;
		}
	}

	function getPageHeader() {
		global $wgLang, $wgContLang;
		$link = "";
		$db = & wfGetDB( DB_SLAVE );
		if ( $this->pid !== null ) {
			$pollStore = new qp_PollStore( array( 'from' => 'pid', 'pid' => $this->pid ) );
			if ( $pollStore->pid !== null ) {
				$pollStore->loadQuestions();
				$poll_title = Title::makeTitle( intval( $this->ns ), $this->title, qp_AbstractPoll::s_getPollTitleFragment( $this->poll_id, '' ) );
				$pagename = qp_Setup::specialchars( $wgContLang->convert( $poll_title->getPrefixedText() ) );
				$pollname = qp_Setup::specialchars( $this->poll_id );
				$goto_link = $this->qpLink( $poll_title, wfMsg( 'qp_source_link' ) );
				$spec = wfMsg( 'qp_header_line_qpul', wfMsg( 'qp_users_link' ), $pagename, $pollname );
				$head[] = PollResults::getPollsLink();
				$head[] = PollResults::getUsersLink();
				$head[] = array( '__tag' => 'div', 'class' => 'head', 0 => $spec );
				# 'parentheses' are unavailable in MW 1.14.x
				$head[] = wfMsg( 'qp_parentheses',  $goto_link ) . '<br />';
				$ques_found = false;
				foreach ( $pollStore->Questions as &$ques ) {
					if ( $ques->question_id == $this->question_id ) {
						$ques_found = true;
						break;
					}
				}
				if ( $ques_found ) {
					$qpa = wfMsg( 'qp_header_line_qucl', $this->question_id, qp_Setup::entities( $ques->CommonQuestion ) );
					if ( array_key_exists( $this->cat_id, $ques->Categories ) ) {
						$categ = &$ques->Categories[ $this->cat_id ];
						$proptext = $ques->ProposalText[ $this->proposal_id ];
						$cat_name = $categ['name'];
						if ( array_key_exists( 'spanId', $categ ) ) {
							$cat_name =  wfMsg( 'qp_full_category_name', $cat_name, $ques->CategorySpans[ $categ['spanId'] ]['name'] );
						}
						$qpa = wfMsg( 'qp_header_line_qucl',
							$this->question_id,
							qp_Setup::entities( $ques->CommonQuestion ),
							qp_Setup::entities( $proptext ),
							qp_Setup::entities( $cat_name ) ) . '<br />';
						$head[] = array( '__tag' => 'div', 'class' => 'head', 'style' => 'padding-left:2em;', 0 => $qpa );
						$link = qp_Renderer::renderTagArray( $head );
					}
				}
			}
		}
		return $link;
	}

	function getIntervalResults( $offset, $limit ) {
		$result = Array();
		$db = & wfGetDB( DB_SLAVE );
		$qp_users = $db->tableName( 'qp_users' );
		$qp_question_answers = $db->tableName( 'qp_question_answers' );
		$query = "SELECT qqa.uid as uid, name as username, text_answer ";
		$query .= "FROM $qp_question_answers qqa ";
		$query .= "INNER JOIN $qp_users qu ON qqa.uid = qu.uid ";
		$query .= "WHERE pid=" . $db->addQuotes( $this->pid ) . " AND question_id=" . $db->addQuotes( $this->question_id ) . " AND proposal_id=" . $db->addQuotes( $this->proposal_id ) . " AND cat_id=" . $db->addQuotes( $this->cat_id ) . " ";
		$query .= "LIMIT " . intval( $offset ) . ", " . intval( $limit );
		$res = $db->query( $query, __METHOD__ );
		while ( $row = $db->fetchObject( $res ) ) {
			$result[] = $row;
		}
		return $result;
	}

	function formatResult( $result ) {
		global $wgLang, $wgContLang;
		$link = "";
		if ( $result !== null ) {
			$uid = intval( $result->uid );
			$userName = $result->username;
			$userTitle = Title::makeTitleSafe( NS_USER, $userName );
			$user_link = $this->qpLink( $userTitle, $userName );
			$voice_link = $this->qpLink( $this->getTitle(), wfMsg( 'qp_voice_link' . ( $this->inverse ? "_inv" : "" ) ), array(), array( "id" => intval( $this->pid ), "uid" => $uid, "action" => "uvote" ) );
			$text_answer = ( $result->text_answer == '' ) ? '' : '<i>' . qp_Setup::entities( $result->text_answer ) . '</i>';
			$link = wfMsg( 'qp_results_line_qucl', $user_link, $voice_link, $text_answer );
		}
		return $link;
	}

	function linkParameters() {
		$params[ "action" ] = $this->cmd;
		if ( $this->pid !== null ) {
			$params[ "id" ] = $this->pid;
			$params[ "qid" ] = $this->question_id;
			$params[ "pid" ] = $this->proposal_id;
			$params[ "cid" ] = $this->cat_id;
		}
		return $params;
	}

} /* end of qp_UserCellList class */
