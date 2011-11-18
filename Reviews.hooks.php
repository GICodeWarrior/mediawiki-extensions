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
	 *
	 * @since 0.1
	 *
	 * @param DatabaseUpdater $updater
	 *
	 * @return true
	 */
	public static function onSchemaUpdate( /* DatabaseUpdater */ $updater = null ) {

		return true;
	}

	/**
	 * Hook to add PHPUnit test cases.
	 *
	 * @since 0.1
	 *
	 * @param array $files
	 *
	 * @return true
	 */
	public static function registerUnitTests( array &$files ) {
		$testDir = dirname( __FILE__ ) . '/test/';

		//$files[] = $testDir . 'ContestValidationTests.php';

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

		return true;
	}

}
