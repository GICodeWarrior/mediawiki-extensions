/*
 * Script for Article Feedback Extension
 */

( function( $, mw ) {

var config = {
	'ratings': {
		'trustworthy': {
			'id': '1',
			'label': 'articlefeedback-field-trustworthy-label',
			'tip': 'articlefeedback-field-trustworthy-tip'
		},
		'unbiased': {
			'id': '2',
			'label': 'articlefeedback-field-unbiased-label',
			'tip': 'articlefeedback-field-unbiased-tip'
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
		'takesurvey': {
			'condition': function() {
				// If already taken survey, return false
				return true;
			},
			'action': function() {
				// Do something
			},
			'title': 'articlefeedback-pitch-takesurvey-title',
			'message': 'articlefeedback-pitch-takesurvey-message',
			'accept': 'articlefeedback-pitch-takesurvey-accept',
			'reject': 'articlefeedback-pitch-reject'
		},
		'createaccount': {
			'condition': function() {
				// If user is logged in, return false
				if ( !mediaWiki.user.anonymous() ) {
					return false;
				}
				return true;
			},
			'action': function() {
				// Do something
			},
			'title': 'articlefeedback-pitch-createaccount-title',
			'message': 'articlefeedback-pitch-createaccount-message',
			'accept': 'articlefeedback-pitch-createaccount-accept',
			'reject': 'articlefeedback-pitch-reject'
		},
		'makefirstedit': {
			'condition': function() {
				// If user is not logged in, return false
				if ( mediaWiki.user.anonymous() ) {
					return false;
				}
				return true;
			},
			'action': function() {
				// Do something
			},
			'title': 'articlefeedback-pitch-makefirstedit-title',
			'message': 'articlefeedback-pitch-makefirstedit-message',
			'accept': 'articlefeedback-pitch-makefirstedit-accept',
			'reject': 'articlefeedback-pitch-reject'
		}
	}
};
// Bucket 1 - load at the bottom of the article
$( '#catlinks' )
	.before( $( '<div></div>' ).articleFeedback( $.extend( config, { 'bucket': 1 } ) ) );

} )( jQuery, mediaWiki );
