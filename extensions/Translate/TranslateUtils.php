<?php
/**
 * This file contains classes with static helper functions for other classes.
 *
 * @file
 * @author Niklas Laxström
 * @copyright Copyright © 2007, 2009 Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Essentially random collection of helper functions, similar to GlobalFunctions.php.
 */
class TranslateUtils {

	/**
	 * Does quick normalisation of message name so that in can be looked from the
	 * database.
	 * @param $message \string Name of the message
	 * @param $code \string Language code in lower case and with dash as delimieter
	 * @return \string The normalised title as a string.
	 */
	public static function title( $message, $code ) {
		global $wgContLang;

		// Cache some amount of titles for speed.
		static $cache = array();

		if ( !isset( $cache[$message] ) ) {
			$cache[$message] = $wgContLang->ucfirst( $message );
		}

		if ( $code ) {
			return $cache[$message] . '/' . $code;
		} else {
			return $cache[$message];
		}
	}

	/**
	 * Splits page name into message key and language code.
	 * @param $text \string
	 * @return Array \type{Tuple[String,String]} Key and language code.
	 * @todo Handle names without slash.
	 */
	public static function figureMessage( $text ) {
		$pos = strrpos( $text, '/' );
		$code = substr( $text, $pos + 1 );
		$key = substr( $text, 0, $pos );

		return array( $key, $code );
	}

	/**
	 * Loads page content *without* side effects.
	 * @param $key \string Message key.
	 * @param $language \string Language code.
	 * @param $namespace \int Namespace number.
	 * @return \types{\string,\null} The contents or null.
	 */
	public static function getMessageContent( $key, $language,
		$namespace = NS_MEDIAWIKI ) {

		$title = self::title( $key, $language );
		$data = self::getContents( array( $title ), $namespace );

		return isset( $data[$title][0] ) ? $data[$title][0] : null;
	}

	/**
	 * Fetches contents for pagenames in given namespace without side effects.
	 *
	 * @param $titles \types{String,\list{String}} Database page names.
	 * @param $namespace \int The number of the namespace.
	 * @return Array \arrayof{\string,\type{Tuple[String,String]}} Tuples of page
	 * text and last author indexed by page name.
	 */
	public static function getContents( $titles, $namespace ) {
		$dbr = wfGetDB( DB_SLAVE );
		$rows = $dbr->select( array( 'page', 'revision', 'text' ),
			array( 'page_title', 'old_text', 'old_flags', 'rev_user_text' ),
			array(
				'page_namespace'    => $namespace,
				'page_latest=rev_id',
				'rev_text_id=old_id',
				'page_title'        => $titles
			),
			__METHOD__
		);

		$titles = array();
		foreach ( $rows as $row ) {
			$titles[$row->page_title] = array(
				Revision::getRevisionText( $row ),
				$row->rev_user_text
			);
		}
		$rows->free();

		return $titles;
	}

	/**
	 * Fetches recent changes for titles in given namespaces
	 *
	 * @param $hours \int Number of hours.
	 * @param $bots \bool Should bot edits be included.
	 * @param $ns \list{Integer} List of namespace IDs.
	 * @return \array List of recent changes.
	 */
	public static function translationChanges( $hours = 24, $bots = false, $ns = null ) {
		global $wgTranslateMessageNamespaces;

		$dbr = wfGetDB( DB_SLAVE );
		$recentchanges = $dbr->tableName( 'recentchanges' );
		$hours = intval( $hours );
		$cutoff_unixtime = time() - ( $hours * 3600 );
		$cutoff = $dbr->timestamp( $cutoff_unixtime );

		$namespaces = $dbr->makeList( $wgTranslateMessageNamespaces );
		if ( $ns ) {
			$namespaces = $dbr->makeList( $ns );
		}

		$fields = 'rc_title, rc_timestamp, rc_user_text, rc_namespace';

		// @todo Raw SQL
		$sql = "SELECT $fields, substring_index(rc_title, '/', -1) as lang FROM $recentchanges " .
		"WHERE rc_timestamp >= '{$cutoff}' " .
		( $bots ? '' : 'AND rc_bot = 0 ' ) .
		"AND rc_namespace in ($namespaces) " .
		"ORDER BY lang ASC, rc_timestamp DESC";

		$res = $dbr->query( $sql, __METHOD__ );
		$rows = iterator_to_array( $res ); 
		return $rows;
	}

	/* Some other helpers for ouput*/

	/**
	 * Makes a selector from name and options.
	 * @param $name \string
	 * @param $options \list{String} Html \<option> elements.
	 * @return \string Html.
	 */
	public static function selector( $name, $options ) {
		return Xml::tags( 'select', array( 'name' => $name, 'id' => $name ), $options );
	}

	/**
	 * Makes a selector from name and options.
	 * @param $name \string
	 * @param $items \list{String} The name and value of options.
	 * @param $selected \string The default selected value.
	 * @return \string Html.
	 */
	public static function simpleSelector( $name, $items, $selected ) {
		$options = array();

		foreach ( $items as $item ) {
			$item = strval( $item );
			$options[] = Xml::option( $item, $item, $item === $selected );
		}

		return self::selector( $name, implode( "\n", $options ) );
	}

	/**
	 * Returns a localised language name.
	 * @param $code \string Language code.
	 * @param $native \string Use only native names.
	 * @param $language \string Language code of language the the name should be in.
	 * @return \string Best-effort localisation of wanted language name.
	 */
	public static function getLanguageName( $code, $native = false, $language = 'en' ) {
		if ( !$native && is_callable( array( 'LanguageNames', 'getNames' ) ) ) {
			$languages = LanguageNames::getNames( $language ,
				LanguageNames::FALLBACK_NORMAL,
				LanguageNames::LIST_MW_AND_CLDR
			);
		} else {
			$languages = Language::getLanguageNames( false );
		}

		if ( isset( $languages[$code] ) ) {
			return $languages[$code];
		} else {
			return $code;
		}
	}

	/**
	 * Returns a language selector.
	 * @param $language \string Language code of the language the names should
	 * be localised to.
	 * @param $selectedId \string The language code that is selected by default.
	 */
	public static function languageSelector( $language, $selectedId ) {
		if ( is_callable( array( 'LanguageNames', 'getNames' ) ) ) {
			$languages = LanguageNames::getNames( $language,
				LanguageNames::FALLBACK_NORMAL,
				LanguageNames::LIST_MW
			);
		} else {
			$languages = Language::getLanguageNames( false );
		}

		ksort( $languages );

		$selector = new HTMLSelector( 'language', 'language', $selectedId );
		foreach ( $languages as $code => $name ) {
			$selector->addOption( "$code - $name", $code );
		}

		return $selector->getHTML();
	}

	/// \array Cached message index.
	static $mi = null;

	/**
	 * Returns the primary group message belongs to.
	 * @param $namespace \int
	 * @param $key \string
	 * @return \types{\string,\null} Group id or null.
	 */
	public static function messageKeyToGroup( $namespace, $key ) {
		$groups = self::messageKeyToGroups( $namespace, $key );
		return count( $groups ) ? $groups[0] : null;
	}

	/**
	 * Returns the all the groups message belongs to.
	 * @param $namespace \int
	 * @param $key \string
	 * @return \list{String} Possibly empty list of group ids.
	 */
	public static function messageKeyToGroups( $namespace, $key ) {
		if ( self::$mi === null ) {
			self::messageIndex();
		}

		$normkey = self::normaliseKey( $namespace, $key );

		if ( isset( self::$mi[$normkey] ) ) {
			return (array) self::$mi[$normkey];
		} else {
			return array();
		}
	}

	/**
	 * Converts page name and namespace to message index format.
	 * @param $namespace \int
	 * @param $key \string
	 * @return \string
	 */
	public static function normaliseKey( $namespace, $key ) {
		return strtr( strtolower( "$namespace:$key" ), " ", "_"  );
	}


	/**
	 * Opens and returns the message index.
	 * @return \array or \type{false}
	 */
	public static function messageIndex() {
		wfDebug( __METHOD__ . ": loading from file...\n" );
		$filename = self::cacheFile( 'translate_messageindex.ser' );

		if ( !file_exists( $filename ) ) {
			MessageIndexRebuilder::execute();
		}

		if ( file_exists( $filename ) ) {
			$keyToGroup = unserialize( file_get_contents( $filename ) );
		} else {
			throw new MWException( 'Unable to get message index' );
		}

		self::$mi = $keyToGroup;

		return $keyToGroup;
	}

	/**
	 * Constructs a fieldset with contents.
	 * @param $legend \string Raw html.
	 * @param $contents \string Raw html.
	 * @param $attributes \array Html attributes for the fieldset.
	 * @return \string Html.
	 */
	public static function fieldset( $legend, $contents, $attributes = array() ) {
		return Xml::openElement( 'fieldset', $attributes ) .
			Xml::tags( 'legend', null, $legend ) . $contents .
			Xml::closeElement( 'fieldset' );
	}

	/**
	 * Escapes the message, and does some mangling to whitespace, so that it is
	 * preserved when outputted as-is to html page. Line feeds are converted to
	 * \<br /> and occurances of leading and trailing and multiple consecutive
	 * spaces to non-breaking spaces.
	 *
	 * @param $msg \string Plain text string.
	 * @return \string Text string that is ready for outputting.
	 */
	public static function convertWhiteSpaceToHTML( $msg ) {
		$msg = htmlspecialchars( $msg );
		$msg = preg_replace( '/^ /m', '&#160;', $msg );
		$msg = preg_replace( '/ $/m', '&#160;', $msg );
		$msg = preg_replace( '/  /', '&#160; ', $msg );
		$msg = str_replace( "\n", '<br />', $msg );

		return $msg;
	}

	/**
	 * Construct the web address to given asset.
	 * @param $path \string Path to the resource relative to extensions root directory.
	 * @return \string Full or partial web path.
	 */
	public static function assetPath( $path ) {
		global $wgExtensionAssetsPath;
		return "$wgExtensionAssetsPath/Translate/$path";
	}

	/**
	 * Gets the path for cache files
	 * @param $filename \string
	 * @return \string Full path.
	 * @throws \type{MWException} If cache directory is not configured.
	 */
	public static function cacheFile( $filename ) {
		global $wgTranslateCacheDirectory, $wgCacheDirectory;

		if ( $wgTranslateCacheDirectory !== false ) {
			$dir = $wgTranslateCacheDirectory;
		} elseif ( $wgCacheDirectory !== false ) {
			$dir = $wgCacheDirectory;
		} else {
			throw new MWException( "\$wgCacheDirectory must be configured" );
		}

		return "$dir/$filename";
	}

}

/**
 * Yet another class for building html selectors.
 */
class HTMLSelector {
	/// \list{String} \<option> elements.
	private $options = array();
	/// \string The selected value.
	private $selected = false;
	/// \array Extra html attributes.
	private $attributes = array();

	/**
	 * @param $name \string
	 * @param $id \string Default false.
	 * @param $selected \string Default false.
	 */
	public function __construct( $name = false, $id = false, $selected = false ) {
		if ( $name ) {
			$this->setAttribute( 'name', $name );
		}

		if ( $id ) {
			$this->setAttribute( 'id', $id );
		}

		if ( $selected ) {
			$this->selected = $selected;
		}
	}

	/**
	 * Set selected value.
	 * @param $selected \string Default false.
	 */
	public function setSelected( $selected ) {
		$this->selected = $selected;
	}

	/**
	 * Set html attribute.
	 * @param $name \string Attribute name.
	 * @param $value \string Attribute value.
	 */
	public function setAttribute( $name, $value ) {
		$this->attributes[$name] = $value;
	}

	/**
	 * Add an option.
	 * @param $name \string Display name.
	 * @param $value \string Option value. Uses $name if not given.
	 * @param $selected \string Default selected value. Uses object value if not given.
	 */
	public function addOption( $name, $value = false, $selected = false ) {
		$selected = $selected ? $selected : $this->selected;
		$value = $value ? $value : $name;
		$this->options[] = Xml::option( $name, $value, $value === $selected );
	}

	/**
	 * @return \string Html for the selector.
	 */
	public function getHTML() {
		return Xml::tags( 'select', $this->attributes, implode( "\n", $this->options ) );
	}
}
