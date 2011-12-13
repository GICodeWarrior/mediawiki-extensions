<?php
/**
 * Setup for ContactPage extension, a special page that implements a contact form
 * for use by anonymous visitors.
 *
 * @file
 * @ingroup Extensions
 * @author Daniel Kinzler, brightbyte.de
 * @copyright © 2007 Daniel Kinzler
 * @licence GNU General Public Licence 2.0 or later
 */

if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'ContactPage',
	'svn-date' => '$LastChangedDate$',
	'svn-revision' => '$LastChangedRevision$',
	'author' => 'Daniel Kinzler',
	'url' => 'https://www.mediawiki.org/wiki/Extension:ContactPage',
	'descriptionmsg' => 'contactpage-desc',
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['ContactPageFundraiser'] = $dir . 'ContactPage.i18n.php';
$wgExtensionAliasesFiles['ContactPageFundraiser'] = $dir . 'ContactPage.alias.php';

$wgAutoloadClasses['SpecialContact'] = $dir . 'SpecialContact.php';
$wgSpecialPages['Contact'] = 'SpecialContact';

$wgContactUser = 'Stories';
$wgContactSender = 'stories@wikimedia.org';
$wgContactSenderName = 'Contact Form on ' . $wgSitename;

$wgContactRequireAll = false;
