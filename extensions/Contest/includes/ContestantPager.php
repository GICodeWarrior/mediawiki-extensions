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
		
		$this->getOutput()->addModules( 'contest.contestant.pager' );
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
		return version_compare( $GLOBALS['wgVersion'], '1.19', '>=' ) ? parent::getOutput() : $GLOBALS['wgOut'];
	}
	
	/**
	 * Get the Language being used for this instance.
	 * IndexPager extends ContextSource as of 1.19. 
	 *
	 * @since 0.1
	 *
	 * @return Language
	 */
	public function getLang() {
		return version_compare( $GLOBALS['wgVersion'], '1.19', '>=' ) ? parent::getLang() : $GLOBALS['wgLang'];
	}

	public function getFieldNames() {
		static $headers = null;

		if ( is_null( $headers ) ) {
			$headers = array(
				'contestant_id' => 'contest-contestant-id',
				'contestant_volunteer' => 'contest-contestant-volunteer',
				'contestant_wmf' => 'contest-contestant-wmf',
				'contestant_comments' => 'contest-contestant-commentcount',
				'contestant_rating' => 'contest-contestant-overallrating',
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
	
	function getRowAttrs( $row ) {
		return array_merge(
			parent::getRowAttrs( $row ),
			array( 'data-contestant-target' => SpecialPage::getTitleFor( 'Contestant', $row->contestant_id )->getLocalURL() )
		);
	}
	
	function getRowClass( $row ) {
		return 'contestant-row';
	}
	
	public function formatValue( $name, $value ) {
		switch ( $name ) {
			case 'contestant_id':
				$value = Html::element(
					'a',
					array(
						'href' => SpecialPage::getTitleFor( 'Contestant', $value )->getLocalURL()
					),
					$value
				);
				break;
			case 'contestant_volunteer': case 'contestant_wmf':
				$value = wfMsg( 'contest-contestant-' . ( $value === '1' ? 'yes' : 'no' ) );
				break;
			case 'contestant_comments':
				$value = $this->getLang()->formatNum( $value );
				break;
			case 'contestant_rating':
				$value = wfMsgExt(
					'contest-contestant-rating',
					'parsemag',
					$this->getLang()->formatNum( $value ),
					$this->getLang()->formatNum( $this->mCurrentRow->contestant_rating_count )
				);
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
				'contestant_comments',
				'contestant_rating',
				'contestant_rating_count',
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
				'contestant_wmf',
				'contestant_comments',
				'contestant_rating',
			)
		);
	}

	function getTitle() {
		return $this->page->getFullTitle();
	}
	
}
