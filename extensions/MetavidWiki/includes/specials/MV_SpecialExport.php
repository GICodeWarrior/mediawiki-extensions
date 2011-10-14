<?php
/**
 * MV_SpecialExport.php Created on Oct 23, 2007
 *
 * All Metavid Wiki code is Released Under the GPL2
 * for more info visit http://metavid.org/wiki/Code
 *
 * @author Michael Dale
 * @email dale@ucsc.edu
 * @url http://metavid.org
 *
 * exports Video feeds in a few different queries to machine readable formats
 * initially target: rss, miro  (format attribute)
 * atom etc would be good.
 *
 *
 * //@@todo this kind of ugly hack ... all this should be moved over to extensions on api.php
 *
 * Special:MvExport
 */
if ( !defined( 'MEDIAWIKI' ) ) die();

// all the special pages handled by this master Special Export (could reactor into individual classes if we want to)
class MvVideoFeed extends SpecialPage {
	function __construct() {
		parent::__construct( 'MvVideoFeed' );
		$realFunction = array( 'SpecialPage', 'setGroup' );
		if ( is_callable( $realFunction ) ) {
			parent::setGroup( 'MvVideoFeed', 'mv_group' );
		}
	}
	function execute( $par ){
		$MvSpecialExport = new MV_SpecialExport( 'category' );
	}
}

class MvExportStream extends SpecialPage {
	function __construct() {
		parent::__construct( 'MvExportStream' );
	}
	function execute( $par ){
		$MvSpecialExport = new MV_SpecialExport( 'stream' );
	}
}
class MvExportSequence extends SpecialPage {
	function __construct() {
		parent::__construct( 'MvExportSequence' );
		$realFunction = array( 'SpecialPage', 'setGroup' );
		if ( is_callable( $realFunction ) ) {
			parent::setGroup( 'MvExportSequence', 'mv_group' );
		}
	}
	function execute( $par ) {
		global $wgRequest;
		// @@todo replace this ugly hack .. don't know how to get around the missing param atm:
		$tl = $wgRequest->getVal( 'title' );
		$par = '';
		if ( strpos( $tl, '/' ) !== false ) {
			$par = substr( $tl, strpos( $tl, '/' ) + 1 );
		}
		// print "par: ". $par ;
		// die;
		$MvSpecialExport = new MV_SpecialExport( 'sequence', $par );
	}
}
function wfSpecialMvExportSequence() {
	return true;
}
class MvExportSearch extends SpecialPage {
	function __construct() {
		parent::__construct( 'MvExportSearch' );
	}
	function execute( $par ) {
		$MvSpecialExport = new MV_SpecialExport( 'search' );
	}

}
class MvExportAsk extends SpecialPage {
	function __construct() {
		parent::__construct( 'MvExportAsk' );
	}
	function execute( $par ) {
		global $wgTitle;
		$MvSpecialExport = new MV_SpecialExport( 'ask' );
	}
}
function wfSpecialMvExportStream() {
	return true;
}


// extend supported feed types:
$wgFeedClasses['cmml'] = 'CmmlFeed';
$wgFeedClasses['podcast'] = 'PodcastFeed';

class MV_SpecialExport {
	var $feed = null;
	var $output_xml_header = true;
	function __construct( $export_type, $par = '' ) {
		$this->export_type = $export_type;
		$this->par = $par;
		$this->execute();
	}
	// @@todo think about integration into api.php
	function execute() {
		global $wgRequest, $wgOut, $wgUser, $mvStream_name, $mvgIP;
		$html = '';
		// set universal variables:
		$this->feed_format = $wgRequest->getVal( 'feed_format' );
		$error_page = '';
		// print "RAN execute with export type: " .$this->export_type;
		switch( $this->export_type ) {
			case 'stream':
				$this->stream_name = $wgRequest->getVal( 'stream_name' );

				if ( $this->stream_name == '' )
				$error_page .= wfMsg( 'edit_stream_missing' ) . ", ";

				$this->req_time = $wgRequest->getVal( 't' );

				switch( $this->feed_format ) {
					case 'cmml':
						$this->get_stream_cmml();
					break;
					case 'srt':
						$this->get_stream_srt();
					break;
					case 'roe':
						$this->get_roe_xml();
					break;
					case 'json_cmml':
						// sucks to do big XML page operations ...
						// @@todo cache it..
						ob_start();
						$this->output_xml_header=false;
						$this->get_stream_cmml( );
						$xml_page = ob_get_clean();
						print mvOutputJSON( $xml_page );
					break;
					case 'json_roe':
						// returns roe stream info in json object for easy DOM injection
						// sucks to do big XML page operations ...
						//@@todo send cache friendly headers
						ob_start();
						$this->get_row_data();
						$this->output_xml_header=false;
						$this->get_roe_xml();
						$xml_page = ob_get_clean();
						print mvOutputJSON( $xml_page );
						break;
				}
			break;
			case 'category':
				$this->cat = $wgRequest->getVal( 'cat' );
				if ( $this->cat == '' ) {
					$error_page .= wfMsg( 'mv_missing_cat' );
				} else {
					$this->get_category_feed();
				}
			break;
			case 'search':
				switch($this->feed_format){
					case 'json_rss':
					case 'json':
						//@@todo send cache friendly headers kind of resource intensive:
						ob_start();
						$this->output_xml_header=false;
						$this->get_search_feed();
						$xml_page = ob_get_clean();
						print mvOutputJSON( $xml_page );
					break;
					case 'rss':
					default:
						$this->get_search_feed();
					break;
				}
			break;
			case 'sequence':
				if ( $this->par != '' ) {
					$this->seq_title = $this->par;
					$this->get_sequence_xml();
				}
			break;
			case 'ask':
				$this->get_ask_feed();
			break;
		}
		if ( $error_page == '' ) {
			$wgOut->disable();
		} else {
			$wgOut->addHTML( $error_page );
		}
	}
	function get_sequence_xml(){
		$seqTitle = Title::newFromText( $this->seq_title, MV_NS_SEQUENCE );
		$seqArticle = new MV_SequencePage( $seqTitle );
		header( 'Content-Type: text/xml' );
		print $seqArticle->getSequenceSMIL();
	}
	function get_row_data() {
		// returns a high level description with cmml links (or inline-populated upon request)
		$this->mvTitle = new MV_Title( $this->stream_name . '/' . $this->req_time );
		if ( !$this->mvTitle->doesStreamExist() ) {
			// @@todo we should output the error in XML friendly manner
			die( 'stream does not exist' );
		}
		$this->streamPageTitle = Title::newFromText( $this->stream_name . '/' . $this->req_time, MV_NS_STREAM );
		// get the requested mvd set:
		$this->mvcp = new MV_Component();
		$this->mvcp->procMVDReqSet( $only_requested = true );

		// get all track types available  in current range:
		$this->mvd_type_res = MV_Index::getMVDTypeInRange( $this->mvTitle->getStreamId(),
		$this->mvTitle->getStartTimeSeconds(),
		$this->mvTitle->getEndTimeSeconds() );

		// get all avaliable files
		$this->file_list = $this->mvTitle->mvStream->getFileList();
	}

	// start high level:
	function get_roe_xml( ) {
		global $wgServer;
		global $mvDefaultVideoQualityKey, $mvDefaultFlashQualityKey, $mvDefaultVideoHighQualityKey;
		$dbr = wfGetDB( DB_SLAVE );

		$this->get_row_data();
		// get the stream stream req
		if ( $this->output_xml_header )
		header( 'Content-Type: text/xml' );
		header( "Pragma: public" );
		$one_day = 60*60*24;
		header("Expires: " . gmdate( "D, d M Y H:i:s", time() + $one_day  ) . " GM");

		// print the header:
		print '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
		/*
		 @@todo battle IE's XML parsing to make it compatible
		 (THIS xml schema info screw up parsing of the xml (in IE))
		 <!DOCTYPE roe SYSTEM "http://svn.annodex.net/standards/roe/roe_1_0.xsd">
		 <xs:schema targetNamespace="http://www.xiph.org/roe"
		 xmlns:xs="http://www.w3.org/2001/XMLSchema"
		 xmlns:cmml="http://www.annodex.org/cmml4.0"
		 xmlns:html="http://www.w3.org/1999/xhtml"
		 elementFormDefault="qualified"
		 attributeFormDefault="unqualified">
		 </xs:schema>
		 */
		?>
<ROE>
<head>
<link id="html_linkback" rel="alternate" type="text/html"
	href="<?php echo htmlentities( $this->streamPageTitle->getFullURL() )?>" />
<img id="stream_thumb"
	src="<?php echo htmlentities( $this->mvTitle->getFullStreamImageURL() )?>" />
<title><?php echo htmlentities( $this->mvTitle->getTitleDesc() )?></title>
</head>
<body>
<track id="v" provides="video">
<switch distinction="quality">
		<? foreach ( $this->file_list as $file ) {
			$dAttr = ( $file->getNameKey() == $mvDefaultVideoQualityKey ) ? ' default="true"':'';
			$startendattr='';
			if ( $file->supportsURLTimeEncoding() )
			{
				$dSrc = $this->mvTitle->getWebStreamURL( $file->getNameKey() );
				//set time format if not standard 'anx' type
				if( $file->getPathType()== 'mp4_stream'){
					$startendattr = ' timeFormat="mp4" ';
				}
			} else {
				$dSrc = $file->getFullURL();
				$startendattr = ' start="npt:' . htmlentities( $this->mvTitle->getStartTime() ) . '"' .
					' end="npt:' . htmlentities( $this->mvTitle->getEndTime() ) . '"';
			}
			?>
<mediaSource id="<?php echo htmlentities( $file->getNameKey() )?>"
<?php echo $dAttr?> src="<?php echo htmlentities( $dSrc )?>"
	title="<?php echo htmlentities( $file->get_desc() )?>"
	content-type="<?php echo htmlentities( $file->getContentType() )?>"
	<?php echo $startendattr?> />
	<? } ?>
</switch>
</track>
<track id="t" provides="text layers">
<switch distinction="layer">
	<?	while ( $row = $dbr->fetchObject( $this->mvd_type_res ) ) {
		// output cmml header:
		// @@todo lookup language for layer key patterns
		$sTitle = SpecialPage::getTitleFor( 'MvExportStream' );
		$query = 'stream_name=' . $this->stream_name . '&t=' . $this->req_time . '&feed_format=cmml&tracks=' . strtolower( $row->mvd_type );
		$clink = $sTitle->getFullURL( $query );

		$srt_query = 'stream_name=' . $this->stream_name . '&t=' . $this->req_time . '&feed_format=srt&tracks=' . strtolower( $row->mvd_type );
		$srt_clink = $sTitle->getFullURL( $srt_query );

		$inline = ( in_array( strtolower( $row->mvd_type ), $this->mvcp->mvd_tracks ) ) ? 'true':'false';
		// for now make ht_en or anno_en the default layer
		$default_attr = ( 	strtolower( $row->mvd_type ) == 'ht_en' ||
							strtolower( $row->mvd_type ) == 'anno_en' ) ?
							 'default="true"':
							 '';
		?>
		<switch distinction="content-type">
<mediaSource id="<?php echo htmlentities( $row->mvd_type )?>"
	title="<?php echo wfMsg( $row->mvd_type )?> (CMML)" <?php echo $default_attr?>
	inline="<?php echo htmlentities( $inline )?>" lang="en"
	content-type="text/cmml" src="<?php echo htmlentities( $clink )?>">
		<?					// output inline cmml (if requested):
		if ( $inline == 'true' ) {
			$this->get_stream_cmml( true, $row->mvd_type );
		}
		?>
</mediaSource>
<mediaSource id="<?php echo htmlentities( $row->mvd_type )?>_srt"
	title="<?php echo wfMsg( $row->mvd_type )  ?> (SRT)"
	inline="<?php echo htmlentities( $inline )?>" lang="en"
	content-type="text/x-srt" src="<?php echo htmlentities( $srt_clink )?>">
</mediaSource>
		</switch>
		<?
	}
	?>
</switch>
</track>
</body>
</ROE>
	<?
	// get all available stream text layers ( inline request CMML (if apropo ))
	}
	function get_stream_srt(){
		$dbr = wfGetDB( DB_SLAVE );
		header('Content-Type: text/plain');

		// check the request to get trac set:
		$mvcp = new MV_Component();
		$mvcp->procMVDReqSet();
		$tracks = $mvcp->mvd_tracks;
		if ( count( $mvcp->mvd_tracks ) > 1 )$encap = true;

		// get the stream title
		$streamTitle = new MV_Title( $this->stream_name . '/' . $this->req_time );
		$wgTitle = Title::newFromText( $this->stream_name . '/' . $this->req_time, MV_NS_STREAM );

		$mvd_rows = MV_Index::getMVDInRange( $streamTitle->getStreamId(),
			$streamTitle->getStartTimeSeconds(),
			$streamTitle->getEndTimeSeconds(), $tracks, true);
		$inx =1;
		$MV_Overlay = new MV_Overlay();
		foreach($mvd_rows as $mvd){
			print $inx . "\n";
			print seconds2npt( $mvd->start_time ) . ' --> ' . seconds2npt( $mvd->end_time ) . "\n";

			//strip according to the srt:
			//http://matroska.org/technical/specs/subtitles/srt.html
			print trim(
					str_replace("\n\n", "\n",
						strip_tags(
							$MV_Overlay->getMVDhtml( $mvd, $absolute_links = true ),
							'<b><i><u><font>'
						)
					)
				);
			print "\n\n";
			$inx++;
		}

	}
	/*get stream CMML */
	function get_stream_cmml( $inline = false, $force_track = null ) {
		$dbr = wfGetDB( DB_SLAVE );
		// set cmml name space if inline:
		$ns = ( $inline ) ? 'cmml:':'';
		$ns = '';
		$encap = false;// if we should have a parent cmml tag
		if ( !$force_track ) {
			// check the request to get trac set:
			$mvcp = new MV_Component();
			$mvcp->procMVDReqSet();
			$tracks = $mvcp->mvd_tracks;
			if ( count( $mvcp->mvd_tracks ) > 1 )$encap = true;
		} else {
			$tracks = $force_track;
			$encap = false;
		}

		// get the stream title
		$streamTitle = new MV_Title( $this->stream_name . '/' . $this->req_time );
		$wgTitle = Title::newFromText( $this->stream_name . '/' . $this->req_time, MV_NS_STREAM );
		// do mvd_index query:
		$mvd_rows = MV_Index::getMVDInRange( $streamTitle->getStreamId(),
			$streamTitle->getStartTimeSeconds(),
			$streamTitle->getEndTimeSeconds(), $tracks, $getText = false, 'Speech_by,Bill,category' );
		// get the stream stream req
		if ( $this->output_xml_header )
			header( 'Content-Type: text/xml' );
		// print the header:
		if ( !$inline )print '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";
		// if(!$inline)print '<!DOCTYPE cmml SYSTEM "http://svn.annodex.net/standards/cmml_2_0.dtd">'."\n";
		$tracks = array();
		if ( count( $mvd_rows ) != 0 ) {
			global $wgOut;
			$MV_Overlay = new MV_Overlay();
			foreach ( $mvd_rows as $mvd ) {
				if ( !isset( $tracks[$mvd->mvd_type] ) )$tracks[$mvd->mvd_type] = '';
				$tracks[$mvd->mvd_type] .= '
						<' . $ns . 'clip id="mvd_' . htmlentities( $mvd->id ) . '" start="npt:' . htmlentities( seconds2npt( $mvd->start_time ) ) . '" end="npt:' . htmlentities( seconds2npt( $mvd->end_time ) ) . '">
							<' . $ns . 'img src="' . htmlentities( $streamTitle->getFullStreamImageURL( null, seconds2npt( $mvd->start_time ) ) ) . '"/>';
				// output all metadata @@todo we should generalize the semantic properties.
				$tracks[$mvd->mvd_type] .= ( isset( $mvd->Speech_by ) && trim( $mvd->Speech_by ) != '' ) ? '<meta name="Speech_by" content="' . htmlentities (  $mvd->Speech_by  ) . '"/>':'';
				$tracks[$mvd->mvd_type] .= ( isset( $mvd->Bill ) && trim( $mvd->Bill ) != '' ) ? '<meta name="Bill" content="' . htmlentities( $mvd->Bill ) . '"/>':'';

				// add in categories as "keywords"
				if ( count( $mvd->category ) != 0 ) {
					$tracks[$mvd->mvd_type] .= '<meta name="keywords" content="';
					$coma = '';
					foreach ( $mvd->category as $cat ) {
						$tracks[$mvd->mvd_type] .= $coma . htmlentities( $cat );
						$coma = ',';
					}
					$tracks[$mvd->mvd_type] .= '"/>';
				}
				$tracks[$mvd->mvd_type] .= '<' . $ns . 'body><![CDATA[
									' .	 $MV_Overlay->getMVDhtml( $mvd, $absolute_links = true ). '
								]]></' . $ns . 'body>
						</' . $ns . 'clip>';
				// clear wgOutput
			}
		}
		if ( $encap )print '<cmml_set>';
		// based on: http://trac.annodex.net/wiki/CmmlChanges
		foreach ( $tracks as $role => $body_string ) {
			$ns = htmlentities( $ns );
			?>
<cmml
	lang="en" id="<?php echo htmlentities( $role )?>"
	role="<?php echo wfMsg( $role )?>"
	xmlns="http://svn.annodex.net/standards/cmml_2_0.dtd">
<<?php echo $ns?>head> <<?php echo $ns?>title>
			<?php echo wfMsg( $role )?>
</<?php echo $ns?>title> <<?php echo $ns?>meta name="description" content="<?php echo htmlentities( wfMsg( $role . '_desc' ) )?>"></<?php
echo $ns?>meta> </<?php echo $ns?>head>
<?php echo $body_string?>
</cmml>
<?
		}
		if ( $encap )print '</cmml_set>';
	}
	// this is dependent on semantic wiki ASK functionality
	function get_ask_feed() {
		global $wgSitename, $wgTitle, $wgRequest;
		// check for semantic wiki:
		if ( !defined( 'SMW_VERSION' ) ) {
			return false;
		}
		// bootstrap off of SMWAskPage:
		$SMWAskPage = new SMWAskPage();
		$SMWAskPage->extractQueryParameters( $wgRequest->getVal( 'q' ) );

		// print 'query string: ' . $SMWAskPage->m_querystring . "\n<br />";
		// print 'm_params: ' . print_r($SMWAskPage->m_params) . "\n<br />";
		// print 'print outs: ' .print_r($SMWAskPage->m_printouts) . "\n<br />";
		// set up the feed:
		$this->feed = new mvRSSFeed(
		$wgSitename . ' - ' . wfMsg( 'mediasearch' ) . ' : ' . strip_tags( $SMWAskPage->m_querystring ), // title
		strip_tags( $SMWAskPage->m_querystring ), // description
		$wgTitle->getFullUrl() // link
		);
		$this->feed->outHeader();

		$queryobj = SMWQueryProcessor::createQuery( $SMWAskPage->m_querystring, $SMWAskPage->m_params, false, '', $SMWAskPage->m_printouts );
		$res = smwfGetStore()->getQueryResult( $queryobj );
		$row = $res->getNext();
		while ( $row !== false ) {
			$wikititle = $row[0]->getNextObject();
			$this->feed->outPutItem( $wikititle->getTitle() );
			$row = $res->getNext();
		}
		$this->feed->outFooter();
	}
	// @@todo integrate cache query (similar to SpecialRecentChanges::rcOutputFeed ))
	function get_category_feed() {
		global $wgSitename, $wgRequest, $wgOut, $wgCategoryPagingLimit;
		// get the category article:
		$title = Title::makeTitle( NS_CATEGORY,  $this->cat );
		$article = new Article( $title );

		$this->limit = $wgCategoryPagingLimit;

		$this->feed = new mvRSSFeed(
		$wgSitename . ' - ' . wfMsgForContent( 'video_feed_cat' ) . $this->cat, // title
		$article->getContent(), // description
		$title->getFullUrl() // link
		);
		$this->feed->outHeader();

		$this->from = $wgRequest->getVal( 'from' );
		$this->until = $wgRequest->getVal( 'until' );

		// do a query (get all video items in this category)
		if ( $this->from != '' ) {
			$pageCondition = 'cl_sortkey >= ' . $dbr->addQuotes( $this->from );
			$this->flip = false;
		} elseif ( $this->until != '' ) {
			$pageCondition = 'cl_sortkey < ' . $dbr->addQuotes( $this->until );
			$this->flip = true;
		} else {
			$pageCondition = '1 = 1';
			$this->flip = false;
		}
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select(
		array( 'page', 'categorylinks' ),
		array( 'page_title', 'page_namespace', 'page_len', 'page_is_redirect', 'cl_sortkey' ),
		$pageCondition . " AND (
				  `page_namespace`  =  " . MV_NS_MVD . " OR
				  `page_namespace`  =  " . MV_NS_STREAM . " OR
				  `page_namespace`  = " . MV_NS_SEQUENCE . " )
		AND `cl_from`=  `page_id`
		AND `cl_to` = '{$title->getDBkey()}'
		AND `page_is_redirect`=0",
		# + $pageCondition,
		__METHOD__,
		array( 'ORDER BY' => $this->flip ? 'cl_sortkey DESC' : 'cl_sortkey',
			       'USE INDEX' => 'cl_sortkey',
			       'LIMIT'    => $this->limit + 1 ) );

		// echo 'last query: ' . $dbr->lastQuery();
		$count = 0;
		$this->nextPage = null;
		while ( $x = $dbr->fetchObject ( $res ) ) {
			if ( ++$count > $this->limit ) {
				// We've reached the one extra which shows that there are
				// additional pages to be had. Stop here...
				$this->nextPage = $x->cl_sortkey;
				break;
			}
			// @@link mvd namespace to stream:
			/*if($x->page_namespace == MV_NS_MVD){
			$mvTitle = new MV_Title($x->page_title);
			$title = Title::makeTitle( MV_NS_STREAM, $mvTitle->getStreamName().'/'.$mvTitle->getTimeRequest());
			}else{

			}*/
			$title = Title::makeTitle( $x->page_namespace, $x->page_title );
			$this->feed->outPutItem( $title );
		}
		$this->feed->outFooter();
		// $this->rows =
	}
	function get_search_feed() {
		global $wgSitename, $wgOut;
		// set up search obj:
		$sms = new MV_SpecialMediaSearch();
		// setup filters:
		$sms->setUpFilters();
		// do the search:
		$sms->doSearch();
		// get the search page title:
		$msTitle = Title::MakeTitle( NS_SPECIAL, 'MediaSearch' );

		$this->feed = new mvRSSFeed(
		$wgSitename . ' - ' . wfMsg( 'mediasearch' ) . ' : ' . strip_tags( $sms->getFilterDesc() ), // title
		strip_tags( $sms->getFilterDesc() ), // description
		$msTitle->getFullUrl() . '?' . $sms->get_httpd_filters_query() // link
		);

		$this->feed->outHeader( $this->output_xml_header );
		$MV_Overlay = new MV_Overlay();
		// for each search result:
		foreach ( $sms->results as $inx => & $mvd ) {
			// get Stream title for mvd match:
			$mvTitle = new MV_Title( $mvd->wiki_title );
			$stremTitle = Title::MakeTitle( MV_NS_STREAM, $mvTitle->getStreamName() . '/' . $mvTitle->getTimeRequest() );
			$this->feed->outPutItem( $mvTitle, $MV_Overlay->getMVDhtml( $mvd, $absolute_links = true ) );
		}
		$this->feed->outFooter();
	}
}
class mvRSSFeed extends ChannelFeed {
	function outHeader( $set_content_type=true ) {
		global $wgStyleVersion, $wgStylePath, $wgOut;

		if( $set_content_type )
			$this->httpHeaders();

		//force the cache headers for 1 hour cache of rss and search results
		header( 'Expires: ' . gmdate( 'D, d M Y H:i:s', ( time() + 60*60 ) ) . ' GMT' );
		header( "Cache-Control: max-age=" . (60*60) . " );" );

		echo '<?xml version="1.0" encoding="utf-8"?>' . "\n";
		echo '<?xml-stylesheet type="text/css" href="' .
			htmlspecialchars( wfExpandUrl( "$wgStylePath/common/feed.css?$wgStyleVersion" ) ) .
			'"?' . ">\n";
		?>
<rss version="2.0"
	xmlns:creativeCommons="http://backend.userland.com/creativeCommonsRssModule"
	xmlns:media="http://search.yahoo.com/mrss/"
	xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"
	xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#"
	xmlns:blip="http://blip.tv/dtd/blip/1.0"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:amp="http://www.adobe.com/amp/1.0"
	xmlns:dcterms="http://purl.org/dc/terms"
	xmlns:gm="http://www.google.com/schemas/gm/1.1">
<channel>
<title><?php echo $this->getTitle()?></title>
<link>
		<?php echo $this->getUrl()?>
</link>
<description>
		<?php echo $this->getDescription()?>
</description>
		<?php
	}
	function outPutItem( $wikiTitle, $desc_html = '' ) {
		global $wgOut, $wgUser;
		$sk = $wgUser->getSkin();
		$mvTitle = new MV_Title( $wikiTitle );
		$mStreamTitle = Title::makeTitle( MV_NS_STREAM, ucfirst( $mvTitle->getStreamName() ) . '/' . $mvTitle->getTimeRequest() );

		// only output media RSS item if its valid media:
		if ( !$mvTitle->doesStreamExist() )return ;


		// @@todo this should be cached
		$thumb_ref = $mvTitle->getFullStreamImageURL( '320x240', null, '', true );
		if ( $desc_html == '' ) {
			$article = new Article( $wikiTitle );
			$wgOut->clearHTML();
			$wgOut->addWikiText( $article->getContent() );
			$desc_html = $wgOut->getHTML();
			$wgOut->clearHTML();
		}

		//get the parent meta if allowed:
		global $mvGetParentMeta;
		$pmvd=false;
		if( $mvGetParentMeta && strtolower( $mvTitle->getMvdTypeKey() ) == 'ht_en'){
			$pmvd = MV_Index::getParentAnnotativeLayers($mvTitle);

			if( $pmvd->wiki_title){
				$pMvTitle =  new MV_Title( $pmvd->wiki_title );
				$pAnnoStreamTitle = Title :: MakeTitle( MV_NS_STREAM, $pMvTitle->getNearStreamName( 0 ) );
			}
		}


		$desc_xml = '<![CDATA[
			<center class="mv_rss_view_only">
				<a href="' . htmlspecialchars( $mStreamTitle->getFullUrl() ) . '"><img src="' . $thumb_ref . '" border="0" /></a>
			</center>
			<br />' .
		$desc_html .
			']]>';

		$stream_url = $mvTitle->getWebStreamURL();
		$talkpage = $wikiTitle->getTalkPage();

		$type_desc = ( $mvTitle->getMvdTypeKey() ) ? wfMsg( $mvTitle->getMvdTypeKey() ):'';
		$time_desc = ( $mvTitle->getTimeDesc() ) ? $mvTitle->getTimeDesc():'';

		?>
<item>
<link>
		<?php echo mvRSSFeed::xmlEncode( $mStreamTitle->getFullUrl() )?>
</link>
<title><?php echo mvRSSFeed::xmlEncode(
$mvTitle->getStreamNameText() . ' ' .  $time_desc )?></title>
<description>
<?php echo $desc_xml?>
</description>
<?php
global $mvDefaultVideoQualityKey, $mvVidQualityMsgKeyType, $mvDefaultVideoHighQualityKey, $mvDefaultFlashQualityKey;
//check a few different types in order of prefrence:
if( $stream_url = $mvTitle->getWebStreamURL($mvDefaultVideoHighQualityKey) ){
	$mk = $mvDefaultVideoHighQualityKey;
}elseif( $stream_url = $mvTitle->getWebStreamURL($mvDefaultVideoQualityKey) ) {
	$mk = $mvDefaultVideoQualityKey;
}elseif( $stream_url = $mvTitle->getWebStreamURL($mvDefaultFlashQualityKey) ) {
	$mk = $mvDefaultFlashQualityKey;
}
if($stream_url) {
	echo '<enclosure name="'. wfMsg($mk) .'" type="video/ogg" '.
		'url="'. mvRSSFeed::xmlEncode( $stream_url ).'"/>';
}
?>

<comments>
<?php echo mvRSSFeed::xmlEncode( $talkpage->getFullUrl() )?>
</comments>
<?php

$person='';
if($pmvd && $pmvd->Speech_by ){
	$personTitle = Title :: newFromText( $pmvd->Speech_by );
?>
<media:person label="<?php echo $personTitle->getText() ?>" url="<?php echo mvRSSFeed::xmlEncode( $personTitle->getFullURL() ); ?>" />
<?php
}
//handle any parent clip tag info:
if( $pmvd ){ ?>
<media:parent_clip url="<?php echo mvRSSFeed::xmlEncode( $pAnnoStreamTitle->getFullUrl() )  ?>" />
<?php
	 if( $pmvd->Bill ){
		$bTitle = Title :: newFromText( $pmvd->Bill );
		?>
<media:bill label="<?php echo $bTitle->getText() ?>" url="<?php echo mvRSSFeed::xmlEncode( $bTitle->getFullURL() );?>" />
<?php }
	if( $pmvd->category ){
		foreach($pmvd->category as $cat_titlekey ){
			$cTitle = $cTitle = Title :: MakeTitle( NS_CATEGORY, $cat_titlekey );
		?>
<media:category label="<?php echo $cTitle->getText()?>" url="<?php echo mvRSSFeed::xmlEncode( $cTitle->getFullUrl())  ?>" />
<?php
		}
	}
}

?>
<media:thumbnail
	url="<?php echo mvRSSFeed::xmlEncode( $thumb_ref ) ?>" />
<media:roe_embed
	url="<?php echo mvRSSFeed::xmlEncode( $mvTitle->getROEURL() )?>" />
<media:group>
<?php
global  $mvDefaultFlashQualityKey, $mvVidQualityMsgKeyType, $mvDefaultFlashQualityKey;
//add in media group:
$vid_types = array($mvDefaultVideoQualityKey, 'mv_ogg_high_quality',$mvDefaultFlashQualityKey );
foreach($vid_types as $vid_key){
	$stream_url = $mvTitle->getWebStreamURL($vid_key);
	if($stream_url !== false && isset( $mvVidQualityMsgKeyType[ $vid_key ] ) ) {
		?>
	<media:content
		blip:role="<?php echo mvRSSFeed::xmlEncode( $vid_key ) ?>"
		expression="full"
		type="<?php echo mvRSSFeed::xmlEncode( $mvVidQualityMsgKeyType[ $vid_key ] ) ?>"
		url="<?php echo htmlentities( $stream_url )?>"></media:content>
		<?php
	}
}?>
</media:group>
</item>
<?
	}
	function outFooter() {
		?>
</channel>
</rss>
		<?php
	}
}
