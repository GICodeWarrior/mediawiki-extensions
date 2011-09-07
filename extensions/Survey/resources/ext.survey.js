/**
 * JavasSript for the Survey MediaWiki extension.
 * @see https://secure.wikimedia.org/wikipedia/mediawiki/wiki/Extension:Survey
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

window.survey = new( function() {
	
	this.log = function( message ) {
		if ( true /* window.wgSurveyDebug */ ) { // TODO
			if ( typeof mediaWiki === 'undefined' ) {
				if ( typeof console !== 'undefined' ) {
					console.log( 'Survey: ' + message );
				}
			}
			else {
				return mediaWiki.log.call( mediaWiki.log, 'Survey: ' + message );
			}
		}
	};
	
	this.msg = function() {
		if ( typeof mediaWiki === 'undefined' ) {
			message = window.wgSurveyMessages[arguments[0]];
			
			for ( var i = arguments.length - 1; i > 0; i-- ) {
				message = message.replace( '$' + i, arguments[i] );
			}
			
			return message;
		}
		else {
			return mediaWiki.msg.apply( mediaWiki.msg, arguments );
		}
	};
	
	this.htmlSelect = function( options, value, attributes ) {
		$select = $( '<select />' ).attr( attributes );
		
		for ( message in options ) {
			var attribs = { 'value': options[message] };
			
			if ( value === options[message] ) {
				attribs.selected = 'selected';
			}
			
			$select.append( $( '<option />' ).text( message ).attr( attribs ) );
		}
		
		return $select;
	};
	
	this.question = new( function() {
		
		this.type = new( function() {
			this.TEXT = 0;
			this.NUMBER = 1;
			this.SELECT = 2;
			this.RADIO = 3;
		} );
		
		this.getTypeSelector = function( value, attributes ) {
			var options = [];
			
			var types = {
				'text': survey.question.type.TEXT,
				'number': survey.question.type.NUMBER,
				'select': survey.question.type.SELECT,
				'radio': survey.question.type.RADIO
			};
			
			for ( msg in types ) {
				options[survey.msg( 'survey-question-type-' + msg )] = types[msg];
			}
			
			return survey.htmlSelect( options, parseInt( value ), attributes );
		};
		
	} );
	
} )();


