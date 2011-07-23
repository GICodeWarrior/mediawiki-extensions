<?php

// Special:Code/MediaWiki/author/johndoe/link

class CodeRevisionAuthorLink extends CodeRevisionAuthorView {
	function __construct( $repo, $author ) {
		global $wgRequest;
		parent::__construct( $repo, $author );
		$this->mTarget = $wgRequest->getVal( 'linktouser' );
	}

	function getTitle() {
		$repo = $this->mRepo->getName();
		$auth = $this->mAuthor;
		return SpecialPage::getTitleFor( 'Code', "$repo/author/$auth/link" );
	}

	function execute() {
		global $wgOut, $wgRequest, $wgUser;
		if ( !$wgUser->isAllowed( 'codereview-link-user' ) ) {
			$wgOut->permissionRequired( 'codereview-link-user' );
			return;
		}
		if ( $wgRequest->wasPosted() ) {
			$this->doSubmit();
		} else {
			$this->doForm();
		}
	}

	function doForm() {
		global $wgOut, $wgUser;
		$form = Xml::openElement( 'form', array( 'method' => 'post',
			'action' => $this->getTitle()->getLocalUrl(),
			'name' => 'uluser', 'id' => 'mw-codeauthor-form1' ) );

		$form .= Html::hidden( 'linktoken', $wgUser->editToken( 'link' ) );
		$form .= Xml::openElement( 'fieldset' );

		$additional = '';
		// Is there already a user linked to this author?
		if ( $this->mUser ) {
			$form .= Xml::element( 'legend', array(), wfMsg( 'code-author-alterlink' ) );
			$additional = Xml::openElement( 'fieldset' ) .
				Xml::element( 'legend', array(), wfMsg( 'code-author-orunlink' ) ) .
				Xml::submitButton( wfMsg( 'code-author-unlink' ), array( 'name' => 'unlink' ) ) .
				Xml::closeElement( 'fieldset' );
		} else {
			$form .= Xml::element( 'legend', array(), wfMsg( 'code-author-dolink' ) );
		}

		$form .= Xml::inputLabel( wfMsg( 'code-author-name' ), 'linktouser', 'username', 30, '' ) . ' ' .
				Xml::submitButton( wfMsg( 'ok' ), array( 'name' => 'newname' ) ) .
				Xml::closeElement( 'fieldset' ) .
				$additional .
				Xml::closeElement( 'form' ) . "\n";

		$wgOut->addHTML( $this->linkStatus() . $form );
	}

	function doSubmit() {
		global $wgOut, $wgRequest, $wgUser;
		// Link an author to a wiki user

		if ( !$wgUser->matchEditToken( $wgRequest->getVal( 'linktoken' ), 'link' ) ) {
			$wgOut->addWikiMsg( 'code-author-badtoken' );
			return;
		}

		if ( strlen( $this->mTarget ) && $wgRequest->getCheck( 'newname' ) ) {
			$user = User::newFromName( $this->mTarget, false );
			if ( !$user || !$user->getId() ) {
				$wgOut->addWikiMsg( 'nosuchusershort', $this->mTarget );
				return;
			}
			$this->mRepo->linkUser( $this->mAuthor, $user );
			$userlink = $this->skin->userLink( $user->getId(), $user->getName() );
			$wgOut->addHTML(
				'<div class="successbox">' .
				wfMsgHtml( 'code-author-success', $this->authorLink( $this->mAuthor ), $userlink ) .
				'</div>'
			);
		// Unlink an author to a wiki users
		} elseif ( $wgRequest->getVal( 'unlink' ) ) {
			if ( !$this->mUser ) {
				$wgOut->addHTML( wfMsg( 'code-author-orphan', $this->authorLink( $this->mAuthor ) ) );
				return;
			}
			$this->mRepo->unlinkUser( $this->mAuthor );
			$wgOut->addHTML(
				'<div class="successbox">' .
				wfMsgHtml( 'code-author-unlinksuccess', $this->authorLink( $this->mAuthor ) ) .
				'</div>'
			);
		}
	}
}
