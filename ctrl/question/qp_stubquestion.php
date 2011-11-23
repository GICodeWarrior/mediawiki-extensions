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

	# optional question literal name, used to address questions in interpretation scripts
	var $mName = null;

	# some questions have subtype; currently is not stored in DB;
	# should always be properly initialized in parent controller via $poll->parseMainHeader()
	var $mSubType = '';

	# array of question proposals names (optional, used in interpretation scripts)
	# packed to string together with mProposalText then stored into DB field 'proposal_text'
	var $mProposalNames = array();

	# current user voting taken from POST data (if available)
	var $mProposalCategoryId = Array(); // user true/false answers to the question's proposal
	var $mProposalCategoryText = Array(); // user text answers to the question's proposal
	# previous user voting (if available) taken from DB
	var $mPrevProposalCategoryId = Array(); // user true/false answers to the question's proposal from DB
	var $mPrevProposalCategoryText = Array(); // user text answers to the question's proposal from DB

	/**
	 * Constructor
	 * @public
	 * @param  $poll  object
	 *   an instance of question's parent controller
	 * @param  $view  object
	 *   an instance of question view "linked" to this question
	 * @param  $questionId  integer
	 *   identifier of the question used to generate input names
	 * @param  $name  mixed
	 *   null  when question has no name / invalid name
	 *   string  valid question name
	 */
	function __construct( qp_AbstractPoll $poll, qp_StubQuestionView $view, $questionId, $name ) {
		parent::__construct( $poll, $view, $questionId );
		$this->mName = $name;
	}

	/**
	 * Get question key (reference)
	 * @return mixed
	 *   string question name if available, otherwise
	 *   integer question id
	 */
	function getQuestionKey() {
		return $this->mName === null ? $this->mQuestionId : $this->mName;
	}

	/**
	 * Get proposal id by proposal name, if any.
	 * @param $proposalName string
	 *   proposal name
	 * @return mixed
	 *   integer question id for specified name
	 *   false there is no such name
	 */
	function getProposalIdByName( $proposalName ) {
		return array_search( $proposalName, $this->mProposalNames, true );
	}

	/**
	 * Checks, whether current proposal has not enough of user-answered categories,
	 * according to current qp_Setup::$propAttrs.
	 * @param  $proposalId  integer
	 *   id of existing question's proposal
	 * @param  $catreq  mixed
	 *   value of catreq attribute
	 *   string   'all'
	 *   integer count of required categories
	 * @param  $prop_cats_count
	 *   integer  total amount of categories in current proposal
	 * @return  boolean
	 *   true  not enough of categories are filled
	 *   false otherwise
	 */
	function hasMissingCategories( $proposal_id, $catreq, $prop_cats_count ) {
		# How many categories has to be answered,
		# all defined in row or the amount specified by 'catreq' attribute?
		# total amount of categories in current proposal
		$prop_cats_count = count( $this->mCategories );
		$countRequired = ($catreq === 'all') ? $prop_cats_count : $catreq;
		if ( $countRequired > $prop_cats_count ) {
			# do not require to fill more categories
			# than is available in current proposal row
			$countRequired = $prop_cats_count;
		}
		$answered_cat_count = array_key_exists( $proposal_id, $this->mProposalCategoryId ) ?
			count( $this->mProposalCategoryId[$proposal_id] ) :
			0;
		return $answered_cat_count < $countRequired;
	}

	# load some question fields from qp_QuestionData given
	# (usually qp_QuestionData is an array property of qp_PollStore instance)
	# @param   $qdata - an instance of qp_QuestionData
	function loadAnswer( qp_QuestionData $qdata ) {
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
	function getQuestionAnswer( qp_PollStore $pollStore ) {
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

	function isUniqueProposalCategoryId( $proposalId, $catId ) {
		foreach ( $this->mProposalCategoryId as $proposalCategoryId ) {
			if ( in_array( $catId, $proposalCategoryId ) ) {
				return false;
			}
		}
		return true;
	}

	/**
	 * Applies previousely parsed attributes from main header into question's view
	 * (all attributes but type)
	 * @param  $paramkeys array
	 *   key is attribute name regexp match, value is the value of attribute
	 */
	function applyAttributes( array $paramkeys ) {
		parent::applyAttributes( $paramkeys );
		if ( $paramkeys['catreq'] !== null ) {
			$this->mCatReq = qp_PropAttrs::getSaneCatReq( $paramkeys['catreq'] );
		} 
	}

	/**
	 * @return  mixed
	 *   array  (associative) of script-generated interpretation error messages
	 *     for current question proposals (and optionally categories);
	 *   boolean  false, when there are no script-generated error messages;
	 */
	function getInterpErrors() {
		$interpResult = $this->poll->pollStore->interpResult;
		if ( !is_array( $interpResult->qpcErrors ) ) {
			return false;
		}
		$key = $this->getQuestionKey();
		if ( isset( $interpResult->qpcErrors[$key] ) ) {
			return $interpResult->qpcErrors[$key];
		}
		return false;
	}

	/**
	 * Creates question view which should be renreded and
	 * also may be altered during the poll generation
	 */
	function parseBody() {
		/* does nothing */
	}

} /* end of qp_StubQuestion class */
