<?php
# localFileLink MediaWiki Extention
# Created by  Doru Moisa, Optaros Inc.
#

$wgExtensionCredits['other'][] = array(
	'name' => 'LocalFileLink',
	'author' => 'Moisa Doru (tmoisa@optaros.com), Optaros Inc.',
	'version' => preg_replace('/^.* (\d\d\d\d-\d\d-\d\d) .*$/', '\1', '$LastChangedDate$'), #just the date of the last change
	'description' => 'Allows the usage of local file links with FCKEditor',
);

function lflAddLocalFileLinks(&$out) {
    
    $text = $out->mBodytext;
    
    $search         = '/\[(file\:\/{2,5}[a-zA-Z]{0,1}[\:]{0,1}\S*)\s*([^\]]*)\]/';
    $replace        = '<a href="$1" class="link-ftp">$2</a>';

    $text = preg_replace($search, $replace, $text);
    
    $out->mBodytext = $text;

    return true;
} 

function lflAjaxAddLocalFileLinks(&$parser, &$text) {
    
    $search         = '/\[(file\:\/{2,5}[a-zA-Z]{0,1}[\:]{0,1}\S*)\s*([^\]]*)\]/';
    $replace        = '<a href="$1" class="link-ftp">$2</a>';

    $text = preg_replace($search, $replace, $text);
    
    return true;
} 



if ( isset($_REQUEST['rs']) ) {
    $wgHooks['ParserBeforeTidy'][] = 'lflAjaxAddLocalFileLinks';
}
else {
    $wgHooks['BeforePageDisplay'][] = 'lflAddLocalFileLinks';
}

?>
