<?php
if ( ! defined( 'MEDIAWIKI' ) )
	die();

class AbuseFilter {

	public static function generateUserVars( $user ) {
		$vars = array();
		
		// Load all the data we want.
		$user->load();
		
		$vars['USER_EDITCOUNT'] = $user->getEditCount();
		$vars['USER_AGE'] = time() - wfTimestampOrNull( TS_UNIX, $user->getRegistration() );
		$vars['USER_NAME'] = $user->getName();
		$vars['USER_GROUPS'] = implode(',', $user->getEffectiveGroups() );
		$vars['USER_EMAILCONFIRM'] = $user->getEmailAuthenticationTimestamp();
		
		// More to come
		
		return $vars;
	}
	
	public static function generateTitleVars( $title, $prefix ) {
		$vars = array();
		
		$vars[$prefix."_NAMESPACE"] = $title->getNamespace();
		$vars[$prefix."_TEXT"] = $title->getText();
		$vars[$prefix."_PREFIXEDTEXT"] = $title->getPrefixedText();
		
		if ($title->mRestrictionsLoaded) {
			// Don't bother if they're unloaded
			foreach( $title->mRestrictions as $action => $rights ) {
				$rights = count($rights) ? $rights : array();
				$vars[$prefix."_RESTRICTIONS_".$action] = implode(',', $rights );
			}
		}
		
		return $vars;
	}

	public static function checkConditions( $conds, $vars ) {
		$modifierWords = array( 'norm', 'supernorm', 'lcase', 'length' );
		$operatorWords = array( 'eq', 'neq', 'gt', 'lt', 'regex' );
		$validJoinConditions = array( '!', '|', '&' );
	
		// Remove leading/trailing spaces
		$conds = trim($conds);
		
		// Is it a set?
		if (substr( $conds, 0, 1 ) == '(' && substr( $conds, -1, 1 ) == ')' ) {
			// We should have a set here.
			$setInternal = substr($conds,1,-1);
			
			// Get the join condition ( &, | or ! )
			list($setJoinCondition,$conditionList) = explode(':', $setInternal, 2 );
			$setJoinCondition = trim($setJoinCondition);
			
			if (!in_array( $setJoinCondition, $validJoinConditions )) {
				// Bad join condition
				return false;
			}
			
			// Tokenise.
			$allConditions = self::tokeniseList( $conditionList );
			
			foreach( $allConditions as $thisCond ) {
			
				if (trim($thisCond)=='') {
					// Ignore it
					$result = true;
				} else {
					$result = self::checkConditions( $thisCond, $vars );
				}
				
				// Need we short-circuit?
				if ($setJoinCondition == '|' && $result) {
					// Definite yes.
					return true;
				} elseif ($setJoinCondition == '&' && !$result) {
					// Definite no.
					return false;
				} elseif ($setJoinCondition == '!' && $result) {
					// Definite no.
					return false;
				}
			}
			
			// Return the default result.
			return ($setJoinCondition != '|'); // Only OR returns false after checking all conditions.
		}
	
		// Grab the first word.
		list ($thisWord) = explode( ' ', $conds );
		$wordNum = 0;
		
		// Check for modifiers
		$modifier = '';
		if (in_array( $thisWord, $modifierWords ) ) {
			$modifier = $thisWord;
			$wordNum++;
			$thisWord = explode( ' ', $conds );
			$thisWord = $thisWord[$wordNum];
		}
		
		if ( in_array( $thisWord, array_keys($vars ) ) ) {
		
			$value = $vars[$thisWord];
			if ($modifier) {
				$value = self::modifyValue( $modifier, $value );
			}
			
			// We have a variable. Now read the next word to see what we're doing with it.
			$wordNum++;
			$thisWord = explode( ' ', $conds );
			$thisWord = $thisWord[$wordNum];
			
			if ( in_array( $thisWord, $operatorWords ) ) {
				// Get the rest of the string after the operator.
				$parameters = explode( ' ', $conds, $wordNum+2);
				$parameters = $parameters[$wordNum+1];
				
				return self::checkOperator( $thisWord, $value, $parameters );
			}
		} else {
			print "Word $thisWord is not a variable (".implode(',', array_keys($vars)).")\n";
		}
	}
	
	public static function tokeniseList( $list ) {
		// Parse it, character by character.
		$escapeNext = false;
		$listLevel = 0;
		$thisToken = '';
		$allTokens = array();
		for( $i=0;$i<strlen($list);$i++ ) {
			$char = substr( $list, $i, 1 );
			
			$suppressAdd = false;
			
			// We don't care about semicolons and so on unless it's 
			if ($listLevel == 0) {
				if ($char == "\\") {
					if ($escapeNext) { // Escaped backslash
						$escapeNext = false;
					} else {
						$escapeNext = true;
						$suppressAdd = true;
					}
				} elseif ($char == ';') {
					if ($escapeNext) {
						$escapeNext = false; // Escaped semicolon
					} else { // Next token, plz
						$escapeNext = false;
						$allTokens[] = $thisToken;
						$thisToken = '';
						$suppressAdd = true;
					}
				} elseif ($escapeNext) {
					$escapeNext = false;
					$thisToken .= "\\"; // The backslash wasn't intended to escape.
				}
			}
			
			if ($char == '(' && $lastChar == ';') {
				// A list!
				$listLevel++;
			} elseif ($char == ')' && ($lastChar == ';' || $lastChar == ')' || $lastChar = '') ) {
				$listLevel--; // End of a list.
			}
			
			if (!$suppressAdd) {
				$thisToken .= $char;
			}
			
			// Ignore whitespace.
			if ($char != ' ') {
				$lastChar = $char;
			}
		}
		
		// Put any leftovers in
		$allTokens[] = $thisToken;
		
		return $allTokens;
	}
	
	public static function modifyValue( $modifier, $value ) {
		if ($modifier == 'norm') {
			return self::normalise( $value );
		} elseif ($modifier == 'supernorm') {
			return self::superNormalise( $value );
		} elseif ($modifier == 'lcase') {
			return strtolower($value);
		} elseif ($modifier == 'length') {
			return strlen($value);
		} elseif ($modifier == 'specialratio') {
			$specialsonly = preg_replace('/\w/', '', $value );
			return (strlen($specialsonly) / strlen($value));
		}
	}
	
	public static function checkOperator( $operator, $value, $parameters ) {
		if ($operator == 'eq') {
			return $value == $parameters;
		} elseif ($operator == 'neq') {
			return $value != $parameters;
		} elseif ($operator == 'gt') {
			return $value > $parameters;
		} elseif ($operator == 'lt') {
			return $value < $parameters;
		} elseif ($operator == 'regex') {
			return preg_match( $parameters, $value );
		} else {
			return false;
		}
	}
	
	public static function superNormalise( $text ) {
		$text = self::normalise( $text );
		$text = preg_split( '//', $text, -1, PREG_SPLIT_NO_EMPTY ); // Split to a char array.
		sort($text);
		$text = array_unique( $text ); // Remove duplicate characters.
		$text = implode( '', $text );
		
		return $text;
	}
	
	public static function normalise( $text ) {
		$old_text = $text;
		$text = preg_replace( '/\W/', '', $text ); // Remove any special characters.
		$text = strtolower($text);
		$text = preg_split( '//', $text, -1, PREG_SPLIT_NO_EMPTY ); // Split to a char array.
		$text = AntiSpoof::equivString( $text ); // Normalise
		
		// Remove repeated characters, but not all duplicates.
		$oldText = $text;
		$text = array($oldText[0]);
		for ($i=1;$i<count($oldText);$i++) {
			if ($oldText[$i] != $oldText[$i-1]) {
				$text[] = $oldText[$i];
			}
		}
		
		$text = implode('', $text ); // Sort in alphabetical order, put back as it was.
		
		return $text;
	}
	
	public static function filterAction( $vars, $title ) {
		global $wgUser;
		
		// Fetch from the database.
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select( 'abuse_filter', '*', array( 'af_enabled' => 1 ) );
		
		$blocking_filters = array();
		$log_entries = array();
		$log_template = array( 'afl_user' => $wgUser->getId(), 'afl_user_text' => $wgUser->getName(),
					'afl_var_dump' => serialize( $vars ), 'afl_timestamp' => $dbr->timestamp(wfTimestampNow()),
					'afl_namespace' => $title->getNamespace(), 'afl_title' => $title->getDbKey(), 'afl_ip' => wfGetIp() );
		$doneActionsByFilter = array();
		
		while ( $row = $dbr->fetchObject( $res ) ) {
			if ( self::checkConditions( $row->af_pattern, $vars ) ) {
				$blocking_filters[$row->af_id] = $row;
				
				$newLog = $log_template;
				$newLog['afl_filter'] = $row->af_id;
				$newLog['afl_action'] = $vars['ACTION'];
				$log_entries[] = $newLog;
				
				$doneActionsByFilter[$row->af_id] = array();
			}
		}
		
		if (count($blocking_filters) == 0 ) {
			// No problems.
			return true;
		}
		
		// Retrieve the consequences.
		$res = $dbr->select( 'abuse_filter_action', '*', array( 'afa_filter' => array_keys( $blocking_filters ) ), __METHOD__, array( "ORDER BY" => " (afa_consequence in ('throttle','warn')) desc" ) );
		// We want throttles, warnings first, as they have a bit of a special treatment.
		
		$actions_done = array();
		$throttled_filters = array();
		
		$display = '';
		
		while ( $row = $dbr->fetchObject( $res ) ) {
			$action_key = md5( $row->afa_consequence . $row->afa_parameters );
			if (!in_array( $action_key, $actions_done ) && !in_array( $row->afa_filter, $throttled_filters ) ) {
				$parameters = explode( "\n", $row->afa_parameters );
				$result = self::takeConsequenceAction( $row->afa_consequence, $parameters, $title, $vars, &$display, &$continue );
				$doneActionsByFilter[$row->afa_filter][] = $row->afa_consequence;
				if (!$result) {
					$throttled_filters[] = $row->afa_filter; // Only execute other actions for a filter if that filter's rate limiter has been tripped.
				}
				$actions_done[] = $action_key;
			} else {
				// Ignore it, until we hit the rate limit.
			}
		}
		
		$dbw = wfGetDB( DB_MASTER );
		
		// Log it
		foreach( $log_entries as $index => $entry ) {
			$log_entries[$index]['afl_actions'] = implode( ',', $doneActionsByFilter[$entry['afl_filter']] );
			
			// Increment the hit counter
			$dbw->update( 'abuse_filter', array( 'af_hit_count=af_hit_count+1' ), array( 'af_id' => $entry['afl_filter'] ), __METHOD__ );
		}
		
		$dbw->insert( 'abuse_filter_log', $log_entries, __METHOD__ );
		
		return $display;
	}
	
	public static function takeConsequenceAction( $action, $parameters, $title, $vars, &$display, &$continue ) {
		switch ($action) {
			case 'warn':
				wfLoadExtensionMessages( 'AbuseFilter' );
				
				if (!$_SESSION['abusefilter-warned']) {
					$_SESSION['abusefilter-warned'] = true;
					
					// Threaten them a little bit
					if (strlen($parameters[0])) {
						$display .= call_user_func_array( 'wfMsg', $parameters ) . "\n";
					} else {
						// Generic message.
						$display .= wfMsg( 'abusefilter-warning' );
					}
					
					return false; // Don't apply the other stuff yet.
				} else {
					// We already warned them
					$_SESSION['abusefilter-warned'] = false;
				}
				break;
				
			case 'disallow':
				wfLoadExtensionMessages( 'AbuseFilter' );
				
				// Don't let them do it
				if (strlen($parameters[0])) {
					$display .= call_user_func_array( 'wfMsg', $parameters ) . "\n";
				} else {
					// Generic message.
					$display .= wfMsg( 'abusefilter-disallowed' );
				}
				break;
				
			case 'block':
				wfLoadExtensionMessages( 'AbuseFilter' );
				
				global $wgUser;

				// Create a block.
				$block = new Block;
				$block->mAddress = $wgUser->getName();
				$block->mUser = $wgUser->getId();
				$block->mByName = wfMsgForContent( 'abusefilter-blocker' );
				$block->mReason = wfMsgForContent( 'abusefilter-blockreason' );
				$block->mTimestamp = wfTimestampNow();
				$block->mEnableAutoblock = 1;
				$block->mAngryAutoblock = 1; // Block lots of IPs
				$block->mCreateAccount = 1;
				$block->mExpiry = 'infinity';

				$block->insert();
				
				$display .= wfMsg( 'abusefilter-blocked-display' );
				break;
			case 'throttle':
				$throttleId = array_shift( $parameters );
				list( $rateCount, $ratePeriod ) = explode( ',', array_shift( $parameters ) );
				
				$hitThrottle = false;
				
				// The rest are throttle-types.
				foreach( $parameters as $throttleType ) {
					$hitThrottle = $hitThrottle || self::isThrottled( $throttleId, $throttleType, $title, $rateCount, $ratePeriod );
				}
				
				return $hitThrottle;
				break;
			case 'degroup':
				wfLoadExtensionMessages( 'AbuseFilter' );
				
				global $wgUser;
				
				// Remove all groups from the user. Ouch.
				$groups = $wgUser->getGroups();
				
				foreach( $groups as $group ) {
					$wgUser->removeGroup( $group );
				}
				
				$display = wfMsg( 'abusefilter-degrouped' );
				
				break;
			case 'blockautopromote':
				wfLoadExtensionMessages( 'AbuseFilter' );
				
				global $wgUser, $wgMemc;
				
				$blockPeriod = (int)mt_rand( 3*86400, 7*86400 ); // Block for 3-7 days.
				$wgMemc->set( self::autoPromoteBlockKey( $wgUser ), true, $blockPeriod );
				
				$display = wfMsg( 'abusefilter-autopromote-blocked' );
				
				break;

			case 'flag':
				// Do nothing. Here for completeness.
				break;
		}
		
		return true;
	}
	
	public static function isThrottled( $throttleId, $types, $title, $rateCount, $ratePeriod ) {
		global $wgMemc;
		
		$key = self::throttleKey( $throttleId, $types, $title );
		$count = $wgMemc->get( $key );
		
		if ($count > 0) {
			$wgMemc->incr( $key );
			if ($count > $rateCount) {
				//die( "Hit rate limiter: $count actions, against limit of $rateCount actions in $ratePeriod seconds (key is $key).\n" );
				$wgMemc->delete( $key );
				return true; // THROTTLED
			}
		} else {
			$wgMemc->add( $key, 1, $ratePeriod );
		}
		
		return false; // NOT THROTTLED
	}
	
	public static function throttleIdentifier( $type, $title ) {
		global $wgUser;
		
		switch ($type) {
			case 'ip':
				$identifier = wfGetIp();
				break;
			case 'user':
				$identifier = $wgUser->getId();
				break;
			case 'range':
				$identifier = substr(IP::toHex(wfGetIp()),0,4);
				break;
			case 'creationdate':
				$reg = $wgUser->getRegistration();
				$identifier = $reg - ($reg % 86400);
				break;
			case 'editcount':
				// Hack for detecting different single-purpose accounts.
				$identifier = $wgUser->getEditCount();
				break;
			case 'site':
				return 1;
				break;
			case 'page':
				return $title->getPrefixedText();
				break;
		}
		
		return $identifier;
	}
	
	public static function throttleKey( $throttleId, $type, $title ) {
		$identifier = '';

		$types = explode(',', $type);
		
		$identifiers = array();
		
		foreach( $types as $subtype ) {
			$identifiers[] = self::throttleIdentifier( $subtype, $title );
		}
		
		$identifier = implode( ':', $identifiers );
	
		return wfMemcKey( 'abusefilter', 'throttle', $throttleId, $type, $identifier );
	}
	
	public static function autoPromoteBlockKey( $user ) {
		return wfMemcKey( 'abusefilter', 'block-autopromote', $user->getId() );
	}
}
