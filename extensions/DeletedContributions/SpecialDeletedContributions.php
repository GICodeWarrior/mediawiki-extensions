<?php
/**
 @ Extension based on SpecialContributions for arhived revisions
 @ Modifications made to SpecialContributions.php
 @ copyright © 2007 Aaron Schulz
 */

$wgExtensionCredits['specialpage'][] = array(
	'author' => 'Aaron Schulz',
	'name' => 'Deleted user contributions',
	'url' => 'http://www.mediawiki.org/wiki/Extension:DeletedContributions',
	'description' => 'Gives sysops the ability to browse a user\'s deleted edits.'
);

# Internationalisation
$wgExtensionFunctions[] = 'efLoadDeletedContribsMessages';

global $wgHooks;
$wgHooks['ContributionsToolLinks'][] = 'wfLoadContribsLink';

/**
 * Add a "Deleted contributions" link to Special:Contributions for sysops.
 */
function wfLoadContribsLink( $id, $nt, &$links ) {
	global $wgUser;
	if( $wgUser->isAllowed( 'deletedhistory' ) ) {
		$links[] = $wgUser->getSkin()->makeKnownLinkObj(
			SpecialPage::getTitleFor( 'DeletedContributions' ),
			wfMsgHtml( 'deletedcontributions' ),
			'target=' . $nt->getPartialUrl()
		);
	}
	return true;
}

function efLoadDeletedContribsMessages() {
	global $wgMessageCache, $wgDeletedContribsMessages;
	# Internationalization
	require( dirname( __FILE__ ) . '/DeletedContributions.i18n.php' );
	require( dirname( __FILE__ ) . '/DeletedContributions_body.php' );
	foreach ( $wgDeletedContribsMessages as $lang => $langMessages ) {
		$wgMessageCache->addMessages( $langMessages, $lang );
	}
}

$wgSpecialPages['DeletedContributions'] = array( 'SpecialPage', 'DeletedContributions', 'deletedhistory',
		/*listed*/ true, /*function*/ false, /*file*/ false );


