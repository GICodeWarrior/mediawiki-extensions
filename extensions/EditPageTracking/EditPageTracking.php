<?php
/**
 * EditPageTracking extension
 * Allows tracking when users first click on "edit page"
 */

$wgExtensionCredits['other'][] = array(
	'author' => array( 'Andrew Garrett' ),
	'descriptionmsg' => 'editpagetracking-desc',
	'name' => 'EditPageTracking',
	'url' => 'http://www.mediawiki.org/wiki/Extension:EditPageTracking',
	'version' => '0.1',
	'path' => __FILE__,
);

$wgExtensionMessagesFiles['EditPageTracking'] = dirname(__FILE__).'/EditPageTracking.i18n.php';

$wgHooks['LoadExtensionSchemaUpdates'][] = 'wfEditPageTrackingSchema';
$wgHooks['EditPage::showEditForm:initial'][] = 'wfEditPageTrackingEditForm';
$wgHooks['UserLoadDefaults'][] = 'wfEditPageTrackingResetUser';

/** Configuration **/

/** The registration cutoff for recording this data **/
$wgEditPageTrackingRegistrationCutoff = null;

/**
 * Applies EditPageTracking schema updates.
 */
function wfEditPageTrackingSchema( $updater = null ) {
	$updater->addExtensionUpdate( array( 'addTable', 'edit_page_tracking',
		dirname(__FILE__).'/edit_page_tracking.sql', true ) );
		
	return true;
}

/**
 * Monitors edit page usage
 */
function wfEditPageTrackingEditForm( $editPage ) {
	global $wgUser;
	
	// Anonymous users
	if ( $wgUser->isAnon() ) {
		return true;
	}
	
	if ( wfGetFirstEditPageUsage( $wgUser ) ) {
		// Already stored.
		return true;
	}
	global $wgEditPageTrackingRegistrationCutoff;
	
	if ( $wgEditPageTrackingRegistrationCutoff &&
		$wgUser->getRegistration() < $wgEditPageTrackingRegistrationCutoff )
	{
		// User registered before the cutoff
		return true;
	}
	
	// Record it
	$dbw = wfGetDB( DB_MASTER );
	
	$title = $editPage->getArticle()->getTitle();
	
	$row = array(
		'ept_user' => $wgUser->getId(),
		'ept_namespace' => $title->getNamespace(),
		'ept_title' => $title->getDBkey(),
		'ept_timestamp' => $dbw->timestamp( wfTimestampNow() ),
	);
	
	$dbw->insert( 'edit_page_tracking', $row, __METHOD__ );
	
	$wgUser->mFirstEditPage = wfTimestampNow();
	$wgUser->saveToCache();
	
	return true;
}

/** 
 * Gets the first time a user opened an edit page
 * @param $user The User to check.
 * @return The timestamp of the first time the user opened an edit page.
 * false for an anonymous user, null for a user who has never opened an edit page.
 */
function wfGetFirstEditPageUsage( $user ) {
	if ( isset($user->mFirstEditPage) ) {
		return $user->mFirstEditPage;
	}
	
	if ( $user->isAnon() ) {
		return false;
	}
	
	global $wgMemc;
	$cacheKey = wfMemcKey( 'first-edit-page', $user->getId() );
	$cacheVal = $wgMemc->get($cacheKey);
	
	if ( $cacheVal !== false ) {
		$user->mFirstEditPage = $cacheVal;
		return $cacheVal;
	}
	
	$dbr = wfGetDB( DB_SLAVE );
	
	$res = $dbr->select( 'edit_page_tracking', 'ept_timestamp',
		array( 'ept_user' => $user->getID() ),
		__METHOD__, array( 'order by' => 'ept_timestamp desc' ) );
		
	if ( $dbr->numRows($res) == 0 ) {
		$user->mFirstEditPage = null;
		$wgMemc->set( $cacheKey, null, 86400 );
		return null;
	}
	
	$row = reset($res);
	
	$user->mFirstEditPage = wfTimestamp( TS_MW, $row->ept_timestamp );
	$wgMemc->set($cacheKey, $user->mFirstEditPage, 86400);
	
	return $user->mFirstEditPage;
}

/**
 * Handler for UserLoadDefaults
 * Sets mFirstEditPage to false
 * @param $user The User object
 * @param $name The User's name
 */
function wfEditPageTrackingResetUser( $user, $name ) {
	$user->mFirstEditPage = false;
	return true;
}
