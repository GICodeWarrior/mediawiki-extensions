<?php

/**
 * Parser hook extension adds a <sort> tag to wiki markup
 *
 * @addtogroup Extensions
 * @author Rob Church <robchur@gmail.com>
 * @copyright © 2006 Rob Church
 * @licence GNU General Public Licence 2.0
 */

if( defined( 'MEDIAWIKI' ) ) {

	$wgExtensionFunctions[] = 'efSort';
	$wgExtensionCredits['parserhook'][] = array(
		'name' => 'Sort',
		'author' => 'Rob Church',
		'description' => 'Simplify the creation of sorted lists.',
		'url' => 'http://www.mediawiki.org/wiki/Extension:Sort',
	);

	function efSort() {
		global $wgParser;
		$wgParser->setHook( 'sort', 'efRenderSort' );
	}

	function efRenderSort( $input, $args, &$parser ) {
		$sorter = new Sorter( $parser );
		$sorter->loadSettings( $args );
		return $sorter->sortToHtml( $input );
	}

	class Sorter {

		var $parser;
		var $order;
		var $class;

		function Sorter( &$parser ) {
			$this->parser =& $parser;
			$this->order = 'asc';
			$this->class = 'ul';
		}

		function loadSettings( $settings ) {
			if( isset( $settings['order'] ) )
				$this->order = strtolower( $settings['order'] ) == 'desc' ? 'desc' : 'asc';
			if( isset( $settings['class'] ) ) {
				$c = strtolower( $settings['class'] );
				if( $c == 'ul' || $c == 'ol' )
					$this->class = $c;
			}
		}

		function sortToHtml( $text ) {
			wfProfileIn( 'Sorter::sortToHtml' );
			$lines = $this->internalSort( $text );
			$list = $this->makeList( $lines );
			$html = $this->parse( $list );
			wfProfileOut( 'Sorter::sortToHtml' );
			return $html;
		}

		function internalSort( $text ) {
			wfProfileIn( 'Sorter::internalSort' );
			$lines = explode( "\n", $text );
			$inter = array();
			foreach( $lines as $line )
				$inter[ $line ] = $this->stripWikiTokens( $line );
			natsort( $inter );
			if( $this->order == 'desc' )
				$inter = array_reverse( $inter, true );
			wfProfileOut( 'Sorter::internalSort' );
			return array_keys( $inter );
		}

		/** Pull selected wiki text tokens from the text */
		function stripWikiTokens( $text ) {
			$find = array( '[', '{', '\'', '}', ']' );
			return str_replace( $find, '', $text );
		}

		function makeList( $lines ) {
			wfProfileIn( 'Sorter::makeList' );
			$list = array();
			$token = $this->class == 'ul' ? '*' : '#';
			foreach( $lines as $line )
				if( strlen( $line ) > 0 )
					$list[] = "{$token} {$line}";
			wfProfileOut( 'Sorter::makeList' );
			return trim( implode( "\n", $list ) );
		}

		/** Pass text through the parser */
		function parse( $text ) {
			wfProfileIn( 'Sorter::parse' );
			$title =& $this->parser->getTitle();
			$options = $this->parser->getOptions();
			$output = $this->parser->parse( $text, $title, $options, true, false );
			wfProfileOut( 'Sorter::parse' );
			return $output->getText();
		}
	}
} else {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( -1 );
}
?>
