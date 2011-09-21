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
 * Stores question proposals views (see qp_qestion.php) and
 * allows to modify these for quizes results at the later stage (see qp_poll.php)
 * todo: transfer view logic completely from controllers
 */

class qp_TabularQuestionView extends qp_StubQuestionView {

	# display layout
	var $proposalsFirst = false;
	var $transposed = false;
	var $spanType = 'colspan';
	var $categoriesStyle = '';
	var $signClass = '';
	var $proposalTextStyle = 'padding-left: 10px;';
	var $textInputStyle = '';

	# whether to show the current stats to the users
	# the following values are defined:
	# false - use value of pollShowResults, Array(0) - suppress, Array(1) - percents, Array(2) - bars
	var $showResults = false;
	var $pollShowResults;

	# begin of proposalView
	# these vars (and perhaps some more) should be part of separate proposalView,
	# todo: in the future create separate proposal view with $row and $text ?
	var $rawClass;
	var $spanState;
	# end of proposalView

	/**
	 * @param $parser
	 * @param $frame
	 * @param  $showResults     poll's showResults (may be overriden in the question)
	 */
	function __construct( &$parser, &$frame, $showResults ) {
		parent::__construct( $parser, $frame );
		$this->pollShowResults = $showResults;
	}

	/**
	 * Called for every proposal of the question
	 * todo: actually should be a member of separate small proposal view class
	 */
	function initProposalView() {
		$this->rawClass = 'proposal';
		# stdClass instance used to draw borders around table cells via css
		$this->spanState = (object) array( 'id' => 0, 'prevId' => -1, 'wasChecked' => true, 'isDrawing' => false, 'cellsLeft' => 0, 'className' => 'sign' );
	}

	static function newFromBaseView( $baseView ) {
		return new self( $baseView->parser, $baseView->ppframe, $baseView->showResults );
	}

	function setLayout( $layout, $textwidth ) {
		if ( $layout !== null ) {
			$this->transposed = strpos( $layout, 'transpose' ) !== false;
			$this->proposalsFirst = strpos( $layout, 'proposals' ) !== false;
		}
		# setup question layout parameters
		if ( $this->transposed ) {
			$this->spanType = 'rowspan';
			$this->categoriesStyle = 'text-align:left; vertical-align:middle; ';
			$this->signClass = array( 'first' => 'signt', 'middle' => 'signm', 'last' => 'signb' );
			$this->proposalTextStyle = 'text-align:center; padding-left: 5px; padding-right: 5px; ';
			$this->proposalTextStyle .= ( $this->proposalsFirst ) ? ' vertical-align: bottom;' : 'vertical-align:top;';
		} else {
			$this->spanType = 'colspan';
			$this->categoriesStyle = '';
			$this->signClass = array( 'first' => 'signl', 'middle' => 'signc', 'last' => 'signr' );
			$this->proposalTextStyle = 'vertical-align:middle; ';
			$this->proposalTextStyle .= ( $this->proposalsFirst ) ? 'padding-right: 10px;' : 'padding-left: 10px;';
		}
		if ( $textwidth !== null ) {
			$textwidth = intval( $textwidth );
			if ( $textwidth > 0 ) {
				$this->textInputStyle = 'width:' . $textwidth . 'em;';
			}
		}
	}

	function setShowResults( $showresults ) {
		# setup question's showresults when global showresults != 0
		if ( qp_Setup::$global_showresults != 0 && $showresults !== null ) {
			# use the value from the question
			$this->showResults = qp_AbstractPoll::parseShowResults( $showresults );
			# apply undefined attributes from the poll's showresults definition
			foreach ( $this->pollShowResults as $attr => $val ) {
				if ( $attr != 'type' && !isset( $this->showResults[$attr] ) ) {
					$this->showResults[$attr] = $val;
				}
			}
		} else {
			# use the value "inherited" from the poll
			$this->showResults = $this->pollShowResults;
		}
		# initialize cell template for the selected showresults
		# this method call can be moved to $ctrl->parseBody() in the future,
		# if needed to setup templates depending on question type
		# right now, cell templates depend only on input type and showresults type
		if ( $this->showResults['type'] != 0 ) {
			$this->{ 'cellTemplate' . $this->showResults['type'] }();
		}
	}

	/**
	 * Checks, whether the supplied CSS length value is valid
	 * @return  boolean  true for valid value, false otherwise
	 */
	function isCSSLengthValid( $width ) {
		preg_match( '`^\s*(\d+)(px|em|en|%|)\s*$`', $width, $matches );
		return count( $matches > 1 ) && $matches[1] > 0;
	}

	function setPropWidth( $attr ) {
		if ( $attr !== null && $this->isCSSLengthValid( $attr ) ) {
			$this->propWidth = trim( $attr );
		}
		if ( $this->propWidth !== '' ) {
			$this->proposalTextStyle .= " width:{$this->propWidth};";
		}
	}

	/**
	 * Builds tagarray of categories
	 * @param     $categories  "raw" categories
	 */
	function buildCategoriesRow( $categories ) {
		$row = array();
		if ( $this->proposalsFirst ) {
			// add empty <th> at the begin of row to "compensate" proposal text
			$row[] = array( '__tag' => 'td', 0 => "", 'style' => 'border:none;', '__end' => "\n" );
		}
		foreach ( $categories as $cat ) {
			$row[] = $this->rtp( $cat['name'] );
		}
		if ( !$this->proposalsFirst ) {
			// add empty <th> at the end of row to "compensate" proposal text
			$row[] = array( '__tag' => 'td', 0 => "", 'style' => 'border:none;', '__end' => "\n" );
		}
		return $row;
	}

	/**
	 * Builds tagarray of category spans
	 * @param   $categorySpans  "raw" spans
	 */
	function buildSpansRow( $categorySpans ) {
		$row = array();
		if ( $this->proposalsFirst ) {
			// add empty <th> at the begin of row to "compensate" proposal text
			$row[] = array( '__tag' => 'td', 0 => "", 'style' => 'border:none;', '__end' => "\n" );
		}
		foreach ( $categorySpans as &$span ) {
			$row[] = array( "count" => $span['count'], 0 => $this->rtp( $span['name'] ) );
		}
		if ( !$this->proposalsFirst ) {
			// add empty <th> at the end of row to "compensate" proposal text
			$row[] = array( '__tag' => 'td', 0 => "", 'style' => 'border:none;', '__end' => "\n" );
		}
		return $row;
	}

	/**
	 * Adds category spans row to question's view
	 */
	function addSpanRow( $row ) {
		# apply categoriesStyle
		if ( $this->categoriesStyle != '' ) {
			qp_Renderer::applyAttrsToRow( $row, array( 'style' => $this->categoriesStyle ) );
		}
		$this->hview[] = (object) array(
			'row' => $row,
			'className' => 'spans',
			'attribute_maps' => array( 'count' => $this->spanType, 'name' => 0 )
		);
	}

	/**
	 * Adds categories row to question's view
	 */
	function addCategoryRow( $row ) {
		# apply categoriesStyle
		if ( $this->categoriesStyle != '' ) {
			qp_Renderer::applyAttrsToRow( $row, array( 'style' => $this->categoriesStyle ) );
		}
		$this->hview[] = (object) array(
			'row' => $row,
			'className' => 'categories',
			'attribute_maps' => array( 'name' => 0 )
		);
	}

	/**
	 * @param $proposalId  int index of proposal
	 * @param $text        string proposal text
	 * @param $row         array representation of html table row associated with current proposal
	 */
	function addProposal( $proposalId, $text, $row ) {
		$this->pview[$proposalId] = (object) array(
			'text' => $text,
			'row' => $row,
			'className' => $this->rawClass
		);
	}

	/**
	 * Render script-generated interpretation errors, when available (quiz mode)
	 */
	function renderInterpErrors() {
		if ( ( $interpErrors = $this->ctrl->getInterpErrors() ) === false ) {
			# there is no interpretation error
			return;
		}
		foreach ( $interpErrors as $prop_id => $prop_desc ) {
			if ( isset( $this->pview[$prop_id] ) ) {
				# the whole proposal line has errors
				$propview = &$this->pview[$prop_id];
				if ( !is_array( $prop_desc ) ) {
					if ( !is_string( $prop_desc ) ) {
						$prop_desc = wfMsg( 'qp_interpetation_wrong_answer' );
					}
					$propview->text = $this->bodyErrorMessage( $prop_desc, '', false ) . $propview->text;
					continue;
				}
				# specified category of proposal has errors;
				$foundCats = false;
				# scan the category views row to highlight erroneous categories
				foreach ( $propview->row as $cat_id => &$cat_tag ) {
					# only integer keys are the category views
					if ( is_int( $cat_id ) && isset( $prop_desc[$cat_id] ) ) {
						# found a category which has script-generated error
						$foundCats = true;
						# whether to use custom or standard error message
						if ( !is_string( $cat_desc = $prop_desc[$cat_id] ) ) {
							$cat_desc = wfMsg( 'qp_interpetation_wrong_answer' );
						}
						# highlight the input
						qp_Renderer::addClass( $cat_tag, 'cat_error' );
						array_unshift( $cat_tag, $this->bodyErrorMessage( $cat_desc, '', false ) . '<br />' );
					}
					if ( !$foundCats ) {
						# there are category errors specified in interpretation result;
						# however none of them are found in proposal's view
						# generate error for the whole proposal
						$propview->text = $this->bodyErrorMessage( wfMsg( 'qp_interpetation_wrong_answer' ), '', false ) . $propview->text;
					}
				}
			}
		}
	}

	/**
	 * Draws borders via css in the question table according to
	 *   controller's category spans (metacategories)
	 * todo: this function takes too much arguments;
	 *   figure out how to split it into smaller parts
	 */
	function renderSpan( &$row, &$name, $value, $catId, $catDesc, &$text ) {
		$spanState = &$this->spanState;
		if ( array_key_exists( 'spanId', $catDesc ) ) {
			$spanState->id = $catDesc[ 'spanId' ];
			$name .= 's' . $spanState->id;
			# there can't be more category spans than the categories
			if ( $this->ctrl->mCategorySpans[ $spanState->id ]['count'] > count( $this->ctrl->mCategories ) ) {
				$text = $this->bodyErrorMessage( wfMsg( 'qp_error_too_many_spans' ), 'error' ) . $text;
				$this->rawClass = 'proposalerror';
			}
			if ( $spanState->prevId != $spanState->id ) {
				# begin of new span
				$spanState->wasChecked = false;
				$spanState->prevId = $spanState->id;
				$spanState->cellsLeft = $this->ctrl->mCategorySpans[ $spanState->id ]['count'];
				if ( $spanState->cellsLeft < 2 ) {
					$text = $this->bodyErrorMessage( wfMsg( 'qp_error_too_few_spans' ), 'error' ) . $text;
					QP_Renderer::addClass( $row[ $catId ], 'error' );
				}
				$spanState->isDrawing = $spanState->cellsLeft != 1 && $spanState->cellsLeft != count( $this->ctrl->mCategories );
				# hightlight only spans of count != 1 and count != count(categories)
				if ( $spanState->isDrawing ) {
					$spanState->className = $this->signClass[ 'first' ];
				}
			} else {
				$spanState->cellsLeft--;
				if ( $spanState->isDrawing ) {
					$spanState->className = ( $spanState->cellsLeft > 1 ) ? $this->signClass[ 'middle' ] : $this->signClass[ 'last' ];
				}
			}
		}
		# todo: figure out how to split this part to separate function
		# this part is unneeded for question stats controller,
		# which should never have $this->ctrl->poll->mBeingCorrected === true
		if ( $spanState->cellsLeft <= 1 ) {
			# end of new span
			if ( $this->ctrl->poll->mBeingCorrected &&
					!$spanState->wasChecked &&
					$this->ctrl->mRequest->getVal( $name ) != $value ) {
				# the span (a part of proposal) was submitted but unanswered
				$text = $this->bodyErrorMessage( wfMsg( 'qp_error_unanswered_span' ), 'NA' ) . $text;
				# highlight current span to indicate an error
				for ( $i = $catId, $j = $this->ctrl->mCategorySpans[ $spanState->id ]['count']; $j > 0; $i--, $j-- ) {
					QP_Renderer::addClass( $row[$i], 'error' );
				}
				$this->rawClass = 'proposalerror';
			}
		}
	}

	/**
	 * Renders question table with header and proposal views
	 */
	function renderTable() {
		$questionTable = array();
		# add header views to $questionTable
		foreach ( $this->hview as $header ) {
			$rowattrs = '';
			$attribute_maps = null;
			if ( is_object( $header ) ) {
				$row = &$header->row;
				$rowattrs = array( 'class' => $header->className );
				$attribute_maps = &$header->attribute_maps;
			} else {
				$row = &$header;
			}
			if ( $this->transposed ) {
				qp_Renderer::addColumn( $questionTable, $row, $rowattrs, 'th', $attribute_maps );
			} else {
				qp_Renderer::addRow( $questionTable, $row, $rowattrs, 'th', $attribute_maps );
			}
		}
		# add proposal views to $questionTable
		ksort( $this->pview );
		foreach ( $this->pview as $propview ) {
			$row = &$propview->row;
			$rowattrs = array( 'class' => $propview->className );
			$text = array( '__tag' => 'td', '__end' => "\n", 'class' => 'proposaltext', 'style' => $this->proposalTextStyle, 0 => $this->rtp( $propview->text ) );
			# insert proposal text to the beginning / end according to proposalsFirst property
			if ( $this->proposalsFirst ) {
				# first element is proposaltext
				array_unshift( $row, $text );
			} else {
				# last element is proposaltext
				$row[] = $text;
			}
			if ( $this->transposed ) {
				qp_Renderer::addColumn( $questionTable, $row, $rowattrs );
			} else {
				qp_Renderer::addRow( $questionTable, $row, $rowattrs );
			}
		}
		return $questionTable;
	}

	/*** cell templates ***/

	function hasShowResults() {
		return $this->showResults['type'] != 0 &&
			method_exists( $this, 'addShowResults' . $this->showResults['type'] );
	}

	function addShowResults( $inp, $proposalId, $catId ) {
		return $this->{ 'addShowResults' . $this->showResults['type'] }( $inp, $proposalId, $catId );
	}

	# cell templates for the selected showresults
	var $cellTemplate = Array();
	var $cellTemplateParam = Array( 'inp' => '', 'percents' => '', 'bar1style' => '', 'bar2style' => '' );

	# setup a template for showresults=1
	# showresults=1 cellTemplate has only one variant
	function cellTemplate1() {
		$this->cellTemplate =
			array(
				0 => array( '__tag' => 'div', 0 => &$this->cellTemplateParam['inp'] ),
				1 => array( '__tag' => 'div', 'class' => 'stats', 0 => &$this->cellTemplateParam['percents'] )
			);
		if ( isset( $this->showResults['color'] ) ) {
			$this->cellTemplate[1]['style'] = 'color:' . $this->showResults['color'] . ';';
		}
		if ( isset( $this->showResults['background'] ) ) {
			$this->cellTemplate[1]['style'] .= 'background:' . $this->showResults['background'] . ';';
		}
	}

	# transform input according to showresults=1 (numerical percents)
	# *** warning! parameters should be passed only by value, not by reference ***
	function addShowResults1( $inp, $proposalId, $catId ) {
		$this->cellTemplateParam['inp'] = $inp;
		$this->cellTemplateParam['percents'] = '&#160;';
		if ( ( $percents = $this->ctrl->getPercents( $proposalId, $catId ) ) !== false ) {
			# there is a stat in cell
			$this->cellTemplateParam['percents'] = $percents . '%';
			# template has to be rendered immediately, because $this->cellTemplateParam[] are used as pointers and thus,
			# will always be overwritten
			return QP_Renderer::renderTagArray( $this->cellTemplate );
		} else {
			return $inp;
		}
	}

	# setup a template for showresults=2
	function cellTemplate2() {
		# statical styles
		$percentstyle = '';
		if ( isset( $this->showResults['textcolor'] ) ) {
			$percentstyle = 'color:' . $this->showResults['textcolor'] . ';';
		}
		if ( isset( $this->showResults['textbackground'] ) ) {
			$percentstyle .= 'background:' . $this->showResults['textbackground'] . ';';
		}
		# html arrays used in templates below
		$bar = array( '__tag' => 'div', 'class' => 'stats1',
			0 => array( '__tag' => 'div', 'class' => 'bar0', 0 => &$this->cellTemplateParam['inp'] ),
			1 => array( '__tag' => 'div', 'class' => 'bar1', 'style' => &$this->cellTemplateParam['bar1style'], 0 => '&#160;' ),
			2 => array( '__tag' => 'div', 'class' => 'bar2', 'style' => &$this->cellTemplateParam['bar2style'], 0 => '&#160;' ),
			3 => array( '__tag' => 'div', 'class' => 'bar0', 'style' => $percentstyle, 0 => &$this->cellTemplateParam['percents'] )
		);
		$bar2 = array( '__tag' => 'div', 'class' => 'stats1',
			0 => array( '__tag' => 'div', 'class' => 'bar0', 0 => '&#160;' ),
			1 => &$bar[1],
			2 => &$bar[2],
			3 => &$bar[3]
		);
		# has two available templates ('bar','textinput')
		$this->cellTemplate = array(
			'bar' => $bar,
			'textinput' => array( '__tag' => 'table', 'class' => 'stats',
				0 => array( '__tag' => 'tr',
					0 => array( '__tag' => 'td', 0 => &$this->cellTemplateParam['inp'] ),
				),
				1 => array( '__tag' => 'tr',
					0 => array( '__tag' => 'td',
						0 => $bar2
					)
				)
			),
			# the following entries are not real templates, but pre-calculated values of css attributes taken from showresults parameter
			'bar1showres' => '',
			'bar2showres' => ''
		);
		# dynamical styles, width: in percents will be added during rendering in addShowResults
		if ( isset( $this->showResults['color'] ) ) {
			$this->cellTemplate['bar1showres'] .= 'background:' . $this->showResults['color'] . ';';
		}
		if ( isset( $this->showResults['background'] ) ) {
			$this->cellTemplate['bar2showres'] .= 'background:' . $this->showResults['background'] . ';';
		}
	}

	# transform input according to showresults=2 (bars)
	# *** warning! parameters should be passed only by value, not by reference ***
	function addShowResults2( $inp, $proposalId, $catId ) {
		$this->cellTemplateParam['inp'] = $inp;
		$this->cellTemplateParam['percents'] = '&#160;';
		if ( ( $percents = $this->ctrl->getPercents( $proposalId, $catId ) ) !== false ) {
			# there is a stat in cell
			$this->cellTemplateParam['percents'] = $percents . '%';
			$this->cellTemplateParam['bar1style'] = 'width:' . $percents . 'px;' . $this->cellTemplate[ 'bar1showres' ];
			$this->cellTemplateParam['bar2style'] = 'width:' . ( 100 - $percents ) . 'px;' . $this->cellTemplate[ 'bar2showres' ];
			if ( $inp['type'] == 'text' ) {
				return qp_Renderer::renderTagArray( $this->cellTemplate['textinput'] );
			} else {
				return qp_Renderer::renderTagArray( $this->cellTemplate['bar'] );
			}
		} else {
			return $inp;
		}
	}
	/*** end of cell templates ***/

} /* end of qp_TabularQuestionView class */
