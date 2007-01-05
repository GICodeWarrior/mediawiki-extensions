<?php
if ( !defined( 'MEDIAWIKI' ) ):
?>
<html>
<head><title>PovWatch Version 1.0</title></head>
<body>
<h1>PovWatch Version 1.0</h1>
<p>
This is a MediaWiki extension for pushing articles on to the watchlists of other users. 
To install it, add the following to the bottom of your <tt>LocalSettings.php</tt>, 
before the "?&gt;":</p>
<pre>
require_once( "$IP/extensions/PovWatch/PovWatch.php" );
</pre>
</body>
</html>
<?php
	exit(1);
endif;

global $wgMessageCache;
$wgMessageCache->addMessages( array(
	'povwatch' => 'PovWatch',
	'povwatch_no_session' => 'Error: Could not submit form due to a loss of session data.',
	'povwatch_not_allowed_push' => 'You are not a PovWatch admin, you can\'t push articles to watchlists.',
	'povwatch_already_subscribed' => 'You are already subscribed to PovWatch',
	'povwatch_subscribed' => 'You are now subscribed to PovWatch',
	'povwatch_not_subscribed' => 'You are not subscribed to PovWatch, so you can\'t unsubscribe.',
	'povwatch_unsubscribed' => 'You have now unsubscribed from PovWatch',
	'povwatch_invalid_title' => 'The title specified was invalid',
	'povwatch_pushed' => '[[$1]] has successfully been pushed to $2 user watchlist(s)',
	'povwatch_intro' => 'PovWatch is a service which allows contentious articles to be discreetly
pushed on to the watchlists of subscribing administrators.

A log of recent watchlist pushes is available at [[Special:PovWatch/log]].
',
	#'povwatch_subscriber_list' => 'A [[Special:PovWatch/subscribers|list of subscribers]] is available.',
	#'povwatch_subscriber_list_intro' => '<strong>Subscriber list</strong>',
	#'povwatch_not_allowed_subscribers' => 'You are not allowed to view the PovWatch subscriber list.',
	'povwatch_unknown_subpage' => 'Unknown subpage.',
	'povwatch_push' => 'Push',
	'povwatch_push_intro' => 'Use the form below to push articles on to the watchlists of subscribing
users. Please be careful typing the title: even non-existent titles can be added, and there is no way to 
remove a title once it has been pushed out.',
	'povwatch_title' => 'Title:',
	'povwatch_comment' => 'Log comment:',
	'povwatch_no_log' => 'There are no log entries.',
	'povwatch_no_subscribers' => 'There are no subscribers.',
	'povwatch_unsubscribe_intro' => 'You are subscribed to PovWatch. Click the button below to unsubscribe.',
	'povwatch_unsubscribe' => 'Unsubscribe',
	'povwatch_subscribe_intro' => 'You are not subscribed to PovWatch. Click the button below to subscribe.',
	'povwatch_subscribe' => 'Subscribe',
	'povwatch_added' => 'added',
));

class PovWatchPage extends SpecialPage {
	public $mPosted, $mTitleText, $mSubscribe, $mUnsubscribe, $mPush;
	public $mComment, $mToken, $mOut;
	
	function __construct() {
		SpecialPage::SpecialPage( 'PovWatch', 'povwatch_user' );
	}

	#-----------------------------------------------------------------------
	# UI functions
	#-----------------------------------------------------------------------
	
	function execute( $subpage ) {
		global $wgRequest, $wgUser, $wgOut;

		$this->setHeaders();

		if ( !$wgUser->isAllowed( 'povwatch_user' ) ) {
			$this->displayRestrictionError();
			return;
		}

		$this->mPosted = $wgRequest->wasPosted();
		$this->mTitleText = $wgRequest->getText( 'push_title' );
		$this->mSubscribe = $wgRequest->getBool( 'subscribe' );
		$this->mUnsubscribe = $wgRequest->getBool( 'unsubscribe' );
		$this->mPush = $wgRequest->getBool( 'push' );
		$this->mComment = $wgRequest->getText( 'comment' );
		$this->mToken = $wgRequest->getVal( 'token' );
		$this->mOut =& $wgOut;

		/*if ( $subpage == 'subscribers' ) {
			if ( $wgUser->isAllowed( 'povwatch_subscriber_list' ) ) {
				$this->showSubscriberList();
			} else {
				$this->error( 'not_allowed_subscribers' );
			}
			$this->mOut->returnToMain( false, $this->getTitle() );
		} else*/
		if ( $subpage == 'log' ) {
			$this->showLog();
		} elseif ( $subpage != '' ) {
			$this->error( 'unknown_subpage' );
			$this->mOut->returnToMain( false, $this->getTitle() );			
		} else {
			$done = false;
			if ( $this->mPosted ) {
				if ( $this->mToken != $wgUser->editToken() ) {
					$this->error( 'no_session' );
				} elseif ( $this->mSubscribe ) {
					$done = $this->subscribe();
				} elseif ( $this->mUnsubscribe ) {
					$done = $this->unsubscribe();
				} elseif ( $this->mPush ) {
					if ( $wgUser->isAllowed( 'povwatch_admin' ) ) {
						$done = $this->push();
					} else {
						$this->error( 'not_allowed_push' );
					}
				}
			}
			if ( !$done ) {
				$this->showPage();
			}
		}
	}

	function error( $message ) {
		$this->mOut->addWikiText( '<div class="error">' .
			$this->message( $message ) . '</div>' );
	}

	function success( $message, $arg1 = '', $arg2 = '' ) {
		$this->mOut->addWikiText( '<strong>' . 
			$this->message( $message, $arg1, $arg2 )  . '</strong>' );
	}

	function subscribe() {
		global $wgUser;
		if ( $this->isSubscribed( $wgUser ) ) {
			$this->error( 'already_subscribed' );
			return false;
		} else {
			# Ignore errors in subscribeUser, they're not likely to be important
			$this->subscribeUser( $wgUser );
			$this->success( 'subscribed' );
			$this->mOut->returnToMain( false, $this->getTitle() );
			return true;
		}
	}

	function unsubscribe() {
		global $wgUser;
		if ( !$this->isSubscribed( $wgUser ) ) {
			$this->error( 'not_subscribed' );
			return false;
		} else {
			# Ignore errors in unsubscribeUser, they're not likely to be important
			$this->unsubscribeUser( $wgUser );
			$this->success( 'unsubscribed' );
			$this->mOut->returnToMain( false, $this->getTitle() );
			return true;
		}
	}

	function push() {
		$title = Title::newFromText( $this->mTitleText );
		if ( !$title ) {
			$this->error( 'invalid_title' );
		} else {
			$affected = $this->pushTitle( $title, $this->mComment );
			$this->success( 'pushed', $title->getPrefixedText(), $affected );
		}
	}

	function showPage() {
		global $wgUser;

		$this->mOut->addWikiText( $this->message( 'intro' ) );
		
		if ( $wgUser->isAllowed( 'povwatch_admin' ) ) {
			$this->showPushForm();
		}

		
		$this->showSubscribeForm();
		/*
		if ( $wgUser->isAllowed( 'povwatch_subscriber_list' ) ) {
			$this->mOut->addWikiText( $this->message( 'subscriber_list' ) );
		}*/
	}

	function showPushForm() {
		$thisTitle = $this->getTitle();
		$encAction = htmlspecialchars( $thisTitle->getLocalURL() );
		$push = $this->message( 'push' );
		$pushIntro = $this->message( 'push_intro' );
		$msgTitle = $this->message( 'title' );
		$encTitle = htmlspecialchars( $this->mTitleText );
		$msgComment = $this->message( 'comment' );
		$encComment = htmlspecialchars( $this->mComment );
		$encMsgOK = wfMsg( 'ok' );
		$encToken = htmlspecialchars( $this->makeToken() );

		$this->mOut->addHTML( <<<EOT
<form name="push" method="post" action="$encAction">
<fieldset>
<legend>$push</legend>
$pushIntro
<table border="0" cellpadding="2">
<tr><td align="right">
$msgTitle
</td><td align="left">
<input type="text" size="60" name="push_title" value="$encTitle"/>
</td></tr><tr><td align="right">
$msgComment
</td><td align="left">
<input type="text" size="60" name="comment" value="$encComment"/>
</td></tr><tr><td colspan="2" align="center">
<input type="submit" name="push" value="$encMsgOK"/>
</td></tr></table></fieldset>
<input type="hidden" name="token" value="$encToken"/>
</form>
EOT
		);
	}

	function showSubscriberList() {
		global $wgUser;

		$intro = $this->message( 'subscriber_list_intro' );

		$dbr =& wfGetDB( DB_SLAVE );
		$res = $dbr->select( 
			array( 'povwatch_subscribers', 'user' ), 
			array( 'pws_user', 'user_name' ), 
			array( 'pws_user=user_id' ),
			__METHOD__ );
		$s = '';
		$skin = $wgUser->getSkin();
		while ( $row = $dbr->fetchObject( $res ) ) {
			$title = Title::makeTitle( NS_USER, $row->user_name );
			$s .= '<li>' . $skin->makeKnownLinkObj( $title, $row->user_name ) . "</li>\n";
		}
		$dbr->freeResult( $res );

		if ( $s == '' ) {
			$this->mOut->addWikiText( $intro . "\n\n" . $this->message( 'no_subscribers' ) );
		} else {
			$this->mOut->addWikiText( $intro );
			$this->mOut->addHTML( "<ul>\n$s</ul>\n" );
		}
	}

	function showLog() {
		global $wgUser, $wgLang;

		$dbr =& wfGetDB( DB_SLAVE );
		$res = $dbr->select( 
			array( 'povwatch_log', 'user' ),
			array( 'povwatch_log.*', 'user_name' ),
			array( 'pwl_user=user_id' ),
			__METHOD__
		);

		if ( !$dbr->numRows( $res ) ) {
			$this->mOut->addWikiText( $this->message( 'no_log' ) );
			$this->mOut->returnToMain( false, $this->getTitle() );
			return;
		}

		# Do batch existence check
		$batch = new LinkBatch;
		while ( $row = $dbr->fetchObject( $res ) ) {
			$batch->add( $row->pwl_namespace, $row->pwl_title );
		}
		$batch->execute();

		# Rewind and format log
		$dbr->dataSeek( $res, 0 );
		$skin = $wgUser->getSkin();
		$s = '';
		$added = $this->message( 'added' );

		while ( $row = $dbr->fetchObject( $res ) ) {
			$title = Title::makeTitle( $row->pwl_namespace, $row->pwl_title );
			$titleLink = $skin->makeLinkObj( $title );
			$user = Title::makeTitleSafe( NS_USER, $row->user_name );
			$time = $wgLang->timeanddate( wfTimestamp(TS_MW, $row->pwl_timestamp), true );
			$userLink = $skin->makeKnownLinkObj( $user, htmlspecialchars( $row->user_name ) );
			$comment = $skin->commentBlock( $row->pwl_comment );

			$s .= "<li>$time $userLink $added $titleLink $comment</li>\n";
		}
		$this->mOut->addHTML( "<ul>$s</ul>" );
		$this->mOut->returnToMain( false, $this->getTitle() );
	}

	function showSubscribeForm() {
		global $wgUser;
		$thisTitle = $this->getTitle();
		$encAction = htmlspecialchars( $thisTitle->getLocalURL() );
		$encToken = htmlspecialchars( $this->makeToken() );

		if ( $this->isSubscribed( $wgUser ) ) {
			$intro = $this->mOut->parse( $this->message( 'unsubscribe_intro' ) );
			$legend = $this->message( 'unsubscribe' );
			$submitName = 'unsubscribe';
			$submitValue = htmlspecialchars( $this->message( 'unsubscribe' ) );
		} else {
			$intro = $this->mOut->parse( $this->message( 'subscribe_intro' ) );
			$legend = $this->message( 'subscribe' );
			$submitName = 'subscribe';
			$submitValue = htmlspecialchars( $this->message( 'subscribe' ) );
		}
		
		$this->mOut->addHTML( <<<EOT
<form name="subscribe" method="post" action="$encAction">
<fieldset>
<legend>$legend</legend>
$intro
<input type="submit" name="$submitName" value="$submitValue"/>
</fieldset>
<input type="hidden" name="token" value="$encToken"/>
</form>
EOT
		);
	}



	#-------------------------------------------------------------------------
	# Utility functions
	#-------------------------------------------------------------------------
	
	function message( $message, $arg1 = '', $arg2 = '' ) {
		return wfMsg( 'povwatch_' . $message, $arg1, $arg2 );
	}

	function isSubscribed( User $user ) {
		# Use dbw because a check is done shortly after form submission
		$dbw =& wfGetDB( DB_SLAVE );
		return (bool)$dbw->selectField( 
			'povwatch_subscribers', '1', 
			array( 'pws_user' => $user->getID() ), 
			__METHOD__
		);
	}

	/**
	 * Subscribe a user
	 * @param User $user
	 * @return bool success
	 */
	function subscribeUser( User $user ) {
		$id = $user->getID();
		if ( !$id ) {
			return false;
		}

		$dbw =& wfGetDB( DB_MASTER );
		$dbw->insert( 'povwatch_subscribers', array( 'pws_user' => $id ), 
			__METHOD__, array( 'IGNORE' ) );
		return (bool) $dbw->affectedRows();
	}

	function unsubscribeUser( User $user ) {
		$id = $user->getID();
		if ( !$id ) {
			return false;
		}
		$dbw =& wfGetDB( DB_MASTER );
		$dbw->delete( 'povwatch_subscribers', array( 'pws_user' => $id ), __METHOD__ );
		return (bool) $dbw->affectedRows();
	}

	/**
	 * @return integer Number of watchlists pushed to
	 */
	function pushTitle( Title $title, $comment = '' ) {
		global $wgUser;

		# We could use INSERT ... SELECT here, but that's not friendly to replication
		$insertRows = array();
		$ns = $title->getNamespace();
		$dbk = $title->getDBkey();

		# Read from master in case more users have recently been subscribed
		$dbw =& wfGetDB( DB_MASTER );
		$res = $dbw->select( 'povwatch_subscribers', 'pws_user', false, __METHOD__ );
		while ( $row = $dbw->fetchObject( $res ) ) {
			$insertRows[] = array(
				'wl_user' => $row->pws_user,
				'wl_namespace' => $ns,
				'wl_title' => $dbk,
			);
		}
		$dbw->freeResult( $res );

		# Change the watchlists
		$dbw->insert( 'watchlist', $insertRows, __METHOD__, array( 'IGNORE' ) );
		$affected = $dbw->affectedRows();

		# Add it to the log
		$dbw->insert( 'povwatch_log', 
			array(
				'pwl_timestamp' => $dbw->timestamp(),
				'pwl_namespace' => $ns,
				'pwl_title' => $dbk,
				'pwl_user' => $wgUser->getID(),
				'pwl_comment' => $comment
			), __METHOD__
		);

		return $affected;
	}

	function makeToken() {
		global $wgUser;
		if ( is_null( $this->mToken ) ) {
			$this->mToken = $wgUser->editToken();
		}
		return $this->mToken;
	}
}

?>
