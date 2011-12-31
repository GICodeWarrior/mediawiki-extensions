<?php

/**
 * Action to add an log entry
 */
class ApiServerAdminLogEntry extends ApiBase {

	/**
	 * Evaluates the parameters, performs the requested query, and sets up
	 * the result. Concrete implementations of ApiBase must override this
	 * method to provide whatever functionality their module offers.
	 * Implementations must not produce any output on their own and are not
	 * expected to handle any errors.
	 *
	 * The execute() method will be invoked directly by ApiMain immediately
	 * before the result of the module is output. Aside from the
	 * constructor, implementations should assume that no other methods
	 * will be called externally on the module before the result is
	 * processed.
	 *
	 * The result data should be stored in the ApiResult object available
	 * through getResult().
	 */
	public function execute() {
		$channel = ServerAdminLogChannel::newFromCode( $this->getParameter( 'channel' ) );

		if ( $channel === null ) {
			$this->dieUsage( "Invalid channel '{$this->getParameter( 'channel' )}'", 'invalidchannel' );
		}

		ServerAdminLogEntry::create(
			$channel,
			$this->getUser(),
			$this->getParameter( 'message' )
		);

		$this->getResult()->addValue(
			null, $this->getModuleName(), array( 'result' => 'Success' ) );
	}

	/**
	 * Parameters
	 *
	 * @return array
	 */
	public function getAllowedParams() {
		return array(
			'channel' => array(
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_TYPE => 'string',
			),
			'message' => array(
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_TYPE => 'string',
			),
		);
	}

	/**
	 * Description
	 *
	 * @return array
	 */
	public function getParamDescription() {
		return array(
			'channel' => 'Channel to post the log entry to. Use the code found in the URL for the channel.',
			'message' => 'Contents of the log entry',
		);
	}

	/**
	 * Description
	 *
	 * @return string
	 */
	public function getDescription() {
		return 'Add log entries to the Server Admin Log';
	}

	/**
	 * Errors!
	 *
	 * @return array
	 */
	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
				array( 'code' => 'invalidchannel',
						'info' => 'Invalid channel given' ),
		) );
	}


	/**
	 * It writes so it needs a POST
	 *
	 * @return bool
	 */
	public function mustBePosted() {
		return true;
	}

	/**
	 * It writes! Yay!
	 *
	 * @return bool
	 */
	public function isWriteMode() {
		return true;
	}

	/**
	 * Returns a string that identifies the version of the extending class.
	 * Typically includes the class name, the svn revision, timestamp, and
	 * last author. Usually done with SVN's Id keyword
	 * @return string
	 */
	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
}
