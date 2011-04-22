<?php
/**
 * SpecialPage for ArticleFeedback extension
 * 
 * @file
 * @ingroup Extensions
 */

class SpecialArticleFeedback extends SpecialPage {

	/* Methods */

	public function __construct() {
		parent::__construct( 'ArticleFeedback' );
	}

	public function execute( $par ) {
		global $wgUser, $wgOut, $wgRequest;

		$this->setHeaders();
		$wgOut->addHtml( '<div class="articleFeedback-dashboard"><h2>Hello dashboard!</h2></div>' );
	}
}
