<?php
/**
* Aliases file for ReassignEdits extension
*
* @package MediaWiki
* @subpackage Extensions
*
* @author: Tim 'SVG' Weyer <SVG@Wikiunity.com>
*
* @copyright Copyright (C) 2011 Tim Weyer, Wikiunity
* @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
*
*/

$specialPageAliases = array();

/** English
 * @author SVG
 */
$specialPageAliases['en'] = array(
	'ReassignEdits' => array( 'ReassignEdits', 'ReassignUserEdits' ),
);

/** German (Deutsch)
 * @author SVG
 */
$specialPageAliases['de'] = array(
	'ReassignEdits' => array( 'Bearbeitungen_übertragen', 'Benutzerbearbeitungen_übertragen' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;
