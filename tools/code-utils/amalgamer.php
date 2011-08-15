<?php

/**
 * Basic class allowing to fetch codereview revisions metadata.
 */
class RevFetcher {
	/** How many revisions metadata we can fetch through the API
	 * NOT IMPLEMENTED YET!!!
	 */
	const FETCH_LIMIT = 50;
	/** Forged URL pointing to the API with correct parameters */
	private $apiurl = null;
	/** Local rev cache object */
	private $rev_cache;

	# Settings overridable on construction:

	// Path to MediaWiki API we will fetch revision from
	private $url = 'http://www.mediawiki.org/w/api.php' ;

	// A MediaWiki CodeReview repository
	private $repo = 'MediaWiki';


	/**
	 * On construction, you can override project URL (api.php) and code
	 * repository.
	 *
	 * Example:
	 *   $rv = new RevFetcher( array(
	 *       'url'  => 'http://www.mediawiki.org/w/api.php',
	 *       'repo' => 'mediawiki',
	 *   ) );
	 */
	public function __construct( $opts = array() )
	{
 		$this->rev_cache = new RevCache();

		if ( array_key_exists( 'url', $opts ) ) {
			$this->url = $opts['url'];
		}
		if ( array_key_exists( 'repo', $opts ) ) {
			$this->repo = $opts['repo'] ;
		}

		$this->apiurl = $this->url
			. "?action=query"
			. "&list=coderevisions"
			. "&crprop=revid|status|author"
			. "&crrepo={$this->repo}"
		;

		# MediaWiki API requries an user agent:
		ini_set( 'user_agent', 'MediaWiki Amalgamer by Hashar' );
	}

	# FIXME slice the array according to self::FETCH_LIMIT
	public function getRevisions( $reqRevs )
	{

		#  Normalize to array of revisions
		if ( is_int( $reqRevs ) ) {
			$reqRevs = array( $reqRevs );
		}

		print "Requesting   - " . join( ' | ', $reqRevs ) . "\n";

		$notInCache = array_diff_key( array_values( $reqRevs ), $this->rev_cache->allKeys() );
		print "  > MISSES - " . join( ' | ', $notInCache ) . "\n";

		$inCache    = array_diff_key( array_values( $reqRevs ), $notInCache );
		print "  > HITS   - " . join( ' | ', $inCache ) . "\n";

		if ( empty( $notInCache ) ) {
			print "Nothing to fetch. Used cache.\n";
			$fetched = array();
		} else {
			print "Fetching " . join( ' | ', $notInCache ) . "\n";
			# Forge URL
			$url = $this->apiurl
				. "&crrevs=" . join( '|', $notInCache )
			;
			$fetched =
				$this->reallyFetch( $url )
				->query->coderevisions ;
			$fetched = self::rekeyRevisions( $fetched );
			print "Fetched  " . join( ' | ', array_keys( $fetched ) ) . "\n";

			// Add fetched revisions to the cache
			foreach ( $fetched as $f ) {
				$this->rev_cache->add( $f->revid, $f );
			}
		}

		// return fetched + cached
		return array_merge( $inCache, $fetched );
	}

	public static function rekeyRevisions( $fetched )
	{
		$rekeyed = array();
		foreach ( $fetched as $r ) {
			$rekeyed[$r->revid] = $r;
		}
		return $rekeyed;
	}

	/**
	 * @param $url API url
	 * @ return array
	*/
	private function reallyFetch( $url )
	{
		$url .= "&format=json";
		// print "Fetching: $url\n";
		$data = json_decode( file_get_contents( $url ) );
		return $data;
	}
}

/** dumb caching system to avoid harming remote server */
class RevCache {
	# Array of revisions
	private $cache = array();

	# Enable debug messages
	private $enableDebug = false;

	/**
	 * Option 'debug'
	 */
	function __construct( $opt = array() )
	{
		$this->enableDebug = array_key_exists( 'debug', $opt );
	}

	/** While debugging, dump cached keys on destruction */
	function __destruct()
	{
		if ( $this->enableDebug ) {
			print "_____________________________________________\n";
			print "Dumping the revision cache before destruction\n";
			print join( ' | ', $this->allKeys() ) . "\n";
		}
	}

	/** helper : show a debugging message */
	private function debug( $msg )
	{
		if ( !$this->enableDebug ) { return; }
		print "cache> $msg\n";
	}


	#### PUBLIC METHODS ##########################################

	public function add( $key, $data )
	{
		$this->debug( "adding key '$key'" );
		$this->cache[$key] = $data;
	}

	public function del( $key )
	{
		$this->debug( "deleting key '$key'" );
		unset( $this->cache[$key] );
	}

	public function get( $key )
	{
		$this->debug( "getting key '$key'" );
		return $this->cache[$key];
	}

	public function hasKey( $key )
	{
		return array_key_exists( $key, $this->cache );
	}

	public function allKeys()
	{
		if ( !$this->cache ) { return array(); }

		return array_keys( $this->cache );
	}


}


$revs = array( 92286, 92289 );
$f = new RevFetcher();
$f->getRevisions( $revs );
print "NOW FETCHING  92286,  should be in cache!!!!!!!!!!!!!!!!!!!!!\n";
$f->getRevisions( 92286 );

