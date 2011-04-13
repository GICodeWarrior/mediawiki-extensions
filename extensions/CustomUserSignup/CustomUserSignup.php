<?php
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'CustomUserSignup',
	'author' => array(
		'Nimish Gautam',
	),
	'version' => '0.1.0',
	'descriptionmsg' => 'customusersignup-desc',
	'url' => 'http://www.mediawiki.org/wiki/Extension:CustomUserSignup'
);

// Autoloading
$dir = dirname( __FILE__ ) . '/';
$wgAutoloadClasses['CustomUserSignupHooks'] = $dir . 'CustomUserSignup.hooks.php';
$wgAutoloadClasses['CustomUserloginTemplate'] = $dir . 'CustomUserTemplate.php';
$wgAutoloadClasses['CustomUsercreateTemplate'] = $dir . 'CustomUserTemplate.php';
$wgExtensionMessagesFiles['CustomUserSignup'] = $dir . 'CustomUserSignup.i18n.php';

// Hooks
$wgHooks['UserCreateForm'][] = 'CustomUserSignupHooks::userCreateForm';
$wgHooks['UserLoginForm'][] = 'CustomUserSignupHooks::userCreateForm'; 
$wgHooks['BeforeWelcomeCreation'][] = 'CustomUserSignupHooks::welcomeScreen';
