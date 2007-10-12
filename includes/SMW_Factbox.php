<?php
/**
 * The class in this file manages the parsing, displaying, and storing of semantic
 * data that is usually displayed within the factbox.
 *
 * @author Markus Krötzsch
 */

global $smwgIP;
include_once($smwgIP . '/includes/SMW_SemanticData.php');

/**
 * Static class for representing semantic data, which accepts user
 * inputs and provides methods for printing and storing its contents.
 * Its main purpose is to provide a persistent storage to keep semantic
 * data between hooks for parsing and storing.
 */
class SMWFactbox {

	/**
	 * The actual contained for the semantic annotations. Public, since
	 * it is ref-passed to othes for further processing.
	 */
	static $semdata;
	/**
	 * The skin that is to be used for output functions.
	 */
	static protected $skin;

	/**
	 * Initialisation method. Must be called before anything else happens.
	 */
	static function initStorage($title, $skin) {
		SMWFactbox::$semdata = new SMWSemanticData($title);
		SMWFactbox::$skin = $skin;
	}

	/**
	 * Clear all stored data
	 */
	static function clearStorage() {
		global $smwgStoreActive;
		if ($smwgStoreActive) {
			SMWFactbox::$semdata->clear();
		}
	}

//// Methods for adding data to the object

	/**
	 * This method adds a new attribute with the given value to the storage.
	 * It returns an array which contains the result of the operation in
	 * various formats.
	 */
	static function addProperty($propertyname, $value, $caption) {
		wfProfileIn("SMWFactbox::addProperty (SMW)");
		global $smwgContLang, $smwgStoreActive, $smwgIP;
		include_once($smwgIP . '/includes/SMW_DataValueFactory.php');
		// See if this attribute is a special one like e.g. "Has unit"
		$propertyname = smwfNormalTitleText($propertyname); //slightly normalize label
		$special = $smwgContLang->findSpecialPropertyID($propertyname);

		switch ($special) {
			case false: // normal attribute
				$result = SMWDataValueFactory::newPropertyValue($propertyname,$value,$caption);
				if ($smwgStoreActive) {
					SMWFactbox::$semdata->addPropertyValue($propertyname,$result);
				}
				wfProfileOut("SMWFactbox::addProperty (SMW)");
				return $result;
			case SMW_SP_IMPORTED_FROM: // this requires special handling
				$result = SMWFactbox::addImportedDefinition($value,$caption);
				wfProfileOut("SMWFactbox::addProperty (SMW)");
				return $result;
			default: // generic special attribute
				if ( $special === SMW_SP_SERVICE_LINK ) { // do some custom formatting in this case
					global $wgContLang;
					$v = str_replace(' ', '_', $value); //normalize slightly since messages distinguish '_' and ' '
					$result = SMWDataValueFactory::newSpecialValue($special,$v,$caption);
					$v = $result->getXSDValue(); //possibly further sanitized, so let's be cautious
					//$result->setProcessedValues($value,$v); //set user value back to the input version
					//$result->setPrintoutString('[[' . $wgContLang->getNsText(NS_MEDIAWIKI) . ':smw_service_' . $v . "|$value]]");
				} else { // standard processing
					$result = SMWDataValueFactory::newSpecialValue($special,$value,$caption);
				}
				if ($smwgStoreActive) {
					SMWFactbox::$semdata->addSpecialValue($special,$result);
				}
				wfProfileOut("SMWFactbox::addProperty (SMW)");
				return $result;
		}
	}

	/**
	 * This method adds multiple special properties needed to use the given
	 * article for representing an element from a whitelisted external
	 * ontology element. It does various feasibility checks (typing etc.)
	 * and returns a "virtual" value object that can be used for printing
	 * in text. Although many attributes are added, not all are printed in
	 * the factbox, since some do not have a translated name (and thus also
	 * could not be specified directly).
	 */
	static private function addImportedDefinition($value,$caption) {
		global $wgContLang, $smwgStoreActive;

		list($onto_ns,$onto_section) = explode(':',$value,2);
		$msglines = preg_split("([\n][\s]?)",wfMsgForContent("smw_import_$onto_ns")); // get the definition for "$namespace:$section"

		if ( count($msglines) < 2 ) { //error: no elements for this namespace
			/// TODO: use new Error DV
			$datavalue = SMWDataValueFactory::newTypeIDValue('__err',$value,$caption);
			$datavalue->addError(wfMsgForContent('smw_unknown_importns',$onto_ns));
			if ($smwgStoreActive) {
				SMWFactbox::$semdata->addSpecialValue(SMW_SP_IMPORTED_FROM,$datavalue);
			}
			return $datavalue;
		}

		list($onto_uri,$onto_name) = explode('|',array_shift($msglines),2);
		if ( ' ' == $onto_uri[0]) $onto_uri = mb_substr($onto_uri,1); // tolerate initial space
		$elemtype = -1;
		$datatype = NULL;
		foreach ( $msglines as $msgline ) {
			list($secname,$typestring) = explode('|',$msgline,2);
			if ( $secname === $onto_section ) {
				list($namespace, ) = explode(':',$typestring,2);
				// check whether type matches
				switch ($namespace) {
					case $wgContLang->getNsText(SMW_NS_TYPE):
						$elemtype = SMW_NS_PROPERTY;
						$datatype = SMWDataValueFactory::newSpecialValue(SMW_SP_HAS_TYPE, $typestring);
						break;
					case $wgContLang->getNsText(SMW_NS_PROPERTY):
						$elemtype = SMW_NS_PROPERTY;
						break;
					case $wgContLang->getNsText(NS_CATEGORY):
						$elemtype = NS_CATEGORY;
						break;
					default: // match all other namespaces
						$elemtype = NS_MAIN;
				}
				break;
			}
		}

		// check whether element of correct type was found
		$this_ns = SMWFactbox::$semdata->getSubject()->getNamespace();
		$error = NULL;
		switch ($elemtype) {
			case SMW_NS_PROPERTY: case NS_CATEGORY:
				if ($this_ns != $elemtype) {
					$error = wfMsgForContent('smw_nonright_importtype',$value, $wgContLang->getNsText($elemtype));
				}
				break;
			case NS_MAIN:
				if ( (SMW_NS_PROPERTY == $this_ns) || (NS_CATEGORY == $this_ns)) {
					$error = wfMsgForContent('smw_wrong_importtype',$value, $wgContLang->getNsText($this_ns));
				}
				break;
			case -1:
				$error = wfMsgForContent('smw_no_importelement',$value);
		}

		if (NULL != $error) {
			$datavalue = SMWDataValueFactory::newTypeIDValue('__err',$value,$caption);
			$datavalue->addError($error);
			if ($smwgStoreActive) {
				SMWFactbox::$semdata->addSpecialValue(SMW_SP_IMPORTED_FROM, $datavalue);
			}
			return $datavalue;
		}

		if ($smwgStoreActive) {
			SMWFactbox::$semdata->addSpecialValue(SMW_SP_EXT_BASEURI,SMWDataValueFactory::newTypeIDValue('_str',$onto_uri));
			SMWFactbox::$semdata->addSpecialValue(SMW_SP_EXT_NSID,SMWDataValueFactory::newTypeIDValue('_str',$onto_ns));
			SMWFactbox::$semdata->addSpecialValue(SMW_SP_EXT_SECTION,SMWDataValueFactory::newTypeIDValue('_str',$onto_section));
			if (NULL !== $datatype) {
				SMWFactbox::$semdata->addSpecialValue(SMW_SP_HAS_TYPE,$datatype);
			}
		}
		// print the input (this property is usually not stored, see SMW_SQLStore.php)
		$datavalue = SMWDataValueFactory::newTypeIDValue('_str',"[$onto_uri$onto_section $value] ($onto_name)",$caption);
		if ($smwgStoreActive) {
			SMWFactbox::$semdata->addSpecialValue(SMW_SP_IMPORTED_FROM, $datavalue);
		}
		return $datavalue;
	}

//// Methods for printing the content of this object into an factbox   */

	/**
	 * This method prints semantic data at the bottom of an article.
	 */
	static function printFactbox(&$text) {
		global $wgContLang, $wgServer, $smwgShowFactbox, $smwgShowFactboxEdit, $smwgStoreActive, $smwgIP, $wgRequest;
		if (!$smwgStoreActive) return;

		if ( $wgRequest->getCheck('wpPreview') ) {
			$showfactbox = $smwgShowFactboxEdit;
		} else {
			$showfactbox = $smwgShowFactbox;
		}

		wfProfileIn("SMWFactbox::printFactbox (SMW)");
		switch ($showfactbox) {
		case SMW_FACTBOX_HIDDEN: // never
			wfProfileOut("SMWFactbox::printFactbox (SMW)");
			return;
		case SMW_FACTBOX_SPECIAL: // only when there are special properties
			if ( !SMWFactbox::$semdata->hasSpecialProperties() ) {
				wfProfileOut("SMWFactbox::printFactbox (SMW)");
				return;
			}
			break;
		case SMW_FACTBOX_NONEMPTY: // only when non-empty
			if ( (!SMWFactbox::$semdata->hasProperties()) && (!SMWFactbox::$semdata->hasSpecialProperties()) ) {
				wfProfileOut("SMWFactbox::printFactbox (SMW)");
				return;
			}
			break;
		// case SMW_FACTBOX_SHOWN: display
		}

		smwfRequireHeadItem(SMW_HEADER_STYLE);
		include_once($smwgIP . '/includes/SMW_Infolink.php');
		$rdflink = SMWInfolink::newInternalLink(wfMsgForContent('smw_viewasrdf'), $wgContLang->getNsText(NS_SPECIAL) . ':ExportRDF/' . str_replace('%2F', '/', urlencode(SMWFactbox::$semdata->getSubject()->getPrefixedText())), 'rdflink');

		$browselink = SMWInfolink::newBrowsingLink(SMWFactbox::$semdata->getSubject()->getText(), SMWFactbox::$semdata->getSubject()->getPrefixedText(), 'swmfactboxheadbrowse');
		// The "\n" is to ensure that lists on the end of articles are terminated
		// before the div starts. It would of course be much cleaner to print the
		// factbox in another way, similar to the way that categories are printed
		// now. However, this would require more patching of MediaWiki code ...
		$text .= "\n" . '<div class="smwfact">' .
		         '<span class="smwfactboxhead">' . wfMsgForContent('smw_factbox_head', $browselink->getWikiText() ) . '</span>' .
		         '<span class="smwrdflink">' . $rdflink->getWikiText() . '</span>' .
		         '<table class="smwfacttable">' . "\n";
		SMWFactbox::printProperties($text);
		$text .= '</table></div>';
		wfProfileOut("SMWFactbox::printFactbox (SMW)");
	}

	/**
	 * This method prints attribute values at the bottom of an article.
	 */
	static protected function printProperties(&$text) {
		if (!SMWFactbox::$semdata->hasProperties() && !SMWFactbox::$semdata->hasSpecialProperties()) {
			return;
		}
		global $wgContLang;

		//$text .= ' <tr><th class="atthead"></th><th class="atthead">' . wfMsgForContent('smw_att_head') . "</th></tr>\n";

		foreach(SMWFactbox::$semdata->getProperties() as $key => $property) {
			$text .= '<tr><td class="smwattname">';
			if ($property instanceof Title) {
				$text .= '<tr><td class="smwattname">[[' . $property->getPrefixedText() . '|' . preg_replace('/[\s]/','&nbsp;',$property->getText(),2) . ']] </td><td class="smwatts">';
				// TODO: the preg_replace is a kind of hack to ensure that the left column does not get too narrow; maybe we can find something nicer later
			} else { // special property
				if ($key{0} == '_') continue; // internal special property without label
				smwfRequireHeadItem(SMW_HEADER_TOOLTIP);
				$text .= '<tr><td class="smwspecname"><span class="smwttinline"><span class="smwbuiltin">[[' .
				          $wgContLang->getNsText(SMW_NS_PROPERTY) . ':' . $key . '|' . $key .
				          ']]</span><span class="smwttcontent">' . wfMsgForContent('smw_isspecprop') .
				          '</span></span></td><td class="smwspecs">';
			}

			$attributeValueArray = SMWFactbox::$semdata->getPropertyValues($property);
			$l = count($attributeValueArray);
			$i=0;
			foreach ($attributeValueArray as $attributeValue) {
				if ($i!=0) {
					if ($i>$l-2) {
						$text .= wfMsgForContent('smw_finallistconjunct') . ' ';
					} else {
						$text .= ', ';
					}
				}
				$i+=1;

				$text .= $attributeValue->getLongWikiText(true);

				$sep = '<!-- -->&nbsp;&nbsp;'; // the comment is needed to prevent MediaWiki from linking URL-strings together with the nbsps!
				foreach ($attributeValue->getInfolinks() as $link) {
					$text .= $sep . $link->getWikiText();
					$sep = ' &nbsp;&nbsp;'; // allow breaking for longer lists of infolinks
				}
			}
			$text .= '</td></tr>';
		}
	}

//// Methods for writing the content of this object

	/**
	 * This method stores the semantic data, and clears any outdated entries
	 * for the current article.
	 * @TODO: is $title still needed, since we now have SMWFactbox::$title? Could they differ significantly?
	 */
	static function storeData(&$t, $processSemantics) {
		// clear data even if semantics are not processed for this namespace
		// (this setting might have been changed, so that data still exists)
		$title = SMWFactbox::$semdata->getSubject();
		if ($processSemantics) {
			smwfGetStore()->updateData(SMWFactbox::$semdata);
		} else {
			smwfGetStore()->deleteSubject($title);
		}
	}

	/**
	 * Delete semantic data currently associated with some article.
	 */
	static function clearData($s_title) {
		smwfGetStore()->deleteSubject($s_title);
	}

}


