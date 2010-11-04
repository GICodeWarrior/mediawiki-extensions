<?php

class FlagPageTabInstaller {
	function insertTab( $skin, &$content_actions ) {
		global $wgTitle;
		if ( !$wgTitle->exists() ) {
			return false;
		}
		$linkParam = "page=" . $wgTitle->getPrefixedURL();
		$special = SpecialPage::getTitleFor( 'FlagPage' );
		$content_actions['flagpage'] = array(
			'class' => false,
			'text' => wfMsgHTML( 'flagpage-tab' ),
			'href' => $special->getLocalUrl( $linkParam ) );
		return true;
	}
}
