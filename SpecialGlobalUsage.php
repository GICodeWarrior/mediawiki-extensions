<?php
/**
 * Special page to show global file usage. Also contains hook functions for
 * showing usage on an image page.
 */

class SpecialGlobalUsage extends SpecialPage {
	public function __construct() {
		parent::__construct( 'GlobalUsage', 'globalusage' );

		wfLoadExtensionMessages( 'globalusage' );
	} 

	/**
	 * Entry point
	 */
	public function execute( $par ) {
		global $wgOut, $wgRequest;

		$target = $par ? $par : $wgRequest->getVal( 'target' );
		$this->target = Title::makeTitleSafe( NS_FILE, $target );

		$this->filterLocal = $wgRequest->getCheck( 'filterlocal' );

		$this->setHeaders();

		$this->showForm();

		if ( is_null( $this->target ) )
		{
			$wgOut->setPageTitle( wfMsg( 'globalusage' ) );
			return;
		}

		$wgOut->setPageTitle( wfMsg( 'globalusage-for', $this->target->getPrefixedText() ) );

		$this->showResult();
	}
	
	/**
	 * Shows the search form
	 */
	private function showForm() {
		global $wgScript, $wgOut;

		$html = Xml::openElement( 'form', array( 'action' => $wgScript ) ) . "\n";
		// Name of SpecialPage
		$html .= Xml::hidden( 'title', $this->getTitle()->getPrefixedText() ) . "\n";
		// Input box with target prefilled if available
		$formContent = "\t" . Xml::input( 'target', 40, is_null( $this->target ) ? ''
					: $this->target->getText() )
		// Submit button
			. "\n\t" . Xml::element( 'input', array(
					'type' => 'submit',
					'value' => wfMsg( 'globalusage-ok' )
					) )
		// Filter local checkbox
			. "\n\t<p>" . Xml::checkLabel( wfMsg( 'globalusage-filterlocal' ),
					'filterlocal', 'mw-filterlocal', $this->filterLocal ) . '</p>';
		
		if ( !is_null( $this->target ) && wfFindFile( $this->target ) ) {
			// Show the image if it exists
			global $wgUser, $wgContLang;
			$skin = $wgUser->getSkin();

			$html .= $skin->makeImageLinkObj( $this->target,
					$this->target->getPrefixedText(),
					/* $alt */ '', /* $align */ $wgContLang->alignEnd(),
					/* $handlerParams */ array(), /* $framed */ false,
					/* $thumb */ true );
		}
		
		// Wrap the entire form in a nice fieldset
		$html .= Xml::fieldSet( wfMsg( 'globalusage-text' ), $formContent ) . "\n</form>";

		$wgOut->addHtml( $html );
	}

	/**
	 * Creates as queryer and executes it based on $wgRequest
	 */
	private function showResult() {
		global $wgRequest;

		$query = new GlobalUsageQuery( $this->target );

		// Extract params from $wgRequest
		if ( $wgRequest->getText( 'from' ) )
			$query->setOffset( $wgRequest->getText( 'from' ) );
		elseif ( $wgRequest->getText( 'to' ) )
			$query->setOffset( $wgRequest->getText( 'to' ), true );
		$query->setLimit( $wgRequest->getInt( 'limit', 50 ) );
		$query->filterLocal( $this->filterLocal );

		// Perform query
		$query->execute();

		// Show result
		global $wgOut;

		// Don't show form element if there is no data
		if ( $query->count() == 0 ) {
			$wgOut->addWikiMsg( 'globalusage-no-results', $this->target->getPrefixedText() );
			return;
		}

		$offset = $query->getOffsetString();
		$navbar = $this->getNavBar( $query );
		$targetName = $this->target->getText();

		// Top navbar
		$wgOut->addHtml( $navbar );

		$wgOut->addHtml( '<div id="mw-globalusage-result">' );
		foreach ( $query->getSingleImageResult() as $wiki => $result ) {
			$wgOut->addHtml(
					'<h2>' . wfMsgExt(
						'globalusage-on-wiki', 'parseinline',
						$targetName, WikiMap::getWikiName( $wiki ) )
					. "</h2><ul>\n" );
			foreach ( $result as $item )
				$wgOut->addHtml( "\t<li>" . self::formatItem( $item ) . "</li>\n" );
			$wgOut->addHtml( "</ul>\n" );
		}
		$wgOut->addHtml( '</div>' );

		// Bottom navbar
		$wgOut->addHtml( $navbar );
	}
	/**
	 * Helper to format a specific item
	 */
	private static function formatItem( $item ) {
		if ( !$item['namespace'] )
			$page = $item['title'];
		else
			$page = "{$item['namespace']}:{$item['title']}";

		return WikiMap::makeForeignLink( $item['wiki'], $page,
				str_replace( '_', ' ', $page ) );
	}


	private static $queryCache = array();
	/**
	 * Get an executed query for use on image pages
	 * 
	 * @param Title $title File to query for
	 * @return GlobalUsageQuery Query object, already executed
	 */
	private static function getImagePageQuery( $title ) {
		$name = $title->getDBkey();
		if ( !isset( self::$queryCache[$name] ) ) {
			$query = new GlobalUsageQuery( $title );
			$query->filterLocal();
			$query->execute();
			
			self::$queryCache[$name] = $query;
			
			// Limit cache size to 100
			if ( count( self::$queryCache ) > 100 )
				array_shift( self::$queryCache );
		}
		
		return self::$queryCache[$name];
	} 
	
	/**
	 * Show a global usage section on the image page
	 */
	public static function onImagePageAfterImageLinks( $imagePage, &$html ) {
		if ( !self::hasResults( $imagePage ) )
			return true;
				
		$title = $imagePage->getFile()->getTitle();
		$targetName = $title->getText();

		$query = self::getImagePageQuery( $title );

		$guHtml = '';
		foreach ( $query->getSingleImageResult() as $wiki => $result ) {
			$guHtml .= '<li>' . wfMsgExt( 
					'globalusage-on-wiki', 'parseinline',
					$targetName, WikiMap::getWikiName( $wiki ) ) . "\n<ul>";
			foreach ( $result as $item )
				$guHtml .= "\t<li>" . self::formatItem( $item ) . "</li>\n";
			$guHtml .= "</ul></li>\n";
		}

		if ( $guHtml ) {
			$html .= '<h2 id="globalusage">' . wfMsgHtml( 'globalusage' ) . "</h2>\n"
				. wfMsgExt( 'globalusage-of-file', 'parse' )
				. "<ul>\n" . $guHtml . "</ul>\n";
			if ( $query->hasMore() )
				$html .= wfMsgExt( 'globalusage-more', 'parse', $targetName );
		}


		return true;
	}

	/**
	 * Show a link to the global image links in the TOC if there are any results available.
	 */
	public static function onImagePageShowTOC( $imagePage, &$toc ) {
		if ( self::hasResults( $imagePage ) )
			$toc[] = '<li><a href="#globalusage">' . wfMsgHtml( 'globalusage' ) . '</a></li>';
		return true;
	}
	
	/**
	 * Check whether there are results for an image page. Checks whether the 
	 * file exists and is not local.
	 * 
	 * @param $imagePage ImagePage
	 * @return bool
	 */
	protected static function hasResults( $imagePage ) {
		$file = $imagePage->getFile();
		if ( !$file->exists() || $file->getRepoName() == 'local' )
			return false;
		
		$query = self::getImagePageQuery( $imagePage->getFile()->getTitle() );
		return (bool)$query->getResult();
	}

	/**
	 * Helper function to create the navbar, stolen from wfViewPrevNext
	 * 
	 * @param $query GlobalUsageQuery An executed GlobalUsageQuery object
	 * @return string Navbar HTML
	 */
	protected function getNavBar( $query ) {
		global $wgLang, $wgUser;

		$skin = $wgUser->getSkin();

		$target = $this->target->getText();
		$limit = $query->getLimit();
		$fmtLimit = $wgLang->formatNum( $limit );
	
		# Find out which strings are for the prev and which for the next links
		$offset = $query->getOffsetString();
		$continue = $query->getContinueString();
		if ( $query->isReversed() ) {
			$from = $offset;
			$to = $continue;
		} else {
			$from = $continue;
			$to = $offset;
		}

		# Get prev/next link display text
		$prev =  wfMsgExt( 'prevn', array('parsemag','escape'), $fmtLimit );
		$next =  wfMsgExt( 'nextn', array('parsemag','escape'), $fmtLimit );
		# Get prev/next link title text
		$pTitle = wfMsgExt( 'prevn-title', array('parsemag','escape'), $fmtLimit );
		$nTitle = wfMsgExt( 'nextn-title', array('parsemag','escape'), $fmtLimit );

		# Fetch the title object
		$title = $this->getTitle();

		# Make 'previous' link
		if ( $to ) {
			$attr = array( 'title' => $pTitle, 'class' => 'mw-prevlink' );
			$q = array( 'limit' => $limit, 'to' => $to, 'target' => $target );
			$plink = $skin->link( $title, $prev, $attr, $q );
		} else { 
			$plink = $prev;
		}

		# Make 'next' link
		if ( $from ) {
			$attr = array( 'title' => $nTitle, 'class' => 'mw-nextlink' );
			$q = array( 'limit' => $limit, 'from' => $from, 'target' => $target );
			$nlink = $skin->link( $title, $next, $attr, $q );
		} else {
			$nlink = $next;
		}

		# Make links to set number of items per page
		$numLinks = array();
		foreach ( array( 20, 50, 100, 250, 500 ) as $num ) {
			$fmtLimit = $wgLang->formatNum( $num );
			
			$q = array( 'offset' => $offset, 'limit' => $num, 'target' => $target );
			$lTitle = wfMsgExt( 'shown-title', array( 'parsemag', 'escape' ), $num );			
			$attr = array( 'title' => $lTitle, 'class' => 'mw-numlink' );

			$numLinks[] = $skin->link( $title, $fmtLimit, $attr, $q ); 
		}
		$nums = $wgLang->pipeList( $numLinks );

		return wfMsgHtml( 'viewprevnext', $plink, $nlink, $nums );
	}
}

