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
	 * Context in which this pager is being shown.
	 * @since 0.1
	 * @var IContextSource
	 */
	protected $context;
	
	/**
	 * Constructor.
	 *
	 * @param IContextSource $context
	 * @param array $conds
	 * @param string $className
	 */
	public function __construct( IContextSource $context, array $conds, $className ) {
		$this->conds = $conds;
		$this->className = $className;
		$this->context = $context;
		
		if ( version_compare( $GLOBALS['wgVersion'], '1.18c', '>' ) ) {
			parent::__construct( $context );
		}
		else {
			parent::__construct();
		}
		
		$this->context->getOutput()->addModules( 'ep.pager' );
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
		return $this->context->getOutput();
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
		return method_exists( $this->context, 'getLanguage' ) ? $this->context->getLanguage() : $this->context->getLang();
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
		return $this->context->getUser();
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

	/**
	 * (non-PHPdoc)
	 * @see TablePager::getIndexField()
	 */
	function getIndexField() {
		$c = $this->className; // Yeah, this is needed in PHP 5.3 >_>
		return $c::getPrefixedField( 'id' );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see IndexPager::getQueryInfo()
	 */
	function getQueryInfo() {
		$c = $this->className; // Yeah, this is needed in PHP 5.3 >_> 
		return array(
			'tables' => array( $c::getDBTable() ),
			'fields' => $c::getPrefixedFields( $c::getFieldNames() ),
			'conds' => $c::getPrefixedValues( $this->getConditions() ),
		);
	}
	
	/**
	 * Get the conditions to use in the query.
	 * This is done by merging the filter controls conditions with those provided to the constructor.
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	protected function getConditions() {
		$req = $this->getRequest();
		$conds = array();
		
		$filterOptions = $this->getFilterOptions();
		$this->addFilterValues( $filterOptions, false );
		
		foreach ( $filterOptions as $optionName => $optionData ) {
			if ( array_key_exists( 'value', $optionData ) && $optionData['value'] !== '' ) {
				$conds[$optionName] = $optionData['value'];
			}
		}
		
		return array_merge( $conds, $this->conds );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see TablePager::isFieldSortable()
	 */
	function isFieldSortable( $name ) {
		$c = $this->className; // Yeah, this is needed in PHP 5.3 >_>
		return in_array(
			$name,
			$c::getPrefixedFields( $this->getSortableFields() )
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
			$headers[$c::getPrefixedField( $fieldName )] = $this->getMsg( 'header-' . $fieldName );
		}
		
		return $headers;
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
	public function getFilterControl( $hideWhenNoResults = true ) {
		$filterOptions = $this->getFilterOptions();
		
		if ( count( $filterOptions ) < 1 ) {
			return '';
		}
		
		$this->addFilterValues( $filterOptions );
		
		if ( $hideWhenNoResults && $this->getNumRows() < 1 ) {
			$noFiltersSet = array_reduce( $filterOptions, function( $current, array $data ) {
				return $current && ( $data['value'] === '' || is_null( $data['value'] ) );
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
			
			$control = '&#160;' . $this->getMsg( 'filter-' . $optionName ) . '&#160;' . $control;
			
			$controls[] = $control;
		}
		
		$title = $this->getTitle()->getFullText();
		
		return
 			'<fieldset>' .
				'<legend>' . wfMsgHtml( 'ep-pager-showonly' ) . '</legend>' .
				'<form method="post" action="' . htmlspecialchars( wfAppendQuery( $GLOBALS['wgScript'], array( 'title', $title ) ) ) . '">' .
					Html::hidden( 'title', $title ) .
					implode( '', $controls ) .
					'&#160;<input type="submit" class="ep-pager-go" value="' . wfMsgHtml( 'ep-pager-go' ) . '">' .
					'&#160;<button class="ep-pager-clear">' . wfMsgHtml( 'ep-pager-clear' ) . '</button>' .
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
	 * @param boolean $cast Should values with non-string type be casted (ie to have a select with int values have the correct val selected).
	 * 
	 * @return boolean If anything was changed from the default
	 */
	protected function addFilterValues( array &$filterOptions, $cast = true ) {
		$req = $this->getRequest();
		$changed = false;
		
		foreach ( $filterOptions as $optionName => &$optionData ) {
			if ( $req->getCheck( $optionName ) ) {
				$optionData['value'] = $req->getVal( $optionName );
				$req->setSessionData( get_called_class() . $optionName, $optionData['value'] );
				$changed = true;
				
				if ( $cast && array_key_exists( 'datatype', $optionData ) ) {
					switch ( $optionData['datatype'] ) {
						case 'int':
							$optionData['value'] = (int)$optionData['value'];
							break;
						case 'float':
							$optionData['value'] = (float)$optionData['value'];
							break;
					}
				}
			}
			elseif ( !is_null( $req->getSessionData( get_called_class() . $optionName ) ) ) {
				$optionData['value'] = $req->getSessionData( get_called_class() . $optionName );
				$changed = true;
			}
		}
		
		return $changed;
	}
	
	/**
	 * Takes a message key and prefixes it with the extension name and name of the pager,
	 * feeds it to wfMsg, and returns it.
	 * 
	 * @since 0.1
	 * 
	 * @param string $messageKey
	 * 
	 * @return string
	 */
	protected function getMsg( $messageKey ) {
		return wfMsg( strtolower( $this->className ) . 'pager-' . str_replace( '_', '-', $messageKey ) );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see TablePager::formatValue()
	 */
	public final function formatValue( $name, $value ) {
		$c = $this->className; // Yeah, this is needed in PHP 5.3 >_>
		return $this->getFormattedValue( $c::unprefixFieldName( $name ), $value );
	}
	
	/**
	 * Similar to TablePager::formatValue, but passes along the name of the field without prefix.
	 * 
	 * @param string $name
	 * @param string $value
	 * 
	 * @return string
	 */
	protected abstract function getFormattedValue( $name, $value );

}
