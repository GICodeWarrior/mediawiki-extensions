<?php

// Special:Code
class CodeRepoListView {

	function execute() {
		global $wgOut;
		$repos = CodeRepository::getRepoList();
		if ( !count( $repos ) ) {
			$wgOut->addWikiMsg( 'code-no-repo' );
			return;
		}
		$text = '';
		foreach ( $repos as $repo ) {
			$text .= "* " . self::getNavItem( $repo ) . "\n";
		}
		$wgOut->addWikiText( $text );
	}

	public static function getNavItem( $repo ) {
		global $wgLang, $wgUser;
		$name = $repo->getName();
		$links[] = "[[Special:Code/$name/comments|" . wfMsgHtml( 'code-notes' ) . "]]";
		$links[] = "[[Special:Code/$name/statuschanges|" . wfMsgHtml( 'code-statuschanges' ) . "]]";
		if ( $wgUser->getId() ) {
			$author = $repo->wikiUserAuthor( $wgUser->getName() );
			if ( $author !== false ) {
				$links[] = "[[Special:Code/$name/author/$author|" . wfMsgHtml( 'code-mycommits' ) . "]]";
			}
		}
		$links[] = "[[Special:Code/$name/tag|" . wfMsgHtml( 'code-tags' ) . "]]";
		$links[] = "[[Special:Code/$name/author|" . wfMsgHtml( 'code-authors' ) . "]]";
		$links[] = "[[Special:Code/$name/status|" . wfMsgHtml( 'code-status' ) . "]]";
		$links[] = "[[Special:Code/$name/releasenotes|" . wfMsgHtml( 'code-releasenotes' ) . "]]";
		$links[] = "[[Special:Code/$name/stats|" . wfMsgHtml( 'code-stats' ) . "]]";
		if( $wgUser->isAllowed( 'repoadmin' ) ) {
			$links[] = "[[Special:RepoAdmin/$name|" . wfMsgHtml( 'repoadmin-nav' ) . "]]";
		}
		$text = "'''[[Special:Code/$name|$name]]''' " . wfMsg( 'parentheses', $wgLang->pipeList( $links ) );
		return $text;
	}
}
