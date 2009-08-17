<?php

$IP = strval( getenv( 'MW_INSTALL_PATH' ) ) !== ''
	? getenv( 'MW_INSTALL_PATH' )
	: realpath( dirname( __FILE__ ) . "/../../" );

require_once( "$IP/maintenance/commandLine.inc" );

if( isset( $options['help'] ) ) {
	print "Fetches updated localisation files from MediaWiki development SVN\n";
	print "and saves into local database to merge with release defaults.\n";
	print "\n";
	print "Usage: php extensions/LocalisationUpdate/update.php\n";
	print "Options:\n";
	print "  --quiet  Suppress progress output\n";
	print "  --all    Fetch all present extensions, not just those enabled\n";
	print "\n";
	exit( 0 );
}


$verbose = !isset( $options['quiet'] );
$all = isset( $options['all'] );

$starttime = microtime( true );

// Prevent the script from timing out
set_time_limit( 0 );
ini_set( "max_execution_time", 0 );

LocalisationUpdate::updateMessages( $verbose, $all );

$endtime = microtime( true );
$totaltime = ( $endtime - $starttime );
print "All done in " . $totaltime . " seconds\n";
