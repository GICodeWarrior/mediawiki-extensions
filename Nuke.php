<?php

if( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

define( 'Nuke_VERSION', '1.1.2' );

$dir = dirname(__FILE__) . '/';

$wgExtensionMessagesFiles['Nuke'] = $dir . 'Nuke.i18n.php';
$wgExtensionAliasesFiles['Nuke'] = $dir . 'Nuke.alias.php';

$wgExtensionCredits['specialpage'][] = array(
	'path'           => __FILE__,
	'name'           => 'Nuke',
	'descriptionmsg' => 'nuke-desc',
	'author'         => 'Brion Vibber',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:Nuke',
	'version'        => Nuke_VERSION,
);

$wgGroupPermissions['sysop']['nuke'] = true;
$wgAvailableRights[] = 'nuke';

$wgAutoloadClasses['SpecialNuke'] = $dir . 'Nuke_body.php';
$wgSpecialPages['Nuke'] = 'SpecialNuke';
$wgSpecialPageGroups['Nuke'] = 'pagetools';

// Resource loader modules
$moduleTemplate = array(
	'localBasePath' => dirname( __FILE__ ) . '/',
	'remoteExtPath' => 'Nuke/'
);

$wgResourceModules['ext.nuke'] = $moduleTemplate + array(
	'scripts' => array(
		'ext.nuke.js'
	),
	'messages' => array(
	)
);

unset( $moduleTemplate );
