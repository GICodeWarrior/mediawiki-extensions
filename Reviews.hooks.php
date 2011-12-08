<?php

/**
 * Static class for hooks handled by the Reviews extension.
 *
 * @since 0.1
 *
 * @file Reviews.hooks.php
 * @ingroup Reviews
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class ReviewsHooks {

	/**
	 * Schema update to set up the needed database tables.
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/LoadExtensionSchemaUpdates
	 *
	 * @since 0.1
	 *
	 * @param DatabaseUpdater $updater
	 *
	 * @return true
	 */
	public static function onSchemaUpdate( DatabaseUpdater $updater ) {
		$updater->addExtensionUpdate( array(
			'addTable',
			'reviews',
			dirname( __FILE__ ) . '/sql/Reviews.sql',
			true
		) );
		
		return true;
	}

	/**
	 * Hook to add PHPUnit test cases.
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/UnitTestsList
	 *
	 * @since 0.1
	 *
	 * @param array $files
	 *
	 * @return true
	 */
	public static function registerUnitTests( array &$files ) {
		$testDir = dirname( __FILE__ ) . '/test/';

		return true;
	}


	/**
	 * Called after the personal URLs have been set up, before they are shown.
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/PersonalUrls
	 *
	 * @since 0.1
	 *
	 * @param array $personal_urls
	 * @param Title $title
	 *
	 * @return true
	 */
	public static function onPersonalUrls( array &$personal_urls, Title &$title ) {
		if ( ReviewsSettings::get( 'enableTopLink' ) ) {
			global $wgUser;

			// Find the watchlist item and replace it by the my reviews link and itself.
			if ( $wgUser->isLoggedIn() && $wgUser->getOption( 'reviews_showtoplink' ) ) {
				$keys = array_keys( $personal_urls );
				$watchListLocation = array_search( 'watchlist', $keys );
				$watchListItem = $personal_urls[$keys[$watchListLocation]];

				$url = SpecialPage::getTitleFor( 'MyReviews' )->getLinkUrl();
				$myReviews = array(
					'text' => wfMsg( 'reviews-toplink' ),
					'href' => $url,
					'active' => ( $url == $title->getLinkUrl() )
				);

				array_splice( $personal_urls, $watchListLocation, 1, array( $myReviews, $watchListItem ) );
			}
		}

		return true;
	}

	/**
	 * Adds the preferences of Reviews to the list of available ones.
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/GetPreferences
	 *
	 * @since 0.1
	 *
	 * @param User $user
	 * @param array $preferences
	 *
	 * @return true
	 */
	public static function onGetPreferences( User $user, array &$preferences ) {
		if ( ReviewsSettings::get( 'enableTopLink' ) ) {
			$preferences['reviews_showtoplink'] = array(
				'type' => 'toggle',
				'label-message' => 'reviews-prefs-showtoplink',
				'section' => 'reviews',
			);
		}
		
		$preferences['reviews_showcontrol'] = array(
			'type' => 'toggle',
			'label-message' => 'reviews-prefs-showcontrol',
			'section' => 'reviews',
		);
			
		$preferences['reviews_showedit'] = array(
			'type' => 'toggle',
			'label-message' => 'reviews-prefs-showedit',
			'section' => 'reviews',
		);
		
		return true;
	}
	
	/**
	 * Checks for the reviewable magic word and stores it's precence in the OuputPage
	 * object for further usage in onBeforePageDisplay.
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/OutputPageParserOutput
	 * 
	 * @since 0.1
	 * 
	 * @param OuputPage $out
	 * @param ParserOutput $parseroutput
	 * 
	 * @return true
	 */
	public static function onOutputPageParserOutput( OutputPage &$out, ParserOutput $parserOutput ) {
		if ( $out->isArticle() && $out->getTitle()->exists() && $out->getRequest()->getText( 'action' ) !== 'edit' ) {
			$mw = MagicWord::get( 'REVIEWABLE' );
			
			if ( $mw->matchAndRemove( $parserOutput->mText ) ) {
				$out->reviewsMagicWord = true;
				
				// This is a hack to disable the page caching.
				// TODO: do not output user specific stuff but obtain it via the API after page load.
				$dbw = wfGetDB( DB_MASTER );
				$dbw->update(
					'page',
					array( 'page_touched' => $dbw->timestamp( time() + 9001 ) ),
					$out->getTitle()->pageCond(),
					__METHOD__
				);
		
				HTMLFileCache::clearFileCache( $out->getTitle() );
			}
		}
		
		return true;
	}
	
	/**
	 * Add the review control when needed.
	 * 
	 * @since 0.1
	 * 
	 * @param OutputPage $out
	 * @param Skin $skin
	 * 
	 * @return true
	 */
	public static function onBeforePageDisplay( OutputPage &$out, Skin &$skin ) {
		if ( property_exists( $out, 'reviewsMagicWord' ) && $out->reviewsMagicWord ) {
			$tag = new ReviewsTag();
			$out->addHTML( $tag->render( $out ) );
			
			/* User */ $user = $out->getUser();
	
			if ( $user->isLoggedIn() && $user->isAllowed( 'postreview' ) && $user->getOption( 'reviews_showcontrol' ) ) {
				
				$review = Review::selectRow( null, array(
					'user_id' => $user->getId(),
				 	'page_id' => $out->getTitle()->getArticleID()
				) );
				
				if ( $review === false || $user->getOption( 'reviews_showedit' ) ) {
					$control = new ReviewControl( $review === false ? null : $review );
					$control->addToContext( $out );
				}
			}
		}
		
		return true;
	}
	
	/**
	 * Render the reviews tag.
	 * 
	 * @since 0.1
	 * 
	 * @param mixed $input
	 * @param array $args
	 * @param Parser $parser
	 * @param PPFrame $frame
	 */
	public static function onReviewsRender( $input, array $args, Parser $parser, PPFrame $frame ) {
		$tag = new ReviewsList( $args, $input );
		return $tag->render( null, $parser );
	}
	
	/**
	 * Render the reviews tag.
	 * 
	 * @since 0.1
	 * 
	 * @param mixed $input
	 * @param array $args
	 * @param Parser $parser
	 * @param PPFrame $frame
	 */
	public static function onRatingsRender( $input, array $args, Parser $parser, PPFrame $frame ) {
		$tag = new ReviewRatingsTag( $args, $input );
		return $tag->render( $parser );
	}
	
	/**
	 * Register the reviews tag extension when the parser initializes.
	 * 
	 * @since 0.1
	 * 
	 * @param Parser $parser
	 * 
	 * @return true
	 */
	public static function onParserFirstCallInit( Parser &$parser ) {
		$parser->setHook( 'reviews', __CLASS__ . '::onReviewsRender' );
		$parser->setHook( 'review_ratings', __CLASS__ . '::onRatingsRender' );
		return true;
	}

}
