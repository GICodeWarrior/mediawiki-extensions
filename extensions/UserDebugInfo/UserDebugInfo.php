<?php

$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'UserDebugInfo',
	'url' => 'http://www.mediawiki.org/wiki/Extension:UserDebugInfo',
	'author' => 'Sam Reed',
	'descriptionmsg' => 'userdebuginfo-desc',
);

$dir = dirname( __FILE__ ) . '/';

$wgAutoloadClasses['SpecialUserDebugInfo'] = $dir . 'SpecialUserDebugInfo.php';
$wgSpecialPages['UserDebugInfo'] = 'SpecialUserDebugInfo';
$wgSpecialPageGroups['UserDebugInfo'] = 'other';

$wgExtensionMessagesFiles['UserDebugInfo'] = $dir . 'UserDebugInfo.i18n.php';
$wgExtensionAliasesFiles['UserDebugInfo'] = $dir . 'UserDebugInfo.alias.php';