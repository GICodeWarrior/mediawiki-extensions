<?php
/**
 * Internationalisation for CongressLookup extension
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Ryan Kaldari
 */
$messages['en'] = array(
	'congresslookup-desc' => 'Look up congressional representatives based on a U.S. zip code',
	'congresslookup' => 'CongressLookup',
	'congresslookup-submit' => 'Submit',
	'congresslookup-submit-zip' => 'Submit zip',
	'congresslookup-phone' => 'Phone: $1',
	'congresslookup-fax' => 'Fax: $1',
	'congresslookup-contact-form' => 'Contact form',
	'congresslookup-twitter' => 'Twitter: $1',
	'congresslookup-your-reps' => 'Your Representatives:',
	'congresslookup-no-house-rep' => 'No House representative was found for your zip code.',
	'congresslookup-no-senators' => 'No senators were found for your zip code.',
	'congresslookup-report-errors' => 'Report an error',
	'congresslookup-zipcode-error' => 'Please enter your zipcode in the format "12345" or "12345-1234".',
	'congresslookup-multiple-house-reps' => 'Note: In some cases, there is more than one representative district assigned to a particular zip code. Please select the representative appropriate for your particular district.',
	'congressfail' => 'CongressFail',
);

/** Message documentation (Message documentation)
 * @author Ryan Kaldari
 */
$messages['qqq'] = array(
	'congresslookup-desc' => '{{desc}}',
	'congresslookup' => 'The name of the extension CongressLookup.',
	'congresslookup-submit' => 'Submit button',
	'congresslookup-submit-zip' => 'Submit button',
	'congresslookup-phone' => 'Phone number listing. $1 is the phone number.',
	'congresslookup-fax' => 'Fax number listing. $1 is the fax number.',
	'congresslookup-contact-form' => "Label for a link to the representative's contact form",
	'congresslookup-twitter' => 'Twitter ID listing. $1 is the ID.',
	'congresslookup-your-reps' => 'Label for data. Should be short.',
	'congresslookup-no-house-rep' => 'Error message for when no House representative is found',
	'congresslookup-no-senators' => 'Error message for when no Senators are found',
	'congresslookup-report-errors' => 'Label for a link to the error reporting page',
	'congresslookup-zipcode-error' => 'Error message for when an invalid zip code is entered to the form.',
	'congresslookup-multiple-house-reps' => 'A note for people who see more than one representative listed for them. Many folks would find this unusual, but we are not looking up representatives at a granular-enough level to necessarily return their one specific rep. So in the event that there are more than one representatives returned to the user, we explain why.',
	'congressfail' => 'Title of secondary special page where one can report data errors',
);
