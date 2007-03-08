<?php
if ( ! defined( 'MEDIAWIKI' ) )
    die();

/**#@+
 * Allows users to post comments directly to discussion pages.'
 * 
 * @addtogroup Extensions
 *
 * @link http://www.mediawiki.org/wiki/Extension:PostComment
 *
 *
 * @author Travis Derouin <travis@wikihow.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */


require_once("SpecialPage.php");


$wgExtensionFunctions[] = 'wfPostComment';

$wgExtensionCredits['other'][] = array(
    'name' => 'PostComment',
    'author' => 'Travis Derouin',
    'description' => 'Allows users to post comments directly to discussion pages.',
    'url' => 'http://www.mediawiki.org/wiki/Extension:PostComment',
);

function wfPostcomment( ) {
  global $wgMessageCache;
     $wgMessageCache->addMessages(
    array(
		'postcomment_discussionprotected' => 'This discussion page has been protected from further postings.', 
		'postcomment_notloggedin' => 'You are not logged in.',
		'postcomment_youareloggedinas' => 'You are logged in as $1',
		'postcomment_addcommentdiscussionpage' => 'Add your comment on this discussion page',
		'postcomment_leavemessagefor' => 'Leave a message for $1',
		'postcomment_post' => 'Post',
		'postcomment_invalidrequest' => 'Invalid request.',
		'postcomment_replyto' => 'Reply to $1',
		'postcomment_nopostingtoadd' => 'No posting to add.',
		)
	);
	SpecialPage::AddPage(new UnlistedSpecialPage('Postcomment'));
}

function wfPostcommentForm() {
        
	global $wgUser, $wgTitle,$wgRequest;


	$action = $wgRequest->getVal('action');

	// just for talk pages
	if (!$wgTitle->isTalkPage() || $action != '') 
		return;

    if (!$wgTitle->userCanEdit()) {
		echo  wfMsg('postcomment_discussionprotected');
		return;
	}

	$sk = $wgUser->getSkin();

   	$user_str = "";
    if ($wgUser->getID() == 0) {
        $user_str = wfMsg('postcomment_notloggedin');
    } else {
		$link = $sk->makeLinkObj($wgUser->getUserPage(), $wgUser->getName());
        $user_str = wfMsg('postcomment_youareloggedinas', $link);
    }

    $msg = wfMsg('postcomment_addcommentdiscussionpage');
	$pc = Title::newFromText("Postcomment", NS_SPECIAL);
    if ($wgTitle->getNamespace() == NS_USER_TALK)
        $msg = wfMsg('postcomment_leavemessagefor',$wgTitle->getText());
   echo "<br/><br/><table> 
        <FORM name=\"commentForm\" method=\"POST\" action=\"{$pc->getFullURL()}\" \">
        <input name=target type=hidden value=\"" . htmlspecialchars($wgTitle->getPrefixedDBkey()) . "\">
        <input name=section_id type=hidden value=-1>
        <tr><td colspan=\"2\" valign=\"top\">
        <a name=\"post\"></a>
        <b>$msg:</b><br/><br/></td></tr>
        
        <tr><td valign=\"top\"></td><td><textarea tabindex=3 rows=\"15\"cols=\"50\" name=\"comment_text\"></TEXTAREA>
        <tr><td>&nbsp;</td><td>
        <input tabindex='4' type='submit' name=\"wpLoginattempt\" value=\"".wfMsg('postcomment_post')."\" class=\"btn\"
           onmouseover=\"this.className='btn btnhov'\" onmouseout=\"this.className='btn'\"/> 
        </td>
        
        </tr>
        <tr>
        <td>
        <small>
        $user_str
        </FORM>
        </table>";
}

function wfSpecialPostcomment( $par )
{
	global $wgUser, $wgOut, $wgLang, $wgTitle, $wgMemc, $wgDBname;
	global $wgRequest, $wgSitename, $wgLanguageCode;
	global $wgFeedClasses, $wgFilterCallback, $wgWhitelistEdit;
	
	
	$wgOut->setRobotpolicy( "noindex,nofollow" );
	$fname = "wfSpecialPostcomment";
	
	//echo "topic: " . $wgRequest->getVal("topic_name") . "<BR>";
	//echo "title: " . $wgRequest->getVal("title") . "<BR>";
	//echo "comment: " . $wgRequest->getVal("comment_text") . "<BR>";
	//echo "new_topic id " . $wgRequest->getVal("new_topic") . "<BR>";	
	
	$t = Title::newFromDBKey($wgRequest->getVal("target"));
	$update = true;
	
	if ($t == null) {
		$wgOut->errorPage('postcomment', 'postcomment_invalidrequest');
		return;
	} 
	
	if ($t->getArticleID() <= 0) 
		$update = false;
		
	$article = new Article($t);
	
	$user = $wgUser->getName();
	$real_name = User::whoIsReal($wgUser->getID());
	if ($real_name == "") {
		$real_name = $user;
	}
	$dateStr = $wgLang->timeanddate(wfTimestampNow());
	$comment = $wgRequest->getVal("comment_text");
	$topic = $wgRequest->getVal("topic_name");
	
	//echo "$dateStr<br/>";
	
	$formattedComment = "<!-- start entry --->
	<div id=\"discussion_entry\"><table width=\"100%\">
	   <tr><td width=\"50%\" valign=\"top\" class=\"discussion_entry_user\">
	[[User:$user|$real_name]] said:
</td><td align=\"right\" width=\"50%\" class=\"discussion_entry_date\">On $dateStr<br/>
	</td></tr><tr>
<td colspan=2 class=\"discussion_entry_comment\">
	$comment</td></tr>
	<tr><td colspan=\"2\" class=\"discussion_entry_date\" padding=5>[[User_talk:$user#post|" . wfMsg('postcomment_replyto', $real_name) . "]]</td></tr>
	</table></div>
	<!-- end entry -->
	
	";
	//echo "$formattedComment";
	
	$text = "";
	
	if ($update) {
		$r = Revision::newFromTitle($t);
		$text = $r->getText();
	}
	
	$text .= "\n\n$formattedComment\n\n";
	
	
	//echo "updating with text:<br/> $text";
	//exit;
	$tmp = "";
	if ( $wgUser->isBlocked() ) {
		EditPage::blockedIPpage();
		return;
	}
	if ( !$wgUser->getID() && $wgWhitelistEdit ) {
		$this->userNotLoggedInPage();
		return;
	}
	if ( wfReadOnly() ) {
		$wgOut->readOnlyPage();
		return;
	}
        
    if ($target == "Spam-Blacklist") {
   		$wgOut->readOnlyPage();
        return;                
    }

	if ( $wgUser->pingLimiter() ) {
		$wgOut->rateLimited();
		return;
	}
			
	if ( $wgFilterCallback && $wgFilterCallback( $t, $text, $tmp) ) {
		# Error messages or other handling should be performed by the filter function
		return;
	}
       
	 if (trim($comment) == ""  ) {
           $wgOut->errorpage( "postcomment", "postcomment_nopostingtoadd");
           return;
        }

	if ( !$t->userCanEdit()) {
       $wgOut->errorpage( "postcomment", "postcomment_discussionprotected");
	   return;   
	}
	
	$watch = false;
	if ($wgUser->getID() > 0) 
	   $watch = $wgUser->isWatched($t);
	   
	if ($update) {
		//echo "trying to update article";
		$article->updateArticle($text, "", true, $watch);	
	} else {
		//echo "inserting new article";
		$article->insertNewArticle($text, "", true, $watch, false, false, true);
	}
}
?>
