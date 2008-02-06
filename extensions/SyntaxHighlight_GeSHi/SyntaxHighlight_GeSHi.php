<?php
/**
 * Syntax highlighting extension for MediaWiki 1.5 using GeSHi
 * Copyright (C) 2005 Brion Vibber <brion@pobox.com>
 * http://www.mediawiki.org/
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 * http://www.gnu.org/copyleft/gpl.html
 */

/**
 * @addtogroup Extensions
 * @author Brion Vibber
 *
 * This extension wraps the GeSHi highlighter: http://qbnz.com/highlighter/
 *
 * Unlike the older GeSHi MediaWiki extension floating around, this makes
 * use of the new extension parameter support in MediaWiki 1.5 so it only
 * has to register one tag, <source>.
 *
 * A language is specified like: <source lang="c">void main() {}</source>
 * If you forget, or give an unsupported value, the extension spits out
 * some help text and a list of all supported languages.
 *
 * The extension has been tested with GeSHi 1.0.7 and MediaWiki 1.5 CVS
 * as of 2005-06-22.
 */

if( !defined( 'MEDIAWIKI' ) )
	die();

$wgExtensionCredits['parserhook']['SyntaxHighlight_GeSHi'] = array(
	'name'           => 'SyntaxHighlight',
	'version'        => '2008-02-06',
	'author'         => array( 'Brion Vibber', 'Tim Starling', 'Rob Church' ),
	'description'    => 'Provides syntax highlighting using [http://qbnz.com/highlighter/ GeSHi Highlighter]',
	'descriptionmsg' => 'syntaxhighlight-desc',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:SyntaxHighlight_GeSHi',
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['SyntaxHighlight_GeSHi'] = $dir . 'SyntaxHighlight_GeSHi.i18n.php';
$wgAutoloadClasses['SyntaxHighlight_GeSHi'] = $dir . 'SyntaxHighlight_GeSHi.class.php';
$wgHooks['ShowRawCssJs'][] = 'SyntaxHighlight_GeSHi::viewHook';
$wgExtensionFunctions[] = 'efSyntaxHighlight_GeSHiSetup';

/**
 * Register parser hook
 */
function efSyntaxHighlight_GeSHiSetup() {
	global $wgParser;
	$wgParser->setHook( 'source', array( 'SyntaxHighlight_GeSHi', 'parserHook' ) );
}
