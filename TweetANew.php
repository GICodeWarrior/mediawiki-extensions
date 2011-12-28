<?php
/**
 * MediaWiki extension to update a Twitter account each time an article is created or edited - depending on yours settings.
 * Excludes files or content outside of article namespaces.
 * Optional use of bit.ly to shorten and track URLs.
 * Installation instructions can be found on
 * https://www.mediawiki.org/wiki/Extension:TweetANew
 *
 * @addtogroup Extensions
 * @author Gregory Varnum merging extensions by Joachim De Schrijver, Andrew Fitzgerald, Wendell Gaudencio, and Rohit Keshwani
 * @license GPL
 *
 * Version 1.0 and above based on merging extensions TweetANew v0.2 by Joachim De Schrijver, Wiki2twitter by Wendell Gaudencio,
 *    SendToTwitter by Rohit Keshwani and SendToTwitter2 by Rohit Keshwani, Andrew Fitzgerald. 
 *
 * Some code borrowed from the Mail2Facebook extension by Thiemo Schuff
 *
 * Use Matt Harris' OAuth library to make the connection
 *    This lives at: https://github.com/themattharris/tmhOAuth
 *    The most recent edition (as of this version's publish date) is included with this extension.
 *
 * Thank you to Raymond and others mentioned in TweetANew.i18n.php for translation work
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
 * SETTINGS
 * --------
 * The following variables may be reset in your LocalSettings.php file.
 * 
 * $wgTweetANewTweet['New']
 * 			- Tweet about new articles
 *			  Default is true
 * $wgTweetANewTweet['Edit']
 * 			- Tweet about articles when edited
 *			  Default is true
 * $wgTweetANewTweet['lessminold']
 *			- Minutes since last edit to wait before tweeting about a new edit
 *			  Default is 5
 * $wgTweetANewTweet['SkipMinor']
 *			- Skip minor edits
 			  Default is true
 * $wgTweetANewTwitter['ConsumerKey']
 *			- Consumer key provided at https://dev.twitter.com/apps - be sure to have write and read permissions
 * $wgTweetANewTwitter['ConsumerSecret']
 *			- Consumer secret provided at https://dev.twitter.com/apps - be sure to have write and read permissions
 * $wgTweetANewTwitter['AccessToken']
 *			- Access token provided by the OAuth tool at https://dev.twitter.com/apps - be sure to have write and read permissions
 * $wgTweetANewTwitter['AccessTokenSecret']
 *			- Access token secret provided by the OAuth tool at https://dev.twitter.com/apps - be sure to have write and read permissions
 * $wgTweetANewBitly['Enable']
 * 			- Display URL as bitly link - allowing you to track usage via your bitly account
 *			  Default is false
 * $wgTweetANewBitly['Login']
 *			- If bitly link display is enabled, enter your bitly user account - signup at: http://bitly.com/a/sign_up
 * $wgTweetANewBitly['API']
 *			- If bitly link display is enabled, enter your bitly API key - find your API key at: http://bitly.com/a/your_api_key
 * $wgTweetANewText['New']
 *			- Text used for tweets about new articles
 *			  Default is set by TweetANew.i18n.php
 *			  English example = ''
 * $wgTweetANewText['Edit']
 *			- Text used for tweets about edited articles
 *			  Default is set by TweetANew.i18n.php
 *			  English example = ''
 *
 */

$wgTweetANewTweet = array(
	'New' => true,
	'Edit' => true,
	'lessminold' => 5,
	'SkipMinor' => true,
	'Auto' => true,
);

$wgTweetANewTwitter = array(
	'ConsumerKey' => '',
	'ConsumerSecret' => '',
	'AccessToken' => '',
	'AccessTokenSecret' => '',
);

$wgTweetANewBitly = array(
	'Enable' => false,
	'Login' => '',
	'API' => '',
);

$wgTweetANewText = array(
	'New' => '',
	'Edit' => '',
);

/**
 * Class and localisation
 *
 */

$dir = dirname(__FILE__) . '/';
$wgAutoloadClasses['TweetANew'] = $dir . 'TweetANew.body.php';
$wgExtensionMessagesFiles['TweetANew'] = $dir . 'TweetANew.i18n.php';

/**
 * Credits
 *
 */

 $wgExtensionCredits['other'][] = array(
	'name'           => 'TweetANew',
	'version'        => '1.0.20111227-experimental',
	'author'         => '[https:www.mediawiki.org/wiki/User:Varnent Gregory Varnum] merging extensions by [https://www.mediawiki.org/wiki/User:Joa_ds Joachim De Schrijver], Andrew Fitzgerald, Wendell Gaudencio, and Rohit Keshwani',
	'description'    => 'Tweets when an article is created or edited - based on your settings.',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:TweetANew',
);

/**
 * Call the hooks
 *
 */

$wgHooks['ArticleInsertComplete'][] = 'TweetANew::TweetANewNewArticle';
$wgHooks['ArticleSaveComplete'][] = 'TweetANew::TweetANewEditMade';
