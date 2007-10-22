<?php

/**
 * The notice loader is a central point of contact; a single consistent
 * URL used for the cluster, in all language and project versions.
 *
 * That central URL can be heavily cached, and centrally purged when
 * updates do happen.
 *
 * It loads up a second page (Special:NoticeText) with specific project
 * and language options and a version timestamp for clean cache breaking.
 */
class SpecialNoticeLoader extends NoticePage {
	function __construct() {
		parent::__construct("NoticeLoader");
	}

	/**
	 * Clients should recheck this fairly often, but not _constantly_.
	 * 5 minutes?
	 */
	protected function maxAge() {
		global $wgNoticeTimeout;
		return $wgNoticeTimeout;
	}
	
	function getJsOutput( $par ) {
		global $wgNoticeTestMode;
		$loader = $this->loaderScript();
		if( $wgNoticeTestMode ) {
			return $this->testCondition( $loader );
		} else {
			return $loader;
		}
	}
	
	function testCondition( $code ) {
		global $wgNoticeEnabledSites;
		$conditions = array();
		$conditions[] = '/[?&]sitenotice=yes/.test(document.location.search)';
		if( $wgNoticeEnabledSites ) {
			foreach( $wgNoticeEnabledSites as $site ) {
				$conditions[] =
					'(wgNoticeLang+"."+wgNoticeProject)==' .
					Xml::encodeJsVar( $site );
			}
		}
		return
			'if((' .
			implode( ')||(', $conditions ) .
			')){'.
			$code .
			'}';
	}
	
	function loaderScript() {
		global $wgNoticeText;
		$encUrl = htmlspecialchars( $wgNoticeText );
		$encEpoch = urlencode( efCentralNoticeEpoch() );
		return "document.writeln(" .
			Xml::encodeJsVar( "<script src=\"$encUrl/" ) .
			'+wgNoticeProject+"/"+wgNoticeLang+' .
			Xml::encodeJsVar( "?$encEpoch\"></script>" ).
			');';
	}
}