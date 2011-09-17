<?php
/* 
 * Hook registration
 */

class WikimaniaHooks {
	public static function onLoadExtensionSchemaUpdates( $updater = null ) {
		if( !$updater ) {
			$updater->output( "Wikimania Extension requires MW 1.17+" );
		} else {

		}
		return true;
	}
}
