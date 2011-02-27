<?php
/*
* Page stability configuration functions
*/
class FlaggedPageConfig {
	/**
	 * Get visibility settings/restrictions for a page
	 * @param Title $title, page title
	 * @param int $flags, FR_MASTER
	 * @returns array (associative) (select,override,autoreview,expiry)
	 */
	public static function getPageStabilitySettings( Title $title, $flags = 0 ) {
		$db = ( $flags & FR_MASTER ) ?
			wfGetDB( DB_MASTER ) : wfGetDB( DB_SLAVE );
		$row = $db->selectRow( 'flaggedpage_config',
			self::selectFields(),
			array( 'fpc_page_id' => $title->getArticleID() ),
			__METHOD__
		);
		return self::getVisibilitySettingsFromRow( $row );
	}

	/**
	 * @return Array basic select fields for FlaggedPageConfig DB row
	 */
	public static function selectFields() {
		return array( 'fpc_override', 'fpc_level', 'fpc_expiry' );
	}

	/**
	 * Get page configuration settings from a DB row
	 */
	public static function getVisibilitySettingsFromRow( $row ) {
		if ( $row ) {
			# This code should be refactored, now that it's being used more generally.
			$expiry = Block::decodeExpiry( $row->fpc_expiry );
			# Only apply the settings if they haven't expired
			if ( !$expiry || $expiry < wfTimestampNow() ) {
				$row = null; // expired
				self::purgeExpiredConfigurations();
			}
		}
		// Is there a non-expired row?
		if ( $row ) {
			$level = $row->fpc_level;
			if ( !self::isValidRestriction( $row->fpc_level ) ) {
				$level = ''; // site default; ignore fpc_level
			}
			$config = array(
				'override'   => $row->fpc_override ? 1 : 0,
				'autoreview' => $level,
				'expiry'	 => Block::decodeExpiry( $row->fpc_expiry ) // TS_MW
			);
			# If there are protection levels defined check if this is valid...
			if ( FlaggedRevs::useProtectionLevels() ) {
				$level = self::getProtectionLevel( $config );
				if ( $level == 'invalid' || $level == 'none' ) {
					// If 'none', make sure expiry is 'infinity'
					$config = self::getDefaultVisibilitySettings(); // revert to default (none)
				}
			}
		} else {
			# Return the default config if this page doesn't have its own
			$config = self::getDefaultVisibilitySettings();
		}
		return $config;
	}

	/**
	 * Get default page configuration settings
	 */
	public static function getDefaultVisibilitySettings() {
		return array(
			# Keep this consistent: 1 => override, 0 => don't
			'override'   => FlaggedRevs::isStableShownByDefault() ? 1 : 0,
			'autoreview' => '',
			'expiry'     => 'infinity'
		);
	}

	
	/**
	 * Find what protection level a config is in
	 * @param array $config
	 * @returns string
	 */
	public static function getProtectionLevel( array $config ) {
		if ( !FlaggedRevs::useProtectionLevels() ) {
			throw new MWException( '$wgFlaggedRevsProtection is disabled' );
		}
		$defaultConfig = self::getDefaultVisibilitySettings();
		# Check if the page is not protected at all...
		if ( $config['override'] == $defaultConfig['override']
			&& $config['autoreview'] == '' )
		{
			return "none"; // not protected
		}
		# All protection levels have 'override' on
		if ( $config['override'] ) {
			# The levels are defined by the 'autoreview' settings
			if ( in_array( $config['autoreview'], FlaggedRevs::getRestrictionLevels() ) ) {
				return $config['autoreview'];
			}
		}
		return "invalid";
	}

	/**
	 * Check if an fpc_level value is valid
	 * @param string $right
	 */
	protected static function isValidRestriction( $right ) {
		if ( $right == '' ) {
			return true; // no restrictions (none)
		}
		return in_array( $right, FlaggedRevs::getRestrictionLevels(), true );
	}

	/**
	 * Purge expired restrictions from the flaggedpage_config table.
	 * The stable version of pages may change and invalidation may be required.
	 */
	public static function purgeExpiredConfigurations() {
		if ( wfReadOnly() ) return;

		$dbw = wfGetDB( DB_MASTER );
		$config = self::getDefaultVisibilitySettings(); // config is to be reset
		$encCutoff = $dbw->addQuotes( $dbw->timestamp() );
		$ret = $dbw->select(
			array( 'flaggedpage_config', 'page' ),
			array( 'fpc_page_id', 'page_namespace', 'page_title' ),
			array( 'page_id = fpc_page_id', 'fpc_expiry < ' . $encCutoff ),
			__METHOD__
			// array( 'FOR UPDATE' )
		);
		$pagesClearConfig = array();
		$pagesClearTracking = $titlesClearTracking = array();
		foreach ( $ret as $row ) {
			# If FlaggedRevs got "turned off" (in protection config)
			# for this page, then clear it from the tracking tables...
			if ( FlaggedRevs::useOnlyIfProtected() && !$config['override'] ) {
				$pagesClearTracking[] = $row->fpc_page_id; // no stable version
				$titlesClearTracking[] = Title::newFromRow( $row ); // no stable version
			}
			$pagesClearConfig[] = $row->fpc_page_id; // page with expired config
		}
		# Clear the expired config for these pages...
		if ( count( $pagesClearConfig ) ) {
			$dbw->delete( 'flaggedpage_config',
				array( 'fpc_page_id' => $pagesClearConfig, 'fpc_expiry < ' . $encCutoff ),
				__METHOD__
			);
		}
		# Clear the tracking rows and update page_touched for the
		# pages in $pagesClearConfig that do now have a stable version...
		if ( count( $pagesClearTracking ) ) {
			FlaggedRevs::clearTrackingRows( $pagesClearTracking );
			$dbw->update( 'page',
				array( 'page_touched' => $dbw->timestamp() ),
				array( 'page_id' => $pagesClearTracking ),
				__METHOD__
			);
		}
		# Also, clear their squid caches and purge other pages that use this page.
		# NOTE: all of these updates are deferred via $wgDeferredUpdateList.
		foreach ( $titlesClearTracking as $title ) {
			FlaggedRevs::purgeSquid( $title );
			if ( FlaggedRevs::inclusionSetting() == FR_INCLUDES_STABLE ) {
				FlaggedRevs::HTMLCacheUpdates( $title ); // purge pages that use this page
			}
		}
	}
}
