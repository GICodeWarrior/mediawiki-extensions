<?php

/**
 * Hooks for OnlineStatusBar
 *
 * @group Extensions
 */
class OnlineStatusBarHooks {
	/**
	 * @param DatabaseUpdate|null $updater
	 * @return bool
	 */
	public static function ckSchema( $updater = null ) {
		if ( $updater !== null ){
			$updater->addExtensionUpdate( array( 'addtable', 'online_status', dirname( __FILE__ ) . '/OnlineStatusBar.sql', true ) );
		} else {
			global $wgExtNewTables;
			$wgExtNewTables[] = array(
				'online_status', dirname( __FILE__ ) . '/OnlineStatusBar.sql' );
		}
		return true;
	}

	/**
	 * @param $user User
	 * @param $inject_html string
	 * @param $old_name string
	 * @return bool
	 */
	public static function logout( &$user, &$inject_html, $old_name ) {
		OnlineStatusBar::DeleteStatus( $old_name );
		return true;
	}

	/**
	 * @return bool
	 */
	public static function updateStatus() {
		OnlineStatusBar::UpdateDb();
		return true;
	}

	/**
	 * @param $article Article
	 * @param $outputDone bool
	 * @param $pcache string
	 * @return bool
	 */
	public static function renderBar( &$article, &$outputDone, &$pcache ) {
		global $messages, $wgOnlineStatusBarDefaultIpUsers, $wgOnlineStatusBarModes, $wgOut;
		OnlineStatusBar::UpdateStatus();
		// anonymous user
		$anon = false;
		$ns = $article->getTitle()->getNamespace();
		if ( ( $ns == NS_USER_TALK ) || ( $ns == NS_USER ) ) {
			$user = OnlineStatusBar::GetOwnerFromTitle ( $article->getTitle() );
			$userName = $article->getTitle()->getBaseText();
			if ( User::isIP ( $userName ) != true && $user == null ) {
				return true;
			}
			if ( User::isIP ( $userName ) && $user == null && $wgOnlineStatusBarDefaultIpUsers ) {
				// it's anon user and we want to track them
				$sanitizedusername = $userName;
				$anon = true;
			} else if ( $user != null ) {
				// Fix capitalisation issues
				$sanitizedusername = $user->getName();
			} else {
				return true;
			}
			if ( $anon == false )
			{
			// check if it's not anon, let's check the config
				if ( $user->getOption ( "OnlineStatusBar_hide" ) == true ) {
					return true;
				}
			}
			if ( OnlineStatusBar::IsValid( $userName ) ) {
				$mode = OnlineStatusBar::GetStatus( $userName );
				$modetext = $wgOnlineStatusBarModes[$mode];
				$image = OnlineStatusBar::getImageHtml( $mode );
				$text = wfMessage( 'onlinestatusbar-line', $userName )->rawParams( $image )->params( $modetext )->escaped();
				$wgOut->addHtml( OnlineStatusBar::Get_Html( $text, $mode ) );
			}
		}
		return true;
	}

	/**
	 * @param $user User
	 * @paramNireferences array
	 * @return bool
	 */
	public static function preferencesHook( User $user, array &$preferences ) {
		global $wgOnlineStatusBarDefaultOnline, $wgOnlineStatusBarDefaultEnabled, $wgOnlineStatusBarModes;
		$preferences['OnlineStatusBar_active'] = array( 'type' => 'toggle', 'label-message' => 'onlinestatusbar-used', 'section' => 'misc/onlinestatus' );
		$preferences['OnlineStatusBar_hide'] = array( 'type' => 'toggle', 'label-message' => 'onlinestatusbar-hide', 'section' => 'misc/onlinestatus' );
		$preferences['OnlineStatusBar_status'] = array( 'type' => 'radio', 'label-message' => 'onlinestatusbar-status', 'section' => 'misc/onlinestatus',
			'options' => array(
				$wgOnlineStatusBarModes['online'] => 'online',
				$wgOnlineStatusBarModes['busy'] => 'busy',
				$wgOnlineStatusBarModes['away'] => 'away',
				$wgOnlineStatusBarModes['hidden'] => 'hidden'
			),
		);
		return true;
	}

	/**
	 * @param $defaultOptions array
	 * @return bool
	 */
	public static function setDefaultOptions( &$defaultOptions ) {
		global $wgOnlineStatusBarDefaultOnline, $wgOnlineStatusBarDefaultEnabled;
		// set defaults
		$defaultOptions['OnlineStatusBar_status'] = $wgOnlineStatusBarDefaultOnline;
		$defaultOptions['OnlineStatusBar_active'] = $wgOnlineStatusBarDefaultEnabled;
		$defaultOptions['OnlineStatusBar_hide'] = false;
		// quit
		return true;
	}

	/**
	 * @param $magicWords array
	 * @param $ln string?
	 * @return bool
	 */
	public static function magicWordVar ( array &$magicWords, $ln ) {
		$magicWords['isonline'] = array ( 0, 'isonline' );
		return true;
	}

	/**
	 * @param $out OutputPage
	 * @param $skin Skin
	 * @return bool
	 */
	public static function stylePage ( &$out, &$skin ) {
		$out->addModules( 'ext.OnlineStatusBar' );
		return true;
	}

	/**
	 * @param $vars array
	 * @return bool
	 */
	public static function magicWordSet ( &$vars ) {
		$vars[] = 'isonline';
		return true;
	}

	/**
	 * @param $parser Parser
	 * @param $varCache ??
	 * @param $index ??
	 * @param $ret string?
	 * @return bool
	 */
	public static function parserGetVariable ( &$parser, &$varCache, &$index, &$ret ){
		global $wgOnlineStatusBarModes, $wgOnlineStatusBarDefaultOffline;
		if( $index == 'isonline' ){
			$ns = $parser->getTitle()->getNamespace();
                	if ( ( $ns != NS_USER_TALK ) && ( $ns != NS_USER ) ) {
				$ret = "unknown";
				return true;
			}
			$name = OnlineStatusBar::GetOwnerFromTitle ( $parser->getTitle() )->getName();

			if ( OnlineStatusBar::IsValid($name) != true ) {
				$ret = "unknown";
				return true;
			}
			$ret = OnlineStatusBar::GetStatus( $name );
			if ( $ret == "hidden" ) {
				$ret = $wgOnlineStatusBarDefaultOffline;
			}
		}
		return true;
	}
}
