/**
 * JavasSript for the Education Program MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Education_Program
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function ( $, mw, ep ) {

	$( document ).ready( function () {

		$( '.ep-pager-clear' ).click( function () {
			var $form = $( this ).closest( 'form' );
			$form.find( 'select' ).val( '' );
			$form.submit();
			return false;
		} );

		$( '.ep-pager-delete' ).click( function () {
			if ( confirm( mw.msg( 'ep-pager-confirm-delete' ) ) ) {
				var $this = $( this );

				ep.api.remove(
					{
						'type': $this.attr( 'data-type' ),
						'ids': [ $this.attr( 'data-id' ) ]
					},
					function ( result ) {
						if ( result.success ) {
							var $tr = $this.closest( 'tr' );
							var $table = $tr.closest( 'table' );

							if ( $table.find( 'tr' ).length > 2 ) {
								$tr.slideUp( 'slow', function () {
									$tr.remove();
								} );
							}
							else {
								$table.slideUp( 'slow', function () {
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

		$( '.ep-pager-select-all' ).change( function () {
			$( this ).closest( 'table' ).find( 'input:checkbox' ).prop( 'checked', $( this ).is( ':checked' ) );
		} );

		$( '.ep-pager-delete-selected' ).click( function () {
			var $deleteButton = $( this );
			var $selectAllCheckbox = $( '#ep-pager-select-all-' + $( this ).attr( 'data-pager-id' ) );
			var $table = $selectAllCheckbox.closest( 'table' );

			var ids = [];

			$table.find( 'input[type=checkbox]:checked' ).each( function ( i, element ) {
				ids.push( $( element ).val() );
			} );

			if ( ids.length < 1 || !confirm( mw.msg( 'ep-pager-confirm-delete-selected' ) ) ) {
				return;
			}

			var pagerId = $( this ).attr( 'data-pager-id' );

			ep.api.remove(
				{
					'type': $( this ).attr( 'data-type' ),
					'ids': ids
				},
				function ( result ) {
					if ( result.success ) {
						if ( ids.length > 0 && ( $table.find( 'tr' ).length - ids.length > 1 ) ) {
							for ( i in ids ) {
								if ( ids.hasOwnProperty( i ) ) {
									$( '#select-' + pagerId + '-' + ids[i] ).closest( 'tr' ).remove();
								}
							}
						}
						else {
							$table.slideUp( 'slow', function () {
								$table.remove();
								$deleteButton.closest( 'fieldset' ).remove();
							} );
						}
					}
					else {
						alert( mw.msg( 'ep-pager-delete-selected-fail' ) ); // TODO
					}
				}
			);
		} );

	} );

})( window.jQuery, window.mediaWiki, window.educationProgram );