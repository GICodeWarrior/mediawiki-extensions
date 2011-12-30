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
	'special-enroll' => 'Enroll',

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
	'ep-terms-nocourses' => 'There are no courses yet. You need to [[Special:Courses|add a course]] before you can create any terms.',
	'ep-terms-addcoursefirst' => 'The institutions you are a mentor for do not have any courses associated with them. You need to [[Special:Courses|add a course]] before you can create any terms.',

	// Pager
	'ep-pager-showonly' => 'Show only items with',
	'ep-pager-clear' => 'Clear filters',
	'ep-pager-go' => 'Go',
	'ep-pager-withselected' => 'With selected',
	'ep-pager-delete-selected' => 'Delete',

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
	'ep-term-edit-token' => 'Enrollment token',
	'ep-term-edit-description' => 'Description',

	'ep-term-invalid-course' => 'This course does not exist.',
	'ep-term-invalid-token' => 'The token needs to be at least contain $1 {{PLURAL:$1|character|characters}}.',
	'ep-term-invalid-description' => 'The description needs to be at least contain $1 {{PLURAL:$1|character|characters}}.',

	// ep.pager
	'ep-pager-confirm-delete' => 'Are you sure you want to delete this item?',
	'ep-pager-delete-fail' => 'Could not delete this item.',
	'ep-pager-confirm-delete-selected' => 'Are you sure you want to delete the selected items?',
	'ep-pager-delete-selected-fail' => 'Could not delete the selected items.',

	// Special:Institution
	'ep-institution-none' => 'There is no institution with name "$1". See [[Special:Institution|here]] for a list of institutions.',
	'ep-institution-create' => 'There is no institution with name "$1" yet, but you can create it.',
	'ep-institution-title' => 'Institution: $1',
	'ep-institution-courses' => 'Courses',
	'specialinstitution-summary-name' => 'Name',
	'specialinstitution-summary-city' => 'City',
	'specialinstitution-summary-country' => 'Country',
	'ep-institution-nav-edit' => 'Edit this institution',

	// Special:Course
	'ep-course-title' => 'Course: $1',
	'ep-course-terms' => 'Terms',
	'ep-course-none' => 'There is no course with name "$1". See [[Special:Courses|here]] for a list of courses.',
	'ep-course-create' => 'There is no course with name "$1" yet, but you can create it.',
	'specialcourse-summary-name' => 'Name',
	'specialcourse-summary-org' => 'Institution',
	'ep-course-description' => 'Description',
	'ep-course-nav-edit' => 'Edit this course',

	// Special:Term
	'ep-term-title' => 'Term: $1',
	'ep-term-students' => 'Students',
	'ep-term-none' => 'There is no term with id "$1". See [[Special:Terms|here]] for a list of terms.',
	'ep-term-create' => 'There is no term with id "$1", but you can create a new one.',
	'specialterm-summary-org' => 'Institution',
	'specialterm-summary-course' => 'Course',
	'specialterm-summary-year' => 'Year',
	'specialterm-summary-start' => 'Start',
	'specialterm-summary-end' => 'End',
	'ep-term-description' => 'description',
	'specialterm-summary-token' => 'Enrollment token',
	'ep-term-nav-edit' => 'Edit this term',

	// Special:Enroll
	'ep-enroll-title' => 'Enroll for $1 at $2',
	'ep-enroll-login-first' => 'Before you can enroll in this course, you need to login.',
	'ep-enroll-login-and-entroll' => 'Login with an existing account & enroll',
	'ep-enroll-signup-and-entroll' => 'Create a new account & enroll',
	'ep-enroll-not-allowed' => 'Your account is not allowed to enroll',
	'ep-enroll-invalid-id' => 'The term you tried to enroll for does not exist. A list of existing terms can be found [[Special:Terms|here]].',
	'ep-enroll-no-id' => 'You need to specify a term to enroll for. A list of existing terms can be found [[Special:Terms|here]].',
	'ep-enroll-no-token' => 'You need to provide the token needed to enroll for this term.',
	'ep-enroll-invalid-token' => 'The token you provided is invalid.',
	'ep-enroll-legend' => 'Enroll',
	
	// Navigation links
	'ep-nav-orgs' => 'Institution list',
	'ep-nav-courses' => 'Courses list',
	'ep-nav-terms' => 'Terms list',
	'ep-nav-mycourses' => 'My courses',

	// Misc
	'ep-item-summary' => 'Summary',
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
