<?php

/**
 * LR parser for inline scripts.
 * Inputs tokens and LR table (ACTION/GOTO).
 * Outputs parser tree.
 * 
 * See http://en.wikipedia.org/wiki/LR_parser for details of how does that works.
 */

require_once( 'LRTableVersion.php' );

class ISLRParser implements ISParser {
	const Shift = 0;
	const Reduce = 1;
	const Accept = 2;

	var $mLoaded, $mNonterminals, $mProductions, $mAction, $mGoto;

	public static function getVersion() {
		return IS_LR_VERSION;
	}

	private function loadGrammar() {
		wfProfileIn( __METHOD__ );

		if( $this->mLoaded )
			return;

		require_once( 'LRTable.php' );

		$this->mNonterminals = ISLRTable::$nonterminals;
		$this->mProductions = ISLRTable::$productions;
		$this->mAction = ISLRTable::$action;
		$this->mGoto = ISLRTable::$goto;
		$this->mLoaded = true;
		
		wfProfileOut( __METHOD__ );
	}

	public function needsScanner() {
		return true;
	}

	public function parse( $scanner, $module, $maxTokens ) {
		$this->loadGrammar();

		$states = array( array( null, 0 ) );
		$scanner->rewind();
		$tokenCount = 0;

		wfProfileIn( __METHOD__ );

		for( ; ; ) {
			$token = $scanner->current();
			$cur = $token->type;
			if( !$token ) {
				wfProfileOut( __METHOD__ );
				throw new ISException( 'Non-token input in LRParser::parse' );
			}

			$tokenCount++;
			if( $tokenCount > $maxTokens ) {
				wfProfileOut( __METHOD__ );
				throw new ISUserVisibleException( 'toomanytokens', $module, $token->line );
			}

			list( $stateval, $state ) = end( $states );
			$act = @$this->mAction[$state][$cur];
			if( !$act ) {
				wfProfileOut( __METHOD__ );
				throw new ISUserVisibleException( 'unexceptedtoken', $module, $token->line,
					array( $token, implode( ', ', array_keys( @$this->mAction[$state] ) ), $state ) );
			}
			if( $act[0] == self::Shift ) {
					$states[] = array( $token, $act[1] );
					$scanner->next();
			} elseif( $act[0] == self::Reduce ) {
					list( $nonterm, $prod ) = $this->mProductions[$act[1]];
					$len = count( $prod );

					// Change state
					$str = array();
					for( $i = 0; $i < $len; $i++ )
						$str[] = array_pop( $states );
					$str = array_reverse( $str );
					list( $stateval, $state ) = end( $states );

					$node = new ISParserTreeNode( $this, $nonterm );
					foreach( $str as $symbol ) {
						list( $val ) = $symbol;
						$node->addChild( $val );
					}
					$states[] = array( $node, $this->mGoto[$state][$nonterm] );
			} elseif( $act[0] == self::Accept ) {
					break;
			}
		}

		wfProfileOut( __METHOD__ );

		return new ISParserOutput( $states[1][0], $tokenCount );
	}
}
