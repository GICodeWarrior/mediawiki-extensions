<?php
/**
 * Internationalisation file for MoodBar extension.
 *
 * @file
 * @ingroup Extensions
 */
 
$messages = array();
 
/** English
 * @author Andrew Garrett
 */

$messages['en'] = array(
	'moodbar-desc' => 'Allows specified users to send their "mood" back to the site operator',
	// Portlet link
	'moodbar-trigger-using' => 'Editing $1...',
	'moodbar-trigger-feedback' => 'Feedback about editing',
	'moodbar-trigger-share' => 'Share your experience',
	'tooltip-p-moodbar-trigger-using' => '',
	'moodbar-intro-using' => 'Using $1 made me...',
	'tooltip-p-moodbar-trigger-feedback' => '',
	// Overlay
	'moodbar-close' => '(close)',
	'moodbar-intro-feedback' => 'Feedback:',
	'moodbar-type-happy-title' => 'Happy',
	'moodbar-type-sad-title' => 'Sad',
	'moodbar-type-confused-title' => 'Confused',
	'tooltip-moodbar-what' => 'Learn more about this feature',
	'moodbar-what-target' => 'http://www.mediawiki.org/wiki/MoodBar',
	'moodbar-what-label' => 'What is this?',
	'moodbar-what-expanded' => '▶', // Ignore, do not translate. &#x25BC;
	'moodbar-what-collapsed' => '▼', // Ignore, do not translate. &#x25B6;
	'moodbar-what-content' => 'This feature is designed to help the Wikipedia community understand the experience of people editing Wikipedia.
For more information, please visit the $1.',
	'moodbar-what-link' => 'feature page',
	'moodbar-disable' => "I'm not interested.  Please disable this feature.",
	'moodbar-form-title' => 'Because...',
	'moodbar-form-note' => '140 character maximum',
	'moodbar-form-note-dynamic' => '$1 characters remaining',
	'moodbar-form-submit' => 'Send Feedback ▶',
	// Special:MoodBar
	'right-moodbar-view' => 'View and export MoodBar feedback',
	'moodbar-admin-title' => 'MoodBar feedback',
	'moodbar-admin-intro' => 'This page allows you to view feedback submitted with the MoodBar.',
	'moodbar-admin-empty' => 'No results',
	'moodbar-header-id' => 'Feedback ID',
	'moodbar-header-timestamp' => 'Timestamp',
	'moodbar-header-type' => 'Type',
	'moodbar-header-page' => 'Page',
	'moodbar-header-usertype' => 'User type',
	'moodbar-header-user' => 'User',
	'moodbar-header-editmode' => 'Edit mode',
	'moodbar-header-bucket' => 'Testing bucket',
	'moodbar-header-system' => 'System type',
	'moodbar-header-locale' => 'Locale',
	'moodbar-header-useragent' => 'User-Agent',
	'moodbar-header-comment' => 'Comments',
	'moodbar-header-user-editcount' => 'User edit count',
	'moodbar-header-namespace' => 'Namespace',
	'moodbar-header-own-talk' => 'Own talk page',
	// Mood types
	'moodbar-type-happy' => 'Happy',
	'moodbar-type-sad' => 'Sad',
	'moodbar-type-confused' => 'Confused',
	// User types
	'moodbar-user-anonymized' => 'Anonymized',
	'moodbar-user-ip' => 'IP Address',
	'moodbar-user-user' => 'Registered user',
);
 
/** Message documentation (Message documentation)
 * @author Krinkle
 * @author SPQRobin
 */

$messages['qqq'] = array(
	'moodbar-desc' => 'This is a feature in development. See [[mw:MoodBar 0.1/Design]] for background information.',
	'moodbar-trigger-using' => "Link text of the MoodBar overlay trigger. \$1 is the SITENAME. The implied sentence is ''\"Using [Sitename] made me happy/sad/...\"''. See [[mw:MoodBar 0.1/Design]] for background development information.",
	'moodbar-trigger-feedback' => 'Link text of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-intro-using' => 'Intro title of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-intro-feedback' => 'Intro title of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-close' => 'Link text of the close-button. Make sure to include parentheses.

See also:
* {{msg|parentheses}}',
	'tooltip-moodbar-what' => 'Tooltip displayed when hovering the What-link.

See also:
* {{msg|moodbar-what-label}}',
	'moodbar-what-target' => 'Complete URL (including http://) or article name where more info can be found.',
	'moodbar-what-label' => 'Link text for the page where more info abut MoodBar can be found.',
);

/** Message documentation (Message documentation)
 * @author SPQRobin
 */
$messages['qqq'] = array(
	'moodbar-desc' => 'This is a feature in development. See [[mw:MoodBar 0.1/Design]] for background information.',
	'moodbar-trigger-using' => "Link text of the MoodBar overlay trigger. \$1 is the SITENAME. The implied sentence is ''\"Using [Sitename] made me happy/sad/...\"''. See [[mw:MoodBar 0.1/Design]] for background development information.",
	'moodbar-intro-using' => '[[File:MoodBar-Step-1.png|right|200px]]
Intro title of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-trigger-feedback' => 'Link text of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-close' => 'Link text of the close-button. Make sure to include parentheses.

See also:
* {{msg|parentheses}}',
	'moodbar-intro-feedback' => 'Intro title of the MoodBar overlay trigger. $1 is the SITENAME.',
	'tooltip-moodbar-what' => 'Tooltip displayed when hovering the What-link.

See also:
* {{msg|moodbar-what-label}}',
	'moodbar-what-label' => 'Link text for the page where more info abut MoodBar can be found.',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'moodbar-desc' => 'Laat spesifieke gebruikers toe om hulle gemoedstoestand aan die webwerf se operateur terug te stuur',
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 */
$messages['be-tarask'] = array(
	'moodbar-desc' => 'Дазваляе вызначаным удзельнікам дасылаць іх «настрой» апэратару сайта',
	'moodbar-trigger-using' => 'Выкарыстоўваючы $1…',
	'moodbar-trigger-feedback' => 'Водгук',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'moodbar-desc' => 'Ermöglicht es Benutzern ihre aktuelle Stimmung dem Seitenbetreiber mitzuteilen',
	'moodbar-trigger-using' => 'Nutze $1 …',
	'moodbar-trigger-feedback' => 'Rückmeldungen',
	'moodbar-trigger-share' => 'Teile uns deinen Eindruck mit',
	'moodbar-intro-using' => '$1 zu nutzen macht mich …',
	'moodbar-close' => '(schließen)',
	'moodbar-intro-feedback' => 'Rückmeldung:',
	'moodbar-type-happy-title' => 'Glücklich',
	'moodbar-type-sad-title' => 'Traurig',
	'moodbar-type-confused-title' => 'Verwirrt',
	'tooltip-moodbar-what' => 'Mehr zu dieser Funktion in Erfahrung bringen',
	'moodbar-what-label' => 'Worum handelt es sich?',
	'right-moodbar-view' => 'Rückmeldung zur Stimmung ansehen und exportieren',
	'moodbar-admin-title' => 'Rückmeldung zur Stimmung',
	'moodbar-admin-intro' => 'Auf dieser Seite können die Rückmeldungen zur Stimmung angesehen werden',
	'moodbar-admin-empty' => 'Keine Ergebnisse',
	'moodbar-header-id' => 'Rückmeldungskennung',
	'moodbar-header-timestamp' => 'Zeitstempel',
	'moodbar-header-type' => 'Typ',
	'moodbar-header-page' => 'Seite',
	'moodbar-header-usertype' => 'Benutzerart',
	'moodbar-header-user' => 'Benutzer',
	'moodbar-header-editmode' => 'Bearbeitungsmodus',
	'moodbar-header-bucket' => 'Testumgebung',
	'moodbar-header-system' => 'Systemtyp',
	'moodbar-header-locale' => 'Gebietsschema',
	'moodbar-header-useragent' => 'Browser',
	'moodbar-header-comment' => 'Kommentare',
	'moodbar-header-user-editcount' => 'Bearbeitungszähler',
	'moodbar-header-namespace' => 'Namensraum',
	'moodbar-header-own-talk' => 'Eigene Diskussionsseite',
	'moodbar-type-happy' => 'Glücklich',
	'moodbar-type-sad' => 'Traurig',
	'moodbar-type-confused' => 'Verwirrt',
	'moodbar-user-anonymized' => 'Anonymisiert',
	'moodbar-user-ip' => 'IP-Adresse',
	'moodbar-user-user' => 'Registrierter Benutzer',
);

/** Spanish (Español)
 * @author Fitoschido
 */
$messages['es'] = array(
	'moodbar-desc' => 'Permite a usuarios específicos enviar su «estado de ánimo» hacia el operador del sitio',
);

/** French (Français)
 * @author Crochet.david
 */
$messages['fr'] = array(
	'moodbar-desc' => 'Permet aux utilisateurs spécifiés d’envoyer leur retour d’« humeur » à l’exploitant du site',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'moodbar-header-timestamp' => 'Dâta et hora',
	'moodbar-header-type' => 'Tipo',
	'moodbar-header-page' => 'Pâge',
	'moodbar-header-user' => 'Utilisator',
	'moodbar-header-useragent' => 'Agent utilisator',
	'moodbar-header-comment' => 'Comentèros',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'moodbar-desc' => 'Permite que os usuarios especificados envíen ao operador do sitio o seu "humor"',
	'moodbar-trigger-using' => 'Usando $1...',
	'moodbar-trigger-feedback' => 'Comentarios',
);

/** Hebrew (עברית)
 * @author Amire80
 */
$messages['he'] = array(
	'moodbar-desc' => 'מתן אפשרות למשתמשם לשלוח את "מצב הרוח" שלהם למפעיל האתר',
	'moodbar-trigger-using' => 'עריכה $1...',
	'moodbar-trigger-feedback' => 'משוב על עריכה',
	'moodbar-intro-using' => 'שימוש ב{{GRAMMAR:תחילית|$1}} עשה אותה...',
	'moodbar-close' => '(סגירה)',
	'moodbar-intro-feedback' => 'משוב:',
	'moodbar-type-happy-title' => 'שמח',
	'moodbar-type-sad-title' => 'עצוב',
	'moodbar-type-confused-title' => 'מבולבל',
	'tooltip-moodbar-what' => 'מידע נוסף על התכונה הזאת',
	'moodbar-what-label' => 'מה זה?',
	'right-moodbar-view' => 'הצגה וייצוא של של משוב מסרגל מצב הרוח',
	'moodbar-admin-title' => 'משוב על סרגל מצב הרוח',
	'moodbar-admin-intro' => 'הדף הזה מאפשר לך לראות משוב שנשלח באמצעות סרגל מצב הרוח',
	'moodbar-header-id' => 'מזהה משוב',
	'moodbar-header-timestamp' => 'חותם זמן',
	'moodbar-header-type' => 'סוג',
	'moodbar-header-page' => 'דף',
	'moodbar-header-usertype' => 'סוג משתמש',
	'moodbar-header-user' => 'משתמש',
	'moodbar-header-editmode' => 'מצב עריכה',
	'moodbar-header-bucket' => 'דלי ניסוי',
	'moodbar-header-system' => 'סוג מערכת',
	'moodbar-header-locale' => 'אזור',
	'moodbar-header-useragent' => 'User-Agent (דפדפן)',
	'moodbar-header-comment' => 'תגובות',
	'moodbar-header-user-editcount' => 'מספר עריכות',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'moodbar-desc' => 'Permitte al usatores specificate de inviar lor "humor" retro al operator del sito',
	'moodbar-trigger-using' => 'Usante $1...',
	'moodbar-trigger-feedback' => 'Reaction',
	'moodbar-intro-using' => 'Le uso de $1 me rendeva...',
	'moodbar-close' => '(clauder)',
	'moodbar-intro-feedback' => 'Reaction:',
	'moodbar-type-happy-title' => 'Felice',
	'moodbar-type-sad-title' => 'Triste',
	'moodbar-type-confused-title' => 'Confuse',
	'tooltip-moodbar-what' => 'Lege plus a proposito de iste function',
	'moodbar-what-label' => 'Que es isto?',
	'right-moodbar-view' => 'Vider e exportar reactiones del Barra de Humor',
	'moodbar-admin-title' => 'Reactiones del Barra de Humor',
	'moodbar-admin-intro' => 'Iste pagina permitte vider reactiones submittite con le Barra de Humor',
	'moodbar-header-id' => 'ID del reaction',
	'moodbar-header-timestamp' => 'Data e hora',
	'moodbar-header-type' => 'Typo',
	'moodbar-header-page' => 'Pagina',
	'moodbar-header-usertype' => 'Typo de usator',
	'moodbar-header-user' => 'Usator',
	'moodbar-header-editmode' => 'Modo de modification',
	'moodbar-header-bucket' => 'Situla de test',
	'moodbar-header-system' => 'Typo de systema',
	'moodbar-header-locale' => 'Region',
	'moodbar-header-useragent' => 'Agente usator',
	'moodbar-header-comment' => 'Commentos',
	'moodbar-header-user-editcount' => 'Numero de modificationes del usator',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'moodbar-desc' => 'Erméiglecht et spezifesche Benotzer fir dem Responsabele vum Site hir Stëmmung ze schécken',
	'moodbar-trigger-using' => 'Benotzt $1...',
	'moodbar-trigger-feedback' => 'Feedback',
	'moodbar-close' => '(zoumaachen)',
	'moodbar-intro-feedback' => 'Feedback:',
	'moodbar-type-happy-title' => 'Glécklech',
	'moodbar-type-sad-title' => 'Traureg',
	'moodbar-what-label' => 'Wat ass dat?',
	'moodbar-header-timestamp' => 'Zäitstempel',
	'moodbar-header-type' => 'Typ',
	'moodbar-header-page' => 'Säit',
	'moodbar-header-usertype' => 'Benotzer-Typ',
	'moodbar-header-user' => 'Benotzer',
	'moodbar-header-comment' => 'Bemierkungen',
	'moodbar-header-user-editcount' => 'Compteur vun den Ännerunge pro Benotzer',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'moodbar-desc' => 'Им овозможува на одредени корисници да му го соопштуваат нивното „расположение“ на операторот на мрежното место',
	'moodbar-trigger-using' => 'Користење на $1...',
	'moodbar-trigger-feedback' => 'Мислења',
	'moodbar-intro-using' => '$1 ме...',
	'moodbar-close' => '(затвори)',
	'moodbar-intro-feedback' => 'Мислења',
	'moodbar-type-happy-title' => 'усреќи',
	'moodbar-type-sad-title' => 'натажи',
	'moodbar-type-confused-title' => 'збуни',
	'tooltip-moodbar-what' => 'Дознајте повеќе за оваа функција',
	'moodbar-what-label' => 'Што е ова?',
	'right-moodbar-view' => 'Преглед и извоз на мислења од MoodBar',
	'moodbar-admin-title' => 'Мислења со MoodBar',
	'moodbar-admin-intro' => 'Оваа страница служи за преглед на мислења поднесени со MoodBar',
	'moodbar-header-id' => 'Назнака (ID) на мислењето',
	'moodbar-header-timestamp' => 'Време и датум',
	'moodbar-header-type' => 'Вид',
	'moodbar-header-page' => 'Страница',
	'moodbar-header-usertype' => 'Вид на корисник',
	'moodbar-header-user' => 'Корисник',
	'moodbar-header-editmode' => 'Уреднички режим',
	'moodbar-header-bucket' => 'Испробување',
	'moodbar-header-system' => 'Вид на систем',
	'moodbar-header-locale' => 'Место',
	'moodbar-header-useragent' => 'Корисник-вршител',
	'moodbar-header-comment' => 'Коментари',
	'moodbar-header-user-editcount' => 'Бр. на кориснички уредувања',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 */
$messages['nl'] = array(
	'moodbar-desc' => 'Laat bepaalde gebruikers toe hun "gemoedstoestand" naar de sitebeheerders te verzenden',
	'moodbar-trigger-using' => 'Het gebruiken van $1...',
	'moodbar-trigger-feedback' => 'Terugkoppeling',
	'moodbar-intro-using' => 'Het gebruiken van $1 maakte mij...',
	'moodbar-close' => '(sluiten)',
	'moodbar-intro-feedback' => 'Terugkoppeling:',
	'moodbar-type-happy-title' => 'Blij',
	'moodbar-type-sad-title' => 'Triest',
	'moodbar-type-confused-title' => 'Verward',
	'tooltip-moodbar-what' => 'Meer informatie over deze functie',
	'moodbar-what-label' => 'Wat is dit?',
	'right-moodbar-view' => 'MoodBar-terugkoppeling bekijken en exporteren',
	'moodbar-admin-title' => 'MoodBar-terugkoppeling',
	'moodbar-admin-intro' => 'Deze pagina laat u toe om terugkoppeling die met de MoodBar is verzonden, te bekijken',
	'moodbar-header-id' => 'Nummer van de terugkoppeling',
	'moodbar-header-timestamp' => 'Tijdstip',
	'moodbar-header-type' => 'Type',
	'moodbar-header-page' => 'Pagina',
	'moodbar-header-usertype' => 'Gebruikerstype',
	'moodbar-header-user' => 'Gebruiker',
	'moodbar-header-editmode' => 'Bewerkingsmodus',
	'moodbar-header-system' => 'Systeemtype',
	'moodbar-header-locale' => 'Taalinstelling',
	'moodbar-header-useragent' => 'User-agent',
	'moodbar-header-comment' => 'Opmerkingen',
	'moodbar-header-user-editcount' => 'Aantal bewerkingen van de gebruiker',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'moodbar-desc' => 'Permite que os utilizadores especificados enviem ao operador do site uma indicação da sua "disposição".',
	'moodbar-trigger-using' => 'A usar $1...',
	'moodbar-trigger-feedback' => 'Comentários',
	'moodbar-intro-using' => 'Usar a $1 tornou-me...',
	'moodbar-close' => '(fechar)',
	'moodbar-intro-feedback' => 'Comentários:',
	'moodbar-type-happy-title' => 'Feliz',
	'moodbar-type-sad-title' => 'Triste',
	'moodbar-type-confused-title' => 'Confuso',
	'tooltip-moodbar-what' => 'Saiba mais sobre esta funcionalidade',
	'moodbar-what-label' => 'O que é isto?',
	'right-moodbar-view' => 'Ver e exportar os comentários da MoodBar',
	'moodbar-admin-title' => 'Comentários da MoodBar',
	'moodbar-admin-intro' => 'Esta página permite-lhe ver os comentários enviados com a MoodBar',
	'moodbar-header-id' => 'ID do comentário',
	'moodbar-header-timestamp' => 'Data e hora',
	'moodbar-header-type' => 'Tipo',
	'moodbar-header-page' => 'Página',
	'moodbar-header-usertype' => 'Tipo de utilizador',
	'moodbar-header-user' => 'Utilizador',
	'moodbar-header-editmode' => 'Modo de edição',
	'moodbar-header-bucket' => 'Zona de testes',
	'moodbar-header-system' => 'Tipo de sistema',
	'moodbar-header-locale' => 'Local',
	'moodbar-header-useragent' => 'User-Agent',
	'moodbar-header-comment' => 'Comentários',
	'moodbar-header-user-editcount' => 'Contagem de edições do utilizador',
);

/** Russian (Русский)
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'moodbar-desc' => 'Позволяет определенным участникам отправлять свои «настроения» обратно на сайт оператора',
);

