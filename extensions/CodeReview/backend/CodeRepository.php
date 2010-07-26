<?php
if ( !defined( 'MEDIAWIKI' ) ) die();

class CodeRepository {
	static $userLinks = array();
	static $authorLinks = array();

	public static function newFromName( $name ) {
		$dbw = wfGetDB( DB_MASTER );
		$row = $dbw->selectRow(
			'code_repo',
			array(
				'repo_id',
				'repo_name',
				'repo_path',
				'repo_viewvc',
				'repo_bugzilla' ),
			array( 'repo_name' => $name ),
			__METHOD__ );

		if ( $row ) {
			return self::newFromRow( $row );
		} else {
			return null;
		}
	}

	public static function newFromId( $id ) {
		$dbw = wfGetDB( DB_MASTER );
		$row = $dbw->selectRow(
			'code_repo',
			array(
				'repo_id',
				'repo_name',
				'repo_path',
				'repo_viewvc',
				'repo_bugzilla' ),
			array( 'repo_id' => intval( $id ) ),
			__METHOD__ );

		if ( $row ) {
			return self::newFromRow( $row );
		} else {
			return null;
		}
	}

	static function newFromRow( $row ) {
		$repo = new CodeRepository();
		$repo->mId = intval( $row->repo_id );
		$repo->mName = $row->repo_name;
		$repo->mPath = $row->repo_path;
		$repo->mViewVc = $row->repo_viewvc;
		$repo->mBugzilla = $row->repo_bugzilla;
		return $repo;
	}

	static function getRepoList() {
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select( 'code_repo', '*', array(), __METHOD__ );
		$repos = array();
		foreach ( $res as $row ) {
			$repos[] = self::newFromRow( $row );
		}
		return $repos;
	}

	public function getId() {
		return intval( $this->mId );
	}

	public function getName() {
		return $this->mName;
	}

	public function getPath() {
		return $this->mPath;
	}

	public function getViewVcBase() {
		return $this->mViewVc;
	}

	/**
	 * Return a bug URL or false.
	 */
	public function getBugPath( $bugId ) {
		if ( $this->mBugzilla ) {
			return str_replace( '$1',
				urlencode( $bugId ), $this->mBugzilla );
		}
		return false;
	}

	public function getLastStoredRev() {
		$dbr = wfGetDB( DB_SLAVE );
		$row = $dbr->selectField(
			'code_rev',
			'MAX(cr_id)',
			array( 'cr_repo_id' => $this->getId() ),
			__METHOD__
		);
		return intval( $row );
	}

	public function getAuthorList() {
		global $wgMemc;
		$key = wfMemcKey( 'codereview', 'authors', $this->getId() );
		$authors = $wgMemc->get( $key );
		if ( is_array( $authors ) ) {
			return $authors;
		}
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select(
			'code_rev',
			array( 'cr_author' ),
			array( 'cr_repo_id' => $this->getId() ),
			__METHOD__,
			array( 'GROUP BY' => 'cr_author',
				'ORDER BY' => 'cr_author', 'LIMIT' => 500 )
		);
		$authors = array();
		while ( $row = $dbr->fetchObject( $res ) ) {
			$authors[] = $row->cr_author;
		}
		$wgMemc->set( $key, $authors, 3600 * 24 );
		return $authors;
	}
	
	public function getAuthorCount() {
		global $wgMemc;
		$key = wfMemcKey( 'codereview', 'authorcount', $this->getId() );
		$authorsCount = $wgMemc->get( $key );
		if ( is_int( $authorsCount ) ) {
			return $authorsCount;
		}
		$dbr = wfGetDB( DB_SLAVE );
		$row = $dbr->select(
			'code_authors',
			array( 'COUNT(cr_author) AS author_count' ),
			array( 'cr_repo_id' => $this->getId() ),
			__METHOD__
		);

		if ( !$row ) {
			throw new MWException( 'Failed to load expected author count' );
		}
		
		$authorsCount = $row->author_count;
		
		$wgMemc->set( $key, $authorsCount, 3600 * 24 );
		return $authorsCount;
	}

	public function getTagList() {
		global $wgMemc;
		$key = wfMemcKey( 'codereview', 'tags', $this->getId() );
		$tags = $wgMemc->get( $key );
		if ( is_array( $tags ) ) {
			return $tags;
		}
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select(
			'code_tags',
			array( 'ct_tag', 'COUNT(*) AS revs' ),
			array( 'ct_repo_id' => $this->getId() ),
			__METHOD__,
			array( 'GROUP BY' => 'ct_tag',
				'ORDER BY' => 'revs DESC', 'LIMIT' => 500 )
		);
		$tags = array();
		while ( $row = $dbr->fetchObject( $res ) ) {
			$tags[] = $row->ct_tag;
		}
		$wgMemc->set( $key, $tags, 3600 * 3 );
		return $tags;
	}

	/**
	 * Load a particular revision out of the DB
	 */
	public function getRevision( $id ) {
		if ( !$this->isValidRev( $id ) ) {
			return null;
		}
		$dbr = wfGetDB( DB_SLAVE );
		$row = $dbr->selectRow( 'code_rev',
			'*',
			array(
				'cr_id' => $id,
				'cr_repo_id' => $this->getId(),
			),
			__METHOD__
		);
		if ( !$row ) {
			throw new MWException( 'Failed to load expected revision data' );
		}
		return CodeRevision::newFromRow( $this, $row );
	}

	/**
	 * Returns the supplied revision ID as a string ready for output, including the
	 * appropriate (localisable) prefix (e.g. "r123" instead of 123).
	 */
	public function getRevIdString( $id ) {
		return wfMsg( 'code-rev-id', $id );
	}

	/**
	 * Like getRevIdString(), but if more than one repository is defined 
	 * on the wiki then it includes the repo name as a prefix to the revision ID
	 * (separated with a period).
	 * This ensures you get a unique reference, as the revision ID alone can be 
	 * confusing (e.g. in e-mails, page titles etc.).  If only one repository is
	 * defined then this returns the same as getRevIdString() as there 
	 * is no ambiguity.
	 */
	public function getRevIdStringUnique( $id ) {
		$id = wfMsg( 'code-rev-id', $id );

	// If there is more than one repo, use the repo name as well.
		$repos = CodeRepository::getRepoList();
		if ( count( $repos ) > 1 ) {
			$id = $this->getName() . "." . $id;
		}

		return $id;
	}

	/**
	 * @param int $rev Revision ID
	 * @param $useCache 'skipcache' to avoid caching
	 *                   'cached' to *only* fetch if cached
	 */
	public function getDiff( $rev, $useCache = '' ) {
		global $wgMemc;
		wfProfileIn( __METHOD__ );

		$rev1 = $rev - 1;
		$rev2 = $rev;

		$revision = $this->getRevision( $rev );
		if ( $revision == null || !$revision->isDiffable() ) {
			wfProfileOut( __METHOD__ );
			return false;
		}

		# Try memcached...
		$key = wfMemcKey( 'svn', md5( $this->mPath ), 'diff', $rev1, $rev2 );
		if ( $useCache === 'skipcache' ) {
			$data = null;
		} else {
			$data = $wgMemc->get( $key );
		}

		# Try the database...
		if ( !$data && $useCache != 'skipcache' ) {
			$dbr = wfGetDB( DB_SLAVE );
			$row = $dbr->selectRow( 'code_rev',
				array( 'cr_diff', 'cr_flags' ),
				array( 'cr_repo_id' => $this->mId, 'cr_id' => $rev, 'cr_diff IS NOT NULL' ),
				__METHOD__
			);
			if ( $row ) {
				$flags = explode( ',', $row->cr_flags );
				$data = $row->cr_diff;
				// If the text was fetched without an error, convert it
				if ( $data !== false && in_array( 'gzip', $flags ) ) {
					# Deal with optional compression of archived pages.
					# This can be done periodically via maintenance/compressOld.php, and
					# as pages are saved if $wgCompressRevisions is set.
					$data = gzinflate( $data );
				}
			}
		}

		# Generate the diff as needed...
		if ( !$data && $useCache !== 'cached' ) {
			$svn = SubversionAdaptor::newFromRepo( $this->mPath );
			$data = $svn->getDiff( '', $rev1, $rev2 );
			// Store to cache
			$wgMemc->set( $key, $data, 3600 * 24 * 3 );
			// Permanent DB storage
			$storedData = $data;
			$flags = Revision::compressRevisionText( $storedData );
			$dbw = wfGetDB( DB_MASTER );
			$dbw->update( 'code_rev',
				array( 'cr_diff' => $storedData, 'cr_flags' => $flags ),
				array( 'cr_repo_id' => $this->mId, 'cr_id' => $rev ),
				__METHOD__
			);
		}
		wfProfileOut( __METHOD__ );
		return $data;
	}
	
	/**
	 * Set diff cache (for import operations)
	 * @param $codeRev CodeRevision
	 */
	public function setDiffCache( CodeRevision $codeRev ) {
		global $wgMemc;
		wfProfileIn( __METHOD__ );

		$rev1 = $codeRev->getId() - 1;
		$rev2 = $codeRev->getId();

		$svn = SubversionAdaptor::newFromRepo( $this->mPath );
		$data = $svn->getDiff( '', $rev1, $rev2 );
		// Store to cache
		$key = wfMemcKey( 'svn', md5( $this->mPath ), 'diff', $rev1, $rev2 );
		$wgMemc->set( $key, $data, 3600 * 24 * 3 );
		// Permanent DB storage
		$storedData = $data;
		$flags = Revision::compressRevisionText( $storedData );
		$dbw = wfGetDB( DB_MASTER );
		$dbw->update( 'code_rev',
			array( 'cr_diff' => $storedData, 'cr_flags' => $flags ),
			array( 'cr_repo_id' => $this->mId, 'cr_id' => $codeRev->getId() ),
			__METHOD__
		);
		wfProfileOut( __METHOD__ );
	}

	/**
	 * Is the requested revid a valid revision to show?
	 * @return bool
	 * @param $rev int Rev id to check
	 */
	public function isValidRev( $rev ) {
		$rev = intval( $rev );
		if ( $rev > 0 && $rev <= $this->getLastStoredRev() ) {
			return true;
		}
		return false;
	}

	/*
	 * Link the $author to the wikiuser $user
	 * @param string $author
	 * @param User $user
	 * @return bool success
	 */
	public function linkUser( $author, User $user ) {
		// We must link to an existing user
		if ( !$user->getId() ) {
			return false;
		}
		$dbw = wfGetDB( DB_MASTER );
		// Insert in the auther -> user link row.
		// Skip existing rows.
		$dbw->insert( 'code_authors',
			array(
				'ca_repo_id'   => $this->getId(),
				'ca_author'    => $author,
				'ca_user_text' => $user->getName()
			),
			__METHOD__,
			array( 'IGNORE' )
		);
		// If the last query already found a row, then update it.
		if ( !$dbw->affectedRows() ) {
			$dbw->update(
				'code_authors',
				array( 'ca_user_text' => $user->getName() ),
				array(
					'ca_repo_id'  => $this->getId(),
					'ca_author'   => $author,
				),
				__METHOD__
			);
		}
		self::$userLinks[$author] = $user;
		return ( $dbw->affectedRows() > 0 );
	}

	/*
	 * Remove local user links for $author
	 * @param string $author
	 * @return bool success
	 */
	public function unlinkUser( $author ) {
		$dbw = wfGetDB( DB_MASTER );
		$dbw->delete(
			'code_authors',
			array(
				'ca_repo_id' => $this->getId(),
				'ca_author'  => $author,
			),
			__METHOD__
		);
		self::$userLinks[$author] = false;
		return ( $dbw->affectedRows() > 0 );
	}

	/*
	 * returns a User object if $author has a wikiuser associated,
	 * or false
	 */
	public function authorWikiUser( $author ) {
		if ( isset( self::$userLinks[$author] ) )
			return self::$userLinks[$author];

		$dbr = wfGetDB( DB_SLAVE );
		$wikiUser = $dbr->selectField(
			'code_authors',
			'ca_user_text',
			array(
				'ca_repo_id' => $this->getId(),
				'ca_author'  => $author,
			),
			__METHOD__
		);
		$user = null;
		if ( $wikiUser !== false )
			$user = User::newFromName( $wikiUser );
		if ( $user instanceof User )
			$res = $user;
		else
			$res = false;
		return self::$userLinks[$author] = $res;
	}
	
	/*
	 * returns an author name if $name wikiuser has an author associated,
	 * or false
	 */
	public function wikiUserAuthor( $name ) {
		if ( isset( self::$authorLinks[$name] ) )
			return self::$authorLinks[$name];
	
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->selectField(
			'code_authors',
			'ca_author',
			array(
				'ca_repo_id'   => $this->getId(),
				'ca_user_text' => $name,
			),
			__METHOD__
		);
		return self::$authorLinks[$name] = $res;
	}
}
