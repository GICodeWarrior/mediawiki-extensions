<?php
/*
 * Created on Jul 26, 2007
 *
 * All Metavid Wiki code is Released Under the GPL2
 * for more info visit http:/metavid.ucsc.edu/code
 * 
 * overwrites the existing special search to add in metavid specific features
 */
if (!defined('MEDIAWIKI'))	die();

function doSpecialSearch($par = null) {
	//list( $limit, $offset ) = wfCheckLimits();
	$MvSpecialSearch = new MV_SpecialMediaSearch();
	$MvSpecialSearch->doSearchPage();
}
//metavid search page (only search video media)
SpecialPage :: addPage(new SpecialPage('MediaSearch', '', true, 'doSpecialSearch', false));


/*
 * adds media results to top of special page: 
 */
class MV_SpecialSearch extends SpecialPage{
	function MV_SpecialSearch( ) {
		global $wgOut, $wgRequest;		
		mvfAddHTMLHeader('search');
		$MvSpecialSearch = new MV_SpecialMediaSearch();		
		
		$MvSpecialSearch->doSearch( $wgRequest->getVal('search') );
		$wgOut->addHTML($MvSpecialSearch->getResultsHTML());
		SpecialPage::SpecialPage('Search');			
	}
}
/*
 * simple/quick implementation ... 
 * future version should be better integrated with semantic wiki and or 
 * an external scalable search engine ie sphinx or lucene
 * 
 * example get request: filter 0, type match, value = wars 
 * ?f[0]['t']=m&f[0]['v']=wars
 */
class MV_SpecialMediaSearch extends SpecialPage {
	//initial values for selctors ( keys into language as 'mv_search_$val')
	var $sel_filter_types = array (
		'match',
		'spoken_by',
		'category',	
		//'date' 		 //search in a given date range
		//'stream_name', //search within a particular stream
		//'stream_range' //for returning only in a given range 
		//'mvd_layer'	 //specify a specific meta-layer
		//'smw_property' not active yet
		//'smw_property_numeric' not active
	);	
	var $sel_filter_andor = array (
		'and',
		'or',
		'not',
	);	
	var $results=array();
	var $mName = 'MediaSearch';	
	var $outputInlineHeader =true;
	
	var $limit = 20;
	var $offset = 0;
	
	function doSearchPage($term='') {		
		global $wgRequest, $wgOut;
		$this->setUpFilters();
		//do the search
		$this->doSearch();
		//page control: 
		$this->outputInlineHeader=false;
		//add nessesary js to wgOut: 
		mvfAddHTMLHeader('search');	
		//add the search placeholder 
		$wgOut->addWikiText( wfMsg( 'searchresulttext' ) );
		$wgOut->addHTML($this->dynamicSearchControl());		
		//$wgOut->addHTML($this->getResultsBar());
		$wgOut->addHTML($this->getResultsHTML());
	}
	function dynamicSearchControl() {
		$title = SpecialPage :: getTitleFor('MediaSearch');
		$action = $title->escapeLocalURL();

		return "\n<form id=\"mv_media_search\" method=\"get\" " .
		"action=\"$action\">\n{$this->list_active_filters()}\n</form>\n";
	}
	function setupFilters($defaultType='empty', $opt=null){
		global $wgRequest;
		
		//first try any key titles: 
		$title_str = $wgRequest->getVal('title');
		$tp = split('/',$title_str);
		if(count($tp)==3){
			switch($tp[1]){
				case 'person':
					$this->filters = array(
						array(
							't'=>'spoken_by',
							'v'=>str_replace('_',' ',$tp[2])
						)
					);
				break;
			}	
		}else{		
			if (isset ($_GET['f'])) {
				//@@todo more input processing
				$this->filters = $_GET['f'];
			} else {			
				switch($defaultType){
					case 'stream':
						$this->filters = array (
							array(
								't' =>'stream_name',
								'v' =>$opt['stream_name']
							)
						);					
					break;				
					case 'empty':
					default:
						$this->filters = array (
							array (
								't' => 'match',
								'v' => ''
							)
						);
					break;
				}			
			}	
		}
	}
	function doSearch($term='') {
		//force a single term:
		if($term!=''){
			$this->filters = array (
				array (
					't' => 'match',
					'v' => $term
				)
			);
		}
		$mvIndex = new MV_Index();
		$this->results = $mvIndex->doFiltersQuery($this->filters);
		$this->num = $mvIndex->numResults();
		$this->numResultsFound = $mvIndex->numResultsFound();
		if(isset($mvIndex->offset))	$this->offset = $mvIndex->offset;
		if(isset($mvIndex->limit)) $this->limit = $mvIndex->limit;
	}
	/*list all the meta *layer* types */
	function powerSearchOptions() {
		global $mvMVDTypeKeys;
		$opt = array();
		foreach( $mvMVDTypeKeys as $n ) {
			$opt['mvd_ns_' . $n] = 1;
		}
		//$opt['redirs'] = $this->searchRedirects ? 1 : 0;
		//$opt['searchx'] = 1;
		return $opt;
	}
	function getResultsCMML(){
		
	}
	function getResultsHTML() {
		global $mvgIP, $wgOut, $mvgScriptPath, $mvgContLang, $wgUser, $wgParser;
		$sk = & $wgUser->getSkin();
		$o = '';				
				
		//media paging:
		$prevnext = wfViewPrevNext( $this->offset, $this->limit,
				SpecialPage::getTitleFor( 'MediaSearch' ),
					$this->get_httpd_filters_query(),
					($this->num < $this->limit) );
		$o.="<br />{$prevnext}\n";		
		
		//for each stream range:		
		if (count($this->results) == 0) {
			return '<h2><span class="mw-headline">' . wfMsg('mv_search_no_results') . '</span></h2>';
		}else{
			if($this->outputInlineHeader){
				$o.='<h2>
						<span class="mw-headline">'. wfMsg('mv_media_matches') . '</span>
					</h2>';
				$title = Title :: MakeTitle(NS_SPECIAL, 'MediaSearch');
				$o.= $sk->makeKnownLinkObj($title, wfMsg('mv_advaced_search'), 
						$this->get_httpd_filters_query() );
			}
		}		
		//add the results bar:
		$o.=$this->getResultsBar();
		foreach ($this->results as $stream_id => & $stream_set) {
			$matches = 0;
			$stream_out = $mvTitle = '';			
			foreach ($stream_set as & $srange) {
				$cat_html = $mvd_out = '';
				$range_match=0;		
				foreach ($srange['rows'] as $inx=> & $mvd) {					
					$matches++;			
					$mvTitle = new MV_Title($mvd->wiki_title);

					//retrieve only the first article: 
					//$title = Title::MakeTitle(MV_NS_MVD, $mvd->wiki_title);
					//$article = new Article($title);					
					
					$bgcolor=MV_Overlay::getMvdBgColor($mvd);
					//output indent if not the first and count more than one 
					if(count($srange['rows'])!=1 && $inx!=0)
						$mvd_out.='&nbsp; &nbsp; &nbsp; &nbsp;';
						
					$mvd_out .= '<span style="background:#'.$bgcolor.'">&nbsp; &nbsp; &nbsp; &nbsp;' . $mvTitle->getTimeDesc() . '&nbsp;</span>';
					$mvd_out .= '<a title="' . wfMsg('mv_expand_play') . '" href="javascript:mv_ex(\'' . $mvd->id . '\')"><img id="mv_img_ex_'.$mvd->id.'" border="0" src="' . $mvgScriptPath . '/skins/images/closed.png"></a>' .
					'&nbsp;';
					//output control links:
					//make stream title link: 
					$mvStreamTitle = Title :: MakeTitle(MV_NS_STREAM, $mvTitle->getNearStreamName());
					//$mvTitle->getStreamName() .'/'.$mvTitle->getStartTime() .'/'. $mvTitle->getEndTime() );
					$mvd_out .= $sk->makeKnownLinkObj($mvStreamTitle, '<img border="0" src="' . $mvgScriptPath . '/skins/images/run_mv_stream.png">', '', '', '', '', ' title="' . wfMsg('mv_view_in_stream_interface') . '" ');
										
					//$title = MakeTitle::()
					$mvd_out .='&nbsp;';
					$mvdTitle = Title::MakeTitle(MV_NS_MVD, $mvd->wiki_title);
					$mvd_out .= $sk->makeKnownLinkObj($mvdTitle, '<img border="0" src="' . $mvgScriptPath . '/skins/images/run_mediawiki.png">', '', '', '', '', ' title="' . wfMsg('mv_view_wiki_page') . '" ');												
					
					//@@todo is it faster to hit the semantic media db or run the regEx ?
					$mvd_out.='<span id="mvr_desc_'.$mvd->id.'">';
					$smw_properties = MV_Overlay::get_and_strip_semantic_tags($mvd->text); 
					if(isset($smw_properties['Spoken By'])){
						$ptitle = Title::MakeTitle(NS_MAIN, $smw_properties['Spoken By']);
						$mvd_out.=' '.$sk->makeKnownLinkObj($ptitle, $smw_properties['Spoken By']);
					}		
					if(!isset($mvd->toplq))$mvd->toplq=false;							
					//output short desc send partial regEx: 
					if (!$mvd->toplq){					
						$mvd_out.= $this->termHighlight($mvd->text, implode('|', $this->getTerms()));						
					}else {
						//@@todo parse category info if present
						$cat_html = '';					
						//run via parser to add in Category info: 
						$parserOptions = ParserOptions :: newFromUser($wgUser);
						$parserOptions->setEditSection(false);
						$parserOptions->setTidy(true);
						$title = Title :: MakeTitle(MV_NS_MVD, $mvd->wiki_title);
						$parserOutput = $wgParser->parse($mvd->text, $title, $parserOptions);
						$cats = $parserOutput->getCategories();
						foreach ($cats as $catkey => $title_str) {
							$title = Title :: MakeTitle(NS_CATEGORY, $catkey);
							$cat_html .= ' ' . $sk->makeKnownLinkObj($title, $catkey);
						}
						//add category pre-text:
						//if ($cat_html != '')
						$mvd_out.= wfMsg('Categories') . ':' . $cat_html;
						$mvd_out.= wfMsg('mv_match_text', count($srange['rows']))."\n";
						//$wgOut->addCategoryLinks( $parserOutput->getCategories() );						
						//$cat_html = $sk->getCategories();
						//empty out the categories
						//$wgOut->mCategoryLinks = array();	
					}
					$mvd_out.='</span>';
					$mvd_out .= '<div id="mvr_' . $mvd->id . '" style="display:none;background:#'.$bgcolor.';" ></div>';
					$mvd_out .= '<br>' . "\n";					
				}
				$stream_out .= $mvd_out;
				/*if(count($srange['rows'])!=1){					
					$stream_out .= '&nbsp;' . $cat_html . ' In range:' . 
					seconds2ntp($srange['s']) . ' to ' . seconds2ntp($srange['e']) .
					wfMsg('mv_match_text', count($srange['rows'])).'<br>' . "\n";
					$stream_out .= $mvd_out;
				}else{								
					$stream_out .= $mvd_out;
				}*/				
			}
			$nsary = $mvgContLang->getNamespaceArray();
			//output stream name and mach count
			/*$o.='<br><img class="mv_stream_play_button" name="'.$nsary[MV_NS_STREAM].':' .
				$mvTitle->getStreamName() .
					'" align="left" src="'.$mvgScriptPath.'/skins/mv_embed/images/vid_play_sm.png">';
			*/
			$o.= '<h3>' . $mvTitle->getStreamNameText() . wfMsg('mv_match_text', $matches).'</h3>';
			$o.= '<div id="mv_stream_' . $stream_id . '">' . $stream_out . '</div>';
		}
		return $o;
	}
	function getTerms(){
		$ret_ary = $cat_ary = array();		
		foreach($this->filters as $filter){
			switch ($filter['t']) {
				case 'match':							
				case 'spoken_by':
				case 'stream_name':
					$ret_ary[] = $filter['v'];
				break;
				case 'category' :
					$cat_ary[] =$filter['v'];
				break;
				case 'smw_property' :
				
				break;
				case 'smw_property_number': 
					//should be special case for numeric values 
				break;
			}
		}
		return $ret_ary+$cat_ary;
	}
	/*function termHighlightText(&$text, $terms_ary){
		if(count($terms_ary)==0)return;
		$term_pat=$or='';
		foreach($terms_ary as $term){
			if(trim($term)!=''){
				$term_pat.=$or.$term;
				$or='|';
			}
		}	
		if($term_pat=='')return;
		//@@TODO:: someone somewhere has written a better wiki_text page highlighter
		$pat1 = "/(\[\[(.*)\]\]|(.*)($term_pat)(.*)/i";
		//print "pattern: ". $pat1 . "\n\n";
		return preg_replace( $pat1,
			  "$1<span class='searchmatch'>\\2</span>$3", $text );
		//print "\n\ncur text:". $text;	
	}*/
	/*very similar to showHit in SpecialSearch.php */
	function termHighlight( & $text, $terms ) {
		//$fname = 'SpecialSearch::termHighlight';
		//wfProfileIn( $fname );
		global $wgUser, $wgContLang, $wgLang;
		$sk = $wgUser->getSkin();
		$contextlines=1;
		$contextchars=50;

		$lines = explode( "\n", $text );
		$max = intval( $contextchars ) + 1;
		$pat1 = "/(.*)($terms)(.{0,$max})/i";

		$lineno = 0;

		$extract = '';
//		wfProfileIn( "$fname-extract" );
		foreach ( $lines as $line ) {
			if ( 0 == $contextlines ) {
				break;
			}
			++$lineno;
			$m = array();
			if ( ! preg_match( $pat1, $line, $m ) ) {
				continue;
			}
			--$contextlines;
			$pre = $wgContLang->truncate( $m[1], -$contextchars, '...' );

			if ( count( $m ) < 3 ) {
				$post = '';
			} else {
				$post = $wgContLang->truncate( $m[3], $contextchars, '...' );
			}

			$found = $m[2];

			$line = htmlspecialchars( $pre . $found . $post );
			$pat2 = '/(' . $terms . ")/i";
			$line = preg_replace( $pat2,
			  "<span class='searchmatch'>\\1</span>", $line );

			//$extract .= " <small>{$lineno}: {$line}</small>\n";
			$extract .= " <small>{$line}</small>\n";
		}		
		//if we found no matches just return the first line: 		
		if($extract=='')return ' <small>'. $wgContLang->truncate($text, ($contextchars*2), '...').'</small>';
		//wfProfileOut( "$fname-extract" );
		//wfProfileOut( $fname );
		//return "<li>{$link} ({$size}){$extract}</li>\n";
		return $extract;
	}
	//output expanded request with retired title text
	function expand_wt($mvd_id, $terms_ary) {
		global $wgOut,$mvgIP;
		global $mvDefaultSearchVideoPlaybackRes;		
		
		$mvd = MV_Index::getMVDbyId($mvd_id);
		if(count($mvd)!=0){			
			$mvTitle = new MV_Title($mvd->wiki_title);
			//validate title and load stream ref:
			if($mvTitle->validRequestTitle()){
				list($vWidth, $vHeight) = explode('x', $mvDefaultSearchVideoPlaybackRes); 
				$embedHTML='<span style="float:left;width:'.($vWidth+20).'px">' . 
									$mvTitle->getEmbedVideoHtml($mvd_id, $mvDefaultSearchVideoPlaybackRes) .
							'</span>';
				$wgOut->clearHTML();
								
				$title = Title::MakeTitle(MV_NS_MVD,$mvd->wiki_title);
				$article = new Article($title);
				$MvOverlay = new MV_Overlay();	
				
				$text = $article->getContent();
				//do highlight: 					
				//$text = $this->termHighlightText($text, $terms_ary);
						
				$MvOverlay->parse_format_text($text, $mvTitle);
				$bgcolor = $MvOverlay->getMvdBgColor($mvd);
				$pageHTML = $wgOut->getHTML();
				//encasulate page html: 
				$pageHTML='<span style="padding-top:10px;float:left;width:450px">'.$pageHTML.'</span>';						
				return $embedHTML. $pageHTML. '<div style="clear: both;"/>';
			}else{
				return wfMsg('mvBadMVDtitle');
			}
		}else{
			return wfMsg('mv_error_mvd_not_found');
		}
		//$title = Title::MakeTitle(MV_NS_MVD, $wiki_title);
		//$article = new Article($title);
		//output table with embed left, and content right
		//return $wgOut->parse($article->getContent());
	}
	function get_httpd_filters_query(){
		//get all the mvd ns selected: 
		$opt = $this->powerSearchOptions();			
		return http_build_query($opt +array('f'=>$this->filters));
	}
	function list_active_filters() {
		global $mvgScriptPath;
		$s='';	
		$s .= '<div id="mv_active_filters" style="margin-bottom:10px;">';			
		foreach ($this->filters as $i => $filter) {
			if (!isset ($filter['v'])) //value
				$filter['v'] = '';
			if (!isset ($filter['t'])) //type
				$filter['t'] = '';
			if (!isset ($filter['a'])) //and, or, not
				$filter['a']='';				
			
			//output the master selecter per line: 
			$s .= '<span id="mvs_' . $i . '">';		
			$s .= '&nbsp;&nbsp;';						
			//selctor (don't display if i==0')
			$s .= $this->selector($i, 'a', $filter['a'],($i==0)?false:true ); 		
			$s .= $this->selector($i, 't', $filter['t']); //type selector
			$s .= '<span id="mvs_' . $i . '_tc">';
			switch ($filter['t']) {			
				case 'match' :
					$s .= $this->text_entry($i, 'v', $filter['v'], ' mv_hl_text');
					break;
				case 'category' :
					//$s.=$this->get_ref_ac($i, $filter['v']);
					$s .= $this->text_entry($i, 'v', $filter['v']);
				break;
				case 'stream_name':
					$s .= $this->text_entry($i, 'v', $filter['v']);
				break;
				case 'spoken_by' :
					$s .= $this->get_ref_person($i, $filter['v'], true);
					break;
				case 'smw_property' :

				break;
			}
			$s .= '</span>';
			if ($i > 0)
				$s .= '&nbsp; <a href="javascript:mv_remove_filter(' .
				$i . ');">' .
				'<img title="' . wfMsg('mv_remove_filter') . '" ' .
				'src="' . $mvgScriptPath . '/skins/images/cog_delete.png"></a>';
			$s .= '</span>';
		}		
		$s .= '</div>';
		//reference remove 
		$s .= '<a id="mv_ref_remove" style="display:none;" ' .
		'href="">' .
		'<img title="' . wfMsg('mv_remove_filter') . '" ' .
		'src="' . $mvgScriptPath . '/skins/images/cog_delete.png"></a>';

		//ref missing person image ref: 							
		$s .= $this->get_ref_person();

		//add link:
		$s .= '<a href="javascript:mv_add_filter();">' .
		'<img border="0" title="' . wfMsg('mv_add_filter') . '" ' .
		'src="' . $mvgScriptPath . '/skins/images/cog_add.png"></a> ';

		$s .= '<input id="mv_do_search" type="submit" ' .
		' value="' . wfMsg('mv_run_search') . '">';				
		
		return $s;
	}
	function getResultsBar(){		
		$o='<div class="mv_result_bar">';
		if($this->numResultsFound){
			$o.=wfMsg('mv_results_found_for',$this->offset, ($this->limit+$this->offset), number_format($this->numResultsFound));
		}
		$o.=$this->getFilterDesc();
		$o.='</div>';
		return $o;
	}
	/*
	 * returns human readable description of filters
	 */
	function getFilterDesc(){
		$o=$a='';
		foreach($this->filters as $inx=>$f){	
			if($inx!=0)$a=wfMsg('mv_search_'.$f['a']).' ';		
			$o.=' '.$a.wfMsg('mv_'.$f['t']).' <b>'. $f['v'].'</b> ';			
		}
		return $o;
	}
	function get_ref_person($inx = '', $person_name = MV_MISSING_PERSON_IMG, $disp = false) {
		if($disp) {
			$tname = 'f[' . $inx . '][v]';
			$inx = '_' . $inx;
			$disp = 'inline';
		}else{
			$tname = '';
			$inx = '';
			$person_name = '';
			$disp = 'none';
		}		
		//make the missing person image ref: 
		$imgTitle = Title :: makeTitle(NS_IMAGE, $person_name . '.jpg');
		if (!$imgTitle->exists()) {
			$imgTitle = Title :: makeTitle(NS_IMAGE, MV_MISSING_PERSON_IMG);
		}

		$img = wfFindFile($imgTitle);
		if (!$img) {
			$img = wfLocalFile($imgTitle);
		}
		//print "title is: " .$imgTitle->getDBKey() ."IMAGE IS: " . $img->getURL();

		return '<span class="mv_person_ac" id="mv_person' . $inx . '" style="display:' . $disp . ';width:90px;">' .
		'<img id="mv_person_img' . $inx . '" style="padding:2px;" src="' . $img->getURL() . '" width="44">' .
		'<input id="mv_person_input' . $inx . '" class="mv_search_text" style="font-size: 12px;" size="9" ' .
		'type="text" name="' . $tname . '" value="' . $person_name . '" autocomplete="off">' .
		'<div id="mv_person_choices'.$inx.'" class="autocomplete"></div>' .
		'</span>';
	}
	function selector($i, $key, $selected='', $display=true) {
		$disp = ($display)?'':'display:none;';
		$s= '<select id="mvsel_'.$key.'_' . $i . '" class="mv_search_select" style="font-size: 12px;'.$disp.'" name="f['.$i .']['.$key.']" >' . "\n";	
		$items = ($key == 't')?$this->sel_filter_types:$this->sel_filter_andor;		
		if($key=='a' && $selected=='')
			$selected='and';
				
		$sel = ($selected == '') ? 'selected' : '';
		if($key=='t')
			$s .= '<option value="na" ' . $sel . '>' . wfMsg('mv_search_sel_' . $key) . '</option>' . "\n";
		foreach ($items as $item) {
			$sel = ($selected == $item) ? $sel = 'selected' : '';
			$s .= '<option value="' . $item . '" ' . $sel . '>' . wfMsg('mv_search_' . $item) . '</option>' . "\n";
		}
		$s .= '</select>';
		return $s;
	}
	//could be a suggest: 
	function text_entry($i, $key, $val = '', $more_class='') {
		$s = '<input class="mv_search_text'.$more_class.'" style="font-size: 12px;" onchange="" 
						size="9" type="text" name="f[' . $i . '][' . $key . ']" value="' . $val . '">';
		return $s;
	}
}
?>
