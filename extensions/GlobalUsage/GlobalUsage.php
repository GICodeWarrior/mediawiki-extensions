<?php
/*
 Copyright (c) 2008 Bryan Tong Minh

 Permission is hereby granted, free of charge, to any person
 obtaining a copy of this software and associated documentation
 files (the "Software"), to deal in the Software without
 restriction, including without limitation the rights to use,
 copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the
 Software is furnished to do so, subject to the following
 conditions:

 The above copyright notice and this permission notice shall be
 included in all copies or substantial portions of the Software.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 OTHER DEALINGS IN THE SOFTWARE.
*/

# Alert the user that this is not a valid entry point to MediaWiki if they try to access the extension file directly.
if (!defined('MEDIAWIKI')) {
	echo <<<EOT
To install my extension, put the following line in LocalSettings.php:
require_once( "\$IP/extensions/GlobalUsage/GlobalUsage.php" );
EOT;
	exit( 1 );
}

$dir = dirname(__FILE__) . '/';

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'Global Usage',
	'author' => 'Bryan Tong Minh',
	'description' => 'Special page to view global file usage',
	'descriptionmsg' => 'globalusage-desc',
	'url' => 'http://www.mediawiki.org/wiki/Extension:GlobalUsage',
	'version' => '1.0',
);

$wgExtensionMessagesFiles['GlobalUsage'] = $dir . 'GlobalUsage.i18n.php';
$wgAutoloadClasses['GlobalUsage'] = $dir . 'GlobalUsage_body.php';
//$wgExtensionMessageFiles['GlobalUsage'] = $dir . 'GlobalUsage.i18n.php';
$wgSpecialPages['GlobalUsage'] = 'GlobalUsage';

$wgHooks['LinksUpdate'][] = 'GlobalUsage::updateLinks';
$wgHooks['ArticleDeleteComplete'][] = 'GlobalUsage::articleDelete';
$wgHooks['FileDeleteComplete'][] = 'GlobalUsage::fileDelete';
$wgHooks['FileUndeleteComplete'][] = 'GlobalUsage::fileUndelete';
$wgHooks['UploadComplete'][] = 'GlobalUsage::imageUploaded';
// TODO: Page move may change namespace

// This wiki does not have a globalimagelinks table
$wgguIsMaster = false;
// If set to an array it should have the same form as $wgForeignFileRepos
// If set to an int will use RepoGroup::getRepo to resolve the database
// If set to anything else, will use RepoGroup::getRepoByName to resolve the database
$wgguMasterDatabase = 0;
