<?php

/**
 * Class representing a single review.
 *
 * @since 0.1
 *
 * @file Review.php
 * @ingroup Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class Review extends ReviewsDBObject {

	// Constants representing the states a review can have.
	const STATUS_NEW = 0;
	const STATUS_FLAGGED = 1;
	const STATUS_REVIEWED = 2;

	protected static $stateStringMap = array(
		self::STATUS_NEW => 'new',
		self::STATUS_FLAGGED => 'flagged',
		self::STATUS_REVIEWED => 'reviewed',
	);
	
	/**
	 * The ratings that are part of this review.
	 *
	 * @since 0.1
	 * @var array of ReviewRating
	 */
	protected $ratings = false;

	/**
	 * The user this review belongs to.
	 * This field is used for caching the return value of getUser.
	 * 
	 * @since 0.1
	 * @var User|false
	 */
	protected $user = false;
	
	/**
	 * The title of the page this review belongs to.
	 * This field is used for caching the return value of getTitle.
	 * 
	 * @since 0.1
	 * @var Title|false
	 */
	protected $title = false;
	
	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public static function getDBTable() {
		return 'reviews';
	}

	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	protected static function getFieldPrefix() {
		return 'review_';
	}

	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	protected static function getFieldTypes() {
		return array(
			'id' => 'id',
			'page_id' => 'int',
			'user_id' => 'int',
		
			'title' => 'str',
			'text' => 'str',
			'post_time' => 'str', // TS_MW
			'edit_time' => 'str', // TS_MW
			'state' => 'int',
			'rating' => 'int',
		);
	}

	/**
	 * @see parent::getDefaults
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	public static function getDefaults() {
		return array(
		);
	}
	
	/**
	 * Remove the review and all it's linked data, such as ratings,
	 * from the database.
	 * 
	 * @since 0.1
	 * 
	 * @return boolean Success indicator
	 */
	public function removeAllFromDB() {
		$id = $this->getId();
		
		$success = $this->removeFromDB();
		
		if ( $success ) {
			$success = ReviewRating::delete( array( 'review_id' => $id ) ) && $success;
		}
		
		return $success;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see ReviewsDBObject::insertIntoDB()
	 */
	protected function insertIntoDB() {
		$success = parent::insertIntoDB();
		
		if ( $success && $this->ratings !== false ) {
			$dbw = wfGetDB( DB_MASTER );
			$dbw->begin();
			
			foreach ( $this->getRatings() as /* ReviewRating */ $rating ) {
				$rating->setField( 'review_id', $this->getId() );
				$rating->writeToDB();
			}
			
			$dbw->commit();
		}
		
		return $success;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see ReviewsDBObject::updateInDB()
	 */
	protected function updateInDB() {
		$success = parent::updateInDB();
		
		if ( $success && $this->ratings !== false ) {
			$existingRatings = $this->getRatingsFromDB();
			$existing = array();
			
			foreach ( $existingRatings as /* ReviewRating */ $rating ) {
				$existing[$rating->getField( 'type' )] = $rating->getField( 'id' );
			}
			
			$dbw = wfGetDB( DB_MASTER );
			$dbw->begin();
			
			foreach ( $this->getRatings() as /* ReviewRating */ $rating ) {
				if ( array_key_exists( $rating->getField( 'type' ), $existing ) ) {
					$rating->setField( 'id', $existing[$rating->getField( 'type' )] );
				}
				
				$rating->setField( 'review_id', $this->getId() );
				$rating->writeToDB();
			}
			
			$dbw->commit();
		}
		
		return $success;
	}
	
	/**
	 * Load the ratings part of this review from the database.
	 * 
	 * @since 0.1
	 * 
	 * @return array of ReviewRating
	 */
	protected function getRatingsFromDB() {
		return ReviewRating::select( null, array( 'review_id' => $this->getId() ) );
	}
	
	/**
	 * Get the ratings part of this review.
	 * 
	 * @since 0.1
	 * 
	 * @param boolean $forceLoad Load the ratings even if there are already some set.
	 * 
	 * @return array of ReviewRating
	 */
	public function getRatings( $forceLoad = false ) {
		if ( $forceLoad || $this->ratings === false ) {
			$this->ratings = $this->getRatingsFromDB();
		}
		
		return $this->ratings;
	}
	
	/**
	 * Get the main rating of this review.
	 * 
	 * @since 0.1
	 * 
	 * @return ReviewRating
	 */
	public function getRating() {
		return new ReviewRating( array( 'value' => $this->getField( 'rating' ) ) );
	}
	
	/**
	 * Get if the review has any (non-main) ratings associated with it.
	 * 
	 * @since 0.1
	 * 
	 * @param boolean $forceLoad Load the ratings even if there are already some set.
	 * 
	 * @return boolean
	 */
	public function hasRatings( $forceLoad = false ) {
		return count( $this->getRatings( $forceLoad ) ) > 0;
	}
	
	/**
	 * Sets the ratings part of this review.
	 * 
	 * @since 0.1
	 * 
	 * @param array of ReviewRating $ratings
	 */
	public function setRatings( array /* of ReviewRating */ $ratings ) {
		$this->ratings = $ratings;
	}
	
	/**
	 * Sets the ratings part of this review.
	 * Ratings provided as type => value
	 * 
	 * @since 0.1
	 * 
	 * @param array $ratings
	 */
	public function setRatingArray( array $ratings ) {
		$objects = array();
		
		foreach ( $ratings as $type => $value ) {
			$objects[] = new ReviewRating( array(
				'type' => $type,
				'value' => $value
			) );
		}
		
		$this->setRatings( $objects );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see ReviewsDBObject::toArray()
	 */
	public function toArray( $fields = null, $incNullId = false, array $types = null ) {
		$array = parent::toArray( $fields, $incNullId );
		
		if ( !is_null( $types ) ) {
			$array['ratings'] = $this->getRatingArray( $types );
		}
		
		return $array;
	}
	
	/**
	 * Returns the ratings in associative array form.
	 * The array keys are the rating names, the values are their values.
	 * 
	 * @since 0.1
	 * 
	 * @param array $types
	 * 
	 * @return array
	 */
	public function getRatingArray( array $types = null ) {
		$ratings = array();
		
		foreach ( $this->getRatings() as /* ReviewRating */ $rating ) {
			if ( is_null( $types ) || in_array( $rating->getField( 'type' ), $types ) ) {
				$ratings[$rating->getField( 'type' )] = $rating->getField( 'value' );
			}
		}
		
		if ( !is_null( $types ) ) {
			foreach ( $types as $type ) {
				if ( !array_key_exists( $type, $ratings ) ) {
					$ratings[$type] = false;
				}
			}
		}
		
		return $ratings;
	}
	
	/**
	 * Get the message for a review state.
	 * 
	 * @since 0.1
	 * 
	 * @param Review::STATE_ $state
	 * 
	 * @return string
	 */
	public static function getStateMessage( $state ) {
		return wfMsg( 'reviews-state-' . self::getStateString( $state ) );
	}
	
	/**
	 * Get a string constant for the state, rather then it's usual
	 * integer value.
	 * 
	 * @since 0.1
	 * 
	 * @param Review::STATE_ $state
	 * 
	 * @return string
	 */
	public static function getStateString( $state ) {
		return self::$stateStringMap[$state];
	}
	
	public static function getStateForString( $string ) {
		static $map = false;
		
		if ( $map === false ) {
			$map = array_flip( self::$stateStringMap );
		}
		
		return $map[$string];
	}
	
	/**
	 * Get HTML to represent the review.
	 * 
	 * @since 0.1
	 * 
	 * @param User $user
	 * @param Language $lang
	 * 
	 * @return string
	 */
	public function getHTML( User $user, Language $lang ) {
		$ratings = $this->getRatings( true );
		
		$html = '<table class="review-table">';
		
		$html .= '<tr><th colspan="2" class="review-table-title">' . htmlspecialchars( $this->getField( 'title' ) ) . '</th></tr>';
		
		$html .= '<tr>';
		
		$html .= '<td rowspan="' . ( $this->hasRatings() ? 3 : 2 ) . '" class="review-author-box">';
		
		$html .= ReviewRating::getDisplayHTMLFor( $this->getRating() );
		
		$html .= Html::element( 'p', array( 'class' => 'reviews-posted-by' ), wfMsgExt(
			'reviews-posted-by',
			'parsemag',
			$this->getUser()->getRealName() === '' ? $this->getUser()->getName() : $this->getUser()->getRealName() 
		) );
		
		$html .= Html::element( 'p', array( 'class' => 'reviews-posted-on' ), wfMsgExt(
			'reviews-posted-on',
			'parsemag',
			$lang->date( $this->getField( 'post_time' ), true )
		) );
		
		$html .= '</td>';
		
		$html .= Html::element( 'td', array(), $this->getField( 'text' ) );
		
		$html .= '</tr>';
		
		if ( $this->hasRatings() ) {
			$html .= '<tr>';
			
			$html .= Html::rawElement(
				'td',
				array(),
				implode( array_map( 'ReviewRating::getDisplayHTMLFor', $ratings ) ) 
			);
			
			$html .= '</tr>';
		}
		
		$html .= '<tr><td>';
		
		$html .= $this->getStateControl( $user, false );
		
		$controlLinks = array();
		
		if ( $user->isAllowed( 'reviewsadmin' ) ) {
			$controlLinks[] = Linker::linkKnown(
				SpecialPage::getTitleFor( 'Reviews', $this->getId() ),
				wfMsg( 'reviews-review-details' )
			);
		}
		
		if ( $user->getId() === $this->getField( 'user_id' ) ) {
			$controlLinks[] = Linker::linkKnown(
				SpecialPage::getTitleFor( 'MyReviews', $this->getId() ),
				wfMsg( 'reviews-review-edit' )
			);
		}
		
		if ( count( $controlLinks ) > 0 ) {
			$html .= '(' . $lang->pipeList( $controlLinks ) . ')';
		}
		
		$html .= '</td></tr>';
		
		$html .= '</table>';
		
		return Html::openElement(
			'div',
			array(
				'class' => 'reviews-review',
				'id' => 'reviews-review-' . $this->getId()
			)
		) . $html . '</div>';
	}
	
	/**
	 * Returns the user the review belongs to.
	 * 
	 * @since 0.1
	 * 
	 * @return User|false
	 */
	public function getUser() {
		if ( $this->user === false ) {
			$this->user = $this->hasField( 'user_id' ) ? User::newFromId( $this->getField( 'user_id' ) ) : false;
		}
		
		return $this->user;
	}
	
	
	/**
	 * Returns the Title of the page the review belongs to.
	 * 
	 * @since 0.1
	 * 
	 * @return Title|false
	 */
	public function getTitle() {
		if ( $this->title === false ) {
			$this->title = $this->hasField( 'page_id' ) ? Title::newFromID( $this->getField( 'page_id' ) ) : false;
		}
		
		return $this->title;
	}
	
	/**
	 * Get a set of links to control the state of the review.
	 * 
	 * @since 0.1
	 * 
	 * @param User $user
	 * @param boolean $showState
	 * 
	 * @return string
	 */
	public function getStateControl( User $user, $showState = true ) {
		$control = $showState ? htmlspecialchars( self::getStateMessage( $this->getField( 'state' ) ) ) : '';
		
		$states = array(
			'new' => array(),
			'flagged' => array(),
			'reviewed' => array(),
		);
		
		if ( $user->isAllowed( 'reviewsadmin' ) ) {
			$states['new'] = array( 'flagged', 'reviewed' );
			$states['flagged'] = array( 'new', 'reviewed' );
			$states['reviewed'] = array( 'flagged' );
		}
		else {
			if ( $user->isAllowed( 'reviewreview' ) ) {
				$states['flagged'] = array( 'new', 'reviewed' );
			}
			
			if ( $user->isAllowed( 'flagreview' ) ) {
				$states['reviewed'] = array( 'flagged' );
				$states['new'][] = 'flagged';
				$states['new'] = array_unique( $states['new'] );
			}
		}
		
		$control = Html::element(
			'div',
			array(
				'class' => 'reviews-state-controls',
				'style' => 'display:inline;',
				'data-review-id' => $this->getId(),
				'data-review-state' => self::getStateString( $this->getField( 'state' ) ),
				'data-review-states' => FormatJson::encode( $states ),
				'data-show-state' => $showState ? 1 : 0
			),
			$control
		);
		
		return $control;
	}

}
