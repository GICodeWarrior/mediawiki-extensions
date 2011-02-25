<?php
/**
 * Hooks for Narayam extension
 * @file
 * @ingroup Extensions
 */
class NarayamHooks {
	public static function addModules( $out, $skin ) {
		$schemes = array_values( self::getSchemes () );
		if ( count( $schemes ) ) {
			$out->addModules( $schemes );
			$out->addModules( 'ext.narayam' );
		}
		return true;
	}
	
	public static function addConfig( &$vars ) {
		global $wgNarayamEnabledByDefault, $wgNarayamShortcutKey;
		$vars['wgNarayamEnabledByDefault'] = $wgNarayamEnabledByDefault;
		$vars['wgNarayamShortcutKey'] = $wgNarayamShortcutKey;
		
		return true;
	}
	
	public static function addVariables( &$vars ) {
		$vars['wgNarayamAvailableSchemes'] = self::getSchemes(); // Note: scheme names must be keys, not values
		return true;
	}
	
	/**
	 * Get the available schemes for the user and content language
	 * @return array( scheme name => module name )
	 */
	protected static function getSchemes() {
		global $wgLanguageCode, $wgLang, $wgNarayamSchemes;
		$userlangCode = $wgLang->getCode();
		$contlangSchemes = isset( $wgNarayamSchemes[$wgLanguageCode] ) ?
			$wgNarayamSchemes[$wgLanguageCode] : array();
		$userlangSchemes = isset( $wgNarayamSchemes[$userlangCode] ) ?
			$wgNarayamSchemes[$userlangCode] : array();
		return $userlangSchemes + $contlangSchemes;
	}
}
