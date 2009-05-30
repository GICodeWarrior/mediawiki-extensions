<?php
if ( !defined( 'MEDIAWIKI' ) ) die();

/**
 * Tools for edit page view to aid translators.
 *
 * @author Niklas Laxström
 * @author Siebrand Mazeland
 * @copyright Copyright © 2007-2009 Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */
class TranslateEditAddons {
	const MSG = 'translate-edit-';

	static function addNavigation( &$outputpage, &$text ) {
		global $wgUser, $wgTitle, $wgTranslateMessageNamespaces;
		$ns = $wgTitle->getNamespace();

		if ( !in_array( $ns, $wgTranslateMessageNamespaces) ) return true;


		list( $key, $code, $group) = self::getKeyCodeGroup( $wgTitle );
		if ( $group === null ) return true;

		$defs = $group->getDefinitions();
		$skip = array_merge( $group->getIgnored(), $group->getOptional() );

		$next = $prev = $def = null;
		foreach ( array_keys( $defs ) as $tkey ) {
			if ( in_array( $tkey, $skip ) ) continue;
			// Keys can have mixed case, but they have to be unique in a case
			// insensitive manner. It is therefore safe and a must to use case
			// insensitive comparison method
			if ( strcasecmp( $tkey, $key ) === 0 ) {
				$next = true;
				$def = $defs[$tkey];
				continue;
			} elseif ( $next === true ) {
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

		$params = array();

		if ( $prev !== null ) {
			$params['loadgroup'] = $id;
			if ( !$title->exists() ) {
				$params['action'] = 'edit';
			}
			$prevLink = $skin->link( $title,
				wfMsgHtml( 'translate-edit-goto-prev' ), array(), $params );
		}

		$title = Title::makeTitleSafe( $ns, "$next/$code" );
		$nextLink = wfMsgHtml( 'translate-edit-goto-no-next' );
		if ( $next !== null && $next !== true ) {
			$params['loadgroup'] = $id;

			if ( !$title->exists() ) {
				$params['action'] = 'edit';
			}

			$nextLink = $skin->link( $title,
				wfMsgHtml( 'translate-edit-goto-next' ), array(), $params );
		}

		$title = SpecialPage::getTitleFor( 'Translate' );
		$title->mFragment = "msg_$next";
		$list = $skin->link(
			$title,
			wfMsgHtml( 'translate-edit-goto-list' ),
			array(),
			array(
				'group' => $id,
				'language' => $code
			)
		);

		$def = TranslateUtils::convertWhiteSpaceToHTML( $def );

		$text .= <<<EOEO
<hr />
<ul class="mw-translate-nav-prev-next-list">
<li>$prevLink</li>
<li>$nextLink</li>
<li>$list</li>
</ul><hr />
<div class="mw-translate-definition-preview">$def</div>
EOEO;
		return true;
	}

	static function intro( $object ) {
		$object->suppressIntro = true;
		return true;
	}


	static function addTools( $object ) {
		global $wgTranslateMessageNamespaces;
		$ns = $object->mTitle->getNamespace();
		if ( !in_array( $ns, $wgTranslateMessageNamespaces) ) return true;

		$object->editFormTextTop .= self::editBoxes( $object );
		global $wgMessageCache, $wgLang;
		return true;
	}

	static function buttonHack( $editpage, &$buttons, $tabindex ) {
		global $wgLang;
		list( , $code ) = self::figureMessage( $editpage->mTitle );
		if ( $code !== 'qqq' ) return true;
		$name = TranslateUtils::getLanguageName( $code, false, $wgLang->getCode() );
		$temp = array(
			'id'        => 'wpSave',
			'name'      => 'wpSave',
			'type'      => 'submit',
			'tabindex'  => ++$tabindex,
			'value'     => wfMsg( 'translate-save', $name ),
			'accesskey' => wfMsg( 'accesskey-save' ),
			'title'     => wfMsg( 'tooltip-save' ).' ['.wfMsg( 'accesskey-save' ).']',
		);
		$buttons['save'] = Xml::element('input', $temp, '');
		return true;
	}

	private static function getFallbacks( $code ) {
		global $wgTranslateLanguageFallbacks, $wgTranslateDocumentationLanguageCode;

		$fallbacks = array();
		if ( isset( $wgTranslateLanguageFallbacks[$code] ) ) {
				$temp = $wgTranslateLanguageFallbacks[$code];
			if ( !is_array( $temp ) ) {
				$fallbacks = array( $temp );
			} else {
				$fallbacks = $temp;
			}
		}

		$realFallback = Language::getFallbackFor( $code );
		if ( $realFallback && $realFallback !== 'en' ) {
			$fallbacks = array_merge( array( $realFallback ), $fallbacks );
		}

		return $fallbacks;
	}

	private static function doBox( $msg, $code, $title = false, $makelink = false, $group = false ) {
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

		if( $makelink ) {
			$skin = $wgUser->getSkin();
			$linkTitle = Title::newFromText( $makelink );
			$title = $skin->link(
				$linkTitle,
				$title,
				array(),
				array( 'action' => 'edit' )
			);
		}

		if( $group && $attributes['class'] == 'mw-sp-translate-edit-definition' ) {
			global $wgLang;

			$skin = $wgUser->getSkin();
			$userLang = $wgLang->getCode();
			$groupId = $group->getId();
			$linkTitle = SpecialPage::getTitleFor( 'Translate' );
			$title = $skin->link(
				$linkTitle,
				$title,
				array(),
				array(
					'group' => $groupId,
					'language' => $userLang
				)
			);
		}
		return TranslateUtils::fieldset( $title, Xml::tags( 'code', null, $msg ), $attributes );
	}

	/**
	* @return Array of the message and the language
	*/
	private static function figureMessage( Title $title ) {
		$text = $title->getDBkey();
		$pos = strrpos( $text, '/' );
		$code = substr( $text, $pos + 1 );
		$key = substr( $text, 0, $pos );
		return array( $key, $code );
	}

	public static function getKeyCodeGroup( Title $title ) {
		list( $key, $code ) = self::figureMessage( $title );
		$group = self::getMessageGroup( $title->getNamespace(), $key );
		return array( $key, $code, $group );
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
		$group = $wgRequest->getText( 'loadgroup', '' );
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
		global $wgTranslateDocumentationLanguageCode, $wgOut, $wgTranslateMessageNamespaces;

		list( $key, $code, $group ) = self::getKeyCodeGroup( $object->mTitle );
		if ( $group === null ) return;

		list( $nsMain, /* $nsTalk */ ) = $group->namespaces;

		$en = $group->getMessage( $key, 'en' );
		$xx = $group->getMessage( $key, $code );

		$boxes = array();
		// In other languages (if any)
		$inOtherLanguages = array();
		$namespace = $object->mTitle->getNsText();
		foreach ( self::getFallbacks( $code ) as $fbcode ) {
			$fb = TranslateUtils::getMessageContent( $key, $fbcode, $nsMain );
			if ( $fb !== null ) {
				/* add a link for editing the fallback messages */
				$inOtherLanguages[] = self::dobox( $fb, $fbcode, false, $namespace . ':' . $key . '/' . $fbcode );
			}
		}
		if ( count( $inOtherLanguages ) ) {
			$boxes[] = TranslateUtils::fieldset( wfMsgHtml( self::MSG . 'in-other-languages' , $key ),
				implode( "\n", $inOtherLanguages ), array( 'class' => 'mw-sp-translate-edit-inother' ) );
		}

		// User provided documentation
		if ( $wgTranslateDocumentationLanguageCode ) {
			global $wgUser;
			$title = Title::makeTitle( $nsMain, $key . '/' . $wgTranslateDocumentationLanguageCode );
			$edit = $wgUser->getSkin()->link(
				$title,
				wfMsgHtml( self::MSG . 'contribute' ),
				array(),
				array( 'action' => 'edit' )
			);
			$info = TranslateUtils::getMessageContent( $key, $wgTranslateDocumentationLanguageCode, $nsMain );
			if ( $info === null ) {
				$info = $group->getMessage( $key, $wgTranslateDocumentationLanguageCode );
			}
			$class = 'mw-sp-translate-edit-info';
			if ( $info === null && in_array( $nsMain, $wgTranslateMessageNamespaces ) ) {
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

			if ( $info ) {
				$contents = $wgOut->parse( $info );
				// Remove whatever block element wrapup the parser likes to add
				$contents = preg_replace( '~^<([a-z]+)>(.*)</\1>$~us', '\2', $contents );
				$boxes[] = TranslateUtils::fieldset(
					wfMsgHtml( self::MSG . 'information', $edit , $key ), $contents, array( 'class' => $class )
				);
			}
		}

		// Can be either NULL or '', ARGH!
		if ( $object->textbox1 === '' ) {
			$editField = null;
		} else {
			$editField = $object->textbox1;
		}

		if ( $xx !== null && $code !== 'en' ) {
			// Append translation from the file to edit area, if it's empty.
			if ( $object->firsttime && $editField === null ) {
				$object->textbox1 = $xx;
			}
		}

		global $wgEnablePageTranslation;
		if ( $wgEnablePageTranslation && $group instanceof WikiPageMessageGroup ) {
			// TODO: encapsulate somewhere
			$page = TranslatablePage::newFromTitle( $group->title );
			$rev = $page->getTransRev( "$key/$code" );
			$latest = $page->getMarkedTag();
			if ( $rev !== $latest ) {
				$oldpage = TranslatablePage::newFromRevision( $group->title, $rev );
				$oldtext = null;
				$newtext = null;
				foreach ( $oldpage->getParse()->getSectionsForSave() as $section ) {
					if ( $group->title->getPrefixedText() .'/'. $section->id === $key ) {
						$oldtext = $section->getTextForTrans();
					}
				}

				foreach ( $page->getParse()->getSectionsForSave() as $section ) {
					if ( $group->title->getPrefixedText() .'/'. $section->id === $key ) {
						$newtext = $section->getTextForTrans();
					}
				}

				if ( $oldtext !== $newtext ) {
					wfLoadExtensionMessages( 'PageTranslation' );
					$diff = new DifferenceEngine;
					$diff->setText( $oldtext, $newtext );
					$boxes[] = $diff->getDiff( wfMsgHtml('tpt-diff-old'), wfMsgHtml('tpt-diff-new') );
					$diff->showDiffStyle();
				}
			}
		}

		// Definition
		if ( $en !== null ) {
			$label = " ({$group->getLabel()})";
			$boxes[] = self::doBox( $en, 'en', wfMsg( self::MSG . 'definition' ) . $label, false, $group );
		}


		// Some syntactic checks
		$translation = ( $editField !== null ) ? $editField : $xx;
		if ( $translation !== null && $code !== $wgTranslateDocumentationLanguageCode) {
			$message = new FatMessage( $key, $en );
			// Take the contents from edit field as a translation
			$message->setTranslation( $translation );
			$checker = MessageChecks::getInstance();
			if ( $checker->hasChecks( $group->getType() ) ) {
				$checks = $checker->doChecks( $message, $group->getType(), $code );
				if ( count( $checks ) ) {
					$checkMessages = array();
					foreach ( $checks as $checkParams ) {
						array_splice( $checkParams, 1, 0, 'parseinline' );
						$checkMessages[] = call_user_func_array( 'wfMsgExt', $checkParams );
					}

					$boxes[] = TranslateUtils::fieldset(
						wfMsgHtml( self::MSG . 'warnings' ), implode( '<hr />', $checkMessages ),
						array( 'class' => 'mw-sp-translate-edit-warnings' ) );
				}
			}
		}

		TranslateUtils::injectCSS();
		return Xml::tags( 'div', array( 'class' => 'mw-sp-translate-edit-fields' ), implode( "\n\n", $boxes ) );
	}

	public static function tabs( $skin, &$tabs ) {
		global $wgTranslateMessageNamespaces;
		$ns = $skin->mTitle->getNamespace();

		if ( !in_array( $ns, $wgTranslateMessageNamespaces) ) return true;

		unset( $tabs['protect'] );

		return true;
	}

	public static function keepFields( $edit, $out ) {
		global $wgRequest;
		$out->addHTML( "\n" .
			Xml::hidden( 'loadgroup', $wgRequest->getText( 'loadgroup' ) ) .
			Xml::hidden( 'loadtask', $wgRequest->getText( 'loadtask' ) ) .
			"\n"
		);
		return true;
	}

	public static function onSave( $article, $user, $text, $summary,
			$minor, $_, $_, $flags, $revision ) {

		global $wgTranslateMessageNamespaces;

		$title = $article->getTitle();

		$ns = $title->getNamespace();
		if ( !in_array( $ns, $wgTranslateMessageNamespaces) ) return true;

		list( $key, $code, $group ) = self::getKeyCodeGroup( $title );
		$cache = new ArrayMemoryCache( 'groupstats' );
		$cache->clear( $group->getId(), $code );

		$fuzzy = false;

		// Check for explicit tag
		if ( strpos( $text, TRANSLATE_FUZZY ) !== false ) $fuzzy = true;

		// Check for problems
		global $wgTranslateDocumentationLanguageCode;
		if ( !$fuzzy && $code !== $wgTranslateDocumentationLanguageCode ) {
			$message = new FatMessage( $key, $en );
			// Take the contents from edit field as a translation
			$message->setTranslation( $translation );
			$checker = MessageChecks::getInstance();
			if ( $checker->hasChecks( $group->getType() ) ) {
				$checks = $checker->doChecks( $message, $group->getType(), $code );
				if ( count( $checks ) ) $fuzzy = true;
			}
		}

		if ( $fuzzy === false ) return true;

		// Update it
		if ( $revision === null ) {
			$rev = $article->getTitle()->getLatestRevId();
		} else {
			$rev = $revision->getID();
		}

		// Add the ready tag
		$dbw = wfGetDB( DB_MASTER );

		$id = $dbw->selectField( 'revtag_type', 'rtt_id', array( 'rtt_name' => 'fuzzy' ), __METHOD__ );

		$conds = array(
			'rt_page' => $article->getTitle()->getArticleId(),
			'rt_type' => $id,
			'rt_revision' => $rev
		);
		$dbw->delete( 'revtag', $conds, __METHOD__ );
		$dbw->insert( 'revtag', $conds, __METHOD__ );

		return true;
	}

}

