<?php
/**
 * Built-in scripting language for MediaWiki.
 * Copyright (C) 2009-2011 Victor Vasiliev <vasilvv@gmail.com>
 * http://www.mediawiki.org/
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 */

if( !defined( 'MEDIAWIKI' ) )
	die();

/**
 * An internal class used by InlineScript. Used to evaluate a parsed code
 * in a sepereate context with its own output, variables and parser frame.
 * 
 * Handles evaluation of an individual functions.
 */
class ISEvaluationContext {
	var $mVars, $mFrame, $mName, $mInterpreter, $mModule;

	var $mOutput, $mListOutput;

	static $mFunctions = array(
		/* String functions */
		'lc' => 'funcLc',
		'uc' => 'funcUc',
		'ucfirst' => 'funcUcFirst',
		'urlencode' => 'funcUrlencode',
		'grammar' => 'funcGrammar',
		'plural' => 'funcPlural',
		'anchorencode' => 'funcAnchorEncode',
		'strlen' => 'funcStrlen',
		'substr' => 'funcSubstr',
		'strreplace' => 'funcStrreplace',
		'split' => 'funcSplit', 

		/* Array functions */
		'join' => 'funcJoin',
		'count' => 'funcCount',

		/* Parser interaction functions */
		'arg' => 'funcArg',
		'args' => 'funcArgs',
		'isTranscluded' => 'funcIsTranscluded',
		'parse' => 'funcParse',

		/* Cast functions */
		'string' => 'castString',
		'int' => 'castInt',
		'float' => 'castFloat',
		'bool' => 'castBool',
	);

	public function __construct( $interpreter, $module, $name, $frame ) {
		$this->mVars = array();
		$this->mOut = '';
		$this->mModule = $module;
		$this->mModuleName = $module->getName();
		$this->mName = $name;
		$this->mInterpreter = $interpreter;
		$this->mParser = $interpreter->getParser();
		$this->mFrame = $frame;

		$this->mOutput = new ISData();
		$this->mListOutput = array();
	}

	public function getModule() {
		return $this->mModule;
	}
	
	public function getFrame() {
		return $this->mFrame;
	}

	public function getOutput() {
		if( $this->mOutput->type != ISData::DNull ) {
			return $this->mOutput;
		} elseif( $this->mListOutput ) {
			return new ISData( ISData::DList, $this->mListOutput );
		} else {
			return new ISData();
		}
	}

	public function setArgument( $name, $value ) {
		$this->mVars[$name] = $value->dup();
	}

	/**
	 * The core interpreter method. Evaluates a single AST node.
	 * The $rec parameter must be increated by 1 each time the function is called
	 * recursively.
	 */
	public function evaluateNode( $node, $rec ) {
		if( !$node instanceof ISParserTreeNode ) {
			throw new ISException( 'evaluateNode() accepts only nonterminals' );
		}

		if( !$this->mInterpreter->checkRecursionLimit( $rec ) ) {
			throw new ISUserVisibleException( 'recoverflow', $this->mModuleName, $this->getLine( $node ) );
		}

		$c = $node->getChildren();
		switch( $node->getType() ) {
			case 'stmts':
				$stmts = array();
				while( isset( $c[1] ) ) {
					array_unshift( $stmts, $c[1] );
					$c = $c[0]->getChildren();
				}
				array_unshift( $stmts, $c[0] );
				foreach( $stmts as $stmt )
					$res = $this->evaluateNode( $stmt, $rec + 1 );
				return $res;
			case 'stmt':
				if( $c[0] instanceof ISToken ) {
					switch( $c[0]->type ) {
						case 'leftcurly':
							return $this->evaluateNode( $c[1], $rec + 1 );
						case 'if':
							$cond = $this->evaluateNode( $c[2], $rec + 1 );
							if( $cond->toBool() ) {
								return $this->evaluateNode( $c[4], $rec + 1 );
							} else {
								if( isset( $c[6] ) ) {
									return $this->evaluateNode( $c[6], $rec + 1 );
								} else {
									return new ISData();
								}
							}
						case 'for':
							$array = $this->evaluateNode( $c[4], $rec + 1 );
							if( !$array->isArray() )
								throw new ISUserVisibleException( 'invalidforeach', $this->mModuleName, $c[0]->line );
							$last = new ISData();
							$lvalues =  $c[2]->getChildren();

							foreach( $array->data as $key => $item ) {
								// <forlvalue> ::= <lvalue> | <lvalue> colon <lvalue>
								if( count( $lvalues ) > 1 ) {
									$this->setVar( $lvalues[0], ISData::newFromPHPVar( $key ), $rec );
									$this->setVar( $lvalues[2], $item, $rec );
								} else {
									$this->setVar( $lvalues[0], $item, $rec );
								}
								try {
									$last = $this->evaluateNode( $c[6], $rec + 1 );
								} catch( ISUserVisibleException $e ) {
									if( $e->getExceptionID() == 'break' )
										break;
									elseif( $e->getExceptionID() == 'continue' )
										continue;
									else
										throw $e;
								}
							}
							return $last;
						case 'try':
							try {
								return $this->evaluateNode( $c[1], $rec + 1 );
							} catch( ISUserVisibleException $e ) {
								if( $e instanceof ISControlException ) {
									throw $e;
								} else {
									$this->setVar( $c[4], new ISData( ISData::DString, $e->getExceptionID() ), $rec );
									return $this->evaluateNode( $c[6], $rec + 1 );
								}
							}
						default:
							throw new ISException( "Unknown keyword: {$c[0]->type}" );
					}
				} else {
					return $this->evaluateNode( $c[0], $rec + 1 );
				}
			case 'exprreturn':
				switch( $c[0]->value ) {
					case 'return':
						if( isset( $c[1] ) ) {
							$retval = $this->evaluateNode( $c[1], $rec + 1 );
							$empty = false;
						} else {
							$retval = new ISData();
							$empty = true;
						}
						throw new ISReturnException( $retval, $empty );
					case 'append':
						if( $this->mListOutput ) {
							throw new ISUserVisibleException( 'appendyield', $this->mModuleName, $c[0]->line );
						}

						$this->mOutput = ISData::sum( $this->mOutput, $this->evaluateNode( $c[1], $rec + 1 ) );
						break 2;
					case 'yield':
						if( $this->mOutput->type != ISData::DNull ) {
							throw new ISUserVisibleException( 'appendyield', $this->mModuleName, $c[0]->line );
						}

						$this->mListOutput[] = $this->evaluateNode( $c[1], $rec + 1 );
						break 2;
					default:
						throw new ISException( "Unknown return keyword: {$c[0]->value}" );
				}
			case 'exprset':
				$this->mInterpreter->increaseEvaluationsCount( $this->mModuleName, $c[1]->line );
				if( $c[1]->value == '=' ) {
					$new = $this->evaluateNode( $c[2], $rec + 1 );
					$this->setVar( $c[0], $new, $rec );
					return $new;
				} else {
					$old = $this->getVar( $c[0], $rec, false );
					$new = $this->evaluateNode( $c[2], $rec + 1 );
					$new = $this->getValueForSetting( $old, $new,
						$c[1]->value, $c[1]->line );
					$this->setVar( $c[0], $new, $rec );
					return $new;
				}
			case 'exprtrinary':
				$cond = $this->evaluateNode( $c[0], $rec + 1 );
				if( $cond->toBool() ) {
					return $this->evaluateNode( $c[2], $rec + 1 );
				} else {
					return $this->evaluateNode( $c[4], $rec + 1 );
				}
			case 'exprlogical':
				$this->mInterpreter->increaseEvaluationsCount( $this->mModuleName, $c[1]->line );
				$arg1 = $this->evaluateNode( $c[0], $rec + 1 );
				switch( $c[1]->value ) {
					case '&':
						if( !$arg1->toBool() )
							return new ISData( ISData::DBool, false );
						else
							return $this->evaluateNode( $c[2], $rec + 1 );
					case '|':
						if( $arg1->toBool() )
							return new ISData( ISData::DBool, true );
						else
							return $this->evaluateNode( $c[2], $rec + 1 );
					case '^':
						$arg2 = $this->evaluateNode( $c[2], $rec + 1 );
						return new ISData( ISData::DBool, $arg1->toBool() xor $arg2->toBool() );
					default:
						throw new ISException( "Invalid logical operation: {$c[1]->value}" );
				}
			case 'exprequals':
			case 'exprcompare':
				$this->mInterpreter->increaseEvaluationsCount( $this->mModuleName, $c[1]->line );
				$arg1 = $this->evaluateNode( $c[0], $rec + 1 );
				$arg2 = $this->evaluateNode( $c[2], $rec + 1 );
				return ISData::compareOp( $arg1, $arg2, $c[1]->value );
			case 'exprsum':
				$this->mInterpreter->increaseEvaluationsCount( $this->mModuleName, $c[1]->line );
				$arg1 = $this->evaluateNode( $c[0], $rec + 1 );
				$arg2 = $this->evaluateNode( $c[2], $rec + 1 );
				switch( $c[1]->value ) {
					case '+':
						return ISData::sum( $arg1, $arg2 );
					case '-':
						return ISData::sub( $arg1, $arg2 );
				}
			case 'exprmul':
				$this->mInterpreter->increaseEvaluationsCount( $this->mModuleName, $c[1]->line );
				$arg1 = $this->evaluateNode( $c[0], $rec + 1 );
				$arg2 = $this->evaluateNode( $c[2], $rec + 1 );
				return ISData::mulRel( $arg1, $arg2, $c[1]->value, $this->mModuleName, $c[1]->line );
			case 'exprpow':
				$this->mInterpreter->increaseEvaluationsCount( $this->mModuleName, $c[1]->line );
				$arg1 = $this->evaluateNode( $c[0], $rec + 1 );
				$arg2 = $this->evaluateNode( $c[2], $rec + 1 );
				return ISData::pow( $arg1, $arg2 );
			case 'exprkeyword':
				$this->mInterpreter->increaseEvaluationsCount( $this->mModuleName, $c[1]->line );
				$arg1 = $this->evaluateNode( $c[0], $rec + 1 );
				$arg2 = $this->evaluateNode( $c[2], $rec + 1 );
				switch( $c[1]->value ) {
					case 'in':
						return ISData::keywordIn( $arg1, $arg2 );
					case 'contains':
						return ISData::keywordIn( $arg2, $arg1 );
					default:
						throw new ISException( "Invalid keyword: {$c[1]->value}" );
				}
			case 'exprinvert':
				$this->mInterpreter->increaseEvaluationsCount( $this->mModuleName, $c[0]->line );
				$arg = $this->evaluateNode( $c[1], $rec + 1 );
				return ISData::boolInvert( $arg );
			case 'exprunary':
				$this->mInterpreter->increaseEvaluationsCount( $this->mModuleName, $c[0]->line );
				$arg = $this->evaluateNode( $c[1], $rec + 1 );
				if( $c[0]->value == '-' )
					return ISData::unaryMinus( $arg );
				else
					return $arg;
			case 'exprfunction':
				// <exprFunction> ::= <funcid> leftbracket <commaListPlain> rightbracket | <funcid> leftbracket rightbracket
				// <exprFunction> ::= <varfunc> leftbracket <lvalue> rightbracket | <exprAtom>
				// <varfunc> ::= isset | delete
				// <funcid> ::= id | <exprAtom> doublecolon id | self doublecolon id

				$this->mInterpreter->increaseEvaluationsCount( $this->mModuleName, $c[1]->line );
				if( $c[0]->getType() == 'funcid' ) {
					if( $c[2] instanceof ISParserTreeNode ) {
						$args = $this->parseArray( $c[2], $rec, $dummy );
					} else {
						$args = array();
					}

					$idch = $c[0]->getChildren();
					if( count( $idch ) == 1 ) {
						$funcname = $idch[0]->value;
						if( !isset( self::$mFunctions[$funcname] ) ) 
							throw new ISUserVisibleException( 'unknownfunction', $this->mModuleName, $idch[0]->line, array( $funcname ) );
						$func = self::$mFunctions[$funcname];
						return $this->$func( $args, $idch[0]->line );
					} else {
						$funcname = $idch[2]->value;
						if( $idch[0] instanceof ISToken ) {
							// self::function()
							$module = $this->mModule;
						} else {
							// "ModuleName"::function()
							$module = $this->evaluateNode( $idch[0], $rec + 1 )->toString();
						}
						return $this->mInterpreter->invokeUserFunctionFromModule(
							$module, $funcname, $args, $this, $idch[1]->line );
					}
				} else {
					$type = $c[0]->mChildren[0]->value;
					switch( $type ) {
						case 'isset':
							$val = $this->getVar( $c[2], $rec, true );
							return new ISData( ISData::DBool, $val !== null );
						case 'delete':
							$this->deleteVar( $c[2], $rec );
							return new ISData();
						default:
							throw new ISException( "Unknown keyword: {$type}" );
					}
				}
			case 'expratom':
				if( $c[0] instanceof ISParserTreeNode ) {
					if( $c[0]->getType() == 'atom' ) {
						list( $val ) = $c[0]->getChildren();
						switch( $val->type ) {
							case 'string':
								return new ISData( ISData::DString, $val->value );
							case 'int':
								return new ISData( ISData::DInt, $val->value );
							case 'float':
								return new ISData( ISData::DFloat, $val->value );
							case 'true':
								return new ISData( ISData::DBool, true );
							case 'false':
								return new ISData( ISData::DBool, false );
							case 'null':
								return new ISData();
						}
					} else {
						return $this->getVar( $c[0], $rec );
					}
				} else {
					switch( $c[0]->type ) {
						case 'leftbracket':
							return $this->evaluateNode( $c[1], $rec + 1 );
						case 'leftsquare':
						case 'leftcurly':
							$arraytype = null;
							$array = $this->parseArray( $c[1], $rec + 1, $arraytype );
							return new ISData( $arraytype, $array );
						case 'break':
							throw new ISControlException( 'break', $this->mModuleName, $c[0]->line );
						case 'continue':
							throw new ISControlException( 'continue', $this->mModuleName, $c[0]->line );
					}
				}
			default:
				$type = $node->getType();
				throw new ISException( "Invalid node type passed to evaluateNode(): {$type}" );
		}
	}

	/*
	 * Converts commaList* to a PHP array.
	 */
	protected function parseArray( $node, $rec, &$arraytype ) {
		$c = $node->getChildren();
		$type = $node->getType();
		if( $type == 'commalist' ) {
			return $this->parseArray( $c[0], $rec, $arraytype );
		}

		wfProfileIn( __METHOD__ );

		// <commaListWhatever> ::= <commaListWhatever> comma <expr> | <expr>
		$elements = $result = array();
		while( isset( $c[2] ) ) {
			array_unshift( $elements, $c[2] );
			$c = $c[0]->getChildren();
		}
		array_unshift( $elements, $c[0] );

		switch( $type ) {
			case 'commalistplain':
				foreach( $elements as $elem ) {
					$result[] = $this->evaluateNode( $elem, $rec + 1 );
				}

				$arraytype = ISData::DList;
				wfProfileOut( __METHOD__ );
				return $result;

			case 'commalistassoc':
				foreach( $elements as $elem ) {
					//<keyValue> ::= <expr> colon <expr>
					list( $key, $crap, $value ) = $elem->getChildren();
					$key = $this->evaluateNode( $key, $rec + 1 );
					$value = $this->evaluateNode( $value, $rec + 1 );
					$result[ $key->toString() ] = $value;
				}
				
				$arraytype = ISData::DAssoc;
				wfProfileOut( __METHOD__ );
				return $result;
		}
	}

	/**
	 * Returns a value of the variable in $lval. If $nullIfNotSet is set to true,
	 * returns null if variable does not exist, otherwise throws an exception.
	 */
	protected function getVar( $lval, $rec, $nullIfNotSet = false ) {
		// <lvalue> ::= id | <lvalue> <arrayIdx>
		// <arrayIdx> ::= leftsquare <expr> rightsquare | leftsquare rightsquare

		if( !$this->mInterpreter->checkRecursionLimit( $rec ) ) {
			throw new ISUserVisibleException( 'recoverflow', $this->mModuleName, $this->getLine( $node ) );
		}

		$c = $lval->getChildren();
		if( $c[0] instanceof ISToken ) {
			// Variable ID
			$varname = $c[0]->value;
			if( !isset( $this->mVars[$varname] ) ) {
				if( $nullIfNotSet )
					return null;
				else
					throw new ISUserVisibleException( 'unknownvar', $this->mModuleName, $c[0]->line, array( $varname ) );
			}
			return $this->mVars[$varname];
		} else {
			// Array element
			$idxchildren = $c[1]->getChildren();
			$var = $this->getVar( $c[0], $rec + 1, $nullIfNotSet );
			if( $nullIfNotSet && $var === null )
				return null;

			if( count( $idxchildren ) == 2 ) {
				// x = a[]. a[] is still legitimage in a[] = x
				throw new ISUserVisibleException( 'emptyidx', $this->mModuleName, $idxchildren[0]->line );
			}

			switch( $var->type ) {
				case ISData::DList:
					$idx = $this->evaluateNode( $idxchildren[1], $rec + 1 )->toInt();
					if( $idx >= count( $var->data ) ) {
						if( $nullIfNotSet )
							return null;
						else
							throw new ISUserVisibleException( 'outofbounds', $this->mModuleName, $idxchildren[0]->line );
					}
					return $var->data[$idx];
				case ISData::DAssoc:
					$idx = $this->evaluateNode( $idxchildren[1], $rec + 1 )->toString();
					if( !isset( $var->data[$idx] ) ) {
						if( $nullIfNotSet )
							return null;
						else
							throw new ISUserVisibleException( 'outofbounds', $this->mModuleName, $idxchildren[0]->line );
					}
					return $var->data[$idx];
				default:
					throw new ISUserVisibleException( 'notanarray', $this->mModuleName, $idxchildren[0]->line );
			}
		}
	}

	/**
	 * Gets the line of the first terminal in the node.
	 */
	protected function getLine( $node ) {
		while( $node instanceof ISParserTreeNode ) {
			$children = $node->getChildren();
			$node = $children[0];
		}
		return $node->line;
	}

	/**
	 * Changes the value of variable or array element specified in $lval to $newval.
	 */
	protected function setVar( $lval, $newval, $rec ) {
		$var = &$this->setVarGetRef( $lval, $rec );
		$var = $newval;
		unset( $var );
	}

	/**
	 * Recursive function that return the link to the place
	 * where the new value of the variable must be set.
	 */
	protected function &setVarGetRef( $lval, $rec ) {
		if( !$this->mInterpreter->checkRecursionLimit( $rec ) ) {
			throw new ISUserVisibleException( 'recoverflow', $this->mModuleName, $this->getLine( $node ) );
		}

		$c = $lval->getChildren();
		if( count( $c ) == 1 ) {
			if( !isset( $this->mVars[ $c[0]->value ] ) )
				$this->mVars[ $c[0]->value ] = new ISPlaceholder();
			return $this->mVars[ $c[0]->value ];
		} else {
			$ref = &$this->setVarGetRef( $c[0], $rec + 1 );

			// <arrayIdx> ::= leftsquare <expr> rightsquare | leftsquare rightsquare
			$idxc = $c[1]->getChildren();
			if( $ref instanceof ISPlaceholder ) {
				if( count( $idxc ) > 2 ) {
					$index = $this->evaluateNode( $idxc[1], $rec + 1 );
					$ref = new ISData( ISData::DAssoc, array() );
				} else {
					$ref = new ISData( ISData::DList, array() );
				}
			}

			switch( $ref->type ) {
				case ISData::DList:
					if( count( $idxc ) > 2 ) {
						$index = $this->evaluateNode( $idxc[1], $rec + 1 );
						$key = $index->toInt();

						if( $key < 0 || $key > count( $ref->data ) )
							throw new ISUserVisibleException( 'outofbounds', $this->mModuleName, $idxc[0]->line );
					} else {
						$key = count( $ref->data );
					}

					if( !isset( $ref->data[$key] ) )
						$ref->data[$key] = new ISPlaceholder();

					return $ref->data[$key];
				case ISData::DAssoc:
					if( count( $idxc ) > 2 ) {
						if( !isset( $index ) )
							$index = $this->evaluateNode( $idxc[1], $rec + 1 );
						$key = $index->toString();

						if( !isset( $ref->data[$key] ) )
							$ref->data[$key] = new ISPlaceholder();
						return $ref->data[$key];
					} else {
						throw new ISUserVisibleException( 'notlist', $this->mModuleName, $idxc[0]->line );
					}
					break;
				default:
					throw new ISUserVisibleException( 'notanarray', $this->mModuleName, $idxc[0]->line );
			}
		}
	}

	protected function getValueForSetting( $old, $new, $set, $line ) {
		switch( $set ) {
			case '+=':
				return ISData::sum( $old, $new );
			case '-=':
				return ISData::sub( $old, $new );
			case '*=':
				return ISData::mulRel( $old, $new, '*', $line );
			case '/=':
				return ISData::mulRel( $old, $new, '/', $line );
			default:
				return $new;
		}
	}

	protected function checkParamsCount( $args, $pos, $count ) {
		if( count( $args ) < $count )
			throw new ISUserVisibleException( 'notenoughargs', $this->mModuleName, $pos );
	}
	
	protected function deleteVar( $lval, $rec ) {
		$c = $lval->getChildren();
		$line = $c[0]->line;
		$varname = $c[0]->value;
		if( isset( $c[1] ) ) {
			throw new ISException( 'delete() is not usable for array elements' );
		}
		unset( $this->mVars[$varname] );
	}

	/** Functions */
	protected function funcArg( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 1 );

		$argName = $args[0]->toString();
		$default = isset( $args[1] ) ? $args[1] : new ISData();
		if( $this->mFrame->getArgument( $argName ) === false )
			return $default;
		else
			return new ISData( ISData::DString, $this->mFrame->getArgument( $argName ) );
	}

	protected function funcArgs( $args, $pos ) {
		return ISData::newFromPHPVar( $this->mFrame->getNumberedArguments() );
	}

	protected function funcIsTranscluded( $args, $pos ) {
		return new ISData( ISData::DBool, $this->mFrame->isTemplate() );
	}

	protected function funcParse( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 1 );

		$text = $args[0]->toString();
		$this->mInterpreter->mCallStack->addParse( $text );

		$oldOT = $this->mParser->mOutputType;
		$this->mParser->setOutputType( Parser::OT_PREPROCESS );
		$parsed = $this->mParser->replaceVariables( $text, $this->mFrame );
		$parsed = $this->mParser->mStripState->unstripBoth( $parsed );
		$this->mParser->setOutputType( $oldOT );

		$this->mInterpreter->mCallStack->pop();
		return new ISData( ISData::DString, $parsed );
	}
	
	protected function funcLc( $args, $pos ) {
		global $wgContLang;
		$this->checkParamsCount( $args, $pos, 1 );
		return new ISData( ISData::DString, $wgContLang->lc( $args[0]->toString() ) );
	}

	protected function funcUc( $args, $pos ) {
		global $wgContLang;
		$this->checkParamsCount( $args, $pos, 1 );
		return new ISData( ISData::DString, $wgContLang->uc( $args[0]->toString() ) );
	}

	protected function funcUcFirst( $args, $pos ) {
		global $wgContLang;
		$this->checkParamsCount( $args, $pos, 1 );
		return new ISData( ISData::DString, $wgContLang->ucfirst( $args[0]->toString() ) );
	}

	protected function funcUrlencode( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 1 );
		return new ISData( ISData::DString, urlencode( $args[0]->toString() ) );
	}

	protected function funcAnchorEncode( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 1 );

		$s = urlencode( $args[0]->toString() );
		$s = strtr( $s, array( '%' => '.', '+' => '_' ) );
		$s = str_replace( '.3A', ':', $s );

		return new ISData( ISData::DString, $s );
	}

	protected function funcGrammar( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 2 );
		list( $case, $word ) = $args;
		$res = $this->mParser->getFunctionLang()->convertGrammar(
			$word->toString(), $case->toString() );
		return new ISData( ISData::DString, $res );
	}

	protected function funcPlural( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 2 );
		$num = $args[0]->toInt();
		for( $i = 1; $i < count( $args ); $i++ )
			$forms[] = $args[$i]->toString();
		$res = $this->mParser->getFunctionLang()->convertPlural( $num, $forms );
		return new ISData( ISData::DString, $res );
	}

	protected function funcStrlen( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 1 );
		return new ISData( ISData::DInt, mb_strlen( $args[0]->toString() ) );
	}

	protected function funcSubstr( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 3 );
		$s = $args[0]->toString();
		$start = $args[1]->toInt();
		$end = $args[2]->toInt();
		return new ISData( ISData::DString, mb_substr( $s, $start, $end ) );
	}

	protected function funcStrreplace( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 3 );
		$s = $args[0]->toString();
		$old = $args[1]->toString();
		$new = $args[2]->toString();
		return new ISData( ISData::DString, str_replace( $old, $new, $s ) );
	}

	protected function funcSplit( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 2 );
		$list = explode( $args[0]->toString(), $args[1]->toString() );
		return ISData::newFromPHPVar( $list );
	}

	protected function funcJoin( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 2 );
		$seperator = $args[0]->toString();
		if( $args[1]->type == ISData::DList ) {
			$bits = $args[1]->data;
		} else {
			$bits = array_slice( $args, 1 );
		}
		foreach( $bits as &$bit )
			$bit = $bit->toString();
		return new ISData( ISData::DString, implode( $seperator, $bits ) );
	}

	protected function funcCount( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 1 );
		return new ISData( ISData::DInt, count( $args[0]->toList()->data ) );
	}

	protected function castString( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 1 );
		return ISData::castTypes( $args[0], ISData::DString );
	}
	
	protected function castInt( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 1 );
		return ISData::castTypes( $args[0], ISData::DInt );
	}

	protected function castFloat( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 1 );
		return ISData::castTypes( $args[0], ISData::DFloat );
	}
	
	protected function castBool( $args, $pos ) {
		$this->checkParamsCount( $args, $pos, 1 );
		return ISData::castTypes( $args[0], ISData::DBool );
	}
}
