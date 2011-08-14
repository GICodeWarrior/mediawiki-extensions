<?php

abstract class ISCallStackEntry {
	abstract function toString();
}

abstract class ISCallStackFunctionEntry extends ISCallStackEntry {
	public $module;
	public $function;
}

class ISCallStackFunctionFromModuleEntry extends ISCallStackFunctionEntry {
	public $invokingModule;
	public $line;
	
	public function toString() {
		return wfMsg( 'inlinescripts-call-frommodule', $this->module, $this->function,
			$this->invokingModule, $this->line );
	}
}

class ISCallStackFunctionFromWikitextEntry extends ISCallStackFunctionEntry {
	public function toString() {
		return wfMsg( 'inlinescripts-call-frommodule', $this->module, $this->function );
	}
}

class ISCallStackParseEntry extends ISCallStackEntry {
	public $text;

	public function toString() {
		return wfMsg( 'inlinescripts-call-parse', $this->text );
	}
}

class ISCallStack {
	var $mInterpreter, $mStack;

	public function __construct( $interpreter ) {
		$this->mInterpreter = $interpreter;
		$this->mStack = array();
	}

	public function pop() {
		array_pop( $this->mStack );
	}

	public function isFull() {
		global $wgInlineScriptsMaxCallStackDepth;
	}

	public function contains( $module, $name ) {
		foreach( $this->mStack as $entry ) {
			if( $entry instanceof ISCallStackFunctionEntry ) {
				if( $entry->module == $module && $entry->function == $name ) {
					return true;
				}
			}
		}
		return false;
	}

	public function addFunctionFromModule( $module, $name, $invokingModule, $line ) {
		$entry = new ISCallStackFunctionFromModuleEntry();
		$entry->module = $module;
		$entry->function = $name;
		$entry->invokingModule = $invokingModule;
		$entry->line = $line;
		$this->mStack[] = $entry;
	}

	public function addFunctionFromWikitext( $module, $name ) {
		$entry = new ISCallStackFunctionFromWikitextEntry();
		$entry->module = $module;
		$entry->function = $name;
		$this->mStack[] = $entry;
	}

	public function addParse( $wikitext ) {
		if( strlen( $wikitext ) > 64 ) {
			$wikitext = substr( $wikitext, 0, 64 ) . "...";
		}

		$entry = new ISCallStackParseEntry();
		$entry->text = $wikitext;
		$this->mStack[] = $entry;
	}
}
