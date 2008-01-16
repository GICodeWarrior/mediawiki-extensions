<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "RenameUser extension\n";
	exit( 1 );
}

# Add messages
wfLoadExtensionMessages( 'Renameuser' );

/**
 * Special page allows authorised users to rename
 * user accounts
 */
class SpecialRenameuser extends SpecialPage {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct( 'Renameuser', 'renameuser' );
	}

	/**
	 * Show the special page
	 *
	 * @param mixed $par Parameter passed to the page
	 */
	public function execute( $par ) {
		global $wgOut, $wgUser, $wgTitle, $wgRequest, $wgContLang, $wgLang;
		global $wgVersion, $wgMaxNameChars, $wgCapitalLinks;

		$this->setHeaders();

		if ( !$wgUser->isAllowed( 'renameuser' ) ) {
			$wgOut->permissionRequired( 'renameuser' );
			return;
		}

		if ( wfReadOnly() ) {
			$wgOut->readOnlyPage();
			return;
		}

		$showBlockLog = $wgRequest->getBool( 'submit-showBlockLog' );
		$oldusername = Title::newFromText( $wgRequest->getText( 'oldusername' ), NS_USER );
		$newusername = Title::newFromText( $wgContLang->ucfirst( $wgRequest->getText( 'newusername' ) ), NS_USER ); // Force uppercase of newusername otherweise wikis with wgCapitalLinks=false can create lc usernames
		$action = $wgTitle->escapeLocalUrl();
		$oun = is_object( $oldusername ) ? $oldusername->getText() : '';
		$nun = is_object( $newusername ) ? $newusername->getText() : '';
		$token = $wgUser->editToken();
		$reason = $wgRequest->getText( 'reason' );
		$is_checked = true;
		if ( $wgRequest->wasPosted() && ! $wgRequest->getCheck( 'movepages' ) ) {
			$is_checked = false;
		}
		$align = $wgContLang->isRtl() ? 'left' : 'right';

		$wgOut->addHTML( "
			<!-- Current contributions limit is " . RENAMEUSER_CONTRIBLIMIT . " -->" .
			Xml::openElement( 'form', array( 'method' => 'post', 'action' => $action, 'id' => 'renameuser' ) ) .
			Xml::openElement( 'table' ) .
			"<tr>
				<td align='$align'>" .
					Xml::label( wfMsg( 'renameuserold' ), 'oldusername' ) .
				"</td>
				<td>" .
					Xml::input( 'oldusername', 20, $oun, array( 'type' => 'text', 'tabindex' => '1' ) ) . ' ' .
					Xml::submitButton( wfMsg( 'blocklogpage' ), array ( 'name' => 'submit-showBlockLog', 'id' => 'submit-showBlockLog', 'tabindex' => '2' ) ) . ' ' .
				"</td>
			</tr>
			<tr>
				<td align='$align'>" .
					Xml::label( wfMsg( 'renameusernew' ), 'newusername' ) .
				"</td>
				<td>" .
					Xml::input( 'newusername', 20, $nun, array( 'type' => 'text', 'tabindex' => '3' ) ) .
				"</td>
			</tr>
			<tr>
				<td align='$align'>" .
					Xml::label( wfMsg( 'renameuserreason' ), 'reason' ) .
				"</td>
				<td>" .
					Xml::input( 'reason', 40, $reason, array( 'type' => 'text', 'tabindex' => '4', 'maxlength' => 255 ) ) .
				"</td>
			</tr>"
		);
		if ( $wgUser->isAllowed( 'move' ) && version_compare( $wgVersion, '1.9alpha', '>=' ) ) {
			$wgOut->addHTML( "
				<tr>
					<td>&nbsp;
					</td>
					<td>" .
						Xml::checkLabel( wfMsg( 'renameusermove' ), 'movepages', 'movepages', $is_checked, array( 'tabindex' => '5' ) ) .
					"</td>
				</tr>"
			);
		}

		$wgOut->addHTML( "
			<tr>
				<td>&nbsp;
				</td>
				<td>" .
					Xml::submitButton( wfMsg( 'renameusersubmit' ), array( 'name' => 'submit', 'tabindex' => '6', 'id' => 'submit' ) ) .
				"</td>
			</tr>" .
			Xml::closeElement( 'table' ) .
			Xml::hidden( 'token', $token ) .
			Xml::closeElement( 'form' ) . "\n"
		);

		// Show block log if requested
		if ( $showBlockLog && is_object( $oldusername ) ) {
			$this->showLogExtract ( $oldusername, 'block', $wgOut ) ;
			return;
		}

		if( $wgRequest->getText( 'oldusername' ) === '' || $wgRequest->getText( 'newusername' ) === '' ) {
			# They probably haven't even submitted the form, so don't go further.
			return;
		} elseif( !$wgRequest->wasPosted() || !$wgUser->matchEditToken( $wgRequest->getVal( 'token' ) ) ) {
			$wgOut->addWikiText( "<div class=\"errorbox\">" . wfMsg( 'renameuser-error-request' ) . "</div>" );
			return;
		} elseif( !is_object( $oldusername ) ) {
			// FIXME: This is bogus.  Invalid titles need to be rename-able! (bug 12654)
			$wgOut->addWikiText(
				"<div class=\"errorbox\">"
				. wfMsg( 'renameusererrorinvalid', $wgRequest->getText( 'oldusername' ) )
				. "</div>"
			);
			return;
		} elseif( !is_object( $newusername ) ) {
			$wgOut->addWikiText(
				"<div class=\"errorbox\">"
				. wfMsg( 'renameusererrorinvalid', $wgRequest->getText( 'newusername' ) )
				. "</div>"
			);
			return;
		} elseif( $oldusername->getText() == $newusername->getText() ) {
			$wgOut->addWikiText( "<div class=\"errorbox\">" . wfMsg( 'renameuser-error-same-user' ) . "</div>" );
			return;
		}

		$wgOut->addHTML( '<hr />' );

		// Suppress username validation of old username
		$olduser = User::newFromName( $oldusername->getText(), false );
		$newuser = User::newFromName( $newusername->getText() );

		// It won't be an object if for instance "|" is supplied as a value
		if ( !is_object( $olduser ) ) {
			$wgOut->addWikiText( "<div class=\"errorbox\">" . wfMsg( 'renameusererrorinvalid', $oldusername->getText() ) . "</div>" );
			return;
		}

		if ( !is_object( $newuser ) || !User::isCreatableName( $newuser->getName() ) ) {
			$wgOut->addWikiText( "<div class=\"errorbox\">" . wfMsg( 'renameusererrorinvalid', $newusername->getText() ) . "</div>" );
			return;
		}

		// Check for the existence of lowercase oldusername in database.
		// Until r19631 it was possible to rename a user to a name with first character as lowercase
		if ( $wgRequest->getText( 'oldusername' ) !== $wgContLang->ucfirst( $wgRequest->getText( 'oldusername' ) ) ) {
			// oldusername was entered as lowercase -> check for existence in table 'user'
			$dbr_lc = wfGetDB( DB_SLAVE );
			$s = trim( $wgRequest->getText( 'oldusername' ) );
			$uid = $dbr_lc->selectField( 'user', 'user_id', array( 'user_name' => $s ), __METHOD__ );
			if ( $uid === false ) {
				if ( !$wgCapitalLinks ) {
					$uid = 0; // We are on a lowercase wiki but lowercase username does not exists
				} else {
					$uid = $olduser->idForName(); // We are on a standard uppercase wiki, use normal 
				}
			} else {
				// username with lowercase exists
				// Title::newFromText was nice, but forces uppercase
				// for older rename accidents on lowercase wikis we need the lowercase username as entered in the form
				$oldusername->mTextform = $wgRequest->getText( 'oldusername' );
				$oldusername->mUrlform = $wgRequest->getText( 'oldusername' );
				$oldusername->mDbkeyform = $wgRequest->getText( 'oldusername' );
			}
		} else {
			// oldusername was entered as upperase -> standard procedure
			$uid = $olduser->idForName();
		}

		if ($uid == 0) {
			$wgOut->addWikiText( "<div class=\"errorbox\">" . wfMsg( 'renameusererrordoesnotexist' , $oldusername->getText() ) . "</div>" );
			return;
		}

		if ($newuser->idForName() != 0) {
			$wgOut->addWikiText( "<div class=\"errorbox\">" . wfMsg( 'renameusererrorexists', $newusername->getText() ) . "</div>" );
			return;
		}

		// Check edit count
		if ( !$wgUser->isAllowed( 'siteadmin' ) ) {
			$contribs = User::edits( $uid );
			if ( RENAMEUSER_CONTRIBLIMIT != 0 && $contribs > RENAMEUSER_CONTRIBLIMIT ) {
				$wgOut->addWikiText( "<div class=\"errorbox\">" . 
					wfMsg( 'renameusererrortoomany',
						$oldusername->getText(),
						$wgLang->formatNum( $contribs ),
						$wgLang->formatNum( RENAMEUSER_CONTRIBLIMIT )
					)
				 . "</div>" );
				return;
			}
		}

		// Give other affected extensions a chance to validate or abort
		if( !wfRunHooks( 'RenameUserAbort', array( $uid, $oldusername->getText(), $newusername->getText() ) ) ) {
			return;
		}

		$rename = new RenameuserSQL( $oldusername->getText(), $newusername->getText(), $uid );
		$rename->rename();

		$log = new LogPage( 'renameuser' );
		$log->addEntry( 'renameuser', $oldusername, wfMsgExt( 'renameuser-log', array( 'parsemag', 'content' ), $wgContLang->formatNum( $contribs ), $reason ), $newusername->getText() );

		$wgOut->addWikiText( "<div class=\"successbox\">" . wfMsg( 'renameusersuccess', $oldusername->getText(), $newusername->getText() ) . "</div><br style=\"clear:both\" />" );

		if ( $wgRequest->getCheck( 'movepages' ) && $wgUser->isAllowed( 'move' ) && version_compare( $wgVersion, '1.9alpha', '>=' ) ) {
			$dbr =& wfGetDB( DB_SLAVE );
			$oldkey = $oldusername->getDBkey();
			$pages = $dbr->select(
				'page',
				array( 'page_namespace', 'page_title' ),
				array(
					'page_namespace IN (' . NS_USER . ',' . NS_USER_TALK . ')',
					'(page_title LIKE ' . 
						$dbr->addQuotes( $dbr->escapeLike( $oldusername->getDBkey() ) . '/%' ) . 
						' OR page_title = ' . $dbr->addQuotes( $oldusername->getDBkey() ) . ')'
				),
				__METHOD__
			);

			$output = '';
			$skin =& $wgUser->getSkin();
			while ( $row = $dbr->fetchObject( $pages ) ) {
				$oldPage = Title::makeTitleSafe( $row->page_namespace, $row->page_title );
				$newPage = Title::makeTitleSafe( $row->page_namespace, preg_replace( '!^[^/]+!', $newusername->getDBkey(), $row->page_title ) );
				if ( $newPage->exists() && !$oldPage->isValidMoveTarget( $newPage ) ) {
					$link = $skin->makeKnownLinkObj( $newPage );
					$output .= '<li class="mw-renameuser-pe">' . wfMsgHtml( 'renameuser-page-exists', $link ) . '</li>';
				} else {
					$success = $oldPage->moveTo( $newPage, false, wfMsgForContent( 'renameuser-move-log', $oldusername->getText(), $newusername->getText() ) );
					if( $success === true ) {
						$oldLink = $skin->makeKnownLinkObj( $oldPage );
						$newLink = $skin->makeKnownLinkObj( $newPage );
						$output .= '<li class="mw-renameuser-pm">' . wfMsgHtml( 'renameuser-page-moved', $oldLink, $newLink ) . '</li>';
					} else {
						$oldLink = $skin->makeKnownLinkObj( $oldPage );
						$newLink = $skin->makeLinkObj( $newPage );
						$output .= '<li class="mw-renameuser-pu">' . wfMsgHtml( 'renameuser-page-unmoved', $oldLink, $newLink ) . '</li>';
					}
				}
			}
			if( $output )
				$wgOut->addHtml( '<ul>' . $output . '</ul>' );
		}
	}

	function showLogExtract( $username, $type, &$out ) {
		global $wgOut;
		# Show relevant lines from the logs:
		$wgOut->addHtml( "<h2>" . htmlspecialchars( LogPage::logName( $type ) ) . "</h2>\n" );

		$logViewer = new LogViewer(
			new LogReader(
				new FauxRequest(
					array( 'page' => $username->getPrefixedText(),
					       'type' => $type ) ) ) );
		$logViewer->showList( $out );

	}
}

class RenameuserSQL {
	
	/**
	  * The old username
	  *
	  * @var string
	  * @access private
	  */
	var $old;

	/**
	  * The new username
	  *
	  * @var string
	  * @access private
	  */
	var $new;

	/**
	  * The user ID
	  *
	  * @var integer
	  * @access private
	  */
	var $uid;

	/**
	  * The the tables => fields to be updated
	  *
	  * @var array
	  * @access private
	  */
	var $tables;

	/**
	 * Constructor
	 *
	 * @param string $old The old username
	 * @param string $new The new username
	 */
	function RenameuserSQL($old, $new, $uid) {
		$this->old = $old;
		$this->new = $new;
		$this->uid = $uid;

		// 1.5 schema
		$this->tables = array(
			'image' => 'img_user_text',
			'oldimage' => 'oi_user_text',
			'archive' => 'ar_user_text',
			'revision' => 'rev_user_text'
		);
		$this->tablesJob = array();
		// See if this is for large tables on large, busy, wikis
		if( function_exists('wfQueriesMustScale') && wfQueriesMustScale() ) {
			#$this->tablesJob['revision'] = array('rev_user_text','rev_id');
			$this->tablesJob['recentchanges'] = array('rc_user_text','rc_id');
		} else {
			#$this->tables['revision'] = 'rev_user_text';
			$this->tables['recentchanges'] = 'rc_user_text';
		}

	}

	/**
	 * Do the rename operation
	 */
	function rename() {
		global $wgMemc, $wgDBname, $wgAuth;

		wfProfileIn( __METHOD__ );

		$dbw =& wfGetDB( DB_MASTER );
		// Rename and touch the user before re-attributing edits,
		// this avoids users still being logged in and making new edits while
		// being renamed, which leaves edits at the old name.
		$dbw->update( 'user',
			array( 'user_name' => $this->new, 'user_touched' => $dbw->timestamp() ), 
			array( 'user_name' => $this->old ),
			__METHOD__
		);

		foreach( $this->tables as $table => $field ) {
			$dbw->update( $table,
				array( $field => $this->new ),
				array( $field => $this->old ),
				__METHOD__
				#,array( $dbw->lowPriorityOption() )
			);
		}

		foreach( $this->tablesJob as $table => $params ) {
			$res = $dbw->select( $table,
					array( $params[0], $params[1] ),
					array( $params[0] => $this->old )
				);

			global $wgUpdateRowsPerJob;

			$batchSize = 500; // Lets not flood the job table!
			$jobSize = $wgUpdateRowsPerJob; // How many rows per job?

			$key = $params[1];
			$jobParams = array();
			$jobParams['table'] = $table;
			$jobParams['column'] = $params[0];
			$jobParams['uniqueKey'] = $key;
			$jobParams['oldname'] = $this->old;
			$jobParams['newname'] = $this->new;

			$jobParams['keyId'] = array();
			$jobRows = 0;
			$done = false;
			while ( !$done ) {
				$jobs = array();
				for ( $i = 0; $i < $batchSize; $i++ ) {
					$row = $dbw->fetchObject( $res );
					if ( !$row ) {
						# If there are any job rows left, add it to the queue as a job
						if( $jobRows > 0 ) {
							$jobs[] = Job::factory( 'renameUser', Title::newMainPage(), $jobParams );
							$jobRows = 0;
							$jobParams['keyId'] = array();
						}
						$done = true;
						break;
					}
					$jobParams['keyId'][] = $row->$key;
					$jobRows++;
					# Once a job has $jobSize rows, add it to the queue
					if( $jobRows >= $jobSize ) {
						$jobs[] = Job::factory( 'renameUser', Title::newMainPage(), $jobParams );
						$jobRows = 0;
						$jobParams['keyId'] = array();
					}
				}
				Job::batchInsert( $jobs );
			}
			$dbw->freeResult( $res );
		}

		// Clear caches and inform authentication plugins
		$user = User::newFromId( $this->uid );
		$user->invalidateCache();
		$wgAuth->updateExternalDB( $user );
		wfRunHooks( 'RenameUserComplete', array( $this->uid, $this->old, $this->new ) );

		wfProfileOut( __METHOD__ );
	}
}
