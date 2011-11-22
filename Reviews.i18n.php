<?php

/**
 * Internationalization file for the Reviews extension.
 *
 * @since 0.1
 *
 * @file Reviews.i18n.php
 * @ingroup Reviews
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

$messages = array();

/** English
 * @author Jeroen De Dauw
 */
$messages['en'] = array(
	'reviews-desc' => 'Allow users to post reviews per article.',

	// Misc
	'reviews-toplink' => 'My reviews',

	// Rights
	'right-reviewsadmin' => 'Manage reviews',
	'right-review' => 'Post reviews',

	'action-reviewsadmin' => 'manage reviews',
	'action-reviewer' => 'post reviews',

	// Groups
	'group-reviewsadmin' => 'Review admins',
	'group-reviewsadmin-member' => '{{GENDER:$1|review administrator}}',
	'grouppage-reviewsadmin' => '{{ns:project}}:Review_administrators',

	'group-reviewer' => 'Reviewer',
	'group-reviewer-member' => '{{GENDER:$1|Reviewer}}',
	'grouppage-reviewer' => '{{ns:project}}:Reviewers',

	// Review states
	'reviews-state-new' => 'New',
	'reviews-state-flagged' => 'Flagged',
	'reviews-state-reviewed' => 'Reviewed',

	// Preferences
	'prefs-reviews' => 'Reviews',
	'reviews-prefs-showtoplink' => 'Show a link to [[Special:MyReviews|your reviews]] at the top of every page.',
	'reviews-prefs-showcontrol' => 'Show the review control at the bottom of articles.',
	'reviews-prefs-showedit' => 'Show the review control even when I already submitted a review, so I can edit it.',

	// Special pages
	'special-myreviews' => 'My reviews',
	'special-reviews' => 'Reviews',

	// Review control
	'reviews-submission-submit' => 'Submit',
	'reviews-submission-saving' => 'Saving',

	// Special:MyReviews
	'reviews-myreviews-header' => 'This page lists all reviews you posted.',

	// Special:Reviews

	// Review pager
	'reviews-pager-post-time' => 'Post time',
	'reviews-pager-state' => 'State',
	'reviews-pager-title' => 'Title',
	'reviews-pager-user' => 'User',
	'reviews-pager-page' => 'For page',
);

/** Message documentation (Message documentation)
 * @author Jeroen De Dauw
 */
$messages['qqq'] = array(
	'reviews-toplink' => 'Text of top link linking to Special:MyReviews',

	'prefs-reviews' => 'Preferences tab label',
	'reviews-prefs-showtoplink' => 'Text explaining the function of a preference, next to a checkbox',
	'reviews-prefs-showcontrol' => 'Text explaining the function of a preference, next to a checkbox',
	'reviews-prefs-showedit' => 'Text explaining the function of a preference, next to a checkbox',

	'special-myreviews' => 'Special page title',
	'special-reviews' => 'Special page title',

	'reviews-submission-submit' => 'Submission button text',
	'reviews-submission-saving' => 'Submission button text while a save action is happening and the button gets disabled',

	'reviews-myreviews-header' => "Line on top of a page explaining it's function",

	'reviews-pager-post-time' => 'Tabele column header',
	'reviews-pager-state' => 'Tabele column header',
	'reviews-pager-title' => 'Tabele column header',
	'reviews-pager-user' => 'Tabele column header',
	'reviews-pager-page' => 'Tabele column header',
);
