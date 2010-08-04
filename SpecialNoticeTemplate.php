<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "CentralNotice extension\n";
	exit( 1 );
}

class SpecialNoticeTemplate extends UnlistedSpecialPage {
	var $editable;

	function __construct() {
		parent::__construct( 'NoticeTemplate' );

		// Internationalization
		wfLoadExtensionMessages( 'CentralNotice' );
	}
	
	/*
	 * Handle different types of page requests.
	 */
	function execute( $sub ) {
		global $wgOut, $wgUser, $wgRequest, $wgScriptPath;

		// Begin output
		$this->setHeaders();
		
		// Add style file to the output headers
		$wgOut->addExtensionStyle( "$wgScriptPath/extensions/CentralNotice/centralnotice.css" );

		// Check permissions
		$this->editable = $wgUser->isAllowed( 'centralnotice-admin' );

		// Show summary
		$wgOut->addWikiMsg( 'centralnotice-summary' );

		// Show header
		CentralNotice::printHeader();

		// Begin Banners tab content
		$wgOut->addHTML( Xml::openElement( 'div', array( 'id' => 'preferences' ) ) );
		
		if ( $this->editable && $wgUser->matchEditToken( $wgRequest->getVal( 'authtoken' ) ) ) {
			// Handle forms
			if ( $wgRequest->wasPosted() ) {

				// Handle removing
				$toRemove = $wgRequest->getArray( 'removeTemplates' );
				if ( isset( $toRemove ) ) {
					// Remove templates in list
					foreach ( $toRemove as $template ) {
						$this->removeTemplate( $template );
					}
				}

				// Handle translation message update
				$update = $wgRequest->getArray( 'updateText' );
				$token  = $wgRequest->getArray( 'token' );
				if ( isset ( $update ) ) {
					foreach ( $update as $lang => $messages ) {
						foreach ( $messages as $text => $translation ) {
							// If we actually have text
							if ( $translation ) {
								$this->updateMessage( $text, $translation, $lang, $token );
							}
						}
					}
				}
			}

			// Handle adding
			// FIXME: getText()? weak comparison
			if ( $wgRequest->getVal( 'wpMethod' ) == 'addTemplate' ) {
				$this->addTemplate(
					$wgRequest->getVal( 'templateName' ),
					$wgRequest->getVal( 'templateBody' )
				);
				$sub = 'view';
			}
			if ( $wgRequest->getVal( 'wpMethod' ) == 'editTemplate' ) {
				$this->editTemplate(
					$wgRequest->getVal( 'template' ),
					$wgRequest->getVal( 'templateBody' )
				);
				$sub = 'view';
			}
		}

		// Handle viewing of a template in all languages
		if ( $sub == 'view' && $wgRequest->getVal( 'wpUserLanguage' ) == 'all' ) {
			$template =  $wgRequest->getVal( 'template' );
			$this->showViewAvailable( $template );
			return;
		}

		// Handle viewing a specific template
		if ( $sub == 'view' && $wgRequest->getText( 'template' ) != '' ) {
			$this->showView();
			return;
		}

		if ( $this->editable ) {
			// Handle "Add a banner" link
			if ( $sub == 'add' ) {
				$this->showAdd();
				return;
			}
			
			// Handle cloning a specific template
			if ( $sub == 'clone' && $wgUser->matchEditToken( $wgRequest->getVal( 'authtoken' ) ) ) {
				$oldTemplate = $wgRequest->getVal( 'oldTemplate' );
				$newTemplate =  $wgRequest->getVal( 'newTemplate' );
				// We use the returned name in case any special characters had to be removed
				$template = $this->cloneTemplate( $oldTemplate, $newTemplate );
				$wgOut->redirect( SpecialPage::getTitleFor( 'NoticeTemplate', 'view' )->getLocalUrl( "template=$template" ) );
				return;
			}
		}

		// Show list by default
		$this->showList();
		
		// End Banners tab content
		$wgOut->addHTML( Xml::closeElement( 'div' ) );
	}
	
	/*
	 * Show a list of available templates. Newer templates are shown first.
	 */
	function showList() {
		global $wgOut, $wgUser;

		$sk = $wgUser->getSkin();
		$pager = new NoticeTemplatePager( $this );
		
		// Begin building HTML
		$htmlOut = '';
		
		// Begin Manage Banners fieldset
		$htmlOut .= Xml::openElement( 'fieldset', array( 'class' => 'prefsection' ) );
		
		if ( !$pager->getNumRows() ) {
			$htmlOut .= Xml::element( 'p', null, wfMsg( 'centralnotice-no-templates' ) );
		} else {
			if ( $this->editable ) {
				$htmlOut .= Xml::openElement( 'form',
					array(
						'method' => 'post',
						'action' => ''
					 )
				);
			}
			$htmlOut .= Xml::element( 'h2', null, wfMsg( 'centralnotice-manage-templates' ) );
			$htmlOut .= $pager->getNavigationBar() .
				$pager->getBody() .
				$pager->getNavigationBar();
		
			if ( $this->editable ) {
				$htmlOut .= Xml::closeElement( 'form' );
			}
		}

		if ( $this->editable ) {
			$htmlOut .= Xml::element( 'p' );
			$newPage = SpecialPage::getTitleFor( 'NoticeTemplate', 'add' );
			$htmlOut .= $sk->makeLinkObj( $newPage, wfMsgHtml( 'centralnotice-add-template' ) );
		}
		
		// End Manage Banners fieldset
		$htmlOut .= Xml::closeElement( 'fieldset' );

		$wgOut->addHTML( $htmlOut );
	}

	function showAdd() {
		global $wgOut, $wgUser;

		// Build HTML
		$htmlOut = '';
		$htmlOut .= Xml::openElement( 'fieldset', array( 'class' => 'prefsection' ) );
		$htmlOut .= Xml::openElement( 'form', array( 'method' => 'post' ) );
		$htmlOut .= Xml::element( 'h2', null, wfMsg( 'centralnotice-add-template' ) );
		$htmlOut .= Xml::hidden( 'wpMethod', 'addTemplate' );
		$htmlOut .= Xml::tags( 'p', null,
			Xml::inputLabel(
				wfMsg( 'centralnotice-template-name' ),
				'templateName',
				'templateName',
				25
			)
		);
		$htmlOut .= Xml::tags( 'p', null,
			Xml::textarea( 'templateBody', '', 60, 20 )
		);
		$htmlOut .= Xml::hidden( 'authtoken', $wgUser->editToken() );
		
		// Submit button
		$htmlOut .= Xml::tags( 'div', 
			array( 'class' => 'cn-buttons' ), 
			Xml::submitButton( wfMsg( 'centralnotice-modify' ) ) 
		);
		
		$htmlOut .= Xml::closeElement( 'form' );
		$htmlOut .= Xml::closeElement( 'fieldset' );

		// Output HTML
		$wgOut->addHTML( $htmlOut );
	}

	private function showView() {
		global $wgOut, $wgUser, $wgRequest, $wgContLanguageCode;

		$sk = $wgUser->getSkin();
		if ( $this->editable ) {
			$readonly = array();
		} else {
			$readonly = array( 'readonly' => 'readonly' );
		}

		// Get token
		$token = $wgUser->editToken();

		// Get user's language
		$wpUserLang = $wgRequest->getVal( 'wpUserLanguage' ) ? $wgRequest->getVal( 'wpUserLanguage' ) : $wgContLanguageCode;

		// Get current template
		$currentTemplate = $wgRequest->getText( 'template' );
		
		// Begin building HTML
		$htmlOut = '';
		
		// Begin View Banner fieldset
		$htmlOut .= Xml::openElement( 'fieldset', array( 'class' => 'prefsection' ) );
		
		$htmlOut .= Xml::element( 'h2', null, wfMsg( 'centralnotice-template' ) . ': ' . $currentTemplate );

		// Show preview
		$render = new SpecialNoticeText();
		$render->project = 'wikipedia';
		$render->language = $wgRequest->getVal( 'wpUserLanguage' );
		if ( $render->language != '' ) {
			$htmlOut .= Xml::fieldset( wfMsg( 'centralnotice-preview' ) . " ($render->language)",
				$render->getHtmlNotice( $wgRequest->getText( 'template' ) )
			);
		} else {
			$htmlOut .= Xml::fieldset( wfMsg( 'centralnotice-preview' ),
				$render->getHtmlNotice( $wgRequest->getText( 'template' ) )
			);
		}

		// Pull text and respect any inc: markup
		$bodyPage = Title::newFromText( "Centralnotice-template-{$currentTemplate}", NS_MEDIAWIKI );
		$curRev = Revision::newFromTitle( $bodyPage );
		$body = $curRev ? $curRev->getText() : '';
		
		// Extract message fields from the template body
		$fields = array();
		preg_match_all( '/\{\{\{([A-Za-z0-9\_\-\x{00C0}-\x{017F}]+)\}\}\}/u', $body, $fields );
			
		// If there are any messages in the template, display translation tools.
		if ( count( $fields[0] ) > 0 ) {
			if ( $this->editable ) {
				$htmlOut .= Xml::openElement( 'form', array( 'method' => 'post' ) );
			}
			$htmlOut .= Xml::fieldset(
				wfMsg( 'centralnotice-translate-heading', $currentTemplate ),
				false,
				array( 'id' => 'mw-centralnotice-translations-for' )
			);
			$htmlOut .= Xml::openElement( 'table',
				array (
					'cellpadding' => 9,
					'width' => '100%'
				)
			);
	
			// Headers
			$htmlOut .= Xml::element( 'th', array( 'width' => '15%' ), wfMsg( 'centralnotice-message' ) );
			$htmlOut .= Xml::element( 'th', array( 'width' => '5%' ), wfMsg ( 'centralnotice-number-uses' )  );
			$htmlOut .= Xml::element( 'th', array( 'width' => '40%' ), wfMsg ( 'centralnotice-english' ) );
			$languages = Language::getLanguageNames();
			$htmlOut .= Xml::element( 'th', array( 'width' => '40%' ), $languages[$wpUserLang] );
			
			// Remove duplicate message fields
			$filteredFields = array();
			foreach ( $fields[1] as $field ) {
				$filteredFields[$field] = array_key_exists( $field, $filteredFields ) ? $filteredFields[$field] + 1 : 1;
			}
	
			// Rows
			foreach ( $filteredFields as $field => $count ) {
				// Message
				$message = ( $wpUserLang == 'en' ) ? "Centralnotice-{$currentTemplate}-{$field}" : "Centralnotice-{$currentTemplate}-{$field}/{$wpUserLang}";
	
				// English value
				$htmlOut .= Xml::openElement( 'tr' );
	
				$title = Title::newFromText( "MediaWiki:{$message}" );
				$htmlOut .= Xml::tags( 'td', null,
					$sk->makeLinkObj( $title, htmlspecialchars( $field ) )
				);
	
				$htmlOut .= Xml::element( 'td', null, $count );
	
				// English text
				$englishText = wfMsg( 'centralnotice-message-not-set' );
				$englishTextExists = false;
				if ( Title::newFromText( "Centralnotice-{$currentTemplate}-{$field}", NS_MEDIAWIKI )->exists() ) {
					$englishText = wfMsgExt( "Centralnotice-{$currentTemplate}-{$field}",
						array( 'language' => 'en' )
					);
					$englishTextExists = true;
				}
				$htmlOut .= Xml::tags( 'td', null,
					Xml::element( 'span',
						array( 'style' => 'font-style:italic;' . ( !$englishTextExists ? 'color:silver' : '' ) ),
						$englishText
					)
				);
	
				// Foreign text input
				$foreignText = '';
				$foreignTextExists = false;
				if ( Title::newFromText( $message, NS_MEDIAWIKI )->exists() ) {
					$foreignText = wfMsgExt( "Centralnotice-{$currentTemplate}-{$field}",
						array( 'language' => $wpUserLang )
					);
					$foreignTextExists = true;
				}
				$htmlOut .= Xml::tags( 'td', null,
					Xml::input( "updateText[{$wpUserLang}][{$currentTemplate}-{$field}]", '', $foreignText,
						wfArrayMerge( $readonly,
							array( 'style' => 'width:100%;' . ( !$foreignTextExists ? 'color:red' : '' ) ) )
					)
				);
				$htmlOut .= Xml::closeElement( 'tr' );
			}
			if ( $this->editable ) {
				$htmlOut .= Xml::hidden( 'authtoken', $token );
				$htmlOut .= Xml::hidden( 'wpUserLanguage', $wpUserLang );
				$htmlOut .= Xml::openElement( 'tr' );
				$htmlOut .= Xml::tags( 'td', array( 'colspan' => 4 ),
					Xml::submitButton( wfMsg( 'centralnotice-modify' ), array( 'name' => 'update' ) )
				);
				$htmlOut .= Xml::closeElement( 'tr' );
			}
	
			$htmlOut .= Xml::closeElement( 'table' );
			$htmlOut .= Xml::hidden( 'authtoken', $wgUser->editToken() );
			$htmlOut .= Xml::closeElement( 'fieldset' );
	
			if ( $this->editable ) {
				$htmlOut .= Xml::closeElement( 'form' );
			}
	
			/*
			 * Show language selection form
			 */
		 	$htmlOut .= Xml::openElement( 'form', array( 'method' => 'post' ) );
			$htmlOut .= Xml::fieldset( wfMsg( 'centralnotice-change-lang' ) );
			$htmlOut .= Xml::openElement( 'table', array ( 'cellpadding' => 9 ) );
			list( $lsLabel, $lsSelect ) = Xml::languageSelector( $wpUserLang );
	
			$newPage = SpecialPage::getTitleFor( 'NoticeTemplate', 'view' );
	
			$htmlOut .= Xml::tags( 'tr', null,
				Xml::tags( 'td', null, $lsLabel ) .
				Xml::tags( 'td', null, $lsSelect ) .
				Xml::tags( 'td', array( 'colspan' => 2 ),
					Xml::submitButton( wfMsg( 'centralnotice-modify' ) )
				)
			);
			$htmlOut .= Xml::tags( 'tr', null,
				Xml::tags( 'td', null, '' ) .
				Xml::tags( 'td', null, $sk->makeLinkObj( $newPage, wfMsgHtml( 'centralnotice-preview-all-template-translations' ), "template=$currentTemplate&wpUserLanguage=all" ) )
			);
			$htmlOut .= Xml::closeElement( 'table' );
			$htmlOut .= Xml::hidden( 'authtoken', $wgUser->editToken() );
			$htmlOut .= Xml::closeElement( 'fieldset' );
			$htmlOut .= Xml::closeElement( 'form' );
		}

		/*
		 * Show edit form
		 */
		if ( $this->editable ) {
			$htmlOut .= Xml::openElement( 'form', array( 'method' => 'post' ) );
			$htmlOut .= Xml::hidden( 'wpMethod', 'editTemplate' );
		}
		$htmlOut .= Xml::fieldset( wfMsg( 'centralnotice-edit-template' ) );
		$htmlOut .= wfMsg( 'centralnotice-edit-template-summary' );
		$htmlOut .= Xml::openElement( 'table',
			array(
				'cellpadding' => 9,
				'width' => '100%'
			)
		);
		$htmlOut .= Xml::tags( 'tr', null,
			Xml::tags( 'td', null, Xml::textarea( 'templateBody', $body, 60, 20, $readonly ) )
		);
		if ( $this->editable ) {
			$htmlOut .= Xml::tags( 'tr', null,
				Xml::tags( 'td', null, Xml::submitButton( wfMsg( 'centralnotice-modify' ) ) )
			);
		}
		$htmlOut .= Xml::closeElement( 'table' );
		$htmlOut .= Xml::hidden( 'authtoken', $wgUser->editToken() );
		$htmlOut .= Xml::closeElement( 'fieldset' );
		if ( $this->editable ) {
			$htmlOut .= Xml::closeElement( 'form' );
		}

		/*
		 * Show Clone form
		 */
		if ( $this->editable ) {
			$htmlOut .= Xml::openElement ( 'form',
				array(
					'method' => 'post',
					'action' => SpecialPage::getTitleFor( 'NoticeTemplate', 'clone' )->getLocalUrl()
				)
			);

			$htmlOut .= Xml::fieldset( wfMsg( 'centralnotice-clone-notice' ) );
			$htmlOut .= Xml::openElement( 'table', array( 'cellpadding' => 9 ) );
			$htmlOut .= Xml::openElement( 'tr' );
			$htmlOut .= Xml::inputLabel( wfMsg( 'centralnotice-clone-name' ) . ':', 'newTemplate', 'newTemplate', '25' );
			$htmlOut .= Xml::submitButton( wfMsg( 'centralnotice-clone' ), array ( 'id' => 'clone' ) );
			$htmlOut .= Xml::hidden( 'oldTemplate', $currentTemplate );

			$htmlOut .= Xml::closeElement( 'tr' );
			$htmlOut .= Xml::closeElement( 'table' );
			$htmlOut .= Xml::hidden( 'authtoken', $wgUser->editToken() );
			$htmlOut .= Xml::closeElement( 'fieldset' );
			$htmlOut .= Xml::closeElement( 'form' );
		}
		
		// End View Banner fieldset
		$htmlOut .= Xml::closeElement( 'fieldset' );

		// Output HTML
		$wgOut->addHTML( $htmlOut );
	}

	public function showViewAvailable( $template ) {
		global $wgOut, $wgUser;

		// Testing to see if bumping up the memory limit lets meta preview
		ini_set( 'memory_limit', '120M' );

		$sk = $wgUser->getSkin();

		// Pull all available text for a template
		$langs = array_keys( $this->getTranslations( $template ) );
		$htmlOut = '';
		
		// Begin View Banner fieldset
		$htmlOut .= Xml::openElement( 'fieldset', array( 'class' => 'prefsection' ) );
		
		$htmlOut .= Xml::element( 'h2', null, wfMsg( 'centralnotice-template' ) . ': ' . $template );

		foreach ( $langs as $lang ) {
			// Link and Preview all available translations
			$viewPage = SpecialPage::getTitleFor( 'NoticeTemplate', 'view' );
			$render = new SpecialNoticeText();
			$render->project = 'wikipedia';
			$render->language = $lang;
			$htmlOut .= Xml::tags( 'td', array( 'valign' => 'top' ),
				$sk->makeLinkObj( $viewPage,
					$lang,
					'template=' . urlencode( $template ) . "&wpUserLanguage=$lang" ) .
				Xml::fieldset( wfMsg( 'centralnotice-preview' ),
					$render->getHtmlNotice( $template ),
					array( 'class' => 'cn-bannerpreview')
				)
			);
		}
		
		// End View Banner fieldset
		$htmlOut .= Xml::closeElement( 'fieldset' );
		
		return $wgOut->addHtml( $htmlOut );
	}

	private function updateMessage( $text, $translation, $lang, $token = false ) {
		$title = Title::newFromText(
			( $lang == 'en' ) ? "Centralnotice-{$text}" : "Centralnotice-{$text}/{$lang}",
			NS_MEDIAWIKI
		);
		$article = new Article( $title );
		$article->doEdit( $translation, '', EDIT_FORCE_BOT );
	}
	
	private function getTemplateId ( $templateName ) {
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select( 'cn_templates', 'tmp_id',
			array( 'tmp_name' => $templateName ),
			__METHOD__
		);

		$row = $dbr->fetchObject( $res );
		if ( $row ) {
			return $row->tmp_id;
		}
		return null;
	}

	private function removeTemplate ( $name ) {
		global $wgOut;

		// FIXME: weak comparison
		if ( $name == '' ) {
			// FIXME: message not defined?
			$wgOut->addWikiMsg( 'centralnotice-template-doesnt-exist' );
			return;
		}

		$id = $this->getTemplateId( $name );
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select( 'cn_assignments', 'asn_id', array( 'tmp_id' => $id ), __METHOD__ );

		if ( $dbr->numRows( $res ) > 0 ) {
			$wgOut->addWikiMsg( 'centralnotice-template-still-bound' );
			return;
		} else {
			$dbw = wfGetDB( DB_MASTER );
			$dbw->begin();
			$res = $dbw->delete( 'cn_templates',
				array( 'tmp_id' => $id ),
				__METHOD__
			);
			$dbw->commit();

			$article = new Article(
				Title::newFromText( "centralnotice-template-{$name}", NS_MEDIAWIKI )
			);
			$article->doDeleteArticle( 'CentralNotice Automated Removal' );
		}
	}

	private function addTemplate ( $name, $body ) {
		global $wgOut;

		if ( $body == '' || $name == '' ) {
			$wgOut->addHTML( Xml::element( 'div', array( 'class' => 'cn-error' ), wfMsg( 'centralnotice-null-string' ) ) );
			return;
		}

		// Format name so there are only letters, numbers, and underscores
		$name = preg_replace( '/[^A-Za-z0-9_]/', '', $name );

		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select(
			'cn_templates',
			'tmp_name',
			array( 'tmp_name' => $name ),
			__METHOD__
		);

		if ( $dbr->numRows( $res ) > 0 ) {
			$wgOut->addHTML( Xml::element( 'div', array( 'class' => 'cn-error' ), wfMsg( 'centralnotice-template-exists' ) ) );
			return false;
		} else {
			$dbw = wfGetDB( DB_MASTER );
			$dbw->begin();
			$res = $dbw->insert(
				'cn_templates',
				array( 'tmp_name' => $name ),
				__METHOD__
			);
			$dbw->commit();

			/*
			 * Perhaps these should move into the db as blob
			 */
			$article = new Article(
				Title::newFromText( "centralnotice-template-{$name}", NS_MEDIAWIKI )
			);
			$article->doEdit( $body, '', EDIT_FORCE_BOT );
			return true;
		}
	}

	private function editTemplate ( $name, $body ) {
		global $wgOut;

		if ( $body == '' || $name == '' ) {
			$wgOut->addHTML( Xml::element( 'div', array( 'class' => 'cn-error' ), wfMsg( 'centralnotice-null-string' ) ) );
			return;
		}

		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select( 'cn_templates', 'tmp_name',
			array( 'tmp_name' => $name ),
			__METHOD__
		);

		if ( $dbr->numRows( $res ) > 0 ) {
			/*
			 * Perhaps these should move into the db as blob
			 */
			$article = new Article(
				Title::newFromText( "centralnotice-template-{$name}", NS_MEDIAWIKI )
			);
			$article->doEdit( $body, '', EDIT_FORCE_BOT );
			return;
		}
	}

	/*
	 * Copy all the data from one template to another
	 */
	public function cloneTemplate( $source, $dest ) {
		// Reset the timer as updates on meta take a long time
		set_time_limit( 300 );
		// Pull all possible langs
		$langs = $this->getTranslations( $source );

		// Normalize name
		$dest = ereg_replace( '[^A-Za-z0-9\_]', '', $dest );

		// Pull text and respect any inc: markup
		$bodyPage = Title::newFromText( "Centralnotice-template-{$source}", NS_MEDIAWIKI );
		$template_body = Revision::newFromTitle( $bodyPage )->getText();

		if ( $this->addTemplate( $dest, $template_body ) ) {

			// Populate the fields
			foreach ( $langs as $lang => $fields ) {
				foreach ( $fields as $field => $text ) {
					$this->updateMessage( "$dest-$field", $text, $lang );
				}
			}
			return $dest;
		}
	}

	/*
	 * Find all fields set for a template
	 */
	private function findFields( $template ) {
		$messages = array();
		$body = wfMsg( "Centralnotice-template-{$template}" );

		// Generate fields from parsing the body
		$fields = array();
		preg_match_all( '/\{\{\{([A-Za-z0-9\_\-}]+)\}\}\}/', $body, $fields );

		// Remove duplicates
		$filteredFields = array();
		foreach ( $fields[1] as $field ) {
			$filteredFields[$field] = array_key_exists( $field, $filteredFields ) ? $filteredFields[$field] + 1 :
			1;
		}
		return $filteredFields;
	}

	/*
	 * Given a template return a list of every set field in every language
	 */
	public function getTranslations( $template ) {
		$translations = array();

		// Pull all language codes to enumerate
		$allLangs = array_keys( Language::getLanguageNames() );

		// Lookup all the possible fields for a template
		$fields = $this->findFields( $template );

		// Iterate through all possible languages to find matches
		foreach ( $allLangs as $lang ) {
			// Iterate through all possible fields
			foreach ( $fields as $field => $count ) {
				// Put all fields together for a lookup
				$message = ( $lang == 'en' ) ? "Centralnotice-{$template}-{$field}" : "Centralnotice-{$template}-{$field}/{$lang}";
				if ( Title::newFromText( $message,  NS_MEDIAWIKI )->exists() ) {
					$translations[$lang][$field] = wfMsgExt(
						"Centralnotice-{$template}-{$field}",
						array( 'language' => $lang )
					);
				}
			}
		}
		return $translations;
	}
}

class NoticeTemplatePager extends ReverseChronologicalPager {
	var $onRemoveChange, $viewPage, $special;
	var $editable;

	function __construct( $special ) {
		$this->special = $special;
		$this->editable = $special->editable;
		parent::__construct();
		
		// Override paging defaults
		list( $this->mLimit, /* $offset */ ) = $this->mRequest->getLimitOffset( 20, '' );
		$this->mLimitsShown = array( 20, 50, 100 );
		
		$msg = Xml::encodeJsVar( wfMsg( 'centralnotice-confirm-delete' ) );
		$this->onRemoveChange = "if( this.checked ) { this.checked = confirm( $msg ) }";
		$this->viewPage = SpecialPage::getTitleFor( 'NoticeTemplate', 'view' );
	}

	function getQueryInfo() {
		return array(
			'tables' => 'cn_templates',
			'fields' => array( 'tmp_name', 'tmp_id' ),
		);
	}

	function getIndexField() {
		return 'tmp_id';
	}

	function formatRow( $row ) {
		$htmlOut = Xml::openElement( 'tr' );

		if ( $this->editable ) {
			// Remove box
			$htmlOut .= Xml::tags( 'td', array( 'valign' => 'top' ),
				Xml::check( 'removeTemplates[]', false,
					array(
						'value' => $row->tmp_name,
						'onchange' => $this->onRemoveChange
					)
				)
			);
		}

		// Link and Preview
		$render = new SpecialNoticeText();
		$render->project = 'wikipedia';
		$render->language = $this->mRequest->getVal( 'wpUserLanguage' );
		$htmlOut .= Xml::tags( 'td', array( 'valign' => 'top' ),
			$this->getSkin()->makeLinkObj( $this->viewPage,
				htmlspecialchars( $row->tmp_name ),
				'template=' . urlencode( $row->tmp_name ) ) .
			Xml::fieldset( wfMsg( 'centralnotice-preview' ),
				$render->getHtmlNotice( $row->tmp_name ),
				array( 'class' => 'cn-bannerpreview')
			)
		);

		$htmlOut .= Xml::closeElement( 'tr' );
		return $htmlOut;
	}

	function getStartBody() {
		$htmlOut = '';
				
		$htmlOut .= Xml::openElement( 'table',
			array(
				'cellpadding' => 9,
				'width' => '100%'
			)
		);
		if ( $this->editable ) {
			$htmlOut .= Xml::element( 'th', array( 'align' => 'left', 'width' => '5%' ),
				wfMsg ( 'centralnotice-remove' )
			);
		}
		$htmlOut .= Xml::element( 'th', array( 'align' => 'left' ),
			wfMsg ( 'centralnotice-template-name' )
		);
		return $htmlOut;
	}

	function getEndBody() {
		global $wgUser;
		$htmlOut = '';
		if ( $this->editable ) {
			$htmlOut .= Xml::tags( 'tr', null,
				Xml::tags( 'td', array( 'colspan' => 3 ),
					Xml::submitButton( wfMsg( 'centralnotice-modify' ) )
				)
			);
		}
		$htmlOut .= Xml::closeElement( 'table' );
		$htmlOut .= Xml::hidden( 'authtoken', $wgUser->editToken() );
		return $htmlOut;
	}
}
