<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * Installs/updates DB schema for the people who do not have shell access
 * (not being able to run maintenance scripts)
 */
class qp_WebInstall extends qp_SpecialPage {

	private $allowed_groups = array( 'sysop', 'bureaucrat' );

	public function __construct() {
		parent::__construct( 'QPollWebInstall', 'read' );
	}

	public function execute( $par ) {
		global $wgOut, $wgUser;

		# only sysops and bureaucrats can update the DB
		if ( count( array_intersect( $this->allowed_groups, $wgUser->getEffectiveGroups() ) ) == 0 ) {
			$wgOut->addHTML( 'You have to be a member of the following group(s) to perform web install:' . implode( ', ', $this->allowed_groups ) );
			return;
		}
		# display update result
		$wgOut->addHTML( qp_SchemaUpdater::checkAndUpdate() );
	}

} /* end of qp_WebInstall class */
