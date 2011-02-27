<?php

// symlink me into maintenance/

$options = array( 'skip' );
require_once( 'commandLine.inc' );


if( !isset( $args[0] ) ) {
	print "Call MWUpdateDaemon remotely for status or updates.\n";
	print "Usage: php luceneUpdate.php [database] [--skip=n] {status|flush|stop|start|restart|rebuild}\n";
	exit( -1 );
}

$ret = true;

switch( $args[0] ) {
case 'stop':
	try {
		MWSearchUpdater::stop();
	} catch ( MWException $e ) {
		$ret = $e;
	}
	break;
case 'restart':
case 'flushall':
case 'flush':
	try {
		MWSearchUpdater::flushAll();
	} catch ( MWException $e ) {
		$ret = $e;
	}
	break;
case 'start':
	try {
		MWSearchUpdater::start();
	} catch ( MWException $e ) {
		$ret = $e;
	}
	break;
//case 'flush':
//	global $wgDBname;
//	try {
//		MWSearchUpdater::flush( $wgDBname );
//	} catch ( MWException $e ) {
//		$ret = $e;
//	}
//	break;
case 'status':
	// no-op
	break;
case 'quit':
	try {
		MWSearchUpdater::quit();
	} catch ( MWException $e ) {
		$ret = $e;
	}
	break;
case 'optimize':
	try {
		MWSearchUpdater::optimize();
	} catch ( MWException $e ) {
		$ret = $e;
	}
	break;
case 'update':
	$title = Title::newFromText( $args[1] );
	if( is_null( $title ) ) {
		die( "Invalid title\n" );
	}
	$rev = Revision::newFromTitle( $title );
	try {
		if( $rev ) {
			$text = $rev->getText();
			$ret = MWSearchUpdater::updatePage( $wgDBname, $title, $text );
		} else {
			$ret = MWSearchUpdater::deletePage( $wgDBname, $title );
		}
	} catch ( MWException $e ) {
		$ret = $e;
	}
	break;
case 'rebuild':
	$builder = new LuceneBuilder();
	if( isset( $options['skip'] ) ) {
		$builder->skip( intval( $options['skip'] ) );
	}
	$ret = $builder->rebuildAll();
	break;
case 'deleted':
	$builder = new LuceneBuilder();
	$since = @$args[1];
	$ret = $builder->rebuildDeleted( $since );
	break;
case 'recent':
	$builder = new LuceneBuilder();
	$since = @$args[1];
	$ret = $builder->rebuildRecent( $since );
	break;
case 'random':
	// fill with random junk for load testing and heap profiling
	// don't run this on your production database ;)
	function wfRandomString( $length ) {
		$str = '';
		for( $i = 0; $i < $length; $i++ ) {
			$char = mt_rand( 32, 127 );
			$str .= chr( $char );
		}
		return $str;
	}
	$n = 0;
	while(true) {
		$randomTitle = Title::makeTitle( NS_MAIN, wfRandomString( 20 ) );
		$randomText = wfRandomString( 16384 );
		MWSearchUpdater::updatePage( $wgDBname, $randomTitle, $randomText );
		$n++;
		if( $n % 100 == 0 ) {
			echo MWSearchUpdater::getStatus() . "\n";
			LuceneBuilder::wait();
		}
	}
	break;
default:
	echo "Unknown command.\n";
	exit( -1 );
}

if( $ret instanceof MWException ) {
	echo $ret->getMessage() . "\n";
	exit( -1 );
}

try {
	$status = MWSearchUpdater::getStatus();
	echo $status . "\n";
	exit( 0 );
} catch ( MWException $e ) {
	echo $e->getMessage() . "\n";
	exit( -1 );
}


///

class LuceneBuilder {
	function __construct() {
		$this->db       = wfGetDB( DB_SLAVE );
		$this->dbstream =& $this->streamingSlave( $this->db );
		$this->offset = 0;
	}
	
	function &streamingSlave( $db ) {
		global $wgDBname;
		$stream = new DatabaseMysql( $db->mServer, $db->mUser, $db->mPassword, $wgDBname );
		$stream->bufferResults( false );
		
		$timeout = 3600 * 24;
		$stream->query( "SET net_read_timeout=$timeout" );
		$stream->query( "SET net_write_timeout=$timeout" );
		return $stream;
	}
	
	function skip( $offset ) {
		$this->offset = intval( $offset );
	}
	
	function init( $max ) {
		$this->max = $max;
		$this->count = 0;
		$this->startTime = wfTime();
	}
	
	function progress() {
		global $wgDBname;
		$this->count++;
		if( $this->count % 100 == 0 ) {
			$now = wfTime();
			$delta = $now - $this->startTime;
			$portion = $this->count / $this->max;
			$eta = $this->startTime + ($delta / $portion);
			$rate = $this->count / $delta;
			
			printf( "%s: %6.3f%% on %s, ETA %s [%d/%d] %.2f/sec\n",
				wfTimestamp( TS_DB, intval( $now ) ),
				$portion * 100.0,
				$wgDBname,
				wfTimestamp( TS_DB, intval( $eta ) ),
				$this->count,
				$this->max,
				$rate );
			
			$this->wait();
		}
	}
	
	/**
	 * See if the daemon's getting overloaded and pause if so
	 */
	function wait() {
		$cutoff = 500;
		$waittime = 10;
		
		while( true ) {
			try {
				$status = MWSearchUpdater::getStatus();
			} catch ( MWException $e ) {
				echo $e->getMessage() . "\n";
				sleep( $waittime );
				continue;
			}
			
			// Updater IS running; 90418 items queued.
			if( !preg_match( '/([0-9]+) items queued/', $status, $matches ) ) {
				// ?! confused
				break;
			}
			
			$count = intval( $matches[1] );
			if( $count < $cutoff ) {
				break;
			}
			
			printf( "%s: %s\n",
				wfTimestamp( TS_DB ),
				$status );
			
			sleep( $waittime );
		}
	}
	
	function finalStatus() {
		global $wgDBname;
		$now = wfTime();
		$delta = $now - $this->startTime;
		$portion = $this->count / $this->max;
		$eta = $now + ($delta / $portion);
		$rate = $this->count / $delta;
		
		printf( "%s: done on %s, [%d/%d] %.2f/sec\n",
			wfTimestamp( TS_DB, intval( $now ) ),
			$wgDBname,
			$this->count,
			$this->max,
			$rate );
	}
	
	function rebuildAll() {
		global $wgDBname;
		
		$lastError = true;
		
		$maxId = $this->db->selectField( 'page', 'MAX(page_id)', '', __METHOD__ );
		$maxId -= $this->offset; // hack for percentages
		$this->init( $maxId );
		if( $maxId < 1 ) {
			echo "Nothing to do.\n";
			return;
		}
		
		$limit = array();
		if( $this->offset ) {
			$limit = array( 'LIMIT $offset, 10000000' );
		}
		
		$result = $this->dbstream->select( array( 'page' ),
			array( 'page_namespace', 'page_title', 'page_latest' ),
			'',
			__METHOD__,
			$limit );
		
		$errorCount = 0;
		foreach ( $result as $row ) {
			$this->progress();
			
			$title = Title::makeTitle( $row->page_namespace, $row->page_title );
			$rev = Revision::newFromId( $row->page_latest );
			if( is_null( $rev ) ) {
				// Page was probably deleted while we were running
				continue;
			}
			
 			$text = $rev->getText();

			try {
				MWSearchUpdater::updatePage( $wgDBname, $title, $text );
			} catch( MWException $e ) {
				echo "ERROR: " . $e->getMessage() . "\n";
				$lastError = $e;
				$errorCount++;
				if( $errorCount > 20 ) {
					echo "Lots of errors, giving up. :(\n";
					return $lastError;
				}
			}
		}
		$this->finalStatus();
		$this->dbstream->freeResult( $result );
		
		return $lastError;
	}
	
	/**
	 * Trawl thorugh the deletion log entries to remove any deleted pages
	 * that might have been missed when the index updater daemon was broken.
	 */
	function rebuildDeleted( $since = null ) {
		global $wgDBname;
		
		if( is_null( $since ) ) {
			$since = '20010115000000';
		}

		// Turn buffering back on; these are relatively small.
		$this->dbstream->bufferResults( true );
		
		$cutoff  = $this->dbstream->addQuotes( $this->dbstream->timestamp( $since ) );
		$logging = $this->dbstream->tableName( 'logging' );
		$page    = $this->dbstream->tableName( 'page' );
		$result  = $this->dbstream->query(
			"SELECT log_namespace,log_title
			 FROM $logging
			 LEFT OUTER JOIN $page
			 ON log_namespace=page_namespace AND log_title=page_title
			 WHERE log_type='delete'
			 AND log_timestamp > $cutoff
			 AND page_namespace IS NULL", __METHOD__ );
		
		$max = $this->dbstream->numRows( $result );
		if( $max == 0 ) {
			echo "Nothing to do.\n";
			return;
		}
		$this->init( $max );
		$lastError = true;
		
		foreach ( $result as $row ) {
			$this->progress();
			$title = Title::makeTitle( $row->log_namespace, $row->log_title );
			try {
				MWSearchUpdater::deletePage( $wgDBname, $title );
			} catch ( MWException $e ) {
				echo "ERROR: " . $e->getMessage() . "\n";
				$lastError = $e;
			}
		}
		
		$this->finalStatus();
		$this->dbstream->freeResult( $result );
		
		return $lastError;
	}

	/**
	 * Trawl thorugh the recentchanges log to update pages which have been
	 * modified since a given date. This gives a chance to catch up if
	 * the index updater daemon was broken or disabled since last build.
	 */
	function rebuildRecent( $since = null ) {
		global $wgDBname;

		if( is_null( $since ) ) {
			$since = '20010115000000';
		}

		// Turn buffering back on; these are relatively small.
		//$this->dbstream->bufferResults( true );
		
		$cutoff  = $this->dbstream->addQuotes( $this->dbstream->timestamp( $since ) );
		$recentchanges = $this->dbstream->tableName( 'recentchanges' );
		$revision      = $this->dbstream->tableName( 'revision' );
		$page          = $this->dbstream->tableName( 'page' );
		$result        = $this->dbstream->query(
			"SELECT *
			 FROM $recentchanges,$page,$revision
			 WHERE rc_namespace=page_namespace
			 AND rc_title=page_title
			 AND rc_this_oldid=page_latest
			 AND page_latest=rev_id
			 AND rc_timestamp > $cutoff", __METHOD__ );
		
		#$max = $this->dbstream->numRows( $result );
		$max = 10000; // wacky estimate
		if( $max == 0 ) {
			echo "Nothing to do.\n";
			return;
		}
		$this->init( $max );
		$lastError = true;
		
		foreach ( $result as $row ) {
			$this->progress();
			$rev = new Revision( $row );
			if( is_object( $rev ) ) {
				$title = Title::makeTitle( $row->page_namespace, $row->page_title );
				try {
					MWSearchUpdater::updatePage( $wgDBname, $title, $rev->getText() );
				} catch ( MWException $e ) {
					echo "ERROR: " . $e->getMessage() . "\n";
					$lastError = $e;
				}
			}
		}
		
		$this->finalStatus();
		$this->dbstream->freeResult( $result );
		
		return $lastError;
	}

}


