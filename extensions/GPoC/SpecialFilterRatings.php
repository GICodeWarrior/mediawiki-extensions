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

		$filters = array(
			'r_project' => $project,
			'r_importance' => $importance,
			'r_quality' => $quality
		);
		$entries = Rating::filterArticles($filters);

		$this->setHeaders();

		$wgOut->setPageTitle("Filter Articles by Ratings");

		$template = new FilterRatingsTemplate();
		$template->set( 'filters', $filters );
		$template->set( 'articles', $entries );
		$wgOut->addTemplate( $template );
	}
}
