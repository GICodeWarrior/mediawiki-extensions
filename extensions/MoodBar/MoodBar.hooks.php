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
		
		$buckets = self::getUserBuckets( $user );
		
		if ( in_array( 'moodbar-always', $buckets ) ) {
			return true;
		} elseif( in_array( 'no-moodbar', $buckets ) ) {
			return false;
		} elseif ( in_array( 'moodbar-on-submit', $buckets ) ) {
			// MoodBar is shown when a user has submitted an edit
			return ( $user->getEditCount() > 0 );
		} elseif ( in_array( 'moodbar-on-edit', $buckets ) &&
			class_exists('EditPageTracking') )
		{
			// MoodBar is shown when a user has previously loaded the edit form
			return ((bool)EditPageTracking::getFirstEditPage($user));
		}
		
		return false;
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
		
		// 60 is divisible by 2, 3, 4, 5, 6 and 10
		$bucketId = $id % 60;
		$buckets = array();
		
		if ( $bucketId < 15 ) {
			$buckets[] = 'no-moodbar';
		} elseif ( $bucketId < 30 ) {
			$buckets[] = 'moodbar-on-edit';
		} elseif ( $bucketId < 45 ) {
			$buckets[] = 'moodbar-on-submit';
		} elseif ( $bucektId < 60 ) {
			$buckets[] = 'moodbar-always';
		}
		
		sort($buckets);
		return $buckets;
	}
}
