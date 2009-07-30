<?php
if ( !defined( 'MEDIAWIKI' ) ) die();
/**
 *
 * @author Brion Vibber
 * @author Aaron Schulz
 * @author Alexandre Emsenhuber
 * @author Chad Horohoe
 * @copyright Copyright © 2008 Brion Vibber <brion@pobox.com>
 * @copyright Copyright © 2008 Chad Horohoe <innocentkiller@gmail.com>
 * @copyright Copyright © 2008 Aaron Schulz <JSchulz_4587@msn.com>
 * @copyright Copyright © 2008 Alexandre Emsenhuber <alex.emsenhuber@bluewin.ch>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/*

What do I need out of SVN?

1) Find out what revisions exist
2) Get id/author/timestamp/notice basics
3) base path helps if available
4) get list of affected files
5) get diffs

http://pecl.php.net/package/svn

*/

$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'CodeReview',
	'url' => 'http://www.mediawiki.org/wiki/Extension:CodeReview',
	'author' => array( 'Brion Vibber', 'Aaron Schulz', 'Alexandre Emsenhuber', 'Chad Horohoe' ),
	'descriptionmsg' => 'code-desc',
);

$dir = dirname( __FILE__ ) . '/';

$wgAutoloadClasses['ApiCodeUpdate'] = $dir . 'api/ApiCodeUpdate.php';
$wgAutoloadClasses['ApiCodeDiff'] = $dir . 'api/ApiCodeDiff.php';
$wgAutoloadClasses['ApiCodeComments'] = $dir . 'api/ApiCodeComments.php';

$wgAutoloadClasses['CodeDiffHighlighter'] = $dir . 'DiffHighlighter.php';
$wgAutoloadClasses['CodeRepository'] = $dir . 'CodeRepository.php';
$wgAutoloadClasses['CodeRepoListView'] = $dir . 'CodeRepoListView.php';
$wgAutoloadClasses['CodeRevision'] = $dir . 'CodeRevision.php';
$wgAutoloadClasses['SubversionAdaptor'] = $dir . 'Subversion.php';

$wgAutoloadClasses['CodeRevisionAuthorView'] = $dir . 'CodeRevisionAuthorView.php';
$wgAutoloadClasses['CodeRevisionAuthorLink'] = $dir . 'CodeRevisionAuthorLink.php';
$wgAutoloadClasses['CodeRevisionListView'] = $dir . 'CodeRevisionListView.php';
$wgAutoloadClasses['CodeRevisionCommitter'] = $dir . 'CodeRevisionCommitter.php';
$wgAutoloadClasses['CodeRevisionStatusView'] = $dir . 'CodeRevisionStatusView.php';
$wgAutoloadClasses['CodeRevisionTagView'] = $dir . 'CodeRevisionTagView.php';
$wgAutoloadClasses['CodeRevisionView'] = $dir . 'CodeRevisionView.php';
$wgAutoloadClasses['CodeAuthorListView'] = $dir . 'CodeAuthorListView.php';
$wgAutoloadClasses['CodeStatusListView'] = $dir . 'CodeStatusListView.php';
$wgAutoloadClasses['CodeTagListView'] = $dir . 'CodeTagListView.php';
$wgAutoloadClasses['CodeCommentsListView'] = $dir . 'CodeCommentsListView.php';
$wgAutoloadClasses['CodeStatusChangeListView'] = $dir . 'CodeStatusChangeListView.php';
$wgAutoloadClasses['CodeReleaseNotes'] = $dir . 'CodeReleaseNotes.php';
$wgAutoloadClasses['CodeComment'] = $dir . 'CodeComment.php';
$wgAutoloadClasses['CodePropChange'] = $dir . 'CodePropChange.php';
$wgAutoloadClasses['SpecialCode'] = $dir . 'SpecialCode.php';
$wgAutoloadClasses['CodeView'] = $dir . 'SpecialCode.php';
$wgAutoloadClasses['SpecialRepoAdmin'] = $dir . 'SpecialRepoAdmin.php';

$wgSpecialPages['Code'] = 'SpecialCode';
$wgSpecialPageGroups['Code'] = 'developer';
$wgSpecialPages['RepoAdmin'] = 'SpecialRepoAdmin';
$wgSpecialPageGroups['RepoAdmin'] = 'developer';

$wgAPIModules['codeupdate'] = 'ApiCodeUpdate';
$wgAPIModules['codediff'] = 'ApiCodeDiff';
$wgAPIListModules['codecomments'] = 'ApiCodeComments';

$wgExtensionMessagesFiles['CodeReview'] = $dir . 'CodeReview.i18n.php';
$wgExtensionAliasesFiles['CodeReview'] = $dir . 'CodeReview.alias.php';

$wgAvailableRights[] = 'repoadmin';
$wgAvailableRights[] = 'codereview-use';
$wgAvailableRights[] = 'codereview-add-tag';
$wgAvailableRights[] = 'codereview-remove-tag';
$wgAvailableRights[] = 'codereview-post-comment';
$wgAvailableRights[] = 'codereview-set-status';
$wgAvailableRights[] = 'codereview-link-user';

$wgGroupPermissions['*']['codereview-use'] = true;

$wgGroupPermissions['user']['codereview-add-tag'] = true;
$wgGroupPermissions['user']['codereview-remove-tag'] = true;
$wgGroupPermissions['user']['codereview-post-comment'] = true;
$wgGroupPermissions['user']['codereview-set-status'] = true;
$wgGroupPermissions['user']['codereview-link-user'] = true;

$wgGroupPermissions['steward']['repoadmin'] = true; // temp

// If you can't directly access the remote SVN repo, you can set this
// to an offsite proxy running this fun little proxy tool:
// http://svn.wikimedia.org/viewvc/mediawiki/trunk/tools/codereview-proxy/
$wgSubversionProxy = false;
$wgSubversionProxyTimeout = 30; // default 3 secs is too short :)

// Command-line options to pass on SVN command line if SVN PECL extension
// isn't available and we're not using the proxy.
// Defaults here should allow working with both http: and https: repos
// as long as authentication isn't required.
$wgSubversionOptions = "--non-interactive --trust-server-cert";

// What is the default SVN import chunk size?
$wgCodeReviewImportBatchSize = 400;

// Bump the version number every time you change a CodeReview .css/.js file
$wgCodeReviewStyleVersion = 5;

// The name of a repo which represents the code running on this wiki, used to highlight active revisions
$wgWikiSVN = 'MediaWiki';

// If you are running a closed svn, fill the following two lines with the username and password
// of a user allowed to access it. Otherwise, leave it false.
// This is only necessary if using the shell method to access Subversion
$wgSubversionUser = false;
$wgSubversionPassword = false;

// Leave this off by default until it works right
$wgCodeReviewENotif = false;

// What images can be used for client-side side-by-side comparisons?
$wgCodeReviewImgRegex = '/\.(png|jpg|jpeg|gif)$/i';

# Schema changes
$wgHooks['LoadExtensionSchemaUpdates'][] = 'efCodeReviewSchemaUpdates';

function efCodeReviewSchemaUpdates() {
	global $wgDBtype, $wgExtNewFields, $wgExtPGNewFields, $wgExtNewIndexes, $wgExtNewTables;
	$base = dirname(__FILE__);
	if( $wgDBtype == 'mysql' ) {
		$wgExtNewTables[] = array( 'code_rev', "$base/codereview.sql" ); // Initial install tables
		$wgExtNewFields[] = array( 'code_rev', 'cr_diff', "$base/archives/codereview-cr_diff.sql" );
		$wgExtNewIndexes[] = array( 'code_relations', 'repo_to_from', "$base/archives/code_relations_index.sql" );
		//$wgExtNewFields[] = array( 'code_rev', "$base/archives/codereview-cr_status.sql" ); // FIXME FIXME this is a change to options... don't know how
		$wgExtNewTables[] = array( 'code_bugs', "$base/archives/code_bugs.sql" );
	} elseif( $wgDBtype == 'postgres' ) {
		// TODO
	}
	return true;
}

