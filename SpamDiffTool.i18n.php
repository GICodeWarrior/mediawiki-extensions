<?php
/**
 * Internationalisation file for extension SpamDiffTool.
 *
 * @addtogroup Extensions
*/

$messages = array();

$messages['en'] = array(
	'spamdifftool'                  => 'Manage spam blacklist',
	'spamdifftool-desc'             => 'Provides a basic way of adding new entries to the spam blacklist from diff pages',
	'spamdifftool_cantedit'         => 'Sorry - you do not have permission to edit the spam blacklist.',
	'spamdifftool_notext'           => 'There is no text to add to the spam blacklist.
Click <a href=\'$1\'>here</a> to continue.',
	'spamdifftool_confirm'          => 'Confirm that you want to add these entries to the spam blacklist.
(Click <a href=\'$1\' target=\'new\'>here</a> to report a problem.)',
	'spamdifftool_summary'          => 'Adding to spam blacklist',
	'spamdifftool_urls_detected'    => 'The following URLs were detected in the edit(s).
Which ones would you like to add to the spam blacklist?
These options order from more restrictive to less restrictive, blocking the entire domain will block all links to anything coming from that domain.

Be sure not to block entire domains that host user accounts, like blogspot.com, geocities.com, etc.',
	'spamdifftool_no_urls_detected' => 'No urls were detected.
Click <a href=\'$1\'>here</a> to return.',
	'spamdifftool_spam_link_text'   => 'add to spam',
	'spamdifftool_option_domain'    => 'all from this domain',
	'spamdifftool_option_subdomain' => 'all from this subdomain',
	'spamdifftool_option_directory' => 'this subdomain and directory',
	'spamdifftool_option_none'      => 'nothing',
	'spamdifftool_block'            => 'Block:',
	'spamdifftool_submit_buttom'    => 'Submit',
	);

$messages['ar'] = array(
	'spamdifftool' => 'التحكم في قائمة السبام السوداء',
	'spamdifftool_cantedit' => 'عذرا - أنت لا تمتلك الصلاحية لتعديل قائمة السبام السوداء.',
	'spamdifftool_notext' => 'لا يوجد نص لإضافته إلى قائمة السبام السوداء. اضغط <a href=\'$1\'>هنا</a> للمتابعة.',
	'spamdifftool_confirm' => 'أكد أنك تريد إضافة هذه المدخلات إلى قائمة السبام السوداء. (اضغط <a href=\'$1\' target=\'new\'>هنا</a> للإبلاغ عن مشكلة.)',
	'spamdifftool_summary' => 'جاري الإضافة إلى قائمة السبام السوداء',
	'spamdifftool_urls_detected' => 'المسارات التالية تم التعرف عليها في التعديل(ات)، أيها تود إضافتها إلى قائمة السبام السوداء؟ هذه الخيارات مرتبة من الأكثر منعا إلى الأقل منعا، منع النطاق بأكمله سيمنع كل الوصلات لأي شيء من هذا النطاق.

تأكد من عدم منع كل النطاقات التي تستضيف حسابات مستخدمين، مثل blogpost.com، geocities.com، إلى آخره.',
	'spamdifftool_no_urls_detected' => 'لم يتم التعرف على أية مسارات. اضغط <a href=\'$1\'>هنا</a> للعودة.',
	'spamdifftool_spam_link_text' => 'الكل إلى السبام',
	'spamdifftool_option_domain' => 'الكل من هذا النطاق',
	'spamdifftool_option_subdomain' => 'الكل من هذا النطاق الفرعي',
	'spamdifftool_option_directory' => 'هذا النطاق الفرعي والمجلد',
	'spamdifftool_option_none' => 'لا شيء',
	'spamdifftool_block' => 'منع:',
	'spamdifftool_submit_buttom' => 'تنفيذ',
);

/** Message documentation (Message documentation)
 * @author Fryed-peach
 * @author Jon Harald Søby
 * @author Purodha
 */
$messages['qqq'] = array(
	'spamdifftool-desc' => 'Shown in [[Special:Version]] as a short description of this extension. Do not translate links.',
	'spamdifftool_option_none' => '{{Identical|Nothing}}',
	'spamdifftool_submit_buttom' => '{{Identical|Submit}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'spamdifftool_option_none' => 'niks',
	'spamdifftool_submit_buttom' => 'OK',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'spamdifftool_submit_buttom' => 'Nimbiar',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'spamdifftool' => 'التحكم في قائمة السبام السوداء',
	'spamdifftool-desc' => 'يوفر طريقة أساسية لإضافة مدخلات جديدة للقائمة السوداء للسبام من صفحات الفرق',
	'spamdifftool_cantedit' => 'عذرا - أنت لا تمتلك الصلاحية لتعديل قائمة السبام السوداء.',
	'spamdifftool_notext' => "لا يوجد نص لإضافته إلى قائمة السبام السوداء.
اضغط <a href='$1'>هنا</a> للمتابعة.",
	'spamdifftool_confirm' => "أكد أنك تريد إضافة هذه المدخلات إلى قائمة السبام السوداء.
(اضغط <a href='$1' target='new'>هنا</a> للإبلاغ عن مشكلة.)",
	'spamdifftool_summary' => 'إضافة إلى قائمة السبام السوداء',
	'spamdifftool_urls_detected' => 'المسارات التالية تم التعرف عليها في التعديل(ات)، أيها تود إضافتها إلى قائمة السبام السوداء؟
هذه الخيارات مرتبة من الأكثر منعا إلى الأقل منعا، منع النطاق بأكمله سيمنع كل الوصلات لأي شيء من هذا النطاق.

تأكد من عدم منع كل النطاقات التي تستضيف حسابات مستخدمين، مثل blogspot.com، geocities.com، إلى آخره.',
	'spamdifftool_no_urls_detected' => "لم يتم التعرف على أية مسارات.
اضغط <a href='$1'>هنا</a> للعودة.",
	'spamdifftool_spam_link_text' => 'أضف إلى السبام',
	'spamdifftool_option_domain' => 'الكل من هذا النطاق',
	'spamdifftool_option_subdomain' => 'الكل من هذا النطاق الفرعي',
	'spamdifftool_option_directory' => 'هذا النطاق الفرعي والمجلد',
	'spamdifftool_option_none' => 'لا شيء',
	'spamdifftool_block' => 'منع:',
	'spamdifftool_submit_buttom' => 'تنفيذ',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Ghaly
 * @author Meno25
 */
$messages['arz'] = array(
	'spamdifftool' => 'التحكم فى قائمة السبام السوداء',
	'spamdifftool-desc' => 'يوفر طريقة أساسية لإضافة مدخلات جديدة للقائمة السوداء للسبام من صفحات الفرق',
	'spamdifftool_cantedit' => 'عذرا - أنت لا تمتلك الصلاحية لتعديل قائمة السبام السوداء.',
	'spamdifftool_notext' => "لا يوجد نص لإضافته إلى قائمة السبام السوداء.
اضغط <a href='$1'>هنا</a> للمتابعة.",
	'spamdifftool_confirm' => "أكد أنك تريد إضافة هذه المدخلات إلى قائمة السبام السوداء.
(اضغط <a href='$1' target='new'>هنا</a> للإبلاغ عن مشكلة.)",
	'spamdifftool_summary' => 'إضافة إلى قائمة السبام السوداء',
	'spamdifftool_urls_detected' => 'المسارات التالية تم التعرف عليها فى التعديل(ات)، أى واحده عاوز تيضفها لقائمة السبام السودا؟
الخيارات دى مرتبة من الأكثر منع للأقل منع، منع النطاق بأكمله هايمنع كل الوصلات لأى شىء من  النطاق ده.

اتأكد من عدم منع كل النطاقات اللى تستضيف حسابات يوزرز، زى blogspot.com، geocities.com، لآخره.',
	'spamdifftool_no_urls_detected' => "لم يتم التعرف على أية مسارات.
اضغط <a href='$1'>هنا</a> للعودة.",
	'spamdifftool_spam_link_text' => 'أضف إلى السبام',
	'spamdifftool_option_domain' => 'الكل من هذا النطاق',
	'spamdifftool_option_subdomain' => 'الكل من هذا النطاق الفرعي',
	'spamdifftool_option_directory' => 'هذا النطاق الفرعى والمجلد',
	'spamdifftool_option_none' => 'لا شيء',
	'spamdifftool_block' => 'منع:',
	'spamdifftool_submit_buttom' => 'تنفيذ',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 */
$messages['be-tarask'] = array(
	'spamdifftool' => 'Кіраваньне чорным сьпісам спаму',
	'spamdifftool-desc' => 'Дазваляе лёгка дадаваць новыя запісы ў чорны сьпіс спаму з параўнаньня вэрсіяў старонак',
	'spamdifftool_cantedit' => 'Прабачце, Вы ня маеце правоў на рэдагаваньне чорнага сьпісу спаму.',
	'spamdifftool_notext' => "Няма тэксту для даданьня ў чорны сьпіс спаму.
Націсьніце <a href='$1'>тут</a>, каб працягваць.",
	'spamdifftool_confirm' => "Пацьвердзіце, што Вы жадаеце дадаць гэтыя запісы ў чорны сьпіс спаму.
(Націсьніце <a href='$1' target='new'>тут</a>, каб паведаміць пра праблему.)",
	'spamdifftool_summary' => 'Дадаць у чорны сьпіс спаму.',
	'spamdifftool_urls_detected' => 'Наступныя URL-адрасы былі выяўлены ў рэдагаваньні(ньнях), якія зь іх трэба дадаць у чорны сьпіс спаму?
Гэтыя настройкі разьмешчаныя ад больш строгіх абмежаваньняў да менш строгіх, блякаваньне ўсяго дамэна заблякуе ўсе спасылкі на гэты дамэн.

Пераканайцеся, што Вы не блякуеце дамэны, які ўтрымліваюць старонкі ўдзельнікаў, такія як blogspot.com, geocities.com і г.д.',
	'spamdifftool_no_urls_detected' => "URL-адрасы ня знойдзеныя.
Націсьніце <a href='$1'>тут</a>, каб вярнуцца.",
	'spamdifftool_spam_link_text' => 'дадаць у спам',
	'spamdifftool_option_domain' => 'усё з гэтага дамэну',
	'spamdifftool_option_subdomain' => 'усё з гэтага паддамэну',
	'spamdifftool_option_directory' => 'гэтага паддамэну і дырэкторыі',
	'spamdifftool_option_none' => 'нічога',
	'spamdifftool_block' => 'Блякаваньне:',
	'spamdifftool_submit_buttom' => 'Адправіць',
);

/** Bulgarian (Български)
 * @author DCLXVI
 * @author Spiritia
 */
$messages['bg'] = array(
	'spamdifftool' => 'Управление на Черния списък за спам',
	'spamdifftool_cantedit' => 'Нямате права да редактирате Черния списък за спам.',
	'spamdifftool_notext' => "Не е въведен текст, който да бъде добавен в Черния списък за спам. <a href='$1'>Продължаване</a>.",
	'spamdifftool_confirm' => "Необходимо е потвърждение за добавяне на записите в списъка със спам (Нередности могат да се съобщават <a href='$1' target='new'>на тази страница</a>.)",
	'spamdifftool_summary' => 'Добавяне към черния списък със спам',
	'spamdifftool_no_urls_detected' => "Не бяха засечени уеб адреси.
Натиснете <a href='$1'>тук</a> за връщане.",
	'spamdifftool_spam_link_text' => 'добавяне в спам',
	'spamdifftool_option_domain' => 'всичко от този домейн',
	'spamdifftool_option_subdomain' => 'всичко от този поддомейн',
	'spamdifftool_option_directory' => 'този поддомейн и директория',
	'spamdifftool_option_none' => 'нищо',
	'spamdifftool_block' => 'Блокиране:',
	'spamdifftool_submit_buttom' => 'Съхранение',
);

/** Bengali (বাংলা)
 * @author Zaheen
 */
$messages['bn'] = array(
	'spamdifftool' => 'স্প্যাম কালোতালিকা ব্যবস্থাপনা করুন',
	'spamdifftool_cantedit' => 'দুঃখিত - আপনার স্প্যাম কালোতালিকা সম্পাদনা করার অধিকার নেই।',
	'spamdifftool_notext' => "স্প্যাম কালোতালিকায় যোগ করার জন্য কোন টেক্সট নেই। <a href='$1'>এখানে</a> ক্লিক করে অগ্রসর হোন।",
	'spamdifftool_confirm' => "স্প্যাম কালোতালিকায় এই ভুক্তিগুলি যোগ করার ব্যাপারটি নিশ্চিত করুন। (সমস্যা হলে <a href='$1' target='new'>এখানে</a> ক্লিক করুন।)",
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'spamdifftool' => 'Upravljaj s nepoželjnim spiskom spama',
	'spamdifftool-desc' => 'Omogućuje osnovni način dodavanja novih stavki na zabranjeni spisak spama sa diff stranica',
	'spamdifftool_cantedit' => 'Žao nam je - nemate dopuštenja za uređivanje nedopuštenog spiska spama.',
	'spamdifftool_notext' => "Nema teksta za dodavanje na zabranjeni spisak spama.
Kliknite <a href='$1'>ovdje</a> za nastavak.",
	'spamdifftool_confirm' => "Potvrdite da stvarno želite dodati ove stavke na spisak nepoželjnog spama.
(Kliknite <a href='$1' target='new'>ovdje</a> za prijavu problema.)",
	'spamdifftool_summary' => 'Dodavanje na zabranjeni spisak spama',
	'spamdifftool_urls_detected' => 'Slijedeći URLovi su otkriveni u izmjeni(izmjenama), koji od njih bi željeli dodati na spisak nepoželjnog spama?
Te opcije su poredane od više ograničavajućih ka manje ograničavajućim, blokiranje cijele domene će blokirati sve linkove te sve drugo što dolazi s te domene.

Budite pažljivi da ne blokirate cijele domene koje pružaju korisničke račune, poput blogspot.com, geocities.com i sl.',
	'spamdifftool_no_urls_detected' => "Nisu pronađeni urlovi.
Kliknite <a href='$1'>ovdje</a> za povratak.",
	'spamdifftool_spam_link_text' => 'dodaj u spam',
	'spamdifftool_option_domain' => 'sve iz ove domene',
	'spamdifftool_option_subdomain' => 'sve iz ove subdomene',
	'spamdifftool_option_directory' => 'ovu subdomenu i direktorijum',
	'spamdifftool_option_none' => 'ništa',
	'spamdifftool_block' => 'Blokada:',
	'spamdifftool_submit_buttom' => 'Pošalji',
);

/** Catalan (Català)
 * @author Solde
 */
$messages['ca'] = array(
	'spamdifftool_submit_buttom' => 'Envia',
);

/** Sorani (Arabic script) (‫کوردی (عەرەبی)‬)
 * @author Marmzok
 */
$messages['ckb-arab'] = array(
	'spamdifftool_option_none' => 'هیچ‌شتێک',
);

/** Czech (Česky)
 * @author Matěj Grabovský
 */
$messages['cs'] = array(
	'spamdifftool' => 'Spravovat černou listinu spamu',
	'spamdifftool-desc' => 'Poskytuje základní způsob přidávání nových záznamů na černou listinu spamu ze stránek rozdílů revizí',
	'spamdifftool_cantedit' => 'Omlouváme se, nemáte oprávnění upravovat černou listinu spamu.',
	'spamdifftool_notext' => "Není co přidat na černou listinu spamu. Pokračujte <a href='$1'>kliknutím sem</a>.",
	'spamdifftool_confirm' => "Potvrďte, že chcete přidat tyto položky na černou listinu spamu. (Můžete také <a href='$1' target='new'>nahlásit problém</a>.)",
	'spamdifftool_summary' => 'Přidání na černou listinu spamu',
	'spamdifftool_urls_detected' => 'V editaci byly zjištěny následující URL.
Které z nich chcete přidat na černou listinu spamu?
Tyto volby jsou v pořadí od nejomezenějších po méně omezené. Zablokováním celé domény zablokujete všechny odkazy na danou doménu.

Určitě nezablokujte celé domény, které umožňují tvorbu uživatelských účtů, jako blogspot.com, geocities.com, apod.',
	'spamdifftool_no_urls_detected' => "Nebyly zjištěny žádné URL. Vratíte se zpět <a href='$1'>kliknutím sem</a>.",
	'spamdifftool_spam_link_text' => 'přidat mezi spam',
	'spamdifftool_option_domain' => 'všechny z této domény',
	'spamdifftool_option_subdomain' => 'všechny z této subdomény',
	'spamdifftool_option_directory' => 'tuto sudoménu a adresář',
	'spamdifftool_option_none' => 'nic',
	'spamdifftool_block' => 'Blokovat:',
	'spamdifftool_submit_buttom' => 'Odeslat',
);

/** Welsh (Cymraeg)
 * @author Lloffiwr
 */
$messages['cy'] = array(
	'spamdifftool_cantedit' => "Sylwer - nid yw'r gallu gennych i olygu'r rhestr spam gwaharddedig.",
);

/** German (Deutsch)
 * @author Als-Holder
 * @author Consta
 * @author Michawiki
 * @author Umherirrender
 */
$messages['de'] = array(
	'spamdifftool' => 'Spam-Blacklist bearbeiten',
	'spamdifftool-desc' => 'Ermöglicht das Hinzufügen neuer Einträge zur Spamblacklist aus Versionsunterschieden',
	'spamdifftool_cantedit' => 'Du hast keine Berechtigung zur Bearbeitung der Spam-Blacklist.',
	'spamdifftool_notext' => "Es gibt keinen Text, welcher der Spam-Blacklist hinzugefügt werden könnte. Klicke <a href='$1'>hier</a>, um fortzufahren.",
	'spamdifftool_confirm' => "Bestätige, dass du diese Einträge der Spam-Blacklist hinzufügen möchtest.
(Klicke <a href='$1' target='new'>hier</a>, um ein Problem zu melden.)",
	'spamdifftool_summary' => 'Zur Spam-Blacklist hinzufügen',
	'spamdifftool_urls_detected' => 'Die folgenden URLs wurden in der Bearbeitung gefunden, welche davon möchtest du der Spam-Blacklist hinzufügen?
Die Reihenfolge geht von sehr einschränkend bis weniger einschränkend, das Eintragen einer ganzen Domain blockiert alle Links, die von dieser Domain kommen.

Stelle sicher, dass du nicht komplette Domains blockierst, die separate Benutzerinhalte bereitstellen, wie z. B. blogspot.com, geocities.com usw.',
	'spamdifftool_no_urls_detected' => "Es wurden keine URLs gefunden. Klicke <a href='$1'>hier</a>, um zurückzugehen.",
	'spamdifftool_spam_link_text' => 'zu Spam hinzufügen',
	'spamdifftool_option_domain' => 'alle von dieser Domain',
	'spamdifftool_option_subdomain' => 'alle von dieser Subdomain',
	'spamdifftool_option_directory' => 'diese Subdomain und das Verzeichnis',
	'spamdifftool_option_none' => 'nichts',
	'spamdifftool_block' => 'Sperre:',
	'spamdifftool_submit_buttom' => 'Speichern',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author Imre
 * @author Umherirrender
 */
$messages['de-formal'] = array(
	'spamdifftool_cantedit' => 'Sie haben keine Berechtigung zur Bearbeitung der Spam-Blacklist.',
	'spamdifftool_notext' => "Es gibt keinen Text, welcher der Spam-Blacklist hinzugefügt werden könnte. Klicken Sie <a href='$1'>hier</a>, um fortzufahren.",
	'spamdifftool_confirm' => "Bestätigen Sie, dass Sie diese Einträge der Spam-Blacklist hinzufügen möchten.
(Klicken Sie <a href='$1' target='new'>hier</a>, um ein Problem zu melden.)",
	'spamdifftool_urls_detected' => 'Die folgenden URLs wurden in der Bearbeitung gefunden, welche davon möchten Sie der Spam-Blacklist hinzufügen?
Die Reihenfolge geht von sehr einschränkend bis weniger einschränkend, das Eintragen einer ganzen Domain blockiert alle Links, die von dieser Domain kommen.

Stellen Sie sicher, dass Sie nicht komplette Domains blockieren, die separate Benutzerinhalte bereitstellen, wie z. B. blogspot.com, geocities.com usw.',
	'spamdifftool_no_urls_detected' => "Es wurden keine URLs gefunden. Klicken Sie <a href='$1'>hier</a>, um zurückzugehen.",
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'spamdifftool' => 'Corna lisćina spama zastojaś',
	'spamdifftool-desc' => 'Zmóžnja pśidawanje nowych zapiskow k cornej lisćinje spama z rozdźělowych bokow.',
	'spamdifftool_cantedit' => 'Wódaj - njamaš pšawo cornu lisćinu spama wobźěłaś.',
	'spamdifftool_notext' => "Njejo tekst, kótaryž dajo se k cornej lisćinje spama pśidaś.
Klikni <a href='$1'>sem</a>, aby pókšacował.",
	'spamdifftool_confirm' => "Wobkšuś, až coš toś te zapiski k cornej lisćinje spama pśidaś.
(Klikni <a href='$1' target='new'>sem</a>, aby dał problem k wěsći.)",
	'spamdifftool_summary' => 'K cornej lisćinje spama pśidaś',
	'spamdifftool_urls_detected' => 'Slědujuce URL su se nadejšli w změnach, kótarež coš cornej lišćinje spama pśidaś?
Toś te opcije su w rěźe wót wjelgin restriktiwne až mjenjej restriktiwne, blokěrowanje cełeje domeny buźo wšykne wótkaze blokěrowaś, kótarež pśidu z toś teje domeny.

Pšosym se wobwěsć, až njeblokěrujoš cełe domeny, kótarež góspóduju wužywarske konta, ako na pśikład blogspot.com, geocities.com atd.',
	'spamdifftool_no_urls_detected' => "Žedne URL su se namakali.
Klikni <a href='$1'>sem</a>, aby se wróśił.",
	'spamdifftool_spam_link_text' => 'K spamoju pśidaś',
	'spamdifftool_option_domain' => 'wšykne z toś teje domeny',
	'spamdifftool_option_subdomain' => 'wšykne z toś teje póddomeny',
	'spamdifftool_option_directory' => 'toś ta póddomena a zapis',
	'spamdifftool_option_none' => 'nic',
	'spamdifftool_block' => 'Blokěrowanje:',
	'spamdifftool_submit_buttom' => 'Wótpósłaś',
);

/** Greek (Ελληνικά)
 * @author Consta
 * @author Crazymadlover
 * @author Omnipaedista
 * @author ZaDiak
 */
$messages['el'] = array(
	'spamdifftool' => 'Διαχείριση μαύρης λίστας των σπαμ',
	'spamdifftool_summary' => 'Προσθήκη στη μαύρη λίστα των σπαμ',
	'spamdifftool_spam_link_text' => 'Προσθήκη στο spam',
	'spamdifftool_option_domain' => 'όλα από αυτή την περιοχή',
	'spamdifftool_option_subdomain' => 'όλα από αυτή την υποπεριοχή',
	'spamdifftool_option_directory' => 'αυτή η υποπεριοχή και ο κατάλογος',
	'spamdifftool_option_none' => 'τίποτα',
	'spamdifftool_block' => 'Φραγή:',
	'spamdifftool_submit_buttom' => 'Υποβολή',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'spamdifftool' => 'Kontrolu spaman nigraliston',
	'spamdifftool-desc' => 'Provizas bazan fojon por aldoni novajn listanojn al la spam-nigralisto de diferencaj paĝoj',
	'spamdifftool_cantedit' => 'Bedaŭrinde - vi ne havas permeson por redakti la spaman nigraliston.',
	'spamdifftool_notext' => "Estas neniom da teksto aldoni al la spama nigralisto.
Klaku <a href='$1'>ĉi tie</a> por daŭri.",
	'spamdifftool_confirm' => "Konfirmu ke vi volas aldoni ĉi tiujn aĵojn al la spama nigralisto.
(Klaku <a href='$1' target='new'>ĉi tie</a> por raporti problemon.)",
	'spamdifftool_summary' => 'Aldonante al spama nigralisto',
	'spamdifftool_no_urls_detected' => "Neniuj URL-oj estis detektitaj.
Klaku <a href='$1'>ĉi tie</a> por reveni.",
	'spamdifftool_spam_link_text' => 'aldoni al spamon',
	'spamdifftool_option_domain' => 'ĉiuj de ĉi tiu domajno',
	'spamdifftool_option_subdomain' => 'ĉiuj de ĉi tiu subdomajno',
	'spamdifftool_option_directory' => 'ĉi tiu subdomajno kaj dosierujo',
	'spamdifftool_option_none' => 'nenio',
	'spamdifftool_block' => 'Forbaru:',
	'spamdifftool_submit_buttom' => 'Ek',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Drini
 * @author Imre
 * @author Sanbec
 */
$messages['es'] = array(
	'spamdifftool' => 'Administrar lista negra de spam',
	'spamdifftool-desc' => 'Provee una manera básica de agregar entradas a la lista negra de spam desde diferentes páginas',
	'spamdifftool_cantedit' => 'Disculpe - usted no tiene permiso para editar la lista negra de spam.',
	'spamdifftool_notext' => "No hay texto para agregar en la lista negra de spam.
Click <a href='$1'>aquí</a> para continuar.",
	'spamdifftool_confirm' => "Confirme que desea añadir estas entradas a la lista negra de Spam.
(Haga click <a href='$1' target='new'>aquí</a> para reportar un problema).",
	'spamdifftool_summary' => 'Agregando a la lista negra de spam',
	'spamdifftool_urls_detected' => 'Las siguientes URLS fueron detectadas en la edición. ¿Cuales desea que se añadan a la lista negra de spam?
Estas opciones se ordenan de la más restrictiva a la menos, bloqueando el dominion entero bloqueará todos los enlaces que provengan de él.

Asegúrese se no bloquear dominios enteros que hospeden cuentas de usuario (como blogspot, geocities, etc.).',
	'spamdifftool_no_urls_detected' => "Ningún urls fue borrado.
Click <a href='$1'>aquí</a> para regresar.",
	'spamdifftool_spam_link_text' => 'agregar a spam',
	'spamdifftool_option_domain' => 'Todo de este dominio',
	'spamdifftool_option_subdomain' => 'Todo de este subdominio',
	'spamdifftool_option_directory' => 'Este subdominio y directorio',
	'spamdifftool_option_none' => 'nada',
	'spamdifftool_block' => 'Bloqueo:',
	'spamdifftool_submit_buttom' => 'Enviar',
);

/** Estonian (Eesti)
 * @author Avjoska
 */
$messages['et'] = array(
	'spamdifftool_spam_link_text' => 'lisa spämminimekirja',
	'spamdifftool_option_none' => 'ei midagi',
	'spamdifftool_block' => 'Blokeeri:',
);

/** Basque (Euskara)
 * @author An13sa
 * @author Kobazulo
 */
$messages['eu'] = array(
	'spamdifftool_no_urls_detected' => "Ez da url-rik detektatu.
Egizu klik <a href='$1'>hemen</a> itzultzeko.",
	'spamdifftool_spam_link_text' => 'spamera gehitu',
	'spamdifftool_option_none' => 'ezer',
	'spamdifftool_submit_buttom' => 'Bidali',
);

/** Persian (فارسی)
 * @author BlueDevil
 * @author Huji
 * @author Meisam
 */
$messages['fa'] = array(
	'spamdifftool_cantedit' => 'متاسفیم؛ شما اجازه ویرایش فهرست سیاه هرزنویسی را ندارید.',
);

/** Finnish (Suomi)
 * @author Cimon Avaro
 * @author Crt
 * @author Str4nd
 */
$messages['fi'] = array(
	'spamdifftool' => 'Hallitse mainosestolistaa',
	'spamdifftool-desc' => 'Mahdollistaa yksinkertaisen tavan lisätä uusia kohteita mainosestolistaan erovaisuussivuilta.',
	'spamdifftool_cantedit' => 'Sinulla ei ole oikeuksia muokata mainosestolistaa.',
	'spamdifftool_notext' => "Ei ole tekstiä lisättäväksi mainosestolistalle.
<a href='$1'>Napsauta jatkaaksesi</a>.",
	'spamdifftool_confirm' => "Vahvista, että haluat lisätä nämä mainosestolistalle. (Napsauta <a href='$1' target='new'>tästä</a> ilmoittaaksesi ongelmasta.)",
	'spamdifftool_summary' => 'Lisätään mainosestolistalle',
	'spamdifftool_spam_link_text' => 'lisää mainosestolistaan',
	'spamdifftool_option_domain' => 'kaikki tästä verkkotunnuksesta',
	'spamdifftool_option_subdomain' => 'kaikki tästä aliverkkotunnuksesta',
	'spamdifftool_option_directory' => 'tämä aliverkkotunnus ja hakemisto',
	'spamdifftool_option_none' => 'ei mitään',
	'spamdifftool_block' => 'Esto:',
	'spamdifftool_submit_buttom' => 'Lähetä',
);

/** French (Français)
 * @author Grondin
 * @author Sherbrooke
 * @author Urhixidur
 */
$messages['fr'] = array(
	'spamdifftool' => 'Gestion de la Liste noire des pourriels',
	'spamdifftool-desc' => 'Fournit une méthode simple pour ajouter des entrées dans la liste noire des pourriels à partir des diff',
	'spamdifftool_cantedit' => 'Désolé - Vous n’avez pas la permission d’éditer la Liste noire des pourriels.',
	'spamdifftool_notext' => "Il n’y a pas de texte à ajouter à la Liste noire des pourriels. Cliquez <a href='$1'>ici</a> pour continuer.",
	'spamdifftool_confirm' => "Confirmez que vous voulez ajouter ces entrées dans la Liste noire des pourriels. (Cliquez <a href='$1' target='new'>ici</a> pour signaler tout problème.)",
	'spamdifftool_summary' => 'Ajouté à la Liste noire des pourriels',
	'spamdifftool_urls_detected' => 'Les URLs suivantes ont été détectées dans ces modifications.
Lesquelles voulez-vous ajouter à la liste noire des pourriels ?
Ces options vont des plus restrictives aux moins restrictives.
Le blocage d’un nom de domaine entier bloquera tous les liens provenant de celui-ci.

Assurez-vous de ne pas bloquer des domaines entiers qui hébergent certains comptes utilisateurs tels que blogspot.com, geocities.com, etc.',
	'spamdifftool_no_urls_detected' => "Aucune URL n’a été détectée. Cliquez <a href='$1'>ici</a> pour revenir en arrière.",
	'spamdifftool_spam_link_text' => 'ajouter aux pourriels',
	'spamdifftool_option_domain' => 'tout depuis ce domaine',
	'spamdifftool_option_subdomain' => 'tout depuis ce sous-domaine',
	'spamdifftool_option_directory' => 'ce sous-domaine et ce répertoire',
	'spamdifftool_option_none' => 'néant',
	'spamdifftool_block' => 'Bloquer :',
	'spamdifftool_submit_buttom' => 'Soumettre',
);

/** Franco-Provençal (Arpetan)
 * @author Cedric31
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'spamdifftool_option_none' => 'ren',
	'spamdifftool_block' => 'Blocar :',
	'spamdifftool_submit_buttom' => 'Sometre',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 */
$messages['gl'] = array(
	'spamdifftool' => 'Administrar a Lista Negra de Spam',
	'spamdifftool-desc' => 'Proporciona un camiño básico para engadir novas entradas á lista negra de spam (spam blacklist) das diferenzas das páxinas',
	'spamdifftool_cantedit' => 'Sentímolo - vostede non ten permisos para editar na Lista Negra de Spam.',
	'spamdifftool_notext' => "Non hai texto para engadir a Lista negra de Spam. Prema <a href='$1'>aquí</a> para continuar.",
	'spamdifftool_confirm' => "Confirme que quere engadir estas entradas á lista negra de <i>spam</i>.
(Faga clic <a href='$1' target='new'>aquí</a> para informar de calquera problema.)",
	'spamdifftool_summary' => 'Engadindo a Lista Negra de Spam',
	'spamdifftool_urls_detected' => 'Os seguintes enderezos URL foron detectados na(s) edición(s); cales quere engadir á lista negra de spam?
Estas opcións van das máis restritivas ás menos, bloqueando o dominio enteiro bloquearanse todas as ligazóns que veñan dese dominio.

Asegúrese de non bloquear dominios enteiros que bloqueen contas de usuario; como blogspot.com, geocities.com, etc.',
	'spamdifftool_no_urls_detected' => "Ningunhas urls foron detectadas. Prema <a href='$1'>aquí</a> para voltar.",
	'spamdifftool_spam_link_text' => 'engadir a spam',
	'spamdifftool_option_domain' => 'todo desde este dominio',
	'spamdifftool_option_subdomain' => 'todo desde este subdominio',
	'spamdifftool_option_directory' => 'este subdominio e directorio',
	'spamdifftool_option_none' => 'nada',
	'spamdifftool_block' => 'Bloqueo:',
	'spamdifftool_submit_buttom' => 'Enviar',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'spamdifftool_submit_buttom' => 'Ὑποβάλλειν',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'spamdifftool' => 'Spam-Blacklist bearbeite',
	'spamdifftool-desc' => 'Macht s megli neiji Yyträg zue dr Spamblacklist us Versionsunterschiid zuezfiege',
	'spamdifftool_cantedit' => 'Excusez! Du derfsch d Spam-Blacklist nit bearbeite.',
	'spamdifftool_notext' => "S git kei Täxt, wu mer zue dr Spam-Blacklist chennt zuefiege. Druck <a href='$1'>do</a> zum wyter mache.",
	'spamdifftool_confirm' => "Bstätig, ass Du die Yyträg zue dr Spam-Blacklist wetsch zuefiege.
(Druck <a href='$1' target='new'>do</a> go ne Probläm mälde.)",
	'spamdifftool_summary' => 'Zue dr Spam-Blacklist zuefiege',
	'spamdifftool_urls_detected' => 'Die URL sin in dr Bearbeitig gfunde wore. Weli dervu wit zue dr Spam-Blacklist zuefiege?
D Reihefolg goht vu arg yygschränkt bis weniger yygschränkt. S Yytrage vun ere ganze Domain blockiert alli Gleicher, wu vu däre Domain chemme.

Stell sicher, ass Du nit kompletti Domain blockiersch, wu separati Benutzerinhalt z Verfiegig stelle, wie z. B. blogspot.com, geocities.com usw.',
	'spamdifftool_no_urls_detected' => "S sin kei URL gfunde wore. Druck <a href='$1'>do</a> zum zrugg z goh.",
	'spamdifftool_spam_link_text' => 'zue Spam zuefiege',
	'spamdifftool_option_domain' => 'alli vu däre Domain',
	'spamdifftool_option_subdomain' => 'alli vu däre Subdomain',
	'spamdifftool_option_directory' => 'die Subdomain un s Verzeichnis',
	'spamdifftool_option_none' => 'nyt',
	'spamdifftool_block' => 'Sperri:',
	'spamdifftool_submit_buttom' => 'Spychere',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'spamdifftool' => 'ניהול מסנן הספאם',
	'spamdifftool-desc' => 'הוספת דרך בסיסית להוספת רשומות חדשות למסנן הספאם מתוך דפי הבדלים בין גרסאות',
	'spamdifftool_cantedit' => 'מצטערים - אין ברשותכם את ההרשאות המתאימות לעריכת מסנן הספאם.',
	'spamdifftool_notext' => "אין טקסט להוספה למסנן הספאם.
לחצו <a href='$1'>כאן</a> להמשך.",
	'spamdifftool_confirm' => "אשרו כי ברצונכם להוסיף רשומות אלו אל מנגנון הספאם.
(לחצו <a href='$1' target='new'>כאן</a> לדיווח על תקלה.)",
	'spamdifftool_summary' => 'הוספה למסנן הספאם',
	'spamdifftool_urls_detected' => "הכתובות הבאות זוהו בעריכה/ות, אילו מהכתובות תרצו להוסיף למסנן הספאם?
אפשרויות אלו מסודרות מהמגבילות ביותר עד למגבילות פחות. חסימת שם הדומיין כולו תחסום את כל הקישורים ואת כל מה שבא מאותו הדומיין.

וודאו כי אינכם חוסמים דומיינים שלמים המארחים חשבונות משתמשים, כגון blogspot.com, geocities.com וכו'.",
	'spamdifftool_no_urls_detected' => "לא זוהו כתובות.
לחצו <a href='$1'>כאן</a> לחזרה.",
	'spamdifftool_spam_link_text' => 'הוספה לספאם',
	'spamdifftool_option_domain' => 'הכול מדומיין זה',
	'spamdifftool_option_subdomain' => 'הכול מדומיין משנה זה',
	'spamdifftool_option_directory' => 'דומיין משנה זה ותיקייה',
	'spamdifftool_option_none' => 'כלום',
	'spamdifftool_block' => 'חסימה:',
	'spamdifftool_submit_buttom' => 'שליחה',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 */
$messages['hi'] = array(
	'spamdifftool_submit_buttom' => 'भेजें',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'spamdifftool' => 'Spamowu čornu lisćinu zrjadować',
	'spamdifftool-desc' => 'Skići zakładne wašnje přidawanja nowych zapiskow spamowej čornej lisćinje ze stronow z rozdźělemi wersijow',
	'spamdifftool_cantedit' => 'Bohužel nimaš dowolenje spamowu čornu lisćinu wobdźěłować.',
	'spamdifftool_notext' => "Njeje žadyn tekst, kotryž móhł so spamowej čornej lisćinje přidać. Klikń <href='$1'>sem</a>, zo by pokročował.",
	'spamdifftool_confirm' => "Potwjerdź, zo chceš tute zapiski spamowej čornej lisćinje přidać. (Klikń <a href='$1' target='new'>sem</a>, zo by wo problemje rozprawjał.)",
	'spamdifftool_summary' => 'Spamowej čornej lisćinje přidać',
	'spamdifftool_urls_detected' => 'Slědowace URL buchu w změnach wotkryte, kotre z nich chceš rady spamowej čornej lisćinje přidać?
Tute opcije rjaduja wot bóle restriktiwne do mjenje restriktiwne, blokowanje cyłeje domejny budźe wšě wotkazy k něčemu, štož z tuteje domejny přińdźe, blokować.

Zawěsć so, zo njeby cyle domejny blokował, kotrež wužiwarske konta hospoduja, kaž blogspot.com, geocities.com atd.',
	'spamdifftool_no_urls_detected' => "Njebuchu žane url wotkryte. Klikń <a href='$1'>sem</a>, zo by so wróćił.",
	'spamdifftool_spam_link_text' => 'k spamej přidać',
	'spamdifftool_option_domain' => 'wšo z tuteje domejny',
	'spamdifftool_option_subdomain' => 'wšě z tuteje poddomejny',
	'spamdifftool_option_directory' => 'tutu poddomejnu a tutón zapis',
	'spamdifftool_option_none' => 'ničo',
	'spamdifftool_block' => 'Blokować:',
	'spamdifftool_submit_buttom' => 'Wotesłać',
);

/** Hungarian (Magyar)
 * @author Dani
 */
$messages['hu'] = array(
	'spamdifftool_no_urls_detected' => "Nem találtam URL-t.
Kattints <a href='$1'>ide</a> a visszatéréshez.",
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'spamdifftool' => 'Gerer le lista nigre antispam',
	'spamdifftool-desc' => 'Forni un modo simple de adder nove entratas al lista nigre antispam ab le comparation inter versiones',
	'spamdifftool_cantedit' => 'Pardono - tu non ha le permission de modificar le lista nigre antispam.',
	'spamdifftool_notext' => "Il non ha texto a adder al lista nigre antispam.
Clicca <a href='$1'>hic</a> pro continuar.",
	'spamdifftool_confirm' => "Confirma que tu vole adder iste entratas al lista nigre antispam.
(Clicca <a href='$1' target='new'>hic</a> pro reportar un problema.)",
	'spamdifftool_summary' => 'Addition al lista nigre antispam',
	'spamdifftool_urls_detected' => 'Le sequente adresses URL esseva detegite in le modification(es). Quales vole tu adder al lista nigre antispam?
Iste optiones es ordinate del plus restrictive al minus restrictive. Le blocada de un dominio integre blocara tote le ligamines verso omne cosa proveniente de ille dominio.

Assecura te de non blocar dominios integre que alberga multe sitos de usatores, como blogspot.com, geocities.com, etc.',
	'spamdifftool_no_urls_detected' => "Nulle adresse URL esseva detecite.
Clicca <a href='$1'>hic</a> pro retornar.",
	'spamdifftool_spam_link_text' => 'adder como spam',
	'spamdifftool_option_domain' => 'totes ab iste dominio',
	'spamdifftool_option_subdomain' => 'totes ab iste subdominio',
	'spamdifftool_option_directory' => 'iste subdominio e directorio',
	'spamdifftool_option_none' => 'nihil',
	'spamdifftool_block' => 'Blocar:',
	'spamdifftool_submit_buttom' => 'Submitter',
);

/** Indonesian (Bahasa Indonesia)
 * @author Rex
 */
$messages['id'] = array(
	'spamdifftool' => 'Pemeliharaan daftar hitam spam',
	'spamdifftool-desc' => 'Menyediakan fungsi dasar untuk menambahkan entri baru ke daftar hitam spam langsung dari halaman perbedaan antar revisi',
	'spamdifftool_cantedit' => 'Maaf - Anda tidak memiliki hak akses untuk menyunting daftar hitam spam.',
	'spamdifftool_notext' => "Tidak ada teks yang dapat ditambahkan ke daftar hitam spam.
Klik <a href='$1'>di sini</a> untuk melanjutkan.",
	'spamdifftool_confirm' => "Konfirmasi untuk meyakinkan bahwa Anda ingin menambahkan entri ini ke daftar hitam spam.
(Klik <a href='$1' target='new'>di sini</a> untuk melaporkan suatu masalah.)",
	'spamdifftool_summary' => 'Sedang menambahkan ke daftar hitam spam',
	'spamdifftool_urls_detected' => 'URL berikut terdeteksi dalam suntingan. URL yang mana saja yang ingin ditambahkan ke daftar hitam spam?
Opsi berikut diurutkan dari yang paling dibatasi hingga yang lebih sedikit dibatasi. Memblokir seluruh domain akan sekaligus memblokir pranala yang berasal dari domain tersebut.

Pastikan Anda tidak memblokir semua domain yang meladeni akun-akun pengguna, seperti blogspot.com, geocities.com, dan lain-lain.',
	'spamdifftool_no_urls_detected' => "Tidak ada url yang terdeteksi.
Klik <a href='$1'>di sini</a> untuk kembali.",
	'spamdifftool_spam_link_text' => 'tambahkan ke spam',
	'spamdifftool_option_domain' => 'semua dari domain ini',
	'spamdifftool_option_subdomain' => 'semua dari subdomain ini',
	'spamdifftool_option_directory' => 'subdomain dan direktori ini',
	'spamdifftool_option_none' => 'tidak ada',
	'spamdifftool_block' => 'Blokir:',
	'spamdifftool_submit_buttom' => 'Kirim',
);

/** Icelandic (Íslenska) */
$messages['is'] = array(
	'spamdifftool_option_none' => 'ekkert',
);

/** Italian (Italiano)
 * @author Darth Kule
 */
$messages['it'] = array(
	'spamdifftool' => 'Gestisci la spam blacklist',
	'spamdifftool-desc' => 'Fornisce un semplice modo per aggiungere nuovi valori alla spam blacklist dalle pagine del confronto fra versioni',
	'spamdifftool_cantedit' => 'Spiacente - non hai i permessi per modificare la spam blacklist.',
	'spamdifftool_notext' => "Non c'è alcun testo da aggiungere alla spam blacklist.
Fai clic <a href='$1'>qui</a> per continuare.",
	'spamdifftool_confirm' => "Conferma che hai intenzione di aggiungere questi valori alla spam blacklist.
(Fai clic <a href='$1' target='new'>qui</a> per segnalare un problema.)",
	'spamdifftool_summary' => 'Aggiungo alla spam blacklist',
	'spamdifftool_urls_detected' => "I seguenti URL sono stai rilevai nelle modifiche, quale vorresti aggiungere alla spam blacklist?
Queste opzioni sono ordinate dalla più restrittiva alla meno restrittiva, bloccare l'intero dominio bloccherà tutti i collegamenti diretti a qualcosa proveniente da quel dominio.

Assicurati di non bloccare quei domini che hostano altri account utente come blogspot.com, geocities.com, ecc.",
	'spamdifftool_no_urls_detected' => "Nessun URL è stato rilevato.
Fai click <a href='$1'>qui</a> per tornare.",
	'spamdifftool_spam_link_text' => 'aggiungi a spam',
	'spamdifftool_option_domain' => 'tutti da questo dominio',
	'spamdifftool_option_subdomain' => 'tutti da questo sottodominio',
	'spamdifftool_option_directory' => 'questo sottodominio e directory',
	'spamdifftool_option_none' => 'niente',
	'spamdifftool_block' => 'Blocca:',
	'spamdifftool_submit_buttom' => 'Invia',
);

/** Japanese (日本語)
 * @author Fryed-peach
 * @author Hosiryuhosi
 */
$messages['ja'] = array(
	'spamdifftool' => 'スパム用ブラックリストの管理',
	'spamdifftool-desc' => 'スパム用ブラックリストに差分ページから新規項目を追加するための基本手段を提供する',
	'spamdifftool_cantedit' => 'あなたにはスパム用ブラックリストを編集する権限がありません。',
	'spamdifftool_notext' => "スパム用ブラックリストに追加する文字列はありません。<a href='$1'>ここ</a>をクリックして続行します。",
	'spamdifftool_confirm' => "これらの項目をスパム用ブラックリストに追加したいか確認してください。（問題を報告するには<a href='$1' target='new'>ここ</a>をクリックします）",
	'spamdifftool_summary' => 'スパム用ブラックリストに追加中',
	'spamdifftool_urls_detected' => '以下のURLが編集から検出されました。スパム用ブラックリストに追加したいのはどれですか？

各オプションは制限の強いものから弱いものの順に並んでいます。ドメイン全体のブロックはそのドメインに属するあらゆるリンクをブロックします。

blogspot.com や geocities.com といった、利用者アカウントを提供するものはドメイン全体をブロックしないように必ずしてください。',
	'spamdifftool_no_urls_detected' => "URLはひとつも検出されませんでした。<a href='$1'>ここ</a>をクリックして戻ります。",
	'spamdifftool_spam_link_text' => 'スパムに追加',
	'spamdifftool_option_domain' => 'このドメインのすべて',
	'spamdifftool_option_subdomain' => 'このサブドメインのすべて',
	'spamdifftool_option_directory' => 'このサブドメインとディレクトリ',
	'spamdifftool_option_none' => 'なし',
	'spamdifftool_block' => 'ブロック:',
	'spamdifftool_submit_buttom' => '送信',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 */
$messages['jv'] = array(
	'spamdifftool_spam_link_text' => 'tambahna ing spam',
	'spamdifftool_option_none' => 'ora ana',
	'spamdifftool_submit_buttom' => 'Kirim',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author Lovekhmer
 * @author Thearith
 */
$messages['km'] = array(
	'spamdifftool' => 'គ្រប់គ្រង​បញ្ជីខ្មៅ​សារឥតបានការ',
	'spamdifftool-desc' => 'ផ្ដល់​វិធីសាស្ត្រ​មូលដ្ឋាន​នៃ​ការ​បន្ថែម​ធាតុបញ្ចូល​ថ្មី​ទៅ​ក្នុងបញ្ជីខ្មៅ​សារឥតបានការ​ពី​ទំព័រផ្សេងគ្នា',
	'spamdifftool_cantedit' => 'សូម​អភ័យទោស-អ្នក​មិនមាន​សិទ្ធិ​ក្នុង​ការកែប្រែ​បញ្ជីខ្មៅ​សារឥតបានការ​ទេ​។​',
	'spamdifftool_notext' => "មិនមាន​អត្ថបទ​សម្រាប់​បន្ថែម​បញ្ជីខ្មៅ​សារឥតបានការ​។ ចុច<a href='$1'>ទីនេះ</a>ដើម្បី​បន្ត​។",
	'spamdifftool_confirm' => "សូមបព្ជាក់​ថា​អ្នក​ពិតជា​ចង់​បន្ថែម​ធាតុបញ្ចូល​ទាំងនេះ​ទៅ​ក្នុង​បញ្ជីខ្មៅ​សារឥតបានការ​​។
(ចុច<a href='$1' target='new'>ទីនេះ</a> ដើម្បី​រាយការណ៍​ពី​បញ្ហា)",
	'spamdifftool_summary' => 'បន្ថែម​ទៅក្នុង​បញ្ជីខ្មៅ​សារឥតបានការ​',
	'spamdifftool_no_urls_detected' => "រកមិនឃើញ url ។ ចុច <a href='$1'>ទីនេះ</a> ដើម្បី ត្រឡប់ក្រោយ ។",
	'spamdifftool_spam_link_text' => 'បន្ថែម​ចូលទៅ​ជា​សារឥតបានការ (spam)',
	'spamdifftool_option_domain' => 'ទាំងអស់​ពី​ដែន​នេះ',
	'spamdifftool_option_subdomain' => 'ទាំងអស់​ពី​ដែនរង​នេះ',
	'spamdifftool_option_directory' => 'ដែនរង និង​ថត​នេះ',
	'spamdifftool_option_none' => 'ទទេ',
	'spamdifftool_block' => 'ការហាមឃាត់៖',
	'spamdifftool_submit_buttom' => 'ដាក់ស្នើ',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'spamdifftool' => 'De „schwazze Leß“ för SPAM beärbeide',
	'spamdifftool-desc' => 'Ene Wääsch för neu Enndräsch en de „schwazze Leß“ för SPAM ze krijje, fun de Sigge met de Ongerscheede zwesche Versijohne uß.',
	'spamdifftool_cantedit' => 'Schadt — Do häß nit dat Rääsch, de „schwazze Leß“ jäje der <i lang="en">SPAM</i> ze ändere.',
	'spamdifftool_notext' => 'Mer han keine Tex för en de „schwazze Leß“ jäje der <i lang="en">SPAM</i> eren ze donn.

<a href="$1">Wigger maache!</a>',
	'spamdifftool_confirm' => 'Do moß norr_ens beshtähteje, dat De di Enndrääsch en de „schwazze Leß“ jäje der <i lang="en">SPAM</i> eren donn wells.

(<a href="$1" target="new">Donn e Problem melde!</a>)',
	'spamdifftool_summary' => 'Bei de „schwazze Leß“ jäe der <i lang="en">SPAM</i> dobei donn',
	'spamdifftool_urls_detected' => 'Hee di URLs kohme en dä Änderunge för, wat för en wullt Ehr dann
jez jähn en de „schwazze Leß“ jäje der <i lang="en">SPAM</i> han?
De Ennstellunge jonn fun de Shträngßte noh de Lesjehrßde.
En jannze Domain ze sperre deit jede Lengk verbeede, dä noh do jeiht.

Paß op, dat De nit janze Domains spächß, woh Metmaachersigge fun
dänne drop lijje, wi zem Beispell blogspot.com, geocities.com, un esu.',
	'spamdifftool_no_urls_detected' => 'Kein URLs jefonge.

<a href="$1">Zeröck jonn!</a>',
	'spamdifftool_spam_link_text' => 'en der <i lang="en">SPAM</i> donn',
	'spamdifftool_option_domain' => 'alles fun he dä Domain',
	'spamdifftool_option_subdomain' => 'alles fun he dä Ongerdomain',
	'spamdifftool_option_directory' => 'hee di Ongerdomain un dat Verzeichnis',
	'spamdifftool_option_none' => 'nix',
	'spamdifftool_block' => 'Sperre:',
	'spamdifftool_submit_buttom' => 'Faßhallde!',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Les Meloures
 * @author Robby
 */
$messages['lb'] = array(
	'spamdifftool' => 'Gestioun vun der schwaarzer Lëscht vum Spam',
	'spamdifftool-desc' => "Gëtt d'Méiglechkeet fir aus de Versiounsënnerscheeder nei Elementer op déi schwaarz Lëscht vum Spam derbäizesetzen",
	'spamdifftool_cantedit' => "Pardon - Dir hutt net déi néideg Rechter fir d'Schwaarz Lëscht vum Spam z'änneren.",
	'spamdifftool_notext' => "Et gëtt keen Text fir op d'Schwaarz Lëscht vum Spam derbäizesetzen.
Klickt <a href='$1'>hei</a> fir weiderzefueren.",
	'spamdifftool_confirm' => "Konfirméiert daat Dir dës Elementer op déi Schwaarz Lëscht vum Spam derbäisetze wëllt.
(Klickt <a href='$1' target='new'>hei</a> fir e Problem ze mellen.)",
	'spamdifftool_summary' => "Op d'schwaarz Lëscht vum Spam derbäisetzen",
	'spamdifftool_urls_detected' => "Dës URLen goufen an den Ännerunge fonnt, watfireng wëllt Dir op déi Schwaarz Lëscht vum Spam derbäisetzen?
Dës Optioune gi vu méi restriktiv op manner restriktiv. D'Späre vun engem ganzen Domain spärt all Linken op alles wat vun dem Domain kënnt.

 Vergewëssert Iech datt Dir net ganz Domaine spärt déi Benotzerkonten hosten, esou wéi blogspot.com, geocities.com, asw.",
	'spamdifftool_no_urls_detected' => "Et goufe keng URLe fonnt.
Klickt w.e.g. <a href='$1'>heihi</a> fir zréck.",
	'spamdifftool_spam_link_text' => 'bei de Spam setzen',
	'spamdifftool_option_domain' => 'all vun dësem Domain',
	'spamdifftool_option_subdomain' => 'all vun dësem Subdomain',
	'spamdifftool_option_none' => 'näischt',
	'spamdifftool_block' => 'Spär:',
	'spamdifftool_submit_buttom' => 'Späicheren',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'spamdifftool_submit_buttom' => 'സമര്‍പ്പിക്കുക',
);

/** Marathi (मराठी)
 * @author Kaustubh
 * @author Mahitgar
 */
$messages['mr'] = array(
	'spamdifftool' => 'स्पम ब्लकलिस्टचे व्यवस्थापन करा',
	'spamdifftool-desc' => 'फरक पानांमधून स्पॅम ब्लकलिस्ट मध्ये नोंदी वाढविण्याचा सोपा मार्ग देते',
	'spamdifftool_cantedit' => 'माफकरा - स्पॅम ब्लॅकलिस्ट संपादित करण्याची तुम्हाला परवानगी नाही.',
	'spamdifftool_notext' => "स्पॅम ब्लॅकलिस्ट मध्ये वाढविण्यासाठी मजकूर नाही.
पुढे जाण्यासाठी <a href='$1'>इथे</a> टिचकी द्या.",
	'spamdifftool_confirm' => "तुम्ही या नोंदी स्पॅम ब्लॅकलिस्ट मध्ये वाढवू इच्छिता याची खात्री करा.
(अडचण नोंदविण्यासाठी <a href='$1' target='new'>इथे</a> टिचकी द्या.)",
	'spamdifftool_summary' => 'स्पॅम ब्लॅकलिस्ट मध्ये वाढवित आहे',
	'spamdifftool_urls_detected' => 'संपादनामध्ये खालील URL आढळल्या आहेत, स्पॅम ब्लॅकलिस्ट मध्ये या पैकी कुठल्या URL तुम्ही घालू इच्छिता?
हे विकल्प जास्तीत जास्त त्रासदायक पासून कमी त्रासदायक प्रमाणे दिले जातात, एखादा पूर्ण डोमेन ब्लॉक केल्यास त्या डोमेन मधील सर्व दुवे ब्लॉक केले जातील.

जे डोमेन सदस्यनावे वापरतात त्या डोमेनला पूर्ण ब्लॉक न करण्याची खात्री करा, उदा. blogspot.com, geocities.com, इ.',
	'spamdifftool_no_urls_detected' => "एकही URL सापडली नाही.
परत जाण्यासाठी <a href='$1'>इथे</a> टिचकी द्या.",
	'spamdifftool_spam_link_text' => 'स्पॅम मध्ये वाढवा',
	'spamdifftool_option_domain' => 'या डोमेन मधील सर्व',
	'spamdifftool_option_subdomain' => 'या सबडोमेन मधील सर्व',
	'spamdifftool_option_directory' => 'हा सबडोमेन व डिरेक्टरी',
	'spamdifftool_option_none' => 'कोणतेचानाही',
	'spamdifftool_block' => 'ब्लॉक:',
	'spamdifftool_submit_buttom' => 'पाठवा',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'spamdifftool_option_domain' => 'те доменэнть весемензэ',
	'spamdifftool_option_subdomain' => 'те алкс доменэнть весемензэ',
	'spamdifftool_option_directory' => 'те алкс доменэнть ды директориянть',
	'spamdifftool_option_none' => 'мезеяк а теемс',
	'spamdifftool_block' => 'Озавтомс саймес:',
	'spamdifftool_submit_buttom' => 'Максомс',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'spamdifftool_spam_link_text' => 'ticcēntilīz spamhuīc',
	'spamdifftool_option_none' => 'ahtlein',
	'spamdifftool_submit_buttom' => 'Tiquihuāz',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'spamdifftool_option_none' => 'nix',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 * @author Tvdm
 */
$messages['nl'] = array(
	'spamdifftool' => 'Zwarte lijst tegen spam beheren',
	'spamdifftool-desc' => 'Maakt het mogelijk nieuwe regels aan de zwarte lijst voor spam toe te voegen op basis van verschillen',
	'spamdifftool_cantedit' => 'U hebt geen rechten om de zwarte lijst tegen spam te bewerken.',
	'spamdifftool_notext' => "Er is geen tekst om toe te voegen aan de zwarte lijst tegen spam. Klik <a href='$1'>hier</a> om door te gaan.",
	'spamdifftool_confirm' => "Bevestig dat u deze namen aan de zwarte lijst tegen spam wil toevoegen (klik <a href='$1' target='new'>hier</a> om een probleem te melden).",
	'spamdifftool_summary' => 'Toevoegen aan de zwarte lijst tegen spam',
	'spamdifftool_urls_detected' => "In de bewerking(en) zijn de volgende URL's aangetroffen.
Welke wilt u toevoegen aan de zwarte lijst voor spam?
Deze opties gaan van meer beperkend naar minder beperkend.
Het blokkeren van een volledig domein betekent dat geen enkele verwijzing naar dat domein wordt toegelaten.

Zorg dat u niet zomaar volledige domeinen blokkeert waar gebruikers bestaan, zoals blogspot.com, geocities.com, enzovoort.",
	'spamdifftool_no_urls_detected' => "Er werden geen URL's gevonden. Klik <a href='$1'>hier</a> om terug te keren.",
	'spamdifftool_spam_link_text' => 'toevoegen aan spam',
	'spamdifftool_option_domain' => 'alles van dit domein',
	'spamdifftool_option_subdomain' => 'alles van dit subdomein',
	'spamdifftool_option_directory' => 'dit subdomein en deze map',
	'spamdifftool_option_none' => 'niets',
	'spamdifftool_block' => 'Blokkeren:',
	'spamdifftool_submit_buttom' => 'OK',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Frokor
 * @author Harald Khan
 */
$messages['nn'] = array(
	'spamdifftool' => 'Handtering av spamsvartelista',
	'spamdifftool-desc' => 'Gjev ein enkel måte å legge til nye element i spamsvartelista fra diffsider',
	'spamdifftool_cantedit' => 'Du har diverre ikkje tilgang til å endre spamsvartelista.',
	'spamdifftool_notext' => 'Ingen tekst vart lagt til i spamsvartelista. Klikk <a href=\'$1\'">her</a> for å halde fram.',
	'spamdifftool_confirm' => "Stadfest at du vil legge til følgjande postar i spamsvartelista. (Rapporter eit problem <a href='$1' target='new'>her</a>.)",
	'spamdifftool_summary' => 'Legg til i spamsvartelista',
	'spamdifftool_urls_detected' => 'Under er ei liste over URL-ar som vart funne i endringa. 
Velg dei du vil legge til i spamsvartelista. 
Desse vala står i rekkefølgja strengast til mildast, blokkering av heile domenet vil blokkere alle lenkjer til alt som kjem frå dette domenet.

Ikkje blokker heile domene til sider som er vert for mange brukarar, som blogspot.com, geocities.com osv.',
	'spamdifftool_no_urls_detected' => "Fann ingen URL-ar. <a href='$1'>Gå tilbake</a>.",
	'spamdifftool_spam_link_text' => 'legg til i spamlista',
	'spamdifftool_option_domain' => 'heile domenet',
	'spamdifftool_option_subdomain' => 'heile underomenet',
	'spamdifftool_option_directory' => 'detter underdomenet og mappa',
	'spamdifftool_option_none' => 'ingenting',
	'spamdifftool_block' => 'Blokker:',
	'spamdifftool_submit_buttom' => 'Legg til',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'spamdifftool' => 'Håndtering av spamsvartelisten',
	'spamdifftool-desc' => 'Gir en enkel måte å legge til nye elementer i spamsvartelisten fra diffsider',
	'spamdifftool_cantedit' => 'Du har dessverre ikke rettighet til å redigere spamsvartelisten.',
	'spamdifftool_notext' => 'Ingen tekst ble lagt til i spamsvartelisten. Klikk <a href=\'$1\'">her</a> for å fortsette.',
	'spamdifftool_confirm' => "Bekreft at du vil legge til følgende poster i spamsvartelisten. (Rapporter et problem <a href='$1' target='new'>her</a>.)",
	'spamdifftool_summary' => 'Legger til i spamsvartelisten',
	'spamdifftool_urls_detected' => 'Nedenfr listes de URL-ene som ble funnet i redigeringen;
hvilken av dem vil du legge til i spamsvartelisten?
Disse valgmulighetene står i rekkefølgen strengest til mildest, blokkering av hele domenet vil blokkere alle lenker til alt som kommer fra det domenet.

Ikke blikker hele domener til sider som er vert for mange brukere, type blogspot.com, geocities.com osv.',
	'spamdifftool_no_urls_detected' => "Ingen URL-er funnet. <a href='$1'>Gå tilbake</a>.",
	'spamdifftool_spam_link_text' => 'legg til i spamlisten',
	'spamdifftool_option_domain' => 'hele domenet',
	'spamdifftool_option_subdomain' => 'hele underdomenet',
	'spamdifftool_option_directory' => 'dette underdomenet og mappen',
	'spamdifftool_option_none' => 'ingenting',
	'spamdifftool_block' => 'Blokker:',
	'spamdifftool_submit_buttom' => 'Legg til',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'spamdifftool' => 'Gestion de la Lista Negra dels Spams',
	'spamdifftool-desc' => "Provesís un metòde simple per apondre d'entradas dins la lista negra dels spams a partir de las dif",
	'spamdifftool_cantedit' => 'O planhèm - Avètz pas la permission d’editar la Lista Negra dels Spams.',
	'spamdifftool_notext' => "I a pas de tèxte d'apondre a la Lista Negra dels Spams. Clicatz <a href='$1'>aicí</a> per contunhar.",
	'spamdifftool_confirm' => "Confirmatz que volètz apondre aquestas entradas dins la Lista Negra dels Spams. (Clicatz <a href='$1' target='new'>aicí</a> per senhalar tot problèma.)",
	'spamdifftool_summary' => 'Apondut a la Tièra Negra dels Spams',
	'spamdifftool_urls_detected' => "Las URLs seguentas son estadas detectadas dins aquestas modificacions.
Quinas son las que volètz apondre a la Lista Negra dels Spams ?
Aquestas opcions van de las mai restrictivas cap a las mens restrictivas.
Lo blocatge d’un nom de domeni entièr blocarà totes los ligams que provenon d'aqueste.

Asseguratz-vos de blocar pas de domenis entièrs que detenon d'unes comptadors d'utilizaires tals coma blogspot.com, geocities.com, etc.",
	'spamdifftool_no_urls_detected' => "Cap d'URL es pas estada detectada. Clicatz <a href='$1'>aicí</a> per tornar en rèire",
	'spamdifftool_spam_link_text' => 'apondre als spams',
	'spamdifftool_option_domain' => 'tot dempuèi aqueste domeni',
	'spamdifftool_option_subdomain' => 'tot dempuèi aqueste sosdomeni',
	'spamdifftool_option_directory' => 'aqueste sosdomeni e aqueste repertòri',
	'spamdifftool_option_none' => 'Nonrés',
	'spamdifftool_block' => 'Blocar :',
	'spamdifftool_submit_buttom' => 'Sometre',
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$messages['os'] = array(
	'spamdifftool_submit_buttom' => 'Рарвит',
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'spamdifftool_option_none' => 'nix',
);

/** Polish (Polski)
 * @author Airwolf
 * @author Maikking
 * @author Sp5uhe
 * @author Wpedzich
 */
$messages['pl'] = array(
	'spamdifftool' => 'Zarządzaj czarną listą dla spamu',
	'spamdifftool-desc' => 'Umożliwia na stronie porównania wersji dodawanie nowych wpisów do czarnej listy spamu',
	'spamdifftool_cantedit' => 'Nie masz uprawnień do edytowania tej strony.',
	'spamdifftool_notext' => "Brak tekstu do dodania do czarnej listy spamu.
Kliknij <a href='$1'>tutaj,</a> aby kontynuować.",
	'spamdifftool_confirm' => "Potwierdź, że chcesz dodać wpisy do czarnej listy spam.
(Kliknij <a href='$1' target='new'>tutaj,</a> aby zgłosić problem.)",
	'spamdifftool_summary' => 'Dodawanie do czarnej listy spamu',
	'spamdifftool_urls_detected' => 'Poniższe adresy URL zostały wykryte w edycji (edycjach). Określ które z nich chcesz dodać do czarnej listy filtru antyspamowego.
Opcje posortowane są w kolejności od bardziej do mniej restrykcyjnych. Zablokowanie całej domeny spowoduje blokadę wszystkich linków prowadzących gdziekolwiek do tej domeny.

Pamiętaj, aby nie blokować całych domen obsługujących wiele stron użytkowników jak home.pl, prv.pl itp.',
	'spamdifftool_no_urls_detected' => "Nie wykryto żadnych adresów URL.
Kliknij <a href='$1'>tutaj</a>, żeby wrócić do poprzedniej strony.",
	'spamdifftool_spam_link_text' => 'dodaj do spamu',
	'spamdifftool_option_domain' => 'wszystkie z tej domeny',
	'spamdifftool_option_subdomain' => 'wszystkie z tej domeny',
	'spamdifftool_option_directory' => 'ta poddomena i katalog',
	'spamdifftool_option_none' => 'nic',
	'spamdifftool_block' => 'Blokuj:',
	'spamdifftool_submit_buttom' => 'Wyślij',
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
	'spamdifftool' => 'Gerir a lista negra de spam',
	'spamdifftool-desc' => 'Fornece uma forma básica de adicionar novas entradas à lista negra de spam a partir de páginas de diferenças',
	'spamdifftool_cantedit' => 'As nossas desculpas - você não tem permissão para editar a lista negra de spam.',
	'spamdifftool_notext' => "Não há qualquer texto para adicionar à lista negra de spam.
Clique <a href='$1'>aqui</a> para continuar.",
	'spamdifftool_confirm' => "Confirme que pretende adicionar estas entradas à lista negra de spam.
(Clique <a href='$1' target='new'>aqui</a> para reportar um problema.)",
	'spamdifftool_summary' => 'A adicionar à lista negra de spam',
	'spamdifftool_urls_detected' => 'As seguintes URLs foram detectadas na(s) edição(ões). Quais pretende que sejam adicionadas à lista negra de spam?
Estas opções estão ordenadas da mais restritiva para a menos restritiva. O bloqueio de um domínio inteiro irá bloquear todas a ligações provenientes daquele domínio.

Certifique-se de que não bloqueia domínios inteiros que sejam anfitriões de contas de utilizadores, tais como blogspot.com, geocities.com, etc.',
	'spamdifftool_no_urls_detected' => "Nenhuns URL foram detectados.
Carregue <a href='$1'>aqui</a> para voltar.",
	'spamdifftool_spam_link_text' => 'adicionar como spam',
	'spamdifftool_option_domain' => 'todos deste domínio',
	'spamdifftool_option_subdomain' => 'todos deste subdomínio',
	'spamdifftool_option_directory' => 'este subdomínio e directório',
	'spamdifftool_option_none' => 'nada',
	'spamdifftool_block' => 'Bloquear:',
	'spamdifftool_submit_buttom' => 'Submeter',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 */
$messages['pt-br'] = array(
	'spamdifftool' => 'Gerenciar a lista negra de spam',
	'spamdifftool-desc' => 'Fornece uma forma básica de adicionar novas entradas à lista negra de spam a partir de páginas de diferenças',
	'spamdifftool_cantedit' => 'As nossas desculpas - você não tem permissão para editar a lista negra de spam.',
	'spamdifftool_notext' => "Não há qualquer texto para adicionar à lista negra de spam.
Clique <a href='$1'>aqui</a> para continuar.",
	'spamdifftool_confirm' => "Confirme que pretende adicionar estas entradas à lista negra de spam.
(Clique <a href='$1' target='new'>aqui</a> para reportar um problema.)",
	'spamdifftool_summary' => 'Adicionando a lista negra de spam',
	'spamdifftool_urls_detected' => 'As seguintes URLs foram detectadas na(s) edição(ões). Quais pretende que sejam adicionadas à lista negra de spam?
Estas opções estão ordenadas da mais restritiva para a menos restritiva. O bloqueio de um domínio inteiro irá bloquear todas a ligações provenientes daquele domínio.

Certifique-se de que não bloqueia domínios inteiros que sejam servidores de contas de utilizadores, tais como blogspot.com, geocities.com, etc.',
	'spamdifftool_no_urls_detected' => "Nenhuma URL foi detectada.
Clique <a href='$1'>aqui</a> para voltar.",
	'spamdifftool_spam_link_text' => 'adicionar como spam',
	'spamdifftool_option_domain' => 'todos deste domínio',
	'spamdifftool_option_subdomain' => 'todos deste subdomínio',
	'spamdifftool_option_directory' => 'este subdomínio e diretório',
	'spamdifftool_option_none' => 'nada',
	'spamdifftool_block' => 'Bloquear:',
	'spamdifftool_submit_buttom' => 'Enviar',
);

/** Romanian (Română)
 * @author Firilacroco
 */
$messages['ro'] = array(
	'spamdifftool_spam_link_text' => 'adaugă la spam',
	'spamdifftool_option_domain' => 'toate din acest domeniu',
	'spamdifftool_option_subdomain' => 'toate de pe acest subdomeniu',
	'spamdifftool_option_directory' => 'acest subdomeniu şi directorul',
	'spamdifftool_option_none' => 'nimic',
	'spamdifftool_block' => 'Blocare:',
	'spamdifftool_submit_buttom' => 'Trimite',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'spamdifftool_option_none' => 'ninde',
	'spamdifftool_block' => 'Blocche:',
	'spamdifftool_submit_buttom' => 'Conferme',
);

/** Russian (Русский)
 * @author Aleksandrit
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'spamdifftool' => 'Управление чёрным списком спама',
	'spamdifftool-desc' => 'Позволяет легко добавлять новые записи в чёрный список спама со страниц сравнения версий',
	'spamdifftool_cantedit' => 'Извините, у вас нет разрешения изменять чёрный список спама.',
	'spamdifftool_notext' => "Нет текста для добавления в чёрный список спама.
Нажмите <a href='$1'>здесь</a>, чтобы продолжить.",
	'spamdifftool_confirm' => "Подтвердите, что вы хотите добавить эти записи в чёрный список спама.
(Нажмите <a href='$1' target='new'>здесь</a>, чтобы сообщить о проблеме.)",
	'spamdifftool_summary' => 'Добавить в чёрный список спама',
	'spamdifftool_urls_detected' => 'Следующие адреса были обнаружены в указанной правке, какие из них следует добавить в чёрный список спама?
Настройки расположены в порядке от наиболее строгих ограничений к менее строгим, блокировка всего домена заблокирует все ссылки, ведущие на любой адрес в этом домене.

Убедитесь, что вы не блокируете домен, содержащий страницы разных пользователей, например blogspot.com, narod.ru и подобные.',
	'spamdifftool_no_urls_detected' => "Не обнаружено адресов.
Нажмите <a href='$1'>здесь</a>, чтобы вернуться.",
	'spamdifftool_spam_link_text' => 'добавить в спам',
	'spamdifftool_option_domain' => 'всё из этого домена',
	'spamdifftool_option_subdomain' => 'всё из этого поддомена',
	'spamdifftool_option_directory' => 'этого субдомена и директории',
	'spamdifftool_option_none' => 'ничего',
	'spamdifftool_block' => 'Блокировка:',
	'spamdifftool_submit_buttom' => 'Отправить',
);

/** Sicilian (Sicilianu)
 * @author Santu
 */
$messages['scn'] = array(
	'spamdifftool' => 'Guverna la spam blacklist',
	'spamdifftool-desc' => 'Prucura nu sèmprici modu pi mintìri valuri novi a la  spam blacklist dê pàggini dû parauni ntra li virsioni',
	'spamdifftool_cantedit' => 'Hà scusari, ma nun pussedi li pirmessi pi canciari la spam blacklist.',
	'spamdifftool_notext' => "Non cìè nuddu testu di jùnciri a la spam blacklist.
Fà clic <a href='$1'>ccà</a> pi jiri avanti.",
	'spamdifftool_confirm' => "Cunferma la tà ntinzioni di juncìricci chisti valuri a la spam blacklist.
(Fà clic <a href='$1' target='new'>ccà</a> pi signaliari nu prubbrema.)",
	'spamdifftool_summary' => 'Junciuta di spam blacklist',
	'spamdifftool_urls_detected' => "Li URL ccà di sèculu foru scupruti ntê mudifichi, quali d'iddi vulissi juncìricci a la spam blacklist?
L'òrdini di sti opzioni sunnu misi di la cchiossai a la cchiù picca ristrittiva, abbluccari tuttu lu dumìniu voli diri abbluccari tutti li culligamenti a quarcosa ca veni di ddù dumìniu.

Accura a non bluccari ssi dumìnii ca hostanu àutri account utenti comu putìssiru èssiri  blogspot.com, geocities.com, ecc.",
	'spamdifftool_no_urls_detected' => "Nuddu URL vinni rilivatu.
Fà click <a href='$1'>ccà</a> pi turnari arredi.",
	'spamdifftool_spam_link_text' => 'Jùnciri a li spam',
	'spamdifftool_option_domain' => 'tutti di chistu dumìniu',
	'spamdifftool_option_subdomain' => 'tutti di chistu suttadumìniu',
	'spamdifftool_option_directory' => 'Stu suttadumìniu e directory',
	'spamdifftool_option_none' => 'nenti',
	'spamdifftool_block' => 'Abblocca:',
	'spamdifftool_submit_buttom' => 'Manna',
);

/** Serbo-Croatian (Srpskohrvatski / Српскохрватски)
 * @author OC Ripper
 */
$messages['sh'] = array(
	'spamdifftool_submit_buttom' => 'Unesi',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'spamdifftool' => 'Spravovať Čiernu listinu spamu',
	'spamdifftool-desc' => 'Poskytuje základný spôsob pridávania nových záznamov na Čiernu listinu spamu zo stránok rozdielov revízií',
	'spamdifftool_cantedit' => 'Prepáčte, nemáte oprávnenie upravovať Čiernu listinu spamu',
	'spamdifftool_notext' => "Nie je čo pridať na Čiernu listinu spamu. Pokračujte <a href='$1'>kliknutím sem</a>",
	'spamdifftool_confirm' => "Potvrďte, že chcete pridať tieto položky na Čiernu listinu spamu. (Môžete tiež <a href='$1' target='new'>nahlásiť problém</a>.)",
	'spamdifftool_summary' => 'Pridanie na Čiernu listinu spamu',
	'spamdifftool_urls_detected' => 'V úprave boli zistené nasledovné URL.
Ktoré z nich chcete pridať na čiernu listinu spamu?
Tieto voľby sú v poradí od najreštriktívnejších po menej reštriktívne. Zablokovanie celej domény zablokuje všetky odkazy na danú doménu.

Určite nezablokujte celé domény, ktoré úmožňujú tvorbu používateľských účtov ako blogspot.com, geocities.com atď.',
	'spamdifftool_no_urls_detected' => "Neboli zistené žiadne URL. Vráťte sa späť <a href='$1'>kliknutím sem</a>.",
	'spamdifftool_spam_link_text' => 'pridať medzi spam',
	'spamdifftool_option_domain' => 'všetky z tejto domény',
	'spamdifftool_option_subdomain' => 'všetky z tejto subdomény',
	'spamdifftool_option_directory' => 'túto subdoménu a adresár',
	'spamdifftool_option_none' => 'nič',
	'spamdifftool_block' => 'Blokovať:',
	'spamdifftool_submit_buttom' => 'Odoslať',
);

/** Serbian Cyrillic ekavian (Српски (ћирилица))
 * @author Sasa Stefanovic
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'spamdifftool_no_urls_detected' => "Нису пронађени ликови.
Кликните <a href='$1'>овде</a> да се вратите.",
	'spamdifftool_spam_link_text' => 'додај као спам',
	'spamdifftool_option_domain' => 'све од овог домена',
	'spamdifftool_option_subdomain' => 'све од овог поддомена',
	'spamdifftool_option_directory' => 'овај поддомен и директоријум',
	'spamdifftool_option_none' => 'ништа',
	'spamdifftool_block' => 'Блок:',
	'spamdifftool_submit_buttom' => 'Прихвати',
);

/** Serbian Latin ekavian (Srpski (latinica))
 * @author Michaello
 */
$messages['sr-el'] = array(
	'spamdifftool_no_urls_detected' => "Nisu pronađeni likovi.
Kliknite <a href='$1'>ovde</a> da se vratite.",
	'spamdifftool_spam_link_text' => 'dodaj kao spam',
	'spamdifftool_option_domain' => 'sve od ovog domena',
	'spamdifftool_option_subdomain' => 'sve od ovog poddomena',
	'spamdifftool_option_directory' => 'ovaj poddomen i direktorijum',
	'spamdifftool_option_none' => 'ništa',
	'spamdifftool_block' => 'Blok:',
	'spamdifftool_submit_buttom' => 'Prihvati',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'spamdifftool' => 'Spam-Blacklist beoarbaidje',
	'spamdifftool-desc' => 'Rakt n Wai näie Iendraage bietoutouföigjen tou ju Spamblacklist uut Versionsunnerscheede',
	'spamdifftool_cantedit' => 'Du hääst neen Begjuchtigenge tou ju Beoarbaidenge fon ju Spam-Blacklist.',
	'spamdifftool_notext' => "Dät rakt naan Text, die der an ju Spam-Blacklist bietouföiged wäide kuude. Klik <a href='$1'>hier</a> toun Fääregungen.",
	'spamdifftool_confirm' => "Bestäätigje, dät du disse Iendraage an ju Spam-Blacklist bietouföigje moatest. (Klik <a href='$1' target='new'>hier</a>, uum n Problem tou mäldjen.)",
	'spamdifftool_summary' => 'Tou ju Spam-Blacklist bietouföigje',
	'spamdifftool_urls_detected' => 'Do foulgjende URLs wuuden in ju Beoarbaidenge fuunen;
wäkke deerfon moatest du ju Spam-Blacklist bietouföigje?
Ju Riegenfoulge gungt fon gjucht ienäängjend bit minner ienäängjend;
dät Iendreegen fon n gans Domain blokkiert aal Ferbiendengen, do der fon dissen Domain kuume.

Staal sicher, dät du nit komplette Domains blokkierst, do der separate Benutserinhoolde kloorstaale, as t.B. blogspot.com, geocities.com usw.',
	'spamdifftool_no_urls_detected' => "Der wuuden neen URLs fuunen. Klik <a href='$1'>hier</a>, uum touräächtougungen.",
	'spamdifftool_spam_link_text' => 'tou Spam bietouföigje',
	'spamdifftool_option_domain' => 'aal fon dissen Domain',
	'spamdifftool_option_subdomain' => 'aal fon dissen Subdomain',
	'spamdifftool_option_directory' => 'disse Subdomain un dit Ferteeknis',
	'spamdifftool_option_none' => 'niks',
	'spamdifftool_block' => 'Speere:',
	'spamdifftool_submit_buttom' => 'Spiekerje',
);

/** Swedish (Svenska)
 * @author Lejonel
 * @author M.M.S.
 */
$messages['sv'] = array(
	'spamdifftool' => 'Hantera svarta listan för spam',
	'spamdifftool-desc' => 'Ger en enkel möjlighet att lägga till nya element i spamsvartlistan från diffsidor',
	'spamdifftool_cantedit' => 'Du har tyvärr inte behörighet att redigera svarta listan för spam.',
	'spamdifftool_notext' => "Ingen text lades till i svarta listan för spam. Klicka <a href='$1'>här</a> för att fortsätta.",
	'spamdifftool_confirm' => "Bekräfta att du vill lägga till följande poster i svarta listan för spam. (Rapportera problem <a href='$1' target='new'>här</a>.)",
	'spamdifftool_summary' => 'Utökar svarta listan för spam',
	'spamdifftool_urls_detected' => 'Härunder listas de URL:er som hittades i redigeringen.
Välj de du vill lägga till i svarta lista för spam.
Blockeringsalternativen är ordnade från mer omfattande till mindre omfattande blockering.
Om en hel domän blockeras så stoppas alla länkar till den domänen.

Undvik att helt blockera domäner som är värd för många olika användare, såsom blogspot.com, geocities.com, m.fl.',
	'spamdifftool_no_urls_detected' => "Ingen URL hittades. <a href='$1'>Gå tillbaka</a>.",
	'spamdifftool_spam_link_text' => 'lägg till i spamlistan',
	'spamdifftool_option_domain' => 'hela domänen',
	'spamdifftool_option_subdomain' => 'hela subdomänen',
	'spamdifftool_option_directory' => 'denna katalog i subdomänen',
	'spamdifftool_option_none' => 'ingenting',
	'spamdifftool_block' => 'Blockera:',
	'spamdifftool_submit_buttom' => 'Lägg till',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'spamdifftool_option_domain' => 'ఈ డొమైన్ నుండి అన్నీ',
	'spamdifftool_option_subdomain' => 'ఈ ఉపడొమైను నుండి అన్నీ',
	'spamdifftool_option_none' => 'ఏమీలేదు',
	'spamdifftool_block' => 'నిరోధం:',
	'spamdifftool_submit_buttom' => 'దాఖలుచెయ్యి',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'spamdifftool' => 'Феҳристи сиёҳи харобкориро идора кунед',
	'spamdifftool_cantedit' => 'Бубахшед - шумо иҷозаи вироиши феҳристи сиёҳи ҳаразномаро надоред.',
	'spamdifftool_spam_link_text' => 'ба ҳаразнома илова кунед',
	'spamdifftool_option_none' => 'ҳеҷчиз',
	'spamdifftool_block' => 'Бастан:',
	'spamdifftool_submit_buttom' => 'Ирсол',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'spamdifftool' => "Pangasiwaan ang talaan ng pinagbabawalang mga \"manlulusbo\" (''spam'')",
	'spamdifftool-desc' => "Nagbibigay ng isang payak na paraan ng pagdaragdag ng bagong mga entrada/lahok sa talaan ng pinagbabawalang mga \"manlulusob\" (''spam'') mula sa iba't ibang mga pahina",
	'spamdifftool_cantedit' => "Paumanhin - wala kang pahintulot na baguhin ang talaan ng pinagbabawalang mga \"manlulusob\" (''spam'').",
	'spamdifftool_notext' => "Walang tekstong mapagdaragdagan ng talaan ng pinagbabawalang mga \"manlulusob\" (''spam'').
Pindutin <a href='\$1'>dito</a> upang makapagpatuloy.",
	'spamdifftool_confirm' => "Tiyakin kung ibig mong idagdag ang mga lahok (entrada) na ito sa talaan ng pinagbabawalang mga \"manlulusob\" (''spam'').
(Pindutin <a href='\$1' target='bago'>dito</a> upang makapag-ulat ng suliranin/problema.)",
	'spamdifftool_summary' => "Idinaragdag sa talaan ng pinagbabawalang mga \"manlulusob\" (''spam'').",
	'spamdifftool_urls_detected' => "Napansin ang sumusunod na mga URL sa loob ng (mga) pagbabago, alin sa mga ito ang nais mong idagdag sa talaan ng pinagbabawalang mga \"manlulusob\" (''spam'')?

Nakaayos ang mga pagpipiliang ito mula sa mas mahigpit magpahanggang sa mas maluwag, ang pagharang sa buong dominyo ay makahahadlang sa lahat ng mga kawing patungo sa anumang bagay na manggagaling mula sa dominyong iyon.

Tiyaking hindi mahaharang/mahahadlangan ang kabuoan ng mga dominyong nagpapasinaya sa mga kuwenta/akawnt ng tagagamit, katulad ng blogspot.com, geocities.com, atbp.",
	'spamdifftool_no_urls_detected' => "Walang napansing mga ''url''.
Pindutin <a href='$1'>dito</a> para makabalik.",
	'spamdifftool_spam_link_text' => "idagdag sa mga \"manlulusob\" (''spam'')",
	'spamdifftool_option_domain' => 'lahat ng nagmula sa dominyong ito',
	'spamdifftool_option_subdomain' => 'lahat ng mula sa kabahaging dominyong (subdominyo) ito',
	'spamdifftool_option_directory' => 'ang kabahaging dominyo (subdominyo) at direktoryong ito',
	'spamdifftool_option_none' => 'wala',
	'spamdifftool_block' => 'Harang:',
	'spamdifftool_submit_buttom' => 'Ipasa',
);

/** Turkish (Türkçe)
 * @author Joseph
 * @author Karduelis
 */
$messages['tr'] = array(
	'spamdifftool' => 'Spam karalistesini yönet',
	'spamdifftool-desc' => 'Spam karalistesine fark sayfalarından yeni girdiler eklemek için basit bir yol sağlar',
	'spamdifftool_cantedit' => 'Üzgünüz - spam karalistesini değiştirmek için izniniz yok.',
	'spamdifftool_notext' => "Spam karalistesine eklenecek metin yok.
Devam etmek için <a href='$1'>buraya</a> tıklayın.",
	'spamdifftool_confirm' => "Bu girdileri spam karalistesine eklemek istediğinizi onaylayın.
(Bir sorun bildirmek için <a href='$1' target='new'>buraya</a> tıklayın.)",
	'spamdifftool_summary' => 'Spam kara listesine ekleniyor',
	'spamdifftool_urls_detected' => 'Değişiklikte, aşağıdaki URLler algılandı, hangilerini spam karalistesine eklemek istersiniz?
Bu seçenekler fazla kısıtlayıcıdan az kısıtlayıcıya sıralanır, bütün domaini engellemek bu domainden gelen tüm bağlantıları engeller.

Kullanıcı hesapları barındıran domainleri -blogspot.com, geocities.com gibi- engellemediğinizden emin olun.',
	'spamdifftool_no_urls_detected' => "Hiçbir url algılanmadı.
Geri dönmek için <a href='$1'>buraya</a> tıklayın.",
	'spamdifftool_spam_link_text' => "spam'e ekle",
	'spamdifftool_option_domain' => 'bu domainden hepsini',
	'spamdifftool_option_subdomain' => 'bu alt domainden hepsini',
	'spamdifftool_option_directory' => 'bu alt domain ve dizin',
	'spamdifftool_option_none' => 'hiçbir şey',
	'spamdifftool_block' => 'Engelle:',
	'spamdifftool_submit_buttom' => 'Gönder',
);

/** Ukrainian (Українська)
 * @author Aleksandrit
 */
$messages['uk'] = array(
	'spamdifftool' => 'Управління чорним списком спаму',
	'spamdifftool-desc' => 'Дозволяє легко додавати нові записи в чорний список спаму зі сторінок порівняння версій',
	'spamdifftool_cantedit' => 'Вибачте, у вас немає дозволу змінювати чорний список спаму.',
	'spamdifftool_notext' => "Немає тексту для додавання в чорний список спаму.
Натисніть <a href='$1'>тут</a>, щоб продовжити.",
	'spamdifftool_confirm' => "Підтвердите, що ви хочете додати ці записи в чорний список спаму. 
(Натисніть <a href='$1' target='new'>тут</a>, щоб повідомити про проблему.)",
	'spamdifftool_summary' => 'Додати до чорного списку спаму',
	'spamdifftool_urls_detected' => 'Наступні адреси були виявлені у зазначеній правці, які з них слід додати в чорний список спаму? 
Налаштування розташовані в порядку від найбільш суворих обмежень до менш строгих, блокування всього домену заблокує всі посилання, що ведуть на будь-яку адресу в цьому домені.

Переконайтеся, що ви не блокуєте домен, що містить сторінки різних користувачів, наприклад blogspot.com, narod.ru і подібні.',
	'spamdifftool_no_urls_detected' => "Не виявлено адрес. 
Натисніть <a href='$1'>тут </a>, щоб повернутися.",
	'spamdifftool_spam_link_text' => 'додати в спам',
	'spamdifftool_option_domain' => 'все з цього домену',
	'spamdifftool_option_subdomain' => 'все з цього субдомену',
	'spamdifftool_option_directory' => 'цього субдомену і директорії',
	'spamdifftool_option_none' => 'нічого',
	'spamdifftool_block' => 'Блокування:',
	'spamdifftool_submit_buttom' => 'Відправити',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'spamdifftool' => 'Gestion de la lista nera del spam',
	'spamdifftool-desc' => 'Fornisse na senpliçe maniera par zontar valori novi a la lista nera del spam da le pàxene del confronto fra versioni',
	'spamdifftool_cantedit' => 'No ti gà i parmessi necessari par modificar la lista nera del spam.',
	'spamdifftool_notext' => "No ghe xe nissun testo da zontar a la lista nera del spam.
Struca <a href='$1'>qua</a> par continuar.",
	'spamdifftool_confirm' => "Conferma che te voli zontar sti valori a la lista nera del spam.
(Struca <a href='$1' target='new'>qua</a> par segnalar un problema.)",
	'spamdifftool_summary' => 'Zonto a la lista nera del spam',
	'spamdifftool_urls_detected' => "In tele modifiche xe stà catà i seguenti URL, quale vuto zontar a la lista nera del spam?
Ste opzioni le xe ordinà da la pi restritiva a la manco restritiva: blocar l'intero dominio blocarà tuti i colegamenti direti a calcossa che vien da quel dominio.

Stà tento a no blocar quei domini che ospita altri account utente come blogspot.com, geocities.com, ecc.",
	'spamdifftool_no_urls_detected' => "No xe stà rilevà nissun URL.
Struca <a href='$1'>qua</a> par tornar indrìo.",
	'spamdifftool_spam_link_text' => 'zonta al spam',
	'spamdifftool_option_domain' => 'tuti da sto dominio',
	'spamdifftool_option_subdomain' => 'tuti da sto sotodominio',
	'spamdifftool_option_directory' => 'sto sotodominio e directory',
	'spamdifftool_option_none' => 'gnente',
	'spamdifftool_block' => 'Bloca:',
	'spamdifftool_submit_buttom' => 'Manda',
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'spamdifftool_block' => 'Blokiruind:',
	'spamdifftool_submit_buttom' => 'Oigeta',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'spamdifftool' => 'Quản lý danh sách đen spam',
	'spamdifftool-desc' => 'Cung cấp một cách đơn giản để thêm khoản vào danh sách đen spam từ các trang so sánh',
	'spamdifftool_cantedit' => 'Xin lỗi, bạn không có quyền sửa đổi danh sách đen spam.',
	'spamdifftool_notext' => "Chưa cho vào văn bản để thêm vào danh sách đen spam. <a href='$1'>Tiếp tục</a>.",
	'spamdifftool_confirm' => "Hãy xác nhận rằng muốn thêm các khoản này vào danh sách đen spam. (<a href='$1' target='new'>Báo cáo lỗi</a>.)",
	'spamdifftool_summary' => 'Thêm vào danh sách đen spam',
	'spamdifftool_urls_detected' => 'Các địa chỉ sau được nhận trong các sửa đổi. Bạn muốn thêm địa chỉ nào vào danh sách đen spam? Các tùy chọn này được xếp theo thứ tự hạn chế nhất đến dễ dãi nhất. Nếu cấm cả tên miền thì sẽ cấm liên kết nào mà dẫn đến phần nào của tên miền đó.

Xin đừng cấm cả tên miền của website chứa tên miền phụ của người khác, như là blogspot.com, geocities.com, v.v.',
	'spamdifftool_no_urls_detected' => "Không nhận được địa chỉ nào. <a href='$1'>Trở lại</a>.",
	'spamdifftool_spam_link_text' => 'thêm danh sách spam',
	'spamdifftool_option_domain' => 'tất cả tên miền',
	'spamdifftool_option_subdomain' => 'tất cả tên miền phụ',
	'spamdifftool_option_directory' => 'tên miền phụ và danh mục',
	'spamdifftool_option_none' => 'không gì',
	'spamdifftool_block' => 'Cấm:',
	'spamdifftool_submit_buttom' => 'Cấm',
);

/** Volapük (Volapük)
 * @author Malafaya
 * @author Smeira
 */
$messages['vo'] = array(
	'spamdifftool_no_urls_detected' => "Els URL nonik petuvons.
Välolös <a href='$1'>is</a> ad geikön.",
	'spamdifftool_option_none' => 'nos',
	'spamdifftool_block' => 'Blokön:',
	'spamdifftool_submit_buttom' => 'Sedön',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gzdavidwong
 * @author Liangent
 */
$messages['zh-hans'] = array(
	'spamdifftool' => '管理垃圾信息黑名单',
	'spamdifftool_option_none' => '什么也没有',
	'spamdifftool_submit_buttom' => '提交',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'spamdifftool' => '管理垃圾信息黑名單',
	'spamdifftool_submit_buttom' => '提交',
);

