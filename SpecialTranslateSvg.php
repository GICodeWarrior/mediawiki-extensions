<?php
class SpecialTranslateSvg extends SpecialPage {
	private $svg = '';
	private $xpath = null;
	private $translations = array();
	private $number = 0;
	private $added = array();
	private $modified = array();

	function __construct() {
		parent::__construct( 'TranslateSvg' );
	}

	function execute( $par ) {
		$this->setHeaders();
		$this->outputHeader();

		$request = $this->getRequest();
		$file = !is_null( $par ) ? $par : $request->getText( 'file' );

		$title = Title::newFromText( $file, NS_FILE );

		if ( ! $title instanceof Title || $title->getNamespace() != NS_FILE ) {
			$this->showForm( $title );
		} else {
			$file = wfFindFile( $title );

			if ( $file && $file->exists() ){ 
				$this->svg = new DOMDocument( '1.0' );
				$this->svg->load( $file->getPath() );
				$this->xpath = new DOMXpath( $this->svg );
				$this->xpath->registerNamespace( 'svg', 'http://www.w3.org/2000/svg' );
				if( !$this->makeTranslationReady() ){
					die( "Could not be made translation ready." ); //TODO: internationalise.
				}
				$this->extractTranslations();
				$this->tidyTranslations();
				$params = $request->getQueryValues();
				if( count( $params ) > 2 && isset( $params['title'] ) && isset( $params['file'] ) ){
					unset( $params['title'] );
					$filename = $params['file'];
					unset( $params['file'] );
					$this->updateTranslations( $params );
					$this->updateSVG();
					$this->saveSVG( $file->getPath(), $filename );
					$file->purgeThumbnails();
				} else {
					$this->printTranslations( $file->getName() );
				}
			} else {
				$this->getOutput()->setStatusCode( 404 );
				$this->showForm( $title );
			}
		}
	}

	/**
	 * @param $title Title
	 */
	function showForm( $title ) {
		global $wgScript;

		$this->getOutput()->addHTML(
			Html::openElement( 'form', array( 'method' => 'get', 'action' => $wgScript, 'id' => 'specialtranslatesvg' ) ) .
			Html::openElement( 'fieldset' ) .
			Html::element( 'legend', null, wfMsg( 'translatesvg-legend' ) ) .
			Html::hidden( 'title', $this->getTitle()->getPrefixedText() ) .
			Xml::inputLabel( wfMsg( 'translatesvg-page' ), 'file', 'file', 25, is_object( $title ) ? $title->getText() : '' ) . ' ' .
			Xml::submitButton( wfMsg( 'translatesvg-submit' ) ) . "\n" .
			Html::closeElement( 'fieldset' ) .
			Html::closeElement( 'form' )
		);
	}
	function makeTranslationReady() {
		$texts = $this->svg->getElementsByTagName( "text" );
		$length = $texts->length;
		for( $i = 0; $i < $length; $i++){
			$text = $texts->item( $i );
			$ancestorswitches = $this->xpath->query( "ancestor::svg:switch", $text );
			if( $ancestorswitches->length == 0 ){
				$switch = $this->svg->createElement( 'switch' );
				$text->parentNode->appendChild( $switch );
				$switch->appendChild( $text ); //Move node into sibling <switch> element
			} else {
				if( $text->parentNode->nodeName !== "switch" ){
					return false; //Deep heirarchies cause us problems later
				}
			}
			if( $text->childNodes->length > 1 ){
				return false; //Complex use of <tspan>s not yet supported.
			}
			if( $text->childNodes->length === 1 && $text->childNodes->item( 0 )->nodeType !== 3 ){
				$child = $text->childNodes->item( 0 );
				if( $child->nodeName === 'tspan'
					&& $child->childNodes->length === 1
					&& $child->childNodes->item( 0 )->nodeType === 3
					&& $this->svg->getElementsByTagName( 'style' )->length === 0 )
				{
					//Repair by trimming excess <tspan>s
					$attrs = ( $child->hasAttributes() ) ? $child->attributes : array();
					foreach ($attrs as $num => $attr){
						$text->setAttribute( $attr->name, $attr->value );
					}
					$text->appendChild( $child->childNodes->item( 0 ) );
					$text->removeChild( $child );
				} else {
					return false;
				}
			}
		}
		return true;
	}
	function extractTranslations(){
		$switches = $this->svg->getElementsByTagName( "switch" );
		$this->number = $switches->length;
		for( $i = 0; $i < $this->number; $i++ ){
			$switch = $switches->item( $i );
			$texts = $switch->getElementsByTagName( "text" );
			$count = $texts->length;
			for( $j = 0; $j < $count; $j++ ){
				$text = $texts->item( $j );
				$attributes = array( 'text' => $text->textContent );
				$attrs = ( $text->hasAttributes() ) ? $text->attributes : array();
				foreach ($attrs as $num => $attr){
					$attributes[$attr->name] = $attr->value;
				}
				$this->translations [ $i ][] = $attributes;
			}
		}
	}

	function tidyTranslations(){
		$new = array();
		foreach( $this->translations as $number=>$translations ){
			foreach( $translations as $translation ){
				if( isset( $translation['systemLanguage'] ) ){
					$language = $translation['systemLanguage'];
					unset( $translation['systemLanguage'] );
				} else {
					$language='fallback';
				}
				$new[ $language ][ $number ] = $translation;
			}
		}
		if( !isset( $new['qqq'] ) ){
			$new['qqq'] = array();
		}
		$this->translations = $new;
	}

	function printTranslations( $filename ){
		global $wgScript;
		$this->getOutput()->addModules( 'ext.translateSvg' );
		$html = Html::openElement( 'form', array( 'method' => 'get', 'action' => $wgScript, 'id' => 'specialtranslatesvg' ) ) .
			Html::hidden( 'file', $filename ) .
			Html::hidden( 'title', $this->getTitle()->getPrefixedText() );

		foreach( $this->translations as $language=>$translations ){
			$languages = Language::getLanguageNames();
			$languages['fallback'] = wfMsg( 'translatesvg-fallbackdesc');
			$languages['qqq'] = wfMsg( 'translatesvg-qqqdesc' );

			$html .= Html::openElement( 'fieldset', array( 'id' => $language ) ) .
					Html::element( 'legend', null, $languages[$language] );
			$groups = array();
			for( $i = 0; $i < $this->number; $i++ ){
				$fallback = $this->getFallback( $i );
				$existing = $this->getExisting( $i, $language );
				$desc = ( $language === 'qqq' ) ? '' : '&#160;' . Html::element( 'small', null, $this->getDescriptor( $i ) );
				list( $label, $input ) = Xml::inputLabelSep( $fallback['text'], $language.'-'.$i.'-text', $language.'-'.$i.'-text', 50, $existing['text'] );
				$grouphtml = $label . $desc . '&#160;&#160;&#160;' . $input;
				if( $language !== 'qqq' ){
					$grouphtml .= Html::element( 'br' ) .
							"&#160;&#160;&#160;" . Xml::inputLabel( wfMsg( 'translatesvg-xcoordinate-pre' ), $language.'-'.$i.'-x', $language.'-'.$i.'-x', 5, $existing['x'] ) . 
							"&#160;&#160;&#160;" . Xml::inputLabel( wfMsg( 'translatesvg-ycoordinate-pre' ), $language.'-'.$i.'-y', $language.'-'.$i.'-y', 5, $existing['y'] );
				}
				$groups[] = $grouphtml;
			}
			$html .= implode( Html::element( 'div', array( 'style' => 'height:10px' ) ), $groups );
			$html .= Html::closeElement( 'fieldset' );
		}
		$html .= Xml::submitButton( 'Submit' ) . "\n" .
				Html::closeElement( 'form' );
		$this->getOutput()->addHTML( $html );
	}

	function getFallback( $num ){
		if( isset( $this->translations['fallback'][$num] ) ){
			return $this->translations['fallback'][$num];
		} else {
			//TODO
		}
	}

	/*
		Return the existing translation of a text: the starting point that the translator works with.
		Autofill is annoying at best, but it's useful for numbers. Hence scrub all non-numeric text (but
		keep other properties).
		This function is useful when translations are missing for zero or more but not all text elements.
		For the equivalent function for when they are missing for all text, see the JavaScript function.
	*/
	function getExisting( $num, $language ){
		if( isset( $this->translations[$language][$num] ) ){
			return $this->translations[$language][$num];
		} else {
			$fallback = $this->getFallback( $num );
			if( preg_match( '/^[0-9 .,]+$/', trim( $fallback['text'] ) ) ){
				return $fallback;
			} else {
				return array( 'text' => '', $fallback['x'], $fallback['y'] );
			}
		}
	}

	function getDescriptor( $num ){
		$qqq = '';
		if( isset( $this->translations['qqq'][$num]['text'] ) ){
			$qqq = trim( $this->translations['qqq'][$num]['text'] );
		}
		if( $qqq === '' ) {
			$qqq = wfMsg( 'translatesvg-nodesc' );
		}
		return $qqq;
	}

	function updateTranslations( $params ){
		foreach( $params as $name=>$value ){
			list( $lang, $num, $param ) = explode( '-', $name );
			if( !isset( $this->translations[ $lang ][ $num ] ) ){
				$this->translations[ $lang ][ $num ] = $this->getFallback( $num );
			}
			$this->translations[ $lang ][ $num ][$param] = $value;
		}

		$reverse = array();
		foreach( $this->translations as $language=>$translations ){
			if( $language == 'fallback' ) continue; //We'll come back for it.
			for( $i = 0; $i < $this->number; $i++ ){
				$reverse[ $i ][] = array_merge( $translations[$i], array( 'systemLanguage' => $language ) );
			}
		}
		for( $i = 0; $i < $this->number; $i++ ){
			$reverse[ $i ][] = array_merge( $this->translations['fallback'][$i], array( 'systemLanguage' => 'fallback' ) );
		}
		$this->translations = $reverse;
	}
	function updateSVG(){
		$switches = $this->svg->getElementsByTagName( "switch" );
		$this->number = $switches->length;
		for( $i = 0; $i < $this->number; $i++ ){
			$switch = $switches->item( $i );
			foreach( $this->translations[$i] as $translation ){
				$language = $translation['systemLanguage'];
				if( $language === 'fallback' ){
					$path = "svg:text[not(@systemLanguage)]";
				} else {
					$path = "svg:text[@systemLanguage='$language']";
				}
				$existing = $this->xpath->query( $path, $switch );
				if( $existing->length == 1 ){
					$existing = $existing->item( 0 );
					// Update of existing translation
					$old = array( $existing->textContent, $existing->getAttribute( 'x' ), $existing->getAttribute( 'y' ) );
					$new = array( $translation['text'], $translation['x'], $translation['y']);
					if( $old !== $new ){
						$this->modified[$language] = '';
						$existing->setAttribute( 'x', $translation['x'] );
						$existing->setAttribute( 'y', $translation['y'] );
						$existing->textContent = $translation['text'];
					}
				} else if( $existing->length > 1 ) {
					//TODO
				} else {
					$this->added[$language] = 'added';
					$textContent = $this->svg->createTextNode( $translation['text'] );
					$newtext = $this->svg->createElement( 'text' );
					$newtext->appendChild( $textContent );
					$switch->appendChild( $newtext );
					unset( $translation['text'] );
					if( $translation['systemLanguage'] == 'fallback' ){
						unset( $translation['systemLanguage'] );
					}
					foreach( $translation as $attrkey=>$attrvalue ){
						$newtext->setAttribute( $attrkey, $attrvalue );
					}
				}
			}
		}
		// Move fallbacks to the end of their switch elements
		$fallbacks = $this->xpath->query("//svg:text[not(@systemLanguage)]");
		$count = $fallbacks->length;
		for( $i = 0; $i < $count; $i++ ){
			$fallbacks->item( $i )->parentNode->appendChild( $fallbacks->item( $i ) );
		}
	}
	function saveSVG( $filepath, $filename ){
		$mUpload = new TranslateSvgUpload();
		$temp = tempnam( wfTempDir(), 'trans' );

		$this->svg->preserveWhiteSpace = false;
		$this->svg->formatOutput = true;
		$this->svg->loadXML( $this->svg->saveXML() );
		$this->svg->save( $temp );

		$mUpload->initializePathInfo( $filename, $temp, filesize( $filepath ), true );

		$details = $mUpload->verifyUpload();
		if ( $details['status'] != UploadBase::OK ) {
			//TODO
			//$this->processVerificationError( $details );
			return;
		}

		// Verify permissions for this title
		$permErrors = $mUpload->verifyTitlePermissions( $this->getUser() );
		if( $permErrors !== true ) {
			$code = array_shift( $permErrors[0] );
			//TODO
			//$this->showRecoverableUploadError( wfMsgExt( $code,
			//		'parseinline', $permErrors[0] ) );
			return;
		}

		$this->mLocalFile = $mUpload->getLocalFile();
		$watch = true; //TODO
		unset( $this->added['fallback'] );
		$comment = "Updating translations:";
		if( count( $this->added ) > 0 )	$comment .= " added " . implode( ", ", array_keys( $this->added ) ) . ";";
		if( count( $this->modified ) > 0 )	$comment .= " modified " . implode( ", ", array_keys( $this->modified ) ) . ";";
		$comment = trim( $comment, ";" ) . ".";
		$status = $mUpload->performUpload( $comment, false, $watch, $this->getUser() );
		if ( !$status->isGood() ) {
			//TODO
			//$this->showUploadError( $this->getOutput()->parse( $status->getWikiText() ) );
			return;
		}

		// Success, redirect to description page
		$this->getOutput()->redirect( $this->mLocalFile->getTitle()->getFullURL() );
	}
}

class TranslateSvgUpload extends UploadBase {
	public function initializeFromRequest( &$request ) {

	}
}
