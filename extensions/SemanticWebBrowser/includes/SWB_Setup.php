<?php

/**
 * Global functions used for setting up the Semantic WebBrowser extension.
 * @author Benedikt K�mpgen and Anna Kantorovitch
 * @file SWB_Setup.php
 * @ingroup SWB
 */
//include for toolbox
global  $swbgToolboxBrowseSemWeb;

$wgExtensionMessagesFiles['SemanticWebBrowser'] = $swbgIP . 'languages/SWB_Messages.php'; // register messages (requires MW=>1.11)

// Register special pages aliases file
$wgExtensionAliasesFiles['SemanticWebBrowser'] = $swbgIP . 'languages/SWB_Aliases.php';

/**
 * create Special Page for Browse Wiki
 */
$wgAutoloadClasses['SWBSpecialBrowseWiki']    = $swbgIP . 'specials/SearchTriple/SWB_SpecialBrowseWiki.php';
$wgSpecialPages['BrowseWiki']                 = 'SWBSpecialBrowseWiki';
$wgSpecialPageGroups['BrowseWiki']            = 'smw_group';

// InfoLink
$wgAutoloadClasses['SWBInfolink']               = $swbgIP . 'includes/SWB_Infolink.php';

// Data values
$wgAutoloadClasses['SWBResolvableUriValue']   = $swbgIP . 'includes/datavalues/SWBResolvableUriValue.php';

$wgHooks['smwInitProperties'][] = 'registerPropertyTypes';


function registerPropertyTypes() {
	// 5 means uri
	SMWDataValueFactory::registerDatatype( "_rur", "SWBResolvableUriValue", SMWDataItem::TYPE_URI, $label = false );

	return true;
}

//include in toolbox direcly link to Browsing Semantic Web

if ( $swbgToolboxBrowseSemWeb ) {
	$wgHooks['SkinTemplateToolboxEnd'][] = 'swbfShowBrowseSemWeb';
}

/**
 * Add a link to the toolbox to view the properties of the current page in
 * Special:Browse. The links has the CSS id "t-swbbrowsesemweb" so that it can be
 * skinned or hidden with all standard mechanisms (also by individual users
 * with custom CSS).
 */
function swbfShowBrowseSemWeb( $skintemplate ) {
	if ( $skintemplate->data['isarticle'] ) {
		smwfLoadExtensionMessages( 'SemanticWebBrowser' );

		$browsesemweb = SWBInfolink::newBrowsingSemWeb( wfMsg( 'swb_browse_semantic_web' ),
		$skintemplate->data['titleprefixeddbkey'], false );
		echo '<li id="t-swbbrowsesemweb">' . $browsesemweb->getHTML() . '</li>';
	}
	return true;
}

