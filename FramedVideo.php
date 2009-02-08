<?php

/****************************************************************************************
*											*
* FramedVideo extention by Robert Pilawski, based on VideoFlash extension		*
* by Alberto Sarullo, based on YouTube extension by Iubito, with a minor		*
* fixes by Austin Wheeler.								*
*											*
* This library is free software; you can redistribute it and/or				*
* modify it under the terms of the GNU General Public					*
* License as published by the Free Software Foundation; either				*
* version 2.1 of the License, or (at your option) any later version.			*
*											*
* This library is distributed in the hope that it will be useful,			*
* but WITHOUT ANY WARRANTY; without even the implied warranty of			*
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU			*
* General Public License for more details.						*
*											*
* You should have received a copy of the GNU General Public				*
* License along with this library; if not, write to the Free Software			*
* Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA	*
*											*
*****************************************************************************************/

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['FramedVideo'] = $dir . 'FramedVideo.i18n.php';
$wgAutoloadClasses['FramedVideo'] = $dir . 'FramedVideo.class.php';
$wgExtensionFunctions[] = 'wfFramedVideo';

$wgExtensionCredits['parserhook'][] = array(
	'name'           => 'FramedVideo',
	'description'    => 'Allows embedding videos from various websites',
	'descriptionmsg' => 'framedvideo-desc',
	'author'         => '[http://filop.pl/wiki/U%C5%BCytkownik:Ruiz Ruiz]',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:FramedVideo',
	'version'        => '1.2.0',
);

function wfFramedVideo() {
	global $wgParser;

	$wgParser->setHook( 'video', 'FramedVideo::renderFramedVideo' );
}
