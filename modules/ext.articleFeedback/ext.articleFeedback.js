/*
 * Script for Article Feedback Extension
 */

( function( $, mw ) {

var config = {
	'ratings': {
		'wellsourced': {
			'id': '1',
			'label': 'articlefeedback-field-wellsourced-label',
			'tip': 'articlefeedback-field-wellsourced-tip'
		},
		'neutral': {
			'id': '2',
			'label': 'articlefeedback-field-neutral-label',
			'tip': 'articlefeedback-field-neutral-tip'
		},
		'complete': {
			'id': '3',
			'label': 'articlefeedback-field-complete-label',
			'tip': 'articlefeedback-field-complete-tip'
		},
		'readable': {
			'id': '4',
			'label': 'articlefeedback-field-readable-label',
			'tip': 'articlefeedback-field-readable-tip'
		}
	}
};
// Bucket 1 - load at the bottom of the article
$( '#catlinks' )
	.before( $( '<div></div>' ).articleFeedback( $.extend( config, { 'bucket': 1 } ) ) );

} )( jQuery, mediaWiki );
