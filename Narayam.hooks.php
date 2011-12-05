<?php
/**
 * Hooks for Narayam extension
 * @file
 * @ingroup Extensions
 */

class NarayamHooks {

	/// Hook: BeforePageDisplay
	public static function addModules( $out, $skin ) {
		if ( $out->getUser()->getOption( 'narayamDisable' ) ) {
			return true;
		}

		$schemes = array_values( self::getSchemes () );

		if ( count( $schemes ) ) {
			$out->addModules( $schemes );
			$out->addModules( 'ext.narayam' );
		}

		return true;
	}

	/// Hook: ResourceLoaderGetConfigVars
	public static function addConfig( &$vars ) {
		global $wgNarayamRecentItemsLength, $wgNarayamEnabledByDefault;
		$vars['wgNarayamEnabledByDefault'] = $wgNarayamEnabledByDefault;
		$vars['wgNarayamRecentItemsLength'] = $wgNarayamRecentItemsLength;
		$vars['wgNarayamHelpPage'] = wfMsgForContent( 'narayam-help-page' );
		return true;
	}

	/// Hook: MakeGlobalVariablesScript
	public static function addVariables( &$vars ) {
		global $wgUser, $wgNarayamSchemes, $wgNarayamUseBetaMapping;

		if ( $wgUser->getOption( 'narayamDisable' ) ) {
			return true;
		}

		$vars['wgNarayamAvailableSchemes'] = self::getSchemes(); // Note: scheme names must be keys, not values
		$allSchemes = $wgNarayamSchemes;
		if ( !$wgNarayamUseBetaMapping ) {
			foreach ( $allSchemes as $lang => $schemes ) {
				foreach ( $schemes as $i => $scheme ) {
					$version = isset( $scheme[1] ) ? $scheme[1] : "stable";
					if ( $version === "beta" ) {
						unset( $allSchemes[$lang][$i] );
					}
				}
			}
		}
		$vars['wgNarayamAllSchemes'] = $allSchemes;
		return true;
	}

	/**
	 * Get the available schemes for the user and content language
	 * @return array( scheme name => module name )
	 */
	protected static function getSchemes() {
		global $wgLanguageCode, $wgLang, $wgNarayamSchemes, $wgTitle, $wgNarayamUseBetaMapping;

		$userlangCode = $wgLang->getCode();
		$contlangSchemes = isset( $wgNarayamSchemes[$wgLanguageCode] ) ?
			$wgNarayamSchemes[$wgLanguageCode] : array();
		$userlangSchemes = isset( $wgNarayamSchemes[$userlangCode] ) ?
			$wgNarayamSchemes[$userlangCode] : array();
		$pagelang = $wgTitle->getPageLanguage()->getCode();
		$pagelangSchemes = isset( $wgNarayamSchemes[$pagelang] ) ?
			$wgNarayamSchemes[$pagelang] : array();

		$schemes = $userlangSchemes + $contlangSchemes + $pagelangSchemes;
		if ( !$wgNarayamUseBetaMapping ) {
			foreach ( $schemes as $i => $scheme ) {
				$version = isset( $scheme[1] ) ? $scheme[1] : "stable";
				if ( $version === "beta" ) {
					unset( $schemes[$i] );
				}
			}
		}
		return $schemes;
	}

	/// Hook: GetPreferences
	public static function addPreference( $user, &$preferences ) {
		// A checkbox in preferences to disable Narayam
		$preferences['narayamDisable'] = array(
			'type' => 'toggle',
			'label-message' => 'narayam-disable-preference',
			'section' => 'editing/advancedediting', // under 'Advanced options' section of 'Editing' tab
		);

		return true;
	}

}
