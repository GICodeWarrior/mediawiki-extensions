<?php
/**
 * InviteContacts extension
 * Allows wiki users to invite their friends to the wiki
 * GetMyContacts version: 4.3 (22-04-2007)
 *
 * @file
 * @ingroup Extensions
 * @version 1.0
 * @author Aaron Wright <aaron.wright@gmail.com>
 * @author David Pean <david.pean@gmail.com>
 * @author Jack Phoenix <jack@countervandalism.net>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This is not a valid entry point.\n" );
}

// Extension credits that show up on Special:Version
$wgExtensionCredits['specialpage'][] = array(
	'name' => 'InviteContacts',
	'version' => '1.0',
	'author' => array( 'Aaron Wright', 'David Pean', 'Jack Phoenix' ),
	'url' => 'http://www.mediawiki.org/wiki/Extension:InviteContacts',
	'description' => 'Adds new special pages to invite your friends and send email links to your friends',
);

// Set up the new special pages
$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['InviteContacts'] = $dir . 'SpecialInviteContacts.i18n.php';
$wgAutoloadClasses['EmailNewArticle'] = $dir . 'SpecialEmailNewArticle.php';
$wgAutoloadClasses['InviteContacts'] = $dir . 'SpecialInviteContacts.body.php';
$wgAutoloadClasses['InviteContactsCSV'] = $dir . 'SpecialInviteContactsCSV.php';
$wgAutoloadClasses['InviteEmail'] = $dir . 'SpecialInviteEmail.php';
$wgSpecialPages['EmailNewArticle'] = 'EmailNewArticle';
$wgSpecialPages['InviteContacts'] = 'InviteContacts';
$wgSpecialPages['InviteContactsCSV'] = 'InviteContactsCSV';
$wgSpecialPages['InviteEmail'] = 'InviteEmail';

// The email address where invite emails are sent out from
$wgEmailFrom = $wgPasswordSender;

// @todo document
$wgSendNewArticleToFriends = false;