<?php

/**
 * Abstract class extensing the TablePager with common functions
 * for pagers listing EPDBObject deriving classes and some compatibility helpers.
 *
 * @since 0.1
 *
 * @file EPPager.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
abstract class EPPager extends TablePager {

	/**
	 * Query conditions, full field names (inc prefix).
	 * @since 0.1
	 * @var array
	 */
	protected $conds;
	
	/**
	 * Name of the class deriving from EPDBObject.
	 * @since 0.1
	 * @var string
	 */
	protected $className;

	/**
	 * EPDBObject object constructed from $this->currentRow.
	 * @since 0.1
	 * @var EPDBObject
	 */
	protected $currentObject;
	
	/**
	 * Constructor.
	 *
	 * @param array $conds
	 */
	public function __construct( array $conds, $className ) {
		$this->conds = $conds;
		$this->className = $className;
		
		// when MW 1.19 becomes min, we want to pass an IContextSource $context here.
		parent::__construct();
	}

	/**
	 * Get the OutputPage being used for this instance.
	 * IndexPager extends ContextSource as of 1.19.
	 *
	 * @since 0.1
	 *
	 * @return OutputPage
	 */
	public function getOutput() {
		return version_compare( $GLOBALS['wgVersion'], '1.18', '>' ) ? parent::getOutput() : $GLOBALS['wgOut'];
	}

	/**
	 * Get the Language being used for this instance.
	 * IndexPager extends ContextSource as of 1.19.
	 *
	 * @since 0.1
	 *
	 * @return Language
	 */
	public function getLanguage() {
		return version_compare( $GLOBALS['wgVersion'], '1.18', '>' ) ? parent::getLanguage() : $GLOBALS['wgLang'];
	}
	
	/**
	 * Get the User being used for this instance.
	 * IndexPager extends ContextSource as of 1.19.
	 *
	 * @since 0.1
	 *
	 * @return User
	 */
	public function getUser() {
		return version_compare( $GLOBALS['wgUser'], '1.18', '>' ) ? parent::getUser() : $GLOBALS['wgUser'];
	}
	
	/**
	 * (non-PHPdoc)
	 * @see TablePager::formatRow()
	 */
	function formatRow( $row ) {
		$c = $this->className; // Yeah, this is needed in PHP 5.3 >_>
		$this->currentReview = $c::newFromDBResult( $row );
		return parent::formatRow( $row );
	}

	function getIndexField() {
		$c = $this->className; // Yeah, this is needed in PHP 5.3 >_>
		return $c::getPrefixedField( 'id' );
	}
	
	function getQueryInfo() {
		$c = $this->className; // Yeah, this is needed in PHP 5.3 >_>
		return array(
			'tables' => array( $c::getDBTable() ),
			'fields' => $c::getFieldNames(),
			'conds' => $c::getPrefixedValues( $this->conds ),
		);
	}
	
	function isFieldSortable( $name ) {
		$c = $this->className; // Yeah, this is needed in PHP 5.3 >_>
		return in_array(
			$name,
			$c::getPrefixedFields( 'id' )
		);
	}
	
	/**
	 * Takes a list of (unprefixed) field names and return them in an associative array where
	 * the keys are the prefixed field names and the values are header messages.
	 * 
	 * @since 0.1
	 * 
	 * @param array $fields
	 * 
	 * @return array
	 */
	protected function getFieldNameList( array $fields ) {
		$headers = array();
		$c = $this->className;
		
		foreach ( $fields as $fieldName ) {
			$headers[$c::getPrefixedField( $fieldName )] = wfMsg(
				'educationprogram-pager-' . strtolower( $c ) . '-' . str_replace( '_', '-', $fieldName )
			);
		}
		
		return array_map( 'wfMsg', $headers );
	}
	
	/**
	 * Should return an array with the names of the fields that are sortable.
	 * 
	 * @since 0.1
	 * 
	 * @return array of string
	 */
	protected abstract function getSortableFields();
	
	/**
	 * Returns a list with the filter options.
	 * 
	 * @since 0.1
	 * 
	 * @return array 
	 */
	protected function getFilterOptions() {
		return array();
	}
	
	/**
	 * Gets the HTML for a filter control.
	 * 
	 * @since 0.1
	 * 
	 * @param boolean $hideWhenNoResults When true, there are no results, and no filters are applied, an empty string is returned. 
	 * 
	 * @return string
	 */
	protected function getFilterControl( $hideWhenNoResults ) {
		$filterOptions = $this->getFilterOptions();
		
		if ( count( $filterOptions ) < 1 ) {
			return '';
		}
		
		$this->addFilterValues( $filterOptions );
		
		if ( $hideWhenNoResults && $this->getNumRows() < 1 ) {
			$noFiltersSet = array_reduce( $filterOptions, function( $current, array $data ) {
				return $current && $data['value'] !== '' && !is_null( $data['value'] );
			}, true );
			
			if ( $noFiltersSet ) {
				return '';
			}
		}
		
		$controls = array();
		
		foreach ( $filterOptions as $optionName => $optionData ) {
			switch ( $optionData['type'] ) {
				case 'select':
					$select = new XmlSelect( $optionName, $optionName, $optionData['value'] );
					$select->addOptions( $optionData['options'] );
					$control = $select->getHTML();
					break;
			}
			
			$controls[] = $control;
		}
		
		$title = $this->getTitle( $this->subPage )->getFullText();
		
		return
 			'<fieldset>' .
				'<legend>' . wfMsgHtml( 'reviews-reviews-showonly' ) . '</legend>' .
				'<form method="post" action="' . htmlspecialchars( $GLOBALS['wgScript'] . '?title=' . $title ) . '">' .
					Html::hidden( 'title', $title ) .
					implode( '', $controls ) .
					'<input type="submit" value="' . wfMsgHtml( 'reviews-reviews-go' ) . '">' .
				'</form>' .
			'</fieldset>';
	}
	
	/**
	 * Changes the provided filter options list by replacing the values by what's set
	 * in the request, or as fallback, what's set in the session. 
	 * 
	 * @since 0.1
	 * 
	 * @param array $filterOptions
	 * 
	 * @return boolean If anything was changed from the default
	 */
	protected function addFilterValues( array &$filterOptions ) {
		$req = $this->getRequest();
		$changed = false;
		
		foreach ( $filterOptions as $optionName => &$optionData ) {
			if ( $req->getCheck( $optionName ) ) {
				$optionData['value'] = $req->getVal( $optionName );
				$req->setSessionData( __CLASS__ . $optionName, $optionData['value'] );
				$changed = true;
			}
			elseif ( !is_null( $req->getSessionData( __CLASS__ . $optionName ) ) ) {
				$optionData['value'] = $req->getSessionData( __CLASS__ . $optionName );
				$changed = true;
			}
		}
		
		return $changed;
	}

}
