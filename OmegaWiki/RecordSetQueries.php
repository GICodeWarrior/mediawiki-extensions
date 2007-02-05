<?php

function queryRecordSet($transactionInformation, $keyAttribute, $fieldAttributeMapping, $table, $restrictions, $orderBy = array(), $count = -1, $offset = 0) {
	$dbr =& wfGetDB(DB_SLAVE);
	
	$selectFields = array_keys($fieldAttributeMapping);
	$attributes = array_values($fieldAttributeMapping);
	$tableNames = array($table->name);

	if ($table->isVersioned) {
		$restrictions[] = $transactionInformation->getRestriction($table);
		$tableNames = array_merge($tableNames, $transactionInformation->getTables());
		$orderBy = array_merge($orderBy, $transactionInformation->versioningOrderBy());
		$groupBy = $transactionInformation->versioningGroupBy($table);
		$selectFields = array_merge($selectFields, $transactionInformation->versioningFields($table->name));
		$allAttributes = array_merge($attributes, $transactionInformation->versioningAttributes());
	}
	else {
		$allAttributes = $attributes;
		$groupBy = array();
	}
	
	$query = "SELECT ". implode(", ", $selectFields) . 
			" FROM ". implode(", ", $tableNames);

	if (count($restrictions) > 0)
		$query .= " WHERE ". implode(' AND ', $restrictions);
	
	if (count($groupBy) > 0)
		$query .= " GROUP BY " . implode(', ', $groupBy);

	if (count($orderBy) > 0)
		$query .= " ORDER BY " . implode(', ', $orderBy);
		
	if ($count != -1) 
		$query .= " LIMIT " . $offset . ", " . $count;
	
	$queryResult = $dbr->query($query);
	
	$structure = new Structure($allAttributes);
	$recordSet = new ArrayRecordSet($structure, new Structure($keyAttribute));

	while ($row = $dbr->fetchRow($queryResult)) {
		$record = new ArrayRecord($structure);

		for ($i = 0; $i < count($attributes); $i++)
			$record->setAttributeValue($attributes[$i], $row[$i]);
			
		$transactionInformation->setVersioningAttributes($record, $row);	
		$recordSet->add($record);
	} 
		
	return $recordSet;
}

function getUniqueIdsInRecordSet($recordSet, $idAttributes) {
	$ids = array();
	
	for ($i = 0; $i < $recordSet->getRecordCount(); $i++) {
		$record = $recordSet->getRecord($i);
		
		foreach($idAttributes as $idAttribute) 
			$ids[] = $record->getAttributeValue($idAttribute);
	}
	
	return array_unique($ids);
}

?>
