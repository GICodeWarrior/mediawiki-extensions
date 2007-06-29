<?php

/*
	A special page with the interface for blocking, viewing and unblocking 
	of unwanted phrases

*/
if(!defined('MEDIAWIKI'))
   die();

$wgAvailableRights[] = 'spamregex';
$wgGroupPermissions['staff']['spamregex'] = true;

$wgExtensionFunctions[] = 'wfSpamRegexSetup';
$wgExtensionCredits['specialpage'][] = array(
   'name' => 'Regular Expression Spam Block',
   'author' => 'Bartek',
   'description' => 'filters out unwanted phrases in edited pages, based on regular expressions'
);

/* special page init */
function wfSpamRegexSetup() {
   global $IP, $wgMessageCache;
   if (!wfSimplifiedRegexCheckSharedDB())
   	return ;
   require_once($IP. '/includes/SpecialPage.php');
   SpecialPage::addPage(new SpecialPage('Spamregex', 'spamregex', true, 'wfSpamRegexSpecial', false));
   $wgMessageCache->addMessage('spamregex', 'spamRegex');
}

/* wrapper for GET values */
function wfSpamRegexGetListBits () {
	global $wgRequest ;
        $pieces = array() ;
        list( $limit, $offset ) = $wgRequest->getLimitOffset() ;
        $pieces[] = 'limit=' . $limit ;
        $pieces[] = 'offset=' . $offset ;
        $bits = implode( '&', $pieces ) ;
        return $bits ;
}

/* the core */
function wfSpamRegexSpecial( $par ) {
	global $wgOut, $wgUser, $wgRequest ;
   	$wgOut->setPageTitle("Spam Regex Unwanted Expressions Block");
	$sRF = new spamRegexForm ($par) ;
	$sRL = new spamRegexList ($par) ;

   	$action = $wgRequest->getVal( 'action' );
   	if ( 'success_block' == $action ) {
   		$sRF->showSuccess() ;
		$sRF->showForm ('') ;
	} else if ( 'success_unblock' == $action ) {
   		$sRL->showSuccess() ;
		$sRF->showForm ('') ;
	} else if ( 'failure_unblock' == $action ) {
		$text = htmlspecialchars ($wgRequest->getVal ('text')) ;
		$sRF->showForm ("Error unblocking \"{$text}\". Probably there is no such pattern.") ;
   	} else if ( $wgRequest->wasPosted() && 'submit' == $action &&
   		$wgUser->matchEditToken( $wgRequest->getVal ('wpEditToken') ) ) {
        	$sRF->doSubmit () ;
   	} else if ('delete' == $action) {
		$sRL->deleteFromList () ;
	} else {
   		$sRF->showForm ('') ;
   	}
		$sRL->showList ('', $offset ) ;
}

/* useful for cleaning the memcached keys */
function wfSpamRegexUnsetKeys () {
	global $wgMemc, $wgSharedDB ;
	$wgMemc->delete ("$wgSharedDB:spamRegexCore:spamRegex") ;
	$wgMemc->delete ("$wgSharedDB:spamRegexCore:numResults") ;
}

/* the list of blocked names/addresses */
class spamRegexList {
	var $mRegexUnblockedAddress ;
	var $numResults = 0 ;

	/* constructor */
	function regexBlockList ( $par ) {
	}
	
	/* output list */
	function showList ( $err ) {
		global $wgOut, $wgRequest, $wgMemc, $wgLang ;

		/* on error, display error */
		if ( "" != $err ) {
			$wgOut->addHTML ("<p class='error'>{$err}</p>\n") ;
		}
                $titleObj = Title::makeTitle( NS_SPECIAL, 'Spamregex' );
                $action = $titleObj->escapeLocalURL("") ."?".wfSpamRegexGetListBits() ;
		$action_unblock = $titleObj->escapeLocalURL("action=delete") ."&".wfSpamRegexGetListBits() ;
		list( $limit, $offset ) = $wgRequest->getLimitOffset() ;

		$wgOut->addWikiText ("<br/><b>Currently blocked phrases:</b>") ;
		$this->showPrevNext ($wgOut) ;	

		if (0 == $this->fetchNumResults ()) {
			$wgOut->addWikiText ("\n\n'''There are no blocked phrases.'''\n") ;
		}
	
		$wgOut->addHTML ("<form name=\"spamregexlist\" method=\"get\" action=\"{$action}\">") ;
		/* get data and play with data */
		$dbr = &wfGetDB (DB_SLAVE) ;
		$query = "SELECT * FROM ".wfSpamRegexGetTable() ;
		$query .= " order by spam_text" ;
		
		$query = $dbr->limitResult ($query, $limit, $offset) ;
		$res = $dbr->query ($query) ;
		$wgOut->addHTML ("<ul>") ;
		while ( $row = $dbr->fetchObject( $res ) ) {
			$time = $wgLang->timeanddate( wfTimestamp( TS_MW, $row->spam_timestamp ), true ) ;
			$ublock_ip = urlencode ($row->spam_text) ;
			$wgOut->addHTML ("
				<li><b>".htmlspecialchars($row->spam_text)."</b> (<a href=\"{$action_unblock}&text={$ublock_ip}\">remove</a>) added by {$row->spam_user} on {$time}</li>
				") ;	
	       	}
	        $dbr->freeResult ($res) ;
		$wgOut->addHTML ("</ul></form>") ;
		$this->showPrevNext ($wgOut) ;	
	}

	/* remove from list - without confirmation */
	function deleteFromList () {
		global $wgOut, $wgRequest, $wgMemc, $wgUser ;
		$text = urldecode ($wgRequest->getVal('text'));
		/* delete */
                $dbw =& wfGetDB( DB_MASTER );
		$query = "DELETE FROM ".wfSpamRegexGetTable()." WHERE spam_text = ".$dbw->addQuotes($text) ;
		$dbw->query ($query) ;
	        $titleObj = Title::makeTitle( NS_SPECIAL, 'Spamregex' ) ;
		if ( $dbw->affectedRows() ) {
			/* success  */
			wfSpamRegexUnsetKeys () ;
                	$wgOut->redirect( $titleObj->getFullURL( 'action=success_unblock&text='.urlencode($text).'&'.wfSpamRegexGetListBits() ) ) ;
		} else {
			$wgOut->redirect( $titleObj->getFullURL( 'action=failure_unblock&text='.urlencode($text).'&'.wfSpamRegexGetListBits() ) ) ;
		}
	}	

	/* fetch number of all rows */
	function fetchNumResults () {
		global $wgMemc, $wgSharedDB ;

                /* we use memcached here */
		$key = "$wgSharedDB:spamRegexCore:numResults" ;
		$cached = $wgMemc->get ($key) ;
		$results = 0 ;
                if (is_null ($cached)) {
		        $dbr = &wfGetDB (DB_SLAVE) ;	
			$query_count = "SELECT COUNT(*) as n FROM ".wfSpamRegexGetTable() ;
			$res_count = $dbr->query($query_count) ;
			$row_count = $dbr->fetchObject ($res_count);
			$results = $row_count->n ;
                	$wgMemc->set ($key, $results, REGEXBLOCK_EXPIRE) ;
			$dbr->freeResult ($res_count) ;
		} else {
			$results = $cached ;
		}
		$this->numResults = $results ;
		return $results ;
	}

	/* draws one option for select */
	function makeOption ($blocker, $current) {
		global $wgOut ;
		if ($blocker == $current) {
			$wgOut->addHTML ("<option selected=\"selected\" value=\"{$blocker}\">{$blocker}</option>") ;	
		} else {
			$wgOut->addHTML ("<option value=\"{$blocker}\">{$blocker}</option>") ;		
		}
	}

	/* on success */
	function showSuccess () {
		global $wgOut, $wgRequest ;
		$wgOut->setPageTitle('Block phrase using regular expressions') ;
		$wgOut->setSubTitle('Unblock succedeed') ;	
		$wgOut->addWikiText('Phrase <b>'.htmlspecialchars($wgRequest->getVal('text', $par)).'</b> has been unblocked from editing.') ;
	}

	/* init for showprevnext */
        function showPrevNext( &$out ) {
                global $wgContLang,$wgRequest;
                list( $limit, $offset ) = $wgRequest->getLimitOffset();
                $html = wfViewPrevNext( 
				$offset,
				$limit,
                        	$wgContLang->specialpage( 'Spamregex' ),
                        	'',
				($this->numResults - $offset) <= $limit
			);
                $out->addHTML( '<p>' . $html . '</p>' );
        }
}

/* the form for blocking names and addresses */
class spamRegexForm {
	var $mBlockedPhrase ;

	/* constructor */
	function spamRegexForm ( $par ) {
		global $wgRequest ;
		$this->mBlockedPhrase = $wgRequest->getVal( 'wpBlockedPhrase',  $wgRequest->getVal( 'text', $par ) );
	}

	/* output */
	function showForm ( $err ) {
		global $wgOut, $wgUser, $wgRequest ;
	
		$token = htmlspecialchars( $wgUser->editToken() );
		$titleObj = Title::makeTitle( NS_SPECIAL, 'Spamregex' );
		$action = $titleObj->escapeLocalURL( "action=submit" )."&".wfSpamRegexGetListBits() ;

                if ( "" != $err ) {
                        $wgOut->setSubtitle( wfMsgHtml( 'formerror' ) );
                        $wgOut->addHTML( "<p class='error'>{$err}</p>\n" );
                }
	
		$wgOut->addWikiText (SPAMREGEX_HELP) ;

		( 'submit' == $wgRequest->getVal( 'action' )) ? $scBlockedPhrase = htmlspecialchars ($this->mBlockedPhrase) : $scBlockedPhrase = '' ;

   		$wgOut->addHtml("
<form name=\"spamregex\" method=\"post\" action=\"{$action}\">
	<table border=\"0\">
		<tr>
			<td align=\"right\">Phrase to block :</td>
			<td align=\"left\">
				<input tabindex=\"1\" name=\"wpBlockedPhrase\" value=\"{$scBlockedPhrase}\" />
			</td>
		</tr>
		<tr>
			<td align=\"right\">&#160;</td>
			<td align=\"left\">
				<input tabindex=\"2\" name=\"wpSpamRegexBlockedSubmit\" type=\"submit\" value=\"Block this phrase\" />
			</td>
		</tr>
	</table>
	<input type='hidden' name='wpEditToken' value=\"{$token}\" />
</form>");
	}

	/* on success */
	function showSuccess () {
		global $wgOut, $wgRequest ;
		$wgOut->setPageTitle('Block phrases from saving using regular expressions') ;
		$wgOut->setSubTitle('Block succedeed') ;	

		$wgOut->addWikiText('Phrase <b>'.htmlspecialchars($this->mBlockedPhrase).'</b> has been blocked.') ;
	}

	/* on submit */
	function doSubmit () {
		global $wgOut, $wgUser, $wgMemc ;

		/* empty name */
		if ( strlen($this->mBlockedPhrase) == 0 ) {
			$this->showForm ("Give a phrase to block.") ;	
			return ;
		}
                /* validate expression */
		if (!$simple_regex = wfValidRegex ($this->mBlockedPhrase) ) {
			$this->showForm ("Invalid regular expression.") ;	
			return ;                	
		}

		/* make insert */
		$dbw =& wfGetDB( DB_MASTER );
		$name = $wgUser->getName () ;
		$timestamp =  wfTimestampNow() ;
		$query = "INSERT IGNORE INTO ".wfSpamRegexGetTable()
			  ." (spam_id, spam_text, spam_timestamp, spam_user) 
			  VALUES (null,
			  	  {$dbw->addQuotes($this->mBlockedPhrase)},
				  {$timestamp},
				  {$dbw->addQuotes($name)}
				 )" ;
		$dbw->query ($query) ;

		/* duplicate entry */
		if (!$dbw->affectedRows()) {
			$this->showForm ( "\"".htmlspecialchars($this->mBlockedPhrase)."\" is already blocked." ) ;
			return ;
		}
		wfSpamRegexUnsetKeys ($name) ;		
		/* redirect */
	        $titleObj = Title::makeTitle( NS_SPECIAL, 'Spamregex' ) ;
        	$wgOut->redirect( $titleObj->getFullURL( 'action=success_block&text=' .urlencode( $this->mBlockedPhrase )."&".wfSpamRegexGetListBits() ) ) ;
	}
}


