<?php

/**
 * Page to manage LiveTranslate translation memories.
 * 
 * @since 0.4
 * 
 * @file SpecialLiveTranslate.php
 * @ingroup LiveTranslate
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialLiveTranslate extends SpecialPage {
	
	/**
	 * Map type numbers to messages.
	 * Messages are build by prepending "livetranslate-tmtype-" and then passing it to wfMsg or similar.
	 * 
	 * @since 0.4
	 * 
	 * @var array
	 */
	protected static $tmTypes = array(
		0 => 'ltf',
		1 => 'tmx',
		2 => 'gcsv',
	);
	
	/**
	 * Constructor.
	 * 
	 * @since 0.4
	 */
	public function __construct() {
		parent::__construct( 'LiveTranslate', 'managetms' );
	}
	
	/**
	 * @see SpecialPage::getDescription
	 * 
	 * @since 0.4
	 */
	public function getDescription() {
		return wfMsg( 'special-' . strtolower( $this->mName ) );
	}
	
	/**
	 * Sets headers - this should be called from the execute() method of all derived classes!
	 * 
	 * @since 0.4
	 */
	public function setHeaders() {
		global $wgOut;
		$wgOut->setArticleRelated( false );
		$wgOut->setRobotPolicy( "noindex,nofollow" );
		$wgOut->setPageTitle( $this->getDescription() );
	}	
	
	/**
	 * Main method.
	 * 
	 * @since 0.4
	 * 
	 * @param string $arg
	 */
	public function execute( $arg ) {
		global $wgOut, $wgUser, $wgRequest, $egPushTargets;
		
		$this->setHeaders();
		$this->outputHeader();
		
		// If the user is authorized, display the page, if not, show an error.
		if ( !$this->userCanExecute( $wgUser ) ) {
			$this->displayRestrictionError();
			return;
		} 
		
		// TODO
	}
	
}
