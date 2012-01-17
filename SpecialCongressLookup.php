<?php
/**
 * This class creates a page which asks the user for their zip code. It then uses the zip code to
 * look up information about the user's congressional representatives and presents that information
 * to the user.
 */
class SpecialCongressLookup extends UnlistedSpecialPage {
	var $zip;
	
	public function __construct() {
		// Register special page
		parent::__construct( 'CongressLookup' );
	}
	
	/**
	 * Handle different types of page requests
	 */
	public function execute( $sub ) {
		global $wgRequest, $wgOut;
		
		// Pull in query string parameters
		$this->zip = $wgRequest->getVal( 'zip' );
		
		// Setup
		$wgOut->disable();
		$this->sendHeaders();
		
		$this->buildPage();
		
	}
	
	/**
	 * Generate the HTTP response headers for the landing page
	 */
	private function sendHeaders() {
		global $wgCongressLookupSharedMaxAge, $wgCongressLookupMaxAge;
		header( "Content-type: text/html; charset=utf-8" );
		header( "Cache-Control: public, s-maxage=$wgCongressLookupSharedMaxAge, max-age=$wgCongressLookupMaxAge" );
	}
	
	/**
	 * Build the HTML for the page
	 * @return true
	 */
	private function buildPage() {
		$htmlOut = '';
		
		$dir = dirname( __FILE__ ) . '/';
		
		// Output beginning of the page
		$htmlOut .= <<<HTML
<!DOCTYPE html>
<html lang="en" dir="ltr" class="client-nojs">
<head>
<title>Wikipedia, the free encyclopedia</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="generator" content="MediaWiki 1.18wmf1" />
<style type="text/css">
body {
	background-color: black;
	color: white;
	margin: 2em;
	font-family: arial, sans-serif;
	font-size: 15px;
	background: black url('//upload.wikimedia.org/wikipedia/commons/0/0a/WP_SOPA_W_with_Gradient.png') no-repeat 0 0;
}
a:link, a:visited {
	color: #28a6b1;
}
a:hover, a:active {
	color: #999999;
}
div#everything {
	width: 920px;
	margin: 0 auto;
}
div#instructions {
	float:left;
	text-align: left;
	width: 580px;
	background-color: #202020;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;
	padding: 5px 20px 20px 20px;
	filter:alpha(opacity=90);
	-moz-opacity:0.90;
	-khtml-opacity: 0.90;
	opacity: 0.90;
}
div#contacts {
	float:left;
	width: 259px;
	padding: 5px 20px;
}
table.person {
	margin-bottom: 1em;
}
table.person td.name {
	font-weight: bold;
}
p {
	margin: 1em 0;
}
p.quote {
	font-family: georgia, serif;
	font-size: 14px;
	color: #CCCCCC;
}
h3 {
	font-weight: normal;
	font-size: 20px;
}
h4 {
	font-weight: normal;
	font-size: 17px;
}
</style>
</head>
<body>
<div id="everything">
<div id="instructions">
	<h3>Take action to stop SOPA and PIPA, the internet blacklist bills</h3>
	<p>
	For maximum impact, please consider calling your US Representative and US Senators and explain that you are a constituent and that you oppose these bills and similar future legislation.
	</p>
	
	<h4>Things you may want to say to your Senator or Representative</h4>
	<p class="quote">
	“As one of your concerned constituents, I urge you to oppose SOPA and PIPA or any future bill that would censor free speech and damage the security of the Internet.”
	</p>
	
	<h4>Regarding Censorship</h4>
	<p class="quote">
	“The Internet has become an important communications tool allowing the free flow of ideas. As introduced in the House and the Senate, SOPA and PIPA would give the Justice Department and courts tremendous power to shut down entire sites. These bills ignore the principles of the First Amendment that require tailored solutions in lieu of across-the-board censorship. Unfortunately these bills represent terrible precedents for the United States and the world.”
	</p>
	
	<h4>Regarding Cybersecurity</h4>
	<p class="quote">
	“A safe and secure Web is vital to our privacy, our access to free knowledge, and to commerce. Hundreds of established authorities on the Internet believe that the required blocking of Internet sites in SOPA and PIPA is badly thought out and threatens Internet security.”
	</p>
</div>
<div id="contacts">
	<h4>Your Representatives:</h4>
HTML;
		if ( $this->zip ) {
			$htmlOut .= $this->getCongressTables();
		}
		
		// Output end of the page
		$htmlOut .= "\n</div>\n</div>\n</body>\n</html>\n";
		
		echo $htmlOut;
		
		return true;
	}
	
	/**
	 * Get an HTML table of data for the user's congressional representatives
	 * @return HTML for the table
	 */
	private function getCongressTables() {
		$myRepresentative = array();
		$mySenators = array();
		$myRepresentative = CongressLookupDB::getRepresentative( $this->zip );
		$mySenators = CongressLookupDB::getSenators( $this->zip );
		
		$congressTable = '';
		
		if ( $myRepresentative ) {
			$congressTable .= '<table class="person" border="0" cellspacing="0" cellpadding="0" style="border:none;">';
			$congressTable .= '<tr><td class="name">'.$myRepresentative[0]['name'].'</td></tr>';
			$congressTable .= '<tr><td>'.wfMsg( 'congresslookup-phone', $myRepresentative[0]['phone'] ).'</td></tr>';
			$congressTable .= '<tr><td>'.wfMsg( 'congresslookup-fax', $myRepresentative[0]['fax'] ).'</td></tr>';
			$congressTable .= '<tr><td><a href="'.$myRepresentative[0]['contactform'].'" target="_blank">';
			$congressTable .= wfMsg( 'congresslookup-contact-form' ).'</a></td></tr>';
			$congressTable .= '</table>';
		}
		foreach ( $mySenators as $senator ) {
			$congressTable .= '<table class="person" border="0" cellspacing="0" cellpadding="0" style="border:none;">';
			$congressTable .= '<tr><td class="name">'.$senator['name'].'</td></tr>';
			$congressTable .= '<tr><td>'.wfMsg( 'congresslookup-phone', $senator['phone'] ).'</td></tr>';
			$congressTable .= '<tr><td>'.wfMsg( 'congresslookup-fax', $senator['fax'] ).'</td></tr>';
			$congressTable .= '<tr><td><a href="'.$senator['contactform'].'" target="_blank">';
			$congressTable .= wfMsg( 'congresslookup-contact-form' ).'</a></td></tr>';
			$congressTable .= '</table>';
		}
		
		return $congressTable;
	}
	
}
