<?php

/**
 * Internationalization file for the Contest extension.
 *
 * @since 0.1
 *
 * @file Contest.i18n.php
 * @ingroup Contest
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

$messages = array();

/** English
 * @author Jeroen De Dauw
 */
$messages['en'] = array(
	'contest-desc' => 'Contest extension that allows users to participate in admin defined contest challenges. Via a judging interface, judges can discuss and vote on submissions.',

	// Rights
	'right-contestadmin' => 'Manage contests',
	'right-contestparticipant' => 'Participate in contests',
	'right-contestjudge' => 'Judge contest submissions',

	// Groups
	'group-contestadmin' => 'Contest admins',
	'group-contestadmin-member' => 'contest admin',
	'grouppage-contestadmin' => 'Project:Contest_admins',

	'group-contestparticipant' => 'Contest participants',
	'group-contestparticipant-member' => 'contest participant',
	'grouppage-contestparticipant' => 'Project:Contest_participants',

	'group-contestjudge' => 'Contest judges',
	'group-contestjudge-member' => 'contest judge',
	'grouppage-contestjudge' => 'Project:Contest_judges',

	// Contest statuses
	'contest-status-draft' => 'Draft (disabled)',
	'contest-status-active' => 'Active (enabled)',
	'contest-status-finished' => 'Finished (disabled)',

	// Special page names
	'special-contest' => 'Contest',
	'special-contests' => 'Contests',
	'special-contestsignup' => 'Contest signup',
	'special-contestsubmission' => 'Contest submission',
	'special-contestwelcome' => 'Contest',
	'special-editcontest' => 'Edit contest',

	// Navigation links
	'contest-nav-contests' => 'Contests list',
	'contest-nav-editcontest' => 'Edit contest',
	'contest-nav-contest' => 'Summary and participants',
	'contest-nav-contestwelcome' => 'Landing page',
	'contest-nav-contestsignup' => 'Signup page',

	// Special:Contests
	'contest-special-addnew' => 'Add a new contest',
	'contest-special-namedoc' => 'The name of the contest is the identifier used in URLs. ie "name" in Special:Contest/name',
	'contest-special-newname' => 'Contest name',
	'contest-special-add' => 'Add contest',
	'contest-special-existing' => 'Existing contests',
	
	'contest-special-name' => 'Name',
	'contest-special-status' => 'Status',
	'contest-special-submissioncount' => 'Submission count',
	'contest-special-edit' => 'Edit',
	'contest-special-delete' => 'Delete',

	'contest-special-confirm-delete' => 'Are you sure you want to delete this contest?',
	'contest-special-delete-failed' => 'Failed to delete the contest.',

	// Special:EditContest
	'editcontest-text' => 'You are editing a contest.',
	'editcontest-legend' => 'Contest',
	'contest-edit-name' => 'Contest name',
	'contest-edit-status' => 'Contest status',
	'contest-edit-intro' => 'Introduction page',
	'contest-edit-opportunities' => 'Opportunities page',
	'contest-edit-rulespage' => 'Rules page',
	'contest-edit-help' => 'Help page',
	'contest-edit-exists-already' => 'Note: you are editing an already existing contest, not creating a new one.',
	'contest-edit-submit' => 'Submit',

	'contest-edit-challenges' => 'Contest challenges',
	'contest-edit-delete' => 'Delete challenge',
	'contest-edit-add-first' => 'Add a challenge',
	'contest-edit-add-another' => 'Add another challenge',
	'contest-edit-confirm-delete' => 'Are you sure you want to delete this challenge?',
	'contest-edit-challenge-title' => 'Challenge title',
	'contest-edit-challenge-text' => 'Challenge text',

	// Special:ContestWelcome
	'contest-welcome-unknown' => 'There is no contest with the provided name.',
	'contest-welcome-rules' => 'In order to participate, you must agree to [[$1|the contest rules]].',
	'contest-welcome-signup' => 'Signup now',

	// Special:ContestSignup & Special:ContestSubmission
	'contest-signup-unknown' => 'There is no contest with the provided name.',
	'contest-signup-submit' => 'Signup',
	'contest-signup-header' => 'Please fill out the form to complete your registration for $1.',
	'contest-signup-email' => 'Your email address',
	'contest-signup-realname' => 'Your real name',
	'contest-signup-volunteer' => 'I am interested in volunteer opportunities',
	'contest-signup-wmf' => 'I am interested in working for the Wikimedia Foundation',
	'contest-signup-cv' => 'Link to your CV',
	'contest-signup-readrules' => 'I confirm that I have read, and agree to, [[$1|the contest rules]]',
	'contest-signup-challenge' => 'What challenge do you want to take on?',
	'contest-signup-finished' => 'This contest has ended.',
	'contest-signup-draft' => 'This contest has not started yet. Please be patient.',
	'contest-signup-country' => 'Your country',

	'contest-signup-require-rules' => 'You need to agree to the contest rules.',
	'contest-signup-require-country' => 'You need to provide your country of residence.',
	'contest-signup-invalid-email' => 'The email address you provided is not valid.',
	'contest-signup-invalid-name' => 'The name you provided is to short.',
	'contest-signup-require-challenge' => 'You must select a challenge.',
	'contest-signup-invalid-cv' => 'You entered an invalid URL.',

	// Special:ContestSubmission
	'contest-submission-submit' => 'Submit',
	'contest-submission-unknown' => 'There is no contest with the provided name.',
	'contest-submission-header' => 'On this page you can modify your submission until the deadline.',
	'contest-submission-finished' => 'This contest has ended.',

	// Special:Contest
	'contest-contest-title' => 'Contest: $1',
	'contest-contest-no-results' => 'There are no contestants to list.',
	'contest-contest-name' => 'Name',
	'contest-contest-status' => 'Status',
	'contest-contest-submissioncount' => 'Amount of participants',
	'contest-contest-contestants' => 'Contest contestants',

	// Contestant pager
	'contest-contestant-id' => 'ID',
	'contest-contestant-volunteer' => 'Volunteer',
	'contest-contestant-wmf' => 'WMF',
	'contest-contestant-no' => 'No',
	'contest-contestant-yes' => 'Yes',
	'contest-contestant-commentcount' => 'Comments',
	'contest-contestant-overallrating' => 'Rating',
	'contest-contestant-rating' => '$1 ($2 {{PLURAL:$2|vote|votes}})'
);

/** Message documentation (Message documentation)
 * @author Jeroen De Dauw
 */
$messages['qqq'] = array(
	'contest-special-name' => 'Table column header',
	'contest-special-status' => 'Table column header',
	'contest-special-submissioncount' => 'Table column header',
	'contest-special-edit' => 'Table column header',
	'contest-special-delete' => 'Table column header',

	'contest-edit-name' => 'form field label',
	'contest-edit-status' => 'form field label',

	'contest-contest-title' => 'Page title',
	'contest-contest-name' => 'Table row header',
	'contest-contest-status' => 'Table row header',
	'contest-contest-submissioncount' => 'Table row header',
	'contest-contest-contestants' => 'Page section header',

	'contest-contestant-id' => 'Table column header',
	'contest-contestant-volunteer' => 'Table column header',
	'contest-contestant-wmf' => 'Table column header',
	'contest-contestant-no' => 'Table cell value',
	'contest-contestant-yes' => 'Table cell value',
);