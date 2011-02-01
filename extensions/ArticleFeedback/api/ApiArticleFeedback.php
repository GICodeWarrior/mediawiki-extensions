<?php
class ApiArticleFeedback extends ApiBase {
	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, '' );
	}

	public function execute() {
		global $wgUser, $wgArticleFeedbackRatings;
		$params = $this->extractRequestParams();

		$token = array();
		if ( $wgUser->isAnon() ) {
			if ( !isset( $params['anontoken'] ) ) {
				$this->dieUsageMsg( array( 'missingparam', 'anontoken' ) );
			} elseif ( strlen( $params['anontoken'] ) != 32 ) {
				$this->dieUsage( 'The anontoken is not 32 characters', 'invalidtoken' );
			}

			$token = $params['anontoken'];
		} else {
			$token = '';
		}

		$dbr = wfGetDB( DB_SLAVE );

		// Query the latest ratings by this user for this page,
		// possibly for an older revision
		$res = $dbr->select(
			'article_feedback',
			array( 'aa_rating_id', 'aa_rating_value', 'aa_revision' ),
			array(
				'aa_user_id' => $wgUser->getId(),
				'aa_user_text' => $wgUser->getName(),
				'aa_page_id' => $params['pageid'],
				'aa_rating_id' => $wgArticleFeedbackRatings,
				'aa_user_anon_token' => $token,
			),
			__METHOD__,
			array(
				'ORDER BY' => 'aa_revision DESC',
				'LIMIT' => count( $wgArticleFeedbackRatings ),
			)
		);

		$lastRatings = array();

		foreach ( $res as $row ) {
			$lastRatings[$row->aa_rating_id] = $row->aa_rating_value;
		}

		$pageId = $params['pageid'];
		$revisionId = $params['revid'];

		foreach( $wgArticleFeedbackRatings as $rating ) {
			$lastRating = false;
			if ( isset( $lastRatings[$rating] ) ) {
				$lastRating = intval( $lastRatings[$rating] );
			}

			$thisRating = false;
			if ( isset( $params["r{$rating}"] ) ) {
				$thisRating = intval( $params["r{$rating}"] );
			}

			$this->insertPageRating( $pageId, $rating, ( $thisRating - $lastRating ),
					$thisRating, $lastRating
			);

			$this->insertUserRatings( $pageId, $revisionId, $wgUser, $token, $rating, $thisRating, $params['bucket'] );
		}
		
		$this->insertProperties( $revisionId, $wgUser, $token, $params );

		$r = array( 'result' => 'Success' );
		$this->getResult()->addValue( null, $this->getModuleName(), $r );
	}

	/**
	 * Inserts (or Updates, where appropriate) the aggregate page rating
	 * 
	 * @param $pageId Integer: Page Id
	 * @param $ratingId Integer: Rating Id
	 * @param $updateAddition Integer: Difference between user's last rating (if applicable)
	 * @param $thisRating Integer|Boolean: Value of the Rating
	 * @param $lastRating Integer|Boolean: Value of the last Rating
	 */
	private function insertPageRating( $pageId, $ratingId, $updateAddition, $thisRating, $lastRating ) {
		$dbw = wfGetDB( DB_MASTER );

		// 0 == No change in rating count
		// 1 == No rating last time (or new rating), and now there is
		// -1 == Rating last time, but abstained this time
		$countChange = 0;
		if ( $lastRating === false || $lastRating === 0 ) {
			if ( $thisRating === 0 ) {
				$countChange = 0;
			} else {
				$countChange = 1;
			}
		} else { // Last rating was > 0
			if ( $thisRating === 0 ) {
				$countChange = -1;
			} else {
				$countChange = 0;
			}
		}

		$dbw->insert(
			'article_feedback_pages',
			 array(
				'aap_page_id' => $pageId,
				'aap_total' => 0,
				'aap_count' => 0,
				'aap_rating_id' => $ratingId,
			),
			__METHOD__,
			 array( 'IGNORE' )
		);

		$dbw->update(
			'article_feedback_pages',
			array(
				'aap_total = aap_total + ' . $updateAddition,
				'aap_count = aap_count + ' . $countChange,
			),
			array(
				'aap_page_id' => $pageId,
				'aap_rating_id' => $ratingId,
			),
			__METHOD__
		);
	}

	/**
	 * Inserts (or Updates, where appropriate) the users ratings for a specific revision
	 *
	 * @param $pageId Integer: Page Id
	 * @param $revisionId Integer: Revision Id
	 * @param $user User: Current User object
	 * @param $token Array: Token if necessary
	 * @param $ratingId Integer: Rating Id
	 * @param $ratingValue Integer: Value of the Rating
	 * @param $bucket Integer: Which rating widget was the user shown
	 */
	private function insertUserRatings( $pageId, $revisionId, $user, $token, $ratingId, $ratingValue, $bucket ) {
		$dbw = wfGetDB( DB_MASTER );

		$timestamp = $dbw->timestamp();

		$dbw->insert(
			'article_feedback',
			array(
				'aa_page_id' => $pageId,
				'aa_user_id' => $user->getId(),
				'aa_user_text' => $user->getName(),
				'aa_revision' => $revisionId,
				'aa_timestamp' => $timestamp,
				'aa_rating_id' => $ratingId,
				'aa_rating_value' => $ratingValue,
				'aa_design_bucket' => $bucket,
				'aa_user_anon_token' => $token
			),
			__METHOD__,
			 array( 'IGNORE' )
		);

		if ( !$dbw->affectedRows() ) {
			$dbw->update(
				'article_feedback',
				array(
					'aa_timestamp' => $timestamp,
					'aa_rating_value' => $ratingValue,
				),
				array(
					'aa_page_id' => $pageId,
					'aa_user_text' => $user->getName(),
					'aa_revision' => $revisionId,
					'aa_rating_id' => $ratingId,
					'aa_user_anon_token' => $token
				),
				__METHOD__
			);
		}
	}

	/**
	 * Inserts or updates properties for a specific rating
	 * @param $revisionId int Revision ID
	 * @param $user User object
	 * @param $token string Anon token or empty string
	 * @param $params array Request parameters
	 */
	private function insertProperties( $revisionId, $user, $token, $params ) {
		// Expertise is given as a list of one or more tags, such as profession, hobby, etc.
		$this->insertProperty( $revisionId, $user, $token, 'expertise', $params['expertise'] );
		// Capture edit counts as of right now for the past 1, 3 and 6 months as well as all time
		// - These time distances match the default configuration for the ClickTracking extension
		if ( $user->isLoggedIn() ) {
			$this->insertProperty(
				$revisionId, $user, $token, 'contribs-lifetime', (integer) $user->getEditCount()
			);
			// Take advantage of the UserDailyContribs extension if it's present
			if ( function_exists( 'getUserEditCountSince' ) ) {
				$now = time();
				$this->insertProperty(
					$revisionId, $user, $token, 'contribs-6-months',
					getUserEditCountSince( $now - ( 60 * 60 * 24 * 365 / 2 ) )
				);
				$this->insertProperty(
					$revisionId, $user, $token, 'contribs-3-months',
					getUserEditCountSince( $now - ( 60 * 60 * 24 * 365 / 4 ) )
				);
				$this->insertProperty(
					$revisionId, $user, $token, 'contribs-1-month',
					getUserEditCountSince( $now - ( 60 * 60 * 24 * 30 ) )
				);
			}
		}
	}

	/**
	 * Inserts or updates a specific property for a specific rating
	 * @param $revisionId int Revision ID
	 * @param $user User object
	 * @param $token string Anon token or empty string
	 * @param $key string Property key
	 * @param $value int Property value
	 */
	private function insertProperty( $revisionId, $user, $token, $key, $value ) {
		$dbw = wfGetDB( DB_MASTER );
		
		$dbw->insert( 'article_feedback_properties', array(
				'afp_revision' => $revisionId,
				'afp_user_text' => $user->getName(),
				'afp_user_anon_token' => $token,
				'afp_key' => $key,
				'afp_value' => is_int( $value ) ? $value : null,
				'afp_value_text' => !is_int( $value ) ? strval( $value ) : null,
			),
			__METHOD__,
			array( 'IGNORE' )
		);
		
		if ( !$dbw->affectedRows() ) {
			$dbw->update( 'article_feedback_properties',
				array( 
					'afp_value' => is_int( $value ) ? $value : null,
					'afp_value_text' => !is_int( $value ) ? strval( $value ) : null,
				),
				array(
					'afp_revision' => $revisionId,
					'afp_user_text' => $user->getName(),
					'afp_user_anon_token' => $token,
					'afp_key' => $key,
				), __METHOD__
			);
		}
	}

	public function getAllowedParams() {
		global $wgArticleFeedbackRatings;
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
				ApiBase::PARAM_MIN => 1
			),
			'expertise' => array(
				ApiBase::PARAM_TYPE => 'string',
			),
		);

		foreach( $wgArticleFeedbackRatings as $rating ) {
			$ret["r{$rating}"] = array(
				ApiBase::PARAM_TYPE => 'limit',
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_DFLT => 0,
				ApiBase::PARAM_MIN => 0,
				ApiBase::PARAM_MAX => 5,
				ApiBase::PARAM_MAX2 => 5,
			);
		}
		return $ret;
	}

	public function getParamDescription() {
		global $wgArticleFeedbackRatings;
		$ret = array(
			'pageid' => 'Page ID to submit feedback for',
			'revid' => 'Revision ID to submit feedback for',
			'anontoken' => 'Token for anonymous users',
			'bucket' => 'Which rating widget was shown to the user',
			'expertise' => 'What kinds of expertise does the user claim to have',
		);
		foreach( $wgArticleFeedbackRatings as $rating ) {
		        $ret["r{$rating}"] = "Rating {$rating}";
		}
		return $ret;
	}

	public function getDescription() {
		return array(
			'Submit article feedbacks'
		);
	}

	public function mustBePosted() {
		return true;
	}

	public function isWriteMode() {
		return true;
	}

	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
			array( 'missingparam', 'anontoken' ),
			array( 'code' => 'invalidtoken', 'info' => 'The anontoken is not 32 characters' ),
		) );
	}

	protected function getExamples() {
		return array(
			'api.php?action=articlefeedback'
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
}