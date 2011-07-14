<?php

class MWMultiVersion {
	/**
	 * @var MWMultiVersion
	 */
	private static $mwversion;

	private $site;
	private $lang;

	/**
	 * To get an inststance of this class, use the statuc helper methods.
	 * @see getInstanceForWiki
	 * @see getInstanceForUploadWiki
	 */
	private function __construct() {}
	private function __clone() {}

	/**
	 * Factory method to get an instance of MWMultiVersion. 
	 * Use this for all wikis except calls to /w/thumb.php on upload.wikmedia.org.
	 * @param $serverName the ServerName for this wiki -- $_SERVER['SERVER_NAME']
	 * @param $docroot the DocumentRoot for this wiki -- $_SERVER['DOCUMENT_ROOT']
	 * @return An MWMultiVersion object for this wiki
	 */
	public static function getInstanceForWiki( $serverName, $docRoot ) {
		if ( !isset( self::$mwversion ) ) {
			self::$mwversion = new self;
			self::$mwversion->setSiteInfoForWiki( $serverName, $docRoot );
		}
		return self::$mwversion; 
	}

	/**
	 * Factory method to get an instance of MWMultiVersion used for calls to /w/thumb.php on upload.wikmedia.org.
	 * @param $pathInfo the PathInfo -- $_SERVER['PATH_INFO']
	 * @return An MWMultiVersion object for the wiki derived from the pathinfo
	 */
	public static function getInstanceForUploadWiki( $pathInfo ) {
		if ( !isset( self::$mwversion ) ) {
			self::$mwversion = new self;
			self::$mwversion->setSiteInfoForUploadWiki( $PathInfo );
		}
		return self::$mwversion;
	}

	/**
	 * Factory method to get an instance of MWMultiVersion
	 * via maintenance scripts since they need to set site and lang.
	 * @return An MWMultiVersion object for the wiki derived from the env variables set by Maintenance.php
	 */
	public static function getInstanceForMaintenance() {
		if ( !isset( self::$mwversion ) ) {
			self::$mwversion = new self;
			self::$mwversion->setSiteInfoForMaintenance();
		}
		return self::$mwversion;
	}

	/**
	 * Derives site and lang from the parameters and sets $site and $lang on the instance
	 *  @param $serverName the ServerName for this wiki -- $_SERVER['SERVER_NAME']
	 *  @param $docroot the DocumentRoot for this wiki -- $_SERVER['DOCUMENT_ROOT']
	 */
	private function setSiteInfoForWiki( $serverName, $docRoot ) {
		$secure = getenv( 'MW_SECURE_HOST' );
		$matches = array();
		if ( $secure ) {
			if ( !preg_match('/^([^.]+).([^.]+).*$/', $secure, $matches ) ) {
				die("invalid hostname");
			}
			$this->lang = $matches[1];
			$this->site = $matches[2];

			// @TODO: move/use some dblist?
			if (in_array($this->lang, array("commons", "grants", "sources", "wikimania", "wikimania2006", "foundation", "meta")))
			$this->site = "wikipedia";
		} else {
			$this->site = "wikipedia";	
			if ( preg_match( '/^(?:\/usr\/local\/apache\/|\/home\/wikipedia\/)(?:htdocs|common\/docroot)\/([a-z]+)\.org/', $docRoot, $matches ) ) {
				$this->site = $matches[1];
				if ( preg_match( '/^(.*)\.' . preg_quote( $this->site ) . '\.org$/', $serverName, $matches ) ) {
					$this->lang = $matches[1];
					// For some special subdomains, like pa.us
					$this->lang = str_replace( '.', '-', $this->lang );
				} else if ( preg_match( '/^(.*)\.prototype\.wikimedia\.org$/', $serverName, $matches ) ) {
					$this->lang = $matches[1];
				} else {
					die( "Invalid host name ($serverName), can't determine language" );
				}
			} elseif ( preg_match( "/^\/usr\/local\/apache\/(?:htdocs|common\/docroot)\/([a-z0-9\-_]*)$/", $docRoot, $matches ) ) {
				$this->site = "wikipedia";
				$this->lang = $matches[1];
			} else {
				die( "Invalid host name (docroot=" . $_SERVER['DOCUMENT_ROOT'] . "), can't determine language" );
			}
		}
	}

	/**
	 * Derives site and lang from the parameter and sets $site and $lang on the instance
	 * @param $pathInfo the PathInfo -- $_SERVER['PATH_INFO']
	 */
	private function setSiteInfoForUploadWiki( $pathInfo ) {
		// @TODO: error if we don't get what we expect
		$pathBits = explode( '/', $pathInfo );
		$this->site = $pathBits[1];
		$this->lang = $pathBits[2];
	}
	
	/**
	 * Gets the site and lang from env variables
	 */
	private function setSiteInfoForMaintenance() {
		// @TODO: some error checking
		$this->site = getenv( 'wikisite' );
		$this->lang = getenv( 'wikilang' );
	}

	/**
	 * Get the site for this wiki
	 * @return String site. Eg: wikipedia, wikinews, wikiversity
	 */
	public function getSite() {
		return $this->site;
	}

	/**
	 * Get the lang for this wiki
	 * @return String lang Eg: en, de, ar, hi
	 */
	public function getLang() {
		return $this->lang;
	}

	/**
	 * If in env variable MW_DBNAME is found then use that,
	 * otherwise derive dbname from lang and site
	 * @return String the database name
	 */
	public function getDatabase() {
		$dbname = getenv( 'MW_DBNAME' );
		if ( strlen( $dbname ) == 0 ) {
			if ( $this->site == "wikipedia" ) {
				$dbSuffix = "wiki";
			} else {
				$dbSuffix = $this->site;
			}
			$dbname = str_replace( "-", "_", $this->lang . $dbSuffix );
			putenv( 'MW_DBNAME=' . $dbname );
		}
		return $dbname;
	
	}
	
	/**
	 * Get the version as specified in a cdb file located in /usr/local/apache/common/wikiversions.db
	 * The key should be the dbname and the version should be the version directory for this wiki
	 * @return String the version wirectory for this wiki
	 */
	public function getVersion() {
		$dbname = $this->getDatabase( $this->site, $this->lang );
		$db = dba_open( '/usr/local/apache/common/wikiversions.db', 'r', 'cdb' );
		if ( $db ) {
			$version = dba_fetch( $dbname, $db );
		} else {
			//don't error for now
			//trigger_error( "Unable to open /usr/local/apache/common/wikiversions.db. Assuming php-1.17", E_USER_ERROR );
			$version = 'php-1.17';
		}
		return $version;
	}
}
