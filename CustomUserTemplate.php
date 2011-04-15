<?php

class CustomUserloginTemplate extends UserloginTemplate {

	protected $campaign = null;

	function __construct() {
		global $wgRequest;
		parent::__construct();
		if( $wgRequest->getVal( 'campaign' ) ) {
			preg_match( '/[A-Za-z0-9]+/', $wgRequest->getVal( 'campaign' ), $matches );
			$this->campaign = $matches[0];
		}
	}

	function msg( $str ) {
		// exists
		if( $this->campaign && wfMessage( "customusertemplate-{$this->campaign}-$str" )->exists() ) {
			$this->msgWikiCustom( "customusertemplate-{$this->campaign}-$str" );
		} else {
			parent::msg( $str );
		}
	}

	function msgWiki( $str ) {
		// exists
		if( $this->campaign && wfMessage( "customusertemplate-{$this->campaign}-$str" )->exists() ) {
			$this->msgWikiCustom( "customusertemplate-{$this->campaign}-$str" );
		} else {
			parent::msgWiki( $str );
		}
	}

	function msgWikiCustom( $str ) {
		global $wgParser, $wgOut;

		$text = $this->translator->translate( $str );
		$parserOutput = $wgParser->parse( $text, $wgOut->getTitle(),
			$wgOut->parserOptions(), true );
		echo $parserOutput->getText();
	}

}

class CustomUsercreateTemplate extends UsercreateTemplate {
	protected $campaign = null;

	function __construct() {
		global $wgRequest;
		parent::__construct();
		if( $wgRequest->getVal( 'campaign' ) ) {
			preg_match( '/[A-Za-z0-9]+/', $wgRequest->getVal( 'campaign' ), $matches );
			$this->campaign = $matches[0];
		}
	}

	function msg( $str ) {
		// exists
		if( $this->campaign && wfMessage( "customusertemplate-{$this->campaign}-$str" )->exists() ) {
			$this->msgWikiCustom( "customusertemplate-{$this->campaign}-$str" );
		} else {
			parent::msg( $str );
		}
	}

	function msgWiki( $str ) {
		// exists
		if( $this->campaign && wfMessage( "customusertemplate-{$this->campaign}-$str" )->exists() ) {
			$this->msgWikiCustom( "customusertemplate-{$this->campaign}-$str" );
		} else {
			parent::msgWiki( $str );
		}
	}

	function msgWikiCustom( $str ) {
		global $wgParser, $wgOut;

		$text = $this->translator->translate( $str );
		$parserOutput = $wgParser->parse( $text, $wgOut->getTitle(),
			$wgOut->parserOptions(), true );
		echo $parserOutput->getText();
	}
}