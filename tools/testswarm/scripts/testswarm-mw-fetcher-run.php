<?php
/**
 * Testswarm fetcher example.
 *
 * Licensed under GPL version 2
 *
 * @author Antoine "hashar" Musso © 2011
 */
require_once( "testswarm-mw-fetcher.php" );

// Choose a mode below and the switch structure will forge options for you!
#$mode = 'dev';
$mode = 'preprod';
#$mode = 'prod';


# Magic stuff for lazy people
switch( $mode ) {
	# Options for local debuggings
	case 'dev': $options = array(
		'debug' => true,
			'root'  => '/tmp/tsmw',
			'url'   => 'http://svn.wikimedia.org/svnroot/mediawiki/trunk/tools/testswarm/scripts',
			'minrevision' => 88439,  # will not fetch anything before that rev
		); break;

	# Options fetching from phase3. Debug on.
	case 'preprod':
		$options = array(
			'debug' => true,
			'root'  => '/tmp/tsmw-trunk',
			'url'   => 'http://svn.wikimedia.org/svnroot/mediawiki/trunk/phase3',
			'minrevision' => 101591,
		); break;

	default:
		print "Mode $mode unimplemented. Please edit ".__FILE__."\n";
		exit( 1 );
}

$fetcher = new TestSwarmMWFetcher( $options );
$fetcher->tryInstallNextRev();
