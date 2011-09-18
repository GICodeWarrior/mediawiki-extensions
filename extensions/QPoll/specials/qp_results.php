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
						$output .= $this->showVotes( $pid );
					}
					break;
				case 'stats_xls':
						if ( $pid !== null ) {
							$pid = intval( $pid );
							$this->statsToXLS( $pid );
						}
					break;
				case 'voices_xls':
						if ( $pid !== null ) {
							$pid = intval( $pid );
							$this->voicesToXLS( $pid );
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

	private function showAnswerHeader( qp_PollStore $pollStore ) {
		$out = '<div style="font-weight:bold;">' . wfMsg( 'qp_results_submit_attempts', intval( $pollStore->attempts ) ) . '</div>';
		$interpTitle = $pollStore->getInterpTitle();
		if ( $interpTitle === null ) {
			$out .= wfMsg( 'qp_poll_has_no_interpretation' );
			return $out;
		}
		/*
		# currently, error is not stored in DB, only the vote and long / short interpretations
		# todo: is it worth to store it?
		if ( $pollStore->interpResult->error != '' ) {
			return '<strong class="error">' . qp_Setup::specialchars( $pollStore->interpResult->error ) . '</strong>';
		}
		*/
		$out .= '<div class="interp_answer">' . wfMsg( 'qp_results_interpretation_header' ) .
				'<div class="interp_answer_body">' . nl2br( wfMsg( 'qp_results_short_interpretation', qp_Setup::specialChars( $pollStore->interpResult->short ) ) ) . '</div>' .
				'<div class="interp_answer_body">' . nl2br( wfMsg( 'qp_results_long_interpretation', qp_Setup::specialChars( $pollStore->interpResult->long ) ) ) . '</div>' .
				'</div>';
		return $out;
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
		$output .= $this->showAnswerHeader( $pollStore );
		foreach ( $pollStore->Questions as &$qdata ) {
			if ( $pollStore->isUsedQuestion( $qdata->question_id ) ) {
				$output .= "<br />\n<b>" . $qdata->question_id . ".</b> " . qp_Setup::entities( $qdata->CommonQuestion ) . "<br />\n";
				$qview = 
				$output .= $qdata->displayUserQuestionVote();
			}
		}
		return $output;
	}

	private function showVotes( $pid ) {
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
				$output .= $this->qpLink( $this->getTitle(), wfMsg( 'qp_export_to_xls' ), array( "style" => "font-weight:bold;" ), array( 'action' => 'stats_xls', 'id' => $pid ) ) . "<br />\n";
				$output .= $this->qpLink( $this->getTitle(), wfMsg( 'qp_voices_to_xls' ), array( "style" => "font-weight:bold;" ), array( 'action' => 'voices_xls', 'id' => $pid ) ) . "<br />\n";
				foreach ( $pollStore->Questions as &$qdata ) {
					$output .= $qdata->displayQuestionStats( $this, $pid );
				}
			}
		}
		return $output;
	}

	private function voicesToXLS( $pid ) {
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
		$pollStore->loadQuestions();
		try {
			require_once( qp_Setup::$ExtDir . '/Excel/Excel_Writer.php' );
			$xls_fname = tempnam( "", ".xls" );
			$xls_workbook = new Spreadsheet_Excel_Writer_Workbook( $xls_fname );
			$xls_workbook->setVersion( 8 );
			$xls_worksheet = &$xls_workbook->addworksheet();
			$xls_worksheet->setInputEncoding( "utf-8" );
			$xls_worksheet->setPaper( 9 );
			$xls_rownum = 0;
			$format_heading = &$xls_workbook->addformat( array( 'bold' => 1 ) );
			$format_answer = &$xls_workbook->addformat( array( 'fgcolor' => 0x1A, 'border' => 1 ) );
			$format_answer->setAlign( 'left' );
			$format_even = &$xls_workbook->addformat( array( 'fgcolor' => 0x2A, 'border' => 1 ) );
			$format_even->setAlign( 'left' );
			$format_odd = &$xls_workbook->addformat( array( 'fgcolor' => 0x23, 'border' => 1 ) );
			$format_odd->setAlign( 'left' );
			$first_question = true;
			foreach ( $pollStore->Questions as $qkey => &$qdata ) {
				if ( $first_question ) {
					$totalUsersAnsweredQuestion = $pollStore->totalUsersAnsweredQuestion( $qdata );
					$xls_worksheet->write( $xls_rownum, 0, $totalUsersAnsweredQuestion, $format_heading );
					$xls_worksheet->write( $xls_rownum++, 1, wfMsgExt( 'qp_users_answered_questions', array( 'parsemag' ), $totalUsersAnsweredQuestion ), $format_heading );
					$xls_rownum++;
					$first_question = false;
				}
				$xls_worksheet->write( $xls_rownum, 0, $qdata->question_id, $format_heading );
				$xls_worksheet->write( $xls_rownum++, 1, qp_Excel::prepareExcelString( $qdata->CommonQuestion ), $format_heading );
				if ( count( $qdata->CategorySpans ) > 0 ) {
					$row = array();
					foreach ( $qdata->CategorySpans as &$span ) {
						$row[] = qp_Excel::prepareExcelString( $span[ "name" ] );
						for ( $i = 1; $i < $span[ "count" ]; $i++ ) {
							$row[] = "";
						}
					}
					$xls_worksheet->writerow( $xls_rownum++, 0, $row );
				}
				$row = array();
				foreach ( $qdata->Categories as &$categ ) {
					$row[] = qp_Excel::prepareExcelString( $categ[ "name" ] );
				}
				$xls_worksheet->writerow( $xls_rownum++, 0, $row );
/*
				foreach ( $qdata->Percents as $pkey=>&$percent ) {
					$xls_worksheet->writerow( $xls_rownum + $pkey, 0, $percent );
				}
*/
				$voters = array();
				$offset = 0;
				$spansUsed = count( $qdata->CategorySpans ) > 0 || $qdata->type == "multipleChoice";
				# iterate through the voters of the current poll (there might be many)
				while ( ( $limit = count( $voters = $pollStore->pollVotersPager( $offset ) ) ) > 0 ) {
					$uvoices = $pollStore->questionVoicesRange( $qdata->question_id, array_keys( $voters ) );
					# get each of proposal votes for current uid
					foreach ( $uvoices as $uid => &$pvoices ) {
						# output square table of proposal / category answers for each uid in uvoices array
						$voicesTable = array();
						foreach ( $qdata->ProposalText as $propkey => &$proposal_text ) {
							$row = array_fill( 0, count( $qdata->Categories ), '' );
							if ( isset( $pvoices[$propkey] ) ) {
								foreach ( $pvoices[$propkey] as $catkey => $text_answer ) {
									$row[$catkey] = qp_Excel::prepareExcelString( $text_answer );
								}
								if ( $spansUsed ) {
									foreach ( $row as $catkey => &$cell ) {
										$cell = array( 0 => $cell );
										if ( $qdata->type == "multipleChoice" ) {
											$cell[ "format" ] = ( ( $catkey & 1 ) === 0 ) ? $format_even : $format_odd;
										} else {
											$cell[ "format" ] = ( ( $qdata->Categories[ $catkey ][ "spanId" ] & 1 ) === 0 ) ? $format_even : $format_odd;
										}
									}
								}
							}
							$voicesTable[] = $row;
						}
						qp_Excel::writeFormattedTable( $xls_worksheet, $xls_rownum, 0, $voicesTable, $format_answer );
						$row = array();
						foreach ( $qdata->ProposalText as $ptext ) {
							$row[] = qp_Excel::prepareExcelString( $ptext );
						}
						$xls_worksheet->writecol( $xls_rownum, count( $qdata->Categories ), $row );
						$xls_rownum += count( $qdata->ProposalText ) + 1;
					}
					$offset += $limit;
				}
			}
			$xls_workbook->close();
			header( 'Content-Type: application/x-msexcel; name="' . $poll_id . '.xls"' );
			header( 'Content-Disposition: inline; filename="' . $poll_id . '.xls"' );
			$fxls = @fopen( $xls_fname, "rb" );
			@fpassthru( $fxls );
			@unlink( $xls_fname );
			exit();
		} catch ( Exception $e ) {
			die( "Error while exporting poll statistics to Excel table\n" );
		}
	}

	private function statsToXLS( $pid ) {
		if ( $pid === null ) {
			return;
		}
		$pollStore = new qp_PollStore( array( 'from' => 'pid', 'pid' => $pid ) );
		if ( $pollStore->pid === null ) {
			return;
		}
		$poll_id = $pollStore->getPollId();
		$pollStore->loadQuestions();
		$pollStore->loadTotals();
		$pollStore->calculateStatistics();
		try {
			require_once( qp_Setup::$ExtDir . '/Excel/Excel_Writer.php' );
			$xls_fname = tempnam( "", ".xls" );
			$xls_workbook = new Spreadsheet_Excel_Writer_Workbook( $xls_fname );
			$xls_workbook->setVersion( 8 );
			$xls_worksheet = &$xls_workbook->addworksheet();
			$xls_worksheet->setInputEncoding( "utf-8" );
			$xls_worksheet->setPaper( 9 );
			$xls_rownum = 0;
			$percent_num_format = '[Blue]0.0%;[Red]-0.0%;[Black]0%';
			$format_heading = &$xls_workbook->addformat( array( 'bold' => 1 ) );
			$format_percent = &$xls_workbook->addformat( array( 'fgcolor' => 0x1A, 'border' => 1 ) );
			$format_percent->setAlign( 'left' );
			$format_percent->setNumFormat( $percent_num_format );
			$format_even = &$xls_workbook->addformat( array( 'fgcolor' => 0x2A, 'border' => 1 ) );
			$format_even->setAlign( 'left' );
			$format_even->setNumFormat( $percent_num_format );
			$format_odd = &$xls_workbook->addformat( array( 'fgcolor' => 0x23, 'border' => 1 ) );
			$format_odd->setAlign( 'left' );
			$format_odd->setNumFormat( $percent_num_format );
			$first_question = true;
			foreach ( $pollStore->Questions as $qkey => &$qdata ) {
				if ( $first_question ) {
					$totalUsersAnsweredQuestion = $pollStore->totalUsersAnsweredQuestion( $qdata );
					$xls_worksheet->write( $xls_rownum, 0, $totalUsersAnsweredQuestion, $format_heading );
					$xls_worksheet->write( $xls_rownum++, 1, wfMsgExt( 'qp_users_answered_questions', array( 'parsemag' ), $totalUsersAnsweredQuestion ), $format_heading );
					$xls_rownum++;
					$first_question = false;
				}
				$xls_worksheet->write( $xls_rownum, 0, $qdata->question_id, $format_heading );
				$xls_worksheet->write( $xls_rownum++, 1, qp_Excel::prepareExcelString( $qdata->CommonQuestion ), $format_heading );
				if ( count( $qdata->CategorySpans ) > 0 ) {
					$row = array();
					foreach ( $qdata->CategorySpans as &$span ) {
						$row[] = qp_Excel::prepareExcelString( $span[ "name" ] );
						for ( $i = 1; $i < $span[ "count" ]; $i++ ) {
							$row[] = "";
						}
					}
					$xls_worksheet->writerow( $xls_rownum++, 0, $row );
				}
				$row = array();
				foreach ( $qdata->Categories as &$categ ) {
					$row[] = qp_Excel::prepareExcelString( $categ[ "name" ] );
				}
				$xls_worksheet->writerow( $xls_rownum++, 0, $row );
/*
				foreach ( $qdata->Percents as $pkey=>&$percent ) {
					$xls_worksheet->writerow( $xls_rownum + $pkey, 0, $percent );
				}
*/
				$percentsTable = array();
				$spansUsed = count( $qdata->CategorySpans ) > 0 || $qdata->type == "multipleChoice";
				foreach ( $qdata->ProposalText as $propkey => &$proposal_text ) {
					if ( isset( $qdata->Percents[ $propkey ] ) ) {
						$row = $qdata->Percents[ $propkey ];
						foreach ( $row as $catkey => &$cell ) {
							$cell = array( 0 => $cell );
							if ( $spansUsed ) {
								if ( $qdata->type == "multipleChoice" ) {
									$cell[ "format" ] = ( ( $catkey & 1 ) === 0 ) ? $format_even : $format_odd;
								} else {
									$cell[ "format" ] = ( ( $qdata->Categories[ $catkey ][ "spanId" ] & 1 ) === 0 ) ? $format_even : $format_odd;
								}
							}
						}
					} else {
						$row = array_fill( 0, count( $qdata->Categories ), '' );
					}
					$percentsTable[] = $row;
				}
				qp_Excel::writeFormattedTable( $xls_worksheet, $xls_rownum, 0, $percentsTable, $format_percent );
				$row = array();
				foreach ( $qdata->ProposalText as $ptext ) {
					$row[] = qp_Excel::prepareExcelString( $ptext );
				}
				$xls_worksheet->writecol( $xls_rownum, count( $qdata->Categories ), $row );
				$xls_rownum += count( $qdata->ProposalText ) + 1;
			}
			$xls_workbook->close();
			header( 'Content-Type: application/x-msexcel; name="' . $poll_id . '.xls"' );
			header( 'Content-Disposition: inline; filename="' . $poll_id . '.xls"' );
			$fxls = @fopen( $xls_fname, "rb" );
			@fpassthru( $fxls );
			@unlink( $xls_fname );
			exit();
		} catch ( Exception $e ) {
			die( "Error while exporting poll statistics to Excel table\n" );
		}
	}

	static function getUsersLink() {
		return "<div>" . self::$UsersLink . "</div>\n";
	}

	static function getPollsLink() {
		return "<div>" . self::$PollsLink . "</div>\n";
	}

}

/* list of all users */
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

}

/* list of polls in which selected user (did not|participated) */
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

}

/* list of all polls */
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
		$poll_title = Title::makeTitle( $result->ns, $result->title, qp_AbstractPoll::getPollTitleFragment( $result->poll_id, '' ) );
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

}

/* list of users, (not|participated) in particular poll, defined by pid */
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
			$poll_title = Title::makeTitle( intval( $row->ns ), $row->title, qp_AbstractPoll::getPollTitleFragment( $row->poll_id, '' ) );
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

}

/* list of users who voted for particular choice of particular proposal of particular question */
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
				$poll_title = Title::makeTitle( intval( $this->ns ), $this->title, qp_AbstractPoll::getPollTitleFragment( $this->poll_id, '' ) );
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

}

class qp_Excel {

	static function prepareExcelString( $s ) {
		if ( preg_match( '`^=.?`', $s ) ) {
			return "'" . $s;
		}
		return $s;
	}

	static function writeFormattedTable( $worksheet, $rownum, $colnum, &$table, $format = null ) {
		foreach ( $table as $rnum => &$row ) {
			foreach ( $row as $cnum => &$cell ) {
				if ( is_array( $cell ) ) {
					if ( array_key_exists( "format", $cell ) ) {
						$worksheet->write( $rownum + $rnum, $colnum + $cnum, $cell[ 0 ], $cell[ "format" ] );
					} else {
						$worksheet->write( $rownum + $rnum, $colnum + $cnum, $cell[ 0 ], $format );
					}
				} else {
					$worksheet->write( $rownum + $rnum, $colnum + $cnum, $cell, $format );
				}
			}
		}
	}

}
