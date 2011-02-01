/*
 * Script for Article Feedback Extension
 */

( function( $, mw ) {

/**
 * Tries to win the lottery based on set odds.
 * 
 * Odds are clamped to the range of 0-1.
 * 
 * @param odds Float: Probability of winning in range of 0 (never) to 1 (always)
 * @return Boolean: Whether you are a winner
 */
function lottery( odds ) {
	return Math.random() <= Math.min( 1, Math.max( 0, odds ) );
};

/**
 * Checks if a pitch is currently muted
 * 
 * @param pitch String: Name of pitch to check
 * @return Boolean: Whether the pitch is muted
 */
function isPitchMuted( pitch ) {
	return $.cookie( 'ext.articleFeedback.pitches.' + pitch ) == 'hide' ? true : false;
}

/**
 * Ensures a pitch will be muted for a given duration of time
 * 
 * @param pitch String: Name of pitch to mute
 * @param durration Integer: Number of days to mute the pitch for
 */
function mutePitch( pitch, durration ) {
	$.cookie( 'ext.articleFeedback.pitches.' + pitch, 'hide', { 'expires': durration } );
}

/**
 * Survey object
 * 
 * This object makes use of Special:SimpleSurvey, and uses some nasty hacks - this needs to be
 * replaced with something much better in the future.
 */
var survey = new ( function( mw ) {
	
	/* Private Members */
	
	var that = this;
	var $dialog = null;
	var $form = null;
	var $message = null;
	// The form is rendered by loading the raw results of a special page into a div, this is the
	// URL of that special page
	var formSource = mw.config.get( 'wgScript' ) + '?' + $.param( {
		'title': 'Special:SimpleSurvey',
		'survey': 'articlerating',
		'raw': 1
	} );
	
	/* Public Methods */
	
	this.load = function() {
		// Try to select existing dialog
		$dialog = $( '#articleFeedback-dialog' );
		// Fall-back on creating one
		if ( $dialog.size() == 0 ) {
			// Create initially in loading state
			$dialog = $( '<div id="articleFeedback-dialog" class="loading" />' )
				.dialog( {
					'width': 600,
					'height': 400,
					'bgiframe': true,
					'autoOpen': true,
					'modal': true,
					'title': mw.msg( 'articlefeedback-survey-title' ),
					'close': function() {
						// Return the survey to default state
						$msg.remove();
						$form.show();
						$dialog
							.dialog( 'option', 'height', 400 )
							.dialog( 'close' );
					}
				} )
				.load( formSource, function() {
					$form = $dialog.find( 'form' );
					// Bypass normal form processing
					$form.submit( function() { return that.submit() } );
					// Dirty hack - we want a fully styled button, and we can't get that from an
					// input[type=submit] control, so we just swap it out
					var $input = $form.find( 'input[type=submit]' );
					var $button = $( '<button type="submit"></button>' )
						.text( $(this).find( 'input[type=submit]' ).val() )
						.button()
						.insertAfter( $input );
					$input.remove();
					// Take dialog out of loading state
					$dialog.removeClass( 'loading' );
				} );
		}
		$dialog.dialog( 'open' );
	};
	this.submit = function() {
		var $dialog = $( '#articleFeedback-dialog' );
		// Put dialog into "loading" state
		$dialog
			.addClass( 'loading' )
			.find( 'form' )
				.hide();
		// Setup request to send information directly to a special page
		var data = {
			'title': 'Special:SimpleSurvey'
		};
		// Build request from form data
		$dialog
			.find( [
				'input[type=text]',
				'input[type=radio]:checked',
				'input[type=checkbox]:checked',
				'input[type=hidden]',
				'textarea'
			].join( ',' ) )
				.each( function() {
					var name = $(this).attr( 'name' );
					if ( name !== '' ) {
						if ( name.substr( -2 ) == '[]' ) {
							var trimmedName = name.substr( 0, name.length - 2 );
							if ( typeof data[trimmedName] == 'undefined' ) {
								data[trimmedName] = [];
							}
							data[trimmedName].push( $(this).val() );
						} else {
							data[name] = $(this).val();
						}
					}
				} );
		// XXX: Not only are we submitting to a special page instead of an API request, but we are
		// screen-scraping the result - this is evil and needs to be addressed later
		$.ajax( {
			'url': wgScript,
			'type': 'POST',
			'data': data,
			'dataType': 'html',
			'success': function( data ) {
				// Take the dialog out of "loading" state
				$dialog.removeClass( 'loading' );
				// Screen-scrape to determine success or error
				var success = $( data ).find( '.simplesurvey-success' ).size() > 0;
				// Display success/error message
				that.alert( success ? 'success' : 'error' );
				// Mute for 30 days
				mutePitch( 'survey', 30 );
			},
			'error': function( XMLHttpRequest, textStatus, errorThrown ) {
				// Take the dialog out of "loading" state
				$dialog.removeClass( 'loading' );
				// Display error message
				that.alert( 'error' );
			}
		} );
		// Do not continue with normal form processing
		return false;
	};
	this.alert = function( message ) {
		$message = $( '<div />' )
			.addClass( 'articleFeedback-survey-message-' + message )
			.text( mw.msg( 'articlefeedback-survey-message-' + message ) )
			.appendTo( $dialog );
		$dialog.dialog( 'option', 'height', $message.height() + 100 )
	};
} )( mediaWiki );

var config = {
	'ratings': {
		'trustworthy': {
			'id': '1',
			'label': 'articlefeedback-field-trustworthy-label',
			'tip': 'articlefeedback-field-trustworthy-tip'
		},
		'objective': {
			'id': '2',
			'label': 'articlefeedback-field-objective-label',
			'tip': 'articlefeedback-field-objective-tip'
		},
		'complete': {
			'id': '3',
			'label': 'articlefeedback-field-complete-label',
			'tip': 'articlefeedback-field-complete-tip'
		},
		'wellwritten': {
			'id': '4',
			'label': 'articlefeedback-field-wellwritten-label',
			'tip': 'articlefeedback-field-wellwritten-tip'
		}
	},
	'pitches': {
		'survey': {
			'condition': function() {
				// If this pitch isn't muted, show this 1/3 of the time
				return !isPitchMuted( 'survey' ) ? lottery( 0.333 ) : false;
			},
			'action': function() {
				survey.load();
				// Hide the pitch immediately
				return true;
			},
			'title': 'articlefeedback-pitch-survey-title',
			'message': 'articlefeedback-pitch-survey-message',
			'accept': 'articlefeedback-pitch-survey-accept',
			'reject': 'articlefeedback-pitch-reject'
		},
		'join': {
			'condition': function() {
				// If this pitch isn't muted and the user is anonymous, show this 1/2 of the time
				return ( !isPitchMuted( 'join' ) && mediaWiki.user.anonymous() )
					? lottery( 0.5 ) : false;
			},
			'action': function() {
				// Go to account creation page
				window.location =
					mediaWiki.config.get( 'wgScript' ) + '?' + $.param( {
						'title': 'Special:UserLogin',
						'type': 'signup',
						'returnto': mediaWiki.config.get( 'wgPageName' )
					} );
				// Mute for 1 day
				mutePitch( 'join', 1 );
				return false;
			},
			'title': 'articlefeedback-pitch-join-title',
			'message': 'articlefeedback-pitch-join-message',
			'accept': 'articlefeedback-pitch-join-accept',
			'reject': 'articlefeedback-pitch-reject',
			// Special alternative action for going to login page
			'altAccept': 'articlefeedback-pitch-join-login',
			'altAction': function() {
				// Go to login page
				window.location =
					mediaWiki.config.get( 'wgScript' ) + '?' + $.param( {
						'title': 'Special:UserLogin',
						'returnto': mediaWiki.config.get( 'wgPageName' )
					} );
				// Mute for 1 day
				mutePitch( 'join', 1 );
				return false;
			}
		},
		'edit': {
			'condition': function() {
				// If this pitch isn't muted, show this always
				return !isPitchMuted( 'edit' );
			},
			'action': function() {
				// Go to edit page
				window.location =
					mediaWiki.config.get( 'wgScript' ) + '?' + $.param( {
						'title': mediaWiki.config.get( 'wgPageName' ),
						'action': 'edit'
					} );
				// Mute for 7 days
				mutePitch( 'edit', 7 );
				return false;
			},
			'title': 'articlefeedback-pitch-edit-title',
			'message': 'articlefeedback-pitch-edit-message',
			'accept': 'articlefeedback-pitch-edit-accept',
			'reject': 'articlefeedback-pitch-reject'
		}
	}
};

/* Load at the bottom of the article */
$( '#catlinks' ).before( $( '<div id="mw-articlefeedback"></div>' ).articleFeedback( config ) );

/* Add link so users can navigate to the feedback tool from the toolbox */
$( '#p-tb ul' )
	.append( '<li id="t-articlefeedback"><a href="#mw-articlefeedback"></a></li>' )
	.find( '#t-articlefeedback a' )
		.text( mw.msg( 'articlefeedback-form-switch-label' ) );

} )( jQuery, mediaWiki );
