<?php
/**
 * Article Feedback extension
 *
 * @file
 * @ingroup Extensions
 *
 * @author Trevor Parscal <trevor@wikimedia.org>
 * @license GPL v2 or later
 * @version 0.1.0
 */

/* XXX: Survey setup */
require_once( dirname( dirname( __FILE__ ) ) . '/SimpleSurvey/SimpleSurvey.php' );

/* Configuration */

// How long to keep ratings in the squids (they will also be purged when needed)
$wgArticleFeedbackv5SMaxage = 2592000;

// Enable/disable dashboard page
$wgArticleFeedbackv5Dashboard = false;

// Number of revisions to keep a rating alive for
$wgArticleFeedbackv5RatingLifetime = 30;

// Which categories the pages must belong to have the rating widget added (with _ in text)
// Extension is "disabled" if this field is an empty array (as per default configuration)
$wgArticleFeedbackv5Categories = array();

// Which categories the pages must not belong to have the rating widget added (with _ in text)
$wgArticleFeedbackv5BlacklistCategories = array();

// Only load the module / enable the tool in these namespaces
// Default to $wgContentNamespaces (defaults to array( NS_MAIN ) ).
$wgArticleFeedbackv5Namespaces = $wgContentNamespaces;

// Articles not categorized as on of the values in $wgArticleFeedbackv5Categories can still have the
// tool psudo-randomly activated by applying the following odds to a lottery based on $wgArticleId.
// The value can be a floating point number (percentage) in range of 0 - 100. Tenths of a percent
// are the smallest increments used.
$wgArticleFeedbackv5LotteryOdds = 0;

// This puts the javascript into debug mode. In debug mode, you can set your
// own bucket by passing it in the url (e.g., ?bucket=1), and the showstopper
// error mode will have a useful error message, if one exists, rather than the
// default message.
$wgArticleFeedbackv5Debug = true;

// The rating categories for bucket 5 -- these MUST match the field names in the database.
$wgArticleFeedbackv5Bucket5RatingCategories = array( 'trustworthy', 'objective', 'complete', 'wellwritten' );

// The tag names and values for bucket 2 -- these MUST match the option names in the database.
$wgArticleFeedbackv5Bucket2TagNames = array( 'suggestion', 'question', 'problem', 'praise' );

// Bucket settings for display options
$wgArticleFeedbackv5DisplayBuckets = array(
	// Users can fall into one of several display buckets (these are defined in
	// modules/jquery.articlefeedbackv5/jquery.articlefeedbackv5.js).  When a
	// user arrives at the page, this config will be used by core bucketing to
	// decide which of the available form options they see.  Whenever there's
	// an update to the available buckets, change the version number to ensure
	// the new odds are applied to everyone, not just people who have yet to be
	// placed in a bucket.
	'buckets' => array(
		'1' => 34,
		'5' => 33,
		'6' => 33,
	),
	// This version number is added to all tracking event names, so that
	// changes in the software don't corrupt the data being collected. Bump
	// this when you want to start a new "experiment".
	'version' => 0,
	// Let users be tracked for a month, and then rebucket them, allowing some
	// churn.
	'expires' => 30,
	// Track the event of users being bucketed - so we can be sure the odds
	// worked out right.
	'tracked' => true
);

// Bucket settings for tracking users
$wgArticleFeedbackv5Tracking = array(
	// Not all users need to be tracked, but we do want to track some users over time - these
	// buckets are used when deciding to track someone or not, placing them in one of two buckets:
	// "ignore" or "track". When $wgArticleFeedbackv5TrackingVersion changes, users will be
	// re-bucketed, so you should always increment $wgArticleFeedbackv5TrackingVersion when changing
	// this number to ensure the new odds are applied to everyone, not just people who have yet to
	// be placed in a bucket.
	'buckets' => array(
		'one'   => 16,
		'two'   => 16,
		'three' => 16,
		'four'  => 16,
		'five'  => 16,
		'six'   => 16,
	),
	// This version number is added to all tracking event names, so that changes in the software
	// don't corrupt the data being collected. Bump this when you want to start a new "experiment".
	'version' => 0,
	// Let user's be tracked for a month, and then rebucket them, allowing some churn
	'expires' => 30,
	// Track the event of users being bucketed - so we can be sure the odds worked out right
	'tracked' => true
);

// Bucket settings for extra options in the UI
$wgArticleFeedbackv5Options = array(
	'buckets' => array(
		'show' => 100,
		'hide' => 0,
	),
	'version' => 0,
	'expires' => 30,
	'tracked' => true
);

/**
 * The full URL for a discussion page about the Article Feedback Dashboard
 *
 * Since the dashboard is powered by a SpecialPage, we cannot rel on the built-in
 * MW talk page for this, so we must expose our own page - internally or externally.
 *
 * This value will be passed into an i18n message which will parse the URL as an
 * external link using wikitext, so this must be a full URL.
 * @var string
 */
$wgArticleFeedbackv5DashboardTalkPage = "http://www.mediawiki.org/wiki/Talk:Article_feedback";

/**
 * The full URL for the "Learn to Edit" link
 *
 * @var string
 */
$wgArticleFeedbackv5LearnToEdit = "http://en.wikipedia.org/wiki/Wikipedia:Tutorial";

# TODO: What's up with the surveys, then?
// Would ordinarily call this articlefeedback but survey names are 16 chars max
$wgPrefSwitchSurveys['articlerating'] = array(
	'updatable' => false,
	'submit-msg' => 'articlefeedbackv5-survey-submit',
	'questions' => array(
		'origin' => array(
			'visibility' => 'hidden',
			'question' => 'articlefeedbackv5-survey-question-origin',
			'type' => 'text',
		),
		'whyrated' => array(
			'question' => 'articlefeedbackv5-survey-question-whyrated',
			'type' => 'checks',
			'answers' => array(
				'contribute-rating' => 'articlefeedbackv5-survey-answer-whyrated-contribute-rating',
				'development' => 'articlefeedbackv5-survey-answer-whyrated-development',
				'contribute-wiki' => 'articlefeedbackv5-survey-answer-whyrated-contribute-wiki',
				'sharing-opinion' => 'articlefeedbackv5-survey-answer-whyrated-sharing-opinion',
				'didntrate' => 'articlefeedbackv5-survey-answer-whyrated-didntrate',
			),
			'other' => 'articlefeedbackv5-survey-answer-whyrated-other',
		),
		'useful' => array(
			'question' => 'articlefeedbackv5-survey-question-useful',
			'type' => 'boolean',
			'iffalse' => 'articlefeedbackv5-survey-question-useful-iffalse',
		),
		'comments' => array(
			'question' => 'articlefeedbackv5-survey-question-comments',
			'type' => 'text',
		),
	),
);
$wgValidSurveys[] = 'articlerating';

// Replace default emailcapture message
$wgEmailCaptureAutoResponse['body-msg'] = 'articlefeedbackv5-emailcapture-response-body';

/* Setup */

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Article Feedback',
	'author' => array(
		'Greg Chiasson',
		'Reha Sterbin',
		'Sam Reed',
		'Roan Kattouw',
		'Trevor Parscal',
		'Brandon Harris',
		'Adam Miller',
		'Nimish Gautam',
		'Arthur Richards',
		'Timo Tijhof',
	),
	'version' => '0.0.1',
	'descriptionmsg' => 'articlefeedbackv5-desc',
	'url' => 'http://www.mediawiki.org/wiki/Extension:ArticleFeedbackv5'
);

// Autoloading
$dir = dirname( __FILE__ ) . '/';
$wgAutoloadClasses['ApiArticleFeedbackv5Utils']        = $dir . 'api/ApiArticleFeedbackv5Utils.php';
$wgAutoloadClasses['ApiArticleFeedbackv5']             = $dir . 'api/ApiArticleFeedbackv5.php';
$wgAutoloadClasses['ApiViewRatingsArticleFeedbackv5']  = $dir . 'api/ApiViewRatingsArticleFeedbackv5.php';
$wgAutoloadClasses['ApiViewFeedbackArticleFeedbackv5'] = $dir . 'api/ApiViewFeedbackArticleFeedbackv5.php';
$wgAutoloadClasses['ApiFlagFeedbackArticleFeedbackv5'] = $dir . 'api/ApiFlagFeedbackArticleFeedbackv5.php';
$wgAutoloadClasses['ArticleFeedbackv5Hooks']           = $dir . 'ArticleFeedbackv5.hooks.php';
$wgAutoloadClasses['SpecialArticleFeedbackv5']         = $dir . 'SpecialArticleFeedbackv5.php';
$wgExtensionMessagesFiles['ArticleFeedbackv5']         = $dir . 'ArticleFeedbackv5.i18n.php';
$wgExtensionAliasesFiles['ArticleFeedbackv5']          = $dir . 'ArticleFeedbackv5.alias.php';

// Hooks
$wgHooks['LoadExtensionSchemaUpdates'][] = 'ArticleFeedbackv5Hooks::loadExtensionSchemaUpdates';
$wgHooks['ParserTestTables'][] = 'ArticleFeedbackv5Hooks::parserTestTables';
$wgHooks['BeforePageDisplay'][] = 'ArticleFeedbackv5Hooks::beforePageDisplay';
$wgHooks['ResourceLoaderRegisterModules'][] = 'ArticleFeedbackv5Hooks::resourceLoaderRegisterModules';
$wgHooks['ResourceLoaderGetConfigVars'][] = 'ArticleFeedbackv5Hooks::resourceLoaderGetConfigVars';
$wgHooks['GetPreferences'][] = 'ArticleFeedbackv5Hooks::getPreferences';
$wgHooks['SkinTemplateNavigation'][] = 'ArticleFeedbackv5Hooks::addFeedbackLink';
$wgHooks['EditPage::showEditForm:fields'][] = 'ArticleFeedbackv5Hooks::pushTrackingFieldsToEdit';
$wgHooks['ArticleSaveComplete'][] = 'ArticleFeedbackv5Hooks::trackEdit';

// API Registration
$wgAPIListModules['articlefeedbackv5-view-ratings']  = 'ApiViewRatingsArticleFeedbackv5';
$wgAPIListModules['articlefeedbackv5-view-feedback'] = 'ApiViewFeedbackArticleFeedbackv5';
$wgAPIListModules['articlefeedbackv5-flag-feedback'] = 'ApiFlagFeedbackArticleFeedbackv5';
$wgAPIModules['articlefeedbackv5']                   = 'ApiArticleFeedbackv5';

// Special Page
$wgSpecialPages['ArticleFeedbackv5'] = 'SpecialArticleFeedbackv5';
$wgSpecialPageGroups['ArticleFeedbackv5'] = 'other';
