<?php

require_once("HTMLtable.php");
require_once("Controller.php");
require_once("type.php");
require_once("GotoSourceTemplate.php");

function addCollapsablePrefixToClass($class) {
	return "collapsable-$class";
}

class IdStack {
	protected $keyStack;
	protected $idStack = array();
	protected $currentId;
	protected $classStack = array();
	protected $currentClass;

	public function __construct($prefix) {
	 	$this->keyStack = new RecordStack();
	 	$this->currentId = $prefix;
	 	$this->currentClass = $prefix;
	}

	protected function getKeyIds($record) {
		$ids = array();

		foreach($record->getStructure()->attributes as $attribute)
			$ids[] = $record->getAttributeValue($attribute);

		return $ids;
	}

	protected function pushId($id) {
		$this->idStack[] = $this->currentId;
		$this->currentId .= '-' . $id;
	}

	protected function popId() {
		$this->currentId = array_pop($this->idStack);
	}

	protected function pushClass($class) {
		$this->classStack[] = $this->currentClass;
		$this->currentClass .= '-' . $class;
	}

	protected function popClass() {
		$this->currentClass = array_pop($this->classStack);
	}

	public function pushKey($record) {
		$this->keyStack->push($record);
		$this->pushId(implode("-", $this->getKeyIds($record)));
	}

	public function pushAttribute($attribute) {
		$this->pushId($attribute->id);
		$this->pushClass($attribute->id);
	}

	public function popKey() {
		$this->popId();
		return $this->keyStack->pop();
	}

	public function popAttribute() {
		$this->popId();
		$this->popClass();
	}

	public function getId() {
		return $this->currentId;
	}

	public function getClass() {
		return $this->currentClass;
	}

	public function getKeyStack() {
		return $this->keyStack;
	}
}

interface Editor {
	public function getAttribute();
	public function getUpdateAttribute();
	public function getAddAttribute();

	public function showsData($value);
	public function view($idPath, $value);
	public function showEditField($idPath);
	public function edit($idPath, $value);
	public function add($idPath);
	public function save($idPath, $value);

	public function getUpdateValue($idPath);
	public function getAddValue($idPath);

	public function getEditors();
}

/* XXX: Basic Editor class. */
abstract class DefaultEditor implements Editor {
	protected $editors = array();
	protected $attribute;

	public function __construct($attribute) {
		$this->attribute = $attribute;
	}

	public function addEditor($editor) {
		$this->editors[] = $editor;
	}

	public function getAttribute() {
		return $this->attribute;
	}

	public function getEditors() {
		return $this->editors;
	}

	public function getExpansionPrefix($class, $elementId) {
		return '<span id="prefix-collapsed-' . $elementId . '" class="collapse-' . $class . '">+</span><span id="prefix-expanded-' . $elementId . '" class="expand-' . $class . '">&ndash;</span>';
	}

	static private $staticExpansionStyles = array();

	protected function setExpansion($expand, $elementType) {
		$expansionStyles =& DefaultEditor::$staticExpansionStyles;
		if ($expand) {
			$expansionStyles[".collapse-" . $elementType] = "display:none;";
			$expansionStyles[".expand-" . $elementType] = "display:inline;";
		} else {
			$expansionStyles[".collapse-" . $elementType] = "display:inline;";
			$expansionStyles[".expand-" . $elementType] = "display:none;";
		}
	}

	public static function getExpansionCss() {
		$s = "<style type='text/css'>\n";
		$s .= "/*/*/ /*<![CDATA[*/\n"; # <-- Hide the styles from Netscape 4 without hiding them from IE/Mac
		foreach(DefaultEditor::$staticExpansionStyles as $expansionStyleName => $expansionStyleValue)
			$s .= $expansionStyleName . " {" . $expansionStyleValue . "}\n";
		$s .= "/*]]>*/ /* */\n";
		$s .= "</style>\n";
		return $s;
	}
}

abstract class Viewer extends DefaultEditor {
	public function getUpdateAttribute() {
		return null;
	}

	public function getAddAttribute() {
		return null;
	}

	public function edit($idPath, $value) {
		return $this->view($idPath, $value);
	}

	public function add($idPath) {
	}

	public function save($idPath, $value) {
	}

	public function getUpdateValue($idPath) {
		return null;
	}

	public function getAddValue($idPath) {
		return null;
	}

	public function showEditField($idPath) {
		return true;
	}
}

abstract class RecordSetEditor extends DefaultEditor {
	protected $permissionController;
	protected $showEditFieldChecker;
	protected $allowAddController;
	protected $allowRemove;
	protected $isAddField;
	protected $controller;

	public function __construct($attribute, $permissionController, $showEditFieldChecker, $allowAddController, $allowRemove, $isAddField, $controller) {
		parent::__construct($attribute);

		$this->permissionController = $permissionController;
		$this->showEditFieldChecker = $showEditFieldChecker;
		$this->allowAddController = $allowAddController;
		$this->allowRemove = $allowRemove;
		$this->isAddField = $isAddField;
		$this->controller = $controller;
	}

	public function getAddValue($idPath) {
		$addStructure = $this->getAddStructure();

		if (count($addStructure->attributes) > 0) {
			$relation = new ArrayRecordSet($addStructure, $addStructure);  // TODO Determine real key
			$values = array();

			foreach($this->editors as $editor)
				if ($attribute = $editor->getAddAttribute()) {
					$idPath->pushAttribute($attribute);
					$values[] = $editor->getAddValue($idPath);
					$idPath->popAttribute();
				}

			$relation->addRecord($values);

			return $relation;
		}
		else
			return null;
	}

	protected function saveRecord($idPath, $record) {
		foreach($this->editors as $editor) {
			$attribute = $editor->getAttribute();
			$value = $record->getAttributeValue($attribute);
			$idPath->pushAttribute($attribute);
			$editor->save($idPath, $value);
			$idPath->popAttribute();
		}
	}

	protected function updateRecord($idPath, $record, $structure, $editors) {
		if (count($editors) > 0) {
			$updateRecord = $this->getUpdateRecord($idPath, $structure, $editors);

			if (!equalRecords($structure, $record, $updateRecord))
				$this->controller->update($idPath->getKeyStack(), $updateRecord);
		}
	}

	protected function removeRecord($idPath) {
		global
			$wgRequest;

		if ($wgRequest->getCheck('remove-'. $idPath->getId())) {
			$this->controller->remove($idPath->getKeyStack());
			return true;
		}
		else
			return false;
	}

	public function getStructure() {
		$attributes = array();

		foreach($this->editors as $editor)
			$attributes[] = $editor->getAttribute();

		return new Structure($attributes);
	}

	public function getUpdateValue($idPath) {
		return null;
	}

	protected function getUpdateStructure() {
		$attributes = array();

		foreach($this->editors as $editor)
			if ($updateAttribute = $editor->getUpdateAttribute())
				$attributes[] = $updateAttribute;

		return new Structure($attributes);
	}

	protected function getAddStructure() {
		$attributes = array();

		foreach($this->editors as $editor)
			if ($addAttribute = $editor->getAddAttribute())
				$attributes[] = $addAttribute;

		return new Structure($attributes);
	}

	protected function getUpdateEditors() {
		$updateEditors = array();

		foreach($this->editors as $editor)
			if ($editor->getUpdateAttribute())
				$updateEditors[] = $editor;

		return $updateEditors;
	}

	protected function getAddEditors() {
		$addEditors = array();

		foreach($this->editors as $editor)
			if ($editor->getAddAttribute())
				$addEditors[] = $editor;

		return $addEditors;
	}

	public function getAddRecord($idPath, $structure, $editors) {
		$result = new ArrayRecord($structure);

		foreach($editors as $editor)
			if ($attribute = $editor->getAddAttribute()) {
				$idPath->pushAttribute($attribute);
				$result->setAttributeValue($attribute, $editor->getAddValue($idPath));
				$idPath->popAttribute();
			}

		return $result;
	}

	public function getUpdateRecord($idPath, $structure, $editors) {
		$result = new ArrayRecord($structure);

		foreach($editors as $editor)
			if ($attribute = $editor->getUpdateAttribute()) {
				$idPath->pushAttribute($attribute);
				$result->setAttributeValue($attribute, $editor->getUpdateValue($idPath));
				$idPath->popAttribute();
			}

		return $result;
	}

	public function save($idPath, $value) {
		if ($this->allowAddController->check($idPath) && $this->controller != null) {
			$addStructure = $this->getAddStructure();

			if (count($addStructure->attributes) > 0) {
				$addEditors = $this->getAddEditors();
				$record = $this->getAddRecord($idPath, $addStructure, $addEditors);
				$this->controller->add($idPath->getKeyStack(), $record);
			}
		}

		$recordCount = $value->getRecordCount();
		$key = $value->getKey();
		$updateStructure = $this->getUpdateStructure();
		$updateEditors = $this->getUpdateEditors();

		for ($i = 0; $i < $recordCount; $i++) {
			$record = $value->getRecord($i);
			$idPath->pushKey(project($record, $key));

			if (!$this->allowRemove || !$this->removeRecord($idPath)) {
				$this->saveRecord($idPath, $record);
				$this->updateRecord($idPath, $record, $updateStructure, $updateEditors);
			}

			$idPath->popKey();
		}
	}

	public function getUpdateAttribute() {
		return null;
	}

	public function getAddAttribute() {
		$result = null;

		if ($this->isAddField) {
			$addStructure = $this->getAddStructure();

			if (count($addStructure->attributes) > 0)
				$result = new Attribute($this->attribute->id, $this->attribute->name, new RecordSetType($addStructure));
		}

		return $result;
	}
	
	public function showsData($value) {
		return $value->getRecordCount() > 0;
	}
	
	public function showEditField($idPath) {
		return $this->showEditFieldChecker->check($idPath);
	}
}

class RecordSetTableEditor extends RecordSetEditor {
	protected $rowHTMLAttributes = array();
	protected $repeatInput = false;
	
	protected function getRowAttributesText() {
		$result = array();
		
		foreach ($this->rowHTMLAttributes as $name => $value) 
			$result[] = $name . '="' . $value . '"';
		
		return implode(' ', $result);
	}
	
	public function setRowHTMLAttributes($rowHTMLAttributes) {
		$this->rowHTMLAttributes = $rowHTMLAttributes;
	}
	
	public function view($idPath, $value) {
		$result = '<table id="'. $idPath->getId() .'" class="wiki-data-table">';
		$structure = $value->getStructure();
		$key = $value->getKey();
		$rowAttributes = $this->getRowAttributesText();

		foreach(getStructureAsTableHeaderRows($this->getTableStructure($this), 0) as $headerRow)
			$result .= '<tr>' . $headerRow . '</tr>';

		$recordCount = $value->getRecordCount();

		for($i = 0; $i < $recordCount; $i++) {
			$record = $value->getRecord($i);
			$idPath->pushKey(project($record, $key));
			$result .= '<tr id="'. $idPath->getId() .'" '.  $rowAttributes . '>' . getRecordAsTableCells($idPath, $this, $record) .'</tr>';
			$idPath->popKey();
		}

		$result .= '</table>';

		return $result;
	}

	public function edit($idPath, $value) {
		global
			$wgStylePath;

		$result = '<table id="'. $idPath->getId() .'" class="wiki-data-table">';
		$key = $value->getKey();
		$rowAttributes = $this->getRowAttributesText();

		if ($this->allowRemove)
			$columnOffset = 1;
		else
			$columnOffset = 0;
			
		$headerRows = getStructureAsTableHeaderRows($this->getTableStructure($this), $columnOffset);

		if ($this->allowRemove)
			$headerRows[0] = '<th class="remove" rowspan="' . count($headerRows) . '"><img src="'.$wgStylePath.'/amethyst/delete.png" title="Mark rows to remove" alt="Remove"/></th>' . $headerRows[0];

		if ($this->repeatInput)
			$headerRows[0] .= '<th class="add" rowspan="' . count($headerRows) . '">Input rows</th>';

		foreach ($headerRows as $headerRow)
			$result .= '<tr id="'. $idPath->getId() .'" '.  $rowAttributes . '>' . $headerRow . '</tr>';

		$recordCount = $value->getRecordCount();

		for ($i = 0; $i < $recordCount; $i++) {
			$result .= '<tr>';
			$record = $value->getRecord($i);
			$idPath->pushKey(project($record, $key));

			if ($this->allowRemove) {
				$result .= '<td class="remove">';
				
				if ($this->permissionController->allowRemovalOfValue($idPath, $record))
				 	$result .= getRemoveCheckBox('remove-'. $idPath->getId());
				 	
				$result .= '</td>';
			}
			
			if ($this->permissionController->allowUpdateOfValue($idPath, $record))
				$result .= getRecordAsEditTableCells($record, $idPath, $this);
			else
				$result .= getRecordAsTableCells($idPath, $this, $record);
			
			$idPath->popKey();

			if ($this->repeatInput)
				$result .= '<td/>';

			$result .= '</tr>';
		}
		
		if ($this->allowAddController->check($idPath))
			$result .= $this->getAddRowAsHTML($idPath, $this->repeatInput, $this->allowRemove);

		$result .= '</table>';

		return $result;
	}

	public function add($idPath) {
		if ($this->isAddField) {
			$result = '<table id="'. $idPath->getId() .'" class="wiki-data-table">';
			$headerRows = getStructureAsTableHeaderRows($this->getAddStructure(), 0);

	//		if ($repeatInput)
	//			$headerRows[0] .= '<th class="add" rowspan="' . count($headerRows) . '">Input rows</th>';

			foreach ($headerRows as $headerRow)
				$result .= '<tr>' . $headerRow . '</tr>';

			$result .= $this->getAddRowAsHTML($idPath, false, false);
			$result .= '</table>';

			return $result;
		}
		else
			return "";
	}

	function getAddRowAsHTML($idPath, $repeatInput, $allowRemove) {
		global
			$wgScriptPath;
		
		if ($repeatInput)
			$rowClass = 'repeat';
		else
			$rowClass = '';

		$result = '<tr id="add-'. $idPath->getId() . '" class="' . $rowClass . '">';

		if ($allowRemove)
			$result .= '<td class="add"><img src="'.$wgScriptPath.'/extensions/Wikidata/Images/Add.png" title="Enter new rows to add" alt="Add"/></td>';

		$result .= getStructureAsAddCells($idPath, $this);

		if ($repeatInput)
			$result .= '<td class="input-rows"/>';

		return $result . '</tr>';
	}

	public function getTableStructure($editor) {
		$attributes = array();

		foreach($editor->getEditors() as $childEditor) {
			$childAttribute = $childEditor->getAttribute();

			if ($childEditor instanceof RecordTableCellEditor)
				$type = new RecordType($this->getTableStructure($childEditor));
			else
				$type = 'short-text';

			$attributes[] = new Attribute($childAttribute->id, $childAttribute->name, $type);
		}

		return new Structure($attributes);
	}
}

abstract class RecordEditor extends DefaultEditor {
	protected function getUpdateStructure() {
		$attributes = array();

		foreach($this->editors as $editor)
			if ($updateAttribute = $editor->getUpdateAttribute())
				$attributes[] = $updateAttribute;

		return new Structure($attributes);
	}

	protected function getAddStructure() {
		$attributes = array();

		foreach($this->editors as $editor)
			if ($addAttribute = $editor->getAddAttribute())
				$attributes[] = $addAttribute;

		return new Structure($attributes);
	}

	public function getUpdateValue($idPath) {
		$result = new ArrayRecord($this->getUpdateStructure());

		foreach($this->editors as $editor)
			if ($attribute = $editor->getUpdateAttribute()) {
				$idPath->pushAttribute($attribute);
				$result->setAttributeValue($attribute, $editor->getUpdateValue($idPath));
				$idPath->popAttribute();
			}

		return $result;
	}

	public function getAddValue($idPath) {
		$result = new ArrayRecord($this->getAddStructure());

		foreach($this->editors as $editor)
			if ($attribute = $editor->getAddAttribute()) {
				$idPath->pushAttribute($attribute);
				$result->setAttributeValue($attribute, $editor->getAddValue($idPath));
				$idPath->popAttribute();
			}

		return $result;
	}

	public function getUpdateAttribute() {
		$updateStructure = $this->getUpdateStructure();

		if (count($updateStructure->attributes) > 0)
			return new Attribute($this->attribute->id, $this->attribute->name, new RecordType($updateStructure));
		else
			return null;
	}

	public function getAddAttribute() {
		$addStructure = $this->getAddStructure();

		if (count($addStructure->attributes) > 0)
			return new Attribute($this->attribute->id, $this->attribute->name, new RecordType($addStructure));
		else
			return null;
	}

	public function save($idPath, $value) {
		foreach($this->editors as $editor) {
			$attribute = $editor->getAttribute();
			$idPath->pushAttribute($attribute);
			$editor->save($idPath, $value->getAttributeValue($attribute));
			$idPath->popAttribute();
		}
	}
	
	public function showsData($value) {
		return true;
	}
	
	public function showEditField($idPath) {
		return true;
	}
}

class RecordTableCellEditor extends RecordEditor {
	public function view($idPath, $value) {
	}

	public function edit($idPath, $value) {
	}

	public function add($idPath) {
	}

	public function save($idPath, $value) {
	}
}

/* XXX: What is this for? */
abstract class ScalarEditor extends DefaultEditor {
	protected $permissionController;
	protected $isAddField;

	public function __construct($attribute, $permissionController, $isAddField) {
		parent::__construct($attribute);

		$this->permissionController = $permissionController;
		$this->isAddField = $isAddField;
	}

	protected function addId($id) {
		return "add-" . $id;
	}

	protected function updateId($id) {
		return "update-" . $id;
	}

	public function save($idPath, $value) {
	}

	public function getUpdateAttribute() {
		if ($this->permissionController->allowUpdateOfAttribute($this->attribute))
			return $this->attribute;
		else
			return null;
	}

	public function getAddAttribute() {
		if ($this->isAddField)
			return $this->attribute;
		else
			return null;
	}

	public abstract function getViewHTML($idPath, $value);
	public abstract function getEditHTML($idPath, $value);
	public abstract function getInputValue($id);

	public function getUpdateValue($idPath) {
		return $this->getInputValue("update-" . $idPath->getId());
	}

	public function getAddValue($idPath) {
		return $this->getInputValue("add-" . $idPath->getId());
	}

	public function view($idPath, $value) {
		return $this->getViewHTML($idPath, $value);
	}

	public function edit($idPath, $value) {
		if ($this->permissionController->allowUpdateOfValue($idPath, $value))
			return $this->getEditHTML($idPath, $value);
		else
			return $this->getViewHTML($idPath, $value);
	}
	
	public function showsData($value) {
		return true;
	}
	
	public function showEditField($idPath) {
		return true;
	}
}

class LanguageEditor extends ScalarEditor {
	public function getViewHTML($idPath, $value) {
			return languageIdAsText($value);
	}

	public function getEditHTML($idPath, $value) {
		return getSuggest($this->updateId($idPath->getId()), "language");
	}
	
	public function add($idPath) {
		return getSuggest($this->addId($idPath->getId()), "language");
	}

	public function getInputValue($id) {
		global
			$wgRequest;

		return $wgRequest->getInt($id);
	}
}

class SpellingEditor extends ScalarEditor {
	public function getViewHTML($idPath, $value) {
		return spellingAsLink($value);
	}

	public function getEditHTML($idPath, $value) {
			return getTextBox($this->updateId($idPath->getId()));
	}

	public function add($idPath) {
		if ($this->isAddField)
			return getTextBox($this->addId($idPath->getId()));
		else
			return "";
	}

	public function getInputValue($id) {
		global
			$wgRequest;

		return trim($wgRequest->getText($id));
	}
}

class DefinedMeaningHeaderEditor extends ScalarEditor {
	protected $truncate;
	protected $truncateAt;
	protected $addText = "";

	public function __construct($attribute, $permissionController, $truncate=false, $truncateAt=0) {
		parent::__construct($attribute, $permissionController, false);

		$this->truncate = $truncate;
		$this->truncateAt = $truncateAt;
	}

	public function getViewHTML($idPath, $value) {
		$definition = getDefinedMeaningDefinition($value);
		$definedMeaningAsLink = definedMeaningAsLink($value);
		$escapedDefinition = htmlspecialchars($definition);

		if ($this->truncate && strlen($definition) > $this->truncateAt)
			$escapedDefinition = '<span title="'. $escapedDefinition .'">'. htmlspecialchars(substr($definition, 0, $this->truncateAt)) . '...</span>';
			
		return $definedMeaningAsLink . ": " . $escapedDefinition;			
	}

	public function getEditHTML($idPath, $value) {
		return "";
	}

	public function add($idPath) {
		if ($this->isAddField)
			return getTextArea($this->addId($idPath->getId()), "", 3);
		else
			return $this->addText;
	}

	public function getInputValue($id) {
		global
			$wgRequest;

		return trim($wgRequest->getText($id));
	}

	public function setAddText($addText) {
		$this->addText = $addText;
	}
}

class TextEditor extends ScalarEditor {
	protected $truncate;
	protected $truncateAt;
	protected $addText = "";
	protected $controller;

	public function __construct($attribute, $permissionController, $isAddField, $truncate=false, $truncateAt=0, $controller=null) {
		parent::__construct($attribute, $permissionController, $isAddField);

		$this->truncate = $truncate;
		$this->truncateAt = $truncateAt;
		$this->controller = $controller;
	}

	public function getViewHTML($idPath, $value) {
		$escapedValue = htmlspecialchars($value);

//		global $wgParser, $wgTitle, $wgOut;
//		$parserOutput = $wgParser->parse($value, $wgTitle, $wgOut->mParserOptions, true, true, $wgOut->mRevisionId);

		if (!$this->truncate || strlen($value) <= $this->truncateAt)
			return $escapedValue;//$parserOutput->getText();
		else
			return '<span title="'. $escapedValue .'">'. htmlspecialchars(substr($value, 0, $this->truncateAt)) . '...</span>';
	}

	public function getEditHTML($idPath, $value) {
		return getTextArea($this->updateId($idPath->getId()), $value, 3);
	}

	public function add($idPath) {
		if ($this->isAddField)
			return getTextArea($this->addId($idPath->getId()), "", 3);
		else
			return $this->addText;
	}

	public function getInputValue($id) {
		global
			$wgRequest;

		return trim($wgRequest->getText($id));
	}

	public function setAddText($addText) {
		$this->addText = $addText;
	}
	
	public function save($idPath, $value) {
		if ($this->controller != null) {
			$inputValue = $this->getInputValue($this->updateId($idPath->getId()));

			if ($inputValue != $value)
				$this->controller->update($idPath->getKeyStack(), $inputValue);
		}
	}
}

class ShortTextEditor extends ScalarEditor {
	public function getViewHTML($idPath, $value) {
		return htmlspecialchars($value);
	}

	public function getEditHTML($idPath, $value) {
		return getTextBox($this->updateId($idPath->getId()), $value);
	}

	public function add($idPath) {
		if ($this->isAddField)
			return getTextBox($this->addId($idPath->getId()), "");
		else
			return "";
	}

	public function getInputValue($id) {
		global
			$wgRequest;

		return trim($wgRequest->getText($id));
	}
}

class URLEditor extends ShortTextEditor {
	public function getViewHTML($idPath, $value) {
		global
			$escapedValue;
		
		$escapedValue = htmlspecialchars($value);
			
		return '<a href="' . $escapedValue . '">' . $escapedValue . '</a>';
	}
}

class BooleanEditor extends ScalarEditor {
	protected $defaultValue;

	public function __construct($attribute, $permissionController, $isAddField, $defaultValue) {
		parent::__construct($attribute, $permissionController, $isAddField);

		$this->defaultValue = $defaultValue;
	}

	public function getViewHTML($idPath, $value) {
		return booleanAsHTML($value);
	}

	public function getEditHTML($idPath, $value) {
		return getCheckBox($this->updateId($idPath->getId()), $value);
	}

	public function add($idPath) {
		if ($this->isAddField)
			return getCheckBox($this->addId($idPath->getId()), $this->defaultValue);
		else
			return "";
	}

	public function getInputValue($id) {
		global
			$wgRequest;

		return $wgRequest->getCheck($id);
	}
}

abstract class SuggestEditor extends ScalarEditor {
	public function add($idPath) {
		if ($this->isAddField)
			return getSuggest($this->addId($idPath->getId()), $this->suggestType());
		else
			return "";
	}

	protected abstract function suggestType();

	public function getEditHTML($idPath, $value) {
		return getSuggest($this->updateId($idPath->getId()), $this->suggestType()); 
	}

	public function getInputValue($id) {
		global
			$wgRequest;

		return trim($wgRequest->getText($id));
	}
}

class DefinedMeaningReferenceEditor extends SuggestEditor {
	protected function suggestType() {
		return "defined-meaning";
	}

	public function getViewHTML($idPath, $value) {
		global
			$definedMeaningIdAttribute, $definedMeaningLabelAttribute, $definedMeaningDefiningExpressionAttribute;

		$definedMeaningId = $value->getAttributeValue($definedMeaningIdAttribute);
		$definedMeaningLabel = $value->getAttributeValue($definedMeaningLabelAttribute);
		$definedMeaningDefiningExpression = $value->getAttributeValue($definedMeaningDefiningExpressionAttribute);
		
		return definedMeaningReferenceAsLink($definedMeaningId, $definedMeaningDefiningExpression, $definedMeaningLabel);
	}
}

class ClassAttributesLevelDefinedMeaningEditor extends SuggestEditor {
	protected function suggestType() {
		return "class-attributes-level";
	}

	public function getViewHTML($idPath, $value) {
		global
			$definedMeaningIdAttribute, $definedMeaningLabelAttribute, $definedMeaningDefiningExpressionAttribute;

		$definedMeaningId = $value->getAttributeValue($definedMeaningIdAttribute);
		$definedMeaningLabel = $value->getAttributeValue($definedMeaningLabelAttribute);
		$definedMeaningDefiningExpression = $value->getAttributeValue($definedMeaningDefiningExpressionAttribute);
		
		return definedMeaningReferenceAsLink($definedMeaningId, $definedMeaningDefiningExpression, $definedMeaningLabel);
	}
}

abstract class SelectEditor extends ScalarEditor {
	protected abstract function getOptions();

	public function add($idPath) {
		if ($this->isAddField)
			return getSelect($this->addId($idPath->getId()), $this->getOptions());
		else
			return "";
	}

	public function getViewHTML($idPath, $value) {
		$options = $this->getOptions();
		return $options[$value];
	}

	public function getEditHTML($idPath, $value) {
		return getSelect($this->addId($idPath->getId()), $this->getOptions());
	}

	public function getInputValue($id) {
		global
			$wgRequest;

		return trim($wgRequest->getText($id));
	}
}

/* XXX: Should these options be stored somewhere else? */
class ClassAttributesTypeEditor extends SelectEditor {
	protected function getOptions() {
		return array('TEXT' => 'Text', 'OPTN' => 'Option');
	}
}

class OptionSelectEditor extends SelectEditor {
	protected function getOptions() {
		return array();
	}

	public function getViewHTML($idPath, $value) {
		global
			$definedMeaningIdAttribute, $definedMeaningLabelAttribute, $definedMeaningDefiningExpressionAttribute;

		$definedMeaningId = $value->getAttributeValue($definedMeaningIdAttribute);
		$definedMeaningLabel = $value->getAttributeValue($definedMeaningLabelAttribute);
		$definedMeaningDefiningExpression = $value->getAttributeValue($definedMeaningDefiningExpressionAttribute);
		
		return definedMeaningReferenceAsLink($definedMeaningId, $definedMeaningDefiningExpression, $definedMeaningLabel);
	}
}

class RelationTypeReferenceEditor extends DefinedMeaningReferenceEditor {
	protected function suggestType() {
		return "relation-type";
	}
}

class ClassReferenceEditor extends DefinedMeaningReferenceEditor {
	protected function suggestType() {
		return "class";
	}
}

class CollectionReferenceEditor extends DefinedMeaningReferenceEditor {
	protected function suggestType() {
		return "collection";
	}
}

class AttributeEditor extends DefinedMeaningReferenceEditor {
	protected $attributesLevelName;
	protected $objectIdFetcher;

	public function __construct($attribute, $permissionController, $isAddField, $attributesLevelName, $objectIdFetcher) {
		parent::__construct($attribute, $permissionController, $isAddField);

		$this->attributesLevelName = $attributesLevelName;
		$this->objectIdFetcher = $objectIdFetcher;
	}

	public function add($idPath) {
		if ($this->isAddField){
				$parameters = array("attributesLevel" => $this->attributesLevelName, 
									"attributesObjectId" => $this->objectIdFetcher->fetch($idPath->getKeyStack()));
								
			return getSuggest($this->addId($idPath->getId()), $this->suggestType(), $parameters);			
		}
		else
			return "";
	}
	
	public function getEditHTML($idPath, $value) {
		$parameters = array("attributesLevel" => $this->attributesLevelName);
		return getSuggest($this->updateId($idPath->getId()), $this->suggestType(), $parameters); 
	}
}

class TextAttributeEditor extends AttributeEditor {
	protected function suggestType() {
		return "text-attribute";
	}
}

class TranslatedTextAttributeEditor extends AttributeEditor {
	protected function suggestType() {
		return "translated-text-attribute";
	}
}

class OptionAttributeEditor extends AttributeEditor {
	protected function suggestType() {
		return 'option-attribute';
	}

	public function add($idPath) {
		if ($this->isAddField) {
			global
				$syntransIdAttribute;

			$syntransId = $idPath->getKeyStack()->peek(0)->getAttributeValue($syntransIdAttribute);
			$parameters = array('attributesLevel' => $this->attributesLevelName, 
								'attributesObjectId' => $this->objectIdFetcher->fetch($idPath->getKeyStack()),
								'onUpdate' => 'updateSelectOptions(\'' . $this->addId($idPath->getId()) . '-option\',' . $syntransId);
			return getSuggest($this->addId($idPath->getId()), $this->suggestType(), $parameters);
		}
		else
			return '';
	}

	public function getEditHTML($idPath, $value) {
		$parameters = array('attributesLevel' => $this->attributesLevelName,
							'onUpdate' => 'updateSelectOptions(\'' . $this->updateId($idPath->getId()) . '-option\'');
		return getSuggest($this->updateId($idPath->getId()), $this->suggestType(), $parameters); 
	}
}

class RecordListEditor extends RecordEditor {
	protected $expandedEditors = array();
	protected $headerLevel = 1;
	protected $htmlTag;

	public function __construct($attribute, $headerLevel, $htmlTag) {
		parent::__construct($attribute);
		
		$this->htmlTag = $htmlTag;
		$this->headerLevel = $headerLevel;
	}
	
	public function showsData($value) {
		$index = 0;
		$showsData = false;
		while($index < count($this->editors) && !$showsData) {
			$editor = $this->editors[$index];
			$attribute = $editor->getAttribute();
			$attributeValue = $value->getAttributeValue($attribute);
			$showsData = $editor->showsData($attributeValue);
			$index += 1;			
		}
		return $showsData;
	}
	
	public function view($idPath, $value) {
		$result = '';
		foreach ($this->editors as $editor) {
			$attribute = $editor->getAttribute();
			$idPath->pushAttribute($attribute);
			$class = $idPath->getClass();
			$attributeId = $idPath->getId();
			$attributeValue = $value->getAttributeValue($attribute);			

			if ($editor->showsData($attributeValue)) 	
				$result .=	'<' . $this->htmlTag . '>' . 
				           		$this->childHeader($editor, $attribute, $class, $attributeId) .
				           		$this->viewChild($editor, $idPath, $value, $attribute, $class, $attributeId) .
				           	'</' . $this->htmlTag . '>';
			           
			$idPath->popAttribute();			           
		}
		return $result;
	}

	public function showEditField($idPath) {
		return true;
	}

	public function edit($idPath, $value) {
		$result = '';
		foreach ($this->editors as $editor) {
			$attribute = $editor->getAttribute();
			$idPath->pushAttribute($attribute);
			
			if($editor->showEditField($idPath)) {
				$class = $idPath->getClass();
				$attributeId = $idPath->getId();
	
				$result .= 	'<' . $this->htmlTag . '>'.
					        	$this->childHeader($editor, $attribute, $class, $attributeId) .
							    $this->editChild($editor, $idPath, $value,  $attribute, $class, $attributeId) .
						 	'</' . $this->htmlTag . '>';
			}
			$idPath->popAttribute();
		}
		return $result;
	}
	
	public function add($idPath) {
		$result = '';
		foreach($this->editors as $editor) {
			if ($attribute = $editor->getAddAttribute()) {
				$idPath->pushAttribute($attribute);
				$class = $idPath->getClass();
				$attributeId = $idPath->getId();

				$result .=	'<' . $this->htmlTag . '>'.
								$this->childHeader($editor, $attribute, $class, $attributeId) .
								$this->addChild($editor, $idPath, $attribute, $class, $attributeId) .
							'</' . $this->htmlTag . '>';

				$editor->add($idPath);
				$idPath->popAttribute();
			}
		}
		return $result;
	}
	
	protected function childHeader($editor, $attribute, $class, $attributeId){
		$expansionPrefix = $this->getExpansionPrefix($class, $attributeId);
		$this->setExpansionByEditor($editor, $class);
		return '<h'. $this->headerLevel .'><span id="collapse-'. $attributeId .'" class="toggle '. addCollapsablePrefixToClass($class) .'" onclick="toggle(this, event);">' . $expansionPrefix . '&nbsp;' . $attribute->name . '</span></h'. $this->headerLevel .'>';
	}
	
	protected function viewChild($editor, $idPath, $value, $attribute, $class, $attributeId){
		return '<div id="collapsable-'. $attributeId . '" class="expand-' . $class . '">' . $editor->view($idPath, $value->getAttributeValue($attribute)) . '</div>';
	}

	protected function editChild($editor, $idPath, $value, $attribute, $class, $attributeId) {
		return '<div id="collapsable-'. $attributeId . '" class="expand-' . $class . '">' . $editor->edit($idPath, $value->getAttributeValue($attribute)) . '</div>';
	}

	protected function addChild($editor, $idPath, $attribute, $class, $attributeId) {
		return '<div id="collapsable-'. $attributeId . '" class="expand-' . $class . '">' . $editor->add($idPath) . '</div>';
	}

	public function expandEditor($editor) {
		$this->expandedEditors[] = $editor;
	}

	public function setExpansionByEditor($editor, $elementType) {
		$this->setExpansion(in_array($editor, $this->expandedEditors, true), $elementType);
	}
}

class RecordUnorderedListEditor extends RecordListEditor {
	public function __construct($attribute, $headerLevel) {
		parent::__construct($attribute, $headerLevel, "li");
	}
	
	protected function wrapInList($listItems) {
		if ($listItems != "")
			return
				'<ul class="collapsable-items">' . $listItems . '</ul>';
		else
			return "";
	}
	
	public function view($idPath, $value) {
		return $this->wrapInList(parent::view($idPath, $value));
	}

	public function edit($idPath, $value) {
		return $this->wrapInList(parent::edit($idPath, $value));
	}

	public function add($idPath) {
		return $this->wrapInList(parent::add($idPath));
	}
}

class RecordDivListEditor extends RecordListEditor {
	public function __construct($attribute) {
		parent::__construct($attribute, 0, "div");
	}

	protected function wrapInDiv($listItems) {
		return '<div>' . $listItems . '</div>';
	}
	
	public function view($idPath, $value) {
		return $this->wrapInDiv(parent::view($idPath, $value));
	}

	public function edit($idPath, $value) {
		return $this->wrapInDiv(parent::edit($idPath, $value));
	}

	public function add($idPath) {
		return $this->wrapInDiv(parent::add($idPath));
	}
	
	protected function childHeader($editor, $attribute, $class, $attributeId){
		return "";
	}
}

class WrappingEditor implements Editor {
	protected $wrappedEditor;
	
	public function __construct($wrappedEditor) {
		$this->wrappedEditor = $wrappedEditor;
	}

	public function getAttribute() {
		return $this->wrappedEditor->getAttribute();
	}
	
	public function getUpdateAttribute() {
		return $this->wrappedEditor->getUpdateAttribute();
	}
	
	public function getAddAttribute() {
		return $this->wrappedEditor->getAddAttribute();
	}

	public function showsData($value) {
		return $this->wrappedEditor->showsData($value);
	}
	
	public function showEditField($idPath) {
		return $this->wrappedEditor->showEditField($idPath);
	}
	
	public function view($idPath, $value) {
		return $this->wrappedEditor->view($idPath, $value);
	}
	
	public function edit($idPath, $value) {
		return $this->wrappedEditor->edit($idPath, $value);	
	}
	
	public function add($idPath) {
		return $this->wrappedEditor->add($idPath);	
	}
	
	public function save($idPath, $value) {
		$this->wrappedEditor->save($idPath, $value);
	}

	public function getUpdateValue($idPath) {
		return $this->wrappedEditor->getUpdateValue($idPath);	
	}
	
	public function getAddValue($idPath) {
		return $this->wrappedEditor->getAddValue($idPath);
	}

	public function getEditors() {
		return $this->wrappedEditor->getEditors();
	}
}

class PopUpEditor extends WrappingEditor {
	protected $linkCaption;
	
	public function __construct($wrappedEditor, $linkCaption) {
		parent::__construct($wrappedEditor);
				
		$this->linkCaption = $linkCaption;
	}

	public function view($idPath, $value) {
		return
			$this->startToggleCode($idPath->getId()) .
			$this->wrappedEditor->view($idPath, $value) . 
			$this->endToggleCode($idPath->getId());
	}
	
	public function edit($idPath, $value) {
		return 	
			$this->startToggleCode($idPath->getId()) .
			$this->wrappedEditor->edit($idPath, $value) .
			$this->endToggleCode($idPath->getId());
	}

	protected function startToggleCode($attributeId) {
		return 	
			'<a id="popup-' . $attributeId . '-link" style="cursor: pointer; font-weight: bolder; font-size: 90%; white-space: nowrap" onclick="togglePopup(this, event);">'. $this->linkCaption .' &raquo;</a>' . 
			'<div><div id="popup-' . $attributeId . '-toggleable" style="position: absolute; border: 1px solid #000000; display: none; background-color: white; padding: 4px;">';
	}

	protected function endToggleCode($attributeId) {
		return '</div></div>';
	}
}

class RecordSetListEditor extends RecordSetEditor {
	protected $headerLevel;
	protected $childrenExpanded;
	protected $captionEditor;
	protected $valueEditor;

	public function __construct($attribute, $permissionController, $showEditFieldChecker, $allowAddController, $allowRemove, $isAddField, $controller, $headerLevel, $childrenExpanded) {
		parent::__construct($attribute, $permissionController, $showEditFieldChecker, $allowAddController, $allowRemove, $isAddField, $controller);

		$this->headerLevel = $headerLevel;
		$this->childrenExpanded = $childrenExpanded;
	}

	public function setCaptionEditor($editor) {
		$this->captionEditor = $editor;
		$this->editors[0] = $editor;
	}

	public function setValueEditor($editor) {
		$this->valueEditor = $editor;
		$this->editors[1] = $editor;
	}

	public function view($idPath, $value) {
		$recordCount = $value->getRecordCount();

		if ($recordCount > 0) {
			$result = '<ul class="collapsable-items">';
			$key = $value->getKey();
			$captionAttribute = $this->captionEditor->getAttribute();
			$valueAttribute = $this->valueEditor->getAttribute();
		
			for ($i = 0; $i < $recordCount; $i++) {
				$record = $value->getRecord($i);
				$idPath->pushKey(project($record, $key));
				$recordId = $idPath->getId();
				$captionClass = $idPath->getClass() . "-record";
				$captionExpansionPrefix = $this->getExpansionPrefix($captionClass, $recordId);
				$this->setExpansion($this->childrenExpanded, $captionClass);
				$valueClass = $idPath->getClass() . "-record";
				$this->setExpansion($this->childrenExpanded, $valueClass);
		
				$idPath->pushAttribute($captionAttribute);
				$result .= '<li>'.
							'<h' . $this->headerLevel .'><span id="collapse-'. $recordId .'" class="toggle '. addCollapsablePrefixToClass($captionClass) .'" onclick="toggle(this, event);">' . $captionExpansionPrefix . '&nbsp;' . $this->captionEditor->view($idPath, $record->getAttributeValue($captionAttribute)) . '</span></h' . $this->headerLevel .'>';
				$idPath->popAttribute();
		
				$idPath->pushAttribute($valueAttribute);
				$result .= '<div id="collapsable-'. $recordId . '" class="expand-' . $valueClass . '">' . $this->valueEditor->view($idPath, $record->getAttributeValue($valueAttribute)) . '</div>' .
							'</li>';
				$idPath->popAttribute();
		
				$idPath->popKey();
			}
		
			$result .= '</ul>';
		
			return $result;
		}
		else
			return "";	
	}

	public function edit($idPath, $value) {
		global
			$wgScriptPath;
		
		$recordCount = $value->getRecordCount();
		
		if ($recordCount > 0 || $this->allowAddController->check($idPath)) {
			$result = '<ul class="collapsable-items">';
			$key = $value->getKey();
			$captionAttribute = $this->captionEditor->getAttribute();
			$valueAttribute = $this->valueEditor->getAttribute();
	
			for ($i = 0; $i < $recordCount; $i++) {
				$record = $value->getRecord($i);
				$idPath->pushKey(project($record, $key));
	
				$recordId = $idPath->getId();
				$captionClass = $idPath->getClass();
				$captionExpansionPrefix = $this->getExpansionPrefix($captionClass, $recordId);
				$this->setExpansion($this->childrenExpanded, $captionClass);
				$valueClass = $idPath->getClass();
				$this->setExpansion($this->childrenExpanded, $valueClass);
	
				$idPath->pushAttribute($captionAttribute);
				$result .= '<li>'.
							'<h' . $this->headerLevel .'><span id="collapse-'. $recordId .'" class="toggle '. addCollapsablePrefixToClass($captionClass) .'" onclick="toggle(this, event);">' . $captionExpansionPrefix . '&nbsp;' . $this->captionEditor->edit($idPath, $record->getAttributeValue($captionAttribute)) . '</span></h' . $this->headerLevel .'>';
				$idPath->popAttribute();
	
				$idPath->pushAttribute($valueAttribute);
				$result .= '<div id="collapsable-'. $recordId . '" class="expand-' . $valueClass . '">' . $this->valueEditor->edit($idPath, $record->getAttributeValue($valueAttribute)) . '</div>' .
							'</li>';
				$idPath->popAttribute();
	
				$idPath->popKey();
			}
	
			if ($this->allowAddController->check($idPath)) {
				$recordId = 'add-' . $idPath->getId();
				$idPath->pushAttribute($captionAttribute);
				$class = $idPath->getClass();
	
				$this->setExpansion(true, $class);
	
				$result .= '<li>'.
							'<h' . $this->headerLevel . '><span id="collapse-'. $recordId .'" class="toggle '. addCollapsablePrefixToClass($class) .'" onclick="toggle(this, event);">' . $this->getExpansionPrefix($idPath->getClass(), $idPath->getId()) . ' <img src="'.$wgScriptPath.'/extensions/Wikidata/Images/Add.png" title="Enter new list item to add" alt="Add"/> ' . $this->captionEditor->add($idPath) . '</span></h' . $this->headerLevel .'>';
				$idPath->popAttribute();
	
				$idPath->pushAttribute($valueAttribute);
				$result .= '<div id="collapsable-'. $recordId . '" class="expand-' . $class . '">' . $this->valueEditor->add($idPath) . '</div>' .
							'</li>';
				$idPath->popAttribute();
			}

			$result .= '</ul>';

			return $result;
		}
		else
			return ""; 
	}

	public function add($idPath) {
		$result = '<ul class="collapsable-items">';
		$captionAttribute = $this->captionEditor->getAttribute();
		$valueAttribute = $this->valueEditor->getAttribute();

		$recordId = 'add-' . $idPath->getId();

		$idPath->pushAttribute($captionAttribute);
		$class = $idPath->getClass();

		$this->setExpansion(true, $class);

		$result .= '<li>'.
					'<h' . $this->headerLevel .'><span id="collapse-'. $recordId .'" class="toggle '. addCollapsablePrefixToClass($class) .'" onclick="toggle(this, event);">' . $this->getExpansionPrefix($idPath->getClass(), $idPath->getId()) . '&nbsp;' . $this->captionEditor->add($idPath) . '</span></h' . $this->headerLevel .'>';
		$idPath->popAttribute();

		$idPath->pushAttribute($valueAttribute);
		$result .= '<div id="collapsable-'. $recordId . '" class="expand-' . $class . '">' . $this->valueEditor->add($idPath) . '</div>' .
					'</li>';
		$idPath->popAttribute();

		$result .= '</ul>';

		return $result;
	}
}

class AttributeLabelViewer extends Viewer {
	public function view($idPath, $value) {
		return $this->attribute->name;
	}

	public function add($idPath) {
		return "New " . strtolower($this->attribute->name);
	}
	
	public function showsData($value) {
		return true;
	}
	
	public function showEditField($idPath){
		return true;
	}
}

class RecordSpanEditor extends RecordEditor {
	protected $attributeSeparator;
	protected $valueSeparator;
	protected $showAttributeNames;

	public function __construct($attribute, $valueSeparator, $attributeSeparator, $showAttributeNames = true) {
		parent::__construct($attribute);

		$this->attributeSeparator = $attributeSeparator;
		$this->valueSeparator = $valueSeparator;
		$this->showAttributeNames = $showAttributeNames;
	}

	public function view($idPath, $value) {
		$fields = array();

		foreach($this->editors as $editor) {
			$attribute = $editor->getAttribute();
			$idPath->pushAttribute($attribute);
			$attributeValue = $editor->view($idPath, $value->getAttributeValue($attribute));
			
			if ($this->showAttributeNames)	
				$field = $attribute->name . $this->valueSeparator . $attributeValue;
			else
				$field = $attributeValue; 
			
			if ($field != "")
				$fields[] = $field;
					
			$idPath->popAttribute();
		}

		return implode($this->attributeSeparator, $fields);
	}

	public function add($idPath) {
		$fields = array();

		foreach($this->editors as $editor) {
			if ($attribute = $editor->getAddAttribute()) {
				$attribute = $editor->getAttribute();
				$idPath->pushAttribute($attribute);
				$attributeId = $idPath->getId();
				$fields[] = $attribute->name . $this->valueSeparator. $editor->add($idPath);
				$editor->add($idPath);
				$idPath->popAttribute();
			}
		}

		return implode($this->attributeSeparator, $fields);
	}

	public function edit($idPath, $value) {
		$fields = array();

		foreach($this->editors as $editor) {
			$attribute = $editor->getAttribute();
			$idPath->pushAttribute($attribute);
			$fields[] = $attribute->name . $this->valueSeparator. $editor->view($idPath, $value->getAttributeValue($attribute));
			$idPath->popAttribute();
		}

		return implode($this->attributeSeparator, $fields);
	}
}

class UserEditor extends ScalarEditor {
	public function getViewHTML($idPath, $value) {
		global
			$wgUser;
			
		if ($value != "")	
			return $wgUser->getSkin()->makeLink("User:".$value, $value);
		else
			return "";
	}
	
	public function getEditHTML($idPath, $value) {
		return $this->getViewHTML($idPath, $value);
	}

	public function getInputValue($id) {
	}
	
	public function add($idPath) {
	}
}

class TimestampEditor extends ScalarEditor {
	public function getViewHTML($idPath, $value) {
		if ($value != "")
			return timestampAsText($value);
		else
			return "";
	}
	
	public function getEditHTML($idPath, $value) {
		return $this->getViewHTML($idPath, $value);
	}

	public function getInputValue($id) {
	}
	
	public function add($idPath) {
	}
}

//added the "allow add controller" to be able to control the usage of the add field in different circumstances
//instances of this class are used instead of the boolean "allowAdd" in the editors
class AllowAddController {
	protected $value;
	
	public function __construct($value){
		$this->value = $value;
	}
	public function check($idPath){
		return $this->value;
	}
}

class ShowEditFieldChecker {
	protected $value;
	
	public function __construct($value){
		$this->value = $value;
	}
	public function check($idPath){
		return $this->value;
	}
}

class ShowEditFieldForClassesChecker extends ShowEditFieldChecker{
	protected $objectIdAttributeLevel;
	protected $objectIdAttribute;
	
	public function __construct($objectIdAttributeLevel, $objectIdAttribute) {
		$this->objectIdAttributeLevel = $objectIdAttributeLevel;
		$this->objectIdAttribute = $objectIdAttribute;
	}
	public function check($idPath) {
		$objectId = $idPath->getKeyStack()->peek($this->objectIdAttributeLevel)->getAttributeValue($this->objectIdAttribute);
		return isClass($objectId);			
	}	
}

// The roll back editor is tricked. It shows a checkbox when its value is 'true', meaning that the record is the latest
// so it can be rolled back. However, when requesting the input value it returns the value of the roll back check box.
// This can possibly be solved better later on when we choose to let editors fetch the value(s) of the attribute(s) they're
// viewing within their parent. The roll back editor could then inspect the value of the $isLatestAttribute to decide whether
// to show the roll back check box. 

//class RollbackEditor extends BooleanEditor {
//	public function __construct($attribute)  {
//		parent::__construct($attribute, new SimplePermissionController(false), false, false);
//	}
//
//	public function getViewHTML($idPath, $value) {
//		if ($value)
//			return $this->getEditHTML($idPath, false);
//		else
//			return "";
//	}
//
//	public function shouldRollBack($id, $value) {
//		return $value && isset($_POST[$id]);
//	}
//}

class RollBackEditor extends ScalarEditor {
	protected $hasValueFields;
	protected $suggestionsEditor;
	
	public function __construct($attribute, $hasValueFields)  {
		parent::__construct($attribute, new SimplePermissionController(false), false, false);
		
		$this->hasValueFields = $hasValueFields;
	}
	
	public function getViewHTML($idPath, $value) {
		global
			$isLatestAttribute, $operationAttribute;
			
		$isLatest = $value->getAttributeValue($isLatestAttribute);
		$operation = $value->getAttributeValue($operationAttribute);
		
		if ($isLatest) {
			$options = array('do-nothing' => 'Do nothing');
			
			if ($this->hasValueFields) {
				$previousVersionLabel = 'Previous version';
				$rollBackChangeHandler = 'rollBackOptionChanged(this);';
			}
			else {
				$previousVersionLabel = 'Restore';
				$rollBackChangeHandler = '';
			}
				
			if ($this->hasValueFields || $operation != 'Added')
				$options['previous-version'] = $previousVersionLabel;
			
			if ($operation != 'Removed')
				$options['remove'] = 'Remove';
		
			$result = getSelect($idPath->getId(), $options, 'do-nothing', $rollBackChangeHandler);
		
			if ($this->suggestionsEditor != null)
				$result .=
					'<div id="' . $idPath->getId() . '-version-selector" style="display: none; padding-top: 4px;">' . 
						$this->getSuggestionsHTML($idPath, $value) . 
					'</div>';
				
			return $result;
		}
		else
			return "";
	}

	public function getEditHTML($idPath, $value) {
		return $this->getViewHTML($idPath, $value);
	}

	protected function getSuggestionsHTML($idPath, $value) {
		$attribute = $this->suggestionsEditor->getAttribute();
		$idPath->pushAttribute($attribute);
		$result = $this->suggestionsEditor->view($idPath, $value->getAttributeValue($attribute));
		$idPath->popAttribute();
		
		return $result;
	}

	public function getInputValue($id) {
		return "";
	}

	public function add($idPath) {
	}
	
	public function setSuggestionsEditor($suggestionsEditor) {
		$this->suggestionsEditor = $suggestionsEditor;
	}
}

class RecordSetRecordSelector extends WrappingEditor {
	public function view($idPath, $value) {
		return getStaticSuggest($idPath->getId(), $this->wrappedEditor->view($idPath, $value), count($value->getKey()->attributes));
	}
}

class RecordSubRecordEditor extends RecordEditor {
	protected $subRecordEditor;
	
	public function view($idPath, $value) {
		$attribute = $this->subRecordEditor->getAttribute();
		$idPath->pushAttribute($attribute);
		$result = $this->subRecordEditor->view($idPath, $value->getAttributeValue($attribute));
		$idPath->popAttribute();

		return $result;
	}

	public function edit($idPath, $value) {
		$attribute = $this->subRecordEditor->getAttribute();
		$idPath->pushAttribute($attribute);
		$result = $this->subRecordEditor->edit($idPath, $value->getAttributeValue($attribute));
		$idPath->popAttribute();

		return $result;
	}
	
	public function add($idPath) {
		$attribute = $this->subRecordEditor->getAttribute();
		$idPath->pushAttribute($attribute);
		$result = $this->subRecordEditor->add($idPath);
		$idPath->popAttribute();
		
		return $result;
	}
	
	public function setSubRecordEditor($subRecordEditor) {
		$this->subRecordEditor = $subRecordEditor;
		$this->editors[0] = $subRecordEditor;
	}
}

class RecordSetFirstRecordEditor extends RecordSetEditor {
	protected $recordEditor;
		
	public function view($idPath, $value) {
		if ($value->getRecordCount() > 0) {
			$record = $value->getRecord(0);
			$idPath->pushKey(project($record, $value->getKey()));
			$result = $this->recordEditor->view($idPath, $record);
			$idPath->popKey();
			
			return $result;
		}
		else
			return "";
	}

	public function edit($idPath, $value) {
		if ($value->getRecordCount() > 0) {
			$record = $value->getRecord(0);
			$idPath->pushKey(project($record, $value->getKey()));
			$result = $this->recordEditor->edit($idPath, $record);
			$idPath->popKey();
		}
		else
			$result = $this->recordEditor->add($idPath);

		return $result;
	}
	
	public function add($idPath) {
		return "";
	}
	
	public function save($idPath, $value) {
		if ($value->getRecordCount() > 0) { 
			$record = $value->getRecord(0);
			$idPath->pushKey(project($record, $value->getKey()));
			$this->recordEditor->save($idPath, $record);
			$idPath->popKey();
		}
		else 
			$this->controller->add($idPath->getKeyStack(), $this->recordEditor->getAddValue($idPath));
	}

	public function setRecordEditor($recordEditor) {
		$this->recordEditor = $recordEditor;
		$this->editors[0] = $recordEditor;
	}
}

class ObjectPathEditor extends Viewer {	
	public function view($idPath, $value) {
		return $this->resolveObject($value);
	}
	
	protected function resolveObject($objectId) {
		$tableName = getTableNameWithObjectId($objectId);
		
		if ($tableName != "") {
			switch ($tableName) {
				case "uw_meaning_relations": 
					$result = $this->resolveRelation($objectId);
					break;
				case "uw_text_attribute_values":
				case "uw_url_attribute_values":
				case "uw_translated_text_attribute_values":
				case "uw_option_attribute_values":
					$result = $this->resolveAttribute($objectId, $tableName);
					break;
				case "translated_content":
					$result = $this->resolveTranslatedContent($objectId);
					break;
				case "uw_syntrans":
					$result = $this->resolveSyntrans($objectId);
					break;
				case "uw_defined_meaning":
					$result = $this->resolveDefinedMeaning($objectId);
					break;
				default:
					$result = $tableName . " - " . $objectId; 
			}
		}
		else
			$result = "Object $objectId";

		return $result;
	}
	
	protected function resolveRelation($objectId) {
		$dbr = &wfGetDB(DB_SLAVE);
		$queryResult = $dbr->query(
			"SELECT meaning1_mid, relationtype_mid, meaning2_mid" .
			" FROM uw_meaning_relations" .
			" WHERE relation_id=$objectId"
		);

		if ($relation = $dbr->fetchObject($queryResult))
			return
				definedMeaningAsLink($relation->meaning1_mid) . " - " .
				definedMeaningAsLink($relation->relationtype_mid) . " - " .
				definedMeaningAsLink($relation->meaning2_mid);		
		else	
			return "Relation " . $objectId;
	}
	
	protected function resolveAttribute($objectId, $tableName) {
		$dbr = &wfGetDB(DB_SLAVE);
		$queryResult = $dbr->query(
			"SELECT object_id, attribute_mid" .
			" FROM " . $tableName .
			" WHERE value_id=$objectId"
		);

		if ($attribute = $dbr->fetchObject($queryResult))
			return
				$this->resolveObject($attribute->object_id) . " > " .
				definedMeaningAsLink($attribute->attribute_mid); 
		else	
			return "Attribute " . $objectId;
	}

	protected function resolveTranslatedContent($objectId) {
		$dbr = &wfGetDB(DB_SLAVE);
		$queryResult = $dbr->query(
			"SELECT defined_meaning_id" .
			" FROM uw_defined_meaning" .
			" WHERE meaning_text_tcid=$objectId"
		);

		if ($definedMeaning = $dbr->fetchObject($queryResult))
			return
				definedMeaningAsLink($definedMeaning->defined_meaning_id) . " > Definition "; 
		else	
			return "Translated content " . $objectId;
	}

	protected function resolveSyntrans($objectId) {
		$dbr = &wfGetDB(DB_SLAVE);
		$queryResult = $dbr->query(
			"SELECT spelling, defined_meaning_id" .
			" FROM uw_syntrans, uw_expression_ns" .
			" WHERE syntrans_sid=$objectId" .
			" AND uw_syntrans.expression_id=uw_expression_ns.expression_id"
		);

		if ($syntrans = $dbr->fetchObject($queryResult))
			return
				 definedMeaningAsLink($syntrans->defined_meaning_id) . " > " . spellingAsLink($syntrans->spelling); 
		else	
			return "Syntrans " . $objectId;
	}
	
	protected function resolveDefinedMeaning($definedMeaningId) {
		return definedMeaningAsLink($definedMeaningId);
	}

	public function showsData($value) {
		return true;
	}
}

class GotoSourceEditor extends Viewer {	
	public function view($idPath, $value) {
		global
			$sourceIdentifierAttribute, $collectionIdAttribute, $wgGotoSourceTemplates;
		
		$collectionId = $value->getAttributeValue($collectionIdAttribute);			
		$sourceIdentifier = $value->getAttributeValue($sourceIdentifierAttribute);

		$gotoSourceTemplate = $wgGotoSourceTemplates[$collectionId];
		
		if ($gotoSourceTemplate != null) {	
			$url = $gotoSourceTemplate->getURL($sourceIdentifier);
			return '<a href="'. htmlspecialchars($url) . '">Go to source</a>';
		}	
		else
			return "";
		
	}
	
	public function showsData($value) {
		return true;
	}
}

?>
