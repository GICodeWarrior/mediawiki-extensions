/**
 * JavasSript for the Contest MediaWiki extension.
 * @see https://secure.wikimedia.org/wikipedia/mediawiki/wiki/Extension:Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

// TODO: put all stuff in HTMLForm form so the submission stuff doesn't fail

(function( $, mw ) {
	
	$.fn.mwChallange = function( options ) {
		
		var _this = this;
		var $this = $( this );
		this.options = options;
		
		this.titleInput = null;
		this.textInput = null;
		this.deleteButton = null;
		
		this.remove = function() {
			$this.slideUp( 'fast', function() { $this.remove(); } );
		};
		
		this.init = function() {
			$this.html( '' );
			
			this.titleInput = $( '<input />' ).attr( {
				'type': 'text',
				'name': 'contest-challange-' + $this.attr( 'data-challange-id' ),
				'size': 45
			} ).val( $this.attr( 'data-challange-title' ) );
			
			$this.append( 
				$( '<div />' ).html(
					$( '<label />' )
						.text( mw.msg( 'contest-edit-challange-title' ) )
						.attr( 'for', 'contest-challange-' + $this.attr( 'data-challange-id' ) )
				).append( '&#160;' ).append( this.titleInput )
			);
			
			this.textInput = $( '<textarea />' ).attr( {
				'name': 'challange-text-' + $this.attr( 'data-challange-id' )
			} ).val( $this.attr( 'data-challange-text' ) );
			
			$this.append( 
				$( '<div />' ).html(
					$( '<label />' )
						.text( mw.msg( 'contest-edit-challange-text' ) )
						.attr( 'for', 'challange-text-' + $this.attr( 'data-challange-id' ) )
				).append( '<br />' ).append( this.textInput )
			);
			
			this.deleteButton = $( '<button />' )
				.button( { 'label': mw.msg( 'contest-edit-delete' ) } )
				.click( function() {
					if ( confirm( mw.msg( 'contest-edit-confirm-delete' ) ) ) {
						_this.remove();
					}
				} );
			
			$this.append( this.deleteButton );
		};
		
		this.init();
		
		return this;
		
	};
	
	function getNewChallangeMessage() {
		return mw.msg( 'contest-edit-add-' + ( $( '.contest-challange' ).size() === 0 ? 'first' : 'another' ) );
	}
	
	var newNr = 0;
	
	function addChallange() {
		$challange = $( '<div />' ).attr( {
			'class': 'contest-challange',
			'data-challange-id': 'new-' + newNr++,
			'data-challange-title': '',
			'data-challange-text': ''
		} );
		
		$( '.contest-new-challange' ).before( $challange );
		
		$challange.mwChallange();
	}
	
	$( document ).ready( function() {

		$( '.contest-challange' ).mwChallange();
		
		$addNew = $( '<button />' ).button( { 'label': getNewChallangeMessage() } ).click( function() {
			addChallange();
			$( this ).button( { 'label': getNewChallangeMessage() } );
			return false;
		} );
		
		$( '.contest-new-challange' ).html( $addNew );
		
		$( '#bodyContent' ).find( '[type="submit"]' ).button();
	
	} );
	
})( window.jQuery, window.mediaWiki );