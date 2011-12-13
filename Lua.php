<?php
/**
 * Lua parser extensions for MediaWiki
 *
 * @author Fran Rogers
 * @ingroup Extensions
 * @license See 'COPYING'
 * @file
 */

$wgExtensionCredits['parserhook'][] = array(
	'path'           => __FILE__,
	'name'           => 'Lua parser extensions',
	'author'         => 'Fran Rogers',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:Lua',
	'descriptionmsg' => 'lua_desc',
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['Lua'] = $dir . 'Lua.i18n.php';
$wgAutoloadClasses['LuaHooks'] = $dir . 'Lua.hooks.php';
$wgAutoloadClasses['LuaError'] = $dir . 'Lua.wrapper.php';
$wgAutoloadClasses['LuaWrapper'] = $dir . 'Lua.wrapper.php';

$wgLuaExternalInterpreter = FALSE;
$wgLuaExternalCompiler = FALSE;
$wgLuaExtension = 'lua';
$wgLuaMaxLines = 1000000;
$wgLuaMaxCalls = 2000;
$wgLuaMaxTime = 5;


$wgHooks['ParserFirstCallInit'][] = 'LuaHooks::parserInit';
$wgHooks['LanguageGetMagic'][] = 'LuaHooks::magic';
$wgHooks['ParserBeforeTidy'][] = 'LuaHooks::beforeTidy';
