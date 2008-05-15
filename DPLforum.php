<?php
/*

 DPLforum v3.2 -- DynamicPageList-based forum extension

 Author: Ross McClure
 http://www.mediawiki.org/wiki/User:Algorithm

 DynamicPageList written by: n:en:User:IlyaHaykinson n:en:User:Amgine
 http://en.wikinews.org/wiki/User:Amgine
 http://en.wikinews.org/wiki/User:IlyaHaykinson

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License along
 with this program; if not, write to the Free Software Foundation, Inc.,
 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 http://www.gnu.org/copyleft/gpl.html

 To install, add following to LocalSettings.php
   require_once("extensions/DPLforum/DPLforum.php");

*/

if(!defined('MEDIAWIKI')) {
	echo("This file is an extension to the MediaWiki software and is not a valid access point");
	die(1);
}

$wgExtensionFunctions[] = 'wfDPLforum';
$wgHooks['LanguageGetMagic'][] = 'wfDPLmagic';
$wgExtensionCredits['parserhook'][] = array(
	'name'           => 'DPLforum',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:DPLforum',
	'description'    => 'DPL-based forum extension',
	'descriptionmsg' => 'dplforum-desc',
	'author'         => 'Ross McClure',
	'version'        => '3.2'
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['DPLforum'] = $dir . 'DPLforum.i18n.php';
$wgAutoloadClasses['DPLForum'] = $dir . 'DPLforum_body.php';

function wfDPLforum() {
	global $wgParser;

	wfLoadExtensionMessages('DPLforum');
	$wgParser->setHook('forum', 'parseForum');
	$wgParser->setFunctionHook('forumlink', array(new DPLForum(),'link'));
}

function wfDPLmagic(&$magicWords, $langCode="en") {
	switch($langCode) {
		default: $magicWords['forumlink'] = array (0,'forumlink');
	}
	return true;
}

function parseForum($input, $argv, &$parser) {
	$f = new DPLForum();
	return $f->parse($input, $parser);
}
