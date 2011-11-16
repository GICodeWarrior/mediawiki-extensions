<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * Muitl-row cache for question proposals
 */
class qp_ProposalCache extends qp_QuestionCache {

	# memory cache key prefix
	protected $keyPrefix = 'pc';
	# DB table name
	protected $tableName = 'qp_question_proposals';
	# DB table index for replace
	protected $replaceIndex = 'proposal';
	# DB table fields to select / replace
	protected $fields = array( 'question_id', 'proposal_id', 'proposal_text' );

	protected function convertFromString( $row ) {
		$row->question_id = intval( $row->question_id );
		$row->proposal_id = intval( $row->proposal_id );
	}

	protected function buildReplaceRows() {
		global $wgContLang;
		$pid = self::$store->pid;
		foreach ( self::$store->Questions as $qkey => $ques ) {
			foreach ( $ques->ProposalText as $propkey => $ptext ) {
				if ( isset( $ques->ProposalNames[$propkey] ) ) {
					$ptext = qp_QuestionData::getProposalNamePrefix( $ques->ProposalNames[$propkey] ) . $ptext;
				}
				$ptext = $wgContLang->truncate( $ptext, qp_Setup::$field_max_len['proposal_text'] , '' );
				$this->replace[] = array( 'pid' => $pid, 'question_id' => $qkey, 'proposal_id' => $propkey, 'proposal_text' => $ptext );
				# instead of calling $this->updateFromPollStore(),
				# we build $this->memc_rows[] right here,
				# to avoid double loop against self::$store->Questions
				$this->memc_rows[] = array(
					$qkey,
					$propkey,
					$ptext
				);
			}
		}
	}

} /* end of qp_ProposalCache class */
