<?php
# Copyright (C) 2004 Ryan Lane <http://www.mediawiki.org/wiki/User:Ryan_lane>
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License along
# with this program; if not, write to the Free Software Foundation, Inc.,
# 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
# http://www.gnu.org/copyleft/gpl.html

/**
 * LdapAuthentication plugin.
 *
 * Password authentication, and Smartcard Authentication support are currently
 * available. All forms of authentication, current and future, should support
 * group, and attribute based restrictions; preference pulling; and group
 * syncronization. All forms of authentication should have basic support for
 * adding users, changing passwords, and updating preferences in LDAP.
 *
 * Password authentication has a number of configurations, including straight binds,
 * proxy based authentication, and anonymous-search based authentication.
 *
 * @file
 * @ingroup MediaWiki
 */

#
# LdapAuthentication.php
#
# Info available at http://www.mediawiki.org/wiki/Extension:LDAP_Authentication
# Support is available at http://www.mediawiki.org/wiki/Extension_talk:LDAP_Authentication
#

if ( !defined( 'MEDIAWIKI' ) ) exit;

$wgLDAPDomainNames = array();
$wgLDAPServerNames = array();
$wgLDAPUseLocal = false;
$wgLDAPEncryptionType = array();
$wgLDAPOptions = array();
$wgLDAPPort = array();
$wgLDAPSearchStrings = array();
$wgLDAPProxyAgent = array();
$wgLDAPProxyAgentPassword = array();
$wgLDAPSearchAttributes = array();
$wgLDAPBaseDNs = array();
$wgLDAPGroupBaseDNs = array();
$wgLDAPUserBaseDNs = array();
$wgLDAPWriterDN = array();
$wgLDAPWriterPassword = array();
$wgLDAPWriteLocation = array();
$wgLDAPAddLDAPUsers = array();
$wgLDAPUpdateLDAP = array();
$wgLDAPPasswordHash = array();
$wgLDAPMailPassword = array();
$wgLDAPRetrievePrefs = array();
$wgLDAPPreferences = array();
$wgLDAPDisableAutoCreate = array();
$wgLDAPDebug = 0;
$wgLDAPGroupDN = ""; //Deprecated
$wgLDAPGroupUseFullDN = array();
$wgLDAPLowerCaseUsername = array();
$wgLDAPGroupUseRetrievedUsername = array();
$wgLDAPGroupObjectclass = array();
$wgLDAPGroupAttribute = array();
$wgLDAPGroupNameAttribute = array();
$wgLDAPGroupsUseMemberOf = array();
$wgLDAPUseLDAPGroups = array();
$wgLDAPLocallyManagedGroups = array();
$wgLDAPGroupsPrevail = array();
$wgLDAPRequiredGroups = array();
$wgLDAPExcludedGroups = array();
$wgLDAPGroupSearchNestedGroups = array();
$wgLDAPSmartcardDomain = ""; //Deprecated
$wgLDAPSSLUsername = ""; //Deprecated
$wgLDAPAuthAttribute = array();
$wgLDAPAutoAuthUsername = "";
$wgLDAPAutoAuthDomain = "";
$wgLDAPUniqueAttribute = array(); //Currently unused
$wgLDAPUniqueBlockLogin = array(); //Currently unused
$wgLDAPUniqueRenameUser = array(); //Currently unused
$wgLDAPUseFetchedUsername = array();
$wgPasswordResetRoutes['domain'] = true;

define( "LDAPAUTHVERSION", "1.2h" );

/**
 * Add extension information to Special:Version
 */
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'LDAP Authentication Plugin',
	'version' => LDAPAUTHVERSION,
	'author' => 'Ryan Lane',
	'descriptionmsg' => 'ldapauthentication-desc',
	'url' => 'https://www.mediawiki.org/wiki/Extension:LDAP_Authentication',
);

$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['LdapAuthentication'] = $dir . 'LdapAuthentication.i18n.php';

// constants for search base
define( "GROUPDN", 0 );
define( "USERDN", 1 );
define( "DEFAULTDN", 2 );

// constants for error reporting
define( "NONSENSITIVE", 1 );
define( "SENSITIVE", 2 );
define( "HIGHLYSENSITIVE", 3 );

class LdapAuthenticationPlugin extends AuthPlugin {

	// ldap connection resource
	var $ldapconn;

	// preferences
	var $email, $lang, $realname, $nickname, $externalid;

	// username pulled from ldap
	var $LDAPUsername;

	// userdn pulled from ldap
	var $userdn;

	// groups pulled from ldap
	var $userLDAPGroups;
	var $allLDAPGroups;

	// boolean to test for failed auth
	var $authFailed;

	// boolean to test for fetched user info
	var $fetchedUserInfo;

	// the user's entry and all attributes
	var $userInfo;

	/**
	 * Check whether there exists a user account with the given name.
	 * The name will be normalized to MediaWiki's requirements, so
	 * you might need to munge it (for instance, for lowercase initial
	 * letters).
	 *
	 * @param string $username
	 * @return bool
	 */
	public function userExists( $username ) {
		global $wgLDAPAddLDAPUsers;

		$this->printDebug( "Entering userExists", NONSENSITIVE );

		// If we can't add LDAP users, we don't really need to check
		// if the user exists, the authenticate method will do this for
		// us. This will decrease hits to the LDAP server.
		// We do however, need to use this if we are using auto authentication.
		if ( ( !isset( $wgLDAPAddLDAPUsers[$_SESSION['wsDomain']] ) || !$wgLDAPAddLDAPUsers[$_SESSION['wsDomain']] ) && !$this->useAutoAuth() ) {
			return true;
		}

		$this->connect();
		if ( $this->ldapconn ) {
			$this->printDebug( "Successfully connected", NONSENSITIVE );

			$searchstring = $this->getSearchString( $username );

			// If we are using auto authentication, and we got
			// anything back, then the user exists.
			if ( $this->useAutoAuth() && $searchstring != '' ) {
				// getSearchString is going to bind, but will not unbind
				// Let's clean up
				@ldap_unbind();
				return true;
			}

			// Search for the entry.
			$entry = @ldap_read( $this->ldapconn, $searchstring, "objectclass=*" );

			// getSearchString is going to bind, but will not unbind
			// Let's clean up
			@ldap_unbind();
			if ( !$entry ) {
				$this->printDebug( "Did not find a matching user in LDAP", NONSENSITIVE );
				return false;
			} else {
				$this->printDebug( "Found a matching user in LDAP", NONSENSITIVE );
				return true;
			}
		} else {
			$this->printDebug( "Failed to connect", NONSENSITIVE );
			return false;
		}
	}

	/**
	 * Connect to LDAP
	 *
	 * @access private
	 */
	function connect( $domain='' ) {
		global $wgLDAPServerNames;
		global $wgLDAPPort;
		global $wgLDAPEncryptionType;
		global $wgLDAPOptions;

		if ( $domain == '' ) {
			$domain = $_SESSION['wsDomain'];
		}

		$this->printDebug( "Entering Connect", NONSENSITIVE );

		if ( !function_exists( 'ldap_connect' ) ) {
			$this->printDebug( "It looks like you are missing LDAP support; please ensure you have either compiled LDAP support in, or have enabled the module. If the authentication is working for you, the plugin isn't properly detecting the LDAP module, and you can safely ignore this message.", NONSENSITIVE );
			return false;
		}

		// If the admin didn't set an encryption type, we default to tls
		if ( isset( $wgLDAPEncryptionType[$domain] ) ) {
			$encryptionType = $wgLDAPEncryptionType[$domain];
		} else {
			$encryptionType = "tls";
		}

		// Set the server string depending on whether we use ssl or not
		switch( $encryptionType ) {
			case "ldapi":
				# this is a really dirty place to put this,
				# but it is easy and avoids another config option.
				$this->printDebug( "Using ldapi", SENSITIVE );
				$serverpre = "ldapi://";
				break;
			case "ssl":
				$this->printDebug( "Using SSL", SENSITIVE );
				$serverpre = "ldaps://";
				break;
			default:
				$this->printDebug( "Using TLS or not using encryption.", SENSITIVE );
				$serverpre = "ldap://";
		}

		// Make a space separated list of server strings with the ldap:// or ldaps://
		// string added.
		$servers = "";
		$tmpservers = $wgLDAPServerNames[$domain];
		$tok = strtok( $tmpservers, " " );
		while ( $tok ) {
			if ( isset( $wgLDAPPort[$domain] ) ) {
				$this->printDebug( "Using non-standard port: " . $wgLDAPPort[$domain], SENSITIVE );
				$servers = $servers . " " . $serverpre . $tok . ":" . $wgLDAPPort[$domain];
			} else {
				$servers = $servers . " " . $serverpre . $tok;
			}
			$tok = strtok( " " );
		}
		$servers = rtrim( $servers );

		$this->printDebug( "Using servers: $servers", SENSITIVE );

		// Connect and set options
		$this->ldapconn = @ldap_connect( $servers );
		ldap_set_option( $this->ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3 );
		ldap_set_option( $this->ldapconn, LDAP_OPT_REFERRALS, 0 );

		if ( isset( $wgLDAPOptions[$domain] ) ) {
			$options = $wgLDAPOptions[$domain];
			foreach ( $options as $key => $value ) {
				if ( !ldap_set_option( $this->ldapconn, constant( $key ), $value ) ) {
					$this->printDebug( "Can't set option to LDAP! Option code and value: " . $key . "=" . $value, 1 );
				}
			}
		}

		// TLS needs to be started after the connection is made
		if ( $encryptionType == "tls" ) {
			$this->printDebug( "Using TLS", SENSITIVE );
			if ( !ldap_start_tls( $this->ldapconn ) ) {
				$this->printDebug( "Failed to start TLS.", SENSITIVE );
				return;
			}
		}
	}

	/**
	 * Check if a username+password pair is a valid login, or if the username
	 * is allowed access to the wiki.
	 * The name will be normalized to MediaWiki's requirements, so
	 * you might need to munge it (for instance, for lowercase initial
	 * letters).
	 *
	 * @param string $username
	 * @param string $password
	 * @return bool
	 */
	public function authenticate( $username, $password = '' ) {
		global $wgLDAPAuthAttribute;
		global $wgLDAPAutoAuthUsername;
		global $wgLDAPLowerCaseUsername;
		global $wgLDAPSearchStrings;

		$this->printDebug( "Entering authenticate for username $username", NONSENSITIVE );

		// We don't handle local authentication
		if ( 'local' == $_SESSION['wsDomain'] ) {
			$this->printDebug( "User is using a local domain", SENSITIVE );
			return false;
		}

		// If the user is using auto authentication, we need to ensure
		// that he/she isn't trying to fool us by sending a username other
		// than the one the web server got from the auto-authentication method.
		if ( $this->useAutoAuth() && $wgLDAPAutoAuthUsername != $username ) {
			$this->printDebug( "The username provided ($username) doesn't match the username provided by the webserver ($wgLDAPAutoAuthUsername). The user is probably trying to log in to the auto-authentication domain with password authentication via the wiki. Denying access.", SENSITIVE );
			return false;
		}

		// We need to ensure that if we require a password, that it is
		// not blank. We don't allow blank passwords, so we are being
		// tricked if someone is supplying one when using password auth.
		// Smartcard authentication uses a pin, and does not require
		// a password to be given; a blank password here is wanted.
		if ( '' == $password && !$this->useAutoAuth() ) {
			$this->printDebug( "User used a blank password", NONSENSITIVE );
			return false;
		}

		$this->connect();
		if ( $this->ldapconn ) {
			$this->printDebug( "Connected successfully", NONSENSITIVE );

			// Mediawiki munges the username before authenticate is called,
			// this can mess with authentication, group pulling/restriction,
			// preference pulling, etc. Let's allow the admin to use
			// a lowercased username if needed.
			if ( isset( $wgLDAPLowerCaseUsername[$_SESSION['wsDomain']] ) && $wgLDAPLowerCaseUsername[$_SESSION['wsDomain']] ) {
				$this->printDebug( "Lowercasing the username: $username", NONSENSITIVE );
				$username = strtolower( $username );
			}

			$this->userdn = $this->getSearchString( $username );

			// It is possible that getSearchString will return an
			// empty string; if this happens, the bind will ALWAYS
			// return true, and will let anyone in!
			if ( '' == $this->userdn ) {
				$this->printDebug( "User DN is blank", NONSENSITIVE );
				@ldap_unbind();
				$this->markAuthFailed();
				return false;
			}

			// If we are using password authentication, we need to bind as the
			// user to make sure the password is correct.
			if ( !$this->useAutoAuth() ) {
				$this->printDebug( "Binding as the user", NONSENSITIVE );

				// Let's see if the user can authenticate.
				$bind = $this->bindAs( $this->userdn, $password );
				if ( !$bind ) {
					$this->markAuthFailed();
					return false;
				}

				$this->printDebug( "Bound successfully", NONSENSITIVE );

				if ( isset( $wgLDAPSearchStrings[$_SESSION['wsDomain']] ) ) {
					$ss = $wgLDAPSearchStrings[$_SESSION['wsDomain']];
					if ( strstr( $ss, "@" ) || strstr( $ss, '\\' ) ) {
						// We are most likely configured using USER-NAME@DOMAIN, or
						// DOMAIN\\USER-NAME.
						// Get the user's full DN so we can search for groups and such.
						$this->userdn = $this->getUserDN( $username );
						$this->printDebug( "Pulled the user's DN: $this->userdn", NONSENSITIVE );
					}
				}

				if ( isset( $wgLDAPAuthAttribute[$_SESSION['wsDomain']] ) ) {

					$this->printDebug( "Checking for auth attributes: " . $wgLDAPAuthAttribute[$_SESSION['wsDomain']], NONSENSITIVE );

					$filter = "(" . $wgLDAPAuthAttribute[$_SESSION['wsDomain']] . ")";
					$attributes = array( "dn" );

					$entry = ldap_read( $this->ldapconn, $this->userdn, $filter, $attributes );
					$info = ldap_get_entries( $this->ldapconn, $entry );

					if ( $info["count"] < 1 ) {
						$this->printDebug( "Failed auth attribute check", NONSENSITIVE );
						@ldap_unbind();
						$this->markAuthFailed();
						return false;
					}
				}
			}

			$this->getGroups( $username );

			if ( !$this->checkGroups( $username ) ) {
				@ldap_unbind();
				$this->markAuthFailed();
				return false;
			}

			$this->getPreferences();

			if ( !$this->synchUsername( $username ) ) {
				@ldap_unbind();
				$this->markAuthFailed();
				return false;
			}

			@ldap_unbind();
		} else {
			$this->printDebug( "Failed to connect", NONSENSITIVE );
			$this->markAuthFailed();
			return false;
		}
		$this->printDebug( "Authentication passed", NONSENSITIVE );

		// We made it this far; the user authenticated and didn't fail any checks, so he/she gets in.
		return true;
	}

	function markAuthFailed() {
		$this->authFailed = true;
	}

	/**
	 * Modify options in the login template.
	 *
	 * @param UserLoginTemplate $template
	 */
	public function modifyUITemplate( &$template, &$type ) {
		global $wgLDAPAddLDAPUsers;
		global $wgLDAPMailPassword;

		$this->printDebug( "Entering modifyUITemplate", NONSENSITIVE );

		if ( !isset( $wgLDAPAddLDAPUsers[$_SESSION['wsDomain']] ) || !$wgLDAPAddLDAPUsers[$_SESSION['wsDomain']] ) {
			$template->set( 'create', false );
		}

		$template->set( 'usedomain', true );
		$template->set( 'useemail', isset( $wgLDAPMailPassword[$_SESSION['wsDomain']] ) && $wgLDAPMailPassword[$_SESSION['wsDomain']] );
		$template->set( 'canreset', isset( $wgLDAPMailPassword[$_SESSION['wsDomain']] ) && $wgLDAPMailPassword[$_SESSION['wsDomain']] );


		$template->set( 'domainnames', $this->domainList() );
		wfRunHooks( 'LDAPModifyUITemplate', array( &$template ) );
	}

	function domainList() {
		global $wgLDAPDomainNames, $wgLDAPUseLocal, $wgLDAPAutoAuthDomain;

		$tempDomArr = $wgLDAPDomainNames;
		if ( $wgLDAPUseLocal ) {
			$this->printDebug( "Allowing the local domain, adding it to the list.", NONSENSITIVE );
			array_push( $tempDomArr, 'local' );
		}

		if ( isset( $wgLDAPAutoAuthDomain ) && $wgLDAPAutoAuthDomain != "" ) {
			$this->printDebug( "Allowing auto-authentication login, removing the domain from the list.", NONSENSITIVE );

			// There is no reason for people to log in directly to the wiki if the are using an
			// auto-authentication domain. If they try to, they are probably up to something fishy.
			unset( $tempDomArr[array_search( $wgLDAPAutoAuthDomain, $tempDomArr )] );
		}

		$domains = array();
		foreach ( $tempDomArr as $tempDom ) {
			$domains["$tempDom"] = $tempDom;
		}
		return $domains;
	}

	/**
	 * Return true if the wiki should create a new local account automatically
	 * when asked to login a user who doesn't exist locally but does in the
	 * external auth database.
	 *
	 * This is just a question, and shouldn't perform any actions.
	 *
	 * @return bool
	 */
	public function autoCreate() {
		global $wgLDAPDisableAutoCreate;

		return !( isset( $wgLDAPDisableAutoCreate[$_SESSION['wsDomain']] ) && $wgLDAPDisableAutoCreate[$_SESSION['wsDomain']] );
	}

	/**
	 * Set the given password in LDAP.
	 * Return true if successful.
	 *
	 * @param User $user
	 * @param string $password
	 * @return bool
	 */
	public function setPassword( $user, $password ) {
		global $wgLDAPUpdateLDAP, $wgLDAPWriterDN, $wgLDAPWriterPassword;

		$this->printDebug( "Entering setPassword", NONSENSITIVE );

		if ( $_SESSION['wsDomain'] == 'local' ) {
			$this->printDebug( "User is using a local domain", NONSENSITIVE );

			// We don't set local passwords, but we don't want the wiki
			// to send the user a failure.
			return true;
		} elseif ( !isset( $wgLDAPUpdateLDAP[$_SESSION['wsDomain']] ) || !$wgLDAPUpdateLDAP[$_SESSION['wsDomain']] ) {
			$this->printDebug( "Wiki is set to not allow updates", NONSENSITIVE );

			// We aren't allowing the user to change his/her own password
			return false;
		}

		if ( !isset( $wgLDAPWriterDN[$_SESSION['wsDomain']] ) ) {
			$this->printDebug( "Wiki doesn't have wgLDAPWriterDN set", NONSENSITIVE );

			// We can't change a user's password without an account that is
			// allowed to do it.
			return false;
		}

		$pass = $this->getPasswordHash( $password );

		$this->connect();
		if ( $this->ldapconn ) {
			$this->printDebug( "Connected successfully", NONSENSITIVE );
			$this->userdn = $this->getSearchString( $user->getName() );

			$this->printDebug( "Binding as the writerDN", NONSENSITIVE );
			$bind = $this->bindAs( $wgLDAPWriterDN[$_SESSION['wsDomain']], $wgLDAPWriterPassword[$_SESSION['wsDomain']] );
			if ( !$bind ) {
				return false;
			}

			$values["userpassword"] = $pass;

			// Blank out the password in the database. We don't want to save
			// domain credentials for security reasons.
			$password = '';

			$success = @ldap_modify( $this->ldapconn, $this->userdn, $values );

			// Let's clean up
			@ldap_unbind();
			if ( $success ) {
				$this->printDebug( "Successfully modified the user's password", NONSENSITIVE );
				return true;
			} else {
				$this->printDebug( "Failed to modify the user's password", NONSENSITIVE );
				return false;
			}
		} else {
			$this->printDebug( "Failed to connect", NONSENSITIVE );
			return false;
		}
	}

	/**
	 * Update user information in LDAP
	 * Return true if successful.
	 *
	 * @param User $user
	 * @return bool
	 */
	public function updateExternalDB( $user ) {
		global $wgLDAPUpdateLDAP;
		global $wgLDAPWriterDN, $wgLDAPWriterPassword;

		$this->printDebug( "Entering updateExternalDB", NONSENSITIVE );

		if ( ( !isset( $wgLDAPUpdateLDAP[$_SESSION['wsDomain']] ) || !$wgLDAPUpdateLDAP[$_SESSION['wsDomain']] ) ||
			$_SESSION['wsDomain'] == 'local' ) {
			$this->printDebug( "Either the user is using a local domain, or the wiki isn't allowing updates", NONSENSITIVE );

			// We don't handle local preferences, but we don't want the
			// wiki to return an error.
			return true;
		}

		if ( !isset( $wgLDAPWriterDN[$_SESSION['wsDomain']] ) ) {
			$this->printDebug( "The wiki doesn't have wgLDAPWriterDN set", NONSENSITIVE );

			// We can't modify LDAP preferences if we don't have a user
			// capable of editing LDAP attributes.
			return false;
		}

		$this->email = $user->getEmail();
		$this->realname = $user->getRealName();
		$this->nickname = $user->getOption( 'nickname' );
		$this->lang = $user->getOption( 'language' );

		$this->connect();
		if ( $this->ldapconn ) {
			$this->printDebug( "Connected successfully", NONSENSITIVE );
			$this->userdn = $this->getSearchString( $user->getName() );

			$this->printDebug( "Binding as the writerDN", NONSENSITIVE );
			$bind = $this->bindAs( $wgLDAPWriterDN[$_SESSION['wsDomain']], $wgLDAPWriterPassword[$_SESSION['wsDomain']] );
			if ( !$bind ) {
				return false;
			}

			if ( '' != $this->email ) { $values["mail"] = $this->email; }
			if ( '' != $this->nickname ) { $values["displayname"] = $this->nickname; }
			if ( '' != $this->realname ) { $values["cn"] = $this->realname; }
			if ( '' != $this->lang ) { $values["preferredlanguage"] = $this->lang; }

			if ( 0 != sizeof( $values ) && @ldap_modify( $this->ldapconn, $this->userdn, $values ) ) {
				$this->printDebug( "Successfully modified the user's attributes", NONSENSITIVE );
				@ldap_unbind();
				return true;
			} else {
				$this->printDebug( "Failed to modify the user's attributes", NONSENSITIVE );
				@ldap_unbind();
				return false;
			}
		} else {
			$this->printDebug( "Failed to Connect", NONSENSITIVE );
			return false;
		}
	}

	/**
	 * Can the wiki create accounts in LDAP?
	 * Return true if yes.
	 *
	 * @return bool
	 */
	public function canCreateAccounts() {
		global $wgLDAPAddLDAPUsers;

		return ( isset( $wgLDAPAddLDAPUsers[$_SESSION['wsDomain']] ) && $wgLDAPAddLDAPUsers[$_SESSION['wsDomain']] );
	}

	/**
	 * Can the wiki change passwords in LDAP, or can the user
	 * change passwords locally?
	 * Return true if yes.
	 *
	 * @return bool
	 */
	public function allowPasswordChange() {
		global $wgLDAPUpdateLDAP, $wgLDAPMailPassword;
		global $wgLDAPUseLocal;

		$this->printDebug( "Entering allowPasswordChange", NONSENSITIVE );

		$retval = false;

		// Local domains need to be able to change passwords
		if ( ( isset( $wgLDAPUseLocal ) && $wgLDAPUseLocal ) && 'local' == $_SESSION['wsDomain'] ) {
			$retval = true;
		}

		if ( isset( $_SESSION['wsDomain'] ) && isset( $wgLDAPUpdateLDAP[$_SESSION['wsDomain']] ) && $wgLDAPUpdateLDAP[$_SESSION['wsDomain']] ) {
			$retval = true;
		}

		if ( isset( $_SESSION['wsDomain'] ) && isset( $wgLDAPMailPassword[$_SESSION['wsDomain']] ) && $wgLDAPMailPassword[$_SESSION['wsDomain']] ) {
			$retval = true;
		}

		return $retval;
	}

	/**
	 * Add a user to LDAP.
	 * Return true if successful.
	 *
	 * @param User $user
	 * @param string $password
	 * @return bool
	 */
	public function addUser( $user, $password, $email = '', $realname = '' ) {
		global $wgLDAPAddLDAPUsers, $wgLDAPWriterDN, $wgLDAPWriterPassword;
		global $wgLDAPSearchAttributes;
		global $wgLDAPWriteLocation;
		global $wgLDAPRequiredGroups, $wgLDAPGroupDN;
		global $wgLDAPAuthAttribute;

		$this->printDebug( "Entering addUser", NONSENSITIVE );

		if ( ( !isset( $wgLDAPAddLDAPUsers[$_SESSION['wsDomain']] ) || !$wgLDAPAddLDAPUsers[$_SESSION['wsDomain']] ) ||
			'local' == $_SESSION['wsDomain'] ) {
			$this->printDebug( "Either the user is using a local domain, or the wiki isn't allowing users to be added to LDAP", NONSENSITIVE );

			// Tell the wiki not to return an error.
			return true;
		}

		if ( $wgLDAPRequiredGroups || $wgLDAPGroupDN ) {
			$this->printDebug( "The wiki is requiring users to be in specific groups, and cannot add users as this would be a security hole.", NONSENSITIVE );
			// It is possible that later we can add users into
			// groups, but since we don't support it, we don't want
			// to open holes!
			return false;
		}

		if ( !isset( $wgLDAPWriterDN[$_SESSION['wsDomain']] ) ) {
			$this->printDebug( "The wiki doesn't have wgLDAPWriterDN set", NONSENSITIVE );

			// We can't add users without an LDAP account capable of doing so.
			return false;
		}

		$this->email = $user->getEmail();
		$this->realname = $user->getRealName();
		$username = strtolower( $user->getName() );

		$pass = $this->getPasswordHash( $password );

		$this->connect();
		if ( $this->ldapconn ) {
			$this->printDebug( "Successfully connected", NONSENSITIVE );

			$this->userdn = $this->getSearchString( $username );
			if ( '' == $this->userdn ) {
				$this->printDebug( "userdn is blank, attempting to use wgLDAPWriteLocation", NONSENSITIVE );
				if ( isset( $wgLDAPWriteLocation[$_SESSION['wsDomain']] ) ) {
					$this->printDebug( "wgLDAPWriteLocation is set, using that", NONSENSITIVE );
					$this->userdn = $wgLDAPSearchAttributes[$_SESSION['wsDomain']] . "=" .
						$username . "," . $wgLDAPWriteLocation[$_SESSION['wsDomain']];
				} else {
					$this->printDebug( "wgLDAPWriteLocation is not set, failing", NONSENSITIVE );
					// getSearchString will bind, but will not unbind
					@ldap_unbind();
					return false;
				}
			}

			$this->printDebug( "Binding as the writerDN", NONSENSITIVE );

			$bind = $this->bindAs( $wgLDAPWriterDN[$_SESSION['wsDomain']], $wgLDAPWriterPassword[$_SESSION['wsDomain']] );
			if ( !$bind ) {
				$this->printDebug( "Failed to bind as the writerDN; add failed", NONSENSITIVE );
				return false;
			}

			// Set up LDAP attributes
			$values["uid"] = $username;
			// sn is required for objectclass inetorgperson
			$values["sn"] = $username;
			if ( '' != $this->email ) { $values["mail"] = $this->email; }
			if ( '' != $this->realname ) { $values["cn"] = $this->realname; }
				else { $values["cn"] = $username; }
			$values["userpassword"] = $pass;
			$values["objectclass"] = array( "inetorgperson" );

			$result = true;
			# Set a write location for the creation hook to use, in case it
			# wants to modify the user's dn
			if ( isset( $wgLDAPWriteLocation[$_SESSION['wsDomain']] ) ) {
				$writeloc = $wgLDAPWriteLocation[$_SESSION['wsDomain']];
			} else {
				$writeloc = '';
			}
			# Let other extensions modify the user object before creation
			wfRunHooks( 'LDAPSetCreationValues', array( $this, $username, &$values, $writeloc, &$this->userdn, &$result ) );
			if ( ! $result ) {
				$this->printDebug( "Failed to add user because LDAPSetCreationValues returned false", NONSENSITIVE );
				@ldap_unbind();
				return false;
			}

			if ( isset ( $wgLDAPAuthAttribute[$_SESSION['wsDomain']] ) ) {
				$values[$wgLDAPAuthAttribute[$_SESSION['wsDomain']]] = "true";
			}

			$this->printDebug( "Adding user", NONSENSITIVE );
			if ( @ldap_add( $this->ldapconn, $this->userdn, $values ) ) {
				$this->printDebug( "Successfully added user", NONSENSITIVE );
				@ldap_unbind();
				return true;
			} else {
				$this->printDebug( "Failed to add user", NONSENSITIVE );
				@ldap_unbind();
				return false;
			}
		} else {
			$this->printDebug( "Failed to connect; add failed", NONSENSITIVE );
			return false;
		}
	}

	/**
	 * Set the domain this plugin is supposed to use when authenticating.
	 *
	 * @param string $domain
	 */
	public function setDomain( $domain ) {
		$this->printDebug( "Setting domain as: $domain", NONSENSITIVE );
		$_SESSION['wsDomain'] = $domain;
	}

	/**
	 * Check to see if the specific domain is a valid domain.
	 * Return true if the domain is valid.
	 *
	 * @param string $domain
	 * @return bool
	 */
	public function validDomain( $domain ) {
		global $wgLDAPDomainNames, $wgLDAPUseLocal;

		$this->printDebug( "Entering validDomain", NONSENSITIVE );

		if ( in_array( $domain, $wgLDAPDomainNames ) || ( $wgLDAPUseLocal && 'local' == $domain ) ) {
			$this->printDebug( "User is using a valid domain ($domain).", NONSENSITIVE );
			return true;
		} else {
			$this->printDebug( "User is not using a valid domain ($domain).", NONSENSITIVE );
			return false;
		}
	}

	/**
	 * When a user logs in, update user with information from LDAP.
	 *
	 * @param $user User
	 * TODO: fix the setExternalID stuff
	 */
	public function updateUser( &$user ) {
		global $wgLDAPRetrievePrefs, $wgLDAPPreferences;
		global $wgLDAPUseLDAPGroups;
		global $wgLDAPUniqueBlockLogin, $wgLDAPUniqueRenameUser;

		$this->printDebug( "Entering updateUser", NONSENSITIVE );

		if ( $this->authFailed ) {
			$this->printDebug( "User didn't successfully authenticate, exiting.", NONSENSITIVE );
			return;
		}

		$saveSettings = false;

		// If we aren't pulling preferences, we don't want to accidentally
		// overwrite anything.
		if ( ( isset( $wgLDAPRetrievePrefs[$_SESSION['wsDomain']] ) && $wgLDAPRetrievePrefs[$_SESSION['wsDomain']] )
			|| isset( $wgLDAPPreferences[$_SESSION['wsDomain']] ) ) {
			$this->printDebug( "Setting user preferences.", NONSENSITIVE );

			if ( '' != $this->lang ) {
				$this->printDebug( "Setting language.", NONSENSITIVE );
				$user->setOption( 'language', $this->lang );
			}
			if ( '' != $this->nickname ) {
				$this->printDebug( "Setting nickname.", NONSENSITIVE );
				$user->setOption( 'nickname', $this->nickname );
			}
			if ( '' != $this->realname ) {
				$this->printDebug( "Setting realname.", NONSENSITIVE );
				$user->setRealName( $this->realname );
			}
			if ( '' != $this->email ) {
				$this->printDebug( "Setting email.", NONSENSITIVE );
				$user->setEmail( $this->email );
				$user->confirmEmail();
			}
			if ( ( isset( $wgLDAPUniqueBlockLogin[$_SESSION['wsDomain']] ) && $wgLDAPUniqueBlockLogin[$_SESSION['wsDomain']] )
				|| ( isset( $wgLDAPUniqueRenameUser[$_SESSION['wsDomain']] ) && $wgLDAPUniqueRenameUser[$_SESSION['wsDomain']] ) ) {

				if ( '' != $this->externalid ) {
					$user->setExternalID( $this->externalid );
				}
			}

			$saveSettings = true;
		}

		if ( isset( $wgLDAPUseLDAPGroups[$_SESSION['wsDomain']] ) && $wgLDAPUseLDAPGroups[$_SESSION['wsDomain']] ) {
			$this->printDebug( "Setting user groups.", NONSENSITIVE );
			$this->setGroups( $user );

			$saveSettings = true;
		}

		# Let other extensions update the user
		wfRunHooks( 'LDAPUpdateUser', array( $this ) );

		if ( $saveSettings ) {
			$this->printDebug( "Saving user settings.", NONSENSITIVE );
			$user->saveSettings();
		}
	}

	/**
	 * When creating a user account, initialize user with information from LDAP.
	 *
	 * @param User $user
	 * TODO: fix setExternalID stuff
	 */
	public function initUser( &$user, $autocreate = false ) {
		$this->printDebug( "Entering initUser", NONSENSITIVE );

		if ( $this->authFailed ) {
			$this->printDebug( "User didn't successfully authenticate, exiting.", NONSENSITIVE );
			return;
		}

		if ( 'local' == $_SESSION['wsDomain'] ) {
			$this->printDebug( "User is using a local domain", NONSENSITIVE );
			return;
		}

		// We are creating an LDAP user, it is very important that we do
		// NOT set a local password because it could compromise the
		// security of our domain.
		$user->mPassword = '';

		// The update user function does everything else we need done.
		$this->updateUser( $user );

		// updateUser() won't definately save the user's settings
		$user->saveSettings();
	}

	/**
	 * Return true to prevent logins that don't authenticate here from being
	 * checked against the local database's password fields.
	 *
	 * This is just a question, and shouldn't perform any actions.
	 *
	 * @return bool
	 */
	public function strict() {
		global $wgLDAPUseLocal, $wgLDAPMailPassword;

		$this->printDebug( "Entering strict.", NONSENSITIVE );

		if ( $wgLDAPUseLocal || ( isset( $wgLDAPMailPassword[$_SESSION['wsDomain']] ) && $wgLDAPMailPassword[$_SESSION['wsDomain']] ) ) {
			$this->printDebug( "Returning false in strict().", NONSENSITIVE );
			return false;
		} else {
			$this->printDebug( "Returning true in strict().", NONSENSITIVE );
			return true;
		}
	}

	/**
	 * Munge the username to always have a form of uppercase for the first letter,
	 * and lowercase for the rest of the letters.
	 *
	 * @param string $username
	 * @return string
	 */
	public function getCanonicalName( $username ) {
		global $wgLDAPUseFetchedUsername;
		$this->printDebug( "Entering getCanonicalName", NONSENSITIVE );

		if ( $username != '' ) {
			$this->printDebug( "Username isn't empty.", NONSENSITIVE );

			# Fetch username, so that we can possibly use it.
			# Only do it if we haven't already fetched it.
			if ( !$this->userdn ) {
				$this->connect();
				if ( $this->ldapconn ) {
					$this->printDebug( "Successfully connected", NONSENSITIVE );
					$this->userdn = $this->getSearchString( $username );
					wfRunHooks( 'SetUsernameAttributeFromLDAP', array( &$this->LDAPUsername, $this->userInfo ) );
				} else {
					$this->printDebug( "Failed to connect in getCanonicalName, this is non-critical, but may indicate a misconfiguration.", NONSENSITIVE );
				}
			}

			// We want to use the username returned by LDAP
			// if it exists
			if ( $this->LDAPUsername != '' ) {
				$username = $this->LDAPUsername;
				if ( isset( $wgLDAPUseFetchedUsername[$_SESSION['wsDomain']] ) && $wgLDAPUseFetchedUsername[$_SESSION['wsDomain']] ) {
					$username[0] = strtoupper( $username[0] );
					return $username;
				}
				$this->printDebug( "Using LDAPUsername: $username", NONSENSITIVE );
			}

			if ( isset( $_SESSION['wsDomain'] ) && 'local' != $_SESSION['wsDomain'] ) {
				// Change username to lowercase so that multiple user accounts
				// won't be created for the same user.
				// But don't do it for the local domain!
				$username = strtolower( $username );
			}

			// The wiki considers an all lowercase name to be invalid; need to
			// uppercase the first letter
			$username[0] = strtoupper( $username[0] );
		}

		$this->printDebug( "Munged username: $username", NONSENSITIVE );

		return $username;
	}

	/**
	 * Configures the authentication plugin for use with auto-authentication
	 * plugins.
	 */
	public function autoAuthSetup() {
		global $wgLDAPAutoAuthDomain;

		$this->setDomain( $wgLDAPAutoAuthDomain );
	}

	/**
	 * Gets the searchstring for a user based upon settings for the domain.
	 * Returns a full DN for a user.
	 *
	 * @param string $username
	 * @return string
	 * @access private
	 */
	function getSearchString( $username ) {
		global $wgLDAPSearchStrings;
		global $wgLDAPProxyAgent, $wgLDAPProxyAgentPassword;

		$this->printDebug( "Entering getSearchString", NONSENSITIVE );

		if ( isset( $wgLDAPSearchStrings[$_SESSION['wsDomain']] ) ) {
			// This is a straight bind
			$this->printDebug( "Doing a straight bind", NONSENSITIVE );

			$tmpuserdn = $wgLDAPSearchStrings[$_SESSION['wsDomain']];
			$userdn = str_replace( "USER-NAME", $username, $tmpuserdn );
		} else {
			// This is a proxy bind, or an anonymous bind with a search
			if ( isset( $wgLDAPProxyAgent[$_SESSION['wsDomain']] ) ) {
				// This is a proxy bind
				$this->printDebug( "Doing a proxy bind", NONSENSITIVE );
				$bind = $this->bindAs( $wgLDAPProxyAgent[$_SESSION['wsDomain']], $wgLDAPProxyAgentPassword[$_SESSION['wsDomain']] );
			} else {
				// This is an anonymous bind
				$this->printDebug( "Doing an anonymous bind", NONSENSITIVE );
				$bind = $this->bindAs();
			}

			if ( !$bind ) {
				$this->printDebug( "Failed to bind", NONSENSITIVE );
				return '';
			}

			$userdn = $this->getUserDN( $username );
		}
		$this->printDebug( "userdn is: $userdn", SENSITIVE );
		return $userdn;
	}

	/**
	 * Gets the DN of a user based upon settings for the domain.
	 * This function will set $this->LDAPUsername
	 * You must bind to the server before calling this.
	 *
	 * @param string $username
	 * @return string
	 * @access private
	 */
	function getUserDN( $username ) {
		global $wgLDAPSearchAttributes;
		global $wgLDAPAuthAttribute;

		$this->printDebug( "Entering getUserDN", NONSENSITIVE );

		// we need to do a subbase search for the entry

		// Auto auth needs to check LDAP for required attributes.
		if ( ( isset( $wgLDAPAuthAttribute[$_SESSION['wsDomain']] ) )
			&& $this->useAutoAuth() ) {
			$auth_filter = "(" . $wgLDAPAuthAttribute[$_SESSION['wsDomain']] . ")";
			$srch_filter = "(" . $wgLDAPSearchAttributes[$_SESSION['wsDomain']] . "=" . $this->getLdapEscapedString( $username ) . ")";
			$filter = "(&" . $srch_filter . $auth_filter . ")";
			$this->printDebug( "Created an auth attribute filter: $filter", SENSITIVE );
		} else {
			$filter = "(" . $wgLDAPSearchAttributes[$_SESSION['wsDomain']] . "=" . $this->getLdapEscapedString( $username ) . ")";
			$this->printDebug( "Created a regular filter: $filter", SENSITIVE );
		}

		$attributes = array( "*", "memberof" );
		$base = $this->getBaseDN( USERDN );

		$this->printDebug( "Using base: $base", SENSITIVE );

		$entry = @ldap_search( $this->ldapconn, $base, $filter, $attributes );
		if ( @ldap_count_entries($this->ldapconn,$entry)==0 ) {
			$this->printDebug( "Couldn't find an entry", NONSENSITIVE );
			$this->fetchedUserInfo = false;
			return '';
		}

		$this->userInfo = @ldap_get_entries( $this->ldapconn, $entry );
		$this->fetchedUserInfo = true;
		$searchattr = $wgLDAPSearchAttributes[$_SESSION['wsDomain']];
		if ( isset( $this->userInfo[0][$searchattr] ) ) {
			$username = $this->userInfo[0][$searchattr][0];
			$this->printDebug( "Setting the LDAPUsername based on fetched wgLDAPSearchAttributes: $username", NONSENSITIVE );
			$this->LDAPUsername = $username;
		}

		// This is a pretty useful thing to have for auto authentication,
		// group checking, and pulling preferences.
		wfRunHooks( 'SetUsernameAttributeFromLDAP', array( &$this->LDAPUsername, $this->userInfo ) );
		if ( !is_string( $this->LDAPUsername ) ) {
			$this->printDebug( "Fetched username is not a string (check your hook code...). This message can be safely ignored if you do not have the SetUsernameAttributeFromLDAP hook defined.", NONSENSITIVE );
			$this->LDAPUsername = '';
		}

		$userdn = $this->userInfo[0]["dn"];
		return $userdn;
	}

	function getUserInfo() {
		// Don't fetch the same data more than once
		if ( $this->fetchedUserInfo ) {
			return $this->userInfo;
		}

		$userInfo = $this->getUserInfoStateless( $this->usernn );
		if ( is_null( $userInfo ) ) {
			$this->fetchedUserInfo = false;
			return;
		} else {
			$this->fetchedUserInfo = true;
			return $userInfo;
		}
	}

	function getUserInfoStateless( $userdn ) {
		// Don't fetch the same data more than once
		// TODO: use memcached here

		$entry = @ldap_read( $this->ldapconn, $userdn, "objectclass=*", array( '*', 'memberof' ) );
		$userInfo = @ldap_get_entries( $this->ldapconn, $entry );
		if ( $userInfo["count"] < 1 ) {
			return;
		} else {
			return $userInfo;
		}
	}

	function getSearchAttribute() {
		global $wgLDAPSearchAttributes;

		// Return the search attribute configured, mainly for use in other
		// extensions
		// TODO: make function to pull any configuration item
		if ( isset( $wgLDAPSearchAttributes[$_SESSION['wsDomain']] ) ) {
			return $wgLDAPSearchAttributes[$_SESSION['wsDomain']];
		} else {
			return '';
		}
	}

	/**
	 * Retrieve user preferences from LDAP
	 *
	 * @param string $userDN
	 * @access private
	 */
	function getPreferences() {
		global $wgLDAPPreferences;
		global $wgLDAPRetrievePrefs;

		$this->printDebug( "Entering getPreferences", NONSENSITIVE );

		$this->userInfo = $this->getUserInfo();
		if ( is_null( $this->userInfo ) ) {
			$this->printDebug( "Failed to get preferences", NONSENSITIVE );
		}

		// Retrieve preferences
		if ( isset( $wgLDAPPreferences[$_SESSION['wsDomain']] ) ) {
			$this->printDebug( "Retrieving preferences", NONSENSITIVE );
			$prefs = $wgLDAPPreferences[$_SESSION['wsDomain']];
			foreach ( array_keys( $prefs ) as $key ) {
				$attr = strtolower( $prefs[$key] );
				if ( isset( $this->userInfo[0][$attr] ) ) {
					$value = $this->userInfo[0][$attr][0];
				} else {
					continue;
				}
				switch ( $key ) {
					case "email":
						$this->email = $value;
						$this->printDebug( "Retrieved email ($this->email) using attribute ($prefs[$key])", NONSENSITIVE );
						break;
					case "language":
						$this->lang = $value;
						$this->printDebug( "Retrieved language ($this->lang) using attribute ($prefs[$key])", NONSENSITIVE );
						break;
					case "nickname":
						$this->nickname = $value;
						$this->printDebug( "Retrieved nickname ($this->nickname) using attribute ($prefs[$key])", NONSENSITIVE );
						break;
					case "realname":
						$this->realname = $value;
						$this->printDebug( "Retrieved realname ($this->realname) using attribute ($prefs[$key])", NONSENSITIVE );
						break;
				}
			}
		} elseif ( isset( $wgLDAPRetrievePrefs[$_SESSION['wsDomain']] ) && $wgLDAPRetrievePrefs[$_SESSION['wsDomain']] ) {
			// DEPRECATED. Kept for backwards compatibility.
			$this->printDebug( "Retrieving preferences", NONSENSITIVE );
			$this->printDebug( '$wgLDAPRetrievePrefs is a DEPRECATED option, please use $wgLDAPPreferences.', NONSENSITIVE );

			if ( isset( $this->userInfo[0]["mail"] ) ) {
				$this->email = $this->userInfo[0]["mail"][0];
			}
			if ( isset( $this->userInfo[0]["preferredlanguage"] ) ) {
				$this->lang = $this->userInfo[0]["preferredlanguage"][0];
			}
			if ( isset( $this->userInfo[0]["displayname"] ) ) {
				$this->nickname = $this->userInfo[0]["displayname"][0];
			}
			if ( isset( $this->userInfo[0]["cn"] ) ) {
				$this->realname = $this->userInfo[0]["cn"][0];
			}

			$this->printDebug( "Retrieved: $this->email, $this->lang, $this->nickname, $this->realname", SENSITIVE );
		}
	}

	function synchUsername( $username ) {
		global $wgLDAPUniqueBlockLogin, $wgLDAPUniqueRenameUser;
		global $wgLDAPUniqueAttribute;

		$this->printDebug( "Entering synchUsername", NONSENSITIVE );

		$this->userInfo = $this->getUserInfo();
		if ( is_null( $this->userInfo ) ) {
			$this->printDebug( "Failed to get preferences", NONSENSITIVE );
		}

		// Are we blocking login/renaming users on unique external ID mismatches?
		//     *** WARNING ***
		//     This needs to be fixed before use! This probably does not work correctly
		//     with all options. It is probably a good idea to refactor the username stuff
		//     in general (as it is currently somewhat of a kludge). Also, MediaWiki does
		//     not currently have support for this.
		//     *** WARNING ***
		if ( ( isset( $wgLDAPUniqueBlockLogin[$_SESSION['wsDomain']] ) && $wgLDAPUniqueBlockLogin[$_SESSION['wsDomain']] )
			|| ( isset( $wgLDAPUniqueRenameUser[$_SESSION['wsDomain']] ) && $wgLDAPUniqueRenameUser[$_SESSION['wsDomain']] ) ) {

			$this->printDebug( "Checking for username change in LDAP.", SENSITIVE );

			// Get the user's unique attribute from LDAP
			if ( isset( $wgLDAPUniqueAttribute[$_SESSION['wsDomain']] ) ) {
				$ldapuniqueattr = $wgLDAPUniqueAttribute[$_SESSION['wsDomain']];
				$this->externalid = $this->info[0][$ldapuniqueattr][0];
			} else {
				return false;
			}

			$this->printDebug( "Retrieved external id: $this->externalid", SENSITIVE );

			$retrievedusername = User::whoIsExternalID( "$this->externalid" );

			$this->printDebug( "Username (in MediaWiki database) of fetched external id: $retrievedusername", SENSITIVE );

			// See if the username returned from the database matches the username given
			if ( $retrievedusername != '' && ( $username != $retrievedusername ) ) {
				if ( isset( $wgLDAPUniqueBlockLogin[$_SESSION['wsDomain']] )
					&& $wgLDAPUniqueBlockLogin[$_SESSION['wsDomain']] ) {

					$this->printDebug( "Usernames do not match, blocking login.", SENSITIVE );
					return false;
				} elseif ( isset( $wgLDAPUniqueRenameUser[$_SESSION['wsDomain']] )
					&& $wgLDAPUniqueRenameUser[$_SESSION['wsDomain']] ) {

					$this->printDebug( "Usernames do not match, renaming user in database.", SENSITIVE );

					$olduser = User::newFromName( $retrievedusername );
					$uid = $olduser->idForName();

					// Ensure we don't require the same class twice
					if ( !class_exists( 'RenameuserSQL' ) ) {
						require( 'Renameuser/SpecialRenameuser_body.php' );
					}

					// Make a new rename user object with: from, to, uid of from
					$rename = new RenameuserSQL( $retrievedusername, $username, $uid );
					$rename->rename();

					// For the time being we can't just allow the user to log in
					// as MediaWiki will try to create the user account after we
					// do a rename. If we don't return false, the user will get
					// a database error
					return false;
				}
			}

			$this->printDebug( "Usernames matched or the user doesn't exist in the database yet.", SENSITIVE );
		}

		return true;
	}

	/**
	 * Checks to see whether a user is in a required group.
	 *
	 * @param string $username
	 * @return bool
	 * @access private
	 */
	function checkGroups( $username ) {
		global $wgLDAPGroupDN;
		global $wgLDAPRequiredGroups, $wgLDAPExcludedGroups;

		$this->printDebug( "Entering checkGroups", NONSENSITIVE );

		// Old style groups, non-nestable and fairly limited on group type (full DN
		// versus username). DEPRECATED
		if ( $wgLDAPGroupDN ) {
			$this->printDebug( "Checking for (old style) group membership", NONSENSITIVE );
			// we need to do a subbase search for the entry
			$filter = "(member=" . $this->getLdapEscapedString( $this->userdn ) . ")";
			$info = @ldap_get_entries( $this->ldapconn, @ldap_search( $this->ldapconn, $wgLDAPGroupDN, $filter ) );

			return ( $info["count"] >= 1 );
		}

		if ( isset( $wgLDAPExcludedGroups[$_SESSION['wsDomain']] ) ) {
			$this->printDebug( "Checking for excluded group membership", NONSENSITIVE );
			$excgroups = $wgLDAPExcludedGroups[$_SESSION['wsDomain']];
			for ( $i = 0; $i < count( $excgroups ); $i++ ) {
				$excgroups[$i] = strtolower( $excgroups[$i] );
			}

			$this->printDebug( "Excluded groups:", NONSENSITIVE, $excgroups );

			foreach ( $this->userLDAPGroups["dn"] as $group ) {
				$this->printDebug( "Checking against: $group", NONSENSITIVE );
				if ( in_array( $group, $excgroups ) ) {
					$this->printDebug( "Found user in an excluded group.", NONSENSITIVE );
					return false;
				}
			}
		}

		// New style group checking
		if ( isset( $wgLDAPRequiredGroups[$_SESSION['wsDomain']] ) ) {
			$this->printDebug( "Checking for (new style) group membership", NONSENSITIVE );
			$reqgroups = $wgLDAPRequiredGroups[$_SESSION['wsDomain']];
			for ( $i = 0; $i < count( $reqgroups ); $i++ ) {
				$reqgroups[$i] = strtolower( $reqgroups[$i] );
			}

			$this->printDebug( "Required groups:", NONSENSITIVE, $reqgroups );

			foreach ( $this->userLDAPGroups["dn"] as $group ) {
				$this->printDebug( "Checking against: $group", NONSENSITIVE );
				if ( in_array( $group, $reqgroups ) ) {
					$this->printDebug( "Found user in a group.", NONSENSITIVE );
					return true;
				}
			}

			$this->printDebug( "Couldn't find the user in any groups.", NONSENSITIVE );
			return false;
		}

		// Ensure we return true if we aren't checking groups.
		return true;
	}

	/**
	 * Function to get the user's groups.
	 *
	 * @access private
	 */
	function getGroups( $username ) {
		global $wgLDAPRequiredGroups, $wgLDAPUseLDAPGroups;
		global $wgLDAPGroupUseFullDN, $wgLDAPGroupUseRetrievedUsername;
		global $wgLDAPGroupSearchNestedGroups;
		global $wgLDAPGroupsPrevail;
		global $wgLDAPGroupsUseMemberOf;

		$this->printDebug( "Entering getGroups", NONSENSITIVE );

		// Find groups
		if ( isset( $wgLDAPRequiredGroups[$_SESSION['wsDomain']] ) || ( isset( $wgLDAPUseLDAPGroups[$_SESSION['wsDomain']] ) && $wgLDAPUseLDAPGroups[$_SESSION['wsDomain']] ) ) {
			$this->printDebug( "Retrieving LDAP group membership", NONSENSITIVE );

			// Let's figure out what we should be searching for
			if ( isset( $wgLDAPGroupUseFullDN[$_SESSION['wsDomain']] ) && $wgLDAPGroupUseFullDN[$_SESSION['wsDomain']] ) {
				$usertopass = $this->userdn;
			} else {
				if ( ( isset( $wgLDAPGroupUseRetrievedUsername[$_SESSION['wsDomain']] ) && $wgLDAPGroupUseRetrievedUsername[$_SESSION['wsDomain']] )
					&& $this->LDAPUsername != '' ) {

					$usertopass = $this->LDAPUsername;
				} else {
					$usertopass = $username;
				}
			}

			if ( isset( $wgLDAPGroupsUseMemberOf[$_SESSION['wsDomain']] ) && $wgLDAPGroupsUseMemberOf[$_SESSION['wsDomain']] ) {
				$this->printDebug( "Using memberOf", NONSENSITIVE );
				$this->userInfo = $this->getUserInfo();
				if ( is_null( $this->userInfo ) ) {
					$this->printDebug( "Failed to get memberOf attribute", NONSENSITIVE );
				}
				if ( isset( $this->userInfo[0]["memberof"] ) ) {
					# The first entry is always a count
					$memberOfMembers = $this->userInfo[0]["memberof"];
					array_shift( $memberOfMembers );
					$groups = array( "dn"=> array(), "short"=>array() );

					foreach( $memberOfMembers as $mem ) {
						array_push( $groups["dn"], strtolower( $mem ) );

						// Get short name of group
						$memAttrs = explode( ',', strtolower( $mem ) );
						if ( isset( $memAttrs[0] ) ) {
							$memAttrs = explode( '=', $memAttrs[0] );
							if ( isset( $memAttrs[0] ) ) {
								array_push( $groups["short"], strtolower( $memAttrs[1] ) );
							}
						}
					}
					$this->printDebug( "Got the following groups:", SENSITIVE, $groups["dn"] );

					$this->userLDAPGroups = $groups;
				} else {
					$this->printDebug( "memberOf attribute isn't set", NONSENSITIVE );
				}
			} else {
				$this->printDebug( "Searching for the groups", NONSENSITIVE );
				$this->userLDAPGroups = $this->searchGroups( $usertopass );

				if ( isset( $wgLDAPGroupSearchNestedGroups[$_SESSION['wsDomain']] ) && $wgLDAPGroupSearchNestedGroups[$_SESSION['wsDomain']] ) {
					$this->userLDAPGroups = $this->searchNestedGroups( $this->userLDAPGroups );
					$this->printDebug( "Got the following nested groups:", SENSITIVE, $this->userLDAPGroups["dn"] );
				}
			}

			// Only find all groups if the user has any groups; otherwise, we are
			// just wasting a search.
			if ( ( isset( $wgLDAPGroupsPrevail[$_SESSION['wsDomain']] )
				&& $wgLDAPGroupsPrevail[$_SESSION['wsDomain']] ) && count( $this->userLDAPGroups ) != 0 ) {
				$this->allLDAPGroups = $this->searchGroups( '*' );
			}
		}
	}

	/**
	 * Function to return an array of nested groups when given a group or list of groups.
	 * $searchedgroups is used for tail recursion and shouldn't be provided
	 * when called externally.
	 *
	 * @param string $userDN
	 * @param array $searchedgroups
	 * @return bool
	 * @access private
	 */
	function searchNestedGroups( $groups, $searchedgroups = array( "dn" => Array(), "short" => Array() ) ) {
		$this->printDebug( "Entering searchNestedGroups", NONSENSITIVE );

		// base case, no more groups left to check
		if ( count( $groups["dn"] ) == 0 ) {
			$this->printDebug( "No more groups to search.", NONSENSITIVE );
			return $searchedgroups;
		}

		$this->printDebug( "Searching groups:", SENSITIVE, $groups["dn"] );

		$groupstosearch = array( "short" => array(), "dn" => array() );
		foreach ( $groups["dn"] as $group ) {
			$returnedgroups = $this->searchGroups( $group );
			$this->printDebug( "Group $group is in the following groups:", SENSITIVE, $returnedgroups["dn"] );
			foreach ( $returnedgroups["dn"] as $searchme ) {
				if ( in_array( $searchme, $searchedgroups["dn"] ) ) {
					// We already searched this, move on
					continue;
				} else {
					// We'll need to search this group's members now
					$this->printDebug( "Adding $searchme to the list of groups (1)", SENSITIVE );
					$groupstosearch["dn"][] = $searchme;
				}
			}
			foreach ( $returnedgroups["short"] as $searchme ) {
				if ( in_array( $searchme, $searchedgroups["short"] ) ) {
					// We already searched this, move on
					continue;
				} else {
					$this->printDebug( "Adding $searchme to the list of groups (2)", SENSITIVE );
					// We'll need to search this group's members now
					$groupstosearch["short"][] = $searchme;
				}
			}
		}

		$searchedgroups = array_merge_recursive( $groups, $searchedgroups );

		// Mmmmmm. Tail recursion. Tasty.
		return $this->searchNestedGroups( $groupstosearch, $searchedgroups );
	}

	/**
	 * Search groups for the supplied DN
	 *
	 * @param string $dn
	 * @return array
	 * @access private
	 */
	function searchGroups( $dn ) {
		global $wgLDAPGroupObjectclass, $wgLDAPGroupAttribute, $wgLDAPGroupNameAttribute;
		global $wgLDAPProxyAgent, $wgLDAPProxyAgentPassword;

		$this->printDebug( "Entering searchGroups", NONSENSITIVE );

		$base = $this->getBaseDN( GROUPDN );

		$objectclass = $wgLDAPGroupObjectclass[$_SESSION['wsDomain']];
		$attribute = $wgLDAPGroupAttribute[$_SESSION['wsDomain']];
		$nameattribute = $wgLDAPGroupNameAttribute[$_SESSION['wsDomain']];

		// We actually want to search for * not \2a, ensure we don't escape *
		$value = $dn;
		if ( $value != "*" )
			$value = $this->getLdapEscapedString( $value );

		if ( isset( $wgLDAPProxyAgent[$_SESSION['wsDomain']] ) ) {
			// We'll try to bind as the proxyagent as the proxyagent should normally have more
			// rights than the user. If the proxyagent fails to bind, we will still be able
			// to search as the normal user (which is why we don't return on fail).
			$this->printDebug( "Binding as the proxyagent", NONSENSITIVE );
			$this->bindAs( $wgLDAPProxyAgent[$_SESSION['wsDomain']], $wgLDAPProxyAgentPassword[$_SESSION['wsDomain']] );
		}

		$groups = array( "short" => array(), "dn" => array() );

		// AD does not include the primary group in the list of groups, we have to find it ourselves.
		// TODO: find a way to only do this search for AD domains.
		if ( $dn != "*" ) {
			$PGfilter = "(&(distinguishedName=$value)(objectclass=user))";
			$this->printDebug( "User Filter: $PGfilter", SENSITIVE );
			$PGinfo = @ldap_search( $this->ldapconn, $base, $PGfilter );
			$PGentries = @ldap_get_entries( $this->ldapconn, $PGinfo );
			if ( $PGentries ) {
				$Usid = $PGentries[0]['objectsid'][0];
				$PGrid = $PGentries[0]['primarygroupid'][0];
				$PGsid = bin2hex( $Usid );
				for ( $i=0; $i < 56; $i += 2 ) {
					$PGSID[] = substr( $PGsid, $i, 2 );
				}
				$dPGrid = dechex( $PGrid );
				$dPGrid = str_pad( $dPGrid, 8, '0', STR_PAD_LEFT );
				$PGRID = array();
				for ( $i = 0; $i < 8; $i += 2 ) {
					array_push( $PGRID, substr( $dPGrid, $i, 2 ) );
				}
				for ( $i = 24; $i < 28; $i++ ) {
					$PGSID[$i] = array_pop( $PGRID );
				}
				$PGsid_string = '';
				foreach ( $PGSID as $PGsid_bit ) {
					$PGsid_string .= "\\" . $PGsid_bit;
				}
				$PGfilter = "(&(objectSid=$PGsid_string)(objectclass=$objectclass))";
				$this->printDebug( "Primary Group Filter: $PGfilter", SENSITIVE );
				$info = @ldap_search( $this->ldapconn, $base, $PGfilter );
				$PGentries = @ldap_get_entries( $this->ldapconn, $info );
				array_shift( $PGentries );
				$dnMember = strtolower( $PGentries[0]['dn'] );
				$groups["dn"][] = $dnMember;
				// Get short name of group
				$memAttrs = explode( ',', strtolower( $dnMember ) );
				if ( isset( $memAttrs[0] ) ) {
					$memAttrs = explode( '=', $memAttrs[0] );
					if ( isset( $memAttrs[0] ) ) {
						$groups["short"][] = strtolower( $memAttrs[1] );
					}
				}

			}
		}

		$filter = "(&($attribute=$value)(objectclass=$objectclass))";

		$this->printDebug( "Search string: $filter", SENSITIVE );

		$info = @ldap_search( $this->ldapconn, $base, $filter );
		if ( !$info ) {
			$this->printDebug( "No entries returned from search.", SENSITIVE );

			// Return an array so that other functions
			// don't error out.
			return array( "short" => array(), "dn" => array() );
		}

		$entries = @ldap_get_entries( $this->ldapconn, $info );

		if ( $entries ){
			// We need to shift because the first entry will be a count
			array_shift( $entries );

			// Let's get a list of both full dn groups and shortname groups
			foreach ( $entries as $entry ) {
				$shortMember = strtolower( $entry[$nameattribute][0] );
				$dnMember = strtolower( $entry['dn'] );
				$groups["short"][] = $shortMember;
				$groups["dn"][] = $dnMember;
			}
		}

		$this->printDebug( "Returned groups:", SENSITIVE, $groups["dn"] );

		return $groups;
	}

	/**
	 * Returns true if this group is in the list of the currently authenticated
	 * user's groups, else false.
	 *
	 * @param string $group
	 * @return bool
	 * @access private
	 */
	function hasLDAPGroup( $group ) {
		$this->printDebug( "Entering hasLDAPGroup", NONSENSITIVE );

		return in_array( strtolower( $group ), $this->userLDAPGroups["short"] );
	}

	/**
	 * Returns true if an LDAP group with this name exists, else false.
	 *
	 * @param string $group
	 * @return bool
	 * @access private
	 */
	function isLDAPGroup( $group ) {
		$this->printDebug( "Entering isLDAPGroup", NONSENSITIVE );

		return in_array( strtolower( $group ), $this->allLDAPGroups["short"] );
	}

	/**
	 * Helper function for updateUser() and initUser(). Adds users into MediaWiki security groups
	 * based upon groups retreived from LDAP.
	 *
	 * @param User $user
	 * @access private
	 */
	function setGroups( &$user ) {
		global $wgLDAPGroupsPrevail, $wgGroupPermissions, $wgLDAPLocallyManagedGroups;

		// TODO: this is *really* ugly code. clean it up!

		$this->printDebug( "Entering setGroups.", NONSENSITIVE );

		# Add ldap groups as local groups
		if ( isset( $wgLDAPGroupsPrevail[$_SESSION['wsDomain']] ) && $wgLDAPGroupsPrevail[$_SESSION['wsDomain']] ) {
			$this->printDebug( "Adding all groups to wgGroupPermissions: ", SENSITIVE, $this->allLDAPGroups );

			foreach ( $this->allLDAPGroups["short"] as $ldapgroup ) {
				if ( !array_key_exists( $ldapgroup, $wgGroupPermissions ) )
						$wgGroupPermissions[$ldapgroup] = array();
			}
		}

		# add groups permissions
		$localAvailGrps = $user->getAllGroups();
		$localUserGrps = $user->getEffectiveGroups();

		$defaultLocallyManagedGrps = array( 'bot', 'sysop', 'bureaucrat' );

		if ( isset( $wgLDAPLocallyManagedGroups[$_SESSION['wsDomain']] ) ) {
			$locallyManagedGrps = $wgLDAPLocallyManagedGroups[$_SESSION['wsDomain']];
			$locallyManagedGrps = array_unique( array_merge( $defaultLocallyManagedGrps, $locallyManagedGrps ) );
			$this->printDebug( "Locally managed groups: ", SENSITIVE, $locallyManagedGrps );
		} else {
			$locallyManagedGrps = $defaultLocallyManagedGrps;
			$this->printDebug( "Locally managed groups is unset, using defaults: ", SENSITIVE, $locallyManagedGrps );
		}

		$this->printDebug( "Available groups are: ", NONSENSITIVE, $localAvailGrps );
		$this->printDebug( "Effective groups are: ", NONSENSITIVE, $localUserGrps );

		# note: $localUserGrps does not need to be updated with $cGroup added,
		#       as $localAvailGrps contains $cGroup only once.
		foreach ( $localAvailGrps as $cGroup ) {
			# did we once add the user to the group?
			if ( in_array( $cGroup, $localUserGrps ) ) {
				$this->printDebug( "Checking to see if we need to remove user from: $cGroup", NONSENSITIVE );
				if ( ( !$this->hasLDAPGroup( $cGroup ) ) && ( !in_array( $cGroup, $locallyManagedGrps ) ) ) {
					$this->printDebug( "Removing user from: $cGroup", NONSENSITIVE );
					# the ldap group overrides the local group
					# so as the user is currently not a member of the ldap group, he shall be removed from the local group
					$user->removeGroup( $cGroup );
				}
			} else { # no, but maybe the user has recently been added to the ldap group?
				$this->printDebug( "Checking to see if user is in: $cGroup", NONSENSITIVE );
				if ( $this->hasLDAPGroup( $cGroup ) ) {
					$this->printDebug( "Adding user to: $cGroup", NONSENSITIVE );
					$user->addGroup( $cGroup );
				}
			}
		}
	}

	/**
	 * Returns a password that is created via the configured hash settings.
	 *
	 * @param string $password
	 * @return string
	 * @access private
	 */
	function getPasswordHash( $password ) {
		global $wgLDAPPasswordHash;

		$this->printDebug( "Entering getPasswordHash", NONSENSITIVE );

		if ( isset( $wgLDAPPasswordHash[$_SESSION['wsDomain']] ) ) {
			$hashtouse = $wgLDAPPasswordHash[$_SESSION['wsDomain']];
		} else {
			$hashtouse = '';
		}

		// Set the password hashing based upon admin preference
		switch ( $hashtouse ) {
			case 'crypt':
				// https://bugs.php.net/bug.php?id=55439
				if ( crypt( 'password', '$1$U7AjYB.O$' ) == '$1$U7AjYB.O' ) {
					die( 'The version of PHP in use has a broken crypt function. Please upgrade your installation of PHP, or use another encryption function for LDAP.' );
				}
				$pass = '{CRYPT}' . crypt( $password );
				break;
			case 'clear':
				$pass = $password;
				break;
			default:
				$pwd_sha = base64_encode( pack( 'H*', sha1( $password ) ) );
				$pass = "{SHA}" . $pwd_sha;
				break;
		}

		$this->printDebug( "Password is $pass", HIGHLYSENSITIVE );
		return $pass;
	}

	/**
	 * Prints debugging information. $debugText is what you want to print, $debugVal
	 * is the level at which you want to print the information.
	 *
	 * @param string $debugText
	 * @param string $debugVal
	 * @param Array|null $debugArr
	 * @access private
	 */
	function printDebug( $debugText, $debugVal, $debugArr = null ) {
		if ( !function_exists( 'wfDebugLog' ) ) {
			return;
		}

		global $wgLDAPDebug;

		if ( $wgLDAPDebug >= $debugVal ) {
			if ( isset( $debugArr ) ) {
				$debugText = $debugText . " " . implode( "::", $debugArr );
			}
			wfDebugLog( 'ldap', LDAPAUTHVERSION . ' ' . $debugText, false );
		}
	}

	/**
	 * Binds as $userdn with $password. This can be called with only the ldap
	 * connection resource for an anonymous bind.
	 *
	 * @param string $userdn
	 * @param string $password
	 * @return bool
	 * @access private
	 */
	function bindAs( $userdn = null, $password = null ) {
		// Let's see if the user can authenticate.
		if ( $userdn == null || $password == null ) {
			$bind = @ldap_bind( $this->ldapconn );
		} else {
			$bind = @ldap_bind( $this->ldapconn, $userdn, $password );
		}
		if ( !$bind ) {
			$this->printDebug( "Failed to bind as $userdn", NONSENSITIVE );
			$this->printDebug( "with password: $password", HIGHLYSENSITIVE );
			return false;
		}
		return true;
	}

	/**
	 * Returns true if auto-authentication is allowed, and the user is
	 * authenticating using the auto-authentication domain.
	 *
	 * @return bool
	 * @access private
	 */
	function useAutoAuth() {
		global $wgLDAPAutoAuthDomain;

		$this->printDebug( "", NONSENSITIVE );
		return isset( $wgLDAPAutoAuthDomain ) && $_SESSION['wsDomain'] == $wgLDAPAutoAuthDomain;
	}

	/**
	 * Returns a string which has the chars *, (, ), \ & NUL escaped to LDAP compliant
	 * syntax as per RFC 2254
	 * Thanks and credit to Iain Colledge for the research and function.
	 *
	 * @param string $string
	 * @return string
	 * @access private
	 */
	function getLdapEscapedString( $string ) {
		// Make the string LDAP compliant by escaping *, (, ) , \ & NUL
		return str_replace(
			array( "\\", "(", ")", "*", "\x00" ), // replace this
			array( "\\5c", "\\28", "\\29", "\\2a", "\\00" ), // with this
			$string // in this
			);
	}

	/**
	 * Returns a basedn by the type of entry we are searching for.
	 *
	 * @param int $type
	 * @return string
	 * @access private
	 */
	function getBaseDN( $type ) {
		global $wgLDAPBaseDNs, $wgLDAPGroupBaseDNs, $wgLDAPUserBaseDNs;

		$this->printDebug( "Entering getBaseDN", NONSENSITIVE );

		$ret = '';
		switch( $type ) {
			case USERDN:
				if ( isset( $wgLDAPUserBaseDNs[$_SESSION['wsDomain']] ) ) {
					$ret = $wgLDAPUserBaseDNs[$_SESSION['wsDomain']];
				}
				break;
			case GROUPDN:
				if ( isset( $wgLDAPGroupBaseDNs[$_SESSION['wsDomain']] ) ) {
					$ret =  $wgLDAPGroupBaseDNs[$_SESSION['wsDomain']];
				}
				break;
			case DEFAULTDN:
				if ( isset( $wgLDAPBaseDNs[$_SESSION['wsDomain']] ) ) {
					$ret = $wgLDAPBaseDNs[$_SESSION['wsDomain']];
					$this->printDebug( "basedn is $ret", NONSENSITIVE );
					return $ret;
				} else {
					$this->printDebug( "basedn is not set.", NONSENSITIVE );
					return '';
				}
				break;
		}

		if ( $ret == '' ) {
			$this->printDebug( "basedn is not set for this type of entry, trying to get the default basedn.", NONSENSITIVE );
			// We will never reach here if $type is self::DEFAULTDN, so to avoid code
			// code duplication, we'll get the default by re-calling the function.
			return $this->getBaseDN( DEFAULTDN );
		} else {
			$this->printDebug( "basedn is $ret", NONSENSITIVE );
			return $ret;
		}
	}
}

// The following was derived from the SSL Authentication plugin
// http://www.mediawiki.org/wiki/SSL_authentication

/**
 * Sets up the SSL authentication piece of the LDAP plugin.
 *
 * @access public
 */
function AutoAuthSetup() {
	global $wgLDAPAutoAuthUsername;
	global $wgLDAPSSLUsername;
	global $wgLDAPAutoAuthDomain;
	global $wgLDAPSmartcardDomain;
	global $wgHooks;
	global $wgAuth;
	$wgAuth = new LdapAuthenticationPlugin();

	$wgAuth->printDebug( "Entering AutoAuthSetup.", NONSENSITIVE );

	// Set configuration options for backwards compatibility
	if ( isset( $wgLDAPSSLUsername ) && $wgLDAPSSLUsername != "" ) {
		$wgAuth->printDebug( 'Setting $wgLDAPAutoAuthUsername to $wgLDAPSSLUsername; please change your configuration to fix this deprecated configuration variable.', NONSENSITIVE );
		$wgLDAPAutoAuthUsername = $wgLDAPSSLUsername;
	}
	if ( isset( $wgLDAPSmartcardDomain ) && $wgLDAPSmartcardDomain != "" ) {
		$wgAuth->printDebug( 'Setting $wgLDAPAutoAuthDomain to $wgLDAPSmartcardDomain; please change your configuration to fix this deprecated configuration variable.', NONSENSITIVE );
		$wgLDAPAutoAuthDomain = $wgLDAPSmartcardDomain;
	}

	if ( $wgLDAPAutoAuthUsername !== "" ) {
		$wgAuth->printDebug( "wgLDAPAutoAuthUsername is not null, adding hooks.", NONSENSITIVE );
		$wgHooks['UserLoadAfterLoadFromSession'][] = 'LdapAutoAuthentication::Authenticate';

		$wgHooks['PersonalUrls'][] = 'LdapAutoAuthentication::NoLogout'; /* Disallow logout link */
	}
}
