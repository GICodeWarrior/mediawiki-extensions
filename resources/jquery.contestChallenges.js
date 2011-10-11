/**
 * JavasSript for the Contest MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

( function ( $, mw ) { $.fn.contestChallenges = function( challenges, config ) {
	
	this.challenges = challenges;
	this.config = config;
	
	var _this = this;
	var $this = $( this );
	
	this.challengesList = null;
	
	this.showChallenge = function( challenge ) {
		// TODO: show challenge pop-up with text and participate button
		window.location = challenge.target;
	};
	
	this.addChallenge = function( challenge ) {
		var item = $( '<a />' ).attr( 'href', '#' ).html( '' ).click( function() {
			_this.showChallenge( challenge );
		} );
		
		item.append( $( '<div />' ).attr( 'class', 'mw-codechallenge-l-cap' ) );
		
		var innerDiv = $( '<div />' ).attr( 'class', 'mw-codechallenge-inside' );
		
		innerDiv.html( $( '<div />' ).attr( 'class', 'mw-codechallenge-link-text' )
			.html( $( '<p />' ).text( challenge.title ) )
			.append( $( '<p />' ).text( challenge.oneline ) )
		);
		
		innerDiv.append( $( '<div />' ).attr( 'class', 'mw-codechallenge-icon-box' ) );
		item.append( innerDiv );
		
		item.append( $( '<div />' ).attr( 'class', 'mw-codechallenge-r-cap' ) );
		
		this.challengesList.append( $( '<li />' ).html( item ) );
	}
	
	this.initChallenges = function() {
		this.challengesList = $( '<ul />' ).attr( 'id', 'contest-challenges-list' );
		
		for ( var i in this.challenges ) {
			this.addChallenge( this.challenges[i] );
		}
	};
	
	this.init = function() {
		$this.html( $( '<h3 />' ).text( mw.msg( 'contest-welcome-select-header' ) ) );
		
		this.initChallenges();
		
		$this.append( this.challengesList );
	};
	
	this.init();
	
	return this;
	
}; } )( window.jQuery, window.mediaWiki );
