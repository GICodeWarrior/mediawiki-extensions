<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * View interpretation results of polls
 */
class qp_InterpResultView extends qp_AbstractView {

	static function newFromBaseView( $baseView ) {
		return new self( $baseView->parser, $baseView->ppframe );
	}

	function isCompatibleController( $ctrl ) {
		return $ctrl instanceof qp_InterpResult;
	}

	/**
	 * Add interpretation results to tagarray of poll view
	 */
	function showInterpResults( &$tagarray ) {
		$ctrl = $this->ctrl;
		if ( ( $scriptError = $ctrl->error ) != '' ) {
			$tagarray[] = array( '__tag' => 'div', 'class' => 'interp_error', qp_Setup::specialchars( $scriptError ) );
		}
		# output long result, when permitted and available
		if ( qp_Setup::$show_interpretation['long'] &&
				( $answer = $ctrl->long ) !== '' ) {
			$tagarray[] = array( '__tag' => 'div', 'class' => 'interp_answer', qp_Setup::specialchars( $answer ) );
		}
		# output short result, when permitted and available
		if ( qp_Setup::$show_interpretation['short'] &&
				( $answer = $ctrl->short ) !== '' ) {
			$tagarray[] = array( '__tag' => 'div', 'class' => 'interp_answer', qp_Setup::specialchars( $answer ) );
		}
		if ( qp_Setup::$show_interpretation['structured'] &&
				( $answer = $ctrl->structured ) !== '' ) {
			$tagarray[] = array( '__tag' => 'div', 'class' => 'interp_answer', $this->renderStructuredAnswer() );
		}
	}

	/**
	 * todo: how can this be related to structured answer in XLS data export?
	 */
	function renderStructuredAnswer() {
		return 'todo: implement';
	}

} /* end of qp_InterpResultView class */
