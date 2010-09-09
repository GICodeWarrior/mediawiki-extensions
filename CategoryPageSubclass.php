<?php

class CategoryTreeCategoryPage extends CategoryPage {
	protected $mCategoryViewerClass = 'CategoryTreeCategoryViewer';
}

class CategoryTreeCategoryViewer extends CategoryViewer {
	var $child_cats;

	function getCategoryTree() {
		global $wgOut, $wgCategoryTreeCategoryPageOptions, $wgCategoryTreeForceHeaders;

		if ( ! isset( $this->categorytree ) ) {
			if ( !$wgCategoryTreeForceHeaders ) CategoryTree::setHeaders( $wgOut );

			$this->categorytree = new CategoryTree( $wgCategoryTreeCategoryPageOptions );
		}

		return $this->categorytree;
	}

	/**
	 * Add a subcategory to the internal lists
	 */
	function addSubcategoryObject( Category $cat, $sortkey, $pageLength ) {
		global $wgRequest;

		$title = $cat->getTitle();

		if ( $wgRequest->getCheck( 'notree' ) ) {
			return parent::addSubcategoryObject( $cat, $sortkey, $pageLength );
		}

		$tree = $this->getCategoryTree();

		$this->children[] = $tree->renderNodeInfo( $title, $cat );

		$this->children_start_char[] = $this->getSubcategorySortChar( $title, $sortkey );
	}

	function clearCategoryState() {
		$this->child_cats = array();
		parent::clearCategoryState();
	}

	function finaliseCategoryState() {
		if ( $this->flip ) {
			$this->child_cats = array_reverse( $this->child_cats );
		}
		parent::finaliseCategoryState();
	}
}
