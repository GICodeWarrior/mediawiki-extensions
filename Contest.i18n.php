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
	'contest-desc' => 'Contest extension that allows users to participate in admin defined contest challanges. Via a judging interface, judges can discuss and vote on submissions.',

	// Rights
	'right-contestadmin' => 'Manage contests',
	'right-contestparticipant' => 'Participate in contests',
	'right-contestjudge' => 'Judge contest submissions',

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
	'contest-edit-exists-already' => 'Note: you are editing an already existing contest, not creating a new one.',

	// Special:ContestWelcome
	'contest-welcome-unknown' => 'There is no contest with the provided name.',

	// Special:Contest
	'contest-contest-title' => 'Contest: $1',
	'contest-contest-no-results' => 'There are no contestants to list.',
	'contest-contest-name' => 'Name',
	'contest-contest-status' => 'Status',
	'contest-contest-submissioncount' => 'Amount of participants',
	'contest-contest-contestants' => 'Contest contestants',

	// Contestant pager
	'contest-contestant-id' => 'ID',
	'contest-contestant-volunteer' => 'Interested in volunteering oportunities',
	'contest-contestant-wmf' => 'Interested in job oportunities',
	'contest-contestant-no' => 'No',
	'contest-contestant-yes' => 'Yes',
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