<?php
/**
 * An extension to make the wiki issue HTTP redirects rather than wiki redirects
 *
 * @author �var Arnfj�r� Bjarmason <avarab@gmail.com>
 * @copyright Copyright � 2005, �var Arnfj�r� Bjarmason Bjarmason
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionCredits['other'][] = array(
	'name' => 'HTTP redirect',
	'description' => 'A hook to make the wiki issue HTTP redirects rather than wiki redirects',
	'author' => '�var Arnfj�r� Bjarmason',
);

$wgExtensionFunctions[] = 'wfHTTPRedirect';

function wfHTTPRedirect() {
	wfUsePHP( 5.0 );
	wfUseMW( '1.6alpha' );
	
	class HTTPRedirect {
		public function __construct() {
			global $wgHooks;

			$wgHooks['ArticleViewRedirect'][] = array( __CLASS__, 'redirectHook' );
		}

		
		public static function redirectHook( Article &$article ) {
			global $wgOut;

			$wgOut->redirect( $article->mTitle->escapeFullURL(), 302 );

			return false;
		}
	}

	// Establish a singleton.
	new HTTPRedirect;
}
