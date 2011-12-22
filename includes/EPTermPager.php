<?php

/**
 * Term pager, primarily for Special:Terms.
 *
 * @since 0.1
 *
 * @file EPTermPager.php
 * @ingroup EductaionProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPTermPager extends EPPager {

	/**
	 * Constructor.
	 *
	 * @param IContextSource $context
	 * @param array $conds
	 */
	public function __construct( IContextSource $context, array $conds = array() ) {
		parent::__construct( $context, $conds, 'EPTerm' );
	}

	/**
	 * (non-PHPdoc)
	 * @see TablePager::getFieldNames()
	 */
	public function getFieldNames() {
		$fields = parent::getFieldNameList( array(
			'id',
			'course_id',
			'year',
			'start',
			'end',
		) );
		
		$fields[0] = ''; // This is a hack to get an extra colum for the control links.
		return $fields;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see TablePager::getRowClass()
	 */
	function getRowClass( $row ) {
		return 'ep-term-row';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see TablePager::getTableClass()
	 */
	public function getTableClass(){
		return 'TablePager ep-terms';
	}

	/**
	 * (non-PHPdoc)
	 * @see EPPager::getFormattedValue()
	 */
	public function getFormattedValue( $name, $value ) {
		switch ( $name ) {
			case 'id':
				$value = Linker::linkKnown(
					SpecialPage::getTitleFor( 'Term', $value ),
					$value
				);
				break;
			case 'course_id':
				$value = EPCourse::selectRow( 'name', array( 'id' => $value ) )->getField( 'name' );
				
				$value = Linker::linkKnown(
					SpecialPage::getTitleFor( 'Course', $value ),
					$value
				);
				break;
			case 'year':
				break;
			case 'start': case 'end':
				$value = $this->getLanguage()->date( $value );
				break;
		}

		return $value;
	}

	function getDefaultSort() {
		return 'asc';
	}

	/**
	 * (non-PHPdoc)
	 * @see EPPager::getSortableFields()
	 */
	protected function getSortableFields() {
		return array(
			'id',
			'year',
			'start',
			'end',
		);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EPPager::getFilterOptions()
	 */
	protected function getFilterOptions() {
		$years = EPTerm::selectFields( 'year', array(), array( 'DISTINCT' ), array(), true );
		asort( $years, SORT_NUMERIC );
		$years = array_merge( array( '' ), $years );
		$years = array_combine( $years, $years );
		
		return array(
			'course_id' => array(
				'type' => 'select',
				'options' => array_merge(
					array( '' => '' ),
					EPCourse::getCourseOptions( EPCourse::select( array( 'name', 'id' ) ) )
				),
				'value' => '',
				'datatype' => 'int',
			),
			'year' => array(
				'type' => 'select',
				'options' => $years,
				'value' => '',
			),
		);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EPPager::getControlLinks()
	 */
	protected function getControlLinks( EPDBObject $item ) {
		$links = parent::getControlLinks( $item );
		
		$links[] = $value = Linker::linkKnown(
			SpecialPage::getTitleFor( 'Term', $item->getId() ),
			wfMsg( 'view' )
		);
		
		if ( $this->getUser()->isAllowed( 'epadmin' ) ) {
			$links[] = $value = Linker::linkKnown(
				SpecialPage::getTitleFor( 'EditTerm', $item->getId() ),
				wfMsg( 'edit' )
			);
			
			$links[] = $this->getDeletionLink( 'term', $item->getId() );
		}
		
		return $links;
	}

}
