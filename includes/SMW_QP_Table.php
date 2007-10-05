<?php
/**
 * Print query results in tables.
 * @author Markus Krötzsch
 */

/**
 * New implementation of SMW's printer for result tables.
 *
 * @note AUTOLOADED
 */
class SMWTableResultPrinter extends SMWResultPrinter {

	protected function getHTML($res) {
		global $smwgIQRunningNumber;
		smwfRequireHeadItem(SMW_HEADER_SORTTABLE);

		// print header
		if ('broadtable' == $this->mFormat)
			$widthpara = ' width="100%"';
		else $widthpara = '';
		$result = $this->mIntro .
		          "<table class=\"smwtable\"$widthpara id=\"querytable" . $smwgIQRunningNumber . "\">\n";
		if ($this->mShowHeaders) { // building headers
			$result .= "\n\t\t<tr>";
			foreach ($res->getPrintRequests() as $pr) {
				$result .= "\t\t\t<th>" . $pr->getHTMLText($this->mLinker) . "</th>\n";
			}
			$result .= "\n\t\t</tr>";
		}

		// print all result rows
		while ( $row = $res->getNext() ) {
			$result .= "\t\t<tr>\n";
			$firstcol = true;
			foreach ($row as $field) {
				$result .= "<td>";
				$first = true;
				while ( ($text = $field->getNextHTMLText($this->getLinker($firstcol))) !== false ) {
					if ($first) $first = false; else $result .= '<br />';
					$result .= $text;
				}
				$result .= "</td>";
				$firstcol = false;
			}
			$result .= "\n\t\t</tr>\n";
		}

		// print further results footer
		if ($this->mInline && $res->hasFurtherResults()) {
			$label = $this->mSearchlabel;
			if ($label === NULL) { //apply default
				$label = wfMsgForContent('smw_iq_moreresults');
			}
			if ($label != '') {
				$result .= "\n\t\t<tr class=\"smwfooter\"><td class=\"sortbottom\" colspan=\"" . $res->getColumnCount() . '"> <a href="' . $res->getQueryURL() . '">' . $label . '</a></td></tr>';
			}
		}
		$result .= "\t</table>"; // print footer
		$result .= $this->getErrorString($res); // just append error messages
		return $result;
	}
}
