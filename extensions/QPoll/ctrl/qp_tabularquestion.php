<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * A base class for parsing, checking ans visualisation of tabular/mixed questions in
 * declaration/voting mode (UI input/output)
 */
class qp_TabularQuestion extends qp_StubQuestion {

	# build categories and spans internal & visual representations according to
	# definition of categories and spans (AKA metacategories) in the question body
	# @param   $input - the text of question body
	#
	# internally, the header is split into
	#   main header (part inside curly braces) and
	#   body header (categories and metacategories defitions)
	#
	function parseBodyHeader( $input ) {
		$this->raws = preg_split( '`\n`su', $input, -1, PREG_SPLIT_NO_EMPTY );
		$categorySpans = false;
		if ( isset( $this->raws[1] ) ) {
			$categorySpans = preg_match( $this->mCategoryPattern, $this->raws[1] . "\n", $matches );
		}
		if ( !$categorySpans && isset( $this->raws[0] ) ) {
			preg_match( $this->mCategoryPattern, $this->raws[0] . "\n", $matches );
		}
		# parse the header - spans and categories
		$catString = isset( $matches[1] ) ? $matches[1] : '';
		$catRow = $this->parseCategories( $catString );
		if ( $categorySpans ) {
			$spansRow = $this->parseCategorySpans( $this->raws[0] );
			# if there are multiple spans, "turn on" borders for span and category cells
			if ( count( $this->mCategorySpans ) > 1 ) {
				$this->view->categoriesStyle .= 'border:1px solid gray;';
			}
			$this->view->addSpanRow( $spansRow );
		}
		# do not render single empty category at all (on user's request)
		if ( count( $this->mCategories ) == 1 &&
				$this->mCategories[0]['name'] == '&#160;' ) {
			return;
		}
		# render category table row
		$this->view->addCategoryRow( $catRow );
	}

	/**
	 * build internal & visual representation of question categories
	 *
	 * @param  $input			the raw source of categories
	 */
	function parseCategories( $input ) {
		# build "raw" $categories array
		# split tokens
		$cat_split = preg_split( '`({{|}}|\[\[|\]\]|\|)`u', $input, -1, PREG_SPLIT_DELIM_CAPTURE );
		$matching_braces = Array();
		$curr_elem = '';
		$categories = Array();
		foreach ( $cat_split as $part ) {
			switch ( $part ) {
				case '|' :
					if ( count( $matching_braces ) == 0 ) {
						# delimeters are working only when braces are completely closed
						$categories[] = $curr_elem;
						$curr_elem = '';
						$part = '';
					}
					break;
				case '[[' :
				case '{{' :
					if ( $part == '[[' ) {
						$last_brace = ']]';
					} else {
						$last_brace = '}}';
					}
					array_push( $matching_braces, $last_brace );
					break;
				case ']]' :
				case '}}' :
					if ( count( $matching_braces ) > 0 ) {
						$last_brace = array_pop( $matching_braces );
						if ( $last_brace != $part ) {
							array_push( $matching_braces, $last_brace );
						}
					}
					break;
			}
			$curr_elem .= $part;
		}
		if ( $curr_elem != '' ) {
			$categories[] = $curr_elem;
		}
		$categories = array_map( 'trim', $categories );
		# analyze previousely built "raw" categories array
		# Less than two categories is a syntax error.
		if ( $this->mType != 'mixedChoice' && count( $categories ) < 2 ) {
			$categories[0] .= $this->view->bodyErrorMessage( wfMsg( 'qp_error_too_few_categories' ), 'error' );
		}
		foreach ( $categories as $catkey => $category ) {
			# If a category name is empty, the question has a syntax error.
			if ( $category == '' ) {
				$category = $this->view->bodyErrorMessage( wfMsg( 'qp_error_category_name_empty' ), 'error' );
			}
			$this->mCategories[ $catkey ]["name"] = $category;
		}
		$row = $this->view->buildCategoriesRow( $this->mCategories );
		# cut unused categories rows which are presented in DB but were removed from article
		$this->mCategories = array_slice( $this->mCategories, 0, count( $categories ) );
		return $row;
	}

	/**
	 * build internal & visual representation of question category spans
	 * ( also known as metacategories or "category groups" )
	 *
	 * @param  $input			the raw source of category spans
	 */
	# warning: parseCategorySpans() should be called after parseCategories()
	# todo: split view logic into qp_QuestionView class
	function parseCategorySpans( $input ) {
		$row = array();
		if ( $this->mType != 'singleChoice' ) {
			return $row;
		}
		# real category spans have sense only for radiobuttons
		# build "raw" spans array
		# split tokens
		$span_split = preg_split( '`({{|}}|\[\[|\]\]|\||\!)`u', $input, -1, PREG_SPLIT_DELIM_CAPTURE );
		$matching_braces = Array();
		$curr_elem = null;
		$spans = Array();
		if ( isset( $span_split[0] ) && $span_split[0] == '' ) {
			array_shift( $span_split );
			if ( isset( $span_split[0] ) && in_array( $span_split[0], array( '!', '|' ) ) ) {
				$delim = $span_split[0];
				foreach ( $span_split as $part ) {
					if ( $part == $delim ) {
						if ( count( $matching_braces ) == 0 ) {
							# delimeters are working only when braces are completely closed
							$spans[0][] = $part;
							if ( $curr_elem !== null ) {
								$spans[1][] = $curr_elem;
							}
							$curr_elem = '';
							$part = '';
						}
					} else {
						switch ( $part ) {
							case '[[' :
							case '{{' :
								if ( $part == '[[' ) {
									$last_brace = ']]';
								} else {
									$last_brace = '}}';
								}
								array_push ( $matching_braces, $last_brace );
								break;
							case ']]' :
							case '}}' :
								if ( count( $matching_braces ) > 0 ) {
									$last_brace = array_pop( $matching_braces );
									if ( $last_brace != $part ) {
										array_push( $matching_braces, $last_brace );
									}
								}
								break;
						}
					}
					$curr_elem .= $part;
				}
				if ( $curr_elem !== null ) {
					$spans[1][] = $curr_elem;
				} else {
					$curr_elem = '';
				}
			}
		}
		# analyze previousely build "raw" spans array
		# Less than one span is a syntax error.
		if ( !array_key_exists( 0, $spans ) ) {
			return $this->view->bodyErrorMessage( wfMsg( "qp_error_too_few_spans" ), "error" );
		}
		# fill undefined spans with the last span value
		$SpanCategDelta = count( $this->mCategories ) - count( $spans[0] );
		# temporary var $diff used to avoid warning in E_STRICT mode
		$diff = array_diff( array_keys( $spans[1] ), array_keys( $spans[1], "", true ) );
		$lastDefinedSpanKey = array_pop( $diff );
		unset( $diff );
		if ( $lastDefinedSpanKey !== null ) {
			if ( $SpanCategDelta > 0 ) {
				# increase the length of last defined span value to match total lenth of categories
				$lastSpanType = $spans[0][$lastDefinedSpanKey];
				$spans[0] = array_merge( array_slice( $spans[0], 0, $lastDefinedSpanKey ),
					array_fill( 0, $SpanCategDelta, $lastSpanType ),
					array_slice( $spans[0], $lastDefinedSpanKey ) );
				$spans[1] = array_merge( array_slice( $spans[1], 0, $lastDefinedSpanKey ),
					array_fill( 0, $SpanCategDelta, "" ),
					array_slice( $spans[1], $lastDefinedSpanKey ) );
			} elseif ( $SpanCategDelta < 0 ) {
				# cut unused but defined extra spans
				$spans[0] = array_slice( $spans[0], count( $this->mCategories ), -$SpanCategDelta );
				$spans[1] = array_slice( $spans[1], count( $this->mCategories ), -$SpanCategDelta );
			}
		} else {
			# no valid category spans are defined
			return $this->view->bodyErrorMessage( wfMsg( 'qp_error_too_few_spans' ), 'error' );
		}
		# populate mCategorySpans and row
		if ( $this->view->proposalsFirst ) {
			// add empty <th> at the begin of row to "compensate" proposal text
			$row[] = array( '__tag' => 'td', 0 => "", 'style' => 'border:none;', '__end' => "\n" );
		}
		$colspanBase = ( $lastDefinedSpanKey == 0 ) ? 1 : 0;
		$colspan = 1;
		$categorySpanId = 0;
		foreach ( $spans[0] as $spanKey => $spanType ) {
			$spanCategory = trim( $spans[1][$spanKey] );
			if ( $spanCategory == "" ) {
				$colspan++;
			} else {
				$row[] = array( "count" => $colspan + $colspanBase, 0 => $this->view->rtp( $spanCategory ) );
				if ( $spanType == "|" ) { // "!" is a comment header, not a real category span
					$this->mCategorySpans[ $categorySpanId ]['name'] = $spanCategory;
					$this->mCategorySpans[ $categorySpanId ]['count'] = $colspan;
					for ( $i = $spanKey;
						$i >= 0 && array_key_exists( $i, $this->mCategories ) && !array_key_exists( 'spanId', $this->mCategories[ $i ] );
						$i-- ) {
						$this->mCategories[$i]['spanId'] = $categorySpanId;
					}
					$categorySpanId++;
				}
				$colspan = 1;
			}
		}
		if ( !$this->view->proposalsFirst ) {
			// add empty <th> at the end of row to "compensate" proposal text
			$row[] = array( '__tag' => 'td', 0 => "", 'style' => 'border:none;', '__end' => "\n" );
		}
		return $row;
	}

	function parseBody() {
		if ( $this->mType === 'singleChoice' ) {
			$this->questionParseBody( 'radio' );
		} elseif ( $this->mType === 'multipleChoice' ) {
			$this->questionParseBody( 'checkbox' );
		} else {
			throw new MWException( 'Cannot parse question with type=' . qp_Setup::specialchars( $this->mType ) );
		}
	}

	/**
	 * Creates question view which should be renreded and
	 * also may be altered during the poll generation
	 */
	function questionParseBody( $inputType ) {
		# Parameters used in some special cases.
		$proposalId = -1;
		foreach ( $this->raws as $raw ) {
			if ( !preg_match( $this->mProposalPattern, $raw, $matches ) ) {
				continue;
			}
			# empty proposal text and row
			$text = null;
			$row = Array();
			$proposalId++;
			$this->view->initProposalView();
			$text = array_pop( $matches );
			$this->mProposalText[ $proposalId ] = trim( $text );
			foreach ( $this->mCategories as $catId => $catDesc ) {
				$row[ $catId ] = Array();
				$inp = Array( '__tag' => 'input' );
				$this->view->spanState->className = 'sign';
				# Determine the input's name and value.
				switch( $this->mType ) {
				case 'multipleChoice':
					$name = 'q' . $this->mQuestionId . 'p' . $proposalId . 's' . $catId;
					$value = 's' . $catId;
					break;
				case 'singleChoice':
					$name = 'q' . $this->mQuestionId . 'p' . $proposalId;
					$value = 's' . $catId;
					# category spans have sense only with single choice proposals
					$this->view->renderSpan( $row, $name, $value, $catId, $catDesc, $text );
					break;
				}
				# Determine if the input had to be checked.
				if ( $this->poll->mBeingCorrected && $this->mRequest->getVal( $name ) == $value ) {
					$inp[ 'checked' ] = 'checked';
				}
				if ( $this->answerExists( $inputType, $proposalId, $catId ) !== false ) {
					$inp[ 'checked' ] = 'checked';
				}
				if ( array_key_exists( 'checked', $inp ) ) {
					if ( $this->mSubType == 'unique' ) {
						if ( $this->poll->mBeingCorrected && !$this->isUniqueProposalCategoryId( $proposalId, $catId ) ) {
							$text = $this->view->bodyErrorMessage( wfMsg( 'qp_error_non_unique_choice' ), 'NA' ) . $text;
							unset( $inp[ 'checked' ] );
							QP_Renderer::addClass( $row[ $catId ], 'error' );
						}
					} else {
						$this->view->spanState->wasChecked = true;
					}
				}
				if ( array_key_exists( 'checked', $inp ) ) {
					# add category to the list of user answers for current proposal (row)
					$this->mProposalCategoryId[ $proposalId ][] = $catId;
					$this->mProposalCategoryText[ $proposalId ][] = '';
				}
				QP_Renderer::addClass( $row[ $catId ], $this->view->spanState->className );
				if ( $this->mSubType == 'unique' ) {
					# unique (question,category,proposal) "coordinate" for javascript
					$inp[ 'id' ] = 'uq' . $this->mQuestionId . 'c' . $catId . 'p' . $proposalId;
					# If type='unique()' question has more proposals than categories, such question is impossible to complete
					if ( count( $this->mProposalText ) > count( $this->mCategories ) ) {
						# if there was no previous errors, hightlight the whole row
						if ( $this->getState() == '' ) {
							foreach ( $row as &$cell ) {
								QP_Renderer::addClass( $cell, 'error' );
							}
						}
						$text = $this->view->bodyErrorMessage( wfMsg( 'qp_error_unique' ), 'error' ) . $text;
					}
				}
				$inp[ 'class' ] = 'check';
				$inp[ 'type' ] = $inputType;
				$inp[ 'name' ] = $name;
				$inp[ 'value' ] = $value;
				if ( $this->view->showResults['type'] != 0 ) {
					# there ars some stat in row (not necessarily all cells, because size of question table changes dynamically)
					$row[ $catId ][ 0 ] = $this->view->addShowResults( $inp, $proposalId, $catId );
				} else {
					$row[ $catId ][ 0 ] = $inp;
				}
			}
			# If the proposal text is empty, the question has a syntax error.
			if ( trim( $text ) == '' ) {
				$text = $this->view->bodyErrorMessage( wfMsg( 'qp_error_proposal_text_empty' ), 'error' );
				foreach ( $row as &$cell ) {
					QP_Renderer::addClass( $cell, 'error' );
				}
			}
			# If the proposal was submitted but unanswered
			if ( $this->poll->mBeingCorrected && !array_key_exists( $proposalId, $this->mProposalCategoryId ) ) {
				# if there was no previous errors, hightlight the whole row
				if ( $this->getState() == '' ) {
					foreach ( $row as &$cell ) {
						QP_Renderer::addClass( $cell, 'error' );
					}
				}
				$text = $this->view->bodyErrorMessage( wfMsg( 'qp_error_no_answer' ), 'NA' ) . $text;
			}
			if ( $text !== null ) {
				$this->view->addProposal( $proposalId, $text, $row );
			}
		}
	}

} /* end of qp_TabularQuestion class */
