<?php
/**
 * This extension defines navigation in subpages.
 *
 * Defines the following functions:
 * - PREVPAGENAME		(get prev page)
 * - PREVPAGENAMEE		(get prev page encode)
 * - NEXTPAGENAME		(get next page)
 * - NEXTPAGENAMEE		(get next page encode)
 * - ROOTPAGENAME		(get root page)
 * - ROOTPAGENAMEE		(get root page encode)
 * - CHAPTERNAME		(get root page)
 * - CHAPTERNAMEE		(get root page encode)
 * @addtogroup Extensions
 * @author Raylton P. Sousa <raylton.sousa@gmail.com>
 * @license GNU General Public License 3.0 or later
**
**
 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 3 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License along
 with this program; if not, write to the Free Software Foundation, Inc.,
 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 http://www.gnu.org/copyleft/gpl.html
*/

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}
$dir = dirname( __FILE__ ); 

$wgAutoloadClasses['BookManagerFunctions'] = $dir . '/BookManager.body.php';

/**** extension basics ****/
$wgExtensionCredits['parserhook'][] = array(
	'path'		=> __FILE__,
	'name'		=> 'BookManager',
	'version'	=>  BookManagerFunctions::VERSION,
	'author'	=>  array('Raylton P. Sousa', 'Helder.wiki'),
	'url'		=> 'http://www.mediawiki.org/wiki/Extension:BookManager',
	'description'	=> 'Tools for books',
);
/* Add CSS and JS */
$wgResourceModules['ext.BookManager'] = array(
	'scripts'	=> 'bookmanager.js',
	'styles'	=> 'bookmanager.css',
	'messages'	=> array( 'BookManager', 'BookManager-top', 'BookManager-bottom' ),
	'dependencies'	=> array( 'jquery', 'mediawiki.util'),
	'localBasePath'	=> $dir,
	'remoteExtPath'	=> 'BookManager'
);
$wgBookManagerNamespaces = array( NS_MAIN ); 		
/* Copyied from extensions/Collection/Collection.php */
/** Namespace for "community books" */
$wgCommunityCollectionNamespace = NS_PROJECT;

/**** Register magic words ****/
$wgExtensionFunctions[] = 'BookManagerFunctions::register';

define( 'MAG_PREVPAGENAME',	'magicbookmanagercustomvar0' );
define( 'MAG_PREVPAGENAMEE',	'magicbookmanagercustomvar1' );
define( 'MAG_NEXTPAGENAME',	'magicbookmanagercustomvar2' );
define( 'MAG_NEXTPAGENAMEE',	'magicbookmanagercustomvar3' );
define( 'MAG_ROOTPAGENAME',	'magicbookmanagercustomvar4' );
define( 'MAG_ROOTPAGENAMEE',	'magicbookmanagercustomvar5' );
define( 'MAG_CHAPTERNAME',	'magicbookmanagercustomvar6' );
define( 'MAG_CHAPTERNAMEE',	'magicbookmanagercustomvar7' );

$wgHooks['LanguageGetMagic'][] = 'BookManagerFunctions::LanguageGetMagic';

$wgHooks['MagicWordwgVariableIDs'][] = 'BookManagerFunctions::DeclareVarIds';

$wgHooks['ParserGetVariableValueSwitch'][] = 'BookManagerFunctions::AssignAValue';

$wgHooks['OutputPageBeforeHTML'][] = 'BookManagerFunctions::addText';

$wgHooks['BeforePageDisplay'][] = 'BookManagerFunctions::injectStyleAndJS';

$wgExtensionMessagesFiles['BookManager'] = $dir . '/BookManager.i18n.php';
