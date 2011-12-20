<?php
/**
 * Internationalisation file for MarkAsHelpful extension.
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Rob Moen
 */
$messages['en'] = array(
	'markashelpful-desc' => 'Provides a user interface to mark comments as helpful',
	'mah-mark-text' => 'Mark this as helpful',
	'mah-you-marked-text' => 'You think this is helpful',
	'mah-someone-marked-text' => '$1 thinks this is helpful',
	'mah-undo-mark-text' => 'undo',
);

/** Message documentation (Message documentation)
 * @author Rob Moen
 */
$messages['qqq'] = array(
	'markashelpful-desc' => '{{desc}}
This is a feature in development. See [[mw:MarkAsHelpful]] for background information.',
	'mah-mark-text' => 'Text to prompt the user to mark this item as helpful',
	'mah-you-marked-text' => 'Text displayed to the logged in user if they mark an item helpful',
	'mah-someone-marked-text' => 'Text displayed as to who marked this is helpful, shown if not the user who marked {$1 is the username}',
	'mah-undo-mark-text' => 'Text for the the undo mark link',	
);
