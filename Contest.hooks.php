<?php

/**
 * Static class for hooks handled by the Contest extension.
 *
 * @since 0.1
 *
 * @file Contest.hooks.php
 * @ingroup Contest
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class ContestHooks {
	
	/**
	 * Schema update to set up the needed database tables.
	 *
	 * @since 0.1
	 *
	 * @param DatabaseUpdater $updater
	 *
	 * @return true
	 */
	public static function onSchemaUpdate( /* DatabaseUpdater */ $updater = null ) {
		global $wgDBtype;
		
		$updater->addExtensionUpdate( array(
			'addTable',
			'contests',
			dirname( __FILE__ ) . '/Contest.sql',
			true
		) );
		
		$updater->addExtensionUpdate( array(
			'addField',
			'contests',
			'contest_signup_email',
			dirname( __FILE__ ) . '/sql/AddContestEmailFields.sql',
			true
		) );

		return true;
	}
	
	/**
	 * Hook to add PHPUnit test cases.
	 * 
	 * @since 0.1
	 * 
	 * @param array $files
	 * 
	 * @return true
	 */
	public static function registerUnitTests( array &$files ) {
		$testDir = dirname( __FILE__ ) . '/test/';
		
		$files[] = $testDir . 'ContestValidationTests.php';
		$files[] = $testDir . 'ContestParseTests.php';
		
		return true;
	}
	
	/**
	 * Called when changing user email address.
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/UserSetEmail
	 * 
	 * Checks if there are any active contests in which the user is participating,
	 * and if so, updates the email there as well.
	 * 
	 * @since 0.1
	 * 
	 * @param User $user
	 * @param string $email
	 * 
	 * @return true
	 */
	public static function onUserSetEmail( User $user, &$email ) {
		$dbr = wfGetDB( DB_SLAVE );
		
		$contestants = $dbr->select(
			array( 'contest_contestants', 'contests' ),
			array( 'contestant_id' ),
			array( 'contest_status' => Contest::STATUS_ACTIVE ),
			'',
			array(),
			array( 'contests' => array( 'INNER JOIN', array( 'contest_id=contestant_contest_id' ) ) )
		);
		
		$contestantIds = array();
		
		foreach ( $contestants as $contestant ) {
			$contestantIds[] = $contestant->contestant_id;
		}
		
		if ( count( $contestantIds ) > 0 ) {
			ContestContestant::s()->update(
				array( 'email' => $email ),
				array( 'id' => $contestantIds )
			);
		}
		
		return true;
	}
	
}
