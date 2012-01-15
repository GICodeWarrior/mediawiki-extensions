<?php

/**
 * Static class for hooks handled by the Education Program extension.
 *
 * @since 0.1
 *
 * @file EducationProgram.hooks.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class EPHooks {

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
		$updater->addExtensionTable(
			'ep_orgs',
			dirname( __FILE__ ) . '/sql/EducationProgram.sql'
		);

		$updater->addExtensionUpdate( array(
			'addField',
			'ep_orgs',
			'org_courses',
			dirname( __FILE__ ) . '/sql/AddExtraFields.sql',
			true
		) );

		$updater->addExtensionUpdate( array(
			'addField',
			'ep_orgs',
			'org_active',
			dirname( __FILE__ ) . '/sql/AddStatusFields.sql',
			true
		) );
		
		$updater->addExtensionUpdate( array(
			'addField',
			'ep_courses',
			'course_instructors',
			dirname( __FILE__ ) . '/sql/AddMentorFields.sql',
			true
		) );
		
		$updater->addExtensionUpdate( array(
			'addField',
			'ep_terms',
			'term_students',
			dirname( __FILE__ ) . '/sql/AddStudentsField.sql',
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
		if ( EPSettings::get( 'enableTopLink' ) ) {
			global $wgUser;

			// Find the watchlist item and replace it by the my contests link and itself.
			if ( $wgUser->isLoggedIn() && $wgUser->getOption( 'ep_showtoplink' ) ) {
				$url = SpecialPage::getTitleFor( 'MyCourses' )->getLinkUrl();
				$myCourses = array(
					'text' => wfMsg( 'ep-toplink' ),
					'href' => $url,
					'active' => ( $url == $title->getLinkUrl() )
				);

				$insertUrls = array( 'mycourses' => $myCourses );

				$personal_urls = wfArrayInsertAfter( $personal_urls, $insertUrls, 'preferences' );
			}
		}

		return true;
	}

	/**
	 * Adds the preferences of Education Program to the list of available ones.
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
		if ( EPSettings::get( 'enableTopLink' ) ) {
			$preferences['ep_showtoplink'] = array(
				'type' => 'toggle',
				'label-message' => 'ep-prefs-showtoplink',
				'section' => 'education',
			);
		}

		return true;
	}
	
	/**
	 * Handles formatting of log entries for MediaWiki 1.18.x. 
	 * 
	 * @since 0.1
	 * 
	 * @param string $type
	 * @param string $action
	 * @param Title $title
	 * @param boolean|null $forUI
	 * @param array $params
	 * 
	 * @return string
	 */
	public static function formatLogEntry( $type, $action, Title $title, $forUI, array $params ) {
		global $wgContLang, $wgLang;
		
		return wfMessage( 'logentry-' . $type . '-' . $action )->params(
			'', // User link in the new system
			'#', // User name for gender in the new system
			Message::rawParam( $forUI ? Linker::link( $title ) : $title->getPrefixedText() )
		)->inLanguage( $forUI === null ? $wgContLang : $wgLang )->text();
	}

}
