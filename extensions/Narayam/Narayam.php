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
 * @file
 * @ingroup extensions
 * @version 0.2
 * @copyright Copyright 2010 Junaid P V
 * @license GPLv3
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	exit( 1 );
}

/* Configuration */

// Whether the input method should be active as default or not
$wgNarayamEnabledByDefault = true;

// Shortcut key for enabling and disabling Narayam
// Defaults to Ctrl+M
$wgNarayamShortcutKey = array(
	'altKey' => false,
	'ctrlKey' => true,
	'shiftKey' => false,
	'key' => 'm'
);

// Array mapping language codes and scheme names to module names
// Custom schemes can be added here
$wgNarayamSchemes = array(
	'as' => array(
		'as' => 'ext.narayam.rules.as',
		'as-avro' => 'ext.narayam.rules.as-avro',
		'as-bornona' => 'ext.narayam.rules.as-bornona',
		'as-inscript' => 'ext.narayam.rules.as-inscript',
	),
	'bn' => array(
		'bn-avro' => 'ext.narayam.rules.bn-avro',
		'bn-inscript' => 'ext.narayam.rules.bn-inscript',
		'bn-nkb' => 'ext.narayam.rules.bn-nkb',
	),
	'eo' => array(
		'eo' => 'ext.narayam.rules.eo',
	),
	'hi' => array(
		'hi-inscript' => 'ext.narayam.rules.hi-inscript',
	),
	'kn' => array(
		'kn' => 'ext.narayam.rules.kn',
		'kn-inscript' => 'ext.narayam.rules.kn-inscript',
	),
	'ml' => array(
		'ml' => 'ext.narayam.rules.ml',
		'ml-inscript' => 'ext.narayam.rules.ml-inscript',
	),
	'ne' => array(
		'ne' => 'ext.narayam.rules.ne',
		'ne-inscript' => 'ext.narayam.rules.ne-inscript',
	),
	'or' => array(
		'or' => 'ext.narayam.rules.or',
		'or-inscript' => 'ext.narayam.rules.or-inscript',
	),
	'sa' => array(
		'sa' => 'ext.narayam.rules.sa',
		'sa-inscript' => 'ext.narayam.rules.sa-inscript',
	),
	'si' => array(
		'si-singlish' => 'ext.narayam.rules.si-singlish',
		'si-wijesekara' => 'ext.narayam.rules.si-wijesekara',
	),
	'ta' => array(
		'ta' => 'ext.narayam.rules.ta',
		'ta99' => 'ext.narayam.rules.ta99',
	),
	'te' => array(
		'te-inscript' => 'ext.narayam.rules.te-inscript',
	),
);

/* Setup */

$dir = dirname( __FILE__ );

// Register extension credits
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Narayam',
	'version' => 0.1,
	'author' => array( 'Junaid P V (http://junaidpv.in)', 'Roan Kattouw' ),
	'url' => 'http://www.mediawiki.org/wiki/Extension:Narayam',
	'descriptionmsg' => 'narayam-desc'
);

// Localization
$wgExtensionMessagesFiles['Narayam'] = $dir . '/Narayam.i18n.php';

// Register hook function
$wgHooks['BeforePageDisplay'][] = 'NarayamHooks::addModules';
$wgHooks['ResourceLoaderGetConfigVars'][] = 'NarayamHooks::addConfig';
$wgHooks['MakeGlobalVariablesScript'][] = 'NarayamHooks::addVariables';
$wgHooks['GetPreferences'][] = 'NarayamHooks::addPreference';

// Autoloader
$wgAutoloadClasses['NarayamHooks'] = $dir . '/Narayam.hooks.php';

// ResourceLoader module registration
$narayamTpl = array(
	'localBasePath' => $dir,
	'remoteExtPath' => 'Narayam',
);
$wgResourceModules['ext.narayam'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.core'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.core.js',
	'styles' => 'css/ext.narayam.core.css',
	'skinStyles' => array(
		'monobook' => 'css/ext.narayam.core-monobook.css',
		'vector' => 'css/ext.narayam.core-vector.css',
	),
	'messages' => array(
		'narayam-checkbox-tooltip',
		'narayam-menu',
		'narayam-menu-tooltip',
		'narayam-help',
		'narayam-help-page',
		'narayam-toggle-ime',
	),
	'dependencies' => array( 'mediawiki.util', 'jquery.textSelection' ),
);
$wgResourceModules['ext.narayam.rules.as'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.as.js',
	'messages' => array( 'narayam-as' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.as-avro'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.as-avro.js',
	'messages' => array( 'narayam-as-avro' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.as-bornona'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.as-bornona.js',
	'messages' => array( 'narayam-as-bornona' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.as-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.as-inscript.js',
	'messages' => array( 'narayam-as-inscript' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.bn-avro'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.bn-avro.js',
	'messages' => array( 'narayam-bn-avro' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.bn-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.bn-inscript.js',
	'messages' => array( 'narayam-bn-inscript' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.bn-nkb'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.bn-nkb.js',
	'messages' => array( 'narayam-bn-nkb' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.eo'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.eo.js',
	'messages' => array( 'narayam-eo' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.hi-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.hi-inscript.js',
	'messages' => array( 'narayam-hi-inscript' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.kn'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.kn.js',
	'messages' => array( 'narayam-kn' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.kn-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.kn-inscript.js',
	'messages' => array( 'narayam-kn-inscript' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.ml'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.ml.js',
	'messages' => array( 'narayam-ml' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.ml-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.ml-inscript.js',
	'messages' => array( 'narayam-ml-inscript' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.ne'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.ne.js',
	'messages' => array( 'narayam-ne' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.ne-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.ne-inscript.js',
	'messages' => array( 'narayam-ne-inscript' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.or'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.or.js',
	'messages' => array( 'narayam-or' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.or-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.or-inscript.js',
	'messages' => array( 'narayam-or-inscript' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.sa'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.sa.js',
	'messages' => array( 'narayam-sa' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.sa-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.sa-inscript.js',
	'messages' => array( 'narayam-sa-inscript' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.si-singlish'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.si-singlish.js',
	'messages' => array( 'narayam-si-singlish' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.si-wijesekara'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.si-wijesekara.js',
	'messages' => array( 'narayam-si-wijesekara' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.ta'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.ta.js',
	'messages' => array( 'narayam-ta' ),
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.ta99'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.ta99.js',
	'messages' => array( 'narayam-ta99' ),
	'dependencies' => 'ext.narayam.rules.ta', // make sure ta99 loads after ta
);
$wgResourceModules['ext.narayam.rules.te-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.te-inscript.js',
	'messages' => array( 'narayam-te-inscript' ),
	'dependencies' => 'ext.narayam.core',
);
