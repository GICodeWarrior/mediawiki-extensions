<?php
/**
 * Hooks for WebFonts extension
 *
 * @file
 * @ingroup Extensions
 */

// WebFonts hooks
class WebFontsHooks {

	/**
	 * BeforePageDisplay hook handler.
	 */
	public static function addModules( $out, $skin ) {

		if ( $out->getUser()->getOption( 'webfontsEnable' ) ) {
			$out->addModules( 'webfonts' );
		}

		return true;
	}

	/**
	 * MakeGlobalVariablesScript hook handler.
	 */
	public static function addVariables( &$vars, $out ) {
		global $wgWebFontsEnabledByDefault;

		if ( $out->getUser()->isAnon() ) {
			// If user enabled webfonts from preference page, 
			// wgWebFontsEnabledByDefault is overridden by that.
			$vars['wgWebFontsEnabledByDefault'] = $wgWebFontsEnabledByDefault;
		}

		return true;
	}

	/**
	 * GetPreferences hook handler.
	 */
	public static function addPreference( $user, &$preferences ) {
		// A checkbox in preferences to enable WebFonts
		$preferences['webfontsEnable'] = array(
			'type' => 'toggle',
			'label-message' => 'webfonts-enable-preference', // a system message
			'section' => 'rendering/advancedrendering', // under 'Advanced options' section of 'Editing' tab
			'default' => $user->getOption( 'webfontsEnable' )
		);

		return true;
	}
}
