<?php

/**
 * Initialization file for the Education Program extension.
 *
 * Documentation:	 		https://www.mediawiki.org/wiki/Extension:Education_Program
 * Support					https://www.mediawiki.org/wiki/Extension_talk:Education_Program
 * Source code:			    http://svn.wikimedia.org/viewvc/mediawiki/trunk/extensions/EducationProgram
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

$wgAutoloadClasses['EPCourse'] 						= dirname( __FILE__ ) . '/includes/EPCourse.php';
$wgAutoloadClasses['EPCoursePager'] 				= dirname( __FILE__ ) . '/includes/EPCoursePager.php';
$wgAutoloadClasses['EPDBObject'] 					= dirname( __FILE__ ) . '/includes/EPDBObject.php';
$wgAutoloadClasses['EPMentor'] 						= dirname( __FILE__ ) . '/includes/EPMentor.php';
$wgAutoloadClasses['EPOrg'] 						= dirname( __FILE__ ) . '/includes/EPOrg.php';
$wgAutoloadClasses['EPOrgPager'] 					= dirname( __FILE__ ) . '/includes/EPOrgPager.php';
$wgAutoloadClasses['EPPager'] 						= dirname( __FILE__ ) . '/includes/EPPager.php';
$wgAutoloadClasses['EPStudent'] 					= dirname( __FILE__ ) . '/includes/EPStudent.php';
$wgAutoloadClasses['EPStudentPager'] 				= dirname( __FILE__ ) . '/includes/EPStudentPager.php';
$wgAutoloadClasses['EPTerm'] 						= dirname( __FILE__ ) . '/includes/EPTerm.php';
$wgAutoloadClasses['EPTermPager'] 						= dirname( __FILE__ ) . '/includes/EPTermPager.php';

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

// Hooks
$wgHooks['LoadExtensionSchemaUpdates'][] 		= 'EPHooks::onSchemaUpdate';
$wgHooks['UnitTestsList'][] 					= 'EPHooks::registerUnitTests';
$wgHooks['PersonalUrls'][] 						= 'EPHooks::onPersonalUrls';
$wgHooks['GetPreferences'][] 					= 'EPHooks::onGetPreferences';

// Rights
$wgAvailableRights[] = 'epadmin';
$wgAvailableRights[] = 'epstudent';
$wgAvailableRights[] = 'epmentor';

# Users that can manage the education program.
$wgGroupPermissions['*'            ]['epadmin'] = false;
//$wgGroupPermissions['user'         ]['epadmin'] = false;
//$wgGroupPermissions['autoconfirmed']['epadmin'] = false;
//$wgGroupPermissions['bot'          ]['epadmin'] = false;
$wgGroupPermissions['sysop'        ]['epadmin'] = true;
$wgGroupPermissions['epadmin' ]['epadmin'] = true;

# Users that can enroll as students in the education program.
$wgGroupPermissions['*'            ]['epstudent'] = false;
$wgGroupPermissions['user'         ]['epstudent'] = true;
//$wgGroupPermissions['autoconfirmed']['epstudent'] = true;
//$wgGroupPermissions['bot'          ]['epstudent'] = false;
$wgGroupPermissions['sysop'        ]['epstudent'] = true;
$wgGroupPermissions['epadmin']['epstudent'] = true;
$wgGroupPermissions['epstudent' ]['epstudent'] = true;
$wgGroupPermissions['epmentor' ]['epstudent'] = true;

# Users that act as mentors in the education program.
$wgGroupPermissions['*'            ]['epmentor'] = false;
$wgGroupPermissions['user'         ]['epmentor'] = true;
//$wgGroupPermissions['autoconfirmed']['epmentor'] = true;
//$wgGroupPermissions['bot'          ]['epmentor'] = false;
$wgGroupPermissions['sysop'        ]['epmentor'] = true;
$wgGroupPermissions['epadmin']['epmentor'] = true;
$wgGroupPermissions['epmentor' ]['epmentor'] = true;


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
	'dependencies' => array(
		'ep.api',
	),
	'messages' => array(
		'ep-pager-confirm-delete',
		'ep-pager-delete-fail',
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
//$wgDefaultUserOptions[''] = false;

// TODO: put somewhere decent + document
function efEpGetCountryOptions( $langCode ) {
	$countries = CountryNames::getNames( $langCode );

	return array_merge(
		array( '' => '' ), 
		array_combine(
			array_map(
				function( $value, $key ) {
					return $key . ' - ' . $value;
				},
				array_values( $countries ),
				array_keys( $countries )
			),
			array_keys( $countries )
		)
	);
}