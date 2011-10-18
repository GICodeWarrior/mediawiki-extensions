<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * Stores the list of current category options -
 * usually the pipe-separated entries in specified brackets list
 */
class qp_TextQuestionOptions {

	# boolean, indicates whether incoming tokens are category list elements
	var $isCatDef;
	# type of created element (text,radio,checkbox)
	var $type;
	# counter of pipe-separated elements in-between << >> markup
	# used to distinguish real category options from attributes definition
	# for type='text'
	var $catDefIdx;
	# list of input options; array whose every element is a string
	var $input_options;

	# whether the current option has xml-like attributes specified
	var $hasAttributes = false;
	var $attributes = array(
		## a value of input text field width in 'em'
		# possible values: null, positive int
		# defined as first element xml-like attribute of options list, for example:
		# <<:: width="12">> or <<:: width="15"|test>>
		# currently, it is used only for text inputs (not for select/option list)
		'width' => null,
		## whether the text options of current category has to be sorted;
		# possible values: null (do not sort), 'asc', 'desc'
		# defined as first element xml-like attribute of options list, for example:
		# <<:: sorting="desc"|a|b|c>>
		'sorting' => null,
		## whether the checkbox type option of current category has to be checked by default;
		# possible value: null (not checked), not null (checked)
		# defined as first element xml-like attribute of options list, for example:
		# <[checked=""]>
		'checked' => null
	);
	# a pointer to last element in $this->input_options array
	var $iopt_last;

	/**
	 * Prepare options for new proposal line
	 */
	function reset() {
		$this->isCatDef = false;
		$this->input_options = array();
		$this->catDefIdx = 0;
	}

	/**
	 * Creates first single empty option
	 * Applies default settings to the options list
	 * New category begins
	 */
	function startOptionsList( $type ) {
		$this->isCatDef = true;
		$this->type = $type;
		$this->input_options = array( 0 => '' );
		$this->hasAttributes = false;
		# set default values of xml-like attributes
		foreach ( $this->attributes as $attr_name => &$attr_val ) {
			$attr_val = null;
		}
		$this->iopt_last = &$this->input_options[0];
	}

	/**
	 * Adds new empty option
	 * This option will be "current last option"
	 */
	function addEmptyOption() {
		# new options are meaningful only for type 'text'
		if ( $this->type === 'text' ) {
			# add new empty option only if there was no xml attributes definition
			if ( !$this->hasAttributes || $this->catDefIdx !== 0 ) {
				# add new empty option to the end of the list
				$this->input_options[] = '';
				$this->iopt_last = &$this->input_options[count( $this->input_options ) - 1];
			}
			$this->catDefIdx++;
		}
	}

	/**
	 * Add string part to value of current last option
	 * @param  $token  string current value of token between pipe separators
	 * Also, _optionally_ parses xml-like attributes (when these are found in category definition)
	 */
	function addToLastOption( $token ) {
		$matches = array();
		if ( $this->type === 'text' ) {
			# first entry of "category type text" might contain current category
			# xml-like attributes
			if ( count( $this->input_options ) === 1 &&
				preg_match( '`^::\s*(.+)$`', $token, $matches ) ) {
				# note that hasAttributes is always true regardless the attributes are used or not,
				# because it is checked in $this->addEmptyOption()
				$this->hasAttributes = true;
				# parse attributes string
				$option_attributes = qp_Setup::getXmlLikeAttributes( $matches[1], array( 'width', 'sorting' ) );
				# apply attributes to current option
				foreach ( $option_attributes as $attr_name => $attr_val ) {
					$this->attributes[$attr_name] = $attr_val;
				}
				return;
			}
		} elseif ( $this->type === 'checkbox' ) {
			if ( $token !== '' ) {
				# checkbox type of categories do not contain text values,
				# only xml-like attributes
				$option_attributes = qp_Setup::getXmlLikeAttributes( $token, array( 'checked' ) );
				# apply attributes to current option
				foreach ( $option_attributes as $attr_name => $attr_val ) {
					$this->attributes[$attr_name] = $attr_val;
				}
			}
		}
		# add new input option
		$this->iopt_last .= $token;
	}

	/**
	 * Closes current category definition and prepares input options entries
	 */
	function closeCategory() {
		$this->isCatDef = false;
		# prepare new category input choice (text questions have no category names)
		$unique_options = array_unique( array_map( 'trim', $this->input_options ), SORT_STRING );
		$this->input_options = array();
		foreach ( $unique_options as $option ) {
			# make sure unique elements keys are consequitive starting from 0
			$this->input_options[] = $option;
		}
		switch ( $this->attributes['sorting'] ) {
		case 'asc' :
			sort( $this->input_options, SORT_STRING );
			break;
		case 'desc' :
			rsort( $this->input_options, SORT_STRING );
			break;
		}
	}

} /* end of qp_TextQuestionOptions class */

/**
 * A base class for parsing, checking and visualisation of text questions in
 * declaration/voting mode (UI input/output)
 *
 * An attempt to make somewhat cleaner question controller
 * todo: further refactoring of controllers for different question types
 */
class qp_TextQuestion extends qp_StubQuestion {

	# regexp for separation of proposal line tokens
	static $propCatPattern = null;

	# source "raw" tokens (preg_split)
	var $rawtokens;

	/**
	 * array with parsed braces pairs
	 * every element may have the following keys:
	 *   'type' : type of brace string _key_values_ of self::$matching_braces
	 *   'closed_at' : indicates opening brace;
	 *     false when no matching closing brace was found
	 *     int  key of $this->rawtokens a "link" to matching closing brace
	 *   'opened_at' : indicates closing brace;
	 *     false when no matching opening brace was found
	 *     int  key of $this->rawtokens a "link" to matching opening brace
	 *   'iscat'     : indicates brace that belongs to self::$input_braces_types AND
	 *                 has a proper match (both 'closed_at' and 'opened_at' are int)
	 */
	var $brace_matches;

	# $propview is an instance of qp_TextQuestionProposalView
	#             which contains parsed tokens for combined
	#             proposal/category view
	var $propview;
	# $dbtokens will contain parsed tokens for combined
	#           proposal/category storage
	# $dbtokens elements do not include error messages;
	# only proposal parts and category options
	var $dbtokens = array();

	# list of opening input braces types
	static $input_braces_types = array(
		'<<' => 'text',
		'<(' => 'radio',
		'<[' => 'checkbox'
	);
	# matches of opening / closing braces
	static $matching_braces = array(
		# wiki link
		'[[' => ']]',
		# wiki magicword
		'{{' => '}}',
		# text input / select option
		'<<' => '>>',
		# radiobutton
		'<(' => ')>',
		# checkbox
		'<[' => ']>'
	);

	/**
	 * Constructor
	 * @public
	 * @param  $poll            an instance of question's parent controller
	 * @param  $view            an instance of question view "linked" to this question
	 * @param  $questionId      the identifier of the question used to generate input names
	 */
	function __construct( qp_AbstractPoll $poll, qp_StubQuestionView $view, $questionId ) {
		parent::__construct( $poll, $view, $questionId );
		if ( self::$propCatPattern === null ) {
			$braces_list = array_map( 'preg_quote',
				array_merge(
					( array_values( self::$matching_braces ) ),
					array_keys( self::$matching_braces ),
					array( '|' )
				)
			);
			self::$propCatPattern = '/(' . implode( '|', $braces_list ) . ')/u';
		}
	}

	/**
	 * Parses question body header.
	 * Text questions do not have "body header" (no definitions of spans and categories)
	 * so, this method just splits raw lines of body text to analyze raws in $this->parseBody()
	 * @param   $input - the text of question body
	 */
	function parseBodyHeader( $input ) {
		$this->raws = preg_split( '`\n`su', $input, -1, PREG_SPLIT_NO_EMPTY );
	}

	/**
	 * Load text answer to the selected (proposal,category) pair, when available
	 * Also, stores text answer into the parsed tokens list (propview)
	 */
	function loadProposalCategory( qp_TextQuestionOptions $opt, $proposalId, $catId ) {
		$name = "q{$this->mQuestionId}p{$proposalId}s{$catId}";
		$text_answer = '';
		$user_answered = false;
		# try to load from POST data
		if ( $this->poll->mBeingCorrected && $this->mRequest->getVal( $name ) !== null ) { 
			$text_answer = trim( $this->mRequest->getText( $name ) );
		}
		if ( strlen( $text_answer ) > qp_Setup::MAX_TEXT_ANSWER_LENGTH ) {
			$text_answer = substr( $text_answer, 0, qp_Setup::MAX_TEXT_ANSWER_LENGTH );
		}
		if ( $text_answer != '' ) {
			$user_answered = true;
		}
		# try to load from pollStore
		# pollStore optionally overrides POST data
		$prev_text_answer = $this->answerExists( 'text', $proposalId, $catId );
		if ( $prev_text_answer !== false ) {
			$user_answered = true;
			$text_answer = $prev_text_answer;
		}
		if ( $user_answered ) {
			# add category to the list of user answers for current proposal (row)
			$this->mProposalCategoryId[ $proposalId ][] = $catId;
			$this->mProposalCategoryText[ $proposalId ][] = $text_answer;
		}
		# finally, add new category input options for the view
		$opt->closeCategory();
		$this->propview->addCatDef( $opt, $name, $text_answer, $this->poll->mBeingCorrected && !$user_answered );
	}

	/**
	 * Builds $this->brace_matches array which contains the list of matching braces
	 * from $this->rawtokens array.
	 */
	private function findMatchingBraces() {
		$brace_stack = array();
		$this->brace_matches = array();
		$matching_closed_brace = '';
		# building $this->brace_matches
		foreach ( $this->rawtokens as $tkey => $token ) {
			if ( array_key_exists( $token, self::$matching_braces ) ) {
				# opening braces
				$this->brace_matches[$tkey] = array(
					'closed_at' => false,
					'type' => $token
				);
				$match = self::$matching_braces[$token];
				# create new brace_stack element:
				$last_brace_def = array(
					'match' => $match,
					'idx' => $tkey
				);
				if ( array_key_exists( $token, self::$input_braces_types ) &&
						count( $brace_stack ) == 0 ) {
					# will try to start category definiton (on closing)
					$matching_closed_brace = $match;
				}
				array_push( $brace_stack, $last_brace_def );
			} elseif ( in_array( $token, self::$matching_braces ) ) {
				# closing braces
				$this->brace_matches[$tkey] = array(
					'opened_at' => false,
					# we always put opening brace in 'type'
					'type' => array_search( $token, self::$matching_braces, true )
				);
				if ( count( $brace_stack ) > 0 ) {
					$last_brace_def = array_pop( $brace_stack );
					if ( $last_brace_def['match'] != $token ) {
						# braces didn't match
						array_push( $brace_stack, $last_brace_def );
						continue;
					}
					$idx = $last_brace_def['idx'];
					# link opening / closing braces to each other
					$this->brace_matches[$tkey]['opened_at'] = $idx;
					$this->brace_matches[$idx]['closed_at'] = $tkey;
					if ( count( $brace_stack ) > 0 || $token !== $matching_closed_brace ) {
						# brace does not belong to self::$input_braces_types
						continue;
					}
					# stack level 1 and found a matching_closed_brace;
					# indicate end of category in $this->brace_matches
					$this->brace_matches[$tkey]['iscat'] = true;
					# indicate begin of category in $this->brace_matches
					$this->brace_matches[$idx]['iscat'] = true;
					# clear match
					$matching_closed_brace = '';
				}
			}
		}
		# trying to backtrack non-closed braces only these which belong to
		# self::$input_braces_types
		$brace_keys = array_keys( $this->brace_matches, true );
		for ( $i = count( $brace_keys ) - 1; $i >= 0; $i-- ) {
			$brace_match = &$this->brace_matches[$brace_keys[$i]];
			# match non-closed brace which belongs to self::$input_braces_types
			# (non-closed category definitions)
			if ( array_key_exists( 'opened_at', $brace_match ) &&
					$brace_match['opened_at'] === false &&
					array_key_exists( $brace_match['type'], self::$input_braces_types ) ) {
				# try to find matching opening brace for current non-closed closing brace
				for ( $j = $i - 1; $j >= 0; $j-- ) {
					$checked_brace = &$this->brace_matches[$brace_keys[$j]];
					if ( array_key_exists( 'iscat', $checked_brace ) ) {
						# category definitions cannot be nested
						break;
					}
					if ( array_key_exists( 'closed_at', $checked_brace ) ) {
						# opening brace
						if ( $checked_brace['closed_at'] === false ) {
							# opening brace that has no matching closing brace
							if ( $checked_brace['type'] === $brace_match['type'] ) {
								# opening brace of the same type that $brace_match have
								# link $brace_match and $checked_brace to each other:
								# found matching non-closed opening brace; "link" both to each other
								$brace_match['opened_at'] = $brace_keys[$j];
								$brace_match['iscat'] = true;
								$checked_brace['closed_at'] = $brace_keys[$i];
								$checked_brace['iscat'] = true;
								break;
							}
						} elseif ( $checked_brace['closed_at'] > $i ) {
							# found opening brace that is closed at higher position than our
							# $brace_match has;
							# cross-closing is not allowed, the following code cannot be
							# category definition and template at the same time:
							# "<[ {{ ]> }}"
							break;
						}
					}
				}
			}
		}
	}

	/**
	 * Creates question view which should be renreded and
	 * also may be altered during the poll generation
	 */
	function parseBody() {
		$proposalId = 0;
		# Currently, we use just a single instance (no nested categories)
		$opt = new qp_TextQuestionOptions();
		# set static view state for the future qp_TextQuestionProposalView instances
		qp_TextQuestionProposalView::applyViewState( $this->view );
		foreach ( $this->raws as $raw ) {
			$opt->reset();
			$this->propview = new qp_TextQuestionProposalView( $proposalId, $this );
			# set proposal name (if any)
			$prop_name = qp_QuestionData::splitRawProposal( $raw );
			$this->dbtokens = $brace_stack = array();
			$catId = 0;
			$last_brace = '';
			$this->rawtokens = preg_split( self::$propCatPattern, $raw, -1, PREG_SPLIT_DELIM_CAPTURE );
			$matching_closed_brace = '';
			$this->findMatchingBraces();
			foreach ( $this->rawtokens as $tkey => $token ) {
				# $toBeStored == true when current $token has to be stored into
				# category / proposal list (depending on $opt->isCatDef)
				$toBeStored = true;
				if ( $token === '|' ) {
					# parameters separator
					if ( $opt->isCatDef ) {
						if ( count( $brace_stack ) == 1 && $brace_stack[0] === $matching_closed_brace ) {
							# pipe char starts new option only at top brace level,
							# with matching input brace
							$opt->addEmptyOption();
							$toBeStored = false;
						}
					}
				} elseif ( array_key_exists( $tkey, $this->brace_matches ) ) {
					# brace
					$brace_match = &$this->brace_matches[$tkey];
					if ( array_key_exists( 'closed_at', $brace_match ) &&
							$brace_match['closed_at'] !== false ) {
						# valid opening brace
						array_push( $brace_stack, self::$matching_braces[$token] );
						if ( array_key_exists( 'iscat', $brace_match ) ) {
							# start category definition
							$matching_closed_brace = self::$matching_braces[$token];
							$opt->startOptionsList( self::$input_braces_types[$token] );
							$toBeStored = false;
						}
					} elseif ( array_key_exists( 'opened_at', $brace_match ) &&
						$brace_match['opened_at'] !== false ) {
						# valid closing brace
						array_pop( $brace_stack );
						if ( array_key_exists( 'iscat', $brace_match ) ) {
							$matching_closed_brace = '';
							# add new category input options for the storage
							$this->dbtokens[] = $opt->input_options;
							# setup mCategories
							$this->mCategories[$catId] = array( 'name' => strval( $catId ) );
							# load proposal/category answer (when available)
							$this->loadProposalCategory( $opt, $proposalId, $catId );
							# current category is over
							$catId++;
							$toBeStored = false;
						}
					}
				}
				if ( $toBeStored ) {
					if ( $opt->isCatDef ) {
						$opt->addToLastOption( $token );
					} else {
						# add new proposal part
						$this->dbtokens[] = strval( $token );
						$this->propview->addProposalPart( $token );
					}
				}
			}
			# check if there is at least one category defined
			if ( $catId === 0 ) {
				# todo: this is the explanary line, it is not real proposal
				$this->propview->prependErrorToken( wfMsg( 'qp_error_too_few_categories' ), 'error' );
			}
			$proposal_text = serialize( $this->dbtokens );
			# build the whole raw DB proposal_text value to check it's maximal length
			if ( strlen( qp_QuestionData::getProposalNamePrefix( $prop_name ) . $proposal_text ) > qp_Setup::$proposal_max_length ) {
				# too long proposal field to store into the DB
				# this is very important check for text questions because
				# category definitions are stored within the proposal text
				$this->propview->prependErrorToken( wfMsg( 'qp_error_too_long_proposal_text' ), 'error' );
			}
			$this->mProposalText[$proposalId] = $proposal_text;
			if ( $prop_name !== '' ) {
				$this->mProposalNames[$proposalId] = $prop_name;
			}
			if ( $this->poll->mBeingCorrected ) {
				# check for unanswered categories
				try {
					if ( !array_key_exists( $proposalId, $this->mProposalCategoryId ) ) {
						# the whole line is unanswered
						throw new Exception( 'qp_error' );
					}
					# how many categories has to be answered,
					# all defined in row or at least one?
					$countRequired = ($this->mSubType === 'requireAllCategories') ? $catId : 1;
					if ( count( $this->mProposalCategoryId[$proposalId] ) < $countRequired ) {
						throw new Exception( 'qp_error' );
					}
				} catch ( Exception $e ) {
					if ( $e->getMessage() == 'qp_error' ) {
						$prev_state = $this->getState();
						$this->propview->prependErrorToken( wfMsg( 'qp_error_no_answer' ), 'NA' );
					}
				}
			}
			$this->view->addProposal( $proposalId, $this->propview );
			$proposalId++;
		}
	}

} /* end of qp_TextQuestion class */
