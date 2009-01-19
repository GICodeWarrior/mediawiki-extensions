<?php
/* vim: noet ts=4 sw=4
 * http://www.gnu.org/licenses/gpl-3.0.txt */

if ( !defined( "MEDIAWIKI" ) )
	die();

$wgExtensionCredits['other'][] = array(
	'name'           => 'FormatChanges',
	'author'         => 'Merrick Schaefer, Mark Johnston, Evan Wheeler and Adam Mckaig (at UNICEF)',
	'description'    => 'Reformats the [[Special:RecentChanges|recent changes]]',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:Uniwiki_Format_Changes',
	'svn-date'       => '$LastChangedDate$',
	'svn-revision'   => '$LastChangedRevision$',
	'descriptionmsg' => 'formatchanges-desc',
);

$wgExtensionMessagesFiles['FormatChanges'] = dirname( __FILE__ ) . '/FormatChanges.i18n.php';
$wgAutoloadClasses['UniwikiFormatChanges'] = dirname(__FILE__) . '/FormatChanges.body.php';

$wgUniwikiFormatChangesObject = new UniwikiFormatChanges();

/* ---- HOOKS ---- */
$wgHooks['FetchChangesList'][] = array($wgUniwikiFormatChangesObject,"UW_FormatChanges");
