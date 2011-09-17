<?php
/*
 * Register for Wikimania
 */
class SpecialRegisterForWikimania extends SpecialPage {
	public function __construct() {
		parent::__construct( 'RegisterForWikimania', 'wikimania-register' );
	}

	public function execute( $par = '' ) {
		$this->setHeaders();
		$this->getOutput->addHTML( '<p>Todo</p>' );
	}
}
