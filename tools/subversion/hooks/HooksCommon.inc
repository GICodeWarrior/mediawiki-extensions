<?php
/**
 * Utility class for things relating to commits and their tests.
 */
class CommitInfo {
	/**
	 * Subversion repository path
	 * @var string
	 */
	protected $repo;

	/**
	 * Transaction number
	 * @var int
	 */
	protected $transaction;

	/**
	 * Location of svnlook, in case it's not in $PATH
	 * @var string
	 */
	protected $svnlook = '/usr/bin/svnlook';

	/**
	 * Location of PHP binary, in case it's not in $PATH
	 * @var string
	 */
	protected $php = '/usr/bin/php';

	/**
	 * Tests to run, with their configuration
	 */
	protected $preCommitTests = array(
		'testLogMessageLength' => array(
			1, /** min length **/
			'[a-z0-9]+' /** regex to check **/
		),
		'testPHPLint' => array(
			array( 'php', 'php5', 'phtml', 'inc' ), /** valid types to check **/
		),
	);

	/**
	 * Places to ping after a commit has completed (CR, CI, etc)
	 */
	protected $postCommitPings = array(

	);

	/**
	 * Class constructor
	 *
	 * @param $repo String name of repository
	 * @param txn
	 */
	public function __construct( $repo, $txn ) {
		$this->repo = $repo;
		$this->transaction = $txn;
	}

	/**
	 * Run SVN pre-commit tests
	 *
	 * @return int
	 */
	public function runPreCommitTests() {
		$result = 0;
		$messages = '';
		foreach( $this->preCommitTests as $test => $params ) {
			$msg = call_user_func_array( array( $this, $test ), $params );
			if( $msg !== true ) {
				$messages .= "$msg\n";
				$result++;
			}
		}
		if ( $result ) {
			$messages = rtrim( $messages );
			fwrite( STDERR, "----------------\n$messages\n----------------" );
		}
		return $result;
	}

	/**
	 * Get commit log message
	 *
	 * @return string
	 */
	private function getLogMessage() {
		$output = null;
		$cmd = "{$this->svnlook} log -t '{$this->transaction}' '{$this->repo}'";
		exec( $cmd, $output );
		return implode( $output );
	}

	/**
	 * Get commit files list
	 *
	 * @return array filenames are keys and status letters are values
	 */
	protected function getCommitList() {
		$output = null;
		$cmd = "{$this->svnlook} changed -t '{$this->transaction}' '{$this->repo}'";
		exec( $cmd, $output );

		$list = array();
		foreach( $output as $item ) {
			$pos = strpos( $item, ' ' );
			$status = substr( $item, 0, $pos );
			$file = trim( substr( $item, $pos ) );
			$list[$file] = $status;
		}
		return $list;
	}

	/**
	 * Get array of modified and added files
	 *
	 * @param $fileTypes array of file types used for filtering
	 * @return array
	 */
	protected function getChangedFiles( array $fileTypes = array() ) {
		$list = $this->getCommitList();
		$files = array();
		foreach ( $list as $file => $status ) {
			if ( 'D' == $status || substr( $file, -1 ) == DIRECTORY_SEPARATOR ) {
				continue;
			}
			$files[] = $file;
		}

		$matchingChangedFiles = array();
		foreach( $files as $file ) {
			$extension = strtolower( pathinfo( $file, PATHINFO_EXTENSION ) );
			if ( $fileTypes && !in_array( $extension, $fileTypes ) ) {
				continue;
			}
			$matchingChangedFiles[$file] = $extension;
		}
		return $matchingChangedFiles;
	}

	/**
	 * Check if log message validates length rules
	 *
	 * @param $minLength int minimum length of log message
	 * @param $regex string
	 *
	 * @return bool
	 */
	protected function testLogMessageLength( $minLength = 1, $regex = '' ) {
		$msg = trim( $this->getLogMessage() );
		$length = strlen( $msg );
		if ( $length < $minLength ) {
			if ( $minLength <= 1 ) {
				return "Log message should not be empty. Please specify descriptive log message.";
			} else {
				return "You log message is too short ($length). It should be at least $minLength characters long.";
			}
		} elseif( !preg_match( "/$regex/i", $msg ) ) {
			return "Please provide a descriptive commit message with letters.";
		}
		return true;
	}

	/**
	 * @param $fileTypes array
	 * @return bool|string
	 */
	protected function testPHPLint( $fileTypes ) {
		$output = null;
		$result = '';
		$changedFiles = $this->getChangedFiles( $fileTypes );
		foreach( $changedFiles as $file => $ext ) {
			$cmd = "{$this->php} -l $file";
			exec( $cmd, $output );
			foreach( $output as $item ) {
				if( strpos( trim( $item ), 'No syntax errors detected in' ) === false ) {
					$result .= "$item\n";
				}
			}
		}
		return $result !== '' ? $result : true;
	}
}
