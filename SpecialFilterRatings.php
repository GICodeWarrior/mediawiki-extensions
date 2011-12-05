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

		if( $wgRequest->wasPosted() ) {
			$wgOut->disable();

			$action = $wgRequest->getVal('action');
			$selection_name = $wgRequest->getVal('selection');

			if( $action == 'addtoselection' )  {
				$success = Selection::addEntries($selection_name, $entries);
				$sel_page = new SpecialSelection();
					
				$url = $sel_page->getTitle()->getLinkUrl( array( 'name' => $selection_name ) );
				$return = array(
					'status' => $success,
					'selection_url' => $url
				);
			}
			echo json_encode($return);
			return;
		}

		$this->setHeaders();

		$wgOut->setPageTitle("Filter Articles by Ratings");

		$template = new FilterRatingsTemplate();
		$template->set( 'filters', $filters );
		$template->set( 'articles', $entries );

		$wgOut->addTemplate( $template );
	}
}
