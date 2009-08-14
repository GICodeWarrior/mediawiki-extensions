<?php

if ( !defined( 'MEDIAWIKI' ) )
	die();

$wgExtensionCredits['other'][] = array(
	'path'           => __FILE__,
	'name'           => 'Liquid Threads',
	'version'        => '2.0-alpha',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:LiquidThreads',
	'author'         => array( 'David McCabe', 'Andrew Garrett' ),
	'description'    => 'Add threading discussions to talk pages',
	'descriptionmsg' => 'lqt-desc',
);

require( 'LqtFunctions.php' );

define( 'NS_LQT_THREAD', efArrayDefault( 'egLqtNamespaceNumbers', 'Thread', 90 ) );
define( 'NS_LQT_THREAD_TALK', efArrayDefault( 'egLqtNamespaceNumbers', 'Thread_talk', 91 ) );
define( 'NS_LQT_SUMMARY', efArrayDefault( 'egLqtNamespaceNumbers', 'Summary', 92 ) );
define( 'NS_LQT_SUMMARY_TALK', efArrayDefault( 'egLqtNamespaceNumbers', 'Summary_talk', 93 ) );
define( 'LQT_NEWEST_CHANGES', 'nc' );
define( 'LQT_NEWEST_THREADS', 'nt' );
define( 'LQT_OLDEST_THREADS', 'ot' );

// FIXME: would be neat if it was possible to somehow localise this.
$wgCanonicalNamespaceNames[NS_LQT_THREAD]		= 'Thread';
$wgCanonicalNamespaceNames[NS_LQT_THREAD_TALK]	= 'Thread_talk';
$wgCanonicalNamespaceNames[NS_LQT_SUMMARY]		= 'Summary';
$wgCanonicalNamespaceNames[NS_LQT_SUMMARY_TALK]	= 'Summary_talk';

// FIXME: would be neat if it was possible to somehow localise this.
$wgExtraNamespaces[NS_LQT_THREAD]	= 'Thread';
$wgExtraNamespaces[NS_LQT_THREAD_TALK] = 'Thread_talk';
$wgExtraNamespaces[NS_LQT_SUMMARY] = 'Summary';
$wgExtraNamespaces[NS_LQT_SUMMARY_TALK] = 'Summary_talk';

// Localisation
$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['LiquidThreads'] = $dir . 'i18n/Lqt.i18n.php';
$wgExtensionAliasesFiles['LiquidThreads'] = $dir . 'i18n/Lqt.alias.php';

// Parser Function Setup
if ( defined( 'MW_SUPPORTS_PARSERFIRSTCALLINIT' ) ) {
	$wgHooks['ParserFirstCallInit'][] = 'lqtSetupParserFunctions';
} else {
	$wgExtensionFunctions[] = 'lqtSetupParserFunctions';
}

// Hooks
// Main dispatch hook
$wgHooks['MediaWikiPerformAction'][] = 'LqtDispatch::tryPage';

// Miscellaneous
$wgHooks['SpecialMovepageAfterMove'][] = 'LqtHooks::onPageMove'; // Move threads to new loc
// Customisation of recentchanges
$wgHooks['OldChangesListRecentChangesLine'][] = 'LqtHooks::customizeOldChangesList';

// Notification (watchlist, newtalk)
$wgHooks['SkinTemplateOutputPageBeforeExec'][] = 'LqtHooks::setNewtalkHTML';
$wgHooks['SpecialWatchlistQuery'][] = 'LqtHooks::beforeWatchlist';
$wgHooks['ArticleEditUpdateNewTalk'][] = 'LqtHooks::updateNewtalkOnEdit';

// Preferences
$wgHooks['GetPreferences'][] = 'LqtHooks::getPreferences';

// Export-related
$wgHooks['XmlDumpWriterOpenPage'][] = 'LqtHooks::dumpThreadData';
$wgHooks['ModifyExportQuery'][] = 'LqtHooks::modifyExportQuery';

// Deletion
$wgHooks['ArticleDeleteComplete'][] = 'LqtDeletionController::onArticleDeleteComplete';
$wgHooks['ArticleRevisionUndeleted'][] = 'LqtDeletionController::onArticleRevisionUndeleted';
$wgHooks['ArticleUndelete'][] = 'LqtDeletionController::onArticleUndelete';
$wgHooks['ArticleDelete'][] = 'LqtDeletionController::onArticleDelete';

// Search
$wgHooks['ShowSearchHitTitle'][] = 'LqtHooks::customiseSearchResultTitle';

// Special pages
$wgSpecialPages['MoveThread'] = 'SpecialMoveThread';
$wgSpecialPages['NewMessages'] = 'SpecialNewMessages';
$wgSpecialPages['SplitThread'] = 'SpecialSplitThread';
$wgSpecialPages['MergeThread'] = 'SpecialMergeThread';
$wgSpecialPageGroups['NewMessages'] = 'wiki';

// Classes
$wgAutoloadClasses['LqtDispatch'] = $dir . 'classes/Dispatch.php';
$wgAutoloadClasses['LqtView'] = $dir . 'classes/View.php';
$wgAutoloadClasses['HistoricalThread'] = $dir . 'classes/HistoricalThread.php';
$wgAutoloadClasses['Thread'] = $dir . 'classes/Thread.php';
$wgAutoloadClasses['Threads'] = $dir . 'classes/Threads.php';
$wgAutoloadClasses['NewMessages'] = $dir . 'classes/NewMessagesController.php';
$wgAutoloadClasses['LiquidThreadsMagicWords'] = $dir . 'i18n/LiquidThreads.magic.php';
$wgAutoloadClasses['LqtParserFunctions'] = $dir . 'classes/ParserFunctions.php';
$wgAutoloadClasses['LqtDeletionController'] = $dir . 'classes/DeletionController.php';
$wgAutoloadClasses['LqtHooks'] = $dir . 'classes/Hooks.php';
$wgAutoloadClasses['ThreadRevision'] = $dir."/classes/ThreadRevision.php";

// View classes
$wgAutoloadClasses['TalkpageView'] = $dir . 'pages/TalkpageView.php';
$wgAutoloadClasses['ThreadPermalinkView'] = $dir . 'pages/ThreadPermalinkView.php';
$wgAutoloadClasses['TalkpageHeaderView'] = $dir . 'pages/TalkpageHeaderView.php';
$wgAutoloadClasses['IndividualThreadHistoryView'] = $dir . 'pages/IndividualThreadHistoryView.php';
$wgAutoloadClasses['ThreadDiffView'] = $dir . 'pages/ThreadDiffView.php';
$wgAutoloadClasses['ThreadWatchView'] = $dir . 'pages/ThreadWatchView.php';
$wgAutoloadClasses['ThreadProtectionFormView'] = $dir . 'pages/ThreadProtectionFormView.php';
$wgAutoloadClasses['ThreadHistoryListingView'] = $dir . 'pages/ThreadHistoryListingView.php';
$wgAutoloadClasses['ThreadHistoricalRevisionView'] = $dir . 'pages/ThreadHistoricalRevisionView.php';
$wgAutoloadClasses['SummaryPageView'] = $dir . 'pages/SummaryPageView.php';
$wgAutoloadClasses['NewUserMessagesView'] = $dir . 'pages/NewUserMessagesView.php';

// Special pages
$wgAutoloadClasses['ThreadActionPage'] = "$dir/pages/ThreadActionPage.php";
$wgAutoloadClasses['SpecialMoveThread'] = $dir . 'pages/SpecialMoveThread.php';
$wgAutoloadClasses['SpecialNewMessages'] = $dir . 'pages/SpecialNewMessages.php';
$wgAutoloadClasses['SpecialSplitThread'] = "$dir/pages/SpecialSplitThread.php";
$wgAutoloadClasses['SpecialMergeThread'] = "$dir/pages/SpecialMergeThread.php";

// Backwards-compatibility
$wgAutoloadClasses['Article_LQT_Compat'] = $dir . 'compat/LqtCompatArticle.php';
if ( version_compare( $wgVersion, '1.16', '<' ) ) {
	$wgAutoloadClasses['HTMLForm'] = "$dir/compat/HTMLForm.php";
	$wgExtensionMessagesFiles['Lqt-Compat'] = "$dir/compat/Lqt-compat.i18n.php";
}

// Logging
$wgLogTypes[] = 'liquidthreads';
$wgLogNames['liquidthreads']          = 'lqt-log-name';
$wgLogHeaders['liquidthreads']        = 'lqt-log-header';
$wgLogActionsHandlers['liquidthreads/move'] = 'lqtFormatMoveLogEntry';

// Preferences
$wgDefaultUserOptions['lqtnotifytalk'] = true;

/** CONFIGURATION SECTION */

$wgDefaultUserOptions['lqt-watch-threads'] = true;

$wgGroupPermissions['user']['lqt-split'] = true;
$wgGroupPermissions['user']['lqt-merge'] = true;

$wgAvailableRights[] = 'lqt-split';
$wgAvailableRights[] = 'lqt-merge';

/* Number of days a thread needs to have existed to be considered for summarizing and archival */
$wgLqtThreadArchiveStartDays = 14;

/* Number of days a thread needs to be inactive to be considered for summarizing and archival */
$wgLqtThreadArchiveInactiveDays = 5;

/* Allows activation of LiquidThreads on individual pages */
$wgLqtPages = array();

/* Allows switching LiquidThreads off for regular talk pages
	(intended for testing and transition) */
$wgLqtTalkPages = true;

/* Whether or not to activate LiquidThreads email notifications */
$wgLqtEnotif = true;
