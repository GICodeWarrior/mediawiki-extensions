<?php

/**
 * Frequent Pattern Tag Cloud Plug-in
 * Special page
 * 
 * @author Tobias Beck, University of Heidelberg
 * @author Andreas Fay, University of Heidelberg
 * @version 1.0
 */

include_once(FPTC_PATH_INCLUDES."TagCloud.php");
include_once(FPTC_PATH_INCLUDES."Proposal.php");

class FreqPatternTagCloud extends SpecialPage {
	
	const ATTRIBUTE_VALUE_INDEX_SPECIALPAGE = "SearchByProperty";
	
	/**
	 * Maximum font size of tags in px
	 *
	 * @var int
	 */
	private $fontSizeMax = 70;
	
	/**
	 * Minimum font size of tags in px
	 * 
	 * @var int
	 */
	private $fontSizeMin = 8;
	
	const MAINTENANCE_SPECIALPAGE = "FreqPatternTagCloudMaintenance";
	
	const SPECIALPAGE_PREFIX = "Special";
	
	/**
	 * Constructor
	 *
	 * @return void 
	 */
	public function __construct() {
		parent::__construct("FreqPatternTagCloud");
		$this->includable(true);
	}

	/**
	 * Executes special page (will be called when accessing special page)
	 *
	 * @param string $par Content of GET-Parameter
	 * @return void 
	 */
	public function execute($par) {
		global $wgFreqPatternTagCloudMaxFontSize, $wgFreqPatternTagCloudMinFontSize, $wgRequest, $wgOut, $searchAttribut, $wgScriptPath;
		
		include_once("includes/FrequentPattern.php");
		
		/*
		FrequentPattern::deleteAllRules();
		FrequentPattern::computeAllRules();
		FrequentPattern::showAllRules();
		*/
		
		$this->setHeaders();
		
		// Configuration
		if (isset($wgFreqPatternTagCloudMaxFontSize)) {
			$this->fontSizeMax = $wgFreqPatternTagCloudMaxFontSize;
		}
		if (isset($wgFreqPatternTagCloudMinFontSize)) {
			$this->fontSizeMin = $wgFreqPatternTagCloudMinFontSize;
		}
		
		// Check whether special page is included
		// Show attribute-selection form only if special page is not included and $par was given
		
		if (!$this->including() || !strlen($par)) {
			// Print form
			$this->printForm($par);
			
			// Print search result with suggestions
			$this->printSearchResult($par);
		}
		$this->printTagCloud($par);
		
	}
	
	/**
	 * Gets suggestions for current attribute value
	 *
	 * @param string $currentAttributeValue 
	 * @return string JSON Array of attributes
	 */
	public static function getAttributeSuggestions($currentAttributeValue) {
		$dbr =& wfGetDB( DB_SLAVE );
		
		if (!($res = mysql_query("SELECT smw_title
							FROM ".$dbr->tableName("smw_ids")."
							WHERE smw_namespace = 102
							AND LENGTH(smw_iw) = 0
							AND smw_title LIKE '%".mysql_real_escape_string($currentAttributeValue)."%'
							ORDER BY smw_title
							LIMIT 20"))) {
			return "[]";
		}
		
		$attributes = array();
		while ($row = mysql_fetch_assoc($res)) {
			$attributes[] = sprintf('"%s"', addcslashes($row['smw_title'], '"'));
		}
		
		mysql_free_result($res);
		
		return sprintf("[%s]", implode(", ", $attributes));
	}
	
	/**
	 * Gets suggestions for current search value
	 *
	 * @param string $currentSearchValue 
	 * @return string JSON Array of values
	 */
	public static function getSearchSuggestions($currentSearchValue) {
		$dbr =& wfGetDB( DB_SLAVE );
		
		// Get possible attribute values
		if (!($res = mysql_query("SELECT DISTINCT vals.smw_title AS val, atts.smw_title AS att
							FROM ".$dbr->tableName("smw_ids")." vals, ".$dbr->tableName("smw_ids")." atts, ".$dbr->tableName("smw_rels2")." rels
							WHERE vals.smw_id = rels.o_id
							AND atts.smw_id = rels.p_id
							AND vals.smw_namespace = 0
							AND atts.smw_namespace = 102
							AND LENGTH(vals.smw_iw) = 0
							AND LENGTH(atts.smw_iw) = 0
							AND vals.smw_title LIKE '%".mysql_real_escape_string($currentSearchValue)."%'
							ORDER BY vals.smw_title
							LIMIT 20"))) {
			return "[]";
		}
		
		$suggestions = array();
		while ($row = mysql_fetch_assoc($res)) {
			// Apply frequent pattern rules
			$conclusions = FrequentPattern::getConclusions($row['att'], $row['val']);
			
			if (!count($conclusions)) {
				continue;
			} else {
				foreach ($conclusions as $conclusion) {
					$suggestions[] = sprintf('{ "label": "%s", "category": "'.addcslashes(wfMsg("SearchSuggestionValue"), '"').'" }', addcslashes($conclusion, '"'), addcslashes($row['val'], '"'));
				}
			}
		}
		
		mysql_free_result($res);
		
		return sprintf("[%s]", implode(", ", $suggestions));
	}
	
	/**
	 * Gets suggestions
	 *
	 * @param string $attribute Attribute
	 * @param string $value Chosen value
	 * @return string 
	 *
	 */
	public static function getSuggestions($attribute, $value) {
		// Get similar tags, sorted by priority
		$tags = FrequentPattern::getConclusions($attribute, $value);
		
		if (!count($tags)) {
			return '<li class="no_entries">-</li>';
		} else {
			$suggestions = array();
			foreach ($tags as $number => $tag) {
				$suggestions[] = sprintf('<li class="similar_tag"><a href="#browse_similar_tag" title="%2$s">%1$d. %2$s</a></li>', $number + 1, $tag);
			}
			
			return implode("\n", $suggestions);
		}
	}
	
	/**
	 * Prints form to <code>$wgOut</code>
	 *
	 * @param string $defaultAttribute (optional)Default value for attribute to be tagged
	 * @return void 
	 */
	private function printForm($defaultAttribute) {
		global $wgOut, $wgUser;
	
		// Add input field
		if ($wgUser->isAllowed("protect")) {
			$refreshData = sprintf('<div id="fptc_refresh">%s</div>', 
					$wgOut->parseInline(sprintf('[[:%s:%s|%s]]', self::SPECIALPAGE_PREFIX, self::MAINTENANCE_SPECIALPAGE, wfMsg("RefreshFrequentPatterns"))));
		} else {
			$refreshData = "";
		}
		$wgOut->addHTML($refreshData.wfMsg("FormAttributeName").': <input type="text" name="fptc_attributeName" id="fptc_attributeName" value="'.$defaultAttribute.'"><input type="submit" value="'.wfMsg("FormSubmitButton").'" onClick="fptc_relocate();">
					');
		
		$wgOut->addHTML("<br><br>");
	}
	
	/**
	 * Prints tag cloud for attribute <code>attribute</code> to <code>$wgOut</code>
	 *
	 * @param string $attribute Attribute
	 * @return void 
	 */
	private function printTagCloud($attribute) {
		global $wgOut;
		
		try {
			$tagCloud = new TagCloud($attribute);
			
			// Context menu
			$wgOut->addHTML('<ul id="fptc_contextMenu" class="contextMenu">
						<li class="browse">
						<a href="#browse">'.wfMsg("ContextMenu_Browse").'</a>
						</li>
						<li class="suggestions separator">
						'.wfMsg("ContextMenu_SimilarTags").':
						</li>
						</ul>');
			
			// Print tags
			foreach ($tagCloud->getTags() as $tag) {
				$this->printTag($tag, $attribute);
			}
			
			$wgOut->addHTML('<div style="clear:both"></div>');
		} catch (InvalidAttributeException $e) {
			if ($attribute) {	
				// Attribute not found -> show error
				$wgOut->addHTML('<span style="color:red; font-weight:bold;">'.wfMsg("InvalidAttribute").'</span>');
			}
		}
	}
	
	/**
	 * Prints tag to <code>$wgOut</code>
	 *
	 * @param Tag $tag 
	 * @return void 
	 * 
	 */
	private function printTag(Tag $tag, $attribute) {
		global $wgOut;
		
		$wgOut->addHTML(sprintf('<div class="fptc_tag" style="font-size:%dpx;">%s</div>', 
					$this->fontSizeMin + ($this->fontSizeMax - $this->fontSizeMin) * $tag->getRate(),
					$wgOut->parseInline(sprintf("[[:%s:%s/%s/%s|%s]]", self::SPECIALPAGE_PREFIX, self::ATTRIBUTE_VALUE_INDEX_SPECIALPAGE, $attribute, $tag->getValue(), $tag->getValue()))));
	}
	
	 /** Prints the result of the search for attribute <code>attribute</code> to <code>$wgOut</code>
	 *
	 * @param string $attribute Attribute
	 * @return void 
	 */
	private function printSearchResult($attribute) {
		global $wgOut;
		
		if (strlen($attribute)) {
			try {
				$searchResult = new TagCloud($attribute);
			
			} catch (InvalidAttributeException $e) {
				
				if ($attribute) {
					$proposal = new Proposal($attribute);	
					// Attribute not found -> show attributes that are related
					try {
						// Only if suggestions found
						if ($proposal->getProposal()) {
							$wgOut->addHTML(wfMsg("Suggestion"));
						}
						$w=1;
						foreach ($proposal->getProposal() as $possibleAttribute) {
							
							$wgOut->addHTML('<a href='.$possibleAttribute.'>'.$possibleAttribute.'</a>');
							if ($w < count($proposal->getProposal())) {
								$wgOut->addHTML(", ");	
							}
							$w++;
						}
						
					} catch (InvalidAttributeException $e) {
						$wgOut->addHTML(wfMsg("NoSuggestion"));
					}
					if ($proposal->getProposal()) {
						$wgOut->addHTML("<br><br>");
					}
				}
			}
		}
	}
}

?>