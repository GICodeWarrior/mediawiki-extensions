<?php
/**
 * Protect against register_globals vulnerabilities.
 * This line must be present before any global variable is referenced.
 */
if( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is an extension to the MediaWiki software and is not a valid access point.\n" );
}

$wgHooks['ArticleSaveComplete'][] = 'wfInviteFriendToEdit';
$wgHooks['ArticleInsertComplete'][] = 'wfCreateOpinionCheck';
$wgHooks['OutputPageBeforeHTML'][] = 'wfInviteRedirect';

function wfInviteFriendToEdit( &$article, &$user, &$text, &$summary, &$minoredit, &$watchthis, &$sectionanchor, &$flags ) {
	if( !$flags & EDIT_NEW ) {
		// Increment edits for this page by one (for this user's session)
		$edits_views = $_SESSION['edits_views'];
		$page_edits_views = $edits_views[$article->getID()];
		$edits_views[$article->getID()] = ( $page_edits_views + 1 );

		$_SESSION['edits_views'] = $edits_views;
	}
	return true;
}

function wfCreateOpinionCheck( &$article, &$user, &$text, &$summary, &$minoredit, &$watchthis, &$sectionanchor, &$flags ) {
	global $wgTitle, $wgSendNewArticleToFriends;

	if( $wgSendNewArticleToFriends ) {
		// If the user has created a new opinion, we want to turn on a session flag
		$dbr = wfGetDB( DB_MASTER );
		$res = $dbr->select(
			'categorylinks',
			array( 'cl_to' ),
			array( 'cl_from' => $wgTitle->getArticleID() ),
			__METHOD__
		);
		foreach ( $res as $row ) {
			// @todo FIXME: this sucks, is way too site-specific and probably
			// strtoupper() doesn't play well with languages that have funny
			// characters (German, Finnish, French...) so we need to use some
			// Language method
			if( strtoupper( $row->cl_to ) == 'OPINIONS' ) {
				$_SESSION['new_opinion'] = $wgTitle->getText();
			}
		}
	}
	return true;
}

function wfInviteRedirect() {
	global $wgOut, $wgSendNewArticleToFriends;
	if( $wgSendNewArticleToFriends ) {
		if( isset( $_SESSION['new_opinion'] ) ) {
			$invite = SpecialPage::getTitleFor( 'EmailNewArticle' );
			$wgOut->redirect( $invite->getFullURL( '&page=' . $_SESSION['new_opinion'] ) );
			unset( $_SESSION['new_opinion'] );
		}
	}
}