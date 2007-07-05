<?php

require_once('Transaction.php');
require_once('Wikidata.php');

class Expression {
	public $id;
	public $spelling;
	public $languageId;
	public $pageId;
	
	function __construct($id, $spelling, $languageId) {
		$this->id = $id;
		$this->spelling = $spelling;
		$this->languageId = $languageId;
	}
	
	function createNewInDatabase() {
		$this->pageId = $this->createPage();
		createInitialRevisionForPage($this->pageId, 'Created by adding expression');
	}
	
	function createPage() {
		$expressionNameSpaceId = Namespace::getIndexForName('expression');
		wfDebug("NS ID: $expressionNameSpaceId \n");
		return createPage($expressionNameSpaceId, getPageTitle($this->spelling));
	}
	
	function isBoundToDefinedMeaning($definedMeaningId) {
		return expressionIsBoundToDefinedMeaning($definedMeaningId, $this->id);
	}

	function bindToDefinedMeaning($definedMeaningId, $identicalMeaning) {
		createSynonymOrTranslation($definedMeaningId, $this->id, $identicalMeaning);	
	}
	
	function assureIsBoundToDefinedMeaning($definedMeaningId, $identicalMeaning) {
		if (!$this->isBoundToDefinedMeaning($definedMeaningId)) 
			$this->bindToDefinedMeaning($definedMeaningId, $identicalMeaning);		
	}
}

function getExpression($expressionId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT spelling, language_id " .
								" FROM {$dc}_expression_ns " .
								" WHERE {$dc}_expression_ns.expression_id=$expressionId".
								" AND " . getLatestTransactionRestriction("{$dc}_expression_ns"));
	$expressionRecord = $dbr->fetchObject($queryResult);
	$expression = new Expression($expressionId, $expressionRecord->spelling, $expressionRecord->language_id);
	return $expression; 
}

function newObjectId($table) {
	$dc=wdGetDataSetContext();

	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query("INSERT INTO {$dc}_objects (`table`, `UUID`) VALUES (". $dbr->addQuotes($table) . ", UUID())");

	return $dbr->insertId();
}

function getTableNameWithObjectId($objectId) {
	$dc=wdGetDataSetContext();

	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT `table`" .
		" FROM {$dc}_objects" .
		" WHERE object_id=$objectId"
	);
	
	if ($objectRecord = $dbr->fetchObject($queryResult))
	return $objectRecord->table;
	else
		return "";
}

function getExpressionId($spelling, $languageId) {

	$dc=wdGetDataSetContext();

	$dbr = &wfGetDB(DB_SLAVE);
	$sql = "SELECT expression_id FROM {$dc}_expression_ns " .
			'WHERE spelling=binary '. $dbr->addQuotes($spelling) . ' AND language_id=' . $languageId .
			' AND '. getLatestTransactionRestriction("{$dc}_expression_ns");
	$queryResult = $dbr->query($sql);
	$expression = $dbr->fetchObject($queryResult);
	return isset($expression->expression_id) ? $expression->expression_id : null;
}	

function createExpressionId($spelling, $languageId) {
	
	$dc=wdGetDataSetContext();
	
	$expressionId = newObjectId("{$dc}_expression_ns");

	$dbr = &wfGetDB(DB_MASTER);
	$spelling = $dbr->addQuotes($spelling);

	$dbr->query("INSERT INTO {$dc}_expression_ns(expression_id, spelling, language_id, add_transaction_id) values($expressionId, $spelling, $languageId, ". getUpdateTransactionId() .")");
	 
	return $expressionId;		
}

function getPageTitle($spelling) {
	return str_replace(' ', '_', $spelling);
}


function createPage($namespace, $title) {
	$dbr = &wfGetDB(DB_MASTER);
	$title = $dbr->addQuotes($title);
	$timestamp = $dbr->timestamp(); 
	$sql = "select page_id from page where page_namespace = $namespace and page_title = $title";
	$queryResult = $dbr->query($sql);
	$page = $dbr->fetchObject($queryResult);
	if (isset($page->page_id) ){
		return $page->page_id;
	}
	else {
		$sql = "insert into page(page_namespace,page_title,page_is_new,page_touched) ".
		"values($namespace, $title, 1, $timestamp)";
		$dbr->query($sql);
		return $dbr->insertId();
	}
}

function setPageLatestRevision($pageId, $latestRevision) {
	$dbr = &wfGetDB(DB_MASTER);
	$sql = "update page set page_latest=$latestRevision where page_id=$pageId";	
	$dbr->query($sql);
}
function createInitialRevisionForPage($pageId, $comment) {
	global
		$wgUser;
		
	$dbr = &wfGetDB(DB_MASTER);
	$userId = $wgUser->getID();	
	$userName = $dbr->addQuotes($wgUser->getName());
	$comment = $dbr->addQuotes($comment);
	$timestamp = $dbr->timestamp();
	
	$sql = "insert into revision(rev_page,rev_comment,rev_user,rev_user_text,rev_timestamp) ".
	        "values($pageId, $comment, $userId, $userName, $timestamp)";
	$dbr->query($sql);

	$revisionId = $dbr->insertId();
	setPageLatestRevision($pageId, $revisionId); 
	
	return $revisionId;
}
	
function findExpression($spelling, $languageId) {
	if ($expressionId = getExpressionId($spelling, $languageId)){ 
		return new Expression($expressionId, $spelling, $languageId);
	}
	else{
		return null;	
	}
}

function createExpression($spelling, $languageId) {
	$expression = new Expression(createExpressionId($spelling, $languageId), $spelling, $languageId);
	$expression->createNewInDatabase();
	return $expression;
}

function findOrCreateExpression($spelling, $languageId) {
	if ($expression = findExpression($spelling, $languageId))
		return $expression;
	else
		return createExpression($spelling, $languageId);
}



function getSynonymId($definedMeaningId, $expressionId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT syntrans_sid FROM {$dc}_syntrans " .
								"WHERE defined_meaning_id=$definedMeaningId AND expression_id=$expressionId LIMIT 1");

	if ($synonym = $dbr->fetchObject($queryResult))
		return $synonym->syntrans_sid;
	else
		return 0;
}

function createSynonymOrTranslation($definedMeaningId, $expressionId, $identicalMeaning) {
	
	$dc=wdGetDataSetContext();

	$synonymId = getSynonymId($definedMeaningId, $expressionId);
	
	if ($synonymId == 0)
		$synonymId = newObjectId("{$dc}_syntrans");
	
	$dbr = &wfGetDB(DB_MASTER);
	$identicalMeaningInteger = (int) $identicalMeaning;	
	$sql = "insert into {$dc}_syntrans(syntrans_sid, defined_meaning_id, expression_id, identical_meaning, add_transaction_id) ".
	       "values($synonymId, $definedMeaningId, $expressionId, $identicalMeaningInteger, ". getUpdateTransactionId() .")";
	$queryResult = $dbr->query($sql);
}

function expressionIsBoundToDefinedMeaning($definedMeaningId, $expressionId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT expression_id FROM {$dc}_syntrans WHERE expression_id=$expressionId AND defined_meaning_id=$definedMeaningId AND ". getLatestTransactionRestriction("{$dc}_syntrans") ." LIMIT 1");
	
	return $dbr->numRows($queryResult) > 0;
}

function addSynonymOrTranslation($spelling, $languageId, $definedMeaningId, $identicalMeaning) {
	$expression = findOrCreateExpression($spelling, $languageId);
	$expression->assureIsBoundToDefinedMeaning($definedMeaningId, $identicalMeaning);
}
	
function getMaximum($field, $table) {
	$dbr = &wfGetDB(DB_SLAVE);
	$sql = "select max($field) as maximum from $table";
	$queryResult = $dbr->query($sql);
	
	if ($maximum = $dbr->fetchObject($queryResult))
		return $maximum->maximum;
	else
		return 0;
}

function getRelationId($definedMeaning1Id, $relationTypeId, $definedMeaning2Id) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT relation_id FROM {$dc}_meaning_relations " .
								"WHERE meaning1_mid=$definedMeaning1Id AND meaning2_mid=$definedMeaning2Id AND relationtype_mid=$relationTypeId LIMIT 1");

	if ($relation = $dbr->fetchObject($queryResult))
		return $relation->relation_id;
	else
		return 0;
}

function relationExists($definedMeaning1Id, $relationTypeId, $definedMeaning2Id) {
	$dc=wdGetDataSetContext();

	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT meaning1_mid FROM {$dc}_meaning_relations " .
								"WHERE meaning1_mid=$definedMeaning1Id AND meaning2_mid=$definedMeaning2Id AND relationtype_mid=$relationTypeId " .
								"AND " . getLatestTransactionRestriction("{$dc}_meaning_relations"));
	
	return $dbr->numRows($queryResult) > 0;
}

function createRelation($definedMeaning1Id, $relationTypeId, $definedMeaning2Id) {
	$dc=wdGetDataSetContext();

	$relationId = getRelationId($definedMeaning1Id, $relationTypeId, $definedMeaning2Id);
	
	if ($relationId == 0)
		$relationId = newObjectId("{$dc}_meaning_relations");
		
	$dbr =& wfGetDB(DB_MASTER);
	$sql = "INSERT INTO {$dc}_meaning_relations(relation_id, meaning1_mid, meaning2_mid, relationtype_mid, add_transaction_id) " .
			" VALUES ($relationId, $definedMeaning1Id, $definedMeaning2Id, $relationTypeId, ". getUpdateTransactionId() .")";
	$dbr->query($sql);
}

function addRelation($definedMeaning1Id, $relationTypeId, $definedMeaning2Id) {
	if (!relationExists($definedMeaning1Id, $relationTypeId, $definedMeaning2Id)) 
		createRelation($definedMeaning1Id, $relationTypeId, $definedMeaning2Id);
}

function removeRelation($definedMeaning1Id, $relationTypeId, $definedMeaning2Id) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_MASTER);
	$dbr->query("UPDATE {$dc}_meaning_relations SET remove_transaction_id=" . getUpdateTransactionId() .
				" WHERE meaning1_mid=$definedMeaning1Id AND meaning2_mid=$definedMeaning2Id AND relationtype_mid=$relationTypeId " .
				" AND remove_transaction_id IS NULL");
}

function removeRelationWithId($relationId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_MASTER);
	$dbr->query("UPDATE {$dc}_meaning_relations SET remove_transaction_id=" . getUpdateTransactionId() .
				" WHERE relation_id=$relationId " .
				" AND remove_transaction_id IS NULL");
}

function addClassAttribute($classMeaningId, $levelMeaningId, $attributeMeaningId, $attributeType) {
	if (!classAttributeExists($classMeaningId, $levelMeaningId, $attributeMeaningId, $attributeType)) 
		createClassAttribute($classMeaningId, $levelMeaningId, $attributeMeaningId, $attributeType);		
}

function classAttributeExists($classMeaningId, $levelMeaningId, $attributeMeaningId, $attributeType) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT object_id FROM {$dc}_class_attributes" .
								" WHERE class_mid=$classMeaningId AND level_mid=$levelMeaningId AND attribute_mid=$attributeMeaningId AND attribute_type = " . $dbr->addQuotes($attributeType) .
								' AND ' . getLatestTransactionRestriction("{$dc}_class_attributes"));
	
	return $dbr->numRows($queryResult) > 0;		
}

function createClassAttribute($classMeaningId, $levelMeaningId, $attributeMeaningId, $attributeType) {
	$objectId = getClassAttributeId($classMeaningId, $levelMeaningId, $attributeMeaningId, $attributeType);
	
	$dc=wdGetDataSetContext();

	if ($objectId == 0)
		$objectId = newObjectId("{$dc}_class_attributes");
		
	$dbr =& wfGetDB(DB_MASTER);
	$sql = "INSERT INTO {$dc}_class_attributes(object_id, class_mid, level_mid, attribute_mid, attribute_type, add_transaction_id) " .
			" VALUES ($objectId, $classMeaningId, $levelMeaningId, $attributeMeaningId, " . $dbr->addQuotes($attributeType) . ', ' . getUpdateTransactionId() . ')';
	$dbr->query($sql);	
}

function getClassAttributeId($classMeaningId, $levelMeaningId, $attributeMeaningId, $attributeType) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT object_id FROM {$dc}_class_attributes " .
								"WHERE class_mid=$classMeaningId AND level_mid =$levelMeaningId AND attribute_mid=$attributeMeaningId AND attribute_type = " . $dbr->addQuotes($attributeType));

	if ($classAttribute = $dbr->fetchObject($queryResult))
		return $classAttribute->object_id;
	else
		return 0;
}

function removeClassAttributeWithId($classAttributeId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_MASTER);
	$dbr->query("UPDATE {$dc}_class_attributes SET remove_transaction_id=" . getUpdateTransactionId() .
				" WHERE object_id=$classAttributeId " .
				" AND remove_transaction_id IS NULL");
}			

function getClassMembershipId($classMemberId, $classId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT class_membership_id FROM {$dc}_class_membership " .
								"WHERE class_mid=$classId AND class_member_mid=$classMemberId LIMIT 1");

	if ($classMembership = $dbr->fetchObject($queryResult))
		return $classMembership->class_membership_id;
	else
		return 0;
}

function createClassMembership($classMemberId, $classId) {
	$dc=wdGetDataSetContext();
	$classMembershipId = getClassMembershipId($classMemberId, $classId);
	
	if ($classMembershipId == 0)
		$classMembershipId = newObjectId("{$dc}_class_membership");

	$dbr =& wfGetDB(DB_MASTER);
	$sql = "INSERT INTO {$dc}_class_membership(class_membership_id, class_mid, class_member_mid, add_transaction_id) " .
			"VALUES ($classMembershipId, $classId, $classMemberId, ". getUpdateTransactionId() .")";
	$dbr->query($sql);
}

function classMembershipExists($classMemberId, $classId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT class_member_mid FROM {$dc}_class_membership " .
								"WHERE class_mid=$classId AND class_member_mid=$classMemberId  " .
								"AND " . getLatestTransactionRestriction("{$dc}_class_membership"));
	
	return $dbr->numRows($queryResult) > 0;
}

function addClassMembership($classMemberId, $classId) {
	if (!classMembershipExists($classMemberId, $classId))
		createClassMembership($classMemberId, $classId);
}

function removeClassMembership($classMemberId, $classId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_MASTER);
	$dbr->query("UPDATE {$dc}_class_membership SET remove_transaction_id=" . getUpdateTransactionId() .
				" WHERE class_mid=$classId AND class_member_mid=$classMemberId " .
				" AND remove_transaction_id IS NULL");
}

function removeClassMembershipWithId($classMembershipId) {
	$dc=wdGetDataSetContext();

	$dbr =& wfGetDB(DB_MASTER);
	$dbr->query("UPDATE {$dc}_class_membership SET remove_transaction_id=" . getUpdateTransactionId() .
				" WHERE class_membership_id=$classMembershipId" .
				" AND remove_transaction_id IS NULL");
}

function removeSynonymOrTranslation($definedMeaningId, $expressionId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_MASTER);
	$dbr->query("UPDATE {$dc}_syntrans SET remove_transaction_id=". getUpdateTransactionId() . 
				" WHERE defined_meaning_id=$definedMeaningId AND expression_id=$expressionId AND remove_transaction_id IS NULL LIMIT 1");
}

function removeSynonymOrTranslationWithId($syntransId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_MASTER);
	$dbr->query("UPDATE {$dc}_syntrans SET remove_transaction_id=". getUpdateTransactionId() . 
				" WHERE syntrans_sid=$syntransId AND remove_transaction_id IS NULL LIMIT 1");
}

function updateSynonymOrTranslation($definedMeaningId, $expressionId, $identicalMeaning) {
	removeSynonymOrTranslation($definedMeaningId, $expressionId);
	createSynonymOrTranslation($definedMeaningId, $expressionId, $identicalMeaning);
}

function updateSynonymOrTranslationWithId($syntransId, $identicalMeaning) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT defined_meaning_id, expression_id" .
								" FROM {$dc}_syntrans" .
								" WHERE syntrans_sid=$syntransId AND remove_transaction_id IS NULL");
				
	if ($syntrans = $dbr->fetchObject($queryResult)) 
		updateSynonymOrTranslation($syntrans->defined_meaning_id, $syntrans->expression_id, $identicalMeaning);
}

function updateDefinedMeaningDefinition($definedMeaningId, $languageId, $text) {
	$definitionId = getDefinedMeaningDefinitionId($definedMeaningId);
	
	if ($definitionId != 0)
		updateTranslatedText($definitionId, $languageId, $text);	
}

function updateOrAddDefinedMeaningDefinition($definedMeaningId, $languageId, $text) {
	$definitionId = getDefinedMeaningDefinitionId($definedMeaningId);
	
	if ($definitionId != 0)
		updateTranslatedText($definitionId, $languageId, $text);
	else
		addDefinedMeaningDefiningDefinition($definedMeaningId, $languageId, $text);	
}

function updateTranslatedText($setId, $languageId, $text) {
	removeTranslatedText($setId, $languageId);
	addTranslatedText($setId, $languageId, $text);
}
 
function createText($text) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_MASTER);
	$text = $dbr->addQuotes($text);
	$sql = "insert into {$dc}_text(text_text) values($text)";	
	$dbr->query($sql);
	
	return $dbr->insertId();
}

function createTranslatedContent($translatedContentId, $languageId, $textId) {
	$dc=wdGetDataSetContext();

	$dbr = &wfGetDB(DB_MASTER);
	$sql = "insert into {$dc}_translated_content(translated_content_id,language_id,text_id,add_transaction_id) values($translatedContentId, $languageId, $textId, ". getUpdateTransactionId() .")";	
	$dbr->query($sql);
	
	return $dbr->insertId();
}

function translatedTextExists($textId, $languageId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT translated_content_id" .
		" FROM {$dc}_translated_content" .
		" WHERE translated_content_id=$textId" .
		" AND language_id=$languageId" .
		" AND " . getLatestTransactionRestriction("{$dc}_translated_content")
	);

	return $dbr->numRows($queryResult) > 0;	
}

function addTranslatedText($translatedContentId, $languageId, $text) {
	$textId = createText($text);
	createTranslatedContent($translatedContentId, $languageId, $textId);
}

function addTranslatedTextIfNotPresent($translatedContentId, $languageId, $text) {
	if (!translatedTextExists($translatedContentId, $languageId)) 	
		addTranslatedText($translatedContentId, $languageId, $text);
}

function getDefinedMeaningDefinitionId($definedMeaningId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT meaning_text_tcid FROM {$dc}_defined_meaning WHERE defined_meaning_id=$definedMeaningId " .
								" AND " . getLatestTransactionRestriction("{$dc}_defined_meaning"));

	return $dbr->fetchObject($queryResult)->meaning_text_tcid;
}

function updateDefinedMeaningDefinitionId($definedMeaningId, $definitionId) {
	$dbr = &wfGetDB(DB_MASTER);
	$dc=wdGetDataSetContext();
	$dbr->query("UPDATE {$dc}_defined_meaning SET meaning_text_tcid=$definitionId WHERE defined_meaning_id=$definedMeaningId" .
				" AND " . getLatestTransactionRestriction("{$dc}_defined_meaning"));
}

function newTranslatedContentId() {
	$dc=wdGetDataSetContext();
	return newObjectId("{$dc}_translated_content");
}

function addDefinedMeaningDefiningDefinition($definedMeaningId, $languageId, $text) {
	$definitionId = newTranslatedContentId();		
	addTranslatedText($definitionId, $languageId, $text);
	updateDefinedMeaningDefinitionId($definedMeaningId, $definitionId);
}

function addDefinedMeaningDefinition($definedMeaningId, $languageId, $text) {
	$definitionId = getDefinedMeaningDefinitionId($definedMeaningId);
	
	if ($definitionId == 0)
		addDefinedMeaningDefiningDefinition($definedMeaningId, $languageId, $text);
	else 
		addTranslatedTextIfNotPresent($definitionId, $languageId, $text);
}

function createDefinedMeaningAlternativeDefinition($definedMeaningId, $translatedContentId, $sourceMeaningId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query("INSERT INTO {$dc}_alt_meaningtexts (meaning_mid, meaning_text_tcid, source_id, add_transaction_id) " .
			    "VALUES ($definedMeaningId, $translatedContentId, $sourceMeaningId, " . getUpdateTransactionId() . ")");
}

function addDefinedMeaningAlternativeDefinition($definedMeaningId, $languageId, $text, $sourceMeaningId) {
	$translatedContentId = newTranslatedContentId();
	
	createDefinedMeaningAlternativeDefinition($definedMeaningId, $translatedContentId, $sourceMeaningId);
	addTranslatedText($translatedContentId, $languageId, $text);
}

function removeTranslatedText($translatedContentId, $languageId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query("UPDATE {$dc}_translated_content SET remove_transaction_id=". getUpdateTransactionId() . 
				" WHERE translated_content_id=$translatedContentId AND language_id=$languageId AND remove_transaction_id IS NULL");
}

function removeTranslatedTexts($translatedContentId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query("UPDATE {$dc}_translated_content SET remove_transaction_id=". getUpdateTransactionId() . 
				" WHERE translated_content_id=$translatedContentId AND remove_transaction_id IS NULL");
}

function removeDefinedMeaningAlternativeDefinition($definedMeaningId, $definitionId) {
	// Dilemma: 
	// Should we also remove the translated texts when removing an
	// alternative definition? There are pros and cons. For
	// now it is easier to not remove them so they can be rolled
	// back easier.      
//	removeTranslatedTexts($definitionId);

	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query("UPDATE {$dc}_alt_meaningtexts SET remove_transaction_id=" . getUpdateTransactionId() .
				" WHERE meaning_text_tcid=$definitionId AND meaning_mid=$definedMeaningId" .
				" AND remove_transaction_id IS NULL");
}

function removeDefinedMeaningDefinition($definedMeaningId, $languageId) {
	$definitionId = getDefinedMeaningDefinitionId($definedMeaningId);
	
	if ($definitionId != 0)
		removeTranslatedText($definitionId, $languageId);
}

function definedMeaningInCollection($definedMeaningId, $collectionId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT collection_id FROM {$dc}_collection_contents WHERE collection_id=$collectionId AND member_mid=$definedMeaningId " .
								"AND ". getLatestTransactionRestriction("{$dc}_collection_contents"));
	
	return $dbr->numRows($queryResult) > 0;
}

function addDefinedMeaningToCollection($definedMeaningId, $collectionId, $internalId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query("INSERT INTO {$dc}_collection_contents(collection_id, member_mid, internal_member_id, add_transaction_id) " .
					"VALUES ($collectionId, $definedMeaningId, ". $dbr->addQuotes($internalId) .", ". getUpdateTransactionId() .")");
}

function addDefinedMeaningToCollectionIfNotPresent($definedMeaningId, $collectionId, $internalId) {
	if (!definedMeaningInCollection($definedMeaningId, $collectionId))
		addDefinedMeaningToCollection($definedMeaningId, $collectionId, $internalId);
}

function getDefinedMeaningFromCollection($collectionId, $internalMemberId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT member_mid FROM {$dc}_collection_contents WHERE collection_id=$collectionId AND internal_member_id=". $dbr->addQuotes($internalMemberId) .
								" AND " .getLatestTransactionRestriction("{$dc}_collection_contentsr"));
	
	if ($definedMeaningObject = $dbr->fetchObject($queryResult)) 
		return $definedMeaningObject->member_mid;
	else
		return null;
}

function removeDefinedMeaningFromCollection($definedMeaningId, $collectionId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query("UPDATE {$dc}_collection_contents SET remove_transaction_id=" . getUpdateTransactionId() .
				" WHERE collection_id=$collectionId AND member_mid=$definedMeaningId AND remove_transaction_id IS NULL");	
}

function updateDefinedMeaningInCollection($definedMeaningId, $collectionId, $internalId) {
	removeDefinedMeaningFromCollection($definedMeaningId, $collectionId);
	addDefinedMeaningToCollection($definedMeaningId, $collectionId, $internalId);	
}

function bootstrapCollection($collection, $languageId, $collectionType){
	$expression = findOrCreateExpression($collection, $languageId);
	$definedMeaningId = addDefinedMeaning($expression->id);
	$expression->assureIsBoundToDefinedMeaning($definedMeaningId, true);
	addDefinedMeaningDefinition($definedMeaningId, $languageId, $collection);
	return addCollection($definedMeaningId, $collectionType);
}

function getCollectionMeaningId($collectionId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT collection_mid FROM {$dc}_collection_ns " .
								" WHERE collection_id=$collectionId AND " . getLatestTransactionRestriction("{$dc}_collection_ns"));
	
	return $dbr->fetchObject($queryResult)->collection_mid;	
}

function getCollectionId($collectionMeaningId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT collection_id FROM {$dc}_collection_ns " .
								" WHERE collection_mid=$collectionMeaningId AND " . getLatestTransactionRestriction("{$dc}_collection_ns"));

	return $dbr->fetchObject($queryResult)->collection_id;	
}

function addCollection($definedMeaningId, $collectionType) {
	$dc=wdGetDataSetContext();
	$collectionId = newObjectId("{$dc}_collection_ns");
	
	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query("INSERT INTO {$dc}_collection_ns(collection_id, collection_mid, collection_type, add_transaction_id)" .
				" VALUES($collectionId, $definedMeaningId, '$collectionType', ". getUpdateTransactionId() .")");
	
	return $collectionId;	
}

function addDefinedMeaning($definingExpressionId) {
	$definedMeaningNameSpaceId = Namespace::getIndexForName('definedmeaning');
	$dc=wdGetDataSetContext();
	
	$definedMeaningId = newObjectId("{$dc}_defined_meaning"); 
	
	//wfDebug( "addDefinedMeaning(): $definedMeaningId has to be inserted to the database $dc" ); 
	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query("INSERT INTO {$dc}_defined_meaning(defined_meaning_id, expression_id, add_transaction_id) values($definedMeaningId, $definingExpressionId, ". getUpdateTransactionId() .")");
	
	//wfDebug( "addDefinedMeaning(): after $definedMeaningId has been inserted in the database" ); 
	
	$expression = getExpression($definingExpressionId);
	$pageId = createPage($definedMeaningNameSpaceId, getPageTitle("$expression->spelling ($definedMeaningId)"));
	createInitialRevisionForPage($pageId, 'Created by adding defined meaning');
	
	return $definedMeaningId;
}

function createNewDefinedMeaning($definingExpressionId, $languageId, $text) {
	$definedMeaningId = addDefinedMeaning($definingExpressionId);
	createSynonymOrTranslation($definedMeaningId, $definingExpressionId, true);
	addDefinedMeaningDefiningDefinition($definedMeaningId, $languageId, $text);
	
	return $definedMeaningId;
}

function addTextAttributeValue($objectId, $textAttributeId, $text) {
	$dc=wdGetDataSetContext();
	$textValueAttributeId = newObjectId("{$dc}_text_attribute_values");
	createTextAttributeValue($textValueAttributeId, $objectId, $textAttributeId, $text);
}

function createTextAttributeValue($textValueAttributeId, $objectId, $textAttributeId, $text) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query(
		"INSERT INTO {$dc}_text_attribute_values (value_id, object_id, attribute_mid, text, add_transaction_id) " .
		"VALUES ($textValueAttributeId, $objectId, $textAttributeId, " . $dbr->addQuotes($text) . ", ". getUpdateTransactionId() .")"
	);	
}

function removeTextAttributeValue($textValueAttributeId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query("UPDATE {$dc}_text_attribute_values SET remove_transaction_id=". getUpdateTransactionId() .
				" WHERE value_id=$textValueAttributeId" .
				" AND remove_transaction_id IS NULL");	
}

function updateTextAttributeValue($text, $textValueAttributeId) {
	$textValueAttribute = getTextValueAttribute($textValueAttributeId);
	removeTextAttributeValue($textValueAttributeId);
	createTextAttributeValue($textValueAttributeId, $textValueAttribute->object_id, $textValueAttribute->attribute_mid, $text);
}

function getTextValueAttribute($textValueAttributeId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT object_id, attribute_mid, text" .
		" FROM {$dc}_text_attribute_values" .
		" WHERE value_id=$textValueAttributeId " .
		" AND " . getLatestTransactionRestriction("{$dc}_text_attribute_values")
	);

	return $dbr->fetchObject($queryResult);
}

function addURLAttributeValue($objectId, $urlAttributeId, $url) {
	$dc=wdGetDataSetContext();
	$urlValueAttributeId = newObjectId("{$dc}_url_attribute_values");
	createURLAttributeValue($urlValueAttributeId, $objectId, $urlAttributeId, $url);
}

function createURLAttributeValue($urlValueAttributeId, $objectId, $urlAttributeId, $url) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query(
		"INSERT INTO {$dc}_url_attribute_values (value_id, object_id, attribute_mid, url, label, add_transaction_id) " .
		"VALUES ($urlValueAttributeId, $objectId, $urlAttributeId, " . $dbr->addQuotes($url) . ", " . $dbr->addQuotes($url) . ", ". getUpdateTransactionId() .")"
	);	
}

function removeURLAttributeValue($urlValueAttributeId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query(
		"UPDATE {$dc}_url_attribute_values SET remove_transaction_id=". getUpdateTransactionId() .
		" WHERE value_id=$urlValueAttributeId" .
		" AND remove_transaction_id IS NULL"
	);	
}

function updateURLAttributeValue($url, $urlValueAttributeId) {
	$urlValueAttribute = getURLValueAttribute($urlValueAttributeId);
	removeURLAttributeValue($urlValueAttributeId);
	createURLAttributeValue($urlValueAttributeId, $urlValueAttribute->object_id, $urlValueAttribute->attribute_mid, $url);
}

function getURLValueAttribute($urlValueAttributeId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT object_id, attribute_mid, url" .
		" FROM {$dc}_url_attribute_values WHERE value_id=$urlValueAttributeId " .
		" AND " . getLatestTransactionRestriction("{$dc}_url_attribute_values")
	);

	return $dbr->fetchObject($queryResult);
}

function createTranslatedTextAttributeValue($valueId, $objectId, $attributeId, $translatedContentId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query("INSERT INTO {$dc}_translated_content_attribute_values (value_id, object_id, attribute_mid, value_tcid, add_transaction_id) " .
			    "VALUES ($valueId, $objectId, $attributeId, $translatedContentId, ". getUpdateTransactionId() .")");
}

function addTranslatedTextAttributeValue($objectId, $attributeId, $languageId, $text) {
	$dc=wdGetDataSetContext();
	$translatedTextValueAttributeId = newObjectId("{$dc}_translated_content_attribute_values");
	$translatedContentId = newTranslatedContentId();
	
	createTranslatedTextAttributeValue($translatedTextValueAttributeId, $objectId, $attributeId, $translatedContentId);
	addTranslatedText($translatedContentId, $languageId, $text);
}

function getTranslatedTextAttribute($valueId) {
	$dc=wdGetDataSetContext();
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT value_id, object_id, attribute_mid, value_tcid FROM {$dc}_translated_content_attribute_values WHERE value_id=$valueId " .
								" AND " . getLatestTransactionRestriction("{$dc}_translated_content_attribute_values"));

	return $dbr->fetchObject($queryResult);
}

function removeTranslatedTextAttributeValue($valueId) {
	$dc=wdGetDataSetContext();
	$translatedTextAttribute = getTranslatedTextAttribute($valueId);
	
	// Dilemma: 
	// Should we also remove the translated texts when removing a
	// translated content attribute? There are pros and cons. For
	// now it is easier to not remove them so they can be rolled
	// back easier.      
//	removeTranslatedTexts($translatedTextAttribute->value_tcid);  

	$dbr = &wfGetDB(DB_MASTER);
	$dbr->query(
		"UPDATE {$dc}_translated_content_attribute_values" .
		" SET remove_transaction_id=". getUpdateTransactionId() .
		" WHERE value_id=$valueId" .
		" AND remove_transaction_id IS NULL"
	);
}

function optionAttributeValueExists($objectId, $optionId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDb(DB_SLAVE);
	$queryResult = $dbr->query("SELECT value_id FROM {$dc}_option_attribute_values" .
								' WHERE object_id = ' . $objectId .
								' AND option_id = ' . $optionId .
								' AND ' . getLatestTransactionRestriction("{$dc}_option_attribute_values"));
	return $dbr->numRows($queryResult) > 0;
}

function addOptionAttributeValue($objectId, $optionId) {
	if (!optionAttributeValueExists($objectId, $optionId))
		createOptionAttributeValue($objectId, $optionId);
}

function createOptionAttributeValue($objectId, $optionId) {
	$dc=wdGetDataSetContext();
	$valueId = newObjectId("{$dc}_option_attribute_values");

	$dbr =& wfGetDb(DB_MASTER);
	$sql = "INSERT INTO {$dc}_option_attribute_values(value_id,object_id,option_id,add_transaction_id)" .
			' VALUES(' . $valueId .
			',' . $objectId .
			',' . $optionId .
			',' . getUpdateTransactionId() . ')';
	$dbr->query($sql);
}

function removeOptionAttributeValue($valueId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_MASTER);
	$sql = "UPDATE {$dc}_option_attribute_values" .
			' SET remove_transaction_id = ' . getUpdateTransactionId() .
			' WHERE value_id = ' . $valueId .
			' AND ' . getLatestTransactionRestriction("{$dc}_option_attribute_values");
	$dbr->query($sql);
}

function optionAttributeOptionExists($attributeId, $optionMeaningId, $languageId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT option_id FROM {$dc}_option_attribute_options" .
								' WHERE attribute_id = ' . $attributeId .
								' AND option_mid = ' . $optionMeaningId .
								' AND language_id = ' . $languageId .
								' AND ' . getLatestTransactionRestriction("{$dc}_option_attribute_options"));
	return $dbr->numRows($queryResult) > 0;		
}

function addOptionAttributeOption($attributeId, $optionMeaningId, $languageId) {
	if (!optionAttributeOptionExists($attributeId, $optionMeaningId, $languageId))
		createOptionAttributeOption($attributeId, $optionMeaningId, $languageId);
}

function createOptionAttributeOption($attributeId, $optionMeaningId, $languageId) {
	$dc=wdGetDataSetContext();
	$optionId = newObjectId("{$dc}_option_attribute_options");

	$dbr =& wfGetDB(DB_MASTER);
	$sql = "INSERT INTO {$dc}_option_attribute_options(option_id,attribute_id,option_mid,language_id,add_transaction_id)" .
			' VALUES(' . $optionId .
			',' . $attributeId .
			',' . $optionMeaningId .
			',' . $languageId .
			',' . getUpdateTransactionId() . ')';
	$dbr->query($sql);
}

function removeOptionAttributeOption($optionId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_MASTER);
	$sql = "UPDATE {$dc}_option_attribute_options" .
			' SET remove_transaction_id = ' . getUpdateTransactionId() .
			' WHERE option_id = ' . $optionId .
			' AND ' . getLatestTransactionRestriction("{$dc}_option_attribute_options");
	$dbr->query($sql);
}

function getDefinedMeaningDefinitionForLanguage($definedMeaningId, $languageId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT text_text FROM {$dc}_defined_meaning as dm, {$dc}_translated_content as tc, {$dc}_text as t ".
								"WHERE dm.defined_meaning_id=$definedMeaningId " .
								" AND " . getLatestTransactionRestriction('dm') .
								" AND " . getLatestTransactionRestriction('tc') .
								" AND  dm.meaning_text_tcid=tc.translated_content_id AND tc.language_id=$languageId " .
								" AND  t.text_id=tc.text_id");	
	
	if ($definition = $dbr->fetchObject($queryResult)) 
		return $definition->text_text;
	else	
		return "";
}

function getDefinedMeaningDefinitionForAnyLanguage($definedMeaningId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT text_text FROM {$dc}_defined_meaning as dm, {$dc}_translated_content as tc, {$dc}_text as t ".
								"WHERE dm.defined_meaning_id=$definedMeaningId " .
								" AND " . getLatestTransactionRestriction('dm') .
								" AND " . getLatestTransactionRestriction('tc') .
								" AND dm.meaning_text_tcid=tc.translated_content_id " .
								" AND t.text_id=tc.text_id LIMIT 1");	
	
	if ($definition = $dbr->fetchObject($queryResult)) 
		return $definition->text_text;
	else	
		return "";
}

function getDefinedMeaningDefinition($definedMeaningId) {
	global
		$wgUser;
		
	$userLanguageId = getLanguageIdForCode($wgUser->getOption('language'));
	
	if ($userLanguageId > 0)
		$result = getDefinedMeaningDefinitionForLanguage($definedMeaningId, $userLanguageId);
	else
		$result = "";
	
	if ($result == "") {
		$result = getDefinedMeaningDefinitionForLanguage($definedMeaningId, 85);
		
		if ($result == "")
			$result = getDefinedMeaningDefinitionForAnyLanguage($definedMeaningId);
	}
	
	return $result;
}


function getSpellingForLanguage($definedMeaningId, $languageCode, $fallbackLanguageCode='en', $dc=null) {

	$dc=wdGetDataSetContext($dc);

	$userLanguageId=getLanguageIdForCode($languageCode);

	#wfDebug("User language: $userLanguageId\n");
	$fallbackLanguageId=getLanguageIdForCode($fallbackLanguageCode);

	#wfDebug("Fallback language: $fallbackLanguageId\n");
	$dbr = & wfGetDB(DB_SLAVE);	

	$definedMeaningId=$dbr->addQuotes($definedMeaningId);
	$userLanguageId=$dbr->addQuotes($userLanguageId);
	$fallbackLanguageId=$dbr->addQuotes($fallbackLanguageId);
	
	if($userLanguageId) {
		$actual_query="select spelling from {$dc}_syntrans,{$dc}_expression_ns where {$dc}_syntrans.defined_meaning_id=$definedMeaningId and {$dc}_expression_ns.expression_id={$dc}_syntrans.expression_id and language_id=$userLanguageId and {$dc}_expression_ns.remove_transaction_id is NULL";
	
		$res=$dbr->query($actual_query);
		$row=$dbr->fetchObject($res);
		if(isset($row->spelling)) return $row->spelling;
	}

	$fallback_query="select spelling from {$dc}_syntrans,{$dc}_expression_ns where {$dc}_syntrans.defined_meaning_id=$definedMeaningId and {$dc}_expression_ns.expression_id={$dc}_syntrans.expression_id and language_id=$fallbackLanguageId and {$dc}_expression_ns.remove_transaction_id is NULL";

	$res=$dbr->query($fallback_query);
	$row=$dbr->fetchObject($res);
	if(isset($row->spelling)) return $row->spelling;

	$final_fallback="select spelling from {$dc}_syntrans,{$dc}_expression_ns where {$dc}_syntrans.defined_meaning_id=$definedMeaningId and {$dc}_expression_ns.expression_id={$dc}_syntrans.expression_id and {$dc}_expression_ns.remove_transaction_id is NULL LIMIT 1";

	$res=$dbr->query($final_fallback);
	$row=$dbr->fetchObject($res);
	if(isset($row->spelling)) return $row->spelling;
	return null;

}

function isClass($objectId) {
	$dc=wdGetDataSetContext();
	$dbr = & wfGetDB(DB_SLAVE);	
	$query = "SELECT {$dc}_collection_ns.collection_id " .
			 "FROM ({$dc}_collection_contents INNER JOIN {$dc}_collection_ns ON {$dc}_collection_ns.collection_id = {$dc}_collection_contents.collection_id) " .
			 "WHERE {$dc}_collection_contents.member_mid = $objectId AND {$dc}_collection_ns.collection_type = 'CLAS' " .
			 	"AND " . getLatestTransactionRestriction("{$dc}_collection_contents") . " ".
			 	"AND " .getLatestTransactionRestriction("{$dc}_collection_ns");
	$queryResult = $dbr->query($query);

	return $dbr->numRows($queryResult) > 0;	 
}

function findCollection($name) {
	$dc=wdGetDataSetContext();
	$dbr = & wfGetDB(DB_SLAVE);
	$query = "SELECT collection_id, collection_mid, collection_type FROM {$dc}_collection_ns" .
			" WHERE ".getLatestTransactionRestriction("{$dc}_collection_ns") .
			" AND collection_mid = (SELECT defined_meaning_id FROM {$dc}_syntrans WHERE expression_id = " . 
             "(SELECT expression_id FROM {$dc}_expression_ns WHERE spelling LIKE " . $dbr->addQuotes($name) . " limit 1))";
	$queryResult = $dbr->query($query);
	
	if ($collectionObject = $dbr->fetchObject($queryResult)) 
		return $collectionObject->collection_id;
	else
		return null;             
}

function getCollectionContents($collectionId) {
	$dc=wdGetDataSetContext();
	$dbr = & wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT member_mid,internal_member_id from {$dc}_collection_contents " .
			                   "WHERE collection_id=$collectionId AND ". getLatestTransactionRestriction("{$dc}_collection_contents"));
	$collectionContents = array();			                   
	
	while ($collectionEntry = $dbr->fetchObject($queryResult)) 
		$collectionContents[$collectionEntry->internal_member_id] = $collectionEntry->member_mid;
	
	return $collectionContents;
} 

function getCollectionMemberId($collectionId, $sourceIdentifier) {
    $dc=wdGetDataSetContext();
    $dbr = & wfGetDB(DB_SLAVE);
    $queryResult = $dbr->query(
		"SELECT member_mid" .
		" FROM {$dc}_collection_contents " .
        " WHERE collection_id=$collectionId" .
        " AND internal_member_id=". $dbr->addQuotes($sourceIdentifier) .
        " AND " . getLatestTransactionRestriction("{$dc}_collection_contents")
    );

    if ($collectionEntry = $dbr->fetchObject($queryResult)) 
        return $collectionEntry->member_mid;
    else
        return 0;
} 

function getAnyDefinedMeaningWithSourceIdentifier($sourceIdentifier) {
    $dc=wdGetDataSetContext();
    $dbr = & wfGetDB(DB_SLAVE);
    $queryResult = $dbr->query(
		"SELECT member_mid" .
		" FROM {$dc}_collection_contents " .
        " WHERE internal_member_id=". $dbr->addQuotes($sourceIdentifier) .
        " AND " . getLatestTransactionRestriction("{$dc}_collection_contents") .
        " LIMIT 1"
    );

    if ($collectionEntry = $dbr->fetchObject($queryResult)) 
        return $collectionEntry->member_mid;
    else
        return 0;
}

function getExpressionMeaningIds($spelling) {
    $dc=wdGetDataSetContext();
    $dbr = & wfGetDB(DB_SLAVE);
    $queryResult = $dbr->query(
		"SELECT defined_meaning_id" .
		" FROM {$dc}_expression_ns, {$dc}_syntrans " .
        " WHERE spelling=". $dbr->addQuotes($spelling) .
        " AND {$dc}_expression_ns.expression_id={$dc}_syntrans.expression_id" .
        " AND " . getLatestTransactionRestriction("{$dc}_syntrans") .
        " AND " . getLatestTransactionRestriction("{$dc}_expression_ns")
    );

	$result = array();
	
	while ($synonymRecord = $dbr->fetchObject($queryResult)) 
        $result[] = $synonymRecord->defined_meaning_id;

	return $result;
}


/** Write a concept mapping to db
 * supply mapping as a valid
 * array("dataset_prefix"=>defined_meaning_id,...)
 */

function createConceptMapping($concepts) {
	$uuid= getUUID();
	foreach ($concepts as $dc => $dm_id) {
		$collid=getCollectionIdForDC($dc);
		writeDmToCollection($dc, $collid, $uuid, $dm_id);
	}
}

/** ask db to provide a universally unique id */

function getUUID() {
    	$dbr = & wfGetDB(DB_SLAVE);
	$query="SELECT uuid() AS id";
	$queryResult = $dbr->query($query);
	$row=$dbr->fetchObject($queryResult);
	return isset($row->id) ? $row->id : null;
}

/** this funtion assumes that there is only a single mapping collection */

function getCollectionIdForDC($dc) {
    	$dbr = & wfGetDB(DB_SLAVE);
	$query="
		SELECT collection_id FROM {$dc}_collection_ns
		WHERE collection_type=\"MAPP\"
         	AND  ". getLatestTransactionRestriction("{$dc}_collection_ns") ."
		LIMIT 1
		";
	$queryResult = $dbr->query($query);
	$row=$dbr->fetchObject($queryResult);
	return isset($row->collection_id) ? $row->collection_id : null;
}

/** Write the dm to the correct collection for a particular dc */

function writeDmToCollection($dc, $collid, $uuid, $dm_id) {
	global 
		$wgUser;
	//if(is_null($dc)) {
	//	$dc=wdGetDataSetContext();
	//} 
    	$dbr = & wfGetDB(DB_SLAVE);

	$collection_contents="{$dc}_collection_contents";
	$collid=$dbr->addQuotes($collid);
	$uuid=$dbr->addQuotes($uuid);
	$dm_id=$dbr->addQuotes($dm_id);

	startNewTransaction($wgUser->getId(), wfGetIP(), "inserting collection $collid", $dc);
	$add_transaction_id=getUpdateTransactionId();

	$sql="
		INSERT INTO $collection_contents
		SET 	collection_id=$collid,
			internal_member_id=$uuid,
			member_mid=$dm_id,
			add_transaction_id=$add_transaction_id		
		";
	$dbr->query($sql);
}

/**read a ConceptMapping from the database
 * map is in the form;
 * array("dataset_prefix"=>defined_meaning_id,...)
 * (possibly to rename $map or $concepts, to remain consistent)
 * note that we are using collection_contents.internal_member_id
 * as our ConceptMap ID.
 * see also: createConceptMapping($concepts)
 */
function &readConceptMapping($concept_id) {
    	$dbr = & wfGetDB(DB_SLAVE);
	$sets=wdGetDataSets();
	$map=array();
	$concept_id=$dbr->addQuotes($concept_id);
	foreach ($sets as $key => $set) {
		#wfdebug ("$key => $set");
		$dc=$set->getPrefix();
		$collection_id=getCollectionIdForDC($dc);
		$collection_id=$dbr->addQuotes($collection_id);
		$collection_contents="{$dc}_collection_contents";

		$query="
			SELECT member_mid FROM $collection_contents
			WHERE collection_id = $collection_id
			AND internal_member_id=$concept_id
			";
		$queryResult = $dbr->query($query);
		$row=$dbr->fetchObject($queryResult);
		if (isset($row->member_mid)) {
			$map[$dc]=$row->member_mid;
		}
	}
	return $map;
}

function getConceptId($dm,$dc){
	if(is_null($dc)) {
		$dc=wdGetDataSetContext();
	} 
	$collection_id=getCollectionIdForDC($dc);
    	$dbr = & wfGetDB(DB_SLAVE);
	$dm=$dbr->addQuotes($dm);
	$query = "
		SELECT internal_member_id AS concept_id
		FROM {$dc}_collection_contents
		WHERE member_mid=$dm
		AND collection_id=$collection_id;
		";
	$queryResult = $dbr->query($query);
	$row=$dbr->fetchObject($queryResult);
	return isset($row->concept_id) ? $row->concept_id : null;
}

function &getAssociatedByConcept($dm, $dc) {
    	#$dbr = & wfGetDB(DB_SLAVE);
	$concept_id=getConceptId($dm,$dc);
	return readConceptMapping($concept_id);
}

function &getDataSetsAssociatedByConcept($dm, $dc) {
	$map=getAssociatedByConcept($dm, $dc);
	$sets=wdGetDataSets();
	$newSets=array();
	foreach ($map as $map_dc => $map_dm) {
		$dataset=$sets[$map_dc];
	#	$dataset->setDefinedMeaningId($map_dm);
		$newSets[$map_dc]=$dataset;
	}
	return $newSets;
}
function &getDefinedMeaningDataAssociatedByConcept($dm, $dc) {
	$meanings=array();
	$map=getDataSetsAssociatedByConcept($dm, $dc);
	$dm_map=getAssociatedByConcept($dm, $dc);
	foreach ($map as $map_dc => $map_dataset) {
		$dmData=new DefinedMeaningData();
		$dmData->setDataset($map_dataset);
		$dmData->setId($dm_map[$map_dc]);
		$meanings[$map_dc]=$dmData;
	}
	return $meanings;
}

function definingExpressionRow($definedMeaningId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT {$dc}_expression_ns.expression_id, spelling, language_id " .
								" FROM {$dc}_defined_meaning, {$dc}_expression_ns " .
								" WHERE {$dc}_defined_meaning.defined_meaning_id=$definedMeaningId " .
								" AND {$dc}_expression_ns.expression_id={$dc}_defined_meaning.expression_id".
								" AND " . getLatestTransactionRestriction("{$dc}_defined_meaning").
								" AND " . getLatestTransactionRestriction("{$dc}_expression_ns"));
	$expression = $dbr->fetchObject($queryResult);
	return array($expression->expression_id, $expression->spelling, $expression->language_id); 
}

function definingExpression($definedMeaningId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT spelling " .
								" FROM {$dc}_defined_meaning, {$dc}_expression_ns " .
								" WHERE {$dc}_defined_meaning.defined_meaning_id=$definedMeaningId " .
								" AND {$dc}_expression_ns.expression_id={$dc}_defined_meaning.expression_id".
								" AND " . getLatestTransactionRestriction("{$dc}_defined_meaning").
								" AND " . getLatestTransactionRestriction("{$dc}_expression_ns"));
	$expression = $dbr->fetchObject($queryResult);
	return $expression->spelling; 
}

function definedMeaningExpressionForLanguage($definedMeaningId, $languageId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT spelling" .
		" FROM {$dc}_syntrans, {$dc}_expression_ns " .
		" WHERE defined_meaning_id=$definedMeaningId" .
		" AND {$dc}_expression_ns.expression_id={$dc}_syntrans.expression_id" .
		" AND {$dc}_expression_ns.language_id=$languageId" .
		" AND {$dc}_syntrans.identical_meaning=1" .
		" AND " . getLatestTransactionRestriction("{$dc}_syntrans") .
		" AND " . getLatestTransactionRestriction("{$dc}_expression_ns") .
		" LIMIT 1"
	);

	if ($expression = $dbr->fetchObject($queryResult))
		return $expression->spelling;
	else
		return "";
}

function definedMeaningExpressionForAnyLanguage($definedMeaningId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT spelling " .
		" FROM {$dc}_syntrans, {$dc}_expression_ns" .
		" WHERE defined_meaning_id=$definedMeaningId" .
		" AND {$dc}_expression_ns.expression_id={$dc}_syntrans.expression_id" .
		" AND {$dc}_syntrans.identical_meaning=1" .
		" AND " . getLatestTransactionRestriction("{$dc}_syntrans") .
		" AND " . getLatestTransactionRestriction("{$dc}_expression_ns") .
		" LIMIT 1");

	if ($expression = $dbr->fetchObject($queryResult))
		return $expression->spelling;
	else
		return "";
}

function definedMeaningExpression($definedMeaningId) {
	global
		$wgUser;
	
	$userLanguage = getLanguageIdForCode($wgUser->getOption('language'));
	
	list($definingExpressionId, $definingExpression, $definingExpressionLanguage) = definingExpressionRow($definedMeaningId);
	
	if ($definingExpressionLanguage == $userLanguage && expressionIsBoundToDefinedMeaning($definingExpressionId, $definedMeaningId))  
		return $definingExpression;
	else {	
		if ($userLanguage > 0)
			$result = definedMeaningExpressionForLanguage($definedMeaningId, $userLanguage);
		else
			$result = "";
		
		if ($result == "") {
			$result = definedMeaningExpressionForLanguage($definedMeaningId, 85);
			
			if ($result == "") {
				$result = definedMeaningExpressionForAnyLanguage($definedMeaningId);
				
				if ($result == "")
					$result = $definingExpression;
			}
		}
	}

	return $result;
}

function getTextValue($textId) {
	$dc=wdGetDataSetContext();
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT text_text from {$dc}_text where text_id=$textId");

	return $dbr->fetchObject($queryResult)->text_text; 
}



