<?php
if (!defined('MEDIAWIKI')) die();
/**
 * An extension to ease the translation of Mediawiki and other projects.
 *
 * @addtogroup Extensions
 *
 * @author Niklas Laxström
 * @copyright Copyright © 2006-2008, Niklas Laxström
 * @copyright Copyright © 2007, Siebrand Mazeland
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

define( 'TRANSLATE_VERSION', '8.46' );

$wgExtensionCredits['specialpage'][] = array(
	'name'           => 'Translate',
	'version'        => TRANSLATE_VERSION,
	'author'         => array( 'Niklas Laxström', 'Siebrand Mazeland' ),
	'description'    => '[[Special:Translate|Special page]] for translating Mediawiki and beyond',
	'descriptionmsg' => 'translate-desc',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:Translate',
);

// Setup class autoloads
$dir = dirname(__FILE__) . '/';
require_once( $dir . '_autoload.php' );

$wgExtensionMessagesFiles['Translate'] = $dir . 'Translate.i18n.php';

$wgSpecialPages['Translate'] = 'SpecialTranslate';
$wgSpecialPages['Magic'] = 'SpecialMagic';
$wgSpecialPages['TranslationChanges'] = 'SpecialTranslationChanges';
$wgSpecialPageGroups['TranslationChanges'] = 'changes';

$wgHooks['EditPage::showEditForm:initial'][] = 'TranslateEditAddons::addTools';
$wgHooks['UserToggles'][] = 'TranslatePreferences::TranslateUserToggles';
$wgHooks['SpecialRecentChangesQuery'][] = 'TranslateRcFilter::translationFilter';
$wgHooks['SpecialRecentChangesPanel'][] = 'TranslateRcFilter::translationFilterForm';

$wgAvailableRights[] = 'translate';

define( 'TRANSLATE_FUZZY', '!!FUZZY!!' );
define( 'TRANSLATE_INDEXFILE', $dir . 'messageindex.ser' );
define( 'TRANSLATE_CHECKFILE', $dir . 'messagecheck.ser' );

#
# Configuration variables
#

/** Where to look for extension files */
$wgTranslateExtensionDirectory = "$IP/extensions/";

/** Which other language translations are displayed to help translator */
$wgTranslateLanguageFallbacks = array();

/** Name of the fuzzer bot */
$wgTranslateFuzzyBotName = 'FuzzyBot';

/** Address to css if non-default or false */
$wgTranslateCssLocation = $wgScriptPath . '/extensions/Translate';

/** Language code for special documentation language */
$wgTranslateDocumentationLanguageCode = false;

/**
 * Two-dimensional array of languages that cannot be translated.
 * Input can be exact group name, first part before '-' or '*' for all.
 * Second dimension should be language code mapped to reason for disabling.
 * Reason is parsed as wikitext.
 *
 * Example:
 * $wgTranslateBlacklist = array(
 *     '*' => array( // All groups
 *         'en' => 'English is the source language.',
 *     ),
 *     'core' => array( // Exact group
 *         'mul' => 'Not a real language.',
 *     ),
 *     'ext' => array( // Wildcard-like group
 *         'mul' => 'Not a real language',
 *     ),
 * );
 */

$wgTranslateBlacklist = array();

/**
 * Two-dimensional array of rules that blacklists certain authors from appearing
 * in the exports. This is useful for keeping bots and people doing maintenance
 * work in translations not to appear besides real translators everywhere.
 *
 * Rules are arrays, where first element is type: white or black. Whitelisting
 * always overrules blacklisting. Second element should be a valid pattern that
 * can be given a preg_match(). It will be matched against string of format
 * "group-id;language;author name", without quotes.
 * As an example by default we have rule that ignores all authors whose name
 * ends in a bot for all languages and all groups.
 */
$wgTranslateAuthorBlacklist = array();
$wgTranslateAuthorBlacklist[] = array( 'black', '/^.*;.*;.*Bot$/Ui' );

$wgTranslateMessageNamespaces = array( NS_MEDIAWIKI );

/** AC = Available classes */
$wgTranslateAC = array(
'core'                      => 'CoreMessageGroup',
'core-mostused'             => 'CoreMostUsedMessageGroup',
'ext-0-all'                 => 'AllMediawikiExtensionsGroup',
'ext-0-wikimedia'           => 'AllWikimediaExtensionsGroup',
'ext-0-flaggedrevs'         => 'AllFlaggedRevsExtensionsGroup',
'out-freecol'               => 'FreeColMessageGroup',
'out-word2mediawikiplus'    => 'Word2MediaWikiPlusMessageGroup',
);

$wgTranslateAddMWExtensionGroups = false;

/** EC = Enabled classes */
$wgTranslateEC = array();
$wgTranslateEC[] = 'core';

/** CC = Custom classes */
$wgTranslateCC = array();

/** Tasks */
$wgTranslateTasks = array(
	'view'           => 'ViewMessagesTask',
	'untranslated'   => 'ViewUntranslatedTask',
	'optional'       => 'ViewOptionalTask',
	'review'         => 'ReviewMessagesTask',
	'reviewall'      => 'ReviewAllMessagesTask',
	'export-as-po'   => 'ExportasPoMessagesTask',
	'export'         => 'ExportMessagesTask',
	'export-to-file' => 'ExportToFileMessagesTask',
);

if ( $wgDebugComments ) {
	require_once( "$dir/utils/MemProfile.php" );
} else {
	function wfMemIn() {}
	function wfMemOut() {}
}
