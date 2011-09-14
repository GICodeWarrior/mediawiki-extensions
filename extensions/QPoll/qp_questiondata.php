<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * Poll's single question data object RAM storage
 * ( instances usually have short name qdata )
 *
 * Since v0.8.0 it is also used as "mini-view" for Special:Pollresults page
 * because different types of questions should be displayed differently
 *
 */
class qp_QuestionData {

	// DB index (with current scheme is non-unique)
	var $question_id = null;
	// common properties
	var $type;
	var $CommonQuestion;
	var $Categories;
	var $CategorySpans;
	var $ProposalText;
	var $ProposalCategoryId;
	var $ProposalCategoryText;
	var $alreadyVoted = false; // whether the selected user already voted this question ?
	// statistics storage
	var $Votes = null;
	var $Percents = null;

	/**
	 * Please do not instantiate directly, use qp_PollStore::newQuestionData() instead
	 */
	function __construct( $argv ) {
		if ( array_key_exists( 'from', $argv ) ) {
			switch ( $argv[ 'from' ] ) {
				case 'postdata' :
						$this->type = $argv[ 'type' ];
						$this->CommonQuestion = $argv[ 'common_question' ];
						$this->Categories = $argv[ 'categories' ];
						$this->CategorySpans = $argv[ 'category_spans' ];
						$this->ProposalText = $argv[ 'proposal_text' ];
						$this->ProposalCategoryId = $argv[ 'proposal_category_id' ];
						$this->ProposalCategoryText = $argv[ 'proposal_category_text' ];
					break;
				case 'qid' :
						$this->question_id = $argv[ 'qid' ];
						$this->type = $argv[ 'type' ];
						$this->CommonQuestion = $argv[ 'common_question' ];
						$this->Categories = Array();
						$this->CategorySpans = Array();
						$this->ProposalText = Array();
						$this->ProposalCategoryId = Array();
						$this->ProposalCategoryText = Array();
					break;
			}
		}
	}

	// integrate spans into categories
	function packSpans() {
		if ( count( $this->CategorySpans ) > 0 ) {
			foreach ( $this->Categories as &$Cat ) {
				if ( array_key_exists( 'spanId', $Cat ) ) {
					$Cat['name'] = $this->CategorySpans[ $Cat['spanId'] ]['name'] . "\n" . $Cat['name'];
					unset( $Cat['spanId'] );
				}
			}
			unset( $this->CategorySpans );
			$this->CategorySpans = Array();
		}
	}

	// restore spans from categories
	function restoreSpans() {
		if ( count( $this->CategorySpans ) == 0 ) {
			$prevSpanName = '';
			$spanId = -1;
			foreach ( $this->Categories as &$Cat ) {
				$a = explode( "\n", $Cat['name'] );
				if ( count( $a ) > 1 ) {
					if ( $prevSpanName != $a[0] ) {
						$spanId++;
						$prevSpanName = $a[0];
						$this->CategorySpans[ $spanId ]['count'] = 0;
					}
					$Cat['name'] = $a[1];
					$Cat['spanId'] = $spanId;
					$this->CategorySpans[ $spanId ]['name'] = $a[0];
					$this->CategorySpans[ $spanId ]['count']++;
				} else {
					$prevSpanName = '';
				}
			}
		}
	}

	// check whether the previousely stored poll header is compatible with the one defined on the page
	// used to reject previous vote in case the header is incompatble
	function isCompatible( &$question ) {
		if ( $question->mType != $this->type ) {
			return false;
		}
		if ( count( $question->mCategorySpans ) != count( $this->CategorySpans ) ) {
			return false;
		}
		foreach ( $question->mCategorySpans as $spanidx => &$span ) {
			if ( !isset( $this->CategorySpans[ $spanidx ] ) ||
					$span[ "count" ] != $this->CategorySpans[ $spanidx ][ "count" ] ) {
				return false;
			}
		}
		return true;
	}

	private function categoryentities( $cat ) {
		$cat['name'] = qp_Setup::entities( $cat['name'] );
		return $cat;
	}

	/**
	 * @return  string  html representation of user vote for Special:Pollresults output
	 */
	function displayUserQuestionVote() {
		$output = "<div class=\"qpoll\">\n" . "<table class=\"pollresults\">\n";
		$output .= qp_Renderer::displayRow( array_map( array( $this, 'categoryentities' ), $this->CategorySpans ), array( 'class' => 'spans' ), 'th', array( 'count' => 'colspan', 'name' => 0 ) );
		$output .= qp_Renderer::displayRow( array_map( array( $this, 'categoryentities' ), $this->Categories ), '', 'th', array( 'name' => 0 ) );
		# multiple choice polls doesn't use real spans, instead, every column is like "span"
		$spansUsed = count( $this->CategorySpans ) > 0 || $this->type == "multipleChoice";
		foreach ( $this->ProposalText as $propkey => &$proposal_text ) {
			$row = Array();
			foreach ( $this->Categories as $catkey => &$cat_name ) {
				$cell = Array( 0 => "" );
				if ( array_key_exists( $propkey, $this->ProposalCategoryId ) &&
							( $id_key = array_search( $catkey, $this->ProposalCategoryId[ $propkey ] ) ) !== false ) {
					$text_answer = $this->ProposalCategoryText[ $propkey ][ $id_key ];
					if ( $text_answer != '' ) {
						if ( strlen( $text_answer ) > 20 ) {
							$cell[ 0 ] = array( '__tag' => 'div', 'style' => 'width:10em; height:5em; overflow:auto', 0 => qp_Setup::entities( $text_answer ) );
						} else {
							$cell[ 0 ] = qp_Setup::entities( $text_answer );
						}
					} else {
						$cell[ 0 ] = '+';
					}
				}
				if ( $spansUsed ) {
					if ( $this->type == "multipleChoice" ) {
						$cell[ "class" ] = ( ( $catkey & 1 ) === 0 ) ? "spaneven" : "spanodd";
					} else {
						$cell[ "class" ] = ( ( $this->Categories[ $catkey ][ "spanId" ] & 1 ) === 0 ) ? "spaneven" : "spanodd";
					}
				} else {
					$cell[ "class" ] = "stats";
				}
				$row[] = $cell;
			}
			$row[] = array( 0 => qp_Setup::entities( $proposal_text ), "style" => "text-align:left;" );
			$output .= qp_Renderer::displayRow( $row );
		}
		$output .= "</table>\n" . "</div>\n";
		return $output;
	}

	/**
	 * @return  string  html representation of question statistics for Special:Pollresults output
	 */
	function displayQuestionStats( qp_SpecialPage $page, $pid ) {
		$current_title = $page->getTitle();
		$output = "<br />\n<b>" . $this->question_id . ".</b> " . qp_Setup::entities( $this->CommonQuestion ) . "<br />\n";
		$output .= "<div class=\"qpoll\">\n" . "<table class=\"pollresults\">\n";
		$output .= qp_Renderer::displayRow( array_map( array( $this, 'categoryentities' ), $this->CategorySpans ), array( 'class' => 'spans' ), 'th', array( 'count' => 'colspan', 'name' => 0 ) );
		$output .= qp_Renderer::displayRow( array_map( array( $this, 'categoryentities' ), $this->Categories ), '', 'th', array( 'name' => 0 ) );
		# multiple choice polls doesn't use real spans, instead, every column is like "span"
		$spansUsed = count( $this->CategorySpans ) > 0 || $this->type == "multipleChoice";
		foreach ( $this->ProposalText as $propkey => &$proposal_text ) {
			if ( isset( $this->Votes[ $propkey ] ) ) {
				if ( $this->Percents === null ) {
					$row = $this->Votes[ $propkey ];
				} else {
					$row = $this->Percents[ $propkey ];
					foreach ( $row as $catkey => &$cell ) {
						# Replace spaces with en spaces
						$formatted_cell = str_replace( " ", "&#8194;", sprintf( '%3d%%', intval( round( 100 * $cell ) ) ) );
						# only percents !=0 are displayed as link
						if ( $cell == 0.0 && $this->question_id !== null ) {
							$cell = array( 0 => $formatted_cell, "style" => "color:gray" );
						} else {
							$cell = array( 0 => $page->qpLink( $current_title, $formatted_cell,
								array( "title" => wfMsgExt( 'qp_votes_count', array( 'parsemag' ), $this->Votes[ $propkey ][ $catkey ] ) ),
								array( "action" => "qpcusers", "id" => $pid, "qid" => $this->question_id, "pid" => $propkey, "cid" => $catkey ) ) );
						}
						if ( $spansUsed ) {
							if ( $this->type == "multipleChoice" ) {
								$cell[ "class" ] = ( ( $catkey & 1 ) === 0 ) ? "spaneven" : "spanodd";
							} else {
								$cell[ "class" ] = ( ( $this->Categories[ $catkey ][ "spanId" ] & 1 ) === 0 ) ? "spaneven" : "spanodd";
							}
						} else {
							$cell[ "class" ] = "stats";
						}
					}
				}
			} else {
				# this proposal has no statistics (no votes)
				$row = array_fill( 0, count( $this->Categories ), '' );
			}
			$row[] = array( 0 => qp_Setup::entities( $proposal_text ), "style" => "text-align:left;" );
			$output .= qp_Renderer::displayRow( $row );
		}
		$output .= "</table>\n" . "</div>\n";
		return $output;
	}
	
} /* end of qp_QuestionData class */

/**
 * Questions of type="text" require a different view logic at the Special:Pollresults page
 */
class qp_TextQuestionData extends qp_QuestionData {

/**
 * Please do not instantiate directly, use qp_PollStore::newQuestionData() instead
 */
	 
	/**
	 * @return  string  html representation of user vote for Special:Pollresults output
	 */
	function displayUserQuestionVote() {
		$output = "<div class=\"qpoll\">\n" . "<table class=\"pollresults\">\n";
		foreach ( $this->ProposalText as $propkey => &$serialized_tokens ) {
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
					if ( array_key_exists( $propkey, $this->ProposalCategoryId ) &&
						( $id_key = array_search( $catId, $this->ProposalCategoryId[$propkey] ) ) !== false ) {
						$text_answer = $this->ProposalCategoryText[$propkey][$id_key];
					} else {
						$text_answer = '';
					}
					$className = ( count( $token ) === 1 || in_array( $text_answer, $token ) ) ? 'cat_part' : 'cat_unknown';
					$titleAttr = '';
					foreach ( $token as &$option ) {
						if ( $option !== $text_answer ) {
							if ( $titleAttr !== '' ) {
								$titleAttr .= ' | ';
							}
							$titleAttr .= qp_Setup::entities( $option );
						}
					}
					$row[] = array( '__tag' => 'span', 'class' => $className, 'title'=>$titleAttr, qp_Setup::entities( $text_answer ) );
					# move to the next category (if any)
					$catId++;
				} else {
					throw new MWException( 'DB token has invalid type (' . gettype( $token ) . ') in ' . __METHOD__ );
				}
			}
			$output .= qp_Renderer::displayRow( array( $row ) );
		}
		$output .= "</table>\n" . "</div>\n";
		return $output;
	}

} /* end of qp_TextQuestionData class */
