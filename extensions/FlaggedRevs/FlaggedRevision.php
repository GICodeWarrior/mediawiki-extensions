<?php

class FlaggedRevision {
	private $mTitle;
	private $mRevId, $mPageId;
	private $mTimestamp;
	private $mComment;
	private $mQuality;
	private $mTags;
	private $mText;
	private $mRawDBText, $mFlags;
	private $mUser;
	private $mRevision;
	private $mFileName, $mFileSha1, $mFileTimestamp;

	/**
	 * @param Title $title
	 * @param Row $row (from database)
	 */
	public function __construct( $title, $row ) {
		$this->mTitle = $title;
		if( is_object($row) ) {
			$this->mRevId = intval( $row->fr_rev_id );
			$this->mPageId = intval( $row->fr_page_id );
			$this->mTimestamp = $row->fr_timestamp;
			$this->mComment = $row->fr_comment;
			$this->mQuality = intval( $row->fr_quality );
			$this->mTags = self::expandRevisionTags( strval($row->fr_tags) );
			# Image page revision relevant params
			$this->mFileName = $row->fr_img_name ? $row->fr_img_name : null;
			$this->mFileSha1 = $row->fr_img_sha1 ? $row->fr_img_sha1 : null;
			$this->mFileTimestamp = $row->fr_img_timestamp ? $row->fr_img_timestamp : null;
			$this->mUser = intval( $row->fr_user );
			# Optional fields
			$this->mFlags = isset($row->fr_flags) ? explode(',',$row->fr_flags) : null;
			$this->mRawDBText = isset($row->fr_text) ? $row->fr_text : null;
		} else if( is_array($row) ) {
			$this->mRevId = intval( $row['fr_rev_id'] );
			$this->mPageId = intval( $row['fr_page_id'] );
			$this->mTimestamp = $row['fr_timestamp'];
			$this->mComment = $row['fr_comment'];
			$this->mQuality = intval( $row['fr_quality'] );
			$this->mTags = self::expandRevisionTags( strval($row['fr_tags']) );
			# Image page revision relevant params
			$this->mFileName = $row['fr_img_name'] ? $row['fr_img_name'] : null;
			$this->mFileSha1 = $row['fr_img_sha1'] ? $row['fr_img_sha1'] : null;
			$this->mFileTimestamp = $row['fr_img_timestamp'] ? $row['fr_img_timestamp'] : null;
			$this->mUser = intval( $row['fr_user'] );
			# Optional fields
			$this->mFlags = isset($row['fr_flags']) ? explode(',',$row['fr_flags']) : null;
			$this->mRawDBText = isset($row['fr_text']) ? $row['fr_text'] : null;
		} else {
			throw new MWException( 'FlaggedRevision constructor passed invalid row format.' );
		}
		$this->mText = null; // Deal with as it comes
	}
	
	/**
	 * @param Title $title
	 * @param int $revId
	 * @param int $flags
	 * @returns mixed FlaggedRevision (null on failure)
	 * Will not return a revision if deleted
	 */
	public static function newFromTitle( $title, $revId, $flags = 0 ) {
		$columns = self::selectFields();
		# If we want the text, then get the text flags too
		if( $flags & FR_TEXT ) {
			$columns += self::selectTextFields();
		}
		$options = array();
		# User master/slave as appropriate
		if( $flags & FR_FOR_UPDATE || $flags & FR_MASTER ) {
			$db = wfGetDB( DB_MASTER );
			if( $flags & FR_FOR_UPDATE )
				$options[] = 'FOR UPDATE';
		} else {
			$db = wfGetDB( DB_SLAVE );
		}
		$pageId = $title->getArticleID( $flags & FR_FOR_UPDATE ? GAID_FOR_UPDATE : 0 );
		# Short-circuit query
		if( !$pageId ) {
			return null;
		}
		# Skip deleted revisions
		$row = $db->selectRow( array('flaggedrevs','revision'),
			$columns,
			array( 'fr_page_id' => $pageId,
				'fr_rev_id' => $revId,
				'rev_id = fr_rev_id',
				'rev_page = fr_page_id',
				'rev_deleted & '.Revision::DELETED_TEXT => 0 ),
			__METHOD__,
			$options );
		# Sorted from highest to lowest, so just take the first one if any
		if( $row ) {
			return new FlaggedRevision( $title, $row );
		}
		return null;
	}
	
	/**
	 * Get latest quality rev, if not, the latest reviewed one.
	 * @param Title $title, page title
	 * @param int $flags
	 * @returns mixed FlaggedRevision (null on failure)
	 */
	public static function newFromStable( $title, $flags = 0 ) {
		$columns = self::selectFields();
		# If we want the text, then get the text flags too
		if( $flags & FR_TEXT ) {
			$columns += self::selectTextFields();
		}
		$options = array();
		$row = null;
		# Short-circuit query
		if( !$title->getArticleId() ) {
			return $row;
		}
		# User master/slave as appropriate
		if( !($flags & FR_FOR_UPDATE) && !($flags & FR_MASTER) ) {
			$dbr = wfGetDB( DB_SLAVE );
			$row = $dbr->selectRow( array('flaggedpages','flaggedrevs'),
				$columns,
				array( 'fp_page_id' => $title->getArticleId(),
					'fr_page_id' => $title->getArticleId(),
					'fp_stable = fr_rev_id' ),
				__METHOD__  );
			if( !$row )
				return null;
		} else {
			if( $flags & FR_FOR_UPDATE )
				$options[] = 'FOR UPDATE';
			# Get visiblity settings...
			$config = FlaggedRevs::getPageVisibilitySettings( $title, true );
			$dbw = wfGetDB( DB_MASTER );
			$options['ORDER BY'] = 'fr_rev_id DESC';
			# Look for the latest pristine revision...
			if( FlaggedRevs::pristineVersions() && $config['select'] != FLAGGED_VIS_LATEST ) {
				$prow = $dbw->selectRow( array('flaggedrevs','revision'),
					$columns,
					array( 'fr_page_id' => $title->getArticleID(),
						'fr_quality = 2',
						'rev_id = fr_rev_id',
						'rev_page = fr_page_id',
						'rev_deleted & '.Revision::DELETED_TEXT => 0),
					__METHOD__,
					$options );
				# Looks like a plausible revision
				$row = $prow ? $prow : null;
			}
			# Look for the latest quality revision...
			if( FlaggedRevs::qualityVersions() && $config['select'] != FLAGGED_VIS_LATEST ) {
				// If we found a pristine rev above, this one must be newer, unless
				// we specifically want pristine revs to have precedence...
				$newerClause = ($row && $config['select'] != FLAGGED_VIS_PRISTINE) ?
					"fr_rev_id > {$row->fr_rev_id}" : "1 = 1";
				$qrow = $dbw->selectRow( array('flaggedrevs','revision'),
					$columns,
					array( 'fr_page_id' => $title->getArticleID(),
						'fr_quality = 1',
						$newerClause,
						'rev_id = fr_rev_id',
						'rev_page = fr_page_id',
						'rev_deleted & '.Revision::DELETED_TEXT => 0),
					__METHOD__,
					$options );
				$row = $qrow ? $qrow : $row;
			}
			# Do we have one? If not, try the latest reviewed revision...
			if( !$row ) {
				$row = $dbw->selectRow( array('flaggedrevs','revision'),
					$columns,
					array( 'fr_page_id' => $title->getArticleID(),
						'rev_id = fr_rev_id',
						'rev_page = fr_page_id',
						'rev_deleted & '.Revision::DELETED_TEXT => 0),
					__METHOD__,
					$options );
				if( !$row )
					return null;
			}
		}
		return new FlaggedRevision( $title, $row );
	}
	
	/*
	* Insert a FlaggedRevision object into the database
	*
	* @param string $fulltext expanded (pre-processed) text
	* @param array $tmpRows template version rows
	* @param array $fileRows file version rows
	* @return bool success
	*/
	public function insertOn( $fulltext, $tmpRows, $fileRows ) {
		$this->mText = $fulltext;
		# Store/compress text as needed, and get the flags
		$textFlags = FlaggedRevision::doSaveCompression( $fulltext );
		$this->mRawDBText = $fulltext; // wikitext or ES url
		$this->mFlags = explode(',',$textFlags);
		$dbw = wfGetDB( DB_MASTER );
		# Our review entry
		$revRow = array(
			'fr_page_id'       => $this->getPage(),
			'fr_rev_id'	       => $this->getRevId(),
			'fr_user'	       => $user->getUser(),
			'fr_timestamp'     => $dbw->timestamp( $this->getTimestamp() ),
			'fr_comment'       => $this->getComment(),
			'fr_quality'       => $this->getQuality(),
			'fr_tags'	       => self::flattenRevisionTags( $this->getTags() ),
			'fr_text'	       => $fulltext, # Store expanded text for speed
			'fr_flags'	       => $textFlags,
			'fr_img_name'      => $this->getFileName(),
			'fr_img_timestamp' => $this->getFileTimestamp(),
			'fr_img_sha1'      => $this->getFileSha1()
		);
		# Update flagged revisions table
		$dbw->replace( 'flaggedrevs', array( array('fr_page_id','fr_rev_id') ), $revRow, __METHOD__ );
		# Clear out any previous garbage.
		# We want to be able to use this for tracking...
		$dbw->delete( 'flaggedtemplates', array('ft_rev_id' => $this->getRevId() ), __METHOD__ );
		$dbw->delete( 'flaggedimages', array('fi_rev_id' => $this->getRevId() ), __METHOD__ );
		# Update our versioning params
		if( !empty($tmpRows) ) {
			$dbw->insert( 'flaggedtemplates', $tmpRows, __METHOD__, 'IGNORE' );
		}
		if( !empty($fileRows) ) {
			$dbw->insert( 'flaggedimages', $fileRows, __METHOD__, 'IGNORE' );
		}
		return true;
	}
	
	/**
	 * @returns Array basic select fields (not including text/text flags)
	 */
	public static function selectFields() {
		return array('fr_rev_id','fr_page_id','fr_user','fr_timestamp','fr_comment','fr_quality',
			'fr_tags','fr_img_name', 'fr_img_sha1', 'fr_img_timestamp');
	}
	
	/**
	 * @returns Array text select fields (text/text flags)
	 */
	public static function selectTextFields() {
		return array('fr_text','fr_flags');
	}

	/**
	 * @returns Integer revision ID
	 */
	public function getRevId() {
		return $this->mRevId;
	}
	
	/**
	 * @returns Title title
	 */
	public function getTitle() {
		return $this->mTitle;
	}

	/**
	 * @returns Integer page ID
	 */
	public function getPage() {
		return $this->mPageId;
	}

	/**
	 * Get timestamp of review
	 * @returns String revision timestamp in MW format
	 */
	public function getTimestamp() {
		return wfTimestamp( TS_MW, $this->mTimestamp );
	}
	
	/**
	 * Get the corresponding revision
	 * @returns Revision
	 */
	public function getRevision() {
		if( !is_null($this->mRevision) )
			return $this->mRevision;
		# Get corresponding revision
		$rev = Revision::newFromId( $this->mRevId );
		# Save to cache
		$this->mRevision = $rev ? $rev : false;
		return $this->mRevision;
	}
	
	/**
	 * Get timestamp of the corresponding revision
	 * @returns String revision timestamp in MW format
	 */
	public function getRevTimestamp() {
		# Get corresponding revision
		$rev = $this->getRevision();
		$timestamp = $rev ? $rev->getTimestamp() : "0";
		return $timestamp;
	}

	/**
	 * @returns String review comment
	 */
	public function getComment() {
		return $this->mComment;
	}
	
	/**
	 * @returns Integer the user ID of the reviewer
	 */
	public function getUser() {
		return $this->mUser;
	}

	/**
	 * @returns Integer revision timestamp in MW format
	 */
	public function getQuality() {
		return $this->mQuality;
	}

	/**
	 * @returns Array tag metadata
	 */
	public function getTags() {
		return $this->mTags;
	}
	
	/**
	 * @returns string, filename accosciated with this revision.
	 * This returns NULL for non-image page revisions.
	 */
	public function getFileName() {
		return $this->mFileName;
	}
	
	/**
	 * @returns string, sha1 key accosciated with this revision.
	 * This returns NULL for non-image page revisions.
	 */
	public function getFileSha1() {
		return $this->mFileSha1;
	}
	
	/**
	 * @returns string, timestamp accosciated with this revision.
	 * This returns NULL for non-image page revisions.
	 */
	public function getFileTimestamp() {
		return $this->mFileTimestamp;
	}
	
	/**
	 * @returns bool
	 */
	public function userCanSetFlags() {
		return RevisionReview::userCanSetFlags( $this->mTags );
	}
	
	/**
	 * @returns Array template versions (ns -> dbKey -> rev id)
	 */	
	public function getTemplateVersions() {
		$templates = array();
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select( 'flaggedtemplates', '*', array('ft_rev_id' => $this->getRevId()), __METHOD__ );
		while( $row = $res->fetchObject() ) {
			if( !isset($templates[$row->ft_namespace]) ) {
				$templates[$row->ft_namespace] = array();
			}
			$templates[$row->ft_namespace][$row->ft_title] = $row->ft_tmp_rev_id;
		}
		return $templates;
	}
	
	/**
	 * @returns Array template versions (dbKey -> sha1)
	 */	
	public function getFileVersions() {
		$files = array();
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select( 'flaggedimages', '*', array('fi_rev_id' => $this->getRevId()), __METHOD__ );
		while( $row = $res->fetchObject() ) {
			$files[$row->fi_name] = $row->fi_img_sha1;
		}
		return $files;
	}

	/**
	 * @returns mixed (string/false) expanded text
	 */
	public function getExpandedText() {
		$this->loadText(); // load if not loaded
		return $this->mText;
	}
	
	/**
	 * @returns mixed (string/false) expanded text or revision text.
	 * Depends on whether $wgUseStableTemplates is on or not.
	 */
	public function getTextForParse() {
		global $wgUseStableTemplates;
		if( $wgUseStableTemplates ) {
			$text = $this->getRevText();
		} else {
			$text = $this->getExpandedText();
		}
		return $text;
	}
	
	/**
	 * Get text of the corresponding revision
	 * @returns mixed (string/false) revision timestamp in MW format
	 */
	public function getRevText() {
		# Get corresponding revision
		$rev = $this->getRevision();
		$text = $rev ? $rev->getText() : false;
		return $text;
	}
	
	/**
	 * Actually load the revision's expanded text
	 */
	private function loadText() {
		# Loaded already?
		if( !is_null($this->mText) )
			return true;
		
		wfProfileIn( __METHOD__ );
		// Check uncompressed cache first...
		global $wgRevisionCacheExpiry, $wgMemc;
		if( $wgRevisionCacheExpiry ) {
			$key = wfMemcKey( 'flaggedrevisiontext', 'revid', $this->getRevId() );
			$text = $wgMemc->get( $key );
			if( is_string($text) ) {
				$this->mText = $text;
				wfProfileOut( __METHOD__ );
				return true;
			}
		}
		// DB stuff loaded already?
		if( is_null($this->mFlags) || is_null($this->mRawDBText) ) {
			$dbw = wfGetDB( DB_MASTER );
			$row = $dbw->selectRow( 'flaggedrevs',
				array( 'fr_text', 'fr_flags' ),
				array( 'fr_rev_id' => $this->mRevId,
					'fr_page_id' => $this->mPageId ),
				__METHOD__ );
			// WTF ???
			if( !$row ) {
				$this->mRawDBText = false;
				$this->mFlags = array();
				$this->mText = false;
				wfProfileOut( __METHOD__ );
				return false;
			} else {
				$this->mRawDBText = $row->fr_text;
				$this->mFlags = explode(',',$row->fr_flags);
			}
		}
		// Should the text actually be made dynamically?
		if( in_array( 'dynamic', $this->mFlags ) ) {
			return $this->getRevText();
		}
		// Check if fr_text is just some URL to external DB storage
		if( in_array( 'external', $this->mFlags ) ) {
			$url = $this->mRawDBText;
			@list(/* $proto */,$path) = explode('://',$url,2);
			if( $path=="" ) {
				$this->mText = null;
			} else {
				$this->mText = ExternalStore::fetchFromURL( $url );
			}
		} else {
			$this->mText = $this->mRawDBText;
		}
		// Uncompress if needed
		$this->mText = self::uncompressText( $this->mText, $this->mFlags );
		// Caching may be beneficial for massive use of external storage
		if( $wgRevisionCacheExpiry ) {
			$wgMemc->set( $key, $this->mText, $wgRevisionCacheExpiry );
		}
		wfProfileOut( __METHOD__ );
		return true;
	}
	
	/**
	* @param string $fulltext
	* @return string, flags
	* Compress pre-processed text, passed by reference
	* Accounts for various config options.
	*/
	public static function doSaveCompression( &$fulltext ) {
		# Flag items that do not have text stored
		global $wgUseStableTemplates;
		if( $wgUseStableTemplates ) {
			$fulltext = '';
			$textFlags = 'utf-8,dynamic';
		} else {
			# Compress $fulltext, passed by reference
			$textFlags = self::compressText( $fulltext );
			# Write to external storage if required
			$storage = FlaggedRevs::getExternalStorage();
			if( $storage ) {
				if( is_array($storage) ) {
					# Distribute storage across multiple clusters
					$store = $storage[mt_rand(0, count( $storage ) - 1)];
				} else {
					$store = $storage;
				}
				# Store and get the URL
				$fulltext = ExternalStore::insert( $store, $fulltext );
				if( !$fulltext ) {
					# This should only happen in the case of a configuration error, where the external store is not valid
					wfProfileOut( __METHOD__ );
					throw new MWException( "Unable to store text to external storage $store" );
				}
				if( $textFlags ) {
					$textFlags .= ',';
				}
				$textFlags .= 'external';
			}
		}
		return $textFlags;
	}
	
	/**
	* @param string $text
	* @return string, flags
	* Compress pre-processed text, passed by reference
	*/
	public static function compressText( &$text ) {
		global $wgCompressRevisions;
		$flags = array( 'utf-8' );
		if( $wgCompressRevisions ) {
			if( function_exists( 'gzdeflate' ) ) {
				$text = gzdeflate( $text );
				$flags[] = 'gzip';
			} else {
				wfDebug( "FlaggedRevs::compressText() -- no zlib support, not compressing\n" );
			}
		}
		return implode( ',', $flags );
	}

	/**
	* @param string $text
	* @param mixed $flags, either in string or array form
	* @return string
	* Uncompress pre-processed text, using flags
	*/
	public static function uncompressText( $text, $flags ) {
		if( !is_array($flags) ) {
			$flags = explode( ',', $flags );
		}
		# Lets not mix up types here
		if( is_null($text) )
			return null;
		if( $text !== false && in_array( 'gzip', $flags ) ) {
			# Deal with optional compression if $wgCompressRevisions is set.
			$text = gzinflate( $text );
		}
		return $text;
	}
	
	/**
	 * Get flags for a revision
	 * @param string $tags
	 * @return Array
	*/
	public static function expandRevisionTags( $tags ) {
		# Set all flags to zero
		$flags = array();
		foreach( FlaggedRevs::getDimensions() as $tag => $levels ) {
			$flags[$tag] = 0;
		}
		$tags = str_replace('\n',"\n",$tags); // B/C, old broken rows
		$tags = explode("\n",$tags);
		foreach( $tags as $tuple ) {
			$set = explode(':',$tuple,2);
			if( count($set) == 2 ) {
				list($tag,$value) = $set;
				$value = intval($value);
				# Add only currently recognized ones
				if( isset($flags[$tag]) ) {
					# If a level was removed, default to the highest
					$flags[$tag] = $value < count($levels) ? $value : count($levels)-1;
				}
			}
		}
		return $flags;
	}

	/**
	 * Get flags for a revision
	 * @param Array $tags
	 * @return string
	*/
	public static function flattenRevisionTags( $tags ) {
		$flags = '';
		foreach( $tags as $tag => $value ) {
			# Add only currently recognized ones
			if( FlaggedRevs::getTagLevels($tag) ) {
				$flags .= $tag . ':' . intval($value) . "\n";
			}
		}
		return $flags;
	}
}
