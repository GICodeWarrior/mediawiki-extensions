/**
 * JavasSript for the Contest MediaWiki extension.
 * @see https://secure.wikimedia.org/wikipedia/mediawiki/wiki/Extension:Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

// TODO: put all stuff in HTMLForm form so the submission stuff doesn't fail

(function( $, mw ) {
	
	function addChallangeToRemove( id ) {
		if ( !isNaN( id ) ) {
			var currentVal = $( '#delete-challanges' ).val();
			
			var currentIds = currentVal !== ''  ? currentVal.split( '|' ) : [];
			currentIds.push( id );
			
			$( '#delete-challanges' ).val( currentIds.join( '|' ) );
		}
	}
	
	$.fn.mwChallange = function( options ) {
		
		var _this = this;
		var $this = $( this );
		this.options = options;
		
		this.titleInput = null;
		this.textInput = null;
		this.deleteButton = null;
		
		this.remove = function() {
			addChallangeToRemove( $this.attr( 'data-challange-id' ) );
			
			$tr = $this.closest( 'tr' );
			$tr.slideUp( 'fast', function() { $tr.remove(); } );
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
						return false;
					}
				} );
			
			$this.append( this.deleteButton );
		};
		
		this.init();
		
		return this;
		
	};
	
	var newNr = 0;
	var $table = null;
	
	function getNewChallangeMessage() {
		return mw.msg( 'contest-edit-add-' + ( $( '.contest-challange-input' ).size() === 0 ? 'first' : 'another' ) );
	}
	
	function addChallange( challange ) {
		$challange = $( '<div />' ).attr( {
			'class': 'contest-challange-input',
			'data-challange-id': challange.id,
			'data-challange-title': challange.title,
			'data-challange-text': challange.text
		} );
		
		$tr = $( '<tr />' );
		
		$tr.append( $( '<td />' ) );
		
		$tr.append( $( '<td />' ).html( $challange ).append( '<hr />' ) );
		
		$( '.add-new-challange' ).before( $tr );
		
		$challange.mwChallange();
	}
	
	$( document ).ready( function() {

		$table = $( '#contest-name-field' ).closest( 'tbody' );
		
		$( '#bodyContent' ).find( '[type="submit"]' ).button();
		
		$table.append( '<tr><td colspan="2"><hr /></td></tr>' );
		
		$addNew = $( '<button />' ).button( { 'label': getNewChallangeMessage() } ).click( function() {
			addChallange( {
				'id': 'new-' + newNr++ ,
				'title': '',
				'text': ''
			} );
			
			$( this ).button( { 'label': getNewChallangeMessage() } );
			
			return false;
		} );
		
		$table.append( $( '<tr />' ).attr( 'class', 'add-new-challange' ).html( $( '<td />' ) ).append( $( '<td />' ).html( $addNew ) ) );
		
		$table.append( '<tr><td colspan="2"><hr /></td></tr>' );
		
		$( '.contest-challange' ).each( function( index, domElement ) {
			$this = $( domElement );
			addChallange( {
				'id': $this.attr( 'data-challange-id' ),
				'title': $this.attr( 'data-challange-title' ),
				'text': $this.attr( 'data-challange-text' )
			} );
		} );
		
	} );
	
})( window.jQuery, window.mediaWiki );
