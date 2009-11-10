/* JavaScript for WikiEditor Preview module */

js2AddOnloadHook( function() {
	// Check preferences for preview
	if ( !wgWikiEditorPreferences || !( wgWikiEditorPreferences.preview && wgWikiEditorPreferences.preview.enable ) ) {
		return true;
	}
	// Add the preview module
	if ( $j.wikiEditor ) {
		$j( 'textarea#wpTextbox1' ).wikiEditor( 'addModule', 'preview' );
	}
});
