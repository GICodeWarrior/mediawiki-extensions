<?php

/**
 * Simple editor that wraps everything.
 */
class FullEditor {
	/**
	 * This function hooks into InlineEditorMark and marks everything.
	 * @param $inlineEditorText InlineEditorText
	 */
	public static function mark( &$inlineEditorText ) {
		// get the original wikitext
		$text = $inlineEditorText->getWikiOriginal();

		// match everything
		$inlineEditorText->addMarking( new InlineEditorMarking( 0, strlen( $text ), 'fullEditorElement inlineEditorBasic', true, true, 100 ) );

		return true;
	}
}
