<?php
if ( !defined( 'MEDIAWIKI' ) ) die();

/**
 * Special page allows authorised users to configure the wiki
 *
 * @file
 * @ingroup Extensions
 */
class SpecialConfigure extends ConfigurationPage {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct( 'Configure', 'configure' );
	}

	protected function doSubmit() {
		global $wgConf, $wgOut, $wgConfigureUpdateCacheEpoch;

		$current = $wgConf->getCurrent( $this->mWiki );
		$settings = $this->importFromRequest();
		$settings += $current;
		$settings = $this->removeDefaults( $settings );
		if ( $wgConfigureUpdateCacheEpoch )
			$settings['wgCacheEpoch'] = max( $settings['wgCacheEpoch'], wfTimestampNow() );
		$ok = $wgConf->saveNewSettings( $settings, $this->mWiki );
		$msg = wfMsgNoTrans( $ok ? 'configure-saved' : 'configure-error' );
		$class = $ok ? 'successbox' : 'errorbox';

		$wgOut->addWikiText( "<div class=\"$class\"><strong>$msg</strong></div>" );
	}

	protected function getSettingMask() {
		return CONF_SETTINGS_CORE;
	}

	/**
	 * Helper function for the diff engine
	 * @param $setting setting name
	 */
	public function isSettingEditable( $setting ) {
		return ( $this->isSettingAvailable( $setting )
			&& $this->userCanEdit( $setting )
			&& ( $this->getSettingType( $setting ) != 'array'
			// Array type is not NULL or 'array'
				|| !in_array( $this->getArrayType( $setting ), array( 'array', null ) ) ) );
	}

	/**
	 * Show the diff between the current version and the posted version
	 */
	protected function showDiff() {
		global $wgConf, $wgOut;
		$wiki = $this->mWiki;
		$old = array( $wiki => $this->removeDefaults( $wgConf->getCurrent( $wiki ) ) );
		$new = array( $wiki => $this->removeDefaults( $this->conf ) );
		$diff = new CorePreviewConfigurationDiff( $old, $new, array( $wiki ) );
		$diff->setViewCallback( array( $this, 'isSettingEditable' ) );
		$wgOut->addHTML( $diff->getHtml() );
	}

	/**
	 * Build the content of the form
	 *
	 * @return xhtml
	 */
	protected function buildAllSettings() {
		return $this->buildSettings( $this->getSettings() );
	}
}
