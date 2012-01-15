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
	'educationprogram-desc' => 'Allows for running education courses in which students can enroll.',

	// Misc
	'ep-item-summary' => 'Summary',
	'ep-toplink' => 'My courses',

	// Navigation links
	'ep-nav-orgs' => 'Institution list',
	'ep-nav-courses' => 'Courses list',
	'ep-nav-terms' => 'Terms list',
	'ep-nav-mycourses' => 'My courses',
	'ep-nav-students' => 'Student list',
	'ep-nav-mentors' => 'Ambassador list',

	// Logging
	'log-name-institution' => 'Institution log',
	'log-name-course' => 'Course log',
	'log-name-term' => 'Term log',
	'log-name-student' => 'Student log',
	'log-name-ambassador' => 'Ambassador log',
	'log-name-instructor' => 'Instructor log',

	'log-header-institution' => 'These events track when changes are made to institutions.',
	'log-header-course' => 'These events track when changes are made to courses.',
	'log-header-term' => 'These events track when changes are made to terms.',

	'logentry-institution-add' => '$1 {{GENDER:$2|created institution}} $3',
	'logentry-institution-remove' => '$1 {{GENDER:$2|removed institution}} $3',
	'logentry-institution-update' => '$1 {{GENDER:$2|updated institution}} $3',

	'logentry-course-add' => '$1 {{GENDER:$2|created course}} $3',
	'logentry-course-remove' => '$1 {{GENDER:$2|removed course}} $3',
	'logentry-course-update' => '$1 {{GENDER:$2|updated course}} $3',

	'logentry-term-add' => '$1 {{GENDER:$2|created term}} $3',
	'logentry-term-remove' => '$1 {{GENDER:$2|removed term}} $3',
	'logentry-term-update' => '$1 {{GENDER:$2|updated term}} $3',

	// Preferences
	'prefs-education' => 'Education',
	'ep-prefs-showtoplink' => 'Show a link to [[Special:MyCourses|your courses]] at the top of every page.',

	// Rights
	'right-ep-org' => 'Manage Education Program institutions',
	'right-ep-course' => 'Manage Education Program courses',
	'right-ep-term' => 'Manage Education Program terms',
	'right-ep-token' => 'See Education Program enrollment tokens',
	'right-ep-remstudent' => 'Remove students from terms',
	'right-ep-enroll' => 'Enroll in Education Program terms',
	'right-ep-online' => 'Add or remove online ambassadors to terms',
	'right-ep-campus' => 'Add or remove campus ambassadors to terms',
	'right-ep-instructor' => 'Add or remove instructors to courses',

	// Actions
	'action-ep-org' => 'manage institutions',
	'action-ep-course' => 'manage courses',
	'action-ep-term' => 'manage terms',
	'action-ep-token' => 'see enrollment tokens',
	'action-ep-remstudent' => 'remove students from terms',
	'action-ep-enroll' => 'enroll in terms',
	'action-ep-online' => 'add or remove online ambassadors to terms',
	'action-ep-campus' => 'add or remove campus ambassadors to terms',
	'action-ep-instructor' => 'add or remove instructors to courses',

	// Groups
	'group-epadmin' => 'Education program admins',
	'group-epadmin-member' => '{{GENDER:$1|Education Program admin}}',
	'grouppage-epadmin' => '{{ns:project}}:Education_program_administrators',

	'group-epstaff' => 'Education program staff',
	'group-epstaff-member' => '{{GENDER:$1|Education Program staff}}',
	'grouppage-epstaff' => '{{ns:project}}:Education_program_staff',

	'group-eponlineamb' => 'Education program online ambassador',
	'group-eponlineamb-member' => '{{GENDER:$1|Education Program online ambassador}}',
	'grouppage-eponlineamb' => '{{ns:project}}:Education_program_online_ambassadors',

	'group-epcampamb' => 'Education program campus ambassador',
	'group-epcampamb-member' => '{{GENDER:$1|Education Program campus ambassador}}',
	'grouppage-epcampamb' => '{{ns:project}}:Education_program_campus_ambassadors',

	'group-epinstructor' => 'Education program instructor',
	'group-epinstructor-member' => '{{GENDER:$1|Education Program instructor}}',
	'grouppage-epinstructor' => '{{ns:project}}:Education_program_instructors',

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
    'special-ambassadors' => 'Ambassadors',
	'special-ambassador' => 'Ambassador',

	// Term statuses
	'ep-term-status-passed' => 'Passed',
	'ep-term-status-current' => 'Current',
	'ep-term-status-planned' => 'Planned',

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
	'ep-courses-noorgs' => 'You are not a mentor of any institutions yet, so cannot add any courses.',
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

	// Special:Students
	'ep-students-noresults' => 'There are no students to list.',

    // Special:Ambassadors
    'ep-mentors-noresults' => 'There are no ambassadors to list.',

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
	'eporgpager-header-courses' => 'Courses',
	'eporgpager-header-students' => 'Students',
	'eporgpager-header-terms' => 'Terms',
	'eporgpager-header-active' => 'Active',
	'eporgpager-filter-active' => 'Active courses',
	'eporgpager-yes' => 'Yes',
	'eporgpager-no' => 'No',

	// Course pager
	'epcoursepager-header-name' => 'Name',
	'epcoursepager-header-org-id' => 'Institution',
	'epcoursepager-filter-org-id' => 'Institution',
	'epcoursepager-header-students' => 'Students',
	'epcoursepager-header-active' => 'Active',
	'epcoursepager-filter-active' => 'Active terms',
	'epcoursepager-yes' => 'Yes',
	'epcoursepager-no' => 'No',

	// Term pager
	'eptermpager-header-id' => 'Id',
	'eptermpager-header-course-id' => 'Course',
	'eptermpager-header-year' => 'Year',
	'eptermpager-header-start' => 'Start',
	'eptermpager-header-end' => 'End',
	'eptermpager-filter-course-id' => 'Course',
	'eptermpager-filter-year' => 'Year',
	'eptermpager-filter-org-id' => 'Institution',
	'eptermpager-header-status' => 'Status',
	'eptermpager-filter-status' => 'Status',
	'eptermpager-header-students' => 'Students',

	// Student pager
	'epstudentpager-header-user-id' => 'User',
	'epstudentpager-header-id' => 'Id',
	'epstudentpager-header-current-courses' => 'Current courses',
	'epstudentpager-header-passed-courses' => 'Passed courses',
	'epstudentpager-header-first-enroll' => 'First enrollment',
	'epstudentpager-header-last-active' => 'Last active',
	'epstudentpager-header-active-enroll' => 'Currently enrolled',
	'epstudentpager-yes' => 'Yes',
	'epstudentpager-no' => 'No',

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
	'ep-pager-confirm-delete-selected' => 'Are you sure you want to delete the selected {{PLURAL:$1|item|items}}?',
	'ep-pager-delete-selected-fail' => 'Could not delete the selected {{PLURAL:$1|item|items}}.',

	// Special:Institution
	'ep-institution-none' => 'There is no institution with name "$1". See [[Special:Institution|here]] for a list of institutions.',
	'ep-institution-create' => 'There is no institution with name "$1" yet, but you can create it.',
	'ep-institution-title' => 'Institution: $1',
	'ep-institution-courses' => 'Courses',
	'specialinstitution-summary-name' => 'Name',
	'specialinstitution-summary-city' => 'City',
	'specialinstitution-summary-country' => 'Country',
	'specialinstitution-summary-status' => 'Status',
	'specialinstitution-summary-courses' => 'Course count',
	'specialinstitution-summary-terms' => 'Term count',
	'specialinstitution-summary-students' => 'Student count',
	'ep-institution-nav-edit' => 'Edit this institution',
	'ep-institution-add-course' => 'Add a course',
	'ep-institution-inactive' => 'Inactive',
	'ep-institution-active' => 'Active',

	// Special:Course
	'ep-course-title' => 'Course: $1',
	'ep-course-terms' => 'Terms',
	'ep-course-none' => 'There is no course with name "$1". See [[Special:Courses|here]] for a list of courses.',
	'ep-course-create' => 'There is no course with name "$1" yet, but you can create it.',
	'specialcourse-summary-name' => 'Name',
	'specialcourse-summary-org' => 'Institution',
	'specialcourse-summary-students' => 'Student count',
	'specialcourse-summary-status' => 'Status',
	'ep-course-description' => 'Description',
	'ep-course-nav-edit' => 'Edit this course',
	'ep-course-add-term' => 'Add a term',
	'ep-course-inactive' => 'Inactive',
	'ep-course-active' => 'Active',
	'specialcourse-summary-terms' => 'Term count',

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

	// Special:Ambassador
	'ep-ambassador-does-not-exist' => 'There is no ambassador with name "$1". See [[Special:Ambassadors|here]] for a list of ambassadors.',
	'ep-ambassador-title' => 'Ambassador: $1',

	// Special:Student
	'ep-student-none' => 'There is no student with id "$1". See [[Special:Students|here]] for a list of students.',
	'ep-student-title' => 'Student: $1',
	'ep-student-actively-enrolled' => 'Currently enrolled',
	'ep-student-no-active-enroll' => 'Not currently enrolled',
	'specialstudent-summary-active-enroll' => 'Enrollment status',
	'specialstudent-summary-last-active' => 'Last activity',
	'specialstudent-summary-first-enroll' => 'First enrollment',
	'specialstudent-summary-user' => 'User',
	'ep-student-terms' => 'Terms this student has enrolled in',

	// Special:Enroll
	'ep-enroll-title' => 'Enroll for $1 at $2',
	'ep-enroll-login-first' => 'Before you can enroll in this course, you need to login.',
	'ep-enroll-login-and-enroll' => 'Login with an existing account & enroll',
	'ep-enroll-signup-and-enroll' => 'Create a new account & enroll',
	'ep-enroll-not-allowed' => 'Your account is not allowed to enroll',
	'ep-enroll-invalid-id' => 'The term you tried to enroll for does not exist. A list of existing terms can be found [[Special:Terms|here]].',
	'ep-enroll-no-id' => 'You need to specify a term to enroll for. A list of existing terms can be found [[Special:Terms|here]].',
	'ep-enroll-invalid-token' => 'The token you provided is invalid.',
	'ep-enroll-legend' => 'Enroll',
	'ep-enroll-header' => 'In order to enroll for this course, all you need to do is fill out this form and click the submission button. After that you will be enrolled.',
	'ep-enroll-gender' => 'Gender (optional)',
	'ep-enroll-realname' => 'Real name (required)',
	'ep-enroll-invalid-name' => 'The name needs to be at least contain $1 {{PLURAL:$1|character|characters}}.',
	'ep-enroll-invalid-gender' => 'Please select one of these genders',
	'ep-enroll-add-token' => 'Enter your enrollment token',
	'ep-enroll-add-token-doc' => 'In order to enroll for this term, you need a token provided by your instructor or one of the ambassadors for your term.',
	'ep-enroll-token' => 'Enrollment token',
	'ep-enroll-submit-token' => 'Enroll with this token',
	'ep-enroll-term-passed' => 'This term has ended, so you can no longer enroll for it. A list of existing terms can be found [[Special:Terms|here]].',
	'ep-enroll-term-planned' => 'This term has not yet started, please be patient. A list of existing terms can be found [[Special:Terms|here]].',

	// Special:MyCourses
	'ep-mycourses-enrolled' => 'You have successfully enrolled for $1 at $2.',
	'ep-mycourses-not-enrolled' => 'You are not enrolled in any course. A list of courses can be found [[Special:Courses|here]].',
	'ep-mycourses-current' => 'Active courses',
	'ep-mycourses-passed' => 'Passed courses',
	'ep-mycourses-header-name' => 'Name',
	'ep-mycourses-header-institution' => 'Institution',
	'ep-mycourses-show-all' => 'This page shows one of the courses you are enrolled in. You can also view all [[Special:MyCourses|your courses]].',
	'ep-mycourses-no-such-course' => 'You are not enrolled in any course with name "$1". The courses you are enrolled in are listed below.',
	'ep-mycourses-course-title' => 'My courses: $1 at $2',
	'specialmycourses-summary-name' => 'Course name',
	'specialmycourses-summary-org' => 'Institution name',
    'ep-mycourses-not-a-student' => 'You are not enrolled in any [[Special:Courses|courses]].',
);

/** Message documentation (Message documentation)
 * @author Jeroen De Dauw
 */
$messages['qqq'] = array(
	'right-' => '{{doc-right|}}',

	'action-' => '{{doc-action|}}',

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
