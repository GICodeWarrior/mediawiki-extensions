<?php
/*  Comment pages for main namespace pages
 *  Originally designed for Wikinews
 *  By [[User:Zachary]]
 *  Released under the GPL
 */

$wgExtensionCredits['other'][] = array(
	'path'           => __FILE__,
	'name'           => 'CommentPages',
	'author'         => '[http://en.wikinews.org/wiki/User:Zachary Zachary Hauri]',
	'descriptionmsg' => 'commentpages-desc',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:CommentPages',
);

$wgExtensionMessagesFiles['CommentPages'] = dirname(__FILE__) . '/CommentPages.i18n.php';
$wgHooks['SkinTemplateTabs'][]  = 'wfCommentPagesSkinTemplateTabs';

/**
 * Namespace to use for comments
 */
$wgCommentPagesNS = 100;

$wgCommentPagesContentNamespace = NS_MAIN;

function wfCommentPagesSkinTemplateTabs ( $skin, &$content_actions )
{
	global $wgContLang, $wgCommentPagesNS, $wgCommentPagesContentNamespace;

	wfLoadExtensionMessages( 'CommentPages' );

	$pagename = $skin->mTitle->getText();
	$namespace = $skin->mTitle->getNamespace();
	$class = '';
	$page = '';
	$query = '';

	if ($namespace == $wgCommentPagesContentNamespace ||
			$namespace == $wgCommentPagesContentNamespace + 1 ) {
		$comments = Title::makeTitleSafe( $wgCommentPagesNS, $pagename);
		$newcontent_actions = array();

		if (!$comments->exists()) {
			$class = 'new';
			$query = array( 'action' => 'edit' );

			if (wfMsg('commenttab-preload') != '') {
				$query['preload'] = wfMsg('commenttab-preload');
			}

			if (wfMsg('commenttab-editintro') != '') {
				$query['editintro'] = wfMsg('commenttab-editintro');
			}
		} else {
			$class = '';
		}

		foreach ($content_actions as $key => $value) {
			// Insert the comment tab before the edit link
			if ($key == 'edit') {
				$newcontent_actions['comments'] = array(
					'class' => $class,
					'text'  => wfMsg('nstab-comments'),
					'href'  => $comments->getFullURL($query),
				);
			}
			$newcontent_actions[$key] = $value;
		}

		$content_actions = $newcontent_actions;
	} elseif ($skin->mTitle->getNamespace() == $wgCommentPagesNS) {
		$main = Title::makeTitleSafe( $wgCommentPagesContentNamespace, $pagename);
		$talk = $main->getTalkPage();
		$newcontent_actions = array();

		if (!$main->exists()) {
			$class = 'new';
			$query = 'action=edit';
		} else {
			$class = '';
			$query = '';
		}

		$newcontent_actions['article'] = array(
			'class' => $class,
			'text'  => wfMsg( $main->getNamespaceKey() ),
			'href'  => $main->getFullURL($query),
		);

		if (!$talk->exists()) {
			$class = 'new';
			$query = 'action=edit';
		} else {
			$class = '';
			$query = '';
		}
		$newcontent_actions['talk'] = array(
			'class' => $class,
			'text'  => wfMsg( 'talk' ),
			'href'  => $talk->getFullURL($query),
		);

		foreach ($content_actions as $key => $value) {
			if ($key != 'talk')
				$newcontent_actions[$key] = $value;

			if ($key == 'nstab-comments')
				$newcontent_actions['nstab-comments']['text'] = wfMsg( 'nstab-comments' );
		}

		$content_actions = $newcontent_actions;
	}

	return true;
}
