<?php
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

/**
 * This is an extension that let you protect some part of a text. You just
 * have to be a member of a group with the 'protectsection' user right.
 *
 * To protect a text, enclose use in a <protect> </protect> block.
 *
 * @addtogroup Extensions
 *
 * @author ThomasV <thomasv1@gmx.de>
 * @copyright Copyright © 2006, ThomasV 
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

if ( ! defined( 'MEDIAWIKI' ) ) die();

// Two new permissions
$wgGroupPermissions['sysop']['protectsection']         = true;
$wgGroupPermissions['bureaucrat']['protectsection']    = true;
$wgAvailableRights[] = 'protectsection';
 
$wgExtensionFunctions[] = 'wfProtectSectionSetup';

// Register hooks
$wgHooks['ParserBeforeStrip'][] = 'wfStripProtectTags' ;
$wgHooks['EditFilter'][] = 'wfCheckProtectSection' ;

/**
 * TODO: use some arrays in ./languages/ for proper l10n
 */
function wfProtectSectionSetup() {
	global $wgMessageCache;
	$wgMessageCache->addMessages(
	array(
		'protectsection_add_remove' => 
			'You tried to add or remove a protected section',
		'protectsection_modify' => 
			'You tried to modify protected text',
		'protectsection_forbidden' =>
			'Forbidden',
		)
	);
}

/**
 * @param &$parser The parser object
 * @param &$text The text being parsed
 * @param &$x Something not used FIXME
 */
function wfStripProtectTags ( &$parser , &$text, &$x ) { 

	$text = preg_replace("/<protect>/i","<span class='protected'>",$text);
	$text = preg_replace("/<\/protect>/i","</span>",$text);
	return true;
}


/**
 * @todo Document
 * @param $editpage
 * @param $textbox1
 * @param $section
 */
function wfCheckProtectSection ( $editpage, $textbox1, $section )  {

	# check for partial protection 
	global $wgUser;

	if ( !$wgUser->isAllowed( 'protectsection' ) ) {
		$modifyProtect = false; 
		$text1 = $editpage->mArticle->getContent(true);
		$text2 = $textbox1 ;

		preg_match_all( "/<protect>(.*?)<\/protect>/si", $text1, $list1, PREG_SET_ORDER );
		preg_match_all( "/<protect>(.*?)<\/protect>/si", $text2, $list2, PREG_SET_ORDER );
		if( count($list1) != count($list2)) { 
			$msg = wfMsg( 'protectsection_add_remove'); 
			$modifyProtect = true; 
		}
		else for ( $i=0 ; $i < count( $list1 ); $i++ ) {
			if( $list1[$i][0] != $list2[$i][0]) { 
				$msg = wfMsg( 'protectsection_modify' );
				$modifyProtect = true; 
				break;
			}
		}

		if( $modifyProtect ) {
			global $wgOut;
			$wgOut->setPageTitle( wfMsg( 'protectsection_forbidden' ) );
			$wgOut->addWikiText($msg);
			return false;
		}
	}
	return true;
}
?>
