<?php
/*
 * SpecialPage definition for FundraiserLandingPage.  Extending UnlistedSpecialPage
 * since this page does not need to listed in Special:SpecialPages.
 *
 * @author Peter Gehres <pgehres@wikimedia.org>
 */
class FundraiserLandingPage extends UnlistedSpecialPage
{
	function __construct() {
		parent::__construct( 'FundraiserLandingPage' );
	}

	function execute( $par ) {
		global $wgFundraiserLPDefaults, $wgOut, $wgFundraiserLandingPageMaxAge;
		
		#Set squid age
		$wgOut->setSquidMaxage($wgFundraiserLandingPageMaxAge);		
		$request = $this->getRequest();

		# clear output variable to be safe
		$output = '';

		# get the required variables to use for the landing page
		$template = $this->make_safe( $request->getText( 'template', $wgFundraiserLPDefaults[ 'template' ] ) );
		$appeal = $this->make_safe( $request->getText( 'appeal', $wgFundraiserLPDefaults[ 'appeal' ] ) );
		$form = $this->make_safe( $request->getText( 'form', $wgFundraiserLPDefaults[ 'form' ] ) );

		# begin generating the template call
		$output .= "{{ $template\n| appeal = $appeal\n| form = $form\n";

		# add any parameters passed in the querystring
		foreach ( $request->getValues() as $k_unsafe => $v_unsafe ) {
			# skip the required variables
			if ( $k_unsafe == "template" || $k_unsafe == "appeal" || $k_unsafe == "form" ) {
				continue;
			}
			# get the variables name and value
			$key = $this->make_safe( $k_unsafe );
			$val = $this->make_safe( $v_unsafe );
			# print to the template in wiki-syntax
			$output .= "| $key = $val\n";
		}
		# close the template call
		$output .= "}}";

		# print the output to the page
		$this->getOutput()->addWikiText( $output );
	}


	/**
	 * This function limits the possible charactes passed as template keys and
	 * values to letters, numbers, hypens and underscores. The function also
	 * performs standard escaping of the passed values.
	 *
	 * @param $string The unsafe string to escape and check for invalid characters
	 * @return mixed|String A string matching the regex or an empty string
	 */
	function make_safe( $string ) {
		$num = preg_match( '([a-zA-Z0-9_-]+)', $string, $matches );
		
		if ( $num == 1 ){
			# theoretically this is overkill, but better safe than sorry
			return wfEscapeWikiText( htmlspecialchars( $matches[0] ) );
		}
		return '';
	}
}

