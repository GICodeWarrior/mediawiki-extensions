<?php
 
class AutoProxyBlock {
	function isProxy( $ip ) {
		global $wgAutoProxyBlockSources;
		
		if( isset($wgAutoProxyBlockSources['api']) ) {
			foreach($wgAutoProxyBlockSources['api'] as $url) {
				$request_options = array(
					'action' => 'query',
					'list' => 'blocks',
					'bkip' => "$ip",
					'bklimit' => '1',
					'bkprop' => 'expiry|reason',					
				);
 
				$ban = self::requestForeighAPI($url, $request_options);
				if( isset($ban['query']['blocks'][0]) && preg_match($wgAutoProxyBlockSources['key'], $ban['query']['blocks'][0]['reason']) ) {
					return true;
				}
			}
		}
 
		if( isset($wgAutoProxyBlockSources['raw']) ) {
			$list = array();
			foreach($wgAutoProxyBlockSources['raw'] as $file) {
				if( file_exists($file) ) {
					$p = file($file);
					if( $p ) {
						array_merge($list, $p);
					}
				}
			}
 
			return in_array( $ip, array_unique($list) );
		}
		
		return false;
	}
 
	function checkProxy( $title, $user, $action, &$result ) {
		global $wgProxyCanPerform, $wgAutoProxyBlockLog;
		
		if( in_array( $action, $wgProxyCanPerform ) || $user->isAllowed('proxyunbannable') ) return true;
		
		$IP = wfGetIP();
		if( self::isProxy( $IP ) ) {
			if($wgAutoProxyBlockLog) self::addInternalLogEntry( $IP, $title->mTextform, $user->mName, $action, $user );
			$result[] = array( 'proxy-blocked', $IP );
			return false;		   
		}
		
		return true;		
	}
 
	function AFSetVar( &$vars, $title ) {
		$vars->setVar( 'is_proxy', self::isProxy( wfGetIP() ) ? 1 : 0 );
		return true;
	}
 
	function AFBuilderVars( &$builder ) {
		$builder['vars']['is_proxy'] = 'is-proxy';
		return true;
	}
 
	function tagProxyChange( $recentChange ) { // -> add check user rights
		global $wgTagProxyActions, $wgUser;
		
		if ( $wgTagProxyActions && self::isProxy( wfGetIP() ) && !$wgUser->isAllowed( 'notagproxychanges' ) ) {
			ChangeTags::addTags( 'proxy', $recentChange->mAttribs['rc_id'], $recentChange->mAttribs['rc_this_oldid'], $recentChange->mAttribs['rc_logid'] );
		}
		return true;
	}
 
	function addProxyTag( &$emptyTags ) {
		global $wgTagProxyActions;
		
		if ( $wgTagProxyActions ) {
			$emptyTags[] = 'proxy';
		}
		return true;
	}
 
	function addInternalLogEntry( $ip, $title, $user, $action, $object ) {
		global $wgAutoProxyBlockLog;
		
		if( !$object->isAllowed('notagproxychanges') ) {
			$string = $ip . ' ' . $user . ' on page ' . $title . ' perform ' . $action . "\n";
 
			$file = fopen($wgAutoProxyBlockLog, 'a');
			fwrite($file, $string);
			fclose($file);
		}
		
		return true;		
	}
 
	function requestForeighAPI( $url, $options ) {
		$url .= '?format=php';
		foreach($options as $param => $value) {
			$url .= '&'.$param.'='.$value;
		}
		
		$content = Http::get($url)
		return unserialize($content);
	}
}