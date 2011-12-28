<?php

class ApiGetMarkAsHelpfulItem extends ApiBase {

	public function execute() {
		global $wgUser;

		$params = $this->extractRequestParams();

		// check if current user has permission to mark this item,
		$isAbleToMark = true; 

		wfRunHooks( 'onMarkItemAsHelpful', array( 'mark', $params['type'], $params['item'], $wgUser, &$isAbleToMark ) );

		$HelpfulUserList = MarkAsHelpfulItem::getMarkAsHelpfulList( $params['type'], $params['item'] );

		if ( $params['prop'] == 'metadata') {
			$data = $HelpfulUserList;
			$format = 'metadata';
		} else {
			$data = MarkAsHelpfulUtil::getMarkAsHelpfulTemplate(
				$wgUser, $isAbleToMark, $HelpfulUserList, $params['type'],
				$params['item']
			);
			$format = 'formatted';
		}

		$result = array( 'result' => 'success', $format => $data );
		$this->getResult()->addValue( null, $this->getModuleName(), $result );
	}

	public function getAllowedParams() {
		global $wgMarkAsHelpfulType;

		return array(
			'type' => array(
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_TYPE => $wgMarkAsHelpfulType,
			),
			'item' => array(
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_TYPE => 'integer'
			),
			'prop' => array(
				ApiBase::PARAM_TYPE => array( 'metadata', 'formatted' ),
			),
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}

	public function getParamDescription() {
		return array(
			'type' => 'The object type that is being marked as helpful',
			'item' => 'The object item that is being marked as helpful',
			'prop' => 'Which property to get',
		);
	}

	public function getDescription() {
		return 'Get a list of all helpful status for an object item';
	}

}

class MWApiGetMarkAsHelpfulItemInvalidActionException extends MWException {}

