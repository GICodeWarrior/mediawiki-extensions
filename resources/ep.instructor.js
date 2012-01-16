/**
 * JavasSript for the Education Program MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Education_Program
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw, ep ) { 

	$( document ).ready( function() {
		
		$( '.ep-instructor-remove' ).click( function( event ) {
			var $this = $( this ),
			courseId = $this.attr( 'data-courseid' ),
			userId = $this.attr( 'data-userid' ),
			$dialog = null;

			$dialog = $( '<div />' ).html( '' ).dialog( {
				'title': mw.msg( 'ep-instructor-remove-title' ),
				'minWidth': 550,
				'buttons': [
					{
						'text': mw.msg( 'ep-instructor-remove-button' ),
						'id': 'instructor-remove-button',
						'click': function() {
							var $remove = $( '#ep-instructor-remove-button' );
							var $cancel = $( '#reminder-cancel-button' );

							$remove.button( 'option', 'disabled', true );
							$remove.button( 'option', 'label', mw.msg( 'ep-instructor-removing' ) );

							ep.api.addInstructor( {
								'courseid': courseId,
								'userid': userId
							} ).done( function() {
								$dialog.text( mw.msg( 'ep-instructor-removal-success' ) );
								$remove.remove();
								$cancel.button( 'option', 'label', mw.msg( 'ep-instructor-close-button' ) );
							} ).fail( function() {
								$remove.button( 'option', 'label', mw.msg( 'ep-instructor-remove-retry' ) );
								$remove.button( 'option', 'disabled', false );
								alert( mw.msg( 'ep-instructor-remove-failed' ) );
							} );
						}
					},
					{
						'text': mw.msg( 'ep-instructor-cancel-button' ),
						'id': 'instructor-cancel-button',
						'click': function() {
							$dialog.dialog( 'close' );
						}
					}
				]
			} );

			// TODO: input to provide reason/comment for log
		} );
		
	} );
	
})( window.jQuery, window.mediaWiki, window.educationProgram );