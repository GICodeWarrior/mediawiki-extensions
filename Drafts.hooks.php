<?php
/**
 * Hooks for Drafts extension
 *
 * @file
 * @ingroup Extensions
 */

class DraftHooks {

	/* Static Functions */
	public static function schema( $updater = null ) {
		if ( $updater === null ) {
			global $wgExtNewTables, $wgExtModifiedFields, $wgDBtype;

			$wgExtNewTables[] = array(
				'drafts',
				dirname( __FILE__ ) . '/Drafts.sql'
			);
			if ( $wgDBtype != 'sqlite' ) {
				$wgExtModifiedFields[] = array(
					'drafts',
					'draft_token',
					dirname( __FILE__ ) . '/patch-draft_token.sql'
				);
			}
		} else {
			$updater->addExtensionUpdate( array( 'addTable', 'drafts',
				dirname( __FILE__ ) . '/Drafts.sql', true ) );
			if ( $updater->getDb()->getType() != 'sqlite' ) {
				$updater->addExtensionUpdate( array( 'modifyField', 'drafts', 'draft_token',
					dirname( __FILE__ ) . '/patch-draft_token.sql', true ) );
			}
		}

		return true;
	}

	/**
	 * SpecialMovepageAfterMove hook
	 */
	public static function move( $this, $ot, $nt ) {
		// Update all drafts of old article to new article for all users
		Drafts::move( $ot, $nt );
		// Continue
		return true;
	}

	/**
	 * ArticleSaveComplete hook
	 */
	public static function discard( $article, $user, $text, $summary, $m,
		$watchthis, $section, $flags, $rev
	) {
		global $wgRequest;
		// Check if the save occured from a draft
		$draft = Draft::newFromID( $wgRequest->getIntOrNull( 'wpDraftID' ) );
		if ( $draft->exists() ) {
			// Discard the draft
			$draft->discard( $user );
		}
		// Continue
		return true;
	}

	/**
	 * EditPage::showEditForm:initial hook
	 * Load draft...
	 */
	public static function loadForm( $editpage ) {
		global $wgUser, $wgRequest, $wgOut, $wgTitle, $wgLang;
		// Check permissions
		if ( $wgUser->isAllowed( 'edit' ) && $wgUser->isLoggedIn() ) {
			// Get draft
			$draft = Draft::newFromID( $wgRequest->getIntOrNull( 'draft' ) );
			// Load form values
			if ( $draft->exists() ) {
				// Override initial values in the form with draft data
				$editpage->textbox1 = $draft->getText();
				$editpage->summary = $draft->getSummary();
				$editpage->scrolltop = $draft->getScrollTop();
				$editpage->minoredit = $draft->getMinorEdit() ? true : false;
			}

			// Save draft on non-save submission
			if ( $wgRequest->getVal( 'action' ) == 'submit' &&
				$wgUser->editToken() == $wgRequest->getText( 'wpEditToken' ) &&
				is_null( $wgRequest->getText( 'wpDraftTitle' ) ) )
			{
				// If the draft wasn't specified in the url, try using a
				// form-submitted one
				if ( !$draft->exists() ) {
					$draft = Draft::newFromID(
						$wgRequest->getIntOrNull( 'wpDraftID' )
					);
				}
				// Load draft with info
				$draft->setTitle( Title::newFromText(
					$wgRequest->getText( 'wpDraftTitle' ) )
				);
				$draft->setSection( $wgRequest->getInt( 'wpSection' ) );
				$draft->setStartTime( $wgRequest->getText( 'wpStarttime' ) );
				$draft->setEditTime( $wgRequest->getText( 'wpEdittime' ) );
				$draft->setSaveTime( wfTimestampNow() );
				$draft->setScrollTop( $wgRequest->getInt( 'wpScrolltop' ) );
				$draft->setText( $wgRequest->getText( 'wpTextbox1' ) );
				$draft->setSummary( $wgRequest->getText( 'wpSummary' ) );
				$draft->setMinorEdit( $wgRequest->getInt( 'wpMinoredit', 0 ) );
				// Save draft
				$draft->save();
				// Use the new draft id
				$wgRequest->setVal( 'draft', $draft->getID() );
			}
		}
		// Internationalization

		$numDrafts = Drafts::num( $wgTitle );
		// Show list of drafts
		if ( $numDrafts  > 0 ) {
			if ( $wgRequest->getText( 'action' ) !== 'submit' ) {
				$wgOut->addHTML( Xml::openElement(
					'div', array( 'id' => 'drafts-list-box' ) )
				);
				$wgOut->addHTML( Xml::element(
					'h3', null, wfMsg( 'drafts-view-existing' ) )
				);
				Drafts::display( $wgTitle );
				$wgOut->addHTML( Xml::closeElement( 'div' ) );
			} else {
				$jsWarn = "if( !wgAjaxSaveDraft.insync ) return confirm('" .
					Xml::escapeJsString( wfMsgHTML( 'drafts-view-warn' ) ) .
					"')";
				$link = Xml::element( 'a',
					array(
						'href' => $wgTitle->getFullURL( 'action=edit' ),
						'onclick' => $jsWarn
					),
					wfMsgExt(
						'drafts-view-notice-link',
						array( 'parsemag' ),
						$wgLang->formatNum( $numDrafts )
					)
				);
				$wgOut->addHTML( wfMsgHTML( 'drafts-view-notice', $link ) );
			}
		}
		// Continue
		return true;
	}

	/**
	 * EditFilter hook
	 * Intercept the saving of an article to detect if the submission was from
	 * the non-javascript save draft button
	 */
	public static function interceptSave( $editor, $text, $section, $error ) {
		global $wgRequest;
		// Don't save if the save draft button caused the submit
		if ( $wgRequest->getText( 'wpDraftSave' ) !== '' ) {
			// Modify the error so it's clear we want to remain in edit mode
			$error = ' ';
		}
		// Continue
		return true;
	}

	/**
	 * EditPageBeforeEditButtons hook
	 * Add draft saving controls
	 */
	public static function controls( $editpage, $buttons ) {
		global $wgUser, $wgTitle, $wgRequest;
		global $egDraftsAutoSaveWait, $egDraftsAutoSaveTimeout;
		// Check permissions
		if ( $wgUser->isAllowed( 'edit' ) && $wgUser->isLoggedIn() ) {
			// Internationalization

			// Build XML
			$buttons['savedraft'] = Xml::openElement( 'script',
				array(
					'type' => 'text/javascript',
					'language' => 'javascript'
				)
			);
			$buttonAttribs = array(
				'id' => 'wpDraftSave',
				'name' => 'wpDraftSave',
				'tabindex' => 8,
				'value' => wfMsg( 'drafts-save-save' ),
			);
			$accesskey = $wgUser->getSkin()->accesskey( 'drafts-save' );
			if ( $accesskey !== false ) {
				$buttonAttribs['accesskey'] = $accesskey;
			}
			$tooltip = $wgUser->getSkin()->titleAttrib(
				'drafts-save', 'withaccess'
			);
			if ( $tooltip !== false ) {
				$buttonAttribs['title'] = $tooltip;
			}
			$ajaxButton = Xml::escapeJsString(
				Xml::element( 'input',
					array( 'type' => 'button' ) + $buttonAttribs
					+ ( $wgRequest->getText( 'action' ) !== 'submit' ?
						array ( 'disabled' => 'disabled' )
						: array()
					)
				)
			);
			$buttons['savedraft'] .= "document.write( '{$ajaxButton}' );";
			$buttons['savedraft'] .= Xml::closeElement( 'script' );
			$buttons['savedraft'] .= Xml::openElement( 'noscript' );
			$buttons['savedraft'] .= Xml::element( 'input',
				array( 'type' => 'submit' ) + $buttonAttribs
			);
			$buttons['savedraft'] .= Xml::closeElement( 'noscript' );
			$buttons['savedraft'] .= Xml::element( 'input',
				array(
					'type' => 'hidden',
					'name' => 'wpDraftAutoSaveWait',
					'value' => $egDraftsAutoSaveWait
				)
			);
			$buttons['savedraft'] .= Xml::element( 'input',
				array(
					'type' => 'hidden',
					'name' => 'wpDraftAutoSaveTimeout',
					'value' => $egDraftsAutoSaveTimeout
				)
			);
			$buttons['savedraft'] .= Xml::element( 'input',
				array(
					'type' => 'hidden',
					'name' => 'wpDraftToken',
					'value' => wfGenerateToken()
				)
			);
			$buttons['savedraft'] .= Xml::element( 'input',
				array(
					'type' => 'hidden',
					'name' => 'wpDraftID',
					'value' => $wgRequest->getInt( 'draft', '' )
				)
			);
			$buttons['savedraft'] .= Xml::element( 'input',
				array(
					'type' => 'hidden',
					'name' => 'wpDraftTitle',
					'value' => $wgTitle->getPrefixedText()
				)
			);
			$buttons['savedraft'] .= Xml::element( 'input',
				array(
					'type' => 'hidden',
					'name' => 'wpMsgSaved',
					'value' => wfMsg( 'drafts-save-saved' )
				)
			);
			$buttons['savedraft'] .= Xml::element( 'input',
				array(
					'type' => 'hidden',
					'name' => 'wpMsgSaving',
					'value' => wfMsg( 'drafts-save-saving' )
				)
			);
			$buttons['savedraft'] .= Xml::element( 'input',
				array(
					'type' => 'hidden',
					'name' => 'wpMsgSaveDraft',
					'value' => wfMsg( 'drafts-save-save' )
				)
			);
			$buttons['savedraft'] .= Xml::element( 'input',
				array(
					'type' => 'hidden',
					'name' => 'wpMsgError',
					'value' => wfMsg( 'drafts-save-error' )
				)
			);
		}
		// Continue
		return true;
	}

	/**
	 * AjaxAddScript hook
	 * Add AJAX support script
	 */
	public static function addJS( $out ) {
		global $wgScriptPath, $wgJsMimeType, $wgDraftsStyleVersion;
		// FIXME: assumes standard dir structure
		// Add JavaScript to support AJAX draft saving
		$out->addScript(
			Xml::element(
				'script',
				array(
					'type' => $wgJsMimeType,
					'src' => $wgScriptPath . '/extensions/Drafts/Drafts.js?' .
						$wgDraftsStyleVersion
				),
				'',
				false
			)
		);
		// Continue
		return true;
	}

	/**
	 * BeforePageDisplay hook
	 * Add CSS style sheet
	 */
	public static function addCSS( $out ) {
		global $wgScriptPath, $wgDraftsStyleVersion;
		// FIXME: assumes standard dir structure
		// Add CSS for various styles
		$out->addLink(
			array(
				'rel' => 'stylesheet',
				'type' => 'text/css',
				'href' => $wgScriptPath . '/extensions/Drafts/Drafts.css?' .
					$wgDraftsStyleVersion,
			)
		);
		// Continue
		return true;
	}

	/**
	 * AJAX function export DraftHooks::AjaxSave
	 * Respond to AJAX queries
	 */
	public static function save( $dtoken, $etoken, $id, $title, $section,
		$starttime, $edittime, $scrolltop, $text, $summary, $minoredit
	) {
		global $wgUser, $wgRequest;
		// Verify token
		if ( $wgUser->editToken() == $etoken ) {
			// Create Draft
			$draft = Draft::newFromID( $id );
			// Load draft with info
			$draft->setToken( $dtoken );
			$draft->setTitle( Title::newFromText( $title ) );
			$draft->setSection( $section == '' ? null : $section );
			$draft->setStartTime( $starttime );
			$draft->setEditTime( $edittime );
			$draft->setSaveTime( wfTimestampNow() );
			$draft->setScrollTop( $scrolltop );
			$draft->setText( $text );
			$draft->setSummary( $summary );
			$draft->setMinorEdit( $minoredit );
			// Save draft
			$draft->save();
			// Return draft id to client (used for next save)
			return (string) $draft->getID();
		} else {
			// Return failure
			return '-1';
		}
	}
}
