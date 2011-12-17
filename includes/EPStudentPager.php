<?php

/**
 * Student pager, primarily for Special:Students.
 *
 * @since 0.1
 *
 * @file EPStudentPager.php
 * @ingroup EductaionProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPStudentPager extends EPPager {

	/**
	 * Constructor.
	 *
	 * @param IContextSource $context
	 * @param array $conds
	 */
	public function __construct( IContextSource $context, array $conds = array() ) {
		$this->mDefaultDirection = true;

		// when MW 1.19 becomes min, we want to pass an IContextSource $context here.
		parent::__construct( $context, $conds, 'EPStudent' );
	}

	/**
	 * (non-PHPdoc)
	 * @see TablePager::getFieldNames()
	 */
	public function getFieldNames() {
		return parent::getFieldNameList( array(
			// TODO
		) ); 
	}
	
	/**
	 * (non-PHPdoc)
	 * @see TablePager::getRowClass()
	 */
	function getRowClass( $row ) {
		return 'ep-student-row';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see TablePager::getTableClass()
	 */
	public function getTableClass(){
		return 'TablePager ep-students';
	}

	/**
	 * (non-PHPdoc)
	 * @see TablePager::formatValue()
	 */
	public function formatValue( $name, $value ) {
		switch ( $name ) {
			case '': // TODO
				$value = $value;
				break;
		}

		return $value;
	}

	function getDefaultSort() {
		return ''; // TODO
	}

	/**
	 * (non-PHPdoc)
	 * @see EPPager::getSortableFields()
	 */
	protected function getSortableFields() {
		return array();
	}

}
