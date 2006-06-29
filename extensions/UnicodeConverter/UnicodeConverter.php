<?php

# This is a simple example of a special page module
# Given a string in UTF-8, it converts it to HTML entities suitable for 
# an ISO 8859-1 web page.

# Not a valid entry point, skip unless MEDIAWIKI is defined
if (!defined('MEDIAWIKI')) {
	echo "Unicode Converter extension";
	exit( 1 );
}

if ( !function_exists( 'extAddSpecialPage' ) ) {
	require( dirname(__FILE__) . '/../ExtensionFunctions.php' );
}
extAddSpecialPage( dirname(__FILE__) . '/UnicodeConverter_body.php', 'UnicodeConverter', 'UnicodeConverter' );

?>
