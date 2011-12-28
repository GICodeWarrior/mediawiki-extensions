<?php
/**
 * SendToTwitter extension - sends twitter a tweet when a page is changed
 *
 * @file
 * @ingroup Extensions
 * @version 1.0
 * @author Rohit Keshwani
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @link http://www.mediawiki.org/wiki/Extension:SendToTwitter Documentation
 */
 
if ( !defined( 'MEDIAWIKI' ) )
        die( "This is not a valid entry point.\n" );
 
// Extension credits that will show up on Special:Version
$wgExtensionCredits['other'][] = array(
        'name' => 'SendToTwitter',
        'version' => '1.0',
        'author' => 'Rohit Keshwani',
        'url' => 'http://www.mediawiki.org/wiki/Extension:SendToTwitter',
        'description' => 'Extension to send twitter a tweet when a page is changed.',
);
 
#Configuration parameters
$wgSendToTwitterUsername = 'TWITTERUSERNAME';
$wgSendToTwitterPassword = 'TWITTERPASSWORD';
$wgSendToTwitterWikiURL = 'http://www.example.com/w';
 
$wgHooks['EditPage::attemptSave'][] = 'QueryTwitter';
function QueryTwitter( &$q ) {
        global $wgTitle, $wgArticle;
        global $wgSendToTwitterUsername, $wgSendToTwitterPassword, $wgSendToTwitterWikiURL;
 
        $title = $wgTitle;
        $article = $wgArticle;
        $wurl = $wgSendToTwitterWikiURL;
 
        $test2 = explode( "\n", $article->getContent() );
 
        // The message you want to send
        $ch = curl_init();
        $timeout = 5;
        curl_setopt( $ch, CURLOPT_URL, 'http://tinyurl.com/api-create.php?url=' . $wurl . urlencode( $title ) );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        $test = curl_exec( $ch );
        curl_close( $ch );
 
        $switcher = rand( 1, 3 );
        switch( $switcher ) {
                case 1:
                        $message = 'looks like somebody updated ' . $title . ' at ' . $test;
                        break;
                case 2:
                        $message = $title . ' was recently changed: ' . $test . ' Check it out!';
                        break;
                case 3:
                        $message = 'Check out ' . $test . ' it has some new content on ' . $title;
                        break;
        }
 
        // The twitter API address
        $url = 'http://twitter.com/statuses/update.xml';
        // Alternative JSON version
        // $url = 'http://twitter.com/statuses/update.json';
        // Set up and execute the curl process
        $curl_handle = curl_init();
        curl_setopt( $curl_handle, CURLOPT_URL, "$url" );
        curl_setopt( $curl_handle, CURLOPT_CONNECTTIMEOUT, 2 );
        curl_setopt( $curl_handle, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $curl_handle, CURLOPT_POST, 1 );
        curl_setopt( $curl_handle, CURLOPT_POSTFIELDS, "status=$message" );
        curl_setopt( $curl_handle, CURLOPT_USERPWD, "$wgSendToTwitterUsername:$wgSendToTwitterPassword" );
        $buffer = curl_exec( $curl_handle );
        curl_close( $curl_handle );
        // check for success or failure
        if( empty( $buffer ) ) {
                return false;
        } else {
                return true;
        }
}