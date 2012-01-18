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
		global $wgScriptPath;
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
<script src="//geoiplookup.wikimedia.org/" type="text/javascript"></script>
HTML;
		$htmlOut .= '<script type="text/javascript" src="' . $wgScriptPath . '/load.php?lang=en&modules=jquery%2Cmediawiki&only=scripts&skin=vector&version=20111213T185322Z"> </script>';
		$htmlOut .= <<<HTML
<script type="text/javascript">

$(document).ready(function() {

	var geoHasUsRep = [
		'US', // USA
		'PR', // Puerto Rico
		'VI',  // Virgin Islands
		'MP', // Northern Mariana Islands
		'AS', // American Samoa
		'GU'  // Guam
		];

	// Fake country from get param
	// Parse out GET params from the URL
	var urlParams = {};
	(function () {
		var e,
			a = /\+/g,  
			r = /([^&=]+)=?([^&]*)/g,
			d = function (s) { return decodeURIComponent(s.replace(a, " ")); },
			q = window.location.search.substring(1);

		while (e = r.exec(q)) {
			urlParams[d(e[1])] = d(e[2]);
		}
	})();

	// Defaults to the US, so if we can't determine location, show form
	var country = 'US'; 
	if ( urlParams.country ) {
		country = urlParams.country;
	} else if ( window.Geo && window.Geo.country ) {
		country = window.Geo.country;
	}

	var hasUsRep = ( $.inArray( country, geoHasUsRep ) === 0 );
	if( !hasUsRep ) {
		$("#sopaShareOptions").show();
		$("#sopaZipForm").hide();
	}

});
</script>
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
	left: 500px;
	text-align: left;
	width: 500px;
	padding-bottom: 30px;
}
div#instructions p {
  text-align:justify;
}
div#contacts {
	position: absolute;
	top: 50px;
	left: 110px;
	width: 320px;
	background-color: #161616;
	padding: 5px 20px 20px 20px;
	filter:alpha(opacity=90);
	-moz-opacity:0.90;
	-khtml-opacity: 0.90;
	opacity: 0.90;
}
div#contacts form {
	margin-bottom: 1em;
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
.sopaSocial {
  float: left;
  text-align: center;
  margin-right: 12px;
  margin-bttom: 3px;
  font-size: small;
}
.sopaActionHead {
  font-weight: bold
}
#sopaShareOptions {
  display: none;
}
</style>
</head>
<body>
<div id="everything">
<div id="instructions">
	<div class="sopaBigHeadline">Call your elected officials.</div>
	
	<p>
	Tell them you are their constituent, and you oppose SOPA and PIPA. 
	</p>
	
	<div class="sopaSectionHeadline">Why?</div>
	<p>
	SOPA and PIPA cripple the free and open internet. They put the onus on website owners to police user-contributed material and call for the blocking of entire sites, even if the links are not to infringing material. Small sites will not have the sufficient resources to mount a legal challenge. Without opposition, large media companies may seek to cut off funding sources for small competing foreign sites, even if big media are wrong. Foreign sites will be blacklisted, which means they won't show up in major search engines.
	</p>
	
	<p>
	In a post SOPA/PIPA world, Wikipedia --and many other useful informational sites-- cannot survive in a world where politicians regulate the Internet based on the influence of big money in Washington. It represents a framework for future restrictions and suppression. Congress says it's trying to protect the rights of copyright owners, but the "cure" that SOPA and PIPA represent is much more destructive than the disease they are trying to fix.
	</p>
	
	<p>
	If you'd like to learn even more about SOPA/PIPA, <a href="//en.wikipedia.org/wiki/Wikipedia:SOPA_initiative/Learn_more" target="_blank">click here</a>.
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
			$htmlOut .= $this->getSocialMedia();
		}

		// Output end of the page
		$htmlOut .= "\n</div>\n</div>\n</body>\n</html>\n";

		echo $htmlOut;

		return true;
	}

	/**
	 * Given twitter handle, return an HTML link to the account. Make sure to use rawElement to wrap this.
	 * @param string twitter handle, assumed to be in ascii, without leading at-sign
	 * @return string HTML for the link
	 */
	private function getTwitterHtml( $handle ) {
		return Html::element( 'a', array( 'target' => '_blank', 'href' => 'http://twitter.com/!#/' . $handle ), '@' . $handle );
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
	
				if ( $myRepresentative['twitter'] ) {
					$congressTable .= "\n" . Html::rawElement( 'tr', array(),
						Html::rawElement( 'td', array(), wfMsg( 'congresslookup-twitter', self::getTwitterHtml( $myRepresentative['twitter'] ) ) )
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
					Html::rawElement( 'td', array(), wfMsg( 'congresslookup-twitter', self::getTwitterHtml( $senator['twitter'] ) ) )
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
<div id="sopaZipForm" class="sopaActionDiv">
<h4>Contact your representatives</h4>
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
		// Update links here. Currently pointing to example.com
		$htmlOut = <<<HTML
<div id="sopaShareOptions" class="sopaActionDiv">
<p class="sopaActionHead">Make your voice heard</p>
    <div>
        <div class="sopaSocial">
            <a style="text-decoration: none;"
                href="https://www.facebook.com/sharer.php?u=http://tinyurl.com/7vq4o8g"
                target="wpblackout_Facebook_share"><img width="33"
                height="33"
                src=
                "//upload.wikimedia.org/wikipedia/commons/2/2a/WP_SOPA_sm_icon_facebook_dedede.png"></a><br>

            <a style="text-decoration: none; color: rgb(222, 222, 222);"
                href="https://www.facebook.com/sharer.php?u=http://tinyurl.com/7vq4o8g"
                target="wpblackout_Facebook_share">Facebook</a>
        </div>

        <div class="sopaSocial">
            <a style="text-decoration: none;"
                href=
                "https://m.google.com/app/plus/x/?v=compose&amp;content=I%20support%20the%20January%2018th%20Wikipedia%20blackout%20to%20protest%20SOPA%20and%20PIPA.%20Show%20your%20support%20here%20%20http%3A%2F%2Ftinyurl.com%2F7vq4o8g">
                <img width="33"
                height="33"
                src=
                "//upload.wikimedia.org/wikipedia/commons/0/08/WP_SOPA_sm_icon_gplus_dedede.png"></a><br>

            <a style="text-decoration: none;"
                href=
                "https://m.google.com/app/plus/x/?v=compose&amp;content=I%20support%20the%20January%2018th%20Wikipedia%20blackout%20to%20protest%20SOPA%20and%20PIPA.%20Show%20your%20support%20here%20%20http%3A%2F%2Ftinyurl.com%2F7vq4o8g">
                Google+</a>
        </div>

        <div class="sopaSocial">
            <a style="text-decoration: none;"
                href=
                "https://twitter.com/intent/tweet?text=I%20support%20%23wikipediablackout!%20Show%20your%20support%20here%20http%3A%2F%2Ftinyurl.com%2F7vq4o8g"
                target="wpblackout_Twitter_share"><img width="33"
                height="33"
                src=
                "//upload.wikimedia.org/wikipedia/commons/4/45/WP_SOPA_sm_icon_twitter_dedede.png"></a><br>

            <a style="text-decoration: none; color: rgb(222, 222, 222);"
                href=
                "https://twitter.com/intent/tweet?text=I%20support%20%23wikipediablackout!%20Show%20your%20support%20here%20http%3A%2F%2Ftinyurl.com%2F7vq4o8g"
                target="wpblackout_Twitter_share">Twitter</a>
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
