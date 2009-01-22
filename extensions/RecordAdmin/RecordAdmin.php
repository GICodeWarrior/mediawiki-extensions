<?php
if ( !defined( 'MEDIAWIKI' ) ) die( 'Not an entry point.' );
/**
 * Extension:RecordAdmin - MediaWiki extension
 * {{Category:Extensions|RecordAdmin}}{{php}}{{Category:Extensions created with Template:SpecialPage}}
 * @package MediaWiki
 * @subpackage Extensions
 * @author Aran Dunkley [http://www.organicdesign.co.nz/nad User:Nad]
 * @author Bertrand GRONDIN
 * @author Siebrand Mazeland
 * @licence GNU General Public Licence 2.0 or later
 */

define( 'RECORDADMIN_VERSION', '0.5.0, 2009-01-22' );

$wgRecordAdminUseNamespaces = false;     # Whether record articles should be in a namespace of the same name as their type

$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['RecordAdmin'] = $dir . 'RecordAdmin.i18n.php';
$wgExtensionAliasesFiles['RecordAdmin']  = $dir . 'RecordAdmin.alias.php';
$wgAutoloadClasses['SpecialRecordAdmin'] = $dir . 'RecordAdmin_body.php';
$wgSpecialPages['RecordAdmin']           = 'SpecialRecordAdmin';
$wgSpecialPageGroups['RecordAdmin']      = 'wiki';
$wgRecordAdminMagic                      = 'recordtable';
$wgRecordAdminTag                        = 'recordid';

$wgGroupPermissions['sysop']['recordadmin'] = true;
$wgAvailableRights[] = 'recordadmin';

$wgExtensionFunctions[] = 'wfSetupRecordAdmin';
$wgHooks['LanguageGetMagic'][] = 'wfRecordAdminLanguageGetMagic';

$wgExtensionCredits['specialpage'][] = array(
	'name'           => 'Record administration',
	'author'         => array( '[http://www.organicdesign.co.nz/nad User:Nad]', 'Bertrand GRONDIN', 'Siebrand Mazeland' ),
	'description'    => 'A special page for finding and editing record articles using a form',
	'descriptionmsg' => 'recordadmin-desc',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:RecordAdmin',
	'version'        => RECORDADMIN_VERSION,
);

/**
 * Called from $wgExtensionFunctions array when initialising extensions
 */
function wfSetupRecordAdmin() {
	global $wgSpecialRecordAdmin, $wgParser, $wgRequest, $wgRecordAdminTag, $wgRecordAdminMagic;

	# Make a global singleton so methods are accessible as callbacks etc
	$wgSpecialRecordAdmin = new SpecialRecordAdmin();

	# Make recordID's of articles created with public forms available via recordid tag
	$wgParser->setHook( $wgRecordAdminTag, array( $wgSpecialRecordAdmin, 'expandTag' ) );

	# Add the parser-function
	$wgParser->setFunctionHook( $wgRecordAdminMagic, array( $wgSpecialRecordAdmin, 'expandMagic' ) );

	# Check if posting a public creation form
	$title = Title::newFromText( $wgRequest->getText( 'title' ) );
	if ( is_object( $title ) && $title->getNamespace() != NS_SPECIAL && $wgRequest->getText( 'wpType' ) && $wgRequest->getText( 'wpCreate' ) )
		$wgSpecialRecordAdmin->createRecord();
}

/**
 * Setup parser-function magic
 */
function wfRecordAdminLanguageGetMagic(&$magicWords, $langCode = 0) {
	global $wgRecordAdminMagic;
	$magicWords[$wgRecordAdminMagic] = array($langCode, $wgRecordAdminMagic);
	return true;
}
