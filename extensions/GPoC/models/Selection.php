<?php

/**
 * Represents an convenience methods for logging
 **/
class Selection {
	public static function addEntries( $name, $articles ) {
		$dbw = wfGetDB( DB_MASTER );
		$timestamp = wfTimestamp( TS_MW );
		foreach( $articles as $article ) {
			$success = $dbw->insert(
				'selections',
				array(
					's_selection_name' => $name,
					's_namespace' => $article['r_namespace'],
					's_article' => $article['r_article'],
					's_timestamp' => $timestamp
				),
				__METHOD__,
				array( 'IGNORE' )
			);
		}
	}
}
