<?php
/**
 * @file
 * @ingroup SMWDataItems
 */

/**
 * Exception to be thrown when input string is too long.
 */
class SMWStringLengthException extends SMWDataItemException {
	public function __construct( $string ) {
		parent::__construct( 'String "' . mb_substr( $string, 0, 10 ) . '...' . mb_substr( $string, mb_strlen( $string ) - 10 ) . ' exceeds length limit for strings. Use SMWDIBlob for long strings.'  );
	}
}

/**
 * This class implements (length restricted) string data items.
 *
 * @author Markus Krötzsch
 * @ingroup SMWDataItems
 */
class SMWDIString extends SMWDIBlob {

	const MAXLENGTH = 255;

	public function __construct( $string, $typeid = '_str' ) {
		if ( strlen( $string ) > SMWDIString::MAXLENGTH ) {
			throw new SMWStringLengthException( $string );
		}
		parent::__construct( $string, $typeid );
	}

	public function getDIType() {
		return SMWDataItem::TYPE_STRING;
	}

	/**
	 * Create a data item from the provided serialization string and type
	 * ID.
	 * @return SMWDIString
	 */
	public static function doUnserialize( $serialization, $typeid ) {
		return new SMWDIString( $serialization, $typeid );
	}

}
