<?php
/**
* EditUser extension by Ryan Schmidt
*/

if(!defined('MEDIAWIKI')) {
	echo "This file is an extension to the MediaWiki software and is not a valid access point";
	die(1);
}

$dir = dirname(__FILE__) . '/';

$wgExtensionCredits['specialpage'][] = array(
	'path'           => __FILE__,
	'name'           => 'EditUser',
	'version'        => '1.7.0',
	'author'         => 'Ryan Schmidt',
	'descriptionmsg' => 'edituser-desc',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:EditUser',
);

$wgExtensionMessagesFiles['EditUser'] = $dir . 'EditUser.i18n.php';
$wgExtensionAliasesFiles['EditUser'] = $dir . 'EditUser.alias.php';
$wgAutoloadClasses['EditUser'] = $dir . '/EditUser_body.php';
$wgSpecialPages['EditUser'] = 'EditUser';
$wgAvailableRights[] = 'edituser';
$wgAvailableRights[] = 'edituser-exempt';
$wgSpecialPageGroups['EditUser'] = 'users';

#Default group permissions
$wgGroupPermissions['bureaucrat']['edituser'] = true;
$wgGroupPermissions['sysop']['edituser-exempt'] = true;
