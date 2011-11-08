<?php
global $wgExtensionAssetsPath, $wgAppleTouchIcon, $wgScriptPath;

$dir = self::$dir;
$code = self::$code;

if ( $wgAppleTouchIcon !== false ) {
	$appleTouchIconTag = Html::element( 'link', array( 'rel' => 'apple-touch-icon', 'href' => $wgAppleTouchIcon ) );
} else {
	$appleTouchIconTag = "";
}

$noticeHtml = empty( $noticeHtml ) ? '' : $noticeHtml;

$cssFileName = ( isset( self::$device['css_file_name'] ) ) ? self::$device['css_file_name'] : 'default';

$startScriptTag = '<script type="text/javascript" language="javascript" src="';
$endScriptTag = '"></script>';
$javaScriptPath = $wgExtensionAssetsPath . '/MobileFrontend/javascripts/';

$openSearchScript = $startScriptTag . $javaScriptPath . 'opensearch.js?version=11022011124437' . $endScriptTag;

$applicationHtml = <<<EOT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang='{$code}' dir='{$dir}' xml:lang='{$code}' xmlns='http://www.w3.org/1999/xhtml'>
  <head>
	<title>{$htmlTitle}</title>
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
	<link href='{$wgExtensionAssetsPath}/MobileFrontend/stylesheets/common.css?version=11022011120834' media='all' rel='Stylesheet' type='text/css' />
	<link href='{$wgExtensionAssetsPath}/MobileFrontend/stylesheets/{$cssFileName}.css?version=10202011120715' media='all' rel='Stylesheet' type='text/css' />
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	{$appleTouchIconTag}
	<script type='text/javascript'>
	  //<![CDATA[
		var title = "{$htmlTitle}";
		var scriptPath = "{$wgScriptPath}";
		function shouldCache() {
		  return true;
		}
	  //]]>
	</script>
  </head>
  <body>
	{$searchWebkitHtml}
	<div class='show' id='content_wrapper'>
	{$noticeHtml}
	{$contentHtml}
	</div>
	{$footerHtml}
	 {$startScriptTag}{$javaScriptPath}application.js?version=11042011120715{$endScriptTag}
	 {$openSearchScript}
  </body>
</html>
EOT;
