<?php
/**
 * @author Klaus Lassleben
 * @author Markus Krötzsch
 * @author Kai Hüner
 */

global $smwgIP;
require_once($smwgIP . '/includes/SMW_Factbox.php');

//// Parsing annotations

	/**
	*  This method will be called before an article is displayed or previewed.
	*  For display and preview we strip out the semantic properties and append them
	*  at the end of the article.
	*
	*  TODO: $strip_state is not used (and must not be used, since it is
	*        not relevant when moving the hook to internalParse()).
	*/
	function smwfParserHook(&$parser, &$text, &$strip_state = null) {
		wfProfileIn('smwfSetupExtension');
		// Init global storage for semantic data of this article.
		SMWFactbox::initStorage($parser->getTitle(),$parser->getOptions()->getSkin());

		// In the regexp matches below, leading ':' escapes the markup, as
		// known for Categories.
		// Parse links to extract semantic properties
		$semanticLinkPattern = '(\[\[(([^:][^]]*):[=|:])+((?:[^|\[\]]|\[\[[^]]*\]\])*)(\|([^]]*))?\]\])';
		$text = preg_replace_callback($semanticLinkPattern, 'smwfParsePropertiesCallback', $text);

		// print the results if enabled (we have to parse them in any case, in order to
		// clean the wiki source for further processing)
		if ( smwfIsSemanticsProcessed($parser->getTitle()->getNamespace()) ) {
			SMWFactbox::printFactbox($text);
		} else SMWFactbox::clearStorage();

		wfProfileOut('smwfSetupExtension');
		return true; // always return true, in order not to stop MW's hook processing!
	}

	/**
	* This callback function strips out the semantic attributes from a wiki
	* link.
	*/
	function smwfParsePropertiesCallback($semanticLink) {
		if (array_key_exists(2,$semanticLink)) {
			$attribute = $semanticLink[2];
		} else { $attribute = ''; }
		if (array_key_exists(3,$semanticLink)) {
			$value = $semanticLink[3];
		} else { $value = ''; }
		if (array_key_exists(5,$semanticLink)) {
			$valueCaption = $semanticLink[5];
		} else { $valueCaption = false; }

		//extract annotations and create tooltip
		$attributes = explode(':=', $attribute);
		foreach($attributes as $singleAttribute) {
			$attr = SMWFactbox::addProperty($singleAttribute,$value,$valueCaption);
		}

		return $attr->getShortWikitext(true);
	}


//// Saving, deleting, and moving articles

	/**
	*  This method will be called after an article is saved
	*  and stores the semantic properties in the database. One
	*  could consider creating an object for deferred saving
	*  as used in other places of MediaWiki.
	*/
	function smwfSaveHook(&$article, &$user, &$text) {
		$title=$article->getTitle();
		SMWFactbox::storeData($title, smwfIsSemanticsProcessed($title->getNamespace()));
		return true; // always return true, in order not to stop MW's hook processing!
	}

	/**
	*  This method will be called whenever an article is deleted so that
	*  semantic properties are cleared appropriately.
	*/
	function smwfDeleteHook(&$article, &$user, &$reason) {
		smwfGetStore()->deleteSubject($article->getTitle());
		return true; // always return true, in order not to stop MW's hook processing!
	}

	/**
	*  This method will be called whenever an article is moved so that
	*  semantic properties are moved accordingly.
	*/
	function smwfMoveHook(&$old_title, &$new_title, &$user, $pageid, $redirid) {
		smwfGetStore()->changeTitle($old_title, $new_title);
		return true; // always return true, in order not to stop MW's hook processing!
	}

// Special display for certain types of pages

/**
 * Register special classes for displaying semantic content on Property/Type pages
 */
function smwfShowListPage (&$title, &$article){
	global $smwgIP;
	if ($title->getNamespace() == SMW_NS_TYPE){
		require_once($smwgIP . '/includes/articlepages/SMW_TypePage.php');
		$article = new SMWTypePage($title);
	} elseif ( $title->getNamespace() == SMW_NS_PROPERTY ) {
		require_once($smwgIP . '/includes/articlepages/SMW_PropertyPage.php');
		$article = new SMWPropertyPage($title);
	}
	return true;
}



