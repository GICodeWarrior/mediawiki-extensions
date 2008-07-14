<?php
if (!defined('MEDIAWIKI')) die();

/**
 * Tools for edit page view to aid translators.
 *
 * @author Niklas Laxström
 * @copyright Copyright © 2007-2008 Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */
class TranslateEditAddons {
	const MSG = 'translate-edit-';

	static function addNavigation( &$outputpage, &$text ) {
		global $wgTranslateMessageNamespaces, $wgUser, $wgTitle;
		$ns = $wgTitle->getNamespace();
		if( !in_array($ns, $wgTranslateMessageNamespaces) ) return true;

		list( $key, $code ) = self::figureMessage( $wgTitle);

		$group = self::getMessageGroup( $ns, $key );
		if ( $group === null ) return true;

		$defs = $group->getDefinitions();
		$next = $prev = $def = null;
		foreach ( array_keys($defs) as $tkey ) {
			if ( $tkey === $key ) {
				$next = true;
				$def = $defs[$tkey];
				continue;
			} elseif( $next === true ) {
				$next = $tkey;
				break;
			}
			$prev = $tkey;
		}

		$skin = $wgUser->getSkin();
		$id = $group->getId();
		wfLoadExtensionMessages( 'Translate' );

		$title = Title::makeTitleSafe( $ns, "$prev/$code" );
		$prevLink = wfMsgHtml( 'translate-edit-goto-no-prev' );
		if ( $prev !== null ) {
			$params = "loadgroup=$id";
			if ( !$title->exists() ) $params .= '&action=edit';
			$prevLink = $skin->makeKnownLinkObj( $title,
				wfMsgHtml( 'translate-edit-goto-prev' ), $params );
		}

		$title = Title::makeTitleSafe( $ns, "$next/$code" );
		$nextLink = wfMsgHtml( 'translate-edit-goto-no-next' );
		if ( $next !== null && $next !== true ) {
			$params = "loadgroup=$id";
			if ( !$title->exists() ) $params .= '&action=edit';
			$nextLink = $skin->makeKnownLinkObj( $title,
				wfMsgHtml( 'translate-edit-goto-next' ), $params );
		}

		$title = SpecialPage::getTitleFor( 'translate' );
		$list = $skin->makeKnownLinkObj( $title,
			wfMsgHtml( 'translate-edit-goto-list' ),
			"group=$id&language=$code#msg_$next" );

		$text .=
"<hr />
<ul>
<li>$prevLink</li>
<li>$nextLink</li>
<li>$list</li>
</ul><hr />
<pre>$def</pre>";

		return true;
	}

	static function addTools( $object ) {
		global $wgTranslateMessageNamespaces;
		if( in_array($object->mTitle->getNamespace(), $wgTranslateMessageNamespaces) ) {
			$object->editFormTextTop .= self::editBoxes( $object );
		}
		return true;
	}

	private static function getFallbacks( $code ) {
		global $wgTranslateLanguageFallbacks, $wgTranslateDocumentationLanguageCode;

		$fallbacks = array();
		if ( isset($wgTranslateLanguageFallbacks[$code]) ) {
				$temp = $wgTranslateLanguageFallbacks[$code];
			if (!is_array($temp) ) {
				$fallbacks = array( $temp );
			} else {
				$fallbacks = $temp;
			}
		}

		$realFallback = Language::getFallbackFor( $code );
		if ( $realFallback && $realFallback !== 'en' ) {
			$fallbacks = array_merge( array($realFallback), $fallbacks );
		}

		return $fallbacks;
	}

	private static function doBox( $msg, $code, $title = false ) {
		global $wgUser, $wgLang;
		if ( $msg === null ) { return ''; }

		$name = TranslateUtils::getLanguageName( $code, false, $wgLang->getCode() );
		$code = strtolower( $code );

		$attributes = array();
		if ( !$title ) {
			$attributes['class'] = 'mw-sp-translate-in-other-big';
		} elseif ( $code === 'en' ) {
			$attributes['class'] = 'mw-sp-translate-edit-definition';
		} else {
			$attributes['class'] = 'mw-sp-translate-edit-committed';
		}
		if ( mb_strlen( $msg ) < 100 && !$title ) {
			$attributes['class'] = 'mw-sp-translate-in-other-small';
		}

		$msg = TranslateUtils::convertWhiteSpaceToHTML( $msg );

		if ( !$title ) $title = "$name ($code)";
		$title = htmlspecialchars( $title );

		return TranslateUtils::fieldset( $title, Xml::tags( 'code', null, $msg ), $attributes );
	}

	/**
	* @return Array of the message and the language
	*/
	private static function figureMessage( $title ) {
		global $wgContLanguageCode, $wgContLang;
		$pieces = explode('/', $wgContLang->lcfirst($title->getDBkey()), 3);

		$key = $pieces[0];

		# Language the user is translating to
		$langCode = isset($pieces[1]) ? $pieces[1] : $wgContLanguageCode;
		return array( $key, $langCode );
	}

	/**
	 * Tries to determine from which group this message belongs. It tries to get
	 * group id from loadgroup GET-paramater, but fallbacks to messageIndex file
	 * if no valid group was provided, or the group provided is a meta group.
	 * @param $key The message key we are interested in.
	 * @return MessageGroup which the key belongs to, or null.
	 */
	private static function getMessageGroup( $namespace, $key ) {
		global $wgRequest;
		$group = $wgRequest->getText('loadgroup', '' );
		$mg = MessageGroups::getGroup( $group );

		# If we were not given group, or the group given was meta...
		if ( is_null( $mg ) || $mg->isMeta() ) {
			# .. then try harder, because meta groups are *inefficient*
			$group = TranslateUtils::messageKeyToGroup( $namespace, $key );
			if ( $group ) {
				$mg = MessageGroups::getGroup( $group );
			}
		}

		return $mg;
	}

	private static function editBoxes( $object ) {
		wfLoadExtensionMessages( 'Translate' );
		global $wgTranslateDocumentationLanguageCode, $wgOut;

		list( $key, $code ) = self::figureMessage( $object->mTitle );

		$group = self::getMessageGroup( $object->mTitle->getNamespace(), $key );
		if ( $group === null ) return;

		list( $nsMain, /* $nsTalk */) = $group->namespaces;

		$en = $group->getMessage( $key, 'en' );
		$xx = $group->getMessage( $key, $code );

		$boxes = array();

		// In other languages (if any)
		$inOtherLanguages = array();
		foreach ( self::getFallbacks( $code ) as $fbcode ) {
			$fb = $group->getMessage( $key, $fbcode );
			/* For fallback, even uncommitted translation may be useful */
			if ( $fb === null ) {
				$fb = TranslateUtils::getMessageContent( $key, $fbcode );
			}
			if ( $fb !== null ) {
				$inOtherLanguages[] = self::dobox( $fb, $fbcode );
			}
		}
		if ( count($inOtherLanguages) ) {
			$boxes[] = TranslateUtils::fieldset( wfMsgHtml( self::MSG . 'in-other-languages' ),
				implode( "\n", $inOtherLanguages ), array( 'class' => 'mw-sp-translate-edit-inother' ) );
		}

		// User provided documentation
		if ( $wgTranslateDocumentationLanguageCode ) {
			global $wgUser;
			$title = Title::makeTitle( $nsMain, $key . '/' . $wgTranslateDocumentationLanguageCode );
			$edit = $wgUser->getSkin()->makeKnownLinkObj( $title, wfMsgHtml( self::MSG . 'contribute' ), 'action=edit' );
			$info = TranslateUtils::getMessageContent( $key, $wgTranslateDocumentationLanguageCode, $nsMain );
			if ( $info === null ) {
				$info = $group->getMessage( $key, $wgTranslateDocumentationLanguageCode );
			}
			$class = 'mw-sp-translate-edit-info';
			if ( $info === null ) {
				$info = wfMsg( self::MSG . 'no-information' );
				$class = 'mw-sp-translate-edit-noinfo';
			}

			if ( $group->getType() === 'gettext' ) {
				$reader = $group->getReader( 'en' );
				if ( $reader ) {
					$data = $reader->parseFile();
					$help = GettextFormatWriter::formatcomments( @$data[$key]['comments'], false, @$data[$key]['flags'] );
					$info .= "<hr /><pre>$help</pre>";
				}
			}

			$class .= ' mw-sp-translate-message-documentation';

			$boxes[] = TranslateUtils::fieldset(
				wfMsgHtml( self::MSG . 'information', $edit ), $wgOut->parse( $info ), array( 'class' => $class )
			);
		}

		// Can be either NULL or '', ARGH!
		if ( $object->textbox1 === '' ) {
			$editField = null;
		} else {
			$editField = $object->textbox1;
		}

		if ( $xx !== null && $code !== 'en' ) {
			// Append translation from the file to edit area, if it's empty.
			if ($object->firsttime && $editField === null ) {
				$object->textbox1 = $xx;
			}
		}

		// Definition
		if ( $en !== null ) {
			$label = " ({$group->getLabel()})";
			$boxes[] = self::doBox( $en, 'en', wfMsg( self::MSG . 'definition' ) . $label );
		}


		// Some syntactic checks
		$translation = ($editField !== null ) ? $editField : $xx;
		if ( $translation !== null ) {
			$message = new TMessage( $key, $en );
			// Take the contents from edit field as a translation
			$message->database = $translation;
			$checker = MessageChecks::getInstance();
			$checks = $checker->doChecks( $message, $group->getType(), $code );
			if ( count($checks) ) {
				$checkMessages = array();
				foreach ( $checks as $checkParams ) {
					array_splice( $checkParams, 1, 0, 'parseinline' );
					$checkMessages[] = call_user_func_array( 'wfMsgExt', $checkParams );
				}

				$boxes[] = TranslateUtils::fieldset(
					wfMsgHtml( self::MSG . 'warnings' ), implode( '<hr />', $checkMessages),
					array( 'class' => 'mw-sp-translate-edit-warnings' ) );
			}
		}

		TranslateUtils::injectCSS();
		return Xml::tags( 'div', array( 'class' => 'mw-sp-translate-edit-fields' ), implode("\n\n", $boxes) );
	}


}
