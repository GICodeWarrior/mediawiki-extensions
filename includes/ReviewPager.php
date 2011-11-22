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
	 * Query conditions, full field names (inc prefix).
	 * @var array
	 */
	protected $conds;

	/**
	 * Name of a special page to which the review titles should link.
	 * @var string|false $editPage
	 */
	protected $editPage;
	
	/**
	 * Constructor.
	 *
	 * @param array $conds
	 * @param string|false $editPage
	 */
	public function __construct( array $conds, $editPage = false ) {
		$this->conds = $conds;
		$this->mDefaultDirection = true;
		$this->editPage = $editPage;

		// when MW 1.19 becomes min, we want to pass an IContextSource $context here.
		parent::__construct();
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
				'review_title' => 'reviews-pager-title',
				'review_page_id' => 'reviews-pager-page',
				'review_post_time' => 'reviews-pager-post-time',
			);
			
			if ( !array_key_exists( 'review_user_id', $this->conds ) ) {
				$headers['review_user_id'] = 'reviews-pager-user';
			}
			
			$headers['review_state'] = 'reviews-pager-state';

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
			case 'review_post_time':
				$value = $this->getLang()->timeanddate( $value, true );
				break;
			case 'review_state':
				$value = Review::getStateMessage( $value );
				break;
			case 'review_page_id':
				$title = Title::newFromID( $value );
				$value = Html::element(
					'a',
					array( 'href' => $title->getLocalURL() ),
					$title->getFullText()
				);
				break;
			case 'review_user_id':
				$title = User::newFromId( $value )->getUserPage();
				$value = Html::element(
					'a',
					array( 'href' => $title->getLocalURL() ),
					$title->getFullText()
				);
				break;
			case 'review_title':
				if ( $this->editPage !== false ) {
					$value = Html::element(
						'a',
						array( 'href' => SpecialPage::getTitleFor( $this->editPage, $this->mCurrentRow->review_id )->getLocalURL() ),
						$value
					);
				}
				break;
		}

		return $value;
	}

	function getQueryInfo() {
		return array(
			'tables' => array( 'reviews' ),
			'fields' => array(
				'review_id',
				'review_post_time',
				'review_state',
				'review_title',
				'review_user_id',
				'review_page_id',
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
		return 'review_post_time';
	}

	function isFieldSortable( $name ) {
		return in_array(
			$name,
			array(
				'review_post_time',
				'review_state',
			)
		);
	}

}
