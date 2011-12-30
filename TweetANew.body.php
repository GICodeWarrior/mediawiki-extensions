<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	die();
}
/**
 * Class file for the TweetANew extension
 *
 * @addtogroup Extensions
 * @license GPL
 */

// TweetANew
class TweetANew {
	/**
	 * Function for connecting to and preparing bitly
	 *
	 * @param $longurl
	 * @param $login
	 * @param $appkey
	 * @return string
	 */
	public static function make_final_url( $longurl, $login, $appkey ) {
		global $wgTweetANewBitly;

		# Check setting to enable/disable use of bitly
		if ( $wgTweetANewBitly['Enable'] ) {
			# Generate url for bitly
			$bitly = "https://api-ssl.bitly.com/v3/shorten?longUrl="
				. urlencode( $longurl ) . "&login=" . $login
				. "&apiKey=" . $appkey . "&format=txt";

			# Get the url
			$response = file_get_contents( $bitly );
		} else {
			$response = $longurl;
		}
		return $response;
	}

	# ToDo - TweetANewNewEditOption function for when auto-tweet is disabled to display checkbox on edit/create page to tweet new/edited pages

	/**
	 * Function for tweeting new articles
	 *
	 * @param $article
	 * @param $user
	 * @param $text
	 * @param $summary
	 * @return bool
	 */
	public static function TweetANewNewArticle( $article, $user, $text, $summary ) {
		global $wgTweetANewTweet, $wgTweetANewText, $wgTweetANewTwitter, $wgTweetANewBitly, $wgRequest;

		# Check if $wgTweetANewTweet['New'] is enabled or the Tweet checkbox was selected on the edit page
		if ( $wgRequest->getCheck( 'wpTweetANew' ) || $wgTweetANewTweet['New'] ) {

			# Check if page is in content namespace or if the Tweet checkbox was selected on the edit page
			if ( !MWNamespace::isContent( $article->getTitle()->getNamespace() )
				&& !$wgRequest->getCheck( 'wpTweetANew' )
			) {
				return true;
			}

			# Make connection to Twitter
			require_once( 'lib/tmhOAuth.php' ); // include connection
			$connection = new tmhOAuth( array(
				'consumer_key' => $wgTweetANewTwitter['ConsumerKey'],
				'consumer_secret' => $wgTweetANewTwitter['ConsumerSecret'],
				'user_token' => $wgTweetANewTwitter['AccessToken'],
				'user_secret' => $wgTweetANewTwitter['AccessTokenSecret'],
			) );

			# Generate final url
			$finalurl = self::make_final_url(
				$article->getTitle()->getFullURL(),
				$wgTweetANewBitly['Login'],
				$wgTweetANewBitly['API']
			);

			# Generate $author based on $wgTweetANewText['RealName']
			if ( $wgTweetANewText['RealName'] ) {
				$author = $user->getRealName();
			} else {
				$author = $user->getName();
			}

			# Generate a random tweet texts based if $wgTweetANewText['NewRandom'] is true
			if ( $wgTweetANewText['NewRandom'] ) {
				# Setup switcher using max number set by $wgTweetANewText['NewRandomMax']
				$switcher = rand( 1, $wgTweetANewText['NewRandomMax'] );
				# Parse random text
				$tweet_text .= wfMsg( 'tweetanew-new' . $switcher,
					array( $article->getTitle()->getText(), $finalurl )
				);
			} else {
				# Use default tweet message format
				$tweet_body = wfMsg( 'tweetanew-newdefault',
					array( $article->getTitle()->getText(), $finalurl )
				);
				$tweet_text .= $tweet_body;
			}

			# Add author info if $wgTweetANewText['NewAuthor'] is true
			if ( $wgTweetANewText['NewAuthor'] ) {
				$tweet_text .= ' ' . wfMsg( 'tweetanew-authorcredit' ) . ' ' . $author;
			}

			# Add summary if $wgTweetANewText['NewSummary'] is true and summary text is entered
			if ( $summary && $wgTweetANewText['NewSummary'] ) {
				$tweet_text .= ' - ' . $summary;
			}

			# Calculate length of tweet factoring in longURL
			if ( strlen( $finalurl ) > 20 ) {
				$tweet_text_count = ( strlen( $finalurl ) - 20 ) + 140;
			} else {
				$tweet_text_count = 140;
			}

			# Check if length of tweet is beyond 140 characters and shorten if necessary
			if ( strlen( $tweet_text ) > $tweet_text_count ) {
				$tweet_text = substr( $tweet_text, 0, $tweet_text_count );
			}

			# Make tweet message
			$connection->request( 'POST',
				$connection->url( '1/statuses/update' ),
				array( 'status' => $tweet_text )
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
	 * @param $revision
	 * @return bool
	 */
	public static function TweetANewEditMade( &$article, &$user, $text, $summary, $minoredit, $revision ) {
		global $wgTweetANewTweet, $wgTweetANewText, $wgTweetANewTwitter, $wgTweetANewBitly, $wgRequest;

		# Check if $wgTweetANewTweet['Edit'] is enabled or the Tweet checkbox was selected on the edit page
		if ( $wgRequest->getCheck( 'wpTweetANewEdit' ) || $wgTweetANewTweet['Edit'] ) {

			# Check if page is in content namespace or if the Tweet checkbox was selected on the edit page
			if ( !MWNamespace::isContent( $article->getTitle()->getNamespace() )
				&& !$wgRequest->getCheck( 'wpTweetANewEdit' )
			) {
				return true;
			}

			# Determine the time and date of last modification - skip if newer than $wgTweetANewTweet['LessMinutesOld'] setting
			# ToDo - there must be a cleaner way of doing this
			$dbr = wfGetDB( DB_SLAVE );
			$res = $dbr->select( 'revision',
				array( 'rev_timestamp' ),
				array( 'rev_page' => $article->getID() ),
				__METHOD__,
				array( 'ORDER BY' => 'rev_id DESC', 'LIMIT' => '2' )
			);
			foreach ( $res as $row ) {
				$edittime[] = $row->rev_timestamp;
			}
			$edittimenow = mktime( substr( $edittime[0], 8, 2 ), substr( $edittime[0], 10, 2 ),
				substr( $edittime[0], 12 ), substr( $edittime[0], 4, 2 ), substr( $edittime[0], 6, 2 ),
				substr( $edittime[0], 0, 4 )
			);
			$edittimelast = mktime( substr( $edittime[1], 8, 2 ), substr( $edittime[1], 10, 2 ),
				substr( $edittime[1], 12 ), substr( $edittime[1], 4, 2 ), substr( $edittime[1], 6, 2 ),
				substr( $edittime[1], 0, 4 )
			);
			$edittimediv = $edittimenow - $edittimelast;
			if ( $edittimediv < ( $wgTweetANewTweet['LessMinutesOld'] * 60 ) ) {
				return true;
			}

			# Only proceed if this is not the first edit to the article, in which case it's new and TweetANewNewArticle is used instead
			if ( !$article->mTitle->exists() ) {
				return true;
			}

			# Check $wgTweetANewTweet['SkipMinor'] setting to see if minor edits should be skipped
			if ( $minoredit !== 0 && $wgTweetANewTweet['SkipMinor'] ) {
				return true;
			}

			# Make connection to Twitter
			# TODO: Can this be autoloaded?
			require_once( 'lib/tmhOAuth.php' ); // include connection
			$connection = new tmhOAuth( array(
				'consumer_key' => $wgTweetANewTwitter['ConsumerKey'],
				'consumer_secret' => $wgTweetANewTwitter['ConsumerSecret'],
				'user_token' => $wgTweetANewTwitter['AccessToken'],
				'user_secret' => $wgTweetANewTwitter['AccessTokenSecret'],
			) );

			# Generate final url
			$finalurl = self::make_final_url( $article->getTitle()->getFullURL(), $wgTweetANewBitly['Login'],
				$wgTweetANewBitly['API']
			);

			# Generate $author based on $wgTweetANewText['RealName']
			if ( $wgTweetANewText['RealName'] ) {
				$author = $user->getRealName();
			} else {
				$author = $user->getName();
			}

			# Add prefix indication that edit is minor if $wgTweetANewText['Minor'] is true and !$wgTweetANewTweet['SkipMinor'] is false
			if ( $minoredit !== 0 && $wgTweetANewText['Minor'] ) {
				$tweet_text = wfMsg( 'tweetanew-minoredit' );
				# Add a space after the indicator if $wgTweetANewText['MinorSpace'] is true
				if ( $minoredit !== 0 && $wgTweetANewText['MinorSpace'] ) {
					$tweet_text .= '&nbsp;';
				}
			}

			# Generate a random tweet texts based if $wgTweetANewText['EditRandom'] is true
			if ( $wgTweetANewText['EditRandom'] ) {
				# Setup switcher using max number set by $wgTweetANewText['EditRandomMax']
				$switcher = rand( 1, $wgTweetANewText['EditRandomMax'] );
				# Parse random text
				$tweet_text .= wfMsg( 'tweetanew-edit' . $switcher,
					array( $article->getTitle()->getText(), $finalurl )
				);
			} else {
				# Use default tweet message format
				$tweet_body = wfMsg( 'tweetanew-editdefault',
					array( $article->getTitle()->getText(), $finalurl )
				);
				$tweet_text .= $tweet_body;
			}

			# Add author info if $wgTweetANewText['EditAuthor'] is true
			if ( $wgTweetANewText['EditAuthor'] ) {
				$tweet_text .= ' ' . wfMsg( 'tweetanew-authorcredit' ) . ' ' . $author;
			}

			# Add summary if $wgTweetANewText['EditSummary'] is true and summary text is entered
			if ( $summary && $wgTweetANewText['EditSummary'] ) {
				$tweet_text .= ' - ' . $summary;
			}

			# Calculate length of tweet factoring in longURL
			if ( strlen( $finalurl ) > 20 ) {
				$tweet_text_count = ( strlen( $finalurl ) - 20 ) + 140;
			} else {
				$tweet_text_count = 140;
			}

			# Check if length of tweet is beyond 140 characters and shorten if necessary
			if ( strlen( $tweet_text ) > $tweet_text_count ) {
				$tweet_text = substr( $tweet_text, 0, $tweet_text_count );
			}

			# Make tweet message
			$connection->request( 'POST',
				$connection->url( '1/statuses/update' ),
				array( 'status' => $tweet_text )
			);
		}
		return true;
	}
}