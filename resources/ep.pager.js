/**
 * JavasSript for the Education Program MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Education_Program
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw, ep ) { 
	
	$( document ).ready( function() {
		
		$( '.ep-pager-clear' ).click( function() {
			var $form = $( this ).closest( 'form' );
			$form.find( 'select' ).val( '' );
			$form.submit();
			return false;
		} );
		
		$( '.ep-pager-delete' ).click( function() {
			if ( confirm( mw.msg( 'ep-pager-confirm-delete' ) ) ) {
				$this = $( this );
				
				ep.api.remove(
					{
						'type': $this.attr( 'data-type' ),
						'id': $this.attr( 'data-id' )
					},
					function( result ) {
						if ( result.success ) {
							$tr = $this.closest( 'tr' );
							$table = $tr.closest( 'table' );
							
							if ( $table.find( 'tr' ).length > 2 ) {
								$tr.slideUp( 'slow', function() { $tr.remove(); } );
							}
							else {
								$table.slideUp( 'slow', function() {
									$table.remove();
								} );
							}
						}
						else {
							alert( mw.msg( 'ep-pager-delete-fail' ) ); // TODO
						}
					}
				);
			}
		} );
		
	} );
	
})( window.jQuery, window.mediaWiki, window.educationProgram );