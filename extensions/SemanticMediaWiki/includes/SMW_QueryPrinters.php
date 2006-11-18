<?php
/**
 * This file provides various classes that print query results. 
 */

/**
 * Interface (abstract class) that must be implemented by all printers for inline
 * query results.
 */
interface SMWQueryPrinter {
	/**
	 * Print all results and return an output string. This method needs to call back to
	 * the query object for fetching data.
	 */
	public function printResult();
}

/**
 * Printer for tabular data.
 */
class SMWTablePrinter implements SMWQueryPrinter {
	private $mIQ; // the querying object that called the printer
	private $mQuery; // the query that was executed and whose results are to be printed

	public function SMWTablePrinter($iq, $query) {
		$this->mIQ = $iq;
		$this->mQuery = $query;
	}
	
	public function printResult() {
		global $smwgIQRunningNumber;

		// print header
		if ('broadtable' == $this->mIQ->getFormat())
			$widthpara = ' width="100%"';
		else $widthpara = '';
		$result = $this->mIQ->getIntro() . "<table class=\"smwtable\"$widthpara id=\"querytable" . $smwgIQRunningNumber . "\">\n";
		if ($this->mIQ->showHeaders()) {
			$result .= "\n\t\t<tr>";
			foreach ($this->mQuery->mPrint as $print_data) {
				$result .= "\t\t\t<th>" . $print_data[0] . "</th>\n";
			}
			$result .= "\n\t\t</tr>";
		}

		// print all result rows
		while ( $row = $this->mIQ->getNextRow() ) {
			$result .= "\t\t<tr>\n";
			$firstcol = true;
			foreach ($this->mQuery->mPrint as $print_data) {
				$iterator = $this->mIQ->getIterator($print_data,$row,$firstcol);
				$result .= "<td>";
				$first = true;
				while ($cur = $iterator->getNext()) {
					if ($first) $first = false; else $result .= '<br />';
					$result .= $cur[0];
				}
				$result .= "</td>";
				$firstcol = false;
			}
			$result .= "\n\t\t</tr>\n";
		}

		if ($this->mIQ->isInline() && $this->mIQ->hasFurtherResults()) {
			$label = $this->mIQ->getSearchLabel();
			if ($label === NULL) { //apply default
				$label = wfMsgForContent('smw_iq_moreresults');
			}
			if ($label != '') {
				$result .= "\n\t\t<tr class=\"smwfooter\"><td class=\"sortbottom\" colspan=\"" . count($this->mQuery->mPrint) . '\"> <a href="' . $this->mIQ->getQueryURL() . '">' . $label . '</a></td></tr>';
			}
		}

		// print footer
		$result .= "\t</table>";

		return $result;
	}
}

/**
 * Printer for list data. Somewhat confusing code, since one has to iterate through lists,
 * inserting texts in between their elements depending on whether the element is the first
 * that is printed, the first that is printed in parentheses, or the last that will be printed.
 * Maybe one could further simplify this.
 */
class SMWListPrinter implements SMWQueryPrinter {
	private $mIQ; // the querying object that called the printer
	private $mQuery; // the query that was executed and whose results are to be printed

	public function SMWListPrinter($iq, $query) {
		$this->mIQ = $iq;
		$this->mQuery = $query;
	}
	
	public function printResult() {
		// print header
		$result = $this->mIQ->getIntro();
		if ( ('ul' == $this->mIQ->getFormat()) || ('ol' == $this->mIQ->getFormat()) ) {
			$result .= '<' . $this->mIQ->getFormat() . '>';
			$footer = '</' . $this->mIQ->getFormat() . '>';
			$rowstart = "\n\t<li>";
			$rowend = '</li>';
			$plainlist = false;
		} else {
			$params = $this->mIQ->getParameters();
			if (array_key_exists('sep', $params)) {
				$listsep = htmlspecialchars(str_replace('_', ' ', $params['sep']));
				$finallistsep = $listsep;
			} else {  // default list ", , , and, "
				$listsep = ', ';
				$finallistsep = wfMsgForContent('smw_finallistconjunct') . ' ';
			}
			$footer = '';
			$rowstart = '';
			$rowend = '';
			$plainlist = true;
		}

		// print all result rows
		$first_row = true;
		$row = $this->mIQ->getNextRow();
		while ( $row ) {
			$nextrow = $this->mIQ->getNextRow(); // look ahead
			if ( !$first_row && $plainlist )  {
				if ($nextrow) $result .= $listsep; // the comma between "rows" other than the last one
				else $result .= $finallistsep;
			} else $result .= $rowstart;

			$first_col = true;
			$found_values = false; // has anything but the first coolumn been printed?
			foreach ($this->mQuery->mPrint as $print_data) {
				$iterator = $this->mIQ->getIterator($print_data,$row,$first_col);
				$first_value = true;
				while ($cur = $iterator->getNext()) {
					if (!$first_col && !$found_values) { // first values after first column
						$result .= ' (';
						$found_values = true;
					} elseif ($found_values || !$first_value) { 
					  // any value after '(' or non-first values on first column
						$result .= ', ';
					}
					if ($first_value) { // first value in any column, print header
						$first_value = false;
						if ( $this->mIQ->showHeaders() && ('' != $print_data[0]) ) {
							$result .= $print_data[0] . ' ';
						}
					}
					$result .= $cur[0]; // actual output value
				}
				$first_col = false;
			}
			if ($found_values) $result .= ')';
			$result .= $rowend;
			$first_row = false;
			$row = $nextrow;
		}
		
		if ($this->mIQ->isInline() && $this->mIQ->hasFurtherResults()) {
			$label = $this->mIQ->getSearchLabel();
			if ($label === NULL) { //apply defaults
				if ('ol' == $this->mIQ->getFormat()) $label = '';
				else $label = wfMsgForContent('smw_iq_moreresults');
			}
			if (!$first_row) $result .= ' '; // relevant for list, unproblematic for ul/ol
			if ($label != '') {
				$result .= $rowstart . '<a href="' . $this->mIQ->getQueryURL() . '">' . $label . '</a>' . $rowend;
			}
		}

		// print footer
		$result .= $footer;

		return $result;
	}
}

/**
 * Printer for timeline data.
 */
class SMWTimelinePrinter implements SMWQueryPrinter {
	private $mIQ; // the querying object that called the printer
	private $mQuery; // the query that was executed and whose results are to be printed

	public function SMWTimelinePrinter($iq, $query) {
		$this->mIQ = $iq;
		$this->mQuery = $query;
	}
	
	public function printResult() {
		global $smwgIQRunningNumber;
		
		$params = $this->mIQ->getParameters();
		if (array_key_exists('timelinestart', $params)) {
			$startdate = smwfNormalTitleDBKey($params['timelinestart']);
		} else $startdate = '';
		if (array_key_exists('timelineend', $params)) {
			$enddate = smwfNormalTitleDBKey($params['timelineend']);
		} else $enddate = '';

		if ( ($startdate == '') ) { // seek defaults
			foreach ($this->mQuery->mPrint as $print_data) {
				if ( ($print_data[1] == SMW_IQ_PRINT_ATTS) && ($print_data[3]->getTypeID() == 'datetime' ) ) {
					if ( ($enddate == '') && ($startdate != '') && ($startdate != $print_data[2]) )
						$enddate = $print_data[2];
					if ( ($startdate == '') && ($enddate != $print_data[2]) )
						$startdate = $print_data[2];
				}
			}
		}

		if (array_key_exists('timelinesize', $params)) {
			$size = htmlspecialchars(str_replace(';', ' ', $params['timelinesize'])); // str_replace makes sure this is only one value, not mutliple CSS fields (prevent CSS attacks)
		} else $size = "300px";

		// print header
		$result = "<div class=\"smwtimeline\" id=\"smwtimeline$smwgIQRunningNumber\" style=\"height: $size\">";
		$result .= '<span class="smwtlcomment">' . wfMsgForContent('smw_iq_nojs',$this->mIQ->getQueryURL()) . '</span>'; // note for people without JavaScript

		if (array_key_exists('timelinebands', $params)) { //check for band parameter, should look like "DAY,MONTH,YEAR"
			$bands = preg_split('/[,][\s]?/',$params['timelinebands']);
			foreach ($bands as $band) {
				$result .= '<span class="smwtlband">' . htmlspecialchars($band) . '</span>'; 
				 //just print any "band" given, the JavaScript will figure out what to make of it
			}
		}

		// print all result rows
		$positions = array(); // possible positions, collected to select one for centering
		if ($startdate != '') {
			$output = false; // true if output was given on current line
			while ( $row = $this->mIQ->getNextRow() ) {
				$hastime = false; // true as soon as some startdate value was found
				$curdata = '<span class="smwtlevent">';
				$first_col = true;
				foreach ($this->mQuery->mPrint as $print_data) {
					$iterator = $this->mIQ->getIterator($print_data,$row,$first_col);
					$first_value = true;
					while ($cur = $iterator->getNext()) {
						if ($first_value) {
							$first_value = false;
							if ( ($print_data[1] == SMW_IQ_PRINT_ATTS) && ($print_data[2] == $startdate) ) {
								//FIXME: Timeline scripts should support XSD format explicitly. They
								//currently seem to implement iso8601 which deviates from XSD in cases.
								$curdata .= '<span class="smwtlstart">' . $cur[1]->getXSDValue() . '</span>';
								$positions[$cur[1]->getNumericValue()] = $cur[1]->getXSDValue();
								$hastime = true;
							}
							if ( ($print_data[1] == SMW_IQ_PRINT_ATTS) && ($print_data[2] == $enddate) ) {
								//FIXME: Timeline scripts should support XSD format explicitly. They
								//currently seem to implement iso8601 which deviates from XSD in cases.
								$curdata .= '<span class="smwtlend">' . $cur[1]->getXSDValue() . '</span>';
							}
							if ( $this->mIQ->showHeaders() && ('' != $print_data[0]) ) {
								$curdata .= $print_data[0] . ' ';
							}
							if ( $first_col ) {
								$curdata .= '<span class="smwtlurl">' . $cur[0] . '</span>';
							}
						} else $curdata .= ', ';
						if (!$first_col) {
							$curdata .= $cur[0];
							$output = true;
						}
					}
					if ($output) $curdata .= "<br />";
					$output = false;
					$first_col = false;
				}
				if ( $hastime )
					$result .= $curdata . "</span>";
			}
			// find display position:
			if (array_key_exists('timelineposition', $params)) {
				$pos = $params['timelineposition'];
			} else $pos = 'middle';
			ksort($positions);
			$positions = array_values($positions);
			switch ($pos) {
				case 'start':
					$result .= '<span class="smwtlposition">' . $positions[0] . '</span>';
					break;
				case 'end':
					$result .= '<span class="smwtlposition">' . $positions[count($positions)-1] . '</span>';
					break;
				case 'today': break; // default
				case 'middle': default:
					$result .= '<span class="smwtlposition">' . $positions[ceil(count($positions)/2)-1] . '</span>';
					break;
			}
		}

// 		if ($this->mIQ->isInline() && $this->mIQ->hasFurtherResults()) {
// 			$label = $this->mIQ->getSearchLabel();
// 			if ($label === NULL) { //apply default
// 				$label = wfMsgForContent('smw_iq_moreresults');
// 			}
// 			if ($label != '') {
// 				$result .= "\n\t\t<tr class=\"smwfooter\"><td class=\"sortbottom\" colspan=\"" . count($this->mQuery->mPrint) . '\"> <a href="' . $this->mIQ->getQueryURL() . '">' . $label . '</a></td></tr>';
// 			}
// 		}

		// print footer
		$result .= "</div>";

		return $result;
	}
}

?>