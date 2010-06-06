<?php
if ( ! defined( 'MEDIAWIKI' ) )
	die();
/**#@+
 *
 * A bot interface extension that adds edit assertions, to help bots ensure
 * they stay logged in, and are working with the right wiki.
 *
 * @file
 * @ingroup Extensions
 *
 * @link http://www.mediawiki.org/wiki/Extension:Assert_Edit
 *
 * @author Steve Sanbeg
 * @copyright Copyright © 2006-2007, Steve Sanbeg
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'AssertEdit',
	'author' => 'Steve Sanbeg',
	'descriptionmsg' => 'assertedit-desc',
	'url' => 'http://www.mediawiki.org/wiki/Extension:Assert_Edit',
);

$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['AssertEdit'] = $dir . 'AssertEdit.i18n.php';
$wgAutoloadClasses['AssertEdit'] = $dir . 'AssertEdit_body.php';
$wgHooks['AlternateEdit'][] = 'efAssertEditHook';
$wgHooks['APIEditBeforeSave'][] = 'efAssertApiEditHook';

$wgAutoloadClasses['ApiAssertEdit'] = $dir . "ApiAssertEdit.php";
$wgAPIModules['assertedit'] = 'ApiAssertEdit';

function efAssertEditHook( $editpage ) {
	global $wgOut, $wgRequest;

	$assertName = $wgRequest->getVal( 'assert' );
	$pass = true;

	if ( $assertName != '' ) {
		$pass = AssertEdit::callAssert( $assertName, false );
	}

	// check for negative assert
	if ( $pass ) {
		$assertName = $wgRequest->getVal( 'nassert' );
		if ( $assertName != '' ) {
			$pass = AssertEdit::callAssert( $assertName, true );
		}
	}

	if ( $pass ) {
		return true;
	} else {
		wfLoadExtensionMessages( 'AssertEdit' );

		// slightly modified from showErrorPage(), to return back here.
		$wgOut->setPageTitle( wfMsg( 'assert_edit_title' ) );
		$wgOut->setHTMLTitle( wfMsg( 'errorpagetitle' ) );
		$wgOut->setRobotPolicy( 'noindex,nofollow' );
		$wgOut->setArticleRelated( false );
		$wgOut->enableClientCache( false );
		$wgOut->mRedirect = '';

		$wgOut->mBodytext = '';
		$wgOut->addWikiText( wfMsg( 'assert_edit_message', $assertName ) );

		$wgOut->returnToMain( false, $editpage->mTitle );
		return false;
	}
}

function efAssertApiEditHook( $editPage, $textBox, &$result ) {
	global $wgOut, $wgRequest;

	$assertName = $wgRequest->getVal( 'assert' );
	$pass = true;

	if ( $assertName != '' ) {
		$pass = AssertEdit::callAssert( $assertName, false );
		if ( !$pass )
			$result['assert'] = $assertName;
	}

	// check for negative assert
	if ( $pass ) {
		$assertName = $wgRequest->getVal( 'nassert' );
		if ( $assertName != '' ) {
			$pass = AssertEdit::callAssert( $assertName, true );
		}
		if ( !$pass )
			$result['nassert'] = $assertName;
	}
	
	return $pass == true;
}
