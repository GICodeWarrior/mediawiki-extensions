<?php

/**
 * Wrapper to integrate SVG-edit in-browser vector graphics editor in MediaWiki.
 * http://www.mediawiki.org/wiki/Extension:SVGEdit
 *
 * @copyright 2010 Brion Vibber <brion@pobox.com>
 *
 * MediaWiki-side code is GPL
 *
 * SVG-edit is under Apache license: http://code.google.com/p/svg-edit/
 */

$wgExtensionCredits['other'][] = array(
	'path'           => __FILE__,
	'name'           => 'SVGEdit',
	'author'         => array( 'Brion Vibber' ),
	'url'            => 'http://www.mediawiki.org/wiki/Extension:SVGEdit',
	'descriptionmsg' => 'svgedit-desc',
);
$wgExtensionMessagesFiles['SVGEdit'] =  dirname(__FILE__) . '/SVGEdit.i18n.php';

$wgHooks['BeforePageDisplay'][] = 'SVGEditHooks::beforePageDisplay';

$wgAutoloadClasses['SVGEditHooks'] = dirname( __FILE__ ) . '/SVGEdit.hooks.php';

$myResourceTemplate = array(
	'localBasePath' => dirname( __FILE__ ) . '/modules',
	'remoteExtPath' => 'SVGEdit/modules',
	'group' => 'ext.svgedit',
);
$wgResourceModules += array(
	'ext.svgedit.editButton' => $myResourceTemplate + array(
		'scripts' => 'ext.svgedit.editButton.js',
		'messages' => array(
			'svgedit-editbutton-edit',
			'svgedit-editor-save-close',
			'svgedit-editor-close',
		),
	),
);
