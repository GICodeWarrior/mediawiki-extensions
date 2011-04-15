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

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'ratings-desc' => 'Дазваляе карыстальнікам ацэньваць розныя «ўласьцівасьці» старонкі',
	'ratings-par-showdisabled' => 'Паказваць рэйтынг, калі карыстальнік ня можа галасаваць (толькі для чытаньня)',
	'ratings-current-score' => 'Бягучы карыстальніцкі рэйтынг: $1 ($2 {{PLURAL:2|ацэнка|ацэнкі|ацэнак}})',
	'ratings-no-votes-yet' => 'Ніхто яшчэ не даваў ацэнак.',
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

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'ratings-desc' => 'Permitter al usatores de evalutar diverse "proprietates" de paginas',
	'ratings-par-page' => 'Le pagina al qual le evalutation pertine.',
	'ratings-par-tag' => 'Le etiquetta de evalutation. Le etiquetta specifica le "proprietate" del pagina que es evalutate.',
	'ratings-par-showdisabled' => 'Monstrar le evalutationes si le usator non pote votar (in modo de lectura sol).',
	'ratings-par-incsummary' => 'Monstrar un summario del votos actual supra le elemento de evalutation?',
	'ratings-current-score' => 'Evalutation actual del usator: $1 ($2 {{PLURAL:$2|evalutation|evalutationes}})',
	'ratings-no-votes-yet' => 'Nemo ha ancora evalutate isto.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'ratings-desc' => 'Erméiglecht et Benotzer fir verschidden "Eegeschaften" vu Säiten ze bewäerten',
	'ratings-par-showdisabled' => 'Bewäertunge weisen wann de Benotzer net mat ofstëmme kann (Read-Only Modus)',
	'ratings-no-votes-yet' => 'Et huet nach keen dëst bewäert.',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'ratings-desc' => 'Им овозможува на корисниците да оценуваат разни „својства“ на страниците',
	'ratings-par-page' => 'На која страница се однесува оценкава.',
	'ratings-par-tag' => 'Ознака за оценка. Ознаката покажува кое „својство“ на страницата се оценува.',
	'ratings-par-showdisabled' => 'Прикажувај оценки кога корисникот не може да гласа (во режим „само читање“).',
	'ratings-par-incsummary' => 'Да прикажувам опис на тековните гласови над елементот за оценка?',
	'ratings-current-score' => 'Тековна корисничка оценка: $1 ($2 {{PLURAL:$2|оценка|оценки}})',
	'ratings-no-votes-yet' => 'Сè уште никој го нема оценето ова.',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'ratings-desc' => 'Nagpapahintulot sa mga tagagamit na antasan ang iba\'t ibang mga "pag-aari" ng mga pahina',
	'ratings-par-page' => 'Ang pahinang malalapatan ng kaantasan.',
	'ratings-par-tag' => 'Ang tatak ng antas. Nagpapahiwatig ang tatak ng kung anong "pag-aari" ng pahina ang aantasan.',
	'ratings-par-showdisabled' => 'Ipakita ang mga antas kapag hindi makakaboto ang tagagamit (nasa pamamaraang mababasa lamang).',
	'ratings-par-incsummary' => 'Magpakita ng isang buod ng pangkasalukuyang mga boto na nasa itaas ng sangkap na antas?',
	'ratings-current-score' => 'Pangkasalukuyang antas ng tagagamit: $1 ($2 {{PLURAL:$2|antas|mga antas}})',
	'ratings-no-votes-yet' => 'Wala pang isang nag-aantas nito.',
);

