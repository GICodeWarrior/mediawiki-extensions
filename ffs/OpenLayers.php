<?php

/**
 * OpenLayers JavaScript language class file format handler.
 *
 * @author Robert Leverington
 * @copyright Copyright © 2009 Robert Leverington
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

class OpenLayersFormatReader extends SimpleFormatReader {

	private function leftTrim( $string ) {
		$string = ltrim( $string );
		$string = ltrim( $string, '"' );
		return $string;
	}

	/**
	 * Parse OpenLayer JavaScript language class.
	 * Known issues:
	 *   - It is a requirement for key names to be enclosed in single
	 *     quotation marks, and for messages to be enclosed in double.
	 *   - The last key-value pair must have a comma at the end.
	 *   - Uses seperate $this->leftTrim() function, this is undersired.
	 * @params $mangler StringMangler
	 * @return Array: Messages from file.
	 */
	public function parseMessages( StringMangler $mangler ) {
		$data = file_get_contents( $this->filename );

		// Just get relevant data.
		$dataStart = strpos( $data, '{' );
		$dataEnd   = strrpos( $data, '}' );
		$data = substr( $data, $dataStart + 1, $dataEnd - $dataStart - 1);
		// Strip comments.
		$data = preg_replace( '#^(\s*?)//(.*?)$#m', '', $data );
		// Break in to message segements for further parsing.
		$data = explode( '",', $data );

		$messages = array();
		// Process each segment.
		foreach( $data as $segment ) {
			// Remove excess quote mark at beginning.
			$segment = substr( $segment, 1 );
			// Add back trailing quote.
			$segment .= '"';
			// Concatenate seperate strings.
			$segment = explode( '" +', $segment );
			$segment = array_map( array( $this, 'leftTrim' ), $segment );
			$segment = implode( $segment );
			#$segment = preg_replace( '#\" \+(.*?)\"#m', '', $segment );
			// Break in to key and message.
			$segments = explode( '\':', $segment );
			$key = $segments[ 0 ];
			unset( $segments[ 0 ] );
			$value = implode( $segments );
			// Strip excess whitespace from both.
			$key = trim( $key );
			$value = trim( $value );
			// Remove quotation marks and syntax.
			$key = substr( $key, 1 );
			$value = substr( $value, 1, -1 );
			$messages[ $key ] = $value;
		}

		// Remove extraneous key that is sometimes present.
		unset( $messages[ 0 ] );

		return $messages;
	}

}

class OpenLayersFormatWriter extends SimpleFormatWriter {

	/**
	 * Export a languages messages.
	 * @param $target File handler.
	 * @param $collection MessageCollection.
	 */
	protected function exportLanguage( $target, MessageCollection $collection ) {
		$code = $collection->code;
		$names = Language::getLanguageNames();
		$name = $names[ $code ];

		// Generate list of authors for comment.
		$authors = $collection->getAuthors();
		$authorList = '';
		foreach( $authors as $author ) {
			$authorList .= " *  - $author\n";
		}

		// Generate header and write.
		$header = <<<EOT
/* Copyright (c) 2006-2008 MetaCarta, Inc., published under the Clear BSD
 * license.  See http://svn.openlayers.org/trunk/openlayers/license.txt for the
 * full text of the license. */

/* Translators (post 2008):
$authorList */

/**
 * @requires OpenLayers/Lang.js
 */

/**
 * Namespace: OpenLayers.Lang["$code"]
 * Dictionary for $name.  Keys for entries are used in calls to
 *     <OpenLayers.Lang.translate>.  Entry bodies are normal strings or
 *     strings formatted for use with <OpenLayers.String.format> calls.
 */
OpenLayers.Lang.$code = {


EOT;
		fwrite( $target, $header );

		// Get and write messages.
		foreach( $collection as $message ) {
			$value = str_replace( '"', '\"', $message->database );
			$line = "    '{$message->key}': \"{$message->value}\",\n\n";
			fwrite( $target, $line );
		}

		// File terminator.
		fwrite( $target, '};' );
	}

}
