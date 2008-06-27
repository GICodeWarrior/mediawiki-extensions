<?php
if ( ! defined( 'MEDIAWIKI' ) )
	die();

class SpecialAbuseFilter extends SpecialPage {

	var $mSkin;

	function __construct() {
		wfLoadExtensionMessages('AbuseFilter');
		parent::__construct( 'AbuseFilter', 'abusefilter-view' );
	}
	
	function execute( $subpage ) {
		global $wgUser,$wgOut,$wgRequest;

		$this->setHeaders();

		$this->loadParameters( $subpage );
		$wgOut->setPageTitle( wfMsg( 'abusefilter-management' ) );
		$wgOut->setRobotpolicy( "noindex,nofollow" );
		$wgOut->setArticleRelated( false );
		$wgOut->enableClientCache( false );
		
		// Are we allowed?
		if ( count( $errors = $this->getTitle()->getUserPermissionsErrors( 'abusefilter-view', $wgUser, true, array( 'ns-specialprotected' ) ) ) ) {
			// Go away.
			$wgOut->showPermissionsErrorPage( $errors, 'abusefilter-view' );
			return;
		}
		
		$this->mSkin = $wgUser->getSkin();
		
		if ($output = $this->doEdit(  )) {
			$wgOut->addHtml( $output );
		} else {
			// Show list of filters.
			$this->showList();
		}
	}
	
	function doEdit() {
		global $wgRequest, $wgUser;
		
		$filter = $this->mFilter;
		
		$editToken = $wgRequest->getVal( 'wpEditToken' );
		$didEdit = $this->canEdit() && $wgUser->matchEditToken( $editToken, array( 'abusefilter', $filter ) );
		
		if ($didEdit) {
			$dbw = wfGetDB( DB_MASTER );
			$newRow = array();
			
			// Load the toggles which go straight into the DB
			$dbToggles = array( 'enabled', 'hidden' );
			foreach( $dbToggles as $toggle ) {
				$newRow['af_'.$toggle] = $wgRequest->getBool( 'wpFilter'.ucfirst($toggle) );
			}
			
			// Text which can go straight into the DB
			$dbText = array( 'wpFilterDescription' => 'af_public_comments', 'wpFilterRules' => 'af_pattern', 'wpFilterNotes' => 'af_comments' );
			foreach( $dbText as $key => $value ) {
				$newRow[$value] = trim($wgRequest->getText( $key ));
			}
			
			// Last modified details
			$newRow['af_timestamp'] = $dbw->timestamp( wfTimestampNow() );
			$newRow['af_user'] = $wgUser->getId();
			$newRow['af_user_text'] = $wgUser->getName();
			
			// ID
			if ($filter != 'new') {
				$newRow['af_id'] = $filter;
			}
			
			// Actions
			global $wgAbuseFilterAvailableActions;
			$enabledActions = array();
			$deadActions = array();
			$actionsRows = array();
			foreach( $wgAbuseFilterAvailableActions as $action ) {
				// Check if it's set
				$enabled = $wgRequest->getBool( 'wpFilterAction'.ucfirst($action) );
				
				if (!$enabled) {
					$deadActions[] = $action;
				}
				
				if ($enabled) {
					$parameters = array();
					
					if ($action == 'throttle') {
						// Grumble grumble.
						// We need to load the parameters
						$throttleCount = $wgRequest->getIntOrNull( 'wpFilterThrottleCount' );
						$throttlePeriod = $wgRequest->getIntOrNull( 'wpFilterThrottlePeriod' );
						$throttleGroups = explode("\n", trim( $wgRequest->getText( 'wpFilterThrottleGroups' ) ) );
						
						$parameters[0] = $filter; // For now, anyway
						$parameters[1] = "$throttleCount,$throttlePeriod";
						$parameters = array_merge( $parameters, $throttleGroups );
					}
					
					$thisRow = array( 'afa_filter' => $filter, 'afa_consequence' => $action, 'afa_parameters' => implode( "\n", $parameters ) );
					$actionsRows[] = $thisRow;
				}
			}
			
			// Do the update
			
			$dbw->begin();
			$dbw->replace( 'abuse_filter', array( 'af_id' ), $newRow, __METHOD__ );
			$dbw->delete( 'abuse_filter_action', array( 'afa_filter' => $filter, 'afa_consequence' => $deadActions ), __METHOD__ );
			$dbw->replace( 'abuse_filter_action', array( array( 'afa_filter', 'afa_consequence' ) ), $actionsRows, __METHOD__ );
			$dbw->commit();
			
			global $wgOut;
			
			$wgOut->setSubtitle( wfMsg('abusefilter-edit-done-subtitle' ) );
			return wfMsgExt( 'abusefilter-edit-done', array( 'parse' ) );
		} else {
			return $this->buildFilterEditor();
		}
	}
	
	function buildFilterEditor(  ) {
		if (!is_numeric($this->mFilter) && $this->mFilter != 'new') {
			return false;
		}
		
		// Build the edit form
		global $wgOut,$wgLang,$wgUser;
		$sk = $this->mSkin;
		$wgOut->setSubtitle( wfMsg( 'abusefilter-edit-subtitle', $this->mFilter ) );
		
		list ($row, $actions) = $this->loadFilterData();
		
		if (!$row && $this->mFilter !== 'new') {
			return false;
		}
		
		if ($row->af_hidden && !$this->canEdit()) {
			return wfMsg( 'abusefilter-edit-hidden' );
		}
		
		$output = '';
		$fields = array();
		
		$fields['abusefilter-edit-id'] = $this->mFilter == 'new' ? wfMsg( 'abusefilter-edit-new' ) : $this->mFilter;
		$fields['abusefilter-edit-description'] = Xml::input( 'wpFilterDescription', 20, $row->af_public_comments );

		// Hit count display
		$count = (int)$row->af_hit_count;
		$count_display = wfMsgExt( 'abusefilter-hitcount', array( 'parseinline' ), array( $count ) );
		$hitCount = $sk->makeKnownLinkObj( SpecialPage::getTitleFor( 'AbuseLog' ), $count_display, 'wpSearchFilter='.$row->af_id );
		
		$fields['abusefilter-edit-hitcount'] = $hitCount;

		$fields['abusefilter-edit-rules'] = Xml::textarea( 'wpFilterRules', $row->af_pattern . "\n" );
		$fields['abusefilter-edit-notes'] = Xml::textarea( 'wpFilterNotes', $row->af_comments ."\n" );
		
		
		// Build checkboxen
		$checkboxes = array( 'hidden', 'enabled' );
		$flags = '';
		foreach( $checkboxes as $checkboxId ) {
			$message = "abusefilter-edit-$checkboxId";
			$dbField = "af_$checkboxId";
			$postVar = "wpFilter".ucfirst($checkboxId);
			
			$checkbox = Xml::checkLabel( wfMsg( $message ), $postVar, $postVar, $row->$dbField );
			$checkbox = Xml::tags( 'p', null, $checkbox );
			$flags .= $checkbox;
		}
		$fields['abusefilter-edit-flags'] = $flags;
		
		if ($this->mFilter != 'new') {
			// Last modification details
			$fields['abusefilter-edit-lastmod'] = $wgLang->timeanddate( $row->af_timestamp );
			$fields['abusefilter-edit-lastuser'] = $sk->userLink( $row->af_user, $row->af_user_text ) . $sk->userToolLinks( $row->af_user, $row->af_user_text );
		}
		
		$form = Xml::buildForm( $fields );
		$form = Xml::fieldset( wfMsg( 'abusefilter-edit-main' ), $form );
		$form .= Xml::fieldset( wfMsg( 'abusefilter-edit-consequences' ), $this->buildConsequenceEditor( $row, $actions ) );
		
		if ($this->canEdit()) {
			$form .= Xml::submitButton( wfMsg( 'abusefilter-edit-save' ) );
			$form .= Xml::hidden( 'wpEditToken', $wgUser->editToken( array( 'abusefilter', $this->mFilter )) );
		}
		
		$form = Xml::tags( 'form', array( 'action' => $this->getTitle( $this->mFilter )->getFullURL(), 'method' => 'POST' ), $form );
		
		$output .= $form;
		
		return $output;
	}
	
	function buildConsequenceEditor( $row, $actions ) {
		global $wgAbuseFilterAvailableActions;
		$setActions = array();
		foreach( $wgAbuseFilterAvailableActions as $action ) {
			$setActions[$action] = in_array( $action, array_keys( $actions ) );
		}
		
		$output = '';
		
		// Special case: flagging - always on.
		$checkbox = Xml::checkLabel( wfMsg( 'abusefilter-edit-action-flag' ), 'wpFilterActionFlag', 'wpFilterActionFlag', true, array( 'disabled' => '1' ) );
		$output .= Xml::tags( 'p', null, $checkbox );
		
		// Special case: throttling
		$throttleSettings = Xml::checkLabel( wfMsg( 'abusefilter-edit-action-throttle' ), 'wpFilterActionThrottle', 'wpFilterActionThrottle', $setActions['throttle'] );
		$throttleFields = array();
		
		if ($setActions['throttle']) {
			$throttleRate = explode(',',$actions['throttle']['parameters'][0]);
			$throttleCount = $throttleRate[0];
			$throttlePeriod = $throttleRate[1];
			
			$throttleGroups = implode("\n", array_slice($actions['throttle']['parameters'], 1 ) );
		} else {
			$throttleCount = 3;
			$throttlePeriod = 60;
			
			$throttleGroups = "user\n";
		}
		
		$throttleFields['abusefilter-edit-throttle-count'] = Xml::input( 'wpFilterThrottleCount', 20, $throttleCount );
		$throttleFields['abusefilter-edit-throttle-period'] = wfMsgExt( 'abusefilter-edit-throttle-seconds', array( 'parseinline', 'replaceafter' ), array(Xml::input( 'wpFilterThrottlePeriod', 20, $throttlePeriod )  ) );
		$throttleFields['abusefilter-edit-throttle-groups'] = Xml::textarea( 'wpFilterThrottleGroups', $throttleGroups."\n" );
		$throttleSettings .= Xml::buildForm( $throttleFields );
		$output .= Xml::tags( 'p', null, $throttleSettings );
		
		// The remainder are just toggles
		$remainingActions = array_diff( $wgAbuseFilterAvailableActions, array( 'flag', 'throttle' ) );
		
		foreach( $remainingActions as $action ) {
			$message = 'abusefilter-edit-action-'.$action;
			$form_field = 'wpFilterAction' . ucfirst($action);
			$status = $setActions[$action];
			
			$thisAction = Xml::checkLabel( wfMsg( $message ), $form_field, $form_field, $status );
			$thisAction = Xml::tags( 'p', null, $thisAction );
			
			$output .= $thisAction;
		}
		
		return $output;
	}
	
	function loadFilterData() {
		$id = $this->mFilter;
		
		$dbr = wfGetDB( DB_SLAVE );
		
		// Load the main row
		$row = $dbr->selectRow( 'abuse_filter', '*', array( 'af_id' => $id ), __METHOD__ );
		
		// Load the actions
		$actions = array();
		$res = $dbr->select( 'abuse_filter_action', '*', array( 'afa_filter' => $id), __METHOD__ );
		while ( $actionRow = $dbr->fetchObject( $res ) ) {
			$thisAction = array();
			$thisAction['action'] = $actionRow->afa_consequence;
			$thisAction['parameters'] = explode( "\n", $actionRow->afa_parameters );
			
			$actions[$actionRow->afa_consequence] = $thisAction;
		}
		
		return array( $row, $actions );
	}
	
	function loadParameters( $subpage ) {
		global $wgRequest,$wgUser;
		
		$filter = $subpage;
		
		if (!is_numeric($filter) && $subpage != 'new') {
			$filter = $wgRequest->getIntOrNull( 'wpFilter' );
			
			if ($filter === null && $filter != 'new') {
				return;
			}
		}
		$this->mFilter = $filter;
	}
	
	function canEdit() {
		global $wgUser;
		static $canEdit = 'unset';
		
		if ($canEdit == 'unset') {
			$canEdit = !count( $errors = $this->getTitle()->getUserPermissionsErrors( 'abusefilter-modify', $wgUser, true, array( 'ns-specialprotected' ) ) );
		}
		
		return $canEdit;
	}
	
	function showList() {
		global $wgOut,$wgUser;
		
		$sk = $this->mSkin = $wgUser->getSkin();
		
		$output = '';
		
		$output .= Xml::element( 'h2', null, wfMsgExt( 'abusefilter-list', array( 'parseinline' ) ) );
		
		// We shouldn't have more than 100 filters, so don't bother paging.
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select( array('abuse_filter', 'abuse_filter_action'), 'abuse_filter.*,group_concat(afa_consequence) AS consequences', array(  ), __METHOD__, array( 'LIMIT' => 100, 'GROUP BY' => 'af_id' ),
			array( 'abuse_filter_action' => array('LEFT OUTER JOIN', 'afa_filter=af_id' ) ) );
		$list = '';
		$editLabel = $this->canEdit() ? 'abusefilter-list-edit' : 'abusefilter-list-details';
		
		// Build in a table
		$headers = array( 'abusefilter-list-id', 'abusefilter-list-public', 'abusefilter-list-consequences', 'abusefilter-list-status', 'abusefilter-list-visibility', 'abusefilter-list-hitcount', $editLabel );
		$header_row = '';
		foreach( $headers as $header ) {
			$header_row .= Xml::element( 'th', null, wfMsgExt( $header, array( 'parseinline' ) ) );
		}
		
		$list .= Xml::tags( 'tr', null, $header_row );
		
		while ($row = $dbr->fetchObject( $res ) ) {
			$list .= $this->shortFormatFilter( $row );
		}
		
		$output .= Xml::tags( 'table', array( 'class' => 'wikitable' ), Xml::tags( 'tbody', null, $list ) );
		
		if ($this->canEdit()) {
			$output .= $sk->makeKnownLinkObj( $this->getTitle( 'new' ), wfMsg( 'abusefilter-list-new' ) );
		}
		
		$wgOut->addHTML( $output );
	}
	
	function shortFormatFilter ( $row ) {
		global $wgOut;
		
		$sk = $this->mSkin;
		
		$editLabel = $this->canEdit() ? 'abusefilter-list-edit' : 'abusefilter-list-details';
		
		// Build a table row
		$trow = '';
		
		$status = $row->af_enabled ? 'abusefilter-enabled' : 'abusefilter-disabled';
		$status = wfMsgExt( $status, array( 'parseinline' ) );
		
		$visibility = $row->af_hidden ? 'abusefilter-hidden' : 'abusefilter-unhidden';
		$visibility = wfMsgExt( $visibility, array( 'parseinline' ) );
		
		// Hit count
		$count = $row->af_hit_count;
		$count_display = wfMsgExt( 'abusefilter-hitcount', array( 'parseinline' ), array( $count ) );
		$hitCount = $sk->makeKnownLinkObj( SpecialPage::getTitleFor( 'AbuseLog' ), $count_display, 'wpSearchFilter='.$row->af_id );
		
		$editLink = $sk->makeKnownLinkObj( $this->getTitle( $row->af_id ), wfMsg( $editLabel ) );
		
		$consequences = wfEscapeWikitext($row->consequences);
		
		$values = array( $row->af_id, $wgOut->parse($row->af_public_comments), $consequences, $status, $visibility, $hitCount, $editLink );
		
		foreach( $values as $value ) {
			$trow .= Xml::tags( 'td', null, $value );
		}
		
		$trow = Xml::tags( 'tr', null, $trow );
		
		return $trow;
	}
}