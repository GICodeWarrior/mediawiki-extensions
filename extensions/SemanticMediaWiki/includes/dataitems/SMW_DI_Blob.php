<?php
/**
 * @file
 * @ingroup SMWDataItems
 */

/**
 * This class implements blob (long string) data items.
 *
 * @author Markus Krötzsch
 * @ingroup SMWDataItems
 */
class SMWDIBlob extends SMWDataItem {

	/**
	 * Internal value.
	 * @var string
	 */
	protected $m_string;

	public function __construct( $string, $typeid = '_txt' ) {
		parent::__construct( $typeid );
		$this->m_string = $string;
	}

	public function getDIType() {
		return SMWDataItem::TYPE_BLOB;
	}

	public function getString() {
		return $this->m_string;
	}

	public function getSerialization() {
		return $this->m_string;
	}

	/**
	 * Create a data item from the provided serialization string and type
	 * ID.
	 * @return SMWDIBlob
	 */
	public static function doUnserialize( $serialization, $typeid ) {
		return new SMWDIBlob( $serialization, $typeid );
	}

}
