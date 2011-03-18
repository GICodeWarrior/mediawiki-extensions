<?php
if (!defined('MEDIAWIKI')) die();
/**
 * A Special Page extension to show full screen maps
 *
 * @file
 * @ingroup Extensions
 *
 * @author Jens Frank <jeluf@gmx.de>
 * @copyright Copyright © 2007, Jens Frank
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionCredits['specialpage'][] = array(
        'name' => 'Wikimaps',
        'author' => 'Jens Frank',
        'url' => 'http://meta.wikimedia.org/wiki/Wikimaps',
        'description' => 'Show maps',
);

$dir = dirname(__FILE__) . '/';
$wgAutoloadClasses['SpecialWikimaps'] = $dir . 'SpecialWikimaps_body.php';
$wgSpecialPages['Wikimaps'] = 'SpecialWikimaps';
