<?php

class ApiQueryArchiveFeed extends ApiQueryBase {
	function __construct ( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'arl' );
	}
	
	public function execute ( ) {
		$params = $this->extractRequestParams();
		
		$this->addTables( 'el_archive_queue' );
		$this->addFields( '*' );
		$this->addWhereRange( 'queue_id', $params['dir'], $params['start'], $params['end'] );
		$this->addOption( 'LIMIT', $params['limit'] + 1 );
		
		$res = $this->select( __METHOD__ );
		
		$val = array( );
		$count = 0;
		$result = $this->getResult();
		
		foreach ( $res as $row ) {
			//much of this is stolen from ApiQueryRecentChanges
			if ( ++ $count > $params['limit'] ) {
				$this->setContinueEnumParameter( 'start', $row->queue_id );
				break;
			}
			
			$val['feed_id'] = $row->queue_id;
			$val['time'] = $row->insertion_time;
            $val['page_id'] = $row->page_id;
            $val['url'] = $row->url;

			$fit = $result->addValue( array( 'query', $this->getModuleName() ), null, $val );
			
			if ( !$fit ) {
				$this->setContinueEnumParameter( 'start', $row->queue_id );
				break;
			}
		}
        
		$result = $result->setIndexedTagName_internal( array( 'query', $this->getModuleName() ), 'al' );
	}
	
	function getVersion() {
		return __CLASS__;
	}
	
	function getAllowedParams() {
		return array(
			'limit' => array(
				ApiBase::PARAM_DFLT => 10,
				ApiBase::PARAM_TYPE => 'limit',
				ApiBase::PARAM_MIN => 1,
				ApiBase::PARAM_MAX => ApiBase::LIMIT_BIG1,
				ApiBase::PARAM_MAX2 => ApiBase::LIMIT_BIG2
			),
			'start' => array(
				ApiBase::PARAM_TYPE => 'integer'
			),
			'end' => array(
				ApiBase::PARAM_TYPE => 'integer'
			),
			'dir' => array(
				ApiBase::PARAM_DFLT => 'older',
				ApiBase::PARAM_TYPE => array(
					'newer',
					'older'
				)
			)
		);
	}
}