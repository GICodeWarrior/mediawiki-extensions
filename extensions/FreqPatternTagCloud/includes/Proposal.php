<?php

/**
* Frequent Pattern Tag Cloud Plug-in
* Proposal proposes several attributes that relate to the attribute
* 
* @author Tobias Beck, University of Heidelberg
* @author Andreas Fay, University of Heidelberg
* @version 1.0
*/
 include_once("exceptions/InvalidAttributeException.php");
 
 class Proposal {
 	
 	/**
	* Attribute name for search
	*
	* @var string 
	*/
	private $_attribute;

	/**
	* Constructor
	*
	* @param string $attribute Attribute name for search
	* @return 
	* @throws InvalidAttributeException If attribute is not valid, i.e. present in database
	*/
	public function __construct($attribute) {
		$this->_attribute = $attribute;
	}
	
 	/**
	 * Gets the available proposals computed with wildcard %
	 *
	 * @return array Array of attributes
	 */
	public function getProposalWithWildcard() {
		$dbr =& wfGetDB( DB_SLAVE );
		
		$attribute = $this->getAttribute();
		
		// Search with wildcard '%'
		if (!($res = mysql_query("SELECT smw_id, smw_title
							FROM ".$dbr->tableName("smw_ids")."
							WHERE smw_namespace = 102
							AND LENGTH(smw_iw) = 0
							AND smw_title LIKE '%".mysql_real_escape_string($attribute)."%'"))) {
			
			throw new SQLException();
		}
		
		$attributes = array();
		
		while ($row = mysql_fetch_assoc($res)) {
			$attributes[] = $row['smw_title'];		
		}
		
		mysql_free_result($res);
		return $attributes;
	}
	
	/**
	 * Gets the available proposals computed with regexp
	 *
	 * @return array Array of attributes
	 */
	public function getProposalWithRegularExpressions() {
		$dbr =& wfGetDB( DB_SLAVE );
		
		$attribute = $this->getAttribute();
		$beginAttribut = substr ($attribute,0,2);
		$endAttribut = substr ($attribute,strlen($attribute)-2,strlen($attribute));
		
		// Search with regexp for related attributes with the same beginning 
		if (!($res = mysql_query("SELECT smw_id, smw_title
							FROM ".$dbr->tableName("smw_ids")."
							WHERE smw_namespace = 102
							AND LENGTH(smw_iw) = 0
							AND smw_title REGEXP '^".$beginAttribut."'"))) {
			
			throw new SQLException();
		}
		
		$attributes_1 = array();
		
		while ($row = mysql_fetch_assoc($res)) {
			$attributes_1[] = $row['smw_title'];		
		}
		
		// Search with regexp for related attributes with the same ending 
		if (!($res = mysql_query("SELECT smw_id, smw_title
							FROM ".$dbr->tableName("smw_ids")."
							WHERE smw_namespace = 102
							AND LENGTH(smw_iw) = 0
							AND smw_title REGEXP '".$endAttribut."$'"))) {
			
			throw new SQLException();
		}
		
		$attributes_2 = array();
		
		while ($row = mysql_fetch_assoc($res)) {
			$attributes_2[] = $row['smw_title'];		
		}
		
		// Merge both arrays for one return
		$attributes = array_merge($attributes_1, $attributes_2);
		
		mysql_free_result($res);
		return $attributes;
	}
	
	/**
	 * Gets the available proposals computed with wildcard search and via regexp
	 *
	 * @return array Array of attributes
	 */
	public function getProposal() {
		$dbr =& wfGetDB( DB_SLAVE );
		
		$attribute = $this->getAttribute();
		
		// first character = uppercase
		// other characters = lowercase
		$attributeUC = ucfirst(strtolower($attribute));
		
		$beginAttribut = substr ($attributeUC,0,2);
		$endAttribut = substr ($attribute,strlen($attribute)-2,strlen($attribute));
		
		// Search for related attributes and attributes with the same beginning or ending 
		if (!($res = mysql_query("SELECT DISTINCT smw_title
							FROM ".$dbr->tableName("smw_ids")."
							WHERE smw_namespace = 102
							AND LENGTH(smw_iw) = 0
							AND ((smw_title REGEXP '^".$beginAttribut."')
							OR (smw_title REGEXP '".$endAttribut."$')
							OR (smw_title LIKE '%".mysql_real_escape_string($attribute)."%'))
							ORDER BY smw_title asc"))) {
			
			throw new SQLException();
		}
		
		$attributes = array();
		
		while ($row = mysql_fetch_assoc($res)) {
			$attributes[] = $row['smw_title'];		
		}
		
		mysql_free_result($res);
		return $attributes;
	}
	
	private function getAttribute() {
		return $this->_attribute;
	}
}

?>
