<?php
/**
 * @file
 * @ingroup SMWDataItems
 */

/**
 * This class implements wiki page data items.
 *
 * @since 1.6
 *
 * @author Markus Krötzsch
 * @ingroup SMWDataItems
 */
class SMWDIWikiPage extends SMWDataItem {

	/**
	 * MediaWiki DB key string
	 * @var string
	 */
	protected $m_dbkey;
	/**
	 * MediaWiki namespace integer.
	 * @var integer
	 */
	protected $m_namespace;
	/**
	 * MediaWiki interwiki prefix.
	 * @var string
	 */
	protected $m_interwiki;

	/**
	 * Contructor. We do not bother with too much detailed validation here,
	 * regarding the known namespaces, canonicity of the dbkey (namespace
	 * exrtacted?), validity of interwiki prefix (known?), and general use
	 * of allowed characters (may depend on MW configuration). All of this
	 * would be more work than it is worth, since callers will usually be
	 * careful and since errors here do not have major consequences.
	 */
	public function __construct( $dbkey, $namespace, $interwiki, $typeid = '_wpg' ) {
		parent::__construct( $typeid );
		if ( !is_numeric( $namespace ) ) {
			throw new SMWDataItemException( "Given namespace '$namespace' is not an integer." );
		}
		$this->m_dbkey = $dbkey;
		$this->m_namespace = (int)$namespace; // really make this an integer
		$this->m_interwiki = $interwiki;
	}

	public function getDIType() {
		return SMWDataItem::TYPE_WIKIPAGE;
	}

	public function getDBkey() {
		return $this->m_dbkey;
	}

	public function getNamespace() {
		return $this->m_namespace;
	}

	public function getInterwiki() {
		return $this->m_interwiki;
	}

	/**
	 * Get the sortkey of the wiki page data item. Note that this is not
	 * the sortkey that might have been set for the corresponding wiki
	 * page. To obtain the latter, query for the values of the property
	 * "new SMWDIProperty( '_SKEY' )".
	 */
	public function getSortKey() {
		return $this->m_dbkey;
	}

	public function getSerialization() {
		return strval( $this->m_dbkey . '#' . strval( $this->m_namespace ) . '#' . $this->m_interwiki );
	}

	/**
	 * Create a data item from the provided serialization string and type
	 * ID.
	 * @return SMWDIWikiPage
	 */
	public static function doUnserialize( $serialization, $typeid ) {
		$parts = explode( '#', $serialization, 3 );
		if ( count( $parts ) != 3 ) {
			throw new SMWDataItemException( "Unserialization failed: the string \"$serialization\" was not understood." );
		}
		return new SMWDIWikiPage( $parts[0], floatval( $parts[1] ), $parts[2], $typeid );
	}

	/**
	 * Create a data item from a MediaWiki Title.
	 *
	 * @param $title Title
	 * @param $typeid string optional type ID to use
	 * @return SMWDIWikiPage
	 */
	public static function newFromTitle( Title $title, $typeid = '_wpg' ) {
		return new SMWDIWikiPage( $title->getDBkey(), $title->getNamespace(), $title->getInterwiki(), $typeid );
	}

}
