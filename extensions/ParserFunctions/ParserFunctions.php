<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}

$wgExtensionFunctions[] = 'wfSetupParserFunctions';
$wgExtensionCredits['parserhook'][] = array(
	'name' => 'ParserFunctions',
	'url' => 'http://meta.wikimedia.org/wiki/ParserFunctions',
	'author' => 'Tim Starling',
	'description' => 'Enhance parser with logical functions',
);

$wgHooks['LanguageGetMagic'][]       = 'wfParserFunctionsLanguageGetMagic';

class ExtParserFunctions {
	var $mExprParser;
	var $mTimeCache = array();
	var $mTimeChars = 0;
	var $mMaxTimeChars = 6000; # ~10 seconds

	function clearState() {
		$this->mTimeChars = 0;
		return true;
	}

	function &getExprParser() {
		if ( !isset( $this->mExpr ) ) {
			if ( !class_exists( 'ExprParser' ) ) {
				require( dirname( __FILE__ ) . '/Expr.php' );
				ExprParser::addMessages();
			}
			$this->mExprParser = new ExprParser;
		}
		return $this->mExprParser;
	}

	function expr( &$parser, $expr = '' ) {
		try {
			return $this->getExprParser()->doExpression( $expr );
		} catch(ExprError $e) {
			return $e->getMessage();
		}
	}

	function ifexpr( &$parser, $expr = '', $then = '', $else = '' ) {
		try{
			if($this->getExprParser()->doExpression( $expr )) {
				return $then;
			} else {
				return $else;
			}
		} catch (ExprError $e){
			return $e->getMessage();
		}
	}

	function ifHook( &$parser, $test = '', $then = '', $else = '' ) {
		if ( $test !== '' ) {
			return $then;
		} else {
			return $else;
		}
	}

	function ifeq( &$parser, $left = '', $right = '', $then = '', $else = '' ) {
		if ( $left == $right ) {
			return $then;
		} else {
			return $else;
		}
	}

	function switchHook( &$parser /*,...*/ ) {
		$args = func_get_args();
		array_shift( $args );
		$value = trim(array_shift($args));
		$found = false;
		$parts = null;
		$default = null;
		foreach( $args as $arg ) {
			$parts = array_map( 'trim', explode( '=', $arg, 2 ) );
			if ( count( $parts ) == 2 ) {
				if ( $found || $parts[0] == $value ) {
					return $parts[1];
				} else {
					$mwDefault =& MagicWord::get( 'default' );
					if ( $mwDefault->matchStartAndRemove( $parts[0] ) ) {
						$default = $parts[1];
					} # else wrong case, continue
				}
			} elseif ( count( $parts ) == 1 ) {
				# Multiple input, single output
				# If the value matches, set a flag and continue
				if ( $parts[0] == $value ) {
					$found = true;
				}
			} # else RAM corruption due to cosmic ray?
		}
		# Default case
		# Check if the last item had no = sign, thus specifying the default case
		if ( count( $parts ) == 1) {
			return $parts[0];
		} elseif ( !is_null( $default ) ) {
			return $default;
		} else {
			return '';
		}
	}

	/**
	 * Returns the absolute path to a subpage, relative to the current article
	 * title. Treats titles as slash-separated paths.
	 *
	 * Following subpage link syntax instead of standard path syntax, an 
	 * initial slash is treated as a relative path, and vice versa.
	 */
	public function rel2abs( &$parser , $to = '' , $from = '' ) {

		$from = trim($from);
		if( $from == '' ) {
			$from = $parser->getTitle()->getPrefixedText();
		}

		$to = rtrim( $to , ' /' );

		// if we have an empty path, or just one containing a dot
		if( $to == '' || $to == '.' ) {
			return $from;
		}

		// if the path isn't relative
		if ( substr( $to , 0 , 1) != '/' &&
		 substr( $to , 0 , 2) != './' &&
		 substr( $to , 0 , 3) != '../' &&
		 $to != '..' )
		{
			$from = '';
		}
		// Make a long path, containing both, enclose it in /.../
		$fullPath = '/' . $from . '/' .  $to . '/';

		// remove redundant current path dots
		$fullPath = preg_replace( '!/(\./)+!', '/', $fullPath );

		// remove double slashes
		$fullPath = preg_replace( '!/{2,}!', '/', $fullPath );

		// remove the enclosing slashes now
		$fullPath = trim( $fullPath , '/' );
		$exploded = explode ( '/' , $fullPath );
		$newExploded = array();

		foreach ( $exploded as $current ) {
			if( $current == '..' ) { // removing one level
				if( !count( $newExploded ) ){
					// attempted to access a node above root node
					return wfMsgForContent( 'pfunc_rel2abs_invalid_depth', $fullPath );
				}
				// remove last level from the stack
				array_pop( $newExploded );
			} else {
				// add the current level to the stack
				$newExploded[] = $current;
			}
		}

		// we can now join it again
		return implode( '/' , $newExploded );
	}

	function ifexist( &$parser, $title = '', $then = '', $else = '' ) {
		$title = Title::newFromText( $title );
		if ( $title ) {
			$id = $title->getArticleID();
			$parser->mOutput->addLink( $title, $id );
			if ( $id ) {
				return $then;
			}
		}
		return $else;
	}

	function time( &$parser, $format = '', $date = '' ) {
		global $wgContLang;
		if ( isset( $this->mTimeCache[$format][$date] ) ) {
			return $this->mTimeCache[$format][$date];
		}

		if ( $date !== '' ) {
			$unix = @strtotime( $date );
		} else {
			$unix = time();
		}

		if ( $unix == -1 || $unix == false ) {
			$result = wfMsgForContent( 'pfunc_time_error' );
		} else {
			$this->mTimeChars += strlen( $format );
			if ( $this->mTimeChars > $this->mMaxTimeChars ) {
				return wfMsgForContent( 'pfunc_time_too_long' );
			} else {
				$ts = wfTimestamp( TS_MW, $unix );
				if ( method_exists( $wgContLang, 'sprintfDate' ) ) {
					$result = $wgContLang->sprintfDate( $format, $ts );
				} else {
					if ( !class_exists( 'SprintfDateCompat' ) ) {
						require( dirname( __FILE__ ) . '/SprintfDateCompat.php' );
					}

					$result = SprintfDateCompat::sprintfDate( $format, $ts );
				}
			}
		}
		$this->mTimeCache[$format][$date] = $result;
		return $result;
	}
}

function wfSetupParserFunctions() {
	global $wgParser, $wgMessageCache, $wgExtParserFunctions, $wgMessageCache, $wgHooks;

	$wgExtParserFunctions = new ExtParserFunctions;

	$wgParser->setFunctionHook( 'expr', array( &$wgExtParserFunctions, 'expr' ) );
	$wgParser->setFunctionHook( 'if', array( &$wgExtParserFunctions, 'ifHook' ) );
	$wgParser->setFunctionHook( 'ifeq', array( &$wgExtParserFunctions, 'ifeq' ) );
	$wgParser->setFunctionHook( 'ifexpr', array( &$wgExtParserFunctions, 'ifexpr' ) );
	$wgParser->setFunctionHook( 'switch', array( &$wgExtParserFunctions, 'switchHook' ) );
	$wgParser->setFunctionHook( 'ifexist', array( &$wgExtParserFunctions, 'ifexist' ) );
	$wgParser->setFunctionHook( 'time', array( &$wgExtParserFunctions, 'time' ) );
	$wgParser->setFunctionHook( 'rel2abs', array( &$wgExtParserFunctions, 'rel2abs' ) );

	$wgMessageCache->addMessage( 'pfunc_time_error', "Error: invalid time" );
	$wgMessageCache->addMessage( 'pfunc_time_too_long', "Error: too many #time calls" );
	$wgMessageCache->addMessage( 'pfunc_rel2abs_invalid_depth', "Error: Invalid depth in path: \"$1\" (tried to access a node above the root node)" );

	$wgHooks['ParserClearState'][] = array( &$wgExtParserFunctions, 'clearState' );
}

function wfParserFunctionsLanguageGetMagic( &$magicWords, $langCode ) {
	switch ( $langCode ) {
		case 'he':
			$magicWords['expr']    = array( 0, 'חשב',         'expr' );
			$magicWords['if']      = array( 0, 'תנאי',        'if' );
			$magicWords['ifeq']    = array( 0, 'שווה',        'ifeq' );
			$magicWords['ifexpr']  = array( 0, 'חשב תנאי',    'ifexpr' );
			$magicWords['switch']  = array( 0, 'בחר',         'switch' );
			$magicWords['default'] = array( 0, '#ברירת מחדל', '#default' );
			$magicWords['ifexist'] = array( 0, 'קיים',         'ifexist' );
			$magicWords['time']    = array( 0, 'זמן',          'time' );
			$magicWords['rel2abs'] = array( 0, 'יחסי למוחלט',  'rel2abs' );
			break;
		default:
			$magicWords['expr']    = array( 0, 'expr' );
			$magicWords['if']      = array( 0, 'if' );
			$magicWords['ifeq']    = array( 0, 'ifeq' );
			$magicWords['ifexpr']  = array( 0, 'ifexpr' );
			$magicWords['switch']  = array( 0, 'switch' );
			$magicWords['default'] = array( 0, '#default' );
			$magicWords['ifexist'] = array( 0, 'ifexist' );
			$magicWords['time']    = array( 0, 'time' );
			$magicWords['rel2abs'] = array( 0, 'rel2abs' );
	}
	return true;
}

?>
