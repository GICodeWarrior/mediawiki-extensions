<?php
/**** All the BookManager Variables Functions ****/
class BookManagerFunctions {

	const VERSION = "0.1.5 - unstable";

	static function register( ) {
		global $wgParser;

		# optional SFH_NO_HASH to omit the hash from calls (e.g. {{int:...}}
		# instead of {{#int:...}})
		$wgParser->setFunctionHook( 'prevpagename',	array( __CLASS__, 'prevpagename' ),		SFH_NO_HASH );
		$wgParser->setFunctionHook( 'prevpagenamee',	array( __CLASS__, 'prevpagenamee' ),		SFH_NO_HASH );
		$wgParser->setFunctionHook( 'nextpagename',	array( __CLASS__, 'nextpagename' ),		SFH_NO_HASH );
		$wgParser->setFunctionHook( 'nextpagenamee',	array( __CLASS__, 'nextpagenamee' ),		SFH_NO_HASH );
		$wgParser->setFunctionHook( 'rootpagename',	array( __CLASS__, 'rootpagename' ),		SFH_NO_HASH );
		$wgParser->setFunctionHook( 'rootpagenamee',	array( __CLASS__, 'rootpagenamee' ),		SFH_NO_HASH );
		$wgParser->setFunctionHook( 'chaptername',	array( __CLASS__, 'chaptername' ),		SFH_NO_HASH );
		$wgParser->setFunctionHook( 'chapternamee',	array( __CLASS__, 'chapternamee' ),		SFH_NO_HASH );
	}
	
	static function DeclareVarIds( &$aCustomVariableIds ) {
		# aCustomVariableIds is where MediaWiki wants to store its
		# list of custom variable ids. We oblige by adding ours:
		$aCustomVariableIds[] = MAG_PREVPAGENAME;
		$aCustomVariableIds[] = MAG_PREVPAGENAMEE;
		$aCustomVariableIds[] = MAG_NEXTPAGENAME;
		$aCustomVariableIds[] = MAG_NEXTPAGENAMEE;
		$aCustomVariableIds[] = MAG_ROOTPAGENAME;
		$aCustomVariableIds[] = MAG_ROOTPAGENAMEE;
		$aCustomVariableIds[] = MAG_CHAPTERNAME;
		$aCustomVariableIds[] = MAG_CHAPTERNAMEE;
		return true;
	}
 	
	static function LanguageGetMagic( &$magicWords, $langCode = "en" ) {
		switch ( $langCode ) {
			default:
			# PREVPAGENAME
			$magicWords[MAG_PREVPAGENAME] = array ( 0, 'PREVPAGENAME' );
			$magicWords['prevpagename'] = $magicWords[MAG_PREVPAGENAME];
			# PREVPAGENAME
			$magicWords[MAG_PREVPAGENAMEE] = array ( 0, 'PREVPAGENAMEE' );
			$magicWords['prevpagenamee'] = $magicWords[MAG_PREVPAGENAMEE];
			# NEXTPAGENAME
			$magicWords[MAG_NEXTPAGENAME] = array ( 0, 'NEXTPAGENAME' );
			$magicWords['nextpagename'] = $magicWords[MAG_NEXTPAGENAME];
 			# NEXTPAGENAMEE
			$magicWords[MAG_NEXTPAGENAMEE] = array ( 0, 'NEXTPAGENAMEE' );
			$magicWords['nextpagenamee'] = $magicWords[MAG_NEXTPAGENAMEE];
			# ROOTPAGENAME
			$magicWords[MAG_ROOTPAGENAME] = array ( 0, 'ROOTPAGENAME' , 'BOOKNAME' );
			$magicWords['rootpagename'] = $magicWords[MAG_ROOTPAGENAME];
			# ROOTPAGENAMEE
			$magicWords[MAG_ROOTPAGENAMEE] = array ( 0, 'ROOTPAGENAMEE' , 'BOOKNAMEE' );
			$magicWords['rootpagenamee'] = $magicWords[MAG_ROOTPAGENAMEE];
			# CHAPTERNAME
			$magicWords[MAG_CHAPTERNAME] = array ( 0, 'CHAPTERNAME' );
			$magicWords['chaptername'] = $magicWords[MAG_CHAPTERNAME];
			# CHAPTERNAMEE
			$magicWords[MAG_CHAPTERNAMEE] = array ( 0, 'CHAPTERNAMEE' );
			$magicWords['chapternamee'] = $magicWords[MAG_CHAPTERNAMEE];
		}
		return true;
	}	
/**** All the BookManager values functions ****/

	private static function newTitleObject( &$parser, $text = null ) {
		$t = Title::newFromText( $text );
		if ( is_null( $t ) ) {
			return $parser->getTitle();
		}
		return $t;
	}


	/*
	 * Cópia da função "getBookPagePrefixes" da extensão Collection
	 * (http://svn.wikimedia.org/viewvc/mediawiki/trunk/extensions/Collection/Collection.body.php?revision=79895&view=markup#l440)
	 */
	private static function getBookPagePrefixes() {
		// global $wgUser;
		global $wgCommunityCollectionNamespace;

		$result = array();
		/*
		$t = wfMsgForContent( 'coll-user_book_prefix', $wgUser->getName() );
		if ( wfEmptyMsg( 'coll-user_book_prefix', $t ) || $t == '-' ) {
			$userPageTitle = $wgUser->getUserPage()->getPrefixedText();
			$result['user-prefix'] = $userPageTitle . '/'
				. wfMsgForContent( 'coll-collections' ) . '/';
		} else {
			$result['user-prefix'] = $t;
		}
		*/
		$t = wfMsgForContent( 'coll-community_book_prefix' );
		if ( wfEmptyMsg( 'coll-community_book_prefix', $t ) || $t == '-' ) {
			$title = Title::makeTitle(
				$wgCommunityCollectionNamespace,
				wfMsgForContent( 'coll-collections' )
			);
			$result['community-prefix'] = $title->getPrefixedText() . '/';
		}
		else {
			$result['community-prefix'] = $t;
		}
		return $result;
	}

	/*
	 * Simplificação da função "parseCollectionLine" da extensão Collection
	 * (http://svn.wikimedia.org/viewvc/mediawiki/trunk/extensions/Collection/Collection.body.php?revision=79895&view=markup#l709)
	 */
	private static function parseCollectionLine( /* Sem uso por enquanto: &$collection, */ $line ) {
		$line = trim( $line );
		if ( substr( $line, 0, 1 ) == ':' ) { // article
			$pagename = trim( substr( $line, 1 ) );
			if ( preg_match( '/^\[\[:?(.*?)(\|(.*?))?\]\]$/', $pagename, $match ) ) {
				$pagename = $match[1];
			}
			elseif ( preg_match( '/^\[\{\{fullurl:(.*?)\|oldid=(.*?)\}\}\s+(.*?)\]$/', $pagename, $match ) ) {
				$pagename = $match[1];
			}
			else {
				return null;
			}
			$pagetitle = Title::newFromText( $pagename );
			if ( !$pagetitle ) {
				return null;
			}
			$d = $pagetitle->getPrefixedText();
			return $d;
		}
		return null;
	}

	/*
	 * Adaptação da função "loadCollection" da extensão Collection
	 * (http://svn.wikimedia.org/viewvc/mediawiki/trunk/extensions/Collection/Collection.body.php?revision=79895&view=markup#l780)
	 */
	private static function loadListFromCollection( $collectiontitle ) {
		if ( is_null( $collectiontitle ) || !$collectiontitle->exists() ) {
			return false;
		}
		$caps = array();

		$collectionpage = new Article( $collectiontitle );

		foreach ( preg_split( '/[\r\n]+/', $collectionpage->getContent() ) as $line ) {
			$item = self::parseCollectionLine( $line );
			if ( !is_null( $item ) ) {
				$caps[] = $item;
			}
		}
		return $caps;
	}

	
	private static function bookparts( &$parser, $text = null, $part = 1) {
		$t = self::newTitleObject( $parser, $text );
		// No book should have '/' in it's name, so...
		$book = explode( "/", $t->getText(), 2 ); // ...given a page with title like 'Foo/Bar/Baz'...
		if ( count($book) > 1 ) {		
			return $book[$part];//... $book[0] is Foo, the book name, and $book[1] is Bar/Baz, the chapter name.
		}
		else{
			return $t;
		}
		
	}
	/**
	 * Get the prefixed title of a page near the given page.
	 * @param $text String Text for title of current page
	 * @param $n Integer Position of wanted page. Next page is +1; Previous page is -1
	 * @return String The prefixed title or empty string if not found or found but not valid
	 */
	private static function pageText( &$parser, $text = null, $n = 0 ) {
		$pagetitle = self::newTitleObject( $parser, $text );
		$prefixes = self::getBookPagePrefixes();
		$booktitle = Title::newFromText( $prefixes['community-prefix'] . self::bookparts( $parser, $text, 0) ); // ...the book name will be 'Foo'.
		$cap = self::loadListFromCollection( $booktitle );
		if ( $cap === false ) {
			return '';
		}
		$current = array_search( $pagetitle, $cap );
		if ( $current === false || !isset( $cap[ $current + $n ] ) ) {
			return '';
		}
		$otherpagetitle = Title::newFromText( $cap[ $current + $n ] );
		if ( is_null( $otherpagetitle ) ) {
			return '';
		}
		return wfEscapeWikiText( $otherpagetitle->getText() );
	}

	static function prevpagename( &$parser, $text = null ) {
		$t = self::pageText( $parser, $text, - 1 );
		return $t;
	}

	static function prevpagenamee( &$parser, $text = null ) {
		$t = self::pageText( $parser, $text, - 1 );
		return wfUrlEncode( $t );
	}

	static function nextpagename( &$parser, $text = null ) {
		$t = self::pageText( $parser, $text, + 1 );
		return $t;
	}

	static function nextpagenamee( &$parser, $text = null ) {
		$t = self::pageText( $parser, $text, + 1 );
		return wfUrlEncode( $t );
	}
	static function rootpagename( &$parser, $text = null ) {
		$t = self::bookparts( $parser, $text, 0);
		return $t;
	}
	static function rootpagenamee( &$parser, $text = null ) {
		$t = self::bookparts( $parser, $text, 0);
		return wfUrlEncode( $t );
	}
	static function chaptername( &$parser, $text = null ) {
		$t = self::bookparts( $parser, $text, 1);
		return $t;
	}
	static function chapternamee( &$parser, $text = null ) {
		$t = self::bookparts( $parser, $text, 1);
		return wfUrlEncode( $t );
	}

/**** All the BookManagerFunctions for use with MW Variables on the current page ****/

	static function AssignAValue( &$parser, &$cache, &$magicWordId, &$ret ) {
		switch( $magicWordId ) {
		case MAG_PREVPAGENAME:
			$ret = BookManagerFunctions::prevpagename( $parser );
			return true;
		case MAG_PREVPAGENAMEE:
			$ret = BookManagerFunctions::prevpagenamee( $parser );
			return true;
		case MAG_NEXTPAGENAME:
			$ret = BookManagerFunctions::nextpagename( $parser );
			return true;
		case MAG_NEXTPAGENAMEE:
			$ret = BookManagerFunctions::nextpagenamee( $parser );
			return true;
		case MAG_ROOTPAGENAME:
			$ret = BookManagerFunctions::rootpagename( $parser );
			return true;
		case MAG_ROOTPAGENAMEE:
			$ret = BookManagerFunctions::rootpagenamee( $parser );
			return true;
		case MAG_CHAPTERNAME:
			$ret = BookManagerFunctions::chaptername( $parser );
			return true;
		case MAG_CHAPTERNAMEE:
			$ret = BookManagerFunctions::chapternamee( $parser );
			return true;
		}
		return false;
	}
	
	
/**
* Function that adds navigation bar
* inspired by extension PageNotice
* (http://svn.wikimedia.org/svnroot/mediawiki/trunk/extensions/PageNotice/PageNotice.php)
*/

	static function addText( &$out, &$text ) {
		global $wgTitle, $wgParser, $wgScriptPath;
		$ns = $wgTitle->getNamespace();
		$opt = array(
			'parseinline',
		);
		$currenttitletext = $wgTitle->getText();
		$prev = self::pageText( $wgParser, $currenttitletext, - 1 );
		$next = self::pageText( $wgParser, $currenttitletext, + 1 );
		$base = Title::newFromText( $currenttitletext )->getBaseText();
		$basetext = ( $base !== '' ) ? Title::newFromText( $base )->getSubpageText(): '' ;
		$prevtext = ( $prev !== '' ) ? Title::newFromText( $prev )->getSubpageText(): '' ; 
		$nexttext = ( $next !== '' ) ? Title::newFromText( $next )->getSubpageText(): '' ; 

		if ( $ns === 0 ) {
		 	$BookManager = wfMsgExt( "BookManager", $opt, $prev, $prevtext, $base, $basetext, $next, $nexttext );
			$BookManagerTop = wfMsgExt( "BookManager-top", $opt, $prev, $prevtext, $base, $basetext, $next, $nexttext );
			$BookManagerBottom = wfMsgExt( "BookManager-bottom", $opt, $prev, $prevtext, $base, $basetext, $next, $nexttext );
			if ( !wfEmptyMsg( "BookManager-top", $BookManagerTop ) ) {
				$text = "<div>$BookManagerTop</div>\n$text";
			}
			elseif ( !wfEmptyMsg( "BookManager", $BookManager ) ) {
					$text = "<div>$BookManager</div>\n$text";
			}
			if ( !wfEmptyMsg( "BookManager-bottom", $BookManagerBottom ) ) {
				$text = "$text\n<div>$BookManagerBottom</div>";
			}
			elseif ( !wfEmptyMsg( "BookManager", $BookManager ) ) {
					$text = "$text\n<div>$BookManager</div>";
			}
		 }
		return true;
	}

	static function injectStyleAndJS( &$out, &$sk ) {
		global $wgOut ;
		$wgOut->addModuleStyles('ext.BookManager'); 
		$wgOut->addModules( 'ext.BookManager'); 
		return true;
	}
}

