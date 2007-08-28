<?php

class TranslateEditAddons {
	static function addTools( $object ) {
		if( $object->mTitle->getNamespace() == NS_MEDIAWIKI ) {
			$object->editFormTextTop .= self::editBoxes( $object );
			//$object->editFormTextTop .= self::messageFormat( $object );
		}
		return true;
	}

/*	private static function messageFormat( $object ) {
		list( $key, ) = self::figureMessage( $object );
		$zxx = Language::factory( 'zxx' );
		$info = $zxx->getMessage( $key );
		$info = STools::indexOf( explode( ';', $info, 2), 0);
		if ( $info === null ||
			!in_array( $info, array('parsed', 'plain', 'magic', 'unescaped') ) ) {
			$info = 'unknown';
		}
		return wfMsgExt( 'translate-edit-message-format', array( 'parse' ), $info );
 }
*/

	private static function doBox( $msg, $code, $i18nmsg ) {
		static $names = false;
		if (!$names ) { $names = Language::getLanguageNames(); }
		if (!$msg ) { return ''; }

		$prettyCode = TranslateUtils::prettyCode( $code );

		/* Approximate row count */
		$rows = count(explode("\n", $msg)) -1;
		$rows = max(3, min(15, $rows));

		wfLoadExtensionMessages( 'Translate' );

		return
			wfMsg( $i18nmsg, $names[$code], $prettyCode ) . " " .
			Xml::Element( 'textarea', array( 'rows' => $rows ), $msg );
	}

	/**
	* @return Array of the message and the language
	*/
	private static function figureMessage( $object ) {
		global $wgContLanguageCode, $wgContLang;
		$pieces = explode('/', $wgContLang->lcfirst($object->mTitle->getDBkey()), 3);

		$key = $pieces[0];

		# Language the user is translating to
		$langCode = isset($pieces[1]) ? $pieces[1] : $wgContLanguageCode;
		return array( $key, $langCode );
	}

	private static function getMessageGroup() {
		global $wgRequest;
		$group = $wgRequest->getText('loadgroup', '' );
		if ( $group ) {
			$groups = MessageGroups::singleton()->getGroups();
			foreach( $groups as $g ) {
				if ( $g->getId() === $group ) {
					return $g;
				}
			}
		}
		return null;
	}

	private static function editBoxes( $object ) {
		list( $key, $code ) = self::figureMessage( $object );

		$group = self::getMessageGroup();
		if ( $group === null ) return;

		$en = $group->getMessage( $key, 'en' );

		$xx = TranslateUtils::getMessageContent( $key, $code );
		if ( $xx === null ) {
			$xx = $group->getMessage( $key, $code );
		}

		$fb = null;
		$fbcode = Language::getFallbackFor( $code );
		if ( $fbcode ) {
			$fb = TranslateUtils::getMessageContent( $key, $fbcode );
			if ( $fb === null ) {
				$fb = $group->getMessage( $key, $fbcode );
			}
		}

		$boxes = array();
		if ( $en !== null ) {
			$boxes[] = self::dobox( $en, 'en', 'translate-edit-message-in' );
		}

		if ( $fb !== null && $fbcode !== 'en' ) {
			$boxes[] = self::dobox( $fb, $fbcode, 'translate-edit-message-in-fb' );
		}


		if ( $xx !== null && $code !== 'en' ) {
			$boxes[] = self::dobox( $xx, $code, 'translate-edit-message-in' );
		
		// Hack initial content
			if ($object->textbox1 === '') {
				$object->textbox1 = $xx;
			}
		}

		return implode("\n\n", $boxes);
	}


}

