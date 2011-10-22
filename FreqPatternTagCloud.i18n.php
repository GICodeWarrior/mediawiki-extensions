<?php
/**
 * Frequent Pattern Tag Cloud Plug-in
 * Internationalization
 *
 * @author Tobias Beck, University of Heidelberg
 * @author Andreas Fay, University of Heidelberg
 * @version 1.0
 */

$messages = array();

/** English */
$messages['en'] = array(
	'freqpatterntagcloud' => 'Frequent Pattern Tag Cloud',
	'freqpatterntagcloudmaintenance' => 'Frequent Pattern Tag Cloud Maintenance',
	'freqpatterntagcloud-desc' => '[[Special:FreqPatternTagCloud|Special page]] to build a tag cloud based on properties and to search for similar property values',
	'fptc-categoryname' => 'Category',
	'fptc-context-menu-browse' => 'Browse pages with this value',
	'fptc-context-menu-similar-tags' => 'Similar tags:',
	'fptc-form-attribute-name' => 'Property:',
	'fptc-form-submit-button' => 'Submit',
	'fptc-invalid-attribute' => 'The entered property is invalid.',
	'fptc-insufficient-rights-for-maintenance' => 'You have to log in as administrator to view this page.',
	'fptc-refresh-frequent-patterns' => 'Refresh data',
	'fptc-refreshed-frequent-patterns' => 'Frequent pattern rules refreshed.',
	'fptc-search-attribute-name' => 'Search property',
	'fptc-search-button' => 'Search',
	'fptc-search-suggestion-value' => 'Similar to "%s":',
	'fptc-suggestion' => 'Do you mean:',
	'fptc-no-suggestion' => 'No suggestions found'
);

/** Message documentation (Message documentation) */
$messages['qqq'] = array(
	'freqpatterntagcloud' => 'This message is the page title of the frequent-pattern-tag-cloud-specialpage and must not be translated.',
	'freqpatterntagcloudmaintenance' => 'This message is the page title of the frequent-pattern-tag-cloud-maintenace-specialpage and must not be translated.',
	'fptc-categoryname' => 'This message is the name of the category-attribut which is used in SemantikMediaWiki (e.g. category:example)',
	'fptc-context-menu-browse' => 'This message is used as a title in context menu of the tag cloud tags',
	'fptc-context-menu-similar-tags' => 'This message is used as a title in context menu of the tag cloud tags',
	'fptc-form-attribute-name' => 'This message describes the input box on the frequent-pattern-tag-cloud-specialpage',
	'fptc-form-submit-button' => 'This message is the text of the button which submits the value in the input box on the frequent-pattern-tag-cloud-specialpage',
	'fptc-invalid-attribute' => 'This message appears if the value in the input box on the frequent-pattern-tag-cloud-specialpage is invalid',
	'fptc-insufficient-rights-for-maintenance' => 'This message appears when calling the frequent-pattern-tag-cloud-maintenace-specialpage and the user is not a administrator.',
	'fptc-refresh-frequent-patterns' => 'This message is the text of the button to refresh the frequent patterns on the frequent-pattern-tag-cloud-maintenace-specialpage',
	'fptc-refreshed-frequent-patterns' => 'This message appears after successful update of the frequent patterns.',
	'fptc-search-attribute-name' => 'This message describes the search input box.',
	'fptc-search-button' => 'This message is the text of the button search',
	'fptc-search-suggestion-value' => 'This mesage is the title of the search suggestions (parameter %s = suggestion, do not translate)',
	'fptc-suggestion' => 'This message appears after submitting an invalid value in the input box on the frequent-pattern-tag-cloud-specialpage',
	'fptc-no-suggestion' => 'This message appears if no suggestions can be found.',
);

/** German (Deutsch)
 * @author Andreas Fay, University of Heidelberg
 * @author Kghbln
 * @author Tobias Beck, University of Heidelberg
 */
$messages['de'] = array(
	'freqpatterntagcloud' => 'Frequent Pattern Tag Cloud',
	'freqpatterntagcloudmaintenance' => 'Administration von Frequent Pattern Tag Cloud',
	'freqpatterntagcloud-desc' => 'Ergänzt eine [[Special:FreqPatternTagCloud|Spezialseite]] zum Erstellen einer Stichwortwolke auf Basis von Attributen sowie zur Suche ähnlicher Attributwerte',
	'fptc-categoryname' => 'Kategorie',
	'fptc-context-menu-browse' => 'Durchsuche Seiten mit diesem Wert',
	'fptc-context-menu-similar-tags' => 'Ähnliche Attribute:',
	'fptc-form-attribute-name' => 'Attribut:',
	'fptc-form-submit-button' => 'Speichern',
	'fptc-invalid-attribute' => 'Das eingegebene Attribut ist ungültig.',
	'fptc-insufficient-rights-for-maintenance' => 'Um diese Seite sehen zu können, muss man ein Administrator sein.',
	'fptc-refresh-frequent-patterns' => 'Daten aktualisieren',
	'fptc-refreshed-frequent-patterns' => "Die Regeln für ''Frequent Pattern'' wurden neu generiert.",
	'fptc-search-attribute-name' => 'Suche nach Attribut',
	'fptc-search-button' => 'Suche',
	'fptc-search-suggestion-value' => 'Ähnlich zu „%s“:',
	'fptc-suggestion' => 'Meintest du:',
	'fptc-no-suggestion' => 'Es wurden keine Vorschläge gefunden.',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'fptc-suggestion' => 'Meinten Sie:',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'freqpatterntagcloud' => 'Frequent Pattern Tag Cloud',
	'freqpatterntagcloudmaintenance' => 'Frequent Pattern Tag Cloud Maintenance',
	'freqpatterntagcloud-desc' => '[[Special:FreqPatternTagCloud|Páxina especial]] para construír unha nube de etiquetas baseada en propiedades e para procurar valores de propiedades similares',
	'fptc-categoryname' => 'Categoría',
	'fptc-context-menu-browse' => 'Navegar polas páxinas con este valor',
	'fptc-context-menu-similar-tags' => 'Etiquetas similares:',
	'fptc-form-attribute-name' => 'Propiedade:',
	'fptc-form-submit-button' => 'Enviar',
	'fptc-invalid-attribute' => 'A propiedade inserida non é válida.',
	'fptc-insufficient-rights-for-maintenance' => 'Cómpre acceder como administrador para ollar esta páxina.',
	'fptc-refresh-frequent-patterns' => 'Actualizar os datos',
	'fptc-refreshed-frequent-patterns' => 'Actualizáronse os patróns frecuentes.',
	'fptc-search-attribute-name' => 'Procurar a propiedade',
	'fptc-search-button' => 'Procurar',
	'fptc-search-suggestion-value' => 'Similar a "%s":',
	'fptc-suggestion' => 'Quizais quixo dicir:',
	'fptc-no-suggestion' => 'Non se atopou suxestión ningunha',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'freqpatterntagcloud' => 'Облак со ознаки на зачестено поведение',
	'freqpatterntagcloudmaintenance' => 'Одржување на облакот со ознаки на зачестено поведение',
	'freqpatterntagcloud-desc' => '[[Special:FreqPatternTagCloud|Специјална страница]] за составување на облак од ознаки според својства и за пребарување на слични својствени вредности',
	'fptc-categoryname' => 'Категорија',
	'fptc-context-menu-browse' => 'Прелистување на страници со оваа вредност',
	'fptc-context-menu-similar-tags' => 'Слични ознаки:',
	'fptc-form-attribute-name' => 'Својство:',
	'fptc-form-submit-button' => 'Поднеси',
	'fptc-invalid-attribute' => 'Внесеното својство е неважечко.',
	'fptc-insufficient-rights-for-maintenance' => 'Ќе мора да се најавите како администратор за да ви се отвори страницава.',
	'fptc-refresh-frequent-patterns' => 'Поднови податоци',
	'fptc-refreshed-frequent-patterns' => 'Правилата на зачестено поведение се подновени.',
	'fptc-search-attribute-name' => 'Пребарај својство',
	'fptc-search-button' => 'Пребарај',
	'fptc-search-suggestion-value' => 'Слично на „%s“:',
	'fptc-suggestion' => 'Дали мислевте на:',
	'fptc-no-suggestion' => 'Не пронајдов ниеден предлог',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 */
$messages['nl'] = array(
	'fptc-categoryname' => 'Categorie',
	'fptc-suggestion' => 'Bedoelt u:',
);

