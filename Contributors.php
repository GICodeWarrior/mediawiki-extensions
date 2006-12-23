<?php

/**
 * Special page that lists the ten most prominent contributors to an article
 *
 * @package MediaWiki
 * @subpackage Extensions
 * @author Rob Church <robchur@gmail.com>
 */
 
if( defined( 'MEDIAWIKI' ) ) {

	$wgExtensionCredits['specialpage'][] = array( 'name' => 'Contributors', 'author' => 'Rob Church' );
	$wgExtensionFunctions[] = 'efContributors';
	
	$wgAutoloadClasses['SpecialContributors'] = dirname( __FILE__ ) . '/Contributors.page.php';
	$wgSpecialPages['Contributors'] = 'SpecialContributors';
	
	/**
	 * Intelligent cut-off limit; see below
	 */
	$wgContributorsLimit = 10;
	
	/**
	 * After $wgContributorsLimit is reach, contributors with less than this
	 * number of edits to a page won't be listed in normal or inclusion lists
	 */
	$wgContributorsThreshold = 2;
	
	/**
	 * Extension initialisation function
	 */
	function efContributors() {
		global $wgMessageCache, $wgHooks;
		require_once( dirname( __FILE__ ) . '/Contributors.i18n.php' );
		foreach( efContributorsMessages() as $lang => $messages )
			$wgMessageCache->addMessages( $messages, $lang );
		$wgHooks['ArticleDeleteComplete'][] = 'efContributorsInvalidateCache';
		$wgHooks['ArticleSaveComplete'][] = 'efContributorsInvalidateCache';
		# Good god, this is ludicrous!
		$wgHooks['SkinTemplateBuildNavUrlsNav_urlsAfterPermalink'][] = 'efContributorsNavigation';
		$wgHooks['MonoBookTemplateToolboxEnd'][] = 'efContributorsToolbox';
	}
	
	/**
	 * Invalidate the cache we saved for a given title
	 *
	 * @param $article Article object that changed
	 */
	function efContributorsInvalidateCache( &$article ) {
		global $wgMemc;
		$wgMemc->delete( wfMemcKey( 'contributors', $article->getId() ) );
	}
	
	/**
	 * Prepare the toolbox link
	 */
	function efContributorsNavigation( &$skintemplate, &$nav_urls, &$oldid, &$revid ) {
		if ( $skintemplate->mTitle->getNamespace() === NS_MAIN && $revid !== 0 )
			$nav_urls['contributors'] = array(
				'text' => wfMsg( 'contributors-toolbox' ),
				'href' => $skintemplate->makeSpecialUrl( 'Contributors', "target=" . wfUrlEncode( "{$skintemplate->thispage}" ) )
			);
		return true;
	}

	/**
	 * Output the toolbox link
	 */
	function efContributorsToolbox( &$monobook ) {
		if ( isset( $monobook->data['nav_urls']['contributors'] ) )
			if ( $monobook->data['nav_urls']['contributors']['href'] == '' ) {
				?><li id="t-iscite"><?php echo $monobook->msg( 'contributors-toolbox' ); ?></li><?php
			} else {
				?><li id="t-cite"><?php
					?><a href="<?php echo htmlspecialchars( $monobook->data['nav_urls']['contributors']['href'] ) ?>"><?php
						echo $monobook->msg( 'contributors-toolbox' );
					?></a><?php
				?></li><?php
			}
		return true;
	}

} else {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	exit( 1 );
}

?>