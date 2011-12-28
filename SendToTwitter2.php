<?php
/**
 * SendToTwitter extension - sends twitter a tweet when a page is changed
 *
 * @file
 * @ingroup Extensions
 * @version 1.1
 * @author Rohit Keshwani
 * @author Andrew Fitzgerald
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @link http://www.mediawiki.org/wiki/Extension:SendToTwitter Documentation
 */
 
if ( !defined( 'MEDIAWIKI' ) )
	die( "This is not a valid entry point.\n" );
 
// Extension credits that will show up on Special:Version
$wgExtensionCredits['other'][] = array(
	'name' => 'SendToTwitter2',
	'version' => '2.0',
	'author' => 'Rohit Keshwani, Andrew Fitzgerald',
	'url' => 'http://www.mediawiki.org/wiki/Extension:SendToTwitter2',
	'description' => 'Extension to send twitter a tweet when a page is changed.',
);
 
$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['SendToTwitter2'] = $dir . 'SendToTwitter2.i18n.php';

#Configuration parameters

if (!isset($wgSendToTwitterUsername)) 
{	$wgSendToTwitterUsername 		= ''; 
}
if (!isset($wgSendToTwitterPassword)) 		
{	$wgSendToTwitterPassword 		= ''; 
}
if (!isset($wgSendToTwitterWikiURL)) 		
{	$wgSendToTwitterWikiURL 		= ''; 
}
if (!isset($wgSendToTwitterUseCheckBox))	
{	$wgSendToTwitterUseCheckBox 	= true; 
}
if (!isset($wgSendToTwitterUseCheckBox))	
{	$wgSendToTwitterChecked 		= false; 
}

$wgHooks['EditPage::attemptSave'][] = 'efSendToTwitter2Save';
function efSendToTwitter2Save( &$q ) {
	global $wgRequest, $wgSendToTwitterUseCheckBox;
	
	if (($wgSendToTwitterUseCheckBox == false) || $wgRequest->getBool('wpSendToTwitter'))
	{
		wfLoadExtensionMessages( 'SendToTwitter2' );
		global $wgTitle, $wgArticle;
		global $wgSendToTwitterUsername, $wgSendToTwitterPassword, $wgSendToTwitterWikiURL;
	 	
	 	$title = $wgTitle;
		$titleurl = str_replace(' ','_',$wgTitle);
		$article = $wgArticle;
		$wurl = $wgSendToTwitterWikiURL;
	 
		$test2 = explode( "\n", $article->getContent() );
	 
		// The message you want to send
		$ch = curl_init();
		$timeout = 5;
		curl_setopt( $ch, CURLOPT_URL, 'http://tinyurl.com/api-create.php?url=' . $wurl .  $titleurl );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		$test = curl_exec( $ch );
		curl_close( $ch );
	 
		$switcher = rand( 1, 3 );
		
		$message = wfMsg( 'sendtotwitter-message' . $switcher, array ( $title, $test, $q->summary ));
		
		if (strlen($message) > 140)
		{	$message = substr($message,0, 140);
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
	return true;
}


$wgHooks['EditPageBeforeEditChecks'][] = 'efSendToTwitter2CheckBox';

function efSendToTwitter2CheckBox( &$editpage, &$checkboxes, &$tabindex) 
{	
	global $wgSendToTwitterUseCheckBox, $wgSendToTwitterChecked;
	if ($wgSendToTwitterUseCheckBox)
	{
		wfLoadExtensionMessages( 'SendToTwitter2' );
   	 $attribs = array(
			'tabindex'  => ++$tabindex,
			'accesskey' => wfMsg( 'accesskey-sendtotwitter' ),
			'id'        => 'wpSendToTwitter',
		);
    
    	$checkboxes['twitter'] =
					Xml::check( 'wpSendToTwitter', $wgSendToTwitterChecked, $attribs ) .
					"&nbsp;<label for='wpSendToTwitter' title='". wfMsg('tooltip-sendtotwitter')."'>".wfMsg('action-sendtotwitter')."</label>";
	}
	return true;
}
