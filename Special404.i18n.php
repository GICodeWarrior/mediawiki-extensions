<?php
/**
 * Internationalisation file for Special404 extension.
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Daniel Friesen
 */
$messages['en'] = array(
	'special404-desc' => 'Provides a 404 special page destination for 404 Not found errors',
	'error404' => '404 Not found',
	'special404-body' => 'The URL you requested was not found.

Did you mean to type {{fullurl:$1}}?

Maybe you would like to look at:
* [[{{int:mainpage}}|The main page]]',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'special404-desc' => 'Ermöglicht eine benutzerdefinierte Zielseite für den Fall das der HTTP-Fehler „404 Not Found“ auftritt',
	'error404' => '404 Not Found',
	'special404-body' => 'Die gewünschte URL wurde nicht gefunden.

Sollte tatsächlich {{fullurl:$1}} aufgerufen werden?

Vielleicht sollte stattdessen folgende Seite aufgerufen werden:
* [[{{int:mainpage}}|Hauptseite]]',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'special404-desc' => 'Tilbyr en 404 spesialdestinasjonsside for 404 Ikke funnet-feil',
	'error404' => '404 Ikke funnet',
	'special404-body' => 'URLen du søkte ble ikke funnet.

Mente du å skrive {{fullurl:$1}}?

Kanskje du vil se på:
* [[{{int:mainpage}}|Hovedsiden]]',
);

/** Polish (Polski)
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'special404-desc' => 'Udostępnia specjalną stronę wyświetlaną przy wystąpieniu błędu 404 oznaczającego brak strony',
	'error404' => '404 Nie znaleziono',
	'special404-body' => 'Wybrany adres URL nie istnieje.

Czy na pewno chodziło o {{fullurl:$1}}?

Może chcesz zobaczyć
* [[{{int:mainpage}}|stronę główną]]',
);

