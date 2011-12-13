<?php

$wgWebStoreSettings = array(
	/**
	 * Set this in LocalSettings.php to an array of IP ranges allowed to access
	 * the store. Empty by default for maximum security.
	 */
	'accessRanges' => array( '127.0.0.1', '::1' ),

	/**
	 * Access ranges for inplace-scaler.php
	 */
	'scalerAccessRanges' => array( '127.0.0.1', '::1' ),

	/**
	 * Main public directory. If false, uses $wgUploadDirectory
	 */
	'publicDir' => false,

	/**
	 * Private temporary directory. If false, uses $wgTmpDirectory
	 */
	'tmpDir' => false,

	/**
	 * Private directory for deleted files. If false, uses $wgFileStore['deleted']['directory']
	 */
	'deletedDir' => false,

	/**
	 * Expiration time for temporary files in seconds. Must be at least 7200.
	 */
	'tempExpiry' => 7200,

	/**
	 * PHP file to display on 404 errors in 404-handler.php
	 */
	'fallback404' => false,

	/**
	 * Connect timeout for forwarded HTTP requests, in seconds
	 */
	'httpConnectTimeout' => 10,

	/**
	 * Overall request timeout for forwarded HTTP requests, in seconds
	 */
	'httpOverallTimeout' => 180,

	/**
	 * Servers that can be used for image scaling
	 */
	'scalerServers' => array( 'localhost' ),

	/**
	 * May be:
	 *      none:      no replacement
	 *      simple:    replace path strings in error messages with a placeholder
	 *      paranoid:  suppress display of all error parameters
	 */
	'pathDisclosureProtection' => 'simple',
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['WebStore'] = $dir . 'WebStore.i18n.php';
#$wgAutoloadClasses['WebStoreClient'] = $dir . 'WebStoreClient.php';
$wgAutoloadClasses['WebStoreCommon'] = $dir . 'WebStoreCommon.php';
$wgAutoloadClasses['WebStorePostFile'] = $dir . 'WebStorePostFile.php';

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'WebStore',
	'author' => 'Tim Starling',
	'descriptionmsg' => 'webstore-desc',
	'url' => 'https://www.mediawiki.org/wiki/Extension:WebStore',
);

define( 'MW_WEBSTORE_ENABLED', 1 );
