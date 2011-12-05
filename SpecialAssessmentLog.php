<?php
/**
 * @todo Document this file
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "not a valid entry point.\n" );
	die( 1 );
}

/**
 * A special page showing various logs related to the assessment extension
 */
class SpecialAssessmentLog extends SpecialPage {

	public function __construct() {
		parent::__construct( 'AssessmentLog' );
	}

	public function execute( $par ) {
        global $wgOut, $wgRequest;

		$entries = AssessmentChangeLog::getLogs();

		$element = Html::element( 'div', array(), print_r( $entries, true) );

		$wgOut->addHTML( $element );
	}
}
