<?php

/**
 * Special page used to wipe the OBJECTCACHE table
 * I use it on test wikis when I'm fiddling about with things en masse that could be cached
 *
 * @addtogroup Extensions
 * @author Rob Church <robchur@gmail.com>
 * @licence Public domain
 */

if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	exit( 1 );
}

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'Purge Cache',
	'author' => 'Rob Church',
	'description' => 'Special page used to wipe the OBJECTCACHE table',
	'descriptionmsg' => 'purgecache-desc',
	'svn-date' => '$LastChangedDate$',
	'svn-revision' => '$LastChangedRevision$',
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['PurgeCache'] = $dir . 'PurgeCache.i18n.php';
$wgExtensionAliasesFiles['PurgeCache'] = $dir . 'PurgeCache.alias.php';
$wgAutoloadClasses['SpecialPurgeCache'] = $dir . 'PurgeCache_body.php';
$wgSpecialPages['PurgeCache'] = 'SpecialPurgeCache';

$wgAvailableRights[] = 'purgecache';
$wgGroupPermissions['developer']['purgecache'] = true;
