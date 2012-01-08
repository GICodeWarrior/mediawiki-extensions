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
		parent::__construct( $context, $conds, 'EPOrg' );
	}

	/**
	 * (non-PHPdoc)
	 * @see EPPager::getFields()
	 */
	public function getFields() {
		return array(
			'name',
			'city',
			'country',
			'courses',
			'terms',
			'mentors',
			'students',
		);
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
					htmlspecialchars( $value )
				);
				break;
			case 'country':
				$countries = array_flip( efEpGetCountryOptions( $this->getLanguage()->getCode() ) );
				$value = htmlspecialchars( $countries[$value] );
				break;
			case 'courses': case 'mentors': case 'students': case 'terms':
				$rawValue = $value;
				$value = htmlspecialchars( $this->getLanguage()->formatNum( $value ) );

				if ( $rawValue > 0 && in_array( $name, array( 'terms', 'courses' ) ) ) {
					$value = Linker::linkKnown(
						SpecialPage::getTitleFor( $this->getLanguage()->ucfirst( $name ) ),
						$value,
						array(),
						array( 'org_id' => $this->currentObject->getId() )
					);
				}

				break;
		}

		return $value;
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
			'courses',
			'mentors',
			'students',
			'terms',
			'terms',
		);
	}

	function getDefaultSort() {
		$c = $this->className; // Yeah, this is needed in PHP 5.3 >_>
		return $c::getPrefixedField( 'name' );
	}

	/**
	 * (non-PHPdoc)
	 * @see EPPager::getFilterOptions()
	 */
	protected function getFilterOptions() {
		return array(
			'country' => array(
				'type' => 'select',
				'options' => efEpGetCountryOptions( $this->getLanguage()->getCode() ),
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
			wfMsgHtml( 'view' )
		);
		
		if ( $this->getUser()->isAllowed( 'epadmin' ) ) {
			$links[] = $value = Linker::linkKnown(
				SpecialPage::getTitleFor( 'EditInstitution', $item->getField( 'name' ) ),
				wfMsgHtml( 'edit' )
			);
			
			$links[] = $this->getDeletionLink( 'org', $item->getId() );
		}
		
		return $links;
	}

}
