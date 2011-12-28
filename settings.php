<?php
/********************************************************************************
 * Settings.php Section 1:
 * Fille in this section then login to twitter and use auth.php to authorize 
 * this script to post updates.
 ********************************************************************************/
session_start();
/* Consumer key from twitter */
$consumer_key = '';
/* Consumer Secret from twitter */
$consumer_secret = '';

/********************************************************************************
 * Settings.php Section 2:
 * After you have run auth.php and authorizes the script to post updated to your
 * twitter account, the script will tell you what to enter below.
 ********************************************************************************/
$oauth_access_token = '';
$oauth_access_token_secret = '';

/********************************************************************************
 * Settings.php Section 3:
 * Do not edit below
 ********************************************************************************/
 
/* Set up placeholder */
$content = NULL;
/* Set state if previous session */
$state = $_SESSION['oauth_state'];
/* Checks if oauth_token is set from returning from twitter */
$session_token = $_SESSION['oauth_request_token'];
/* Checks if oauth_token is set from returning from twitter */
$oauth_token = $_REQUEST['oauth_token'];
/* Set section var */
$section = $_REQUEST['section'];

$wgExtensionCredits['other'][] = array(
	'path'           => __FILE__,
	'name'           => 'wiki2twitter',
	'version'        => '1.0.1',
	'author'         => 'Wendell Gaudencio',
	'description'    => 'This extension posts twitter updates when someone makes an edit.',
	'descriptionurl' => '',
	'url'            => 'http://code.google.com/p/wiki2twitter/',
);
?>