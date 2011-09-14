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
 * Stub view is used only to display questions which has errors;
 * However, this view also shows the _miminal_ set of methods that
 * real question view has to be implemented to work with pair controller
 * and base controller.
 */
class qp_StubQuestionView extends qp_AbstractView {

	# error message which occured during the question header parsing that will be output later at rendering stage
	var $headerErrorMessage = 'Unknown error';

	# begin of proposalView
	# these vars (and perhaps some more) should be part of separate proposalView,
	# todo: in the future create separate proposal view with $row and $text ?
	var $rawClass;
	# end of proposalView

	var $hview = array();
	# proposal views (indexed, sortable rows)
	var $pview = array();

	/**
	 * @param $parser
	 * @param $frame
	 */
	function __construct( &$parser, &$frame ) {
		parent::__construct( $parser, $frame );
	}

	/**
	 * Called for every proposal of the question
	 * todo: actually should be a member of separate small proposal view class
	 */
	function initProposalView() {
		$this->rawClass = 'proposal';
	}

	static function newFromBaseView( $baseView ) {
		return new self( $baseView->parser, $baseView->ppframe );
	}

	function isCompatibleController( $ctrl ) {
		return method_exists( $ctrl, 'parseBody' );
	}

	function setLayout( $layout, $textwidth ) {
		/* does nothing */
	}

	function setShowResults( $showresults ) {
		/* does nothing */
	}

	/**
	 * @param $tagarray  array / string row to add to the question's header
	 */
	function addHeader( $tagarray ) {
		$this->hview[] = $tagarray;
	}

	function addHeaderError() {
		$this->hview[] = array(
			array( '__tag' => 'td', 'class' => 'proposalerror', $this->headerErrorMessage )
		);
	}

	/**
	 * Adds table header row to question's view
	 * @param $row             tagarray representation of row
	 * @param $className       CSS class name of row
	 * @param $attribute_maps  translation of source attributes into html attributes (see qp_Renderer class)
	 */
	function addHeaderRow( $row, $className, $attribute_maps = null ) {
		$this->hview[] = (object) array(
			'row' => $row,
			'className' => $className,
			'attribute_maps' => $attribute_maps
		);
	}

	/**
	 * Outputs question body parser error/warning message; also set new controller state
	 * @param    $msg - text of message
	 * @param    $state - set new question controller state
	 *               note that the 'error' state cannot be changed and '' state cannot be set
	 * @param    $rawClass - string set rawClass value or false (do not set)
	 */
	function bodyErrorMessage( $msg, $state, $rawClass = 'proposalerror' ) {
		$prev_state = $this->ctrl->getState();
		# do not clear previous errors (do not call setState() when $state == '')
		if ( $state != '' ) {
			$this->ctrl->setState( $state, $msg );
		}
		# return the message only for the first error occured
		# (this one has to be short, because title attribute is being used)
		if ( is_string( $rawClass ) ) {
			$this->rawClass = $rawClass;
		}
		# show only the first error, when the state is not clean (not '')
		return ( $prev_state == '' ) ? '<span class="proposalerror" title="' . qp_Setup::specialchars( $msg ) . '">???</span> ' : '';
	}

	/**
	 * Render script-generated proposal errors, when available (quiz mode)
	 * Note: not being called in stats mode
	 * todo: implement separate category error hints in addition to the
	 * whole proposal row error hints (especially useful for text questions)
	 */
	function renderInterpErrors() {
		if ( ( $propErrors = $this->ctrl->getProposalsErrors() ) === false ) {
			return;
		}
		foreach ( $this->pview as $prop_id => &$propview ) {
			if ( isset( $propErrors[$prop_id] ) ) {
				$msg = is_string( $propErrors[$prop_id] ) ? $propErrors[$prop_id] : wfMsg( 'qp_interpetation_wrong_answer' );
				$propview->text = $this->bodyErrorMessage( $msg, '', false ) . $propview->text;
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
			qp_Renderer::addRow( $questionTable, $row, $rowattrs, 'th', $attribute_maps );
		}
		return $questionTable;
	}

	/**
	 * todo: unfortunately, rendering of the question also conditionally modifies
	 * state of poll controller
	 * @modifies parent controller
	 * @return  string  html representation of the question
	 */
	function renderQuestion() {
		$output_table = array( '__tag' => 'table', '__end' => "\n", 'class' => 'object' );
		# Determine the side border color the question.
		if ( $this->ctrl->getState() != '' ) {
			if ( isset( $output_table['class'] ) ) {
				$output_table['class'] .= ' error_mark';
			} else {
				$output_table['class'] = 'error_mark';
			}
			# set poll controller state according to question controller state
			$this->ctrl->applyStateToParent();
		}
		$output_table[] = array( '__tag' => 'tbody', '__end' => "\n", 0 => $this->renderTable() );
		$tags = array( '__tag' => 'div', '__end' => "\n", 'class' => 'question',
			0 => array( '__tag' => 'div', '__end' => "\n", 'class' => 'header',
				0 => array( '__tag' => 'span', 'class' => 'questionId', 0 => $this->ctrl->usedId )
			),
			1 => array( '__tag' => 'div', 0 => $this->rtp( $this->ctrl->mCommonQuestion ) )
		);
		$tags[] = &$output_table;
		return qp_Renderer::renderTagArray( $tags );
	}

	/*** cell templates ***/

	function hasShowResults() {
		return false;
	}

	/*** end of cell templates ***/

} /* end of qp_StubQuestionView class */
