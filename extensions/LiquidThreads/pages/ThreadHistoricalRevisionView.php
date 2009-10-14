<?php

if ( !defined( 'MEDIAWIKI' ) ) die;

class ThreadHistoricalRevisionView extends ThreadPermalinkView {

	public $mDisplayRevision = null;

	/* TOOD: customize tabs so that History is highlighted. */

	function postDivClass( $thread ) {
		$changedObject = $this->mDisplayRevision->getChangeObject();
		$is_changed_thread =  $changedObject &&
					( $changedObject->id() == $thread->id() );
		
		$class = parent::postDivClass( $thread );
		
		if ( $is_changed_thread ) {
			return "$class lqt_post_changed_by_history";
		} else {
			return $class;
		}
	}
	
	function getMessageForChangeType( $ct ) {
		static $messages = array(
			Threads::CHANGE_NEW_THREAD => 'lqt_change_new_thread',
			Threads::CHANGE_REPLY_CREATED => 'lqt_change_reply_created',
			Threads::CHANGE_DELETED => 'lqt_change_deleted',
			Threads::CHANGE_UNDELETED => 'lqt_change_undeleted',
			Threads::CHANGE_MOVED_TALKPAGE => 'lqt_change_moved',
			Threads::CHANGE_SPLIT => 'lqt_change_split',
			Threads::CHANGE_EDITED_SUBJECT => 'lqt_change_edited_subject',
			Threads::CHANGE_MERGED_FROM => 'lqt_change_merged_from',
			Threads::CHANGE_MERGED_TO => 'lqt_change_merged_to',
			Threads::CHANGE_SPLIT_FROM => 'lqt_change_split_from',
			Threads::CHANGE_EDITED_SUMMARY => 'lqt_change_edited_summary',
			Threads::CHANGE_ROOT_BLANKED => 'lqt_change_root_blanked',
			Threads::CHANGE_EDITED_ROOT => 'lqt_change_edited_root',
		);
		
		if ( isset( $messages[$ct] ) ) {
			return $messages[$ct];
		}
		
		return '';
	}

	function showHistoryInfo() {
		global $wgLang;
		wfLoadExtensionMessages( 'LiquidThreads' );

		$html = '';
		$html .= wfMsgExt( 'lqt_revision_as_of', 'parseinline',
			array(
				$wgLang->timeanddate( $this->mDisplayRevision->getTimestamp() ),
				$wgLang->date( $this->mDisplayRevision->getTimestamp() ),
				$wgLang->time( $this->mDisplayRevision->getTimestamp() )
			)
		);
		
		$html .= '<br/>';

		$ct = $this->mDisplayRevision->getChangeType();
		
		$msg = '';
		
		$post = $this->mDisplayRevision->getChangeObject();
		$postLinkURL = LqtView::linkInContextURL( $post );
		
		$msg = $this->getMessageForChangeType( $ct );
		
		if ( $ct == Threads::CHANGE_EDITED_ROOT ||
				$ct == Threads::CHANGE_ROOT_BLANKED  ) {
			$diff_link = $this->diffPermalink( $post,
							wfMsgExt( 'diff', 'parseinline' ),
							$this->mDisplayRevision );
			
			$msg = wfMsgExt( $msg,
					array( 'parseinline' ),
					array( $postLinkURL ) ) .
					" [$diff_link]";
		} else {			
			$msg = wfMsgExt( $msg, array( 'parseinline' ),
					array( $postLinkURL ) );
		}
		
		$html .=  $msg;
		
		$html = Xml::tags( 'div', array( 'class' => 'lqt_history_info' ), $html );
		
		$this->output->addHTML( $html );
	}

	function show() {
		if ( ! $this->thread ) {
			$this->showMissingThreadPage();
			return false;
		}
		
		$oldid = $this->request->getInt( 'lqt_oldid' );
		$this->mDisplayRevision = ThreadRevision::loadFromId( $oldid );

		$this->thread = $this->mDisplayRevision->getThreadObj();
		
		$this->showHistoryInfo();

		global $wgHooks;
		$wgHooks['SkinTemplateTabs'][] = array( $this, 'customizeTabs' );

		if ( !$this->thread ) {
			$this->showMissingThreadPage();
			return false;
		}

		self::addJSandCSS();
		$this->output->setSubtitle( $this->getSubtitle() );
		
		$changedObject = $this->mDisplayRevision->getChangeObject();

		$this->showThread( $this->thread, 1, 1,
			array( 'maxDepth' => - 1, 'maxCount' => - 1,
				'mustShowThreads' => array( $changedObject->id() ) ) );
		
		$this->output->setPageTitle( $this->thread->subject() );
		return false;
	}
}
