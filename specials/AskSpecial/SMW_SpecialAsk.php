<?php

if (!defined('MEDIAWIKI')) die();

global $IP;
include_once($IP . '/includes/SpecialPage.php');

/**
 * @author Markus Krötzsch
 *
 * This special page for MediaWiki implements a customisable form for
 * executing queries outside of articles.
 *
 * @note AUTOLOAD
 */
class SMWAskPage extends SpecialPage {

	protected $m_querystring = '';
	protected $m_params = array();
	protected $m_printouts = array();
	protected $m_editquery = false;

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct('Ask');
	}

	function execute($p = '') {
		global $wgOut, $wgRequest, $smwgIP, $smwgQEnabled, $smwgRSSEnabled;
		wfProfileIn('doSpecialAsk (SMW)');
		if ( ($wgRequest->getVal( 'query' ) != '') ) { // old processing
			$this->executeSimpleAsk();
			wfProfileOut('doSpecialAsk (SMW)');
			return;
		}
		if (!$smwgQEnabled) {
			$wgOut->addHTML('<br />' . wfMsgForContent('smw_iq_disabled'));
		} else {
			$this->extractQueryParameters($p);
			$this->makeHTMLResult();
		}
		wfProfileOut('doSpecialAsk (SMW)');
	}

	protected function extractQueryParameters($p) {
		// This code rather hacky since there are many ways to call that special page, the most involved of
		// which is the way that this page calls itself when data is submitted via the form (since the shape
		// of the parameters then is governed by the UI structure, as opposed to being governed by reason).
		global $wgRequest, $smwgIP;

		// First make all inputs into a simple parameter list that can again be parsed into components later.

		if ($wgRequest->getCheck('q')) { // called by own Special, ignore full param string in that case
			$rawparams = SMWInfolink::decodeParameters($wgRequest->getVal( 'p' ), false); // p is used for any additional parameters in certain links
		} else { // called from wiki, get all parameters
			$rawparams = SMWInfolink::decodeParameters($p, true);
		}
		// Check for q= query string, used whenever this special page calls itself (via submit or plain link):
		$this->m_querystring = $wgRequest->getText( 'q' );
		if ($this->m_querystring != '') {
			$rawparams[] = $this->m_querystring;
		}
		// Check for param strings in po (printouts), appears in some links and in submits:
		$paramstring = $wgRequest->getText( 'po' );
		if ($paramstring != '') { // parameters from HTML input fields
			$ps = explode("\n", $paramstring); // params separated by newlines here (compatible with text-input for printouts)
			foreach ($ps as $param) { // add initial ? if omitted (all params considered as printouts)
				$param = trim($param);
				if ( ($param != '') && ($param{0} != '?') ) {
					$param = '?' . $param;
				}
				$rawparams[] = $param;
			}
		}

		// Now parse parameters and rebuilt the param strings for URLs
		include_once( "$smwgIP/includes/SMW_QueryProcessor.php" );
		SMWQueryProcessor::processFunctionParams($rawparams,$this->m_querystring,$this->m_params,$this->m_printouts);

		// Try to complete undefined parameter values from dedicated URL params
		$sortcount = $wgRequest->getVal( 'sc' );
		if (!is_numeric($sortcount)) {
			$sortcount = 0;
		}
		if ( !array_key_exists('order',$this->m_params) ) {
			$this->m_params['order'] = $wgRequest->getVal( 'order' ); // basic ordering parameter (, separated)
			for ($i=0; $i<$sortcount; $i++) {
				if ($this->m_params['order'] != '') {
					$this->m_params['order'] .= ',';
				}
				$value = $wgRequest->getVal( 'order' . $i );
				$value = ($value == '')?'ASC':$value;
				$this->m_params['order'] .= $value;
			}
		}
		if ( !array_key_exists('sort',$this->m_params) ) {
			$this->m_params['sort'] = $wgRequest->getText( 'sort' ); // basic sorting parameter (, separated)
			for ($i=0; $i<$sortcount; $i++) {
				if ( ($this->m_params['sort'] != '') || ($i>0) ) { // admit empty sort strings here
					$this->m_params['sort'] .= ',';
				}
				$this->m_params['sort'] .= $wgRequest->getText( 'sort' . $i );
			}
		}
		if ( !array_key_exists('offset',$this->m_params) ) {
			$this->m_params['offset'] = $wgRequest->getVal( 'offset' );
			if ($this->m_params['offset'] == '')  $this->m_params['offset'] = 0;
		}
		if ( !array_key_exists('format',$this->m_params) ) {
			if (array_key_exists('rss', $this->m_params)) { // backwards compatibility (SMW<=1.1 used this)
				$this->m_params['format'] = 'rss';
			} else { // default
				$this->m_params['format'] = 'broadtable';
			}
		}
		if ( !array_key_exists('limit',$this->m_params) ) {
			$this->m_params['limit'] = $wgRequest->getVal( 'limit' );
			if ($this->m_params['limit'] == '') {
				 $this->m_params['limit'] = ($this->m_params['format'] == 'rss')?10:20; // standard limit for RSS
			}
		}

		$this->m_editquery = ( $wgRequest->getVal( 'eq' ) != '' ) || ('' == $this->m_querystring );
	}

	protected function makeHTMLResult() {
		global $wgOut;
		$result = '';
		$result_mime = false; // output in MW Special page as usual

		// build parameter strings for URLs, based on current settings
		$urltail = '&q=' . urlencode($this->m_querystring);

		$tmp_parray = array();
		foreach ($this->m_params as $key => $value) {
			if ( !in_array($key,array('sort', 'order', 'limit', 'offset', 'title')) ) {
				$tmp_parray[$key] = $value;
			}
		}
		$urltail .= '&p=' . urlencode(SMWInfolink::encodeParameters($tmp_parray));
		$printoutstring = '';
		foreach ($this->m_printouts as $printout) {
			$printoutstring .= $printout->getSerialisation() . "\n";
		}
		if ('' != $printoutstring)          $urltail .= '&po=' . urlencode($printoutstring);
		if ('' != $this->m_params['sort'])  $urltail .= '&sort=' . $this->m_params['sort'];
		if ('' != $this->m_params['order']) $urltail .= '&order=' . $this->m_params['order'];

		if ($this->m_querystring != '') {
			$queryobj = SMWQueryProcessor::createQuery($this->m_querystring, $this->m_params, false, '', $this->m_printouts);
			$queryobj->querymode = SMWQuery::MODE_INSTANCES; ///TODO: Somewhat hacky (just as the query mode computation in SMWQueryProcessor::createQuery!)
			$res = smwfGetStore()->getQueryResult($queryobj);
			$printer = SMWQueryProcessor::getResultPrinter($this->m_params['format'],false,$res);
			$result_mime = $printer->getMimeType($res);
			if ($result_mime == false) {
				$navigation = $this->getNavigationBar($res, $urltail);
				$result = '<div style="text-align: center;">' . $navigation;
				$result .= '</div>' . $printer->getResult($res, $this->m_params,SMW_OUTPUT_HTML);
				$result .= '<div style="text-align: center;">' . $navigation . '</div>';
			} else { // make a stand-alone file
				$result = $printer->getResult($res, $this->m_params,SMW_OUTPUT_FILE);
			}
		}

		if ($result_mime == false) {
			if ($this->m_querystring) {
				$wgOut->setHTMLtitle($this->m_querystring);
			} else {
				$wgOut->setHTMLtitle(wfMsg('ask'));
			}
			$result = $this->getInputForm($printoutstring, 'offset=' . $this->m_params['offset'] . '&limit=' . $this->m_params['limit'] . $urltail) . $result;
			$wgOut->addHTML($result);
		} else {
			$wgOut->disable();
			header( "Content-type: $result_mime; charset=UTF-8" );
			print $result;
		}
	}


	protected function getInputForm($printoutstring, $urltail) {
		global $wgUser, $smwgQSortingSupport;
		$skin = $wgUser->getSkin();
		$result = '';

		if ($this->m_editquery) {
			$spectitle = Title::makeTitle( NS_SPECIAL, 'Ask' );
			$result .= '<form name="ask" action="' . $spectitle->escapeLocalURL() . '" method="get">' . "\n" .
			           '<input type="hidden" name="title" value="' . $spectitle->getPrefixedText() . '"/>';
			$result .= '<table style="width: 100%; "><tr><th>' . wfMsg('smw_ask_queryhead') . '</th><th>' . wfMsg('smw_ask_printhead') . '</th></tr>' .
			         '<tr><td><textarea name="q" cols="20" rows="6">' . htmlspecialchars($this->m_querystring) . '</textarea></td>' .
			         '<td><textarea name="po" cols="20" rows="6">' . htmlspecialchars($printoutstring) . '</textarea></td></tr></table>' . "\n";
			if ($smwgQSortingSupport) {
				if ( $this->m_params['sort'] . $this->m_params['order'] == '') {
					$orders = Array(); // do not even show one sort input here
				} else {
					$sorts = explode(',', $this->m_params['sort']);
					$orders = explode(',', $this->m_params['order']);
					reset($sorts);
				}
				$i = 0;
				foreach ($orders as $order) {
					if ($i>0) {
						$result .= '<br />';
					}
					$result .=  wfMsg('smw_ask_sortby') . ' <input type="text" name="sort' . $i . '" value="' .
					            htmlspecialchars(current($sorts)) . '"/> <select name="order' . $i . '"><option ';
					if ($order == 'ASC') $result .= 'selected="selected" ';
					$result .=  'value="ASC">' . wfMsg('smw_ask_ascorder') . '</option><option ';
					if ($order == 'DESC') $result .= 'selected="selected" ';
					$result .=  'value="DESC">' . wfMsg('smw_ask_descorder') . '</option></select> ';
					next($sorts);
					$i++;
				}
				$result .= '<input type="hidden" name="sc" value="' . $i . '"/>';
				$result .= '<a href="' . htmlspecialchars($skin->makeSpecialUrl('Ask',$urltail . '&eq=yes&sc=1')) . '">' . wfMsg('smw_add_sortcondition') . '</a>'; // note that $urltail uses a , separated list for sorting, so setting sc to 1 always adds one new condition
			}
			$result .= '<br /><input type="submit" value="' . wfMsg('smw_ask_submit') . '"/>' .
			           '<input type="hidden" name="eq" value="yes"/>' . 
			           ' <a href="' . htmlspecialchars($skin->makeSpecialUrl('Ask',$urltail)) . '">' . wfMsg('smw_ask_hidequery') . '</a> | <a href="' . htmlspecialchars(wfMsg('smw_ask_doculink')) . '">' . wfMsg('smw_ask_help') . '</a>' .
			           "\n</form><br />";
		} else {
			$result .= '<p><a href="' . htmlspecialchars($skin->makeSpecialUrl('Ask',$urltail . '&eq=yes')) . '">' . wfMsg('smw_ask_editquery') . '</a></p>';
		}
		return $result;
	}

	/**
	 * Build the navigation for some given query result, reuse url-tail parameters
	 */
	protected function getNavigationBar($res, $urltail) {
		global $wgUser, $smwgQMaxLimit;
		$skin = $wgUser->getSkin();
		$offset = $this->m_params['offset'];
		$limit  = $this->m_params['limit'];
		// prepare navigation bar
		if ($offset > 0) {
			$navigation = '<a href="' . htmlspecialchars($skin->makeSpecialUrl('Ask','offset=' . max(0,$offset-$limit) . '&limit=' . $limit . $urltail)) . '">' . wfMsg('smw_result_prev') . '</a>';
		} else {
			$navigation = wfMsg('smw_result_prev');
		}

		$navigation .= '&nbsp;&nbsp;&nbsp;&nbsp; <b>' . wfMsg('smw_result_results') . ' ' . ($offset+1) . '&ndash; ' . ($offset + $res->getCount()) . '</b>&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($res->hasFurtherResults()) 
			$navigation .= ' <a href="' . htmlspecialchars($skin->makeSpecialUrl('Ask','offset=' . ($offset+$limit) . '&limit=' . $limit . $urltail)) . '">' . wfMsg('smw_result_next') . '</a>';
		else $navigation .= wfMsg('smw_result_next');

		$max = false; $first=true;
		foreach (array(20,50,100,250,500) as $l) {
			if ($max) continue;
			if ($first) {
				$navigation .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(';
				$first = false;
			} else $navigation .= ' | ';
			if ($l > $smwgQMaxLimit) {
				$l = $smwgQMaxLimit;
				$max = true;
			}
			if ( $limit != $l ) {
				$navigation .= '<a href="' . htmlspecialchars($skin->makeSpecialUrl('Ask','offset=' . $offset . '&limit=' . $l . $urltail)) . '">' . $l . '</a>';
			} else {
				$navigation .= '<b>' . $l . '</b>';
			}
		}
		$navigation .= ')';
		return $navigation;
	}

	/**
	 * Exectues ask-interface as done in SMW<=0.7, using a simple textbox interface and supporting only
	 * certain parameters.
	 */
	protected function executeSimpleAsk() {
		global $wgRequest, $wgOut, $smwgQEnabled, $smwgQMaxLimit, $wgUser, $smwgQSortingSupport, $smwgIP;

		$skin = $wgUser->getSkin();

		$query = $wgRequest->getVal( 'query' );
		$sort  = $wgRequest->getVal( 'sort' );
		$order = $wgRequest->getVal( 'order' );
		$limit = $wgRequest->getVal( 'limit' );
		if ('' == $limit) $limit =  20;
		$offset = $wgRequest->getVal( 'offset' );
		if ('' == $offset) $offset = 0;

		// display query form
		$spectitle = Title::makeTitle( NS_SPECIAL, 'Ask' );
		$docutitle = Title::newFromText(wfMsg('smw_ask_doculink'), NS_HELP);
		$html = '<form name="ask" action="' . $spectitle->escapeLocalURL() . '" method="get">' . "\n" .
		         '<input type="hidden" name="title" value="' . $spectitle->getPrefixedText() . '"/>' ;
		$html .= '<textarea name="query" cols="40" rows="6">' . htmlspecialchars($query) . '</textarea><br />' . "\n";
		
		if ($smwgQSortingSupport) {
			$html .=  wfMsg('smw_ask_sortby') . ' <input type="text" name="sort" value="' .
			          htmlspecialchars($sort) . '"/> <select name="order"><option ';
			if ($order == 'ASC') $html .= 'selected="selected" ';
			$html .=  'value="ASC">' . wfMsg('smw_ask_ascorder') . '</option><option ';
			if ($order == 'DESC') $html .= 'selected="selected" ';
			$html .=  'value="DESC">' . wfMsg('smw_ask_descorder') . '</option></select> <br />';
		}
		$html .= '<br /><input type="submit" value="' . wfMsg('smw_ask_submit') . '"/> <a href="' . $docutitle->getFullURL() . '">' . wfMsg('smw_ask_help') . "</a>\n</form>";
		
		// print results if any
		if ($smwgQEnabled && ('' != $query) ) {
			include_once( "$smwgIP/includes/SMW_QueryProcessor.php" );
			$params = array('offset' => $offset, 'limit' => $limit, 'format' => 'broadtable', 'mainlabel' => ' ', 'link' => 'all', 'default' => wfMsg('smw_result_noresults'), 'sort' => $sort, 'order' => $order);
			$queryobj = SMWQueryProcessor::createQuery($query, $params, false);
			$res = smwfGetStore()->getQueryResult($queryobj);
			$printer = new SMWTableResultPrinter('broadtable',false);
			$result = $printer->getResultHTML($res, $params);

			// prepare navigation bar
			if ($offset > 0) 
				$navigation = '<a href="' . htmlspecialchars($skin->makeSpecialUrl('Ask','offset=' . max(0,$offset-$limit) . '&limit=' . $limit . '&query=' . urlencode($query) . '&sort=' . urlencode($sort) .'&order=' . urlencode($order))) . '">' . wfMsg('smw_result_prev') . '</a>';
			else $navigation = wfMsg('smw_result_prev');

			$navigation .= '&nbsp;&nbsp;&nbsp;&nbsp; <b>' . wfMsg('smw_result_results') . ' ' . ($offset+1) . '&ndash; ' . ($offset + $res->getCount()) . '</b>&nbsp;&nbsp;&nbsp;&nbsp;';

			if ($res->hasFurtherResults()) 
				$navigation .= ' <a href="' . htmlspecialchars($skin->makeSpecialUrl('Ask','offset=' . ($offset+$limit) . '&limit=' . $limit . '&query=' . urlencode($query) . '&sort=' . urlencode($sort) .'&order=' . urlencode($order))) . '">' . wfMsg('smw_result_next') . '</a>';
			else $navigation .= wfMsg('smw_result_next');

			$max = false; $first=true;
			foreach (array(20,50,100,250,500) as $l) {
				if ($max) continue;
				if ($first) {
					$navigation .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(';
					$first = false;
				} else $navigation .= ' | ';
				if ($l > $smwgQMaxLimit) {
					$l = $smwgQMaxLimit;
					$max = true;
				}
				if ( $limit != $l ) {
					$navigation .= '<a href="' . htmlspecialchars($skin->makeSpecialUrl('Ask','offset=' . $offset . '&limit=' . $l . '&query=' . urlencode($query) . '&sort=' . urlencode($sort) .'&order=' . urlencode($order))) . '">' . $l . '</a>';
				} else {
					$navigation .= '<b>' . $l . '</b>';
				}
			}
			$navigation .= ')';

			$html .= '<br /><div style="text-align: center;">' . $navigation;
			$html .= '<br />' . $result;
			$html .= '<br />' . $navigation . '</div>';
		} elseif (!$smwgQEnabled) {
			$html .= '<br />' . wfMsgForContent('smw_iq_disabled');
		}
		$wgOut->addHTML($html);
	}

}

