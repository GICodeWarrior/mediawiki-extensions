<?php

// TODO access control
class SpecialMergeThread extends ThreadActionPage {

	function getFormFields() {
		$splitForm = array(
			'src' =>
				array(
					'type' => 'info',
					'label-message' => 'lqt-thread-merge-source',
					'default' => $this->formatThreadField( 'src', $this->mThread->id() ),
					'raw' => 1,
				),
			'dest' =>
				array(
					'type' => 'info',
					'label-message' => 'lqt-thread-merge-dest',
					'default' =>
						$this->formatThreadField( 'dest', $this->request->getVal( 'dest' ) ),
					'raw' => 1,
				),
			'reason' =>
				array(
					'label-message' => 'movereason',
					'type' => 'text',
				),
		);
		
		return $splitForm;
	}
	
	protected function getRightRequirement() { return 'lqt-merge'; }
	
	public function checkParameters( $par ) {
		global $wgOut;
		if ( !parent::checkParameters( $par ) ) {
			return false;
		}
		
		$dest = $this->request->getVal( 'dest' );
		
		if ( !$dest ) {
			$wgOut->addWikiMsg( 'lqt_threadrequired' );
			return false;
		}
		
		$thread = Threads::withId( $dest );
		
		if ( !$thread ) {
			$wgOut->addWikiMsg( 'lqt_nosuchthread' );
			return false;
		}
		
		$this->mDestThread = $thread;
		
		return true;
	}

	function formatThreadField( $field, $threadid ) {
	
		if ( !is_object( $threadid ) ) {
			$t = Threads::withId( $threadid );
		} else {
			$t = $threadid;
			$threadid = $t->id();
		}
		
		$out = Xml::hidden( $field, $threadid );
		$out .= LqtView::permalink( $t );
		
		return $out;
	}

	/**
	* @see SpecialPage::getDescription
	*/
	function getDescription() {
		wfLoadExtensionMessages( 'LiquidThreads' );
		return wfMsg( 'lqt_merge_thread' );
	}
	
	function trySubmit( $data ) {
		// Load data
		$srcThread = $this->mThread;
		$dstThread = $this->mDestThread;
		$newSubject = $dstThread->subject();
		$reason = $data['reason'];
		
		$oldTopThread = $srcThread->topmostThread();
		$oldParent = $srcThread->superthread();
			
		$this->recursiveSet( $srcThread, $newSubject, $dstThread, $dstThread );

		$dstThread->addReply( $srcThread );
		
		if ( $oldParent ) {
			$oldParent->removeReply( $srcThread );
		}
		
		$oldTopThread->commitRevision( Threads::CHANGE_MERGED_FROM, $srcThread, $reason );
		$dstThread->commitRevision( Threads::CHANGE_MERGED_TO, $srcThread, $reason );
		
		$srcTitle = clone $srcThread->article()->getTitle();
		$srcTitle->setFragment( '#' . $srcThread->getAnchorName() );
		
		$dstTitle = clone $dstThread->article()->getTitle();
		$dstTitle->setFragment( '#' . $dstThread->getAnchorName() );
		
		$srcLink = $this->user->getSkin()->link( $srcTitle, $srcThread->subject() );
		$dstLink = $this->user->getSkin()->link( $dstTitle, $dstThread->subject() );
		
		global $wgOut;
		$wgOut->addHTML( wfMsgExt( 'lqt-merge-success', array( 'parseinline', 'replaceafter' ),
							 $srcLink, $dstLink ) );
		
		return true;
	}
	
	function recursiveSet( $thread, $subject, $ancestor, $superthread = false ) {
		$thread->setSubject( $subject );
		$thread->setAncestor( $ancestor->id() );
		
		if ( $superthread ) {
			$thread->setSuperThread( $superthread );
		}
		
		$thread->save();
		
		foreach ( $thread->replies() as $subThread ) {
			$this->recursiveSet( $subThread, $subject, $ancestor );
		}
	}
	
	function getPageName() {
		return 'MergeThread';
	}
	
	function getSubmitText() {
		wfLoadExtensionMessages( 'LiquidThreads' );
		return wfMsg( 'lqt-merge-submit' );
	}
}
