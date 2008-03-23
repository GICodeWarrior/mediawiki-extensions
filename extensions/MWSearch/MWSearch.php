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
 * $Id$
 */

# To use this, add something like the following to LocalSettings:
# 
#  $wgSearchType = 'LuceneSearch';
#  $wgLuceneHost = '192.168.0.1';
#  $wgLucenePort = 8123;
#
#  require_once("extensions/MWSearch/MWSearch.php");
#
# To load-balance with from multiple servers:
#
#  $wgLuceneHost = array( "192.168.0.1", "192.168.0.2" );
#
# The MWDaemon search daemon needs to be running on the specified host(s)
# - it's in the 'lucene-search' and 'mwsearch' modules in CVS.
##########

$wgLuceneDisableSuggestions = false;
$wgLuceneDisableTitleMatches = false;

# Back-end version
$wgLuceneSearchVersion = 2;

# Not a valid entry point, skip unless MEDIAWIKI is defined
if (defined('MEDIAWIKI')) {
$wgExtensionFunctions[] = "wfLuceneSearch";

$wgExtensionCredits['other'][] = array(
	'name'           => 'MWSearch',
	'version'        => preg_replace( '/^.* (\d\d\d\d-\d\d-\d\d) .*$/', '\1', '$LastChangedDate$' ), #just the date of the last change
	'author'         => array( 'Kate Turner', 'Brion Vibber' ),
	'descriptionmsg' => 'mwsearch-desc',
);
$wgExtensionMessagesFiles['MWSearch'] = dirname(__FILE__) . '/MWSearch.i18n.php';

function wfLuceneSearch() {

require_once( 'SearchEngine.php' );

class LuceneSearch extends SearchEngine {
	/**
	 * Perform a full text search query and return a result set.
	 *
	 * @param string $term - Raw search term
	 * @return LuceneSearchSet
	 * @access public
	 */
	function searchText( $term ) {
		return LuceneSearchSet::newFromQuery( 'search',
				$term, $this->namespaces, $this->limit, $this->offset );
	}

	/**
	 * Perform a title-only search query and return a result set.
	 *
	 * @param string $term - Raw search term
	 * @return LuceneSearchSet
	 * @access public
	 */
	function searchTitle( $term ) {
		return null;
		
		// this stuff's a little broken atm
		global $wgLuceneDisableTitleMatches;
		if( $wgLuceneDisableTitleMatches ) {
			return null;
		} else {
			return LuceneSearchSet::newFromQuery( 'titlematch',
				$term, $this->namespaces, $this->limit, $this->offset );
		}
	}
}

class LuceneResult extends SearchResult {
	/**
	 * Construct a result object from single result line
	 * 
	 * @param array $lines
	 * @return array (float, Title)
	 * @access private
	 */
	function LuceneResult( $lines ) {
		global $wgContLang;
		
		$score = null;
		$interwiki = null;
		$namespace = null;
		$title = null;
		
		$line = $lines['result'];
		wfDebug( "Lucene line: '$line'\n" );

		# detect format
		$parts = explode(' ', $line);
		if(count($parts) == 3)
			list( $score, $namespace, $title ) = $parts;
		else
			list( $score, $interwiki, $namespace, $title ) = $parts;

		$score     = floatval( $score );
		$namespace = intval( $namespace );
		$title     = urldecode( $title );
		$nsText    = $wgContLang->getNsText($namespace);

		$this->mInterwiki = '';
		// make title
		if( is_null($interwiki)){
			$this->mTitle = Title::makeTitle( $namespace, $title );
		} else{
			$interwiki = urldecode( $interwiki );
			// there might be a better way to make an interwiki link			
			$t = $interwiki.':'.$nsText.':'.str_replace( '_', ' ', $title );
			$this->mTitle = Title::newFromText( $t );
			$this->mInterwiki = $interwiki;
		}
		
		$this->mScore = $score;
		
		$this->mWordCount = null;
		if(array_key_exists("#h.wordcount",$lines))
			$this->mWordCount = intval($lines["#h.wordcount"][0]);
			
		$this->mSize = null;
		if(array_key_exists("#h.size",$lines))
			$this->mSize = intval($lines["#h.size"][0]);
			
		$this->mDate = null;
		if(array_key_exists("#h.date",$lines))
			$this->mDate = $lines["#h.date"][0];
			
		// various snippets
		list( $this->mHighlightTitle, $dummy ) = $this->extractSnippet($lines,$nsText,"#h.title");
		
		list( $this->mHighlightText, $dummy ) = $this->extractSnippet($lines,$nsText,"#h.text",true);
		
		list( $this->mHighlightRedirect, $redirect ) = $this->extractSnippet($lines,$nsText,"#h.redirect");
		$this->mRedirectTitle = null;
		if( !is_null($redirect)){
			# build redirect Title object
			if($interwiki != ''){
				$t = $interwiki.':'.$nsText.':'.str_replace( '_', ' ', $redirect );
				$this->mRedirectTitle = Title::newFromText( $t );
			} else
				$this->mRedirectTitle = Title::makeTitle($namespace,$redirect);
		}
			
		list( $this->mHighlightSection, $section) = $this->extractSnippet($lines,'',"#h.section");
		$this->mSectionTitle = null;
		if( !is_null($section)){
			# build title + fragment Title object
			$t = $nsText.':'.str_replace( '_', ' ', $title ).'#'.$section;
			$this->mSectionTitle = Title::newFromText($t);
		} 
	}
	
	/**
	 * Get the pair [highlighted snippet, unmodified text] for highlighted text
	 *
	 * @param string $lines
	 * @param string $nsText textual form of namespace
	 * @param string $type
	 * @param boolean $useFinalSeparator
	 * @return array (highlighted, unmodified text)
	 */
	function extractSnippet($lines, $nsText, $type, $useFinalSeparator=false){
		if(!array_key_exists($type,$lines))
			return array(null,null);
		$ret = "";
		$original = null;
		foreach($lines[$type] as $h){
			list($s,$o) = $this->extractSnippetLine($h,$useFinalSeparator);
			$ret .= $s;
			$original = $o;
		}
		if($nsText!='')
			$ret = $nsText.':'.$ret;
		return array($ret,$original);
	}
	
	/**
	 * Parse one line of a snippet
	 *
	 * @param string $line
	 * @param boolean $useFinalSeparator if "..." is to be appended to the end of snippet
	 * @access protected
	 * @return array(snippet,unmodified text)
	 */
	function extractSnippetLine($line, $useFinalSeparator){
		$parts = explode(" ",$line);
		if(count($parts)!=4 && count($parts)!=5){
			wfDebug("Bad result line:".$line."\n");
			return "";
		}
		$splits = $this->stripBracketsSplit($parts[0]);
		$highlight = $this->stripBracketsSplit($parts[1]);
		$suffix = urldecode($this->stripBrackets($parts[2]));
		$text = urldecode($parts[3]);
		$original = null;
		if(count($parts) > 4)
			$original = urldecode($parts[4]);
		
		$splits[] = strlen($text);
		$start = 0;
		$snippet = "";
		$hi = 0;
		
		foreach($splits as $sp){
			$sp = intval($sp);
			// highlight words!
			while($hi < count($highlight) && intval($highlight[$hi]) < $sp){
				$s = intval($highlight[$hi]);
				$e = intval($highlight[$hi+1]);
				$snippet .= substr($text,$start,$s-$start)."<span class='searchmatch'>".substr($text,$s,$e-$s)."</span>";
				$start = $e;
				$hi += 2;
			}
			// copy till split point
			$snippet .= substr($text,$start,$sp-$start);
			if($sp == strlen($text) && $suffix != '')
				$snippet .= $suffix;
			else if($useFinalSeparator)
				$snippet .= " <b>...</b> ";
			
			$start = $sp;						
		}
		return array($snippet,$original);
	}
	
	
	/**
	 * @access private
	 */
	function stripBrackets($str){
		if($str == '[]')
			return '';
		return substr($str,1,strlen($str)-2);
	}
	
	/**
	 * @access private
	 * @return array
	 */
	function stripBracketsSplit($str){
		$strip = $this->stripBrackets($str);
		if($strip == '')
			return array();
		else
			return explode(",",$strip);
	}

	function getTitle() {
		return $this->mTitle;
	}

	function getScore() {
		return null; // lucene scores are meaningless to the user... 
	}
	
	function getTitleSnippet(){
		if( is_null($this->mHighlightTitle) )
			return '';
		return $this->mHighlightTitle;
	}
	
	function getTextSnippet() {
		return $this->mHighlightText;
	}
	
	function getRedirectSnippet() {
		if( is_null($this->mHighlightRedirect) )
			return '';
		return $this->mHighlightRedirect;
	}
	
	function getRedirectTitle(){
		return $this->mRedirectTitle;
	}
	
	function getSectionSnippet(){
		if( is_null($this->mHighlightSection) )
			return '';
		return $this->mHighlightSection;
	}
	
	function getSectionTitle(){
		return $this->mSectionTitle;
	}
	
	function getInterwikiPrefix(){
		return $this->mInterwiki;
	}
	
	function getTimestamp(){
		return $this->mDate;
	}
	
	function getWordCount(){
		return $this->mWordCount;
	}
	
	function getByteSize(){
		return $this->mSize;
	}
}

class LuceneSearchSet extends SearchResultSet {
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
		
		global $wgLuceneHost, $wgLucenePort, $wgDBname, $wgMemc, $wgLuceneSearchVersion;
		
		if( is_array( $wgLuceneHost ) ) {
			$pick = mt_rand( 0, count( $wgLuceneHost ) - 1 );
			$host = $wgLuceneHost[$pick];
		} else {
			$host = $wgLuceneHost;
		}
		
		$enctext = rawurlencode( trim( $query ) );
		$searchUrl = "http://$host:$wgLucenePort/$method/$wgDBname/$enctext?" .
			wfArrayToCGI( array(
				'namespaces' => implode( ',', $namespaces ),
				'offset'     => $offset,
				'limit'      => $limit,
				'version'    => $wgLuceneSearchVersion,
			) );
		
		
		// Cache results for fifteen minutes; they'll be read again
		// on reloads and paging.
		$key = "$wgDBname:lucene:" . md5( $searchUrl );
		$expiry = 60 * 15;
		$resultSet = $wgMemc->get( $key );
		if( is_object( $resultSet ) ) {
			wfDebug( "$fname: got cached lucene results for key $key\n" );
			wfProfileOut( $fname );
			return $resultSet;
		}

		wfDebug( "Fetching search data from $searchUrl\n" );
		$inputLines = @file( $searchUrl );
		if( $inputLines === false ) {
			// Network error or server error
			wfProfileOut( $fname );
			return false;
		} else {
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
				if($wgLuceneSearchVersion >= 2.1){
					# second line is suggestions
					$s = array_shift($resultLines);
					if(LuceneSearchSet::startsWith($s,'#suggest '))
						$suggestion = $s;
						
					# third line is interwiki info line
					$iwHeading = array_shift($resultLines);
					$iwCount = intval(substr($iwHeading,strpos($iwHeading,' ')+1));
					// TODO: we shouldn't be ignoring this... 
					while(!LuceneSearchSet::startsWith($resultLines[0],"#results"))
						array_shift($resultLine);
					
					// how many results we got
					list($dummy,$resultCount) = explode(" ",array_shift($resultLines));
					$resultCount = intval($resultCount);
				} else{
					$resultCount = count($resultLines);
				}
			}
		}
		
		
		$resultSet = new LuceneSearchSet( $query, $resultLines, $resultCount, $totalHits, $suggestion );
		
		wfDebug( "$fname: caching lucene results for key $key\n" );
		$wgMemc->add( $key, $resultSet, $expiry );
		
		wfProfileOut( $fname );
		return $resultSet;
	}
	
	function startsWith($source, $prefix){
   		return strncmp($source, $prefix, strlen($prefix)) == 0;
	}
	
	/**
	 * Private constructor. Use LuceneSearchSet::newFromQuery().
	 *
	 * @param string $query
	 * @param array $lines
	 * @param int $resultCount
	 * @param int $totalHits
	 * @param string $suggestion
	 * @access private
	 */
	function LuceneSearchSet( $query, $lines, $resultCount, $totalHits = null, $suggestion = null ) {
		$this->mQuery             = $query;
		$this->mTotalHits         = $totalHits;
		$this->mResults           = $lines;
		$this->mResultCount       = $resultCount;
		$this->mPos               = 0;
		$this->mSuggestionQuery   = null;
		$this->mSuggestionSnippet = '';
		$this->parseSuggestion($suggestion);
	}
	
	function parseSuggestion($suggestion){
		if( is_null($suggestion) )
			return;
		list($dummy,$points,$sug) = explode(" ",$suggestion);
		$sug = urldecode($sug);
		$points = explode(",",substr($points,1,-1));
		array_unshift($points,0);
		$suggestText = "";
		for($i=1;$i<count($points);$i+=2){
			$suggestText .= substr($sug,$points[$i-1],$points[$i]-$points[$i-1]);
			$suggestText .= "<i>".substr($sug,$points[$i],$points[$i+1]-$points[$i])."</i>";
		}
		$suggestText .= substr($sug,end($points));
		
		$this->mSuggestionQuery = $sug;
		$this->mSuggestionSnippet = $suggestText; 		
	}
	
	function numRows() {
		return $this->mResultCount;
	}
	
	function termMatches() {
		$resq = trim( preg_replace( "/[ |\\[\\]()\"{}+]+/", " ", $this->mQuery ) );
		$terms = array_map( array( &$this, 'regexQuote' ),
			explode( ' ', $resq ) );
		return $terms;
	}
	
	/**
	 * Stupid hack around PHP's limited lambda support
	 * @access private
	 */
	function regexQuote( $term ) {
		return preg_quote( $term, '/' );
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
		return is_string( $this->mSuggestionQuery ) && $this->mSuggestionQuery != '';
	}
	
	function getSuggestionQuery(){
		return $this->mSuggestionQuery;
	}
	
	function getSuggestionSnippet(){
		return $this->mSuggestionSnippet;
	}
	
	/**
	 * Fetches next search result, or false.
	 * @return LuceneResult
	 * @access public
	 * @abstract
	 */
	function next() {			
	 	# Group together lines belonging to one hit
		$group = array();
		
		for(;$this->mPos < count($this->mResults);$this->mPos++){
			$l = trim($this->mResults[$this->mPos]);
			if(count($group) == 0) // main line
				$group['result'] = $l;
			else if($l[0] == '#'){ // additional meta
				list($meta,$value) = explode(" ",$l,2);				
				$group[$meta][] = $value; 
			} else
				break;	
		}
		if($group == false)
			return false;
		else
			return new LuceneResult( $group );
	}
	
}

} # End of extension function
} # End of invocation guard

