<?php
/**
 * @file
 * @ingroup SMWSpecialPage
 * @ingroup SpecialPage
 *
 * A factbox like view on an article, implemented by a special page.
 *
 * @author Anna Kantorovitch
 */

/**
 * A factbox view on one specific article, showing all the Semantic data about it
 *
 * @ingroup SMWSpecialPage
 * @ingroup SpecialPage
 */
global $swbgIP;
//   require_once "$swbgIP/EasyRDF/lib/EasyRdf.php";
//   require_once "$swbgIP/EasyRDF/examples/html_tag_helpers.php";
//   set_include_path(get_include_path() . PATH_SEPARATOR . '../lib/');
//	 require_once ($swbgIP.'EasyRDF/examples/html_tag_helpers.php');
//   require_once "EasyRdf.php";
//   require_once "html_tag_helpers.php";
set_include_path($swbgIP.'lib/');
/*
 * Here, we need EasyRDF.
 */
require_once ($swbgIP.'lib/EasyRdf.php');


//require_once( "$swbgIP/Graphite.php" );

class SWBSpecialBrowseWiki extends SpecialPage {
	/// int How  many incoming values should be asked for
	static public $incomingvaluescount = 8;
	/// int  How many incoming properties should be asked for
	static public $incomingpropertiescount = 21;
	/// SMWDataValue  Topic of this page
	private $subject = null;
	/// Text to be set in the query form
	private $articletext = "";
	/// bool  To display outgoing values?
	private $showoutgoing = true;
	/// bool  To display incoming values?
	private $showincoming = false;
	/// int  At which incoming property are we currently?
	private $offset = 0;
	///if searchwindow is created or not
	private $windowCreated=false;

	/**
	 * Constructor
	 */
	public function __construct() {
		global $smwgBrowseShowAll;
		parent::__construct( 'BrowseWiki', '', true, false, 'default', true );
		smwfLoadExtensionMessages( 'SemanticMediaWiki' );
		if ( $smwgBrowseShowAll ) {
			SWBSpecialBrowseWiki::$incomingvaluescount = 21;
			SWBSpecialBrowseWiki::$incomingpropertiescount = - 1;
		}
	}

	/**
	 * Main entry point for Special Pages
	 *
	 * @param[in] $query string  Given by MediaWiki
	 */
	public function execute( $query ) {
		global $wgRequest, $wgOut, $smwgBrowseShowAll,$wgContLang;

		$this->setHeaders();

		// get the GET parameters
		$this->articletext = $wgRequest->getVal( 'article' );

		// no GET parameters? Then try the URL
		if ( $this->articletext == '' ) {
			$params = SMWInfolink::decodeParameters( $query, false );
			reset( $params );
			$this->articletext = current( $params );
		}

		// if page existing in the wiki, I want that one instead
		$uriPageName = $this->getInternalMapping( $this->articletext );

		if (!isset($uriPageName) && $uriPageName == null ) {
			// get subject
			$this->subject = SMWDataValueFactory::newTypeIDValue( '_wpg', $this->articletext );
		} else {
			$this->subject = SMWDataValueFactory::newTypeIDValue( '_wpg', $uriPageName );
		}

		$offsettext = $wgRequest->getVal( 'offset' );
		$this->offset = ( $offsettext == '' ) ? 0:intval( $offsettext );
		$dir = $wgRequest->getVal( 'dir' );

		if ( $smwgBrowseShowAll ) {
			$this->showoutgoing = true;
			$this->showincoming = true;
		}
		if ( ( $dir == 'both' ) || ( $dir == 'in' ) ) $this->showincoming = true;
		if ( $dir == 'in' ) $this->showoutgoing = false;
		if ( $dir == 'out' ) $this->showincoming = false;

		// Why do we need different variants? Removed...

		// Why do we need to input query form? Removed...
			
		// print OutputPage
		$wgOut->addHTML( $this->displayBrowse() );
		SMWOutputs::commitToOutputPage( $wgOut ); // make sure locally collected output data is pushed to the output!

	}

	//new function for search swb actually not used
	function wfSpecialSearch( $par = '' ) {
		global $wgRequest, $wgUser, $wgOut;
		$wgOut->allowClickjacking();

		// Strip underscores from title parameter; most of the time we'll want
		// text form here. But don't strip underscores from actual text params!
		$titleParam = str_replace( '_', ' ', $par );
		//echo "par='".$par."'";
		// Fetch the search term
		$search = str_replace( "\n", " ", $wgRequest->getText( 'search', $titleParam ) );
		//echo "search='".$search."'";
		$searchPage = new SpecialSearch( $wgRequest, $wgUser );
		if( $wgRequest->getVal( 'fulltext' )
		|| !is_null( $wgRequest->getVal( 'offset' ))
		|| !is_null( $wgRequest->getVal( 'searchx' )) )
		{
			$searchPage->showResults( $search );
		} else {
			$searchPage->goResult( $search );
		}
	}
	/** New function for browsing SWB
	 * actually not used
	 * based on lodpuller.php
	 * Function getPagesByAlias doesn't work
	 *
	 * @param unknown_type $label
	 * @param unknown_type $lang
	 */
	private function checkSearch($label, $lang){
	 global $wgOut, $wgScriptPath;
	 $pages = SWBCreatePage::getPagesByAlias( $label, $lang );

		if (count($pages) === 0) {
			// Do nothing
		} elseif (count($pages) === 1) {
			// Go to that page directly
			$wgOut->redirect( "$wgScriptPath/topic/$lang/$pages[0]" );
			return;
		} else {
			global $wgSitename;
			$wgOut->setHTMLTitle( wfMsg('swb-disambiguation') . ':' . $label . ' - ' . $wgSitename );
			$wgOut->setPageTitle( $label );
			$wgOut->addWikiText( wfMsg('swb-disambiguationpage', $label) );
			foreach ($pages as $page) {
				$plabel = SWBCreatePage::getLabel($page, $lang);
				$pdescription = SWBCreatePage::getDescription($page, $lang);
				$wgOut->addWikiText( "* '''[[$page|$plabel]]''': $pdescription" );
			}
			$wgOut->addWikiText( "\n\n" );
		}

		//list($wphits, $wpsuggest, $wpresults) = SWBSemanticSearchByLabel::getWikipediaSearch( $label, $lang );
		list($wphits, $wpsuggest, $wpresults) = SWBSpecialBrowseWiki::getWikiSearch( $label, $lang );
		$exactmatch = false;
		if (count($wpresults)) {
			$wgOut->addWikiText( wfMsg('swb-wpsearchresults' ) );
			$wgOut->addHTML('<ul>');
			foreach($wpresults as $title => $snippet) {
				if ($title == $label) $exactmatch = true;
				$target = str_replace(' ', '_', $title);
				$wgOut->addHTML("<li><a href=\"$wgServer$wgScriptPath/wikipedia/$lang/$target\">$title</a><br> <em>$snippet</em></li>");
			}
			$wgOut->addHTML('</ul>');
			$wgOut->addWikiText( "\n\n" );
		}

		if ($wpsuggest) {
			$wgOut->addWikiText( wfMsg('swb-didyoumean') );
			$target = str_replace(' ', '_', $wpsuggest);
			$wgOut->addHTML("<ul><li><a href=\"$wgServer$wgScriptPath/$lang/$target\">$wpsuggest</a></li></ul>");
			$wgOut->addWikiText( "\n\n" );
		}

		// If nothing was found
		if ((count($pages)===0) && (!$exactmatch)) {
			$title = Title::newFromText( $label );
			if ($title->exists()) {
				// If the page exists (but not with the title)
				$wgOut->addWikiText( wfMsg('swb-pagenameexists' ));
				$langlabel = SWBCreatePage::getLabel( $label, $lang );
				$displaylabel = $langlabel ? $langlabel : $label;
				$target = str_replace(' ', '_', $label);
				$wgOut->addHtml("<ul><li><a href=\"$wgServer$wgScriptPath/topic/$lang/$target\">$displaylabel</a></li></ul>");
			} else {
				// If such a page does not exist at all, enable its creation
				$wgOut->addWikiText( wfMsg('swb-createpage' ));
				$target = str_replace(' ', '_', $label);
				$wgOut->addHtml("<ul><li><a href=\"$wgServer$wgScriptPath/topic/$lang/$target\">$label</a></li></ul>");
			}
		}
	}

	private function getWikiSearch($term, $lang){
		$term = urlencode($term);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://$lang.wikipedia.org/w/api.php?action=query&list=search&format=json&srsearch=$term");
		curl_setopt($ch, CURLOPT_USERAGENT, "swbspecialbrowsewiki");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);

		$answer = json_decode($output);
		$hits = $answer->query->searchinfo->totalhits;
		$results = array();
		$suggestion = '';
		if ($hits === 0) {
			if (property_exists($answer->query->searchinfo, 'suggestion'))
			$suggestion = $answer->query->searchinfo->suggestion;
		} else {
			foreach( $answer->query->search as $hit ) {
				$results[$hit->title] = $hit->snippet;
			}
		}
		return array($hits, $suggestion, $results);


	}
	########################END of checkSearch########################
	/**
	 * Create and output HTML including the complete factbox, based on the extracted
	 * parameters in the execute comment.
	 *
	 * @return string  A HTML string with the factbox
	 */
	private function displayBrowse() {
		global $wgContLang, $wgOut;
		$html = "\n";
		$leftside = !( $wgContLang->isRTL() ); // For right to left languages, all is mirrored

		// TODO: What does valid mean, here?
		if ( $this->subject->isValid() ) {

			// Here, we can distinguish
			/*
			 * 1. We have an existing page + any number of equivalent URIs
			 * 2. We have a non-existing page, which is a URI
			 */

			$wgOut->addStyle( '../extensions/SemanticMediaWiki/skins/SMW_custom.css' );

			$html .= $this->displayHead();
			if ( $this->showoutgoing ) {
				// $data is of type SMWSemanticData
				$data = smwfGetStore()->getSemanticData( $this->subject->getDataItem() );
				$html .= $this->displayData( $data, $leftside );
				$html .= $this->displayCenter();
			}
			if ( $this->showincoming ) {
				list( $indata, $more ) = $this->getInData();
				global $smwgBrowseShowInverse;
				if ( !$smwgBrowseShowInverse ) $leftside = !$leftside;
				$html .= $this->displayData( $indata, $leftside, true );
				$html .= $this->displayBottom( $more );
				// We need to switch browse inverse, again
				$leftside = !$leftside;
			}

			// Now, we can display data from the Semantic Web

			// Two possibilities: 1. Existing page with equivalent uris 2. Non-existing page with URL

			//$equivalentURI = SMWPropertyValue::makeUserProperty( "equivalent URI" );
			//$equivalentURI = SMWPropertyValue::makeProperty( "__spu" );
			$equivalentURI = new SMWDIProperty("_URI");
			$arr_equi_values = $data->getPropertyValues($equivalentURI);

			// If no equivalentURIs, then maybe the article itself
			if (empty($arr_equi_values)) {
				// http://harth.org/andreas/foaf#ah
				$info = parse_url($this->articletext);
				(!isset($info['scheme'])) ? $scheme = "" : $scheme = $info['scheme'];
				(!isset($info['host'])) ? $host = "" : $host = "//".$info['host'];
				(!isset($info['path'])) ? $path = "" : $path = $info['path'];
				(!isset($info['query'])) ? $query = "" : $query = $info['query'];
				(!isset($info['fragment'])) ? $fragment = "" : $fragment = $info['fragment'];
				$arr_equi_values[] = new SMWDIUri($scheme, $host.$path, $query, $fragment);
			}

			foreach ($arr_equi_values as $uri) {
				// Two possibilities: 1. No URL 2. URL

				// Build the graph
				$graph = new EasyRdf_Graph($uri->getURI());
				$graph->load();
					
				// Now, we resolve this URI and store the rdf

				$html .= $this->displaySemanticHead($uri->getURI());
				if ( $this->showoutgoing ) {
					// should be: $data is of type SMWSemanticData
					$swdata = $this->getSemanticWebData($graph, $uri->getURI() );
					$html .= $this->displaySemanticWebData( $swdata, $leftside );
					$html .= $this->displayCenter();
				}
				if ( $this->showincoming ) {
					// TODO: Make work
					list( $indata, $more ) = $this->getSemanticWebInData($graph, $uri->getURI() );
					global $smwgBrowseShowInverse;
					if ( !$smwgBrowseShowInverse ) $leftside = !$leftside;
					$html .= $this->displaySemanticWebData( $indata, $leftside, true );
					$html .= $this->displayBottom( $more );
					// We need to switch browse inverse, again
					$leftside = !$leftside;
				}
			}

			// Apparently, it is here that the hash # gets removed, therefore removed.
			//$this->articletext = $this->subject->getWikiValue();

			// Add a bit space between the factbox and the query form
			if ( !$this->including() ) $html .= "<p> &#160; </p>\n";
		}
		if ( !$this->including() ) $html .= $this->queryForm();
		$wgOut->addHTML( $html );
	}

	/**
	 *
	 * Similar to getInData(), but in this case regarding the Semantic Web.
	 */
	private function getSemanticWebInData($graph, $uri) {

		$indata = new SMWSemanticData( $this->subject->getDataItem() );

		$options = new SMWRequestOptions();
		$options->sort = true;
		$options->limit = SWBSpecialBrowseWiki::$incomingpropertiescount;
		if ( $this->offset > 0 ) $options->offset = $this->offset;

		// I need all incoming properties
		//$inproperties = $this->getSemanticInProperties($graph, $this->subject->getDataItem(), $options );
		$inproperties = $this->getSemanticInProperties($graph, $uri, $options );

		if ( count( $inproperties ) == SWBSpecialBrowseWiki::$incomingpropertiescount ) {
			$more = true;
			array_pop( $inproperties ); // drop the last one
		} else {
			$more = false;
		}

		$valoptions = new SMWRequestOptions();
		$valoptions->sort = true;
		$valoptions->limit = SWBSpecialBrowseWiki::$incomingvaluescount;

		// For each incoming property, I run getArraySubjects.
		foreach ( $inproperties as $property ) {

			// $values = smwfGetStore()->getPropertySubjects( $property, $this->subject->getDataItem(), $valoptions );
			$values = $this->getSemanticPropertySubjects($graph, $property, $this->subject->getDataItem(), $valoptions );
			foreach ( $values as $value ) {
				$indata->addPropertyObjectValue( $property, $value );
			}
		}

		return array( $indata, $more );
	}

	/**
	 * Get an array of all properties for which there is some subject that
	 * relates to the given value. The result is an array of SMWDIWikiPage
	 * objects.
	 */
	private function getSemanticInProperties($graph, $uri, $requestoptions = null) {

		// Why not properties?
		$arr_wpgs = array();


		// Now, ask for all incoming uris
		//anna
		//$theIncomingProperties = $graph->reversePropertyUris($object);
		$theIncomingProperties = $graph->reversePropertyUris($uri);
		foreach ($theIncomingProperties as $inProp) {
			//$inPropResult = $this->getArraySubjects($graph, $inProp, $theResource);
			$inPropResult = $this->getArraySubjects($graph, $inProp, $uri);
			// TODO create $data
		}

		return $arr_wpgs;
	}

	/**
	 * Get an array of all subjects that have the given value for the given
	 * property. The result is an array of SMWDIWikiPage objects. If null
	 * is given as a value, all subjects having that property are returned.
	 */
	private function getSemanticPropertySubjects($graph, SMWDIProperty $property, $value, $requestoptions = null ) {
		$arr_wpgs = array();

		return $arr_wpgs;
	}

	/**
	 *
	 * Similar to getSemanticData(), but in this case regarding the Semantic Web.
	 * @param String $uri
	 */
	private function getSemanticWebData($graph, $uri) {
		// Several possibilities: URI with redirect to RDF, URL with RDFa (but talking about what?),...

		// $data is of type SMWSemanticData
		$semanticDataResult = new SMWSemanticData( $this->subject->getDataItem() );

		// I want to show all incoming and outcoming links
		// ...ideally in the same style
		// Get the representation of the URI
		$theResource = $graph->resource($uri);

		// Outgoing
		$theOutgoingProperties = $graph->propertyUris($theResource);

		// for each, ask for the objects
		foreach ($theOutgoingProperties as $outProp) {

			$outPropResult = $this->getArrayObjects($graph, $theResource, $outProp);

			// now, we have the subject, the property, the object (uri/literal)
			foreach ($outPropResult as $outPropObject) {

				/*
				 * The question now is, what kind of propert.
				 *
				 * If there is a page in the wiki, we simply use it as property.
				 *
				 * Otherwise, we need to invent a new page with the URI as name
				 *
				 */
				$uriPageName = $this->getInternalMapping( $outProp );

				$dataProperty = null;
				if (!isset($uriPageName) || $uriPageName == null) {
					// There is no, we create a new property page
					/*
					 * TODO: maybe register new property type that can display the property more
					 * conveniently, e.g., with browse further: smwInitProperties
					 */
					$dataProperty = SMWDIProperty::newFromUserLabel( $outProp );;

				} else {
					$dataProperty = SMWDIProperty::newFromUserLabel( $uriPageName );
				}

				// SMWDataItem, we only distinguish uri and literal
				// TODO: Maybe distinguish more, later, e.g., language
				$dataValue = null;

				if ($outPropObject["type"] == "uri") {

					/*
					 * If there is a page in the wiki with the value as equivalent URI, we
					 * just use this page.
					 */
					$uriPageName = $this->getInternalMapping( $outPropObject["value"] );

					if (!isset($uriPageName) && $uriPageName == null ) {

						// We could create a link that would lead to SemanticWebBrowser
						// $info = parse_url($outPropObject["value"]);
						//(!isset($info['scheme'])) ? $scheme = "" : $scheme = $info['scheme'];
						//(!isset($info['host'])) ? $host = "" : $host = "//".$info['host'];
						//(!isset($info['path'])) ? $path = "" : $path = $info['path'];
						//(!isset($info['query'])) ? $query = "" : $query = $info['query'];
						//(!isset($info['fragment'])) ? $fragment = "" : $fragment = $info['fragment'];
						//$dataItem = new SMWDIUri($scheme, $host.$path, $query, $fragment);
						//$dataItem = SMWDataValueFactory::newTypeIDValue( '_wpg', $outPropObject["value"] );

						// URI value
						// TODO: Make custom value type work, it is not used, yet.
						//$dataValue = SMWDataValueFactory::newTypeIDValue( '_rur', $outPropObject["value"], $property = $dataProperty );
						$dataValue = SMWDataValueFactory::newTypeIDValue( '_uri', $outPropObject["value"], $property = $dataProperty );
					} else {

						$dataValue = SMWDataValueFactory::newTypeIDValue( '_wpg', $uriPageName, $property = $dataProperty );
						//$dataItem = SMWDIWikiPage::newFromTitle(Title::newFromText($uriPageName));
					}

				} else {
					// literal
					$dataValue = SMWDataValueFactory::newTypeIDValue( '_txt', $outPropObject["value"], $property = $dataProperty );
					//$dataItem = new SMWDIString($outPropObject["value"]);
				}
				$semanticDataResult->addPropertyObjectValue( $dataProperty, $dataValue->getDataItem() );
			}
		}
		return $semanticDataResult;
	}

	/**
	 * Checks if the URI is known and an equivalent URI to any of the already
	 * existing pages. If so, it returns the name of the page, otherwise null.
	 *
	 * @param string $uri Identifier for an entity
	 * @return string The name of the page describing the entity, otherwise null
	 */
	public static function getInternalMapping( $uri ) {

		// Watch out correct spelling: [[equivalent URI::X]]
		$equivalentURI = new SMWDIProperty("_URI");
		$urivalue = SMWDataValueFactory::newPropertyObjectValue( $equivalentURI, $uri );

		// $values = smwfGetStore()->getPropertySubjects( $property, $this->subject->getDataItem(), $valoptions );
		$results = smwfGetStore()->getPropertySubjects( $equivalentURI, $urivalue->getDataItem() );

		$mappings = array();
		foreach($results as $result) {
			//$mappings[] = $result->getWikiValue();
			$mappings[] = $result->getTitle()->getText();
		}
		if (count($mappings) === 0) return null;
		return $mappings[0]; // TODO Only returns one. There never should be more than one.
	}

	private function getArrayObjects($graph, $subject, $property) {

		$arr_objects = array();

		// TODO: ignore bnodes, language tags, for now.

		$theOutgoingProperties = $graph->propertyUris($subject);

		// For each outgoing uri, get the resources/literals

		$theOutgoingUriValues = $graph->allResources($subject, $property);
		foreach ($theOutgoingUriValues as $uri) {
			// only non-bnodes
			if (!$uri->isBnode()) {
				$res = array("type" => "uri", "value" => $uri->getUri());
				$arr_objects[] = $res;
			}
		}

		$theOutgoingLiteralValues =  $graph->allLiterals($subject, $property );
		foreach ($theOutgoingLiteralValues as $literal) {

			// TODO: Display more nicely.
			if ($literal instanceof EasyRdf_Literal_Date || $literal instanceof EasyRdf_Literal_DateTime) {
				$res = array("type" => "literal", "value" => $literal->dumpValue(false));
			} else {
				$res = array("type" => "literal", "value" => $literal->getValue());
			}

			$arr_objects[] = $res;
		}

		return $arr_objects;
	}

	private function getArraySubjects($graph, $property, $object) {

		$arr_subjects = array();

		// For each incoming uri, get the resources (
		/*
		 * easyRDF is only storing whether incoming property, but not who it is
		 * This means, we need to go through all other subjects and check
		 * whether outgoing link is our subject
		 */
		$allResources = $graph->resources();

		// for each resource, get the values for each of the incoming properties
		foreach ($allResources as $aResource) {
			$allSpecResources = $graph->allResources($aResource, $property);

			// For each resource, check if our $object

			foreach ($allSpecResources as $aSpecResource) {
				if (!$aSpecResource->isBnode()) {
					if ($aSpecResource->getUri() == $object) {
							
						$res = array("type" => "uri", "value" => $aSpecResource->getUri());
						$arr_subjects[] = $res;
					}
				}
			}
		}

		return $arr_subjects;
	}

	/**
	 * Creates the HTML table displaying the data of one subject.
	 *based on displayData
	 * @param[in] $data SMWSemanticData  The data to be displayed
	 * @param[in] $left bool  Should properties be displayed on the left side?
	 * @param[in] $incoming bool  Is this an incoming? Or an outgoing?
	 *
	 * @return A string containing the HTML with the factbox
	 *
	 * @deprecated Replaced by displaySemanticWebData
	 */
	private function getProperty( SMWSemanticData $data,$propertyName, $left = true, $incoming = false ) {
		// Some of the CSS classes are different for the left or the right side.
		// In this case, there is an "i" after the "smwb-". This is set here.
		$ccsPrefix = $left ? 'smwb-' : 'smwb-i';
		$returnvalues=array();
		$html = "<table class=\"{$ccsPrefix}factbox\" cellpadding=\"0\" cellspacing=\"0\">\n";

		$diProperties = $data->getProperties();
		$noresult = true;
		foreach ( $diProperties as $diProperty ) {
			$label='';
			$dvProperty = SMWDataValueFactory::newDataItemValue( $diProperty, null );
			echo "================================================================\n           ";
			if ( $dvProperty->isVisible() ) {
				$label=$this->getPropertyLabel( $dvProperty, $incoming );
				//echo "Label='".$label."'\n";
				//echo "PropertyNamel='".$propertyName."'\n";
				$dvProperty->setCaption( $this->getPropertyLabel( $dvProperty, $incoming ) );
				$proptext = $dvProperty->getShortHTMLText( smwfGetLinker() ) . "\n";
				echo "Proptext1='".$proptext."'\n";
			} elseif ( $diProperty->getKey() == '_INST' ) {
				$proptext = smwfGetLinker()->specialLink( 'Categories' );
				echo "Proptext2='".$proptext."'";
			} elseif ( $diProperty->getKey() == '_REDI' ) {
				$proptext = smwfGetLinker()->specialLink( 'Listredirects', 'isredirect' );
				echo "Proptext3='".$proptext."'";
			} else {
				continue; // skip this line
			}


			$head  = "<th>" . $proptext . "</th>\n";

			$body  = "<td>\n";

			$values = $data->getPropertyValues( $diProperty );

			//Check on needed property name and safe its values


			if ( $incoming && ( count( $values ) >= SWBSpecialBrowseWiki::$incomingvaluescount ) ) {
				$moreIncoming = true;
				array_pop( $values );
			} else {
				$moreIncoming = false;
			}

			$first = true;
			foreach ( $values as $di ) {
				if ( $first ) {
					$first = false;
				} else {
					$body .= ', ';
				}

				if ( $incoming ) {
					$dv = SMWDataValueFactory::newDataItemValue( $di, null );
				} else {
					$dv = SMWDataValueFactory::newDataItemValue( $di, $diProperty );
				}
				$value=$this->displayValue( $dvProperty, $dv, $incoming );
				//$text=$value->getValue();
				echo " GetProperty.Value='".$value."'";
				if(strpos($label,$propertyName)>0){
					echo "index ok";
					array_push($returnvalues,$value);
				}
				//	echo "Text='".$text."'";
				$body .= "<span class=\"{$ccsPrefix}value\">" .
				$this->displayValue( $dvProperty, $dv, $incoming ) . "</span>\n";
			}

			if ( $moreIncoming ) { // link to the remaining incoming pages:
				$body .= Html::element(
					'a',
				array(
						'href' => SpecialPage::getSafeTitleFor( 'SearchByProperty' )->getLocalURL( array(
							 'property' => $dvProperty->getWikiValue(), 
							 'value' => $this->subject->getWikiValue()
				) )
				),
				wfMsg( "smw_browse_more" )
				);

			}

			$body .= "</td>\n";

			// display row
			$html .= "<tr class=\"{$ccsPrefix}propvalue\">\n" .
			( $left ? ( $head . $body ):( $body . $head ) ) . "</tr>\n";
			$noresult = false;
		} // end foreach properties

		if ( $noresult ) {
			$html .= "<tr class=\"smwb-propvalue\"><th> &#160; </th><td><em>" .
			wfMsg( $incoming ? 'swb_browse_no_incoming':'swb_browse_no_outgoing' ) . "</em></td></tr>\n";
		}
		$html .= "</table>\n";
		return $returnvalues;
	}

	/**
	 * Creates the HTML table displaying the Semantic Web data of one uri
	 *
	 * @param SMWSemanticData $data
	 * @param boolean $left Should properties be displayed on the left side?
	 * @param unknown_type $incoming Is this an incoming? Or an outgoing? Just important for displaying.
	 *
	 * @return A string containing the HTML with the factbox
	 */
	private function displaySemanticWebData (SMWSemanticData $data, $left = true, $incoming = false ) {
		// Some of the CSS classes are different for the left or the right side.
		// In this case, there is an "i" after the "smwb-". This is set here.
		$ccsPrefix = $left ? 'smwb-' : 'smwb-i';

		$html = "<table class=\"{$ccsPrefix}factbox\" cellpadding=\"0\" cellspacing=\"0\">\n";

		$diProperties = $data->getProperties();
		$noresult = true;
		foreach ( $diProperties as $diProperty ) {

			// Here, we only create typical property values.
			$dvProperty = SMWDataValueFactory::newDataItemValue( $diProperty, null );

			if ( $dvProperty->isVisible() ) {
				$dvProperty->setCaption( $this->getPropertyLabel( $dvProperty, $incoming ) );
				$proptext = $dvProperty->getShortHTMLText( smwfGetLinker() ) . "\n";

				// Typically, we have a URI. Provide link to further browse the SW.
				// Always type 11 for prop: echo "dipropType:".$diProperty->getDIType();
					
			} elseif ( $diProperty->getKey() == '_INST' ) {
				$proptext = smwfGetLinker()->specialLink( 'Categories' );
			} elseif ( $diProperty->getKey() == '_REDI' ) {
				$proptext = smwfGetLinker()->specialLink( 'Listredirects', 'isredirect' );
			} else {
				continue; // skip this line
			}

			$head  = "<th>" . $proptext . "</th>\n";

			$body  = "<td>\n";

			$values = $data->getPropertyValues( $diProperty );
			if ( $incoming && ( count( $values ) >= SWBSpecialBrowseWiki::$incomingvaluescount ) ) {
				$moreIncoming = true;
				array_pop( $values );
			} else {
				$moreIncoming = false;
			}

			$first = true;
			foreach ( $values as $di ) {
				if ( $first ) {
					$first = false;
				} else {
					$body .= ', ';
				}
				// Sometimes also different: echo "di value type:".$di->getDIType();
				if ( $incoming ) {
					$dv = SMWDataValueFactory::newDataItemValue( $di, null );
				} else {
					//$dv = SMWDataValueFactory::newDataItemValue( $di, $diProperty );
					// We do have values of different types, therefore not specific property.
					// TODO: Later, we could look into property, whether specific type to override.
					$dv = SMWDataValueFactory::newDataItemValue( $di, null );
				}

				$body .= "<span class=\"{$ccsPrefix}value\">" .
				//$this->displayValue( $dvProperty, $dv, $incoming ) . "</span>\n";
				$this->displaySemanticValue( $dvProperty, $dv, $incoming ) . "</span>\n";
			}

			if ( $moreIncoming ) { // link to the remaining incoming pages:
				$body .= Html::element(
					'a',
				array(
						'href' => SpecialPage::getSafeTitleFor( 'SearchByProperty' )->getLocalURL( array(
							 'property' => $dvProperty->getWikiValue(), 
							 'value' => $this->subject->getWikiValue()
				) )
				),
				wfMsg( "smw_browse_more" )
				);

			}

			$body .= "</td>\n";

			// display row
			$html .= "<tr class=\"{$ccsPrefix}propvalue\">\n" .
			( $left ? ( $head . $body ):( $body . $head ) ) . "</tr>\n";
			$noresult = false;
		} // end foreach properties

		if ( $noresult ) {
			$html .= "<tr class=\"smwb-propvalue\"><th> &#160; </th><td><em>" .
			wfMsg( $incoming ? 'swb_browse_no_incoming':'swb_browse_no_outgoing' ) . "</em></td></tr>\n";
		}
		$html .= "</table>\n";
		return $html;
	}

	/**
	 * Creates the HTML table displaying the data of one subject.
	 *
	 * @param[in] $data SMWSemanticData  The data to be displayed
	 * @param[in] $left bool  Should properties be displayed on the left side?
	 * @param[in] $incoming bool  Is this an incoming? Or an outgoing?
	 *
	 * @return A string containing the HTML with the factbox
	 */
	private function displayData( SMWSemanticData $data, $left = true, $incoming = false ) {
		// Some of the CSS classes are different for the left or the right side.
		// In this case, there is an "i" after the "smwb-". This is set here.
		$ccsPrefix = $left ? 'smwb-' : 'smwb-i';

		$html = "<table class=\"{$ccsPrefix}factbox\" cellpadding=\"0\" cellspacing=\"0\">\n";

		$diProperties = $data->getProperties();
		$noresult = true;
		foreach ( $diProperties as $diProperty ) {
			$dvProperty = SMWDataValueFactory::newDataItemValue( $diProperty, null );

			if ( $dvProperty->isVisible() ) {
				$dvProperty->setCaption( $this->getPropertyLabel( $dvProperty, $incoming ) );
				$proptext = $dvProperty->getShortHTMLText( smwfGetLinker() ) . "\n";
			} elseif ( $diProperty->getKey() == '_INST' ) {
				$proptext = smwfGetLinker()->specialLink( 'Categories' );
			} elseif ( $diProperty->getKey() == '_REDI' ) {
				$proptext = smwfGetLinker()->specialLink( 'Listredirects', 'isredirect' );
			} else {
				continue; // skip this line
			}

			$head  = "<th>" . $proptext . "</th>\n";

			$body  = "<td>\n";

			$values = $data->getPropertyValues( $diProperty );
			if ( $incoming && ( count( $values ) >= SWBSpecialBrowseWiki::$incomingvaluescount ) ) {
				$moreIncoming = true;
				array_pop( $values );
			} else {
				$moreIncoming = false;
			}

			$first = true;
			foreach ( $values as $di ) {
				if ( $first ) {
					$first = false;
				} else {
					$body .= ', ';
				}

				if ( $incoming ) {
					$dv = SMWDataValueFactory::newDataItemValue( $di, null );
				} else {
					$dv = SMWDataValueFactory::newDataItemValue( $di, $diProperty );
				}
				$body .= "<span class=\"{$ccsPrefix}value\">" .
				$this->displayValue( $dvProperty, $dv, $incoming ) . "</span>\n";
			}

			if ( $moreIncoming ) { // link to the remaining incoming pages:
				$body .= Html::element(
					'a',
				array(
						'href' => SpecialPage::getSafeTitleFor( 'SearchByProperty' )->getLocalURL( array(
							 'property' => $dvProperty->getWikiValue(), 
							 'value' => $this->subject->getWikiValue()
				) )
				),
				wfMsg( "smw_browse_more" )
				);

			}

			$body .= "</td>\n";

			// display row
			$html .= "<tr class=\"{$ccsPrefix}propvalue\">\n" .
			( $left ? ( $head . $body ):( $body . $head ) ) . "</tr>\n";
			$noresult = false;
		} // end foreach properties

		if ( $noresult ) {
			$html .= "<tr class=\"smwb-propvalue\"><th> &#160; </th><td><em>" .
			wfMsg( $incoming ? 'swb_browse_no_incoming':'swb_browse_no_outgoing' ) . "</em></td></tr>\n";
		}
		$html .= "</table>\n";
		return $html;
	}

	/**
	 * Displays a value, including all relevant links (browse and search by property)
	 *
	 * @param[in] $property SMWPropertyValue  The property this value is linked to the subject with
	 * @param[in] $value SMWDataValue  The actual value
	 * @param[in] $incoming bool  If this is an incoming or outgoing link
	 *
	 * @return string  HTML with the link to the article, browse, and search pages
	 */
	private function displaySemanticValue( SMWPropertyValue $property, SMWDataValue $dataValue, $incoming ) {
		$linker = smwfGetLinker();

		$html = $dataValue->getLongHTMLText( $linker );

		// TODO: How to I trigger autoload if extends?
		SMWInfolink::decodeParameters();
		if ( $dataValue->getTypeID() == '_wpg' ) {
			$html .= "&#160;" . SWBInfolink::newBrowsingLink( '+', $dataValue->getLongWikiText() )->getHTML( $linker );
		} elseif ( $incoming && $property->isVisible() ) {
			$html .= "&#160;" . SWBInfolink::newInversePropertySearchLink( '+', $dataValue->getTitle(), $property->getDataItem()->getLabel(), 'smwsearch' )->getHTML( $linker );
		} else {
			$html .= $dataValue->getInfolinkText( SMW_OUTPUT_HTML, $linker );

			if ($dataValue->getTypeID() == "_uri") {
				// Provide link for browsing
				$html .= "&#160;" . SWBInfolink::newBrowsingLink( '+', $dataValue->getLongWikiText() )->getHTML( $linker );
			}

			// TODO: Literal possibly visualized different also
		}

		return $html;
	}

	/**
	 * Displays a value, including all relevant links (browse and search by property)
	 *
	 * @param[in] $property SMWPropertyValue  The property this value is linked to the subject with
	 * @param[in] $value SMWDataValue  The actual value
	 * @param[in] $incoming bool  If this is an incoming or outgoing link
	 *
	 * @return string  HTML with the link to the article, browse, and search pages
	 */
	private function displayValue( SMWPropertyValue $property, SMWDataValue $dataValue, $incoming ) {
		$linker = smwfGetLinker();

		$html = $dataValue->getLongHTMLText( $linker );

		// TODO: How to I trigger autoload if extends?
		SMWInfolink::decodeParameters();
		if ( $dataValue->getTypeID() == '_wpg' ) {
			$html .= "&#160;" . SWBInfolink::newBrowsingLink( '+', $dataValue->getLongWikiText() )->getHTML( $linker );
		} elseif ( $incoming && $property->isVisible() ) {
			$html .= "&#160;" . SWBInfolink::newInversePropertySearchLink( '+', $dataValue->getTitle(), $property->getDataItem()->getLabel(), 'smwsearch' )->getHTML( $linker );
		} else {
			$html .= $dataValue->getInfolinkText( SMW_OUTPUT_HTML, $linker );
		}

		return $html;
	}

	/**
	 * Displays the subject that is currently being browsed to.
	 *
	 * @return A string containing the HTML with the subject line
	 */
	private function displayHead() {
		global $wgOut;

		$wgOut->setHTMLTitle( $this->subject->getTitle() );
		$html  = "<table class=\"smwb-factbox\" cellpadding=\"0\" cellspacing=\"0\">\n";
		$html .= "<tr class=\"smwb-title\"><td colspan=\"2\">\n";
		$html .= smwfGetLinker()->makeLinkObj( $this->subject->getTitle() ) . "\n"; // @todo Replace makeLinkObj with link as soon as we drop MW1.12 compatibility
		$html .= "</td></tr>\n";
		$html .= "</table>\n";

		return $html;
	}

	/**
	 * Displays the equivalent URI that is currently being browsed to.
	 *
	 * @return A string containing the HTML with the subject line
	 */
	private function displaySemanticHead($uri) {
		global $wgOut;

		$wgOut->setHTMLTitle( $this->subject->getTitle() );
		$html  = "<table class=\"smwb-factbox\" cellpadding=\"0\" cellspacing=\"0\">\n";
		$html .= "<tr class=\"smwb-title\"><td colspan=\"2\">\n";
		// No link but full URI should be shown
		$html .= $uri. "\n"; // @todo Replace makeLinkObj with link as soon as we drop MW1.12 compatibility
		$html .= "</td></tr>\n";
		$html .= "</table>\n";

		return $html;
	}

	/**
	 * Creates the HTML for the center bar including the links with further navigation options.
	 *
	 * @return string  HTMl with the center bar
	 */
	private function displayCenter() {
		return "<a name=\"smw_browse_incoming\"></a>\n" .
		       "<table class=\"smwb-factbox\" cellpadding=\"0\" cellspacing=\"0\">\n" .
		       "<tr class=\"smwb-center\"><td colspan=\"2\">\n" .
		( $this->showincoming ?
		$this->linkHere( wfMsg( 'smw_browse_hide_incoming' ), true, false, 0 ):
		$this->linkHere( wfMsg( 'smw_browse_show_incoming' ), true, true, $this->offset ) ) .
		       "&#160;\n" . "</td></tr>\n" . "</table>\n";
	}

	/**
	 * Creates the HTML for the bottom bar including the links with further navigation options.
	 *
	 * @param[in] $more bool  Are there more inproperties to be displayed?
	 * @return string  HTMl with the bottom bar
	 */
	private function displayBottom( $more ) {
		$html  = "<table class=\"smwb-factbox\" cellpadding=\"0\" cellspacing=\"0\">\n" .
		         "<tr class=\"smwb-center\"><td colspan=\"2\">\n";
		global $smwgBrowseShowAll;
		if ( !$smwgBrowseShowAll ) {
			if ( ( $this->offset > 0 ) || $more ) {
				$offset = max( $this->offset - SWBSpecialBrowseWiki::$incomingpropertiescount + 1, 0 );
				$html .= ( $this->offset == 0 ) ? wfMsg( 'smw_result_prev' ):
				$this->linkHere( wfMsg( 'smw_result_prev' ), $this->showoutgoing, true, $offset );
				$offset = $this->offset + SWBSpecialBrowseWiki::$incomingpropertiescount - 1;
				$html .= " &#160;&#160;&#160;  <strong>" . wfMsg( 'smw_result_results' ) . " " . ( $this->offset + 1 ) .
						 " â€“ " . ( $offset ) . "</strong>  &#160;&#160;&#160; ";
				$html .= $more ? $this->linkHere( wfMsg( 'smw_result_next' ), $this->showoutgoing, true, $offset ):wfMsg( 'smw_result_next' );
			}
		}
		$html .= "&#160;\n" . "</td></tr>\n" . "</table>\n";
		return $html;
	}

	/**
	 * Creates the HTML for a link to this page, with some parameters set.
	 *
	 * @param[in] $text string  The anchor text for the link
	 * @param[in] $out bool  Should the linked to page include outgoing properties?
	 * @param[in] $in bool  Should the linked to page include incoming properties?
	 * @param[in] $offset int  What is the offset for the incoming properties?
	 *
	 * @return string  HTML with the link to this page
	 */
	private function linkHere( $text, $out, $in, $offset ) {
		$dir = $out ? ( $in ? 'both' : 'out' ) : 'in';
		$frag = ( $text == wfMsg( 'smw_browse_show_incoming' ) ) ? '#smw_browse_incoming' : '';

		return Html::element(
			'a',
		array(
				'href' => SpecialPage::getSafeTitleFor( 'BrowseWiki' )->getLocalURL( array(
					'offset' => "{$offset}&dir={$dir}",
					'article' => $this->subject->getLongWikiText() . $frag
		) )
		),
		$text
		);
	}

	/**
	 * Creates a Semantic Data object with the incoming properties instead of the
	 * usual outproperties.
	 *
	 * @return array(SMWSemanticData, bool)  The semantic data including all inproperties, and if there are more inproperties left
	 */
	private function getInData() {
		$indata = new SMWSemanticData( $this->subject->getDataItem() );
		$options = new SMWRequestOptions();
		$options->sort = true;
		$options->limit = SWBSpecialBrowseWiki::$incomingpropertiescount;
		if ( $this->offset > 0 ) $options->offset = $this->offset;

		$inproperties = smwfGetStore()->getInProperties( $this->subject->getDataItem(), $options );

		if ( count( $inproperties ) == SWBSpecialBrowseWiki::$incomingpropertiescount ) {
			$more = true;
			array_pop( $inproperties ); // drop the last one
		} else {
			$more = false;
		}

		$valoptions = new SMWRequestOptions();
		$valoptions->sort = true;
		$valoptions->limit = SWBSpecialBrowseWiki::$incomingvaluescount;

		foreach ( $inproperties as $property ) {
			$values = smwfGetStore()->getPropertySubjects( $property, $this->subject->getDataItem(), $valoptions );
			foreach ( $values as $value ) {
				$indata->addPropertyObjectValue( $property, $value );
			}
		}

		return array( $indata, $more );
	}

	/**
	 * Figures out the label of the property to be used. For outgoing ones it is just
	 * the text, for incoming ones we try to figure out the inverse one if needed,
	 * either by looking for an explicitly stated one or by creating a default one.
	 *
	 * @param[in] $property SMWPropertyValue  The property of interest
	 * @param[in] $incoming bool  If it is an incoming property
	 *
	 * @return string  The label of the property
	 */
	private function getPropertyLabel( SMWPropertyValue $property, $incoming = false ) {
		global $smwgBrowseShowInverse;

		if ( $incoming && $smwgBrowseShowInverse ) {
			$oppositeprop = SMWPropertyValue::makeUserProperty( wfMsg( 'smw_inverse_label_property' ) );
			$labelarray = &smwfGetStore()->getPropertyValues( $property->getDataItem()->getDiWikiPage(), $oppositeprop->getDataItem() );
			$rv = ( count( $labelarray ) > 0 ) ? $labelarray[0]->getLongWikiText():
			wfMsg( 'smw_inverse_label_default', $property->getWikiValue() );
		} else {
			$rv = $property->getWikiValue();
		}

		return $this->unbreak( $rv );
	}

	/**
	 * Creates the query form in order to quickly switch to a specific article.
	 *
	 * @return A string containing the HTML for the form
	 */
	private function queryForm() {
		self::addAutoComplete();
		$title = SpecialPage::getTitleFor( 'BrowseWiki' );
		return '  <form name="smwbrowse" action="' . $title->escapeLocalURL() . '" method="get">' . "\n" .
		       '    <input type="hidden" name="title" value="' . $title->getPrefixedText() . '"/>' .
		wfMsg( 'smw_browse_article' ) . "<br />\n" .
		       '    <input type="text" name="article" id="page_input_box" value="' . htmlspecialchars( $this->articletext ) . '" />' . "\n" .
		       '    <input type="submit" value="' . wfMsg( 'smw_browse_go' ) . "\"/>\n" .
		       "  </form>\n";
	}

	/**
	 * Creates the JS needed for adding auto-completion to queryForm(). Uses the
	 * MW API to fetch suggestions.
	 */
	private static function addAutoComplete(){
		SMWOutputs::requireResource( 'jquery.ui.autocomplete' );

		$javascript_autocomplete_text = <<<END
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#page_input_box").autocomplete({
		minLength: 3,
		source: function(request, response) {
			jQuery.getJSON(wgScriptPath+'/api.php?action=opensearch&limit=10&namespace=0&format=jsonfm&search='+request.term, function(data){
				response(data[1]);
			});
		}
	});
});
</script>

END;

		SMWOutputs::requireScript( 'smwAutocompleteSpecialBrowse', $javascript_autocomplete_text );
	}

	/**
	 * Replace the last two space characters with unbreakable spaces for beautification.
	 *
	 * @param[in] $text string  Text to be transformed. Does not need to have spaces
	 * @return string  Transformed text
	 */
	private function unbreak( $text ) {
		$nonBreakingSpace = html_entity_decode( '&#160;', ENT_NOQUOTES, 'UTF-8' );
		$text = preg_replace( '/[\s]/u', $nonBreakingSpace, $text, - 1, $count );
		return $count > 2 ? preg_replace( '/($nonBreakingSpace)/u', ' ', $text, max( 0, $count - 2 ) ):$text;
	}


	//Add Test Foaf-Info

	/**
	 *
	 * create object EaysRDF Graph based on uri
	 * load graph
	 * load information about person
	 * get information about person
	 * safe information together and return this information
	 * @param unknown_type $uri
	 * @param unknown_type $html
	 */

	private function foafInfo($uri){
		global $wgOut;
		$html="\n";
		if (isset($uri)) {
			if ( $uri != '' ) {
				$graph = new EasyRdf_Graph($uri);
				$graph->load();
				if ($graph->type() == 'foaf:PersonalProfileDocument') {
					$person = $graph->primaryTopic();
				}else if ($graph->type() == 'foaf:Person') {
					$person = $graph->resource();
				}
			}
		}
		$html.=$this->displayHead();
		if (isset($person)) {
			$Name=$person->get('foaf:name');
			$Homepage=link_to( $person->get('foaf:homepage') );
			$Description=$person->get(array('dc:description','dc11:description'));
			$html.="Name:".$Name."<br />";
			$html.="Homepage:".$Homepage."<br />";
			$html.="Description:".$Description."<br />";

			$wgOut->addHTML("Name:".$Name);
			$wgOut->addHTML("Homepage:".$Homepage);
			$wgOut->addHTML("Description:".$Description);

			//echo "<h2>Known Persons</h2>\n";
			//echo "<ul>\n";
			$html.="<h2>Known Persons</h2>\n";
			$html.="<ul>\n";
			foreach ($person->all('foaf:knows') as $friend) {
				$label = $friend->label();
				if (!$label) {
					$label = $friend->getUri();
				}

				if ($friend->isBnode()) {
					//echo "<li>$label</li>";
					$html.="<li>$label</li>";
				} else {
					$html.="<li>".link_to_self( $label, 'uri='.urlencode($friend) )."</li>";
					// echo "<li>".link_to_self( $label, 'uri='.urlencode($friend) )."</li>";
				}
			}
			// echo "</ul>\n";
			$html.="</ul>\n";
		}

		if (isset($graph)) {
			//echo "<br />";
			// echo $graph->dump();
			$html.="<br />";
			$html.=$graph->dump();
		}
		return $html;
	}

}

