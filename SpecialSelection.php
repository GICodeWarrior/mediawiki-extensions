<?php
/**
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "not a valid entry point.\n" );
	die( 1 );
}

class SpecialSelection extends SpecialPage {

	public function __construct() {
		parent::__construct( 'Selection' );
	}

	private function makeCSV( $articles, $name ) {
		$outstream = fopen( "php://output", "w" );
		$headers = array(
			'article',
			'added'
		);
		fputcsv( $outstream, $headers );
		foreach( $articles as $article ) {
			$row = array(
				$article['title']->getFullText(),
				wfTimeStamp( TS_ISO_8601, $article['s_timestamp'] )
			);
			fputcsv( $outstream, $row );
		}
		fclose( $outstream );
	}
	public function execute( $par ) {
        global $wgOut, $wgRequest;

		$name = $par;
		$action = $wgRequest->getVal('action'); 		

		$entries = Selection::getSelection( $name );
		$this->setHeaders();

		$wgOut->setPageTitle("Selection");

		if( $action == 'csv' ) {
			$wgRequest->response()->header( 'Content-type: text/csv' );
			// Is there a security issue in letting the name be arbitrary?
			$wgRequest->response()->header(
				"Content-Disposition: attachment; filename=$name.csv"
			);
			$wgOut->disable();
			$this->makeCSV( $entries, $name );
		}
		$template = new SelectionTemplate();
		$template->set( 'articles', $entries );

		$wgOut->addTemplate( $template );
	}
}
