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
		'takesurvey': {
			'condition': function() {
				// TODO: If already taken survey, return false
				return true;
			},
			'action': function() {
				var $dialog = $( '#articleFeedback-dialog' );
				if ( $dialog.size() == 0 ) {
					$dialog = $( '<div id="articleFeedback-dialog" class="loading" />' )
						.dialog( {
							'width': 600,
							'height': 400,
							'bgiframe': true,
							'autoOpen': true,
							'modal': true,
							'title': mediaWiki.msg( 'articlefeedback-survey-title' ),
							'close': function() {
								$( this )
									.dialog( 'option', 'height', 400 )
									.find( '.articleFeedback-success-msg, .articleFeedback-error-msg' )
									.remove()
									.end()
									.find( 'form' )
									.show();
							}
						} );
					$dialog.load(
						wgScript + '?title=Special:SimpleSurvey&survey=articlerating&raw=1',
						function() {
							//$( this ).find( 'form' ).bind( 'submit', $.ArticleAssessment.fn.submitFeedback );
							$( this ).removeClass( 'loading' );
						}
					);
				}
				$dialog.dialog( 'open' );
			},
			'title': 'articlefeedback-pitch-takesurvey-title',
			'message': 'articlefeedback-pitch-takesurvey-message',
			'accept': 'articlefeedback-pitch-takesurvey-accept',
			'reject': 'articlefeedback-pitch-reject'
		},
		'createaccount': {
			'condition': function() {
				// If user is logged in, return false
				return mediaWiki.user.anonymous();
			},
			'action': function() {
				// TODO: Do something
			},
			'title': 'articlefeedback-pitch-createaccount-title',
			'message': 'articlefeedback-pitch-createaccount-message',
			'accept': 'articlefeedback-pitch-createaccount-accept',
			'reject': 'articlefeedback-pitch-reject'
		},
		'makefirstedit': {
			'condition': function() {
				// If user is not logged in, return false
				return !mediaWiki.user.anonymous();
			},
			'action': function() {
				// TODO: Do something
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
