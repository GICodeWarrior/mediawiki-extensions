<?php
/**
 * based on LODPullerByLabel
 * @group SWB
 * @author Anna
 *
 */
class SWBSemanticSearchByLabel extends SpecialPage {
	function __construct() {
		parent::__construct( 'SWBSemanticSearchByLabel' );
	}
 
	function execute( $par ) {
		global $wgRequest, $wgOut, $wgScriptPath, $wgServer;
 
		$this->setHeaders(); // check if really needed, i.e. for a redirect

		# Get request data: $lang and $label
		// TODO if no lang or label is given, maybe a form should appear to ask for both
		$lang = $wgRequest->getText('uselang');
		if ($lang) {
			if (!SWBCreatePage::validLanguage($lang)) {
				$wgOut->addWikiText("Specified language unknown to the system.");
				// No I18n since we would not know in which language, obviously
				return;
			}
		} else {
			global $wgLang;
			$lang = $wgLang->getCode();
		}
		
		$label = $par;
		if (!$par) {
			$label = $wgRequest->getText('label');
			if (!$label) {
				$wgOut->addWikiText( wfMsg('swb-nolabelgiven') );
				return;
			}
		}
		
		$pages = SWBCreatePage::getPagesByAlias( $label, $lang );
		
		if (count($pages) === 0) {
			// Do nothing
		} elseif (count($pages) === 1) {
			// Go to that page directly
			$wgOut->redirect( "$wgScriptPath/topic/$lang/$pages[0]" );
			return;
		} else {
			global $wgSitename;
			$wgOut->setHTMLTitle( wfMsg('swb-disambiguation') . ':' . $label . ' - ' . $wgSitename );
			$wgOut->setPageTitle( $label );
			$wgOut->addWikiText( wfMsg('swb-disambiguationpage', $label) );
			foreach ($pages as $page) {
				$plabel = SWBCreatePage::getLabel($page, $lang);
				$pdescription = SWBCreatePage::getDescription($page, $lang);
				$wgOut->addWikiText( "* '''[[$page|$plabel]]''': $pdescription" );
			}
			$wgOut->addWikiText( "\n\n" );
		}
		
		list($wphits, $wpsuggest, $wpresults) = SWBSemanticSearchByLabel::getWikipediaSearch( $label, $lang );
		
		$exactmatch = false;
		if (count($wpresults)) {
			$wgOut->addWikiText( wfMsg('swb-wpsearchresults' ) );
			$wgOut->addHTML('<ul>');
			foreach($wpresults as $title => $snippet) {
				if ($title == $label) $exactmatch = true;
				$target = str_replace(' ', '_', $title);
				$wgOut->addHTML("<li><a href=\"$wgServer$wgScriptPath/wikipedia/$lang/$target\">$title</a><br> <em>$snippet</em></li>");
			}
			$wgOut->addHTML('</ul>');
			$wgOut->addWikiText( "\n\n" );
		}
		
		if ($wpsuggest) {
			$wgOut->addWikiText( wfMsg('swb-didyoumean') );
			$target = str_replace(' ', '_', $wpsuggest);
			$wgOut->addHTML("<ul><li><a href=\"$wgServer$wgScriptPath/$lang/$target\">$wpsuggest</a></li></ul>");
			$wgOut->addWikiText( "\n\n" );
		}
		
		
		// If nothing was found
		if ((count($pages)===0) && (!$exactmatch)) {
			$title = Title::newFromText( $label );
			if ($title->exists()) {
				// If the page exists (but not with the title)
				$wgOut->addWikiText( wfMsg('swb-pagenameexists' ));
				$langlabel = SWBCreatePage::getLabel( $label, $lang );
				$displaylabel = $langlabel ? $langlabel : $label; 
				$target = str_replace(' ', '_', $label);
				$wgOut->addHtml("<ul><li><a href=\"$wgServer$wgScriptPath/topic/$lang/$target\">$displaylabel</a></li></ul>");
			} else {
				// If such a page does not exist at all, enable its creation
				$wgOut->addWikiText( wfMsg('swb-createpage' ));
				$target = str_replace(' ', '_', $label);
				$wgOut->addHtml("<ul><li><a href=\"$wgServer$wgScriptPath/topic/$lang/$target\">$label</a></li></ul>");
			}
		}
	}
	
	// TODO See also LODPullerSuggestAPI::getWikipediaSearch
	private static function getWikipediaSearch( $term, $lang ) {
		$term = urlencode($term);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://$lang.wikipedia.org/w/api.php?action=query&list=search&format=json&srsearch=$term");
		curl_setopt($ch, CURLOPT_USERAGENT, "lodpuller");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);

		$answer = json_decode($output);
		$hits = $answer->query->searchinfo->totalhits;
		$results = array();
		$suggestion = '';
		if ($hits === 0) {
			if (property_exists($answer->query->searchinfo, 'suggestion'))
				$suggestion = $answer->query->searchinfo->suggestion;
		} else {
			foreach( $answer->query->search as $hit ) {
				$results[$hit->title] = $hit->snippet;
			}
		}
		return array($hits, $suggestion, $results);
	}
	
}
