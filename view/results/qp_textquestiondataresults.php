<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * Render question data in Special:Pollresults
 *
 * *** Usually a singleton instantiated via $qdata->getView() ***
 *
 */
class qp_TextQuestionDataResults extends qp_QuestionDataResults {

	/**
	 * @return  string  html representation of user vote for Special:Pollresults output
	 */
	function displayUserQuestionVote() {
		$ctrl = $this->ctrl;
		$output = "<div class=\"qpoll\">\n" . "<table class=\"qdata\">\n";
		foreach ( $ctrl->ProposalText as $propkey => &$serialized_tokens ) {
			if ( !is_array( $dbtokens = unserialize( $serialized_tokens ) ) ) {
				throw new MWException( 'dbtokens is not an array in ' . __METHOD__ );
			}
			$catId = 0;
			$row = array();
			foreach ( $dbtokens as &$token ) {
				if ( is_string( $token ) ) {
					# add a proposal part
					$row[] = array( '__tag' => 'span', 'class' => 'prop_part', qp_Setup::entities( $token ) );
				} elseif ( is_array( $token ) ) {
					# add a category definition with selected text answer (if any)
					$className = 'cat_part';
					if ( array_key_exists( $propkey, $ctrl->ProposalCategoryId ) &&
						( $id_key = array_search( $catId, $ctrl->ProposalCategoryId[$propkey] ) ) !== false ) {
						if ( ( $text_answer = $ctrl->ProposalCategoryText[$propkey][$id_key] ) === '' &&
									count( $token ) === 1 ) {
							# indicate selected checkbox / radiobuttn
							$text_answer = '+';
						}
					} else {
						$text_answer = '';
						$className .= ' cat_unanswered';
					}
					if ( count( $token ) > 1 &&
							$text_answer !== '' &&
							!in_array( $text_answer, $token ) ) {
						if ( !qp_Renderer::hasClassName( $className, 'cat_unknown' ) ) {
							$className .= ' cat_unknown';
						};
					}
					$titleAttr = '';
					foreach ( $token as &$option ) {
						if ( $option !== $text_answer ) {
							if ( $titleAttr !== '' ) {
								$titleAttr .= ' | ';
							}
							$titleAttr .= qp_Setup::entities( $option );
						}
					}
					if ( $text_answer === '' ) {
						# many browsers trim the spaces between spans when the text node is empty;
						# use non-breaking space to prevent this
						$text_answer = '&#160;';
					} else {
						$text_answer = qp_Setup::entities( $text_answer );
					}
					$row[] = array( '__tag' => 'span', 'class' => $className, 'title'=>$titleAttr, $text_answer );
					# move to the next category (if any)
					$catId++;
				} else {
					throw new MWException( 'DB token has invalid type (' . gettype( $token ) . ') in ' . __METHOD__ );
				}
			}
			$output .= qp_Renderer::displayRow( array( $row ), array( 'class' => 'qdatatext' ) );
		}
		$output .= "</table>\n" . "</div>\n";
		return $output;
	}

	/**
	 * @return  string  html representation of question statistics for Special:Pollresults output
	 */
	function displayQuestionStats( qp_SpecialPage $page, $pid ) {
		return 'todo: implement';
	}

} /* end of qp_TextQuestionDataResults class */
