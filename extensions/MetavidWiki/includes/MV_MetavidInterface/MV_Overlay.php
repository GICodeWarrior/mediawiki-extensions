<?php
/**
 * Created on Jun 28, 2007
 *
 * All Metavid Wiki code is Released Under the GPL2
 * for more info visit http://metavid.org/wiki/Code
 */
if ( !defined( 'MEDIAWIKI' ) )  die( 1 );

// hide the fact box in any MV_Overlay driven view of mvd
global $smwgShowFactbox;
$smwgShowFactbox = SMW_FACTBOX_HIDDEN;

 class MV_Overlay extends MV_Component {
 	/*init function should load the target overlay*/
 	// set up defaults:
 	var $req = 'stream_transcripts';
 	var $tl_width = '16';
 	var $parserOutput = null;
 	var $oddEvenToggle = true;
 	var $mvd_pages = array();

/*structures the component output and call html code generation */
 	function getHTML() {
 		switch( $this->req ) {
 			case 'stream_transcripts':
 				$this->do_stream_transcripts();
 			break;
 			case 'Recentchanges':
 				$this->do_Recentchanges();
 			break;
 		}
	}

	// renders recent changes in the MVD namespace
	function do_Recentchanges() {
		global $wgOut;
		// quick and easy way:
		$wgOut->addWikiText( '{{Special:Recentchanges/namespace=' . MV_NS_MVD . '}}' );
	}

	function do_stream_transcripts() {
		global $wgOut;
		$this->procMVDReqSet();
		$this->load_transcripts();
		$out = '';
		// set up left hand side timeline
		$ttl_width = count( $this->mvd_tracks ) * ( $this->tl_width );
		/*$wgOut->addHTML('<div id="mv_time_line" style="width:'.$ttl_width.'px">' .
					$this->get_video_timeline() .
				'</div>');
		*/
		// get nav-interface links

		$wgOut->addHTML( '<div id="mv_fd_mvd_cont" style="position:relative;" >' );
			$wgOut->addHTML( "<div id=\"mv_add_new_mvd\" style=\"display:none;\"></div>" );
			$this->get_transcript_pages();
		$wgOut->addHTML( "</div>" );
	}

	function render_full() {
		global $wgOut;
 		// "<div >" .
 		$wgOut->addHTML( "<div id=\"selectionsBox\">\n" );
	 		$this->getHTML();
 		$wgOut->addHTML( "</div>\n" );
 		// add in contorls:
 		$wgOut->addHTML( $this->render_controls() );

	}

	function render_controls() {
		global $mvgShowLayerControls;
		$ct = '<div class="layers">
				<ul>
					<li>
						<a href="javascript:mv_disp_add_mvd(\'anno_en\')">' . wfMsg( 'mv_new_anno_en' ) . '</a>
					</li>
					<li>
						<a title="' . htmlspecialchars( wfMsg( 'mv_new_ht_en' ) ) . '" href="javascript:mv_disp_add_mvd(\'ht_en\')">' . wfMsg( 'mv_new_ht_en' ) . '</a>
					</li>';
		if($mvgShowLayerControls){
			$ct.= '<li>
						<a title="' . htmlspecialchars( wfMsg( 'mv_mang_layers' ) ) . '" href="javascript:mv_tool_disp(\'mang_layers\')">' . wfMsg( 'mv_mang_layers' ) . '</a>
				   </li>';
		}
		$ct.='		</ul>
				</div>';
		return $ct;
	}
	function render_menu() {
		global $wgLang;

		$base_title = '';
		// set the base title to the stream name:
		if ( isset( $this->mv_interface->article->mvTitle ) ) {
			$base_title = $this->mv_interface->article->mvTitle->getStreamName();
		}
		// '<a title="'.wfMsg('mv_search_stream_title').'" href="javascript:mv_tool_disp(\'search\')">'.wfMsg('mv_search_stream').'</a>'
		return $wgLang->pipeList( array(
			'<a title="' . htmlspecialchars( wfMsg( 'mv_mang_layers_title' ) ) . '" href="javascript:mv_tool_disp(\'mang_layers\')">' . wfMsg( 'mv_mang_layers' ) . '</a>',
			'<a title="' . htmlspecialchars( wfMsg( 'mv_new_ht_en' ) ) . '" href="javascript:mv_disp_add_mvd(\'ht_en\')">' . wfMsg( 'mv_new_ht_en' ) . '</a>',
			'<a href="javascript:mv_disp_add_mvd(\'anno_en\')">' . wfMsg( 'mv_new_anno_en' ) . '</a>'
		) );
	}
	/* output caption div links */
	function get_video_timeline() {
		wfProfileIn( __METHOD__ );
		$out = '';
		// set up variables with exported vars in $this object
		$start_str 	= $this->mv_interface->article->mvTitle->getStartTime();
		$end_str	= $this->mv_interface->article->mvTitle->getEndTime();
		$this->start_time = $this->mv_interface->article->mvTitle->getStartTimeSeconds();
		$this->end_time = $this->mv_interface->article->mvTitle->getEndTimeSeconds();
		$end_time 	= $this->mv_interface->article->mvTitle->getEndTimeSeconds();
		$this->duration = $end_time - $this->start_time;
		// layers/filters

		foreach ( $this->mvd_pages as & $mvd_page ) {
				$out .= $this->get_timeline_html( $mvd_page );
		}
		// output the time stamps:
		/*$out.='<div style="position:absolute;top:0%;z-index:2;background:#FFFFFF;font-size:x-small">';
		$out.=$start_str;
		$out.='</div>';
		$out.='<div style="position:absolute;top:100%;z-index:2;background:#FFFFFF;font-size:x-small">';
		$out.=$end_str;
		$out.='</div>';*/
		wfProfileOut( __METHOD__ );
		return $out;
	}
	function load_transcripts() {
		// global $mvgIP;
		// require_once($mvgIP . '/includes/MV_Index.php');
		$dbr = wfGetDB( DB_SLAVE );
		global $wgRequest;
		$mvd_rows = & MV_Index::getMVDInRange( $this->mv_interface->article->mvTitle->getStreamId(),
							$this->mv_interface->article->mvTitle->getStartTimeSeconds(),
							$this->mv_interface->article->mvTitle->getEndTimeSeconds(),
							$this->mvd_tracks );
		foreach ( $mvd_rows as $row ) {
			$this->mvd_pages[$row->id] = $row;
		}
		// print_r($mvd_rows);
	}
	/*functions for transcript pages
	@@TODO OPTIMIZATION: (group article text queries)
	*/
	function get_transcript_pages() {
		global $wgUser, $mvgIP, $wgOut;
		$sk = $wgUser->getSkin();

		$out = '';
		if ( count( $this->mvd_pages ) == 0 ) {
			$out = 'no mvd rows found';
		} else {
			foreach ( $this->mvd_pages as $mvd_id => $mvd_page ) {
				$this->get_fd_mvd_page( $mvd_page );
			}
		}
	}
	function get_fd_mvd_page( &$mvd_page, $content = '' ) {
		global $wgOut, $mvDefaultVideoPlaybackRes;
		// print_r($mvd_page);
		// "<div id=\"mv_ctail_{$mvd_page->id}\" style=\"position:relative\">"
		if ( isset( $this->mv_interface->smwProperties['playback_resolution'] ) ) {
			// for now just put in a hack that forces no size adjustment
			$img_url = MV_StreamImage::getStreamImageURL( $mvd_page->stream_id, $mvd_page->start_time, null, true );
		} else {
			$img_url = MV_StreamImage::getStreamImageURL( $mvd_page->stream_id, $mvd_page->start_time, $mvDefaultVideoPlaybackRes, true );
		}
		$oe_class = '';
		//color annnotative layers seperatly:
		$oe_class.=' ' . htmlspecialchars( strtolower( $mvd_page->mvd_type ) );
		//preset classes for rendering on page load (will repaint but whatever)
		if ( $this->oddEvenToggle ) {
			$this->oddEvenToggle = false;
			$oe_class .= ' even';
		} else {
			$this->oddEvenToggle = true;
			$oe_class .= ' odd';
		}

		// style=\"background:#".$this->getMvdBgColor($mvd_page)."\" "
		$wgOut->addHTML( '<fieldset class="mv_fd_mvd' . htmlspecialchars( $oe_class ) . '" id="mv_fd_mvd_' . htmlspecialchars( $mvd_page->id ) . '" ' .
					'name="' . htmlspecialchars( $mvd_page->wiki_title ) . '" ' .
					'image_url="' . htmlspecialchars( $img_url ) . '" >' );

		/*$wgOut->addHTML("<legend id=\"mv_ld_{$mvd_page->id}\">" .
				$this->get_mvd_menu($mvd_page) .
				"</legend>");*/
		// $menu_html = $this->get_mvd_menu($mvd_page);
		$wgOut->addHTML( "<div id=\"mv_fcontent_{$mvd_page->id}\">" );
		if ( $content == '' ) {
			$this->outputMVD( $mvd_page );
		} else {
			$wgOut->addHTML( $content );
		}
		$wgOut->addHTML( "</div>" );
		$wgOut->addHTML( "</fieldset>" );
	}
	function get_tl_mvd_request( $titleKey, $mvd_id ) {
		global $mvgIP;
		if ( !isset( $this->mvd_pages[$mvd_id] ) )
			$this->mvd_pages[$mvd_id] = MV_Index::getMVDbyTitle( $titleKey );
		return $this->get_timeline_html( $this->mvd_pages[$mvd_id] );
	}
	function get_fd_mvd_request( $titleKey, $mvd_id, $mode = 'inner', $content = '' ) {
		global $wgOut;
		if ( !isset( $this->mvd_pages[$mvd_id] ) )
			$this->mvd_pages[$mvd_id] = MV_Index::getMVDbyId( $mvd_id );
		if ( $mode == 'inner' ) {
			$this->outputMVD( $this->mvd_pages[$mvd_id] );
		} elseif ( $mode == 'enclosed' ) {
			$this->get_fd_mvd_page( $this->mvd_pages[$mvd_id], $content );
		}
		return $wgOut->getHTML();
	}
	function get_timeline_html( &$mvd_page ) {
		$out = '<div id="mv_tl_mvd_' . $mvd_page->id . '" ' .
			'class="mv_timeline_mvd_jumper" ' .
			'title="' . wfMsg( 'mv_play' ) . ' ' . seconds2npt( $mvd_page->start_time ) . '" ' .
			/*
			 * time_line actions added by jQuery
			'onmouseover="mv_mvd_tlOver(\''.$mvd_page->id.'\')" '.
			'onmouseout="mv_mvd_tlOut(\''.$mvd_page->id.'\')" '.
			'onmouseup="mv_do_play()" ' .
			*/
			'style="position:absolute;background:#' . $this->getMvdBgColor( $mvd_page ) . ';' .
			'width:' . $this->tl_width . 'px;';
		// set left based on array key:
		$keyOrder = array_search( strtolower( $mvd_page->mvd_type ), $this->mvd_tracks );
		// @@todo probably should throw an error:
		if ( $keyOrder === false )$keyOrder = 0;
		$out .= 'left:' . ( $keyOrder * $this->tl_width ) . 'px;';
		// check if duration is set (for php calculation of height position)
		if ( $this->duration ) {
			// print "master range: $this->start_time to $this->end_time \n";
			// max out ranges:
			$page_start = ( $mvd_page->start_time < $this->start_time ) ? $this->start_time:$mvd_page->start_time;
			$page_end =  ( $mvd_page->end_time > $this->end_time ) ? $this->end_time:$mvd_page->end_time;

			$page_duration 	= $page_end - $page_start;
			// print "page duration $page_end - $page_start: $page_duration \n";
			$height_perc 	= round( 100 * ( $page_duration / $this->duration ), 2 );

			if ( $page_start == 0 ) { // avoid dividing zero
				$loc_perc = 0;
			} else {
				// multiply by 100 to keep things inbounds
				$loc_perc = round( 100 * ( ( $page_start - $this->start_time ) / $this->duration ) );
			}
			// make sure we don't go out of range:
			if ( ( $height_perc + $loc_perc ) > 100 ) {
				$height_perc = 100 - $loc_perc;
			}
			if ( $loc_perc < 0 )$loc_perc = 0;

			$out .= 'height:' . $height_perc . '%;' .
				  'top:' . $loc_perc . '%"></div>' . "\n";
		} else {
			// don't include height and top information (javascript will position it?)
		}
		return $out;
	}

	function getMVDhtml( &$mvd_page, $absolute_links = false ) {
		global $wgOut;
		// incase we call mid output (but really should use outputMVD in those cases)
		$pre_out = $wgOut->getHTML();
		$wgOut->clearHTML();
		$this->outputMVD( $mvd_page, $absolute_links );
		$value = $wgOut->getHTML();
		$wgOut->clearHTML();
		$wgOut->addHTML( $pre_out );
		return $value;
	}
	function outputMVD( &$mvd_page, $absolute_links = false ) {
		global $wgOut, $wgUser, $wgEnableParserCache;
		// $mvdTile = Title::makeTitle(MV_NS_MVD, $mvd_page->wiki_title );
		$mvdTitle = new MV_Title( $mvd_page->wiki_title );
		// print "mw.log('outputMVD: ".$mvdTitle->getText()."');\n";
		$mvdArticle = new Article( $mvdTitle );
		if ( !$mvdArticle->exists() ) {
			// print "mw.log('missing: " .$mvd_page->wiki_title."');\n";
			return ;
		}
		// use the cache by default:
		// $usepCache = (isset($mvd_page->usePcache))?$mvd_page->usePcache:true;

		/*try to pull from cache: separate out cache for internal links vs external links cache*/
		if( $wgEnableParserCache ) {
			$MvParserCache = ParserCache::singleton();
			$popts = ParserOptions::newFromUser( $wgUser );
			if ( $absolute_links ) {
				$popts->addExtraKey( 'Metavid-absolutelinks' );
			}

			// FIXME: add the dbKey since I don't know how to easy purge the cache and we are getting cache missmatch
			$popts->addExtraKey( $mvdTitle->getDBkey() );

			$parserOutput = $MvParserCache->get( $mvdArticle, $popts );
		}else{
			$parserOutput=false;
		}
		if ( $parserOutput !== false ) {
			// print "mw.log('found in cache: with hash: " . $MvParserCache->getKey( $mvdArticle, $wgUser )."');\n";
			// found in cache output and be done with it:
			$wgOut->addParserOutput( $parserOutput );
		} else {
			// print "mw.log('not found in cache');\n";
			// print "mw.log('titleDB: ".$tsTitle->getDBkey() ."');\n";
			if ( $mvdTitle->exists() ) {
				// grab the article text:
				$curRevision = Revision::newFromTitle( $mvdTitle );
				$wikiText = $curRevision->getText();
			} else {
				if ( isset( $this->preMoveArtileText ) ) {
					$wikiText = & $this->preMoveArtileText;
				} else {
					// @@todo throw error:
					// print "error article: "	.  $mvd_page->wiki_title . " not there \n";
					print "mw.log('missing: " . $mvd_page->wiki_title . "');\n";
					return ;
				}
			}
			$parserOutput =  $this->parse_format_text( $wikiText, $mvdTitle, $mvd_page, $absolute_links );

			// if absolute_links set preg_replace with the server for every relative link:
			if ( $absolute_links == true ) {
				global $wgServer;
				$parserOutput->mText = str_replace( array( 'href="/', 'src="/' ), array( 'href="' . $wgServer . '/', 'src="' . $wgServer . '/' ), $parserOutput->mText );
			}
			// output the page and save to cache
			$wgOut->addParserOutput( $parserOutput );
			if( $wgEnableParserCache ) {
				$MvParserCache->save( $parserOutput, $mvdArticle, $popts );
			}
		}
	}
	function parse_format_text( &$text, &$mvdTile, &$mvd_page = '', $absolute_links = false ) {
		global $wgOut, $mvgScriptPath;
		global $wgParser, $wgUser, $wgTitle, $wgContLang;
		$template_key = '';
		if ( is_object( $mvdTile ) )
			$template_key = strtolower( $mvdTile->getMvdTypeKey() );
		// $wgOut->addHTML('looking at: ' . strtolower($template_key));
		$sk = &$wgUser->getSkin();
		$pre_text_html = $post_text_html = '';
		$added_play_link = false;
		$smw_text_html = '';
		switch( $template_key ) {
			case 'ht_en':
			case 'anno_en':
				$play_link_o = '<a href="javascript:mv_do_play(' . htmlspecialchars( $mvd_page->id ) . ')">';
				$play_link_img_close = '<img border="0" src="' . htmlspecialchars( $mvgScriptPath ) . '/skins/images/button_play.png">' . '</a>';

				$smw_attr = $this->get_and_strip_semantic_tags( $text );
				foreach ( $smw_attr as $smw_key => $smw_attr_val ) {
					// do special display for given values:
					switch( $smw_key ) {
						case 'speech_by':
						case 'spoken_by':
							$pTitle = Title::newFromText( $smw_attr_val );
							if( $pTitle->exists() ){
								$pimg = mv_get_person_img( $smw_attr_val );
								$pre_text_html .= '<p class="mvd_page_image">';

								if ( $mvd_page != '' ) {
									$pre_text_html .= $play_link_o;
									$added_play_link = true;
								}
								$pre_text_html .= '<img width="44" alt="' . $pTitle->getText() . '" ' .
													'src="' . htmlspecialchars( $pimg->getURL() ) . '">';
								if ( $mvd_page != '' )
									$pre_text_html .= $play_link_img_close;
								$pre_text_html .= '</p>';
							}
						break;
					}
					// @@todo we should just use semantic mediaWikis info box with some custom style .
					$smwKeyTitle = Title::newFromText( $smw_key );
					$valueTitle = Title::newFromText( $smw_attr_val );
					if ( $template_key == 'anno_en' )
						$smw_text_html .= ucwords( $smwKeyTitle->getText() ) . ': ' . $sk->makeLinkObj( $valueTitle ) . '<br />';
				}

				if ( !$added_play_link && $mvd_page != '' ) {
					$pre_text_html .= '<p class="mvd_page_image">' . $play_link_o . $play_link_img_close . '</p>';
					// print "SHOULD HAVE PUT IN pre_text:$pre_text_html";
				}
				$pre_text_html .= '<p class="text">';
				if ( $mvd_page != '' ) {
					$pre_text_html .= '<span class="mvd_menu_header">' . $this->get_mvd_menu( $mvd_page ) . '</span>';
				}
				// if absolute links clear out links:
				if ( $absolute_links )
					$pre_text_html = '';
				$pre_text_html .= '<span class="description">';
				$pre_text_html .= $smw_text_html;
				// for ht_en add spoken by add name to start of text:
				if ( $template_key == 'ht_en' ) {
					// if we have the person title add them to start of the text output:
					if ( isset( $pTitle ) ) {
						// have to prepend it cuz of <p> insertion for first paragraph
						$text = '[[' . $pTitle->getText() . ']]: ' . trim( $text );
					}
				}
				$post_text_html .= '</span></p>';
			break;
			default:
			break;
		}
		// now add the text with categories if present:
		$sk =& $wgUser->getSkin();
		// run via parser to add in Category info:
		// $parserOptions = ParserOptions::newFromUser( $wgUser );
		$parserOptions = new ParserOptions();
		$parserOptions->setEditSection( false );
		$parserOptions->setTidy( true );
		$parserOutput = $wgParser->parse( $text , $mvdTile, $parserOptions, true, true );
		$wgOut->addCategoryLinks( $parserOutput->getCategories() );

		$parserOutput->mText .=	$sk->getCategories();
		$parserOutput->mText = $pre_text_html . $parserOutput->mText . $post_text_html;

		// empty out the categories (should work)
		$wgOut->mCategoryLinks = array();
		$parserOutput->mCategories = null;
		return $parserOutput;
	}
	function get_add_disp( $baseTitle, $mvdType, $time_range ) {
		global $wgUser, $wgOut, $mvDefaultClipLength, $mvMVDTypeAllAvailable, $wgRequest;

		list( $this->start_context, $this->end_context ) = split( '/', $time_range );
		// first make sure its a valid mvd_type
		if ( !in_array( $mvdType, $mvMVDTypeAllAvailable ) )return;
			# Or we could throw an exception:
			# throw new MWException( __METHOD__ . ' called invalid mvdType.' );

		$mvd_page = new MV_MVD();
		$mvd_page->id = 'new';

		// print 'st ' . $this->start_context . "<br />" ;
		// $mvd_page->start_time = $start_context; //seconds2npt(0);
 		// $mvd_page->end_time  = seconds2npt( npt2seconds($start_context) +  $mvDefaultClipLength);
 		$mvd_page->wiki_title = $mvdType . ':' . strtolower( $baseTitle ) . '/_new';
		$this->get_edit_disp( $mvd_page->wiki_title, 'new' );


		return $wgOut->getHTML();

		// make temporary unique "new" mvd title: (for now default to ht_en
		// but in the future default to no template type and let the user select)

		// $wgTitle = Title::newFromText($titleKey, MV_NS_MVD);


		// make a "new" mvd:
		// $mvd_page = new mvd_pageObj();
		// $mvd_page->id = 'new';
		// $mvd_page->start_time = seconds2npt(0);
 		// $mvd_page->end_time  = seconds2npt($mvDefaultClipLength);
		// $mvd_page->wiki_title = 'Ht_en:' . $baseTitle.'_'.rand(0,99999).'/'.	$mvd_page->start_time . '/' . $mvd_page->end_time;

		// $this->get_edit_disp($mvd_page->wiki_title,'new');
		// clear out html:
		// $wgOut->clearHTML();

		// get encapsulated mvd:
		// $this->get_fd_mvd_page($mvd_page, $edit_html);

		// get the edit page code:
	}
	/*return transcript menu*/
	function get_mvd_menu( &$mvd_page ) {
		global $wgUser, $mvgScriptPath, $wgRequest;
		$sk = $wgUser->getSkin();

		// hack to get menu correct...
		$do_adjust = $wgRequest->getVal( 'do_adjust' );
		//fix boolean string issue:
		$do_adjust = ( $do_adjust == 'false' ) ? false : $do_adjust;
		if ( $do_adjust  ) {
			$tmpMvPage = new MV_Title( $wgRequest->getVal( 'newTitle' ) );
			$mvd_page->wiki_title = $tmpMvPage->wiki_title;
			$mvd_page->start_time = npt2seconds( $tmpMvPage->start_time );
			$mvd_page->end_time	  = npt2seconds( $tmpMvPage->end_time );
		}

		$out = '';
		// set up links:
		$plink = '';
		$elink = '<a title="' . htmlspecialchars( wfMsg( 'mv_edit_adjust_title' ) ) .
				'" href="javascript:mv_edit_disp(\'' . htmlspecialchars( $mvd_page->wiki_title ) .
				'\', \'' . htmlspecialchars( $mvd_page->id ) . '\')">' . wfMsg( 'mv_edit' ) . '</a>';

		// $alink = '<a title="'.wfMsg('mv_adjust_title').'" href="javascript:mv_adjust_disp(\''.$mvd_page->wiki_title.'\', \''.$mvd_page->id.'\')">'.wfMsg('mv_adjust').'</a>';

		// print "wiki title: " . $mvd_page->wiki_title;
		$hTitle = Title::newFromText( $mvd_page->wiki_title, MV_NS_MVD );
		// print $hTitle->
		$hlink =  $sk->makeKnownLinkObj( $hTitle, wfMsg( 'mv_history' ), 'action=history' );

		$dTitle =  Title::newFromText( $mvd_page->wiki_title, MV_NS_MVD_TALK );
		$dlink = $sk->makeKnownLinkObj( $dTitle,  wfMsg( 'talk' ) );

		// {s:\''.seconds2npt($mvd_page->start_time).'\',e:\''.seconds2npt($mvd_page->end_time).'\'}
		/*$plink='<a title="'.htmlspecialchars(wfMsg('mv_play').' '.seconds2npt($mvd_page->start_time) . ' to ' . seconds2npt($mvd_page->end_time)).' " ' .
				'style="text-decoration:none;" ' .
				'href="javascript:mv_do_play('.htmlspecialchars($mvd_page->id).');">' .
					'<span style="width:44px"><img src="'.htmlspecialchars($mvgScriptPath).'/skins/images/control_play_blue.png"></span>'.'</a>'.
					htmlspecialchars(seconds2npt($mvd_page->start_time) . ' to ' . htmlspecialchars(seconds2npt($mvd_page->end_time)));
		*/
		$plink = htmlspecialchars( seconds2npt( $mvd_page->start_time ) ) . ' to ' . htmlspecialchars( seconds2npt( $mvd_page->end_time ) );
		// @@TODO set up conditional display: (view source if not logged on, protect, remove if given permission)
		$out .= $plink;
		$out .= "( $elink $hlink $dlink";
		if ( $wgUser->isAllowed( 'mv_delete_mvd' ) ) {
			$rlink = '<a title="' . htmlspecialchars( wfMsg( 'mv_remove_title' ) ) . '" href="javascript:mv_disp_remove_mvd(\'' . htmlspecialchars( $mvd_page->wiki_title ) . '\', \'' . htmlspecialchars( $mvd_page->id ) . '\')">' . wfMsg( 'mv_remove' ) . '</a>';
			$out .= ' ' .  $rlink;
		}
		$out .= " )<br /> ";
		return $out;
	}
	/**
	 * generate soft colors vi page ids (we use ids so that page moves don't change the color')
	*/
	function getMvdBgColor( & $mvd_page ) {
		if ( !isset( $mvd_page->color ) ) {
			$color = substr( md5( $mvd_page->id ), 0, 6 );
			// make the color soft (dont include low values)
			$soft = array( 'A', 'B', 'C', 'D', 'E', 'F' );
			for ( $i = 0; $i < strlen( $color ); $i++ ) {
				if ( is_numeric( $color[$i] ) ) {
					$color[$i] = $soft[ceil( $color[$i] / 2 )];
				} else {
					$color[$i] = strtoupper( $color[$i] );
				}
			}
			$mvd_page->color = $color;
		}
		return $mvd_page->color;
	}
	/*STATIC Functions */
	function get_and_strip_semantic_tags( &$text, $tags = array() ) {
		global $mv_smw_tag_arry;
		// taken from semantic wiki SMW_Hooks.php function smwfParserHook :
		$semanticLinkPattern = '(\[\[(([^:][^]]*):[=|:])+((?:[^|\[\]]|\[\[[^]]*\]\]|\[[^]]*\])*)(\|([^]]*))?\]\])';
		$mv_smw_tag_arry = array();
		$text = preg_replace_callback( $semanticLinkPattern, 'mvParsePropertiesCallback', $text );
		$ret_ary = array();
		foreach ( $mv_smw_tag_arry as $k => $v ) {
			$ret_ary[strtolower( str_replace( ' ', '_', $k ) )] = $v;
		}
		return $ret_ary;
	}
	/*
	* @@todo in the future dataHelpers could accommodate more.. (but lets avoid recreating the halo semantic mediaWiki extension).).
	 */
	function get_dataHelpers( $titleKey = 'new', $mvd_id = 'new' ) {
		global $mvMetaDataHelpers, $mvMetaCategoryHelper, $wgUser, $mvgScriptPath;
		$o = '';
		$sk = $wgUser->getSkin();
		$mvd_type = strtolower( array_shift( split( ':', $titleKey ) ) );


		// init metadata array: label
		$metaData = array( 'prop' => array(), 'categories' => array() );
		// just get msg and basic div layout: \
		// css layout of forms was F*@#!!! withing me for some reason so yay table :P
		$o .= '<span class="mv_basic_edit"><a href="#" onClick="mv_mvd_advs_toggle(' . htmlspecialchars( $mvd_id ) . ');return false;">' . wfMsg( 'mv_advanced_edit' ) . '</a></span>
			 <span style="display:none" class="mv_advanced_edit"><a href="#" onClick="mv_mvd_advs_toggle(' . htmlspecialchars( $mvd_id ) . ');return false;">' . wfMsg( 'mv_basic_edit' ) . '</a></span>';

		$o .= '<input type="hidden" id="adv_basic_' . htmlspecialchars( $mvd_id ) . '" name="adv_basic" value="basic">';
		$o .= '<table class="mv_basic_edit mv_dataHelpers" id="mv_dataHelpers_' . htmlspecialchars( $mvd_id ) . '">';
			if ( isset( $mvMetaDataHelpers[strtolower( $mvd_type )] ) ) {
				// get existing metadata
				if ( $mvd_id != 'new' && $mvd_id != 'seq' ) {
					$mvTitle = new MV_Title( $titleKey );
					if ( !$mvTitle->validRequestTitle() ) {
			  			$o .= "<span class=\"error\">Error:</span>" . wfMsg( 'mvMVDFormat' );
			  			return $o;
			  		}
			  		$metaData =  $mvTitle->getMetaData();
				}

				foreach ( $mvMetaDataHelpers[strtolower( $mvd_type )] as $prop => $ac_index ) {
					$val = '';
					// normalize the
					$prop = str_replace( ' ', '_', $prop );
					// set existing "value"
					if ( isset( $metaData['prop'][$prop] ) ) {
						$val = $metaData['prop'][$prop];
					}
					// make sure the property exists:
					$swmTitle = Title::newFromText( (string)$prop, SMW_NS_PROPERTY );
					$smwImageHTML = '';
					if ( $swmTitle->exists() ) {
						// $help_img =$sk->makeKnownLinkObj($swmTitle, '<img src="'.htmlspecialchars($mvgScriptPath).'/skins/images/help_icon.png">');
						// special case for person image: (would be good to generalize but kind of complicated)
						if ( $swmTitle->getText() == 'Speech_by' ) {
							$img = mv_get_person_img( $val );
							$smwImageHTML = '<img id="smw_' . htmlspecialchars( $prop ) . '_img" style="display: block;margin-left: auto;margin-right: auto;" src="' . htmlspecialchars( $img->getURL() ) . '" width=\"44\">';
						}

						$o .= "<tr><td><label>" . htmlspecialchars( $swmTitle->getText() ) .
								':</label></td><td>' . $smwImageHTML . '<input class="mv_anno_ac_' . htmlspecialchars( $mvd_id ) . '" ' .
						 		'size="40" name="smw_' . htmlspecialchars( $prop ) . '" type="text" value="' . htmlspecialchars( $val ) . '"> ' .
								'<div class="autocomplete" id="smw_' . htmlspecialchars( $prop ) . '_choices_' . htmlspecialchars( $mvd_id ) . '" style="display: none;"/>
								</td></tr>';
					} else {
						print '<span class="error">Error:</span>' . $sk->makeKnownLinkObj( $swmTitle, $swmTitle->getText() ) . ' does not exist<br />' ;
					}
				}
				$mvgScriptPath = htmlspecialchars( $mvgScriptPath );
				$mvd_id = htmlspecialchars( $mvd_id );
				if ( $mvMetaCategoryHelper ) {
					// list each category with a little - next to it that removes its respective hidden field.
					$i = 0;
					$o .= '<tr><td>' . wfMsgExt( 'mv_existing_categories', array( 'parsemag', 'escapenoentities' ), count( $metaData['categories'] ) ) . '</td><td>';
					$o .= '<div id="mv_ext_cat_container_' . htmlspecialchars( $mvd_id ) . '"></div>';
					foreach ( $metaData['categories'] as $cat => $page ) {
						$catTitle = Title::newFromText( $cat, NS_CATEGORY );
						$o .= '<span id="ext_cat_' . htmlspecialchars( $i ) . '"><input value="' . $catTitle->getDBkey() . '" type="hidden" style="display:none;" name="ext_cat_' . $i . '" class="mv_ext_cat">' .
							$catTitle->getText() .
							'<a  href="#" onclick="$j(\'#ext_cat_' . $i . '\').fadeOut(\'fast\').remove();return false;">
								<img border="0" src="' . $mvgScriptPath . '/skins/images/delete.png">
							</a>
							</span><br />';
						$i++;
					}
					$o .= '</tr>';
					$o .= "<tr><td><label for=\"category\">" . wfMsg( 'mv_add_category' ) . ":</label></td><td><input id=\"mv_add_cat_ext_{$mvd_id}\" maxlength=\"255\" size=\"20\" class=\"mv_anno_ac_{$mvd_id}\" name=\"category\" type=\"text\">
							<img onClick=\"mv_add_category('{$mvd_id}', \$j('#mv_add_cat_ext_{$mvd_id}').val());\$j('#mv_add_cat_ext_{$mvd_id}').val('');\" border=\"0\" src=\"{$mvgScriptPath}/skins/images/add.png\">
							<div class=\"autocomplete\" id=\"category_choices_{$mvd_id}\" style=\"display: none;\"/></td></tr>";
				}
				// output a short desc field (the text with striped semantic values)...
				$o .= '<tr><td>' . wfMsg( "mv_basic_text_desc" ) . '</td><td><textarea name="basic_wpTextbox" rows="2" cols="40">';
				if ( isset( $metaData['striped_text'] ) )
					$o .= htmlspecialchars( $metaData['striped_text'] );
				$o .= '</textarea></td></tr>';
			}
		$o .= '</table>';
		return $o;
	}
	function get_adjust_disp( $titleKey = 'new', $mvd_id = 'new' ) {
		global $mvgScriptPath;		//
		$out = '';
		if ( $mvd_id == 'new' || $mvd_id == 'seq' ) {
			global $mvDefaultClipLength;
			$start_time = isset( $this->start_context ) ? $this->start_context:seconds2npt( 0 );
 			$end_time  = isset( $this->end_context ) ?
	 			seconds2npt( npt2seconds( $this->start_context ) + $mvDefaultClipLength ):
	 			seconds2npt( $mvDefaultClipLength );
		} else {
	  		$mvTitle = new MV_Title( $titleKey );
	  		if ( !$mvTitle->validRequestTitle() ) {
	  			return wfMsg( 'mvMVDFormat' );
	  		}
	  		$start_time = $mvTitle->getStartTime();
	  		$end_time = $mvTitle->getEndTime();
		}
		if($start_time == "null")
			$start_time = '0:00:00';
		/*
		 * @@todo move some of this to CSS
  		 */
		$mvd_id = htmlspecialchars( $mvd_id );
		$mvgScriptPath = htmlspecialchars( $mvgScriptPath );
		$out .= '<br /><div class="inOutSlider"></div><br />';

		$out .= '<span style="float:left;"><label class="mv_css_form" for="mv_start_hr_' . $mvd_id . '"><i>' . wfMsg( 'mv_start_desc' ) . ':</i></label> ' .
			'<input class="mv_adj_hr" size="8" maxlength="8" value="' . htmlspecialchars( $start_time ) . '" id="mv_start_hr_' . $mvd_id . '" name="mv_start_hr_' . $mvd_id . '">' .
			'</span>';

		$out .= '<span style="float:left;"><label class="mv_css_form" for="mv_end_hr_' . $mvd_id . '"><i>' . wfMsg( 'mv_end_desc' ) . ':</i></label> ' .
			'<input class="mv_adj_hr" size="8" maxlength="8" value="' . htmlspecialchars( $end_time ) . '" id="mv_end_hr_' . $mvd_id . '" name="mv_end_hr_' . $mvd_id . '">' .
			'</span>';

		// output page text (if not "new")
		// if($mvd_id!='new')
		//	$out.=$this->get_fd_mvd_request( $titleKey, $mvd_id);

		/*$out.='<table width="100%">'.
		'<tr><td>'.wfMsg('mv_start_desc').'</td>'.
		'<td><input name="mv_start_hr_'.$mvd_id.'" type="text" value=""></td>'.
		'</tr><tr>'.
		'<input type="text" value=""><br />
		*/
		// clear any floats:
		$out .= '<div style="clear:both"></div>';
		// $out.='</form>';
  		return $out;
	}
	// function do_add_mvd(){
		// $result_txt = $this->do_edit_submit($_REQUEST['title'], 'new');
		/*$start = $_REQUEST['mv_start_hr_new'];
		$end = $_REQUEST['mv_end_hr_new'];
		$title = substr($_REQUEST['title'],0,strpos($_REQUEST['title'],'/')).'/'.$start.'/'.$end;
		print "title: " . 		$title;
		$wgTitle = Title::newFromText($title, MV_NS_MVD);
		$Article = new Article($wgTitle);*/
	// }

	/*@@TODO document */
	function do_edit_submit( $titleKey, $mvd_id, $returnEncapsulated = false, $newTitleKey = '' ) {
		global $wgOut, $wgScriptPath, $wgUser, $wgTitle, $wgRequest, $wgContLang;

		if ( $mvd_id == 'new' ) {
			$titleKey = substr( $_REQUEST['title'], 0, strpos( $_REQUEST['title'], '/' ) ) .
				'/' . $_REQUEST['mv_start_hr_new'] . '/' . $_REQUEST['mv_end_hr_new'];
		}
		// if doing basic editing use basic wpTextBox:
		if ( $wgRequest->getVal( 'adv_basic' ) == 'basic' ) {
			$wpTextbox1 = $wgRequest->getVal( 'basic_wpTextbox' );
		} else {
			$wpTextbox1 = $wgRequest->getVal( 'wpTextbox1' );
		}

		// set up the title /article
		$wgTitle = Title::newFromText( $titleKey, MV_NS_MVD );
		$Article = new Article( $wgTitle );

		$wpTextbox1 = trim( $wpTextbox1 );
		// add all semantic form based attributes/relations to the posted body text
		$formSemanticText = '';
		foreach ( $_POST as $key => $val ) {
			$do_swm_include = true;
			if ( substr( $key, 0, 4 ) == 'smw_' ) {
				// try attribute
				$swmTitle = Title::newFromText( substr( $key, 4 ), SMW_NS_PROPERTY );
				if ( $swmTitle->exists() ) {
					// make sure the semantic is not empty:
					if ( trim( $val ) != '' ) {
						// @@todo update for other smw types:
						if ( $swmTitle->getDBkey() == 'Spoken_By' ) {
							$wpTextbox1 = "[[" . $swmTitle->getText() . '::' . $val . ']] ' . $wpTextbox1;
						} else {
							$wpTextbox1 .= "\n\n[[" . $swmTitle->getText() . '::' . $val . ']]';
						}
					}
				}
			}
		}
		// add all categorizations:
		$catNStxt = $wgContLang->getNsText( NS_CATEGORY );
		foreach ( $_POST as $k => $v ) {
			if ( strpos( $k, 'ext_cat_' ) !== false ) {
				$wpTextbox1 .= "\n[[" . $catNStxt . ":" . $v . "]]";
			}
		}
		// add the text to the end after a line break to not confuse manual editors
		$editPageAjax = new MV_EditPageAjax( $Article );
		$editPageAjax->mvd_id = $mvd_id;

		// if preview just return the parsed preview
		// @@todo refactor to use as much EditPage code as possible or (switch over to the API)
		// use the "livePreview" functionality of Edit page.
		if ( isset( $_POST['wpPreview'] ) ) {
			// $out = $editPageAjax->getPreviewText();
			// $wgOut->addHTML($out);
			$mvTitle = new MV_Title( $wgRequest->getVal( 'title' ) );

			$parserOutput = $this->parse_format_text( $wpTextbox1, $mvTitle );

			$wgOut->addParserOutput( $parserOutput );
			return $wgOut->getHTML() . '<div style="clear:both;"><hr></div>';
		}

		if ( $editPageAjax->edit( $wpTextbox1 ) == false ) {
			if ( $mvd_id == 'new' ) {

				// get context info to position timeline element:
				$rt = ( isset( $_REQUEST['wgTitle'] ) ) ? $_REQUEST['wgTitle']:null;
				$this->get_overlay_context_from_title( $rt );

				// get updated mvd_id:
				$dbr = wfGetDB( DB_SLAVE );
				$result = & MV_Index::getMVDbyTitle( $titleKey, 'mv_page_id' );
				$mvd_id = $result->id;
				// update title key

				// purge cache for parent stream and MVD
				MV_MVD::onEdit( $this->mvd_pages, $mvd_id );

				// return Encapsulated (since its a new mvd)
				$returnEncapsulated = true;
			} else {
				// purge cache for parent stream
				MV_MVD::onEdit( $this->mvd_pages, $mvd_id );
			}
			if ( $returnEncapsulated ) {
				//print "get Encapsulated:\n";
				return php2jsObj( array( 'status' => 'ok',
						'mvd_id' => $mvd_id,
						'titleKey' => $titleKey,
						'fd_mvd' => $this->get_fd_mvd_request( $titleKey, $mvd_id, 'enclosed' ),
						'tl_mvd' => $this->get_tl_mvd_request( $titleKey, $mvd_id )
				) );
			} else {
				return $this->get_fd_mvd_request( $titleKey, $mvd_id );
			}
			// return "page saved successfully?";
		} else {
			// return "edit failed/ or preview? ";
			// $wgOut should have edit form with reported conflict, error or whatever
			return $wgOut->getHTML();
		}
	}
	function get_overlay_context_from_title( $contextTitle = null ) {
		global $mvDefaultStreamViewLength, $wgTitle;
		if ( !$contextTitle )$contextTitle = $wgTitle;
		$mvContextTitle = new MV_Title( $contextTitle );
		$mvContextTitle->setStartEndIfEmpty();
		$this->start_time = $mvContextTitle->getStartTimeSeconds();
		$this->end_time   = $mvContextTitle->getEndTimeSeconds();
		$this->duration   = $mvContextTitle->getDuration();
	}
	/* do the move @@todo this could be abstracted to extend special move page
	 * although special move_page is not very complex.
	 */
	 // very similar to SpecialMovepage.php doSubmit()
	function do_adjust_submit( $titleKey, $mvd_id, $newTitle, $contextTitle, $outputMVD = '' ) {
		global $wgOut, $mvgIP, $wgUser;
		// get context from MVStream request title:
		$this->get_overlay_context_from_title( $contextTitle );

		$this->reason = isset( $_REQUEST['wpSummary'] ) ? $_REQUEST['wpSummary']:wfMsg( 'mv_adjust_default_reason' );
		$this->moveTalk = true;
		$this->watch = false;

		// do the move:
		if ( $wgUser->pingLimiter( 'move' ) ) {
			$wgOut->rateLimited();
			return array( 'status' => 'error', 'error_txt' => $wgOut->getHTML() ) ;
		}

  		// we should only be adjusting MVD namespace items:
		$ot = Title::newFromText( $titleKey, MV_NS_MVD );
		$nt = Title::newFromText( $newTitle, MV_NS_MVD );
		// make sure the old title exist (what we are moving from)
		if ( !$ot->exists() ) {
			$wgOut->addHTML( '<p class="error">' . wfMsg( 'mv_adjust_old_title_missing', $ot->getText() ) . "</p>\n" );
			return array( 'status' => 'error', 'error_txt' => $wgOut->getHTML() );
		}

		// if the page we want to move to exists and starts with #REDIRECT override it
		if ( $nt->exists() ) {
			$ntArticle = new Article( $nt );
			$cur_text = $ntArticle->getContent();
			if ( substr( $cur_text, 0, strlen( '#REDIRECT' ) ) == '#REDIRECT' ) {
				// remove page (normal users can "delete mvd_pages if they are redirects)
				$ntArticle->doDelete( wfMsgForContent( 'mv_redirect_and_delete_reason' ) );
				// clear deletion log msg:
				$wgOut->clearHTML();
			}
		}

		# Delete to make way if requested (not dealt with for now)
		// if ( $wgUser->isAllowed( 'delete' ) && $this->deleteAndMove ) {
		//	$article = new Article( $nt );
			// This may output an error message and exit
		//	$article->doDelete( wfMsgForContent( 'delete_and_move_reason' ) );
		// }

		# don't allow moving to pages with # in
		if ( !$nt || $nt->getFragment() != '' ) {
			$wgOut->addWikiText( '<p class="error">' . wfMsg( 'badtitletext' ) . "</p>\n" );
			return array( 'status' => 'error', 'error_txt' => $wgOut->getHTML() );
		}
		$old_article = new Article( $ot );
		$this->preMoveArtileText = $old_article->getContent();
		unset( $old_article );

		// @@todo we should really just remove the old article (instead of putting a redirect there)
		$error = $ot->moveTo( $nt, true, $this->reason );


		if ( $error !== true ) {
			$wgOut->addWikiText( '<p class="error">' . wfMsg( $error ) . "</p>\n" );
			return array( 'status' => 'error', 'error_txt' => $wgOut->getHTML() );
		} else {
			/*print "mw.log('should have moved the page');\n";
			print "mw.log('new page title: ".$nt->getText()."');\n";
			//clear cache for title:
			//$nt->invalidateCache();
			//Article::onArticleEdit($nt);
			wfDoUpdates( 'commit' );
			//try again:
			$newTitle = Title::newFromText($nt->getText(), MV_NS_MVD);
			$na = new Article($newTitle);
			print "mw.log('new page content: " .$na->getContent() . "');\n";
			*/
		}
		//wfRunHooks( 'SpecialMovepageAfterMove', array( &$this , &$ot , &$nt ) )	;

		$ott = $ot->getTalkPage();
		if ( $ott->exists() ) {
			if ( $this->moveTalk && !$ot->isTalkPage() && !$nt->isTalkPage() ) {
				$ntt = $nt->getTalkPage();

				# Attempt the move
				$error = $ott->moveTo( $ntt, true, $this->reason );
				if ( $error === true ) {
					$talkmoved = 1;
					// wfRunHooks( 'SpecialMovepageAfterMove', array( &$this , &$ott , &$ntt ) )	;
				} else {
					$talkmoved = $error;
				}
			} else {
				# Stay silent on the subject of talk.
				$talkmoved = '';
			}
		} else {
			$talkmoved = 'notalkpage';
		}
		# Deal with watches
		if ( $this->watch ) {
			$wgUser->addWatch( $ot );
			$wgUser->addWatch( $nt );
		} else {
			$wgUser->removeWatch( $ot );
			$wgUser->removeWatch( $nt );
		}
		// purge cache of parent stream & mvd_node:
		MV_MVD::onEdit( $this->mvd_pages, $mvd_id );
		// MV_MVD::onMove($this->mvd_pages, $mvd_id, $newTitle);
		// MV_MVD::disableCache($this->mvd_pages, $mvd_id);

		// $tsTitle = Title::newFromText( $newTitle, MV_NS_MVD);
		// print "mw.log('titleDB: ".$tsTitle->getDBkey() ."');\n";
		/*if($tsTitle->exists()){
			print "mw.log('{$tsTitle->getDBkey()}  present:');\n";
		}else{
			print "mw.log('{$tsTitle->getDBkey()}  not present');\n";
		}*/

		# return the javascript object (so that the inteface can update the user)
		// get_fd_mvd_request($titleKey, $mvd_id, $mode='inner', $content='')
		return array( 'status' => 'ok',
						'error_txt' => $wgOut->getHTML(),
						'mv_adjust_ok_move' => wfMsg( 'mv_adjust_ok_move' ),
						'titleKey' => $newTitle,
						'tl_mvd' => $this->get_tl_mvd_request( $newTitle, $mvd_id )
			);
	}
	function get_edit_disp( $titleKey, $mvd_id = 'new', $ns = MV_NS_MVD ) {
		global $mvgIP, $wgOut, $wgScriptPath, $wgUser, $wgTitle, $mvMetaDataHelpers;

		$mvd_type = strtolower( array_shift( split( ':', $titleKey ) ) );
		// print "new article title: " . 	$titleKey;
		$wgTitle = Title::newFromText( $titleKey, $ns );
		// make a title article with global title:
		$Article = new Article( $wgTitle );
		// make the ediPageajax obj

		$editPageAjax = new MV_EditPageAjax( $Article );


		$customPreEditHtml = $this->get_adjust_disp( $titleKey, $mvd_id );

		// add custom data helpers if editing annotative layer:
		if ( $mvd_type == 'anno_en' ) {
			$editPageAjax->setBasicHtml( $this->get_dataHelpers( $titleKey, $mvd_id ) );
			// don't display "advanced" edit
			$editPageAjax->display_advanced_edit = 'none';
		}

		// add in adjust code & hidden helpers
		$editPageAjax->setAdjustHtml(  $customPreEditHtml	);
		// set ts id:
		$editPageAjax->mvd_id = $mvd_id;

		// fill wgOUt with edit form:
		$editPageAjax->edit();
		return $wgOut->getHTML();
		// @@todo base edit display off of template (some how?)
		// special structure for editing type ht_en
	}

	function get_history_disp( $titleKey, $mvd_id ) {
		global $mvgIP, $wgOut;
		$title = Title::newFromText( $titleKey, MV_NS_MVD );
		$article = new Article( $title );
		$pageHistoryAjax = new HistoryPage( $article );
		// @@todo fix problems... ajax action url context !=history url context
		// so forming urls for links get errors
		$pageHistoryAjax->history();
		return $wgOut->getHTML();
	}
	function get_disp_remove_mvd( $titleKey, $mvd_id ) {
		 global $wgOut;
		 $title = Title::newFromText( $titleKey, MV_NS_MVD );
		 $article = new MV_DataPage( $title );
		 $article->delete();
		 return $wgOut->getHTML();
	}
	function do_remove_mvd( $titleKey, $mvd_id ) {
		global $wgOut;
		$title = Title::newFromText( $titleKey, MV_NS_MVD );
		$article = new Article( $title );
		// purge parent article:
		MV_MVD::onEdit( $this->mvd_pages, $mvd_id );
		// run the delete function:
		$article->doDelete( $_REQUEST['wpReason'] );
		// check if delete
		if ( $article->exists() ) {
			return  php2jsObj( array( 'status' => 'error',
									'error_txt' => $wgOut->getHTML() ) );
		} else {
			return  php2jsObj( array( 'status' => 'ok' ) );
		}
	}
	function getStyleOverride() {
		if ( $this->mv_interface->smwProperties['playback_resolution'] != null ) {
			@list( $width, $height ) = explode( 'x', $this->mv_interface->smwProperties['playback_resolution'] );
			if ( isset( $width ) && isset( $height ) ) {
				if ( is_numeric( $width ) && is_numeric( $height ) ) {
					// offset in refrence to mv_custom.css
					$width += 2;
					$height += 30;
					$left = $width + 10 + 30;
					return 'style=\"left:' . htmlspecialchars( $left ) . 'px;"';
				}
			}
		}
		return '';
	}
 }
// base class mvd_page
// @@todo re-factor some functions that run on (mvd_page) to methods a MV_MVD obj
class MV_MVD {
	/*actions for mvd page edits */
	function onEdit( &$mvd_pages_cache, $mvd_id ) {
		// force update local mvd_page_cache from db:
		$mvd_pages_cache[$mvd_id] = MV_Index::getMVDbyId( $mvd_id );

		$stream_name = MV_Stream::getStreamNameFromId( $this->mvd_pages[$mvd_id]->stream_id );
		$streamTitle = Title::newFromText( $stream_name, MV_NS_STREAM );
		// clear the cache for the parent stream page:
		// print "clear parent stream: " . $streamTitle ."\n";
		Article::onArticleEdit( $streamTitle );

	}
	// updates the current version cached version of mvd
	function onMove( &$mvd_pages_cache, $mvd_id ) {
	//	if(!isset($mvd_pages_cache[$mvd_id]))
	//		$mvd_pages_cache[$mvd_id] = MV_Index::getMVDbyId($mvd_id);
	}
	/*function disableCache($mvd_id){
		if(!isset($mvd_pages_cache[$mvd_id]))
			$mvd_pages_cache[$mvd_id] = MV_Index::getMVDbyId($mvd_id);
		$mvd_pages_cache[$mvd_id]->usePCache=false;
	}*/
}
function mvParsePropertiesCallback( $maches ) {
	global $mvMatchesSST, $mv_smw_tag_arry;
	$mv_smw_tag_arry[$maches[2]] = $maches[3];
	// @@todo not all semantic tags need not be striped
	// replace the semantic tag with an empty string:
	return '';
}
