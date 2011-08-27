/**
 * JavasSript for the Survey MediaWiki extension.
 * @see https://secure.wikimedia.org/wikipedia/mediawiki/wiki/Extension:Survey
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $ ) { $( document ).ready( function() {
	
	var _this = this;
	
	this.getSurveyData = function( options, callback ) {
		$.getJSON(
			wgScriptPath + '/api.php',
			{
				'action': 'query',
				'list': 'surveys',
				'format': 'json',
				'sunames': options.names.join( '|' )
			},
			function( data ) {
				if ( data.surveys ) {
					callback( data.surveys );
				}
				else if ( data.error ) {
					debugger;
					// TODO
				}
				else {
					debugger;
					// TODO
				}
			}
		);
	};
	
	this.submitSurvey = function() {
		// TODO
	};
	
	this.getSurveyQuestion = function( question ) {
		return ''; // TODO
	};
	
	this.getSurveyQuestions = function( questions ) {
		$questions = $( '<div />' );
		
		for ( i in questions ) {
			$questions.append( this.getSurveyQuestion( questions[i] ) );
		}
		
		return $questions;
	};
	
	this.getSurveyBody = function( surveyData ) {
		$survey = $( '<div />' );
		
		$survey.append( this.getSurveyQuestions( surveyData.questions ) );
		
		$survey.append( JSON.stringify( surveyData ) );
		
		return $survey;
	};
	
	this.initSurvey = function( surveyElement, surveyData ) {
		$div = $( '<div />' ).attr( {
			'style': 'display:none'
		} ).html( $( '<div />' ).attr( { 'id': 'survey-' + surveyData.id } ).html( this.getSurveyBody( surveyData ) ) );
		
		$link = $( '<a />' ).attr( {
			'href': '#survey-' + surveyData.id,
			'id': 'inline'
		} ).html( $div );
		
		surveyElement.html( $link );
		$link.fancybox();
		$link.click();
	};
	
	this.init = function() {
		var surveyNames = [];
		var surveys = [];
		
		$( '.surveytag' ).each( function( index, domElement ) {
			$survey = $( domElement );
			surveyNames.push( $survey.attr( 'survey-data-name' ) );
			surveys[$survey.attr( 'survey-data-name' )] = $survey;
		} );
		
		if ( surveyNames.length > 0 ) {
			this.getSurveyData(
				{
					'names': surveyNames
				},
				function( surveyData ) {
					for ( i in surveyData ) {
						_this.initSurvey( surveys[surveyData[i].name], surveyData[i] );
					}
				}
			);			
		}
	};
	
	this.init();
	
} ); })( jQuery );