<?php
/**
 * SharedCssJs
 *
 * @package MediaWiki
 * @subpackage Extensions
 *
 * @author Tim Weyer (SVG) <svg@tim-weyer.org>
 *
 * @copyright Copyright (C) 2011 by Tim Weyer
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

if(!defined('MEDIAWIKI')) {
    echo("This is an extension to the MediaWiki software and cannot be used standalone");
    die(1);
}

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'SharedCssJs',
	'author' => array( "Tim Weyer" ),
	'version' => '1.0',
	'url' => 'https://www.mediawiki.org/wiki/Extension:SharedCssJs',
	'descriptionmsg' => 'sharedcssjs-desc',
);

// Localisation of this extension
$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['SharedCssJs'] = $dir . 'SharedCssJs.i18n.php';

// Loading page protector
$dir = dirname( __FILE__ ) . '/';
require_once ( "$dir/SharedCssJsProtector.php" );

// Hooks
$wgHooks['SkinTemplateSetupPageCss'][] = 'wfSharedCSS';
$wgHooks['SkinTemplateSetupPageCss'][] = 'wfSharedUserCSS';
$wgHooks['BeforePageDisplay'][] = 'wfSharedJS';
$wgHooks['BeforePageDisplay'][] = 'wfSharedUserJS';

function wfSharedCSS( &$out ) {
	global $wgDisableSharedCSS, $wgSharedCssJsUrl;
	if( !empty( $wgDisableSharedCSS ) ) {
		return true;
	}

	if ($wgSharedCssJsUrl) {
		$url = $wgSharedCssJsUrl;
		$out .= "@import \"{$url}?title=MediaWiki:Global.css&action=raw&ctype=text/css&smaxage=0\";";
	}
	return true;
}

function wfSharedJS( &$out ) {
	global $wgDisableSharedJS, $wgJsMimeType, $wgSharedCssJsUrl;
	if( !empty( $wgDisableSharedJS ) ) {
		return true;
	}

	if ($wgSharedCssJsUrl) {
		$url = $wgSharedCssJsUrl;
		$out->addScript("<script type=\"{$wgJsMimeType}\" src=\"{$url}?title=MediaWiki:Global.js&action=raw&ctype={$wgJsMimeType}\"></script>");
	}
	return true;
}

function wfSharedUserCSS( &$out ) {
	global $wgDisableSharedUserCSS, $wgSharedCssJsUrl, $wgUser;
	if( !empty( $wgDisableSharedUserCSS ) || !isset( $wgSharedCssJsUrl ) ) {
		return true;
	}

	if (!$wgUser->isAnon()) {
		$url = $wgSharedCssJsUrl;
		$userName = str_replace(' ', '_', $wgUser->getName());
		$out .= "@import \"{$url}?title=User:{$userName}/global.css&action=raw&ctype=text/css&smaxage=0\";";
	}
	return true;
}

function wfSharedUserJS( &$out ) {
	global $wgDisableSharedUserJS, $wgJsMimeType, $wgSharedCssJsUrl, $wgUser;
	if( !empty( $wgDisableSharedUserJS ) || !isset( $wgSharedCssJsUrl ) ) {
		return true;
	}

	if (!$wgUser->isAnon()) {
		$url = $wgSharedCssJsUrl;
		$userName = str_replace(' ', '_', $wgUser->getName());
		$out->addScript("<script type=\"{$wgJsMimeType}\" src=\"{$url}?title=User:{$userName}/global.js&action=raw&ctype={$wgJsMimeType}\"></script>");
	}
	return true;
}
