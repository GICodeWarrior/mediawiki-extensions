<?php
/**
 * Internationalisation file for extension SpamDiffTool.
 *
 * @addtogroup Extensions
*/

$messages = array();

$messages['en'] = array(
	'spamdifftool' => 'Manage spam blacklist',
	'spamdifftool-desc' => 'Provides a basic way of adding new entries to the spam blacklist from diff pages',
	'spamdifftool_cantedit' => 'Sorry - you don’t have permission to edit the spam blacklist.',
	'spamdifftool_notext' => 'There is no text to add to the spam blacklist. Click <a href=\'$1\'>here</a> to continue.',
	'spamdifftool_confirm' => 'Confirm that you want to add these entries to the spam blacklist. (Click <a href=\'$1\' target=\'new\'>here</a> to report a problem.)',
	'spamdifftool_summary' => 'Adding to spam blacklist',
	'spamdifftool_urls_detected' => 'The following URLs were detected in the edit(s), which ones would you like to add to the spam blacklist? These options order from more restrictive to less restrictive, blocking the entire domain will block all links to anything coming from that domain. <br /><br />Be sure not to block entire domains that host user accounts, like blogpost.com, geocities.com, etc.',
	'spamdifftool_no_urls_detected' => 'No urls were detected. Click <a href=\'$1\'>here</a> to return.',
	'spamdifftool_spam_link_text' => 'add to spam',
	'spamdifftool_option_domain' => 'all from this domain',
	'spamdifftool_option_subdomain' => 'all from this subdomain',
	'spamdifftool_option_directory' => 'this subdomain and directory',
	'spamdifftool_option_none' => 'nothing',
	'spamdifftool_block' => 'Block:',
	'spamdifftool_submit_buttom' => 'Submit',
	);

$messages['ar'] = array(
	'spamdifftool' => 'التحكم في قائمة السبام السوداء',
	'spamdifftool_cantedit' => 'عذرا - أنت لا تمتلك الصلاحية لتعديل قائمة السبام السوداء.',
	'spamdifftool_notext' => 'لا يوجد نص لإضافته إلى قائمة السبام السوداء. اضغط <a href=\'$1\'>هنا</a> للمتابعة.',
	'spamdifftool_confirm' => 'أكد أنك تريد إضافة هذه المدخلات إلى قائمة السبام السوداء. (اضغط <a href=\'$1\' target=\'new\'>هنا</a> للإبلاغ عن مشكلة.)',
	'spamdifftool_summary' => 'جاري الإضافة إلى قائمة السبام السوداء',
	'spamdifftool_urls_detected' => 'المسارات التالية تم التعرف عليها في التعديل(ات)، أيها تود إضافتها إلى قائمة السبام السوداء؟ هذه الخيارات مرتبة من الأكثر منعا إلى الأقل منعا، منع النطاق بأكمله سيمنع كل الوصلات لأي شيء من هذا النطاق. <br /><br />تأكد من عدم منع كل النطاقات التي تستضيف حسابات مستخدمين، مثل blogpost.com، geocities.com، إلى آخره.',
	'spamdifftool_no_urls_detected' => 'لم يتم التعرف على أية مسارات. اضغط <a href=\'$1\'>هنا</a> للعودة.',
	'spamdifftool_spam_link_text' => 'الكل إلى السبام',
	'spamdifftool_option_domain' => 'الكل من هذا النطاق',
	'spamdifftool_option_subdomain' => 'الكل من هذا النطاق الفرعي',
	'spamdifftool_option_directory' => 'هذا النطاق الفرعي والمجلد',
	'spamdifftool_option_none' => 'لا شيء',
	'spamdifftool_block' => 'منع:',
	'spamdifftool_submit_buttom' => 'تنفيذ',
);

/** Arabic (العربية)
 * @author Meno25
 * @author Siebrand
 */
$messages['ar'] = array(
	'spamdifftool'                  => 'التحكم في قائمة السبام السوداء',
	'spamdifftool-desc'             => 'يوفر طريقة أساسية لإضافة مدخلات جديدة للقائمة السوداء للسبام من صفحات الفرق',
	'spamdifftool_cantedit'         => 'عذرا - أنت لا تمتلك الصلاحية لتعديل قائمة السبام السوداء.',
	'spamdifftool_notext'           => "لا يوجد نص لإضافته إلى قائمة السبام السوداء. اضغط <a href='$1'>هنا</a> للمتابعة.",
	'spamdifftool_confirm'          => "أكد أنك تريد إضافة هذه المدخلات إلى قائمة السبام السوداء. (اضغط <a href='$1' target='new'>هنا</a> للإبلاغ عن مشكلة.)",
	'spamdifftool_summary'          => 'جاري الإضافة إلى قائمة السبام السوداء',
	'spamdifftool_urls_detected'    => 'المسارات التالية تم التعرف عليها في التعديل(ات)، أيها تود إضافتها إلى قائمة السبام السوداء؟ هذه الخيارات مرتبة من الأكثر منعا إلى الأقل منعا، منع النطاق بأكمله سيمنع كل الوصلات لأي شيء من هذا النطاق. <br /><br />تأكد من عدم منع كل النطاقات التي تستضيف حسابات مستخدمين، مثل blogpost.com، geocities.com، إلى آخره.',
	'spamdifftool_no_urls_detected' => "لم يتم التعرف على أية مسارات. اضغط <a href='$1'>هنا</a> للعودة.",
	'spamdifftool_spam_link_text'   => 'الكل إلى السبام',
	'spamdifftool_option_domain'    => 'الكل من هذا النطاق',
	'spamdifftool_option_subdomain' => 'الكل من هذا النطاق الفرعي',
	'spamdifftool_option_directory' => 'هذا النطاق الفرعي والمجلد',
	'spamdifftool_option_none'      => 'لا شيء',
	'spamdifftool_block'            => 'منع:',
	'spamdifftool_submit_buttom'    => 'تنفيذ',
);

/** Bulgarian (Български)
 * @author Spiritia
 * @author DCLXVI
 */
$messages['bg'] = array(
	'spamdifftool'                  => 'Управление на Черния списък за спам',
	'spamdifftool_cantedit'         => 'Нямате права да редактирате Черния списък за спам.',
	'spamdifftool_notext'           => "Не е въведен текст, който да бъде добавен в Черния списък за спам. <a href='$1'>Продължаване</a>.",
	'spamdifftool_confirm'          => "Необходимо е потвърждение за добавяне на записите в списъка със спам (Нередности могат да се съобщават <a href='$1' target='new'>на тази страница</a>.)",
	'spamdifftool_summary'          => 'Добавяне към черния списък със спам',
	'spamdifftool_spam_link_text'   => 'добавяне в спам',
	'spamdifftool_option_domain'    => 'всичко от този домейн',
	'spamdifftool_option_subdomain' => 'всичко от този поддомейн',
	'spamdifftool_option_directory' => 'този поддомейн и директория',
	'spamdifftool_option_none'      => 'нищо',
	'spamdifftool_block'            => 'Блокиране:',
	'spamdifftool_submit_buttom'    => 'Съхранение',
);

/** Bengali (বাংলা)
 * @author Zaheen
 */
$messages['bn'] = array(
	'spamdifftool'          => 'স্প্যাম কালোতালিকা ব্যবস্থাপনা করুন',
	'spamdifftool_cantedit' => 'দুঃখিত - আপনার স্প্যাম কালোতালিকা সম্পাদনা করার অধিকার নেই।',
	'spamdifftool_notext'   => "স্প্যাম কালোতালিকায় যোগ করার জন্য কোন টেক্সট নেই। <a href='$1'>এখানে</a> ক্লিক করে অগ্রসর হোন।",
	'spamdifftool_confirm'  => "স্প্যাম কালোতালিকায় এই ভুক্তিগুলি যোগ করার ব্যাপারটি নিশ্চিত করুন। (সমস্যা হলে <a href='$1' target='new'>এখানে</a> ক্লিক করুন।)",
);

$messages['de'] = array(
	'spamdifftool'                  => 'Spam-Blacklist bearbeiten',
	'spamdifftool_cantedit'         => 'Du hast keine Berechitung zur Bearbeitung der Spam-Blacklist.',
	'spamdifftool_notext'           => 'Es gibt keinen Text, welcher der Spam-Blacklist hinzugefügt werden könnte. Klicke <a href=\'$1\'>hier</a> zum Forfahren.',
	'spamdifftool_confirm'          => 'Bestätige, dass du diese Einträge der Spam-Blacklist hinzufügen möchtest. (Klicke <a href=\'http://www.mediawiki.org/w/index.php?title=Talk:SpamDiffTool_Extension&action=edit&section=new\' target=\'new\'>hier</a>, um ein Problem zu melden.)',
	'spamdifftool_summary'          => 'Zur Spam-Blacklist hinzufügen',
	'spamdifftool_urls_detected'    => 'Die folgenden URLs wurden in der Bearbeitung gefunden, welche davon möchtest du der Spam-Blacklist hinzufügen? 
	Die Reihenfolge geht von sehr einschränkend bis weniger einschränkend, das Eintragen einer ganzen Domain blockiert alle Links, die von dieser Domain kommen.<br /><br />
	Stelle sicher, dass du nicht komplette Domains blockirst, die separate Benutzerinhalte bereitstellen, wie z. B. blogpost.com, geocities.com usw.',
	'spamdifftool_no_urls_detected' => 'Es wurden keine URLs gefunden. Klicke <a href=\'$1\'>hier</a>, um zurückzugehen.',
	'spamdifftool_spam_link_text'   => 'zu Spam hinzufügen',
	'spamdifftool_option_domain'    => 'alle von dieser Domain',
	'spamdifftool_option_subdomain' => 'alle von dieser Subdomain',
	'spamdifftool_option_directory' => 'diese Subdomain und das Verzeichnis',
	'spamdifftool_option_none'      => 'nichts',
	'spamdifftool_block'            => 'Sperre:',
	'spamdifftool_submit_buttom'    => 'Speichern',
	);

/** Greek (Ελληνικά)
 * @author Consta
 */
$messages['el'] = array(
	'spamdifftool_option_none' => 'τίποτα',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'spamdifftool_option_none' => 'nenio',
);

/** French (Français)
 * @author Urhixidur
 * @author Sherbrooke
 * @author Grondin
 */
$messages['fr'] = array(
	'spamdifftool'                  => 'Gestion de la Liste noire des pourriels',
	'spamdifftool-desc'             => 'Fournit une méthode simple pour ajouter des entrées dans la liste noire des pourriels à partir des diff',
	'spamdifftool_cantedit'         => 'Désolé - Vous n’avez pas la permission d’éditer la Liste noire des pourriels.',
	'spamdifftool_notext'           => "Il n’y a pas de texte à ajouter à la Liste noire des pourriels. Cliquez <a href='$1'>ici</a> pour continuer.",
	'spamdifftool_confirm'          => "Confirmez que vous voulez ajouter ces entrées dans la Liste noire des pourriels. (Cliquez <a href='$1' target='new'>ici</a> pour signaler tout problème.)",
	'spamdifftool_summary'          => 'Ajouté à la Liste noire des pourriels',
	'spamdifftool_urls_detected'    => 'Les URLs suivantes ont été détectées dans ces modifications. Lesquelles voulez-vous ajouter à la liste noire des pourriels ? Ces options vont des plus restrictives aux moins restrictives. Le blocage d’un nom de domaine entier bloquera tous les liens provenant de celui-ci. <br/><br/>Assurez-vous de ne pas bloquer des domaines entiers qui hébergent certains comptes utilisateurs tels que blogpost.com, geocities.com, etc.',
	'spamdifftool_no_urls_detected' => "Aucune URL n’a été détectée. Cliquez <a href='$1'>ici</a> pour revenir en arrière.",
	'spamdifftool_spam_link_text'   => 'ajouter aux pourriels',
	'spamdifftool_option_domain'    => 'tout depuis ce domaine',
	'spamdifftool_option_subdomain' => 'tout depuis ce sous-domaine',
	'spamdifftool_option_directory' => 'ce sous-domaine et ce répertoire',
	'spamdifftool_option_none'      => 'néant',
	'spamdifftool_block'            => 'Bloquer :',
	'spamdifftool_submit_buttom'    => 'Soumettre',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 */
$messages['gl'] = array(
	'spamdifftool'                  => 'Administrar a Listaxe Negra de Spam',
	'spamdifftool_cantedit'         => 'Sentímolo - vostede non ten permisos para editar na Listaxe Negra de Spam.',
	'spamdifftool_notext'           => "Non hai texto para engadir a Listaxe negra de Spam. Prema <a href='$1'>aquí</a> para continuar.",
	'spamdifftool_summary'          => 'Engadindo a Listaxe Negra de Spam',
	'spamdifftool_no_urls_detected' => "Ningunhas urls foron detectadas. Prema <a href='$1'>aquí</a> para voltar.",
	'spamdifftool_spam_link_text'   => 'engadir a spam',
	'spamdifftool_option_domain'    => 'todo desde este dominio',
	'spamdifftool_option_subdomain' => 'todo desde este subdominio',
	'spamdifftool_option_directory' => 'este subdominio e directorio',
	'spamdifftool_option_none'      => 'nada',
	'spamdifftool_block'            => 'Bloqueo:',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'spamdifftool'                  => 'Spamowu čornu lisćinu zrjadować',
	'spamdifftool-desc'             => 'Skići zakładne wašnje přidawanja nowych zapiskow spamowej čornej lisćinje ze stronow z rozdźělemi wersijow',
	'spamdifftool_cantedit'         => 'Bohužel nimaš dowolenje spamowu čornu lisćinu wobdźěłować.',
	'spamdifftool_notext'           => "Njeje žadyn tekst, kotryž móhł so spamowej čornej lisćinje přidać. Klikń <href='$1'>sem</a>, zo by pokročował.",
	'spamdifftool_confirm'          => "Potwjerdź, zo chceš tute zapiski spamowej čornej lisćinje přidać. (Klikń <a href='$1' target='new'>sem</a>, zo by wo problemje rozprawjał.)",
	'spamdifftool_summary'          => 'Spamowej čornej lisćinje přidać',
	'spamdifftool_urls_detected'    => 'Slědowace URL buchu w změnach wotkryte, kotre z nich chceš rady spamowej čornej lisćinje přidać? Tute opcije rjaduja wot bóle restriktiwne do mjenje restriktiwne, blokowanje cyłeje domejny budźe wšě wotkazy k něčemu, štož z tuteje domejny přińdźe, blokować.<br /><br />Zawěsć so, zo njeby cyle domejny blokował, kotrež wužiwarske konta hospoduja, kaž blogpost.com, geocities.com atd.',
	'spamdifftool_no_urls_detected' => "Njebuchu žane url wotkryte. Klikń <a href='$1'>sem</a>, zo by so wróćił.",
	'spamdifftool_spam_link_text'   => 'k spamej přidać',
	'spamdifftool_option_domain'    => 'wšo z tuteje domejny',
	'spamdifftool_option_subdomain' => 'wšě z tuteje poddomejny',
	'spamdifftool_option_directory' => 'tutu poddomejnu a tutón zapis',
	'spamdifftool_option_none'      => 'ničo',
	'spamdifftool_block'            => 'Blokować:',
	'spamdifftool_submit_buttom'    => 'Wotesłać',
);

/** Icelandic (Íslenska)
 * @author SPQRobin
 */
$messages['is'] = array(
	'spamdifftool_option_none' => 'ekkert',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author Lovekhmer
 */
$messages['km'] = array(
	'spamdifftool_no_urls_detected' => "រកមិនឃើញ url ។ ចុច <a href='$1'>ទីនេះ</a> ដើម្បី ត្រលប់ក្រោយ ។",
	'spamdifftool_option_domain'    => 'ទាំងអស់ ពី កម្មសិទ្ធិ នេះ',
	'spamdifftool_option_subdomain' => 'ទាំងអស់ ពី កម្មសិទ្ធិរង នេះ',
	'spamdifftool_option_directory' => 'កម្មសិទ្ធិរង និង ថតឯកសារ នេះ',
	'spamdifftool_option_none'      => 'ទទេ',
	'spamdifftool_block'            => 'ការហាមឃាត់៖',
	'spamdifftool_submit_buttom'    => 'ដាក់ស្នើ',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'spamdifftool_option_domain'    => 'all vun dësem Domain',
	'spamdifftool_option_subdomain' => 'all vun dësem Subdomain',
	'spamdifftool_option_none'      => 'näischt',
	'spamdifftool_block'            => 'Spär:',
	'spamdifftool_submit_buttom'    => 'Späicheren',
);

/** Marathi (मराठी)
 * @author Mahitgar
 */
$messages['mr'] = array(
	'spamdifftool_option_none' => 'कोणतेचानाही',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'spamdifftool'                  => 'Zwarte Lijst beheren',
	'spamdifftool-desc'             => 'Maakt het mogelijk nieuwe regels aan de zwarte lijst voor spam toe te voegen op basis van verschillen',
	'spamdifftool_cantedit'         => 'Sorry - u hebt geen rechten om de Zwarte Lijst tegen Spam te bewerken.',
	'spamdifftool_notext'           => "Er is geen tekst om toe te voegen aan de Zwarte Lijst tegen spam. Klik <a href='$1'>hier</a> om door te gaan.",
	'spamdifftool_confirm'          => "Bevestig dat u deze namen aan de Zwarte Lijst tegen spam  wil toevoegen. (Klik <a href='$1' target='new'>hier</a> om een probleem te melden.)",
	'spamdifftool_summary'          => 'Toevoegen aan de Zwarte Lijst tegen spam',
	'spamdifftool_urls_detected'    => "In de bewerking(en) zijn de volgende URL's aangetroffen. Welke wilt u toevoegen aan de Zwarte Lijst voor Spam? Deze opties gaan van meer beperkend naar minder beperkend. Het blokkeren van een volledig domein betekent dat geen enkele verwijzing naar dat domein wordt toegelaten. <br /><br /> Zorg dat u niet zomaar volledige domeinen blokkeert waar gebruikers bestaan, zoals blogpost.com, geocities.com, enzovoort.",
	'spamdifftool_no_urls_detected' => "Er werden geen URL's gevonden. Klik <a href='$1'>hier</a> om terug te keren.",
	'spamdifftool_spam_link_text'   => 'toevoegen aan spam',
	'spamdifftool_option_domain'    => 'alles van dit domein',
	'spamdifftool_option_subdomain' => 'alles van dit subdomein',
	'spamdifftool_option_directory' => 'dit subdomein en deze map',
	'spamdifftool_option_none'      => 'niets',
	'spamdifftool_block'            => 'Blokkeren:',
	'spamdifftool_submit_buttom'    => 'OK',
);

/** Norwegian (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'spamdifftool'                  => 'Håndter spamsvartelisten',
	'spamdifftool-desc'             => 'Gir en enkel måte å legge til nye elementer i spamsvartelisten fra diffsider',
	'spamdifftool_cantedit'         => 'Du har dessverre ikke rettighet til å redigere spamsvartelisten.',
	'spamdifftool_notext'           => 'Ingen tekst ble lagt til i spamsvartelisten. Klikk <a href=\'$1\'">her</a> for å fortsette.',
	'spamdifftool_confirm'          => "Bekreft at du vil legge til følgende poster i spamsvartelisten. (Rapporter et problem <a href='$1' target='new'>her</a>.)",
	'spamdifftool_summary'          => 'Legger til i spamsvartelisten',
	'spamdifftool_urls_detected'    => 'Nedenfr listes de URL-ene som ble funnet i redigeringen; hvilken av dem vil du legge til i spamsvartelisten? Disse valgmulighetene står i rekkefølgen strengest til mildest, blokkering av hele domenet vil blokkere alle lenker til alt som kommer fra det domenet.<br /><br />Ikke blikker hele domener til sider som er vert for mange brukere, type blogpost.com, geocities.com osv.',
	'spamdifftool_no_urls_detected' => "Ingen URL-er funnet. <a href='$1'>Gå tilbake</a>.",
	'spamdifftool_spam_link_text'   => 'legg til i spamlisten',
	'spamdifftool_option_domain'    => 'hele domenet',
	'spamdifftool_option_subdomain' => 'hele underdomenet',
	'spamdifftool_option_directory' => 'dette underdomenet og mappen',
	'spamdifftool_option_none'      => 'ingenting',
	'spamdifftool_block'            => 'Blokker:',
	'spamdifftool_submit_buttom'    => 'Legg til',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'spamdifftool'                  => 'Gestion de la Lista Negra dels Spams',
	'spamdifftool-desc'             => "Provesís un metòde simple per ajustar d'entradas dins la lista negra dels spams a partir de las dif",
	'spamdifftool_cantedit'         => 'O planhèm - Avètz pas la permission d’editar la Lista Negra dels Spams.',
	'spamdifftool_notext'           => "I a pas de tèxt d'ajustar a la Lista Negra dels Spams. Clicatz <a href='$1'>aicí</a> per contunhar.",
	'spamdifftool_confirm'          => "Confirmatz que volètz ajustar aquestas entradas dins la Lista Negra dels Spams. (Clicatz <a href='$1' target='new'>aicí</a> per senhalar tot problèma.)",
	'spamdifftool_summary'          => 'Ajustat a la Lista Negra dels Spams',
	'spamdifftool_urls_detected'    => "Las URLs seguentas son estadas detectadas dins aquestas edicions. Qualas son las que volètz ajustar a la Lista Negra dels Spams ? Aquestas opcions van de las mai restrictivas vèrs las mens restrictivas. Lo blocatge d’un nom de domeni entièr blocarà totes los ligams provenent d'aqueste.<br/><br/>Asseguratz-vos de blocar pas de domenis entièrs que detenon cèrts comptaires d'utilizaires tals coma blogpost.com, geocities.com, etc.",
	'spamdifftool_no_urls_detected' => "Cap d'URL es pas estada detectada. Clicatz <a href='$1'>aicí</a> per tornar en rèire",
	'spamdifftool_spam_link_text'   => 'ajustar als spams',
	'spamdifftool_option_domain'    => 'tot dempuèi aqueste domeni',
	'spamdifftool_option_subdomain' => 'tot dempuèi aqueste sosdomeni',
	'spamdifftool_option_directory' => 'aqueste sosdomeni e aqueste repertòri',
	'spamdifftool_option_none'      => 'Nonrés',
	'spamdifftool_block'            => 'Blocar :',
	'spamdifftool_submit_buttom'    => 'Sometre',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'spamdifftool_option_none' => 'هېڅ نه',
);

/** Portuguese (Português)
 * @author Lijealso
 * @author Malafaya
 */
$messages['pt'] = array(
	'spamdifftool_spam_link_text'   => 'adicionar como spam',
	'spamdifftool_option_domain'    => 'todos deste domínio',
	'spamdifftool_option_subdomain' => 'todos deste subdomínio',
	'spamdifftool_option_directory' => 'este subdomínio e directório',
	'spamdifftool_option_none'      => 'nada',
	'spamdifftool_block'            => 'Bloquear:',
	'spamdifftool_submit_buttom'    => 'Submeter',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'spamdifftool'                  => 'Spravovať Čiernu listinu spamu',
	'spamdifftool-desc'             => 'Poskytuje základný spôsob pridávania nových záznamov na Čiernu listinu spamu zo stránok rozdielov revízií',
	'spamdifftool_cantedit'         => 'Prepáčte, nemáte oprávnenie upravovať Čiernu listinu spamu',
	'spamdifftool_notext'           => "Nie je čo pridať na Čiernu listinu spamu. Pokračujte <a href='$1'>kliknutím sem</a>",
	'spamdifftool_confirm'          => "Potvrďte, že chcete pridať tieto položky na Čiernu listinu spamu. (Môžete tiež <a href='$1' target='new'>nahlásiť problém</a>.)",
	'spamdifftool_summary'          => 'Pridanie na Čiernu listinu spamu',
	'spamdifftool_urls_detected'    => 'V úprave boli zistené nasledovné URL. Ktoré z nich chcete pridať na čiernu listinu spamu? Tieto voľby sú v poradí od najreštriktívnejších po menej reštriktívne. Zablokovanie celej domény zablokuje všetky odkazy na danú doménu.<br /><br />Určite nezablokujte celé domény, ktoré úmožňujú tvorbu používateľských účtov ako blogpost.com, geocities.com atď.',
	'spamdifftool_no_urls_detected' => "Neboli zistené žiadne URL. Vráťte sa späť <a href='$1'>kliknutím sem</a>.",
	'spamdifftool_spam_link_text'   => 'pridať medzi spam',
	'spamdifftool_option_domain'    => 'všetky z tejto domény',
	'spamdifftool_option_subdomain' => 'všetky z tejto subdomény',
	'spamdifftool_option_directory' => 'túto subdoménu a adresár',
	'spamdifftool_option_none'      => 'nič',
	'spamdifftool_block'            => 'Blokovať:',
	'spamdifftool_submit_buttom'    => 'Odoslať',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'spamdifftool'                  => 'Spam-Blacklist beoarbaidje',
	'spamdifftool_cantedit'         => 'Du hääst neen Begjuchtigenge tou ju Beoarbaidenge fon ju Spam-Blacklist.',
	'spamdifftool_notext'           => "Dät rakt naan Text, die der an ju Spam-Blacklist bietouföiged wäide kuude. Klik <a href='$1'>hier</a> toun Fääregungen.",
	'spamdifftool_confirm'          => "Bestäätigje, dät du disse Iendraage an ju Spam-Blacklist bietouföigje moatest. (Klik <a href='http://www.mediawiki.org/w/index.php?title=Talk:SpamDiffTool_Extension&action=edit&section=new' target='new'>hier</a>, uum n Problem tou mäldjen.)",
	'spamdifftool_summary'          => 'Tou ju Spam-Blacklist bietouföigje',
	'spamdifftool_urls_detected'    => 'Do foulgjende URLs wuuden in ju Beoarbaidenge fuunen; wäkke deerfon moatest du ju Spam-Blacklist bietouföigje?
Ju Riegenfoulge gungt fon gjucht ienäängjend bit minner ienäängjend; dät Iendreegen fon n gans Domain blokkiert aal Ferbiendengen, do der fon dissen Domain kuume.<br /><br />
Staal sicher, dät du nit komplette Domains blokkierst, do der separate Benutserinhoolde kloorstaale, as t.B. blogpost.com, geocities.com usw.',
	'spamdifftool_no_urls_detected' => "Der wuuden neen URLs fuunen. Klik <a href='$1'>hier</a>, uum touräächtougungen.",
	'spamdifftool_spam_link_text'   => 'tou Spam bietouföigje',
	'spamdifftool_option_domain'    => 'aal fon dissen Domain',
	'spamdifftool_option_subdomain' => 'aal fon dissen Subdomain',
	'spamdifftool_option_directory' => 'disse Subdomain un dit Ferteeknis',
	'spamdifftool_option_none'      => 'niks',
	'spamdifftool_block'            => 'Speere:',
	'spamdifftool_submit_buttom'    => 'Spiekerje',
);

/** Swedish (Svenska)
 * @author Lejonel
 */
$messages['sv'] = array(
	'spamdifftool'                  => 'Hantera svarta listan för spam',
	'spamdifftool_cantedit'         => 'Du har tyvärr inte behörighet att redigera svarta listan för spam.',
	'spamdifftool_notext'           => "Ingen text lades till i svarta listan för spam. Klicka <a href='$1'>här</a> för att fortsätta.",
	'spamdifftool_confirm'          => "Bekräfta att du vill lägga till följande poster i svarta listan för spam. (Rapportera problem <a href='$1' target='new'>här</a>.)",
	'spamdifftool_summary'          => 'Utökar svarta listan för spam',
	'spamdifftool_urls_detected'    => 'Härunder listas de URL:er som hittades i redigeringen. Välj de du vill lägga till i svarta lista för spam. Blockeringsalternativen är ordnade från mer omfattande till mindre omfattande blockering. Om en hel domän blockeras så stoppas alla länkar till den domänen. <br /><br />Undvik att helt blockera domäner som är värd för många olika användare, såsom blogspot.com, geocities.com, m.fl.',
	'spamdifftool_no_urls_detected' => "Ingen URL hittades. <a href='$1'>Gå tillbaka</a>.",
	'spamdifftool_spam_link_text'   => 'lägg till i spamlistan',
	'spamdifftool_option_domain'    => 'hela domänen',
	'spamdifftool_option_subdomain' => 'hela subdomänen',
	'spamdifftool_option_directory' => 'denna katalog i subdomänen',
	'spamdifftool_option_none'      => 'ingenting',
	'spamdifftool_block'            => 'Blockera:',
	'spamdifftool_submit_buttom'    => 'Lägg till',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'spamdifftool_option_domain'    => 'ఈ డొమైన్ నుండి అన్నీ',
	'spamdifftool_option_subdomain' => 'ఈ ఉపడొమైను నుండి అన్నీ',
	'spamdifftool_option_none'      => 'ఏమీలేదు',
	'spamdifftool_block'            => 'నిరోధం:',
	'spamdifftool_submit_buttom'    => 'దాఖలుచెయ్యి',
);

/** Volapük (Volapük)
 * @author Malafaya
 */
$messages['vo'] = array(
	'spamdifftool_option_none' => 'nos',
);

