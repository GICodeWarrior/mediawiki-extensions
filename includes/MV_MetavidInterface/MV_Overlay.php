<?php
/*
 * Created on Jun 28, 2007
 *
 * All Metavid Wiki code is Released Under the GPL2
 * for more info visit http:/metavid.ucsc.edu/code
 */
if ( !defined( 'MEDIAWIKI' ) )  die( 1 );
 
 class MV_Overlay extends MV_Component{
 	/*init function should load the target overlay*/
 	//set up defaults: 
 	var $req = 'stream_transcripts'; 
 	/*structures the component output and call html code generation */
 	function getHTML(){ 	 		
 		switch($this->req){
 			case 'stream_transcripts':
 				$this->do_stream_transcripts();
 			break;
 			case 'Recentchanges':
 				$this->do_Recentchanges();
 			break;
 		}
	}
	//renders recent changes in the MVD namespace 
	function do_Recentchanges(){
		global $wgOut;
		//quick and easy way: 
		$wgOut->addWikiText('{{Special:Recentchanges/namespace='.MV_NS_MVD.'}}');
	}
	function do_stream_transcripts(){
		global $wgOut;
		$this->load_transcripts();
		$out='';
		//set up left hand side timeline
		$wgOut->addHTML('<div id="mv_time_line" style="float:left;background:#DDDDDD;width:2em;height:95%;overflow:hidden;">' . 
					$this->get_video_timeline() .
				'</div>');
		$wgOut->addHTML("<div id=\"mv_fd_mvd_cont\" style=\"position:relative;height:95%;width:98%;margin:4px;overflow:auto;\">");
			$wgOut->addHTML("<div id=\"mv_add_new_mvd\" style=\"display:none;\"></div>");			
			$this->get_transcript_pages();
		$wgOut->addHTML("</div>");
	}
	function render_menu(){
		$base_title='';
		//set the base title to the stream name: 
		if(isset($this->mv_interface->article->mvTitle)){
			$base_title = $this->mv_interface->article->mvTitle->getStreamName();
		}
		return '<a title="'.wfMsg('mv_search_stream_title').'" href="javascript:mv_tool_disp(\'search\')">'.wfMsg('mv_search_stream').'</a>' .
			' | ' .	'<a title="'.wfMsg('mv_new_ht_en').'" href="javascript:mv_disp_add_mvd(\'ht_en\')">'.wfMsg('mv_new_ht_en').'</a>' . 
			' | ' . '<a href="javascript:mv_disp_add_mvd(\'anno_en\')">'.wfMsg('mv_new_anno_en').'</a>';
	}
	/* output caption div links */ 
	function get_video_timeline(){
		$out='';
		//set up variables with exported vars in $this object
		$start_str 	=$this->mv_interface->article->mvTitle->getStartTime();
		$end_str	=$this->mv_interface->article->mvTitle->getEndTime();
		$this->start_time = $this->mv_interface->article->mvTitle->getStartTimeSeconds();
		$end_time 	= $this->mv_interface->article->mvTitle->getEndTimeSeconds();
		$this->duration = $end_time-$this->start_time;		
		foreach($this->mvd_pages as & $mvd_page){
				$out.=$this->get_timeline_html($mvd_page);
		}
		//output the time stamps: 
		/*$out.='<div style="position:absolute;top:0%;z-index:2;background:#FFFFFF;font-size:x-small">';
		$out.=$start_str;
		$out.='</div>';	
		$out.='<div style="position:absolute;top:100%;z-index:2;background:#FFFFFF;font-size:x-small">';
		$out.=$end_str;
		$out.='</div>';*/	
		return $out;
	}
	function load_transcripts(){
		global $mvgIP;
		require_once($mvgIP . '/includes/MV_Index.php');
		$dbr =& wfGetDB(DB_SLAVE);	
		$result = & MV_Index::getMVDInRange($this->mv_interface->article->mvTitle->getStreamId(), 
							$this->mv_interface->article->mvTitle->getStartTimeSeconds(), 
							$this->mv_interface->article->mvTitle->getEndTimeSeconds() );													
		if($dbr->numRows($result) == 0){
			$this->mvd_pages=array();	
		}else{
			while($row = $dbr->fetchObject($result)){
				$this->mvd_pages[$row->id]=$row;
			}
		}
	}
	/*functions for transcript pages*/
	//@@TODO OPTIMIZATION: (group article text queries) 
	function get_transcript_pages(){
		global $wgUser, $mvgIP, $wgOut;		
		$sk = $wgUser->getSkin();
		
		$out='';
		if(count($this->mvd_pages)==0){
			$out= 'no mvd rows found';	
		}else{			
			foreach($this->mvd_pages as $mvd_id => $mvd_page){
				$this->get_fd_mvd_page($mvd_page);	
			}
		}
	}
	function get_fd_mvd_page(&$mvd_page, $content=''){
		global $wgOut;
		//"<div id=\"mv_ctail_{$mvd_page->id}\" style=\"position:relative\">"
		$img_url = MV_StreamImage::getStreamImageURL($mvd_page->stream_id, $mvd_page->start_time, 'medium', true); 
		$wgOut->addHTML("<fieldset class=\"mv_fd_mvd\" style=\"background:#".$this->getMvdBgColor($mvd_page)."\" " .
					"id=\"mv_fd_mvd_{$mvd_page->id}\" name=\"{$mvd_page->wiki_title}\" " .
					"image_url=\"{$img_url}\" >" );
		/* (mouse over added by jQuery now)
		 * "onmouseover=\"mv_fdOver('{$mvd_page->id}')\" " .
					"onmouseout=\"mv_fdOut('{$mvd_page->id}')\" 
		 */ 
		$wgOut->addHTML("<legend id=\"mv_ld_{$mvd_page->id}\">" .  
				$this->get_mvd_menu($mvd_page) . 
				"</legend>");			
		$wgOut->addHTML("<div id=\"mv_fcontent_{$mvd_page->id}\">");
		if($content==''){				
			$this->get_article_html($mvd_page);
		}else{
			$wgOut->addHTML($content);
		}			
		$wgOut->addHTML("</div>\n");
		$wgOut->addHTML("</fieldset>");		
	}
	function get_tl_mvd_request($titleKey, $mvd_id){
		global $mvgIP;
		if(!isset($this->mvd_pages[$mvd_id])){			
			$this->mvd_pages[$mvd_id] = MV_Index::getMVDbyTitle($titleKey);
		}
		return $this->get_timeline_html($this->mvd_pages[$mvd_id]);
	}
	function get_fd_mvd_request($titleKey, $mvd_id, $mode='inner'){
		global $wgOut;			
		$this->mvd_pages[$mvd_id] = MV_Index::getMVDbyTitle($titleKey);		
		if($mode=='inner'){
			$this->get_article_html($this->mvd_pages[$mvd_id]);
		}else if($mode=='enclosed'){
			$this->get_fd_mvd_page($this->mvd_pages[$mvd_id]);
		}
		return $wgOut->getHTML();
	}
	function get_timeline_html(&$mvd_page){							
		$out= '<div id="mv_tl_mvd_'.$mvd_page->id.'" ' .			
			'class="mv_timeline_mvd_jumper" '.
			'title="'.wfMsg('mv_play').seconds2ntp($mvd_page->start_time).'" '. 
			/*
			 * time_line actions added by jQuery
			'onmouseover="mv_mvd_tlOver(\''.$mvd_page->id.'\')" '.
			'onmouseout="mv_mvd_tlOut(\''.$mvd_page->id.'\')" '.			
			'onmouseup="mv_do_play()" ' . 			
			*/
			'style="position:absolute;background:#'.$this->getMvdBgColor($mvd_page).';'.
			'width:2em;';
		//check if duration is set (for php calculation of height position)
		if($this->duration){			
			$page_duration = $mvd_page->end_time - $mvd_page->start_time;			
			$height_perc =round(100*($page_duration/ $this->duration), 2);
		
			if( $mvd_page->start_time==0){
				$loc_perc=0;
			}else{
				//multiply by 94 to keep things inbounds
				$loc_perc = round(94*( ($mvd_page->start_time-$this->start_time) / $this->duration ));
			}
			//make sure we don't go out of range:
			if( ($height_perc+$loc_perc) > 94 ){
				$height_perc = 94-$loc_perc;
			}  
			if($loc_perc<0)$loc_perc=0;
			$out.='height:'.$height_perc.'%;'.
				  'top:'.$loc_perc.'%"></div>'."\n";
		}else{
			//don't include height and top information (javascript will position it)
		}
		return $out;
	}
	function get_article_html(&$mvd_page){
		global $wgOut;		
		$mvdTile = Title::makeTitle(MV_NS_MVD, $mvd_page->wiki_title );		
		
		//print "js_log('titleDB: ".$tsTitle->getDBKey() ."');\n";
		if($mvdTile->exists()){	
			//grab the article text:
			$curRevision = Revision::newFromTitle($mvdTile);			
			$wikiText = $curRevision->getText();
		}else{
			if(isset($this->preMoveArtileText)){
				$wikiText = & $this->preMoveArtileText; 				 
			}else{
				//print "error article: "	.  $mvd_page->wiki_title . " not there \n";
				print "js_log('missing: " .$mvd_page->wiki_title."');\n";
				return ;				
			}						
		}		
		$mvdTile = new MV_Title( $mvd_page->wiki_title );			
		
		$this->parse_format_text($wikiText, $mvdTile);				
					
	}
	function parse_format_text($text, &$mvdTile){
		global $wgOut;
		$template_key='';			
		if(is_object($mvdTile))$template_key = $mvdTile->getMvdTypeKey();
		//$wgOut->addHTML('looking at: ' . strtolower($template_key));
		switch(strtolower($template_key)){
			case 'ht_en':			
				$templetTitle = Title::makeTitle(NS_TEMPLATE, $template_key );	
				if($templetTitle->exists()){	
					$smw_attr = $this->get_and_strip_semantic_tags($text);			
					$template_wiki_text = '{{'.$template_key."|\n";		
					
					//@@todo lookup with attributes
					if(isset($smw_attr['Spoken By'])){
						$template_wiki_text.= '|PersonName='.$smw_attr['Spoken By']."\n";
					}
					$template_wiki_text.='|BodyText='.$text."\n".
					'}}';
					$wgOut->addWikiText($template_wiki_text);
					return ;
				}			
			break;
			case 'anno_en':
				global $wgParser, $wgUser, $wgTitle, $wgContLang;
				$sk =& $wgUser->getSkin();
								
				//run via parser to add in Category info: 
				$parserOptions = ParserOptions::newFromUser( $wgUser );
				$parserOptions->setEditSection( false );
				$parserOptions->setTidy(true);
				$parserOutput = $wgParser->parse( $text , $mvdTile, $parserOptions );
				$wgOut->addCategoryLinks( $parserOutput->getCategories() );
				$wgOut->addHTML( $parserOutput->mText );
				$wgOut->addHTML( $sk->getCategories() );
				//empty out the categories
				$wgOut->mCategoryLinks = array();							
			break;
			default:
				$wgOut->addHTML(' of type: ' . $template_key);
				//if nothing else add text directly:
				$wgOut->addWikiText($text);
			break;
		}						
	}
	function get_add_disp($baseTitle, $mvdType, $time_range){
		global $wgUser, $wgOut, $mvDefaultClipLength,$mvMVDTypeKeys, $wgRequest;					
		
		list( $this->start_context, $this->end_context) = split('/', $time_range);
		//first make sure its a valid mvd_type 
		if(!in_array($mvdType, $mvMVDTypeKeys))return;
			# Or we could throw an exception:
			#throw new MWException( __METHOD__ . ' called invalid mvdType.' );		
		
		$mvd_page = new mvd_pageObj();
		$mvd_page->id = 'new';
		
		//print 'st ' . $this->start_context . "<br>" ;		
		//$mvd_page->start_time = $start_context; //seconds2ntp(0);		
 		//$mvd_page->end_time  = seconds2ntp( ntp2seconds($start_context) +  $mvDefaultClipLength);
 		$mvd_page->wiki_title = $mvdType.':'. strtolower($baseTitle).'/_new';
		$this->get_edit_disp($mvd_page->wiki_title,'new');		
 				
		
		return $wgOut->getHTML();
		
		//make temporary unique "new" mvd title: (for now default to ht_en 
		//but in the future default to no template type and let the user select) 
				
		//$wgTitle = Title::newFromText($titleKey, MV_NS_MVD);
		
		
		//make a "new" mvd:
		//$mvd_page = new mvd_pageObj();
		//$mvd_page->id = 'new';
		//$mvd_page->start_time = seconds2ntp(0);
 		//$mvd_page->end_time  = seconds2ntp($mvDefaultClipLength);
		//$mvd_page->wiki_title = 'Ht_en:' . $baseTitle.'_'.rand(0,99999).'/'.	$mvd_page->start_time . '/' . $mvd_page->end_time;				
				
		//$this->get_edit_disp($mvd_page->wiki_title,'new');
		//clear out html:
		//$wgOut->clearHTML();

		//get encapsulated mvd: 
		//$this->get_fd_mvd_page($mvd_page, $edit_html);
		
		//get the edit page code:			
	}
	/*return transcript menu*/
	function get_mvd_menu(&$mvd_page){		
		global $wgUser;		
		$sk = $wgUser->getSkin();
		
		$out='';
		//set up links:
		$plink = '';
		$elink = '<a title="'.wfMsg('mv_edit_adjust_title').'" href="javascript:mv_edit_disp(\''.$mvd_page->wiki_title.'\', \''.$mvd_page->id.'\')">'.wfMsg('mv_edit').'</a>';
		//$alink = '<a title="'.wfMsg('mv_adjust_title').'" href="javascript:mv_adjust_disp(\''.$mvd_page->wiki_title.'\', \''.$mvd_page->id.'\')">'.wfMsg('mv_adjust').'</a>';
		
		//print "wiki title: " . $mvd_page->wiki_title;
		$hTitle = Title::newFromText($mvd_page->wiki_title, MV_NS_MVD);
		//print $hTitle->
		$hlink =  $sk->makeKnownLinkObj($hTitle,wfMsg('mv_history'),'action=history'); 		
		$dTitle =  Title::newFromText($mvd_page->wiki_title, MV_NS_MVD_TALK);
		$dlink = $sk->makeKnownLinkObj($dTitle,  wfMsg('talk') );
			
		$plink='<a title="'.wfMsg('mv_play').' '.seconds2ntp($mvd_page->start_time) . ' to ' . seconds2ntp($mvd_page->end_time).' " ' .
				'style="font-weight:bold;color:#000" ' .		
				'href="javascript:mv_do_play();">'. seconds2ntp($mvd_page->start_time) . ' to ' . seconds2ntp($mvd_page->end_time).'</a>';
		
		//@@TODO set up conditional display: (view source if not logged on, protect, remove if given permission)  
		$out.=$plink;
		$out.="| $elink | $hlink | $dlink ";
		if($wgUser->isAllowed('mv_delete_mvd')){
			$rlink = '<a title="'.wfMsg('mv_remove_title').'" href="javascript:mv_disp_remove_mvd(\''.$mvd_page->wiki_title.'\', \''.$mvd_page->id.'\')">'.wfMsg('mv_remove').'</a>'; 
			$out.=' | ' .  $rlink;
		}
		return $out;
	}
	/*
	 * generate soft colors vi page ids (we use ids so that page moves don't change the color')
	*/
	function getMvdBgColor(& $mvd_page){
		if(!isset($mvd_page->color)){
			$color = substr(md5($mvd_page->id), 0, 6);
			//make the color soft (dont include low values)
			$soft=array('A','B','C','D','E','F');
			for($i=0;$i<strlen($color);$i++){
				if(is_numeric($color[$i])){					
					$color[$i]=$soft[ceil($color[$i]/2)];
				}else{
					$color[$i]=strtoupper($color[$i]);
				}
			}		
			$mvd_page->color=$color;
		}
		return $mvd_page->color;
	}
	/*STATIC Functions */ 
	function get_and_strip_semantic_tags(&$text){
		global $mv_smw_tag_arry;
		//taken from semantic wiki smwfParserHook function:
		$semanticLinkPattern = '(\[\[(([^:][^]]*):[=|:])+((?:[^|\[\]]|\[\[[^]]*\]\]|\[[^]]*\])*)(\|([^]]*))?\]\])';
		$mv_smw_tag_arry = array();
		$text = preg_replace_callback($semanticLinkPattern, 'mvParsePropertiesCallback',$text);
		return $mv_smw_tag_arry;
	}	
	function auto_complete_person($val){
		$dbr =& wfGetDB(DB_SLAVE);		
		//check against anybody in category 'Person' do an or for case insensitivity
        //@@TODO look into a mysql way to correlate in a non case sensitive manner
        $val = ucfirst($val);
		$result = $dbr->select( 'categorylinks', 'cl_sortkey', 
			array('cl_to'=>'Person', 
			'`cl_sortkey` LIKE \'%'.mysql_escape_string($val).'%\''),
			__METHOD__,
			array('LIMIT'=>'5'));
		//print "ran: " . $dbr->lastQuery();
		if($dbr->numRows($result) == 0)return '';
		//$out='<ul>'."\n";
		$out='';
		while($row = $dbr->fetchObject($result)){
			$person_name = $row->cl_sortkey;
			//make sure the person page exists: 
			$personTitle = Title::makeTitle(NS_MAIN, $person_name);
			if($personTitle->exists()){
				//get person full name from semantic table if available
				$person_result = $dbr->select('smw_attributes', 'value_xsd', array('attribute_title'=>'Full_Name',
										'subject_title'=>$personTitle->getDBKey()),
										__METHOD__);
				if($dbr->numRows($person_result)== 0){
					$person_full_name = $person_name;
				}else{
					$pvalue = $dbr->fetchObject($person_result);
					$person_full_name = $pvalue->value_xsd;
				}
				//bold the part of the selected title 
				$person_full_name = str_replace($val, '<b>'.$val.'</b>', $person_full_name);
				//if we have a image toss that in there too 				
				$imgHTML='';
				$imgTitle = Title::makeTitle(NS_IMAGE, $person_name.'.jpg');
				if($imgTitle->exists()){
					$img= wfFindFile($imgTitle);
					if ( !$img ) {
						$img = wfLocalFile( $imgTitle );										
					}										
				}else{
					$imgTitle = Title::makeTitle(NS_IMAGE, MV_MISSING_PERSON_IMG);
					$img= wfFindFile($imgTitle);	
				}
				//$imgHTML="<img src=\"{$img->getURL()}\" width=\"44\">";
				$out.=  $person_name.'|'.$person_full_name .'|'.$img->getURL() . "\n";
				//$out.="<li name=\"{$person_name}\"> $imgHTML $person_full_name</il>\n";
			} 			
		}
		//$out.='</ul>';
		//return people people in the Person Category
		return $out;
	}
	function get_adjust_disp($titleKey='new', $mvd_id='new', $disp_buttons=true){
		global $mvgScriptPath;		//
		$out='';
		//some good old fasioned variable overloading: 
		if($mvd_id=='new'||$mvd_id=='seq'){
			global $mvDefaultClipLength;	
			//$out.='start context: ' .$this->start_context . '<br>';
			//$out.='end context: ' .$this->end_context . '<br>';		
			$start_time = isset($this->start_context)?$this->start_context:seconds2ntp(0);
 			$end_time  = isset($this->end_context)?
	 			seconds2ntp( ntp2seconds($this->start_context)+$mvDefaultClipLength):
	 			seconds2ntp($mvDefaultClipLength);
	  		//$mvd_type = '';	  
		}else{			
	  		$mvTitle = new MV_Title($titleKey);
	  		if(!$mvTitle->validRequestTitle()){
	  			return wfMsg('mvMVDFormat');
	  		}
	  		$start_time = $mvTitle->getStartTime();
	  		$end_time = $mvTitle->getEndTime();
	  		//$mvd_type = $mvTitle->getMvdTypeKey();
		}
  		  	
		/*
		 * @@todo move some of this to CSS
  		 */
		$out.= ' 
	<span id="mv_adjust_msg_'.$mvd_id.'"></span> 
	<table style="background:transparent;position:relative" width="94%" border="0"><tr><td width="40">
<span id="track_time_start_'.$mvd_id.'" style="font-size:small">0:00:00</span>
</td><td>' .
'<div id="container_track_'.$mvd_id.'" style="width:100%; height: 5px; background-color: rgb(170, 170, 170); border:1px solid black; position: relative">';
	//add some overlays to make the track look like it ends/starts at 0+-7px  
	$out.='<div style="position:absolute;left:0px;width:7px;height: 5px;background-color: white;border-right:1px solid black;"></div>' .
		  '<div style="position:absolute;right:0px;width:7px;height: 5px;background-color: white;border-left:1px solid black;"></div>';
	//the reszie div structure: 
	$out.='<div id="resize_'.$mvd_id.'" style="height: 20px; position: absolute;">
		<div id="handle1_'.$mvd_id.'" style="background:no-repeat url(\''.$mvgScriptPath.'/skins/images/slider_handle_green.gif\')"; class="ui-resizable-w ui-resizable-handle"></div>	
		<div id="handle2_'.$mvd_id.'" style="background:no-repeat url(\''.$mvgScriptPath.'/skins/images/slider_handle_red.gif\')"; class="ui-resizable-e ui-resizable-handle"></div>	
		<div id="dragSpan_'.$mvd_id.'" class="ui-dragSpan"></div>		
	</div>
</div>'.
//'<input type="hidden" id="wpPreview_stop_msg_' .$mvd_id.'" value="'.wfMsg('mv_adjust_preview_stop').'">'.
// style="background: red url(\''.$mvgScriptPath.'/skins/mv_embed/images/slider_handle.gif\')"
  /*<div id="track_'.$mvd_id.'" style="width:100%;background-color: rgb(170, 170, 170); height: 5px; position: relative;">
    <div class="" id="handle1_'.$mvd_id.'" style="cursor: move;position:absolute;background-color:#5f5;height:20px;z-index:3">&nbsp;</div>
    <div class="" id="handle2_'.$mvd_id.'" style="cursor: move;position:absolute;background-color:#f55;height:20px;z-index:3">&nbsp;</div>
	<div class="" id="selected_'.$mvd_id.'" style="position:absolute;background-color:#55f;height:10px;z-index:1;overflow:hidden"></div>
  </div>*/
'</td><td width="50">
<span id="track_time_end_'.$mvd_id.'" style="font-size:small">0:00:00</span>
	</td></tr></table>
  <br>';
  		//output a dummy form 
		/*$out.='<form class="mv_css_form" id="mvd_adj_form_'.$mvd_id.'" method="GET" action="" ' . 
			'onSubmit="mv_adjust_submit(\''.$mvd_id.'\');return false;">';*/
	
		$out.='<span style="float:left;"><label class="mv_css_form" for="mv_start_hr_'.$mvd_id.'"><i>'.wfMsg('mv_start_desc').':</i></label> ' . 
			'<input class="mv_adj_hr" size="8" maxlength="8" value="'.$start_time.'" id="mv_start_hr_'.$mvd_id.'" name="mv_start_hr_'.$mvd_id.'">' .
			'</span>';
		
		$out.='<span style="float:left;"><label class="mv_css_form" for="mv_end_hr_'.$mvd_id.'"><i>'.wfMsg('mv_end_desc').':</i></label> ' . 
			'<input class="mv_adj_hr" size="8" maxlength="8" value="'.$end_time.'" id="mv_end_hr_'.$mvd_id.'" name="mv_end_hr_'.$mvd_id.'">' .
			'</span>';
			
		//output page text (if not "new")
		//if($mvd_id!='new')
		//	$out.=$this->get_fd_mvd_request( $titleKey, $mvd_id);
		
		/*$out.='<table width="100%">'.
		'<tr><td>'.wfMsg('mv_start_desc').'</td>'.
		'<td><input name="mv_start_hr_'.$mvd_id.'" type="text" value=""></td>'.
		'</tr><tr>'.
		'<input type="text" value=""><br>
		*/
		//clear any floats:
		$out.='<div style="clear:both"></div>';
		//not used now that adjust is integrated with edit:
		/*if($disp_buttons){
			$out.='<input style="font-weight:bold;" type="submit" value="'.wfMsg('mv_adjust_submit').'"> ';
			$out.='<input id="mv_adjust_preview_'.$mvd_id.'" type="button" value="'.wfMsg('mv_adjust_preview').'" onClick="mv_adjust_preview(\''.$mvd_id.'\')"> ';
			$out.='<input type="hidden" id="mv_adjust_preview_stop_'.$mvd_id.'" value="'.wfMsg('mv_adjust_preview_stop').'">';	
			$out.= '<a href="javascript:mv_disp_mvd(\''.$titleKey. '\',\''.
						 $mvd_id.'\');return false;">' . wfMsgExt('cancel', array('parseinline')).'</a>';
		}*/
		//$out.='</form>';
  		return $out;
	}
	//function do_add_mvd(){
		//$result_txt = $this->do_edit_submit($_REQUEST['title'], 'new');
		/*$start = $_REQUEST['mv_start_hr_new'];
		$end = $_REQUEST['mv_end_hr_new'];
		$title = substr($_REQUEST['title'],0,strpos($_REQUEST['title'],'/')).'/'.$start.'/'.$end;
		print "title: " . 		$title;
		$wgTitle = Title::newFromText($title, MV_NS_MVD);
		$Article = new Article($wgTitle);*/		
	//}
	
	/*@@TODO document */
	function do_edit_submit($titleKey, $mvd_id){
		global $wgOut, $wgScriptPath, $wgUser, $wgTitle, $wgRequest;			
		
		if($mvd_id=='new'){
			$titleKey =substr($_REQUEST['title'],0,strpos($_REQUEST['title'],'/')).
				'/'.$_REQUEST['mv_start_hr_new'].'/'.$_REQUEST['mv_end_hr_new'];
		}
		
		//set up the title /article
		$wgTitle = Title::newFromText($titleKey, MV_NS_MVD);
		$Article = new Article($wgTitle);
		
		//add all semantic form based attributes/relations to the posted body text
		foreach($_POST as $key=>$val){
			$do_swm_include=true;
			if(substr($key, 0, 4)=='smw_'){
				//try attribute		
				$swmTitle = Title::newFromText(substr($key, 4), SMW_NS_PROPERTY);
				if(!$swmTitle->exists()){					
					$do_swm_include=false;
				}				
				if($do_swm_include){
					//make sure the person is not empty: 
					if(trim($val)!=''){
						$_REQUEST['wpTextbox1']=trim($_REQUEST['wpTextbox1']).
						"\n\n[[".$swmTitle->getText().'::'.$val.'| ]]';
					}
				}
			}
		}
		$editPageAjax = new MV_EditPageAjax( $Article);
		$editPageAjax->mvd_id = $mvd_id;	
		
		//if preview just retun the parsed preview 
		//@@todo refactor to use as much EditPage code as possible
		// use the "livePreview" functionality of Edit page. 
		if(isset($_POST['wpPreview'])){
			//$out = $editPageAjax->getPreviewText();
			//$wgOut->addHTML($out);			
			$mvTitle = new MV_Title($_REQUEST['title']);
				
			$this->parse_format_text($_REQUEST['wpTextbox1'], $mvTitle);				
			return $wgOut->getHTML() . '<div style="clear:both;"><hr></div>';
		}	
						
		if($editPageAjax->edit()==false){
			if($mvd_id=='new'){
				//get context info to position timeline element: 
				$this->get_overlay_context_from_title();

				//get updated mvd_id: 				
				$dbr =& wfGetDB(DB_SLAVE);
				$result = & MV_Index::getMVDbyTitle($titleKey, 'id');			
				$mvd_id = $result->id;															
				
				//return $this->get_fd_mvd_request($titleKey, $mvd_id, 'enclosed');
				return php2jsObj(array('status'=>'ok',	
						'mvd_id'=>$mvd_id,						
						'titleKey'=>$titleKey,
						'fd_mvd'=>$this->get_fd_mvd_request($titleKey, $mvd_id,'enclosed'),
						'tl_mvd'=>$this->get_tl_mvd_request($titleKey, $mvd_id) 
				));	
			}else{
				return $this->get_fd_mvd_request($titleKey, $mvd_id);
			}
			//return "page saved successfully?";
		}else{			
			//return "edit failed/ or preview? ";
			//$wgOut should have edit form with reported conflict, error or whatever
			return $wgOut->getHTML();
		}							
	}
	function get_overlay_context_from_title($contextTitle=null){
		global $mvDefaultStreamViewLength, $wgTitle;
		if(!$contextTitle)$contextTitle=$wgTitle;
		$parts =  explode('/',$contextTitle);
		if(count($parts)==3){
			$this->start_time=$parts[1]; 
			$this->end_time=$parts[2];
		}else{
			global $mvDefaultStreamViewLength;
			$this->start_time=seconds2ntp(0);
 			$this->end_time = seconds2ntp($mvDefaultStreamViewLength);
		}
		$this->duration = ntp2seconds($this->start_time) - ntp2seconds($this->end_time);
		
	}
	/* do the move @@todo this could be abstracted to extend special move page
	 * although special move_page is not very complex. 
	 */
	 //very similar to SpecialMovepage.php doSubmit()
	function do_adjust_submit($titleKey, $mvd_id, $newTitle, $contextTitle){
		global $wgOut, $mvgIP, $wgUser;		
		//print "do_adjust_submit move to: $newTitle \n";
		//get context from MVStream request title:
		$this->get_overlay_context_from_title($contextTitle);
		//forced values (@@todo integrate into adjust form input) 
		
		$this->reason =isset($_REQUEST['wpSummary'])?$_REQUEST['wpSummary']:wfMsg('mv_adjust_default_reason');
		$this->moveTalk = true;
		$this->watch = false;
		
		//do the move:
		if ( $wgUser->pingLimiter( 'move' ) ) {
			$wgOut->rateLimited();
			return php2jsObj(array('status'=>'error','error_txt'=>$wgOut->getHTML()));
		}
		//require_once($mvgIP . '/includes/MV_Title.php');		
		//make sure the new title is valid (not needed cuz move hook should check:)
		/*$mvTitle = new MvTitle($newTitle);
  		if(!$mvTitle->validRequestTitle()){
  			//print $newTitle;
  			$wgOut->addHTML( '<p class="error">' . wfMsg('mvMVDFormat') . "</p>\n" );
  			return php2jsObj(array('status'=>'error','error_txt'=>$wgOut->getHTML()));
  		}*/			
  		//we should only be adjusting MVD namespace items:
		$ot = Title::newFromText( $titleKey, MV_NS_MVD);
		$nt = Title::newFromText( $newTitle, MV_NS_MVD);
		
		//make sure the old title exist (what we are moving from)
		if(!$ot->exists()){
			$wgOut->addHTML( '<p class="error">' . wfMsg('mv_adjust_old_title_missing', $ot->getText() ) . "</p>\n" );
			return php2jsObj(array('status'=>'error','error_txt'=>$wgOut->getHTML()));
		}
		//if the page we want to move to exists and starts with #REDIRECT overwite it
		if($nt->exists()){
			$ntArticle = new Article( $nt );	
			$cur_text = $ntArticle->getContent();
			if(substr($cur_text, 0, strlen('#REDIRECT'))=='#REDIRECT'){
				//remove page (normal users can "delete mvd_pages if they are redirects)
				$ntArticle->doDelete( wfMsgForContent( 'mv_redirect_and_delete_reason' ));
				//clear deletion log msg: 
				$wgOut->clearHTML();
			}
		}		
		
		# Delete to make way if requested (not dealt with for now)
		//if ( $wgUser->isAllowed( 'delete' ) && $this->deleteAndMove ) {
		//	$article = new Article( $nt );
			// This may output an error message and exit
		//	$article->doDelete( wfMsgForContent( 'delete_and_move_reason' ) );
		//}
		
		# don't allow moving to pages with # in
		if ( !$nt || $nt->getFragment() != '' ) {			
			$wgOut->addWikiText( '<p class="error">' . wfMsg('badtitletext') . "</p>\n" );
			return php2jsObj(array('status'=>'error','error_txt'=>$wgOut->getHTML()));
		}
		$old_article = new Article($ot);
		$this->preMoveArtileText = $old_article->getContent();
		unset($old_article);
		
		//@@todo we should really just remove the old article (instead of putting a redirect there)
		$error = $ot->moveTo( $nt, true, $this->reason );
		
		if ( $error !== true ) {
			$wgOut->addWikiText( '<p class="error">' . wfMsg($error) . "</p>\n" );
			return php2jsObj(array('status'=>'error','error_txt'=>$wgOut->getHTML()));
		}
		//wfRunHooks( 'SpecialMovepageAfterMove', array( &$this , &$ot , &$nt ) )	;
		
		$ott = $ot->getTalkPage();
		if( $ott->exists() ) {
			if( $this->moveTalk && !$ot->isTalkPage() && !$nt->isTalkPage() ) {
				$ntt = $nt->getTalkPage();
	
				# Attempt the move
				$error = $ott->moveTo( $ntt, true, $this->reason );
				if ( $error === true ) {
					$talkmoved = 1;
					//wfRunHooks( 'SpecialMovepageAfterMove', array( &$this , &$ott , &$ntt ) )	;
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
		if( $this->watch ) {
			$wgUser->addWatch( $ot );
			$wgUser->addWatch( $nt );
		} else {
			$wgUser->removeWatch( $ot );
			$wgUser->removeWatch( $nt );
		}
		
		//$tsTitle = Title::newFromText( $newTitle, MV_NS_MVD);
		//print "js_log('titleDB: ".$tsTitle->getDBKey() ."');\n";
		/*if($tsTitle->exists()){	
			print "js_log('{$tsTitle->getDBKey()}  presnet:');\n";
		}else{
			print "js_log('{$tsTitle->getDBKey()}  not present');\n";
		}*/		
		
		#return the javascript object (so that the inteface can update the user)
		return php2jsObj(array('status'=>'ok',
						'error_txt'=>$wgOut->getHTML(), 
						'mv_adjust_ok_move'=>wfMsg('mv_adjust_ok_move'),
						'titleKey'=>$newTitle,
						'fd_mvd'=>$this->get_fd_mvd_request($newTitle, $mvd_id,'enclosed'),
						'tl_mvd'=>$this->get_tl_mvd_request($newTitle, $mvd_id) 
			));		
	}
	function get_edit_disp($titleKey, $mvd_id='new', $ns=MV_NS_MVD){
		global $mvgIP, $wgOut, $wgScriptPath, $wgUser, $wgTitle;
		//print "new article title: " . 	$titleKey;
		$wgTitle = Title::newFromText($titleKey, $ns);		
		//make a title article with global title: 
		$Article = new Article($wgTitle);
		//make the ediPageajax obj
		include_once($mvgIP . '/includes/MV_MetavidInterface/MV_EditPageAjax.php');
		$editPageAjax = new MV_EditPageAjax( $Article);
		
		//add in adjust code: 
		$editPageAjax->setAdjustHtml( $this->get_adjust_disp($titleKey, $mvd_id, false) );
		
		//set ts id: 
		$editPageAjax->mvd_id = $mvd_id;		
		//fill wgOUt with edit form: 
		$editPageAjax->edit();
		return $wgOut->getHTML();
		//@@todo base edit display off of template (some how?)
		//special structure for editing type ht_en				
	}		
	
	function get_history_disp($titleKey, $mvd_id){
		global $mvgIP, $wgOut;
		include_once($mvgIP . '/includes/MV_MetavidInterface/MV_PageHistoryAjax.php');
		$title = Title::newFromText($titleKey, MV_NS_MVD);
		$article = new Article($title);
		$pageHistoryAjax = new PageHistory($article);
		//@@todo fix problems... ajax action url context !=history url context
		// so forming urls for links get errors
		$pageHistoryAjax->history();
		return $wgOut->getHTML();
	}
	function get_disp_remove_mvd($titleKey, $mvd_id){
		 global $wgOut;
		 $title = Title::newFromText($titleKey, MV_NS_MVD);
		 $article = new MV_DataPage($title);
		 $article->delete();
		 return $wgOut->getHTML();	
	}
	function do_remove_mvd($titleKey, $mvd_id){
		global $wgOut;
		$title = Title::newFromText($titleKey, MV_NS_MVD);
		$article = new Article($title);
		//run the delete function: 
		$article->doDelete( $_REQUEST['wpReason'] );
		//check if delete happend
		if($article->exists()){		
			return  php2jsObj(array('status'=>'error',
									'error_txt'=>$wgOut->getHTML() ));
		}else{			
			return  php2jsObj(array('status'=>'ok'));
		}
	}
 }
//base class mvd_page
//@@todo re-factor some functions that run on (mvd_page) to methods in the mvd_page obj
class mvd_pageObj{
	
}
function mvParsePropertiesCallback($maches){
	global $mvMatchesSST, $mv_smw_tag_arry;
	$mv_smw_tag_arry[$maches[2]]=$maches[3];
	//replace the semantic tag with an empty string:
	//@@todo other semantic tags need not be striped
	return '';
}
?>
