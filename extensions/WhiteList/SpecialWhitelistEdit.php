<?php

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation, version 2
of the License.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if (!defined('MEDIAWIKI')) die();
/**
 * A Special Page extension to manage contractor access white lists
 *
 * @package MediaWiki
 * @subpackage Extensions
 *
 * @author Paul Grinberg <gri6507@yahoo.com>
 * @author Mike Sullivan <ms-mediawiki@umich.edu>
 * @copyright Copyright © 2008, Paul Grinberg, Mike Sullivan
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionCredits['specialpage'][] = array(
        'name'        => 'WhiteListEdit',
        'version'     => 'v0.8.2',
        'author'      => array('Paul Grinberg', 'Mike Sullivan'),
        'email'       => 'gri6507 at yahoo dot com, ms-mediawiki AT umich DOT edu',
        'description' => 'Edit the access permissions of restricted users',
        'url'         => 'http://www.mediawiki.org/wiki/Extension:WhiteList',
);

# these are the groups and the rights used within this extension
if( !isset($wgWhiteListRestrictedGroup))
	$wgWhiteListRestrictedGroup = 'restricted';
if( !isset($wgWhiteListManagerGroup))
	$wgWhiteListManagerGroup = 'manager';
if( !isset($wgWhiteListRestrictedRight))
	$wgWhiteListRestrictedRight = 'restricttowhitelist';
if( !isset($wgWhiteListManagerRight))
	$wgWhiteListManagerRight = 'editwhitelist';

# Define groups and rights
if( !isset($wgGroupPermissions['*']['usewhitelist']))
	$wgGroupPermissions['*']['usewhitelist'] = false;
if( !isset($wgGroupPermissions[$wgWhiteListRestrictedGroup]['edit']))
	$wgGroupPermissions[$wgWhiteListRestrictedGroup]['edit'] = true;
if( !isset($wgGroupPermissions[$wgWhiteListRestrictedGroup][$wgWhiteListRestrictedRight]))
	$wgGroupPermissions[$wgWhiteListRestrictedGroup][$wgWhiteListRestrictedRight] = true;
if( !isset($wgGroupPermissions['*'][$wgWhiteListManagerRight]))
	$wgGroupPermissions['*'][$wgWhiteListManagerRight] = false;
if( !isset($wgGroupPermissions[$wgWhiteListManagerGroup][$wgWhiteListManagerRight]))
	$wgGroupPermissions[$wgWhiteListManagerGroup][$wgWhiteListManagerRight] = true;

# Define default global overrides
if( !isset($wgWhitelistOverride['always']['read']) )
    $wgWhitelistOverride['always']['read'] = array(
        "Special:WhiteList",       # needed so that restricted users can see their "my pages" list
        "Special:Preferences",     # needed so that restricted users can set their preferences
        "Special:Userlogout",      # needed so that restricted users can logout
        "Special:Userlogin",       # needed so that restricted users can login
        "MediaWiki:Monobook.css",  # needed so that restricted users can view properly formatted content
        "MediaWiki:Common.css",    # needed so that restricted users can view properly formatted content
        "MediaWiki:Common.js",     # needed so that restricted users can view properly formatted content
);
if( !isset($wgWhitelistOverride['always']['edit']) )
	$wgWhitelistOverride['always']['edit'] = array();
if( !isset($wgWhitelistOverride['never']['read']) )
	$wgWhitelistOverride['never']['read'] = array();
if( !isset($wgWhitelistOverride['never']['edit']) )
	$wgWhitelistOverride['never']['edit'] = array();

# Define default case insensitivity setting
if( !isset($wgWhitelistWildCardInsensitive) )
	$wgWhitelistWildCardInsensitive = true;

# Define default user page setting
if( !isset($wgWhitelistAllowUserPages) )
	$wgWhitelistAllowUserPages = true;

# This extension requires the Extension:Usage_Statistics
# NOTE: you don't actually need the gnuplot extension for the functinoality needed by this extension
#require_once('SpecialUserStats.php');

$dir = dirname(__FILE__) . '/';

require_once($dir. 'WhitelistAuth.php');

$wgExtensionMessagesFiles['WhitelistEdit'] = $dir . 'SpecialWhitelistEdit.i18n.php';
$wgExtensionMessagesFiles['Whitelist']     = $dir . 'SpecialWhitelistEdit.i18n.php';
$wgAutoloadClasses['WhitelistEdit']        = $dir . 'SpecialWhitelistEdit_body.php';
$wgAutoloadClasses['Whitelist']            = $dir . 'SpecialWhitelistEdit_body.php';
$wgSpecialPages['WhitelistEdit']           = 'WhitelistEdit';
$wgSpecialPages['WhiteList']               = 'WhiteList';

require_once($dir . 'SpecialWhitelistEdit_body.php');

$wgHooks['PersonalUrls'][] = 'wfAddRestrictedPagesTab';
$wgHooks['userCan'][] = 'WhitelistExec::CheckWhitelist';
