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
					# resulting category view tagarray
					$catview = array(
						'__tag' =>'span',
						'class' => 'cat_part',
						'' // text_answer
					);
					$titleAttr = '';
					if ( array_key_exists( $propkey, $ctrl->ProposalCategoryId ) &&
						( $id_key = array_search( $catId, $ctrl->ProposalCategoryId[$propkey] ) ) !== false ) {
						if ( ( $text_answer = $ctrl->ProposalCategoryText[$propkey][$id_key] ) === '' ) {
							if ( count( $token ) === 1 ) {
								# indicate selected checkbox / radiobuttn
								$catview[0] = qp_Setup::RESULTS_CHECK_SIGN;
							}
						} else {
							# try to extract select multiple, if any
							$text_answer = explode( qp_Setup::SELECT_MULTIPLE_VALUES_SEPARATOR, $text_answer );
							# place unused categories into the value of 'title' attribute
							foreach ( $token as &$option ) {
								if ( !in_array( $option, $text_answer ) ) {
									if ( $titleAttr !== '' ) {
										$titleAttr .= ' | ';
									}
									$titleAttr .= qp_Setup::entities( $option );
								}
							}
							# re-create the view of chosen category parts
							$catview = array();
							foreach ( $text_answer as $key => &$cat_part ) {
								$tag = array(
									'__tag' => 'span',
									'class' => 'cat_part',
									'title' => $titleAttr,
									qp_Setup::specialchars( $cat_part )
								);
								if ( in_array( $cat_part, $token ) ) {
										$tag['class'] .= ( $key % 2 === 0 ) ? ' cat_even' : ' cat_odd';
								} elseif ( count( $text_answer ) > 1 ) {
									# add 'cat_unanswered' CSS class only to select multiple values
									$tag['class'] .= ' cat_unanswered';
								}
								if ( $key == 0 ) {
									$tag['class'] .= ' cat_first';
								}
								$catview[] = $tag;
							}
						}
					} else {
						# many browsers trim the spaces between spans when the text node is empty;
						# use non-breaking space to prevent this
						$catview[0] = '&#160;';
						$catview['class'] .= ' cat_unanswered';
					}
					$row[] = $catview;
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
