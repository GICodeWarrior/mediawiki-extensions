<?php
/**
 * Internationalisation for InlineCategorizer extension
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Nimish Gautam
 */
$messages['en'] = array(
	'inlinecategorizer-desc' => 'JavaScript module that enables changing, adding and removing categorylinks directly from a page.',

	// Ajax interface
	'inlinecategorizer-add-category'             => 'Add category',
	'inlinecategorizer-add-category-submit'      => 'Add',
	'inlinecategorizer-add-category-summary'     => 'Add category "$1"',
	'inlinecategorizer-api-error'                => 'The API returned an error: $1: $2.',
	'inlinecategorizer-api-unknown-error'        => 'The API returned an unknown error.',
	'inlinecategorizer-cancel'                   => 'Cancel edit',
	'inlinecategorizer-cancel-all'               => 'Cancel all changes',
	'inlinecategorizer-category-already-present' => 'This page already belongs to the category "$1"',
	'inlinecategorizer-category-hook-error'      => 'A local function prevented the changes from being saved.',
	'inlinecategorizer-category-question'        => 'Why do you want to make the following changes:',
	'inlinecategorizer-confirm-ok'               => 'OK',
	'inlinecategorizer-confirm-save'             => 'Save',
	'inlinecategorizer-confirm-save-all'         => 'Save all changes',
	'inlinecategorizer-confirm-title'            => 'Confirm action',
	'inlinecategorizer-edit-category'            => 'Edit category',
	'inlinecategorizer-edit-category-error'      => 'It was not possible to edit category "$1".
This usually occurs when the category has been added to the page in a template.',
	'inlinecategorizer-edit-category-summary'    => 'Change category "$1" to "$2"',
	'inlinecategorizer-error-title'              => 'Error',
	'inlinecategorizer-remove-category'          => 'Remove category',
	'inlinecategorizer-remove-category-error'    => 'It was not possible to remove category "$1".
This usually occurs when the category has been added to the page in a template.',
	'inlinecategorizer-remove-category-summary'  => 'Remove category "$1"',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Fryed-peach
 */
$messages['qqq'] = array(
	'inlinecategorizer-desc' => '{{desc}}',

	// Ajax interface
	'inlinecategorizer-add-category-submit'      => '{{Identical|Add}}',
	'inlinecategorizer-add-category-summary'     => 'See {{msg-mw|inlinecategorizer-category-question}}. $1 is a category name.',
	'inlinecategorizer-api-error'                => 'API = [http://en.wikipedia.org/wiki/Application_programming_interface Application programming interface].

"returned" here means "reported".',
	'inlinecategorizer-category-already-present' => 'Error message. $1 is the category name',
	'inlinecategorizer-category-question'        => "Question the user is asked before submit. It's followed by a list of the changes.",
	'inlinecategorizer-confirm-ok'               => '{{Identical|OK}}',
	'inlinecategorizer-confirm-save'             => 'Submit button {{Identical|Save}}',
	'inlinecategorizer-confirm-save-all'         => 'Submit button to save all changes',
	'inlinecategorizer-confirm-title'            => 'Title for a dialog box in which the user is asked for an edit summary',
	'inlinecategorizer-edit-category'            => 'Tooltip for the edit link displayed after each category at the foot of a page. Refers to the specific category. "Edit this category" is also correct.',
	'inlinecategorizer-edit-category-summary'    => 'See {{msg-mw|inlinecategorizer-category-question}}. $1 and $2 are both category names.',
	'inlinecategorizer-error-title'              => '{{Identical|Error}}',
	'inlinecategorizer-remove-category'          => 'Tooltip for link to remove a category from the page, displayed after each category at the foot of a page. Refers to the specific category. "Remove this category" is also correct.',
	'inlinecategorizer-remove-category-summary'  => 'See {{msg-mw|inlinecategorizer-category-question}}. $1 is a category name.',
);
