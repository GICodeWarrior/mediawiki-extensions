<?php 

class ApiUserDailyContribs extends ApiBase {

	
	public function execute() {
	 $params = $this->extractRequestParams();
	 $result = $this->getResult();

	 $userName = $params['user'];
	 $days = $params['daysAgo'];	
	 $user = User::newFromName($userName);
	 $now = time();
	 $result->addValue( array( 'query', $this->getModuleName() ),
				 'totalEdits', 
	 			($user->getEditCount() == NULL)?0:$user->getEditCount() );
	 $result->addValue( array( 'query', $this->getModuleName() ),
				'registration', $user->getRegistration() );
	 $result->addValue( array( 'query', $this->getModuleName() ),
				'timeFrameEdits', getUserEditCountSince( $now - ($days * 60 *60 *24)  ));
	 
	}
	 
	 public function getAllowedParams() {
		return array(
			'user' => null,
			'daysAgo' => null,
		);
	 }
	 
	public function getParamDescription() {
		return array(
			'user' => 'Username to query',
			'daysAgo' => 'Number of edits since this many days ago',
		);
	}

	public function getDescription() {
		return 'Get the total number of user edits, time of registration, and edits in a given timeframe';
	}

	protected function getExamples() {
		return 'api.php?action=userdailycontribs&user=WikiSysop&daysAgo=5';
	}

	public function getVersion() {
		return __CLASS__ . ': $Id: ApiUserDailyContrib.php 1 $';
	}
	 //2009-05-01-18-35-35
	 //YYYY-MM-DD-HH-MM-SS
	 
	}