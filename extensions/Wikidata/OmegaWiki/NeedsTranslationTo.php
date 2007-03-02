<?php

require_once("Wikidata.php");
require_once("languages.php");
require_once("Transaction.php");
require_once("OmegaWikiAttributes.php");
require_once("RecordSet.php");
require_once("Editor.php");
require_once("WikiDataAPI.php");

class NeedsTranslationTo extends DefaultWikidataApplication {
	public function view() {
		global
			$wgOut, $wgTitle, $wgRequest;
		
		parent::view();
		
		$destinationLanguageName = $wgTitle->getText();
		$sourceLanguageName = $wgRequest->getText('source-language');
		
		$sourceLanguageId = getLanguageIdForName($sourceLanguageName);
		$destinationLanguageId = getLanguageIdForName($destinationLanguageName);
		
		if ($sourceLanguageId > 0 && $destinationLanguageId > 0) {
			$wgOut->addHTML("<h1>Expressions needing translation from <i>$sourceLanguageName</i> to <i>$destinationLanguageName</i></h1>");
			$wgOut->addHTML('<p>Showing only a maximum of 100 expressions.</p>');
			$this->showExpressionsNeedingTranslation($sourceLanguageId, $destinationLanguageId);
		}
		else {
			$wgOut->addHTML("<h1>Error in input</h1>");
			
			if ($sourceLanguageId == 0) {
				if ($sourceLanguageName == '')
					$wgOut->addHTML("<p>Please specify source language.</p>");
				else	
					$wgOut->addHTML("<p>Unknown source language: $sourceLanguageName</p>");
			}

			if ($destinationLanguageId == 0) {
				if ($destinationLanguageName == '')
					$wgOut->addHTML("<p>Please specify destination language.</p>");
				else	
					$wgOut->addHTML("<p>Unknown destination language: $destinationLanguageName</p>");
			}
		}
	}
	
	protected function showExpressionsNeedingTranslation($sourceLanguageId, $destinationLanguageId) {
		global
			$definedMeaningIdAttribute, $expressionIdAttribute, $expressionAttribute, $expressionStructure, $spellingAttribute, $languageAttribute;
		
		$dbr = &wfGetDB(DB_SLAVE);
		$queryResult = $dbr->query("SELECT source_expression.expression_id AS source_expression_id, source_expression.language_id AS source_language_id, source_expression.spelling AS source_spelling, source_syntrans.defined_meaning_id AS source_defined_meaning_id" .
					" FROM uw_syntrans source_syntrans, uw_expression_ns source_expression" .
					" WHERE source_syntrans.expression_id=source_expression.expression_id AND source_expression.language_id=$sourceLanguageId" .
					" AND ". getLatestTransactionRestriction('source_syntrans').
					" AND ". getLatestTransactionRestriction('source_expression').
					" AND NOT EXISTS (" .
					"   SELECT * FROM uw_syntrans destination_syntrans, uw_expression_ns destination_expression" .
					"   WHERE  destination_syntrans.expression_id=destination_expression.expression_id AND destination_expression.language_id=$destinationLanguageId" .
					" AND source_syntrans.defined_meaning_id=destination_syntrans.defined_meaning_id".
					" AND ". getLatestTransactionRestriction('destination_syntrans').
					" AND ". getLatestTransactionRestriction('destination_expression').
					" )" .
					" LIMIT 100");
					
		$definitionAttribute = new Attribute("definition", "Definition", "definition");
		$recordSet = new ArrayRecordSet(new Structure($definedMeaningIdAttribute, $expressionIdAttribute, $expressionAttribute, $definitionAttribute), new Structure($definedMeaningIdAttribute, $expressionIdAttribute));
		
		while ($row = $dbr->fetchObject($queryResult)) {
			$expressionRecord = new ArrayRecord($expressionStructure);
			$expressionRecord->setAttributeValue($languageAttribute, $row->source_language_id);
			$expressionRecord->setAttributeValue($spellingAttribute, $row->source_spelling);

			$recordSet->addRecord(array($row->source_defined_meaning_id, $row->source_expression_id, $expressionRecord, getDefinedMeaningDefinition($row->source_defined_meaning_id)));
		}
		
		$expressionEditor = new RecordTableCellEditor($expressionAttribute);
		$expressionEditor->addEditor(new LanguageEditor($languageAttribute, new SimplePermissionController(false), false));
		$expressionEditor->addEditor(new SpellingEditor($spellingAttribute, new SimplePermissionController(false), false));
	
		$editor = new RecordSetTableEditor(null, new SimplePermissionController(false), new AllowAddController(false), false, false, null);
		$editor->addEditor($expressionEditor);
		$editor->addEditor(new TextEditor($definitionAttribute, new SimplePermissionController(false), false, true, 75));
		
		global
			$wgOut;
			
		$wgOut->addHTML($editor->view(new IdStack("expression"), $recordSet));
	}
}

?>
