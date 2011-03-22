<?php
if ( !defined( 'MEDIAWIKI' ) ) die();

require_once( "WikiDataAPI.php" ); // for bootstrapCollection
require_once( "Utilities.php" );

class SpecialAddCollection extends SpecialPage {
	function SpecialAddCollection() {
		parent::__construct( 'AddCollection' );
	}

	function execute( $par ) {

		global $wgOut, $wgUser, $wgRequest;

		$wgOut->setPageTitle( 'Add Collection' );

		if ( !$wgUser->isAllowed( 'addcollection' ) ) {
			$wgOut->addHTML( 'You do not have permission to add a collection.' );
			return false;
		}

		$dbr = wfGetDB( DB_MASTER );

		if ( $wgRequest->getText( 'collection' ) ) {
			require_once( 'WikiDataAPI.php' );
			require_once( 'Transaction.php' );

			$dc = $wgRequest->getText( 'dataset' );
			$collectionName = $wgRequest->getText( 'collection' );
			startNewTransaction( $wgUser->getID(), wfGetIP(), 'Add collection ' . $collectionName );
			bootstrapCollection( $collectionName, $wgRequest->getText( 'language' ), $wgRequest->getText( 'type' ), $dc );
			$wgOut->addHTML( wfMsg( 'ow_collection_added', $collectionName ) . "<br />" );
		}
		$datasets = wdGetDatasets();
		$datasetarray[''] = wfMsgSc( "none_selected" );
		foreach ( $datasets as $datasetid => $dataset ) {
			$datasetarray[$datasetid] = $dataset->fetchName();
		}

		$wgOut->addHTML( getOptionPanel(
			array(
				'Collection name:' => getTextBox( 'collection' ),
				'Language of name:' => getSuggest( 'language', 'language' ),
				'Collection type:' => getSelect( 'type', array( '' => 'None', 'RELT' => 'RELT', 'LEVL' => 'LEVL', 'CLAS' => 'CLAS', 'MAPP' => 'MAPP' ) ),
				'Dataset:' => getSelect( 'dataset', $datasetarray )
			),
			'', array( 'create' => wfMsg( 'ow_create' ) )
		) );
	}
}

