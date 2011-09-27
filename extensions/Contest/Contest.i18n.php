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
	'contest-desc' => '',

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

	// Special:EditContest
	'editcontest-text' => 'You are editing a contest.',
	'editcontest-legend' => 'Contest',
	'contest-edit-name' => 'Contest name',
	'contest-edit-status' => 'Contest status',
);

/** Message documentation (Message documentation)
 * @author Jeroen De Dauw
 */
$messages['qqq'] = array(
	'contest-special-name' => 'table header',
	'contest-special-status' => 'table header',
	'contest-special-submissioncount' => 'table header',
	'contest-special-edit' => 'table header',
	'contest-special-delete' => 'table header',

	'contest-edit-name' => 'form field label',
	'contest-edit-status' => 'form field label',
);