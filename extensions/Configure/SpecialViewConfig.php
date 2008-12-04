<?php
if ( !defined( 'MEDIAWIKI' ) ) die();

/**
 * Special page allows authorised users to see wiki's configuration
 * This should also be available if efConfigureSetup() hasn't been called
 *
 * @ingroup Extensions
 */
class SpecialViewConfig extends ConfigurationPage {
	protected $isWebConfig;
	protected $mRequireWebConf = false;
	protected $mCanEdit = false;

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct( 'ViewConfig', 'viewconfig' );
	}

	protected function getSettingMask() {
		return CONF_SETTINGS_BOTH;
	}

	protected function getVersion() {
		global $wgOut, $wgRequest, $wgConf;

		$this->isWebConfig = $wgConf instanceof WebConfiguration;

		if ( $this->isWebConfig && $version = $wgRequest->getVal( 'version' ) ) {
			$versions = $wgConf->listArchiveVersions();
			if ( in_array( $version, $versions ) || $version == 'default' ) {
				$conf = $wgConf->getOldSettings( $version );
				
				if ($version == 'default') { ## Yucky special case.
					$conf[$this->mWiki] = $conf['default'];
				}
				
				if ( $this->isUserAllowedAll() ) {
					$wiki = $wgRequest->getVal( 'wiki', $wgConf->getWiki() );
				} else {
					$wiki = $wgConf->getWiki();
				}

				$this->version = $version;

				if ( $diff = $wgRequest->getVal( 'diff' ) ) {
					if ( !in_array( $diff, $versions ) && $diff != 'default' ) {
						$msg = wfMsgNoTrans( 'configure-old-not-available', $diff );
						$wgOut->addWikiText( "<div class='errorbox'>$msg</div>" );
						return;
					}
					$this->diff = $diff;
				}

				if ( isset( $conf[$wiki] ) ) {
					$this->conf = $conf[$wiki];
				} else if ( !isset( $this->diff ) ) {
					$msg = wfMsgNoTrans( 'configure-old-not-available', $version );
					$wgOut->addWikiText( "<div class='errorbox'>$msg</div>" );
					return false;
				}
			} else {
				$msg = wfMsgNoTrans( 'configure-old-not-available', $version );
				$wgOut->addWikiText( "<div class='errorbox'>$msg</div>" );
				return false;
			}
		}

		return true;
	}

	/**
	 * Just in case, security
	 */
	protected function doSubmit() { }

	/**
	 * Show diff
	 */
	protected function showDiff() {
		global $wgOut;
		$wikis = $this->isUserAllowedAll() ? true : array( $this->mWiki );
		$diffEngine = new HistoryConfigurationDiff( $this->diff, $this->version, $wikis );
		$diffEngine->setViewCallback( array( $this, 'userCanRead' ) );
		$wgOut->addHTML( $diffEngine->getHTML() );
	}

	/**
	 * Show the main form
	 */
	protected function showForm() {
		global $wgOut, $wgRequest;

		if ( !$this->isWebConfig || !empty( $this->conf ) || isset( $this->diff ) ) {
			if ( isset( $this->diff ) ) {
				$this->showDiff();
			} else {
				$wgOut->addHTML(
					$this->buildSearchForm() . "\n" .
					Xml::openElement( 'div', array( 'id' => 'configure-form' ) ) . "\n" .
					Xml::openElement( 'div', array( 'id' => 'configure' ) ) . "\n" .

					$this->buildAllSettings() . "\n" .

					Xml::closeElement( 'div' ) . "\n" .
					Xml::closeElement( 'div' ) . "\n"
				);
			}
		} else {
			$wgOut->addHTML( $this->buildOldVersionSelect() );
		}
		$this->injectScriptsAndStyles();
	}

	/**
	 * Build links to old version of the configuration
	 */
	protected function buildOldVersionSelect() {
		global $wgConf, $wgLang, $wgUser, $wgRequest, $wgScript;
		if ( !$this->isWebConfig )
			return '';

		$self = $this->getTitle();
		$pager = $wgConf->getPager();
		$pager->setFormatCallback( array( $this, 'formatVersionRow' ) );

		$wiki = $this->isUserAllowedInterwiki() && $wgRequest->getVal( 'view', 'all' ) == 'all' ? false : $this->mWiki;
		$pager->setWiki( $wiki );

		$showDiff = $pager->getNumRows() > 1;

		$formatConf = array(
			'showDiff' => $showDiff,
			'allowedConfig' => $wgUser->isAllowed( 'configure' ),
			'allowedExtensions' => $wgUser->isAllowed( 'extensions' ),
			'allowedAll' => $this->isUserAllowedInterwiki(),
			'allowedConfigAll' => $wgUser->isAllowed( 'configure-interwiki' ),
			'allowedExtensionsAll' => $wgUser->isAllowed( 'extensions-interwiki' ),
			'self' => $self,
			'skin' => $wgUser->getSkin(),
			'editMsg' => wfMsg( 'edit' ) . ': ',
		);

		if ( $formatConf['allowedConfig'] )
			$formatConf['configTitle'] = SpecialPage::getTitleFor( 'Configure' );

		if ( $formatConf['allowedExtensions'] )
			$formatConf['extTitle'] = SpecialPage::getTitleFor( 'Extensions' );

		$this->formatConf = $formatConf;

		$text = wfMsgExt( 'configure-old-versions', array( 'parse' ) );
		if( $this->isUserAllowedInterwiki() )
			$text .= $this->getWikiSelectForm();
		$text .= $pager->getNavigationBar();
		if ( $showDiff ) {
			$text .= Xml::openElement( 'form', array( 'action' => $wgScript ) ) . "\n" .
			Xml::hidden( 'title', $self->getPrefixedDBKey() ) . "\n" .
			$this->getButton() . "<br/>\n";
		}
		$text .= $pager->getBody();
		if ( $showDiff ) {
			$text .= $this->getButton() . "</form>";
		}
		$text .= $pager->getNavigationBar();
		return $text;
	}

	public function formatVersionRow( $arr ) {
		global $wgLang;

		$ts = $arr['timestamp'];
		$wikis = $arr['wikis'];
		$c = $arr['count'];
		$hasSelf = in_array( $this->mWiki, $wikis );

		extract( $this->formatConf );
		$time = $wgLang->timeAndDate( $ts );
		
		## Make user link...
		$userLink = '';
		if (!$arr['user_wiki'] && !$arr['user_name'] ) {
			$userLink = ''; # Nothing...
		} elseif ( $arr['user_wiki'] == wfWikiId() ) {
			$userLink = $skin->link( Title::makeTitle( NS_USER, $arr['user_name'] ), $arr['user_name'] );
		} elseif ( class_exists( 'WikiMap' ) && ($wiki = WikiMap::getWiki( $arr['user_wiki'] ) ) ) {
			$userLink = $skin->makeExternalLink( $wiki->getUrl( 'User:'.$arr['user_name'] ), $arr['user_name'].'@'.$arr['user_wiki'] );
		} else {
			## Last-ditch
			$userLink = $arr['user_name'].'@'.$arr['user_wiki'];
		}

		$actions = array();
		if ( $hasSelf )
			$view = $skin->makeKnownLinkObj( $self, wfMsgHtml( 'configure-view' ), "version=$ts" );

		if ( $allowedAll ) {
			$viewWikis = array();
			foreach ( $wikis as $wiki ) {
				$viewWikis[] = $skin->makeKnownLinkObj( $self, htmlspecialchars( $wiki ), "version={$ts}&wiki={$wiki}" );
			}
			$view .= ' (' . implode( ', ', $viewWikis ) . ')';
		}
		$actions[] = $view;
		$editDone = false;
		if ( $allowedConfig ) {
			if ( $hasSelf )
				$editCore = $editMsg . $skin->makeKnownLinkObj( $configTitle, wfMsgHtml( 'configure-edit-core' ), "version=$ts" );
			else
				$editCore = $editMsg;

			if ( $allowedConfigAll ) {
				$viewWikis = array();
				foreach ( $wikis as $wiki ) {
					$viewWikis[] = $skin->makeKnownLinkObj( $configTitle, htmlspecialchars( $wiki ), "version={$ts}&wiki={$wiki}" );
				}
				$editCore .= ' (' . implode( ', ', $viewWikis ) . ')';
			}
			$actions[] = $editCore;
		}
		if ( $allowedExtensions ) {
			$editExt = '';
			if ( !$allowedConfig )
				$editExt .= $editMsg;
			if ( $hasSelf )
				$editExt .= $skin->makeKnownLinkObj( $extTitle, wfMsgHtml( 'configure-edit-ext' ), "version=$ts" );

			if ( $allowedExtensionsAll ) {
				$viewWikis = array();
				foreach ( $wikis as $wiki ) {
					$viewWikis[] = $skin->makeKnownLinkObj( $extTitle, htmlspecialchars( $wiki ), "version={$ts}&wiki={$wiki}" );
				}
				$editExt .= ' (' . implode( ', ', $viewWikis ) . ')';
			}
			$actions[] = $editExt;
		}
		if ( $showDiff ) {
			$diffCheck = $c == 2 ? array( 'checked' => 'checked' ) : array();
			$versionCheck = $c == 1 ? array( 'checked' => 'checked' ) : array();
			$buttons =
				Xml::element( 'input', array_merge(
					array( 'type' => 'radio', 'name' => 'diff', 'value' => $ts ),
					$diffCheck ) ) .
				Xml::element( 'input', array_merge(
					array( 'type' => 'radio', 'name' => 'version', 'value' => $ts ),
					$versionCheck ) );
			
			$actions[] = $skin->link( $this->getTitle(), wfMsgHtml( 'configure-viewconfig-default-diff' ), array(), array( 'version' => $ts, 'diff' => 'default' ) );
		} else {
			$buttons = '';
		}
		
		$comment = $arr['reason'] ? $skin->commentBlock( $arr['reason'] ) : '';
		
		$action = implode( ', ', $actions );
		return Xml::tags( 'li', null, wfMsgExt( 'configure-viewconfig-line', array( 'parseinline', 'replaceafter' ), array( $buttons, $time, $userLink, $action, $comment ) ) )."\n";
	}

	/**
	 * Get a form to select the wiki to configure
	 */
	protected function getWikiSelectForm() {
		global $wgConfigureWikis, $wgScript, $wgRequest;
		if ( $wgConfigureWikis === false || !$this->isUserAllowedInterwiki() )
			return '';
		$form = '<fieldset><legend>' . wfMsgHtml( 'configure-select-wiki' ) . '</legend>';
		$form .= wfMsgExt( 'configure-select-wiki-view-desc', array( 'parse' ) );
		$form .= Xml::openElement( 'form', array( 'method' => 'get', 'action' => $wgScript ) );
		$form .= Xml::hidden( 'title', $this->getTitle()->getPrefixedDBkey() );
		if ( is_array( $wgConfigureWikis ) ) {
			$form .= wfMsgExt( 'configure-select-wiki-available',
				array( 'parse' ), implode( ', ', $wgConfigureWikis ) );
		}
		$all = ( $wgRequest->getVal( 'view', 'all' ) == 'all' );
		$form .= Xml::radioLabel( wfMsg( 'configure-select-wiki-view-all' ), 'view', 'all', 'wiki-all', $all );
		$form .= "<br />\n";
		$form .= Xml::radioLabel( wfMsg( 'configure-select-wiki-view-specific' ), 'view', 'specific', 'wiki-specific', !$all ) . ' ';
		$form .= Xml::input( 'wiki', false, $this->mWiki ) . "<br />\n";
		$form .= Xml::submitButton( wfMsg( 'configure-select-wiki-submit' ) );
		$form .= '</form></fieldset>';
		return $form;
	}

	/**
	 * Taken from PageHistory.php
	 */
	protected function getButton() {
		return Xml::submitButton( wfMsg( 'compareselectedversions' ),
				array(
					'class'     => 'historysubmit',
					'accesskey' => wfMsg( 'accesskey-compareselectedversions' ),
					'title'     => wfMsg( 'tooltip-compareselectedversions' ),
					)
				);
	}

	/**
	 * Build the content of the form
	 *
	 * @return xhtml
	 */
	protected function buildAllSettings() {
		$opt = array(
			'restrict' => false,
			'showlink' => array( '_default' => true, 'mw-extensions' => false ),
		);
		return $this->buildSettings( $this->getSettings(), $opt );
	}
}
