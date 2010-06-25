<?php
# Copyright (C) 2010 Ryan Lane <http://www.mediawiki.org/wiki/User:Ryan_lane>
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

$wgJSBreadCrumbsMaxCrumbs = 5;
$wgJSBreadCrumbsSeparator = "»";
$wgJSBreadCrumbsCookiePath = "/";

// Sets Credits
$wgExtensionCredits['other'][] = array(
        'path' => __FILE__,
        'name' => 'JSBreadCrumbs',
        'author' => 'Ryan Lane',
        'version' => '0.1',
        'url' => 'http://www.mediawiki.org/wiki/Extension:JSBreadCrumbs',
        'descriptionmsg' => 'jsbreadcrumbs-desc',
);

// Adds Autoload Classes
$wgAutoloadClasses['JSBreadCrumbsHooks'] =
        dirname( __FILE__ ) . "/JSBreadCrumbs.hooks.php";

// Adds Internationalized Messages
$wgExtensionMessagesFiles['JSBreadCrumbs'] =
        dirname( __FILE__ ) . "/JSBreadCrumbs.i18n.php";

// Registers Hooks
$wgHooks['BeforePageDisplay'][] = 'JSBreadCrumbsHooks::addResources';
$wgHooks['MakeGlobalVariablesScript'][] = 'JSBreadCrumbsHooks::addJSVars';
