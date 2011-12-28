<?php
if (!defined('MEDIAWIKI')) die();
/**
 * Class file for the TweetANew extension
 *
 * @addtogroup Extensions
 * @author Joachim De Schrijver
 * @license LGPL
 */
 
// TweetANew
class TweetANew {
        // SHORTEN URL TO TWEET
        public static function make_bitly_url($url,$login,$appkey,$version = '2.0.1')     {
 
                $bitly = "http://api.bit.ly/shorten?version=".$version."&longUrl=".urlencode($url)."&login=".$login."&apiKey=".$appkey."&format=xml";
 
                //get the url
                $response = file_get_contents($bitly);
 
                //parse
                $xml = simplexml_load_string($response);
                return 'http://bit.ly/'.$xml->results->nodeKeyVal->hash;
        }
 
        // TWEET
        public static function Tweet($article, $user, $text, $summary, $minoredit, $watchthis, $sectionanchor, $flags, $revision){
                global $wgConsumerKey,$wgConsumerSecret,$wgAccessToken,$wgAccessTokenSecret,$bitly_login,$bitly_api;
 
                // Make connection to Twitter
                require_once('tmhOAuth.php'); // include connection
 
                $connection = new tmhOAuth(array(
                     'consumer_key'    => $wgConsumerKey,
                     'consumer_secret' => $wgConsumerSecret,
                     'user_token'      => $wgAccessToken,
                     'user_secret'     => $wgAccessTokenSecret,
                )); 
 
                // Shorten
                $to_shorten = $article->getTitle()->getFullURL()."&fb_ref=FB&source=TwitterTAN";
                $short = self::make_bitly_url($to_shorten,$bitly_login,$bitly_api);
 
                // Make tweet message
                $tweet_text = "NEW ARTICLE: ".$article->getTitle()->getText()." ".$short; 
 
                // Tweet if not jpg or png
                if ( !preg_match( "/\.(png|jpe?g)/i", $article->getTitle()->getText() ) ) {
                        $connection->request('POST', 
                           $connection->url('1/statuses/update'), 
                           array('status' => $tweet_text)
                        ); 
                }
 
                return true;
        }
}