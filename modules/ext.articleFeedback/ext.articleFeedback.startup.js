/*
 * Script for Article Feedback Extension
 */

$(document).ready( function() {
	if (
		// Main namespace articles
		mw.config.get( 'wgNamespaceNumber', false ) === 0
		// View pages
		&& mw.config.get( 'wgAction', false ) === 'view'
		// Current revision
		&& mw.util.getParamValue( 'diff' ) === null
		&& mw.util.getParamValue( 'oldid' ) === null
	) {
		// If the version in the client's cookie doesn't match wgArticleFeedbackTrackingVersion,
		// then we need to disregard the bucket they may already be in to ensure accurate
		// redistribution when the odds are changed
		var previousVersion = $.cookie( 'ext.articleFeedback-version' );
		var currentVersion = Number( mw.config.get( 'wgArticleFeedbackTrackingVersion', 0 ) );
		var tracking = null;
		if ( previousVersion === null || Number( previousVersion ) != currentVersion ) {
			$.cookie( 'ext.articleFeedback-version', currentVersion );
		} else {
			tracking = $.cookie( 'ext.articleFeedback-tracking' );
		}
		if ( tracking === null ) {
			// Percentage chance of being tracked
			var odds = Math.min( 100, Math.max( 0,
				Number( mw.config.get( 'wgArticleFeedbackTrackingOdds', 0 ) )
			) );
			// 0 = not tracked, 1 = tracked
			tracking = Number( Math.random() * 100 < odds );
			// Let the cookie expire after 30 days, allowing rotation in which users are tracked
			$.cookie( 'ext.articleFeedback-tracking', tracking, { 'path': '/', 'expires': 30 } );
			// To be extra-sure that the odds are being applied properly, track whether a user is to
			// be tracked or not - this way we can compare the number of people in each bucket to
			// the intended percentages defined by wgArticleFeedbackTrackingOdds
			if ( 'trackAction' in $ ) {
				$.trackAction(
					'ext.articleFeedback@' + currentVersion + '-tracking-' +
						( tracking ? 'on' : 'off' )
				);
			}
		}
		// Category activation
		var articleFeedbackCategories = mw.config.get( 'wgArticleFeedbackCategories', [] );
		var articleCategories = mw.config.get( 'wgCategories', [] );
		var inCategory = false;
		for ( var i = 0; i < articleCategories.length; i++ ) {
			for ( var j = 0; j < articleFeedbackCategories.length; j++ ) {
				if ( articleCategories[i] == articleFeedbackCategories[j] ) {
					inCategory = true;
					// Break 2 levels - could do this with a label, but eww.
					i = articleCategories.length;
					j = articleFeedbackCategories.length;
				}
			}
		}
		// Lottery activation
		var wonLottery = ( Number( mw.config.get( 'wgArticleId', 0 ) ) % 1000 )
				< Number( mw.config.get( 'wgArticleFeedbackLotteryOdds', 0 ) ) * 10;
		
		// Lazy loading
		if ( wonLottery || inCategory ) {
			mw.loader.load( 'ext.articleFeedback' );
		}
	}
} );
