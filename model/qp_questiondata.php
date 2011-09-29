<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * Poll's single question data object RAM storage
 * ( instances usually have short name qdata )
 *
 * *** Please do not instantiate directly. ***
 * *** use qp_PollStore::newQuestionData() instead ***
 *
 */
class qp_QuestionData {

	// DB index (with current scheme is non-unique)
	var $question_id = null;
	// common properties
	var $type;
	var $CommonQuestion;
	var $Categories;
	var $CategorySpans;
	var $ProposalText;
	var $ProposalNames = array();
	var $ProposalCategoryId;
	var $ProposalCategoryText;
	var $alreadyVoted = false; // whether the selected user already voted this question ?
	// statistics storage
	var $Votes = null;
	var $Percents = null;

	/**
	 * Constructor
	 * @param $argv  associative array, where value of key 'from' defines creation method:
	 *               'postdata' creates qdata from question instance parsed in tag hook handler;
	 *               'qid' creates new empty instance to be filled with data loaded from DB;
	 *               another entries of $argv define property names and their values
	 */
	function __construct( $argv ) {
		if ( array_key_exists( 'from', $argv ) ) {
			switch ( $argv[ 'from' ] ) {
				case 'postdata' :
						$this->type = $argv[ 'type' ];
						$this->CommonQuestion = $argv[ 'common_question' ];
						$this->Categories = $argv[ 'categories' ];
						$this->CategorySpans = $argv[ 'category_spans' ];
						$this->ProposalText = $argv[ 'proposal_text' ];
						$this->ProposalNames = $argv[ 'proposal_names' ];
						$this->ProposalCategoryId = $argv[ 'proposal_category_id' ];
						$this->ProposalCategoryText = $argv[ 'proposal_category_text' ];
					return;
				case 'qid' :
						$this->question_id = $argv[ 'qid' ];
						$this->type = $argv[ 'type' ];
						$this->CommonQuestion = $argv[ 'common_question' ];
						$this->Categories = array();
						$this->CategorySpans = array();
						$this->ProposalText = array();
						$this->ProposalCategoryId = array();
						$this->ProposalCategoryText = array();
					return;
			}
		}
		throw new MWException( "Parameter \$argv['from'] is missing or has unsupported value in " . __METHOD__ );
	}

	/**
	 * Create appropriate view for Special:Pollresults
	 */
	function createView() {
		return new qp_QuestionDataResults( $this );
	}

	/**
	 * Integrate spans into categories
	 */
	function packSpans() {
		if ( count( $this->CategorySpans ) > 0 ) {
			foreach ( $this->Categories as &$Cat ) {
				if ( array_key_exists( 'spanId', $Cat ) ) {
					$Cat['name'] = $this->CategorySpans[ $Cat['spanId'] ]['name'] . "\n" . $Cat['name'];
					unset( $Cat['spanId'] );
				}
			}
			unset( $this->CategorySpans );
			$this->CategorySpans = array();
		}
	}

	/**
	 * Restore spans from categories
	 */
	function restoreSpans() {
		if ( count( $this->CategorySpans ) == 0 ) {
			$prevSpanName = '';
			$spanId = -1;
			foreach ( $this->Categories as &$Cat ) {
				$a = explode( "\n", $Cat['name'] );
				if ( count( $a ) > 1 ) {
					if ( $prevSpanName != $a[0] ) {
						$spanId++;
						$prevSpanName = $a[0];
						$this->CategorySpans[ $spanId ]['count'] = 0;
					}
					$Cat['name'] = $a[1];
					$Cat['spanId'] = $spanId;
					$this->CategorySpans[ $spanId ]['name'] = $a[0];
					$this->CategorySpans[ $spanId ]['count']++;
				} else {
					$prevSpanName = '';
				}
			}
		}
	}

	/**
	 * Check whether the previousely stored poll header is
	 * compatible with the one defined on the page.
	 *
	 * Used to reject previous vote in case the header is incompatble.
	 */
	function isCompatible( &$question ) {
		if ( $question->mType != $this->type ) {
			return false;
		}
		if ( count( $question->mCategorySpans ) != count( $this->CategorySpans ) ) {
			return false;
		}
		foreach ( $question->mCategorySpans as $spanidx => &$span ) {
			if ( !isset( $this->CategorySpans[$spanidx] ) ||
					$span['count'] != $this->CategorySpans[$spanidx]['count'] ) {
				return false;
			}
		}
		return true;
	}

	/**
	 * Split raw proposal text from source page text or from DB
	 * into name part / text part
	 *
	 * @param  $proposal_text  string  raw proposal text
	 * @modifies $proposal_text  string proposal text to display
	 * @return  string  proposal name or '' when there is no name
	 */
	static function splitRawProposal( &$proposal_text ) {
		$matches = array();
		$prop_name = '';
		preg_match( '`^:\|(.+?)\|\s*(.+?)$`u', $proposal_text, $matches );
		if ( count( $matches ) > 2 ) {
			if ( ( $prop_name = trim( $matches[1] ) ) !== '' ) {
				# proposal name must be non-empty
				$proposal_text = trim( $matches[2] );
			}
		}
		return $prop_name;
	}
	
	/**
	 * Return proposal name prefix to be stored in DB (if any)
	 */
	static function getProposalNamePrefix( $name ) {
		return ( $name !== '' ) ? ":|{$name}|" : '';
	}

} /* end of qp_QuestionData class */

/**
 *
 * *** Please do not instantiate directly. ***
 * *** use qp_PollStore::newQuestionData() instead ***
 *
 */
class qp_TextQuestionData extends qp_QuestionData {

	/**
	 * Questions of type="text" require a different view logic in Special:Pollresults page
	 */
	function createView() {
		return new qp_TextQuestionDataResults( $this );
	}

} /* end of qp_TextQuestionData class */
