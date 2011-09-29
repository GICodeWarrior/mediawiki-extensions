<?php
/**
 * ***** BEGIN LICENSE BLOCK *****
 * This file is part of QPoll.
 * Uses parts of code from Quiz extension (c) 2007 Louis-Rémi BABE. All rights reserved.
 *
 * QPoll is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * QPoll is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with QPoll; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * ***** END LICENSE BLOCK *****
 *
 * QPoll is a poll tool for MediaWiki.
 *
 * To activate this extension :
 * * Create a new directory named QPoll into the directory "extensions" of MediaWiki.
 * * Place the files from the extension archive there.
 * * Add this line at the end of your LocalSettings.php file :
 * require_once "$IP/extensions/QPoll/qp_user.php";
 *
 * @version 0.8.0a
 * @link http://www.mediawiki.org/wiki/Extension:QPoll
 * @author QuestPC <questpc@rambler.ru>
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * PEAR Excel helper
 *
 * todo: PollResults::voicesToXLS() and PollResults::statsToXLS() should be refactored into
 * this class;
 *
 */
class qp_Excel {

	static function prepareExcelString( $s ) {
		if ( preg_match( '`^=.?`', $s ) ) {
			return "'" . $s;
		}
		return $s;
	}

	static function writeFormattedTable( $worksheet, $rownum, $colnum, &$table, $format = null ) {
		foreach ( $table as $rnum => &$row ) {
			foreach ( $row as $cnum => &$cell ) {
				if ( is_array( $cell ) ) {
					if ( array_key_exists( "format", $cell ) ) {
						$worksheet->write( $rownum + $rnum, $colnum + $cnum, $cell[ 0 ], $cell[ "format" ] );
					} else {
						$worksheet->write( $rownum + $rnum, $colnum + $cnum, $cell[ 0 ], $format );
					}
				} else {
					$worksheet->write( $rownum + $rnum, $colnum + $cnum, $cell, $format );
				}
			}
		}
	}

} /* end of qp_Excel class */
