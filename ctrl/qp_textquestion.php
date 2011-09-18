<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * Stores the list of current category options -
 * usually the pipe-separated entries in double angle brackets list
 */
class qp_TextQuestionOptions {

	# boolean, indicates whether incoming tokens are category list elements
	var $isCatDef;
	# counter of pipe-separated elements in-between << >> markup
	# used to distinguish real category options from textwidth definition
	var $catDefIdx;
	# list of input options; array whose every element is a string
	var $input_options;
	# a value of textwidth definition for input text field
	# it is defined as first element of options list, for example:
	# <<::12>> or <<::15|test>>
	# currently, it is used only for text inputs (not for select/option list)
	var $textwidth;
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
	function startOptionsList() {
		$this->isCatDef = true;
		$this->input_options = array( 0 => '' );
		$this->textwidth = null; // will use default value
		$this->iopt_last = &$this->input_options[0];
	}

	/**
	 * Adds new empty option
	 * This option will be "current last option"
	 */
	function addEmptyOption() {
		# add new empty option only if there was no textwidth definition
		if ( is_null( $this->textwidth ) || $this->catDefIdx !== 0 ) {
			# add new empty option to the end of the list
			$this->input_options[] = '';
			$this->iopt_last = &$this->input_options[count( $this->input_options ) - 1];
		}
		$this->catDefIdx++;
	}

	/**
	 * Set string value to current last option
	 * @param  $token  string current value of token between pipe separators
	 * Also, _optionally_ overrides textwidth property
	 */
	function setLastOption( $token ) {
		# first entry of category options might be definition of
		# the current category input textwidth instead
		$matches = array();
		if ( count( $this->input_options ) === 1 &&
				preg_match( '`^\s*::(\d{1,2})\s*$`', $token, $matches ) &&
				$matches[1] > 0 ) {
			# override the textwidth of input options
			$this->textwidth = intval( $matches[1] );
		} else {
			# add new input option
			$this->iopt_last .= trim( $token );
		}
	}

	/**
	 * Closes current category definition and prepares input options entries
	 */
	function closeCategory() {
		$this->isCatDef = false;
		# prepare new category input choice (text questions have no category names)
		$unique_options = array_unique( $this->input_options, SORT_STRING );
		$this->input_options = array();
		foreach ( $unique_options as $option ) {
			# make sure unique elements keys are consequitive starting from 0
			$this->input_options[] = $option;
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

	const PROP_CAT_PATTERN = '`(<<|>>|{{|}}|\[\[|\]\]|\|)`u';

	# $viewtokens is an instance of qp_TextQuestionViewTokens
	#             which contains parsed tokens for combined
	#             proposal/category view
	var $viewtokens;
	# $dbtokens will contain parsed tokens for combined
	#           proposal/category storage
	# $dbtokens elements do not include error messages;
	# only proposal parts and category options
	var $dbtokens = array();

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
	 * Also, stores text answer into the parsed tokens list (viewtokens)
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
		$this->viewtokens->addCatDef( $opt, $name, $text_answer, $this->poll->mBeingCorrected && !$user_answered );
	}

	/**
	 * Creates question view which should be renreded and
	 * also may be altered during the poll generation
	 */
	function parseBody() {
		$matching_braces = array(
			'[[' => ']]',
			'{{' => '}}',
			'<<' => '>>'
		);
		$proposalId = 0;
		# Currently, we use just a single instance (no nested categories)
		$opt = new qp_TextQuestionOptions();
		$this->viewtokens = new qp_TextQuestionViewTokens( $this->view );
		foreach ( $this->raws as $raw ) {
			$this->view->initProposalView();
			$opt->reset();
			$this->viewtokens->reset();
			$this->dbtokens = $brace_stack = array();
			$catId = 0;
			$last_brace = '';
			$tokens = preg_split( self::PROP_CAT_PATTERN, $raw, -1, PREG_SPLIT_DELIM_CAPTURE );
			foreach ( $tokens as $token ) {
				$isContinue = false;
				switch ( $token ) {
				case '|' :
					if ( $opt->isCatDef ) {
						$opt->addEmptyOption();
						$isContinue = true;
					}
					break;
				case '[[' :
				case '{{' :
				case '<<' :
					array_push( $brace_stack, $matching_braces[$token] );
					if ( $token === '<<' && count( $brace_stack ) == 1 ) {
						$opt->startOptionsList();
						$isContinue = true;
					}
					break;
				case ']]' :
				case '}}' :
				case '>>' :
					if ( count( $brace_stack ) > 0 ) {
						$last_brace = array_pop( $brace_stack );
						if ( $last_brace != $token ) {
							array_push( $brace_stack, $last_brace );
							break;
						}
						if ( count( $brace_stack ) > 0 || $token !== '>>' ) {
							break;
						}
						# add new category input options for the storage
						$this->dbtokens[] = $opt->input_options;
						# setup mCategories
						$this->mCategories[$catId] = array( 'name' => strval( $catId ) );
						# load proposal/category answer (when available)
						$this->loadProposalCategory( $opt, $proposalId, $catId );
						# current category is over
						$catId++;
						$isContinue = true;
					}
					break;
				}
				if ( $isContinue ) {
					continue;
				}
				if ( $opt->isCatDef ) {
					$opt->setLastOption( $token );
				} else {
					# add new proposal part
					$this->dbtokens[] = strval( $token );
					$this->viewtokens->addProposalPart( $token );
				}
			}
			# check if there is at least one category defined
			if ( $catId === 0 ) {
				# todo: this is the explanary line, it is not real proposal
				$this->viewtokens->prependErrorToken( wfMsg( 'qp_error_too_few_categories' ), 'error' );
			}
			if ( strlen( $proposal_text = serialize( $this->dbtokens ) ) > qp_Setup::$proposal_max_length ) {
				# too long proposal field to store into the DB
				# this is very important check for text questions because
				# category definitions are stored within the proposal text
				$this->viewtokens->prependErrorToken( wfMsg( 'qp_error_too_long_proposal_text' ), 'error' );
			}
			$this->mProposalText[$proposalId] = $proposal_text;
			# If the proposal was submitted but has _any_ unanswered category
			if ( $this->poll->mBeingCorrected &&
					( !array_key_exists( $proposalId, $this->mProposalCategoryId ) ||
						count( $this->mProposalCategoryId[$proposalId] ) !== $catId )
				) {
				# todo: apply 'error' style to the whole row
				$prev_state = $this->getState();
				$this->viewtokens->prependErrorToken( wfMsg( 'qp_error_no_answer' ), 'NA' );
				if ( $prev_state == '' ) {
					# todo: if there was no previous errors, hightlight the whole row
				}
			}
			$this->view->addProposal( $proposalId, $this->viewtokens->tokenslist );
			$proposalId++;
		}
	}

} /* end of qp_TextQuestion class */
