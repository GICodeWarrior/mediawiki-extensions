<?php
class ApiQueryArticleFeedback extends ApiQueryBase {
	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'af' );
	}

	public function execute() {
		global $wgArticleFeedbackRatings;
		
		$params = $this->extractRequestParams();
		$result = $this->getResult();
		$revisionLimit = $this->getRevisionLimit( $params['pageid'] );
		
		$this->addTables( array( 'article_feedback_pages', 'article_feedback_ratings' ) );
		$this->addFields( array(
			'aap_page_id',
			'MAX(aap_revision) as aap_revision',
			'SUM(aap_total) as aap_total',
			'SUM(aap_count) as aap_count',
			'aap_rating_id',
			'aar_rating',
		) );
		$this->addJoinConds( array(
				'article_feedback_ratings' => array( 'LEFT JOIN', array(
					'aar_id=aap_rating_id',
					'aap_rating_id' => $wgArticleFeedbackRatings,
				)
			),
		) );
		$this->addWhereFld( 'aap_page_id', $params['pageid'] );
		$this->addWhere( 'aap_revision >= ' . $revisionLimit );
		$this->addOption( 'GROUP BY', 'aap_rating_id' );
		$this->addOption( 'LIMIT', count( $wgArticleFeedbackRatings ) );

		$res = $this->select( __METHOD__ );

		if ( $params['userrating'] ) {
			$userRatings = $this->getUserRatings( $params );
		}

		$ratings = array();

		$userRatedArticle = false;

		$rev = null;
		foreach ( $res as $i => $row ) {
			// All the revs and pageIds will be the same for all rows, these are shortcuts
			$pageId = $row->aap_page_id;
			// This is special however, because we need this data later for expired calculation
			$rev = $row->aap_revision;

			if ( !isset( $ratings[$pageId] ) ) {
				$page = array(
					'pageid' => $pageId,
					'revid' => $rev,
				);

				if ( $params['userrating'] ) {
					if ( isset( $userRatings[$i]['expertise'] ) ) {
						$page['expertise'] = $userRatings[$i]['expertise'];
					}
				}

				$ratings[$pageId] = $page;
			}

			$thisRow = array(
				'ratingid' => $row->aap_rating_id,
				'ratingdesc' => $row->aar_rating,
				'total' => $row->aap_total,
				'count' => $row->aap_count,
			);

			if ( $params['userrating'] && isset( $userRatings[$i]['value'] ) ) {
				$thisRow['userrating'] = $userRatings[$i]['value'];

				$userRatedArticle = true;
			}

			$ratings[$pageId]['ratings'][] = $thisRow;
		}

		// Ratings can only be expired if the user has rated before
		if ( $params['userrating'] && $userRatedArticle ) {
			$ratings[$params['pageid']]['status'] = $rev >= $revisionLimit ? 'current' : 'expired';
		}

		foreach ( $ratings as $rat ) {
			$result->setIndexedTagName( $rat['ratings'], 'r' );
			$result->addValue( array( 'query', $this->getModuleName() ), null, $rat );
		}

		$result->setIndexedTagName_internal( array( 'query', $this->getModuleName() ), 'aa' );
	}

	protected function getUserRatings( $params ) {
		global $wgUser, $wgArticleFeedbackRatings;

		$pageId = $params['pageid'];
		$token = '';
		if ( $wgUser->isAnon() ) {
			if ( !isset( $params['anontoken'] ) ) {
				$this->dieUsageMsg( array( 'missingparam', 'anontoken' ) );
			} elseif ( strlen( $params['anontoken'] ) != 32 ) {
				$this->dieUsage( 'The anontoken is not 32 characters', 'invalidtoken' );
			}
			$token = $params['anontoken'];
		}

		$dbr = wfGetDb( DB_SLAVE );
		$res = $dbr->select(
			array( 'article_feedback', 'article_feedback_properties' ),
			array( 'aa_rating_id', 'aa_rating_value', 'afp_value_text' ),
			array(
				'aa_page_id' => $pageId,
				'aa_rating_id' => $wgArticleFeedbackRatings,
				'aa_user_id' => $wgUser->getId(),
			),
			__METHOD__,
			array(
				'ORDER BY' => 'aa_revision DESC',
				'LIMIT' => count( $wgArticleFeedbackRatings )
			),
			array( 'article_feedback_properties' => array(
				'LEFT JOIN', array(
					'afp_revision=aa_revision',
					'afp_user_text=aa_user_text',
					'afp_user_anon_token=aa_user_anon_token',
					'aa_user_anon_token' => $token,
					'afp_key' => 'expertise',
				)
			) )
		);
		$ratings = array();
		foreach ( $res as $row ) {
			$ratings[$row->aa_rating_id] = array(
				'value' => $row->aa_rating_value,
				'expertise' => $row->afp_value_text
			);
		}
		return $ratings;
	}

	/**
	 * Get the revision number of the oldest revision still being counted in totals.
	 * 
	 * @param $pageId Integer: ID of page to check revisions for
	 * @return Integer: Oldest valid revision number or 0 of all revisions are valid
	 */
	protected function getRevisionLimit( $pageId ) {
		global $wgArticleFeedbackRatingLifetime;

		$dbr = wfGetDb( DB_SLAVE );
		$revision = $dbr->selectField(
			'revision',
			'rev_id',
			array( 'rev_page' => $pageId ),
			__METHOD__,
			array(
				'ORDER BY' => 'rev_id DESC',
				'LIMIT' => 1,
				'OFFSET' => $wgArticleFeedbackRatingLifetime - 1
			)
		);
		if ( $revision ) {
			return intval( $revision );
		}
		return 0;
	}

	public function getAllowedParams() {
		return array(
			'pageid' => array(
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_ISMULTI => false,
				ApiBase::PARAM_TYPE => 'integer',
			),
			'userrating' => false,
			'anontoken' => null,
		);
	}

	public function getParamDescription() {
		return array(
			'pageid' => 'Page ID to get feedbacks for',
			'userrating' => "Whether to get the current user's ratings for the specific rev/article",
			'anontoken' => 'Token for anonymous users',
		);
	}

	public function getDescription() {
		return array(
			'List all article feedbacks'
		);
	}

	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
				array( 'missingparam', 'anontoken' ),
				array( 'code' => 'invalidtoken', 'info' => 'The anontoken is not 32 characters' ),
			)
		);
	}

	protected function getExamples() {
		return array(
			'api.php?action=query&list=articlefeedback',
			'api.php?action=query&list=articlefeedback&afpageid=1',
			'api.php?action=query&list=articlefeedback&afpageid=1&afuserrating',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
}