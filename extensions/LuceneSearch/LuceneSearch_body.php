<?php
/*
 * Copyright 2004, 2005 Kate Turner, Brion Vibber.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * $Id: LuceneSearch.php 14800 2006-06-17 16:53:39Z robchurch $
 */

if (!defined('MEDIAWIKI')) {
	die( "This file is part of MediaWiki, it is not a valid entry point\n" );
}

global $IP;
require_once($IP.'/includes/SearchEngine.php');

# Add messages
global $wgMessageCache, $wgLuceneSearchMessages;
foreach( $wgLuceneSearchMessages as $key => $value ) {
	$wgMessageCache->addMessages( $wgLuceneSearchMessages[$key], $key );
}

class LuceneSearch extends SpecialPage
{
	var $namespaces;

	function LuceneSearch() {
		SpecialPage::SpecialPage('Search');
	}

	function makelink($term, $offset, $limit) {
		global $wgRequest, $wgScript;
		$link = $wgScript.'?title=Special:Search&amp;search='.
			urlencode($term).'&amp;fulltext=Search';
		foreach(SearchEngine::searchableNamespaces() as $ns => $name)
			if ($wgRequest->getCheck('ns' . $ns))
				$link .= '&amp;ns'.$ns.'=1';
		$link .= '&amp;offset='.$offset.'&amp;limit='.$limit;
		return $link;
	}

	function setHeaders() {
		global $wgRequest;
		if( $wgRequest->getVal( 'gen' ) == 'titlematch' ) {
			# NOP; avoid initializing the message cache
		} else {
			return parent::setHeaders();
		}
	}

	/**
	 * Callback for formatting of near-match title list.
	 *
	 * @param LuceneSearchSet $result
	 * @return string
	 * @access private
	 */
	function formatNearMatch( $result ) {
		$title = $result->getTitle();
		return wfMsg( 'searchnearmatch',
			$this->mSkin->makeKnownLinkObj( $title ) );
	}

	function execute($par) {
		global $wgRequest, $wgOut, $wgTitle, $wgContLang, $wgUser,
			$wgScriptPath, $wgLSuseold, $wgInputEncoding,
			$wgLuceneDisableTitleMatches, $wgLuceneDisableSuggestions,
			$wgUser;
		global $wgGoToEdit;

		$fname = 'LuceneSearch::execute';
		wfProfileIn( $fname );
		$this->setHeaders();
		$wgOut->addHTML('<!-- titlens = '. $wgTitle->getNamespace() . '-->');

		foreach(SearchEngine::searchableNamespaces() as $ns => $name)
			if ($wgRequest->getCheck('ns' . $ns))
				$this->namespaces[] = $ns;

		if (count($this->namespaces) == 0) {
			foreach(SearchEngine::searchableNamespaces() as $ns => $name) {
				if($wgUser->getOption('searchNs' . $ns)) {
					$this->namespaces[] = $ns;
				}
			}
			if (count($this->namespaces) == 0) {
				global $wgNamespacesToBeSearchedDefault;
				foreach( $wgNamespacesToBeSearchedDefault as $ns => $searchit ) {
					if( $searchit ) {
						$this->namespaces[] = $ns;
					}
				}
			}
		}

		$bits = split('/', $wgRequest->getVal('title'), 2);
		if(!empty($bits[1]))
			$q = str_replace('_', ' ', $bits[1]);
		else
			$q = $wgRequest->getText('search');
		list( $limit, $offset ) = $wgRequest->getLimitOffset( LS_PER_PAGE, 'searchlimit' );

		if( $wgRequest->getVal( 'gen' ) == 'titlematch' ) {
			$this->sendTitlePrefixes( $q, $limit );
			wfProfileOut( $fname );
			return;
		}

		$this->mSkin =& $wgUser->getSkin();
		if (!$wgLuceneDisableSuggestions)
			$wgOut->addHTML($this->makeSuggestJS());
		$wgOut->addLink(array(
			'rel' => 'stylesheet',
			'type' => 'text/css',
			'media' => 'screen,projection',
			'href' => $wgScriptPath . '/extensions/LuceneSearch/lucenesearch.css'
			)
		);

		$wgOut->addWikiText(wfMsg('searchresulttext'));
		$wgOut->addHTML($this->showShortDialog($q));

		if ($q !== false && strlen($q) > 0) {
			if (!($wgRequest->getText('fulltext'))) {
				$t = SearchEngine::getNearMatch($q);
				if(!is_null($t)) {
					$wgOut->redirect($t->getFullURL());
					wfProfileOut( $fname );
					return;
				}
			}

			# No match, generate an edit URL
			$t = Title::newFromText($q);
			if(!$wgRequest->getText('go') || is_null($t)) {
				$editurl = ''; # hrm...
			} else {
				wfRunHooks( 'SpecialSearchNogomatch', array( &$t ) );
				# If the feature is enabled, go straight to the edit page
				if ($wgGoToEdit) {
					$wgOut->redirect($t->getFullURL('action=edit'));
					return;
				}
                		$wgOut->addWikiText( wfMsg( 'noexactmatch', $t->getPrefixedText() ) );
			}

			global $wgDisableTextSearch;
			if( !$wgDisableTextSearch ) {
				$results = LuceneSearchSet::newFromQuery( 'search', $q, $this->namespaces, $limit, $offset );
			}

			if( $wgDisableTextSearch || $results === false ) {
				global $wgInputEncoding;
				if ( $wgDisableTextSearch ) {
					$wgOut->addHTML(wfMsg('searchdisabled'));
				} else {
					$wgOut->addWikiText(wfMsg('lucenefallback'));
				}
				$wgOut->addHTML(wfMsg('googlesearch',
					htmlspecialchars($q),
					htmlspecialchars($wgInputEncoding),
                                        htmlspecialchars( wfMsg( 'search' ) ) ) );
				wfProfileOut( $fname );
				return;
			}

			$subtitleMsg = is_object( Title::newFromText( $q ) ) ? 'searchsubtitle' : 'searchsubtitleinvalid';
			$wgOut->setSubtitle( $wgOut->parse( wfMsg( $subtitleMsg, wfEscapeWikiText( $q ) ) ) );

			// If the search returned no results, an alternate fuzzy search
			// match may be displayed as a suggested search. Link it.
			if( $results->hasSuggestion() ) {
				$suggestion = $results->getSuggestion();
				$o = ' ' . wfMsg('searchdidyoumean',
						$this->makeLink( $suggestion, $offset, $limit ),
						htmlspecialchars( $suggestion ) );
				$wgOut->addHTML( '<div style="text-align: center;">'.$o.'</div>' );
			}

			$nmtext = '';
			if ($offset == 0 && !$wgLuceneDisableTitleMatches) {
				$titles = LuceneSearchSet::newFromQuery( 'titlematch', $q, $this->namespaces, 5 );
				if( $titles && $titles->hasResults() ) {
					$nmtext = '<p>'.wfMsg('searchnearmatches').'</p>';
					$nmtext .= '<ul>';
					$nmtext .= implode( "\n", $titles->iterateResults(
						array( &$this, 'formatNearMatch' ) ) );
					$nmtext .= '</ul>';
					$nmtext .= '<hr />';
				}
			}

			$wgOut->addHTML($nmtext);

			if( !$results->hasResults() ) {
				# Pass search terms back in a few different formats
				# $1: Plain search terms
				# $2: Search terms with s/ /_/
				# $3: URL-encoded search terms
				$tmsg = array( htmlspecialchars( $q ), htmlspecialchars( str_replace( ' ', '_', $q ) ), wfUrlEncode( $q ) );
				$wgOut->addHtml( wfMsgWikiHtml( 'searchnoresults', $tmsg[0], $tmsg[1], $tmsg[2] ) );
			} else {
				#$showresults = min($limit, count($results)-$numresults);
				$i = $offset;
				$resq = trim(preg_replace("/[ |\\[\\]()\"{}+]+/", " ", $q));
				$contextWords = implode("|",
					array_map( array( &$this, 'regexQuote' ),
						$wgContLang->convertForSearchResult(split(" ", $resq))));

				$top = wfMsg('searchnumber', $offset + 1,
					min($results->getTotalHits(), $offset+$limit), $results->getTotalHits());
				$out = "<ul>";
				$numchunks = ceil($results->getTotalHits() / $limit);
				$whichchunk = $offset / $limit;
				$prevnext = "";
				if ($whichchunk > 0)
					$prevnext .= '<a href="'.
						$this->makelink($q, $offset-$limit, $limit).'">'.
						wfMsg('searchprev').'</a> ';
				$first = max($whichchunk - 11, 0);
				$last = min($numchunks, $whichchunk + 11);
				//$wgOut->addWikiText("whichchunk=$whichchunk numchunks=$numchunks first=$first last=$last num=".count($chunks)." limit=$limit offset=$offset results=".count($results)."\n\n");
				if ($last - $first > 1) {
					for($i = $first; $i < $last; $i++) {
						if ($i === $whichchunk)
							$prevnext .= '<strong>'.($i+1).'</strong> ';
						else
							$prevnext .= '<a href="'.
								$this->makelink($q, $limit*$i,
								$limit).'">'.($i+1).'</a> ';
					}
				}
				if ($whichchunk < $last-1)
					$prevnext .= '<a href="'.
						$this->makelink($q, $offset + $limit, $limit).'">'.
						wfMsg('searchnext').'</a> ';
				$prevnext = '<div style="text-align: center;">'.$prevnext.'</div>';
				$top .= $prevnext;
				$out .= implode( "\n", $results->iterateResults(
					array( &$this, 'showHit'), $contextWords ) );
				$out .= '</ul>';
			}
			$wgOut->addHTML('<hr />');
			if( isset( $top ) ) $wgOut->addHTML( $top );
			if( isset( $out ) ) $wgOut->addHTML( $out );
			if( isset( $prevnext ) ) $wgOut->addHTML('<hr />' . $prevnext);
			$wgOut->addHTML($this->showFullDialog($q));
		}
		$wgOut->setRobotpolicy('noindex,nofollow');
                $wgOut->setArticleRelated(false);
		wfProfileOut( $fname );
	}

	/**
	 * Stupid hack around PHP's limited lambda support
	 * @access private
	 */
	function regexQuote( $term ) {
		return preg_quote( $term, '/' );
	}

	/**
	 * Send a list of titles starting with the given prefix.
	 * These are read by JavaScript code via an XmlHttpRequest
	 * and displayed in a drop-down box for selection.
	 *
	 * @param string $query
	 * @param int $limit
	 * @return void - side effects only
	 * @access private
	 */
	function sendTitlePrefixes( $query, $limit ) {
		global $wgOut, $wgInputEncoding;
		$wgOut->disable();

		if( $limit < 1 || $limit > 50 )
			$limit = 20;
		header('Content-Type: text/plain; charset='.$wgInputEncoding);
		if( strlen( $query ) < 1 ) {
			return;
		}

		$results = $this->doTitlePrefixSearch( $query, $limit );
		if( $results && count( $results ) > 0 ) {
			foreach( $results as $result ) {
				echo $result->getPrefixedUrl() . "\n";
			}
		}
	}

	function showHit($result, $terms) {
		$fname = 'LuceneSearch::showHit';
		wfProfileIn($fname);
		global $wgUser, $wgContLang, $wgLSuseold, $wgTitle, $wgOut, $wgDisableSearchContext;

		$t = $result->getTitle();
		if(is_null($t)) {
			wfProfileOut($fname);
			return "<!-- Broken link in search result -->\n";
		}

		//$contextlines = $wgUser->getOption('contextlines');
		$contextlines = 2;
		$contextchars = $wgUser->getOption('contextchars');
		if ('' == $contextchars)
			$contextchars = 50;
		if ( intval($contextchars) > 5000 )
			$contextchars = 5000;

		$link = $this->mSkin->makeKnownLinkObj($t, '');

		if ( !$wgDisableSearchContext ) {
			$rev = $wgLSuseold ? new Article($t) : Revision::newFromTitle($t);
			if ($rev === null) {
				wfProfileOut( $fname );
				return "<!--Broken link in search results: ".$t->getDBKey()."-->\n";
			}

			$text = $wgLSuseold ? $rev->getContent(false) : $rev->getText();
					$size = wfMsg('searchsize', sprintf("%.1f", strlen($text) / 1024), str_word_count($text));
			$text = $this->removeWiki($text);
			$date = $wgContLang->timeanddate($rev->getTimestamp());
		} else {
			$text = '';
			$date = '';
		}

		$lines = explode("\n", $text);

		$max = intval($contextchars) + 1;
		$pat1 = "/(.*)($terms)(.{0,$max})/i";

		$lineno = 0;

		$extract = '';
		wfProfileIn($fname.'-extract');
		foreach ($lines as $line) {
			if (0 == $contextlines)
				break;
			++$lineno;
			if (!preg_match($pat1, $line, $m))
				continue;
			--$contextlines;
			$pre = $wgContLang->truncate($m[1], -$contextchars, '...');

			if (count($m) < 3)
				$post = '';
			else
				$post = $wgContLang->truncate($m[3], $contextchars, '...');

			$found = $m[2];

			$line = htmlspecialchars($pre . $found . $post);
			$pat2 = '/([^ ]*(' . $terms . ")[^ ]*)/i";
			$line = preg_replace($pat2,
			  "<span class='searchmatch'>\\1</span>", $line);

			$extract .= "<br /><small>{$line}</small>\n";
		}
		wfProfileOut($fname.'-extract');
		wfProfileOut($fname);
		if (!$wgDisableSearchContext) { $date = $wgContLang->timeanddate($rev->getTimestamp()); }
		else { $date = ''; }
		$percent = sprintf('%2.1f%%', $result->getScore() * 100);
		$score = wfMsg('searchscore', $percent);
		//$url = $t->getFullURL();
		return '<li style="padding-bottom: 1em;">'.$link.$extract.'<br />'
			.'<span style="color: green; font-size: small;">'
			."$score - $size - $date</span></li>\n";
	}

	/* Basic wikitext removal */
	function removeWiki($text) {
		//$text = preg_replace("/'{2,5}/", "", $text);
		$text = preg_replace("/\[[a-z]+:\/\/[^ ]+ ([^]]+)\]/", "\\2", $text);
		//$text = preg_replace("/\[\[([^]|]+)\]\]/", "\\1", $text);
		//$text = preg_replace("/\[\[([^]]+\|)?([^|]]+)\]\]/", "\\2", $text);
		$text = preg_replace("/\\{\\|(.*?)\\|\\}/", "", $text);
		$text = preg_replace("/\\[\\[[A-Za-z_-]+:([^|]+?)\\]\\]/", "", $text);
		$text = preg_replace("/\\[\\[([^|]+?)\\]\\]/", "\\1", $text);
		$text = preg_replace("/\\[\\[([^|]+\\|)(.*?)\\]\\]/", "\\2", $text);
		$text = preg_replace("/<\/?[^>]+>/", "", $text);
		$text = preg_replace("/'''''/", "", $text);
		$text = preg_replace("/('''|<\/?[iIuUbB]>)/", "", $text);
		$text = preg_replace("/''/", "", $text);

		return $text;
	}

	function showShortDialog($term) {
		global $wgScript, $wgLuceneDisableSuggestions;

		$action = "$wgScript";
		$searchButton = '<input type="submit" name="fulltext" value="' .
			htmlspecialchars(wfMsg('powersearch')) . "\" />\n";
		$onkeyup = $wgLuceneDisableSuggestions ? '' :
			' onkeyup="resultType()" autocomplete="off" ';
		$searchField = "<div><input type='text' id='lsearchbox' $onkeyup "
			. "style='margin-left: 25%; width: 50%; ' value=\""
			. htmlspecialchars($term) . '"'
			. " name=\"search\" />\n"
			. "<span id='loadStatus'></span>"
			. $searchButton
			. "<div id='results'></div></div>";

		$ret = $searchField /*. $searchButton*/;
                return
		  '<form id="search" method="get" '
                  . "action=\"$action\"><input type='hidden' name='title' value='Special:Search' />\n<div>{$ret}</div>\n</form>\n";
	}

	function showFullDialog($term) {
		global $wgContLang;
		$namespaces = '';
		foreach(SearchEngine::searchableNamespaces() as $ns => $name) {
			$checked = in_array($ns, $this->namespaces)
			           ? ' checked="checked"' : '';
			$name = str_replace('_', ' ', $name);
			if('' == $name) {
				$name = wfMsg('blanknamespace');
			}
			$namespaces .= " <label><input type='checkbox' value=\"1\" name=\"" .
			               "ns{$ns}\"{$checked} />{$name}</label>\n";
		}

		$searchField = "<input type='text' name=\"search\" value=\"" .
					   htmlspecialchars($term) ."\" size=\"16\" />\n";

		$searchButton = '<input type="submit" name="fulltext" value="' .
						htmlspecialchars(wfMsg('powersearch')) . "\" />\n";

		$redirect = ''; # What's this for?
		$ret = wfMsg('lucenepowersearchtext',
			$namespaces, $redirect, $searchField,
			'', '', '', '', '', # Dummy placeholders
			$searchButton);

		$title = Title::makeTitle(NS_SPECIAL, 'Search');
		$action = $title->escapeLocalURL();
		return "<br /><br />\n<form id=\"powersearch\" method=\"get\" " .
		"action=\"$action\">\n{$ret}\n</form>\n";
	}

	function makeSuggestJS() {
		global $wgScript, $wgArticlePath;
		return <<<___EOF___
<script type="text/javascript"><!--

function openXMLHttpRequest() {
	if( window.XMLHttpRequest ) {
		return new XMLHttpRequest();
	} else if( window.ActiveXObject && navigator.platform != 'MacPPC' ) {
		// IE/Mac has an ActiveXObject but it doesn't work.
		return new ActiveXObject("Microsoft.XMLHTTP");
	} else {
		return null;
	}
}
var xmlHttp = openXMLHttpRequest();
var searchCache = {};
var searchStr;
var searchTimeout;

function getResults()
{
  var encStr = escape(searchStr.replace(/ /g, '_'));
  xmlHttp.open("GET", "$wgScript?title=Special:Search&gen=titlematch&ns0=0&limit=10&search="
    + encStr, true);

  xmlHttp.onreadystatechange = parseResults;
  xmlHttp.send(null);
}

function parseResults()
{
  if (xmlHttp.readyState > 3)
  {
    document.getElementById("loadStatus").innerHTML = "";
    var resultArr = xmlHttp.responseText.split("\\n");
    resultArr.pop(); // trim final newline
    searchCache[searchStr.toLowerCase()] = resultArr;
    showResults(resultArr);
  }
}

function showResults(resultArr)
{
  var returnStr = "";
  var resultsEl = document.getElementById("results");

  if (resultArr.length < 1)
    resultsEl.innerHTML = "No results";
  else
  {
    resultsEl.innerHTML = "";

    for (var i=0; i < resultArr.length; i++)
    {
      var linkEl = document.createElement("a");
      linkEl.href = "$wgArticlePath".replace(/\\$1/, resultArr[i]);
      var textEl = document.createTextNode(decodeURIComponent(resultArr[i]).replace(/_/g, ' '));
      linkEl.appendChild(textEl);
      resultsEl.appendChild(linkEl);
    }
  }

  resultsEl.style.display = "block";
}

function resultType()
{
  if (!xmlHttp) return;
  searchStr = document.getElementById("lsearchbox").value;
  if (searchTimeout) clearTimeout(searchTimeout);

  if (searchStr != "")
  {
    if (searchCache[searchStr.toLowerCase()])
      showResults(searchCache[searchStr.toLowerCase()])
    else
      searchTimeout = setTimeout(getResults, 500);
  }
  else
  {
    document.getElementById("results").style.display = "none";
  }
}
//--></script>
___EOF___;
	}
}

class LuceneResult {
	/**
	 * Read an input line from a socket and return a score & title pair.
	 * Will return FALSE if no more data or I/O error.
	 *
	 * @param resource $sock
	 * @return array (float, Title)
	 * @access private
	 */
	function LuceneResult( $line ) {
		wfDebug( "Lucene line: '$line'\n" );
		list( $score, $namespace, $title ) = split( ' ', $line );

		$score     = floatval( $score );
		$namespace = intval( $namespace );
		$title     = urldecode( $title );

		global $wgUseLatin1;
		if( $wgUseLatin1 ) {
			global $wgContLang, $wgInputEncoding;
			$title = $wgContLang->iconv( 'utf-8', $wgInputEncoding, $title );
		}

		$this->mTitle = Title::makeTitle( $namespace, $title );
		$this->mScore = $score;
	}

	function getTitle() {
		return $this->mTitle;
	}

	function getScore() {
		return $this->mScore;
	}
}

class LuceneSearchSet {
	/**
	 * Contact the MWDaemon search server and return a wrapper
	 * object with the set of results. Results may be cached.
	 *
	 * @param string $method The protocol verb to use
	 * @param string $query
	 * @param int $limit
	 * @return array
	 * @access public
	 * @static
	 */
	function newFromQuery( $method, $query, $namespaces = array(), $limit = 10, $offset = 0 ) {
		$fname = 'LuceneSearchSet::newFromQuery';
		wfProfileIn( $fname );

		global $wgLuceneHost, $wgLucenePort, $wgDBname, $wgMemc;

		global $wgUseLatin1, $wgContLang, $wgInputEncoding;
		$enctext = rawurlencode( trim( $wgUseLatin1
			? $wgContLang->iconv( $wgInputEncoding, 'utf-8', $query )
			: $query ) );
		$searchPath = "/$method/$wgDBname/$enctext?" .
			wfArrayToCGI( array(
				'namespaces' => implode( ',', $namespaces ),
				'offset'     => $offset,
				'limit'      => $limit,
			) );

		global $wgOut;
		$wgOut->addHtml( "<!-- querying $searchPath -->\n" );

		// Cache results for fifteen minutes; they'll be read again
		// on reloads and paging.
		$key = $wgDBname.':lucene:' . md5( $searchPath );
		
		$resultSet = $wgMemc->get( $key );
		if( is_object( $resultSet ) ) {
			wfDebug( "$fname: got cached lucene results for key $key\n" );
			wfProfileOut( $fname );
			return $resultSet;
		}

		if( is_array( $wgLuceneHost ) ) {
			$hosts = $wgLuceneHost;
		} else {
			$hosts = array( $wgLuceneHost );
		}
		$remaining = count( $hosts );
		$pick = mt_rand( 0, count( $hosts ) - 1 );
		$data = false;

		while( $data === false && $remaining-- > 0 ) {
			// Start at a random position in the list, and rotate through
			// until we find a host that works or run out of hosts.
			$pick = ($pick + 1) % count( $hosts );
			$host = $hosts[$pick];
			$searchUrl = "http://$host:$wgLucenePort$searchPath";
			
			wfDebug( "Fetching search data from $searchUrl\n" );
			wfSuppressWarnings();
			wfProfileIn( $fname.'-contact-'.$host );
			$data = wfGetHTTP( $searchUrl );
			wfProfileOut( $fname.'-contact-'.$host );
			wfRestoreWarnings();
			
			if( $data === false ) {
				wfDebug( "Failed on $searchUrl!\n" );
			}
		}

		if( $data === false || $data === '' ) {
			// Network error or server error
			wfProfileOut( $fname );
			return false;
		} else {
			$inputLines = explode( "\n", trim( $data ) );
			$resultLines = array_map( 'trim', $inputLines );
		}

		$suggestion = null;
		$totalHits = null;

		if( $method == 'search' ) {
			# This method outputs a summary line first.
			$totalHits = array_shift( $resultLines );
			if( $totalHits === false ) {
				# I/O error? this shouldn't happen
				wfDebug( "Couldn't read summary line...\n" );
			} else {
				$totalHits = intval( $totalHits );
				wfDebug( "total [$totalHits] hits\n" );
				if( $totalHits == 0 ) {
					# No results, but we got a suggestion...
					$suggestion = urldecode( array_shift( $resultLines ) );
					wfDebug( "no results; suggest: [$suggestion]\n" );
				}
			}
		}

		$resultSet = new LuceneSearchSet( $resultLines, $totalHits, $suggestion );

		wfDebug( $fname.": caching lucene results for key $key\n" );
		global $wgLuceneCacheExpiry;
		$wgMemc->add( $key, $resultSet, $wgLuceneCacheExpiry );

		wfProfileOut( $fname );
		return $resultSet;
	}

	/**
	 * Private constructor. Use LuceneSearchSet::newFromQuery().
	 *
	 * @param array $lines
	 * @param int $totalHits
	 * @param string $suggestion
	 * @access private
	 */
	function LuceneSearchSet( $lines, $totalHits = null, $suggestion = null ) {
		$this->mTotalHits  = $totalHits;
		$this->mSuggestion = $suggestion;
		$this->mResults    = $lines;
	}

	function hasResults() {
		return count( $this->mResults ) > 0;
	}

	/**
	 * Some search modes return a total hit count for the query
	 * in the entire article database. This may include pages
	 * in namespaces that would not be matched on the given
	 * settings.
	 *
	 * @return int
	 * @access public
	 */
	function getTotalHits() {
		return $this->mTotalHits;
	}

	/**
	 * Some search modes return a suggested alternate term if there are
	 * no exact hits. Returns true if there is one on this set.
	 *
	 * @return bool
	 * @access public
	 */
	function hasSuggestion() {
		return is_string( $this->mSuggestion ) && $this->mSuggestion != '';
	}

	/**
	 * Some search modes return a suggested alternate term if there are
	 * no exact hits. Check hasSuggestion() first.
	 *
	 * @return string
	 * @access public
	 */
	function getSuggestion() {
		return $this->mSuggestion;
	}

	/**
	 * Iterate over all returned results, passing LuceneResult objects
	 * to a given callback for processing.
	 *
	 * @param callback $callback
	 * @param mixed $userdata Optional data to pass to the callback
	 * @return array
	 * @access public
	 */
	function iterateResults( $callback, $userdata = null ) {
		$out = array();
		foreach( $this->mResults as $key => $line ) {
			$out[$key] = call_user_func( $callback, new LuceneResult( $line ), $userdata );
		}
		return $out;
	}
}

?>
