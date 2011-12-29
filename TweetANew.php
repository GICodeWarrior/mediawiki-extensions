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
 * Some code inspired by the Mail2Facebook extension by Thiemo Schuff
 *
 * Use Matt Harris' OAuth library to make the connection
 *    This lives at: https://github.com/themattharris/tmhOAuth
 *    The most recent edition (as of this version's publish date) is included with this extension.
 *
 * Thank you to Johnduhart, Reedy, and SPQRobin for feedback, bug reporting and cleaning up code
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
 * 			- Automatically tweet about new articles
 *			  Default is true
 * $wgTweetANewTweet['Edit']
 * 			- Automatically tweet about articles when edited
 *			  Default is true
 * $wgTweetANewTweet['LessMinutesOld']
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
 * $wgTweetANewText['Minor']
 *			- Indicate in tweet if edit is marked as minor - only applies if $wgTweetANewTweet['SkipMinor'] = false
 *			  Default is false
 * $wgTweetANewText['MinorSpace']
 *			- Include a space after minor edit indicator - only applies if $wgTweetANewTweet['SkipMinor'] = false and $wgTweetANewText['Minor'] = true
 *			  Default is true
 * $wgTweetANewText['NewRandom']
 *			- Use a mix of random messages in body of tweets about new articles
 *			  Default is true
 * $wgTweetANewText['NewRandomMax']
 *			- Maximum number of random messages to use - set any additional (beyond 3) using [[MediaWiki:Tweetanew-new4]], [[MediaWiki:Tweetanew-new5]], etc.
 *			  Default is 3
 * $wgTweetANewText['NewAuthor']
 *			- Display the author of the new article
 *			  Default is false
 * $wgTweetANewText['NewSummary']
 *			- Display content entered into new article's summary box
 *			  Default is false
 * $wgTweetANewText['EditRandom']
 *			- Use a mix of random messages in body of tweets about article edits
 *			  Default is true
 * $wgTweetANewText['EditRandomMax']
 *			- Maximum number of random messages to use - set any additional (beyond 3) using [[MediaWiki:Tweetanew-edit4]], [[MediaWiki:Tweetanew-edit5]], etc.
 *			  Default is 3
 * $wgTweetANewText['EditAuthor']
 *			- Display the author of the edit
 *			  Default is false
 * $wgTweetANewText['EditSummary']
 *			- Display content entered into edit's summary box
 *			  Default is false
 * $wgTweetANewText['RealName']
 *			- Determine if user's real name will be displayed instead of their username
 *			  Default is false
 *
 */

$wgTweetANewTweet = array(
	'New' => true,
	'Edit' => true,
	'LessMinutesOld' => 5,
	'SkipMinor' => false,
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
	'Minor' => true, // Only applies if $wgTweetANewTweet['SkipMinor'] = false
	'MinorSpace' => true, // Only applies if $wgTweetANewTweet['SkipMinor'] = false and $wgTweetANewTweet['Minor'] = true
	'NewRandom' => true,
	'NewRandomMax' => 3,
	'NewAuthor' => true,
	'NewSummary' => true,
	'EditRandom' => true,
	'EditRandomMax' => 3,
	'EditAuthor' => true,
	'EditSummary' => true,
	'RealName' => true,
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
	'version'        => '1.0.20111228-experimental',
	'author'         => '[https://www.mediawiki.org/wiki/User:Varnent Gregory Varnum] merging extensions by [https://www.mediawiki.org/wiki/User:Joa_ds Joachim De Schrijver], Andrew Fitzgerald, Wendell Gaudencio, and Rohit Keshwani',
	'description'    => 'Tweets when an article is created or edited.  Depending on preferences set for the entire wiki, either automatically or from the edit page.',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:TweetANew',
);

/**
 * Call the hooks
 *
 */

$wgHooks['ArticleInsertComplete'][] = 'TweetANew::TweetANewNewArticle';
$wgHooks['ArticleSaveComplete'][] = 'TweetANew::TweetANewEditMade';