<?php
# This file saves the data and all. The other one loads it.
class ApiArticleFeedback extends ApiBase {
	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, '' );
	}

	public function execute() {
		global $wgUser, $wgArticleFeedbackSMaxage;
		$params = $this->extractRequestParams();

error_log('saving form');
error_log(print_r($params,1));

		// Anon token check
		$token = ApiArticleFeedbackUtils::getAnonToken($params);

		// Is feedback enabled on this page check?
		if (!ApiArticleFeedbackUtils::isFeedbackEnabled($params)) {
			$this->dieUsage( 'ArticleFeedback is not enabled on this page', 'invalidpage' );
		}

		$feedbackId   = $this->getFeedbackId($params);
		$dbr          = wfGetDB( DB_SLAVE );
		$keys         = array();
		foreach($params as $key => $unused) { $keys[] = $key; }
		$user_answers = array();
		$pageId       = $params['pageid'];
		$bucket       = $params['bucket'];
		$revisionId   = $params['revid'];
		$answers      = $dbr->select(
			'article_field',
			array('aaf_id', 'aaf_name', 'aaf_data_type'),
			array('aaf_name' => $keys),
			__METHOD__
		);

		foreach($answers as $answer) {
			$type = $answer->aaf_data_type;
			$user_answers[] = array(
				'feedback_id'    => $feedbackId,
				'field_id'       => $answer->aaf_id,
				"response_$type" => $params[$answer->aaf_name]
			);
		}

		$this->insertUserRatings($user_answers, $feedbackId, $bucket);
		$this->updateRollupTables($pageId, $revisionId);

		$squidUpdate = new SquidUpdate(array( 
			wfAppendQuery(wfScript('api'), array(
				'action'       => 'query',
				'format'       => 'json',
				'list'         => 'articlefeedback',
				'afpageid'     => $pageId,
				'afanontoken'  => '',
				'afuserrating' => 0,
				'maxage'       => 0,
				'smaxage'      => $wgArticleFeedbackSMaxage
			)) 
		));
		$squidUpdate->doUpdate();

		wfRunHooks('ArticleFeedbackChangeRating', array($params));

		$this->getResult()->addValue(null, $this->getModuleName(), 
			array('result' => 'Success')
		);
	}

	public function updateRatingRollup($page, $rev) {
		$this->__updateRollup($page, $rev, 'ratings', 'page');
		$this->__updateRollup($page, $rev, 'ratings', 'revision');
	}

	public function updateSelectRollup($page, $rev) {
		$this->__updateRollup($page, $rev, 'select', 'page');
		$this->__updateRollup($page, $rev, 'select', 'revision');
	}

	# page and rev and page and revision ids
	# type is either ratings or select, the two rollups we have
	# scope is either page or revision
	private function __updateRollup($page, $rev, $type, $scope) {
		# sanity check
		if($type != 'ratings' && $type != 'select') { return 0; }
		if($scope != 'page' && $scope != 'revision') { return 0; }

		$table = 'article_'.$rev.'_feedback_'.$type.'_rollup';
		# TODO
	}

	public function getFeedbackId($params) {
                global $wgUser;
                $token     = ApiArticleFeedbackUtils::getAnonToken($params);
                $dbr       = wfGetDB( DB_SLAVE );
                $timestamp = $dbr->timestamp();
                $revId     = $params['revid'];

                # make sure we have the page/revision/user
                if(!$params['pageid'] || !$wgUser) { return array(); }

                # Fetch this if it wasn't passed in
                if(!$revId) {
			$revId = ApiArticleFeedbackUtils::getRevisionId($params['pageid']);
                }

		/* Nope, just insert the new row. We aren't doing this anymore.
                # check for existing feedback for this rev/page/user
                $feedbackId = $dbr->selectField(
                        'article_feedback', 'aa_id',
                        array(
                                'aa_page_id'   => $params['pageid'],
                                'aa_revision'  => $revId,
                                'aa_user_text' => $wgUser->getName()
                        ),
                        __METHOD__,
                        array(
                                'ORDER BY' => 'aa_id DESC',
                                'LIMIT'    => 1
                        )
                );
                if($feedbackId) {
                        return array(
                                'feedbackId' => $feedbackId,
                                'userId'     => $wgUser->getId()
                        );
                }
		*/

                # insert new row if we don't already have one
                $dbw = wfGetDB( DB_MASTER );
                $dbw->insert('article_feedback', array(
                        'aa_page_id'         => $params['pageid'],
                        'aa_revision'        => $revId,
                        'aa_created'         => $timestamp,
                        'aa_user_id'         => $wgUser->getId(),
                        'aa_user_text'       => $wgUser->getName(),
                        'aa_user_anon_token' => $token,
                        'aa_design_bucket'   => $bucket,
                ), __METHOD__);

                return $dbw->insertID();
        }

	/**
	 * Inserts the user's rating for a specific revision
	 */ 
	private function insertUserRatings($data, $feedbackId, $bucket) {
		$dbw = wfGetDB(DB_MASTER);

		# TODO: Move these deleted rows to an archive table or flag
		# them as archived or something.
		$dbw->begin();
		$dbw->delete(
			'article_answer', 
			array('aa_id' => $feedbackId),
			__METHOD__
		);
		$dbw->insert('article_answer', $data, __METHOD__);
		$dbw->update(
			'article_feedback', 
			array(
				'aa_is_submitted'  => 1,
				'aa_design_bucket' => $bucket
			),
			array('aa_id' => $feedbackId), 
			__METHOD__
		);
		$dbw->commit();

		return $dbw->insertID();
	}

	public function getAllowedParams() {
		global $wgArticleFeedbackRatingTypes;
		$ret = array(
			'pageid' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_ISMULTI => false,
			),
			'revid' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_ISMULTI => false,
			),
			'anontoken' => null,
			'bucket' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_ISMULTI => false,
				ApiBase::PARAM_MIN => 0
			),
			'expertise' => array(
				ApiBase::PARAM_TYPE => 'string',
			),
		);

		$dbr    = wfGetDB( DB_SLAVE );
		$fields = $dbr->select('article_field', 'aaf_name');

		foreach($fields as $field) {
			$ret[$field->aaf_name] = array(
				ApiBase::PARAM_TYPE     => 'text',
				ApiBase::PARAM_REQUIRED => false,
				ApiBase::PARAM_ISMULTI  => false,
			);
		}

		return $ret;
	}

	public function getParamDescription() {
		global $wgArticleFeedbackRatingTypes;
		$ret = array(
			'pageid'    => 'Page ID to submit feedback for',
			'revid'     => 'Revision ID to submit feedback for',
			'anontoken' => 'Token for anonymous users',
			'bucket'    => 'Which rating widget was shown to the user',
			'expertise' => 'What kinds of expertise does the user claim to have',
		);
		return $ret;
	}

	public function mustBePosted() { return true; }

	public function isWriteMode() { return true; }

	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
			array( 'missingparam', 'anontoken' ),
			array( 'code' => 'invalidtoken', 'info' => 'The anontoken is not 32 characters' ),
			array( 'code' => 'invalidpage', 'info' => 'ArticleFeedback is not enabled on this page' ),
		) );
	}

	public function getDescription() {
		return array(
			'Submit article feedback'
		);
	}

	protected function getExamples() {
		return array(
			'api.php?action=articlefeedback'
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id: ApiArticleFeedback.php 100806 2011-10-26 14:19:13Z catrope $';
	}
}
