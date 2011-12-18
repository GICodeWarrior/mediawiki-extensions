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
	echo "HelpCommons extension";
	exit(1);
}

$wgExtensionCredits['other'][] = array(
	'path'           => __FILE__,
	'name'           => 'HelpCommons',
	'author'         => array( 'Tim Weyer' ),
	'url'            => 'https://www.mediawiki.org/wiki/Extension:HelpCommons',
	'descriptionmsg' => 'helpcommons-desc',
	'version'        => '1.0.2',
);

// Internationalization
$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['HelpCommons'] = $dir . 'HelpCommons.i18n.php';

// Help wiki(s) where the help namespace is fetched from
$wgHelpCommonsFetchingWikis = array();
// If true, all non-existent help pages and talks which exist on help wiki will be protected on non-help wikis
$wgHelpCommonsProtect = true;
// If true, every non-existent help page will be protected on non-help wikis
$wgHelpCommonsProtectAll = false;

// Hooks
$wgHooks['ShowMissingArticle'][] = 'wfHelpCommonsLoad';
$wgHooks['ArticleViewHeader'][] = 'wfHelpCommonsRedirectTalks';
$wgHooks['LinkBegin'][] = 'efHelpCommonsMakeBlueLinks';
$wgHooks['LinkBegin'][] = 'efHelpCommonsChangeCategoryLinks';
$wgHooks['DoEditSectionLink'][] = 'wfHelpCommonsChangeEditSectionLink';
$wgHooks['getUserPermissionsErrors'][] = 'fnProtectHelpCommons';

/**
 * @param $helppage Article
 * @return bool
 */
function wfHelpCommonsLoad( $helppage ) {
	global $wgHelpCommonsFetchingWikis, $wgLanguageCode, $wgDBname, $wgOut;

	$title = $helppage->getTitle();

	if ( $title->getNamespace() != NS_HELP ) {
		return true;
	}

	$dbkey = $title->getDBkey();

	foreach ( $wgHelpCommonsFetchingWikis as $language => $urls ) {
		foreach ( $urls as $helpwiki ) {
			if ( $wgLanguageCode == $language && $wgDBname != $helpwiki ) {
				$dbr = wfGetDB( DB_SLAVE, array(), $helpwiki );
				$page = $dbr->selectRow(
					'page',
					array( 'page_title', 'page_namespace', 'page_latest' ),
					array( 'page_namespace' => NS_HELP, 'page_title' => $dbkey ),
					__METHOD__
				);
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
		return true;
	}
	$text = $dbr->select( 'text',
		array( 'old_id', 'old_text' ),
		array( 'old_id' => $rev->rev_text_id ),
		__METHOD__
	);
	$text = $dbr->fetchObject( $text );

	if ( !empty( $text->old_text ) ) {
		$wgOut->addWikiText( $text->old_text );
		$wgOut->addScript('<style type="text/css">div.noarticletext { display: none; } div.mw-warning-with-logexcerpt { display: none; } #contentSub, #contentSub2 { display: none; }</style>');
		return false;
	} else {
		return true;
	}
}

/**
 * @param $helppage
 * @param $fields
 * @return bool
 */
function wfHelpCommonsRedirectTalks( &$helppage, &$outputDone, &$pcache ) {
	global $wgHelpCommonsFetchingWikis, $wgLanguageCode, $wgDBname, $wgOut;

	$title = $helppage->getTitle();

	if ( $title->getNamespace() != NS_HELP_TALK ) {
		return true;
	}

	$dbkey = $title->getDBkey();

	foreach ( $wgHelpCommonsFetchingWikis as $language => $urls ) {
		foreach ( $urls as $url => $helpwiki ) {
			if ( $wgLanguageCode == $language && $wgDBname != $helpwiki ) {
				$dbr = wfGetDB( DB_SLAVE, array(), $helpwiki );
				$page = $dbr->selectRow(
					'page',
					array( 'page_title', 'page_namespace', 'page_latest' ),
					array( 'page_namespace' => NS_HELP, 'page_title' => $dbkey ),
					__METHOD__
				);
			}
			if ( !empty( $page->page_title ) ) {
				if ( $page->page_title == $dbkey && !$title->exists() ) {
					$helpCommonsRedirectTalk = Title::newFromText( $url . '/index.php?title=' . str_replace( ' ', '_', $title ) );
					$redirectTalkPage = $helpCommonsRedirectTalk->getFullText();
					$wgOut->redirect( $redirectTalkPage );
					return false;
				} else {
					return true;
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
	global $wgHelpCommonsFetchingWikis, $wgDBname;

	// only affects non-help-page-fetching wikis
	foreach ( $wgHelpCommonsFetchingWikis as $language => $urls ) {
		foreach ( $urls as $url => $helpwiki ) {
			if ( $wgDBname == $helpwiki ) {
				return true;
			}
		}
	}

	if ( is_null( $target ) ) {
		return true;
	}

	// only affects non-existent help pages and talks
	if ( ( $target->getNamespace() != NS_HELP && $target->getNamespace() != NS_HELP_TALK ) || $target->exists() ) {
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
 * @param $target Title
 * @param $text
 * @param $customAttribs
 * @param $query
 * @param $options array
 * @param $ret
 * @return bool
 */
function efHelpCommonsChangeCategoryLinks( $skin, $target, &$text, &$customAttribs, &$query, &$options, &$ret ) {
	global $wgTitle, $wgHelpCommonsFetchingWikis, $wgLanguageCode, $wgDBname;

	if ( $wgTitle->getNamespace() != NS_HELP || $wgTitle->exists() ) {
		return true;
	}

	if ( is_null( $target ) ) {
		return true;
	}

	// only affects non-existent categories
	if ( $target->getNamespace() != NS_CATEGORY || $target->exists() ) {
		return true;
	}

	// remove "broken" assumption/override
	$brokenKey = array_search( 'broken', $options );
	if ( $brokenKey !== false ) {
		unset( $options[$brokenKey] );
	}

	// make the link "blue"
	$options[] = 'known';

	// change category's link
	foreach ( $wgHelpCommonsFetchingWikis as $language => $urls ) {
		foreach ( $urls as $url => $helpwiki ) {
			if ( $wgLanguageCode == $language && $wgDBname != $helpwiki ) {
				$text = '<a href="' . $url . '/index.php?title=' . str_replace( ' ', '_', $target->getPrefixedText() ) . '">' . $text . '</a>';
			}
		}
	}

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
	global $wgHelpCommonsFetchingWikis, $wgLanguageCode, $wgDBname;

	$baseTitle = $skin->getTitle();

	if ( $baseTitle->getNamespace() != NS_HELP ) {
		return false;
	}

	foreach ( $wgHelpCommonsFetchingWikis as $language => $urls ) {
		foreach ( $urls as $url => $helpwiki ) {
			if ( $wgLanguageCode == $language && $wgDBname != $helpwiki && !$baseTitle->exists() ) {
				// FIXME: $result is unused
				$result = '<span class="editsection">[' . Xml::element( 'a', array(
					'href' => $url . '/index.php?title=' . str_replace( ' ', '_', $title ) . '&action=edit&section=' . $section,
					'title' => wfMsg( 'editsectionhint', $tooltip ) ),
					wfMsg( 'editsection' )
				) . ']</span>';
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
	global $wgHelpCommonsFetchingWikis, $wgDBname, $wgHelpCommonsProtectAll, $wgHelpCommonsProtect, $wgLanguageCode;

	// only affects non-help-page-fetching wikis
	foreach ( $wgHelpCommonsFetchingWikis as $language => $urls ) {
		foreach ( $urls as $url => $helpwiki ) {
			if ( $wgDBname == $helpwiki ) {
				return true;
			}
		}
	}

	$ns = $title->getNamespace();
	if ( ( $ns !== NS_HELP && $ns !== NS_HELP_TALK ) || $title->exists() ) {
		return true;
	}

	// block actions 'create', 'edit' and 'protect'
	if ( $action != 'create' && $action != 'edit' && $action != 'protect' ) {
		return true;
	}

	if ( $wgHelpCommonsProtectAll ) {
		$result = array( 'protectedpagetext' );
		return false;
	} elseif ( !$wgHelpCommonsProtect ) {
		return true;
	}

	foreach ( $wgHelpCommonsFetchingWikis as $language => $urls ) {
		foreach ( $urls as $url => $helpwiki ) {
			// only protect non-existent help pages on non-help-page-fetching wikis
			if ( $wgLanguageCode == $language ) {
				$dbr = wfGetDB( DB_SLAVE, array(), $helpwiki );
				$res = $dbr->selectField(
					'page',
					'1',
					array( 'page_namespace' => NS_HELP, 'page_title' => $title->getDBkey() ),
					__METHOD__
				);

				if ( $res ) {
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
