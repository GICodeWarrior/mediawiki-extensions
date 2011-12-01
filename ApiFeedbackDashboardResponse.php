<?php

class ApiFeedbackDashboardResponse extends ApiBase {
	
	public function execute() {
		global $wgRequest, $wgUser, $wgContLang, $wgParser;
		
		if ( $wgUser->isAnon() ) {
			$this->dieUsage( "You don't have permission to do that", 'permission-denied' );
		}
		if ( $wgUser->isBlocked( false ) ) {
			$this->dieUsageMsg( array( 'blockedtext' ) );
		}
		
		$params = $this->extractRequestParams();
	
		//Response Object
		$item = MBFeedbackResponseItem::create( array() );

		$setParams = array();
		foreach( $params as $key => $value ) {
			if ( $item->isValidKey( $key ) ) {
				$setParams[$key] = $value;
			}
		}

		$item->setProperties( $setParams );	
		$item->save();
		
		$commenter = $item->getProperty('feedbackitem')->getProperty('user');
		
		if ( $commenter !== null && $commenter->isAnon() == false ) {
			$talkPage = $commenter->getTalkPage();
			 
			$feedback_link = wfMessage('moodbar-feedback-response-title')->params($wgContLang->getNsText( NS_SPECIAL ) . 
				         ':FeedbackDashboard/' . $item->getProperty('feedback'))->escaped();
			
			$api = new ApiMain( new FauxRequest( array(
				'action' => 'edit',
				'title'  => $talkPage->getFullText(),
				'appendtext' => ( $talkPage->exists() ? "\n\n" : '' ) . 
						$feedback_link . "\n" . 
						'<span id="feedback-dashboard-response-' . $item->getProperty('id') . '"></span>' . "\n\n" . 
						$wgParser->cleanSigInSig($params['response']) . "\n\n~~~~",
				'token'  => $params['token'],
				'summary' => '',
				'notminor' => true,
			), true, array( 'wsEditToken' => $wgRequest->getSessionData( 'wsEditToken' ) ) ), true );
	
			$api->execute();
		}
		
		$result = array( 'result' => 'success' );
		$this->getResult()->addValue( null, $this->getModuleName(), $result );		
	}
	
	public function needsToken() {
		return true;
	}

	public function getTokenSalt() {
		return '';
	}

	public function getAllowedParams() {
		return array(
			'feedback' => array(
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_TYPE => 'integer'
			),
			'response' => array(
				ApiBase::PARAM_REQUIRED => true,
			),
			'anonymize' => array(
				ApiBase::PARAM_TYPE => 'boolean',
			),
			'editmode' => array(
				ApiBase::PARAM_TYPE => 'boolean',
			),
			'useragent' => null,
			'system' => null,
			'locale' => null,
			'token' => null,
		);
	}

	public function mustBePosted() {
		return true;
	}

	public function isWriteMode() {
		return true;
	}

	public function getVersion() {
		return __CLASS__ . ': $Id: ApiMoodBar.php 93113 2011-07-25 21:03:33Z reedy $';
	}

	public function getParamDescription() {
		return array(
			'feedback' => 'The moodbar feedback unique identifier',
			'response' => 'The feedback text',
			'anonymize' => 'Whether to hide user information',
			'editmode' => 'Whether or not the feedback context is in edit mode',
			'useragent' => 'The User-Agent header of the browser',
			'system' => 'The operating system being used',
			'locale' => 'The locale in use',
			'token' => 'An edit token',
		);
	}

	public function getDescription() {
		return 'Allows users to submit response to a feedback about their experiences on the site';
	}
	
}

?>
