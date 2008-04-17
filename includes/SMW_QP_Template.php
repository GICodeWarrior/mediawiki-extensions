<?php
/**
 * Print query results using templates.
 * @author Markus Krötzsch
 */

/**
 * Printer for template data. Passes a result row as anonymous parameters to
 * a given template (which might ignore them or not) and prints the result.
 *
 * @note AUTOLOADED
 */
class SMWTemplateResultPrinter extends SMWResultPrinter {

	protected $m_template;

	protected function readParameters($params,$outputmode) {
		SMWResultPrinter::readParameters($params,$outputmode);

		if (array_key_exists('template', $params)) {
			$this->m_template = trim($params['template']);
		} else {
			$this->m_template = false;
		}
	}

	protected function getResultText($res, $outputmode) {
		// handle factbox
		global $smwgStoreActive, $wgTitle, $wgParser;

		// print all result rows
		if ($this->m_template == false) {
			return 'Please provide parameter "template" for query to work.'; // TODO: internationalise, beautify
		}

		$parserinput = $this->mIntro;
		while ( $row = $res->getNext() ) {
			$i = 1; // explicitly number parameters for more robust parsing (values may contain "=")
			$wikitext = '';
			$firstcol = true;
			foreach ($row as $field) {
				$wikitext .= '|' . $i++ . '=';
				$first = true;
				while ( ($text = $field->getNextText(SMW_OUTPUT_WIKI, $this->getLinker($firstcol))) !== false ) {
					if ($first) {
						$first = false; 
					} else {
						$wikitext .= ', ';
					}
					$wikitext .= $text; //str_replace('|', '&#x007C;',$text); // encode '|' for use in templates (templates fail otherwise) -- this is not the place for doing this, since even DV-Wikitexts contain proper "|"!
				}
				$firstcol = false;
			}
			$parserinput .= '[[SMW::off]]{{' . $this->m_template .  $wikitext . '}}[[SMW::on]]';
		}

		$old_smwgStoreActive = $smwgStoreActive;
		$smwgStoreActive = false; // no annotations stored, no factbox printed
		$parser_options = new ParserOptions();
		$parser_options->setEditSection(false);  // embedded sections should not have edit links
		$parser = clone $wgParser;
		if ($outputmode == SMW_OUTPUT_HTML) {
			$parserOutput = $parser->parse($parserinput, $wgTitle, $parser_options);
			$result = $parserOutput->getText();
		} else {
			if ( method_exists($parser, 'getPreprocessor') ) {
				$frame = $parser->getPreprocessor()->newFrame();
				$dom = $parser->preprocessToDom( $parserinput );
				$result = $frame->expand( $dom );
			} else {
				$result = $parser->preprocess($parserinput, $wgTitle, $parser_options);
			}
		}
		$smwgStoreActive = $old_smwgStoreActive;
		// show link to more results
		if ( $this->mInline && $res->hasFurtherResults() ) {
			$link = $res->getQueryLink();
			if ($this->mSearchlabel) {
				$link->setCaption($this->mSearchlabel);
			}
			$link->setParameter('template','format');
			$link->setParameter($this->m_template,'template');
			$result .= $link->getText($outputmode,$this->getLinker());
		}
		return $result;
	}
}
