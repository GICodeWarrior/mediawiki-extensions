<?php

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'MSSQLBackCompat',
	'url' => 'http://www.mediawiki.org/wiki/Extension:MSSQLBackCompat',
	'author' => 'Sam Reed',
	'descriptionmsg' => 'codereview-desc',
);

$dir = dirname( __FILE__ ) . '/';
$wgAutoloadClasses['DatabaseMssqlold'] = $dir . 'DatabaseMssqlOld.php';
$wgAutoloadClasses['MSSQLOldField'] = $dir . 'DatabaseMssqlOld.php';