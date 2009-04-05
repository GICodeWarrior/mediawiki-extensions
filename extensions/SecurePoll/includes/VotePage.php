<?php

class SecurePoll_VotePage extends SecurePoll_Page {
	var $languages;
	var $election, $auth, $user;

	function execute( $params ) {
		global $wgOut, $wgRequest;
		if ( !count( $params ) ) {
			$wgOut->addWikiMsg( 'securepoll-too-few-params' );
			return;
		}

		$electionId = intval( $params[0] );
		$this->election = $this->parent->getElection( $electionId );
		if ( !$this->election ) {
			$wgOut->addWikiMsg( 'securepoll-invalid-election', $electionId );
			return;
		}

		$this->auth = $this->election->getAuth();

		# Get voter from session
		$this->voter = $this->auth->getVoterFromSession( $this->election );

		# If there's no session, try creating one.
		# This will fail if the user is not authorised to vote in the election
		if ( !$this->voter ) {
			$status = $this->auth->newAutoSession( $this->election );
			if ( $status->isOK() ) {
				$this->voter = $status->value;
			} else {
				$wgOut->addWikiText( $status->getWikiText() );
				return;
			}
		}

		$this->initLanguage( $this->voter, $this->election );

		$wgOut->setPageTitle( $this->election->getMessage( 'title' ) );

		if ( !$this->election->isStarted() ) {
			$wgOut->addWikiMsg( 'securepoll-not-started',
				$wgLang->timeanddate( $this->election->getStartDate() ) ,
				$wgLang->date( $this->election->getStartDate() ) ,
				$wgLang->time( $this->election->getStartDate() ) );
			return;
		}

		// Show jump form if necessary
		if ( $this->election->getProperty( 'jump-url' ) ) {
			$this->showJumpForm();
			return;
		}

		// Show welcome
		if ( $this->voter->isRemote() ) {
			$wgOut->addWikiMsg( 'securepoll-welcome', $this->voter->getName() );
		}

		// Show change notice
		if ( $this->election->hasVoted( $this->voter ) && !$this->election->allowChange() ) {
			$wgOut->addWikiMsg( 'securepoll-change-disallowed' );
			return;
		}

		// Show/submit the form
		if ( $wgRequest->wasPosted() ) {
			$this->doSubmit();
		} else {
			$this->showForm();
		}
	}

	function getTitle() {
		return $this->parent->getTitle( 'vote/' . $this->election->getId() );
	}

	function showForm() {
		global $wgOut;

		// Show introduction
		if ( $this->election->hasVoted( $this->voter ) && $this->election->allowChange() ) {
			$wgOut->addWikiMsg( 'securepoll-change-allowed' );
		}
		$wgOut->addWikiText( $this->election->getMessage( 'intro' ) );

		// Show form
		$thisTitle = $this->getTitle();
		$encAction = $thisTitle->escapeLocalURL( "action=vote" );
		$encOK = wfMsgHtml( 'securepoll-submit' );
		$encToken = htmlspecialchars( $this->parent->getEditToken() );

		$wgOut->addHTML(
			"<form name=\"securepoll\" id=\"securepoll\" method=\"post\" action=\"$encAction\">\n" .
			$this->election->getBallot()->getForm() .
			"<input name=\"submit\" type=\"submit\" value=\"$encOK\">\n" .
			"<input type='hidden' name='edit_token' value=\"{$encToken}\" /></td>\n" .
			"</form>"
		);
	}

	function doSubmit() {
		global $wgOut;
		$ballot = $this->election->getBallot();
		$status = $ballot->submitForm();
		if ( !$status->isOK() ) {
			$wgOut->addWikiText( $status->getWikiText( 'securepoll_invalidentered' ) );
			$this->showForm();
		} else {
			$this->logVote( $status->value );
		}
	}

	function logVote( $record ) {
		global $wgOut, $wgRequest;

		$now = wfTimestampNow();

		$crypt = $this->election->getCrypt();
		if ( !$crypt ) {
			$encrypted = $record;
		} else {
			$status = $crypt->encrypt( $record );
			if ( !$status->isOK() ) {
				$wgOut->addWikiText( $status->getWikiText( 'securepoll-encrypt-error' ) );
				return;
			}
			$encrypted = $status->value;
		}

		$dbw = wfGetDB( DB_MASTER );
		$dbw->begin();

		# Mark previous votes as old
		$dbw->update( 'securepoll_votes',
			array( 'vote_current' => 0 ), # SET
			array( # WHERE
				'vote_election' => $this->election->getId(),
				'vote_user' => $this->voter->getId(),
			),
			__METHOD__
		);

		# Add vote to log
		$xff = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		if ( !$xff ) {
			$xff = '';
		}

		$tokenMatch = $this->parent->getEditToken() == $wgRequest->getVal( 'edit_token' );

		$voteId = $dbw->nextSequenceValue( 'securepoll_votes_vote_id' );
		$dbw->insert( 'securepoll_votes',
			array(
				'vote_id' => $voteId,
				'vote_election' => $this->election->getId(),
				'vote_user' => $this->voter->getId(),
				'vote_user_name' => $this->voter->getName(),
				'vote_user_domain' => $this->voter->getDomain(),
				'vote_record' => $encrypted,
				'vote_ip' => IP::toHex( wfGetIP() ),
				'vote_xff' => $xff,
				'vote_ua' => $_SERVER['HTTP_USER_AGENT'],
				'vote_timestamp' => $now,
				'vote_current' => 1,
				'vote_token_match' => $tokenMatch ? 1 : 0,
			),
			__METHOD__ );
		$voteId = $dbw->insertId();
		$dbw->commit();

		if ( $crypt ) {
			$receipt = sprintf( "SPID: %10d\n%s", $voteId, $encrypted );
			$wgOut->addWikiMsg( 'securepoll-gpg-receipt', $receipt );
		} else {
			$wgOut->addWikiMsg( 'securepoll-thanks' );
		}
		$returnUrl = $this->election->getProperty( 'return-url' );
		$returnText = $this->election->getProperty( 'return-text' );
		if ( $returnUrl ) {
			if ( strval( $returnText ) === '' ) {
				$returnText = $returnUrl;
			}
			$link = "[$returnUrl $returnText]";
			$wgOut->addWikiMsg( 'securepoll-return', $link );
		}
	}

	function displayInvalidVoteError() {
		global $wgOut;
		$wgOut->addWikiMsg( 'securepoll_invalidentered' );
	}

	function showJumpForm() {
		global $wgOut, $wgUser;
		$url = $this->election->getProperty( 'jump-url' );
		if ( !$url ) {
			throw new MWException( 'Configuration error: no jump-url' );
		}
		$id = $this->election->getProperty( 'jump-id' );
		if ( !$id ) {
			throw new MWException( 'Configuration error: no jump-id' );
		}
		$url .= "/login/$id";
		$wgOut->addWikiText( $this->election->getMessage( 'jump-text' ) );
		$wgOut->addHTML(
			Xml::openElement( 'form', array( 'action' => $url, 'method' => 'post' ) ) .
			Xml::hidden( 'token', SecurePoll_RemoteMWAuth::encodeToken( $wgUser->getToken() ) ) .
			Xml::hidden( 'id', $wgUser->getId() ) .
			Xml::submitButton( wfMsg( 'securepoll-jump' ) ) .
			'</form>'
		);
	}
}
