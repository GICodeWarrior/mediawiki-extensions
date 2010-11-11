<?php
/**
 * Implements the server side functionality of Proxy Connect
 *
 * @file
 * @ingroup Extensions
 * @version 1.0
 * @author Travis Derouin <travis@wikihow.com>
 * @link http://www.mediawiki.org/wiki/Extension:ProxyConnect Documentation
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die();
}

// Extension credits that will show up on Special:Version
$wgExtensionCredits['special'][] = array(
	'name' => 'ProxyConnect',
	'version' => '1.0',
	'author' => 'Travis Derouin',
	'description' => 'Implements the server side functionality of Proxy Connect',
	'url' => 'http://www.mediawiki.org/wiki/Extension:ProxyConnect',
);

// Set up the new special page
$wgSpecialPages['ProxyConnect'] = 'ProxyConnect';
$wgAutoloadClasses['ProxyConnect'] = dirname( __FILE__ ) . '/ProxyConnect.body.php';
