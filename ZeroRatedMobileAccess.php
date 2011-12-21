<?php
/**
 * Extension ZeroRatedMobileAccess — Zero Rated Mobile Access
 *
 * @file
 * @ingroup Extensions
 * @author Patrick Reilly
 * @copyright © 2011 Patrick Reilly
 * @licence GNU General Public Licence 2.0 or later
 */

// Needs to be called within MediaWiki; not standalone
if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
	die( -1 );
}

// Extension credits that will show up on Special:Version
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'ZeroRatedMobileAccess',
	'version' => ExtZeroRatedMobileAccess::VERSION,
	'author' => '[http://www.mediawiki.org/wiki/User:Preilly Preilly]',
	'descriptionmsg' => 'zero-rated-mobile-access-desc',
	'url' => 'https://www.mediawiki.org/wiki/Extension:ZeroRatedMobileAccess',
);

$cwd = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;
$wgExtensionMessagesFiles['ZeroRatedMobileAccess'] = $cwd . 'ZeroRatedMobileAccess.i18n.php';

$wgExtZeroRatedMobileAccess = new ExtZeroRatedMobileAccess();

$wgHooks['BeforePageDisplay'][] = array( &$wgExtZeroRatedMobileAccess, 'beforePageDisplayHTML' );

class ExtZeroRatedMobileAccess {
	const VERSION = '0.0.1';

	public static $renderZeroRatedLandingPage;

	/**
	 * @param $out OutputPage
	 * @param $text String
	 * @return bool
	 */
	public function beforePageDisplayHTML( &$out, &$text ) {
		global $wgRequest;
		wfProfileIn( __METHOD__ );
		self::$renderZeroRatedLandingPage = $wgRequest->getInt( 'renderZeroRatedLandingPage' );
		if ( self::$renderZeroRatedLandingPage === 1 ) {
			echo wfMsg( 'zero-rated-mobile-access-desc' );
			exit();
		}
		wfProfileOut( __METHOD__ );
		return true;
	}
}