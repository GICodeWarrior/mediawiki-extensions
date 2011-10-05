<?php /**
 * Helper class to save some data in the parser. Will be added to the parser
 * when called.
 * based on LODParseHelper
 * @ingroup SWB
 * @author Anna
 */
class SWBControlProperties {
	public $lastproperty = "";
	public $lastvalue = "";
	public $title = "";
	public $deflang = "";
	
	public $facts = array();
	public $mappings = array();
	public $different = array();
	public $labels = array();
	public $aliases = array();
	public $descriptions = array();
	public $wikipedias = array();
	public $links = array();
	public $type = '';
	
	public function __construct( &$parser ) {
		$this->title = $parser->getTitle()->getPrefixedText();
		global $wgLang;
		$this->deflang = $wgLang->getCode();
		$this->labelize($this->title, $this->deflang);
	}
	
	public function addPropertyValue($property, $value, $lang="") {
		$property = ucfirst($property);
		if (strpos($property, 'Property:')!==0) $property = 'Property:' . $property; 
		if (SWBControlProperties::forbiddenProperty($property)) return;
		if (!array_key_exists($property, $this->facts))
			$this->facts[$property] = array();
		if (!array_key_exists($value, $this->facts[$property]))
			$this->facts[$property][$value] = array();
		
		$this->labelize($property, $lang);
		$this->labelize($value, $lang);
	}
	
	public static function forbiddenProperty($property) {
		$forbidden = array('Property:Label', 'Property:Alias',
			'Property:Wikipedia', 'Property:Has type', 'Property:Description',
			'Property:Equivalent URI', 'Property:Modification date',
			'Property:Different from');
		$property = ucfirst($property);
		if (strpos($property, 'Property:')!==0) $property = 'Property:' . $property; 
		return in_array($property, $forbidden);
	}
	
	public function removePropertyValue($property, $value, $lang="") {
		$property = ucfirst($property);
		if (strpos($property, 'Property:')!==0) $property = 'Property:' . $property; 
		if (!array_key_exists($property, $this->facts))
			return;
		if (!array_key_exists($value, $this->facts[$property]))
			return;
		unset($this->facts[$property][$value]);
		if (count($this->facts[$property]) === 0) {
			unset($this->facts[$property]);
			return;
		}
	}
	
	public function addSource($property, $value, $source, $lang="") {
		$property = ucfirst($property);
		if (strpos($property, 'Property:')!==0) $property = 'Property:' . $property; 
		if (SWBControlProperties::forbiddenProperty($property)) return;
		if (!array_key_exists($property, $this->facts))
			$this->facts[$property] = array();
		if (!array_key_exists($value, $this->facts[$property]))
			$this->facts[$property][$value] = array();
		if (!in_array($source, $this->facts[$property][$value]))
			$this->facts[$property][$value][] = $source;
			
		$this->labelize($property, $lang);
		$this->labelize($value, $lang);
	}
	
	public function removeSource($property, $value, $source, $lang="") {
		$property = ucfirst($property);
		if (strpos($property, 'Property:')!==0) $property = 'Property:' . $property; 
		if (!array_key_exists($property, $this->facts))
			return;
		if (!array_key_exists($value, $this->facts[$property]))
			return;
		$key = array_search($source, $this->facts[$property][$value]);
		if ($key === false) return;
		unset($this->facts[$property][$value][$key]);
		$this->facts[$property][$value] = array_values($this->facts[$property][$value]);
	}
	
	public function addMapping($uri, $title = '', $lang="") {
		if ($title === '') $title = $this->title;
		$this->mappings[$uri] = $title;
		
		$this->labelize($title, $lang);
	}
	
	public function removeMapping($uri, $title = '', $lang="") {
		if (array_key_exists($uri, $this->mappings))
			unset($this->mappings[$uri]);
	}
	
	public function addDifferent($uri, $title = '', $lang = '') {
		if ($title === '') $title = $this->title;
		if (in_array($uri, $this->different))
			return;
		$this->different[] = $uri;
	}
	
	public function removeDifferent($uri, $title = '', $lang = '') {
		$key = array_search($uri, $this->different);
		if ($key === false)
			return;
		unset($this->different[$key]);
	}
	
	public function addLabel($entity, $label, $lang) {
		if (!SWBCreatePage::validLanguage($lang))
			return;
		if (!array_key_exists($lang, $this->labels))
			$this->labels[$lang] = array();
		$this->labels[$lang][$entity] = $label;
	}
	
	public function removeLabel($entity, $label, $lang) {
		if (!array_key_exists($lang, $this->labels))
			return;
		unset($this->labels[$lang][$entity]);
	}
	
	public function getLabel($entity, $lang) {
		if (!array_key_exists($lang, $this->labels))
			return "";
		if (!array_key_exists($entity, $this->labels[$lang]))
			return "";
		return $this->labels[$lang][$entity];
	}
	
	public function addAlias($entity, $alias, $lang) {
		if (!SWBCreatePage::validLanguage($lang))
			return;
		if (!array_key_exists($lang, $this->aliases))
			$this->aliases[$lang] = array();
		if (!in_array($alias, $this->aliases[$lang]))
			$this->aliases[$lang][] = $alias;
	}
	
	public function removeAlias($entity, $alias, $lang) {
		if (!array_key_exists($lang, $this->aliases))
			return;
		$key = array_search($alias, $this->aliases[$lang]);
		if ($key === false)
			return;
		unset($this->aliases[$lang][$key]);
	}
	
	public function addDescription($entity, $description, $lang) {
		if (!SWBCreatePage::validLanguage($lang))
			return;
		if (!array_key_exists($lang, $this->descriptions))
			$this->descriptions[$lang] = array();
		$this->descriptions[$lang][$entity] = $description;
		
		$this->labelize($entity, $lang);
	}
	
	public function removeDescription($entity, $description, $lang) {
		if (!array_key_exists($lang, $this->descriptions))
			return;
		unset($this->descriptions[$lang][$entity]);
	}
	
	public function getDescription($entity, $lang) {
		if (!array_key_exists($lang, $this->descriptions))
			return "";
		if (!array_key_exists($entity, $this->descriptions[$lang]))
			return "";
		return $this->descriptions[$lang][$entity];
	}
	
	public function addWikipedia($entity, $wikipedia, $lang) {
		if (!SWBCreatePage::validLanguage($lang))
			return;
		$this->wikipedias[$lang] = $wikipedia;
	}
	
	public function removeWikipedia($entity, $wikipedia, $lang) {
		if (!array_key_exists($lang, $this->wikipedias))
			return;
		unset($this->wikipedias[$lang]);
	}
	
	public function getWikipedia($entity, $lang) {
		if (!array_key_exists($lang, $this->wikipedias))
			return "";
		return $this->wikipedias[$lang];
	}
	
	public function addLink( $link ) {
		if (in_array($link, $this->links))
			return;
		$linkvalue = SMWDataValueFactory::newTypeIDValue( '_uri', $link );
		if ($linkvalue->isValid())
			$this->links[] = $link;
	}
	
	public function removeLink( $link ) {
		$key = array_search($link, $this->links);
		if ($key === false) return;
		unset($this->links[$key]);
	}
	
	public function addType( $type ) {
		$this->type = $type;
	}
	
	private function labelize($name, $lang) {
		$lang = ($lang==='')? $this->deflang: $lang;
		if (!array_key_exists($lang, $this->labels))
			$this->labels[$lang] = array();
		
		if (array_key_exists($name, $this->labels[$lang])) return;
		$this->labels[$lang][$name] = SWBCreatePage::getLabel($name, $lang);
	}
	
	function isKnown($property, $object, $objecttype, $source) {
		if (!array_key_exists($property, $this->mappings)) return false;
		if (!array_key_exists($this->mappings[$property], $this->facts)) return false;
		$literal = ($objecttype === 'literal');
		if ($literal) {
			if (!array_key_exists($object, $this->facts[$this->mappings[$property]])) return false;
			$sources = $this->facts[$this->mappings[$property]][$object];
		} else {
			if (!array_key_exists($object, $this->mappings)) return false;
			if (!array_key_exists($this->mappings[$object], $this->facts[$this->mappings[$property]])) return false;
			$sources = $this->facts[$this->mappings[$property]][$this->mappings[$object]];
		}
		return in_array($source, $sources);
	}
	
	/**
	 * Deals with the #property parser function, i.e. by creating the text for
	 * the factbox (within the Parser object) and by adding the annotation
	 * link to the text. Will be called by the parser.
	 * 
	 * @param $parser
	 * @return replacement text for the parserfunction
	 */
	static public function doProperty( &$parser ) {
		$params = func_get_args();
		$prop = $params[1];
		
		if (!isset($parser->lodpuller)) $parser->lodpuller = new SWBControlProperties( $parser );
		
		$parser->lodpuller->lastproperty = $prop;
		$parser->lodpuller->lastvalue = '';
		
		return '';
	}
	
	/**
	 * Deals with the #value parser function, i.e. by creating the text for
	 * the factbox (within the Parser object) and by adding the annotation
	 * link to the text. Will be called by the parser.
	 * 
	 * @param $parser
	 * @return replacement text for the parserfunction
	 */
	static public function doValue( &$parser ) {
		$params = func_get_args();
		$val = $params[1];
		
		if (!isset($parser->lodpuller)) return '';
		if ($parser->lodpuller->lastproperty === '') return '';
		
		$prop = $parser->lodpuller->lastproperty;
		$parser->lodpuller->lastvalue = $val;
		
		$parser->lodpuller->addPropertyValue( $prop, $val );
		
		if (SWBControlProperties::forbiddenProperty($prop)) return '';
		
		$text = "[[$prop::$val| ]]";
		return $text;
	}
	
	/**
	 * Deals with the #source parser function. Currently nothing happens to the
	 * source, but it is at least saved. Eventually, the source should be
	 * exported. // TODO implement saving and exporting the source. somehow :P
	 * 
	 * @param $parser
	 * @return replacement text for the parserfunction
	 */
	static public function doSource( &$parser ) {
		$params = func_get_args();
		$source = $params[1];
		
		if (!isset($parser->lodpuller)) return "";
		if ($parser->lodpuller->lastproperty === "") return "";
		if ($parser->lodpuller->lastvalue === "") return "";
		
		$parser->lodpuller->addSource( $parser->lodpuller->lastproperty, $parser->lodpuller->lastvalue, $source );
		
		return "";
	}
	
	static public function doMapping( &$parser ) {
		$params = func_get_args();
		$uri = $params[1];
		
		if (!isset($parser->lodpuller)) $parser->lodpuller = new SWBControlProperties( $parser );
		
		$parser->lodpuller->addMapping( $uri );
		
		$text = "[[Equivalent URI::$uri| ]]";
		return $text;
	}

	static public function doDifferent( &$parser ) {
		$params = func_get_args();
		$uri = $params[1];
		
		if (!isset($parser->lodpuller)) $parser->lodpuller = new SWBControlProperties( $parser );
		
		$parser->lodpuller->addDifferent( $uri );
		
		$text = "[[Different from::$uri| ]]";
		return $text;
	}
	
	static public function doLabel ( &$parser ) {
		$params = func_get_args();
		$lang = $params[1];
		$content = $params[2];
		
		if (!isset($parser->lodpuller)) $parser->lodpuller = new SWBControlProperties( $parser );
		
		$parser->lodpuller->addLabel( $parser->getTitle()->getPrefixedText(), $content, $lang );
		
		$text = "[[Label::$content;$lang| ]][[Alias::$content;$lang| ]]";
		return $text;
	}
	
	static public function doAlias ( &$parser ) {
		$params = func_get_args();
		$lang = $params[1];
		$content = $params[2];
		
		if (!isset($parser->lodpuller)) $parser->lodpuller = new SWBControlProperties( $parser );
		
		$parser->lodpuller->addAlias( $parser->getTitle()->getPrefixedText(), $content, $lang );
		
		$text = "[[Alias::$content;$lang| ]]";
		return $text;
	}
	
	static public function doDescription ( &$parser ) {
		$params = func_get_args();
		$lang = $params[1];
		$content = $params[2];
		
		if (!isset($parser->lodpuller)) $parser->lodpuller = new SWBControlProperties( $parser );
		
		$parser->lodpuller->addDescription( $parser->getTitle()->getPrefixedText(), $content, $lang );
		
		$text = "[[Description::$content;$lang| ]]";
		return $text;
	}
	
	static public function doWikipedia ( &$parser ) {
		$params = func_get_args();
		$lang = $params[1];
		$content = $params[2];
		
		if (!isset($parser->lodpuller)) $parser->lodpuller = new SWBControlProperties( $parser );
		
		$parser->lodpuller->addWikipedia( $parser->getTitle()->getPrefixedText(), $content, $lang );
		
		$text = "[[Wikipedia::$content;$lang| ]]";
		return $text;
	}
	
	static public function doType( &$parser ) {
		$params = func_get_args();
		$content = $params[1];
		
		if (!isset($parser->lodpuller)) $parser->lodpuller = new SWBControlProperties( $parser );
		
		$parser->lodpuller->addType( $content );
		
		$text = "[[Has type::$content| ]]";
		return $text;
	}
	
	static public function doLink( &$parser ) {
		$params = func_get_args();
		$content = $params[1];
		
		if (!isset($parser->lodpuller)) $parser->lodpuller = new SWBControlProperties( $parser );
		
		$parser->lodpuller->addLink( $content );
		
		$text = "[[Link::$content| ]]";
		return $text;
	}
	
	public function getWikiText() {
		$retval = '';
		$labels = $this->removeEmpty($this->labels);
		foreach($this->labels as $lang => $labels) {
			if (array_key_exists($this->title, $labels)) {
				$label = $labels[$this->title];
				if ($label)
					$retval .= "{{#label:$lang|$label}}";
			}
		}
		foreach($this->aliases as $lang => $aliases) {
			foreach($aliases as $alias) {
				$retval .= "{{#alias:$lang|$alias}}";
			}
		}
		foreach($this->descriptions as $lang => $descriptions) {
			if (array_key_exists($this->title, $descriptions)) {
				$description = $descriptions[$this->title];
				if ($description)
					$retval .= "{{#description:$lang|$description}}";
			}
		}
		foreach($this->wikipedias as $lang => $wikipedia) {
			if ($wikipedia)
				$retval .= "{{#wikipedia:$lang|$wikipedia}}";
		}
		foreach($this->mappings as $uri => $mapping) {
			$retval .= "{{#mapping:$uri}}";
		}
		foreach($this->different as $uri) {
			$retval .= "{{#different:$uri}}";
		}
		foreach($this->facts as $property => $values) {
			$retval .= "{{#property:$property}}";
			foreach($values as $value => $sources) {
				$retval .="{{#value:$value}}";
				foreach ($sources as $source) {
					$retval .= "{{#source:$source}}";
				}
			}
		}
		if ($this->type) {
			$retval .= "{{#type:$this->type}}";
		}
		foreach($this->links as $link) {
			$retval .= "{{#link:$link}}";
		}
		return $retval;
	}
	
	private function removeEmpty($arr) {
		$result = array();
		foreach($arr as $index => $value)
			if ($value !== null) $result[$index] = $value;
		return $result;
	}
	
	public function getResultObject( $lang = '' ) {
		if ($lang === '') {
			global $wgLang;
			$lang = $wgLang->getCode();
		}
		$stuff = array();
		//$stuff['facts'] = $this->facts;
		$facts = array();
		global $wgUser, $wgScriptPath, $wgServer;
		$skin = $wgUser->getSkin();
		
		foreach ($this->facts as $property => $valsource) {
			foreach ($valsource as $value => $sources) {
				$fact = array();
				$fact['property'] = $property;
				$propertyObj = SMWPropertyValue::makeUserProperty( $property );
				$typesvalue = $propertyObj->getTypesValue();
				$literal = ($typesvalue->getWikiValue() !== 'Page');
				$fact['propertytype'] = $typesvalue->getWikiValue();
				$propertylabel = SWBCreatePage::getLabel($property, $lang);
				$fact['propertylabel'] = $propertylabel ? $propertylabel : $property;
				$fact['value'] = $value;
				$fact['valuetype'] = $literal ? 'literal' : 'entity';
				if ($literal) {
					$valuelabel = $value;
				} else {
					$valuelabel = SWBCreatePage::getLabel($value, $lang);
					if ($valuelabel == '') $valuelabel = 'Topic:' . $value;
				}
				$fact['valuelabel'] = $valuelabel;
				$valueObj = SMWDataValueFactory::newPropertyObjectValue( $propertyObj, $value, $valuelabel );
				$long = $valueObj->getShortHTMLText( $skin );
				$short = $valueObj->getLongHTMLText( $skin );
				if ($literal) {
					$valueliteral = (($typesvalue->getWikiValue() == 'Number') && (is_string($short))) ? $short : $long;
				} else {
					$valueliteral = ( "<a href=\"$wgServer$wgScriptPath/topic/$lang/$value\" class=\"lodlink\">$valuelabel</a>" );
				}
				
				$fact['valueliteral'] = $valueliteral;
				//$fact['valueliterallong'] = $long;
				//$fact['valueliteralshort'] = $short;
				$fact['sources'] = $sources;
				$facts[] = $fact;
			}
		}
		$stuff['facts'] = $facts;
		$stuff['mappings'] = $this->mappings;
		if ($lang == '') $lang = $this->deflang;
		
		// get the label for all entities in the requested language
		$stuff['labels'] = array_key_exists($lang, $this->labels) ? $this->removeEmpty($this->labels[$lang]) : null;
		$stuff['aliases'] = $this->aliases;
		$stuff['links'] = $this->links;
		$stuff['thistype'] = $this->type;
		
		// get the label for the main entity in all languages
		$stuff['thislabel'] = array();
		foreach($this->labels as $l => $a)
			if (array_key_exists($this->title, $a))
				$stuff['thislabel'][$l] = $a[$this->title];
		
		$stuff['descriptions'] = array_key_exists($lang, $this->descriptions) ? $this->descriptions[$lang] : null;
		return $stuff;
	}
}
