<?php
/**
 * A query printer for pie charts using the Google Chart API
 *
 * @note AUTOLOADED
 */

class SRFGooglePie extends SMWResultPrinter {
	protected $m_width = 250;
	protected $m_heighth = 250;

	protected function readParameters( $params, $outputmode ) {
		parent::readParameters( $params, $outputmode );
		if ( array_key_exists( 'width', $this->m_params ) ) {
			$this->m_width = $this->m_params['width'];
		}
		if ( array_key_exists( 'height', $this->m_params ) ) {
			$this->m_height = $this->m_params['height'];
		} else {
			$this->m_height = $this->m_width * 0.4;
		}
	}

	public function getName() {
		return wfMsg( 'srf_printername_googlepie' );
	}

	protected function getResultText( SMWQueryResult $res, $outputmode ) {
		$this->isHTML = true;

		$t = "";
		$n = "";
		
		// if there is only one column in the results then stop right away
		if ($res->getColumnCount() == 1) return "";
		                
		// print all result rows
		$first = true;
		$max = 0; // the biggest value. needed for scaling
		
		while ( $row = $res->getNext() ) {
			$name = efSRFGetNextDV( $row[0] )->getShortWikiText();
			
			foreach ( $row as $field ) {
				while ( ( $object = efSRFGetNextDV( $field ) ) !== false ) {
					// use numeric sortkey
					if ( $object->isNumeric() ) {
						// getDataItem was introduced in SMW 1.6, getValueKey was deprecated in the same version.
						if ( method_exists( $object, 'getDataItem' ) ) {
							$nr = $object->getDataItem()->getSortKey();
						} else {
							$nr = $object->getValueKey();
						}
						
						$max = max( $max, $nr );
						
						if ( $first ) {
							$first = false;
							$t .= $nr;
							$n = $name;
						} else {
							$t = $nr . ',' . $t;
							$n = $name . '|' . $n;
						}
					}
				}
			}
		}
		return 	'<img src="http://chart.apis.google.com/chart?cht=p3&chs=' . $this->m_width . 'x' . $this->m_height . '&chds=0,' . $max . '&chd=t:' . $t . '&chl=' . $n . '" width="' . $this->m_width . '" height="' . $this->m_height . '"  />';
	}

	public function getParameters() {
		return array(
			array( 'name' => 'limit', 'type' => 'int', 'description' => wfMsg( 'smw_paramdesc_limit' ) ),
			array( 'name' => 'height', 'type' => 'int', 'description' => wfMsg( 'srf_paramdesc_chartheight' ) ),
			array( 'name' => 'width', 'type' => 'int', 'description' => wfMsg( 'srf_paramdesc_chartwidth' ) ),
		);
	}

}
