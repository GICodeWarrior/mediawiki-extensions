<?php

/**
 * 'Regex Fun' is a MediaWiki extension which adds parser functions for performing regular
 * expression searches and replacements.
 * 
 * Info on mediawiki.org: http://www.mediawiki.org/wiki/Extension:Regex_Fun
 * 
 * @version: 1.0.1
 * @license: ISC license
 * @author:  Daniel Werner < danweetz@web.de >
 * 
 * Documentation: http://www.mediawiki.org/wiki/Extension:Regex_Fun
 * Support:       http://www.mediawiki.org/wiki/Extension_talk:Regex_Fun
 * Source code:   http://svn.wikimedia.org/viewvc/mediawiki/trunk/extensions/RegexFun
 *
 * @file RegexFun.php
 * @ingroup RegexFun
 */

if ( ! defined( 'MEDIAWIKI' ) ) { die( ); }

/**** extension info ****/ 

$wgExtensionCredits['parserhook'][] = array(
	'path'           => __FILE__,
	'name'           => 'Regex Fun',
	'descriptionmsg' => 'regexfun-desc',
	'version'        => ExtRegexFun::VERSION,
	'author'         => '[http://www.mediawiki.org/wiki/User:Danwe Daniel Werner]',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:Regex_Fun',
);

$wgExtensionMessagesFiles['RegexFun'     ] = ExtRegexFun::getDir() . '/RegexFun.i18n.php';
$wgExtensionMessagesFiles['RegexFunMagic'] = ExtRegexFun::getDir() . '/RegexFun.i18n.magic.php';

$wgHooks['ParserFirstCallInit'][] = 'ExtRegexFun::init';
$wgHooks['ParserClearState'   ][] = 'ExtRegexFun::onParserClearState';


/**
 * Extension class with all the regex functions functionality
 * 
 * @since 1.0
 */
class ExtRegexFun {
	
	/**
	 * Version of the RegexFun extension.
	 * 
	 * @since 1.0
	 * 
	 * @var string
	 */
	const VERSION = '1.0.1';
	
    /**
     * Sets up parser functions
     */
	public static function init( &$parser ) {		
    	$parser->setFunctionHook( 'regex',       array( __CLASS__, 'regex'       ) );
		$parser->setFunctionHook( 'regex_var',   array( __CLASS__, 'regex_var'   ) );
    	$parser->setFunctionHook( 'regexall',    array( __CLASS__, 'regexall'    ) );
    	$parser->setFunctionHook( 'regexquote',  array( __CLASS__, 'regexquote'  ) );
    	$parser->setFunctionHook( 'regexascii',  array( __CLASS__, 'regexascii'  ) );
		
		return true;		
    }
	
	/**
	 * Returns the extensions base installation directory.
	 *
	 * @since 1.0
	 * 
	 * @return boolean
	 */
	public static function getDir() {		
		static $dir = null;
		
		if( $dir === null ) {
			$dir = dirname( __FILE__ );
		}
		return $dir;
	}
	
	
	const FLAG_NO_REPLACE_NO_OUT = 'r';
	const FLAG_REPLACEMENT_PARSE = 'e'; // overwrites php 'e' flag
	
	/**
	 * helper store for transmitting some values to a preg_replace_callback function
	 * 
	 * @var array
	 */
	private static $tmpRegexCB;
	
	/**
	 * Checks whether the given regular expression is valid or would cause an error.
	 * Also alters the pattern in case it would be a security risk and communicates
	 * about special flags which have no or different meaning in PHP. These will be
	 * removed from the original regex string but put into the &$specialFlags array.
	 * 
	 * @since 1.0
	 * 
	 * @param &$pattern String
	 * @param &$specialFlags array will contain all special flags the $pattern contains
	 * 
	 * @return Boolean
	 */
	public static function validateRegex( &$pattern, &$specialFlags = array() ) {		
		
		$specialFlags = array();
		
		if( strlen( $pattern ) < 2 ) {			
			return false;
		}
		
		$delimiter = substr( trim( $pattern ), 0, 1 );
		$delimiterQuoted = preg_quote( $delimiter, '/' );
		
		// two parts, split by the last delimiter
		$parts = preg_split( "/{$delimiterQuoted}(?=[^{$delimiterQuoted}]*$)/", $pattern, 2 );
		
		$mainPart  = $parts[0] . $delimiter; // delimiter to delimiter without flags
		$flagsPart = $parts[1];
		
		// remove 'e' modifier from final regex since it's a huge security risk with user input!
		self::regexSpecialFlagsHandler( $flagsPart, self::FLAG_REPLACEMENT_PARSE, $specialFlags );
		
		// marks #regex with replacement will output '' in case of no replacement
		self::regexSpecialFlagsHandler( $flagsPart, self::FLAG_NO_REPLACE_NO_OUT, $specialFlags );
		
		// put purified regex back together:
		$newPattern = $mainPart . $flagsPart;
		
		if( ! self::isValidRegex( $newPattern ) ) {
			// no modification to $pattern done!
			$specialFlags = array();
			return false;
		}
		$pattern = $newPattern; // remember reference!
		return true;
	}
	
	/**
	 * Returns whether the regular expression would be a valid one or not.
	 * 
	 * @since 1.0
	 * 
	 * @param $pattern string
	 * 
	 * @return boolean
	 */
	public static function isValidRegex( $pattern ) {
		//return (bool)preg_match( '/^([\\/\\|%]).*\\1[imsSuUx]*$/', $pattern );
		/*
		 * Testing of the pattern in a very simple way:
		 * This takes care of all invalid regular expression use and the ugly php notices
		 * which some other regex extensions for MW won't handle right.
		 */
		wfSuppressWarnings(); // instead of using the evil @ operator!
		$isValid = false !== preg_match( $pattern, ' ' ); // preg_match returns false on error
		wfRestoreWarnings();
		
		return $isValid;
	}
	
	/**
	 * Helper function to check a string of flags for a certain flag and set it as an array key
	 * in a special flags collecting array.
	 */
	private static function regexSpecialFlagsHandler( &$modifiers, $flag, &$specialFlags ) {
		$count = 0;
		$modifiers = preg_replace( "/{$flag}/", '', $modifiers, -1, $count );
		if( $count > 0 ) {
			$specialFlags[ $flag ] = true;
			return true;
		}
		return false;
	}
	
	/**
	 * Returns a valid parser function output that the given pattern is not valid for a regular
	 * expression. The message can be displayed in the wiki and is wrapped in an error-class span
	 * which can be recognized by #iferror
	 * 
	 * @param $pattern String the invalid regular expression
	 * 
	 * @return Array
	 */
	public static function invalidRegexParsingOutput( $pattern ) {
		$msg = '<span class="error">' . wfMsgExt( 'regexfun-invalid', array( 'content' ), "<tt><nowiki>$pattern</nowiki></tt>" ). '</span>';
		return array( $msg, 'noparse' => true, 'isHTML' => false ); // isHTML must be false for #iferror!
	}
	
	/**
	 * Helper function. Validates regex and takes care of security risks in pattern which is why
	 * the pattern is taken by reference!
	 */
	protected static function validateRegexCall( Parser &$parser, $subject, &$pattern, &$specialFlags, $resetLastRegex = false ) {
		if( $resetLastRegex ) {
			//reset last matches for the case anything goes wrong
			self::setLastMatches( $parser , null );
		}        
        if( ! self::validateRegex( $pattern, $specialFlags ) ) {			
			return false;
		}
		if( $resetLastRegex ) {
			self::initLastRegex( $parser, $pattern, $subject );
		}
		return true;
	}
	
    /**
     * Performs a regular expression search or replacement
	 * 
     * @param $parser Parser instance of running Parse
     * @param $subject String input string to evaluate
     * @param $pattern String regular expression pattern - must use /, | or % delimiter
     * @param $replace String regular expression replacement
	 * 
     * @return String Result of replacing pattern with replacement in string, or matching text if replacement was omitted
     */
    public static function regex( Parser &$parser, $subject = '', $pattern = '', $replace = null, $limit = -1 ) {
		
		// validate, initialise and check for wrong input:
		$continue = self::validateRegexCall( $parser, $subject, $pattern, $specialFlags, true );
		if( ! $continue ) {
			return self::invalidRegexParsingOutput( $pattern );;
		}
		
		if( $replace === null ) {
			// search mode:
			$lastMatches = self::getLastMatches( $parser );
            $output = ( preg_match( $pattern, $subject, $lastMatches ) ? $lastMatches[0] : '' );
			self::setLastMatches( $parser, $lastMatches );
        } else {
			// replace mode:			
			$limit = (int)$limit;
			
			// set last matches to 'false' and get them on demand instead since preg_replace won't communicate them
			self::setLastMatches( $parser , false );
						
			// FLAG 'e' (parse replace after match) handling:
			if( ! empty( $specialFlags[ self::FLAG_REPLACEMENT_PARSE ] ) ) {				
				// if 'e' flag is set, each replacement has to be parsed after matches are inserted but before replacing!
				self::$tmpRegexCB = array(
					'replacement' => $replace,
					'parser' => &$parser,
				);
				$output = preg_replace_callback( $pattern, array( __CLASS__, 'regex_eFlag_callback' ), $subject, $limit, $count );
			}
			else {
				$output = preg_replace( $pattern, $replace, $subject, $limit, $count );
			}
			
			// FLAG 'r' (no replacement - no output) handling:
			if( ! empty( $specialFlags[ self::FLAG_NO_REPLACE_NO_OUT ] ) ) {				
				/*
				 *  only output replacement result if there actually was a match and therewith a replacement happened
				 * (otherwise the input string would be returned)
				 */
				if( $count < 1 ) {
					return '';
				}
			}
        }
		return $output;
    }
	
	private static function regex_eFlag_callback( $matches ) {
		
		/** Don't cache this since it could contain dynamic content like #var which should be parsed */
		
		$replace = self::$tmpRegexCB['replacement'];
		$parser  = self::$tmpRegexCB['parser'];
		
		// last matches in #regex replace mode were set to false before, set them now:
		self::setLastMatches( $parser, $matches );
		
		// use #regex_var for transforming replacement string with matches:
		$replace = self::regex_var( $parser, $replace );
		
		// parse the replacement after matches are inserted
		// use a new frame, no need for SFH_OBJECT_ARGS style parser functions
		$frame = $parser->getPreprocessor()->newCustomFrame( $parser );
		$replace = $parser->preprocessToDom( $replace );
		$replace = trim( $frame->expand( $replace ) );
				
		return $replace;
	}
	
	/**
	* Performs regular expression searches and returns ALL matches separated
	* 
	* @param $parser Parser instance of running Parser
	* @param $subject String input string to evaluate
	* @param $pattern String regular expression pattern - must use /, | or % as delimiter
	* @param $separator String to separate all the matches
	* @param $offset Integer first match to print out. Negative values possible: -1 means last match.
	* @param $length Integer maximum matches for print out
	 * 
	* @return String result of all matching text parts separated by a string
	*/
    public static function regexall( &$parser , $subject = '' , $pattern = '' , $separator = ', ' , $offset = 0 , $length = '' ) {
		// validate and check for wrong input:
		$continue = self::validateRegexCall( $parser, $subject, $pattern, $specialFlags, false );
		if( ! $continue ) {
			return self::invalidRegexParsingOutput( $pattern );;
		}
		
		// adjust default values:
		$offset = (int)$offset;
		
		if( trim( $length ) === '' ) {
			$length = null;
		} else {
			$length = (int)$length;
		}

		if( preg_match_all( $pattern, $subject, $matches, PREG_SET_ORDER ) ) {
			
			$matches = array_slice( $matches, $offset, $length );								
			$output = ''; //$end = ($end or ($end >= count($matches)) ? $end : count($matches) );

			for( $count = 0; $count < count( $matches ); $count++ ) {
				if( $count > 0 ) {
					$output .=  $separator;
				}
				$output .= trim( $matches[ $count ][0] );
			}
			return $output;
		}
		return '';
    }
	
    /**
     * Returns a value from the last performed regex match
	 * 
     * @index $parser Parser instance of running Parser
     * @param $index Integer index of the last match which should be returnd or a string containing $n as indexes to be replaced
     * @param $defaultVal Integer default value which will be returned when the result with the given index doesn't exist or is a void string
     */
	public static function regex_var( &$parser, $index = 0, $defaultVal = '' ) {
		// get matches from last #regex
		$lastMatches = self::getLastMatches( $parser );
		
		if( $lastMatches === null ) { // last regex was invalid or none executed yet
			return $defaultVal;
		}
				
		// if requested index is numerical:
		if (preg_match( '/^\d+$/', $index ) ) {
			// if requested index is in matches and isn't '':
			if( array_key_exists( $index, $lastMatches ) && $lastMatches[$index] !== '' )
				return $lastMatches[ $index ];
			else {
				// no match! Return just the default value:
				return $defaultVal;
			}
		} else {
			// complex string is given, something like "$1, $2 and $3":			
			/*
			 * replace all back-references with their number increased by 1!
			 * this way we can also handle $0 in the right way!
			 */
			$index = preg_replace_callback(
					'%(?<!\\\)(?:\$(?:(\d+)|\{(\d+)\})|\\\(\d+))%',
					array( __CLASS__, 'regexVarIncreaseBackref' ),
					$index
			);			
			/*
			 * build a helper regex matching all the last matches to use preg_replace
			 * which will handle all the replace-escaping handling correct
			 */
			$regEx = '';
			foreach( $lastMatches as $match ) {
				$regEx .= '(' . preg_quote( $match, '/' ) . ')';
			}
			$regEx = "/^{$regEx}$/";
			$output = preg_replace( $regEx, $index, implode( '', $lastMatches ) );

			return $output;
		}
	}
	/**
	 * only used by 'preg_replace_callback' in 'regex_var'
	 */
	private static function regexVarIncreaseBackref( $matches ) {	
		// find index:
		$index = false;
		$full = $matches[0];
		for( $i = 1; $index === false || $index === '' ; $i++ ) {
			// $index can be false (shouldn't happen), '' or any number (including 0 !)
			$index = @$matches[ $i ];
		}
		return preg_replace( '%\d+%', (int)$index + 1, $full );	
	}	
	
    /**
     * takes $str and puts a backslash in front of each character that is part of the regular expression syntax
	 * 
     * @param $parser Parser instance of running Parser
     * @param $str String input string to change
     * @param $delimiter String delimiter which also will be escaped within $str (default is set to '/')
	 * 
     * @return String Returns the quoted string
     */
	public static function regexquote( &$parser, $str = null, $delimiter = '/' ) {		
		if( $str === null ) {
			return '';
		}		
		if( $delimiter === '' ) {
			$delimiter = null;
		}
		// do this first! otherwise leading '\' from '\x..' would be doubled!
		$str = preg_quote( $str, $delimiter );
		
		/*
		 * take care of characters that will mess things up if returned as first ones in a string
		 * because they have some special meaning in mediawiki
		 */
		$firstChar = substr( $str, 0, 1 );
		switch( $firstChar ) {
			// '*' and ':' is taken care of by preg_quote already
			case '#':
			case ';':
				// e.g. first char as '\x23' in case of '#'
				$str = '\\x' . dechex( ord( $firstChar ) ) . substr( $str, 1 );
				break;
		}
		return $str;
	}
	
	
	/*********************************
	 ****  HELPER - For Store of  ****
	 **** regex_var within Parser ****
	 *********************************
	 ****
	 **
	 * Adding the info to each Parser object makes it invulnerable to new Parser objects being created
	 * and destroyed throughout main parsing process. Only the one parser, 'ParserClearState' is called
	 * on will losse its data since the parsing process has been declared finished and the data won't be
	 * needed anymore.
	 **
	 ***/
	
	protected static function initLastRegex( Parser &$parser, $pattern, $subject ) {
		self::setLastMatches( $parser, array() );
		self::setLastPattern( $parser, $pattern );
		self::setLastSubject( $parser, $subject );
	}
	
	public static function onParserClearState( &$parser ) {
		//cleanup to avoid conflicts with job queue or Special:Import
		self::setLastMatches( $parser, null );
		self::setLastPattern( $parser, '' );
		self::setLastSubject( $parser, '' );		
		
		return true;
	}
	
	/**
	 * Returns the last regex matches done by #regex in the context of the same parser object.
	 * 
	 * @param Parser $parser
	 * @return array|null
	 */
	public static function getLastMatches( Parser &$parser ) {
				
		if( isset( $parser->mExtRegexFun['lastMatches'] ) ) {
			
			// last matches are set to false in case last regex was in replace mode! Get them on demand:
			if( $parser->mExtRegexFun['lastMatches'] === false ) {				
				preg_match( self::getLastPattern( $parser ), self::getLastSubject( $parser ), $parser->mExtRegexFun['lastMatches'] );
			}			
			return $parser->mExtRegexFun['lastMatches'];
		}
		return null;
	}	
	protected static function setLastMatches( Parser &$parser, $value ) {
		$parser->mExtRegexFun['lastMatches'] = $value;
	}
	
	public static function getLastPattern( Parser &$parser ) {
		if( isset( $parser->mExtRegexFun['lastPattern'] ) ) {
			return $parser->mExtRegexFun['lastPattern'];
		}
		return '';
	}
	protected static function setLastPattern( Parser &$parser, $value ) {
		$parser->mExtRegexFun['lastPattern'] = $value;
	}
	
	public static function getLastSubject( Parser &$parser ) {
		if( isset( $parser->mExtRegexFun['lastSubject'] ) ) {
			return $parser->mExtRegexFun['lastSubject'];
		}
		return '';
	}
	protected static function setLastSubject( Parser &$parser, $value ) {
		$parser->mExtRegexFun['lastSubject'] = $value;
	}
	
}