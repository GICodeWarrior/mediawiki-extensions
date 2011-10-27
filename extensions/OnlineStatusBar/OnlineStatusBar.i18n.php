<?php
/**
 * Internationalisation file for Online status bar extension.
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/**
 * English
 * @author Petr Bena
 */
$messages['en'] = array(
	// Description 
	'onlinestatusbar-desc' => 'Status bar which shows whether a user is online, based on preferences, on their user page',
	// Status bar text line (User is now Offline) etc.
	'onlinestatusbar-line' => '$1 is now $2 $3',
	// Message in config asking user if they want to enable it
	'onlinestatusbar-used' => 'Do you want to let others see if you are online?',
	// Message in config asking what status they want to use
	'onlinestatusbar-status' => 'What is the default status you wish to use:',
	// Section for config
	'prefs-onlinestatus' => 'Online status',
	// Message in config
	'onlinestatusbar-hide' => 'Do you want to hide the status bar in order to use just the magic word? (For advanced users)',
);

/** Message documentation (Message documentation) */
$messages['qqq'] = array(
	'onlinestatusbar-desc' => '{{desc}}',
	'onlinestatusbar-line' => 'Status bar text line (User is now Offline), parameters:
* $1 is user
* $2 is a picture of status (small icon in color of status)
* $3 a status, it will appear in title bar of their user space pages',
	'onlinestatusbar-used' => 'Message in config asking user if they want to enable it, checkbox',
	'onlinestatusbar-status' => 'Message in config asking what status they want to use, option box',
	'prefs-onlinestatus' => 'Section for config, located in preferences - misc',
	'onlinestatusbar-hide' => 'Ask user if they want to hide status bar this is useful when they are using custom template but need to check if they are online',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'onlinestatusbar-desc' => 'Ermöglicht, abhängig von der Benutzereinstellung, die Anzeige des Onlinestatus eines Benutzers auf dessen Benutzerseite',
	'onlinestatusbar-line' => '$1 ist gerade $3 $2',
	'onlinestatusbar-used' => 'Möchtest du, dass andere Benutzer deinen Onlinestatus sehen?',
	'onlinestatusbar-status' => 'Welchen Status möchtest du standardmäßig nutzen:',
	'prefs-onlinestatus' => 'Onlinestatus',
	'onlinestatusbar-hide' => "Möchtest du die Statusleiste ausblenden, um stattdessen lediglich das ''Magic Word'' zu nutzen? (Für Fortgeschrittene)",
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'onlinestatusbar-used' => 'Möchten Sie, dass andere Benutzer Ihren Onlinestatus sehen?',
	'onlinestatusbar-status' => 'Welchen Status möchten Sie standardmäßig nutzen:',
	'onlinestatusbar-hide' => "Möchten Sie die Statusleiste ausblenden, um stattdessen lediglich das ''Magic Word'' zu nutzen? (Für Fortgeschrittene)",
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'onlinestatusbar-desc' => 'Barra de estado que mostra na páxina de usuario se un usuario está conectado',
	'onlinestatusbar-line' => '$1 está $2 $3 nestes intres',
	'onlinestatusbar-used' => 'Quere deixar que os outros poidan ver se está conectado?',
	'onlinestatusbar-status' => 'Cal é o estado por defecto que quere usar:',
	'prefs-onlinestatus' => 'Conectado',
	'onlinestatusbar-hide' => 'Quere agochar a barra de estado para usar unicamente a palabra máxica? (Para usuarios avanzados)',
);

