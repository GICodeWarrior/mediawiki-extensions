<?php
$applicationHtml = <<<EOT
	<?xml version='1.0' encoding='utf-8' ?>
	<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">
	<wml xml:lang="{$code}" dir="{$dir}">
	  <head>
		<title>{$title}</title> 
	    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />
	    <meta name="character-set=utf-8" content="charset"/>
	    <meta forua="true" http-equiv="Cache-Control" content="max-age=0"/>
	  </head>
	{$contentHtml}
	</wml>
EOT;
