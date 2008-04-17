<?php
/**
 * Print query results by embeddings them into pages.
 * @author Markus Krötzsch
 */

/**
 * Printer for embedded data.
 * Embeds in the page output the contents of the pages in the query result set.
 * Only the first column of the query is considered. If it is a page reference then that page's contents is embedded.
 * The optional "titlestyle" formatting parameter can be used to apply a format to the headings for the page titles.
 * If "titlestyle" is not specified, a <h1> tag is used.
 * @author Fernando Correia
 * @author Markus Krötzsch
 * @note AUTOLOADED
 */
class SMWEmbeddedResultPrinter extends SMWResultPrinter {

	protected $m_showhead;
	protected $m_embedformat;

	protected function readParameters($params,$outputmode) {
		SMWResultPrinter::readParameters($params,$outputmode);

		if (array_key_exists('embedonly', $params)) {
			$this->m_showhead = false;
		} else {
			$this->m_showhead = true;
		}
		if (array_key_exists('embedformat', $params)) {
			$this->m_embedformat = trim($params['embedformat']);
		} else {
			$this->m_embedformat = 'h1';
		}
	}

	protected function getResultText($res,$outputmode) {
		// handle factbox
		global $smwgStoreActive, $wgTitle, $smwgEmbeddingList, $wgParser;
		$old_smwgStoreActive = $smwgStoreActive;
		$smwgStoreActive = false; // no annotations stored, no factbox printed
		if (!isset($smwgEmbeddingList)) { // used to catch recursions, sometimes more restrictive than needed, but no major use cases should be affected by that!
			$smwgEmbeddingList = array($wgTitle);
			$oldEmbeddingList = array($wgTitle);
		} else {
			$oldEmbeddingList = array_values($smwgEmbeddingList);
		}

		// print header
		$result = $this->mIntro;

		switch ($this->m_embedformat) {
			case 'h1': case 'h2': case 'h3': case 'h4': case 'h5': case 'h6':
				$footer = '';
				$embstart = '';
				$headstart = '<' . $this->m_embedformat . '>';
				$headend = '</' . $this->m_embedformat . ">\n";
				$embend = '';
			break;
			case 'ul': case 'ol':
				$result .= '<' . $this->m_embedformat . '>';
				$footer = '</' . $this->m_embedformat . '>';
				$embstart = '<li>';
				$headstart = '';
				$headend = "<br />\n";
				$embend = "</li>\n";
			break;
		}

		// print all result rows
		$parser_options = new ParserOptions();
		$parser_options->setEditSection(false);  // embedded sections should not have edit links
		$parser = clone $wgParser;

		while (  $row = $res->getNext() ) {
			$first_col = true;
			foreach ($row as $field) {
				if ( $field->getPrintRequest()->getTypeID() == '_wpg' ) { // ensure that we deal with title-likes
					while ( ($object = $field->getNextObject()) !== false ) {
						$result .= $embstart;
						$text= $object->getLongText($outputmode,$this->getLinker(true));
						if ($this->m_showhead) {
							$result .= $headstart . $text . $headend;
						}
						if (!in_array($object->getLongWikiText(), $smwgEmbeddingList)) { // prevent recursion!
							$smwgEmbeddingList[] = $object->getLongWikiText();
							if ($object->getNamespace() == NS_MAIN) {
								$articlename = ':' . $object->getDBkey();
							} else {
								$articlename = $object->getLongWikiText();
							}
							if ($outputmode == SMW_OUTPUT_HTML) {
								$parserOutput = $parser->parse('[[SMW::off]]{{' . $articlename . '}}[[SMW::on]]', $wgTitle, $parser_options);
								$result .= $parserOutput->getText();
							} else {
// 								$result .= '{{' . $articlename . '}}'; // fails in MW1.12 and later
								$result .= '[[SMW::off]]' . $parser->preprocess('{{' . $articlename . '}}', $wgTitle, $parser_options) . '[[SMW::on]]';
							}
						} else {
							$result .= '<b>' . $object->getLongWikiText() . '</b>';
						}
						$result .= $embend;
					}
				}
				break;  // only use first column for now
			}
		}

		// show link to more results
		if ( $this->mInline && $res->hasFurtherResults() ) {
			$link = $res->getQueryLink();
			if ($this->mSearchlabel) {
				$link->setCaption($this->mSearchlabel);
			}
			$link->setParameter('embedded','format');
			$format = $this->m_embedformat;
			if ($format='ol') $format = 'ul'; // ordered lists confusing in paged output
			$link->setParameter($format,'embedformat');
			if (!$this->m_showhead) {
				$link->setParameter('1','embedonly');
			}
			$result .= $embstart . $link->getText($outputmode,$this->getLinker()) . $embend;
		}
		$result .= $footer;

		$smwgStoreActive = $old_smwgStoreActive;
		$smwgEmbeddingList = array_values($oldEmbeddingList);
		return $result;
	}
}
