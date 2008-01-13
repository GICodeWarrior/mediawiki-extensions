<?php
if (!defined('MEDIAWIKI')) die();
/**
 * Extension adds improved patrolling interface
 *
 * @addtogroup Extensions
 * @author Rob Church <robchur@gmail.com>
 * @copyright © 2006 Rob Church
 * @licence GNU General Public Licence 2.0
 */

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'Patroller',
	'version' => '1.0rc2',
	'author' => 'Rob Church',
	'description' => 'Enhanced patrolling interface with workload sharing',
	'url' => 'http://www.mediawiki.org/wiki/Extension:Patroller',
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['Patroller'] = $dir . 'Patroller.i18n.php';
$wgAutoloadClasses['Patroller'] = $dir . 'Patroller.class.php';
$wgSpecialPages['Patrol'] = 'Patroller';

$wgAvailableRights[] = 'patroller';
$wgGroupPermissions['sysop']['patroller'] = true;
$wgGroupPermissions['patroller']['patroller'] = true;
