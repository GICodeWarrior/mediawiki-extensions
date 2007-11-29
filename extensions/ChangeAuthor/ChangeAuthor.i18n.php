<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author Roan Kattouw <roan.kattouw@home.nl>
 * @copyright Copyright (C) 2007 Roan Kattouw 
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License
 *
 * An extension that allows changing the author of a revision
 * Written for the Bokt Wiki <http://www.bokt.nl/wiki/> by Roan Kattouw <roan.kattouw@home.nl>
 * For information how to install and use this extension, see the README file.
 *
 */
# Alert the user that this is not a valid entry point to MediaWiki if they try to access the extension file directly.
if (!defined('MEDIAWIKI')) {
		echo <<<EOT
To install the ChangeAuthor extension, put the following line in LocalSettings.php:
require_once( "$IP/extensions/ChangeAuthor/ChangeAuthor.setup.php" );
EOT;
		exit(1);
}

$allMessages = array(
	'en' => array( 
		'changeauthor' => 'Change revision author',
		'changeauthor-short' => 'ChangeAuthor', # don't translate or duplicate this message to other languages
		'changeauthor-title' => 'Change the author of a revision',
		'changeauthor-search-box' => 'Search revisions',
		'changeauthor-pagename-or-revid' => 'Article name or revision ID:',
		'changeauthor-pagenameform-go' => 'Go',
		'changeauthor-comment' => 'Comment:',
		'changeauthor-changeauthors-multi' => 'Change author(s)',
		'changeauthor-explanation-multi' => 'With this form you can change revision authors. Simply change one or more usernames in the list below, add a comment (optional) and click the \'Change author(s)\' button.',
		'changeauthor-changeauthors-single' => 'Change author',
		'changeauthor-explanation-single' => 'With this form you can change a revision author. Simply change the username below, add a comment (optional) and click the \'Change author\' button.',
		'changeauthor-invalid-username' => 'Invalid username "$1".',
		'changeauthor-nosuchuser' => 'No such user "$1".',
		'changeauthor-revview' => 'Revision #$1 of $2',
		'changeauthor-nosuchtitle' => 'There is no article called "$1".',
		'changeauthor-weirderror' => 'A very strange error occurred. Please retry your request. If this error keeps showing up, the database is probably broken.',
		'changeauthor-invalidform' => 'Please use the form provided by Special:ChangeAuthor rather than a custom form.',
		'changeauthor-success' => 'Your request has been processed successfully.',
		'changeauthor-logentry' => 'Changed author of $2 of $1 from $3 to $4',
		'changeauthor-logpagename' => 'Author change log',
		'changeauthor-logpagetext' => '',
		'changeauthor-rev' => 'r$1',
	),
	'ar' => array(
		'changeauthor' => 'غير مؤلف النسخة',
		'changeauthor-title' => 'غير مؤلف نسخة',
		'changeauthor-search-box' => 'ابحث في النسخ',
		'changeauthor-pagename-or-revid' => 'اسم المقالة أو رقم النسخة:',
		'changeauthor-pagenameform-go' => 'اذهب',
		'changeauthor-comment' => 'تعليق:',
		'changeauthor-changeauthors-multi' => 'غير المؤلف(ين)',
		'changeauthor-explanation-multi' => 'باستخدام هذه الاستمارة يمكنك تغيير مؤلفي النسخ. ببساطة غير واحدا أو أكثر من أسماء المستخدمين في القائمة بالأسفل ، أضف تعليقا (اختياري) واضغط على زر \'غير المؤلف(ين)\'.',
		'changeauthor-changeauthors-single' => 'غير المؤلف',
		'changeauthor-explanation-single' => 'باستخدام هذه الاستمارة يمكنك تغيير مؤلف نسخة. ببساطة غير اسم اسم المستخدم بالأسفل، أضف تعليقا (اختياري) واضغط على زر \'غير المؤلف\'.',
		'changeauthor-invalid-username' => 'اسم مستخدم غير صحيح "$1".',
		'changeauthor-nosuchuser' => 'لا يوجد مستخدم بالاسم "$1".',
		'changeauthor-revview' => 'النسخة #$1 من $2',
		'changeauthor-nosuchtitle' => 'لا توجد مقالة بالاسم "$1".',
		'changeauthor-weirderror' => 'حدث خطأ غريب للغاية. من فضلك حاول القيام بطلبك مرة ثانية. لو استمر هذا الخطأ، إذا فقاعدة البيانات على الأرجح مكسورة.',
		'changeauthor-invalidform' => 'من فضلك استخدم الاستمارة الموفرة بواسطة Special:ChangeAuthor بدلا من استمارة معدلة.',
		'changeauthor-success' => 'طلبك تم الانتهاء منه بنجاح.',
		'changeauthor-logentry' => 'غير مؤلف $2 ل$1 من $3 إلى $4',
		'changeauthor-logpagename' => 'سجل تغيير المؤلفين',
		'changeauthor-rev' => 'ن$1',
	),
	'de' => array( 
		'changeauthor' => 'Autor einer Version ändern',
		'changeauthor-title' => 'Autor einer Version ändern',
		'changeauthor-search-box' => 'Version suchen',
		'changeauthor-pagename-or-revid' => 'Seitenname oder Versionsnummer:',
		'changeauthor-pagenameform-go' => 'Suche',
		'changeauthor-comment' => 'Kommentar:',
		'changeauthor-changeauthors-multi' => 'Ändere Autor(en)',
		'changeauthor-explanation-multi' => 'Mit diesem Formular kannst du die Autoren der Versionen ändern. Ändere einfach einen oder mehrerer Autorenname in der Liste, ergänze einen Kommentar (optional) und klicke auf die „Autor ändern“-Schaltfläche',	
		'changeauthor-changeauthors-single' => 'Autor ändern',
		'changeauthor-explanation-single' => 'Mit diesem Formular kannst du den Autoren einer Version ändern. Ändere einfach den Autorenname in der Liste, ergänze einen Kommentar (optional) und klicke auf die „Autor ändern“-Schaltfläche',
		'changeauthor-invalid-username' => 'Ungültiger Benutzername „$1“.',
		'changeauthor-nosuchuser' => 'Es gibt keinen Benutzer „$1“.',
		'changeauthor-revview' => 'Version #$1 von $2',
		'changeauthor-nosuchtitle' => 'Es gibt keine Seite „$1“.',
		'changeauthor-weirderror' => 'Ein sehr seltener Fehler ist aufgetreten. Bitte wiederhole deine Änderung. Wenn dieser Fehler erneut auftritt, ist vermutlich die Datenbank zerstört.',
		'changeauthor-invalidform' => 'Bitte benutzer das Formular unter Special:ChangeAuthor.',
		'changeauthor-success' => 'Deine Änderung wurde erfolgreich durchgeführt.',
		'changeauthor-logentry' => 'änderte Autorenname der $2 von $1 von $3 auf $4',
		'changeauthor-logpagename' => 'Autorenname-Änderungslogbuch',
		'changeauthor-logpagetext' => '',
		'changeauthor-rev' => 'Version $1',
	),
	'el' => array(
		'changeauthor-invalid-username' => 'Άκυρο όνομα-χρήστη  "$1".',
		'changeauthor-rev' => 'r$1',#identical but defined
	),
	'fr' => array(
		'changeauthor' => 'Changer l\'auteur des révisions',
		'changeauthor-title' => 'Changer l\'auteur d\'une révision',
		'changeauthor-search-box' => 'Rechercher des révisions',
		'changeauthor-pagename-or-revid' => 'Titre de l\'article ou ID de révision :',
		'changeauthor-pagenameform-go' => 'Aller',
		'changeauthor-comment' => 'Commentaire :',
		'changeauthor-changeauthors-multi' => 'Changer auteur(s)',
		'changeauthor-explanation-multi' => 'Avec ce formulaire, vous pouvez changer les auteurs des révisions. Modifier un ou plusieurs noms d\'usager dans la liste, ajouter un commentaire (facultatif) et cliquer le bouton \'\'Changer auteur(s)\'\'.',
		'changeauthor-changeauthors-single' => 'Changer l\'auteur',
		'changeauthor-explanation-single' => 'Avec ce formulaire, vous pouvez changer l\'auteur d\'une révision. Changer le nom d\'auteur ci-dessous, ajouter un commentaire (facultatif) et cliquer sur le bouton \'\'Changer l\'auteur\'\'.',
		'changeauthor-invalid-username' => 'Nom d\'utilisateur « $1 » invalide',
		'changeauthor-nosuchuser' => 'Pas d\'utilisateur « $1 »',
		'changeauthor-revview' => 'Révision #$1 de $2',
		'changeauthor-nosuchtitle' => 'Pas d\'article intitulé « $1 »',
		'changeauthor-weirderror' => 'Une erreur s\'est produite. Prière d\'essayer à nouveau. Si cette erreur est apparue à plusieurs reprises, la base de données est probablement corrompue.',
		'changeauthor-invalidform' => 'Prière d\'utiliser le formulaire généré par Special:ChangeAuthor plutôt qu\'un formulaire personnel',
		'changeauthor-success' => 'Votre requête a été traitée avec succès.',
		'changeauthor-logpagename' => 'Journal des changements faits par l\'auteur',
	),
	'frp' => array(
		'changeauthor' => 'Changiér l’ôtor de les vèrsions',
		'changeauthor-title' => 'Changiér l’ôtor d’una vèrsion',
		'changeauthor-search-box' => 'Rechèrchiér des vèrsions',
		'changeauthor-pagename-or-revid' => 'Titro de l’articllo ou ID de vèrsion :',
		'changeauthor-pagenameform-go' => 'Alar',
		'changeauthor-comment' => 'Comentèro :',
		'changeauthor-changeauthors-multi' => 'Changiér ôtor(s)',
		'changeauthor-changeauthors-single' => 'Changiér l’ôtor',
		'changeauthor-invalid-username' => 'Nom d’utilisator « $1 » envalido.',
		'changeauthor-nosuchuser' => 'Pas d’utilisator « $1 ».',
		'changeauthor-revview' => 'Vèrsion #$1 de $2',
		'changeauthor-nosuchtitle' => 'Pas d’articllo avouéc lo titro « $1 ».',
		'changeauthor-success' => 'Voutra requéta at étâ trètâ avouéc reusséta.',
		'changeauthor-logpagename' => 'Jornal des changements fêts per l’ôtor',
		'changeauthor-rev' => 'v$1',
	),
	'hsb' => array(
		'changeauthor' => 'Wersijoweho awtora změnić',
		'changeauthor-title' => 'Awtora wersije změnić',
		'changeauthor-search-box' => 'Wersije pytać',
		'changeauthor-pagename-or-revid' => 'Mjeno nastawka abo ID wersije:',
		'changeauthor-pagenameform-go' => 'Dźi',
		'changeauthor-comment' => 'Komentar:',
		'changeauthor-changeauthors-multi' => '{{PLURAL:$1|awtora|awtorow|awtorow|awtorow}} změnić',
		'changeauthor-explanation-multi' => 'Z tutym formularom móžeš awtorow wersijow změnić. Změń prosće jedne wužiwarske mjeno abo wjacore wužiwarske mjena w lisćinje deleka, přidaj komentar (opcionalny) a klikń na tłóčatko \'{{PLURAL:$1|Awtora|Awtorow|Awtorow|Awtorow}} zmenić\'.',
		'changeauthor-changeauthors-single' => 'Awtora změnić',
		'changeauthor-explanation-single' => 'Z tutym formularom móžeš awtora wersije změnić. Změń prosće wužiwarske mjeno deleka, přidaj komentar (opcionalny) a klikń na tłóčatko \'Awtora změnić\'.',
		'changeauthor-invalid-username' => 'Njepłaćiwe wužiwarske mjeno "$1".',
		'changeauthor-nosuchuser' => 'Wužiwar "$1" njeje.',
		'changeauthor-revview' => 'Wersija #$1 wot $2',
		'changeauthor-nosuchtitle' => 'Nastawk z mjenom "$1" njeeksistuje.',
		'changeauthor-weirderror' => 'Jara dźiwny zmylk je wustupił. Prošu spytaj swoje požadanje znowa. Jeli so tutón zmylk zaso a zaso jewi, je najskerje datowa banka poškodźena.',
		'changeauthor-invalidform' => 'Prošu wužij radšo formular z Special:ChangeAuthor hač wužiwarski formular.',
		'changeauthor-success' => 'Waše požadanje je so wuspěšnje wobdźěłało.',
		'changeauthor-logentry' => 'Změni so awtor wot $2 wot $1 z $3 do $4',
		'changeauthor-logpagename' => 'Protokol wo změnach awtorow',
	),
	'nl' => array(
		'changeauthor' => 'Auteur versie wijzigen',
		'changeauthor-title' => 'De auteur van een bewerkingsversie wijzigen',
		'changeauthor-search-box' => 'Versies zoeken',
		'changeauthor-pagename-or-revid' => 'Paginanaam of versienummer:',
		'changeauthor-pagenameform-go' => 'Gaan',
		'changeauthor-comment' => 'Toelichting:',
		'changeauthor-changeauthors-multi' => 'Auteur(s) wijzigen',
		'changeauthor-explanation-multi' => 'Met dit formulier kunt u de auteur van een bewerkingsversie wijzigen. Wijzig simpelweg één of meer gebruikersnamen in de lijst hieronder, voeg een toelichting toe (niet verplicht) en klik op de knop \'Auteur(s) wijzigen\'.',
		'changeauthor-changeauthors-single' => 'Auteur wijzigen',
		'changeauthor-explanation-single' => 'Met dit formulier kunt u de auteur van een bewerkingsversie wijzigen. Wijzig simpelweg de gebruikersnaam in het tekstvak hieronder, voeg een toelichting toe (niet verplicht) en klik op de knop \'Auteur wijzigen\'.',
		'changeauthor-invalid-username' => 'Ongeldige gebruikersnaam "$1".',
		'changeauthor-nosuchuser' => 'Gebruiker "$1" bestaat niet.',
		'changeauthor-revview' => 'Bewerking no. $1 van $2',
		'changeauthor-nosuchtitle' => 'Er is geen pagina genaamd "$1".',
		'changeauthor-weirderror' => 'Er is een erg vreemde fout opgetreden. Probeer het a.u.b. nogmaals. Als u deze foutmelding elke keer weer ziet, is er waarschijnlijk iets mis met de database.',
		'changeauthor-invalidform' => 'Gebruik a.u.b. het formulier van Special:ChangeAuthor, in plaats van een aangepast formulier.',
		'changeauthor-success' => 'Uw verzoek is succesvol verwerkt.',
		'changeauthor-logentry' => 'Auteur van $2 van $1 gewijzigd van $3 naar $4',
		'changeauthor-logpagename' => 'Auteurswijzigingenlogboek',
		'changeauthor-rev' => 'r$1',#identical but defined
	),
	'pt' => array(
		'changeauthor-comment' => 'Comentário:',
		'changeauthor-changeauthors-multi' => 'Alterar autor(es)',
		'changeauthor-invalid-username' => 'Nome de utilizador "$1" inválido.',
		'changeauthor-nosuchuser' => 'Utilizador "$1" não existe.',
		'changeauthor-revview' => 'Revisão #$1 de $2',
		'changeauthor-nosuchtitle' => 'Não existe nenhum artigo chamado "$1".',
	),
);
