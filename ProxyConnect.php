<?php
if ( ! defined( 'MEDIAWIKI' ) )
	die();
    
/**#@+
 * Implements the server side functionality of Proxy Connect
 * 
 * @package MediaWiki
 * @subpackage Extensions
 *
 * @link http://www.mediawiki.org/wiki/Extension:ProxyConnect Documentation
 *
 *
 * @author Travis Derouin <travis@wikihow.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionCredits['special'][] = array(
	'name' => 'ProxyConnect',
	'author' => 'Travis Derouin',
	'description' => 'Implements the server side functionality of Proxy Connect',
	'url' => 'http://www.mediawiki.org/wiki/Extension:ProxyConnect',
);


$wgSpecialPages['ProxyConnect'] = 'ProxyConnect';
$wgAutoloadClasses['ProxyConnect'] = dirname( __FILE__ ) . '/ProxyConnect.body.php';
