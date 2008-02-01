<?php
if ( ! defined( 'MEDIAWIKI' ) )
	die();
/**
 * Get a random page from the set of pages whos talk or subjectpage links to a
 * given page, can be used like Special:AdvancedRandom/Template:Featured/Talk
 * to get a random featured article or like
 * Special:AdvancedRandom/Template:Delete to get a random speedy deletion
 * candidate.
 *
 * Note: This is neat, but way too expensive to run on any serious site
 *
 * @addtogroup Extensions
 *
 * @author Ævar Arnfjörð Bjarmason <avarab@gmail.com>
 * @copyright Copyright © 2005, Ævar Arnfjörð Bjarmason
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'AdvancedRandom',
	'description' => 'Get a random page from whos talk or subjectpage ' .
	                 'links to a given page, can be used like ' .
			 '[[Special:AdvancedRandom/Template:Featured/Talk]] ' .
			 'to get a random featured article or like ' .
			 '[[Special:AdvancedRandom/Template:GFDL/Image]] to ' .
			 'get a random GFDL file',
	'descriptionmsg' => 'advancedrandom-desc',
	'author' => 'Ævar Arnfjörð Bjarmason'
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['AdvancedRandom'] = $dir . 'SpecialAdvancedRandom.i18n.php';

$wgAutoloadClasses['SpecialAdvancedRandom'] = $dir . 'AdvancedRandom_body.php';

$wgSpecialPages['AdvancedRandom'] = 'SpecialAdvancedRandom';
