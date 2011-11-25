/**
 * JavasSript for the Reviews MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw ) { $.fn.reviewState = function() {

	var _this = this;
	
	this.updateStateLinks = function( $container, id, state ) {
		$container.text( '' );
		
		$container.attr( {
			'data-review-state': state
		} );
		
		var linksForState = {
			'new': ['flagged', 'reviewed'],
			'flagged': ['new', 'reviewed'],
			'reviewed': ['flagged']
		};
		
		for ( i in linksForState[state] ) {
			if ( linksForState[state].hasOwnProperty( i ) ) {
				var targetState = linksForState[state][i];
				var isFirst = $container.text() === '';
				
				if ( isFirst ) {
					$container.append( mw.msg( 'reviews-state-' + state ), ' (' );
				}
				else {
					$container.append( ' | ' );
				}
				
				$container.append( $( '<a>' ).attr( {
					'class': 'review-flag-link',
					'data-target': targetState
				} ).text( mw.msg( 'reviews-pager-change-' + targetState ) ).click( _this.onLinkClick ) );
			}
		}
		
		$container.append( ')' );
	};
	
	this.onLinkClick = function() {
		var $this = $( this );
		var $container = $this.closest( 'div' );
		var state = $container.attr( 'data-review-state' );
		var targetState = $this.attr( 'data-target' );
		var id = $container.attr( 'data-review-id' );
		
		if ( confirm( mw.msg( 'reviews-pager-confirm-' + targetState ) ) ) {
			var requestArgs = {
				'action': 'flagreviews',
				'format': 'json',
				'token': mw.user.tokens.get( 'editToken' ),
				'state': targetState,
				'ids': id
			};
			
			$container.text( mw.msg( 'reviews-pager-updating' ) );
			
			$.post(
				wgScriptPath + '/api.php',
				requestArgs,
				function( data ) {
					if ( data.hasOwnProperty( 'success' ) && data.success ) {
						_this.updateStateLinks( $container, id, targetState );
					}
					else {
						// TODO
						alert( 'Could not change the state of the review' );
						
						_this.updateStateLinks( $container, id, state );
					}
				}
			);
		}
	};
	
	this.setup = function() {
		var $this = $( _this );
		
		_this.updateStateLinks(
			$this,
			$this.attr( 'data-review-id' ),
			$this.attr( 'data-review-state' )
		);
	};
	
	this.setup();

	return this;
	
}; })( window.jQuery, window.mediaWiki );
