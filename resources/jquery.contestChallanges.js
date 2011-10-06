/**
 * JavasSript for the Contest MediaWiki extension.
 * @see https://secure.wikimedia.org/wikipedia/mediawiki/wiki/Extension:Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

( function ( $, mw ) { $.fn.contestChallanges = function( challanges, config ) {
	
	this.challanges = challanges;
	this.config = config;
	
	var _this = this;
	var $this = $( this );
	
	this.challangesList = null;
	
	this.showChallange = function( challange ) {
		// TODO
		console.log( challange );
	};
	
	this.addChallange = function( challange ) {
		var item = $( '<a />' ).attr( 'href', '#' ).html( '' ).click( function() {
			_this.showChallange( challange );
		} );
		
		item.append( $( '<div />' ).attr( 'class', 'mw-codechallenge-l-cap' ) );
		
		var innerDiv = $( '<div />' ).attr( 'class', 'mw-codechallenge-inside' );
		
		innerDiv.html( $( '<div />' ).attr( 'class', 'mw-codechallenge-link-text' )
			.html( $( '<p />' ).text( challange.title ) )
			.append( $( '<p />' ).text( challange.oneline ) )
		);
		
		innerDiv.append( $( '<div />' ).attr( 'class', 'mw-codechallenge-icon-box' ) );
		item.append( innerDiv );
		
		item.append( $( '<div />' ).attr( 'class', 'mw-codechallenge-r-cap' ) );
		
		this.challangesList.append( $( '<li />' ).html( item ) );
	}
	
	this.initChallanges = function() {
		this.challangesList = $( '<ul />' ).attr( 'id', 'contest-challanges-list' );
		
		for ( i in this.challanges ) {
			this.addChallange( this.challanges[i] );
		}
	};
	
	this.init = function() {
		$this.html( $( '<h3 />' ).text( mw.msg( 'contest-welcome-select-header' ) ) );
		
		this.initChallanges();
		
		$this.append( this.challangesList );
	};
	
	this.init();
	
	return this;
	
}; } )( window.jQuery, window.mediaWiki );
