<?php

class qp_XlsTextQuestion extends qp_XlsTabularQuestion {

	function __construct( $xls_fname = null ) {
		parent::__construct( $xls_fname );
		$this->addFormats( array(
			'cat_part' => array( 'fgcolor' => 36, 'border' => 1 ),
			'prop_part' => array( 'fgcolor' => 34, 'border' => 1 ),
		) );
	}

	function writeQuestionVoice( $pvoices ) {
		$qdata = $this->qdata;
		foreach ( $qdata->ProposalText as $propkey => &$serialized_tokens ) {
			# Create 2D-table of proposal / category answers for each uid in uvoices array
			# please note that for text question array may be sparce (not rectangular)
			$voicesTable = array();
			# voicesTable row number
			$rowNum = 0;
			if ( !is_array( $dbtokens = unserialize( $serialized_tokens ) ) ) {
				throw new MWException( 'dbtokens is not an array in ' . __METHOD__ );
			}
			$catId = 0;
			if ( ( $hasVoices = isset( $pvoices[$propkey] ) ) ) {
				$pv = &$pvoices[$propkey];
			}
			$voicesTable[$rowNum] = array();
			# voicesTable column number
			$rowCol = 0;
			# height of current proposal row (may be greater than 1 when more than one text option was selected by user)
			$rowHeight = 1;
			foreach ( $dbtokens as &$token ) {
				if ( is_string( $token ) ) {
					# add a proposal part
					$voicesTable[$rowNum][$rowCol++] = array( $token, 'format' => 'prop_part' );
				} elseif ( is_array( $token ) ) {
					# add a category definition with selected text answer (if any)
					if ( $hasVoices && isset( $pv[$catId] ) ) {
						if ( $pv[$catId] !== '' ) {
							# text answer
							$selected_options = explode( qp_Setup::SELECT_MULTIPLE_VALUES_SEPARATOR, $pv[$catId] );
							if ( count( $selected_options ) > 1 ) {
								$saveRowNum = $rowNum;
								foreach ( $selected_options as $option ) {
									if ( !array_key_exists( $rowNum, $voicesTable ) ) {
										$voicesTable[$rowNum] = array();
									}
									$voicesTable[$rowNum++][$rowCol] = array( $option, 'format' => 'cat_part' );
								}
								$rowCol++;
								if ( ( $rowNum - $saveRowNum ) > $rowHeight ) {
									$rowHeight = $rowNum - $saveRowNum;
								}
								$rowNum = $saveRowNum;
							} else {
								$voicesTable[$rowNum][$rowCol++] = array( array_pop( $selected_options ), 'format' => 'cat_part' );
							}
						} else {
							# checkbox or radiobutton
							$voicesTable[$rowNum][$rowCol++] = array( qp_Setup::RESULTS_CHECK_SIGN, 'format' => 'cat_part' );
						}
					} else {
						# non-selected category (it has no selected option)
						$voicesTable[$rowNum][$rowCol++] = array( '', 'format' => 'cat_part' );
					}
					$catId++;
				} else {
					throw new MWException( 'DB token has invalid type (' . gettype( $token ) . ') in ' . __METHOD__ );
				}
			}
			$this->writeFormattedTable( 0, $voicesTable );
			$this->relRow( $rowHeight );
		}
		$this->nextRow();
	}

} /* end of qp_XlsTextQuestion class */
