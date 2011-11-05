<?php
/**
 * Internationalisation file for WikimediaIncubator extension.
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author SPQRobin
 */
$messages['en'] = array(
	'wminc-infopage-enter' => 'go to the Main Page',
	'wminc-unknownlang' => '(unknown language with code "$1")',
	'wminc-logo-wikipedia' => 'Wikipedia-logo-v2-en.svg', # only translate if necessary
	'wminc-logo-wiktionary' => 'Wiktionary-logo-en.svg', # only translate if necessary
	'wminc-logo-wikibooks' => 'Wikibooks-logo-en-noslogan.svg', # only translate if necessary
	'wminc-logo-wikinews' => 'Wikinews-logo-en.png', # only translate if necessary
	'wminc-logo-wikiquote' => 'Wikiquote-logo-en.svg', # only translate if necessary
	'wminc-logo-wikisource' => 'Wikisource-newberg-de.png', # only translate if necessary
	'wminc-logo-wikiversity' => 'Wikiversity-logo-en.svg', # only translate if necessary
	'wminc-logo-meta-wiki' => 'Metawiki.svg', # only translate if necessary
	'wminc-logo-wikimedia-commons' => 'Commons-logo-en.svg', # only translate if necessary
	'wminc-logo-wikispecies' => 'WikiSpecies.svg', # only translate if necessary
	'wminc-logo-mediawiki' => 'MediaWiki.svg', # only translate if necessary
	'wminc-manual-url' => 'Help:Manual', # only translate if necessary
	'wminc-infopage-title' => '$1 $2', # only translate if necessary
	'wminc-infopage-welcome' => 'Welcome to the Wikimedia Incubator, a project of the Wikimedia Foundation ([[{{MediaWiki:Aboutpage}}|About]])',

	'wminc-infopage-missingwiki-text' => 'A $1 in this language does not yet exist.',
	'wminc-infopage-option-startwiki' => 'If you want to start this wiki,
you can [{{fullurl:{{FULLPAGENAME}}|action=edit}} create the page] and follow [[{{MediaWiki:Wminc-manual-url}}|our manual]].',
	'wminc-infopage-option-startsister' => 'If you want to start this wiki, you can go to <b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'You can search for [http://www.$1.org existing language editions of $1].',
	'wminc-infopage-option-sisterprojects-existing' => 'You can search for existing projects in this language:',
	'wminc-infopage-option-sisterprojects-other' => 'You can search for other projects in this language:',
	'wminc-infopage-option-multilingual' => 'You can go to a multilingual wiki:',
	'wminc-infopage-createmainpage' => 'Enter the word "Main Page" in this language:',
	'wminc-infopage-prefill' => '{{test wiki
| status = tocreate
| language = Language name in English
| meta = <!-- is there a request on Meta-Wiki? -->
}}', # do not translate
	'wminc-infopage-contribute' => 'If you know this language, you are encouraged to contribute!',

	'wminc-infopage-status-imported' => 'This Incubator wiki has been imported from $1 after the wiki was closed.',
	'wminc-infopage-status-closedsister' => 'This subdomain was closed. Go to <b>$2</b> to contribute to this wiki.',
	'wminc-infopage-status-created' => 'This project has been approved by the language committee and is now available at $1.',
	'wminc-infopage-status-beforeincubator' => 'This project was created before Wikimedia Incubator started and is available at $1.',
);

/** Message documentation (Message documentation)
 * @author SPQRobin
 */
$messages['qqq'] = array(
	'wminc-infopage-enter' => 'Text of a link to the Main Page of a test wiki at Incubator.',
	'wminc-infopage-title' => '{{optional}}
* $1 is the project, e.g. "Wikipedia" or "Wiktionary"
* $2 is the language name from CLDR, i.e. it takes the name in your language if available. Otherwise, it\'s in English.
Here you can change the title as it appears on e.g. http://incubator.wikimedia.org/wiki/Wn/en. You can change it to e.g. "$1 in $2".',
	'wminc-infopage-welcome' => 'Do not change <tt><nowiki>{{MediaWiki:Aboutpage}}</nowiki></tt>.',
	'wminc-infopage-missingwiki-text' => "'''$1''' is a project: Wikipedia/Wiktionary/...",
	'wminc-infopage-option-startsister' => '$2 is a link to either Wikisource or Wikiversity, and $1 is that project name.',
	'wminc-infopage-option-languages-existing' => "'''$1''' is the project name (Wikipedia, Wikinews, ...).",
	'wminc-infopage-option-sisterprojects-existing' => 'Followed by clickable logos of projects Wikipedia, Wiktionary, Wikibooks, ...',
	'wminc-infopage-option-sisterprojects-other' => 'Followed by clickable logos of projects Wikipedia, Wiktionary, Wikibooks, ...',
	'wminc-infopage-option-multilingual' => 'Followed by clickable logos of Meta, Commons, Wikispecies and MediaWiki.',
	'wminc-infopage-createmainpage' => 'Followed by an input box to enter the translation for "Main Page".',
	'wminc-infopage-status-imported' => "'''$1''' is a URL to the closed wiki.",
	'wminc-infopage-status-closedsister' => 'Used for closed Wikisources or Wikiversities. $2 is a link to either project.',
	'wminc-infopage-status-created' => "'''$1''' is a URL to the existing wiki.",
	'wminc-infopage-status-beforeincubator' => "'''$1''' is a URL to the existing wiki.",
);

/** Bavarian (Boarisch)
 * @author Mucalexx
 */
$messages['bar'] = array(
	'wminc-infopage-enter' => 'Gee zua da Hauptseiten',
	'wminc-unknownlang' => '(néd bekånnte Sprooch mid Code „$1“)',
	'wminc-infopage-welcome' => 'Servas im Wikimedia Incubator, am Prójekt voh da Wikimedia Foundation ([[{{MediaWiki:Aboutpage}}|Ywer]])',
	'wminc-infopage-missingwiki-text' => 'A $1 in derer Sprooch is nó néd vurhånden.',
	'wminc-infopage-option-startwiki' => 'Wånn du dés Wiki starten mecherdst,
kåst du [{{fullurl:{{FULLPAGENAME}}|action=edit}} dé Seiten erstön] und noch [[{{MediaWiki:Wminc-manual-url}}|unserner Åloattung]] vurgeh.',
	'wminc-infopage-option-languages-existing' => 'Du kåst auf [http://www.$1.org noch vurhånderne Sproochausgom voh $1] suachen.',
	'wminc-infopage-option-sisterprojects-existing' => 'Du kåst noch vurhånderne Prójektt in derer Sprooch suachen:',
	'wminc-infopage-option-sisterprojects-other' => 'Du kåst noch ånderne Prójektt in derer Sprooch suachen:',
	'wminc-infopage-option-multilingual' => 'Du kåst zuaram mersprooching Wiki geh:',
	'wminc-infopage-createmainpage' => 'Gibs Wort fyr „Hauptseiten“ in derer Sprooch eih:',
	'wminc-infopage-contribute' => 'Wånnst du dé Sprooch bherrschst, bist dert oiwei gern eihgloon, midzmochen!',
	'wminc-infopage-status-imported' => 'Dés Wiki vom Incubator is voh $1 importird worn, nochdéms gschlóssen worn is.',
	'wminc-infopage-status-created' => 'Dés Prójekt is vom Sproochkómmitee gnemigt worn und is iatz unter $1 vafiagbor.',
	'wminc-infopage-status-beforeincubator' => "Dés Prójekt is erstöd worn, bevurs 'n Wikimedia Incubator geem hod und is unter $1 vafiagbor.",
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 * @author Jim-by
 * @author Renessaince
 */
$messages['be-tarask'] = array(
	'wminc-infopage-enter' => 'перайсьці на Галоўную старонку',
	'wminc-unknownlang' => '(невядомая мова з кодам «$1»)',
	'wminc-infopage-welcome' => 'Вітаем у Інкубатары Вікімэдыя, праекце Фундацыі «Вікімэдыя» ([[{{MediaWiki:Aboutpage}}|Падрабязьней]])',
	'wminc-infopage-missingwiki-text' => '$1 на гэтай мове яшчэ не існуе.',
	'wminc-infopage-option-startwiki' => 'Калі Вы жадаеце распачаць гэтую вікі,
Вы можаце [{{fullurl:{{FULLPAGENAME}}|action=edit}} стварыць старонку] і выканаць [[{{MediaWiki:Wminc-manual-url}}|нашыя інструкцыі]].',
	'wminc-infopage-option-startsister' => 'Калі Вы хочаце пачаць гэтую вікі, перайдзіце на <b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'Вы можаце пашукаць [http://www.$1.org існуючыя моўныя варыянты $1].',
	'wminc-infopage-option-sisterprojects-existing' => 'Вы можаце пашукаць існуючыя праекты на гэтай мове:',
	'wminc-infopage-option-sisterprojects-other' => 'Вы можаце пашукаць іншыя праекты на гэтай мове:',
	'wminc-infopage-option-multilingual' => 'Вы можаце перайсьці ў шматмоўную вікі:',
	'wminc-infopage-createmainpage' => 'Увядзіце словы «Галоўная старонка» на гэтай мове:',
	'wminc-infopage-contribute' => 'Калі Вы ведаеце гэтую мову, Вы можаце рабіць унёсак!',
	'wminc-infopage-status-imported' => 'Гэтая вікі ў інкубатары была імпартаваная з $1 пасьля таго, як вікі была закрытая.',
	'wminc-infopage-status-closedsister' => 'Гэты паддамэн закрыты. Перайдзіце на <b>$2</b>, каб напісаць у гэтую вікі.',
	'wminc-infopage-status-created' => 'Гэты праект быў зацьверджаны моўным камітэтам, і цяпер ён даступны на $1.',
	'wminc-infopage-status-beforeincubator' => 'Гэты праект быў створаны перад пачаткам функцыянаваньня Інкубатара фундацыі «Вікімэдыя» і ён даступны на $1.',
);

/** Breton (Brezhoneg)
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'wminc-infopage-enter' => "mont d'ar Bajenn Degemer",
	'wminc-infopage-missingwiki-text' => "N'eus ket a $1 er yezh-mañ.",
	'wminc-infopage-option-multilingual' => "Gallout a rit mont d'ur wiki liesyezhek :",
	'wminc-infopage-createmainpage' => 'Merkit ar ger "Pajenn degemer" er yezh-mañ :',
);

/** German (Deutsch)
 * @author Kghbln
 * @author MF-Warburg
 * @author Polletfa
 */
$messages['de'] = array(
	'wminc-infopage-enter' => 'Geh zur Haupseite',
	'wminc-unknownlang' => '(unbekannte Sprache mit Code „$1“)',
	'wminc-infopage-welcome' => 'Willkommen beim Wikimedia Incubator, einem Projekt der Wikimedia Foundation ([[{{MediaWiki:Aboutpage}}|Über]])',
	'wminc-infopage-missingwiki-text' => 'Ein $1 in dieser Sprache ist noch nicht vorhanden.',
	'wminc-infopage-option-startwiki' => 'Sofern du dieses Wiki starten möchtest,
kannst du [{{fullurl:{{FULLPAGENAME}}|action=edit}} die Seite erstellen] und gemäß [[{{MediaWiki:Wminc-manual-url}}|unserer Anleitung]] vorgehen.',
	'wminc-infopage-option-startsister' => 'Sofern du dieses Wiki starten möchtest, geh zu <b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'Du kannst auf [http://www.$1.org nach vorhandenen Sprachausgaben von $1] suchen.',
	'wminc-infopage-option-sisterprojects-existing' => 'Du kannst nach vorhandenen Projekten in dieser Sprache suchen:',
	'wminc-infopage-option-sisterprojects-other' => 'Du kannst nach anderen Projekten in dieser Sprache suchen:',
	'wminc-infopage-option-multilingual' => 'Du kannst zu einem mehrsprachigen Wiki gehen:',
	'wminc-infopage-createmainpage' => 'Gib das Wort für „Hauptseite“ in dieser Sprache ein:',
	'wminc-infopage-contribute' => 'Sofern du diese Sprache beherrschst, bist du herzlich willkommen, mitzumachen!',
	'wminc-infopage-status-imported' => 'Dieses Wiki des Incubators wurde von $1 importiert, nachdem es geschlossen wurde.',
	'wminc-infopage-status-closedsister' => 'Diese Subdomain wurde geschlossen. Geh zu <b>$2</b>, um zu diesem Wiki beizutragen.',
	'wminc-infopage-status-created' => 'Dieses Projekt wurde vom Sprachkomitee genehmigt und ist nun unter $1 verfügbar..',
	'wminc-infopage-status-beforeincubator' => 'Dieses Projekt wurde erstellt, bevor es den Wikimedia Incubator gab und ist unter $1 verfügbar.',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Kghbln
 * @author Polletfa
 */
$messages['de-formal'] = array(
	'wminc-infopage-option-startwiki' => 'Sofern Sie dieses Wiki starten möchten,
können Sie [{{fullurl:{{FULLPAGENAME}}|action=edit}} die Seite erstellen] und gemäß [[{{MediaWiki:Wminc-manual-url}}|unserer Anleitung]] vorgehen.',
	'wminc-infopage-option-startsister' => 'Sofern Sie dieses Wiki starten möchten, gehen Sie zu <b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'Sie können auf [http://www.$1.org nach vorhandenen Sprachausgaben von $1] suchen.',
	'wminc-infopage-option-sisterprojects-existing' => 'Sie können nach vorhandenen Projekten in dieser Sprache suchen:',
	'wminc-infopage-option-sisterprojects-other' => 'Sie können nach anderen Projekten in dieser Sprache suchen:',
	'wminc-infopage-option-multilingual' => 'Sie können ein mehrsprachiges Wiki aufsuchen:',
	'wminc-infopage-createmainpage' => 'Geben Sie das Wort für „Hauptseite“ in dieser Sprache ein:',
	'wminc-infopage-contribute' => 'Wenn Sie diese Sprache beherrschen, sind Sie herzlich willkommen, mitzumachen!',
	'wminc-infopage-status-closedsister' => 'Diese Subdomain wurde geschlossen. Gehen Sie zu <b>$2</b>, um zu diesem Wiki beizutragen.',
);

/** Spanish (Español)
 * @author Diotime
 * @author Drini
 * @author Fitoschido
 */
$messages['es'] = array(
	'wminc-infopage-enter' => 'ir a la página principal',
	'wminc-unknownlang' => '(idioma desconocido con código «$1»)',
	'wminc-infopage-welcome' => 'Bienvenidos a la Incubadora de Wikimedia, un proyecto de la Fundación Wikimedia ([[{{MediaWiki:Aboutpage}}|Acerca de]])',
	'wminc-infopage-missingwiki-text' => 'Un $1 en este idioma todavía no existe.',
	'wminc-infopage-option-startwiki' => 'Si deseas comenzar este wiki,
puedes [{{fullurl:{{FULLPAGENAME}}|action=edit}} crear la página] y seguir [[{{MediaWiki:Wminc-manual-url}}|nuestro manual]].',
	'wminc-infopage-option-startsister' => 'Si deseas iniciar esta wiki, puedes ir a <b>[$2 $1].</b>',
	'wminc-infopage-option-languages-existing' => 'Puede buscar [http://www.$1.org ediciones existentes en el idioma $1 ].',
	'wminc-infopage-option-sisterprojects-existing' => 'Puedes buscar proyectos existentes en este idioma:',
	'wminc-infopage-option-sisterprojects-other' => 'Puedes buscar otros proyectos en este idioma:',
	'wminc-infopage-option-multilingual' => 'Puedes ir a un wiki multilingüe:',
	'wminc-infopage-createmainpage' => 'Introduce las palabras «Página principal» en este idioma:',
	'wminc-infopage-contribute' => '¡Si entiendes esta lengua, te animamos a contribuir!',
	'wminc-infopage-status-imported' => 'Este wiki de la Incubadora se importó desde $1 después de que el wiki fuera cerrado.',
	'wminc-infopage-status-closedsister' => 'Este subdominio se cerró. Ir a <b>$2</b> para contribuir a este wiki.',
	'wminc-infopage-status-created' => 'Este proyecto ha sido aprobado por el Comité de idiomas y ahora está disponible en $1.',
	'wminc-infopage-status-beforeincubator' => 'Este proyecto fue creado antes de que la Incubadora de Wikimedia incubadora comenzara y está disponible en $1.',
);

/** Persian (فارسی)
 * @author Mjbmr
 */
$messages['fa'] = array(
	'wminc-infopage-enter' => 'رفتن به صفحهٔ اصلی',
	'wminc-unknownlang' => '(کد زبان ناشناخته: «$1»)',
	'wminc-infopage-welcome' => 'به ویکی‌رشد، پروژه‌ای از بنیاد ویکی‌مدیا خوش‌آمدید ([[{{MediaWiki:Aboutpage}}|درباره]])',
	'wminc-infopage-missingwiki-text' => 'یک $1 از این زبان، هنوز وجود ندارد.',
	'wminc-infopage-option-startwiki' => 'اگر شما می‌خواهید این ویکی را شروع کنید،
شما می‌توانید [{{fullurl:{{FULLPAGENAME}}|action=edit}} صفحه را ایجاد کنید] و از [[{{MediaWiki:Wminc-manual-url}}|راهنمای ما]] پیروی کنید.',
	'wminc-infopage-option-languages-existing' => 'شما می‌توانید به دنبال [http://www.$1.org نسخه‌های زبان موجود از $1] بگردید.',
	'wminc-infopage-option-sisterprojects-existing' => 'شما می‌توانید به دنبال پروژه‌های موجود از این زبان بگردید:',
	'wminc-infopage-option-sisterprojects-other' => 'شما می‌توانید به دنبال پروژه‌های دیگر این زبان بگردید:',
	'wminc-infopage-option-multilingual' => 'شما می‌توانید به ویکی چند زبانه بروید:',
	'wminc-infopage-createmainpage' => 'کلمه «صفحهٔ اصلی» برای این زبان را وارد کنید:',
	'wminc-infopage-contribute' => 'اگر شما این زبان را می‌دانید، شما به مشارکت در آن تشویق شده‌اید!',
	'wminc-infopage-status-imported' => 'این ویکی در حال رشد پس از بسته شدن از نشانی $1 وارد شده است.',
	'wminc-infopage-status-created' => 'این پروژه توسط کمیته زبان تصویب شده است و در نشانی $1 در دسترس است.',
	'wminc-infopage-status-beforeincubator' => 'این پروژه قبل از شروع ویکی‌رشد، ایجاد شده است و در نشانی $1 در دسترس است.',
);

/** French (Français)
 * @author Hashar
 * @author Seb35
 */
$messages['fr'] = array(
	'wminc-infopage-enter' => 'aller à la page principale',
	'wminc-unknownlang' => '(langue inconnue avec le code « $1 »)',
	'wminc-infopage-welcome' => 'Bienvenue sur l’Incubateur Wikimedia, un projet de la Wikimedia Foundation ([[{{MediaWiki:Aboutpage}}|à propos]])',
	'wminc-infopage-missingwiki-text' => '$1 dans cette langue n’existe pas.',
	'wminc-infopage-option-startwiki' => 'Si vous voulez démarrer ce wiki, vous pouvez [{{fullurl:{{FULLPAGENAME}}|action=edit}} créer cette page] et suivre [[{{MediaWiki:Wminc-manual-url}}|notre manuel]].',
	'wminc-infopage-option-startsister' => 'Si vous voulez commencer ce wiki, vous pouvez vous rendre sur <b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'Vous pouvez chercher des [http://www.$1.org versions linguistiques existantes de $1].',
	'wminc-infopage-option-sisterprojects-existing' => 'Vous pouvez chercher des projets existants dans cette langue :',
	'wminc-infopage-option-sisterprojects-other' => 'Vous pouvez chercher d’autres projets dans cette langue :',
	'wminc-infopage-option-multilingual' => 'Vous pouvez aller vers un wiki multilingue :',
	'wminc-infopage-createmainpage' => 'Entrez le mot « Page principale » dans votre langue :',
	'wminc-infopage-contribute' => 'Si vous parlez cette langue, vous êtes invités à contribuer !',
	'wminc-infopage-status-imported' => 'Ce wiki Incubateur a été importé depuis $1 après que le wiki ait été fermé.',
	'wminc-infopage-status-closedsister' => 'Ce sous-domaine a été fermé. Veuillez vous rendre sur <b>$2</b> pour contribuer à ce wiki.',
	'wminc-infopage-status-created' => 'Ce projet a été approuvé par le comité linguistique et est maintenant disponible sur $1.',
	'wminc-infopage-status-beforeincubator' => 'Ce projet a été créé avant que l’Incubateur Wikimedia ait été lancé et est disponible sur $1.',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'wminc-infopage-enter' => 'alar a la pâge principâla',
	'wminc-unknownlang' => '(lengoua encognua avouéc lo code « $1 »)',
	'wminc-infopage-welcome' => 'Benvegnua sur la Covosa Wikimedia, un projèt de la Wikimedia Foundation ([[{{MediaWiki:Aboutpage}}|A propôs]])',
	'wminc-infopage-missingwiki-text' => '$1 dens cela lengoua ègziste pas.',
	'wminc-infopage-option-startwiki' => 'Se vos voléd emmodar cél vouiqui,
vos pouede [{{fullurl:{{FULLPAGENAME}}|action=edit}} fâre la pâge] et pués siuvre [[{{MediaWiki:Wminc-manual-url}}|noutron manuâl]].',
	'wminc-infopage-option-languages-existing' => 'Vos pouede chèrchiér des [http://www.$1.org vèrsions linguistiques ègzistentes de $1].',
	'wminc-infopage-option-sisterprojects-existing' => 'Vos pouede chèrchiér des projèts ègzistents dens cela lengoua :',
	'wminc-infopage-option-sisterprojects-other' => 'Vos pouede chèrchiér d’ôtros projèts dens cela lengoua :',
	'wminc-infopage-option-multilingual' => 'Vos pouede alar vers un vouiqui multilingo :',
	'wminc-infopage-createmainpage' => 'Buchiéd lo mot « Pâge principâla » dens voutra lengoua :',
	'wminc-infopage-status-imported' => 'Ceti vouiqui Covosa at étâ importâ dês $1 aprés que lo vouiqui èye étâ cllôs.',
	'wminc-infopage-status-created' => 'Ceti projèt at étâ aprovâ per lo comitât linguistico et est ora disponiblo dessus $1.',
	'wminc-infopage-status-beforeincubator' => 'Ceti projèt at étâ fêt aprés que la Covosa Wikimedia èye étâ lanciê et est disponiblo dessus $1.',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'wminc-infopage-enter' => 'ir á páxina principal',
	'wminc-unknownlang' => '(lingua descoñecida co código "$1")',
	'wminc-infopage-welcome' => 'Benvido á Incubadora da Wikimedia, un proxecto da Fundación Wikimedia ([[{{MediaWiki:Aboutpage}}|acerca de]])',
	'wminc-infopage-missingwiki-text' => 'Aínda non existe $1 nesta lingua.',
	'wminc-infopage-option-startwiki' => 'Se quere comezar este wiki,
pode [{{fullurl:{{FULLPAGENAME}}|action=edit}} crear esta páxina] e seguir [[{{MediaWiki:Wminc-manual-url}}|o noso manual]].',
	'wminc-infopage-option-startsister' => 'Se quere comezar este wiki, pode ir a <b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'Pode ollar [http://www.$1.org as linguas nas que hai $1].',
	'wminc-infopage-option-sisterprojects-existing' => 'Pode ollar os proxectos que hai nesta lingua:',
	'wminc-infopage-option-sisterprojects-other' => 'Pode ollar outros proxectos que hai nesta lingua:',
	'wminc-infopage-option-multilingual' => 'Pode ir a un wiki multilingüe:',
	'wminc-infopage-createmainpage' => 'Escriba as palabras "Páxina principal" nesta lingua:',
	'wminc-infopage-contribute' => 'Se coñece esta lingua, animámolo a contribuír!',
	'wminc-infopage-status-imported' => 'Este wiki da Incubadora foi importado desde $1 despois de que o wiki pechase.',
	'wminc-infopage-status-closedsister' => 'Este subdominio foi pechado. Vaia a <b>$2</b> para contribuír neste wiki.',
	'wminc-infopage-status-created' => 'Este proxecto foi aprobado polo comité de linguas e agora está dispoñible en $1.',
	'wminc-infopage-status-beforeincubator' => 'Este proxecto foi creado antes cá Incubadora da Wikimedia e está dispoñible en $1.',
);

/** Hebrew (עברית)
 * @author Amire80
 */
$messages['he'] = array(
	'wminc-infopage-enter' => 'אל הדף הראשי',
	'wminc-unknownlang' => '(שפה לא ידועה עם הקוד "$1")',
	'wminc-infopage-welcome' => 'ברוכים הבאים לאינקובטור של ויקימדיה, מיזם של קרן ויקימדיה ([[{{MediaWiki:Aboutpage}}|אודות]])',
	'wminc-infopage-missingwiki-text' => 'מיזם $1 בשפה הזאת טרם נוצר.',
	'wminc-infopage-option-startwiki' => 'אם אתם רוצים להתחיל את הוויקי הזה,
אתם יכולים [{{fullurl:{{FULLPAGENAME}}|action=edit}} ליצור דף] ולעקום אחר [[{{MediaWiki:Wminc-manual-url}}|ספר ההוראות שלנו]].',
	'wminc-infopage-option-startsister' => 'אם אתם רוצים להתחיל את הוויקי הזה, תוכלו ללכת ל־<b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'אפשר לחפש [http://www.$1.org מהדורות לשוניות קיימות של $1].',
	'wminc-infopage-option-sisterprojects-existing' => 'אפשר לחפש מיזמים קיימים בשפה הזאת:',
	'wminc-infopage-option-sisterprojects-other' => 'אפשר לחפש מיזמים אחרים בשפה הזאת:',
	'wminc-infopage-option-multilingual' => 'אפשר ללכת לוויקי רב־לשוני:',
	'wminc-infopage-createmainpage' => 'כתבו את המילה "דף ראשי" בשפתכם:',
	'wminc-infopage-contribute' => 'אם אתם יודעים את השפה הזאת, אנו מפצירים בכם לתרום למיזם!',
	'wminc-infopage-status-imported' => 'ויקי האינקובטור הזה יובא מ{{GRAMMAR:תחילית|$1}} אחרי שהוויקי ההוא נסגר.',
	'wminc-infopage-status-closedsister' => 'התת־מתחם הזה נסגר. לכו אל <b>$2</b> כדי לתרום לוויקי הזה.',
	'wminc-infopage-status-created' => 'הוועדה הלשונית אישרה את המיזם הזה ואפשר למצוא אותו ב{{GRAMMAR:תחילית|$1}}.',
	'wminc-infopage-status-beforeincubator' => 'המיזם הזה נוצר לפני שהוקם האינקובטור של ויקימדיה והוא זמין ב{{GRAMMAR:תחילית|$1}}.',
);

/** Hungarian (Magyar)
 * @author Xbspiro
 */
$messages['hu'] = array(
	'wminc-infopage-enter' => 'Tovább',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'wminc-infopage-enter' => 'vader al pagina principal',
	'wminc-unknownlang' => '(lingua incognite con codice "$1")',
	'wminc-infopage-welcome' => 'Benvenite a Wikimedia Incubator, un projecto del Fundation Wikimedia ([[{{MediaWiki:Aboutpage}}|a proposito]])',
	'wminc-infopage-missingwiki-text' => 'Un $1 in iste lingua non existe ancora.',
	'wminc-infopage-option-startwiki' => 'Si tu vole comenciar iste wiki,
tu pote [{{fullurl:{{FULLPAGENAME}}|action=edit}} crear le pagina] e sequer [[{{MediaWiki:Wminc-manual-url}}|nostre manual]].',
	'wminc-infopage-option-startsister' => 'Si tu vole comenciar iste wiki, tu pote vader a <b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'Tu pote cercar [http://www.$1.org existente editiones de lingua de $1].',
	'wminc-infopage-option-sisterprojects-existing' => 'Tu pote cercar projectos existente in iste lingua:',
	'wminc-infopage-option-sisterprojects-other' => 'Tu pote cercar altere projectos in iste lingua:',
	'wminc-infopage-option-multilingual' => 'Tu pote vader a un wiki multilingue:',
	'wminc-infopage-createmainpage' => 'Entra le parola(s) pro "pagina principal" in iste lingua:',
	'wminc-infopage-contribute' => 'Si tu cognosce iste lingua, tu es incoragiate a contribuer!',
	'wminc-infopage-status-imported' => 'Iste wiki incubator ha essite importate ex $1 post le clausura del wiki.',
	'wminc-infopage-status-closedsister' => 'Iste subdominio ha essite claudite. Vade a <b>$2</b> pro contribuer a iste wiki.',
	'wminc-infopage-status-created' => 'Iste projecto ha essite approbate per le comité linguistic e es ora disponibile a $1.',
	'wminc-infopage-status-beforeincubator' => 'Iste projecto ha essite create ante le comenciamento de Wikimedia Incubator e es disponibile a $1.',
);

/** Italian (Italiano)
 * @author Beta16
 */
$messages['it'] = array(
	'wminc-infopage-enter' => 'vai alla pagina principale',
);

/** Korean (한국어)
 * @author Albamhandae
 */
$messages['ko'] = array(
	'wminc-infopage-contribute' => '이 시험판에 쓰여진 언어를 아신다면, 기여를 부탁드립니다!',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'wminc-infopage-contribute' => 'Wann De di Shprooch kanns, dann bes De opjeroofe, beizedraare!',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'wminc-infopage-enter' => "Gitt op d'Haaptsäit",
	'wminc-unknownlang' => '(onbekannte Sprooch mam Code "$1")',
	'wminc-infopage-missingwiki-text' => '$1 gëtt et an dëser Sprooch nach net',
	'wminc-infopage-option-startsister' => 'Wann Dir dës Wiki ufänke wëllt, da gitt w.e.g. op <b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'Dir kënnt no [http://www.$1.org Sproochversiounen, déi et vun $1 gëtt, sichen].',
	'wminc-infopage-option-sisterprojects-existing' => 'Dir kënnt no Projeten an dëser Sprooch sichen (déi et scho gëtt):',
	'wminc-infopage-option-sisterprojects-other' => 'Dir kënnt no anere Projeten an dëser Sprooch sichen:',
	'wminc-infopage-option-multilingual' => 'Dir kënnt op eng méisproocheg Wiki goen:',
	'wminc-infopage-createmainpage' => 'Gitt d\'Wuert "Haaptsäit" fir dës Sprooch an:',
	'wminc-infopage-contribute' => 'Wann Dir dës Sprooch beherrscht, sidd Dir häerzlech wëllkomm fir matzemaachen!',
	'wminc-infopage-status-created' => 'Dëse Projet gouf vum Sproochecomité akzeptéiert an ass elo op $1 disponibel.',
	'wminc-infopage-status-beforeincubator' => 'Dëse Projet gouf ugeluecht ier et Wikimedia Incubator gouf an ass op $1 disponibel.',
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 */
$messages['li'] = array(
	'wminc-infopage-enter' => "gank achter g'm veurblaaje",
	'wminc-unknownlang' => '(ónbekèndj spraok mid g\'r koeaj "$1")',
	'wminc-infopage-welcome' => "Wèlkóm bie g'm Wikimedia Incubator, e perjèk dèr Wikimedia Foundation ([[{{MediaWiki:Aboutpage}}|mieër info]])",
);

/** Lithuanian (Lietuvių)
 * @author Matasg
 */
$messages['lt'] = array(
	'wminc-infopage-contribute' => 'Jei suprantate, ar kalbate šią kalba, esate kviečiama(s) prisidėti!',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'wminc-infopage-enter' => 'оди на Главна страница',
	'wminc-unknownlang' => '(непознат јазик со код „$1“)',
	'wminc-infopage-welcome' => 'Добредојдовте на Инкубаторот на Викимедија - проект на Фондацијата Викимедија ([[{{MediaWiki:Aboutpage}}|За проектот]])',
	'wminc-infopage-missingwiki-text' => 'На овој јазик сè уште не постои $1.',
	'wminc-infopage-option-startwiki' => 'Ако сакате да го започнете ова вики,
тогаш можете да ја [{{fullurl:{{FULLPAGENAME}}|action=edit}} создадете страницата] и да го проследите [[{{MediaWiki:Wminc-manual-url}}|нашиот прирачник]].',
	'wminc-infopage-option-startsister' => 'Ако сакате да го започнете ова вики, појдете на <b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'Можете да ги пребарате [http://www.$1.org постоечките јазични изданија на $1].',
	'wminc-infopage-option-sisterprojects-existing' => 'Можете да ги пребарате постоечките проекти на овој јазик:',
	'wminc-infopage-option-sisterprojects-other' => 'Можете да пребарате други проекти на овој јазик:',
	'wminc-infopage-option-multilingual' => 'Можете да појдете на повеќејазично вики:',
	'wminc-infopage-createmainpage' => 'Внесете го зборот „Главна страница“ на овој јазик:',
	'wminc-infopage-contribute' => 'Ако имате познавања од овој јазик, ви препорачуваме да учествувате!',
	'wminc-infopage-status-imported' => 'Ова вики на Инкубаторот е увезено од $1, по затворањето на викито.',
	'wminc-infopage-status-closedsister' => 'Овој поддомен е затворен. Појдете на <b>$2</b> за да учествувате на ова вики.',
	'wminc-infopage-status-created' => 'Овој проект е одобрен од јазичната комисија и сега е достапен на $1.',
	'wminc-infopage-status-beforeincubator' => 'Овој проект е создаден пред започнувањето на Инкубаторот на Викимедија и е достапен на $1.',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'wminc-infopage-enter' => 'പ്രധാന താളിലേയ്ക്ക് പോവുക',
	'wminc-unknownlang' => '("$1" എന്ന കോഡോടു കൂടിയ അപരിചിതമായ ഭാഷ)',
	'wminc-infopage-welcome' => 'വിക്കിമീഡിയ ഫൗണ്ടേഷൻ സംരംഭമായ വിക്കിമീഡിയ ഇൻകുബേറ്ററിലേയ്ക്ക് സ്വാഗതം ([[{{MediaWiki:Aboutpage}}|വിവരണം]])',
	'wminc-infopage-missingwiki-text' => 'ഈ ഭാഷയിൽ $1 നിലവിലില്ല.',
	'wminc-infopage-option-startwiki' => 'താങ്കൾക്ക് ഈ വിക്കി തുടങ്ങണമെന്നുണ്ടെങ്കിൽ [{{fullurl:{{FULLPAGENAME}}|action=edit}} താൾ സൃഷ്ടിച്ച ശേഷം] [[{{MediaWiki:Wminc-manual-url}}|ഞങ്ങളുടെ വഴികാട്ടി]] പിന്തുടരുക.',
	'wminc-infopage-option-startsister' => 'താങ്കൾക്ക് ഈ വിക്കി തുടങ്ങണമെന്നുണ്ടെങ്കിൽ, <b>[$2 $1]</b> എന്ന താളിൽ ചെല്ലുക.',
	'wminc-infopage-option-languages-existing' => '[http://www.$1.org $1 പദ്ധതിയുടെ നിലവിലുള്ള ഭാഷാപതിപ്പുകൾ] താങ്കൾക്ക് തിരയാവുന്നതാണ്.',
	'wminc-infopage-option-sisterprojects-existing' => 'ഈ ഭാഷയിൽ നിലവിലുള്ള സംരംഭങ്ങൾ താങ്കൾക്ക് തിരയാവുന്നതാണ്:',
	'wminc-infopage-option-sisterprojects-other' => 'ഈ ഭാഷയിൽ നിലവിലുള്ള ഇതര സംരംഭങ്ങൾ താങ്കൾക്ക് തിരയാവുന്നതാണ്:',
	'wminc-infopage-option-multilingual' => 'താങ്കൾക്ക് ബഹുഭാഷാവിക്കിയിലേയ്ക്ക് പോകാവുന്നതാണ്:',
	'wminc-infopage-createmainpage' => 'ഈ ഭാഷയിൽ "പ്രധാന താൾ" എന്നതിനു സമാനമായ പദം നൽകുക:',
	'wminc-infopage-contribute' => 'താങ്കൾക്ക് ഈ ഭാഷ അറിയാമെങ്കിൽ, അതിൽ സംഭാവന ചെയ്യാൻ താത്പര്യപ്പെടുന്നു!',
	'wminc-infopage-status-imported' => 'ഈ ഇൻകുബേറ്റർ വിക്കി $1 എന്നതിൽ നിന്നും വിക്കി അടച്ചശേഷം ഇറക്കുമതി ചെയ്തതാണ്.',
	'wminc-infopage-status-closedsister' => 'ഈ ഉപഡൊമൈൻ അടച്ചിരിക്കുന്നു. ഈ വിക്കിയിൽ സംഭാവന ചെയ്യാൻ <b>$2</b> എന്നതിലേയ്ക്ക് പോവുക.',
	'wminc-infopage-status-created' => 'ഈ സംരംഭം ഭാഷാ കമ്മിറ്റി അംഗീകരിച്ചിരിക്കുന്നു, അതിപ്പോൾ $1 എന്നു ലഭ്യമാണ്.',
	'wminc-infopage-status-beforeincubator' => 'ഈ പദ്ധതി, വിക്കിമീഡിയ ഇൻകുബേറ്റർ തുടങ്ങുന്നതിനു മുമ്പേയുള്ളതാണ്, അത് $1-ൽ ലഭ്യമാണ്.',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'wminc-infopage-enter' => 'pergi ke Laman Utama',
	'wminc-unknownlang' => '(bahasa yang tidak diketahui dengan kod "$1")',
	'wminc-infopage-title' => '$1 $2',
	'wminc-infopage-welcome' => 'Selamat datang ke Wikimedia Incubator, satu projek Yayasan Wikimedia ([[{{MediaWiki:Aboutpage}}|Perihal]])',
	'wminc-infopage-missingwiki-text' => '$1 dalam bahasa ini belum wujud.',
	'wminc-infopage-option-startwiki' => 'Jika anda mahu memulakan wiki ini,
anda boleh [{{fullurl:{{FULLPAGENAME}}|action=edit}} mencipta lamannya] dan mengikuti [[{{MediaWiki:Wminc-manual-url}}|panduan kami]].',
	'wminc-infopage-option-startsister' => 'Jika anda ingin membuka wiki ini, anda boleh pergi ke <b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'Anda boleh mencari [http://www.$1.org edisi-edisi bahasa sedia ada bagi $1].',
	'wminc-infopage-option-sisterprojects-existing' => 'Anda boleh mencari projek-projek yang sedia ada dalam bahasa ini:',
	'wminc-infopage-option-sisterprojects-other' => 'Anda boleh mencari projek-projek lain dalam bahasa ini:',
	'wminc-infopage-option-multilingual' => 'Anda boleh pergi ke wiki berbilang bahasa:',
	'wminc-infopage-createmainpage' => 'Isikan perkataan "Laman Utama" dalam bahasa ini:',
	'wminc-infopage-contribute' => 'Jika anda fasih dalam bahasa ini, anda dialu-alukan untuk menyumbang!',
	'wminc-infopage-status-imported' => 'Wiki Incubator ini telah diimport dari $1 setelah wiki itu ditutup.',
	'wminc-infopage-status-closedsister' => 'Subdomain ini ditutup. Pergi ke <b>$2</b> untuk menyumbang kepada wiki ini.',
	'wminc-infopage-status-created' => 'Projek ini telah diluluskan oleh jawatankuasa bahasa dan kini boleh didapati di $1.',
	'wminc-infopage-status-beforeincubator' => 'Projek ini dibuka sebelum Wikimedia Incubator dimulakan, dan boleh didapati di $1.',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'wminc-infopage-enter' => 'ga naar de Hoofdpagina',
	'wminc-unknownlang' => '(onbekende taal met code "$1")',
	'wminc-infopage-welcome' => 'Welkom bij de Wikimedia Incubator, een project van de Wikimedia Foundation ([[{{MediaWiki:Aboutpage}}|Meer info]])',
	'wminc-infopage-missingwiki-text' => 'Een $1 in deze taal bestaat nog niet.',
	'wminc-infopage-option-startwiki' => 'Als u deze wiki wilt starten, kunt u [{{fullurl:{{FULLPAGENAME}}|action=edit}} de pagina aanmaken] en [[{{MediaWiki:Wminc-manual-url}}|onze handleiding]] volgen.',
	'wminc-infopage-option-startsister' => 'Als u deze wiki wilt starten, kunt u naar <b>[$2 $1]</b> gaan.',
	'wminc-infopage-option-languages-existing' => 'U kunt naar [http://www.$1.org bestaande taalversies van $1] zoeken.',
	'wminc-infopage-option-sisterprojects-existing' => 'U kunt naar bestaande projecten in deze taal zoeken:',
	'wminc-infopage-option-sisterprojects-other' => 'U kunt naar andere projecten in deze taal zoeken:',
	'wminc-infopage-option-multilingual' => 'U kunt naar een meertalige wiki gaan:',
	'wminc-infopage-createmainpage' => 'Geef het woord "Hoofdpagina" op in deze taal:',
	'wminc-infopage-contribute' => 'Als u deze taal kent, wordt u aangemoedigd om bij te dragen!',
	'wminc-infopage-status-imported' => 'Deze Incubator-wiki werd geïmporteerd van $1 nadat die wiki is gesloten.',
	'wminc-infopage-status-closedsister' => 'Dit subdomein is gesloten. Ga naar <b>$2</b> om bij te dragen aan deze wiki.',
	'wminc-infopage-status-created' => 'Dit project werd goedgekeurd door het taalcomité en is nu beschikbaar op $1.',
	'wminc-infopage-status-beforeincubator' => 'Dit project is gemaakt voordat Wikimedia Incubator begon en is beschikbaar op $1.',
);

/** Polish (Polski)
 * @author Sp5uhe
 * @author Woytecr
 */
$messages['pl'] = array(
	'wminc-infopage-enter' => 'przejdź do strony głównej',
	'wminc-unknownlang' => '(nieznany język o kodzie „$1“)',
	'wminc-infopage-createmainpage' => 'Wpisz „Strona główna“ w tym języku',
	'wminc-infopage-contribute' => 'Jeśli znasz ten język zachęcamy Cię do wzięcia udziału w tworzeniu tej wiki!',
	'wminc-infopage-status-imported' => 'Do inkubatora wiki zaimportowano treść z $1 po tym jak wiki została zamknięta.',
	'wminc-infopage-status-closedsister' => 'Ta domena podrzędna została zamknięta. Przejdź pod adres <b>$2</b> jeśli chcesz współtworzyć tę wiki.',
	'wminc-infopage-status-created' => 'Projekt został zatwierdzony przez komisję językową i jest już dostępny pod adresem $1.',
	'wminc-infopage-status-beforeincubator' => 'Ten projekt został utworzony zanim został uruchomiony Inkubator Wikimedia i jest dostępny pod adresem $1.',
);

/** Portuguese (Português)
 * @author Carla404
 * @author Hamilton Abreu
 * @author SandroHc
 */
$messages['pt'] = array(
	'wminc-infopage-enter' => 'ir para a Página principal',
	'wminc-unknownlang' => '(língua desconhecida, com o código "$1")',
	'wminc-infopage-welcome' => 'Bem-vindo(a) Incubadora Wikimedia, um projecto da Wikimedia Foundation ([[{{MediaWiki:Aboutpage}}|Sobre]])',
	'wminc-infopage-missingwiki-text' => 'Ainda não existe um projecto $1 nesta língua.',
	'wminc-infopage-option-startwiki' => 'Se pretende iniciar esta wiki,
pode [{{fullurl:{{FULLPAGENAME}}|action=edit}} criar a página] e seguir o [[{{MediaWiki:Wminc-manual-url}}|manual]].',
	'wminc-infopage-option-startsister' => 'Se queres começar esta wiki, podes ir a <b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'Pode pesquisar as [http://www.$1.org edições de $1 nas línguas existentes].',
	'wminc-infopage-option-sisterprojects-existing' => 'Pode pesquisar os projectos existentes nesta língua:',
	'wminc-infopage-option-sisterprojects-other' => 'Pode pesquisar outros projectos nesta língua:',
	'wminc-infopage-option-multilingual' => 'Pode visitar uma wiki multilingue:',
	'wminc-infopage-createmainpage' => 'Introduza o termo "Página principal" nesta língua:',
	'wminc-infopage-contribute' => 'Se conhece esta língua, está convidado a colaborar!',
	'wminc-infopage-status-imported' => 'Esta wiki da Incubadora foi importada de $1 após a wiki ter sido fechada.',
	'wminc-infopage-status-closedsister' => 'Este subdomínio foi fechado. Vá a <b>$2</b> para contribuír nesta wiki.',
	'wminc-infopage-status-created' => 'Este projecto foi aprovado pelo comité linguístico e está agora disponível em $1.',
	'wminc-infopage-status-beforeincubator' => 'Este projecto foi criado antes do início da Incubadora Wikimedia e está disponível em $1.',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author MetalBrasil
 */
$messages['pt-br'] = array(
	'wminc-infopage-enter' => 'Vá para a página principal',
	'wminc-unknownlang' => '(língua desconhecida com código "$1")',
	'wminc-infopage-welcome' => 'Bem vindo à Wikimedia Incubator, um projeto da Wikimedia Fundation ([[{{MediaWiki:Aboutpage}}|About]])',
	'wminc-infopage-missingwiki-text' => 'Ainda não existe um projeto $1 nesta língua.',
	'wminc-infopage-option-startwiki' => 'Se você quiser começar esta wiki, você pode [{{fullurl:{{FULLPAGENAME}}|action=edit}} criar a página] e seguir [[{{MediaWiki:Wminc-manual-url}}|nosso manual]].',
	'wminc-infopage-option-languages-existing' => 'Você pode pesquisar por [http://www.$1.org edições de $1 línguas existentes].',
	'wminc-infopage-option-sisterprojects-existing' => 'Você pode pesquisar por projetos existentes nesta língua.',
	'wminc-infopage-option-sisterprojects-other' => 'Você pode pesquisar por outros projetos nessa língua.',
	'wminc-infopage-option-multilingual' => 'Você pode ir a uma wiki multilíngue.',
	'wminc-infopage-createmainpage' => 'Digite a palavra "Página principal" nesta língua.',
	'wminc-infopage-contribute' => 'Se você conhece esta língua, você é convidado a contribuir!',
	'wminc-infopage-status-imported' => 'Essa Incubator wiki foi importada de $1 depois que a wiki foi fechada.',
	'wminc-infopage-status-created' => 'Esse projeto foi aprovado pela comitê linguístico e agora é avaliável em $1.',
	'wminc-infopage-status-beforeincubator' => 'Esse projeto foi criado antes do inicio da Wikimedia Incubator e está avaliável em $1.',
);

/** Russian (Русский)
 * @author Amdf
 * @author Kaganer
 */
$messages['ru'] = array(
	'wminc-infopage-enter' => 'перейти на заглавную страницу',
	'wminc-unknownlang' => '(неизвестный язык с кодом «$1»)',
	'wminc-infopage-welcome' => 'Добро пожаловать в Инкубатор Викимедиа, проект Фонда Викимедиа ([[{{MediaWiki:Aboutpage}}|о проекте]])',
	'wminc-infopage-missingwiki-text' => 'У $1 еще ​​нет раздела на этом языке.',
	'wminc-infopage-option-startwiki' => 'Если вы хотите начать этот вики-проект,
вы можете [{{fullurl:{{FULLPAGENAME}}|action=edit}} создать страницу] и следовать [[{{MediaWiki:Wminc-manual-url}}|нашему руководству]].',
	'wminc-infopage-option-startsister' => 'Если вы хотите начать этот вики-проект, вы можете перейти к <b>[ $2  $1 ] </b>.',
	'wminc-infopage-option-languages-existing' => 'Вы можете поискать [http://www.$1.org существующие языковые разделы для $1].',
	'wminc-infopage-option-sisterprojects-existing' => 'Вы можете поискать существующие проекты на этом языке:',
	'wminc-infopage-option-sisterprojects-other' => 'Вы можете поискать другие проекты на этом языке:',
	'wminc-infopage-option-multilingual' => 'Вы можете перейти к многоязычным вики-проектам:',
	'wminc-infopage-createmainpage' => 'Введите на этом языке выражение, означающее «Заглавная страница»:',
	'wminc-infopage-contribute' => 'Если вы понимаете этот язык, вы можете внести свой вклад!',
	'wminc-infopage-status-imported' => 'Эта вики была импортирована в Инкубатор из $1 после того, как была закрыта.',
	'wminc-infopage-status-closedsister' => 'Этот поддомен был закрыт. Перейти к <b>$2</b>, чтобы сделать свой вклад в эту вики.',
	'wminc-infopage-status-created' => 'Этот проект был одобрен языковым комитетом и теперь доступен по адресу $1 .',
	'wminc-infopage-status-beforeincubator' => 'Этот проект, созданный до запуска Инкубатора Викимедиа, доступен по адресу $1 .',
);

/** Rusyn (Русиньскый)
 * @author Gazeb
 */
$messages['rue'] = array(
	'wminc-infopage-contribute' => 'Кідь розумієте тот язык, рекомендуєме, жебы сьте приспівали!',
);

/** Slovenian (Slovenščina)
 * @author Dbc334
 */
$messages['sl'] = array(
	'wminc-infopage-enter' => 'pojdi na glavno stran',
	'wminc-unknownlang' => '(neznan jezik s kodo »$1«)',
	'wminc-infopage-welcome' => 'Dobrodošli na Wikimediinem Inkubatorju, projektu Fundacije Wikimedia ([[{{MediaWiki:Aboutpage}}|O projektu]])',
	'wminc-infopage-missingwiki-text' => '$1 v tem jeziku še ne obstaja.',
	'wminc-infopage-option-startwiki' => 'Če želite zagnati ta wiki,
lahko [{{fullurl:{{FULLPAGENAME}}|action=edit}} ustvarite stran] in sledite [[{{MediaWiki:Wminc-manual-url}}|našemu priročniku]].',
	'wminc-infopage-option-startsister' => 'Če želite zagnati ta wiki, pojdite na <b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'Iščete lahko [http://www.$1.org obstoječe jezikovne izdaje $1].',
	'wminc-infopage-option-sisterprojects-existing' => 'Iščete lahko obstoječe projekte v tem jeziku:',
	'wminc-infopage-option-sisterprojects-other' => 'Iščete lahko druge projekte v tem jeziku:',
	'wminc-infopage-option-multilingual' => 'Greste lahko na večjezikovni wiki:',
	'wminc-infopage-createmainpage' => 'Vnesite besedi »Glavna stran« v tem jeziku:',
	'wminc-infopage-contribute' => 'Če znate ta jezik, ste vabljeni k prispevanju!',
	'wminc-infopage-status-imported' => 'Ta wiki Inkubatorja je bil uvožen iz $1 po zaprtju wikija.',
	'wminc-infopage-status-closedsister' => 'Poddomena je zaprta. Pojdite na <b>$2</b>, da prispevate k temu wikiju.',
	'wminc-infopage-status-created' => 'Projekt je odobril  jezikovni odbor in je sedaj na voljo na $1.',
	'wminc-infopage-status-beforeincubator' => 'Projekt je nastal pred zagonom Wikimediinega Inkubatorja in je na voljo na $1.',
);

/** Albanian (Shqip)
 * @author Olsi
 */
$messages['sq'] = array(
	'wminc-infopage-contribute' => 'Nëse e dini këtë gjuhë, jeni të inkurajuar të kontribuoni!',
);

/** Serbian (Cyrillic script) (‪Српски (ћирилица)‬)
 * @author Rancher
 */
$messages['sr-ec'] = array(
	'wminc-infopage-title' => '$1 $2',
);

/** Swedish (Svenska)
 * @author Lokal Profil
 */
$messages['sv'] = array(
	'wminc-infopage-enter' => 'gå till huvudsidan',
	'wminc-unknownlang' => '(okänt språk med koden "$1")',
	'wminc-infopage-welcome' => 'Välkommen till Wikimedia Incubator, ett projekt av Wikimedia Foundation ([[{{MediaWiki:Aboutpage}}|Om]])',
	'wminc-infopage-option-languages-existing' => 'Du kan söka efter [http://www.$1.org befintliga språkversioner av $1].',
	'wminc-infopage-option-sisterprojects-existing' => 'Du kan söka efter befintliga projekt på detta språk:',
	'wminc-infopage-option-sisterprojects-other' => 'Du kan söka efter andra projekt på detta språk:',
	'wminc-infopage-option-multilingual' => 'Du kan gå till en flerspråkig wiki:',
	'wminc-infopage-contribute' => 'Om du kan detta språk, uppmuntras du att bidra!',
	'wminc-infopage-status-imported' => 'Denna Incubator-wiki har importerats från $1 efter det att wikin stängdes.',
	'wminc-infopage-status-closedsister' => 'Denna underdomän har stängts. Gå till <b>$2</b> för att bidra till denna wiki.',
	'wminc-infopage-status-created' => 'Detta projekt har godkänts av språkkommittén och finns nu på $1.',
	'wminc-infopage-status-beforeincubator' => 'Detta projekt skapades före Wikimedia Incubator startade och finns på $1.',
);

/** Turkish (Türkçe)
 * @author Emperyan
 */
$messages['tr'] = array(
	'wminc-infopage-enter' => 'Ana sayfaya git',
);

/** Ukrainian (Українська)
 * @author Andrijko Z.
 * @author Dim Grits
 */
$messages['uk'] = array(
	'wminc-infopage-enter' => 'до Головної сторінки',
	'wminc-unknownlang' => '(Невідома мова з кодом "$1")',
	'wminc-infopage-welcome' => 'Ласкаво просимо до Інкубатора Вікімедіа. [[{{MediaWiki:Aboutpage}}|Інформація]] про цей проект Фонду Вікімедіа',
	'wminc-infopage-missingwiki-text' => '$1 ще не має розділу даною мовою.',
	'wminc-infopage-option-startwiki' => 'Якщо ви бажаєте започаткувати цей вікіпроект,
можете [{{fullurl:{{FULLPAGENAME}}|action=edit}} створити сторінку] та дотримуватись порад [[{{MediaWiki:Wminc-manual-url}}|нашої інструкції]].',
	'wminc-infopage-option-startsister' => 'Якщо ви хочете започаткувати цей вікіпроект, ви можете звернутися до <b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'Ви можете пошукати серед [http://www.$1.org існуючих мовних розділів $1].',
	'wminc-infopage-option-sisterprojects-existing' => 'Ви можете пошукати існуючі проекти цією мовою:',
	'wminc-infopage-option-sisterprojects-other' => 'Ви можете пошукати інші проекти цією мовою:',
	'wminc-infopage-option-multilingual' => 'Ви можете перейти до багатомовних вікіпроектів:',
	'wminc-infopage-createmainpage' => 'Введіть фразу «Головна сторінка» на цій мові:',
	'wminc-infopage-contribute' => 'Якщо ви розумієте цю мову, ви можете внести свій вклад!',
	'wminc-infopage-status-imported' => 'Ця вікі була перенесена до Інкубатору з $1 після її закриття.',
	'wminc-infopage-status-closedsister' => 'Цей піддомен було закрито. Перейти до <b>$2</b>, щоб зробити внесок до цієї вікі.',
	'wminc-infopage-status-created' => 'Цей проект було схвалено мовним комітетом і тепер він доступний на $1.',
	'wminc-infopage-status-beforeincubator' => 'Цей проект було створено до існування Інкубатора Вікімедіа, доступний $1.',
);

/** Vietnamese (Tiếng Việt)
 * @author Kimkha
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'wminc-infopage-enter' => 'đi đến Trang Chính',
	'wminc-unknownlang' => '(ngôn ngữ không rõ với mã “$1”)',
	'wminc-infopage-welcome' => 'Hoan nghênh bạn đến với Wikimedia Incubator, một dự án của Quỹ Wikimedia ([[{{MediaWiki:Aboutpage}}|Giới thiệu]])',
	'wminc-infopage-missingwiki-text' => '$1 chưa có sẵn trong ngôn ngữ này.',
	'wminc-infopage-option-startwiki' => 'Nếu bạn muốn bắt đầu xây dựng wiki này, [{{fullurl:{{FULLPAGENAME}}|action=edit}} tạo ra trang này] và thực hiện theo [[{{MediaWiki:Wminc-manual-url}}|sách hướng dẫn của chúng ta]].',
	'wminc-infopage-option-startsister' => 'Để bắt đầu wiki này, hãy ghé vào <b>[$2 $1]</b>.',
	'wminc-infopage-option-languages-existing' => 'Bạn có thể tìm kiếm [http://www.$1.org phiên bản ngôn ngữ hiện có của $1].',
	'wminc-infopage-option-sisterprojects-existing' => 'Bạn có thể tìm kiếm các dự án hiện có trong ngôn ngữ này:',
	'wminc-infopage-option-sisterprojects-other' => 'Bạn có thể tìm kiếm các dự án khác dùng ngôn ngữ này:',
	'wminc-infopage-option-multilingual' => 'Bạn có thể ghé vào một wiki đa ngôn ngữ:',
	'wminc-infopage-createmainpage' => 'Nhập từ “Trang Chính” trong ngôn ngữ này:',
	'wminc-infopage-contribute' => 'Nếu bạn biết ngôn ngữ này, rất hoan nghênh bạn đóng góp cho nó!',
	'wminc-infopage-status-imported' => 'Wiki Incubator này đã được nhập từ $1 sau khi wiki đó bị đóng cửa.',
	'wminc-infopage-status-closedsister' => 'Tên miền phụ này đã bị đóng cửa. Hãy ghé vào <b>$2</b> để đóng góp vào wiki này.',
	'wminc-infopage-status-created' => 'Dự án đã được ủy ban ngôn ngữ chấp thuận và hiện có sẵn tại $1.',
	'wminc-infopage-status-beforeincubator' => 'Dự án này được tạo trước khi Wikimedia Incubator mở cửa và hiện có sẵn tại $1.',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Dalt
 */
$messages['zh-hans'] = array(
	'wminc-infopage-contribute' => '如果您会这门语言，欢迎您做出贡献！',
);

