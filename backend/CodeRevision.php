<?php
if ( !defined( 'MEDIAWIKI' ) ) die();

class CodeRevision {
	public static function newFromSvn( CodeRepository $repo, $data ) {
		$rev = new CodeRevision();
		$rev->mRepoId = $repo->getId();
		$rev->mRepo = $repo;
		$rev->mId = intval( $data['rev'] );
		$rev->mAuthor = $data['author'];
		$rev->mTimestamp = wfTimestamp( TS_MW, strtotime( $data['date'] ) );
		$rev->mMessage = rtrim( $data['msg'] );
		$rev->mPaths = $data['paths'];
		$rev->mStatus = 'new';

		$common = null;
		if ( $rev->mPaths ) {
			if ( count( $rev->mPaths ) == 1 ) {
				$common = $rev->mPaths[0]['path'];
			} else {
				$first = array_shift( $rev->mPaths );

				$common = explode( '/', $first['path'] );

				foreach ( $rev->mPaths as $path ) {
					$compare = explode( '/', $path['path'] );

					// make sure $common is the shortest path
					if ( count( $compare ) < count( $common ) )
						list( $compare, $common ) = array( $common, $compare );

					$tmp = array();
					foreach ( $common as $k => $v ) {
						if ( $v == $compare[$k] ) {
							$tmp[] = $v;
						} else {
							break;
						}
					}
					$common = $tmp;
				}
				$common = implode( '/', $common );

				array_unshift( $rev->mPaths, $first );
			}
		}
		$rev->mCommonPath = $common;

		// Check for ignored paths
		global $wgCodeReviewDeferredPaths;
		if ( isset( $wgCodeReviewDeferredPaths[ $repo->getName() ] ) ) {
			foreach ( $wgCodeReviewDeferredPaths[ $repo->getName() ] as $defer ) {
				if ( preg_match( $defer, $rev->mCommonPath ) ) {
					$rev->mStatus = 'deferred';
					break;
				}
			}
		}
		return $rev;
	}

	public static function newFromRow( CodeRepository $repo, $row ) {
		$rev = new CodeRevision();
		$rev->mRepoId = intval( $row->cr_repo_id );
		if ( $rev->mRepoId != $repo->getId() ) {
			throw new MWException( "Invalid repo ID in " . __METHOD__ );
		}
		$rev->mRepo = $repo;
		$rev->mId = intval( $row->cr_id );
		$rev->mAuthor = $row->cr_author;
		$rev->mTimestamp = wfTimestamp( TS_MW, $row->cr_timestamp );
		$rev->mMessage = $row->cr_message;
		$rev->mStatus = $row->cr_status;
		$rev->mCommonPath = $row->cr_path;
		return $rev;
	}

	public function getId() {
		return intval( $this->mId );
	}

	/**
	 * Like getId(), but returns the result as a string, including prefix,
	 * i.e. "r123" instead of 123.
	 */
	public function getIdString( $id = null ) {
		if ( $id === null ) {
			$id = $this->getId();
		}
		return $this->mRepo->getRevIdString( $id );
	}

	/**
	 * Like getIdString(), but if more than one repository is defined
	 * on the wiki then it includes the repo name as a prefix to the revision ID
	 * (separated with a period).
	 * This ensures you get a unique reference, as the revision ID alone can be
	 * confusing (e.g. in e-mails, page titles etc.).  If only one repository is
	 * defined then this returns the same as getIdString() as there is no ambiguity.
	 */
	public function getIdStringUnique( $id = null ) {
		if ( $id === null ) {
			$id = $this->getId();
		}
		return $this->mRepo->getRevIdStringUnique( $id );
	}

	public function getRepoId() {
		return intval( $this->mRepoId );
	}

	public function getAuthor() {
		return $this->mAuthor;
	}

	public function getWikiUser() {
		return $this->mRepo->authorWikiUser( $this->getAuthor() );
	}

	public function getTimestamp() {
		return $this->mTimestamp;
	}

	public function getMessage() {
		return $this->mMessage;
	}

	public function getStatus() {
		return $this->mStatus;
	}

	public function getCommonPath() {
		return $this->mCommonPath;
	}

	public static function getPossibleStates() {
		return array( 'new', 'fixme', 'reverted', 'resolved', 'ok', 'verified', 'deferred', 'old' );
	}

	public function isValidStatus( $status ) {
		return in_array( $status, self::getPossibleStates(), true );
	}

	public function setStatus( $status, $user ) {
		if ( !$this->isValidStatus( $status ) ) {
			throw new MWException( "Tried to save invalid code revision status" );
		}
		// Get the old status from the master
		$dbw = wfGetDB( DB_MASTER );
		$oldStatus = $dbw->selectField( 'code_rev',
			'cr_status',
			array( 'cr_repo_id' => $this->mRepoId, 'cr_id' => $this->mId ),
			__METHOD__
		);
		if ( $oldStatus === $status ) {
			return false; // nothing to do here
		}
		// Update status
		$this->mStatus = $status;
		$dbw->update( 'code_rev',
			array( 'cr_status' => $status ),
			array(
				'cr_repo_id' => $this->mRepoId,
				'cr_id' => $this->mId ),
			__METHOD__
		);
		// Log this change
		if ( $user && $user->getId() ) {
			$dbw->insert( 'code_prop_changes',
				array(
					'cpc_repo_id'   => $this->getRepoId(),
					'cpc_rev_id'    => $this->getId(),
					'cpc_attrib'    => 'status',
					'cpc_removed'   => $oldStatus,
					'cpc_added'     => $status,
					'cpc_timestamp' => $dbw->timestamp(),
					'cpc_user'      => $user->getId(),
					'cpc_user_text' => $user->getName()
				),
				__METHOD__
			);
		}

		$this->sendStatusToUDP( $status, $oldStatus );

		return true;
	}

	/**
	 * Quickie protection against huuuuuuuuge batch inserts
	 */
	protected function insertChunks( $db, $table, $data, $method, $options = array() ) {
		$chunkSize = 100;
		for ( $i = 0; $i < count( $data ); $i += $chunkSize ) {
			$db->insert( 'code_paths',
				array_slice( $data, $i, $chunkSize ),
				__METHOD__,
				array( 'IGNORE' ) );
		}
	}

	public function save() {
		$dbw = wfGetDB( DB_MASTER );
		$dbw->begin();

		$dbw->insert( 'code_rev',
			array(
				'cr_repo_id' => $this->mRepoId,
				'cr_id' => $this->mId,
				'cr_author' => $this->mAuthor,
				'cr_timestamp' => $dbw->timestamp( $this->mTimestamp ),
				'cr_message' => $this->mMessage,
				'cr_status' => $this->mStatus,
				'cr_path' => $this->mCommonPath,
				'cr_flags' => '' ),
			__METHOD__,
			array( 'IGNORE' )
		);

		// Already exists? Update the row!
		$newRevision = $dbw->affectedRows() > 0;
		if ( !$newRevision ) {
			$dbw->update( 'code_rev',
				array(
					'cr_author' => $this->mAuthor,
					'cr_timestamp' => $dbw->timestamp( $this->mTimestamp ),
					'cr_message' => $this->mMessage,
					'cr_path' => $this->mCommonPath ),
				array(
					'cr_repo_id' => $this->mRepoId,
					'cr_id' => $this->mId ),
				__METHOD__
			);
		}

		// Update path tracking used for output and searching
		if ( $this->mPaths ) {
			$data = array();
			foreach ( $this->mPaths as $path ) {
				$data[] = array(
					'cp_repo_id' => $this->mRepoId,
					'cp_rev_id'  => $this->mId,
					'cp_path'    => $path['path'],
					'cp_action'  => $path['action'] );
			}
			$this->insertChunks( $dbw, 'code_paths', $data, __METHOD__, array( 'IGNORE' ) );
		}

		// Update bug references table...
		$affectedBugs = array();
		if ( preg_match_all( '/\bbug (\d+)\b/', $this->mMessage, $m ) ) {
			$data = array();
			foreach ( $m[1] as $bug ) {
				$data[] = array(
					'cb_repo_id' => $this->mRepoId,
					'cb_from'    => $this->mId,
					'cb_bug'     => $bug
				);
				$affectedBugs[] = intval( $bug );
			}
			$dbw->insert( 'code_bugs', $data, __METHOD__, array( 'IGNORE' ) );
		}

		// Get the revisions this commit references...
		$affectedRevs = array();
		if ( preg_match_all( '/\br(\d{2,})\b/', $this->mMessage, $m ) ) {
			foreach ( $m[1] as $rev ) {
				$affectedRev = intval( $rev );
				if ( $affectedRev != $this->mId ) {
					$affectedRevs[] = $affectedRev;
				}
			}
		}

		// Also, get previous revisions that have bugs in common...
		if ( count( $affectedBugs ) ) {
			$res = $dbw->select( 'code_bugs',
				array( 'cb_from' ),
				array(
					'cb_repo_id' => $this->mRepoId,
					'cb_bug'     => $affectedBugs,
					'cb_from < ' . intval( $this->mId ), # just in case
				),
				__METHOD__,
				array( 'USE INDEX' => 'cb_repo_id' )
			);
			foreach ( $res as $row ) {
				$affectedRevs[] = intval( $row->cb_from );
			}
		}

		// Filter any duplicate revisions
		if ( count( $affectedRevs ) ) {
			$data = array();
			$affectedRevs = array_unique( $affectedRevs );
			foreach ( $affectedRevs as $rev ) {
				$data[] = array(
					'cf_repo_id' => $this->mRepoId,
					'cf_from'    => $this->mId,
					'cf_to'      => $rev
				);
				$affectedRevs[] = intval( $rev );
			}
			$dbw->insert( 'code_relations', $data, __METHOD__, array( 'IGNORE' ) );
		}

		global $wgEnableEmail;
		// Email the authors of revisions that this follows up on
		if ( $wgEnableEmail && $newRevision && count( $affectedRevs ) > 0 ) {
			// Get committer wiki user name, or repo name at least
			$commitAuthor = $this->getWikiUser();
			$commitAuthorId = $commitAuthor->getId();
			$committer = $commitAuthor ? $commitAuthor->getName() : htmlspecialchars( $this->mAuthor );
			// Get the authors of these revisions
			$res = $dbw->select( 'code_rev',
				array( 
					'cr_repo_id',
					'cr_id',
					'cr_author',
					'cr_timestamp',
					'cr_message',
					'cr_status',
					'cr_path',
				),
				array(
					'cr_repo_id' => $this->mRepoId,
					'cr_id'      => $affectedRevs,
					'cr_id < ' . intval( $this->mId ), # just in case
					// No sense in notifying if it's the same person
					'cr_author != ' . $dbw->addQuotes( $this->mAuthor )
				),
				__METHOD__,
				array( 'USE INDEX' => 'PRIMARY' )
			);

			// Get repo and build comment title (for url)
			$title = SpecialPage::getTitleFor( 'Code', $this->mRepo->getName() . '/' . $this->mId );
			$url = $title->getFullUrl();

			foreach ( $res as $row ) {
				$revision = CodeRevision::newFromRow( $row );
				$users = $revision->getCommentingUsers();
				
				$revisionAuthor = $revision->getWikiUser();
				
				//Add the followup revision author if they have not already been added as a commentor (they won't want dupe emails!)
				if ( !array_key_exists( $revisionAuthor->getId(), $users ) ) {
					$users[$revisionAuthor->getId()] = $revisionAuthor;
				}

				//Notify commenters and revision author of followup revision
				foreach ( $users as $userId => $user ) {
					// No sense in notifying the author of this rev if they are a commenter/the author on the target rev
					if ( $commitAuthorId == $user->getId() ) {
						continue;
					}	

					if ( $user->canReceiveEmail() ) {
						// Send message in receiver's language
						$lang = array( 'language' => $user->getOption( 'language' ) );
						$user->sendMail(
							wfMsgExt( 'codereview-email-subj2', $lang, $this->mRepo->getName(), $this->getIdString( $row->cr_id ) ),
							wfMsgExt( 'codereview-email-body2', $lang, $committer, $this->getIdStringUnique( $row->cr_id ), $url, $this->mMessage )
						);
					}
				}
			}
		}
		$dbw->commit();
	}

	public function getModifiedPaths() {
		$dbr = wfGetDB( DB_SLAVE );
		return $dbr->select(
			'code_paths',
			array( 'cp_path', 'cp_action' ),
			array( 'cp_repo_id' => $this->mRepoId, 'cp_rev_id' => $this->mId ),
			__METHOD__
		);
	}

	public function isDiffable() {
		$paths = $this->getModifiedPaths();
		if ( !$paths->numRows() || $paths->numRows() > 20 ) {
			return false; // things need to get done this year
		}
		return true;
	}

	public function previewComment( $text, $review, $parent = null ) {
		$data = $this->commentData( $text, $review, $parent );
		$data['cc_id'] = null;
		return CodeComment::newFromData( $this, $data );
	}

	public function saveComment( $text, $review, $parent = null ) {
		global $wgUser;
		if ( !strlen( $text ) ) {
			return 0;
		}
		$dbw = wfGetDB( DB_MASTER );
		$data = $this->commentData( $text, $review, $parent );

		$dbw->begin();
		$data['cc_id'] = $dbw->nextSequenceValue( 'code_comment_cc_id' );
		$dbw->insert( 'code_comment', $data, __METHOD__ );
		$commentId = $dbw->insertId();
		$dbw->commit();

		// Give email notices to committer and commenters
		global $wgCodeReviewENotif, $wgEnableEmail, $wgCodeReviewCommentWatcher;
		if ( $wgCodeReviewENotif && $wgEnableEmail ) {
			// Make list of users to send emails to
			$users = $this->getCommentingUsers();
			if ( $user = $this->getWikiUser() ) {
				$users[$user->getId()] = $user;
			}
			// If we've got a spam list, send e-mails to it too
			if ( $wgCodeReviewCommentWatcher ) {
				$watcher = new User();
				$watcher->setEmail( $wgCodeReviewCommentWatcher );
				$users[0] = $watcher; // We don't have any anons, so using 0 is safe
			}
			// Get repo and build comment title (for url)
			$title = SpecialPage::getTitleFor( 'Code', $this->mRepo->getName() . '/' . $this->mId );
			$title->setFragment( "#c{$commentId}" );
			$url = $title->getFullUrl();

			foreach ( $users as $userId => $user ) {
				// No sense in notifying this commenter
				if ( $wgUser->getId() == $user->getId() ) {
					continue;
				}

				if ( $user->canReceiveEmail() ) {
					// Send message in receiver's language
					$lang = array( 'language' => $user->getOption( 'language' ) );
				
					$user->sendMail(
						wfMsgExt( 'codereview-email-subj', $lang, $this->mRepo->getName(), $this->getIdString() ),
						wfMsgExt( 'codereview-email-body', $lang, $wgUser->getName(), $url, $this->getIdStringUnique(), $text )
					);
				}
			}
		}

		$this->sendCommentToUDP( $commentId, $text, $url );

		return $commentId;
	}

	protected function commentData( $text, $review, $parent = null ) {
		global $wgUser;
		$dbw = wfGetDB( DB_MASTER );
		$ts = wfTimestamp( TS_MW );
		$sortkey = $this->threadedSortkey( $parent, $ts );
		return array(
			'cc_repo_id' => $this->mRepoId,
			'cc_rev_id' => $this->mId,
			'cc_text' => $text,
			'cc_parent' => $parent,
			'cc_user' => $wgUser->getId(),
			'cc_user_text' => $wgUser->getName(),
			'cc_timestamp' => $dbw->timestamp( $ts ),
			'cc_review' => $review,
			'cc_sortkey' => $sortkey );
	}

	protected function threadedSortKey( $parent, $ts ) {
		if ( $parent ) {
			// We construct a threaded sort key by concatenating the timestamps
			// of all our parent comments
			$dbw = wfGetDB( DB_MASTER );
			$parentKey = $dbw->selectField( 'code_comment',
				'cc_sortkey',
				array( 'cc_id' => $parent ),
				__METHOD__ );
			if ( $parentKey ) {
				return $parentKey . ',' . $ts;
			} else {
				// hmmmm
				throw new MWException( 'Invalid parent submission' );
			}
		} else {
			return $ts;
		}
	}

	public function getComments() {
		$dbr = wfGetDB( DB_SLAVE );
		$result = $dbr->select( 'code_comment',
			array(
				'cc_id',
				'cc_text',
				'cc_user',
				'cc_user_text',
				'cc_timestamp',
				'cc_review',
				'cc_sortkey' ),
			array(
				'cc_repo_id' => $this->mRepoId,
				'cc_rev_id' => $this->mId ),
			__METHOD__,
			array(
				'ORDER BY' => 'cc_sortkey' )
		);
		$comments = array();
		foreach ( $result as $row ) {
			$comments[] = CodeComment::newFromRow( $this, $row );
		}
		return $comments;
	}

	public function getPropChanges() {
		$dbr = wfGetDB( DB_SLAVE );
		$result = $dbr->select( array( 'code_prop_changes', 'user' ),
			array(
				'cpc_attrib',
				'cpc_removed',
				'cpc_added',
				'cpc_timestamp',
				'cpc_user',
				'cpc_user_text',
				'user_name'
			), array(
				'cpc_repo_id' => $this->mRepoId,
				'cpc_rev_id' => $this->mId,
			),
			__METHOD__,
			array( 'ORDER BY' => 'cpc_timestamp DESC' ),
			array( 'user' => array( 'LEFT JOIN', 'cpc_user = user_id' ) )
		);
		$changes = array();
		foreach ( $result as $row ) {
			$changes[] = CodePropChange::newFromRow( $this, $row );
		}
		return $changes;
	}
	
	public function getPropChangeUsers() {
		$dbr = wfGetDB( DB_SLAVE );
		$result = $dbr->select( 'code_prop_changes',
			'DISTINCT(cpc_user)',
			array(
				'cpc_repo_id' => $this->mRepoId,
				'cpc_rev_id' => $this->mId,
			),
			__METHOD__
		);
		$users = array();
		foreach ( $result as $row ) {
			$users[$row->cpc_user] = User::newFromId( $row->cpc_user );
		}
		return $users;
	}
	
	/**
	* "Review" being revision commenters, and people who set/removed tags and changed the status
	*/
	public function getReviewContributingUsers() {
		return array_merge( $this->getCommentingUsers(), $this->getPropChangeUsers() );
	}

	protected function getCommentingUsers() {
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select( 'code_comment',
			'DISTINCT(cc_user)',
			array(
				'cc_repo_id' => $this->mRepoId,
				'cc_rev_id' => $this->mId,
				'cc_user != 0' // users only
			),
			__METHOD__
		);
		$users = array();
		while ( $row = $res->fetchObject() ) {
			$users[$row->cc_user] = User::newFromId( $row->cc_user );
		}
		return $users;
	}

	public function getReferences() {
		$refs = array();
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select(
			array( 'code_relations', 'code_rev' ),
			array( 'cr_id', 'cr_status', 'cr_timestamp', 'cr_author', 'cr_message' ),
			array(
				'cf_repo_id' => $this->mRepoId,
				'cf_to' => $this->mId,
				'cr_repo_id = cf_repo_id',
				'cr_id = cf_from'
			),
			__METHOD__
		);
		while ( $row = $res->fetchObject() ) {
			if ( $this->mId != intval( $row->cr_id ) ) {
				$refs[] = $row;
			}
		}
		return $refs;
	}

	public function getTags( $from = DB_SLAVE ) {
		$db = wfGetDB( $from );
		$result = $db->select( 'code_tags',
			array( 'ct_tag' ),
			array(
				'ct_repo_id' => $this->mRepoId,
				'ct_rev_id' => $this->mId ),
			__METHOD__ );

		$tags = array();
		foreach ( $result as $row ) {
			$tags[] = $row->ct_tag;
		}
		return $tags;
	}

	public function changeTags( $addTags, $removeTags, $user = null ) {
		// Get the current tags and see what changes
		$tagsNow = $this->getTags( DB_MASTER );
		// Normalize our input tags
		$addTags = $this->normalizeTags( $addTags );
		$removeTags = $this->normalizeTags( $removeTags );
		$addTags = array_diff( $addTags, $tagsNow );
		$removeTags = array_intersect( $removeTags, $tagsNow );
		// Do the queries
		$dbw = wfGetDB( DB_MASTER );
		if ( $addTags ) {
			$dbw->insert( 'code_tags',
				$this->tagData( $addTags ),
				__METHOD__,
				array( 'IGNORE' )
			);
		}
		if ( $removeTags ) {
			$dbw->delete( 'code_tags',
				array(
					'ct_repo_id' => $this->mRepoId,
					'ct_rev_id'  => $this->mId,
					'ct_tag'     => $removeTags ),
				__METHOD__
			);
		}
		// Log this change
		if ( ( $removeTags || $addTags ) && $user && $user->getId() ) {
			$dbw->insert( 'code_prop_changes',
				array(
					'cpc_repo_id'   => $this->getRepoId(),
					'cpc_rev_id'    => $this->getId(),
					'cpc_attrib'    => 'tags',
					'cpc_removed'   => implode( ',', $removeTags ),
					'cpc_added'     => implode( ',', $addTags ),
					'cpc_timestamp' => $dbw->timestamp(),
					'cpc_user'      => $user->getId(),
					'cpc_user_text' => $user->getName()
				),
				__METHOD__
			);
		}
	}

	protected function normalizeTags( $tags ) {
		$out = array();
		foreach ( $tags as $tag ) {
			$out[] = $this->normalizeTag( $tag );
		}
		return $out;
	}

	protected function tagData( $tags ) {
		$data = array();
		foreach ( $tags as $tag ) {
			if ( $tag == '' ) continue;
			$data[] = array(
				'ct_repo_id' => $this->mRepoId,
				'ct_rev_id'  => $this->mId,
				'ct_tag'     => $this->normalizeTag( $tag ) );
		}
		return $data;
	}

	public function normalizeTag( $tag ) {
		global $wgContLang;
		$lower = $wgContLang->lc( $tag );

		$title = Title::newFromText( $tag );
		if ( $title && $lower === $wgContLang->lc( $title->getPrefixedText() ) ) {
			return $lower;
		} else {
			return false;
		}
	}

	public function isValidTag( $tag ) {
		return ( $this->normalizeTag( $tag ) !== false );
	}

	public function getPrevious( $path = '' ) {
		$dbr = wfGetDB( DB_SLAVE );
		$encId = $dbr->addQuotes( $this->mId );
		$tables = array( 'code_rev' );
		if ( $path != '' ) {
			$conds = $this->getPathConds( $path );
			$order = 'cp_rev_id DESC';
			$tables[] = 'code_paths';
		} else {
			$conds = array( 'cr_repo_id' => $this->mRepoId );
			$order = 'cr_id DESC';
		}
		$conds[] = "cr_id < $encId";
		$row = $dbr->selectRow( $tables, 'cr_id',
			$conds,
			__METHOD__,
			array( 'ORDER BY' => $order )
		);
		if ( $row ) {
			return intval( $row->cr_id );
		} else {
			return false;
		}
	}

	public function getNext( $path = '' ) {
		$dbr = wfGetDB( DB_SLAVE );
		$encId = $dbr->addQuotes( $this->mId );
		$tables = array( 'code_rev' );
		if ( $path != '' ) {
			$conds = $this->getPathConds( $path );
			$order = 'cp_rev_id ASC';
			$tables[] = 'code_paths';
		} else {
			$conds = array( 'cr_repo_id' => $this->mRepoId );
			$order = 'cr_id ASC';
		}
		$conds[] = "cr_id > $encId";
		$row = $dbr->selectRow( $tables, 'cr_id',
			$conds,
			__METHOD__,
			array( 'ORDER BY' => $order )
		);
		if ( $row ) {
			return intval( $row->cr_id );
		} else {
			return false;
		}
	}

	protected function getPathConds( $path ) {
		$dbr = wfGetDB( DB_SLAVE );
		return array(
			'cp_repo_id' => $this->mRepoId,
			'cp_path ' . $dbr->buildLike( $path, $dbr->anyString() ),
			// performance
			'cp_rev_id > ' . ( $this->mRepo->getLastStoredRev() - 20000 ),
			// join conds
			'cr_repo_id = cp_repo_id',
			'cr_id = cp_rev_id'
		);
	}

	public function getNextUnresolved( $path = '' ) {
		$dbr = wfGetDB( DB_SLAVE );
		$encId = $dbr->addQuotes( $this->mId );
		$tables = array( 'code_rev' );
		if ( $path != '' ) {
			$conds = $this->getPathConds( $path );
			$order = 'cp_rev_id ASC';
			$tables[] = 'code_paths';
		} else {
			$conds = array( 'cr_repo_id' => $this->mRepoId );
			$order = 'cr_id ASC';
		}
		$conds[] = "cr_id > $encId";
		$conds['cr_status'] = array( 'new', 'fixme' );
		$row = $dbr->selectRow( $tables, 'cr_id',
			$conds,
			__METHOD__,
			array( 'ORDER BY' => $order )
		);
		if ( $row ) {
			return intval( $row->cr_id );
		} else {
			return false;
		}
	}

	protected function sendCommentToUDP( $commentId, $text, $url = null ) {
		global $wgCodeReviewUDPAddress, $wgCodeReviewUDPPort, $wgCodeReviewUDPPrefix, $wgLang, $wgUser;

		if( $wgCodeReviewUDPAddress ) {
			if( is_null( $url ) ) {
				$title = SpecialPage::getTitleFor( 'Code', $this->mRepo->getName() . '/' . $this->mId );
				$title->setFragment( "#c{$commentId}" );
				$url = $title->getFullUrl();
			}

			$line = wfMsg( 'code-rev-message' ) . " \00314(" . $this->mRepo->getName() .
					")\003 \0037" . $this->getIdString() . "\003 \00303" . RecentChange::cleanupForIRC( $wgUser->getName() ) .
					"\003: \00310" . RecentChange::cleanupForIRC( $wgLang->truncate( $text, 100 ) ) . "\003 " . $url;
			
			RecentChange::sendToUDP( $line, $wgCodeReviewUDPAddress, $wgCodeReviewUDPPrefix, $wgCodeReviewUDPPort );
		}
	}

	protected function sendStatusToUDP( $status, $oldStatus ) {
		global $wgCodeReviewUDPAddress, $wgCodeReviewUDPPort, $wgCodeReviewUDPPrefix, $wgUser;
		
		if( $wgCodeReviewUDPAddress ) {
			$title = SpecialPage::getTitleFor( 'Code', $this->mRepo->getName() . '/' . $this->getId() );
			$url = $title->getFullUrl();

			$line = wfMsg( 'code-rev-status' ) . " \00314(" . $this->mRepo->getName() .
					")\00303 " . RecentChange::cleanupForIRC( $wgUser->getName() ) . "\003 " .
					/* Remove three apostrophes as they are intended for the parser  */
					str_replace( "'''", '', wfMsg( 'code-change-status', "\0037" . $this->getIdString() . "\003" ) ) .
					": \00315" . wfMsg( 'code-status-' . $oldStatus ) . "\003 -> \00310" .
					wfMsg( 'code-status-' . $status ) . "\003 " . $url;

			RecentChange::sendToUDP( $line, $wgCodeReviewUDPAddress, $wgCodeReviewUDPPrefix, $wgCodeReviewUDPPort );
		}
	}
}
