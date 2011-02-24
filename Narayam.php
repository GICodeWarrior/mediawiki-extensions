<?php

/**
 * NAME
 * 	Narayam
 *
 * SYNOPSIS
 *
 * INSTALL
 * 	Put this whole directory under your Mediawiki extensions directory
 * 	Then add this line to LocalSettings.php to load the extension
 *
 * 		require_once("$IP/extensions/Narayam.php");
 *
 *      Currently Vector and Monobook skins are supported
 *
 * AUTHOR
 * 	Junaid P V <http://junaidpv.in>
 *
 * @package extensions
 * @version 0.1
 * @copyright Copyright 2010 Junaid P V
 * @license GPLv3
 */
if ( !defined( 'MEDIAWIKI' ) ) {
	exit( 1 );
}

// register extension credits
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Narayam',
	'version' => 0.1,
	'author' => 'Junaid P V (http://junaidpv.in)',
	'url' => 'http://www.mediawiki.org/wiki/Extension:Narayam',
	'descriptionmsg' => 'narayam-desc'
);

/// @todo Document all settings
$wgNarayamConfig['shortcut_controlkey'] = true;
$wgNarayamConfig['shortcut_altkey'] = false;
$wgNarayamConfig['shortcut_shiftkey'] = false;
$wgNarayamConfig['shortcut_metakey'] = false;
$wgNarayamConfig['shortcut_key'] = 'M';
// $wgNarayamConfig['default_state'] = true;
$wgNarayamConfig['schemes'] = array( 'ml', 'ta99', 'ml_inscript' );
$wgNarayamConfig['default_scheme_index'] = 0;
$wgNarayamConfig['enabled'] = true;

// localization
$wgExtensionMessagesFiles['Narayam'] = dirname( __FILE__ ) . '/Narayam.i18n.php';

// register hook function
$wgHooks['BeforePageDisplay'][] = Narayam::getInstance();

/**
 * Narayam class
 *
 * (implements singleton pattern)
 * 
 * @author Junaid P V
 * @since 0.1
 * @todo Move to different file
 * @todo No need for _-prefix for member variables
 * @todo Support resource loader
 */
class Narayam {

	/**
	 * One and only one instance of this class
	 * @var Narayam
	 */
	private static $_instance;
	/**
	 *
	 * @var OutputPage
	 */
	private $_out;
	/**
	 *
	 * @var Skin
	 */
	private $_sk;
	/**
	 * Only skins listed here are supported
	 * @var array
	 */
	private $_supportedSkins = array( 'vector', 'monobook' );

	/**
	 * This class uses singleton pattern.
	 */
	protected function __construct() {}

	/**
	 * Returns one and only object of the class
	 * @return Narayam
	 */
	public static function getInstance() {
		if ( !( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Hook function for the event 'BeforePageDisplay'
	 * @param OutputPage $out
	 * @param Skin $sk
	 */
	public function onBeforePageDisplay( &$out, &$sk ) {
		// If current skin is not supported do nothing
		if ( !in_array( $sk->getSkinName(), $this->_supportedSkins ) ) {
			return true;
		}
		global $wgExtensionAssetsPath, $wgNarayamConfig;
		$this->_out = $out;
		$this->_sk = $sk;
		// add script tag for each scheme
		foreach ( $wgNarayamConfig['schemes'] as $scheme ) {
			$out->addScriptFile( "$wgExtensionAssetsPath/Narayam/{$scheme}_rules.js" );
		}

		// Load Narayam.js file
		$out->addScriptFile( "$wgExtensionAssetsPath/Narayam/Narayam.js" );

		// Place generated JS code according to configuration settings
		$out->addInlineScript( $this->getInitJSCode() );
		return true;
	}

	function formatSchemes( $str ) {
		return sprintf( 'tr_%s', $str );
	}

	/**
	 * Generate JavaScript code according to configuration settings
	 *
	 * @global array $wgNarayamConfig
	 * @param Skin $skinName
	 * @return string Generated JS code
	 * @todo Needs rewriting
	 */
	private function getInitJSCode() {
		global $wgNarayamConfig;
		$str = "Narayam.shortcut.controlkey= " . Narayam::boolToString( $wgNarayamConfig['shortcut_controlkey'] ) . ";\n";
		$str .= "Narayam.shortcut.altkey= " . Narayam::boolToString( $wgNarayamConfig['shortcut_altkey'] ) . ";\n";
		$str .= "Narayam.shortcut.shiftkey= " . Narayam::boolToString( $wgNarayamConfig['shortcut_shiftkey'] ) . ";\n";
		$str .= "Narayam.shortcut.metakey= " . Narayam::boolToString( $wgNarayamConfig['shortcut_metakey'] ) . ";\n";
		$str .= sprintf( "Narayam.shortcut.key= '%s';\n", $wgNarayamConfig['shortcut_key'] );
		$str .= sprintf( "Narayam.checkbox.text= '%s ('+Narayam.shortcut.toString()+')';\n", wfMsgForContent( 'narayam-toggle-ime' ) /* $wgNarayamConfig['checkbox']['text'] */ );
		$title = Title::newFromText( wfMsgForContent( 'narayam-help-page' ) );
		if ( $title ) {
			$str .= sprintf( "Narayam.checkbox.href= '%s';\n", $title->getFullURL() );
		}
		$str .= sprintf( "Narayam.checkbox.tooltip= '%s';\n", wfMsgForContent( 'narayam-checkbox-tooltip' ) );
		// $str .= 'Narayam.default_state = ' . Narayam::boolToString($wgNarayamConfig['default_state']) . ";\n";
		$str .= "Narayam.schemes = [\n";
		$schemeCount = count( $wgNarayamConfig['schemes'] );

		if ( $schemeCount > 0 ) {
			$transformed = array_map( array( $this, 'formatSchemes' ) , $wgNarayamConfig['schemes'] );
			$str .= implode( ',', $transformed );
		}

		$str .= "];\n";
		$str .= sprintf( "Narayam.default_scheme_index = %d;", $wgNarayamConfig['default_scheme_index'] );
		for ( $i = 0; $i < $schemeCount; $i++ ) {
			$str .= sprintf( "tr_%s.text = '%s';\n", $wgNarayamConfig['schemes'][$i], wfMsg( 'narayam-' . str_replace( '_', '-', $wgNarayamConfig['schemes'][$i] ) ) );
		}

		$str .= 'Narayam.enabled = ' . Narayam::boolToString( $wgNarayamConfig['enabled'] ) . ";\n";

		$str .= "function irSetup() {\n";
		$str .= "var elements = getAllTextInputs();\n";
		$str .= "inputRewrite(elements);\n";
		$str .= "elements = document.getElementsByTagName('textarea');";
		$str .= "inputRewrite(elements);\n";
		// $str .= sprintf("Narayam.init(%d);\n", $wgNarayamConfig['default_scheme_index']);
		if ( in_array( $this->_sk->getSkinName(), $this->_supportedSkins ) ) {
			$str .= 'setupNarayamFor' . $this->_sk->getSkinName() . "();\n";
		}
		$str .= "}\n";
		$str .= "if (window.addEventListener){\n";
		$str .= "window.addEventListener('load', irSetup, false);\n";
		$str .= "} else if (window.attachEvent){\n";
		$str .= "window.attachEvent('onload', irSetup);\n";
		$str .= "}";
		return $str;
	}

	/**
	 * Convert return string representation of give bool value
	 * @param bool $value
	 * @return string
	 */
	public static function boolToString( $value ) {
		return ( $value ) ? 'true' : 'false';
	}

}
