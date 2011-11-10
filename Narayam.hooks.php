<?php
/**
 * Hooks for Narayam extension
 * @file
 * @ingroup Extensions
 */

class NarayamHooks {

	/// Hook: BeforePageDisplay
	public static function addModules( $out, $skin ) {
		global $wgUser;

		if ( $wgUser->getOption( 'narayamDisable' ) ) {
			// User disabled Narayam
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
		global $wgNarayamEnabledByDefault, $wgNarayamRecentItemsLength, $wgUser;

		// FIXME: this hook cannot depend on any state!
		if ( $wgUser->getOption( 'narayamDisable' ) ) {
			// User disabled Narayam
			return true;
		}

		$vars['wgNarayamEnabledByDefault'] = $wgNarayamEnabledByDefault;
		$vars['wgNarayamRecentItemsLength'] = $wgNarayamRecentItemsLength;

		return true;
	}

	/// Hook: MakeGlobalVariablesScript
	public static function addVariables( &$vars ) {
		global $wgUser, $wgNarayamSchemes;

		if ( $wgUser->getOption( 'narayamDisable' ) ) {
			// User disabled Narayam
			return true;
		}

		$vars['wgNarayamAvailableSchemes'] = self::getSchemes(); // Note: scheme names must be keys, not values
		$vars['wgNarayamAllSchemes'] = $wgNarayamSchemes;
		$vars['wgNarayamHelpPage'] = wfMsgForContent( 'narayam-help-page' );
		return true;
	}

	/**
	 * Get the available schemes for the user and content language
	 * @return array( scheme name => module name )
	 */
	protected static function getSchemes() {
		global $wgLanguageCode, $wgLang, $wgNarayamSchemes, $wgRequest;

		$userlangCode = $wgLang->getCode();
		$contlangSchemes = isset( $wgNarayamSchemes[$wgLanguageCode] ) ?
				$wgNarayamSchemes[$wgLanguageCode] : array();
		$userlangSchemes = isset( $wgNarayamSchemes[$userlangCode] ) ?
				$wgNarayamSchemes[$userlangCode] : array();

		$schemes = $userlangSchemes + $contlangSchemes;

		return $schemes;
	}

	/// Hook: GetPreferences
	public static function addPreference( $user, &$preferences ) {
		// A checkbox in preferences to diable Narayam
		$preferences['narayamDisable'] = array(
			'type' => 'toggle',
			'label-message' => 'narayam-disable-preference', // a system message
			'section' => 'editing/advancedediting', // under 'Advanced options' section of 'Editing' tab
		);

		return true;
	}
}
