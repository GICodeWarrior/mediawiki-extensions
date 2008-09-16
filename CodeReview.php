<?php
if (!defined('MEDIAWIKI')) die();
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

$wgExtensionCredits['other'][] = array(
	'name' => 'CodeReview',
	'svn-date' => '$LastChangedDate$',
	'svn-revision' => '$LastChangedRevision$',
	'url' => 'http://www.mediawiki.org/wiki/Extension:CodeReview',
	'author' => array( 'Brion Vibber', 'Aaron Schulz', 'Alexandre Emsenhuber', 'Chad Horohoe' ),
	'descriptionmsg' => 'code-desc',
);

$dir = dirname(__FILE__) . '/';

$wgAutoloadClasses['CodeRepository'] = $dir . 'CodeRepository.php';
$wgAutoloadClasses['CodeRepoListView'] = $dir . 'CodeRepoListView.php';
$wgAutoloadClasses['CodeRevision'] = $dir . 'CodeRevision.php';
$wgAutoloadClasses['CodeRevisionAuthorView'] = $dir . 'CodeRevisionAuthorView.php';
$wgAutoloadClasses['CodeRevisionListView'] = $dir . 'CodeRevisionListView.php';
$wgAutoloadClasses['CodeRevisionTagger'] = $dir . 'CodeRevisionTagger.php';
$wgAutoloadClasses['CodeRevisionTagView'] = $dir . 'CodeRevisionTagView.php';
$wgAutoloadClasses['CodeRevisionView'] = $dir . 'CodeRevisionView.php';
$wgAutoloadClasses['CodeComment'] = $dir . 'CodeComment.php';
$wgAutoloadClasses['SpecialCode'] = $dir . 'SpecialCode.php';
$wgAutoloadClasses['CodeView'] = $dir . 'SpecialCode.php';
$wgAutoloadClasses['SpecialRepoAdmin'] = $dir . 'SpecialRepoAdmin.php';
$wgAutoloadClasses['SubversionAdaptor'] = $dir . 'Subversion.php';

$wgExtensionMessagesFiles['CodeReview'] = $dir . 'CodeReview.i18n.php';
$wgExtensionAliasesFiles['CodeReview'] = $dir . 'CodeReview.alias.php';

$wgAvailableRights[] = 'repoadmin';
$wgAvailableRights[] = 'codereview-add-tag';
$wgAvailableRights[] = 'codereview-remove-tag';
$wgAvailableRights[] = 'codereview-post-comment';

$wgGroupPermissions['*']['codereview-add-tag'] = true;
$wgGroupPermissions['*']['codereview-remove-tag'] = true;
$wgGroupPermissions['*']['codereview-post-comment'] = true;

$wgGroupPermissions['steward']['repoadmin'] = true; // temp

$wgSpecialPages['Code'] = 'SpecialCode';
$wgSpecialPages['RepoAdmin'] = 'SpecialRepoAdmin';
