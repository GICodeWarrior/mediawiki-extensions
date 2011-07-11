<?php
# Locking system, do not start another check untill this one is finished
$lockFile = __DIR__ . '/lock.addjob';
if ( file_exists( $lockFile ) ) {
	die;
}
file_put_contents( $lockFile, date('r') );

# Start output
echo "\n--\n\n[" . date( 'r' )  . "]  start of do-svncheckaddjob.php:\n";

error_reporting(E_ALL);ini_set('display_errors', 1);
require_once( __DIR__ . '/testswarm-mediawiki-svn.php');

# Echo actual script return
echo doingStuff();

# End output
echo "\n[end of do-svncheckaddjob.php]\n\n";

# Locking system, clean up after we're done
# Comment out the following line to disable the updater
# (as next time it'll create a lock without unlocking)
unlink( $lockFile );
