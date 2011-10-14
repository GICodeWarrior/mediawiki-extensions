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
		global $wgFundraiserLPDefaults;

		$request = $this->getRequest();
		$this->setHeaders();

		# load the querystring variables
		$values = $request->getValues();

		# clear output variable to be safe
		$output = '';

		# get the required variables to use for the landing page
		# (escaping with both htmlspecialchars and wfEscapeWikiText since the
		# parameters are intending to reference templates)
		$template = wfEscapeWikiText( htmlspecialchars( $request->getText( 'template', $wgFundraiserLPDefaults[ 'template' ] ) ) );
		$appeal = wfEscapeWikiText( htmlspecialchars( $request->getText( 'appeal', $wgFundraiserLPDefaults[ 'appeal' ] ) ) );
		$form = wfEscapeWikiText( htmlspecialchars( $request->getText( 'form', $wgFundraiserLPDefaults[ 'form' ] ) ) );

		# begin generating the template call
		$output .= "{{ $template\n| appeal = $appeal\n| form = $form\n";

		# add any parameters passed in the querystring
		foreach ( $values as $k=>$v ) {
			# skip the required variables
			if ( $k == "template" || $k == "appeal" || $k == "form" ) {
				continue;
			}
			# get the variables name and value
			$key = wfEscapeWikiText( htmlspecialchars( $k ) );
			$val = wfEscapeWikiText( htmlspecialchars( $v ) );
			# print to the template in wiki-syntax
			$output .= "| $key = $val\n";
		}
		# close the template call
		$output .= "}}";

		# print the output to the page
		$this->getOutput()->addWikiText( $output );
	}
}