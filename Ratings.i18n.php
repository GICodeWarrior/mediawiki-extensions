<?php

/**
 * Internationalization file for the Include WP extension.
 *
 * @since 0.1
 *
 * @file IncludeWP.i18n.php
 * @ingroup IncludeWP
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

$messages = array();

/** English
 * @author Jeroen De Dauw
 */
$messages['en'] = array(
	'ratings-desc' => 'Simple rating extension for MediaWiki',

	// Rating stars
	'ratings-par-page' => 'The page the rating applies to.',
	'ratings-par-tag' => 'Tha rating tag. The tag indicates what "property" of the page gets rated.',
	'ratings-par-showdisabled' => 'Show ratings when the user can not vote (in read-only mode).',
	'ratings-par-incsummary' => 'Show a summary of the current votes above the rating element?',

	// Vote summary
	'ratings-current-score' => 'Current user rating: $1 ($2 {{PLURAL:$2|rating|ratings}})',
	'ratings-no-votes-yet' => 'No one has rated this yet.',
);

/** Message documentation (Message documentation)
 * @author Jeroen De Dauw
 */
$messages['qqq'] = array(
	'ratings-desc' => '{{desc}}',
);
