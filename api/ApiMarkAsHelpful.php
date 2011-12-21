<?php

class ApiMarkAsHelpful extends ApiBase {

	public function execute() {
		global $wgUser;

		if ( $wgUser->isBlocked( false ) ) {
			$this->dieUsageMsg( array( 'blockedtext' ) );
		}

		$params = $this->extractRequestParams();

		// Gives other extension the last chance to speicfy mark as helpful permission rules
		if ( !wfRunHooks( 'onMarkItemAsHelpful', array( $params['mahaction'], $params['type'], $params['item'], $wgUser ) ) ) {
			$this->dieUsage( "You don't have permission to do that", 'permission-denied' );
		}

		$error = false;
		
		switch ( $params['mahaction'] ) {
			case 'mark':
				$item = new MarkAsHelpfulItem();
				$item->loadFromRequest( $params );
				$item->mark();
			break;

			case 'unmark':
				$item = new MarkAsHelpfulItem();
				
				if( $wgUser->isAnon() ) {
					$status = $item->loadFromDatabase( array(
						'mah_type' => $params['type'],
						'mah_item' => $params['item'],
						'mah_user_ip' => $wgUser->getName()
					) );
				} else {
					$status = $item->loadFromDatabase( array(
						'mah_type' => $params['type'],
						'mah_item' => $params['item'],
						'mah_user_id' => $wgUser->getId()
					) );
				}
				if ( $status ) {
					$item->unmark( $wgUser );
				}
				else {
					$error = wfMessage( 'mah-action-error' )->escaped();
				}
			break;

			default:
				throw new MWApiMarkAsHelpfulInvalidActionException( "Action {$params['mbaction']} not implemented" );
			break;
		}

		if ( $error === false ) {
			$result = array( 'result' => 'success' );
		}
		else {
			$result = array( 'result' => 'error', 'error' => $error );
		}
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
			'mahaction' => array(
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_TYPE => array( 'mark', 'unmark' ),
			),
			'page' => array(
				ApiBase::PARAM_REQUIRED => true,
			),
			'type' => array(
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_TYPE => 'string',
			),
			'item' => array(
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_TYPE => 'integer'
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
		return __CLASS__ . ': $Id$';
	}

	public function getParamDescription() {
		return array(
			'mahaction' => 'the mark or unmark an item as helpful',
			'page' => 'The page which the item to be marked is on',
			'type' => 'The object type that is being marked as helpful',
			'item' => 'The object item that is being marked as helpful',
			'useragent' => 'The User-Agent header of the browser',
			'system' => 'The operating system being used',
			'locale' => 'The locale in use',
			'token' => 'An edit token',
		);
	}

	public function getDescription() {
		return 'Allows users to mark/unmark an object item in the site as helpful';
	}

}

class MWApiMarkAsHelpfulInvalidActionException extends MWException {}