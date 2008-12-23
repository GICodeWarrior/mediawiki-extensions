<?php
/**
 * Translations of Translate extension.
 *
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$messages = array();

/** English
 * @author Nike
 * @author Siebrand
 */
$messages['en'] = array(
	'translate'         => 'Translate',
	'translate-desc'    => '[[Special:Translate|Special page]] for translating MediaWiki and beyond',
	'translate-edit'    => 'edit',
	'translate-talk'    => 'talk',
	'translate-history' => 'history',

	'translate-task-view'                 => 'View all messages from',
	'translate-task-untranslated'         => 'View all untranslated messages from',
	'translate-task-optional'             => 'View optional messages from',
	'translate-task-untranslatedoptional' => 'View untranslated optional messages from',
	'translate-task-problematic'          => 'View messages that have problems',
	'translate-task-review'               => 'Review changes to',
	'translate-task-reviewall'            => 'Review all translated messages in',
	'translate-task-export'               => 'Export translations from',
	'translate-task-export-to-file'       => 'Export translation to file from',
	'translate-task-export-as-po'         => 'Export translation in Gettext format',
	'translate-task-export-to-xliff'      => 'Export translation in Xliff format',

	'translate-page-no-such-language' => 'Specified language was invalid.',
	'translate-page-no-such-task'     => 'Specified task was invalid.',
	'translate-page-no-such-group'    => 'Specified group was invalid.',

	'translate-page-disabled'  => "Translations to this language in this group have been disabled. Reason:

''$1''",

	'translate-page-settings-legend' => 'Settings',
	'translate-page-task'            => 'I want to',
	'translate-page-group'           => 'Group',
	'translate-page-language'        => 'Language',
	'translate-page-limit'           => 'Limit',
	'translate-page-limit-option'    => '$1 {{PLURAL:$1|message|messages}} per page',
	'translate-submit'               => 'Fetch',

	'translate-page-navigation-legend' => 'Navigation',
	'translate-page-showing'           => 'Showing messages from $1 to $2 of $3.',
	'translate-page-showing-all'       => 'Showing $1 {{PLURAL:$1|message|messages}}.',
	'translate-page-showing-none'      => 'No messages to show.',
	'translate-page-paging-links'      => '[ $1 ] [ $2 ]',
	'translate-next'                   => 'Next page',
	'translate-prev'                   => 'Previous page',

	'translate-page-description-legend' => 'Information about the group',
	'translate-page-edit'               => 'edit',

	'translate-optional' => '(optional)',
	'translate-ignored'  => '(ignored)',

	'translate-edit-definition'         => 'Message definition',
	'translate-edit-contribute'         => 'contribute',
	'translate-edit-no-information'     => "''This message has no documentation.
If you know where or how this message is used, you can help other translators by adding documentation to this message.''",
	'translate-edit-information'        => 'Information about this message ($1)',
	'translate-edit-in-other-languages' => 'Message in other languages',
	'translate-edit-committed'          => 'Current translation in software',
	'translate-edit-warnings'           => 'Warnings about incomplete translations',

	'translate-edit-goto-no-prev'       => 'No previous message',
	'translate-edit-goto-no-next'       => 'No next message',
	'translate-edit-goto-prev'          => 'Edit previous message',
	'translate-edit-goto-next'          => 'Edit next message',
	'translate-edit-goto-list'          => 'Back to the list',

	'translate-magic-pagename'    => 'Extended MediaWiki translation',
	'translate-magic-help'        => 'You can translate special pages aliases, magic words, skin names and namespace names.

Special page aliases and magic words can have multiple translations.
Translations are separated by a comma (,).
Skin names and namespaces can have only one translation.

In namespace translations <tt>$1 talk</tt> is special. <tt>$1</tt> is replaced with sitename (for example <tt>{{SITENAME}} talk</tt>).
If it is not possible in your language to form valid expression without changing sitename, please contact a developer.

You need to be in the translators group to save changes.
Changes are not saved until you click save button below.',
	'translate-magic-module'      => 'Module:',
	'translate-magic-submit'      => 'Fetch',
	'translate-magic-cm-export'   => 'Export', // cm- should be removed

	'translate-magic-cm-to-be'    => 'To-be',
	'translate-magic-cm-current'  => 'Current',
	'translate-magic-cm-original' => 'Original',

	'translate-magic-cm-comment' => 'Comment:',
	'translate-magic-cm-save'    => 'Save',

	'translate-magic-cm-updatedusing' => 'Updated using [[Special:Magic]]',
	'translate-magic-cm-savefailed'   => 'Save failed',

	'translate-magic-special'   => 'Special page aliases',
	'translate-magic-words'     => 'Magic words',
	'translate-magic-skin'      => 'Skin names',
	'translate-magic-namespace' => 'Namespace names',

	'translationchanges'        => 'Translation changes',
	'translationchanges-export' => 'export',
	'translationchanges-change' => '$1: $2 by $3',

	'translate-checks-parameters'         => 'Following {{PLURAL:$2|parameter is|parameters are}} not used:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => 'Following {{PLURAL:$2|parameter is|parameters are}} unknown:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance'            => 'There is an uneven amount of {{PLURAL:$2|parentheses|parentheses}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links'              => 'Following {{PLURAL:$2|link is|$2 links are}} problematic:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml'              => 'Please replace the following {{PLURAL:$2|tag|tags}} with correct ones:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural'             => 'Definition uses <nowiki>{{PLURAL:}}</nowiki> but translation does not.',
	'translate-checks-pagename'           => 'Namespace changed from the definition',
	'translate-checks-format'             => 'This translation does not follow the definition or has invalid syntax: $1',

	'tog-translate-nonewsletter' => 'Do not send me e-mail newsletters (relevant only for users with a confirmed e-mail address)',
	'right-translate'            => 'Edit using the translate interface',

	'translate-rc-translation-filter' => 'Filter translations:',
	'translate-rc-translation-filter-no' => 'Do nothing',
	'translate-rc-translation-filter-only' => 'Show translations only',
	'translate-rc-translation-filter-filter' => 'Filter out translations',
	'translate-rc-translation-filter-site' => 'Changes to site messages only',

	'translationstats' => 'Translation statistics',

	'translate-stats-edits' => 'Edits',
	'translate-stats-users' => 'Translators',

	'translate-statsf-intro' => 'You can generate simple statistics with this form. All values have upper and lower limits.',
	'translate-statsf-options' => 'Graph options',
	'translate-statsf-width' => 'Width in pixels',
	'translate-statsf-height' => 'Height in pixels',
	'translate-statsf-days' => 'Time period in days',
	'translate-statsf-scale' => 'Granularity',
	'translate-statsf-scale-days' => 'Days',
	'translate-statsf-scale-hours' => 'Hours',
	'translate-statsf-count' => 'Measure',
	'translate-statsf-count-edits' => 'Number of edits',
	'translate-statsf-count-users' => 'Active translators',
	'translate-statsf-language' => 'Comma-separated list of language codes',
	'translate-statsf-group' => 'Comma-separated list of group codes',
	'translate-statsf-submit' => 'Preview',

	'translate-tag-category' => 'Translatable pages',
	'translate-tag-page-desc' => 'Translation of the wiki page [[:$1]].',

	'translate-tag-translate-link-desc' => 'Translate this page',
	'translate-tag-legend' => 'Legend:',
	'translate-tag-legend-fallback' => 'Translation in other language',
	'translate-tag-legend-fuzzy' => 'Outdated translation',

	'translate-tag-fuzzy-comment' => 'Definition changed by [[User:$1|$1]] in revision $2.',
	'translate-tag-fuzzy-reason'  => 'Definition changed by "$1" with comment "$3" in $2.',

	'translate-sidebar-alltrans'  => 'Other translations',

	'translate-tag-noedit' => 'This page is automatically updated translation page.
You can [$1 edit the source page] or [$2 update the translation].',

	# Special:Translations
	'translations' => 'All translations',
	'translations-summary' => 'Enter a message name below to show all available translations.',
	'translate-translations-no-message' => '"$1" is not a translatable message',
	'translate-translations-none' => 'There are no translations for "$1"',
	'translate-translations-fieldset-title' => 'All translations',
	'translate-translations-messagename' => 'Message:',
	'translate-translations-including-no-param' => 'Please specify a valid page name in the subpage parameter',

	# Special:LanguageStats
	'languagestats' => 'Language statistics',
	'languagestats-summary' => 'This page shows translation statistics for all ([[MediaWiki:Translate-languagestats-groups|configured]]) message groups for a language.',
	'translate-language-code' => 'Language code',
	'translate-language-code-field-name' => 'Language code:',
	'translate-suppress-complete' => 'Suppress completely translated message groups',
	'translate-language' => 'Language',
	'translate-total' => 'Messages',
	'translate-untranslated' => 'Untranslated',
	'translate-percentage-complete' => 'Completion',
	'translate-percentage-fuzzy' => 'Outdated',
	'translate-languagestats-groups' => ' # Add message group IDs, one per line to restrict the message groups that
 # are shown on Special:LanguageStats. Non-existing message group IDs will
 # be ignored.', # do not duplicate this message to other languages
);

/** Message documentation (Message documentation)
 * @author Darth Kule
 * @author Jon Harald Søby
 * @author Lejonel
 * @author Lloffiwr
 * @author Meno25
 * @author Nike
 * @author Purodha
 * @author SPQRobin
 * @author Sanbec
 * @author Siebrand
 * @author Toliño
 * @author פוילישער
 */
$messages['qqq'] = array(
	'translate' => 'Part of the "Translate" extension. This message is the page title of the special page [[Special:Translate]]. It is the verb "to translate" and should be in the infinitive mood.

{{Identical|Translate}}',
	'translate-desc' => 'Short description of the Translate extension, shown in [[Special:Version]]. Do not translate or change links.',
	'translate-edit' => '{{Identical|Edit}}',
	'translate-talk' => '{{Identical|Talk}}',
	'translate-history' => '{{Identical|History}}',
	'translate-task-untranslated' => "Option in 'I want to' drop-down box on Translate page",
	'translate-page-no-such-language' => "Shown when someone requests a language that doesn't exists. [{{FULLURL:Special:Translate|language=}} Example].",
	'translate-page-no-such-task' => "Shown when someone requests a task that doesn't exists. [{{FULLURL:Special:Translate|task=invalidtask&group=core}} Example].",
	'translate-page-no-such-group' => "Shown when someone requests a group that doesn't exists. [{{FULLURL:Special:Translate|group=invalidgroup}} Example].",
	'translate-page-group' => '{{Identical|Group}}',
	'translate-page-language' => '{{Identical|Language}}',
	'translate-submit' => '{{Identical|Fetch}}',
	'translate-page-navigation-legend' => '{{Identical|Navigation}}',
	'translate-next' => '{{Identical|Next page}}',
	'translate-prev' => '{{Identical|Previous page}}',
	'translate-page-edit' => '{{Identical|Edit}}',
	'translate-optional' => '{{Identical|Optional}}',
	'translate-edit-no-information' => 'Message is used as a hint to translators that documentation for a message without documentation is needed.',
	'translate-edit-in-other-languages' => 'Caption for box which contains translation of message in other languages',
	'translate-magic-help' => 'Description of [[Special:AdvancedTranslate]].',
	'translate-magic-submit' => '{{Identical|Fetch}}',
	'translate-magic-cm-export' => '{{Identical|Export}}',
	'translate-magic-cm-current' => '{{Identical|Current}}',
	'translate-magic-cm-comment' => '{{Identical|Comment}}',
	'translate-magic-cm-save' => '{{Identical|Save}}',
	'translationchanges' => 'Title of [[Special:TranslationChanges]]',
	'translationchanges-export' => '{{Identical|Export}}',
	'translate-checks-balance' => 'This translation warning is displayed if the number of opening brackets ("[", "{", and "(") is different from the number of closing brackets ("]", "}", and ")").

* Parameter $1 is a list of the unbalanced brackets, for example "\'\'\'[]: 1\'\'\'" which means that there is one missing closing square brackets.
* Parameter $2 is the number of types of parentheses that are unbalanced.',
	'tog-translate-nonewsletter' => "Option in [[Special:Preferences]], 'Misc' tab.",
	'right-translate' => '{{doc-right}}',
	'translate-rc-translation-filter' => 'Name of filter in [[Special:RecentChanges]]. Gives a user the option to filter out translations, show translations only, or do nothing (default).',
	'translate-rc-translation-filter-no' => 'Option for filter in [[Special:RecentChanges]]. Selecting this option results in the filter not doing anything. It is the default value.',
	'translate-rc-translation-filter-only' => 'Option for filter in [[Special:RecentChanges]]. Selecting this option results in the filter only showing recent changes that are translations.',
	'translate-rc-translation-filter-filter' => 'Option for filter in [[Special:RecentChanges]]. Selecting this option results in the filter not showing any recent changes that are translations.',
	'translate-rc-translation-filter-site' => 'Selects changes to MediaWiki-messages without a language code in the [[Special:RecentChanges|recentchanges]].
For example MediaWiki:Common.css, but not MediaWiki:Common.css/fr or other messages for specific languages.
These messages will not be submitted to svn, but will only affect the interface on Betawiki.',
	'translate-statsf-submit' => '{{Identical|Preview}}',
	'translations' => 'Title of [[Special:Translations]].',
	'translations-summary' => 'Used in [[Special:Translations]].',
	'translate-translations-no-message' => 'Error message used in [[Special:Translations]].',
	'translate-translations-fieldset-title' => 'Name of fieldset in [[Special:Translations]].',
	'translate-translations-messagename' => 'Used in [[Special:Translations]].',
	'languagestats' => 'Title of [[Special:LanguageStats]].',
	'languagestats-summary' => 'Used in [[Special:LanguageStats]].',
	'translate-language-code' => 'Name of fieldset in [[Special:LanguageStats]].',
	'translate-language-code-field-name' => 'Used in [[Special:LanguageStats]].',
	'translate-suppress-complete' => 'Used in [[Special:LanguageStats]].',
	'translate-language' => '{{Identical|Language}}',
	'translate-percentage-complete' => 'Used in [[Special:LanguageStats]].',
	'translate-percentage-fuzzy' => 'Used in [[Special:LanguageStats]].',
);

/** Faeag Rotuma (Faeag Rotuma)
 * @author Jose77
 */
$messages['rtm'] = array(
	'translate-edit' => "a'tū'ạki",
	'translate-talk' => 'hạifäeaga',
	'translate-page-edit' => "a'tū'ạki",
);

/** Karelian (Karjala)
 * @author Flrn
 */
$messages['krl'] = array(
	'translate-edit' => 'muokkaus',
	'translate-talk' => 'pagin',
	'translate-page-navigation-legend' => 'Valličy',
);

/** Niuean (ko e vagahau Niuē)
 * @author Jose77
 */
$messages['niu'] = array(
	'translate-edit' => 'fakahakohako',
	'translate-history' => 'liu onoono atu ki tua',
	'translate-page-navigation-legend' => 'Navikati',
);

/** Afrikaans (Afrikaans)
 * @author Arnobarnard
 * @author Naudefj
 * @author SPQRobin
 */
$messages['af'] = array(
	'translate' => 'Vertaal',
	'translate-desc' => '[[Special:Translate|Spesiale bladsy]] vir vertaal van MediaWiki en meer',
	'translate-edit' => 'wysig',
	'translate-talk' => 'bespreking',
	'translate-history' => 'geskiedenis',
	'translate-task-view' => 'alle boodskappe bekyk van',
	'translate-task-untranslated' => 'alle onvertaalde boodskappe bekyk van',
	'translate-task-optional' => 'opsionele boodskappe bekyk van',
	'translate-task-problematic' => 'boodskappe met probleme bekyk',
	'translate-task-review' => 'Hersien wysigings aan',
	'translate-task-reviewall' => 'Hersien alle vertalings in',
	'translate-page-no-such-language' => 'Gespesifiseerde taal is ongeldig.',
	'translate-page-no-such-task' => 'Die gevraagde funksie bestaan nie.',
	'translate-page-no-such-group' => 'Die gevraagde groep bestaan nie.',
	'translate-page-disabled' => "Vertalings in die taal vir hierdie groep is gedeaktiveer. Rede:

''$1''",
	'translate-page-settings-legend' => 'Verstellings',
	'translate-page-task' => 'Ek wil',
	'translate-page-group' => 'Groep',
	'translate-page-language' => 'Taal',
	'translate-page-limit' => 'Limiet',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|boodskap|boodskappe}} per bladsy',
	'translate-submit' => 'Gaan haal',
	'translate-page-navigation-legend' => 'Navigasie',
	'translate-page-showing' => 'Wys boodskappe van $1 tot $2 uit $3.',
	'translate-page-showing-all' => 'Wys $1 {{PLURAL:$1|boodskap|boodskappe}}.',
	'translate-page-showing-none' => 'Geen boodskappe om te wys nie.',
	'translate-next' => 'Volgende bladsy',
	'translate-prev' => 'Vorige bladsy',
	'translate-page-description-legend' => 'Inligting oor hierdie groep',
	'translate-page-edit' => 'wysig',
	'translate-optional' => '(opsioneel)',
	'translate-ignored' => '(geïgnoreer)',
	'translate-edit-definition' => 'Boodskap definisie',
	'translate-edit-contribute' => 'wysig',
	'translate-edit-no-information' => "''Die boodskap het geen dokumentasie nie.''
''As u weet waar die boodskap gebruik word, kan u ander gebruikers help deur dokumentasie by te voeg.''",
	'translate-edit-information' => 'Inligting oor hierdie boodskap ($1)',
	'translate-edit-in-other-languages' => 'Boodskap in andere tale',
	'translate-edit-committed' => 'Huidige vertaling in sagteware',
	'translate-edit-warnings' => 'Waarskuwings oor onvoltooide vertalings',
	'translate-edit-goto-no-prev' => 'Geen vorige boodskap',
	'translate-edit-goto-no-next' => 'Geen volgende boodskap',
	'translate-edit-goto-prev' => 'Wysig vorige boodskap',
	'translate-edit-goto-next' => 'Wysig volgende boodkap',
	'translate-edit-goto-list' => 'Terug na die lys',
	'translate-magic-pagename' => 'Uitgebreide MediaWiki-vertaling',
	'translate-magic-module' => 'Module:',
	'translate-magic-submit' => 'Gaan haal',
	'translate-magic-cm-export' => 'Eksporteer',
	'translate-magic-cm-to-be' => 'Toekomstig',
	'translate-magic-cm-current' => 'Huidig',
	'translate-magic-cm-original' => 'Oorspronklik',
	'translate-magic-cm-comment' => 'Samevatting:',
	'translate-magic-cm-save' => 'Stoor',
	'translate-magic-cm-updatedusing' => 'Opgedateer deur [[Special:Magic]] te gebruik',
	'translate-magic-cm-savefailed' => 'Stoor het gefaal',
	'translate-magic-special' => 'Alternatiewe spesiale bladsye',
	'translate-magic-words' => 'Magiese woorde',
	'translate-magic-skin' => 'Omslagname',
	'translate-magic-namespace' => 'Naamruimtename',
	'translationchanges' => 'Vertaling wysigings',
	'translationchanges-export' => 'eksporteer',
	'translationchanges-change' => '$1: $2 deur $3',
	'right-translate' => 'Wysig via die vertaalkoppelvlak',
	'translate-rc-translation-filter-no' => 'Doen niks nie',
	'translationstats' => 'Vertaalstatistieke',
	'translate-stats-edits' => 'Wysigings per dag:',
	'translate-stats-users' => 'Vertalers',
	'translate-statsf-options' => 'Grafiekopsies',
	'translate-statsf-width' => 'Breedte in pixels',
	'translate-statsf-height' => 'Hoogte in pixels',
	'translate-statsf-days' => 'Periode in dae',
	'translate-statsf-scale' => 'Granulariteit',
	'translate-statsf-scale-days' => 'Dae',
	'translate-statsf-scale-hours' => 'Ure',
	'translate-statsf-count' => 'Eenheid',
	'translate-statsf-count-edits' => 'Aantal wysigings',
	'translate-statsf-count-users' => 'Aktiewe vertalers',
	'translate-statsf-group' => 'Kommageskeide lys van groepkodes',
	'translate-statsf-submit' => 'Voorskou',
	'translate-tag-category' => 'Vertaalbare bladsye',
	'translate-tag-page-desc' => 'Vertaling van die wikibladsy [[:$1]].',
	'translate-tag-translate-link-desc' => 'Vertaal die bladsy',
	'translate-tag-legend-fallback' => "Vertaling in 'n ander taal",
	'translate-tag-legend-fuzzy' => 'Verouderde vertaling',
	'translate-tag-fuzzy-comment' => 'Definisie gewysig deur [[User:$1|$1]] in weergawe $2.',
	'translate-tag-fuzzy-reason' => 'Definisie gewysig deur "$1" met opmerking "$3" in $2.',
	'translate-sidebar-alltrans' => 'Ander vertalings',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'translate' => 'Traduzir',
	'translate-edit' => 'editar',
	'translate-talk' => 'descutir',
	'translate-history' => 'istorial',
	'translate-task-view' => 'Beyer toz os mensaches de',
	'translate-task-untranslated' => 'Beyer toz os mensaches sin traduzir de',
	'translate-task-optional' => 'Beyer os mensaches opzionals de',
	'translate-task-review' => 'Rebisar cambeos en',
	'translate-task-reviewall' => 'Rebisar todas as traduzions en',
	'translate-task-export' => 'Esportar traduzions de',
	'translate-task-export-to-file' => 'Esportar á un archibo as traduzions de',
	'translate-task-export-as-po' => 'Esportar traduzión en formato Gettext',
	'translate-page-no-such-language' => 'O codigo de idioma furnito no ye balido',
	'translate-page-no-such-task' => 'A faina espezificata no ye correuta.',
	'translate-page-no-such-group' => 'A colla de mensaches espezificata no ye correuta.',
	'translate-page-settings-legend' => 'Achustes',
	'translate-page-task' => 'Quiero',
	'translate-page-group' => 'Colla',
	'translate-page-language' => 'Luenga',
	'translate-page-limit' => 'Limite',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|mensache|mensaches}} por pachina',
	'translate-submit' => 'Ir á escar-los',
	'translate-page-navigation-legend' => 'Nabegazión',
	'translate-page-showing' => "Amostrando os mensaches $1 á $2 d'un total de $3.",
	'translate-page-showing-all' => 'Amostrando $1 {{PLURAL:$1|mensache|mensaches}}.',
	'translate-page-showing-none' => 'No bi ha garra mensache ta amostrar.',
	'translate-next' => 'Pachina siguient',
	'translate-prev' => 'Pachina anterior',
	'translate-page-description-legend' => 'Informazión sobre a colla de mensaches',
	'translate-optional' => '(opzional)',
	'translate-ignored' => '(no considerato)',
	'translate-magic-pagename' => 'Traduzión ixamplata de MediaWiki',
	'translate-magic-help' => "Puede traduzir os \"alias\" d'as pachinas espezials, as palabras machicas, os nombres d'as aparenzias y os espazios de nombres.

En as palabras machicas, ha d'encluyir a traduzión en anglés, porque si no lo fa, no funzionarán bien. Deixe tamién o primer elemento (0 u 1) sin cambiar.

Os alias d'as pachinas espezials y as parabras machicas pueden tener barias traduzions. As traduzions se deseparan por una coma (,). Os nombres d'as aparenzias y d'os espazios de nombres no pueden tener que una unica traduzión.

En as traduzions d'os espazios de nombres <tt>\$1 talk</tt> ye espezial. <tt>\$1</tt> ye escambiata por o nombre d'o sitio (por exemplo <tt>{{SITENAME}} talk</tt>). Si no ye posible en a suya luenga formar una esprisión correuta sin cambiar o nombre d'o sitio, contaute con un programador.

Ha de pertenexer á la colla de tradutors ta alzar os cambeos. Ístos no quedan rechistratos dica que no se puncha en o botón \"Alzar pachina\" que ye en o cobaxo d'a pachina.",
	'translate-magic-submit' => 'Ir á escar',
	'translate-magic-cm-export' => 'Esportar',
	'translate-magic-cm-to-be' => 'Esdebiene',
	'translate-magic-cm-current' => 'Autual',
	'translate-magic-cm-original' => 'Orichinal',
	'translate-magic-cm-comment' => 'Comentario:',
	'translate-magic-cm-save' => 'Alzar',
	'translate-magic-cm-updatedusing' => 'Esbiellato usando [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'No se podió alzar a pachina',
	'translate-magic-special' => 'Alias de pachinas espezials',
	'translate-magic-words' => 'Parabras machicas',
	'translate-magic-skin' => "Nombres d'aparenzias",
	'translate-magic-namespace' => 'Espazios de nombres',
	'translationchanges' => 'Cambeos en a traduzión',
	'translationchanges-export' => 'esportar',
	'translationchanges-change' => '$1: $2 por $3',
);

/** Old English (Anglo-Saxon) */
$messages['ang'] = array(
	'translate-edit' => 'ādihtan',
	'translate-talk' => 'mōtung',
	'translate-history' => 'stǣr',
);

/** Arabic (العربية)
 * @author Alnokta
 * @author Meno25
 * @author OsamaK
 * @author ترجمان05
 */
$messages['ar'] = array(
	'translate' => 'ترجمة',
	'translate-desc' => '[[Special:Translate|صفحة خاصة]] لترجمة الميدياويكي وما بعده',
	'translate-edit' => 'عدل',
	'translate-talk' => 'نقاش',
	'translate-history' => 'تاريخ',
	'translate-task-view' => 'أرى كل الرسائل من',
	'translate-task-untranslated' => 'أرى كل الرسائل غير المترجمة من',
	'translate-task-optional' => 'أرى الرسائل الاختيارية من',
	'translate-task-problematic' => 'أرى الرسائل التي بها مشاكل',
	'translate-task-review' => 'أراجع التغييرات ل',
	'translate-task-reviewall' => 'أراجع كل الرسائل المترجمة في',
	'translate-task-export' => 'أصدر الترجمات من',
	'translate-task-export-to-file' => 'أصدر الترجمة لملف من',
	'translate-task-export-as-po' => 'أصدر الترجمة بصيغة جت تكست',
	'translate-task-export-to-xliff' => 'أصدر الترجمة بصيغة إكسليف',
	'translate-page-no-such-language' => 'اللغة المحددة كانت غير صحيحة.',
	'translate-page-no-such-task' => 'المهمة المحددة كانت غير صحيحة.',
	'translate-page-no-such-group' => 'المجموعة المحددة كانت غير صحيحة.',
	'translate-page-disabled' => "الترجمات إلى هذه اللغة في هذه المجموعة تم تعطيلها. السبب:

''$1''",
	'translate-page-settings-legend' => 'الإعدادات',
	'translate-page-task' => 'أريد',
	'translate-page-group' => 'المجموعة',
	'translate-page-language' => 'اللغة',
	'translate-page-limit' => 'الحد',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|رسالة|رسالة}} للصفحة',
	'translate-submit' => 'إيجاد',
	'translate-page-navigation-legend' => 'الإبحار',
	'translate-page-showing' => 'عرض الرسائل من $1 إلى $2 ل $3.',
	'translate-page-showing-all' => 'عرض $1 {{PLURAL:$1|رسالة|رسالة}}.',
	'translate-page-showing-none' => 'لا رسائل للعرض.',
	'translate-next' => 'الصفحة التالية',
	'translate-prev' => 'الصفحة السابقة',
	'translate-page-description-legend' => 'معلومات حول المجموعة',
	'translate-page-edit' => 'عدل',
	'translate-optional' => '(اختياري)',
	'translate-ignored' => '(متجاهل)',
	'translate-edit-definition' => 'تعريف الرسالة',
	'translate-edit-contribute' => 'ساهم',
	'translate-edit-no-information' => "''هذه الرسالة ليس لديها توثيق.
لو كنت تعرف أين أو كيف يتم استخدام هذه الرسالة، يمكنك مساعدة المترجمين الآخرين بواسطة إضافة توثيق إلى هذه الرسالة.''",
	'translate-edit-information' => 'معلومات حول هذه الرسالة ($1)',
	'translate-edit-in-other-languages' => 'الرسالة بلغات أخرى',
	'translate-edit-committed' => 'الترجمة الحالية في البرنامج',
	'translate-edit-warnings' => 'التحذيرات حول الترجمات غير المكتملة',
	'translate-edit-goto-no-prev' => 'لا رسالة سابقة',
	'translate-edit-goto-no-next' => 'لا رسالة قادمة',
	'translate-edit-goto-prev' => 'عدل الرسالة السابقة',
	'translate-edit-goto-next' => 'عدل الرسالة القادمة',
	'translate-edit-goto-list' => 'الرجوع إلى القائمة',
	'translate-magic-pagename' => 'ترجمة ميدياويكي الممتدة',
	'translate-magic-help' => 'يمكنك ترجمة أسماء الصفحات الخاصة، الكلمات السحرية، أسماء الواجهات وأسماء النطاقات.

أسماء الصفحات الخاصة والكلمات السحرية يمكن أن يكون لها ترجمات متعددة.
الترجمات تفصل بواسطة فاصلة (,).
أسماء الواجهات والنطاقات يمكن أن يكون لها ترجمة واحدة فقط.

في ترجمات النطاقات <tt>$1 talk</tt> خاص. <tt>$1</tt> يتم استبدالها باسم الموقع (على سبيل المثال <tt>{{SITENAME}} talk</tt>).
لو أنه من غير الممكن في لغتك صياغة تعبير صحيح بدون تغيير اسم الموقع، من فضلك اتصل بمطور.

تحتاج إلى أن تكون في مجموعة المترجمين لحفظ التغييرات.
التغييرات لن يتم حفظها حتى تضغط زر الحفظ بالأسفل.',
	'translate-magic-module' => 'النوع:',
	'translate-magic-submit' => 'إيجاد',
	'translate-magic-cm-export' => 'تصدير',
	'translate-magic-cm-to-be' => 'لتصبح',
	'translate-magic-cm-current' => 'الحالي',
	'translate-magic-cm-original' => 'الأصلي',
	'translate-magic-cm-comment' => 'تعليق:',
	'translate-magic-cm-save' => 'حفظ',
	'translate-magic-cm-updatedusing' => 'حدث باستخدام [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'الحفظ فشل',
	'translate-magic-special' => 'أسماء الصفحات الخاصة',
	'translate-magic-words' => 'كلمات سحرية',
	'translate-magic-skin' => 'أسماء الواجهات',
	'translate-magic-namespace' => 'أسماء النطاقات',
	'translationchanges' => 'تغييرات الترجمة',
	'translationchanges-export' => 'تصدير',
	'translationchanges-change' => '$1: $2 بواسطة $3',
	'translate-checks-parameters' => '{{PLURAL:$2|المحدد التالي غير مستخدم|المحددات التالية غير مستخدمة}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|المحدد التالي غير معروف|المحددات التالية غير معروفة}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'يوجد عدد غير زوجي من {{PLURAL:$2|الأقواس|الأقواس}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|الوصلة|ال$2 وصلة}} التالية بها مشاكل:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'من فضلك استبدل {{PLURAL:$2|بالوسم التالي|بالوسوم التالية}} الوسوم الصحيحة:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'التعريف يستخدم <nowiki>{{PLURAL:}}</nowiki> لكن الترجمة لا.',
	'translate-checks-pagename' => 'النطاق تغير من التعريف',
	'tog-translate-nonewsletter' => 'لا ترسل لي إخطارات بريدية بالبريد الإلكتروني (متعلقة فقط بالمستخدمين الذين يمتلكون عنوان بريد إلكتروني مؤكد)',
	'right-translate' => 'التعديل باستخدام واجهة الترجمة',
	'translate-rc-translation-filter' => 'فلتر الترجمات:',
	'translate-rc-translation-filter-no' => 'لا تفعل شيئا',
	'translate-rc-translation-filter-only' => 'اعرض الترجمات فقط',
	'translate-rc-translation-filter-filter' => 'فلتر الترجمات',
	'translate-rc-translation-filter-site' => 'التغييرات لرسائل الموقع فقط',
	'translationstats' => 'إحصاءات الترجمة',
	'translate-stats-edits' => 'تعديلات',
	'translate-stats-users' => 'المترجمون',
	'translate-statsf-intro' => 'يمكنك توليد إحصاءات بسيطة بهذه الاستمارة. كل القيم لها حدود عليا وسفلى.',
	'translate-statsf-options' => 'خيارات الرسم',
	'translate-statsf-width' => 'العرض بالبكسل',
	'translate-statsf-height' => 'الارتفاع بالبكسل',
	'translate-statsf-days' => 'فترة زمنية باليوم',
	'translate-statsf-scale' => 'التدريج',
	'translate-statsf-scale-days' => 'أيام',
	'translate-statsf-scale-hours' => 'ساعات',
	'translate-statsf-count' => 'قياس',
	'translate-statsf-count-edits' => 'عدد التعديلات',
	'translate-statsf-count-users' => 'المترجمون النشطون',
	'translate-statsf-language' => 'قائمة بأكواد اللغات مفصولة بفاصلة',
	'translate-statsf-group' => 'قائمة بأكواد المجموعات مفصولة بفاصلة',
	'translate-statsf-submit' => 'عرض مسبق',
	'translate-tag-category' => 'صفحات قابلة للترجمة',
	'translate-tag-page-desc' => 'ترجمة صفحة الويكي [[:$1]].',
	'translate-tag-translate-link-desc' => 'ترجمة هذه الصفحة',
	'translate-tag-legend' => 'المفتاح:',
	'translate-tag-legend-fallback' => 'الترجمة بلغة أخرى',
	'translate-tag-legend-fuzzy' => 'ترجمة قديمة',
	'translate-tag-fuzzy-comment' => 'التعريف تغير بواسطة [[User:$1]] في المراجعة $2.',
	'translate-tag-fuzzy-reason' => 'التعريف تغير بواسطة المستخدم $1 بالتعليق "$3" في $2.',
	'translate-sidebar-alltrans' => 'ترجمات أخرى',
	'translate-tag-noedit' => 'هذه الصفحة هي صفحة ترجمة محدثة تلقائيا.
يمكنك [$1 تعديل الصفحة المصدر] أو [$2 تحديث الترجمة].',
	'translate-language' => 'اللغة:',
);

/** Araucanian (Mapudungun)
 * @author Poquil
 */
$messages['arn'] = array(
	'translate-talk' => 'dungun',
	'translate-page-showing' => 'adkintun mensajes del $1 al $2 de $3',
	'translate-page-showing-all' => 'adkintun $1 {{PLURAL:$1|message|messages}}.',
	'translate-edit-contribute' => 'ñma',
	'translate-magic-cm-original' => 'kuse',
	'translate-magic-cm-save' => 'elkünun',
	'translate-magic-cm-savefailed' => 'elkünun weda',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 */
$messages['arz'] = array(
	'translate' => 'ترجمة',
	'translate-desc' => '[[Special:Translate|صفحة خاصة]] لترجمة الميدياويكى وما بعده',
	'translate-edit' => 'عدل',
	'translate-talk' => 'نقاش',
	'translate-history' => 'تاريخ',
	'translate-task-view' => 'أرى كل الرسائل من',
	'translate-task-untranslated' => 'أرى كل الرسائل غير المترجمة من',
	'translate-task-optional' => 'أرى الرسائل الاختيارية من',
	'translate-task-problematic' => 'أرى الرسائل التى بها مشاكل',
	'translate-task-review' => 'أراجع التغييرات ل',
	'translate-task-reviewall' => 'أراجع كل الرسائل المترجمة في',
	'translate-task-export' => 'أصدر الترجمات من',
	'translate-task-export-to-file' => 'أصدر الترجمة لملف من',
	'translate-task-export-as-po' => 'أصدر الترجمة بصيغة جت تكست',
	'translate-task-export-to-xliff' => 'أصدر الترجمة بصيغة إكسليف',
	'translate-page-no-such-language' => 'اللغة المحددة كانت غير صحيحة.',
	'translate-page-no-such-task' => 'المهمة المحددة كانت غير صحيحة.',
	'translate-page-no-such-group' => 'المجموعة المحددة كانت غير صحيحة.',
	'translate-page-disabled' => "الترجمات إلى هذه اللغة فى هذه المجموعة تم تعطيلها. السبب:

''$1''",
	'translate-page-settings-legend' => 'الإعدادات',
	'translate-page-task' => 'أريد',
	'translate-page-group' => 'المجموعة',
	'translate-page-language' => 'اللغة',
	'translate-page-limit' => 'الحد',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|رسالة|رسالة}} للصفحة',
	'translate-submit' => 'إيجاد',
	'translate-page-navigation-legend' => 'الإبحار',
	'translate-page-showing' => 'عرض الرسائل من $1 إلى $2 ل $3.',
	'translate-page-showing-all' => 'عرض $1 {{PLURAL:$1|رسالة|رسالة}}.',
	'translate-page-showing-none' => 'لا رسائل للعرض.',
	'translate-next' => 'الصفحة التالية',
	'translate-prev' => 'الصفحة السابقة',
	'translate-page-description-legend' => 'معلومات حول المجموعة',
	'translate-page-edit' => 'عدل',
	'translate-optional' => '(اختياري)',
	'translate-ignored' => '(متجاهل)',
	'translate-edit-definition' => 'تعريف الرسالة',
	'translate-edit-contribute' => 'ساهم',
	'translate-edit-no-information' => "''هذه الرسالة ليس لديها توثيق.
لو كنت تعرف أين أو كيف يتم استخدام هذه الرسالة، يمكنك مساعدة المترجمين الآخرين بواسطة إضافة توثيق إلى هذه الرسالة.''",
	'translate-edit-information' => 'معلومات حول هذه الرسالة ($1)',
	'translate-edit-in-other-languages' => 'الرسالة بلغات أخرى',
	'translate-edit-committed' => 'الترجمة الحالية فى البرنامج',
	'translate-edit-warnings' => 'التحذيرات حول الترجمات غير المكتملة',
	'translate-edit-goto-no-prev' => 'لا رسالة سابقة',
	'translate-edit-goto-no-next' => 'لا رسالة قادمة',
	'translate-edit-goto-prev' => 'عدل الرسالة السابقة',
	'translate-edit-goto-next' => 'عدل الرسالة القادمة',
	'translate-edit-goto-list' => 'الرجوع إلى القائمة',
	'translate-magic-pagename' => 'ترجمة ميدياويكى الممتدة',
	'translate-magic-help' => 'يمكنك ترجمة أسماء الصفحات الخاصة، الكلمات السحرية، أسماء الواجهات وأسماء النطاقات.

أسماء الصفحات الخاصة والكلمات السحرية يمكن أن يكون لها ترجمات متعددة.
الترجمات تفصل بواسطة فاصلة (,).
أسماء الواجهات والنطاقات يمكن أن يكون لها ترجمة واحدة فقط.

فى ترجمات النطاقات <tt>$1 talk</tt> خاص. <tt>$1</tt> يتم استبدالها باسم الموقع (على سبيل المثال <tt>{{SITENAME}} talk</tt>).
لو أنه من غير الممكن فى لغتك صياغة تعبير صحيح بدون تغيير اسم الموقع، من فضلك اتصل بمطور.

تحتاج إلى أن تكون فى مجموعة المترجمين لحفظ التغييرات.
التغييرات لن يتم حفظها حتى تضغط زر الحفظ بالأسفل.',
	'translate-magic-module' => 'النوع:',
	'translate-magic-submit' => 'إيجاد',
	'translate-magic-cm-export' => 'تصدير',
	'translate-magic-cm-to-be' => 'لتصبح',
	'translate-magic-cm-current' => 'الحالي',
	'translate-magic-cm-original' => 'الأصلي',
	'translate-magic-cm-comment' => 'تعليق:',
	'translate-magic-cm-save' => 'حفظ',
	'translate-magic-cm-updatedusing' => 'حدث باستخدام [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'الحفظ فشل',
	'translate-magic-special' => 'أسماء الصفحات الخاصة',
	'translate-magic-words' => 'كلمات سحرية',
	'translate-magic-skin' => 'أسماء الواجهات',
	'translate-magic-namespace' => 'أسماء النطاقات',
	'translationchanges' => 'تغييرات الترجمة',
	'translationchanges-export' => 'تصدير',
	'translationchanges-change' => '$1: $2 بواسطة $3',
	'translate-checks-parameters' => '{{PLURAL:$2|المحدد التالى غير مستخدم|المحددات التالية غير مستخدمة}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|المحدد التالى غير معروف|المحددات التالية غير معروفة}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'يوجد عدد غير زوجى من {{PLURAL:$2|الأقواس|الأقواس}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|الوصلة|ال$2 وصلة}} التالية بها مشاكل:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'من فضلك استبدل {{PLURAL:$2|بالوسم التالي|بالوسوم التالية}} الوسوم الصحيحة:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'التعريف يستخدم <nowiki>{{PLURAL:}}</nowiki> لكن الترجمة لا.',
	'translate-checks-pagename' => 'النطاق تغير من التعريف',
	'tog-translate-nonewsletter' => 'لا ترسل لى إخطارات بريدية بالبريد الإلكترونى (متعلقة فقط بالمستخدمين الذين يمتلكون عنوان بريد إلكترونى مؤكد)',
	'right-translate' => 'التعديل باستخدام واجهة الترجمة',
	'translate-rc-translation-filter' => 'فلتر الترجمات:',
	'translate-rc-translation-filter-no' => 'لا تفعل شيئا',
	'translate-rc-translation-filter-only' => 'اعرض الترجمات فقط',
	'translate-rc-translation-filter-filter' => 'فلتر الترجمات',
	'translate-rc-translation-filter-site' => 'التغييرات لرسائل الموقع فقط',
	'translationstats' => 'إحصاءات الترجمة',
	'translate-stats-edits' => 'تعديلات',
	'translate-stats-users' => 'المترجمون',
	'translate-statsf-intro' => 'يمكنك توليد إحصاءات بسيطة بهذه الاستمارة. كل القيم لها حدود عليا وسفلى.',
	'translate-statsf-options' => 'خيارات الرسم',
	'translate-statsf-width' => 'العرض بالبكسل',
	'translate-statsf-height' => 'الارتفاع بالبكسل',
	'translate-statsf-days' => 'فترة زمنية باليوم',
	'translate-statsf-scale' => 'التدريج',
	'translate-statsf-scale-days' => 'أيام',
	'translate-statsf-scale-hours' => 'ساعات',
	'translate-statsf-count' => 'قياس',
	'translate-statsf-count-edits' => 'عدد التعديلات',
	'translate-statsf-count-users' => 'المترجمون النشطون',
	'translate-statsf-language' => 'قائمة بأكواد اللغات مفصولة بفاصلة',
	'translate-statsf-group' => 'قائمة بأكواد المجموعات مفصولة بفاصلة',
	'translate-statsf-submit' => 'عرض مسبق',
	'translate-tag-category' => 'صفحات قابلة للترجمة',
	'translate-tag-page-desc' => 'ترجمة صفحة الويكى [[:$1]].',
	'translate-tag-translate-link-desc' => 'ترجمة هذه الصفحة',
	'translate-tag-legend' => 'المفتاح:',
	'translate-tag-legend-fallback' => 'الترجمة بلغة أخرى',
	'translate-tag-legend-fuzzy' => 'ترجمة قديمة',
	'translate-tag-fuzzy-comment' => 'التعريف تغير بواسطة [[User:$1]] فى المراجعة $2.',
	'translate-tag-fuzzy-reason' => 'التعريف تغير بواسطة المستخدم $1 بالتعليق "$3" فى $2.',
	'translate-sidebar-alltrans' => 'ترجمات أخرى',
	'translate-tag-noedit' => 'هذه الصفحة هى صفحة ترجمة محدثة تلقائيا.
يمكنك [$1 تعديل الصفحة المصدر] أو [$2 تحديث الترجمة].',
);

/** Asturian (Asturianu)
 * @author Esbardu
 */
$messages['ast'] = array(
	'translate' => 'Traducir',
	'translate-desc' => '[[Special:Translate|Páxina especial]] pa traducir Mediawiki y más',
	'translate-edit' => 'editar',
	'translate-talk' => 'alderique',
	'translate-history' => 'historial',
	'translate-task-view' => 'Ver tolos mensaxes del',
	'translate-task-untranslated' => 'Ver tolos mensaxes non traducíos del',
	'translate-task-optional' => 'Ver los mensaxes opcionales del',
	'translate-task-problematic' => 'Ver mensaxes que tienen problemes',
	'translate-task-review' => 'Revisar los cambeos nel',
	'translate-task-reviewall' => 'Revisar toles traducciones del',
	'translate-task-export' => 'Esportar les traducciones del',
	'translate-task-export-to-file' => 'Esportar a un archivu les traducciones del',
	'translate-task-export-as-po' => 'Esportar les traducciones en formatu Gettext',
	'translate-task-export-to-xliff' => 'Esportar traducción en formatu Xliff',
	'translate-page-no-such-language' => 'La llingua especificada nun foi válida.',
	'translate-page-no-such-task' => 'El llabor especificáu nun foi válidu.',
	'translate-page-no-such-group' => 'El grupu especificáu nun foi válidu.',
	'translate-page-disabled' => "Les traducciones d'esta llingua nesti grupu foron desactivaes. Motivu:

''$1''",
	'translate-page-settings-legend' => 'Configuración',
	'translate-page-task' => 'Quiero',
	'translate-page-group' => 'Grupu',
	'translate-page-language' => 'Llingua',
	'translate-page-limit' => 'Llímite',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|mensaxe|mensaxes}} per páxina',
	'translate-submit' => 'Amosar',
	'translate-page-navigation-legend' => 'Navegación',
	'translate-page-showing' => 'Amosando mensaxes del $1 al $2 de $3.',
	'translate-page-showing-all' => 'Amosando $1 {{PLURAL:$1|mensaxe|mensaxes}}.',
	'translate-page-showing-none' => "Nun hai mensaxes qu'amosar.",
	'translate-next' => 'Páxina siguiente',
	'translate-prev' => 'Páxina anterior',
	'translate-page-description-legend' => 'Información del grupu',
	'translate-page-edit' => 'editar',
	'translate-optional' => '(opcional)',
	'translate-ignored' => '(inoráu)',
	'translate-edit-definition' => 'Definición del mensaxe',
	'translate-edit-contribute' => 'contribuyir',
	'translate-edit-no-information' => "''Esti mensaxe nun tien documentación. Si sabes ú o cómo s'usa esti mensaxe, pues aidar a otros traductores amestando documentación a esti mensaxe.''",
	'translate-edit-information' => 'Información sobre esti mensaxe ($1)',
	'translate-edit-in-other-languages' => "Mensaxe n'otres llingües",
	'translate-edit-committed' => 'Traducción actual nel software',
	'translate-edit-warnings' => 'Avisos sobre traducciones incompletes',
	'translate-edit-goto-no-prev' => 'Nun hai mensaxes anteriores',
	'translate-edit-goto-no-next' => 'Nun hai mensaxes siguientes',
	'translate-edit-goto-prev' => 'Editar mensaxe anterior',
	'translate-edit-goto-next' => 'Editar mensaxe siguiente',
	'translate-edit-goto-list' => 'Tornar a la llista',
	'translate-magic-pagename' => 'Traducción estendida de MediaWiki',
	'translate-magic-help' => "Pues traducir los nomes de les páxines especiales, les pallabres máxiques, los nomes de les pieles y los nomes de los espacios de nome.

Los nomes de les páxines especiales y les pallabres máxiques puen tener múltiples traducciones.
Les traducciones sepárense con una coma (,).
Los nomes de les pieles y los espacios de nome namái puen tener una traducción.

Nes traducciones de los espacios de nome <tt>$1 talk</tt> ye especial. <tt>$1</tt> ye sustituyíu pol nome del sitiu (por exemplu <tt>{{SITENAME}} talk</tt>).
Si na to llingua nun ye posible formar una espresión válida ensin camudar el nome del sitiu, por favor contauta con un desenrollador.

Necesites tar nel grupu de traductores pa guardar los cambeos.
Los cambeos nun se graben hasta que calques nel botón guardar d'abaxo.",
	'translate-magic-module' => 'Módulu:',
	'translate-magic-submit' => 'Amosar',
	'translate-magic-cm-export' => 'Esportar',
	'translate-magic-cm-to-be' => 'Propuesta',
	'translate-magic-cm-current' => 'Actual',
	'translate-magic-cm-original' => 'Orixinal',
	'translate-magic-cm-comment' => 'Comentariu:',
	'translate-magic-cm-save' => 'Guardar',
	'translate-magic-cm-updatedusing' => 'Actualizao usando [[Special:Magic]]',
	'translate-magic-cm-savefailed' => "Falló'l guardáu",
	'translate-magic-special' => 'Nomes de páxines especiales',
	'translate-magic-words' => 'Pallabres máxiques',
	'translate-magic-skin' => 'Nomes de pieles',
	'translate-magic-namespace' => "Nomes d'espacios de nome",
	'translationchanges' => 'Cambeos de traducción',
	'translationchanges-export' => 'esportar',
	'translationchanges-change' => '$1: $2 por $3',
	'translate-checks-parameters' => "{{PLURAL:$2|El siguiente parámetru nun s'usa|Los siguientes parámetros nun s'usen}}:
<strong><nowiki>$1</nowiki></strong>",
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|El siguiente parámetru ye desconocíu|Los siguientes parámetros son desconocíos}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Hai un númberu impar de {{PLURAL:$2|paréntesis|paréntesis}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|El siguiente enllaz ye problemáticu|Los siguientes enllaces son problemáticos}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Por favor sustitúi {{PLURAL:$2|la siguiente etiqueta cola correuta|les siguientes etiquetes coles correutes}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'La definición usa <nowiki>{{PLURAL:}}</nowiki> pero la traducción non.',
	'translate-checks-pagename' => 'Espaciu de nomes camudáu dende la definición',
	'tog-translate-nonewsletter' => 'Nun unviame avisos per corréu electrónicu (relevante namái pa usuarios con direición de corréu electrónicu confirmada)',
	'right-translate' => 'Editar usando la interfaz de traducción',
	'translate-rc-translation-filter' => 'Filtrar traducciones:',
	'translate-rc-translation-filter-no' => 'Nun facer nada',
	'translate-rc-translation-filter-only' => 'Amosar traducciones namái',
	'translate-rc-translation-filter-filter' => 'Filtrar traducciones',
	'translate-rc-translation-filter-site' => 'Cambeos de los mensaxes del sitiu namái',
	'translationstats' => 'Estadístiques de traducción',
	'translate-stats-edits' => 'Ediciones',
	'translate-stats-users' => 'Traductores',
	'translate-statsf-intro' => 'Pues xenerar estadístiques cencielles con esti formulariu. Tolos valores tienen llímites superiores y inferiores.',
	'translate-statsf-options' => 'Opciones del gráficu',
	'translate-statsf-width' => 'Anchura en píxeles',
	'translate-statsf-height' => 'Altura en píxeles',
	'translate-statsf-days' => 'Periodu de tiempu en díes',
	'translate-statsf-scale' => 'Granularidá',
	'translate-statsf-scale-days' => 'Díes',
	'translate-statsf-scale-hours' => 'Hores',
	'translate-statsf-count' => 'Midida',
	'translate-statsf-count-edits' => "Númberu d'ediciones",
	'translate-statsf-count-users' => 'Traductores activos',
	'translate-statsf-language' => 'Llista de códigos de llingua separtaos por comes',
	'translate-statsf-group' => 'Llista de códigos de grupu separtaos por comes',
	'translate-statsf-submit' => 'Previsualizar',
	'translate-tag-category' => 'Páxines traducibles',
	'translate-tag-page-desc' => 'Traducción de la páxina wiki [[:$1]].',
	'translate-tag-translate-link-desc' => 'Traducir esta páxina',
	'translate-tag-legend' => 'Lleenda:',
	'translate-tag-legend-fallback' => "Traducción n'otra llingua",
	'translate-tag-legend-fuzzy' => 'Traducción caducada',
	'translate-tag-fuzzy-comment' => 'Definición camudada por [[User:$1|$1]] na revisión $2.',
	'translate-tag-fuzzy-reason' => 'Definición camudada por "$1" col comentariu "$3" en $2.',
	'translate-sidebar-alltrans' => 'Otres traducciones',
	'translate-tag-noedit' => 'Esta páxina ye una páxina de traducción actualizada automáticamente.
Pues [$1 editar la páxina fonte] o [$2 actualizar la traducción].',
);

/** Southern Balochi (بلوچی مکرانی)
 * @author Mostafadaneshvar
 */
$messages['bcc'] = array(
	'translate-checks-parameters' => 'ای پارامتران استفاده نه بیتگن: <strong>$1</strong>',
	'translate-checks-links' => 'جهلگی لینکانء مشکل اش هست: <strong>$1</strong>',
	'translate-checks-xhtml' => 'لطفا ای جهلگی برچسپانء گون درستین ان جاه په جاه کنیت: <strong>$1</strong>',
);

/** Bikol Central (Bikol Central)
 * @author Filipinayzd
 */
$messages['bcl'] = array(
	'translate' => 'Sangliân',
	'translate-edit' => 'hirahón',
	'translate-talk' => 'magtaram',
	'translate-history' => 'historya',
	'translate-task-view' => 'Hilingón an gabos na mga mensahe poon',
	'translate-task-untranslated' => 'Hilingón an gabos na mga dai nasangliân na mensahe poon',
	'translate-task-review' => 'Reparohon an mga pagbabâgo sa',
	'translate-task-reviewall' => 'Reparohon an gabos na mga pagsanglî sa',
	'translate-task-export' => 'Ipadara an mga pagsanglî halî sa',
	'translate-task-export-to-file' => 'Ipadara an pagsanglî sa file halî sa',
	'translate-submit' => 'Kûanón',
	'translate-next' => 'Sunod na páhina',
	'translate-prev' => 'Nakaaging páhina',
	'translate-optional' => '(opsyonal)',
	'translate-magic-submit' => 'Kûanón',
	'translate-magic-cm-export' => 'Ipadara',
	'translate-magic-cm-current' => 'Presente',
	'translate-magic-cm-original' => 'Orihinal',
	'translate-magic-cm-save' => 'Itagama',
	'translate-magic-cm-savefailed' => 'Bigô an pagtagama',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Red Winged Duck
 */
$messages['be-tarask'] = array(
	'translate' => 'Пераклад',
	'translate-edit' => 'рэдагаваць',
	'translate-talk' => 'абмеркаваньне',
	'translate-history' => 'гісторыя',
	'translate-task-export' => 'Экспартаваць пераклады',
	'translate-task-export-to-file' => 'Экспартаваць пераклады ў файл',
	'translate-task-export-as-po' => 'Экспартаваць пераклады ў фармаце gettext',
	'translate-page-task' => 'Я хачу',
	'translate-page-group' => 'Група',
	'translate-page-language' => 'Мова',
	'translate-page-limit' => 'Ліміт',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|паведамленьне|паведамленьні|паведамленьняў}} на старонцы',
	'translate-page-navigation-legend' => 'Навігацыя',
	'translate-next' => 'Наступная старонка',
	'translate-prev' => 'Папярэдняя старонка',
	'translate-page-description-legend' => 'Інфармацыя пра групу',
	'translate-page-edit' => 'рэдагаваць',
	'translate-edit-information' => 'Інфармацыя пра гэтае паведамленьне ($1)',
	'translate-edit-in-other-languages' => 'Паведамленьне на іншых мовах',
	'translate-edit-goto-prev' => 'Рэдагаваць папярэдняе паведамленьне',
	'translate-edit-goto-next' => 'Рэдагаваць наступнае паведамленьне',
	'translate-magic-pagename' => 'Пашыраны пераклад MediaWiki',
	'translate-magic-cm-comment' => 'Камэнтар:',
	'translate-rc-translation-filter-only' => 'Паказваць толькі пераклады',
	'translate-statsf-submit' => 'Папярэдні прагляд',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'translate' => 'Превеждане',
	'translate-desc' => '[[Special:Translate|Специална страница]] за превеждане на Mediawiki и др.',
	'translate-edit' => 'редактиране',
	'translate-talk' => 'беседа',
	'translate-history' => 'история',
	'translate-task-view' => 'Преглед на всички съобщения от',
	'translate-task-untranslated' => 'Преглед на всички непреведени съобщения от',
	'translate-task-optional' => 'Преглед на незадължителните съобщения от',
	'translate-task-problematic' => 'Преглед на съобщенията, които имат проблем',
	'translate-task-review' => 'Преглед на променените съобщения в',
	'translate-task-reviewall' => 'Преглед на всички преводи в',
	'translate-task-export' => 'Изнасяне на преводите от',
	'translate-task-export-to-file' => 'Изнасяне във файл на преведените съобщения от',
	'translate-task-export-as-po' => 'Изнасяне на превода в Gettext формат',
	'translate-task-export-to-xliff' => 'Изнасяне на превода в Xliff формат',
	'translate-page-no-such-language' => 'Избраният език е невалиден.',
	'translate-page-no-such-task' => 'Избраната задача е невалидна.',
	'translate-page-no-such-group' => 'Избраната група е невалидна',
	'translate-page-disabled' => "Преводите на този език в тази група са изключени. Причина:

''$1''",
	'translate-page-settings-legend' => 'Настройки',
	'translate-page-task' => 'Действие:',
	'translate-page-group' => 'Група:',
	'translate-page-language' => 'Език:',
	'translate-page-limit' => 'Показване на:',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|съобщение|съобщения}} на страница',
	'translate-submit' => 'Извличане',
	'translate-page-navigation-legend' => 'Навигация',
	'translate-page-showing' => 'Показани са съобщения от $1 до $2 от общо $3.',
	'translate-page-showing-all' => '{{PLURAL:$1|Показано е 1 съобщение|Показани са $1 съобщения}}.',
	'translate-page-showing-none' => 'Няма съобщения, които да бъдат показани.',
	'translate-next' => 'Следваща страница',
	'translate-prev' => 'Предишна страница',
	'translate-page-description-legend' => 'Информация за групата',
	'translate-page-edit' => 'редактиране',
	'translate-optional' => '(незадължително)',
	'translate-ignored' => '(пренебрегнато)',
	'translate-edit-definition' => 'Оригинално съобщение',
	'translate-edit-contribute' => 'добавяне на документация',
	'translate-edit-no-information' => 'За това съобщение няма документация. Ако знаете къде и как се използва, можете да помогнете на останалите преводачи като добавите документация за това съобщение.',
	'translate-edit-information' => 'Информация за това съобщение ($1)',
	'translate-edit-in-other-languages' => 'Това съобщение на други езици',
	'translate-edit-committed' => 'Текущ превод в софтуера',
	'translate-edit-warnings' => 'Забележки за непълни преводи',
	'translate-edit-goto-no-prev' => 'Няма предишно съобщение',
	'translate-edit-goto-no-next' => 'Няма следващо съобщение',
	'translate-edit-goto-prev' => 'Редактиране на предишното съобщение',
	'translate-edit-goto-next' => 'Редактиране на следващото съобщение',
	'translate-edit-goto-list' => 'Връщане към списъка',
	'translate-magic-pagename' => 'Разширено превеждане на МедияУики',
	'translate-magic-module' => 'Модул:',
	'translate-magic-submit' => 'Извличане',
	'translate-magic-cm-export' => 'Изнасяне',
	'translate-magic-cm-to-be' => 'Желано',
	'translate-magic-cm-current' => 'Текущо',
	'translate-magic-cm-original' => 'Оригинално',
	'translate-magic-cm-comment' => 'Коментар:',
	'translate-magic-cm-save' => 'Съхранение',
	'translate-magic-cm-updatedusing' => 'Обновено чрез [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Съхраняването беше неуспешно',
	'translate-magic-special' => 'Имена на специални страници',
	'translate-magic-words' => 'Вълшебни думички',
	'translate-magic-skin' => 'Имена на облици',
	'translate-magic-namespace' => 'Имена на именни пространства',
	'translationchanges' => 'Промени в преводите',
	'translationchanges-export' => 'изнасяне',
	'translationchanges-change' => '$1: $2 от $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Следният параметър не се използва|Следните параметри не се използват}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Следният параметър е непознат|Следните параметри са непознати}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Съобщението съдържа необичаен брой {{PLURAL:$2|скоби|скоби}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Следната препратка е проблемна|Следните $2 препратки са проблемни}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Необходимо е заместване на {{PLURAL:$2|посочения етикет с правилен|посочените етикети с правилни}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Оригиналното съобщение използва <nowiki>{{PLURAL:}}</nowiki>, а преводът — не.',
	'tog-translate-nonewsletter' => 'Без получаване на бюлетин по е-поща (за потребители с потвърден адрес за е-поща)',
	'right-translate' => 'Редактиране чрез интерфейса за превод',
	'translate-rc-translation-filter' => 'Филтриране на преводите:',
	'translate-rc-translation-filter-no' => 'Без действие',
	'translate-rc-translation-filter-only' => 'Само на преводите',
	'translate-rc-translation-filter-filter' => 'Филтриране на преводите',
	'translate-rc-translation-filter-site' => 'Промени само в съобщенията за сайта',
	'translationstats' => 'Статистики за преводите',
	'translate-stats-edits' => 'Редакции',
	'translate-stats-users' => 'Преводачи',
	'translate-statsf-intro' => 'Формулярът по-долу слуижи за създаване на статистика. Всички възможности имат минимални и максимални стойности.',
	'translate-statsf-options' => 'Графични настройки',
	'translate-statsf-width' => 'Ширина в пиксели',
	'translate-statsf-height' => 'Височина в пиксели',
	'translate-statsf-days' => 'Времеви период в дни',
	'translate-statsf-scale-days' => 'Дни',
	'translate-statsf-scale-hours' => 'Часове',
	'translate-statsf-count-edits' => 'Брой редакции',
	'translate-statsf-count-users' => 'Активни преводачи',
	'translate-statsf-language' => 'Списък с езикови кодове, разделени със запетаи',
	'translate-statsf-group' => 'Списък с групови кодове, разделени със запетаи',
	'translate-statsf-submit' => 'Преглед',
	'translate-tag-page-desc' => 'Превод на страницата [[:$1]].',
	'translate-tag-translate-link-desc' => 'Превеждане на тази страница',
	'translate-tag-legend' => 'Легенда:',
	'translate-tag-legend-fallback' => 'Превод на друг език',
	'translate-tag-legend-fuzzy' => 'Остарял превод',
	'translate-sidebar-alltrans' => 'Други преводи',
	'translations' => 'Всички преводи',
	'translate-translations-none' => 'Не съществуват преводи за „$1“',
	'translate-translations-fieldset-title' => 'Всички преводи',
	'translate-translations-messagename' => 'Съобщение:',
	'languagestats' => 'Езикови статистики',
	'languagestats-summary' => 'Тази страница показва статистиките за преводите на всички ([[MediaWiki:Translate-languagestats-groups|конфигурирани]]) групи съобщения за езика.',
	'translate-language-code' => 'Езиков код',
	'translate-language-code-field-name' => 'Езиков код:',
	'translate-suppress-complete' => 'Скриване на изцяло преведените групи съобщения',
	'translate-language' => 'Език',
	'translate-total' => 'Съобщения',
);

/** Bengali (বাংলা)
 * @author Bellayet
 * @author Zaheen
 */
$messages['bn'] = array(
	'translate' => 'অনুবাদ করুন',
	'translate-edit' => 'সম্পাদনা',
	'translate-talk' => 'আলোচনা',
	'translate-history' => 'ইতিহাস',
	'translate-task-view' => 'সমস্ত বার্তা',
	'translate-task-untranslated' => 'অনুবাদ হয়নি এমন সব বার্তা',
	'translate-task-review' => 'পরিবর্তনসমূহ পুনর্বিবেচনা',
	'translate-task-reviewall' => 'সমস্ত অনুবাদ পুনর্বিবেচনা',
	'translate-task-export' => 'অনুবাদসমুহ প্রেরণ',
	'translate-task-export-to-file' => 'অনুবাদসমূহ ফাইলে প্রেরণ',
	'translate-page-task' => 'আমি চাই',
	'translate-submit' => 'বের করো',
	'translate-next' => 'পরবর্তী পাতা',
	'translate-prev' => 'পূর্ববর্তী পাতা',
	'translate-optional' => '(ঐচ্ছিক)',
	'translate-ignored' => '(উপেক্ষিত)',
);

/** Bishnupria Manipuri (ইমার ঠার/বিষ্ণুপ্রিয়া মণিপুরী)
 * @author Usingha
 */
$messages['bpy'] = array(
	'translate' => 'অনুবাদ করিক',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'translate' => 'Treiñ',
	'translate-desc' => "[[Special:Translate|Pajenn zibar]] evit treiñ Mediawiki ha pelloc'h",
	'translate-edit' => 'kemmañ',
	'translate-talk' => 'kaozeal',
	'translate-history' => 'istor',
	'translate-task-view' => 'Welet an holl gemennadennoù evit',
	'translate-task-untranslated' => 'Welet an holl gemennadennoù didro evit',
	'translate-task-optional' => 'Welet an holl gemennadennoù diret evit',
	'translate-task-problematic' => "Gwelet ar c'hemennoù kudennek",
	'translate-task-review' => "Adwelet ma c'hemmoù evit",
	'translate-task-reviewall' => 'Adwelet an holl droidigezhioù evit',
	'translate-task-export' => 'Ezporzhiañ an troidigezhioù evit',
	'translate-task-export-to-file' => 'Ezporzhiañ an troidigezhioù en ur restr adal',
	'translate-task-export-as-po' => 'Ezporzhiañ an troidigezhioù er furmad Gettext',
	'translate-task-export-to-xliff' => 'Ezporzhiañ an troidigezhioù er furmad Xliff',
	'translate-page-no-such-language' => "Merket ez eus bet ur c'hod yezh direizh",
	'translate-page-no-such-task' => 'Merket ez eus bet un ober direizh',
	'translate-page-no-such-group' => 'Merket ez eus bet ur strollad direizh',
	'translate-page-disabled' => "Harpet eo bet an troidigezhioù er yezh-mañ evit ar strollad-mañ. Abeg :

''$1''",
	'translate-page-settings-legend' => 'Dibaboù',
	'translate-page-task' => "C'hoant am eus da",
	'translate-page-group' => 'Strollad',
	'translate-page-language' => 'Yezh',
	'translate-page-limit' => 'Bevenn',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|gemennadenn|kemennadenn}} dre bajenn',
	'translate-submit' => 'Mont',
	'translate-page-navigation-legend' => 'Merdeiñ',
	'translate-page-showing' => 'O tiskouez kemennadennoù adal $1 betek $2 diwar $3.',
	'translate-page-showing-all' => 'War wel $1 {{PLURAL:$1|gemennadenn|kemennadenn}}',
	'translate-page-showing-none' => 'Netra da ziskouez.',
	'translate-next' => 'Pajenn da-heul',
	'translate-prev' => 'Pajenn gent',
	'translate-page-description-legend' => 'Titouroù diwar-benn ar strollad',
	'translate-page-edit' => 'kemmañ',
	'translate-optional' => '(diret)',
	'translate-ignored' => '(laosket a-gostez)',
	'translate-edit-definition' => 'Termenadur ar gemennadenn',
	'translate-edit-contribute' => 'kemer perzh',
	'translate-edit-no-information' => "''N'eus tamm titour ebet diwar-benn ar gemennadenn-mañ. Ma ouzit pelec'h pe benaos emañ da vezañ implijet e c'hallit harpañ troourien all en ur ouzhpennañ titouroù diwar he fenn.''",
	'translate-edit-information' => 'Titouroù diwar-benn ar gemennadenn-mañ ($1)',
	'translate-edit-in-other-languages' => 'Kemennadenn e yezhoù all',
	'translate-edit-committed' => 'Troidigezh zo er meziant bremañ',
	'translate-edit-warnings' => 'Kemennoù diwall diwar-benn an troidigezhioù diglok',
	'translate-edit-goto-no-prev' => 'Kemennadenn ebet a-raok',
	'translate-edit-goto-no-next' => "Kemennadenn ebet war-lerc'h",
	'translate-edit-goto-prev' => "Mont d'ar gemennadenn a-raok",
	'translate-edit-goto-next' => "Mont d'ar gemennadenn war-lerc'h",
	'translate-edit-goto-list' => "Distreiñ d'ar roll :",
	'translate-magic-pagename' => 'Troidigezh Mediawiki astennet',
	'translate-magic-help' => "Gallout a rit treiñ aliasoù ar pajennoù dibar, ar gerioù burzhudus, anvioù an etrefasoù hag anvioù an esaouennoù anv.

Aliasoù ar pajennoù dibar hag ar gerioù burzhudus a c'hall kaout meur a droidigezh.
Dispartiet eo an troidigezhioù dre skejoù (,).
N'hall anvioù an etrefasoù ha re an esaouennoù anv nemet kaout un droidigezh hepken.

E troidigezhioù an esaouennoù anv eo dibar <tt>$1 talk</tt>. Erlec'hiet eo <tt>$1</tt> gant anv al lec'hienn (da skouer <tt>{{SITENAME}} talk</tt>).
Ma n'haller ket sevel lavarennoù reizh en ho yezh hep kemmañ anv al lec'hienn, kit e darempred gant un diorroer.

Ret eo deoc'h bezañ ezel eus ur strollad troerien evit enrollañ ar c'hemmoù.
Ne vo ket enrollet ar c'hemmoù e-keit ha ne vo ket bet pouezet war ar bouton dindan.",
	'translate-magic-module' => 'Modulenn :',
	'translate-magic-submit' => 'Mont',
	'translate-magic-cm-export' => 'Ezporzhiañ',
	'translate-magic-cm-to-be' => 'A zeu da vezañ',
	'translate-magic-cm-current' => 'Bremañ',
	'translate-magic-cm-original' => 'Orin',
	'translate-magic-cm-comment' => 'Notenn :',
	'translate-magic-cm-save' => 'Enrollañ',
	'translate-magic-cm-updatedusing' => 'Hizivaet en ur implijout [[Special:Magic]]',
	'translate-magic-cm-savefailed' => "C'hwitet enrollañ",
	'translate-magic-special' => 'Aliasoù pajenn zibar',
	'translate-magic-words' => 'Gerioù burzhudus',
	'translate-magic-skin' => 'Anvioù an etrefasoù',
	'translate-magic-namespace' => 'Anv an esaouennoù anv',
	'translationchanges' => 'Troidigezhioù bet adwelet',
	'translationchanges-export' => 'Ezporzhiañ',
	'translationchanges-change' => '$1: $2 gant $3',
	'translate-checks-parameters' => 'Ne vez ket graet gant an {{PLURAL:$2|arventenn|arventennoù}} da-heul : <strong>$1</strong>',
	'translate-checks-parameters-unknown' => 'Dianav eo an {{PLURAL:$2|arventenn|arventennoù}} da-heul :
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Ampar eo an niver a {{PLURAL:$2|grommelloù|grommelloù}} : <strong>$1</strong>',
	'translate-checks-links' => 'Kudennek eo al {{PLURAL:$2|liammoù|liammoù}} da-heul : <strong>$1</strong>',
	'translate-checks-xhtml' => "Erlec'hiit ar {{PLURAL:$2|valizenn|balizennoù}} da-heul gant ar re a zegouezh mar plij : <strong>$1</strong>",
	'translate-checks-plural' => 'Ober a ra an termenadur gant <nowiki>{{PLURAL:}}</nowiki> padal an droidigezh ne ra ket.',
	'translate-checks-pagename' => 'Anv esaouenn kemmet abaoe an termenadur',
	'tog-translate-nonewsletter' => "Arabat kas din kelc'hlizheroù dre bostel (ne den nemet d'ar re o deus kadarnaet o chomlec'h postel)",
	'right-translate' => 'Kemmañ en ur ober gant an etrefas treiñ',
	'translate-rc-translation-filter' => 'Silañ an troidigezhioù :',
	'translate-rc-translation-filter-no' => 'Na ober seurt ebet',
	'translate-rc-translation-filter-only' => 'Diskouez an troidigezhioù hepken',
	'translate-rc-translation-filter-filter' => 'Lakaat an troidigezhioù er-maez',
	'translate-rc-translation-filter-site' => "Kemmoù da gemennoù al lec'hienn hepken",
	'translationstats' => 'Stadegoù treiñ',
	'translate-stats-edits' => 'Kemmoù dre zevezh',
	'translate-stats-users' => 'Troerien',
	'translate-statsf-intro' => "Stadegoù eeun a c'hallit krouiñ gant ar furmskrid-mañ. Bevennoù izel hag uhel zo d'an holl dalvoudoù.",
	'translate-statsf-options' => 'Dibarzhioù ar grafik',
	'translate-statsf-width' => 'Ledander e piksel',
	'translate-statsf-height' => 'Uhelder e piksel',
	'translate-statsf-days' => 'Marevezh e devezhioù',
	'translate-statsf-scale' => 'Greunerezh',
	'translate-statsf-scale-days' => 'Deizioù',
	'translate-statsf-scale-hours' => 'Eurioù',
	'translate-statsf-count' => 'Muzul',
	'translate-statsf-count-edits' => 'Niver a aozadennoù',
	'translate-statsf-count-users' => 'Troerien oberiant',
	'translate-statsf-language' => 'Roll kodoù yezh, dispartiet gant skejoù',
	'translate-statsf-group' => 'Roll kodoù strolladoù, dispartiet gant skejoù',
	'translate-statsf-submit' => 'Rakwelet',
	'translate-tag-category' => 'Pajennoù da dreiñ',
	'translate-tag-page-desc' => 'Troidigezh ar bajenn wiki [[:$1]].',
	'translate-tag-translate-link-desc' => 'Treiñ ar bajenn-mañ',
	'translate-tag-legend' => "Alc'hwez :",
	'translate-tag-legend-fallback' => 'Troidigezh e yezhoù all',
	'translate-tag-legend-fuzzy' => 'Troidigezh dispredet',
	'translate-tag-fuzzy-comment' => 'Termenadur kemmet gant an implijer [[User:$1|$1]] er stumm $2.',
	'translate-tag-fuzzy-reason' => 'Termenadur kemmet gant an implijer "$1" stag outañ an evezhiadenn "$3" e $2.',
	'translate-sidebar-alltrans' => 'Troidigezhioù all',
	'translate-tag-noedit' => 'Un teul treiñ hizivaet ent emgefre eo ar bajenn-mañ.
Gallout a rit [$1 kemmañ ar bajenn orin] pe [$2 freskaat an droidigezh].',
	'translate-language' => 'Yezh :',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'translate' => 'Prijevod',
	'translate-desc' => '[[Special:Translate|Posebna stranica]] za prevođenje MediaWiki i još mnogo više',
	'translate-edit' => 'uredi',
	'translate-talk' => 'razgovor',
	'translate-history' => 'historija',
	'translate-task-view' => 'Pogledaj sve poruke iz',
	'translate-task-untranslated' => 'vidim sve neprevedene poruke iz',
	'translate-task-optional' => 'vidim moguće poruke iz',
	'translate-task-problematic' => 'vidim poruke koje imaju probleme',
	'translate-task-review' => 'pregledam promjene u',
	'translate-task-reviewall' => 'pregledam sve prevedene poruke u',
	'translate-task-export' => 'izvezem prijevode iz',
	'translate-task-export-to-file' => 'izvezem prijevode u datoteku iz',
	'translate-task-export-as-po' => 'izvezem prijevode u formatu Gettext',
	'translate-task-export-to-xliff' => 'izvezem prijevode u formatu Xliff',
	'translate-page-no-such-language' => 'Navedeni jezik ne postoji.',
	'translate-page-no-such-task' => 'Navedeni zadatak ne postoji.',
	'translate-page-no-such-group' => 'Navedena grupa ne postoji.',
	'translate-page-disabled' => "Prijevodi na ovaj jezik u ovoj grupi su onemogućeni. Razlog:

''$1''",
	'translate-page-settings-legend' => 'Postavke',
	'translate-page-task' => 'Želim da',
	'translate-page-group' => 'Grupa',
	'translate-page-language' => 'Jezik',
	'translate-page-limit' => 'Ograničenja',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|poruka|poruke|poruka}} po stranici',
	'translate-submit' => 'Pronađi',
	'translate-page-navigation-legend' => 'Navigacija',
	'translate-page-showing' => 'Prikazane su poruke od $1 do $2 iz $3.',
	'translate-page-showing-all' => 'Prikaz $1 {{PLURAL:$1|poruke|poruke|poruka}}.',
	'translate-page-showing-none' => 'Nema poruka za prikaz.',
	'translate-next' => 'slijedeća stranica',
	'translate-prev' => 'Prethodna stranica',
	'translate-page-description-legend' => 'Informacije o ovoj grupi',
	'translate-page-edit' => 'uredi',
	'translate-ignored' => '(zanemareno)',
	'translate-edit-definition' => 'Definicija poruke',
	'translate-edit-no-information' => "''Ova poruka nema pripadajuće dokumentacije. Ako znate gdje ili kako se ova poruka koristi, možete pomoći drugim prevodiocima tako što ćete dodati dokumentaciju za ovu poruku.''",
	'translate-edit-information' => 'Informacije o ovoj poruci ($1)',
	'translate-edit-in-other-languages' => 'Poruka na ostalim jezicima',
	'translate-edit-committed' => 'Trenutni prijevodi softvera',
	'translate-edit-warnings' => 'Upozorenja o nepotpunim prijevodima',
	'translate-edit-goto-no-prev' => 'Nema ranijih poruka',
	'translate-edit-goto-no-next' => 'Nema slijedeće poruke',
	'translate-edit-goto-prev' => 'Uredi prethodnu poruku',
	'translate-edit-goto-next' => 'Uredi slijedeću poruku',
	'translate-edit-goto-list' => 'Nazad na spisak',
	'translate-magic-submit' => 'Pronađi',
	'translate-magic-cm-export' => 'Izvoz',
	'translate-magic-cm-current' => 'Trenutno',
	'translate-magic-cm-original' => 'Originalno',
	'translate-magic-cm-comment' => 'Komentar:',
	'translate-magic-cm-save' => 'Sačuvaj',
	'translate-magic-words' => 'Magične riječi',
	'translate-magic-namespace' => 'Nazivi imenskih prostora',
	'translationchanges-export' => 'izvoz',
	'translate-rc-translation-filter-no' => 'Ne čini ništa',
	'translate-stats-users' => 'Prevodioci',
	'translate-statsf-scale-days' => 'dani',
	'translate-statsf-scale-hours' => 'sati',
	'translate-statsf-count-edits' => 'Broj izmjena',
	'translate-tag-category' => 'Stranice koje se mogu prevesti',
	'translate-tag-legend-fallback' => 'Prijevod na drugi jezik',
	'translate-sidebar-alltrans' => 'Ostali prijevodi',
);

/** Buginese (ᨅᨔ ᨕᨘᨁᨗ)
 * @author Kurniasan
 */
$messages['bug'] = array(
	'translate' => "Tare'juma",
	'translate-edit' => 'padécéŋ',
	'translate-talk' => 'bicara',
	'translate-history' => 'sejara',
	'translate-task-view' => 'Ita sininna méséje polé',
	'translate-task-untranslated' => "Ita manéŋ méséje deppa ritare'juma polé",
	'translate-task-optional' => 'Ita méséje opsional polé',
	'translate-page-task' => "Élloka'",
	'translate-submit' => 'Ala',
	'translate-page-edit' => 'padeccéŋ',
	'translate-edit-no-information' => "''Iyyedé méséjeë degaga dokuméntasina. Rékko idi isseŋi kotégaï na pakogaï ripaké, weddiŋi idi maŋinriŋ patare'juma laiŋë menambahkan dokumentasina.''",
	'translate-edit-information' => 'Informasina iyyéde leppa ($1)',
	'translate-magic-cm-save' => 'Taro',
	'translate-statsf-submit' => 'Pribiu',
	'translate-tag-translate-link-desc' => "Tare'juma iyyedé leppa",
);

/** Catalan (Català)
 * @author Jordi Roqué
 * @author SMP
 * @author Sanbec
 * @author Toniher
 */
$messages['ca'] = array(
	'translate' => 'Tradueix',
	'translate-desc' => '[[Special:Translate|Pàgina especial]] per a traduir el Mediawiki i altres coses',
	'translate-edit' => 'edita',
	'translate-talk' => 'discussió',
	'translate-history' => 'historial',
	'translate-task-view' => 'veure tots els missatges de',
	'translate-task-untranslated' => 'veure els missatges no traduïts de',
	'translate-task-optional' => 'veure els missatges opcionals de',
	'translate-task-problematic' => 'Veure missatges amb problemes',
	'translate-task-review' => 'revisar els canvis a',
	'translate-task-reviewall' => 'revisar les traduccions de',
	'translate-task-export' => 'exportar les traduccions de',
	'translate-task-export-to-file' => 'exportar a un fitxer de',
	'translate-task-export-as-po' => 'exportar en format Gettext',
	'translate-page-no-such-language' => 'La llengua especificada no és vàlida.',
	'translate-page-no-such-task' => 'La tasca especificada no és vàlida.',
	'translate-page-no-such-group' => 'El grup especificat no és vàlid.',
	'translate-page-disabled' => "Les traduccions a aquest idioma en aquest grup han estat suspeses. Motiu:

''$1''",
	'translate-page-settings-legend' => 'Preferències',
	'translate-page-task' => 'Vull',
	'translate-page-group' => 'Grup',
	'translate-page-language' => 'Llengua',
	'translate-page-limit' => 'Límit',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|missatge|missatges}} per pàgina',
	'translate-submit' => 'Mostra',
	'translate-page-navigation-legend' => 'Navegació',
	'translate-page-showing' => 'Mostrant missatges del $1 al $2 de $3.',
	'translate-page-showing-all' => 'Mostrant $1 {{PLURAL:$1|missatge|missatges}}.',
	'translate-page-showing-none' => 'No hi ha missatges a mostrar.',
	'translate-next' => 'Pàgina següent',
	'translate-prev' => 'Pàgina anterior',
	'translate-page-description-legend' => 'Informació del grup',
	'translate-optional' => '(opcional)',
	'translate-ignored' => '(ignorat)',
	'translate-edit-definition' => 'Definició del missatge',
	'translate-edit-contribute' => 'contribueix',
	'translate-edit-no-information' => "''Aquest missatge no té documentació. Si sabeu on o com és usat aquest missatge podeu ajudar la resta de traductors afegint-hi la documentació.''",
	'translate-edit-information' => 'Informació sobre el missatge ($1)',
	'translate-edit-in-other-languages' => 'Missatge en altres llengües',
	'translate-edit-committed' => 'Traducció utilitzada actualment pel programa',
	'translate-edit-warnings' => 'Avisos de traducció incompleta',
	'translate-edit-goto-no-prev' => 'Cap missatge previ',
	'translate-edit-goto-no-next' => 'Cap missatge posterior',
	'translate-edit-goto-prev' => 'Editar el missatge anterior',
	'translate-edit-goto-next' => 'Editar el missatge següent',
	'translate-edit-goto-list' => 'Tornar a la llista',
	'translate-magic-pagename' => 'Traducció ampliada del MediaWiki',
	'translate-magic-help' => "Aquí podeu traduir els noms de les pàgines especials, les paraules màgiques, els noms dels estils de pell (''skins'') i els títols dels diferents espais de noms (''namespaces'').

Els títols de les pàgines especials i les paraules màgiques poden tenir múltiples traduccions. Separeu-les per una coma (,) i un espai. Els estils i els espais de noms només poden tenir una traducció.

Dins les traduccions dels espais de noms, la <tt>$1 talk</tt> és especial. <tt>$1</tt> es substitueix pel nom del projecte (per exemple <tt>{{SITENAME}} talk</tt>). Si no és possible fer-ho així en el vostre idioma sense canviar la forma gramatical del nom del projecte, contacteu amb un programador.

Heu de tenir permisos de traductor per a desar els canvis, que no es guardaran fins que no cliqueu el botó corresponent.",
	'translate-magic-submit' => 'Mostra',
	'translate-magic-cm-export' => 'Exporta',
	'translate-magic-cm-to-be' => 'Serà',
	'translate-magic-cm-current' => 'Actual',
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-comment' => 'Comentari:',
	'translate-magic-cm-save' => 'Desa',
	'translate-magic-cm-updatedusing' => 'Actualitzat amb [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Error al desar',
	'translate-magic-special' => 'Noms de les pàgines especials',
	'translate-magic-words' => 'Paraules màgiques',
	'translate-magic-skin' => 'Noms dels estils',
	'translate-magic-namespace' => 'Noms dels espais de noms',
	'translationchanges' => 'Canvis a la traducció',
	'translationchanges-export' => 'exporta',
	'translationchanges-change' => '$1:$2 per $3',
	'translate-checks-parameters' => "{{PLURAL:$2|El paràmetre següent no s'està|Els paràmetres següents no s'estan}} usant:
<strong><nowiki>$1</nowiki></strong>",
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|El paràmetre següent és desconegut|Els paràmetres següent són desconeguts}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Hi ha un nombre senar de {{PLURAL:$2|parèntesis, claus i/o claudàtors|parèntesis, claus i/o claudàtors}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => "{{PLURAL:$2|L'enllaç següent és problemàtic|Els enllaços següents són problemàtics}}:
<strong><nowiki>$1</nowiki></strong>",
	'translate-checks-xhtml' => "{{PLURAL:$2|Reemplaceu l'etiqueta següent per la correcta|Reemplaceu les etiquetes següents per les correctes}}:
<strong><nowiki>$1</nowiki></strong>",
	'translate-checks-plural' => 'La definició utilitza <nowiki>{{PLURAL:}}</nowiki> i en canvi la traducció no.',
	'tog-translate-nonewsletter' => "No m'enviïs per correu electrònic el recull de notícies (només per a usuaris amb adreça electrònica)",
	'right-translate' => 'Editar fent servir la interfície de traducció',
	'translate-stats-edits' => 'Edicions',
	'translate-stats-users' => 'Traductors',
	'translate-statsf-width' => 'Amplada en píxels',
	'translate-statsf-height' => 'Alçada en píxels',
	'translate-statsf-scale-days' => 'Dies',
	'translate-statsf-scale-hours' => 'Hores',
	'translate-statsf-count-edits' => "Nombre d'edicions",
	'translate-statsf-count-users' => 'Traductors actius',
	'translate-statsf-submit' => 'Previsualització',
	'translate-tag-translate-link-desc' => 'Traduir aquesta pàgina',
	'translate-tag-legend-fallback' => 'Traducció en un altre idioma',
	'translate-sidebar-alltrans' => 'Altres traduccions',
);

/** Chamorro (Chamoru)
 * @author Gadao01
 * @author Jatrobat
 */
$messages['ch'] = array(
	'translate-edit' => 'tulaika',
	'translate-talk' => 'kuentusi',
	'translate-page-navigation-legend' => 'Nabegasion',
);

/** Czech (Česky)
 * @author Danny B.
 * @author Li-sung
 * @author Matěj Grabovský
 * @author Mormegil
 */
$messages['cs'] = array(
	'translate' => 'Přeložit',
	'translate-desc' => '[[Special:Translate|Speciální stránka]] zjednodušující překládání systémových hlášení MediaWiki',
	'translate-edit' => 'editovat',
	'translate-talk' => 'diskuse',
	'translate-history' => 'historie',
	'translate-task-view' => 'Zobrazit všechny zprávy z',
	'translate-task-untranslated' => 'Zobrazit všechny nepřeložené zprávy z',
	'translate-task-optional' => 'Zobrazit volitelné zprávy z',
	'translate-task-problematic' => 'Zobrazit zprávy s problematickým překladem',
	'translate-task-review' => 'Porovnat změny v',
	'translate-task-reviewall' => 'Porovnat všechny překlady v',
	'translate-task-export' => 'Exportovat překlady z',
	'translate-task-export-to-file' => 'Exportovat do souboru překlady z',
	'translate-task-export-as-po' => 'Exportovat překlad do formátu Gettext',
	'translate-task-export-to-xliff' => 'Exportovat překlad ve formátu Xliff',
	'translate-page-no-such-language' => 'Zadaný kód jazyka není platný',
	'translate-page-no-such-task' => 'Zadaná úloha byla neplatná.',
	'translate-page-no-such-group' => 'Zadaná skupina byla neplatná.',
	'translate-page-disabled' => "Překlady do tohoto jazyka byly v této skupině zakázány. Zdůvodnění:

''$1''",
	'translate-page-settings-legend' => 'Nastavení',
	'translate-page-task' => 'Chci',
	'translate-page-group' => 'skupina',
	'translate-page-language' => 'v&nbsp;jazyce',
	'translate-page-limit' => 's&nbsp;omezením',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|zpráva|zprávy|zpráv}} na stránce',
	'translate-submit' => 'Ukázat',
	'translate-page-navigation-legend' => 'Navigace',
	'translate-page-showing' => 'Zobrazeny zprávy $1 až $2 z $3.',
	'translate-page-showing-all' => '{{PLURAL:$1|Zobrazena $1 zpráva|Zobrazeny $1 zprávy|Zobrazeno $1 zpráv}}.',
	'translate-page-showing-none' => 'Požadavku neodpovídají žádné zprávy.',
	'translate-next' => 'Další stránka',
	'translate-prev' => 'Předchozí stránka',
	'translate-page-description-legend' => 'Informace o skupině',
	'translate-page-edit' => 'editovat',
	'translate-optional' => '(volitelné)',
	'translate-ignored' => '(ignorované)',
	'translate-edit-definition' => 'Zdroj zprávy',
	'translate-edit-contribute' => 'přispět',
	'translate-edit-no-information' => "''K této zprávě není dokumentace. Pokud víte, kde nebo jak se zpráva používá, můžete pomoci dalším překladatelům tím, že přidáte dokumentaci k této zprávě.''",
	'translate-edit-information' => 'Informace o této zprávě ($1)',
	'translate-edit-in-other-languages' => 'Zpráva v jiných jazycích',
	'translate-edit-committed' => 'Současný překlad v úložišti',
	'translate-edit-warnings' => 'Upozornění na neúplný překlad',
	'translate-edit-goto-no-prev' => 'Toto je první zpráva',
	'translate-edit-goto-no-next' => 'Toto je poslední zpráva',
	'translate-edit-goto-prev' => 'Editovat předchozí zprávu',
	'translate-edit-goto-next' => 'Editovat následující zprávu',
	'translate-edit-goto-list' => 'Zpět na seznam',
	'translate-magic-pagename' => 'Rozšířená možnost překladu Mediawiki',
	'translate-magic-submit' => 'Zobrazit',
	'translate-magic-cm-export' => 'Exportovat',
	'translate-magic-cm-to-be' => 'nové',
	'translate-magic-cm-current' => 'současné',
	'translate-magic-cm-original' => 'původní',
	'translate-magic-cm-comment' => 'Komentář:',
	'translate-magic-cm-save' => 'Uložit',
	'translate-magic-cm-updatedusing' => 'Aktualizovat pomocí [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Uložení se nepovedlo',
	'translate-magic-special' => 'Alternativní jména speciálních stránek',
	'translate-magic-words' => 'Kouzelná slůvka',
	'translate-magic-skin' => 'Názvy stylů',
	'translate-magic-namespace' => 'Názvy jmenných prostorů',
	'translationchanges' => 'Změny překladů',
	'translationchanges-export' => 'exportovat',
	'translationchanges-change' => '$1: $2 ($3)',
	'translate-checks-parameters' => 'Následující {{PLURAL:$2|parametr není použit|parametry nejsou použity}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => 'Následující {{PLURAL:$2|parametr není definován|parametry nejsou definovány}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Následující {{PLURAL:$2|typ závorek není správně spárován|typy závorek nejsou správně spárovány}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => 'Následující {{PLURAL:$2|odkaz je problematický|odkazy jsou problematické}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Opravte následující {{PLURAL:$2|značku|značky}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Zdroj používá <nowiki>{{PLURAL:}}</nowiki>, ale překlad nikoliv.',
	'right-translate' => "Editace překladu pomocí rozhraní ''Přeložit''",
	'translate-rc-translation-filter' => 'Filtr překladů:',
	'translate-rc-translation-filter-no' => 'Nijak nefiltrovat',
	'translate-rc-translation-filter-only' => 'Zobrazit jen překlady',
	'translate-rc-translation-filter-filter' => 'Nezobrazovat překlady',
	'translate-rc-translation-filter-site' => 'Pouze změny zdejších místních hlášení',
	'translationstats' => 'Statistika překladů',
	'translate-statsf-intro' => 'Pomocí tohoto formuláře můžete tvořit jednoduché statistiky. Všechny hodnoty mají horní a spodní hranici.',
	'translate-sidebar-alltrans' => 'Ostatní překlady',
);

/** Church Slavic (Словѣ́ньскъ / ⰔⰎⰑⰂⰡⰐⰠⰔⰍⰟ)
 * @author ОйЛ
 */
$messages['cu'] = array(
	'translate-page-language' => 'ѩꙁꙑ́къ',
);

/** Welsh (Cymraeg)
 * @author Lloffiwr
 */
$messages['cy'] = array(
	'translate-edit' => 'golygu',
	'translate-page-edit' => 'golygu',
	'tog-translate-nonewsletter' => 'Peidier ag anfon cylchlythyron e-bost ataf (dim ond yn berthnasol pan fo cyfeiriad e-bost defnyddiwr wedi ei gadarnhau)',
);

/** Danish (Dansk)
 * @author Jon Harald Søby
 */
$messages['da'] = array(
	'translate-edit' => 'redigér',
	'translate-talk' => 'dsikussion',
	'translate-history' => 'historik',
	'translate-page-group' => 'Gruppe',
	'translate-page-language' => 'Sprog',
	'translate-page-navigation-legend' => 'Navigation',
	'translate-next' => 'Næste side',
	'translate-prev' => 'Forrige side',
	'translate-magic-cm-current' => 'Nuværende',
);

/** German (Deutsch)
 * @author MichaelFrey
 * @author Purodha
 * @author Raimond Spekking
 * @author Umherirrender
 */
$messages['de'] = array(
	'translate' => 'Übersetze',
	'translate-desc' => '[[Special:Translate|Spezialseite]] für die Übersetzung von MediaWiki-Systemnachrichten',
	'translate-edit' => 'Bearbeiten',
	'translate-talk' => 'Diskussion',
	'translate-history' => 'Versionen',
	'translate-task-view' => 'Zeige alle Systemnachrichten der',
	'translate-task-untranslated' => 'Zeige alle nicht übersetzten Systemnachrichten der',
	'translate-task-optional' => 'Zeige optionale Systemnachrichten der',
	'translate-task-untranslatedoptional' => 'Zeige nicht übersetzte optionale Systemnachrichten der',
	'translate-task-problematic' => 'Zeige Systemnachrichten mit Problemen',
	'translate-task-review' => 'Prüfe Änderungen der',
	'translate-task-reviewall' => 'Prüfe alle Übersetzungen der',
	'translate-task-export' => 'Exportiere alle Übersetzungen der',
	'translate-task-export-to-file' => 'Exportiere alle Übersetzungen in eine Datei der',
	'translate-task-export-as-po' => 'Exportiere alle Übersetzungen in das Gettext-Format der',
	'translate-task-export-to-xliff' => 'Exportiere alle Übersetzungen in das Xliff-Formatt',
	'translate-page-no-such-language' => 'Die angegebene Sprache ist ungültig.',
	'translate-page-no-such-task' => 'Die angegebene Aufgabe ist ungültig.',
	'translate-page-no-such-group' => 'Die angegebene Gruppe ist ungültig.',
	'translate-page-disabled' => "Übersetzungen in dieser Sprache in dieser Gruppe wurde deaktiviert. Grund:

''$1''",
	'translate-page-settings-legend' => 'Einstellungen',
	'translate-page-task' => 'Aufgabe',
	'translate-page-group' => 'Gruppe',
	'translate-page-language' => 'Sprache',
	'translate-page-limit' => 'Limit',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|Systemnachricht|Systemnachrichten}} pro Seite',
	'translate-submit' => 'Hole',
	'translate-page-navigation-legend' => 'Navigation',
	'translate-page-showing' => 'Systemnachrichten $1 bis $2 von insgesamt $3',
	'translate-page-showing-all' => '$1 {{PLURAL:$1|Systemnachricht|Systemnachrichten}}',
	'translate-page-showing-none' => 'Keine Systemnachrichten zur Anzeige vorhanden.',
	'translate-next' => 'nächste Seite',
	'translate-prev' => 'vorherige Seite',
	'translate-page-description-legend' => 'Informationen über diese Gruppe',
	'translate-page-edit' => 'bearbeiten',
	'translate-optional' => '(optional)',
	'translate-ignored' => '(ignoriert)',
	'translate-edit-definition' => 'Systemnachricht im Original',
	'translate-edit-contribute' => 'bearbeiten',
	'translate-edit-no-information' => "''Diese Systemnachricht hat noch keine Dokumentation. Wenn du weißt, wo und welchem Zusammenhang sie benutzt wird, kannst du anderen Übersetzern helfen, indem du eine Dokumentation hinzufügst.''",
	'translate-edit-information' => 'Information über diese Systemnachricht ($1)',
	'translate-edit-in-other-languages' => 'Systemnachricht in anderer Sprache',
	'translate-edit-committed' => 'Aktuelle Übersetzung',
	'translate-edit-warnings' => 'Warnung über unvollständige Übersetzungen',
	'translate-edit-goto-no-prev' => 'Keine vorherige Systemnachricht',
	'translate-edit-goto-no-next' => 'Keine weitere Systemnachricht',
	'translate-edit-goto-prev' => 'Vorherige Systemnachricht bearbeiten',
	'translate-edit-goto-next' => 'Nächste Systemnachricht bearbeiten',
	'translate-edit-goto-list' => 'Zurück zur Liste',
	'translate-magic-pagename' => 'Erweiterte MediaWiki-Übersetzung',
	'translate-magic-help' => 'Du kannst hier Aliase für Spezialseiten, magische Wörter, Skinnamen und Namensraumnamen übersetzen.

Spezialseiten und magische Wörter können mehrere Übersetzungen haben, sie werden jeweils durch ein Komma (,) getrennt. Skinnamen und Namensraumnamen dürfen nur je eine Übersetzung haben.

In der Übersetzung eines Namensraumnamens hat <tt>$1 talk</tt> eine spezielle Bedeutung. <tt>$1</tt> wird durch den Projektnamen ersetzt (zum Beispiel <tt>{{SITENAME}} talk</tt>).
Wenn es in Deiner Sprache nicht möglich ist, eine grammatikalisch korrekte Form davon zu bilden ohne den Projektnamen zu verändern, kontaktiere bitte einen Softwareentwickler.

Du musst in der Übersetzer-Gruppe sein, um Änderungen zu speichern.
Änderungen werden erst beim Klick auf den Speichern-Button gespeichert.',
	'translate-magic-module' => 'Modul:',
	'translate-magic-submit' => 'Hole',
	'translate-magic-cm-export' => 'Export',
	'translate-magic-cm-to-be' => 'Sollte sein',
	'translate-magic-cm-current' => 'Aktuell',
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-comment' => 'Kommentar:',
	'translate-magic-cm-save' => 'Speichern',
	'translate-magic-cm-updatedusing' => 'Aktualisiert durch [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Speichern fehlgeschlagen',
	'translate-magic-special' => 'Spezialseiten-Aliase',
	'translate-magic-words' => 'Magische Wörter',
	'translate-magic-skin' => 'Skins',
	'translate-magic-namespace' => 'Namensraum-Namen',
	'translationchanges' => 'Übersetzungsänderungen',
	'translationchanges-export' => 'exportieren',
	'translationchanges-change' => '$1: $2 durch $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Der folgende Parameter wird|Die folgenden Parameter werden}} nicht benutzt: <strong>$1</strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Der folgende Parameter ist|Die folgenden Parameter sind}} unbekannt: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Die {{PLURAL:$2|folgende Klammersetzung ist|folgenden Klammersetzungen sind}} nicht ausgeglichen: <strong>$1</strong>',
	'translate-checks-links' => '{{PLURAL:$2|Der folgende Link ist|Die folgenden Links sind}} problematisch: <strong>$1</strong>',
	'translate-checks-xhtml' => 'Bitte ersetze {{PLURAL:$2|den folgenden Tag|die folgenden Tags}} durch die korrekten: <strong>$1</strong>',
	'translate-checks-plural' => 'Das Original benutzt <nowiki>{{PLURAL:}}</nowiki>, die Übersetzung aber nicht.',
	'translate-checks-pagename' => 'Namensraum geändert durch die Definition',
	'translate-checks-format' => 'Diese Übersetzung entspricht nicht der Definition oder hat eine ungültige Syntax: $1',
	'tog-translate-nonewsletter' => 'Sende mir keinen E-Mail-Newsletter zu (nur für Benutzer mit bestätigter E-Mail-Adresse relevant)',
	'right-translate' => 'Benutzung des Übersetzen-Interfaces',
	'translate-rc-translation-filter' => 'Übersetzungen filtern:',
	'translate-rc-translation-filter-no' => 'nichts',
	'translate-rc-translation-filter-only' => 'Zeige nur Übersetzungen',
	'translate-rc-translation-filter-filter' => 'Übersetzungen filtern',
	'translate-rc-translation-filter-site' => 'Nur Änderungen an Systemnachrichten der Site',
	'translationstats' => 'Übersetzungsstatistiken',
	'translate-stats-edits' => 'Bearbeitungen pro Tag',
	'translate-stats-users' => 'Übersetzer',
	'translate-statsf-intro' => 'Du kannst einfache Statistiken mit diesem Formular erstellen. Alle Werte haben untere und oberere Limits.',
	'translate-statsf-options' => 'Zeichnungsoptionen',
	'translate-statsf-width' => 'Breite in Pixel',
	'translate-statsf-height' => 'Höhe in Pixel',
	'translate-statsf-days' => 'Zeitraum in Tagen',
	'translate-statsf-scale' => 'Granularität',
	'translate-statsf-scale-days' => 'Tage',
	'translate-statsf-scale-hours' => 'Stunden',
	'translate-statsf-count' => 'Maßstab',
	'translate-statsf-count-edits' => 'Anzahl Bearbeitungen',
	'translate-statsf-count-users' => 'Aktive Übersetzer',
	'translate-statsf-language' => 'Komma-getrennte Liste der Sprachcodes',
	'translate-statsf-group' => 'Komma-getrennte Liste der Gruppencodes',
	'translate-statsf-submit' => 'Vorschau',
	'translate-tag-category' => 'Übersetzbare Seiten',
	'translate-tag-page-desc' => 'Übersetzung der Wikiseite [[:$1]].',
	'translate-tag-translate-link-desc' => 'Diese Seite übersetzen',
	'translate-tag-legend' => 'Legende:',
	'translate-tag-legend-fallback' => 'Übersetzung in eine andere Sprache',
	'translate-tag-legend-fuzzy' => 'Veraltete Übersetzung',
	'translate-tag-fuzzy-comment' => 'Definition verändert durch [[User:$1|$1]] in Version $2.',
	'translate-tag-fuzzy-reason' => 'Definition verändert durch „$1“ mit dem Kommentar „$3“ in $2.',
	'translate-sidebar-alltrans' => 'Andere Übersetzungen',
	'translate-tag-noedit' => 'Diese Seite ist eine automatisch aktualisierte Übersetzungsseite.
Du kannst die [$1 Originalseite bearbeiten] oder [$2 die Übersetzung aktualisieren].',
	'translations' => 'Alle Übersetzungen',
	'translations-summary' => 'Gib einen Nachrichtennamen ein, um alle verfügbaren Übersetzungen anzuzeigen.',
	'translate-translations-no-message' => '„$1“ ist keine übersetzbare Nachricht',
	'translate-translations-none' => 'Keine Übersetzungen für „$1“ verfügbar',
	'translate-translations-fieldset-title' => 'Alle Übersetzungen',
	'translate-translations-messagename' => 'Systemnachricht:',
	'translate-translations-including-no-param' => 'Bitte gebe einen gültigen Seitennamen als Unterseitenparameter an',
	'languagestats' => 'Sprachstatistiken',
	'languagestats-summary' => 'Diese Seite zeigt Übersetzungsstatistiken für alle ([[MediaWiki:Translate-languagestats-groups|konfigurierten]]) Nachrichtengruppen einer Sprache.',
	'translate-language-code' => 'Sprachcode',
	'translate-language-code-field-name' => 'Sprachcode:',
	'translate-suppress-complete' => 'Unterdrücke komplett übersetzte Nachrichtengruppen',
	'translate-language' => 'Sprache',
	'translate-total' => 'Systemnachrichten',
	'translate-untranslated' => 'Nicht übersetzt',
	'translate-percentage-complete' => 'Vollständig',
	'translate-percentage-fuzzy' => 'Veraltet',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author MichaelFrey
 */
$messages['de-formal'] = array(
	'translate-edit-no-information' => "''Diese Systemnachricht hat noch keine Dokumentation. Wenn Sie wissen, wo und welchem Zusammenhang sie benutzt wird, können Sie anderen Übersetzern helfen, indem Sie eine Dokumentation hinzufügen.''",
	'translate-magic-help' => 'Sie können hier Aliase für Spezialseiten, magische Wörter, Skinnamen und Namensraumnamen übersetzen.

Spezialseiten und magische Wörter können mehrere Übersetzungen haben, sie werden jeweils durch ein Komma (,) getrennt. Skinnamen und Namensraumnamen dürfen nur je eine Übersetzung haben.

In der Übersetzung eines Namensraumnamens hat <tt>$1 talk</tt> eine spezielle Bedeutung. <tt>$1</tt> wird durch den Projektnamen ersetzt (zum Beispiel <tt>{{SITENAME}} talk</tt>).
Wenn es in Ihrer Sprache nicht möglich ist, eine grammatikalisch korrekte Form davon zu bilden ohne den Projektnamen zu verändern, kontaktiere bitte einen Softwareentwickler.

Sie müssen in der Übersetzer-Gruppe sein, um Änderungen zu speichern.
Änderungen werden erst beim Klick auf den Speichern-Button gespeichert.',
	'translate-statsf-intro' => 'Sie können einfache Statistiken mit diesem Formular erstellen. Alle Werte haben untere und oberere Limits.',
	'translate-tag-noedit' => 'Diese Seite ist eine automatisch aktualisierte Übersetzungsseite.
Sie können die [$1 Originalseite bearbeiten] oder [$2 die Übersetzung aktualisieren].',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Dundak
 * @author Michawiki
 */
$messages['dsb'] = array(
	'translate' => 'Pśełožyś',
	'translate-desc' => '[[Special:Translate|Specialny bok]] za pśełožowanje Mediawiki a druge',
	'translate-edit' => 'wobźěłaś',
	'translate-talk' => 'Diskusija',
	'translate-history' => 'Wersije',
	'translate-task-view' => 'Wšykne powěsći pokazaś',
	'translate-task-untranslated' => 'Njepśełožone powěsći pokazaś',
	'translate-task-optional' => 'Opcionelne powěsći pokazaś',
	'translate-task-untranslatedoptional' => 'Pokazaś njepśełožone opcionalne powěsći z',
	'translate-task-problematic' => 'Powěsći pokazaś, kótarež maju problemy',
	'translate-task-review' => 'Změny pśeglědaś',
	'translate-task-reviewall' => 'Wšykne pśełožki pśeglědaś',
	'translate-task-export' => 'Pśełožki eksportěrowaś',
	'translate-task-export-to-file' => 'Pśełožk do dataje eksportěrowaś',
	'translate-task-export-as-po' => 'Pśełožk we formaśe Gettext eksportěrowaś',
	'translate-task-export-to-xliff' => 'Pśełožk do formata Xliff eksportěrowaś',
	'translate-page-no-such-language' => 'Pódana rěc jo njepłaśiwa była.',
	'translate-page-no-such-task' => 'Pódany nadawk jo njepłaśiwy był.',
	'translate-page-no-such-group' => 'Pódana kupka jo njepłaśiwa była.',
	'translate-page-disabled' => "Pśełožki w toś tej rěcy w toś tej kupce su se znjemóžnili. Pśicyna:

''$1''",
	'translate-page-settings-legend' => 'Nastajenja',
	'translate-page-task' => 'Cu',
	'translate-page-group' => 'Kupka',
	'translate-page-language' => 'Rěc',
	'translate-page-limit' => 'Licba powěsćow',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|powěsć|powěsći|powěsći|powěsćow}} na bok',
	'translate-submit' => 'Pokazaś',
	'translate-page-navigation-legend' => 'Nawigacija',
	'translate-page-showing' => 'Pokazuju se powěsći wót $1 až $2 z $3.',
	'translate-page-showing-all' => '{{PLURAL:$1|Pokazujo|Pokazujotej|Pokazuju|Pokazujo}} se $1 {{PLURAL:$1|powěsć|powěsći|powěsći|powěsćow}}.',
	'translate-page-showing-none' => 'Njedaju powěsći.',
	'translate-next' => 'Pśiducy bok',
	'translate-prev' => 'Slědny bok',
	'translate-page-description-legend' => 'Informacije wó kupce',
	'translate-page-edit' => 'wobźěłaś',
	'translate-optional' => '(opcionalny)',
	'translate-ignored' => '(ignorěrowany)',
	'translate-edit-definition' => 'Definicija powěsći',
	'translate-edit-contribute' => 'pśinosowaś',
	'translate-edit-no-information' => "''Toś ta powěsć njama dokumentaciju. Jolic wěš, źož abo kak toś ta powěsć se wužywa, móžoš drugim pśełožowarjam pomagaś, z tym až dokumentaciju k toś tej powěsći pśidawaš.''",
	'translate-edit-information' => 'Informacije wó toś tej powěsći ($1)',
	'translate-edit-in-other-languages' => 'Powěsć w drugich rěcach',
	'translate-edit-committed' => 'Aktualny pśełožk w software',
	'translate-edit-warnings' => 'Warnowanja wó njedopołnych pśełožkach',
	'translate-edit-goto-no-prev' => 'Žedna pśedchadna powěsć',
	'translate-edit-goto-no-next' => 'Žedna pśiduca powěsć',
	'translate-edit-goto-prev' => 'Pśedchadnu powěsć wobźěłaś',
	'translate-edit-goto-next' => 'Pśiducu powěsć wobźěłaś',
	'translate-edit-goto-list' => 'Slědk k lisćinje',
	'translate-magic-pagename' => 'Rozšyrjony pśełožk MediaWiki',
	'translate-magic-help' => 'Móžoš pśełožyś aliasy specialnych bokow, magiske słowa, mjenja šatow a mjenja mjenjowych rumow.

Aliasy specialnych bokow a magiske słowa mógu měś někotare pśełožki. Pśełožki źěle se pśez komu (,). Mjenja šatow a mjenjowe rumy mógu jano jaden pśełožk měś.

W pśełožkach mjenjowych rumow <tt>$1 diskusija</tt> jo wósebna. <tt>$1</tt> se pśez mjenjom sedła wuměnja (na pśikład <tt>{{SITENAME}} diskusija</tt>). Jolic w twójej rěcy njejo móžno płaśiwy wuraz tworiś, mimo až dejš mě sedła změniš, staj se pšosym z wuwiwarjom do zwiska.

Musyš w kupce pśełožowarjow byś, aby mogł změny cyniś. Změny se njeskładuju, až njekliknjoš tłocanko "Składowaś" dołojce.',
	'translate-magic-module' => 'Modul:',
	'translate-magic-submit' => 'Pokazaś',
	'translate-magic-cm-export' => 'Eksportěrowaś',
	'translate-magic-cm-to-be' => 'Ma byś',
	'translate-magic-cm-current' => 'aktualne',
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-comment' => 'Komentar',
	'translate-magic-cm-save' => 'Składowaś',
	'translate-magic-cm-updatedusing' => 'Z pomocu [[Special:Magic]] zaktualizěrowany',
	'translate-magic-cm-savefailed' => 'Składowanje jo se njeraźiło',
	'translate-magic-special' => 'Aliasy specialnych bokow',
	'translate-magic-words' => 'Magiske słowa',
	'translate-magic-skin' => 'Mě šatow',
	'translate-magic-namespace' => 'Mjenja mjenjowych rumow',
	'translationchanges' => 'Změny pśełožka',
	'translationchanges-export' => 'eksportěrowaś',
	'translationchanges-change' => '$1: $2 pśez $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Slědujucy parameter|Slědujucej parametra|Slědujuce parametry|Slědujucych parametrow}}  se {{PLURAL:$2|njewužywa|njewužywatej|njewužywaju|njwužywa}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Slědujucy parameter jo njeznaty|Slědujucej parametra stej njeznatej|Slědujuce parametry su njeznate|Slědujucych parametrow jo njeznate}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Jo njerowna licba {{PLURAL:$2|spinka|spinkow}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Slědujucy wótkaz jo problematiski|Slědujucej wótkaza stej problematiskej|Slědujuce wótkaze su problematiske|Slědujucych wótkazow jo problematiske}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Wuměń pšosym {{PLURAL:$2|Slědujucy tag|slědujucej taga|slědujuce tagi|slědujuce tagi}} pśez {{PLURAL:$2|korektny|korektnej|korektne|korektne}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Definicija <nowiki>{{PLURAL:}}</nowiki> wužywa, pśełožk pak nic.',
	'translate-checks-pagename' => 'Mjenjowy rum pśez definiciju změnjony',
	'translate-checks-format' => 'Toś ten pśełožk njeslědujo definiciji abo ma njepłaśiwu syntaksu: $1',
	'tog-translate-nonewsletter' => 'Njesćelśo mě emailowy list nowosćow (jano za wužywarjow z wobkšuśoneju emailoweju adresu relewantny)',
	'right-translate' => 'Z pomocu pśełožowańskego pówjercha wobźěłaś',
	'translate-rc-translation-filter' => 'Pśełožki filtrowaś:',
	'translate-rc-translation-filter-no' => 'Njecyń nic',
	'translate-rc-translation-filter-only' => 'Jano pśełožki pokazaś',
	'translate-rc-translation-filter-filter' => 'Pśełožki wufiltrowaś',
	'translate-rc-translation-filter-site' => 'Jano změny sedłowych powěsćow',
	'translationstats' => 'Statistika pśełožkow',
	'translate-stats-edits' => 'Změny na źeń',
	'translate-stats-users' => 'Pśełožowarje',
	'translate-statsf-intro' => 'Z toś tym formularom móžoš napóraś jadnoru statistiku, Wše gódnoty maju  górjejcnu a dołojcnu granicu.',
	'translate-statsf-options' => 'Opcije grafa',
	'translate-statsf-width' => 'Šyrokosć w pikselach',
	'translate-statsf-height' => 'Wusokosć w pikselach',
	'translate-statsf-days' => 'Cas w dnjach',
	'translate-statsf-scale' => 'Granularita',
	'translate-statsf-scale-days' => 'Dny',
	'translate-statsf-scale-hours' => 'Goźiny',
	'translate-statsf-count' => 'Měra',
	'translate-statsf-count-edits' => 'Licba změnow',
	'translate-statsf-count-users' => 'Aktiwne pśełožowarje',
	'translate-statsf-language' => 'Lisćina rěcnych kodow wótźělonych pśez komu',
	'translate-statsf-group' => 'Lisćina kupkowych kodow wótźělonych pśez komu',
	'translate-statsf-submit' => 'Pśeglěd',
	'translate-tag-category' => 'Pśełožujobne boki',
	'translate-tag-page-desc' => 'Pśełožk wikijowego boka [[:$1]].',
	'translate-tag-translate-link-desc' => 'Toś ten bok pśełožyś',
	'translate-tag-legend' => 'Legenda:',
	'translate-tag-legend-fallback' => 'Pśełožk do drugeje rěcy',
	'translate-tag-legend-fuzzy' => 'Zestarjety pśełožk',
	'translate-tag-fuzzy-comment' => 'Definicija wót [[User:$1|$1]] we wersiji $2 změnjona.',
	'translate-tag-fuzzy-reason' => 'Definicija wót "$1" z komentarom "$3" w $2 změnjona.',
	'translate-sidebar-alltrans' => 'Druge pśełožki',
	'translate-tag-noedit' => 'Toś ten bok jo awtomatiski zaktualizěrowany pśełožkowy bok.
Móžoš [$1 žrědłowy bok wobźěłaś] abo [$2 pśełožk aktualizěrowaś].',
	'translations' => 'Wšykne pśełožki',
	'translations-summary' => 'Zapódaj dołojce zdźěleńske mě, aby wšykne k dispozciji stojece pśełožki pokazał.',
	'translate-translations-no-message' => '"$1" njejo zdźělenje, kótarež dajo se pśełožowaś.',
	'translate-translations-none' => 'Njejsu pśełožki za "$1"',
	'translate-translations-fieldset-title' => 'Wšykne pśełožki',
	'translate-translations-messagename' => 'Zdźělenje:',
	'translate-translations-including-no-param' => 'Pódaj pšosym płaśiwe bokowe mě w parametrje pódboka',
	'languagestats' => 'Rěcna statistika',
	'languagestats-summary' => 'Toś ten bok pokazujo pśełožkowu statistiku za wšykne ([[MediaWiki:Translate-languagestats-groups|konfigurěrowane]]) zdźěleńske kupki za rěc.',
	'translate-language-code' => 'Rěcny kod',
	'translate-language-code-field-name' => 'Rěcny kod:',
	'translate-suppress-complete' => 'Dopołnje pśełožone zdźěleńske kupki pódtłocyś',
	'translate-language' => 'Rěc:',
	'translate-total' => 'Zdźělenja',
	'translate-untranslated' => 'Njepśełožony',
	'translate-percentage-complete' => 'Dopołnjenje',
	'translate-percentage-fuzzy' => 'Zestarjony',
);

/** Greek (Ελληνικά)
 * @author Consta
 * @author Dead3y3
 */
$messages['el'] = array(
	'translate' => 'Μεταφράστε',
	'translate-desc' => '[[Special:Translate|Ειδική σελίδα]] για την μετάφραση του Mediawiki και ακόμη παραπέρα',
	'translate-edit' => 'επεξεργασία',
	'translate-talk' => 'συζήτηση',
	'translate-history' => 'ιστορικό',
	'translate-task-view' => 'όλα τα μηνύματα από την',
	'translate-task-untranslated' => 'όλα τα αμετάφραστα μηνύματα από την',
	'translate-task-optional' => 'τα προαιρετικά μηνύματα από την',
	'translate-task-problematic' => 'μηνύματα που έχουν προβλήματα',
	'translate-task-review' => 'τις αλλαγές των επεξεργασιών από την',
	'translate-task-reviewall' => 'την προεπισκόπηση όλων των μεταφρασμένων μηνυμάτων στην',
	'translate-task-export' => 'Εξαγωγή μεταφράσεων από',
	'translate-task-export-to-file' => 'την εξαγωγή της μετάφρασης σε αρχείο από την',
	'translate-task-export-as-po' => 'την εξαγωγή της μετάφρασης σε μορφή Gettext',
	'translate-task-export-to-xliff' => 'την εξαγωγή της μετάφρασης σε μορφή Xliff',
	'translate-page-no-such-language' => 'Η καθορισμένη γλώσσα ήταν άκυρη.',
	'translate-page-no-such-task' => 'Το καθορισμένο έργο ήταν άκυρο.',
	'translate-page-no-such-group' => 'Η καθορισμένη ομάδα ήταν άκυρη.',
	'translate-page-disabled' => "Οι μεταφράσεις σε αυτή τη γλώσσα αυτής της ομάδας έχουν απενεργοποιηθεί. Ο λόγος είναι:

''$1''",
	'translate-page-settings-legend' => 'Ρυθμίσεις',
	'translate-page-task' => 'Θέλω',
	'translate-page-group' => 'Ομάδα',
	'translate-page-language' => 'Γλώσσα',
	'translate-page-limit' => 'Όριο',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|μήνυμα|μηνύματα}} ανά σελίδα',
	'translate-submit' => 'Πηγαίνετε',
	'translate-page-navigation-legend' => 'Πλοήγηση',
	'translate-page-showing' => 'Εμφάνιση μηνυμάτων από $1 έως $2 στα $3.',
	'translate-page-showing-all' => 'Παρουσίαση $1 {{PLURAL:$1|μηνύματος|μηνυμάτων}}.',
	'translate-page-showing-none' => 'Δεν υπάρχουν μηνύματα για εμφάνιση.',
	'translate-page-paging-links' => '[ $1 ] [ $2 ]',
	'translate-next' => 'Επόμενη σελίδα',
	'translate-prev' => 'Προηγούμενη σελίδα',
	'translate-page-description-legend' => 'Πληροφορίες σχετικά με την ομάδα',
	'translate-page-edit' => 'επεξεργασία',
	'translate-optional' => '(προαιρετικά)',
	'translate-ignored' => '(αγνοήστε)',
	'translate-edit-definition' => 'Ορισμός μηνύματος',
	'translate-edit-contribute' => 'συμβάλλετε',
	'translate-edit-no-information' => "''Αυτό το μήνυμα δεν έχει τεκμηρίωση. Αν γνωρίζετε που ή πως χρησιμοποιείται αυτό το μήνυμα, μπορείτε να βοηθήσετε άλλους μεταφραστές προσθέτοντας τεκμηρίωση σε αυτό.''",
	'translate-edit-information' => 'Πληροφορίες σχετικά με αυτό το μήνυμα ($1)',
	'translate-edit-in-other-languages' => 'Το μήνυμα σε άλλες γλώσσες',
	'translate-edit-committed' => 'Τρέχουσα μετάφραση στο λογισμικό',
	'translate-edit-warnings' => 'Προειδοποιήσεις για ημιτελείς μεταφράσεις',
	'translate-edit-goto-no-prev' => 'Κανένα προηγούμενο μήνυμα',
	'translate-edit-goto-no-next' => 'Κανένα επόμενο μήνυμα',
	'translate-edit-goto-prev' => 'Επεξεργασία προηγούμενου μηνύματος',
	'translate-edit-goto-next' => 'Επεξεργασία επόμενου μηνύματος',
	'translate-edit-goto-list' => 'Πίσω στη λίστα',
	'translate-magic-pagename' => 'Μετάφραση εκτεταμένου Mediawiki',
	'translate-magic-help' => 'Μπορείτε να μεταφράσετε ψευδώνυμα ειδικών σελίδων, μαγικές λέξεις, ονόματα skins και ονόματα namespaces.

Τα ψευδώνυμα ειδικών σελίδων και οι μαγικές λέξεις μπορούν να έχουν πολλαπλές μεταφράσεις.
Οι μεταφράσεις χωρίζονται με ένα κόμμα (,).
Τα ονόματα skins και τα namespaces μπορούν να έχουν μόνο μία μετάφραση.

Στις μεταφράσεις namespaces η <tt>$1 talk</tt> είναι ειδική. Η <tt>$1</tt> αντικαθίσταται με το όνομα του ιστοτόπου (για παράδειγμα <tt>{{SITENAME}} talk</tt>).
Αν δεν είναι δυνατόν στη γλώσσα σας να σχηματίσετε έγκυρη έκφραση χωρίς να αλλάξετε το όνομα του ιστοτόπου, παρακαλούμε επικοινωνήστε με έναν developer.

Πρέπει να είστε στην ομάδα των μεταφραστών για να αποθηκεύσετε αλλαγές.
Οι αλλαγές δεν αποθηκεύονται μέχρι να κάνετε κλικ στο κουμπί την αποθήκευσης παρακάτω.',
	'translate-magic-module' => 'Ενότητα:',
	'translate-magic-submit' => 'Προσκόμισε',
	'translate-magic-cm-export' => 'Εξαγωγή',
	'translate-magic-cm-to-be' => 'Θα είναι',
	'translate-magic-cm-current' => 'Τρέχον',
	'translate-magic-cm-original' => 'Πρωτότυπο',
	'translate-magic-cm-comment' => 'Σχόλιο:',
	'translate-magic-cm-save' => 'Αποθηκεύστε',
	'translate-magic-cm-updatedusing' => 'Ενημερώθηκε χρησιμοποιόντας την σελίδα [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Η αποθήκευση απέτυχε',
	'translate-magic-special' => 'Ψευδώνυμα ειδικών σελίδων',
	'translate-magic-words' => 'Μαγικές λέξεις',
	'translate-magic-skin' => 'Όνομα skins',
	'translate-magic-namespace' => 'Ονόματα namespaces',
	'translationchanges' => 'Αλλαγές μετάφρασης',
	'translationchanges-export' => 'εξαγωγή',
	'translationchanges-change' => '$1: $2 από $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Η παράμετρος|Οι παράμετροι}} που ακολουθούν δεν χρησιμοποιούνται:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Η ακόλουθη παράμετρος|Οι ακόλουθες παράμετροι}} είναι {{PLURAL:$2|άγνωστη|άγνωστες}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Υπάρχει ακανόνιστη ποσότητα {{PLURAL:$2|παρενθέσεων|παρενθέσεων}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Ο ακόλουθος σύνδεσμος|$2 Οι ακόλουθοι σύνδεσμοι}} είναι {{PLURAL:$2|προβληματικός|$2 προβληματικοί}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Παρακαλώ αντικαταστήστε {{PLURAL:$2|την ακόλουθη ετικέτα|τις ακόλουθες ετικέτες}} με {{PLURAL:$2|την σωστή|τις σωστές}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Ο ορισμός χρησιμοποιεί την συνάρτηση <nowiki>{{PLURAL:}}</nowiki> αλλά η μετάφραση όχι.',
	'translate-checks-pagename' => 'Το namespace άλλαξε από τον ορισμό',
	'tog-translate-nonewsletter' => 'Μην μου στέλνετε e-mail newsletters (σχετικό μόνο για χρήστες με μια επιβεβαιωμένη διεύθυνση e-mail)',
	'right-translate' => 'Επεξεργασία χρησιμοποιώντας την διεπαφή μετάφρασης',
	'translate-rc-translation-filter' => 'Φιλτράρισμα μεταφράσεων:',
	'translate-rc-translation-filter-no' => 'Μην κάνεις τίποτα',
	'translate-rc-translation-filter-only' => 'Εμφάνιση μεταφράσεων μόνο',
	'translate-rc-translation-filter-filter' => 'Φίλτραρε εκτός τις μεταφράσεις',
	'translate-rc-translation-filter-site' => 'Αλλαγές στα μηνύματα ιστοτόπου μόνο',
	'translationstats' => 'Στατιστικά μετάφρασης',
	'translate-stats-edits' => 'Επεξεργασίες',
	'translate-stats-users' => 'Μεταφραστές',
	'translate-statsf-intro' => 'Μπορείτε να δημιουργήσετε απλά στατιστικά με αυτή τη φόρμα. Όλες οι τιμές έχουν πάνω και κάτω όρια.',
	'translate-statsf-options' => 'Επιλογές γραφήματος',
	'translate-statsf-width' => 'Πλάτος σε πίξελς',
	'translate-statsf-height' => 'Ύψος σε πίξελς',
	'translate-statsf-days' => 'Χρονική περίοδος σε ημέρες',
	'translate-statsf-scale' => 'Λεπτομέρεια',
	'translate-statsf-scale-days' => 'Ημέρες',
	'translate-statsf-scale-hours' => 'Ώρες',
	'translate-statsf-count' => 'Μονάδα μέτρησης',
	'translate-statsf-count-edits' => 'Αριθμός επεξεργασιών',
	'translate-statsf-count-users' => 'Ενεργοί μεταφραστές',
	'translate-statsf-language' => 'Λίστα κωδικών γλωσσών χωρισμένη με κόμματα',
	'translate-statsf-group' => 'Λίστα κωδικών ομάδων χωρισμένη με κόμματα',
	'translate-statsf-submit' => 'Προεπισκόπηση',
	'translate-tag-category' => 'Μεταφράσιμες σελίδες',
	'translate-tag-page-desc' => 'Μετάφραση της σελίδας wiki [[:$1]].',
	'translate-tag-translate-link-desc' => 'Μεταφράστε αυτή τη σελίδα',
	'translate-tag-legend' => 'Ετικέτα:',
	'translate-tag-legend-fallback' => 'Μετάφραση σε άλλη γλώσσα',
	'translate-tag-legend-fuzzy' => 'Παρωχημένη μετάφραση',
	'translate-tag-fuzzy-comment' => 'Ο ορισμός αλλάχθηκε από [[User:$1|$1]] στην αναθεώρηση $2.',
	'translate-tag-fuzzy-reason' => 'Ο ορισμός αλλάχθηκε από τον/την "$1" με σχόλιο "$3" στις $2.',
	'translate-sidebar-alltrans' => 'Άλλες μεταφράσεις',
	'translate-tag-noedit' => 'Αυτή είναι μια αυτόματα ενημερώσιμη σελίδα μετάφρασης.
Μπορείτε να [$1 επεξεργαστείτε την πηγαία σελίδα] ή να [$2 ενημερώσετε την μετάφραση].',
);

/** Esperanto (Esperanto)
 * @author Michawiki
 * @author Tlustulimu
 * @author Yekrats
 */
$messages['eo'] = array(
	'translate' => 'Tradukado',
	'translate-desc' => '[[Special:Translate|Speciala paĝo]] por traduki Mediawiki kaj alia',
	'translate-edit' => 'redakti',
	'translate-talk' => 'diskuto',
	'translate-history' => 'historio',
	'translate-task-view' => 'Rigardi ĉiujn mesaĝojn de',
	'translate-task-untranslated' => 'Rigardi ĉiujn netradukitajn mesaĝojn de',
	'translate-task-optional' => 'Rigardi laŭvolajn mesaĝojn',
	'translate-task-problematic' => 'Rigardi mesaĝojn kun problemoj',
	'translate-task-review' => 'Rekontroli ŝanĝojn al',
	'translate-task-reviewall' => 'Rekontroli ĉiujn tradukojn en',
	'translate-task-export' => 'Eksporti tradukojn de',
	'translate-task-export-to-file' => 'Eksporti tradukon en dosieron de',
	'translate-task-export-as-po' => 'Eksporti tradukon al la formato Gettext',
	'translate-task-export-to-xliff' => 'Eksporti tradukadon laŭ formato Xliff',
	'translate-page-no-such-language' => 'Specifita lingvo estas malvalida.',
	'translate-page-no-such-task' => 'Specifita tasko estis malvalida.',
	'translate-page-no-such-group' => 'Specifita grupo estas malvalida.',
	'translate-page-disabled' => "Tradukoj al ĉi tiu lingvo en ĉi tiu grupo estis malebligita. Kialo:

''$1''",
	'translate-page-settings-legend' => 'Preferoj',
	'translate-page-task' => 'Mi volas',
	'translate-page-group' => 'Grupo',
	'translate-page-language' => 'Lingvo',
	'translate-page-limit' => 'Nombro de mesaĝoj',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|mesaĝo|mesaĝoj}} po paĝo',
	'translate-submit' => 'Mendi',
	'translate-page-navigation-legend' => 'Navigado',
	'translate-page-showing' => 'Estas motrataj mesaĝoj $1 ĝis $2 el $3.',
	'translate-page-showing-all' => 'Estas montrataj $1 {{PLURAL:$1|mesaĝo|mesaĝoj}}.',
	'translate-page-showing-none' => 'Ne estas mesaĝoj por montri.',
	'translate-next' => 'Sekva paĝo',
	'translate-prev' => 'Antaŭa paĝo',
	'translate-page-description-legend' => 'Informoj pri la grupo',
	'translate-page-edit' => 'redakti',
	'translate-optional' => '(nedeviga)',
	'translate-ignored' => '(ignorata)',
	'translate-edit-definition' => 'Mesaĝa difino',
	'translate-edit-contribute' => 'kontribui',
	'translate-edit-no-information' => "''Ĉi tiu mesago ne havas dokumentaron. Se vi scias, kie aŭ kiel ĉi tiu mesaĝo estas uzata, vi povas helpi al aliaj tradukantoj aldonante la dokumentaron al ĉi tiu mesaĝo.''",
	'translate-edit-information' => 'Informoj pri ĉi tiu mesaĝo ($1)',
	'translate-edit-in-other-languages' => 'Mesaĝo en aliaj lingvoj',
	'translate-edit-committed' => 'Aktuala traduko en programaro',
	'translate-edit-warnings' => 'Avertoj pri nekompletaj tradukoj',
	'translate-edit-goto-no-prev' => 'Neniu antaŭa mesaĝo',
	'translate-edit-goto-no-next' => 'Neniu posta mesaĝo',
	'translate-edit-goto-prev' => 'Redakti antaŭan mesaĝon',
	'translate-edit-goto-next' => 'Redakti postan mesaĝon',
	'translate-edit-goto-list' => 'Reiri al la listo',
	'translate-magic-pagename' => 'Etendita traduko de MediaWiki',
	'translate-magic-help' => 'Vi povas traduki specialajn kromnomojn de paĝoj, magiajn vortojn, nomojn de etosoj kaj nomojn de nomspacoj.

Specialaj kromnomoj de paĝoj kaj magiaj vortoj povas havi multajn tradukojn.
Tradukoj estas apartigitaj de komo (,).
Nomoj de etosoj kaj nomspacoj nur povas havi unu tradukon.


En nomspacaj tradukoj <tt>$1 diskuto</tt> estas speciala. <tt>$1</tt> estas anstataŭigita de la nomo de la retejo (ekz-e <tt>{{SITENAME}}) diskuto</tt>.
Se ne eblas en via lingvo formi validan esprimon sen ŝanĝi la nomon de la retejo, bonvolu kontakti programisto.

Vi devas esti en la grupo de tradukantoj por konservi ŝanĝojn.
Ŝanĝoj ne estos konservataj, ĝis vi alklakis la jenan butonon Konservi.',
	'translate-magic-module' => 'Modjulo:',
	'translate-magic-submit' => 'Montri',
	'translate-magic-cm-export' => 'Eksporti',
	'translate-magic-cm-to-be' => 'Esti',
	'translate-magic-cm-current' => 'Nuntempe',
	'translate-magic-cm-original' => 'Originalo',
	'translate-magic-cm-comment' => 'Komento:',
	'translate-magic-cm-save' => 'Konservi',
	'translate-magic-cm-updatedusing' => 'Ĝisdatigita pere de [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Konservado malsukcesis',
	'translate-magic-special' => 'Kromnomoj de specialaj paĝoj',
	'translate-magic-words' => 'Magiaj vortoj',
	'translate-magic-skin' => 'Nomoj de etosoj',
	'translate-magic-namespace' => 'Nomoj de nomspacoj',
	'translationchanges' => 'Tradukŝanĝoj',
	'translationchanges-export' => 'eksporti',
	'translationchanges-change' => '$1: $2 de $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Jenaj parametroj ne estas uzataj|Jena parametro ne estas uzata}}: <strong>$1</strong>',
	'translate-checks-parameters-unknown' => 'Jenaj {{PLURAL:$2|parametro|parametroj}} estas nekonataj:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Estas nepara nombro de {{PLURAL:$2|krampo|krampoj}}: <strong>$1</strong>',
	'translate-checks-links' => '{{PLURAL:$2|Jenaj ligiloj estas problemaj|Jena ligilo estas problema}}: <strong>$1</strong>',
	'translate-checks-xhtml' => 'Bonvolu anstataŭigi {{PLURAL:$2|jena etikedo|jenajn etikedojn}} per la korektaj:
<strong>$1</strong>',
	'translate-checks-plural' => 'Difino uzas <nowiki>{{PLURAL:}}</nowiki>, sed traduko ne.',
	'translate-checks-pagename' => 'Nomspaco ŝanĝita de difino',
	'tog-translate-nonewsletter' => 'Ne sendi al mi retpoŝtajn gazetojn (nur koncerna por uzantoj kun konfirmita retpoŝta adreso)',
	'right-translate' => 'Redakti per la traduka interfaco',
	'translate-rc-translation-filter' => 'Filtri tradukojn:',
	'translate-rc-translation-filter-no' => 'Fari nenion',
	'translate-rc-translation-filter-only' => 'Montri nur tradukojn',
	'translate-rc-translation-filter-filter' => 'Forfiltri tradukojn',
	'translate-rc-translation-filter-site' => 'Ŝanĝoj nur al mesaĝoj de la retejo',
	'translationstats' => 'Statistiko pri tradukado',
	'translate-stats-edits' => 'Redaktoj',
	'translate-stats-users' => 'Tradukantoj',
	'translate-statsf-intro' => 'Vi povas generi simplajn statistikojn kun ĉi tiu paĝo. Ĉiuj valoroj estas limigitaj suben kaj supren.',
	'translate-statsf-options' => 'Grafeaj opcioj',
	'translate-statsf-width' => 'Larĝo en rastrumeroj',
	'translate-statsf-height' => 'Alto en rastrumeroj',
	'translate-statsf-days' => 'Tempdaŭro po tagoj',
	'translate-statsf-scale' => 'Detaleco',
	'translate-statsf-scale-days' => 'Tagoj',
	'translate-statsf-scale-hours' => 'Horoj',
	'translate-statsf-count' => 'Mezuro',
	'translate-statsf-count-edits' => 'Nombro de redaktoj',
	'translate-statsf-count-users' => 'Aktivaj tradukantoj',
	'translate-statsf-language' => 'Kome apartigita listo de lingvaj kodoj',
	'translate-statsf-group' => 'Kome apartigita listo de grupaj kodoj',
	'translate-statsf-submit' => 'Antaŭvido',
	'translate-tag-category' => 'Tradukeblaj paĝoj',
	'translate-tag-page-desc' => 'Traduko de la vikia paĝo [[:$1]].',
	'translate-tag-translate-link-desc' => 'Traduki ĉi tiun paĝon',
	'translate-tag-legend' => 'Legendo:',
	'translate-tag-legend-fallback' => 'Traduko en alia lingvo',
	'translate-tag-legend-fuzzy' => 'Malfreŝa traduko',
	'translate-tag-fuzzy-comment' => 'Difino ŝanĝita de [[User:$1|$1]] en versio $2.',
	'translate-tag-fuzzy-reason' => 'Difino ŝanĝita de "$1" kun komento "$3" en $2.',
	'translate-sidebar-alltrans' => 'Aliaj tradukoj',
	'translate-tag-noedit' => 'Ĉi tiu paĝo estas aŭtomate ĝisdatigita traduko-paĝo.
Vi povas [$1 redakti la fontpaĝon] aŭ [$2 ĝisdatigi la tradukon].',
	'translations' => 'Ĉiuj tradukoj',
	'translations-summary' => 'Enigu mesaĝan nomon suben por montri ĉiujn haveblajn tradukojn.',
	'translate-translations-no-message' => '"$1" ne estas tradukebla mesaĝo',
	'translate-translations-none' => 'Estas neniuj tradukoj por "$1"',
	'translate-translations-fieldset-title' => 'Ĉiuj tradukoj',
	'translate-translations-messagename' => 'Mesaĝo:',
	'languagestats' => 'Lingvaj statistikoj',
	'translate-language-code' => 'Lingva kodo',
	'translate-language-code-field-name' => 'Lingva kodo:',
	'translate-language' => 'Lingvo',
	'translate-total' => 'Mesaĝoj',
	'translate-percentage-fuzzy' => 'Malfreŝdata',
);

/** Spanish (Español)
 * @author Lin linao
 * @author Sanbec
 */
$messages['es'] = array(
	'translate' => 'Traducir',
	'translate-desc' => '[[Special:Translate|Página especial]] para traducir el software MediaWiki y otros',
	'translate-edit' => 'editar',
	'translate-talk' => 'discusión',
	'translate-history' => 'historial',
	'translate-task-view' => 'Ver todos los mensajes de',
	'translate-task-untranslated' => 'Ver todos los mensajes sin traducir de',
	'translate-task-optional' => 'Ver los mensajes opcionales de',
	'translate-task-problematic' => 'Ver los mensajes que tienen problemas',
	'translate-task-review' => 'Revisar cambios en',
	'translate-task-reviewall' => 'Revisar todas las traducciones en',
	'translate-task-export' => 'Exportar traducciones desde',
	'translate-task-export-to-file' => 'Exportar a un archivo las traducciones de',
	'translate-task-export-as-po' => 'Exportar traducción en formato Gettext',
	'translate-task-export-to-xliff' => 'Exportar traducción en formato Xliff',
	'translate-page-no-such-language' => 'No se especificó un idioma válido',
	'translate-page-no-such-task' => 'La tarea especificada no es válida.',
	'translate-page-no-such-group' => 'El grupo especificado no es válido.',
	'translate-page-disabled' => "Se han deshabilitado las traducciones a este idioma en este grupo de mensajes. Razón:

''$1''",
	'translate-page-settings-legend' => 'Preferencias',
	'translate-page-task' => 'Deseo',
	'translate-page-group' => 'Grupo',
	'translate-page-language' => 'Idioma',
	'translate-page-limit' => 'Límite',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|mensaje|mensajes}} por página',
	'translate-submit' => 'Buscar',
	'translate-page-navigation-legend' => 'Navegación',
	'translate-page-showing' => 'Mostrando mensajes del $1 al $2 de $3',
	'translate-page-showing-all' => 'Mostrando $1 {{PLURAL:$1|mensaje|mensajes}}.',
	'translate-page-showing-none' => 'No hay mensajes para mostrar',
	'translate-next' => 'Página siguiente',
	'translate-prev' => 'Página anterior',
	'translate-page-description-legend' => 'Información acerca del grupo',
	'translate-page-edit' => 'editar',
	'translate-optional' => '(opcional)',
	'translate-ignored' => '(ignorado)',
	'translate-edit-definition' => 'Mensaje original',
	'translate-edit-contribute' => 'contribuye',
	'translate-edit-no-information' => "''No hay datos para este mensaje. Si sabes dónde o cómo se usa, puedes ayudar a otros traductores añadiéndole datos.''",
	'translate-edit-information' => 'Información acerca de este mensaje ($1)',
	'translate-edit-in-other-languages' => 'Mensaje en otros idiomas',
	'translate-edit-committed' => 'Traducción actual en el software',
	'translate-edit-warnings' => 'Advertencias acerca de traducciones incompletas',
	'translate-edit-goto-no-prev' => 'No hay mensaje anterior',
	'translate-edit-goto-no-next' => 'No hay mensaje posterior',
	'translate-edit-goto-prev' => 'Editar el mensaje anterior',
	'translate-edit-goto-next' => 'Editar el mensaje posterior',
	'translate-edit-goto-list' => 'Volver a la lista',
	'translate-magic-pagename' => 'Traducción extendida de MediaWiki',
	'translate-magic-help' => 'Puedes traducir los nombres de las páginas especiales, las palabras mágicas, los nombres de pieles y los de los espacios de nombre

Los nombres de las páginas especiales y las palabras mágicas pueden tener varias traducciones, que se separan por comas (,).
los nombres de pieles y espacios de nombre sólo pueden tener una traducción

En las traducciones de espacios de nombre <tt>$1 talk</tt> es especial. <tt>$1</tt> se reemplaza por el nombre del sitio (por ejemplo <tt>{{SITENAME}} talk</tt>). Si en tu idioma no es posible formar una expresión válidad sin cambiar el nombre del sitio, contacta con un desarrollador, por favor.

Para guardar los cambios debes pertenecer al grupo de traductores
Los cambios no se salvan hasta que no pulses el boton de guardar de abajo.',
	'translate-magic-module' => 'Módulo:',
	'translate-magic-submit' => 'Buscar',
	'translate-magic-cm-export' => 'Exportar',
	'translate-magic-cm-to-be' => 'Será',
	'translate-magic-cm-current' => 'Actual',
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-save' => 'Guardar',
	'translate-magic-special' => 'Nombres de páginas especiales',
	'translationchanges-export' => 'exportar',
	'translate-checks-parameters' => '{{PLURAL:$2|El siguiente parámetro no se está|Los siguientes parámetros no se están}} usando:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|El siguiente parámetro es desconocidp|Los siguientes parámetros son desconocidos}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Hay algún signo de agrupación de {{PLURAL:$2|la siguiente clase|las siguientes clases}} sin emparejar:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|El siguiente enlace es problemático|Los siguientes $2 enlaces son problemáticos}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Por favor, sustituye {{PLURAL:$2|la siguiente etiqueta por la correcta|las siguientes etiquetas por las correctas}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'El mensaje original usa <nowiki>{{PLURAL:}}</nowiki> pero no así la traducción.',
	'tog-translate-nonewsletter' => 'No quiero recibir correos de noticias (sólo aplica a usuarios con dirección de correo electrónico confirmada)',
	'right-translate' => 'Editar usando el interfaz de traducción',
	'translate-rc-translation-filter' => 'Filtrar traducciones:',
	'translate-rc-translation-filter-no' => 'No filtrar nada',
	'translate-rc-translation-filter-only' => 'Mostrar sólo traducciones',
	'translate-rc-translation-filter-filter' => 'No mostrar traducciones',
	'translate-rc-translation-filter-site' => 'Sólo cambios en mensajes del sitio',
	'translationstats' => 'Estadísticas de traducción',
	'translate-stats-edits' => 'Ediciones',
	'translate-stats-users' => 'Traductores',
	'translate-statsf-width' => 'Anchura en píxeles',
	'translate-statsf-height' => 'Altura en píxeles',
	'translate-statsf-scale-days' => 'Días',
	'translate-statsf-scale-hours' => 'Horas',
	'translate-statsf-count-edits' => 'Número de ediciones',
	'translate-statsf-count-users' => 'Traductores activos',
	'translate-statsf-language' => 'Lista de códigos de idioma separados por comas',
	'translate-statsf-group' => 'Lista de códigos de grupo separados por comas',
	'translate-statsf-submit' => 'Vista previa',
	'translate-tag-translate-link-desc' => 'Traducir esta página',
	'translate-tag-legend-fallback' => 'Traducción en otro idioma',
	'translate-tag-legend-fuzzy' => 'Traducción desactualizada',
	'translate-sidebar-alltrans' => 'Otras traducciones',
	'translations' => 'Todas las traducciones',
	'translations-summary' => 'Introduce un nombre de mensaje para ver todas las traducciones disponibles.',
	'translate-translations-fieldset-title' => 'Todas las traducciones',
	'translate-translations-messagename' => 'Mensaje:',
	'languagestats' => 'Estadísticas por idioma',
	'languagestats-summary' => 'Esta página muestra estadísticas de traducción para todos los grupos de mensajes ([[MediaWiki:Translate-languagestats-groups|configurados]]) para un idioma.',
	'translate-language-code' => 'Código de idioma',
	'translate-language-code-field-name' => 'Código de idioma',
	'translate-suppress-complete' => 'Eliminar grupos de mensajes completamente traducidos',
	'translate-language' => 'Idioma',
	'translate-total' => 'Mensajes',
	'translate-untranslated' => 'Sin traducir',
	'translate-percentage-complete' => 'Completados',
	'translate-percentage-fuzzy' => 'Desactualizados',
);

/** Basque (Euskara)
 * @author Theklan
 */
$messages['eu'] = array(
	'translate' => 'Itzuli',
	'translate-edit' => 'aldatu',
	'translate-talk' => 'eztabaida',
	'translate-history' => 'historia',
	'translate-page-settings-legend' => 'Hobespenak',
	'translate-page-group' => 'Taldea',
	'translate-page-limit' => 'Muga',
	'translate-next' => 'Hurrengo orrialdea',
);

/** Extremaduran (Estremeñu)
 * @author Better
 */
$messages['ext'] = array(
	'translate' => 'Traucil',
	'translate-edit' => 'eital',
	'translate-talk' => 'caraba',
	'translate-history' => 'estorial',
	'translate-task-view' => 'Vel tolos mensahis endi',
	'translate-task-untranslated' => 'Vel tolos mensahis sin traucil endi',
	'translate-task-export' => 'Esporteal traucionis endi',
	'translate-task-export-to-file' => 'Esporteal traución a un archivu endi',
	'translate-next' => 'Siguienti páhina',
	'translate-prev' => 'Páhina anteriol',
	'translate-optional' => '(ocional)',
	'translate-ignored' => '(inorau)',
	'translate-magic-cm-export' => 'Esporteal',
	'translate-magic-cm-save' => 'Emburacal',
	'translate-magic-words' => 'Parabras máhicas',
);

/** Persian (فارسی)
 * @author Huji
 * @author Tofighi
 */
$messages['fa'] = array(
	'translate' => 'ترجمه',
	'translate-desc' => '[[Special:Translate|صفحهٔ ویژه‌ای]] برای ترجمهٔ مدیاویکی و فراتر از آن',
	'translate-edit' => 'ویرایش',
	'translate-talk' => 'بحث',
	'translate-history' => 'تاریخچه',
	'translate-task-view' => 'نمایش تمام پیغام‌ها',
	'translate-task-untranslated' => 'نمایش تمام پیغام‌های ترجمه نشده',
	'translate-task-optional' => 'نمایش پیغام‌های اختیاری',
	'translate-task-problematic' => 'مشاهدهٔ پیغام‌هایی که مشکل دارند',
	'translate-task-review' => 'بازبینی تغییرها',
	'translate-task-reviewall' => 'بازبینی تمام ترجمه‌ها',
	'translate-task-export' => 'صدور ترجمه‌ها',
	'translate-task-export-to-file' => 'صدور ترجمه‌ها به یک پرونده',
	'translate-task-export-as-po' => 'صدور ترجمه‌ها در قالب Gettext',
	'translate-page-no-such-language' => 'زبان مورد نظر غیر مجاز است.',
	'translate-page-no-such-task' => 'عمل مورد نظر غیر مجاز است.',
	'translate-page-no-such-group' => 'گروه مورد نظر غیر مجاز است.',
	'translate-page-settings-legend' => 'تنظیمات',
	'translate-page-task' => 'دستور',
	'translate-page-group' => 'گروه',
	'translate-page-language' => 'زبان',
	'translate-page-limit' => 'تعداد',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|پیغام|پیغام}} در هر صفحه',
	'translate-submit' => 'بیاور',
	'translate-page-navigation-legend' => 'گشتن',
	'translate-page-showing' => 'نمایش پیغام‌های $1 تا $2 از $3.',
	'translate-page-showing-all' => 'نمایش $1 {{PLURAL:$1|پیغام|پیغام}}.',
	'translate-page-showing-none' => 'پیغامی برای نمایش وجود ندارد.',
	'translate-next' => 'صفحهٔ بعدی',
	'translate-prev' => 'صفحهٔ قبلی',
	'translate-page-description-legend' => 'اطلاعات در مورد گروه',
	'translate-optional' => '(اختیاری)',
	'translate-ignored' => '(نادیده گرفته شده)',
	'translate-edit-definition' => 'تعریف پیغام',
	'translate-edit-contribute' => 'مشارکت',
	'translate-edit-no-information' => "''این پیغام دارای توضیحات نیست. اگر شما می‌دانید که این پیغام چگونه یا در کجا استفاده می‌شود، شما می‌توانید با اضافه کردن توضیحات به دیگر ترجمه‌کنندگان کمک کنید.''",
	'translate-edit-information' => 'اطلاعات در مورد این پیغام ($1)',
	'translate-edit-in-other-languages' => 'همین پیغام در دیگر زبان‌ها',
	'translate-edit-committed' => 'ترجمهٔ فعلی در نرم‌افزار',
	'translate-edit-warnings' => 'هشدار در مورد ترجمه‌های ناکامل',
	'translate-magic-pagename' => 'ترجمهٔ گسترش یافتهٔ مدیاویکی',
	'translate-magic-help' => 'شما می‌توانید نام مستعار صفحه‌های ویژه، واژه‌های جادویی، نام پوسته‌ها و نام فضاهای نام را ترجمه کنید.

در مورد واژه‌های جادویی ترجمهٔ شما باید شامل معادل انگلیسی هم باشد وگرنه واژهٔ جادویی کار نخواهد کرد. هم‌چنین، اولین بخش (0 یا 1) را تغییر ندهید.

نام‌های مستعار صفحه‌های ویژه و واژه‌های جادویی می‌توانند بیش از یک ترجمه داشته باشند. ترجمه‌ها با یک کامای انگلیسی (,) از هم جدا می‌شوند. نام پوسته‌ها و فضاهای نام تنها می‌تواند یک ترجمه داشته باشد.

در ترجمهٔ نام فضاهای نام <tt>$1 talk</tt> خاص است. <tt>$1</tt> توسط نام وبگاه جایگزین می‌شود (مانند <tt>{{SITENAME}} talk</tt>). اگر در زبان شما امکان ایجاد چنین عبارتی بدون تغییر دادن نام وبگاه وجود ندارد، لطفاً با یکی از توسعه‌دهندگان نرم‌افزار تماس بگیرید.

برای ذخیره کردن تغییرها باید عضو گروه ترجمه‌کنندگان باشید. تغییرات زمانی ذخیره می‌شوند که دکمهٔ ذخیره را در پایین صفحه فشار دهید.',
	'translate-magic-submit' => 'بیاور',
	'translate-magic-cm-export' => 'صدور',
	'translate-magic-cm-to-be' => 'آینده',
	'translate-magic-cm-current' => 'اخیر',
	'translate-magic-cm-original' => 'اصلی',
	'translate-magic-cm-comment' => 'توضیحات:',
	'translate-magic-cm-save' => 'ذخیره',
	'translate-magic-cm-updatedusing' => 'به روز شده توسط Special:Magic',
	'translate-magic-cm-savefailed' => 'شکست در ذخیره کردن اطلاعات',
	'translate-magic-special' => 'نام مستعار صفحه‌های ویژه',
	'translate-magic-words' => 'واژه‌های جادویی',
	'translate-magic-skin' => 'اسم پوسته‌ها',
	'translate-magic-namespace' => 'اسم فضاهای نام',
	'translationchanges' => 'تغییرهای ترجمه',
	'translationchanges-export' => 'صدور',
	'translationchanges-change' => '$1: $2 توسط $3',
	'translate-checks-parameters' => 'این {{PLURAL:$2|پارامتر استفاده نشده‌است|پارامترها استفاده نشده‌اند}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'تعداد {{PLURAL:$2|پرانتزها|پرانتزها}} زوج نیست:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|پیوندهایی که در ادامه می‌آیند مشکل‌ساز هستند|پیوندی که در ادامه می‌آید مشکل ساز است}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'لطفاً این {{PLURAL:$2|برچسب|برچسب‌ها}} را با موارد درست جایگزین کنید:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'تعریف از <nowiki>{{PLURAL:}}</nowiki> استفاده می‌کند اما ترجمه از آن استفاده نمی‌کند.',
);

/** Finnish (Suomi)
 * @author Crt
 * @author Nike
 * @author Silvonen
 */
$messages['fi'] = array(
	'translate' => 'Käännä',
	'translate-desc' => '[[Special:Translate|Toimintosivu]], jolla voi kääntää MediaWikiä ja muutakin',
	'translate-edit' => 'muokkaa',
	'translate-talk' => 'keskustelu',
	'translate-history' => 'historia',
	'translate-task-view' => 'nähdä kaikki viestit',
	'translate-task-untranslated' => 'nähdä kaikki kääntämättömät viestit',
	'translate-task-optional' => 'nähdä valinnaiset viestit',
	'translate-task-problematic' => 'nähdä viestit, joissa on ongelmia',
	'translate-task-review' => 'tarkistaa muutokset',
	'translate-task-reviewall' => 'tarkistaa kaikki käännökset',
	'translate-task-export' => 'viedä käännökset',
	'translate-task-export-to-file' => 'viedä käännökset tiedostoon',
	'translate-task-export-as-po' => 'viedä käännökset Gettext-muodossa',
	'translate-page-no-such-language' => 'Määritelty kieli ei ollut kelvollinen.',
	'translate-page-no-such-task' => 'Määritelty tehtävä ei ollut kelvollinen.',
	'translate-page-no-such-group' => 'Määritelty ryhmä ei ollut kelvollinen.',
	'translate-page-settings-legend' => 'Asetukset',
	'translate-page-task' => 'Haluan',
	'translate-page-group' => 'Ryhmä',
	'translate-page-language' => 'Kieli',
	'translate-page-limit' => 'Rajoitus',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|viesti|viestiä}} sivulla',
	'translate-submit' => 'Hae',
	'translate-page-navigation-legend' => 'Selaus',
	'translate-page-showing' => 'Alla on viestit $1–$2; yhteensä $3.',
	'translate-page-showing-all' => 'Näytetään $1 {{PLURAL:$1|viesti|viestiä}}.',
	'translate-page-showing-none' => 'Ei näytettäviä viestejä.',
	'translate-next' => 'Seuraava sivu',
	'translate-prev' => 'Edellinen sivu',
	'translate-page-description-legend' => 'Tietoja ryhmästä',
	'translate-page-edit' => 'muokkaa',
	'translate-optional' => '(valinnainen)',
	'translate-ignored' => '(ei-käännettävä)',
	'translate-edit-definition' => 'Viestin määritelmä',
	'translate-edit-contribute' => 'auta dokumentoinnissa',
	'translate-edit-no-information' => "''Tätä viestiä ei ole dokumentoitu. Jos tiedät missä tai miten tätä viestiä käytetään, voit auttaa muita kääntäjiä lisäämällä kommentteja tähän viestiin.''",
	'translate-edit-information' => 'Tietoja viestistä ($1)',
	'translate-edit-in-other-languages' => 'Viesti muilla kielillä',
	'translate-edit-committed' => 'Nykyinen ohjelmiston käyttämä käännös',
	'translate-edit-warnings' => 'Varoituksia virheellisestä käännöksestä',
	'translate-edit-goto-no-prev' => 'Ei edellistä viestiä',
	'translate-edit-goto-no-next' => 'Ei seuraavaa viestiä',
	'translate-edit-goto-prev' => 'Muokkaa edellistä viestiä',
	'translate-edit-goto-next' => 'Muokkaa seuraavaa viestiä',
	'translate-edit-goto-list' => 'Takaisin listaan',
	'translate-magic-pagename' => 'Laajennettu MediaWikin kääntäminen',
	'translate-magic-module' => 'Moduuli:',
	'translate-magic-submit' => 'Hae',
	'translate-magic-cm-export' => 'Vie',
	'translate-magic-cm-current' => 'Nykyinen',
	'translate-magic-cm-original' => 'Alkuperäinen',
	'translate-magic-cm-comment' => 'Yhteenveto',
	'translate-magic-cm-save' => 'Tallenna',
	'translate-magic-cm-savefailed' => 'Tallennus epäonnistui',
	'translate-magic-special' => 'Toimintosivujen nimet',
	'translate-magic-skin' => 'Ulkoasujen nimet',
	'translate-magic-namespace' => 'Nimiavaruuksien nimet',
	'translationchanges' => 'Käännösmuutokset',
	'translationchanges-export' => 'vie',
	'translationchanges-change' => '$1: Käyttäjä $3 muutti sivua $2',
	'translate-rc-translation-filter' => 'Käännösten suodatus',
	'translate-rc-translation-filter-no' => 'ei toimenpidettä',
	'translate-rc-translation-filter-only' => 'näytä vain käännökset',
	'translate-rc-translation-filter-filter' => 'piilota käännökset',
	'translate-rc-translation-filter-site' => 'vain muutokset sivuston viesteihin',
	'translationstats' => 'Käännöstilastot',
	'translate-stats-edits' => 'Muokkauksia',
	'translate-statsf-width' => 'Leveys pikseleinä',
	'translate-statsf-height' => 'Korkeus pikseleinä',
	'translate-statsf-submit' => 'Esikatselu',
	'translate-tag-translate-link-desc' => 'Käännä tämä sivu',
	'translate-tag-legend-fuzzy' => 'Vanhentunut käännös',
	'translate-sidebar-alltrans' => 'Muut käännökset',
	'translate-tag-noedit' => 'Tämä sivu on automaattisesti päivittyvä käännössivu.
Voit [$1 muokata lähdesivua] tai [$2 päivittää käännöksen].',
);

/** French (Français)
 * @author ChrisPtDe
 * @author Crochet.david
 * @author Dereckson
 * @author Grondin
 * @author IAlex
 * @author Louperivois
 * @author McDutchie
 * @author Seb35
 * @author Sherbrooke
 * @author Urhixidur
 * @author Verdy p
 */
$messages['fr'] = array(
	'translate' => 'Traduire',
	'translate-desc' => '[[Special:Translate|Page spéciale]] pour traduire Mediawiki et même plus encore.',
	'translate-edit' => 'éditer',
	'translate-talk' => 'discuter',
	'translate-history' => 'historique',
	'translate-task-view' => 'Voir tous les messages du',
	'translate-task-untranslated' => 'Voir tous les messages non traduits du',
	'translate-task-optional' => 'Voir les messages facultatifs du',
	'translate-task-untranslatedoptional' => 'Voir les messages facultatifs non traduits du',
	'translate-task-problematic' => 'Voir les messages ayant des problèmes',
	'translate-task-review' => 'Revoir mes changements au',
	'translate-task-reviewall' => 'Revoir toutes les traductions du',
	'translate-task-export' => 'Exporter les traductions du',
	'translate-task-export-to-file' => 'Exporter dans un fichier les traductions du',
	'translate-task-export-as-po' => 'Exporter au format Gettext les traductions du',
	'translate-task-export-to-xliff' => 'Exporter les traductions au format Xliff',
	'translate-page-no-such-language' => 'Un code langage invalide a été indiqué.',
	'translate-page-no-such-task' => 'La tâche spécifiée est invalide.',
	'translate-page-no-such-group' => 'Le groupe spécifié est invalide.',
	'translate-page-disabled' => "Les traductions dans cette langue ont été désactivées pour ce groupe. Motif :

''$1''",
	'translate-page-settings-legend' => 'Configuration',
	'translate-page-task' => 'Je veux',
	'translate-page-group' => 'Groupe',
	'translate-page-language' => 'Langue',
	'translate-page-limit' => 'Limite',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|message|messages}} par page',
	'translate-submit' => 'Atteindre',
	'translate-page-navigation-legend' => 'Navigation',
	'translate-page-showing' => 'Visualisation des messages de $1 à $2 sur $3.',
	'translate-page-showing-all' => 'Visualisation de $1 {{PLURAL:$1|message|messages}}',
	'translate-page-showing-none' => 'Aucun message à visualiser.',
	'translate-next' => 'Page suivante',
	'translate-prev' => 'Page précédente',
	'translate-page-description-legend' => 'Information à propos du groupe',
	'translate-page-edit' => 'modifier',
	'translate-optional' => '(facultatif)',
	'translate-ignored' => '(ignoré)',
	'translate-edit-definition' => 'Définition du message',
	'translate-edit-contribute' => 'contribuer',
	'translate-edit-no-information' => "Ce message n'est actuellement pas documenté. Si vous savez où ou comment ce message est utilisé, vous pouvez aider les autres traducteurs en documentant ce message.",
	'translate-edit-information' => 'Informations concernant ce message ($1)',
	'translate-edit-in-other-languages' => 'Message dans les autres langues',
	'translate-edit-committed' => 'Traduction courante',
	'translate-edit-warnings' => 'Avertissements concernant les traductions incomplètes',
	'translate-edit-goto-no-prev' => 'Aucun message précédent',
	'translate-edit-goto-no-next' => 'Aucun message suivant',
	'translate-edit-goto-prev' => 'Éditer le message précédent',
	'translate-edit-goto-next' => 'Éditer le message suivant',
	'translate-edit-goto-list' => 'Retour à la liste',
	'translate-magic-pagename' => 'Traduction de MediaWiki étendue',
	'translate-magic-help' => 'Vous pouvez traduire les alias de pages spéciales, les mots magiques, les noms d’habillages et les noms d’espaces de noms.

Les alias de pages spéciales et les mots magiques peuvent avoir plusieurs traductions.
Les traductions sont séparées par une virgule (,).
Les noms d’habillages et d’espaces de noms ne peuvent avoir qu’une seule traduction.

Dans les traductions d’espaces de noms, <tt>$1 talk</tt> est spécial. <tt>$1</tt> est remplacé par le nom du site (par exemple <tt>{{SITENAME}} talk</tt>).
S’il n’est pas possible d’obtenir une expression valide dans votre langue sans changer le nom du site, veuillez contacter un développeur.

Il est nécessaire d’appartenir au groupe des traducteurs pour sauvegarder les changements.
Ces derniers ne seront pas sauvegardés tant que vous n’aurez pas cliqué sur le bouton « Sauvegarder ».',
	'translate-magic-module' => 'Module :',
	'translate-magic-submit' => 'Aller',
	'translate-magic-cm-export' => 'Exporter',
	'translate-magic-cm-to-be' => 'Devient',
	'translate-magic-cm-current' => 'Actuel',
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-comment' => 'Commentaire :',
	'translate-magic-cm-save' => 'Sauvegarder',
	'translate-magic-cm-updatedusing' => 'Mise à jour en utilisant Special:Magic',
	'translate-magic-cm-savefailed' => 'Échec de la sauvegarde',
	'translate-magic-special' => 'Alias des pages spéciales',
	'translate-magic-words' => 'Mots magiques',
	'translate-magic-skin' => 'Nom des interfaces',
	'translate-magic-namespace' => 'Intitulé des espaces de nommage',
	'translationchanges' => 'Traductions modifiées',
	'translationchanges-export' => 'exporter',
	'translationchanges-change' => '$1: $2 par $3',
	'translate-checks-parameters' => '{{PLURAL:$2|La paramètre suivant n’est pas utilisé|Les paramètres suivants ne sont pas utilisés}} : <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|La paramètre suivant est inconnu|Les paramètres suivants sont inconnus}} : <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Il y a un nombre non pair de {{PLURAL:$2|parenthèses|parenthèses}} : <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Le lien suivant cause|Les liens suivants causent}} problèmes : <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Vous êtes invité à corriger {{PLURAL:$2|la balise suivante|les balises suivantes}} : <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'La définition utilise <nowiki>{{PLURAL:}}</nowiki> mais pas la traduction.',
	'translate-checks-pagename' => 'Nom d’espace modifié depuis la définition',
	'translate-checks-format' => 'Cette traduction ne suit pas la définition ou a une syntaxe invalide : $1',
	'tog-translate-nonewsletter' => 'Ne m’envoyez pas la lettre d’information par courrier (ne concerne que les utilisateurs qui disposent d’une adresse courriel confirmée)',
	'right-translate' => "Modifier en utilisant l'interface de traduction",
	'translate-rc-translation-filter' => 'Filtrer les traductions :',
	'translate-rc-translation-filter-no' => 'Ne rien faire',
	'translate-rc-translation-filter-only' => 'Afficher uniquement les traductions',
	'translate-rc-translation-filter-filter' => 'Éliminer les traductions',
	'translate-rc-translation-filter-site' => 'Seulement les changements de messages du site',
	'translationstats' => 'Statistiques de traduction',
	'translate-stats-edits' => 'Éditions par jour',
	'translate-stats-users' => 'Traducteurs',
	'translate-statsf-intro' => 'Vous pouvez créer des statistiques simples avec ce formulaire. Toutes les valeurs ont des limites maximales et minimales.',
	'translate-statsf-options' => 'Options du graphique',
	'translate-statsf-width' => 'Largeur en pixels',
	'translate-statsf-height' => 'Hauteur en pixels',
	'translate-statsf-days' => 'Période de temps en jours',
	'translate-statsf-scale' => 'Granularité',
	'translate-statsf-scale-days' => 'Jours',
	'translate-statsf-scale-hours' => 'Heures',
	'translate-statsf-count' => 'Mesure',
	'translate-statsf-count-edits' => "Nombre d'éditions",
	'translate-statsf-count-users' => 'Traducteurs actifs',
	'translate-statsf-language' => 'Liste de codes de langues, séparés de virgules',
	'translate-statsf-group' => 'Liste de codes de groupes, séparés de virgules',
	'translate-statsf-submit' => 'Prévisualiser',
	'translate-tag-category' => 'Pages traduisibles',
	'translate-tag-page-desc' => 'Traduction de la page wiki [[:$1]].',
	'translate-tag-translate-link-desc' => 'Traduire cette page',
	'translate-tag-legend' => 'Légende :',
	'translate-tag-legend-fallback' => 'Traduction dans d’autres langues',
	'translate-tag-legend-fuzzy' => 'Traduction hors date',
	'translate-tag-fuzzy-comment' => 'Définition modifiée par l’utilisateur [[User:$1|$1]] dans la version $2.',
	'translate-tag-fuzzy-reason' => 'Définition modifiée par l’utilisateur $1 avec pour commentaire « $3 » dans $2.',
	'translate-sidebar-alltrans' => 'Autres traductions',
	'translate-tag-noedit' => 'Cette page est un document de traduction automatiquement mise à jour.
Vous pouvez [$1 modifier la page source] ou [$2 mettre à jour la traduction].',
	'translations' => 'Toutes les traductions',
	'translations-summary' => 'Entrer un nom de message en dessous pour montrer toutes les traductions disponibles.',
	'translate-translations-no-message' => "« $1 » n'est pas un message traduisible",
	'translate-translations-none' => "Il n'y a aucune traduction pour « $1 »",
	'translate-translations-fieldset-title' => 'Toutes les traductions',
	'translate-translations-messagename' => 'Message :',
	'translate-translations-including-no-param' => 'Spécifiez une nom de page valide dans le paramètre de sous-page',
	'languagestats' => 'Statistiques de langue',
	'languagestats-summary' => 'Cette page affiche les statistiques de traduction pour tous les groupes de messages ([[MediaWiki:Translate-languagestats-groups|configurés]]) pour une langue.',
	'translate-language-code' => 'Code de langue',
	'translate-language-code-field-name' => 'Code de langue :',
	'translate-suppress-complete' => 'Ne pas afficher les groupes de messages traduits en totalité',
	'translate-language' => 'Langue',
	'translate-total' => 'Messages',
	'translate-untranslated' => 'Non traduits',
	'translate-percentage-complete' => 'Achèvement',
	'translate-percentage-fuzzy' => 'Dépassés',
	'translate-languagestats-groups' => ' # Ajoutez des ID de groupes de messages, un par ligne pour limiter les groupes
 # qui sont affichés sur Special:LanguageStats. Les groupes inexistants seront
 # ignorés.',
);

/** Cajun French (Français cadien)
 * @author RoyAlcatraz
 */
$messages['frc'] = array(
	'translate' => 'Traduire',
	'translate-edit' => 'changer',
	'translate-talk' => 'discussion',
	'translate-history' => 'changements',
	'translate-task-view' => 'voir tous les messages',
	'translate-task-untranslated' => 'voir tous les messages pas traduits',
	'translate-task-review' => 'regarder les changements',
	'translate-task-reviewall' => 'regarder toutes les traductions',
	'translate-task-export' => 'exporter les traductions',
	'translate-task-export-to-file' => 'exporter les traductions au dossier',
	'translate-submit' => 'Charcher',
	'translate-next' => 'Page suivante',
	'translate-prev' => 'Page avant',
	'translate-optional' => '(de choix)',
	'translate-ignored' => '(ignoré)',
	'translationchanges' => 'Modification des traductions',
	'translate-language' => 'Langue:',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'translate' => 'Traduire',
	'translate-desc' => '[[Special:Translate|Pâge spèciâla]] por traduire MediaWiki et mémo ples oncor.',
	'translate-edit' => 'èditar',
	'translate-talk' => 'discutar',
	'translate-history' => 'historico',
	'translate-task-view' => 'Vêre tôs los mèssâjos dês',
	'translate-task-untranslated' => 'Vêre tôs los mèssâjos pas traduits dês',
	'translate-task-optional' => 'Vêre tôs los mèssâjos u chouèx dês',
	'translate-task-review' => 'Revêre mos changements dês',
	'translate-task-reviewall' => 'Revêre totes les traduccions dens',
	'translate-task-export' => 'Èxportar les traduccions dês',
	'translate-task-export-to-file' => 'Èxportar les traduccions dens un fichiér dês',
	'translate-task-export-as-po' => 'Èxportar les traduccions u format gettext',
	'translate-page-no-such-language' => 'Un code lengâjo envalido at étâ endicâ.',
	'translate-page-no-such-task' => 'L’ovrâjo spècefiâ est envalido.',
	'translate-page-no-such-group' => 'Lo groupe spècefiâ est envalido.',
	'translate-page-settings-legend' => 'Configuracion',
	'translate-page-task' => 'Vuel',
	'translate-page-group' => 'Groupe',
	'translate-page-language' => 'Lengoua',
	'translate-page-limit' => 'Limita',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|mèssâjo|mèssâjos}} per pâge',
	'translate-submit' => 'Avengiér',
	'translate-page-navigation-legend' => 'Navigacion',
	'translate-page-showing' => 'Visualisacion des mèssâjos de $1 a $2 sur $3.',
	'translate-page-showing-all' => 'Visualisacion de $1 {{PLURAL:$1|mèssâjo|mèssâjos}}.',
	'translate-page-showing-none' => 'Nion mèssâjo a visualisar.',
	'translate-next' => 'Pâge siuventa',
	'translate-prev' => 'Pâge prècèdenta',
	'translate-page-description-legend' => 'Enformacion a propôs du groupe',
	'translate-optional' => '(u chouèx)',
	'translate-ignored' => '(ignorâ)',
	'translate-edit-definition' => 'Dèfinicion du mèssâjo',
	'translate-edit-contribute' => 'contribuar',
	'translate-edit-no-information' => "''Orendrêt, ceti mèssâjo est pas documentâ. Se vos sâde yô ou coment ceti mèssâjo est utilisâ, vos pouede édiér los ôtros traductors en documentent ceti mèssâjo.''",
	'translate-edit-information' => 'Enformacions regardent ceti mèssâjo ($1)',
	'translate-edit-in-other-languages' => 'Mèssâjo dens les ôtres lengoues',
	'translate-edit-committed' => 'Traduccion d’ora ja dens la programeria',
	'translate-edit-warnings' => 'Avèrtissements regardent les traduccions pas complètes',
	'translate-magic-pagename' => 'Traduccion de MediaWiki ètendua',
	'translate-magic-help' => 'Vos pouede traduire los noms de les pâges spèciâles, los mots magicos, los noms de les entèrfaces et los titros des èspâços de nom.

Dens los mots magicos, vos dête encllure la traduccion en anglès ou cen fonccionerat pas més. Et pués, lèssiéd lo premiér èlèment (0 ou ben 1) coment il est.

Los noms de les pâges spèciâles et los mots magicos pôvont avêr plusiors traduccions. Les traduccions sont sèparâs per una virgula (,). Los noms de les entèrfaces et los titros des èspâços de nom pôvont avêr ren que yona traduccion.

Dens les traduccions des èspâços de nom, <tt>$1 talk</tt> est spèciâl. <tt>$1</tt> est remplaciê per lo nom du seto (per ègzemplo <tt>{{SITENAME}} talk</tt>). S’o est pas possiblo d’obtegnir una èxprèssion valida dens voutra lengoua sen changiér lo nom du seto, volyéd vos veriér vers un dèvelopior.

Vos dête apartegnir a la tropa des traductors por sôvar los changements. Los changements seront pas sôvâs devant que vos clicâd sur lo boton « Sôvar » d’avâl.',
	'translate-magic-submit' => 'Alar',
	'translate-magic-cm-export' => 'Èxportar',
	'translate-magic-cm-to-be' => 'Vint',
	'translate-magic-cm-current' => 'Ora',
	'translate-magic-cm-original' => 'Originâl',
	'translate-magic-cm-comment' => 'Comentèro :',
	'translate-magic-cm-save' => 'Sôvar',
	'translate-magic-cm-updatedusing' => 'Betâ a jorn en utilisent [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Falyita de la sôvegouârda',
	'translate-magic-special' => 'Noms de les pâges spèciâles',
	'translate-magic-words' => 'Mots magicos',
	'translate-magic-skin' => 'Noms de les entèrfaces',
	'translate-magic-namespace' => 'Titros des èspâços de nom',
	'translationchanges' => 'Traduccions modifiâs',
	'translationchanges-export' => 'èxportar',
	'translationchanges-change' => '$1 : $2 per $3',
	'translate-checks-parameters' => 'Los paramètres siuvents sont pas utilisâs : <strong>$1</strong>',
	'translate-checks-balance' => 'Y at un nombro fôx de parentèses : <strong>$1</strong>',
	'translate-checks-links' => 'Los lims siuvents sont pas de sûr : <strong>$1</strong>',
	'translate-checks-xhtml' => 'Vos éte envitâ a remetre en place les balises siuventes avouéc celes que sont corrèctes : <strong>$1</strong>',
	'translate-checks-plural' => 'La dèfinicion utilise <nowiki>{{PLURAL:}}</nowiki> mas pas la traduccion.',
);

/** Western Frisian (Frysk)
 * @author Snakesteuben
 */
$messages['fy'] = array(
	'translate-edit' => 'bewurkje',
	'translate-page-group' => 'Groep',
	'translate-next' => 'Folgjende side',
	'translate-page-edit' => 'bewurkje',
	'translate-magic-cm-export' => 'Eksportearje',
	'translate-magic-cm-comment' => 'Oanmerking:',
	'translate-magic-cm-save' => 'Fêstlizze',
	'translationchanges-export' => 'eksportearje',
);

/** Irish (Gaeilge)
 * @author Alison
 * @author Moilleadóir
 */
$messages['ga'] = array(
	'translate-talk' => 'plé',
	'translate-history' => 'stair',
	'translate-page-settings-legend' => 'Sainroghanna',
	'translate-page-group' => 'Ghrúpa',
	'translate-page-language' => 'Teanga',
	'translate-submit' => 'Faigh',
	'translate-page-navigation-legend' => 'Nascleanúint',
	'translate-edit-in-other-languages' => 'Teachtaireachtaí i dteangacha eile',
	'translate-magic-skin' => 'Ainmneacha craicinn',
	'translationchanges-export' => 'Easpórtaigh',
	'translate-statsf-scale-days' => 'Lae',
	'translate-statsf-scale-hours' => 'Uaire',
	'translate-language' => 'Teanga',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 * @author Xosé
 */
$messages['gl'] = array(
	'translate' => 'Traducir',
	'translate-desc' => '[[Special:Translate|Páxina especial]] para traducir MediaWiki e outras extensións',
	'translate-edit' => 'editar',
	'translate-talk' => 'conversa',
	'translate-history' => 'historial',
	'translate-task-view' => 'Ver todas as mensaxes de',
	'translate-task-untranslated' => 'Ver todas as mensaxes sen traducir de',
	'translate-task-optional' => 'Ver as mensaxes opcionais de',
	'translate-task-untranslatedoptional' => 'Ver as mensaxes opcionais non traducidas de',
	'translate-task-problematic' => 'Ver as mensaxes que teñen problemas en',
	'translate-task-review' => 'Revisar os cambios en',
	'translate-task-reviewall' => 'Revisar todas as traducións en',
	'translate-task-export' => 'Exportar as traducións de',
	'translate-task-export-to-file' => 'Exportar a un ficheiro a tradución de',
	'translate-task-export-as-po' => 'Exportar a tradución en formato Gettext',
	'translate-task-export-to-xliff' => 'Exportar a tradución en formato Xliff',
	'translate-page-no-such-language' => 'O código de lingua especificado non é válido.',
	'translate-page-no-such-task' => 'A tarefa especificada non é válida.',
	'translate-page-no-such-group' => 'O grupo especificado non é válido.',
	'translate-page-disabled' => "As traducións desta lingua neste grupo foron deshabilitadas. Razón:

''$1''",
	'translate-page-settings-legend' => 'Configuracións',
	'translate-page-task' => 'Quero',
	'translate-page-group' => 'Grupo',
	'translate-page-language' => 'Lingua',
	'translate-page-limit' => 'Límite',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|mensaxe|mensaxes}} por páxina',
	'translate-submit' => 'Amosar',
	'translate-page-navigation-legend' => 'Navegación',
	'translate-page-showing' => 'Amosando as mensaxes da $1 á $2, dun total de $3.',
	'translate-page-showing-all' => 'Amosando {{PLURAL:$1|unha mensaxe|$1 mensaxes}}.',
	'translate-page-showing-none' => 'Non hai ningunha mensaxe que amosar.',
	'translate-next' => 'Páxina seguinte',
	'translate-prev' => 'Páxina anterior',
	'translate-page-description-legend' => 'Información acerca do grupo',
	'translate-page-edit' => 'editar',
	'translate-optional' => '(opcional)',
	'translate-ignored' => '(ignorado)',
	'translate-edit-definition' => 'Definición da mensaxe',
	'translate-edit-contribute' => 'contribuír',
	'translate-edit-no-information' => "''Esta mensaxe non ten documentación.''
''Se sabe onde ou como se usa esta mensaxe, pode axudar a outros tradutores engadíndolle datos.''",
	'translate-edit-information' => 'Información acerca desta mensaxe ($1)',
	'translate-edit-in-other-languages' => 'Mensaxe noutras linguas',
	'translate-edit-committed' => 'Tradución actual no software',
	'translate-edit-warnings' => 'Avisos acerca de traducións incompletas',
	'translate-edit-goto-no-prev' => 'Non hai mensaxe previa',
	'translate-edit-goto-no-next' => 'Non hai mensaxe seguinte',
	'translate-edit-goto-prev' => 'Editar a mensaxe previa',
	'translate-edit-goto-next' => 'Editar a mensaxe seguinte',
	'translate-edit-goto-list' => 'Voltar á lista',
	'translate-magic-pagename' => 'Tradución estendida de MediaWiki',
	'translate-magic-help' => 'Pode traducir os alias das páxinas especiais, as palabras máxicas, os nomes das aparencias e mais os nomes dos espazos de nomes.

Os alias das páxinas especiais e as palabras máxicas poden ter numerosas traducións.
As traducións sepáranse mediante unha coma (,).
Os nomes das aparencias e dos espazos de nomes só poden ter unha tradución.

Nas traducións dos espazos de nomes, <tt>$1 talk</tt> é especial. <tt>$1</tt> substitúese polo nome do sitio (por exemplo, <tt>{{SITENAME}} talk</tt>).
Se na súa lingua non resulta posíbel formar unha expresión válida sen mudar o nome do sitio, contacte cun programador.

Ten que estar no grupo de tradutores para gardar os cambios.
Os cambios non se gardan ata que prema no botón "Gardar" de embaixo.',
	'translate-magic-module' => 'Módulo:',
	'translate-magic-submit' => 'Amosar',
	'translate-magic-cm-export' => 'Exportar',
	'translate-magic-cm-to-be' => 'Será',
	'translate-magic-cm-current' => 'Actual',
	'translate-magic-cm-original' => 'Orixinal',
	'translate-magic-cm-comment' => 'Comentario:',
	'translate-magic-cm-save' => 'Gardar',
	'translate-magic-cm-updatedusing' => 'Actualizado mediante [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Fallou o gardado',
	'translate-magic-special' => 'Alias de páxinas especiais',
	'translate-magic-words' => 'Palabras máxicas',
	'translate-magic-skin' => 'Nome das aparencias',
	'translate-magic-namespace' => 'Nomes dos espazos de nomes',
	'translationchanges' => 'Modificacións nas traducións',
	'translationchanges-export' => 'exportar',
	'translationchanges-change' => '$1: $2 por $3',
	'translate-checks-parameters' => '{{PLURAL:$2|O seguinte parámetro non é usado|Os seguintes parámetros non son usados}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|O seguinte parámetro é descoñecido|Os seguintes parámetros son descoñecidos}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Hai unha cantidade irregular de {{PLURAL:$2|parénteses|parénteses}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|A seguinte ligazón é problemática|As seguintes ligazóns son problemáticas}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Por favor, substitúa {{PLURAL:$2|a seguinte etiqueta pola correcta|as seguintes etiquetas polas correctas}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'A definición usa <nowiki>{{PLURAL:}}</nowiki>, pero a tradución non.',
	'translate-checks-pagename' => 'O espazo de nomes cambiou desde a definición',
	'translate-checks-format' => 'Esta tradución non segue a definición ou ten unha sintaxe inválida: $1',
	'tog-translate-nonewsletter' => 'Non me enviedes follas informativas ao meu correo electrónico (só relevante para os usuarios cun enderezo de correo electrónico confirmado)',
	'right-translate' => 'Editar usando a interface de tradución',
	'translate-rc-translation-filter' => 'Filtrar as traducións:',
	'translate-rc-translation-filter-no' => 'Non facer nada',
	'translate-rc-translation-filter-only' => 'Amosar só as traducións',
	'translate-rc-translation-filter-filter' => 'Amosar o que non sexan traducións',
	'translate-rc-translation-filter-site' => 'Amosar só os cambios nas mensaxes do sitio',
	'translationstats' => 'Estatísticas das traducións',
	'translate-stats-edits' => 'Edicións ao día',
	'translate-stats-users' => 'Tradutores',
	'translate-statsf-intro' => 'Pode xerar estatísticas de forma sinxela con este formulario. Todos os valores teñen límites máximos e mínimos.',
	'translate-statsf-options' => 'Opcións da gráfica',
	'translate-statsf-width' => 'Ancho en píxeles',
	'translate-statsf-height' => 'Altura en píxeles',
	'translate-statsf-days' => 'Período de tempo en días',
	'translate-statsf-scale' => 'Escala',
	'translate-statsf-scale-days' => 'Días',
	'translate-statsf-scale-hours' => 'Horas',
	'translate-statsf-count' => 'Medida',
	'translate-statsf-count-edits' => 'Número de edicións',
	'translate-statsf-count-users' => 'Tradutores activos',
	'translate-statsf-language' => 'Lista dos códigos de lingua (separados por comas)',
	'translate-statsf-group' => 'Lista dos códigos dos grupos de mensaxes (separados por comas)',
	'translate-statsf-submit' => 'Vista previa',
	'translate-tag-category' => 'Páxinas que se poden traducir',
	'translate-tag-page-desc' => 'Tradución da páxina wiki [[:$1]].',
	'translate-tag-translate-link-desc' => 'Traducir esta páxina',
	'translate-tag-legend' => 'Lenda:',
	'translate-tag-legend-fallback' => 'Tradución noutra lingua',
	'translate-tag-legend-fuzzy' => 'Tradución obsoleta',
	'translate-tag-fuzzy-comment' => 'A definición foi cambiada por [[User:$1|$1]] na revisión $2.',
	'translate-tag-fuzzy-reason' => 'A definición foi cambiada por "$1" co comentario "$3" en $2.',
	'translate-sidebar-alltrans' => 'Outras traducións',
	'translate-tag-noedit' => 'Esta páxina é unha páxina de tradución actualizada automaticamente.
Pode [$1 editar a páxina coa fonte] ou [$2 actualizar a tradución].',
	'translations' => 'Todas as traducións',
	'translations-summary' => 'Insira embaixo o nome dunha mensaxe para ver todas as traducións dispoñibles.',
	'translate-translations-no-message' => '"$1" non é unha mensaxe que se poida traducir',
	'translate-translations-none' => 'Non hai traducións da mensaxe "$1"',
	'translate-translations-fieldset-title' => 'Todas as traducións',
	'translate-translations-messagename' => 'Mensaxe:',
	'translate-translations-including-no-param' => 'Por favor, especifique un nome de páxina válido no parámetro da subpáxina',
	'languagestats' => 'Estatísticas da lingua',
	'languagestats-summary' => 'Esta páxina amosa as estatísticas da tradución dos grupos de mensaxes ([[MediaWiki:Translate-languagestats-groups|configurados]]) dunha lingua.',
	'translate-language-code' => 'Código da lingua',
	'translate-language-code-field-name' => 'Código da lingua:',
	'translate-suppress-complete' => 'Omitir os grupos de mensaxes completamente traducidos',
	'translate-language' => 'Lingua',
	'translate-total' => 'Mensaxes',
	'translate-untranslated' => 'Sen traducir',
	'translate-percentage-complete' => 'Completadas',
	'translate-percentage-fuzzy' => 'Anticuadas',
);

/** Gothic
 * @author Jocke Pirat
 */
$messages['got'] = array(
	'translate-edit' => 'máidjan',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 * @author LeighvsOptimvsMaximvs
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'translate' => 'Μεταγλωττίζειν',
	'translate-edit' => 'μεταγράφειν',
	'translate-talk' => 'διαλέγεσθαι',
	'translate-history' => 'αἱ προτέραι',
	'translate-page-language' => 'Γλῶττα',
	'translate-page-navigation-legend' => 'Πλοήγησις',
	'translate-page-edit' => 'μεταγράφειν',
	'translate-optional' => '(προαιρετικόν)',
	'translate-magic-cm-export' => 'ἐξάγειν',
	'translate-magic-cm-current' => 'Τρέχουσα',
	'translate-magic-cm-comment' => 'Σχόλιον:',
	'translationchanges-export' => 'ἐξάγειν',
	'translate-statsf-scale-days' => 'Ἡμέραι',
	'translate-statsf-scale-hours' => 'Ὥραι',
	'translate-statsf-submit' => 'Προθεωρεῖν',
);

/** Swiss German (Alemannisch)
 * @author J. 'mach' wust
 */
$messages['gsw'] = array(
	'translate-prev' => 'vorderi Syte',
	'translate-statsf-submit' => 'Vorschou',
);

/** Manx (Gaelg)
 * @author MacTire02
 */
$messages['gv'] = array(
	'translate' => 'Dy hyndaa',
	'translate-edit' => 'reaghey',
	'translate-history' => 'shennaghys',
	'translate-page-group' => 'Possan',
	'translate-page-language' => 'Çhengey',
	'translate-page-limit' => 'Jeoraght',
	'translate-edit-in-other-languages' => 'Çhaghteraght ayns çhengaghyn elley',
);

/** Hakka (Hak-kâ-fa)
 * @author Hakka
 */
$messages['hak'] = array(
	'translate-edit' => 'phiên-chho',
	'translate-page-edit' => 'piên-sip',
);

/** Hawaiian (Hawai`i)
 * @author Kalani
 * @author Singularity
 */
$messages['haw'] = array(
	'translate' => 'Unuhi',
	'translate-edit' => 'e ho‘opololei',
	'translate-history' => 'mo‘olelo',
	'translate-page-language' => 'ʻŌlelo',
	'translate-language' => 'ʻŌlelo',
);

/** Hebrew (עברית)
 * @author Agbad
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'translate' => 'תרגום',
	'translate-desc' => '[[Special:Translate|דף מיוחד]] לתרגום מדיה־ויקי ומעבר לכך',
	'translate-edit' => 'עריכה',
	'translate-talk' => 'שיחה',
	'translate-history' => 'היסטוריה',
	'translate-task-view' => 'הצגת כל ההודעות מתוך',
	'translate-task-untranslated' => 'הצגת כל ההודעות שאינן מתורגמות מתוך',
	'translate-task-optional' => 'הצגת הודעות אופציונאליות מתוך',
	'translate-task-untranslatedoptional' => 'הצגת הודעות אופציונאליות שאינן מתורגמות מ־',
	'translate-task-problematic' => 'הצגת הודעות עם בעיות',
	'translate-task-review' => 'הצגת שינויים בתוך',
	'translate-task-reviewall' => 'הצגת שינויים בכל ההודעות שתורגמו בתוך',
	'translate-task-export' => 'ייצוא תרגומים מתוך',
	'translate-task-export-to-file' => 'ייצוא תרגומים לקובץ מתוך',
	'translate-task-export-as-po' => 'ייצוא תרגומים בפורמט Gettext',
	'translate-task-export-to-xliff' => 'ייצוא תרגומים בפורמט Xliff',
	'translate-page-no-such-language' => 'השפה שצוינה שגויה.',
	'translate-page-no-such-task' => 'המשימה שצוינה שגויה.',
	'translate-page-no-such-group' => 'הקבוצה שצוינה שגויה.',
	'translate-page-disabled' => "התרגומים לשפה זו בקבוצה זו בוטלו מהסיבה הבאה:

'''$1'''",
	'translate-page-settings-legend' => 'הגדרות',
	'translate-page-task' => 'תצוגה',
	'translate-page-group' => 'קבוצה',
	'translate-page-language' => 'שפה',
	'translate-page-limit' => 'הגבלה',
	'translate-page-limit-option' => 'עד {{PLURAL:$1|הודעה אחת|$1 הודעות}} בדף',
	'translate-submit' => 'הצגה',
	'translate-page-navigation-legend' => 'ניווט',
	'translate-page-showing' => 'הצגת הודעות מ־$1 עד $2 מתוך $3.',
	'translate-page-showing-all' => 'הצגת {{PLURAL:$1|הודעה אחת|$1 הודעות}}.',
	'translate-page-showing-none' => 'אין הודעות להצגה.',
	'translate-next' => 'לדף הבא',
	'translate-prev' => 'לדף הקודם',
	'translate-page-description-legend' => 'מידע על הקבוצה',
	'translate-page-edit' => 'עריכה',
	'translate-optional' => '(אופציונאלי)',
	'translate-ignored' => '(לא לתרגום)',
	'translate-edit-definition' => 'הגדרת ההודעה',
	'translate-edit-contribute' => 'תרומה',
	'translate-edit-no-information' => "'''להודעה זו אין תיעוד.
אם אתם יודעים היכן או כיצד משתמשים בהודעה זו, באפשרותכם לעזור למתרגמים אחרים באמצעות הוספת תיעוד להודעה זו.'''",
	'translate-edit-information' => 'מידע על ההודעה ($1)',
	'translate-edit-in-other-languages' => 'ההודעה בשפות אחרות',
	'translate-edit-committed' => 'התרגום הנוכחי בתוכנה',
	'translate-edit-warnings' => 'אזהרות על תרגומים חלקיים',
	'translate-edit-goto-no-prev' => 'אין הודעה קודמת',
	'translate-edit-goto-no-next' => 'אין הודעה לאחר זו',
	'translate-edit-goto-prev' => 'עריכת ההודעה הקודמת',
	'translate-edit-goto-next' => 'עריכת ההודעה הבאה',
	'translate-edit-goto-list' => 'חזרה לרשימה',
	'translate-magic-pagename' => 'תרגום מורחב של מדיה־ויקי',
	'translate-magic-help' => 'באפשרותכם לתרגם שמות דפים מיוחדים, מילות קסם, שמות רקעים ושמות מרחבי שם.

לשמות דפים מיוחדים ולמילות קסם יכולים להיות כמה תרגומים.
יש להפריד את התרגומים באמצעות פסיק (,).
לשמות רקעים ומרחבי שם יכול להיות תרגום אחד בלבד.

תרגום מרחבי השם, <tt>שיחת $1</tt> הוא מקרה מיוחד: <tt>$1</tt> יוחלף בשם האתר (לדוגמה, <tt>שיחת {{SITENAME}}</tt>).
אם אין זה אפשרי בשפתכם לתרגם את מרחב השם הזה מבלי לשנות את שם האתר, אנא צרו קשר עם מפתח.

עליכם להיות בקבוצת המתרגמים כדי לשמור שינויים.
השינויים לא יישמרו עד שתלחצו על כפתור השמירה שלמטה.',
	'translate-magic-module' => 'מידע לתרגום:',
	'translate-magic-submit' => 'הצגה',
	'translate-magic-cm-export' => 'ייצוא',
	'translate-magic-cm-to-be' => 'עתידיים',
	'translate-magic-cm-current' => 'נוכחיים',
	'translate-magic-cm-original' => 'מקוריים',
	'translate-magic-cm-comment' => 'סיבה:',
	'translate-magic-cm-save' => 'שמירה',
	'translate-magic-cm-updatedusing' => 'עודכן באמצעות [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'השמירה נכשלה',
	'translate-magic-special' => 'שמות דפים מיוחדים',
	'translate-magic-words' => 'מילות קסם',
	'translate-magic-skin' => 'שמות רקעים',
	'translate-magic-namespace' => 'שמות מרחבי שם',
	'translationchanges' => 'שינויים בתרגום',
	'translationchanges-export' => 'ייצוא',
	'translationchanges-change' => '$1: $2 על ידי $3',
	'translate-checks-parameters' => 'ה{{PLURAL:$2|פרמטר הבא אינו|פרמטרים הבאים אינם}} בשימוש:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => 'ה{{PLURAL:$2|פרמטר הבא אינו|פרמטרים הבאים אינם}} ידועים:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'מספר ה{{PLURAL:$2|סוגריים|סוגריים}} אינו מאוזן:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|הקישור הבא הינו|$2 הקישורים הבאים הינם}} בעייתיים:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'נא החליפו את ה{{PLURAL:$2|תגית הבאה בתגית הנכונה|תגיות הבאות בתגיות הנכונות}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'ההגדרה משתמשת ב־<nowiki>{{PLURAL:}}</nowiki>, אך התרגום אינו משתמש בו.',
	'translate-checks-pagename' => 'מרחבי שם ששונו מהגדרתם',
	'translate-checks-format' => 'תרגום זה אינו תואם להגדרות או שהוא בעל תחביר שגוי: $1',
	'tog-translate-nonewsletter' => 'אל תשלחו אלי הודעות בדואר האלקטרוני (רלוונטי רק למשתמשים עם כתובת דואר אלקטרוני מאושרת)',
	'right-translate' => 'עריכה באמצעות ממשק התרגום',
	'translate-rc-translation-filter' => 'סינון תרגומים:',
	'translate-rc-translation-filter-no' => 'ללא סינון',
	'translate-rc-translation-filter-only' => 'הצגת תרגומים בלבד',
	'translate-rc-translation-filter-filter' => 'אי־הצגת תרגומים',
	'translate-rc-translation-filter-site' => 'שינויים בהודעות האתר בלבד',
	'translationstats' => 'סטטיסטיקות תרגום',
	'translate-stats-edits' => 'תוכירע',
	'translate-stats-users' => 'םימגרתמ',
	'translate-statsf-intro' => 'באמצעות טופס זה תוכלו ליצור סטטיסטיקות פשוטות. לכל הערכים יש ערך מקסימלי וערך מינימלי.',
	'translate-statsf-options' => 'אפשרויות גרף',
	'translate-statsf-width' => 'רוחב בפיקסלים',
	'translate-statsf-height' => 'אורך בפיקסלים',
	'translate-statsf-days' => 'זמן (בימים)',
	'translate-statsf-scale' => 'יחידת זמן',
	'translate-statsf-scale-days' => 'ימים',
	'translate-statsf-scale-hours' => 'שעות',
	'translate-statsf-count' => 'לפי',
	'translate-statsf-count-edits' => 'מספר עריכות',
	'translate-statsf-count-users' => 'מתרגמים פעילים',
	'translate-statsf-language' => 'רשימת קודי שפה (מופרדים בפסיק)',
	'translate-statsf-group' => 'רשימת קודי קבוצות (מופרדים בפסיק)',
	'translate-statsf-submit' => 'תצוגה מקדימה',
	'translate-tag-category' => 'דפים הניתנים לתירגום',
	'translate-tag-page-desc' => 'תרגום של דף הוויקי [[:$1]].',
	'translate-tag-translate-link-desc' => 'תרגום דף זה',
	'translate-tag-legend' => 'מקרא:',
	'translate-tag-legend-fallback' => 'התרגום בשפה אחרת',
	'translate-tag-legend-fuzzy' => 'תרגום לא עדכני',
	'translate-tag-fuzzy-comment' => 'ההגדרה שונתה בידי [[User:$1|$1]] בגרסה $2.',
	'translate-tag-fuzzy-reason' => 'ההגדרה שונתה על ידי "$1" עם תקציר העריכה "$3" ב־$2.',
	'translate-sidebar-alltrans' => 'תרגומים אחרים',
	'translate-tag-noedit' => 'דף זה הינו דף תרגום המתעדכן אוטומטית.
ניתן [$1 לערוך את דף המקור] או [$2 לעדכן את התרגום].',
	'translations' => 'כל התרגומים',
	'translations-summary' => 'הקלידו את שם ההודעה להלן כדי להציג את כל התרגומים הזמינים.',
	'translate-translations-no-message' => '"$1" אינה הודעה הניתנת לתרגום',
	'translate-translations-none' => 'לא קיימים תרגומים עבור "$1"',
	'translate-translations-fieldset-title' => 'כל התרגומים',
	'translate-translations-messagename' => 'הודעה:',
	'translate-translations-including-no-param' => 'אנא ציינו שם דף תקין בפרמטר של דף המשנה',
	'languagestats' => 'סטטיסטיקת השפה',
	'languagestats-summary' => 'דף זה מציג את סטטיסטיקת התרגומים עבור כל קבוצות ההודעות ([[MediaWiki:Translate-languagestats-groups|המוגדרות]]) עבור שפה.',
	'translate-language-code' => 'קוד השפה',
	'translate-language-code-field-name' => 'קוד השפה:',
	'translate-suppress-complete' => 'השמטת קבוצות הודעות שתורגמו במלואן',
	'translate-language' => 'שפה',
	'translate-total' => 'הודעות',
	'translate-untranslated' => 'ללא תרגום',
	'translate-percentage-complete' => 'השלמה',
	'translate-percentage-fuzzy' => 'לא מעודכנות',
);

/** Hindi (हिन्दी)
 * @author Ashishbhatnagar72
 * @author Kaustubh
 */
$messages['hi'] = array(
	'translate' => 'अनुवाद',
	'translate-edit' => 'संपादन',
	'translate-talk' => 'वार्ता',
	'translate-history' => 'इतिहास',
	'translate-task-view' => 'से सभी संदेश देखें',
	'translate-task-untranslated' => 'से सभी अननुवादित संदेश देखें',
	'translate-task-optional' => 'से वैकल्पिक संदेश देखें',
	'translate-task-review' => 'बदलावों का पुनरावलोकन',
	'translate-task-reviewall' => 'में सभी अनुवादों का पुनरावलिकन करें',
	'translate-task-export' => 'से अनुवाद आयात करें.',
	'translate-page-disabled' => "इस भा्षा के इस समूह में अनुवाद बंद हैं. कारण:
''$1''",
	'translate-page-language' => 'भाषा',
	'translate-page-navigation-legend' => 'नैविगेशन',
	'translate-page-showing' => '$3 में से $1 से $2  तक संदेश दर्शित हैं.',
	'translate-optional' => '(वैकल्पिक)',
	'translate-magic-submit' => 'ढूंढे',
	'translate-magic-cm-export' => 'निर्यात',
	'translate-magic-cm-comment' => 'टिप्पणी:',
	'translate-magic-cm-save' => 'संजोयें',
	'translationchanges-export' => 'निर्यात',
);

/** Hiligaynon (Ilonggo)
 * @author Jose77
 */
$messages['hil'] = array(
	'translate-edit' => 'ilisan',
	'translate-talk' => 'hisayranay',
	'translate-history' => 'saysay',
	'translate-page-navigation-legend' => 'Nabigayson',
);

/** Croatian (Hrvatski)
 * @author Dalibor Bosits
 * @author Dnik
 * @author SpeedyGonsales
 * @author Suradnik13
 */
$messages['hr'] = array(
	'translate' => 'Prijevodi sistemskih poruka',
	'translate-desc' => '[[Special:Translate|Posebna stranica]] za prevođenje MediaWiki i izvan',
	'translate-edit' => 'uredi',
	'translate-talk' => 'razgovor',
	'translate-history' => 'povijest',
	'translate-task-view' => 'Vidjeti sve poruke u prostoru',
	'translate-task-untranslated' => 'Vidjeti sve neprevedene poruke u prostoru',
	'translate-task-optional' => 'Vidjeti dodatne (optional) poruke u prostoru',
	'translate-task-untranslatedoptional' => 'Vidjeti neprevedene dodatne poruke od',
	'translate-task-problematic' => 'Vidjeti poruke koje imaju problem',
	'translate-task-review' => 'Vidjeti promjene u prostoru',
	'translate-task-reviewall' => 'Vidjeti sve prijevode u prostoru',
	'translate-task-export' => 'Izvesti (export) prijevode iz prostora',
	'translate-task-export-to-file' => 'Izvesti (export) u datoteku prijevode iz prostora',
	'translate-task-export-as-po' => 'Izvesti (export) prijevod u formatu Gettext',
	'translate-task-export-to-xliff' => 'Izvezi prijevod u Xliff formatu',
	'translate-page-no-such-language' => 'Unešen je nevaljani kod jezika',
	'translate-page-no-such-task' => 'Navedeni zadatak je neispravan.',
	'translate-page-no-such-group' => 'Navedena grupa je neispravna.',
	'translate-page-disabled' => "Prijevodi na ovaj jezik u ovoj grupi su onemogućeni. Razlog:

''$1''",
	'translate-page-settings-legend' => 'Postavke',
	'translate-page-task' => 'Želim',
	'translate-page-group' => 'Skupina',
	'translate-page-language' => 'Jezik',
	'translate-page-limit' => 'Prikaži maks.',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|poruka|poruke|poruka}} po stranici',
	'translate-submit' => 'Nađi',
	'translate-page-navigation-legend' => 'Navigacija',
	'translate-page-showing' => 'Prikazane poruke od $1 do $2 od ukupno $3.',
	'translate-page-showing-all' => 'Prikazano: $1 {{PLURAL:$1|poruka|poruke|poruka}}.',
	'translate-page-showing-none' => 'Nema traženih poruka.',
	'translate-next' => 'Slijedeća stranica',
	'translate-prev' => 'Prethodna stranica',
	'translate-page-description-legend' => 'Podaci o grupi',
	'translate-page-edit' => 'uredi',
	'translate-optional' => '(opcionalno)',
	'translate-ignored' => '(zanemareno)',
	'translate-edit-definition' => 'Definicija poruke',
	'translate-edit-contribute' => 'dodaj',
	'translate-edit-no-information' => "''Ova poruka nema dokumentacije. Ako znate gdje ili kako se koristi poruka, možete pomoći drugim prevoditeljima dodavajući dokumentaciju ovoj poruci.''",
	'translate-edit-information' => 'Informacije o ovoj poruci ($1)',
	'translate-edit-in-other-languages' => 'Poruka u drugim jezicima',
	'translate-edit-committed' => 'Trenutačni prijevod u softveru',
	'translate-edit-warnings' => 'Upozorenja o nepotpunim prijevodima',
	'translate-edit-goto-no-prev' => 'Nema prethodne poruke',
	'translate-edit-goto-no-next' => 'Nema sljedeće poruke',
	'translate-edit-goto-prev' => 'Uredi prethodnu poruku',
	'translate-edit-goto-next' => 'Uredi sljedeću poruku',
	'translate-edit-goto-list' => 'Povratak na popis',
	'translate-magic-pagename' => 'Prošireni MediaWiki prijevod',
	'translate-magic-module' => 'Modul:',
	'translate-magic-submit' => 'Dohvati',
	'translate-magic-cm-export' => 'Izvezi',
	'translate-magic-cm-to-be' => 'Budući',
	'translate-magic-cm-current' => 'Trenutni',
	'translate-magic-cm-original' => 'Izvornik',
	'translate-magic-cm-comment' => 'Komentar:',
	'translate-magic-cm-save' => 'Spremi',
	'translate-magic-cm-updatedusing' => 'Osvježeno uporabom [[Special:Magic]] stranice',
	'translate-magic-cm-savefailed' => 'Snimanje nije uspjelo',
	'translate-magic-special' => 'Alijasi posebnih stranica',
	'translate-magic-words' => 'Magične riječi (stringovi)',
	'translate-magic-skin' => 'Imena skinova',
	'translate-magic-namespace' => 'Imena imenskih prostora',
	'translationchanges' => 'Prevoditeljske promjene',
	'translationchanges-export' => 'izvedi (export)',
	'translate-checks-parameters' => 'Sljedeći parametri se ne koriste:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Nejednak broj zagrada:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => 'Sljedeće poveznice su problematične:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Definicija koristi <nowiki>{{PLURAL:}}</nowiki>, ali prijevod ne.',
	'right-translate' => 'Uređivanje koristeći sučelje za prevođenje',
	'translate-rc-translation-filter' => 'Filtriraj prijevode:',
	'translate-rc-translation-filter-no' => 'Ne čini ništa',
	'translate-rc-translation-filter-only' => 'Prikaži samo prijevode',
	'translate-stats-users' => 'Prevoditelji',
	'translate-statsf-options' => 'Opcije grafa',
	'translate-statsf-width' => 'Širina u pikselima',
	'translate-statsf-height' => 'Visina u pikselima',
	'translate-statsf-scale-days' => 'Dani',
	'translate-statsf-scale-hours' => 'Sati',
	'translate-statsf-count-edits' => 'Broj uređivanja',
	'translate-statsf-count-users' => 'Aktivni prevoditelji',
	'translate-statsf-submit' => 'Prikaži',
	'translate-tag-page-desc' => 'Prijevod wiki stranice [[:$1]].',
	'translate-tag-translate-link-desc' => 'Prevedi ovu stranicu',
	'translate-sidebar-alltrans' => 'Drugi prijevodi',
	'translations' => 'Svi prijevodi',
	'translate-translations-no-message' => '"$1" nije poruka koja se prevodi',
	'translate-translations-none' => 'Ne postoje prijevodi za "$1"',
	'translate-translations-fieldset-title' => 'Svi prijevodi',
	'translate-translations-messagename' => 'Poruka:',
	'languagestats' => 'Statistika jezika',
	'languagestats-summary' => 'Ova stranica prikazuje statistiku prijevoda za sve  ([[MediaWiki:Translate-languagestats-groups|podešene]]) grupe poruka za jezik.',
	'translate-language-code' => 'Jezični kôd',
	'translate-language-code-field-name' => 'Jezični kôd:',
	'translate-suppress-complete' => 'Izostavi potpuno prevedene grupe poruka',
	'translate-language' => 'Jezik',
	'translate-total' => 'Poruke',
	'translate-untranslated' => 'Neprevedeno',
	'translate-percentage-complete' => 'Dovršeno',
	'translate-percentage-fuzzy' => 'Zastarjelo',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Dundak
 * @author Michawiki
 */
$messages['hsb'] = array(
	'translate' => 'Přełožić',
	'translate-desc' => '[[Special:Translate|Specialna strona]] za přełožowanje Mediawiki a druheho',
	'translate-edit' => 'wobdźěłać',
	'translate-talk' => 'diskusija',
	'translate-history' => 'stawizny',
	'translate-task-view' => 'Pokazaj wšě zdźělenki',
	'translate-task-untranslated' => 'Pokazaj njepřełožene zdźělenki',
	'translate-task-optional' => 'Pokazaj opcionalne zdźělenki',
	'translate-task-untranslatedoptional' => 'Wobhladać sej njepřełožene opcionelne zdźělenki z',
	'translate-task-problematic' => 'Zdźělenki pokazać, kotrež maja problemy',
	'translate-task-review' => 'Přepruwuj změny za',
	'translate-task-reviewall' => 'Přepruwuj wšě přełožki w',
	'translate-task-export' => 'Eksportuj přełožki',
	'translate-task-export-to-file' => 'Eksportuj přełožk do dataje',
	'translate-task-export-as-po' => 'Přełožk we formaće Gettext eksportować',
	'translate-task-export-to-xliff' => 'Přełožk do formata Xliff eksportować',
	'translate-page-no-such-language' => 'Njepłaćiwy rěčny kod podaty',
	'translate-page-no-such-task' => 'Podaty nadawk bě njepłaćiwy.',
	'translate-page-no-such-group' => 'Podata skupina bě njepłaćiwa.',
	'translate-page-disabled' => "Přełožki do tuteje rěče w tutej skupinje buchu znjemóžnjene. Přičina:

''$1''",
	'translate-page-settings-legend' => 'Nastajenja',
	'translate-page-task' => 'Akcija',
	'translate-page-group' => 'Skupina',
	'translate-page-language' => 'Rěč',
	'translate-page-limit' => 'Ličba zdźělenkow',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|zdźělenka|zdźělence|zdźělenki|zdźělenkow}} na stronu',
	'translate-submit' => 'Pokazać',
	'translate-page-navigation-legend' => 'Nawigacija',
	'translate-page-showing' => 'Zdźělenki wot $1 do $2 z $3 pokazać.',
	'translate-page-showing-all' => '{{PLURAL:$1|Pokazuje so|Pokazujetej so|Pokazuja so|Pokazuje so}} $1 {{PLURAL:$1|zdźělenka|zdźělence|zdźělenki|zdźělenkow}}.',
	'translate-page-showing-none' => 'Njejsu zdźělenki, kotrež hodźa so pokazać.',
	'translate-next' => 'Přichodna strona',
	'translate-prev' => 'Předchadna strona',
	'translate-page-description-legend' => 'Informacije wo skupinje',
	'translate-page-edit' => 'wobdźěłać',
	'translate-optional' => '(opcionalny)',
	'translate-ignored' => '(ignorowany)',
	'translate-edit-definition' => 'Definicija zdźělenki',
	'translate-edit-contribute' => 'přinošować',
	'translate-edit-no-information' => "''Tuta zdźělenka dokumentaciju nima, Jeli wěš, hdźež tuta zdźělenka so wužiwa, móžeš druhim přełožowarjam pomhać přidawajo dokumentaciju k tutej zdźělence.''",
	'translate-edit-information' => 'Informacije wo tutej zdźělence ($1)',
	'translate-edit-in-other-languages' => 'Zdźělenka w druhich rěčach',
	'translate-edit-committed' => 'Aktualny přełožk w softwarje',
	'translate-edit-warnings' => 'Warnowanja wo njedospołnych přełožkach',
	'translate-edit-goto-no-prev' => 'Žana předchadna zdźělenka',
	'translate-edit-goto-no-next' => 'Žana přichodna zdźělenka',
	'translate-edit-goto-prev' => 'Předchadnu zdźělenku wobdźěłać',
	'translate-edit-goto-next' => 'Přichodnu zdźělenku wobdźěłać',
	'translate-edit-goto-list' => 'Wróćo k lisćinje',
	'translate-magic-pagename' => 'Rozšěrjeny přełožk MediaWiki',
	'translate-magic-help' => 'Móžěs aliasy specialnych stronow, magiske słowa, mjena šatow a mjena mjenowych rumow přełožić.

Aliasy specialnych stronow a magiske słowow móža wjacore přełožki měć.
Přełožki su přež komu (,) wotdźěleja.
Mjena šatow a mjenowych rumow móže jenož jedyn přełožk měć.

W přełožkach mjenowych rumow <tt>$1 diskusija</tt> je specialna. <tt>$1</tt> so přez mjeno mjeno sydła, na př. <tt>{{SITENAME}} diskusija</tt> naruna. Jeli w twojej rěči njeje móžno płaćiwy wuraz tworić, bjeztoho zo by so mjeno strony změniło, skontaktuj prošu wuwiwarja.

Dyrbiš w skupinje přełožowarjow być, zo by změny składował. Změny so njeskładuja, doniž  składowanske tłóčatko njekliknješ.',
	'translate-magic-module' => 'Modul:',
	'translate-magic-submit' => 'Pokazać',
	'translate-magic-cm-export' => 'Eksportować',
	'translate-magic-cm-to-be' => 'Ma być:',
	'translate-magic-cm-current' => 'Tuchwilu',
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-comment' => 'Komentar:',
	'translate-magic-cm-save' => 'Składować',
	'translate-magic-cm-updatedusing' => 'Z [[Special:Magic]] zaktualizowany',
	'translate-magic-cm-savefailed' => 'Składowanje njeporadźiło',
	'translate-magic-special' => 'Aliasy specialnych stronow',
	'translate-magic-words' => 'Magiske słowa',
	'translate-magic-skin' => 'Mjeno šatow',
	'translate-magic-namespace' => 'Mjena mjenowych rumow',
	'translationchanges' => 'Přełožowanske změny',
	'translationchanges-export' => 'eksportować',
	'translationchanges-change' => '$1: $2 wot $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Slědowacy parameter|Slědowacej parametraj|Slědowace parametry|Slědowacych parametrow}} so {{PLURAL:$2|njewužiwa|njewužiwatej|njewužiwaja|njewužiwa}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Slědowacy parameter je njeznaty|Slědowacej parametraj stej njeznatej|Slědowace parametry su njeznate|Slědowacych parametrow je njeznate}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Je njeruna ličba {{PLURAL:$2|spinka|spinkow|spinkow|spinkow}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Slědowacy wotkaz je problematiski|Slědowacej wotkazaj stej problematiskej|Slědowace wotkazy wotkazy su problematiske|Slědowacych wotkazow je problematiske}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Narunaj prošu {{PLURAL:$2|slědowacu tafličku|slědowacej tafličce|slědowace taflički|slědowacych tafličkow}} přez {{PLURAL:$2|korektnu|korektnej|korektne|korektne}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Definicija wužiwa <nowiki>{{PLURAL:}}</nowiki>, přełožk pak nic.',
	'translate-checks-pagename' => 'Mjenowy rum z definicije změnjeny',
	'translate-checks-format' => 'Tutón přełožk njeslěduje definiciji abo ma njepłaćiwu syntaksu: $1',
	'tog-translate-nonewsletter' => 'Njepósćel mi žadyn e-mejlowy dopis nowinkow (jenož za wužiwarjow z wobkrućenej e-mejlowej adresu relewantny)',
	'right-translate' => 'Z pomocu powjercha přełožowanja wobdźěłać',
	'translate-rc-translation-filter' => 'Přełožki filtrować:',
	'translate-rc-translation-filter-no' => 'Ničo nječinić',
	'translate-rc-translation-filter-only' => 'Jenož přełožki pokazać',
	'translate-rc-translation-filter-filter' => 'Přełožki wufiltrować',
	'translate-rc-translation-filter-site' => 'Jenož změny sydłowych zdźělenkow',
	'translationstats' => 'Statistiki přełožkow',
	'translate-stats-edits' => 'Změny na dźeń',
	'translate-stats-users' => 'Přełožowarjo',
	'translate-statsf-intro' => 'Móžeš z tutym formularom jednoru statistiku wutworić. Wšě hódnoty maja horni a delni limit.',
	'translate-statsf-options' => 'Grafiske opcije',
	'translate-statsf-width' => 'Šěrokosć w pikselach',
	'translate-statsf-height' => 'Wysokosć w pikselach',
	'translate-statsf-days' => 'Doba w dnjach',
	'translate-statsf-scale' => 'Granularita',
	'translate-statsf-scale-days' => 'Dny',
	'translate-statsf-scale-hours' => 'Hodźiny',
	'translate-statsf-count' => 'Měra',
	'translate-statsf-count-edits' => 'Ličba změnow',
	'translate-statsf-count-users' => 'Aktiwni přełožowarjo',
	'translate-statsf-language' => 'Lisćina přez komu wotdźělenych rěčnych kodow',
	'translate-statsf-group' => 'Lisćina přez komu wotdźělenych skupinowych kodow',
	'translate-statsf-submit' => 'Přehlad',
	'translate-tag-category' => 'Přełožujomne strony',
	'translate-tag-page-desc' => 'Přełožk wikijoweje strony [[:$1]].',
	'translate-tag-translate-link-desc' => 'Tutu stronu přełožić',
	'translate-tag-legend' => 'Legenda',
	'translate-tag-legend-fallback' => 'Přełožk w druhej rěči',
	'translate-tag-legend-fuzzy' => 'Zestarjeny přełožk',
	'translate-tag-fuzzy-comment' => 'Definicija wot [[User:$1|$1]] we wersiji $2 změnjena.',
	'translate-tag-fuzzy-reason' => 'Definicija wot "$1" z komentarom "$3" w $2 změnjena.',
	'translate-sidebar-alltrans' => 'Druhe přełožki',
	'translate-tag-noedit' => 'Tuta strona je awtomatisce nahrata přełožowanska strona.
Móžeš [$1 originalnu stronu wobdźěłać] abo [$2 přełožk aktualizować].',
	'translations' => 'Wšě přełožki',
	'translations-summary' => 'Zapodaj deleka zdźělenske mjeno, zo by wšě k dispoziciji stejce přełožki pokazał.',
	'translate-translations-no-message' => '"$1" přełožujomna zdźělenka njeje',
	'translate-translations-none' => 'Přełožki za "$1" njejsu',
	'translate-translations-fieldset-title' => 'Wšě přełožki',
	'translate-translations-messagename' => 'Zdźělenka:',
	'translate-translations-including-no-param' => 'Prošu podaj płaćiwe mjeno za parameter podstrona',
	'languagestats' => 'Rěčna statistika',
	'languagestats-summary' => 'Strona pokazuje přełožowansku statistiku za wšě ([[MediaWiki:Translate-languagestats-groups|konfigurowane]]) zdźělenske skupiny za rěč.',
	'translate-language-code' => 'Rěčny kod',
	'translate-language-code-field-name' => 'Rěčny kod:',
	'translate-suppress-complete' => 'Dospołnje přełožene zdźělenske skupiny potłóčić',
	'translate-language' => 'Rěč:',
	'translate-total' => 'Zdźělenki',
	'translate-untranslated' => 'Njepřełoženy',
	'translate-percentage-complete' => 'Dospołny',
	'translate-percentage-fuzzy' => 'Zestarjeny',
);

/** Haitian (Kreyòl ayisyen)
 * @author Jvm
 * @author Masterches
 */
$messages['ht'] = array(
	'translate' => 'Tradui',
	'translate-desc' => '[[Special:Translate|Paj espesyal]] pou tradui MediaWiki e plis ankò.',
	'translate-edit' => 'edite',
	'translate-talk' => 'pale',
	'translate-history' => 'istwa',
	'translate-task-view' => 'Wè tout mesaj soti nan',
	'translate-task-untranslated' => 'Wè tout mesaj ki pa tradui soti nan',
	'translate-task-optional' => 'Wè mesaj optional soti nan',
	'translate-task-review' => 'Revize chanjman nan',
	'translate-task-reviewall' => 'Revize tout tradiksyon yo nan',
	'translate-task-export' => 'Ekspòte tradiksyon yo nan',
	'translate-task-export-to-file' => 'Ekspòte tradisyon a nan yon fichye depi',
	'translate-task-export-as-po' => 'Ekspòte nan fòma Gettext tradiksyon pou',
	'translate-page-no-such-language' => 'Langaj espesifye-a envalid.',
	'translate-page-no-such-task' => 'Tach espesifye-a envalid.',
	'translate-page-no-such-group' => 'Group espesifye-a invalid',
	'translate-page-settings-legend' => 'Konfigirasyon, preferans',
	'translate-page-task' => 'Mwen vle',
	'translate-page-group' => 'Gwoup',
	'translate-page-language' => 'Lang',
	'translate-page-limit' => 'Limit',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|mesaj|mesaj}} nan chak paj',
	'translate-submit' => 'Ale, fouye',
	'translate-page-navigation-legend' => 'Navigasyon',
	'translate-page-showing' => 'Montre mesaj $1 jiska $2 nan tout $3 yo.',
	'translate-page-showing-all' => 'Montre $1 {{PLURAL:$1|mesaj|mesaj}}.',
	'translate-page-showing-none' => 'Pa genyen pyès mesaj pou montre.',
	'translate-next' => 'Paj swivan',
	'translate-prev' => 'Paj presedan',
	'translate-page-description-legend' => 'Enfòmasyon sou group la',
	'translate-page-edit' => 'modifye',
	'translate-optional' => '(opsyon)',
	'translate-ignored' => '(ignore)',
	'translate-edit-definition' => 'Definisyon pou mesaj sa',
	'translate-edit-contribute' => 'kontribiye',
	'translate-edit-no-information' => "''Mesaj sa pa dokimante.
Si w konnen ki kote mesaj sa itilize, ou kapab ede lòt tradiktè pa ajoute dokimantasyon pou mesaj sa.''",
	'translate-edit-information' => 'Enfòmasyon konsène mesaj sa ($1)',
	'translate-edit-in-other-languages' => 'Mesaj nan lòt langaj yo',
	'translate-edit-committed' => 'Trandiksyon kouran nan logisye',
	'translate-edit-warnings' => 'Kosyon konsène tradiksyon enkonplete yo',
	'translate-magic-pagename' => 'MediaWiki tradiksyon prolonje',
	'translate-magic-help' => 'Ou kapab tradui alias paj especial yo, mo majik, non po yo ak non nonespas yo.

Nan mo majik yo ou bezwen enkli tradiksyon angle oubyen yo sispann travay.
Epi kite premye bagay la (0 or 1) kòm li ye.

Alias paj espesyal yo ak mo majik yo kapab gen miltip tradiksyon.
Tradiksyon yo separe pa yon vigil (,).
Non po ak nonespas kapab gen yon sèl tradiksyon.

Nan nonespas tradiksyon yo <tt>$1 pale</tt> espesyal. <tt>$1</tt> ranplase pa nonsitwèb (pa ekzanp <tt>{{SITENAME}} pale</tt>).
Si li pa posib nan langaj ou pou fòme expresyon valid san ou pa chanje nonsitwèb, souple kontakte yon devlopè.

Fò ke ou nan yon group tradiktè pou ou kapab sove chanjman.
Chanjman yo pa sove tou pandan ou pa klike sou bouton sove anba.',
	'translate-magic-submit' => 'Mande',
	'translate-magic-cm-export' => 'Expòte',
	'translate-magic-cm-to-be' => "Ap vin'",
	'translate-magic-cm-current' => 'Aktyèl',
	'translate-magic-cm-original' => 'Orijinal',
	'translate-magic-cm-comment' => 'Kòmantè:',
	'translate-magic-cm-save' => 'Sove',
	'translate-magic-cm-updatedusing' => 'Met an kouran itilize [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Sove chwe',
	'translate-magic-special' => 'Alias paj espesyal yo',
	'translate-magic-words' => 'Mo majik yo',
	'translate-magic-skin' => 'Non po',
	'translate-magic-namespace' => 'Non nonespas yo',
	'translationchanges' => 'Tradiksyon chanjman',
	'translationchanges-export' => 'expòte',
	'translationchanges-change' => '$1: $2 pa $3',
	'translate-checks-parameters' => 'Paramèt swivan yo pa itilize: <strong>$1</strong>',
	'translate-checks-balance' => 'Genyen yon kantite paramè enpè: <strong>$1</strong>',
	'translate-checks-links' => 'Chèn swivan yo problèmatik: <strong>$1</strong>',
	'translate-checks-xhtml' => 'Souple ranplase tag swivan yo avèk sa ki kòrèk yo: <strong>$1</strong>',
	'translate-checks-plural' => 'Definisyon itilize <nowiki>{{PLURAL:}}</nowiki> men pa tradiksyon.',
	'tog-translate-nonewsletter' => 'Piga voye e-mèl korespondans ban mwen (relevan sèlman pou itilizatè avèk yon adrès e-mèl valide)',
);

/** Hungarian (Magyar)
 * @author Dani
 */
$messages['hu'] = array(
	'translate' => 'Fordítás',
	'translate-desc' => '[[Special:Translate|Speciális lap]] a MediaWiki és más projektek fordítására',
	'translate-edit' => 'szerk',
	'translate-talk' => 'vita',
	'translate-history' => 'laptörténet',
	'translate-task-view' => 'Összes üzenet megtekintése',
	'translate-task-untranslated' => 'Összes fordítatlan üzenet megtekintése',
	'translate-task-optional' => 'Nem kötelező üzenetek megtekintése',
	'translate-task-problematic' => 'Problémás üzenetek megtekintése',
	'translate-task-review' => 'Változások áttekintése',
	'translate-task-reviewall' => 'Összes fordítás áttekintése',
	'translate-task-export' => 'Fordítások kimentése',
	'translate-task-export-to-file' => 'Fordítások kimentése fájlba',
	'translate-task-export-as-po' => 'Fordítás kimentése Gettext formátumba',
	'translate-task-export-to-xliff' => 'Fordítások kimentése Xliff formátumban',
	'translate-page-no-such-language' => 'A megadott nyelv érvénytelen',
	'translate-page-no-such-task' => 'A megadott művelet érvénytelen',
	'translate-page-no-such-group' => 'A megadott csoport érvénytelen',
	'translate-page-disabled' => "Ez a csoport nem fordítható erre a nyelvre. A tiltás oka:

''$1''",
	'translate-page-settings-legend' => 'Beállítások',
	'translate-page-task' => 'Elvégzendő művelet',
	'translate-page-group' => 'Csoport',
	'translate-page-language' => 'Nyelv',
	'translate-page-limit' => 'Megjelenítendő elemek',
	'translate-page-limit-option' => '$1 üzenet/oldal',
	'translate-submit' => 'Megjelenítés',
	'translate-page-navigation-legend' => 'Navigáció',
	'translate-page-showing' => 'Üzenetek: $1–$2 (összesen $3)',
	'translate-page-showing-all' => '$1 üzenet megjelenítve',
	'translate-page-showing-none' => 'Nincs a keresési feltételeknek megfelelő üzenet',
	'translate-next' => 'következő',
	'translate-prev' => 'előző',
	'translate-page-description-legend' => 'Információk a csoportról',
	'translate-page-edit' => 'szerkesztés',
	'translate-optional' => '(nem kötelező)',
	'translate-ignored' => '(figyelmen kívül hagyva)',
	'translate-edit-definition' => 'Alapértelmezett érték',
	'translate-edit-contribute' => 'szerkesztés',
	'translate-edit-no-information' => "''Ehhez az üzenethez még nincs leírás. Ha tudod, hogy hogyan kell használni, akkor segítheted a többi fordítót a dokumentálásával.''",
	'translate-edit-information' => 'Használat ($1)',
	'translate-edit-in-other-languages' => 'Az üzenet más nyelveken',
	'translate-edit-committed' => 'Jelenlegi fordítás',
	'translate-edit-warnings' => 'Hiányosságok a fordításban',
	'translate-edit-goto-no-prev' => 'Nincs előző üzenet',
	'translate-edit-goto-no-next' => 'Nincs következő üzenet',
	'translate-edit-goto-prev' => 'Előző üzenet szerkesztése',
	'translate-edit-goto-next' => 'Következő üzenet szerkesztése',
	'translate-edit-goto-list' => 'Vissza a listához',
	'translate-magic-module' => 'Modul:',
	'translate-magic-submit' => 'Lekérés',
	'translate-magic-cm-export' => 'Exportálás',
	'translate-magic-cm-to-be' => 'Leendő',
	'translate-magic-cm-current' => 'Jelenlegi',
	'translate-magic-cm-original' => 'Eredeti',
	'translate-magic-cm-comment' => 'Megjegyzés:',
	'translate-magic-cm-save' => 'Mentés',
	'translate-magic-cm-updatedusing' => 'Frissítve a [[Special:Magic]] használatával',
	'translate-magic-cm-savefailed' => 'Mentés sikertelen',
	'translate-magic-special' => 'Speciális lapok álnevei',
	'translate-magic-words' => 'Varázsszavak',
	'translate-magic-skin' => 'Felületek nevei',
	'translate-magic-namespace' => 'Névterek nevei',
	'translationchanges' => 'Változások a fordításokban',
	'translationchanges-export' => 'kimentés',
	'translationchanges-change' => '$1: $2 $3 által',
	'translate-checks-parameters' => 'A következő {{PLURAL:$2|paraméter nincs|paraméterek nincsenek}} használva:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => 'A következő {{PLURAL:$2|paraméter ismeretlen|paraméterek ismeretlenek}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Nem egyenlő számban vannak használva a nyitó- és zárójelek:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => 'A következő {{PLURAL:$2|link problémás|linkek problémásak}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'A következő {{PLURAL:$2|elemet|elemeket}} cseréld le a megfelelőekre:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Az alapértelmezett változatban van <nowiki>{{PLURAL:}}</nowiki> forma, míg a fordításban nincs (magyar nyelv esetén ez nem feltétlenül probléma!).',
	'tog-translate-nonewsletter' => 'Ne küldjenek hírlevelet (ez csak azokra vonatkozik, akik megerősített e-mail címmel rendelkeznek)',
	'right-translate' => 'szerkesztés a fordítói felületen keresztül',
	'translate-rc-translation-filter' => 'Fordítások szűrése:',
	'translate-rc-translation-filter-no' => 'Ne csináljon semmit',
	'translate-rc-translation-filter-only' => 'Csak a fordítások mutatása',
	'translate-rc-translation-filter-filter' => 'Fordítások kihagyása',
	'translate-rc-translation-filter-site' => 'Az oldal üzeneteinek változása',
	'translationstats' => 'Fordítási statisztika',
	'translate-stats-edits' => 'Szerkesztések',
	'translate-stats-users' => 'Fordítók',
	'translate-statsf-intro' => 'A lenti űrlap segítségével egy egyszerű statisztikát generáltathatsz. Minden értéknek van alsó és felső határa.',
	'translate-statsf-options' => 'Grafikon beállításai',
	'translate-statsf-width' => 'Szélesség pixelekben',
	'translate-statsf-height' => 'Magasság pixelekben',
	'translate-statsf-days' => 'Időtartam napokban',
	'translate-statsf-scale' => 'Időköz',
	'translate-statsf-scale-days' => 'naponként',
	'translate-statsf-scale-hours' => 'óránként',
	'translate-statsf-count' => 'Értékek',
	'translate-statsf-count-edits' => 'Szerkesztések száma',
	'translate-statsf-count-users' => 'Aktív fordítók',
	'translate-statsf-language' => 'Nyelvkódok, vesszővel elválasztva',
	'translate-statsf-group' => 'Csoportkódok, vesszővel elválasztva',
	'translate-statsf-submit' => 'Előnézet',
	'translate-tag-category' => 'Lefordítható lapok',
	'translate-tag-page-desc' => 'A(z) [[:$1]] lap fordítása',
	'translate-tag-translate-link-desc' => 'A lap fordítása',
	'translate-tag-legend' => 'Jelmagyarázat:',
	'translate-tag-legend-fallback' => 'Más nyelvű fordítás',
	'translate-tag-legend-fuzzy' => 'Elavult fordítás',
	'translate-sidebar-alltrans' => 'Más nyelvű fordítások',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'translate' => 'Traducer',
	'translate-desc' => '[[Special:Translate|Pagina special]] pro traducer MediaWiki e ultra',
	'translate-edit' => 'modificar',
	'translate-talk' => 'discussion',
	'translate-history' => 'historia',
	'translate-task-view' => 'Vider tote le messages del',
	'translate-task-untranslated' => 'Vider tote le messages non traducite del',
	'translate-task-optional' => 'Vider le messages optional del',
	'translate-task-problematic' => 'Vider le messages que ha problemas',
	'translate-task-review' => 'Revider le modificationes al',
	'translate-task-reviewall' => 'Revider tote le messages traducite in',
	'translate-task-export' => 'Exportar traductiones ab',
	'translate-task-export-to-file' => 'Exportar le traduction verso un file ab',
	'translate-task-export-as-po' => 'Exportar traduction in formato Gettext',
	'translate-task-export-to-xliff' => 'Exportar traduction in formato Xliff',
	'translate-page-no-such-language' => 'Le lingua specificate esseva invalide.',
	'translate-page-no-such-task' => 'Le action specificate esseva invalide.',
	'translate-page-no-such-group' => 'Le gruppo specificate esseva invalide.',
	'translate-page-disabled' => "Le traductiones in iste lingua in iste gruppo ha essite disactivate. Motivo:

''$1''",
	'translate-page-settings-legend' => 'Configurationes',
	'translate-page-task' => 'Io vole',
	'translate-page-group' => 'Gruppo',
	'translate-page-language' => 'Lingua',
	'translate-page-limit' => 'Limite',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|message|messages}} per pagina',
	'translate-submit' => 'Obtener',
	'translate-page-navigation-legend' => 'Navigation',
	'translate-page-showing' => 'Presentation de messages de $1 a $2 ex $3.',
	'translate-page-showing-all' => 'Presentation de $1 {{PLURAL:$1|message|messages}}.',
	'translate-page-showing-none' => 'Nulle messages a presentar.',
	'translate-next' => 'Pagina sequente',
	'translate-prev' => 'Pagina precedente',
	'translate-page-description-legend' => 'Information super le gruppo',
	'translate-page-edit' => 'modificar',
	'translate-optional' => '(optional)',
	'translate-ignored' => '(ignorate)',
	'translate-edit-definition' => 'Definition del message',
	'translate-edit-contribute' => 'contribuer',
	'translate-edit-no-information' => "''Iste message non ha documentation.
Si tu sape ubi o como iste message es usate, tu pote adjutar le altere traductores per adder documentation a iste message.''",
	'translate-edit-information' => 'Information super iste message ($1)',
	'translate-edit-in-other-languages' => 'Le message in altere linguas',
	'translate-edit-committed' => 'Traduction actual in software',
	'translate-edit-warnings' => 'Advertimentos super traductiones incomplete',
	'translate-edit-goto-no-prev' => 'Nulle message precedente',
	'translate-edit-goto-no-next' => 'Nulle message sequente',
	'translate-edit-goto-prev' => 'Modificar le message precedente',
	'translate-edit-goto-next' => 'Modificar le message sequente',
	'translate-edit-goto-list' => 'Retornar al lista',
	'translate-magic-pagename' => 'Traduction extendite de MediaWiki',
	'translate-magic-help' => 'Tu pote traducer le aliases de paginas special, le parolas magic, le nomines de stilos e le nomines de spatios de nomines.

Le aliases de paginas special e le parolas magic pote haber plure traductiones.
Le traductiones es separate per un comma (,).
Le nomines de stilos e de spatios de nomines pote haber solmente un traduction.

In le traductiones de spatios de nomines, <tt>$1 talk</tt> es special. <tt>$1</tt> es reimplaciate per le nomine del sito (per exemplo <tt>{{SITENAME}} talk</tt>).
Si non es possibile in tu lingua formar un expression valide sin cambiar le nomine del sito, per favor contacta un disveloppator.

Es necessari appertiner al gruppo de traductores pro publicar le modificationes.
Le modificationes non es immagazinate usque tu clicca super le button Publicar infra.',
	'translate-magic-module' => 'Modulo:',
	'translate-magic-submit' => 'Obtener',
	'translate-magic-cm-export' => 'Exportar',
	'translate-magic-cm-to-be' => 'Futur',
	'translate-magic-cm-current' => 'Actual',
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-comment' => 'Commento:',
	'translate-magic-cm-save' => 'Immagazinar',
	'translate-magic-cm-updatedusing' => 'Actualisate con [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Impossibile immagazinar',
	'translate-magic-special' => 'Aliases de paginas special',
	'translate-magic-words' => 'Parolas magic',
	'translate-magic-skin' => 'Nomines de stilos',
	'translate-magic-namespace' => 'Nomines de spatios de nomines',
	'translationchanges' => 'Modificationes in traductiones',
	'translationchanges-export' => 'exportar',
	'translationchanges-change' => '$1: $2 per $3',
	'translate-checks-parameters' => 'Le sequente {{PLURAL:$2|parametro|parametros}} non es usate:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => 'Le sequente {{PLURAL:$2|parametro|parametros}} es incognite:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Il ha un numero impar de {{PLURAL:$2|parentheses|parentheses}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => 'Le sequente {{PLURAL:$2|ligamine|ligamines}} es problematic:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Per favor corrige le sequente {{PLURAL:$2|etiquetta|etiquettas}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Le definition usa <nowiki>{{PLURAL:}}</nowiki> sed non le traduction.',
	'translate-checks-pagename' => 'Spatio de nomines cambiate ab le definition',
	'tog-translate-nonewsletter' => 'Non inviar me bulletines in e-mail (concerne solmente usatores con un adresse de e-mail confirmate)',
	'right-translate' => 'Modificar con le interfacie de traduction',
	'translate-rc-translation-filter' => 'Filtrar traductiones:',
	'translate-rc-translation-filter-no' => 'Facer nihil',
	'translate-rc-translation-filter-only' => 'Monstrar solmente traductiones',
	'translate-rc-translation-filter-filter' => 'Non monstrar traductiones',
	'translate-rc-translation-filter-site' => 'Solmente modificationes in messages del sito',
	'translationstats' => 'Statisticas de traduction',
	'translate-stats-edits' => 'Modificationes',
	'translate-stats-users' => 'Traductores',
	'translate-statsf-intro' => 'Tu pote generar statisticas simple con iste formulario. Tote le valores ha limites maxime e minime.',
	'translate-statsf-options' => 'Optiones de graphico',
	'translate-statsf-width' => 'Latitude in pixeles',
	'translate-statsf-height' => 'Altitude in pixeles',
	'translate-statsf-days' => 'Periodo de tempore in dies',
	'translate-statsf-scale' => 'Granularitate',
	'translate-statsf-scale-days' => 'Dies',
	'translate-statsf-scale-hours' => 'Horas',
	'translate-statsf-count' => 'Mesura',
	'translate-statsf-count-edits' => 'Numero de modifiationes',
	'translate-statsf-count-users' => 'Traductores active',
	'translate-statsf-language' => 'Lista de codices de lingua separate per commas',
	'translate-statsf-group' => 'Lista de codices de gruppo separate per commas',
	'translate-statsf-submit' => 'Previsualisar',
	'translate-tag-category' => 'Paginas traducibile',
	'translate-tag-page-desc' => 'Traduction del pagina wiki [[:$1]].',
	'translate-tag-translate-link-desc' => 'Traducer iste pagina',
	'translate-tag-legend' => 'Legenda:',
	'translate-tag-legend-fallback' => 'Traduction in altere lingua',
	'translate-tag-legend-fuzzy' => 'Traduction obsolete',
	'translate-tag-fuzzy-comment' => 'Definition cambiate per [[User:$1|$1]] in version $2.',
	'translate-tag-fuzzy-reason' => 'Definition cambiate per "$1" con commento "$3" in $2.',
	'translate-sidebar-alltrans' => 'Altere traductiones',
	'translate-tag-noedit' => 'Iste pagina es un traduction automaticamente actualisate.
Tu pote [$1 modificar le pagina de origine] o [$2 actualisar le traduction].',
);

/** Indonesian (Bahasa Indonesia)
 * @author Irwangatot
 * @author IvanLanin
 * @author Meursault2004
 * @author Rex
 */
$messages['id'] = array(
	'translate' => 'Terjemahan',
	'translate-desc' => '[[Special:Translate|Halaman istimewa]] untuk menerjemahkan Mediawiki',
	'translate-edit' => 'sunting',
	'translate-talk' => 'bicara',
	'translate-history' => 'versi',
	'translate-task-view' => 'Tampilkan semua pesan dari',
	'translate-task-untranslated' => 'Tampilkan semua pesan yang belum diterjemahkan dari',
	'translate-task-optional' => 'Tampilkan pesan opsional dari',
	'translate-task-problematic' => 'Tampilkan pesan-pesan bermasalah',
	'translate-task-review' => 'Tinjau perubahan dari',
	'translate-task-reviewall' => 'Tinjau semua perubahan pada',
	'translate-task-export' => 'Ekspor terjemahan dari',
	'translate-task-export-to-file' => 'Ekspor terjemahan ke berkas dari',
	'translate-task-export-as-po' => 'Ekspor terjemahan ke format Gettext dari',
	'translate-task-export-to-xliff' => 'Ekspor terjemahan dalam format Xliff',
	'translate-page-no-such-language' => 'Bahasa yang dipilih tak valid.',
	'translate-page-no-such-task' => 'Operasi yang dipilih tak valid.',
	'translate-page-no-such-group' => 'Grup yang dipilih tak valid.',
	'translate-page-disabled' => "Penerjemahan dalam bahasa ini telah dinon-aktifkan. Alasan:

''$1''",
	'translate-page-settings-legend' => 'Pengaturan',
	'translate-page-task' => 'Saya ingin',
	'translate-page-group' => 'Kelompok',
	'translate-page-language' => 'Bahasa',
	'translate-page-limit' => 'Batasan',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|pesan|pesan}} per halaman',
	'translate-submit' => 'Ambil',
	'translate-page-navigation-legend' => 'Navigasi',
	'translate-page-showing' => 'Menampilkan pesan $1 hingga $2 dari $3.',
	'translate-page-showing-all' => 'Menampilkan $1 {{PLURAL:$1|pesan|pesan}}.',
	'translate-page-showing-none' => 'Tak ada pesan yang dapat ditampilkan.',
	'translate-next' => 'Halaman selanjutnya',
	'translate-prev' => 'Halaman sebelumnya',
	'translate-page-description-legend' => 'Informasi mengenai grup',
	'translate-page-edit' => 'sunting',
	'translate-optional' => '(opsional)',
	'translate-ignored' => '(diabaikan)',
	'translate-edit-definition' => 'Definisi pesan',
	'translate-edit-contribute' => 'berkontribusi',
	'translate-edit-no-information' => "''Pesan ini tak memiliki dokumentasi. Jika Anda tahu di mana dan bagaimana pesan ini digunakan, Anda dapat menolong penerjemah lain dengan menambahkan dokumentasi bagi pesan ini.''",
	'translate-edit-information' => 'Informasi mengenai pesan ini ($1)',
	'translate-edit-in-other-languages' => 'Pesan dalam bahasa lain',
	'translate-edit-committed' => 'Terjemahan terkini yang ada di perangkat lunak',
	'translate-edit-warnings' => 'Peringatan mengenai terjemahan yang tak lengkap',
	'translate-edit-goto-no-prev' => 'Tidak ada pesan sebelumnya',
	'translate-edit-goto-no-next' => 'Tidak ada pesan berikutnya',
	'translate-edit-goto-prev' => 'Sunting pesan sebelumnya',
	'translate-edit-goto-next' => 'Sunting pesan berikutnya',
	'translate-edit-goto-list' => 'Kembali ke daftar',
	'translate-magic-pagename' => 'Perluasan terjemahan Mediawiki',
	'translate-magic-help' => 'Anda dapat menerjemahkan alias untuk halaman istimewa, kata-kata magis, nama kulit, dan ruang-ruang nama.

Alias untuk halaman istimewa dan kata-kata magis dapat memiliki lebih dari satu terjemahan.
Masing-masing harus dipisahkan dengan sebuah tanda koma (,).
Nama kulit dan ruang nama hanya dapat memiliki satu terjemahan.

Dalam menerjemahkan, ruang nama <tt>$1 talk</tt> harus diperlakukan khusus. <tt>$1</tt> digantikan dengan nama situs (contohnya <tt>{{SITENAME}} talk</tt>).
Jika bahasa Anda tidak memungkinkan untuk membentuk suatu ekspresi yang valid tanpa mengganti nama situs, silakan kontak salah seorang pengembang.

Anda perlu menjadi anggota kelompok penerjemah untuk menyimpan perubahan.
Perubahan tak akan disimpan hingga Anda mengklik tombol simpan di bawah.',
	'translate-magic-module' => 'Modul:',
	'translate-magic-submit' => 'Ambil',
	'translate-magic-cm-export' => 'Ekspor',
	'translate-magic-cm-to-be' => 'Menjadi',
	'translate-magic-cm-current' => 'Kini',
	'translate-magic-cm-original' => 'Asal',
	'translate-magic-cm-comment' => 'Komentar:',
	'translate-magic-cm-save' => 'Simpan',
	'translate-magic-cm-updatedusing' => 'Diperbaharui menggunakan [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Penyimpanan gagal',
	'translate-magic-special' => 'Alias halaman istimewa',
	'translate-magic-words' => 'Kata magis',
	'translate-magic-skin' => 'Nama kulit',
	'translate-magic-namespace' => 'Nama ruang nama',
	'translationchanges' => 'Perubahan terjemahan',
	'translationchanges-export' => 'ekspor',
	'translationchanges-change' => '$1: $2 oleh $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Parameter|Parameter-parameter}} berikut tidak digunakan:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Parameter|Parameter-parameter}} berikut tidak dikenal:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Jumlah {{PLURAL:$2|pengapit|pengapit-pengapit}} tak seimbang:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Pranala|Pranala-pranala}} berikut bermasalah:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Harap ganti {{PLURAL:$2|tag|tag-tag}} berikut dengan tag yang tepat:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Definisi menggunakan <nowiki>{{PLURAL:}}</nowiki> tapi terjemahannya tidak.',
	'translate-checks-pagename' => 'Ruang nama berubah dari definisinya',
	'tog-translate-nonewsletter' => 'Jangan kirimkan saya e-mail berita (hanya untuk pengguna dengan alamat surat-e yang sudah dikonfirmasi)',
	'right-translate' => 'Sunting menggunakan antarmuka penerjemahan',
	'translate-rc-translation-filter' => 'Filter terjemahan:',
	'translate-rc-translation-filter-no' => 'Tidak difilter',
	'translate-rc-translation-filter-only' => 'Tampilkan hanya terjemahan',
	'translate-rc-translation-filter-filter' => 'Tampilkan selain terjemahan',
	'translate-rc-translation-filter-site' => 'Hanya perubahan ke pesan situs',
	'translationstats' => 'Statistik penerjemahan',
	'translate-stats-edits' => 'Jumlah suntingan per hari',
	'translate-stats-users' => 'Penerjemah',
	'translate-statsf-intro' => 'Anda dapat menciptakan statistik sederhana menggunakan formulir ini. Semua nilai memiliki batas atas dan bawah.',
	'translate-statsf-options' => 'Opsi grafik',
	'translate-statsf-width' => 'Lebar dalam pixel',
	'translate-statsf-height' => 'Tinggi dalam pixel',
	'translate-statsf-days' => 'Periode waktu dalam hari',
	'translate-statsf-scale' => 'Granularitas',
	'translate-statsf-scale-days' => 'Hari',
	'translate-statsf-scale-hours' => 'Jam',
	'translate-statsf-count' => 'Ukuran',
	'translate-statsf-count-edits' => 'Jumlah suntingan',
	'translate-statsf-count-users' => 'Penerjemah aktif',
	'translate-statsf-language' => 'Daftar kode bahasa dibatasi dengan koma',
	'translate-statsf-group' => 'Daftar kode kelompok yang dibatasi dengan koma',
	'translate-statsf-submit' => 'Pratayang',
	'translate-tag-category' => 'Halaman yang dapat diterjemahkan',
	'translate-tag-page-desc' => 'Terjemahan atas halaman wiki [[:$1]].',
	'translate-tag-translate-link-desc' => 'Terjemahkan halaman ini',
	'translate-tag-legend' => 'Keterangan:',
	'translate-tag-legend-fallback' => 'Terjemahan dalam bahasa lain',
	'translate-tag-legend-fuzzy' => 'Terjemahan usang',
	'translate-tag-fuzzy-comment' => 'Definisi diubah oleh [[User:$1|$1]] pada revisi $2.',
	'translate-tag-fuzzy-reason' => 'Definisi diubah oleh "$1" dengan komentar "$3" pada $2.',
	'translate-sidebar-alltrans' => 'Terjemahan lain',
);

/** Iloko (Ilokano)
 * @author Saluyot
 */
$messages['ilo'] = array(
	'translate' => 'Ipatarus',
);

/** Icelandic (Íslenska)
 * @author Jóna Þórunn
 * @author S.Örvarr.S
 */
$messages['is'] = array(
	'translate' => 'Þýða',
	'translate-edit' => 'breyta',
	'translate-talk' => 'spjall',
	'translate-history' => 'breytingaskrá',
	'translate-task-view' => 'Skoða allar meldingar frá',
	'translate-task-untranslated' => 'Skoða allar óþýddar meldingar frá',
	'translate-task-optional' => 'Skoða valfrjálsar meldingar frá',
	'translate-task-review' => 'Kanna breytingar á',
	'translate-task-reviewall' => 'Kanna allar breytingar á',
	'translate-page-no-such-language' => 'Tilgreinda tungumálið var ógilt.',
	'translate-page-no-such-task' => 'Tilgreinda verkefnið var ógilt.',
	'translate-page-no-such-group' => 'Tilgreindur hópur var ógildur.',
	'translate-page-settings-legend' => 'Stillingar',
	'translate-page-task' => 'Ég vil',
	'translate-page-group' => 'Hópur',
	'translate-page-language' => 'Tungumál',
	'translate-page-limit' => 'Takmark',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|melding|meldingar}} á hverri síðu',
	'translate-submit' => 'Sækja',
	'translate-page-navigation-legend' => 'Flakk',
	'translate-page-showing' => 'Sýni meldingar frá $1 til $2 af $3.',
	'translate-page-showing-all' => 'Sýni $1 {{PLURAL:$1|melding|meldingar}}.',
	'translate-page-showing-none' => 'Engar meldingar til að sýna.',
	'translate-next' => 'Næsta síða',
	'translate-prev' => 'Fyrri síða',
	'translate-page-description-legend' => 'Upplýsingar um hópinn',
	'translate-optional' => '(valfrjálst)',
	'translate-ignored' => '(hunsað)',
	'translate-edit-definition' => 'Útskýring á meldingu',
	'translate-edit-contribute' => 'breyta',
	'translate-edit-no-information' => "''Þessi melding hefur enga skjölun.
Ef þú veist hvar eða hvernig meldingin er notuð getur þú hjálpað öðrum þýðendum með því að bæta skjölun við hana.''",
	'translate-edit-information' => 'Upplýsingar um þessa meldingu ($1)',
	'translate-edit-in-other-languages' => 'Melding á öðrum tungumálum',
	'translate-edit-committed' => 'Núverandi þýðing í hugbúnaðinum',
	'translate-edit-warnings' => 'Viðvaranir vegna ókláraðar þýðinga',
	'translate-magic-submit' => 'Sækja',
	'translate-magic-cm-export' => 'Flytja',
	'translate-magic-cm-to-be' => 'Verðandi',
	'translate-magic-cm-current' => 'Núverandi',
	'translate-magic-cm-original' => 'Upprunalega',
	'translate-magic-cm-comment' => 'Athugasemd:',
	'translate-magic-cm-save' => 'Vista',
	'translate-magic-cm-savefailed' => 'Vistun mistókst',
	'translate-magic-special' => 'Aukanefni kerfissíðna',
	'translate-magic-skin' => 'Heiti þema',
	'translate-magic-namespace' => 'Heiti nafnrýma',
	'translationchanges' => 'Breytingar þýðinga',
	'translationchanges-export' => 'flytja',
	'translationchanges-change' => '$1: $2 eftir $3',
	'translate-checks-parameters' => 'Eftirfarandi færibreytur eru ekki notaðar: <strong>$1</strong>',
	'translate-checks-links' => 'Eftirfarandi tenglar eru vafasamir: <strong>$1</strong>',
	'translate-checks-xhtml' => 'Gjörðu svo vel og skiptu út eftirfarandi tögum fyrir þau réttu: <strong>$1</strong>',
	'translate-checks-plural' => 'Skilgreiningin notar <nowiki>{{PLURAL:}}</nowiki> en ekki þýðingin.',
	'tog-translate-nonewsletter' => 'Ekki senda mér rafrænt fréttabréf (aðeins fyrir notendur með staðfest netföng)',
);

/** Italian (Italiano)
 * @author Darth Kule
 * @author Melos
 * @author Pietrodn
 */
$messages['it'] = array(
	'translate' => 'Traduzione',
	'translate-desc' => '[[Special:Translate|Pagina speciale]] per tradurre MediaWiki e oltre',
	'translate-edit' => 'modifica',
	'translate-talk' => 'discussione',
	'translate-history' => 'cronologia',
	'translate-task-view' => 'Visualizzare tutti i messaggi dal',
	'translate-task-untranslated' => 'Visualizzare tutti i messaggi non tradotti dal',
	'translate-task-optional' => 'Visualizzare i messaggi opzionali dal',
	'translate-task-problematic' => 'Visualizzare messaggi che hanno problemi',
	'translate-task-review' => 'Revisionare i cambiamenti al',
	'translate-task-reviewall' => 'Revisionare tutti i messaggi tradotti nel',
	'translate-task-export' => 'Esportare le traduzioni dal',
	'translate-task-export-to-file' => 'Esportare la traduzione in un file dal',
	'translate-task-export-as-po' => 'Esportare la traduzione nel formato Gettext',
	'translate-task-export-to-xliff' => 'Esportare la traduzione nel formato Xliff',
	'translate-page-no-such-language' => 'Il linguaggio specificato non è valido.',
	'translate-page-no-such-task' => "L'azione specificata non è valida.",
	'translate-page-no-such-group' => 'Il gruppo specificato non è valido.',
	'translate-page-disabled' => "Le traduzioni in questa lingua in questo gruppo sono state disabilitate. Motivo:

''$1''",
	'translate-page-settings-legend' => 'Impostazioni',
	'translate-page-task' => 'Voglio',
	'translate-page-group' => 'Gruppo',
	'translate-page-language' => 'Lingua',
	'translate-page-limit' => 'Limite',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|messaggio|messaggi}} per pagina',
	'translate-submit' => 'Ottieni',
	'translate-page-navigation-legend' => 'Navigazione',
	'translate-page-showing' => 'Mostro i messaggi da $1 a $2 di $3.',
	'translate-page-showing-all' => 'Mostro $1 {{PLURAL:$1|messaggio|messaggi}}.',
	'translate-page-showing-none' => 'Nessun messaggio da mostrare.',
	'translate-next' => 'Pagina successiva',
	'translate-prev' => 'Pagina precedente',
	'translate-page-description-legend' => 'Informazioni sul gruppo',
	'translate-page-edit' => 'modifica',
	'translate-optional' => '(opzionale)',
	'translate-ignored' => '(ignorato)',
	'translate-edit-definition' => 'Definizione del messaggio',
	'translate-edit-contribute' => 'contribuisci',
	'translate-edit-no-information' => "''Questo messaggio non ha documentazione.
Se sai dove o come è usato questo messaggio, puoi aiutare gli altri traduttori aggiungendo la documentazione a questo messaggio.''",
	'translate-edit-information' => 'Informazioni su questo messaggio ($1)',
	'translate-edit-in-other-languages' => 'Messaggio in altre lingue',
	'translate-edit-committed' => 'Traduzione attuale nel software',
	'translate-edit-warnings' => 'Avvisi sulle traduzioni incomplete',
	'translate-edit-goto-no-prev' => 'Nessun messaggio precedente',
	'translate-edit-goto-no-next' => 'Nessun messaggio successivo',
	'translate-edit-goto-prev' => 'Modifica il messaggio precedente',
	'translate-edit-goto-next' => 'Modifica il messaggio successivo',
	'translate-edit-goto-list' => "Torna all'elenco",
	'translate-magic-pagename' => 'Traduzione estesa di MediaWiki',
	'translate-magic-help' => 'Puoi tradurre gli alias delle pagine speciali, le parole magiche, i nomi delle skin e i nomi dei namespace.

Gli alias delle pagine speciali e le parole magiche possono avere più traduzioni.
Le traduzioni sono separate da una virgola (,).
I nomi delle skin e i namespace possono avere solo una traduzione.

Nelle traduzioni dei namespace <tt>$1 talk</tt> è speciale. <tt>$1</tt> viene rimpiazzato con il nome del sito (per esempio <tt>{{SITENAME}} talk</tt>).
Se non è possibile formare un\'espressione valida nella tua lingua senza cambiare il nome del sito, per favore contatta uno sviluppatore.

Devi essere nel gruppo dei traduttori per salvare le modifiche.
Le modifiche non vengono salvate finché non clicchi sul bottone "Salva" sotto.',
	'translate-magic-module' => 'Modulo:',
	'translate-magic-submit' => 'Ottieni',
	'translate-magic-cm-export' => 'Esporta',
	'translate-magic-cm-to-be' => 'Nuovo',
	'translate-magic-cm-current' => 'Attuale',
	'translate-magic-cm-original' => 'Originale',
	'translate-magic-cm-comment' => 'Commento:',
	'translate-magic-cm-save' => 'Salva',
	'translate-magic-cm-updatedusing' => 'Aggiornato usando [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Salvataggio fallito',
	'translate-magic-special' => 'Alias delle pagine speciali',
	'translate-magic-words' => 'Parole magiche',
	'translate-magic-skin' => 'Nomi delle skin',
	'translate-magic-namespace' => 'Nomi dei namespace',
	'translationchanges' => 'Cambiamenti delle traduzioni',
	'translationchanges-export' => 'esporta',
	'translate-checks-parameters' => '{{PLURAL:$2|Il seguente parametro non è usato|I seguenti parametri non sono usati}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Il seguente parametro è sconosciuto|I seguenti parametri sono sconosciuti}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => "C'è un numero di {{PLURAL:$2|parentesi|parentesi}} dispari: <strong><nowiki>$1</nowiki></strong>",
	'translate-checks-links' => '{{PLURAL:$2|Il seguente collegamento è problematico|I seguenti $2 collegamenti sono problematici}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Per favore sostituisci {{PLURAL:$2|il tag seguente|i tag seguenti}} con quelli corretti: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'La definizione usa <nowiki>{{PLURAL:}}</nowiki> ma la traduzione no.',
	'translate-checks-pagename' => 'Namespace cambiato dalla definizione',
	'tog-translate-nonewsletter' => 'Non mandarmi le newsletter per e-mail (importante solo per gli utenti con un indirizzo e-mail confermato)',
	'right-translate' => "Modifica usando l'interfaccia di traduzione",
	'translate-rc-translation-filter' => 'Filtra le traduzioni:',
	'translate-rc-translation-filter-no' => 'Non fare niente',
	'translate-rc-translation-filter-only' => 'Mostra solo le traduzioni',
	'translate-rc-translation-filter-filter' => 'Elimina le traduzioni',
	'translate-rc-translation-filter-site' => 'Solo i cambiamenti ai messaggi del sito',
	'translationstats' => 'Statistiche di traduzione',
	'translate-stats-edits' => 'Edit per giorno',
	'translate-stats-users' => 'Traduttori',
	'translate-statsf-intro' => 'È possibile generare semplici statistiche con questo modulo. Tutti i valori hanno limiti massimi e minimi.',
	'translate-statsf-options' => 'Opzioni grafico',
	'translate-statsf-width' => 'Larghezza in pixel',
	'translate-statsf-height' => 'Altezza in pixel',
	'translate-statsf-days' => 'Periodo di tempo in giorni',
	'translate-statsf-scale' => 'Un punto ogni',
	'translate-statsf-scale-days' => 'Giorno',
	'translate-statsf-scale-hours' => 'Ora',
	'translate-statsf-count' => 'Misura',
	'translate-statsf-count-edits' => 'Numero di edit',
	'translate-statsf-count-users' => 'Traduttori attivi',
	'translate-statsf-language' => 'Elenco dei codici delle lingue separati da virgola',
	'translate-statsf-group' => 'Elenco dei codici dei gruppi separati da virgola',
	'translate-statsf-submit' => 'Anteprima',
	'translate-tag-category' => 'Pagine traducibili',
	'translate-tag-page-desc' => 'Traduzione della pagina wiki [[:$1]].',
	'translate-tag-translate-link-desc' => 'Traduci questa pagina',
	'translate-tag-legend' => 'Legenda:',
	'translate-tag-legend-fallback' => 'Traduzione in altre lingue',
	'translate-tag-legend-fuzzy' => 'Traduzione non aggiornata',
	'translate-tag-fuzzy-comment' => 'Definizione cambiata da [[User:$1|$1]] nella revisione $2.',
	'translate-tag-fuzzy-reason' => 'Definizione cambiata da "$1" con commento "$3" in $2.',
	'translate-sidebar-alltrans' => 'Altre traduzioni',
	'translate-tag-noedit' => 'Questa pagina è una pagina di traduzione aggiornata automaticamente.
Puoi [$1 modificare la pagina sorgente] o [$2 aggiornare la traduzione].',
	'translations' => 'Tutte le traduzioni',
	'translations-summary' => 'Inserire di seguito il nome di un messaggio per mostrare tutte le traduzioni presenti.',
	'translate-translations-no-message' => '"$1" non è un messaggio traducibile',
	'translate-translations-none' => 'Non sono presenti traduzioni per "$1"',
	'translate-translations-fieldset-title' => 'Tutte le traduzioni',
	'translate-translations-messagename' => 'Messaggio:',
	'translate-translations-including-no-param' => 'Specificare il nome di una pagina valida nel parametro sottopagina',
	'languagestats' => 'Statistiche delle lingue',
	'languagestats-summary' => 'Questa pagina mostra le statistiche delle traduzioni per tutti ([[MediaWiki:Translate-languagestats-groups|configurati]]) i gruppi di messaggi di una lingua.',
	'translate-language-code' => 'Codice lingua',
	'translate-language-code-field-name' => 'Codice lingua:',
	'translate-suppress-complete' => 'Nascondi gruppi di messaggi completamente tradotti',
	'translate-language' => 'Lingua',
	'translate-total' => 'Messaggi',
	'translate-untranslated' => 'Non tradotti',
	'translate-percentage-complete' => 'Completati',
	'translate-percentage-fuzzy' => 'Da aggiornare',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fryed-peach
 * @author Hosiryuhosi
 * @author JtFuruhata
 * @author Marine-Blue
 */
$messages['ja'] = array(
	'translate' => 'ソフトウェアメッセージの翻訳',
	'translate-desc' => 'MediaWikiをはじめとするソフトウェアのメッセージを翻訳するための[[Special:Translate|特別ページ]]',
	'translate-edit' => '編集',
	'translate-talk' => 'ノート',
	'translate-history' => '履歴',
	'translate-task-view' => 'すべてのメッセージ',
	'translate-task-untranslated' => '未翻訳メッセージ',
	'translate-task-optional' => '任意翻訳のメッセージ',
	'translate-task-untranslatedoptional' => '未翻訳の任意翻訳メッセージ',
	'translate-task-problematic' => '問題のあるメッセージ',
	'translate-task-review' => '更新反映待ちのメッセージ',
	'translate-task-reviewall' => '翻訳済みメッセージ',
	'translate-task-export' => '翻訳された PHP コードをテキストエリアに出力',
	'translate-task-export-to-file' => '翻訳された PHP コードをファイルとしてエクスポート',
	'translate-task-export-as-po' => '翻訳された PHP コードを gettext 形式でエクスポート',
	'translate-task-export-to-xliff' => '翻訳を Xliff 形式で書き出す',
	'translate-page-no-such-language' => '言語指定が不正です',
	'translate-page-no-such-task' => '絞り込みの指定が不正です',
	'translate-page-no-such-group' => '種類の指定が不正です',
	'translate-page-disabled' => "このグループではこの言語への翻訳は停止されています。理由：

''$1''",
	'translate-page-settings-legend' => '設定',
	'translate-page-task' => '絞込み',
	'translate-page-group' => '種類',
	'translate-page-language' => '言語',
	'translate-page-limit' => '表示数',
	'translate-page-limit-option' => 'ページごとに $1 のメッセージ',
	'translate-submit' => '再表示',
	'translate-page-navigation-legend' => 'ナビゲーション',
	'translate-page-showing' => '全 $3 件中 $1 件目から $2 件目まで表示しています',
	'translate-page-showing-all' => '全 $1 件を表示しています',
	'translate-page-showing-none' => '該当する項目はありません。',
	'translate-next' => '次のページ',
	'translate-prev' => '前のページ',
	'translate-page-description-legend' => 'このグループについて',
	'translate-page-edit' => '編集',
	'translate-optional' => '（任意翻訳）',
	'translate-ignored' => '（翻訳無効）',
	'translate-edit-definition' => '元のメッセージ',
	'translate-edit-contribute' => '寄稿する',
	'translate-edit-no-information' => "''このメッセージに関する説明はありません。もし、このメッセージがどこでどのように使われているかご存知でしたら、他の翻訳者のために説明を寄稿してください。なお、このメッセージは多言語共通の表示となりますので、翻訳者全員が理解できる言語（MediaWikiでは英語）での記述をお願いします。''",
	'translate-edit-information' => 'このメッセージに関する説明（$1）',
	'translate-edit-in-other-languages' => '他言語でのメッセージ',
	'translate-edit-committed' => '現在ソフトウェア上で採用されている翻訳メッセージ',
	'translate-edit-warnings' => '不完全な翻訳に対する警告',
	'translate-edit-goto-no-prev' => 'これより前のメッセージはありません',
	'translate-edit-goto-no-next' => '次のメッセージはありません',
	'translate-edit-goto-prev' => 'この前のメッセージを編集する',
	'translate-edit-goto-next' => '次のメッセージを編集する',
	'translate-edit-goto-list' => '一覧へ戻る',
	'translate-magic-pagename' => 'MediaWiki拡張翻訳',
	'translate-magic-help' => '特別ページへのエイリアス、マジックワード、スキン名、名前空間名を翻訳できます。

特別ページへのエイリアスとマジックワードには複数の翻訳を割り当てることができます。複数の翻訳がある時はコンマ（,）で区切ってください。スキン名と名前空間名には一つの翻訳しか当てることができません。

名前空間を翻訳する際、<tt>$1 talk</tt> には特別な注意事項があります。それは、<tt>$1</tt> がサイト名に変更される点です（例えば<tt>{{SITENAME}} talk</tt>の様に）。あなたが翻訳しようとしている言語において、サイト名の変更なしには正しい形式で表現できない場合、開発者に相談してください。

変更を保存できるのは、翻訳者グループに属する利用者のみです。{{int:translate-magic-cm-save}}ボタンを押すまで変更は保存されません。',
	'translate-magic-module' => 'モジュール:',
	'translate-magic-submit' => '再表示',
	'translate-magic-cm-export' => 'エクスポート',
	'translate-magic-cm-to-be' => '変更後',
	'translate-magic-cm-current' => '変更前',
	'translate-magic-cm-original' => '元の内容',
	'translate-magic-cm-comment' => '編集内容の要約:',
	'translate-magic-cm-save' => '保存',
	'translate-magic-cm-updatedusing' => '[[Special:Magic]] による更新に成功しました',
	'translate-magic-cm-savefailed' => '保存に失敗しました',
	'translate-magic-special' => '特別ページへのエイリアス',
	'translate-magic-words' => 'マジックワード',
	'translate-magic-skin' => 'スキン名',
	'translate-magic-namespace' => '名前空間名',
	'translationchanges' => '翻訳変更状況',
	'translationchanges-export' => 'エクスポート',
	'translationchanges-change' => '$1: $2 翻訳者-$3',
	'translate-checks-parameters' => '次の$2個のパラメータが利用されていません:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '次のパラメーターがみつかりません:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => '$2個の括弧の数が一致していません:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '$2個のリンクに問題があります:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => '以下の$2個のタグを正しいものに修正してください:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => '元のメッセージにある <nowiki>{{PLURAL:}}</nowiki> が翻訳の中にありません。
（日本語訳では、ほとんどの場合、<nowiki>{{PLURAL:}}</nowiki>を用いずに訳しています。その場合、この警告は無視してかまいません。）',
	'translate-checks-pagename' => 'もとの定義から名前空間が変更されています',
	'translate-checks-format' => 'この翻訳は定義に沿っていない、または不正な構文を使用しています: $1',
	'tog-translate-nonewsletter' => '電子メールのニュースレターを受け取らない（電子メールアドレス確認済みの利用者のみ）',
	'right-translate' => '翻訳用インターフェースを使って編集する',
	'translate-rc-translation-filter' => '絞込み:',
	'translate-rc-translation-filter-no' => '絞り込まない',
	'translate-rc-translation-filter-only' => '翻訳のみ',
	'translate-rc-translation-filter-filter' => '翻訳以外',
	'translate-rc-translation-filter-site' => 'Betawiki表示メッセージの変更',
	'translationstats' => '翻訳の統計',
	'translate-stats-edits' => '編集',
	'translate-stats-users' => '翻訳者',
	'translate-statsf-intro' => 'このフォームを使って簡単な統計を生成できます。数値には全て上限と下限があります。',
	'translate-statsf-options' => 'グラフのオプション',
	'translate-statsf-width' => 'ピクセル幅',
	'translate-statsf-height' => 'ピクセル高',
	'translate-statsf-days' => '時期（日数）',
	'translate-statsf-scale' => '粒度',
	'translate-statsf-scale-days' => '日',
	'translate-statsf-scale-hours' => '時間',
	'translate-statsf-count' => '尺度',
	'translate-statsf-count-edits' => '編集回数',
	'translate-statsf-count-users' => '活動中の翻訳者',
	'translate-statsf-language' => 'カンマ区切りの言語コードの一覧',
	'translate-statsf-group' => 'カンマ区切りのグループコードの一覧',
	'translate-statsf-submit' => 'プレビュー',
	'translate-tag-category' => '翻訳可能なページ',
	'translate-tag-page-desc' => 'ウィキページ[[:$1]]に対する翻訳。',
	'translate-tag-translate-link-desc' => 'このページを翻訳する',
	'translate-tag-legend' => '凡例:',
	'translate-tag-legend-fallback' => '他言語での翻訳結果',
	'translate-tag-legend-fuzzy' => '更新の必要な翻訳',
	'translate-tag-fuzzy-comment' => '[[User:$1|$1]]によって版 $2 にて定義が変更されました。',
	'translate-tag-fuzzy-reason' => '$1によって版$2にて定義が変更されました（コメント：$3）。',
	'translate-sidebar-alltrans' => '他言語での翻訳',
	'translate-tag-noedit' => 'このページは自動的に更新される翻訳用ページです。[$1 ソースの編集] または [$2 翻訳の更新]ができます。',
	'translations' => '全ての翻訳結果',
	'translations-summary' => '翻訳済みの全翻訳を見るには下欄にメッセージの名前を入力してください。',
	'translate-translations-no-message' => '「$1」は翻訳できないメッセージです',
	'translate-translations-none' => '「$1」には翻訳がありません',
	'translate-translations-fieldset-title' => '全翻訳結果',
	'translate-translations-messagename' => 'メッセージ:',
	'translate-translations-including-no-param' => 'サブページ引数に有効なページ名を指定してください',
	'languagestats' => '言語別翻訳状況',
	'languagestats-summary' => 'このページでは指定した言語におけるメッセージの翻訳状況をメッセージグループごとに表示しています ([[MediaWiki:Translate-languagestats-groups|表示するメッセージグループの設定]]) 。',
	'translate-language-code' => '言語コード',
	'translate-language-code-field-name' => '言語コード:',
	'translate-suppress-complete' => '翻訳が完了したグループを表示しない',
	'translate-language' => '言語',
	'translate-total' => 'メッセージ',
	'translate-untranslated' => '未翻訳',
	'translate-percentage-complete' => '完了',
	'translate-percentage-fuzzy' => '要修正',
	'translate-languagestats-groups' => ' # Special:LanguageStatsに表示するメッセージグループを制限するには
 # メッセージグループのIDを1行1つずつ記入します。
 # 無効なIDは無視されます。',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 * @author Pras
 */
$messages['jv'] = array(
	'translate' => 'Pertalna/Terjemahna',
	'translate-desc' => '[[Special:Translate|Kaca astaméwa]] kanggo mertal Mediawiki lan liyané',
	'translate-edit' => 'sunting',
	'translate-talk' => 'wicara',
	'translate-history' => 'sajarah/vèrsi',
	'translate-task-view' => 'Tuduhna kabèh pesen saka',
	'translate-task-untranslated' => 'Tuduhna kabèh pesen sing durung dipertal saka',
	'translate-task-optional' => 'Tuduhna pesen opsional saka',
	'translate-task-problematic' => 'Tampilaké pesen-pesen sing nduwèni masalah',
	'translate-task-review' => 'Tinjo owah-owahan saka',
	'translate-task-reviewall' => 'Tinjo kabèh owah-owahan ing',
	'translate-task-export' => 'Èkspor pertalan saka',
	'translate-task-export-to-file' => 'Èkspor pertalan menyang berkas saka',
	'translate-task-export-as-po' => 'Èkspor pertalan ing format Gettext',
	'translate-task-export-to-xliff' => 'Èkspor terjemahan ing format Xliff',
	'translate-page-no-such-language' => 'Basa sing dipilih ora absah.',
	'translate-page-no-such-task' => 'Operasi sing dipilih ora absah.',
	'translate-page-no-such-group' => 'Grup sing dipilih ora absah.',
	'translate-page-disabled' => "Penerjemahan jroning basa iki wis dinon-aktifaké. Alesan:

''$1''",
	'translate-page-settings-legend' => 'Pangaturan',
	'translate-page-task' => 'Aku kepéngin',
	'translate-page-group' => 'Kelompok',
	'translate-page-language' => 'Basa',
	'translate-page-limit' => 'Limit (wates)',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|pesen|pesen}} per kaca',
	'translate-submit' => 'Jupuk',
	'translate-page-navigation-legend' => 'Navigasi',
	'translate-page-showing' => 'Nuduhaké pesen $1 nganti $2 saka $3.',
	'translate-page-showing-all' => 'Nuduhaké $1 {{PLURAL:$1|pesen|pesen}}.',
	'translate-page-showing-none' => 'Ora ana pesen sing bisa dituduhaké.',
	'translate-next' => 'Kaca sabanjuré',
	'translate-prev' => 'Kaca sadurungé',
	'translate-page-description-legend' => 'Informasi ngenani grup utawa kelompok',
	'translate-page-edit' => 'sunting',
	'translate-optional' => '(opsional)',
	'translate-ignored' => '(dilirwakaké)',
	'translate-edit-definition' => 'Définisi pesen',
	'translate-edit-contribute' => 'awèh kontribusi',
	'translate-edit-no-information' => "''Pesen iki ora nduwé dokumèntasi. Menawa panjenengan ngerti kepriyé pesen iki dienggo, mangga panjenengan bisa nulungi para panerjemah liyané mawa nambahaké dokumentasi ing pesen iki.''",
	'translate-edit-information' => 'Informasi perkara pesen iki ($1)',
	'translate-edit-in-other-languages' => 'Pesen ing basa liya',
	'translate-edit-committed' => 'Pertalan saiki ing perangkat lunak',
	'translate-edit-warnings' => 'Pèngetan perkara pertalan sing ora pepak',
	'translate-edit-goto-no-prev' => 'Ora ana pesen/warta sadurungé',
	'translate-edit-goto-no-next' => 'Ora ana pesen/warta sabanjuré',
	'translate-edit-goto-prev' => 'Sunting pesen/warta sadurungé',
	'translate-edit-goto-next' => 'Sunting pesen/warta sabanjuré',
	'translate-edit-goto-list' => 'Bali menyang dhaptar',
	'translate-magic-pagename' => 'Pangambanan pertalan MediaWiki',
	'translate-magic-help' => 'Panjenengan bisa nerjemahaké alias kanggo kaca istiméwa, tembung magis, jeneng kulit, lan jeneng bilik jeneng.

Alias kanggo kaca istiméwa lan tembung magis bisa nduwèni luwih saka siji terjemahan.
Siji lan sijiné kudu dipisahaké nganggo tandha koma (,).
Jeneng kulit lan bilik jeneng mung bisa duwé siji terjemahan.

Jroning nerjemahaké, bilik jeneng <tt>$1 talk</tt> kuwi istiméwa. <tt>$1</tt> digantèkaké nganggo jeneng situs (conto <tt>{{SITENAME}} talk</tt>).
Yèn basa panjenengan ora mungkinaké gawé èksprèsi sing sah tanpa ngganti jeneng situs, mangga hubungi salah siji pangembang.

Panjenengan perlu dadi anggota klompok penerjemah kanggo nyimpen owah-owahan.
Owah-owahan ora bakal disimpen nganti panjenengan ngeklik tombol simpen ing ngisor.',
	'translate-magic-module' => 'Modul:',
	'translate-magic-submit' => 'Jupuk',
	'translate-magic-cm-export' => 'Èkspor',
	'translate-magic-cm-to-be' => 'Dadi',
	'translate-magic-cm-current' => 'Saiki',
	'translate-magic-cm-original' => 'Asli',
	'translate-magic-cm-comment' => 'Komentar:',
	'translate-magic-cm-save' => 'Simpen',
	'translate-magic-cm-updatedusing' => 'Dimutakiraké nganggo [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Gagal disimpen',
	'translate-magic-special' => 'Sesinglon kaca istiméwa',
	'translate-magic-words' => 'Tembung-tembung magis',
	'translate-magic-skin' => 'Jeneng kulit',
	'translate-magic-namespace' => 'Jeneng bilik nama',
	'translationchanges' => 'Owah-owahan terjemahan',
	'translationchanges-export' => 'èkspor',
	'translationchanges-change' => '$1: $2 déning $3',
	'translate-checks-parameters' => '{{PLURAL:$2|parameter|parameter-parameter}} iki ora dianggo:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Parameter|Parameter-parameter}} iki ora dikenal:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Cacahing {{PLURAL:$2|pangapit|pangapit-pangapit}} ora seimbang:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Pranala|Pranala-pranala}} iki nduwèni masalah:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Mangga ganti {{PLURAL:$2|tag|tag-tag}} iki nganggo tag sing cocog:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Dhéfinisi migunakaké <nowiki>{{PLURAL:}}</nowiki> nanging terjemahané ora.',
	'translate-checks-pagename' => 'Bilik jeneng owah saka dhéfinisiné',
	'tog-translate-nonewsletter' => 'Aja ngirimi aku jurnal warta e-mail (namung rélévan kanggo para panganggo sing wis konfirmasi alamat e-mailé)',
	'right-translate' => 'Nyunting nganggo antarmuka pertalan',
	'translate-rc-translation-filter' => 'Filter terjemahan:',
	'translate-rc-translation-filter-no' => 'Ora difilter',
	'translate-rc-translation-filter-only' => 'Tampilaké mung terjemahan waé',
	'translate-rc-translation-filter-filter' => 'Tampilaké saliyané terjemahan',
	'translate-rc-translation-filter-site' => 'Mung owah-owahan ing pesen situs waé',
	'translationstats' => 'Statistik penerjemahan',
	'translate-stats-edits' => 'Cacahing suntingan saben dina',
	'translate-stats-users' => 'Penerjemah',
	'translate-statsf-intro' => 'Pajenengan bisa nggawé statistik prasaja migunakaké formulir iki. Kabèh angka nduwèni wates ndhuwur lan ngisor.',
	'translate-statsf-options' => 'Opsi grafik',
	'translate-statsf-width' => 'Jembar jroning piksel',
	'translate-statsf-height' => 'Dhuwur jroning piksel',
	'translate-statsf-days' => 'Période wektu jroning dina',
	'translate-statsf-scale' => 'Granularitas',
	'translate-statsf-scale-days' => 'Dina',
	'translate-statsf-scale-hours' => 'Jam',
	'translate-statsf-count' => 'Ukuran',
	'translate-statsf-count-edits' => 'Cacahing suntingan',
	'translate-statsf-count-users' => 'Penerjemah aktif',
	'translate-statsf-language' => 'Dhaptar kodhe basa diwatesi nganggo koma',
	'translate-statsf-group' => 'Dhaptar kodhe klompok sing diwatesi nganggo koma',
	'translate-statsf-submit' => 'Pratayang',
	'translate-tag-category' => 'Kaca sing bisa diterjemahaké',
	'translate-tag-page-desc' => 'Terjemahan saka kaca wiki [[:$1]].',
	'translate-tag-translate-link-desc' => 'Terjemahaké kaca iki',
	'translate-tag-legend' => 'Katrangan:',
	'translate-tag-legend-fallback' => 'Terjemahan jroning basa liya',
	'translate-tag-legend-fuzzy' => 'Terjemahan lungsé',
	'translate-tag-fuzzy-comment' => 'Dhéfinisi diowahi déning [[User:$1|$1]] ing révisi $2.',
	'translate-tag-fuzzy-reason' => 'Dhéfinisi diowahi déning "$1" kanthi komentar "$3" ing $2.',
	'translate-sidebar-alltrans' => 'Terjemahan liya',
	'translate-tag-noedit' => 'Kaca iki minangka kaca terjemahan otomatis pungkasan.
Panjenengan bisa [$1 nyunting sumber kaca] utawa [$2 mutakiraké terjemahan].',
);

/** Georgian (ქართული)
 * @author Malafaya
 * @author Sopho
 */
$messages['ka'] = array(
	'translate-edit' => 'რედაქტირება',
	'translate-talk' => 'განხილვა',
	'translate-history' => 'ისტორია',
	'translate-page-group' => 'ჯგუფი',
	'translate-page-language' => 'ენა',
);

/** Kara-Kalpak (Qaraqalpaqsha)
 * @author Atabek
 */
$messages['kaa'] = array(
	'translate' => 'Awdarıw',
	'translate-edit' => "o'zgertiw",
	'translate-talk' => "sa'wbet",
	'translate-history' => 'tariyxı',
	'translate-task-view' => 'Barlıq xabarlardı qaraw',
	'translate-task-untranslated' => "Barlıq awdarılmag'an xabarlardı qaraw",
	'translate-task-optional' => "Sha'rt emes xabarlardı qaraw",
	'translate-task-review' => "O'zgerislerdi qarap shıg'ıw",
	'translate-task-reviewall' => "Barlıq awdarılg'anlardı qarap shıg'ıw",
	'translate-task-export' => "Awdarılg'anlardı eksport qılıw",
	'translate-task-export-to-file' => "Awdarılg'anlardı faylg'a eksport qılıw",
	'translate-task-export-as-po' => "Awdarılg'anlardı Gettext formatında eksport qılıw",
	'translate-page-no-such-language' => 'Keltirilgen til jaramsız',
	'translate-page-no-such-task' => 'Keltirilgen tapsırma jaramsız',
	'translate-page-no-such-group' => 'Keltirilgen topar jaramsız',
	'translate-page-disabled' => "Bul toparda usı tilge awdarıwlar toqtatılg'an. Sebep:

''$1''",
	'translate-page-settings-legend' => 'Sazlawlar',
	'translate-page-task' => 'Talabım:',
	'translate-page-group' => 'Xabar toparı',
	'translate-page-language' => 'Til',
	'translate-page-limit' => 'Sheklew',
	'translate-page-limit-option' => "ha'r bette {{PLURAL:$1|1|$1}} xabar",
	'translate-submit' => "Ko'rset",
	'translate-page-navigation-legend' => 'Navigatsiya',
	'translate-page-showing' => "Ko'rsetilgen xabarlar aralıg'ı: $1 - $2 (barlıg'ı $3).",
	'translate-page-showing-all' => "{{PLURAL:$1|1|$1}} xabar ko'rsetilmekte",
	'translate-page-showing-none' => "Ko'rsetiwge hesh qanday xabar joq.",
	'translate-next' => 'Keyingi bet',
	'translate-prev' => "Aldıng'ı bet",
	'translate-page-description-legend' => "Topar haqqında mag'lıwmat",
	'translate-optional' => "(sha'rt emes)",
	'translate-ignored' => "(itibar berilmeytug'ın)",
	'translate-edit-definition' => "Xabardın' anıqlaması",
	'translate-edit-contribute' => "u'les qosıw",
	'translate-edit-no-information' => "''Bul xabardın' hu'jjet mag'lıwmatı joq. Eger siz bul xabar qayerde yamasa qalay paydalang'anın bilsen'iz, basqa awdarıwshılıwg'a usı xabardın' hu'jjet mag'lıwmatın ko'rsetip ja'rdem beriwin'iz mu'mkin.''",
	'translate-edit-information' => "Bul xabar haqqında mag'lıwmat ($1)",
	'translate-edit-in-other-languages' => 'Bul xabar basqa tillerde',
	'translate-edit-committed' => "Bag'darlamadag'ı ha'zirgi awdarması",
	'translate-edit-warnings' => "Tolıq awdarılmag'an xabarlar haqqında esletpeler",
	'translate-magic-pagename' => "Ken'eytilgen MediaWiki awdarması",
	'translate-magic-submit' => "Ko'rset",
	'translate-magic-cm-export' => 'Eksport qılıw',
	'translate-magic-cm-to-be' => 'Bolıwı kerek',
	'translate-magic-cm-current' => "Ha'zirgisi",
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-comment' => 'Kommentariy:',
	'translate-magic-cm-save' => 'Saqla',
	'translate-magic-cm-updatedusing' => "[[Special:Magic]] qollanıp saqlang'an",
	'translate-magic-cm-savefailed' => "Saqlaw sa'tsiz tamamlandı",
	'translate-magic-special' => 'Arnawlı bet laqabı',
	'translate-magic-words' => "Sıyqırlı so'zler",
	'translate-magic-skin' => 'Skin atları',
	'translate-magic-namespace' => "İsimler ko'pligi atları",
	'translationchanges' => "Awdarma o'zgerisleri",
	'translationchanges-export' => 'eksport qılıw',
	'translationchanges-change' => '$1: $2 ($3 boyınsha)',
	'translate-checks-parameters' => "To'mendegi parametrler qollanılmag'an: <strong>$1</strong>",
	'translate-checks-balance' => "Qawıslardın' sanı jup emes: <strong>$1</strong>",
	'translate-checks-links' => "To'mendegi siltewler jaramsız: <strong>$1</strong>",
	'translate-checks-xhtml' => "To'mendegi teglerdi durıslıları menen o'zgertin': <strong>$1</strong>",
	'translate-checks-plural' => "Anıqlamada <nowiki>{{PLURAL:}}</nowiki> paydalanılg'an, biraq awdarmada bul joq.",
	'tog-translate-nonewsletter' => "Mag'an e-mail boyınsha jan'alıqlardı jibermen' (tek e-mail adresin tastıyıqlag'an paydalanıwshılarg'a tiyisli)",
	'right-translate' => "Awdarma interfeysi ja'rdeminde o'zgertiw",
);

/** Kongo (Kongo)
 * @author Rkupsala
 */
$messages['kg'] = array(
	'translate-talk' => 'disolo',
);

/** Kazakh (Arabic script) (‫قازاقشا (تٴوتە)‬)
 * @author AlefZet
 */
$messages['kk-arab'] = array(
	'translate' => 'اۋدارۋ',
	'translate-edit' => 'وڭدەۋ',
	'translate-talk' => 'تالقىلاۋ',
	'translate-history' => 'تارىيحى',
	'translate-task-view' => 'بارلىق حابارىن قاراۋ',
	'translate-task-untranslated' => 'اۋدارىلماعان بارلىق حابارىن قاراۋ',
	'translate-task-optional' => 'مىندەتتى ەمەس حابارلارىن قاراۋ',
	'translate-task-review' => 'وزگەرىستەرىن قاراپ شىعۋ',
	'translate-task-reviewall' => 'بارلىق اۋدارمالارىن قاراپ شىعۋ',
	'translate-task-export' => 'اۋدارمالارىن سىرتقا بەرۋ',
	'translate-task-export-to-file' => 'اۋدارمالارىن فايلمەن سىرتقا بەرۋ',
	'translate-task-export-as-po' => 'اۋدارمالارىن Gettext پٸشٸمٸمەن سىرتقا بەرۋ',
	'translate-page-no-such-language' => 'كەلتىرىلگەن ٴتىل بەلگىلەمەسى جارامسىز',
	'translate-page-no-such-task' => 'ەنگىزىلگەن تاپسىرما جارامسىز.',
	'translate-page-no-such-group' => 'ەنگىزىلگەن توب جارامسىز.',
	'translate-page-settings-legend' => 'باپتاۋ',
	'translate-page-task' => 'تالابىم:',
	'translate-page-group' => 'حابار توبى',
	'translate-page-language' => 'ٴتىلى',
	'translate-page-limit' => 'شەكتەمى',
	'translate-page-limit-option' => 'بەت سايىن  {{PLURAL:$1|1|$1}} حابار',
	'translate-submit' => 'كەلتىر!',
	'translate-page-navigation-legend' => 'باعىتتاۋ',
	'translate-page-showing' => 'كورسەتىلگەن حابار اۋقىمى: $1 — $2 (نە بارلىعى $3).',
	'translate-page-showing-all' => 'كورسەتىلۋى: {{PLURAL:$1|1|$1}} حابار.',
	'translate-page-showing-none' => 'كورسەتىلەتىن ەش حابار جوق.',
	'translate-next' => 'كەلەسى بەت',
	'translate-prev' => 'الدىڭعى بەت',
	'translate-page-description-legend' => 'بۇل توپ تۋرالى مالىمەت',
	'translate-optional' => '(مىندەتتى ەمەس)',
	'translate-ignored' => '(ەلەمەيتىن)',
	'translate-edit-definition' => 'حاباردىڭ انىقتالىمى',
	'translate-edit-contribute' => 'ۇلەس بەر',
	'translate-edit-no-information' => "''بۇل حابار قۇجاتتاماسىز. ەگەر وسى حاباردىڭ قايدا نەمەسە قالاي قولدانعانىن بىلسەڭىز, بۇل حابارعا قۇجاتتاما كەلتىرىپ, باسقا اۋدارۋشىلارعا كومەكتەسە الاسىز.''",
	'translate-edit-information' => 'بۇل حابار تۋرالى مالىمەت ($1)',
	'translate-edit-in-other-languages' => 'حابار باسقا تىلدەردە',
	'translate-edit-committed' => 'باعدارلاماداعى اعىمدىق اۋدارما',
	'translate-edit-warnings' => 'تولىق اۋدارىلماعان حابارلار تۋرالى اڭعارتپالار',
	'translate-magic-pagename' => 'كەڭەيتىلگەن MediaWiki اۋدارۋى',
	'translate-magic-help' => 'ارنايى بەت بۇركەمەلەرىن, سىيقىرلى سوزدەرىن, بەزەندىرۋ مانەر اتاۋلارىن جانە ەسىم ايا اتاۋلارىن اۋدارا الاسىز.

سىيقىرلى سوزدەردە اعىلشىنشا نۇسقاسىن كىرگىزۋىڭىز ٴجون, ايتپەسە قىزمەتى توقتالادى. تاعى دا ٴبىرىنشى بابىن (0 نە 1) ٴاردايىم قالدىرىڭىز.

ارنايى بەت بۇركەمەلەرىندە جانە سىيقىرلى سوزدەرىندە بىرنەشە اۋدارما بولۋى مۇمكىن. اۋدارمالار ۇتىرمەن (,) بولىكتەنەدى. بەزەندىرۋ مانەر جانە ەسىم ايا اتاۋلارىندا تەك ٴبىر اۋدارما بولۋى ٴتىيىس.

ەسىم ايا اۋدارمالارىندا <tt>$1_talk</tt> دەگەن ارنايى كەلتىرىلەدى. <tt>$1</tt> دەگەن اينالمالى وزدىكتىك توراپ اتاۋىمەن الماستىرىلادى (مىسالى, <tt>{{SITENAME}} تالقىلاۋى</tt>). ەگەر ٴسىزدىڭ تىلىڭىزدە توراپ اتاۋىن وزگەرتپەي دۇرىس سويلەم قۇرىلماسا, دامىتۋشىلارعا حابارلاسىڭىز.',
	'translate-magic-submit' => 'كەلتىر',
	'translate-magic-cm-export' => 'سىرتقا بەر',
	'translate-magic-cm-to-be' => 'بولۋعا ٴتىيىستىسى',
	'translate-magic-cm-current' => 'اعىمداعىسى',
	'translate-magic-cm-original' => 'تۇپنۇسقاسى',
	'translate-magic-cm-save' => 'ساقتا!',
	'translate-magic-cm-updatedusing' => 'Special:Magic دەگەندى قولدانىپ ساقتالعان',
	'translate-magic-cm-savefailed' => 'ساقتاۋ ٴساتسىز بولدى',
	'translate-magic-special' => 'ارنايى بەت بۇركەمەلەرى',
	'translate-magic-words' => 'سىيقىر سوزدەر',
	'translate-magic-skin' => 'بەزەندىرۋ مانەرى اتاۋلارى',
	'translate-magic-namespace' => 'ەسىم ايا اتاۋلارى',
	'translationchanges' => 'اۋدارما وزگەرىستەرى',
	'translationchanges-export' => 'سىرتقا بەرۋ',
	'translationchanges-change' => '$1: $2 ($3 ٸستەگەن)',
	'translate-checks-parameters' => 'كەلەسى باپتالىمدار پايدالانىلماعان: <strong>$1</strong>',
	'translate-checks-balance' => 'مىندا جاقشالاردىڭ بارلىق سانى جۇپ ەمەس: <strong>$1</strong>',
	'translate-checks-links' => 'كەلەسى سىلتەمەلەر جارامسىز: <strong>$1</strong>',
	'translate-checks-xhtml' => 'كەلەسى بەلگىلەمەلەردى دۇرىستارىمەن الماستىرىڭىز: <strong>$1</strong>',
	'translate-checks-plural' => 'انىقتالىمدا <nowiki>{{PLURAL:}} پايدالانىلعان, بىراق اۋدارمادا بۇل جوق.',
);

/** Kazakh (Cyrillic) (Қазақша (Cyrillic))
 * @author AlefZet
 * @author GaiJin
 */
$messages['kk-cyrl'] = array(
	'translate' => 'Аудару',
	'translate-desc' => 'MediaWiki дегенді және бұнан тыстарды аудару үшін арналған [[Special:Translate|арнайы бет]]',
	'translate-edit' => 'өңдеу',
	'translate-talk' => 'талқылау',
	'translate-history' => 'тарихы',
	'translate-task-view' => 'барлық хабарын қарау',
	'translate-task-untranslated' => 'аударылмаған барлық хабарын қарау',
	'translate-task-optional' => 'міндетті емес хабарларын қарау',
	'translate-task-review' => 'өзгерістерін шолып шығу',
	'translate-task-reviewall' => 'барлық аудармаларын қарап шығу',
	'translate-task-export' => 'аудармаларын сыртқа беру',
	'translate-task-export-to-file' => 'аудармаларын файлмен сыртқа беру',
	'translate-task-export-as-po' => 'аудармаларын Gettext пішімімен сыртқа беру',
	'translate-page-no-such-language' => 'Келтірілген тіл жарамсыз',
	'translate-page-no-such-task' => 'Келтірілген тапсырма жарамсыз.',
	'translate-page-no-such-group' => 'Келтірілген топ жарамсыз.',
	'translate-page-disabled' => "Осы топтағы бұл тілге аударуы өшірілген. Себебі:

''$1''",
	'translate-page-settings-legend' => 'Бапталымдар',
	'translate-page-task' => 'Талабым:',
	'translate-page-group' => 'Хабар тобы',
	'translate-page-language' => 'Тілі',
	'translate-page-limit' => 'Шектемі',
	'translate-page-limit-option' => 'бет сайын $1 хабар',
	'translate-submit' => 'Келтір!',
	'translate-page-navigation-legend' => 'Шарлау',
	'translate-page-showing' => 'Көрсетілген хабар ауқымы: $1 — $2 (не барлығы $3).',
	'translate-page-showing-all' => 'Көрсетілуі: $1 хабар.',
	'translate-page-showing-none' => 'Көрсетілетін еш хабар жоқ.',
	'translate-next' => 'Келесі бет',
	'translate-prev' => 'Алдыңғы бет',
	'translate-page-description-legend' => 'Бұл топ туралы мәлімет',
	'translate-optional' => '(міндетті емес)',
	'translate-ignored' => '(елемейтін)',
	'translate-edit-definition' => 'Хабар анықтауы',
	'translate-edit-contribute' => 'үлес бер',
	'translate-edit-no-information' => "''Бұл хабар құжаттамасыз.
Егер бұл хабардың қайда немесе қалай қолданғанын білсеңіз, бұл хабарға құжаттама келтіріп, басқа аударушыларға көмектесе аласыз.''",
	'translate-edit-information' => 'Бұл хабар туралы мәлімет ($1)',
	'translate-edit-in-other-languages' => 'Хабар басқа тілдерде',
	'translate-edit-committed' => 'Бағдарлама жасақтамадағы ағымдақ аударма',
	'translate-edit-warnings' => 'Толық аударылмаған хабарлар туралы құлақтандырулар',
	'translate-magic-pagename' => 'Кеңейтілген MediaWiki аударуы',
	'translate-magic-help' => 'Арнайы бет бүркеме аттарын, сиқырлы сөздерді, мәнер атауларын және есім ая атауларын аудара аласыз.

Сиқырлы сөздерде ағылшынша нұсқасын кіргізуіңіз жөн, әйтпесе қызметі тоқталады.
Тағы да бірінші бабын (0 не 1) әрдайым қалдырыңыз.

Арнайы бет бүркеме аттарында және сиқырлы сөздерде бірнеше аударма болуы мүмкін.
Аудармалар үтірмен (,) бөлінеді.
Мәнер және есім ая атауларында тек бір аударма болуы мүмкін.

Есім ая аудармаларында <tt>$1_talk</tt> деген арнайы боп табылады. <tt>$1</tt> айналмалысы торап атауымен алмастырылады (мысалы, <tt>{{SITENAME}} талқылауы</tt>).
Егер сіздің тіліңізде торап атауын өзгертпей дұрыс айтылым құрылмаса, дамытушыға хабарласыңыз.

Өзгерістерді сақтау үшін аудармашылар тобына кіруіңіз жөн.
Сақтау батырмасын нұқығанша дейін өзгерістер сақталмайды.',
	'translate-magic-submit' => 'Келтір',
	'translate-magic-cm-export' => 'Сыртқа бер',
	'translate-magic-cm-to-be' => 'Болуға тиістісі',
	'translate-magic-cm-current' => 'Ағымдағысы',
	'translate-magic-cm-original' => 'Түпнұсқасы',
	'translate-magic-cm-comment' => 'Мәндеме:',
	'translate-magic-cm-save' => 'Сақта!',
	'translate-magic-cm-updatedusing' => 'Special:Magic дегенді қолданып сақталған',
	'translate-magic-cm-savefailed' => 'Сақтау сәтсіз болды',
	'translate-magic-special' => 'Арнайы бет бүркеме аттары',
	'translate-magic-words' => 'Сиқыр сөздер',
	'translate-magic-skin' => 'Мәнер атаулары',
	'translate-magic-namespace' => 'Есім ая атаулары',
	'translationchanges' => 'Аударма өзгерістері',
	'translationchanges-export' => 'сыртқа беру',
	'translationchanges-change' => '$1: $2 ($3 істеген)',
	'translate-checks-parameters' => 'Келесі бапталымдар пайдаланылмаған: <strong>$1</strong>',
	'translate-checks-balance' => 'Мында жақшалардың бүкіл саны жұп емес: <strong>$1</strong>',
	'translate-checks-links' => 'Келесі сілтемелер жарамсыз: <strong>$1</strong>',
	'translate-checks-xhtml' => 'Келесі белгілемелерді дұрыстарымен алмастырыңыз: <strong>$1</strong>',
	'translate-checks-plural' => 'Анықталымда <nowiki>{{PLURAL:}}</nowiki> пайдаланылған, бірақ аудармада бұл жоқ.',
	'tog-translate-nonewsletter' => 'Жаңалық хаттарды маған жіберме (тек құпталған е-пошта жайы бар қатысушыларға тиісті)',
	'right-translate' => 'Аудару тілдесуін қолданып өңдеу',
	'translate-rc-translation-filter' => 'Аудармаларды сүзгілеу:',
	'translate-rc-translation-filter-no' => 'Ештеңе істемеу',
	'translate-rc-translation-filter-only' => 'Тек аудармаларды көрсету',
	'translate-rc-translation-filter-filter' => 'Аудармаларды сүзгілеп тастау',
	'translate-rc-translation-filter-site' => 'Тек торап хабарларының өзгерістері',
);

/** Kazakh (Latin) (Қазақша (Latin))
 * @author AlefZet
 * @author Atabek
 * @author GaiJin
 */
$messages['kk-latn'] = array(
	'translate' => 'Awdarıw',
	'translate-edit' => 'öñdew',
	'translate-talk' => 'talqılaw',
	'translate-history' => 'tarïxı',
	'translate-task-view' => 'barlıq xabarın qaraw',
	'translate-task-untranslated' => 'awdarılmağan barlıq xabarın qaraw',
	'translate-task-optional' => 'mindetti emes xabarların qaraw',
	'translate-task-review' => 'özgeristerin qarap şığw',
	'translate-task-reviewall' => 'barlıq awdarmaların qarap şığw',
	'translate-task-export' => 'awdarmaların sırtqa berw',
	'translate-task-export-to-file' => 'awdarmaların faýlmen sırtqa berw',
	'translate-task-export-as-po' => 'awdarmaların Gettext pişimimen sırtqa berw',
	'translate-page-no-such-language' => 'Keltirilgen til belgilemesi jaramsız',
	'translate-page-no-such-task' => 'Engizilgen tapsırma jaramsız.',
	'translate-page-no-such-group' => 'Engizilgen tob jaramsız.',
	'translate-page-settings-legend' => 'Baptaw',
	'translate-page-task' => 'Talabım:',
	'translate-page-group' => 'Xabar tobı',
	'translate-page-language' => 'Tili',
	'translate-page-limit' => 'Şektemi',
	'translate-page-limit-option' => 'bet saýın  {{PLURAL:$1|1|$1}} xabar',
	'translate-submit' => 'Keltir!',
	'translate-page-navigation-legend' => 'Şarlaw',
	'translate-page-showing' => 'Körsetilgen xabar awqımı: $1 - $2 (ne barlığı $3).',
	'translate-page-showing-all' => 'Körsetilwi: {{PLURAL:$1|1|$1}} xabar.',
	'translate-page-showing-none' => 'Körsetiletin eş xabar joq.',
	'translate-next' => 'Kelesi bet',
	'translate-prev' => 'Aldıñğı bet',
	'translate-page-description-legend' => 'Bul top twralı mälimet',
	'translate-optional' => '(mindetti emes)',
	'translate-ignored' => '(elemeýtin)',
	'translate-edit-definition' => 'Xabardıñ anıqtalımı',
	'translate-edit-contribute' => 'üles ber',
	'translate-edit-no-information' => "''Bul xabar qujattamasız. Eger osı xabardıñ qaýda nemese qalaý qoldanğanın bilseñiz, bul xabarğa qujattama keltirip, basqa awdarwşılarğa kömektese alasız.''",
	'translate-edit-information' => 'Bul xabar twralı mälimet ($1)',
	'translate-edit-in-other-languages' => 'Xabar basqa tilderde',
	'translate-edit-committed' => 'Bağdarlamadağı ağımdıq awdarma',
	'translate-edit-warnings' => 'Tolıq awdarılmağan xabarlar twralı añğartpalar',
	'translate-magic-pagename' => 'Keñeýtilgen MediaWiki awdarwı',
	'translate-magic-help' => 'Arnaýı bet bürkemelerin, sïqırlı sözderin, bezendirw mäner atawların jäne esim aya atawların awdara alasız.

Sïqırlı sözderde ağılşınşa nusqasın kirgizwiñiz jön, äýtpese qızmeti toqtaladı. Tağı da birinşi babın (0 ne 1) ärdaýım qaldırıñız.

Arnaýı bet bürkemelerinde jäne sïqırlı sözderinde birneşe awdarma bolwı mümkin. Awdarmalar ütirmen (,) böliktenedi. Bezendirw mäner jäne esim aya atawlarında tek bir awdarma bolwı tïis.

Esim aya awdarmalarında <tt>$1_talk</tt> degen arnaýı keltiriledi. <tt>$1</tt> degen aýnalmalı özdiktik torap atawımen almastırıladı (mısalı, <tt>{{SITENAME}} talqılawı</tt>). Eger sizdiñ tiliñizde torap atawın özgertpeý durıs söýlem qurılmasa, damıtwşılarğa xabarlasıñız.',
	'translate-magic-submit' => 'Keltir',
	'translate-magic-cm-export' => 'Sırtqa ber',
	'translate-magic-cm-to-be' => 'Bolwğa tïistisi',
	'translate-magic-cm-current' => 'Ağımdağısı',
	'translate-magic-cm-original' => 'Tüpnusqası',
	'translate-magic-cm-save' => 'Saqta!',
	'translate-magic-cm-updatedusing' => 'Special:Magic degendi qoldanıp saqtalğan',
	'translate-magic-cm-savefailed' => 'Saqtaw sätsiz boldı',
	'translate-magic-special' => 'Arnaýı bet bürkemeleri',
	'translate-magic-words' => 'Sïqır sözder',
	'translate-magic-skin' => 'Bezendirw mäneri atawları',
	'translate-magic-namespace' => 'Esim aya atawları',
	'translationchanges' => 'Awdarma özgeristeri',
	'translationchanges-export' => 'sırtqa berw',
	'translationchanges-change' => '$1: $2 ($3 istegen)',
	'translate-checks-parameters' => 'Kelesi baptalımdar paýdalanılmağan: <strong>$1</strong>',
	'translate-checks-balance' => 'Mında jaqşalardıñ barlıq sanı jup emes:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => 'Kelesi siltemeler jaramsız:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Kelesi belgilemelerdi durıstarımen almastırıñız:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Anıqtalımda <nowiki>{{PLURAL:}}</nowiki> paýdalanılğan, biraq awdarmada bul joq.',
);

/** Kazakh (Kazakhstan) (‪Қазақша (Қазақстан)‬)
 * @author AlefZet
 */
$messages['kk-kz'] = array(
	'translate' => 'Аудару',
	'translate-edit' => 'өңдеу',
	'translate-talk' => 'талқылау',
	'translate-history' => 'тарихы',
	'translate-task-view' => 'барлық хабарын қарау',
	'translate-task-untranslated' => 'аударылмаған барлық хабарын қарау',
	'translate-task-optional' => 'міндетті емес хабарларын қарау',
	'translate-task-review' => 'өзгерістерін қарап шығу',
	'translate-task-reviewall' => 'барлық аудармаларын қарап шығу',
	'translate-task-export' => 'аудармаларын сыртқа беру',
	'translate-task-export-to-file' => 'аудармаларын файлмен сыртқа беру',
	'translate-page-no-such-language' => 'Келтірілген тіл белгілемесі жарамсыз',
	'translate-submit' => 'Келтір!',
	'translate-next' => 'Келесі бет',
	'translate-prev' => 'Алдыңғы бет',
	'translate-optional' => '(міндетті емес)',
	'translate-ignored' => '(елемейтін)',
	'translate-magic-pagename' => 'Кеңейтілген MediaWiki аударуы',
	'translate-magic-help' => 'Арнайы бет бүркемелерін, сиқырлы сөздерін, безендіру мәнер атауларын және есім ая атауларын аудара аласыз.

Сиқырлы сөздерде ағылшынша нұсқасын кіргізуіңіз жөн, әйтпесе қызметі тоқталады. Тағы да бірінші бабын (0 не 1) әрдайым қалдырыңыз.

Арнайы бет бүркемелерінде және сиқырлы сөздерінде бірнеше аударма болуы мүмкін. Аудармалар үтірмен (,) бөліктенеді. Безендіру мәнер және есім ая атауларында тек бір аударма болуы тиіс.

Есім ая аудармаларында <tt>$1_talk</tt> деген арнайы келтіріледі. <tt>$1</tt> деген айналмалы өздіктік торап атауымен алмастырылады (мысалы, <tt>{{SITENAME}} талқылауы</tt>). Егер сіздің тіліңізде торап атауын өзгертпей дұрыс сөйлем құрылмаса, дамытушыларға хабарласыңыз.',
	'translate-magic-submit' => 'Келтір',
	'translate-magic-cm-export' => 'Сыртқа бер',
	'translate-magic-cm-to-be' => 'Болуға тиісті',
	'translate-magic-cm-current' => 'Ағымдағы',
	'translate-magic-cm-original' => 'Түпнұсқасы',
	'translate-magic-cm-save' => 'Сақта!',
	'translate-magic-cm-updatedusing' => '[[Special:Magic]] дегенді қолданып сақталған',
	'translate-magic-cm-savefailed' => 'Сақтау сәтсіз болды',
	'translate-magic-special' => 'Арнайы бет бүркемелері',
	'translate-magic-words' => 'Сиқыр сөздер',
	'translate-magic-skin' => 'Безендіру мәнері атаулары',
	'translate-magic-namespace' => 'Есім ая атаулары',
	'translationchanges' => 'Аударма өзгерістері',
	'translate-language' => 'Тілі:',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author Lovekhmer
 * @author Thearith
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'translate' => 'បកប្រែ',
	'translate-desc' => '[[Special:Translate|ទំព័រ​ពិសេស]] សម្រាប់ប្រែសម្រួល​មេឌាវិគី​ និង របស់​ផ្សេងទៀត',
	'translate-edit' => 'កែប្រែ',
	'translate-talk' => 'ពិភាក្សា',
	'translate-history' => 'ប្រវត្តិ',
	'translate-task-view' => 'មើល​គ្រប់សារពី',
	'translate-task-untranslated' => 'មើល​គ្រប់​សារដែល​មិនទាន់ប្រែសម្រួលពី',
	'translate-task-optional' => 'មើល​សារដែលបានជ្រើសរើសពី',
	'translate-task-untranslatedoptional' => 'មើល​​សារ​ជម្រើស​ដែល​មិនទាន់ប្រែសម្រួល​ពី',
	'translate-task-problematic' => 'មើលសារដែលមានបញ្ហា',
	'translate-task-review' => 'មើល​ឡើងវិញ​នូវបំលាស់ប្តូរ​នានា​ចំពោះ',
	'translate-task-reviewall' => 'មើល​ឡើងវិញ​បទប្រែសម្រួល​ទាំងអស់​ក្នុង',
	'translate-task-export' => 'នាំចេញ​បទប្រែសម្រួលពី',
	'translate-task-export-to-file' => 'នាំចេញបទប្រែសម្រួលជាឯកសារពី',
	'translate-task-export-as-po' => 'នាំចេញ​បទប្រែសម្រួល​ជា​ទម្រង់ អក្សរសុទ្ធ',
	'translate-task-export-to-xliff' => 'នាំចេញការប្រែសម្រួលក្នុងទម្រង់ជា Xliff',
	'translate-page-no-such-language' => 'ភាសាដែលបានសំដៅ គ្មានសុពលភាព ។',
	'translate-page-no-such-task' => 'កិច្ចការដែលបានសំដៅ គ្មានសុពលភាព ។',
	'translate-page-no-such-group' => 'ក្រុមដែលបានសំដៅ គ្មានសុពលភាព ។',
	'translate-page-disabled' => "ការបកប្រែសម្រាប់ភាសានេះក្នុងក្រុមនេះមិនត្រូវបានអនុញ្ញាតទេ។ មូលហេតុ:

''$1''",
	'translate-page-settings-legend' => 'ការកំណត់យក',
	'translate-page-task' => 'ខ្ញុំចង់',
	'translate-page-group' => 'ក្រុម',
	'translate-page-language' => 'ភាសា',
	'translate-page-limit' => 'កម្រិត',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|សារ}} ក្នុងមួយទំព័រ',
	'translate-submit' => 'នាំមក​បង្ហាញ',
	'translate-page-navigation-legend' => 'ទិសដៅ',
	'translate-page-showing' => 'កំពុងបង្ហាញ​សារ​តាមលំដាប់ ពី $1 ដល់ $2 នៃ $3 ។',
	'translate-page-showing-all' => 'កំពុងបង្ហាញ $1 {{PLURAL:$1|សារ}}។',
	'translate-page-showing-none' => 'មិនមានសារ​ត្រូវបង្ហាញទេ។',
	'translate-next' => 'ទំព័របន្ទាប់',
	'translate-prev' => 'ទំព័រមុន',
	'translate-page-description-legend' => 'ព័ត៌មាន​អំពី​ក្រុម',
	'translate-page-edit' => 'កែប្រែ',
	'translate-optional' => '(ជម្រើស)',
	'translate-ignored' => '(បានបោះបង់)',
	'translate-edit-definition' => 'និយមន័យ​របស់​សារ',
	'translate-edit-contribute' => 'រួមចំណែក',
	'translate-edit-no-information' => "''សារ​នេះ​មិន​មាន​ព័ត៌មាន​បន្ថែម​ទេ​។ ប្រសិនបើ​អ្នក​ដឹង​ពី​ទីកន្លែង និង​របៀប​ប្រើប្រាស់​សារ​នេះ អ្នក​អាច​ជួយ​អ្នក​បកប្រែ​ផ្សេងទៀត​តាមរយៈ​ការ​ដាក់​បន្ថែម​ព័ត៌មាន​ទាំងនោះ​មក​ឱ្យ​សារ​នេះ​។",
	'translate-edit-information' => 'ព័ត៌មាន​អំពី​សារនេះ ($1)',
	'translate-edit-in-other-languages' => 'សារ​ជាភាសា​ដទៃទៀត',
	'translate-edit-committed' => 'បទប្រែសម្រួល​បច្ចុប្បន្ន​ក្នុងផ្នែកទន់',
	'translate-edit-warnings' => 'ការព្រមាន​អំពី​បទប្រែសម្រួលមិនពេញលេញ',
	'translate-edit-goto-no-prev' => 'គ្មានសារមុនទេ',
	'translate-edit-goto-no-next' => 'គ្មានសារបន្ទាប់ទេ',
	'translate-edit-goto-prev' => 'កែប្រែសារមុន',
	'translate-edit-goto-next' => 'កែប្រែសារបន្ទាប់',
	'translate-edit-goto-list' => 'ត្រឡប់ទៅកាន់បញ្ជីវិញ',
	'translate-magic-pagename' => 'ការបកប្រែ​មេឌាវិគី​បន្ថែម',
	'translate-magic-help' => "អ្នកអាចប្រែសម្រួលឈ្មោះផ្សេងៗទៀតនៃទំព័រពិសេស ពាក្យទិព្វ ឈ្មោះសំបក និងឈ្មោះនៃលំហឈ្មោះ។


ឈ្មោះផ្សេងៗទៀតនៃទំព័រពិសេស​និង​ពាក្យទិព្វអាចមានបទប្រែសម្រួលច្រើន។

ការបកប្រែជាច្រើននោះត្រូវខណ្ឌដោយសញ្ញាក្បៀស(,)។

ឈ្មោះសំបកនិងលំហឈ្មោះអាចមានត្រឹមតែមួយបទប្រែសម្រួលប៉ុណ្ណោះ ។


ក្នុងការបកប្រែលំហឈ្មោះ <tt>ការពិភាក្សាអំពី$1</tt> ជាករណីពិសេស។ <tt>$1</tt> ត្រូវបានជំនួសដោយឈ្មោះវិបសាយ(ឧទាហរណ៍៖ <tt>ការពិភាក្សាអំពី{{SITENAME}}</tt>)។

ប្រសិនបើ​ភាសារបស់អ្នក​មិនបានបង្ហាញត្រឹមត្រូវដោយមិនប្តូរឈ្មោះវិបសាយទេ សូមទាក់ទងអ្នកអភិវឌ្ឍ(អ្នករចនាវិបសាយ)។


អ្នកចាំបាច់ត្រូវតែស្ថិតក្នុងក្រុមអ្នកប្រែសម្រួល ទើបអាចរក្សាទុកបំលាស់ប្តូរបាន។ បំលាស់ប្តូរនឹងមិនត្រូវបានរក្សាទុកទេ​លើកលែងតែអ្នកបានចុចប៊ូតុង'រក្សាទំព័រទុក'ខាងក្រោម ។",
	'translate-magic-module' => 'ម៉ូឌុល:',
	'translate-magic-submit' => 'នាំមក​បង្ហាញ',
	'translate-magic-cm-export' => 'នាំចេញ',
	'translate-magic-cm-to-be' => 'ទៅជា',
	'translate-magic-cm-current' => 'បច្ចុប្បន្ន',
	'translate-magic-cm-original' => 'ដើម',
	'translate-magic-cm-comment' => 'យោបល់៖',
	'translate-magic-cm-save' => 'រក្សាទុក',
	'translate-magic-cm-updatedusing' => 'បានបន្ទាន់សម័យ​ដោយប្រើប្រាស់ [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'រក្សាទុកមិនបានសម្រេច',
	'translate-magic-special' => 'ឈ្មោះផ្សេងទៀតនៃទំព័រពិសេស',
	'translate-magic-words' => 'ពាក្យទិព្វ',
	'translate-magic-skin' => 'ឈ្មោះសំបក',
	'translate-magic-namespace' => 'ឈ្មោះនៃលំហឈ្មោះ',
	'translationchanges' => 'បំលាស់ប្តូរនៃការបកប្រែ',
	'translationchanges-export' => 'នាំចេញ',
	'translationchanges-change' => '$1:$2 ដោយ $3',
	'translate-checks-parameters' => '{{PLURAL:$2|ប៉ារ៉ាម៉ែត្រ|ប៉ារ៉ាម៉ែត្រ}}ខាងក្រោមនេះមិនត្រូវបានគេប្រើទេ៖

<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|parameter is|ប៉ារ៉ាម៉ែត្រ}}ខាងក្រោមនេះមិនត្រូវបានស្គាល់ទេ៖
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'មាន{{PLURAL:$2|វង់ក្រចក|វង់ក្រចក}}​ដែលមិន​មាន​គូ៖

<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|តំណភ្ជាប់|តំណភ្ជាប់}}ខាងក្រោមនេះ​មានបញ្ហា៖ <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'សូម​ជំនួស​{{PLURAL:$2|tag|ប្លាក}}​ខាងក្រោមដោយប្លាកដែលត្រឹមត្រូវ៖

<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'និយមន័យ​ប្រើប្រាស់ <nowiki>{{PLURAL:}}</nowiki> ប៉ុន្តែ​បទប្រែសម្រួល​មិនមាន ។',
	'translate-checks-pagename' => 'លំហឈ្មោះ​ត្រូវ​បាន​ផ្លាស់ប្ដូរ​ពី​និយមន័យ',
	'right-translate' => 'កែប្រែដោយប្រើអន្តរមុខបកប្រែ',
	'translate-rc-translation-filter' => 'ការបកប្រែតម្រង៖',
	'translate-rc-translation-filter-no' => 'កុំធ្វើអ្វីទាំងអស់',
	'translate-rc-translation-filter-only' => 'បង្ហាញតែការបកប្រែប៉ុណ្ណោះ',
	'translationstats' => 'ស្ថិតិបកប្រែ',
	'translate-stats-edits' => 'ចំនួនកំណែប្រែក្នុងមួយថ្ងៃ',
	'translate-stats-users' => 'អ្នកបកប្រែ',
	'translate-statsf-options' => 'ជម្រើស​ក្រាហ្វិក',
	'translate-statsf-width' => 'ទទឹងគិតជាភីកសែល',
	'translate-statsf-height' => 'កម្ពស់គិតជាភីកសែល',
	'translate-statsf-days' => 'រយៈពេលគិតជាថ្ងៃ',
	'translate-statsf-scale-days' => 'ថ្ងៃ',
	'translate-statsf-scale-hours' => 'ម៉ោង',
	'translate-statsf-count' => 'វាស់',
	'translate-statsf-count-edits' => 'ចំនួនកំណែប្រែ',
	'translate-statsf-count-users' => 'អ្នកបកប្រែសកម្ម',
	'translate-statsf-submit' => 'ការមើលមុន',
	'translate-tag-category' => 'ទំព័រដែលអាចបកប្រែបាន',
	'translate-tag-page-desc' => 'ការបកប្រែរបស់ទំព័រវិគី [[:$1]]។',
	'translate-tag-translate-link-desc' => 'បកប្រែទំព័រនេះ',
	'translate-tag-legend' => 'ពាក្យតំណាង៖',
	'translate-tag-legend-fallback' => 'ការបកប្រែជាភាសាដទៃ',
	'translate-tag-legend-fuzzy' => 'ការបកប្រែហួសសម័យ',
	'translate-sidebar-alltrans' => 'បំណកប្រែផ្សេងទៀត',
	'translate-tag-noedit' => 'ទំព័រនេះជាទំព័របកប្រែដែលត្រូវបានបន្ទាន់សម័យដោយស្វ័យប្រវត្តិ។

អ្នកអាច [$1 កែប្រែទំព័រប្រភព] ឬ [$2 បន្ទាន់សម័យបំណកប្រែ]។',
	'translations' => 'បំណកប្រែទាំងអស់',
	'translate-translations-no-message' => '"$1" គឺជា​សារ​ដែល​មិនអាច​ប្រែសម្រួល​បាន',
	'translate-translations-none' => 'មិនមាន​ការបកប្រែ​សម្រាប់ "$1"',
	'translate-translations-fieldset-title' => 'កាប្រែសម្រួល​ទាំងអស់',
	'translate-translations-messagename' => 'សារ​៖',
	'languagestats' => 'ស្ថិតិ​ភាសា',
	'translate-language-code' => 'កូដភាសា',
	'translate-language-code-field-name' => 'កូដភាសា​៖',
	'translate-language' => 'ភាសា',
	'translate-total' => 'សារផ្សេងៗ',
	'translate-untranslated' => 'មិនបកប្រែ',
	'translate-percentage-complete' => 'ជាស្ថាពរ',
);

/** Korean (한국어)
 * @author Ficell
 * @author Kwj2772
 * @author ToePeu
 */
$messages['ko'] = array(
	'translate' => '번역하기',
	'translate-edit' => '편집',
	'translate-talk' => '토론',
	'translate-history' => '역사',
	'translate-task-view' => '모든 메시지를 보기',
	'translate-task-untranslated' => '번역되지 않은 모든 메시지 보기',
	'translate-task-problematic' => '문제가 있는 메시지 보기',
	'translate-page-disabled' => '이 그룹에서 이 언어로의 번역이 비활성화되어 있습니다. 이유:

$1',
	'translate-page-settings-legend' => '설정',
	'translate-page-language' => '언어',
	'translate-page-edit' => '편집',
	'translate-edit-contribute' => '편집하기',
	'translate-edit-no-information' => '이 메시지에 관한 도움말이 없습니다.
만약 이 메시지가 어디에 어떻게 사용되는지 알고 계시다면 도움말을 작성해주세요.',
	'translate-edit-information' => '이 메시지에 관한 도움말 ($1)',
	'translate-edit-goto-no-prev' => '이전 메시지가 없습니다.',
	'translate-edit-goto-no-next' => '다음 메시지가 없습니다.',
	'translate-edit-goto-prev' => '이전 메시지 수정',
	'translate-edit-goto-next' => '다음 메시지 수정',
	'translate-edit-goto-list' => '목록으로 돌아가기',
	'translate-magic-cm-save' => '저장',
	'translate-magic-skin' => '스킨 이름',
	'translate-magic-namespace' => '이름공간 이름',
	'right-translate' => '시스템 메시지를 번역',
	'translationstats' => '번역 통계',
	'translate-statsf-count-users' => '활동 중인 번역자',
	'translate-tag-translate-link-desc' => '이 문서 번역하기',
	'translate-tag-legend-fuzzy' => '오래 된 번역',
	'translate-sidebar-alltrans' => '다른 번역',
	'translations' => '모든 번역',
	'translate-translations-none' => '$1로 번역된 메시지가 없습니다.',
	'translate-translations-fieldset-title' => '모든 번역',
	'translate-translations-messagename' => '메시지:',
	'languagestats' => '언어별 통계',
	'translate-language-code' => '언어 부호',
	'translate-language-code-field-name' => '언어 부호:',
	'translate-suppress-complete' => '완전히 번역된 메시지 그룹을 숨기기',
	'translate-language' => '언어',
	'translate-total' => '메시지',
	'translate-untranslated' => '미번역',
	'translate-percentage-complete' => '완료',
	'translate-percentage-fuzzy' => '업데이트 필요',
);

/** Krio (Krio)
 * @author Jose77
 */
$messages['kri'] = array(
	'translate-edit' => 'chenj',
	'translate-history' => 'istri',
	'translate-page-edit' => 'chenj',
);

/** Kinaray-a (Kinaray-a)
 * @author Jose77
 */
$messages['krj'] = array(
	'translate-edit' => 'iislan',
	'translate-talk' => 'wakal',
	'translate-history' => 'Kasaysayan',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'translate' => 'Övversäze',
	'translate-desc' => '[[Special:Translate|Söndersigk]] för et Översäze fon MediaWiki sing Meldonge, un mieh',
	'translate-edit' => 'Änndere',
	'translate-talk' => 'Klaaf',
	'translate-history' => 'Versione',
	'translate-task-view' => 'Zeijsh all de Nohreschte fon',
	'translate-task-untranslated' => 'Zeijsh all de nit övversäzte Nohreschte fon',
	'translate-task-optional' => "Zeijsh all de 'nit esu nüüdijje' Nohreschte fon",
	'translate-task-problematic' => 'Zeijsh de probleemattesche Nohreschte fon',
	'translate-task-review' => 'Donn de Ännderonge prööfe fon',
	'translate-task-reviewall' => 'Donn de Övversäzzonge prööfe fon',
	'translate-task-export' => 'Donn de Övversäzzonge Äxpochteere fon',
	'translate-task-export-to-file' => 'Donn de Övversäzzonge en_en Datteij Äxpochteere, fon',
	'translate-task-export-as-po' => 'Donn de Övversäzzonge en et Jettäx Fommaat Äxpochteere, fon',
	'translate-task-export-to-xliff' => 'De Översetzunge em Xliff Fomaat äxpochteere, fon',
	'translate-page-no-such-language' => 'De aanjejoove Shprooch känne me nit.',
	'translate-page-no-such-task' => 'De aanjejoove Opjav känne me nit.',
	'translate-page-no-such-group' => 'De aanjejoove Jrop känne me nit.',
	'translate-page-disabled' => "Övversezonge sen affjeschalldt för di Jropp un Shprooch, weil:

''$1''",
	'translate-page-settings-legend' => 'Ennshtellonge',
	'translate-page-task' => 'Opjaav',
	'translate-page-group' => 'Jrupp',
	'translate-page-language' => 'Shprooch',
	'translate-page-limit' => 'Ömfang',
	'translate-page-limit-option' => '{{PLURAL:$1|Eijn Noherscht|$1 Nohreschte|Nix aan Nohreschte}} pro Sigk',
	'translate-submit' => 'Loß Jonn!',
	'translate-page-navigation-legend' => 'Aanzahl',
	'translate-page-showing' => 'De Nohreshte fon Nommer $1 aff, beß $2, fon ennßjesammp $3.',
	'translate-page-showing-all' => '{{PLURAL:$1|Eijn_Nohresch|$1 Nohreschte|Keijn_esu_e_Nohreschte}}.',
	'translate-page-showing-none' => 'Nix för Aan_ze_zeije.',
	'translate-next' => 'Näx Sigk',
	'translate-prev' => 'Förrije Sigk',
	'translate-page-description-legend' => 'Enfommazjohne övver di Jrop',
	'translate-page-edit' => 'Änndere',
	'translate-optional' => '(nit esu nüüdesch)',
	'translate-ignored' => '(övverjange)',
	'translate-edit-definition' => 'De Ojinaal Nohresch',
	'translate-edit-contribute' => 'beijdraare',
	'translate-edit-no-information' => "''Mer han kein Beschrievong oddo Dokementazjohn för dat Täxshtöck. Wann De weijß, wann un woh dit Shtöck jenou jebruch weed, dann kanns De de Anndere hellefe, un en Äklierong för_et ennjävve.''",
	'translate-edit-information' => 'Ennfommazjohne övver hee di Nohresch  ($1)',
	'translate-edit-in-other-languages' => 'Di Noresch in annder Shprooche',
	'translate-edit-committed' => 'Es aktowäll övversaz met',
	'translate-edit-warnings' => 'Warnonge wääje unkomplätte Övversäzonge',
	'translate-edit-goto-no-prev' => 'Keine Tëx doför',
	'translate-edit-goto-no-next' => 'Keine Tëx donoh',
	'translate-edit-goto-prev' => 'Dä Tëx doför zëije',
	'translate-edit-goto-next' => 'Dä Tëx donoh zëije',
	'translate-edit-goto-list' => 'Op de Lėß zoröckjonn',
	'translate-magic-pagename' => 'MediaWiki sing Extras övversäze',
	'translate-magic-help' => 'Hee kanns_De Zweijtname fö Söndersigge, Zauberwööter, Name för Ovverfläshe, un de Appachtemangname översäze.

Söndersigge ier Zweijtname, un de Zauberwööter könne mieh wi eijn Övversäzong han.
Dozwesche shteijt jeeweijls_e "," (Komma).
Ovverfläshename un de Name fö_de Appachtemangs könne nur eijn Övversätzong han.

Beij de Övversäzonge för de Appachtemangs ier Name hät „<tt>$1 talk</tt>“ ene shpezjälle Senn.
Dat „<tt>$1</tt>“ shteijt doh als enne Plazhallder för dä Projäkname (zem Beijshpöll dat „<tt>{{SITENAME}}</tt>“ en: „<tt>Övver {{SITENAME}} Klaafe</tt>“).
Wann Ding Shprooch ed nit heerjitt, dat_De ene grammatesch reschtejje Forrem henkreßß, ohne an dämm Projetname ändere zo mößße, dann donn ene Äntwecklor do drop aansäzze.

Do moß en de Jrop „Övversäzer“ sen, för hee Änderonge maache ze könne.
Änderongen weede ehts bem Klicke op dä Knopp förr_et Seschere faßjehallde.',
	'translate-magic-module' => 'Dat Modul:',
	'translate-magic-submit' => 'Loß jonn!',
	'translate-magic-cm-export' => 'Äxpocht aanfange',
	'translate-magic-cm-to-be' => 'Soll wääde',
	'translate-magic-cm-current' => 'Eß jäz',
	'translate-magic-cm-original' => 'Orrijinaal',
	'translate-magic-cm-comment' => 'Koot zesamme jefaß, Quell',
	'translate-magic-cm-save' => 'Seschere',
	'translate-magic-cm-updatedusing' => 'Övver [[Special:Magic]] jeänndert.',
	'translate-magic-cm-savefailed' => 'Et Seschere eß donäve jejange',
	'translate-magic-special' => 'Zweijtname för Söndersigge',
	'translate-magic-words' => 'Zauberwööter',
	'translate-magic-skin' => 'Name för Ovverfläshe',
	'translate-magic-namespace' => 'Appachtemang_Name',
	'translationchanges' => 'Neu Övversäzonge',
	'translationchanges-export' => 'Äxpochteere',
	'translationchanges-change' => '$1: $2 fum $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Dä Parrammeeter hee eß|Di Parrammeetere hee sen|dat Jedrißße hee iß}} nit jebruch woode: <strong>$1</strong>',
	'translate-checks-parameters-unknown' => 'Hee {{PLURAL:$2|dä Parrammeeter|di Parrammeetere|dat Jedrißße}} kënne mer nit:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Do {{PLURAL:$2|jëijd_en Klammer nit op odder|jonn ongerscheedlish fill Klammere op un|eß Dreß}} zoh: <strong>$1</strong>',
	'translate-checks-links' => 'Hee {{PLURAL:$2|dä Lengk eß|di Lengks senn|dat Jedrißße}} problemattesch: <strong>$1</strong>',
	'translate-checks-xhtml' => 'Donn hee {{PLURAL:$2|dat Kommando|di Kommandose|dat Jedrißße}} ußtuusche, un schriif de reschtije do för hen: <strong>$1</strong>',
	'translate-checks-plural' => 'De Ojjinaal-Nohresch bruch <nowiki>{{PLURAL:}}</nowiki>, ävver de Övversäzong deijt dat nit?',
	'translate-checks-pagename' => 'Dat Appachtemang es anders wi em ojinaal Tex',
	'tog-translate-nonewsletter' => 'Donn mer keijn Rondschriive övver de eläktronesche Poß scheke (nor för Medmaacher med beschtäteschte Addräß för de e-mail)',
	'right-translate' => 'Med dä Schnettshtäll zom Övverseze ärrbeide',
	'translate-rc-translation-filter' => 'Övversëzonge:',
	'translate-rc-translation-filter-no' => 'Alles aanzeije',
	'translate-rc-translation-filter-only' => 'Don noor de Övversëzonge zëije',
	'translate-rc-translation-filter-filter' => 'Don de Övversëzonge fott lohße',
	'translate-rc-translation-filter-site' => 'Nor de Änderonge för hee dat Wiki',
	'translationstats' => 'Statistike fun de Övversäzunge',
	'translate-stats-edits' => 'Änderunge pro Daach',
	'translate-stats-users' => 'Övversäzer',
	'translate-statsf-intro' => 'Hee met kanns de eifach Övverseeschte un Statistike maache. All de Zahl sen noh bovve un onge bejrenz.',
	'translate-statsf-options' => 'Enstellunge för et Zeischne',
	'translate-statsf-width' => 'De Breed in Pixelle',
	'translate-statsf-height' => 'De Hühde in Pixelle',
	'translate-statsf-days' => 'De Duur en Daare',
	'translate-statsf-scale' => 'De Jenouschkeit udder Oplösung',
	'translate-statsf-scale-days' => 'Dare',
	'translate-statsf-scale-hours' => 'Stunde',
	'translate-statsf-count' => 'Der Maßschtab',
	'translate-statsf-count-edits' => 'Aanzahl fun Änderunge',
	'translate-statsf-count-users' => 'Aktive Övversezer',
	'translate-statsf-language' => 'En Leß fun Köözelle för Shprooche, met Kommas dozwesche',
	'translate-statsf-group' => 'En Leß fun Köözelle för Jroppe, met Kommas dozwesche',
	'translate-statsf-submit' => 'Vör-Ansich',
	'translate-tag-category' => 'Sigge, di mer övversäze kann',
	'translate-tag-page-desc' => 'Övversäzung fun de Sigg „[[:$1]]“ em Wikki.',
	'translate-tag-translate-link-desc' => 'Don di Sigg hee övversäze',
	'translate-tag-legend' => 'Lejend:',
	'translate-tag-legend-fallback' => 'Översäzung en en ander Shproch',
	'translate-tag-legend-fuzzy' => 'Ahl Övversäzung',
	'translate-tag-fuzzy-comment' => 'Dä ojinaal-Tex wood fum „[[User:$1|$1]]“ verändert met de Version $2.',
	'translate-tag-fuzzy-reason' => 'Dä ojinaal-Tex wood fum „$1“ verändert met de Version $2 fum MediaWiki, met dämm Kommentaa: "$3"',
	'translate-sidebar-alltrans' => 'Ander Övversäzunge',
	'translate-tag-noedit' => 'Die Sigg es en Övversäzongß_Sigg, die automattejj_op der neuste Shtant jebraat weed.
Do kanns de [$1 Ojinaal-Sigg ändere] ov de [$2 Övversäzong op der neuste Shtand bränge].',
);

/** Latin (Latina)
 * @author SPQRobin
 */
$messages['la'] = array(
	'translate' => 'Traducere',
	'translate-edit' => 'recensere',
	'translate-talk' => 'disputatio',
	'translate-history' => 'historia',
	'translate-next' => 'Pagina proxima',
	'translate-prev' => 'Pagina superior',
	'translate-magic-cm-save' => 'Servare',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'translate' => 'Iwwersetzt',
	'translate-desc' => "[[Special:Translate|Spezialsäit]] fir d'Iwwersetzung vu MediaWiki-Systemmessagen a fir Aneres",
	'translate-edit' => 'änneren',
	'translate-talk' => 'Diskussioun',
	'translate-history' => 'Versiounen',
	'translate-task-view' => 'All Systemmessagen uweisen',
	'translate-task-untranslated' => 'All net iwwersate Systemmessagen uweisen',
	'translate-task-optional' => 'Optional Messagen uweisen',
	'translate-task-untranslatedoptional' => 'Weis déi net-iwwersaten optional Systemmessagen vu(n)',
	'translate-task-problematic' => 'Systemmessage weisen wou et Problemer gëtt',
	'translate-task-review' => 'Ännerungen uweisen',
	'translate-task-reviewall' => 'All Iwwersetzungen nokucken',
	'translate-task-export' => 'All Iwwersetzunge exportéieren',
	'translate-task-export-to-file' => "D'Iwwersetzung an e Fichier exportéieren",
	'translate-task-export-as-po' => "Iwwersetzung an de ''Gettext Format'' exportéieren",
	'translate-task-export-to-xliff' => 'Iwwersetzungen an den Xliff-Format exportéieren',
	'translate-page-no-such-language' => 'Ongëltege Sproochcode benotzt',
	'translate-page-no-such-task' => 'Déi gefroten Aufgab gëtt et net.',
	'translate-page-no-such-group' => 'Déi Gefrote Grupp gëtt et net.',
	'translate-page-disabled' => "Iwwersetzungen an dës Sprooch goufen an dësem Grupp ausgeschalt. Grond:

''$1''",
	'translate-page-settings-legend' => 'Astellungen',
	'translate-page-task' => 'Ech wëll',
	'translate-page-group' => 'Grupp',
	'translate-page-language' => 'Sprooch',
	'translate-page-limit' => 'Maximum',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|Message|Message}} pro Säit',
	'translate-submit' => 'Uweisen',
	'translate-page-navigation-legend' => 'Navigatioun',
	'translate-page-showing' => "D'Message vun $1 bis $2 vun am Ganzen $3 gi gewisen.",
	'translate-page-showing-all' => '$1 {{PLURAL:$1|Message gëtt|Message gi}} gewisen',
	'translate-page-showing-none' => 'Kee Message fir ze weisen',
	'translate-next' => 'Nächst Säit',
	'translate-prev' => 'Säit virdrun',
	'translate-page-description-legend' => 'Informatiounen iwwert de Grupp',
	'translate-page-edit' => 'änneren',
	'translate-optional' => '(optional)',
	'translate-ignored' => '(ignoréiert)',
	'translate-edit-definition' => 'Definitioun vum Message',
	'translate-edit-contribute' => 'mathëllefen',
	'translate-edit-no-information' => 'Dëse Message huet keng Dokumentatioun. Wann Dir wësst wou oder wéi dëse Message gebraucht gëtt, da kënnt Dir aneren Iwwersetzer hëllefen an dem dir Informatiounen iwwert dëse Message gitt.',
	'translate-edit-information' => 'Informatioun iwwert dëse Message ($1)',
	'translate-edit-in-other-languages' => 'Message an anere Sproochen',
	'translate-edit-committed' => 'Aktuell Iwwersetzung an der Software',
	'translate-edit-warnings' => 'Warnunge virun onkompletten Iwwersetzungen',
	'translate-edit-goto-no-prev' => 'Kee virege Message',
	'translate-edit-goto-no-next' => 'Keen nächste Message',
	'translate-edit-goto-prev' => 'Virege Message änneren',
	'translate-edit-goto-next' => 'Nächste Message änneren',
	'translate-edit-goto-list' => "Zréck op d'Lëscht",
	'translate-magic-pagename' => 'Erweidert MediaWiki Iwwersetzung',
	'translate-magic-help' => "Dir kënnt Spezialsäiten, magesch Wierder, Nimm vu Skins an Nummraum Nimm iwwersetzen.

Spezial Säit ''Aliasen'' a ''magesch Wierder'' kënne méi Iwwersetzungen hunn.
Iwwersetzungen gi mat engem Komma (,) getrennt.
Skin Nimm a Nummraim kënne nëmmen eng Iwwersetzung hunn.

Am Nummraum Iwwersetzungen ass <tt>$1 Diskussioun</tt> speziell. <tt>$1</tt> gëtt duerch ''sitename'' ersat (zum Beispill <tt>{{SITENAME}} Diskussioun</tt>).
Wann et an ärer Sprooch net méiglech ass fir e gëltegen Ausdrock ze maachen ouni ''sitename'' z'änneren, da kontaktéiert w.e.g. en Entwéckler (developer).

Dir musst am Grupp vun den Iwwersetzer si fir Ännerungen ofspäicheren ze kënnen.
Ännerunge ginn net gespäichert bis Dir de knäppchen hei ënndrënner geklickt hutt.",
	'translate-magic-module' => 'Modul:',
	'translate-magic-submit' => 'Weisen',
	'translate-magic-cm-export' => 'Export',
	'translate-magic-cm-to-be' => 'Gëtt',
	'translate-magic-cm-current' => 'Aktuell',
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-comment' => 'Bemierkung:',
	'translate-magic-cm-save' => 'Späicheren',
	'translate-magic-cm-updatedusing' => 'Geännert ma Hëllef vu [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Späicheren huet net fonktionéiert',
	'translate-magic-special' => "Spezialsäit vun den 'Aliasnimm'",
	'translate-magic-words' => 'Magesch Wierder',
	'translate-magic-skin' => 'Numm vum Interface (Skin)',
	'translate-magic-namespace' => 'Nummraum Nimm',
	'translationchanges' => 'Iwwersetzung ännert',
	'translationchanges-export' => 'exportéieren',
	'translationchanges-change' => '$1: $2 vun $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Dëse Parameter gëtt|Dës Parameter ginn}} net benotzt:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Dëse Parameter ass|Dës Parameter sinn }} onbekannt:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Et gëtt eng ongerued Zuel vu {{PLURAL:$2|Klammere|Klammere}} benotzt:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Dëse Link ass|Dës Linke si}} problematesch:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Ersetzt {{PLURAL:$2|dësen Tag|dës Tagen}} w.e.g. duerch déi korrekt:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => "D'Definitioun benotzt <nowiki>{{PLURAL:}}</nowiki> awer d'Iwwersetzung mécht dat net.",
	'translate-checks-pagename' => "Nummraum geännert duerch d'Definitioun",
	'translate-checks-format' => 'Dës Iwwersetzung translation entsprecht net der Definitioun oder huet eng Syntax déi net gëlteg ass: $1',
	'tog-translate-nonewsletter' => 'Schéckt mir keng E-Mail-Newsletter. (nëmme relevant fir Benotzer mat enger confirméierter e-Mailadress)',
	'right-translate' => 'Mat dem Iwwersetzungs Tool änneren',
	'translate-rc-translation-filter' => 'Iwwersetzunge filteren:',
	'translate-rc-translation-filter-no' => 'Näischt maachen',
	'translate-rc-translation-filter-only' => 'Nëmmen Iwwersetzunge weisen',
	'translate-rc-translation-filter-filter' => 'Iwwersetzunge filteren',
	'translate-rc-translation-filter-site' => 'Nëmmen Ännerunge vu Messagen vum Site',
	'translationstats' => 'Statistike vun der Iwwersetzung',
	'translate-stats-edits' => 'Ännerunge pro Dag',
	'translate-stats-users' => 'Iwwersetzer',
	'translate-statsf-intro' => 'Dir kënnt einfach Statistike mat dësem Formulaire generéieren. All Werter hunn eng enescht an eng iewescht Limit.',
	'translate-statsf-options' => 'Optioune vum Graphique',
	'translate-statsf-width' => 'Breet a Pixelen',
	'translate-statsf-height' => 'Héicht a Pixelen',
	'translate-statsf-days' => 'Zäitraum an Deeg',
	'translate-statsf-scale' => 'Granularitéit',
	'translate-statsf-scale-days' => 'Deeg',
	'translate-statsf-scale-hours' => 'Stonnen',
	'translate-statsf-count' => 'Mooss',
	'translate-statsf-count-edits' => 'Zuel vun den Ännerungen',
	'translate-statsf-count-users' => 'Aktiv Iwwersetzer',
	'translate-statsf-language' => 'Komma-getrennte Lëscht vun de Sproochcoden',
	'translate-statsf-group' => 'Komma-getrennte Lëscht vun de Gruppecoden',
	'translate-statsf-submit' => 'Kucken ouni ofzespäicheren',
	'translate-tag-category' => 'Sàiten déi iwwersat kënne ginn',
	'translate-tag-page-desc' => 'Iwwersetzung vun der Wiki-Säit [[:$1]].',
	'translate-tag-translate-link-desc' => 'Dës Säit iwwersetzen',
	'translate-tag-legend' => 'Erklärung:',
	'translate-tag-legend-fallback' => 'Iwwersetzung an aner Sproochen',
	'translate-tag-legend-fuzzy' => 'Iwwerlieften Iwwersetzung',
	'translate-tag-fuzzy-comment' => 'Definitioun déi vum [[User:$1|$1]] an der Versioun $2 geännert gouf.',
	'translate-tag-fuzzy-reason' => 'Definitioun gouf vum "$1" mat der Bemierkung "$3" an $2 geännert.',
	'translate-sidebar-alltrans' => 'Aner Iwwersetzungen',
	'translate-tag-noedit' => "Dës Säit ass een Iwwersetzungs-Dokument dat automatesch aktualiséiert gëtt.
Dir kënnt [$1 d'Original Säit änneren] oder [$2 d'Iwwersetzung aktualiséieren].",
	'translations' => 'All Iwwersetzungen',
	'translations-summary' => 'Gitt w.e.g. en Numm vun engem Message hei ënnendrënner an fir all disponibel Iwwersetzungen ze weisen.',
	'translate-translations-no-message' => '"$1" ass kee Message den iwwersat ka ginn',
	'translate-translations-none' => 'Et gëtt keng Iwwersetzunge fir "$1"',
	'translate-translations-fieldset-title' => 'All Iwwersetzungen',
	'translate-translations-messagename' => 'Message:',
	'translate-translations-including-no-param' => 'Gitt w.e.g. e gëltege Säitennumm beim Parameter vun der Ënnersäit unn',
	'languagestats' => 'Sproochstatistiken',
	'languagestats-summary' => "Dës Säit weist d'Statistike vun der Iwwersetzung fir all ([[MediaWiki:Translate-languagestats-groups|agestallte]]) Gruppe vu Message fir eng Sprooch.",
	'translate-language-code' => 'Sproochecode',
	'translate-language-code-field-name' => 'Sproochecode:',
	'translate-suppress-complete' => 'Gruppe vu Messagen. déi komplett iwwersat sinn, net weisen',
	'translate-language' => 'Sprooch',
	'translate-total' => 'Messagen',
	'translate-untranslated' => 'Net iwwersat',
	'translate-percentage-complete' => 'Fäerdeg zu',
	'translate-percentage-fuzzy' => 'Net à jour',
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 * @author Pahles
 */
$messages['li'] = array(
	'translate' => 'Vertale',
	'translate-edit' => 'bewèrk',
	'translate-talk' => 'euverlèk',
	'translate-history' => 'gesjiedenis',
	'translate-task-view' => 'Laot alle berichter zeen van',
	'translate-task-untranslated' => 'Laot alle onvertaolde berichte zeen van',
	'translate-task-optional' => 'optioneel berich bekieke',
	'translate-task-review' => 'verangeringe kontrolere',
	'translate-task-reviewall' => 'alle vertalinge kontrolere',
	'translate-task-export' => 'vertaolinge exportere',
	'translate-task-export-to-file' => 'vertaolinge nao bestand exportere',
	'translate-task-export-as-po' => 'vertaolinge nao Gettext-formaat exportere',
	'translate-page-task' => 'Ich wil',
	'translate-page-group' => 'Groep',
	'translate-page-language' => 'Taal',
	'translate-page-limit' => 'Maximaal',
	'translate-submit' => 'Ophaole',
	'translate-next' => 'Volgende pazjena',
	'translate-prev' => 'Veurige pazjena',
	'translate-optional' => '(optioneel)',
	'translationchanges-export' => 'exportere',
);

/** Lao (ລາວ)
 * @author Passawuth
 */
$messages['lo'] = array(
	'translate' => 'ແປ',
	'translate-desc' => '[[Special:Translate|ໜ້າພິເສດ]]ສຳຫຼັບແປມີເດຍວິກິແລະອື່ນ າ',
);

/** Lithuanian (Lietuvių)
 * @author Garas
 * @author Vpovilaitis
 */
$messages['lt'] = array(
	'translate' => 'Vertimas',
	'translate-edit' => 'redaguoti',
	'translate-talk' => 'aptarimas',
	'translate-history' => 'istorija',
	'translate-task-view' => 'Pažiūrėti visus pranešimus iš',
	'translate-task-untranslated' => 'Pažiūrėti visus neišverstus pranešimus iš',
	'translate-task-optional' => 'Pažiūrėti nebūtinus pranešimus iš',
	'translate-task-review' => 'Peržiūrėti pakeitimus iš',
	'translate-task-reviewall' => 'Peržiūrėti visus vertimus iš',
	'translate-task-export' => 'Eksportuoti vertimus iš',
	'translate-task-export-to-file' => 'Eksportuoti į failą vertimus iš',
	'translate-task-export-as-po' => 'Eksportuoti vertimą Gettext formatu',
	'translate-page-no-such-language' => 'Buvo nurodytas klaidingas kalbos kodas',
	'translate-page-settings-legend' => 'Nustatymai',
	'translate-page-task' => 'Aš noriu',
	'translate-page-group' => 'Grupė',
	'translate-page-language' => 'Kalba',
	'translate-page-limit' => 'Limitas',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|pranešimas|pranešimai|pranešimų}} puslapyje',
	'translate-submit' => 'Išrinkti',
	'translate-page-navigation-legend' => 'Navigacija',
	'translate-page-showing' => 'Rodomi pranešimai nuo $1 iki $2 iš $3.',
	'translate-page-showing-all' => '{{PLURAL:$1|Rodomas $1 pranešimas|Rodomi $1 pranešimai|Rodoma $1 pranešimų}}.',
	'translate-page-showing-none' => 'Nėra pranešimų rodymui.',
	'translate-next' => 'Kitas puslapis',
	'translate-prev' => 'Ankstesnis puslapis',
	'translate-page-description-legend' => 'Informacija apie grupę',
	'translate-optional' => '(nebūtinas)',
	'translate-ignored' => '(ignoruojamas)',
	'translate-edit-definition' => 'Pranešimo aprašymas',
	'translate-edit-contribute' => 'papildyti',
	'translate-edit-no-information' => "''Šis pranešimas dar neturi dokumentacijos. Jei žinote kur ar kaip šis pranešimas naudojamas, jūs galite padėti kitiems vertėjams pridėdami dokumentacijos į šį pranešimą.''",
	'translate-edit-information' => 'Informacija apie šį pranešimą ($1)',
	'translate-magic-pagename' => 'MediaWiki išplėtimų vertimas',
	'translate-magic-help' => 'Jūs galite išversti specialių puslapių pavadinimus, magiškus žodžius, apvalkalų pavadinimus ir vardų sričių pavadinimus.

Magiško žodžio vertimuose nurodykite ir vertimą į anglų kalbą, kitaip jis nustos veikti. Taip pat palikite pirmąjį elementą (0 arba 1) tokį koks jis yra.

Specialiojo puslapio pavadinimo ir magiško žodžio vertimai gali būti keli. Vertimai yra skiriami kableliu (,). Apvalkalo ir vardų srities pavadinimas gali turėti tik vieną vertimą.

Vardų sričių vertimuose <tt>$1 aptarimas</tt> yra specialus. <tt>$1</tt> yra pakeičiamas svetainės pavadinimu (Pavyzdžiui <tt>{{SITENAME}} aptarimas</tt>). Jei nėra galimybės Jūsų kalboje suformuoti teisingos išraiškos su svetainės pavadinimo pakeitimu, prašome kreiptis į kūrėjus.

Jūs turite priklausyti vertėjų grupei, kad galėtumėte išsaugoti pakeitimus. Pakeitimai nebus išsaugoti iki Jūs nuspausite išsaugojimo butoną apačioje.',
	'translate-magic-submit' => 'Išrinkti',
	'translate-magic-cm-export' => 'Eksportuoti',
	'translate-magic-cm-to-be' => 'Turi būti',
	'translate-magic-cm-current' => 'Einamasis',
	'translate-magic-cm-original' => 'Originalas',
	'translate-magic-cm-save' => 'Išsaugoti',
	'translate-magic-cm-updatedusing' => 'Atnaujintas, naudojant [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Nepavyko išsaugoti',
	'translate-magic-special' => 'Specialių puslapių pavadinimai',
	'translate-magic-words' => 'Magiški žodžiai',
	'translate-magic-skin' => 'Apvalkalų pavadinimai',
	'translate-magic-namespace' => 'Vardų srities pavadinimai',
	'translationchanges' => 'Vertimo pakeitimai',
	'translationchanges-export' => 'eksportuoti',
	'translationchanges-change' => '$1: $2 pagal $3',
	'translate-checks-parameters' => 'Šie parametrai nepanaudoti: <strong>$1</strong>',
	'translate-checks-plural' => 'Aprašymas naudoja <nowiki>{{PLURAL:}}</nowiki>, bet vertimas ne.',
);

/** Latvian (Latviešu)
 * @author Yyy
 */
$messages['lv'] = array(
	'translate-next' => 'Nākamā lapa',
	'translate-prev' => 'Iepriekšējā lapa',
);

/** Eastern Mari (Олык Марий)
 * @author Сай
 */
$messages['mhr'] = array(
	'translate-talk' => 'каҥашымаш',
	'translate-history' => 'историй',
	'translate-next' => 'Вес лаштык',
	'translate-prev' => 'Ончычсо лаштык',
	'translate-magic-cm-save' => 'Аралаш',
	'tog-translate-nonewsletter' => 'Увер бюллетеньым электрон почто дене мылам колташ огыл (ушнышо-влаклан тергыме электрон почто адресышт дене гына)',
);

/** Macedonian (Македонски)
 * @author Brest
 * @author Brest2008
 */
$messages['mk'] = array(
	'translate' => 'Преведи',
	'translate-desc' => '[[Special:Translate|Специјална страница]] за преведување на MediaWiki и други пораки',
	'translate-edit' => 'уреди',
	'translate-talk' => 'разговор',
	'translate-history' => 'историја',
	'translate-task-view' => 'Преглед на сите пораки',
	'translate-task-untranslated' => 'Преглед на сите непреведени пораки',
	'translate-task-optional' => 'Преглед на опциони пораки',
	'translate-task-problematic' => 'Преглед на пораки кои имаат некој проблем',
	'translate-task-review' => 'Преглед на промени',
	'translate-task-reviewall' => 'Преглед на сите преведени пораки',
	'translate-task-export' => 'Извоз на преводи од',
	'translate-task-export-to-file' => 'Извоз на превод во податотека од',
	'translate-task-export-as-po' => 'Извоз на превод во Gettext формат',
	'translate-task-export-to-xliff' => 'Извоз на превод во Xliff формат',
	'translate-page-no-such-language' => 'Наведениот јазик е погрешен',
	'translate-page-no-such-task' => 'Наведената задача е погрешна',
	'translate-page-no-such-group' => 'Погрешно наведена група',
	'translate-page-disabled' => "Преведувањето на овој јазик во оваа група е оневозможено. Причина:

''$1''",
	'translate-page-settings-legend' => 'Нагодувања',
	'translate-page-task' => 'Сакам да направам',
	'translate-page-group' => 'Група',
	'translate-page-language' => 'Јазик',
	'translate-page-limit' => 'Ограничување',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|порака|пораки}} по страница',
	'translate-submit' => 'Филтрирај',
	'translate-page-navigation-legend' => 'Навигација',
	'translate-page-showing' => 'Прикажување на пораки од $1 до $2 од $3',
	'translate-page-showing-all' => 'Приказ на $1 {{PLURAL:$1|порака|пораки}}.',
	'translate-page-showing-none' => 'Нема пораки за прикажување',
	'translate-page-paging-links' => '[ $1 ] [ $2 ]',
	'translate-next' => 'Следна страница',
	'translate-prev' => 'Претходна страница',
	'translate-page-description-legend' => 'Информации во врска со групата',
	'translate-page-edit' => 'уреди',
	'translate-optional' => '(опционо)',
	'translate-ignored' => '(игнорирано)',
	'translate-edit-definition' => 'Дефиниција на порака',
	'translate-edit-contribute' => 'придонес',
	'translate-edit-no-information' => "''Оваа порака нема опис, не е документирана.
Ако знаете каде и како оваа порака била користена, може да помогнете на другите преведувачи да додадат опис на оваа порака.''",
	'translate-edit-information' => 'Информација за оваа порака ($1)',
	'translate-edit-in-other-languages' => 'Пораката на други јазици',
	'translate-edit-committed' => 'Актуелен превод во софтверот',
	'translate-edit-warnings' => 'Предупредувања во врска со некомплетни преводи',
	'translate-edit-goto-no-prev' => 'Нема претходна порака',
	'translate-edit-goto-no-next' => 'Нема следна порака',
	'translate-edit-goto-prev' => 'Уреди претходна порака',
	'translate-edit-goto-next' => 'Уреди следна порака',
	'translate-edit-goto-list' => 'Прикажи листа на пораки',
	'translate-magic-pagename' => 'Превод на MediaWiki проширувања',
	'translate-magic-help' => "Можете да ги преведете алијасите на специјалните страници, магичните зборови, називите на маските и називите на именските простори.

Алијасите на специјалните сраници и магичните зборови може да имаат повеќе преводи.
Преводите се одделени со запирка (,).
Називите на маските и именските простори имаат само еден превод.

Преведувањето на <tt>Разговор за $1</tt> кај именски простор е специфично. <tt>$1</tt> се заменува со името на сајтот (пример <tt>Разговор за {{SITENAME}} </tt>).
Ако не е можно во вашиот јазик да формирате валиден израз без промена на името на сајтот, ве молиме контактирајте со развивачите на софтверот.

Потребно е да припаѓате на групата преведувачи и да ги зачувате измените.
Измените нема да бидат зачувани без да притиснете на копчето '''зачувај''', прикажано подолу после просторот за уредување.",
	'translate-magic-module' => 'Модул:',
	'translate-magic-submit' => 'Филтрирај',
	'translate-magic-cm-export' => 'Извоз',
	'translate-magic-cm-to-be' => 'Нека биде',
	'translate-magic-cm-current' => 'Тековен',
	'translate-magic-cm-original' => 'Оригинален',
	'translate-magic-cm-comment' => 'Коментар:',
	'translate-magic-cm-save' => 'Зачувај',
	'translate-magic-cm-updatedusing' => 'Ажурирано со помош на [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Неуспешно зачувување',
	'translate-magic-special' => 'Алијаси на специјална страница',
	'translate-magic-words' => 'Магични зборови',
	'translate-magic-skin' => 'Назив на маска',
	'translate-magic-namespace' => 'Називи на именски простор',
	'translationchanges' => 'Промени на превод',
	'translationchanges-export' => 'извоз',
	'translationchanges-change' => '$1: $2 од $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Следниов параметар не се користи|Следниве параметри се користат}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Следниов параметар е непознат|Следниве параметри се непознати}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Непарен број на загради, {{PLURAL:$2|заграда|загради}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Следната врска е|Следните $2 врски се}} проблематични:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Заменете {{PLURAL:$2|го следниов приврзок со коректен|ги следниве приврзоци со коректни}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Дефиницијата користи <nowiki>{{PLURAL:}}</nowiki> но преводот не.',
	'translate-checks-pagename' => 'Именски простор променет од дефиницијата',
	'translate-checks-format' => 'Овој превод не ја следи дефиницијата или има неправилна синтакса: $1',
	'tog-translate-nonewsletter' => 'Не праќај по е-пошта новини (кои се релевантни само за корисници со потврдена е-поштенска адреса)',
	'right-translate' => 'Уредување со користење на интерфејсот за преведување',
	'translate-rc-translation-filter' => 'Филтрирање на преводи:',
	'translate-rc-translation-filter-no' => 'Не прави ништо',
	'translate-rc-translation-filter-only' => 'Прикажи само преводи',
	'translate-rc-translation-filter-filter' => 'Филтрирај преводи',
	'translate-rc-translation-filter-site' => 'Changes to site messages only',
	'translationstats' => 'Статистики на преведување',
	'translate-stats-edits' => 'Уредувања',
	'translate-stats-users' => 'Преведувачи',
	'translate-statsf-intro' => 'Може да генерирате едноставни статистики со помош на оваа форма. Сите вредности имаат максимални и минимални граници.',
	'translate-statsf-options' => 'Опции за графиконот',
	'translate-statsf-width' => 'Ширина во пиксели',
	'translate-statsf-height' => 'Висина во пиксели',
	'translate-statsf-days' => 'Временски период во денови',
	'translate-statsf-scale' => 'Грануларност',
	'translate-statsf-scale-days' => 'Денови',
	'translate-statsf-scale-hours' => 'Часови',
	'translate-statsf-count' => 'Мерка',
	'translate-statsf-count-edits' => 'Број на уредувања',
	'translate-statsf-count-users' => 'Активни преведувачи',
	'translate-statsf-language' => 'Листа на јазични кодови, одвоени со запирка',
	'translate-statsf-group' => 'Листа на група на кодови, одвоени со запирка',
	'translate-statsf-submit' => 'Преглед',
	'translate-tag-category' => 'Преводливи страници',
	'translate-tag-page-desc' => 'Превод на вики страницата [[:$1]]',
	'translate-tag-translate-link-desc' => 'Преведи ја оваа страница',
	'translate-tag-legend' => 'Легенда:',
	'translate-tag-legend-fallback' => 'Превод на друг јазик',
	'translate-tag-legend-fuzzy' => 'Стар превод',
	'translate-tag-fuzzy-comment' => 'Дефиницијата променета од страна на [[User:$1|$1]] во ревизија $2.',
	'translate-tag-fuzzy-reason' => 'Дефиницијата променета од "$1" со коментар "$3" во $2.',
	'translate-sidebar-alltrans' => 'Други преводи',
	'translate-tag-noedit' => 'Оваа страница е автоматски ажуирана страница за превод.
Можете [$1 да ја уредувате изворната страница] или [$2 да го ажурирате преводот]',
	'translations' => 'Сите преводи',
	'translations-summary' => 'Подолу внеси име на порака за приказ на сите достапни преводи.',
	'translate-translations-no-message' => '"$1" не е порака која се преведува',
	'translate-translations-none' => 'Нема преводи за "$1"',
	'translate-translations-fieldset-title' => 'Сите преводи',
	'translate-translations-messagename' => 'Порака:',
	'translate-translations-including-no-param' => 'Наведете валидно име на страница во параметарот за подстраница',
	'languagestats' => 'Статистики за јазик',
	'languagestats-summary' => 'Оваа страница прикажува статистики на превод за сите ([[MediaWiki:Translate-languagestats-groups|конфигурирани]]) групи на пораки за одреден јазик.',
	'translate-language-code' => 'Код на јазик',
	'translate-language-code-field-name' => 'Код на јазик:',
	'translate-suppress-complete' => 'Сокриј комплетно преведени групи на пораки',
	'translate-language' => 'Јазик',
	'translate-total' => 'Пораки',
	'translate-untranslated' => 'Непреведени',
	'translate-percentage-complete' => 'Комплетираност',
	'translate-percentage-fuzzy' => 'Застарени',
);

/** Malayalam (മലയാളം)
 * @author Jacob.jose
 * @author Shijualex
 */
$messages['ml'] = array(
	'translate' => 'വിവര്‍ത്തനം ചെയ്യുക',
	'translate-edit' => 'തിരുത്തുക',
	'translate-talk' => 'സം‌വാദം',
	'translate-history' => 'നാള്‍വഴി',
	'translate-task-view' => 'എല്ലാ സന്ദേശങ്ങളും കാണണം',
	'translate-task-untranslated' => 'പരിഭാഷപ്പെടുത്തിയിട്ടില്ലാത്ത സന്ദേശങ്ങള്‍ കാണണം',
	'translate-task-optional' => 'പരിഭാഷ നിര്‍ബന്ധമില്ലാത്തെ സന്ദേശങ്ങള്‍ കാണണം',
	'translate-task-review' => 'മാറ്റങ്ങള്‍ വന്ന സന്ദേശങ്ങള്‍ കാണണം',
	'translate-task-reviewall' => 'പരിഭാഷ ചെയ്തവ സംശോധനം ചെയ്യണം',
	'translate-page-no-such-language' => 'തിരഞ്ഞെടുത്ത ഭാഷ അസാധുവാണ്‌.',
	'translate-page-no-such-task' => 'തിരഞ്ഞെടുത്ത ടാസ്ക് അസാധുവാണ്‌.',
	'translate-page-no-such-group' => 'തിരഞ്ഞെടുത്ത ഗ്രൂപ്പ് അസാധുവാണ്‌.',
	'translate-page-disabled' => "ഈ ഗ്രൂപ്പിലുള്ള സന്ദേശങ്ങള്‍ക്ക് ഈ ഭാഷയിലുള്ള പരിഭാഷ നിരോധിച്ചിരിക്കുന്നു. കാരണം:

''$1''",
	'translate-page-settings-legend' => 'ക്രമീകരണങ്ങള്‍',
	'translate-page-task' => 'എനിക്ക്',
	'translate-page-group' => 'ഗ്രൂപ്പ്',
	'translate-page-language' => 'ഭാഷ',
	'translate-page-limit' => 'പരിധി',
	'translate-page-limit-option' => 'ഒരു താളില്‍ $1 {{PLURAL:$1|സന്ദേശം|സന്ദേശങ്ങള്‍}}',
	'translate-submit' => 'സമര്‍പ്പിക്കുക',
	'translate-page-showing' => '$3 സന്ദേശങ്ങളുള്ളതില്‍ $1 മുതല്‍ $2 വരെയുള്ളവ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്നു',
	'translate-page-showing-all' => '$1 {{PLURAL:$1|സന്ദേശം|സന്ദേശങ്ങള്‍}} പ്രദര്‍ശിപ്പിക്കുന്നു.',
	'translate-page-showing-none' => 'പ്രദര്‍ശിപ്പിക്കുവാന്‍ സന്ദേശങ്ങളില്ല.',
	'translate-next' => 'അടുത്ത താള്‍',
	'translate-prev' => 'മുന്‍പത്തെ താള്‍',
	'translate-page-description-legend' => 'ഗ്രൂപ്പിനെപ്പറ്റിയുള്ള വിവരങ്ങള്‍',
	'translate-optional' => '(നിര്‍ബന്ധമില്ല)',
	'translate-edit-definition' => 'സന്ദേശത്തിന്റെ നിര്‍‌വചനം',
	'translate-edit-contribute' => 'സംഭാവന ചെയ്യുക',
	'translate-edit-no-information' => "''ഈ സന്ദേശത്തിനു ഡോക്കുമെന്റേഷന്‍ ഇല്ല.
ഈ സന്ദേശം എങ്ങനെയാണു ഉപയോഗിക്കപ്പെടുന്നത് എന്ന് നിങ്ങള്‍ക്ക് അറിയാമെങ്കില്‍, അതിനെകുറിച്ചുള്ള ഡോക്കുമെന്റേഷന്‍ ചേര്‍ത്ത് താങ്കള്‍ക്ക് മറ്റുള്ള പരിഭാഷകര്‍ക്കു സഹായമേകാം.''",
	'translate-edit-information' => 'ഈ സന്ദേശത്തെക്കുറിച്ചുള്ള വിവരണം ($1)',
	'translate-edit-in-other-languages' => 'സന്ദേശം മറ്റുള്ള ഭാഷകളില്‍',
	'translate-edit-committed' => 'സന്ദേശത്തിന്റെ നിലവിലുള്ള പരിഭാഷ',
	'translate-edit-warnings' => 'അപൂര്‍ണ്ണമായ പരിഭാഷയെക്കുറിച്ചുള്ള മുന്നറിയിപ്പ്',
	'translate-magic-submit' => 'സമര്‍പ്പിക്കുക',
	'translate-magic-cm-export' => 'എക്സ്പോര്‍ട്ട്',
	'translate-magic-cm-current' => 'നിലവിലുള്ളത്',
	'translate-magic-cm-original' => 'മൂലകൃതി',
	'translate-magic-cm-comment' => 'അഭിപ്രായം:',
	'translate-magic-cm-save' => 'സേവ് ചെയ്യുക',
	'translate-magic-cm-savefailed' => 'സേവ് ചെയ്യാന്‍ പറ്റിയില്ല',
	'translate-magic-special' => 'പ്രത്യേക താളുകളുടെ അലിയാസുകള്‍',
	'translate-magic-namespace' => 'നേംസ്പേസ് നാമങ്ങള്‍',
	'translationchanges' => 'പരിഭാഷയിലെ മാറ്റങ്ങള്‍',
	'translationchanges-export' => 'എക്സ്പോര്‍ട്ട്',
	'translationchanges-change' => '$1: $2 ചെയ്തത് $3',
	'translate-checks-plural' => 'നിര്‍‌വചനം <nowiki>{{PLURAL:}}</nowiki> ഉപയോഗിക്കുന്നു, പക്ഷെ പരിഭാഷ ഉപയോഗിക്കുന്നില്ല.',
);

/** Marathi (मराठी)
 * @author Kaustubh
 * @author Mahitgar
 */
$messages['mr'] = array(
	'translate' => 'भाषांतर करा',
	'translate-desc' => 'मिडीयाविकि आणि त्या पलीकडील भाषांतरणे करण्याकरिता [[Special:Translate|विशेष पान]]',
	'translate-edit' => 'संपादन',
	'translate-talk' => 'चर्चा',
	'translate-history' => 'इतिहास',
	'translate-task-view' => 'खालीलवर्गाचे सारे सदेश बघावे',
	'translate-task-untranslated' => 'मधील सर्व अभाषांतरीत संदेश बघावे',
	'translate-task-optional' => 'चे पर्यायी संदेश बघावे',
	'translate-task-review' => 'चे बदल तपासा',
	'translate-task-reviewall' => 'मधील सर्व भाषांतरणे तपासा',
	'translate-task-export' => 'कडून भाषांतरणे निर्यात करा',
	'translate-task-export-to-file' => 'भाषांतराची संचिका निर्यात करा',
	'translate-task-export-as-po' => 'भाषांतरणे Gettext रुपरेषेत निर्यात करा',
	'translate-page-no-such-language' => 'दिलेली भाषा अयोग्य आहे.',
	'translate-page-no-such-task' => 'दिलेले कार्य अयोग्य आहे.',
	'translate-page-no-such-group' => 'दिलेला गट अयोग्य आहे.',
	'translate-page-settings-legend' => 'सेटिंग',
	'translate-page-task' => 'मी इच्छीतो की',
	'translate-page-group' => 'गट',
	'translate-page-language' => 'भाषा',
	'translate-page-limit' => 'मर्यादा',
	'translate-page-limit-option' => 'प्रतिपान {{PLURAL:$1|संदेश|संदेश}}$1',
	'translate-submit' => 'शेंदा(ओढा)',
	'translate-page-navigation-legend' => 'सुचालन',
	'translate-page-showing' => '$3चे $1पासून $2पर्यंत संदेश दाखवत आहे.',
	'translate-page-showing-all' => '$1 {{PLURAL:$1|संदेश|संदेश}} दाखवत आहे .',
	'translate-page-showing-none' => 'दाखविण्यासाठी संदेश नाहीत.',
	'translate-next' => 'पुढील पान',
	'translate-prev' => 'मागील पान',
	'translate-page-description-legend' => 'गटाबद्दल माहिती',
	'translate-optional' => '(वैकल्पिक)',
	'translate-ignored' => '(दुर्लक्षीत)',
	'translate-edit-definition' => 'संदेश व्याख्या',
	'translate-edit-contribute' => 'योगदान करा',
	'translate-edit-no-information' => "''या संदेशाकरिता कोणतेही नोंदीकरण(डॉक्यूमेंटेशन) नाही. हा संदेश कुठे आणि कसा वापरला आहे हे तुम्हाला ठावूक असेल तर, या पानाचे नोंदीकरण(डॉक्यूमेंटेशन) करून तुम्ही इतर भाषांतरकारांना मदत करू शकता.''",
	'translate-edit-information' => '($1)या संदेशाबद्दल माहिती',
	'translate-edit-in-other-languages' => 'इतर भाषातील संदेश',
	'translate-edit-committed' => 'संकेतन प्रणालीमधील सध्याचे भाषांतरण',
	'translate-edit-warnings' => 'अर्धवट भाषांतरांसाठीचे इशारे',
	'translate-magic-pagename' => 'वाढीव मीडियाविकि भाषांतर',
	'translate-magic-submit' => 'ओढा',
	'translate-magic-cm-export' => 'नीर्यात',
	'translate-magic-cm-to-be' => 'अपेक्षीत',
	'translate-magic-cm-current' => 'सद्य',
	'translate-magic-cm-original' => 'मूळ',
	'translate-magic-cm-comment' => 'प्रतिक्रीया',
	'translate-magic-cm-save' => 'जतन करा',
	'translate-magic-cm-updatedusing' => '[[Special:Magic]] वापरून बदलले',
	'translate-magic-cm-savefailed' => 'जतन अयशस्वी',
	'translate-magic-special' => 'विशेष पान टोपणनावे',
	'translate-magic-words' => 'जादूई शब्द',
	'translate-magic-skin' => 'त्वचेचे नाव',
	'translate-magic-namespace' => 'नामविश्व नावे',
	'translationchanges' => 'भाषांतरांमधील बदल',
	'translationchanges-export' => 'नीर्यात',
	'translationchanges-change' => '$1: $2 ने $3',
	'translate-checks-parameters' => 'खालील पॅरॅमीटर्स वापरलेले नाहीत:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'चुकीची कंस संख्या:
<strong><nowiki>$1</nowiki></strong>',
);

/** Malay (Bahasa Melayu)
 * @author Emrrans
 * @author Kurniasan
 */
$messages['ms'] = array(
	'translate' => 'Terjemah',
	'translate-page-settings-legend' => 'Ketetapan',
	'translate-page-task' => 'Saya mahu',
	'translate-page-group' => 'Kumpulan',
	'translate-page-language' => 'Bahasa',
	'translate-page-limit' => 'Had',
	'translate-page-limit-option' => '$1 pesanan per laman',
	'translate-submit' => 'Ambil',
	'translate-page-navigation-legend' => 'Pandu arah',
	'translate-page-showing' => 'Menunjukkan pesanan dari $1 hingga $2 daripada $3 pesanan.',
	'translate-page-showing-all' => 'Menunjukkan $1 pesanan.',
	'translate-page-showing-none' => 'Tiada pesanan untuk ditunjukkan.',
	'translate-page-paging-links' => '[ $1 ] [ $2 ]',
	'translate-next' => 'Laman berikutnya',
	'translate-prev' => 'Laman sebelumnya',
	'translate-page-description-legend' => 'Maklumat mengenai kumpulan',
	'translate-page-edit' => 'sunting',
	'translate-optional' => '(tidak wajib)',
	'translate-ignored' => '(tidak diendahkan)',
	'translate-edit-definition' => 'Takrifan pesanan',
	'translate-edit-contribute' => 'sumbangkan',
	'translate-edit-no-information' => "''Pesanan in tidak mempunyai dokumentasi. Jika anda tahu di mana atau bagaimana pesanan ini digunakan, anda boleh membantu para penterjemah dengan menambahkannya kepada pesanan ini.''",
	'translate-edit-information' => 'Maklumat mengenai pesanan ini ($1)',
	'translate-edit-in-other-languages' => 'Pesanan di dalam bahasa lain',
	'translate-edit-committed' => 'Penterjemahan terkini di dalam perisian',
	'translate-edit-warnings' => 'Amaran-amaran tentang penterjemahan yang tidak lengkap',
	'translate-edit-goto-no-prev' => 'Tiada pesanan sebelumnya',
	'translate-edit-goto-no-next' => 'Tiada pesanan seterusnya',
	'translate-edit-goto-prev' => 'Sunting pesanan sebelumnya',
	'translate-edit-goto-next' => 'Sunting pesanan berikutnya',
	'translate-edit-goto-list' => 'Kembali ke senarai',
	'translate-magic-pagename' => 'Terjemahan tambahan MediaWiki',
	'translationchanges' => 'Perubahan terjemahan',
	'translate-rc-translation-filter' => 'Tapis terjemahan:',
	'translationstats' => 'Statistik terjemahan',
	'translate-sidebar-alltrans' => 'Terjemahan lain',
);

/** Maltese (Malti)
 * @author Chrisportelli
 * @author Roderick Mallia
 */
$messages['mt'] = array(
	'translate' => 'Traduzzjoni',
	'translate-desc' => '[[Special:Translate|Pagina speciale]] biex tittraduċi MediaWiki u iktar',
	'translate-edit' => 'modifika',
	'translate-talk' => 'diskussjoni',
	'translate-history' => 'kronoloġija',
	'translate-task-view' => 'Uri l-messaġġi kollha minn',
	'translate-task-untranslated' => 'Uri l-messaġġi kollha li għadhom ma ġewx tradotti minn',
	'translate-task-optional' => 'Uri messaġġi opzjonali minn',
	'translate-page-language' => 'Lingwa',
	'translate-ignored' => '(injorat)',
	'translate-edit-definition' => 'Definizzjoni tal-messaġġ',
	'translate-edit-contribute' => 'ikkontribwixxi',
	'translate-edit-no-information' => "''Dan il-messaġġ m'għandu l-ebda dokumentazzjoni.''
''Jekk taf fejn jew kif jiġi wżat dan il-messaġġ, tista' tgħin lit-tradutturi l-oħra billi żżid id-dokumentazzjoni ma' dan il-messaġġ.''",
	'translate-edit-information' => 'Informazzjoni dwar dan il-messaġġ ($1)',
	'translate-edit-in-other-languages' => "Messaġġ f'lingwi oħra",
	'translate-edit-committed' => 'Traduzzjoni attwali fis-software',
	'translate-edit-warnings' => 'Twissijiet dwar traduzzjonijiet mhux kompluti',
	'translate-edit-goto-no-prev' => 'L-ebda messaġġ preċedenti',
	'translate-edit-goto-no-next' => 'L-ebda messaġġ suċċessiv',
	'translate-magic-cm-export' => 'Esporta',
	'translate-magic-cm-original' => 'Oriġinali',
	'translate-magic-cm-comment' => 'Kumment:',
	'translationchanges-export' => 'esporta',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'translate' => 'Ютавтомонзо',
	'translate-edit' => 'витнемензэ-петнемензэ',
	'translate-talk' => 'кортнеме',
	'translate-history' => 'путовксонзо-юронзо',
	'translate-page-no-such-language' => 'Аравтозь келесь а маштови.',
	'translate-page-settings-legend' => 'Аравтнемкат',
	'translate-page-task' => 'Ули мелем',
	'translate-page-group' => 'Куро',
	'translate-page-language' => 'Кель',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|пачтямнэ|пачтямнэть}} лопазонзо',
	'translate-submit' => 'Кандомс',
	'translate-page-showing-all' => '{{PLURAL:$1|Невтеви 1 пачтямнэ|Невтевить $1 пачтямнэть}}.',
	'translate-page-showing-none' => 'Пачтямнэть невтемс арасть',
	'translate-next' => 'Седе тов ве лопа',
	'translate-prev' => 'Седе икелень лопась',
	'translate-page-description-legend' => 'Куродо кить-мезть',
	'translate-page-edit' => 'витнемензэ-петнемензэ',
	'translate-optional' => '(мелень коряс)',
	'translate-ignored' => '(менстязь)',
	'translate-edit-definition' => 'Пачтямнэнть чарькодевтемазо',
	'translate-edit-contribute' => 'эсеть путовкс путомс',
	'translate-edit-no-information' => "''Те пачтямнэсь апак чарькодевте. Тевс нолдамодонзо содат, косо эли кода, лездак лия ютавтыцятненень. Поладт те пачтямнэнтень превть-арсемат.''",
	'translate-edit-information' => 'Мезе содамс те пачтямнэденть ($1)',
	'translate-edit-in-other-languages' => 'Пачтямнэсь лия кельсэ',
	'translate-edit-goto-no-prev' => 'Седе икелень пачтямнэ арась',
	'translate-edit-goto-no-next' => 'Седе тов пачтямнэ арась',
	'translate-edit-goto-prev' => 'Седе икелень пачтямнэнть витнеме-петнеме',
	'translate-edit-goto-next' => 'Седе тов ве лопань витнеме-петнеме',
	'translate-edit-goto-list' => 'Мекев спискантень',
	'translate-magic-pagename' => 'МедиаВикинь келейгавтонь ютавтома',
	'translate-magic-submit' => 'Кандомс',
	'translate-magic-cm-current' => 'Неень',
	'translate-magic-cm-original' => 'Васнянь',
	'translate-magic-cm-save' => 'Ванстомс',
	'translate-magic-cm-savefailed' => 'Ванстома тевесь эзь лисе',
	'translate-magic-namespace' => 'Лем потмо лемть',
	'translationchanges' => 'Ютавтомасо полавтнемат',
	'translate-rc-translation-filter' => 'Сувтнемс ютавтовкстнэнь',
	'translate-rc-translation-filter-no' => 'Мезеяк а теемс',
	'translate-rc-translation-filter-only' => 'Ськамост ютавтовкстнэнь невтемс',
	'translate-rc-translation-filter-filter' => 'Панемс ютавтовкстнэнь сувтемань пачк',
	'translationstats' => 'Ютавтомадо статистика',
	'translate-stats-edits' => 'Витнемат-петнемат',
	'translate-stats-users' => 'Ютавтыцят',
	'translate-statsf-width' => 'Пикселсэ келезэ',
	'translate-statsf-height' => 'Пикселсэ сэрезэ',
	'translate-statsf-scale-days' => 'Чить',
	'translate-statsf-scale-hours' => 'Цяст',
	'translate-statsf-count' => 'Онкс',
	'translate-statsf-count-edits' => 'Зяроксть витнезь-петнезь',
	'translate-statsf-count-users' => 'Зяро ютавтыцятнеде',
	'translate-statsf-language' => 'Ботпулосо явонь списка, косо келень кодт',
	'translate-statsf-group' => 'Ботпулосо явонь списка, косо куронь кодт',
	'translate-statsf-submit' => 'Васнянь неевтезэ',
	'translate-tag-category' => 'Ютавтомкс лопат',
	'translate-tag-page-desc' => '"[[:$1]]" вики лопась ютавтозь.',
	'translate-tag-translate-link-desc' => 'Йутавтык те лопанть',
	'translate-tag-legend-fallback' => 'Лия кельс йутавтома',
	'translate-tag-legend-fuzzy' => 'Таштомозь йутавтома',
	'translate-sidebar-alltrans' => 'Лия йутавтомат',
	'translations' => 'Весе йутавтовкст',
	'translate-translations-no-message' => '"$1" пачтямнэсь а йутавтови',
	'translate-translations-none' => '"$1" пачтямнэнть арасть ютавтовксонзо',
	'translate-translations-fieldset-title' => 'Весе ютавтовкст',
	'translate-translations-messagename' => 'Пачтямнэсь:',
	'languagestats' => 'Келень статистикат',
	'translate-language-code' => 'Келень код',
	'translate-language-code-field-name' => 'Келень кодось:',
	'translate-language' => 'Кель',
	'translate-total' => 'Пачтямнэть',
	'translate-untranslated' => 'Апак ютавто',
	'translate-percentage-fuzzy' => 'Таштамозь',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'translate-edit' => 'ticpatlāz',
	'translate-talk' => 'tēixnāmiquiliztli',
	'translate-history' => 'tlahcuilōlloh',
	'translate-page-task' => 'Nitlanequi',
	'translate-page-group' => 'Olōlli',
	'translate-page-language' => 'Tlahtōlli',
	'translate-page-navigation-legend' => 'Ācalpapanōliztli',
	'translate-page-showing' => 'Tiquintta tlahcuilōltzin īhuīcpa $1 oc $2 īmpan $3.',
	'translate-page-showing-all' => '{{PLURAL:$1|Tiquintta|Tiquintta}} $1 tlahcuilōltzin.',
	'translate-next' => 'Niman zāzanilli',
	'translate-prev' => 'Achto zāzanilli',
	'translate-page-description-legend' => 'Olōltechopa',
	'translate-page-edit' => 'ticpatlāz',
	'translate-edit-in-other-languages' => 'Tlahcuilōltzin occequīntīn tlahtōlcopa',
	'translate-edit-goto-prev' => 'Ticpatlāz niman tlahcuilōltzin',
	'translate-edit-goto-next' => 'Ticpatlāz achtopa tlahcuilōltzin',
	'translate-edit-goto-list' => 'Ticuepāz',
	'translate-magic-cm-export' => 'Ticnamacāz',
	'translate-magic-cm-current' => 'Āxcān',
	'translate-magic-cm-save' => 'Ticpiyāz',
	'translationchanges-export' => 'ticnamacāz',
	'translate-stats-edits' => 'Tlapatlaliztli',
);

/** Neapolitan (Nnapulitano) */
$messages['nap'] = array(
	'translate-edit' => 'càgna',
	'translate-talk' => 'chiàcchiera',
	'translate-history' => 'cronologgia',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'translate' => 'Översetten',
	'translate-edit' => 'ännern',
	'translate-talk' => 'Diskuschoon',
	'translate-history' => 'Historie',
	'translate-page-task' => 'Ik will',
	'translate-page-group' => 'Grupp',
	'translate-page-language' => 'Spraak',
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-comment' => 'Kommentar:',
	'translate-magic-cm-save' => 'Spiekern',
	'translate-magic-special' => 'Spezialsieden-Alternativnaams',
);

/** Nedersaksisch (Nedersaksisch)
 * @author Servien
 */
$messages['nds-nl'] = array(
	'translate' => 'Vertalen',
	'translate-edit' => 'bewark',
	'translate-talk' => 'overleeg',
	'translate-history' => 'geschiedenisse',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'translate' => 'Vertalen',
	'translate-desc' => '[[Special:Translate|Speciale pagina]] voor het vertalen van MediaWiki en meer',
	'translate-edit' => 'bewerken',
	'translate-talk' => 'overleg',
	'translate-history' => 'geschiedenis',
	'translate-task-view' => 'alle berichten bekijken',
	'translate-task-untranslated' => 'alle onvertaalde berichten bekijken',
	'translate-task-optional' => 'optionele berichten bekijken',
	'translate-task-untranslatedoptional' => 'onvertaalde optionele berichten bekijken',
	'translate-task-problematic' => 'vertalingen met problemen bekijken',
	'translate-task-review' => 'wijzigingen controleren',
	'translate-task-reviewall' => 'alle vertalingen controleren',
	'translate-task-export' => 'vertalingen exporteren',
	'translate-task-export-to-file' => 'vertalingen naar bestand exporteren',
	'translate-task-export-as-po' => 'vertalingen naar Gettext-formaat exporteren',
	'translate-task-export-to-xliff' => 'vertalingen naar Xliff-formaat exporteren',
	'translate-page-no-such-language' => 'Er is een ongeldige taalcode opgegeven',
	'translate-page-no-such-task' => 'De aangegeven functie bestaat niet.',
	'translate-page-no-such-group' => 'De aangegeven groep bestaat niet.',
	'translate-page-disabled' => "Vertalingen in deze taal voor deze groep zijn uitgeschakeld. Reden:

''$1''",
	'translate-page-settings-legend' => 'Instellingen',
	'translate-page-task' => 'Ik wil',
	'translate-page-group' => 'Groep',
	'translate-page-language' => 'Taal',
	'translate-page-limit' => 'Maximaal',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|bericht|berichten}} per pagina',
	'translate-submit' => 'Ophalen',
	'translate-page-navigation-legend' => 'Navigatie',
	'translate-page-showing' => 'De berichten $1 tot $2 van $3 worden weergegeven.',
	'translate-page-showing-all' => 'Er {{PLURAL:$1|wordt 1 bericht|worden $1 berichten}} weergegeven.',
	'translate-page-showing-none' => 'Er zijn geen berichten in deze selectie.',
	'translate-next' => 'volgende',
	'translate-prev' => 'vorige',
	'translate-page-description-legend' => 'Informatie over de groep',
	'translate-page-edit' => 'bewerken',
	'translate-optional' => '(optioneel)',
	'translate-ignored' => '(genegeerd)',
	'translate-edit-definition' => 'Berichtdefinitie',
	'translate-edit-contribute' => 'bijdragen',
	'translate-edit-no-information' => "''Dit bericht heeft geen documentatie.''
''Als u weet waar dit bericht wordt gebruikt, dan kunt u andere gebruikers helpen door documentatie voor dit bericht toe te voegen.''",
	'translate-edit-information' => 'Informatie over dit bericht ($1)',
	'translate-edit-in-other-languages' => 'Bericht in andere talen',
	'translate-edit-committed' => 'Huidig bericht in software',
	'translate-edit-warnings' => 'Waarschuwingen over onjuiste vertalingen',
	'translate-edit-goto-no-prev' => 'Geen vorig bericht',
	'translate-edit-goto-no-next' => 'Geen volgend bericht',
	'translate-edit-goto-prev' => 'Vorige bericht bewerken',
	'translate-edit-goto-next' => 'Volgende bericht bewerken',
	'translate-edit-goto-list' => 'Terug naar de lijst',
	'translate-magic-pagename' => 'Uitgebreide MediaWiki-vertaling',
	'translate-magic-help' => 'U kunt alternatieven voor speciale pagina\'s, magische woorden, skinnamen en naamruimtebenamingen vertalen.

Alternatieven voor speciale pagina\'s en magische woorden kunnen meerdere vertalingen hebben.
Scheid vertalingen met een komma (,). Skinnamen en naamruimtebenamingen kunnen slechts één vertaling hebben.

In naamruimtebenamingen is <tt>$1 talk</tt> een uitzondering. <tt>$1</tt> wordt vervangen door de sitenaam (bijvoorbeeld <tt>{{SITENAME}} talk</tt>).
Als het in uw taal niet mogelijk is een geldige uitdrukking te vormen zonder de sitenaam te wijzigen, neem dan contact op met een ontwikkelaar.

Om wijzigingen op te slaan moet u lid zijn van de groep vertalers.
Wijzigingen worden niet bewaard totdat u op "Pagina opslaan" hebt geklikt.',
	'translate-magic-module' => 'Module:',
	'translate-magic-submit' => 'Ophalen',
	'translate-magic-cm-export' => 'Exporteren',
	'translate-magic-cm-to-be' => 'Toekomstig',
	'translate-magic-cm-current' => 'Huidig',
	'translate-magic-cm-original' => 'Brontekst',
	'translate-magic-cm-comment' => 'Samenvatting:',
	'translate-magic-cm-save' => 'Opslaan',
	'translate-magic-cm-updatedusing' => 'Bijgewerkt via [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Opslaan mislukt',
	'translate-magic-special' => "Alternatieven speciale pagina's",
	'translate-magic-words' => 'Magische woorden',
	'translate-magic-skin' => 'Skinnamen',
	'translate-magic-namespace' => 'Naamruimtebenamingen',
	'translationchanges' => 'Recente vertalingen',
	'translationchanges-export' => 'exporteren',
	'translationchanges-change' => '$1: $2 door $3',
	'translate-checks-parameters' => 'De volgende {{PLURAL:$2|parameter wordt|parameters worden}} niet gebruikt:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => 'De volgende {{PLURAL:$2|parameter is|parameters zijn}} onbekend:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Er wordt een oneven {{PLURAL:$2|aantal haakjes|aantal haakjes}} gebruikt:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => 'De volgende {{PLURAL:$2|verwijzing is|verwijzingen zijn}} problematisch:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Vervang de volgende {{PLURAL:$2|tag|tags}} door de juiste:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'De definitie bevat <nowiki>{{PLURAL:}}</nowiki>, maar de vertaling niet.',
	'translate-checks-pagename' => 'Afwijkende naamruimte vergeleken met de brontekst',
	'translate-checks-format' => 'Deze vertaling wijkt af van het bronbericht of heeft een ongeldige opmaak: $1',
	'tog-translate-nonewsletter' => 'Mij geen nieuwsbrieven per e-mail sturen (alleen relevant voor gebruikers met een bevestigd e-mailadres)',
	'right-translate' => 'Bewerken via de vertaalinterface',
	'translate-rc-translation-filter' => 'Vertalingen filteren:',
	'translate-rc-translation-filter-no' => 'Niets doen',
	'translate-rc-translation-filter-only' => 'Alleen vertalingen weergeven',
	'translate-rc-translation-filter-filter' => 'Vertalingen wegfilteren',
	'translate-rc-translation-filter-site' => 'Alleen wijzigingen aan plaatselijke systeemberichten',
	'translationstats' => 'Vertaalstatistieken',
	'translate-stats-edits' => 'Bewerkingen per dag',
	'translate-stats-users' => 'Vertalers',
	'translate-statsf-intro' => 'U kunt via dit formulier eenvoudige statistieken samenstellen.
Alle waarden hebben een limiet aan de boven- en onderzijde.',
	'translate-statsf-options' => 'Grafiekopties',
	'translate-statsf-width' => 'Breedte in pixels',
	'translate-statsf-height' => 'Hoogte in pixels',
	'translate-statsf-days' => 'Periode in dagen',
	'translate-statsf-scale' => 'Granulariteit',
	'translate-statsf-scale-days' => 'Dagen',
	'translate-statsf-scale-hours' => 'Uren',
	'translate-statsf-count' => 'Eenheid',
	'translate-statsf-count-edits' => 'Aantal bewerkingen',
	'translate-statsf-count-users' => 'Actieve vertalers',
	'translate-statsf-language' => 'Kommagescheiden lijst van taalcodes',
	'translate-statsf-group' => 'Kommagescheiden lijst van groepscodes',
	'translate-statsf-submit' => 'Ter controle bekijken',
	'translate-tag-category' => "Vertaalbare pagina's",
	'translate-tag-page-desc' => 'Vertaling van de wikipagina [[:$1]].',
	'translate-tag-translate-link-desc' => 'Deze pagina vertalen',
	'translate-tag-legend' => 'Legenda:',
	'translate-tag-legend-fallback' => 'Vertaling in een andere taal',
	'translate-tag-legend-fuzzy' => 'Verouderde vertaling',
	'translate-tag-fuzzy-comment' => 'Definitie gewijzigd door [[User:$1|$1]] in versie $2.',
	'translate-tag-fuzzy-reason' => 'Definitie gewijzigd door "$1" met opmerking "$3" in $2.',
	'translate-sidebar-alltrans' => 'Andere vertalingen',
	'translate-tag-noedit' => 'Dit is een automatisch bijgewerkte vertaalde pagina.
U kunt de [$1 brontekst bewerken] of de [$2 vertaling bijwerken].',
	'translations' => 'Alle vertalingen',
	'translations-summary' => 'Voer de naam van een bericht in om alle beschikbare vertalingen weer te geven.',
	'translate-translations-no-message' => '"$1" is geen vertaalbaar bericht',
	'translate-translations-none' => 'Er zijn geen vertalingen beschikbaar voor "$1"',
	'translate-translations-fieldset-title' => 'Alle vertalingen',
	'translate-translations-messagename' => 'Bericht:',
	'translate-translations-including-no-param' => 'Geef een geldige paginanaam op als subpaginaparameter',
	'languagestats' => 'Taalstatistieken',
	'languagestats-summary' => 'Op deze pagina worden vertaalstatistieken weergegeven voor alle ([[MediaWiki:Translate-languagestats-groups|ingestelde]]) berichtengroepen voor een taal.',
	'translate-language-code' => 'Taalcode',
	'translate-language-code-field-name' => 'Taalcode:',
	'translate-suppress-complete' => 'Volledig vertaalde berichtengroepen verbergen',
	'translate-language' => 'Taal:',
	'translate-total' => 'Berichten',
	'translate-untranslated' => 'Te vertalen',
	'translate-percentage-complete' => 'Vertaald',
	'translate-percentage-fuzzy' => 'Verouderd',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Frokor
 * @author Harald Khan
 * @author Jon Harald Søby
 */
$messages['nn'] = array(
	'translate' => 'Set om',
	'translate-desc' => '[[Special:Translate|Spesialside]] for omsetjing av MediaWiki o.a.',
	'translate-edit' => 'endre',
	'translate-talk' => 'diskusjon',
	'translate-history' => 'historikk',
	'translate-task-view' => 'Sjå alle meldingar frå',
	'translate-task-untranslated' => 'Sjå alle uomsette meldingar frå',
	'translate-task-optional' => 'Sjå valfri meldingar frå',
	'translate-task-problematic' => 'Sjå meldingar som har problem',
	'translate-task-review' => 'Gå gjennom endringar av',
	'translate-task-reviewall' => 'Gå gjennom alle omsette meldingar av',
	'translate-task-export' => 'Eksporter omsetjingar frå',
	'translate-task-export-to-file' => 'Eksporter omsetjingar til fil frå',
	'translate-task-export-as-po' => 'Eksportere omsetjingar i Gettext-format',
	'translate-task-export-to-xliff' => 'Eksportere omsetjingar i Xliff-format',
	'translate-page-no-such-language' => 'Ugyldig språkkode.',
	'translate-page-no-such-task' => 'Ikkje gyldig oppgåve',
	'translate-page-no-such-group' => 'Ikkje gyldig gruppe.',
	'translate-page-disabled' => "Omsetjingar til dette språket i denne gruppa er slått av. Årsak:

''$1''",
	'translate-page-settings-legend' => 'Innstillingar',
	'translate-page-task' => 'Eg vil',
	'translate-page-group' => 'Gruppe',
	'translate-page-language' => 'Språk',
	'translate-page-limit' => 'Grense',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|melding|meldingar}} per side',
	'translate-submit' => 'Hent',
	'translate-page-navigation-legend' => 'Navigering',
	'translate-page-showing' => 'Viser meldingar frå $1 til $2 av $3.',
	'translate-page-showing-all' => 'Viser {{PLURAL:$1|éi melding|$1 meldingar}}.',
	'translate-page-showing-none' => 'Ingen meldingar å vise.',
	'translate-page-paging-links' => '[ $1 ] [ $2 ]',
	'translate-next' => 'Neste side',
	'translate-prev' => 'Førre side',
	'translate-page-description-legend' => 'Informasjon om gruppa',
	'translate-page-edit' => 'endre',
	'translate-optional' => '(valfri)',
	'translate-ignored' => '(ignorert)',
	'translate-edit-definition' => 'Melding som skal setjast om',
	'translate-edit-contribute' => 'bidra',
	'translate-edit-no-information' => "''Denne meldinga har ikkje dokumentasjon. Om du veit kvar eller korleis denne meldinga vert nytta, kan du hjelpe andre omsetjarar ved å legge inn dokumentasjon til denne meldinga.''",
	'translate-edit-information' => 'Informasjon om denne meldinga ($1)',
	'translate-edit-in-other-languages' => 'Meldingar på andre språk',
	'translate-edit-committed' => 'Noverande omsetjing i programvaren',
	'translate-edit-warnings' => 'Åtvaringar om ufullstendige omsetjingar',
	'translate-edit-goto-no-prev' => 'Ingen tidlegare meldingar',
	'translate-edit-goto-no-next' => 'Ingen meldingar etter denne',
	'translate-edit-goto-prev' => 'Endre førre melding',
	'translate-edit-goto-next' => 'Endre neste melding',
	'translate-edit-goto-list' => 'Tilbake til lista',
	'translate-magic-pagename' => 'Utvida MediaWiki-omsetjing',
	'translate-magic-help' => 'Du kan setje om spesialsidenamn, magiske ord, utsjåandenamn og namneromnamn.

Spesialsidenamn og magiske ord kan ha fleire omsetjingar.
Omsetjingane vert fråskilde med komma (,).
Draktnamn og namnerom kan berre ha éi omsetjing.

I namneromomsetjingane er <tt>$1 talk</tt> spesiell. <tt>$1</tt> vert erstatta med namnet på sida (til dømes <tt>{{SITENAME}}</tt>).
Om det ikkje er mogeleg å få til eit gyldig uttrykk på ditt språk her utan å endre sidenamnet, kontakt ein utviklar.

Du må vere i omsetjargruppar for å lagre endringar.
Endringar vert ikkje lagra før du klikker på lagre-knappen nedanfor.',
	'translate-magic-module' => 'Modul:',
	'translate-magic-submit' => 'Hent',
	'translate-magic-cm-export' => 'Eksporter',
	'translate-magic-cm-to-be' => 'Framtidig',
	'translate-magic-cm-current' => 'Noverande',
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-comment' => 'Kommentar:',
	'translate-magic-cm-save' => 'Lagre',
	'translate-magic-cm-updatedusing' => 'Oppdatert vha. [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Lagringa var mislukka',
	'translate-magic-special' => 'Spesialsidenamn',
	'translate-magic-words' => 'Magiske ord',
	'translate-magic-skin' => 'Utsjåandenamn',
	'translate-magic-namespace' => 'Namneromnamn',
	'translationchanges' => 'Omsetjingsendringar',
	'translationchanges-export' => 'eksporter',
	'translationchanges-change' => '$1: $2 av $3',
	'translate-checks-parameters' => 'Følgjande {{PLURAL:$2|parameter|parametrar}} vert ikkje nytta:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => 'Følgjande {{PLURAL:$2|parameter er ukjend|parametrar er ukjende}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => '{{PLURAL:$2|Det|Det}} er eit ujamt tal parentesar:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => 'Følgjande {{PLURAL:$1|lenke er problematisk|$2 lenker er problematiske}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Erstatt følgjande {{PLURAL:$2|tagg|taggar}} med dei riktige:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Definisjonen nyttar <nowiki>{{PLURAL:}}</nowiki>, men omsetjinga gjer det ikkje.',
	'translate-checks-pagename' => 'Namnerom endra frå definisjonen',
	'translate-checks-format' => 'Denne omsetjinga følgjer ikkje definisjonen eller har ugyldig syntaks: $1',
	'tog-translate-nonewsletter' => 'Ikkje send meg nyhendebrev (gjeld berre brukarar med stadfesta e-postadresse)',
	'right-translate' => 'Redigere med omsetjingsgrensesnittet',
	'translate-rc-translation-filter' => 'Filtrer omsetjingar:',
	'translate-rc-translation-filter-no' => 'Ikkje gjer noko',
	'translate-rc-translation-filter-only' => 'Vis berre omsetjingar',
	'translate-rc-translation-filter-filter' => 'Filtrer bort omsetjingar',
	'translate-rc-translation-filter-site' => 'Berre endringar i {{SITENAME}}-meldingar',
	'translationstats' => 'Omsetjingsstatistikk',
	'translate-stats-edits' => 'Endringar per dag',
	'translate-stats-users' => 'Omsetjarar',
	'translate-statsf-intro' => 'Du kan generere enkel statistikk med dette skjemaet. Alle verdiane har øvre og nedre grenser.',
	'translate-statsf-options' => 'Grafalternativ',
	'translate-statsf-width' => 'Breidde i pikslar',
	'translate-statsf-height' => 'Høgd i pikslar',
	'translate-statsf-days' => 'Tidsperiode i dagar',
	'translate-statsf-scale' => 'Kornigleik',
	'translate-statsf-scale-days' => 'Dagar',
	'translate-statsf-scale-hours' => 'Timar',
	'translate-statsf-count' => 'Storleik',
	'translate-statsf-count-edits' => 'Tal på endringar',
	'translate-statsf-count-users' => 'Aktive omsetjarar',
	'translate-statsf-language' => 'Liste over språkkodar fråskild med komma',
	'translate-statsf-group' => 'Liste over gruppekodar fråskild med komma',
	'translate-statsf-submit' => 'Førehandsvis',
	'translate-tag-category' => 'Sider som kan setjast om',
	'translate-tag-page-desc' => 'Omsetjing av wikisida [[:$1]].',
	'translate-tag-translate-link-desc' => 'Set om denne sida',
	'translate-tag-legend' => 'Forklaring:',
	'translate-tag-legend-fallback' => 'Omsetjing i eit anna språk',
	'translate-tag-legend-fuzzy' => 'Utdatert omsetjing',
	'translate-tag-fuzzy-comment' => 'Definisjon endra av [[User:$1|$1]] i versjon $2.',
	'translate-tag-fuzzy-reason' => 'Definisjon endra av brukaren $1 med kommentaren «$3» i $2.',
	'translate-sidebar-alltrans' => 'Andre omsetjingar',
	'translate-tag-noedit' => 'Denne sida er ei automatisk oppdatert omsetjing.
Du kan [$1 endre kjeldesida] eller [$2 oppdatere omsetjinga].',
	'translations' => 'Alle omsetjingar',
	'translations-summary' => 'Skriv inn eit meldingsnamn nedanfor for å visa alle tilgjengelege omsetjingar.',
	'translate-translations-no-message' => '"$1" er ei melding som ikkje kan omsetjast',
	'translate-translations-none' => 'Det finst ingen omsetjingar for "$1"',
	'translate-translations-fieldset-title' => 'Alle omsetjingar',
	'translate-translations-messagename' => 'Melding:',
	'translate-translations-including-no-param' => 'Ver venleg og spesifiser eit gyldig sidenamn i undersideparameteren.',
	'languagestats' => 'Språkstatistikk',
	'languagestats-summary' => 'Denne sida viser omsetjingsstatistikk for alle ([[MediaWiki:Translate-languagestats-groups|konfigurerte]]) meldingsgrupper for eit språk.',
	'translate-language-code' => 'Språkkode',
	'translate-language-code-field-name' => 'Språkkode:',
	'translate-suppress-complete' => 'Skjul meldingsgrupper som er ferdig omsette',
	'translate-language' => 'Språk',
	'translate-total' => 'Meldingar',
	'translate-untranslated' => 'Uomsett',
	'translate-percentage-complete' => 'Ferdiggjort',
	'translate-percentage-fuzzy' => 'Utdatert',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'translate' => 'Oversett',
	'translate-desc' => '[[Special:Translate|Spesialside]] for oversettelse av MediaWiki o.a.',
	'translate-edit' => 'rediger',
	'translate-talk' => 'diskusjon',
	'translate-history' => 'historikk',
	'translate-task-view' => 'se alle beskjeder',
	'translate-task-untranslated' => 'se alle uoversatte beskjeder',
	'translate-task-optional' => 'se valgfrie beskjeder',
	'translate-task-problematic' => 'se beskjeder som har problemer',
	'translate-task-review' => 'gå gjennom endringer',
	'translate-task-reviewall' => 'gå gjennom oversettelser',
	'translate-task-export' => 'eksportere oversettelser',
	'translate-task-export-to-file' => 'eksportere oversettelser til fil',
	'translate-task-export-as-po' => 'eksportere oversettelser i Gettext-format',
	'translate-task-export-to-xliff' => 'eksportere oversettelser i Xliff-format',
	'translate-page-no-such-language' => 'Ugyldig språkkode angitt.',
	'translate-page-no-such-task' => 'Ugyldig oppgave angitt.',
	'translate-page-no-such-group' => 'Ugyldig gruppe angitt.',
	'translate-page-disabled' => "Oversettelser til dette språket i denne gruppen er blitt slått av. Årsak:

''$1''",
	'translate-page-settings-legend' => 'Innstillinger',
	'translate-page-task' => 'Jeg vil',
	'translate-page-group' => 'Gruppe',
	'translate-page-language' => 'Språk',
	'translate-page-limit' => 'Grense',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|beskjed|beskjeder}} per side',
	'translate-submit' => 'Hent',
	'translate-page-navigation-legend' => 'Navigasjon',
	'translate-page-showing' => 'Viser beskjeder fra $1 til $2 av $3.',
	'translate-page-showing-all' => 'Viser {{PLURAL:$1|én beskjed|$1 beskjeder}}.',
	'translate-page-showing-none' => 'Ingen beskjeder å vise.',
	'translate-next' => 'Neste side',
	'translate-prev' => 'Forrige side',
	'translate-page-description-legend' => 'Informasjon om gruppen',
	'translate-page-edit' => 'rediger',
	'translate-optional' => '(valgfri)',
	'translate-ignored' => '(ignorert)',
	'translate-edit-definition' => 'Beskjeden som skal oversettes',
	'translate-edit-contribute' => 'bidra',
	'translate-edit-no-information' => "''Denne beskjeden har ikke dokumentasjon. Om du vet hvor eller hvordan denne beskjeden brukes, kan du hjelpe andre oversettere ved å legge inn dokumentasjon til denne beskjeden.''",
	'translate-edit-information' => 'Informasjon om denne beskjeden ($1)',
	'translate-edit-in-other-languages' => 'Beskjeden på andre språk',
	'translate-edit-committed' => 'Nåværende oversettelse',
	'translate-edit-warnings' => 'Advarsler om ufullstendige oversettelser',
	'translate-edit-goto-no-prev' => 'Ingen beskjeder før denne',
	'translate-edit-goto-no-next' => 'Ingen beskjeder etter denne',
	'translate-edit-goto-prev' => 'Rediger forrige beskjed',
	'translate-edit-goto-next' => 'Rediger neste beskjed',
	'translate-edit-goto-list' => 'Tilbake til listen',
	'translate-magic-pagename' => 'Utvidet MediaWiki-oversettelse',
	'translate-magic-help' => 'Du kan oversette spesialsidenavn, magiske ord, utseendenavn og navneromnavn.

Spesialsidenavn og magiske ord kan ha flere oversettelser.
Oversettelsene adskilles med komma (,).
Draktnavn og navnerom kan kun ha én oversettelse.

I navneromoversettelsene er <tt>$1 talk</tt> spesiell. <tt>$1</tt> erstattes med sidens navn (for eksempel <tt>{{SITENAME}}</tt>).
Om det ikke er mulig å få til et gyldig uttrykk på ditt språk her uten å endre sidenavnet, kontakt en utvikler.

Du må være i oversettergruppa for å lagre endringer.
Endringer lagres ikke før du klikker på lagre-knappen nedenfor.',
	'translate-magic-module' => 'Modul:',
	'translate-magic-submit' => 'Hent',
	'translate-magic-cm-export' => 'Eksporter',
	'translate-magic-cm-to-be' => 'Framtidig',
	'translate-magic-cm-current' => 'Nåværende',
	'translate-magic-cm-original' => 'Opprinnelig',
	'translate-magic-cm-comment' => 'Kommentar:',
	'translate-magic-cm-save' => 'Lagre',
	'translate-magic-cm-updatedusing' => 'Oppdatert vha. [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Lagring mislyktes',
	'translate-magic-special' => 'Spesialsidenavn',
	'translate-magic-words' => 'Magiske ord',
	'translate-magic-skin' => 'Utseendenavn',
	'translate-magic-namespace' => 'Navneromnavn',
	'translationchanges' => 'Oversettelsesendringer',
	'translationchanges-export' => 'eksporter',
	'translationchanges-change' => '$1: $2 av $3',
	'translate-checks-parameters' => 'Følgende {{PLURAL:$2|parameter|parametere}} brukes ikke:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => 'Følgende {{PLURAL:$2|parameter er ukjent|parametere er ukjente}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => '{{PLURAL:$2|Det|Det}} er et ujevnt antall parenteser:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => 'Følgende {{PLURAL:$1|lenke er problematisk|$2 lenker er problematiske}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Erstatt følgende {{PLURAL:$2|tagg|tagger}} med de korrekte:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Definisjonen bruker <nowiki>{{PLURAL:}}</nowiki>, men oversettelsen gjør ikke det.',
	'translate-checks-pagename' => 'Navnerom endret fra definisjonen',
	'tog-translate-nonewsletter' => 'Ikke send meg nyhetsbrev (gjelder kun brukere med bekreftet e-postadresse)',
	'right-translate' => 'Redigere med oversettingsgrensesnittet',
	'translate-rc-translation-filter' => 'Filtrer oversettelser:',
	'translate-rc-translation-filter-no' => 'Ikke gjør noe',
	'translate-rc-translation-filter-only' => 'Vis bare oversettelser',
	'translate-rc-translation-filter-filter' => 'Filtrer bort oversettelser',
	'translate-rc-translation-filter-site' => 'Kun endringer i {{SITENAME}}-beskjeder',
	'translationstats' => 'Oversettelsesstatistikk',
	'translate-stats-edits' => 'Redigeringer per dag',
	'translate-stats-users' => 'Oversettere',
	'translate-statsf-intro' => 'Du kan generere enkel statistikk med dette skjemaet. Alle verdiene har øvre og nedre grenser.',
	'translate-statsf-options' => 'Grafalternativer',
	'translate-statsf-width' => 'Bredde i piksler',
	'translate-statsf-height' => 'Høyde i piksler',
	'translate-statsf-days' => 'Tidsperiode i dager',
	'translate-statsf-scale' => 'Kornethet',
	'translate-statsf-scale-days' => 'Dager',
	'translate-statsf-scale-hours' => 'Timer',
	'translate-statsf-count' => 'Størrelse',
	'translate-statsf-count-edits' => 'Antall redigeringer',
	'translate-statsf-count-users' => 'Aktive oversettere',
	'translate-statsf-language' => 'Liste over språkkoder adskilt med komma',
	'translate-statsf-group' => 'Liste over gruppekoder adskilt med komma',
	'translate-statsf-submit' => 'Forhåndsvisning',
	'translate-tag-category' => 'Oversettbare sider',
	'translate-tag-page-desc' => 'Oversettelse av wikisiden [[:$1]].',
	'translate-tag-translate-link-desc' => 'Oversett denne siden',
	'translate-tag-legend' => 'Forklaring:',
	'translate-tag-legend-fallback' => 'Oversettelse i et annet språk',
	'translate-tag-legend-fuzzy' => 'Utdatert oversettelse',
	'translate-tag-fuzzy-comment' => 'Definisjon endret av [[User:$1|$1]] i revisjon $2.',
	'translate-tag-fuzzy-reason' => 'Definisjon endret av brukeren $1 med kommentaren «$3» i $2.',
	'translate-sidebar-alltrans' => 'Andre oversettelser',
	'translate-tag-noedit' => 'Denne siden er en automatisk oppdatert oversettelse.
Du kan [$1 redigere kildesiden] eller [$2 oppdatere oversettelsen].',
	'translate-language' => 'Språk:',
);

/** Northern Sotho (Sesotho sa Leboa)
 * @author Mohau
 */
$messages['nso'] = array(
	'translate-task-view' => 'Botšha melaetša kamoka go',
	'translate-task-problematic' => 'Botšha melaetša ya goba le mathata',
	'translate-page-task' => 'Ke nyaka go',
	'translate-page-group' => 'Sehlopha',
	'translate-page-language' => 'Polelo',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|ya molaetša|ya melaetša}} ka letlakala',
	'translate-submit' => 'Lata',
	'translate-page-showing' => 'Go bontšhwa melaetša go tloga go $1 go fihla go $2 ya $3.',
	'translate-page-showing-all' => 'Go botšhwa  $1 {{PLURAL:$1|ya molaetša|ya melaetša}}.',
	'translate-page-description-legend' => 'Tsebo ka sehlopha',
	'translate-edit-goto-prev' => 'Fetola molaetša wago feta',
	'translate-edit-goto-next' => 'Fetola molaetša wago latela',
	'translate-edit-goto-list' => 'Boela go lenano',
	'translate-magic-cm-save' => 'Boloka',
	'translationchanges-change' => '$1: $2 ka $3',
	'translate-statsf-scale-days' => 'Matšatši',
	'translate-statsf-scale-hours' => 'Diiri',
	'translate-statsf-count-edits' => 'Palo ya diphetogo',
);

/** Occitan (Occitan)
 * @author Cedric31
 * @author ChrisPtDe
 */
$messages['oc'] = array(
	'translate' => 'Traduire',
	'translate-desc' => '[[Special:Translate|Pagina especiala]] per traduire Mediawiki e quitament mai encara.',
	'translate-edit' => 'Edicion',
	'translate-talk' => 'Discussion',
	'translate-history' => 'Istoric',
	'translate-task-view' => 'Veire totes los messatges dempuèi',
	'translate-task-untranslated' => 'Veire totes los messatges pas tradusits dempuèi',
	'translate-task-optional' => 'Veire totes los messatges facultatius dempuèi',
	'translate-task-untranslatedoptional' => 'Veire los messatges facultatius pas traduches del',
	'translate-task-problematic' => "Veire los messatges qu'an de problèmas",
	'translate-task-review' => 'Tornar veire mos cambiaments dempuèi',
	'translate-task-reviewall' => 'Tornar veire totas las traduccions dins',
	'translate-task-export' => 'Exportar las traduccions dempuèi',
	'translate-task-export-to-file' => 'Exportar las traduccions dins un fichièr dempuèi',
	'translate-task-export-as-po' => 'Exportar las traduccions al format Gettext',
	'translate-task-export-to-xliff' => 'Exportar las traduccions al format Xliff',
	'translate-page-no-such-language' => 'Un còde de lengatge invalid es estat indicat',
	'translate-page-no-such-task' => 'Lo prètzfach especificat es invalid.',
	'translate-page-no-such-group' => 'Lo grop especificat es invalid.',
	'translate-page-disabled' => "Las traduccions dins aquesta lenga dins aqueste grop son estadas desactivadas. Motiu :

''$1''",
	'translate-page-settings-legend' => 'Configuracion',
	'translate-page-task' => 'Vòli',
	'translate-page-group' => 'Grop',
	'translate-page-language' => 'Lenga',
	'translate-page-limit' => 'Limit',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|messatge|messatges}} per pagina',
	'translate-submit' => 'Aténher',
	'translate-page-navigation-legend' => 'Navigacion',
	'translate-page-showing' => 'Visualizacion dels messatges de $1 a $2 sus $3.',
	'translate-page-showing-all' => 'Visualizacion de $1 {{PLURAL:$1|messatge|messatges}}.',
	'translate-page-showing-none' => 'Cap de messatge de visualizar.',
	'translate-next' => 'Pagina seguenta',
	'translate-prev' => 'Pagina precedenta',
	'translate-page-description-legend' => 'Entresenha a prepaus del grop',
	'translate-page-edit' => 'modificar',
	'translate-optional' => '(opcional)',
	'translate-ignored' => '(ignorat)',
	'translate-edit-definition' => 'Definicion del messatge',
	'translate-edit-contribute' => 'contribuir',
	'translate-edit-no-information' => 'Actualament, aqueste messatge es pas documentat. Se sabètz ont o cossí aqueste messatge es utilizat, podètz ajudar los autres traductors en documentant aqueste messatge.',
	'translate-edit-information' => 'Entresenhas concernent aqueste messatge ($1)',
	'translate-edit-in-other-languages' => 'Messatge dins las autras lengas',
	'translate-edit-committed' => 'Traduccions actualas ja dins lo logicial',
	'translate-edit-warnings' => 'Avertiments concernent las traduccions incomplètas',
	'translate-edit-goto-no-prev' => 'Cap de messatge precedent',
	'translate-edit-goto-no-next' => 'Cap de messatge seguent',
	'translate-edit-goto-prev' => 'Editar lo messatge precedent',
	'translate-edit-goto-next' => 'Editar lo messatge seguent',
	'translate-edit-goto-list' => 'Retorn a la tièra',
	'translate-magic-pagename' => 'Traduccion de MediaWiki espandida',
	'translate-magic-help' => "Podètz traduire los aliases de paginas especialas, los mots magics, los noms de skins e los noms d'espacis de noms.

Los aliases de paginas especialas e los mots magics pòdon aver mantuna traduccion.
Las traduccions son separadas per una virgula (,).
Los noms de skins e d'espacis de noms pòdon pas aver qu'una traduccion.

Dins las traduccions d'espacis de noms, <tt>$1 talk</tt> es especial. <tt>$1</tt> es remplaçat pel nom del sit (per exemple <tt>{{SITENAME}} talk</tt>).
S4es pas possible d'obténer una expression valida dins vòstra lenga sens cambiar lo nom del sit, contactatz un desvolopaire.

Vos cal aparténer al grop dels traductors per salvar los cambiaments.
Los cambiaments seràn pas salvats abans que cliquèssetz sul boton « Salvar ».",
	'translate-magic-module' => 'Modul :',
	'translate-magic-submit' => 'Anar',
	'translate-magic-cm-export' => 'Exportar',
	'translate-magic-cm-to-be' => 'Desven',
	'translate-magic-cm-current' => 'Actual',
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-comment' => 'Comentari :',
	'translate-magic-cm-save' => 'Salvar',
	'translate-magic-cm-updatedusing' => 'Mesa a jorn en utilizant [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Lo salvament a pas capitat',
	'translate-magic-special' => 'Pagina especiala d’aliases',
	'translate-magic-words' => 'Mots magics',
	'translate-magic-skin' => 'Nom de las interfàcias',
	'translate-magic-namespace' => 'Intitolat dels espacis de nomenatge',
	'translationchanges' => 'Traduccions modificadas',
	'translationchanges-export' => 'exportar',
	'translationchanges-change' => '$1: $2 per $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Lo paramètre seguent es pas utilizat|Los paramètres seguents son pas utilizats}} : <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Lo paramètre seguent es desconegut|Los paramètres seguents son desconeguts}} : <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'I a un nombre impar de {{PLURAL:$2|parentèsis|parentèsis}} : <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Lo ligam seguent causa|Los ligams seguents causan}} de problèmas : <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Sètz convidat(ada) a corregir {{PLURAL:$2|la balisa seguenta|las balisas seguentas}} : <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'La definicion utiliza <nowiki>{{PLURAL:}}</nowiki> mas pas la traduccion',
	'translate-checks-pagename' => 'Nom d’espaci modificat dempuèi la definicion',
	'translate-checks-format' => 'Aquesta traduccion seguís pas la definicion o a una sintaxi invalida : $1',
	'tog-translate-nonewsletter' => 'Me mandetz pas la letra d’informacion per corrièr (concernís pas que les utilizaires que dispausan d’una adreça de corrièr electronic confirmada)',
	'right-translate' => "Modificar en utilizant l'interfàcia de traduccion",
	'translate-rc-translation-filter' => 'Filtrar las traduccions :',
	'translate-rc-translation-filter-no' => 'Far pas res',
	'translate-rc-translation-filter-only' => 'Afichar unicament las traduccions',
	'translate-rc-translation-filter-filter' => 'Eliminar las traduccions',
	'translate-rc-translation-filter-site' => 'Solament los cambiaments de messatges del sit',
	'translationstats' => 'Estatisticas de traduccion',
	'translate-stats-edits' => 'Edicions per jorn',
	'translate-stats-users' => 'Traductors',
	'translate-statsf-intro' => "Posètz crear d'estatisticas simplas amb aqueste formulari. Totas las valors an de limits maximals e minimals.",
	'translate-statsf-options' => 'Opcions del grafic',
	'translate-statsf-width' => 'Largor en pixels',
	'translate-statsf-height' => 'Nautor en pixels',
	'translate-statsf-days' => 'Periòde en jorns',
	'translate-statsf-scale' => 'Granularitat',
	'translate-statsf-scale-days' => 'Jorns',
	'translate-statsf-scale-hours' => 'Oras',
	'translate-statsf-count' => 'Mesura',
	'translate-statsf-count-edits' => "Nombre d'edicions",
	'translate-statsf-count-users' => 'Traductors actius',
	'translate-statsf-language' => 'Tièra de còdes de lengas, separats per de virgulas',
	'translate-statsf-group' => 'Tièra de còdes de gropes, separats per de virgulas',
	'translate-statsf-submit' => 'Previsualizar',
	'translate-tag-category' => 'Paginas tradusiblas',
	'translate-tag-page-desc' => 'Traduccion de la pagina wiki [[:$1]].',
	'translate-tag-translate-link-desc' => 'Traduire aquesta pagina',
	'translate-tag-legend' => 'Legenda :',
	'translate-tag-legend-fallback' => 'Traduccion dins d’autras lengas',
	'translate-tag-legend-fuzzy' => 'Traduccion fòra de data',
	'translate-tag-fuzzy-comment' => 'Definicion modificada per l’utilizaire [[User:$1|$1]] dins la version $2.',
	'translate-tag-fuzzy-reason' => 'Definicion modificada per l’utilizaire $1 amb per comentari « $3 » dins $2.',
	'translate-sidebar-alltrans' => 'Autras traduccions',
	'translate-tag-noedit' => 'Aquesta pagina es un document de traduccion automaticament mesa a jorn.
Podètz [$1 modificar la pagina font] o [$2 metre a jorn la traduccion].',
	'translations' => 'Totas las traduccions',
	'translations-summary' => 'Picatz un nom de messatge en dejós per mostrar totas las traduccions disponiblas.',
	'translate-translations-no-message' => '« $1 » es pas un messatge traductible',
	'translate-translations-none' => 'I a pas cap de traduccion per « $1 »',
	'translate-translations-fieldset-title' => 'Totas las traduccions',
	'translate-translations-messagename' => 'Messatge :',
	'translate-translations-including-no-param' => 'Especificatz un nom de pagina valid dins lo paramètre de sospagina',
	'languagestats' => 'Estatisticas de lenga',
	'languagestats-summary' => 'Aquesta pagina aficha las estatisticas de traduccion per totes los gropes de messatges ([[MediaWiki:Translate-languagestats-groups|configurats]]) per una lenga.',
	'translate-language-code' => 'Còde de lenga',
	'translate-language-code-field-name' => 'Còde de lenga :',
	'translate-suppress-complete' => 'Suprimir completament los gropes de messatges traduches',
	'translate-language' => 'Lenga :',
	'translate-total' => 'Messatges',
	'translate-untranslated' => 'Pas traduches',
	'translate-percentage-complete' => 'Acabament',
	'translate-percentage-fuzzy' => 'Despassats',
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$messages['os'] = array(
	'translate-edit' => 'баив æй',
	'translate-history' => 'истори',
	'translate-page-language' => 'Æвзаг',
	'translate-page-edit' => 'баив æй',
	'translate-magic-cm-current' => 'Нырыккон',
	'translate-statsf-submit' => 'Разæркаст',
);

/** Polish (Polski)
 * @author Derbeth
 * @author Dodek
 * @author Jwitos
 * @author Leinad
 * @author Maikking
 * @author McMonster
 * @author Qblik
 * @author Sp5uhe
 * @author Wpedzich
 */
$messages['pl'] = array(
	'translate' => 'Przetłumacz',
	'translate-desc' => '[[Special:Translate|Strona specjalna]] umożliwiająca tłumaczenie MediaWiki oraz innych programów',
	'translate-edit' => 'edytuj',
	'translate-talk' => 'dyskusja',
	'translate-history' => 'historia',
	'translate-task-view' => 'zobaczyć wszystkie komunikaty',
	'translate-task-untranslated' => 'zobaczyć wszystkie nieprzetłumaczone komunikaty',
	'translate-task-optional' => 'zobaczyć opcjonalne komunikaty',
	'translate-task-problematic' => 'zobaczyć problematyczne komunikaty',
	'translate-task-review' => 'sprawdzić zmiany',
	'translate-task-reviewall' => 'przejrzeć wszystkie tłumaczenia',
	'translate-task-export' => 'wyeksportować tłumaczenie',
	'translate-task-export-to-file' => 'wyeksportować tłumaczenie do pliku',
	'translate-task-export-as-po' => 'wyeksportować tłumaczenie w formacie Gettext',
	'translate-task-export-to-xliff' => 'wyeksportować tłumaczenie w formacie Xliff',
	'translate-page-no-such-language' => 'Podano nieprawidłowy język.',
	'translate-page-no-such-task' => 'Podano nieprawidłowe zadanie.',
	'translate-page-no-such-group' => 'Podano nieprawidłową grupę.',
	'translate-page-disabled' => "Tłumaczenia na ten język, w tej grupie, zostały wstrzymane z następującego powodu:

''$1''",
	'translate-page-settings-legend' => 'Ustawienia',
	'translate-page-task' => 'Chcę',
	'translate-page-group' => 'Grupa',
	'translate-page-language' => 'Język',
	'translate-page-limit' => 'Ograniczenie',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|komunikat|komunikaty|komunikatów}} na stronę',
	'translate-submit' => 'Wyświetl',
	'translate-page-navigation-legend' => 'Nawigacja',
	'translate-page-showing' => 'Wyświetlone komunikaty od $1 do $2 z $3.',
	'translate-page-showing-all' => 'Wyświetlono $1 {{PLURAL:$1|komunikat|komunikaty|komunikatów}}.',
	'translate-page-showing-none' => 'Brak komunikatów do wyświetlenia.',
	'translate-next' => 'Następna strona',
	'translate-prev' => 'Poprzednia strona',
	'translate-page-description-legend' => 'Informacje na temat grupy',
	'translate-page-edit' => 'edytuj',
	'translate-optional' => '(dodatkowe)',
	'translate-ignored' => '(zignorowane)',
	'translate-edit-definition' => 'Tekst źródłowy komunikatu',
	'translate-edit-contribute' => 'prześlij',
	'translate-edit-no-information' => "''Ten komunikat nie posiada dokumentacji. Jeśli wiesz gdzie lub jak ten komunikat jest używany, możesz pomóc innym tłumaczom przez dodanie dokumentacji do tego komunikatu.''",
	'translate-edit-information' => 'Informacja na temat tego komunikatu ($1)',
	'translate-edit-in-other-languages' => 'Komunikaty w innych językach',
	'translate-edit-committed' => 'Aktualne tłumaczenie oprogramowania',
	'translate-edit-warnings' => 'Ostrzeżenia o niedokończonych tłumaczeniach',
	'translate-edit-goto-no-prev' => 'Brak poprzedniego komunikatu',
	'translate-edit-goto-no-next' => 'Brak następnego komunikatu',
	'translate-edit-goto-prev' => 'Edycja poprzedniego komunikatu',
	'translate-edit-goto-next' => 'Edycja następnego komunikatu',
	'translate-edit-goto-list' => 'Powrót do listy komunikatów',
	'translate-magic-pagename' => 'Rozszerzone tłumaczenie MediaWiki',
	'translate-magic-help' => 'Możliwe jest tłumaczenie aliasów stron specjalnych, magicznych słów, nazw motywów i nazw poszczególnych przestrzeni.

Aliasy stron specjalnych i magiczne słowa mogą mieć wiele tłumaczeń, które oddziela się przecinkiem (,).
Nazwy motywów i przestrzeni mogą mieć tylko po jednym tłumaczeniu.

Podczas tłumaczenia nazw przestrzeni specjalne znaczenie ma zapis <tt>Dyskusja $1</tt>, gdzie <tt>$1</tt> zamieniane jest w nazwę serwisu – na przykład <tt>Dyskusja {{SITENAME}}</tt>.
Jeśli w danym języku niemożliwe jest sformułowanie prawidłowego wpisu bez zmiany nazwy serwisu, należy skontaktować się z deweloperem.

Zapisanie zmian jest możliwe tylko dla członków grupy tłumaczy.
Zmiany nie są zapisywane, dopóki użytkownik nie naciśnie umieszczonego poniżej przycisku „Zapisz”.',
	'translate-magic-module' => 'Moduł',
	'translate-magic-submit' => 'Wyświetl',
	'translate-magic-cm-export' => 'Eksportuj',
	'translate-magic-cm-to-be' => 'Przyszły',
	'translate-magic-cm-current' => 'Aktualny',
	'translate-magic-cm-original' => 'Początkowy',
	'translate-magic-cm-comment' => 'Opis zmian:',
	'translate-magic-cm-save' => 'Zapisz',
	'translate-magic-cm-updatedusing' => 'Uaktualniane za pomocą strony [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Zapis nieudany',
	'translate-magic-special' => 'Aliasy stron specjalnych',
	'translate-magic-words' => 'Magiczne słowa',
	'translate-magic-skin' => 'Nazwy motywów',
	'translate-magic-namespace' => 'Nazwy przestrzeni nazw',
	'translationchanges' => 'Zmiany w tłumaczeniu',
	'translationchanges-export' => 'eksportuj',
	'translationchanges-change' => '$1: $2 przez $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Następujący parametr nie jest wykorzystywany|Następujące parametry nie są wykorzystywane}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Następujący parametr nie jest zdefiniowany|Następujące parametry nie są zdefiniowane}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'W wyrażeniu napotkano {{PLURAL:$2|niedomknięty nawias|nieparzystą liczbę nawiasów}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Następujący link jest problematyczny|Następujące $2 linki są problematyczne|Następujących $2 linków jest problematycznych}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Zastąp {{PLURAL:$2|następujący znacznik prawidłowym|następujące znaczniki prawidłowymi}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Definicja wykorzystuje funkcję <nowiki>{{PLURAL:}}</nowiki>, lecz w tłumaczeniu nie została ona użyta.',
	'translate-checks-pagename' => 'Przestrzeń nazw zmieniona z definicji',
	'translate-checks-format' => 'To tłumaczenie jest niezgodne z definicją lub ma nieprawidłową składnię: $1',
	'tog-translate-nonewsletter' => 'Nie wysyłaj do mnie biuletynów pocztą elektroniczną (dotyczy tylko użytkowników z potwierdzonym adresem e-mail)',
	'right-translate' => 'Edycja z użyciem interfejsu tłumaczeń',
	'translate-rc-translation-filter' => 'Filtruj tłumaczenia:',
	'translate-rc-translation-filter-no' => 'Nic nie rób',
	'translate-rc-translation-filter-only' => 'Pokaż tylko tłumaczenia',
	'translate-rc-translation-filter-filter' => 'Pokaż wszystkie bez tłumaczeń',
	'translate-rc-translation-filter-site' => 'Zmiany w komunikatach wyłącznie tej witryny',
	'translationstats' => 'Statystyki tłumaczenia',
	'translate-stats-edits' => 'Edycji dziennie',
	'translate-stats-users' => 'Tłumacze',
	'translate-statsf-intro' => 'Za pomocą tego formularza możesz wygenerować proste statystyki. Wszystkie wartości posiadają dolne i górne limity.',
	'translate-statsf-options' => 'Opcje wykresu',
	'translate-statsf-width' => 'Szerokość w pikselach',
	'translate-statsf-height' => 'Wysokość w pikselach',
	'translate-statsf-days' => 'Przedział czasu w dniach',
	'translate-statsf-scale' => 'Szczegółowość zachodzenia zmian',
	'translate-statsf-scale-days' => 'Dni',
	'translate-statsf-scale-hours' => 'Godziny',
	'translate-statsf-count' => 'Pomiar',
	'translate-statsf-count-edits' => 'Liczba edycji',
	'translate-statsf-count-users' => 'Aktywni tłumacze',
	'translate-statsf-language' => 'Kody języków oddzielone przecinkami',
	'translate-statsf-group' => 'Kody grup oddzielone przecinkami',
	'translate-statsf-submit' => 'Podgląd',
	'translate-tag-category' => 'Strony do przetłumaczenia',
	'translate-tag-page-desc' => 'Tłumaczenie wiki strony [[:$1]].',
	'translate-tag-translate-link-desc' => 'Przetłumacz tą stronę',
	'translate-tag-legend' => 'Legenda:',
	'translate-tag-legend-fallback' => 'Tłumaczenie w innych językach',
	'translate-tag-legend-fuzzy' => 'Zdezaktualizowane tłumaczenie',
	'translate-tag-fuzzy-comment' => 'Definicja zmieniona przez [[User:$1|$1]] w wersji $2.',
	'translate-tag-fuzzy-reason' => 'Definicja zmieniona przez „$1” z komentarzem „$3” w $2.',
	'translate-sidebar-alltrans' => 'Inne tłumaczenia',
	'translate-tag-noedit' => 'Ta strona jest automatycznie aktualizowaną stroną tłumaczenia.
Możesz [$1 edytować źródło strony] lub [$2 zaktualizować tłumaczenie].',
	'translations' => 'Wszystkie tłumaczenia',
	'translations-summary' => 'Wprowadź poniżej nazwę komunikatu, aby zobaczyć wszystkie dostępne tłumaczenia.',
	'translate-translations-no-message' => 'Komunikatu „$1” nie można przetłumaczyć',
	'translate-translations-none' => 'Nie istnieją tłumaczenia dla „$1”',
	'translate-translations-fieldset-title' => 'Wszystkie tłumaczenia',
	'translate-translations-messagename' => 'Komunikat:',
	'translate-translations-including-no-param' => 'Proszę podaj prawidłową nazwę strony w parametrze podstrony',
	'languagestats' => 'Statystyka językowa',
	'languagestats-summary' => 'Strona pokazuje statystykę tłumaczenia dla wszystkich ([[MediaWiki:Translate-languagestats-groups|skonfigurowanych]]) grup komunikatów we wskazanym języku.',
	'translate-language-code' => 'Kod języka',
	'translate-language-code-field-name' => 'Kod języka:',
	'translate-suppress-complete' => 'Pomiń grupy komunikatów całkowicie przetłumaczone',
	'translate-language' => 'Język',
	'translate-total' => 'Komunikaty',
	'translate-untranslated' => 'Nieprzetłumaczone',
	'translate-percentage-complete' => 'Przetłumaczonych',
	'translate-percentage-fuzzy' => 'Zdezaktualizowanych',
);

/** Piedmontese (Piemontèis)
 * @author Bèrto 'd Sèra
 */
$messages['pms'] = array(
	'translate' => 'Viragi',
	'translate-edit' => 'modìfica',
	'translate-talk' => 'discussion',
	'translate-history' => 'stòria',
	'translate-task-view' => 'smon-e tuti ij messagi ëd',
	'translate-task-untranslated' => 'Smon-e tuti ij messagi nen virà ëd',
	'translate-task-optional' => 'Smon-e ij messagi opsionaj ëd',
	'translate-task-review' => 'Controlé le modìfiche a',
	'translate-task-reviewall' => 'Controlé tuti ij viragi ëd',
	'translate-task-export' => 'Esporté ij viragi ëd',
	'translate-task-export-to-file' => "Esporté ij viragi ant n'archivi da",
	'translate-submit' => 'Smon-e',
	'translate-next' => 'Pàgina anans',
	'translate-prev' => 'Pàgina andré',
	'translate-optional' => '(opsional)',
	'translate-ignored' => '(ignorà)',
	'translate-magic-pagename' => 'Viragi estèis ëd MediaWiki',
	'translate-magic-help' => "A peul viré j'àlias dle pàgine speciaj, le paròle màgiche, ij nòm dle facie e coj djë spassi nominaj. Con le paròle màgiche a venta ch'a buta ëdcò ël viragi n'anglèis, che dësnò a travajo pa pì. Ch'a vardo ëdcò dë lassé ël prim element (0 or 1) tanme ch'a lo treuva. J'àlias dle pàgine soeciaj e le paròle màgiche a peulo avej pì che un viragi. Ij viragi a son separà da vìrgole (,). Ij nòm dle facie e djë spassi nominaj a peulo avej mach un viragi. Ant ël viragi djë spassi nominaj ël cas ëd <tt>$1 talk</tt> a l'é special. <tt>$1</tt> a ven arpiassà col nòm dël sit (pr'esempi <tt>{{SITENAME}} talk</tt>). Se sòn as peul nen fesse an soa lenga për rivé a n'espression bon-a sensa cambié ël nòm dël sit, për piasì, ch'as buta an contat con un programista. A venta ch'a sia ant la partìa dij tradutor për podej salvé soe modìfiche. Le modìfiche as salvo nen fin ch'a-i da nen un colp ansima al al boton ambelessì sota.",
	'translate-magic-submit' => 'Smon-e',
	'translate-magic-cm-export' => 'Esporté',
	'translate-magic-cm-to-be' => 'da esse',
	'translate-magic-cm-current' => 'Corent',
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-save' => 'Salvé',
	'translate-magic-cm-updatedusing' => 'Agiornà ën dovrand [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Salvatagi falì',
	'translate-magic-special' => 'Àlias dle pàgine speciaj',
	'translate-magic-words' => 'Paròle màgiche',
	'translate-magic-skin' => 'Nòm dle facie',
	'translate-magic-namespace' => 'Nòm djë spassi nominaj',
	'translationchanges' => 'Modìfiche ëd viragi',
	'translate-language' => 'Lenga:',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'translate' => 'ژباړل',
	'translate-talk' => 'خبرې اترې',
	'translate-history' => 'پېښليک',
	'translate-task-view' => 'ټول هغه پيغامونه چې دي په',
	'translate-task-untranslated' => 'ټول هغه ناژباړلي پيغامونه چې دي په',
	'translate-page-task' => 'زه غواړم چې',
	'translate-page-group' => 'ډله',
	'translate-page-language' => 'ژبه',
	'translate-page-limit' => 'بريد',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|پيغام|پيغامونه}} په يوه مخ کې',
	'translate-submit' => 'راغونډول',
	'translate-page-navigation-legend' => 'ګرځښت',
	'translate-next' => 'راتلونکی مخ',
	'translate-prev' => 'پخوانی مخ',
	'translate-page-description-legend' => 'د ډلې په اړه مالومات',
	'translate-edit-contribute' => 'ونډه اخيستل',
	'translate-edit-information' => 'د همدې پيغام په اړه مالومات ($1)',
	'translate-edit-in-other-languages' => 'پيغام په نورو ژبو کې',
	'translate-magic-submit' => 'راغونډول',
	'translate-magic-cm-current' => 'اوسنی',
	'translate-magic-cm-original' => 'آرنی',
	'translate-magic-cm-save' => 'خوندي کول',
	'translate-magic-words' => 'کوډګريز وييونه',
	'translationchanges' => 'د ژباړې بدلونونه',
);

/** Portuguese (Português)
 * @author 555
 * @author Lijealso
 * @author Malafaya
 * @author Waldir
 */
$messages['pt'] = array(
	'translate' => 'Traduzir',
	'translate-desc' => '[[Special:Translate|Página especial]] para traduzir o MediaWiki e mais',
	'translate-edit' => 'editar',
	'translate-talk' => 'disc',
	'translate-history' => 'histórico',
	'translate-task-view' => 'Ver todas as mensagens de',
	'translate-task-untranslated' => 'Ver todas as mensagens não traduzidas de',
	'translate-task-optional' => 'Ver mensagens opcionais de',
	'translate-task-untranslatedoptional' => 'Ver mensagens opcionais não traduzidas de',
	'translate-task-problematic' => 'Ver mensagens com problemas',
	'translate-task-review' => 'Rever alterações em',
	'translate-task-reviewall' => 'Rever todas as traduções em',
	'translate-task-export' => 'Exportar traduções de',
	'translate-task-export-to-file' => 'Exportar para ficheiro as traduções de',
	'translate-task-export-as-po' => 'Exportar tradução em formato Gettext',
	'translate-task-export-to-xliff' => 'Exportar tradução em formato Xliff',
	'translate-page-no-such-language' => 'A língua especificada é inválida',
	'translate-page-no-such-task' => 'A tarefa especificada é inválida',
	'translate-page-no-such-group' => 'O grupo especificado é inválido.',
	'translate-page-disabled' => "As traduções para este idioma, neste grupo, foram desabilitadas. Motivo:

''$1''",
	'translate-page-settings-legend' => 'Configurações',
	'translate-page-task' => 'Eu desejo',
	'translate-page-group' => 'Grupo',
	'translate-page-language' => 'Língua',
	'translate-page-limit' => 'Limite',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|mensagem|mensagens}} por página',
	'translate-submit' => 'Trazer',
	'translate-page-navigation-legend' => 'Navegação',
	'translate-page-showing' => 'Exibindo mensagens de $1 a $2 de $3.',
	'translate-page-showing-all' => 'Exibindo $1 {{PLURAL:$1|mensagem|mensagens}}.',
	'translate-page-showing-none' => 'Não há mensagens a serem exibidas.',
	'translate-next' => 'Página seguinte',
	'translate-prev' => 'Página anterior',
	'translate-page-description-legend' => 'Informação sobre o grupo',
	'translate-page-edit' => 'editar',
	'translate-optional' => '(opcional)',
	'translate-ignored' => '(ignorada)',
	'translate-edit-definition' => 'Definição da mensagem',
	'translate-edit-contribute' => 'contribua',
	'translate-edit-no-information' => "''Esta mensagem ainda não foi documentada. Caso você saiba onde ou como ela é utilizada, poderá ajudar outros tradutores adicionando dados sobre esta mensagem.''",
	'translate-edit-information' => 'Informações sobre esta mensagem ($1)',
	'translate-edit-in-other-languages' => 'Mensagem em outros idiomas',
	'translate-edit-committed' => 'Tradução actualmente disponível no software',
	'translate-edit-warnings' => 'Avisos sobre traduções incompletas',
	'translate-edit-goto-no-prev' => 'Não há mensagens anteriores',
	'translate-edit-goto-no-next' => 'Não há mensagens posteriores',
	'translate-edit-goto-prev' => 'Editar mensagem anterior',
	'translate-edit-goto-next' => 'Editar mensagem posterior',
	'translate-edit-goto-list' => 'Voltar à listagem',
	'translate-magic-pagename' => 'Tradução extra do MediaWiki',
	'translate-magic-help' => 'Você pode traduzir alias de páginas especiais, palavras mágicas, nomes de temas (skins) e nomes de espaços nominais.

Os alias de páginas especiais e palavras mágicas podem receber múltiplas traduções, separadas por vírgulas (,).
Nomes de temas e espaços nominais podem receber apenas uma tradução.

Nas traduções de espaços nominais a partícula <tt>$1 talk</tt> é especial. <tt>$1</tt> é trocada pelo nome do sítio (por exemplo, <tt>{{SITENAME}} talk</tt>).
Se não é possível formar em seu idioma expressões válidas sem mexer com o nome do sítio, por gentileza, procure um desenvolvedor.

É necessário pertencer ao grupo de tradutores para conseguir salvar as alterações.
As alterações não serão salvas até que você clique no botão de salvar.',
	'translate-magic-module' => 'Módulo:',
	'translate-magic-submit' => 'Trazer',
	'translate-magic-cm-export' => 'Exportar',
	'translate-magic-cm-to-be' => 'Novo',
	'translate-magic-cm-current' => 'Actual',
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-comment' => 'Comentário:',
	'translate-magic-cm-save' => 'Guardar',
	'translate-magic-cm-updatedusing' => 'Actualizado usando [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Erro ao salvar',
	'translate-magic-special' => 'Alias de páginas especiais',
	'translate-magic-words' => 'Palavras mágicas',
	'translate-magic-skin' => 'Nomes dos temas',
	'translate-magic-namespace' => 'Nomes de espaços nominais',
	'translationchanges' => 'Alterações às traduções',
	'translationchanges-export' => 'exportar',
	'translationchanges-change' => '$1: $2 por $3',
	'translate-checks-parameters' => '{{PLURAL:$2|O seguinte parâmetro não é usado|Os seguintes parâmetros não são usados}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|O parâmetro a seguir é desconhecido|Os parâmetros a seguir são desconhecidos}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Há {{PLURAL:$2|um parênteses irregular|$2 parênteses irregulares}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|O seguinte link possui|Os $2 seguintes links possuem}} problemas: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Por gentileza, troque {{PLURAL:$2|a seguinte tag pela correta|as seguintes tags pelas corretas}}:
<strong>$1</strong>',
	'translate-checks-plural' => 'A definição usa <nowiki>{{PLURAL:}}</nowiki>, mas a tradução não.',
	'translate-checks-format' => 'Esta tradução não segue a definição ou tem uma sintaxe inválida: $1',
	'tog-translate-nonewsletter' => 'Não me enviar newsletters por e-mail (relevante apenas para utilizadores com um endereço de e-mail confirmado)',
	'right-translate' => 'Editar usando a interface de tradução',
	'translate-rc-translation-filter' => 'Filtrar traduções:',
	'translate-rc-translation-filter-no' => 'Não fazer nada',
	'translate-rc-translation-filter-only' => 'Mostrar apenas traduções',
	'translate-rc-translation-filter-filter' => 'Ocultar traduções',
	'translate-rc-translation-filter-site' => 'Apenas alterações a mensagens do sítio',
	'translationstats' => 'Estatísticas de tradução',
	'translate-stats-edits' => 'Edições',
	'translate-stats-users' => 'Tradutores',
	'translate-statsf-intro' => 'Você pode gerar estatísticas simples com este formulário. Todos os valores têm limites máximos e mínimos.',
	'translate-statsf-options' => 'Opções do gráfico',
	'translate-statsf-width' => 'Largura em pixels',
	'translate-statsf-height' => 'Altura em pixels',
	'translate-statsf-days' => 'Período de tempo em dias',
	'translate-statsf-scale' => 'Granularidade',
	'translate-statsf-scale-days' => 'Dias',
	'translate-statsf-scale-hours' => 'Horas',
	'translate-statsf-count-edits' => 'Número de edições',
	'translate-statsf-count-users' => 'Tradutores activos',
	'translate-statsf-language' => 'List separada por vírgulas de códigos de língua',
	'translate-statsf-group' => 'Lista separada por vírgulas de códigos de grupo',
	'translate-statsf-submit' => 'Prever',
	'translate-tag-category' => 'Páginas traduzíveis',
	'translate-tag-page-desc' => 'Tradução da página wiki [[:$1]].',
	'translate-tag-translate-link-desc' => 'Traduzir esta página',
	'translate-tag-legend' => 'Legenda:',
	'translate-tag-legend-fallback' => 'Tradução noutra língua',
	'translate-tag-legend-fuzzy' => 'Tradução desactualizada',
	'translate-tag-fuzzy-comment' => 'Definição medada por [[User:$1|$1]] na revisão $2.',
	'translate-tag-fuzzy-reason' => 'Definição mudada por "$1" com comentário "$3" em $2.',
	'translate-sidebar-alltrans' => 'Outras traduções',
	'translate-tag-noedit' => 'Esta página de tradução é actualizada automaticamente.
Você pode [$1 editar a página de origem] ou [$2 actualizar a tradução].',
	'translations' => 'Todas as traduções',
	'translations-summary' => 'Introduza o título de uma mensagem abaixo para mostrar todas as traduções disponíveis.',
	'translate-translations-no-message' => '"$1" não é uma mensagem traduzível',
	'translate-translations-none' => 'Não existem traduções para "$1"',
	'translate-translations-fieldset-title' => 'Todas as traduções',
	'translate-translations-messagename' => 'Mensagem:',
	'translate-translations-including-no-param' => 'Por favor especifique um nome de página válido no parâmetro subpágina',
	'languagestats' => 'Estatísticas da língua',
	'languagestats-summary' => 'Esta página mostra estatísticas de tradução para todos os grupos de mensagens ([[MediaWiki:Translate-languagestats-groups|configurados]]) para uma língua.',
	'translate-language-code' => 'Código de língua',
	'translate-language-code-field-name' => 'Código de língua:',
	'translate-suppress-complete' => 'Ocultar grupos de mensagens completamente traduzidos',
	'translate-language' => 'Língua',
	'translate-total' => 'Mensagens (total)',
	'translate-untranslated' => 'Não traduzidas',
	'translate-percentage-complete' => 'Progresso',
	'translate-percentage-fuzzy' => 'Obsoletas',
);

/** Tarifit (Tarifit)
 * @author Jose77
 */
$messages['rif'] = array(
	'translate-edit' => 'arri',
	'translate-talk' => 'awal',
	'translate-history' => 'amzruy',
	'translate-page-navigation-legend' => 'Asari',
	'translate-page-edit' => 'arri',
);

/** Rhaeto-Romance (Rumantsch) */
$messages['rm'] = array(
	'translate-edit' => 'editar',
	'translate-talk' => 'discussiun',
	'translate-history' => 'versiuns',
	'translate-next' => 'Proxima pagina',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'translate' => 'Traducere',
	'translate-edit' => 'modifică',
	'translate-history' => 'istoric',
	'translate-task-view' => 'Vizualizez toate mesajele de la',
	'translate-task-untranslated' => 'Vizualizez toate mesajele netraduse de la',
	'translate-task-optional' => 'Vizualizez mesajele opţionale de la',
	'translate-task-untranslatedoptional' => 'Vizualizez mesajele opţionale netraduse de la',
	'translate-task-problematic' => 'Vizualizez mesajele care au probleme',
	'translate-task-export' => 'Exportă traducerile de la',
	'translate-page-no-such-language' => 'Limba specificată este incorectă.',
	'translate-page-no-such-group' => 'Grupul specificat este incorect.',
	'translate-page-task' => 'Doresc să',
	'translate-page-group' => 'Grup',
	'translate-page-language' => 'Limbă',
	'translate-page-limit' => 'Limită',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|mesaj|mesaje}} pe pagină',
	'translate-next' => 'Pagina următoare',
	'translate-prev' => 'Pagina anterioară',
	'translate-page-edit' => 'modifică',
	'translate-optional' => '(opţional)',
	'translate-ignored' => '(ignorat)',
	'translate-edit-goto-list' => 'Înapoi la listă',
	'translate-magic-cm-comment' => 'Comentariu:',
	'translate-magic-cm-save' => 'Salvează',
	'translate-statsf-width' => 'Lăţime în pixeli',
	'translate-statsf-height' => 'Înălţime în pixeli',
	'translate-statsf-days' => 'Perioadă de timp în zile',
	'translate-statsf-scale' => 'Granularitate',
	'translate-statsf-scale-days' => 'Zile',
	'translate-statsf-scale-hours' => 'Ore',
	'translate-statsf-count' => 'Măsură',
	'translate-statsf-count-edits' => 'Număr de modificări',
	'translate-statsf-submit' => 'Previzualizare',
	'translate-tag-page-desc' => 'Traducere a paginii wiki [[:$1]].',
	'translate-tag-translate-link-desc' => 'Tradu această pagină',
	'translate-tag-legend' => 'Legendă:',
	'translate-sidebar-alltrans' => 'Alte traduceri',
	'translations' => 'Toate traducerile',
	'translations-summary' => 'Introduceţi un nume de mesaj mai jos pentru a arăta toate traducerile disponibile.',
	'translate-translations-no-message' => '"$1" nu este un mesaj care poate fi tradus',
	'translate-translations-fieldset-title' => 'Toate traducerile',
	'translate-translations-messagename' => 'Mesaj:',
	'translate-language' => 'Limbă',
	'translate-total' => 'Mesaje',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'translate-magic-cm-original' => 'Origginale',
	'translate-magic-cm-comment' => 'Commende:',
	'translate-magic-cm-save' => 'Reggistre',
);

/** Russian (Русский)
 * @author Ahonc
 * @author Ferrer
 * @author Kaganer
 * @author MaxSem
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'translate' => 'Перевод',
	'translate-desc' => '[[Special:Translate|Служебная страница]] для перевода Mediawiki и прочих программ',
	'translate-edit' => 'править',
	'translate-talk' => 'обсуждение',
	'translate-history' => 'история',
	'translate-task-view' => 'Просмотреть все сообщения',
	'translate-task-untranslated' => 'Просмотреть непереведённые сообщения',
	'translate-task-optional' => 'Просмотреть необязательные сообщения',
	'translate-task-untranslatedoptional' => 'Просмотреть непереведённые необязательные сообщения',
	'translate-task-problematic' => 'Просмотреть проблемные сообщения',
	'translate-task-review' => 'Проверить изменения',
	'translate-task-reviewall' => 'Проверить все переводы',
	'translate-task-export' => 'Выгрузить переводы',
	'translate-task-export-to-file' => 'Выгрузить переводы в файл',
	'translate-task-export-as-po' => 'Выгрузить переводы в формате gettext',
	'translate-task-export-to-xliff' => 'Экспортировать перевод в формате Xliff',
	'translate-page-no-such-language' => 'Передан неверный код языка',
	'translate-page-no-such-task' => 'Неверно указана задача.',
	'translate-page-no-such-group' => 'Неверно указана группа.',
	'translate-page-disabled' => "В этом разделе переводы на данный язык отключены. Причина:

''$1''",
	'translate-page-settings-legend' => 'Параметры',
	'translate-page-task' => 'Я хочу',
	'translate-page-group' => 'Группа',
	'translate-page-language' => 'Язык',
	'translate-page-limit' => 'Ограничение',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|сообщение|сообщения|сообщений}} на страницу',
	'translate-submit' => 'Вывести',
	'translate-page-navigation-legend' => 'Навигация',
	'translate-page-showing' => 'Выведены сообщения с $1 по $2 из $3.',
	'translate-page-showing-all' => 'Выведено $1 {{PLURAL:$1|сообщение|сообщения|сообщений}}.',
	'translate-page-showing-none' => 'Нет сообщений для отображения.',
	'translate-next' => 'следующая страница',
	'translate-prev' => 'предыдущая страница',
	'translate-page-description-legend' => 'Информация о группе',
	'translate-page-edit' => 'Править',
	'translate-optional' => '(необязательное)',
	'translate-ignored' => '(игнорируемое)',
	'translate-edit-definition' => 'Формулировка сообщения',
	'translate-edit-contribute' => 'править',
	'translate-edit-no-information' => "''Это сообщение не имеет описания. Если вы знаете, где или как это сообщение используется, то вы можете помочь другим переводчикам, добавив описание к этому сообщению''",
	'translate-edit-information' => 'Информация об этом сообщении ($1)',
	'translate-edit-in-other-languages' => 'Сообщение на других языках',
	'translate-edit-committed' => 'Текущий перевод в программе',
	'translate-edit-warnings' => 'Предупреждения о неполных переводах',
	'translate-edit-goto-no-prev' => 'Это первое сообщение',
	'translate-edit-goto-no-next' => 'Это последнее сообщение',
	'translate-edit-goto-prev' => 'Править предыдущее сообщение',
	'translate-edit-goto-next' => 'Править следующее сообщение',
	'translate-edit-goto-list' => 'Вернуться к списку',
	'translate-magic-pagename' => 'Углублённый перевод MediaWiki',
	'translate-magic-help' => 'Вы можете переводить псевдонимы служебных страниц, магические слова, названия тем оформления и пространств имён.

Служебные страницы и магические слова могут иметь несколько переводов.

Псевдонимы служебных страниц и магические слова могут иметь несколько вариантов перевода, они разделяются запятой (,).
Названия тем оформления и пространств имён могут иметь только один вариант перевода.

В переводах пространств имён строка «Обсуждение $1» обрабатывается особо, «$1» будет заменено на имя сайта (например «Обсуждение {{SITENAME}}»). Свяжитесь с разработчиками, если подобная грамматическая конструкция невозможна для вашего языка.

Чтобы сохранить изменения вы должны входить в группу переводчиков.
Изменения не будут сохранены, пока вы не нажмёте кнопку ниже.',
	'translate-magic-module' => 'Модуль:',
	'translate-magic-submit' => 'Вывести',
	'translate-magic-cm-export' => 'Выгрузить',
	'translate-magic-cm-to-be' => 'Должно быть',
	'translate-magic-cm-current' => 'Текущее',
	'translate-magic-cm-original' => 'Исходное',
	'translate-magic-cm-comment' => 'Примечание:',
	'translate-magic-cm-save' => 'Сохранить',
	'translate-magic-cm-updatedusing' => 'Обновлено с помощью [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Сохранение не удалось',
	'translate-magic-special' => 'Псевдонимы служебных страниц',
	'translate-magic-words' => 'Магические слова',
	'translate-magic-skin' => 'Названия тем оформления',
	'translate-magic-namespace' => 'Пространства имён',
	'translationchanges' => 'Изменения в переводах',
	'translationchanges-export' => 'выгрузить',
	'translationchanges-change' => '$1: $2 $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Следующий параметр не используется|Следующие параметры не используются}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Неизвестный параметр|Неизвестные параметры}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Непарное количество открывающих и закрывающих скобок:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Следующая ссылка вызывает проблемы|Следующие ссылки вызывают проблемы}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Пожалуйста, исправьте {{PLURAL:$2|следующий тег|следующие теги}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Оригинал использует <nowiki>{{PLURAL:}}</nowiki>, а перевод — нет.',
	'tog-translate-nonewsletter' => 'Не отправлять мне информационный бюллетень по электронной почте (только для участников с подтверждёнными почтовыми адресами)',
	'right-translate' => 'правка с использованием интерфейса перевода',
	'translate-rc-translation-filter' => 'Фильтровать переводы:',
	'translate-rc-translation-filter-no' => 'Без ограничений',
	'translate-rc-translation-filter-only' => 'Показать только переводы',
	'translate-rc-translation-filter-filter' => 'Скрыть переводы',
	'translate-rc-translation-filter-site' => 'Только системные сообщения сайта',
	'translationstats' => 'Статистика переводов',
	'translate-stats-edits' => 'Правок',
	'translate-stats-users' => 'Переводчики',
	'translate-statsf-intro' => 'Эта форма поможет вам создать удобный график. Для всех значений можно задать верхнюю и нижнюю границу.',
	'translate-statsf-scale-days' => 'Дни',
	'translate-statsf-scale-hours' => 'Часы',
	'translate-statsf-submit' => 'Предпросмотр',
	'translate-tag-legend-fuzzy' => 'Устаревший перевод',
	'translate-tag-fuzzy-comment' => 'Изменено в редакции $2 участником [[User:$1|$1]].',
	'translate-tag-fuzzy-reason' => 'Изменено в редакции $2 участником $1 с комментарием «$3».',
	'translate-sidebar-alltrans' => 'Другие переводы',
	'translate-tag-noedit' => 'Это автоматически обновляемая страница с переводом.
Вы можете [$1 отредактировать исходную страницу] или [$2 обновить перевод].',
	'translations' => 'Все переводы',
	'translate-translations-fieldset-title' => 'Все переводы',
	'translate-translations-messagename' => 'Сообщение:',
	'translate-language' => 'Язык',
	'translate-total' => 'Сообщения',
	'translate-untranslated' => 'Непереведённые',
);

/** Yakut (Саха тыла)
 * @author Bert Jickty
 * @author HalanTul
 */
$messages['sah'] = array(
	'translate' => 'Тылбаас',
	'translate-edit' => 'көннөрүү',
	'translate-talk' => 'ырытыы',
	'translate-history' => 'историята',
	'translate-task-view' => 'Этиилэрин барытын',
	'translate-task-untranslated' => 'Тылбаастамматах этиилэрин',
	'translate-submit' => 'Тал',
	'translate-next' => 'Аныгыскы сирэй',
	'translate-prev' => 'Иннинээҕи сирэй',
	'translate-language' => 'Ханнык тылынан:',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'translate' => 'Preložiť',
	'translate-desc' => '[[Special:Translate|Špeciálna stránka]] na preklad MediaWiki a iného',
	'translate-edit' => 'upraviť',
	'translate-talk' => 'diskusia',
	'translate-history' => 'história',
	'translate-task-view' => 'Zobraziť všetky správy z',
	'translate-task-untranslated' => 'Zobraziť všetky nepreložené správy z',
	'translate-task-optional' => 'Zobraziť voliteľné správy z',
	'translate-task-untranslatedoptional' => 'Zobraziť nepreložené voliteľné správy z',
	'translate-task-problematic' => 'Zobraziť problematické správy',
	'translate-task-review' => 'Skontrolovať zmeny v',
	'translate-task-reviewall' => 'Skontrolovať všetky preklady v',
	'translate-task-export' => 'Exportovať preklady z',
	'translate-task-export-to-file' => 'Exportovať preklad do súboru z',
	'translate-task-export-as-po' => 'Exportovať preklad vo formáte Gettext z',
	'translate-task-export-to-xliff' => 'Exportovať preklad vo formáte Xliff',
	'translate-page-no-such-language' => 'Zadaný jazyk bol neplatný.',
	'translate-page-no-such-task' => 'Zadaná úloha bola neplatná.',
	'translate-page-no-such-group' => 'Zadaná skupina bola neplatná.',
	'translate-page-disabled' => "Preklady v tejto skupine do tohto jazyka boli zakázané. Dôvod:

''$1''",
	'translate-page-settings-legend' => 'Nastavenia',
	'translate-page-task' => 'Chcem',
	'translate-page-group' => 'Skupina',
	'translate-page-language' => 'Jazyk',
	'translate-page-limit' => 'Limit',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|správa|správy|správ}} na stránku',
	'translate-submit' => 'Vykonať',
	'translate-page-navigation-legend' => 'Navigácia',
	'translate-page-showing' => 'Zobrazujú sa správy od $1 do $2 z $3.',
	'translate-page-showing-all' => '{{PLURAL:$1|Zobrazuje sa $1 správa|Zobrazujú sa $1 správy|Zobrazuje sa $1 správ}}.',
	'translate-page-showing-none' => 'Žiadne správy.',
	'translate-next' => 'Ďalšia stránka',
	'translate-prev' => 'Predošlá stránka',
	'translate-page-description-legend' => 'Informácie o skupine',
	'translate-page-edit' => 'upraviť',
	'translate-optional' => '(voliteľné)',
	'translate-ignored' => '(ignorované)',
	'translate-edit-definition' => 'Definícia správy',
	'translate-edit-contribute' => 'prispejte',
	'translate-edit-no-information' => "''Táto správa nie je zdokumentovaná. Ak viete kde alebo ako je táto správa použitá, môžete pomôcť ostatným prekladateľom tým, že jej pridáte dokumentáciu.''",
	'translate-edit-information' => 'Informácie o tejto správe ($1)',
	'translate-edit-in-other-languages' => 'Správa v iných jazykoch',
	'translate-edit-committed' => 'Aktuálny preklad v softvéri',
	'translate-edit-warnings' => 'Upozornenia na neúplné preklady',
	'translate-edit-goto-no-prev' => 'Žiadna predošlá správa',
	'translate-edit-goto-no-next' => 'Žiadna ďalšia správa',
	'translate-edit-goto-prev' => 'Upraviť predošlú správu',
	'translate-edit-goto-next' => 'Upraviť ďalšiu správu',
	'translate-edit-goto-list' => 'Späť na zoznam',
	'translate-magic-pagename' => 'Rozšírený preklad MediaWiki',
	'translate-magic-help' => 'Môžete prekladať aliasy špeciálnych stránok, magické slová, názvy tém vzhľadu a názvy menných priestorov.

Aliasy špeciálnych stránok a magických slov môžu mať viacero prekladov.
Preklady sa oddeľujú čiarkami („,“).
Názvy tém vzhľadu a názvy menných priestorov môžu mať iba jeden preklad.

V prekladoch menných priestorov je <tt>$1 talk</tt> špeciálne. <tt>$1</tt> sa nahradí názvom webovej lokality (napr. <tt>{{SITENAME}} talk</tt>). Ak vo vašom jazyku nie je možné vytvoriť zmysluplný výraz bez zmeny názvu webovej lokality, prosím, kontaktujte vývojára.

Aby ste mohli ukladať zmeny, musíte byť členom skupiny translators.
Zmeny sa neuložia, kým nekliknete na tlačidlo Uložiť dolu.',
	'translate-magic-module' => 'Modul:',
	'translate-magic-submit' => 'Vykonať',
	'translate-magic-cm-export' => 'Exportovať',
	'translate-magic-cm-to-be' => 'Má byť',
	'translate-magic-cm-current' => 'Aktuálna',
	'translate-magic-cm-original' => 'Pôvodná',
	'translate-magic-cm-comment' => 'Komentár:',
	'translate-magic-cm-save' => 'Uložiť',
	'translate-magic-cm-updatedusing' => 'Aktualizované pomocou [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Uloženie sa nepodarilo',
	'translate-magic-special' => 'Aliasy špeciálnych stránok',
	'translate-magic-words' => 'Magické slová',
	'translate-magic-skin' => 'Názvy tém vzhľadu',
	'translate-magic-namespace' => 'Názvy menných priestorov',
	'translationchanges' => 'Zmeny v preklade',
	'translationchanges-export' => 'export',
	'translationchanges-change' => '$1: $2 ($3)',
	'translate-checks-parameters' => '{{PLURAL:$2|Nasledovný parameter nie je použitý|Nasledovné parametre nie sú použité}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Nasledovný parameter je neznámy|Nasledovné parametre sú neznáme}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Nevyvážené počty {{PLURAL:$2|zátvoriek|zátvoriek}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Nasledovný odkaz je problematický|Nasledovné odkazy sú problematické}}: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Prosím, nahraďte {{PLURAL:$2|nasledovnú značku správnou|nasledovné značky správnymi}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Definícia používa <nowiki>{{PLURAL:}}</nowiki>, ale preklad nie.',
	'translate-checks-pagename' => 'Oproti definícii sa zmenil menný priestor',
	'translate-checks-format' => 'Tento preklad nezodpovedá definícii alebo má neplatnú syntax: $1',
	'tog-translate-nonewsletter' => 'Neposielať mi novinky emailom (týka sa iba používateľov s potvrdenou emailovou adresou)',
	'right-translate' => 'Vykonávať úpravy pomocou rozhrania Preložiť',
	'translate-rc-translation-filter' => 'Preklady filtrov:',
	'translate-rc-translation-filter-no' => 'Nevykonávať nič',
	'translate-rc-translation-filter-only' => 'Iba zobraziť preklady',
	'translate-rc-translation-filter-filter' => 'Vyfiltrovať preklady',
	'translate-rc-translation-filter-site' => 'Iba zmeny oznamu lokality',
	'translationstats' => 'Štatistiky prekladov',
	'translate-stats-edits' => 'Úprav za deň',
	'translate-stats-users' => 'Prekladatelia',
	'translate-statsf-intro' => 'Pomocou tohto formulára môžete tvoriť jednoduché štatistiky. Všetky hodnoty majú hornú a spodnú hranicu.',
	'translate-statsf-options' => 'Možnosti grafu',
	'translate-statsf-width' => 'Šírka v pixeloch',
	'translate-statsf-height' => 'Výška v pixeloch',
	'translate-statsf-days' => 'Časový interval v dňoch',
	'translate-statsf-scale' => 'Granularita',
	'translate-statsf-scale-days' => 'Dni',
	'translate-statsf-scale-hours' => 'Hodiny',
	'translate-statsf-count' => 'Meranie',
	'translate-statsf-count-edits' => 'Počet úprav',
	'translate-statsf-count-users' => 'Aktívni prekladatelia',
	'translate-statsf-language' => 'Čiarkami oddelený zoznam kódov jazykov',
	'translate-statsf-group' => 'Čiarkami oddelený zoznam kódov skupín',
	'translate-statsf-submit' => 'Náhľad',
	'translate-tag-category' => 'Preložiteľné stránky',
	'translate-tag-page-desc' => 'Preklad wiki stránky [[:$1]].',
	'translate-tag-translate-link-desc' => 'Preložiť túto stránku',
	'translate-tag-legend' => 'Legenda:',
	'translate-tag-legend-fallback' => 'Preklad v inom jazyku',
	'translate-tag-legend-fuzzy' => 'Neaktuálny preklad',
	'translate-tag-fuzzy-comment' => 'Definíciu zmenil [[User:$1|$1]] v revízii $2.',
	'translate-tag-fuzzy-reason' => 'Definíciu zmenil „$1” v revízii $2 s komentárom „$3”.',
	'translate-sidebar-alltrans' => 'Iné preklady',
	'translate-tag-noedit' => 'Táto stránka je automaticky aktualizovaná stránka prekladu.
Môžete [$1 upravovať zdrojovú stránku] alebo [$2 aktualizovať preklad].',
	'translations' => 'Všetky preklady',
	'translations-summary' => 'Všetky dostupné preklady zobrazíte po zadaní názvu správy.',
	'translate-translations-no-message' => '„$1“ nie je správa, ktorú možno preložiť',
	'translate-translations-none' => 'Neexistujú žiadne preklady správy „$1“',
	'translate-translations-fieldset-title' => 'Všetky preklady',
	'translate-translations-messagename' => 'Správa:',
	'translate-translations-including-no-param' => 'Prosím, v parametri subpage uveďte platný názov stránky',
	'languagestats' => 'Štatistika jazykov',
	'languagestats-summary' => 'Táto stránka zobrazuje štatistiku prekladov všetkých ([[MediaWiki:Translate-languagestats-groups|nastavených]]) skupín správ jazyka.',
	'translate-language-code' => 'Kód jazyka',
	'translate-language-code-field-name' => 'Kód jazyka:',
	'translate-suppress-complete' => 'Nevypisovať kompletne preložené skupiny správ',
	'translate-language' => 'Jazyk:',
	'translate-total' => 'Správy',
	'translate-untranslated' => 'Nepreložené',
	'translate-percentage-complete' => 'Dokončené',
	'translate-percentage-fuzzy' => 'Zastaralé',
	'translate-languagestats-groups' => ' # Pridajte ID skupín správ, po jednom na riadok, čím obmedzíte skupiny správ
 # zobrazované na Special:LanguageStats. Neexistujúce ID skupín správ budú
 # ignorované.',
);

/** Somali (Soomaaliga)
 * @author Mimursal
 */
$messages['so'] = array(
	'translate' => 'Tarjun',
	'translate-language' => 'Luqad:',
);

/** Albanian (Shqip)
 * @author Dori
 */
$messages['sq'] = array(
	'translate' => 'Përkthime',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Sasa Stefanovic
 */
$messages['sr-ec'] = array(
	'translate' => 'Превод',
	'translate-edit' => 'уреди',
	'translate-talk' => 'разговор',
	'translate-history' => 'историја',
	'translate-page-settings-legend' => 'Подешавања',
	'translate-page-task' => 'Желим да',
	'translate-page-group' => 'Група',
	'translate-page-language' => 'Језик',
	'translate-page-limit' => 'Граница',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|порука|поруке|порука}} по страни',
	'translate-submit' => 'Добави',
	'translate-page-navigation-legend' => 'Навигација',
	'translate-next' => 'Следећа страна',
	'translate-prev' => 'Претходна страна',
	'translate-edit-in-other-languages' => 'Порука на другим језицима',
	'translate-magic-cm-export' => 'Извоз',
	'translate-magic-cm-current' => 'Тренутно',
	'translate-magic-cm-original' => 'Оригинал',
	'translate-magic-cm-comment' => 'Коментар:',
	'translate-magic-cm-save' => 'Сачувај',
	'translationchanges-export' => 'извоз',
);

/** latinica (latinica) */
$messages['sr-el'] = array(
	'translate' => 'Prevod',
);

/** Swati (SiSwati)
 * @author Jatrobat
 * @author MF-Warburg
 */
$messages['ss'] = array(
	'translate' => 'Kuhúmusha',
	'translate-edit' => 'kúhlela',
	'translate-history' => 'umlandvo',
);

/** Seeltersk (Seeltersk)
 * @author Maartenvdbent
 * @author Pyt
 */
$messages['stq'] = array(
	'translate' => 'Uursät',
	'translate-edit' => 'Beoarbaidje',
	'translate-talk' => 'Diskussion',
	'translate-history' => 'Versione',
	'translate-task-view' => 'Wies aal Systemättergjuchte fon',
	'translate-task-untranslated' => 'Wies aal nit uursätte Systemättergjuchte fon',
	'translate-task-optional' => 'Bekiek optionoale Ättergjuchte fon',
	'translate-task-review' => 'Wröigje Annerengen bit',
	'translate-task-reviewall' => 'Wröigje aal Uursättengen in',
	'translate-task-export' => 'Exportier aal Uursättengen fon',
	'translate-task-export-to-file' => 'Exportier aal Uursättengen in ne Doatäi fon',
	'translate-submit' => 'Hoal',
	'translate-next' => 'Naiste Siede',
	'translate-prev' => 'Foarige Siede',
	'translate-optional' => '(optional)',
	'translate-ignored' => '(ignorierd)',
);

/** Sundanese (Basa Sunda)
 * @author Irwangatot
 * @author Kandar
 */
$messages['su'] = array(
	'translate' => 'Alih basakeun',
	'translate-desc' => '[[Special:Translate|Kaca husus]] keur narjamahkeun Mediawiki',
	'translate-edit' => 'édit',
	'translate-talk' => 'sawala',
	'translate-history' => 'Jujutan',
	'translate-task-view' => 'Tembongkeun kabeh talatah ti',
	'translate-task-untranslated' => 'Tembongkeun talatah nu acan ditarjamahkeun ti',
	'translate-task-optional' => 'Tembongkeun talatah piliheun ti',
	'translate-task-review' => 'Témbongkeun parobahan ti',
	'translate-task-reviewall' => 'Témbongkeun kabeh parobahan dina',
	'translate-task-export' => 'Ékspor tarjamahan ti',
	'translate-task-export-to-file' => 'Ékspor tarjamahan ka koropak ti',
	'translate-task-export-as-po' => 'Ékspor tarjamahan ka format Gettext ti',
	'translate-page-no-such-language' => 'Basa anu dipilih teu kaci.',
	'translate-page-no-such-task' => 'Gaweun anu dipilih teu kaci.',
	'translate-page-no-such-group' => 'Jumplukan nu dipilih teu kaci.',
	'translate-page-disabled' => "Narjamahkeun dina basa ieu geus dinon-aktifkeun. Alesana:

''$1''",
	'translate-page-settings-legend' => 'Pangatur',
	'translate-page-task' => 'Kuring hayang',
	'translate-page-group' => 'Jumplukan',
	'translate-page-language' => 'Basa',
	'translate-page-limit' => 'Batesan',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|talatah|talatah}} per kaca',
	'translate-submit' => 'Kintun',
	'translate-page-navigation-legend' => 'Pituduh',
	'translate-page-showing' => 'Tembongan talatah $1 nepi $2 ti $3.',
	'translate-page-showing-all' => 'Tembongan $1 {{PLURAL:$1|talatah|talatah}}.',
	'translate-page-showing-none' => 'Teu aya talatah nu tiasa ditembongkeun.',
	'translate-next' => 'Kaca salajengna',
	'translate-prev' => 'Kaca saméméhna',
	'translate-page-description-legend' => 'Informasi ngeunaan grup',
	'translate-optional' => '(piliheun)',
	'translate-edit-definition' => 'Definisi talatah',
	'translate-edit-contribute' => 'milu ngédit',
	'translate-edit-no-information' => "''Talatah ieu teu ngabogaan dokuméntasi. Lamun Anjeun nyaho di mana sarta kumaha talatah ieu dipaké, Anjeun bisa nulungan panarjamah séjén kalawan nambahan dokuméntasi pikeun talatah ieu.''",
	'translate-edit-information' => 'Informasi ngeunaan talatah ieu ($1)',
	'translate-edit-in-other-languages' => 'Talatah dina basa séjén',
	'translate-edit-committed' => 'Parobahan anu aya di pakakas',
	'translate-edit-warnings' => 'Panginget ngeunaan tarjamahan anu teu pepek',
	'translate-magic-pagename' => 'Landian tarjamahan Mediawiki',
	'translate-magic-help' => "Anjeun bisa narjamahkuen landian pikeun kaca husus, kecap magis, ngaran kulit, sarta ngaran ''ngaranspasi''.

Pikeun kecap magis, Anjeun perlu nyantumkeun ogé tarjamahan basa Inggris atawa baris lumangsung kasalahan. Ogé tetep nyantumkeun item kahiji (0 atawa 1) kitu waé.

Landian pikeun halaman husus sarta kecap magis bisa ngabogaan leuwih ti hiji tarjamahan anu lainna dipisahkan ku koma (,). Ngaran kulit sarta ngaranspasi ngan bisa ngabogaan hiji tarjamahan.

Dina tarjamahan ngaranspasi <tt>$1 talk</tt> diperlakukan husus. <tt>$1</tt>  digantikeun kalawan ngaran loka (contona {{SITENAME}} talk).
Lamun basa Anjeun henteu matak bisa pikeun nyieun hiji ekspresi anu valid tanpa ngaganti ngaran loka, sumangga kontak salah saurang pengembang.

Anjeun perlu jadi anggota grup panarjamah pikeun nyimpen parobahan. Parobahan moal disimpen nepi ka Anjeun ngaklik tombol simpen di handapeun.",
	'translate-magic-submit' => 'Kintun',
	'translate-magic-cm-export' => 'Ekspor',
	'translate-magic-cm-to-be' => 'Jadina',
	'translate-magic-cm-current' => 'Kiwari',
	'translate-magic-cm-comment' => 'Kamandang:',
	'translate-magic-cm-save' => 'Simpen',
	'translate-magic-cm-updatedusing' => 'Dirobah ngagunakeun [[Special:Magic]]',
	'translate-magic-special' => 'Landian kaca husus',
	'translate-magic-words' => 'Kecap magis',
	'translate-magic-skin' => 'Ngaran kulit',
	'translate-magic-namespace' => 'Ngaran ngaranspasi',
	'translationchanges' => 'Parobahan tarjamahan',
	'translationchanges-change' => '$1: $2 ku $3',
	'translate-checks-xhtml' => 'Sok ganti tag-tag ieu kalawan tag anu pas:<strong>$1</strong>',
	'right-translate' => 'Édit migunakeun antarmuka panarjamah',
	'translate-language' => 'Basa:',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author Lejonel
 * @author M.M.S.
 * @author Najami
 * @author Sannab
 */
$messages['sv'] = array(
	'translate' => 'Översätt',
	'translate-desc' => '[[Special:Translate|Specialsida]] för översättning av Mediawiki och annat',
	'translate-edit' => 'redigera',
	'translate-talk' => 'diskussion',
	'translate-history' => 'historik',
	'translate-task-view' => 'se alla meddelanden från',
	'translate-task-untranslated' => 'se alla oöversatta meddelanden från',
	'translate-task-optional' => 'se valfria systemmeddelanden från',
	'translate-task-untranslatedoptional' => 'visa oöversatta valfria meddelanden från',
	'translate-task-problematic' => 'visa meddelanden som har problem',
	'translate-task-review' => 'granska ändringar av',
	'translate-task-reviewall' => 'granska alla översättningar av',
	'translate-task-export' => 'exportera översättningar från',
	'translate-task-export-to-file' => 'exportera översättningar till fil från',
	'translate-task-export-as-po' => 'exportera översättningar i Gettext-format från',
	'translate-task-export-to-xliff' => 'exportera översättningar i Xliff-format',
	'translate-page-no-such-language' => 'Det angivna språket är inte giltigt.',
	'translate-page-no-such-task' => 'Den angivna åtgärden är inte giltig.',
	'translate-page-no-such-group' => 'Den angivna gruppen är inte giltig.',
	'translate-page-disabled' => "Översättningar till det här språket i den här gruppen har stängts av. Anledning:

''$1''",
	'translate-page-settings-legend' => 'Inställningar',
	'translate-page-task' => 'Jag vill',
	'translate-page-group' => 'Grupp',
	'translate-page-language' => 'Språk',
	'translate-page-limit' => 'Antal',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|meddelande|meddelanden}} per sida',
	'translate-submit' => 'Hämta',
	'translate-page-navigation-legend' => 'Navigering',
	'translate-page-showing' => 'Visar meddelande $1 till $2 av $3.',
	'translate-page-showing-all' => 'Visar $1 {{PLURAL:$1|meddelande|meddelanden}}.',
	'translate-page-showing-none' => 'Det finns inga meddelanden att visa.',
	'translate-next' => 'Nästa sida',
	'translate-prev' => 'Föregående sida',
	'translate-page-description-legend' => 'Information om gruppen',
	'translate-page-edit' => 'redigera',
	'translate-optional' => '(valfritt)',
	'translate-ignored' => '(används ej)',
	'translate-edit-definition' => 'Definition av meddelandet',
	'translate-edit-contribute' => 'bidra',
	'translate-edit-no-information' => "''Det här meddelandet har ingen dokumentation. Om du vet var eller hur detta meddelande används, så kan du hjälpa andra översättare genom att skriva dokumentation för meddelandet.''",
	'translate-edit-information' => 'Information om detta meddelande ($1)',
	'translate-edit-in-other-languages' => 'Meddelandet på andra språk',
	'translate-edit-committed' => 'Nuvarande översättning i mjukvaran',
	'translate-edit-warnings' => 'Varningar om fel i översättningen',
	'translate-edit-goto-no-prev' => 'Inget föregående meddelande',
	'translate-edit-goto-no-next' => 'Inget nästa meddelande',
	'translate-edit-goto-prev' => 'Redigera föregående meddelande',
	'translate-edit-goto-next' => 'Redigera nästa meddelande',
	'translate-edit-goto-list' => 'Tillbaka till listan',
	'translate-magic-pagename' => 'Utökad MediaWiki-översättning',
	'translate-magic-help' => 'Du kan översätta alias för specialsidor, magiska ord, skin-namn och namnrymdsnamn.

Alias för specialsidor och magiska ord kan ha flera översättningar.
Översättningar skiljs åt med ett komma (,).
Skin-namn och namnrymder kan endast ha en översättning.

Vid översättning av namnrymder så är <tt>$1 talk</tt> speciellt. <tt>$1</tt> ersätts med webbplatsens namn (till exempel <tt>{{SITENAME}} talk</tt>).
Om det inte är möjligt att skapa en giltig översättning till ditt språk utan att ändra webbplatsens namn, så ta kontakt med en utvecklare.

För att kunna spara ändringar så behöver du tillhöra översättargruppen.
Ändringar sparas inte förrän du klickar på spara-knappen nedan.',
	'translate-magic-module' => 'Modul:',
	'translate-magic-submit' => 'Hämta',
	'translate-magic-cm-export' => 'Exportera',
	'translate-magic-cm-to-be' => 'Att-bli',
	'translate-magic-cm-current' => 'Nuvarande',
	'translate-magic-cm-original' => 'Original',
	'translate-magic-cm-comment' => 'Kommentar:',
	'translate-magic-cm-save' => 'Spara',
	'translate-magic-cm-updatedusing' => 'Uppdaterad med hjälp av [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Det gick ej att spara',
	'translate-magic-special' => 'Alias till specialsidor',
	'translate-magic-words' => 'Magiska ord',
	'translate-magic-skin' => 'Skin-namn',
	'translate-magic-namespace' => 'Namnrymdsnamn',
	'translationchanges' => 'Ändrade översättningar',
	'translationchanges-export' => 'exportera',
	'translationchanges-change' => '$1: $2 av $3',
	'translate-checks-parameters' => 'Följande {{PLURAL:$2|parameter|parametrar}} används inte: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => 'Följande {{PLURAL:$2|parameter är okänd|parametrar är okända}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Det är ett ojämnt antal {{PLURAL:$2|paranteser|paranteser}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => 'Följande {{PLURAL:$2|länk|länkar}} är problematiska: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Följande felaktiga {{PLURAL:$2|tagg|taggar}} bör ersättas: <strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => '<nowiki>{{PLURAL:}}</nowiki> används i definitionen, men inte i översättningen.',
	'translate-checks-pagename' => 'Namnrymden ändrad från definitionen',
	'translate-checks-format' => 'Den här översättningen följer inte definitionen eller har ogiltig syntax: $1',
	'tog-translate-nonewsletter' => 'Sänd mig inte nyhetsbrev (gäller endast användare med bekräftad e-postadress)',
	'right-translate' => 'Redigera genom översättningsgränssnittet',
	'translate-rc-translation-filter' => 'Filtrera översättningar:',
	'translate-rc-translation-filter-no' => 'Gör ingenting',
	'translate-rc-translation-filter-only' => 'Visa endast översättningar',
	'translate-rc-translation-filter-filter' => 'Filtrera bort översättningar',
	'translate-rc-translation-filter-site' => 'Endast ändringar till {{SITENAME}}-meddelanden',
	'translationstats' => 'Översättningsstatistik',
	'translate-stats-edits' => 'Redigeringar per dag',
	'translate-stats-users' => 'Översättare',
	'translate-statsf-intro' => 'Du kan generera enkel statistik genom detta formulär. Alla värden ska ha övre och nedre gränser.',
	'translate-statsf-options' => 'Diagramalternativ',
	'translate-statsf-width' => 'Bredd i pixlar',
	'translate-statsf-height' => 'Höjd i pixlar',
	'translate-statsf-days' => 'Tidsperiod i dagar',
	'translate-statsf-scale' => 'Kornighet',
	'translate-statsf-scale-days' => 'Dagar',
	'translate-statsf-scale-hours' => 'Timmar',
	'translate-statsf-count' => 'Storlek',
	'translate-statsf-count-edits' => 'Antal redigeringar',
	'translate-statsf-count-users' => 'Aktiva översättare',
	'translate-statsf-language' => 'Kommaseparerad lista över språkkoder',
	'translate-statsf-group' => 'Kommaseparerad lista över gruppkoder',
	'translate-statsf-submit' => 'Förhandsgranska',
	'translate-tag-category' => 'Översättningsbara sidor',
	'translate-tag-page-desc' => 'Översättning av wikisidan [[:$1]].',
	'translate-tag-translate-link-desc' => 'Översätt den här sidan',
	'translate-tag-legend' => 'Förklaring:',
	'translate-tag-legend-fallback' => 'Översättning i ett annat språk',
	'translate-tag-legend-fuzzy' => 'Föråldrad översättning',
	'translate-tag-fuzzy-comment' => 'Definition ändrad av [[User:$1]] i sidversion $2.',
	'translate-tag-fuzzy-reason' => 'Definition ändrad av användare $1 med kommentaren "$3" i $2.',
	'translate-sidebar-alltrans' => 'Andra översättningar',
	'translate-tag-noedit' => 'Den här sidan är en automatisk uppdaterad översättning.
Du kan [$1 redigera källsidan] eller [$2 uppdatera översättningen].',
	'translations' => 'Alla översättningar',
	'translations-summary' => 'Skriv in ett namn på ett meddelande nedan för att visa alla tillgängliga översättningar.',
	'translate-translations-no-message' => '"$1" är inte ett översättningsbart meddelande',
	'translate-translations-none' => 'Det finns inga översättningar för "$1"',
	'translate-translations-fieldset-title' => 'Alla översättningar',
	'translate-translations-messagename' => 'Meddelande:',
	'translate-translations-including-no-param' => 'Var god specifiera ett giltigt sidnamn i undersideparametern',
	'languagestats' => 'Språkstatistik',
	'languagestats-summary' => 'Den här sidan visar översättningsstatistik för alla ([[MediaWiki:Translate-languagestats-groups|konfigurerade]]) meddelandegrupper för ett språk.',
	'translate-language-code' => 'Språkkod',
	'translate-language-code-field-name' => 'Språkkod:',
	'translate-suppress-complete' => 'Visa inte helt översatta meddelandegrupper',
	'translate-language' => 'Språk',
	'translate-total' => 'Meddelanden',
	'translate-untranslated' => 'Oöversatta',
	'translate-percentage-complete' => 'Avklarat',
	'translate-percentage-fuzzy' => 'Föråldrat',
);

/** Silesian (Ślůnski)
 * @author Herr Kriss
 * @author Pimke
 */
$messages['szl'] = array(
	'translate-edit' => 'sprowjéj',
	'translate-history' => 'historjo',
	'translate-next' => 'Nostympno zajta',
	'translate-prev' => 'Popředńo zajta',
);

/** Tamil (தமிழ்)
 * @author Trengarasu
 */
$messages['ta'] = array(
	'translate' => 'மொழிப்பெயர்ப்பு',
	'translate-edit' => 'தொகு',
	'translate-talk' => 'உரையாடல்',
	'translate-history' => 'வரலாறு',
	'translate-page-no-such-language' => 'குறித்த மொழி செல்லுபடியற்றதாகும்.',
	'translate-page-language' => 'மொழி',
	'translate-next' => 'அடுத்தப் பக்கம்',
	'translate-prev' => 'முந்தைய பக்கம்',
	'translate-magic-cm-save' => 'பக்கத்தை சேமி',
	'translate-magic-cm-savefailed' => 'சேமிப்பு தோல்வி',
	'translationchanges-export' => 'ஏற்றுமதி',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'translate' => 'అనువదించు',
	'translate-desc' => 'మీడియావికీ మరియు ఆపైవాటిని అనువదించడానికి [[Special:Translate|ప్రత్యేక పేజీ]]',
	'translate-edit' => 'మార్చు',
	'translate-talk' => 'చర్చ',
	'translate-history' => 'చరిత్ర',
	'translate-task-view' => 'అన్ని సందేశాలు చూడాలనుకుంటున్నాను',
	'translate-task-untranslated' => 'అన్ని అనువాదంకాని సందేశాలు చూడాలనుకుంటున్నాను',
	'translate-task-optional' => 'ఐచ్చిక సందేశాలు చూడాలనుకుంటున్నాను',
	'translate-task-review' => 'మార్పులని సమీక్షించాలనుకుంటున్నాను',
	'translate-task-reviewall' => 'అన్ని అనువాదాలనూ సమీక్షించాలనుకుంటున్నాను',
	'translate-task-export' => 'అనువాదాలని ఎగుమతి చేయాలి',
	'translate-page-no-such-language' => 'ఎంచుకున్న భాష సరైనది కాదు.',
	'translate-page-no-such-task' => 'ఎంచుకున్న పని సరైనది కాదు.',
	'translate-page-no-such-group' => 'ఇచ్చిన సమూహం సరైనది కాదు.',
	'translate-page-settings-legend' => 'అమరికలు',
	'translate-page-task' => 'నేను',
	'translate-page-group' => 'సమూహం',
	'translate-page-language' => 'భాష',
	'translate-page-limit' => 'పరిమితి',
	'translate-page-limit-option' => 'పేజీకి $1 {{PLURAL:$1|సందేశం|సందేశాలు}}',
	'translate-submit' => 'తీసుకురా',
	'translate-page-navigation-legend' => 'మార్గదర్శకం',
	'translate-page-showing' => 'మొత్తం $3 సందేశాల్లో $1 నుండి $2 వరకు చూపిస్తున్నాం.',
	'translate-page-showing-all' => '$1 {{PLURAL:$1|సందేశాన్ని|సందేశాలను}} చూపిస్తున్నాం.',
	'translate-page-showing-none' => 'ఇంక సందేశాలేమీ లేవు.',
	'translate-next' => 'తర్వాతి పేజీ',
	'translate-prev' => 'క్రితం పేజీ',
	'translate-page-description-legend' => 'ఈ సమూహం గురించిన సమాచారం',
	'translate-page-edit' => 'మార్చు',
	'translate-optional' => '(ఐచ్ఛికం)',
	'translate-ignored' => '(ఉపేక్షించినది)',
	'translate-edit-definition' => 'సందేశ నిర్వచనం',
	'translate-edit-no-information' => "''ఈ సందేశానికి సహాయ సమాచారం లేదు. ఈ సందేశాన్ని ఎక్కడ లేదా ఎలా ఉపయోగిస్తారో మీకు తెలిస్తే, దీనికి తగిన సమాచారం చేర్చి ఇతర అనువాదకులకు తొడ్పడవచ్చు.''",
	'translate-edit-information' => 'ఈ సందేశం గురించి సమాచారం ($1)',
	'translate-edit-in-other-languages' => 'ఇతర భాషలలోని సందేశాలు',
	'translate-edit-committed' => 'సాఫ్ట్&zwnj;వేర్&zwnj;లో ప్రస్తుతమున్న అనువాదం',
	'translate-edit-warnings' => 'అసంపూర్తి అనువాదాల గురించి హెచ్చరికలు',
	'translate-edit-goto-no-prev' => 'గత సందేశాలేమీ లేవు',
	'translate-edit-goto-no-next' => 'తర్వాత సందేశాలు లేవు',
	'translate-edit-goto-prev' => 'గత సందేశానికి',
	'translate-edit-goto-next' => 'తర్వాతి సందేశానికి',
	'translate-edit-goto-list' => 'తిరిగి జాబితాకి',
	'translate-magic-submit' => 'తీసుకురా',
	'translate-magic-cm-export' => 'ఎగుమతి చేయండి',
	'translate-magic-cm-current' => 'ప్రస్తుత',
	'translate-magic-cm-original' => 'అసలు',
	'translate-magic-cm-comment' => 'వ్యాఖ్య:',
	'translate-magic-cm-save' => 'భద్రపరచు',
	'translate-magic-special' => 'ప్రత్యేక పేజీల మారుపేర్లు',
	'translate-magic-words' => 'మాయా పదాలు',
	'translationchanges' => 'అనువాద మార్పులు',
	'translationchanges-export' => 'ఎగుమతించు',
	'translationchanges-change' => '$1: $3 చే $2',
	'translate-checks-parameters' => 'ఈ {{PLURAL:$2|పారామీటరుని|పారామీటర్లని}} వాడనేలేదు:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => 'ఈ {{PLURAL:$2|పారామీటరు|పారామీటర్లు}} తెలియనివి:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'బ్రాకెట్లు సరి సంఖ్యలో లేవు: <strong>$1</strong>',
	'translate-checks-links' => 'ఈ {{PLURAL:$2|లింకు సమస్యాత్మకంగా ఉంది|$2 లింకులు సమస్యాత్మకంగా ఉన్నాయి}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'ఈ {{PLURAL:$2|టాగుని సరైన దానితో|టాగులని సరైన వాటితో}} మార్చండి:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'అసలు సందేశంలో <nowiki>{{PLURAL:}}</nowiki> అనివుంది కానీ అనువాదంలో లేదు.',
	'translate-rc-translation-filter' => 'అనువాదాల పడపోత:',
	'translate-rc-translation-filter-only' => 'అనువాదాలు మాత్రమే చూపించు',
	'translationstats' => 'అనువాద గణాంకాలు',
	'translate-stats-users' => 'అనువాదకులు',
	'translate-statsf-scale-days' => 'రోజులు',
	'translate-statsf-scale-hours' => 'గంటలు',
	'translate-sidebar-alltrans' => 'ఇతర అనువాదాలు',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$messages['tet'] = array(
	'translate' => 'Tradús',
	'translate-edit' => 'edita',
	'translate-talk' => 'diskusaun',
	'translate-history' => 'istória',
	'translate-task-view' => 'Haree mensajen hotu husi',
	'translate-page-task' => "Ha'u hakarak",
	'translate-page-group' => 'Lubu',
	'translate-page-language' => 'Lian',
	'translate-submit' => 'Hola',
	'translate-page-showing-all' => 'Dalan $1 {{PLURAL:$1|mensajen|mensajen}}.',
	'translate-next' => 'Pájina oinmai',
	'translate-page-description-legend' => 'Informasaun kona-ba lubu',
	'translate-edit-in-other-languages' => 'Mensajen iha lian seluk',
	'translate-magic-submit' => 'Hola',
	'translate-language' => 'Lian',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'translate' => 'Тарҷума',
	'translate-desc' => '[[Special:Translate|Саҳифаи вижа]] барои тарҷумаи МедиаВики ва бартар аз он',
	'translate-edit' => 'вироиш',
	'translate-talk' => 'баҳс',
	'translate-history' => 'таърих',
	'translate-task-view' => 'Намоиши тамоми пайғомҳо аз',
	'translate-task-untranslated' => 'Намоиши тамоми пайғомҳои тарҷуманашуда аз',
	'translate-task-optional' => 'Намоиши пайғомҳои ихтиёрӣ аз',
	'translate-task-review' => 'Бозбинии тағйирот',
	'translate-task-reviewall' => 'Бозбинии тамоми тарҷумаҳо дар',
	'translate-task-export' => 'Судури тарҷумаҳо аз',
	'translate-task-export-to-file' => 'Судури тарҷумаҳо ба як парванда аз',
	'translate-task-export-as-po' => 'Судури тарҷумаҳо дар қолаби Gettext',
	'translate-page-no-such-language' => 'Забони мушаххасшуда ғайримиҷоз аст.',
	'translate-page-no-such-task' => 'Амали мушаххасшуда ғайримиҷоз аст.',
	'translate-page-no-such-group' => 'Гурӯҳи мушаххасшуда ғайримиҷоз аст.',
	'translate-page-settings-legend' => 'Танзимот',
	'translate-page-task' => 'Ман мехоҳам',
	'translate-page-group' => 'Гурӯҳ',
	'translate-page-language' => 'Забон',
	'translate-page-limit' => 'Ҳудуд',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|пайғом|пайғомҳо}} дар ҳар саҳифа',
	'translate-submit' => 'Вокашидан',
	'translate-page-navigation-legend' => 'Гаштан',
	'translate-page-showing' => 'Намоиши пайғомҳои $3 аз $1 то $2.',
	'translate-page-showing-all' => 'Намоиши $1 {{PLURAL:$1|пайғом|пайғомҳо}}.',
	'translate-page-showing-none' => 'Пайғоме барои намоиши вуҷуд надорад.',
	'translate-next' => 'Саҳифаи баъдӣ',
	'translate-prev' => 'Саҳифаи қаблӣ',
	'translate-page-description-legend' => 'Иттилоот дар бораи гурӯҳ',
	'translate-optional' => '(ихтиёрӣ)',
	'translate-ignored' => '(нодида гирифташуда)',
	'translate-edit-definition' => 'Таърифи пайғом',
	'translate-edit-contribute' => 'ҳиссагузорӣ',
	'translate-edit-no-information' => "''Ин пайғом дорои тавзеҳот нест.
Агар шумо медонед ин пағом чигуна ё дар куҷо истифода мешавад, шумо метавонед бо изофа кардани тавзеҳот ба ин пайғом ба дигар тарҷумакунандагон кӯмак кунед.''",
	'translate-edit-information' => 'Иттилоот дар мавриди ин пайғом ($1)',
	'translate-edit-in-other-languages' => 'Ҳамин пайғом дар дигар забонҳо',
	'translate-edit-committed' => 'Тарҷумаи феълӣ дар нармафзор',
	'translate-edit-warnings' => 'Ҳушдор дар мавриди тарҷумаҳои нокомил',
	'translate-magic-pagename' => 'Тарҷумаи густаришёфтаи МедиаВики',
	'translate-magic-submit' => 'Вокашидан',
	'translate-magic-cm-export' => 'Судур',
	'translate-magic-cm-to-be' => 'Будан',
	'translate-magic-cm-current' => 'Кунунӣ',
	'translate-magic-cm-original' => 'Аслӣ',
	'translate-magic-cm-comment' => 'Тавзеҳот:',
	'translate-magic-cm-save' => 'Захира',
	'translate-magic-cm-updatedusing' => 'Барӯз шуд тавассути [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Шикаст дар захира кардан',
	'translate-magic-words' => 'Калимаҳои ҷодуӣ',
	'translate-magic-skin' => 'Исми пӯстаҳо',
	'translate-magic-namespace' => 'Исми фазоҳои ном',
	'translationchanges' => 'Тағйироти тарҷума',
	'translationchanges-export' => 'судур',
	'translationchanges-change' => '$1: $2 аз тарафи $3',
	'translate-checks-parameters' => 'Параметрҳои зерин истифода нашудаанд: <strong>$1</strong>',
);

/** Thai (ไทย)
 * @author Ans
 * @author Manop
 * @author Passawuth
 */
$messages['th'] = array(
	'translate' => 'แปล',
	'translate-desc' => '[[Special:Translate|หน้าพิเศษ]]สำหรับแปลมีเดียวิกิและอื่น ๆ',
	'translate-edit' => 'แก้ไข',
	'translate-talk' => 'พูดคุย',
	'translate-history' => 'ประวัติ',
	'translate-task-view' => 'ดูข้อความทั้งหมด จาก',
	'translate-task-untranslated' => 'ดูข้อความทั้งหมดที่ยังไม่ได้แปล จาก',
	'translate-task-optional' => 'ดูข้อความที่สามารถเลือกได้จาก',
	'translate-task-problematic' => 'ดูข้อความที่มีปัญหา',
	'translate-task-review' => 'ตรวจดูสิ่งที่เปลี่ยนแปลง ใน',
	'translate-task-reviewall' => 'ตรวจดูข้อความทั้งหมดที่แปลแล้ว ใน',
	'translate-task-export' => 'ส่งงานแปลออกมา (export) จาก',
	'translate-task-export-to-file' => 'ส่งงานแปลออกมา (export) เป็นไฟล์ จาก',
	'translate-task-export-as-po' => 'ส่งงานแปลออกมา (export) ในรูปแบบ Gettext จาก',
	'translate-page-no-such-language' => 'ใส่รหัสภาษาไม่ถูกต้อง',
	'translate-page-no-such-task' => 'ใส่ชื่องานไม่ถูกต้อง',
	'translate-page-no-such-group' => 'ใส่ชื่อกลุ่มไม่ถูกต้อง',
	'translate-page-settings-legend' => 'กำหนดค่า',
	'translate-page-task' => 'ต้องการ',
	'translate-page-group' => 'กลุ่ม',
	'translate-page-language' => 'ภาษา',
	'translate-page-limit' => 'ไม่เกิน',
	'translate-page-limit-option' => '$1 ข้อความต่อหน้า',
	'translate-submit' => 'ดึงข้อมูล',
	'translate-page-navigation-legend' => 'แถบนำทาง',
	'translate-page-showing' => 'แสดงตั้งแต่ข้อความที่ $1 ถึง $2 จากทั้งหมด $3 ข้อความ',
	'translate-page-showing-all' => 'แสดง $1 ข้อความ',
	'translate-page-showing-none' => 'ไม่มีข้อความแสดง',
	'translate-next' => 'หน้าถัดไป',
	'translate-prev' => 'หน้าก่อน',
	'translate-page-description-legend' => 'ข้อมูลเกี่ยวกับกลุ่มข้อความ',
	'translate-page-edit' => 'แก้ไข',
	'translate-optional' => '(สามารถเลือกได้)',
	'translate-ignored' => '(เพิกเฉย)',
	'translate-edit-definition' => 'นิยามข้อความ',
	'translate-edit-contribute' => 'ช่วยเขียน',
	'translate-edit-no-information' => "''ข้อความนี้ไม่มีคำอธิบายการใช้งาน.  ถ้าคุณทราบว่าข้อความนี้ใช้ตรงส่วนไหนหรือใช้อย่างไร, คุณสามารถช่วยเพิ่มคำอธิบายการใช้งานของข้อความนี้ เพื่อเป็นประโยชน์แก่ผู้แปลคนอื่นๆ ได้.''",
	'translate-edit-information' => 'ข้อมูลเกี่ยวกับข้อความนี้ ($1)',
	'translate-edit-in-other-languages' => 'ข้อความนี้ในภาษาอื่นๆ',
	'translate-edit-committed' => 'ข้อความแปลที่ฝังอยู่ในตัวโปรแกรม',
	'translate-edit-warnings' => 'คำเตือนเกี่ยวกับงานแปลที่ยังไม่เสร็จสมบูรณ์',
	'translate-edit-goto-no-prev' => 'ไม่มีข้อความก่อนหน้านี้',
	'translate-edit-goto-no-next' => 'ไม่มีข้อความถัดไป',
	'translate-edit-goto-prev' => 'แก้ไขข้อความก่อนหน้านี้',
	'translate-edit-goto-next' => 'แก้ไขข้อความถัดไป',
	'translate-edit-goto-list' => 'กลับไปที่รายชื่อ',
	'translate-magic-pagename' => 'ส่วนเพิ่มเติมของการแปลมีเดียวิกิ',
	'translate-magic-help' => 'คุณสามารถแปลชื่อหน้าพิเศษต่าง ๆ, ตัวแปรพิเศษ, ชื่อแบบหน้าตา และ ชื่อเนมสเปซ

ในตัวแปรพิเศษ กรุณาใส่คำแปลภาษาอังกฤษไปด้วยเช่นเดียวกัน มิฉะนั้นมันจะหยุดทำงาน กรุณาเว้นอันแรก (0 หรือ 1) อย่างที่มันเป็น

ชื่อหน้าพิเศษและตัวแปรพิเศษสามารถมีคำแปลได้หลายอย่าง
คำแปลจะแยกโดยการใช้ จุลภาค (,)
ชื่อแบบหน้าตาและเนมสเปซสามารถมีคำแปลได้แค่คำเดียว

ในคำแปลชื่อเนมสเปซ <tt>คุยเรื่อง$1</tt> ต้องระวังเป็นพิเศษ <tt>$1</tt> จะถูกแทนที่โดยชื่อเว็บไซต์ (เช่น <tt>คุยเรื่อง{{SITENAME}}</tt>)
ถ้าไม่สามารถกระทำการดังกล่าวได้ในภาษาของคุณ, กรุณาติดต่อผู้ดูแลระบบขั้นสูง

คุณต้องอยู่ในกลุ่มคนแปลเพื่อที่จะบันทึกข้อมูลได้
ข้อมูลจะไม่ถูกบันทึกตราบใดที่คุณยังไม่กด "บันทึก"',
	'translate-magic-module' => 'โมดูล:',
	'translate-magic-submit' => 'ดึงข้อมูล',
	'translate-magic-cm-export' => 'ส่งออกมา (export)',
	'translate-magic-cm-to-be' => 'แก้เป็น',
	'translate-magic-cm-current' => 'ปัจจุบัน',
	'translate-magic-cm-original' => 'ต้นฉบับ',
	'translate-magic-cm-comment' => 'หมายเหตุ:',
	'translate-magic-cm-save' => 'บันทึก',
	'translate-magic-cm-updatedusing' => 'แก้ไขด้วย [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'บันทึกไม่สำเร็จ',
	'translate-magic-special' => 'ชื่อ alias ของหน้าพิเศษ',
	'translate-magic-words' => 'ตัวแปรพิเศษ',
	'translate-magic-skin' => 'ชื่อแบบหน้าตา',
	'translate-magic-namespace' => 'ชื่อเนมสเปซ',
	'translationchanges' => 'สิ่งที่เปลี่ยนแปลงในงานแปล',
	'translationchanges-export' => 'ส่งออกมา (export)',
	'translationchanges-change' => '$1: $2 โดย $3',
	'translate-checks-parameters' => '{{PLURAL:$2|ตัวแปร|ตัวแปร}}ต่อไปนี้ไม่ได้รับการใช้งาน: <strong>$1</strong>',
	'translate-checks-balance' => 'จับคู่วงเล็บไม่ครบคู่: <strong>$1</strong>',
	'translate-checks-links' => 'ลิงก์ต่อไปนี้ทำให้เกิดปัญหา: <strong>$1</strong>',
	'translate-checks-xhtml' => 'tag เหล่านี้ไม่ถูกต้อง กรุณาแก้ไขโดยใช้ tag ที่ถูกต้อง: <strong>$1</strong>',
	'translate-checks-plural' => 'ข้อความต้นฉบับใช้ <nowiki>{{PLURAL:}}</nowiki> ในขณะที่ข้อความที่แปลแล้วไม่ได้ใช้',
	'translate-rc-translation-filter' => 'ที่กรองการแปล:',
	'translate-rc-translation-filter-no' => 'ไม่ทำอะไรทั้งสิ้น',
	'translate-rc-translation-filter-only' => 'แสดงงานแปลเท่านั้น',
	'translate-rc-translation-filter-filter' => 'เอางานแปลออก',
	'translationstats' => 'สถิติการแปล',
	'translate-stats-edits' => 'การแก้ไขต่อหนึ่งวัน',
	'translate-stats-users' => 'ผู้แปล',
	'translate-statsf-width' => 'ความกว้างในหน่วยพิกเซล',
	'translate-statsf-height' => 'ความสูงในหน่วยพิกเซล',
	'translate-statsf-scale-days' => 'วัน',
	'translate-statsf-scale-hours' => 'ชั่วโมง',
	'translate-statsf-count-edits' => 'จำนวนการแก้ไข',
	'translate-translations-fieldset-title' => 'การแปลทั้งหมด',
	'translate-translations-messagename' => 'ข้อความ:',
	'languagestats' => 'สถิติภาษา',
	'translate-language-code' => 'รหัสภาษา',
	'translate-language-code-field-name' => 'รหัสภาษา:',
	'translate-language' => 'ภาษา',
	'translate-total' => 'ข้อความ',
	'translate-untranslated' => 'ไม่ได้แปล',
	'translate-percentage-complete' => 'สมบูรณ์',
	'translate-percentage-fuzzy' => 'ล้าสมัย',
);

/** Turkish (Türkçe)
 * @author Karduelis
 * @author Srhat
 */
$messages['tr'] = array(
	'translate' => 'Çeviri',
	'translate-edit' => 'Değiştir',
	'translate-talk' => 'tartışma',
	'translate-history' => 'Geçmiş',
	'translate-page-settings-legend' => 'Ayarlar',
	'translate-page-task' => 'Seç',
	'translate-page-group' => 'Grup',
	'translate-page-language' => 'Dil',
	'translate-page-limit' => 'Sınır',
	'translate-submit' => 'Getir',
	'translate-next' => 'İleri',
	'translate-prev' => 'Geri',
	'translate-optional' => '(isteğe bağlı)',
	'translate-ignored' => '(yok sayılan)',
	'translate-edit-contribute' => 'Katkıda bulun',
	'translate-magic-submit' => 'Getir',
	'translate-magic-cm-to-be' => 'Yap',
	'translate-magic-cm-current' => 'Güncelle',
	'translate-magic-cm-original' => 'Orjinal',
	'translate-magic-cm-comment' => 'Açıklama :',
	'translate-magic-cm-save' => 'Kaydet',
);

/** Tatar (Cyrillic) (Tatarça/Татарча (Cyrillic))
 * @author Himiq Dzyu
 */
$messages['tt-cyrl'] = array(
	'translate' => 'Тәрҗемә',
	'translate-desc' => '[[Special:Translate|Махсус бит]] MediaWiki һәм башка программлар тәрҗемә итү өчен',
	'translate-edit' => 'үзгәртү',
);

/** Uighur (Uyghurche‎ / ئۇيغۇرچە) */
$messages['ug'] = array(
	'translate-edit' => 'uzgartish',
	'translate-talk' => 'monazire',
	'translate-history' => 'tarih',
);

/** Ukrainian (Українська)
 * @author AS
 * @author Ahonc
 */
$messages['uk'] = array(
	'translate' => 'Переклад',
	'translate-desc' => '[[Special:Translate|Спеціальна сторінка]] для перекладу Mediawiki та інших програм',
	'translate-edit' => 'редагувати',
	'translate-talk' => 'обговорення',
	'translate-history' => 'історія',
	'translate-task-view' => 'Переглянути всі повідомлення',
	'translate-task-untranslated' => 'Переглянути неперекладені повідомлення',
	'translate-task-optional' => "Переглянути необов'язкові повідомлення",
	'translate-task-problematic' => 'Переглянути проблемні повідомлення',
	'translate-task-review' => 'Перевірити зміни',
	'translate-task-reviewall' => 'Перевірити всі переклади',
	'translate-task-export' => 'Експортувати переклади',
	'translate-task-export-to-file' => 'Експортувати переклади до файлу',
	'translate-task-export-as-po' => 'Експортувати переклади у форматі gettext',
	'translate-task-export-to-xliff' => 'Експортувати переклад у форматі Xliff',
	'translate-page-no-such-language' => 'Зазначена неправильна мова.',
	'translate-page-no-such-task' => 'Зазначене неправильне завдання.',
	'translate-page-no-such-group' => 'Зазначена неправильна група.',
	'translate-page-disabled' => "Переклади на цю мову в цій групі вимкнені. Причина:

''$1''",
	'translate-page-settings-legend' => 'Параметри',
	'translate-page-task' => 'Я хочу',
	'translate-page-group' => 'Група',
	'translate-page-language' => 'Мова',
	'translate-page-limit' => 'Обмеження',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|повідомлення|повідомлення|повідомлень}} на сторінку',
	'translate-submit' => 'Вивести',
	'translate-page-navigation-legend' => 'Навігація',
	'translate-page-showing' => 'Показані повідомлення з $1 по $2 із $3.',
	'translate-page-showing-all' => '{{PLURAL:$1|Показане $1 повідомлення|Показані $1 повідомлення|Показані $1 повідомлень}}.',
	'translate-page-showing-none' => 'Нема повідомлень для відображення.',
	'translate-next' => 'наступна сторінка',
	'translate-prev' => 'попередня сторінка',
	'translate-page-description-legend' => 'Інформація про групу',
	'translate-page-edit' => 'редагувати',
	'translate-optional' => "(необов'язкове)",
	'translate-ignored' => '(ігнорується)',
	'translate-edit-definition' => 'Текст повідомлення',
	'translate-edit-contribute' => 'редагувати',
	'translate-edit-no-information' => "''Це повідомлення не має опису.
Якщо ви знаєте, де чи як воно використовується, ви можете допомогти іншим перекладачам, додавши опис для цього повідомлення.''",
	'translate-edit-information' => 'Інформація про це повідомлення ($1)',
	'translate-edit-in-other-languages' => 'Повідомлення іншими мовами',
	'translate-edit-committed' => 'Поточний переклад у програмі',
	'translate-edit-warnings' => 'Попередження про неповні переклади',
	'translate-edit-goto-no-prev' => 'Немає попереднього повідомлення',
	'translate-edit-goto-no-next' => 'Немає наступного повідомлення',
	'translate-edit-goto-prev' => 'Редагувати попереднє повідомлення',
	'translate-edit-goto-next' => 'Редагувати наступне повідомлення',
	'translate-edit-goto-list' => 'Назад до списку',
	'translate-magic-pagename' => 'Поглиблений переклад MediaWiki',
	'translate-magic-help' => "Ви можете перекладати псевдоніми спеціальних сторінок, магічні слова, назви тем оформлення і просторів назв.

Псевдоніми спеціальних сторінок і магічні слова можуть мати декілька варіантів перекладу, які розділяються комою (,).
Назви тем оформлення та простори назв можуть мати тільки один переклад.

У перекладах просторів назв рядок <tt>Обговорення $1</tt> обробляється по-особливому. <tt>$1</tt> буде замінено на назву сайту (наприклад <tt>Обговорення {{SITENAME}}</tt>). Зв'яжіться з розробниками, якщо подібна граматична конструкція невірна для вашої мови.

Щоб зберегти зміни, ви повинні належати до групи перекладачів.
Зміни не будуть збережені, поки ви не натиснете кнопку нижче.",
	'translate-magic-module' => 'Модуль:',
	'translate-magic-submit' => 'Вивести',
	'translate-magic-cm-export' => 'Експортувати',
	'translate-magic-cm-to-be' => 'Має бути',
	'translate-magic-cm-current' => 'Поточне',
	'translate-magic-cm-original' => 'Вихідне',
	'translate-magic-cm-comment' => 'Коментар:',
	'translate-magic-cm-save' => 'Зберегти',
	'translate-magic-cm-updatedusing' => 'Оновлено за допомогою [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Не вдалося зберегти',
	'translate-magic-special' => 'Псевдоніми спеціальних сторінок',
	'translate-magic-words' => 'Магічні слова',
	'translate-magic-skin' => 'Назви тем оформлення',
	'translate-magic-namespace' => 'Простори назв',
	'translationchanges' => 'Зміни в перекладах',
	'translationchanges-export' => 'експортувати',
	'translationchanges-change' => '$1: $2 $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Наступний параметр не використовується|Наступні параметри не використовуються}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Наступний параметр невідомий|Наступні параметри невідомі}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Непарна кількість відкритих і закритих дужок:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Наступне посилання проблематичне|Наступні посилання проблематичні}} : <strong>$1</strong>',
	'translate-checks-xhtml' => 'Будь ласка, виправте {{PLURAL:$2|наступний тег|наступні теги}}: <strong>$1</strong>',
	'translate-checks-plural' => 'Оригінал використовує <nowiki>{{PLURAL:}}</nowiki>, а переклад — ні.',
	'tog-translate-nonewsletter' => 'Не надсилати мені інформаційні бюлетені (тільки для користувачів з підтвердженими адресами електронної пошти)',
	'right-translate' => 'Редагування з використанням інтерфейсу перекладу',
	'translate-rc-translation-filter' => 'Фільтр перекладів:',
	'translate-rc-translation-filter-no' => 'Немає',
	'translate-rc-translation-filter-only' => 'Показати тільки переклади',
	'translate-rc-translation-filter-filter' => 'Без перекладів',
	'translate-rc-translation-filter-site' => 'Повідомлення сайту',
	'translationstats' => 'Статистика перекладів',
	'translate-stats-edits' => 'Редагувань за день',
	'translate-stats-users' => 'Перекладачі',
	'translate-statsf-intro' => 'Ця форма допоможе вам створити зручний графік. Для всіх значень можна задати верхню і нижню межі.',
	'translate-statsf-options' => 'Параметри графіка',
	'translate-statsf-width' => 'Ширина в пікселях',
	'translate-statsf-height' => 'Висота в пікселях',
	'translate-statsf-days' => 'Час у днях',
	'translate-statsf-scale-days' => 'Дні',
	'translate-statsf-scale-hours' => 'Години',
	'translate-statsf-count-edits' => 'Кількість редагувань',
	'translate-statsf-count-users' => 'Активні перекладачі',
	'translate-statsf-language' => 'Список кодів мови, розділених комами',
	'translate-statsf-group' => 'Список кодів групи мов, розділених комами',
	'translate-statsf-submit' => 'Перегляд',
	'translate-tag-category' => 'Сторінки, що можуть бути перекладені',
	'translate-tag-page-desc' => 'Переклад сторінки [[:$1]].',
	'translate-tag-translate-link-desc' => 'Перекласти цю сторінку',
	'translate-tag-legend' => 'Легенда:',
	'translate-tag-legend-fallback' => 'Переклад на іншу мову',
	'translate-tag-legend-fuzzy' => 'Застарілий переклад',
	'translate-tag-fuzzy-comment' => 'Змінено у версії $2 користувачем [[User:$1|$1]].',
	'translate-tag-fuzzy-reason' => 'Змінено у версії $2 користувачем $1 з коментарем «$3».',
	'translate-sidebar-alltrans' => 'Інші переклади',
	'translate-tag-noedit' => 'Це автоматично оновлювана сторінка з перекладом.
Ви можете [$1 відредагувати початкову сторінку] або [$2 оновити переклад].',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'translate' => 'Tradussion',
	'translate-desc' => '[[Special:Translate|Pagina speciale]] par tradur MediaWiki e altro',
	'translate-edit' => 'modifica',
	'translate-talk' => 'discussion',
	'translate-history' => 'storia',
	'translate-task-view' => 'Vardar tuti i messagi de',
	'translate-task-untranslated' => 'Vardar tuti i messagi non tradoti de',
	'translate-task-optional' => 'Vardar i messagi opsionali de',
	'translate-task-problematic' => 'Varda i messagi che gà dei problemi',
	'translate-task-review' => 'Rivardar i canbiamenti a',
	'translate-task-reviewall' => 'Rivardar tute le tradussion in',
	'translate-task-export' => 'Esportar le tradussion da',
	'translate-task-export-to-file' => 'Esportar in un file le tradussion da',
	'translate-task-export-as-po' => 'Esportar le tradussion in formato Gettext',
	'translate-page-no-such-language' => 'La lengua indicà no la xe valida.',
	'translate-page-no-such-task' => "L'azion indicà no la xe valida.",
	'translate-page-no-such-group' => "El grupo indicà no'l xe valido.",
	'translate-page-settings-legend' => 'Inpostassion',
	'translate-page-task' => 'Mi vôi',
	'translate-page-group' => 'Grupo',
	'translate-page-language' => 'Lengua',
	'translate-page-limit' => 'Limite',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|messagio|messagi}} par pagina',
	'translate-submit' => 'Mostra',
	'translate-page-navigation-legend' => 'Navigassion',
	'translate-page-showing' => 'Sti qua i xe i messagi da $1 a $2 de $3.',
	'translate-page-showing-all' => 'Ghe xe $1 {{PLURAL:$1|messagio|messagi}}.',
	'translate-page-showing-none' => 'Nissun messagio da far védar.',
	'translate-next' => 'Pagina sucessiva',
	'translate-prev' => 'Pagina preçedente',
	'translate-page-description-legend' => 'Informassion sul grupo',
	'translate-optional' => '(opsionale)',
	'translate-ignored' => '(ignorà)',
	'translate-edit-definition' => 'Definission del messagio',
	'translate-edit-contribute' => 'contribuìssi',
	'translate-edit-no-information' => "''Sto messagio no'l gà documentassion.
Se te sè dove o come sto messagio el vien doparà, te podi jutar altri tradutori zontando documentassion a sto messagio.''",
	'translate-edit-information' => 'Informassion su sto messagio ($1)',
	'translate-edit-in-other-languages' => 'Sto messagio in altre lengue',
	'translate-edit-committed' => 'Tradussion atuale del software',
	'translate-edit-warnings' => 'Avertimenti su tradussion incomplete',
	'translate-magic-pagename' => 'Tradussion estesa de MediaWiki',
	'translate-magic-help' => 'Te pol tradur i alias de le pagine speciali, le parole magiche, i nomi de le skin e i nomi dei namespace.

I alias e le parole magiche le pol verghe più tradussion.
Le tradussion le xe separà da na virgola (,).
I nomi de le skin e dei namespace i pol verghe na tradussion sola.

In te le tradussion dei namespace <tt>$1 talk</tt> el xe speciale. <tt>$1</tt> el vien sostituìo col nome del sito (par esenpio <tt>{{SITENAME}} talk</tt>).
Se ne la to lengua no se riesse a scrivar na espression valida sensa canbiar el nome del sito, par piaser contata un svilupador.

Te ghè da èssar nel grupo dei tradutori par salvar i canbiamenti.
I canbiamenti no i xe salvà finché no te struchi el boton qua soto.',
	'translate-magic-submit' => 'Mostra',
	'translate-magic-cm-export' => 'Esporta',
	'translate-magic-cm-to-be' => 'Nova',
	'translate-magic-cm-current' => 'Atuale',
	'translate-magic-cm-original' => 'Originàl',
	'translate-magic-cm-comment' => 'Comento:',
	'translate-magic-cm-save' => 'Salva',
	'translate-magic-cm-updatedusing' => 'Agiornà doparando [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Salvatagio mìa riussìo',
	'translate-magic-special' => 'Nomi alternativi de le pagine speciali',
	'translate-magic-words' => 'Parole magiche',
	'translate-magic-skin' => 'Nomi de le skin',
	'translate-magic-namespace' => 'Nomi dei namespace',
	'translationchanges' => 'Modifiche a le tradussion',
	'translationchanges-export' => 'esporta',
	'translationchanges-change' => '$1: $2 da $3',
	'translate-checks-parameters' => "{{PLURAL:$2|El seguente parametro no'l|I seguenti parametri no i}} xe mìa doparà: <strong><nowiki>$1</nowiki></strong>",
	'translate-checks-balance' => 'Ghe xe un nùmaro dispari de {{PLURAL:$2|paréntesi|paréntesi}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|El colegamento seguente el|I colegamenti seguenti i}} pol causar problemi:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Par piaser, sostituìssi {{PLURAL:$2|el seguente tag con quel giusto|i seguenti tag con quei giusti}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'La definission la dòpara <nowiki>{{PLURAL:}}</nowiki> ma la tradussion no.',
	'tog-translate-nonewsletter' => 'No stà mandarme notiziari par e-mail (solo utenti che gà un indirisso e-mail convalidà)',
	'right-translate' => "Modifica doparando l'interfacia de tradussion",
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'translate' => 'Biên dịch',
	'translate-desc' => '[[Special:Translate|Trang đặc biệt]] dùng để dịch Mediawiki và các thứ khác',
	'translate-edit' => 'sửa đổi',
	'translate-talk' => 'thảo luận',
	'translate-history' => 'lịch sử',
	'translate-task-view' => 'Xem tất cả các thông điệp từ',
	'translate-task-untranslated' => 'Xem tất cả các thông điệp chưa dịch từ',
	'translate-task-optional' => 'Xem các thông điệp tùy chọn từ',
	'translate-task-problematic' => 'Xem các thông báo có vấn đề',
	'translate-task-review' => 'Kiểm lại các thay đổi trong',
	'translate-task-reviewall' => 'Kiểm lại tất cả các bản dịch trong',
	'translate-task-export' => 'Xuất các bản dịch từ',
	'translate-task-export-to-file' => 'Xuất bản dịch ra tập tin từ',
	'translate-task-export-as-po' => 'Xuất bản dịch theo dạng Gettext',
	'translate-task-export-to-xliff' => 'Xuất bản dịch theo định dạng Xliff',
	'translate-page-no-such-language' => 'Ngôn ngữ chỉ định không đúng.',
	'translate-page-no-such-task' => 'Tác vụ chỉ định không đúng.',
	'translate-page-no-such-group' => 'Nhóm chỉ định không đúng.',
	'translate-page-disabled' => "Các bản dịch trong ngôn ngữ này trong nhóm đã bị tắt. Lý do:

''$1''",
	'translate-page-settings-legend' => 'Thiết lập',
	'translate-page-task' => 'Tôi muốn',
	'translate-page-group' => 'Nhóm',
	'translate-page-language' => 'Ngôn ngữ',
	'translate-page-limit' => 'Giới hạn',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|thông điệp|thông điệp}} mỗi trang',
	'translate-submit' => 'Xem',
	'translate-page-navigation-legend' => 'Điều khiển',
	'translate-page-showing' => 'Đang hiển thị thông điệp có thứ tự từ $1 đến $2 trong tổng số $3 thông điệp.',
	'translate-page-showing-all' => 'Đang hiển thị $1 {{PLURAL:$1|thông điệp|thông điệp}}.',
	'translate-page-showing-none' => 'Không có thông điệp nào.',
	'translate-next' => 'Trang sau',
	'translate-prev' => 'Trang trước',
	'translate-page-description-legend' => 'Thông tin về nhóm',
	'translate-page-edit' => 'sửa',
	'translate-optional' => '(tùy chọn)',
	'translate-ignored' => '(đã bỏ)',
	'translate-edit-definition' => 'Định nghĩa thông điệp',
	'translate-edit-contribute' => 'đóng góp',
	'translate-edit-no-information' => "''Thông điệp này hiện chưa có tài liệu hướng dẫn. Nếu bạn biết thông điệp này dùng ở đâu và dùng như thế nào, bạn có thể giúp những biên dịch viên khác bằng cách thêm tài liệu hướng dẫn cho nó.''",
	'translate-edit-information' => 'Thông tin về thông điệp này ($1)',
	'translate-edit-in-other-languages' => 'Thông điệp bằng thứ tiếng khác',
	'translate-edit-committed' => 'Bản dịch hiện tại trong phần mềm',
	'translate-edit-warnings' => 'Các cảnh báo về các bản dịch chưa hoàn thành',
	'translate-edit-goto-no-prev' => 'Không có thông báo trước',
	'translate-edit-goto-no-next' => 'Không có thông báo kế',
	'translate-edit-goto-prev' => 'Sửa thông báo trước',
	'translate-edit-goto-next' => 'Sửa thông báo kế',
	'translate-edit-goto-list' => 'Quay về danh sách',
	'translate-magic-pagename' => 'Bản dịch MediaWiki mở rộng',
	'translate-magic-help' => 'Bạn có thể dịch bí danh của các trang đặc biệt, thần chú, tên hình dạng giao diện và tên của không gian tên.

Bí danh của các trang đặc biệt và từ thần chú có thể có nhiều bản dịch.
Các bản dịch phân cách nhau bằng dấu phẩy (,).
Tên hình dạng giao diện và không gian tên chỉ có thể có một bản dịch.

Trong các bản dịch không gian tên, <tt>$1 talk</tt> có đặc biệt hơn. <tt>$1</tt> được thay thế bằng tên trang (ví dụ <tt>{{SITENAME}} talk</tt>).
Nếu ngôn ngữ của bạn không thể hiển thị đúng nếu không đổi tên trang (SITENAME), xin hãy liên hệ với một lập trình viên.

Bạn cần phải thuộc nhóm biên dịch viên để có thể lưu các thay đổi.
Các thay đổi sẽ không được lưu lại đến khi nào bạn nhấn vào nút lưu ở dưới.',
	'translate-magic-module' => 'Gói:',
	'translate-magic-submit' => 'Xem',
	'translate-magic-cm-export' => 'Xuất',
	'translate-magic-cm-to-be' => 'Trở thành',
	'translate-magic-cm-current' => 'Hiện hành',
	'translate-magic-cm-original' => 'Bản gốc',
	'translate-magic-cm-comment' => 'Tóm lược:',
	'translate-magic-cm-save' => 'Lưu',
	'translate-magic-cm-updatedusing' => 'Đã cập nhật bằng [[Special:Magic]]',
	'translate-magic-cm-savefailed' => 'Lưu thất bại',
	'translate-magic-special' => 'Bí danh của các trang đặc biệt',
	'translate-magic-words' => 'Từ thần chú',
	'translate-magic-skin' => 'Tên hình dạng giao diện',
	'translate-magic-namespace' => 'Tên của không gian tên',
	'translationchanges' => 'Các thay đổi bản dịch',
	'translationchanges-export' => 'xuất',
	'translationchanges-change' => '$1: $2 bởi $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Tham số|Những tham số}} sau không sử dụng:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2||Các}} tham số sau không rõ:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => 'Số dấu ngoặc bị lẻ:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Liên kết|Các liên kết}} sau có vấn đề:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => 'Xin thay thế{{PLURAL:$2|| các}} thẻ sau bằng thẻ đúng:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => 'Định nghĩa sử dụng <nowiki>{{PLURAL:}}</nowiki> nhưng bản dịch không có.',
	'translate-checks-pagename' => 'Không gian tên đã thay đổi so với định nghĩa',
	'tog-translate-nonewsletter' => 'Đừng gửi cho tôi bản tin qua thư điện tử (chỉ thích hợp cho thành viên có địa chỉ thư điện tử đã được xác nhận)',
	'right-translate' => 'Sửa đổi sử dụng giao diện biên dịch',
	'translate-rc-translation-filter' => 'Lọc bản dịch:',
	'translate-rc-translation-filter-no' => 'Không lọc',
	'translate-rc-translation-filter-only' => 'Chỉ hiển thị bản dịch',
	'translate-rc-translation-filter-filter' => 'Lọc bản dịch',
	'translate-rc-translation-filter-site' => 'Chỉ hiện thay đổi đến thông báo trang',
	'translationstats' => 'Thống kê biên dịch',
	'translate-stats-edits' => 'Sửa đổi',
	'translate-stats-users' => 'Biên dịch viên',
	'translate-statsf-intro' => 'Bạn có thể tạo ra thông kê đơn giản bằng mẫu này. Tất cả các giá trị đều có giới hạn trên và dưới.',
	'translate-statsf-options' => 'Tùy chọn đồ thị',
	'translate-statsf-width' => 'Chiều rộng (pixel)',
	'translate-statsf-height' => 'Chiều cao (pixel)',
	'translate-statsf-days' => 'Thời điểm trong ngày',
	'translate-statsf-scale' => 'Dạng hạt',
	'translate-statsf-scale-days' => 'Ngày',
	'translate-statsf-scale-hours' => 'Giờ',
	'translate-statsf-count-edits' => 'Số lần sửa đổi',
	'translate-statsf-count-users' => 'Dịch giả tích cực',
	'translate-statsf-submit' => 'Xem trước',
	'translate-tag-category' => 'Các trang dịch được',
	'translate-tag-page-desc' => 'Bản dịch trang wiki [[:$1]].',
	'translate-tag-translate-link-desc' => 'Dịch trang này',
	'translate-tag-legend-fallback' => 'Bản dịch ra ngôn ngữ khác',
	'translate-tag-legend-fuzzy' => 'Bản dịch lỗi thời',
	'translate-sidebar-alltrans' => 'Bản dịch khác',
);

/** Volapük (Volapük)
 * @author Malafaya
 * @author Smeira
 */
$messages['vo'] = array(
	'translate' => 'Tradutön',
	'translate-edit' => 'redakön',
	'translate-talk' => 'bespik',
	'translate-history' => 'jenotem',
	'translate-task-view' => 'logön nunis valik in',
	'translate-task-untranslated' => 'logön nunis no petradutölis valikis in',
	'translate-page-no-such-language' => 'Pük pevälöl no dabinon.',
	'translate-page-no-such-task' => 'Vobod pevilöl no dabinon.',
	'translate-page-no-such-group' => 'Grup pevälöl no dabinon.',
	'translate-page-settings-legend' => 'Paramets',
	'translate-page-task' => 'Vilob',
	'translate-page-group' => 'Grup:',
	'translate-page-language' => 'Pük:',
	'translate-page-limit' => 'Mied:',
	'translate-page-limit-option' => '{{PLURAL:$1|nun|nuns}} $1 a pad',
	'translate-submit' => 'Getolöd',
	'translate-page-navigation-legend' => 'Nafam',
	'translate-page-showing' => 'Nuns de nüm: $1 ad $2 (se $3).',
	'translate-page-showing-all' => '{{PLURAL:$1|Nun|Nuns}} $1 {{PLURAL:$1|pajonon|pajonons}}.',
	'translate-page-showing-none' => 'Nuns jonabik no dabinons.',
	'translate-next' => 'Pad sököl',
	'translate-prev' => 'Pad büik',
	'translate-page-description-legend' => 'Nüns tefü grup',
	'translate-page-edit' => 'redakön',
	'translate-ignored' => '(penedemöl)',
	'translate-edit-definition' => 'Miedet nuna',
	'translate-edit-contribute' => 'keblünön',
	'translate-edit-no-information' => 'Nun at no peplänon. If sevol, kiöpo u lio nun at pagebon, kanol yufön tradutanis votik medä penol pläni gudik dö geb onik.',
	'translate-edit-information' => 'Plän nuna at ($1)',
	'translate-edit-in-other-languages' => 'Nun in püks votik',
	'translate-edit-warnings' => 'Nüneds tefü tradutods no lölöfiks',
	'translate-magic-cm-to-be' => 'Ovedon',
	'translate-magic-cm-original' => 'Rigik',
	'translate-magic-cm-save' => 'Dakipön',
	'translate-magic-cm-savefailed' => 'Dakip no eplöpon',
	'translate-magic-words' => 'Vöds magivik',
	'translate-magic-namespace' => 'Nems nemaspadas',
	'translationchanges-change' => '$1: $2 fa $3',
	'translate-checks-parameters' => '{{PLURAL:$2|Paramet|Paramets}} sököl no {{PLURAL:$2|pagebon|pagebons}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '{{PLURAL:$2|Paramet|Paramets}} sököl {{PLURAL:$2|binon nesevädik|binons nesevädiks}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '{{PLURAL:$2|Yüm|Yüms}} sököl {{PLURAL:$2|binon säkädik|binons säkädiks}}:
<strong><nowiki>$1</nowiki></strong>',
	'translate-stats-edits' => 'Redakams',
	'translate-stats-users' => 'Tradutans',
	'translate-statsf-scale-days' => 'Dels',
	'translate-statsf-scale-hours' => 'Düps',
	'translate-tag-legend-fallback' => 'Tradutod in pük votik',
	'translate-sidebar-alltrans' => 'Tradutods votik',
);

/** Walloon (Walon)
 * @author Srtxg
 */
$messages['wa'] = array(
	'translate' => 'Ratourner',
	'translate-edit' => 'candjî',
	'translate-talk' => 'copene',
	'translate-history' => 'istwere',
	'translate-task-view' => 'Vey tos les messaedjes',
	'translate-task-untranslated' => 'Vey tos les messaedjes nén ratournés',
	'translate-task-review' => 'Verifyî les candjmints',
	'translate-task-reviewall' => 'Verifyî tos les ratournaedjes',
	'translate-task-export' => 'Copyî foû les ratournaedjes',
	'translate-task-export-to-file' => 'Copyî foû viè on fitchî les ratournaedjes',
	'translate-submit' => 'I va',
	'translate-next' => 'Pådje shuvante',
	'translate-prev' => 'Pådje di dvant',
	'translate-optional' => '(opcionel)',
	'translate-ignored' => '(ignoré)',
);

/** Mingrelian (მარგალური)
 * @author Malafaya
 */
$messages['xmf'] = array(
	'translate-page-language' => 'ნინა',
);

/** Yiddish (ייִדיש)
 * @author פוילישער
 */
$messages['yi'] = array(
	'translate' => 'פֿארטײַטשן',
	'translate-desc' => '[[Special:Translate|באזונדערער בלאט]] פֿאר פֿארטײַטשן מעדיעוויקי און ווײַטער',
	'translate-edit' => 'רעדאקטירן',
	'translate-talk' => 'רעדן',
	'translate-history' => 'היסטאריע',
	'translate-task-view' => 'ווײַז אלע מעלדונגען פֿון',
	'translate-task-untranslated' => 'ווײַז אלע נישט פֿארטײַטשטע מעלדונגען פֿון',
	'translate-page-task' => 'איך וויל',
	'translate-page-group' => 'גרופע',
	'translate-page-language' => 'שפראך',
	'translate-page-limit-option' => '$1 {{PLURAL:$1|מעלדונג|מעלדונגען}} אין א בלאט',
	'translate-submit' => 'ווייזן',
	'translate-page-navigation-legend' => 'נאוויגאציע',
	'translate-page-showing' => 'ווײַזן מעלדונגען $1 ביז $2 פֿון $3.',
	'translate-page-showing-all' => 'ווײַזן $1 {{PLURAL:$1|מעלדונג|מעלדונגען}}.',
	'translate-next' => 'קומענדיגער בלאט',
	'translate-prev' => 'פֿריערדיגער בלאט',
	'translate-page-description-legend' => 'אינפֿארמאציע וועגן דער גרופע',
	'translate-page-edit' => 'רעדאקטירן',
	'translate-edit-contribute' => 'בײַשטײַערן',
	'translate-edit-no-information' => "'''די מעלדונג פעלט דאקומענטאציע.
אויב איר ווייסט וואו אדער ווי די מעלדונג ווערט געניצט, קענט איר העלפֿן אנדערע פארטייטשערס דורך צולייגן דאקומענטאציע צו דער מעלדונג.'''",
	'translate-edit-information' => 'אינפֿארמאציע וועגן דער מעלדונג ($1)',
	'translate-edit-in-other-languages' => 'מעלדונג אין אנדערע שפראכן',
	'translate-edit-goto-no-prev' => 'נישטא קיין פֿריערדיגע מעלדונג',
	'translate-edit-goto-no-next' => 'נישטא קיין קומענדיגע מעלדונג',
	'translate-edit-goto-prev' => 'רעדאקטירן די פֿריערדיגע מעלדונג',
	'translate-edit-goto-next' => 'רעדאקטירן די קומענדיגע מעלדונג',
	'translate-edit-goto-list' => 'צוריק צו דער ליסטע',
	'translate-magic-submit' => 'ווייזן',
	'translate-magic-cm-updatedusing' => 'דערהײַנטיגט מיט [[Special:Magic]]',
	'translationchanges-export' => 'עקספארט',
);

/** Yue (粵語)
 * @author Shinjiman
 */
$messages['yue'] = array(
	'translate' => '翻譯',
	'translate-desc' => '翻譯MediaWiki同其它嘢嘅[[Special:Translate|特別頁]]',
	'translate-edit' => '編輯',
	'translate-talk' => '對話',
	'translate-history' => '歷史',
	'translate-task-view' => '去睇全部信息自',
	'translate-task-untranslated' => '去睇全部未翻譯好嘅信息自',
	'translate-task-optional' => '去睇可選用嘅信息自',
	'translate-task-review' => '睇番嗰度嘅更改',
	'translate-task-reviewall' => '睇番響嗰度嘅全部翻譯',
	'translate-task-export' => '倒出翻譯自',
	'translate-task-export-to-file' => '倒出翻譯到檔案自',
	'translate-task-export-as-po' => '倒出翻譯到 Gettext 格式',
	'translate-page-no-such-language' => '所指定嘅語言唔正確。',
	'translate-page-no-such-task' => '所指定嘅工作唔正確。',
	'translate-page-no-such-group' => '所指定嘅組唔正確。',
	'translate-page-settings-legend' => '設定',
	'translate-page-task' => '我想去',
	'translate-page-group' => '組',
	'translate-page-language' => '語言',
	'translate-page-limit' => '上限',
	'translate-page-limit-option' => '每一版有$1個信息',
	'translate-submit' => '擷取',
	'translate-page-navigation-legend' => '導航',
	'translate-page-showing' => '顯示緊由 $1到$2 ，總共 $3 個信息。',
	'translate-page-showing-all' => '顯示緊 $1個信息。',
	'translate-page-showing-none' => '無信息可顯示。',
	'translate-next' => '下一版',
	'translate-prev' => '上一版',
	'translate-page-description-legend' => '有關嗰組嘅信息',
	'translate-optional' => '(可選)',
	'translate-ignored' => '(已略過)',
	'translate-edit-definition' => '信息定義',
	'translate-edit-contribute' => '貢獻',
	'translate-edit-no-information' => "''呢句信息無註解。
如果你知道呢句信息響邊同埋點用，你可以加註解去呢個信息去幫其他嘅翻譯者。''",
	'translate-edit-information' => '呢句信息嘅資料 ($1)',
	'translate-edit-in-other-languages' => '其它語言嘅信息',
	'translate-edit-committed' => '而家響軟件嘅翻譯',
	'translate-edit-warnings' => '有關未譯好嘅警告',
	'translate-magic-pagename' => '延伸MediaWiki翻譯',
	'translate-magic-help' => '你可以翻譯特別頁替身、魔術字、皮名同埋名空間嘅名。

響魔術字度你係要同時包括英文嘅翻譯，唔係嘅話就會唔能夠運作。
同時保持第一個項目 (0或1) 不變。

特別頁替身同埋魔術字可以有多個翻譯。
翻譯係以逗號 (,) 分隔。
皮名同埋空間名只可以有一項翻譯。

響空間名翻譯度， <tt>$1 talk</tt> 係特別嘅。 <tt>$1</tt> 會由網名代替咗（例如<tt>{{SITENAME}} talk</tt>）。
如果你嘅語言組合唔能夠響網站名唔改嘅情況之下去組合成你嘅意思，請聯絡技術員。

你需要係翻譯組嘅組員去儲存嘅啲信息。
響你撳下面嘅儲存擊之前，啲改動唔會儲存落來。',
	'translate-magic-submit' => '擷取',
	'translate-magic-cm-export' => '倒出',
	'translate-magic-cm-to-be' => '翻譯',
	'translate-magic-cm-current' => '現時',
	'translate-magic-cm-original' => '原本',
	'translate-magic-cm-comment' => '註解:',
	'translate-magic-cm-save' => '保存',
	'translate-magic-cm-updatedusing' => '用[[Special:Magic]]更新咗',
	'translate-magic-cm-savefailed' => '保存失敗',
	'translate-magic-special' => '特別頁替身',
	'translate-magic-words' => '魔術字',
	'translate-magic-skin' => '皮名',
	'translate-magic-namespace' => '名空間名',
	'translationchanges' => '翻譯更改',
	'translationchanges-export' => '倒出',
	'translationchanges-change' => '$1: $2 由 $3',
	'translate-checks-parameters' => '下面嘅參數係無用到嘅: <strong>$1</strong>',
	'translate-checks-balance' => '插入字嘅數量唔均等: <strong>$1</strong>',
	'translate-checks-links' => '下面嘅連結有問題: <strong>$1</strong>',
	'translate-checks-xhtml' => '請改下面嘅標籤去正確嘅: <strong>$1</strong>',
	'translate-checks-plural' => '用 <nowiki>{{PLURAL:}}</nowiki> 嘅解解釋但係翻譯無用到。',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Alexsh
 */
$messages['zh-hans'] = array(
	'translate' => '翻译',
	'translate-desc' => '翻译MediaWiki介面信息的[[Special:Translate|特殊页面]]',
	'translate-edit' => '编辑',
	'translate-talk' => '对话',
	'translate-history' => '历史',
	'translate-task-view' => '查看全部信息',
	'translate-task-untranslated' => '查看尚未翻译的信息',
	'translate-task-optional' => '查看可选的信息',
	'translate-task-review' => '检查该处的更改',
	'translate-task-reviewall' => '检查该群组的翻译',
	'translate-task-export' => '导出翻译',
	'translate-task-export-to-file' => '导出翻译至文件',
	'translate-task-export-as-po' => '以纯文字格式导出翻译',
	'translate-page-no-such-language' => '选择的语言错误',
	'translate-page-no-such-task' => '选择的功能错误',
	'translate-page-no-such-group' => '选择的群组错误',
	'translate-page-settings-legend' => '设置',
	'translate-page-task' => '选择功能',
	'translate-page-group' => '群组',
	'translate-page-language' => '语言',
	'translate-page-limit' => '每页显示',
	'translate-page-limit-option' => '$1个信息',
	'translate-submit' => '撷取',
	'translate-page-navigation-legend' => '导航',
	'translate-page-showing' => '显示第 $1 到第 $2 个信息，总共有 $3 个',
	'translate-page-showing-all' => '显示 $1 个信息',
	'translate-page-showing-none' => '没有任何信息',
	'translate-next' => '下一页',
	'translate-prev' => '上一页',
	'translate-page-description-legend' => '关于本群组',
	'translate-optional' => '(可选)',
	'translate-ignored' => '(已略过)',
	'translate-edit-definition' => '信息原文',
	'translate-edit-contribute' => '贡献',
	'translate-edit-no-information' => "''本介面信息没有任何说明信息
如果您知道这个信息是使用在哪个地方，您可以增加说明信息以协助其他翻译者''",
	'translate-edit-information' => '关于本介面信息的信息 ($1)',
	'translate-edit-in-other-languages' => '其他语言的信息',
	'translate-edit-committed' => '当前翻译',
	'translate-edit-warnings' => '未完成翻译的警告',
	'translate-magic-pagename' => '延伸的MediaWiki翻译',
	'translate-magic-help' => "您可以使用本特殊页面翻译'''特殊页面别名'''、'''魔术字'''、'''面板名称'''以及'''名字空间名称'''。

翻译魔术字时，新的名称必需含有英文，否则无法生效。第一个字元也请避免0或1这两个字元

特殊页面别名以及魔术字可以使用复数的翻译，请使用逗号(,)分隔。面板名称以及名字空间名称只能有一个翻译。

名字空间名称中，要注意<tt>$1 讨论</tt>这个空间名称在翻译时，<tt>$1</tt>会受到网站名称影响(例如<tt>{{SITENAME}} talk</tt>)。
如果您的翻译没有更动网站名称，但无法正确显示的话，请联络MediaWiki开发者。

您必需属于翻译者群组才能保存这些更改。在按下保存之前，这些更改均不会被更动。",
	'translate-magic-submit' => '撷取',
	'translate-magic-cm-export' => '导出',
	'translate-magic-cm-to-be' => '翻译',
	'translate-magic-cm-current' => '目前',
	'translate-magic-cm-original' => '原始信息',
	'translate-magic-cm-comment' => '原因：',
	'translate-magic-cm-save' => '保存',
	'translate-magic-cm-updatedusing' => '已使用[[Special:Magic]]更新',
	'translate-magic-cm-savefailed' => '保存失败',
	'translate-magic-special' => '特殊页面别名',
	'translate-magic-words' => '魔术字',
	'translate-magic-skin' => '面板名称',
	'translate-magic-namespace' => '名字空间名称',
	'translationchanges' => '翻译更改',
	'translationchanges-export' => '{{int:translate-magic-cm-export}}',
	'translationchanges-change' => '$1: $2 由$3翻译',
	'translate-checks-parameters' => '以下参数没有使用到：
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => '括号的数量不一致：
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-links' => '以下的连结可能有问题：
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-xhtml' => '请修正以下的标签：
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-plural' => '原始信息使用于<nowiki>{{PLURAL:}}</nowiki>中，并没有用于翻译。',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Alexsh
 */
$messages['zh-hant'] = array(
	'translate' => '翻譯',
	'translate-desc' => '翻譯MediaWiki介面訊息的[[Special:Translate|特殊頁面]]',
	'translate-edit' => '編輯',
	'translate-talk' => '對話',
	'translate-history' => '歷史',
	'translate-task-view' => '檢視全部訊息',
	'translate-task-untranslated' => '檢視尚未翻譯的訊息',
	'translate-task-optional' => '檢視可選的訊息',
	'translate-task-problematic' => '檢視有問題的訊息',
	'translate-task-review' => '檢查該處的更改',
	'translate-task-reviewall' => '檢查該群組的翻譯',
	'translate-task-export' => '匯出翻譯',
	'translate-task-export-to-file' => '匯出翻譯至檔案',
	'translate-task-export-as-po' => '以純文字格式匯出翻譯',
	'translate-task-export-to-xliff' => '以Xliff格式匯出翻譯',
	'translate-page-no-such-language' => '選擇的語言錯誤',
	'translate-page-no-such-task' => '選擇的功能錯誤',
	'translate-page-no-such-group' => '選擇的群組錯誤',
	'translate-page-disabled' => "翻譯至這個語言已於本群組停用，原因如下：

''$1''",
	'translate-page-settings-legend' => '設定',
	'translate-page-task' => '選擇功能',
	'translate-page-group' => '群組',
	'translate-page-language' => '語言',
	'translate-page-limit' => '每頁顯示',
	'translate-page-limit-option' => '$1個訊息',
	'translate-submit' => '擷取',
	'translate-page-navigation-legend' => '導航',
	'translate-page-showing' => '顯示第 $1 到第 $2 個訊息，總共有 $3 個',
	'translate-page-showing-all' => '顯示 $1 個訊息',
	'translate-page-showing-none' => '沒有任何訊息',
	'translate-next' => '下一頁',
	'translate-prev' => '上一頁',
	'translate-page-description-legend' => '關於本群組',
	'translate-page-edit' => '編輯',
	'translate-optional' => '(可選)',
	'translate-ignored' => '(已略過)',
	'translate-edit-definition' => '訊息原文',
	'translate-edit-contribute' => '貢獻',
	'translate-edit-no-information' => "''本介面訊息沒有任何說明資訊
如果您知道這個訊息是使用在哪個地方，您可以增加說明資訊以協助其他翻譯者''",
	'translate-edit-information' => '關於本介面訊息的資訊 ($1)',
	'translate-edit-in-other-languages' => '其他語言的訊息',
	'translate-edit-committed' => '當前翻譯',
	'translate-edit-warnings' => '未完成翻譯的警告',
	'translate-edit-goto-no-prev' => '沒有前一個訊息',
	'translate-edit-goto-no-next' => '沒有次一個訊息',
	'translate-edit-goto-prev' => '編輯前一個訊息',
	'translate-edit-goto-next' => '編輯次一個訊息',
	'translate-edit-goto-list' => '回到清單',
	'translate-magic-pagename' => '延伸的MediaWiki翻譯',
	'translate-magic-help' => "您可以使用本特殊頁面翻譯'''特殊頁面別名'''、'''魔術字'''、'''面板名稱'''以及'''名字空間名稱'''。

翻譯魔術字時，新的名稱必需含有英文，否則無法生效。第一個字元也請避免0或1這兩個字元

特殊頁面別名以及魔術字可以使用複數的翻譯，請使用逗號(,)分隔。面板名稱以及名字空間名稱只能有一個翻譯。

名字空間名稱中，要注意<tt>$1 討論</tt>這個空間名稱在翻譯時，<tt>$1</tt>會受到網站名稱影響(例如<tt>{{SITENAME}} talk</tt>)。
如果您的翻譯沒有更動網站名稱，但無法正確顯示的話，請聯絡MediaWiki開發者。

您必需屬於翻譯者群組才能保存這些更改。在按下保存之前，這些更改均不會被更動。",
	'translate-magic-module' => '模組：',
	'translate-magic-submit' => '擷取',
	'translate-magic-cm-export' => '匯出',
	'translate-magic-cm-to-be' => '翻譯',
	'translate-magic-cm-current' => '目前',
	'translate-magic-cm-original' => '原始訊息',
	'translate-magic-cm-comment' => '原因：',
	'translate-magic-cm-save' => '保存',
	'translate-magic-cm-updatedusing' => '已使用[[Special:Magic]]更新',
	'translate-magic-cm-savefailed' => '保存失敗',
	'translate-magic-special' => '特殊頁面別名',
	'translate-magic-words' => '魔術字',
	'translate-magic-skin' => '面板名稱',
	'translate-magic-namespace' => '名字空間名稱',
	'translationchanges' => '翻譯更改',
	'translationchanges-export' => '{{int:translate-magic-cm-export}}',
	'translationchanges-change' => '$1: $2 由$3翻譯',
	'translate-checks-parameters' => '以下參數沒有使用到：
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-parameters-unknown' => '以下參數為未知參數：
<strong><nowiki>$1</nowiki></strong>',
	'translate-checks-balance' => '括號的數量不一致：<strong>$1</strong>',
	'translate-checks-links' => '以下的連結可能有問題：<strong>$1</strong>',
	'translate-checks-xhtml' => '請修正以下的標籤：<strong>$1</strong>',
	'translate-checks-plural' => '原始訊息使用於<nowiki>{{PLURAL:}}</nowiki>中，並沒有用於翻譯。',
	'tog-translate-nonewsletter' => '不要傳送電子報 (只適用已確認過電子郵件的用戶)',
	'right-translate' => '使用翻譯介面編輯',
	'translate-rc-translation-filter' => '篩選翻譯：',
	'translate-rc-translation-filter-no' => '不篩選',
	'translate-rc-translation-filter-only' => '只顯示翻譯',
	'translate-rc-translation-filter-filter' => '排除',
	'translate-rc-translation-filter-site' => '只有網站訊息的更動',
	'translate-stats-edits' => '日編輯數',
);

