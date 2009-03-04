<?php
if ( ! defined( 'MEDIAWIKI' ) )
	die();

class AbuseFilterHooks {

// So far, all of the error message out-params for these hooks accept HTML.
// Hooray!

	public static function onEditFilterMerged($editor, $text, &$error, $summary) {
		// Load vars
		$vars = new AbuseFilterVariableHolder;
		
		// Cache article object so we can share a parse operation
		$title = $editor->mTitle;
		$articleCacheKey = $title->getNamespace().':'.$title->getText();
		AFComputedVariable::$articleCache[$articleCacheKey] = $editor->mArticle;
		
		global $wgUser;
		$vars->addHolder( AbuseFilter::generateUserVars( $wgUser ) );
		$vars->addHolder( AbuseFilter::generateTitleVars( $editor->mTitle , 'ARTICLE' ) );
		$vars->setVar( 'ACTION', 'edit' );
		$vars->setVar( 'SUMMARY', $summary );
		$vars->setVar( 'minor_edit', $editor->minoredit );
		
		$vars->setLazyLoadVar( 'old_wikitext', 'revision-text-by-timestamp',
			array(
					'timestamp' => $editor->edittime,
					'namespace' => $editor->mTitle->getNamespace(),
					'title' => $editor->mTitle->getText(),
				) );
				
		$vars->setVar( 'new_wikitext', $editor->textbox1 );

		$vars->addHolder( AbuseFilter::getEditVars( $editor->mTitle ) );

		$filter_result = AbuseFilter::filterAction( $vars, $editor->mTitle );

		if( $filter_result !== true ){
			global $wgOut;
			$wgOut->addHTML( $filter_result );
			$editor->showEditForm();
			return false;
		}
		return true;
	}
	
	public static function onGetAutoPromoteGroups( $user, &$promote ) {
		global $wgMemc;
		
		$key = AbuseFilter::autoPromoteBlockKey( $user );
		
		if ($wgMemc->get( $key ) ) {
			$promote = array();
		}
		
		return true;
	}
	
	public static function onAbortMove( $oldTitle, $newTitle, $user, &$error, $reason ) {
		$vars = new AbuseFilterVariableHolder;
		
		global $wgUser;
		$vars->addHolder( AbuseFilterVariableHolder::merge(
							AbuseFilter::generateUserVars( $wgUser ),
							AbuseFilter::generateTitleVars( $oldTitle, 'MOVED_FROM' ),
							AbuseFilter::generateTitleVars( $newTitle, 'MOVED_TO' )
				) );
		$vars->setVar( 'SUMMARY', $reason );
		$vars->setVar( 'ACTION', 'move' );
		
		$filter_result = AbuseFilter::filterAction( $vars, $oldTitle );
		
		$error = $filter_result;
		
		return $filter_result == '' || $filter_result === true;
	}
	
	public static function onArticleDelete( &$article, &$user, &$reason, &$error ) {
		$vars = new AbuseFilterVariableHolder;
		
		global $wgUser;
		$vars->addHolder( AbuseFilter::generateUserVars( $wgUser ) );
		$vars->addHolder( AbuseFilter::generateTitleVars( $article->mTitle, 'ARTICLE' ) );
		$vars->setVar( 'SUMMARY', $reason );
		$vars->setVar( 'ACTION', 'delete' );
		
		$filter_result = AbuseFilter::filterAction( $vars, $article->mTitle );
		
		$error = $filter_result;
		
		return $filter_result == '' || $filter_result === true;
	}
	
	public static function onAbortNewAccount( $user, &$message ) {
		wfLoadExtensionMessages( 'AbuseFilter' );
		if ($user->getName() == wfMsgForContent( 'abusefilter-blocker' )) {
			$message = wfMsg( 'abusefilter-accountreserved' );
			return false;
		}
		$vars = new AbuseFilterVariableHolder;
		
		$vars->setVar( 'ACTION', 'createaccount' );
		$vars->setVar( 'ACCOUNTNAME', $user->getName() );
		
		$filter_result = AbuseFilter::filterAction( 
			$vars, SpecialPage::getTitleFor( 'Userlogin' ) );
		
		$message = $filter_result;
		
		return $filter_result == '' || $filter_result === true;
	}

	public static function onRecentChangeSave( $recentChange ) {
		$title = Title::makeTitle( 
			$recentChange->mAttribs['rc_namespace'], 
			$recentChange->mAttribs['rc_title'] );
		$action = $recentChange->mAttribs['rc_log_type'] ? 
			$recentChange->mAttribs['rc_log_type'] : 'edit';
		$actionID = implode( '-', array(
				$title->getPrefixedText(), $recentChange->mAttribs['rc_user_text'], $action
			) );

		if ( !empty( AbuseFilter::$tagsToSet[$actionID] ) 
			&& count( $tags = AbuseFilter::$tagsToSet[$actionID]) ) 
		{
			ChangeTags::addTags( 
				$tags, 
				$recentChange->mAttribs['rc_id'], 
				$recentChange->mAttribs['rc_this_oldid'],
				$recentChange->mAttribs['rc_logid'] );
		}

		return true;
	}

	public static function onListDefinedTags( &$emptyTags ) {
		## This is a pretty awful hack.
		$dbr = wfGetDB( DB_SLAVE );

		$res = $dbr->select( 'abuse_filter_action', 'afa_parameters', 
			array( 'afa_consequence' => 'tag' ), __METHOD__ );

		while( $row = $res->fetchObject() ) {
			$emptyTags = array_filter( 
				array_merge( explode( "\n", $row->afa_parameters ), $emptyTags ) 
			);
		}

		return true;
	}

	public static function onLoadExtensionSchemaUpdates() {
		global $wgExtNewTables, $wgExtNewFields;

		$dir = dirname( __FILE__ );
		
		// DB updates
		$wgExtNewTables = array_merge( $wgExtNewTables,
			array(
				array( 'abuse_filter', "$dir/abusefilter.tables.sql" ),
				array( 'abuse_filter_history', "$dir/db_patches/patch-abuse_filter_history.sql" ),
				array( 'abuse_filter_history', 'afh_changed_fields', "$dir/db_patches/patch-afh_changed_fields.sql" ),
				array( 'abuse_filter', 'af_deleted', "$dir/db_patches/patch-af_deleted.sql" ),
				array( 'abuse_filter', 'af_actions', "$dir/db_patches/patch-af_actions.sql" ),
			) );

		return true;
	}
}
