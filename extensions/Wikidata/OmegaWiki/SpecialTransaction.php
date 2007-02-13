<?php

if (!defined('MEDIAWIKI')) die();

$wgExtensionFunctions[] = 'wfSpecialTransaction';

function wfSpecialTransaction() {
        global $wgMessageCache;
                $wgMessageCache->addMessages(array('transaction'=>'Transaction log'),'en');
                
	class SpecialTransaction extends SpecialPage {
		function SpecialTransaction() {
			SpecialPage::SpecialPage('Transaction');
		}
		
		function execute($parameter) {
			global
				$wgOut;
			
			require_once("WikiDataTables.php");
			require_once("OmegaWikiAttributes.php");
			require_once("OmegaWikiRecordSets.php");
			require_once("OmegaWikiEditors.php");
			require_once("RecordSetQueries.php");
			require_once("Transaction.php");
			require_once("Editor.php");
			require_once("Controller.php");
			require_once("type.php");
			
			initializeOmegaWikiAttributes(false, false);
			initializeAttributes();
			
			$fromTransactionId = (int) $_GET['from-transaction'];
			$transactionCount = (int) $_GET['transaction-count'];
			$userName = "" . $_GET['user-name'];
			$showRollBackOptions = isset($_GET['show-roll-back-options']);
			
			if (isset($_POST['roll-back'])) {
				$fromTransactionId = (int) $_POST['from-transaction'];
				$transactionCount = (int) $_POST['transaction-count'];
				$userName = "" . $_POST['user-name'];
				
				if ($fromTransactionId != 0) {
					$recordSet = getTransactionRecordSet($fromTransactionId, $transactionCount, $userName);	
					rollBackTransactions($recordSet);
					$fromTransactionId = 0;
					$userName = "";
				}
			}

			if ($fromTransactionId == 0)
				$fromTransactionId = getLatestTransactionId();
				
			if ($transactionCount == 0)
				$transactionCount = 10;
			else
				$transactionCount = min($transactionCount, 20);
			
			$wgOut->addHTML('<h1>Recent changes</h1>');
			$wgOut->addHTML(getFilterOptionsPanel($fromTransactionId, $transactionCount, $userName, $showRollBackOptions));

			if ($showRollBackOptions) 
				$wgOut->addHTML(
					'<form method="post" action="">' .
					'<input type="hidden" name="from-transaction" value="'. $fromTransactionId .'"/>'. 
					'<input type="hidden" name="transaction-count" value="'. $transactionCount .'"/>'. 
					'<input type="hidden" name="user-name" value="'. $userName .'"/>' 
				);

			$recordSet = getTransactionRecordSet($fromTransactionId, $transactionCount, $userName);	
			
			$wgOut->addHTML(getTransactionOverview($recordSet, $showRollBackOptions));
			
			if ($showRollBackOptions)
				$wgOut->addHTML(
					'<div class="option-panel">'.
						'<table cellpadding="0" cellspacing="0">' .
							'<tr>' .
								'<th>' . wfMsg('summary') . ': </th>' .
								'<td class="option-field">' . getTextBox("summary") .'</td>' .
							'</tr>' .
							'<tr><th/><td>'. getSubmitButton("roll-back", "Roll back") .'</td></tr>'.
						'</table>' .
					'</div>'.
					'</form>'
				);
			
			$wgOut->addHTML(DefaultEditor::getExpansionCss());
			$wgOut->addHTML("<script language='javascript'><!--\nexpandEditors();\n--></script>");
		}
	}
	
	SpecialPage::addPage(new SpecialTransaction());
}

function getFilterOptionsPanel($fromTransactionId, $transactionCount, $userName, $showRollBackOptions) {
	$countOptions = array();
	
	for ($i = 1; $i <= 20; $i++)
		$countOptions[$i] = $i;
	
	return getOptionPanel(
		array(
			"From transaction" => 
				getSuggest(
					'from-transaction', 
					'transaction',
					array(), 
					$fromTransactionId, 
					getTransactionLabel($fromTransactionId), 
					array(0, 2, 3)
				),
			"Count" => 
				getSelect('transaction-count',
					$countOptions,
					$transactionCount 
				),
			"User name" => getTextBox('user-name', $userName),
			"Show roll back controls" => getCheckBox('show-roll-back-options', $showRollBackOptions)
		),
		'',
		array("show" => "Show")
	); 
}

function initializeAttributes() {
	global
		$operationAttribute, $isLatestAttribute, $definedMeaningIdAttribute, $definedMeaningReferenceAttribute, 
		$languageAttribute, $textAttribute, $definedMeaningReferenceStructure, $rollBackStructure, $rollBackAttribute;

	$operationAttribute = new Attribute('operation', 'Operation', 'text');
	$isLatestAttribute = new Attribute('is-latest', 'Is latest', 'boolean');

	$rollBackStructure = new Structure($isLatestAttribute, $operationAttribute);
	$rollBackAttribute = new Attribute('roll-back', 'Roll back', new RecordType($rollBackStructure));
	
	global
		$translatedContentHistoryStructure, $translatedContentHistoryKeyStructure, $translatedContentHistoryAttribute, 
		$recordLifeSpanAttribute, $addTransactionIdAttribute, $translatedContentIdAttribute;
	
	$addTransactionIdAttribute = new Attribute('add-transaction-id', 'Add transaction ID', 'identifier');
		
	$translatedContentHistoryStructure = new Structure($addTransactionIdAttribute, $textAttribute, $recordLifeSpanAttribute);
	$translatedContentHistoryKeyStructure = new Structure($addTransactionIdAttribute);
	$translatedContentHistoryAttribute = new Attribute('translated-content-history', 'History', new RecordSetType($translatedContentHistoryStructure));
	$translatedContentIdAttribute = new Attribute('translated-content-id', 'Translated content ID', 'object-id');

	global
		$rollBackTranslatedContentStructure, $rollBackTranslatedContentAttribute;

	$rollBackTranslatedContentStructure = new Structure($isLatestAttribute, $operationAttribute, $translatedContentHistoryAttribute);
	$rollBackTranslatedContentAttribute = new Attribute('roll-back', 'Roll back', new RecordType($rollBackTranslatedContentStructure));

	global
		$updatedDefinitionStructure, $updatedDefinitionAttribute;
	
	$updatedDefinitionStructure = new Structure(
		$rollBackTranslatedContentAttribute,
		$definedMeaningIdAttribute, 
		$definedMeaningReferenceAttribute, 
		$translatedContentIdAttribute,
		$languageAttribute, 
		$textAttribute,
		$operationAttribute,
		$isLatestAttribute
	);		
	
	$updatedDefinitionAttribute = new Attribute('updated-definition', 'Definition', new RecordSetType($updatedDefinitionStructure));

	global
		$expressionAttribute, $expressionIdAttribute, $identicalMeaningAttribute, $syntransIdAttribute, $updatedSyntransesAttribute;

	$updatedSyntransesStructure = new Structure(
		$syntransIdAttribute,
		$definedMeaningIdAttribute, 
		$definedMeaningReferenceAttribute,
		$expressionIdAttribute, 
		$expressionAttribute, 
		$identicalMeaningAttribute,
		$operationAttribute
	); 
	
	$updatedSyntransesAttribute = new Attribute('updated-syntranses', 'Synonyms and translations', new RecordSetType($updatedSyntransesStructure));
	
	global
		$relationIdAttribute, $firstMeaningAttribute, $secondMeaningAttribute, $relationTypeAttribute, 
		$updatedRelationsStructure, $updatedRelationsAttribute;
	
	$firstMeaningAttribute = new Attribute('first-meaning', "First defined meaning", new RecordType($definedMeaningReferenceStructure));
	$secondMeaningAttribute = new Attribute('second-meaning', "Second defined meaning", new RecordType($definedMeaningReferenceStructure));

	$updatedRelationsStructure = new Structure(
		$rollBackAttribute,
		$relationIdAttribute,
		$firstMeaningAttribute, 
		$relationTypeAttribute, 
		$secondMeaningAttribute,
		$operationAttribute,
		$isLatestAttribute
	);
	
	$updatedRelationsAttribute = new Attribute('updated-relations', 'Relations', new RecordSetType($updatedRelationsStructure));
	
	global
		$classMembershipIdAttribute, $classAttribute, $classMemberAttribute,
		$updatedClassMembershipStructure, $updatedClassMembershipAttribute;
		
	$classMemberAttribute = new Attribute('class-member', 'Class member', new RecordType($definedMeaningReferenceStructure));
	
	$updatedClassMembershipStructure = new Structure(
		$rollBackAttribute,
		$classMembershipIdAttribute,
		$classAttribute,
		$classMemberAttribute,
		$operationAttribute,
		$isLatestAttribute
	);
	
	$updatedClassMembershipAttribute = new Attribute('updated-class-membership', 'Class membership', new RecordSetType($updatedClassMembershipStructure));
	
	global
		$collectionIdAttribute, $collectionMeaningAttribute, $collectionMemberAttribute, $sourceIdentifierAttribute,
		$updatedCollectionMembershipStructure, $updatedCollectionMembershipAttribute, $collectionMemberIdAttribute;
		
	$collectionMemberAttribute = new Attribute('collection-member', 'Collection member', new RecordType($definedMeaningReferenceStructure));
	$collectionMemberIdAttribute = new Attribute('collection-member-id', 'Collection member identifier', 'defined-meaning-id');
	
	$updatedCollectionMembershipStructure = new Structure(
		$rollBackAttribute,
		$collectionIdAttribute,
		$collectionMeaningAttribute,
		$collectionMemberIdAttribute,
		$collectionMemberAttribute,
		$sourceIdentifierAttribute,
		$operationAttribute
	);
	
	$updatedCollectionMembershipAttribute = new Attribute('updated-collection-membership', 'Collection membership', new RecordSetType($updatedCollectionMembershipStructure));
	
	global
		$objectIdAttribute, $valueIdAttribute, $attributeAttribute;
		
	$objectIdAttribute = new Attribute('object-id', 'Object', 'object-id');
	$valueIdAttribute = new Attribute('value-id', 'Value identifier', 'object-id');
	$attributeAttribute = new Attribute('attribute', 'Attribute', new RecordType($definedMeaningReferenceStructure));
		
	global
		$updatedURLAttribute, $updatedURLStructure, $URLAttribute;	
		
	$URLAttribute = new Attribute('url', 'URL', 'url');	
		
	$updatedURLStructure = new Structure(
		$rollBackAttribute,
		$valueIdAttribute,
		$objectIdAttribute,
		$attributeAttribute,
		$URLAttribute,
		$operationAttribute,
		$isLatestAttribute
	);

	$updatedURLAttribute = new Attribute('updated-url', 'URL properties', new RecordSetType($updatedURLStructure));
	
	global
		$updatedTextAttribute, $updatedTextStructure, $textAttribute;	
		
	$updatedTextStructure = new Structure(
		$rollBackAttribute,
		$valueIdAttribute,
		$objectIdAttribute,
		$attributeAttribute,
		$textAttribute,
		$operationAttribute,
		$isLatestAttribute
	);

	$updatedTextAttribute = new Attribute('updated-text', 'Unstructured text properties', new RecordSetType($updatedTextStructure));
	
	global
		$translatedTextStructure, 
		$updatedTranslatedTextPropertyAttribute, $updatedTranslatedTextPropertyStructure, $translatedTextTextAttribute;
	
	$translatedTextTextAttribute = new Attribute('translated-text-property-text', 'Text', new RecordSetType($translatedTextStructure)); 
	
	$updatedTranslatedTextPropertyStructure = new Structure(
		$rollBackAttribute,
		$valueIdAttribute,
		$objectIdAttribute,
		$attributeAttribute,
		$translatedContentIdAttribute,
		$translatedTextTextAttribute, 
		$operationAttribute,
		$isLatestAttribute
	);
	
	$updatedTranslatedTextPropertyAttribute = new Attribute('updated-translated-text-property', 'Text properties', new RecordSetType($updatedTranslatedTextPropertyStructure));

	global
		$updatedTranslatedTextStructure, $updatedTranslatedTextAttribute;
	
	$updatedTranslatedTextStructure = new Structure(
		$rollBackTranslatedContentAttribute,
		$valueIdAttribute,
		$objectIdAttribute,
		$attributeAttribute,
		$translatedContentIdAttribute,
		$languageAttribute, 
		$textAttribute,
		$operationAttribute,
		$isLatestAttribute
	);		
	
	$updatedTranslatedTextAttribute = new Attribute('updated-translated-text', 'Texts', new RecordSetType($updatedTranslatedTextStructure));

	global
		$updatedClassAttributesAttribute, $updatedClassAttributesStructure, $classAttributeId, $levelAttribute, 
		$typeAttribute;

	$classAttributeId = new Attribute('class-attribute-id', 'Class attribute id', 'object-id');
	$levelAttribute = new Attribute('level', 'Level', new RecordType($definedMeaningReferenceStructure));
	$typeAttribute = new Attribute('type', 'Type', 'text');

	$updatedClassAttributesStructure = new Structure(
		$rollBackAttribute,
		$classAttributeId,
		$classAttribute,
		$levelAttribute,
		$typeAttribute,
		$attributeAttribute,
		$operationAttribute,
		$isLatestAttribute
	);
	
	$updatedClassAttributesAttribute = new Attribute('updated-class-attributes', 'Class attributes', new RecordSetType($updatedClassAttributesStructure));

	global
		$updatedAlternativeDefinitionsStructure, $updatedAlternativeDefinitionsAttribute, $sourceAttribute, 
		$alternativeDefinitionTextAttribute;

	$alternativeDefinitionTextAttribute = new Attribute('alternative-definition-text', 'Definition', new RecordSetType($translatedTextStructure));
	$sourceAttribute = new Attribute('source', 'Source', new RecordType($definedMeaningReferenceStructure));

	$updatedAlternativeDefinitionsStructure = new Structure(
		$rollBackAttribute,
		$definedMeaningIdAttribute,
		$translatedContentIdAttribute,
		$alternativeDefinitionTextAttribute,
		$definedMeaningReferenceAttribute,
		$sourceAttribute,
		$operationAttribute,
		$isLatestAttribute
	);	

	$updatedAlternativeDefinitionsAttribute = new Attribute('updated-alternative-definitions', 'Alternative definitions', new RecordSetType($updatedAlternativeDefinitionsStructure));

	global
		$updatedAlternativeDefinitionTextAttribute, $updatedAlternativeDefinitionTextStructure;
		
	$updatedAlternativeDefinitionTextStructure = new Structure(
		$rollBackTranslatedContentAttribute,
		$definedMeaningIdAttribute,
		$definedMeaningReferenceAttribute,
		$translatedContentIdAttribute,
		$sourceAttribute,
		$languageAttribute,
		$textAttribute,
		$operationAttribute,
		$isLatestAttribute
	);

	$updatedAlternativeDefinitionTextAttribute = new Attribute('updated-alternative-definition-text', 'Alternative definition text', new RecordSetType($updatedAlternativeDefinitionTextStructure));	

	global
		$updatesInTransactionAttribute;

	$updatesInTransactionStructure = new Structure(
		$updatedDefinitionAttribute,
		$updatedSyntransesAttribute,
		$updatedRelationsAttribute,
		$updatedClassMembershipAttribute,
		$updatedURLAttribute,
		$updatedTextAttribute,
		$updatedTranslatedTextAttribute,
		$updatedAlternativeDefinitionsAttribute
	);

	$updatesInTransactionAttribute = new Attribute('updates-in-transaction', 'Updates in transaction', new RecordType($updatesInTransactionStructure));
}

function getTransactionRecordSet($fromTransactionId, $transactionCount, $userName) {
	global
		$transactionAttribute, $transactionIdAttribute, $transactionsTable, $updatesInTransactionAttribute;
		
	$queryTransactionInformation = new QueryLatestTransactionInformation();

	$restrictions = array("transaction_id <= $fromTransactionId");
	
	if ($userName != "")
		$restrictions[] = "EXISTS (SELECT user_name FROM user WHERE user.user_id=transactions.user_id AND user.user_name='" . $userName . "')"; 

	$recordSet = queryRecordSet(
		$queryTransactionInformation,
		$transactionIdAttribute,
		array(
			'transaction_id' => $transactionIdAttribute
		),
		$transactionsTable,
		$restrictions,
		array('transaction_id DESC'),
		$transactionCount
	);
	
	$recordSet->getStructure()->attributes[] = $transactionIdAttribute;
	expandTransactionIDsInRecordSet($recordSet, $transactionIdAttribute, $transactionAttribute);
	
	$recordSet->getStructure()->attributes[] = $updatesInTransactionAttribute;
	expandUpdatesInTransactionInRecordSet($recordSet);

	return $recordSet;	
}

function getTransactionOverview($recordSet, $showRollBackOptions) {
	global
		$transactionAttribute, $userAttribute,  $timestampAttribute, $summaryAttribute, 
		$updatesInTransactionAttribute, $updatedDefinitionAttribute, $updatedSyntransesAttribute, 
		$updatedRelationsAttribute, $updatedClassMembershipAttribute, $updatedCollectionMembershipAttribute,
		$updatedURLAttribute, $updatedTextAttribute, $updatedTranslatedTextAttribute, $updatedClassAttributesAttribute,
		$updatedAlternativeDefinitionsAttribute, $updatedAlternativeDefinitionTextAttribute,
		$updatedTranslatedTextPropertyAttribute;

	$captionEditor = new RecordSpanEditor($transactionAttribute, ': ', ', ', false);
	$captionEditor->addEditor(new TimestampEditor($timestampAttribute, new SimplePermissionController(false), false));
	$captionEditor->addEditor(new UserEditor($userAttribute, new SimplePermissionController(false), false));
	$captionEditor->addEditor(new TextEditor($summaryAttribute, new SimplePermissionController(false), false));
	
	$valueEditor = new RecordUnorderedListEditor($updatesInTransactionAttribute, 5);
	$valueEditor->addEditor(getUpdatedDefinedMeaningDefinitionEditor($updatedDefinitionAttribute, $showRollBackOptions));
	$valueEditor->addEditor(getUpdatedAlternativeDefinitionsEditor($updatedAlternativeDefinitionsAttribute, $showRollBackOptions));
	$valueEditor->addEditor(getUpdatedAlternativeDefinitionTextEditor($updatedAlternativeDefinitionTextAttribute, $showRollBackOptions));
	$valueEditor->addEditor(getUpdatedSyntransesEditor($updatedSyntransesAttribute, $showRollBackOptions));
	$valueEditor->addEditor(getUpdatedRelationsEditor($updatedRelationsAttribute, $showRollBackOptions));
	$valueEditor->addEditor(getUpdatedClassAttributesEditor($updatedClassAttributesAttribute, $showRollBackOptions));
	$valueEditor->addEditor(getUpdatedClassMembershipEditor($updatedClassMembershipAttribute, $showRollBackOptions));
	$valueEditor->addEditor(getUpdatedCollectionMembershipEditor($updatedCollectionMembershipAttribute, $showRollBackOptions));
	$valueEditor->addEditor(getUpdatedURLEditor($updatedURLAttribute, $showRollBackOptions));
	$valueEditor->addEditor(getUpdatedTextEditor($updatedTextAttribute, $showRollBackOptions));
	$valueEditor->addEditor(getUpdatedTranslatedTextPropertyEditor($updatedTranslatedTextPropertyAttribute, $showRollBackOptions));
	$valueEditor->addEditor(getUpdatedTranslatedTextEditor($updatedTranslatedTextAttribute, $showRollBackOptions));
	
	$editor = new RecordSetListEditor(null, new SimplePermissionController(false), new ShowEditFieldChecker(true), new AllowAddController(false), false, false, null, 4, false);
	$editor->setCaptionEditor($captionEditor);
	$editor->setValueEditor($valueEditor);
	
	return $editor->view(new IdStack("transaction"), $recordSet);
}

function expandUpdatesInTransactionInRecordSet($recordSet) {
	global
		$transactionIdAttribute, $updatesInTransactionAttribute;
	
	for ($i = 0; $i < $recordSet->getRecordCount(); $i++) {
		$record = $recordSet->getRecord($i);
		$record->setAttributeValue(
			$updatesInTransactionAttribute, 
			getUpdatesInTransactionRecord($record->getAttributeValue($transactionIdAttribute))
		);
	}
}

function getUpdatesInTransactionRecord($transactionId) {
	global	
		$updatesInTransactionAttribute, $updatedDefinitionAttribute, $updatedSyntransesAttribute, 
		$updatedRelationsAttribute, $updatedClassMembershipAttribute, $updatedCollectionMembershipAttribute,
		$updatedURLAttribute, $updatedTextAttribute, $updatedTranslatedTextAttribute, $updatedClassAttributesAttribute,
		$updatedAlternativeDefinitionsAttribute, $updatedAlternativeDefinitionTextAttribute,
		$updatedTranslatedTextPropertyAttribute;
		
	$record = new ArrayRecord($updatesInTransactionAttribute->type->getStructure());
	$record->setAttributeValue($updatedDefinitionAttribute, getUpdatedDefinedMeaningDefinitionRecordSet($transactionId));
	$record->setAttributeValue($updatedAlternativeDefinitionsAttribute, getUpdatedAlternativeDefinitionsRecordSet($transactionId));
	$record->setAttributeValue($updatedAlternativeDefinitionTextAttribute, getUpdatedAlternativeDefinitionTextRecordSet($transactionId));
	$record->setAttributeValue($updatedSyntransesAttribute, getUpdatedSyntransesRecordSet($transactionId));
	$record->setAttributeValue($updatedRelationsAttribute, getUpdatedRelationsRecordSet($transactionId));
	$record->setAttributeValue($updatedClassMembershipAttribute, getUpdatedClassMembershipRecordSet($transactionId));
	$record->setAttributeValue($updatedCollectionMembershipAttribute, getUpdatedCollectionMembershipRecordSet($transactionId));
	$record->setAttributeValue($updatedURLAttribute, getUpdatedURLRecordSet($transactionId));
	$record->setAttributeValue($updatedTextAttribute, getUpdatedTextRecordSet($transactionId));
	$record->setAttributeValue($updatedTranslatedTextPropertyAttribute, getUpdatedTranslatedTextPropertyRecordSet($transactionId));
	$record->setAttributeValue($updatedTranslatedTextAttribute, getUpdatedTranslatedTextRecordSet($transactionId));
	$record->setAttributeValue($updatedClassAttributesAttribute, getUpdatedClassAttributesRecordSet($transactionId));
	
	return $record;
}

function getTranslatedContentHistory($translatedContentId, $languageId, $isLatest) {
	global
		$translatedContentHistoryStructure, $translatedContentHistoryKeyStructure,
		$textAttribute, $addTransactionIdAttribute, $recordLifeSpanAttribute;
		
	$recordSet = new ArrayRecordSet($translatedContentHistoryStructure, $translatedContentHistoryKeyStructure);
	
	if ($isLatest) {
		$dbr = &wfGetDB(DB_SLAVE);
		$queryResult = $dbr->query(
			"SELECT old_text, add_transaction_id, remove_transaction_id " .
			" FROM translated_content, text" .
			" WHERE translated_content.translated_content_id=$translatedContentId" .
			" AND translated_content.language_id=$languageId " .
			" AND translated_content.text_id=text.old_id " .
			" ORDER BY add_transaction_id DESC"
		);
		
		while ($row = $dbr->fetchObject($queryResult)) {
			$record = new ArrayRecord($translatedContentHistoryStructure);
			$record->setAttributeValue($textAttribute, $row->old_text);
			$record->setAttributeValue($addTransactionIdAttribute, (int) $row->add_transaction_id);
			$record->setAttributeValue($recordLifeSpanAttribute, getRecordLifeSpanTuple((int) $row->add_transaction_id, (int) $row->remove_transaction_id));
			
			$recordSet->add($record);	
		}
	}
	
	return $recordSet;
}

function getUpdatedTextRecord($text, $history) {
	global
		$updatedTextStructure, $textAttribute, $translatedContentHistoryAttribute;
		
	$result = new ArrayRecord($updatedTextStructure);
	$result->setAttributeValue($textAttribute, $text);	
	$result->setAttributeValue($translatedContentHistoryAttribute, $history);
	
	return $result;
}

function getUpdatedDefinedMeaningDefinitionRecordSet($transactionId) {
	global
		$languageAttribute, $textAttribute, $definedMeaningIdAttribute, 
		$definedMeaningReferenceAttribute, $updatedDefinitionStructure, $translatedContentIdAttribute,
		$operationAttribute, $isLatestAttribute, $rollBackTranslatedContentAttribute, $rollBackTranslatedContentStructure;
		
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT defined_meaning_id, translated_content_id, language_id, old_text, " . 
			getOperationSelectColumn('translated_content', $transactionId) . ', ' .
			getIsLatestSelectColumn('translated_content', array('translated_content_id', 'language_id'), $transactionId) . 
		" FROM uw_defined_meaning, translated_content, text " .
		" WHERE uw_defined_meaning.meaning_text_tcid=translated_content.translated_content_id ".
		" AND translated_content.text_id=text.old_id " .
		" AND " . getInTransactionRestriction('translated_content', $transactionId) .
		" AND " . getAtTransactionRestriction('uw_defined_meaning', $transactionId)
	);
		
	$recordSet = new ArrayRecordSet($updatedDefinitionStructure, new Structure($definedMeaningIdAttribute, $languageAttribute));
	
	while ($row = $dbr->fetchObject($queryResult)) {
		$record = new ArrayRecord($updatedDefinitionStructure);
		$record->setAttributeValue($definedMeaningIdAttribute, $row->defined_meaning_id);
		$record->setAttributeValue($definedMeaningReferenceAttribute, getDefinedMeaningReferenceRecord($row->defined_meaning_id));
		$record->setAttributeValue($translatedContentIdAttribute, $row->translated_content_id);
		$record->setAttributeValue($languageAttribute, $row->language_id);
		$record->setAttributeValue($textAttribute, $row->old_text);
		$record->setAttributeValue($operationAttribute, $row->operation);
		$record->setAttributeValue($isLatestAttribute, $row->is_latest);
		$record->setAttributeValue($rollBackTranslatedContentAttribute, simpleRecord($rollBackTranslatedContentStructure, array($row->is_latest, $row->operation, getTranslatedContentHistory($row->translated_content_id, $row->language_id, $row->is_latest))));
		$recordSet->add($record);	
	}
	
	return $recordSet;
}

function getUpdatedAlternativeDefinitionsRecordSet($transactionId) {
	global
		$updatedAlternativeDefinitionsStructure, $definedMeaningIdAttribute, $definedMeaningReferenceAttribute, 
		$translatedContentIdAttribute, $sourceAttribute, $alternativeDefinitionTextAttribute,
		$operationAttribute, $isLatestAttribute, $rollBackAttribute, $rollBackStructure;

	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT meaning_mid, meaning_text_tcid, source_id, " . 
			getOperationSelectColumn('uw_alt_meaningtexts', $transactionId) . ', ' .
			getIsLatestSelectColumn('uw_alt_meaningtexts', array('meaning_text_tcid'), $transactionId) . 
		" FROM uw_alt_meaningtexts " .
		" WHERE " . getInTransactionRestriction('uw_alt_meaningtexts', $transactionId)
	);
		
	$recordSet = new ArrayRecordSet($updatedAlternativeDefinitionsStructure, new Structure($definedMeaningIdAttribute, $translatedContentIdAttribute));
	
	while ($row = $dbr->fetchObject($queryResult)) {
		$record = new ArrayRecord($updatedAlternativeDefinitionsStructure);
		$record->setAttributeValue($definedMeaningIdAttribute, $row->meaning_mid);
		$record->setAttributeValue($definedMeaningReferenceAttribute, getDefinedMeaningReferenceRecord($row->meaning_mid));
		$record->setAttributeValue($translatedContentIdAttribute, $row->meaning_text_tcid);
		$record->setAttributeValue($sourceAttribute, getDefinedMeaningReferenceRecord($row->source_id));
		$record->setAttributeValue($operationAttribute, $row->operation);
		$record->setAttributeValue($isLatestAttribute, $row->is_latest);
		$record->setAttributeValue($rollBackAttribute, simpleRecord($rollBackStructure, array($row->is_latest, $row->operation)));
		
		$recordSet->add($record);	
	}
	
	expandTranslatedContentsInRecordSet($recordSet, $translatedContentIdAttribute, $alternativeDefinitionTextAttribute, 0, new QueryLatestTransactionInformation());
	
	return $recordSet;
}

function getUpdatedAlternativeDefinitionTextRecordSet($transactionId) {
	global
		$languageAttribute, $textAttribute, $definedMeaningIdAttribute, $sourceAttribute,
		$definedMeaningReferenceAttribute, $updatedAlternativeDefinitionTextStructure, $translatedContentIdAttribute,
		$rollBackTranslatedContentStructure, $rollBackTranslatedContentAttribute, $operationAttribute, $isLatestAttribute;
		
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT meaning_mid, translated_content_id, source_id, language_id, old_text, " . 
			getOperationSelectColumn('translated_content', $transactionId) . ', ' .
			getIsLatestSelectColumn('translated_content', array('translated_content_id', 'language_id'), $transactionId) . 
		" FROM uw_alt_meaningtexts, translated_content, text " .
		" WHERE uw_alt_meaningtexts.meaning_text_tcid=translated_content.translated_content_id ".
		" AND translated_content.text_id=text.old_id " .
		" AND " . getInTransactionRestriction('translated_content', $transactionId) .
		" AND " . getAtTransactionRestriction('uw_alt_meaningtexts', $transactionId)
	);
		
	$recordSet = new ArrayRecordSet($updatedAlternativeDefinitionTextStructure, new Structure($translatedContentIdAttribute, $languageAttribute));
	
	while ($row = $dbr->fetchObject($queryResult)) {
		$record = new ArrayRecord($updatedAlternativeDefinitionTextStructure);
		$record->setAttributeValue($definedMeaningIdAttribute, $row->meaning_mid);
		$record->setAttributeValue($definedMeaningReferenceAttribute, getDefinedMeaningReferenceRecord($row->meaning_mid));
		$record->setAttributeValue($translatedContentIdAttribute, $row->translated_content_id);
		$record->setAttributeValue($sourceAttribute, getDefinedMeaningReferenceRecord($row->source_id));
		$record->setAttributeValue($languageAttribute, $row->language_id);
		$record->setAttributeValue($textAttribute, $row->old_text);
		$record->setAttributeValue($operationAttribute, $row->operation);
		$record->setAttributeValue($isLatestAttribute, $row->is_latest);
		$record->setAttributeValue($rollBackTranslatedContentAttribute, simpleRecord($rollBackTranslatedContentStructure, array($row->is_latest, $row->operation, getTranslatedContentHistory($row->translated_content_id, $row->language_id, $row->is_latest))));
		$recordSet->add($record);	
	}
	
	return $recordSet;
}

function getUpdatedSyntransesRecordSet($transactionId) {
	global
		$updatedSyntransesStructure, $definedMeaningIdAttribute, $definedMeaningReferenceAttribute, 
		$expressionAttribute, $expressionStructure, $languageAttribute, $spellingAttribute, $syntransIdAttribute,
		$expressionIdAttribute,	$identicalMeaningAttribute, 
		$isLatestAttribute, $operationAttribute, $rollBackAttribute, $rollBackStructure;
	
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT syntrans_sid, defined_meaning_id, uw_syntrans.expression_id, language_id, spelling, identical_meaning, " . 
			getOperationSelectColumn('uw_syntrans', $transactionId) . ', ' .
			getIsLatestSelectColumn('uw_syntrans', array('syntrans_sid'), $transactionId) . 
		" FROM uw_syntrans, uw_expression_ns " .
		" WHERE uw_syntrans.expression_id=uw_expression_ns.expression_id " .
		" AND " . getInTransactionRestriction('uw_syntrans', $transactionId) .
		" AND " . getAtTransactionRestriction('uw_expression_ns', $transactionId)
	);
		
	$recordSet = new ArrayRecordSet($updatedSyntransesStructure, new Structure($syntransIdAttribute));
	
	while ($row = $dbr->fetchObject($queryResult)) {
		$expressionRecord = new ArrayRecord($expressionStructure);
		$expressionRecord->setAttributeValue($languageAttribute, $row->language_id);
		$expressionRecord->setAttributeValue($spellingAttribute, $row->spelling);

		$record = new ArrayRecord($updatedSyntransesStructure);
		$record->setAttributeValue($syntransIdAttribute, $row->syntrans_sid);
		$record->setAttributeValue($definedMeaningIdAttribute, $row->defined_meaning_id);
		$record->setAttributeValue($expressionIdAttribute, $row->expression_id);
		$record->setAttributeValue($definedMeaningReferenceAttribute, getDefinedMeaningReferenceRecord($row->defined_meaning_id));
		$record->setAttributeValue($expressionAttribute, $expressionRecord);
		$record->setAttributeValue($identicalMeaningAttribute, $row->identical_meaning);
		$record->setAttributeValue($isLatestAttribute, $row->is_latest);
		$record->setAttributeValue($operationAttribute, $row->operation);
		$record->setAttributeValue($rollBackAttribute, simpleRecord($rollBackStructure, array($row->is_latest, $row->operation)));
		
		$recordSet->add($record);	
	}
	
	return $recordSet;
}

function getIsLatestSelectColumn($table, $idFields, $transactionId) {
	$idSelectColumns = array();
	$idRestrictions = array();
	
	foreach ($idFields as $idField) {
		$idSelectColumns[] = "latest_$table.$idField";
		$idRestrictions[] = "$table.$idField=latest_$table.$idField";
	}
	
	return 
		"($table.add_transaction_id=$transactionId AND $table.remove_transaction_id IS NULL) OR ($table.remove_transaction_id=$transactionId AND NOT EXISTS(" .
			"SELECT " . implode(', ', $idSelectColumns) .
			" FROM $table AS latest_$table" .
			" WHERE " . implode(' AND ', $idRestrictions) .
			" AND (latest_$table.add_transaction_id >= $transactionId) " .
		")) AS is_latest ";
}

function getUpdatedRelationsRecordSet($transactionId) {
	global
		$updatedRelationsStructure, $relationIdAttribute, $firstMeaningAttribute, $secondMeaningAttribute, 
		$relationTypeAttribute, $operationAttribute, $isLatestAttribute, $rollBackAttribute, $rollBackStructure;

	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT relation_id, meaning1_mid, meaning2_mid, relationtype_mid, " . 
			getOperationSelectColumn('uw_meaning_relations', $transactionId) . ', ' .
			getIsLatestSelectColumn('uw_meaning_relations', array('relation_id'), $transactionId) . 
		" FROM uw_meaning_relations " .
		" WHERE " . getInTransactionRestriction('uw_meaning_relations', $transactionId)
	);
		
	$recordSet = new ArrayRecordSet($updatedRelationsStructure, new Structure($relationIdAttribute));
	
	while ($row = $dbr->fetchObject($queryResult)) {
		$record = new ArrayRecord($updatedRelationsStructure);
		$record->setAttributeValue($relationIdAttribute, $row->relation_id);
		$record->setAttributeValue($firstMeaningAttribute, getDefinedMeaningReferenceRecord($row->meaning1_mid));
		$record->setAttributeValue($secondMeaningAttribute, getDefinedMeaningReferenceRecord($row->meaning2_mid));
		$record->setAttributeValue($relationTypeAttribute, getDefinedMeaningReferenceRecord($row->relationtype_mid));
		$record->setAttributeValue($operationAttribute, $row->operation);
		$record->setAttributeValue($isLatestAttribute, $row->is_latest);
		$record->setAttributeValue($rollBackAttribute, simpleRecord($rollBackStructure, array($row->is_latest, $row->operation)));
		
		$recordSet->add($record);	
	}
	
	return $recordSet;
}

function getUpdatedClassMembershipRecordSet($transactionId) {
	global
		$updatedClassMembershipStructure, $classMembershipIdAttribute, $classAttribute, $classMemberAttribute, 
		$operationAttribute, $isLatestAttribute, $rollBackAttribute, $rollBackStructure;
	
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT class_membership_id, class_mid, class_member_mid, " . 
		getOperationSelectColumn('uw_class_membership', $transactionId) . ', ' .
		getIsLatestSelectColumn('uw_class_membership', array('class_membership_id'), $transactionId) . 
		" FROM uw_class_membership " .
		" WHERE " . getInTransactionRestriction('uw_class_membership', $transactionId)
	);
		
	$recordSet = new ArrayRecordSet($updatedClassMembershipStructure, new Structure($classMembershipIdAttribute));
	
	while ($row = $dbr->fetchObject($queryResult)) {
		$record = new ArrayRecord($updatedClassMembershipStructure);
		$record->setAttributeValue($classMembershipIdAttribute, $row->class_membership_id);
		$record->setAttributeValue($classAttribute, getDefinedMeaningReferenceRecord($row->class_mid));
		$record->setAttributeValue($classMemberAttribute, getDefinedMeaningReferenceRecord($row->class_member_mid));
		$record->setAttributeValue($operationAttribute, $row->operation);
		$record->setAttributeValue($isLatestAttribute, $row->is_latest);
		$record->setAttributeValue($rollBackAttribute, simpleRecord($rollBackStructure, array($row->is_latest, $row->operation)));
		
		$recordSet->add($record);	
	}
	
	return $recordSet;
}

function getUpdatedCollectionMembershipRecordSet($transactionId) {
	global
		$updatedCollectionMembershipStructure, $collectionIdAttribute, $collectionMeaningAttribute, 
		$collectionMemberAttribute, $sourceIdentifierAttribute, $collectionMemberIdAttribute, 
		$operationAttribute, $isLatestAttribute, $rollBackAttribute, $rollBackStructure;
	
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT uw_collection_contents.collection_id, collection_mid, member_mid, internal_member_id, " . 
			getOperationSelectColumn('uw_collection_contents', $transactionId) . ', ' .
			getIsLatestSelectColumn('uw_collection_contents', array('collection_id', 'member_mid'), $transactionId) . 
		" FROM uw_collection_contents, uw_collection_ns " .
		" WHERE uw_collection_contents.collection_id=uw_collection_ns.collection_id " .
		" AND " . getInTransactionRestriction('uw_collection_contents', $transactionId) .
		" AND " . getAtTransactionRestriction('uw_collection_ns', $transactionId)
	);
		
	$recordSet = new ArrayRecordSet($updatedCollectionMembershipStructure, new Structure($collectionIdAttribute, $collectionMemberIdAttribute));
	
	while ($row = $dbr->fetchObject($queryResult)) {
		$record = new ArrayRecord($updatedCollectionMembershipStructure);
		$record->setAttributeValue($collectionIdAttribute, $row->collection_id);
		$record->setAttributeValue($collectionMeaningAttribute, getDefinedMeaningReferenceRecord($row->collection_mid));
		$record->setAttributeValue($collectionMemberIdAttribute, $row->member_mid);
		$record->setAttributeValue($collectionMemberAttribute, getDefinedMeaningReferenceRecord($row->member_mid));
		$record->setAttributeValue($sourceIdentifierAttribute, $row->internal_member_id);
		$record->setAttributeValue($operationAttribute, $row->operation);
		$record->setAttributeValue($isLatestAttribute, $row->is_latest);
		$record->setAttributeValue($rollBackAttribute, simpleRecord($rollBackStructure, array($row->is_latest, $row->operation)));
		
		$recordSet->add($record);	
	}
	
	return $recordSet;
}

function getUpdatedClassAttributesRecordSet($transactionId) {
	global
		$updatedClassAttributesStructure, $classAttributeIdAttribute, $classAttribute, $levelAttribute, 
		$attributeAttribute, $typeAttribute, $operationAttribute, $isLatestAttribute, $rollBackAttribute, $rollBackStructure;

	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT object_id, class_mid, level_mid, attribute_mid, attribute_type, " . 
			getOperationSelectColumn('uw_class_attributes', $transactionId) . ', ' .
			getIsLatestSelectColumn('uw_class_attributes', array('object_id'), $transactionId) . 
		" FROM uw_class_attributes " .
		" WHERE " . getInTransactionRestriction('uw_class_attributes', $transactionId)
	);
		
	$recordSet = new ArrayRecordSet($updatedClassAttributesStructure, new Structure($classAttributeIdAttribute));
	
	while ($row = $dbr->fetchObject($queryResult)) {
		$record = new ArrayRecord($updatedClassAttributesStructure);
		$record->setAttributeValue($classAttributeIdAttribute, $row->object_id);
		$record->setAttributeValue($classAttribute, getDefinedMeaningReferenceRecord($row->class_mid));
		$record->setAttributeValue($levelAttribute, getDefinedMeaningReferenceRecord($row->level_mid));
		$record->setAttributeValue($attributeAttribute, getDefinedMeaningReferenceRecord($row->attribute_mid));
		$record->setAttributeValue($typeAttribute, $row->attribute_type);
		$record->setAttributeValue($operationAttribute, $row->operation);
		$record->setAttributeValue($isLatestAttribute, $row->is_latest);
		$record->setAttributeValue($rollBackAttribute, simpleRecord($rollBackStructure, array($row->is_latest, $row->operation)));
		
		$recordSet->add($record);	
	}
	
	return $recordSet;
}

function getUpdatedURLRecordSet($transactionId) {
	global
		$objectIdAttribute, $valueIdAttribute, $attributeAttribute, $URLAttribute, 
		$updatedURLStructure, $operationAttribute, $isLatestAttribute, 
		$rollBackAttribute, $rollBackStructure;
	
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT value_id, object_id, attribute_mid, url, " . 
		getOperationSelectColumn('uw_url_attribute_values', $transactionId) . ', ' .
		getIsLatestSelectColumn('uw_url_attribute_values', array('value_id'), $transactionId) . 
		" FROM uw_url_attribute_values " .
		" WHERE " . getInTransactionRestriction('uw_url_attribute_values', $transactionId) 
	);
		
	$recordSet = new ArrayRecordSet($updatedURLStructure, new Structure($valueIdAttribute));
	
	while ($row = $dbr->fetchObject($queryResult)) {
		$record = new ArrayRecord($updatedURLStructure);
		$record->setAttributeValue($valueIdAttribute, $row->value_id);
		$record->setAttributeValue($objectIdAttribute, $row->object_id);
		$record->setAttributeValue($attributeAttribute, getDefinedMeaningReferenceRecord($row->attribute_mid));
		$record->setAttributeValue($URLAttribute, $row->url);
		$record->setAttributeValue($operationAttribute, $row->operation);
		$record->setAttributeValue($isLatestAttribute, $row->is_latest);
		$record->setAttributeValue($rollBackAttribute, simpleRecord($rollBackStructure, array($row->is_latest, $row->operation)));
		
		$recordSet->add($record);	
	}
	
	return $recordSet;
}

function getUpdatedTextRecordSet($transactionId) {
	global
		$objectIdAttribute, $valueIdAttribute, $attributeAttribute, $textAttribute, 
		$updatedTextStructure, 
		$operationAttribute, $isLatestAttribute, $rollBackAttribute, $rollBackStructure;
	
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT value_id, object_id, attribute_mid, text, " . 
		getOperationSelectColumn('uw_text_attribute_values', $transactionId) . ', ' .
		getIsLatestSelectColumn('uw_text_attribute_values', array('value_id'), $transactionId) . 
		" FROM uw_text_attribute_values " .
		" WHERE " . getInTransactionRestriction('uw_text_attribute_values', $transactionId) 
	);
		
	$recordSet = new ArrayRecordSet($updatedTextStructure, new Structure($valueIdAttribute));
	
	while ($row = $dbr->fetchObject($queryResult)) {
		$record = new ArrayRecord($updatedTextStructure);
		$record->setAttributeValue($valueIdAttribute, $row->value_id);
		$record->setAttributeValue($objectIdAttribute, $row->object_id);
		$record->setAttributeValue($attributeAttribute, getDefinedMeaningReferenceRecord($row->attribute_mid));
		$record->setAttributeValue($textAttribute, $row->text);
		$record->setAttributeValue($operationAttribute, $row->operation);
		$record->setAttributeValue($isLatestAttribute, $row->is_latest);
		$record->setAttributeValue($rollBackAttribute, simpleRecord($rollBackStructure, array($row->is_latest, $row->operation)));
		
		$recordSet->add($record);	
	}
	
	return $recordSet;
}

function getUpdatedTranslatedTextPropertyRecordSet($transactionId) {
	global
		$updatedTranslatedTextPropertyStructure, $objectIdAttribute, $valueIdAttribute, 
		$translatedContentIdAttribute, $attributeAttribute, $translatedTextTextAttribute,
		$operationAttribute, $isLatestAttribute, $rollBackAttribute, $rollBackStructure;

	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT value_id, object_id, attribute_mid, value_tcid, " . 
			getOperationSelectColumn('uw_translated_content_attribute_values', $transactionId) . ', ' .
			getIsLatestSelectColumn('uw_translated_content_attribute_values', array('value_id'), $transactionId) . 
		" FROM uw_translated_content_attribute_values " .
		" WHERE " . getInTransactionRestriction('uw_translated_content_attribute_values', $transactionId)
	);
		
	$recordSet = new ArrayRecordSet($updatedTranslatedTextPropertyStructure, new Structure($valueIdAttribute));
	
	while ($row = $dbr->fetchObject($queryResult)) {
		$record = new ArrayRecord($updatedTranslatedTextPropertyStructure);
		$record->setAttributeValue($valueIdAttribute, $row->value_id);
		$record->setAttributeValue($objectIdAttribute, $row->object_id);
		$record->setAttributeValue($translatedContentIdAttribute, $row->value_tcid);
		$record->setAttributeValue($attributeAttribute, getDefinedMeaningReferenceRecord($row->attribute_mid));
		$record->setAttributeValue($operationAttribute, $row->operation);
		$record->setAttributeValue($isLatestAttribute, $row->is_latest);
		$record->setAttributeValue($rollBackAttribute, simpleRecord($rollBackStructure, array($row->is_latest, $row->operation)));
		
		$recordSet->add($record);	
	}
	
	expandTranslatedContentsInRecordSet($recordSet, $translatedContentIdAttribute, $translatedTextTextAttribute, 0, new QueryLatestTransactionInformation());
	
	return $recordSet;
}

function getUpdatedTranslatedTextRecordSet($transactionId) {
	global
		$languageAttribute, $textAttribute, $objectIdAttribute, $valueIdAttribute, $attributeAttribute,
		$updatedTranslatedTextStructure, $translatedContentIdAttribute,
		$operationAttribute, $isLatestAttribute, $rollBackTranslatedContentAttribute, $rollBackTranslatedContentStructure;
		
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT value_id, object_id, attribute_mid, translated_content_id, language_id, old_text, " . 
			getOperationSelectColumn('translated_content', $transactionId) . ', ' .
			getIsLatestSelectColumn('translated_content', array('translated_content_id', 'language_id'), $transactionId) . 
		" FROM uw_translated_content_attribute_values, translated_content, text " .
		" WHERE uw_translated_content_attribute_values.value_tcid=translated_content.translated_content_id ".
		" AND translated_content.text_id=text.old_id " .
		" AND " . getInTransactionRestriction('translated_content', $transactionId) .
		" AND " . getAtTransactionRestriction('uw_translated_content_attribute_values', $transactionId)
	);
		
	$recordSet = new ArrayRecordSet($updatedTranslatedTextStructure, new Structure($valueIdAttribute, $languageAttribute));
	
	while ($row = $dbr->fetchObject($queryResult)) {
		$record = new ArrayRecord($updatedTranslatedTextStructure);
		$record->setAttributeValue($valueIdAttribute, $row->value_id);
		$record->setAttributeValue($objectIdAttribute, $row->object_id);
		$record->setAttributeValue($attributeAttribute, getDefinedMeaningReferenceRecord($row->attribute_mid));
		$record->setAttributeValue($translatedContentIdAttribute, $row->translated_content_id);
		$record->setAttributeValue($languageAttribute, $row->language_id);
		$record->setAttributeValue($textAttribute, $row->old_text);
		$record->setAttributeValue($operationAttribute, $row->operation);
		$record->setAttributeValue($isLatestAttribute, $row->is_latest);
		$record->setAttributeValue($rollBackTranslatedContentAttribute, simpleRecord($rollBackTranslatedContentStructure, array($row->is_latest, $row->operation, getTranslatedContentHistory($row->translated_content_id, $row->language_id, $row->is_latest))));
		$recordSet->add($record);	
	}
	
	return $recordSet;
}

function getTranslatedContentHistorySelector($attribute) {
	global
		$textAttribute, $recordLifeSpanAttribute;
	
	$result = createSuggestionsTableViewer($attribute);
	$result->addEditor(createLongTextViewer($textAttribute));
	$result->addEditor(createTableLifeSpanEditor($recordLifeSpanAttribute));

	$result = new RecordSetRecordSelector($result);
	
	return $result;
}

function getUpdatedDefinedMeaningDefinitionEditor($attribute, $showRollBackOptions) {
	global
		$definedMeaningReferenceAttribute, $languageAttribute, $textAttribute, 
		$operationAttribute, $isLatestAttribute, $rollBackTranslatedContentAttribute, $translatedContentHistoryAttribute;
	
	$editor = createTableViewer($attribute);
	
	if ($showRollBackOptions) {
		$rollBackEditor = new RollbackEditor($rollBackTranslatedContentAttribute, true);
		$rollBackEditor->setSuggestionsEditor(getTranslatedContentHistorySelector($translatedContentHistoryAttribute));
		
		$editor->addEditor($rollBackEditor);
	}
		
	$editor->addEditor(createDefinedMeaningReferenceViewer($definedMeaningReferenceAttribute));
	$editor->addEditor(createLanguageViewer($languageAttribute));
	$editor->addEditor(createLongTextViewer($textAttribute));
	$editor->addEditor(createShortTextViewer($operationAttribute));
	$editor->addEditor(createBooleanViewer($isLatestAttribute));
	
	return $editor;
}

function getUpdatedAlternativeDefinitionsEditor($attribute, $showRollBackOptions) {
	global
		$definedMeaningReferenceAttribute, $sourceAttribute,
		$alternativeDefinitionTextAttribute,  $rollBackAttribute, $operationAttribute,$isLatestAttribute;
		
	$editor = createTableViewer($attribute);
	
	if ($showRollBackOptions)
		$editor->addEditor(new RollbackEditor($rollBackAttribute, false));
		
	$editor->addEditor(createDefinedMeaningReferenceViewer($definedMeaningReferenceAttribute));
	$editor->addEditor(createTranslatedTextViewer($alternativeDefinitionTextAttribute));
	$editor->addEditor(createDefinedMeaningReferenceViewer($sourceAttribute));
	$editor->addEditor(createShortTextViewer($operationAttribute));
	$editor->addEditor(createBooleanViewer($isLatestAttribute));
	
	return $editor;
}

function getUpdatedAlternativeDefinitionTextEditor($attribute, $showRollBackOptions) {
	global
		$definedMeaningReferenceAttribute, $languageAttribute, $textAttribute, $sourceAttribute, 
		$operationAttribute, $isLatestAttribute, $rollBackTranslatedContentAttribute, $translatedContentHistoryAttribute;
	
	$editor = createTableViewer($attribute);
	
	if ($showRollBackOptions) {
		$rollBackEditor = new RollbackEditor($rollBackTranslatedContentAttribute, true);
		$rollBackEditor->setSuggestionsEditor(getTranslatedContentHistorySelector($translatedContentHistoryAttribute));
		
		$editor->addEditor($rollBackEditor);
	}

	$editor->addEditor(createDefinedMeaningReferenceViewer($definedMeaningReferenceAttribute));
	$editor->addEditor(createLanguageViewer($languageAttribute));
	$editor->addEditor(createLongTextViewer($textAttribute));
	$editor->addEditor(createDefinedMeaningReferenceViewer($sourceAttribute));
	$editor->addEditor(createShortTextViewer($operationAttribute));
	$editor->addEditor(createBooleanViewer($isLatestAttribute));
	
	return $editor;
}

function getUpdatedSyntransesEditor($attribute, $showRollBackOptions) {
	global
		$definedMeaningReferenceAttribute, $expressionAttribute, $identicalMeaningAttribute, 
		$isLatestAttribute, $operationAttribute, $rollBackAttribute;
		
	$editor = createTableViewer($attribute);
	
	if ($showRollBackOptions)
		$editor->addEditor(new RollbackEditor($rollBackAttribute, false));
		
	$editor->addEditor(createDefinedMeaningReferenceViewer($definedMeaningReferenceAttribute));
	$editor->addEditor(getExpressionTableCellEditor($expressionAttribute, 0));
	$editor->addEditor(new BooleanEditor($identicalMeaningAttribute, new SimplePermissionController(false), false, false));
	$editor->addEditor(createShortTextViewer($operationAttribute));
	$editor->addEditor(createBooleanViewer($isLatestAttribute));
	
	return $editor;
}

function getUpdatedRelationsEditor($attribute, $showRollBackOptions) {
	global
		$firstMeaningAttribute, $relationTypeAttribute, $secondMeaningAttribute, $operationAttribute, 
		$isLatestAttribute, $rollBackAttribute;
		
	$editor = createTableViewer($attribute);
	
	if ($showRollBackOptions)
		$editor->addEditor(new RollbackEditor($rollBackAttribute, false));
		
	$editor->addEditor(createDefinedMeaningReferenceViewer($firstMeaningAttribute));
	$editor->addEditor(createDefinedMeaningReferenceViewer($relationTypeAttribute));
	$editor->addEditor(createDefinedMeaningReferenceViewer($secondMeaningAttribute));
	$editor->addEditor(createShortTextViewer($operationAttribute));
	$editor->addEditor(createBooleanViewer($isLatestAttribute));
	
	return $editor;
}

function getUpdatedClassMembershipEditor($attribute, $showRollBackOptions) {
	global
		$classAttribute, $classMemberAttribute, $operationAttribute, $isLatestAttribute, $rollBackAttribute;
		
	$editor = createTableViewer($attribute);
	
	if ($showRollBackOptions)
		$editor->addEditor(new RollbackEditor($rollBackAttribute, false));
		
	$editor->addEditor(createDefinedMeaningReferenceViewer($classAttribute));
	$editor->addEditor(createDefinedMeaningReferenceViewer($classMemberAttribute));
	$editor->addEditor(createShortTextViewer($operationAttribute));
	$editor->addEditor(createBooleanViewer($isLatestAttribute));
	
	return $editor;
}

function getUpdatedCollectionMembershipEditor($attribute, $showRollBackOptions) {
	global
		$collectionMeaningAttribute, $collectionMemberAttribute, $sourceIdentifierAttribute, 
		$operationAttribute, $rollBackAttribute, $isLatestAttribute;
		
	$editor = createTableViewer($attribute);

	if ($showRollBackOptions)
		$editor->addEditor(new RollbackEditor($rollBackAttribute, false));
		
	$editor->addEditor(createDefinedMeaningReferenceViewer($collectionMeaningAttribute));
	$editor->addEditor(createDefinedMeaningReferenceViewer($collectionMemberAttribute));
	$editor->addEditor(createShortTextViewer($sourceIdentifierAttribute));
	$editor->addEditor(createShortTextViewer($operationAttribute));
	$editor->addEditor(createBooleanViewer($isLatestAttribute));
	
	return $editor;
}

function getUpdatedURLEditor($attribute, $showRollBackOptions) {
	global
		$objectIdAttribute, $valueIdAttribute, $attributeAttribute, $URLAttribute, 
		$rollBackAttribute, $operationAttribute, $isLatestAttribute;
		
	$editor = createTableViewer($attribute);

	if ($showRollBackOptions)
		$editor->addEditor(new RollbackEditor($rollBackAttribute, false));
		
	$editor->addEditor(new ObjectPathEditor($objectIdAttribute));
	$editor->addEditor(createDefinedMeaningReferenceViewer($attributeAttribute));
	$editor->addEditor(createURLViewer($URLAttribute));
	$editor->addEditor(createShortTextViewer($operationAttribute));
	$editor->addEditor(createBooleanViewer($isLatestAttribute));
	
	return $editor;
}

function getUpdatedTextEditor($attribute, $showRollBackOptions) {
	global
		$objectIdAttribute, $valueIdAttribute, $attributeAttribute, $textAttribute, 
		$rollBackAttribute, $operationAttribute, $isLatestAttribute;
		
	$editor = createTableViewer($attribute);

	if ($showRollBackOptions)
		$editor->addEditor(new RollbackEditor($rollBackAttribute, false));
		
	$editor->addEditor(new ObjectPathEditor($objectIdAttribute));
	$editor->addEditor(createDefinedMeaningReferenceViewer($attributeAttribute));
	$editor->addEditor(createLongTextViewer($textAttribute));
	$editor->addEditor(createShortTextViewer($operationAttribute));
	$editor->addEditor(createBooleanViewer($isLatestAttribute));
	
	return $editor;
}

function getUpdatedTranslatedTextPropertyEditor($attribute, $showRollBackOptions) {
	global
		$objectIdAttribute, $valueIdAttribute, $attributeAttribute, $translatedTextTextAttribute, 
		$operationAttribute, $isLatestAttribute, $rollBackAttribute;
	
	$editor = createTableViewer($attribute);
	
	if ($showRollBackOptions)
		$editor->addEditor(new RollbackEditor($rollBackAttribute, false));

	$editor->addEditor(new ObjectPathEditor($objectIdAttribute));
	$editor->addEditor(createDefinedMeaningReferenceViewer($attributeAttribute));
	$editor->addEditor(createTranslatedTextViewer($translatedTextTextAttribute));
	$editor->addEditor(createShortTextViewer($operationAttribute));
	$editor->addEditor(createBooleanViewer($isLatestAttribute));
	
	return $editor;
}

function getUpdatedTranslatedTextEditor($attribute, $showRollBackOptions) {
	global
		$objectIdAttribute, $valueIdAttribute, $attributeAttribute, $languageAttribute, $textAttribute, 
		$operationAttribute, $isLatestAttribute, $rollBackTranslatedContentAttribute, $translatedContentHistoryAttribute;
	
	$editor = createTableViewer($attribute);
	
	if ($showRollBackOptions) {
		$rollBackEditor = new RollbackEditor($rollBackTranslatedContentAttribute, true);
		$rollBackEditor->setSuggestionsEditor(getTranslatedContentHistorySelector($translatedContentHistoryAttribute));
		
		$editor->addEditor($rollBackEditor);
	}
		
	$editor->addEditor(new ObjectPathEditor($objectIdAttribute));
	$editor->addEditor(createDefinedMeaningReferenceViewer($attributeAttribute));
	$editor->addEditor(createLanguageViewer($languageAttribute));
	$editor->addEditor(createLongTextViewer($textAttribute));
	$editor->addEditor(createShortTextViewer($operationAttribute));
	$editor->addEditor(createBooleanViewer($isLatestAttribute));
	
	return $editor;
}

function getUpdatedClassAttributesEditor($attribute, $showRollBackOptions) {
	global
		$classAttribute, $levelAttribute, $attributeAttribute, $typeAttribute, $operationAttribute, 
		$isLatestAttribute, $rollBackAttribute;
		
	$editor = createTableViewer($attribute);
	
	if ($showRollBackOptions)
		$editor->addEditor(new RollbackEditor($rollBackAttribute, false));
		
	$editor->addEditor(createDefinedMeaningReferenceViewer($classAttribute));
	$editor->addEditor(createDefinedMeaningReferenceViewer($levelAttribute));
	$editor->addEditor(createDefinedMeaningReferenceViewer($attributeAttribute));
	$editor->addEditor(createShortTextViewer($typeAttribute));
	$editor->addEditor(createShortTextViewer($operationAttribute));
	$editor->addEditor(createBooleanViewer($isLatestAttribute));
	
	return $editor;
}

function simpleRecord($structure, $values) {
	$attributes = $structure->attributes;
	$result = new ArrayRecord($structure);
	
	for ($i = 0; $i < count($attributes); $i++) 
		$result->setAttributeValue($attributes[$i], $values[$i]);	
	
	return $result;
}

function rollBackTransactions($recordSet) {
	global
		$wgRequest, $wgUser,
		$transactionIdAttribute, $updatesInTransactionAttribute, 
		$updatedDefinitionAttribute, $updatedRelationsAttribute, $updatedClassMembershipAttribute,
		$updatedTranslatedTextAttribute, $updatedClassAttributesAttribute, $updatedTranslatedTextPropertyAttribute,
		$updatedURLAttribute, $updatedTextAttribute, $updatedSyntransesAttribute,
		$updatedAlternativeDefinitionTextAttribute, $updatedAlternativeDefinitionsAttribute,
		$updatedCollectionMembershipAttribute;
		
	$summary = $wgRequest->getText('summary');
	startNewTransaction($wgUser->getID(), wfGetIP(), $summary);
		
	$idStack = new IdStack('transaction');
	$transactionKeyStructure = $recordSet->getKey();
	
	for ($i = 0; $i < $recordSet->getRecordCount(); $i++) {
		$transactionRecord = $recordSet->getRecord($i);

		$transactionId = $transactionRecord->getAttributeValue($transactionIdAttribute);
		$idStack->pushKey(simpleRecord($transactionKeyStructure, array($transactionId)));

		$updatesInTransaction = $transactionRecord->getAttributeValue($updatesInTransactionAttribute);
		$idStack->pushAttribute($updatesInTransactionAttribute);

		$updatedDefinitions = $updatesInTransaction->getAttributeValue($updatedDefinitionAttribute);
		$idStack->pushAttribute($updatedDefinitionAttribute);
		rollBackDefinitions($idStack, $updatedDefinitions);
		$idStack->popAttribute();

		$updatedRelations = $updatesInTransaction->getAttributeValue($updatedRelationsAttribute);
		$idStack->pushAttribute($updatedRelationsAttribute);
		rollBackRelations($idStack, $updatedRelations);
		$idStack->popAttribute();
		
		$updatedClassMemberships = $updatesInTransaction->getAttributeValue($updatedClassMembershipAttribute);
		$idStack->pushAttribute($updatedClassMembershipAttribute);
		rollBackClassMemberships($idStack, $updatedClassMemberships);
		$idStack->popAttribute();
		
		$updatedClassAttributes = $updatesInTransaction->getAttributeValue($updatedClassAttributesAttribute);
		$idStack->pushAttribute($updatedClassAttributesAttribute);
		rollBackClassAttributes($idStack, $updatedClassAttributes);
		$idStack->popAttribute();
		
		$updatedTranslatedTexts = $updatesInTransaction->getAttributeValue($updatedTranslatedTextAttribute);
		$idStack->pushAttribute($updatedTranslatedTextAttribute);
		rollBackTranslatedTexts($idStack, $updatedTranslatedTexts);
		$idStack->popAttribute();

		$updatedTranslatedTextProperties = $updatesInTransaction->getAttributeValue($updatedTranslatedTextPropertyAttribute);
		$idStack->pushAttribute($updatedTranslatedTextPropertyAttribute);
		rollBackTranslatedTextProperties($idStack, $updatedTranslatedTextProperties);
		$idStack->popAttribute();

		$updatedURLAttributes = $updatesInTransaction->getAttributeValue($updatedURLAttribute);
		$idStack->pushAttribute($updatedURLAttribute);
		rollBackURLAttributes($idStack, $updatedURLAttributes);
		$idStack->popAttribute();

		$updatedTextAttributes = $updatesInTransaction->getAttributeValue($updatedTextAttribute);
		$idStack->pushAttribute($updatedTextAttribute);
		rollBackTextAttributes($idStack, $updatedTextAttributes);
		$idStack->popAttribute();

		$updatedSyntranses = $updatesInTransaction->getAttributeValue($updatedSyntransesAttribute);
		$idStack->pushAttribute($updatedSyntransesAttribute);
		rollBackSyntranses($idStack, $updatedSyntranses);
		$idStack->popAttribute();

		$updatedAlternativeDefinitionTexts = $updatesInTransaction->getAttributeValue($updatedAlternativeDefinitionTextAttribute);
		$idStack->pushAttribute($updatedAlternativeDefinitionTextAttribute);
		rollBackAlternativeDefinitionTexts($idStack, $updatedAlternativeDefinitionTexts);
		$idStack->popAttribute();

		$updatedAlternativeDefinitions = $updatesInTransaction->getAttributeValue($updatedAlternativeDefinitionsAttribute);
		$idStack->pushAttribute($updatedAlternativeDefinitionsAttribute);
		rollBackAlternativeDefinitions($idStack, $updatedAlternativeDefinitions);
		$idStack->popAttribute();

		$updatedCollectionMemberships = $updatesInTransaction->getAttributeValue($updatedCollectionMembershipAttribute);
		$idStack->pushAttribute($updatedCollectionMembershipAttribute);
		rollBackCollectionMemberships($idStack, $updatedCollectionMemberships);
		$idStack->popAttribute();

		$idStack->popAttribute();
		$idStack->popKey();
	}
}

function getRollBackAction($idStack, $rollBackAttribute) {
	$idStack->pushAttribute($rollBackAttribute);				
	$result = $_POST[$idStack->getId()];
	$idStack->popAttribute();		
	
	return $result;
}

function getMeaningId($record, $referenceAttribute) {
	global
		$definedMeaningIdAttribute;
	
	return $record->getAttributeValue($referenceAttribute)->getAttributeValue($definedMeaningIdAttribute);
}

function rollBackDefinitions($idStack, $definitions) {
	global
		$definedMeaningIdAttribute,	$languageAttribute, $translatedContentIdAttribute, 
		$isLatestAttribute, $operationAttribute, $rollBackTranslatedContentAttribute;
	
	$definitionsKeyStructure = $definitions->getKey();
	
	for ($i = 0; $i < $definitions->getRecordCount(); $i++) {
		$definitionRecord = $definitions->getRecord($i);

		$definedMeaningId = $definitionRecord->getAttributeValue($definedMeaningIdAttribute);
		$languageId = $definitionRecord->getAttributeValue($languageAttribute);
		$isLatest = $definitionRecord->getAttributeValue($isLatestAttribute);

		if ($isLatest) {
			$idStack->pushKey(simpleRecord($definitionsKeyStructure, array($definedMeaningId, $languageId)));

			rollBackTranslatedContent(
				$idStack, 
				getRollBackAction($idStack, $rollBackTranslatedContentAttribute), 
				$definitionRecord->getAttributeValue($translatedContentIdAttribute),
				$languageId,
				$definitionRecord->getAttributeValue($operationAttribute)
			);

			$idStack->popKey();
		}
	}	
}

function rollBackTranslatedTexts($idStack, $translatedTexts) {
	global
		$valueIdAttribute, $languageAttribute, $translatedContentIdAttribute, 
		$isLatestAttribute, $operationAttribute, $rollBackTranslatedContentAttribute;
	
	$translatedTextsKeyStructure = $translatedTexts->getKey();
	
	for ($i = 0; $i < $translatedTexts->getRecordCount(); $i++) {
		$translatedTextRecord = $translatedTexts->getRecord($i);

		$valueId = $translatedTextRecord->getAttributeValue($valueIdAttribute);
		$languageId = $translatedTextRecord->getAttributeValue($languageAttribute);
		$isLatest = $translatedTextRecord->getAttributeValue($isLatestAttribute);

		if ($isLatest) {
			$idStack->pushKey(simpleRecord($translatedTextsKeyStructure, array($valueId, $languageId)));

			rollBackTranslatedContent(
				$idStack, 
				getRollBackAction($idStack, $rollBackTranslatedContentAttribute), 
				$translatedTextRecord->getAttributeValue($translatedContentIdAttribute),
				$languageId,
				$translatedTextRecord->getAttributeValue($operationAttribute)
			);

			$idStack->popKey();
		}
	}	
}

function rollBackTranslatedContent($idStack, $rollBackAction, $translatedContentId, $languageId, $operation) {
	global	
		$rollBackTranslatedContentAttribute, $translatedContentHistoryAttribute;
	
	if ($rollBackAction == 'previous-version') {
		$idStack->pushAttribute($rollBackTranslatedContentAttribute);
		$idStack->pushAttribute($translatedContentHistoryAttribute);

		$version = (int) $_POST[$idStack->getId()];
		
		if ($version > 0)
			rollBackTranslatedContentToVersion($translatedContentId, $languageId, $version);		
		
		$idStack->popAttribute();
		$idStack->popAttribute();
	}
	else if ($rollBackAction == 'remove') 
		removeTranslatedText($translatedContentId, $languageId);
}

function getTranslatedContentFromHistory($translatedContentId, $languageId, $addTransactionId) {
	$dbr = &wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query(
		"SELECT old_text " .
		" FROM translated_content, text " .
		" WHERE translated_content.translated_content_id=$translatedContentId " .
		" AND translated_content.text_id=text.old_id " .
		" AND translated_content.add_transaction_id=$addTransactionId");
		
	$row = $dbr->fetchObject($queryResult);
	
	return $row->old_text;
}

function rollBackTranslatedContentToVersion($translatedContentId, $languageId, $addTransactionId) {
	removeTranslatedText($translatedContentId, $languageId);
	addTranslatedText(
		$translatedContentId, 
		$languageId, 
		getTranslatedContentFromHistory($translatedContentId, $languageId, $addTransactionId)
	);
}

function rollBackRelations($idStack, $relations) {
	global
		$relationIdAttribute, $isLatestAttribute, $firstMeaningAttribute, $secondMeaningAttribute, $relationTypeAttribute,
		$operationAttribute, $rollBackAttribute;
	
	$relationsKeyStructure = $relations->getKey();
	
	for ($i = 0; $i < $relations->getRecordCount(); $i++) {
		$relationRecord = $relations->getRecord($i);

		$relationId = $relationRecord->getAttributeValue($relationIdAttribute);
		$isLatest = $relationRecord->getAttributeValue($isLatestAttribute);

		if ($isLatest) {
			$idStack->pushKey(simpleRecord($relationsKeyStructure, array($relationId)));
			
			rollBackRelation(
				getRollBackAction($idStack, $rollBackAttribute),
				$relationId,
				getMeaningId($relationRecord, $firstMeaningAttribute),
				getMeaningId($relationRecord, $relationTypeAttribute),
				getMeaningId($relationRecord, $secondMeaningAttribute),
				$relationRecord->getAttributeValue($operationAttribute)
			);
				
			$idStack->popKey();
		}
	}	
}

function shouldRemove($rollBackAction, $operation) {
	return $operation == 'Added' && $rollBackAction == 'remove';
}

function shouldRestore($rollBackAction, $operation) {
	return $operation == 'Removed' && $rollBackAction == 'previous-version';
}

function rollBackRelation($rollBackAction, $relationId, $firstMeaningId, $relationTypeId, $secondMeaningId, $operation) {
	if (shouldRemove($rollBackAction, $operation))
		removeRelationWithId($relationId);
	else if (shouldRestore($rollBackAction, $operation))	
		addRelation($firstMeaningId, $relationTypeId, $secondMeaningId);	
}

function rollBackClassMemberships($idStack, $classMemberships) {
	global
		$classMembershipIdAttribute, $isLatestAttribute, $classAttribute, $classMemberAttribute,
		$operationAttribute, $rollBackAttribute;
	
	$classMembershipsKeyStructure = $classMemberships->getKey();
	
	for ($i = 0; $i < $classMemberships->getRecordCount(); $i++) {
		$classMembershipRecord = $classMemberships->getRecord($i);

		$classMembershipId = $classMembershipRecord->getAttributeValue($classMembershipIdAttribute);
		$isLatest = $classMembershipRecord->getAttributeValue($isLatestAttribute);

		if ($isLatest) {
			$idStack->pushKey(simpleRecord($classMembershipsKeyStructure, array($classMembershipId)));
			
			rollBackClassMembership(
				getRollBackAction($idStack, $rollBackAttribute),
				$classMembershipId,
				getMeaningId($classMembershipRecord, $classAttribute),
				getMeaningId($classMembershipRecord, $classMemberAttribute),
				$classMembershipRecord->getAttributeValue($operationAttribute)
			);
				
			$idStack->popKey();
		}
	}	
}

function rollBackClassMembership($rollBackAction, $classMembershipId, $classId, $classMemberId, $operation) {
	if (shouldRemove($rollBackAction, $operation))
		removeClassMembershipWithId($classMembershipId);
	else if (shouldRestore($rollBackAction, $operation))	
		addClassMembership($classMemberId, $classId);	
}

function rollBackClassAttributes($idStack, $classAttributes) {
	global
		$isLatestAttribute, $classAttribute, $levelAttribute, $attributeAttribute, $typeAttribute,
		$operationAttribute, $classAttributeIdAttribute, $rollBackAttribute;
	
	$classAttributesKeyStructure = $classAttributes->getKey();
	
	for ($i = 0; $i < $classAttributes->getRecordCount(); $i++) {
		$classAttributeRecord = $classAttributes->getRecord($i);

		$classAttributeId = $classAttributeRecord->getAttributeValue($classAttributeIdAttribute);
		$isLatest = $classAttributeRecord->getAttributeValue($isLatestAttribute);

		if ($isLatest) {
			$idStack->pushKey(simpleRecord($classAttributesKeyStructure, array($classAttributeId)));
			
			rollBackClassAttribute(
				getRollBackAction($idStack, $rollBackAttribute),
				$classAttributeId,
				getMeaningId($classAttributeRecord, $classAttribute),
				getMeaningId($classAttributeRecord, $levelAttribute),
				getMeaningId($classAttributeRecord, $attributeAttribute),
				$classAttributeRecord->getAttributeValue($typeAttribute),
				$classAttributeRecord->getAttributeValue($operationAttribute)
			);
				
			$idStack->popKey();
		}
	}	
}

function rollBackClassAttribute($rollBackAction, $classAttributeId, $classId, $levelId, $attributeId, $type, $operation) {
	if (shouldRemove($rollBackAction, $operation))
		removeClassAttributeWithId($classAttributeId);
	else if (shouldRestore($rollBackAction, $operation))	
		addClassAttribute($classId, $levelId, $attributeId, $type);	
}

function rollBackTranslatedTextProperties($idStack, $translatedTextProperties) {
	global
		$isLatestAttribute, $operationAttribute, $rollBackAttribute,
		$valueIdAttribute, $objectIdAttribute, $attributeAttribute, $translatedContentIdAttribute;
	
	$translatedTextPropertiesKeyStructure = $translatedTextProperties->getKey();
	
	for ($i = 0; $i < $translatedTextProperties->getRecordCount(); $i++) {
		$translatedTextPropertyRecord = $translatedTextProperties->getRecord($i);

		$valueId = $translatedTextPropertyRecord->getAttributeValue($valueIdAttribute);
		$isLatest = $translatedTextPropertyRecord->getAttributeValue($isLatestAttribute);

		if ($isLatest) {
			$idStack->pushKey(simpleRecord($translatedTextPropertiesKeyStructure, array($valueId)));
			
			rollBackTranslatedTextProperty(
				getRollBackAction($idStack, $rollBackAttribute),
				$valueId,
				$translatedTextPropertyRecord->getAttributeValue($objectIdAttribute),
				getMeaningId($translatedTextPropertyRecord, $attributeAttribute),
				$translatedTextPropertyRecord->getAttributeValue($translatedContentIdAttribute),
				$translatedTextPropertyRecord->getAttributeValue($operationAttribute)
			);
				
			$idStack->popKey();
		}
	}	
}

function rollBackTranslatedTextProperty($rollBackAction, $valueId, $objectId, $attributeId, $translatedContentId, $operation) {
	if (shouldRemove($rollBackAction, $operation))
		removeTranslatedTextAttributeValue($valueId);
	else if (shouldRestore($rollBackAction, $operation))	
		createTranslatedTextAttributeValue($valueId, $objectId, $attributeId, $translatedContentId);	
}

function rollBackURLAttributes($idStack, $urlAttributes) {
	global
		$isLatestAttribute, $operationAttribute, $rollBackAttribute, $URLAttribute,
		$valueIdAttribute, $objectIdAttribute, $attributeAttribute, $translatedContentIdAttribute;
	
	$urlAttributesKeyStructure = $urlAttributes->getKey();
	
	for ($i = 0; $i < $urlAttributes->getRecordCount(); $i++) {
		$urlAttributeRecord = $urlAttributes->getRecord($i);

		$valueId = $urlAttributeRecord->getAttributeValue($valueIdAttribute);
		$isLatest = $urlAttributeRecord->getAttributeValue($isLatestAttribute);

		if ($isLatest) {
			$idStack->pushKey(simpleRecord($urlAttributesKeyStructure, array($valueId)));
			
			rollBackURLAttribute(
				getRollBackAction($idStack, $rollBackAttribute),
				$valueId,
				$urlAttributeRecord->getAttributeValue($objectIdAttribute),
				getMeaningId($urlAttributeRecord, $attributeAttribute),
				$urlAttributeRecord->getAttributeValue($URLAttribute),
				$urlAttributeRecord->getAttributeValue($operationAttribute)
			);
				
			$idStack->popKey();
		}
	}	
}

function rollBackURLAttribute($rollBackAction, $valueId, $objectId, $attributeId, $url, $operation) {
	if (shouldRemove($rollBackAction, $operation))
		removeURLAttributeValue($valueId);
	else if (shouldRestore($rollBackAction, $operation))	
		createURLAttributeValue($valueId, $objectId, $attributeId, $url);	
}

function rollBackTextAttributes($idStack, $textAttributes) {
	global
		$isLatestAttribute, $operationAttribute, $rollBackAttribute, $textAttribute,
		$valueIdAttribute, $objectIdAttribute, $attributeAttribute, $translatedContentIdAttribute;
	
	$textAttributesKeyStructure = $textAttributes->getKey();
	
	for ($i = 0; $i < $textAttributes->getRecordCount(); $i++) {
		$textAttributeRecord = $textAttributes->getRecord($i);

		$valueId = $textAttributeRecord->getAttributeValue($valueIdAttribute);
		$isLatest = $textAttributeRecord->getAttributeValue($isLatestAttribute);

		if ($isLatest) {
			$idStack->pushKey(simpleRecord($textAttributesKeyStructure, array($valueId)));
			
			rollBackTextAttribute(
				getRollBackAction($idStack, $rollBackAttribute),
				$valueId,
				$textAttributeRecord->getAttributeValue($objectIdAttribute),
				getMeaningId($textAttributeRecord, $attributeAttribute),
				$textAttributeRecord->getAttributeValue($textAttribute),
				$textAttributeRecord->getAttributeValue($operationAttribute)
			);
				
			$idStack->popKey();
		}
	}	
}

function rollBackTextAttribute($rollBackAction, $valueId, $objectId, $attributeId, $text, $operation) {
	if (shouldRemove($rollBackAction, $operation))
		removeTextAttributeValue($valueId);
	else if (shouldRestore($rollBackAction, $operation))	
		createTextAttributeValue($valueId, $objectId, $attributeId, $text);	
}

function rollBackSyntranses($idStack, $syntranses) {
	global
		$isLatestAttribute, $operationAttribute, $rollBackAttribute, $syntransIdAttribute, $identicalMeaningAttribute,
		$spellingAttribute, $languageAttribute, $expressionAttribute, $definedMeaningIdAttribute, $expressionIdAttribute;
	
	$syntransesKeyStructure = $syntranses->getKey();
	
	for ($i = 0; $i < $syntranses->getRecordCount(); $i++) {
		$syntransRecord = $syntranses->getRecord($i);

		$syntransId = $syntransRecord->getAttributeValue($syntransIdAttribute);
		$isLatest = $syntransRecord->getAttributeValue($isLatestAttribute);

		if ($isLatest) {
			$idStack->pushKey(simpleRecord($syntransesKeyStructure, array($syntransId)));
			
			rollBackSyntrans(
				getRollBackAction($idStack, $rollBackAttribute),
				$syntransId,
				$syntransRecord->getAttributeValue($definedMeaningIdAttribute),
				$syntransRecord->getAttributeValue($expressionIdAttribute),
				$syntransRecord->getAttributeValue($identicalMeaningAttribute),
				$syntransRecord->getAttributeValue($operationAttribute)
			);
				
			$idStack->popKey();
		}
	}	
}

function rollBackSyntrans($rollBackAction, $syntransId, $definedMeaningId, $expressionId, $identicalMeaning, $operation) {
	if (shouldRemove($rollBackAction, $operation))
		removeSynonymOrTranslationWithId($syntransId);
	else if (shouldRestore($rollBackAction, $operation))	
		createSynonymOrTranslation($definedMeaningId, $expressionId, $identicalMeaning);	
}

function rollBackAlternativeDefinitionTexts($idStack, $alternativeDefinitionTexts) {
	global
		$definedMeaningIdAttribute, $languageAttribute, $translatedContentIdAttribute, 
		$isLatestAttribute, $operationAttribute, $rollBackTranslatedContentAttribute;
	
	$alternativeDefinitionTextsKeyStructure = $alternativeDefinitionTexts->getKey();
	
	for ($i = 0; $i < $alternativeDefinitionTexts->getRecordCount(); $i++) {
		$alternativeDefinitionTextRecord = $alternativeDefinitionTexts->getRecord($i);

		$translatedContentId = $alternativeDefinitionTextRecord->getAttributeValue($translatedContentIdAttribute);
		$languageId = $alternativeDefinitionTextRecord->getAttributeValue($languageAttribute);
		$isLatest = $alternativeDefinitionTextRecord->getAttributeValue($isLatestAttribute);

		if ($isLatest) {
			$idStack->pushKey(simpleRecord($alternativeDefinitionTextsKeyStructure, array($translatedContentId, $languageId)));

			rollBackTranslatedContent(
				$idStack, 
				getRollBackAction($idStack, $rollBackTranslatedContentAttribute), 
				$translatedContentId,
				$languageId,
				$alternativeDefinitionTextRecord->getAttributeValue($operationAttribute)
			);

			$idStack->popKey();
		}
	}	
}

function rollBackAlternativeDefinitions($idStack, $alternativeDefinitions) {
	global
		$isLatestAttribute, $operationAttribute, $rollBackAttribute,
		$definedMeaningIdAttribute, $translatedContentIdAttribute, $sourceAttribute;
	
	$alternativeDefinitionsKeyStructure = $alternativeDefinitions->getKey();
	
	for ($i = 0; $i < $alternativeDefinitions->getRecordCount(); $i++) {
		$alternativeDefinitionRecord = $alternativeDefinitions->getRecord($i);

		$definedMeaningId = $alternativeDefinitionRecord->getAttributeValue($definedMeaningIdAttribute);
		$translatedContentId = $alternativeDefinitionRecord->getAttributeValue($translatedContentIdAttribute);
		$isLatest = $alternativeDefinitionRecord->getAttributeValue($isLatestAttribute);

		if ($isLatest) {
			$idStack->pushKey(simpleRecord($alternativeDefinitionsKeyStructure, array($definedMeaningId, $translatedContentId)));
			
			rollBackAlternativeDefinition(
				getRollBackAction($idStack, $rollBackAttribute),
				$definedMeaningId,
				$translatedContentId, 
				getMeaningId($alternativeDefinitionRecord, $sourceAttribute),
				$alternativeDefinitionRecord->getAttributeValue($operationAttribute)
			);
				
			$idStack->popKey();
		}
	}	
}

function rollBackAlternativeDefinition($rollBackAction, $definedMeaningId, $translatedContentId, $sourceId, $operation) {
	if (shouldRemove($rollBackAction, $operation))
		removeDefinedMeaningAlternativeDefinition($definedMeaningId, $translatedContentId);
	else if (shouldRestore($rollBackAction, $operation))	
		createDefinedMeaningAlternativeDefinition($definedMeaningId, $translatedContentId, $sourceId);	
}

function rollBackCollectionMemberships($idStack, $collectionMemberships) {
	global
		$classMembershipIdAttribute, $isLatestAttribute, $collectionIdAttribute, 
		$collectionMemberIdAttribute, $sourceIdentifierAttribute, 
		$operationAttribute, $rollBackAttribute;
	
	$collectionMembershipsKeyStructure = $collectionMemberships->getKey();
	
	for ($i = 0; $i < $collectionMemberships->getRecordCount(); $i++) {
		$collectionMembershipRecord = $collectionMemberships->getRecord($i);

		$collectionId = $collectionMembershipRecord->getAttributeValue($collectionIdAttribute);
		$collectionMemberId = $collectionMembershipRecord->getAttributeValue($collectionMemberIdAttribute);
		$isLatest = $collectionMembershipRecord->getAttributeValue($isLatestAttribute);

		if ($isLatest) {
			$idStack->pushKey(simpleRecord($collectionMembershipsKeyStructure, array($collectionId, $collectionMemberId)));
			
			rollBackCollectionMembership(
				getRollBackAction($idStack, $rollBackAttribute),
				$collectionId,
				$collectionMemberId, 
				$collectionMembershipRecord->getAttributeValue($sourceIdentifierAttribute),
				$collectionMembershipRecord->getAttributeValue($operationAttribute)
			);
				
			$idStack->popKey();
		}
	}	
}

function rollBackCollectionMembership($rollBackAction, $collectionId, $collectionMemberId, $sourceIdentifier, $operation) {
	if (shouldRemove($rollBackAction, $operation))
		removeDefinedMeaningFromCollection($collectionMemberId, $collectionId);
	else if (shouldRestore($rollBackAction, $operation))	
		addDefinedMeaningToCollection($collectionMemberId, $collectionId, $sourceIdentifier);	
}

?>
