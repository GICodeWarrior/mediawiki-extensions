<?php

/**
 * Internationalization file for the Ratings extension.
 *
 * @since 0.1
 *
 * @file Ratings.i18n.php
 * @ingroup Ratings
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

$messages = array();

/** English
 * @author Jeroen De Dauw
 */
$messages['en'] = array(
	'ratings-desc' => 'Allows users to rate different "properties" of pages',

	// Rating stars
	'ratings-par-page' => 'The page the rating applies to.',
	'ratings-par-tag' => 'The rating tag. The tag indicates what "property" of the page gets rated.',
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

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'ratings-desc' => 'Ermöglicht es Benutzern einzelne Inhalte einer Seite unabhängig voneinander bewerten zu können',
	'ratings-par-page' => 'Die Seite auf die sich die Bewertung bezieht.',
	'ratings-par-tag' => 'Das Bewertungselement. Das Element gibt an, welcher Inhalt einer Seite bewertet wird.',
	'ratings-par-showdisabled' => 'Zeigt die Bewertungen an, sofern der Benutzer nicht selbst bewerten kann (im schreibgeschützten Modus).',
	'ratings-par-incsummary' => 'Soll eine Zusammenfassung der aktuellen Bewertungen über dem zu bewertenden Element angezeigt werden?',
	'ratings-current-score' => 'Aktuelle Benutzerbewertung: $1 ($2 {{PLURAL:$2|Bewertung|Bewertungen}})',
	'ratings-no-votes-yet' => 'Bislang wurde dies von niemanden bewertet.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'ratings-desc' => 'Erméiglecht et Benotzer fir verschidden "Eegeschaften" vu Säiten ze bewäerten',
	'ratings-par-showdisabled' => 'Bewäertunge weisen wann de Benotzer net mat ofstëmme kann (Read-Only Modus)',
	'ratings-no-votes-yet' => 'Et huet nach keen dëst bewäert.',
);

