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

	// Misc
	'contest-toplink' => 'My contests',

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

	// Preferences
	'prefs-contest' => 'Contests',
	'contest-prefs-showtoplink' => 'Show a link to [[Special:MyContests|My Contests]] in the top menu.',

	// Contest statuses
	'contest-status-draft' => 'Draft (disabled)',
	'contest-status-active' => 'Active (enabled)',
	'contest-status-finished' => 'Finished (disabled)',

	// Special page names
	'special-contest' => 'View a contest',
	'special-contests' => 'Manage contests',
	'special-contestsignup' => 'Sign up for a contest',
	'special-contestwelcome' => 'View a contest',
	'special-editcontest' => 'Edit a contest',
	'special-mycontests' => 'My contests',
	'specialpages-group-contest' => 'Contests',

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
	'contest-edit-signup' => 'Signup email page',
	'contest-edit-reminder' => 'Reminder email page',
	'contest-edit-end' => 'Contest end',
	'contest-edit-exists-already' => 'Note: you are editing an already existing contest, not creating a new one.',
	'contest-edit-submit' => 'Submit',

	'contest-edit-challenges' => 'Contest challenges',
	'contest-edit-delete' => 'Delete challenge',
	'contest-edit-add-first' => 'Add a challenge',
	'contest-edit-add-another' => 'Add another challenge',
	'contest-edit-confirm-delete' => 'Are you sure you want to delete this challenge?',
	'contest-edit-challenge-title' => 'Challenge title',
	'contest-edit-challenge-text' => 'Challenge text',
	'contest-edit-challenge-oneline' => 'Short description',

	// Special:ContestWelcome
	'contest-welcome-unknown' => 'There is no contest with the provided name.',
	'contest-welcome-rules' => 'In order to participate, you must agree to', // js i18n
	'contest-welcome-rules-link' => 'the contest rules', // js i18n
	'contest-welcome-signup' => 'Signup now',
	'contest-welcome-js-off' => 'Contest uses JavaScript for an improved interface. Your browser either does not support JavaScript or has JavaScript turned off.',
	'contest-welcome-accept-challenge' => 'Challenge Accepted',

	'contest-welcome-select-header' => 'Select your challenge:',

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
	'contest-signup-finished' => 'This contest has ended. Thanks for your participation!',
	'contest-signup-draft' => 'This contest has not started yet. Please be patient.',
	'contest-signup-country' => 'Your country',

	'contest-signup-require-rules' => 'You need to agree to the contest rules.',
	'contest-signup-require-country' => 'You need to provide your country of residence.',
	'contest-signup-invalid-email' => 'The email address you provided is not valid.',
	'contest-signup-invalid-name' => 'The name you provided is to short.',
	'contest-signup-require-challenge' => 'You must select a challenge.',
	'contest-signup-invalid-cv' => 'You entered an invalid URL.',
	
	// Special:Contest
	'contest-contest-title' => 'Contest: $1',
	'contest-contest-no-results' => 'There are no contestants to list.',
	'contest-contest-name' => 'Name',
	'contest-contest-status' => 'Status',
	'contest-contest-submissioncount' => 'Amount of participants',
	'contest-contest-contestants' => 'Contest contestants',
	'contest-contest-contestants-text' => 'To judge an individual entry, click on the entry ID in the left column.',

	// Contestant pager
	'contest-contestant-id' => 'ID',
	'contest-contestant-challenge-name' => 'Challenge name',
	'contest-contestant-volunteer' => 'Volunteer',
	'contest-contestant-wmf' => 'WMF',
	'contest-contestant-no' => 'No',
	'contest-contestant-yes' => 'Yes',
	'contest-contestant-commentcount' => 'Comments',
	'contest-contestant-overallrating' => 'Rating',
	'contest-contestant-rating' => '$1 ($2 {{PLURAL:$2|vote|votes}})',
	
	// Special:Contestant
	'contest-contestant-title' => 'Contestant $1 ($2)',
	'contest-contestant-header-id' => 'Contestant ID',
	'contest-contestant-header-contest' => 'Contest name',
	'contest-contestant-header-challenge' => 'Challenge name',
	'contest-contestant-header-submission' => 'Submission link',
	'contest-contestant-header-country' => 'Contestant country',
	'contest-contestant-header-wmf' => 'Interested in WMF job',
	'contest-contestant-header-volunteer' => 'Interested in volunteer opportunities',
	'contest-contestant-header-rating' => 'Rating',
	'contest-contestant-header-comments' => 'Amount of comments',
	'contest-contestant-submission-url' => 'Submission',
	'contest-contestant-notsubmitted' => 'Not submitted yet',
	'contest-contestant-comments' => 'Comments',
	'contest-contestant-submit' => 'Save changes',
	'contest-contestant-comment-by' => 'Comment by $1',
	'contest-contestant-rate' => 'Rate this contestant',
	'contest-contestant-not-voted' => 'You have not voted on this participant yet.',
	'contest-contestant-voted' => 'Your current vote is $1.',
	'contest-contestant-permalink' => 'Permalink',

	// Emails
	'contest-email-signup-title' => 'Thanks for joining the challenge!',
	'contest-email-reminder-title' => 'Only $1 {{PLURAL:$1|day|days}} until the end of the challenge!',

	// Special:MyContests
	'contest-mycontests-toplink' => 'My contests',
	'contest-mycontests-no-contests' => 'You are not participating in any contest.',
	'contest-mycontests-active-header' => 'Running contests',
	'contest-mycontests-finished-header' => 'Passed contests',
	'contest-mycontests-active-text' => 'These are the contests you are currently participating in.',
	'contest-mycontests-finished-text' => 'These are the passed contests you have participated in.',
	'contest-mycontests-header-contest' => 'Contest',
	'contest-mycontests-header-challenge' => 'Challenge',
	'contest-mycontests-signup-success' => 'You have successfully signed up for this contest.',
	'contest-mycontests-addition-success' => 'You have successfully posted your submission! Thanks for participating in this contest.',
	'contest-mycontests-updated-success' => 'You have successfully modified your submission.',
	'contest-mycontests-sessionfail' => 'Your submission could not be saved due to loss of session data. Please try again.',

	'contest-submission-submit' => 'Submit',
	'contest-submission-unknown' => 'There is no contest with the provided name.',
	'contest-submission-header' => 'Thanks for participating in this contest! Once you have completed the challenge, you can add a link to you submission below.',
	'contest-submission-finished' => 'This contest has ended. Thanks for your participation!',

	'contest-submission-submission' => 'Link to your submission',
	'contest-submission-invalid-url' => 'This URL does not match one of the allowed formats.',
	'contest-submission-new-submission' => 'You still need to enter the URL to your submission. This needs to be done before the deadline.',
	'contest-submission-current-submission' => 'This is the URL to your submission, which you can modify untill the deadline.',
	
	// TODO: how can this be done properly in JS?
	'contest-submission-domains' => 'Submissions are restricted to these sites: $1',
);

/** Message documentation (Message documentation)
 * @author Jeroen De Dauw
 */
$messages['qqq'] = array(
	// Special:EditContest
	'editcontest-text' => 'Short text displayed at the top of the page notifying the user they are editting a contest',
	'contest-edit-name' => 'Form field label',
	'contest-edit-status' => 'Form field label',
	'contest-edit-intro' => 'Form field label',
	'contest-edit-opportunities' => 'Form field label',
	'contest-edit-rulespage' => 'Form field label',
	'contest-edit-help' => 'Form field label',
	'contest-edit-signup' => 'Form field label',
	'contest-edit-reminder' => 'Form field label',
	'contest-edit-end' => 'Form field label',
	'contest-edit-exists-already' => 'Warning message to show when the contest already exists',
	'contest-edit-submit' => 'Submit button text',

	'contest-edit-delete' => 'Delete challange button text',
	'contest-edit-add-first' => 'Add a challenge button text',
	'contest-edit-add-another' => 'Add another challenge button text',
	'contest-edit-confirm-delete' => 'Challange deletion confirmation message',
	'contest-edit-challenge-title' => 'Form field label',
	'contest-edit-challenge-text' => 'Form field label',
	'contest-edit-challenge-oneline' => 'Form field label',

	'contest-special-name' => 'Table column header',
	'contest-special-status' => 'Table column header',
	'contest-special-submissioncount' => 'Table column header',
	'contest-special-edit' => 'Table column header',
	'contest-special-delete' => 'Table column header',

	'contest-edit-name' => 'form field label',
	'contest-edit-status' => 'form field label',

	// Special:Contest
	'contest-contest-title' => 'Page title',
	'contest-contest-no-results' => 'Message displayed instead of a table when there are no contests',
	'contest-contest-name' => 'Table row header',
	'contest-contest-status' => 'Table row header',
	'contest-contest-submissioncount' => 'Table row header',
	'contest-contest-contestants' => 'Page section header',

	// Contestant pager
	'contest-contestant-id' => 'Table column header',
	'contest-contestant-volunteer' => 'Table column header',
	'contest-contestant-wmf' => 'Table column header',
	'contest-contestant-no' => 'Table cell value',
	'contest-contestant-yes' => 'Table cell value',
	'contest-contestant-commentcount' => 'Table column header',
	'contest-contestant-overallrating' => 'Table column header',
	'contest-contestant-rating' => '$1 is the avarage rating, $2 is the amount of votes',

	// Special:Contestant
	'contest-contestant-title' => 'Page title with contestant id $1 and contest name $2',
	'contest-contestant-header-id' => 'Table row header',
	'contest-contestant-header-contest' => 'Table row header',
	'contest-contestant-header-challenge' => 'Table row header',
	'contest-contestant-header-submission' => 'Table row header',
	'contest-contestant-header-country' => 'Table row header',
	'contest-contestant-header-wmf' => 'Table row header',
	'contest-contestant-header-volunteer' => 'Table row header',
	'contest-contestant-header-rating' => 'Table row header',
	'contest-contestant-header-comments' => 'Table row header',
	'contest-contestant-submission-url' => 'Text for the link to the submission',
	'contest-contestant-comments' => 'Page header (h2)',
	'contest-contestant-submit' => 'Submit button text',
	'contest-contestant-comment-by' => '$1 the user name, linked to the user page, followed by talk, contrib and block links',
	'contest-contestant-rate' => 'Page header (h2)',
	'contest-contestant-voted' => '$1 is an integer',
	'contest-contestant-permalink' => 'Hover-text for comment permalinks',

	// Emails
	'contest-email-signup-title' => 'Title for signup emails',
	'contest-email-reminder-title' => 'Title for reminder emails',

	// Special:MyContests
	'contest-mycontests-toplink' => 'Text for link in the top menue (ie where watchlist and preferences are linked)',
	'contest-mycontests-no-contests' => 'Message indicating there are no contests for the user, displayed instead of a list.',
	'contest-mycontests-active-header' => 'Page header (h2)',
	'contest-mycontests-finished-header' => 'Page header (h2)',
);
