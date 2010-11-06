<?php
/**
 * Gadgets extension - lets users select custom javascript gadgets
 *
 *
 * For more info see http://mediawiki.org/wiki/Extension:Gadgets
 *
 * @file
 * @ingroup Extensions
 * @author Daniel Kinzler, brightbyte.de
 * @copyright © 2007 Daniel Kinzler
 * @license GNU General Public Licence 2.0 or later
 */

if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Gadgets',
	'author' => 'Daniel Kinzler',
	'url' => 'http://mediawiki.org/wiki/Extension:Gadgets',
	'descriptionmsg' => 'gadgets-desc',
);

$wgHooks['GetPreferences'][] = 'wfGadgetsGetPreferences';
$wgHooks['BeforePageDisplay'][] = 'wfGadgetsBeforePageDisplay';
$wgHooks['ArticleSaveComplete'][] = 'wfGadgetsArticleSaveComplete';

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['Gadgets'] = $dir . 'Gadgets.i18n.php';
$wgExtensionAliasesFiles['Gadgets'] = $dir . 'Gadgets.alias.php';
$wgAutoloadClasses['SpecialGadgets'] = $dir . 'SpecialGadgets.php';
$wgSpecialPages['Gadgets'] = 'SpecialGadgets';
$wgSpecialPageGroups['Gadgets'] = 'wiki';

function wfGadgetsArticleSaveComplete( $article, $user, $text ) {
	//update cache if MediaWiki:Gadgets-definition was edited
	$title = $article->mTitle;
	if( $title->getNamespace() == NS_MEDIAWIKI && $title->getText() == 'Gadgets-definition' ) {
		wfLoadGadgetsStructured( $text );
	}
	return true;
}

function wfLoadGadgets() {
	static $gadgets = null;

	if ( $gadgets !== null ) {
		return $gadgets;
	}

	$struct = wfLoadGadgetsStructured();
	if ( !$struct ) {
		$gadgets = $struct;
		return $gadgets;
	}

	$gadgets = array();
	foreach ( $struct as $entries ) {
		$gadgets = array_merge( $gadgets, $entries );
	}

	return $gadgets;
}

function wfLoadGadgetsStructured( $forceNewText = null ) {
	global $wgMemc;

	static $gadgets = null;
	if ( $gadgets !== null && $forceNewText === null ) {
		return $gadgets;
	}

	$key = wfMemcKey( 'gadgets-definition' );

	if ( $forceNewText === null ) {
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
	$source = $forceNewText !== null ? 'input text' : 'MediaWiki:Gadgets-definition';
	wfDebug( __METHOD__ . ": $source parsed, cache entry $key updated\n");

	return $gadgets;
}

function wfGadgetsGetPreferences( $user, &$preferences ) {
	$gadgets = wfLoadGadgetsStructured();
	if (!$gadgets) {
		return true;
	}
	
	$options = array();
	foreach( $gadgets as $section => $thisSection ) {
		if ( $section !== '' ) {
			$section = wfMsgExt( "gadget-section-$section", 'parseinline' );
			$options[$section] = array();
			$destination = &$options[$section];
		} else {
			$destination = &$options;
		}
		foreach( array_keys( $thisSection ) as $gname ) {
			$destination[wfMsgExt( "gadget-$gname", 'parseinline' )] = $gname;
		}
	}
	
	$preferences['gadgets-intro'] =
		array(
			'type' => 'info',
			'label' => '&#160;',
			'default' => Xml::tags( 'tr', array(),
				Xml::tags( 'td', array( 'colspan' => 2 ),
					wfMsgExt( 'gadgets-prefstext', 'parse' ) ) ),
			'section' => 'gadgets',
			'raw' => 1,
			'rawrow' => 1,
		);
	
	$preferences['gadgets'] = 
		array(
			'type' => 'multiselect',
			'options' => $options,
			'section' => 'gadgets',
			'label' => '&#160;',
			'prefix' => 'gadget-',
		);
		
	return true;
}

function wfGadgetsBeforePageDisplay( $out ) {
	global $wgUser;
	if ( !$wgUser->isLoggedIn() ) {
		return true;
	}

	//disable all gadgets on critical special pages
	//NOTE: $out->isUserJsAllowed() is tempting, but always fals if $wgAllowUserJs is false.
	//      That would disable gadgets on wikis without user JS. Introducing $out->isJsAllowed()
	//	may work, but should that really apply also to MediaWiki:common.js? Even on the preference page?
	//	See bug 22929 for discussion.
	$title = $out->getTitle();
	if ( $title->isSpecial( 'Preferences' ) 
		|| $title->isSpecial( 'Resetpass' )
		|| $title->isSpecial( 'Userlogin' ) ) {
		return true;
	}

	$gadgets = wfLoadGadgets();
	if ( !$gadgets ) {
		return true;
	}

	$lb = new LinkBatch();
	$lb->setCaller( __METHOD__ );
	$pages = array();

	foreach ( $gadgets as $gname => $id ) {
		$tname = "gadget-$gname";
		if ( $wgUser->getOption( $tname ) ) {
			foreach ( $id as $page ) {
				$lb->add( NS_MEDIAWIKI, "Gadget-$page" );
				$pages[] = $page;
			}
		}
	}

	$lb->execute( __METHOD__ );

	$done = array();
	foreach ( $pages as $page ) {
		if ( isset( $done[$page] ) ) {
			continue;
		}
		$done[$page] = true;
		wfApplyGadgetCode( $page, $out );
	}

	return true;
}

function wfApplyGadgetCode( $page, $out ) {
	global $wgJsMimeType;

	//FIXME: stuff added via $out->addScript appears below usercss and userjs in the head tag.
	//       but we'd want it to appear above explicit user stuff, so it can be overwritten.

	$t = Title::makeTitleSafe( NS_MEDIAWIKI, "Gadget-$page" );
	if ( !$t ) {
		return;
	}

	if ( preg_match( '/\.js/', $page ) ) {
		$u = $t->getLocalURL( 'action=raw&ctype=' . $wgJsMimeType );
		//switched to addScriptFile call to support scriptLoader
		$out->addScriptFile( $u, $t->getLatestRevID() );
	} elseif ( preg_match( '/\.css/', $page ) ) {
		$u = $t->getLocalURL( 'action=raw&ctype=text/css&' . $t->getLatestRevID() );
		$out->addScript( Html::linkedStyle( $u ) );
	}
}

