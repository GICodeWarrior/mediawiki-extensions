<?php
if( !defined( 'MEDIAWIKI' ) ) {
	die( '...' );
}
/**
 * @file
 * @ingroup Extensions
 * @version 1.0
 * @author Piotr Molski <moli@wikia-inc.com>
 * @author Bartek Łapiński <bartek@wikia-inc.com>
 * @copyright Copyright © 2007 Piotr Molski, Wikia Inc.
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgAutoloadClasses['CAP_TagCloud'] = dirname( __FILE__ ) . '/CAP_TagCloud.php';

define( 'SECTION_PARSE', '/\n==[^=]/s' );
define( 'SPECIAL_TAG_FORMAT', '<!---%s--->' );
define( 'ADDITIONAL_TAG_PARSE', '/\<!---(.*?)\s*=\s*(&quot;|\'|")*(.*?)(&quot;|\'|")*---\>/is' );
define( 'SIMPLE_TAG_PARSE', '/\<!---(.*?)---\>/is' );
define( 'CATEGORY_TAG_PARSE', '/\[\[Category:(.*?)\]\]/' );
define( 'CATEGORY_TAG_SPECIFIC', '/\<!---categories---\>/is' );
define( 'IMAGEUPLOAD_TAG_SPECIFIC', '/\<!---imageupload---\>/is' );
define( 'INFOBOX_SEPARATOR', '/\<!---separator---\>/is' );
define( 'ISBLANK_TAG_SPECIFIC', '<!---blanktemplate--->' );
//define( 'TEMPLATE_INFOBOX_FORMAT', '/\{\{[^\{\}]*Infobox.*\}\}/is' ); // replaced by [[MediaWiki:Createpage-template-infobox-format]]
define( 'TEMPLATE_OPENING', '/\{\{[^\{\}]*Infobox[^\|]*/i' );
define( 'TEMPLATE_CLOSING', '/\}\}/' );

global $wgMultiEditPageTags, $wgMultiEditPageSimpleTags;
$wgMultiEditPageTags = array( 'title', 'descr', 'category' );
$wgMultiEditPageSimpleTags = array( 'lbl', 'categories', 'pagetitle', 'imageupload', 'optional' );

class CreateMultiPage {
	function __construct() {
	}

	public static function unescapeBlankMarker( $text ) {
		$text = str_replace( "\n<!---blanktemplate--->\n", '', $text );
		$text = str_replace( '<!---imageupload--->', '', $text );
		return $text;
	}

	public static function getToolArray() {
		global $wgContLang;
		$toolarray = array(
			array(
				'image' => 'button_bold.png',
				'id'	=> 'mw-editbutton-bold',
				'open'  => '\\\'\\\'\\\'',
				'close' => '\\\'\\\'\\\'',
				'sample'=> wfMsg( 'bold_sample' ),
				'tip'   => wfMsg( 'bold_tip' ),
				'key'   => 'B'
			),
			array(
				'image' => 'button_italic.png',
				'id'	=> 'mw-editbutton-italic',
				'open'  => '\\\'\\\'',
				'close' => '\\\'\\\'',
				'sample'=> wfMsg( 'italic_sample' ),
				'tip'   => wfMsg( 'italic_tip' ),
				'key'   => 'I'
			),
			array(
				'image' => 'button_link.png',
				'id'	=> 'mw-editbutton-link',
				'open'  => '[[',
				'close' => ']]',
				'sample'=> wfMsg( 'link_sample' ),
				'tip'   => wfMsg( 'link_tip' ),
				'key'   => 'L'
			),
			array(
				'image' => 'button_extlink.png',
				'id'	=> 'mw-editbutton-extlink',
				'open'  => '[',
				'close' => ']',
				'sample'=> wfMsg( 'extlink_sample' ),
				'tip'   => wfMsg( 'extlink_tip' ),
				'key'   => 'X'
			),
			array(
				'image' => 'button_headline.png',
				'id'	=> 'mw-editbutton-headline',
				'open'  => "\\n=== ",
				'close' => " ===\\n",
				'sample'=> wfMsg( 'headline_sample' ),
				'tip'   => wfMsg( 'headline_tip_3' ),
				'key'   => 'H'
			),
			array(
				'image' => 'button_image.png',
				'id'	=> 'mw-editbutton-image',
				'open'  => '[[' . $wgContLang->getNsText( NS_FILE ) . ':',
				'close' => ']]',
				'sample'=> wfMsg( 'image_sample' ),
				'tip'   => wfMsg( 'image_tip' ),
				'key'   => 'D'
			),
			array(
				'image' => 'button_media.png',
				'id'	=> 'mw-editbutton-media',
				'open'  => '[[' . $wgContLang->getNsText( NS_MEDIA ) . ':',
				'close' => ']]',
				'sample'=> wfMsg( 'media_sample' ),
				'tip'   => wfMsg( 'media_tip' ),
				'key'   => 'M'
			),
			array(
				'image' => 'button_math.png',
				'id'	=> 'mw-editbutton-math',
				'open'  => "<math>",
				'close' => "<\\/math>",
				'sample'=> wfMsg( 'math_sample' ),
				'tip'   => wfMsg( 'math_tip' ),
				'key'   => 'C'
			),
			array(
				'image' => 'button_nowiki.png',
				'id'	=> 'mw-editbutton-nowiki',
				'open'  => "<nowiki>",
				'close' => "<\\/nowiki>",
				'sample'=> wfMsg( 'nowiki_sample' ),
				'tip'   => wfMsg( 'nowiki_tip' ),
				'key'   => 'N'
			),
			array(
				'image' => 'button_sig.png',
				'id'	=> 'mw-editbutton-signature',
				'open'  => '--~~~~',
				'close' => '',
				'sample'=> '',
				'tip'   => wfMsg( 'sig_tip' ),
				'key'   => 'Y'
			),
			array(
				'image' => 'button_hr.png',
				'id'	=> 'mw-editbutton-hr',
				'open'  => "\\n----\\n",
				'close' => '',
				'sample'=> '',
				'tip'   => wfMsg( 'hr_tip' ),
				'key'   => 'R'
			)
		);

		wfRunHooks( 'ToolbarGenerate', array( &$toolarray ) );
		return $toolarray;
	}

	// modified a bit standard editToolbar function from EditPage class
	public static function getMultiEditToolbar( $toolbar_id ) {
		global $wgContLang, $wgJsMimeType;

		$toolarray = CreateMultiPage::getToolArray();
		// multiple toolbars...
		$toolbar = "<div id='toolbar" . $toolbar_id . "' style='display: none'>\n";
		$toolbar .= "<script type='$wgJsMimeType'>\n/*<![CDATA[*/\n";
		$toolbar .= "YAHOO.Createpage.multiEditTextboxes[YAHOO.Createpage.multiEditTextboxes.length] = $toolbar_id;\n";
		$toolbar .= "YAHOO.Createpage.multiEditButtons[$toolbar_id] = [];\n";
		$toolbar .= "YAHOO.Createpage.multiEditCustomButtons[$toolbar_id] = [];\n";
		$toolbar .= "YAHOO.util.Event.addListener('wpTextboxes' + $toolbar_id, 'focus', YAHOO.Createpage.showThisBox, {'toolbarId' : $toolbar_id }); \n";
		$toolbar .= "/*]]>*/\n</script>";

		$toolbar .= "\n</div>";
		return $toolbar;
	}

	public static function multiEditParse( $rows, $cols, $ew, $sourceText, $optional_sections = null ) {
		global $wgTitle, $wgScriptPath, $wgContLang;
		global $wgMultiEditTag;
		global $wgMultiEditPageSimpleTags, $wgMultiEditPageTags;

		$me_content = '';
		$found_categories = array();

		$is_used_metag = false;
		$is_used_category_cloud = false;
		$wgMultiEditTag = ( empty( $wgMultiEditTag ) ) ? 'useMultiEdit' : $wgMultiEditTag;
		$multiedit_tag = '<!---' . $wgMultiEditTag . '--->';

		# is tag set?
		if ( empty( $wgMultiEditTag ) || ( strpos( $sourceText, $multiedit_tag ) === false ) ) {
			if ( strpos( $sourceText, ISBLANK_TAG_SPECIFIC ) !== true ) {
				$sourceText = str_replace( ISBLANK_TAG_SPECIFIC . "\n", '', $sourceText );
				$sourceText = str_replace( ISBLANK_TAG_SPECIFIC, '', $sourceText );

				// fire off a special one textarea template
				$tmpl = new EasyTemplate( dirname( __FILE__ ) . '/templates/' );
				$toolbar_text = CreateMultiPage::getMultiEditToolbar( 0 );
				$tmpl->set_vars(array(
					'box' => $sourceText,
					'toolbar' => $toolbar_text,
				));
				$me_content .= $tmpl->render( 'bigarea' );

				$cloud = new CAP_TagCloud();
				$tmpl = new EasyTemplate( dirname( __FILE__ ) . '/templates/' );
				$tmpl->set_vars(array(
					'num' => 0,
					'cloud' => $cloud,
					'cols' => $cols,
					'ew' => $ew,
					'text_category' => '' ,
					'array_category' => array()
				));
				$me_content .= $tmpl->render( 'categorypage' );
				return $me_content;
			} else {
				return false;
			}
		} else {
			$sourceText = str_replace( $multiedit_tag, '', $sourceText );
			$is_used_metag = true;
		}

		$category_tags = null;
		preg_match_all( CATEGORY_TAG_SPECIFIC, $sourceText, $category_tags );
		if ( is_array( $category_tags ) ) {
			$is_used_category_cloud = true;
			$sourceText = preg_replace( CATEGORY_TAG_SPECIFIC, '', $sourceText );
		}

		// get infoboxes out...
		preg_match_all(
			wfMsgForContent( 'createpage-template-infobox-format' ),
			$sourceText, $infoboxes, PREG_OFFSET_CAPTURE
		);

		// new functions to exclude any additional '}}'s from match
		if ( is_array( $infoboxes ) && is_array( $infoboxes[0] ) && !empty( $infoboxes[0][0] ) ) {
			$to_parametrize = $infoboxes[0][0];
			$infobox_start = $to_parametrize[1];
			// take first "}}" here - this should be infoboxes' end
			$infobox_end = strpos( $sourceText, '}}' );
			$to_parametrize = substr( $sourceText, $infobox_start, $infobox_end - $infobox_start + 2 );
			$sourceText = str_replace( $to_parametrize, '', $sourceText );

			$to_parametrize = preg_replace( TEMPLATE_CLOSING, '', $to_parametrize );

			// fix issues with |'s given inside the infobox parameters...
			$pre_inf_pars = preg_split( "/\|/", $to_parametrize, -1 );

			$fixed_par_array = array();
			$fix_corrector = 0;

			for ( $i = 0; $i < count( $pre_inf_pars ); $i++ ) {
				// this was cut out from user supplying '|' inside the parameter...
				if( ( strpos( $pre_inf_pars[$i], '=' ) === false ) && ( 0 != $i ) ) {
					$fixed_par_array[$i - ( 1 + $fix_corrector )] .= '|' . $pre_inf_pars[$i];
					$fix_corrector++;
				} else {
					$fixed_par_array[] = $pre_inf_pars[$i];
				}
			}

			array_shift( $fixed_par_array );
			array_walk( $fixed_par_array, 'wfCreatePageUnescapeKnownMarkupTags' );

			$num = 0;
			$tmpl = new EasyTemplate( dirname( __FILE__ ) . '/templates/' );
			$tmpl->set_vars(array(
				'num' => $num,
				'infoboxes' => $to_parametrize,
				'inf_pars' => $fixed_par_array,
			));

			$me_content .= $tmpl->render( 'infobox' );
		}

		# check sections exist
		$sections = preg_split( SECTION_PARSE, $sourceText, -1, PREG_SPLIT_OFFSET_CAPTURE );
		$is_section = ( count( $sections ) > 1 ? true : false );

		$boxes = array();
		$num = 0;
		$loop = 0;
		$optionals = array();

		if ( $is_used_metag ) {
			$boxes[] = array(
				'type' => 'text',
				'value' => addslashes( $multiedit_tag ),
				'display' => 0
			);
			$num = 1;
			$loop++;
		}

		$all_image_num = 0;

		/**
		 * Parse sections
		 */
		foreach ( $sections as $section ) {
			# empty section
			$add = '';
			if ( ( $section[1] == 0 ) && ( empty( $section[0] ) ) ) {
				continue;
			} elseif ( intval( $section[1] ) > 0 ) { // add last character truncated by preg_split()
				$add = substr( $sourceText, $section[1] - 1, 1 );
			}

			# get section text
			$text = ( ( $num && ( !empty( $add ) ) ) ? '==' : '' ) . $add . $section[0];

			preg_match( '!==(.*?)==!s', $text, $name );
			$section_name = $section_wout_tags = '';
			# section name
			if ( !empty( $name ) ) {
				$section_name = $name[0];
				$section_wout_tags = trim( $name[1] );
			}
			if ( !empty( $section_name ) ) {
				$boxes[] = array(
					'type' => 'section_display',
					'value' => '<b>' . $section_wout_tags . '</b>',
					'display' => 1
				);
				$boxes[] = array(
					'type' => 'text',
					'value' => addslashes( $section_name ),
					'display' => 0
				);
			} else {
				$boxes[] = array(
					'type' => 'section_display',
					'value' => '<b>' . wfMsg( 'createpage-top-of-page' ) . '</b>',
					'display' => 1
				);
			}

			# text without section name
			if ( strlen( $section_name ) > 0 ) {
				$text = substr( $text, strlen( $section_name ) + 1 ); // strip section name
			}
			$text = trim( $text ); // strip unneeded newlines

			/**
			 * <(descr|title|pagetitle)="..."> tag support
			 */
			$main_tags = '';
			$special_tags = array();
			preg_match_all( ADDITIONAL_TAG_PARSE, $text, $me_tags );

			if ( isset( $me_tags ) && ( !empty( $me_tags[1] ) ) ) {
				foreach( $me_tags[1] as $id => $_tag ) {
					$brt = $me_tags[2][$id];
					$correct_brt = ( $brt == '&quot;' ) ? "\"" : $brt;
					if ( in_array( $_tag, $wgMultiEditPageTags ) ) {
						switch( $_tag ) {
							case 'title':
							case 'descr':
							case 'category': {
								if ( empty( $special_tags[$_tag] ) || ( $_tag == 'category' ) ) {
									$special_tags[$_tag] = $me_tags[3][$id];
									if ( $_tag != 'category' ) {
										$format_tag_text = ( $_tag == 'title' ) ? '<b>%s</b>' : '<small>%s</small>';
									} else {
										$format_tag_text = '%s';
									}
									if ( $_tag != 'category' ) {
										$type = '';
										if ( $_tag == 'title' ) {
											$type = 'title';
										}
										# remove special tags
										$text = str_replace( "<!---{$_tag}={$brt}" . $special_tags[$_tag] . "{$brt}--->", '', $text );
										$text = trim( $text ); // strip unneeded newlines
										# add to display
										$boxes[] = array(
											'type' => $type,
											'value' => sprintf( $format_tag_text, $special_tags[$_tag] ),
											'display' => 1
										);
										$main_tags .= "<!---{$_tag}={$correct_brt}" . $special_tags[$_tag] . "{$correct_brt}--->\n";
									} else {
										$text = str_replace(
											"<!---{$_tag}={$brt}" . $special_tags[$_tag] . "{$brt}--->",
											'[[' . $wgContLang->getNsText( NS_CATEGORY ) .
												':' . sprintf( $format_tag_text, $special_tags[$_tag] ) . ']]',
											//'[[Category:' . sprintf( $format_tag_text, $special_tags[$_tag] ) . ']]',
											$text
										);
									}
								}
								break;
							}
						}
					}
				}
			}

			// parse given categories into an array...
			preg_match_all( CATEGORY_TAG_PARSE, $text, $categories, PREG_SET_ORDER );
			// and dispose of them, since they will be in the cloud anyway
			$text = preg_replace( CATEGORY_TAG_PARSE, '', $text );
			if ( is_array( $categories ) ) {
				$found_categories = $found_categories + $categories;
			}

			/**
			 * Display section name and additional tags as hidden text
			 */
			if ( !empty( $main_tags ) ) {
				$boxes[] = array(
					'type' => 'textarea',
					'value' => $main_tags,
					'toolbar' => '',
					'display' => 0
				);
			}

			/**
			 * other tags - lbl, categories, language,
			 */
			preg_match( SIMPLE_TAG_PARSE, $text, $other_tags );
			$specialTag = ( isset( $other_tags ) && ( !empty( $other_tags[1] ) ) ) ? $other_tags[1] : 'generic';

			if (
				( !empty( $specialTag ) ) &&
				( !empty( $wgMultiEditPageSimpleTags ) ) &&
				( in_array( $specialTag, $wgMultiEditPageSimpleTags ) )
			) {
				$boxes[] = array(
					'type' => 'text',
					'value' => sprintf( SPECIAL_TAG_FORMAT, $specialTag ),
					'display' => 0
				);
				switch( $specialTag ) {
					case 'lbl': { // <!---lbl---> tag support
						$text_html = str_replace( $other_tags[0], '', $text ); // strip <!---lbl---> tag
						$text_html = trim( $text_html ); // strip unneeded newlines
						// this section type is non-editable, so we just rebuild its contents in JavaScript code
						$boxes[] = array(
							'type' => 'textarea',
							'value' => $text_html,
							'toolbar' => '',
							'display' => 0
						);
						$boxes[] = array(
							'type' => '',
							'value' => $text_html,
							'display' => 1
						);
						break;
					}
					case 'pagetitle': { // <!---pagetitle---> tag support
						$text_html = str_replace( $other_tags[0], '', $text ); // strip <!---lbl---> tag
						$text_html = trim( $text_html ); // strip unneeded newlines
						// this section type is non-editable, so we just rebuild its contents in JavaScript code
						$boxes[] = array(
							'type' => 'text',
							'value' => "{$text_html}",
							'display' => 1
						);
						break;
					}
					case 'optional': { // <!---optional---> tag support
						$text_html = str_replace( $other_tags[0], '', $text ); // strip the tag
						$text_html = trim( $text_html );
						$toolbarid = count( $boxes );
						$toolbar_text = CreateMultiPage::getMultiEditToolbar( $toolbarid );
						$boxes[] = array(
							'type' => 'optional_textarea',
							'value' => $text_html,
							'toolbar' => $toolbar_text,
							'display' => 1
						);

						$optionals[] = count( $boxes ) - 1;
						break;
					}
					case 'imageupload': { //<!---imageupload---> tag support
						// do a match here, and for each do the thing, yeah
						preg_match_all( IMAGEUPLOAD_TAG_SPECIFIC, $text, $image_tags );

						// one we had already
						$cur_img_count = count( $image_tags ) - 1;
						foreach ( $image_tags[0] as $image_tag ) {
							if ( $cur_img_count > 0 ) {
								$boxes[] = array(
									'type' => 'text',
									'value' => sprintf( SPECIAL_TAG_FORMAT, 'imageupload' ),
									'display' => 0
								);
							}
							$cur_img_count++;
						}

						$text = str_replace( $other_tags[0], '', $text );

						// get the toolbar
						$toolbarid = count( $boxes );
						$toolbar_text = CreateMultiPage::getMultiEditToolbar( $toolbarid );

						$boxes[] = array(
							'type' => 'textarea',
							'value' => $text,
							'toolbar' => $toolbar_text,
							'display' => 1
						);

						$current = count( $boxes ) - count( $image_tags[0] ) - 1;
						$add_img_num = 0;
						foreach ( $image_tags[0] as $image_tag ) {
							$tmpl = new EasyTemplate( dirname( __FILE__ ) . '/templates/' );
							$tmpl->set_vars(array(
								'imagenum' => $all_image_num,
								'target_tag' => $current + $add_img_num
							));
							$image_text = $tmpl->render( 'editimage-section' );
							$boxes[] = array(
								'type' => 'image',
								'value' => $image_text,
								'display' => 1
							);
							$add_img_num++;
							$all_image_num++;
						}
					}
				}
			} elseif( $specialTag == 'generic' ) { // generic textarea
				// get the toolbar
				$toolbarid = count( $boxes );
				$toolbar_text = CreateMultiPage::getMultiEditToolbar( $toolbarid );

				$boxes[] = array(
					'type' => 'textarea',
					'value' => $text,
					'toolbar' => $toolbar_text,
					'display' => 1
				);
			}

			$boxes[] = array(
				'type' => '',
				'value' => '<br/><!--end of section-->',
				'display' => 1
			);
			$num++;
		}

		$tmpl = new EasyTemplate( dirname( __FILE__ ) . '/templates/' );
		$tmpl->set_vars(array(
			'boxes' => $boxes,
			'cols' => $cols,
			'rows' => $rows,
			'ew' => $ew,
			'is_section' => $is_section,
			'title' => $wgTitle,
			'imgpath' => $wgScriptPath . '/extensions/CreateAPage/images/',
			'optional_sections' => $optional_sections
		));
		$me_content .= $tmpl->render( 'editpage' );

		if ( $is_used_category_cloud ) {
			// categories are generated here... well, except for Blank
			// init some class here to get categories form to display
			$text_category = '';
			$xnum = 0;
			$array_category = array();

			foreach ( $found_categories as $category ) {
				$cat_text = trim( $category[1] );
				$text_category .= ( $xnum ? ',' : '' ) . $cat_text;
				$array_category[$cat_text] = 1;
				$xnum++;
			}

			$cloud = new CAP_TagCloud();

			$tmpl = new EasyTemplate( dirname( __FILE__ ) . '/templates/' );
			$tmpl->set_vars(array(
				'num' => $num,
				'cloud' => $cloud,
				'cols' => $cols,
				'ew' => $ew,
				'text_category' => $text_category,
				'array_category' => $array_category
			));

			$me_content .= $tmpl->render( 'categorypage' );
		}

		return $me_content;
	}
}