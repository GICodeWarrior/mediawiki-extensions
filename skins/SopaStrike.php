<?php

class SkinSopaStrike extends SkinTemplate {
	var $skinname = 'sopastrike', $stylename = 'sopastrike',
		$template = 'SopaStrikeTemplate', $useHeadElement = false;
}

class SopaStrikeTemplate extends QuickTemplate {

	/**
	 * Main function, used by classes that subclass QuickTemplate
	 * to show the actual HTML output
	 */
	public function execute() {
		?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Strike Against SOPA & PIPA</title>
		<meta property="og:title" content="Strike Against Sopa!">
		<meta property="og:description" content="Internet goes on strike — blackout everywhere. On Wed Jan 18, many of your favorites sites will be unavailable to you to stop web censorship. Call your congressperson today.">
		<meta property="og:image" content="http://sopastrike.com/images/newspaper-folded.jpg">
		<meta property="og:url" content="http://sopastrike.com/strike">
		<link rel="stylesheet" type="text/css" href="http://sopastrike.com/strike/strike.css">
		<script src="http://sopastrike.com/strike/jquery.js"></script>
		<script src="http://sopastrike.com/strike/jquery.placeholder.js"></script>
	</head>
	<body>
	<div id="strike-topper"></div>
	<div id="strike-wrapper">
		<div>
			<img src="http://sopastrike.com/strike/strike-paper.jpg" width="570" height="350" id="paper">
			<h1>Today, we are striking against censorship. <strong>Join us in this historic moment:</strong> tell Congress to stop this bill now!</h1>
		</div>
		<form action="http://act.fightforthefuture.org/page/s/sopa-strike-modal" method="post">
			<div id="info">
				<input size="16" id="firstname" name="firstname" type="text"  placeholder="Name">
				<input type="email" class="text" size="48" id="email" name="email" placeholder="Email">

				<input size="48" id="addr1" name="addr1" type="text"  placeholder="Address">
				<input size="5" id="zip" name="zip" type="text"  placeholder="Zipcode">
				<button type="submit"><span>Write Congress Now!</span></button>
			</div>
			<div id="letter">
				<textarea id="custom-285" name="custom-285">I am writing to you as a voter in your district. I urge you to oppose the Senate version of S. 968, the PROTECT IP Act. The PROTECT IP Act is dangerous, ineffective, and short-sighted. The House version -- just introduced by Rep. Goodlatte -- is far worse.

					Over coming days you'll be hearing from the many businesses, advocacy organizations, and ordinary Americans who oppose this legislation because of the myriad ways in which it will stifle free speech and innovation.  We hope you'll take our concerns to heart and oppose this legislation.
				</textarea>
			</div>

		</form>

		<h1><a href="http://sopastrike.com/">Join The Strike!</a> and <a href="https://www.mediawiki.org/wiki/Extension:Blackout">add this to your site</a></h1>
		<p><strong>Learn More:</strong>
			<a href="http://fightforthefuture.org/pipa">Watch the video</a> &middot;
			<a href="http://americancensorship.org/">American Censorship page</a> &middot;
			<a href="http://americancensorship.org/infographic.html">View the Infographic</a> <br>
			<a href="http://www.opencongress.org/bill/112-h3261/show">Read SOPA on OpenCongress</a> &middot;
			<a href="http://www.opencongress.org/bill/112-s968/show">Read PIPA on OpenCongress</a>
		<p>Fight For The Future may contact you about future campaigns. <br>We will never share your email with anyone. <a href="http://fightforthefuture.org/privacy">Privacy Policy</a></p>
	</div>
	</body>
	</html>

	<?php
	}
}