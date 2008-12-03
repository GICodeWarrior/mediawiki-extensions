<?php
if ( !defined( 'MEDIAWIKI' ) ) die();

/**
 * Special page allows authorised users to configure the wiki
 *
 * @file
 * @ingroup Extensions
 */
abstract class ConfigurationPage extends SpecialPage {
	protected $mRequireWebConf = true;
	protected $mCanEdit = true;
	protected $conf;
	protected $mConfSettings;

	/**
	 * Constructor
	 */
	public function __construct( $name, $right ) {
		wfLoadExtensionMessages( 'Configure' );
		$this->mConfSettings = ConfigurationSettings::singleton( $this->getSettingMask() );
		# Reload data WITHOUT CACHE
		global $wgConf;
		$wgConf->initialise( false /* Skip cache */ );
		parent::__construct( $name, $right );
	}

	/**
	 * Show the special page
	 *
	 * @param $par Mixed: parameter passed to the page or null
	 */
	public function execute( $par ) {
		global $wgUser, $wgRequest, $wgOut, $wgConf, $wgConfigureWikis;

		$this->setHeaders();

		if ( !$this->userCanExecute( $wgUser ) ) {
			$this->displayRestrictionError();
			return;
		}

		if ( $this->mRequireWebConf ) {
			// Since efConfigureSetup() should be explicitly called, don't go
			// further if that function wasn't called
			if ( !$wgConf instanceof WebConfiguration ) {
				$wgOut->wrapWikiMsg( '<div class="errorbox"><strong>$1</strong></div>', 'configure-no-setup' );
				return;
			}

			$ret = $wgConf->doChecks();
			if ( count( $ret ) ) {
				$wgOut->wrapWikiMsg( '<div class="errorbox"><strong>$1</strong></div>', $ret );
				return;
			}
		}

		$wikiParam = ( $this->mCanEdit && $wgRequest->wasPosted() ) ? 'wpWiki' : 'wiki';
		if ( $wiki = $wgRequest->getVal( $wikiParam, false ) ) {
			if ( $wgConf->getWiki() != $wiki ) {
				if ( !$this->isUserAllowedInterwiki() || $wgConfigureWikis === false ) {
					$wgOut->wrapWikiMsg( '<div class="errorbox"><strong>$1</strong></div>', 'configure-no-transwiki' );
					return;
				}
				if ( is_array( $wgConfigureWikis ) && !in_array( $wiki, $wgConfigureWikis ) ) {
					$wgOut->wrapWikiMsg( '<div class="errorbox"><strong>$1</strong></div>',
						array( 'configure-transwiki-not-in-range', $wiki, implode( ', ', $wgConfigureWikis ) ) );
					return;
				}
			}
			$this->mWiki = $wiki;
		} else {
			if ( $wgConf instanceof WebConfiguration )
				$this->mWiki = $wgConf->getWiki();
			else
				$this->mWiki = 'default';
		}

		$this->outputHeader();

		if ( !$this->getVersion() )
			return;

		if ( $this->mCanEdit && $wgRequest->wasPosted() ) {
			if ( $wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) ) ) {
				if ( $wgRequest->getCheck( 'wpSave' ) ) {
					$type = 'submit';
				} else {
					$type = 'diff';
				}
			} else {
				$wgOut->addWikiMsg( 'sessionfailure' );
				$type = 'diff';
			}
		} else {
			$type = 'initial';
		}

		switch( $type ) {
		case 'submit':
			if( $wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) ) )
				$this->doSubmit();
			else
				$this->showForm();
			break;
		case 'diff':
			$this->conf = $this->importFromRequest();
			$this->showDiff();
		case 'initial':
		default:
			$this->showForm();
			break;
		}
	}

	/**
	 * Retrieve the value of $setting
	 * @param $setting String: setting name
	 * @return mixed value of $setting
	 */
	protected function getSettingValue( $setting ) {
		static $defaults;
		
		if (!$defaults) {
			global $wgConf;
			$defaults = $wgConf->getDefaultsForWiki( $this->mWiki );
		}
		
		if ( isset( $this->conf[$setting] ) ) {
			return $this->conf[$setting];
		} else {
			return isset( $defaults[$setting] ) ? $defaults[$setting] : null;
		}
	}

	/**
	 * Return true if the current user is allowed to configure all settings.
	 * @return bool
	 */
	protected function isUserAllowedAll() {
		static $allowed = null;
		if ( $allowed === null ) {
			global $wgUser;
			$allowed = $wgUser->isAllowed( $this->mRestriction . '-all' );
		}
		return $allowed;
	}

	/**
	 * Return true if the current user is allowed to configure all settings.
	 * @return bool
	 */
	protected function isUserAllowedInterwiki() {
		static $allowed = null;
		if ( $allowed === null ) {
			global $wgUser;
			$allowed = $wgUser->isAllowed( $this->mRestriction . '-interwiki' );
		}
		return $allowed;
	}

	/**
	 * Return true if the current user is allowed to configure $setting.
	 * @return bool
	 */
	public function userCanEdit( $setting ) {
		if ( !$this->mCanEdit || !$this->userCanRead( $setting ) )
			return false;
		if ( in_array( $setting, $this->mConfSettings->getEditRestricted() ) && !$this->isUserAllowedAll() )
			return false;
		global $wgConfigureEditRestrictions;
		if ( !isset( $wgConfigureEditRestrictions[$setting] ) )
			return true;
		global $wgUser;
		foreach ( $wgConfigureEditRestrictions[$setting] as $right ) {
			if ( !$wgUser->isAllowed( $right ) )
				return false;
		}
		return true;
	}

	/**
	 * Return true if the current user is allowed to see $setting.
	 * @return bool
	 */
	public function userCanRead( $setting ) {
		if ( in_array( $setting, $this->mConfSettings->getUneditableSettings() )
			|| ( in_array( $setting, $this->mConfSettings->getViewRestricted() )
			&& !$this->isUserAllowedAll() ) )
			return false;
		global $wgConfigureViewRestrictions;
		if ( !isset( $wgConfigureViewRestrictions[$setting] ) )
			return true;
		global $wgUser;
		foreach ( $wgConfigureViewRestrictions[$setting] as $right ) {
			if ( !$wgUser->isAllowed( $right ) )
				return false;
		}
		return true;
	}

	/**
	 * Get an 3D array of all settings
	 *
	 * @return array
	 */
	protected function getSettings() {
		return $this->mConfSettings->getSettings();
	}

	/**
	 * Get a list of editable settings
	 *
	 * @return array
	 */
	protected function getUneditableSettings() {
		static $notEditable;
		if ( !isset( $notEditable ) ) {
			global $wgConfigureNotEditableSettings, $wgConfigureEditableSettings;

			if ( !count($wgConfigureNotEditableSettings) && count($wgConfigureEditableSettings ) ) {
				$wgConfigureNotEditableSettings = array_diff( array_keys( $this->mConfSettings->getAllSettings() ), $wgConfigureEditableSettings );
			}

			$notEditable = array_merge( $this->mConfSettings->getUneditableSettings(),
				$wgConfigureNotEditableSettings );
		}
		return $notEditable;
	}

	/**
	 * Get a list of editable settings
	 *
	 * @return array
	 */
	protected function getEditableSettings() {
		$notEdit = $this->getUneditableSettings();
		$settings = $this->mConfSettings->getAllSettings();
		foreach ( $notEdit as $setting )
			unset( $settings[$setting] );
		return $settings;
	}

	/**
	 * Get the type of a setting
	 *
	 * @patam $setting setting name
	 * @return string
	 */
	protected function getSettingType( $setting ) {
		return $this->mConfSettings->getSettingType( $setting );
	}

	/**
	 * Get the array type of a setting
	 *
	 * @patam $setting setting name
	 * @return string
	 */
	protected function getArrayType( $setting ) {
		return $this->mConfSettings->getArrayType( $setting );
	}

	/**
	 * Is $setting available in this MediaWiki version?
	 *
	 * @param $setting setting name
	 * @return bool
	 */
	protected function isSettingAvailable( $setting ) {
		return $this->mConfSettings->isSettingAvailable( $setting );
	}

	/**
	 * Get the mask to be passed to $this->mConfSettings->*
	 */
	protected abstract function getSettingMask();

	// Page things

	/**
	 * Submit the posted request
	 */
	protected abstract function doSubmit();

	/**
	 * Show the diff between the current version and the posted version
	 */
	protected abstract function showDiff();

	/**
	 * Build the content of the form
	 *
	 * @return xhtml
	 */
	protected abstract function buildAllSettings();

	/**
	 * Get the version
	 */
	protected function getVersion() {
		if ( !$this->mRequireWebConf )
			return true;

		global $wgConf, $wgOut, $wgRequest, $wgLang;

		if ( $version = $wgRequest->getVal( 'version' ) ) {
			if ( $version == 'default' || $wgConf->versionExists( $version ) ) {
				$conf = $wgConf->getOldSettings( $version );
				
				if ( $version == 'default' ) { ## Hacky special case.
					$conf[$this->mWiki] = $conf['default'];
				}

				if ( !isset( $conf[$this->mWiki] ) ) {
					$wgOut->wrapWikiMsg( '<div class="errorbox">$1</div>',
						array( 'configure-old-not-available', $version ) );
					return false;
				}
				$this->conf = $conf[$this->mWiki];
				$current = null;
				foreach ( $this->conf as $name => $value ) {
					if ( $this->canBeMerged( $name, $value ) ) {
						if ( is_null( $current ) )
							$current = $wgConf->getCurrent( $this->mWiki );
						$this->conf[$name] += $current[$name];
					}
				}
				$wgOut->addWikiMsg( 'configure-edit-old', $wgLang->timeAndDate( $version ) );
			} else {
				$wgOut->wrapWikiMsg( '<div class="errorbox">$1</div>',
					array( 'configure-old-not-available', $version ) );
				return false;
			}
		} else {
			$this->conf = $wgConf->getCurrent( $this->mWiki );
		}
		return true;
	}

	/**
	 * Build links to old version of the configuration
	 */
	protected function buildOldVersionSelect() {
		global $wgConf, $wgLang, $wgUser;

		$count = 0;
		$links = array();

		$versions = $wgConf->getArchiveVersions( array( 'wiki' => $this->mWiki, 'limit' => 11 ) );
		$skin = $wgUser->getSkin();
		$title = $this->getTitle();
		$prev = null;

		ksort( $versions ); ## Put in ascending order for now.

		foreach ( $versions as $data ) {
			$ts = $data['timestamp'];
			$count++;
			$link = $skin->makeKnownLinkObj( $title, $wgLang->timeAndDate( $ts ), "version=$ts" );
			$diffLink = '';
			if ( $prev )
				$diffLink =  '(' . $skin->makeKnownLinkObj( SpecialPage::getTitleFor( 'ViewConfig' ), wfMsg( 'configure-old-changes' ), "version=$ts&diff=$prev" ) . ')';

			## Make user link...
			$userLink = '';
			if( !$data['userwiki'] || !$data['username'] ) {
				$userLink = '';
			} else if ( $data['userwiki'] == wfWikiId() ) {
				$userLink = $skin->link( Title::makeTitle( NS_USER, $data['username'] ), $data['username'] );
			} elseif ( class_exists( 'WikiMap' ) && ($wiki = WikiMap::getWiki( $data['userwiki'] ) ) ) {
				$userLink = $skin->makeExternalLink( $wiki->getUrl( 'User:'.$data['username'] ), $data['username'].'@'.$data['userwiki'] );
			} else {
				## Last-ditch
				$userLink = $data['username'].'@'.$data['userwiki'];
			}

			$comment = $data['reason'] ? $skin->commentBlock( $data['reason'] ) : '';

			$text = wfMsgExt( 'configure-old-summary', array( 'replaceafter', 'parseinline' ), array( $link, $userLink, $diffLink, $comment ) );

			$prev = $ts;

			$links[] = $text;
		}

		## Reset into descending order
		$links = array_reverse( $links );
		## Take out the first ten...
		$links = array_slice( $links, 0, 10 );

		$text = '<fieldset><legend>' . wfMsgHtml( 'configure-old' ) . '</legend>';
		if ( !count( $links ) ) {
			$text .= wfMsgExt( 'configure-no-old', array( 'parse' ) );
		} else {
			$text .= wfMsgExt( 'configure-old-versions', array( 'parse' ) );
			$text .= "<ul>\n<li>";
			$text .= implode( "</li>\n<li>", $links );
			$text .= "</li>\n</ul>\n";
		}
		$link = SpecialPage::getTitleFor( 'ViewConfig' );
		$text .= Xml::tags( 'p', null, $skin->makeKnownLinkObj( $link, wfMsgHtml( 'configure-view-all-versions' ) ) );
		$text .= Xml::tags( 'p', null, $skin->makeKnownLinkObj( $link, wfMsgHtml( 'configure-view-default' ), 'version=default' ) );

		$text .= '</fieldset>';
		return $text;
	}

	/**
	 * Get a form to select the wiki to configure
	 */
	protected function getWikiSelectForm() {
		global $wgConfigureWikis, $wgScript;
		if ( $wgConfigureWikis === false || !$this->isUserAllowedInterwiki() )
			return '';
		$form = '<fieldset><legend>' . wfMsgHtml( 'configure-select-wiki' ) . '</legend>';
		$form .= wfMsgExt( 'configure-select-wiki-desc', array( 'parse' ) );
		$form .= Xml::openElement( 'form', array( 'method' => 'get', 'action' => $wgScript ) );
		$form .= Xml::hidden( 'title', $this->getTitle()->getPrefixedDBkey() );
		if ( is_array( $wgConfigureWikis ) ) {
			$form .= wfMsgExt( 'configure-select-wiki-available',
				array( 'parse' ), implode( ', ', $wgConfigureWikis ) );
		}
		$form .= Xml::input( 'wiki', false, $this->mWiki );
		$form .= Xml::submitButton( wfMsg( 'configure-select-wiki-submit' ) );
		$form .= '</form></fieldset>';
		return $form;
	}

	/**
	 * Import settings from posted datas
	 *
	 * @return array
	 */
	protected function importFromRequest() {
		global $wgRequest;

		if ( !$this->mCanEdit || !$wgRequest->wasPosted() )
			return array();

		$settings = array();
		foreach ( $this->getEditableSettings() as $name => $type ) {
			if ( !$this->mConfSettings->isSettingAvailable( $name ) )
				continue;
			if ( !$this->userCanEdit( $name ) ) {
				$settings[$name] = $this->getSettingValue( $name );
				continue;
			}
			switch( $type ) {
			case 'array':
				$arrType = $this->getArrayType( $name );
				switch( $arrType ) {
				case 'simple':
					$text = trim($wgRequest->getText( 'wp' . $name ));
					if ( $text == '' )
						$arr = array();
					else
						$arr = explode( "\n", $text );
					$settings[$name] = $arr;
					break;
				case 'assoc':
					$i = 0;
					$arr = array();
					while ( isset( $_REQUEST['wp' . $name . '-key-' . $i] ) &&
						isset( $_REQUEST['wp' . $name . '-val-' . $i] ) )
					{
						$key = $_REQUEST['wp' . $name . '-key-' . $i];
						$val = $_REQUEST['wp' . $name . '-val-' . $i];
						if ( $key !== '' || $val !== '' )
							$arr[$key] = $val;
						$i++;
					}
					$settings[$name] = $arr;
					break;
				case 'simple-dual':
					$text = $wgRequest->getText( 'wp' . $name );
					if ( $text == '' ) {
						$arr = array();
					} else {
						$arr = array();
						foreach ( explode( "\n", $text ) as $line ) {
							$items = array_map( 'intval', array_map( 'trim', explode( ',', $line ) ) );
							if ( count( $items == 2 ) )
								$arr[] = $items;
						}
					}
					$settings[$name] = $arr;
					break;
				case 'ns-bool':
					global $wgContLang;
					$arr = array();
					foreach ( $wgContLang->getNamespaces() as $ns => $unused ) {
						$arr[$ns] = $wgRequest->getCheck( 'wp' . $name . '-ns' . strval( $ns ) );
					}
					$settings[$name] = $arr;
					break;
				case 'ns-text':
					global $wgContLang;
					$arr = array();
					foreach ( $wgContLang->getNamespaces() as $ns => $unused ) {
						$arr[$ns] = trim( $wgRequest->getVal( 'wp' . $name . '-ns' . strval( $ns ) ) );
					}
					$settings[$name] = $arr;
					break;
				case 'ns-simple':
					global $wgContLang;
					$arr = array();
					foreach ( $wgContLang->getNamespaces() as $ns => $unused ) {
						if ( $wgRequest->getCheck( 'wp' . $name . '-ns' . strval( $ns ) ) )
							$arr[] = $ns;
					}
					$settings[$name] = $arr;
					break;
				case 'ns-array':
					global $wgContLang;
					$arr = array();
					foreach ( $wgContLang->getNamespaces() as $ns => $unused ) {
						if ( $ns < 0 )
							continue;
						$text = trim( $wgRequest->getText( 'wp' . $name . '-ns' . strval( $ns ) ) );
						if ( $text == '' )
							$nsProtection = array();
						else
							$nsProtection = explode( "\n", $text );
						$arr[$ns] = $nsProtection;
					}
					$settings[$name] = $arr;
					break;
				case 'group-bool':
				case 'group-array':
					$all = array();
					if ( isset( $_REQUEST['wp' . $name . '-vals'] ) ) {
						$iter = explode( "\n", trim($wgRequest->getText( 'wp' . $name . '-vals' ) ) );
						foreach ( $iter as &$group ) {
							// Our own Sanitizer::unescapeId() :)
							$group = urldecode( str_replace( array( '.', "\r" ), array( '%', '' ),
								substr( $group, strlen( $name ) + 3 ) ) );
						}
						unset( $group ); // Unset the reference, just in case
					} else { // No javascript ?
						$iter = array_keys( $this->getSettingValue( 'wgGroupPermissions' ) );
					}
					if ( $arrType == 'group-bool' ) {
						$all = User::getAllRights();
					} else {
						$all = array_diff( $iter, $this->getSettingValue( 'wgImplicitGroups' ) );
					}
					foreach ( $iter as $group ) {
						foreach ( $all as $right ) {
							$id = 'wp' . $name . '-' . $group . '-' . $right;
							if ( $arrType == 'group-bool' ) {
								$encId = Sanitizer::escapeId( $id );
								if ( $id != $encId ) {
									$val = $wgRequest->getCheck( str_replace( '.', '_', $encId ) ) ||
										$wgRequest->getCheck( $encId ) || $wgRequest->getCheck( $id );
								} else {
									$val = $wgRequest->getCheck( $id );
								}
								$settings[$name][$group][$right] = $val;
							} else if ( $wgRequest->getCheck( $id ) ) {
								$settings[$name][$group][] = $right;
							}
						}
					}
					break;
				}
				break;
			case 'text':
			case 'lang':
			case 'image-url':
				$settings[$name] = trim( $wgRequest->getVal( 'wp' . $name ) );
				break;
			case 'int':
				$settings[$name] = $wgRequest->getInt( 'wp' . $name );
				break;
			case 'bool':
				$settings[$name] = $wgRequest->getCheck( 'wp' . $name );
				break;
			default:
				if ( is_array( $type ) ) {
					$val = $wgRequest->getVal( 'wp' . $name );
					if ( !array_key_exists( $val, $type ) ) {
						$perm = implode( ', ', $type );
						throw new MWException( "Value for \$$name setting is not in permitted (given: $val, permitted: $perm)" );
					}
					$settings[$name] = $val;
				} else {
					throw new MWException( "Unknown setting type $type (setting name: \$$name)" );
				}
			}

			if ( isset( $settings[$name] ) ) {
				$settings[$name] = $this->cleanupSetting( $name, $settings[$name] );
				if ( $settings[$name] === null )
					unset( $settings[$name] );
			}
		}
		return $settings;
	}

	/**
	 * Cleanup some settings to respect some behaviour of the core
	 *
	 * @param $name String: setting name
	 * @param $val Mixed: setting value
	 * @return Mixed
	 */
	protected function cleanupSetting( $name, $val ) {
		static $list = null;
		if ( $list === null )
			$list = $this->mConfSettings->getEmptyValues();
		if ( isset( $list[$name] ) && empty( $val ) )
			return $list[$name];
		else
			return $val;
	}

	/**
	 * Removes the defaults values from settings
	 *
	 * @param $settings Array
	 * @return array
	 */
	protected function removeDefaults( $settings ) {
		global $wgConf;
		$defaultValues = $wgConf->getDefaultsForWiki( $this->mWiki  );
		foreach ( $defaultValues as $name => $default ) {
			## Normalise the two, to avoid false "changes"
			if (is_array($default))
				$default = WebConfiguration::filterVar( $default );
				
			if ( isset( $settings[$name] ) ) {
				$settingCompare = $settings[$name];
				if (is_array($settingCompare))
					$settingCompare = WebConfiguration::filterVar($settingCompare);
			
				if ( $settingCompare == $default ) {
					unset( $settings[$name] );
				} elseif ( $this->canBeMerged( $name, $default ) ) {
					$value = $settings[$name];
					$type = $this->getArrayType( $name );
					switch( $type ) {
					case 'assoc':
					case 'ns-bool':
					case 'ns-text':
					case 'ns-array':
						foreach ( array_keys( array_intersect_key( $default, $value ) ) as $key ) {
							if ( $default[$key] === $value[$key] )
								unset( $settings[$name][$key] );
						}
						break;
					case 'group-bool':
						foreach ( array_unique( array_merge( array_keys( $default ), array_keys( $value ) ) ) as $group ) {
							$defGroup = isset( $default[$group] ) ? $default[$group] : array();
							$valGroup = isset( $value[$group] ) ? $value[$group] : array();
							foreach ( array_unique( array_merge( array_keys( $defGroup ), array_keys( $valGroup ) ) ) as $right ) {
								if ( ( isset( $defGroup[$right] ) && isset( $valGroup[$right] ) && $defGroup[$right] === $valGroup[$right] ) ||
									( isset( $valGroup[$right] ) && !isset( $defGroup[$right] ) && $valGroup[$right] === false ) ) {
									unset( $settings[$name][$group][$right] );
								}
							}
							if ( !count( $settings[$name][$group] ) )
								unset( $settings[$name][$group] );
						}
						break;
					}
				}
			}
		}
		return $settings;
	}

	/**
	 * Returns a bool wheter the setting can be merged with the default in
	 * DefaultSettings.php
	 *
	 * @param $name String: setting name
	 * @param $value Mixed: new value of the setting
	 * @return bool
	 */
	protected function canBeMerged( $name, $value ) {
		if ( !is_array( $value ) )
			return false;
		if ( $this->getSettingType( $name ) != 'array' )
			return false;
		global $wgConf;
		return ( !isset( $wgConf->settings[$name] ) && isset( $wgConf->settings["+$name"] ) );
	}

	/**
	 * Show the main form
	 */
	protected function showForm() {
		global $wgOut, $wgUser;

		$action = $this->getTitle()->escapeLocalURL();

		$wgOut->addHTML(
			$this->buildOldVersionSelect() . "\n" .
			( $this->mCanEdit ?
				$this->getWikiSelectForm() .
				Xml::openElement( 'form', array( 'method' => 'post', 'action' => $action,
					'id' => 'configure-form' ) ) . "\n" :
				Xml::openElement( 'div', array( 'id' => 'configure-form' ) )
			) .
			$this->buildSearchForm() . "\n" .
			Xml::openElement( 'div', array( 'id' => 'configure' ) ) . "\n" .
			$this->buildAllSettings() . "\n" .
			( $this->mCanEdit ?
				Xml::buildForm( array( 'configure-form-reason' => Xml::input( 'wpReason', 45 ) ) ) . "\n" .
				Xml::openElement( 'div', array( 'id' => 'prefsubmit' ) ) . "\n" .
				Xml::openElement( 'div', array() ) . "\n" .
				Xml::hidden( 'wpEditToken', $wgUser->editToken() ) . "\n" .
				Xml::element( 'input', array( 'type' => 'submit', 'name' => 'wpSave',
					'class' => 'btnSavePrefs', 'value' => wfMsgHtml( 'configure-btn-save' ) ) ) . "\n" .
				Xml::element( 'input', array( 'type' => 'submit', 'name' => 'wpPreview',
					'value' => wfMsgHtml( 'showdiff' ) ) ) . "\n" .
				Xml::closeElement( 'div' ) . "\n" .
				Xml::closeElement( 'div' ) . "\n" .
				Xml::element( 'input', array( 'type' => 'hidden', 'name' => 'wpEditToken',
					'value' => $wgUser->editToken() ) ) . "\n" .
				( $this->mWiki ? Xml::element( 'input', array( 'type' => 'hidden', 'name' => 'wpWiki',
					'value' => $this->mWiki ) ) . "\n" : '' )
			: ''
			) .
			Xml::closeElement( 'div' ) . "\n" .
			Xml::closeElement( $this->mCanEdit ? 'form' : 'div' )
		);
		$this->injectScriptsAndStyles();
	}
	
	/** Show a hidden-by-default search form */
	protected function buildSearchForm() {
		$form = wfMsgExt( 'configure-js-search-prompt', 'parseinline' ) . '&nbsp;' . Xml::element( 'input', array( 'id' => 'configure-search-input', 'size' => 45 ) );
		$form = Xml::tags( 'p', null, $form ) . "\n" . Xml::openElement( 'ul', array('id' => 'configure-search-results') ) . '</ul>';
		$form = Xml::fieldset( wfMsg( 'configure-js-search-legend' ), $form, array( 'style' => 'display: none;', 'id' => 'configure-search-form' ) );
		return $form;
	}

	/**
	 * Inject JavaScripts and Stylesheets in page output
	 */
	protected function injectScriptsAndStyles() {
		global $wgOut, $wgScriptPath, $wgUseAjax, $wgJsMimeType, $wgConfigureStyleVersion;
		$href = "{$wgScriptPath}/extensions/Configure/Configure.css?{$wgConfigureStyleVersion}";
		if ( is_callable( array( $wgOut, 'addExtensionStyle' ) ) ) { # 1.14+
			$wgOut->addExtensionStyle( $href );
		} else {
			$wgOut->addLink(
				array(
					'rel' => 'stylesheet',
					'type' => 'text/css',
					'href' => $href,
				)
			);
		}
		$add = Xml::encodeJsVar( wfMsg( 'configure-js-add' ) );
		$remove = Xml::encodeJsVar( wfMsg( 'configure-js-remove' ) );
		$removeRow = Xml::encodeJsVar( wfMsg( 'configure-js-remove-row' ) );
		$promptGroup = Xml::encodeJsVar( wfMsg( 'configure-js-prompt-group' ) );
		$groupExists = Xml::encodeJsVar( wfMsg( 'configure-js-group-exists' ) );
		$getimgurl = Xml::encodeJsVar( wfMsg( 'configure-js-get-image-url' ) );
		$imageerror = Xml::encodeJsVar( wfMsg( 'configure-js-image-error' ) );
		$biglist_shown = Xml::encodeJsVar( wfMsg( 'configure-js-biglist-shown' ) );
		$biglist_hidden = Xml::encodeJsVar( wfMsg( 'configure-js-biglist-hidden' ) );
		$biglist_show = Xml::encodeJsVar( wfMsg( 'configure-js-biglist-show' ) );
		$biglist_hide = Xml::encodeJsVar( wfMsg( 'configure-js-biglist-hide' ) );
		$summary_none = Xml::encodeJsVar( wfMsg( 'configure-js-summary-none' ) );
		$ajax = isset( $wgUseAjax ) && $wgUseAjax ? 'true' : 'false';
		$script = array(
			"<script type=\"$wgJsMimeType\">/*<![CDATA[*/",
			"var wgConfigureAdd = {$add};",
			"var wgConfigureRemove = {$remove};",
			"var wgConfigureRemoveRow = {$removeRow};",
			"var wgConfigurePromptGroup = {$promptGroup};",
			"var wgConfigureGroupExists = {$groupExists};",
			"var wgConfigureUseAjax = {$ajax};",
			"var wgConfigureGetImageUrl = {$getimgurl};",
			"var wgConfigureImageError = {$imageerror};",
			"var wgConfigureBiglistShown = {$biglist_shown};",
			"var wgConfigureBiglistHidden = {$biglist_hidden};",
			"var wgConfigureBiglistShow = {$biglist_show};",
			"var wgConfigureBiglistHide = {$biglist_hide};",
			"var wgConfigureSummaryNone = {$summary_none};",
		 	"/*]]>*/</script>",
			"<script type=\"{$wgJsMimeType}\" src=\"{$wgScriptPath}/extensions/Configure/Configure.js?{$wgConfigureStyleVersion}\"></script>",
		);
		$wgOut->addScript( implode( "\n\t\t", $script ) . "\n" );
	}

	/**
	 * Like before but only for the header
	 *
	 * @param $msg String: name of the message to display
	 * @return String xhtml fragment
	 */
	protected function buildTableHeading( $msg ) {
		$msgName = 'configure-section-' . $msg;
		$msgVal = wfMsgExt( $msgName, array( 'parseinline' ) );
		if ( wfEmptyMsg( $msgName, $msgVal ) )
			$msgVal = $msg;
		return "\n<h2>" . $msgVal . "</h2>\n<table class=\"configure-table\">\n";
	}

	/**
	 * Build an input for $conf setting with $default as default value
	 *
	 * @param $conf String: name of the setting
	 * @param $params Array
	 * @return String xhtml fragment
	 */
	protected function buildInput( $conf, $params = array() ) {
		$read = isset( $params['read'] ) ? $params['read'] : $this->userCanRead( $conf );
		if ( !$read )
			return '<span class="disabled">' . wfMsgExt( 'configure-view-not-allowed', array( 'parseinline' ) ) . '</span>';
		$allowed = isset( $params['edit'] ) ? $params['edit'] : $this->userCanEdit( $conf );
		$type = isset( $params['type'] ) ? $params['type'] : $this->getSettingType( $conf );
		$default = isset( $params['value'] ) ? $params['value'] : $this->getSettingValue( $conf );
		if ( $type == 'text' || $type == 'int' ) {
			if ( !$allowed )
				return '<code>' . htmlspecialchars( (string)$default ) . '</code>';
			return Xml::input( "wp$conf", $type == 'text' ? 45 : 10, (string)$default );
		}
		if ( $type == 'image-url' ) {
			if ( !$allowed )
				return '<code>' . htmlspecialchars( (string)$default ) . '</code>';
			return Xml::input( "wp$conf", 45, (string)$default, array( 'class' => 'image-selector', 'id' => 'image-url-textbox-'.$conf ) ) . '&nbsp;' .
				Xml::element( 'img', array( 'id' => 'image-url-preview-'.$conf, 'src' => $default ) );
		}
		if ( $type == 'bool' ) {
			if ( !$allowed )
				return '<code>' . ( $default ? 'true' : 'false' ) . '</code>';
			return Xml::check( "wp$conf", $default, array( 'value' => '1' ) );
		}
		if ( $type == 'array' ) {
			return $this->buildArrayInput( $conf, $default, $allowed );
		}
		if ( $type == 'lang' ) {
			$languages = Language::getLanguageNames( true );

			if ( $allowed ) {
				if ( !array_key_exists( $default, $languages ) ) {
					$languages[$default] = $default;
				}
				ksort( $languages );

				$options = "\n";
				foreach ( $languages as $code => $name ) {
					$attribs = array( 'value' => $code );
					if ( $code == $default )
						$attribs['selected'] = 'selected';
					$options .= Xml::element( 'option', $attribs, "$code - $name" ) . "\n";
				}

				return Xml::openElement( 'select', array( 'id' => 'wp' . $conf, 'name' => 'wp' . $conf ) ) .
					$options . "</select>";
			} else {
				return '<code>' . ( isset( $languages[$default] ) ?
					htmlspecialchars( "$default - " . $languages[$default] ) :
					htmlspecialchars( $default ) ) . '</code>';
			}
		}
		if ( is_array( $type ) ) {
			if ( !$allowed )
				return '<code>' . htmlspecialchars( $default ) . '</code>';
			$ret = "\n";
			foreach ( $type as $val => $name ) {
				$ret .= Xml::radioLabel( $name, 'wp' . $conf, $val, 'wp' . $conf . $val, $default == $val ) . "\n";
			}
			return $ret;
		}
	}

	/**
	 * Build an input for an array setting
	 *
	 * @param $conf String: setting name
	 * @param $default Mixed: current value (but should be array :)
	 * @param $allowed Boolean
	 */
	protected function buildArrayInput( $conf, $default, $allowed ) {
		$type = $this->getArrayType( $conf );
		if ( $type === null || $type == 'array' )
			return $allowed ? '<span class="array">(array)</span>' : '<span class="array-disabled">(array)</span>';
		if ( $type == 'simple' ) {
			if ( !$allowed ) {
				return "<pre>" .
					htmlspecialchars( ( is_array( $default ) ? implode( "\n", $default ) : $default ) ) .
					"\n</pre>";
			}
			$text = wfMsgExt( 'configure-arrayinput-oneperline', 'parseinline' );
			$text .= "<textarea id='wp{$conf}' name='wp{$conf}' cols='30' rows='8' style='width: 95%;'>";
			if ( is_array( $default ) )
				$text .= implode( "\n", $default );
			$text .= "</textarea>\n";
			return $text;
		}
		if ( $type == 'assoc' ) {
			## See if the key/value has a special description

			$keydesc = wfMsgExt( "configure-setting-$conf-key", 'parseinline' );
			$valdesc = wfMsgExt( "configure-setting-$conf-value", 'parseinline' );

			if (wfEmptyMsg( "configure-setting-$conf-key", $keydesc ))
				$keydesc = wfMsgHtml( 'configure-desc-key' );
			if (wfEmptyMsg( "configure-setting-$conf-value", $valdesc ))
				$valdesc = wfMsgHtml( 'configure-desc-val' );

			$classes = array('configure-array-table');

			$classes[] = ($allowed ? 'assoc' : 'assoc disabled');
			if (count($default) > 5)
				$classes[] = 'configure-biglist';

			if ( !$allowed )
				$classes[] = 'disabled';

			$text = Xml::openElement( 'table', array( 'class' => ( implode( ' ', $classes ) ),
				'id' => $conf ) ) . "\n";
			$text .= "<tr><th>{$keydesc}</th><th>{$valdesc}</th></tr>\n";
			if ( is_array( $default ) && count( $default ) > 0 ) {
				$i = 0;
				foreach ( $default as $key => $val ) {
					$text .= '<tr><td>';
					if ( $allowed )
						$text .= Xml::element( 'input', array(
							'name' => 'wp' . $conf . "-key-{$i}",
							'type' => 'text', 'value' => $key, 'size' => 20
						) ) . "<br/>\n";
					else
						$text .= '<code>' . htmlspecialchars( $key ) . '</code>';
					$text .= '</td><td>';
					if ( $allowed )
						$text .= Xml::element( 'input', array(
							'name' => 'wp' . $conf . "-val-{$i}",
							'type' => 'text', 'value' => $val, 'size' => 20
						) ) . "<br/>\n";
					else
						$text .= '<code>' . htmlspecialchars( $val ) . '</code>';
					$text .= '</td></tr>';
					$i++;
				}
			} else {
				if ( $allowed ) {
					$text .= '<tr><td>';
					$text .= Xml::element( 'input', array(
						'name' => 'wp' . $conf . "-key-0",
						'type' => 'text', 'value' => '', 'size' => 20,
					) ) . "<br/>\n";
					$text .= '</td><td>';
					$text .= Xml::element( 'input', array(
						'name' => 'wp' . $conf . "-val-0",
						'type' => 'text', 'value' => '', 'size' => 20,
					) ) . "<br/>\n";
					$text .= '</td></tr>';
				} else {
					$text .= "<tr><td style='width:10em; height:1.5em;'><hr /></td>" .
						"<td style='width:10em; height:1.5em;'><hr /></td></tr>\n";
				}
			}
			$text .= '</table>';
			return $text;
		}
		if ( $type == 'simple-dual' ) {
			$var = array();
			if ( is_array( $default ) ) {
				foreach ( $default as $arr ) {
					$var[] = implode( ',', $arr );
				}
			}
			if ( !$allowed ) {
				return "<pre>\n" . htmlspecialchars( implode( "\n", $var ) ) . "\n</pre>";
			}
			$text = "<textarea id='wp{$conf}' name='wp{$conf}' cols='30' rows='8'>";
			if ( is_array( $var ) )
				$text .= implode( "\n", $var );
			$text .= "</textarea>\n";
			return $text;
		}
		if ( $type == 'ns-bool' || $type == 'ns-simple' ) {
			global $wgContLang;
			$text = '';
			$attr = ( !$allowed ) ? array( 'disabled' => 'disabled' ) : array();
			foreach ( $wgContLang->getNamespaces() as $ns => $name ) {
				$name = str_replace( '_', ' ', $name );
				if ( '' == $name ) {
					$name = wfMsgExt( 'blanknamespace', array( 'parseinline' ) );
				}
				if ( $type == 'ns-bool' ) {
					$checked = isset( $default[$ns] ) && $default[$ns];
				} else {
					$checked = in_array( $ns, (array)$default );
				}
				$text .= "<span style='white-space:nowrap;'>".
					Xml::checkLabel(
						$name,
						"wp{$conf}-ns{$ns}",
						"wp{$conf}-ns{$ns}",
						$checked,
						$attr
					) . "</span>\n";
			}
			$text = Xml::tags( 'div', array( 'class' => 'configure-biglist '.$type ), $text );
			return $text;
		}
		if ( $type == 'ns-text' ) {
			global $wgContLang;
			$nsdesc = wfMsgHtml( 'configure-desc-ns' );
			$valdesc = wfMsgExt( "configure-setting-$conf-value", 'parseinline' );

			if (wfEmptyMsg( "configure-setting-$conf-value", $valdesc ))
				$valdesc = wfMsgHtml( 'configure-desc-val' );
			$text = "<table class='configure-array-table ns-text configure-biglist'>\n<tr><th>{$nsdesc}</th><th>{$valdesc}</th></tr>\n";
			foreach ( $wgContLang->getNamespaces() as $ns => $name ) {
				$name = str_replace( '_', ' ', $name );
				if ( '' == $name ) {
					$name = wfMsgExt( 'blanknamespace', array( 'parseinline' ) );
				}
				$text .= '<tr><td>' . $name . '</td><td>';
				if ( $allowed )
					$text .= Xml::element( 'input', array(
						'size' => 20,
						'name' => "wp{$conf}-ns{$ns}",
						'type' => 'text', 'value' => isset( $default[$ns] ) ? $default[$ns] : ''
					) ) . "\n";
				else
					$text .= htmlspecialchars( isset( $default[$ns] ) ? $default[$ns] : '' );
				$text .= '</td></tr>';
			}
			$text .= '</table>';
			return $text;
		}
		if ( $type == 'ns-array' ) {
			global $wgContLang;
			$nsdesc = wfMsgHtml( 'configure-desc-ns' );
			$valdesc = wfMsgExt( "configure-setting-$conf-value", 'parseinline' );

			if (wfEmptyMsg( "configure-setting-$conf-value", $valdesc ))
				$valdesc = wfMsgHtml( 'configure-desc-val' );
			$text = "<table class='ns-array configure-biglist configure-array-table'>\n<tr><th>{$nsdesc}</th><th>{$valdesc}</th></tr>\n";
			foreach ( $wgContLang->getNamespaces() as $ns => $name ) {
				if ( $ns < 0 )
					continue;
				$name = str_replace( '_', ' ', $name );
				if ( '' == $name ) {
					$name = wfMsgExt( 'blanknamespace', array( 'parseinline' ) );
				}
				$text .= '<tr><td>' . Xml::label( $name, "wp{$conf}-ns{$ns}" ) . '</td><td>';
				if ( $allowed ) {
					$text .= Xml::openElement( 'textarea', array(
						'name' => "wp{$conf}-ns{$ns}",
						'id' => "wp{$conf}-ns{$ns}",
						'cols' => 30,
						'rows' => 5, ) ) .
					( isset( $default[$ns] ) ? implode( "\n", (array)$default[$ns] ) : '' ) .
					Xml::closeElement( 'textarea' ) . "<br/>\n";
				} else {
					$text .= "<pre>" . ( isset( $default[$ns] ) ?
						htmlspecialchars( implode( "\n", (array)$default[$ns] ) ) : '' ) . "\n</pre>";
				}
				$text .= '</td></tr>';
			}
			$text .= '</table>';
			return $text;
		}
		if ( $type == 'group-bool' || $type == 'group-array' ) {
			$all = array();
			$attr = ( !$allowed ) ? array( 'disabled' => 'disabled' ) : array();
			if ( $type == 'group-bool' ) {
				$all = User::getAllRights();
				$iter = $default;
			} else {
				$all = array_keys( $this->getSettingValue( 'wgGroupPermissions' ) );
				$iter = array();
				foreach ( $all as $group ) {
					$iter[$group] = isset( $default[$group] ) && is_array( $default[$group] ) ?
						$default[$group] : array();
				}
				$all = array_diff( $all, $this->getSettingValue( 'wgImplicitGroups' ) );
			}
			$groupdesc = wfMsgHtml( 'configure-desc-group' );
			$valdesc = wfMsgExt( "configure-setting-$conf-value", 'parseinline' );

			if (wfEmptyMsg( "configure-setting-$conf-value", $valdesc ))
				$valdesc = wfMsgHtml( 'configure-desc-val' );
			$encConf = htmlspecialchars( $conf );
			$text = "<table id= '{$encConf}' class='{$type} configure-array-table'>\n<tr><th>{$groupdesc}</th><th>{$valdesc}</th></tr>\n";
			foreach ( $iter as $group => $levs ) {
				$row = '<div class="configure-biglist '.$type.'-element"><ul>';
				foreach ( $all as $right ) {
					if ( $type == 'group-bool' )
						$checked = ( isset( $levs[$right] ) && $levs[$right] );
					else
						$checked = in_array( $right, $levs );
					$id = Sanitizer::escapeId( 'wp' . $conf . '-' . $group . '-' . $right );
					if( $type == 'group-bool' )
						$desc = User::getRightDescription( $right ) . " (" .Xml::element( 'tt', null, $right ) . ")";
					else 
						$desc = User::getGroupName( $right );
					$row .= '<li>' . Xml::check( $id, $checked, $attr + array( 'id' => $id ) ) . '&nbsp;' . Xml::tags( 'label', array( 'for' => $id ), $desc ) . "</li>\n";
				}
				$row .= '</ul></div>';
				$groupName = User::getGroupName( $group );
				$encId = Sanitizer::escapeId( 'wp' . $conf . '-' . $group );
				$text .= "<tr id=\"{$encId}\">\n<td class=\"configure-grouparray-group\">{$groupName}</td>\n<td class=\"configure-grouparray-value\">{$row}</td>\n</tr>";
			}
			$text .= '</table>';
			return $text;
		}
	}

	/**
	 * Build a table row for $conf setting with $default as default value
	 *
	 * @param $conf String: name of the setting
	 * @param $params Array: options
	 * @return String xhtml fragment
	 */
	protected function buildTableRow( $conf, $params ) {
		global $wgContLang;
		
		$rowClasses = array();
		
		if ($params['customised'])
			$rowClasses[] = 'configure-customised';

		$msg = isset( $params['msg'] ) ? $params['msg'] : 'configure-setting-' . $conf;
		$showLink = isset( $params['link'] ) ? $params['link'] : true;

		## First TD
		$attribs = array();
		$attribs['align'] = $wgContLang->isRtl() ? 'right' : 'left';
		$attribs['valign'] = 'top';
		$msgVal = wfMsgExt( $msg, array( 'parseinline' ) );
		$rawVal = Xml::element( 'tt', null, "\$$conf" );
		if ( $showLink ) {
			$url = 'http://www.mediawiki.org/wiki/Manual:$' . $conf;
			$link = Xml::tags( 'a', array( 'href' => $url, 'class' => 'configure-doc' ), $rawVal );
		} else {
			$link = $rawVal;
		}
		if ( wfEmptyMsg( $msg, $msgVal ) )
			$msgVal = $link;
		else
			$msgVal = "$msgVal ($link)";
			
		if ($params['customised'])
			$msgVal = Xml::tags( 'p', null, $msgVal ).wfMsgExt( 'configure-customised', 'parse' );
		$attribs['class'] = 'configure-left-column';
		$td1 = Xml::tags( 'td', $attribs, $msgVal );
		
		## Only the class is customised per-cell, so we'll just redefine that.
		$attribs['class'] = 'configure-right-column';
		if ( $this->isSettingAvailable( $conf ) )
			$td2 = Xml::tags( 'td', $attribs, $this->buildInput( $conf, $params ) );
		else
			$td2 = Xml::tags( 'td', $attribs, wfMsgExt( 'configure-setting-not-available', array( 'parseinline' ) ) );

		return Xml::tags( 'tr', array( 'class' => implode( ' ', $rowClasses ) ), $td1 . $td2 ) . "\n";
	}

	/**
	 * Really build the content of the form
	 *
	 * @param $settings array
	 * @param $params array
	 * @return xhtml
	 */
	protected function buildSettings( $settings, $param = array() ) {
		wfLoadExtensionMessages( 'ConfigureSettings' );
		
		global $wgConf;
		$defaults = $wgConf->getDefaultsForWiki( $this->mWiki );

		$ret = '';
		$perms = array();
		$notEditableSet = $this->getUneditableSettings();
		foreach ( $settings as $title => $groups ) {
			$res = true;
			if ( !isset( $param['restrict'] ) ) {
				$res = true;
			} elseif ( is_array( $param['restrict'] ) ) {
				if ( isset( $param['restrict'][$title] ) )
					$res = $param['restrict'][$title];
				elseif ( isset( $param['restrict']['_default'] ) )
					$res = $param['restrict']['_default'];
				else
					$res = true;
			} else {
				$res = (bool)$param['restrict'];
			}
			foreach ( $groups as $name => $sect ) {
				foreach ( $sect as $setting => $unused ) {
					if ( in_array( $setting, $notEditableSet ) ) {
						unset( $groups[$name][$setting] );
						continue;
					}
					$read = $this->userCanRead( $setting );
					$edit = $this->userCanEdit( $setting );
					if ( $this->mCanEdit ? $edit : $read )
						$res = false;
					$perms[$setting] = array( 'read' => $read, 'edit' => $edit );
				}
				if ( !count( $groups[$name] ) )
					unset( $groups[$name] );
			}

			$thisSection = '';
			if ( !$res ) {
				if ( !isset( $param['showlink'] ) ) {
					$showlink = true;
				} elseif ( is_array( $param['showlink'] ) ) {
					if ( isset( $param['showlink'][$title] ) )
						$showlink = $param['showlink'][$title];
					elseif ( isset( $param['showlink']['_default'] ) )
						$showlink = $param['showlink']['_default'];
					else
						$showlink = true;
				} else {
					$showlink = (bool)$param['showlink'];
				}
				foreach ( $groups as $group => $settings ) {
					$thisGroup = '';
					foreach ( $settings as $setting => $type ) {
						$params = $perms[$setting] + array(
							'type' => $type,
							'value' => $this->getSettingValue( $setting ),
							'link' => $showlink,
						);
						
						$params['customised'] = ( !isset( $defaults[$setting] ) || 
							WebConfiguration::filterVar( $defaults[$setting] ) != WebConfiguration::filterVar( $params['value'] ) );
						
						$show = $this->mCanEdit ?
							( isset( $params['edit'] ) ? $params['edit'] : $this->userCanEdit( $setting ) ) :
							( isset( $params['read'] ) ? $params['read'] : $this->userCanRead( $setting ) );
						if ( $show ) {
							$thisGroup .= $this->buildTableRow( $setting, $params );
						} else {
							## Don't even show it.
						}
					}

					if ( $thisGroup ) {
						$thisSection .= $this->buildTableHeading( $group ) . $thisGroup . Xml::closeElement( 'table' );
					}
				}

				if ( $thisSection ) {
					$thisSection = Xml::tags( 'legend', null, wfMsgExt( "configure-section-$title", array( 'parseinline' ) ) ) . $thisSection;
					$ret .= Xml::tags( 'fieldset', null, $thisSection );
				}
			}

		}
		return $ret;
	}
}
