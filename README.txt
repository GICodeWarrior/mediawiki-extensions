==Installation==
Download (http://phpazure.codeplex.com/) and extract the the "PHPAzure - 
Windows Azure SDK for PHP" by REALDOLMEN. 

Copy the WindowsAzureSDK extension to your <mediawiki>/extensions directory
and add the following line to your LocalSettings.php:

$wgWindowsAzureSDKRoot = '../path/to/phpazure';
include_once( "$IP/../extensions/WindowsAzureSDK/WindowsAzureSDK.php" );

Make sure the $wgWindowsAzureSDKRoot variable is defined before the include_once
statement.