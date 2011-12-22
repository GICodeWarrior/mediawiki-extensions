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
	'special-terms' => 'Terms',
	'special-term' => 'Term',
	'special-editterm-add' => 'Add term',
	'special-editterm-edit' => 'Edit term',
	'special-editcourse-add' => 'Add course',
	'special-editcourse-edit' => 'Edit course',

	// Special:Institutions
	'ep-institutions-nosuchinstitution' => 'There is no institution with name "$1". Existing institutions are listed below.',
	'ep-institutions-noresults' => 'There are no institutions to list.',
	'ep-institutions-addnew' => 'Add a new institution',
	'ep-institutions-namedoc' => 'Enter the name for the new institution (which should be unique) and hit the button.',
	'ep-institutions-newname' => 'Institution name:',
	'ep-institutions-add' => 'Add institution',

	// Special:Courses
	'ep-courses-nosuchcourse' => 'There is no course with name "$1". Existing courses are listed below.',
	'ep-courses-noresults' => 'There are no courses to list.',
	'ep-courses-addnew' => 'Add a new course',
	'ep-courses-namedoc' => 'Enter the name for the new course (which should be unique) and hit the button.',
	'ep-courses-newname' => 'Course name:',
	'ep-courses-add' => 'Add course',
	'ep-courses-addorgfirst' => 'You need to [[Special:Institutions|add an institution]] before you can create any courses.',
	'ep-courses-noorgs' => 'You are not a mentor of any insitutions yet, so cannot add any courses.',
	'ep-courses-neworg' => 'Institution',

	// Special:Terms
	'ep-terms-nosuchterm' => 'There is no term with id "$1". Existing terms are listed below.',
	'ep-terms-noresults' => 'There are no terms to list.',
	'ep-terms-addnew' => 'Add a new term',
	'ep-terms-namedoc' => 'Enter the course the term belongs to and the year in which it is active.',
	'ep-terms-newyear' => 'Term year:',
	'ep-terms-newcourse' => 'Term course:',
	'ep-terms-add' => 'Add term',
	'ep-terms-addcoursefirst' => 'The institutions you are a mentor for do not have any courses associated with them. You need to [[Special:Courses|add a course]] before you can create any terms.',

	// Pager
	'ep-pager-showonly' => 'Show only items with',
	'ep-pager-clear' => 'Clear filters',
	'ep-pager-go' => 'Go',

	// Org pager
	'eporgpager-header-name' => 'Name',
	'eporgpager-header-city' => 'City',
	'eporgpager-header-country' => 'Country',
	'eporgpager-filter-country' => 'Country',

	// Institution pager
	'epcoursepager-header-name' => 'Name',
	'epcoursepager-header-org-id' => 'Institution',
	'epcoursepager-filter-org-id' => 'Institution',

	// Term pager
	'eptermpager-header-id' => 'Id',
	'eptermpager-header-course-id' => 'Course',
	'eptermpager-header-year' => 'Year',
	'eptermpager-header-start' => 'Start',
	'eptermpager-header-end' => 'End',
	'eptermpager-filter-course-id' => 'Course',
	'eptermpager-filter-year' => 'Year',

	// Special:EditInstitution
	'editinstitution-text' => 'Enter the institution details below and click submit to save your changes.',
	'educationprogram-org-edit-name' => 'Institution name',
	'editinstitution-add-legend' => 'Add institution',
	'editinstitution-edit-legend' => 'Edit institution',
	'educationprogram-org-edit-city' => 'City',
	'educationprogram-org-edit-country' => 'Country',
	'educationprogram-org-submit' => 'Submit',

	// Special:EditCourse
	'editcourse-add-legend' => 'Add course',
	'editcourse-edit-legend' => 'Edit course',
	'ep-course-edit-name' => 'Name',
	'ep-course-edit-org' => 'Institution',
	'ep-course-edit-description' => 'Description',

	'ep-course-invalid-name' => 'This name is to short. It needs to be at least contain $1 {{PLURAL:$1|character|characters}}.',
	'ep-course-invalid-description' => 'This description is to short. It needs to be at least contain $1 {{PLURAL:$1|character|characters}}.',
	'ep-course-invalid-org' => 'This institution does not exist',

	// Special:EditTerm
	'editterm-add-legend' => 'Add term',
	'editterm-edit-legend' => 'Edit term',
	'ep-term-edit-year' => 'Year',
	'ep-term-edit-course' => 'Course',
	'ep-term-edit-start' => 'Start date',
	'ep-term-edit-end' => 'End date',

	'ep-term-invalid-year' => 'The year needs to be number.',
	'ep-term-invalid-course' => 'This course does not exist.',

	// ep.pager
	'ep-pager-confirm-delete' => 'Are you sure you want to delete this item?',
	'ep-pager-delete-fail' => 'Could not delete this item.',
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
