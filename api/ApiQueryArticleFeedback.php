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
			if ( !isset( $ratings[$params['pageid']]['revid'] ) ) {
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
		
		// User-specific data
		$ratings[$params['pageid']]['status'] = 'current';
		if ( $params['userrating'] ) {
			// Expertise
			$expertise = $this->getExpertise( $params );
			if ( $expertise !== false ) {
				$ratings[$params['pageid']]['expertise'] = $expertise;
			}
			// User ratings
			$userRatings = $this->getUserRatings( $params );
			if ( isset( $ratings[$params['pageid']]['ratings'] ) ) {
				// Valid ratings already exist
				foreach ( $ratings[$params['pageid']]['ratings'] as $i => $rating ) {
					if ( isset( $userRatings[$rating['ratingid']] ) ) {
						// Rating value
						$ratings[$params['pageid']]['ratings'][$i]['userrating'] =
							$userRatings[$rating['ratingid']]['value'];
						// Expiration
						if ( $userRatings[$rating['ratingid']]['revision'] < $revisionLimit ) {
							$ratings[$params['pageid']]['status'] = 'expired';
						}
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
				}
			}
		}

		foreach ( $ratings as $rat ) {
			$result->setIndexedTagName( $rat['ratings'], 'r' );
			$result->addValue( array( 'query', $this->getModuleName() ), null, $rat );
		}

		$result->setIndexedTagName_internal( array( 'query', $this->getModuleName() ), 'aa' );
	}
	
	protected function getAnonToken( $params ) {
		global $wgUser;
		
		$token = '';
		if ( $wgUser->isAnon() ) {
			if ( !isset( $params['anontoken'] ) ) {
				$this->dieUsageMsg( array( 'missingparam', 'anontoken' ) );
			} elseif ( strlen( $params['anontoken'] ) != 32 ) {
				$this->dieUsage( 'The anontoken is not 32 characters', 'invalidtoken' );
			}
			$token = $params['anontoken'];
		}
		return $token;
	}
	
	protected function getExpertise( $params ) {
		global $wgUser;
		
		return $this->getDB()->selectField(
			'article_feedback_properties',
			'afp_value_text',
			array(
				'afp_key' => 'expertise',
				'afp_user_text' => $wgUser->getName(),
				'afp_user_anon_token' => $this->getAnonToken( $params ),
			),
			__METHOD__,
			array( 'ORDER BY', 'afp_revision DESC' )
		);
	}
	
	protected function getUserRatings( $params ) {
		global $wgUser, $wgArticleFeedbackRatings;

		$res = $this->getDB()->select(
			array( 'article_feedback', 'article_feedback_ratings' ),
			array(
				'aa_rating_id',
				'aar_rating',
				'aa_revision',
				'aa_rating_value',
			),
			array(
				'aa_page_id' => $params['pageid'],
				'aa_rating_id' => $wgArticleFeedbackRatings,
				'aa_user_id' => $wgUser->getId(),
				'aa_user_text' => $wgUser->getName(),
				'aa_user_anon_token' => $this->getAnonToken( $params ),
			),
			__METHOD__,
			array(
				'LIMIT' => count( $wgArticleFeedbackRatings ),
				'ORDER BY' => array( 'aa_rating_id', 'aa_revision DESC' ),
			),
			array(
				'article_feedback_ratings' => array( 'LEFT JOIN', array( 'aar_id=aa_rating_id' ) )
			)
		);
		$ratings = array();
		$revId = null;
		foreach ( $res as $row ) {
			if ( $revId === null ) {
				$revId = $row->aa_revision;
			}
			// Prevent incomplete rating sets from making a mess
			if ( $revId === $row->aa_revision ) {
				$ratings[$row->aa_rating_id] = array(
					'value' => $row->aa_rating_value,
					'revision' => $row->aa_revision,
					'text' => $row->aar_rating,
				);
			}
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