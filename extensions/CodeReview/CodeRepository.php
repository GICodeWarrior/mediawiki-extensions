<?php

class CodeRepository {
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
		
		if( $row ) {
			return self::newFromRow( $row );
		} else {
			return null;
		}
	}
	
	static function newFromRow( $row ) {
		$repo = new CodeRepository();
		$repo->mId = $row->repo_id;
		$repo->mName = $row->repo_name;
		$repo->mPath = $row->repo_path;
		$repo->mViewVc = $row->repo_viewvc;
		$repo->mBugzilla = $row->repo_bugzilla;
		return $repo;
	}
	
	function getId() {
		return intval( $this->mId );
	}
	
	function getName() {
		return $this->mName;
	}
	
	/**
	 * Return a bug URL or false.
	 */
	function getBugPath( $bugId ) {
		if( $this->mBugzilla ) {
			return str_replace( '$1',
				urlencode( $bugId ), $this->mBugzilla );
		}
		return false;
	}
	
	/**
	 * Load a particular revision out of the DB
	 */
	function getRevision( $id ) {
		throw new MWException( 'barf' );
	}
	
	function getRevisionRange() {
		return CodeRevision::newFromRange( $this );
	}
}
