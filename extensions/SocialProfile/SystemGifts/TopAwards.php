<?php
/**
 * Special:TopAwards -- a special page to show the awards with the most
 * recipients (I think)
 *
 * @file
 * @ingroup Extensions
 */

class TopAwards extends UnlistedSpecialPage {

	/**
	 * Constructor -- set up the new special page
	 */
	public function __construct() {
		parent::__construct( 'TopAwards' );
	}

	/**
	 * Show the special page
	 *
	 * @param $par Mixed: parameter passed to the page or null
	 */
	public function execute( $par ) {
		global $wgRequest, $wgOut, $wgUser, $wgUploadPath, $wgScriptPath, $wgSystemGiftsScripts;

		// Variables
		$gift_name_check = '';
		$x = 0;
		$category_number = $wgRequest->getInt( 'category' );

		// System gift class array
		$categories = array(
			array( 'category_name' => 'Edit', 'category_threshold' => '500', 'category_id' => 1 ),
			array( 'category_name' => 'Vote', 'category_threshold' => '2000', 'category_id' => 2 ),
			array( 'category_name' => 'Comment', 'category_threshold' => '1000', 'category_id' => 3 ),
			array( 'category_name' => 'Recruit', 'category_threshold' => '0', 'category_id' => 7 ),
			array( 'category_name' => 'Friend', 'category_threshold' => '25', 'category_id' => 8 )
		);

		// Set title
		if ( !( $category_number ) || $category_number > 4 ) {
			$category_number = 0;
			$page_category = $categories[$category_number]['category_name'];
		} else {
			$page_category = $categories[$category_number]['category_name'];
		}

		// Database calls
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select(
			array( 'user_system_gift', 'system_gift' ),
			array(
				'sg_user_name', 'sg_user_id', 'gift_category',
				'MAX(gift_threshold) AS top_gift'
			),
			array(
				"gift_category = {$categories[$category_number]['category_id']}",
				"gift_threshold > {$categories[$category_number]['category_threshold']}"
			),
			__METHOD__,
			array( 'GROUP BY' => 'sg_user_name', 'ORDER BY' => 'top_gift DESC' ),
			array( 'system_gift' => array( 'INNER JOIN', 'gift_id=sg_gift_id' ) )
		);

		// Page title
		$wgOut->setPageTitle( "Top Awards - {$page_category} Milestones" );

		// Add CSS
		$wgOut->addExtensionStyle( $wgSystemGiftsScripts . '/SystemGift.css' );

		$output = '<div class="top-awards-navigation">
			<h1>Award Categories</h1>';

		$nav_x = 0;

		foreach ( $categories as $award_type ) {
			if ( $nav_x == $category_number ) {
				$output .= "<p><b>{$award_type['category_name']}s</b></p>";
			} else {
				$output .= "<p><a href=\"" . $wgScriptPath . "/index.php?title=Special:TopAwards&category={$nav_x}\">{$award_type['category_name']}s</a></p>";
			}
			$nav_x++;
		}

		$output .= '</div>';
		$output .= '<div class="top-awards">';

		foreach ( $res as $row ) {
			$user_name = $row->sg_user_name;
			$user_id = $row->sg_user_id;
			$avatar = new wAvatar( $user_id, 'm' );
			$top_gift = $row->top_gift;
			$gift_name = number_format( $top_gift ) .
				" {$categories[$category_number][category_name]}" .
				( ( $top_gift > 1 ) ? 's' : '' ) . " Milestone";

			if ( $gift_name !== $gift_name_check ) {
				$x = 1;
				$output .= "<div class=\"top-award-title\">
					{$gift_name}
				</div>";
			} else {
				$x++;
			}

			$userLink = $wgUser->getSkin()->link(
				Title::makeTitle( NS_USER, $row->sg_user_name ),
				$user_name
			);
			$output .= "<div class=\"top-award\">
					<span class=\"top-award-number\">{$x}.</span>
					{$avatar->getAvatarURL()}
					{$userLink}
				</div>";

			$gift_name_check = $gift_name;
		}

		$output .= '</div>
		<div class="cleared"></div>';

		$wgOut->addHTML( $output );
	}
}
