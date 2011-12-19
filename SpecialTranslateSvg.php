<?php
class SpecialTranslateSvg extends SpecialPage {

	/**
	 * @var SimpleXMLElement
	 */
	private $svg = '';
	private $translations = array();
	private $number = 0;
	private $num = 0; //iterator
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
				$this->svg = new SimpleXMLElement( $file->getPath(), 0, true );
				$this->svg->registerXPathNamespace( 'svg', 'http://www.w3.org/2000/svg' );
				$this->makeTranslationReady();
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
		$result = $this->svg->xpath("//svg:text");
		foreach( $result as &$text ){
			$text->registerXPathNamespace( 'svg', 'http://www.w3.org/2000/svg' );
			$ancestorswitches = $text->xpath("ancestor::svg:switch");
			if( count($ancestorswitches) == 0 ){
				$parent = $text->xpath("parent::*");
				$parent = $parent[0];
				$switch = $parent->addChild('switch');
				$newtext = $switch->addChild( 'text', $text[0] );
				foreach( $text->attributes() as $attrname=>$attrvalue ){
					$newtext->addAttribute( $attrname, $attrvalue );
				}
				$dom=dom_import_simplexml($text);
				$dom->parentNode->removeChild($dom);
				unset( $dom );
			}
		}
	}

	function extractTranslations(){
		$result = $this->svg->xpath("//svg:switch");
		$this->number = count( $result );
		for( $i = 0; $i < $this->number; $i++ ){
			$switch = $result[$i];
			$switch->registerXPathNamespace( 'svg', 'http://www.w3.org/2000/svg' );
			$existing = $switch->xpath("svg:text");
			foreach( $existing as $child ){
				$child = (array)$child;
				if( isset( $child[0] ) ){
					$text = $child[0];
				} else {
					$text = '';
				}
				if( isset( $child['@attributes'] ) ){
					$attr = $child['@attributes'];
				} else {
					$attr = array();
				}
				$this->translations [ $i ][] = array_merge( $attr, array( 'text'=>$text) );
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
			$fallback = trim( $fallback['text'] );
			if( preg_match( '/^[0-9 .,]+$/', $fallback ) ){
				return $fallback;
			} else {
				return '';
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
				$this->translations[ $lang ][ $num ] = $this->getfallback( $num );
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
		$result = $this->svg->xpath("//svg:switch");
		for( $i = 0; $i < $this->number; $i++ ){
			$switch = $result[$i];
			$switch->registerXPathNamespace( 'svg', 'http://www.w3.org/2000/svg' );
			foreach( $this->translations[$i] as $translation ){
				$language = $translation['systemLanguage'];
				if( $language === 'fallback' ){
					$path = "svg:text[not(@systemLanguage)]";
				} else {
					$path = "svg:text[@systemLanguage='$language']";
				}
				$existing = $switch->xpath( $path );
				if( count( $existing ) == 1 ){
					// Update of existing translation
					$old = array( (string)$existing[0][0], (string)$existing[0]['x'], (string)$existing[0]['y']);
					$new = array( $translation['text'], $translation['x'], $translation['y']);
					if( $old !== $new ){
						$this->modified[$language] = '';
						$existing[0]['x'] = $translation['x'];
						$existing[0]['y'] = $translation['y'];
						$existing[0][0] = $translation['text'];
					}
				} else {
					$this->added[$language] = 'added';
					$newtext = $switch->addChild('text', $translation['text']);
					unset( $translation['text'] );
					if( $translation['systemLanguage'] == 'fallback' ){
						unset( $translation['systemLanguage'] );
					}
					foreach( $translation as $attrkey=>$attrvalue ){
						$newtext->addAttribute( $attrkey, $attrvalue );
					}
				}
			}
			// Always move fallback to end
			$fallback = $switch->xpath("svg:text[not(@systemLanguage)]");
			foreach( $fallback as $canon ){
				$dom=dom_import_simplexml($canon);
				$dom->parentNode->appendChild($dom);
				$dom->parentNode->removeChild($dom);
				unset( $dom );
			}
		}
	}

	function saveSVG( $filepath, $filename ){

		$mUpload = new TranslateSvgUpload();
		$temp = tempnam( wfTempDir(), 'trans' );
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($this->svg->asXML());
		$dom->save( $temp );
		unset( $dom );

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
