<?php

/**
 * Extension allows customising the site logo via the MediaWiki namespace
 *
 * @file
 * @ingroup Extensions
 * @author Rob Church <robchur@gmail.com>
 */
 
if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

$wgExtensionFunctions[] = 'efLogo';
$wgExtensionCredits['other'][] = array( 'name' => 'Logo', 'author' => 'Rob Church' );

function efLogo() {
	global $wgLogo, $wgLogoAutoScale;
	$msg = wfMsgForContent( 'logo' );
	if( $msg != '&lt;logo&gt;' ) {
		$title = Title::newFromText( wfMsgForContent( 'logo' ) );
		if( is_object( $title ) ) {
			if( $title->getNamespace() != NS_IMAGE )
				$title = Title::makeTitle( NS_IMAGE, $title->getText() );
			$logo = wfFindFile( $title );
			if( $logo->exists() )
				$wgLogo = $logo->createThumb( 135 );
		}
	}
}

