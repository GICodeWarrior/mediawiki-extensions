<?php
if ( ! defined( 'MEDIAWIKI' ) )
    die();

/**#@+
 * An extension that adds a <stockchart ticker="TIKR"/> tag extension and
 * {{#stockchart: ticker="TIKR"}} parser function for adding
 * interactive financial charts within an article.
 * 
 *
 * @addtogroup Extensions
 *
 *
 * @author Brendan Meutzner
 * @author Anton Zolotkov
 * @author Roger Fong
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionFunctions[] = 'efStockCharts';
$wgHooks['LanguageGetMagic'][] = 'efStockChartsMagic';

$wgExtensionCredits['parserhook'][] = array(
    'name' => 'StockCharts',
    'author' => 'Brendan Meutzner, Anton Zolotkov, Roger Fong',
    'description' => 'Adds <nowiki><stockchart ticker="AAPL"/></nowiki> tag for an interactive financial stock chart.',
    'url' => 'http://meta.wikimedia.org/wiki/Extension:StockChart',
);

# Internationalisation file
require_once( 'StockCharts.i18n.php' );

$wgAutoloadClasses['StockCharts'] = dirname( __FILE__ ) . '/StockCharts_body.php';



function efStockCharts() {
	# Add messages
	global $wgMessageCache, $wgStockChartsMessages;
	foreach( $wgStockChartsMessages as $language => $messages ) {
		$wgMessageCache->addMessages( $messages, $language );
	}

	global $wgParser;
	$wgParser->setHook('stockchart', array('StockCharts', 'renderTagExtension')); // hook for <stockchart ../>
	$wgParser->setFunctionHook('stockchart', array('StockCharts', 'renderParserFunction')); // hook for {{#stockchart ..}}
}

function efStockChartsMagic( &$magicWords, $langCode ) {
	$magicWords['stockchart'] = array( 0, 'stockchart' );
	return true;
}


?>
