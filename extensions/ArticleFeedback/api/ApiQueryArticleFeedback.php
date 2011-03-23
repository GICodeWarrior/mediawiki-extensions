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

		// Rating counts and totals
		$res = $this->select( __METHOD__ );
		$ratings = array( $params['pageid'] => array( 'pageid' => $params['pageid'] ) );
		foreach ( $res as $i => $row ) {
			if ( !isset( $ratings[$params['pageid']] ) ) {
				$ratings[$params['pageid']]['revid'] = $row->aap_revision;
			}
			if ( !isset( $ratings[$params['pageid']]['ratings'] ) ) {
				$ratings[$params['pageid']]['ratings'] = array();
			}
			$ratings[$params['pageid']]['ratings'][] = array(
				'ratingid' => $row->aap_rating_id,
				'ratingdesc' => $row->aar_rating,
				'total' => $row->aap_total,
				'count' => $row->aap_count,
			);
		}
		
		// User ratings
		$ratings[$params['pageid']]['status'] = 'current';
		if ( $params['userrating'] ) {
			$userRatings = $this->getUserRatings( $params );
			if ( isset( $ratings[$params['pageid']]['ratings'] ) ) {
				// Valid ratings already exist
				foreach ( $ratings[$params['pageid']]['ratings'] as $i => $rating ) {
					// Rating value
					$ratings[$params['pageid']]['ratings'][$i]['userrating'] =
						$userRatings[$rating['ratingid']]['value'];
					// Expertise
					if ( !isset( $ratings[$params['pageid']]['expertise'] ) ) {
						$ratings[$params['pageid']]['expertise'] =
							$userRatings[$rating['ratingid']]['expertise'];
					}
					// Expiration
					if ( $userRatings[$rating['ratingid']]['revision'] < $revisionLimit ) {
						$ratings[$params['pageid']]['status'] = 'expired';
					}
				}
			} else {
				// No valid ratings exist
				if ( count( $userRatings ) ) {
					$ratings[$params['pageid']]['status'] = 'expired';
				}
				foreach ( $userRatings as $ratingId => $userRating ) {
					// Revision
					if ( !isset( $ratings[$params['pageid']]['revid'] ) ) {
						$ratings[$params['pageid']]['revid'] = $userRating['revision'];
					}
					// Ratings
					if ( !isset( $ratings[$params['pageid']]['ratings'] ) ) {
						$ratings[$params['pageid']]['ratings'] = array();
					}
					// Rating value
					$ratings[$params['pageid']]['ratings'][] = array(
						'ratingid' => $ratingId,
						'ratingdesc' => $userRating['text'],
						'total' => 0,
						'count' => 0,
						'userrating' => $userRating['value'],
					);
					// Expertise
					if ( !isset( $ratings[$params['pageid']]['expertise'] ) ) {
						$ratings[$params['pageid']]['expertise'] = $userRating['expertise'];
					}
				}
			}
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

		$res = $this->getDB()->select(
			array( 'article_feedback', 'article_feedback_properties', 'article_feedback_ratings' ),
			array(
				'aa_rating_id',
				'aar_rating',
				'aa_revision',
				'aa_rating_value',
				'afp_value_text'
			),
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
			array(
				'article_feedback_properties' => array(
					'LEFT JOIN', array(
						'afp_revision=aa_revision',
						'afp_user_text=aa_user_text',
						'afp_user_anon_token=aa_user_anon_token',
						'aa_user_anon_token' => $token,
						'afp_key' => 'expertise',
					)
				),
				'article_feedback_ratings' => array( 'LEFT JOIN', array( 'aar_id=aa_rating_id' ) )
			)
		);
		$ratings = array();
		foreach ( $res as $row ) {
			$ratings[$row->aa_rating_id] = array(
				'value' => $row->aa_rating_value,
				'expertise' => $row->afp_value_text,
				'revision' => $row->aa_revision,
				'text' => $row->aar_rating,
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

		$revision = $this->getDB()->selectField(
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