<?php

/**
* Frequent Pattern Tag Cloud Plug-in
* Search checks, whether the attribute is available in the database.
* 
* @author Tobias Beck, University of Heidelberg
* @author Andreas Fay, University of Heidelberg
* @version 1.0
*/
include_once ("exceptions/InvalidAttributeException.php");

class Search {
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
		if (!$this->attributeAvailable($attribute)) {
			// Check if attribute is available
			throw new InvalidAttributeException($attribute);
		}
	}
	
	/**
	 * Checks whether attribute is correct, i.e. it exists in database; if yes it fetches the name of the attribute
	 *
	 * @param string $attribute Attribute
	 * @return bool 
	 */
	private function attributeAvailable($attribute) {
		// Category
		if (wfMsg("categoryname") == $attribute) {
			return true;
		}
		
		$dbr = & wfGetDB(DB_SLAVE);
		
		$res = $dbr->query("SELECT smw_title
					FROM " . $dbr->tableName("smw_ids") . "
					WHERE smw_namespace = 102
					AND LENGTH(smw_iw) = 0
					AND smw_title = '" . mysql_real_escape_string($attribute) . "'");
		
		if ($res->numRows() == 0) {
			// Attribute not found
			return false;
		}
		
		$row = $res->fetchRow();
		
		// Assign name
		$this->_attribute = $row[0];
		
		$res->free();
		return true;
	}
	
	/**
	 * Gets the available Attribute
	 *
	 * @return attribute
	 */
	public function getAvailableAttribute() {
		return $this->_attribute;
	}
}
