<?php

/**
 * API module to get special translations stored by the Live Translate extension.
 *
 * @since 0.1
 *
 * @file ApiLiveTranslate.php
 * @ingroup LiveTranslate
 *
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiLiveTranslate extends ApiBase {
	
	public function __construct( $main, $action ) {
		parent::__construct( $main, $action );
	}
	
	public function execute() {
		
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}		
	
}