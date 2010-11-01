<?php
/**
 * ***** BEGIN LICENSE BLOCK *****
 * This file is part of WikiSync.
 *
 * WikiSync is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * WikiSync is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WikiSync; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * ***** END LICENSE BLOCK *****
 *
 * WikiSync allows an AJAX-based synchronization of revisions and files between
 * global wiki site and it's local mirror.
 *
 * To activate this extension :
 * * Create a new directory named WikiSync into the directory "extensions" of MediaWiki.
 * * Place the files from the extension archive there.
 * * Add this line at the end of your LocalSettings.php file :
 * require_once "$IP/extensions/WikiSync/WikiSync.php";
 *
 * @version 0.2.0
 * @link http://www.mediawiki.org/wiki/Extension:WikiSync
 * @author Dmitriy Sintsov <questpc@rambler.ru>
 * @addtogroup Extensions
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is a part of MediaWiki extension.\n" );
} 

/* render output data */
class _QXML {
	// the stucture of $tag is like this:
	// array( "__tag"=>"td", "class"=>"myclass", 0=>"text before li", 1=>array( "__tag"=>"li", 0=>"text inside li" ), 2=>"text after li" )
	// both tagged and tagless lists are supported
	static function toText( &$tag ) {
		$tag_open = "";
		$tag_close = "";
		$tag_val = null;
		if ( is_array( $tag ) ) {
			ksort( $tag );
			if ( array_key_exists( '__tag', $tag ) ) {
				# list inside of tag
				$tag_open .= "<" . $tag[ '__tag' ];
				foreach ( $tag as $attr_key => &$attr_val ) {
					if ( is_int( $attr_key ) ) {
						if ( $tag_val === null )
							$tag_val = "";
						if ( is_array( $attr_val ) ) {
							# recursive tags
							$tag_val .= self::toText( $attr_val );
						} else {
							# text
							$tag_val .= $attr_val;
						}
					} else {
						# string keys are for tag attributes
						if ( substr( $attr_key, 0, 2 ) != "__" ) {
							# include only non-reserved attributes
							$tag_open .= " $attr_key=\"" . $attr_val . "\"";
						}
					}
				}
				if ( $tag_val !== null ) {
					$tag_open .= ">";
					$tag_close .= "</" . $tag[ '__tag' ] . ">";
				} else {
					$tag_open .= " />";
				}
				if ( array_key_exists( '__end', $tag ) ) {
					$tag_close .= $tag[ '__end' ];
				}
			} else {
				# tagless list
				$tag_val = "";
				foreach ( $tag as $attr_key => &$attr_val ) {
					if ( is_int( $attr_key ) ) {
						if ( is_array( $attr_val ) ) {
							# recursive tags
							$tag_val .= self::toText( $attr_val );
						} else {
							# text
							$tag_val .= $attr_val;
						}
					} else {
						ob_start();
						var_dump( $tag );
						$tagdump = ob_get_contents();
						ob_end_clean();
						$tag_val = "invalid argument: tagless list cannot have tag attribute values in key=$attr_key, $tagdump";
					}
				}
			}
		} else {
			# just a text
			$tag_val = $tag;
		}
		return $tag_open . $tag_val . $tag_close;
	}

	# creates one "htmlobject" row of the table
	# elements of $row can be either a string/number value of cell or an array( "count"=>colspannum, "attribute"=>value, 0=>html_inside_tag )
	# attribute maps can be like this: ("name"=>0, "count"=>colspan" )
	static function newRow( $row, $rowattrs = "", $celltag = "td", $attribute_maps = null ) {
		$result = "";
		if ( count( $row ) > 0 ) {
			foreach ( $row as &$cell ) {
				if ( !is_array( $cell ) ) {
					$cell = array( 0 => $cell );
				}
				$cell[ '__tag' ] = $celltag;
				$cell[ '__end' ] = "\n";
				if ( is_array( $attribute_maps ) ) {
					# converts ("count"=>3) to ("colspan"=>3) in table headers - don't use frequently
					foreach ( $attribute_maps as $key => $val ) {
						if ( array_key_exists( $key, $cell ) ) {
							$cell[ $val ] = $cell[ $key ];
							unset( $cell[ $key ] );
						}
					}
				}
			}
			$result = array( '__tag' => 'tr', 0 => $row, '__end' => "\n" );
			if ( is_array( $rowattrs ) ) {
				$result = array_merge( $rowattrs, $result );
			} elseif ( $rowattrs !== "" )  {
				$result[0][] = __METHOD__ . ':invalid rowattrs supplied';
			}
		}
		return $result;
	}

	# add row to the table
	static function addRow( &$table, $row, $rowattrs = "", $celltag = "td", $attribute_maps = null ) {
		$table[] = self::newRow( $row, $rowattrs, $celltag, $attribute_maps );
	}

	# add column to the table
	static function addColumn( &$table, $column, $rowattrs = "", $celltag = "td", $attribute_maps = null ) {
		if ( count( $column ) > 0 ) {
			$row = 0;
			foreach ( $column as &$cell ) {
				if ( !is_array( $cell ) ) {
					$cell = array( 0 => $cell );
				}
				$cell[ '__tag' ] = $celltag;
				$cell[ '__end' ] = "\n";
				if ( is_array( $attribute_maps ) ) {
					# converts ("count"=>3) to ("rowspan"=>3) in table headers - don't use frequently
					foreach ( $attribute_maps as $key => $val ) {
						if ( array_key_exists( $key, $cell ) ) {
							$cell[ $val ] = $cell[ $key ];
							unset( $cell[ $key ] );
						}
					}
				}
				if ( is_array( $rowattrs ) ) {
					$cell = array_merge( $rowattrs, $cell );
				} elseif ( $rowattrs !== "" ) {
					$cell[ 0 ] = __METHOD__ . ':invalid rowattrs supplied';
				}
				if ( !array_key_exists( $row, $table ) ) {
					$table[ $row ] = array( '__tag' => 'tr', '__end' => "\n" );
				}
				$table[ $row ][] = $cell;
				if ( array_key_exists( 'rowspan', $cell ) ) {
					$row += intval( $cell[ 'rowspan' ] );
				} else {
					$row++;
				}
			}
			$result = array( '__tag' => 'tr', 0 => $column, '__end' => "\n" );
		}
	}

	static function displayRow( $row, $rowattrs = "", $celltag = "td", $attribute_maps = null ) {
		return self::toText( self::newRow( $row, $rowattrs, $celltag, $attribute_maps ) );
	}

	// use newRow() or addColumn() to add resulting row/column to the table
	// if you want to use the resulting row with toText(), don't forget to apply attrs=array('__tag'=>'td')
	static function applyAttrsToRow( &$row, $attrs ) {
		if ( is_array( $attrs ) && count( $attrs > 0 ) ) {
			foreach ( $row as &$cell ) {
				if ( !is_array( $cell ) ) {
					$cell = array_merge( $attrs, array( $cell ) );
				} else {
					foreach ( $attrs as $attr_key => $attr_val ) {
						if ( !array_key_exists( $attr_key, $cell ) ) {
							$cell[ $attr_key ] = $attr_val;
						}
					}
				}
			}
		}
	}

	static function entities( $s ) {
		return htmlentities( $s, ENT_COMPAT, 'UTF-8' );
	}

	static function specialchars( $s ) {
		return htmlspecialchars( $s, ENT_COMPAT, 'UTF-8' );
	}

} /* end of _QXML class */
