<?php

/* Prevent hacking */
if ( !defined( 'TC_STARTED' ) )
{ die( 'Hacking Attempt' ); }

global $userLanguage;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php
switch ( $userLanguage )
{
case 'zh-hant':
echo 'xml:lang="zh-tw" lang="zh-tw"'; break;
case 'zh-hans':
echo 'xml:lang="zh-cn" lang="zh-cn"'; break;
default:
echo 'xml:lang="' . $userLanguage . '" lang="' . $userLanguage . '"'; break;
}
?>
>
<head>
<title>Wikimania 2011 Registration</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="type.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">

