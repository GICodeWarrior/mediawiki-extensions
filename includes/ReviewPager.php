<?php

/**
 * Review pager, for on Special:Reviews and Special:MyReviews
 *
 * TODO: might be better to directly derive from IndexPager
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
	 * Query conditions, full field names (inc prefix).
	 * @var array
	 */
	protected $conds;
	
	/**
	 * Review object of $this->currentRow.
	 * @var Review
	 */
	protected $currentReview;
	
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
		
		$this->getOutput()->addModules( 'ext.reviews.pager' );
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

	function getStartBody() {
		return '<table class="reviews-pager-table"><tbody>';
	}
	
	/**
	 * @return array
	 */
	public function getFieldNames() {
		static $headers = null;

		if ( is_null( $headers ) ) {
			$headers = array(
				'review_title' => 'reviews-pager-title',
				'review_page_id' => 'reviews-pager-page',
				'review_post_time' => 'reviews-pager-post-time',
			);
			
			if ( !array_key_exists( 'review_user_id', $this->conds ) ) {
				$headers['review_user_id'] = 'reviews-pager-user';
			}
			
			$headers['review_state'] = 'reviews-pager-state';
			$headers['review_rating'] = 'reviews-pager-rating';

			$headers = array_map( 'wfMsg', $headers );
		}

		return $headers;
	}
	
	function formatValue( $name, $value ) {}

	/**
	 * @param $row
	 * @return string
	 */
	function getRowClass( $row ) {
		return 'review-row';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see TablePager::formatRow()
	 */
	function formatRow( $row ) {
		$this->currentReview = Review::newFromDBResult( $row );
		return '<tr><td>' . $this->currentReview->getHTML( $this->getUser(), $this->getLanguage() ) . '</td></tr>';
	}

	function getQueryInfo() {
		return array(
			'tables' => array( 'reviews' ),
			'fields' => Review::getPrefixedFields( Review::getFieldNames() ),
			'conds' => Review::getPrefixedValues( $this->conds ),
		);
	}

	public function getTableClass(){
		return 'TablePager review-contestants';
	}

	function getIndexField() {
		return 'review_id';
	}

	function getDefaultSort() {
		return 'review_post_time';
	}

	function isFieldSortable( $name ) {
		return in_array(
			$name,
			array(
				'review_post_time',
				'review_state',
				'review_rating',
			)
		);
	}

}
