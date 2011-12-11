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
	 * @param $out OutputPage
	 * @param $skin Skin
	 * @return bool
	 */
	public static function addModules( $out, $skin ) {

		if ( $out->getUser()->getOption( 'webfontsEnable' ) ) {
			$out->addModules( 'ext.webfonts.init' );
		}

		return true;
	}

	/**
	 * GetPreferences hook handler.
	 * @param $user User
	 * @param $preferences array
	 * @return bool
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

	/**
	 * UserGetDefaultOptions hook handler.
	 * @param $defaultOptions array
	 * @return bool
	 */
	public static function addDefaultOptions( &$defaultOptions ) {
		global $wgWebFontsEnabledByDefault;
		// By default, the preference page option to enable webfonts is set to wgWebFontsEnabledByDefault value.
		$defaultOptions['webfontsEnable'] = $wgWebFontsEnabledByDefault;
		return true;
	 }
}
