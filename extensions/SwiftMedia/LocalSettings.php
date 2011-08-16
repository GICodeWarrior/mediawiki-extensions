$wgUploadDirectory = "$IP/images/swift";
// we don't need this and will ignore it. $wgDeletedDirectory = "{$wgUploadDirectory}/deleted";
$wgUploadPath = "http://alsted.wikimedia.org/images/swift";

$wgLocalFileRepo = array(
	'class' => 'SwiftRepo',
	// $wgLocalFileRepo must be named 'local' for $repo->isLocal() to work
	'name' => 'local',
	#'directory' => 'http://alsted.wikimedia.org/images', #$wgUploadDirectory,
	'directory' => $wgUploadDirectory,
	'user' => 'system:media',
	'key' => 'secret',
	'authurl' => 'http://alsted.wikimedia.org/auth/v1.0',
	'container' => 'images%2Fswift',
	'scriptDirUrl' => $wgScriptPath,
	'scriptExtension' => $wgScriptExtension,
	'url' => $wgUploadBaseUrl ? $wgUploadBaseUrl . $wgUploadPath : $wgUploadPath,
	'hashLevels' => $wgHashedUploadDirectory ? 2 : 0,
	'thumbScriptUrl' => $wgThumbnailScriptPath,
	'transformVia404' => !$wgGenerateThumbnailOnParse,
	#'deletedDir' => $wgDeletedDirectory,
	 'deletedHashLevels' => 3 
);

$wgDebugLogFile = "/var/www/debug/abcd";
$wgDebugTimestamps = true;
$wgShowExceptionDetails = true;


