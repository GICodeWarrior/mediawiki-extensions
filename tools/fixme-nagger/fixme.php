#!/usr/bin/php
<?php
# ini file has to be read first to set $IP
$dot_ini = getenv( "HOME" ) . DIRECTORY_SEPARATOR . '.mediawiki.ini';
$fallback_path = dirname( dirname( dirname( realpath(__FILE__) ) ) ) . DIRECTORY_SEPARATOR . "phase3";
$conf = array();
$IP = "/";						/* so it is always set */
if( file_exists( $dot_ini ) ) {
	$conf = parse_ini_file( $dot_ini, INI_SCANNER_RAW );
	if ( $conf === false ) {
		exit( "Couldn't read $dot_ini!\n" );
	}

	if( isset( $conf['mwroot'] ) ) {
		$IP = $conf['mwroot'];
	} else if (file_exists( $fallback_path ) ) {
		$IP = $fallback_path;
	}
} else if( file_exists( $fallback_path ) ) {
	$IP = $fallback_path;
}
if ( file_exists( "$IP/LocalSettings.php" ) ) {
	define( "MW_CONFIG_FILE", "$IP/LocalSettings.php" );
} else {
	exit( "Couldn't find LocalSettings.php in $IP\n" );
}

require_once( "$IP/maintenance/Maintenance.php" );

class NagFixme extends Maintenance {

	public $template;
	public $fromAddy;

	public function __construct() {
		parent::__construct();
		global $conf;

		$this->mDescription = "Send nagging emails to everyone with FIXMEs in CR, Wikimedia Specific!";
		$this->addOption( 'noemail', 'Do not send any messages, only print what would be sent' );
		$this->addOption( 'template', 'The template file, defaults to template.txt or what is in the ini file' );

		$this->fromAddy = $conf['from'];
	}


	public function execute() {
		global $conf;

		if( $this->hasOption( "template" ) ) {
			$this->template = $this->getOption( "template" );
		} else if( isset( $conf['template'] ) ) {
			$this->template = $conf['template'];
		} else {
			$this->template = "template.txt";
		}

		if( file_exists( $this->template ) ) {
			$this->template = addcslashes(file_get_contents( $this->template ), '"');
		} else {
			exit( "Please create a template file in {$this->template}.\n" );
		}
		foreach($this->getFixmes() as $author => $revs) {
			echo "$author\n";
			$this->sendMail($author, $revs);
		}
	}

	/* Ugh, you know what would be good here? API access. */
	public function getFixmes() {
		global $conf;
		ini_set("user_agent", isset( $conf['ua'] ) ? $conf['ua'] : "some bogus user agent");
		$page = file_get_contents( $conf['fixmeUrl'] );

		$fixes = explode("<tr class=\"mw-codereview-status-fixme\">\n", $page);
		/* We don't care about what comes before the table of FIXMEs */
		array_shift($fixes);

		$bit = array();
		foreach($fixes as $fix) {
			$f = explode("</td>\n", $fix);
			$r = array();
			preg_match("/>([0-9]+)</", $f[0], $r);
			$rev = $r[1];
			preg_match('/class="TablePager_col_cr_message">(.*)/', $f[4], $r);
			$msg = preg_replace("/<[^>]*>/", "", html_entity_decode($r[1]));
			preg_match('/class="TablePager_col_cr_author.*author=([^"]+)"/', $f[5], $r);
			$author = $r[1];

			$bit[$author][$rev] = $msg;
		}

		return $bit;
	}

	public function getUserinfo( $author ) {
		global $conf;

		$ui = file_get_contents( $conf['userinfo'] . "$author" );
		$ret = array();
		foreach(explode("\n", $ui) as $l) {
			if($l != "") {
				list($name, $data) = explode(":", $l, 2);
				$data = trim($data);
				$name = trim($name);
				if($name == "email") {
					/* Obfuscate this! */
					$data = preg_replace("/ .?dot.? /i", '.',
						preg_replace("/ .?at.? /i", '@',
							preg_replace("/ who is a user at the host called /i", '@', $data)));
				}
				$ret[$name] = $data;
			}
		}

		if(!isset($ret['name'])) {
			$ret['name'] = $author;
		}

		return $ret;
	}

	public function sendMail($author, $revs) {
		$user = $this->getUserinfo($author);

		$commits = " Rev #: Commit message\n";
		foreach($revs as $r => $msg) {
			$commits .= "r{$r}: $msg\n";
		}

		$msg = eval("\$t = \"{$this->template}\"; return \$t;");

		if( !isset($user['email']) || stristr( $user['email'], '@' ) === false ) {
			echo "Please send a message to $author:\n$commits";
		} else {
			if( $this->hasOption( 'noemail' ) ) {
				echo "Would email $user[email] from " . $this->fromAddy. "\n";
				echo $msg;
			} else {
				mail( $user['email'], "Please fix your FIXMEs", $msg, false, "-f " . $this->fromAddy );
			}
		}
	}
}

$maintClass = "NagFixme";

require_once( RUN_MAINTENANCE_IF_MAIN );
