<?php

/**
 * Course pager, primarily for Special:Courses.
 *
 * @since 0.1
 *
 * @file EPCoursePager.php
 * @ingroup EductaionProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPCoursePager extends EPPager {

	/**
	 * Constructor.
	 *
	 * @param IContextSource $context
	 * @param array $conds
	 */
	public function __construct( IContextSource $context, array $conds = array() ) {
		parent::__construct( $context, $conds, 'EPCourse' );
	}

	/**
	 * (non-PHPdoc)
	 * @see TablePager::getFieldNames()
	 */
	public function getFieldNames() {
		$fields = parent::getFieldNameList( array(
			'name',
			'org_id',
		) );
		
		$fields[0] = ''; // This is a hack to get an extra colum for the control links.
		return $fields;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see TablePager::getRowClass()
	 */
	function getRowClass( $row ) {
		return 'ep-course-row';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see TablePager::getTableClass()
	 */
	public function getTableClass(){
		return 'TablePager ep-courses';
	}

	/**
	 * (non-PHPdoc)
	 * @see EPPager::getFormattedValue()
	 */
	protected function getFormattedValue( $name, $value ) {
		switch ( $name ) {
			case 'name':
				$value = Linker::linkKnown(
					SpecialPage::getTitleFor( 'Course', $value ),
					$value
				);
				break;
			case 'org_id':
				$value = EPOrg::selectRow( 'name', array( 'id' => $value ) )->getField( 'name' );
				
				$value = Linker::linkKnown(
					SpecialPage::getTitleFor( 'Institution', $value ),
					$value
				);
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
			'name',
		);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EPPager::getFilterOptions()
	 */
	protected function getFilterOptions() {
		return array(
			'org_id' => array(
				'type' => 'select',
				'options' => array_merge(
					array( '' => '' ),
					EPOrg::getOrgOptions( EPOrg::select( array( 'name', 'id' ) ) )
				),
				'value' => '',
				'datatype' => 'int',
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
			SpecialPage::getTitleFor( 'Course', $item->getField( 'name' ) ),
			wfMsg( 'view' )
		);
		
		if ( $this->getUser()->isAllowed( 'epadmin' ) ) {
			$links[] = $value = Linker::linkKnown(
				SpecialPage::getTitleFor( 'EditCourse', $item->getField( 'name' ) ),
				wfMsg( 'edit' )
			);
			
			$links[] = $this->getDeletionLink( 'term', $item->getId() );
		}
		
		return $links;
	}

}
