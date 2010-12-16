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
	}
};
// Bucket 1 - load at the bottom of the article
$( '#catlinks' )
	.before( $( '<div></div>' ).articleFeedback( $.extend( config, { 'bucket': 1 } ) ) );

} )( jQuery, mediaWiki );
