<?php
class SpecialAdManagerZones extends SpecialPage {
	
	function __construct() {
		global $wgVersion;
		parent::__construct( 'AdManagerZones' );		
		if ( version_compare( $wgVersion, '1.16', '<' ) ) {
			wfLoadExtensionMessages( 'AdManager' );
		}
	}

	function execute( $query ) {
		global $wgUser, $wgOut, $wgDBprefix;
		if ( ! $wgUser->isAllowed( 'admanager' ) ) {
			$wgOut->permissionRequired( 'admanager' );
			return;
		}		

		$this->setHeaders();
		if ( method_exists( $wgOut, 'addModuleStyles' ) &&
			 !is_null( $wgOut->getResourceLoader()->getModule( 'mediawiki.special' ) ) ) {
			$wgOut->addModuleStyles( 'mediawiki.special' );
		}
		
		$fullTableName = $wgDBprefix . AD_ZONES_TABLE;
		$dbr = wfGetDB( DB_SLAVE );
		if ( AdManagerUtils::checkForAndDisplayError( $dbr->tableExists( $fullTableName ), 'admanager_notable' ) ) {
			return;
		}
		
		$this->doSpecialAdManagerZones();
	}
	
	function doSpecialAdManagerZones() {
		global $wgRequest;
		$errors = array();
		
		if ( $wgRequest->getCheck( 'submitted' ) ) {
			$this->zones = explode( "\n", trim( $wgRequest->getVal( 'zones' ) ) );
			foreach ($this->zones as $zone) {
				$zone = trim( $zone );
				if ( !is_numeric( $zone ) ) {
					$errors['admanager_zonenotnumber'][] = $zone;
				}
			}
			if ( empty( $errors ) ) {
				$this->addZones();
			}
		}
			
		$this->showForm( $errors );		
	}
	function addZones() {
		global $wgOut, $wgRequest, $wgDBprefix;
		
		$zones = $this->zones;

		$dbw = wfGetDB( DB_MASTER );	
		$fullTableName = $wgDBprefix . AD_ZONES_TABLE;
		
		$dbw->delete( $fullTableName, '*');
		$text = "<div class=\"successbox\">\n";
		foreach ( $zones as $zone ) {
			if ( $zone ) {
				$dbw->insert( 
					$fullTableName, array( 'ad_zone_id' => $zone )
				);
				$text .= "* " . wfmsg('admanager_addedzone') . " $zone";				
			}
		}
		$text .= "</div><br clear=\"both\" />";
		$wgOut->addWikiText( $text );
	}
	
	function showForm( array $errors ) {
		global $wgOut, $wgDBprefix;

		if ( empty( $errors ) ) {
			$wgOut->addWikiMsg( 'admanagerzones_docu' );
		} else {
			$text = "<div class=\"errorbox\">\n";
			foreach ( $errors as $message => $pageTitles ) {
				foreach ( $pageTitles as $pageTitle) {
					$text .= wfMsg( $message, $pageTitle ) . "<br />";
				}
			}
			$text .= "</div><br clear=\"both\" />";
			$wgOut->addWikiText( $text );
		}
		
		$fullTableName = $wgDBprefix . AD_ZONES_TABLE;	
		$dbr = wfGetDB( DB_SLAVE );
		$current = $dbr->select(
				$fullTableName,                                   
				array( '*' )
		);
		
		//Fetch current table into array
		$currentArray = Array();
		while ( $currentRow = $current->fetchObject() ) {
			$currentArray[] = $currentRow->ad_zone_id;
		}
		
		$display = ''; 
		foreach ($currentArray as $zone) {
			$display .= "$zone\n";
		}
		
		$text =	Xml::openElement( 'form', array( 'id' => 'admanagerzones', 'action' => $this->getTitle()->getFullUrl(), 'method' => 'post' ) ) . "\n" .
			AdManagerUtils::hiddenField( 'title', $this->getTitle()->getPrefixedText() ) .
			AdManagerUtils::hiddenField( 'submitted', 1 );
		$text .= Xml::textarea( 'zones' , $display, 25, 20, array( 'style' => 'width: auto; margin-bottom: 1em;' ) );
		$text .= Xml::element('br');
		$text .= Xml::submitButton( wfMsg( 'admanager_submit' ) );
		$text .= Xml::closeElement( 'form' );
		$text .= Xml::element('br');
		
		$wgOut->addHTML( $text );
		
		$wgOut->addWikiMsg( 'admanager_gotoads' );
	}
}