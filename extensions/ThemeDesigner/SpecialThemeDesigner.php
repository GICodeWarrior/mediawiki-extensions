<?php
/**
 * Special:ThemeDesigner implementation for extension ThemeDesigner
 *
 * @file
 * @ingroup Extensions
 */

if( !defined( 'MEDIAWIKI' ) ) {
	die( 'This is an extension to the MediaWiki package and cannot be run standalone.' );
}

class SpecialThemeDesigner extends SpecialPage {
	
	public function __construct() {
		parent::__construct( 'ThemeDesigner' );
	}
	
	/**
	 * Show the special page
	 *
	 * @param $par String: name of the user to sudo into
	 */
	public function execute( $par ) {
		global $wgOut, $wgExtensionAssetsPath;
		
		$this->mSkin = Skin::newFromKey( 'simple' );
		
		$this->setHeaders();
		
		if ( function_exists("OutputPage::includeJQuery") ) {
			$wgOut->includeJQuery();
		}
		
		$wgOut->addExtensionStyle("$wgExtensionAssetsPath/ThemeDesigner/frame/style/main.css");
		// Yes, the following is ugly... though I still haven't decided if I want to become completely ResourceLoader dependant
		// While 1.16 is still stable.
		$varScript = array();
		foreach ( array('leavewarning', 'resizertext') as $msgName ) {
			$varScript[] = 'msg'.ucfirst($msgName).' = '.Xml::encodeJsVar((string)wfMsg("themedesigner-{$msgName}"));
		}
		$varScript = 'var '.implode(", ", $varScript).';';
		$wgOut->addInlineScript($varScript);
		$wgOut->addScriptFile("$wgExtensionAssetsPath/ThemeDesigner/frame/designer.js");
		
		$this->printHtmlHead();
		
		// We've collected our html building into a separate file for readability
		require(dirname(__FILE__).'/frame/layout.php');
		
		echo $this->mSkin->bottomScripts( $wgOut );
		echo Html::closeElement('body');
		echo Html::closeElement('html');
		
	}
	
	/**
	 * Prints a raw html header for our page complete takeover specialpage
	 * Note that this matches most of the functionality of OutputPage::headElement
	 * however that method ads extra we can't have in our head so we have to reimplement
	 */
	function printHtmlHead() {
		global $wgOut, $wgHtml5, $wgMimeType, $wgOutputEncoding;
		echo Html::htmlHeader( array( 'lang' => wfUILang()->getCode() ) );
		if ( $wgOut->getHTMLTitle() == '' ) {
			$wgOut->setHTMLTitle( wfMsg( 'pagetitle', $wgOut->getPageTitle() ) );
		}
		$openHead = Html::openElement( 'head' );
		if ( $openHead ) {
			echo "$openHead\n";
		}
		
		if ( $wgHtml5 ) {
			# More succinct than <meta http-equiv=Content-Type>, has the
			# same effect
			echo Html::element( 'meta', array( 'charset' => $wgOutputEncoding ) ) . "\n";
		} else {
			$wgOut->addMeta( 'http:Content-Type', "$wgMimeType; charset=$wgOutputEncoding" );
		}
		
		echo Html::element( 'title', null, $wgOut->getHTMLTitle() ) . "\n";
		
		foreach ( $wgOut->mExtStyles as $extstyle ) {
			$wgOut->styles[$extstyle] = array();
		}
		
		echo implode( "\n", array(
			$wgOut->getHeadLinks(),
			$wgOut->buildCssLinks( $this->mSkin ),
			$wgOut->getHeadItems()
		) );
		
		$closeHead = Html::closeElement( 'head' );
		if ( $closeHead ) {
			echo "$closeHead\n";
		}
		
		$bodyAttrs = array();
		
		echo Html::openElement( 'body', $bodyAttrs ) . "\n";
		
		$wgOut->sendCacheControl();
		$wgOut->disable();
	}
	
}
