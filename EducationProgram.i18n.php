<?php

/**
 * Internationalization file for the Education Program extension.
 *
 * @since 0.1
 *
 * @file EducationProgram.i18n.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

$messages = array();

/** English
 * @author Jeroen De Dauw
 */
$messages['en'] = array(
	'educationprogram-desc' => '', // TODO

	// Rights
	'right-epadmin' => 'Manage the education program',
	'right-epstudent' => 'Enroll in the education program',
	'right-epmentor' => 'Mentor in the education program',

	// Actions
	'action-epadmin' => 'manage the education program',
	'action-epstudent' => 'enroll in the education program',
	'action-epmentor' => 'mentor in the education program',

	// Groups
	'group-epadmin' => 'Education program admins',
	'group-epadmin-member' => '{{GENDER:$1|education program admin}}',
	'grouppage-epadmin' => '{{ns:project}}:Education_program_administrators',

	'group-epstudent' => 'Education program students',
	'group-epstudent-member' => '{{GENDER:$1|education program student}}',
	'grouppage-epstudent' => '{{ns:project}}:Education_program_students',

	'group-epmentor' => 'Education program mentors',
	'group-epmentor-member' => '{{GENDER:$1|education program mentor}}',
	'grouppage-epmentor' => '{{ns:project}}:Education_program_mentors',

	// Special pages
	'specialpages-group-education' => 'Education',
	'special-mycourses' => 'My courses',
	'special-institution' => 'Institution',
	'special-institutions' => 'Institutions',
	'special-student' => 'Student',
	'special-students' => 'Students',
	'special-course' => 'Course',
	'special-courses' => 'Courses',
	'special-educationprogram' => 'Education Program',

);

/** Message documentation (Message documentation)
 * @author Jeroen De Dauw
 */
$messages['qqq'] = array(
	'right-epadmin' => '{{doc-right|epadmin}}',
	'right-epstudent' => '{{doc-right|epstudent}}',
	'right-epmentor' => '{{doc-right|epmentor}}',

	'action-epadmin' => '{{doc-action|epadmin}}',
	'action-epstudent' => '{{doc-action|epstudent}}',
	'action-epmentor' => '{{doc-action|epmentor}}',

	'specialpages-group-education' => 'Special pages group, h2',
	'special-mycourses' => '{{doc-special|mycourses}}',
	'special-institution' => '{{doc-special|institution}}',
	'special-institutions' => '{{doc-special|institutions}}',
	'special-student' => '{{doc-special|student}}',
	'special-students' => '{{doc-special|students}}',
	'special-course' => '{{doc-special|course}}',
	'special-courses' => '{{doc-special|courses}}',
	'special-educationprogram' => '{{doc-special|educationprogram}}',
);
