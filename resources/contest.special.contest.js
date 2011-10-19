/**
 * JavasSript for the Contest MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw ) { $( document ).ready( function() {
	
	var _this = this;
	
	this.sendReminder = function() {
		
	};
	
	this.showReminderDialog = function() {
		$dialog = $( '<div />' ).html( '' ).dialog( {
			'title': mw.msg( 'contest-contest-reminder-title' ),
			'buttons': [
				{
					'text': mw.msg( 'contest-contest-reminder-send' ),
					'click': function() { _this.sendReminder(); }
				},
				{
					'text': mw.msg( 'contest-contest-reminder-cancel' ),
					'click': function() {
						$( this ).dialog( 'close' );
					}
				}
			]
		} );
		
		$dialog.append( $( '<p />' ).text( mw.msg( 'contest-contest-reminder-preview' ) ) ).append( '<hr />' );
		
		$dialog.append( $( '#reminder-content' ).html() ); 
	};
	
	$( '#send-reminder' ).button().click( this.showReminderDialog );
	
} ); })( window.jQuery, window.mediaWiki );