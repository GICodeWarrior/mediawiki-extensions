<?php

/**
 * Copyright (C) 2005 Anders Wegge Jakobsen <awegge@gmail.com>
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
 *
 * Extension to add footnotes to the wiki pages. 
 *
 * Use with:
 *
 * <footnote>This text is placed at the end of the page.</footnote>
 *
 * @file
 * @author Anders Wegge Jakobsen <awegge@gmail.com>
 * @ingroup Extensions
 */

if( !defined( 'MEDIAWIKI' ) ) {
	die();
}

$wgExtensionCredits['parserhook'][] = array(
	'path'           => __FILE__,
	'name'           => 'Footnote',
	'author'         => '',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:Footnote',
);

$wgHooks['ParserBeforeTidy'][] = 'insert_endnotes';
$wgHooks['ParserFirstCallInit'][] = "wfFootnoteSetHook";

function wfFootnoteSetHook( $parser ) {
	$parser->setHook( 'footnote', 'parse_footnote' );
	return true;
}

$footnoteNotes = array() ;
$footnoteCount = 1 ;
$footnoteRecursionGuard = false;

function insert_endnotes( &$parser, &$text ) {
	global $footnoteNotes , $footnoteCount, $footnoteRecursionGuard ;
	
	wfDebug("insert_endnotes:\n<<<$text>>>\n");

	if( $footnoteRecursionGuard ) return true;
	if( count( $footnoteNotes ) == 0 ) return true;
	
	$ret = "" ;
	foreach( $footnoteNotes AS $num => $entry ) {
		$x = " <a name='footnote{$num}'></a>\n";
		$x = $x . "<li>$entry <a href='#footnoteback{$num}'>↑</a></li>\n" ;
		$ret .= $x ;
	}
	$ret = "<hr /><ol>" . $ret . "</ol>" ;
	
	$text .= $ret ;

	/* Clear global array after rendering */
	$footnoteNotes = array();
	$footnoteCount = 1 ;
	
	return true;
}

function parse_footnote( $text, $params, &$parser ) {
	$ret = "" ;

	global $footnoteNotes , $footnoteCount, $footnoteRecursionGuard ;
	global $footnoteParserObj;

	if( !isset( $footnoteParserObj )) {
		$footnoteParserObj = new Parser ;
	}

	$footnoteRecursionGuard = true;
	$ret = $footnoteParserObj->parse( $text , $parser->getTitle() , $parser->getOptions(), false ) ;
	$ret = $ret->getText();
	$footnoteRecursionGuard = false;

	$footnoteNotes[$footnoteCount] = $ret;

	$ret = "<a href='#footnote{$footnoteCount}' name='footnoteback{$footnoteCount}'><sup>$footnoteCount</sup></a>" ;
	
	$footnoteCount++ ;
	if( $footnoteCount == 2 ) {
		global $wgHooks;
		$wgHooks['ParserBeforeTidy'][] = 'insert_endnotes' ;
	}

	return $ret ;
}

