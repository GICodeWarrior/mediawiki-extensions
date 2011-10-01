<?php

/**
 * Frequent Pattern Tag Cloud Plug-in
 * Special page for maintenance
 * 
 * @author Tobias Beck, University of Heidelberg
 * @author Andreas Fay, University of Heidelberg
 * @version 1.0
 */

class FreqPatternTagCloudMaintenance extends SpecialPage {
	
	/**
	 * Constructor
	 *
	 * @return void 
	 */
	public function __construct() {
		parent::__construct("FreqPatternTagCloudMaintenance");
	}
	
	
	/**
	 * Executes special page (will be called when accessing special page)
	 *
	 * @param string $par Content of GET-Parameter
	 * @return void 
	 */
	public function execute($par) {
		global $wgOut, $wgUser;
		$dbr =& wfGetDB( DB_SLAVE );
		
		$this->setHeaders();
		
		if (!$wgUser->isAllowed("protect")) {
			// No admin
			$wgOut->addWikiText(wfMsg("insufficientRightsForMaintenance"));
		} else {
			// Check if this call is the first
			try {
				$dbr->query("SELECT COUNT(1) FROM ".$dbr->tableName("fptc_associationrules"));
			} catch (exception $e) {
				// Yes: create database tables
				$this->initSchema();
			}
			
			// Refresh frequent pattern rules
			include_once("includes/FrequentPattern.php");
			
			FrequentPattern::deleteAllRules();
			FrequentPattern::computeAllRules();
			
			// Notify user
			$wgOut->addWikiText(wfMsg("refreshedFrequentPatterns"));
		}
	}
	
	
	
	
	/**
	 * Creates database schema
	 *
	 * @return void
	 */
	private function initSchema() {
		$dbw =& wfGetDB( DB_MASTER );
		
		$dbw->query("CREATE TABLE IF NOT EXISTS ".$dbw->tableName("fptc_associationrules")." (
					`rule_id` int(11) NOT NULL auto_increment,
					`p_id` int(8) NOT NULL COMMENT 'Attribute',
					`rule_support` float(5,3) NOT NULL,
					`rule_confidence` float(5,3) NOT NULL,
					PRIMARY KEY  (`rule_id`)
					)");
		$dbw->query("ALTER TABLE ".$dbw->tableName("fptc_associationrules")." ADD INDEX ( `p_id` );");
		$dbw->query("CREATE TABLE IF NOT EXISTS ".$dbw->tableName("fptc_items")." (
					`o_id` INT( 8 ) NOT NULL ,
					`rule_id` INT NOT NULL ,
					`item_order` TINYINT( 1 ) NOT NULL ,
					PRIMARY KEY ( `o_id` , `rule_id` )
					);");
	}
}