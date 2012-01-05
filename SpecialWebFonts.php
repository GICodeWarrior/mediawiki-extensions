<?php
/**
 * Contains logic for special page Special:WebFonts
 *
 * @file
 * @author Santhosh Thottingal
 * @copyright Copyright © 2012 Santhosh Thottingal
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

class SpecialWebFonts extends SpecialPage {
	public function __construct() {
		parent::__construct( 'WebFonts' );
	}

	public function execute( $params ) {
		global $wgOut, $wgLang;
		$this->out = $wgOut;
		$this->lang = $wgLang->getCode();
		if ( isset( $params ) ) {
			$this->lang = $params;
		}
		$wgOut->addModules( 'ext.webfonts.preview' );
		$this->setHeaders();
		$this->out->setPageTitle( wfMsg( 'webfonts' ) );
		$this->out->addWikiMsg( 'webfonts-preview-intro' );
		$this->showPreviewForm();
	}

	protected function showPreviewForm() {
		$this->out->addHtml( Html::openElement( 'h2' )
			. wfMsg( 'webfonts-preview-title' )
			. Html::closeElement( 'h2' ) );

		$this->out->addHtml( $this->showToolbar() );

		$editArea = Html::openElement( 'div', array( 'id' => 'webfonts-preview-area' , 'contenteditable' => 'true' ) )
			. wfMsg( 'webfonts-preview-sampltext' )
			. Html::closeElement( 'div' );
		$this->out->addHtml( $editArea );

		$this->out->addHtml( Html::openElement( 'h2' )
			. wfMsg( 'webfonts-preview-installing-fonts-title' )
			. Html::closeElement( 'h2' ) );
		$this->out->addWikiMsg( 'webfonts-preview-installing-fonts-text' );
	}

	protected function showToolbar() {
		$langSelector = Xml::languageSelector( $this->lang );

		$fontSelector = new XmlSelect();
		$fontSelector->setAttribute( 'id', 'webfonts-font-chooser' );

		$sizeSelector = new XmlSelect();
		$sizeSelector->setAttribute( 'id', 'webfonts-size-chooser' );
		for ( $size = 8; $size <= 28; $size += 2 ) {
			$sizeSelector->addOption( $size , $size );
		}
		$sizeSelector->setDefault( 16 );

		$bold = Html::openElement( 'button', array( 'id' => 'webfonts-preview-bold' ) ) . 'B'
			. Html::closeElement( 'button' );

		$italic = Html::openElement( 'button', array( 'id' => 'webfonts-preview-italic' ) ) . 'I'
			. Html::closeElement( 'button' );

		$underline = Html::openElement( 'button', array( 'id' => 'webfonts-preview-underline' ) ) . 'U'
			. Html::closeElement( 'button' );

		$download  = Html::openElement( 'a', array( 'id' => 'webfonts-preview-download', 'href' => '#' ) )
			. wfMsg( 'webfonts-preview-download' ) . Html::closeElement( 'a' );

		return Html::openElement( 'div', array( 'id' => 'webfonts-preview-toolbar' ) )
			. $langSelector[1]
			. $fontSelector->getHtml()
			. $sizeSelector->getHtml()
			. $bold
			. $italic
			. $underline
			. $download
			. Html::closeElement( 'div' );
	}
}
