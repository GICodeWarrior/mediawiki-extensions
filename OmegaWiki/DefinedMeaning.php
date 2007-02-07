<?php

require_once('Wikidata.php');
require_once('OmegaWikiRecordSets.php');
require_once('OmegaWikiEditors.php');

class DefinedMeaning extends DefaultWikidataApplication {
	public function view() {
		global
			$wgOut, $wgTitle;

		parent::view();

		$this->outputViewHeader();

		$definedMeaningId = $this->getDefinedMeaningIdFromTitle($wgTitle->getText());
		
		$wgOut->addHTML(
			getDefinedMeaningEditor(
				$this->filterLanguageId, $this->possiblySynonymousRelationTypeId, false, $this->shouldShowAuthorities)->view(
				$this->getIdStack($definedMeaningId), 
				getDefinedMeaningRecord(
					$definedMeaningId, 
					$this->filterLanguageId,
					$this->possiblySynonymousRelationTypeId, 
					$this->viewQueryTransactionInformation
				)
			)
		);
		
		$this->outputViewFooter();
	}
	
	public function edit() {
		global
			$wgOut, $wgTitle;

		parent::edit();

		$definedMeaningId = $this->getDefinedMeaningIdFromTitle($wgTitle->getText());

		$this->outputEditHeader();
		$wgOut->addHTML(
			getDefinedMeaningEditor($this->filterLanguageId, $this->possiblySynonymousRelationTypeId, false, false)->edit(
				$this->getIdStack($definedMeaningId), 
				getDefinedMeaningRecord(
					$definedMeaningId, 
					$this->filterLanguageId, 
					$this->possiblySynonymousRelationTypeId, 
					new QueryLatestTransactionInformation()
				)
			)
		);
		$this->outputEditFooter();
	}
	
	public function history() {
		global
			$wgOut, $wgTitle;

		parent::history();

		$definedMeaningId = $this->getDefinedMeaningIdFromTitle($wgTitle->getText());
		$wgOut->addHTML(
			getDefinedMeaningEditor($this->filterLanguageId, $this->possiblySynonymousRelationTypeId, $this->showRecordLifeSpan, false)->view(
				new IdStack("defined-meaning"), 
				getDefinedMeaningRecord(
					$definedMeaningId, 
					$this->filterLanguageId, 
					$this->possiblySynonymousRelationTypeId, 
					$this->queryTransactionInformation
				)
			)
		);
		
		$wgOut->addHTML(DefaultEditor::getExpansionCss());
		$wgOut->addHTML("<script language='javascript'><!--\nexpandEditors();\n--></script>");
	}

	protected function save($referenceTransaction) {
		global
			$wgTitle;

		parent::save($referenceTransaction);

		$definedMeaningId = $this->getDefinedMeaningIdFromTitle($wgTitle->getText());
		getDefinedMeaningEditor($this->filterLanguageId, $this->possiblySynonymousRelationTypeId, false, false)->save(
			$this->getIdStack($definedMeaningId), 
			getDefinedMeaningRecord(
				$definedMeaningId, 
				$this->filterLanguageId, 
				$this->possiblySynonymousRelationTypeId, 
				$referenceTransaction
			)
		);
	}
	
	protected function getIdStack($definedMeaningId) {
		global
			$definedMeaningIdAttribute;
			
		$definedMeaningIdStructure = new Structure($definedMeaningIdAttribute);
		$definedMeaningIdRecord = new ArrayRecord($definedMeaningIdStructure, $definedMeaningIdStructure);
		$definedMeaningIdRecord->setAttributeValue($definedMeaningIdAttribute, $definedMeaningId);	
		
		$idStack = new IdStack("defined-meaning");
		$idStack->pushKey($definedMeaningIdRecord);
		
		return $idStack;
	}
	
	protected function getDefinedMeaningIdFromTitle($title) {
		// get id from title: DefinedMeaning:expression (id)
		$bracketPosition = strrpos($title, "(");
		$definedMeaningId = substr($title, $bracketPosition + 1, strlen($title) - $bracketPosition - 2);
		return $definedMeaningId;
	}	
	
	public function getTitle() {
		global
			$wgTitle, $wgDefinedMeaningPageTitlePrefix;
	
		if ($wgDefinedMeaningPageTitlePrefix != "")
			$prefix = $wgDefinedMeaningPageTitlePrefix . ": ";
		else
			$prefix	= "";
					
		return $prefix . definedMeaningExpression($this->getDefinedMeaningIdFromTitle($wgTitle->getText()));
	}
}

?>
