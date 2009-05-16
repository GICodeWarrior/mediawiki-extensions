<?php

/**
 * Plotter class. Renders html and javascript for the Plotters extension.
 *
 * @addtogroup Extensions
 * @author Ryan Lane, rlane32+mwext@gmail.com
 * @copyright © 2009 Ryan Lane
 * @license GNU General Public Licence 2.0 or later
 */

class Plotters {

	var $parser;
	var $set;
	var $argumentArray, $dataArray;
	var $errors;

	function Plotters( $pParser, &$parser ) {
		$this->parser = $parser;
		$this->argumentArray = $pParser->getArguments();
		$this->dataArray = $pParser->getData();
	}

	function hasErrors() {
		if ( $this->errors == '' ) {
			return false;
		} else {
			return true;
		}
	}

	function getErrors() {
		return $this->errors;
	}

	function checkForErrors() {
		wfLoadExtensionMessages( 'Plotters' );

		$errors = '';
		$errcnt = 0;

		// Check for a valid renderer
		if ( $this->argumentArray["renderer"] != "generic" && $this->argumentArray["renderer"] != "plotkit" ) {
			$errors .= wfMsg( "plotters-invalid-renderer" ) . "<br />";
			$errcnt++;
		}

		// Check for a script
		if ( $this->argumentArray["script"] == "" ) {
			$errors .= wfMsg( "plotters-missing-script" ) . "<br />";
			$errcnt++;
		} else if ( strlen( $this->argumentArray["script"] ) > 255 ) {
			// Check to ensure scriptname is < 255 characters
			$errors .= wfMsg( "plotters-excessively-long-scriptname" ) . "<br />";
			$errcnt++;
		}

		// Check preprocessors
		foreach ( $this->argumentArray["preprocessors"] as $preprocessor ) {
			if ( strlen( $preprocessor ) > 255 ) {
				$errors .= wfMsg( "plotters-excessively-long-preprocessorname" ) . "<br />";
				$errcnt++;
			}
		}

		if ( strlen( $this->argumentArray["name"] ) > 255 ) {
			$errors .= wfMsg( "plotters-excessively-long-name" ) . "<br />";
			$errcnt++;
		}

		if ( strlen( $this->argumentArray["tableclass"] ) > 255 ) {
			$errors .= wfMsg( "plotters-excessively-long-tableclass" ) . "<br />";
			$errcnt++;
		}

		// Check for data
		if ( count( $this->dataArray ) == 0 ) {
			$errors .= wfMsg( "plotters-no-data" ) . "<br />";
			$errcnt++;
		}

		if ( $errors != '' ) {
			$this->errors = '<b>' . wfMsgExt( 'plotters-errors', array('parse'), $errcnt ) . '</b> ' . $errors;
		}
	}

	function toHTML() {
		// Add html
		$output = $this->renderPlot();

		// Add fallback
		$output .= $this->renderFallback();

		// Add javascript
		$output .= $this->renderJavascript();

		// Add tags to parser
		$this->parser->mOutput->mPlottersTag = true;

		// Add renderer specific tag
		$renderer = "mplotter-" . $this->argumentArray["renderer"];
		$this->parser->mOutput->$renderer = true;

		// Add preprocessor tags
		foreach ( $this->argumentArray["preprocessors"] as $preprocessor ) {
			$preprocessor = "mplotter-" . $preprocessor;
			$this->parser->mOutput->$preprocessor = true;
		}

		$script = "mplotter-" . $this->argumentArray["script"];
		$this->parser->mOutput->$script = true;

		// output
		return $output;
	}

	function renderPlot() {
		return '<div id="' . $this->argumentArray["name"] . '-div" style="display: none;"><canvas id="' . $this->argumentArray["name"] . '" height="' . $this->argumentArray["height"] . '" width="' . $this->argumentArray["width"] . '"></canvas></div>';
	}

	function renderFallback() {
		// Return an html table of the data
		$output = '<table id="' . $this->argumentArray["name"] . '-fallback" class="' . $this->argumentArray["tableclass"] . '">';
		if ( count( $this->argumentArray["labels"] ) > 0 ) {
                        $output .= "<tr>";
			foreach ( $this->argumentArray["labels"] as $label ) {
                                $output .= "<th>" . $label . "</th>";
			}
                        $output .= "</tr>";
		}
                foreach ( $this->dataArray as $dataline ) {
                        $output .= "<tr>";
                        foreach ( $dataline as $data ) {
                                $output .= "<td>" . $data . "</td>";
                        }
                        $output .= "</tr>";
                }
		$output .= "</table>";

		return $output;
	}

	function renderJavascript() {
		$name = $this->argumentArray["name"];

		$output = '<script type="text/javascript">';

                $output .= 'document.getElementById("' . $this->argumentArray["name"] . '-fallback").style.display = "none";'; // hide fallback table
                $output .= 'document.getElementById("' . $this->argumentArray["name"] . '-div").style.display = "block";'; // show canvas

		$output .= 'function draw' . $this->argumentArray["name"] . '() {';
		$output .= 'var data = [];';

		// Prepare data
		for ( $i = 0; $i < count( $this->dataArray ); $i++ ) {
			$output .= "data[$i] = [];";
			$dataline = $this->dataArray[$i];
			for ( $j = 0; $j < count( $dataline ); $j++ ) {
				$output .= "data[$i][$j] = '" . $dataline[$j] . "';";
			}
		}

		// Prepare labels
		$output .= "var labels = [];";
		for ( $i = 0; $i < count( $this->argumentArray["labels"] ); $i++ ) {
			$output .= "labels[$i] = '" . $this->argumentArray["labels"][$i] . "';";
		}
		$output .= "fix_encoding( labels );";

		// Run preprocessors
		foreach ( $this->argumentArray["preprocessors"] as $preprocessor ) {
			$output .= 'plotter_' . $preprocessor . '_process( "' . $name . '", data, labels, ';
			foreach ( $this->argumentArray["preprocessorarguments"] as $argument ) {
				$output .= $argument . ', ';
			}
			// Strip the last ', '
			$output = substr( $output, 0, -2 );
			$output .= " );";
		}

		// Run script
		$output .= 'plotter_' . $this->argumentArray["script"] . '_draw( "' . $name . '", data, labels, ';
		foreach ( $this->argumentArray["scriptarguments"] as $argument ) {
			$output .= "'" . $argument . "'" . ", ";
		}
		$output = substr( $output, 0, -2 );
		$output .= " );";

		$output .= "}";

		// Add hook event
		$output .= 'hookEvent("load", draw' . $this->argumentArray["name"] . ');';
		$output .= "</script>";

		return $output;
	}

	static function setPlottersHeaders( &$outputPage, $renderer ) {
		global $wgPlottersJavascriptPath;
		global $wgPlottersExtensionPath;

		$extensionpath = $wgPlottersJavascriptPath;

		// Add javascript to fix encoding
		$outputPage->addScript( '<script src="' . $wgPlottersExtensionPath . '/libs/fixencoding.js" type="text/javascript"></script>' );

		if ( $renderer == "plotkit" ) {
			// Add mochikit (required by PlotKit)
			$outputPage->addScript( '<script src="' . $extensionpath . '/mochikit/MochiKit.js" type="text/javascript"></script>' );
	
			// Add PlotKit javascript
			$outputPage->addScript( '<script src="' . $extensionpath . '/plotkit/Base.js" type="text/javascript"></script>' );
			$outputPage->addScript( '<script src="' . $extensionpath . '/plotkit/Layout.js" type="text/javascript"></script>' );
			$outputPage->addScript( '<script src="' . $extensionpath . '/plotkit/Canvas.js" type="text/javascript"></script>' );
			$outputPage->addScript( '<script src="' . $extensionpath . '/plotkit/SweetCanvas.js" type="text/javascript"></script>' );
		}

		return true;
	}

	static function debug( $debugText, $debugArr = null ) {
		global $wgPlottersDebug;

		if ( isset( $debugArr ) ) {
			if ( $wgPlottersDebug > 0 ) {
				$text = $debugText . " " . implode( "::", $debugArr );
				wfDebugLog( 'plot', $text, false );
			}
		} else {
			if ( $wgPlottersDebug > 0 ) {
				wfDebugLog( 'plot', $debugText, false );
			}
		}
	}
}
