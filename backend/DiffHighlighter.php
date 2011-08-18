<?php

/**
 * Highlight a SVN diff for easier readibility
 */
class CodeDiffHighlighter {

	/**
	 * Main entry point. Given a diff text, highlight it
	 * and wrap it in a div
	 * @param $text string Text to highlight
	 * @return string
	 */
	function render( $text ) {
		return '<table class="mw-codereview-diff">' .
			$this->splitLines( $text ) .
			"</table>\n";
	}

	/**
	 * Given a bunch of text, split it into individual
	 * lines, color them, then put it back into one big
	 * string
	 * @param $text string Text to split and highlight
	 * @return string
	 */
	function splitLines( $text ) {
		return implode( "\n",
			array_map( array( $this, 'colorLine' ),
				explode( "\n", $text ) ) );
	}

	/**
	 * Turn a diff line into a properly formatted string suitable
	 * for output
	 * @param $line string Line from a diff
	 * @return string
	 */
	function colorLine( $line ) {
		if ( $line == '' ) {
			return ""; // don't create bogus spans
		}
		list( $element, $attribs ) = $this->tagForLine( $line );
		return "<tr>".Xml::element( $element, $attribs, $line )."</tr>";
	}

	/**
	 * Take a line of a diff and apply the appropriate stylings
	 * @param $line string Line to check
	 * @return array
	 */
	function tagForLine( $line ) {
		static $default = array( 'td', array() );
		static $tags = array(
			'-' => array( 'td', array( 'class' => 'del' ) ),
			'+' => array( 'td', array( 'class' => 'ins' ) ),
			'@' => array( 'td', array( 'class' => 'meta' ) ),
			' ' => array( 'td', array() ),
			);
		$first = substr( $line, 0, 1 );
		if ( isset( $tags[$first] ) ) {
			return $tags[$first];
		} else {
			return $default;
		}
	}

}
