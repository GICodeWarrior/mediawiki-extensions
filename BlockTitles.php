<?php
if ( ! defined( 'MEDIAWIKI' ) )
	die();

/**#@+
 * Provides a basic way of preventing articles with certain titles from being
 * saved or created
 *
 * @file
 * @ingroup Extensions
 *
 * @link http://www.mediawiki.org/wiki/Extension:BlockTitles Documentation
 *
 *
 * @author Travis Derouin <travis@wikihow.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'BlockTitles',
	'author' => 'Travis Derouin',
	'descriptionmsg' => 'blocktitles-desc',
	'url' => 'https://www.mediawiki.org/wiki/Extension:BlockTitles',
);

$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['BlockTitles'] = $dir . 'BlockTitles.i18n.php';
// CONFIGURE - place any regular expressions you want here.
$wgBlockTitlePatterns = array (
		# "/^http/i",  // if you want to block titles of articles that are URLs
	);

$wgHooks['ArticleSave'][] = 'wfCheckBlockTitles';

function wfCheckBlockTitles ( &$article ) {
	global $wgBlockTitlePatterns;
	global $wgOut;
	$title = $article->getTitle();
	$t = $title->getFullText();
	foreach ( $wgBlockTitlePatterns as $re ) {
		if ( preg_match( $re, $t ) ) {
			// too bad you can't pass parameter to errorpage
			throw new ErrorPageError( 'block_title_error_page_title', 'block_title_error' );
		}
	}

	return true;
}
