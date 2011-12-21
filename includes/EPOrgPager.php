<?php

/**
 * Org pager, primarily for Special:Institutions.
 *
 * @since 0.1
 *
 * @file EPOrgPager.php
 * @ingroup EductaionProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPOrgPager extends EPPager {

	/**
	 * Constructor.
	 *
	 * @param IContextSource $context
	 * @param array $conds
	 */
	public function __construct( IContextSource $context, array $conds = array() ) {
		$this->mDefaultDirection = true;

		// when MW 1.19 becomes min, we want to pass an IContextSource $context here.
		parent::__construct( $context, $conds, 'EPOrg' );
	}

	/**
	 * (non-PHPdoc)
	 * @see TablePager::getFieldNames()
	 */
	public function getFieldNames() {
		$fields = parent::getFieldNameList( array(
			'name',
			'city',
			'country',
		) );

		$fields[0] = ''; // This is a hack to get an extra colum for the control links.
		return $fields;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see TablePager::getRowClass()
	 */
	function getRowClass( $row ) {
		return 'ep-org-row';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see TablePager::getTableClass()
	 */
	public function getTableClass(){
		return 'TablePager ep-orgs';
	}

	/**
	 * (non-PHPdoc)
	 * @see EPPager::getFormattedValue()
	 */
	public function getFormattedValue( $name, $value ) {
		switch ( $name ) {
			case 'name':
				$value = Linker::linkKnown(
					SpecialPage::getTitleFor( 'Institution', $value ),
					$value
				);
				break;
			case 'country':
				$countries = array_flip( efEpGetCountryOptions() );
				$value = $countries[$value];
				break;
		}

		return $value;
	}

	/**
	 * (non-PHPdoc)
	 * @see TablePager::getDefaultSort()
	 */
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
			'city',
			'country',
		);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EPPager::getFilterOptions()
	 */
	protected function getFilterOptions() {
		return array(
			'country' => array(
				'type' => 'select',
				'options' => efEpGetCountryOptions(),
				'value' => ''
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
			SpecialPage::getTitleFor( 'Institution', $item->getField( 'name' ) ),
			wfMsg( 'view' )
		);
		
		if ( $this->getUser()->isAllowed( 'epadmin' ) ) {
			$links[] = $value = Linker::linkKnown(
				SpecialPage::getTitleFor( 'EditInstitution', $item->getField( 'name' ) ),
				wfMsg( 'edit' )
			);
			
			$links[] = $value = Html::element(
				'a',
				array(
					'href' => '#',
					'class' => 'ep-pager-delete',
					'data-id' => $item->getId(),
					'data-type' => 'org',
				),
				wfMsg( 'delete' )
			);
		}
		
		return $links;
	}

}
