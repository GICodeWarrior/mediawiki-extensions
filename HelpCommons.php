<?php
/**
* HelpCommons
*
* @package MediaWiki
* @subpackage Extensions
*
* @author: Tim 'SVG' Weyer <SVG@Wikiunity.com>
*
* @copyright Copyright (C) 2011 Tim Weyer, Wikiunity
* @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
*
*/

if (!defined('MEDIAWIKI')) {
	echo "THIS IS NOT VALID ENTRY POINT";
	exit(1);
}

$wgExtensionCredits['other'][] = array(
	'name'           => 'HelpCommons',
	'author'         => array( 'Tim Weyer' ),
	'url'            => 'https://www.mediawiki.org/wiki/Extension:HelpCommons',
	'descriptionmsg' => 'helpcommons-desc',
	'version'        => '1.0.1',
);

// Internationalization
$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['HelpCommons'] = $dir . 'HelpCommons.i18n.php';

// Help wiki(s) where the help namespace is fetched from
$wgHelpCommonsFetchingWikis = array();
// If true, all non-existing help pages and talks which exist on help wiki will be protected on non-help wikis
$wgHelpCommonsProtect = true;
// If true, every non-existing help page will be protected on non-help wikis
$wgHelpCommonsProtectAll = false;

// Hooks
$wgHooks['ShowMissingArticle'][] = 'wfHelpCommonsLoad';
$wgHooks['ArticleViewHeader'][] = 'wfHelpCommonsRedirectTalks';
$wgHooks['LinkBegin'][] = 'efHelpCommonsMakeBlueLinks';
$wgHooks['DoEditSectionLink'][] = 'wfHelpCommonsChangeEditSectionLink';
$wgHooks['getUserPermissionsErrors'][] = 'fnProtectHelpCommons';

/**
 * @param $article Article
 * @return bool
 */
function wfHelpCommonsLoad( $article ) {
	global $wgTitle, $wgOut, $wgContLang, $wgHelpCommonsFetchingWikis, $wgLanguageCode, $wgDBname;

	if ( $wgTitle->getNamespace() != NS_HELP ) {
		return false;
	}

	$replacewhitespace = str_replace( ' ', '_', $wgOut->getTitle() );
	$title = str_replace( $wgContLang->namespaceNames[NS_HELP].':', '', $replacewhitespace );

	foreach ( $wgHelpCommonsFetchingWikis as $language => $urls ) {
		foreach ( $urls as $helpwiki ) {
			if ( $wgLanguageCode == $language && $wgDBname != $helpwiki ) {
				$dbr = wfGetDB( DB_SLAVE, array(), $helpwiki );
				$page = $dbr->select(
					'page',
					array( 'page_title', 'page_namespace', 'page_latest' ),
					array( 'page_namespace' => NS_HELP, 'page_title' => $title ),
					__METHOD__
				);
				$page = $dbr->fetchObject( $page );
			}
		}
	}
	if ( !empty( $page->page_title ) ) {
		$rev = $dbr->select( 'revision',
			array( 'rev_id', 'rev_text_id' ),
			array( 'rev_id' => $page->page_latest ),
			__METHOD__
		);
		$rev = $dbr->fetchObject( $rev );
	} else {
		return false;
	}
	$text = $dbr->select( 'text',
		array( 'old_id', 'old_text' ),
		array( 'old_id' => $rev->rev_text_id ),
		__METHOD__
	);
	$text = $dbr->fetchObject( $text );

	if ( !empty( $text->old_text ) ) {
		$wgOut->addWikiText( $text->old_text );
		return true;
	} else {
		return false;
	}
}

/**
 * @param $article
 * @param $fields
 * @return bool
 */
function wfHelpCommonsRedirectTalks( &$article, &$outputDone, &$pcache ) {
	global $wgTitle, $wgOut, $wgContLang, $wgHelpCommonsFetchingWikis, $wgLanguageCode, $wgDBname;

	if ( $wgTitle->getNamespace() != NS_HELP_TALK ) {
		return false;
	}

	$replacewhitespace = str_replace( ' ', '_', $wgOut->getTitle() );
	$title = str_replace( $wgContLang->namespaceNames[NS_HELP_TALK].':', '', $replacewhitespace );

	foreach ( $wgHelpCommonsFetchingWikis as $language => $urls ) {
		foreach ( $urls as $url => $helpwiki ) {
			if ( $wgLanguageCode == $language && $wgDBname != $helpwiki ) {
				$dbr = wfGetDB( DB_SLAVE, array(), $helpwiki );
				$page = $dbr->select(
					'page',
					array( 'page_title', 'page_namespace', 'page_latest' ),
					array( 'page_namespace' => NS_HELP, 'page_title' => $title ),
					__METHOD__
				);
				$page = $dbr->fetchObject( $page );
			}
			if ( !empty( $page->page_title ) ) {
				if ( $page->page_title == $title && !$wgTitle->exists() ) {
					$helpCommonsRedirectTalk = Title::newFromText( $url . '/index.php?title=' . str_replace( ' ', '_', $wgOut->getTitle() ) );
					$redirectTalkPage = $helpCommonsRedirectTalk->getFullText();
					$wgOut->redirect( $redirectTalkPage );
					return true;
				} else {
					return false;
				}
			}
		}
	}
	return true;
}

/**
 * @param $skin
 * @param $target Title
 * @param $text
 * @param $customAttribs
 * @param $query
 * @param $options array
 * @param $ret
 * @return bool
 */
function efHelpCommonsMakeBlueLinks( $skin, $target, &$text, &$customAttribs, &$query, &$options, &$ret ) {

	if ( is_null( $target ) ) {
		return true;
	}

	// only affects non-existing help pages and talks
	if ( $target->getNamespace() != NS_HELP && $target->getNamespace() != NS_HELP_TALK || $target->exists() ) {
		return true;
	}

	// remove "broken" assumption/override
	$brokenKey = array_search( 'broken', $options );
	if ( $brokenKey !== false ) {
		unset( $options[$brokenKey] );
	}

	// make the link "blue"
	$options[] = 'known';

	return true;
}

/**
 * @param $skin
 * @param $title Title
 * @param $section
 * @param $tooltip
 * @param $result
 * @param bool $lang
 * @return bool
 */
function wfHelpCommonsChangeEditSectionLink( $skin, $title, $section, $tooltip, $result, $lang = false ) {
	global $wgTitle, $wgHelpCommonsFetchingWikis, $wgLanguageCode, $wgDBname;

	if ( $wgTitle->getNamespace() != NS_HELP ) {
		return false;
	}

	foreach ( $wgHelpCommonsFetchingWikis as $language => $urls ) {
		foreach ( $urls as $url => $helpwiki ) {
			if ( $wgLanguageCode == $language && $wgDBname != $helpwiki && !$wgTitle->exists() ) {
				// FIXME: $result is unused
				$result = '<span class="editsection">[<a href="' . $url . '/index.php?title=' .
						str_replace( ' ', '_', $title ) . '&amp;action=edit&amp;section=' . $section .
						'" title="' . wfMsg( 'editsectionhint', $tooltip ) . '">' . wfMsg( 'editsection' ) . '</a>]</span>';
			}
		}
	}
	return true;
}

/**
 * @param $title Title
 * @param $user User
 * @param $action
 * @param $result
 * @return bool
 */
function fnProtectHelpCommons( &$title, &$user, $action, &$result ) {
	global $wgHelpCommonsProtect, $wgHelpCommonsProtectAll, $wgHelpCommonsFetchingWikis, $wgLanguageCode, $wgDBname;

	if ( !$wgHelpCommonsProtect && !$wgHelpCommonsProtectAll ) {
		return false;
	}

	foreach ( $wgHelpCommonsFetchingWikis as $language => $urls ) {
		foreach ( $urls as $url => $helpwiki ) {
			// only protect non-existing help pages on non-help-page-fetching wikis
			if ( $wgLanguageCode == $language && $wgDBname != $helpwiki && !$title->exists() ) {
				// block actions 'create', 'edit' and 'protect'
				if ( $action != 'create' && $action != 'edit' && $action != 'protect' ) {
					return true;
				}

				$dbr = wfGetDB( DB_SLAVE, array(), $helpwiki );
				$res = $dbr->select(
					'page',
					array( 'page_title', 'page_namespace', 'page_latest' ),
					array( 'page_namespace' => NS_HELP, 'page_title' => str_replace( ' ', '_', $title->getText() ) ),
					__METHOD__
				);

				if ( $dbr->numRows( $res ) < 1 && $wgHelpCommonsProtect && !$wgHelpCommonsProtectAll ) {
					return true;
				}

				$ns = $title->getNamespace();

				// check namespaces
				if( $ns == NS_HELP || $ns == NS_HELP_TALK ) {
					// error message if action is blocked
					$result = array( 'protectedpagetext' );
					// bail, and stop the request
					return false;
				}
			}
		}
	}
	return true;
}

