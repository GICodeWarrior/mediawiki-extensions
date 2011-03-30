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

// Number of revisions to keep a rating alive for
$wgArticleFeedbackRatingLifetime = 30;

// Array of the "ratings" id's to store. Allows it to be a bit more dynamic
$wgArticleFeedbackRatings = array( 1, 2, 3, 4 );

// Which categories the pages must belong to have the rating widget added (with _ in text)
// Extension is "disabled" if this field is an empty array (as per default configuration)
$wgArticleFeedbackCategories = array();

// Articles not categorized as on of the values in $wgArticleFeedbackCategories can still have the
// tool psudo-randomly activated by applying the following odds to a lottery based on $wgArticleId.
// The value can be a floating point number (percentage) in range of 0 - 100. Tenths of a percent
// are the smallest increments used.
$wgArticleFeedbackLotteryOdds = 0;

// This version number is added to all tracking event names, so that changes in the software don't
// corrupt the data being collected. Bump this when you want to start a new "experiment".
$wgArticleFeedbackTrackingVersion = 0;

// Would ordinarily call this articlefeedback but survey names are 16 chars max
$wgPrefSwitchSurveys['articlerating'] = array(
	'updatable' => false,
	'submit-msg' => 'articlefeedback-survey-submit',
	'questions' => array(
		'whyrated' => array(
			'question' => 'articlefeedback-survey-question-whyrated',
			'type' => 'checks',
			'answers' => array(
				'contribute-rating' => 'articlefeedback-survey-answer-whyrated-contribute-rating',
				'development' => 'articlefeedback-survey-answer-whyrated-development',
				'contribute-wiki' => 'articlefeedback-survey-answer-whyrated-contribute-wiki',
				'sharing-opinion' => 'articlefeedback-survey-answer-whyrated-sharing-opinion',
				'didntrate' => 'articlefeedback-survey-answer-whyrated-didntrate',
			),
			'other' => 'articlefeedback-survey-answer-whyrated-other',
		),
		'useful' => array(
			'question' => 'articlefeedback-survey-question-useful',
			'type' => 'boolean',
			'iffalse' => 'articlefeedback-survey-question-useful-iffalse',
		),
		'comments' => array(
			'question' => 'articlefeedback-survey-question-comments',
			'type' => 'text',
		),
	),
);
$wgValidSurveys[] = 'articlerating';

/* Setup */

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Article Feedback',
	'author' => array(
		'Sam Reed',
		'Roan Kattouw',
		'Trevor Parscal',
		'Brandon Harris',
		'Adam Miller',
		'Nimish Gautam',
	),
	'version' => '0.2.0',
	'descriptionmsg' => 'articlefeedback-desc',
	'url' => 'http://www.mediawiki.org/wiki/Extension:ArticleFeedback'
);
// Autoloading
$dir = dirname( __FILE__ ) . '/';
$wgAutoloadClasses['ApiQueryArticleFeedback'] = $dir . 'api/ApiQueryArticleFeedback.php';
$wgAutoloadClasses['ApiArticleFeedback'] = $dir . 'api/ApiArticleFeedback.php';
$wgAutoloadClasses['ArticleFeedbackHooks'] = $dir . 'ArticleFeedback.hooks.php';
$wgExtensionMessagesFiles['ArticleFeedback'] = $dir . 'ArticleFeedback.i18n.php';
// Hooks
$wgHooks['LoadExtensionSchemaUpdates'][] = 'ArticleFeedbackHooks::loadExtensionSchemaUpdates';
$wgHooks['ParserTestTables'][] = 'ArticleFeedbackHooks::parserTestTables';
$wgHooks['BeforePageDisplay'][] = 'ArticleFeedbackHooks::beforePageDisplay';
$wgHooks['ResourceLoaderRegisterModules'][] = 'ArticleFeedbackHooks::resourceLoaderRegisterModules';
$wgHooks['ResourceLoaderGetConfigVars'][] = 'ArticleFeedbackHooks::resourceLoaderGetConfigVars';
// API Registration
$wgAPIListModules['articlefeedback'] = 'ApiQueryArticleFeedback';
$wgAPIModules['articlefeedback'] = 'ApiArticleFeedback';
