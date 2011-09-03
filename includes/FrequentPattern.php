<?php

/**
 * Frequent Pattern Tag Cloud Plug-in
 * Frequent pattern functions
 * 
 * @author Tobias Beck, University of Heidelberg
 * @author Andreas Fay, University of Heidelberg
 * @version 1.0
 */

include_once("computation/FrequentPatternApriori.php");
include_once("exceptions/SQLException.php");

abstract class FrequentPattern {
	/**
	 * Minimum confidence
	 * 
	 * @var float
	 */
	public static $min_confidence = 0.3;
	
	/**
	 * Minimum support
	 * 
	 * @var float
	 */
	public static $min_support = 0.2;
	
	
	/**
	 * Computes all rules
	 *
	 * @return void 
	 * @throws SQLException  
	 */
	public static function computeAllRules() {
		$dbr =& wfGetDB( DB_SLAVE );
		
		if (!($res = mysql_query("SELECT smw_id
							FROM ".$dbr->tableName("smw_ids")."
							WHERE smw_namespace = 102
							AND LENGTH(smw_iw) = 0"))) {
			throw new SQLException();
		}
		while ($row = mysql_fetch_assoc($res)) {
			self::computeRules($row['smw_id']);
		}
		
		mysql_free_result($res);
	}
	
	/**
	 * Computes rules for attribute of id <code>$attributeId</code>
	 *
	 * @param int $attributeId Attribute
	 * @return void 
	 * @throws SQLException  
	 */
	public static function computeRules($attributeId) {
		global $wgFreqPatternTagCloudMinSupport, $wgFreqPatternTagCloudMinConfidence;
		
		// Configuration
		if (isset($wgFreqPatternTagCloudMinSupport)) {
			FrequentPattern::$min_support = $wgFreqPatternTagCloudMinSupport;
		}
		if (isset($wgFreqPatternTagCloudMinConfidence)) {
			FrequentPattern::$min_confidence = $wgFreqPatternTagCloudMinConfidence;
		}
		
		$dbr =& wfGetDB( DB_SLAVE );
		
		// Compile items = all possible o_ids
		if (!($res = mysql_query("SELECT GROUP_CONCAT(DISTINCT o_id)
							FROM ".$dbr->tableName("smw_rels2")."
							WHERE p_id = ".mysql_real_escape_string($attributeId)."
							GROUP BY p_id"))) {
			throw new SQLException();
		}
		$row = mysql_fetch_row($res);
		$items = explode(",", $row[0]);
		mysql_free_result($res);
		
		// Compile transactions = all corelated o_ids (by s_id)
		if (!($res = mysql_query("SELECT GROUP_CONCAT(o_id)
							FROM ".$dbr->tableName("smw_rels2")."
							WHERE p_id = ".mysql_real_escape_string($attributeId)."
							GROUP BY s_id"))) {
			throw new SQLException();
		}
		$transactions = array();
		while ($row = mysql_fetch_row($res)) {
			$transactions[] = explode(",", $row[0]);
		}
		mysql_free_result($res);
		
		// Run algorithm
		$algorithm = new FrequentPatternApriori();
		$rules = $algorithm->computeRules($items, $transactions, self::$min_support, self::$min_confidence);
		foreach ($rules as $rule) {
			// Push rules to db
			if (!mysql_query("INSERT INTO ".$dbr->tableName("fptc_associationrules")." (p_id, rule_support, rule_confidence)
								VALUES (".mysql_real_escape_string($attributeId).", ".mysql_real_escape_string($rule->getSupport()).", ".mysql_real_escape_string($rule->getConfidence()).")")) {
				throw new SQLException();
			}
			$ruleId = mysql_insert_id();
			
			foreach ($rule->getAssumption() as $item) {
				if (!mysql_query("INSERT INTO ".$dbr->tableName("fptc_items")." (o_id, rule_id, item_order)
								VALUES (".mysql_real_escape_string($item).", ".mysql_real_escape_string($ruleId).", 0)")) {
					throw new SQLException();
				}
			}
			
			foreach ($rule->getConclusion() as $item) {
				if (!mysql_query("INSERT INTO ".$dbr->tableName("fptc_items")." (o_id, rule_id, item_order)
								VALUES (".mysql_real_escape_string($item).", ".mysql_real_escape_string($ruleId).", 1)")) {
					throw new SQLException();
				}
			}
		}
	}
	
	/**
	 * Deletes all rules
	 *
	 * @return void
	 * @throws SQLException  
	 */
	public static function deleteAllRules() {
		$dbr =& wfGetDB( DB_SLAVE );
		
		if (!mysql_query("DELETE FROM ".$dbr->tableName("fptc_associationrules"))) {
			throw new SQLException();
		}
	}
	
	/**
	 * Gets conclusions of rules for attribute <code>$attribute</code> and assumption <code>$assumption</code>
	 * 
	 * @param string $attribute
	 * @param string $assumption
	 * @return array Array of strings
	 * @throws SQLException 
	 */
	public static function getConclusions($attribute, $assumption) {
		$dbr =& wfGetDB( DB_SLAVE );
		
		// Get id of attribute
		if (!($res = mysql_query("SELECT smw_id
							FROM ".$dbr->tableName("smw_ids")."
							WHERE smw_title = '".mysql_real_escape_string($attribute)."'
							AND smw_namespace = 102
							AND LENGTH(smw_iw) = 0"))) {
			throw new SQLException();
		}
		$row = mysql_fetch_row($res);
		$attributeId = $row[0];
		mysql_free_result($res);
		
		// Get id of assumption
		if (!($res = mysql_query("SELECT smw_id
							FROM ".$dbr->tableName("smw_ids")."
							WHERE smw_title = '".mysql_real_escape_string($assumption)."'
							AND smw_namespace = 0
							AND LENGTH(smw_iw) = 0"))) {
			throw new SQLException();
		}
		$row = mysql_fetch_row($res);
		$assumptionId = $row[0];
		mysql_free_result($res);
		
		// Get rules (only those where assumption is single item)
		if (!($res = mysql_query("SELECT rules.rule_id, rule_support, rule_confidence
							FROM ".$dbr->tableName("fptc_associationrules")." rules, ".$dbr->tableName("fptc_items")." items
							WHERE rules.rule_id = items.rule_id
							AND item_order = 0
							AND o_id = ".mysql_real_escape_string($assumptionId)."
							AND NOT EXISTS( SELECT 1 FROM ".$dbr->tableName("fptc_items")." WHERE rule_id = rules.rule_id AND item_order = 0 AND o_id != items.o_id )
							ORDER BY rule_support DESC, rule_confidence DESC"))) {
			throw new SQLException();
		}
		$conclusions = array();
		while ($row = mysql_fetch_assoc($res)) {
			// Get conclusions
			if (!($resItems = mysql_query("SELECT smw_title
								FROM ".$dbr->tableName("smw_ids")." ids, ".$dbr->tableName("fptc_items")." items
								WHERE ids.smw_id = items.o_id
								AND item_order = 1
								AND rule_id = ".mysql_real_escape_string($row['rule_id'])))) {
				throw new SQLException();
			}
			
			// Only consider rules with single conclusion
			if (mysql_num_rows($resItems) > 1) {
				continue;
			}
			$rowItem = mysql_fetch_assoc($resItems);
			$conclusions[] = $rowItem['smw_title'];

			mysql_free_result($resItems);
		}
		mysql_free_result($res);
		
		return $conclusions;
	}
	
	/**
	 * Shows all rules (for debugging purposes)
	 *
	 * @return void 
	 * @throws SQLException 
	 */
	public static function showAllRules() {
		global $wgOut;
		
		$dbr =& wfGetDB( DB_SLAVE );
		
		// Get rules
		if (!($res = mysql_query("SELECT smw_title, rule_id, rule_support, rule_confidence
							FROM ".$dbr->tableName("smw_ids")." ids, ".$dbr->tableName("fptc_associationrules")." rules
							WHERE ids.smw_id = rules.p_id"))) {
			throw new SQLException();
		}
		while ($row = mysql_fetch_assoc($res)) {
			// Get items
			if (!($resItems = mysql_query("SELECT smw_title, item_order
								FROM ".$dbr->tableName("smw_ids")." ids, ".$dbr->tableName("fptc_items")." items
								WHERE ids.smw_id = items.o_id
								AND rule_id = ".mysql_real_escape_string($row['rule_id'])))) {
				throw new SQLException();
			}
			$assumption = array();
			$conclusion = array();
			while ($rowItem = mysql_fetch_assoc($resItems)) {
				if ($rowItem['item_order'] == '0') {
					$assumption[] = $rowItem['smw_title'];
				} else {
					$conclusion[] = $rowItem['smw_title'];
				}
			}
			
			// Display rule
			$wgOut->addWikiText(sprintf("%s: '%s' =&gt; '%s' (Sup: %0.2f, Conf: %0.2f)\n", $row['smw_title'], implode(",", $assumption), implode(",", $conclusion), $row['rule_support'], $row['rule_confidence']));
		}
		mysql_free_result($res);
	}
}

?>