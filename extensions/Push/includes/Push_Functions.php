<?php

/**
 * Statis class with utility methods for the Push extension.
 *
 * @since 0.2
 *
 * @file Push_Functions.php
 * @ingroup Push
 *
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class PushFunctions {
	
	public static function addJSLocalisation() {
		global $egPushJSMessages, $wgOut;
		
		$data = array();
	
		foreach ( $egPushJSMessages as $msg ) {
			$data[$msg] = wfMsgNoTrans( $msg );
		}
	
		$wgOut->addInlineScript( 'var wgPushMessages = ' . json_encode( $data ) . ';' );		
	}
	
	/**
	 * Returns the latest revision.
	 * Has support for the Approvedrevs extension, and will 
	 * return the latest approved revision where appropriate.
	 * 
	 * @since 0.2
	 * 
	 * @param Title $title
	 * 
	 * @return integer
	 */
	public static function getRevisionToPush( Title $title ) {
		if ( defined( 'APPROVED_REVS_VERSION' ) ) {
			$revId = ApprovedRevs::getApprovedRevID( $title );
			return $revId ? $revId : $title->getLatestRevID();
		}
		else {
			return $title->getLatestRevID();
		}
	}	
	
}