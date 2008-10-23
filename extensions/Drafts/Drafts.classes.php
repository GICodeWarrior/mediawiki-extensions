<?php

/* Classes */

// Draft Class
class Draft
{
	/* Fields */

	private $_db;
	private $_exists = false;
	private $_id;
	private $_userID;
	private $_title;
	private $_section;
	private $_starttime;
	private $_edittime;
	private $_savetime;
	private $_scrolltop ;
	private $_text;
	private $_summary;
	private $_minoredit;

	/* Functions */

	public function __construct( $id = null, $autoload = true ) {
		// If an ID is a number the existence is actually checked on load
		// If an ID is false the existance is always false durring load
		$this->_id = $id;

		# Load automatically
		if ( $autoload ) {
			$this->load();
		}
	}

	private function load() {
		global $wgUser;
		
		// Verify the ID has been set
		if ( $this->_id === null ) {
			return;
		}
		
		// Get db connection
		$this->getDB();

		// Select drafts from the database matching ID - can be 0 or 1 results
		$result = $this->_db->select( 'drafts',
			array( '*' ),
			array(
				'draft_id' => (int) $this->_id,
				'draft_user' => (int) $wgUser->getID()
			),
			__METHOD__
		);
		if ( $result === false ) {
			return;
		}

		// Get the row
		$row = $this->_db->fetchRow( $result );
		if ( !is_array( $row ) || count( $row ) == 0 ) {
			return;
		}

		// Synchronize data
		$this->_title = Title::makeTitle( $row['draft_namespace'], $row['draft_title'] );
		$this->_section = $row['draft_section'];
		$this->_starttime = $row['draft_starttime'];
		$this->_edittime = $row['draft_edittime'];
		$this->_savetime = $row['draft_savetime'];
		$this->_scrolltop = $row['draft_scrolltop'];
		$this->_text = $row['draft_text'];
		$this->_summary = $row['draft_summary'];
		$this->_minoredit = $row['draft_minoredit'];

		// Update state
		$this->_exists = true;

		return;
	}

	public function save() {
		global $wgUser;
	
		// Get db connection
		$this->getDB();
		
		// Build data
		$data = array(
			'draft_user' => (int) $wgUser->getID(),
			'draft_namespace' => (int) $this->_title->getNamespace(),
			'draft_title' => (string) $this->_title->getDBKey(),
			'draft_section' => $this->_section == '' ? null : (int) $this->_section,
			'draft_starttime' => $this->_db->timestamp( $this->_starttime ),
			'draft_edittime' => $this->_db->timestamp( $this->_edittime ),
			'draft_savetime' => $this->_db->timestamp( $this->_savetime ),
			'draft_scrolltop' => (int) $this->_scrolltop,
			'draft_text' => (string) $this->_text,
			'draft_summary' => (string) $this->_summary,
			'draft_minoredit' => (int) $this->_minoredit
		);

		// Save data
		if ( $this->_exists === true ) {
			$this->_db->update( 'drafts',
				$data,
				array(
					'draft_id' => (int) $this->_id,
					'draft_user' => (int) $wgUser->getID()
				),
				__METHOD__
			);
		}
		else {
			$this->_db->insert( 'drafts', $data, __METHOD__ );
			$this->_id = $this->_db->insertId();
			// Update state
			$this->_exists = true;
		}
		
		// Return success
		return true;
	}

	public function discard() {
		global $wgUser;
		
		// Get db connection
		$this->getDB();

		// Delete data
		$this->_db->delete( 'drafts',
			array(
				'draft_id' => $this->_id,
				'draft_user' =>  $wgUser->getID()
			),
			__METHOD__
		);

		$this->_exists = false;
	}
	
	public static function newFromID( $id, $autoload = true ) {
		return new Draft( $id, $autoload );
	}
	
	public static function countDrafts( &$title = null, $userID = null ) {
		global $wgUser;
		
		// Get db connection
		$db = wfGetDB( DB_SLAVE );
		
		// Build where clause
		$where = array();
		if ( $title !== null ) {
			$where['draft_namespace'] = $title->getNamespace();
			$where['draft_title'] = $title->getDBKey();
		}
		if ( $userID !== null ) {
			$where['draft_user'] = $userID;
		} else {
			$where['draft_user'] = $wgUser->getID();
		}
		
		// Get a list of matching drafts
		return $db->selectField( 'drafts', 'count(*)', $where, __METHOD__ );
	}
	
	public static function getDrafts( &$title = null, $userID = null ) {
		global $wgUser;
		
		// Get db connection
		$db = wfGetDB( DB_MASTER );
		
		// Build where clause
		$where = array();
		if ( $title !== null ) {
			$where['draft_namespace'] = $title->getNamespace();
			$where['draft_title'] = $title->getDBKey();
		}
		if ( $userID !== null ) {
			$where['draft_user'] = $userID;
		} else {
			$where['draft_user'] = $wgUser->getID();
		}
		
		// Create an array of matching drafts
		$drafts = array();
		$result = $db->select( 'drafts', array( 'draft_id' ), $where, __METHOD__ );
		if ( $result ) {
			while ( $row = $db->fetchRow( $result ) ) {
				// Add a new draft to the list from the row
				$drafts[] = Draft::newFromID( $row['draft_id'] );
			}
		}
		
		// Return array of matching drafts
		return count( $drafts ) ? $drafts : null;
	}
	
	public static function listDrafts( &$title = null, $user = null ) {
		global $wgOut, $wgRequest, $wgUser, $wgLang;
		
		// Get draftID
		$currentDraft = Draft::newFromID( $wgRequest->getIntOrNull( 'draft' ) );
		
		// Output HTML for list of drafts
		$drafts = Draft::getDrafts( $title, $user );
		if( count( $drafts ) > 0 )
		{
			// Internationalization
			wfLoadExtensionMessages( 'Drafts' );
			$msgArticle = wfMsgHTML( 'drafts-view-article' );
			$msgExisting = wfMsgHTML( 'drafts-view-existing' );
			$msgSaved = wfMsgHTML( 'drafts-view-saved' );
			$msgDiscard = wfMsgHTML( 'drafts-view-discard' );
			
			// Begin existing drafts table
			$htmlDraftList = <<<END
				<table cellpadding="5" cellspacing="0" width="100%" border="0" style="margin-left:-5px;margin-right:-5px">
					<tr>
						<th align="left"  width="75%" nowrap="nowrap">{$msgArticle}</th>
						<th align="left" nowrap="nowrap">{$msgSaved}</th>
						<th></th>
					</tr>
END;
	
			// Add existing drafts for this page and user
			foreach( $drafts as $draft )
			{
				// Load draft information from database
				$draft->load();
				
				// Article
				$draftsTitle = SpecialPage::getTitleFor( 'Drafts' );
				
				// Build URLs and HTML components
				$htmlTitle = $draft->getTitle()->getEscapedText();
				$htmlState = $currentDraft->getID() == $draft->getID() ? 'bold' : 'normal';
				$urlLoad = wfExpandURL( $draft->getTitle()->getEditURL() ) . '&draft=' . $draft->getID();
				$urlDiscard = $draftsTitle->getFullUrl() . '?discard=' . $draft->getID() . '&token=' . $wgUser->editToken();
				
				// If in edit mode, return to editor
				if ( $wgRequest->getText( 'action' ) == 'edit' || $wgRequest->getText( 'action' ) == 'submit' )
				$urlDiscard .= '&returnto=edit';
				
				// Section
				if ( $draft->getSection() !== null ) {
					// Detect section name
					$lines = explode( "\n", $draft->getText() );
					
					// If there is any content in the section
					if ( count( $lines ) > 0 ) {
						$htmlTitle .= '#' . trim( trim( substr( $lines[0], 0, 255 ), '=' ) );
					}
					
					// Modify article link and title
					$urlLoad .= '&section=' . $draft->getSection();
					$urlDiscard .= '&section=' . $draft->getSection();
				}
				
				// Format save time
				$htmlSaveTime = $wgLang->timeanddate(
					wfTimestamp( TS_UNIX, $draft->getSaveTime() )
				);
	
				// Build HTML
				$htmlDraftList .= <<<END
					<tr>
						<td align="left" nowrap="nowrap"><a href="{$urlLoad}" style="font-weight:{$htmlState}">{$htmlTitle}</a></td>
						<td align-"left" nowrap="nowrap">{$htmlSaveTime}</td>
						<td align="right" nowrap="nowrap"><a href="{$urlDiscard}">{$msgDiscard}</a></td>
					</tr>
END;
			}
	
			// End existing drafts table
			$htmlDraftList .= '</table>';

			// If there were any drafts for this page and user
			if ( count( $drafts ) > 0 )
			{
				// Show list of drafts
				$wgOut->addHTML( $htmlDraftList );
			}
			
			// Return number of drafts
			return count( $drafts );
		}
		return 0;
	}
	
	private function getDB() {
		// Get database connection if we don't already have one
		if ( $this->_db === null ) {
			$this->_db = wfGetDB( DB_MASTER );
		}
	}

	/* States */

	public function exists()
	{
		return $this->_exists;
	}

	/* Properties */

	public function getID() {
		return $this->_id;
	}

	public function getUserID( $userID ) {
		$this->_userID = $userID;
	}
	public function setUserID() {
		return $this->_userID;
	}

	public function getTitle() {
		return $this->_title;
	}
	public function setTitle( $title ) {
		$this->_title = $title;
	}

	public function getSection() {
		return $this->_section;
	}
	public function setSection( $section ) {
		$this->_section = $section;
	}

	public function getStartTime() {
		return $this->_starttime;
	}
	public function setStartTime( $starttime ) {
		$this->_starttime = $starttime;
	}

	public function getEditTime() {
		return $this->_edittime;
	}
	public function setEditTime( $edittime ) {
		$this->_edittime = $edittime;
	}

	public function getSaveTime() {
		return $this->_savetime;
	}
	public function setSaveTime( $savetime ) {
		$this->_savetime = $savetime;
	}

	public function getScrollTop() {
		return $this->_scrolltop;
	}
	public function setScrollTop( $scrolltop ) {
		$this->_scrolltop = $scrolltop;
	}

	public function getText() {
		return $this->_text;
	}
	public function setText( $text ) {
		$this->_text = $text;
	}

	public function getSummary() {
		return $this->_summary;
	}
	public function setSummary( $summary ) {
		$this->_summary = $summary;
	}

	public function getMinorEdit() {
		return $this->_minoredit;
	}
	public function setMinorEdit( $minoredit ) {
		$this->_minoredit = $minoredit;
	}
}
