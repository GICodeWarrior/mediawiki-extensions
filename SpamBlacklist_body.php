<?php

if ( defined( 'MEDIAWIKI' ) ) {

class SpamBlacklist {
	var $regex = false;
	var $previousFilter = false;
	var $files = array();
	var $warningTime = 600;
	var $expiryTime = 900;
	var $warningChance = 100;
	
	function SpamBlacklist( $settings = array() ) {
		global $IP;
		$this->files = array( "http://meta.wikimedia.org/w/index.php?title=Spam_blacklist&action=raw&sb_ver=1" );

		foreach ( $settings as $name => $value ) {
			$this->$name = $value;
		}
	}

	function &getRegex() {
		global $wgMemc, $wgDBname, $messageMemc;
		$fname = 'SpamBlacklist::getRegex';
		wfProfileIn( $fname );

		if ( $this->regex !== false ) {
			return $this->regex;
		}

		wfDebug( "Loading spam regex..." );
		
		if ( !is_array( $this->files ) ) {
			$this->files = array( $this->files );
		}
		if ( count( $this->files ) == 0 ){ 
			# No lists
			wfDebug( "no files specified\n" );
			wfProfileOut( $fname );
			return false;
		}

		# Refresh cache if we are saving the blacklist
		$recache = false;
		foreach ( $this->files as $fileName ) {
			if ( preg_match( '/^DB: (\w*) (.*)$/', $fileName, $matches ) ) {
				if ( $wgDBname == $matches[1] && $this->title && $this->title->getPrefixedDBkey() == $matches[2] ) {
					$recache = true;
					break;
				}
			}
		}

		if ( $this->regex === false || $recache ) {
			if ( !$recache ) {
				$this->regex = $wgMemc->get( "spam_blacklist_regex" );
			}
			if ( !$this->regex ) {
				# Load lists
				$lines = array();
				wfDebug( "Constructing spam blacklist\n" );
				foreach ( $this->files as $fileName ) {
					if ( preg_match( '/^DB: (\w*) (.*)$/', $fileName, $matches ) ) {
						if ( $wgDBname == $matches[1] && $this->title && $this->title->getPrefixedDBkey() == $matches[2] ) {
							$lines = array_merge( $lines, explode( "\n", $this->text ) );
						} else {
							$lines = array_merge( $lines, $this->getArticleLines( $matches[1], $matches[2] ) );
						}
						wfDebug( "got from DB\n" );
					} elseif ( preg_match( '/^http:\/\//', $fileName ) ) {
						# HTTP request
						# To keep requests to a minimum, we save results into $messageMemc, which is
						# similar to $wgMemc except almost certain to exist. By default, it is stored
						# in the database
						#
						# There are two keys, when the warning key expires, a random thread will refresh
						# the real key. This reduces the chance of multiple requests under high traffic 
						# conditions.
						$key = "spam_blacklist_file:$fileName";
						$warningKey = "$wgDBname:spamfilewarning:$fileName";
						$httpText = $messageMemc->get( $key );
						$warning = $messageMemc->get( $warningKey );

						if ( !is_string( $httpText ) || ( !$warning && !mt_rand( 0, $this->warningChance ) ) ) {
							wfDebug( "Loading spam blacklist from $fileName\n" );
							$httpText = $this->getHTTP( $fileName );
							$messageMemc->set( $warningKey, 1, $this->warningTime );
							$messageMemc->set( $key, $httpText, $this->expiryTime );
						} else {
							wfDebug( "got from HTTP cache\n" );
						}						
						$lines = array_merge( $lines, explode( "\n", $httpText ) );
					} else {
						$lines = array_merge( $lines, file( $fileName ) );
						wfDebug( "got from file\n" );
					}
				}

				# Strip comments and whitespace, then remove blanks
				$lines = array_filter( array_map( 'trim', preg_replace( '/#.*$/', '', $lines ) ) );

				# No lines, don't make a regex which will match everything
				if ( count( $lines ) == 0 ) {
					wfDebug( "No lines\n" );
					$this->regex = true;
				} else {
					# Make regex
					# It's faster using the S modifier even though it will usually only be run once
					$this->regex = 'http://+[a-z0-9_\-.]*(' . implode( '|', $lines ) . ')';
					$this->regex = '/' . str_replace( '/', '\/', preg_replace('|\\\*/|', '/', $this->regex) ) . '/Si';
				}
				$wgMemc->set( "spam_blacklist_regex", $this->regex, $this->expiryTime );
			} else {
				wfDebug( "got from cache\n" );
			}
		} 
		if ( $this->regex[0] != '/' || substr( $this->regex, -3 ) != '/Si' ) {
			// Corrupt regex
			wfDebug( "Corrupt regex\n" );
			$this->regex = false;
		}
		wfProfileOut( $fname );
		return $this->regex;
	}
	
	function filter( &$title, $text, $section ) {
		global $wgArticle, $wgVersion, $wgOut;

		$fname = 'wfSpamBlacklistFilter';
		wfProfileIn( $fname );

		# Call the rest of the hook chain first
		if ( $this->previousFilter ) {
			$f = $this->previousFilter;
			if ( $f( $title, $text, $section ) ) {
				wfProfileOut( $fname );
				return true;
			}
		}

		$this->title = $title;
		$this->text = $text;
		$this->section = $section;

		$regex =& $this->getRegex();

		if ( $regex && $regex[0] == '/' ) {
			# Strip SGML comments out of the markup
			# This was being used to circumvent the filter (see bug 5185)
			$text = preg_replace( '/<\!--.*-->/', '', $text );

			# Do the match
			wfDebug( "Checking text against regex: $regex\n" );
			if ( preg_match( $regex, $text, $matches ) ) {
				wfDebug( "Match!\n" );
				EditPage::spamPage( $matches[0] );
				$retVal = true;
			} else {
				$retVal = false;
			}
		} else {
			$retVal = false;
		}

		wfProfileOut( $fname );
		return $retVal;
	}

	function getArticleLines( $db, $article ) {
		global $wgDBname;
		$dbr = wfGetDB( DB_READ );
		$dbr->selectDB( $db );
		$text = false;
		if ( $dbr->tableExists( 'page' ) ) {
			// 1.5 schema
			$dbw =& wfGetDB( DB_READ );
			$dbw->selectDB( $db );
			$revision = Revision::newFromTitle( Title::newFromText( $article ) );
			if ( $revision ) {
				$text = $revision->getText();
			}
			$dbw->selectDB( $wgDBname );
		} else {
			// 1.4 schema
			$cur = $dbr->tableName( 'cur' );
			$title = Title::newFromText( $article );
			$text = $dbr->selectField( 'cur', 'cur_text', array( 'cur_namespace' => $title->getNamespace(),
				'cur_title' => $title->getDBkey() ), 'SpamBlacklist::getArticleLines' );
		}
		$dbr->selectDB( $wgDBname );
		if ( $text !== false ) {
			return explode( "\n", $text );
		} else {
			return array();
		}
	}

	function getHTTP( $url ) {
		// Use wfGetHTTP from MW 1.5 if it is available
		include_once( 'HttpFunctions.php' );
		if ( function_exists( 'wfGetHTTP' ) ) {
			$text = wfGetHTTP( $url );
		} else {
			$url_fopen = ini_set( 'allow_url_fopen', 1 );
			$text = file_get_contents( $url );
			ini_set( 'allow_url_fopen', $url_fopen );
		}
		return $text;
	}
}

	
} # End invocation guard
?>
