<?php
/**
 * Gadgets extension - lets users select custom javascript gadgets
 *
 *
 * For more info see http://mediawiki.org/wiki/Extension:Gadgets
 *
 * @package MediaWiki
 * @subpackage Extensions
 * @author Daniel Kinzler, brightbyte.de
 * @copyright © 2007 Daniel Kinzler
 * @licence GNU General Public Licence 2.0 or later
 */

if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

$wgExtensionCredits['other'][] = array(
	'name' => 'Gadgets',
	'svn-date' => '$LastChangedDate$',
	'svn-revision' => '$LastChangedRevision$',
	'author' => 'Daniel Kinzler',
	'url' => 'http://mediawiki.org/wiki/Extension:Gadgets',
	'description' => 'lets users select custom javascript gadgets',
	'descriptionmsg' => 'gadgets-desc',
);

$wgHooks['InitPreferencesForm'][] = 'wfGadgetsInitPreferencesForm';
$wgHooks['RenderPreferencesForm'][] = 'wfGadgetsRenderPreferencesForm';
$wgHooks['ResetPreferences'][] = 'wfGadgetsResetPreferences';
$wgHooks['BeforePageDisplay'][] = 'wfGadgetsBeforePageDisplay';
$wgHooks['ArticleSaveComplete'][] = 'wfGadgetsArticleSaveComplete';

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['Gadgets'] = $dir . 'Gadgets.i18n.php';
$wgAutoloadClasses['SpecialGadgets'] = $dir . 'SpecialGadgets.php';
$wgSpecialPages['Gadgets'] = 'SpecialGadgets';

function wfGadgetsArticleSaveComplete( &$article, &$wgUser, &$text ) {
	//update cache if MediaWiki:Gadgets-definition was edited
	$title = $article->mTitle;
	if( $title->getNamespace() == NS_MEDIAWIKI && $title->getText() == 'Gadgets-definition' ) {
		wfLoadGadgetsStructured( $text );
	}
	return true;
}

function wfLoadGadgets() {
	static $gadgets = NULL;

	if ( $gadgets !== NULL ) return $gadgets;

	$struct = wfLoadGadgetsStructured();
	if ( !$struct ) {
		$gadgets = $struct;
		return $gadgets;
	}

	$gadgets = array();
	foreach ( $struct as $section => $entries ) {
		$gadgets = array_merge( $gadgets, $entries );
	}

	return $gadgets;
}

function wfLoadGadgetsStructured( $forceNewText = NULL ) {
	global $wgMemc;

	static $gadgets = NULL;
	if ( $gadgets !== NULL && $forceNewText !== NULL ) return $gadgets;

	$key = wfMemcKey( 'gadgets-definition' );

	if ( $forceNewText === NULL ) {
		//cached?
		$gadgets = $wgMemc->get( $key );
		if ( is_array($gadgets) ) return $gadgets;

		$g = wfMsgForContentNoTrans( "gadgets-definition" );
		if ( wfEmptyMsg( "gadgets-definition", $g ) ) {
			$gadgets = false;
			return $gadgets;
		}
	} else {
		$g = $forceNewText;
	}

	$g = preg_replace( '/<!--.*-->/s', '', $g );
	$g = preg_split( '/(\r\n|\r|\n)+/', $g );

	$gadgets = array();
	$section = '';

	foreach ( $g as $line ) {
		if ( preg_match( '/^==+ *([^*:\s|]+?)\s*==+\s*$/', $line, $m ) ) {
			$section = $m[1];
		}
		else if ( preg_match( '/^\*+ *([a-zA-Z](?:[-_:.\w\d ]*[a-zA-Z0-9])?)\s*((\|[^|]*)+)\s*$/', $line, $m ) ) {
			//NOTE: the gadget name is used as part of the name of a form field,
			//      and must follow the rules defined in http://www.w3.org/TR/html4/types.html#type-cdata
			//      Also, title-normalization applies.
			$name = str_replace(' ', '_', $m[1] );

			$code = preg_split( '/\s*\|\s*/', $m[2], -1, PREG_SPLIT_NO_EMPTY );

			if ( $code ) {
				$gadgets[$section][$name] = $code;
			}
		}
	}

	//cache for a while. gets purged automatically when MediaWiki:Gadgets-definition is edited
	$wgMemc->set( $key, $gadgets, 60*60*24 );
	$source = $forceNewText !== NULL ? 'input text' : 'MediaWiki:Gadgets-definition';
	wfDebug( __METHOD__ . ": $source parsed, cache entry $key updated\n");

	return $gadgets;
}

function wfGadgetsInitPreferencesForm( &$prefs, &$request ) {
	$gadgets = wfLoadGadgets();
	if ( !$gadgets ) return true;

	foreach ( $gadgets as $gname => $code ) {
		$tname = "gadget-$gname";
		$prefs->mToggles[$tname] = $request->getCheck( "wpOp$tname" ) ? 1 : 0;
	}

	return true;
}

function wfGadgetsResetPreferences( &$prefs, &$user ) {
	$gadgets = wfLoadGadgets();
	if ( !$gadgets ) return true;

	foreach ( $gadgets as $gname => $code ) {
		$tname = "gadget-$gname";
		$prefs->mToggles[$tname] = $user->getOption( $tname );
	}

	return true;
}

function wfGadgetsRenderPreferencesForm( &$prefs, &$out ) {
	$gadgets = wfLoadGadgetsStructured();
	if ( !$gadgets ) return true;

	wfLoadExtensionMessages( 'Gadgets' );

	$out->addHtml( "\n<fieldset>\n<legend>" . wfMsgHtml( 'gadgets-prefs' ) . "</legend>\n" );

	$out->addHtml( "<p>" . wfMsgWikiHtml( 'gadgets-prefstext' ) . "</p>\n" );

	$msgOpt = array( 'parseinline', 'parsemag' );

	foreach ( $gadgets as $section => $entries ) {
		if ( $section !== false && $section !== '' ) {
			$ttext = wfMsgExt( "gadget-section-$section", $msgOpt );
			$out->addHtml( "\n<h2>" . $ttext . "</h2>\n" );
		}

		foreach ( $entries as $gname => $code ) {
			$tname = "gadget-$gname";
			$ttext = wfMsgExt( $tname, $msgOpt );
			$checked = @$prefs->mToggles[$tname] == 1 ? ' checked="checked"' : '';
			$disabled = '';

			# NOTE: No label for checkmarks as this causes the checks to toggle
			# when clicking a link in the describing text.
			$out->addHtml( "<div class='toggle'><input type='checkbox' value='1' " .
				"id=\"$tname\" name=\"wpOp$tname\"$checked$disabled />" .
				" <span class='toggletext'>$ttext</span></div>\n" );
		}
	}

	$out->addHtml( "</fieldset>\n\n" );

	return true;
}

function wfGadgetsBeforePageDisplay( &$out ) {
	global $wgUser, $wgTitle;
	if ( !$wgUser->isLoggedIn() ) return true;

	//disable all gadgets on Special:Preferences
	if ( $wgTitle->getNamespace() == NS_SPECIAL ) {
		$name = SpecialPage::resolveAlias( $wgTitle->getText() );
		if ( $name == "Preferences" ) return true;
	}

	$gadgets = wfLoadGadgets();
	if ( !$gadgets ) return true;

	$done = array();

	foreach ( $gadgets as $gname => $code ) {
		$tname = "gadget-$gname";
		if ( $wgUser->getOption( $tname ) ) {
			wfApplyGadgetCode( $code, $out, $done );
		}
	}

	return true;
}

function wfApplyGadgetCode( $code, &$out, &$done ) {
	global $wgSkin, $wgJsMimeType;

	//FIXME: stuff added via $out->addScript appears below usercss and userjs in the head tag.
	//       but we'd want it to appear above explicit user stuff, so it can be overwritten.
	foreach ( $code as $codePage ) {
		//include only once
		if ( isset( $done[$codePage] ) ) continue;
		$done[$codePage] = true;

		$t = Title::makeTitleSafe( NS_MEDIAWIKI, "Gadget-$codePage" );
		if ( !$t ) continue;

		if ( preg_match( '/\.js/', $codePage ) ) {
			$u = $t->getLocalURL( 'action=raw&ctype=' . $wgJsMimeType );
			$out->addScript( '<script type="' . $wgJsMimeType . '" src="' . htmlspecialchars( $u ) . '"></script>' . "\n" );
		}
		else if ( preg_match( '/\.css/', $codePage ) ) {
			$u = $t->getLocalURL( 'action=raw&ctype=text/css' );
			$out->addScript( '<style type="text/css">/*<![CDATA[*/ @import "' . $u . '"; /*]]>*/</style>' . "\n" );
		}
	}
}
