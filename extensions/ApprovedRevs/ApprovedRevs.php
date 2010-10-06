<?php

if ( !defined( 'MEDIAWIKI' ) ) die();

/**
 * @file
 * @ingroup Extensions
 *
 * @author Yaron Koren
 */

define( 'APPROVED_REVS_VERSION', '0.4' );

// credits
$wgExtensionCredits['other'][] = array(
	'path'            => __FILE__,
	'name'            => 'Approved Revs',
	'version'         => APPROVED_REVS_VERSION,
	'author'          => 'Yaron Koren',
	'url'             => 'http://www.mediawiki.org/wiki/Extension:Approved_Revs',
	'descriptionmsg'  => 'approvedrevs-desc'
);

// global variables
$egApprovedRevsIP = dirname( __FILE__ ) . '/';
$egApprovedRevsNamespaces = array( NS_MAIN, NS_TEMPLATE, NS_HELP, NS_PROJECT );
$egApprovedRevsBlankIfUnapproved = false;

// internationalization
$wgExtensionMessagesFiles['ApprovedRevs'] = $egApprovedRevsIP . 'ApprovedRevs.i18n.php';
$wgExtensionAliasesFiles['ApprovedRevs'] = $egApprovedRevsIP . 'ApprovedRevs.alias.php';

// register all classes
$wgAutoloadClasses['ApprovedRevs'] = $egApprovedRevsIP . 'ApprovedRevs_body.php';
$wgAutoloadClasses['ApprovedRevsHooks'] = $egApprovedRevsIP . 'ApprovedRevs.hooks.php';
$wgSpecialPages['ApprovedPages'] = 'ARApprovedPages';
$wgAutoloadClasses['ARApprovedPages'] = $egApprovedRevsIP . 'AR_ApprovedPages.php';
$wgSpecialPageGroups['ApprovedPages'] = 'pages';
$wgSpecialPages['UnapprovedPages'] = 'ARUnapprovedPages';
$wgAutoloadClasses['ARUnapprovedPages'] = $egApprovedRevsIP . 'AR_UnapprovedPages.php';
$wgSpecialPageGroups['UnapprovedPages'] = 'pages';

// hooks
$wgHooks['ParserBeforeInternalParse'][] = 'ApprovedRevsHooks::setApprovedRevForParsing';
$wgHooks['ArticleSaveComplete'][] = 'ApprovedRevsHooks::setLatestAsApproved';
$wgHooks['ArticleFromTitle'][] = 'ApprovedRevsHooks::showApprovedRevision';
$wgHooks['ArticleAfterFetchContent'][] = 'ApprovedRevsHooks::showBlankIfUnapproved';
$wgHooks['DisplayOldSubtitle'][] = 'ApprovedRevsHooks::setSubtitle';
// it's 'SkinTemplateNavigation' for the Vector skin, 'SkinTemplateTabs' for
// most other skins
$wgHooks['SkinTemplateTabs'][] = 'ApprovedRevsHooks::changeEditLink';
$wgHooks['SkinTemplateNavigation'][] = 'ApprovedRevsHooks::changeEditLinkVector';
$wgHooks['PageHistoryBeforeList'][] = 'ApprovedRevsHooks::storeApprovedRevisionForHistoryPage';
$wgHooks['PageHistoryLineEnding'][] = 'ApprovedRevsHooks::addApprovalLink';
$wgHooks['UnknownAction'][] = 'ApprovedRevsHooks::setAsApproved';
$wgHooks['UnknownAction'][] = 'ApprovedRevsHooks::unsetAsApproved';
$wgHooks['BeforeParserFetchTemplateAndtitle'][] = 'ApprovedRevsHooks::setTranscludedPageRev';
$wgHooks['ArticleDeleteComplete'][] = 'ApprovedRevsHooks::deleteRevisionApproval';
$wgHooks['MagicWordwgVariableIDs'][] = 'ApprovedRevsHooks::addMagicWordVariableIDs';
$wgHooks['LanguageGetMagic'][] = 'ApprovedRevsHooks::addMagicWordLanguage';
$wgHooks['ParserBeforeTidy'][] = 'ApprovedRevsHooks::handleMagicWords';
$wgHooks['AdminLinks'][] = 'ApprovedRevsHooks::addToAdminLinks';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'ApprovedRevsHooks::describeDBSchema';
$wgHooks['EditPage::showEditForm:initial'][] = 'ApprovedRevsHooks::addWarningToEditPage';
$wgHooks['sfHTMLBeforeForm'][] = 'ApprovedRevsHooks::addWarningToSFForm';

// logging
$wgLogTypes['approval'] = 'approval';
$wgLogNames['approval'] = 'approvedrevs-logname';
$wgLogHeaders['approval'] = 'approvedrevs-logdesc';
$wgLogActions['approval/approve'] = 'approvedrevs-approveaction';
$wgLogActions['approval/unapprove'] = 'approvedrevs-unapproveaction';

// user rights
$wgAvailableRights[] = 'approverevisions';
$wgGroupPermissions['sysop']['approverevisions'] = true;
$wgAvailableRights[] = 'viewlinktolatest';
$wgGroupPermissions['*']['viewlinktolatest'] = true;

// page properties
$wgPageProps['approvedrevs'] = 'Whether or not the page is approvable';
