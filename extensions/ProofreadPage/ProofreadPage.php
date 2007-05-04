<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "ProofreadPage extension\n" );
}

$wgHooks['OutputPageParserOutput'][] = 'wfProofreadPageParserOutput';
$wgHooks['LoadAllMessages'][] = 'wfProofreadPageLoadMessages';

$wgExtensionCredits['parserhook'][] = array(
	'name' => 'ProofreadPage',
	'author' => 'ThomasV'
);



/**
 * 
 * Query the database to find if the current page is referred in an
 * Index page. If yes, return the URLs of the index, previous and next pages.
 * 
 */

function wfProofreadPageNavigation() {
	global $wgTitle, $wgExtraNamespaces;
	$index_namespace = preg_quote( wfMsgForContent( 'proofreadpage_index_namespace' ), '/' );
	$err = array( '', '', '' );

	$dbr = wfGetDB( DB_SLAVE );
	$result = $dbr->select(
			array( 'page', 'pagelinks' ),
			array( 'page_namespace', 'page_title' ),
			array(
				'pl_namespace' => $wgTitle->getNamespace(),
				'pl_title' => $wgTitle->getDBkey(),
				'pl_from=page_id'
			),
			__METHOD__);
	while( $x = $dbr->fetchObject( $result ) ) {
		$ref_title = Title::makeTitle( $x->page_namespace, $x->page_title );
		if( preg_match( "/^$index_namespace:(.*)$/", $ref_title->getPrefixedText() ) ) {
			break;
		}
	}
	if( !$x ) {
		return $err;
	}
	$dbr->freeResult( $result ) ;

	$index_title = $ref_title;
	$index_url = $index_title->getFullURL();
	$rev = Revision::newFromTitle( $index_title );
	$text =	$rev->getText();

	$page_namespace = preg_quote( wfMsgForContent( 'proofreadpage_namespace' ), '/' );
	$tag_pattern = "/\[\[($page_namespace:.*?)(\|.*?|)\]\]/i";
	preg_match_all( $tag_pattern, $text, $links, PREG_PATTERN_ORDER );

	for( $i=0; $i<count( $links[1] ); $i++) { 
		$a_title = Title::newFromText( $links[1][$i] );
		if(!$a_title) continue; 
		if( $a_title->getPrefixedText() == $wgTitle->getPrefixedText() ) break;
	}
	if( ($i>0) && ($i<count($links[1])) ){
		$prev_title = Title::newFromText( $links[1][$i-1] );
		if(!$prev_title) return $err; 
		$prev_url = $prev_title->getFullURL();
	}
	else $prev_url = '';
	if( ($i>=0) && ($i+1<count($links[1])) ){
		$next_title = Title::newFromText( $links[1][$i+1] );
		if(!$next_title) return $err; 
		$next_url = $next_title->getFullURL();
	} 
	else $next_url = '';

	return array( $index_url, $prev_url, $next_url );

}


/**
 * 
 * Append javascript variables and code to the page.
 * 
 */

function wfProofreadPageParserOutput( &$out, &$pout ) {
	global $wgTitle, $wgJsMimeType, $wgScriptPath,  $wgRequest;

	wfProofreadPageLoadMessages();
	$action = $wgRequest->getVal('action');
	$isEdit = ( $action == 'submit' || $action == 'edit' ) ? 1 : 0;
	if ( !isset( $wgTitle ) || ( !$out->isArticle() && !$isEdit ) || isset( $out->proofreadPageDone ) ) {
		return true;
	}
	$out->proofreadPageDone = true;

	$page_namespace = preg_quote( wfMsgForContent( 'proofreadpage_namespace' ), '/' );
	if ( !preg_match( "/^$page_namespace:(.*?)(\/([0-9]*)|)$/", $wgTitle->getPrefixedText(), $m ) ) {
		return true;
	}

	list($index_url,$prev_url,$next_url ) = wfProofreadPageNavigation();

	$imageTitle = Title::makeTitleSafe( NS_IMAGE, $m[1] );
	if ( !$imageTitle ) {
		return true;
	}

	$image = new Image( $imageTitle );
	if ( $image->exists() ) {
		$width = intval( $image->getWidth() );
		$height = intval( $image->getHeight() );
		if($m[2]) { 
			$viewName = $image->thumbName( array( 'width' => $width, 'page' => $m[3] ) );
			$viewURL = $image->thumbUrlFromName( $viewName );

			$thumbName = $image->thumbName( array( 'width' => '##WIDTH##', 'page' => $m[3] ) );
			$thumbURL = $image->thumbUrlFromName( $thumbName );
		}
		else {
			$viewURL = Xml::escapeJsString(	$image->getViewURL() );
			list( $isScript, $thumbURL ) = $image->thumbUrl( '##WIDTH##' );
		}
		$thumbURL = Xml::escapeJsString( str_replace( '%23', '#', $thumbURL ) );
	} 
	else {	
		$width = 0;
		$height = 0;
		$viewURL = '';
		$thumbURL = '';
	}

	$jsFile = htmlspecialchars( "$wgScriptPath/extensions/ProofreadPage/proofread.js" );

	$out->addScript( <<<EOT
<script type="$wgJsMimeType">
var proofreadPageWidth = $width;
var proofreadPageHeight = $height;
var proofreadPageViewURL = "$viewURL";
var proofreadPageThumbURL = "$thumbURL";
var proofreadPageIsEdit = $isEdit;
var proofreadPageIndexURL = "$index_url";
var proofreadPagePrevURL = "$prev_url";
var proofreadPageNextURL = "$next_url";
</script>
<script type="$wgJsMimeType" src="$jsFile"></script>

EOT
	);
	return true;
}

function wfProofreadPageLoadMessages() {
	global $wgMessageCache;
	static $done = false;
	if ( $done ) return;

	require( dirname( __FILE__ ) . '/ProofreadPage.i18n.php' );
	foreach ( $messages as $lang => $messagesForLang ) {
		$wgMessageCache->addMessages( $messagesForLang, $lang );
	}
}

?>
