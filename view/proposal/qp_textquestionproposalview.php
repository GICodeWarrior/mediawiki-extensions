<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * Manipulates the list of text question view tokens in single proposal row,
 * View tokens are the combined proposal/categories definition.
 */
class qp_TextQuestionProposalView extends qp_StubQuestionProposalView {

	# list of viewtokens
	#   elements of string type contain proposal parts;
	#   elements of stdClass :
	#     property 'options' indicates current category options list
	#     property 'error' indicates error message
	var $viewtokens = array();

	/**
	 * Add new proposal part (between two categories or line bounds)
	 * It is just an element of string type
	 *
	 * @param  $prop  string  proposal part
	 */
	function addProposalPart( $prop ) {
		$this->viewtokens[] = $prop;
	}

	/**
	 * Creates viewtokens entry with current category definition
	 * @param  $opt  qp_TextQuestionOptions
	 *         should contain "closed" category definition with prepared
	 *         category input options
	 * @param  $name  string  name of input/select element (used in the view)
	 * @param  $text_answer  string user's POSTed category answer
	 *         (empty string '' means no answer)
	 * @return  stdClass object with viewtokens entry
	 */
	function addCatDef( qp_TextQuestionOptions $opt, $name, $text_answer, $unanswered ) {
		# $catdef instanceof stdClass properties:
		# property 'options' stores an array of user options
		#          Multiple options will be selected from the list
		#          Single option will be displayed as text input
		# property 'name' contains name of input element
		# property 'value' contains value previousely chosen
		#          by user (if any)
		# property 'textwidth' may optionally override default
		#          text input width
		# property 'unanswered'  boolean
		#          true - the question was POSTed but category is unanswered
		#          false - the question was not POSTed or category is answered
		$catdef = (object) array(
			'options' => $opt->input_options,
			'name' => $name,
			'value' => $text_answer,
			'unanswered' => $unanswered
		);
		if ( !is_null( $opt->textwidth ) ) {
			$catdef->textwidth = $opt->textwidth;
		}
		$this->viewtokens[] = $catdef;
	}

	/**
	 * Adds new non-empty error message to the list of parsed tokens (viewtokens)
	 * @param    $msg - text of message
	 * @param    $state - set new question controller state
	 *               note that the 'error' state cannot be changed and '' state cannot be set
	 * @param    $rowClass - string set rowClass value, boolean false (do not set)
	 */
	function prependErrorToken( $msg, $state, $rowClass = 'proposalerror' ) {
		# note: error message also can be added in the middle of the list,
		# for any category, if desired, although that is currently not implemented
		$errmsg = $this->bodyErrorMessage( $msg, $state, $rowClass );
		# note: when $state == '' every $errmsg is non-empty;
		#       when $state == 'error' only the first $errmsg is non-empty;
		if ( $errmsg !== '' ) {
			array_unshift( $this->viewtokens, (object) array( 'error'=> $errmsg ) );
		}
	}

	/**
	 * Applies interpretation script category error messages
	 * to the current proposal line.
	 * @param   $prop_desc  array
	 *          keys are category numbers (indexes)
	 *          values are interpretation script-generated error messages
	 * @return  boolean true when at least one category was found in the list
	 *          false otherwise
	 */
	function applyInterpErrors( $prop_desc ) {
		$foundCats = false;
		$cat_id = -1;
		foreach ( $this->viewtokens as &$token ) {
			if ( is_object( $token ) && property_exists( $token, 'options' ) ) {
				# found a category definition
				$cat_id++;
				if ( isset( $prop_desc[$cat_id] ) ) {
					$foundCats = true;
					# whether to use custom or standard error message
					if ( !is_string( $cat_desc = $prop_desc[$cat_id] ) ) {
						$cat_desc = wfMsg( 'qp_interpetation_wrong_answer' );
					}
					# mark the input to highlight it during the rendering
					if ( ( $msg = $this->bodyErrorMessage( $cat_desc, '', false ) ) !=='' ) {
						# we call with question state = '', so the returned $msg never should be empty
						# unless there was a syntax error, however during the interpretation stage there
						# should be no syntax errors, so we can assume that $msg is never equal to ''
						$token->interpError = $msg;
					}
				}
			}
		}
		return $foundCats;
	}

} /* end of qp_TextQuestionProposalView */
