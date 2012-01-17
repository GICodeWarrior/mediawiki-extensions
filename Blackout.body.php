<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	die();
}
/**
 * Class file for the Blackout extension
 *
 * @addtogroup Extensions
 * @license GPL
 */

// Blackout
class Blackout {

	/**
	 * Function displaying banner
	 *
	 * @param $article Article
	 * @param $user User
	 * @param $summary
	 * @return bool
	 */
	public static function fnMyHook( OutputPage &$out, Skin &$skin ) {
		global $wgBlackout, $wgOut;
		$wgOut->addModules( 'ext.blackout' );
	return true;
	}
}
