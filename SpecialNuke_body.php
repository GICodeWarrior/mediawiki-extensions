<?php

if( !defined( 'MEDIAWIKI' ) )
	die( 'Not an entry point.' );

class SpecialNuke extends SpecialPage {
	function __construct() {
		wfLoadExtensionMessages( 'Nuke' );
		parent::__construct( 'Nuke', 'nuke' );
	}

	function execute( $par ){
		global $wgUser, $wgRequest;

		if( !$this->userCanExecute( $wgUser ) ){
			$this->displayRestrictionError();
			return;
		}

		$this->setHeaders();
		$this->outputHeader();

		$target = $wgRequest->getText( 'target', $par );
		$reason = $wgRequest->getText( 'wpReason',
			wfMsgForContent( 'nuke-defaultreason', $target ) );
		$posted = $wgRequest->wasPosted() &&
			$wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) );
		if( $posted ) {
			$pages = $wgRequest->getArray( 'pages' );
			if( $pages ) {
				return $this->doDelete( $pages, $reason );
			}
		}
		if( $target != '' ) {
			$this->listForm( $target, $reason );
		} else {
			$this->promptForm();
		}
	}

	function promptForm() {
		global $wgUser, $wgOut;
		$sk =& $wgUser->getSkin();

		$nuke = Title::makeTitle( NS_SPECIAL, 'Nuke' );
		$submit = Xml::element( 'input', array( 'type' => 'submit', 'value' => wfMsgHtml( 'nuke-submit-user' ) ) );

		$wgOut->addWikiText( wfMsg( 'nuke-tools' ) );
		$wgOut->addHTML( Xml::element( 'form', array(
				'action' => $nuke->getLocalURL( 'action=submit' ),
				'method' => 'post' ),
				null ) .
			Xml::element( 'input', array(
				'type' => 'text',
				'size' => 40,
				'name' => 'target' ) ) .
			"\n$submit\n" );

		$wgOut->addHTML( "</form>" );
	}

	function listForm( $username, $reason ) {
		global $wgUser, $wgOut, $wgLang;

		$pages = $this->getNewPages( $username );
		$escapedName = wfEscapeWikiText( $username );
		if( count( $pages ) == 0 ) {
			$wgOut->addWikiText( wfMsg( 'nuke-nopages', $escapedName ) );
			return $this->promptForm();
		}
		$wgOut->addWikiText( wfMsg( 'nuke-list', $escapedName ) );

		$nuke = $this->getTitle();
		$submit = Xml::element( 'input', array( 'type' => 'submit', 'value' => wfMsgHtml( 'nuke-submit-delete' ) ) );

		$wgOut->addHTML( Xml::element( 'form', array(
			'action' => $nuke->getLocalURL( 'action=delete' ),
			'method' => 'post' ),
			null ) .
			"\n<div>" .
			wfMsgHtml( 'deletecomment' ) . ': ' .
			Xml::element( 'input', array(
				'name' => 'wpReason',
				'value' => $reason,
				'size' => 60 ) ) .
			"</div><br />" .
			$submit .
			Xml::element( 'input', array(
				'type' => 'hidden',
				'name' => 'wpEditToken',
				'value' => $wgUser->editToken() ) ) .
			"\n<ul>\n" );

		$sk =& $wgUser->getSkin();
		foreach( $pages as $info ) {
			list( $title, $edits ) = $info;
			$wgOut->addHTML( '<li>' .
				Xml::element( 'input', array(
					'type' => 'checkbox',
					'name' => "pages[]",
					'value' => $title->getPrefixedDbKey(),
					'checked' => 'checked' ) ) .
				'&nbsp;' .
				$sk->makeKnownLinkObj( $title ) .
				'&nbsp;(' .
				$sk->makeKnownLinkObj( $title, wfMsgExt( 'nchanges', array( 'parsemag' ), $wgLang->formatNum( $edits ) ), 'action=history' ) .
				")</li>\n" );
		}
		$wgOut->addHTML( "</ul>\n$submit</form>" );
	}

	function getNewPages( $username ) {
		$dbr =& wfGetDB( DB_SLAVE );
		$result = $dbr->select( array( 'recentchanges', 'revision' ),
			array( 'rc_namespace', 'rc_title', 'rc_timestamp', 'COUNT(rev_id) AS edits' ),
			array(
				'rc_user_text' => $username,
				'rc_new' => 1,
				'rc_cur_id=rev_page' ),
			__METHOD__,
			array(
				'ORDER BY' => 'rc_timestamp DESC',
				'GROUP BY' => $dbr->implicitGroupby() ? 'rev_page' : 'rc_namespace, rc_title, rc_timestamp'
			) );
		$pages = array();
		while( $row = $dbr->fetchObject( $result ) ) {
			$pages[] = array( Title::makeTitle( $row->rc_namespace, $row->rc_title ), $row->edits );
		}
		$dbr->freeResult( $result );
		return $pages;
	}

	function doDelete( $pages, $reason ) {
		foreach( $pages as $page ) {
			$title = Title::newFromUrl( $page );
			$article = new Article( $title );
			$article->doDelete( $reason );
		}
	}
}
