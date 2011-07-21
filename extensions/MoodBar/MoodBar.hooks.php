<?php

class MoodBarHooks {
	/**
	 * Adds MoodBar JS to the output if appropriate.
	 */
	public static function onPageDisplay( &$output, &$skin ) {
		if ( self::shouldShowMoodbar( $output, $skin ) ) {
			$output->addModules( array( 'ext.moodBar.init', 'ext.moodBar.core' ) );
		}
		
		return true;
	}
	
	/**
	 * Determines whether or not we should show the MoodBar.
	 */
	public static function shouldShowMoodbar( &$output, &$skin ) {
		// Front-end appends to header elements, which have different
		// locations and IDs in every skin.
		// Untill there is some kind of central registry of element-ids
		// that skins implement, or a fixed name for each of them, just
		// show it in Vector for now.
		if ( $skin->getSkinName() !== 'vector' ) {
			return false;
		}
		$user = $output->getUser();
		
		if ( $user->isAnon() ) {
			return false;
		}
		
		// Only show MoodBar for users registered after a certain time
		global $wgMoodBarCutoffTime;
		if ( $wgMoodBarCutoffTime &&
			$user->getRegistration() < $wgMoodBarCutoffTime )
		{
			return false;
		}
		
		if ( class_exists('EditPageTracking') ) {
			return ((bool)EditPageTracking::getFirstEditPage($user));
		}
		
		return true;
	}
	
	/**
	 * ResourceLoaderGetConfigVars hook
	 */
	public static function resourceLoaderGetConfigVars( &$vars ) {
		global $wgUser;
		$vars['mbConfig'] = array(
			'validTypes' => MBFeedbackItem::getValidTypes(),
			'userBuckets' => MoodBarHooks::getUserBuckets( $wgUser ),
		);
		return true;
	}
	
	/**
	 * Runs MoodBar schema updates
	 */
	public static function onLoadExtensionSchemaUpdates( $updater = null ) {
		$updater->addExtensionUpdate( array( 'addTable', 'moodbar_feedback',
			dirname(__FILE__).'/sql/MoodBar.sql', true ) );
			
		$updater->addExtensionUpdate( array( 'addField', 'moodbar_feedback',
			'mbf_user_editcount', dirname(__FILE__).'/sql/mbf_user_editcount.sql', true )
		);
			
		return true;
	}
	
	/**
	 * Gets the MoodBar testing bucket that a user is in.
	 * @param $user The user to check
	 * @return array of bucket names
	 */
	public static function getUserBuckets( $user ) {
		$id = $user->getID();
		$buckets = array();
		
		// No show-time bucketing yet. This method is a stub.
		
		sort($buckets);
		return $buckets;
	}
}
