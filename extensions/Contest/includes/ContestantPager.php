<?php

/**
 * Contestant pager, for on Special:Contest
 * 
 * @since 0.1
 * 
 * @file ContestantPager.php
 * @ingroup Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ContestantPager extends TablePager {
	
	protected $conds;
	protected $page;

	public function __construct( $page, $conds ) {
		$this->page = $page;
		$this->conds = $conds;
		$this->mDefaultDirection = true;
		
		parent::__construct();
	}

	public function getFieldNames() {
		static $headers = null;

		if ( is_null( $headers ) ) {
			$headers = array(
				'contestant_id' => 'contest-contestant-id',
				'contestant_volunteer' => 'contest-contestant-volunteer',
				'contestant_wmf' => 'contest-contestant-wmf',
				'contestant_comment_count' => 'contest-contestant-commentcount',
				'contestant_overall_rating' => 'contest-contestant-overallrating',
			);
			
			$headers = array_map( 'wfMsg', $headers );
		}

		return $headers;
	}

	function formatRow( $row ) {
		$this->mCurrentRow = $row;  	# In case formatValue etc need to know
		$s = Xml::openElement( 'tr', $this->getRowAttrs($row) );
		
		foreach ( $this->getFieldNames() as $field => $name ) {
			$value = isset( $row->$field ) ? $row->$field : null;
			$formatted = strval( $this->formatValue( $field, $value ) );
			
			if ( $formatted == '' ) {
				$formatted = '&#160;';
			}
			$s .= Xml::tags( 'td', $this->getCellAttrs( $field, $value ), $formatted );
		}
		
		
		
		$s .= "</tr>\n";
		
		return $s;
	}
	
	public function formatValue( $name, $value ) {
		switch ( $name ) {
			case 'contestant_volunteer': case 'contestant_wmf':
				$value = wfMsg( 'contest-contestant-' . ( $value === '1' ? 'yes' : 'no' ) );
				break;
		}
		
		return $value;
	}

	function getQueryInfo() {
		$info = array(
			'tables' => array( 'contest_contestants' ),
			'fields' => array(
				'contestant_id',
				'contestant_volunteer',
				'contestant_wmf',
			),
			'conds' => $this->conds,
		);

		return $info;
	}

	public function getTableClass(){
		return 'TablePager contest-contestants';
	}

	function getIndexField() {
		return 'contestant_id';
	}

	function getDefaultSort() {
		return 'contestant_id';
	}

	function isFieldSortable( $name ) {
		return in_array(
			$name,
			array(
				'contestant_id',
				'contestant_volunteer',
				'contestant_wmf'
			)
		);
	}

	function getTitle() {
		return $this->page->getFullTitle();
	}
	
}
