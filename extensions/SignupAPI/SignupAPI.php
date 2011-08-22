<?php
/**
 * Setup for SignupAPI extension, a special page that cleans up SpecialUserLogin
 * from signup related stuff, adds an API for signup, adds sourcetracking for
 *account creation & AJAX-ifies the signup form
 *
 * @file
 * @ingroup Extensions
 * @author Akshay Agarwal, akshayagarwal.in
 * @copyright © 2011 Akshay Agarwal
 * @licence GNU General Public Licence 2.0 or later
 */

if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

$wgExtensionCredits['specialpage'][] = array(
        'path' =>  __FILE__,
        'name' => 'SignupAPI',
        'version' => 1.0,
        'author' => 'Akshay Agarwal',
        'url' => 'http://www.mediawiki.org/wiki/Extension:SignupAPI',
	'descriptionmsg' => 'signupapi-desc',
);

$wgSignupAPIUseAjax = true;
$wgSignupAPISourceTracking = true;

$dir = dirname(__FILE__);
$wgExtensionMessagesFiles['SignupAPI'] = $dir . '/SignupAPI.i18n.php';
$wgMyExtensionIncludes = $dir . '/includes';
 
## Special page class
$wgAutoloadClasses['SignupForm'] 
  = $wgMyExtensionIncludes . '/SpecialUserSignup.php';

$wgAutoloadClasses['ApiSignup'] 
  = $wgMyExtensionIncludes . '/APISignup.php';
$wgSpecialPages['UserSignup'] = 'SignupForm';

if ( $wgSignupAPIUseAjax ) {
    $wgAutoloadClasses['validateSignup']
      = $wgMyExtensionIncludes . '/validateSignup.php';

    $wgAPIModules['signup'] = 'ApiSignup';
    $wgAPIModules['validatesignup'] = 'validateSignup';

    # Requires jquery.ui.progressbar for password strength validation
    $wgResourceModules['ext.SignupAPI'] = array(

        'scripts' => array( 'includes/verification.js' ),
        'messages' => array( 'ok', 'signupapi-enterpassword', 'passwordtooshort', 'signupapi-weak', 'signupapi-medium', 'signupapi-strong',  'badretype', 'signupapi-passwordsmatch' ),
        'dependencies' => array( 'jquery.ui.progressbar' ),
        'localBasePath' => dirname( __FILE__ ),
        'remoteExtPath' => 'SignupAPI'
    );

}

if ( $wgSignupAPISourceTracking ) {
    # Schema updates for update.php
    $wgHooks['LoadExtensionSchemaUpdates'][] = 'onSourceTracking';
    function onSourceTracking() {
        global $wgExtNewTables;
        $wgExtNewTables[] = array(
            'sourcetracking',
            dirname( __FILE__ ) . '/sourcetracking.sql' );
        return true;
    }

    # Add source tracking to personal URL's
    $wgHooks['PersonalUrls'][] = 'addSourceTracking';

    function addSourceTracking( &$personal_urls, &$title )
    {
        global $wgRequest,$wgUser;

        #generate source tracking parameters
        $sourceAction = $wgRequest->getVal( 'action' );
        $sourceNS = $title->getNamespace();
        $sourceArticle = $title->getArticleID();
        $loggedin = $wgUser->isLoggedIn();
        $thispage = $title->getPrefixedDBkey();
        $thisurl = $title->getPrefixedURL();
        $query = array();
        if ( !$wgRequest->wasPosted() ) {
                $query = $wgRequest->getValues();
                unset( $query['title'] );
                unset( $query['returnto'] );
                unset( $query['returntoquery'] );
        }
        $thisquery = wfUrlencode( wfArrayToCGI( $query ) );

        // Get the returnto and returntoquery parameters from the query string
        // or fall back on $this->thisurl or $this->thisquery
        // We can't use getVal()'s default value feature here because
        // stuff from $wgRequest needs to be escaped, but thisurl and thisquery
        // are already escaped.
        $page = $wgRequest->getVal( 'returnto' );
        if ( !is_null( $page ) ) {
                $page = wfUrlencode( $page );
        } else {
                $page = $thisurl;
        }
        $query = $wgRequest->getVal( 'returntoquery' );
        if ( !is_null( $query ) ) {
                $query = wfUrlencode( $query );
        } else {
                $query = $thisquery;
        }
        $returnto = "returnto=$page";
        if ( $query != '' ) {
                $returnto .= "&returntoquery=$query";
        }

        if (isset ( $personal_urls['login'] ) ) {
            $login_url = $personal_urls['login'];
            $login_url['href'] = $login_url['href']."&source_action=$sourceAction&source_ns=$sourceNS&source_article=$sourceArticle";
            $personal_urls['login'] = $login_url;
        }

        if ( isset ( $personal_urls['anonlogin'] ) ) {
            $login_url = $personal_urls['anonlogin'];
            $login_url['href'] = $login_url['href']."&source_action=$sourceAction&source_ns=$sourceNS&source_article=$sourceArticle";
            $personal_urls['anonlogin'] = $login_url;
        }

        if ( isset ( $personal_urls['createaccount'] ) ) {
            global $wgServer, $wgSecureLogin;
            $page = $wgRequest->getVal( 'returnto' );
            $is_signup = $wgRequest->getText( 'type' ) == "signup";
            $createaccount_url = array(
                    'text' => wfMsg( 'createaccount' ),
                    'href' => SkinTemplate::makeSpecialUrl( 'Usersignup', "$returnto&type=signup&wpSourceAction=$sourceAction&wpSourceNS=$sourceNS&wpSourceArticle=$sourceArticle" ),
                    'active' => $title->isSpecial( 'Userlogin' ) && $is_signup
            );

            if ( substr( $wgServer, 0, 5 ) === 'http:' && $wgSecureLogin ) {
                    $title = SpecialPage::getTitleFor( 'Usersignup' );
                    $https_url = preg_replace( '/^http:/', 'https:', $title->getFullURL( "type=signup" ) );
                    $createaccount_url['href']  = $https_url;
                    $createaccount_url['class'] = 'link-https';
            }
            $personal_urls['createaccount'] = $createaccount_url;
        }

        return true;
    }

}




