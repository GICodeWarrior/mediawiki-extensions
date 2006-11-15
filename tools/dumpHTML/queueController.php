<?php

$basedir = '/mnt/static';

$wgNoDBParam = true;
require_once( '/home/wikipedia/common/php/maintenance/commandLine.inc' );

$wikiList = array_map( 'trim', file( '/home/wikipedia/common/wikipedia.dblist' ) );
$yaseo = array_map( 'trim', file( '/home/wikipedia/common/yaseo.dblist' ) );
$wikiList = array_diff( $wikiList, $yaseo );

$targetQueueSize = 20;
$maxArticlesPerJob = 10000;
$jobTimeout = 86400;

$queueSock = fsockopen( 'localhost', 8200 );
if ( !$queueSock ) {
	echo "Unable to connect to queue server\n";
	die(1);
}

# Flush the queue
fwrite( $queueSock, "clear\n" );
fgets( $queueSock );

# Fetch wiki stats
$wikiSizes = @file_get_contents( "$basedir/checkpoints/wikiSizes" );
if ( $wikiSizes ) {
	$wikiSizes = unserialize( $wikiSizes );
} else {
	$wikiSizes = array();
	foreach ( $wikiList as $wiki ) {
		if ( $wgAlternateMaster[$wiki] ) {
			$db = new Database( $wgAlternateMaster[$wiki], $wgDBuser, $wgDBpassword, $wiki );
		} else {
			$db = wfGetDB( DB_SLAVE );
		}

		$wikiSizes[$wiki] = $db->selectField( "`$wiki`.site_stats", 'ss_total_pages' );
	}
	file_put_contents( "$basedir/checkpoints/wikiSizes", serialize( $wikiSizes ) );
}

# Compute job array
$jobs = array();
$gates = array(
	'everything' => count( $wikiSizes ),
);

foreach ( $wikiSizes as $wiki => $size ) {
	# Article jobs
	$numJobs = intval( ceil( $size / $maxArticlesPerJob ) );
	$jobsRemainingPerWiki[$wiki] = $numJobs;
	$trigger = "$wiki articles";
	$gates[$trigger] = $numJobs;

	for ( $i = 1; $i <= $numJobs; $i++ ) {
		$jobID = count( $jobs );
		$jobs[] = array(
			'id' => $jobID,
			'cmd' => "$jobID $wiki articles $i/$numJobs",
			'trigger' => $trigger
		);
	}

	# Shared description page jobs
	$numSharedJobs = min( $numJobs, 256 );
	$trigger = "$wiki shared";
	$gates[$trigger] = $numSharedJobs;

	for ( $i = 1; $i <= $numSharedJobs; $i++ ) {
		$jobID = count( $jobs );
		$jobs[] = array(
			'id' => $jobID,
			'gate' => "$wiki articles",
			'cmd' => "$jobID $wiki shared $i/$numSharedJobs",
			'trigger' => $trigger
		);
	}

	# Compression job
	$jobID = count( $jobs );
	$jobs[] = array(
		'id' => $jobID,
		'gate' => "$wiki shared",
		'cmd' => "$jobID $wiki finish 1/1",
		'trigger' => 'everything',
	);
}

# Write job list
$file = fopen( "$basedir/jobs/list", 'w' );
if ( !$file ) {
	print "Unable to open $basedir/jobs/list for writing\n";
	exit( 1 );
}
foreach ( $jobs as $job ) {
	fwrite( $file, $job['cmd']."\n" );
}
fclose( $file );

$doneCount = 0;
$start = 0;
$queued = 0;
$jobCount = count( $jobs );
$queueTimes = array();
$initialisedWikis = array();

print "$jobCount jobs to do\n";

while ( $gates['everything'] ) {
	for ( $i = $start; $i < $jobCount && getQueueSize() < $targetQueueSize; $i++ ) {
		if ( !isset( $jobs[$i] ) ) {
			# Already done and removed
			continue;
		}
		$job = $jobs[$i];

		if ( isset( $job['gate'] ) && $gates[$job['gate']] ) {
			# Job is waiting for a gate
			continue;
		}

		$queueing = false;
		if ( isDone( $job ) ) {
			$doneCount++;
			print "Job $i done: {$job['cmd']} ($doneCount of $jobCount)\n";

			# Handle any triggers for this job
			if ( isset( $job['trigger'] ) && $gates[$job['trigger']] ) {
				--$gates[$job['trigger']];
			}
			# Remove the job from the job list		
			unset( $jobs[$i] );
			# Advance the start pointer
			while ( !isset( $jobs[$start] ) && $start < $jobCount ) {
				$start++;
			}
		} elseif ( !isset( $queueTimes[$i] ) ) {
			print "Queueing job $i: {$job['cmd']}\n";
			$queueing = true;
		} elseif ( time() > $queueTimes[$i] + $jobTimeout ) {
			print "Timeout, requeueing job $i: {$job['cmd']}\n";
			$queueing = true;
		} elseif ( isTerminated( $job ) ) {
			print "Job $i died, requeueing: {$job['cmd']}\n";
			$queueing = true;
		} else {
			$queueing = false;
		}
		if ( $queueing ) {
			if ( !isset( $initialisedWikis[$wiki] ) ) {
				startWiki( $wiki );
				$initialisedWikis[$wiki] = true;
			}
			enqueue( $job );
			$queueTimes[$i] = time();
		}
	}
	sleep(10);
}

//------------------------------------------------------------

function getQueueSize() {
	global $queueSock;
	if ( fwrite( $queueSock, "size\n" ) === false ) {
		die( "Unable to write to queue server\n" );
	}

	$response = fgets( $queueSock );
	if ( $response === false ) {
		die( "Unable to read from queue server\n" );
	}
	if ( !preg_match( "/^size (\d*)/", $response, $m ) ) {
		die( "Invalid response to size request\n" );
	}
	return $m[1];
}

function getJobStatus( $job ) {
	global $basedir;
	$jobStatusFile = "$basedir/jobs/{$job['id']}";
	$lines = @file( $jobCpFile );
	if ( !isset( $lines[1] ) ) {
		return false;
	} else {
		return trim( $lines[1] );
	}
}

function isDone( $job ) {
	return getJobStatus( $job ) == 'done';
}

function isTerminated( $job ) {
	return getJobStatus( $job ) == 'terminated';
}

function enqueue( $job ) {
	global $queueSock;
	if ( false === fwrite( $queueSock, "enq $job\n" ) ) {
		die( "Unable to write to queue server\n" );
	}
	
	# Read and throw away response
	$response = fgets( $queueSock );
}

function startWiki( $wiki ) {
	global $basedir;
	$lang = str_replace( 'wiki', '', $wiki );
	print "Starting language $lang\n";
	passthru( "$basedir/scripts/start-lang $lang" );
}

?>
