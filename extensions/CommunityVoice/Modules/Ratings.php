<?php

abstract class CommunityVoiceRatings {

	/* Private Static Functions */

	private static function getScaleFraction(
		$rating,
		$star
	) {
		if ( floor( $rating ) > $star ) {
			return 6;
		} else if ( floor( $rating ) < $star ) {
			return 0;
		} else {
			return round( ( 6 / 10 ) * ( ( $rating - floor( $rating ) ) * 10 ) );
		}
	}

	private static function getCategories() {
		$dbr = wfGetDB( DB_SLAVE );
		$result = $dbr->select(
			'cv_ratings_votes',
			'DISTINCT vot_category'
		);
		$categories = array();
		while ( $row = $result->fetchRow() ) {
			$categories[] = (string)$row['vot_category'];
		}
		return $categories;
	}

	private static function getTitles(
		$category
	) {
		$dbr = wfGetDB( DB_SLAVE );
		$result = $dbr->select(
			'cv_ratings_votes',
			'DISTINCT vot_title',
			array( 'vot_category' => $category )
		);
		$titles = array();
		while ( $row = $result->fetchRow() ) {
			$titles[] = (string)$row['vot_title'];
		}
		return $titles;
	}

	private static function getTotalVotes(
		$category,
		$title
	) {
		$dbr = wfGetDB( DB_SLAVE );
		return (integer)$dbr->selectField(
			'cv_ratings_votes',
			'COUNT(*)',
			array(
				'vot_category' => $category,
				'vot_title' => $title,
			)
		);
	}

	private static function getUserVoted(
		$category,
		$title
	) {
		global $wgUser;
		$dbr = wfGetDB( DB_SLAVE );
		return (bool)$dbr->selectField(
			'cv_ratings_votes',
			'COUNT(*)',
			array(
				'vot_category' => $category,
				'vot_title' => $title,
				'vot_user' => $wgUser->getId(),
			)
		);
	}

	private static function getAverageRating(
		$category,
		$title
	) {
		$dbr = wfGetDB( DB_SLAVE );
		return (float)$dbr->selectField(
			'cv_ratings_votes',
			'AVG(vot_rating)',
			array(
				'vot_category' => $category,
				'vot_title' => $title,
			)
		);
	}

	private static function addVote(
		$category,
		$title,
		$rating
	) {
		global $wgUser;
		// Checks if...
		if (
			// User is logged in
			$wgUser->isLoggedIn() &&
			// User has not yet voted
			!self::getUserVoted( $category, $title )
		) {
			// Get database connection
			$dbw = wfGetDB( DB_MASTER );
			// Insert new vote for user
			$dbw->insert(
				'cv_ratings_votes',
				array(
					'vot_category' => $category,
					'vot_title' => $title,
					'vot_user' => $wgUser->getId(),
					'vot_rating' => $rating,
				)
			);
			$dbw->commit();
			return true;
		}
		return false;
	}

	/* Static Functions */

	public static function register() {
		global $wgParser, $wgAjaxExportList, $wgHooks;
		// Register the hook with the parser
		$wgParser->setHook( 'ratings:scale', array( __CLASS__, 'renderScale' ) );
		// Register ajax response hook
		$wgAjaxExportList[] = __CLASS__ . '::handleScaleVoteCall';

	}

	public static function renderScale(
		$input,
		$args,
		$parser
	) {
		global $wgUser, $wgTitle, $wgLang;
		global $egCommunityVoiceResourcesPath;
		// Disable caching
		$parser->disableCache();
		// Validate and sanitize incoming arguments
		$errors = array();
		$error = false;
		foreach ( array( 'category', 'title' ) as $argument ) {
			if ( isset( $args[$argument] ) ) {
				$args[$argument] = htmlspecialchars( $args[$argument] );
			} else {
				$error = true;
				$errors[] = CommunityVoice::getMessage(
					'ratings', 'error-missing-argument', $argument
				);
			}
		}
		// Checks if an error ocurred
		if ( $error ) {
			// Checks if there are any error messages to return
			if ( count( $errors ) ) {
				return Html::div(
					array( 'class' => 'error' ), implode( ' ', $errors )
				);
			}
			// Continues without rendering
			return true;
		}
		// Collects data
		$totalVotes = self::getTotalVotes( $args['category'], $args['title'] );
		$rating = self::getAverageRating( $args['category'], $args['title'] );
		$userVoted = self::getUserVoted( $args['category'], $args['title'] );
		// Builds sanitized HTML id with prepended module naming
		$id = Html::toId(
			'cv_ratings_scale_' . $args['category'] . '_' . $args['title']
		);
		// Gets stats message
		$stats = wfMsgExt( 'communityvoice-ratings-scale-stats', array( 'parsemag' ),  $wgLang->formatNum( round( $rating, 1 ) ), $wgLang->formatnum( $totalVotes ) );

		// Begins rating scale
		$htmlOut = Html::open(
			'div',
			array( 'class' => 'communityvoice-ratings-scale', 'id' => $id )
		);
		// Checks for input
		if ( $input != '' ) {
			// Adds content of tag as parsed wiki-text
			$htmlOut .= $parser->recursiveTagParse( $input );
		}
		// Checks if...
		if (
			// User has not voted yet
			!$userVoted &&
			// User is logged in
			$wgUser->isLoggedIn()
		) {

			/* Ajax Interaction */

			// Adds scale script
			$htmlOut .= Html::script(
				Js::callFunction(
					'communityVoice.ratings.scales.add',
					Js::buildInstance(
						'CommunityVoiceRatingsScale',
						array(
							Js::toScalar( $id ),
							Js::toScalar( $args['category'] ),
							Js::toScalar( $args['title'] ),
							Js::toScalar( $rating ),
							Js::toObject(
								array(
									'stats' => $stats,
									'status' => array(
										'ready' => '&nbsp;',
										'sending' => CommunityVoice::getMessage(
											'ratings', 'scale-status-sending'
										),
										'error' => CommunityVoice::getMessage(
											'ratings', 'scale-status-error'
										),
										'thanks' => CommunityVoice::getMessage(
											'ratings', 'scale-status-thanks'
										),
									)
								)
							),
							Js::toScalar( $wgTitle->getPrefixedText() )
						)
					)
				)
			);

			/* HTML Form Interaction */

			// Begins non-javascript fallback
			$htmlOut .= Html::open( 'noscript' );
			// Begins form
			$specialPageTitle = Title::newFromText( 'Special:CommunityVoice' );
			$htmlOut .= Html::open(
				'form',
				array(
					'action' => $specialPageTitle->getFullUrl(),
					'method' => 'post',
				)
			);
			// Builds list of hidden fields
			$hiddenFields = array(
				'token' => $wgUser->editToken(),
				'module' => 'Ratings',
				'action' => 'ScaleVoteSubmission',
				'scale[article]' => $wgTitle->getPrefixedText(),
				'scale[category]' => $args['category'],
				'scale[title]' => $args['title'],
			);
			// Loops over each field
			foreach ( $hiddenFields as $name => $value ) {
				// Adds hidden field
				$htmlOut .= Html::input(
					array(
						'type' => 'hidden', 'name' => $name, 'value' => $value
					)
				);
			}
			// Loops 5 times (once per star)
			for ( $i = 0; $i < 5; $i++ ) {
				// Adds star as image input
				$htmlOut .= Html::input(
					array(
						'type' => 'image',
						'name' => 'scale[rating_' . ( $i + 1 ) . ']',
						'src' => sprintf(
							'%s/Icons/star-%d.png',
							$egCommunityVoiceResourcesPath,
							self::getScaleFraction( $rating, $i )
						),
						'border' => 0,
						'alt' => '',
						'class' => 'star',
						'align' => 'absmiddle',
					)
				);
			}
			// Adds stats message
			$htmlOut .= Html::tag( 'span', array( 'class' => 'stats' ), $stats );
			// Ends form
			$htmlOut .= Html::close( 'form' );
			// Ends non-javascript fallback
			$htmlOut .= Html::close( 'noscript' );
		} else {

			/* No Interaction */

			// Loops 5 times (once per star)
			for ( $i = 0; $i < 5; $i++ ) {
				// Adds star as image
				$htmlOut .= Html::tag(
					'img',
					array(
						'src' => sprintf(
							'%s/Icons/star-%d.png',
							$egCommunityVoiceResourcesPath,
							self::getScaleFraction( $rating, $i )
						),
						'border' => 0,
						'alt' => '',
						'class' => 'star',
						'align' => 'absmiddle',
					)
				);
			}
			// Adds stats message
			$htmlOut .= Html::tag( 'span', array( 'class' => 'stats' ), $stats );
		}
		// Ends scale
		$htmlOut .= Xml::closeElement( 'div' );
		// Returns output
		return $htmlOut;
	}

	/* Processing Functions */

	/**
	 * Hanlder for ratings scale vote via ajax call
	 */
	public static function handleScaleVoteCall(
		$category,
		$title,
		$rating,
		$article
	) {
		global $wgUser;
		// Adds vote and checks for success
		if ( self::addVote( $category, $title, $rating ) ) {
			// Gets new rating data
			$rating = self::getAverageRating( $category, $title );
			// Builds result
			$result = array(
				'rating' => $rating,
				'stats' => CommunityVoice::getMessage(
					'ratings',
					'scale-stats',
					array(
						round( $rating, 1 ),
						self::getTotalVotes( $category, $title )
					)
				),
			);
			// Ensure database commits take place (since this is an ajax call)
			$dbw = wfGetDB( DB_MASTER );
			$dbw->commit();
			// Returns result
			return Js::toObject(  $result );
		}
		// Returns error information
		return Js::toObject( array( 'rating' => - 1, 'stats' => 'ready' ) );
	}

	/**
	 * Hanlder for ratings scale vote via HTML form submission
	 */
	public static function handleScaleVoteSubmission() {
		global $wgOut, $wgRequest;
		// Gets scale data
		$scale = $wgRequest->getArray( 'scale' );
		// Checks if an article was given
		if ( isset( $scale['article'], $scale['title'], $scale['category'] ) ) {
			// Looks for rating value
			foreach ( $scale as $key => $value ) {
				// Breaks key into parts
				$parts = explode( '_', $key );
				// Checks if...
				if (
					// There's at least 2 parts
					( count( $parts ) > 1 ) &&
					// The first part is 'rating'
					( $parts[0] == 'rating' ) &&
					// The second part is a number
					( is_numeric( $parts[1] ) )
				) {
					// Uses number as rating
					$rating = $parts[1];
					// Finishes loop
					break;
				}
			}
			// Checks if a rating was found
			if ( isset( $rating ) ) {
				// Adds vote and checks for success
				if (
					self::addVote(
						$scale['category'], $scale['title'], $rating
					)
				) {
					// Redirects user back to article
					$wgOut->redirect(
						Title::newFromText( $scale['article'] )->getFullUrl()
					);
				} else {
					throw new MWException( 'Voting failed!' );
				}
			} else {
				throw new MWException( 'No rating parameter!' );
			}
		} else {
			throw new MWException( 'Missing parameters!' );
		}
	}

	/* UI Functions */

	/**
	 * Outputs a summary UI for the module
	 */
	public static function showSummary(
		$path
	) {
		global $wgOut;
		//
		$wgOut->addWikiText( '==== Categories ====' );
		$xmlCategories = Html::open( 'ul' );
		foreach ( self::getCategories() as $category ) {
			$xmlCategories .= Html::tag( 'li', array(), $category );
		}
		$xmlCategories .= Html::close( 'ul' );
		$wgOut->addHtml( $xmlCategories );
	}

	/**
	 * Outputs main UI for module
	 */
	public static function showMain(
		$path
	) {
		global $wgOut;
		//
		$wgOut->addWikiText( '==== Detailed Information ====' );
	}
}
