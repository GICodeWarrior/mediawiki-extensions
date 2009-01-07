<?php

// Special:Code
class CodeRepoListView {

	function execute() {
		global $wgOut;
		$repos = CodeRepository::getRepoList();
		if( !count( $repos ) ){
			$wgOut->addWikiMsg( 'code-no-repo' );
			return;
		}
		$text = '';
		foreach( $repos as $repo ){
			$name = $repo->getName();
			$text .= "* ".self::getNavItem( $name )."\n";
		}
		$wgOut->addWikiText( $text );
	}
	
	public static function getNavItem( $name ) {
		$text = "'''[[Special:Code/$name|$name]]''' (";
		$text .= "[[Special:Code/$name/comments|".wfMsgHtml( 'code-notes' )."]]";
		$text .= " | [[Special:Code/$name/tag|".wfMsgHtml( 'code-tags' )."]]";
		$text .= " | [[Special:Code/$name/author|".wfMsgHtml( 'code-authors' )."]]";
		$text .= ")";
		return $text;
	}
}

