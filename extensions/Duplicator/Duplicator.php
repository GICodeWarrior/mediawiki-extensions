<?php

/**
 * Special page which creates independent copies of articles, retaining
 * separate histories
 *
 * @addtogroup Extensions
 * @author Rob Church <robchur@gmail.com>
 */

if( defined( 'MEDIAWIKI' ) ) {

	$wgExtensionCredits['specialpage'][] = array(
		'name' => 'Duplicator',
		'author' => 'Rob Church',
		'url' => 'http://www.mediawiki.org/wiki/Extension:Duplicator',
		'description' => 'Create independent copies of articles with distinct edit histories',
	);
	$wgExtensionFunctions[] = 'efDuplicator';

	$wgAutoloadClasses['SpecialDuplicator'] = dirname( __FILE__ ) . '/Duplicator.page.php';
	$wgSpecialPages['Duplicator'] = 'SpecialDuplicator';

	/**
	 * User permissions
	 */
	$wgGroupPermissions['user']['duplicate'] = true;

	/**
	 * Pages with more than this number of revisions can't be duplicated
	 */
	$wgDuplicatorRevisionLimit = 250;

	/**
	 * Extension setup function
	 */
	function efDuplicator() {
		global $wgMessageCache, $wgHooks;
		require_once( dirname( __FILE__ ) . '/Duplicator.i18n.php' );
		foreach( efDuplicatorMessages() as $lang => $messages )
			$wgMessageCache->addMessages( $messages, $lang );
		$wgHooks['SkinTemplateBuildNavUrlsNav_urlsAfterPermalink'][] = 'efDuplicatorNavigation';
		$wgHooks['MonoBookTemplateToolboxEnd'][] = 'efDuplicatorToolbox';
	}

	/**
	 * Build the link to be shown in the toolbox if appropriate
	 */
	function efDuplicatorNavigation( &$skin, &$nav_urls, &$oldid, &$revid ) {
		global $wgUser;
		$ns = $skin->mTitle->getNamespace();
		if( ( $ns === NS_MAIN || $ns === NS_TALK ) && $wgUser->isAllowed( 'duplicate' ) ) {
			$nav_urls['duplicator'] = array(
				'text' => wfMsg( 'duplicator-toolbox' ),
				'href' => $skin->makeSpecialUrl( 'Duplicator', "source=" . wfUrlEncode( "{$skin->thispage}" ) )
			);
		}
		return true;
	}

	/**
	 * Output the toolbox link if available
	 */
	function efDuplicatorToolbox( &$monobook ) {
		if ( isset( $monobook->data['nav_urls']['duplicator'] ) ) {
			if ( $monobook->data['nav_urls']['duplicator']['href'] == '' ) {
				?><li id="t-iscite"><?php echo $monobook->msg( 'duplicator-toolbox' ); ?></li><?php
			} else {
				?><li id="t-cite"><?php
					?><a href="<?php echo htmlspecialchars( $monobook->data['nav_urls']['duplicator']['href'] ) ?>"><?php
						echo $monobook->msg( 'duplicator-toolbox' );
					?></a><?php
				?></li><?php
			}
		}
		return true;
	}

} else {
	echo( "This file is an extension to the MediaWiki software, and cannot be used standalone.\n" );
	exit( 1 );
}

?>