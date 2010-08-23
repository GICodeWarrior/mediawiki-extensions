<?php
/**
 * Hooks for Usability Initiative extensions
 *
 * @file
 * @ingroup Extensions
 */

class UsabilityInitiativeHooks {

	/* Static Members */

	private static $doOutput = false;
	private static $messages = array();
	private static $variables = array();
	private static $styles = array();
	private static $styleFiles = array(
		'base_sets' => array(
			'raw' => array(
				array( 'src' => 'css/suggestions.css', 'version' => 16 ),
				array( 'src' => 'css/vector.collapsibleNav.css', 'version' => 12 ),
				array( 'src' => 'css/vector.expandableSearch.css', 'version' => 8 ),
				array( 'src' => 'css/vector.footerCleanup.css', 'version' => 2 ),
				array( 'src' => 'css/wikiEditor.css', 'version' => 14 ),
				array( 'src' => 'css/wikiEditor.dialogs.css', 'version' => 30 ),
				array( 'src' => 'css/wikiEditor.preview.css', 'version' => 3 ),
				array( 'src' => 'css/wikiEditor.previewDialog.css', 'version' => 1 ),
				array( 'src' => 'css/wikiEditor.toc.css', 'version' => 31 ),
				array( 'src' => 'css/wikiEditor.toolbar.css', 'version' => 19 ),
				array( 'src' => 'css/vector/jquery-ui-1.7.2.css', 'version' => '1.7.2y' ),
			),
			'combined' => array(
				array( 'src' => 'css/combined.css', 'version' => 117 ),
				array( 'src' => 'css/vector/jquery-ui-1.7.2.css', 'version' => '1.7.2y' ),
			),
			'minified' => array(
				array( 'src' => 'css/combined.min.css', 'version' => 117 ),
				array( 'src' => 'css/vector/jquery-ui-1.7.2.css', 'version' => '1.7.2y' ),
			),
		)
	);
	private static $scripts = array();
	private static $scriptFiles = array(
		'tests' => array(
			array( 'src' => 'js/tests/wikiEditor.toolbar.js', 'version' => 0 )
		),
		'modules' => array(
			'raw' => array(),
			'combined' => array(),
			'minified' => array()
		),
		// Core functionality of extension
		'base_sets' => array(
			'raw' => array(
				// Common UsabilityInitiative funtions
				array( 'src' => 'js/usability.js', 'version' => 6 ),
				
				// Core functionality of extension scripts
				array( 'src' => 'js/plugins/jquery.async.js', 'version' => 3 ),
				array( 'src' => 'js/plugins/jquery.autoEllipsis.js', 'version' => 17 ),
				array( 'src' => 'js/plugins/jquery.browser.js', 'version' => 9 ),
				array( 'src' => 'js/plugins/jquery.collapsibleTabs.js', 'version' => 6 ),
				array( 'src' => 'js/plugins/jquery.color.js', 'version' => 1 ),
				array( 'src' => 'js/plugins/jquery.cookie.js', 'version' => 4 ),
				array( 'src' => 'js/plugins/jquery.delayedBind.js', 'version' => 1 ),
				array( 'src' => 'js/plugins/jquery.expandableField.js', 'version' => 17 ),
				array( 'src' => 'js/plugins/jquery.highlightText.js', 'version' => 1 ),
				array( 'src' => 'js/plugins/jquery.suggestions.js', 'version' => 33 ),
				array( 'src' => 'js/plugins/jquery.textSelection.js', 'version' => 36 ),
				array( 'src' => 'js/plugins/jquery.wikiEditor.js', 'version' => 196 ),
				array( 'src' => 'js/plugins/jquery.wikiEditor.highlight.js', 'version' => 53 ),
				array( 'src' => 'js/plugins/jquery.wikiEditor.toolbar.js', 'version' => 72 ),
				array( 'src' => 'js/plugins/jquery.wikiEditor.dialogs.js', 'version' => 28 ),
				array( 'src' => 'js/plugins/jquery.wikiEditor.toc.js', 'version' => 99 ),
				array( 'src' => 'js/plugins/jquery.wikiEditor.preview.js', 'version' => 12 ),
				array( 'src' => 'js/plugins/jquery.wikiEditor.previewDialog.js', 'version' => 1 ),
				array( 'src' => 'js/plugins/jquery.wikiEditor.templateEditor.js', 'version' => 77 ),
				array( 'src' => 'js/plugins/jquery.wikiEditor.templates.js', 'version' => 1 ),
				array( 'src' => 'js/plugins/jquery.wikiEditor.publish.js', 'version' => 5 ),
				
				// thirdparty javascript libraries we use
				array( 'src' => 'js/thirdparty/contentCollector.js', 'version' => 2 ),
			),
			'combined' => array(
				array( 'src' => 'js/plugins.combined.js', 'version' => 457 ),
			),
			'minified' => array(
				array( 'src' => 'js/plugins.combined.min.js', 'version' => 478 ),
			),
		),
	);

	/* Static Functions */

	public static function initialize() {
		self::$doOutput = true;
	}

	/**
	 * AjaxAddScript hook
	 * Adds scripts
	 */
	public static function addResources( $out ) {
		global $wgExtensionAssetsPath;
		global $wgUsabilityInitiativeResourceMode;
		global $wgEnableJS2system, $wgEditToolbarRunTests;
		global $wgStyleVersion;

		wfRunHooks( 'UsabilityInitiativeLoadModules' );

		if ( !self::$doOutput )
			return true;

		// Default to raw
		$mode = $wgUsabilityInitiativeResourceMode; // Just an alias
		if ( !isset( self::$scriptFiles['base_sets'][$mode] ) ) {
			$mode = 'raw';
		}
		// Include base-set of scripts
		self::$scripts = array_merge(
			self::$scriptFiles['base_sets'][$mode],
			self::$scriptFiles['modules'][$mode],
			self::$scripts
		);
		// Provide enough support to make things work, even when js2 is not
		// in use (eventually it will be standard, but right now it's not)
		if ( !$wgEnableJS2system ) {
			$out->includeJQuery();
		}
		// Include base-set of styles
		self::$styles = array_merge(
			self::$styleFiles['base_sets'][$mode], self::$styles
		);
		if ( $wgEditToolbarRunTests ) {
			// Include client side tests
			self::$scripts = array_merge(
				self::$scripts, self::$scriptFiles['tests']
			);
		}
		// Loops over each script
		foreach ( self::$scripts as $script ) {
			// Add javascript to document
			if ( $script['src']{0} == '/' ) {
				// Path is relative to $wgScriptPath
				global $wgScriptPath;
				$src = "$wgScriptPath{$script['src']}";
			} else {
				// Path is relative to $wgExtensionAssetsPath
				$src = "$wgExtensionAssetsPath/UsabilityInitiative/{$script['src']}";
			}
			$version = isset( $script['version'] ) ? $script['version'] : $wgStyleVersion;
			$out->addScriptFile( $src, $version );
		}
		// Transforms messages into javascript object members
		foreach ( self::$messages as $i => $message ) {
			$escapedMessageValue = Xml::escapeJsString( wfMsg( $message ) );
			$escapedMessageKey = Xml::escapeJsString( $message );
			self::$messages[$i] =
				"'{$escapedMessageKey}':'{$escapedMessageValue}'";
		}
		// Add javascript to document
		if ( count( self::$messages ) > 0 ) {
			$out->addScript( Html::inlineScript(
				'mw.usability.addMessages({' . implode( ',', self::$messages ) . '});'
			) );
		}
		// Loops over each style
		foreach ( self::$styles as $style ) {
			// Add css for various styles
			$out->addExtensionStyle( $wgExtensionAssetsPath .
				"/UsabilityInitiative/{$style['src']}?{$style['version']}"
			);
		}
		return true;
	}

	/**
	 * MakeGlobalVariablesScript hook
	 */
	public static function addJSVars( &$vars ) {
		$vars = array_merge( $vars, self::$variables );
		return true;
	}

	/**
	 * Adds a reference to a javascript file to the head of the document
	 * @param string $src Path to the file relative to this extension's folder
	 * @param object $version Version number of the file
	 */
	public static function addScript( $src, $version = '' ) {
		// The key is Andrew's snarky 20-character way of stopping multiple inclusion of the same file.
		self::$scripts["$src?$version"] = array( 'src' => $src, 'version' => $version );
	}

	/**
	 * Adds a reference to a css file to the head of the document
	 * @param string $src Path to the file relative to this extension's folder
	 * @param string $version Version number of the file
	 */
	public static function addStyle( $src, $version = '' ) {
		self::$styles[] = array( 'src' => $src, 'version' => $version );
	}

	/**
	 * Adds internationalized message definitions to the document for access
	 * via javascript using the mw.usability.getMsg() function
	 * @param array $messages Key names of messages to load
	 */
	public static function addMessages( $messages ) {
		self::$messages = array_merge( self::$messages, $messages );
	}

	/**
	 * Adds variables that will be turned into global variables in JS
	 * @param $variables array of "name" => "value"
	 */
	public static function addVariables( $variables ) {
		self::$variables = array_merge( self::$variables, $variables );
	}

	/**
	 * Adds scripts for modules
	 * @param $scripts array with 'raw', 'combined' and 'minified' keys
	 */
	public static function addModuleScripts( $scripts ) {
		self::$scriptFiles['modules'] = array_merge(
			self::$scriptFiles['modules'], $scripts );
	}
}
