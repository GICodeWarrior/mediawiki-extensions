<?php
/**
 * SimpleSecurity class
 */
class SimpleSecurity {

	var $guid  = '';
	var $cache = array();
	var $info  = array(
		'LS' => array(), # security info for rules from LocalSettings ($wgPageRestrictions)
		'PR' => array(), # security info for rules from protect tab
		'CR' => array()  # security info for rules which are currently in effect
	);


	function __construct() {
		global $wgExtensionFunctions;

		# Put SimpleSecurity's setup function before all others
		array_unshift( $wgExtensionFunctions, array( $this, 'setup' ) );
	}

	function setup() {
		global $wgParser, $wgHooks, $wgLogTypes, $wgLogNames, $wgLogHeaders, $wgLogActions,
			$wgSecurityMagicIf, $wgSecurityMagicGroup, $wgSecurityExtraActions, $wgSecurityExtraGroups,
			$wgRestrictionTypes, $wgRestrictionLevels, $wgGroupPermissions,
			$wgSecurityRenderInfo, $wgSecurityAllowUnreadableLinks, $wgSecurityGroupsArticle;

		# Add our hooks
		$wgHooks['UserGetRights'][] = $this;
		$wgHooks['ImgAuthBeforeStream'][] = $this;
		if ( $wgSecurityMagicIf )    $wgParser->setFunctionHook( $wgSecurityMagicIf,    array( $this, 'ifUserCan' ) );
		if ( $wgSecurityMagicGroup ) $wgParser->setFunctionHook( $wgSecurityMagicGroup, array( $this, 'ifGroup' ) );
		if ( $wgSecurityRenderInfo ) $wgHooks['OutputPageBeforeHTML'][] = $this;
		if ( $wgSecurityAllowUnreadableLinks ) $wgHooks['BeforePageDisplay'][] = $this;

		# Add a new log type
		$wgLogTypes[]                  = 'security';
		$wgLogNames  ['security']      = 'securitylogpage';
		$wgLogHeaders['security']      = 'securitylogpagetext';
		$wgLogActions['security/deny'] = 'securitylogentry';

		# Each extra action is also a restriction type
		foreach ( $wgSecurityExtraActions as $k => $v ) {
			$wgRestrictionTypes[] = $k;
		}

		# Add extra available groups if $wgSecurityGroupsArticle is set
		if ( $wgSecurityGroupsArticle ) {
			$groups = new Article( Title::newFromText( $wgSecurityGroupsArticle, NS_MEDIAWIKI ) );
			if ( preg_match_all( "/^\*?\s*(.+?)\s*(\|\s*(.+))?$/m", $groups->getContent(), $match ) ) {
				foreach( $match[1] as $i => $k ) {
					$v = $match[3][$i];
					if ( $v ) $wgSecurityExtraGroups[strtolower( $k )] = $v;
					else $wgSecurityExtraGroups[strtolower( $k )] = '';
				}
			}
		}

		# Ensure the new groups show up in rights management
		# - note that 1.13 does a strange check in the ProtectionForm::buildSelector
		#   $wgUser->isAllowed($key) where $key is an item from $wgRestrictionLevels
		#   this requires that we treat the extra groups as an action and make sure its allowed by the user
		foreach ( $wgSecurityExtraGroups as $k => $v ) {
			if ( is_numeric( $k ) ) {
				$k = strtolower( $v );
			}
			$wgRestrictionLevels[] = $k;
			$wgGroupPermissions[$k][$k] = true;      # members of $k must be allowed to perform $k
			$wgGroupPermissions['sysop'][$k] = true; # sysops must be allowed to perform $k as well
		}

	}


	/**
	 * Process the ifUserCan conditional security directive
	 */
	public function ifUserCan( &$parser, $action, $pagename, $then, $else = '' ) {
		return Title::newFromText( $pagename )->userCan( $action ) ? $then : $else;
	}


	/**
	 * Process the ifGroup conditional security directive
	 * - evaluates to true if current uset belongs to any of the comma-separated users and/or groups in the first parameter
	 */
	public function ifGroup( &$parser, $groups, $then, $else = '' ) {
		global $wgUser;
		$intersection = array_intersect( array_map( 'strtolower', explode( ',', $groups ) ), $wgUser->getEffectiveGroups() );
		return count( $intersection ) > 0 ? $then : $else;
	}


	/**
	 * Convert the urls with guids for hrefs into non-clickable text of class "unreadable"
	 */
	public function onBeforePageDisplay( &$out ) {
		$out->mBodytext = preg_replace_callback(
			"|<a[^>]+title=\"(.+?)\".+?>(.+?)</a>|",
			array( $this, 'unreadableLink' ),
			$out->mBodytext
		);
		return true;
	}


	/**
	 * Render security info if any restrictions on this title
	 * Also make restricted pages not archive by robots
	 */
	public function onOutputPageBeforeHTML( &$out, &$text ) {
		global $wgUser, $wgTitle;
		$title = $wgTitle;

		# Render info
		if ( is_object( $title ) && $title->exists() && count( $this->info['LS'] ) + count( $this->info['PR'] ) ) {

			$rights = $wgUser->getRights();
			$title->getRestrictions( false );
			$reqgroups = $title->mRestrictions;
			$sysop = in_array( 'sysop', $wgUser->getGroups() );

			# Build restrictions text
			$itext = "<ul>\n";
			foreach ( $this->info as $source => $rules ) if ( !( $sysop && $source === 'CR' ) ) {
				foreach ( $rules as $info ) {
					list( $action, $groups, $comment ) = $info;
					$gtext = $this->groupText( $groups );
					$itext .= "<li>" . wfMsg( 'security-inforestrict', "<b>$action</b>", $gtext ) . " $comment</li>\n";
				}
			}
			if ( $sysop ) $itext .= "<li>" . wfMsg( 'security-infosysops' ) . "</li>\n";
			$itext .= "</ul>\n";

			# Add some javascript to allow toggling the security-info
			$out->addScript( "<script type='text/javascript'>
				function toggleSecurityInfo() {
					var info = document.getElementById('security-info');
					info.style.display = info.style.display ? '' : 'none';
				}</script>"
			);

			# Add info-toggle before title and hidden info after title
			$link = "<a href='javascript:'>" . wfMsg( 'security-info-toggle' ) . "</a>";
			$link = "<span onClick='toggleSecurityInfo()'>$link</span>";
			$info = "<div id='security-info-toggle'>" . wfMsg( 'security-info', $link ) . "</div>\n";
			$text = "$info<div id='security-info' style='display:none'>$itext</div>\n$text";
		}

		return true;
	}


	/**
	 * Callback function for unreadable link replacement
	 */
	private function unreadableLink( $match ) {
		global $wgUser;
		return $this->userCanReadTitle( $wgUser, Title::newFromText( $match[1] ), $error )
			? $match[0] : "<span class=\"unreadable\">$match[2]</span>";
	}


	/**
	 * Check if image is accessible by current user when using img_auth
	 */
	public function onImgAuthBeforeStream( &$title, &$path, &$name, &$result ) {
		global $wgUser;
		if ( !$this->userCanReadTitle( $wgUser, $title, $error )) {
			$result = array('img-auth-accessdenied', 'img-auth-noread', $name);
			return false;
		}
		return true;
	}


	/**
	 * User::getRights returns a list of rights (allowed actions) based on the current users group membership
	 * Title::getRestrictions returns a list of groups who can perform a particular action
	 * So getRights should filter out any title-based restriction's actions which require groups that the user is not a member of
	 * - Allows sysop access
	 * - clears and populates the info array
	 */
	public function onUserGetRights( $user, &$rights ) {
		global $wgGroupPermissions, $wgOut, $wgTitle, $wgRequest, $wgPageRestrictions;

		# Hack to prevent specialpage operations on unreadable pages
		if ( !is_object( $wgTitle ) ) return true;
		$title = $wgTitle;
		$ns = $title->getNamespace();
		if ( $ns == NS_SPECIAL ) {
			list( $name, $par ) = explode( '/', $title->getDBkey() . '/', 2 );
			if ( $par ) $title = Title::newFromText( $par );
			elseif ( $wgRequest->getVal( 'target' ) )   $title = Title::newFromText( $wgRequest->getVal( 'target' ) );
			elseif ( $wgRequest->getVal( 'oldtitle' ) ) $title = Title::newFromText( $wgRequest->getVal( 'oldtitle' ) );
		}
		if ( !is_object( $title ) ) return true;   # If still no usable title bail

		$groups = $user->getEffectiveGroups();

		# Filter rights according to $wgPageRestrictions
		# - also update LS (rules from local settings) items to info array
		$this->pageRestrictions( $rights, $groups, $title, true );

		# Add PR (rules from article's protect tab) items to info array
		# - allows rules in protection tab to override those from $wgPageRestrictions
		if ( !$title->mRestrictionsLoaded ) $title->loadRestrictions();
		foreach ( $title->mRestrictions as $a => $g ) if ( count( $g ) ) {
			$this->info['PR'][] = array( $a, $g, wfMsg( 'security-desc-PR' ) );
			if ( array_intersect( $groups, $g ) ) $rights[] = $a;
		}

		# If title is not readable by user, remove the read and move rights, and tell robots not to archive
		if ( !in_array( 'sysop', $groups ) && !$this->userCanReadTitle( $user, $title, $error ) ) {
			foreach ( $rights as $i => $right ) if ( $right === 'read' || $right === 'move' ) unset( $rights[$i] );
			# $this->info['CR'] = array('read', '', '');
			$wgOut->addMeta( 'robots', 'noarchive' );

		}

		return true;
	}


	/**
	 * Patches SQL queries to ensure that the old_id field is present in all requests for the old_text field
	 * otherwise the title that the old_text is associated with can't be determined
	 */
	static function patchSQL( $sql ) {
		return preg_replace_callback( "/^SELECT\b\s*(.+?)\s*\bFROM\b/i", 'SimpleSecurity::patchSQL_internal', $sql, 1 );
	}

	/**
	 * Callback for patchSQL()
	 */
	static private function patchSQL_internal( $match ) {
		if ( !preg_match( "/old_text/", $match[1] ) ) return $match[0];
		$fields = str_replace( " ", "", $match[1] );
		return ( preg_match( "/old_id/", $fields ) ) ? $match[0] : "SELECT $fields, old_id FROM";
	}


	/**
	 * Validate the passed database row and replace any invalid content
	 * - called from fetchObject hook whenever a row contains old_text
	 * - old_id is guaranteed to exist due to patchSQL method
	 * - bails if sysop
	 */
	public function validateRow( &$row ) {
		global $wgUser;
		$groups = $wgUser->getEffectiveGroups();
		if ( in_array( 'sysop', $groups ) || empty( $row->old_id ) ) return;

		# Obtain a title object from the old_id
		$dbr   = wfGetDB( DB_SLAVE );
		$tbl   = $dbr->tableName( 'revision' );
		$rev   = $dbr->selectRow( $tbl, 'rev_page', "rev_text_id = {$row->old_id}", __METHOD__ );
		$title = Title::newFromID( $rev->rev_page );

		# Replace text content in the passed database row if title unreadable by user
		if ( !$this->userCanReadTitle( $wgUser, $title, $error ) ) $row->old_text = $error;
	}


	/**
	 * Return bool for whether or not passed user has read access to the passed title
	 * - if there are read restrictions in place for the title, check if user a member of any groups required for read access
	 */
	public function userCanReadTitle( &$user, &$title, &$error ) {
		$groups = $user->getEffectiveGroups();
		if ( !is_object( $title ) || in_array( 'sysop', $groups ) ) return true;

		# Retrieve result from cache if exists (for re-use within current request)
		$key = $user->getID() . '\x07' . $title->getPrefixedText();
		if ( array_key_exists( $key, $this->cache ) ) {
			$error = $this->cache[$key][1];
			return $this->cache[$key][0];
		}

		# Determine readability based on $wgPageRestrictions
		$rights = array( 'read' );
		$this->pageRestrictions( $rights, $groups, $title );
		$readable = count( $rights ) > 0;

		# If there are title restrictions that prevent reading, they override $wgPageRestrictions readability
		$whitelist = $title->getRestrictions( 'read' );
		if ( count( $whitelist ) > 0 && !count( array_intersect( $whitelist, $groups ) ) > 0 ) $readable = false;

		$error = $readable ? "" : wfMsg( 'badaccess-read', $title->getPrefixedText() );
		$this->cache[$key] = array( $readable, $error );
		return $readable;
	}


	/**
	 * Returns a textual description of the passed list
	 */
	private function groupText( &$groups ) {
		$gl = $groups;
		$gt = array_pop( $gl );
		// FIXME: use $wgLang->commafy()
		// FIXME: hard coded bold. Not all scripts use this. Needs i18n support.
		if ( count( $groups ) > 1 ) $gt = wfMsg( 'security-manygroups', "<b>" . join( "</b>, <b>", $gl ) . "</b>", "<b>$gt</b>" );
		else $gt = "the <b>$gt</b> group"; // FIXME: hard coded text. Needs i18n support.
		return $gt;
	}


	/**
	 * Reduce the passed list of rights based on $wgPageRestrictions and the passed groups and title
	 * $wgPageRestrictions contains category and namespace based permissions rules
	 * the format of the rules is [type][action] = group(s)
	 * also adds LS items and currently active LS to info array
	 */
	private function pageRestrictions( &$rights, &$groups, &$title, $updateInfo = false ) {
		global $wgPageRestrictions;
		$cats = array();
		foreach ( $wgPageRestrictions as $k => $restriction ) if ( preg_match( '/^(.+?):(.*)$/', $k, $m ) ) {
			$type = ucfirst( $m[1] );
			$data = $m[2];
			$deny = false;

			# Validate rule against the title based on its type
 			switch ( $type ) {

				case "Category":

					# If processing first category rule, build a list of cats this article belongs to
					if ( count( $cats ) == 0 ) {
						$dbr = wfGetDB( DB_SLAVE );
						$cl  = $dbr->tableName( 'categorylinks' );
						$id  = $title->getArticleID();
						$res = $dbr->select( $cl, 'cl_to', "cl_from = '$id'", __METHOD__, array( 'ORDER BY' => 'cl_sortkey' ) );
						while ( $row = $dbr->fetchRow( $res ) ) $cats[] = $row[0];
						$dbr->freeResult( $res );
						}

					$deny = in_array( $data, $cats );
					break;

				case "Namespace":
					$deny = $data == $title->getNsText();
					break;
			}

			# If the rule applies to this title, check if we're a member of the required groups,
			# remove action from rights list if not (can be mulitple occurences)
			# - also update info array with page-restriction that apply to this title (LS), and rules in effect for this user (CR)
			if ( $deny ) {
				foreach ( $restriction as $action => $reqgroups ) {
					if ( !is_array( $reqgroups ) ) {
						$reqgroups = array( $reqgroups );
					}

					if ( $updateInfo ) {
						$this->info['LS'][] = array( $action, $reqgroups, wfMsg( 'security-desc-LS', wfMsg( 'security-type-' . strtolower( $type ) ), $data ) );
					}

					if ( !in_array( 'sysop', $groups ) && !array_intersect( $groups, $reqgroups ) ) {
						foreach ( $rights as $i => $right ) if ( $right === $action ) unset( $rights[$i] );
						# $this->info['CR'][] = array($action, $reqgroups, wfMsg('security-desc-CR'));
					}
				}
			}
		}
	}

	/**
	 * Create the new Database class with hooks in its query() and fetchObject() methods and use our LBFactory_SimpleSecurity class
	 */
	static function applyDatabaseHook() {
		global $wgDBtype, $wgLBFactoryConf;

		# Create a new "Database_SimpleSecurity" database class with hooks into its query() and fetchObject() methods
		# - hooks are added in a sub-class of the database type specified in $wgDBtype
		# - query method is overriden to ensure that old_id field is returned for all queries which read old_text field
		# - only SELECT statements are ever patched
		# - fetchObject method is overridden to validate row content based on old_id
		eval( 'class Database_SimpleSecurity extends Database' .  ucfirst( $wgDBtype ) . ' {
			public function query( $sql, $fname = "", $tempIgnore = false ) {
				return parent::query( SimpleSecurity::PatchSQL( $sql ), $fname, $tempIgnore );
			}
			function fetchObject( $res ) {
				global $wgSimpleSecurity;
				$row = parent::fetchObject( $res );
				if( isset( $row->old_text ) ) $wgSimpleSecurity->validateRow( $row );
				return $row;
			}
		}' );

		# Make sure our new LBFactory is used which in turn uses our LoadBalancer and Database classes
		$wgLBFactoryConf = array( 'class' => 'LBFactory_SimpleSecurity' );

	}

}

/**
 * The new LBFactory_SimpleSecurity class identical to LBFactory_Simple except that it returns a LoadBalancer_SimpleSecurity object
 */
class LBFactory_SimpleSecurity extends LBFactory_Simple {

	function newMainLB( $wiki = false ) {
		global $wgDBservers, $wgMasterWaitTimeout;
		if ( $wgDBservers ) {
			$servers = $wgDBservers;
		} else {
			global $wgDBserver, $wgDBuser, $wgDBpassword, $wgDBname, $wgDBtype, $wgDebugDumpSql;
			$servers = array(array(
				'host' => $wgDBserver,
				'user' => $wgDBuser,
				'password' => $wgDBpassword,
				'dbname' => $wgDBname,
				'type' => $wgDBtype,
				'load' => 1,
				'flags' => ($wgDebugDumpSql ? DBO_DEBUG : 0) | DBO_DEFAULT
			));
		}
		return new LoadBalancer_SimpleSecurity( array(
			'servers' => $servers,
			'masterWaitTimeout' => $wgMasterWaitTimeout
		));
	}

}

/**
 * LoadBalancer_SimpleSecurity always returns Database_SimpleSecurity regardles of $wgDBtype
 */
class LoadBalancer_SimpleSecurity extends LoadBalancer {

	function reallyOpenConnection( $server, $dbNameOverride = false ) {
		if( !is_array( $server ) ) {
			throw new MWException( 'You must update your load-balancing configuration. See DefaultSettings.php entry for $wgDBservers.' );
		}
		$host = $server['host'];
		$dbname = $server['dbname'];
		if ( $dbNameOverride !== false ) {
			$server['dbname'] = $dbname = $dbNameOverride;
		}
		wfDebug( "Connecting to $host $dbname...\n" );
		$db = new Database_SimpleSecurity(
			isset( $server['host'] ) ? $server['host'] : false,
			isset( $server['user'] ) ? $server['user'] : false,
			isset( $server['password'] ) ? $server['password'] : false,
			isset( $server['dbname'] ) ? $server['dbname'] : false,
			isset( $server['flags'] ) ? $server['flags'] : 0,
			isset( $server['tableprefix'] ) ? $server['tableprefix'] : 'get from global'
		);
		if ( $db->isOpen() ) {
			wfDebug( "Connected to $host $dbname.\n" );
		} else {
			wfDebug( "Connection failed to $host $dbname.\n" );
		}
		$db->setLBInfo( $server );
		if ( isset( $server['fakeSlaveLag'] ) ) {
			$db->setFakeSlaveLag( $server['fakeSlaveLag'] );
		}
		if ( isset( $server['fakeMaster'] ) ) {
			$db->setFakeMaster( true );
		}
		return $db;
	}

}
