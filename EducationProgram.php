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

if ( version_compare( $wgVersion, '1.18c', '<' ) ) { // Needs to be 1.18c because version_compare() works in confusing ways
	die( '<b>Error:</b> Reviews requires MediaWiki 1.18 or above.' );
}

define( 'REVIEWS_VERSION', '0.1 alpha' );

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Education Program',
	'version' => REVIEWS_VERSION,
	'author' => array(
		'[http://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw]',
	),
	'url' => 'http://www.mediawiki.org/wiki/Extension:Education_Program',
	'descriptionmsg' => 'educationprogram-desc'
);

// i18n
$wgExtensionMessagesFiles['EducationProgram'] 		= dirname( __FILE__ ) . '/EducationProgram.i18n.php';
$wgExtensionMessagesFiles['EducationProgramAlias']	= dirname( __FILE__ ) . '/EducationProgram.i18n.alias.php';

// Autoloading
$wgAutoloadClasses['EPHooks'] 						= dirname( __FILE__ ) . '/EducationProgram.hooks.php';
$wgAutoloadClasses['EPSettings'] 					= dirname( __FILE__ ) . '/EducationProgram.settings.php';

$wgAutoloadClasses['EPOrg'] 						= dirname( __FILE__ ) . '/includes/EPOrg.php';
$wgAutoloadClasses['EPStudent'] 					= dirname( __FILE__ ) . '/includes/EPStudent.php';
$wgAutoloadClasses['EPMentor'] 						= dirname( __FILE__ ) . '/includes/EPMentor.php';
$wgAutoloadClasses['EPCourse'] 						= dirname( __FILE__ ) . '/includes/EPCourse.php';

$wgAutoloadClasses['SpecialMyCourses'] 				= dirname( __FILE__ ) . '/specials/SpecialMyCourses.php';
$wgAutoloadClasses['SpecialInstitution'] 			= dirname( __FILE__ ) . '/specials/SpecialInstitution.php';
$wgAutoloadClasses['SpecialInstitutions'] 			= dirname( __FILE__ ) . '/specials/SpecialInstitutions.php';
$wgAutoloadClasses['SpecialStudent'] 				= dirname( __FILE__ ) . '/specials/SpecialStudent.php';
$wgAutoloadClasses['SpecialStudents'] 				= dirname( __FILE__ ) . '/specials/SpecialStudents.php';
$wgAutoloadClasses['SpecialCourse'] 				= dirname( __FILE__ ) . '/specials/SpecialCourse.php';
$wgAutoloadClasses['SpecialCourses'] 				= dirname( __FILE__ ) . '/specials/SpecialCourses.php';
$wgAutoloadClasses['SpecialEducationProgram'] 		= dirname( __FILE__ ) . '/specials/SpecialEducationProgram.php';

// Special pages
$wgSpecialPages['MyCourses'] 						= 'SpecialMyCourses';
$wgSpecialPages['Institution'] 						= 'SpecialInstitution';
$wgSpecialPages['Institutions'] 					= 'SpecialInstitutions';
$wgSpecialPages['Student'] 							= 'SpecialStudent';
$wgSpecialPages['Students'] 						= 'SpecialStudents';
$wgSpecialPages['Course'] 							= 'SpecialCourse';
$wgSpecialPages['Courses'] 							= 'SpecialCourses';
$wgSpecialPages['EducationProgram'] 				= 'SpecialEducationProgram';

$wgSpecialPageGroups['MyCourses'] 					= 'education';
$wgSpecialPageGroups['Institution'] 				= 'education';
$wgSpecialPageGroups['Institutions'] 				= 'education';
$wgSpecialPageGroups['Student'] 					= 'education';
$wgSpecialPageGroups['Students'] 					= 'education';
$wgSpecialPageGroups['Course'] 						= 'education';
$wgSpecialPageGroups['Courses'] 					= 'education';
$wgSpecialPageGroups['EducationProgram'] 			= 'education';

// API


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

unset( $moduleTemplate );

$egEPSettings = array();

# The default value for the user preferences.
//$wgDefaultUserOptions[''] = false;
