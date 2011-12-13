<?php

# Copyright (C) 2004 Ryan Lane <rlane32@gmail.com>
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License along
# with this program; if not, write to the Free Software Foundation, Inc.,
# 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
# http://www.gnu.org/copyleft/gpl.html

# Memorizable Extension
#
# Memorize.php
#
# Extension info available at http://www.mediawiki.org/wiki/Extension:Memorize
# memorizable.js available at http://memorizable.org/Code
#
# Version 1.0a / 2007-02-03
#

if( !defined( 'MEDIAWIKI' ) )
	die( -1 );

$wgHooks['ParserFirstCallInit'][] = 'wfMemorizeSetHook';
$wgHooks['BeforePageDisplay'][] = 'addMemorizeJavascriptAndCSS';


function wfMemorizeSetHook( $parser ) {
	$parser->setHook( 'memorize', 'renderMemorize' );
	return true;
}

function renderMemorize( $input, $argv, &$parser ) {
	return '<a href="#" onclick="return Mem.start( this )">(memorize)</a>';
}

function addMemorizeJavascriptAndCSS( &$m_pageObj ) {
	global $wgScriptPath;
	$m_pageObj->addScript( '<script src="'. $wgScriptPath.'/extensions/Memorize/memorizable.js" type="text/javascript"></script>' );

	return true;
}

/**
 * Add extension information to Special:Version
 */
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Memorizable parser extension',
	'version' => '1.0b',
	'author' => 'Ryan Lane',
	'description' => 'Allows users to create tables that are memorizable like those on Memorizable.org',
	'url' => 'https://www.mediawiki.org/wiki/Extension:Memorize'
	);


