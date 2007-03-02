<?php

if (!defined('MEDIAWIKI')) die();

require_once( 'SpecialDatasearch.i18n.php' );

$wgExtensionFunctions[] = 'wfSpecialDatasearch';

function wfSpecialDatasearch() {
	# Add messages
	global $wgMessageCache, $wgDataSearchMessages, $IP;
	foreach( $wgDataSearchMessages as $key => $value ) {
		$wgMessageCache->addMessages( $wgDataSearchMessages[$key], $key );
	}

	class SpecialDatasearch extends SpecialPage {
		protected $externalIdentifierAttribute;
		protected $collectionAttribute;
		protected $collectionMemberAttribute;
		protected $spellingAttribute;
		protected $languageAttribute;
		
		protected $expressionStructure;
		protected $expressionAttribute;
		
		protected $definedMeaningAttribute;
		protected $definitionAttribute;
		
		protected $meaningStructure;
		protected $meaningAttribute;
		
		function SpecialDatasearch() {
			SpecialPage::SpecialPage('Datasearch');

			require_once("WikiDataGlobals.php");
			require_once("forms.php");
			require_once("type.php");
			require_once("WikiDataAPI.php");
			require_once("OmegaWikiAttributes.php");
			require_once("OmegaWikiRecordSets.php");
			require_once("OmegaWikiEditors.php");

			initializeOmegaWikiAttributes(false, false);

			global
				$definedMeaningReferenceType;
			
			$this->spellingAttribute = new Attribute("found-word", "Found word", "short-text");
			$this->languageAttribute = new Attribute("language", "Language", "language");
			
			$this->expressionStructure = new Structure($this->spellingAttribute, $this->languageAttribute);
			$this->expressionAttribute = new Attribute("expression", "Expression", new RecordType($this->expressionStructure));
			
			$this->definedMeaningAttribute = new Attribute("defined-meaning", "Defined meaning", $definedMeaningReferenceType);
			$this->definitionAttribute = new Attribute("definition", "Definition", "definition");
			
			$this->meaningStructure = new Structure($this->definedMeaningAttribute, $this->definitionAttribute);
			$this->meaningAttribute = new Attribute("meaning", "Meaning", new RecordSetType($this->meaningStructure));

			$this->externalIdentifierAttribute = new Attribute("external-identifier", "External identifier", "short-text");
			$this->collectionAttribute = new Attribute("collection", "Collection", $definedMeaningReferenceType);
			$this->collectionMemberAttribute = new Attribute("collection-member", "Collection member", $definedMeaningReferenceType);
		}
		
		function execute($parameter) {
			global
				$wgOut, $wgTitle;

			$searchText = ltrim($_GET['search-text']);
			
			if (isset($_GET['go'])) 
				$this->go($searchText);	
			else 			
				$this->search($searchText); 
		}

		function go($searchText) {
			global
				$wgScript, $wgOut;

			$expressionMeaningIds = getExpressionMeaningIds($searchText);
			
			if (count($expressionMeaningIds) > 0) {
				if (count($expressionMeaningIds) == 1)
					$wgOut->redirect(definedMeaningIdAsURL($expressionMeaningIds[0]));
				else
					$wgOut->redirect(spellingAsURL($searchText));
			}
			else {
				$collectionMemberId = getAnyDefinedMeaningWithSourceIdentifier($searchText);
				
				if ($collectionMemberId != 0)
					$wgOut->redirect(definedMeaningIdAsURL($collectionMemberId));		
				else
					$wgOut->redirect(spellingAsURL($searchText));
			}
		}
				
		function search($searchText) {
			global
				$wgOut, $wgRequest, $wgFilterLanguageId, 
				$wgSearchWithinWordsDefaultValue, $wgSearchWithinExternalIdentifiersDefaultValue,
				$wgShowSearchWithinExternalIdentifiersOption, $wgShowSearchWithinWordsOption;
			
			$collectionId = $wgRequest->getInt("collection");
			$languageId = $wgRequest->getInt("language");
			$withinWords = $wgRequest->getBool("within-words");
			$withinExternalIdentifiers = $wgRequest->getBool("within-external-identifiers");
			
			if (!$withinWords && !$withinExternalIdentifiers) {
				$withinWords = $wgSearchWithinWordsDefaultValue;
				$withinExternalIdentifiers = $wgSearchWithinExternalIdentifiersDefaultValue;
			}
			
			$languageName = languageIdAsText($languageId); 
			$options = array();
			$options['Search text'] = getTextBox('search-text', $searchText); 

			if ($wgFilterLanguageId == 0)
				$options['Language'] = getSuggest('language', "language", array(), $languageId, $languageName);
			else
				$languageId = $wgFilterLanguageId;
				 
			$options['Collection'] = getSuggest('collection', 'collection', array(), $collectionId, collectionIdAsText($collectionId));
			
			if ($wgShowSearchWithinWordsOption)
				$options['Within words'] = getCheckBox('within-words', $withinWords);
			else
				$withinWords = $wgSearchWithinWordsDefaultValue;
				
			if ($wgShowSearchWithinExternalIdentifiersOption)	
				$options['Within external identifiers'] = getCheckBox('within-external-identifiers', $withinExternalIdentifiers);
			else
				$withinExternalIdentifiers = $wgSearchWithinExternalIdentifiersDefaultValue; 
			  
			$wgOut->addHTML(getOptionPanel($options));
						
			if ($withinWords) {
				if ($languageId != 0 && $languageName != "")
					$languageText = " in <i>" . $languageName . "</i> ";
				else
					$languageText = " ";
					
				$wgOut->addHTML('<h1>Words' . $languageText . 'matching <i>'. $searchText . '</i> and associated meanings</h1>');
				$wgOut->addHTML('<p>Showing only a maximum of 100 matches.</p>');
			
				$wgOut->addHTML($this->searchWords($searchText, $collectionId, $languageId));
			}
			
			if ($withinExternalIdentifiers) {
				$wgOut->addHTML('<h1>External identifiers matching <i>'. $searchText . '</i></h1>');
				$wgOut->addHTML('<p>Showing only a maximum of 100 matches.</p>');

				$wgOut->addHTML($this->searchExternalIdentifiers($searchText, $collectionId));
			}
		}
		
		function getSpellingRestriction($spelling, $tableColumn) {
			$dbr = &wfGetDB(DB_SLAVE);
			
			if (trim($spelling) != '')
				return " AND " . $tableColumn . " LIKE " . $dbr->addQuotes("%$spelling%");
			else
				return "";
		}
		
		function getSpellingOrderBy($spelling) {
			if (trim($spelling) != '')
				return "position ASC, ";
			else
				return "";
		}
		
		function getPositionSelectColumn($spelling, $tableColumn) {
			$dbr = &wfGetDB(DB_SLAVE);
			
			if (trim($spelling) != '')
				return "INSTR(LCASE(" . $tableColumn . "), LCASE(". $dbr->addQuotes("$spelling") .")) as position, ";
			else
				return "";
		}
		
		function searchWords($text, $collectionId, $languageId) {
			$dbr = &wfGetDB(DB_SLAVE);
			
			$sql = 
				"SELECT ". $this->getPositionSelectColumn($text, "uw_expression_ns.spelling") ." uw_syntrans.defined_meaning_id AS defined_meaning_id, uw_expression_ns.spelling AS spelling, uw_expression_ns.language_id AS language_id ".
				"FROM uw_expression_ns, uw_syntrans ";
					
			if ($collectionId > 0)
				$sql .= ", uw_collection_contents ";
				
			$sql .=
		    	"WHERE uw_expression_ns.expression_id=uw_syntrans.expression_id AND uw_syntrans.identical_meaning=1 " .
				" AND " . getLatestTransactionRestriction('uw_syntrans').
				" AND " . getLatestTransactionRestriction('uw_expression_ns').
				$this->getSpellingRestriction($text, 'spelling');
				
			if ($collectionId > 0)
				$sql .= 
					" AND uw_collection_contents.member_mid=uw_syntrans.defined_meaning_id " .
					" AND uw_collection_contents.collection_id=" . $collectionId .
					" AND " . getLatestTransactionRestriction('uw_collection_contents');
					
			if ($languageId > 0)
				$sql .= 
					" AND uw_expression_ns.language_id=$languageId";
			
			$sql .=
				" ORDER BY " . $this->getSpellingOrderBy($text) . "uw_expression_ns.spelling ASC limit 100";
			
			$queryResult = $dbr->query($sql);
			$recordSet = $this->getWordsSearchResultAsRecordSet($queryResult);
			$editor = $this->getWordsSearchResultEditor(); 
			
			return $editor->view(new IdStack("words"), $recordSet);
		}	
		
		function getWordsSearchResultAsRecordSet($queryResult) {
			global
				$idAttribute;
		
			$dbr =& wfGetDB(DB_SLAVE);
			$recordSet = new ArrayRecordSet(new Structure($idAttribute, $this->expressionAttribute, $this->meaningAttribute), new Structure($idAttribute));
			
			while ($row = $dbr->fetchObject($queryResult)) {
				$expressionRecord = new ArrayRecord($this->expressionStructure);
				$expressionRecord->setAttributeValue($this->spellingAttribute, $row->spelling);
				$expressionRecord->setAttributeValue($this->languageAttribute, $row->language_id);
				
				$meaningRecord = new ArrayRecord($this->meaningStructure);
				$meaningRecord->setAttributeValue($this->definedMeaningAttribute, getDefinedMeaningReferenceRecord($row->defined_meaning_id));
				$meaningRecord->setAttributeValue($this->definitionAttribute, getDefinedMeaningDefinition($row->defined_meaning_id));
		
				$recordSet->addRecord(array($row->defined_meaning_id, $expressionRecord, $meaningRecord));
			}
			
			return $recordSet;			
		}
		
		function getWordsSearchResultEditor() {
			$expressionEditor = new RecordTableCellEditor($this->expressionAttribute);
			$expressionEditor->addEditor(new SpellingEditor($this->spellingAttribute, new SimplePermissionController(false), false));
			$expressionEditor->addEditor(new LanguageEditor($this->languageAttribute, new SimplePermissionController(false), false));
		
			$meaningEditor = new RecordTableCellEditor($this->meaningAttribute);
			$meaningEditor->addEditor(new DefinedMeaningReferenceEditor($this->definedMeaningAttribute, new SimplePermissionController(false), false));
			$meaningEditor->addEditor(new TextEditor($this->definitionAttribute, new SimplePermissionController(false), false, true, 75));
		
			$editor = createTableViewer(null);
			$editor->addEditor($expressionEditor);
			$editor->addEditor($meaningEditor);
			
			return $editor;
		}
		
		function searchExternalIdentifiers($text, $collectionId) {
			$dbr = &wfGetDB(DB_SLAVE);
			
			$sql = 
				"SELECT ". $this->getPositionSelectColumn($text, 'uw_collection_contents.internal_member_id') ." uw_collection_contents.member_mid AS member_mid, uw_collection_contents.internal_member_id AS external_identifier, uw_collection_ns.collection_mid AS collection_mid ".
				"FROM uw_collection_contents, uw_collection_ns ";
					
			$sql .=
		    	"WHERE uw_collection_ns.collection_id=uw_collection_contents.collection_id " .
				" AND " . getLatestTransactionRestriction('uw_collection_ns').
				" AND " . getLatestTransactionRestriction('uw_collection_contents').
				$this->getSpellingRestriction($text, 'uw_collection_contents.internal_member_id');
				
			if ($collectionId > 0)
				$sql .= 
					" AND uw_collection_ns.collection_id=$collectionId ";
			
			$sql .=
				" ORDER BY " . $this->getSpellingOrderBy($text) . "uw_collection_contents.internal_member_id ASC limit 100";
			
			$queryResult = $dbr->query($sql);
			$recordSet = $this->getExternalIdentifiersSearchResultAsRecordSet($queryResult);
			$editor = $this->getExternalIdentifiersSearchResultEditor();

			return $editor->view(new IdStack("external-identifiers"), $recordSet);
		}		
		
		function getExternalIdentifiersSearchResultAsRecordSet($queryResult) {
			$dbr =& wfGetDB(DB_SLAVE);
		
			$externalIdentifierMatchStructure = new Structure($this->externalIdentifierAttribute, $this->collectionAttribute, $this->collectionMemberAttribute);			
			$recordSet = new ArrayRecordSet($externalIdentifierMatchStructure, new Structure($this->externalIdentifierAttribute));
			
			while ($row = $dbr->fetchObject($queryResult)) { 
				$record = new ArrayRecord($this->externalIdentifierMatchStructure);
				$record->setAttributeValue($this->externalIdentifierAttribute, $row->external_identifier);
				$record->setAttributeValue($this->collectionAttribute, $row->collection_mid);
				$record->setAttributeValue($this->collectionMemberAttribute, $row->member_mid);
				
				$recordSet->add($record);
			}
			
			expandDefinedMeaningReferencesInRecordSet($recordSet, array($this->collectionAttribute, $this->collectionMemberAttribute));

			return $recordSet;
		}
		
		function getExternalIdentifiersSearchResultEditor() {
			$editor = createTableViewer(null);
			$editor->addEditor(createShortTextViewer($this->externalIdentifierAttribute));
			$editor->addEditor(createDefinedMeaningReferenceViewer($this->collectionMemberAttribute));
			$editor->addEditor(createDefinedMeaningReferenceViewer($this->collectionAttribute));
		
			return $editor;		
		}
	}
	
	SpecialPage::addPage(new SpecialDatasearch());
}

?>