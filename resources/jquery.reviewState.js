/**
 * JavasSript for the Reviews MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw ) { $.fn.reviewState = function( options ) {

	var settings = $.extend( {
		
	}, options );
	
	return this.each( function() {
	
		var _this = this;
		var $this = $( _this );
		
		this.linksForState = null;
		
		this.updateStateLinks = function( id, state ) {
			$this.text( '' );
			
			$this.attr( {
				'data-review-state': state
			} );
			
			for ( i in this.linksForState[state] ) {
				if ( this.linksForState[state].hasOwnProperty( i ) ) {
					var targetState = this.linksForState[state][i];
					var isFirst = $this.text() === '';
					
					if ( isFirst ) {
						$this.append( mw.msg( 'reviews-state-' + state ), ' (' );
					}
					else {
						$this.append( ' | ' );
					}
					
					$this.append( $( '<a>' ).attr( {
						'class': 'review-flag-link',
						'data-target': targetState
					} ).text( mw.msg( 'reviews-pager-change-' + targetState ) ).click( this.onLinkClick ) );
				}
			}
			
			if ( this.linksForState[state].length > 0 ) {
				$this.append( ')' );
			}
		};
		
		this.onLinkClick = function() {
			var state = $this.attr( 'data-review-state' );
			var id = $this.attr( 'data-review-id' );
			var targetState = $( this ).attr( 'data-target' );
			
			if ( confirm( mw.msg( 'reviews-pager-confirm-' + targetState ) ) ) {
				var requestArgs = {
					'action': 'flagreviews',
					'format': 'json',
					'token': mw.user.tokens.get( 'editToken' ),
					'state': targetState,
					'ids': id
				};
				
				$this.text( mw.msg( 'reviews-pager-updating' ) );
				
				$.post(
					wgScriptPath + '/api.php',
					requestArgs,
					function( data ) {
						if ( data.hasOwnProperty( 'success' ) && data.success ) {
							_this.updateStateLinks( id, targetState );
						}
						else {
							// TODO
							alert( 'Could not change the state of the review' );
							
							_this.updateStateLinks( id, state );
						}
					}
				);
			}
		};
		
		this.setup = function() {
			this.linksForState = $.parseJSON( $this.attr( 'data-review-states' ) );
			
			this.updateStateLinks(
				$this.attr( 'data-review-id' ),
				$this.attr( 'data-review-state' )
			);
		};
		
		this.setup();

	});
	
}; })( window.jQuery, window.mediaWiki );
