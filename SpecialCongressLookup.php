<?php
/**
 * This class creates a page which asks the user for their zip code. It then uses the zip code to
 * look up information about the user's congressional representatives and presents that information
 * to the user.
 */
class SpecialCongressLookup extends UnlistedSpecialPage {
	protected $zip = null;

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
		$zip = $wgRequest->getVal( 'zip' );
		if ( !is_null( $zip )) $this->setZip( $zip );
		
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
	color: #dedede;
	margin: 2em;
	font-family:Times New Roman;
	background: black url('//upload.wikimedia.org/wikipedia/commons/9/98/WP_SOPA_Splash_Full.jpg') no-repeat 0 0;
}
h3{
    font-size: 1.5em;
    text-align:center;
    margin-bottom: 0.5em;
    color: #ffffff;
    font-weight: bold;
}

h4 { 
  font-weight: bold;
  color: #ffffff;
}
a:link, a:visited {
	color: #dedede;
}
a:hover, a:active {
	color: #ffffff;
}
div#everything {
	width: 920px;
	margin: 0 auto;
}
div#instructions {
	position: absolute;
	top: 67px;
	left: 420px;
	text-align: left;
	width: 500px;
	padding-bottom: 30px;
}
div#instructions p {
  text-align:justify;
}
div#contacts {
	position: absolute;
	top: 400px;
	left: 50px;
	width: 330px;

}
table.person {
	margin-bottom: 1em;
	margin-left: 20px;
	border: none;
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
	color: #cccccc;
	margin-left: 20px;
}
h3 {
	font-weight: normal;
	font-size: 20px;
}
h4 {
	font-weight: normal;
	font-size: 17px;
}
.sopaBigHeadline {
  font-size: 1.5em;
  margin-bottom: 0.5em;
}
.sopaSectionHeadline {
  font-size: 1.2em;
  margin-bottom: 0.2em;
}
</style>
</head>
<body>
<div id="everything">
<div id="instructions">
	<div class="sopaBigHeadline">Take action to stop SOPA and PIPA, the internet blacklist bills</div>
	<p>
	For maximum impact, please consider calling your US Representative and US Senators and explain that you are a constituent and that you oppose these bills and similar future legislation.
	</p>
	
	<div class="sopaSectionHeadline">Things you may want to say to your Senator or Representative</div>
	<p class="quote">
	“As one of your concerned constituents, I urge you to oppose SOPA and PIPA or any future bill that would censor free speech and damage the security of the Internet.”
	</p>
	
	<div class="sopaSectionHeadline">Regarding Censorship</div>
	<p class="quote">
	“The Internet has become an important communications tool allowing the free flow of ideas. As introduced in the House and the Senate, SOPA and PIPA would give the Justice Department and courts tremendous power to shut down entire sites. These bills ignore the principles of the First Amendment that require tailored solutions in lieu of across-the-board censorship. Unfortunately these bills represent terrible precedents for the United States and the world.”
	</p>
	
	<div class="sopaSectionHeadline">Regarding Cybersecurity</div>
	<p class="quote">
	“A safe and secure Web is vital to our privacy, our access to free knowledge, and to commerce. Hundreds of established authorities on the Internet believe that the required blocking of Internet sites in SOPA and PIPA is badly thought out and threatens Internet security.”
	</p>
</div>
<div id="contacts">

	
HTML;

		if ( $this->getZip() === false ) {
			$htmlOut .= $this->getZipForm( true );
		} elseif ( !is_null( $this->getZip() )) {
			$htmlOut .= $this->getCongressTables();
		} else {
			$htmlOut .= $this->getZipForm();
		}

		// Output end of the page
		$htmlOut .= "\n</div>\n</div>\n</body>\n</html>\n";

		echo $htmlOut;

		return true;
	}
	
	/**
	 * Get an HTML table of data for the user's congressional representatives
	 * @return string HTML for the table
	 */
	private function getCongressTables() {
		global $wgCongressLookupErrorPage;
		
		$myRepresentatives = CongressLookupDB::getRepresentative( $this->zip );
		$mySenators = CongressLookupDB::getSenators( $this->zip );

		$congressTable = '';
		
		$congressTable .= Html::element( 'h4', array(), 'Your Representatives:' );

		if ( $myRepresentatives ) {
			foreach ( $myRepresentatives as $myRepresentative ) {
				$congressTable .= "\n" . Html::openElement( 'table', array (
					'class' => 'person',
				) );
	
				$congressTable .= "\n" . Html::rawElement( 'tr', array(),
					Html::element( 'td',  array ( 'class' => 'name' ), $myRepresentative['name'] )
			   	);
	
				$congressTable .= "\n" . Html::rawElement( 'tr', array(),
					Html::element( 'td', array(), wfMsg( 'congresslookup-phone', $myRepresentative['phone'] ) )
			   	);
	
				$congressTable .= "\n" . Html::rawElement( 'tr', array(),
					Html::element( 'td', array(), wfMsg( 'congresslookup-fax', $myRepresentative['fax'] ) )
				);
				
				if ( $myRepresentative['twitter'] ) {
					$congressTable .= "\n" . Html::rawElement( 'tr', array(),
						Html::element( 'td', array(), wfMsg( 'congresslookup-twitter', $myRepresentative['twitter'] ) )
					);
				}
	
				$congressTable .= "\n" . Html::rawElement( 'tr', array(),
					Html::rawElement( 'td', array(),
						Html::element( 'a', array (
							'href' => $myRepresentative['contactform'],
							'target' => '_blank',
							),
							wfMsg( 'congresslookup-contact-form' )
						)
					)
				);
	
				$congressTable .= "\n" . Html::closeElement( 'table' );
			}
			if ( count( $myRepresentatives ) > 1 ) {
				$congressTable .= HTML::element( 'p', array( 'class' => 'note' ), wfMsg( 'congresslookup-multiple-house-reps' ));
			}
		} else {
			$congressTable .= Html::element( 'p', array(), wfMsg( 'congresslookup-no-house-rep' ) );
		}
		foreach ( $mySenators as $senator ) {
			$congressTable .= "\n" . Html::openElement( 'table', array (
				'class' => 'person',
			) );

			$congressTable .= "\n" . Html::rawElement( 'tr', array(),
				Html::element( 'td',  array ( 'class' => 'name' ), $senator['name'] )
			);

			$congressTable .= "\n" . Html::rawElement( 'tr', array(),
				Html::element( 'td', array(), wfMsg( 'congresslookup-phone', $senator['phone'] ) )
			);

			$congressTable .= "\n" . Html::rawElement( 'tr', array(),
				Html::element( 'td', array(), wfMsg( 'congresslookup-fax', $senator['fax'] ) )
			);
			
			if ( $senator['twitter'] ) {
				$congressTable .= "\n" . Html::rawElement( 'tr', array(),
					Html::element( 'td', array(), wfMsg( 'congresslookup-twitter', $senator['twitter'] ) )
				);
			}

			$congressTable .= "\n" . Html::rawElement( 'tr', array(),
				Html::rawElement( 'td', array(),
					Html::element( 'a', array (
						'href' => $senator['contactform'],
						'target' => '_blank',
					),
					wfMsg( 'congresslookup-contact-form' )
					)
				)
			);

			$congressTable .= "\n" . Html::closeElement( 'table' );
		}
		if ( count( $mySenators ) == 0 ) {
			$congressTable .= Html::element( 'p', array(), wfMsg( 'congresslookup-no-senators' ) );
		}
		
		$congressTable .= Html::openElement( 'p' );
		$congressTable .= Html::element( 'a', array ( 'href' => $wgCongressLookupErrorPage ),
			wfMsg( 'congresslookup-report-errors' ) );
		$congressTable .= Html::closeElement( 'p' );
		
		return $congressTable;
	}
	
	/**
	 * Get HTML for a Zip Code form
	 * @return string HTML
	 */
	private function getZipForm( $isError=false ) {
		$htmlOut = <<<HTML
<h4>Contact your representatives</h4>
<div class="sopaActionDiv">
HTML;
		if ( $isError ) {
			$htmlOut .= Html::element( 'p', array( 'class' => 'error' ), wfMsg( 'congresslookup-zipcode-error' ));
		}
		$htmlOut .= <<<HTML
	<form action="" method="GET">
		<label for="zip">Your zip code:</label>
		<input type="text" maxlength="10" size="5" name="zip" id="zip"/>
		<input type="submit" value="Look up" name="submit"/>
	</form>
</div>
HTML;
		return $htmlOut;
	}
	
	/**
	 * Get HTML for social media links
	 * @return string HTML for social media links
	 */
	private function getSocialMedia() {
		$htmlOut = <<<HTML
<div class="sopaActionDiv">
	<div>
		<div class="sopaSocial">
			<a style="text-decoration: none;" href="https://www.facebook.com/sharer.php?u=http%3A%2F%2Fexample.com%2F">
			<img width="33" height="33" src="//upload.wikimedia.org/wikipedia/commons/2/2a/WP_SOPA_sm_icon_facebook_dedede.png">
			</a>
			<br/>
			<a style="text-decoration: none;" href="https://www.facebook.com/sharer.php?u=http%3A%2F%2Fexample.com%2F">Facebook</a>
		</div>
		<div class="sopaSocial">
			<a style="text-decoration: none;" href="https://m.google.com/app/plus/x/?v=compose&content=Google%20Plus%20Post%20Here%20http%3A%2F%2Fexample.com%2F">
			<img width="33" height="33" src="//upload.wikimedia.org/wikipedia/commons/0/08/WP_SOPA_sm_icon_gplus_dedede.png">
			</a>
			<br/>
			<a style="text-decoration: none; color:" href="https://m.google.com/app/plus/x/?v=compose&content=Google%20Plus%20Post%20Here%20http%3A%2F%2Fexample.com%2F">Google+</a>
		</div>
		<div class="sopaSocial">
			<a style="text-decoration: none;" href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Ftest.wikipedia.org%2Fwiki%2FMain_Page%3Fbanner%3Dblackout&text=Tweet%20here%20%23WikipediaBlackout%20http%3A%2F%2Fexample.com%2F">
			<img width="33" height="33" src="//upload.wikimedia.org/wikipedia/commons/4/45/WP_SOPA_sm_icon_twitter_dedede.png">
			</a>
			<br/>
			<a style="text-decoration: none;" href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Ftest.wikipedia.org%2Fwiki%2FMain_Page%3Fbanner%3Dblackout&text=Tweet%20here%20%23WikipediaBlackout%20http%3A%2F%2Fexample.com%2F">Twitter</a>
		</div>
	</div>
	<div style="clear: both;"></div>
</div>
HTML;
		return $htmlOut;
	}
	
	/**
	 * Setter for $this->zip
	 * 
	 * In the event that $zip is invalid, set the value of $this->zip to false.
	 * @param $zip
	 */
	public function setZip( $zip ) {
		if ( !$this->isValidZip( $zip )) {
			$this->zip = false;
		} else { 		
			$this->zip = $zip;
		}
	}
	
	public function getZip() {
		return $this->zip;
	}
	
	/**
	 * Make sure the zip code entered was valid-ish
	 * @param $zip
	 * @return bool
	 */
	public function isValidZip( $zip ) {
		$zipPieces = explode( '-', $zip, 2 );
		
		if ( strlen( $zipPieces[0] ) != 5 || !is_numeric( $zipPieces[0] )) {
			return false;
		}
		
		if ( isset( $zipPieces[1] )) {
			if ( strlen( $zipPieces[1] ) != 4 || !is_numeric( $zipPieces[1] )) {
				return false;
			}
		}
		
		return true;
	}
}
