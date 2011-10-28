<?php

/**
 * Defines a subset of parser functions to handle hash tables. Inspired by the ArrayExtension
 * (http://www.mediawiki.org/wiki/Extension:ArrayExtension).
 *
 * @version: 0.6.4 alpha
 * @author:  Daniel Werner < danweetz@web.de >
 * 
 * Documentation: http://www.mediawiki.org/wiki/Extension:HashTables
 * Support:       http://www.mediawiki.org/wiki/Extension_talk:HashTables
 * Source code:   http://svn.wikimedia.org/viewvc/mediawiki/trunk/extensions/HashTables
 *
 * @file HashTables.php
 * @ingroup HashTables
 *
 * @ToDo:
 * ======
 * - binding hash tables instance to each initialized parser instead of having one global one.
 * Considering about:
 * - Sort function
 * - Search function
 *
 */
 
if( !defined( 'MEDIAWIKI' ) ) {
    die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}

$wgExtensionCredits['parserhook'][] = array(
	'path'           => __FILE__,
	'name'           => 'HashTables',
	'descriptionmsg' => 'hashtables-desc',
	'version'        => ExtHashTables::VERSION,
	'author'         => '[http://www.mediawiki.org/wiki/User:Danwe Daniel Werner]',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:HashTables',
);

$wgHooks['ParserFirstCallInit'][] = 'efHashTablesParserFirstCallInit';
 
$dir = dirname( __FILE__ );

$wgExtensionMessagesFiles['HashTables'     ] = $dir . '/HashTables.i18n.php';
$wgExtensionMessagesFiles['HashTablesMagic'] = $dir . '/HashTables.i18n.magic.php';

unset( $dir );

/**
 * Extension class with all the hash table functionality
 */
class ExtHashTables {

	/**
	 * Version of the HashTables extension.
	 * 
	 * @since 0.6.1
	 * 
	 * @var string
	 */
	const VERSION = '0.6.4 alpha';

	/**
	 * @since 0.1
	 * 
	 * @var array
	 * @private
	 */
    var $mHashTables = array();

	function __construct() {
		global $wgHooks;
		$wgHooks['ParserClearState'][] = &$this;
	}
	
	function onParserClearState( &$parser ) {
		// remove all hash tables to avoid conflicts with job queue or Special:Import
		$this->mHashTables = array();
		return true;		
	}	
	
	/**
	 * Define an hash by a list of 'values' deliminated by 'itemsDelimiter'.
	 * Hash keys and their values are deliminated by 'innerDelimiter'.
	 * Both delimiters can be perl regular expression patterns.
	 * Syntax: {{#hashdefine:hashId |values |itemsDelimiter |innerDelimiter}}
	 */
    function hashdefine( &$parser, $hashId, $value='', $itemsDelimiter = '/\s*,\s*/', $innerDelimiter = '/\s*;\s*/' ) {
		if( !isset($hashId) ) {
			return '';
		}        
		$this->mHashTables[ $hashId ] = array();
		
        if( $value !== '' ) {
		
			// Build delimiters:
            if ( ! $this->isValidRegEx($itemsDelimiter,'/') )
                $itemsDelimiter = '/\s*' . preg_quote( $itemsDelimiter, '/' ) . '\s*/';
			
            if ( ! $this->isValidRegEx($innerDelimiter,'/') )
                $innerDelimiter = '/\s*' . preg_quote( $innerDelimiter, '/' ) . '\s*/';
			
			$items = preg_split( $itemsDelimiter, $value ); // All hash Items
			
			foreach ( $items as $itemName => $itemVal )
			{
				$hashPair = preg_split( $innerDelimiter, $itemVal, 2 );
				
				if( count($hashPair) < 2 )
					$this->mHashTables[ $hashId ][ $itemVal ] = ''; // only hash-Name given, could be even '', no value
				else
					$this->mHashTables[ $hashId ][ $hashPair[0] ] = $hashPair[1];
			}
        }
                
        return '';
    }
	
	/**
	 * Returns the value of the hash table item identified by a given item name.
	 */
    function hashvalue( &$parser, $hashId, $key, $default = '' ) {
        if( !isset($hashId) || !isset($key) )
           return '';
	
        $value = $this->getHashValue( $hashId, $key, '' );
		
		if( $value === '' ) {
			$value = $default;
		}
		
		return $value;
    }
	
	/**
	 * Returns the size of a hash table. Returns '' if the table doesn't exist.
	 */
    function hashsize( &$parser, $hashId) {
		if( !isset($hashId) || !$this->hashExists($hashId) )
			return '';
        
        return count( $this->mHashTables[ $hashId ] );
    }
	
	/**
	 * Returns "1" or 'yes' (if set) if the hash item key 'key' exists inside the hash table 'hashId'.
	 * Otherwise the output will be a void string or 'no' (if set).
	 */
    function hashkeyexists( &$parser, $hashId, $key = '', $yes = '1', $no = '' ) {
		// get hash or null:
		$hash = $this->getHash( $hashId );
		
		if( $hash !== null && array_key_exists( $key, $hash ) ) {
			return $yes;
		}
		else {
			return $no;
		}
    }
	
	/**
	 * Allows to print all entries of a hash table seperated by a delimiter.
	 * Syntax:
	 *   {{#hashprint:hashID |seperator |keyPattern |valuePattern |subject |printOrderArrayId}}
	 */
    function hashprint( Parser &$parser, PPFrame $frame, $args) {
		if( ! isset( $args[0] ) ) {
			return '';
		}
        $hashId = trim( $frame->expand( $args[0] ) );
		$values = $this->getHash( $hashId );
		
		if( $values === null ) {
			return '';
		}
		
		// parameter validation:		
        $seperator =         isset( $args[1] ) ? trim( $frame->expand( $args[1] ) ) : ', ';
        $keyPattern =        isset( $args[2] ) ? trim( $frame->expand( $args[2], PPFrame::NO_ARGS | PPFrame::NO_TEMPLATES ) ) : '';
        $valuePattern =      isset( $args[3] ) ? trim( $frame->expand( $args[3], PPFrame::NO_ARGS | PPFrame::NO_TEMPLATES ) ) : '@@@@';
        $subject =           isset( $args[4] ) ? trim( $frame->expand( $args[4], PPFrame::NO_ARGS | PPFrame::NO_TEMPLATES ) ) : '@@@@';
		$printOrderArrayId = isset( $args[5] ) ? trim( $frame->expand( $args[5], PPFrame::NO_ARGS | PPFrame::NO_TEMPLATES ) ) : null;
		
		if( $printOrderArrayId !== null ) {
			global $wgArrayExtension;
			
			if( ! isset( $wgArrayExtension ) ) {
				return ''; // array extension not found
			}			
			// if array with print order doesn't exist
			if( ! array_key_exists( $printOrderArrayId, $wgArrayExtension->mArrayExtension ) ) {
				return '';
			}			
			$printOrderArray = $wgArrayExtension->mArrayExtension[ $printOrderArrayId ];
		}
		else {
			// No print order given, copy hash keys in print order array
			$printOrderArray = array_keys( $values );
		}
		
        $renderedResults = array();
		
		foreach( $printOrderArray as $itemKey ) {
			if( ! array_key_exists($itemKey, $values) ) {
				continue;
			}		
			$itemVal = $values[ $itemKey ]; // get value of the current print item from the values array

			$rawResult = $subject;
			if( $keyPattern   !== '' ) {
				$rawResult = str_replace($keyPattern, $itemKey, $rawResult);
			}
			if( $valuePattern !== '' ) {
				$rawResult = str_replace($valuePattern, $itemVal, $rawResult);
			}
			
			/** @todo: it doesn't make sense to check whether we are in template or not
			 *         Parser::PTD_FOR_INCLUSION should be used in any case propably.
			 */
			$rawResult = $parser->preprocessToDom( $rawResult, $frame->isTemplate() ? Parser::PTD_FOR_INCLUSION : 0 );
			$rawResult = trim( $frame->expand( $rawResult ) );
						   
			$renderedResults[] = $rawResult ;
        }
        return array( implode( $seperator, $renderedResults) , 'noparse' => false, 'isHTML' => false );
    }
	
	/**
	 * Define an hash filled with all given parameters of the current template.
	 * In case there are no parameters, the hash will be void.
	 */
    function parameterstohash( &$parser, $frame, $args) {
		if( !isset($args[0]) )
			return '';
		
		$hashId = trim( $frame->expand($args[0]) );
		
		// in case the page is not used as template i.e. when displayed by it's own...
        if( !( $frame instanceof PPTemplateFrame_Dom ) )
        {
			$this->mHashTables[ $hashId ] = array();  // create empty hash table
			return '';
        }
		
		$templateArgs = $frame->getArguments();
		
		foreach ( $templateArgs as $argName => $argVal )
		{
			$this->mHashTables[ $hashId ][ trim( $argName ) ] = trim( $argVal );
		}		
		return '';
		
    }

	/**
	 * Resets the hashes given in parameter 1 to n. If there are no parameters given,
	 * the function will reset all hashes.
	 */
	function hashreset( &$parser, $frame, $args) {		
		// reset all hash tables if no specific tables are given:
		if( !isset( $args[0] ) || ( $args[0] === '' && count( $args ) == 1 ) )
			$this->mHashTables = array();
		else {
			foreach ( $args as $arg )
			{
				$argVal = trim( $frame->expand($arg) );
				$this->removeHash( $argVal );
			}
		}
		return '';
    }
	
	/**
	 * Adds new keys and values to a hash table. This function can also be used as alternative
	 * way to create hash tables.
	 * Syntax:
	 *   {{#hashinclude:hashID |key1=val1 |key2=val2 |... |key n=val n}}
	 */
	function hashinclude( &$parser, $frame, $args) {	
		// get hash table ID from first parameter:
		$hashId = trim( $frame->expand($args[0] ) );
		unset( $args[0] );
		
		if( !$this->hashExists($hashId) )
			$this->mHashTables[ $hashId ] = array();		
		
		// all following parameters contain hash table keys and values '|key=value'
		foreach ( $args as $arg )
		{
			$argString = $frame->expand($arg);
			$argItem = explode( '=', $argString, 2 );
			$argName = trim( $argItem[0] );
			$argVal = ( count( $argItem ) > 1 ) ? trim( $argItem[1] ) : '';
			
			$this->mHashTables[ $hashId ][ $argName ] = $argVal;
		}
		return '';
	}

	/**
	 * Removes certain given keys from a hash table.
	 * Syntax:
	 *   {{#hashexclude:hashID |key1 |key2 |... |key n}}
	 */
	function hashexclude( &$parser, $frame, $args) {
		// get hash table ID from first parameter:
		$hashId = trim( $frame->expand($args[0]) );
		unset( $args[0] );
		
		if( !$this->hashExists($hashId) )
			return'';	
		
		// all following parameters contain hash table keys and values '|key=value'
		foreach ( $args as $arg )
		{
			$argName = trim( $frame->expand($arg) );
			unset( $this->mHashTables[ $hashId ][ $argName ] );
		}
		return '';
	}
	
	/**
	 * Merge two or more hash tables like the php function 'array_merge' would merge them.
	 * Syntax:
	 *   {{#hashmerge:hashID |hash1 |hash2 |... |hash n}}
	 */
	function hashmerge( &$parser, $frame, $args) {				
		$this->multiHashOperation( $frame, $args, __FUNCTION__ );
		return '';
	}	
	private function multi_hashmerge( $hash1, $hash2 ) {
		return array_merge( $hash1, $hash2 );
	}
	
	/**
	 * Mix two or more hash tables. For the most part this function works like 'hashmerge' with one exception:
	 * Numeric hash table keys will be treated like string keys.
	 * Syntax:
	 *   {{#hashmix:hashID |hash1 |hash2 |... |hash n}}
	 */
	function hashmix( &$parser, $frame, $args) {				
		$this->multiHashOperation( $frame, $args, __FUNCTION__ );
		return '';
	}	
	private function multi_hashmix( $hash1, $hash2 ) {
		// copy all entries from hash2 to hash1
		foreach($hash2 as $key => $value) {
			$hash1[ $key ] = $value;
		}
		return $hash1;
	}
	
	/**
	 * Compare two or more hash tables like the php function 'array_diff_key' would compare them.
	 * All items contained in the first array but in none of the other ones will end up in the
	 * new hash table.
	 * Syntax:
	 *   {{#hashdiff:hashID |hash1 |hash2 |... |hash n}}
	 */
	function hashdiff( &$parser, $frame, $args) {
		$this->multiHashOperation( $frame, $args, __FUNCTION__ );
		return '';
	}
	private function multi_hashdiff( $hash1, $hash2 ) {
		return array_diff_key( $hash1, $hash2 );
	}

	/**
	 * Compare two or more hash tables like the php function 'array_intersect_key' would compare them.
	 * Creates a new hash table containing all entries of 'hash1' which are present in the other
	 * hash tables given in parameters 3 to n.
	 * Syntax:
	 *   {{#hashintersect:hashID |hash1 |hash2 |... |hash n}}
	 */
	function hashintersect( &$parser, $frame, $args) {
		$this->multiHashOperation( $frame, $args, __FUNCTION__ );
		return '';
	}
	private function multi_hashintersect( $hash1, $hash2 ) {
		return array_intersect_key( $hash1, $hash2 );
	}
	
	/**
	 * Create an array from a hash tables values. Optional a seccond array with the keys. If the 'valArrayID'
	 * equals the 'keyArrayID', the array will contain only the key names and not the values.
	 * Syntax:
	 *   {{#hashtoarray:valArrayID |hashID |keyArrayID}}
	 */
	function hashtoarray( &$parser, $valArrayId, $hashId, $keyArrayId = null) {
		
		if( !isset($hashId) || !isset($valArrayId) )
			return '';
		
		global $wgArrayExtension;
		
		// create void arrays in case hash doesn't exist
		$valArray = array();
		$keyArray = array();
		
		if( $this->hashExists($hashId) )
		{
			$hash = $this->mHashTables[ $hashId ];
			
			foreach( $hash as $hashKey => $hashVal ) {
				$valArray[] = $hashVal;
				if( $keyArrayId !== null )
					$keyArray[] = $hashKey;
			}
		}
		
		
		
		$wgArrayExtension->mArrayExtension[ $valArrayId ] = $valArray;
		if( $keyArrayId !== null ) {
			$wgArrayExtension->mArrayExtension[ $keyArrayId ] = $keyArray;
		}
		return '';
	}
	
	/**
	 * Create a hash table from an array.
	 * Syntax:
	 *   {{#arraytohash:hashID |valuesArrayID |keysArrayID}}
	 *
	 * The 'keysArrayID' is optional. If set the items in this array will end up as keys in
	 * the new hash table.
	 */
	function arraytohash( &$parser, $hashId, $valArrId, $keyArrId = null) {

		if( !isset($hashId) )
			return '';
		
		global $wgArrayExtension;
		
		// if array doesn't exist
		if( !array_key_exists( $valArrId, $wgArrayExtension->mArrayExtension ) )
			$arrExtValArray = array();
		else
			$arrExtValArray = $wgArrayExtension->mArrayExtension[ $valArrId ];
			
		$newHash = array();
				
		// if no key array is given OR the key array doesn't exist
		if( !isset($keyArrId) || !array_key_exists( $keyArrId, $wgArrayExtension->mArrayExtension ) )
		{
			// Copy the whole array. Result will be a hash with numeric keys
			$newHash = $arrExtValArray;
		}
		else
		{
			$keyArray = $wgArrayExtension->mArrayExtension[ $keyArrId ];
			$valArray = $arrExtValArray;
			
			for( $i=0; $i < count($keyArray); $i++ ) {
				$currVal = array_key_exists( $i, $valArray ) ? $valArray[$i] : '';
				$newHash[ $keyArray[$i] ] = $currVal;
			}
		}
		$this->mHashTables[ $hashId ] = $newHash;	
		return '';
	}
	
	
	/**
	 * Allows to call a template with keys of a hash table as parameters and their values as parameter values.
	 * The pipe-replace parameter allows to define a string which will replace '|' pipes. Can be useful to preserve
	 * links. Default replacement string is '&#124;'. '{{((}}!{{))}}' could be useful in case those templates exist.
	 * Syntax:
	 *   {{#hashtotemplate:template |hash |pipe-replacer}}
	 */
    function hashtotemplate( &$parser, $frame, $args ) {
		if( ! isset($args[0]) || ! isset($args[1]) )
			return '';
		
        $template = trim( $frame->expand($args[0] ) );
        $hashId   = trim( $frame->expand($args[1] ) );
		$pipeReplacer = isset($args[2]) ? trim( $frame->expand( $args[2] ) ) : '&#124;';
		
		if( !$this->hashExists( $hashId ) )
			return '';
		
        $params = $this->mHashTables[ $hashId ];
		$templateCall = '{{' . $template;
		
		foreach ($params as $paramKey => $paramValue){
			// replace '}' and '|' to avoid template call manipulation
			$paramValue = str_replace( array( '}', '|' ), array( '&#125;', $pipeReplacer ), $paramValue );
			$templateCall .= "|$paramKey=$paramValue";
		}
		$templateCall .= '}}';
				
		$result = $parser->preprocessToDom( $templateCall, $frame->isTemplate() ? Parser::PTD_FOR_INCLUSION : 0 );
		$result = trim( $frame->expand( $result ) );
		
		return array( $result , 'noparse' => false, 'isHTML' => false );
	}
	
	/* ============================ */	
	/* ============================ */
	/* ===                      === */
	/* ===   HELPER FUNCTIONS   === */
	/* ===                      === */
	/* ============================ */	
	/* ============================ */
	
	/**
	 * Returns a value within a hash. If key or hash doesn't exist, this will return null
	 * or another predefined default.
	 * 
	 * @since 0.6.4
	 * 
	 * @param string $hashId
	 * @param string $key
	 * @param mixed  $default value to return in cas the value doesn't exist. null by default.
	 * @return string
	 */
    public function getHashValue( $hashId = '', $key = '', $default = null ) {
		$hashId = trim( $hashId );
		if( $this->hashExists( $hashId ) && array_key_exists( $key, $this->mHashTables[ $hashId ] ) )
			return $this->mHashTables[ $hashId ][ $key ];
		else
			return $default;
    }

	/**
	 * Returns an hash identified by $hashId. If it doesn't exist this will return null.
	 * 
	 * @since 0.6
	 * 
	 * @param string $hashId
	 * @return array|null
	 */
    public function getHash( $hashId = '' ) {
		if( $this->hashExists( $hashId ) )
			return $this->mHashTables[ $hashId ];
		else
			return null;
    }
	
	/**
	 * Returns whether a hash exists within the page scope.
	 * 
	 * @since 0.6
	 * 
	 * @param string $hashId 
	 * @return boolean
	 */
	public function hashExists( $hashId = '' ) {
		return array_key_exists( trim( $hashId ), $this->mHashTables );
	}
	
	/**
	 * This will add a new hash or overwrite an existing one. Values should be delliverd as array
	 * values in form of a string.
	 * 
	 * @since 0.6
	 * 
	 * @param string $hashId
	 * @param array  $hashTable
	 */
	public function createHash( $hashId = '', $hashTable = array() ) {
		$this->mHashTables[ trim( $hashId ) ] = $hashTable;
	}
	
	/**
	 * Removes an existing hash. If the hash doesn't exist this will return false, otherwise true.
	 * 
	 * @since 0.6
	 * 
	 * @param string $hashId
	 * @return boolean
	 */
	public function removeHash( $hashId = '' ) {
		$hashId = trim( $hashId );
		if( $this->hashExists( $hashId ) ) {
			unset( $this->mHashTables[ $hashId ] );
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Base function for operations with multiple hashes given thru n parameters
	 * $operationFunc expects a function name prefix (suffix 'multi_') with two parameters
	 * $hash1 and $hash2 which will perform an action between $hash1 and hash2 which will
	 * result into a new $hash1. There can be 1 to n $hash2 in the whole process.
	 * 
	 * @param $frame
	 * @param $args
	 * @param $operationFunc name of the function calling this. There must be a counterpart
	 *        function with prefix 'multi_' which should have two parameters. Both parameters
	 *        will receive a hash (array), the function must return the result hash of the
	 *        processing.
	 */
	protected function multiHashOperation( $frame, $args ,$operationFunc ) {
		$lastHash = null;
		$finalHashId = trim( $frame->expand( $args[0] ) );
		$operationFunc = 'multi_' . $operationFunc;
		
		// For all hashes given in parameters 2 to n (ignore 1 because this is the new hash)
		for( $i = 1; $i < count( $args ); $i++ )
		{
			if( ! array_key_exists( $i, $args ) )  {
				continue;
			}
			$argHashId = trim( $frame->expand( $args[ $i ] ) );
		
			if( $this->hashExists( $argHashId ) ) {
				$argHash = $this->mHashTables[ $argHashId ];
				if( $lastHash === null ) {
					// first valid hash table, process together with second...
					$lastHash = $argHash;
				}
				else {
					// second or later hash table, process with previous:
					$lastHash = $this->{ $operationFunc }( $lastHash, $argHash ); // perform action between last and current hash
				}
			}			
		}
		// in case no array were given:
		if( $lastHash === null ) {
			$lastHash = array();
		}
		$this->mHashTables[ $finalHashId ] = $lastHash;
	}
	
	/**
	 * Decides for the given $pattern whether its a valid regular expression acceptable for
	 * HashTables parser functions or not.
	 * 
	 * @param string $pattern regular expression including delimiters and optional flags
	 * @return boolean
	 */
	function isValidRegEx( $pattern ) {
		return preg_match( '/^([\\/\\|%]).*\\1[imsSuUx]*$/', $pattern );
	}
}



function efHashTablesParserFirstCallInit( &$parser ) {
    global $wgHashTables, $wgArrayExtension;
 
    $wgHashTables = new ExtHashTables();
	 
    $parser->setFunctionHook( 'hashdefine',       array( &$wgHashTables, 'hashdefine'       ) );
	$parser->setFunctionHook( 'hashvalue',        array( &$wgHashTables, 'hashvalue'        ) );
	$parser->setFunctionHook( 'hashsize',         array( &$wgHashTables, 'hashsize'         ) );
	$parser->setFunctionHook( 'hashkeyexists',    array( &$wgHashTables, 'hashkeyexists'    ) );
	$parser->setFunctionHook( 'hashprint',        array( &$wgHashTables, 'hashprint'        ), SFH_OBJECT_ARGS );
	$parser->setFunctionHook( 'parameterstohash', array( &$wgHashTables, 'parameterstohash' ), SFH_OBJECT_ARGS );
	$parser->setFunctionHook( 'hashtotemplate',   array( &$wgHashTables, 'hashtotemplate'   ), SFH_OBJECT_ARGS );
	$parser->setFunctionHook( 'hashinclude',      array( &$wgHashTables, 'hashinclude'      ), SFH_OBJECT_ARGS );
	$parser->setFunctionHook( 'hashexclude',      array( &$wgHashTables, 'hashexclude'      ), SFH_OBJECT_ARGS );
	$parser->setFunctionHook( 'hashreset',        array( &$wgHashTables, 'hashreset'        ), SFH_OBJECT_ARGS );	
	$parser->setFunctionHook( 'hashmerge',        array( &$wgHashTables, 'hashmerge'        ), SFH_OBJECT_ARGS );
	$parser->setFunctionHook( 'hashmix',          array( &$wgHashTables, 'hashmix'          ), SFH_OBJECT_ARGS );
	$parser->setFunctionHook( 'hashdiff',         array( &$wgHashTables, 'hashdiff'         ), SFH_OBJECT_ARGS );
	$parser->setFunctionHook( 'hashintersect',    array( &$wgHashTables, 'hashintersect'    ), SFH_OBJECT_ARGS );
	
	// if array extension is available, rgister array-hash interactions:
	if( isset( $wgArrayExtension ) ) {		
		$parser->setFunctionHook( 'hashtoarray', array( &$wgHashTables, 'hashtoarray' ) );
		$parser->setFunctionHook( 'arraytohash', array( &$wgHashTables, 'arraytohash' ) );
	}
	
	return true;
}
