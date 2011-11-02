<?php
/**
 * Example for running the TestSwarm MediaWiki fetcher.
 *
 * Licensed under GPL version 2
 *
 * @author Antoine "hashar" Musso, 2011
 * @author Timo Tijhof, 2011
 */

date_default_timezone_set( 'UTC' );

// Choose a mode below and the switch structure will forge options for you!
$mode = 'dev';
$mode = 'preprod';
#$mode = 'prod';


# Magic stuff for lazy people
switch( $mode ) {
	# Options for local debuggings
	case 'dev':
		$options = array(
			'debug' => true,
			'root'  => '/tmp/tsmw-trunk-dev',
			'svnUrl'   => 'http://svn.wikimedia.org/svnroot/mediawiki/trunk/tools/testswarm/scripts',
			'minRev' => 88439,  # will not fetch anything before that rev
		);
		break;

	# Options fetching from phase3. Debug on.
	case 'preprod':
		$options = array(
			'debug' => true,
			'root'  => '/tmp/tsmw-trunk-preprod',
			'svnUrl'   => 'http://svn.wikimedia.org/svnroot/mediawiki/trunk/phase3',
			'minRev' => 101591,
		);
		break;

	default:
		print "Mode $mode unimplemented. Please edit ".__FILE__."\n";
		exit( 1 );
}

require_once( 'testswarm-mw-fetcher.php' );

$main = new TestSwarmMWMain( $options );
$main->tryFetchNextRev();
