<?php

/**
 * Extension to provide a global "bad username" list
 *
 * @author Rob Church <robchur@gmail.com>
 * @addtogroup Extensions
 * @copyright © 2006 Rob Church
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0
 */

if( defined( 'MEDIAWIKI' ) ) {

	$wgExtensionFunctions[] = 'efUsernameBlacklistSetup';
	$wgExtensionCredits['other'][] = array(
		'name' => 'Username Blacklist',
		'author' => 'Rob Church',
		'url' => 'http://www.mediawiki.org/wiki/Extension:Username_Blacklist',
		'description' => 'Restrict the creation of user accounts matching one or more regular expressions',
		);

	$wgAvailableRights[] = 'uboverride';
	$wgGroupPermissions['sysop']['uboverride'] = true;

	/**
	 * Register the extension
	 */
	function efUsernameBlacklistSetup() {
		global $wgHooks, $wgVersion, $wgMessageCache;
		require_once( dirname( __FILE__ ) . '/UsernameBlacklist.i18n.php' );
		$wgHooks['AbortNewAccount'][] = 'efUsernameBlacklist';
		$wgHooks['ArticleSave'][] = 'efUsernameBlacklistInvalidate';
		if( version_compare( $wgVersion, '1.9alpha', '>=' ) ) {
			foreach( efUsernameBlacklistMessages() as $lang => $messages )
				$wgMessageCache->addMessages( $messages, $lang );
		} else {
			$wgMessageCache->addMessages( efUsernameBlacklistMessages( true ) );
		}
	}

	/**
	 * Perform the check
	 * @param $user User to be checked
	 * @return bool
	 */
	function efUsernameBlacklist( &$user ) {
		global $wgUser;
		$blackList =& UsernameBlacklist::fetch();
		if( $blackList->match( $user->getName() ) && !$wgUser->isAllowed( 'uboverride' ) ) {
			global $wgOut;
			$returnTitle = Title::makeTitle( NS_SPECIAL, 'Userlogin' );
			$wgOut->errorPage( 'blacklistedusername', 'blacklistedusernametext' );
			$wgOut->returnToMain( false, $returnTitle->getPrefixedText() );
			return false;
		} else {
			return true;
		}
	}
	
	/**
	 * When the blacklist page is edited, invalidate the blacklist cache
	 *
	 * @param $article Page that was edited
	 * @return bool
	 */
	function efUsernameBlacklistInvalidate( &$article ) {
		$title =& $article->mTitle;
		if( $title->getNamespace() == NS_MEDIAWIKI && $title->getText() == 'Usernameblacklist' ) {
			$blacklist = UsernameBlacklist::fetch();
			$blacklist->invalidateCache();
		}
		return true;
	}	
	
	class UsernameBlacklist {
		
		var $regex;		
		
		/**
		 * Trim leading spaces and asterisks from the text
		 * @param $text Text to trim
		 * @return string
		 */
		function transform( $text ) {
			return trim( $text, ' *' );
		}
		
		/**
		 * Is the supplied text a comment?
		 * @param $text Text to check
		 * @return bool
		 */
		function isComment( $text ) {
			return substr( $this->transform( $text ), 0, 1 ) == '#';
		}
		
		/**
		 * Attempt to fetch the blacklist from cache; build it if needs be
		 *
		 * @return string
		 */
		function fetchBlacklist() {
			global $wgMemc, $wgDBname;
			$list = $wgMemc->get( $this->key );
			if( $list ) {
				return $list;
			} else {
				$list = $this->buildBlacklist();
				$wgMemc->set( $this->key, $list, 900 );
				return $list;
			}
		}
		
		/**
		 * Build the blacklist from scratch, using the message page
		 *
		 * @return string
		 */
		function buildBlacklist() {
			$blacklist = wfMsgForContent( 'usernameblacklist' );
			$groups = array();
			if( $blacklist != '&lt;usernameblacklist&gt;' ) {
				$lines = explode( "\n", $blacklist );
				foreach( $lines as $line ) {
					$line = rtrim( $line );
					if( !empty( $line ) && !$this->isComment( $line ) )
						$groups[] = $this->transform( $line );
				}
				return count( $groups ) ? '/(' . implode( '|', $groups ) . ')/u' : false;
			} else {
				return false;
			}
		}
		
		/**
		 * Invalidate the blacklist cache
		 */
		function invalidateCache() {
			global $wgMemc;
			$wgMemc->delete( $this->key );
		}
		
		/**
		 * Match a username against the blacklist
		 * @param $username Username to check
		 * @return bool
		 */
		function match( $username ) {
			return $this->regex ? preg_match( $this->regex, $username ) : false;
		}
		
		/**
		 * Constructor
		 * Prepare the regular expression
		 */
		function UsernameBlacklist() {
			global $wgDBname;
			$this->key = "{$wgDBname}:username-blacklist";
			$this->regex = $this->fetchBlacklist();
		}

		/**
		 * Fetch an instance of the blacklist class
		 * @return UsernameBlacklist
		 */
		function fetch() {
			static $blackList = false;
			if( !$blackList )
				$blackList = new UsernameBlacklist();
			return $blackList;
		}
		
	}
	
} else {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

?>
