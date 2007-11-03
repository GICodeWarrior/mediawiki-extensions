<?php

class SpecialNoticeText extends NoticePage {
	var $project = 'wikipedia';
	var $language = 'en';
	
	function __construct() {
		parent::__construct( "NoticeText" );
	}
	
	/**
	 * Clients can cache this as long as they like -- if it changes,
	 * we'll be bumping things at the loader level, bringing a new URL.
	 *
	 * Let's say a week.
	 */
	protected function maxAge() {
		return 86400 * 7;
	}
	
	function getJsOutput( $par ) {
		$this->setLanguage( $par );
		return
			'wgNotice="' .
			strtr(
				Xml::escapeJsString( $this->getHtmlNotice() ),
				array_merge(
					array_map(
						array( $this, 'interpolateScroller' ),
						array(
							'$quote' => $this->getQuotes(),
						)
					),
					array_map(
						array( $this, 'interpolateStrings' ),
						array(
							'$headline' => $this->getHeadlines(),
							'$meter' => $this->getMeter(),
							'$target' => $this->getTarget(),
							'$media' => $this->getMessage( 'centralnotice-media' ),
							'$show' => $this->getMessage( 'centralnotice-show' ),
							'$hide' => $this->getMessage( 'centralnotice-hide' ),
							'$donate' => $this->getMessage( 'centralnotice-donate' ),
							'$counter' => $this->getMessage( 'centralnotice-counter',
								array( $this->formatNum( $this->getDonorCount() ) ) ),
						)
					)
				)
			) .
			'";' .
			$this->getScripts();
	}
	
	function getScripts() {
		$showStyle = <<<END
<style type="text/css">#siteNoticeSmall{display:none;}</style>
END;
		$hideStyle = <<<END
<style type="text/css">#siteNoticeBig{display:none;}</style>
END;
		$hideToggleStyle = <<<END
<style type="text/css">.siteNoticeToggle{display:none;}</style>
END;
		$encShowStyle = Xml::encodeJsVar( $showStyle );
		$encHideStyle = Xml::encodeJsVar( $hideStyle );
		$encHideToggleStyle = Xml::encodeJsVar( $hideToggleStyle );
		$script = <<<END
		var wgNoticeToggleState = (document.cookie.indexOf("hidesnmessage=1")==-1);
		document.writeln(
			wgNoticeToggleState
			? $encShowStyle
			: $encHideStyle);
		if(wgUserName == null) {
			document.writeln($encHideToggleStyle);
		}
		function toggleNotice() {
			var big = document.getElementById('siteNoticeBig');
			var small = document.getElementById('siteNoticeSmall');
			if (!wgNoticeToggleState) {
				if(big) big.style.display = 'block';
				if(small) small.style.display = 'none';
				toggleNoticeCookie("0");
			} else {
				if(big) big.style.display = 'none';
				if(small) small.style.display = 'block';
				toggleNoticeCookie("1");
			}
			wgNoticeToggleState = !wgNoticeToggleState;
		}
		function toggleNoticeCookie(state) {
			var e = new Date();
			e.setTime( e.getTime() + (7*24*60*60*1000) ); // one week
			var work="hidesnmessage="+state+"; expires=" + e.toGMTString() + "; path=/";
			document.cookie = work;
		}
END;
		return $script;
	}
	
	private function formatNum( $num ) {
		$lang = Language::factory( $this->language );
		return $lang->formatNum( $num );
	}
	
	private function setLanguage( $par ) {
		// Strip extra ? bits if they've gotten in. Sigh.
		$bits = explode( '?', $par, 2 );
		$par = $bits[0];
		
		// Special:NoticeText/project/language
		$bits = explode( '/', $par );
		if( count( $bits ) == 2 ) {
			$this->project = $bits[0];
			$this->language = $bits[1];
		}
	}
	
	private function interpolateStrings( $data ) {
		if( is_array( $data ) ) {
			if( count( $data ) == 1 ) {
				return Xml::escapeJsString( $data[0] );
			} else {
				return $this->interpolateRandomSelector( $data );
			}
		} else {
			return Xml::escapeJsString( $data );
		}
	}
	
	private function interpolateRandomSelector( $strings ) {
		return '"+' . $this->randomSelector( $strings ) . '+"';
	}
	
	private function randomSelector( $strings ) {
		return
			'function(){' .
				'var s=' . Xml::encodeJsVar( $strings ) . ';' .
				'return s[Math.floor(Math.random()*s.length)];' .
			'}()';
	}
	
	private function interpolateScroller( $strings ) {
		global $wgNoticeScroll;
		if( $wgNoticeScroll ) {
			return
				Xml::escapeJsString( '<marquee scrolldelay="20" scrollamount="2" width="384">' ) .
				'"+' .
				$this->shuffleStrings( $strings ) .
				'+"' .
				Xml::escapeJsString( '</marquee>' );
		} else {
			return $this->interpolateStrings( $strings );
		}
	}
	
	private function shuffleStrings( $strings ) {
		return
			'function(){' .
				'var s=' . Xml::encodeJsVar( $strings ) . ';' .
				# Get a random array of orderings... (array_index,random)
				'var o=[];' .
				'for(var i=0;i<s.length;i++){' .
					'o.push([i,Math.random()]);' .
				'}' .
				'o.sort(function(x,y){return y[1]-x[1];});' .
				# Reorder the array...
				'var r=[];' .
				'for(var i=0;i<o.length;i++){' .
					'r.push(s[o[i][0]]);' .
				'}' .
				# And return a joined string
				'return r.join(" ");' .
			'}()';
	}
	
	function getHtmlNotice() {
		return $this->getMessage( 'centralnotice-template' );
	}
	
	private function getHeadlines() {
		return $this->splitListMessage( 'centralnotice-headlines' );
	}
	
	private function getQuotes() {
		return $this->splitListMessage( 'centralnotice-quotes',
		 	array( $this, 'wrapQuote' ) );
	}
	
	private function getMeter() {
		return $this->getMessage( 'centralnotice-meter' );
		return "<img src=\"http://upload.wikimedia.org/fundraising/2007/meter.png\" width='407' height='14' />";
	}
	
	private function getTarget() {
		return $this->getMessage( 'centralnotice-target' );
	}
	
	private function splitListMessage( $msg, $callback=false ) {
		$text = $this->getMessage( $msg );
		return $this->splitList( $text, $callback );
	}
	
	private function getMessage( $msg, $params=array() ) {
		$guard = array();
		for( $lang = $this->language; $lang; $lang = Language::getFallbackFor( $lang ) ) {
			if( isset( $guard[$lang] ) )
				break; // avoid loops...
			$guard[$lang] = true;
			if( $text = $this->getRawMessage( "$msg/$lang", $params ) ) {
				return $text;
			}
		}
		return $this->getRawMessage( $msg, $params );
	}
	
	private function getRawMessage( $msg, $params ) {
		$searchPath = array(
			"$msg/{$this->project}",
			"$msg" );
		foreach( $searchPath as $rawMsg ) {
			wfDebug( __METHOD__ . ": $rawMsg\n" );
			$xparams = array_merge( array( $rawMsg ), $params );
			wfDebug( __METHOD__ . ': ' . str_replace( "\n", " ", var_export( $xparams, true ) ) . "\n" );
			$text = call_user_func_array( 'wfMsgForContent',
				$xparams );
			if( !wfEmptyMsg( $rawMsg, $text ) ) {
				return $text;
			}
		}
		return false;
	}
	
	private function splitList( $text, $callback=false ) {
		$list = array_filter(
			array_map(
				array( $this, 'filterListLine' ),
				explode( "\n", $text ) ) );
		if( is_callable( $callback ) ) {
			return array_map( $callback, $list );
		} else {
			return $list;
		}
	}
	
	private function filterListLine( $line ) {
		if( substr( $line, 0, 1 ) == '#' ) {
			return '';
		} else {
			return $this->parse( trim( ltrim( $line, '*' ) ) );
		}
	}
	
	private function parse( $text ) {
		global $wgOut;
		return preg_replace(
			'/^<p>(.*)\n?<\/p>\n?$/sU',
			'$1',
		 	$wgOut->parse( $text ) );
	}
	
	function wrapQuote( $text ) {
		return "<span class='fundquote'>" .
			$this->getMessage(
				'centralnotice-quotes-format',
				array( $text ) ) .
			"</span>";
	}

	private function getDonorCount() {
		global $wgNoticeCounterSource, $wgMemc;
		$count = $wgMemc->get( 'centralnotice:counter' );
		if( !$count ) {
			$count = @file_get_contents( $wgNoticeCounterSource );
			if( !$count ) {
				// nooooo
				return 0;
			}
		}
		$count = intval( $count );
		$wgMemc->set( 'centralnotice:counter', $count, 60 );
		return $count;
	}
	

}