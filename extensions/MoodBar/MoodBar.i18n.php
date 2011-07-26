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
	'moodbar-trigger-feedback' => 'Feedback about editing',
	'moodbar-trigger-share' => 'Share your experience',
	'moodbar-trigger-editing' => 'Editing $1...',
	'tooltip-p-moodbar-trigger-feedback' => '',
	'tooltip-p-moodbar-trigger-share' => '',
	'tooltip-p-moodbar-trigger-editing' => '',
	// Overlay
	'moodbar-close' => '(close)',
	'moodbar-intro-feedback' => 'Editing $1 made me... ',
	'moodbar-intro-share' => 'My experience on $1 made me...',
	'moodbar-intro-editing' => 'Editing $1 made me...',
	'moodbar-type-happy-title' => 'Happy',
	'moodbar-type-sad-title' => 'Sad',
	'moodbar-type-confused-title' => 'Confused',
	'tooltip-moodbar-what' => 'Learn more about this feature',
	'moodbar-what-target' => 'http://www.mediawiki.org/wiki/MoodBar',
	'moodbar-what-label' => 'What is this?',
	'moodbar-what-collapsed' => '▶', // Ignore, do not translate. &#x25BC;
	'moodbar-what-expanded' => '▼', // Ignore, do not translate. &#x25B6;
	'moodbar-what-content' => 'This feature is designed to help the Wikipedia community understand the experience of people editing the encyclopedia.
For more information, please visit the $1.',
	'moodbar-what-link' => 'feature page',
	'moodbar-privacy' => 'By submitting, you agree to transparency under these $1.',
	'moodbar-privacy-link' => 'terms',
	'moodbar-disable-link' => "I'm not interested.  Please disable this feature.",
	'moodbar-form-title' => 'Because...',
	'moodbar-form-note' => '140 character maximum',
	'moodbar-form-note-dynamic' => '$1 characters remaining',
	'moodbar-form-submit' => 'Share Feedback',
	'moodbar-form-policy-text' => 'By submitting, $1',
	'moodbar-form-policy-label' => 'our policy',
	'moodbar-loading-title' => 'Sharing...',
	'moodbar-success-title' => 'Thanks!',
	'moodbar-error-title' => 'Oops!',
	'moodbar-loading-subtitle' => 'We are sharing your feedback…',
	'moodbar-success-subtitle' => 'Sharing your editing experience helps us improve $1.',
	'moodbar-error-subtitle' => 'Something went wrong! Please try sharing your mood again later.',
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
	'moodbar-trigger-editing' => "Link text of the MoodBar overlay trigger. \$1 is the SITENAME. The implied sentence is ''\"Using [Sitename] made me happy/sad/...\"''. See [[mw:MoodBar 0.1/Design]] for background development information.",
	'moodbar-trigger-feedback' => 'Link text of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-intro-editing' => 'Intro title of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-intro-feedback' => 'Intro title of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-close' => 'Link text of the close-button. Make sure to include parentheses.

See also:
* {{msg|parentheses}}',
	'tooltip-moodbar-what' => 'Tooltip displayed when hovering the What-link.

See also:
* {{msg|moodbar-what-label}}',
	'moodbar-what-target' => 'Complete URL (including http://) or article name where more info can be found.',
	'moodbar-what-label' => 'Link text for the page where more info abut MoodBar can be found.',
	'moodbar-form-policy-text' => 'Text displayed below the input area.

See also:
* {{msg|moodbar-form-policy-label}}',
	'moodbar-form-policy-label' => 'Label text for the link to the privacy policy,.

See also:
* {{msg|moodbar-form-policy-text}}',
	'moodbar-loading-title' => 'Title of the screen when the widget is loading.',
	'moodbar-success-title' => 'Title of the screen after the feedback was successfully submitted.',
	'moodbar-error-title' => 'Title of the screen when after an error occurred and submission aborted.',
	'moodbar-loading-subtitle' => 'Subtitle of Loading-screen. $1 is the SITENAME',
	'moodbar-success-subtitle' => 'Subtitle of screen when feedback was successfullyully submitted. $1 is the SITENAME',
	'moodbar-error-subtitle' => 'Subtitle of screen when an error occurred. $1 is the SITENAME',
);

/** Message documentation (Message documentation)
 * @author Purodha
 * @author Raymond
 * @author SPQRobin
 */
$messages['qqq'] = array(
	'moodbar-desc' => '{{desc}}
This is a feature in development. See [[mw:MoodBar 0.1/Design]] for background information.',
	'moodbar-trigger-feedback' => 'Link text of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-trigger-editing' => "Link text of the MoodBar overlay trigger. \$1 is the SITENAME. The implied sentence is ''\"Using [Sitename] made me happy/sad/...\"''. See [[mw:MoodBar 0.1/Design]] for background development information.",
	'moodbar-close' => 'Link text of the close-button. Make sure to include parentheses.

See also:
* {{msg|parentheses}}',
	'moodbar-intro-feedback' => 'Intro title of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-intro-editing' => '[[File:MoodBar-Step-1.png|right|200px]]
Intro title of the MoodBar overlay trigger. $1 is the SITENAME.',
	'tooltip-moodbar-what' => 'Tooltip displayed when hovering the What-link.

See also:
* {{msg|moodbar-what-label}}',
	'moodbar-what-label' => 'Link text for the page where more info abut MoodBar can be found.',
	'moodbar-what-content' => '$1 is the message {{msg-mw|moodbar-what-link}} which links to the page [[mw:MoodBar|MoodBar]] on MediaWiki.org.',
	'moodbar-what-link' => 'This is the link embedded as parameter $1 in {{msg-mw|moodbar-what-content}}.',
	'moodbar-privacy' => 'Parameters:
*$1 - a link having the anchor text {{msg-mw|moodbar-privacy-link}}',
	'moodbar-privacy-link' => 'This is the anchor text being used in the link replacing $1 in the message {{msg-mw|moodbar-privacy}}',
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
	'moodbar-trigger-editing' => 'Выкарыстоўваючы $1…',
	'moodbar-trigger-feedback' => 'Водгук',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Purodha
 */
$messages['de'] = array(
	'moodbar-desc' => 'Ermöglicht es Benutzern dem Betreiber des Wikis ihre Stimmung bezüglich des Bearbeitens von Seiten mitzuteilen',
	'moodbar-trigger-feedback' => 'Rückmeldung zum Bearbeiten',
	'moodbar-trigger-share' => 'Teile uns deinen Eindruck mit',
	'moodbar-trigger-editing' => 'Bearbeite $1 …',
	'moodbar-close' => '(schließen)',
	'moodbar-intro-feedback' => '$1 zu bearbeiten macht mich …',
	'moodbar-intro-share' => 'Meine Erfahrung auf $1 macht mich …',
	'moodbar-intro-editing' => '$1 zu bearbeiten macht mich …',
	'moodbar-type-happy-title' => 'glücklich',
	'moodbar-type-sad-title' => 'traurig',
	'moodbar-type-confused-title' => 'verwirrt',
	'tooltip-moodbar-what' => 'Mehr zu dieser Funktion in Erfahrung bringen',
	'moodbar-what-label' => 'Worum handelt es sich?',
	'moodbar-what-content' => 'Diese Funktion wurde entwickelt, damit man eine Rückmeldung geben kann, wie man sich beim Bearbeiten von Seiten in der Wikipedia fühlt.
Weitere Informationen hierzu sind an der folgenden Stelle zu finden: $1.',
	'moodbar-what-link' => 'Seite zu den Funktionen',
	'moodbar-privacy' => 'Mit dem Speichern erklärst du dich mit diesen $1 einverstanden.',
	'moodbar-privacy-link' => 'Bedingungen',
	'moodbar-disable-link' => 'Ich bin nicht interessiert. Bitte diese Funktion deaktivieren.',
	'moodbar-form-title' => 'Weil …',
	'moodbar-form-note' => 'Maximal 140 Zeichen',
	'moodbar-form-note-dynamic' => '$1 Zeichen verbleibend',
	'moodbar-form-submit' => 'Rückmeldung senden',
	'moodbar-form-policy-text' => 'Mit dem Senden, $1',
	'moodbar-form-policy-label' => 'unserer Richtlinie',
	'moodbar-loading-title' => 'Am senden ...',
	'moodbar-success-title' => 'Vielen Dank!',
	'moodbar-error-title' => 'Hoppla!',
	'moodbar-success-subtitle' => 'Uns deine Stimmung mitzuteilen hilft uns dabei $1 weiter zu verbessern.',
	'moodbar-error-subtitle' => 'Etwas ist schief gelaufen. Bitte versuche es später noch einmal uns deine Stimmung mitzuteilen.',
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
	'moodbar-type-happy' => 'glücklich',
	'moodbar-type-sad' => 'traurig',
	'moodbar-type-confused' => 'verwirrt',
	'moodbar-user-anonymized' => 'Anonymisiert',
	'moodbar-user-ip' => 'IP-Adresse',
	'moodbar-user-user' => 'Registrierter Benutzer',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'moodbar-trigger-share' => 'Teilen Sie uns Ihren Eindruck mit',
	'moodbar-privacy' => 'Mit dem Speichern erklären Sie sich mit diesen $1 einverstanden.',
	'moodbar-success-subtitle' => 'Uns Ihre Stimmung mitzuteilen hilft uns dabei die Wikipedia weiter zu verbessern.',
	'moodbar-error-subtitle' => 'Etwas ist schief gelaufen. Bitte versuchen Sie es später noch einmal uns Ihre Stimmung mitzuteilen.',
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
	'moodbar-close' => '(fermer)',
	'moodbar-success-title' => 'Merci !',
	'moodbar-admin-empty' => 'Aucun résultat',
	'moodbar-header-page' => 'Page',
	'moodbar-header-user' => 'Utilisateur',
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
	'moodbar-header-namespace' => 'Èspâço de noms',
	'moodbar-header-own-talk' => 'Pâge de discussion a sè',
	'moodbar-type-happy' => 'Herox',
	'moodbar-type-sad' => 'Tristo',
	'moodbar-type-confused' => 'Confondu',
	'moodbar-user-anonymized' => 'Anonimisâ',
	'moodbar-user-ip' => 'Adrèce IP',
	'moodbar-user-user' => 'Utilisator encartâ',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'moodbar-desc' => 'Permite que os usuarios especificados envíen ao operador do sitio o seu "humor"',
	'moodbar-trigger-editing' => 'Usando $1...',
	'moodbar-trigger-feedback' => 'Comentarios',
);

/** Hebrew (עברית)
 * @author Amire80
 */
$messages['he'] = array(
	'moodbar-desc' => 'מתן אפשרות למשתמשם לשלוח את "מצב הרוח" שלהם למפעיל האתר',
	'moodbar-trigger-feedback' => 'משוב על עריכה',
	'moodbar-trigger-editing' => 'עריכה $1...',
	'moodbar-close' => '(סגירה)',
	'moodbar-intro-feedback' => 'עריכת $1 גרמה לי ...',
	'moodbar-intro-editing' => 'עריכת $1 גרמה לי ...',
	'moodbar-type-happy-title' => 'שמחה',
	'moodbar-type-sad-title' => 'עצב',
	'moodbar-type-confused-title' => 'בלבול',
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
	'moodbar-trigger-feedback' => 'Commentos super le modification',
	'moodbar-trigger-share' => 'Divider tu experientia',
	'moodbar-trigger-editing' => 'Modificar $1...',
	'moodbar-close' => '(clauder)',
	'moodbar-intro-feedback' => 'Reaction:',
	'moodbar-intro-editing' => 'Le uso de $1 me rendeva...',
	'moodbar-type-happy-title' => 'Felice',
	'moodbar-type-sad-title' => 'Triste',
	'moodbar-type-confused-title' => 'Confuse',
	'tooltip-moodbar-what' => 'Lege plus a proposito de iste function',
	'moodbar-what-label' => 'Que es isto?',
	'moodbar-what-content' => 'Iste function es designate pro adjutar le communitate de Wikipedia a comprender le experientia del personas qui modifica Wikipedia.
Pro ulterior information, per favor visita le $1.',
	'moodbar-what-link' => 'pagina de function',
	'moodbar-privacy' => 'Per submitter, tu te declara de accordo que nos pote usar tu commento como explicate in $1.',
	'moodbar-privacy-link' => 'nostre politica',
	'moodbar-disable-link' => 'Isto non me interessa. Per favor disactiva iste function.',
	'moodbar-form-title' => 'Perque...',
	'moodbar-form-note' => 'maximo 140 characteres',
	'moodbar-form-note-dynamic' => 'resta $1 characteres',
	'moodbar-form-submit' => 'Inviar commento',
	'moodbar-form-policy-text' => 'Per submitter, $1',
	'moodbar-form-policy-label' => 'nostre politica',
	'moodbar-loading-title' => 'Invio in curso...',
	'moodbar-success-title' => 'Gratias!',
	'moodbar-error-title' => 'Ups!',
	'moodbar-success-subtitle' => 'Specificar tu humor nos adjuta a meliorar Wikipedia.',
	'moodbar-error-subtitle' => 'Un problema ha occurrite! Per favor tenta specificar tu humor de novo plus tarde.',
	'right-moodbar-view' => 'Vider e exportar reactiones del Barra de Humor',
	'moodbar-admin-title' => 'Reactiones del Barra de Humor',
	'moodbar-admin-intro' => 'Iste pagina permitte vider reactiones submittite con le Barra de Humor',
	'moodbar-admin-empty' => 'Nulle resultato',
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
	'moodbar-header-namespace' => 'Spatio de nomines',
	'moodbar-header-own-talk' => 'Pagina de discussion proprie',
	'moodbar-type-happy' => 'Felice',
	'moodbar-type-sad' => 'Triste',
	'moodbar-type-confused' => 'Confuse',
	'moodbar-user-anonymized' => 'Anonymisate',
	'moodbar-user-ip' => 'Adresse IP',
	'moodbar-user-user' => 'Usator registrate',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'moodbar-close' => '(zohmaache)',
	'moodbar-privacy' => 'Wä heh jät enjitt, moß met dä $1 enverschtande sen, söns moß mer et sennlohße.',
	'moodbar-privacy-link' => 'Begengonge',
	'moodbar-success-title' => 'Mer bedanke uns.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'moodbar-desc' => 'Erméiglecht et spezifesche Benotzer fir dem Responsabele vum Site hir Stëmmung ze schécken',
	'moodbar-trigger-feedback' => "Feedback iwwert d'Änneren",
	'moodbar-trigger-editing' => 'Ännert $1...',
	'moodbar-close' => '(zoumaachen)',
	'moodbar-intro-feedback' => '$1 ännere mécht mech ...',
	'moodbar-intro-editing' => '$1 ännere mécht mech ...',
	'moodbar-type-happy-title' => 'Glécklech',
	'moodbar-type-sad-title' => 'Traureg',
	'moodbar-what-label' => 'Wat ass dat?',
	'moodbar-disable-link' => 'Ech sinn net interesséiert. Schalt dës Fonctioun w.e.g. aus.',
	'moodbar-form-title' => 'Well...',
	'moodbar-form-note' => 'Maximal 140 Zeechen',
	'moodbar-form-policy-label' => 'eis Richtlinnen',
	'moodbar-success-title' => 'Merci!',
	'moodbar-error-title' => 'Ups!',
	'moodbar-admin-empty' => 'Keng Resultater',
	'moodbar-header-timestamp' => 'Zäitstempel',
	'moodbar-header-type' => 'Typ',
	'moodbar-header-page' => 'Säit',
	'moodbar-header-usertype' => 'Benotzer-Typ',
	'moodbar-header-user' => 'Benotzer',
	'moodbar-header-editmode' => 'Ännerungsmodus',
	'moodbar-header-comment' => 'Bemierkungen',
	'moodbar-header-user-editcount' => 'Compteur vun den Ännerunge pro Benotzer',
	'moodbar-header-namespace' => 'Nummraum',
	'moodbar-header-own-talk' => 'Eegen Diskussiounssäit',
	'moodbar-type-happy' => 'Glécklech',
	'moodbar-type-sad' => 'Traureg',
	'moodbar-user-anonymized' => 'Anonymiséiert',
	'moodbar-user-ip' => 'IP-Adress',
	'moodbar-user-user' => 'Registréierte Benotzer',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'moodbar-desc' => 'Им овозможува на одредени корисници да му го соопштуваат нивното „расположение“ на операторот на мрежното место',
	'moodbar-trigger-feedback' => 'Мислења за уредувањето',
	'moodbar-trigger-share' => 'Споделете го вашето искуство',
	'moodbar-trigger-editing' => 'Уредување на $1...',
	'moodbar-close' => '(затвори)',
	'moodbar-intro-feedback' => 'Уредувањето на $1 ме...',
	'moodbar-intro-share' => 'Она што се случуваше на $1 ме...',
	'moodbar-intro-editing' => 'Уредувањето на $1 ме...',
	'moodbar-type-happy-title' => 'усреќи',
	'moodbar-type-sad-title' => 'натажи',
	'moodbar-type-confused-title' => 'збуни',
	'tooltip-moodbar-what' => 'Дознајте повеќе за оваа функција',
	'moodbar-what-label' => 'Што е ова?',
	'moodbar-what-content' => 'Оваа функција е предвидена да ѝ овозможува на заедницата да го осознае искуството на луѓето што ја уредуваат Википедија.
Повеќе информации ќе добиете на $1.',
	'moodbar-what-link' => 'страница за функцијата',
	'moodbar-privacy' => 'Поднесувајќи го ова, се согласувате на транспарентност под следниве $1.',
	'moodbar-privacy-link' => 'услови',
	'moodbar-disable-link' => 'Не сум заинтересиран. Оневозможи ја функцијава.',
	'moodbar-form-title' => 'Бидејќи...',
	'moodbar-form-note' => 'највеќе 140 знаци',
	'moodbar-form-note-dynamic' => 'Преостануваат $1 знаци',
	'moodbar-form-submit' => 'Сподели ▶',
	'moodbar-form-policy-text' => 'Поднесувајќи го ова, $1',
	'moodbar-form-policy-label' => 'нашите правила',
	'moodbar-loading-title' => 'Споделувам...',
	'moodbar-success-title' => 'Благодариме!',
	'moodbar-error-title' => 'Упс!',
	'moodbar-success-subtitle' => 'Споделувајќи го вашето расположение ни помагате да ја подобриме Википедија.',
	'moodbar-error-subtitle' => 'Нешто не е в ред! Обидете се да го споделите вашето расположение подоцна.',
	'right-moodbar-view' => 'Преглед и извоз на мислења од MoodBar',
	'moodbar-admin-title' => 'Мислења со MoodBar',
	'moodbar-admin-intro' => 'Оваа страница служи за преглед на мислења поднесени со MoodBar',
	'moodbar-admin-empty' => 'Нема резултати',
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
	'moodbar-header-namespace' => 'Именски простор',
	'moodbar-header-own-talk' => 'Сопствена страница за разговор',
	'moodbar-type-happy' => 'Среќен',
	'moodbar-type-sad' => 'Тажен',
	'moodbar-type-confused' => 'Збунет',
	'moodbar-user-anonymized' => 'Анонимизирано',
	'moodbar-user-ip' => 'IP-адреса',
	'moodbar-user-user' => 'Регистриран корисник',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'moodbar-intro-editing' => '$1 തിരുത്തിയപ്പോൾ എനിക്ക്...',
	'moodbar-type-happy-title' => 'സന്തോഷമായി',
	'moodbar-type-sad-title' => 'ദുഃഖമായി',
	'moodbar-type-confused-title' => 'ആശയക്കുഴപ്പമായി',
	'moodbar-form-title' => 'കാരണം...',
	'moodbar-success-title' => 'നന്ദി!',
	'moodbar-error-title' => 'അയ്യോ!',
	'moodbar-admin-empty' => 'ഫലങ്ങൾ ഒന്നുമില്ല',
	'moodbar-header-timestamp' => 'സമയമുദ്ര',
	'moodbar-header-type' => 'തരം',
	'moodbar-header-page' => 'താൾ',
	'moodbar-header-user' => 'ഉപയോക്താവ്',
	'moodbar-header-namespace' => 'നാമമേഖല',
	'moodbar-header-own-talk' => 'സ്വന്തം സം‌വാദം താൾ',
	'moodbar-user-ip' => 'ഐ.പി. വിലാസം',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 */
$messages['nl'] = array(
	'moodbar-desc' => 'Laat bepaalde gebruikers toe hun "gemoedstoestand" naar de sitebeheerders te verzenden',
	'moodbar-trigger-feedback' => 'Terugkoppeling over het bewerken',
	'moodbar-trigger-share' => 'Deel uw ervaring',
	'moodbar-trigger-editing' => 'Het bewerken van $1...',
	'moodbar-close' => '(sluiten)',
	'moodbar-intro-feedback' => 'Het bewerken van $1 maakte mij...',
	'moodbar-intro-share' => 'Mijn ervaring op $1 maakte mij...',
	'moodbar-intro-editing' => '$1 bewerken maakte mij...',
	'moodbar-type-happy-title' => 'Blij',
	'moodbar-type-sad-title' => 'Triest',
	'moodbar-type-confused-title' => 'Verward',
	'tooltip-moodbar-what' => 'Meer informatie over deze functie',
	'moodbar-what-label' => 'Wat is dit?',
	'moodbar-what-content' => 'Deze functie is ontworpen om de Wikipedia-gemeenschap de ervaring van mensen die Wikipedia bewerken, te helpen begrijpen.
Voor meer informatie, ga naar de $1.',
	'moodbar-what-link' => 'pagina over deze functie',
	'moodbar-privacy' => 'Door te delen gaat u akkoord met transparantie onder deze $1.',
	'moodbar-privacy-link' => 'voorwaarden',
	'moodbar-disable-link' => 'Ik ben niet geïnteresseerd. Schakel deze functie uit.',
	'moodbar-form-title' => 'Omdat...',
	'moodbar-form-note' => 'Maximaal 140 tekens',
	'moodbar-form-note-dynamic' => '$1 tekens resterend',
	'moodbar-form-submit' => 'Feedback delen ▶',
	'moodbar-form-policy-text' => 'Door te delen, $1',
	'moodbar-form-policy-label' => 'ons beleid',
	'moodbar-loading-title' => 'Bezig met delen...',
	'moodbar-success-title' => 'Bedankt!',
	'moodbar-error-title' => 'Oeps!',
	'moodbar-success-subtitle' => 'Door het delen van uw ervaringen bij het bewerken, helpt u mee $1 te verbeteren.',
	'moodbar-error-subtitle' => 'Er is iets misgegaan! Probeer later opnieuw uw gemoedstoestand te delen.',
	'right-moodbar-view' => 'MoodBar-terugkoppeling bekijken en exporteren',
	'moodbar-admin-title' => 'MoodBar-terugkoppeling',
	'moodbar-admin-intro' => 'Deze pagina laat u toe om terugkoppeling die met de MoodBar is verzonden, te bekijken',
	'moodbar-admin-empty' => 'Geen resultaten',
	'moodbar-header-id' => 'Nummer van de terugkoppeling',
	'moodbar-header-timestamp' => 'Tijdstip',
	'moodbar-header-type' => 'Type',
	'moodbar-header-page' => 'Pagina',
	'moodbar-header-usertype' => 'Gebruikerstype',
	'moodbar-header-user' => 'Gebruiker',
	'moodbar-header-editmode' => 'Bewerkingsmodus',
	'moodbar-header-bucket' => 'Testgroep',
	'moodbar-header-system' => 'Systeemtype',
	'moodbar-header-locale' => 'Taalinstelling',
	'moodbar-header-useragent' => 'User-agent',
	'moodbar-header-comment' => 'Opmerkingen',
	'moodbar-header-user-editcount' => 'Aantal bewerkingen van de gebruiker',
	'moodbar-header-namespace' => 'Naamruimte',
	'moodbar-header-own-talk' => 'Eigen overlegpagina',
	'moodbar-type-happy' => 'Blij',
	'moodbar-type-sad' => 'Triest',
	'moodbar-type-confused' => 'Verward',
	'moodbar-user-anonymized' => 'Geanonimiseerd',
	'moodbar-user-ip' => 'IP-adres',
	'moodbar-user-user' => 'Geregistreerde gebruiker',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'moodbar-desc' => 'Permite que os utilizadores especificados enviem ao operador do site uma indicação do seu estado de espírito',
	'moodbar-trigger-feedback' => 'Comentários sobre edição',
	'moodbar-trigger-share' => 'Partilhe a sua experiência',
	'moodbar-trigger-editing' => 'A editar $1...',
	'moodbar-close' => '(fechar)',
	'moodbar-intro-feedback' => 'Editar a $1 fez-me sentir...',
	'moodbar-intro-share' => 'Visitar a $1 fez-me sentir...',
	'moodbar-intro-editing' => 'Usar a $1 tornou-me...',
	'moodbar-type-happy-title' => 'Feliz',
	'moodbar-type-sad-title' => 'Triste',
	'moodbar-type-confused-title' => 'Confuso',
	'tooltip-moodbar-what' => 'Saiba mais sobre esta funcionalidade',
	'moodbar-what-label' => 'O que é isto?',
	'moodbar-what-content' => 'Esta funcionalidade foi concebida para ajudar a comunidade da Wikipédia a compreender a experiência das pessoas que editam a Wikipédia.
Para mais informações, visite $1.',
	'moodbar-what-link' => 'a página da funcionalidade',
	'moodbar-privacy' => 'Ao gravar, concorda que os seus comentários podem ser tornados públicos tal como explicado $1.',
	'moodbar-privacy-link' => 'nas normas',
	'moodbar-disable-link' => 'Não estou interessado. Desactivar esta funcionalidade, por favor.',
	'moodbar-form-title' => 'Porque...',
	'moodbar-form-note' => 'máx. 140 caracteres',
	'moodbar-form-note-dynamic' => 'restam $1 caracteres',
	'moodbar-form-submit' => 'Partilhar Comentários',
	'moodbar-form-policy-text' => 'Ao gravar, $1',
	'moodbar-form-policy-label' => 'as nossas normas',
	'moodbar-loading-title' => 'A partilhar...',
	'moodbar-success-title' => 'Obrigado!',
	'moodbar-error-title' => 'Erro!',
	'moodbar-success-subtitle' => 'Partilhar connosco o seu estado de espírito ajuda-nos a melhorar a Wikipédia.',
	'moodbar-error-subtitle' => 'Algo correu mal! Tente novamente mais tarde, por favor.',
	'right-moodbar-view' => 'Ver e exportar os comentários da MoodBar',
	'moodbar-admin-title' => 'Comentários da MoodBar',
	'moodbar-admin-intro' => 'Esta página permite-lhe ver os comentários enviados com a MoodBar',
	'moodbar-admin-empty' => 'Não foram encontrados resultados',
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
	'moodbar-header-namespace' => 'Espaço nominal',
	'moodbar-header-own-talk' => 'Página de discussão própria',
	'moodbar-type-happy' => 'Feliz',
	'moodbar-type-sad' => 'Triste',
	'moodbar-type-confused' => 'Confuso',
	'moodbar-user-anonymized' => 'Tornado anónimo',
	'moodbar-user-ip' => 'Endereço IP',
	'moodbar-user-user' => 'Utilizador registado',
);

/** Russian (Русский)
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'moodbar-desc' => 'Позволяет определенным участникам отправлять свои «настроения» обратно на сайт оператора',
);

