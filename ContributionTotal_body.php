<?php

class ContributionTotal extends SpecialPage {
	function __construct() {
		parent::__construct( 'ContributionTotal' );
	}

	function execute( $par ) {
		global $wgRequest, $wgOut;

		$this->setHeaders();

		# Get request data
		$fundraiser = $wgRequest->getText( 'fundraiser' );
		$action = $wgRequest->getText( 'action' );
		$fudgeFactor = $wgRequest->getInt( 'fudgefactor' );

		$output = efContributionReportingTotal( $fundraiser, $fudgeFactor );

		header( 'Cache-Control: max-age=300,s-maxage=300' );
		if ( $action == 'raw' ) {
			$wgOut->disable();
			echo $output;
		} else {
			$wgOut->setRobotpolicy( 'noindex,nofollow' );
			$wgOut->addHTML( $output );
		}
	}
}
