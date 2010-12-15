/*
 * Script for Article Feedback Extension
 */

( function( $, mw ) {

$( '#catlinks' )
	.before(
		$( '<div></div>' )
			.articleFeedback(/* {
				'ratings': {
					'wellsourced': {
						'id': '1',
						'label': 'article-feedback-beta-wellsourced-field-wellsourced-label',
						'tip': 'article-feedback-beta-wellsourced-field-wellsourced-tip',
					},
					'neutral': {
						'id': '2',
						'label': 'article-feedback-beta-wellsourced-field-neutral-label',
						'tip': 'article-feedback-beta-wellsourced-field-neutral-tip',
					},
					'complete': {
						'id': '3',
						'label': 'article-feedback-beta-wellsourced-field-complete-label',
						'tip': 'article-feedback-beta-wellsourced-field-complete-tip',
					},
					'readable': {
						'id': '4',
						'label': 'article-feedback-beta-wellsourced-field-readable-label',
						'tip': 'article-feedback-beta-wellsourced-field-readable-tip',
					}
				}
			}
			*/
		)
	);

} )( jQuery, mediaWiki );
