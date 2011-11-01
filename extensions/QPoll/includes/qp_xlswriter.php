<?php
/**
 * ***** BEGIN LICENSE BLOCK *****
 * This file is part of QPoll.
 * Uses parts of code from Quiz extension (c) 2007 Louis-Rémi BABE. All rights reserved.
 *
 * QPoll is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * QPoll is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with QPoll; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * ***** END LICENSE BLOCK *****
 *
 * QPoll is a poll tool for MediaWiki.
 *
 * To activate this extension :
 * * Create a new directory named QPoll into the directory "extensions" of MediaWiki.
 * * Place the files from the extension archive there.
 * * Add this line at the end of your LocalSettings.php file :
 * require_once "$IP/extensions/QPoll/qp_user.php";
 *
 * @version 0.8.0a
 * @link http://www.mediawiki.org/wiki/Extension:QPoll
 * @author QuestPC <questpc@rambler.ru>
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * PEAR Excel helper / wrapper
 *
 */
class qp_Excel {

	# an instance of XLS worksheet
	var $ws;
	# list of formats added to workbook
	var $format;
	# current row number in a worksheet
	var $rownum = 0;

	static function newFromWorksheet( Spreadsheet_Excel_Writer_Worksheet $worksheet ) {
		$self = new self();
		$self->ws = $worksheet;
		$self->ws->setInputEncoding( "utf-8" );
		$self->ws->setPaper( 9 );
		return $self;
	}

	static function prepareExcelString( $s ) {
		if ( preg_match( '`^=.?`', $s ) ) {
			return "'" . $s;
		}
		return $s;
	}

	function writeFormattedTable( $colnum, &$table, $format = null ) {
		$ws = $this->ws;
		foreach ( $table as $rnum => &$row ) {
			foreach ( $row as $cnum => &$cell ) {
				if ( is_array( $cell ) ) {
					if ( array_key_exists( "format", $cell ) ) {
						$ws->write( $this->rownum + $rnum, $colnum + $cnum, $cell[ 0 ], $cell[ "format" ] );
					} else {
						$ws->write( $this->rownum + $rnum, $colnum + $cnum, $cell[ 0 ], $format );
					}
				} else {
					$ws->write( $this->rownum + $rnum, $colnum + $cnum, $cell, $format );
				}
			}
		}
	}

	function writeHeader( $totalUsersAnsweredQuestion ) {
		$this->ws->write( $this->rownum, 0, $totalUsersAnsweredQuestion, $this->format['heading'] );
		$this->ws->write( $this->rownum++, 1, wfMsgExt( 'qp_users_answered_questions', array( 'parsemag' ), $totalUsersAnsweredQuestion ), $this->format['heading'] );
		$this->rownum++;
	}

	function voicesToXls( $format, qp_PollStore $pollStore ) {
		$this->format = &$format;
		$pollStore->loadQuestions();
		$ws = $this->ws;
		$first_question = true;
		foreach ( $pollStore->Questions as $qkey => &$qdata ) {
			if ( $first_question ) {
				$this->writeHeader( $pollStore->totalUsersAnsweredQuestion( $qdata ) );
			} else {
				# get maximum count of voters of the first question
				$total_voters = $first_question_voters;
			}
			$ws->write( $this->rownum, 0, $qdata->question_id, $format['heading'] );
			$ws->write( $this->rownum++, 1, self::prepareExcelString( $qdata->CommonQuestion ), $format['heading'] );
			if ( count( $qdata->CategorySpans ) > 0 ) {
				$row = array();
				foreach ( $qdata->CategorySpans as &$span ) {
					$row[] = self::prepareExcelString( $span[ "name" ] );
					for ( $i = 1; $i < $span[ "count" ]; $i++ ) {
						$row[] = "";
					}
				}
				$ws->writerow( $this->rownum++, 0, $row );
			}
			$row = array();
			foreach ( $qdata->Categories as &$categ ) {
				$row[] = self::prepareExcelString( $categ[ "name" ] );
			}
			$ws->writerow( $this->rownum++, 0, $row );
/*
			foreach ( $qdata->Percents as $pkey=>&$percent ) {
				$ws->writerow( $this->rownum + $pkey, 0, $percent );
			}
*/
			$voters = array();
			$offset = 0;
			$spansUsed = count( $qdata->CategorySpans ) > 0 || $qdata->type == "multipleChoice";
			# iterate through the voters of the current poll (there might be many)
			while ( ( $limit = count( $voters = $pollStore->pollVotersPager( $offset ) ) ) > 0 ) {
				if ( !$first_question ) {
					# do not export more user voices than first question has
					for ( $total_voters -= $limit; $total_voters < 0 && $limit > 0; $total_voters++, $limit-- ) {
						array_pop( $voters );
					}
					if ( count( $voters ) === 0 ) {
						break;
					}
				}
				$uvoices = $pollStore->questionVoicesRange( $qdata->question_id, array_keys( $voters ) );
				# get each of proposal votes for current uid
				foreach ( $uvoices as $uid => &$pvoices ) {
					# output square table of proposal / category answers for each uid in uvoices array
					$voicesTable = array();
					foreach ( $qdata->ProposalText as $propkey => &$proposal_text ) {
						$row = array_fill( 0, count( $qdata->Categories ), '' );
						if ( isset( $pvoices[$propkey] ) ) {
							foreach ( $pvoices[$propkey] as $catkey => $text_answer ) {
								$row[$catkey] = self::prepareExcelString( $text_answer );
							}
							if ( $spansUsed ) {
								foreach ( $row as $catkey => &$cell ) {
									$cell = array( 0 => $cell );
									if ( $qdata->type == "multipleChoice" ) {
										$cell['format'] = ( ( $catkey & 1 ) === 0 ) ? $format['even'] : $format['odd'];
									} else {
										$cell['format'] = ( ( $qdata->Categories[ $catkey ][ "spanId" ] & 1 ) === 0 ) ? $format['even'] : $format['odd'];
									}
								}
							}
						}
						$voicesTable[] = $row;
					}
					$this->writeFormattedTable( 0, $voicesTable, $format['answer'] );
					$row = array();
					foreach ( $qdata->ProposalText as $ptext ) {
						$row[] = self::prepareExcelString( $ptext );
					}
					$ws->writecol( $this->rownum, count( $qdata->Categories ), $row );
					$this->rownum += count( $qdata->ProposalText ) + 1;
				}
				if ( !$first_question && $total_voters < 1 ) {
					# break on reaching the count of first question user voices
					break;
				}
				$offset += $limit;
			}
			if ( $first_question ) {
				# store maximum count of voters of the first question
				$first_question_voters = $offset;
				$first_question = false;
			}
		}
	}

	function statsToXls( $format, qp_PollStore $pollStore ) {
		$this->format = &$format;
		$pollStore->loadQuestions();
		$pollStore->loadTotals();
		$pollStore->calculateStatistics();
		$ws = $this->ws;
		$first_question = true;
		foreach ( $pollStore->Questions as $qkey => &$qdata ) {
			if ( $first_question ) {
				$this->writeHeader( $pollStore->totalUsersAnsweredQuestion( $qdata ) );
				$first_question = false;
			}
			$ws->write( $this->rownum, 0, $qdata->question_id, $format['heading'] );
			$ws->write( $this->rownum++, 1, self::prepareExcelString( $qdata->CommonQuestion ), $format['heading'] );
			if ( count( $qdata->CategorySpans ) > 0 ) {
				$row = array();
				foreach ( $qdata->CategorySpans as &$span ) {
					$row[] = self::prepareExcelString( $span[ "name" ] );
					for ( $i = 1; $i < $span[ "count" ]; $i++ ) {
						$row[] = "";
					}
				}
				$ws->writerow( $this->rownum++, 0, $row );
			}
			$row = array();
			foreach ( $qdata->Categories as &$categ ) {
				$row[] = self::prepareExcelString( $categ[ "name" ] );
			}
			$ws->writerow( $this->rownum++, 0, $row );
/*
			foreach ( $qdata->Percents as $pkey=>&$percent ) {
				$ws->writerow( $this->rownum + $pkey, 0, $percent );
			}
*/
			$percentsTable = array();
			$spansUsed = count( $qdata->CategorySpans ) > 0 || $qdata->type == "multipleChoice";
			foreach ( $qdata->ProposalText as $propkey => &$proposal_text ) {
				if ( isset( $qdata->Percents[ $propkey ] ) ) {
					$row = $qdata->Percents[ $propkey ];
					foreach ( $row as $catkey => &$cell ) {
						$cell = array( 0 => $cell );
						if ( $spansUsed ) {
							if ( $qdata->type == "multipleChoice" ) {
								$cell['format'] = ( ( $catkey & 1 ) === 0 ) ? $format['even'] : $format['odd'];
							} else {
								$cell['format'] = ( ( $qdata->Categories[ $catkey ][ "spanId" ] & 1 ) === 0 ) ? $format['even'] : $format['odd'];
							}
						}
					}
				} else {
					$row = array_fill( 0, count( $qdata->Categories ), '' );
				}
				$percentsTable[] = $row;
			}
			$this->writeFormattedTable( 0, $percentsTable, $format['percent'] );
			$row = array();
			foreach ( $qdata->ProposalText as $ptext ) {
				$row[] = self::prepareExcelString( $ptext );
			}
			$ws->writecol( $this->rownum, count( $qdata->Categories ), $row );
			$this->rownum += count( $qdata->ProposalText ) + 1;
		}
	}

	function interpretationToXLS( $format, qp_PollStore $pollStore ) {
		$offset = 0;
		$ws = $this->ws;
		# iterate through the voters of the current poll (there might be many)
		while ( ( $limit = count( $voters = $pollStore->pollVotersPager( $offset ) ) ) > 0 ) {
			foreach ( $voters as &$voter ) {
				if ( $voter['interpretation']->short != '' ) {
					$ws->write( $this->rownum++, 0, self::prepareExcelString( wfMsg( 'qp_results_short_interpretation' ) ), $format['heading'] );
					$ws->write( $this->rownum++, 0, self::prepareExcelString( $voter['interpretation']->short ) );
				}
				if ( $voter['interpretation']->structured != '' ) {
					$ws->write( $this->rownum++, 0, self::prepareExcelString( wfMsg( 'qp_results_structured_interpretation' ) ), $format['heading'] );
					$strucTable = $voter['interpretation']->getStructuredAnswerTable();
					foreach ( $strucTable as &$line ) {
						if ( isset( $line['keys'] ) ) {
							# current node is associative array
							$ws->writeRow( $this->rownum++, 0, $line['keys'], $format['odd'] );
							$ws->writeRow( $this->rownum++, 0, $line['vals'] );
						} else {
							$ws->write( $this->rownum++, 0, $line['vals'] );
						}
					}
					$this->rownum++;
				}
			}
			$offset += $limit;
		}
	}

} /* end of qp_Excel class */
