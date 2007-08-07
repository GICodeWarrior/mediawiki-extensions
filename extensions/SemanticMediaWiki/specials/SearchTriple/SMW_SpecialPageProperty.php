<?php
/**
 * @author Denny Vrandecic
 *
 * This special page for Semantic MediaWiki implements a
 * view on a object-relation pair, i.e. a page that shows
 * all the fillers of a property for a certain page.
 * This will be assumedly seldomly used.
 */

if (!defined('MEDIAWIKI')) die();

global $IP, $smwgIP;
require_once( "$IP/includes/SpecialPage.php" );
require_once( "$smwgIP/includes/storage/SMW_Store.php" );

class SMW_PageProperty {

	static function execute($query = '') {
		global $wgRequest, $wgOut, $wgUser;
		$skin = $wgUser->getSkin();

		// get the GET parameters
		$from = $wgRequest->getVal( 'from' );
		$type = $wgRequest->getVal( 'type' );
		// no GET parameters? Then try the URL
		if (('' == $type) && ('' == $from)) {
			$queryparts = explode('::', $query);
			$type = $query;
			if (count($queryparts) > 1) {
				$from = $queryparts[0];
				$type = implode('::', array_slice($queryparts, 1));
			}
		}
		$subject = Title::newFromText( $from );
		if (NULL != $subject) { $from = $subject->getText(); } else { $from = ''; }
		$relation = Title::newFromText( $type, SMW_NS_PROPERTY );
		if (NULL != $relation) {
			$type = $relation->getText();
		} else {
			$type = '';
		}

		$limit = $wgRequest->getVal( 'limit' );
		if ('' == $limit) $limit =  20;
		$offset = $wgRequest->getVal( 'offset' );
		if ('' == $offset) $offset = 0;
		$html = '';
		$spectitle = Title::makeTitle( NS_SPECIAL, 'PageProperty' );

		if (('' == $type) || ('' == $from)) { // No relation or subject given.
			$html .= wfMsg('smw_pp_docu') . "\n";
		} else { // everything is given
			$wgOut->setPagetitle($subject->getFullText() . ' ' . $relation->getText());
			$options = new SMWRequestOptions();
			$options->limit = $limit+1;
			$options->offset = $offset;
			// get results (get one more, to see if we have to add a link to more)
			$results = &smwfGetStore()->getPropertyValues($subject, $relation, $options);

			// prepare navigation bar
			if ($offset > 0)
				$navigation = '<a href="' . htmlspecialchars($skin->makeSpecialUrl('PageProperty','offset=' . max(0,$offset-$limit) . '&limit=' . $limit . '&type=' . urlencode($type) .'&from=' . urlencode($from))) . '">' . wfMsg('smw_result_prev') . '</a>';
			else
				$navigation = wfMsg('smw_result_prev');

			$navigation .= '&nbsp;&nbsp;&nbsp;&nbsp; <b>' . wfMsg('smw_result_results') . ' ' . ($offset+1) . '&ndash; ' . ($offset + min(count($results), $limit)) . '</b>&nbsp;&nbsp;&nbsp;&nbsp;';

			if (count($results)==($limit+1))
				$navigation .= ' <a href="' . htmlspecialchars($skin->makeSpecialUrl('PageProperty', 'offset=' . ($offset+$limit) . '&limit=' . $limit . '&type=' . urlencode($type) . '&from=' . urlencode($from)))  . '">' . wfMsg('smw_result_next') . '</a>';
			else
				$navigation .= wfMsg('smw_result_next');

			// no need to show the navigation bars when there is not enough to navigate
			if (($offset>0) || (count($results)>$limit)) $html .= '<br />' . $navigation;
			if (count($results) == 0) {
				$html .= wfMsg( 'smw_result_noresults' );
			} else {
				$html .= "<ul>\n";
				foreach ($results as $result) {
					$html .= '<li>' . $result->getShortHTMLText($skin);
					if ($result->getTypeID() == '_wpg') {
						$browselink = SMWInfolink::newBrowsingLink('+',$result->getPrefixedText());
						$html .= $browselink->getHTML($skin);
					}
					$html .=  "</li> \n";
				}
				$html .= "</ul>\n";
			}
			if (($offset>0) || (count($results)>$limit)) $html .= $navigation;
		}

		// display query form
		$html .= '<p>&nbsp;</p>';
		$html .= '<form name="pageproperty" action="' . $spectitle->escapeLocalURL() . '" method="get">' . "\n" .
		         '<input type="hidden" name="title" value="' . $spectitle->getPrefixedText() . '"/>' ;
		$html .= wfMsg('smw_pp_from') . ' <input type="text" name="from" value="' . htmlspecialchars($from) . '" />' . "&nbsp;&nbsp;&nbsp;\n";
		$html .= wfMsg('smw_pp_type') . ' <input type="text" name="type" value="' . htmlspecialchars($type) . '" />' . "\n";
		$html .= '<input type="submit" value="' . wfMsg('smw_pp_submit') . "\"/>\n</form>\n";

		$wgOut->addHTML($html);
	}

}

