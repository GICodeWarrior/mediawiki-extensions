<?php

/**
 * Initialization file for the Education Program extension.
 *
 * Documentation:	 		https://www.mediawiki.org/wiki/Extension:Education_Program
 * Support					https://www.mediawiki.org/wiki/Extension_talk:Education_Program
 * Source code:			    http://svn.wikimedia.org/viewvc/mediawiki/trunk/extensions/EducationProgram
 *
 * The source code makes use of a number of terms different from but corresponding to those in the UI:
 * * Org instead of Institution
 * * Mentor instead of Ambassador
 *
 * @file EducationProgram.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

/**
 * This documentation group collects source code files belonging to Education Program.
 *
 * @defgroup EducationProgram Education Program
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

if ( version_compare( $wgVersion, '1.18c', '<' ) ) { // Needs to be 1.18c because version_compare() works in confusing ways.
	die( '<b>Error:</b> Education Program requires MediaWiki 1.18 or above.' );
}

if ( !array_key_exists( 'CountryNames', $wgAutoloadClasses ) ) { // No version constant to check against :/
	die( '<b>Error:</b> Education Program depends on the <a href="https://www.mediawiki.org/wiki/Extension:CLDR">CLDR</a> extension.' );
}

define( 'EP_VERSION', '0.1 alpha' );

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Education Program',
	'version' => EP_VERSION,
	'author' => array(
		'[http://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw]',
	),
	'url' => 'https://www.mediawiki.org/wiki/Extension:Education_Program',
	'descriptionmsg' => 'educationprogram-desc'
);

// i18n
$wgExtensionMessagesFiles['EducationProgram'] 		= dirname( __FILE__ ) . '/EducationProgram.i18n.php';
$wgExtensionMessagesFiles['EducationProgramAlias']	= dirname( __FILE__ ) . '/EducationProgram.i18n.alias.php';

// Autoloading
$wgAutoloadClasses['EPHooks'] 						= dirname( __FILE__ ) . '/EducationProgram.hooks.php';
$wgAutoloadClasses['EPSettings'] 					= dirname( __FILE__ ) . '/EducationProgram.settings.php';

$wgAutoloadClasses['ApiDeleteEducation'] 			= dirname( __FILE__ ) . '/api/ApiDeleteEducation.php';
$wgAutoloadClasses['ApiRefreshEducation'] 			= dirname( __FILE__ ) . '/api/ApiRefreshEducation.php';

$wgAutoloadClasses['EPCourse'] 						= dirname( __FILE__ ) . '/includes/EPCourse.php';
$wgAutoloadClasses['EPCoursePager'] 				= dirname( __FILE__ ) . '/includes/EPCoursePager.php';
$wgAutoloadClasses['EPDBObject'] 					= dirname( __FILE__ ) . '/includes/EPDBObject.php';
$wgAutoloadClasses['EPMentor'] 						= dirname( __FILE__ ) . '/includes/EPMentor.php';
$wgAutoloadClasses['EPMentorPager'] 				= dirname( __FILE__ ) . '/includes/EPMentorPager.php';
$wgAutoloadClasses['EPOrg'] 						= dirname( __FILE__ ) . '/includes/EPOrg.php';
$wgAutoloadClasses['EPOrgPager'] 					= dirname( __FILE__ ) . '/includes/EPOrgPager.php';
$wgAutoloadClasses['EPPager'] 						= dirname( __FILE__ ) . '/includes/EPPager.php';
$wgAutoloadClasses['EPStudent'] 					= dirname( __FILE__ ) . '/includes/EPStudent.php';
$wgAutoloadClasses['EPStudentPager'] 				= dirname( __FILE__ ) . '/includes/EPStudentPager.php';
$wgAutoloadClasses['EPTerm'] 						= dirname( __FILE__ ) . '/includes/EPTerm.php';
$wgAutoloadClasses['EPTermPager'] 					= dirname( __FILE__ ) . '/includes/EPTermPager.php';

$wgAutoloadClasses['SpecialCourse'] 				= dirname( __FILE__ ) . '/specials/SpecialCourse.php';
$wgAutoloadClasses['SpecialCourses'] 				= dirname( __FILE__ ) . '/specials/SpecialCourses.php';
$wgAutoloadClasses['SpecialEditCourse'] 			= dirname( __FILE__ ) . '/specials/SpecialEditCourse.php';
$wgAutoloadClasses['SpecialEditInstitution'] 		= dirname( __FILE__ ) . '/specials/SpecialEditInstitution.php';
$wgAutoloadClasses['SpecialEditTerm'] 				= dirname( __FILE__ ) . '/specials/SpecialEditTerm.php';
$wgAutoloadClasses['SpecialEducationProgram'] 		= dirname( __FILE__ ) . '/specials/SpecialEducationProgram.php';
$wgAutoloadClasses['SpecialEPFormPage'] 			= dirname( __FILE__ ) . '/specials/SpecialEPFormPage.php';
$wgAutoloadClasses['SpecialEPPage'] 				= dirname( __FILE__ ) . '/specials/SpecialEPPage.php';
$wgAutoloadClasses['SpecialInstitution'] 			= dirname( __FILE__ ) . '/specials/SpecialInstitution.php';
$wgAutoloadClasses['SpecialInstitutions'] 			= dirname( __FILE__ ) . '/specials/SpecialInstitutions.php';
$wgAutoloadClasses['SpecialMyCourses'] 				= dirname( __FILE__ ) . '/specials/SpecialMyCourses.php';
$wgAutoloadClasses['SpecialStudent'] 				= dirname( __FILE__ ) . '/specials/SpecialStudent.php';
$wgAutoloadClasses['SpecialStudents'] 				= dirname( __FILE__ ) . '/specials/SpecialStudents.php';
$wgAutoloadClasses['SpecialTerm'] 					= dirname( __FILE__ ) . '/specials/SpecialTerm.php';
$wgAutoloadClasses['SpecialTerms'] 					= dirname( __FILE__ ) . '/specials/SpecialTerms.php';
$wgAutoloadClasses['SpecialEnroll'] 				= dirname( __FILE__ ) . '/specials/SpecialEnroll.php';
$wgAutoloadClasses['SpecialAmbassadors'] 			= dirname( __FILE__ ) . '/specials/SpecialAmbassadors.php';
$wgAutoloadClasses['SpecialAmbassador'] 			= dirname( __FILE__ ) . '/specials/SpecialAmbassador.php';

// Special pages
$wgSpecialPages['MyCourses'] 						= 'SpecialMyCourses';
$wgSpecialPages['Institution'] 						= 'SpecialInstitution';
$wgSpecialPages['Institutions'] 					= 'SpecialInstitutions';
$wgSpecialPages['Student'] 							= 'SpecialStudent';
$wgSpecialPages['Students'] 						= 'SpecialStudents';
$wgSpecialPages['Course'] 							= 'SpecialCourse';
$wgSpecialPages['Courses'] 							= 'SpecialCourses';
$wgSpecialPages['Term'] 							= 'SpecialTerm';
$wgSpecialPages['Terms'] 							= 'SpecialTerms';
$wgSpecialPages['EducationProgram'] 				= 'SpecialEducationProgram';
$wgSpecialPages['EditCourse'] 						= 'SpecialEditCourse';
$wgSpecialPages['EditInstitution'] 					= 'SpecialEditInstitution';
$wgSpecialPages['EditTerm'] 						= 'SpecialEditTerm';
$wgSpecialPages['Enroll'] 	    					= 'SpecialEnroll';
$wgSpecialPages['Ambassadors'] 	    				= 'SpecialAmbassadors';
$wgSpecialPages['Ambassador'] 	    				= 'SpecialAmbassador';

$wgSpecialPageGroups['MyCourses'] 					= 'education';
$wgSpecialPageGroups['Institution'] 				= 'education';
$wgSpecialPageGroups['Institutions'] 				= 'education';
$wgSpecialPageGroups['Student'] 					= 'education';
$wgSpecialPageGroups['Students'] 					= 'education';
$wgSpecialPageGroups['Course'] 						= 'education';
$wgSpecialPageGroups['Courses'] 					= 'education';
$wgSpecialPageGroups['Term'] 						= 'education';
$wgSpecialPageGroups['Terms'] 						= 'education';
$wgSpecialPageGroups['EducationProgram'] 			= 'education';
$wgSpecialPageGroups['EditCourse'] 					= 'education';
$wgSpecialPageGroups['EditInstitution'] 			= 'education';
$wgSpecialPageGroups['EditTerm'] 					= 'education';
$wgSpecialPageGroups['Ambassadors'] 				= 'education';
$wgSpecialPageGroups['Ambassador'] 					= 'education';

// DB object classes
$egEPDBObjects = array();
$egEPDBObjects['EPOrg'] = array( 'table' => 'ep_orgs', 'prefix' => 'org_' );
$egEPDBObjects['EPCourse'] = array( 'table' => 'ep_courses', 'prefix' => 'course_' );
$egEPDBObjects['EPTerm'] = array( 'table' => 'ep_terms', 'prefix' => 'term_' );
$egEPDBObjects['EPMentor'] = array( 'table' => 'ep_mentors', 'prefix' => 'mentor_' );
$egEPDBObjects['EPStudent'] = array( 'table' => 'ep_students', 'prefix' => 'student_' );
$egEPDBObjects[] = array( 'table' => 'ep_students_per_term', 'prefix' => 'spt_' );
$egEPDBObjects[] = array( 'table' => 'ep_mentors_per_org', 'prefix' => 'mpo_' );

// API
$wgAPIModules['deleteeducation'] 				= 'ApiDeleteEducation';
$wgAPIModules['refresheducation'] 				= 'ApiRefreshEducation';

// Hooks
$wgHooks['LoadExtensionSchemaUpdates'][] 		= 'EPHooks::onSchemaUpdate';
$wgHooks['UnitTestsList'][] 					= 'EPHooks::registerUnitTests';
$wgHooks['PersonalUrls'][] 						= 'EPHooks::onPersonalUrls';
$wgHooks['GetPreferences'][] 					= 'EPHooks::onGetPreferences';

$wgLogTypes[] = 'institution';
$wgLogTypes[] = 'course';
$wgLogTypes[] = 'term';
$wgLogTypes[] = 'student';
$wgLogTypes[] = 'ambassador';
$wgLogTypes[] = 'instructor';

$wgLogActionsHandlers['institution/*'] = 'LogFormatter';
$wgLogActionsHandlers['course/*'] = 'LogFormatter';
$wgLogActionsHandlers['term/*'] = 'LogFormatter';
$wgLogActionsHandlers['student/*'] = 'LogFormatter';
$wgLogActionsHandlers['ambassador/*'] = 'LogFormatter';
$wgLogActionsHandlers['instructor/*'] = 'LogFormatter';

$wgAvailableRights[] = 'ep-org'; 		// Manage orgs
$wgAvailableRights[] = 'ep-course';		// Manage courses
$wgAvailableRights[] = 'ep-term';		// Manage terms
$wgAvailableRights[] = 'ep-token';		// See enrollment tokens
$wgAvailableRights[] = 'ep-enroll';		// Enroll as a student
$wgAvailableRights[] = 'ep-remstudent';	// Dissasociate students from terms

$wgGroupPermissions['*']['ep-org'] = false;
$wgGroupPermissions['*']['ep-course'] = false;
$wgGroupPermissions['*']['ep-term'] = false;
$wgGroupPermissions['*']['ep-token'] = false;
$wgGroupPermissions['*']['ep-remstudent'] = false;
$wgGroupPermissions['*']['ep-enroll'] = true;

$wgGroupPermissions['epstaff']['ep-org'] = true;
$wgGroupPermissions['epstaff']['ep-course'] = true;
$wgGroupPermissions['epstaff']['ep-term'] = true;
$wgGroupPermissions['epstaff']['ep-token'] = true;
$wgGroupPermissions['epstaff']['ep-enroll'] = true;
$wgGroupPermissions['epstaff']['ep-remstudent'] = true;

$wgGroupPermissions['epadmin']['ep-org'] = true;
$wgGroupPermissions['epadmin']['ep-course'] = true;
$wgGroupPermissions['epadmin']['ep-term'] = true;
$wgGroupPermissions['epadmin']['ep-token'] = true;
$wgGroupPermissions['epadmin']['ep-enroll'] = true;
$wgGroupPermissions['epadmin']['ep-remstudent'] = true;

$wgGroupPermissions['eponlineamb']['ep-org'] = true;
$wgGroupPermissions['eponlineamb']['ep-course'] = true;
$wgGroupPermissions['eponlineamb']['ep-term'] = true;
$wgGroupPermissions['eponlineamb']['ep-token'] = true;

$wgGroupPermissions['epcampamb']['ep-org'] = true;
$wgGroupPermissions['epcampamb']['ep-course'] = true;
$wgGroupPermissions['epcampamb']['ep-term'] = true;
$wgGroupPermissions['epcampamb']['ep-token'] = true;

$wgGroupPermissions['epinstructor']['ep-org'] = true;
$wgGroupPermissions['epinstructor']['ep-course'] = true;
$wgGroupPermissions['epinstructor']['ep-term'] = true;
$wgGroupPermissions['epinstructor']['ep-token'] = true;
$wgGroupPermissions['epinstructor']['ep-remstudent'] = true;

$wgGroupPermissions['epstaff']['userrights'] = false;
$wgAddGroups['epstaff'] = array( 'epstaff', 'epadmin', 'eponlineamb', 'epcampamb', 'epinstructor' );
$wgRemoveGroups['epstaff'] = array( 'epstaff', 'epadmin', 'eponlineamb', 'epcampamb', 'epinstructor' );

$wgGroupPermissions['epadmin']['userrights'] = false;
$wgAddGroups['epadmin'] = array( 'eponlineamb', 'epcampamb', 'epinstructor' );
$wgRemoveGroups['epadmin'] = array( 'eponlineamb', 'epcampamb', 'epinstructor' );

// Resource loader modules
$moduleTemplate = array(
	'localBasePath' => dirname( __FILE__ ) . '/resources',
	'remoteExtPath' => 'EducationProgram/resources'
);

$wgResourceModules['ep.api'] = $moduleTemplate + array(
	'scripts' => array(
		'ep.api.js',
	),
);

$wgResourceModules['ep.pager'] = $moduleTemplate + array(
	'scripts' => array(
		'ep.pager.js',
	),
	'styles' => array(
		'ep.pager.css',
	),
	'dependencies' => array(
		'ep.api',
		'mediawiki.jqueryMsg',
	),
	'messages' => array(
		'ep-pager-confirm-delete',
		'ep-pager-delete-fail',
		'ep-pager-confirm-delete-selected',
		'ep-pager-delete-selected-fail',
	),
);

$wgResourceModules['ep.datepicker'] = $moduleTemplate + array(
	'scripts' => array(
		'ep.datepicker.js',
	),
	'dependencies' => array(
		'jquery.ui.datepicker',
	),
);

$wgResourceModules['ep.formpage'] = $moduleTemplate + array(
	'scripts' => array(
		'ep.formpage.js',
	),
	'dependencies' => array(
		'jquery.ui.button',
	),
);

unset( $moduleTemplate );

$egEPSettings = array();

# The default value for the user preferences.
$wgDefaultUserOptions['ep_showtoplink'] = false;

// TODO: put somewhere decent + document
function efEpGetCountryOptions( $langCode ) {
	$countries = CountryNames::getNames( $langCode );

	return array_merge(
		array( '' => '' ),
		array_combine(
			array_map(
				function( $value, $key ) {
					return $key . ' - ' . $value;
				} ,
				array_values( $countries ),
				array_keys( $countries )
			),
			array_keys( $countries )
		)
	);
}