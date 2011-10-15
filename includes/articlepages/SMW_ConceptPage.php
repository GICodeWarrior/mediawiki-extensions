<?php
/**
 * Special handling for relation/attribute description pages.
 * Some code based on CategoryPage.php
 *
 * @author: Markus Krötzsch
 * @file
 * @ingroup SMW
 */

/**
 * Implementation of MediaWiki's Article that shows additional information on
 * Concept: pages. Very simliar to CategoryPage.
 * @ingroup SMW
 */
class SMWConceptPage extends SMWOrderedListPage {

	/**
	 * Initialiye parameters to use a higher limit. This operation is very
	 * similar to showing members of categories.
	 */
	protected function initParameters() {
		global $smwgConceptPagingLimit;
		$this->limit = $smwgConceptPagingLimit;
		return true;
	}

	/**
	 * Returns the HTML which is added to $wgOut after the article text.
	 * 
	 * @return string
	 */
	protected function getHtml() {
		wfProfileIn( __METHOD__ . ' (SMW)' );

		if ( $this->limit > 0 ) { // limit==0: configuration setting to disable this completely
			$store = smwfGetStore();
			$description = new SMWConceptDescription( $this->getDataItem() );
			$query = SMWPageLister::getQuery( $description, $this->limit, $this->from, $this->until );
			$queryResult = $store->getQueryResult( $query );

			$diWikiPages = $queryResult->getResults();
			if ($this->until != '' ) {
				$diWikiPages = array_reverse( $diWikiPages );
			}

			$errors = $queryResult->getErrors();
		} else {
			$diWikiPages = array();
			$errors = array();
		}

		$pageLister = new SMWPageLister( $diWikiPages, null, $this->limit, $this->from, $this->until );
		$this->mTitle->setFragment( '#SMWResults' ); // Make navigation point to the result list.
		$navigation = $pageLister->getNavigationLinks( $this->mTitle );

		$titleText = htmlspecialchars( $this->mTitle->getText() );
		$resultNumber = min( $this->limit, count( $diWikiPages ) );

		$result = "<a name=\"SMWResults\"></a><div id=\"mw-pages\">\n" .
		          '<h2>' . wfMsg( 'smw_concept_header', $titleText ) . "</h2>\n" .
		          wfMsgExt( 'smw_conceptarticlecount', array( 'parsemag' ), $resultNumber ) .
		          smwfEncodeMessages( $errors ) . "\n" .
		          $navigation . $pageLister->formatList() . $navigation . "</div>\n";

		wfProfileOut( __METHOD__ . ' (SMW)' );
		return $result;
	}

	/**
	 * Format a list of wiki pages chunked by letter, either as a bullet
	 * list or a columnar format, depending on the length.
	 *
	 * @param int $cutoff
	 * @return string
	 */
// 	private function formatList( $cutoff = 6 ) {
// 		$end = count( $this->diWikiPages );
// 		
// 		if ( $end > $this->limit ) {
// 			if ( $this->until != '' ) {
// 				$start = 1;
// 			} else {
// 				$start = 0;
// 				$end --;
// 			}
// 		} else {
// 			$start = 0;
// 		}
// 
// 		if ( count ( $this->diWikiPages ) > $cutoff ) {
// 			return $this->columnList( $start, $end, $this->diWikiPages );
// 		} elseif ( count( $this->diWikiPages ) > 0 ) {
// 			return $this->shortList( $start, $end, $this->diWikiPages );
// 		} else {
// 			return '';
// 		}
// 	}

}

