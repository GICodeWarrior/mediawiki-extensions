<?php

class ApiQueryMoodBarComments extends ApiQueryBase {
	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'mbc' );
	}
	
	public function execute() {
		global $wgLang;
		$params = $this->extractRequestParams();
		$prop = array_flip( $params['prop'] );
		
		// Build the query
		$this->addTables( array( 'moodbar_feedback', 'user' ) );
		$this->addJoinConds( array( 'user' => array( 'LEFT JOIN', 'user_id=mbf_user_id' ) ) );
		$this->addFields( array( 'user_name', 'mbf_id', 'mbf_type', 'mbf_timestamp', 'mbf_user_id', 'mbf_user_ip',
			'mbf_comment' ) );
		if ( count( $params['type'] ) ) {
			$this->addWhereFld( 'mbf_type', $params['type'] );
		}
		if ( $params['user'] !== null ) {
			$user = User::newFromName( $params['user'] ); // returns false for IPs
			if ( !$user || $user->isAnon() ) {
				$this->addWhereFld( 'mbf_user_id', 0 );
				$this->addWhereFld( 'mbf_user_ip', $params['user'] );
			} else {
				$this->addWhereFld( 'mbf_user_id', $user->getID() );
				$this->addWhere( 'mbf_user_ip IS NULL' );
			}
		}
		
		if ( $params['continue'] !== null ) {
			$this->applyContinue( $params['continue'], $params['dir'] == 'older' );
		}
		
		// Add ORDER BY mbf_timestamp {ASC|DESC}, mbf_id {ASC|DESC}
		$this->addWhereRange( 'mbf_timestamp', $params['dir'], null, null );
		$this->addWhereRange( 'mbf_id', $params['dir'], null, null );
		$this->addOption( 'LIMIT', $params['limit'] + 1 );
		
		$res = $this->select( __METHOD__ );
		$result = $this->getResult();
		$count = 0;
		foreach ( $res as $row ) {
			if ( ++$count > $params['limit'] ) {
				// We've reached the one extra which shows that there are additional rows. Stop here
				$this->setContinueEnumParameter( 'continue', $this->getContinue( $row ) );
				break;
			}
			
			$vals = $this->extractRowInfo( $row, $prop );
			$fit = $result->addValue( array( 'query', $this->getModuleName() ), null, $vals );
			if ( !$fit ) {
				$this->setContinueEnumParameter( 'continue', $this->getContinue( $row ) );
				break;
			}
		}
		$result->setIndexedTagName_internal( array( 'query', $this->getModuleName() ), 'comment' );
	}
	
	protected function getContinue( $row ) {
		$ts = wfTimestamp( TS_MW, $row->mbf_timestamp );
		return "$ts|{$row->mbf_id}";
	}
	
	protected function applyContinue( $continue, $sortDesc ) {
		$vals = explode( '|', $continue, 3 );
		if ( count( $vals ) !== 2 ) {
			// TODO this should be a standard message in ApiBase
			$this->dieUsage( 'Invalid continue param. You should pass the original value returned by the previous query', 'badcontinue' );
		}
		
		$db = $this->getDB();
		$ts = $db->addQuotes( $db->timestamp( $vals[0] ) );
		$id = intval( $vals[1] );
		$op = $sortDesc ? '<' : '>';
		// TODO there should be a standard way to do this in DatabaseBase or ApiQueryBase something
		$this->addWhere( "mbf_timestamp $op $ts OR " .
			"(mbf_timestamp = $ts AND " .
			"mbf_id $op= $id)"
		);
	}
	
	protected function extractRowInfo( $row, $prop ) {
		$r = array();
		if ( isset( $prop['metadata'] ) ) {
			$r += array(
				'id' => intval( $row->mbf_id ),
				'type' => $row->mbf_type,
				'timestamp' => wfTimestamp( TS_ISO_8601, $row->mbf_timestamp ),
				'userid' => intval( $row->mbf_user_id ),
				'username' => $row->mbf_user_ip === null ? $row->user_name : $row->mbf_user_ip,
			);
			ApiResult::setContent( $r, $row->mbf_comment );
		}
		if ( isset( $prop['formatted'] ) ) {
			$r['formatted'] = SpecialMoodBarFeedback::formatListItem( $row );
		}
		return $r;
	}

	public function getAllowedParams() {
		return array(
			'limit' => array(
				ApiBase::PARAM_DFLT => 10,
				ApiBase::PARAM_TYPE => 'limit',
				ApiBase::PARAM_MIN => 1,
				ApiBase::PARAM_MAX => ApiBase::LIMIT_BIG1,
				ApiBase::PARAM_MAX2 => ApiBase::LIMIT_BIG2
			),
			'dir' => array(
				ApiBase::PARAM_DFLT => 'older',
				ApiBase::PARAM_TYPE => array(
					'newer',
					'older'
				)
			),
			'continue' => null,
			'type' => array(
				ApiBase::PARAM_TYPE => MBFeedbackItem::getValidTypes(),
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_DFLT => '', // all
			),
			'user' => array(
				ApiBase::PARAM_TYPE => 'user',
			),
			'prop' => array(
				ApiBase::PARAM_TYPE => array( 'metadata', 'formatted' ),
				ApiBase::PARAM_DFLT => 'metadata',
				ApiBase::PARAM_ISMULTI => true,
			),
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}

	public function getParamDescription() {
		return array(
			'limit' => 'How many comments to return',
			'continue' => 'When more results are available, use this to continue',
			'type' => 'Only return comments of the given type(s). If not set or empty, return all comments',
			'user' => 'Only return comments submitted by the given user',
			'prop' => array( 'Which properties to get:',
				'  metadata  - Comment ID, type, timestamp, user',
				'  formatted - HTML that would be displayed for this comment on Special:MoodBarFeedback',
			),
		);
	}

	public function getDescription() {
		return 'List all feedback comments submitted through the MoodBar extension.';
	}
	
	public function getCacheMode( $params ) {
		return 'public';
	}
}
