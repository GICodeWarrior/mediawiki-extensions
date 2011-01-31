<?php

/**
 * Special page to direct the user to a random page in specified category
 *
 * @ingroup SpecialPage
 */
class RandomPageInCategory extends SpecialPage {
	private $category = null;

	function __construct() {
		parent::__construct( 'RandomInCategory' );
	}

	function getDescription() {
		return wfMsg( 'randomincategory' );
	}

	function execute( $par ) {
		global $wgOut, $wgRequest;

		$this->setHeaders();
		if( is_null( $par ) ) {
			if ( $requestCategory = $wgRequest->getVal( 'category' ) ) {
				$par = $requestCategory;
			} else {
				$wgOut->addHTML( $this->getForm() );
				return;
			}
		}

		$rnd = $this;
		if( !$rnd->setCategory( $par ) ) {
			$wgOut->addHTML( $this->getForm( $par ) );
			return;
		}

		$title = $rnd->getRandomTitle();

		if( is_null( $title ) ) {
			$wgOut->addWikiText( wfMsg( 'randomincategory-nocategory', $par ) );
			$wgOut->addHTML( $this->getForm( $par ) );
			return;
		}

		wfReportTime(); #FIXME: this does nothing?
		$wgOut->redirect( $title->getFullUrl() );
	}

	public function getCategory ( ) {
		return $this->namespace;
	}

	public function setCategory ( $cat ) {
		$category = Title::makeTitleSafe( NS_CATEGORY, $cat );
		//Invalid title
		if( !$category ) {
			return false;
		}
		$this->category = $category->getDBkey();
		return true;
	}

	/**
	 * Choose a random title. Based on Special:Random
	 * @return Title object (or null if nothing to choose from)
	 */
	public function getRandomTitle ( ) {
		$randstr = wfRandom();
		$row = $this->selectRandomPageFromDB( $randstr );

		if( !$row ) {
			$row = $this->selectRandomPageFromDB( "0" );
		}

		if( $row ) {
			return Title::newFromText( $row->page_title, $row->page_namespace );
		} else {
			return null;
		}
	}

	private function selectRandomPageFromDB ( $randstr ) {
		global $wgExtraRandompageSQL, $wgOut;

		$dbr = wfGetDB( DB_SLAVE );

		if ( $wgExtraRandompageSQL ) {
			$this->extra[] = $wgExtraRandompageSQL;
		}

		$res = $dbr->select(
			array( 'page', 'categorylinks' ),
			array( 'page_title', 'page_namespace' ),
			array_merge( array(
				'page_namespace' != NS_CATEGORY,
				'cl_to' => $category,
				'page_random >= ' . $randstr
			), $this->extra ),
			__METHOD__,
			array(
				'ORDER BY' => 'page_random',
				'USE INDEX' => 'page_random'
			),
			array(
				'categorylinks' => array(
					'JOIN' => array( 'page_id=cl_from' )
				)
			)
		);

		return $dbr->fetchObject( $res );
	}

	public function getForm( $par = null ) {
		global $wgScript, $wgRequest;

		if( !( $category = $par ) ) {
			$category = $wgRequest->getVal( 'category' );
		}

		$f =
			Xml::openElement( 'form', array( 'method' => 'get', 'action' => $wgScript ) ) .
				Xml::openElement( 'fieldset' ) .
					Xml::element( 'legend', array(), wfMsg( 'randomincategory' ) ) .
					Xml::hidden( 'title', $this->getTitle()->getPrefixedText() ) .
					Xml::openElement( 'p' ) .
						Xml::label( wfMsg( 'randomincategory-label' ), 'category' ) . ' ' .
						Xml::input( 'category', null, $category, array( 'id' => 'category' ) ) . ' ' .
						Xml::submitButton( wfMsg( 'randomincategory-submit' ) ) .
					Xml::closeElement( 'p' ) .
				Xml::closeElement( 'fieldset' ) .
			Xml::closeElement( 'form' );
		return $f;
	}
}
