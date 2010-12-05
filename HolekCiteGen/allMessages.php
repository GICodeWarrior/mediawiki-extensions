<?php
/**
 * Internationalisation file for Cite book template generator.
 *
 * @addtogroup Languages
 * @copyright © 2009 Michał Połtyn
 * @source http://translatewiki.net/w/i.php?title=Special%3ATranslate&task=export-to-file&group=ext-citebook-gen
 * @license GNU General Public Licence 2.0 or later
 */

$rtlLanguages = array('ar','arc','dv','fa','he','kk','ks','mzn','ps','sd','ug','ur','ydd','yi');

$messages = array();



/** English (English)
 * @author Holek

 * @author Wpedzich
 */
$messages['en'] = array(
	'ts-citegen-Title' => 'Citation templates generator',
	
	// Button
	'ts-citegen-Send' => 'Send',
	
	// Input
	'ts-citegen-Input-title' => 'Input',
	'ts-citegen-Input-text' => 'This is a citation template generator. Using it, you can quickly fill in the quotation templates in various language editions of Wikipedia. Please fill in the data (%s) in the fields below, and the script will try to complete the templates. Remember, it does not matter in which fields you will put the input data. Script will automatically match the correct template to given input.',
	'ts-citegen-Option-append-author-link' => 'Append the author wikilinks into the template',
	'ts-citegen-Option-append-newlines' => 'Append new lines after each parameter',
	'ts-citegen-Option-add-references' => 'Add <ref> tags around citing templates',
	'ts-citegen-Option-add-list' => 'Create a wikilist of citing templates',
	
	// Output
	'ts-citegen-Output-title' => 'Result',
	'ts-citegen-Output-select-disclaimer' => 'Remember that choosing a template language does not guarantee that specific template is available in your language. This field lists available languages of every supported template. Ie. it may display French, because only {{Cite book}} is supported.',
	'ts-citegen-Wrong-input' => '%s: not identified as a correct input.',
	
	// Settings
	'ts-citegen-Parsers' => 'Parsers',
	'ts-citegen-Skins' => 'Output',
	'ts-citegen-Skin-skins' => 'Skins',
	'ts-citegen-Skin-outputformat' => 'Output format',
	
	'ts-citegen-Template-lang' => 'Template language',
	
	// Sources
	'ts-citegen-Sources-title' => 'Sources',
	'ts-citegen-Sourcer-text' => 'Below the list of used sources is available.',
	
	// Sidebar-related messages
	'ts-citegen-Sidebar-title' => 'Citations generator',
	'ts-citegen-Sidebar-text' => 'This version of the generator uses the setup found on the full version of this generator. Ie. if you want to change the language version of the template, make the change using the generator itself. The settings are saved with the use of cookies.',
	
	'ts-citegen-Sidebar-add-Firefox' => 'Add to the sidebar',
	'ts-citegen-Sidebar-add-Opera' => 'Add to the Hotlist',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Add to the Page Holder',
	'ts-citegen-Sidebar-add-IE-Mac-details' => 'Once the page has loaded, open your Page Holder, click \'Add\' then use the Page Holder Favorites button to store it as a Page Holder Favourite.',
	
	// Portlet messages
	'ts-citegen-Tools' => 'Tools',
	'ts-citegen-Other-languages' => 'Other languages',
	
	'ts-citegen-Save-it' => 'Current query',
	
	// Error messages
	'ts-citegen-Errors-title' => 'Errors',
	'ts-citegen-Unavailable-API' => 'Error: Wikimedia API is unavailable',
	'ts-citegen-Unavailable-SQL' => 'Error: Toolserver database is unavailable. MySQL produced: %s',
	'ts-citegen-base-disabled' => 'Error: %s database is unavailable.'
	

);

/** Message documentation (Message documentation)
 * @author Holek
 */
$messages['qqq'] = array(
	'ts-citegen-Title' => 'Generator title',
	'ts-citegen-Send' => 'Send button',
	'ts-citegen-Input-title' => 'Input secton',
	'ts-citegen-Input-text' => 'Input section description',
	'ts-citegen-Option-append-author-link' => 'Appends the author wikilinks into the template',
	'ts-citegen-Option-append-newlines' => 'Appends new lines after each parameter',
	'ts-citegen-Option-add-references' => 'Adds <ref> tags around citing templates',
	'ts-citegen-Option-add-list' => 'Creates a wikilist of citing templates',
	'ts-citegen-Output-title' => 'Output section',
	'ts-citegen-Output-select-disclaimer' => 'Disclaimer about output templates',
	'ts-citegen-Wrong-input' => '"%s" is an unidentified input.',
	'ts-citegen-Parsers' => 'Parsers',
	'ts-citegen-Skins' => 'Output',
	'ts-citegen-Skin-skins' => 'Skins',
	'ts-citegen-Skin-outputformat' => 'Output format',
	'ts-citegen-Template-lang' => 'Template language',
	'ts-citegen-Sources-title' => 'Sources section title',
	'ts-citegen-Sourcer-text' => 'An explanation test for sources section',
	'ts-citegen-Sidebar-title' => 'Shortened title used for mini-generator',
	'ts-citegen-Sidebar-text' => 'An explanation text used in the sidebar.',
	'ts-citegen-Sidebar-add-Firefox' => "Caption of generator addition to Firefox's sidebar",
	'ts-citegen-Sidebar-add-Opera' => "Caption of generator addition to Opera's Hotlist",
	'ts-citegen-Sidebar-add-IE-Mac' => "Caption of generator addition to Mac IE's Page Holder",
	'ts-citegen-Sidebar-add-IE-Mac-details' => "Details on generator addition to Mac IE's Page Holder",
	'ts-citegen-Tools' => 'Tools portlet section',
	'ts-citegen-Other-languages' => 'Other languages section',
	'ts-citegen-Save-it' => 'Link to itself/current query',
	'ts-citegen-Errors-title' => 'Errors section title',
	'ts-citegen-Unavailable-API' => 'Error message: Wikimedia API is unavailable',
	'ts-citegen-Unavailable-SQL' => 'Error message: Toolserver database is unavailable. %s is an error message',
	'ts-citegen-base-disabled' => 'Error message: A book database is unavailable. <tt>%s</tt> is the name of the database.',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'ts-citegen-Title' => 'Генэратар шаблёнаў цытаваньня',
	'ts-citegen-Send' => 'Стварыць',
	'ts-citegen-Input-title' => 'Зьвесткі',
	'ts-citegen-Input-text' => 'Гэта генэратар шаблёнаў цытаваньня. Стварэньне шаблёнаў для цытатаў і крыніцаў у разьдзелах Вікіпэдыі зь яго дапамогай паскараецца. Калі ласка, пазначце зьвесткі (%s) у палях ніжэй, каб скрыпт мог стварыць шаблён. Памятайце, што няма розьніцы, у якое поле якія зьвесткі ўносіць — скрыпт сам распазнае тыпы зьвестак і сфармуе шаблён неабходным чынам.',
	'ts-citegen-Option-append-author-link' => 'Дадаць спасылкі на артыкулы пра адпаведных аўтараў',
	'ts-citegen-Option-append-newlines' => 'Пераходзіць на новы радок пасьля кожнага парамэтру',
	'ts-citegen-Option-add-references' => 'Зьмясьціць шаблён у тэг <ref />',
	'ts-citegen-Option-add-list' => 'Стварыць вікісьпіс шаблёнаў цытаваньня',
	'ts-citegen-Output-title' => 'Вынік',
	'ts-citegen-Output-select-disclaimer' => 'Памятайце, што, калі вы выбіраеце мову шаблёну, гэта не азначае, што пэўны шаблён даступны на вашай мове. Гэтае поле зьмяшчае даступныя мовы для кожнага падтрымліваемага шаблёну. Гэтак, тут можна зьмяшчацца француская мова, бо падтрымліваецца толькі {{cite book}}.',
	'ts-citegen-Wrong-input' => '%s: тып зьвестак не распазнаны.',
	'ts-citegen-Parsers' => 'Парсэры',
	'ts-citegen-Skins' => 'Форма адлюстраваньня',
	'ts-citegen-Skin-skins' => 'Афармленьне',
	'ts-citegen-Skin-outputformat' => 'Для ботаў',
	'ts-citegen-Template-lang' => 'Мова шаблёну',
	'ts-citegen-Sources-title' => 'Крыніцы',
	'ts-citegen-Sourcer-text' => 'Ніжэй пададзены сьпіс выкарыстаных крыніцаў.',
	'ts-citegen-Sidebar-title' => 'Генэратар цытаваньняў',
	'ts-citegen-Sidebar-text' => 'Гэтая вэрсія генэратара выкарыстоўвае налады поўнай вэрсіі генэратара. Гэтак, калі вы зьмяняеце моўную вэрсію шаблёну, рабіце гэта праз генэратар. Налады захоўваюцца ў cookies.',
	'ts-citegen-Sidebar-add-Firefox' => 'Дадаць да бакавой панэлі',
	'ts-citegen-Sidebar-add-Opera' => 'Дадаць да панэлі Opera',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Дадаць да Page Holder',
	'ts-citegen-Sidebar-add-IE-Mac-details' => "Як толькі старонка загрузіцца, адкрыйце Page Holder, націсьніце 'Add', і скарыстайцеся Page Holder Favorites лоя захаваньня старонкі.",
	'ts-citegen-Tools' => 'Інструмэнты',
	'ts-citegen-Other-languages' => 'На іншых мовах',
	'ts-citegen-Save-it' => 'Бягучы запыт',
	'ts-citegen-Errors-title' => 'Памылкі',
	'ts-citegen-Unavailable-API' => 'Памылка: Wikimedia API недаступны',
	'ts-citegen-Unavailable-SQL' => 'Памылка: база зьвестак Toolserver недаступная. MySQL адказаў: %s',
	'ts-citegen-base-disabled' => 'Памылка: база зьвестак %s недаступная.',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'ts-citegen-Title' => 'Vorlagengenerator für Quellennachweise',
	'ts-citegen-Send' => 'Generieren',
	'ts-citegen-Input-title' => 'Angaben',
	'ts-citegen-Input-text' => 'Dies ist ein Vorlagengenerator für Quellennachweise. Mit ihm kannst du die entsprechende Vorlage in den unterschiedlichen Sprachausgaben der Wikipedia zur Nutzung als Einzelnachweis oder Literaturangabe schnell erstellen. Gebe die vorhandenen Daten (%s) in die untenstehenden Felder ein. Das Skript wird dann versuchen mit ihnen die Vorlage zu erstellen. Bei der Angabe der Daten ist es unerheblich welches Feld für welche Angabe genutzt wird. Die richtige Zuordnung zu den einzelnen Parametern der Vorlage wird vom Skript übernommen.',
	'ts-citegen-Option-append-author-link' => 'Der Vorlage Wikilinks zum Autor beifügen',
	'ts-citegen-Option-append-newlines' => 'Nach jedem Parameter eine neue Zeile beginnen',
	'ts-citegen-Option-add-references' => 'Ergänze die Vorlage um „<ref>“-Elemente',
	'ts-citegen-Option-add-list' => 'Erstelle die Vorlagen in Form einer Wikiliste',
	'ts-citegen-Output-title' => 'Ergebnis',
	'ts-citegen-Output-select-disclaimer' => 'Die Auswahl einer Sprache für die Vorlage garantiert nicht das Vorhandensein einer entsprechenden Vorlage in der jeweiligen Sprache. Dieses Auswahlmenü gibt die Sprachen an für die eine Vorlage verfügbar ist. Französisch kann beispielsweise deshalb angezeigt werden, weil lediglich die Vorlage „Cite book“ unterstützt wird.',
	'ts-citegen-Wrong-input' => '%s: Die Angabe wurde nicht als richtige Eingabe erkannt.',
	'ts-citegen-Parsers' => 'Parser',
	'ts-citegen-Skins' => 'Ausgabe',
	'ts-citegen-Skin-skins' => 'Benutzeroberflächen',
	'ts-citegen-Skin-outputformat' => 'Ausgabeformat',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'ts-citegen-Title' => 'Generator citatowych předłohow',
	'ts-citegen-Send' => 'Pósłać',
	'ts-citegen-Input-title' => 'Zapodaće',
	'ts-citegen-Option-append-author-link' => 'Awtorowe wikiwotkazy do předłohi připowěsnyć',
	'ts-citegen-Option-append-newlines' => 'Za kóždym parametrom nowe linki připowěsnyć',
	'ts-citegen-Option-add-references' => 'Taflički <ref> wokoło citowanskich předłohow přidać',
	'ts-citegen-Option-add-list' => 'Wikilisćinu citowacych předłohow wutworić',
	'ts-citegen-Output-title' => 'Wuslědk',
	'ts-citegen-Wrong-input' => '%s: njeidentifikowany jako korektne zapodaće.',
	'ts-citegen-Parsers' => 'Parsery',
	'ts-citegen-Skins' => 'Wudaće',
	'ts-citegen-Skin-skins' => 'Šaty',
	'ts-citegen-Skin-outputformat' => 'Wudatny format',
	'ts-citegen-Template-lang' => 'Rěč předłohi',
	'ts-citegen-Sources-title' => 'Žórła',
	'ts-citegen-Sourcer-text' => 'Deleka je lisćina wužitych žórłow k dispoziciji steji.',
	'ts-citegen-Sidebar-title' => 'Generator citatow',
	'ts-citegen-Sidebar-add-Firefox' => 'K bóčnicy přidać',
	'ts-citegen-Sidebar-add-Opera' => 'Hotlistej Opery přidać',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Page Holderej přidać',
	'ts-citegen-Tools' => 'Nastroje',
	'ts-citegen-Other-languages' => 'Druhe rěče',
	'ts-citegen-Save-it' => 'Aktualne naprašowanje',
	'ts-citegen-Errors-title' => 'Zmylki',
	'ts-citegen-Unavailable-API' => 'Zmylk: API Wikipedije njesteji k dispoziciji',
	'ts-citegen-Unavailable-SQL' => 'Zmylk: Datowa banka Toolserver k dispoziciji njesteji. MySQL wozjewi: %s',
	'ts-citegen-base-disabled' => 'Zmylk: Datowa banka %s njesteji k dispoziciji.',
);

/** Polish (Polski)
 * @author Holek
 */
$messages['pl'] = array(
	'ts-citegen-Title' => 'Generator szablonów cytowania',
	'ts-citegen-Send' => 'Wyślij',
	'ts-citegen-Input-title' => 'Dane wejściowe',
	'ts-citegen-Input-text' => 'To jest generator szablonów cytowania. Za pomocą tego narzędzia możesz szybko uzupełnić różne szablony cytowania dostępne w różnych edycjach językowych Wikipedii. Wpisz w polach poniżej odpowiednie dane (%s), a skrypt postara się wypełnić odpowiednie szablony według danych wejściowych. Pamiętaj, że nie ma znaczenia, w których polach, co wpiszesz. Skrypt automatycznie dopasowuje szablony do wprowadzonych danych.',
	'ts-citegen-Option-append-author-link' => 'Dołączaj linki do artykułów o odpowiednich autorach',
	'ts-citegen-Option-append-newlines' => 'Umieszczaj nowe linie po każdym parametrze',
	'ts-citegen-Option-add-references' => 'Umieść szablony pomiędzy tagami <ref></ref>',
	'ts-citegen-Option-add-list' => 'Dodaj wikilistę do szablonów cytowania',
	'ts-citegen-Output-title' => 'Rezultat',
	'ts-citegen-Output-select-disclaimer' => 'Pamiętaj: wybierając konkretny język skrypt nie gwarantuje, że wszystkie szablony są gotowe do użytku w danym języku. To pole wyświetla listę języków z każdego obsługiwanego szablonu. Na przykład może być w nim dostępny język francuski, ponieważ skrypt obsługuje jedynie francuski odpowiednik {{Cytuj książkę}}.',
	'ts-citegen-Wrong-input' => '%s: nie zidentyfikowano.',
	'ts-citegen-Parsers' => 'Bazy',
	'ts-citegen-Skins' => 'Forma prezentacji',
	'ts-citegen-Skin-skins' => 'Skórki',
	'ts-citegen-Skin-outputformat' => 'Dla botów',
	'ts-citegen-Template-lang' => 'Język szablonu',
	'ts-citegen-Sources-title' => 'Źródła',
	'ts-citegen-Sourcer-text' => 'Poniżej podane są strony, z których korzystano przy pobieraniu informacji o książkach. Każdy z linków przenosi',
	'ts-citegen-Sidebar-title' => 'Generator cytowań',
	'ts-citegen-Sidebar-text' => 'Ta wersja generatora wykorzystuje ustawienia stosowane przez pełną wersję generatora. Jeżeli chcesz np. zmienić język szablonu, zmień go tamże. Ustawienia zapisywane są za pomoca ciasteczek.',
	'ts-citegen-Sidebar-add-Firefox' => 'Dodaj do panelu bocznego',
	'ts-citegen-Sidebar-add-Opera' => 'Dodaj do panelu Opery',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Dodaj do Page Holdera',
	'ts-citegen-Sidebar-add-IE-Mac-details' => 'Gdy strona zostanie załadowana, otwórz Page Holder, naciśnij "Dodaj" i użyj przycisku Ulubionych Page Holdera, aby zapisać generator w panelu.',
	'ts-citegen-Tools' => 'Narzędzia',
	'ts-citegen-Other-languages' => 'W innych językach',
	'ts-citegen-Save-it' => 'Samowywołanie (zapisz tę stronę)',
	'ts-citegen-Errors-title' => 'Błędy',
	'ts-citegen-Unavailable-API' => 'Błąd: API Wikipedii jest niedostępne',
	'ts-citegen-Unavailable-SQL' => 'Błąd: Dostęp do bazy danych SQL niemożliwy',
	'ts-citegen-base-disabled' => 'Błąd: Baza %s jest niedostępna',
);

