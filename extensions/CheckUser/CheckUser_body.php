<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "CheckUser extension\n";
	exit( 1 );
}


class CheckUser extends SpecialPage
{
	function CheckUser() {
		global $wgUser;
		if ( $wgUser->isAllowed( 'checkuser' ) || !$wgUser->isAllowed( 'checkuser-log' ) ) {
			SpecialPage::SpecialPage('CheckUser', 'checkuser');
		} else {
			SpecialPage::SpecialPage('CheckUser', 'checkuser-log');
		}
		wfLoadExtensionMessages('CheckUser');
	}

	function execute( $subpage ) {
		global $wgRequest, $wgOut, $wgTitle, $wgUser, $wgContLang;

		$this->setHeaders();
		$this->sk = $wgUser->getSkin();

		// This is horribly shitty.
		// Lacking formal aliases, it's tough to ensure we have compatibility.
		// Links may break, which sucks.
		// Language fallbacks will not always be properly utilized.
		$logMatches = array(
			wfMsgForContent( 'checkuser-log-subpage' ),
			'Log'
		);
		
		foreach( $logMatches as $log ) {
			if ( str_replace( '_', ' ', $wgContLang->lc( $subpage ) )
				== str_replace( '_ ', ' ', $wgContLang->lc( $log ) ) ) {
				if( !$wgUser->isAllowed( 'checkuser-log' ) ) {
					$wgOut->permissionRequired( 'checkuser-log' );
					return;
				}

				$this->showLog();
				return;
			}
		}

		if( !$wgUser->isAllowed( 'checkuser' ) ) {
			if ( $wgUser->isAllowed( 'checkuser-log' ) ) {
				$wgOut->addWikiText( wfMsg( 'checkuser-summary' ) . 
						     "\n\n[[" . $this->getLogSubpageTitle()->getPrefixedText() . '|' . wfMsg( 'checkuser-showlog' ) . ']]'
					);
				return;
			}

			$wgOut->permissionRequired( 'checkuser' );
			return;
		}

		$user = $wgRequest->getText( 'user' ) ? $wgRequest->getText( 'user' ) : $wgRequest->getText( 'ip' );
		$user = trim($user);
		$reason = $wgRequest->getText( 'reason' );
		$checktype = $wgRequest->getVal( 'checktype' );
		$period = $wgRequest->getInt( 'period' );
		$users = $wgRequest->getArray( 'users' );
		$tag = $wgRequest->getBool('usetag') ? trim( $wgRequest->getVal( 'tag' ) ) : "";

		# An IPv4?
		if( preg_match( '#^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}(/\d{1,2}|)$#', $user ) ) {
			$ip = $user; 
			$name = ''; 
			$xff = '';
		# An IPv6?
		} else if( preg_match( '#^[0-9A-Fa-f]{1,4}(:[0-9A-Fa-f]{1,4})+(/\d{1,3}|)$#', $user ) ) {
			$ip = IP::sanitizeIP($user); 
			$name = ''; 
			$xff = '';
		# An IPv4 XFF string?
		} else if( preg_match( '#^(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})(/\d{1,2}|)/xff$#', $user, $matches ) ) {
			list( $junk, $xffip, $xffbit) = $matches;
			$ip = ''; 
			$name = ''; 
			$xff = $xffip . $xffbit;
		# An IPv6 XFF string?
		} else if( preg_match( '#^([0-9A-Fa-f]{1,4}(:[0-9A-Fa-f]{1,4})+)(/\d{1,3}|)/xff$#', $user, $matches ) ) {
			list( $junk, $xffip, $xffbit ) = $matches;
			$ip = ''; 
			$name = ''; 
			$xff = IP::sanitizeIP( $xffip ) . $xffbit;
		# A user?
		} else {
			$ip = ''; 
			$name = $user; 
			$xff = '';
		}

		$this->doForm( $user, $reason, $checktype, $ip, $xff, $name, $period );
		# Perform one of the various submit operations...
		if( $wgRequest->wasPosted() ) {
			if( $wgRequest->getVal('action') === 'block' ) {
				$this->doMassUserBlock( $users, $reason, $tag );
			} else if( $checktype=='subuserips' ) {
				$this->doUserIPsRequest( $name, $reason, $period );
			} else if( $xff && $checktype=='subipedits' ) {
				$this->doIPEditsRequest( $xff, true, $reason, $period );
			} else if( $checktype=='subipedits' ) {
				$this->doIPEditsRequest( $ip, false, $reason, $period );
			} else if( $xff && $checktype=='subipusers' ) {
				$this->doIPUsersRequest( $xff, true, $reason, $period, $tag );
			} else if( $checktype=='subipusers' ) {
				$this->doIPUsersRequest( $ip, false, $reason, $period, $tag );
			} else if( $checktype=='subuseredits' ) {
				$this->doUserEditsRequest( $user, $reason, $period );
			}
		}
	}
	
	/**
	 * As we use the same small set of messages in various methods and that
	 * they are called often, we call them once and save them in $this->message
	 */
	protected function preCacheMessages() {
		// Precache various messages
		if( !isset( $this->message ) ) {
			foreach( explode(' ', 'diff hist minoreditletter newpageletter blocklink log' ) as $msg ) {
				$this->message[$msg] = wfMsgExt( $msg, array( 'escape') );
			}
		}
	}

	public function getLogSubpageTitle() {
		if ( !isset( $this->logSubpageTitle ) ) {
			$this->logSubpageTitle = $this->getTitle( wfMsgForContent( 'checkuser-log-subpage' ) );
		}
		return $this->logSubpageTitle;
	}

	protected function doForm( $user, $reason, $checktype, $ip, $xff, $name, $period ) {
		global $wgOut, $wgTitle;
		$action = $wgTitle->escapeLocalUrl();
		# Fill in requested type if it makes sense
		$encipusers = $encipedits = $encuserips = $encuseredits = 0;
		if( $checktype=='subipusers' && ( $ip || $xff ) )
			$encipusers = 1;
		else if( $checktype=='subipedits' && ( $ip || $xff ) )
			$encipedits = 1;
		else if( $checktype=='subuserips' && $name )
			$encuserips = 1;
		else if( $checktype=='subuseredits' && $name )
			$encuseredits = 1;
		# Defaults otherwise
		else if( $ip || $xff )
			$encipedits = 1;
		else
			$encuserips = 1;
		# Compile our nice form
		# User box length should fit things like "2001:0db8:85a3:08d3:1319:8a2e:0370:7344/100/xff"
		$wgOut->addWikiText( wfMsg( 'checkuser-summary' ) . 
			"\n\n[[" . $this->getLogSubpageTitle()->getPrefixedText() . '|' . wfMsg( 'checkuser-showlog' ) . ']]'
	   	);
		$form = "<form name='checkuserform' id='checkuserform' action=\"$action\" method='post'>";
		$form .= "<fieldset><legend>".wfMsgHtml( "checkuser-query" )."</legend>";
		$form .= "<table border='0' cellpadding='2'><tr>";
		$form .= "<td>".wfMsgHtml( "checkuser-target" ).":</td>";
		$form .= "<td>".Xml::input( 'user', 46, $user, array( 'id' => 'checktarget' ) );
		$form .= "&nbsp;".$this->getPeriodMenu( $period ) . "</td>";
		$form .= "</tr><tr>";
		$form .= "<td></td><td class='checkuserradios'><table border='0' cellpadding='3'><tr>";
		$form .= "<td>".Xml::radio( 'checktype', 'subuserips', $encuserips, array('id' => 'subuserips') );
		$form .= " ".Xml::label( wfMsgHtml("checkuser-ips"), 'subuserips' )."</td>";
		$form .= "<td>".Xml::radio( 'checktype', 'subipedits', $encipedits, array('id' => 'subipedits') );
		$form .= " ".Xml::label( wfMsgHtml("checkuser-edits"), 'subipedits' )."</td>";
		$form .= "<td>".Xml::radio( 'checktype', 'subipusers', $encipusers, array('id' => 'subipusers') );
		$form .= " ".Xml::label( wfMsgHtml("checkuser-users"), 'subipusers' )."</td>";
		$form .= "<td>".Xml::radio( 'checktype', 'subuseredits', $encuseredits, array('id' => 'subuseredits') );
		$form .= " ".Xml::label( wfMsgHtml("checkuser-account"), 'subuseredits' )."</td>";
		$form .= "</tr></table></td>";
		$form .= "</tr><tr>";
		$form .= "<td>".wfMsgHtml( "checkuser-reason" )."</td>";
		$form .= "<td>".Xml::input( 'reason', 46, $reason, array( 'maxlength' => '150', 'id' => 'checkreason' ) );
		$form .= "&nbsp; &nbsp;".Xml::submitButton( wfMsgHtml('checkuser-check'), 
			array('id' => 'checkusersubmit','name' => 'checkusersubmit') )."</td>";
		$form .= "</tr></table></fieldset></form>";
		# Output form
		$wgOut->addHTML( $form );
	}
	
   	/**
	* Get a selector of time period options
	* @param int $selected, selected level
	*/
	protected function getPeriodMenu( $selected=null ) {
		$s = "<label for='period'>" . wfMsgHtml('checkuser-period') . "</label>&nbsp;";
		$s .= Xml::openElement( 'select', array('name' => 'period','id' => 'period','style' => 'margin-top:.2em;') );
		$s .= Xml::option( wfMsg( "checkuser-week-1" ), 7, $selected===7 );
		$s .= Xml::option( wfMsg( "checkuser-week-2" ), 14, $selected===14 );
		$s .= Xml::option( wfMsg( "checkuser-month" ), 31, $selected===31 );
		$s .= Xml::option( wfMsg( "checkuser-all" ), 0, $selected===0 );
		$s .= Xml::closeElement('select')."\n";
		return $s;
	}
	
   	/**
	* Block a list of selected users
	* @param array $users
	* @param string $reason
	* @param string $tag
	*/
	protected function doMassUserBlock( $users, $reason = '', $tag = '' ) {
		global $wgOut, $wgUser, $wgCheckUserMaxBlocks;
		if( empty($users) || $wgUser->isBlocked(false) ) {
			$wgOut->addWikiText( wfMsgExt('checkuser-block-failure',array('parsemag')) );
			return;
		}
		$counter = $blockSize = 0;
		$safeUsers = array();
		$log = new LogPage( 'block' );
		foreach( $users as $name ) {
			# Enforce limits
			$counter++;
			$blockSize++;
			if( $counter > $wgCheckUserMaxBlocks ) {
				break;
			}
			# Lets not go *too* fast
			if( $blockSize >= 20 ) {
				$blockSize = 0;
				wfWaitForSlaves( 5 );
			}
			$u = User::newFromName( $name, false );
			// If user doesn't exist, it ought to be an IP then
			if( is_null($u) || (!$u->getId() && !IP::isIPAddress( $u->getName() )) ) {
				continue;
			}
			$usertitle = Title::makeTitle( NS_USER, $u->getName() );
			$userpage = new Article( $usertitle );
			$safeUsers[] = '[[' . $usertitle->getPrefixedText() . '|' . $usertitle->getText() . ']]';
			$expirestr = $u->getId() ? 'infinity' : '1 week';
			$anonOnly = IP::isIPAddress( $u->getName() ) ? 1 : 0;
			// Create the block
			$block = new Block( $u->getName(), // victim
				$u->getId(), // uid
				$wgUser->getId(), // blocker
				$reason, // comment
				wfTimestampNow(), // block time
				0, // auto ?
				strtotime( $expirestr ), // duration
				$anonOnly, // anononly?
				1, // block account creation?
				1, // autoblocking?
				0, // suppress name?
				0 // block from sending email?
			);
			// Kill old blocks, but leave range blocks
			$oldblock = Block::newFromDB( $u->getName() );
			if( $oldblock && $oldblock->mAddress == $u->getName() && $block->mRangeStart == $block->mRangeEnd ) {
				$oldblock->delete();
			}
			$block->insert();
			# Prepare log parameters
			$logParams = array();
			$logParams[] = $expirestr;
			if( $anonOnly ) {
				$logParams[] = 'anononly';
			}
			$logParams[] = 'nocreate';
			# Add log entry
			$log->addEntry( 'block', $usertitle, $reason, $logParams );
			# Tag userpage! (check length to avoid mistakes)
			if( strlen($tag) > 2 ) {
				$userpage->doEdit( $tag, $reason, EDIT_MINOR );
			}
		}
		if( !empty($safeUsers) ) {
			$n = count($safeUsers);
			$ulist = implode(', ',$safeUsers);
			$wgOut->addWikiText( wfMsgExt('checkuser-block-success',array('parsemag'),$ulist,$n) );
		} else {
			$wgOut->addWikiText( wfMsgExt('checkuser-block-failure',array('parsemag')) );
		}
	}

	/**
	 * @param string $ip
	 * @param bool $xfor
	 * @param string $reason
	 * Shows all edits in Recent Changes by this IP (or range) and who made them
	 */
	protected function doIPEditsRequest( $ip, $xfor = false, $reason = '', $period = 0 ) {
		global $wgUser, $wgOut, $wgLang, $wgTitle;
		$fname = 'CheckUser::doIPEditsRequest';
		# Invalid IPs are passed in as a blank string
		if(!$ip) {
			$s = wfMsgHtml('badipaddress');
			$wgOut->addHTML( $s );
			return;
		}

		$logType = 'ipedits';
		if( $xfor ) {
			$logType .= '-xff';
		}
		# Record check...
		if( !$this->addLogEntry( $logType, 'ip', $ip, $reason ) ) {
			$wgOut->addHTML( '<p>'.wfMsgHtml('checkuser-log-fail').'</p>' );
		}

		$dbr = wfGetDB( DB_SLAVE );
		$ip_conds = $dbr->makeList( $this->getIpConds( $dbr, $ip, $xfor ), LIST_AND );
		$time_conds = $this->getTimeConds( $period );
		$cu_changes = $dbr->tableName( 'cu_changes' );
		# Ordered in descent by timestamp. Can cause large filesorts on range scans.
		# Check how many rows will need sorting ahead of time to see if this is too big.
		# Also, if we only show 5000, too many will be ignored as well.
		$index = $xfor ? 'cuc_xff_hex_time' : 'cuc_ip_hex_time';
		if( strpos($ip,'/') !==false ) {
			# Quick index check only OK if no time constraint
			if( $period ) {
				$rangecount = $dbr->selectField( 'cu_changes', 'COUNT(*)',
					array( $ip_conds, $time_conds ),
					__METHOD__,
					array( 'USE INDEX' => $index ) );
			} else {
				$rangecount = $dbr->estimateRowCount( 'cu_changes', '*',
					array( $ip_conds ),
					__METHOD__,
					array( 'USE INDEX' => $index ) );
			}
		}
		# See what is best to do after testing the waters...
		if( isset($rangecount) && $rangecount > 5000 ) {
		 	$use_index = $dbr->useIndexClause( $index );
			$sql = "SELECT cuc_ip_hex, COUNT(*) AS count,
				MIN(cuc_timestamp) AS first, MAX(cuc_timestamp) AS last 
				FROM $cu_changes $use_index
				WHERE $ip_conds AND $time_conds  
				GROUP BY cuc_ip_hex ORDER BY cuc_ip_hex LIMIT 5000";
			$ret = $dbr->query( $sql, __METHOD__ );
			# List out each IP that has edits
			$s = '<h5>' . wfMsg('checkuser-too-many') . '</h5>';
			$s .= '<ol>';
			while( $row = $ret->fetchObject() ) {
				# Convert the IP hexes into normal form
				if( strpos($row->cuc_ip_hex,'v6-') !==false ) {
					$ip = substr( $row->cuc_ip_hex, 3 );
					$ip = IP::HextoOctet( $ip );
				} else {
					$ip = long2ip( wfBaseConvert($row->cuc_ip_hex, 16, 10, 8) );
				}
				$s .= '<li><a href="'.
					$wgTitle->escapeLocalURL( 'user='.urlencode($ip).'&reason='.urlencode($reason).'&checktype=subipusers' ) .
					'">'.$ip.'</a>';
				if( $row->first == $row->last ) {
					$s .= ' (' . $wgLang->timeanddate( $row->first, true ) . ') ';
				} else {
					$s .= ' (' . $wgLang->timeanddate( $row->first, true ) .
					' -- ' . $wgLang->timeanddate( $row->last, true ) . ') ';
				}
				$s .= " [<strong>" . $row->count . "</strong>]</li>\n";
			}
			$s .= '</ol>';
			$dbr->freeResult( $ret );
			
			$wgOut->addHTML( $s );
			return;
		} else if( isset($rangecount) && !$rangecount ) {
			$s = wfMsgHtml("checkuser-nomatch")."\n";
			$wgOut->addHTML( $s );
			
			return;
		} 
		# OK, do the real query...
		$use_index = $dbr->useIndexClause( $index );
		$sql = "SELECT cuc_namespace,cuc_title,cuc_user,cuc_user_text,cuc_comment,cuc_actiontext,
			cuc_timestamp,cuc_minor,cuc_page_id,cuc_type,cuc_this_oldid,cuc_last_oldid,cuc_ip,cuc_xff,cuc_agent 
			FROM $cu_changes $use_index WHERE $ip_conds AND $time_conds ORDER BY cuc_timestamp DESC LIMIT 5000";
		$ret = $dbr->query( $sql, __METHOD__ );

		if( !$dbr->numRows( $ret ) ) {
			$s = wfMsgHtml("checkuser-nomatch")."\n";
		} else {
			# Cache common messages
			$this->preCacheMessages();
			# Try to optimize this query
			$lb = new LinkBatch;
			while( $row = $ret->fetchObject() ) {
				$userText = str_replace( ' ', '_', $row->cuc_user_text );
				$lb->add( $row->cuc_namespace, $row->cuc_title );
				$lb->add( NS_USER, $userText );
				$lb->add( NS_USER_TALK, $userText );
			}
			$lb->execute();
			$ret->seek( 0 );
			# List out the edits
			$s = '';
			while( $row = $ret->fetchObject() ) {
				$s .= $this->CUChangesLine( $row, $reason );
			}
			$s .= '</ul>';
			$dbr->freeResult( $ret );
		}

		$wgOut->addHTML( $s );
	}
	
	/**
	 * @param string $nuser
	 * @param string $reason
	 * Shows all edits in Recent Changes by this user
	 */
	protected function doUserEditsRequest( $user, $reason = '', $period = 0 ) {
		global $wgUser, $wgOut, $wgLang, $wgTitle;
		$fname = 'CheckUser::doUserEditsRequest';

		$userTitle = Title::newFromText( $user, NS_USER );
		if( !is_null( $userTitle ) ) {
			// normalize the username
			$user = $userTitle->getText();
		}
		# IPs are passed in as a blank string
		if( !$user ) {
			$s = wfMsgHtml('nouserspecified');
			$wgOut->addHTML( $s );
			return;
		}
		# Get ID, works better than text as user may have been renamed
		$user_id = User::idFromName($user);

		# If user is not IP or nonexistant
		if( !$user_id ) {
			$s = wfMsgExt('nosuchusershort',array('parseinline'),$user);
			$wgOut->addHTML( $s );
			return;
		}

		# Record check...
		if( !$this->addLogEntry( 'useredits', 'user', $user, $reason, $user_id ) ) {
			$wgOut->addHTML( '<p>'.wfMsgHtml('checkuser-log-fail').'</p>' );
		}

		$dbr = wfGetDB( DB_SLAVE );
		$user_cond = "cuc_user = '$user_id'";
		$time_conds = $this->getTimeConds( $period );
		$cu_changes = $dbr->tableName( 'cu_changes' );
		# Ordered in descent by timestamp. Causes large filesorts if there are many edits.
		# Check how many rows will need sorting ahead of time to see if this is too big.
		# If it is, sort by IP,time to avoid the filesort.
		$count = $dbr->estimateRowCount( 'cu_changes', '*',
			array( $user_cond, $time_conds ),
			__METHOD__,
			array( 'USE INDEX' => 'cuc_user_ip_time' ) );
		# Cache common messages
		$this->preCacheMessages();
		# See what is best to do after testing the waters...
		if( $count > 3000 ) {
		 	$use_index = $dbr->useIndexClause( 'cuc_user_ip_time' );
			$sql = "SELECT * FROM $cu_changes $use_index
				WHERE $user_cond AND $time_conds  
				ORDER BY cuc_ip ASC, cuc_timestamp DESC LIMIT 5000";
			$ret = $dbr->query( $sql, __METHOD__ );
			# Try to optimize this query
			$lb = new LinkBatch;
			while( $row = $ret->fetchObject() ) {
				$lb->add( $row->cuc_namespace, $row->cuc_title );
			}
			$lb->execute();
			$ret->seek( 0 );
			$s = '';
			while( $row = $ret->fetchObject() ) {
				if( !$ip = htmlspecialchars($row->cuc_ip) ) {
					continue;
				}
				if( !isset($lastIP) ) {
					$lastIP = $row->cuc_ip;
					$s .= "\n<h2>$ip</h2>\n<div class=\"special\">";
				} else if( $lastIP != $row->cuc_ip ) {
					$s .= "</ul></div>\n<h2>$ip</h2>\n<div class=\"special\">";
					$lastIP = $row->cuc_ip;
					unset($this->lastdate); // start over
				}
				$s .= $this->CUChangesLine( $row, $reason );
			}
			$s .= '</ul></div>';
			$dbr->freeResult( $ret );

			$wgOut->addHTML( $s );
			return;
		}
		# OK, do the real query...
		$use_index = $dbr->useIndexClause( 'cuc_user_ip_time' );
		$sql = "SELECT * FROM $cu_changes $use_index 
			WHERE $user_cond AND $time_conds ORDER BY cuc_timestamp DESC LIMIT 5000";
		$ret = $dbr->query( $sql, __METHOD__ );

		if( !$dbr->numRows( $ret ) ) {
			$s = wfMsgHtml("checkuser-nomatch")."\n";
		} else {
			# Try to optimize this query
			$lb = new LinkBatch;
			while( $row = $ret->fetchObject() ) {
				$lb->add( $row->cuc_namespace, $row->cuc_title );
			}
			$lb->execute();
			$ret->seek( 0 );
			# List out the edits
			$s = '';
			while( $row = $ret->fetchObject() ) {
				$s .= $this->CUChangesLine( $row, $reason );
			}
			$s .= '</ul>';
			$dbr->freeResult( $ret );
		}

		$wgOut->addHTML( $s );
	}

	/**
	 * @param $row
	 * @return a streamlined recent changes line with IP data
	 */
	protected function CUChangesLine( $row, $reason ) {
		global $wgLang;
		# Add date headers
		$date = $wgLang->date( $row->cuc_timestamp, true, true );
		if( !isset($this->lastdate) ) {
			$this->lastdate = $date;
			$line = "\n<h4>$date</h4>\n<ul class=\"special\">";
		} else if( $date != $this->lastdate ) {
			$line = "</ul>\n<h4>$date</h4>\n<ul class=\"special\">";
			$this->lastdate = $date;
		} else {
			$line = '';
		}	
		$line .= "<li>";
		# Create diff/hist/page links
		$line .= $this->getLinksFromRow( $row );
		# Show date
		$line .= ' . . ' . $wgLang->time( $row->cuc_timestamp, true, true ) . ' . . ';
		# Userlinks
		$line .= $this->sk->userLink( $row->cuc_user, $row->cuc_user_text );
		$line .= $this->sk->userToolLinks( $row->cuc_user, $row->cuc_user_text );
		# Action text, hackish ...
		if( $row->cuc_actiontext )
			$line .= ' ' . $this->sk->formatComment( $row->cuc_actiontext ) . ' ';
		# Comment
		$line .= $this->sk->commentBlock( $row->cuc_comment );
		
		$cuTitle = SpecialPage::getTitleFor( 'CheckUser' );
		$line .= '<br />&nbsp; &nbsp; &nbsp; &nbsp; <small>';
		# IP
		$line .= ' <strong>IP</strong>: '.$this->sk->makeKnownLinkObj( $cuTitle,
			htmlspecialchars( $row->cuc_ip ),
			"user=".urlencode( $row->cuc_ip ).'&reason='.urlencode($reason) );
		# XFF
		if( $row->cuc_xff !=null ) {
			# Flag our trusted proxies
			list($client,$trusted) = efGetClientIPfromXFF($row->cuc_xff,$row->cuc_ip);
			$c = $trusted ? '#F0FFF0' : '#FFFFCC';
			$line .= '&nbsp;&nbsp;&nbsp;<span class="mw-checkuser-xff" style="background-color: '.$c.'">'.
				'<strong>XFF</strong>: ';
			$line .= $this->sk->makeKnownLinkObj( $cuTitle,
				htmlspecialchars( $row->cuc_xff ),
				"user=".urlencode($client)."/xff&reason=".urlencode($reason) )."</span>";
		}
		# User agent
		$line .= '&nbsp;&nbsp;&nbsp;<span class="mw-checkuser-agent" style="color:#888;">' . 
			htmlspecialchars( $row->cuc_agent )."</span>";
		
		$line .= "</small></li>\n";

		return $line;
	}

	/**
	 * @param $row
	 * @create diff/hist/page link
	 */
	protected function getLinksFromRow( $row ) {
		// Log items (old format) and events to logs
		if( $row->cuc_type == RC_LOG && $row->cuc_namespace == NS_SPECIAL ) {
			list( $specialName, $logtype ) = SpecialPage::resolveAliasWithSubpage( $row->cuc_title );
			$logname = LogPage::logName( $logtype );
			$title = Title::makeTitle( $row->cuc_namespace, $row->cuc_title );
			$links = '(' . $this->sk->makeKnownLinkObj( $title, $logname ) . ')';
		// Log items
		} elseif( $row->cuc_type == RC_LOG ) {
			$title = Title::makeTitle( $row->cuc_namespace, $row->cuc_title );
			$links = '(' . $this->sk->makeKnownLinkObj( SpecialPage::getTitleFor( 'Log' ), $this->message['log'],
				wfArrayToCGI( array('page' => $title->getPrefixedText() ) ) ) . ')';
		} else {
			$title = Title::makeTitle( $row->cuc_namespace, $row->cuc_title );
			# New pages
			if( $row->cuc_type == RC_NEW ) {
				$links = '(' . $this->message['diff'] . ') ';
			} else {
				# Diff link
				$links = ' (' . $this->sk->makeKnownLinkObj( $title, $this->message['diff'],
					wfArrayToCGI( array(
						'curid' => $row->cuc_page_id,
						'diff' => $row->cuc_this_oldid,
						'oldid' => $row->cuc_last_oldid ) ) ) . ') ';
			}
			# History link
			$links .= ' (' . $this->sk->makeKnownLinkObj( $title, $this->message['hist'],
				wfArrayToCGI( array(
					'curid' => $row->cuc_page_id,
					'action' => 'history' ) ) ) . ') . . ';
			# Some basic flags
			if( $row->cuc_type == RC_NEW )
				$links .= '<span class="newpage">' . $this->message['newpageletter'] . '</span>';
			if( $row->cuc_minor )
				$links .= '<span class="minor">' . $this->message['minoreditletter'] . '</span>';
			# Page link
			$links .= ' ' . $this->sk->makeLinkObj( $title );
		}
		return $links;
	}

	/**
	 * @param string $ip
	 * @param bool $xfor
	 * @param string $reason
	 * Lists all users in recent changes who used an IP, newest to oldest down
	 * Outputs usernames, latest and earliest found edit date, and count
	 * List unique IPs used for each user in time order, list corresponding user agent
	 */
	protected function doIPUsersRequest( $ip, $xfor = false, $reason = '', $period = 0, $tag = '' ) {
		global $wgUser, $wgOut, $wgLang, $wgTitle;
		$fname = 'CheckUser::doIPUsersRequest';

		# Invalid IPs are passed in as a blank string
		if( !$ip ) {
			$s = wfMsgHtml('badipaddress');
			$wgOut->addHTML( $s );
			return;
		}

		$logType = 'ipusers';
		if( $xfor ) {
			$logType .= '-xff';
		}
		# Log the check...
		if( !$this->addLogEntry( $logType, 'ip', $ip, $reason ) ) {
			$wgOut->addHTML( '<p>'.wfMsgHtml('checkuser-log-fail').'</p>' );
		}

		$dbr = wfGetDB( DB_SLAVE );
		$ip_conds = $dbr->makeList( $this->getIpConds( $dbr, $ip, $xfor ), LIST_AND );
		$time_conds = $this->getTimeConds( $period );
		$cu_changes = $dbr->tableName( 'cu_changes' );
		$index = $xfor ? 'cuc_xff_hex_time' : 'cuc_ip_hex_time';
		# Ordered in descent by timestamp. Can cause large filesorts on range scans.
		# Check how many rows will need sorting ahead of time to see if this is too big.
		if( strpos($ip,'/') !==false ) {
			# Quick index check only OK if no time constraint
			if( $period ) {
				$rangecount = $dbr->selectField( 'cu_changes', 'COUNT(*)',
					array( $ip_conds, $time_conds ),
					__METHOD__,
					array( 'USE INDEX' => $index ) );
			} else {
				$rangecount = $dbr->estimateRowCount( 'cu_changes', '*',
					array( $ip_conds ),
					__METHOD__,
					array( 'USE INDEX' => $index ) );
			}
		}
		// Are there too many edits?
		if( isset($rangecount) && $rangecount > 5000 ) {
			$use_index = $dbr->useIndexClause( $index );
			$sql = "SELECT cuc_ip_hex, COUNT(*) AS count,
				MIN(cuc_timestamp) AS first, MAX(cuc_timestamp) AS last 
				FROM $cu_changes $use_index WHERE $ip_conds AND $time_conds  
				GROUP BY cuc_ip_hex ORDER BY cuc_ip_hex LIMIT 5000";
			$ret = $dbr->query( $sql, __METHOD__ );
			# List out each IP that has edits
			$s = '<h5>' . wfMsg('checkuser-too-many') . '</h5>';
			$s .= '<ol>';
			while( $row = $ret->fetchObject() ) {
				# Convert the IP hexes into normal form
				if( strpos($row->cuc_ip_hex,'v6-') !==false ) {
					$ip = substr( $row->cuc_ip_hex, 3 );
					$ip = IP::HextoOctet( $ip );
				} else {
					$ip = long2ip( wfBaseConvert($row->cuc_ip_hex, 16, 10, 8) );
				}
				$s .= '<li><a href="'.
					$wgTitle->escapeLocalURL( 'user='.urlencode($ip).'&reason='.urlencode($reason).'&checktype=subipusers' ) .
					'">'.$ip.'</a>';
				if( $row->first == $row->last ) {
					$s .= ' (' . $wgLang->timeanddate( $row->first, true ) . ') ';
				} else {
					$s .= ' (' . $wgLang->timeanddate( $row->first, true ) .
					' -- ' . $wgLang->timeanddate( $row->last, true ) . ') ';
				}
				$s .= " [<strong>" . $row->count . "</strong>]</li>\n";
			}
			$s .= '</ol>';
			$dbr->freeResult( $ret );
			
			$wgOut->addHTML( $s );
			return;
		} else if( isset($rangecount) && !$rangecount ) {
			$s = wfMsgHtml("checkuser-nomatch")."\n";
			$wgOut->addHTML( $s );
			return;
		}

		global $wgMemc;
		# OK, do the real query...
		$use_index = $dbr->useIndexClause( $index );
		$sql = "SELECT cuc_user_text, cuc_timestamp, cuc_user, cuc_ip, cuc_agent, cuc_xff 
			FROM $cu_changes $use_index WHERE $ip_conds AND $time_conds 
			ORDER BY cuc_timestamp DESC LIMIT 5000";
		$ret = $dbr->query( $sql, __METHOD__ );

		$users_first = $users_last = $users_edits = $users_ids = array();
		if( !$dbr->numRows( $ret ) ) {
			$s = wfMsgHtml( "checkuser-nomatch" )."\n";
		} else {
			while( ($row = $dbr->fetchObject($ret) ) != false ) {
				if( !array_key_exists( $row->cuc_user_text, $users_edits ) ) {
					$users_last[$row->cuc_user_text] = $row->cuc_timestamp;
					$users_edits[$row->cuc_user_text] = 0;
					$users_ids[$row->cuc_user_text] = $row->cuc_user;
					$users_infosets[$row->cuc_user_text] = array();
					$users_agentsets[$row->cuc_user_text] = array();
				}
				$users_edits[$row->cuc_user_text] += 1;
				$users_first[$row->cuc_user_text] = $row->cuc_timestamp;
				# Treat blank or NULL xffs as empty strings
				$xff = empty($row->cuc_xff) ? null : $row->cuc_xff;
				$xff_ip_combo = array( $row->cuc_ip, $xff );
				# Add this IP/XFF combo for this username if it's not already there
				if( !in_array($xff_ip_combo,$users_infosets[$row->cuc_user_text]) ) {
					$users_infosets[$row->cuc_user_text][] = $xff_ip_combo;
				}
				# Add this agent string if it's not already there; 10 max.
				if( count($users_agentsets[$row->cuc_user_text]) < 10 ) {
					if( !in_array($row->cuc_agent,$users_agentsets[$row->cuc_user_text]) ) {
						$users_agentsets[$row->cuc_user_text][] = $row->cuc_agent;
					}
				}
			}
			$dbr->freeResult( $ret );

			$logs = SpecialPage::getTitleFor( 'Log' );
			$blocklist = SpecialPage::getTitleFor( 'Ipblocklist' );
			
			$action = $wgTitle->escapeLocalUrl( 'action=block' );
			$s = "<form name='checkuserblock' id='checkuserblock' action=\"$action\" method='post'>";
			$s .= '<ul>';
			foreach( $users_edits as $name => $count ) {
				$s .= '<li>';
				$s .= Xml::check( 'users[]', false, array( 'value' => $name ) ) . '&nbsp;';
				$s .= $this->sk->userLink( -1 , $name ) . $this->sk->userToolLinks( -1 , $name );
				$s .= ' (<a href="' . $wgTitle->escapeLocalURL( 'user='.urlencode($name) .
					'&reason='.urlencode($reason) ) . '">' . wfMsgHtml('checkuser-check') . '</a>)';
				if( $users_first[$name] == $users_last[$name] ) {
					$s .= ' (' . $wgLang->timeanddate( $users_first[$name], true ) . ') ';
				} else {
					$s .= ' (' . $wgLang->timeanddate( $users_first[$name], true ) .
					' -- ' . $wgLang->timeanddate( $users_last[$name], true ) . ') ';
				}
				$s .= ' [<strong>' . $count . '</strong>]<br />';
				$flags = array();
				# Check if this user or IP is blocked. If so, give a link to the block log...
				$block = new Block();
				$block->fromMaster( false ); // use slaves
				$ip = IP::isIPAddress( $name ) ? // If an account, get last IP
					$name : $users_infosets[$name][count($users_infosets[$name])-1][0];
				if( $block->load( $ip, $users_ids[$name] ) ) {
					if( IP::isIPAddress($block->mAddress) && strpos($block->mAddress,'/') ) {
						$userpage = Title::makeTitle( NS_USER, $block->mAddress );
						$blocklog = $this->sk->makeKnownLinkObj( $logs, wfMsgHtml('checkuser-blocked'), 
							'type=block&page=' . urlencode( $userpage->getPrefixedText() ) );
						$flags[] = '<strong>(' . $blocklog . ' - ' . $block->mAddress . ')</strong>';
					} else if( $block->mAuto ) {
						$blocklog = $this->sk->makeKnownLinkObj( $blocklist, 
							wfMsgHtml('checkuser-blocked'), 'ip=' . urlencode( "#$block->mId" ) );
						$flags[] = '<strong>(' . $blocklog . ')</strong>';
					} else {
						$userpage = Title::makeTitle( NS_USER, $name );
						$blocklog = $this->sk->makeKnownLinkObj( $logs, wfMsgHtml('checkuser-blocked'), 
							'type=block&page=' . urlencode( $userpage->getPrefixedText() ) );
						$flags[] = '<strong>(' . $blocklog . ')</strong>';
					}
				} else if( self::userWasBlocked( $name ) ) {
					$userpage = Title::makeTitle( NS_USER, $name );
					$blocklog = $this->sk->makeKnownLinkObj( $logs, wfMsgHtml('checkuser-wasblocked'), 
						'type=block&page=' . urlencode( $userpage->getPrefixedText() ) );
					$flags[] = '<strong>(' . $blocklog . ')</strong>';
				}
				# Check how many accounts the user made recently?
				if( $ip ) {
					$key = wfMemcKey( 'acctcreate', 'ip', $ip );
					$count = intval( $wgMemc->get( $key ) );
					if( $count ) {
						$flags[] = '<strong>[' . wfMsgExt('checkuser-accounts',array('parsemag'),$count) . ']</strong>';
					}
				}
				# Check for extra user rights...
				if( $users_ids[$name] ) {
					$user = User::newFromId( $users_ids[$name] );
					$list = array();
					foreach( $user->getGroups() as $group ) {
						$list[] = self::buildGroupLink( $group );
					}
					$groups = implode( ', ', $list );
					if( $groups ) {
						$flags[] = '<i>(' . $groups . ')</i>';
					}
				}
				$s .= implode(' ',$flags);
				$s .= '<ol>';
				# List out each IP/XFF combo for this username
				for( $i = (count($users_infosets[$name]) - 1); $i >= 0; $i-- ) {
					$set = $users_infosets[$name][$i];
					# IP link
					$s .= '<li>';
					$s .= '<a href="'.$wgTitle->escapeLocalURL( 'user='.urlencode($set[0]) ).'">'.htmlspecialchars($set[0]).'</a>';
					# XFF string, link to /xff search
					if( $set[1] ) {
						# Flag our trusted proxies
						list($client,$trusted) = efGetClientIPfromXFF($set[1],$set[0]);
						$c = $trusted ? '#F0FFF0' : '#FFFFCC';
						$s .= '&nbsp;&nbsp;&nbsp;<span style="background-color: '.$c.'"><strong>XFF</strong>: ';
						$s .= $this->sk->makeKnownLinkObj( $wgTitle,
							htmlspecialchars( $set[1] ),
							"user=" . urlencode( $client ) . "/xff" )."</span>";
					}
					$s .= "</li>\n";
				}
				$s .= '</ol><br /><ol>';
				# List out each agent for this username
				for( $i = (count($users_agentsets[$name]) - 1); $i >= 0; $i-- ) {
					$agent = $users_agentsets[$name][$i];
					$s .= "<li><i>" . htmlspecialchars($agent) . "</i></li>\n";
				}
				$s .= '</ol>';
				$s .= '</li>';
			}
			$s .= "</ul>\n";
			if( $wgUser->isAllowed('block') && !$wgUser->isBlocked() ) {
				$s.= "<fieldset>\n";
				$s .= "<legend>" . wfMsgHtml('checkuser-massblock') . "</legend>\n";
				$s .= "<p>" . wfMsgExt('checkuser-massblock-text',array('parseinline')) . "</p>\n";
				$s .= "<p>" . Xml::checkLabel( wfMsgHtml( "checkuser-blocktag" ), 'usetag', 'usetag') . '&nbsp;';
				$s .= Xml::input( 'tag', 46, $tag, array( 'maxlength' => '150', 'id' => 'blocktag' ) ) . "</p>\n";
				$s .= "<p>" . wfMsgHtml( "checkuser-reason" ) . '&nbsp;';
				$s .= Xml::input( 'reason', 46, $reason, array( 'maxlength' => '150', 'id' => 'blockreason' ) );
				$s .= '&nbsp;' . Xml::submitButton( wfMsgHtml('checkuser-massblock-commit'), 
					array('id' => 'checkuserblocksubmit','name' => 'checkuserblock') ) . "</p>\n";
				$s .= "</fieldset>\n";
			}
			$s .= '</form>';
		}

		$wgOut->addHTML( $s );
	}
	
	protected static function userWasBlocked( $name ) {
		$userpage = Title::makeTitle( NS_USER, $name );
		return wfGetDB( DB_SLAVE )->selectField( 'logging', '1', 
			array( 'log_type' => 'block',
				'log_action' => 'block',
				'log_namespace' => $userpage->getNamespace(),
				'log_title' => $userpage->getDBKey() ), 
			__METHOD__,
			array( 'USE INDEX' => 'page_time' ) );
	}
	
	/**
	 * Format a link to a group description page
	 *
	 * @param string $group
	 * @return string
	 */
	protected static function buildGroupLink( $group ) {
		static $cache = array();
		if( !isset( $cache[$group] ) )
			$cache[$group] = User::makeGroupLinkHtml( $group, User::getGroupMember( $group ) );
		return $cache[$group];
	}

	/**
	 * @param Database $db
	 * @param string $ip
	 * @param string $xfor
	 * @return array conditions
	 */
	protected function getIpConds( $db, $ip, $xfor = false ) {
		$type = ( $xfor ) ? 'xff' : 'ip';
		// IPv4 CIDR, 16-32 bits
		if( preg_match( '#^(\d+\.\d+\.\d+\.\d+)/(\d+)$#', $ip, $matches ) ) {
			if( $matches[2] < 16 || $matches[2] > 32 )
				return array( 'cuc_'.$type.'_hex' => -1 );
			list( $start, $end ) = IP::parseRange( $ip );
			return array( 'cuc_'.$type.'_hex BETWEEN ' . $db->addQuotes( $start ) . ' AND ' . $db->addQuotes( $end ) );
		} else if( preg_match( '#^\w{1,4}:\w{1,4}:\w{1,4}:\w{1,4}:\w{1,4}:\w{1,4}:\w{1,4}:\w{1,4}/(\d+)$#', $ip, $matches ) ) {
			// IPv6 CIDR, 64-128 bits
			if( $matches[1] < 64 || $matches[1] > 128 )
				return array( 'cuc_'.$type.'_hex' => -1 );
			list( $start, $end ) = IP::parseRange6( $ip );
			return array( 'cuc_'.$type.'_hex BETWEEN ' . $db->addQuotes( $start ) . ' AND ' . $db->addQuotes( $end ) );
		} else if( preg_match( '#^(\d+)\.(\d+)\.(\d+)\.(\d+)$#', $ip ) ) {
			// 32 bit IPv4
			$ip_hex = IP::toHex( $ip );
			return array( 'cuc_'.$type.'_hex' => $ip_hex );
		} else if( preg_match( '#^\w{1,4}:\w{1,4}:\w{1,4}:\w{1,4}:\w{1,4}:\w{1,4}:\w{1,4}:\w{1,4}$#', $ip ) ) {
			// 128 bit IPv6
			$ip_hex = IP::toHex( $ip );
			return array( 'cuc_'.$type.'_hex' => $ip_hex );
		} else {
			// throw away this query, incomplete IP, these don't get through the entry point anyway
			return array( 'cuc_'.$type.'_hex' => -1 );
		}
	}
	
	protected function getTimeConds( $period ) {
		if( !$period ) {
			return "1 = 1";
		}
		$dbr = wfGetDB( DB_SLAVE );
		$cutoff_unixtime = time() - ($period * 24 * 3600);
		$cutoff_unixtime = $cutoff_unixtime - ($cutoff_unixtime % 86400);
		$cutoff = $dbr->addQuotes( wfTimestamp( TS_MW, $cutoff_unixtime ) );
		return "cuc_timestamp > $cutoff";
	}

	/**
	 * @param string $ip
	 * @param bool $xfor
	 * @param string $reason
	 * Get all IPs used by a user
	 * Shows first and last date and number of edits
	 */
	protected function doUserIPsRequest( $user , $reason = '', $period = 0 ) {
		global $wgOut, $wgTitle, $wgLang, $wgUser;
		$fname = 'CheckUser::doUserIPsRequest';

		$userTitle = Title::newFromText( $user, NS_USER );
		if( !is_null( $userTitle ) ) {
			// normalize the username
			$user = $userTitle->getText();
		}
		# IPs are passed in as a blank string
		if( !$user ) {
			$s = wfMsgHtml('nouserspecified');
			$wgOut->addHTML( $s );
			return;
		}
		# Get ID, works better than text as user may have been renamed
		$user_id = User::idFromName($user);

		# If user is not IP or nonexistant
		if( !$user_id ) {
			$s = wfMsgExt('nosuchusershort',array('parseinline'),$user);
			$wgOut->addHTML( $s );
			return;
		}

		if( !$this->addLogEntry( 'userips', 'user', $user, $reason, $user_id ) ) {
			$wgOut->addHTML( '<p>'.wfMsgHtml('checkuser-log-fail').'</p>' );
		}
		$dbr = wfGetDB( DB_SLAVE );
		$time_conds = $this->getTimeConds( $period );
		# Ordering by the latest timestamp makes a small filesort on the IP list
		$cu_changes = $dbr->tableName( 'cu_changes' );
		$use_index = $dbr->useIndexClause( 'cuc_user_ip_time' );
		$sql = "SELECT cuc_ip,cuc_ip_hex, COUNT(*) AS count, 
			MIN(cuc_timestamp) AS first, MAX(cuc_timestamp) AS last 
			FROM $cu_changes $use_index WHERE cuc_user = $user_id AND $time_conds 
			GROUP BY cuc_ip,cuc_ip_hex ORDER BY last DESC";
		
		$ret = $dbr->query( $sql, __METHOD__ );

		if( !$dbr->numRows( $ret ) ) {
			$s = wfMsgHtml("checkuser-nomatch")."\n";
		} else {
			$blockip = SpecialPage::getTitleFor( 'blockip' );
			$ips_edits=array();
			while( $row = $dbr->fetchObject( $ret ) ) {
				$ips_edits[$row->cuc_ip] = $row->count;
				$ips_first[$row->cuc_ip] = $row->first;
				$ips_last[$row->cuc_ip] = $row->last;
				$ips_hex[$row->cuc_ip] = $row->cuc_ip_hex;
			}
			
			$logs = SpecialPage::getTitleFor( 'Log' );
			$blocklist = SpecialPage::getTitleFor( 'Ipblocklist' );
			$s = '<ul>';
			foreach( $ips_edits as $ip => $edits ) {
				$s .= '<li>';
				$s .= '<a href="' . 
					$wgTitle->escapeLocalURL( 'user='.urlencode($ip) . '&reason='.urlencode($reason) ) . '">' . 
					htmlspecialchars($ip) . '</a>';
				$s .= ' (<a href="' . $blockip->escapeLocalURL( 'ip='.urlencode($ip) ).'">' . 
					wfMsgHtml('blocklink') . '</a>)';
				if( $ips_first[$ip] == $ips_last[$ip] ) {
					$s .= ' (' . $wgLang->timeanddate( $ips_first[$ip], true ) . ') '; 
				} else {
					$s .= ' (' . $wgLang->timeanddate( $ips_first[$ip], true ) . 
						' -- ' . $wgLang->timeanddate( $ips_last[$ip], true ) . ') '; 
				}
				$s .= ' <strong>[' . $edits . ']</strong>';
				
				# If we get some results, it helps to know if the IP in general
				# has a lot more edits, e.g. "tip of the iceberg"...
				$ipedits = $dbr->estimateRowCount( 'cu_changes', '*',
					array( 'cuc_ip_hex' => $ips_hex[$ip] ),
					__METHOD__ );
				# If small enough, get a more accurate count
				if( $ipedits <= 1000 ) {
					$ipedits = $dbr->selectField( 'cu_changes', 'COUNT(*)',
						array( 'cuc_ip_hex' => $ips_hex[$ip] ),
						__METHOD__ );
				}
				if( $ipedits > $ips_edits[$ip] ) {
					$s .= ' <i>(' . wfMsgHtml('checkuser-ipeditcount',$ipedits) . ')</i>';
				}
				
				# If this IP is blocked, give a link to the block log
				$block = new Block();
				$block->fromMaster( false ); // use slaves
				if( $block->load( $ip, 0 ) ) {
					if( IP::isIPAddress($block->mAddress) && strpos($block->mAddress,'/') ) {
						$userpage = Title::makeTitle( NS_USER, $block->mAddress );
						$blocklog = $this->sk->makeKnownLinkObj( $logs, wfMsgHtml('checkuser-blocked'), 
							'type=block&page=' . urlencode( $userpage->getPrefixedText() ) );
						$s .= ' <strong>(' . $blocklog . ' - ' . $block->mAddress . ')</strong>';
					} else if( $block->mAuto ) {
						$blocklog = $this->sk->makeKnownLinkObj( $blocklist, wfMsgHtml('checkuser-blocked'), 
							'ip=' . urlencode( "#$block->mId" ) );
						$s .= ' <strong>(' . $blocklog . ')</strong>';
					} else {
						$userpage = Title::makeTitle( NS_USER, $ip );
						$blocklog = $this->sk->makeKnownLinkObj( $logs, wfMsgHtml('checkuser-blocked'), 
							'type=block&page=' . urlencode( $userpage->getPrefixedText() ) );
						$s .= ' <strong>(' . $blocklog . ')</strong>';
					}
				}
				$s .= "<div style='margin-left:5%'>";
				$s .= "<small>" . wfMsgExt('checkuser-toollinks',array('parseinline'),urlencode($ip)) . "</small>";
				$s .= "</div>";
				$s .= "</li>\n";
			}
			$s .= '</ul>';
		}
		$wgOut->addHTML( $s );
		$dbr->freeResult( $ret );
	}

	protected function showLog() {
		global $wgRequest, $wgOut;
		$type = $wgRequest->getVal( 'cuSearchType' );
		$target = $wgRequest->getVal( 'cuSearch' );
		$year = $wgRequest->getIntOrNull( 'year' );
		$month = $wgRequest->getIntOrNull( 'month' );
		$error = false;
		$dbr = wfGetDB( DB_SLAVE );
		$searchConds = false;
		
		$wgOut->setPageTitle( wfMsg( 'checkuser-log' ) );

		$wgOut->addHTML( $this->sk->makeKnownLinkObj( $this->getTitle(), wfMsgHtml( 'checkuser-log-return' ) ) );

		if ( $type === null ) {
			$type = 'target';
		} elseif ( $type == 'initiator' ) {
			$user = User::newFromName( $target );
			if ( !$user || !$user->getID() ) {
				$error = 'checkuser-user-nonexistent';
			} else {
				$searchConds = array( 'cul_user' => $user->getID() );
			}
		} else /* target */ {
			$type = 'target';
			// Is it an IP?
			list( $start, $end ) = IP::parseRange( $target );
			if ( $start !== false ) {
				if ( $start == $end ) {
					$searchConds = 'cul_target_hex = ' . $dbr->addQuotes( $start ) . ' OR ' .
						'(cul_range_end >= ' . $dbr->addQuotes( $start ) . ' AND ' .
						'cul_range_start <= ' . $dbr->addQuotes( $end ) . ')';
				} else {
					$searchConds = array(
						'(cul_target_hex >= ' . $dbr->addQuotes( $start ) . ' AND ' . 
						'cul_target_hex <= ' . $dbr->addQuotes( $end ) . ') OR ' .
						'(cul_range_end >= ' . $dbr->addQuotes( $start ) . ' AND ' . 
						'cul_range_start <= ' . $dbr->addQuotes( $end ) . ')'
					);
				}
			} else {
				// Is it a user?
				$user = User::newFromName( $target );
				if ( $user && $user->getID() ) {
					$searchConds = array( 
						'cul_type' => 'userips',
						'cul_target_id' => $user->getID(),
					);
				} else if ( $target ) {
					$error = 'checkuser-user-nonexistent';
				}
			}
		}

		$searchTypes = array( 'initiator', 'target' );
		$select = "<select name=\"cuSearchType\" style='margin-top:.2em;'>\n";
		foreach ( $searchTypes as $searchType ) {
			if ( $type == $searchType ) {
				$checked = 'selected="selected"';
			} else {
				$checked = '';
			}
			$caption = wfMsgHtml( 'checkuser-search-' . $searchType );
			$select .= "<option value=\"$searchType\" $checked>$caption</option>\n";
		}
		$select .= "</select>";

		$encTarget = htmlspecialchars( $target );
		$msgSearch = wfMsgHtml( 'checkuser-search' );
		$input = "<input type=\"text\" name=\"cuSearch\" value=\"$encTarget\" size=\"40\"/>";
		$msgSearchForm = wfMsgHtml( 'checkuser-search-form', $select, $input );
		$formAction = $this->getLogSubpageTitle()->escapeLocalURL();
		$msgSearchSubmit = '&nbsp;&nbsp;' . wfMsgHtml( 'checkuser-search-submit' ) . '&nbsp;&nbsp;';
		
		$s = "<form method='get' action=\"$formAction\">\n" . 
			"<fieldset><legend>$msgSearch</legend>\n" . 
			"<p>$msgSearchForm</p>\n" . 
			"<p>" . $this->getDateMenu( $year, $month ) . "&nbsp;&nbsp;&nbsp;\n" .
			"<input type=\"submit\" name=\"cuSearchSubmit\" value=\"$msgSearchSubmit\"/></p>\n" . 
			"</fieldset></form>\n";
		$wgOut->addHTML( $s );

		if ( $error !== false ) {
			$wgOut->addWikiText( '<div class="errorbox">' . wfMsg( $error ) . '</div>' );
			return;
		}

		$pager = new CheckUserLogPager( $this, $searchConds, $year, $month );
		$wgOut->addHTML( 
			$pager->getNavigationBar() . 
			$pager->getBody() .
			$pager->getNavigationBar() );
	}
	
		/**
	 * @return string Formatted HTML
	 * @param int $year
	 * @param int $month
	 */
	protected function getDateMenu( $year, $month ) {
		# Offset overrides year/month selection
		if( $month && $month !== -1 ) {
			$encMonth = intval( $month );
		} else {
			$encMonth = '';
		}
		if ( $year ) {
			$encYear = intval( $year );
		} else if( $encMonth ) {
			$thisMonth = intval( gmdate( 'n' ) );
			$thisYear = intval( gmdate( 'Y' ) );
			if( intval($encMonth) > $thisMonth ) {
				$thisYear--;
			}
			$encYear = $thisYear;
		} else {
			$encYear = '';
		}
		return Xml::label( wfMsg( 'year' ), 'year' ) . ' '.
			Xml::input( 'year', 4, $encYear, array('id' => 'year', 'maxlength' => 4) ) .
			' '.
			Xml::label( wfMsg( 'month' ), 'month' ) . ' '.
			Xml::monthSelector( $encMonth, -1 );
	}

	protected function addLogEntry( $logType, $targetType, $target, $reason, $targetID = 0 ) {
		global $wgUser;

		if ( $targetType == 'ip' ) {
			list( $rangeStart, $rangeEnd ) = IP::parseRange( $target );
			$targetHex = $rangeStart;
			if ( $rangeStart == $rangeEnd ) {
				$rangeStart = $rangeEnd = '';
			}
		} else {
			$targetHex = $rangeStart = $rangeEnd = '';
		}
		
		$dbw = wfGetDB( DB_MASTER );
		$cul_id = $dbw->nextSequenceValue( 'cu_log_cul_id_seq' );
		$dbw->insert( 'cu_log', 
			array(
				'cul_id' => $cul_id,
				'cul_timestamp' => $dbw->timestamp(),
				'cul_user' => $wgUser->getID(),
				'cul_user_text' => $wgUser->getName(),
				'cul_reason' => $reason,
				'cul_type' => $logType,
				'cul_target_id' => $targetID,
				'cul_target_text' => $target,
				'cul_target_hex' => $targetHex,
				'cul_range_start' => $rangeStart,
				'cul_range_end' => $rangeEnd,
			), __METHOD__ );
		return true;
	}
}

class CheckUserLogPager extends ReverseChronologicalPager {
	var $searchConds, $specialPage, $y, $m;

	function __construct( $specialPage, $searchConds, $y, $m ) {
		parent::__construct();
		/*
		$this->messages = array_map( 'wfMsg', 
			array( 'comma-separator', 'checkuser-log-userips', 'checkuser-log-ipedits', 'checkuser-log-ipusers', 
			'checkuser-log-ipedits-xff', 'checkuser-log-ipusers-xff' ) );*/

		$this->getDateCond( $y, $m );
		$this->searchConds = $searchConds ? $searchConds : array();
		$this->specialPage = $specialPage;
	}

	function formatRow( $row ) {
		global $wgLang;

		$skin = $this->getSkin();

		if ( $row->cul_reason === '' ) {
			$comment = '';
		} else {
			$comment = $skin->commentBlock( $row->cul_reason );
		}

		$user = $skin->userLink( $row->cul_user, $row->user_name );

		if ( $row->cul_type == 'userips' ) {
			$target = $skin->userLink( $row->cul_target_id, $row->cul_target_text ) . 
				$skin->userToolLinks( $row->cul_target_id, $row->cul_target_text );
		} else {
			$target = $row->cul_target_text;
		}

		return '<li>' . 
			$wgLang->timeanddate( $row->cul_timestamp ) . wfMsg( 'comma-separator' ) .
			wfMsg( 
				'checkuser-log-' . $row->cul_type,
				$user,
				$target 
			) . 
			$comment .
			'</li>';
	}

	function getStartBody() {
		if ( $this->getNumRows() ) {
			return '<ul>';
		} else {
			return '';
		}
	}

	function getEndBody() {
		if ( $this->getNumRows() ) {
			return '</ul>';
		} else {
			return '';
		}
	}

	function getEmptyBody() {
		return '<p>' . wfMsgHtml( 'checkuser-empty' ) . '</p>';
	}

	function getQueryInfo() {
		global $wgRequest;
		$this->searchConds[] = 'user_id = cul_user';
		return array(
			'tables' => array('cu_log','user'),
			'fields' => $this->selectFields(),
			'conds'  => $this->searchConds
		);
	}

	function getIndexField() {
		return 'cul_timestamp';
	}

	function getTitle() {
		return $this->specialPage->getLogSubpageTitle();
	}
	
	function selectFields() {
		return array('cul_id','cul_timestamp','cul_user','cul_reason','cul_type',
			'cul_target_id','cul_target_text','user_name');
	}
}
