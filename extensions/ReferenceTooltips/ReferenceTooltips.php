<?php

/**
 * ReferenceTooltips Extension
 * Provides the full citation when a user hovers over a footnote.
 */

$wgExtensionCredits['other'][] = array(
	'author' => array( 'Andrew Garrett' ),
	'name' => 'ReferenceTooltips',
	'url' => 'http://www.mediawiki.org/wiki/Reference_Tooltips',
	'version' => '0.1',
	'path' => __FILE__,
);

$wgHooks['BeforePageDisplay'][] = 'rtfBeforePageDisplay';

// Resources
$rtResourceTemplate = array(
	'localBasePath' => dirname(__FILE__) . '/modules',
	'remoteExtPath' => 'ReferenceTooltips/modules'
);

$wgResourceModules['ext.reference-tooltips'] = $rtResourceTemplate + array(
	'styles' => array(),
	'scripts' => 'ext.reference-tooltips/ext.reference-tooltips.js',
	'position' => 'bottom',
	'dependencies' => array(
		'jquery.tooltip',
	),
);

$wgResourceModules['jquery.tooltip'] = $rtResourceTemplate + array(
	'styles' => 'jquery.tooltip/jquery.tooltip.css',
	'scripts' => 'jquery.tooltip/jquery.tooltip.js',
	'position' => 'bottom',
);

function rtfBeforePageDisplay( $out, &$sk ) {
	$out->addModules( 'ext.reference-tooltips' );

	return true;
}
