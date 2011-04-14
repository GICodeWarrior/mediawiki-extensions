<?php

class CustomUserloginTemplate extends UserloginTemplate {

	protected $campaign = null;

	function __construct() {
		global $wgRequest;
		parent::__construct();
		if( isset( $wgRequest->getVal( 'campaign' ) ) ) {
			preg_match( '/[A-Za-z0-9]+/', $wgRequest->getVal( 'campaign' ), $matches );
			$this->campaign = $matches[0];
		}
	}

	function msg( $str ) {
		// doesn't exist
		if( $this->campaign && ( wfMsg( "customusertemplate-{$this->campaign}-$str" ) == "&lt;customusertemplate-{$this->campaign}-$str&gt;" ) ) {
			parent::msg( $str );
		} else {
			$this->msgWikiCustom( "customusertemplate-{$this->campaign}-$str" );
		}
	}

	function msgWiki( $str ) {
		// doesn't exist
		if( $this->campaign && ( wfMsg( "customusertemplate-{$this->campaign}-$str" ) == "&lt;customusertemplate-{$this->campaign}-$str&gt;" ) ) {
			parent::msgWiki( $str );
		} else {
			$this->msgWikiCustom( "customusertemplate-{$this->campaign}-$str" );
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
		if( isset( $wgRequest->getVal( 'campaign' ) ) ) {
			preg_match( '/[A-Za-z0-9]+/', $wgRequest->getVal( 'campaign' ), $matches );
			$this->campaign = $matches[0];
		}
	}

	function msg( $str ) {
		// doesn't exist
		if( $this->campaign && ( wfMsg( "customusertemplate-{$this->campaign}-$str" ) == "&lt;customusertemplate-{$this->campaign}-$str&gt;" ) ) {
			parent::msg( $str );
		} else {
			$this->msgWikiCustom( "customusertemplate-{$this->campaign}-$str" );
		}
	}

	function msgWiki( $str ) {
		// doesn't exist
		if( $this->campaign && (wfMsg( "customusertemplate-{$this->campaign}-$str" ) == "&lt;customusertemplate-{$this->campaign}-$str&gt;" ) ) {
			parent::msgWiki( $str );
		} else {
			$this->msgWikiCustom( "customusertemplate-{$this->campaign}-$str" );
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