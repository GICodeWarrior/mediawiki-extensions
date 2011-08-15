<?php
/**
 * Built-in scripting language for MediaWiki.
 * Copyright (C) 2009-2011 Victor Vasiliev <vasilvv@gmail.com>
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
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 */

if( !defined( 'MEDIAWIKI' ) )
	die();

$wgExtensionCredits['parserhook']['InlineScripts'] = array(
	'path'           => __FILE__,
	'name'           => 'InlineScripts',
	'author'         => 'Victor Vasiliev',
	'descriptionmsg' => 'inlinescripts-desc',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:InlineScripts',
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['InlineScripts'] = $dir . 'i18n/Messages.php';
$wgExtensionMessagesFiles['InlineScriptsMagic'] = $dir . 'i18n/Magic.php';
$wgExtensionMessagesFiles['InlineScriptsNamespaces'] = $dir . 'i18n/Namespaces.php';

$wgAutoloadClasses['ISHooks'] = $dir . '/Hooks.php';
$wgAutoloadClasses['ISLinksUpdateHooks'] = $dir . '/LinksUpdate.php';

$wgAutoloadClasses['ISInterpreter'] = $dir . 'interpreter/Interpreter.php';
$wgAutoloadClasses['ISScanner'] = $dir . 'interpreter/Scanner.php';
$wgAutoloadClasses['ISLRParser'] = $dir . 'interpreter/LRParser.php';

$wgParserTestFiles[] = $dir . 'interpreterTests.txt';
$wgHooks['ParserFirstCallInit'][] = 'ISHooks::setupParserHook';
$wgHooks['ParserLimitReport'][] = 'ISHooks::reportLimits';
$wgHooks['ParserClearState'][] = 'ISHooks::clearState';
$wgHooks['ParserTestTables'][] = 'ISHooks::addTestTables';

$wgHooks['CanonicalNamespaces'][] = 'ISHooks::addCanonicalNamespaces';
$wgHooks['ArticleViewCustom'][] = 'ISHooks::handleScriptView';
$wgHooks['TitleIsWikitextPage'][] = 'ISHooks::isWikitextPage';
$wgHooks['EditFilter'][] = 'ISHooks::validateScript';

$wgHooks['LinksUpdate'][] = 'ISLinksUpdateHooks::updateLinks';
$wgHooks['ArticleEditUpdates'][] = 'ISLinksUpdateHooks::purgeCache';
$wgHooks['ParserAfterTidy'][] = 'ISLinksUpdateHooks::appendToOutput';
$wgHooks['BacklinkCacheGetPrefix'][] = 'ISLinksUpdateHooks::getBacklinkCachePrefix';
$wgHooks['BacklinkCacheGetConditions'][] = 'ISLinksUpdateHooks::getBacklinkCacheConditions';

/** Configuration */

/**
 * Script namespace numbers. Should be redefined before
 * the inlcusion of the extension.
 */
if( !isset( $wgScriptsNamespaceNumbers ) ) {
	$wgScriptsNamespaceNumbers = array(
		'Module' => 20,
		'Module_talk' => 21,
	);
}

/**
 * Different limits of the scripts.
 */
$wgInlineScriptsLimits = array(
	/**
	 * Maximal amount of tokens (strings, keywords, numbers, operators,
	 * but not whitespace) in a single module to be parsed.
	 */
	'tokens' => 1000000,

	/**
	 * Maximal amount of operations (multiplications, comarsions, function
	 * calls) to be done.
	 */
	'evaluations' => 300000,

	/**
	 * Maximal depth of recursion when evaluating the parser tree in a single function. For
	 * example 2 + 2 * 2 ** 2 is parsed to (2 + (2 * (2 ** 2))) and needs
	 * depth 3 to be parsed.
	 */
	'depth' => 100,
);

/**
 * Turn on to true if you have linked or copied wikiscripts.php and
 * SyntaxHighlight_GeSHi extension is enabled.
 */
$wgInlineScriptsUseGeSHi = false;

/**
 * Class of the actual parser. Must implement ISParser interface, as well as
 * static getVersion() method.
 */
$wgInlineScriptsParserClass = 'ISLRParser';

/**
 * Should be enabled unless you are debugging or just have sado-masochistic
 * attitude towards your server.
 */
$wgInlineScriptsUseCache = true;

/**
 * Indicates whether the function recursion is enabled. If it is, then users may
 * build a Turing-complete machinge and do nice things like parsers, etc in wikitext!
 */
$wgInlineScriptsAllowRecursion = false;

/**
 * Maximun call stack depth. Includes functions and invokations of parse() function.
 */
$wgInlineScriptsMaxCallStackDepth = 25;

define( 'NS_MODULE', $wgScriptsNamespaceNumbers['Module'] );
define( 'NS_MODULE_TALK', $wgScriptsNamespaceNumbers['Module_talk'] );
