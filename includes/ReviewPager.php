<?php

/**
 * Review pager, for on Special:Reviews and Special:MyReviews
 *
 * @since 0.1
 *
 * @file ReviewPager.php
 * @ingroup Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ReviewPager extends TablePager {

	/**
	 * Query conditions, full field names (ie inc prefix).
	 * @var array
	 */
	protected $conds;

	/**
	 * Constructor.
	 *
	 * @param array $conds
	 */
	public function __construct( array $conds ) {
		$this->conds = $conds;
		$this->mDefaultDirection = true;

		// when MW 1.19 becomes min, we want to pass an IContextSource $context here.
		parent::__construct();
	}

	/**
	 * Gets the title of a challenge given it's id.
	 *
	 * @since 0.1
	 *
	 * @param integer $challengeId
	 * @throws MWException
	 */
	protected function getChallengeTitle( $challengeId ) {
		if ( array_key_exists( $challengeId, $this->challengeTitles ) ) {
			return $this->challengeTitles[$challengeId];
		}
		else {
			throw new MWException( 'Attempt to get non-set challenge title' );
		}
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
	public function getLang() {
		return version_compare( $GLOBALS['wgVersion'], '1.18', '>' ) ? parent::getLang() : $GLOBALS['wgLang'];
	}

	/**
	 * @return array
	 */
	public function getFieldNames() {
		static $headers = null;

		if ( is_null( $headers ) ) {
			$headers = array(
				// TODO
			);

			$headers = array_map( 'wfMsg', $headers );
		}

		return $headers;
	}

	/**
	 * @param $row
	 * @return string
	 */
	function getRowClass( $row ) {
		return 'review-row';
	}

	/**
	 * @param $name
	 * @param $value
	 * @return string
	 */
	public function formatValue( $name, $value ) {
		switch ( $name ) {
			case '':
				
				break;
		}

		return $value;
	}

	function getQueryInfo() {
		return array(
			'tables' => array( 'reviews' ),
			'fields' => array(
				// TODO
			),
			'conds' => $this->conds,
		);
	}

	public function getTableClass(){
		return 'TablePager review-contestants';
	}

	function getIndexField() {
		return 'review_id';
	}

	function getDefaultSort() {
		return 'review_time';
	}

	function isFieldSortable( $name ) {
		return in_array(
			$name,
			array(
				// TODO
			)
		);
	}

}
