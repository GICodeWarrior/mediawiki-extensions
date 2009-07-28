<?php

class SpecialIndex extends UnlistedSpecialPage {
	function __construct() {
		parent::__construct( 'Index' );
		wfLoadExtensionMessages('IndexFunction');
	}
 
	function execute( $par ) {
		global $wgOut;
 
		$this->setHeaders();
		if ($par) {
			$t1 = Title::newFromText( $par );
			$this->showDabPage( $t1 );
		} else { 		
			$wgOut->addWikiMsg( 'index-missing-param' );
		}
		# Will eventually be some sort of a search form
		
		//$form = Xml::openElement( 'fieldset' ) . 
		//	Xml::element( 'legend', array(), wfMsgHtml( 'index-legend' ) ) . 
		//	Xml::openElement( 'form', array( 'method'=>'GET' ) ) .

		//	Xml::label( wfMsg( 'index-search' ), 'mw-index-searchtext' ) .
		//	Xml::input( 'searchtext', 100, false, array( 'id' => 'mw-index-searchtext' ) ) . 
		//	'<br />' . 
		//	Xml::submitButton( wfMsg( 'index-submit' ) ) .
	
		//	Xml::closeElement( 'form' ) . 
		//	Xml::closeElement( 'fieldset' );		

		//$wgOut->addHTML( $form );

	}
	
	function showDabPage( Title $t1 ) {
		global $wgOut, $wgUser, $wgSpecialIndexContext;
		$sk = $wgUser->getSkin();
		$wgOut->setPagetitle( $t1->getPrefixedText() );
		$dbr = wfGetDB( DB_SLAVE );
		$pages = $dbr->select( array('page', 'indexes'),
			array( 'page_id', 'page_namespace', 'page_title' ),
			array( 'in_namespace'=>$t1->getNamespace(), 'in_title'=>$t1->getDBkey() ),
			__METHOD__, 
			array('ORDER BY'=> 'page_namespace, page_title'),
			array( 'indexes' => array('JOIN', 'in_from=page_id') )
		);
		
		$list = array();
		foreach( $pages as $row ) {
			$t = Title::newFromRow( $row );
			$list[strval($row->page_id)] = array( 'title' => $t, 'cats' => array() );
		}
		if (count($list) == 0) {
			$wgOut->addWikiMsg( 'index-emptylist', $t1->getPrefixedText() );
			return;
		} elseif (count($list) == 1) {
			$target = reset( $list );
			$wgOut->redirect( $target['title']->getLocalURL() );
		} 
		$wgOut->addWikiMsg( 'index-disambig-start', $t1->getPrefixedText() );
		$keys = array_keys( $list );
		$set = '(' . implode(',', $keys) . ')';
		
		$exclude = wfMsg('index-exclude-categories');
		$excludecats = array();
		if ($exclude) {
			$exclude = explode( '\n', $exclude );
			foreach( $exclude as $cat ) {
				if (!$cat) {
					continue;
				}
				$cat = Title::newFromText( $cat, NS_CATEGORY );
				if ( !is_null($cat) ) {
					$excludecats[] = $dbr->addQuotes( $cat->getDBkey() );
				}
			}
			$excludecats = 'AND cl_to NOT IN (' . implode(',', $excludecats) . ')';
		} else {
			$excludecats = '';
		}
		
		$categories = $dbr->select( 'categorylinks',
			array('cl_from', 'cl_to'),
			"cl_from IN $set $excludecats",
			__METHOD__,
			array('ORDER BY' => 'cl_from')
		);
		$groups = array();
		$catlist = array();
		foreach( $categories as $row ) {
			$ct = Title::newFromText( $row->cl_to, NS_CATEGORY );
			$textform = $ct->getText();
			$list[strval($row->cl_from)]['cats'][] = $textform;
			if ( array_key_exists( $textform, $catlist ) ) {
				$catlist[$textform][] = strval($row->cl_from);
			} else {
				$catlist[$textform] = array ( strval($row->cl_from) );
			}
		}
		if (count($catlist) > 2) {
			while (true) {
				arsort($catlist);
				$group = reset( $catlist );
				if (count($group) == 0) {
					break;
				}
				$keys = array_keys($catlist, $group);
				$heading = $keys[0];
				$grouphtml = Xml::element('h2', null, $heading);
				$grouphtml .= Xml::openElement( 'ul' );
				foreach( $group as $pageid ) {
					$t = $list[$pageid]['title'];
					$cats = $list[$pageid]['cats'];					
					$grouphtml .= $this->makeContextLine( $t, $cats );					
					unset( $list[$pageid] );
					ksort($list);
					foreach($catlist as $remaining) {
						$key = array_search( $pageid, $remaining );
						if ( $key !== false ) {
							$masterkeys = array_keys($catlist, $remaining);
							$heading = $masterkeys[0];
							unset($catlist[$heading][$key]);
							sort($catlist[$heading]);
						}
					}
				}
				$grouphtml .= Xml::closeElement( 'ul' );
				$groups[] = $grouphtml;
				unset( $catlist[$heading] );
				if (count($catlist) == 0) {
					break;
				}		
			}
			if (count($list) != 0) { //Pages w/ no cats
				$grouphtml = Xml::openElement( 'ul' );
				foreach( $list as $pageid => $info ) {
					$grouphtml .= $this->makeContextLine( $info['title'], array() );
				}
				$grouphtml .= Xml::closeElement('ul');
				$groups = array_merge( array($grouphtml), $groups);
			}
			$out = implode( "\n", $groups );
		} else {
			$out = Xml::openElement( 'ul' );
			foreach( $list as $pageid => $info ) {
				$out .= $this->makeContextLine( $info['title'], $info['cats'] );
			}
			$out .= Xml::closeElement('ul');
		}
		
		$wgOut->addHtml($out);
	}
	
	private function makeContextLine( $title, $cats ) {
		global $wgUser, $wgSpecialIndexContext;
		$sk = $wgUser->getSkin();
		$link = $sk->link( $title, null, array(), array(), array( 'known', 'noclasses' ) );
		if ( $wgSpecialIndexContext == 'extract' ) {
			$extracter = new IndexAbstracts();
			$text = $extracter->getExtract( $title );
			if ( $text != '' ) {
				if ( stripos( $text, $title->getPrefixedText() ) !== false ) {
					$search = preg_quote( $title->getPrefixedText(), '/' );
					$line = preg_replace( "/$search/i", $link, $text, 1 );
				} else {
					$line = $link . '&nbsp;&ndash&nbsp;' . $text;
				}
			} else {
				$line = $link;
			}
			$line = Xml::tags( 'li', array(), $line );
		} elseif ( $wgSpecialIndexContext == 'categories' ) {
			if ( $cats ) {
				$line = $link . '&nbsp;&ndash&nbsp;' . implode( ', ', $cats );
				$line = Xml::tags( 'li', array(), $line );
			} else {
				$line = Xml::tags( 'li', array(), $link );
			}
		} else {
			$line = Xml::tags( 'li', array(), $link );
		}
		return $line;
	}
	
}

