<?php

/**
 * File holding the SemanticGlossaryParser class.
 *
 * @author Stephan Gambke
 *
 * @file
 * @ingroup SemanticGlossary
 */
if ( !defined( 'SG_VERSION' ) ) {
	die( 'This file is part of the Semantic Glossary extension, it is not a valid entry point.' );
}

/**
 * This class parses the given text and enriches it with definitions for defined
 * terms.
 *
 * Contains a static function to initiate the parsing.
 * 
 * @ingroup SemanticGlossary
 */
class SemanticGlossaryParser {

	private $mGlossaryArray = null;
	private $mGlossaryTree = null;
	private static $parserSingleton = null;

	/**
	 *
	 * @param $parser
	 * @param $text
	 * @return Boolean
	 */
	static function parse ( &$parser, &$text ) {

		wfProfileIn( __METHOD__ );
//		echo( __METHOD__ );

		if ( !self::$parserSingleton ) {
			self::$parserSingleton = new SemanticGlossaryParser();
		}

		self::$parserSingleton -> realParse( $parser, $text );

		wfProfileOut( __METHOD__ );

		return true;
	}

	/**
	 * Returns the list of terms applicable in the current context
	 *
	 * @return Array an array mapping terms (keys) to descriptions (values)
	 */
	function getGlossaryArray ( SemanticGlossaryMessageLog &$messages = null ) {

		wfProfileIn( __METHOD__ );

		// build glossary array only once per request
		if ( !$this -> mGlossaryArray ) {
			$this -> buildGlossary( $messages );
		}

		wfProfileOut( __METHOD__ );

		return $this -> mGlossaryArray;
	}

	/**
	 * Returns the list of terms applicable in the current context
	 *
	 * @return Array an array mapping terms (keys) to descriptions (values)
	 */
	function getGlossaryTree ( SemanticGlossaryMessageLog &$messages = null ) {

		wfProfileIn( __METHOD__ );

		// build glossary array only once per request
		if ( !$this -> mGlossaryTree ) {
			$this -> buildGlossary( $messages );
		}

		wfProfileOut( __METHOD__ );

		return $this -> mGlossaryTree;
	}

	protected function buildGlossary ( SemanticGlossaryMessageLog &$messages = null ) {

		wfProfileIn( __METHOD__ );

		$this -> mGlossaryTree = new SemanticGlossaryTree();

		$store = smwfGetStore(); // default store
		// Create query
		$desc = new SMWSomeProperty( new SMWDIProperty( '___glt' ), new SMWThingDescription() );
		$desc -> addPrintRequest( new SMWPrintRequest( SMWPrintRequest::PRINT_PROP, null, SMWPropertyValue::makeProperty( '___glt' ) ) );
		$desc -> addPrintRequest( new SMWPrintRequest( SMWPrintRequest::PRINT_PROP, null, SMWPropertyValue::makeProperty( '___gld' ) ) );
		$desc -> addPrintRequest( new SMWPrintRequest( SMWPrintRequest::PRINT_PROP, null, SMWPropertyValue::makeProperty( '___gll' ) ) );

		$query = new SMWQuery( $desc, true, false );
		$query -> querymode = SMWQuery::MODE_INSTANCES;

		global $smwgQDefaultLimit;
		$query -> setLimit( $smwgQDefaultLimit );
		$query -> sortkeys[ SG_PROP_GLT ] = 'ASC';

		// get the query result
		$queryresult = $store -> getQueryResult( $query );

		// assemble the result array
		$this -> mGlossaryArray = array( );
		while ( ( $resultline = $queryresult -> getNext() ) ) {

			$term = $resultline[ 0 ] -> getNextText( SMW_OUTPUT_HTML );
			$definition = $resultline[ 1 ] -> getNextText( SMW_OUTPUT_HTML );
			$link = $resultline[ 2 ] -> getNextText( SMW_OUTPUT_HTML );
			$subject = $resultline[ 0 ] -> getResultSubject();

			// FIXME: SMW has a bug that right after storing data this data
			// might be available twice. The workaround here is to compare the
			// first and second result and if they are identical assume that
			// it is because of the bug. (2nd condition in the if below)

			$nextTerm = $resultline[ 0 ] -> getNextText( SMW_OUTPUT_HTML );
			$nextDefinition = $resultline[ 1 ] -> getNextText( SMW_OUTPUT_HTML );

			// skip if more then one term or more than one definition present
			if ( ( $nextTerm || $nextDefinition ) &&
				!( $nextTerm == $term && $nextDefinition == $definition ) ) {

				if ( $messages ) {
					$messages -> addMessage(
						wfMsg( 'semanticglossary-termdefinedtwice', array( $subject -> getTitle() -> getPrefixedText() ) ),
						SemanticGlossaryMessageLog::SG_WARNING );
				}

				continue;
			}

			$source = array( $subject -> getDBkey(), $subject -> getNamespace(), $subject -> getInterwiki() );

			$elementData = array(
				SemanticGlossaryElement::SG_TERM => $term,
				SemanticGlossaryElement::SG_DEFINITION => $definition,
				SemanticGlossaryElement::SG_LINK => $link,
				SemanticGlossaryElement::SG_SOURCE => $source
			);

			if ( array_key_exists( $term, $this -> mGlossaryArray ) ) {
				$this -> mGlossaryArray[ $term ] -> addDefinition( $elementData );
			} else {
				$this -> mGlossaryArray[ $term ] = new SemanticGlossaryElement( $elementData );
			}

			$this -> mGlossaryTree -> addTerm( $term, $elementData );
		}

		wfProfileOut( __METHOD__ );
	}

	/**
	 * Parses the given text and enriches applicable terms
	 *
	 * This method currently only recognizes terms consisting of max one word
	 *
	 * @param $parser
	 * @param $text
	 * @return Boolean
	 */
	protected function realParse ( &$parser, &$text ) {

		global $wgRequest, $sggSettings;

		wfProfileIn( __METHOD__ );
//		echo( __METHOD__ );

		$action = $wgRequest -> getVal( 'action', 'view' );

		if ( $text == null ||
			$text == '' ||
			$action == "edit" ||
			$action == "ajax" ||
			isset( $_POST[ 'wpPreview' ] )
		) {

			wfProfileOut( __METHOD__ );
			return true;
		}

		// Get array of terms
		$glossary = $this -> getGlossaryTree();
//
//		if ( empty( $terms ) ) {
		if ( $glossary == null ) {

			wfProfileOut( __METHOD__ );
			return true;
		}

		//Get the minimum length abbreviation so we don't bother checking against words shorter than that
//		$min = min( array_map( 'strlen', array_keys( $terms ) ) );
		//Parse HTML from page
		// FIXME: this works in PHP 5.3.3. What about 5.1?
		wfProfileIn( __METHOD__ . " 1 loadHTML" );
		wfSuppressWarnings();

		$doc = DOMDocument::loadHTML(
				'<html><meta http-equiv="content-type" content="charset=utf-8"/>' . $text . '</html>'
		);

		wfRestoreWarnings();
		wfProfileOut( __METHOD__ . " 1 loadHTML" );

		wfProfileIn( __METHOD__ . " 2 xpath" );
		//Find all text in HTML.
		$xpath = new DOMXpath( $doc );
		$elements = $xpath -> query(
				"//*[not(ancestor-or-self::*[@class='noglossary'] or ancestor-or-self::a)][text()!=' ']/text()"
		);
		wfProfileOut( __METHOD__ . " 2 xpath" );

		//Iterate all HTML text matches
		$nb = $elements -> length;
		$changedDoc = false;

		for ( $pos = 0; $pos < $nb; $pos++ ) {

			$el = $elements -> item( $pos );

			if ( strlen( $el -> nodeValue ) < $glossary -> getMinTermLength() ) {
				continue;
			}

			wfProfileIn( __METHOD__ . " 3 lexer" );
			$matches = array( );
			preg_match_all( '/[[:alpha:]]+|[^[:alpha:]]/', $el -> nodeValue, $matches, PREG_OFFSET_CAPTURE | PREG_PATTERN_ORDER );
			wfProfileOut( __METHOD__ . " 3 lexer" );

			if ( count( $matches ) == 0 || count( $matches[ 0 ] ) == 0 ) {
				continue;
			}

			$lexemes = &$matches[ 0 ];
			$countLexemes = count( $lexemes );
			$parent = &$el -> parentNode;
			$index = 0;
			$changedElem = false;

//			echo("\nrealParse: nodeValue: {$el->nodeValue}\n");
			while ( $index < $countLexemes ) {

				wfProfileIn( __METHOD__ . " 4 findNextTerm" );
				list( $skipped, $used, $definition ) = $glossary -> findNextTerm( $lexemes, $index, $countLexemes );
				wfProfileOut( __METHOD__ . " 4 findNextTerm" );

//				echo("realParse: skipped: $skipped  used: $used\n");
//				var_export($definition);

				wfProfileIn( __METHOD__ . " 5 insert" );
				if ( $used > 0 ) { // found a term
					if ( $skipped > 0 ) { // skipped some text, insert it as is

						$parent -> insertBefore(
							$doc -> createTextNode(
								substr( $el -> nodeValue,
									$currLexIndex = $lexemes[ $index ][ 1 ],
									$lexemes[ $index + $skipped ][ 1 ] - $currLexIndex )
							),
							$el
						);
					}

					$index += $skipped;

					//Wrap abbreviation in <span> tags
					$span = $doc -> createElement( 'span' );
					$span -> setAttribute( 'class', "tooltip" );

					//Wrap abbreviation in <span> tags, hidden
					$lastLex = $lexemes[ $index + $used - 1 ];
					$spanTerm = $doc -> createElement( 'span',
							substr( $el -> nodeValue,
								$currLexIndex = $lexemes[ $index ][ 1 ],
								$lastLex[ 1 ] - $currLexIndex + strlen( $lastLex[ 0 ] ) )
					);
					$spanTerm -> setAttribute( 'class', "tooltip_abbr" );

					//Wrap definition in <span> tags, hidden
					$spanDefinition = $definition -> getFullDefinition( $doc );
					$spanDefinition -> setAttribute( 'class', "tooltip_tip" );

					// insert term and definition
					$span -> appendChild( $spanTerm );
					$span -> appendChild( $spanDefinition );
					$parent -> insertBefore( $span, $el );

					$changedElem = true;
				} else { // did not find term, just use the rest of the text
					// If we found no term now and no term before, there was no
					// term in the whole element. Might as well not change the
					// element at all.
					// Only change element if found term before
					if ( $changedElem ) {
						$parent -> insertBefore(
							$doc -> createTextNode(
								substr( $el -> nodeValue, $lexemes[ $index ][ 1 ] )
							),
							$el
						);
					} else {

						wfProfileOut( __METHOD__ . " 5 insert" );
						// In principle superfluous, the loop would run out
						// anyway. Might save a bit of time.
						break;
					}

					$index += $skipped;
				}
				wfProfileOut( __METHOD__ . " 5 insert" );


				$index += $used;
			}

			if ( $changedElem ) {
				$parent -> removeChild( $el );
				$changedDoc = true;
			}

			//Split node text into words, putting offset and text into $offsets[0] array
//			preg_match_all(
//				"/[^\s{$sggSettings -> punctuationCharacters}]+/",
//				$el -> nodeValue,
//				$offsets,
//				PREG_OFFSET_CAPTURE
//			);
//
//			var_export($offsets);
//
//			//Search and replace words in reverse order (from end of string backwards),
//			//This way we don't mess up the offsets of the words as we iterate
//			$len = count( $offsets[ 0 ] );
//
//			for ( $i = $len - 1; $i >= 0; $i-- ) {
//
//				$offset = $offsets[ 0 ][ $i ];
//
//				//Check if word is an abbreviation from the terminologies
//				if ( !is_numeric( $offset[ 0 ] ) && isset( $terms[ $offset[ 0 ] ] ) ) {
//					//Word matches, replace with appropriate span tag
//
//					$changed = true;
//
//					$beforeMatchNode = $doc -> createTextNode(
//							substr( $el -> nodeValue, 0, $offset[ 1 ] )
//					);
//
//					$afterMatchNode = $doc -> createTextNode(
//							substr( $el -> nodeValue,
//								$offset[ 1 ] + strlen( $offset[ 0 ] ),
//								strlen( $el -> nodeValue ) - 1 )
//					);
//
//					//Wrap abbreviation in <span> tags
//					$span = $doc -> createElement( 'span' );
//					$span -> setAttribute( 'class', "tooltip" );
//
//					//Wrap abbreviation in <span> tags, hidden
//					$spanAbr = $doc -> createElement( 'span', $offset[ 0 ] );
//					$spanAbr -> setAttribute( 'class', "tooltip_abbr" );
//
//					//Wrap definition in <span> tags, hidden
//					$spanTip = $terms[ $offset[ 0 ] ] -> getFullDefinition( $doc );
//					$spanTip -> setAttribute( 'class', "tooltip_tip" );
//
//					$el -> parentNode -> insertBefore( $beforeMatchNode, $el );
//					$el -> parentNode -> insertBefore( $span, $el );
//					$span -> appendChild( $spanAbr );
//					$span -> appendChild( $spanTip );
//					$el -> parentNode -> insertBefore( $afterMatchNode, $el );
//					$el -> parentNode -> removeChild( $el );
//					$el = $beforeMatchNode; //Set new element to the text before the match for next iteration
//				}
//			}
		}

		if ( $changedDoc ) {
			$body = $xpath -> query( '/html/body' );
//			$text = $doc -> saveXML( $body -> item( 0 ) );

			$text = '';
			foreach ( $body -> item( 0 ) -> childNodes as $child ) {
				$text .= $doc -> saveXML( $child );
			}

			$this -> loadModules( $parser );
		}

		wfProfileOut( __METHOD__ );

		return true;
	}

	protected

	function loadModules ( &$parser ) {

		global $wgOut, $wgScriptPath;

		if ( defined( 'MW_SUPPORTS_RESOURCE_MODULES' ) ) {

			if ( !is_null( $parser ) ) {
				$parser -> getOutput() -> addModules( 'ext.SemanticGlossary' );
			} else {
				$wgOut -> addModules( 'ext.SemanticGlossary' );
			}
		} else {
			if ( !is_null( $parser ) && ( $wgOut -> isArticle() ) ) {
				$parser -> getOutput() -> addHeadItem( '<link rel="stylesheet" href="' . $wgScriptPath . '/extensions/SemanticGlossary/skins/SemanticGlossary.css" />', 'ext.SemanticGlossary.css' );
			} else {
				$wgOut -> addHeadItem( 'ext.SemanticGlossary.css', '<link rel="stylesheet" href="' . $wgScriptPath . '/extensions/SemanticGlossary/skins/SemanticGlossary.css" />' );
			}
		}
	}

}

