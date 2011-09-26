<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * Instantinable question controller used as base class for
 * interactive question controllers;
 * Also it's instantinated when the declaration of the question has errors in
 * it's main header (see $ctrl->parseMainHeader() )
 */
class qp_StubQuestion extends qp_AbstractQuestion {

	# current user voting taken from POST data (if available)
	var $mProposalCategoryId = Array(); // user true/false answers to the question's proposal
	var $mProposalCategoryText = Array(); // user text answers to the question's proposal
	# previous user voting (if available) taken from DB
	var $mPrevProposalCategoryId = Array(); // user true/false answers to the question's proposal from DB
	var $mPrevProposalCategoryText = Array(); // user text answers to the question's proposal from DB

	/**
	 * Constructor
	 * @public
	 * @param  $poll            an instance of question's parent controller
	 * @param  $view            an instance of question view "linked" to this question
	 * @param  $questionId      the identifier of the question used to generate input names
	 */
	function __construct( qp_AbstractPoll $poll, qp_StubQuestionView $view, $questionId ) {
		parent::__construct( $poll, $view, $questionId );
	}

	# load some question fields from qp_QuestionData given
	# (usually qp_QuestionData is an array property of qp_PollStore instance)
	# @param   $qdata - an instance of qp_QuestionData
	function loadAnswer( qp_QuestionData &$qdata ) {
		$this->alreadyVoted = $qdata->alreadyVoted;
		$this->mPrevProposalCategoryId = $qdata->ProposalCategoryId;
		$this->mPrevProposalCategoryText = $qdata->ProposalCategoryText;
		if ( isset( $qdata->Percents ) && is_array( $qdata->Percents ) ) {
			$this->Percents = $qdata->Percents;
		} else {
			# no percents - no stats
			$this->view->showResults = Array( 'type' => 0 );
		}
	}

	# populates an instance of qp_Question with data from qp_QuestionData
	# @param   the object of type qp_Question
	function getQuestionAnswer( qp_PollStore &$pollStore ) {
		if ( $pollStore->pid !== null ) {
			if ( $pollStore->questionExists( $this->mQuestionId ) ) {
				$qdata = $pollStore->Questions[ $this->mQuestionId ];
				if ( $qdata->IsCompatible( $this ) ) {
					$this->loadAnswer( $qdata );
					return true;
				}
			}
		}
		return false;
	}

	# checks, whether user had previousely selected the category of the proposal of this question
	# returns true/false for 'checkbox' and 'radio' inputTypes
	# text string/false for 'text' inputType
	function answerExists( $inputType, $proposalId, $catId ) {
		if ( $this->alreadyVoted ) {
			if ( array_key_exists( $proposalId, $this->mPrevProposalCategoryId ) ) {
				$id_key = array_search( $catId, $this->mPrevProposalCategoryId[ $proposalId ] );
				if ( $id_key !== false ) {
					if ( $inputType == 'text' ) {
						if ( array_key_exists( $proposalId, $this->mPrevProposalCategoryText ) &&
								array_key_exists( $id_key, $this->mPrevProposalCategoryText[ $proposalId ] ) ) {
							$prev_text_answer = $this->mPrevProposalCategoryText[ $proposalId ][ $id_key ];
							if ( $prev_text_answer != '' ) {
								return $prev_text_answer;
							}
						}
					} else {
						return true;
					}
				}
			}
		}
		return false;
	}

	# store the proper (checked) Question
	# creates new qp_QuestionData in the given poll store
	# and places it into the poll store Questions[] collection
	# @param   the object of type qp_PollStore
	function store( qp_PollStore &$pollStore ) {
		if ( $pollStore->pid !== null ) {
			$pollStore->Questions[ $this->mQuestionId ] = qp_PollStore::newQuestionData( array(
				'from' => 'postdata',
				'type' => $this->mType,
				'common_question' => $this->mCommonQuestion,
				'categories' => $this->mCategories,
				'category_spans' => $this->mCategorySpans,
				'proposal_text' => $this->mProposalText,
				'proposal_category_id' => $this->mProposalCategoryId,
				'proposal_category_text' => $this->mProposalCategoryText ) );
		}
	}

	function isUniqueProposalCategoryId( $proposalId, $catId ) {
		foreach ( $this->mProposalCategoryId as $proposalCategoryId ) {
			if ( in_array( $catId, $proposalCategoryId ) ) {
				return false;
			}
		}
		return true;
	}

	/**
	 * @return  associative array of script-generated interpretation error
	 *          messages for current question proposals (and optionally categories)
	 *          false, when there are no script-generated error messages
	 */
	function getInterpErrors() {
		$interpResult = &$this->poll->pollStore->interpResult;
		if ( !is_array( $interpResult->qpcErrors ) ||
				!isset( $interpResult->qpcErrors[$this->mQuestionId] ) ) {
			return false;
		}
		return $interpResult->qpcErrors[$this->mQuestionId];
	}

	/**
	 * Creates question view which should be renreded and
	 * also may be altered during the poll generation
	 */
	function parseBody() {
		/* does nothing */
	}

} /* end of qp_StubQuestion class */
