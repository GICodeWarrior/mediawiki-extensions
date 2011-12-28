<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}
require_once('settings.php');

// set the hook
$wgHooks['ArticleSaveComplete'][] = 'fnMyHook';

// update twitter
function fnMyHook( &$article, &$user, $text, $summary, &$minoredit, $watchthis, $sectionanchor, &$flags, $revision, &$status, $baseRevId ) {
	
	//FLAGS+MINOR ARTICLE; (DIFF) USER (SUMMARY)
	if ($article->mMinorEdit==1) {
		$twit_text .= "m ";
	}
	
	$link = "http://habbowiki.org/index.php?title=" . urlencode($article->mTitle) . "&diff=" . $article->mOldId  . "&oldid=" . $article->mRevIdFetched;
	//$twit_text = file_get_contents('http://tinyurl.com/api-create.php?url='.$link);
	$twit_text .= $link;
	$twit_text .= " ";
	require_once('twitterOAuth.php');

	/* Sessions are used to keep track of tokens while user authenticates with twitter */
	/* settings provided by settings.php */

	/* Create TwitterOAuth with app key/secret and user access key/secret */
	$to = new TwitterOAuth($consumer_key, $consumer_secret, $oauth_access_token, $oauth_access_token_secret);

	$twit_text .= $article->mTitle."; ".$user->mName." (".$summary.")";

	$content = $to->OAuthRequest('http://twitter.com/statuses/update.xml', array('status' => $twit_text), 'POST');

	return true;
}
?>