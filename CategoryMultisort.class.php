<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die();
}

class CategoryMultisortViewer extends CategoryViewer {

	function __construct( $title, $skn, $from = '', $until = '' ) {
		global $wgCategoryMultisortSortkeyNames;
		parent::__construct( $title, $from, $until );
		$this->sortkeyName = $skn;
		$this->sortkeySettings = $wgCategoryMultisortSortkeyNames[$skn];
	}
	
	function doCategoryQuery() {
		$dbr = wfGetDB( DB_SLAVE, 'category' );
		if ( $this->from != '' ) {
			$pageCondition = 'clms_sortkey >= ' . $dbr->addQuotes( $this->from );
			$this->flip = false;
		} elseif ( $this->until != '' ) {
			$pageCondition = 'clms_sortkey < ' . $dbr->addQuotes( $this->until );
			$this->flip = true;
		} else {
			$pageCondition = '1 = 1';
			$this->flip = false;
		}

		$res = $dbr->select(
			array( 'page', 'categorylinks_multisort', 'category' ),
			array( 'page_title', 'page_namespace', 'page_len', 'page_is_redirect', 'clms_sortkey',
				'cat_id', 'cat_title', 'cat_subcats', 'cat_pages', 'cat_files' ),
			# Doesn't support sortkey_name aliases
			array( $pageCondition, 'clms_to' => $this->title->getDBkey(), 'clms_sortkey_name' => $this->sortkeyName ),
			__METHOD__,
			array( 'ORDER BY' => $this->flip ? 'clms_sortkey DESC' : 'clms_sortkey',
				'USE INDEX' => array( 'categorylinks_multisort' => 'clms_sortkey' ),
				'LIMIT'    => $this->limit + 1 ),
			array( 'categorylinks_multisort'  => array( 'INNER JOIN', 'clms_from = page_id' ),
				'category' => array( 'LEFT JOIN', 'cat_title = page_title AND page_namespace = ' . NS_CATEGORY ) )
		);

		$count = 0;
		$this->nextPage = null;

		while ( $x = $dbr->fetchObject ( $res ) ) {
			if ( ++$count > $this->limit ) {
				// We've reached the one extra which shows that there are
				// additional pages to be had. Stop here...
				$this->nextPage = $x->clms_sortkey;
				break;
			}

			$title = Title::makeTitle( $x->page_namespace, $x->page_title );

			if ( $title->getNamespace() == NS_CATEGORY ) {
				$cat = Category::newFromRow( $x, $title );
				$this->addSubcategoryObject( $cat, $x->clms_sortkey, $x->page_len );
			} elseif ( $this->showGallery && $title->getNamespace() == NS_FILE ) {
				$this->addImage( $title, $x->clms_sortkey, $x->page_len, $x->page_is_redirect );
			} else {
				$this->addPage( $title, $x->clms_sortkey, $x->page_len, $x->page_is_redirect );
			}
		}
	}
	
	function getSubcategorySortChar( $title, $sortkey ) {
		global $wgContLang;
		
		if ( !array_key_exists( 'firstChar', $this->sortkeySettings ) || $this->sortkeySettings['firstChar'] ) {
			$sortkey = $wgContLang->firstChar( $sortkey );
		}

		return $wgContLang->convert( $sortkey );
	}
	
	function addPage( $title, $sortkey, $pageLength, $isRedirect = false ) {
		global $wgContLang;
		$this->articles[] = $isRedirect
			? '<span class="redirect-in-category">' .
				$this->getSkin()->link(
					$title,
					null,
					array(),
					array(),
					array( 'known', 'noclasses' )
				) . '</span>'
			: $this->getSkin()->makeSizeLinkObj( $pageLength, $title );
		
		if ( !array_key_exists( 'firstChar', $this->sortkeySettings ) || $this->sortkeySettings['firstChar'] ) {
			$sortkey = $wgContLang->firstChar( $sortkey );
		}
		
		$this->articles_start_char[] = $wgContLang->convert( $sortkey );
	}
	
	function pagingLinks( $title, $first, $last, $limit, $query = array() ) {
		return parent::pagingLinks( $title, $first, $last, $limit, array_merge( $query, array(
			'sortkey' => $this->sortkeyName,
		) ) );
	}
}
