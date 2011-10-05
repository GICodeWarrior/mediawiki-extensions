<?php
/**
 * Class implementing extension for pulling in LOD data
 * based on LODPuller
 * @ingroup SWB
 * @author Anna Kantorovitch
 */

class SWBCreatePage {
	static function render( &$out, &$sk ) {
		$new = new SWBCreatePage();
		return $new->getPage( $out, $sk );
	}
	
	private $title = null;
	private $pagename = '';
	private $sames = array();
	private $localurl = '';
	
	function getPage( &$out, &$sk ) {
		$this->title = $out->getTitle();
		$this->pagename = $this->title->getPrefixedText();
		if (!(($this->title->getNamespace() === NS_MAIN) || ($this->title->getNamespace() === SMW_NS_PROPERTY) || ($this->title->getNamespace() === SMW_NS_TYPE))) return true;
		$this->localurl = $this->title->getPrefixedURL();
		if ($this->localurl === 'Main_Page') return true;
		global $wgRequest;
		if (!(($wgRequest->getText( 'action' ) === 'view') || ($wgRequest->getText( 'action' ) === 'purge') || ($wgRequest->getText( 'action' ) == ''))) return true;
		
		$out->includeJQuery();
		global $swbgIP;
		$lodpullerScriptPath=$swbgIP;
		$out->addScriptFile( $lodpullerScriptPath . 'js/jquery.jeditable.js' );
		$out->addScriptFile( $lodpullerScriptPath . 'js/jquery.loadmask.min.js' );
		$out->addScriptFile( $lodpullerScriptPath . 'js/jquery.autocomplete.js' );
		$out->addScriptFile( $lodpullerScriptPath . 'js/jquery.translate-NCT,core,NCT-adapter,ui,progress.min.js' );
		$out->addScriptFile( $lodpullerScriptPath . 'js/jqModal.js' );

		$out->addScriptFile( $lodpullerScriptPath . 'js/LODPullerAPI.js' );
		$out->addScriptFile( $lodpullerScriptPath . 'js/LODUtil.js' );
		$out->addScriptFile( $lodpullerScriptPath . 'js/LODSame.js' );
		$out->addScriptFile( $lodpullerScriptPath . 'js/LODContent.js' );
		$out->addScriptFile( $lodpullerScriptPath . 'js/LODLinks.js' );
		$out->addScriptFile( $lodpullerScriptPath . 'js/WikiFacts.js' );
		$out->addScriptFile( $lodpullerScriptPath . 'js/Wikipedia.js' );
		$out->addScriptFile( $lodpullerScriptPath . 'js/WikiLabels.js' );
		$out->addScriptFile( $lodpullerScriptPath . 'js/WikiFacts.js' );
		$out->addScriptFile( $lodpullerScriptPath . 'js/LODPuller.js' );
		$out->addScriptFile( $lodpullerScriptPath . 'js/main.js' );

		$out->addExtensionStyle( $lodpullerScriptPath . 'css/jquery.autocomplete.css' );
		$out->addExtensionStyle( $lodpullerScriptPath . 'css/jquery.loadmask.css' );
		$out->addExtensionStyle( $lodpullerScriptPath . 'css/lodpuller.css' );
		
		global $wgParser;
		if (isset($wgParser->lodpuller)) {
			global $wgLang;
			$label = $wgParser->lodpuller->getLabel($this->title->getPrefixedText(), $wgLang->getCode());
			if ($label) {
				global $wgSitename;
				$out->setHTMLTitle($label . " - " . $wgSitename);
				$out->setPageTitle($label);
			}
		}
		
		
		// Page gets created completely new	
		$old = $out->getHTML();
		$out->clearHTML();
		
		//$out->addHTML( "<div id=\"lod-main\">\n" );
		$this->renderMain( $old, $out );
		//$out->addHTML( "</div>\n" ); // lod-main;
		
		//$out->addHTML( "<div id=\"lod-side\">\n" );
		$this->renderSidebar( $out );
		//$out->addHTML( "</div>" ); // lod-side
		
		return true;
	}
	
	/**
	 * Create the main part of the page, with the text and the
	 * and Wikipedia page.
	 * 
	 * @param OutputPage $out Coming from the page renderer
	 * @return null
	 */
	private function renderMain( &$old, &$out ) {
		$out->addHTML( $old );
		// TODO simply renders the current page, should render the descriptive blurb
		
		if (($this->title->getNamespace() === SMW_NS_PROPERTY) || ($this->title->getNamespace() === SMW_NS_TYPE)) return;
		
		$out->addHTML( '<h2>' . wfMsg('swb-facts') . '</h2>' );
		$out->addWikiText( '<div id="main-facts"></div>' );

		$out->addHTML( '<h2>' . wfMsg('swb-webofdata') . '</h2>' );
		$out->addHTML( '<div id="lod-content"></div>' );
		
//		$out->addHTML( '<h2>' . wfMsg('lodpuller-wikipedia') . '</h2>' );

//		$out->addHTML( "<div id=\"wikipedia-content\"></div>\n" );
		$out->addHTML( '<h2>' . wfMsg('swb-links') . '</h2>' );
		//$this->getFaviki( $out );
		$out->addHTML( "<div id=\"swb-links\"></div>\n" );

	}
	
	private function getFaviki( &$out ) {
		$ch = curl_init();
		
		// TODO change. this should actually take the local part of the dbpedia
		// link, not just the name of the page!
		
		$termenc = urlencode( $this->pagename );
//		$url = "http://www.faviki.com/api/get/";
		//$out->addWikiText( $url );
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST' );
		curl_setopt($ch, CURLOPT_POSTFIELDS, array('api_key' => '562a065ae6317a8100bc40e2e895bfb4', 'tag' => $this->pagename));
		//curl_setopt($ch, CURLOPT_HTTPHEADER, array ( "Accept: application/json" ));
		$xmlanswer = curl_exec($ch);
		curl_close($ch);
		
		$xmlanswer = preg_replace('/&[^; ]{0,6}.?/e', "((substr('\\0',-1) == ';') ? '\\0' : '&amp;'.substr('\\0',1))", $xmlanswer); 
		//$out->addWikiText( " " . $xmlanswer );
		
		libxml_use_internal_errors(true);
		$xml = simplexml_load_string( $xmlanswer );
		$error = false;
		foreach(libxml_get_errors() as $error) {
			$out->addWikiText( $error->message );
			$error = true;
		}
		if ($error) return;
		//$out->addWikiText($xml['status']);
		//$out->addWikiText(print_r($xml, true));
		
		if ($xml->webpages) {
			// TODO Change. Make prettier, i.e. add a faviki icon or something
			$out->addHTML('<h4>From <a href="http://www.faviki.com">faviki</a> &mdash; tags that make sense</h4>');
			$out->addHTML('<ul>');
			$i = 0;
			foreach($xml->webpages->webpage as $webpage) {
				$i = $i + 1;
				if ($i > 6) break;
				$out->addHTML( "<li><a href=\"$webpage->url\">$webpage->title</a></li>");
			}
			$out->addHTML("<li><a href=\"http://www.faviki.com/tag/$this->pagename\">More on faviki</a></li>");
			$out->addHTML('</ul>');
			$out->addHTML('<h4>Links saved in Shortipedia</h4>');
		}
		
		return;
	}
	
	/**
	 * Checks if the URI is known and an equivalent URI to any of the already
	 * existing pages. If so, it returns the name of the page, otherwise null.
	 * 
	 * @param string $uri Identifier for an entity
	 * @return string The name of the page describing the entity, otherwise null
	 */
	public static function getInternalMapping( $uri ) {
		$equivalentURI = SMWPropertyValue::makeUserProperty( "equivalent URI" );
		$urivalue = SMWDataValueFactory::newPropertyObjectValue( $equivalentURI, $uri );
		
		$results = &smwfGetStore()->getPropertySubjects( $equivalentURI, $urivalue );
		
		$mappings = array();
		foreach($results as $result) {
			$mappings[] = $result->getWikiValue();
		}
		if (count($mappings) === 0) return "";
		return $mappings[0]; // TODO Only returns one. There never should be more than one. 
	}
	
	
	/**
	 * Returns an array of strings with all URIs the given page is equivalent
	 * to.
	 * 
	 * @param $pagename Name of the page
	 * @return array_of_string List of URIs of the entity described by the page
	 */
	public static function getExternalMappings( $pagename ) {
		$subject = SMWDataValueFactory::newTypeIDValue( '_wpg', $pagename );
		$pagename = $subject->isValid() ? $subject->getText():'';
		if ($pagename === '') return array();
		$equivalentURI = SMWPropertyValue::makeUserProperty( "equivalent URI" );
		
		$results = &smwfGetStore()->getPropertyValues( $subject, $equivalentURI );
		
		$mappings = array();
		foreach($results as $result) {
			$mappings[] = $result->getWikiValue();
		}
		return $mappings;
	}
	
	public static function getDifferents( $pagename ) {
		$subject = SMWDataValueFactory::newTypeIDValue( '_wpg', $pagename );
		$pagename = $subject->isValid() ? $subject->getText():'';
		if ($pagename === '') return array();
		$differentFrom = SMWPropertyValue::makeUserProperty( "Different from" );
		
		$results = &smwfGetStore()->getPropertyValues( $subject, $differentFrom );
		
		$differents = array();
		foreach($results as $result) {
			$differents[] = $result->getWikiValue();
		}
		return $differents;
	}
	
	/**
	 * Returns an array of pagenames that have the given label in the given
	 * language.
	 * 
	 * @param $label Name of the page
	 * @param $lang Language. Assumes user language if none is given.
	 * @return array_of_string List of pagenames
	 */
	public static function getPagesByLabel( $label, $lang = '' ) {
		if ($lang === '') {
			global $wgLang;
			$lang = $wgLang->getCode();
		}
		if ($label === '') return array();
		$labelprop = SMWPropertyValue::makeUserProperty( 'label' );
		$labelvalue = SMWDataValueFactory::newPropertyObjectValue( $labelprop, "$label;$lang" );
		
		$results = &smwfGetStore()->getPropertySubjects( $labelprop, $labelvalue );
		
		$pages = array();
		foreach($results as $result) {
			$pages[] = $result->getWikiValue();
		}
		return $pages;
	}
	
	/**
	 * Returns an array of pagenames that have the given alias in the given
	 * language.
	 * 
	 * @param $label Alias of the page
	 * @param $lang Language. Assumes user language if none is given.
	 * @return array_of_string List of pagenames
	 */
	public static function getPagesByAlias( $label, $lang = '' ) {
		if ($lang === '') {
			global $wgLang;
			$lang = $wgLang->getCode();
		}
		if ($label === '') return array();
		//$propertyDv = SMWPropertyValue::makeUserProperty( $propertyName );
		//$propertyDi = $propertyDv->getDataItem();
		//$result = SMWDataValueFactory::newPropertyObjectValue( $propertyDi, $value, $caption );
		
		$propertyDv = SMWPropertyValue::makeUserProperty( 'alias' );
		$propertyDi = $propertyDv->getDataItem();
		$labelvalue = SMWDataValueFactory::newPropertyObjectValue( $propertyDi, "$label;$lang" );
		
		$results = &smwfGetStore()->getPropertySubjects( $propertyDi, $labelvalue );
		
		$pages = array();
		foreach($results as $result) {
			$pages[] = $result->getWikiValue();
		}
		return $pages;
	}
	
	/**
	 * Returns the page that is linked to the given Wikipedia article
	 * 
	 * @param $articlename Name of the article
	 * @param $lang Language. Assumes user language if none is given.
	 * @return string Resulting page
	 */
	public static function getPageByWikipediaLink( $articlename, $lang = '' ) {
		if ($lang === '') {
			global $wgLang;
			$lang = $wgLang->getCode();
		}
		if ($articlename === '') return array();
		$labelprop = SMWPropertyValue::makeUserProperty( 'Wikipedia' );
		$labelvalue = SMWDataValueFactory::newPropertyObjectValue( $labelprop, "$articlename;$lang" );
		
		$results = &smwfGetStore()->getPropertySubjects( $labelprop, $labelvalue );
		
		$pages = array();
		foreach($results as $result) {
			return $result->getWikiValue();
		}
		return '';
	}
	
	/**
	 * Returns the label of a page in the given language. If no language is
	 * given, the user language is assumed.
	 * 
	 * @param $pagename Name of the page
	 * @param $lang Language (as the usual Wikipedia codes)
	 * @return string Label, or empty string if none is set
	 */
	public static function getLabel( $pagename, $lang = '' ) {
		return SWBCreatePage::getI18nData( 'Label', $pagename, $lang );
	}
	
	/**
	 * Returns the description of a page in the given language. If no language is
	 * given, the user language is assumed.
	 * 
	 * @param $pagename Name of the page
	 * @param $lang Language (as the usual Wikipedia codes)
	 * @return string Description, or empty string if none is set
	 */
	public static function getDescription( $pagename, $lang = '' ) {
		return SWBCreatePage::getI18nData( 'Description', $pagename, $lang );
	}
	
	/**
	 * Returns the wikipedia link of a page in the given language. If no
	 * language is given, the user language is assumed.
	 * 
	 * @param $pagename Name of the page
	 * @param $lang Language (as the usual Wikipedia codes)
	 * @return string Label, or empty string if none is set
	 */
	public static function getWikipediaLink( $pagename, $lang = '' ) {
		return SWBCreatePage::getI18nData( 'Wikipedia', $pagename, $lang );
	}
	
	/**
	 * Implementation for the getLabel and getWikipediaLink methods.
	 * 
	 * @param string $type One of 'label' or 'wikipedia'
	 * @param string $pagename Target page name
	 * @param string $lang Language to use
	 * @return string Result from database, dependent on type
	 */
	private static function getI18nData( $type, $pagename, $lang ) {
		$alllangs = ($lang==='all');
		if ($lang === '') {
			global $wgLang;
			$lang = $wgLang->getCode();
		}
		$subject = SMWDataValueFactory::newTypeIDValue( '_wpg', $pagename );
		$pagename = $subject->isValid() ? $subject->getText():'';
		if ($pagename === '') return $alllangs ? array() : '';
		$prop = SMWPropertyValue::makeUserProperty( $type );
		
		$results = &smwfGetStore()->getPropertyValues( $subject, $prop );
		
		// We get back an array of SMWRecordValues, where the first value is
		// the label and the second the language. As soon as we find the
		// correct language, return the label
		$content = array();
		foreach($results as $result) {
			$dvs = $result->getDVs();
			if (count($dvs) != 2) continue;
			if ($alllangs) {
				$content[$dvs[1]->getWikiValue()] = $dvs[0]->getWikiValue();
			} else {
				if ($lang === $dvs[1]->getWikiValue())
					return $dvs[0]->getWikiValue();
			}
		}
		return $alllangs ? $content : '';
	}
	
	static public function getWikipediaLinks( $pagename ) {
		return SWBCreatePage::getI18nData( 'Wikipedia', $pagename, 'all' );
	}
	
	static public function getType( $pagename ) {
		$property = SMWPropertyValue::makeUserProperty( $pagename );
		if ($property == null) return '';
		return $property->getTypesValue()->getWikiValue();
	}
	
	/**
	 * Checks if a the given language is one of the languages known to the
	 * system.
	 * 
	 * @param string $lang Language code to be checked
	 * @return bool true if a known language, else false
	 */
	static public function validLanguage( $lang ) {
		global $lodpullerAllLanguages;
		return (array_key_exists($lang, $lodpullerAllLanguages));
	}
	
	/**
	 * Create the sidebar with the facts from the system, the possible matches,
	 * and the external facts.
	 * 
	 * @param OutputPage $out Coming from the page renderer
	 * @return null
	 */
	private function renderSidebar( &$out ) {
		global $wgLang;
		
		if ($this->title->getNamespace() === SMW_NS_PROPERTY) {
			$currenttype = 'Type:' . SWBCreatePage::getType( $this->pagename );
			$out->addHTML( '<h3>' . wfMsg('lodpuller-propertytype') . '</h3>' );
			$out->addHTML( '<form id="propertytypeform"><select id="propertytype" value="' . $currenttype .'">' );
			$types = $this->getTypes( $wgLang->getCode() );
			foreach($types as $type => $label) {
				$selected = ($type == $currenttype)? ' selected="selected"' : '';
				$out->addHTML( "<option value=\"$type\"$selected>$label</option>" );
			}
			$out->addHTML( '</select></form>' );
		}
		
		$out->addHTML( '<h2>' . wfMsg('lodpuller-labels') . '</h2>' );
		$out->addHTML( '<div id="sidebar-labels"></div>' );

		return;
	}
	
	static private function getTypes( $lang ) {
		// Create the query
		$parser = new SMWQueryParser();
		$description = $parser->getQueryDescription( '[[Type:+]]' );
		$labelprop = SMWPropertyValue::makeUserProperty( 'Label' );
		$labelpr = new SMWPrintRequest( SMWPrintRequest::PRINT_PROP, 'Label', $labelprop );
		$description->addPrintRequest( $labelpr );
		$query = new SMWQuery( $description );
		
		$results = &smwfGetStore()->getQueryResult( $query );
		
		$types = array();
		while($result = $results->getNext()) {
			$title = $result[0]->getResultSubject()->getWikiValue();
			if (in_array($title, array('Type:Record', 'Type:Annotation URI', 'Type:Code', 'Type:Text'))) continue;
			
			$label = '';
			while($labelrecord = $result[0]->getNextObject()) {
				$dvs = $labelrecord->getDVs();
				if ($dvs[1]->getWikiValue() ===  $lang)
					$label = $dvs[0]->getWikiValue(); 
			}
			$types[$title] = $label ? $label : $title;
		}
		
		return $types;
	}

	static public function preferences( $user, &$preferences ) {
		
		$preferences['lodpuller-lang'] = array(
			'type' => 'toggle',
			'label-message' => 'lodpuller-usecustomlang',
			'section' => 'personal/i18n'
		);
		
		global $lodpullerAllLanguages;
		foreach ( $lodpullerAllLanguages as $code => $name ) {
			$preferences['lodpuller-lang-' . $code] = array(
				'type' => 'toggle',
				'label' => $code . ' - ' . $name,
				'section' => 'language'
			);
		}
		
		// TODO Change the yourlanguage label in preferences info/i18n to "User Interface Language"
		return true;
	}
	
	/**
	 * Function hooked to MakeGlobalVariablesScript. Add all the variables that
	 * are needed for the JavaScript.
	 * See http://www.mediawiki.org/wiki/Manual:Hooks/MakeGlobalVariablesScript
	 * 
	 * @param array $vars variable (or multiple variables) to be added into the output of Skin::makeVariablesScript
	 * @return bool true if everything went OK
	 */
	static public function addJSVariables( &$vars ) {
		global $wgParser;
		$vars['lodpullerfacts'] = isset($wgParser->lodpuller) ? $wgParser->lodpuller->getResultObject() : array();
		
		// List of all messages that need to be made available to the JS
		$lodpullerJSMessages = array(
			'loadingwikipedia', 'loadingwebofdata',
			'browse', 'go', 'cancel', 'hide', 'show', 'load', 'saving', 'close',
			'showalllanguages', 'hidesomelanguages',
			'addfact', 'removefact', 'addingfact', 'removingfact',
			'source', 'sources', 'addsource', 'removesource', 'addingsource', 'removingsource',
			'map', 'unmap', 'maping', 'unmapping', 'addmapping',
			'morefrom', 'nodata', 'loadinglinkeddata', 'addlabel', 'adddescription', 'addlink',
			'addinglabel', 'addingdescription', 'addfacts', 'removefacts',
			'mapwikipedia', 'mapotherwikipedia', 'unmapwikipedia', 'addwikipedia', 
			'alias', 'aliases', 'addalias', 'removealias', 'addingalias', 'removingalias',
			'removelod', 'hideproperty',
			'help-title', 'help-add-fact'
		);
		foreach($lodpullerJSMessages as $key) {
			$lodpullermessages[$key] = wfMsg('lodpuller-' . $key);
		}
		$vars['lpMsgs'] = $lodpullermessages;
		$vars['lpLanguages'] = SWBCreatePage::getLanguageLabels();
		return true;
	}

	static public function getLanguageLabels() {
		global $wgParser, $lodpullerDefaultLanguages, $lodpullerAllLanguages, $wgUser, $wgLang;
		$languages = array();
		foreach ( $lodpullerAllLanguages as $code => $name ) {
			$label = $description = '';
			if ($wgUser->getBoolOption( 'lodpuller-lang' )) 
				$show =  $wgUser->getBoolOption( 'lodpuller-lang-' . $code);
			else 
				$show = in_array($code, $lodpullerDefaultLanguages);
			if ($code === $wgLang->getCode()) $show = true;
			if (isset($wgParser->lodpuller)) 
				$label = $wgParser->lodpuller->getLabel($wgParser->getTitle()->getPrefixedText(), $code );
			if (isset($wgParser->lodpuller)) 
				$description = $wgParser->lodpuller->getDescription($wgParser->getTitle()->getPrefixedText(), $code );
			$lang = array("lang"=>array($code, $name, $show), "label"=>$label, "desc"=>$description);
			array_push($languages, $lang);
		}
		return $languages;
	}
}

