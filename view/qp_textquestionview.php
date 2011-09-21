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
 * Manipulates the list of text question view tokens
 * for one row (combined proposal/categories definition).
 * One proposal line.
 */
class qp_TextQuestionViewTokens {

	# $this->tklist will contain parsed tokens for question view;
	#   elements of string type contain proposal parts;
	#   elements of stdClass :
	#     property 'options' indicates current category options list
	#     property 'error' indicates error message
	var $tklist = array();

	function reset() {
		$this->tklist = array();
	}

	function addProposalPart( $prop ) {
		$this->tklist[] = $prop;
	}

	/**
	 * Creates viewtokens entry with current category definition
	 * @param  $opt  qp_TextQuestionOptions
	 *         should contain "closed" category definition with prepared
	 *         category input options
	 * @param  $name  string  name of input/select element (used in the view)
	 * @param  $text_answer  string user's POSTed category answer
	 *         (empty string '' means no answer)
	 * @return  stdClass object with viewtokens entry
	 */
	function addCatDef( qp_TextQuestionOptions $opt, $name, $text_answer, $unanswered ) {
		# $catdef instanceof stdClass properties:
		# property 'options' stores an array of user options
		#          Multiple options will be selected from the list
		#          Single option will be displayed as text input
		# property 'name' contains name of input element
		# property 'value' contains value previousely chosen
		#          by user (if any)
		# property 'textwidth' may optionally override default
		#          text input width
		# property 'unanswered'  boolean
		#          true - the question was POSTed but category is unanswered
		#          false - the question was not POSTed or category is answered
		$catdef = (object) array(
			'options' => $opt->input_options,
			'name' => $name,
			'value' => $text_answer,
			'unanswered' => $unanswered
		);
		if ( !is_null( $opt->textwidth ) ) {
			$catdef->textwidth = $opt->textwidth;
		}
		$this->tklist[] = $catdef;
	}

	/**
	 * Adds new non-empty error message to the list of parsed tokens (viewtokens)
	 * @param  $errmsg  string  html error message
	 */
	function prependErrorToken( $errmsg ) {
		# note: error message can be added in the middle of the list,
		# for any category, if desired
		if ( $errmsg !== '' ) {
			# usually only the first error message is returned
			array_unshift( $this->tklist, (object) array( 'error'=> $errmsg ) );
		}
	}

	/**
	 * Applies interpretation script category error messages
	 * to the current proposal line.
	 * @param   $prop_desc  array
	 *          keys are category numbers (indexes)
	 *          values are interpretation script-generated error messages
	 * @param   $view  an instance of current question view
	 * @return  boolean true when at least one category was found in the list
	 *          false otherwise
	 */
	function applyInterpErrors( $prop_desc, qp_TextQuestionView $view ) {
		$foundCats = false;
		$cat_id = -1;
		foreach ( $this->tklist as &$token ) {
			if ( is_object( $token ) && property_exists( $token, 'options' ) ) {
				# found a category definition
				$cat_id++;
				if ( isset( $prop_desc[$cat_id] ) ) {
					$foundCats = true;
					# whether to use custom or standard error message
					if ( !is_string( $cat_desc = $prop_desc[$cat_id] ) ) {
						$cat_desc = wfMsg( 'qp_interpetation_wrong_answer' );
					}
					# mark the input to highlight it during the rendering
					if ( ( $msg = $view->bodyErrorMessage( $cat_desc, '', false ) ) !=='' ) {
						# we call with question state = '', so the returned $msg never should be empty
						# unless there was a syntax error, however during the interpretation stage there
						# should be no syntax errors, so we can assume that $msg is never equal to ''
						$token->interpError = $msg;
					}
				}
			}
		}
		return $foundCats;
	}

} /* end of qp_TextQuestionViewTokens */

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
	function addProposal( $proposalId, qp_TextQuestionViewTokens $viewtokens ) {
		$this->pview[$proposalId] = array(
			'tokens' => $viewtokens,
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
					$propview['tokens']->prependErrorToken( $this->bodyErrorMessage( $prop_desc, '', false ) );
					$propview['className'] = 'proposalerror';
					continue;
				}
				# specified category of proposal has errors;
				# scan the category views row to highlight erroneous categories
				$foundCats = $propview['tokens']->applyInterpErrors( $prop_desc, $this );
				if ( !$foundCats ) {
					# there are category errors specified in interpretation result;
					# however none of them are found in proposal's view
					# generate error for the whole proposal
					$propview['tokens']->prependErrorToken( $this->bodyErrorMessage( wfMsg( 'qp_interpetation_wrong_answer' ), '', false ) );
					$propview['className'] = 'proposalerror';
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
		foreach ( $this->pview as &$viewtokens ) {
			$prop = $this->renderParsedProposal( $viewtokens['tokens']->tklist );
			$rowattrs = array( 'class' => $viewtokens['className'] );
			qp_Renderer::addRow( $questionTable, $prop, $rowattrs );
		}
		return $questionTable;
	}

} /* end of qp_TextQuestionView class */
