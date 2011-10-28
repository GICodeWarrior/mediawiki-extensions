<?php

/**
 * This is a MediaWiki extension which adds parser functions for performing regular
 * expression searches and replacements.
 * 
 * Info on mediawiki.org: http://www.mediawiki.org/wiki/Extension:Regex_Fun
 * 
 * @version: 1.0 alpha
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

$dir = dirname( __FILE__ );

$wgExtensionMessagesFiles['RegexFun'     ] = $dir . '/RegexFun.i18n.php';
$wgExtensionMessagesFiles['RegexFunMagic'] = $dir . '/RegexFun.i18n.magic.php';

unset( $dir );

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
	const VERSION = '1.0 alpha';
	
	protected static $lastMatches = null;
	protected static $lastPattern = '';
	protected static $lastSubject = '';
	
    /**
     * Sets up parser functions
     */
	public static function init( &$parser ) {		
    	$parser->setFunctionHook( 'regex',       array( __CLASS__, 'regex'       ) );
    	$parser->setFunctionHook( 'regexsearch', array( __CLASS__, 'regexsearch' ) );
		$parser->setFunctionHook( 'regex_var',   array( __CLASS__, 'regex_var'   ) );
    	$parser->setFunctionHook( 'regexall',    array( __CLASS__, 'regexall'    ) );
    	$parser->setFunctionHook( 'regexquote',  array( __CLASS__, 'regexquote'  ) );
    	$parser->setFunctionHook( 'regexascii',  array( __CLASS__, 'regexascii'  ) );
		
		return true;
    }
	
	/**
	 * Checks whether the given regular expression is valid or would cause an error.
	 * Also alters the pattern in case it would be a security risk
	 * 
	 * @param &$pattern String
	 * @return Boolean
	 */
	public static function isValidRegex( &$pattern ) {
		//return (bool)preg_match( '/^([\\/\\|%]).*\\1[imsSuUx]*$/', $pattern );
		
		// replace all eventual 'e' pattern modifiers since it's a huge security risk!
		$origPattern = $pattern;
		$delimiter = preg_quote( substr( $pattern, 0, 1 ), '/' );		
		// from last delimiter (regex end) to end (only flags), replace all 'e':
		$pattern = preg_replace_callback(
				'/(?<=' . $delimiter . ')[^' . $delimiter . ']*?$/i',
				array( __CLASS__, 'validRegexHelper' ),
				$pattern
		);
		
		/*
		 * this takes care of all invalid regular expression use and the php notices
		 * many regular expression extensions won't supress
		 */
		wfSuppressWarnings(); // instead of using the evil @ operator!
		$validRegex = preg_match( $pattern, ' ' );
		wfRestoreWarnings();
		
		if( $validRegex === false ) {
			// set pattern back since the whole thing is invalid anyway:
			$pattern = $origPattern;
			return false;
		}
		return true;
	}	
	/**
	 * only used by 'preg_replace_callback' in 'isValidRegex'
	 */
	private static function validRegexHelper( $matches ) {
		// there is no big 'E' modifier so it won't hurt to replace it as well:
		return preg_replace( '/[e\s]/i', '', $matches[0] );
	}
	
	/**
	 * Returns a valid parser function output that the given pattern is not valid for a regular
	 * expression. The message can be displayed in the wiki and is wrapped in an error-class span
	 * which can be recognized by #iferror
	 * 
	 * @param $pattern String the invalid regular expression
	 * @return Array
	 */
	public static function invalidRegexParsingOutput( $pattern ) {
		$msg = '<span class="error">' . wfMsgExt( 'regexfun-invalid', array( 'content' ), "<tt><nowiki>$pattern</nowiki></tt>" ). '</span>';
		return array( $msg, 'noparse' => false, 'isHTML' => false ); // isHTML must be false for #iferror!
	}
	
	public static function onParserClearState( &$parser ) {
		//cleanup to avoid conflicts with job queue or Special:Import
		self::$lastMatches = null;
		self::$lastPattern = '';
		self::$lastSubject = '';
		
		return true;
	}
	
	protected static function initLastRegex( $pattern, $subject ) {
		self::$lastMatches = array();
		self::$lastPattern = $pattern;
		self::$lastSubject = $subject;	
	}
	
	/**
	 * also takes care of security risks in pattern which is why
	 * the pattern is given by reference!
	 */
	protected static function validateRegexCall( $subject, &$pattern, $resetLastRegex = false ) {
		self::$lastMatches = null; //reset last matches for the case anything goes wrong
        if( $subject === null || $pattern === null ) {
			return '';
		}
        if( ! self::isValidRegex( $pattern ) ) {			
			return self::invalidRegexParsingOutput( $pattern );
		}
		if( $resetLastRegex ) {		
			self::initLastRegex( $pattern, $subject );
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
     * @return String Result of replacing pattern with replacement in string, or matching text if replacement was omitted
     */
    public static function regex( &$parser, $subject = null, $pattern = null, $replace = null, $limit = null ) {
		// validate, initialise and check for wrong input:
		$continue = self::validateRegexCall( $subject, $pattern, true );
		if( $continue !== true ) {
			return $continue;
		}		
		
		if( $replace === null ) {
			// search mode:
            $output = ( preg_match( $pattern, $subject, self::$lastMatches ) ? self::$lastMatches[0] : '' );
        } else {
			// replace mode:
			if( $limit === null ) {
				$limit = -1;
			}
			$limit = (int)$limit;
			
			self::$lastMatches = false;
            $output = preg_replace( $pattern, $replace, $subject, $limit );
        }		
		return array( $output, 'noparse' => true, 'isHTML' => false );
    }
	
	/**
	 * Same as #regex but returns nothing if the pattern doesn't match and a replacement is given.
	 */
    public static function regexsearch( &$parser, $subject = null, $pattern = null, $replace = null, $limit = null ) {
		// validate, initialise and check for wrong input:
		$continue = self::validateRegexCall( $subject, $pattern, true );
		if( $continue !== true ) {
			return $continue;
		}
		
        if( $replace === null ) {
			// search mode:
            $output = ( preg_match( $pattern, $subject, self::$lastMatches ) ? self::$lastMatches[0] : '' );
        } else {
			// replace mode:
			if( $limit === null ) {
				$limit = -1;
			}
			$limit = (int)$limit;
			
			self::$lastMatches = false;
            $output = preg_replace( $pattern, $replace, $subject, $limit, $count );
			if( $count < 1 ) {
				return '';
			}
        }
		return array( $output, 'noparse' => false, 'isHTML' => false );
    }
	
	/**
	* Performs regular expression search and returns ALL matches separated
	* 
	* @param $parser Parser instance of running Parser
	* @param $subject String input string to evaluate
	* @param $pattern String regular expression pattern - must use /, | or % as delimiter
	* @param $separator String to separate all the matches
	* @param $offset Integer first match to print out. Negative values possible: -1 means last match.
	* @param $length Integer maximum matches for print out
	* @return String result of all matching text parts separated by a string
	*/
    public static function regexall( &$parser , $subject = null , $pattern = null , $separator = ', ' , $offset = 0 , $length = null ) {
		// validate and check for wrong input:
		$continue = self::validateRegexCall( $subject, $pattern, false );
		if( $continue !== true ) {
			return $continue;
		}
		// adjust default values:
		$offset = (int)$offset;
		if( $length !== null ) {
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
			return array( $output, 'noparse' => false, 'isHTML' => false );
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
		if( self::$lastMatches === null ) { // last regex was invalid or none executed yet
			return '';
		}
		// last matches are set to false in case last regex was in replace mode!
		if( self::$lastMatches === false ) {
			// execute last regular expression again, but this time not as replace
			preg_match( self::$lastPattern, self::$lastSubject, self::$lastMatches );
		}
		
		// if requested index is numerical:
		if (preg_match( '/^\d+$/', $index ) ) {
			// if requested index is in matches and isn't '':
			if( array_key_exists( $index, self::$lastMatches ) && self::$lastMatches[$index] !== '' )
				return self::$lastMatches[ $index ];
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
			foreach( self::$lastMatches as $match ) {
				$regEx .= '(' . preg_quote( $match, '/' ) . ')';
			}
			$regEx = "/^{$regEx}$/";
			$output = preg_replace( $regEx, $index, implode( '', self::$lastMatches ) );

			return array( $output, 'noparse' => false, 'isHTML' => false );
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
	
	
    /**
	 * DEPRECATED: Functionality is included in 'regexquote' now for the first character
	 *             in case its a trouble-maker.
	 * 
     * Converts all chars in a pattern for regex to escaped hex ascii syntax '=' => '\x3D'
	 * This function is good for escaping characters which can cause problems in MW like
	 * ';' as a first character of a string or '|' characters
	 * 
     * @param $parser ParseriInstance of running Parser
     * @param $str String input string to change
     * @return String result of the input with escaped characters in hex ascii syntax
     */
	/*
    public static function regexascii( &$parser, $str = null ) {	
		if( $str === null ) return '';
	
		$pattern = '/(.)/e';
		$replace = "'\\x' . dechex( ord( '$1' ) )";
	
        $output = preg_replace( $pattern, $replace, $str );
		return array($output, 'noparse' => true);
    }
	*/
}