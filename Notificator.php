<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "Not a valid entry point";
	exit( 1 );
}

$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,     // Magic so that svn revision number can be shown
	'name' => 'Notificator',
	'descriptionmsg' => 'notificator-desc',
	'version' => '1.1',
	'author' => 'Patrick Nagel',
	'url' => "http://www.mediawiki.org/wiki/Extension:Notificator",
);
$dir = dirname( __FILE__ );

$wgAutoloadClasses['Notificator'] = $dir . '/Notificator.body.php';
$wgAutoloadClasses['SpecialNotificator'] = $dir . '/SpecialNotificator.php';

$wgHooks['LoadExtensionSchemaUpdates'][] = 'notificator_AddDatabaseTable';
$wgHooks['ParserTestTables'][]           = 'notificator_ParserTestTables';
$wgHooks['ParserFirstCallInit'][]        = 'notificator_Setup';
$wgHooks['LanguageGetMagic'][]           = 'notificator_Magic';

$wgSpecialPages['Notificator'] = 'SpecialNotificator';

$wgExtensionMessagesFiles['Notificator'] =  $dir . '/Notificator.i18n.php';
$wgExtensionMessagesFiles['NotificatorAlias'] = $dir . '/Notificator.alias.php';

// Setting default here, to avoid register_globals vulnerabilites
$ngFromAddress = $wgPasswordSenderName . '<' . $wgPasswordSender . '>';

function notificator_AddDatabaseTable( $updater ) {
	$updater->addExtensionUpdate( array( 'addTable', 'notificator',
		dirname( __FILE__ ) . '/Notificator.sql', true ) );
	$updater->addExtensionUpdate( array( 'modifyField', 'notificator', 'receiver_email',
		dirname( __FILE__ ) . '/Notificator.patch.sql', true ) );
	return true;
}

function notificator_ParserTestTables( &$tables ) {
  $tables[] = 'notificator';
  return true;
}

function notificator_Setup( &$parser ) {
	$parser->setFunctionHook( 'notificator', 'Notificator::notificator_Render' );
	return true;
}

function notificator_Magic( &$magicWords, $langCode ) {
	$magicWords['notificator'] = array( 0, 'notificator' );
	return true;
}
