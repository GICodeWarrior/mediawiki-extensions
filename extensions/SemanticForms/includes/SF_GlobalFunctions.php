<?php
/**
 * Global functions and constants for Semantic Forms.
 *
 * @author Yaron Koren
 * @author Harold Solbrig
 * @author Louis Gerbarg
 */

define('SF_VERSION','0.6.9');

$wgExtensionFunctions[] = 'sfgSetupExtension';
$wgExtensionFunctions[] = 'sfgParserFunctions';
$wgHooks['LanguageGetMagic'][] = 'sfgLanguageGetMagic';

require_once($sfgIP . '/includes/SF_ParserFunctions.php');

/**
 *  Do the actual intialisation of the extension. This is just a delayed init that makes sure
 *  MediaWiki is set up properly before we add our stuff.
 */
function sfgSetupExtension() {
	global $sfgVersion, $sfgNamespace, $sfgIP, $wgHooks, $wgExtensionCredits, $wgArticlePath, $wgScriptPath, $wgServer;

	sffInitMessages();

	/**********************************************/
	/***** register specials                  *****/
	/**********************************************/

	require_once($sfgIP . '/specials/SF_Forms.php');
	require_once($sfgIP . '/specials/SF_CreateForm.php');
	require_once($sfgIP . '/specials/SF_Templates.php');
	require_once($sfgIP . '/specials/SF_CreateTemplate.php');
	require_once($sfgIP . '/specials/SF_CreateProperty.php');
	require_once($sfgIP . '/specials/SF_AddPage.php');
	require_once($sfgIP . '/specials/SF_AddData.php');
	require_once($sfgIP . '/specials/SF_EditData.php');

	/**********************************************/
	/***** register hooks                     *****/
	/**********************************************/

	require_once($sfgIP . '/includes/SF_FormEditTab.php');

	/**********************************************/
	/***** create globals for outside hooks   *****/
	/**********************************************/

	global $sfgFormPrinter;
	$sfgFormPrinter = new SFFormPrinter();

	/**********************************************/
	/***** credits (see "Special:Version")    *****/
	/**********************************************/
	$wgExtensionCredits['specialpage'][]= array('name'=>'Semantic Forms', 'version'=>SF_VERSION, 'author'=>'Yaron Koren and others',
          'url'=>'http://www.mediawiki.org/wiki/Extension:Semantic_Forms', 'description' => 'Forms for adding and editing semantic data');

	return true;
}

/**********************************************/
/***** namespace settings                 *****/
/**********************************************/

	/**
	 * Init the additional namespaces used by Semantic Forms. The
	 * parameter denotes the least unused even namespace ID that is
	 * greater or equal to 100.
	 */
	function sffInitNamespaces() {
		global $sfgNamespaceIndex, $wgExtraNamespaces, $wgNamespacesWithSubpages, $wgLanguageCode, $sfgContLang;

		if (!isset($sfgNamespaceIndex)) {
			$sfgNamespaceIndex = 106;
		}

		sffInitContentLanguage($wgLanguageCode);

		define('SF_NS_FORM',       $sfgNamespaceIndex);
		define('SF_NS_FORM_TALK',  $sfgNamespaceIndex+1);

		// Register namespace identifiers
		if (!is_array($wgExtraNamespaces)) { $wgExtraNamespaces=array(); }
		$wgExtraNamespaces = $wgExtraNamespaces + $sfgContLang->getNamespaceArray();

		// Support subpages only for talk pages by default
		$wgNamespacesWithSubpages = $wgNamespacesWithSubpages + array(
			      SF_NS_FORM_TALK => true
		);
	}

/**********************************************/
/***** language settings                  *****/
/**********************************************/

	/**
	 * Initialise a global language object for content language. This
	 * must happen early on, even before user language is known, to
	 * determine labels for additional namespaces. In contrast, messages
	 * can be initialised much later when they are actually needed.
	 */
	function sffInitContentLanguage($langcode) {
		global $sfgIP, $sfgContLang;

		if (!empty($sfgContLang)) { return; }

		$sfContLangClass = 'SF_Language' . str_replace( '-', '_', ucfirst( $langcode ) );

		if (file_exists($sfgIP . '/languages/'. $sfContLangClass . '.php')) {
			include_once( $sfgIP . '/languages/'. $sfContLangClass . '.php' );
		}

		// fallback if language not supported
		if ( !class_exists($sfContLangClass)) {
			include_once($sfgIP . '/languages/SF_LanguageEn.php');
			$sfContLangClass = 'SF_LanguageEn';
		}

		$sfgContLang = new $sfContLangClass();
	}

	/**
	 * Initialise the global language object for user language. This
	 * must happen after the content language was initialised, since
	 * this language is used as a fallback.
	 */
	function sffInitUserLanguage($langcode) {
		global $sfgIP, $sfgLang;

		if (!empty($sfgLang)) { return; }

		$sfLangClass = 'SF_Language' . str_replace( '-', '_', ucfirst( $langcode ) );

		if (file_exists($sfgIP . '/languages/'. $sfLangClass . '.php')) {
			include_once( $sfgIP . '/languages/'. $sfLangClass . '.php' );
		}

		// fallback if language not supported
		if ( !class_exists($sfLangClass)) {
			global $sfgContLang;
			$sfgLang = $sfgContLang;
		} else {
			$sfgLang = new $sfLangClass();
		}
	}

	/**
	 * Initialise messages. These settings must be applied later on, since
	 * the MessageCache does not exist yet when the settings are loaded in
	 * LocalSettings.php.
	 */
	function sffInitMessages() {
		global $sfgMessagesInPlace; // record whether the function was already called
		if ($sfgMessagesInPlace) { return; }

		global $wgMessageCache, $sfgContLang, $sfgLang, $wgContLang, $wgLang;
		// make sure that language objects exist
		sffInitContentLanguage($wgContLang->getCode());
		sffInitUserLanguage($wgLang->getCode());

		$wgMessageCache->addMessages($sfgContLang->getContentMsgArray(), $wgContLang->getCode());
		$wgMessageCache->addMessages($sfgLang->getUserMsgArray(), $wgLang->getCode());

		$sfgMessagesInPlace = true;
	}

/**********************************************/
/***** other global helpers               *****/
/**********************************************/

	/**
	 * Creates HTML linking to a wiki page
	 */
	function sffLinkText($namespace, $name, $text = NULL) {
 		global $wgContLang;

		$inText = $wgContLang->getNsText($namespace) . ':' . $name;
		$title = Title::newFromText( $inText );
		if ($title === NULL) {
			return $inText; // TODO maybe report an error here?
		} 
		if ( NULL === $text ) $text = $title->getText();
		$l = new Linker();
		return $l->makeLinkObj($title, $text);
	}

	/**
	 * Creates the name of the page that appears in the URL;
	 * this method is necessary because Title::getPartialURL(), for
	 * some reason, doesn't include the namespace
	 */
	function sffTitleURLString($title) {
          $namespace = wfUrlencode( $title->getNsText() );
          if ( '' != $namespace ) {
            $namespace .= ':';
          }
          return ($namespace . ucfirst($title->getPartialURL()));
	}

	/**
	 * Gets the default form specified, if any, for a specific page
	 * (which should be a category, relation, or namespace page)
	 */
	function sffGetDefaultForm($page_title, $page_namespace) {
		$smw_version = SMW_VERSION;
		if ($smw_version{0} == '0') {
			return sffGetDefaultForm_0_7($page_title, $page_namespace);
		} else {
			return sffGetDefaultForm_1_0($page_title, $page_namespace);
		}
	}

	// Version for SMW 0.7 and lower
	function sffGetDefaultForm_0_7($page_title, $page_namespace) {
		$db = wfGetDB( DB_SLAVE );
		$default_form_relation = str_replace(' ', '_', wfMsgForContent('sf_form_relation'));
		$sql = "SELECT DISTINCT object_title FROM {$db->tableName('smw_relations')} " .
		  "WHERE subject_title = '" . $db->strencode($page_title) .
		  "' AND subject_namespace = '" . $page_namespace .
		  "' AND relation_title = '" . $db->strencode($default_form_relation) .
		  "' AND object_namespace = " . SF_NS_FORM;
		$res = $db->query( $sql );
		if ($db->numRows( $res ) > 0) {
			$row = $db->fetchRow($res);
			$form_name = $row[0];
			return $form_name;
		}
		$db->freeResult($res);
		return null;
	}

	// Version for SMW 1.0 and higher
	function sffGetDefaultForm_1_0($page_title, $page_namespace) {
		if ($page_title == NULL)
			return null;

		$store = smwfGetStore();
		$title = Title::newFromText($page_title, $page_namespace);
		$property = Title::newFromText(str_replace(' ', '_', wfMsgForContent('sf_form_relation')), SF_NS_FORM);
		$res = $store->getPropertyValues($title, $property);
		$num = count($res);
		if ($num > 0) {
			$form_name = $res[0]->getTitle()->getText();
			return $form_name;
		}
		return null;
	}

	/**
	 * Helper function for sffAddDataLink() - gets 'default form' relation,
	 * and creates the corresponding 'add data' link, for a page, if any
	 * such relation is defined
	 */
	function sffGetAddDataLinkForPage($target_page_title, $page_title, $page_namespace) {
		if (! $form_name = sffGetDefaultForm($page_title, $page_namespace))
			return null;
		$ad = SpecialPage::getPage('AddData');
		$add_data_url = $ad->getTitle()->getFullURL() . "/" . $form_name . "/" . sffTitleURLString($target_page_title);
		return $add_data_url;
	}

	/**
	 * Gets URL for form-based adding of a nonexistent (red-linked) page
	 */
	function sffAddDataLink($title) {
		$smw_version = SMW_VERSION;
		if ($smw_version{0} == '0') {
			return sffAddDataLink_0_7($title);
		} else {
			return sffAddDataLink_1_0($title);
		}
	}

	// Version for SMW 1.0 and higher
	function sffAddDataLink_1_0($title) {
		// FIXME - this is broken because the SMW abstraction does not
		// directly support the kind of query the old direct-access
		// version does - need to think through how to do it.
		$store = smwfGetStore();
		$results = $store->getInProperties($title);

		foreach ($results as $result) {
			$relation = $result;
			if ($add_data_link = sffGetAddDataLinkForPage($title, $relation->getText(), SMW_NS_RELATION)) {
				return $add_data_link;
			}
		}

		// if that didn't work, check if this page's namespace
		// has a default form specified
		$namespace = $title->getNsText();
		if ('' === $namespace) {
			// if it's in the main (blank) namespace, check for
			// the file named with the word for "Main" in this
			// language
			$namespace = wfMsgForContent('sf_blank_namespace');
		}
		if ($add_data_link = sffGetAddDataLinkForPage($title, $namespace, NS_PROJECT)) {
			return $add_data_link;
		}
		// if nothing found still, return null
		return null;
	}

	// Version for SMW 0.7 and lower
	function sffAddDataLink_0_7($title) {
		// get all relations that have this page as an object,
		// and see if any of them have a default form specified
		$fname = 'sffAddDataLink';
		$db = wfGetDB( DB_SLAVE );
		$sql = "SELECT DISTINCT relation_title FROM {$db->tableName('smw_relations')} WHERE object_title = '" . $db->strencode($title->getDBkey()) . "' AND object_namespace = '" . $title->getNamespace() . "'";
		$res = $db->query( $sql );
		if ($db->numRows( $res ) > 0) {
			while ($row = $db->fetchRow($res)) {
				$relation = $row[0];
				if ($add_data_link = sffGetAddDataLinkForPage($title, $relation, SMW_NS_RELATION)) {
					return $add_data_link;
				}
			}
		}
		// if that didn't work, check if this page's namespace
		// has a default form specified
		$namespace = $title->getNsText();
		if ('' === $namespace) {
			// if it's in the main (blank) namespace, check for
			// the file named with the word for "Main" in this
			// language
			$namespace = wfMsgForContent('sf_blank_namespace');
		}
		if ($add_data_link = sffGetAddDataLinkForPage($title, $namespace, NS_PROJECT)) {
			return $add_data_link;
		}
		// if nothing found still, return null
		return null;
	}

	function sffFormDropdownHTML() {
		// create a dropdown of possible form names
		$dbr = wfGetDB( DB_SLAVE );
		$query = "SELECT page_title FROM " . $dbr->tableName( 'page' ) .
			" WHERE page_namespace = " . SF_NS_FORM .
			" AND page_is_redirect = 0";
		$res = $dbr->query($query);
		$form_names = array();
		while ($row = $dbr->fetchRow($res)) {
			$form_names[] = str_replace('_', ' ', $row[0]);
		}
		sort($form_names);
		global $sfgContLang;
		$namespace_labels = $sfgContLang->getNamespaceArray();
		$form_label = $namespace_labels[SF_NS_FORM];
		$str = <<<END
			$form_label:
			<select name="form">

END;
		foreach ($form_names as $form_name) {
			$str .= "			<option>$form_name</option>\n";
		}
		$str .= "			</select>\n";
                $dbr->freeResult($res);
		return $str;
	}
?>
