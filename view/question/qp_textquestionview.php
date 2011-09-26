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
 * Stores question proposals views (see qp_textqestion.php) and
 * allows to modify these for results of quizes at the later stage (see qp_poll.php)
 * An attempt to make somewhat cleaner question view
 * todo: further refactoring of views for different question types
 */
class qp_TextQuestionView extends qp_StubQuestionView {

	var $textInputStyle = '';

	/**
	 * @param $parser
	 * @param $frame
	 * @param  $showResults     poll's showResults (may be overriden in the question)
	 */
	function __construct( &$parser, &$frame, $showResults ) {
		parent::__construct( $parser, $frame );
		/* todo: implement showResults */
	}

	static function newFromBaseView( $baseView ) {
		return new self( $baseView->parser, $baseView->ppframe, $baseView->showResults );
	}

	function setLayout( $layout, $textwidth ) {
		/* todo: implement vertical layout */
		if ( $textwidth !== null ) {
			$textwidth = intval( $textwidth );
			if ( $textwidth > 0 ) {
				$this->textInputStyle = 'width:' . $textwidth . 'em;';
			}
		}
	}

	/**
	 * Add the list of parsed viewtokens matching current proposal / categories row
	 */
	function addProposal( $proposalId, qp_TextQuestionProposalView $propview ) {
		$this->pviews[$proposalId] = $propview;
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
			if ( isset( $this->pviews[$prop_id] ) ) {
				# the whole proposal line has errors
				$propview = &$this->pviews[$prop_id];
				if ( !is_array( $prop_desc ) ) {
					if ( !is_string( $prop_desc ) ) {
						$prop_desc = wfMsg( 'qp_interpetation_wrong_answer' );
					}
					$propview->prependErrorToken( $prop_desc, '', false );
					$propview->rowClass = 'proposalerror';
					continue;
				}
				# specified category of proposal has errors;
				# scan the category views row to highlight erroneous categories
				$foundCats = $propview->applyInterpErrors( $prop_desc );
				if ( !$foundCats ) {
					# there are category errors specified in interpretation result;
					# however none of them are found in proposal's view
					# generate error for the whole proposal
					$propview->prependErrorToken( wfMsg( 'qp_interpetation_wrong_answer' ), '', false );
					$propview->rowClass = 'proposalerror';
				}
			}
		}
	}

	/**
	 *
	 */
	function renderParsedProposal( &$viewtokens ) {
		$row = array();
		foreach ( $viewtokens as $elem ) {
			if ( is_object( $elem ) ) {
				if ( isset( $elem->options ) ) {
					$className = 'cat_part';
					if ( $this->ctrl->mSubType === 'requireAllCategories' && $elem->unanswered ) {
						$className = 'cat_noanswer';
					}
					if ( isset( $elem->interpError ) ) {
						$className = 'cat_noanswer';
						# create view for proposal/category error message
						$row[] = array(
							'__tag' => 'span',
							'class' => 'proposalerror',
							$elem->interpError
						);
					}
					# create view for the input options part
					if ( count( $elem->options ) === 1 ) {
						# one option produces html text input
						$value = $elem->value;
						# check, whether the definition of category has "pre-filled" value
						# single, non-unanswered, non-empty option is a pre-filled value
						if ( !$elem->unanswered && $elem->value === '' && $elem->options[0] !== '' ) {
							# input text pre-fill
							$value = $elem->options[0];
							$className = 'cat_prefilled';
						}
						$input = array(
							'__tag' => 'input',
							'class' => $className,
							'type' => 'text',
							'name' => $elem->name,
							'value' => qp_Setup::specialchars( $value )
						);
						if ( $this->textInputStyle != '' ) {
							# apply poll's textwidth attribute
							$input['style'] = $this->textInputStyle;
						}
						if ( isset( $elem->textwidth ) ) {
							# apply current category textwidth "option"
							$input['style'] = 'width:' . intval( $elem->textwidth ) . 'em;';
						}
						$row[] = $input;
						continue;
					}
					# multiple options produce html select / options
					if ( $elem->options[0] !== '' ) {
						# default element in select/option set always must be empty option
						array_unshift( $elem->options, '' );
					}
					$html_options = array();
					foreach ( $elem->options as $option ) {
						$html_option = array(
							'__tag' => 'option',
							'value' => qp_Setup::entities( $option ),
							qp_Setup::specialchars( $option )
						);
						if ( $option === $elem->value ) {
							$html_option['selected'] = 'selected';
						}
						$html_options[] = $html_option;
					}
					$row[] = array(
						'__tag' => 'select',
						'class' => $className,
						'name' => $elem->name,
						$html_options
					);
				} elseif ( isset( $elem->error ) ) {
					# create view for proposal/category error message
					$row[] = array(
						'__tag' => 'span',
						'class' => 'proposalerror',
						$elem->error
					);
				} else {
					throw new MWException( 'Invalid view token encountered in ' . __METHOD__ );
				}
			} else {
				# create view for the proposal part
				$row[] = array(
					'__tag' => 'span',
					'class' => 'prop_part',
					$this->rtp( $elem )
				);
			}
		}
		# todo: add class for errors
		return array( $row );
	}

	/**
	 * Renders question table with header and proposal views
	 */
	function renderTable() {
		$questionTable = array();
		# add header views to $questionTable
		foreach ( $this->hviews as $header ) {
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
		foreach ( $this->pviews as &$propview ) {
			$prop = $this->renderParsedProposal( $propview->viewtokens );
			$rowattrs = array( 'class' => $propview->rowClass );
			qp_Renderer::addRow( $questionTable, $prop, $rowattrs );
		}
		return $questionTable;
	}

} /* end of qp_TextQuestionView class */
