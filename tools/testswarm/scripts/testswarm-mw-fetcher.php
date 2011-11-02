<?php
/**
 * Script to prepare a MediaWiki-install from svn for TestSwarm testing.
 *
 * As of November 2nd 2011, this is still a work in progress.
 *
 * Latest version can be found in the Mediawiki repository under
 *  /trunk/tools/testswarm/
 *
 * Based on http://svn.wikimedia.org/viewvc/mediawiki/trunk/tools/testswarm/scripts/testswarm-mediawiki-svn.php?revision=94359&view=markup
 * (which only did a static dump of /resources and /tests/qunit).
 *
 * @author Timo Tijhof, 2011
 * @author Antoine "hashar" Musso, 2011
 */

/**
 * One class doing everything! :D
 *
 * Subversion calls are made using the svn binary so we do not need
 * to install any PECL extension.
 *
 * @todo We might want to abstract svn commands to later use git
 * @todo FIXME: Get the classes/function implied from MediaWiki somehow.
 *
 * @example:
 * @code
 *   $options = array(
 *     'root' => '',
 *     'url' => 'http://svn.wikimedia.org/svnroot/mediawiki/trunk/phase3',
 *   );
 *   $fetcher = new TestSwarmMWFetcher( $options );
 *   $fetcher->tryInstallNextRev();
 * @endcode
 */
class TestSwarmMWFetcher {

	/** Base path to run into */
	protected $root;
	/** URL to a subversion repository as supported by the Subversion cli */
	protected $url;
	/** subversion command line utility */
	protected $svnCmd = '/usr/bin/svn';
	/** whether to enable debugging */
	protected $debugEnabled = false;
	/** hold previous path when chdir() to a checkout directory */
	protected $savedPath = null;
	/** Minimum revision to start with. At least 1 */
	protected $minRevision = 1;

	/**
	 * Init the testswarm fetcher.
	 *
	 * @param @options Array: Required options are:
	 *  'root' => root path where all stuff happens
	 *  'url' => URL for the repository
	 * Other options:
	 *  'svnCmd' => path/to/svn (default: /usr/bin/svn)
	 *  'debug' => true/false
	 *  'minrevision' => int (revision to start at)
	 */
	function __construct( $options = array() ) {

		// Verify we have been given required options
		if(    !isset( $options['root'] )
			&& !isset( $options['url'] )
		) {
			throw new Exception( __METHOD__ . ": " . __CLASS__ . " constructor must be passed 'root' and 'url' options\n" );
		}
		$this->root       = $options['root'];
		$this->url        = $options['url'];

		// and now the optional options 
		if( isset($options['svnCmd'] ) ) {
			$this->svnCmd = $options['svnCmd'];
		}
		if( isset($options['debug'] ) ) {
			$this->debugEnabled = true;
		}
		if( isset($options['minrevision'] ) ) {
			if( $options['minrevision'] < 1 ) {
				# minrevision = 0 will just screw any assumption made in this script.
				# so we really do not want it.
				throw new Exception( __METHOD__ . ": " . __CLASS__ . " option 'minrevision' must be >= 1 \n" );
			}
			$this->minRevision = $options['minrevision'];
		}
	}

	/**
	 * Try to install the next revision after our latest install.
	 * This is the main entry point after construction.
	 */
	function tryInstallNextRev() {
		// Setup checkouts dir if it does not exist yet (happens on initial run).
		$checkouts = "{$this->root}/checkouts";
		if( !file_exists( $checkouts ) ) {
			$this->mkdir( $checkouts );
		}

		// Now find out the next revision in the remote repository
		$next = $this->getNextRevisionId();
		if ( !$next ) {
			$this->debug( __METHOD__ . " no next revision." );
			return false;
		} else {
			// And install it
			return $this->doInstallById( $next );
		}
	}

	/**
	 * This is the main function doing checkout and installation for
	 * a given rev.
	 *
	 * @param $id integer: Revision id to install
	 * @return
	 */
	function doInstallById( $id ) {
		if( !is_int( $id ) ) {
			throw new Exception( __METHOD__ . " passed a non integer revision number\n" );
		}

		$this->doCheckout( $id );
		$this->doInstall( $id );
		$this->doAppendSettings( $id );

		# TODO:
		// get list of tests (see the current file in svn/trunk/tools)
		// request to testswarm to add jobs to run these tests
		// --> 'api' POST request to TestSwarm/addjob.php (with login/auth token)
	}

	/**
	 * Checkout a given revision in our specific tree.
	 * Throw an exception if anything got wrong.
	 * @todo Output is not logged.
	 *
	 * @param $id integer: Revision id to checkout.
	 */
	function doCheckout( $id ){
		$this->msg( "Checking out r{$id}" );

		// create checkout directory
		$revPath = self::getPath( 'mw', $id );
		$this->mkdir( $revPath );

		# TODO FIXME : we might want to log the output of svn commands
		$cmd = "{$this->svnCmd} checkout {$this->url}@r{$id} {$revPath}";
		$this->exec( $cmd, $retval );
		if( $retval !== 0 ) {
			throw new Exception(__METHOD__." error running subversion checkout.\n" );
		}

		// TODO handle errors for above commands.
		// $this->getPath( 'log' );
	}

	/**
	 * Install a given revision.
	 *
	 * @param $id integer: Revision id to run the installer for.
	 */
	function doInstall( $id ) {
		$this->msg( "Installing r{$id}" );

		# Create database directory (needed on initial run)
		$this->mkdir(
			$this->getPath( 'db', $id )
		);

		# Erase MW_INSTALL_PATH which would interact with the install script
		putenv( "MW_INSTALL_PATH" );

		// Now simply run the CLI installer:
		$cmd = "php {$this->getPath( 'mw', $id )}/maintenance/install.php \
			--dbname=testwarm_mw_r{$id} \
			--dbtype=sqlite \
			--dbpath={$this->getPath( 'db', $id )} \
			--pass=testpass \
			--showexceptions=true \
			--confpath={$this->getPath( 'mw', $id )} \
			WIKINAME \
			ADMINNAME
			";
		$output = $this->exec( $cmd, $retval );

		print "Installer output for r{$id}:\n";
		print $output;

		if( $retval !== 0 ) {
			throw new Exception(__METHOD__." error running MediaWiki installer.\n" );
		}
	}

	/**
	 * TODO: implement :-)
	 * @param $id integer: Revision id to append settings to.
	 */
	function doAppendSettings( $id ) {
		$this->msg( "Appending settings for r{$id} installation (not implemented)" );
		return true;

		# Notes for later implementation:

		// append to mwPath/LocalSettings.php
		// -- contents of LocalSettings.tpl.php
		// -- require_once( '{$this->getPath('globalsettings')}' );"

		/**
		 * Possible additional common settings to append to LocalSettings after install:
		 * See gerrit integration/jenkins.git :
		 *  https://gerrit.wikimedia.org/r/gitweb?p=integration/jenkins.git;a=tree;f=jobs/MediaWiki-phpunit;hb=HEAD
		 *
		 * $wgShowExceptionDetails = true;
		 * $wgShowSQLErrors = true;
		 * #$wgDebugLogFile = dirname( __FILE__ ) . '/build/debug.log';
		 * $wgDebugDumpSql = true;
		 */
	}

	/**
	 * Utility function to log a message for a given id
	 *
	 * @param $msg String message to log. Will be prefixed with date("c")
	 * @param $id Integer Revision id.
	 */
	function log( $msg, $id ) {
		$file = $this->getLogFile( $id );
		// append stuff to logfile
		fopen( $file, "w+" );
		fwrite( date("c").$msg, $file );
		fclose( $file );
	}

	/**
	 * Utility function to output a dated message
	 *
	 * @param $msg String message to show. Will be prefixed with date("c")
	 */
	function msg( $msg ) {
		print date("c") . " $msg\n";
	}

	/**
	 * Print a message to STDOUT when debug mode is enabled
	 * Messages are prefixed with "DEBUG> "
	 * Multi lines messages will be prefixed as well.
	 *
	 * @param $msg string Message to print
	 */
	function debug( $msg ) {
		if( !$this->debugEnabled ) {
			return;
		}
		foreach( explode( "\n", $msg ) as $line ) {
			print "DEBUG> $line\n";
		}
	}

	/** unused / unneeded? @author Antoine Musso */
	function changePath( $path ) {
		if( $this->savedPath !== null ) {
			throw new Exception( __METHOD__ . " called but a saved path exist '" . $this->savedPath ."' Did you forget to call restorePath()?\n");
		}
		$this->debug( "chdir( $path )" );

		$oldPath = getcwd();
		if( chdir( $path ) ) {
			$this->savedPath = $oldPath;
		} else {
			throw new Exception( __METHOD__ . " failed to chdir() to $path\n" );
		}
	}

	/** unused / unneeded? @author Antoine Musso */
	function restorePath() {
		if( $this->savedPath === null ) {
			return false;
		}
		chdir( $this->savedPath );
	}

	/**
	 * Execute a command!
	 * Ripped partially from wfExec()
	 * throw an exception if anything goes wrong.
	 *
	 * @param $cmd string Command which will be passed as is (no escaping FIXME)
	 * @param &$retval reference Will be given the command exit level
	 * @return Command output.
	 */
	function exec( $cmd, &$retval = 0 ) {
		$this->debug( __METHOD__ . " $cmd" );

		// Pass command to shell and use ob to fetch the output
		ob_start();
		passthru( $cmd, $retval );
		$output = ob_get_contents();
		ob_end_clean();

		if( $retval == 127 ) {
			throw new Exception( __METHOD__ . "probably missing executable. Check env.\n" );
		}

		return $output;
	}

	/**
	 * Create a directory including parents
	 *
	 * @param $path String Path to create ex: /tmp/my/foo/bar 
	 */
	function mkdir( $path ) {
		$this->debug( __METHOD__ . " mkdir( $path )" );
		if(!file_exists( $path ) ) {
			if( mkdir( $path, 0777, true ) ) {
				$this->debug( __METHOD__ . ": Created directory $path" );
			} else {
				throw new Exception( __METHOD__ . " Error creating directory $path\n" );
			}
		} else {
			$this->debug( __METHOD__ . " mkdir( $path ). Path already exist." );
		}
	}

	/** unused / unneeded? @author Antoine Musso */
	function getLogFile( $id ) {
		return $logfile = $this->getPath( 'log', $id ). "/debug.log";
	}

	/** UTILITY FUNCTIONS **/

	/**
	 * Get next changed revision for a given checkout
	 * @return String|Boolean: false if nothing changed, else the upstream revision just after.
	 */
	function getNextRevisionId() {
		$cur = $this->getCurrentRevisionId();
		if( $cur === null ) {
			$this->debug( __METHOD__ . " checkouts dir empty? Looking up remote repo." );
			$next = $this->getFirstRevision();
		} else {
			$next = $this->getRevFollowing( $cur );
		}

		$this->debug( __METHOD__ . " returns $next" );
		return $next;
	}

	function getFirstRevision() {
		$start = $this->minRevision - 1;
		$firstRevision = $this->getRevFollowing( $start );
		$this->debug( __METHOD__ . " using first revision '$firstRevision'" );
		return $firstRevision;
	}

	function getRevFollowing( $id ) {
		$nextRev = $id + 1;
		// FIXME looking up for 1:HEAD takes a loooooooongg time
		$cmd = "{$this->svnCmd} log -q -r{$nextRev}:HEAD --limit 1 {$this->url}";
		$output = $this->exec( $cmd, $retval );

		if( $retval !== 0 ) {
			throw new Exception(__METHOD__." error running subversion log.\n" );
		}

		preg_match( "/r(\d+)/m", $output, $m );
		$followingRev = (int) $m[1];
		if( $followingRev === 0  ) {
			throw new Exception( __METHOD__ . " remote gave us non integer revision: '{$m[1]}'\n" );
		}
		return $followingRev;
	}
	/**
	 * Get latest revision fetched in the working copy.
	 * @return integer
	 */
	function getCurrentRevisionId() {
		$checkoutsDir = dirname( $this->getPath( 'mw', 0 ) );
		// scandir sort in descending order if passing a nonzero value
	   // PHP 5.4 accepts constant SCANDIR_SORT_DESCENDING
		$dirs = scandir( $checkoutsDir, 1 );
		$this->debug( "From '$checkoutsDir' Got directories:\n".implode("\n", $dirs ) );
		// On first run, we will have to take care of that.
		if ( $dirs[0][0] === 'r' ) {
			return substr( $dirs[0], 1 );
		} else {
			return null;
		}
	}

	/**
	 * This function is where most of the directory layout is kept
	 * All other methods should use getPath whenever they are looking for a path
	 *
	 * @param $type string: Resource to fetch:
	 *   'db': path to DB dir to put testwarm_mw_r123.sqlite file in
	 *   'mw': path to MW dir
	 *   'globalsettings': path to global settings file
	 *   'localsettingstpl': path to LocalSettings.php template file
	 *   'log': path to log file
	 * @param $id integer: Revision number.
	 * @return Full path to ressource or 'false'
	 */
	function getPath( $type, $id ) {
		if (   !in_array( $type, array( 'globalsettings', 'localsettingstpl' ) )
			&& !is_int( $id ) ) {
			throw new Exception( __METHOD__ . "given non numerical revision" );
		}

		switch ( $type ) {

		case 'db':
			return "{$this->root}/dbs/";

		case 'mw':
			return "{$this->root}/checkouts/r{$id}";

		case 'globalsettings':
			return "{$this->root}/conf/GlobalSettings.php";

		case 'localsettingstpl':
			return "{$this->root}/conf/LocalSettings.tpl.php";

		case 'log':
			return "{$this->root}/log/r{$id}";

		default:
			return false;
		}
	}
}

# Remaning notes from design session. Leave them for now unless you are Timo.
/** GENERAL:
format: php
Directory structure:
dbs/
testswarm_mw_r123.sqlite
conf/
GlobalSettings.php
// global conf, empty in most cases. Could be used to globally do something important
LocalSettingsTemplate.php
// copied/appended to LocalSettings.php that install.php makes
checkouts/
// publicly available through Apache; symlinked to /var/www/testswarm-mw
r123/
 */

/** INIT:
get latest svn revision number for trunk/phase3
you want the next changed revision. Not the latest.
svn log -r BASE:HEAD -l 2 -q
I didn't even know that was an option, even better (no risk of missing a rev if > 1 commit between runs). Awesome!
If BASE is at HEAD, you will only get one line though. So need to verify!
Getting the latest checked out directory is all about ls -1 | tail -1
check: already checked out ? Abort otherwise
(file_exists(checkouts/r...)
svn checkout (or export) into the checkouts/r..
 */

