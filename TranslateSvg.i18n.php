<?php
/**
 * Internationalisation for TranslateSVG extension
 *
 * @file
 * @ingroup Extensions
 */
 
$messages = array();

/** English
 * @author jarry1250
 */
$messages['en'] = array(
	'translatesvg'         => 'TranslateSVG', //Ignore
	'translatesvg-desc'    => 'Provides a native-style interface for translating SVGs in line with the SVG1.1 specification',
	'translatesvg-legend'  => 'File path',
	'translatesvg-page'    => 'File:',
	'translatesvg-submit'  => 'Go',
	'translatesvg-summary' => 'This special page allows you to add, remove and modify translations embedded within a given SVG image file.',
	'translatesvg-add'     => 'If your language is not listed already, you can [[#addlanguage|add it]].',
	'translatesvg-xcoordinate-pre' => 'X-coordinate (horizontal):',
	'translatesvg-ycoordinate-pre' => 'Y-coordinate (vertical):',
	'translatesvg-specify' => 'Specify new language code (e.g. en, fr, de, es, ...)',
	'translatesvg-fallbackdesc' => 'Default (no language specified)',
	'translatesvg-qqqdesc' => 'Advice to translators',
	'translatesvg-nodesc'  => '(no description)',
	'translatesvg-remove'  => 'Remove all translations in this language'
);

/** Message documentation (Message documentation)
 * @author jarry1250
 */
$messages['qqq'] = array(
	'translatesvg-desc' => '{{desc}}',
	'translatesvg-legend' => 'Form legend; general description of the purposes of the form (to ask for a file path)',
	'translatesvg-page' => 'Label for a form input',
	'translatesvg-submit' => 'Text of a button to progress onto next stage of the translation',
	'translatesvg-summary' => 'General description of the special page, displayed at the top of it so users know what they are looking at',
	'translatesvg-add' => 'Introduction sentence available to JavaScript-enabled users including a link to add translations in a new language. The anchor (#addlanguage) does not need translation.',
	'translatesvg-xcoordinate-pre' => 'Label for a form input for the adjustment of the X-coordinate (horizontal position) of the text being translated',
	'translatesvg-ycoordinate-pre' => 'Label for a form input for the adjustment of the Y-coordinate (vertical position) of the text being translated',
	'translatesvg-specify' => 'Prompt asking for the two or three letter code (or similar) of the language they wish to translate into',
	'translatesvg-fallbackdesc' => 'The heading of the section that contains translations representing the fallback (default) language. The fallback language is used when translations aren\'t available. Comparable to other language headings such as "English", "Deutsch", etc.',
	'translatesvg-qqqdesc' => 'The heading of the section that contains descriptions of the context of each translation (i.e. translations into the language with code "qqq"). Comparable to other language headings such as "English", "Deutsch", etc.',
	'translatesvg-nodesc' => 'The text that appears next to a translation when no description (translation into language qqq) exists.',
	'translatesvg-remove' => 'Tooltip for a link attached to each translation language group which remove all form elements relating to the language group it is attached to',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'translatesvg-desc' => 'Ergänzt eine Spezialseite mit der SVG-Dateien in Einklang mit den SVG1.1-Spezifikationen übersetzt werden können',
	'translatesvg-legend' => 'Dateipfad',
	'translatesvg-page' => 'Datei:',
	'translatesvg-submit' => 'Ausführen',
	'translatesvg-summary' => 'Diese Spezialseite ermöglicht das Hinzufügen, Entfernen und Modifizieren von in SVG-Dateien eingebetteten Übersetzungen.',
	'translatesvg-add' => 'Sofern deine Sprache nicht bereits hier aufgeführt ist, kannst du sie [[#addlanguage|hinzufügen]].',
	'translatesvg-xcoordinate-pre' => 'X-Koordinate (horizontal):',
	'translatesvg-ycoordinate-pre' => 'Y-Koordinate (vertikal):',
	'translatesvg-specify' => 'Einen neuen Sprachcode angeben (z. B. de, en, es, fr …)',
	'translatesvg-fallbackdesc' => 'Standard (keine Sprache ist angegeben)',
	'translatesvg-qqqdesc' => 'Ratschläge für Übersetzer',
	'translatesvg-nodesc' => '(keine Beschreibung)',
	'translatesvg-remove' => 'Alle Übersetzungen in dieser Sprache entfernen',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'translatesvg-add' => 'Sofern Ihre Sprache nicht bereits hier aufgeführt ist, können Sie sie [[#addlanguage|hinzufügen]].',
);

/** Finnish (Suomi)
 * @author Crt
 */
$messages['fi'] = array(
	'translatesvg-submit' => 'Siirry',
);

/** French (Français)
 * @author Gomoko
 */
$messages['fr'] = array(
	'translatesvg-desc' => 'Fournit une interface de style natif pour traduire les SVGs en ligne conformément à la spécification SVG1.1',
	'translatesvg-legend' => 'Chemin du fichier',
	'translatesvg-page' => 'Fichier:',
	'translatesvg-submit' => 'Suivant',
	'translatesvg-summary' => "Cette page spéciale vous permet d'ajouter, supprimer et modifier les traductions intégrées dans un fichier d'image SVG donné.",
	'translatesvg-add' => "Si votre langue n'est pas déjà répertoriée, vous pouvez [[#addlanguage|l'ajouter]].",
	'translatesvg-xcoordinate-pre' => 'Coordonnée X (horizontal):',
	'translatesvg-ycoordinate-pre' => 'Coordonnée Y (vertical):',
	'translatesvg-specify' => 'Spécifiez le nouveau code de langue (par ex. en, fr, de, es,...)',
	'translatesvg-fallbackdesc' => 'Par défaut (aucune langue spécifiée)',
	'translatesvg-qqqdesc' => 'Conseil aux traducteurs',
	'translatesvg-nodesc' => '(aucune description)',
	'translatesvg-remove' => 'Supprimer toutes les traductions dans cette langue.',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'translatesvg-desc' => 'Proporciona unha inteface de estilo nativa para a tradución de ficheiros SVG en liña coa especificación SVG1.1.',
	'translatesvg-legend' => 'Ruta do ficheiro',
	'translatesvg-page' => 'Ficheiro:',
	'translatesvg-submit' => 'Ir',
	'translatesvg-summary' => 'Esta páxina especial permite engadir, eliminar e modificar as traducións incluídas no ficheiro de imaxe SVG especificado.',
	'translatesvg-add' => 'Se a súa lingua aínda non aparece na lista pode [[#addlanguage|engadila]].',
	'translatesvg-xcoordinate-pre' => 'Coordenada X (horizontal):',
	'translatesvg-ycoordinate-pre' => 'Coordenada Y (vertical):',
	'translatesvg-specify' => 'Especifique o código da nova lingua (por exemplo: en, fr, de, es...)',
	'translatesvg-fallbackdesc' => 'Predeterminado (sen especificación de lingua)',
	'translatesvg-qqqdesc' => 'Consello para os tradutores',
	'translatesvg-nodesc' => '(sen descrición)',
	'translatesvg-remove' => 'Eliminar todas as traducións nesta lingua',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'translatesvg-page' => 'Fichier:',
	'translatesvg-submit' => 'Lass',
	'translatesvg-add' => 'Wann Är Sprooch net schonn an der Lëscht dran ass, kënnt Dir se [[#addlanguage|derbäisetzen]].',
	'translatesvg-qqqdesc' => 'Tuyau fir Iwwersetzer',
	'translatesvg-nodesc' => '(keng Beschreiwung)',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'translatesvg-desc' => 'Дава поредник за преведување на SVG податотеки во склад со одредбите на SVG1.1',
	'translatesvg-legend' => 'Патека на податотеката',
	'translatesvg-page' => 'Податотека:',
	'translatesvg-submit' => 'Оди',
	'translatesvg-summary' => 'Оваа специјална страница ви овозможува да додавате, отстранувате и менувате преводи на содржините на SVG слики.',
	'translatesvg-add' => 'Ако го нема вашиот јазик, тогаш [[#addlanguage|додајте го]].',
	'translatesvg-xcoordinate-pre' => 'X-координата (хоризонтално):',
	'translatesvg-ycoordinate-pre' => 'Y-координата (вертикално):',
	'translatesvg-specify' => 'Внесете нов јазичен код (на пр. mk, en, fr, de...)',
	'translatesvg-fallbackdesc' => 'По основно (неукажан јазик)',
	'translatesvg-qqqdesc' => 'Совет за преведувачите',
	'translatesvg-nodesc' => '(нема опис)',
	'translatesvg-remove' => 'Отстрани ги сите преводи на овој јазик',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'translatesvg-desc' => 'Biedt een interface voor het vertalen van SVG-bestanden in het bestand zelf volgens de SVG1.1-specificatie',
	'translatesvg-legend' => 'Bestandslocatie',
	'translatesvg-page' => 'Bestand:',
	'translatesvg-submit' => 'OK',
	'translatesvg-summary' => 'Via deze speciale pagina kunt u vertalingen in een SVG-afbeeldingsbestand toevoegen, verwijderen en aanpassen.',
	'translatesvg-add' => 'Als uw taal niet al in de lijst voorkomt, dan kunt u deze [[#addlanguage|toevoegen]].',
	'translatesvg-xcoordinate-pre' => 'X-coördinaat (horizontaal):',
	'translatesvg-ycoordinate-pre' => 'Y-coördinaat (verticaal):',
	'translatesvg-specify' => 'Geef de code van de nieuwe taal op (bijvoorbeeld: nl, en, fr, de, es, ...)',
	'translatesvg-fallbackdesc' => 'Standaard (geen taal opgegeven)',
	'translatesvg-qqqdesc' => 'Advies aan vertalers',
	'translatesvg-nodesc' => '(geen beschrijving)',
	'translatesvg-remove' => 'Alle vertalingen in deze taal verwijderen',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'translatesvg-submit' => 'వెళ్ళు',
	'translatesvg-nodesc' => '(వివరణ లేదు)',
);

