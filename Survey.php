<?php

/**
 * Initialization file for the Survey extension.
 *
 * Documentation:	 		http://www.mediawiki.org/wiki/Extension:Survey
 * Support					http://www.mediawiki.org/wiki/Extension_talk:Survey
 * Source code:			    http://svn.wikimedia.org/viewvc/mediawiki/trunk/extensions/Survey
 *
 * @file Survey.php
 * @ingroup Survey
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

/**
 * This documenation group collects source code files belonging to Survey.
 *
 * @defgroup Survey Survey
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

if ( version_compare( $wgVersion, '1.17', '<' ) ) {
	die( '<b>Error:</b> Survey requires MediaWiki 1.17 or above.' );
}

define( 'Survey_VERSION', '0.1 alpha' );

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Survey',
	'version' => Survey_VERSION,
	'author' => array(
		'[http://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw]',
	),
	'url' => 'http://www.mediawiki.org/wiki/Extension:Survey',
	'descriptionmsg' => 'survey-desc'
);

$wgExtensionMessagesFiles['Survey'] 		= dirname( __FILE__ ) . '/Survey.i18n.php';
$wgExtensionMessagesFiles['SurveyAlias']	= dirname( __FILE__ ) . '/Survey.alias.php';

$wgAutoloadClasses['SurveyHooks'] 			= dirname( __FILE__ ) . '/Survey.hooks.php';
$wgAutoloadClasses['SurveySettings'] 		= dirname( __FILE__ ) . '/Survey.settings.php';

$wgAutoloadClasses['ApiAddSurvey'] 			= dirname( __FILE__ ) . '/api/ApiAddSurvey.php';
$wgAutoloadClasses['ApiDeleteSurvey'] 		= dirname( __FILE__ ) . '/api/ApiDeleteSurvey.php';
$wgAutoloadClasses['ApiEditSurvey'] 		= dirname( __FILE__ ) . '/api/ApiEditSurvey.php';
$wgAutoloadClasses['ApiQuerySurveys'] 		= dirname( __FILE__ ) . '/api/ApiQuerySurveys.php';
$wgAutoloadClasses['ApiSubmitSurvey'] 		= dirname( __FILE__ ) . '/api/ApiSubmitSurvey.php';

$wgAutoloadClasses['Survey'] 				= dirname( __FILE__ ) . '/includes/Survey.class.php';
$wgAutoloadClasses['SurveyAnswer']	 		= dirname( __FILE__ ) . '/includes/SurveyAnswer.php';
$wgAutoloadClasses['SurveyCompat']	 		= dirname( __FILE__ ) . '/includes/SurveyCompat.php';
$wgAutoloadClasses['SurveyDBClass']	 		= dirname( __FILE__ ) . '/includes/SurveyDBClass.php';
$wgAutoloadClasses['SurveyQuestion'] 		= dirname( __FILE__ ) . '/includes/SurveyQuestion.php';
$wgAutoloadClasses['SurveySubmission'] 		= dirname( __FILE__ ) . '/includes/SurveySubmission.php';
$wgAutoloadClasses['SurveyTag'] 			= dirname( __FILE__ ) . '/includes/SurveyTag.php';

$wgAutoloadClasses['SpecialSurvey'] 		= dirname( __FILE__ ) . '/specials/SpecialSurvey.php';
$wgAutoloadClasses['SpecialSurveyPage'] 	= dirname( __FILE__ ) . '/specials/SpecialSurveyPage.php';
$wgAutoloadClasses['SpecialSurveys'] 		= dirname( __FILE__ ) . '/specials/SpecialSurveys.php';
$wgAutoloadClasses['SpecialSurveyStats'] 	= dirname( __FILE__ ) . '/specials/SpecialSurveyStats.php';
$wgAutoloadClasses['SpecialTakeSurvey'] 	= dirname( __FILE__ ) . '/specials/SpecialTakeSurvey.php';

$wgSpecialPages['Survey'] 					= 'SpecialSurvey';
$wgSpecialPages['Surveys'] 					= 'SpecialSurveys';
$wgSpecialPages['SurveyStats'] 				= 'SpecialSurveyStats';
$wgSpecialPages['TakeSurvey'] 				= 'SpecialTakeSurvey';

$wgSpecialPageGroups['Survey'] 				= 'other';
$wgSpecialPageGroups['Surveys'] 			= 'other';
$wgSpecialPageGroups['SurveyStats'] 		= 'other';
$wgSpecialPageGroups['TakeSurvey'] 			= 'other';

$wgAPIModules['addsurvey'] 					= 'ApiAddSurvey';
$wgAPIModules['deletesurvey'] 				= 'ApiDeleteSurvey';
$wgAPIModules['editsurvey'] 				= 'ApiEditSurvey';
$wgAPIModules['submitsurvey'] 				= 'ApiSubmitSurvey';
$wgAPIListModules['surveys'] 				= 'ApiQuerySurveys';

$wgHooks['LoadExtensionSchemaUpdates'][] 	= 'SurveyHooks::onSchemaUpdate';
$wgHooks['UnitTestsList'][] 				= 'SurveyHooks::registerUnitTests';
$wgHooks['ParserFirstCallInit'][] 			= 'SurveyHooks::onParserFirstCallInit';

$wgAvailableRights[] = 'surveyadmin';
$wgAvailableRights[] = 'surveysubmit';

# Users that can manage the surveys.
$wgGroupPermissions['*'            ]['surveyadmin'] = false;
$wgGroupPermissions['user'         ]['surveyadmin'] = false;
$wgGroupPermissions['autoconfirmed']['surveyadmin'] = false;
$wgGroupPermissions['bot'          ]['surveyadmin'] = false;
$wgGroupPermissions['sysop'        ]['surveyadmin'] = true;

# Users that can submit surveys.
$wgGroupPermissions['*'            ]['surveysubmit'] = true;
$wgGroupPermissions['user'         ]['surveysubmit'] = true;
$wgGroupPermissions['autoconfirmed']['surveysubmit'] = true;
$wgGroupPermissions['bot'          ]['surveysubmit'] = false;
$wgGroupPermissions['sysop'        ]['surveysubmit'] = true;

$moduleTemplate = array(
	'localBasePath' => dirname( __FILE__ ),
	'remoteBasePath' => ( $wgExtensionAssetsPath === false ? $wgScriptPath . '/extensions' : $wgExtensionAssetsPath )
						. '/Survey/resources'
);

$wgResourceModules['ext.survey'] = $moduleTemplate + array(
	'scripts' => array(
		'ext.survey.js'
	),
);

$wgResourceModules['ext.survey.special.surveys'] = $moduleTemplate + array(
	'scripts' => array(
		'ext.survey.special.surveys.js'
	),
	'dependencies' => array( 'ext.survey' ),
	'messages' => array(
		'surveys-special-confirm-delete'
	)
);

$wgResourceModules['ext.survey.special.survey'] = $moduleTemplate + array(
	'scripts' => array(
		'ext.survey.special.survey.js'
	),
	'dependencies' => array( 'ext.survey', 'jquery.ui.button' ),
	'messages' => array(
		'survey-question-type-text',
		'survey-question-type-number',
		'survey-question-type-select',
		'survey-question-type-radio',
		'survey-question-label-nr'
	)
);

$wgResourceModules['ext.survey.jquery'] = $moduleTemplate + array(
	'scripts' => array(
		'fancybox/jquery.fancybox-1.3.4.js',
		'jquery.survey.js'
	),
	'styles' => array(
		'fancybox/jquery.fancybox-1.3.4.css',
	),
	'dependencies' => array( 'ext.survey' ),
	'messages' => array(
	
	)
);

unset( $moduleTemplate );

$egSurveySettings = array();
