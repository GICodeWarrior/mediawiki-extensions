<?php
/**
 * Server.php -- Server side of OpenID site
 * Copyright 2006,2007 Internet Brands (http://www.internetbrands.com/)
 * By Evan Prodromou <evan@wikitravel.org>
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @author Evan Prodromou <evan@wikitravel.org>
 * @addtogroup Extensions
 */

if (defined('MEDIAWIKI')) {

	require_once("Auth/OpenID/Server.php");
	require_once("Auth/OpenID/Consumer.php");

	# These are trust roots that we don't bother asking users
	# whether the trust root is allowed to trust; typically
	# for closely-linked partner sites.

	$wgOpenIDServerForceAllowTrust = array();

	# Where to store transitory data. Can be 'memc' for the $wgMemc
	# global caching object, or 'file' if caching is turned off
	# completely and you need a fallback.

	$wgOpenIDServerStoreType = 'memc';

	# If the store type is set to 'file', this is is the name of a
	# directory to store the data in.

	$wgOpenIDServerStorePath = NULL;

	# Outputs a Yadis (http://yadis.org/) XRDS file, saying that this server
	# supports OpenID and lots of other jazz.

	function wfSpecialOpenIDXRDS($par) {
	        global $wgOut;

		// XRDS preamble XML.
    	        $xml_template = array('<?xml version="1.0" encoding="UTF-8"?>',
				      '<xrds:XRDS',
				      '  xmlns:xrds="xri://\$xrds"',
				      '  xmlns:openid="http://openid.net/xmlns/1.0"',
				      '  xmlns="xri://$xrd*($v*2.0)">',
				      '<XRD>');

		// Generate the user page URL.
		$user_title = Title::makeTitle(NS_USER, $par);
		$user_url = $user_title->getFullURL();

		// Generate the OpenID server endpoint URL.
		$server_title = Title::makeTitle(NS_SPECIAL, 'OpenIDServer');
		$server_url = $server_title->getFullURL();

		// Define array of Yadis services to be included in
		// the XRDS output.
		$services = array(
				  array('uri' => $server_url,
					'priority' => '0',
					'types' => array('http://openid.net/signon/1.0',
							 'http://openid.net/sreg/1.0'),
					'delegate' => $user_url)
				  );

		// Generate <Service> elements into $service_text.
		$service_text = "\n";
		foreach ($services as $service) {
		    $types = array();
		    foreach ($service['types'] as $type_uri) {
		        $types[] = '    <Type>'.$type_uri.'</Type>';
		    }
		    $service_text .= implode("\n",
					     array('  <Service priority="'.$service['priority'].'">',
						   '    <URI>'.$server_url.'</URI>',
						   implode("\n", $types),
						   '  </Service>'));
		}

		$wgOut->disable();

		// Print content-type and XRDS XML.
		header("Content-Type", "application/xrds+xml");
		print implode("\n", $xml_template);
		print $service_text;
		print implode("\n", array("</XRD>", "</xrds:XRDS>"));
	}

	# Special page for the server side of OpenID
	# It has three major flavors:
	# * no parameter is for external requests to validate a user.
	# * 'Login' is we got a validation request but the
	#   user wasn't logged in. We show them a form (see OpenIDServerLoginForm)
	#   and they post the results, which go to OpenIDServerLogin
	# * 'Trust' is when the user has logged in, but they haven't
	#   specified whether it's OK to let the requesting site trust them.
	#   If they haven't, we show them a form (see OpenIDServerTrustForm)
	#   and let them post results which go to OpenIDServerTrust.
	#
	# OpenID has its own modes; we only handle two of them ('check_setup' and
	# 'check_immediate') and let the OpenID libraries handle the rest.
	#
	# Output may be just a redirect, or a form if we need info.

	function wfSpecialOpenIDServer($par) {

		global $wgOut;

		$server =& OpenIDServer();

		switch ($par) {
		 case 'Login':
			list($request, $sreg) = OpenIDServerFetchValues();
			$result = OpenIDServerLogin($request);
			if ($result) {
				if (is_string($result)) {
					OpenIDServerLoginForm($request, $result);
					return;
				} else {
					OpenIDServerResponse($server, $result);
					return;
				}
			}
			break;
		 case 'Trust':
			list($request, $sreg) = OpenIDServerFetchValues();
			$result = OpenIDServerTrust($request, $sreg);
			if ($result) {
				if (is_string($result)) {
					OpenIDServerTrustForm($request, $sreg, $result);
					return;
				} else {
					OpenIDServerResponse($server, $result);
					return;
				}
			}
			break;
		 default:
			if (strlen($par)) {
				$wgOut->errorpage('openiderror', 'openiderrortext');
				return;
			} else {
				$method = $_SERVER['REQUEST_METHOD'];
				$query = null;
				if ($method == 'GET') {
					$query = $_GET;
				} else {
					$query = $_POST;
				}

				$query = Auth_OpenID::fixArgs($query);
				$request = $server->decodeRequest($query);
				$sreg = OpenIdServerSregFromQuery($query);
				$response = NULL;
				break;
			}
		}

		if (!isset($request)) {
			$wgOut->errorpage('openiderror', 'openiderrortext');
			return;
		}

		global $wgUser;

		switch ($request->mode) {
		 case "checkid_setup":
			$response = OpenIDServerCheck($server, $request, $sreg, false);
			break;
		 case "checkid_immediate":
			$response = OpenIDServerCheck($server, $request, $sreg, true);
			break;
		 default:
			# For all the other parts, just let the libs do it
			$response =& $server->handleRequest($request);
		}

		# OpenIDServerCheck returns NULL if some output (like a form)
		# has been done

		if (isset($response)) {
			# We're done; clear values
			OpenIDServerClearValues();
			OpenIDServerResponse($server, $response);
		}
	}

	# Returns the full URL of the special page; we need to pass it around
	# for some requests

	function OpenIDServerUrl() {
		$nt = Title::makeTitleSafe(NS_SPECIAL, 'OpenIDServer');
		if (isset($nt)) {
			return $nt->getFullURL();
		} else {
			return NULL;
		}
	}

	# Returns an Auth_OpenID_Server from the libraries. Utility.

	function OpenIDServer() {
                global $wgOpenIDServerStorePath,
		    $wgOpenIDServerStoreType;

		$store = getOpenIDStore($wgOpenIDServerStoreType,
		    'server',
		    array('path' => $wgOpenIDServerStorePath));

		return new Auth_OpenID_Server($store);
	}

	# Checks a validation request. $imm means don't run any UI.
	# Fairly meticulous and step-by step, and uses assertions
	# to point out assumptions at each step.
	#
	# XXX: this should probably be broken up into multiple functions for
	# clarity.

	function OpenIDServerCheck($server, $request, $sreg, $imm = true) {

		global $wgUser, $wgOut;

		assert(isset($wgUser) && isset($wgOut));
		assert(isset($server));
		assert(isset($request));
		assert(isset($sreg));
		assert(isset($imm) && is_bool($imm));

		# Is the passed identity URL a user page?

		$url = $request->identity;

		assert(isset($url) && strlen($url) > 0);

		$name = OpenIDUrlToUserName($url);

		if (!isset($name) || strlen($name) == 0) {
			wfDebug("OpenID: '$url' not a user page.\n");
			return $request->answer(false, OpenIdServerUrl());
		}

		assert(isset($name) && strlen($name) > 0);

		# Is there a logged in user?

		if ($wgUser->getId() == 0) {
			wfDebug("OpenID: User not logged in.\n");
			if ($imm) {
				return $request->answer(false, OpenIdServerUrl());
			} else {
				# Bank these for later
				OpenIDServerSaveValues($request, $sreg);
				OpenIDServerLoginForm($request);
				return NULL;
			}
		}

		assert($wgUser->getId() != 0);

		# Is the user page for the logged-in user?

		$user = User::newFromName($name);

		if (!isset($user) ||
			$user->getId() != $wgUser->getId()) {
			wfDebug("OpenID: User from url not logged in user.\n");
			return $request->answer(false, OpenIdServerUrl());
		}

		assert(isset($user) && $user->getId() == $wgUser->getId() && $user->getId() != 0);

		# Is the user an OpenID user?

		$openid = OpenIDGetUserUrl($user);

		if (isset($openid) && strlen($openid) > 0) {
			wfDebug("OpenID: Not one of our users; logs in with OpenID.\n");
			return $request->answer(false, OpenIdServerUrl());
		}

	    assert(is_array($sreg));

		# Does the request require sreg fields that the user has not specified?

		if (array_key_exists('required', $sreg)) {
			$notFound = false;
			foreach ($sreg['required'] as $reqfield) {
				if (is_null(OpenIdGetUserField($user, $reqfield))) {
					$notFound = true;
					break;
				}
			}
			if ($notFound) {
				wfDebug("OpenID: Consumer demands info we don't have.\n");
				return $request->answer(false, OpenIdServerUrl());
			}
		}

		# Trust check

		$trust_root = $request->trust_root;

		assert(isset($trust_root) && is_string($trust_root) && strlen($trust_root) > 0);

		$trust = OpenIDGetUserTrust($user, $trust_root);

		# Is there a trust record?

		if (is_null($trust)) {
			wfDebug("OpenID: No trust record.\n");
			if ($imm) {
				return $request->answer(false, OpenIdServerUrl());
			} else {
				# Bank these for later
				OpenIDServerSaveValues($request, $sreg);
				OpenIDServerTrustForm($request, $sreg);
				return NULL;
			}
		}

	    assert(!is_null($trust));

		# Is the trust record _not_ to allow trust?
		# NB: exactly equal

		if ($trust === false) {
			wfDebug("OpenID: User specified not to allow trust.\n");
			return $request->answer(false, OpenIdServerUrl());
		}

        assert(isset($trust) && is_array($trust));

		# Does the request require sreg fields that the user has
		# not allowed us to pass, or has not specified?

		if (array_key_exists('required', $sreg)) {
			$notFound = false;
			foreach ($sreg['required'] as $reqfield) {
				if (!in_array($reqfield, $trust) ||
					is_null(OpenIdGetUserField($user, $reqfield))) {
					$notFound = true;
					break;
				}
			}
			if ($notFound) {
				wfDebug("OpenID: Consumer demands info user doesn't want shared.\n");
				return $request->answer(false, OpenIdServerUrl());
			}
		}

	    # assert(all required sreg fields are in $trust)

		# XXX: run a hook here to check

		# SUCCESS

		$response_fields = array_intersect(array_unique(array_merge($sreg['required'], $sreg['optional'])),
										   $trust);

		$response = $request->answer(true);

	    assert(isset($response));

		foreach ($response_fields as $field) {
			$value = OpenIDGetUserField($user, $field);
			if (!is_null($value)) {
				$response->addField('sreg', $field, $value);
			}
		}

		return $response;
	}

	# Get the user's configured trust value for a particular trust root.
	# Returns one of three values:
	# * NULL -> no stored trust preferences
	# * false -> stored trust preference is not to trust
	# * array -> possibly empty array of allowed profile fields; trust is OK

	function OpenIDGetUserTrust($user, $trust_root) {
		static $allFields = array('nickname', 'fullname', 'email', 'language');
		global $wgOpenIDServerForceAllowTrust;

		foreach ($wgOpenIDServerForceAllowTrust as $force) {
			if (preg_match($force, $trust_root)) {
				return $allFields;
			}
		}

		$trust_array = OpenIDGetUserTrustArray($user);

		if (array_key_exists($trust_root, $trust_array)) {
			return $trust_array[$trust_root];
		} else {
			return null; # Unspecified trust
		}
	}

	function OpenIDSetUserTrust(&$user, $trust_root, $value) {

		$trust_array = OpenIDGetUserTrustArray($user);

		if (is_null($value)) {
			if (array_key_exists($trust_root, $trust_array)) {
				unset($trust_array[$trust_root]);
			}
		} else {
			$trust_array[$trust_root] = $value;
		}

		OpenIDSetUserTrustArray($user, $trust_array);
	}

	function OpenIDGetUserTrustArray($user) {
		$trust_array = array();
		$trust_str = $user->getOption('openid_trust');
		if (strlen($trust_str) > 0) {
			$trust_records = explode("\x1E", $trust_str);
			foreach ($trust_records as $record) {
				$fields = explode("\x1F", $record);
				$trust_root = array_shift($fields);
				if (count($fields) == 1 && strcmp($fields[0], 'no') == 0) {
					$trust_array[$trust_root] = false;
				} else {
					$fields = array_map('trim', $fields);
					$fields = array_filter($fields, 'OpenIDValidField');
					$trust_array[$trust_root] = $fields;
				}
			}
		}
		return $trust_array;
	}

	function OpenIDSetUserTrustArray(&$user, $arr) {
		$trust_records = array();
		foreach ($arr as $root => $value) {
			if ($value === false) {
				$record = implode("\x1F", array($root, 'no'));
			} else if (is_array($value)) {
				if (count($value) == 0) {
					$record = $root;
				} else {
					$value = array_map('trim', $value);
					$value = array_filter($value, 'OpenIDValidField');
					$record = implode("\x1F", array_merge(array($root), $value));
				}
			} else {
				continue;
			}
			$trust_records[] = $record;
		}
		$trust_str = implode("\x1E", $trust_records);
		$user->setOption('openid_trust', $trust_str);
	}

	function OpenIDValidField($name) {
		# XXX: eventually add timezone
		static $fields = array('nickname', 'email', 'fullname', 'language');
		return in_array($name, $fields);
	}

	function OpenIDServerSregFromQuery($query) {
		$sreg = array('required' => array(), 'optional' => array(),
					  'policy_url' => NULL);
		if (array_key_exists('openid.sreg.required', $query)) {
			$sreg['required'] = explode(',', $query['openid.sreg.required']);
		}
		if (array_key_exists('openid.sreg.optional', $query)) {
			$sreg['optional'] = explode(',', $query['openid.sreg.optional']);
		}
		if (array_key_exists('openid.sreg.policy_url', $query)) {
			$sreg['policy_url'] = $query['openid.sreg.policy_url'];
		}
		return $sreg;
	}

	function OpenIDSetUserField(&$user, $field, $value) {
		switch ($field) {
		 case 'fullname':
			$user->setRealName($value);
			return true;
			break;
		 case 'email':
			# FIXME: deal with validation
			$user->setEmail($value);
			return true;
			break;
		 case 'language':
			$user->setOption('language', $value);
			return true;
			break;
		 default:
			return false;
		}
	}

	function OpenIDGetUserField($user, $field) {
		switch ($field) {
		 case 'nickname':
			return $user->getName();
			break;
		 case 'fullname':
			return $user->getRealName();
			break;
		 case 'email':
			return $user->getEmail();
			break;
		 case 'language':
			return $user->getOption('language');
			break;
		 default:
			return NULL;
		}
	}

	function OpenIDServerResponse($server, $response) {
		global $wgOut;

		$wgOut->disable();

		$wr =& $server->encodeResponse($response);

		header("Status: " . $wr->code);

		foreach ($wr->headers as $k => $v) {
			header("$k: $v");
		}

		print $wr->body;
		return;
	}

	function OpenIDServerLoginForm($request, $msg = null) {

		global $wgOut, $wgUser;

		$url = $request->identity;
		$name = OpenIDUrlToUserName($url);
		$trust_root = $request->trust_root;

		$instructions = wfMsg('openidserverlogininstructions', $url, $name, $trust_root);

		$username = wfMsg('yourname');
		$password = wfMsg('yourpassword');
		$ok = wfMsg('ok');
		$cancel = wfMsg('cancel');

		if (isset($msg)) {
			$wgOut->addHTML("<p class='error'>{$msg}</p>");
		}

		$sk = $wgUser->getSkin();

		$wgOut->addHTML("<p>{$instructions}</p>" .
						'<form action="' . $sk->makeSpecialUrl('OpenIDServer/Login') . '" method="POST">' .
						'<table>' .
						"<tr><td><label for='username'>{$username}</label></td>" .
						'    <td><span id="username">' . htmlspecialchars($name) . '</span></td></tr>' .
						"<tr><td><label for='password'>{$password}</label></td>" .
						'    <td><input type="password" name="wpPassword" size="32" value="" /></td></tr>' .
						"<tr><td colspan='2'><input type='submit' name='wpOK' value='{$ok}' /> <input type='submit' name='wpCancel' value='{$cancel}' /></td></tr>" .
						'</table>' .
						'</form>');
	}

	function OpenIDServerSaveValues($request, $sreg) {
		global $wgSessionStarted, $wgUser;

		if (!$wgSessionStarted) {
			$wgUser->SetupSession();
		}

		$_SESSION['openid_server_request'] = $request;
		$_SESSION['openid_server_sreg'] = $sreg;

		return true;
	}

	function OpenIDServerFetchValues() {
		return array($_SESSION['openid_server_request'], $_SESSION['openid_server_sreg']);
	}

	function OpenIDServerClearValues() {
		unset($_SESSION['openid_server_request']);
		unset($_SESSION['openid_server_sreg']);
		return true;
	}

	function OpenIDServerLogin($request) {

		global $wgRequest, $wgUser;

		assert(isset($request));

		assert(isset($wgRequest));

		if ($wgRequest->getCheck('wpCancel')) {
			return $request->answer(false);
		}

		$password = $wgRequest->getText('wpPassword');

		if (!isset($password) || strlen($password) == 0) {
			return wfMsg('wrongpasswordempty');
		}

		assert (isset($password) && strlen($password) > 0);

		$url = $request->identity;

		assert(isset($url) && is_string($url) && strlen($url) > 0);

		$name = OpenIDUrlToUserName($url);

		assert(isset($name) && is_string($name) && strlen($name) > 0);

		$user = User::newFromName($name);

		assert(isset($user));

		if (!$user->checkPassword($password)) {
			return wfMsg('wrongpassword');
		} else {
			$id = $user->getId();
			$wgUser = $user;
			$wgUser->SetupSession();
			$wgUser->SetCookies();
			wfRunHooks('UserLoginComplete', array(&$wgUser));
			return false;
		}
	}

	function OpenIDServerTrustForm($request, $sreg, $msg = NULL) {

		global $wgOut, $wgUser;

		$url = $request->identity;
		$name = OpenIDUrlToUserName($url);
		$trust_root = $request->trust_root;

		$instructions = wfMsg('openidtrustinstructions', $trust_root);
		$allow = wfMsg('openidallowtrust', $trust_root);

		if (is_null($sreg['policy_url'])) {
			$policy = wfMsg('openidnopolicy');
		} else {
			$policy = wfMsg('openidpolicy', $sreg['policy_url']);
		}

		if (isset($msg)) {
			$wgOut->addHTML("<p class='error'>{$msg}</p>");
		}

		$ok = wfMsg('ok');
		$cancel = wfMsg('cancel');

		$sk = $wgUser->getSkin();

		$wgOut->addHTML("<p>{$instructions}</p>" .
						'<form action="' . $sk->makeSpecialUrl('OpenIDServer/Trust') . '" method="POST">' .
						'<input name="wpAllowTrust" type="checkbox" value="on" checked="checked" id="wpAllowTrust">' .
						'<label for="wpAllowTrust">' . $allow . '</label><br />');

		$fields = array_filter(array_unique(array_merge($sreg['optional'], $sreg['required'])),
							   'OpenIDValidField');

		if (count($fields) > 0) {
			$wgOut->addHTML('<table>');
			foreach ($fields as $field) {
				$wgOut->addHTML("<tr>");
				$wgOut->addHTML("<th><label for='wpAllow{$field}'>");
				$wgOut->addHTML(wfMsg("openid$field"));
				$wgOut->addHTML("</label></th>");
				$value = OpenIDGetUserField($wgUser, $field);
				$wgOut->addHTML("</td>");
				$wgOut->addHTML("<td> " . ((is_null($value)) ? '' : $value) . "</td>");
				$wgOut->addHTML("<td>" . ((in_array($field, $sreg['required'])) ? wfMsg('openidrequired') : wfMsg('openidoptional')) . "</td>");
				$wgOut->addHTML("<td><input name='wpAllow{$field}' id='wpAllow{$field}' type='checkbox'");
				if (!is_null($value)) {
					$wgOut->addHTML(" value='on' checked='checked' />");
				} else {
					$wgOut->addHTML(" disabled='disabled' />");
				}
				$wgOut->addHTML("</tr>");
			}
			$wgOut->addHTML('</table>');
		}
		$wgOut->addHTML("<input type='submit' name='wpOK' value='{$ok}' /> <input type='submit' name='wpCancel' value='{$cancel}' />");
		return NULL;
	}

	function OpenIDServerTrust($request, $sreg) {
		global $wgRequest, $wgUser;

		assert(isset($request));
		assert(isset($sreg));
		assert(isset($wgRequest));

		if ($wgRequest->getCheck('wpCancel')) {
			return $request->answer(false);
		}

		$trust_root = $request->trust_root;

		assert(isset($trust_root) && strlen($trust_root) > 0);

		# If they don't want us to allow trust, save that.

		if (!$wgRequest->getCheck('wpAllowTrust')) {

			OpenIDSetUserTrust($wgUser, $trust_root, false);
			# Set'em and sav'em
			$wgUser->saveSettings();
		} else {

			$fields = array_filter(array_unique(array_merge($sreg['optional'], $sreg['required'])),
								   'OpenIDValidField');

			$allow = array();

			foreach ($fields as $field) {
				if ($wgRequest->getCheck('wpAllow' . $field)) {
					$allow[] = $field;
				}
			}

			OpenIDSetUserTrust($wgUser, $trust_root, $allow);
			# Set'em and sav'em
			$wgUser->saveSettings();
		}

	}

	# Converts an URL to a user name, if possible

	function OpenIDUrlToUserName($url) {

		global $wgArticlePath, $wgServer;

		# URL must be a string

		if (!isset($url) || !is_string($url) || strlen($url) == 0) {
			return null;
		}

		# it must start with our server, case doesn't matter

		if (strpos(strtolower($url), strtolower($wgServer)) !== 0) {
			return null;
		}

		$parts = parse_url($url);

		$relative = $parts['path'];
		if (!is_null($parts['query']) && strlen($parts['query']) > 0) {
			$relative .= '?' . $parts['query'];
		}

		# Use regexps to extract user name

		$pattern = str_replace('$1', '(.*)', $wgArticlePath);
		$pattern = str_replace('?', '\?', $pattern);
		# Can't have a pound-sign in the relative, since that's for fragments
		if (!preg_match("#$pattern#", $relative, $matches)) {
			return null;
		} else {
			$titletext = urldecode($matches[1]);
			$nt = Title::newFromText($titletext);
			if (is_null($nt) || $nt->getNamespace() != NS_USER) {
				return null;
			} else {
				return $nt->getText();
			}
		}
	}
}

?>