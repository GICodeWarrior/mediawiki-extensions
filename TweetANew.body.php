<?php
if (!defined('MEDIAWIKI')) die();
/**
 * Class file for the TweetANew extension
 *
 * @addtogroup Extensions
 * @author Joachim De Schrijver
 * @license LGPL
 * ToDo - many listed below - general removal of duplication and overall cleanup
 */
 
// TweetANew
class TweetANew {
	/**
	 * Function for connecting to and preparing bitly
	 *
	 * @param $url
	 * @param $login
	 * @param $appkey
	 * @return string
	 */
	public static function make_bitly_url($url,$login,$appkey)     {
		global $wgTweetANewBitly;
		
		# Check setting to enable/disable use of bit.ly
		if ( $wgTweetANewBitly['Enable'] ) { 
			# Generate url for bitly
			$bitly = "https://api-ssl.bitly.com/v3/shorten?longUrl=".urlencode($url)."&login=".$login."&apiKey=".$appkey."&format=txt";
			# Get the url
			$response = file_get_contents($bitly);
			return $response;
		}
	}
	
	# ToDo - TweetANewNewEditOption function for when auto-tweet is disabled to display checkbox on edit/create page to tweet new/edited pages
		
    /**
	 * Function for tweeting new articles
	 *
	 * @param $article
	 * @param $user
	 * @param $text
	 * @param $summary
	 * @param $minoredit
	 * @param $watchthis
	 * @param $sectionanchor
	 * @param $flags
	 * @param $revision
	 * @return bool
	 */
	public static function TweetANewNewArticle($article, $user, $text, $summary, $minoredit, $watchthis, $sectionanchor, $flags, $revision){
		global $wgTweetANewBitly,$wgTweetANewTwitter,$wgTweetANewTweet;
 
 		# ToDo - Check if $wgTweetANewTweet['Auto'] is enabled
 
		# Make connection to Twitter
		require_once('lib/tmhOAuth.php'); // include connection
		$connection = new tmhOAuth(array(
			'consumer_key'    => $wgTweetANewTwitter['ConsumerKey'],
			'consumer_secret' => $wgTweetANewTwitter['ConsumerSecret'],
			'user_token'      => $wgTweetANewTwitter['AccessToken'],
			'user_secret'     => $wgTweetANewTwitter['AccessTokenSecret'],
		)); 

		# Check setting to enable/disable use of bit.ly
		if ( $wgTweetANewBitly['Enable'] ) { 
			# Shorten URL using bitly
			$short = self::make_bitly_url($article->getTitle()->getFullURL(),$wgTweetANewBitly['Login'],$wgTweetANewBitly['API']);
		}
 		else {
			# Generate url without use of bitly
			$short = $article->getTitle()->getFullURL();
		}
		# Make tweet message
		$tweet_text = "NEW ARTICLE: ".$article->getTitle()->getText()." ".$short; 
		# Check if page is in content namespace
		if ( MWNamespace::isContent( $article->getTitle()->getNamespace() ) ) {
			$connection->request('POST', 
				$connection->url('1/statuses/update'),
				array('status' => $tweet_text)
			); 
		}
		return true;
	}

    /**
	 * Function for tweeting edited articles
	 *
	 * @param $article
	 * @param $user
	 * @param $text
	 * @param $summary
	 * @param $minoredit
	 * @param $watchthis
	 * @param $sectionanchor
	 * @param $flags
	 * @param $revision
	 * @return bool
	 */
	public static function TweetANewEditMade(&$article, &$user, $text, $summary, $minoredit, $watchthis, $sectionanchor, &$flags, $revision, &$status, $baseRevId, &$redirect){
		global $wgTweetANewBitly,$wgTweetANewTwitter,$wgTweetANewTweet,$wgArticle;

 		# ToDo - Check if $wgTweetANewTweet['Auto'] is enabled

		# Determine the time and date of last modification - skip if newer than $wgTweetANewTweet['lessminold'] setting
		# ToDo - there must be a cleaner way of doing this
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select('revision', array( 'rev_timestamp' ), array('rev_page = '.$article->getID()), $fname = 'Database::select', $options = array( 'ORDER BY' => 'rev_id DESC' , 'LIMIT' => '2' ));
		foreach($res as $row) $edittime[] = $row->rev_timestamp;
		$edittimenow = mktime(substr($edittime[0],8,2),substr($edittime[0],10,2),substr($edittime[0],12),substr($edittime[0],4,2),substr($edittime[0],6,2),substr($edittime[0],0,4));
		$edittimelast = mktime(substr($edittime[1],8,2),substr($edittime[1],10,2),substr($edittime[1],12),substr($edittime[1],4,2),substr($edittime[1],6,2),substr($edittime[1],0,4));
		$edittimediv = $edittimenow - $edittimelast;
		$mailtext['time_since_last_edit'] = $edittimediv;
		if(isset($wgTweetANewTweet['lessminold'])) if ($edittimediv < ($wgTweetANewTweet['lessminold'] * 60)) return true;

		# Only proceed if this is not the first edit to the article, in which case it's new and TweetANewNewArticle is used instead
        if ($wgArticle->estimateRevisionCount() == 1 ) return true;

		# Check $wgTweetANewTweet['SkipMinor'] setting to see if minor edits should be skipped
		if ($minoredit !== 0 && $wgTweetANewTweet['SkipMinor']) return true;
		
		# ToDo - If !$wgTweetANewTweet['SkipMinor'] and $wgTweetANewTweet['TagMinor'] add "m" to tweet

		# Make connection to Twitter
		require_once('lib/tmhOAuth.php'); // include connection
		$connection = new tmhOAuth(array(
			'consumer_key'    => $wgTweetANewTwitter['ConsumerKey'],
			'consumer_secret' => $wgTweetANewTwitter['ConsumerSecret'],
			'user_token'      => $wgTweetANewTwitter['AccessToken'],
			'user_secret'     => $wgTweetANewTwitter['AccessTokenSecret'],
		)); 

		# Check setting to enable/disable use of bitly
		if ( $wgTweetANewBitly['Enable'] ) { 
			# Shorten URL using bitly
				$to_shorten = $article->getTitle()->getFullURL();
				$short = self::make_bitly_url($to_shorten,$wgTweetANewBitly['Login'],$wgTweetANewBitly['API']);
		}
 		else {
			# Generate url without use of bitly
			$short = $article->getTitle()->getFullURL();
		}
		# Make tweet message
		# ToDo - localisation integration - pick between various defaults, a rotator and LocalSettings.php overrifde
		$tweet_text = "UPDATED ARTICLE: ".$article->getTitle()->getText()." ".$short; 
		# Check if page is in content namespace
		if ( MWNamespace::isContent( $article->getTitle()->getNamespace() ) ) {
			$connection->request('POST', 
				$connection->url('1/statuses/update'),
				array('status' => $tweet_text)
			); 
		}
		return true;
	}
}