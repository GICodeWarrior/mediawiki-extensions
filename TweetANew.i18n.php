<?php
/**
 * Internationalisation file for extension TweetANew
 *
 * @addtogroup Extensions
 * @license GPL
 */
 
$messages = array();

/** English
 * @author Gregory Varnum
 */
$messages['en'] = array( 
	'tweetanew-desc' => 'Tweets when an page is created or edited.  Depending on preferences set for the entire wiki, either automatically or from the edit page.',
	'tweetanew-accesskey' => 'e',
	'tweetanew-newaction' => 'Tweet about this new page',
	'tweetanew-newtooltip' => 'Send information about this new page to Twitter',
	'tweetanew-editaction' => 'Tweet about this edit',
	'tweetanew-edittooltip' => 'Send information about this edit to Twitter',
	'tweetanew-minoredit' => 'm',
	'tweetanew-authorcredit' => 'by',
	'tweetanew-newdefault' => 'NEW PAGE: $1 - $2',
	'tweetanew-new1' => 'Looks like $1 was created at $2',
	'tweetanew-new2' => '$1 was recently created at $2',
	'tweetanew-new3' => 'Check out $2 - it has a new page on $1',
	'tweetanew-editdefault' => 'UPDATED PAGE: $1 - $2',
	'tweetanew-edit1' => 'Looks like $1 was updated at $2',
	'tweetanew-edit2' => '$1 was recently changed at $2',
	'tweetanew-edit3' => 'Check out $2 - it has some new content on $1',
);

/** Message documentation (Message documentation)
 * @author Gregory Varnum
 */
$messages['qqq'] = array(
	'tweetanew-desc' => '{{desc}}',
	'tweetanew-newaction' => 'Used in editpage as description for option to tweet, if auto-tweet is disabled for new page',
	'tweetanew-newtooltip' => 'Tooltip describing option to tweet about new page from edit page, if otherwise enabled',
	'tweetanew-editaction' => 'Used in editpage as description for option to tweet, if auto-tweet is disabled for edits',
	'tweetanew-edittooltip' => 'Tooltip describing option to tweet about edit from edit page, if otherwise enabled',
	'tweetanew-minoredit' => 'Indicator used when edit is marked as minor, if minor edits are not already skipped - skip following indicator can be removed using MinorSpace setting',
	'tweetanew-authorcredit' => 'Used to provide credit to author of edit or new page',
	'tweetanew-newdefault' => 'Default tweet message used for new page, if random messages are disabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
	'tweetanew-new1' => 'First random tweet message used for new pages, if random messages are enabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
	'tweetanew-new2' => 'Second random tweet message used for new pages, if random messages are enabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
	'tweetanew-new3' => 'Third random tweet message used for new pages, if random messages are enabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
	'tweetanew-editdefault' => 'Default tweet message used for edited pages, if random messages are disabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
	'tweetanew-edit1' => 'First random tweet message used for edited pages, if random messages are enabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
	'tweetanew-edit2' => 'Second random tweet message used for edited pages, if random messages are enabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
	'tweetanew-edit3' => 'Third random tweet message used for edited pages, if random messages are enabled. Parameters:
* $1 is title of the new page
* $2 is the final URL of the new page - shortened if a service is enabled via this extension',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'tweetanew-desc' => 'Ermöglicht das automatisierte oder manuell ausgelöste Tweeten von neuen oder gerade bearbeiteten Seiten',
	'tweetanew-newaction' => 'Diese neue Seite tweeten',
	'tweetanew-newtooltip' => 'Informationen zu dieser neuen Seite an Twitter senden',
	'tweetanew-editaction' => 'Diese Bearbeitung tweeten',
	'tweetanew-edittooltip' => 'Informationen zu dieser Bearbeitung an Twitter senden',
	'tweetanew-minoredit' => 'K',
	'tweetanew-authorcredit' => 'von',
	'tweetanew-newdefault' => 'NEUE SEITE: $1 - $2',
	'tweetanew-new1' => 'Gerade wurde $1 erstellt: $2',
	'tweetanew-new2' => '$1 wurde kürzlich erstellt: $2',
	'tweetanew-new3' => 'Schaut Euch den Link $2 an - die neue Seite $1',
	'tweetanew-editdefault' => 'AKTUALISIERTE SEITE:  $1 - $2',
	'tweetanew-edit1' => 'Gerade wurde $1 aktualisiert: $2',
	'tweetanew-edit2' => '$1 wurde kürzlich aktualisiert: $2',
	'tweetanew-edit3' => 'Schaut Euch den Link $2 an - die Seite $1 wurde geändert',
);

/** French (Français)
 * @author Crochet.david
 * @author Gomoko
 */
$messages['fr'] = array(
	'tweetanew-desc' => "Tweeter lorsqu'une page est créée ou modifiée. Selon les préférences définis pour le wiki complet, soit automatiquement, soit depuis la page de modification.",
	'tweetanew-newaction' => 'Tweeter à propos de cette nouvelle page',
	'tweetanew-newtooltip' => 'Envoyer des informations sur cette nouvelle page sur Twitter',
	'tweetanew-editaction' => 'Tweeter à propos de cette modification',
	'tweetanew-edittooltip' => 'Envoyer des informations sur cette modification à Twitter',
	'tweetanew-minoredit' => 'm',
	'tweetanew-authorcredit' => 'par',
	'tweetanew-newdefault' => 'NOUVELLE PAGE :  $1 - $2',
	'tweetanew-new1' => 'Ressemble à $1 qui a été créé sur $2',
	'tweetanew-new2' => '$1 a été récemment créé sur $2',
	'tweetanew-new3' => 'Vérifiez $2 - il y a une nouvelle page sur $1',
	'tweetanew-editdefault' => 'PAGE MISE À JOUR jour :  $1 - $2',
	'tweetanew-edit1' => 'Il semblerait que $1a été mis à jour sur $2',
	'tweetanew-edit2' => '$1 a été récemment modifié sur $2',
	'tweetanew-edit3' => 'Vérifiez $2 - il y a du nouveau contenu sur $1',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'tweetanew-desc' => 'Fai un chío cando se crea ou edita unha páxina. Dependendo das preferencias definidas no wiki realízase automaticamene ou desde a páxina de edición.',
	'tweetanew-newaction' => 'Facer un chío sobre esta páxina nova',
	'tweetanew-newtooltip' => 'Enviar información sobre esta páxina nova ao Twitter',
	'tweetanew-editaction' => 'Facer un chío sobre esta edición',
	'tweetanew-edittooltip' => 'Enviar información sobre esta edición ao Twitter',
	'tweetanew-minoredit' => 'm',
	'tweetanew-authorcredit' => 'por',
	'tweetanew-newdefault' => 'PÁXINA NOVA: $1 - $2',
	'tweetanew-new1' => 'Semella que se creou a páxina "$1" no enderezo $2',
	'tweetanew-new2' => 'Creouse a páxina "$1" no enderezo $2',
	'tweetanew-new3' => 'Bótalle unha ollada a "$2", unha nova páxina no enderezo $1',
	'tweetanew-editdefault' => 'PÁXINA ACTUALIZADA: $1 - $2',
	'tweetanew-edit1' => 'Semella que se actualizou a páxina "$1" no enderezo $2',
	'tweetanew-edit2' => 'Actualizouse a páxina "$1" no enderezo $2',
	'tweetanew-edit3' => 'Bótalle unha ollada a "$2", con novos contidos no enderezo $1',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'tweetanew-desc' => 'Прави објава на Twitter при создавање или уредување на страница. Ова се врши или автоматски, или од уредувањето (зависно од нагодувањата на викито во целина).',
	'tweetanew-newaction' => 'Објави за новава страница на Twitter',
	'tweetanew-newtooltip' => 'Испратете информации за оваа нова страница на Twitter',
	'tweetanew-editaction' => 'Објави за уредувањево на Twitter',
	'tweetanew-edittooltip' => 'Испратете информации за ова уредување на Twitter',
	'tweetanew-minoredit' => 'с',
	'tweetanew-authorcredit' => 'од',
	'tweetanew-newdefault' => 'НОВА СТРАНИЦА: $1 - $2',
	'tweetanew-new1' => 'Се чини дека на $2 ја создадоа страницата $1',
	'tweetanew-new2' => 'На $2 неодамна ја создадоа страницата $1',
	'tweetanew-new3' => 'Погледајте ја $2 - има нова страница за $1',
	'tweetanew-editdefault' => 'ПОДНОВЕНА СТРАНИЦА: $1 - $2',
	'tweetanew-edit1' => 'Се чини дека на $2 ја подновија страницата $1',
	'tweetanew-edit2' => 'На $2 неодамна ја изменија страницата $1',
	'tweetanew-edit3' => 'Погледајте ја $2 - има некои нови содржини за $1',
);

/** Dutch (Nederlands)
 * @author Inholland
 * @author SPQRobin
 */
$messages['nl'] = array(
	'tweetanew-desc' => 'Verstuurt tweets wanneer een pagina wordt gemaakt of bewerkt. Afhankelijk van de voorkeuren die zijn ingesteld voor heel de wiki, gebeurt dit automatisch of vanop de bewerkingspagina.',
	'tweetanew-newaction' => 'Tweet over deze nieuwe pagina',
	'tweetanew-newtooltip' => 'Verstuur informatie over deze nieuwe pagina naar Twitter',
	'tweetanew-editaction' => 'Tweet over deze bewerking',
	'tweetanew-edittooltip' => 'Verstuur informatie over deze bewerking naar Twitter',
	'tweetanew-minoredit' => 'k',
	'tweetanew-authorcredit' => 'door',
	'tweetanew-newdefault' => 'NIEUWE PAGINA: $1 - $2',
	'tweetanew-new1' => 'Ziet eruit dat $1 is aangemaakt op $2',
	'tweetanew-new2' => '$1 is onlangs aangemaakt op $2',
	'tweetanew-new3' => 'Bekijk $2 - het heeft een nieuwe pagina op $1',
	'tweetanew-editdefault' => 'BIJGEWERKTE PAGINA:  $1 - $2',
	'tweetanew-edit1' => 'Ziet eruit dat $1 is bijgewerkt op $2',
	'tweetanew-edit2' => '$1 is onlangs aangepast op $2',
	'tweetanew-edit3' => 'Bekijk $2 - het heeft nieuwe inhoud op $1',
);

