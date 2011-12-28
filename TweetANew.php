<?php
/**
 * MediaWiki extension to update a twitter account each time a new article is created (not when images are uploaded)
 * Using bit.ly to shorten URLs
 * Installation instructions can be found on
 * http://www.mediawiki.org/wiki/Extension:TweetANew
 *
 * @addtogroup Extensions
 * @author Joachim De Schrijver
 * @license LGPL
 *
 */
 
/**
 * Exit if called outside of MediaWiki
 */
 if( !defined( 'MEDIAWIKI' ) ) {
        echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
        die( 1 );
}
 
/**
 * Settings
 * 
 * Use Matt Harris' OAuth library to make the connection
 * This lives at: https://github.com/themattharris/tmhOAuth
 * The 4 keys should be set @ LocalSettings.php
 * 
 */
 $wgConsumerKey      = "";
 $wgConsumerSecret   = "";
 $wgAccessToken      = "";
 $wgAccessTokenSecret= "";
 $bitly_api = "";
 $bitly_login = "";
 
/**
 * Class and localisation
 *
 */
 
 $dir = dirname(__FILE__) . '/';
 $wgAutoloadClasses['TweetANew'] = $dir . 'TweetANew.class.php';
 
/**
 * Credits
 *
 */
 
 $wgExtensionCredits['other'][] = array(
        'name'           => 'TweetANew',
        'version'        => '0.2',
        'author'         => '[http://www.mediawiki.org/wiki/User:Joa_ds Joachim De Schrijver]',
        'description'    => 'Tweets whenever a new article is created',
        'url'            => 'http://www.mediawiki.org/wiki/Extension:TweetANew',
 );   
 
/**
 * Call the hooks
 *
 */
 
$wgHooks['ArticleInsertComplete'][] = 'TweetANew::Tweet';