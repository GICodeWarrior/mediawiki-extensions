<?php
if (!defined('MEDIAWIKI')) die();
/**
 * @file
 * @ingroup Extensions
 *
 * @author Ævar Arnfjörð Bjarmason <avarab@gmail.com>
 * @copyright Copyright © 2005, Ævar Arnfjörð Bjarmason
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgHooks['SpecialSearchNogomatch'][] = 'wfNogomatchHook';
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Nogomatch hook',
	'author' => 'Ævar Arnfjörð Bjarmason',
);

function wfNogomatchHook( &$title ) {
	wfDebugLog( 'nogomatch', $title->getText(), false );
	return true;
}
