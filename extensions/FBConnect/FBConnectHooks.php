<?php
/*
 * Copyright � 2008-2010 Garrett Brown <http://www.mediawiki.org/wiki/User:Gbruin>
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License along
 * with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Class FBConnectHooks
 * 
 * This class contains all the hooks used in this extension. HOOKS DO NOT NEED
 * TO BE EXPLICITLY ADDED TO $wgHooks. Simply write a public static function
 * with the same name as the hook that provokes it, place it inside this class
 * and let FBConnect::init() do its magic. Helper functions should be private,
 * because only public static methods are added as hooks.
 */
class FBConnectHooks {
	/**
	 * Hook is called whenever an article is being viewed... Currently, figures
	 * out the Facebook ID of the user that the userpage belongs to.
	 */
	public static function ArticleViewHeader( &$article, &$outputDone, &$pcache ) {
		global $wgOut;
		// Get the article title
		$nt = $article->getTitle();
		// If the page being viewed is a user page
		if ($nt && $nt->getNamespace() == NS_USER && strpos($nt->getText(), '/') === false) {
			$user = User::newFromName($nt->getText());
			if (!$user || $user->getID() == 0) {
				return true;
			}
			$fb_id = FBConnectDB::getFacebookIDs($user->getId());
			if (!count($fb_id) || !($fb_id = $fb_id[0])) {
				return true;
			}
			// TODO: Something with the Facebook ID stored in $fb_id
			return true;
		}
		return true;
	}
	
	/**
	 * Checks the autopromote condition for a user.
	 */
	static function AutopromoteCondition( $cond_type, $args, $user, &$result ) {
		global $wgFbUserRightsFromGroup;
		
		// Probably a redundant check, but with PHP you can never be too sure...
		if (!$wgFbUserRightsFromGroup) {
			// No group to pull rights from, so the user can't be a member
			$result = false;
			return true;
		}
		$types = array(APCOND_FB_INGROUP   => 'member',
		               APCOND_FB_ISOFFICER => 'officer',
		               APCOND_FB_ISADMIN   => 'admin');
		$type = $types[$cond_type];
		switch( $type ) {
			case 'member':
			case 'officer':
			case 'admin':
				global $facebook;
				// Connect to the Facebook API and ask if the user is in the group
				$rights = $facebook->getGroupRights($user);
				$result = $rights[$type];
		}
		
		return true;
	}
	
	/**
	 * Injects some important CSS and Javascript into the <head> of the page.
	 */
	public static function BeforePageDisplay( &$out, &$sk ) {
		global $wgVersion, $wgFbLogo, $wgFbScript, $wgFbExtensionScript, $wgFbIncludeJquery,
		       $wgScriptPath, $wgJsMimeType, $wgStyleVersion;
		
		// Asynchronously load the Facebook Connect JavaScript SDK before the page's content
		if(!empty($wgFbScript)){
			$out->prependHTML('
				<div id="fb-root"></div>
				<script>
					(function(){var e=document.createElement("script");e.type="' .
					$wgJsMimeType . '";e.src="' . $wgFbScript .
					'";e.async=true;document.getElementById("fb-root").appendChild(e)})();
				</script>' . "\n"
			);
		}
		
		// Inserts list of global JavaScript variables if necessary
		if (self::MGVS_hack( $mgvs_script )) {
			$out->addInlineScript( $mgvs_script );
		}
		
		// Add a Facebook logo to the class .mw-fblink
		$style = empty($wgFbLogo) ? '' : <<<STYLE
		/* Add a pretty logo to Facebook links */
		.mw-fblink {
			background: url($wgFbLogo) top left no-repeat !important;
			padding-left: 17px !important;
		}
STYLE;
		
		// Things get a little simpler in 1.16...
		if (version_compare($wgVersion, '1.16', '>=')) {
			// Add a pretty Facebook logo if $wgFbLogo is set
			if ( !empty( $wgFbLogo) ) {
				$out->addInlineStyle($style);
			}
			
			// Don't include jQuery if it's already in use on the site
			#$out->includeJQuery();
			// Temporary workaround until until MW is bundled with jQuery 1.4.2:
			$out->addScriptFile('http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js');
			
			// Add the script file specified by $url
			if(!empty($wgFbExtensionScript)){
				$out->addScriptFile($wgFbExtensionScript);
			}
		} else {
			// Add a pretty Facebook logo if $wgFbLogo is set
			if ( !empty( $wgFbLogo) ) {
				$out->addScript('<style type="text/css">' . $style . '</style>');
			}
			
			// Don't include jQuery if it's already in use on the site
			if (!empty($wgFbIncludeJquery)){
				$out->addScriptFile("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js");
			}
			
			// Add the script file specified by $url
			if(!empty($wgFbExtensionScript)){
				$out->addScript("<script type=\"$wgJsMimeType\" src=\"$wgFbExtensionScript?$wgStyleVersion\"></script>\n");
			}
		}
		return true;
	}
	
	/**
	 * Fired when MediaWiki is updated to allow FBConnect to update the database.
	 * If the database type is supported, then a new tabled named 'user_fbconnect'
	 * is created. For the table's layout, see fbconnect_table.sql. If $wgDBprefix
	 * is set, then the table 'user_fbconnect' will be prefixed accordingly. Make
	 * sure that fbconnect_table.sql is updated with the database prefix beforehand.
	 */
	static function LoadExtensionSchemaUpdates() {
		global $wgDBtype, $wgDBprefix, $wgExtNewTables;
		$base = dirname( __FILE__ );
		if ( $wgDBtype == 'mysql' ) {
			$wgExtNewTables[] = array("{$wgDBprefix}user_fbconnect", "$base/fbconnect_table.sql");
		} else if ( $wgDBtype == 'postgres' ) {
			$wgExtNewTables[] = array("{$wgDBprefix}user_fbconnect", "$base/fbconnect_table.pg.sql");
		}
		return true;
	}
	
	/**
	 * Adds several Facebook Connect variables to the page:
	 * 
	 * fbAppId		 The application ID (see $wgFbAppId in config.php)
	 * fbSession     Assist the JavaScript SDK with loading the session
	 * fbUseMarkup   Should XFBML tags be rendered (see $wgFbUseMarkup in config.php)
	 * fbLogo        Facebook logo (see $wgFbLogo in config.php)
	 * fbLogoutURL   The URL to be redirected to on a disconnect
	 * 
	 * This hook was added in MediaWiki version 1.14. See:
	 * http://svn.wikimedia.org/viewvc/mediawiki/trunk/phase3/includes/Skin.php?view=log&pathrev=38397
	 * If we are not at revision 38397 or later, this function is called from BeforePageDisplay
	 * to retain backward compatability.
	 */
	public static function MakeGlobalVariablesScript( &$vars ) {
		global $wgFbAppId, $facebook, $wgFbUseMarkup, $wgFbLogo, $wgTitle, $wgRequest;
		$vars['fbAppId'] = $wgFbAppId;
		$vars['fbSession'] = $facebook->getSession();
		$vars['fbUseMarkup'] = $wgFbUseMarkup;
		$vars['fbLogo'] = $wgFbLogo ? true : false;
		$vars['fbLogoutURL'] = Skin::makeSpecialUrl('Userlogout',
		                       $wgTitle->isSpecial('Preferences') ? '' :
		                       "returnto={$wgTitle->getPrefixedURL()}");
		$query = $wgRequest->getValues();
		$vars['wgPagequery'] = wfUrlencode( wfArrayToCGI( $query ) );
		return true;
	}
	
	/**
	 * Hack: Run MakeGlobalVariablesScript for backwards compatability.
	 * The MakeGlobalVariablesScript hook was added to MediaWiki 1.14 in revision 38397:
	 * http://svn.wikimedia.org/viewvc/mediawiki/trunk/phase3/includes/Skin.php?view=log&pathrev=38397
	 */
	private static function MGVS_hack( &$script ) {
		global $wgVersion, $IP;
		if (version_compare($wgVersion, '1.14', '<')) {
			$svn = SpecialVersion::getSvnRevision($IP);
			// if !$svn, then we must be using 1.13.x (as opposed to 1.14alpha+)
			if (!$svn || $svn < 38397)
			{
				$script = "";
				$vars = array();
				wfRunHooks('MakeGlobalVariablesScript', array(&$vars));
				foreach( $vars as $name => $value ) {
					$script .= "\t\tvar $name = " . json_encode($value) . ";\n";
	    		}
	    		return true;
			}
		}
		return false;
	}
	
	/**
	 * Installs a parser hook for every tag reported by FBConnectXFBML::availableTags().
	 * Accomplishes this by asking FBConnectXFBML to create a hook function that then
	 * redirects to FBConnectXFBML::parserHook().
	 */
	public static function ParserFirstCallInit( &$parser ) {
		$pHooks = FBConnectXFBML::availableTags();
		foreach( $pHooks as $tag ) {
			$parser->setHook( $tag, FBConnectXFBML::createParserHook( $tag ));
		}
		return true;
	}
	
	/**
	 * Modify the user's persinal toolbar (in the upper right).
	 * 
	 * TODO: Better 'returnto' code
	 */
	public static function PersonalUrls( &$personal_urls, &$wgTitle ) {
		global $facebook, $wgUser, $wgLang, $wgShowIPinHeader;
		global $wgFbPersonalUrls, $wgFbConnectOnly;
		wfLoadExtensionMessages('FBConnect');
		
		/*
		 * Personal URLs option: remove_user_talk_link
		 */
		if ($wgFbPersonalUrls['remove_user_talk_link'] &&
				array_key_exists('mytalk', $personal_urls)) {
			unset($personal_urls['mytalk']);
		}
		
		// If the user is logged in and connected
		if ( $wgUser->isLoggedIn() && $facebook->getSession() ) {
			/*
			 * Personal URLs option: use_real_name_from_fb
			 */
			if ( !empty( $wgFbPersonalUrls['use_real_name_from_fb'] ) ) {
				// Start with the real name in the database
				$name = $wgUser->getRealName();
				// Ask Facebook for the real name
				if (!$name || $name == '') {
					try {
						// This might fail if we load a stale session from cookies
						$fbUser = $facebook->api('/me');
						$name = $fbUser['name'];
					} catch (FacebookApiException $e) {
						error_log($e);
					}
				}
				// Make sure we were able to get a name from the database or Facebook
				if ($name && $name != '') {
					$personal_urls['userpage']['text'] = $name;
				}
			}
			// Replace logout link with a button to disconnect from Facebook Connect
			if( empty( $wgFbPersonalUrls['hide_logout_of_fb'] ) ){
				unset( $personal_urls['logout'] );
				$personal_urls['fblogout'] = array(
					'text'   => wfMsg( 'fbconnect-logout' ),
					'href'   => '#',
					'active' => false );
			}
			
			/*
			 * Personal URLs option: link_back_to_facebook
			 */
			if ($wgFbPersonalUrls['link_back_to_facebook']) {
				try {
					$fbUser = $facebook->api('/me');
					$link = $fbUser['link'];
				} catch (FacebookApiException $e) {
					$link = 'http://www.facebook.com/profile.php?id=' .
						    $facebook->getUser();
				}
				$personal_urls['fblink'] = array(
					'text'   => wfMsg( 'fbconnect-link' ),
					'href'   => $link,
					'active' => false
				);
			}
		}
		// User is logged in but not Connected
		else if ($wgUser->isLoggedIn()) {
			/*
			 * Personal URLs option: hide_convert_button
			 */
			if (!$wgFbPersonalUrls['hide_convert_button']) {
				$personal_urls['fbconvert'] = array(
					'text'   => wfMsg( 'fbconnect-convert' ),
					'href'   => SpecialConnect::getTitleFor('Connect', 'Convert')->getLocalURL(
					                          'returnto=' . $wgTitle->getPrefixedURL()),
					'active' => $wgTitle->isSpecial( 'Connect' )
				);
			}
		}
		// User is not logged in
		else {
			/*
			 * Personal URLs option: hide_connect_button
			 */
			if (!$wgFbPersonalUrls['hide_connect_button']) {
				// Add an option to connect via Facebook Connect
				$personal_urls['fbconnect'] = array(
					'text'   => wfMsg( 'fbconnect-connect' ),
					'href'   => SpecialPage::getTitleFor( 'Connect' )->
					              getLocalUrl( 'returnto=' . $wgTitle->getPrefixedURL() ),
					'active' => $wgTitle->isSpecial('Connect')
				);
			}
			
			// Remove other personal toolbar links
			if ( !empty( $wgFbConnectOnly ) ) {
				foreach (array('login', 'anonlogin') as $k) {
					if (array_key_exists($k, $personal_urls)) {
						unset($personal_urls[$k]);
					}
				}
			}
		}
		return true;
	}
	
	/**
	 * Modify the preferences form. At the moment, we simply turn the user name
	 * into a link to the user's facebook profile.
	 * 
	 * TODO!
	 */
	public static function RenderPreferencesForm( $form, $output ) {
		global $facebook, $wgUser;
		
		// This hook no longer seems to work...
		return true;
		
		if( $facebook->getSession() ) {
			$html = $output->getHTML();
			$name = $wgUser->getName();
			$i = strpos( $html, $name );
			if ($i !== FALSE) {
				// If the user has a valid Facebook ID, link to the Facebook profile
				try {
					$fbUser = $facebook->api('/me');
					// Replace the old output with the new output
					$html = substr( $html, 0, $i ) .
					        preg_replace("/$name/", "$name (<a href=\"$fbUser[link]\" " .
					                     "class='mw-userlink mw-fbconnectuser'>" .
					                     wfMsg('fbconnect-link-to-profile') . "</a>",
					                     substr( $html, $i ), 1);
					$output->clearHTML();
					$output->addHTML( $html );
				} catch (FacebookApiException $e) {
					error_log($e);
				}
			}
		}
		return true;
	}

	/**
	 * Adds the class "mw-userlink" to links belonging to Connect accounts on
	 * the page Special:ListUsers.
	 */
	static function SpecialListusersFormatRow( &$item, $row ) {
		global $fbSpecialUsers;
		
		// Only modify Facebook Connect users
		if (!$fbSpecialUsers ||
				!count(FBConnectDB::getFacebookIDs(User::newFromName($row->user_name)))) {
			return true;
		}
		
		// Look to see if class="..." appears in the link
		$regs = array();
		preg_match( '/^([^>]*?)class=(["\'])([^"]*)\2(.*)/', $item, $regs );
		if (count( $regs )) {
			// If so, append " mw-userlink" to the end of the class list
			$item = $regs[1] . "class=$regs[2]$regs[3] mw-userlink$regs[2]" . $regs[4];
		} else {
			// Otherwise, stick class="mw-userlink" into the link just before the '>'
			preg_match( '/^([^>]*)(.*)/', $item, $regs );
			$item = $regs[1] . ' class="mw-userlink"' . $regs[2];
		}
		return true;
	}
	
	/**
	 * Adds some info about the governing Facebook group to the header form of
	 * Special:ListUsers.
	 */
	static function SpecialListusersHeaderForm( &$pager, &$out ) {
		global $wgFbUserRightsFromGroup, $facebook, $wgFbLogo;
		if ( empty($wgFbUserRightsFromGroup) ) {
			return true;
		}
		
		// TODO: Do we need to verify the Facebook session here?
		
		$gid = $wgFbUserRightsFromGroup;
		// Connect to the API and get some info about the group
		try {
			$group = $facebook->api('/' . $gid);
		} catch (FacebookApiException $e) {
			error_log($e);
		}
		$out .= '
			<table style="border-collapse: collapse;">
				<tr>
					<td>
						' . wfMsgWikiHtml( 'fbconnect-listusers-header',
						wfMsg( 'group-bureaucrat-member' ), wfMsg( 'group-sysop-member' ),
						"<a href=\"http://www.facebook.com/group.php?gid=$gid\">$group[name]</a>",
						"<a href=\"http://www.facebook.com/profile.php?id={$group[owner][id]}\" " .
						"class=\"mw-userlink\">{$group[owner][name]}</a>") . "
					</td>
	        		<td>
	        			<img src=\"https://graph.facebook.com/$gid/picture?type=large\" title=\"$group[name]\" alt=\"$group[name]\">
	        		</td>
	        	</tr>
	        </table>";
		return true;
	}
	
	/**
	 * Removes Special:UserLogin and Special:CreateAccount from the list of
	 * special pages if $wgFbConnectOnly is set to true.
	 */
	static function SpecialPage_initList( &$aSpecialPages ) {
		global $wgFbConnectOnly;
		if ( !empty( $wgFbConnectOnly) ) {
			$aSpecialPages['Userlogin'] = array('SpecialRedirectToSpecial', 'UserLogin',
			                       'Connect', false, array('returnto', 'returntoquery'));
			// Used in 1.12.x and above
			$aSpecialPages['CreateAccount'] = array('SpecialRedirectToSpecial',
			                                        'CreateAccount', 'Connect');
		}
		return true;
	}
	
	/**
	 * HACK: Please someone fix me or explain why this is necessary!
	 * 
	 * Unstub $wgUser to avoid race conditions and stop returning stupid false
	 * negatives!
	 * 
	 * This might be due to a bug in User::getRights() [called from
	 * User::isAllowed('read'), called from Title::userCanRead()], where mRights
	 * is retrieved from an uninitialized user. From my probing, it seems that
	 * the user is uninitialized with almost all members blank except for mFrom,
	 * equal to 'session'. The second time around, $user seems to point to the
	 * User object after being loaded from the session. After the user is loaded
	 * it has all the appropriate groups. However, before being loaded it seems
	 * that instead of being null, mRights is equal to the array
	 * (createaccount, createpage, createtalk, writeapi).
	 */
	static function userCan (&$title, &$user, $action, &$result) {
		// Unstub $wgUser (is there a more succinct way to do this?)
		$user->getId();
		return true;
	}
	
	/**
	 * Removes the 'createaccount' right from users if $wgFbConnectOnly is true.
	 */
	static function UserGetRights( &$user, &$aRights ) {
		global $wgFbConnectOnly;
		if ( !empty( $wgFbConnectOnly ) ) {
			foreach ( $aRights as $i => $right ) {
				if ( $right == 'createaccount' ) {
					unset( $aRights[$i] );
					break;
				}
			}
		}
		return true;
	}
	
	/**
	 * If the user isn't logged in, try to auto-authenticate via Facebook
	 * Connect. The Single Sign On magic of FBConnect happens in this function.
	 */
	static function UserLoadFromSession( $user, &$result ) {
		global $facebook, $wgCookiePrefix, $wgTitle, $wgOut, $wgUser;
		
		// Check to see if the user can be logged in from Facebook
		$fbId = $facebook->getSession() ? $facebook->getUser() : 0;
		// Check to see if the user can be loaded from the session
		$localId = isset($_COOKIE["{$wgCookiePrefix}UserID"]) ? 
				intval($_COOKIE["{$wgCookiePrefix}UserID"]) :
				(isset($_SESSION['wsUserID']) ? $_SESSION['wsUserID'] : 0);
		
		// Case: Not logged into Facebook, but logged into the wiki
		if (!$fbId && $localId) {
			$mwUser = User::newFromId($localId);
			// If the user was Connected, the JS should have logged them out...
			// TODO: test to see if they logged in normally (with a password)
			#if (FBConnectDB::userLoggedInWithPassword($mwUser)) return true;
			if (count(FBConnectDB::getFacebookIDs($mwUser))) {
				// Oh well, they shouldn't be here anyways; silently log them out
				$mwUser->logout();
				// Defaults have just been loaded, so save some time
				$result = false;
			}
		}
		// Case: Logged into Facebook, not logged into the wiki
		else if ($fbId && !$localId) {
			// Look up the MW ID of the Facebook user
			$mwUser = FBConnectDB::getUser($fbId);
			$id = $mwUser ? $mwUser->getId() : 0;
			// If the user doesn't exist, ask them to name their new account
			if (!$id) {
				// TODO: $wgTitle was empty for some strange reason...
				if (!empty( $wgTitle )) {
					$returnto = $wgTitle->isSpecial('Userlogout') || $wgTitle->isSpecial('Connect') ?
								'' : 'returnto=' . $wgTitle->getPrefixedURL();
				} else {
					$returnto = '';
				}
				// Don't redirect if we're on certain special pages
				if ($returnto != '') {
					// Redirect to Special:Connect so the Facebook user can choose a nickname
					$wgOut->redirect($wgUser->getSkin()->makeSpecialUrl('Connect', $returnto));
				}
			} else {
				// TODO: To complete the SSO experience, this should log the user on
				/*
				// Load the user from their ID
				$user->mId = $id;
				$user->mFrom = 'id';
				$user->load();
				// Update user's info from Facebook
				$fbUser = new FBConnectUser($mwUser);
				$fbUser->updateFromFacebook();
				// Authentification okay, no need to continue with User::loadFromSession()
				$result = true;
				/**/
			}
		}
		// Case: Not logged into Facebook or the wiki
		// Case: Logged into Facebook, logged into the wiki
		return true;
	}
	
	/**
	 * 
	 * 
	 */
	static function initPreferencesExtensionForm($user, &$wgExtensionPreferences) {
		$id = FBConnectDB::getFacebookIDs($user); 
		if( count($id) > 0 ) {
			//action="/index.php?title=TechTeam_QA_8_Wiki&amp;action=submit" method="post"
			$action = SpecialPage::getTitleFor( 'Connect' );
			$action  = $action->getFullURL("action=disconnect");
			$html = Xml::openElement("div");
			$html .= Xml::openElement( "form", array("submit" => "post", "action" => $action) );
			$html .= Xml::element( "input", array("type" => "submit", "value" => "Disconent"), '', true );
			$html .= Xml::closeElement( "form" );
 			$html .= Xml::closeElement( "div" );
			$wgExtensionPreferences = array_merge(
				array(
					array(
						'name' => 'ssasasas',
						'section' => 'fbconnect-prefstext',
						'html' => $html,
						'type' => PREF_CUSTOM_HTML_T) ), $wgExtensionPreferences);
		}
		
		return true;
	}
}
