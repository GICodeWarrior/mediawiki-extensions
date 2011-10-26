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
	'onlinestatusbar-desc' => "Status bar which shows whether a user is online, based on preferences, on their user page",
	// Status bar text line (User is now Offline) etc.
	'onlinestatusbar-line' => "$1 is now $2 $3",
	// Message in config asking user if they want to enable it
	'onlinestatusbar-used' => 'Do you want to let others see if you are online?',
	// Message in config asking what status they want to use
	'onlinestatusbar-status' => 'What is the default status you wish to use:',
	// Section for config
	'prefs-onlinestatus' => 'Online Status',
);

$messages['qqq'] = array(
	'onlinestatusbar-desc' => '{{desc}}',
        'onlinestatusbar-line' => "Status bar text line (User is now Offline), parameters:\n* $1 is user\n* $2 is a picture of status (small icon in color of status)\n* $3 a status, it will appear in title bar of their user space pages",
        'onlinestatusbar-used' => 'Message in config asking user if they want to enable it, checkbox',
        'onlinestatusbar-status' => 'Message in config asking what status they want to use, option box',
        'prefs-onlinestatus' => 'Section for config, located in preferences - misc',
);
