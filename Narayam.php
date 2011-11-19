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

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Narayam',
	'version' => 0.1,
	'author' => array( 'Junaid P V (http://junaidpv.in)', 'Roan Kattouw' ),
	'url' => 'http://www.mediawiki.org/wiki/Extension:Narayam',
	'descriptionmsg' => 'narayam-desc'
);

/* Configuration */

// Whether the input method should be active as default or not
$wgNarayamEnabledByDefault = true;

// Number of recently used input methods to be shown
$wgNarayamRecentItemsLength = 3;

// Array mapping language codes and scheme names to module names
// Custom schemes can be added here
$wgNarayamSchemes = array(
	'am' => array(
		'am' => 'ext.narayam.rules.am',
	),
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
	'mr' => array(
		'mr' => 'ext.narayam.rules.mr',
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
		'ta-99' => 'ext.narayam.rules.ta-99',
		'ta-bamini' => 'ext.narayam.rules.ta-bamini',
	),
	'te' => array(
		'te-inscript' => 'ext.narayam.rules.te-inscript',
	),
);

/* Setup */

$dir = dirname( __FILE__ );

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
		'modern' => 'css/ext.narayam.core-modern.css',
	),
	'messages' => array(
		'narayam-checkbox-tooltip',
		'narayam-menu',
		'narayam-menu-tooltip',
		'narayam-help',
		'narayam-toggle-ime',
		'narayam-more-imes',
		'narayam-am',
		'narayam-as',
		'narayam-as-avro',
		'narayam-as-bornona',
		'narayam-as-inscript',
		'narayam-eo',
		'narayam-hi-inscript',
		'narayam-kn',
		'narayam-kn-inscript',
		'narayam-ml',
		'narayam-ml-inscript' ,
		'narayam-mr',
		'narayam-ne',
		'narayam-ne-inscript',
		'narayam-or',
		'narayam-or-inscript',
		'narayam-sa',
		'narayam-sa-inscript',
		'narayam-si-singlish',
		'narayam-si-wijesekara',
		'narayam-ta-99',
		'narayam-ta',
		'narayam-ta-bamini',
		'narayam-te-inscript',
		'narayam-bn-avro',
		'narayam-bn-inscript',
		'narayam-bn-nkb',
	),
	'dependencies' => array(
		'mediawiki.util',
		'jquery.textSelection',
		'jquery.cookie',
	),
);
$wgResourceModules['ext.narayam.rules.am'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.am.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.as'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.as.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.as-avro'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.as-avro.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.as-bornona'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.as-bornona.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.as-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.as-inscript.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.bn-avro'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.bn-avro.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.bn-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.bn-inscript.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.bn-nkb'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.bn-nkb.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.eo'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.eo.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.hi-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.hi-inscript.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.kn'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.kn.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.kn-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.kn-inscript.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.ml'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.ml.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.mr'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.mr.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.ml-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.ml-inscript.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.ne'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.ne.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.ne-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.ne-inscript.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.or'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.or.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.or-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.or-inscript.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.sa'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.sa.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.sa-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.sa-inscript.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.si-singlish'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.si-singlish.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.si-wijesekara'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.si-wijesekara.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.ta'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.ta.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.ta-99'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.ta-99.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.ta-bamini'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.ta-bamini.js',
	'dependencies' => 'ext.narayam.core',
);
$wgResourceModules['ext.narayam.rules.te-inscript'] = $narayamTpl + array(
	'scripts' => 'js/ext.narayam.rules.te-inscript.js',
	'dependencies' => 'ext.narayam.core',
);
