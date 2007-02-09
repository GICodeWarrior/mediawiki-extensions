<?php

# Make an HTML table showing all the wikis on the site

# Not a valid entry point, skip unless MEDIAWIKI is defined
if (!defined('MEDIAWIKI')) {
	echo "This file is part of MediaWiki, it is not a valid entry point.\n";
	exit(1);
}

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'SiteMatrix',
	'description' => 'display a list of wikimedia wikis'
);

# Internationalisation file
require_once( dirname(__FILE__) . '/SiteMatrix.i18n.php' );

if ( !function_exists( 'extAddSpecialPage' ) ) {
	require( dirname(__FILE__) . '/../ExtensionFunctions.php' );
}
extAddSpecialPage( dirname(__FILE__) . '/SiteMatrix_body.php', 'SiteMatrix', 'SiteMatrixPage' );
?>
