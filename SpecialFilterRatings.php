<?php
/**
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "not a valid entry point.\n" );
	die( 1 );
}

class SpecialFilterRatings extends SpecialPage {

	public function __construct() {
		parent::__construct( 'FilterRatings' );
	}

	// prototypey code 
	public function execute( $par ) {
		global $wgOut, $wgRequest;

		$project = $wgRequest->getVal('project');
		$importance = $wgRequest->getVal('importance');
		$quality = $wgRequest->getVal('quality');
		$categories = $wgRequest->getVal('categories');
		$action = $wgRequest->getVal('action');
		$selection_name = $wgRequest->getVal('selection');

		$filters = array(
			'r_project' => $project,
			'r_importance' => $importance,
			'r_quality' => $quality,
			'categories' => $categories
		);

		$categories = explode(',', $wgRequest->getVal('categories'));
		foreach($categories as &$category) {
			$category = trim($category);
		}
		$entries = Rating::filterArticles($filters);

		$this->setHeaders();

		$wgOut->setPageTitle("Filter Articles by Ratings");

		if( $action == 'addtoselection' ) {
			Selection::addEntries($selection_name, $entries);
		}

		$template = new FilterRatingsTemplate();
		$template->set( 'filters', $filters );
		$template->set( 'articles', $entries );
		$template->set( 'action', $action );
		$template->set( 'selection', $selection_name );

		$wgOut->addTemplate( $template );
	}
}
