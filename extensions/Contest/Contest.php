<?php

/**
 * Initialization file for the Contest extension.
 *
 * Documentation:	 		https://www.mediawiki.org/wiki/Extension:Contest
 * Support					https://www.mediawiki.org/wiki/Extension_talk:Contest
 * Source code:			    http://svn.wikimedia.org/viewvc/mediawiki/trunk/extensions/Contest
 *
 * @file Contest.php
 * @ingroup Contest
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

/**
 * This documenation group collects source code files belonging to Contest.
 *
 * @defgroup Contest Contest
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

if ( version_compare( $wgVersion, '1.18', '<' ) ) {
	die( '<b>Error:</b> Contest requires MediaWiki 1.18 or above.' );
}

define( 'Contest_VERSION', '0.1 alpha' );

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Contest',
	'version' => Contest_VERSION,
	'author' => array(
		'[http://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw]',
	),
	'url' => 'http://www.mediawiki.org/wiki/Extension:Contest',
	'descriptionmsg' => 'contest-desc'
);

// i18n
$wgExtensionMessagesFiles['Contest'] 			= dirname( __FILE__ ) . '/Contest.i18n.php';
$wgExtensionMessagesFiles['ContestAlias']		= dirname( __FILE__ ) . '/Contest.alias.php';

// Autoloading
$wgAutoloadClasses['ContestHooks'] 				= dirname( __FILE__ ) . '/Contest.hooks.php';
$wgAutoloadClasses['ContestSettings'] 			= dirname( __FILE__ ) . '/Contest.settings.php';

$wgAutoloadClasses['ApiContestQuery'] 			= dirname( __FILE__ ) . '/api/ApiContestQuery.php';
$wgAutoloadClasses['ApiDeleteContest'] 			= dirname( __FILE__ ) . '/api/ApiDeleteContest.php';
$wgAutoloadClasses['ApiQueryChallenges'] 		= dirname( __FILE__ ) . '/api/ApiQueryChallenges.php';
$wgAutoloadClasses['ApiQueryContestants'] 		= dirname( __FILE__ ) . '/api/ApiQueryContestants.php';
$wgAutoloadClasses['ApiQueryContestComments'] 	= dirname( __FILE__ ) . '/api/ApiQueryContestComments.php';
$wgAutoloadClasses['ApiQueryContests'] 			= dirname( __FILE__ ) . '/api/ApiQueryContests.php';

$wgAutoloadClasses['Contest'] 					= dirname( __FILE__ ) . '/includes/Contest.class.php';
$wgAutoloadClasses['ContestantPager'] 			= dirname( __FILE__ ) . '/includes/ContestantPager.php';
$wgAutoloadClasses['ContestChallenge'] 			= dirname( __FILE__ ) . '/includes/ContestChallenge.php';
$wgAutoloadClasses['ContestComment'] 			= dirname( __FILE__ ) . '/includes/ContestComment.php';
$wgAutoloadClasses['ContestContestant'] 		= dirname( __FILE__ ) . '/includes/ContestContestant.php';
$wgAutoloadClasses['ContestDBObject'] 			= dirname( __FILE__ ) . '/includes/ContestDBObject.php';
$wgAutoloadClasses['ContestUtils'] 				= dirname( __FILE__ ) . '/includes/ContestUtils.php';
$wgAutoloadClasses['ContestVote'] 				= dirname( __FILE__ ) . '/includes/ContestVote.php';

$wgAutoloadClasses['SpecialContest'] 			= dirname( __FILE__ ) . '/specials/SpecialContest.php';
$wgAutoloadClasses['SpecialContestant'] 		= dirname( __FILE__ ) . '/specials/SpecialContestant.php';
$wgAutoloadClasses['SpecialContestPage'] 		= dirname( __FILE__ ) . '/specials/SpecialContestPage.php';
$wgAutoloadClasses['SpecialContests'] 			= dirname( __FILE__ ) . '/specials/SpecialContests.php';
$wgAutoloadClasses['SpecialContestSignup'] 		= dirname( __FILE__ ) . '/specials/SpecialContestSignup.php';
$wgAutoloadClasses['SpecialContestSubmission'] 	= dirname( __FILE__ ) . '/specials/SpecialContestSubmission.php';
$wgAutoloadClasses['SpecialContestWelcome'] 	= dirname( __FILE__ ) . '/specials/SpecialContestWelcome.php';
$wgAutoloadClasses['SpecialEditContest'] 		= dirname( __FILE__ ) . '/specials/SpecialEditContest.php';

// Special pages
$wgSpecialPages['Contest'] 						= 'SpecialContest';
$wgSpecialPages['Contestant'] 					= 'SpecialContestant';
$wgSpecialPages['Contests'] 					= 'SpecialContests';
$wgSpecialPages['ContestSignup'] 				= 'SpecialContestSignup';
$wgSpecialPages['ContestSubmission'] 			= 'SpecialContestSubmission';
$wgSpecialPages['ContestWelcome'] 				= 'SpecialContestWelcome';
$wgSpecialPages['EditContest'] 					= 'SpecialEditContest';

$wgSpecialPageGroups['Contest'] 				= 'other';
$wgSpecialPageGroups['Contestant'] 				= 'other';
$wgSpecialPageGroups['Contests'] 				= 'other';
$wgSpecialPageGroups['ContestSignup'] 			= 'other';
$wgSpecialPageGroups['ContestSubmission'] 		= 'other';
$wgSpecialPageGroups['ContestWelcome'] 			= 'other';
$wgSpecialPageGroups['EditContest'] 			= 'other';

// API
$wgAPIModules['deletecontest'] 					= 'ApiDeleteContest';
$wgAPIListModules['challenges'] 				= 'ApiQueryChallenges';
$wgAPIListModules['contestants'] 				= 'ApiQueryContestants';
$wgAPIListModules['contestcomments'] 			= 'ApiQueryContestComments';
$wgAPIListModules['contests'] 					= 'ApiQueryContests';

// Hooks
$wgHooks['LoadExtensionSchemaUpdates'][] 		= 'ContestHooks::onSchemaUpdate';
$wgHooks['UnitTestsList'][] 					= 'ContestHooks::registerUnitTests';

// Rights

$wgAvailableRights[] = 'contestadmin';
$wgAvailableRights[] = 'contestparticipant';
$wgAvailableRights[] = 'contestjudge';

# Users that can manage the contests.
$wgGroupPermissions['*'            ]['contestadmin'] = false;
$wgGroupPermissions['user'         ]['contestadmin'] = false;
$wgGroupPermissions['autoconfirmed']['contestadmin'] = false;
$wgGroupPermissions['bot'          ]['contestadmin'] = false;
$wgGroupPermissions['sysop'        ]['contestadmin'] = true;
$wgGroupPermissions['contestadmin' ]['contestadmin'] = true;

# Users that can be contest participants.
$wgGroupPermissions['*'            ]['contestparticipant'] = false;
$wgGroupPermissions['user'         ]['contestparticipant'] = true;
$wgGroupPermissions['autoconfirmed']['contestparticipant'] = true;
$wgGroupPermissions['bot'          ]['contestparticipant'] = false;
$wgGroupPermissions['sysop'        ]['contestparticipant'] = true;
$wgGroupPermissions['contestparticipant']['contestparticipant'] = true;

# Users that can vote and comment on submissions.
$wgGroupPermissions['*'            ]['contestjudge'] = false;
$wgGroupPermissions['user'         ]['contestjudge'] = false;
$wgGroupPermissions['autoconfirmed']['contestjudge'] = false;
$wgGroupPermissions['bot'          ]['contestjudge'] = false;
$wgGroupPermissions['sysop'        ]['contestjudge'] = true;
$wgGroupPermissions['contestjudge' ]['contestjudge'] = true;


// Resource loader modules
$moduleTemplate = array(
	'localBasePath' => dirname( __FILE__ ) . '/resources',
	'remoteExtPath' => 'Contest/resources'
);

$wgResourceModules['contest.special.contests'] = $moduleTemplate + array(
	'scripts' => array(
		'contest.special.contests.js'
	),
	'messages' => array(
		'contest-special-confirm-delete',
		'contest-special-delete-failed',
	)
);

$wgResourceModules['contest.special.editcontest'] = $moduleTemplate + array(
	'scripts' => array(
		'contest.special.editcontest.js'
	),
	'messages' => array(
		'contest-edit-delete',
		'contest-edit-add-first',
		'contest-edit-add-another',
		'contest-edit-confirm-delete',
		'contest-edit-challenge-title',
		'contest-edit-challenge-text',
		'contest-edit-challenge-oneline',
	),
	'dependencies' => array(
		'jquery.ui.button'
	)
);

$wgResourceModules['contest.special.welcome'] = $moduleTemplate + array(
	'scripts' => array(
		'contest.special.welcome.js',
		'jquery.contestChallanges.js'
	),
	'styles' => array(
		'contest.special.welcome.css',
	),
	'dependencies' => array(
		'jquery.ui.button'
	),
	'messages' => array(
		'contest-welcome-select-header'
	)
);

$wgResourceModules['contest.special.signup'] = $moduleTemplate + array(
	'scripts' => array(
		'contest.special.signup.js',
	),
	'dependencies' => array(
		'jquery.ui.button'
	)
);

$wgResourceModules['contest.special.submission'] = $moduleTemplate + array(
	'scripts' => array(
		'contest.special.submission.js',
	),
	'dependencies' => array(
		'jquery.ui.button'
	)
);

$wgResourceModules['contest.contestant.pager'] = $moduleTemplate + array(
	'scripts' => array(
		'contest.contestant.pager.js',
	),
	'styles' => array(
		'contest.contestant.pager.css',
	),
);

$wgResourceModules['contest.special.contestant'] = $moduleTemplate + array(
	'styles' => array(
		'contest.special.contestant.css',
	),
);

unset( $moduleTemplate );

$egContestSettings = array();
