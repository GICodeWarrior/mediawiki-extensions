<?php
/**
 * Hooks for Narayam extension
 * @file
 * @ingroup Extensions
 */

class NarayamHooks {

	/// Hook: BeforePageDisplay
	public static function addModules( $out, $skin ) {
		if ( $out->getUser()->getOption( 'narayamEnable' ) ) {
			$schemes = array_values( self::getSchemes () );
			if ( count( $schemes ) ) {
				$out->addModules( $schemes );
				$out->addModules( 'ext.narayam' );
			}
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

		$vars['wgNarayamAvailableSchemes'] = self::getSchemes(); // Note: scheme names must be keys, not values
		$allSchemes = $wgNarayamSchemes;
		foreach ( $allSchemes as $lang => $schemes ) {
			foreach ( $schemes as $i => $scheme ) {
				$version = isset( $scheme[1] ) ? $scheme[1] : "stable";
				if ( $version === "beta" ) {
					if ( !$wgNarayamUseBetaMapping ) {
						unset( $allSchemes[$lang][$i] );
					}
					else {
						$allSchemes[$lang][$i] = $scheme[0];
					}
				}
				else {
					$allSchemes[$lang][$i] = $scheme;
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
		foreach ( $schemes as $i => $scheme ) {
			$version = isset( $scheme[1] ) ? $scheme[1] : "stable";
			if ( $version === "beta" ) {
				if ( !$wgNarayamUseBetaMapping ) {
					unset( $schemes[$i] );
				}
				else {
					$schemes[$i] = $scheme[0];
				}
			}
			else {
				$schemes[$i] = $scheme;
			}
		}
		return $schemes;
	}

	/// Hook: GetPreferences
	public static function addPreference( $user, &$preferences ) {
		// A checkbox in preferences to disable Narayam
		$preferences['narayamEnable'] = array(
			'type' => 'toggle',
			'label-message' => 'narayam-enable-preference',
			'section' => 'editing/advancedediting', // under 'Advanced options' section of 'Editing' tab
			'default' => $user->getOption( 'narayamEnable' )
		);

		return true;
	}
	/**
	 * UserGetDefaultOptions hook handler.
	 * @param $defaultOptions array
	 * @return bool
	 */
	public static function addDefaultOptions( &$defaultOptions ) {
		global $wgNarayamEnabledByDefault;
		// By default, the preference page option to enable Narayam is set to wgNarayamEnabledByDefault value.
		$defaultOptions['narayamEnable'] = $wgNarayamEnabledByDefault;
		return true;
	 }
}
