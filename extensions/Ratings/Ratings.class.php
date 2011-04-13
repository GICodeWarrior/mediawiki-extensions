<?php

/**
 * Static class for general functions of the Ratings extension.
 * 
 * @since 0.1
 * 
 * @file Ratings.php
 * @ingroup Ratings
 * 
 * @licence GNU GPL v3
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class Ratings {
	
	/**
	 * Cache results for a single request.
	 * 
	 * @since 0.1
	 * 
	 * @var array
	 */
	protected static $pageRatings = array();
	
	/**
	 * Gets a summary message of the current votes for a tag on a page.
	 * 
	 * @since 0.1
	 * 
	 * @param Title $title
	 * @param string $tagName
	 * 
	 * @return string
	 */
	public static function getRatingSummaryMessage( Title $title, $tagName ) {
		$tagData = self::getCurrentRatingForTag( $title, $tagName );
		
		if ( count( $tagData['count'] ) > 0 ) {
			$message = wfMsgExt(
				'ratings-current-score',
				'parsemag',
				$tagData['avarage'] + 1, // Internal representatation is 0 based, don't confuse poor users :)
				$tagData['count']
			);
		}
		else {
			$message = wfMsg( 'ratings-no-votes-yet' );
		}
		
		return $message;		
	}
	
	/**
	 * Returns the data for the tag in an array, or false is there is no data.
	 * 
	 * @since 0.1
	 * 
	 * @param Title $titleObject
	 * @param string $tagName
	 * 
	 * @return false or array
	 */
	protected static function getCurrentRatingForTag( Title $titleObject, $tagName ) {
		$title = $titleObject->getFullText();
		
		if ( !array_key_exists( $title, self::$pageRatings ) ) {
			self::$pageRatings[$title] = array();
			
			// The keys are the tag ids, but they are not known here, so change to tag names, which are known.
			foreach ( self::getPageRatings( $titleObject ) as $tagId => $tagData ) {
				self::$pageRatings[$title][$tagData['name']] = array_merge( array( 'id' => $tagId ), $tagData );
			}
		}
		
		return array_key_exists( $tagName, self::$pageRatings[$title] ) ? self::$pageRatings[$title][$tagName] : false;
	}	
	
	/**
	 * Schema update to set up the needed database tables.
	 * 
	 * @since 0.1
	 * 
	 * @param DatabaseUpdater $updater
	 * 
	 * @return true
	 */	
	public static function getPageRatings( Title $page, $forceUpdate = false ) {
		if ( !$forceUpdate ) {
			$cached = self::getCachedPageRatings( $page );
			
			if ( $cached !== false ) {
				return $cached;
			}
		}
		
		return self::getAndCalcPageRatings( $page );
	}
	
	protected static function getAndCalcPageRatings( Title $page ) {
		$tags = array();
		
		foreach ( self::getTagNames() as $tagName => $tagId ) {
			$tags[$tagId] = array( 'count' => 0, 'total' => 0, 'name' => $tagName );
		}		
		
		$dbr = wfGetDb( DB_SLAVE );
		
		$votes = $dbr->select(
			'votes',
			array(
				'vote_prop_id',
				'vote_value'
			),
			array(
				'vote_page_id' => $page->getArticleId()
			)
		);	
		
		while ( $vote = $votes->fetchObject() ) {
			$tags[$vote->vote_prop_id]['count']++;
			$tags[$vote->vote_prop_id]['total'] += $vote->vote_value;
		}
		
		foreach ( $tags as &$tag ) {
			$tag['avarage'] = $tag['total'] / $tag['count'];
		}
		
		return $tags;
	}
	
	protected static function getCachedPageRatings( Title $page ) {
		return false;
	}
	
	public static function getTagNames() {
		$dbr = wfGetDb( DB_SLAVE );
		
		$props = $dbr->select(
			'vote_props',
			array( 'prop_id', 'prop_name' )
		);

		$tags = array();
		
		while ( $tag = $props->fetchObject() ) {
			$tags[$tag->prop_name] = $tag->prop_id;
		}
		
		return $tags;
	}
	
}
