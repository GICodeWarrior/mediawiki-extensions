<?php

/**
 * Class definition file for the Newest Pages extension
 * This doesn't use recent changes so the items don't expire
 *
 * @package MediaWiki
 * @subpackage Extensions
 * @author Rob Church <robchur@gmail.com>
 * @copyright © 2006 Rob Church
 * @licence GNU General Public Licence 2.0
 */

class NewestPages extends IncludableSpecialPage {

	var $limit = NULL;
	var $namespace = NULL;

	function NewestPages() {
		SpecialPage::SpecialPage( 'Newestpages', '', true, false, 'default', true );
	}

	function execute( $par ) {
		global $wgRequest, $wgOut, $wgContLang;
		
		# Decipher input passed to the page
		$this->decipherParams( $par );
		$this->setOptions( $wgRequest );
		
		# Don't show the navigation if we're including the page		
		if( !$this->mIncluding ) {
			$this->setHeaders();
			if( $this->namespace > 0 ) {
				$wgOut->addWikiText( wfMsg( 'newestpages-ns-header', $this->limit, $wgContLang->getFormattedNsText( $this->namespace ) ) );
			} else {
				$wgOut->addWikiText( wfMsg( 'newestpages-header', $this->limit ) );
			}
			$wgOut->addHtml( $this->makeNamespaceForm() );
			$wgOut->addHtml( $this->makeLimitLinks() );
		}

		$dbr =& wfGetDB( DB_SLAVE );
		$page = $dbr->tableName( 'page' );
		$nsf = $this->getNsFragment();
		$res = $dbr->query( "SELECT page_namespace, page_title FROM $page WHERE {$nsf} ORDER BY page_id DESC LIMIT 0,{$this->limit}" );
		$count = $dbr->numRows( $res );
		if( $count > 0 ) {
			# Make list
			if( !$this->mIncluding )
				$wgOut->addWikiText( wfMsg( 'newestpages-showing', $count ) );
			$wgOut->addHtml( "<ol>" );
			while( $row = $dbr->fetchObject( $res ) )
				$wgOut->addHtml( $this->makeListItem( $row ) );
			$wgOut->addHTML( "</ol>" );
		} else {
			$wgOut->addWikiText( wfMsg( 'newestpages-none' ) );
		}
		$dbr->freeResult( $res );			
	}

	function setOptions( &$req ) {
		global $wgNewestPagesLimit;
		if( !isset( $this->limit ) )
			$this->limit = $this->sanitiseLimit( $req->getInt( 'limit', $wgNewestPagesLimit ) );
		if( !isset( $this->namespace ) )
			$this->namespace = $this->extractNamespace( $req->getVal( 'namespace', -1 ) );
	}
	
	function sanitiseLimit( $limit ) {
		return min( (int)$limit, 5000 );
	}
	
	function decipherParams( $par ) {
		if( $par ) {
			$bits = explode( '/', $par );
			foreach( $bits as $bit ) {
				if( is_numeric( $bit ) ) {
					$this->limit = $this->sanitiseLimit( $bit );
				} else {
					$this->namespace = $this->extractNamespace( $bit );
				}
			}
		}
	}
	
	function extractNamespace( $namespace ) {
		global $wgContLang;
		if( is_numeric( $namespace ) ) {
			return $namespace;
		} elseif( $wgContLang->getNsIndex( $namespace ) !== false ) {
			return $wgContLang->getNsIndex( $namespace );
		} elseif( $namespace == '-' ) {
			return NS_MAIN;
		} else {
			return -1;
		}	
	}
	
	function getNsFragment() {
		$this->namespace = (int)$this->namespace;
		return $this->namespace > -1 ? "page_namespace = {$this->namespace}" : "page_namespace != 8";
	}
	
	function makeListItem( $row ) {
		global $wgUser;
		$title = Title::makeTitleSafe( $row->page_namespace, $row->page_title );
		if( !is_null( $title ) ) {
			$skin = $wgUser->getSkin();
			$link = $skin->makeKnownLinkObj( $title );
			return( "<li>{$link}</li>\n" );
		} else {
			return( "<!-- Invalid title " . htmlspecialchars( $row->page_title ) . " in namespace " . htmlspecialchars( $row->page_namespace ) . " -->\n" );
		}
	}

	function makeLimitLinks() {
		global $wgUser;
		$skin = $wgUser->getSkin();
		$title = Title::makeTitle( NS_SPECIAL, 'Newestpages' );
		$limits = array( 10, 20, 30, 50, 100, 150 );
		foreach( $limits as $limit ) {
			if( $limit != $this->limit ) {
				$links[] = $this->makeSelfLink( $limit, 'limit', $limit );
			} else {
				$links[] = (string)$limit;
			}
		}
		return( wfMsgHtml( 'newestpages-limitlinks', implode( ' | ', $links ) ) );
	}
	
	function makeSelfLink( $label, $oname = false, $oval = false ) {
		global $wgUser;
		$skin =& $wgUser->getSkin();
		$self = Title::makeTitle( NS_SPECIAL, $this->getName() );
		$attr['limit'] = $this->limit;
		$attr['namespace'] = $this->namespace;
		if( $oname )
			$attr[$oname] = $oval;
		foreach( $attr as $aname => $aval )
			$attribs[] = "{$aname}={$aval}";
		return $skin->makeKnownLinkObj( $self, $label, implode( '&', $attribs ) );
	}
	
	function makeNamespaceForm() {
		$self = Title::makeTitle( NS_SPECIAL, $this->getName() );
		$form  = wfOpenElement( 'form', array( 'method' => 'post', 'action' => $self->getLocalUrl() ) );
		$form .= wfLabel( wfMsg( 'newestpages-namespace' ), 'namespace' ) . '&nbsp;';
		$form .= htmlNamespaceSelector( $this->namespace, 'all' );
		$form .= wfHidden( 'limit', $this->limit );
		$form .= wfSubmitButton( wfMsg( 'newestpages-submit' ) ) . '</form>';
		return $form;
	}
	
}

?>