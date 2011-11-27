<?php

/**
 * Main entry point for the Semantic Web Browser extension.
 * @author Anna Kantorovitch and Benedikt Kämpgen
 *  @file SemanticWebBrowser.php
 * @ingroup SWB
 */


require_once dirname( __FILE__ ) . '/SWB_Settings.php';

/**
 * Global functions used for setting up the Semantic WebBrowser extension.
 *
 */
// include for toolbox
global  $swbgToolboxBrowseSemWeb, $wgHooks, $wgAutoloadClasses, $swbgIP,
        $wgFooterIcons, $wgExtensionFunctions, $wgSpecialPageGroups,
		$wgExtensionMessagesFiles, $wgExtensionAliasesFiles, $wgSpecialPages,
		$smwgNamespace, $wgServer, $wgAPIModules, $wgExtensionAliasesFiles;

$wgExtensionMessagesFiles['SemanticWebBrowser'] = $swbgIP . 'SemanticWebBrowser.i18n.php'; // register messages (requires MW=>1.11)

// Register special pages aliases file
$wgExtensionAliasesFiles['SemanticWebBrowser']  = $swbgIP . 'SemanticWebBrowser.alias.php';

/*
 * create Special Page for Browse Wiki
 */
$wgAutoloadClasses['SWBSpecialBrowseWiki']      = $swbgIP . 'specials/SearchTriple/SWB_SpecialBrowseWiki.php';
$wgSpecialPages['BrowseWiki']                   = 'SWBSpecialBrowseWiki';
$wgSpecialPageGroups['BrowseWiki']              = 'smw_group';

// InfoLink
$wgAutoloadClasses['SWBInfolink']               = $swbgIP . 'includes/SWB_Infolink.php';

// Data values
$wgAutoloadClasses['SWBResolvableUriValue']     = $swbgIP . 'includes/datavalues/SWBResolvableUriValue.php';

// SWB Search
$wgAutoloadClasses['SWBSearch']                 = $swbgIP . 'includes/SWB_Search.php';

$wgHooks['smwInitProperties'][] = 'registerPropertyTypes';



function registerPropertyTypes() {
	// 5 means uri
	SMWDataValueFactory::registerDatatype( "_rur",
	                                       "SWBResolvableUriValue",
	                                       SMWDataItem::TYPE_URI,
	                                       $label = false );

	return true;
}

/**include in toolbox for show the last article in "Browsing Semantic Web"
 *has the same functionality as 'Browse properties' in the toolbox
**/

if ( $swbgToolboxBrowseSemWeb ) {
		$wgHooks['SkinTemplateToolboxEnd'][] = 'swbfShowBrowseSemWeb';
}


 function swbfShowBrowseSemWeb( $skintemplate ) {
	if ( $skintemplate -> data['isarticle'] ) {
		smwfLoadExtensionMessages( 'SemanticWebBrowser' );
		$browselink = SWBInfolink::newBrowsingLink( wfMsg( 'swb_browse_semantic_web' ),
						$skintemplate->data['titleprefixeddbkey'], false );

		echo '<li id="t-smwbrowselink">' . $browselink->getHTML() . '</li>';

	}
	return true;
 }

