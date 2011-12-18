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
	'special-editinstitution-add' => 'Add institution',
	'special-editinstitution-edit' => 'Edit institution',

	// Special:Institutions
	'ep-institutions-nosuchinstitution' => 'There is no institution with name "$1". Existing institutions are listed below.',
	'ep-institutions-noresults' => 'There are no institutions to list.',
	'ep-institutions-addnew' => 'Add a new institution',
	'ep-institutions-namedoc' => 'Enter the name for the new institution (which should be unique) and hit the button.',
	'ep-institutions-newname' => 'Institution name:',
	'ep-institutions-add' => 'Add institution',

	// Pager
	'educationprogram-pager-showonly' => 'Show only these items',

	// Org pager
	'eporgpager-header-name' => 'Name',
	'eporgpager-header-city' => 'City',
	'eporgpager-header-country' => 'Country',
	'eporgpager-filter-country' => 'Country',

	// Special:EditInstitution
	'editinstitution-text' => 'Enter the institution details below and click submit to save your changes.',
	'educationprogram-org-edit-name' => 'Institution name',
	'editinstitution-add-legend' => 'Add institution',
	'editinstitution-edit-legend' => 'Edit institution',
	'educationprogram-org-edit-city' => 'City',
	'educationprogram-org-edit-country' => 'Country',
	'educationprogram-org-submit' => 'Submit',

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

	'ep-institutions-nosuchinstitution' => 'Error message stating there is no institution with name $1',
);
