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
			courseName = $this.attr( 'data-coursename' ),
			userId = $this.attr( 'data-userid' ),
			userName = $this.attr( 'data-username' ),
			bestName = $this.attr( 'data-bestname' ),
			$dialog = null;
			
			var doRemove = function() {
				var $remove = $( '#ep-instructor-remove-button' );
				var $cancel = $( '#ep-instructor-cancel-button' );

				$remove.button( 'option', 'disabled', true );
				$remove.button( 'option', 'label', mw.msg( 'ep-instructor-removing' ) );

				ep.api.addInstructor( {
					'courseid': courseId,
					'userid': userId,
					'reason': summaryInput.val()
				} ).done( function() {
					$dialog.text( mw.msg( 'ep-instructor-removal-success' ) );
					$remove.remove();
					$cancel.button( 'option', 'label', mw.msg( 'ep-instructor-close-button' ) );
					$cancel.focus();
				} ).fail( function() {
					$remove.button( 'option', 'disabled', false );
					$remove.button( 'option', 'label', mw.msg( 'ep-instructor-remove-retry' ) );
					alert( mw.msg( 'ep-instructor-remove-failed' ) );
				} );
			};

			var summaryInput = $( '<input>' ).attr( {
				'type': 'text',
				'size': 60,
				'maxlength': 250
			} );
			
			$dialog = $( '<div>' ).html( '' ).dialog( {
				'title': mw.msg( 'ep-instructor-remove-title' ),
				'minWidth': 550,
				'buttons': [
					{
						'text': mw.msg( 'ep-instructor-remove-button' ),
						'id': 'ep-instructor-remove-button',
						'click': doRemove
					},
					{
						'text': mw.msg( 'ep-instructor-cancel-button' ),
						'id': 'ep-instructor-cancel-button',
						'click': function() {
							$dialog.dialog( 'close' );
						}
					}
				]
			} );
			
			$dialog.append( $( '<p>' ).text( gM( 'ep-instructor-remove-text', userName, bestName, courseName ) ) );
			
			$dialog.append( summaryInput );
			
			summaryInput.focus();
			
			summaryInput.keypress( function( event ) {
				if ( event.which == '13' ) {
					event.preventDefault();
					doRemove();
				}
			} );
			

			// TODO: input to provide reason/comment for log
		} );
		
	} );
	
})( window.jQuery, window.mediaWiki, window.educationProgram );