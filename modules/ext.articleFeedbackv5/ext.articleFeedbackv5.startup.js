/*
 * Script for Article Feedback Extension
 */

/**
 * Global debug function
 *
 * @param any Output message
 */
aft5_debug = function( any ) {
	if ( typeof console != 'undefined' ) {
		console.log( any );
	}
}

/*** Main entry point ***/
jQuery( function( $ ) {
	
	// Load check, is this page ArticleFeedbackv5-enabled ?
	// Keep in sync with ApiArticleFeedbackv5.php
	if (
		// Only on pages in namespaces where it is enabled
		$.inArray( mw.config.get( 'wgNamespaceNumber' ), mw.config.get( 'wgArticleFeedbackv5Namespaces', [] ) ) > -1
		// Existing pages
		&& mw.config.get( 'wgArticleId' ) > 0
		// View pages
		&& ( mw.config.get( 'wgAction' ) == 'view' || mw.config.get( 'wgAction' ) == 'purge' )
		// If user is logged in, showing on action=purge is OK,
		// but if user is logged out, action=purge shows a form instead of the article,
		// so return false in that case.
		&& !( mw.config.get( 'wgAction' ) == 'purge' && mw.user.anonymous() )
		// Current revision
		&& mw.util.getParamValue( 'diff' ) == null
		&& mw.util.getParamValue( 'oldid' ) == null
		// Not disabled via preferences
		&& !mw.user.options.get( 'articlefeedback-disable' )
		// Not viewing a redirect
		&& mw.util.getParamValue( 'redirect' ) != 'no'
		// Not viewing the printable version
		&& mw.util.getParamValue( 'printable' ) != 'yes'
	) {
		// Collect categories for intersection tests
		var categories = {
			'include': mw.config.get( 'wgArticleFeedbackv5Categories', [] ),
			'exclude': mw.config.get( 'wgArticleFeedbackv5BlacklistCategories', [] ),
			'current': mw.config.get( 'wgCategories', [] )
		};
        
        // Categories are configured with underscores, but article's categories are returned with
        // spaces instead. Revert to underscores here for sane comparison.
        for( cat in categories['current'] ) {
            categories['current'][cat] = categories['current'][cat].replace(/\s/gi, '_');
        }

		// Category exclusion
		var disable = false;
		for ( var i = 0; i < categories.current.length; i++ ) {
			if ( $.inArray( categories.current[i], categories.exclude ) > -1 ) {
				disable = true;
				break;
			}
		}

		// Category inclusion
		var enable = false;
		for ( var i = 0; i < categories.current.length; i++ ) {
			if ( $.inArray( categories.current[i], categories.include ) > -1 ) {
				enable = true;
				break;
			}
		}

		// Lottery inclusion
		var wonLottery = ( Number( mw.config.get( 'wgArticleId', 0 ) ) % 1000 )
				< Number( mw.config.get( 'wgArticleFeedbackv5LotteryOdds', 0 ) ) * 10;

		// Lazy loading
		if ( !disable && ( wonLottery || enable ) ) {
			mw.loader.load( 'ext.articleFeedbackv5' );
			// Load the IE-specific module
			if( navigator.appVersion.indexOf( 'MSIE' ) != -1 ) {
				mw.loader.load( 'ext.articleFeedbackv5.ie' );
			}
		}
	}
} );
