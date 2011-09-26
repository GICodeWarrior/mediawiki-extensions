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

/* renders output data */
class qp_Renderer {

	static function tagError( $msg, &$tag ) {
		ob_start();
		var_dump( $tag );
		$tagdump = ob_get_contents();
		ob_end_clean();
		# uncomment exception throwing for debugging purposes
		# throw new MWException( "<u>invalid argument: " . qp_Setup::specialchars( $msg ) . "</u> <pre>{$tagdump}</pre>" );
		return "<u>invalid argument: " . qp_Setup::specialchars( $msg ) . "</u> <pre>{$tagdump}</pre>";
	}

	/**
	 * Renders nested tag array into string
	 * @param   $tag  multidimensional array of xml/html tags
	 * @return  string  representation of xml/html
	 *
	 * the stucture of $tag is like this:
	 * array( "__tag"=>"td", "class"=>"myclass", 0=>"text before li", 1=>array( "__tag"=>"li", 0=>"text inside li" ), 2=>"text after li" )
	 *
	 * both tagged and tagless lists are supported
	 */
	static function renderTagArray( &$tag ) {
		$tag_open = "";
		$tag_close = "";
		$tag_val = null;
		if ( is_array( $tag ) ) {
			ksort( $tag );
			if ( array_key_exists( '__tag', $tag ) ) {
				# list inside of tag
				$tag_open .= "<" . $tag['__tag'];
				foreach ( $tag as $attr_key => &$attr_val ) {
					if ( is_int( $attr_key ) ) {
						if ( $tag_val === null )
							$tag_val = "";
						if ( is_array( $attr_val ) ) {
							# recursive tags
							$tag_val .= self::renderTagArray( $attr_val );
						} else {
							# text
							$tag_val .= $attr_val;
						}
					} else {
						# string keys are for tag attributes
						if ( is_array( $attr_val ) || is_object( $attr_val ) || is_null( $attr_val ) ) {
							return self::tagError( "tagged list attribute key '{$attr_key}' should have scalar value", $tag );
						}
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
							$tag_val .= self::renderTagArray( $attr_val );
						} else {
							# text
							$tag_val .= $attr_val;
						}
					} else {
						$tag_val = self::tagError( "tagless list cannot have tag attribute values in key=$attr_key", $tag );
					}
				}
			}
		} else {
			# just a text
			$tag_val = $tag;
		}
		return $tag_open . $tag_val . $tag_close;
	}

	/**
	 * add one or more CSS class name to tag class attribute
	 */
	static function addClass( &$tag, $className ) {
		if ( !isset( $tag['class'] ) ) {
			$tag['class'] = $className;
			return;
		}
		if ( array_search( $className, explode( ' ', $tag['class'] ) ) === false ) {
			$tag['class'] .= " $className";
		}
	}

	/**
	 * Creates one tagarray row of the table
	 * @param  $row  a string/number value of cell or
	 *               an array( "count"=>colspannum, "attribute"=>value, 0=>html_inside_tag )
	 * @param  $rowattrs  array key val of new xml attributes to add to every destination cell
	 * @param  $attribute maps  array with mapping of source cell xml attributes to
	 * destination cell xml attributes ("name"=>0, "count"=>colspan" )
	 * @return array of destination cells
	 */
	static function newRow( $row, $rowattrs = "", $celltag = "td", $attribute_maps = null ) {
		$result = "";
		if ( count( $row ) > 0 ) {
			foreach ( $row as &$cell ) {
				if ( !is_array( $cell ) ) {
					$cell = array( 0 => $cell );
				}
				$cell['__tag'] = $celltag;
				$cell['__end'] = "\n";
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

	/**
	 * Add row to the table
	 * todo: document
	 */
	static function addRow( &$table, $row, $rowattrs = "", $celltag = "td", $attribute_maps = null ) {
		$table[] = self::newRow( $row, $rowattrs, $celltag, $attribute_maps );
	}

	/**
	 * Add column to the table
	 * todo: document
	 */
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
		# temporary var $tagsrow used to avoid warning in E_STRICT mode
		$tagsrow = self::newRow( $row, $rowattrs, $celltag, $attribute_maps );
		return self::renderTagArray( $tagsrow );
	}

	/**
	 * use newRow() or addColumn() to add resulting row/column to the table
	 * if you want to use the resulting row with renderTagArray(), don't forget to apply attrs=array('__tag'=>'td')
	 */
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
} /* end of qp_Renderer class */
