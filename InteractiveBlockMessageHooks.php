<?php

/**
 * Hooks for Interactive block message
 *
 * @group Extensions
 */
class InteractiveBlockMessageHooks {
	/**
	 * @param $magicWords array
	 * @param $ln string (language)
	 * @return bool
	 */
	public static function magicWordVar( array &$magicWords, $ln ) {
		$magicWords['USERBLOCKED'] = array( 1, 'USERBLOCKED' );
		return true;
	}

	/**
	 * @param $vars array
	 * @return bool
	 */
	public static function magicWordSet( &$vars ) {
		$vars[] = 'USERBLOCKED';
		return true;
	}

	/**
	 * Function check if user is blocked, return true
	 * user blocked status is passed to $ret
	 * @param $parser Parser
	 * @param $varCache ??
	 * @param $index ??
	 * @param $ret string?
	 * @return bool
	 */
	public static function parserGetVariable( &$parser, &$varCache, &$index, &$ret ) {
		global $wgInteractiveBlockMessageCacheTimeout;
		if ( $index != 'USERBLOCKED' ) {
			return true;
		}
		
		if ( $parser->getTitle()->getNamespace() != NS_USER && $parser->getTitle()->getNamespace() != NS_USER_TALK ) {
			$ret = 'unknown';
			return true;
		}
	
		$user = User::newFromName( $parser->getTitle()->getBaseText() );
		if ($user instanceof User) {
			if ($user->isBlocked()) {
				// if user is blocked it's pretty much possible they will be unblocked one day :)
				// so we enable cache for shorter time only so that we can recheck later
				// if they weren't already unblocked - if there is a better way to do that, fix me
				$expiry = $user->getBlock()->mExpiry;
				if ( is_numeric ($expiry) ) { 
					$expiry = wfTimestamp( TS_UNIX, $expiry ) - wfTimestamp( TS_UNIX );
					if ( $expiry > 0 ) {
					// just to make sure
						$parser->getOutput()->updateCacheExpiry($expiry);
					}
				}
				$ret = 'true';
				return true;
			} else {
				$ret = 'false';
				return true;
			}
		} else {
			$ret = 'unknown';
			return true;
		}
	 	$ret = 'unknown';
		return true;
	}
}
