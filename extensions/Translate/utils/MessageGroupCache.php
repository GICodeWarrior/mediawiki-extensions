<?php
/**
 * Code for caching the messages of file based message groups.
 * @file
 * @author Niklas Laxström
 * @copyright Copyright © 2009-2010 Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Caches messages of file based message group source file. Can also track
 * that the cache is up to date. Parsing the source files can be slow, so
 * constructing CDB cache makes accessing that data constant speed regardless
 * of the actual format. 
 */
class MessageGroupCache {
	/// \string 
	protected $group;
	/// CdbReader
	protected $cache;
	/// \string
	protected $code;

	/**
	 * Contructs a new cache object for given group and language code.
	 * @param $group \types{String,FileBasedMessageGroup} Group object or id.
	 * @param $code \string Language code. Default value 'en'.
	 */
	public function __construct( $group, $code = 'en' ) {
		if ( is_object( $group ) ) {
			$this->group = $group->getId();
		} else {
			$this->group = $group;
		}
		$this->code = $code;
	}

	/**
	 * Returns whether cache exists for this language and group.
	 * @return \bool
	 */
	public function exists() {
		return file_exists( $this->getCacheFileName() );
	}

	/**
	 * Returns list of message keys that are stored.
	 * @return \list{String} Message keys that can be passed one-by-one to get() method.
	 */
	public function getKeys() {
		return unserialize( $this->open()->get( '#keys' ) );
	}

	/**
	 * Returns timestamp in unix-format about when this cache was first created.
	 * @return \string Unix timestamp.
	 */
	public function getTimestamp() {
		return $this->open()->get( '#created' );
	}

	/**
	 * Get an item from the cache.
	 * @return \string
	 */
	public function get( $key ) {
		return $this->open()->get( $key );
	}

	/**
	 * Populates the cache from current state of the source file.
	 * @param $created \string Unix timestamp when the cache is created (for automatic updates).
	 */
	public function create( $created = false ) {
		$this->close(); // Close the reader instance just to be sure

		$group = MessageGroups::getGroup( $this->group );
		$messages = $group->load( $this->code );
		if ( !count( $messages ) ) {
			return; // Don't create empty caches
		}
		$hash = md5( file_get_contents( $group->getSourceFilePath( $this->code ) ) );

		$cache = CdbWriter::open( $this->getCacheFileName() );
		$keys = array_keys( $messages );
		$cache->set( '#keys', serialize( $keys ) );

		foreach ( $messages as $key => $value ) {
			$cache->set( $key, $value );
		}

		$cache->set( '#created',  $created ? $created : wfTimestamp() );
		$cache->set( '#updated',  wfTimestamp() );
		$cache->set( '#filehash', $hash );
		$cache->set( '#msgcount', count( $messages ) );
		$cache->set( '#msghash',  md5( serialize( ksort( $messages ) ) ) );
		$cache->set( '#version',  '3' );
		$cache->close();
	}

	/**
	 * Checks whether the cache still reflects the source file.
	 * It uses multiple conditions to speed up the checking from file
	 * modification timestamps to hashing.
	 * @return \bool Wether the cache is up to date.
	 */
	public function isValid() {
		$group = MessageGroups::getGroup( $this->group );
		$filename = $group->getSourceFilePath( $this->code );

		// Timestamp and existence checks
		if ( !$this->exists() ) {
			// Cache is valid if the file doesn't exist or doesn't have translations
			return !file_exists( $filename ) || !count( $group->load( $this->code ) );
		} elseif ( !file_exists( $filename ) ) {
			//$this->delete();
			return false;
		} else {
			// Cache is up-to-date if created after file was last modified
			return filemtime( $filename ) <= $this->get( '#updated' );
		}
		// From now on cache and source file exists, but source file mtime is newer
		$created = $this->get( '#created' );

		// File hash check
		$newhash = md5( file_get_contents( $filename ) );
		if ( $this->get( '#filehash' === $oldhash ) ) {
			// Update cache so that we don't need to compare hashes next time
			$cache->create( $created );
			return true;
		}

		// Message count check
		$messages = $group->load( $this->code );
		if ( $this->get( '#msgcount' ) !== count( $messages ) ) {
			// Number of messsages has changed
			return false;
		}

		// Content hash check
		if ( $this->get( '#msghash' ) === md5( serialize( ksort( $messages ) ) ) ) {
			// Update cache so that we don't need to do slow checks next time
			$cache->create( $createdat );
			return true;
		}
	
		return false;
	}

	/**
	 * Open the cache for reading.
	 * @return MessageGroupCache
	 */
	protected function open() {
		if ( $this->cache === null ) {
			$this->cache = CdbReader::open( $this->getCacheFileName() );
			if ( $this->cache->get( '#version' ) !== '3' ) {
				$this->updateCacheFormat( $this->cache );
				$this->close();
				return $this->open();
			}
		}
		return $this->cache;
	}

	/**
	 * Close the cache from reading.
	 */
	protected function close() {
		if ( $this->cache !== null ) {
			$this->cache->close();
			$this->cache = null;
		}
	}

	/**
	 * Returns full path the the cache file.
	 */
	protected function getCacheFileName() {
		return TranslateUtils::cacheFile( "translate_groupcache-{$this->group}-{$this->code}.cdb" );
	}

	/**
	 * Updates cache to cache format 2.
	 */
	protected function updateCacheFormat( $oldcache ) {
		// Read the data from the old format
		$conv = array(
			'#keys'     => $oldcache->get( '<|keys#>' ),
			'#created'  => $oldcache->get( '<|timestamp#>' ),
			'#updated'  => wfTimestamp(),
			'#filehash' => $oldcache->get( '<|hash#>' ),
			'#version'  => '3',
		);
		$conv['#msgcount'] = count( $conv['#keys'] );
		
		$messages = array();
		foreach ( unserialize( $conv['#keys'] ) as $key ) {
			$messages[$key] = $oldcache->get( $key );
		}

		$conv['#msghash'] = md5( serialize( ksort( $messages ) ) );
		$oldcache->close();

		// Store the data in new format
		$cache = CdbWriter::open( $this->getCacheFileName() );
		foreach ( $conv as $key => $value ) {
			$cache->set( $key, $value );
		}
		foreach ( $messages as $key => $value ) {
			$cache->set( $key, $value );
		}
		$cache->close();

	}

}
