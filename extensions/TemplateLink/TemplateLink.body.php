<?php
/**
 * TemplateLink extension - shows a template as a new page
 *
 * @ingroup Extensions
 * @author Magnus Manske
 * @copyright © 2007 Magnus Manske
 * @licence GNU General Public Licence 2.0 or later
 */

class TemplateLink extends SpecialPage
{
	public function __construct() {
		parent::__construct("TemplateLink");
	}

	public function execute( $par ){
		global $wgOut, $wgRequest;

		

		$this->setHeaders();
		$template = $wgRequest->getText('template');

		# Check if parameter is empty
		$template = trim( $template );
		if( $template == '' ){
			$wgOut->addWikiText( wfMsg('templatelink_empty') );
			return;
		}

		# Expand template
		$wikitext = '{{' . $template. '}}';

		# Output
		#                $wgOut->addWikiText( $wikitext ); # This works, but is not recommended on mediawiki.org...
		$wgOut->addHTML( $this->sandboxParse( $wikitext ) ); # ...so we'll use this one.

		# Setting page tatle based on used template, except if there's a title argument passed
		$title = $wgRequest->getText('newtitle');
		if( $title == '' ){
			$title = ucfirst( trim( array_shift( explode( '|', $template, 2 ) ) ) );
			$wgOut->setPageTitle( wfMsg( 'templatelink_newtitle' , $title ) );
		} else {
			$wgOut->setPageTitle( $title );
		}
	}

	function sandboxParse($wikiText){
		global $wgUser;
		$myParser = new Parser();
		$myParserOptions = ParserOptions::newFromUser( $wgUser );
		$result = $myParser->parse($wikiText, $this->getTitle(), $myParserOptions);
		return $result->getText();
	}
}
