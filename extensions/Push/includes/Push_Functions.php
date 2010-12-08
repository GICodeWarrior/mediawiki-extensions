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
	
}