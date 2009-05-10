<?php
# Copyright (C) 2009 Ryan Lane <rlane32+mwext@gmail.com>
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License along
# with this program; if not, write to the Free Software Foundation, Inc.,
# 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
# http://www.gnu.org/copyleft/gpl.html

# Based off of the Gadgets and SmoothGallery extensions

if( !defined( 'MEDIAWIKI' ) )
	die( -1 );

/**
 * Add extension information to Special:Version
 */
$wgExtensionCredits['other'][] = array(
	'path'        => __FILE__,
	'name'        => 'Plotter parser extension',
	'version'     => '0.1a',
	'author'      => 'Ryan Lane',
	'description' => 'Allows users to create client side graphs and plots.',
	'descriptionmsg' => 'plotter-desc',
	'url'         => 'http://www.mediawiki.org/wiki/Extension:Plotter',
);

$wgExtensionFunctions[] = "efPlotter";

$wgHooks['OutputPageParserOutput'][] = 'PlotterParserOutput';
$wgHooks['LanguageGetMagic'][] = 'PlotterLanguageGetMagic';
$wgHooks['ArticleSaveComplete'][] = 'wfPlottersArticleSaveComplete';

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['Plotters'] = $dir . 'Plotters.i18n.php';
$wgExtensionAliasesFiles['Plotters'] = $dir . 'Plotters.i18n.alias.php';
$wgAutoloadClasses['Plotter'] = $dir . 'PlotterClass.php';
$wgAutoloadClasses['PlotterParser'] = $dir . 'PlotterParser.php';
$wgAutoloadClasses['SpecialPlotters'] = $dir . 'SpecialPlotters.php';
$wgSpecialPages['Plotters'] = 'SpecialPlotters';
$wgSpecialPageGroups['Plotters'] = 'wiki';

//sane defaults. always initialize to avoid register_globals vulnerabilities
$wgPlotterExtensionPath = $wgScriptPath . '/extensions/Plotter';

function wfPlottersArticleSaveComplete( &$article, &$wgUser, &$text ) {
        //update cache if MediaWiki:Plotters-definition was edited
        $title = $article->mTitle;
        if( $title->getNamespace() == NS_MEDIAWIKI && $title->getText() == 'Plotters-definition' ) {
                wfLoadPlottersStructured( $text );
        }
        return true;
}

function wfLoadPlotters() {
        static $plotters = NULL;

        if ( $plotters !== NULL ) return $plotters;

        $struct = wfLoadPlottersStructured();
        if ( !$struct ) {
                $plotters = $struct;
                return $plotters;
        }

        $plotters = array();
        foreach ( $struct as $section => $entries ) {
                $plotters = array_merge( $plotters, $entries );
        }

        return $plotters;
}

function wfLoadPlottersStructured( $forceNewText = NULL ) {
        global $wgMemc;

        static $plotters = NULL;
        if ( $plotters !== NULL && $forceNewText !== NULL ) return $plotters;

        $key = wfMemcKey( 'plotters-definition' );

        if ( $forceNewText === NULL ) {
                //cached?
                $plotters = $wgMemc->get( $key );
                if ( is_array($plotters) ) return $plotters;

                $p = wfMsgForContentNoTrans( "plotters-definition" );
                if ( wfEmptyMsg( "plotters-definition", $p ) ) {
                        $plotters = false;
                        return $plotters;
                }
        } else {
                $p = $forceNewText;
        }

        $p = preg_replace( '/<!--.*-->/s', '', $p );
        $p = preg_split( '/(\r\n|\r|\n)+/', $p );

        $plotters = array();
        $section = '';

        foreach ( $p as $line ) {
                if ( preg_match( '/^==+ *([^*:\s|]+?)\s*==+\s*$/', $line, $m ) ) {
                        $section = $m[1];
                }
                else if ( preg_match( '/^\*+ *([a-zA-Z](?:[-_:.\w\d ]*[a-zA-Z0-9])?)\s*((\|[^|]*)+)\s*$/', $line, $m ) ) {
                        //NOTE: the plotter name is used as part of the name of a form field,
                        //      and must follow the rules defined in http://www.w3.org/TR/html4/types.html#type-cdata
                        //      Also, title-normalization applies.
                        $name = str_replace(' ', '_', $m[1] );

                        $code = preg_split( '/\s*\|\s*/', $m[2], -1, PREG_SPLIT_NO_EMPTY );

                        if ( $code ) {
                                $plotters[$section][$name] = $code;
                        }
                }
        }

        //cache for a while. gets purged automatically when MediaWiki:Plotters-definition is edited
        $wgMemc->set( $key, $plotters, 60*60*24 );
        $source = $forceNewText !== NULL ? 'input text' : 'MediaWiki:Plotters-definition';
        wfDebug( __METHOD__ . ": $source parsed, cache entry $key updated\n");

        return $plotters;
}

function wfApplyPlotterCode( $code, &$out, &$done ) {
        global $wgSkin, $wgJsMimeType;

        //FIXME: stuff added via $out->addScript appears below usercss and userjs in the head tag.
        //       but we'd want it to appear above explicit user stuff, so it can be overwritten.
        foreach ( $code as $codePage ) {
                //include only once
                if ( isset( $done[$codePage] ) ) continue;
                $done[$codePage] = true;

                $t = Title::makeTitleSafe( NS_MEDIAWIKI, "Plotters-$codePage" );
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

function efPlotter() {
	global $wgParser;

	$wgParser->setHook( 'plot', 'initPlotter' );
	$wgParser->setFunctionHook( 'plot', 'initPlotterPF' );
}

function initPlotterPF( &$parser ) {
	global $wgPlotterDelimiter;
	
	$numargs = func_num_args();
	if ( $numargs < 2 ) {
		$input = "#Plotter: no arguments specified";
		return str_replace( '§', '<', '§pre>§nowiki>' . $input . '§/nowiki>§/pre>' );
	}

	// fetch all user-provided arguments (skipping $parser)
	$input = "";
	$argv = array();
	$arg_list = func_get_args();
	for ( $i = 1; $i < $numargs; $i++ ) {
		$p1 = $arg_list[$i];

		$aParam = explode( '=', $p1, 2 );
		if ( count( $aParam ) < 2 ) {
			continue;
		}
		Plotter::debug( 'plot tag parameter: ', $aParam );
		if ( $aParam[0] == "data" ) {
			$input = $aParam[1];
			continue;
		}
		$sKey = trim( $aParam[0] );
		$sVal = trim( $aParam[1] );

		if ( $sKey != '' ){
			$argv[$sKey] = $sVal;
		}
	}

	$output = initPlotter( $input, $argv, $parser );
	return array( $output, 'noparse' => true, 'isHTML' => true);
}

function initPlotter( $input, $argv, &$parser ) {
	$pParser = new PlotterParser( $input, $argv, $parser );
	$pPlotter = new Plotter( $pParser, $parser );

	$pPlotter->checkForErrors();
	if ( $pPlotter->hasErrors() ) {
		return $pPlotter->getErrors();
	} else {
		return $pPlotter->toHTML();
	}
}

/**
 * Hook callback that injects messages and things into the <head> tag
 * Does nothing if $parserOutput->mPlotterTag is not set
 */
function PlotterParserOutput( &$outputPage, &$parserOutput )  {
	if ( !empty( $parserOutput->mPlotterTag ) ) {
		// Output required javascript
		Plotter::setPlotterHeaders( $outputPage );

		// Output user defined javascript
		$plotters = wfLoadPlotters();
		if ( !$plotters ) return true;

		$done = array();

		foreach ( $plotters as $pname => $code ) {
			$tname = strtolower( "mplotter-$pname" );
			if ( !empty( $parserOutput->$tname ) ) {
				wfApplyPlotterCode( $code, $outputPage, $done );
			}
		}
	}
	return true;
}

/**
 * We ignore langCode - parser function names can be translated but
 * we are not using this feature
 */
function PlotterLanguageGetMagic( &$magicWords, $langCode ) {
	$magicWords['plot']  = array(0, 'plot');
	return true;
}
