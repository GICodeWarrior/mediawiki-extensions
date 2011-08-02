<?php

class CollabWatchlistTest extends PHPUnit_Framework_TestCase {
	public function testCategoryTree() {
		$catTree = new CategoryTreeManip();
		$catNames = array( 'Test', 'Category:Root' );
		$catTree->initialiseFromCategoryNames( $catNames );
		//var_dump( $catTree->getEnabledCategoryNames() );
		$catTree->printTree();
	}
}
