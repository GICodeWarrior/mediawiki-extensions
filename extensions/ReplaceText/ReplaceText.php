<?php
/**
 * Replace Text - a MediaWiki extension that provides a special page to
 * allow administrators to do a global string find-and-replace on all the
 * content pages of a wiki.
 *
 * http://www.mediawiki.org/wiki/Extension:Replace_Text
 *
 * The special page created is 'Special:ReplaceText', and it provides
 * a form to do a global search-and-replace, with the changes to every
 * page showing up as a wiki edit, with the administrator who performed
 * the replacement as the user, and an edit summary that looks like
 * "Text replace: 'search string' * to 'replacement string'".
 *
 * If the replacement string is blank, or is already found in the wiki,
 * the page provides a warning prompt to the user before doing the
 * replacement, since it is not easily reversible.
 *
 * @author Yaron Koren
 */

if ( !defined( 'MEDIAWIKI' ) ) die();

// credits
$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'Replace Text',
	'version' => '0.5.0',
	'author' => array( 'Yaron Koren', 'Niklas Laxström' ),
	'url' => 'http://www.mediawiki.org/wiki/Extension:Replace_Text',
	'description' => 'A special page that lets administrators run a global search-and-replace',
	'descriptionmsg'  => 'replacetext-desc',
);

$rtgIP = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['ReplaceText'] = $rtgIP . 'ReplaceText.i18n.php';
$wgExtensionAliasesFiles['ReplaceText'] = $rtgIP . 'ReplaceText.alias.php';
$wgJobClasses['replaceText'] = 'ReplaceTextJob';
$wgAvailableRights[] = 'replacetext';

// This extension uses its own permission type, 'replacetext'
$wgSpecialPages['ReplaceText'] = 'ReplaceText';
$wgSpecialPageGroups['ReplaceText'] = 'wiki';
$wgAutoloadClasses['ReplaceText'] = $rtgIP . 'SpecialReplaceText.php';
$wgAutoloadClasses['ReplaceTextJob'] = $rtgIP . 'ReplaceTextJob.php';
