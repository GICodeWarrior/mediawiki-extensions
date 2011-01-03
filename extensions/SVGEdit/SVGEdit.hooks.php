<?php
/**
 * SVGEdit extension: hooks
 * @copyright 2010 Brion Vibber <brion@pobox.com>
 */

class SVGEditHooks {
	/* Static Methods */

	/**
	 * BeforePageDisplay hook
	 *
	 * Adds the modules to the page
	 *
	 * @param $out OutputPage output page
	 * @param $skin Skin current skin
	 */
	public static function beforePageDisplay( $out, $skin ) {
		$title = $out->getTitle();
		if( self::trigger( $title ) ) {
			$out->addModules('ext.svgedit.editButton');
		}
		return true;
	}

	/**
	 * MakeGlobalVariablesScript hook
	 *
	 * Exports a setting if necessary.
	 *
	 * @param $vars array of vars
	 */
	public static function makeGlobalVariablesScript( &$vars ) {
		global $wgTitle, $wgSVGEditEditor;
		if( self::trigger( $wgTitle ) ) {
			$vars['wgSVGEditEditor'] = $wgSVGEditEditor;
		}
		return true;
	}

	/**
	 * Should the editor links trigger on this page?
	 *
	 * @param Title $title
	 * @return boolean
	 */
	private static function trigger( $title ) {
		return $title && $title->getNamespace() == NS_FILE &&
			$title->userCan( 'edit' ) && $title->userCan( 'upload' );
	}

}
