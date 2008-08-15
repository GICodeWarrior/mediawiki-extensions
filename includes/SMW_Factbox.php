<?php
/**
 * The class in this file manages the parsing, displaying, and storing of semantic
 * data that is usually displayed within the factbox.
 *
 * @author Markus Krötzsch
 */

/**
 * Static class for representing semantic data, which accepts user
 * inputs and provides methods for printing and storing its contents.
 * Its main purpose is to provide a persistent storage to keep semantic
 * data between hooks for parsing and storing.
 * @note AUTOLOADED
 */
class SMWFactbox {

	/**
	 * The actual container for the semantic annotations. Public, since
	 * it is ref-passed to others for further processing.
	 */
	static $semdata = NULL;
	/**
	 * True if the respective article is newly created. This affects some
	 * storage operations.
	 */
	static protected $m_new = false;
	/**
	 * True if Factbox was printed, our best attempt at reliably preventing multiple
	 * Factboxes to appear on one page.
	 */
	static protected $m_printed = false;
	/**
	 * True if the next try on printing should be blocked
	 */
	static protected $m_blocked = false;

	/**
	 * True *while* the Factbox is used for writing, prevents
	 * broken submethods of MW and extensions to screw up our
	 * subject title due to illegal $wgTitle uses in parsing.
	 */
	static protected $m_writelock = false;

	/**
	 * To prevent cross-firing parser hooks (e.g. by other extensions' subparsers) 
	 * from resetting our global data, cache the last non-empty data set and restore
	 * it later if we should "return" to this article.
	 */
	static protected $m_oldsemdata = NULL;

	/**
	 * Initialisation method. Must be called before anything else happens.
	 */
	static function initStorage($title) {
		// reset only if title exists, is new and is not the notorious
		// NO TITLE thing the MW parser creates
		if ( SMWFactbox::$m_writelock || $title === NULL || $title->getText() == 'NO TITLE' ) return;
		if ( (SMWFactbox::$semdata === NULL) ||
		     (SMWFactbox::$semdata->getSubject()->getDBkey() != $title->getDBkey()) ||
		     (SMWFactbox::$semdata->getSubject()->getNamespace() != $title->getNamespace()) ) {
			$curdata = SMWFactbox::$semdata;
			// check if we can restore the previous (non-empty) data container:
			if ( (SMWFactbox::$m_oldsemdata !== NULL) &&
			     (SMWFactbox::$m_oldsemdata->getSubject()->getDBkey() == $title->getDBkey()) &&
			     (SMWFactbox::$m_oldsemdata->getSubject()->getNamespace() == $title->getNamespace()) ) {
				SMWFactbox::$semdata = SMWFactbox::$m_oldsemdata;
			} else { // otherwise make a new data container
				$dv = SMWDataValueFactory::newTypeIDValue('_wpg');
				$dv->setValues($title->getDBkey(), $title->getNamespace());
				SMWFactbox::$semdata = new SMWSemanticData($dv); // reset data
				SMWFactbox::$m_printed = false;
			}
			// store non-empty existing data, just in case we need it later again
			if ( ($curdata !== NULL) && 
			     ($curdata->hasProperties() || $curdata->hasSpecialProperties() ) ) {
				SMWFactbox::$m_oldsemdata = $curdata;
			}
			//print " Title set: " . $title->getPrefixedText() . "\n"; // useful for debug
		}
		//SMWFactbox::$m_new   = false; // do not reset, keep (order of hooks can be strange ...)
	}

	/**
	 * Clear all stored data.
	 */
	static function clearStorage() {
		global $smwgStoreActive;
		if ($smwgStoreActive) {
			SMWFactbox::$semdata->clear();
			SMWFactbox::$m_oldsemdata = NULL;
			SMWFactbox::$m_printed = false;
		}
	}

	/**
	 * Blocks the next rendering of the Factbox
	 */
	static function blockOnce() {
		SMWFactbox::$m_blocked = true;
	}

	/**
	 * Set the writlock (true while the Factbox is used for writing,
	 * ensures that our title object cannot be changed by cross-firing
	 * hooks).
	 */
	static function setWriteLock($value) {
		SMWFactbox::$m_writelock = $value;
	}

	/**
	 * True if the respective article is newly created, but always false until
	 * an article is actually saved.
	 */
	static function isNewArticle() {
		return SMWFactbox::$m_new;
	}

//// Methods for adding data to the object

	/**
	 * Called to state that the respective article was newly created. Not known until
	 * an article is actually saved.
	 */
	static function setNewArticle() {
		SMWFactbox::$m_new = true;
	}

	/**
	 * This method adds a new property with the given value to the storage.
	 * It returns an array which contains the result of the operation in
	 * various formats.
	 */
	static function addProperty($propertyname, $value, $caption, $storeannotation = true) {
		wfProfileIn("SMWFactbox::addProperty (SMW)");
		global $smwgContLang;
		// See if this property is a special one, such as e.g. "has type"
		$propertyname = smwfNormalTitleText($propertyname); //slightly normalize label
		$special = $smwgContLang->findSpecialPropertyID($propertyname);

		switch ($special) {
			case false: // normal property
				$result = SMWDataValueFactory::newPropertyValue($propertyname,$value,$caption);
				if ($storeannotation) {
					SMWFactbox::$semdata->addPropertyValue($propertyname,$result);
				}
				wfProfileOut("SMWFactbox::addProperty (SMW)");
				return $result;
			case SMW_SP_IMPORTED_FROM: // this requires special handling
				$result = SMWFactbox::addImportedDefinition($value,$caption,$storeannotation);
				wfProfileOut("SMWFactbox::addProperty (SMW)");
				return $result;
			default: // generic special property
				$result = SMWDataValueFactory::newSpecialValue($special,$value,$caption);
				if ($storeannotation) {
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
	 * in text. Although many property values are added, not all are printed in
	 * the factbox, since some do not have a translated name (and thus also
	 * could not be specified directly).
	 */
	static private function addImportedDefinition($value,$caption,$storeannotation) {
		global $wgContLang;

		wfLoadExtensionMessages('SemanticMediaWiki');

		list($onto_ns,$onto_section) = explode(':',$value,2);
		$msglines = preg_split("/[\n][\s]?/u",wfMsgForContent("smw_import_$onto_ns")); // get the definition for "$namespace:$section"

		if ( count($msglines) < 2 ) { //error: no elements for this namespace
			/// TODO: use new Error DV
			$datavalue = SMWDataValueFactory::newTypeIDValue('__err',$value,$caption);
			$datavalue->addError(wfMsgForContent('smw_unknown_importns',$onto_ns));
			if ($storeannotation) {
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
			if ($storeannotation) {
				SMWFactbox::$semdata->addSpecialValue(SMW_SP_IMPORTED_FROM, $datavalue);
			}
			return $datavalue;
		}

		if ($storeannotation) {
			SMWFactbox::$semdata->addSpecialValue(SMW_SP_EXT_BASEURI,SMWDataValueFactory::newTypeIDValue('_str',$onto_uri));
			SMWFactbox::$semdata->addSpecialValue(SMW_SP_EXT_NSID,SMWDataValueFactory::newTypeIDValue('_str',$onto_ns));
			SMWFactbox::$semdata->addSpecialValue(SMW_SP_EXT_SECTION,SMWDataValueFactory::newTypeIDValue('_str',$onto_section));
			if (NULL !== $datatype) {
				SMWFactbox::$semdata->addSpecialValue(SMW_SP_HAS_TYPE,$datatype);
			}
		}
		// print the input (this property is usually not stored, see SMW_SQLStore.php)
		$datavalue = SMWDataValueFactory::newTypeIDValue('_str',"[$onto_uri$onto_section $value] ($onto_name)",$caption);
		if ($storeannotation) {
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
		if (SMWFactbox::$m_blocked) { SMWFactbox::$m_blocked = false; return;}		
		if (!$smwgStoreActive) return;
		if (SMWFactbox::$m_printed) return;
		wfProfileIn("SMWFactbox::printFactbox (SMW)");

		// Global settings:
		if ( $wgRequest->getCheck('wpPreview') ) {
			$showfactbox = $smwgShowFactboxEdit;
		} else {
			$showfactbox = $smwgShowFactbox;
		}
		// Page settings via Magic Words:
		$mw = MagicWord::get('SMW_NOFACTBOX');
		if ($mw->matchAndRemove($text)) {
			$showfactbox = SMW_FACTBOX_HIDDEN;
		}
		$mw = MagicWord::get('SMW_SHOWFACTBOX');
		if ($mw->matchAndRemove($text)) {
			$showfactbox = SMW_FACTBOX_NONEMPTY;
		}

		switch ($showfactbox) {
		case SMW_FACTBOX_HIDDEN: // never
			wfProfileOut("SMWFactbox::printFactbox (SMW)");
			SMWFactbox::$m_printed = true; // do not print again, period (the other cases may safely try again, if new data should come in)
			return;
		case SMW_FACTBOX_SPECIAL: // only when there are special properties
			if ( !SMWFactbox::$semdata->hasVisibleSpecialProperties() ) {
				wfProfileOut("SMWFactbox::printFactbox (SMW)");
				return;
			}
			break;
		case SMW_FACTBOX_NONEMPTY: // only when non-empty
			if ( (!SMWFactbox::$semdata->hasProperties()) && (!SMWFactbox::$semdata->hasVisibleSpecialProperties()) ) {
				wfProfileOut("SMWFactbox::printFactbox (SMW)");
				return;
			}
			break;
		// case SMW_FACTBOX_SHOWN: display
		}
		SMWFactbox::$m_printed = true;

		smwfRequireHeadItem(SMW_HEADER_STYLE);
		$rdflink = SMWInfolink::newInternalLink(wfMsgForContent('smw_viewasrdf'), $wgContLang->getNsText(NS_SPECIAL) . ':ExportRDF/' . SMWFactbox::$semdata->getSubject()->getWikiValue(), 'rdflink');

		$browselink = SMWInfolink::newBrowsingLink(SMWFactbox::$semdata->getSubject()->getText(), SMWFactbox::$semdata->getSubject()->getWikiValue(), 'swmfactboxheadbrowse');
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
	 * This method prints (special) property values at the bottom of an article.
	 */
	static protected function printProperties(&$text) {
		if (!SMWFactbox::$semdata->hasProperties() && !SMWFactbox::$semdata->hasSpecialProperties()) {
			return;
		}
		global $wgContLang;
		
		wfLoadExtensionMessages('SemanticMediaWiki');

		foreach(SMWFactbox::$semdata->getProperties() as $key => $property) {
			if ($property instanceof Title) {
				$text .= '<tr><td class="smwpropname">[[' . $property->getPrefixedText() . '|' . preg_replace('/[ ]/u','&nbsp;',$property->getText(),2) . ']] </td><td class="smwprops">';
				// TODO: the preg_replace is a kind of hack to ensure that the left column does not get too narrow; maybe we can find something nicer later
			} else { // special property
				if ($key{0} == '_') continue; // internal special property without label
				smwfRequireHeadItem(SMW_HEADER_TOOLTIP);
				$text .= '<tr><td class="smwspecname"><span class="smwttinline"><span class="smwbuiltin">[[' .
				          $wgContLang->getNsText(SMW_NS_PROPERTY) . ':' . $key . '|' . $key .
				          ']]</span><span class="smwttcontent">' . wfMsgForContent('smw_isspecprop') .
				          '</span></span></td><td class="smwspecs">';
			}

			$propvalues = SMWFactbox::$semdata->getPropertyValues($property);
			$l = count($propvalues);
			$i=0;
			foreach ($propvalues as $propvalue) {
				if ($i!=0) {
					if ($i>$l-2) {
						$text .= wfMsgForContent('smw_finallistconjunct') . ' ';
					} else {
						$text .= ', ';
					}
				}
				$i+=1;
				$text .= $propvalue->getLongWikiText(true) . $propvalue->getInfolinkText(SMW_OUTPUT_WIKI);
			}
			$text .= '</td></tr>';
		}
	}

//// Methods for writing the content of this object

	/**
	 * This method stores the semantic data, and clears any outdated entries
	 * for the current article.
	 */
	static function storeData($processSemantics) {
		// clear data even if semantics are not processed for this namespace
		// (this setting might have been changed, so that data still exists)
		if ($processSemantics) {
			smwfGetStore()->updateData(SMWFactbox::$semdata, SMWFactbox::$m_new);
		} else {
			smwfGetStore()->clearData(SMWFactbox::$semdata->getSubject()->getTitle(), SMWFactbox::$m_new);
		}
	}

}


