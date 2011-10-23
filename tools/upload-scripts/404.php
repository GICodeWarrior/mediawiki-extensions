<?php

# $_SERVER['REQUEST_URI'] has two different definitions depending on PHP version
if ( preg_match( '!^([a-z]*://)([a-z.]*)(/.*)$!', $_SERVER['REQUEST_URI'], $matches ) ) {
	$prot = $matches[1];
	$serv = $matches[2];
	$loc = $matches[3];
} else {
	$prot = "http://";
	$serv = strlen( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
	$loc = $_SERVER["REQUEST_URI"];
}
$encUrl = htmlspecialchars( $prot . $serv . $loc );

header( 'HTTP/1.1 404 Not Found' );
header( 'Content-Type: text/html;charset=utf-8' );

$standard_404=<<<ENDTEXT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
    <title>Wikimedia page not found: $encUrl</title>
    <link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>
<h1><a href="http://en.wikipedia.org/wiki/HTTP_404">404 error</a>: File not found</h1>
<p>
    The <a href="http://en.wikipedia.org/wiki/Uniform_Resource_Locator">URL</a>
    you requested was not found. Maybe you would like to look at:
</p>
<ul>
    <li><a href="/">The main page</a></li>
    <li><a href="http://download.wikimedia.org">The list of Wikimedia downloads</a></li>
</ul>
<hr noshade="noshade" />
<p>
<i>A project of the <a href="http://wikimediafoundation.org/">Wikimedia
foundation</a></i>.
</p>
</body>
</html>
ENDTEXT;

print $standard_404;
?>
