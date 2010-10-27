<?php

/*
* 
* We need to overload the special page constructor to initialize our own data also if we want to change the behavior of the SpecialPage class itself. 
* it will execute when called from the child class
* 
*/

class WikiBhasha extends SpecialPage {

	/**
	 * Constructor
	 */
	function __construct() {
		parent::SpecialPage( 'WikiBhasha', '', true );
	}

	/**
	 * Main execution function
	 * @param $par Parameters passed to the page
	 */
	function execute( $par ) {
		global $wgOut;
		$this->setHeaders();
		$wgOut->addHTML( '<h2>message goes here</h2>' );
	}
}
