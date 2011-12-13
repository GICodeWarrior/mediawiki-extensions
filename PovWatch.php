<?php
if ( !defined( 'MEDIAWIKI' ) ) {
?>
<html>
<head><title>PovWatch Version 1.0</title></head>
<body>
<h1>PovWatch Version 1.0</h1>
<p>
This is a MediaWiki extension for pushing articles on to the watchlists of other users.
To install it, add the following to the bottom of your <tt>LocalSettings.php</tt>,
before the "?&gt;":</p>
<pre>
require_once( "$IP/extensions/PovWatch/PovWatch.php" );
</pre>
</body>
</html>
<?php
	exit( 1 );
}

$wgExtensionCredits['specialpage'][] = array(
	'path'           => __FILE__,
	'name'           => 'PovWatch',
	'version'        => '1.1.1',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:PovWatch',
	'author'         => 'Tim Starling',
	'descriptionmsg' => 'povwatch_desc',
);

$wgAvailableRights[] = 'povwatch_user';
$wgAvailableRights[] = 'povwatch_admin';

$wgGroupPermissions['sysop']['povwatch_user'] = true;
$wgGroupPermissions['povwatch'] = array(
	'povwatch_user' => true,
	'povwatch_admin' => true,
);

$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['PovWatch'] = $dir . 'PovWatch.i18n.php';
$wgExtensionAliasesFiles['PovWatch'] = $dir . 'PovWatch.alias.php';
$wgAutoloadClasses['SpecialPovWatch'] = $dir . 'PovWatch_body.php';
$wgSpecialPages['PovWatch'] = 'SpecialPovWatch';
