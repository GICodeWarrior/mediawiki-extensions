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
// control key included in short key combination??
$wgNarayamConfig['shortcut_controlkey'] = true;
// alt key included in short key combination??
$wgNarayamConfig['shortcut_altkey'] = false;
// shift key included in short key combination??
$wgNarayamConfig['shortcut_shiftkey'] = false;
// meta key included in short key combination?? (only effects mac clients)
$wgNarayamConfig['shortcut_metakey'] = false;
// short key in short key combination
$wgNarayamConfig['shortcut_key'] = 'M';
// list of schemes to be loaded when no one specified
$wgNarayamConfig['schemes'] = array( 'ml', 'ta99', 'ml_inscript' );
// which scheme should come as default in the list box
$wgNarayamConfig['default_scheme_index'] = 0;
// whether the input method should be active as default or not
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
	private $_skin;
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
		$this->_skin = $sk;
		// add script tag for each scheme to be loaded
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

		$target = '';

		if ( $title && $title->exists() ) {
			$target = $title->getFullURL();
		}

		$str .= sprintf( "Narayam.checkbox.href= '%s';\n", $target );

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
		if ( in_array( $this->_skin->getSkinName(), $this->_supportedSkins ) ) {
			$str .= 'setupNarayamFor' . $this->_skin->getSkinName() . "();\n";
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
