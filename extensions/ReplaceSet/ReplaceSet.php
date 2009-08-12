<?php
/**
 * ReplaceSet
 * @package ReplaceSet
 * @author Daniel Friesen (http://mediawiki.org/wiki/User:Dantman) <mediawiki@danielfriesen.name>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

if ( !defined( 'MEDIAWIKI' ) ) die( "This is an extension to the MediaWiki package and cannot be run standalone." );

$wgExtensionCredits['parserhook'][] = array (
	'name' => 'ReplaceSet',
	'url' => 'http://mediawiki.org/wiki/Extension:ReplaceSet',
	'version' => '1.1a',
	'author' => "[http://mediawiki.org/wiki/User:Dantman Daniel Friesen]",
	'description' => "Adds a <nowiki>{{#replaceset}}</nowiki> parserfunction used for replacing sections of text with specially formatted data."
);

$wgExtensionFunctions[] = 'efReplaceSetSetup';

$dir = dirname( __FILE__ ) . '/';
$wgAutoloadClasses['ReplaceSet'] = $dir . 'ReplaceSet.class.php';
$wgExtensionMessagesFiles['ReplaceSet'] = $dir . 'ReplaceSet.i18n.php';

function efReplaceSetSetup() {
	global $wgParser;

	// Check for SFH_OBJECT_ARGS capability
	if ( defined( 'MW_SUPPORTS_PARSERFIRSTCALLINIT' ) ) {
		$wgHooks['ParserFirstCallInit'][] = 'efReplaceSetRegisterParser';
	} else {
		if ( class_exists( 'StubObject' ) && !StubObject::isRealObject( $wgParser ) ) {
			$wgParser->_unstub();
		}
		efReplaceSetRegisterParser( $wgParser );
	}
}

function efReplaceSetRegisterParser( &$parser ) {
	$parser->setFunctionHook( 'replaceset', array( 'ReplaceSet', 'parserFunction' ) );
}
