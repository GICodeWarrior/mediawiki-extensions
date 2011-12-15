<?php
/**
* Internationlization file for ReassignEdits extension
*
* @package MediaWiki
* @subpackage Extensions
*
* @author: Tim 'SVG' Weyer <SVG@Wikiunity.com>
*
* @copyright Copyright (C) 2011 Tim Weyer, Wikiunity
* @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
*
*/

$messages = array();

/** English
 * @author SVG
 */
$messages['en'] = array(
	'reassignedits' => 'Reassign user edits',
	'reassignedits-desc' => 'Allows reassigning edits from an old user to a new one',
	'reassignedits-error-invalid' => 'The username "<nowiki>$1</nowiki>" is invalid.',
	'reassignedits-new' => 'New username',
	'reassignedits-old' => 'Old username',
	'reassignedits-submit' => 'Submit',
	'reassignedits-success' => 'The edits by "<nowiki>$1</nowiki>" has been added to "<nowiki>$2</nowiki>".',
	'reassignedits-summary' => 'Reassign edits from an old user to a new one.',
	'reassignedits-updatelog-title' => 'Update username in log titles',
	'reassignedits-updatelog-user' => 'Update executive user in logs',
	'right-reassignedits' => 'Reassign edits from an old user to a new one',
);

/** Message documentation (Message documentation)
 * @author SVG
 */
$messages['qqq'] = array(
	'reassignedits' => 'Name of Special:ReassignEdits in Special:SpecialPages and title of Special:ReassignEdits page',
	'reassignedits-desc' => '{{desc}}',
	'reassignedits-error-invalid' => 'Error message which will be shown if given user name is invalid',
	'reassignedits-new' => '{{msg-mw|reassignedits-new}}',
	'reassignedits-old' => '{{msg-mw|reassignedits-old}}',
	'reassignedits-submit' => '{{msg-mw|reassignedits-submit}}',
	'reassignedits-success' => 'Success message when user edits has been successfully moved from one user to another one',
	'reassignedits-summary' => 'Short summary on Special:ReassignEdits how-to-use this extensions',
	'reassignedits-updatelog-title' => 'Checkbox: {{msg-mw|reassignedits-updatelog-title}}',
	'reassignedits-updatelog-user' => 'Checkbox: {{msg-mw|reassignedits-updatelog-user}}',

	'right-reassignedits' => '{{doc-right|reassignedits}}',
);

/** German (Deutsch)
 * @author SVG
 */
$messages['de'] = array(
	'reassignedits' => 'Bearbeitungen übertragen',
	'reassignedits-desc' => 'Erlaubt das Übertragen von Bearbeitungen eines alten Benutzer zu einem neuen Benutzer',
	'reassignedits-error-invalid' => 'Der Benutzername „<nowiki>$1</nowiki>“ ist ungültig.',
	'reassignedits-new' => 'Name des neuen Benutzers',
	'reassignedits-old' => 'Name des alten Benutzers',
	'reassignedits-submit' => 'Ausführen',
	'reassignedits-success' => 'Die Bearbeitungen von Benutzer „<nowiki>$1</nowiki>“ wurden dem Benutzer „<nowiki>$2</nowiki>“ hinzugefügt.',
	'reassignedits-summary' => 'Übertrage Bearbeitungen von einem alten Benutzer einem neuen Benutzer.',
	'reassignedits-updatelog-title' => 'Erneuere den Benutzernamen in Logbuch-Titeln',
	'reassignedits-updatelog-user' => 'Ändere den Benutzernamen des ausführenden Benutzers in den Logbüchern',

	'right-reassignedits' => 'Übertragen von Bearbeitungen eines alten Benutzers zu einem neuen Benutzer',
);

