<?

class MarkAsHelpfulHooks {
	/**
	 * Adds MarkAsHelpful JS to the output if appropriate.
	 *
	 * @param $output OutputPage
	 * @param $skin Skin
	 */

	public static function onPageDisplay( &$output, &$skin ) {
		if ( self::addMarkAsHelpful( $output, $skin ) ) {
			$output->addModules( array( 'ext.markAsHelpful' ) );
		}

		return true;
	}

	/**
	 * Determines whether or not we should add MarkAsHelpful to the current page.
	 *
	 * @param $output OutputPage
	 * @param $skin Skin
	 */
	public static function addMarkAsHelpful ( &$output, &$skin ) {
		
		return true;
	}

	public static function makeGlobalVariablesScript( &$vars ) {
		global $wgUser;
		$vars['mahEditToken'] = $wgUser->editToken();
		return true;
	}

}