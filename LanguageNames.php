<?php
if (!defined('MEDIAWIKI')) die();
/**
 * An extension which provised localised language names for other extensions.
 *
 * @addtogroup Extensions
 * @file
 *
 * @author Niklas Laxström
 * @copyright Copyright © 2007-2008, Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Language Names',
	'version' => '1.7.1 (CLDR 1.7.1)',
	'author' => 'Niklas Laxström',
	'url' => 'http://unicode.org/cldr/repository_access.html',
	'descriptionmsg' => 'cldr-desc',
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['cldr'] = $dir . 'LanguageNames.i18n.php';
$wgAutoloadClasses['LanguageNames'] = $dir . 'LanguageNames.body.php';
