<?php

class SpecialManageGroups {

	protected $skin, $user, $out;

	protected $processingTime = 10; // Seconds

	public function __construct() {
		global $wgOut, $wgUser;
		$this->out = $wgOut;
		$this->user = $wgUser;
		$this->skin = $wgUser->getSkin();
	}

	public function execute() {
		global $wgRequest;

		$this->out->setPageTitle( htmlspecialchars( wfMsg( 'translate-managegroups' ) ) );


		$group = $wgRequest->getText( 'group' );
		// group action
		$gaction = $wgRequest->getText( 'gaction', 'details' );

		$group = MessageGroups::getGroup( $group );

		if ( $group ) {
			$languages = array_keys( Language::getLanguageNames(false) );
			if ( $gaction === 'import' ) {
				$cache = new MessageGroupCache( $group );
				foreach ( $languages as $code ) {
					$small = $group->load($code);
					if ( count($small) ) $cache->create( $small, $code );
				}
				
			} elseif ( $gaction === 'details' ) {
				$cache = new MessageGroupCache( $group );
				if ( !$cache->exists() ) {
					$this->actionDetailsNew( $group );
					return;
				} else {
					$code = $wgRequest->getText( 'language', 'en' );
					$this->importForm( $cache, $group, $code );
				}
			}
		} else {

			global $wgLang, $wgOut;
			$groups = MessageGroups::singleton()->getGroups();
			$wgOut->wrapWikiMsg( '==$1==', 'translate-manage-listgroups' );
			foreach ( $groups as $group ) {
				if ( !$group instanceof FileBasedMessageGroup ) continue;


				$link = $this->skin->link( $this->getTitle(), $group->getLabel(), array(), array( 'group' => $group->getId() ) );
				$wgOut->addHtml( $link );

				$cache = new MessageGroupCache( $group );
				if ( $cache->exists() ) {
					$timestamp = wfTimestamp( TS_MW, $cache->getTimestamp() );
					$wgOut->addWikiMsg( 'translate-manage-cacheat',
						$wgLang->date( $timestamp ),
						$wgLang->time( $timestamp )
					);
				} else {
					$wgOut->addWikiMsg( 'translate-manage-newgroup' );
				}
				$wgOut->addHtml( '<hr>' );
			}

			global $wgOut;
			$wgOut->wrapWikiMsg( '==$1==', 'translate-manage-listgroups-old' );
			$wgOut->addHTML( '<ul>' );
			foreach ( $groups as $group ) {
				if ( $group instanceof FileBasedMessageGroup ) continue;
				$wgOut->addHtml( Xml::element( 'li', null, $group->getLabel() ) );
			}
			$wgOut->addHTML( '</ul>' );

		}
	}

	protected function makeSectionElement( $legend, $type, $content ) {
		$containerParams = array( 'class' => "mw-tpt-sp-section mw-tpt-sp-section-type-{$type}" );
		$legendParams = array( 'class' => 'mw-translate-manage-legend' );
		$contentParams = array( 'class' => 'mw-tpt-sp-content' );

		return Xml::tags( 'div', $containerParams,
			Xml::tags( 'div', $legendParams, $legend ) .
			Xml::tags( 'div', $contentParams, $content )
		);
	}

	public function getTitle() {
		return SpecialPage::getTitleFor( 'Translate', 'manage' );
	}

	public function actionDetailsNew( MessageGroup $group ) {
		$this->out->addWikiMsg( 'translate-manage-newgroup' );
		$messages = $group->load( 'en' );

		foreach ( $messages as $key => $value ) {
			$name = wfMsgHtml( 'tpt-section-new', htmlspecialchars($key) );
			$text = TranslateUtils::convertWhiteSpaceToHTML( $value );
			$wgOut->addHTML( $this->makeSectionElement( $name, 'new', $text ) );
		}
	}

	public function importForm( $cache, $group, $code ) {
		$this->setSubtitle( $group, $code );

		$formParams = array(
			'method' => 'post',
			'action' => $this->getTitle()->getFullURL( array( 'group' => $group->getId() ) ),
			'class'  => 'mw-translate-manage'
		);

		global $wgRequest;
		if ( $wgRequest->wasPosted() &&
			$this->user->isAllowed( 'translate-manage' ) &&
			$this->user->matchEditToken( $wgRequest->getVal( 'token' ) ) ) {
			$process = true;
		} else {
			$process = false;
		}

		$this->out->addHTML(
			Xml::openElement( 'form', $formParams ) .
			Xml::hidden( 'title', $this->getTitle()->getPrefixedText() ) .
			Xml::hidden( 'token', $this->user->editToken() ) .
			Xml::hidden( 'group', $group->getId() )
		);

		// BEGIN
		$messages = $group->load( $code );

		$compareToDB = $code !== 'en';

		if ( $compareToDB ) {
			$collection = $group->initCollection( $code );
			$collection->loadTranslations();
		} else {
			$cache = new MessageGroupCache( $group );
		}

		$diff = new DifferenceEngine;
		$diff->showDiffStyle();
		$diff->setReducedLineNumbers();

		$changed = array();
		foreach ( $messages as $key => $value ) {
		

			$fuzzy = false;
			if ( $compareToDB ) {
				$old = $collection[$key]->translation();
				$fuzzy = TranslateEditAddons::hasFuzzyString( $old ) ||
				         TranslateEditAddons::isFuzzy( self::makeTitle( $group, $key, $code ) );
				$old = str_replace( TRANSLATE_FUZZY, '', $old );
			} else {
				$old = $cache->get($key, $code);
			}

			// No changes at all, ignore
			if ( $old === $value ) continue;

			if ( $old === false ) {
				$name = wfMsgHtml( 'translate-manage-import-new', 
					'<code style="font-weight:normal;">' . htmlspecialchars($key) . '</code>'
				);
				$text = TranslateUtils::convertWhiteSpaceToHTML( $value );
				$changed[] = $this->makeSectionElement( $name, 'new', $text );
			} else {
				if ( $fuzzy ) $old = TRANSLATE_FUZZY . $old;
				$diff->setText( $old, $value );
				$text = $diff->getDiff( '', '' );
				$type = 'changed';

				if ( $process ) {
					if ( !count($changed) ) $changed[] = '<ul>';

					global $wgRequest, $wgLang;
					$action = $wgRequest->getVal( "action-$type-$key" );
					if ( $action === null ) {
						$message = wfMsgExt( 'translate-manage-inconsistent', 'parseinline', wfEscapeWikiText( "action-$type-$key" ) );
						$changed[] = "<li>$message</li></ul>";
						$process = false;
					} else {
						// Check processing time
						if ( !isset($this->time) ) $this->time = wfTimestamp();

						$message = $this->doAction( $action, $group, $key, $code, $value );

						$key = array_shift( $message );
						$params = $message;
						$message = wfMsgExt( $key, 'parseinline', $params );
						$changed[] = "<li>$message</li>";

						if ( $this->checkProcessTime() ) {
							$process = false;
							$duration = $wgLang->formatNum( $this->processingTime );
							$message = wfMsgExt( 'translate-manage-toolong', 'parseinline', $duration );
							$changed[] = "<li>$message</li></ul>";
						}
						continue;
					}
				}

				if ( $compareToDB ) {
					$actions = array( 'import', 'conflict', 'ignore' );
				} else {
					$actions = array( 'import', 'fuzzy', 'ignore' );
				}

				$act = array();
				$defaction = $fuzzy ? 'conflict' : 'import';
				foreach ( $actions as $action ) {
					$label = wfMsg( "translate-manage-action-$action" );
					$act[] = Xml::radioLabel( $label, "action-$type-$key", $action, "action-$key-$action", $action === $defaction );
				}

				$name = wfMsg( 'translate-manage-import-diff',
					'<code style="font-weight:normal;">' . htmlspecialchars($key) . '</code>',
					implode( ' ', $act )
				);

				$changed[] = $this->makeSectionElement( $name, $type, $text );
			}
		}


		if ( !$process ) {
			if ( $compareToDB ) {
				$collection->filter( 'hastranslation', false );
				$keys = array_keys($collection->keys());
			} else {
				$keys = $cache->getKeys($code);
			}

			$diff = array_diff( $keys, array_keys($messages) );

			foreach ( $diff as $s ) {
				$name = wfMsgHtml( 'translate-manage-import-deleted',
					'<code style="font-weight:normal;">' . htmlspecialchars($s) . '</code>'
				);
				$text = TranslateUtils::convertWhiteSpaceToHTML(  $collection[$s]->translation() );
				$changed[] = $this->makeSectionElement( $name, 'deleted', $text );
			}
		}

		if ( $process || (!count($changed) && $code !== 'en') ) {
			if ( !count($changed) ) $this->out->addWikiMsg( 'translate-manage-nochanges-other' );

			if ( !count($changed) || strpos( $changed[count($changed)-1], '<li>' ) !== 0 ) $changed[] = '<ul>';

			$cache->create( $messages, $code );
			$message = wfMsgExt( 'translate-manage-import-rebuild', 'parseinline' );
			$changed[] = "<li>$message</li>";
			$message = wfMsgExt( 'translate-manage-import-done', 'parseinline' );
			$changed[] = "<li>$message</li></ul>";
			$this->out->addHTML( implode( "\n", $changed ) );
		} else {

			// END

			if ( count($changed) ) {
				if ( $code === 'en' ) {
					$this->out->addWikiMsg( 'translate-manage-intro-en' );
				} else {
					global $wgLang;
					$lang = TranslateUtils::getLanguageName( $code, false, $wgLang->getCode() );
					$this->out->addWikiMsg( 'translate-manage-intro-other', $lang );
				}
				$this->out->addHTML( Xml::hidden( 'language', $code ) );
				$this->out->addHTML( implode( "\n", $changed ) );
				$this->out->addHTML( Xml::submitButton( wfMsg( 'translate-manage-submit' ) ) );
			} else {
				$this->out->addWikiMsg( 'translate-manage-nochanges' );
			}
		}

		if ( $code === 'en' ) {
			$this->doModLangs( $cache, $group );
		} else {

			$this->out->addHTML( '<p>' . $this->skin->link(
				$this->getTitle(),
				wfMsgHtml( 'translate-manage-return-to-group' ),
				array(),
				array( 'group' => $group->getId() )
			) . '</p>' );
		}

		$this->out->addHTML( '</form>' );
	}

	public function doModLangs( $cache, $group ) {
		global $wgLang;
		$languages = array_keys( Language::getLanguageNames(false) );
		$modified = array();
		foreach ( $languages as $code ) {
			$filename = $group->getSourceFilePath( $code );
			$mtime = file_exists( $filename ) ? filemtime( $filename ) : false;
			$cachetime = $cache->exists($code) ? $cache->getTimestamp($code) : false;
			if ( $mtime === false && $cachetime === false ) continue;

			$link = $this->skin->link(
				$this->getTitle(),
				htmlspecialchars( TranslateUtils::getLanguageName( $code, false, $wgLang->getCode() ) . " ($code)" ),
				array(),
				array( 'group' => $group->getId(), 'language' => $code )
			);

			if ( $mtime === false ) {
				$modified[] = wfMsgHtml( 'translate-manage-modlang-new', $link  );
			} elseif ( $mtime > $cachetime  ) {
				$modified[] = $link;
			}
		}

		if ( count($modified) ) {
			$this->out->addWikiMsg( 'translate-manage-modlangs',
				$wgLang->formatNum( count($modified) )
			);

			$this->out->addHTML(
				'<ul><li>' . implode( "</li>\n<li>", $modified ) . '</li></ul>'
			);
		}
	}

	protected function doAction( $action, $group, $key, $code, $message, $comment = '' ) {
		if ( $action === 'import' || $action === 'conflict' ) {

			if ( $action === 'import' ) {
				$comment = wfMsgForContentNoTrans( 'translate-manage-import-summary' );
			} else {
				$comment = wfMsgForContentNoTrans( 'translate-manage-conflict-summary' );
				$message = TRANSLATE_FUZZY . $message;
			}

			$title = self::makeTitle( $group, $key, $code );
			return $this->doImport( $title, $message, $comment );
		} elseif ( $action === 'ignore' ) {
			return array( 'translate-manage-import-ignore', $key );
		} elseif ( $action === 'fuzzy' ) {
			return $this->doFuzzy( $title, $message, $comment );
		} else {
			throw new MWException( "Unhandled action $action" );
		}
	}

	protected function checkProcessTime() {
		return wfTimestamp() - $this->time >= $this->processingTime;
	}

	protected function doImport( $title, $message, $comment, $user = null ) {
		$flags = EDIT_FORCE_BOT;
		$article = new Article( $title );		 
		$status = $article->doEdit( $message, $comment, $flags );
		$success = $status->isOK();

		if ( $success ) {
			return array( 'translate-manage-import-ok',
				wfEscapeWikiText( $title->getPrefixedText() )
			);
		} else {
			throw new MWException( "Failed to import new version of page {$title->getPrefixedText()}\n{$status->getWikiText()}" );
		}
	}

	protected function doFuzzy( $title, $message, $comment ) {
		$dbw = wfGetDB( DB_MASTER );
		$titleText = $title->getDBKey();
		$condArray = array(
			'page_namespace'    => $title->getNamespace(),
			'page_latest=rev_id',
			'rev_text_id=old_id',
			"page_title LIKE '{$dbw->escapeLike( $titleText )}/%%'"
		);

		$rows = $dbr->select(
			array( 'page', 'revision', 'text' ),
			array( 'page_title', 'page_namespace', 'old_text', 'old_flags' ),
			$conds,
			__METHOD__
		);

		$changed = array();
		$fuzzybot = self::getFuzzyBot();
		foreach ( $rows as $row ) {
			$ttitle = Title::makeTitle( $row->page_namespace, $row->page_title );

			$changed[] = $this->doImport(
				$ttitle,
				TRANSLATE_FUZZY . Revision::getRevisionText( $row ),
				$comment,
				$fuzzybot
			);

			if ( $this->checkProcessTime() ) break;

		}

		if ( count($changed) === count($rows) ) {
			$comment = wfMsgForContentNoTrans( 'translate-manage-import-summary' );
			$changed[] = $this->doImport( $title, $message, $comment );
		}

		$text = '';
		foreach ( $changed as $c ) {
			$key = array_shift( $c );
			$text = "* " . wfMsgExt( $key, array(), $c );
		}

		return array( 'translate-manage-import-fuzzy',
			"\n" . $text
		);
	}

	protected static function getFuzzyBot() {
		global $wgTranslateFuzzyBotName;
		$user = User::newFromName( $wgTranslateFuzzyBotName );
		if ( !$user->isLoggedIn() ) $user->addToDatabase();
		return $user;
	}

	protected static function makeTitle( $group, $key, $code ) {
		$ns = $group->getNamespace();
		$titlekey = "$key/$code";
		return Title::makeTitleSafe( $ns, $titlekey ); 
	}

	protected function setSubtitle( $group, $code ) {
		global $wgLang;
		$links[] = $this->skin->link(
			$this->getTitle(),
			wfMsgHtml( 'translate-manage-subtitle' )
		);

		$links[] = $this->skin->link(
			$this->getTitle(),
			$group->getLabel(),
			array(),
			array( 'group' => $group->getId() )
		);

		if ( $code !== 'en' ) {
			$links[] = $this->skin->link(
				$this->getTitle(),
				TranslateUtils::getLanguageName( $code, false, $wgLang->getCode() ),
				array(),
				array( 'group' => $group->getId(), 'language' => $code )
			);
		}

		$this->out->setSubtitle( implode( ' > ', $links ) );
	}

}