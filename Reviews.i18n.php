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
	'right-postreview' => 'Post reviews',
	'right-flagreview' => 'Flag reviews',
	'right-reviewreview' => 'Review reviews',

	'action-reviewsadmin' => 'manage reviews',
	'action-postreview' => 'post reviews',
	'action-flagreview' => 'flag reviews',
	'action-reviewreview' => 'review reviews',

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
	'reviews-state-reviewed' => 'Approved',

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
	'reviews-submission-title' => 'A title for your review:',
	'reviews-submission-text' => 'The review text:',
	'reviews-submission-rating' => 'Overall rating:',
	'reviews-submission-ratings' => 'Specific ratings:',

	// Special:MyReviews
	'reviews-myreviews-header' => 'This page lists all reviews you posted.',
	'reviews-myreviews-nosuchreview' => 'You do not have a review with the provided ID, it might have been deleted. All your reviews are listed below.',
	'reviews-myreviews-editheader' => 'On this page you can edit your review. You can also view a list of [[Special:MyReviews|reviews you posted]].',

	// Special:Reviews
	'reviews-reviews-header' => 'This page lists all reviews posted on this wiki',
	'reviews-reviews-nosuchreview' => 'You do not have a review with the provided ID, it might have been deleted. All reviews are listed below.',
	'reviews-reviews-editheader' => 'On this page you can manage this review. You can also view a list of [[Special:Reviews|all reviews]].',

	// Review pager
	'reviews-pager-no-results' => 'There are no reviews to list.',
	'reviews-pager-post-time' => 'Post time',
	'reviews-pager-state' => 'State',
	'reviews-pager-title' => 'Title',
	'reviews-pager-user' => 'User',
	'reviews-pager-page' => 'For page',
	'reviews-pager-rating' => 'Rating',
	'reviews-pager-deleted' => 'The page was deleted',
	'reviews-pager-change-new' => 'Unflag',
	'reviews-pager-change-flagged' => 'Flag',
	'reviews-pager-change-reviewed' => 'Approve',
	'reviews-pager-confirm-flagged' => 'Are you sure you want to flag this review?',
	'reviews-pager-confirm-new' => 'Are you sure you want to unflag this review?',
	'reviews-pager-confirm-reviewed' => 'Are you sure you want to mark this review as reviewed?',
	'reviews-pager-updating' => 'Updating...',
);

/** Message documentation (Message documentation)
 * @author Jeroen De Dauw
 */
$messages['qqq'] = array(
	'reviews-toplink' => 'Text of top link linking to Special:MyReviews',

	'right-reviewsadmin' => '{{doc-right|reviewsadmin}}',
	'right-postreview' => '{{doc-right|postreview}}',
	'right-flagreview' => '{{doc-right|flagreview}}',
	'right-reviewreview' => '{{doc-right|reviewreview}}',

	'action-postreview' => '{{doc-action|postreview}}',
	'action-reviewsadmin' => '{{doc-action|reviewsadmin}}',
	'action-flagreview' => '{{doc-action|flagreview}}',
	'action-reviewreview' => '{{doc-action|reviewreview}}',

	'reviews-state-new' => 'A state a review can be in',
	'reviews-state-flagged' => 'A state a review can be in',
	'reviews-state-reviewed' => 'A state a review can be in',

	'prefs-reviews' => 'Preferences tab label',
	'reviews-prefs-showtoplink' => 'Text explaining the function of a preference, next to a checkbox',
	'reviews-prefs-showcontrol' => 'Text explaining the function of a preference, next to a checkbox',
	'reviews-prefs-showedit' => 'Text explaining the function of a preference, next to a checkbox',

	'special-myreviews' => 'Special page title',
	'special-reviews' => 'Special page title',

	'reviews-submission-submit' => 'Submission button text',
	'reviews-submission-saving' => 'Submission button text while a save action is happening and the button gets disabled',
	'reviews-submission-title' => 'Form input field label',
	'reviews-submission-text' => 'Form input field label',
	'reviews-submission-rating' => 'Form input field label',
	'reviews-submission-ratings' => 'Form input field label',

	'reviews-myreviews-header' => "Line on top of a page explaining it's function",
	'reviews-myreviews-nosuchreview' => "Line on top of a page explaining it's function",
	'reviews-myreviews-editheader' => "Line on top of a page explaining it's function",

	'reviews-reviews-header' => "Line on top of a page explaining it's function",
	'reviews-reviews-nosuchreview' => "Line on top of a page explaining it's function",
	'reviews-reviews-editheader' => "Line on top of a page explaining it's function",

	'reviews-pager-no-results' => 'Informs the user that there are no results',
	'reviews-pager-post-time' => 'Tabele column header',
	'reviews-pager-state' => 'Tabele column header',
	'reviews-pager-title' => 'Tabele column header',
	'reviews-pager-user' => 'Tabele column header',
	'reviews-pager-page' => 'Tabele column header',
	'reviews-pager-rating' => 'Tabele column header',
	'reviews-pager-deleted' => 'Informs the user a page was deleted',
	'reviews-pager-flag' => 'Link text to flag a review',
	'reviews-pager-unflag' => 'Link text to unflag a review',
	'reviews-pager-confirm-flag' => 'Confirmation dialog message',
	'reviews-pager-confirm-unflag' => 'Confirmation dialog message',
	'reviews-pager-updating' => 'Message indicating the status is being updated',
);
