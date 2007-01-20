<?php
if ( ! defined( 'MEDIAWIKI' ) )
	die();
    
/**#@+
 * Provides a basic way of preventing articles with certain titles from being saved or created
 * @addtogroup Extensions
 *
 * @link http://www.mediawiki.org/wiki/Extension:BlockTitles Documentation
 *
 *
 * @author Travis Derouin <travis@wikihow.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionFunctions[] = 'wfBlockTitles';

$wgExtensionCredits['other'][] = array(
	'name' => 'BlockTitles',
	'author' => 'Travis Derouin',
	'description' => 'Provides a basic way of preventing articles with certain titles from being saved or created',
	'url' => 'http://www.mediawiki.org/wiki/Extension:BlockTitles',
);

// CONFIGURE - place any regular expressions you want here.  
$wgBlockTitlePatterns = array (
		#"/^http/i",  // if you want to block titles of articles that are URLs
	);

$wgHooks['ArticleSave'][] = 'wfCheckBlockTitles';

function wfBlockTitles() {
	global $wgMessageCache;
	 $wgMessageCache->addMessages(
 	array(
			'block_title_error_page_title' => 'Invalid Title',
			'block_title_error' => 'Sorry, the title of this article is not allowed to be saved.',
		)
	);
}

function wfCheckBlockTitles (&$article ) {
	global $wgBlockTitlePatterns;
	global $wgOut;
	$title = $article->getTitle();
	$t = $title->getFullText();
	foreach ($wgBlockTitlePatterns as $re) {
		if (preg_match($re, $t)) {
			// too bad you can't pass parameter to errorpage
			$wgOut->errorpage('block_title_error_page_title', 'block_title_error' );
			return false;
		}	
	}

	return true;
}


?>
