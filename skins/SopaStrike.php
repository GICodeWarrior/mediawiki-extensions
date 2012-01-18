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
		$title = wfMsg( 'blackout-sopastrike-title' );
		$ogdesc = wfMsg( 'blackout-sopastrike-ogdesc' );
		$message1 = wfMsg( 'blackout-sopastrike-message1' );
		$message2 = wfMsg( 'blackout-sopastrike-message2' );
		$message3 = wfMsg( 'blackout-sopastrike-message3' );
		$name = wfMsg( 'allmessagesname' );
		$email = wfMsg( 'email' );
		$address = wfMsg( 'blackout-sopastrike-address' );
		$zipcode = wfMsg( 'blackout-sopastrike-zipcode' );
		$action = wfMsg( 'blackout-sopastrike-action' );
		$actionmsg1 = wfMsg( 'blackout-sopastrike-actionmsg1' );
		$actionmsg2 = wfMsg( 'blackout-sopastrike-actionmsg2' );
		$join = wfMsg( 'blackout-sopastrike-join' );
		$add = wfMsg( 'blackout-sopastrike-add' );
		$learn = wfMsg( 'blackout-sopastrike-learn' );
		$video = wfMsg( 'blackout-sopastrike-video' );
		$orgpage = wfMsg( 'blackout-sopastrike-orgpage' );
		$infographic = wfMsg( 'blackout-sopastrike-infographic' );
		$ocsopa = wfMsg( 'blackout-sopastrike-ocsopa' );
		$ocpipa = wfMsg( 'blackout-sopastrike-ocpipa' );
		$disclaimer = wfMsg( 'blackout-sopastrike-disclaimer' );
		$privacy = wfMsg( 'blackout-sopastrike-privacy' );
		?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php echo $title ?></title>
		<meta property="og:title" content="<?php echo $title ?>">
		<meta property="og:description" content="<?php echo $ogdesc ?>">
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
			<h1><?php echo $message1 ?>&nbsp;<strong><?php echo $message2 ?></strong>&nbsp;<?php echo $message3 ?></h1>
		</div>
		<form action="http://act.fightforthefuture.org/page/s/sopa-strike-modal" method="post">
			<div id="info">
				<input size="16" id="firstname" name="firstname" type="text"  placeholder="<?php echo $name ?>">
				<input type="email" class="text" size="48" id="email" name="email" placeholder="<?php echo $email ?>">
				<input size="48" id="addr1" name="addr1" type="text"  placeholder="<?php echo $address ?>">
				<input size="5" id="zip" name="zip" type="text"  placeholder="<?php echo $zipcode ?>">
				<button type="submit"><span><?php echo $action ?></span></button>
			</div>
			<div id="letter">
				<textarea id="custom-285" name="custom-285"><?php echo $actionmsg1 ?>

					<?php echo $actionmsg2 ?>
				</textarea>
			</div>

		</form>

		<h1><a href="http://sopastrike.com/"><?php echo $join ?></a> &amp; <a href="https://www.mediawiki.org/wiki/Extension:Blackout"><?php echo $add ?></a></h1>
		<p><strong><?php echo $learn ?></strong>
			<a href="http://fightforthefuture.org/pipa"><?php echo $video ?></a> &middot;
			<a href="http://americancensorship.org/"><?php echo $orgpage ?></a> &middot;
			<a href="http://americancensorship.org/infographic.html"><?php echo $infographic ?></a> <br>
			<a href="http://www.opencongress.org/bill/112-h3261/show"><?php echo $ocsopa ?></a> &middot;
			<a href="http://www.opencongress.org/bill/112-s968/show"><?php echo $ocpipa ?></a>
		<p><?php echo $disclaimer ?>&nbsp;<a href="http://fightforthefuture.org/privacy"><?php echo $privacy ?></a><br/>&nbsp;</p>
	</div>
	</body>
	</html>

	<?php
	}
}