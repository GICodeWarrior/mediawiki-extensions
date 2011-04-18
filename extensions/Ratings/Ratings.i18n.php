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
 * @author EugeneZelenko
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'ratings-desc' => 'Дазваляе ўдзельнікам ацэньваць розныя «ўласьцівасьці» старонкі',
	'ratings-par-showdisabled' => 'Паказваць адзнакі, калі ўдзельнік ня можа галасаваць (толькі для чытаньня)',
	'ratings-current-score' => 'Цяперашняя адзнака ўдзельнікаў: $1 ($2 {{PLURAL:2|адзнака|адзнакі|адзнак}})',
	'ratings-no-votes-yet' => 'Ніхто яшчэ не адзначаў.',
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

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'ratings-desc' => 'Määd et müjjelesch, dat Metmaacher för ongerscheidlijje Eijeschaffte vun de Sigge Note jävve künne.',
	'ratings-par-page' => 'De Sigg, woh en Note för jejovve weed.',
	'ratings-par-tag' => 'De Eijeschaff, för wat aan dä Sigg en Note jejovve weed.',
	'ratings-par-showdisabled' => 'Donn de Note aanzeije, wann der Metmaacher kein Note jävve kann, sönders nur lässe.',
	'ratings-par-incsummary' => 'Donn en Zosammefaßong vun de Note bovve drövver aanjezeije
',
	'ratings-current-score' => 'De Metmaacher han {{PLURAL:$2|ein|$2|noch kein}} Note jejovve, zosamme jenumme kohm dobei $1 eruß.',
	'ratings-no-votes-yet' => 'Doför hät noch Keiner Note jejovve.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'ratings-desc' => 'Erméiglecht et Benotzer fir verschidden "Eegeschaften" vu Säiten ze bewäerten',
	'ratings-par-page' => "D'Säit op déi sech d'Bewäertung bezitt.",
	'ratings-par-showdisabled' => 'Bewäertunge weisen wann de Benotzer net mat ofstëmme kann (Read-Only Modus)',
	'ratings-current-score' => 'Aktuell Benotzerbewäertung: $1 ($2 {{PLURAL:$2|Bewäertung|Bewäertungen}})',
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

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'ratings-desc' => "Maakt het voor gebruikers mogelijk verschillende eigenschappen van pagina's te waarderen",
	'ratings-par-page' => 'De pagina waar de waardering op van toepassing is.',
	'ratings-par-tag' => 'Het waarderingslabel. Het label geeft aan welke "eigenschap" van de pagina wordt gewaardeerd.',
	'ratings-par-showdisabled' => 'Waarderingen weergeven als de gebruiker niet kan waarderen (bij alleen-lezen).',
	'ratings-par-incsummary' => 'Een samenvatting weergeven van de huidige waarderingen boven het waarderingselement?',
	'ratings-current-score' => 'Huidige gebruikerswaardering: $1 ($2 {{PLURAL:$2|waardering|waarderingen}})',
	'ratings-no-votes-yet' => 'Dit onderdeel is nog door niemand gewaardeerd.',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'ratings-no-votes-yet' => 'దీన్నింకా ఎవరూ మూల్యాంకన చెయ్యలేదు.',
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

