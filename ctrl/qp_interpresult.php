<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * An interpretation result of user answer to the quiz
 */
class qp_InterpResult {
	# short answer. it is supposed to be sortable and accountable in statistics
	# by default, it is private (displayed only in Special:Pollresults page)
	# blank value means short answer is unavailable
	var $short = '';
	# long answer. it is supposed to be understandable by amateur users
	# by default, it is public (displayed everywhere)
	# blank value means long answer is unavailable
	var $long = '';
	# structured answer. scalar value or an associative array.
	# object instances are not allowed.
	# their purpose is:
	#   * exported to XLS cells to be analyzed by external tools
	#   * import interpretation results of another polls to
	#     current interpretation script make cross-poll (multi-poll)
	#     interpretations
	var $structured = '';
	# error message. non-blank value indicates interpretation script error
	# either due to incorrect script code, or a script-generated one
	var $error = '';
	# whether the user answer should be stored in case of
	# erroneous interpretation results:
	#   true:  education application, to see pupul's mistake;
	#   false: form validation, to prevent visibility of next poll in
	#          dependance chain until the form is filled properly;
	var $storeErroneous = true;
	# interpretation result
	# 2d array of errors generated for [question][proposal]
	# 3d array of errors generated for [question][proposal][category]
	# false if no errors
	var $qpcErrors = false;

	/**
	 * @param $init - optional array of properties to be initialized
	 */
	function __construct( $init = null ) {
		$props = array( 'short', 'long', 'error' );
		if ( is_array( $init ) ) {
			foreach ( $props as $prop ) {
				if ( array_key_exists( $prop, $init ) ) {
					$this->{ $prop } = $init[$prop];
				}
			}
			return;
		}
	}

	/**
	 * "global" error message
	 */
	function setError( $msg ) {
		$this->error = $msg;
		return $this;
	}

	/**
	 * set question / proposal error message (for quizes)
	 *
	 * @param $msg   string error message for [question][proposal] pair;
	 *               non-string for default message
	 * @param $qidx  int index of poll's question
	 * @param $pidx  int index of question's proposal
	 * @param $cidx  int index of proposal's category (optional)
	 */
	function setQPCerror( $msg, $qidx, $pidx, $cidx = null ) {
		if ( !is_array( $this->qpcErrors ) ) {
			$this->qpcErrors = array();
		}
		if ( !array_key_exists( $qidx, $this->qpcErrors ) ) {
			$this->qpcErrors[$qidx] = array();
		}
		if ( $cidx === null ) {
			# proposal interpretation error message
			$this->qpcErrors[$qidx][$pidx] = $msg;
			return;
		}
		# proposal's category interpretation error message
		if ( !array_key_exists( $pidx, $this->qpcErrors[$qidx] ) ||
				!is_array( $this->qpcErrors[$qidx][$pidx] ) ) {
			# remove previous proposal interpretation error message because
			# now we have more precise category interpretation error message
			$this->qpcErrors[$qidx][$pidx] = array();
		}
		$this->qpcErrors[$qidx][$pidx][$cidx] = $msg;
	}

	function setDefaultErrorMessage() {
		if ( is_array( $this->qpcErrors ) && $this->error == '' ) {
			$this->error = wfMsg( 'qp_interpetation_wrong_answer' );
		}
		return $this;
	}

	function isError() {
		return $this->error != '' || is_array( $this->qpcErrors );
	}

	function hasToBeStored() {
		return !$this->isError() || $this->storeErroneous;
	}

} /* end of qp_InterpResult class */
