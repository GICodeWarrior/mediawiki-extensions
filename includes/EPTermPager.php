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
	 * @see EPPager::getFields()
	 */
	public function getFields() {
		return array(
			'id',
			'course_id',
			'year',
			'start',
			'end',
		);
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
					htmlspecialchars( $value )
				);
				break;
			case 'course_id':
				$value = EPCourse::selectRow( 'name', array( 'id' => $value ) )->getField( 'name' );
				
				$value = Linker::linkKnown(
					SpecialPage::getTitleFor( 'Course', $value ),
					htmlspecialchars( $value )
				);
				break;
			case 'year':
				break;
			case 'start': case 'end':
				$value = $this->getLanguage()->date( $value );
				break;
			case '_status':
				$value = htmlspecialchars( EPTerm::getStatusMessage( $this->currentObject->getStatus() ) );
		}

		return $value;
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
	 * @see EPPager::getFieldNames()
	 */
	public function getFieldNames() {
		$fields = parent::getFieldNames();

		if ( array_key_exists( 'course_id', $this->conds ) && array_key_exists( 'org_id', $fields ) ) {
			unset( $fields['org_id'] );
		}

		$fields = wfArrayInsertAfter( $fields, array( '_status' => 'status' ), 'end' );

		return $fields;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EPPager::getFilterOptions()
	 */
	protected function getFilterOptions() {
		$options = array();

		if ( !array_key_exists( 'course_id', $this->conds ) ) {
			$options['course_id'] = array(
				'type' => 'select',
				'options' => array_merge(
					array( '' => '' ),
					EPCourse::getCourseOptions( EPCourse::select( array( 'name', 'id' ) ) )
				),
				'value' => '',
				'datatype' => 'int',
			);

			$options['org_id'] = array(
				'type' => 'select',
				'options' => array_merge(
					array( '' => '' ),
					EPOrg::getOrgOptions( EPOrg::select( array( 'name', 'id' ) ) )
				),
				'value' => '',
				'datatype' => 'int',
			);
		}

		$years = EPTerm::selectFields( 'year', array(), array( 'DISTINCT' ), array(), true );
		asort( $years, SORT_NUMERIC );
		$years = array_merge( array( '' ), $years );
		$years = array_combine( $years, $years );

		$options['year'] = array(
			'type' => 'select',
			'options' => $years,
			'value' => '',
		);

		$options['status'] = array(
			'type' => 'select',
			'options' => array_merge(
				array( '' => '' ),
				EPTerm::getStatuses()
			),
			'value' => '',
		);

		return $options;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EPPager::getControlLinks()
	 */
	protected function getControlLinks( EPDBObject $item ) {
		$links = parent::getControlLinks( $item );
		
		$links[] = $value = Linker::linkKnown(
			SpecialPage::getTitleFor( 'Term', $item->getId() ),
			wfMsgHtml( 'view' )
		);
		
		if ( $this->getUser()->isAllowed( 'epadmin' ) ) {
			$links[] = $value = Linker::linkKnown(
				SpecialPage::getTitleFor( 'EditTerm', $item->getId() ),
				wfMsgHtml( 'edit' )
			);
			
			$links[] = $this->getDeletionLink( 'term', $item->getId() );
		}
		
		return $links;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EPPager::getMultipleItemActions()
	 */
	protected function getMultipleItemActions() {
		$actions = parent::getMultipleItemActions();

		return $actions;
	}

	/**
	 * (non-PHPdoc)
	 * @see EPPager::getConditions()
	 */
	protected function getConditions() {
		$conds = parent::getConditions();

		if ( array_key_exists( 'status', $conds ) ) {
			$now = wfGetDB( DB_SLAVE )->addQuotes( wfTimestampNow() );

			switch ( $conds['status'] ) {
				case 'passed':
					$conds[] = 'end < ' . $now;
					break;
				case 'planned':
					$conds[] = 'start > ' . $now;
					break;
				case 'current':
					$conds[] = 'end >= ' . $now;
					$conds[] = 'start <= ' . $now;
					break;
			}

			unset( $conds['status'] );
		}

		return $conds;
	}

}
