<?php
/** Extension:NewUserMessage
 *
 * @package MediaWiki
 * @subpackage Extensions
 *
 * @author [http://www.organicdesign.co.nz/nad User:Nad]
 * @license GNU General Public Licence 2.0 or later
 * @copyright 2007-10-15 [http://www.organicdesign.co.nz/nad User:Nad]
 */

if (!defined('MEDIAWIKI'))
	die('Not an entry point.');

class NewUserMessage {
	/*
	 * Add the template message if the users talk page doesn't already exist
	 */
	static function createNewUserMessage($user) {
		$name = $user->getName();
		$talk = $user->getTalkPage();

		if (!$talk->exists()) {
			global $wgUser, $wgNewUserMinorEdit, $wgNewUserSupressRC;

			wfLoadExtensionMessages( 'NewUserMessage' );

			$article = new Article($talk);

			// Need to make the edit on the user talk page in another
			// user's context. Park the current user object and create
			// a user object for $editingUser. If that user does not
			// exist, create it.
			$parkedWgUser = $wgUser;
			$wgUser = User::newFromName( wfMsgForContent( 'newusermessage-editor' ) );
			if ( !$wgUser->isLoggedIn() ) {
				$wgUser->addToDatabase();
			}

			$flags = EDIT_NEW;
			$templateTitleText = wfMsg( 'newusermessage-template' );
			$templateTitle = Title::newFromText( $templateTitleText );
			if ( !$templateTitle ) {
				wfDebug( __METHOD__. ": invalid title in newusermessage-template\n" );
				return true;
			}
			if ( $templateTitle->getNamespace() == NS_TEMPLATE ) {
				$templateTitleText = $templateTitle->getText();
			}
			if ($wgNewUserMinorEdit) $flags = $flags | EDIT_MINOR;
			if ($wgNewUserSupressRC) $flags = $flags | EDIT_SUPPRESS_RC;

			$dbw = wfGetDB( DB_MASTER );
			$dbw->begin();
			$good = true;
			try {
				$article->doEdit("{{{$templateTitleText}|$name}}", wfMsgForContent( 'newuseredit-summary' ), $flags);
			} catch ( DBQueryError $e ) {
				$good = false;
			}

			if ( $good ) {
				// Set newtalk with the right user ID
				$user->setNewtalk( true );
				$dbw->commit();
			} else {
				// The article was concurrently created
				wfDebug( __METHOD__. ": the article has already been created despite !\$talk->exists()\n" );
				$dbw->rollback();
			}
			$wgUser = $parkedWgUser;
		}
		return true;
	}

	static function createNewUserMessageAutoCreated( $user ) {
		global $wgNewUserMessageOnAutoCreate;

		if( $wgNewUserMessageOnAutoCreate ) {
			NewUserMessage::createNewUserMessage( $user );
		}

		return true;
	}

	static function onUserGetReservedNames( &$names ) {
		wfLoadExtensionMessages( 'NewUserMessage' );
		$names[] = 'msg:newusermessage-editor';
		return true;
	}
}
