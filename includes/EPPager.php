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

}
