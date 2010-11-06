<?php

/**
 * Wrapper for a PHP file which contains HTML with embedded PHP tags.
 * 
 * Template files wrapped by this class are provided a data-set which is escaped by default.
 * 
 * By convention only display logic should be written into templates files and use of the global
 * statement should not be allowed.
 * 
 * While some support functions are provided for rendering portions of XML syntax such as attributes
 * or escaping/unescaping, this class intentionally does not contain functions for generating tags
 * themseleves. In cases where generating tags seems like it's needed, consider creating a new
 * template and passing the rendered contents of that template into another.
 * 
 * @author Trevor Parscal <tparscal@wikimedia.org>
 */
class HtmlUiTemplate {
	
	/* Protected Members */
	
	/** String: Path to template file */
	protected $filePath;
	
	/* Methods */
	
	/**
	 * @param $file String: path to template
	 * @param $data Array: list of properties to initially set
	 */
	public function __construct( $filePath ) {
		if ( !file_exists( $filePath ) ) {
			throw new \MWException( sprintf(
				'Bad template file path error. "%s" is not a path to an existing file', $filePath
			) );
		}
		$this->filePath = $filePath;
	}
	
	/**
	 * Renders the template using an output-buffer.
	 * 
	 * @param $data Array: List of key/value pairs to expand into variables while rendering
	 * @return String: Rendered template
	 */
	public function render( array $data = array() ) {
		// Expand bindings to vars, just for this scope - escaped by default!
		extract( self::escape( $data ) );
		// If $data had an element keyed as "data", then it's been shadowed, otherwise we need to
		// unset it so the template doesn't start using the unescaped $data variable
		if ( !isset( $data['data'] ) ) {
			unset( $data );
		}
		ob_start();
		require( $this->filePath );
		return ob_get_clean();
	}
	
	/* Static Methods */
	
	/**
	 * Escapes data to be safely rendered in an HTML document as text (not code).
	 * 
	 * @param $data Mixed: Data to escape, either a string or array of strings
	 * @return Mixed: Escaped version of $data 
	 */
	public static function escape( $data ) {
		if ( is_array( $data ) ) {
			foreach ( array_keys( $data ) as $key ) {
				$data[$key] = self::escape( $data[$key] );
			}
			return $data;
		}
		return htmlspecialchars( (string) $data );
	}
	
	/**
	 * Unescapes data to be rendered in an HTML document as HTML (not text).
	 * 
	 * @param $data Mixed: Data to unescape, either a string or array of strings
	 * @return Mixed: Unescaped version of $data 
	 */
	public static function unescape( $data ) {
		if ( is_array( $data ) ) {
			foreach ( array_keys( $data ) as $key ) {
				$data[$key] = self::unescape( $data[$key] );
			}
			return $data;
		}
		return htmlspecialchars_decode( (string) $data );
	}
	
	/**
	 * Renders XML attributes from an array of key and value pairs.
	 * 
	 * If a value is an array, it's imploded using a space as a delimiter. If any attributes are
	 * rendered, the result is preceded with a single space, otherwise the result is an empty
	 * string. Keys will be escaped (but should have never had any escapable characters in them
	 * anyways) and values are assumed to be escaped already (since data given to the template is
	 * escaped by default).
	 * 
	 * @param $data Mixed: Data to make into attributes, string or array of strings or an array of
	 *     attribute/value pairs where a value can either be a string or an array and will be
	 *     imploded with a space delimiter.
	 * @return String: XML-style attributes
	 */
	public static function attributes( $data ) {
		$result = array();
		if ( is_array( $data ) ) {
			foreach ( $data as $key => $value ) {
				if ( is_array( $value ) ) {
					// Named list of attributes
					$result[] = self::escpae( $key ) . '="' . implode( ' ', (string) $value ) . '"';
				} else if ( is_string( $key ) ) {
					// Named attribute
					$result[] = self::escpae( $key ) . '="' . $value . '"';
				} else {
					// Value-less attribute such as "checked"
					$result[] = (string) $value;
				}
			}
		} else {
			// Value-less attribute such as "checked"
			$result[] = (string) $value;
		}
		return count( $result ) ? ( ' ' . implode( ' ', $result ) ) : '';
	}
}
