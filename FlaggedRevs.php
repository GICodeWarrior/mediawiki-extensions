<?php
/*
 (c) Aaron Schulz, Joerg Baach, 2007-2008 GPL

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License along
 with this program; if not, write to the Free Software Foundation, Inc.,
 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 http://www.gnu.org/copyleft/gpl.html
*/

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "FlaggedRevs extension\n";
	exit( 1 );
}

# Stable constant to let extensions be aware that this is enabled
define( 'FLAGGED_REVISIONS', true );

$wgExtensionCredits['specialpage'][] = array(
	'path'           => __FILE__,
	'name'           => 'Flagged Revisions',
	'author'         => array( 'Aaron Schulz', 'Joerg Baach' ),
	'url'            => 'http://www.mediawiki.org/wiki/Extension:FlaggedRevs',
	'descriptionmsg' => 'flaggedrevs-desc',
);

# Load global constants
require( "FlaggedRevs.defines.php" );

# Load default configuration variables
require( "FlaggedRevs.config.php" );

# XXX: Don't mess with dump HTML...
if ( defined( 'MW_HTML_FOR_DUMP' ) ) {
	return; // done after default config set to avoid LocalSettings errors
}

# Define were classes and i18n files are located
require( "FlaggedRevs.setup.php" );
FlaggedRevsSetup::defineSourcePaths(
	$wgAutoloadClasses,
	$wgExtensionMessagesFiles,
	$wgExtensionAliasesFiles
);

# Load hooks that are always set
FlaggedRevsSetup::setUnconditionalHooks();

# Define new rights that FlaggedRevs creates
$wgAvailableRights[] = 'review'; # review pages to basic quality levels
$wgAvailableRights[] = 'validate'; # review pages to all quality levels
$wgAvailableRights[] = 'autoreview'; # auto-review one's own edits (including rollback)
$wgAvailableRights[] = 'autoreviewrestore'; # auto-review one's own rollbacks
$wgAvailableRights[] = 'unreviewedpages'; # view the list of unreviewed pages
$wgAvailableRights[] = 'movestable'; # move pages with stable versions
$wgAvailableRights[] = 'stablesettings'; # change page stability settings

# Bots are granted autoreview via hooks, mark in rights
# array so that it shows up in sp:ListGroupRights...
$wgGroupPermissions['bot']['autoreview'] = true;

# Special case cache invalidations
$wgJobClasses['flaggedrevs_CacheUpdate'] = 'FRExtraCacheUpdateJob';

# New user preferences
$wgDefaultUserOptions['flaggedrevssimpleui'] = (int)$wgSimpleFlaggedRevsUI;
$wgDefaultUserOptions['flaggedrevsstable'] = FR_SHOW_STABLE_DEFAULT;
$wgDefaultUserOptions['flaggedrevseditdiffs'] = true;
$wgDefaultUserOptions['flaggedrevsviewdiffs'] = false;

# Add review log
$wgLogTypes[] = 'review';
# Add stable version log
$wgLogTypes[] = 'stable';

# Log name and description as well as action handlers
FlaggedRevsUISetup::defineLogBasicDescription( $wgLogNames, $wgLogHeaders, $wgFilterLogTypes );
FlaggedRevsUISetup::defineLogActionHanders( $wgLogActions, $wgLogActionsHandlers );

# JS/CSS modules and message bundles used by JS scripts
FlaggedRevsUISetup::defineResourceModules( $wgResourceModules );

# Load the extension after setup is finished
$wgExtensionFunctions[] = 'efLoadFlaggedRevs';

/*
 * This function is for setup that has to happen in Setup.php
 * when the functions in $wgExtensionFunctions get executed.
 * Note: avoid calls to FlaggedRevs class here for performance.
 */
function efLoadFlaggedRevs() {
	# LocalSettings.php loaded, safe to load config
	FlaggedRevs::ready();

	# Conditional autopromote groups
	FlaggedRevsSetup::setAutopromoteConfig();

	# Register special pages (some are conditional)
	FlaggedRevsSetup::setSpecialPages();
	# Conditional API modules
	FlaggedRevsSetup::setAPIModules();
	# Load hooks that aren't always set
	FlaggedRevsSetup::setConditionalHooks();
	# Remove conditionally applicable rights
	FlaggedRevsSetup::setConditionalRights();
	# Defaults for user preferences
	FlaggedRevsSetup::setConditionalPreferences();
}

# AJAX functions
$wgAjaxExportList[] = 'RevisionReview::AjaxReview';
$wgAjaxExportList[] = 'FlaggablePageView::AjaxBuildDiffHeaderItems';

# Cache update
$wgSpecialPageCacheUpdates['UnreviewedPages'] = 'UnreviewedPages::updateQueryCache';
$wgSpecialPageCacheUpdates['ValidationStatistics'] = 'FlaggedRevsStats::updateCache';

# B/C ...
$wgLogActions['rights/erevoke']  = 'rights-editor-revoke';
