<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "Special404 extension\n";
	exit( 1 );
}

class Special404 extends UnlistedSpecialPage {
	
	public function __construct() {
		parent::__construct('Error404');
	}
	
	public function execute( $par ) {
		global $wgOut, $wgRequest, $egSpecial404RedirectExistingRoots;
		
		if ( $egSpecial404RedirectExistingRoots ) {
			$t = Title::newFromText($wgRequest->getRequestURL());
			if ( !is_object($t) || !$t->exists() ) {
				$t = Title::newFromText(trim($wgRequest->getRequestURL(), '/\\'));
			}
			if ( is_object($t) && $t->exists() ) {
				$wgOut->redirect( $t->getFullURL(), 301 );
				return;
			}
		}
		
		$this->setHeaders();
		$wgOut->setStatusCode( 404 );
		$wgOut->addWikiMsg( 'special404-body', trim($wgRequest->getRequestURL(), '/\\') );
		
	}
	
}
