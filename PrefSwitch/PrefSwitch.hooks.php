<?php
/**
 * Hooks for PrefSwitch extension
 *
 * @file
 * @ingroup Extensions
 */

class PrefSwitchHooks {

	/* Protected Static Members */
	
	protected static $modules = array(
		'prefSwitch' => array(
			'scripts' => 'extensions/UsabilityInitiative/PrefSwitch/modules/prefSwitch.js',
			'styles' => 'extensions/UsabilityInitiative/PrefSwitch/modules/prefSwitch.css',
			'dependencies' => 'jquery.client',
		),
	);
	
	/* Static Methods */
	
	/*
	 * LoadExtensionSchemaUpdates hook
	 */
	public static function loadExtensionSchemaUpdates() {
		global $wgExtNewTables, $wgExtNewFields;

		$dir = dirname( __FILE__ ) . '/patches';
		$wgExtNewTables[] = array( 'prefswitch_survey', $dir  . '/PrefSwitch.sql' );
		$wgExtNewFields[] = array( 'prefswitch_survey', 'pss_user_text', $dir  . '/PrefSwitch-addusertext.sql' );
		return true;
	}

	/*
	 * PersonalUrls hook
	 */
	public static function personalUrls( &$personal_urls, &$title ) {
		global $wgUser, $wgRequest;
		
		// Figure out the orgin to include in the link
		$fromquery = array();
		if ( !( $wgRequest->wasPosted() ) ) {
			$fromquery = $wgRequest->getValues();
			unset( $fromquery['title'] );
		}
		// Make sure we don't create links that return to Special:UsabilityPrefSwitch itself
		if ( $title->equals( SpecialPage::getTitleFor( 'PrefSwitch' ) ) ) {
			$query = array( 'from' => $wgRequest->getVal( 'from' ), 'fromquery' => $wgRequest->getVal( 'fromquery' ) );
		} else {
			$query = array(	'from' => $title->getPrefixedDBKey(), 'fromquery' => wfArrayToCGI( $fromquery ) );
		}
		$state = SpecialPrefSwitch::userState( $wgUser );
		if ( $state == 'on' ) {
			// Inserts a link into personal tools - this just gets people to the generic new features page
			$personal_urls = array_merge(
				array(
					"prefswitch-link-anon" => array(
						'text' => wfMsg( 'prefswitch-link-anon' ),
						'href' => SpecialPage::getTitleFor( 'PrefSwitch' )->getFullURL( $query ),
						'class' => 'no-text-transform',
					),
				),
				$personal_urls
			);
			// Make the next link go to the opt-out page
			$query['mode'] = 'off';
		}
		// Inserts a link into personal tools - Uses prefswitch-link-anon, prefswitch-link-on and prefswitch-link-off
		$personal_urls = array_merge(
			array(
				"prefswitch-link-{$state}" => array(
					'text' => wfMsg( 'prefswitch-link-' . $state ),
					'href' => SpecialPage::getTitleFor( 'PrefSwitch' )->getFullURL( $query ),
					'class' => 'no-text-transform',
				),
			),
			$personal_urls
		);
		return true;
	}
	
	/*
	 * ResourceLoaderRegisterModules hook
	 */
	public static function resourceLoaderRegisterModules() {
		foreach ( self::$modules as $name => $resources ) {
			ResourceLoader::register( $name, new ResourceLoaderFileModule( $resources ) );
		}
		return true;
	}
}
