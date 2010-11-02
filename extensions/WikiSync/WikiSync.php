<?php
/**
 * ***** BEGIN LICENSE BLOCK *****
 * This file is part of WikiSync.
 *
 * WikiSync is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * WikiSync is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WikiSync; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * ***** END LICENSE BLOCK *****
 *
 * WikiSync allows an AJAX-based synchronization of revisions and files between
 * global wiki site and it's local mirror.
 *
 * To activate this extension :
 * * Create a new directory named WikiSync into the directory "extensions" of MediaWiki.
 * * Place the files from the extension archive there.
 * * Add this line at the end of your LocalSettings.php file :
 * require_once "$IP/extensions/WikiSync/WikiSync.php";
 *
 * @version 0.2.1
 * @link http://www.mediawiki.org/wiki/Extension:WikiSync
 * @author Dmitriy Sintsov <questpc@rambler.ru>
 * @addtogroup Extensions
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is a part of MediaWiki extension.\n" );
}

$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'WikiSync',
	'author' => 'QuestPC',
	'url' => 'http://www.mediawiki.org/wiki/Extension:WikiSync',
	'descriptionmsg' => 'wikisync-desc',
);

$dir = dirname(__FILE__);
$wgExtensionMessagesFiles['WikiSync'] = $dir . '/WikiSync.i18n.php';
$wgExtensionAliasesFiles['WikiSync'] = $dir . '/WikiSync.alias.php';
$wgSpecialPages['WikiSync'] = array( 'WikiSyncPage' );
$wgSpecialPageGroups['WikiSync'] = 'pagetools';

WikiSyncSetup::init();

if ( !function_exists( 'json_decode' ) ) {
	function json_decode( $content, $assoc = false ) {
		if ( $assoc ) {
			$json = new Services_JSON( SERVICES_JSON_LOOSE_TYPE );
		} else {
			$json = new Services_JSON;
		}
		return $json->decode( $content );
	}
}

if ( !function_exists( 'json_encode' ) ) {
	function json_encode( $content ) {
		$json = new Services_JSON;
		return $json->encode($content);
	}
}

class WikiSyncSetup {
	# {{{ changable in LocalSettings.php :
	static $remote_wiki_root = 'http://www.mediawiki.org/w';
	static $remote_wiki_user = '';
	static $proxy_address = ''; # 'http://10.0.0.78:3128';
	# which user groups can synchronize from remote to local
	static $rtl_access_groups = array( 'user' );
	# which user groups can synchronize from local to remote
	static $ltr_access_groups = array( 'sysop', 'bureaucrat' );
	# }}}

	# {{{ decoded local proxy settings
	static $proxy_host = '';
	static $proxy_port = '';
	static $proxy_user = '';
	static $proxy_pass = '';
	# }}}

	static $version = '0.2.1'; // version of extension
	static $ExtDir; // filesys path with windows path fix
	static $ScriptPath; // apache virtual path

	static function init() {
		global $wgScriptPath;
		global $wgAutoloadClasses;
		global $wgAjaxExportList;
		global $wgAPIModules;

		self::$ExtDir = str_replace( "\\", "/", dirname( __FILE__ ) );
		$top_dir = explode( '/', self::$ExtDir );
		$top_dir = array_pop( $top_dir );
		self::$ScriptPath = $wgScriptPath . '/extensions' . ( ( $top_dir == 'extensions' ) ? '' : '/' . $top_dir );

		if ( !isset( $wgAutoloadClasses['_QXML'] ) ) {
			$wgAutoloadClasses['_QXML'] = self::$ExtDir . '/WikiSyncBasic.php';
		}
		$wgAutoloadClasses['Snoopy'] = self::$ExtDir . '/Snoopy/Snoopy.class.php';
		$wgAutoloadClasses['Services_JSON'] = self::$ExtDir . '/pear/JSON.php';
		$wgAutoloadClasses['WikiSnoopy'] =
		$wgAutoloadClasses['WikiSyncJSONresult'] =
		$wgAutoloadClasses['WikiSyncClient'] = self::$ExtDir . '/WikiSyncClient.php';
		$wgAutoloadClasses['WikiSyncPage'] = self::$ExtDir . '/WikiSyncPage.php';
		$wgAutoloadClasses['WikiSyncExporter'] =
		$wgAutoloadClasses['WikiSyncImportReporter'] = self::$ExtDir . '/WikiSyncExporter.php';
		$wgAutoloadClasses['ApiWikiSync'] =
		$wgAutoloadClasses['ApiRevisionHistory'] =
		$wgAutoloadClasses['ApiFindSimilarRev'] =
		$wgAutoloadClasses['ApiGetFile'] = self::$ExtDir . '/WikiSyncApi.php';

		$wgAPIModules['revisionhistory'] = 'ApiRevisionHistory';
		$wgAPIModules['similarrev'] = 'ApiFindSimilarRev';
		$wgAPIModules['getfile'] = 'ApiGetFile';

		$wgAjaxExportList[] = 'WikiSyncClient::remoteLogin';
		$wgAjaxExportList[] = 'WikiSyncClient::localAPIget';
		$wgAjaxExportList[] = 'WikiSyncClient::remoteAPIget';
		$wgAjaxExportList[] = 'WikiSyncClient::syncXMLchunk';
		$wgAjaxExportList[] = 'WikiSyncClient::findNewFiles';
		$wgAjaxExportList[] = 'WikiSyncClient::transferFileBlock';
		$wgAjaxExportList[] = 'WikiSyncClient::uploadLocalFile';

		if ( ($parsed_url = parse_url( self::$proxy_address )) !== false ) {
			if ( isset( $parsed_url['host'] ) ) { self::$proxy_host = $parsed_url['host']; }
			if ( isset( $parsed_url['port'] ) ) { self::$proxy_port = $parsed_url['port']; }
			if ( isset( $parsed_url['user'] ) ) { self::$proxy_user = $parsed_url['user']; }
			if ( isset( $parsed_url['pass'] ) ) { self::$proxy_pass = $parsed_url['pass']; }
		}
	}

	static function checkUserMembership( $groups ) {
		global $wgUser, $wgLang;
		$ug = $wgUser->getEffectiveGroups();
		if ( !$wgUser->isAnon() && !in_array( 'user', $ug ) ) {
			$ug[] = 'user';
		}
		if ( array_intersect( $groups, $ug ) ) {
			return true;
		}
		return wfMsg( 'wikisync_api_result_noaccess', $wgLang->commaList( $groups ) );
	}

	/*
	 * should not be called from LocalSettings.php
	 * should be called only when the wiki is fully initialized
	 * @param $direction defines the direction of synchronization
	 *     true - from remote to local wiki
	 *     false - from local to remote wiki
	 *     null - direction is undefined yet (any direction)
	 * @return true, when the current user has access to synchronization;
	 *     string error message, when the current user has no access
	 */
	static function initUser( $direction = null) {
		wfLoadExtensionMessages( 'WikiSync' );
		if ( $direction === true ) {
			return self::checkUserMembership( self::$rtl_access_groups );
		} elseif ( $direction === false ) {
			return self::checkUserMembership( self::$ltr_access_groups );
		} elseif ( $direction === null ) {
			$groups = array_merge( self::$rtl_access_groups, self::$ltr_access_groups );
			return self::checkUserMembership( $groups );
		}
		return 'Bug: direction should be boolean or null, value (' . $direction . ') given in ' . __METHOD__;
	}

} /* end of WikiSyncSetup class */
