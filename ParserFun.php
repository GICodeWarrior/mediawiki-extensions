<?php

/**
 * 'Parser Fun' adds a parser function '#parse' for parsing wikitext and introduces the
 * 'THIS:' prefix for page information related magic variables
 * 
 * Documentation: http://www.mediawiki.org/wiki/Extension:Parser_Fun
 * Support:       http://www.mediawiki.org/wiki/Extension_talk:Parser_Fun
 * Source code:   http://svn.wikimedia.org/viewvc/mediawiki/trunk/extensions/ParserFun
 * 
 * @version: 0.2 alpha
 * @license: ISC license
 * @author:  Daniel Werner < danweetz@web.de >
 *
 * @file ParserFun.php
 * @ingroup Parse
 */
 
if( !defined( 'MEDIAWIKI' ) ) {
    die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}

// Include the Validator extension if not loaded already:
if ( ! defined( 'Validator_VERSION' ) ) {
	@include_once( dirname( __FILE__ ) . '/../Validator/Validator.php' );
}

// Only initialize the extension when Validator extension is present:
if ( ! defined( 'Validator_VERSION' ) ) {
	die( '<p><b>Error:</b> You need to have <a href="http://www.mediawiki.org/wiki/Extension:Validator">Validator</a> installed in order to use <a href="http://www.mediawiki.org/wiki/Extension:Parse">Parse</a>.</p>' );
}


// Extension info & credits:
$wgExtensionCredits['parserhook'][] = array(
	'path'           => __FILE__,
	'name'           => 'Parser Fun',
	'descriptionmsg' => 'parserfun-desc',
	'version'        => ExtParserFun::VERSION,
	'author'         => '[http://www.mediawiki.org/wiki/User:Danwe Daniel Werner]',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:Parser_Fun',
);


// Include the settings file:
require_once ExtParserFun::getDir() . '/ParserFun_Settings.php';


// magic words and message files:
$wgExtensionMessagesFiles['ParserFun'     ] = ExtParserFun::getDir() . '/ParserFun.i18n.php';
$wgExtensionMessagesFiles['ParserFunMagic'] = ExtParserFun::getDir() . '/ParserFun.i18n.magic.php';


$wgHooks['ParserFirstCallInit'   ][] = 'ExtParserFun::init';


// for magic word 'THISPAGENAME':
$wgHooks['MagicWordwgVariableIDs'      ][] = 'ExtParserFun::onMagicWordwgVariableIDs';
$wgHooks['ParserGetVariableValueSwitch'][] = 'ExtParserFun::onParserGetVariableValueSwitch';


// 'parse' and 'CALLER' parser function initializations:
$wgAutoloadClasses['ParserFunParse' ] = ExtParserFun::getDir() . '/includes/PFun_Parse.php';
$wgAutoloadClasses['ParserFunCaller'] = ExtParserFun::getDir() . '/includes/PFun_Caller.php';

$wgHooks['ParserFirstCallInit'][] = 'ParserFunParse::staticInit';
$wgHooks['LanguageGetMagic'   ][] = 'ParserFunParse::staticMagic';

$wgHooks['ParserFirstCallInit'][] = 'ParserFunCaller::staticInit';
$wgHooks['LanguageGetMagic'   ][] = 'ParserFunCaller::staticMagic';


/**
 * Extension class of the 'Parser Fun' extension.
 * Handling the functionality around the 'THIS' magic word feature.
 */
class ExtParserFun {
	/**
	 * Version of the 'Parser Fun' extension.
	 * 
	 * @since 0.1
	 * 
	 * @var string
	 */
	const VERSION = '0.2 alpha';
	
	const MAG_THIS = 'this';
	const MAG_CALLER = 'caller';
	
	public static function init( Parser &$parser ) {
		global $egParserFunEnabledFunctions;		
		if( in_array( self::MAG_THIS, $egParserFunEnabledFunctions ) ) {
			// only register function if not disabled by configuration
			$parser->setFunctionHook( self::MAG_THIS, array( __CLASS__, 'pfObj_this' ), SFH_NO_HASH | SFH_OBJECT_ARGS );
		}
		return true;
	}
	
	/**
	 * Returns the extensions base installation directory.
	 *
	 * @since 0.1
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
	
	/**
	 * Magic word 'THIS:' to return certain information about the page the word actually is defined on
	 */
	static function pfObj_this( Parser &$parser, PPFrame $frame = null, $args = null ) {
		// if MW version is too old or something is wrong:
		if( $frame === null || $frame->title === null ) {
			return '';
		}
		
		// get part behind 'THIS:' if only 'THIS', use 'FULLPAGENAME'
		$index = isset( $args[0] ) ? trim( $frame->expand( $args[0] ) ) : '';
		
		$newArgs = array();
		
		if( $index !== '' ) {
			// clean up arguments as if first argument never were set:
			unset( $args[0] );			
			foreach( $args as $arg ) {
				$newArgs[] = $arg;
			}
			
			// get magic word ID of the variable name:
			$mwId = self::getVariablesMagicWordId( $parser, $index );		
			if( $mwId === null ) {
				// requested variable doesn't exist, make the thing a template call
				return array( null, 'found' => false );
			}
		}
		else {
			// if only '{{THIS}}', set magic word id to 'FULLPAGENAME'
			$mwId = 'fullpagename';
		}
		
		// get value:
		$out = self::getThisVariableValue( $mwId, $parser, $frame, $newArgs );		
		if( $out === null ) {
			// requested variable doesn't support 'THIS:', make the thing a template call
			return array( null, 'found' => false );
		}
		
		return $out;
		
	}
	
	/**
	 * Returns the magic word ID for a variable like the user would write it. Returns null in case there
	 * is no word for the given variables name.
	 * 
	 * @param Parser $parser
	 * @param type $word
	 * 
	 * @return string|null
	 */
	static function getVariablesMagicWordId( Parser $parser, $word ) {
		// get all local (including translated) magic words IDs (values) with their actual literals (keys)
		// for case insensitive [0] and sensitive [1]
		$magicWords = $parser->mVariables->getHash();
		
		if( array_key_exists( strtolower( $word ), $magicWords[0] ) ) {
			// case insensitive word match
			$mwId = $magicWords[0][ strtolower( $word ) ];
		}
		elseif( array_key_exists( $word, $magicWords[1] ) ) {
			// case sensitive word match
			$mwId = $magicWords[1][ $word ];
		}
		else {
			// requested magic word doesn't exist for variables
			
			return null;
		}
		return $mwId;
	}
	
	/**
	 * Returns the value of a variable like '{{FULLPAGENAME}}' in the context of the given PPFrame objects
	 * $frame->$title instead of the Parser objects subject. Returns null in case the requested variable
	 * does not support '{{THIS:}}'.
	 * 
	 * @param string  $mwId magic word ID of the variable
	 * @param Parser  $parser
	 * @param PPFrame $frame
	 * @param array   $args
	 * 
	 * @return string|null
	 */
	static function getThisVariableValue( $mwId, Parser &$parser, $frame, $args = array() ) {		
		$ret = null;
		$title = $frame->title;
		
		if( $title === null ) {
			return null;
		}
		
		// check whether info is available, e.g. 'THIS:FULLPAGENAME' requires 'FULLPAGENAME'
		switch( $mwId ) {
			case 'namespace':
				// 'namespace' function name was renamed as PHP 5.3 came along
				if( is_callable( 'CoreParserFunctions::mwnamespace' ) ) {
					$ret = CoreParserFunctions::mwnamespace( $parser, $title->getPrefixedText() );
					break;
				}
				// else: no different from the other variables
				// no-break, default function call
			case 'fullpagename':
			case 'fullpagenamee':
			case 'pagename':
			case 'pagenamee':
			case 'basepagename':
			case 'basepagenamee':
			case 'subpagename':
			case 'subpagenamee':
			case 'subjectpagename':
			case 'subjectpagenamee':
			case 'talkpagename':
			case 'talkpagenamee':
			case 'namespacee': // special treat for 'namespace', on top
			case 'subjectspace':
			case 'subjectspacee':
			case 'talkspace':
			case 'talkspacee':
				// core parser function information requested				
				$ret = CoreParserFunctions::$mwId( $parser, $title->getPrefixedText() );
				break;
			
			default:
				// give other extensions a chance to hook up with this and return their own values:
				wfRunHooks( 'GetThisVariableValueSwitch', array( &$parser, $title, &$mwId, &$ret, $frame, $args ) );
		}
		return $ret;
	}
	
	
	##################
	# Hooks Handling #
	##################
	
	static function onParserGetVariableValueSwitch( Parser &$parser, &$cache, &$magicWordId, &$ret, $frame = null ) {
		if( $frame === null ) {
			// unsupported MW version
			return true;
		}
		switch( $magicWordId ) {
			/** THIS **/
			case self::MAG_THIS:
				$ret = self::pfObj_this( $parser, $frame, null );
				break;
			
			/** CALLER **/
			case self::MAG_CALLER:
				$siteFrame = ParserFunCaller::getFrameStackItem( $frame, 1 );
				$ret = ( $siteFrame !== null ) ? $siteFrame->title->getPrefixedText() : '';
				break;
		}
		return true;
	}
	
	static function onMagicWordwgVariableIDs( &$variableIds ) {
		global $egParserFunEnabledFunctions;		
		// only register variables if not disabled by configuration
		
		if( in_array( self::MAG_THIS, $egParserFunEnabledFunctions ) ) {
			$variableIds[] = self::MAG_THIS;
		}
		if( in_array( self::MAG_CALLER, $egParserFunEnabledFunctions ) ) {
			$variableIds[] = self::MAG_CALLER;
		}
		return true;
	}
	
}
