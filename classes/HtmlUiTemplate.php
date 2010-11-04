<?php

class HtmlUiTemplate {
	
	/* Protected Members */
	
	protected $filePath;
	
	/* Methods */
	
	/**
	 * @param {string} $file path to template
	 * @param {array} $data list of properties to initially set
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
	 * @param {array} $data List of key/value pairs to expand into variables while rendering
	 * @return {string} Rendered template
	 */
	public function render( array $data = array() ) {
		// Expand bindings to vars, just for this scope
		extract( $data );
		ob_start();
		require( $this->filePath );
		return ob_get_clean();
	}
	
	/* Static Methods */
	
	/**
	 * Escapes a string to be safely rendered in an HTML document.
	 */
	public static function escape( $value ) {
		// More escaping here may be needed
		return htmlspecialchars( $value );
	}
	
	/**
	 * Renders XML attributes from an array of key and value pairs. If a value is an array, it's
	 * imploded using a space as a delimiter. If any attributes are rendered, the result is preceded
	 * with a single space, otherwise the result is an empty string.
	 */
	public static function attributes( $attributes ) {
		$result = array();
		if ( is_array( $attributes ) ) {
			foreach ( $attributes as $key => $value ) {
				if ( is_array( $value ) ) {
					$result[] = $key . '="' . implode( ' ', self::escape( $value ) ) . '"';
				} else {
					$result[] = $key . '="' . self::escape( $value ) . '"';
				}
			}
		}
		return count( $result ) ? ( ' ' . implode( ' ', $result ) ) : '';
	}
}
