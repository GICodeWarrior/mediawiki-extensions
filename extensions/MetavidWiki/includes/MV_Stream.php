<?php
/**
 * MV_Stream.php Created on Apr 24, 2007
 *
 * All Metavid Wiki code is Released Under the GPL2
 * for more info visit http://metavid.org/wiki/Code
 *
 * @author Michael Dale
 * @email dale@ucsc.edu
 * @url http://metavid.org
 *
 */
if ( !defined( 'MEDIAWIKI' ) )  die( 1 );

/* handles metavid stream config and updates mv_stream table*/
class MV_Stream {
	var $id = '';
	var $name = '';
	var $formats = '';
	var $state = '';
	var $date_start_time = '';
	var $duration = '';

	# private state vars (start with _):
	var $_streamExists = false;
	var $_table_name = 'mv_streams';
	var $_files = null;

	# pointers:
	var $mvTitle = '';

	/*
	 * Array init of stream
	 */
	function __construct( $initVal = array() ) {
		// convert the object to an array
		if ( is_object( $initVal ) )
			$initVal = get_object_vars( $initVal );

		if ( is_array( $initVal ) ) {
			foreach ( $initVal as $key => $val ) {
				// make sure the key is present and is not private
				if ( isset ( $this-> $key ) && $key[0] != '_' ) {
					$this-> $key = $val;
				}
			}
		}
		// normalize stream title:
	}
	function newStreamByName( $name ) {
		$s = new MV_Stream( array( 'name' => $name ) );
		return $s;
	}
	function newStreamByID( $id ) {
		$s = new MV_Stream( array( 'id' => $id ) );
		return $s;
	}
	function setMvTitle( &$mvTitle ) {
		$this->mvTitle = $mvTitle;
	}

	function doesStreamExist() {
		return $this->db_load_stream();
	}
	function db_load_stream() {
		$dbr = & wfGetDB( DB_SLAVE );
		if ( $this->name != '' ) {
		$result = $dbr->select( $dbr->tableName( 'mv_streams' ), '*', array (
			'name' => $this->name
			) );
		} elseif ( $this->id != '' ) {
			$result = $dbr->select( $dbr->tableName( 'mv_streams' ), '*', array (
			'id' => $this->id
		) );
		}
		if ( $dbr->numRows( $result ) == 0 )
			return false;
		// load the the database values into the current object:
		$this->__construct( $dbr->fetchObject( $result ) );
		return true;
	}
	function getStreamId() {
		if ( $this->id == '' ) {
			$this->db_load_stream();
			return $this->id;
		} else {
			return $this->id;
		}
	}
	function getStreamName() {
		if ( $this->name == '' ) {
			$this->db_load_stream();
			return $this->name;
		} else {
			return $this->name;
		}
	}
	function getStreamStartDate(){
		if( $this->date_start_time == '' ){
			$this->db_load_stream();
			return $this->date_start_time;
		}else{
			return $this->date_start_time;
		}
	}
	/*
	 * @@todo cache this!:
	 */
	function getStreamNameFromId( $id ) {
		$dbr = & wfGetDB( DB_SLAVE );
		$result = $dbr->select( 'mv_streams', 'name', array (
			'id' => $id
		) );
		if ( $dbr->numRows( $result ) == 0 )
			return false;
		$row = $dbr->fetchObject( $result );
		return $row->name;
	}
	function getDuration() {
		if ( is_numeric( $this->duration ) )
			return $this->duration;
		$this->db_load_stream();
		// if still not set return null
		return $this->duration;
	}
	/*
	 * returns a list of files from the mv_stream_files table
	 */
	function getFileList() {
		$dbr = & wfGetDB( DB_READ );
		$result = $dbr->select( 'mv_stream_files', '*', array (
			'stream_id' => $this->getStreamId()
		) );
		// print_r($result);
		$file_list = array();
		while ( $row = $dbr->fetchObject( $result ) ) {
			$file_list[] = new MV_StreamFile( $this, $row );
		}
		return $file_list;
	}
	/*
	 * returns full web accessible path to stream
	 * (by default this is the web streamable version of the file)
	 * web stream is file_desc_msg as: mv_ogg_low_quality
	 * $mvDefaultVideoQualityKey in MV_Settings.php
	 *
	 * @@todo move into mvTitle class
	 * @@todo point to MV_OggSplit (for segmenting the ogg stream)
	 * (for now using anx)
	 */
	function getWebStreamURL() {
		return $this->mvTitle->getWebStreamURL();
	}
	function getStreamImageURL( $size = null, $req_time = null ) {
		return 	$this->mvTitle->getStreamImageURL( $size, $req_time );
	}
	/*
	 * Inserts the current stream
	 */
	function insertStream( $stream_type = '' ) {
		// @@todo local file check (add formats to stream table)
		// @@set state
		if ( $stream_type != '' )$this->stream_type = $stream_type;
		switch ( $this->stream_type ) {
			case 'metavid_file' :
				/*check local file exists and in what formats are available
				 * stream state: available
				*/
				break;
			case 'metavid_live' :
				/*set up icecast to broadcast the stream and copy it to archive folder
				 * state live_otw
				 */
				break;
			case 'upload_file' :
				// use mediaWiki OggHanlder .. so just reference media in Image: namespace
				/*present an ajax upload progress bar (handled on initial request)
				* once done uploading
				*	check if ogg at reasonable bit rate/resolution
				*		add to stream
				*	else
				*		stream state: 'otw'
				*		job state: in_queue type: transcode
				*/
				break;
			case 'external_file' :
				/*
				 * 	check if url exists.
				 * insert stream - state  'otw'
				 * start downloading report progress on request
				*/
			break;
		}

		$insAry = array ();
		foreach ( $this as $key => $val ) {
			if ( $key == 'name' || $key == 'state' || $key == 'date_start_time' || $key == 'duration' ) {
				if ( $key[0] != '_' ) {
					$insAry[$key] = $val;
				}
			}
		}
		$db = & wfGetDB( DB_WRITE );
		if ( $db->insert( $this->_table_name, $insAry ) ) {
			return true;
		} else {
			// probably error out before we get here
			return false;
		}
	}
	// removes the stream and assoc meta data.
	function removeStream( $removeMVDs = true ) {
 		$dbw = wfGetDB( DB_WRITE );
 		$dbr = wfGetDB( DB_SLAVE );
 		if ( $removeMVDs ) {
 			// delete metadata pages:
 			// @@todo figure out a way to do this quickly/group sql queries.
 			$mvd_rows = MV_Index::getMVDInRange( $this->getStreamId() );
 			foreach ( $mvd_rows as $row ) {
					$title = Title::newFromText( $row->wiki_title, MV_NS_MVD );
					$article = new Article( $title );
					$article->doDelete( 'parent stream removed' );
			}
 		}
 		//remove the stream db entries and images:
 		$this->deleteDB();
 		return true;
	}
	// removes the stream from the db:
	function deleteDB() {
		$dbw = & wfGetDB( DB_WRITE );
		//remove any MVD index items:
		MV_Index::remove_by_stream_id(  $this->id  );
		//remove any digest
		$dbw->delete('mv_clipview_digest', array('stream_id'=> $this->id ));
		//remove any images
		$dbw->delete('mv_stream_images', array('stream_id'	=> $this->id));
		//remove pointers to any files:
		$dbw->delete( 'mv_stream_files', array( 'stream_id' => $this->id ));
	}
	function updateStreamDB() {
		$dbw = & wfGetDB( DB_WRITE );
		$dbw->update( 'mv_streams', array(
				'date_start_time' => $this->date_start_time,
				'duration' => $this->duration
			),
			array( 'id' => $this->id ),
			 'Mv_Stream::updateStreamDB' );
	}
}
