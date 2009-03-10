<?php
/**
 * Internationalisation file for extension PovWatch.
 *
 * @addtogroup Extensions
*/

$messages = array();

$messages['en'] = array(
	'povwatch'                         => 'PovWatch',
	'povwatch_desc'                    => 'Extension for [[Special:PovWatch|pushing pages on to the watchlists]] of other users',
	'povwatch_no_session'              => 'Error: Could not submit form due to a loss of session data.',
	'povwatch_not_allowed_push'        => 'You are not a PovWatch admin, you cannot push pages to watchlists.',
	'povwatch_already_subscribed'      => 'You are already subscribed to PovWatch',
	'povwatch_subscribed'              => 'You are now subscribed to PovWatch',
	'povwatch_not_subscribed'          => 'You are not subscribed to PovWatch, so you cannot unsubscribe.',
	'povwatch_unsubscribed'            => 'You have now unsubscribed from PovWatch',
	'povwatch_invalid_title'           => 'The title specified was invalid',
	'povwatch_pushed'                  => '[[$1]] has successfully been pushed to $2 user {{PLURAL:$2|watchlist|watchlists}}',
	'povwatch_intro'                   => 'PovWatch is a service which allows contentious pages to be discreetly pushed on to the watchlists of subscribing administrators.

A log of recent watchlist pushes is available at [[Special:PovWatch/log]].',
	'povwatch_subscriber_list'         => 'A [[Special:PovWatch/subscribers|list of subscribers]] is available.',
	'povwatch_subscriber_list_intro'   => '<strong>Subscriber list</strong>',
	'povwatch_not_allowed_subscribers' => 'You are not allowed to view the PovWatch subscriber list.',
	'povwatch_unknown_subpage'         => 'Unknown subpage.',
	'povwatch_push'                    => 'Push',
	'povwatch_push_intro'              => 'Use the form below to push pages on to the watchlists of subscribing users.
Please be careful typing the title: even non-existent titles can be added, and there is no way to remove a title once it has been pushed out.',
	'povwatch_title'                   => 'Title:',
	'povwatch_comment'                 => 'Log comment:',
	'povwatch_no_log'                  => 'There are no log entries.',
	'povwatch_no_subscribers'          => 'There are no subscribers.',
	'povwatch_unsubscribe_intro'       => 'You are subscribed to PovWatch.
Click the button below to unsubscribe.',
	'povwatch_unsubscribe'             => 'Unsubscribe',
	'povwatch_subscribe_intro'         => 'You are not subscribed to PovWatch.
Click the button below to subscribe.',
	'povwatch_subscribe'               => 'Subscribe',
	'povwatch_added'                   => 'added',
	'right-povwatch_admin'             => 'Administer user rights for adding pages to watchlists of other users',
	'right-povwatch_user'              => 'Add pages to watchlists of other users',
	'action-povwatch_admin'            => 'administer user rights for PovWatch',
	'action-povwatch_user'             => 'add this page to the watchlist of another user',
);

/** Message documentation (Message documentation)
 * @author Fryed-peach
 * @author Jon Harald Søby
 * @author Meno25
 * @author Purodha
 */
$messages['qqq'] = array(
	'povwatch_desc' => 'Shown in [[Special:Version]] as a short description of this extension. Do not translate links.',
	'povwatch_title' => '{{Identical|Title}}',
	'povwatch_comment' => '{{Identical|Log comment}}',
	'povwatch_added' => '{{Identical|Added}}',
	'right-povwatch_admin' => '{{doc-right}}',
	'right-povwatch_user' => '{{doc-right|povwatch user}}',
	'action-povwatch_admin' => '{{doc-action}}',
	'action-povwatch_user' => '{{doc-action}}',
);

/** Afrikaans (Afrikaans)
 * @author Arnobarnard
 */
$messages['af'] = array(
	'povwatch_title' => 'Titel:',
);

/** Amharic (አማርኛ)
 * @author Codex Sinaiticus
 */
$messages['am'] = array(
	'povwatch_title' => 'አርዕስት፡',
);

/** Arabic (العربية)
 * @author Meno25
 * @author OsamaK
 */
$messages['ar'] = array(
	'povwatch' => 'مراقبة بي أو في',
	'povwatch_desc' => 'امتداد [[Special:PovWatch|لدفع الصفحات إلى قوائم مراقبة]] المستخدمين الآخرين',
	'povwatch_no_session' => 'خطأ: لم يمكن تنفيذ الاستمارة نتيجة فقد في بيانات الجلسة.',
	'povwatch_not_allowed_push' => 'أنت لست إداري مراقبة بي أو في، لا يمكنك دفع صفحات إلى قوائم مراقبة.',
	'povwatch_already_subscribed' => 'أنت مشترك بالفعل في مراقبة بي أو في',
	'povwatch_subscribed' => 'أنت الآن مشترك في مراقبة بي أو في',
	'povwatch_not_subscribed' => 'أنت غير مشترك في مراقبة بي أو في، لذا فلا يمكنك إلغاء الاشتراك.',
	'povwatch_unsubscribed' => 'أنت الآن ألغيت الاشتراك في مراقبة بي أو في',
	'povwatch_invalid_title' => 'العنوان المحدد كان غير صحيح',
	'povwatch_pushed' => '[[$1]] تم دفعها بنجاح إلى $2 {{PLURAL:$2|قائمة مراقبة مستخدم|قائمة مراقبة مستخدم}}',
	'povwatch_intro' => 'مراقبة بي أو في هي خدمة تسمح بإضافة صفحات معينة إلى قوائم مراقبة الإداريين المشتركين.

السجل بعمليات دفع قوائم المراقبة الحديثة متوفر في [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => '[[Special:PovWatch/subscribers|قائمة المشتركين]] متوفرة.',
	'povwatch_subscriber_list_intro' => '<strong>قائمة المشتركين</strong>',
	'povwatch_not_allowed_subscribers' => 'أنت غير مسموح لك برؤية قائمة المشتركين في مراقبة بي أو في.',
	'povwatch_unknown_subpage' => 'صفحة فرعية غير معروفة.',
	'povwatch_push' => 'دفع',
	'povwatch_push_intro' => 'استخدم الاستمارة بالأسفل لدفع صفحات إلى قوائم مراقبة المستخدمين المشتركين.
من فضلك كن حذرا عند كتابة العنوان: حتى العناوين غير الموجودة يمكن إضافتها، ولا توجد طريقة لإزالة عنوان ما متى تم دفعه.',
	'povwatch_title' => 'العنوان:',
	'povwatch_comment' => 'تعليق السجل',
	'povwatch_no_log' => 'لا توجد مدخلات سجل.',
	'povwatch_no_subscribers' => 'لا يوجد مشتركون.',
	'povwatch_unsubscribe_intro' => 'أنت مشترك في مراقبة بي أو في.
اضغط الزر بالأسفل لإلغاء الاشتراك.',
	'povwatch_unsubscribe' => 'إنهاء الاشتراك',
	'povwatch_subscribe_intro' => 'أنت غير مشترك في مراقبة بي أو في.
اضغط الزر بالأسفل للاشتراك.',
	'povwatch_subscribe' => 'اشتراك',
	'povwatch_added' => 'تمت الإضافة',
	'right-povwatch_admin' => 'إدارة صلاحيات المستخدم لإضافة الصفحات إلى قوائم مراقبة المستخدمين الآخرين',
	'right-povwatch_user' => 'إضافة صفحات إلى قوائم مراقبة مستخدمين آخرين',
	'action-povwatch_admin' => 'إدارة صلاحيات المستخدم لمراقبة بي أو في',
	'action-povwatch_user' => 'إضافة هذه الصفحة إلى قائمة مراقبة مستخدم آخر',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 * @author Ramsis II
 */
$messages['arz'] = array(
	'povwatch' => 'مراقبة بى أو في',
	'povwatch_desc' => 'امتداد [[Special:PovWatch|لدفع الصفحات إلى قوائم مراقبة]] المستخدمين الآخرين',
	'povwatch_no_session' => 'خطأ: لم يمكن تنفيذ الاستمارة نتيجة فقد فى بيانات الجلسة.',
	'povwatch_not_allowed_push' => 'أنت لست إدارى مراقبة بى أو في، لا يمكنك دفع صفحات إلى قوائم مراقبة.',
	'povwatch_already_subscribed' => 'أنت مشترك بالفعل فى مراقبة بى أو في',
	'povwatch_subscribed' => 'أنت الآن مشترك فى مراقبة بى أو في',
	'povwatch_not_subscribed' => 'أنت غير مشترك فى مراقبة بى أو في، لذا فلا يمكنك إلغاء الاشتراك.',
	'povwatch_unsubscribed' => 'أنت الآن ألغيت الاشتراك فى مراقبة بى أو في',
	'povwatch_invalid_title' => 'العنوان المحدد كان غير صحيح',
	'povwatch_pushed' => '[[$1]] تم دفعها بنجاح إلى $2 {{PLURAL:$2|قائمة مراقبة مستخدم|قائمة مراقبة مستخدم}}',
	'povwatch_intro' => 'مراقبة بى أو فى هى خدمة تسمح بإضافة صفحات معينة إلى قوائم مراقبة الإداريين المشتركين.

السجل بعمليات دفع قوائم المراقبة الحديثة متوفر فى [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => '[[Special:PovWatch/subscribers|قائمة المشتركين]] متوفرة.',
	'povwatch_subscriber_list_intro' => '<strong>قائمة المشتركين</strong>',
	'povwatch_not_allowed_subscribers' => 'أنت غير مسموح لك برؤية قائمة المشتركين فى مراقبة بى أو في.',
	'povwatch_unknown_subpage' => 'صفحة فرعية غير معروفة.',
	'povwatch_push' => 'دفع',
	'povwatch_push_intro' => 'استخدم الاستمارة بالأسفل لدفع صفحات إلى قوائم مراقبة المستخدمين المشتركين.
من فضلك كن حذرا عند كتابة العنوان: حتى العناوين غير الموجودة يمكن إضافتها، ولا توجد طريقة لإزالة عنوان ما متى تم دفعه.',
	'povwatch_title' => 'العنوان:',
	'povwatch_comment' => 'تعليق السجل',
	'povwatch_no_log' => 'لا توجد مدخلات سجل.',
	'povwatch_no_subscribers' => 'لا يوجد مشتركون.',
	'povwatch_unsubscribe_intro' => 'أنت مشترك فى مراقبة بى أو في.
اضغط الزر بالأسفل لإلغاء الاشتراك.',
	'povwatch_unsubscribe' => 'إنهاء الاشتراك',
	'povwatch_subscribe_intro' => 'أنت غير مشترك فى مراقبة بى أو في.
اضغط الزر بالأسفل للاشتراك.',
	'povwatch_subscribe' => 'اشتراك',
	'povwatch_added' => 'تمت الإضافة',
	'right-povwatch_admin' => 'إدارة صلاحيات المستخدم لإضافة الصفحات إلى قوائم مراقبة المستخدمين الآخرين',
	'right-povwatch_user' => 'إضافة صفحات إلى قوائم مراقبة مستخدمين آخرين',
	'action-povwatch_admin' => 'ادارة حقوق اليوزر فى الـ PovWatch',
	'action-povwatch_user' => 'ضيف الصفحه دى لـ ليستة المراقبه بتاعة يوزر تانى',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 * @author Red Winged Duck
 */
$messages['be-tarask'] = array(
	'povwatch' => 'Нагляд за нэўтральнасьцю пункту гледжаньня',
	'povwatch_desc' => 'Пашырэньне для [[Special:PovWatch|даданьня старонак да сьпісаў назіраньня]] іншых удзельнікаў',
	'povwatch_no_session' => 'Памылка: немагчыма даслаць форму з прычыны страты зьвестак сэсіі.',
	'povwatch_not_allowed_push' => 'Вы ня можаце дадаваць старонкі да сьпісаў назіраньня, таму што Вы не зьяўляецеся адміністратарам нагляду за нэўтральнасьцю пункту гледжаньня.',
	'povwatch_already_subscribed' => 'Вы ўжо падпісаны на нагляд за нэўтральнасьцю пункту гледжаньня',
	'povwatch_subscribed' => 'Цяпер Вы падпісаны на нагляд за нэўтральнасьцю пункту гледжаньня',
	'povwatch_not_subscribed' => 'Вы не падпісаны на нагляд за нэўтральнасьцю пункту гледжаньня, таму і ня можаце адпісацца.',
	'povwatch_unsubscribed' => 'Цяпер Вы адпісаліся ад нагляду за нэўтральнасьцю пункту гледжаньня',
	'povwatch_invalid_title' => 'Пазначаная назва — няслушная',
	'povwatch_pushed' => '[[$1]] была пасьпяхова дададзеная да $2 {{PLURAL:$2|сьпісу назіраньня|сьпісаў назіраньня|сьпісаў назіраньня}}',
	'povwatch_intro' => 'Нагляд за нэўтральнасьцю пункту гледжаньня — сэрвіс, які дазваляе схавана дадаваць старонкі да сьпісаў назіраньня падпісаных адміністратараў.

Журнал апошніх даданьняў да сьпісаў назіраньня можна праглядзець на [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Даступны на [[Special:PovWatch/subscribers|сьпісе падпісчыкаў]].',
	'povwatch_subscriber_list_intro' => '<strong>Сьпіс падпісчыкаў</strong>',
	'povwatch_not_allowed_subscribers' => 'Вам не дазволена праглядаць сьпіс падпісчыкаў нагляду за нэўтральнасьцю пункту гледжаньня.',
	'povwatch_unknown_subpage' => 'Невядомая падстаронка.',
	'povwatch_push' => 'Распаўсюдзіць',
	'povwatch_push_intro' => 'Карыстайцеся формай пададзенай ніжэй, каб дадаць старонкі ў сьпісы назіраньняў падпісаных удзельнікаў.
Калі ласка, будзьце ўважлівы набіраючы назву: могуць быць даданы нават неіснуючыя старонкі, і няма ніякай магчымасьці выдаліць назву, калі яна была ўжо дададзеная.',
	'povwatch_title' => 'Назва:',
	'povwatch_comment' => 'Камэнтар журнала:',
	'povwatch_no_log' => 'У журнале няма запісаў.',
	'povwatch_no_subscribers' => 'Няма падпісчыкаў.',
	'povwatch_unsubscribe_intro' => 'Вы падпісаны на нагляд за нэўтральнасьцю пункту гледжаньня.
Націсьніце кнопку ніжэй, каб адпісацца.',
	'povwatch_unsubscribe' => 'Адпісацца',
	'povwatch_subscribe_intro' => 'Вы не падпісаны на нагляд за нэўтральнасьцю пункту гледжаньня.
Націсьніце кнопку ніжэй, каб падпісацца.',
	'povwatch_subscribe' => 'Падпісацца',
	'povwatch_added' => 'дададзены',
	'right-povwatch_admin' => 'адміністраваньне правоў удзельнікаў дадаваць старонкі ў сьпісы назіраньняў іншых удзельнікаў',
	'right-povwatch_user' => 'даданьне старонак у сьпісы назіраньняў іншых удзельнікаў',
	'action-povwatch_admin' => 'адміністраваньне правоў удзельнікаў для нагляду за нэўтральнасьцю пункту гледжаньня',
	'action-povwatch_user' => 'дадаць гэтую старонку ў сьпіс назіраньня іншага ўдзельніка',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'povwatch_desc' => 'Разширение за [[Special:PovWatch|добавяне на страници в списъка за наблюдение]] на други потребители',
	'povwatch_no_session' => 'Грешка: Формулярът не може да бъде изпратен заради загуба на данни от сесията.',
	'povwatch_not_allowed_push' => 'Вие не сте PovWatch администратор, затова не можете да включвате страници в списъците за наблюдение.',
	'povwatch_already_subscribed' => 'Вече сте се записал/а за PovWatch',
	'povwatch_subscribed' => 'Сега сте записан/а за PovWatch',
	'povwatch_not_subscribed' => 'Не сте записан/а за PovWatch, затова не можете да се отпишете.',
	'povwatch_unsubscribed' => 'Сега сте отписан/а от PovWatch',
	'povwatch_invalid_title' => 'Посоченото заглавие е невалидно',
	'povwatch_pushed' => '[[$1]] беше успешно добавена в списъка за наблюдение на $2',
	'povwatch_subscriber_list' => 'Наличен е [[Special:PovWatch/subscribers|списък със записани]].',
	'povwatch_subscriber_list_intro' => '<strong>Списък на абонираните</strong>',
	'povwatch_not_allowed_subscribers' => 'Нямате права да преглеждате списъка със записани за PovWatch.',
	'povwatch_unknown_subpage' => 'Непозната подстраница.',
	'povwatch_title' => 'Заглавие:',
	'povwatch_no_log' => 'Дневникът не съдържа записи.',
	'povwatch_no_subscribers' => 'Няма записани потребители.',
	'povwatch_unsubscribe_intro' => 'Имате абонамент за PovWatch.
Натиснете бутона по-долу за отписване.',
	'povwatch_unsubscribe' => 'Отписване',
	'povwatch_subscribe_intro' => 'Нямате абонамент за PovWatch.
Натиснете бутона за абониране.',
	'povwatch_subscribe' => 'Записване',
	'right-povwatch_admin' => 'Администриране на потребителските права за добавяне на страници в списъка за наблюдение на другите потребители',
	'right-povwatch_user' => 'добавяне на страници в списъка за наблюдение на други потребители',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Proširenje za [[Special:PovWatch|postavljanje stranica na spisak praćenja]] drugih korisnika',
	'povwatch_no_session' => 'Greška: ne može se poslati obrazac zbog gubitka podataka sesije.',
	'povwatch_not_allowed_push' => 'Vi niste administrator za PovWatch, ne možete postavljati stranice na spiskove praćenja.',
	'povwatch_already_subscribed' => 'Već ste prijavljeni na PovWatch',
	'povwatch_subscribed' => 'Sada ste prijavljeni na PovWatch',
	'povwatch_not_subscribed' => 'Niste prijavljeni na PovWatch, tako da se ne možete odjaviti.',
	'povwatch_unsubscribed' => 'Sada ste odjavljeni sa PovWatch',
	'povwatch_invalid_title' => 'Navedeni naslov je bio nevaljan.',
	'povwatch_pushed' => '[[$1]] je uspješno postavljen na {{PLURAL:$2|spisak praćenja|spiskove praćenja}} korisnika $2.',
	'povwatch_intro' => 'PovWatch je servis koji omogućuje da se sporne stranice diskretno postave na spiskove praćenja prijavljenih administratora.

Zapisnik nedavno postavljenih stranica je dostupan na [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Dostupan je [[Special:PovWatch/subscribers|spisak prijavljenih]].',
	'povwatch_subscriber_list_intro' => '<strong>Spisak prijavljenih</strong>',
	'povwatch_not_allowed_subscribers' => 'Nije Vam dopušteno da pregledate spisak prijavljenih na PovWatch.',
	'povwatch_unknown_subpage' => 'Nepoznata podstanica.',
	'povwatch_push' => 'Postavi',
	'povwatch_push_intro' => 'Koristite obrazac ispod da postavite stranice na spiskove praćenja prijavljenih korisnika.
Molimo da budete pažljivi pri unosu naslova: mogu biti dodani čak i naslovi koji nepostoje, a nema načina da se naslov ukloni ako se jednom postavi.',
	'povwatch_title' => 'Naslov:',
	'povwatch_comment' => 'Komentar zapisa:',
	'povwatch_no_log' => 'Nema stavki zapisa.',
	'povwatch_no_subscribers' => 'Nema prijavljenih.',
	'povwatch_unsubscribe_intro' => 'Prijavljeni ste na PovWatch.
Kliknite na dugme dole da bi ste se odjavili.',
	'povwatch_unsubscribe' => 'Odjavi se',
	'povwatch_subscribe_intro' => 'Niste prijavljeni na PovWatch.
Kliknite na dugme ispod da se prijavite.',
	'povwatch_subscribe' => 'Prijavi se',
	'povwatch_added' => 'dodano',
	'right-povwatch_admin' => 'Upravljanje sa korisničkim pravima za dodavanje stranica na spiskove praćenje drugih korisnika',
	'right-povwatch_user' => 'Dodavanje stranica na spiskove praćenja drugih korisnika',
	'action-povwatch_admin' => 'uređujete prava korisnika za PovWatch',
	'action-povwatch_user' => 'dodajete ovu stranicu na spisak praćenja drugog korisnika',
);

/** Catalan (Català)
 * @author Jordi Roqué
 */
$messages['ca'] = array(
	'povwatch_title' => 'Títol:',
);

/** Danish (Dansk)
 * @author Byrial
 * @author Jon Harald Søby
 */
$messages['da'] = array(
	'povwatch_title' => 'Titel:',
	'action-povwatch_admin' => 'administrere brugerrettigheder til PovWatch',
	'action-povwatch_user' => 'tilføje denne side til en anden brugers overvågningsliste',
);

/** German (Deutsch)
 * @author Purodha
 * @author Raimond Spekking
 * @author Umherirrender
 */
$messages['de'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Erweiterung, um [[Special:PovWatch|Seiten der Beobachtungsliste]] anderer Benutzer hinzuzufügen',
	'povwatch_no_session' => 'Fehler: Formulardaten können nicht verarbeitet werden, da die Sizungsdaten verloren gegangen sind.',
	'povwatch_not_allowed_push' => 'Du bist kein PovWatch-Administrator und kannst fremden Beobachtungslisten keine Seiten hinzufügen.',
	'povwatch_already_subscribed' => 'Du bist bereits für PovWatch registriert',
	'povwatch_subscribed' => 'Du bist nun für PovWatch registriert',
	'povwatch_not_subscribed' => 'Du bist nicht für PovWatch registriert; eine Abmeldung ist daher nicht möglich.',
	'povwatch_unsubscribed' => 'Du bist nun von PovWatch abgemeldet',
	'povwatch_invalid_title' => 'Der angegebene Seitenname ist ungültig',
	'povwatch_pushed' => '[[$1]] wurde erfolgreich {{PLURAL:$2|der Beobachtungsliste eines Benutzers|den Beobachtungslisten von $2 Benutzern}} hinzugefügt.',
	'povwatch_intro' => 'PovWatch ist ein Service, um umstrittene Seiten diskret den Beobachtungslisten von registrierten Administratoren hinzuzufügen.

Ein Logbuch der über mittels PovWatch hinzugefügten Seiten ist verfügbar unter [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Eine [[Special:PovWatch/subscribers|Liste der registrierten Benutzer]] ist verfügbar.',
	'povwatch_subscriber_list_intro' => '<strong>Liste der registrierten Benutzer</strong>',
	'povwatch_not_allowed_subscribers' => 'Du hast keine Berechtigung, die PovWatch-Benutzerliste einzusehen.',
	'povwatch_unknown_subpage' => 'Unbekannte Unterseite',
	'povwatch_push' => 'Hinzufügen',
	'povwatch_push_intro' => 'Benutze das Formular, um Seiten den Beobachtungslisten der registrierten Benutzer hinzuzufügen.
Bitte beachte: auch nicht vorhandene Seiten können hinzugefügt werde und es gibt keinen Weg, dies rückgängig zu machen.',
	'povwatch_title' => 'Seitenname:',
	'povwatch_comment' => 'Logbuch-Kommentar:',
	'povwatch_no_log' => 'Das Logbuch enthält keine Einträge.',
	'povwatch_no_subscribers' => 'Es gibt keine registrierten Benutzer.',
	'povwatch_unsubscribe_intro' => 'Du bist für PovWatch registriert. Klicke auf die Schaltfläche, um dich abzumelden.',
	'povwatch_unsubscribe' => 'Abmelden',
	'povwatch_subscribe_intro' => 'Du bist nicht für PovWatch registriert. Klicke auf die Schaltfläche, um dich anzumelden.',
	'povwatch_subscribe' => 'Registrieren',
	'povwatch_added' => 'hinzugefügt',
	'right-povwatch_admin' => 'Das Benutzerrecht Zuteilen oder Entziehen, Seiten zur Beobachtungsliste anderer Benutzer hinzufügen zu dürfen',
	'right-povwatch_user' => 'Hinzufügen von Seiten zur Beobachtungsliste anderer Benutzer',
	'action-povwatch_admin' => 'Rechte für PovWatch zu verwalten',
	'action-povwatch_user' => 'füge diese Seite zu der Beobachtungsliste eines anderen Benutzers hinzu',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Rozšyrjenje za [[Special:PovWatch|pśidanje bokow wobglědowańkam]] drugich wužywarjow',
	'povwatch_no_session' => 'Zmólka: Formular njejo se dał wótpósłaś, dokulaž su se zgubili pósejźeńske daty.',
	'povwatch_not_allowed_push' => 'Njejsy administrator PovWatch, njamóžoš boki wobglědowańkam pśidaś.',
	'povwatch_already_subscribed' => 'Sy južo za PovWatch zregistrěrowany',
	'povwatch_subscribed' => 'Sy něnto za PovWatch zregistrěrowany',
	'povwatch_not_subscribed' => 'Njejsy za PovWatch zregistrěrowany, wótzjawjenje jo togodla njemóžno.',
	'povwatch_unsubscribed' => 'Sy něnto z PovWatch wótzjawjony',
	'povwatch_invalid_title' => 'Pódany titel jo był njepłaśiwy',
	'povwatch_pushed' => '[[$1]] jo se pśidał $2 {{PLURAL:$2|wužywarskej wobglědowańce|wužywarskima wobglědowańkoma|wužywarskim wobglědowańkam|wužywarskim wobglědowańkam}}',
	'povwatch_intro' => 'PovWatch jo słužba, kótaraž dowólujo zwadne boki wobglědowańkam zregistrěrowanych administratorow pśidaś.

Protokol nejnowšych pśidanjow wobglědowańkam stoj na boku [[Special:PovWatch/log]] k dispoziciji.',
	'povwatch_subscriber_list' => '[[Special:PovWatch/subscribers|Lisćina zregistrěrowanych wužywarjow]] stoj k dispoziciji.',
	'povwatch_subscriber_list_intro' => '<strong>Lisćina zregistrěrowanych wužywarjow</strong>',
	'povwatch_not_allowed_subscribers' => 'Njamaš pšawo se lišćinu zregistrěrowanych wužywarjow PovWatch woglědaś.',
	'povwatch_unknown_subpage' => 'Njeznaty pódbok.',
	'povwatch_push' => 'Pśidaś',
	'povwatch_push_intro' => 'Wužyj slědujucy formular, aby pśidał boki wobglědowańkam zregistrěrowanych wužywarjow.
Pšosym buź wobglědniwy pśi pisanju titela: teke njeeksistěrujuce boko daju se pśidaś, a njejo žedna móžnosć, aby titel wótpórało, gaž jo pśidany.',
	'povwatch_title' => 'Titel:',
	'povwatch_comment' => 'Protokolowy komentar:',
	'povwatch_no_log' => 'W protokolu zapiski njejsu.',
	'povwatch_no_subscribers' => 'Njejsu zregistrěrowane wužywarje.',
	'povwatch_unsubscribe_intro' => 'Sy za PovWatch zregistrěrowany.
Klikni na slědujucy tłocašk, aby se wótzjawił.',
	'povwatch_unsubscribe' => 'Wótzjawiś se',
	'povwatch_subscribe_intro' => 'Njejsy za PovWatch zregistrěrowany.
Klikni na slědujucy tłocašk, aby se zregistrěrował.',
	'povwatch_subscribe' => 'Registrěrowaś',
	'povwatch_added' => 'pśidany',
	'right-povwatch_admin' => 'Wužywarske pšawa za pśidanje bokow wobglědowańkam drugich wužiwarjow zastojaś',
	'right-povwatch_user' => 'Boki wobglědowańkam drugich wužywarjow pśidaś',
	'action-povwatch_admin' => 'wužywarske pšawa za PovWatch zastojaś',
	'action-povwatch_user' => 'toś ten bok wobglědowańce drugego wužywarja pśidaś',
);

/** Greek (Ελληνικά)
 * @author Consta
 * @author Dead3y3
 */
$messages['el'] = array(
	'povwatch_desc' => 'Επέκταση για την [[Special:PovWatch|προώθηση σελίδων στις λίστες παρακολούθησης]] άλλων χρηστών',
	'povwatch_no_session' => 'Σφάλμα: Η φόρμα δεν υποβλήθηκε λόγω απώλειας δεδομένων συνεδρίας.',
	'povwatch_not_allowed_push' => 'Δεν είσαστε ένας διαχειριστής PovWatch, δεν μπορείτε να προωθήσετε σελίδες σε λίστες παρακολούθησης.',
	'povwatch_already_subscribed' => 'Είσαστε ήδη εγγεγραμμένος στο PovWatch',
	'povwatch_subscribed' => 'Τώρα είσαστε εγγεγραμμένος στο PovWatch',
	'povwatch_not_subscribed' => 'Δεν είσαστε εγγεγραμμένος στο PovWatch, οπότε δεν μπορείτε να αποχωρήσετε από αυτό.',
	'povwatch_unsubscribed' => 'Τώρα αποχωρήσατε από το PovWatch',
	'povwatch_invalid_title' => 'O καθορισμένος τίτλος ήταν άκυρος',
	'povwatch_pushed' => 'Η σελίδα [[$1]] προωθήθηκε επιτυχώς {{PLURAL:$2|στην $2 λίστα|στις $2 λίστες}} παρακολούθησης χρήστη/χρήστριας',
	'povwatch_intro' => 'Η επέκταση PovWatch είναι μια υπηρεσία η οποία επιτρέπει σε επίμαχες σελίδες να προωθηθούν διακριτικά στις λίστες παρακολούθησης των εγγεγραμμένων στην επέκταση διαχειριστών.

Ένα αρχείο καταγραφής των πρόσφατων προωθήσεων σε λίστες παρακολούθησης είναι διαθέσιμο στη σελίδα [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Ένας [[Special:PovWatch/subscribers|κατάλογος των συνδρομητών]] είναι διαθέσιμος.',
	'povwatch_subscriber_list_intro' => '<strong>Κατάλογος συνδρομητών</strong>',
	'povwatch_not_allowed_subscribers' => 'Δεν επιτρέπεται να δείτε τον κατάλογο συνδρομητών της επέκτασης PovWatch',
	'povwatch_unknown_subpage' => 'Άγνωστη υποσελίδα.',
	'povwatch_push' => 'Προώθηση',
	'povwatch_push_intro' => 'Χρησιμοποιήστε την φόρμα παρακάτω για να προωθήσετε σελίδες στις λίστες παρακολούθησης των εγγεγραμμένων χρηστών.<br />
Παρακαλώ να είστε προσεκτικοί καθώς πληκτρολογείτε τον τίτλο: ακόμη και ανύπαρκτοι τίτλοι μπορούν να προστεθούν, και δεν υπάρχει κανένας τρόπος να αφαιρέσετε ένα τίτλος αφότου αυτός έχει προωθηθεί.',
	'povwatch_title' => 'Τίτλος:',
	'povwatch_comment' => 'Σχόλιο αρχείου καταγραφής:',
	'povwatch_no_log' => 'Δεν υπάρχουν εγγραφές στο αρχείο καταγραφής.',
	'povwatch_no_subscribers' => 'Δεν υπάρχουν συνδρομητές.',
	'povwatch_unsubscribe_intro' => 'Είσαστε εγγεγραμμένοι στην επέκταση PovWatch.<br />
Κάντε κλιψκ στο κουμπί παρακάτω για να διαγραφείτε.',
	'povwatch_unsubscribe' => 'Διαγραφή',
	'povwatch_subscribe_intro' => 'Δεν είσαστε εγγεγραμμένοι στην επέκταση PovWatch.<br />
Κάντε κλικ στο κουμπί παρακάτω για να εγγραφείτε.',
	'povwatch_subscribe' => 'Εγγραφή',
	'povwatch_added' => 'προστέθηκε',
	'right-povwatch_admin' => 'Διαχείριση δικαιωμάτων χρηστών για την προσθήκη σελίδων στις λίστες παρακολούθησης άλλων χρηστών',
	'right-povwatch_user' => 'Προσθήκη σελίδων στις λίστες παρακολούθησης άλλων χρηστών',
	'action-povwatch_admin' => 'να διαχειριστείτε δικαιώματα χρηστών για την επέκταση PovWatch',
	'action-povwatch_user' => 'να προσθέσετε αυτή τη σελίδα στην λίστα παρακολούθησης ενός άλλου χρήστη',
);

/** Esperanto (Esperanto)
 * @author Melancholie
 * @author Yekrats
 */
$messages['eo'] = array(
	'povwatch_invalid_title' => 'La enigita titolo estis nevalida',
	'povwatch_subscriber_list_intro' => '<strong>Listo de abonantoj</strong>',
	'povwatch_unknown_subpage' => 'Nekonata subpaĝo.',
	'povwatch_push' => 'Premi',
	'povwatch_title' => 'Titolo:',
	'povwatch_comment' => 'Komento por protokolo:',
	'povwatch_no_log' => 'Ne estas protokolaj linioj.',
	'povwatch_no_subscribers' => 'Ne estas abonantoj.',
	'povwatch_unsubscribe' => 'Ellistiĝi',
	'povwatch_subscribe' => 'Enskribiĝi',
	'povwatch_added' => 'aldonita',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Dferg
 * @author Imre
 * @author Remember the dot
 * @author Sanbec
 */
$messages['es'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Extensión para [[Special:PovWatch|meter páginas en las listas de seguimiento]] de otros usuarios',
	'povwatch_already_subscribed' => 'Ya está suscrito en PovWatch',
	'povwatch_invalid_title' => 'El título especificado fue inválido',
	'povwatch_subscriber_list' => 'Una [[Special:PovWatch/subscribers|lista de suscriptores]] está disponible.',
	'povwatch_subscriber_list_intro' => '<strong>Lista de suscriptores</strong>',
	'povwatch_not_allowed_subscribers' => 'No se le permite ver la lista de suscriptores PovWatch.',
	'povwatch_unknown_subpage' => 'Subpágina desconocida.',
	'povwatch_push' => 'Presionar',
	'povwatch_title' => 'Título:',
	'povwatch_comment' => 'Comentario del registro:',
	'povwatch_no_log' => 'No existen elementos.',
	'povwatch_no_subscribers' => 'No hay suscriptores.',
	'povwatch_unsubscribe_intro' => 'Usted está subscribido a PovWatch.
Haga clic en el botón abajo para desubscribirse.',
	'povwatch_unsubscribe' => 'desuscribir',
	'povwatch_subscribe_intro' => 'Usted no está subscribido a PovWatch.
Haga clic en el botón abajo para subscribirse.',
	'povwatch_subscribe' => 'Suscribir',
	'povwatch_added' => 'agregado',
	'right-povwatch_user' => 'Agregar páginas a las listas de seguimiento de otros usuarios',
	'action-povwatch_admin' => 'Administrar derechos de usuario de PovWatch',
	'action-povwatch_user' => 'agregar esta página a la lista de seguimiento de otro usuario',
);

/** Persian (فارسی)
 * @author Huji
 * @author Mardetanha
 */
$messages['fa'] = array(
	'povwatch_title' => 'عنوان:',
	'povwatch_added' => 'افزوده شد',
);

/** Finnish (Suomi)
 * @author Str4nd
 */
$messages['fi'] = array(
	'povwatch_unknown_subpage' => 'Tuntematon alasivu.',
	'povwatch_subscribe' => 'Tilaa',
	'povwatch_added' => 'lisätty',
);

/** French (Français)
 * @author Grondin
 * @author IAlex
 * @author McDutchie
 * @author PieRRoMaN
 * @author Urhixidur
 * @author Verdy p
 */
$messages['fr'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Extension permettant d’[[Special:PovWatch|ajouter des pages à la liste de suivi]] d’autres utilisateurs',
	'povwatch_no_session' => 'Erreur : impossible de soumettre le formulaire par suite d’une perte des données de session.',
	'povwatch_not_allowed_push' => 'Vous n’êtes pas un administrateur de PovWatch. Vous ne pouvez pas ajouter les pages dans la liste correspondante.',
	'povwatch_already_subscribed' => 'Vous êtes déjà inscrit à PovWatch.',
	'povwatch_subscribed' => 'Vous êtes maintenant inscrit à PovWatch.',
	'povwatch_not_subscribed' => 'Vous n’êtes pas inscrit à PovWatch, vous ne pouvez donc pas résilier d’inscription.',
	'povwatch_unsubscribed' => 'Votre inscription a PovWatch est maintenant résiliée.',
	'povwatch_invalid_title' => 'Le titre indiqué est invalide.',
	'povwatch_pushed' => "[[$1]] a été ajoutée à la liste de suivi {{PLURAL:$2|d'un utilisateur|de $2 utilisateurs}}.",
	'povwatch_intro' => "PovWatch est un service qui permet d'ajouter implicitement les pages controversées dans la liste de suivi des administrateurs qui le souhaitent.

Un journal des pages récemment ajoutées à la liste est disponible sur [[Special:PovWatch/log]].",
	'povwatch_subscriber_list' => 'Une [[Special:PovWatch/subscribers|liste des abonnés]] est disponible.',
	'povwatch_subscriber_list_intro' => '<strong>Liste des abonnés</strong>',
	'povwatch_not_allowed_subscribers' => 'Vous n’êtes pas autorisé à consulter la liste des utilisateurs inscrits à PovWatch.',
	'povwatch_unknown_subpage' => 'Sous-page inconnue.',
	'povwatch_push' => 'Inscrire',
	'povwatch_push_intro' => 'Utilisez le formulaire ci-dessous pour placer des pages dans la liste de suivi des utilisateurs abonnés.
Inscrivez scrupuleusement le titre : une page inexistante peut être spécifiée, et il n’existe aucun moyen de la retirer une fois inscrite.',
	'povwatch_title' => 'Titre :',
	'povwatch_comment' => 'Commentaire pour le journal :',
	'povwatch_no_log' => 'Il n’existe aucune entrée dans le journal.',
	'povwatch_no_subscribers' => "Personne n'est abonné.",
	'povwatch_unsubscribe_intro' => 'Vous êtes abonné à PovWatch.
Cliquez sur le bouton ci-dessous pour résilier votre abonnement.',
	'povwatch_unsubscribe' => "Résilier l'abonnement",
	'povwatch_subscribe_intro' => 'Vous n’êtes pas abonné à PovWatch.
Cliquez sur le bouton ci-dessous pour vous abonner.',
	'povwatch_subscribe' => "S'abonner",
	'povwatch_added' => 'ajouté',
	'right-povwatch_admin' => 'Administrer les droits d’utilisateur pour ajouter des pages à la liste de suivi d’autres utilisateurs.',
	'right-povwatch_user' => "Ajouter des pages à la liste de suivi d'autres utilisateurs",
	'action-povwatch_admin' => "administrer les droits d'utilisateur pour PovWatch",
	'action-povwatch_user' => 'ajouter cette page à la liste de suivi d’un autre utilisateur',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 */
$messages['gl'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Extensión para [[Special:PovWatch|empurrar páxinas á lista de vixilancia]] doutros usuarios',
	'povwatch_no_session' => 'Erro: non se pode enviar o formulario debido a unha perda dos datos de inicio da sesión.',
	'povwatch_not_allowed_push' => 'Non é un administrador PovWatch, non pode empurrar páxinas ás listas de vixilancia doutros.',
	'povwatch_already_subscribed' => 'Vostede está aínda subscrito a PovWatch',
	'povwatch_subscribed' => 'Vostede está agora subscrito a PovWatch',
	'povwatch_not_subscribed' => 'Non ten unha subscrición a PovWatch, polo que non a pode cancelar.',
	'povwatch_unsubscribed' => 'Cancelouse a súa subscrición a PovWatch',
	'povwatch_invalid_title' => 'O título especificado foi non válido',
	'povwatch_pushed' => '"[[$1]]" foi engadida con éxito {{PLURAL:$2|á páxina|ás páxinas}} de vixilancia de $2',
	'povwatch_intro' => 'PovWatch é un servizo que permite que páxinas polémicas sexan "empurradas" discretamente ás listas de vixilancia dos adminitradores subscritos.

un rexistro dos "empurróns" ás listas de vixilancia recentes está dispoñible en [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Unha [[Special:PovWatch/subscribers|lista de subscritores]] está dispoñíbel.',
	'povwatch_subscriber_list_intro' => '<strong>Lista dos subscritores</strong>',
	'povwatch_not_allowed_subscribers' => 'Non ten permiso para ver a lista de subscrición de PovWatch.',
	'povwatch_unknown_subpage' => 'Subpáxina descoñecida.',
	'povwatch_push' => 'Empurrar',
	'povwatch_push_intro' => 'Use o formulario de embaixo para "empurrar" páxinas ás listas de vixilancia dos usuarios subscritos.
Por favor, sexa coidadoso ao teclear o título: incluso os títulos non existentes poden ser engadidos e non hai forma de eliminar un título unha vez que este foi "empurrado".',
	'povwatch_title' => 'Título:',
	'povwatch_comment' => 'Comentario do rexistro:',
	'povwatch_no_log' => 'Non hai entradas no rexistro.',
	'povwatch_no_subscribers' => 'Non hai subscritores.',
	'povwatch_unsubscribe_intro' => 'Está subscrito a PovWatch.
Faga clic no botón de embaixo para cancelar a subscrición.',
	'povwatch_unsubscribe' => 'Darse de baixa',
	'povwatch_subscribe_intro' => 'Non está subscrito a PovWatch.
Faga clic no botón de embaixo para subscribirse.',
	'povwatch_subscribe' => 'Subscribir',
	'povwatch_added' => 'engadido',
	'right-povwatch_admin' => 'Administrar os dereitos de usuario para engadir páxinas ás listas de vixilancia doutros usuarios',
	'right-povwatch_user' => 'Engadir páxinas á lista de vixilancia doutros usuarios',
	'action-povwatch_admin' => 'administrar os dereitos de usuario PovWatch',
	'action-povwatch_user' => 'engadir esta páxina á lista de vixilancia doutro usuario',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 */
$messages['grc'] = array(
	'povwatch_title' => 'Ἐπιγραφή:',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Erwyterig zum [[Special:PovWatch|Syte zue dr Beobachtigslischt]] vu andere Benutzer zuezfiege',
	'povwatch_no_session' => 'Fähler: Formulardate chenne nit verarbeitet wäre, wel d Sitzigsdate verlore gange sin.',
	'povwatch_not_allowed_push' => 'Du bisch kei PovWatch-Adminischtrator un chasch in keine främde Beobachtigslischte Syte zuefiege.',
	'povwatch_already_subscribed' => 'Du bisch scho fir PovWatch regischtriert',
	'povwatch_subscribed' => 'Du bisch jetz fir PovWatch regischtriert',
	'povwatch_not_subscribed' => 'Du bisch nit fir PovWatch regischtriert; e Abmäldig isch wäge däm nit megli.',
	'povwatch_unsubscribed' => 'Du bisch jetz vu PovWatch abgmäldet',
	'povwatch_invalid_title' => 'Dr Sytename, wu Du aagee hesch, isch nit giltig',
	'povwatch_pushed' => '[[$1]] isch erfolgryych {{PLURAL:$2|in d Beobachtigslischt vun eme Benutzer|in d Beobachtigslischte vu $2 Benutzer}} zuegfiegt wore.',
	'povwatch_intro' => 'PovWatch isch e Service zum umstritteni Syten diskret in d Beobachtigslischte vu regischtrierte Ammanne yyzfiege.

E Logbuech vu dr Syte, wu iber PovWatch yygfiegt wore sin, isch unter [[Special:PovWatch/log]] verfiegbar.',
	'povwatch_subscriber_list' => 'E [[Special:PovWatch/subscribers|Lischt vu dr regischtrierte Benutzer]] isch verfiegbar.',
	'povwatch_subscriber_list_intro' => '<strong>Lischt vu dr regischtrierte Benutzer</strong>',
	'povwatch_not_allowed_subscribers' => 'Du derfsch d PovWatch-Benutzerlischt nit aaluege.',
	'povwatch_unknown_subpage' => 'Nit bekannti Untersyte',
	'povwatch_push' => 'Zuefiege',
	'povwatch_push_intro' => 'Bruuch s Formular go Syte in d Beobachtigslischte vu dr regischtrierte Benutzer yyzfiege.
Bitte gib Acht: au Syte, wu s nit git, chenne yygfiegt wäre un s git kei Wääg, des derno ruckgängig z mache.',
	'povwatch_title' => 'Sytenname:',
	'povwatch_comment' => 'Logbuech-Kommentar:',
	'povwatch_no_log' => 'Im Logbuech het s kei Yyträg.',
	'povwatch_no_subscribers' => 'S git kei regischtrierti Benutzer.',
	'povwatch_unsubscribe_intro' => 'Du bisch fir PovWatch regischtriert. Druck uf d Schaltflächi go Di abmälde.',
	'povwatch_unsubscribe' => 'Abmälde',
	'povwatch_subscribe_intro' => 'Du bisch nit fir PovWatch regischtriert. Druck uf d Schaltflächi go di aamälde.',
	'povwatch_subscribe' => 'Regischtriere',
	'povwatch_added' => 'zuegfiegt',
	'right-povwatch_admin' => 'S Benutzerrächt gee oder ewägneh, Syte in d Beobachtigslischte vu andere Benutzer yyfiege z derfe',
	'right-povwatch_user' => 'Yyfiege vu Syte in d Beobachtigslischt vu andere Benutzer',
	'action-povwatch_admin' => 'Rächt fir PovWatch verwalte',
	'action-povwatch_user' => 'fieg die Syte in d Beobachtigslischt vun eme andere Benutzer yy',
);

/** Manx (Gaelg)
 * @author MacTire02
 */
$messages['gv'] = array(
	'povwatch_title' => 'Ard-ennym:',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'povwatch' => 'מערכת PovWatch',
	'povwatch_desc' => '[[Special:PovWatch|דחיפת דפים לרשימת המעקב]] של משתמשים אחרים',
	'povwatch_no_session' => 'שגיאה: לא ניתן לשלוח את הטופס עקב אובדן מידע הכניסה.',
	'povwatch_not_allowed_push' => 'אינכם מנהלי PovWatch, לא תוכלו לדחוף דפים לרשימות מעקב.',
	'povwatch_already_subscribed' => 'אתם כבר רשומים ל־PovWatch',
	'povwatch_subscribed' => 'כעת אתם רשומים ל־PovWatch',
	'povwatch_not_subscribed' => 'אינכם רשומים ל־PovWatch, לכן לא תוכלו לבטל את ההרשמה.',
	'povwatch_unsubscribed' => 'הרשמתכם ל־PovWatch בוטלה כעת',
	'povwatch_invalid_title' => 'הכותרת שצוינה אינה תקינה',
	'povwatch_pushed' => '[[$1]] נדחף בהצלחה ל{{PLURAL:$2|רשימת המעקב של משתמש אחד|רשימות המעקב של $2 משתמשים}}',
	'povwatch_intro' => 'PovWatch הינו שירות המאפשר דחיפת דפי תוכן לרשימות המעקב של המנהלים שנרשמו לשירות.

יומן הדחיפות האחרונות לרשימות המעקב זמין בדף [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'ניתן לצפות ב[[Special:PovWatch/subscribers|רשימת הנרשמים]].',
	'povwatch_subscriber_list_intro' => '<strong>רשימת המנויים</strong>',
	'povwatch_not_allowed_subscribers' => 'אינכם מורשים לצפות ברשימת המנויים של PovWatch.',
	'povwatch_unknown_subpage' => 'דף משנה בלתי ידוע.',
	'povwatch_push' => 'דחיפה',
	'povwatch_push_intro' => 'השתמשו בטופס שלהלן כדי לדחוף דפים לרשימות המעקב של המשתמשים המנויים.
אנא הזהרו בעת הקלדת הכותרת: ניתן להוסיף אפילו כותרות שאינן קיימות, ואין כל דרך להסיר כותרת לאחר שנדחפה.',
	'povwatch_title' => 'כותרת:',
	'povwatch_comment' => 'הערה ליומן:',
	'povwatch_no_log' => 'אין רשומות ביומן.',
	'povwatch_no_subscribers' => 'אין מנויים.',
	'povwatch_unsubscribe_intro' => 'אתם מנויים ל־PovWatch.
לחצו על הכפתור שלהלן כדי לבטל את המינוי.',
	'povwatch_unsubscribe' => 'ביטול המינוי',
	'povwatch_subscribe_intro' => 'אינכם מנויים ל־PovWatch.
לחצו על הכפתור שלהלן כדי להירשם כמנויים.',
	'povwatch_subscribe' => 'הרשמה',
	'povwatch_added' => 'נוסף',
	'right-povwatch_admin' => 'ניהול הרשאות המשתמש להוספת דפים לרשימות המעקב של משתמשים אחרים',
	'right-povwatch_user' => 'הוספת דפים לרשימות המעקב של משתמשים אחרים',
	'action-povwatch_admin' => 'לנהל את הרשאות המשתמש של PovWatch',
	'action-povwatch_user' => 'להוסיף דף זה לרשימת המעקב של משתמש אחר',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 */
$messages['hi'] = array(
	'povwatch' => 'पीओव्हीवॉच',
	'povwatch_already_subscribed' => 'आप पहलेसे पीओव्हीवॉचके सदस्य हैं',
	'povwatch_subscribed' => 'आप अब पीओव्हीवॉचके सदस्य बन गये हैं',
	'povwatch_invalid_title' => 'दिया हुआ शीर्षक अवैध हैं',
	'povwatch_subscriber_list_intro' => '<strong>सदस्य सूची</strong>',
	'povwatch_unknown_subpage' => 'अज्ञात उपपृष्ठ।',
	'povwatch_push' => 'घुसायें',
	'povwatch_title' => 'शीर्षक:',
	'povwatch_comment' => 'टिप्पणी दें:',
	'povwatch_no_log' => 'सूची में एन्ट्री नहीं हैं।',
	'povwatch_no_subscribers' => 'सदस्य नहीं हैं।',
	'povwatch_unsubscribe' => 'सदस्यत्व निकालें',
	'povwatch_subscribe' => 'सदस्यत्व लें',
	'povwatch_added' => 'बढाया',
);

/** Croatian (Hrvatski)
 * @author Dalibor Bosits
 * @author SpeedyGonsales
 */
$messages['hr'] = array(
	'povwatch' => 'Predbilježeno praćenje',
	'povwatch_desc' => 'Ekstenzija za [[Special:PovWatch|stavljanje stranica u popis praćenja]] drugih suradnika',
	'povwatch_no_session' => 'Greška: Zahtjev nije mogao biti poslan zbog gubitka podataka o sesiji.',
	'povwatch_not_allowed_push' => 'Vi niste admin za predbilježbu praćenja, ne možete postaviti stranice u popis praćenja',
	'povwatch_already_subscribed' => 'Već ste upisani u predbilježno praćenje',
	'povwatch_subscribed' => 'Niste upisani u predbilježeno praćenje',
	'povwatch_not_subscribed' => 'Niste upisani u predbilježeno praćenje, stoga se ne možete ispisati.',
	'povwatch_unsubscribed' => 'Sada ste se ispisali iz predbilježenog praćenja',
	'povwatch_invalid_title' => 'Određeni naslov nije valjan',
	'povwatch_pushed' => '[[$1]] je uspješno postavljeno u popis praćenja za $2 suradnika',
	'povwatch_intro' => 'Predbilježeno praćenje je sustav koji omogućava diskretno postavljanje spornih stranica u popis praćenja upisanih administratora.

Evidencija nedavno postavljenih stranica je dostupna [[Special:PovWatch/log|ovdje]].',
	'povwatch_subscriber_list' => 'Dostupan je [[Special:PovWatch/subscribers|popis upisanih suradnika]].',
	'povwatch_subscriber_list_intro' => '<strong>Popis upisanih</strong>',
	'povwatch_not_allowed_subscribers' => 'Nije vam dopušteno gledanje popisa upisanih u predbilježeno praćenje',
	'povwatch_unknown_subpage' => 'Nepoznata podstranica.',
	'povwatch_push' => 'Postavi',
	'povwatch_push_intro' => 'Koristite ovaj obrazac za postavljanje stranica u popis praćenja upisanih suradnika.
Molimo budite oprezni kod upisivanja naslova: u popis praćenja mogu biti dodane i nepostojeće stranice, i ne postoji način za vraćanje kad se jednom postavi.',
	'povwatch_title' => 'Naslov:',
	'povwatch_comment' => 'Komentar za evidenciju:',
	'povwatch_no_log' => 'Nema unosa u evidenciji',
	'povwatch_no_subscribers' => 'Nema upisanih suradnika',
	'povwatch_unsubscribe_intro' => 'Upisani ste u predbilježeno praćenje.
Kliknite na tipku ispod za ispisivanje iz sustava.',
	'povwatch_unsubscribe' => 'Ispiši se',
	'povwatch_subscribe_intro' => 'Niste upisani u predbilježeno praćenje.
Kliknite na tipku ispod za upisivanje u sustav.',
	'povwatch_subscribe' => 'Upiši se',
	'povwatch_added' => 'dodano',
	'right-povwatch_admin' => 'Upravljanje suradničkim pravima za dodavanje stranica u popis praćenja drugih suradnika',
	'right-povwatch_user' => 'Dodavanje stranica u popis praćenja drugih suradnika',
	'action-povwatch_admin' => 'uredi suradnička prava za PovWatch ekstenziju',
	'action-povwatch_user' => 'dodaj stranicu na listu praćenih stranica drugog suradnika',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Rozšěrjenje za [[Special:PovWatch|zasunjenje stronow do wobkedźbowankow]] druhich wužiwarjow',
	'povwatch_no_session' => 'Zmylk: Formular njeda so straty datow dla wotesłać.',
	'povwatch_not_allowed_push' => 'Njejsy administrator za PovWatch, njemóžeš nastawki do wobkedźbowankow sunyć.',
	'povwatch_already_subscribed' => 'Sy PovWatch hižo abonował',
	'povwatch_subscribed' => 'Sy nětko PovWatch abonował',
	'povwatch_not_subscribed' => 'Njejsy PovWatch abonował, tohodla njemóžeš jón wotskazać.',
	'povwatch_unsubscribed' => 'Sy nětko PovWatch wotskazał',
	'povwatch_invalid_title' => 'Podaty titul je njepłaćiwy',
	'povwatch_pushed' => '[[$1]] bu wuspěšnje {{PLURAL:$2|wobkedźbowankam|wobkedźbowankam|wobkedźbowankam|wobkedźbowankam}} wužiwarja $2 přidaty.',
	'povwatch_intro' => 'PovWatch je słužba, kotraž dowola zwadne nastawki diskretnje do wobkedźbowankow abonowacych administratorow sunyć.

Protokol aktualnych wobkedźbowankow steji na [[Special:PovWatch/log]] k dispoziciji.',
	'povwatch_subscriber_list' => '[[Special:PovWatch/subscribers|Lisćina abonentow]] steji k dispoziciji.',
	'povwatch_subscriber_list_intro' => '<strong>Lisćina abonentow</strong>',
	'povwatch_not_allowed_subscribers' => 'Nimaš dowolnosć sej lisćinu abonentow PovWatch wobhladać.',
	'povwatch_unknown_subpage' => 'Njeznata podstrona.',
	'povwatch_push' => 'Sunyć',
	'povwatch_push_intro' => 'Wužij formular deleka, zo by nastawki do wobkedźbowankow abonowacych wužiwarjow sunył. Prošu bjer na kedźbu z pisanjom titula: samo njeeksistowace titule hodźa so přidać a njeje žana móžnosć titul wotstronić, kotryž bu přesunjeny.',
	'povwatch_title' => 'Titul:',
	'povwatch_comment' => 'Komentar protokolować:',
	'povwatch_no_log' => 'Protokolowe zapiski njejsu.',
	'povwatch_no_subscribers' => 'Abonenća njejsu.',
	'povwatch_unsubscribe_intro' => 'Sy PovWatch abonował. Klikń na tłóčatko deleka, zo by jón wotskazał.',
	'povwatch_unsubscribe' => 'Wotskazać',
	'povwatch_subscribe_intro' => 'Njejsy PovWatch abonował. Klikń na tłóčatko deleka, zo by jón abonował.',
	'povwatch_subscribe' => 'Abonować',
	'povwatch_added' => 'přidaty',
	'right-povwatch_admin' => 'Wužiwarske prawa za přidawanje stronow k wobkeďzbowankam druhich wužiwarjow administrować',
	'right-povwatch_user' => 'Strony k wobkedźbowankam druhich wužiwarjow přidać',
	'action-povwatch_admin' => 'wužiwarske prawa za PovWatch administrować',
	'action-povwatch_user' => 'tutu stronu wobkedźbowankam druheho wužiwarja přidać',
);

/** Hungarian (Magyar)
 * @author Dani
 */
$messages['hu'] = array(
	'povwatch_title' => 'Cím:',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'povwatch' => 'ObservaPdV',
	'povwatch_desc' => 'Extension pro [[Special:PovWatch|mitter paginas in le observatorios]] de altere usatores',
	'povwatch_no_session' => 'Error: Non poteva submitter le formulario a causa del perdita del datos del session.',
	'povwatch_not_allowed_push' => 'Tu non es un administrator de ObservaPdV, tu non pote mitter paginas in observatorios.',
	'povwatch_already_subscribed' => 'Tu es ja inscribite in ObservaPdV',
	'povwatch_subscribed' => 'Tu es ora inscribite in ObservaPdV',
	'povwatch_not_subscribed' => 'Tu non es inscribite in ObservaPdV, dunque tu non pote cancellar tu inscription.',
	'povwatch_unsubscribed' => 'Tu ha cancellate tu inscription in ObservaPdV.',
	'povwatch_invalid_title' => 'Le titulo specificate es invalide',
	'povwatch_pushed' => '[[$1]] ha essite mittite con successo in le {{PLURAL:$2|observatorio de 1 usator|observatorios de $2 usatores}}',
	'povwatch_intro' => 'ObservaPdV es un servicio que permitte mitter discretemente paginas controverse in le observatorios del administratores inscribite.

Un registro de missiones in observatorio recente es disponibile a [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Un [[Special:PovWatch/subscribers|lista de inscribitos]] es disponibile.',
	'povwatch_subscriber_list_intro' => '<strong>Lista de inscribitos</strong>',
	'povwatch_not_allowed_subscribers' => 'Tu non ha le permission de vider le lista de inscribitos in ObservaPdV.',
	'povwatch_unknown_subpage' => 'Subpagina incognite.',
	'povwatch_push' => 'Mitter',
	'povwatch_push_intro' => 'Usa le formulario in basso pro mitter paginas in le observatorios del usatores inscribite.
Per favor sia caute de entrar le titulo correcte: mesmo le titulos non existente pote esser addite, e il non ha un modo de retirar un titulo del observatorios de altere usatores.',
	'povwatch_title' => 'Titulo:',
	'povwatch_comment' => 'Commento pro registro:',
	'povwatch_no_log' => 'Le registro non ha entratas.',
	'povwatch_no_subscribers' => 'Nulle persona es inscribite.',
	'povwatch_unsubscribe_intro' => 'Tu es inscribite in ObservaPdV.
Clicca le button infra pro cancellar tu inscription.',
	'povwatch_unsubscribe' => 'Cancellar inscription',
	'povwatch_subscribe_intro' => 'Tu non es inscribite in ObservaPdV.
Clicca le button infra pro inscriber te.',
	'povwatch_subscribe' => 'Inscriber',
	'povwatch_added' => 'addite',
	'right-povwatch_admin' => 'Gerer le derectos del usatores a mitter paginas in le observatorios de altere usatores',
	'right-povwatch_user' => 'Mitter paginas in le observatorios de altere usatores',
	'action-povwatch_admin' => 'administrar le derectos de usator pro PovWatch',
	'action-povwatch_user' => 'adder iste pagina al observatorio de un altere usator',
);

/** Indonesian (Bahasa Indonesia)
 * @author Rex
 */
$messages['id'] = array(
	'povwatch_title' => 'Judul:',
);

/** Ido (Ido)
 * @author Malafaya
 */
$messages['io'] = array(
	'povwatch_title' => 'Titulo:',
	'povwatch_added' => 'adjuntita',
);

/** Italian (Italiano)
 * @author Darth Kule
 * @author Pietrodn
 */
$messages['it'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Estensione per [[Special:PovWatch|aggiungere pagine negli osservati speciali]] di altri utenti',
	'povwatch_no_session' => 'Errore: Impossibile inviare il modulo a causa di una perdita dei dati di sessione.',
	'povwatch_not_allowed_push' => 'Non sei un amministratore PovWatch, non è possibile aggiungere le pagine nelle liste degli osservati speciali.',
	'povwatch_already_subscribed' => 'Sei già iscritto a PovWatch',
	'povwatch_subscribed' => 'Sei ora iscritto a PovWatch',
	'povwatch_not_subscribed' => 'Non sei iscritto a PovWatch, quindi non puoi cancellarti.',
	'povwatch_unsubscribed' => 'Ti sei ora cancellato da PovWatch',
	'povwatch_invalid_title' => 'Il titolo specificato non era valido',
	'povwatch_pushed' => '[[$1]] è stato aggiunto con successo {{PLURAL:$2|alla lista degli osservati speciali|alle $2 liste degli osservati speciali}} utente',
	'povwatch_intro' => 'PovWatch è un servizio che consente di aggiungere discretamente le pagine dibattute alle liste degli osservati speciali degli amministratori iscritti.

Un registro delle aggiunte recenti agli osservati speciali è disponibile presso [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'È disponibile un [[Special:PovWatch/subscribers|elenco degli iscritti]].',
	'povwatch_subscriber_list_intro' => '<strong>Elenco degli iscritti</strong>',
	'povwatch_not_allowed_subscribers' => 'Non sei autorizzato a visualizzare l&#39;elenco degli iscritti a PovWatch.',
	'povwatch_unknown_subpage' => 'Sottopagina sconosciuta.',
	'povwatch_push' => 'Aggiungi',
	'povwatch_push_intro' => 'Usa il modulo sottostante per aggiungere pagine alle liste degli osservati speciali degli utenti iscritti.
Per favore sii attento a digitare il titolo: possono essere aggiunti persino i titoli inesistenti e non vi è alcun modo per rimuovere un titolo una volta che è stato aggiunto.',
	'povwatch_title' => 'Titolo:',
	'povwatch_comment' => 'Registra commento:',
	'povwatch_no_log' => 'Non ci sono occorrenze nel registro.',
	'povwatch_no_subscribers' => 'Non vi sono iscritti.',
	'povwatch_unsubscribe_intro' => 'Sei iscritto a PovWatch.
Clicca sul pulsante qui sotto per cancellarti.',
	'povwatch_unsubscribe' => 'Cancellati',
	'povwatch_subscribe_intro' => 'Non sei iscritto aa PovWatch.
Clicca sul pulsante qui sotto per iscriverti.',
	'povwatch_subscribe' => 'Iscriviti',
	'povwatch_added' => 'aggiunto',
	'right-povwatch_admin' => 'Amministra i diritti utente per l&#39;aggiunta di pagine alle liste degli osservati speciali di altri utenti',
	'right-povwatch_user' => 'Aggiungi pagine alle liste degli osservati speciali di altri utenti',
	'action-povwatch_admin' => 'gestire i diritti degli utenti per PovWatch',
	'action-povwatch_user' => 'aggiungere questa pagina alla lista degli osservati speciali di un altro utente',
);

/** Japanese (日本語)
 * @author Fryed-peach
 */
$messages['ja'] = array(
	'povwatch' => '編集合戦の監視',
	'povwatch_desc' => '[[Special:PovWatch|ページを他の利用者のウォッチリストに追加]]する拡張機能',
	'povwatch_no_session' => 'エラー: セッション・データが失われたため、フォームを送信できませんでした。',
	'povwatch_not_allowed_push' => 'あなたは編集合戦の監視ができる管理者ではなく、ウォッチリストにページを入れることはできません。',
	'povwatch_already_subscribed' => 'あなたは編集合戦の監視を既に購読しています',
	'povwatch_subscribed' => 'あなたは編集合戦の監視を現在購読しています',
	'povwatch_not_subscribed' => 'あなたは編集合戦の監視を購読していないため、購読停止はできません。',
	'povwatch_unsubscribed' => 'あなたは編集合戦の監視を購読停止しました',
	'povwatch_invalid_title' => '指定したページ名は無効です',
	'povwatch_pushed' => '[[$1]] を $2人の利用者のウォッチリストに追加しました',
	'povwatch_intro' => '編集合戦の監視は、購読している管理者のウォッチリストに議論の起きやすいページをこっそりと入れることができるようにするサービスです。

最近のウォッチリストへの追加記録は [[Special:PovWatch/log]] で閲覧可能です。',
	'povwatch_subscriber_list' => '[[Special:PovWatch/subscribers|購読者一覧]]の閲覧が可能です。',
	'povwatch_subscriber_list_intro' => '<strong>購読者一覧</strong>',
	'povwatch_not_allowed_subscribers' => 'あなたには編集合戦の監視の購読者一覧を閲覧することが許可されていません。',
	'povwatch_unknown_subpage' => '不明なサブページ',
	'povwatch_push' => '追加',
	'povwatch_push_intro' => 'このフォームを使って購読利用者のウォッチリストにページを追加します。ページ名の入力には注意してください。存在しないページでも追加でき、一度追加されるとページを除去する方法はないためです。',
	'povwatch_title' => 'ページ名:',
	'povwatch_comment' => '要約:',
	'povwatch_no_log' => '記録項目はありません。',
	'povwatch_no_subscribers' => '購読者はいません。',
	'povwatch_unsubscribe_intro' => 'あなたは編集合戦の監視を購読しています。購読を停止するには以下のボタンを押します。',
	'povwatch_unsubscribe' => '購読停止',
	'povwatch_subscribe_intro' => 'あなたは編集合戦の監視を購読していません。購読を開始するには以下のボタンを押してください。',
	'povwatch_subscribe' => '購読',
	'povwatch_added' => '追加完了',
	'right-povwatch_admin' => '他の利用者のウォッチリストへのページ追加のための利用者権限を管理する',
	'right-povwatch_user' => '他の利用者のウォッチリストにページを追加する',
	'action-povwatch_admin' => '編集合戦の監視の利用者権限管理',
	'action-povwatch_user' => 'このページの他利用者のウォッチリストへの追加',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 */
$messages['jv'] = array(
	'povwatch_unknown_subpage' => 'Subkaca ora dimangertèni',
	'povwatch_push' => 'Surung',
	'povwatch_title' => 'Irah-irahan (judhul):',
	'povwatch_comment' => 'Komentar log:',
	'povwatch_no_log' => 'Ora ana èntri-èntri log',
	'povwatch_no_subscribers' => 'Ora ana palanggané.',
	'povwatch_unsubscribe' => 'Batal langganan',
	'povwatch_subscribe' => 'Langganan',
	'povwatch_added' => 'ditambah',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author Lovekhmer
 * @author Thearith
 */
$messages['km'] = array(
	'povwatch_unknown_subpage' => 'ទំព័ររង​ដែល​មិនស្គាល់​។',
	'povwatch_push' => 'រុញ',
	'povwatch_title' => 'ចំណងជើង៖',
	'povwatch_no_subscribers' => 'មិនមាន​អ្នកជាវប្រចាំ​ទេ​។',
	'povwatch_unsubscribe' => 'ឈប់ជាវ',
	'povwatch_subscribe' => 'ជាវប្រចាំ',
	'povwatch_added' => 'បានបន្ថែម',
);

/** Korean (한국어)
 * @author Kwj2772
 */
$messages['ko'] = array(
	'povwatch_pushed' => '[[$1]] 문서가 $2명의 사용자 주시문서 목록에 성공적으로 추가되었습니다.',
	'povwatch_subscriber_list_intro' => '<strong>수신자 목록</strong>',
	'povwatch_title' => '제목:',
	'povwatch_no_subscribers' => '수신자가 없습니다.',
	'povwatch_unsubscribe' => '수신 해제',
	'povwatch_subscribe' => '수신',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Määt et müjjelesch, [[Special:PovWatch|Sigge op anderlüx Oppassleste ze donn]].',
	'povwatch_no_session' => 'Fähler: De Date en dämm Fommulaa kunnte nicht beärbeidt wäde.
De Date för Ding Setzung wohre fott. Versöhk et noch ens.',
	'povwatch_not_allowed_push' => 'Do beß keine <i lang="en">PovWatch</i>-Köbes, Do kanns kein Sigge op anderlüx Oppassleste donn.',
	'povwatch_already_subscribed' => 'Do bes ald för {{int:povwatch}} enjeschrevve.',
	'povwatch_subscribed' => 'Do bes jez för {{int:povwatch}} enjeschrevve.',
	'povwatch_not_subscribed' => 'Do bes nit för {{int:povwatch}} enjeschrevve, alsu kanns De Desch nit ußdraare.',
	'povwatch_unsubscribed' => 'Do bes jez bei {{int:povwatch}} wider ußjedraare.',
	'povwatch_invalid_title' => 'Dä aanjejovve Tettel es nit jöltesch',
	'povwatch_pushed' => 'De Sigg „[[$1]]“ es jetz op {{PLURAL:$2|einem Metmaacher sing Oppassleß|$2 Metmaacher ier Oppassleste|keinem sing Oppassleß}} drop jesatz.',
	'povwatch_intro' => '{{int:povwatch}} es ene Deens, dä et müjjelesch määt, Sigge op anderlüx Oppassleste ennzedraare.
Dat määt mer met Sigge, woh mer meint, dat dat nüüdesch wöhr.
Wä esu Sigge op singe Oppassless enjedraare krijje well, moß dat extra zohlohße,
un sesch doför beim {{int:povwatch}} enschriive.

En Leß met de neußte Endraarunge op anderlüx Oppassleß kam_mer sesch
op dä Sigg [[Special:PovWatch/log]] aanbekike.',
	'povwatch_subscriber_list' => 'En [[Special:PovWatch/subscribers|Leß met de {{int:povwatch}}-Metmaachere]] jidd_et och.',
	'povwatch_subscriber_list_intro' => '<strong>Leß met de enjedraare Metmaacher</strong>',
	'povwatch_not_allowed_subscribers' => 'Do häs nit dat Rääsch, Der de Leß met de bei {{int:povwatch}} enjeschrevve Metmaacher aanzeloore.',
	'povwatch_unknown_subpage' => 'De Ungersigg jidd_et nit.',
	'povwatch_push' => 'Loß Jonn! Dobeidonn!',
	'povwatch_push_intro' => 'Met dämm Fommulaa unge kanns De Sigge op der Metmaacher ier Oppassleste
donn, die sesch bei {{int:povwatch}} enjeschrevve han.
Beß vörseschtesch, wann de Tittele vun Sigge schrievs, selvs Tittele, wo
et noch jaa kei Sigg för jitt, kanns De op anderlüx Oppassleste donn,
un wat do eimohl drop esm kanns Do nit mieh dovun fott nämme.',
	'povwatch_title' => 'Siggetittel:',
	'povwatch_comment' => 'Endraach för en et Logbooch:',
	'povwatch_no_log' => 'En däm Logboch es nix dren.',
	'povwatch_no_subscribers' => 'Et sin kein Metmaacher för {{int:povwatch}} enjedraare.',
	'povwatch_unsubscribe_intro' => 'Do bes bei {{int:povwatch}} ennjeschrevve.
Onge övver der Knopp kanns de Desch ußdraare lohße.',
	'povwatch_unsubscribe' => 'Ußdraare!',
	'povwatch_subscribe_intro' => 'Do bes noch nit bei {{int:povwatch}} ennjeschrevve.
Onge övver der Knopp kanns de Desch endraare lohße.',
	'povwatch_subscribe' => 'Ennschriive!',
	'povwatch_added' => 'dobei jedonn',
	'right-povwatch_admin' => 'Dat Rääsch, Sigge en anderlüx Oppassleste erin donn ze dörfe, Jevve un Fottnämme',
	'right-povwatch_user' => 'Sigge op Oppassleste vun ander Metmaacher drop donn',
	'action-povwatch_admin' => 'Metmaacher-Rääschte för {{int:povwatch}} ze verjävve',
	'action-povwatch_user' => 'die Sigg op Einem sing Oppassleß ze säze',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'povwatch' => 'Iwwerwaachung vun Ännerungskonflikter',
	'povwatch_desc' => "Erweiderung fir [[Special:PovWatch|Säiten op d'Iwwerwwaachungslëscht]] vun anere Benotzer derbäizesetzen",
	'povwatch_no_session' => "Feeler: De Formulaire konnt net verschafft ginn well d'Informatioune vun ärer Sessioun verluer gaang sinn.",
	'povwatch_not_allowed_push' => "Dir sidd keen Administrateur fir d'Iwwerwaache vun Ännerungskonflikten (POV Watch). Dir kënnt keng Säiten op d'Iwwerwaachungslëschte vun anere Benotzer derbäisetzen.",
	'povwatch_already_subscribed' => "Dir sidd scho fir d'Iwwerwwache vun Ännerungskonflikter ageschriwwen.",
	'povwatch_subscribed' => "Dir sidd elo fir d'Iwwerwaache vun Ännerungskonflikter ageschriwwen.",
	'povwatch_not_subscribed' => "Dir sidd net ageschriwwen fir Ännerungskonflikter z'iwwerwwachen. Dofir kënnt Dir iech och net ofmelden.",
	'povwatch_unsubscribed' => "Dir hutt iech elo ofgemeld fir Ännerungskonflikter z'iwwerwaachen.",
	'povwatch_invalid_title' => 'Den Titel deen Dir uginn hutt ass ongëlteg.',
	'povwatch_pushed' => '[[$1]] gouf op $2 {{PLURAL:$2|Iwwerwwachungslëscht|Iwwerwwachungslëschte}} vu Benotzer derbäigesat',
	'povwatch_intro' => "D'Iwwerwaache vun Ännerungskonflikten (PovWatch) erlaabt et fir ëmstridde Säiten diskret op d'Iwwerwaachungslëscht vun ageschriwwenen Administrateuren ze setzen.

Eng Lëscht vun de Säiten déi rezent ageschriwwe goufen ass [[Special:PovWatch/log|hei disponibel]].",
	'povwatch_subscriber_list' => "D'[[Special:PovWatch/subscribers|Lëscht vun den ageschriwwene Benotzer fannt Dir hei]].",
	'povwatch_subscriber_list_intro' => '<strong>Lëscht vun den ageschriwwene Benotzer</strong>',
	'povwatch_not_allowed_subscribers' => "Dir sidd net berechtegt fir d'Lëscht vun dene Benotzer ze gesinn déi ageschriwwe sinn fir Ännerungskonflikter z'iwwerwaachen.",
	'povwatch_unknown_subpage' => 'Onbekannten Ënnersäit.',
	'povwatch_push' => 'Derbäisetzen',
	'povwatch_push_intro' => "Benotzt de Formulaire ënnendrënner fir Säiten op d'Iwwerwaachungslëschte vun ageschriwwene Benotzer derbäizesetzen.

Sidd w.e.g. virsichteg wann Dir den Titel tippt: esouguer Säiten déi et net gëtt kënnen derbäigesat ginn, an et ass net méiglech den Titel nees ewechzehuelen wann et bis eemol derbäigesat gouf.",
	'povwatch_title' => 'Titel:',
	'povwatch_comment' => "Bemierkung (fir d'Logbicher/Lëschten):",
	'povwatch_no_log' => 'Dës Lëscht ass eidel.',
	'povwatch_no_subscribers' => 'Et gëtt keng Benotzer déi sech ageschriwwen hunn.',
	'povwatch_unsubscribe_intro' => "Dir sidd elo fir d'Iwwerwaache vun Ännerungskonflikter ageschriwwen.

Klickt the Knäppchen hei ënnendrënner fir iech ofzemelden.",
	'povwatch_unsubscribe' => 'Ofmelden',
	'povwatch_subscribe_intro' => "Dir sidd net ageschriwwen fir Ännerungskonflikter z'iwwerwaachen.

Klickt op de Knäppchen hei ënnendrënner fir iech anzeschreiwen.",
	'povwatch_subscribe' => 'Aschreiwen',
	'povwatch_added' => 'derbäigesat',
	'right-povwatch_admin' => "D'Benotzerrechter, fir Säiten op d'Iwwerwaachungslëschte vun anere Benotzer derbäizesetzen, verwalten",
	'right-povwatch_user' => 'Säiten op Iwwerwaachungslëschte vun anere Benotzer derbäisetzen',
	'action-povwatch_admin' => 'Benotzerrechter fir PovWatch ze verwalten',
	'action-povwatch_user' => "dës Säit op d'iwwerwaachungslëscht vun engem anere Benotzer derbäizesetzen",
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 * @author Tibor
 */
$messages['li'] = array(
	'povwatch' => 'POV-Beloer',
	'povwatch_desc' => "[[Special:PovWatch|Speciale pagina]] om pagina's op de volglies van angere gebroekers te plaatse",
	'povwatch_no_session' => "Fout: 't formeleer kós neet verwèrk waere ómdet de sessiegegaeves verlaore zeen gegange.",
	'povwatch_not_allowed_push' => "De bis geine administrator van PovWatch en kèns gein pazjena's op volglieste zètte.",
	'povwatch_already_subscribed' => 'Doe bös al geabonneertdj op POV-Beloer',
	'povwatch_subscribed' => 'Doe bös noe geabonneerdj op POV-Beloer',
	'povwatch_not_subscribed' => 'De bis neet geabonneerd op PovWatch, dus de kèns neet oetsjrieve.',
	'povwatch_unsubscribed' => 'Doe bös oetgesjreve van POV-Beloer',
	'povwatch_invalid_title' => 'De opgegaeve pazjenanaam is óngeljig',
	'povwatch_pushed' => '[[$1]] is succesvol toegeweze aan de volglies ven $2 {{PLURAL:$2|gebroeker|gebroekers}}.',
	'povwatch_intro' => "POV-Beloer is 'ne deens dae 't meugelik maak geveulige pazjena's discreet op de volglies van geabonneerdje administrators te zitte.

'n Logbook mit recènt toegeweze pazjena's op volglies is te bekieke op [[Special:PovWatch/log]].",
	'povwatch_subscriber_list' => "d'r Is 'ne [[Special:PovWatch/subscribers|lies mit abonnees]] besjikbaar.",
	'povwatch_subscriber_list_intro' => '<strong>Abonnees</strong>',
	'povwatch_not_allowed_subscribers' => 'Doe moogs de lies van abonnees op POV-Beloer neet bekieke.',
	'povwatch_unknown_subpage' => 'Ónbekindje subpazjena.',
	'povwatch_push' => 'Toewieze',
	'povwatch_push_intro' => "Gebroek 't óngersjtaonde formeleer óm pazjena's op de volglies van abonnees te zètte. Bis veurzichtig bie 't inveure van de pazjena; zelfs neet-besjtaonde pazjena's kónne toegevoeg waere en de kèns de pazjena neet wusje es die is toegeweze.",
	'povwatch_title' => 'Pazjena:',
	'povwatch_comment' => 'Logbookopmèrking:',
	'povwatch_no_log' => "'t Logbook is laeg.",
	'povwatch_no_subscribers' => "d'r Is nemes geabonneerdj.",
	'povwatch_unsubscribe_intro' => 'Doe bös noe geabonneerdj op POV-Beloer. Klik op de óngerstäönde knoep óm uch oet te sjrieve.',
	'povwatch_unsubscribe' => 'Oetsjrieve',
	'povwatch_subscribe_intro' => 'Doe bös neet ingesjreve veur POV-Beloer. Klik op de óngerstäönde knoep óm uch te abonnere.',
	'povwatch_subscribe' => 'Abonnere',
	'povwatch_added' => 'toegevoeg',
	'right-povwatch_admin' => "Beheer gebruikersrechten veur 't toevoege van artikele aan de volglies van angere gebroekers",
	'right-povwatch_user' => "Pagina's toevoege aan de volglies van anger gebroekers",
	'action-povwatch_admin' => 'rechte te behere veur PovWatch',
	'action-povwatch_user' => 'deze pagina toe te voege aan de volglies van een andere gebroeker',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'povwatch_subscribed' => 'താങ്കള്‍ ഇപ്പോള്‍ PovWatchന്റെ വരിക്കാരനാണ്‌',
	'povwatch_not_subscribed' => 'താങ്കള്‍ PovWatch-ല്‍ വരിക്കാരനല്ല. അതിനാല്‍ അണ്‍‌സബ്‌സ്ക്രൈബ് ചെയ്യുന്നതിനു സാദ്ധ്യമല്ല,',
	'povwatch_unsubscribed' => 'താങ്കള്‍ ഇപ്പോള്‍ PovWatchല്‍ നിന്നു അണ്‍സബ്‌സ്ക്രൈബ് ചെയ്തിരിക്കുന്നു.',
	'povwatch_invalid_title' => 'താങ്കള്‍ തിരഞ്ഞെടുത്ത ശീര്‍ഷകം അസാധുവാണ്‌',
	'povwatch_subscriber_list' => '[[Special:PovWatch/subscribers|വരിക്കാരുടെ പട്ടിക]] ലഭ്യമാണ്‌.',
	'povwatch_subscriber_list_intro' => '<strong>വരിക്കാരുടെ പട്ടിക</strong>',
	'povwatch_not_allowed_subscribers' => 'PovWatchന്റെ വരിക്കാരുടെ പട്ടിക കാണുന്നതിനു താങ്കള്‍ക്ക് അനുവാദമില്ല',
	'povwatch_unknown_subpage' => 'അജ്ഞാതമായ ഉപതാള്‍.',
	'povwatch_title' => 'ശീര്‍ഷകം:',
	'povwatch_comment' => 'അഭിപ്രായം രേഖപ്പെടുത്തുക:',
	'povwatch_no_log' => 'പ്രവര്‍ത്തന രേഖയില്‍ വിവരം ചേര്‍ത്തിട്ടില്ല.',
	'povwatch_no_subscribers' => 'വരിക്കാര്‍ നിലവിലില്ല.',
	'povwatch_unsubscribe_intro' => 'താങ്കള്‍ PovWatch-ല്‍ അംഗത്വമെടുത്തിരിക്കുന്നു. അംഗത്വം വിടാന്‍ താഴെയുള്ള ബട്ടണ്‍ ഞെക്കുക.',
	'povwatch_unsubscribe' => 'അണ്‍‌സബ്‌സ്ക്രൈബ്',
	'povwatch_subscribe_intro' => 'താങ്കള്‍ PovWatchല്‍ അംഗത്വം എടുത്തിട്ടില്ല. 
അംഗത്വം എടുക്കാന്‍ താഴെയുള്ള ബട്ടണ്‍ ഞെക്കുക.',
	'povwatch_subscribe' => 'സബ്‌സ്ക്രൈബ്',
	'povwatch_added' => 'ചേര്‍ത്തു',
	'right-povwatch_admin' => "മറ്റു ഉപയോക്താക്കളുടെ '''ശ്രദ്ധിക്കുന്ന താളുകളുടെ പട്ടിക'''യിലേക്കു താളുകള്‍ ചേര്‍ക്കാനുള്ള ഉപയോക്ത അവകാശം പരിപാലിക്കുക",
	'right-povwatch_user' => "മറ്റു ഉപയോക്താക്കളുടെ '''ശ്രദ്ധിക്കുന്ന താളുകളുടെ പട്ടിക'''യിലേക്കു താളുകള്‍ ചേര്‍ക്കുക",
);

/** Marathi (मराठी)
 * @author Kaustubh
 */
$messages['mr'] = array(
	'povwatch' => 'पीओव्हीवॉच',
	'povwatch_desc' => 'इतर सदस्यांच्या [[Special:PovWatch|पहार्‍याच्या सूचीत पाने घुसविण्यासाठी]]चे एक्स्टेंशन',
	'povwatch_no_session' => 'त्रुटी: सेशन डाटा हरविल्यामुळे अर्ज पाठवू शकत नाही.',
	'povwatch_not_allowed_push' => 'तुम्ही पीओव्हीवॉच प्रबंधक नाही, तुम्ही इतरांच्या पहार्‍याच्या सूचीत पाने घुसवू शकत नाही.',
	'povwatch_already_subscribed' => 'तुम्ही अगोदरच पीओव्हीवॉचचे सदस्य आहात',
	'povwatch_subscribed' => 'तुम्ही आता पीओव्हीवॉचचे सदस्य आहात',
	'povwatch_not_subscribed' => 'तुम्ही पीओव्हीवॉचचे सदस्य नाहीत, त्यामुळे तुम्ही सदस्यत्व रद्द करू शकत नाही.',
	'povwatch_unsubscribed' => 'तुम्ही आता पीओव्हीवॉचचे सदस्य नाहीत',
	'povwatch_invalid_title' => 'दिलेले शीर्षक चुकीचे आहे',
	'povwatch_pushed' => '$2 सदस्याच्या पहार्‍याच्या सूचीत [[$1]] घुसविण्यात आलेले आहे',
	'povwatch_intro' => 'पीओव्हीवॉच ही अशी सेवा आहे जिच्यामुळे सदस्य प्रबंधकांच्या पहार्‍याच्या सूचीत वाद निर्माण करणारी पाने गुप्तरित्या घुसवता येतात.

अलीकडील काळात घुसवलेल्या पानांची सूची [[Special:PovWatch/log]] इथे उपलब्ध आहे.',
	'povwatch_subscriber_list' => 'एक [[Special:PovWatch/subscribers|सदस्यांची यादी]] उपलब्ध आहे.',
	'povwatch_subscriber_list_intro' => '<strong>सदस्यांची यादी</strong>',
	'povwatch_not_allowed_subscribers' => 'तुम्ही पीओव्हीवॉच सदस्यांची यादी बघू शकत नाही.',
	'povwatch_unknown_subpage' => 'अनोळखी उपपान.',
	'povwatch_push' => 'घुसवा',
	'povwatch_push_intro' => 'इतर सदस्यांच्या पहार्‍याच्या सूचीत पाने घुसविण्यासाठी खालील अर्ज वापरा.
कृपया शीर्षक काळजीपूर्वक लिहा: अस्तित्वात नसलेली पाने सुद्धा घुसवली जातील, व एकदा घुसवलेले पान काढून टाकण्याचा कुठलाही मार्ग नाही.',
	'povwatch_title' => 'शीर्षक:',
	'povwatch_comment' => 'शेरा नोंदवा:',
	'povwatch_no_log' => 'नोंद सापडली नाही.',
	'povwatch_no_subscribers' => 'सदस्य नाहीत.',
	'povwatch_unsubscribe_intro' => 'तुम्ही पीओव्हीवॉच चे सदस्य आहात.
सदस्यत्व रद्द करण्यासाठी खालील कळीवर टिचकी द्या.',
	'povwatch_unsubscribe' => 'सदस्यत्व रद्द करा',
	'povwatch_subscribe_intro' => 'तुम्ही पीओव्हीवॉचचे सदस्य नाहीत.
सदस्यत्व घेण्यासाठी खालील कळीवर टिचकी मारा.',
	'povwatch_subscribe' => 'सदस्यत्व घ्या',
	'povwatch_added' => 'वाढविले',
	'right-povwatch_admin' => 'इतर सदस्यांच्या पहार्‍याच्या सूची मध्ये पाने वाढविण्यासाठी आवश्यक अशा सदस्य अधिकारांचे प्रबंधन करा',
	'right-povwatch_user' => 'इतर सदस्यांच्या पहार्‍याच्या सूचीत पाने वाढवा',
);

/** Malay (Bahasa Melayu)
 * @author Aviator
 */
$messages['ms'] = array(
	'povwatch_desc' => 'Penyambung untuk [[Special:PovWatch|menerbitkan laman ke dalam senarai pantau]] pengguna lain',
	'povwatch_no_session' => 'Ralat: Borang tidak dapat diserahkan kerana kehilangan data sesi.',
	'povwatch_not_allowed_push' => 'Anda bukan pentadbir PovWatch. Anda tidak boleh menerbitkan laman ke dalam senarai pantau pengguna.',
	'povwatch_already_subscribed' => 'Anda telah pun menyertai PovWatch',
	'povwatch_subscribed' => 'Anda telah menyertai PovWatch',
	'povwatch_not_subscribed' => 'Anda tidak menyertai PovWatch. Oleh itu, anda tidak boleh berhenti daripada menyertainya.',
	'povwatch_unsubscribed' => 'Anda telah berhenti daripada menyertai PovWatch',
	'povwatch_invalid_title' => 'Tajuk yang dinyatakan tidak sah',
	'povwatch_pushed' => '[[$1]] telah diterbitkan ke dalam $2 senarai pantau pengguna',
	'povwatch_subscriber_list' => 'Anda boleh melihat [[Special:PovWatch/subscribers|senarai peserta]].',
	'povwatch_subscriber_list_intro' => '<strong>Senarai peserta</strong>',
	'povwatch_not_allowed_subscribers' => 'Anda tidak dibenarkan melihat senarai peserta PovWatch.',
	'povwatch_unknown_subpage' => 'Sublaman tidak dikenali.',
	'povwatch_push' => 'Terbit',
	'povwatch_push_intro' => 'Gunakan borang berikut untuk menerbitkan laman-laman yang dikehendaki ke dalam senarai pantau peserta. Tajuk bagi laman yang tidak wujud boleh ditambah, namun tidak boleh dibuang balik selepas diterbitkan. Oleh itu, sila taip setiap tajuk laman dengan cermat.',
	'povwatch_title' => 'Tajuk:',
	'povwatch_comment' => 'Ulasan log:',
	'povwatch_no_log' => 'Tiada entri log.',
	'povwatch_no_subscribers' => 'Tiada peserta.',
	'povwatch_unsubscribe_intro' => 'Anda sedang menyertai PovWatch. Klik butang di bawah untuk berhenti menjadi peserta.',
	'povwatch_unsubscribe' => 'Berhenti menyertai',
	'povwatch_subscribe_intro' => 'Anda tidak menyertai PovWatch. Klik butang di bawah untuk mendaftar sebagai peserta.',
	'povwatch_subscribe' => 'Sertai',
	'povwatch_added' => 'ditambah',
	'right-povwatch_admin' => 'Mentadbir hak pengguna untuk menambah laman ke dalam senarai pantau pengguna lain',
	'right-povwatch_user' => 'Menambah laman ke dalam senarai pantau pengguna lain',
	'action-povwatch_user' => 'menambah laman ini ke dalam senarai pantau pengguna lain',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'povwatch_title' => 'Коняксозо:',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'povwatch_title' => 'Tōcāitl:',
	'povwatch_added' => 'ōmocēntili',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Extension för dat [[Special:PovWatch|Tofögen vun Sieden to de Oppasslistlist]] vun annere Brukers',
	'povwatch_no_session' => 'Fehler: Dat Formular kunn nich verarbeidt warrn, de Sitzungsdaten sünd verloren gahn.',
	'povwatch_not_allowed_push' => 'Du büst keen PovWatch-Administrater, du kannst keen Sieden to de Oppasslist vun annere Brukers tofögen.',
	'povwatch_already_subscribed' => 'Du büst al för PovWatch anmellt',
	'povwatch_subscribed' => 'Du büst nu för PovWatch anmellt',
	'povwatch_not_subscribed' => 'Du büst gornich för PovWatch anmellt un kannst di dorüm ok nich afmellen.',
	'povwatch_unsubscribed' => 'Du büst nu vun PovWatch afmellt',
	'povwatch_invalid_title' => 'De angeven Titel weer ungüllig',
	'povwatch_pushed' => '[[$1]] is to de Oppasslist vun {{PLURAL:$2|een Bruker|$2 Brukers}} toföögt worrn.',
	'povwatch_intro' => 'PovWatch is en Deenst, de Sieden, de en Oppasser bruukt, op de Oppasslist vun anmellt Administraters totofögen.

En Logbook vun de över PovWatch toföögt Sieden steit ünner [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'En [[Special:PovWatch/subscribers|List vun de anmellt Brukers]] is verföögbor.',
	'povwatch_subscriber_list_intro' => '<strong>List vun anmellt Brukers</strong>',
	'povwatch_not_allowed_subscribers' => 'Du dröffst de PovWatch-Brukerlist nich ankieken.',
	'povwatch_unknown_subpage' => 'Unbekannte Ünnersied.',
	'povwatch_push' => 'Tofögen',
	'povwatch_push_intro' => 'Bruuk dit Formular, dat du Sieden to de Oppasslistlist vun anmellt Brukers toföögst.
Wees vörsichtig bi’t Schrieven vun de Siedennaams. Ok Sieden, de dat gornich gifft, köönt toföögt warrn un dat geit nich wedder trüchtodreihn, wenn du de Sieden eerst toföögt hest.',
	'povwatch_title' => 'Titel:',
	'povwatch_comment' => 'Logbook-Kommentar:',
	'povwatch_no_log' => 'Gifft keen Logbookindrääg.',
	'povwatch_no_subscribers' => 'Nüms is anmellt.',
	'povwatch_unsubscribe_intro' => 'Du büst för PovWatch anmellt.
Klick op den Knopp, dat du di afmellst.',
	'povwatch_unsubscribe' => 'Abo afmellen',
	'povwatch_subscribe_intro' => 'Du büst för PovWatch nich anmellt.
Klick op den Knopp, dat du di anmellst.',
	'povwatch_subscribe' => 'Abonneren',
	'povwatch_added' => 'toföögt',
	'right-povwatch_admin' => 'Dat Brukerrecht towiesen, Sieden to de Oppasslist vun annere Brukers totofögen',
	'right-povwatch_user' => 'Tofögen vun Sieden to de Oppasslist vun annere Brukers',
	'action-povwatch_admin' => 'Brukerrechten för PovWatch to verwalten',
	'action-povwatch_user' => 'disse Sied to de Oppasslist vun en annern Bruker totofögen',
);

/** Dutch (Nederlands)
 * @author GerardM
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => "[[Special:PovWatch|Speciale pagina]] om pagina's op de volglijst van andere gebruikers te plaatsen",
	'povwatch_no_session' => 'Fout: het formulier kon niet verwerkt worden omdat de sessiegegevens verloren zijn gegaan.',
	'povwatch_not_allowed_push' => "U bent geen beheerder van PovWatch en kan geen pagina's op volglijsten zetten.",
	'povwatch_already_subscribed' => 'U bent al geabonneerd op PovWatch',
	'povwatch_subscribed' => 'U bent nu geabonneerd op PovWatch',
	'povwatch_not_subscribed' => 'U bent niet geabonneerd op PovWatch, dus u kunt niet uitschrijven.',
	'povwatch_unsubscribed' => 'U bent uitgeschreven van PovWatch',
	'povwatch_invalid_title' => 'De opgegeven paginanaam is ongeldig',
	'povwatch_pushed' => '[[$1]] is toegewezen aan de volglijst van $2 {{PLURAL:$2|gebruiker|gebruikers}}.',
	'povwatch_intro' => "PovWatch is een dienst die het mogelijk maakt gevoelige pagina's discreet op de volglijst van geabonneerde beheerders te zetten.

Een logboek met recent toegewezen pagina's op volglijsten is te bekijken op [[Special:PovWatch/log]].",
	'povwatch_subscriber_list' => 'Er is een [[Special:PovWatch/subscribers|lijst met abonnees]] beschikbaar.',
	'povwatch_subscriber_list_intro' => '<strong>Abonnees</strong>',
	'povwatch_not_allowed_subscribers' => 'U mag de lijst van abonnees op PovWatch niet bekijken.',
	'povwatch_unknown_subpage' => 'Onbekende subpagina.',
	'povwatch_push' => 'Toewijzen',
	'povwatch_push_intro' => "Gebruik het onderstaande formulier om pagina's op de volglijst van abonnees te zetten.
Wees voorzichtig bij het invoeren van de pagina: zelfs niet-bestaande pagina's kunnen toegevoegd worden en u kunt de pagina niet verwijderen als die is toegewezen.",
	'povwatch_title' => 'Pagina:',
	'povwatch_comment' => 'Logboekopmerking:',
	'povwatch_no_log' => 'Het logboek is leeg.',
	'povwatch_no_subscribers' => 'Er is niemand geabonneerd.',
	'povwatch_unsubscribe_intro' => 'U bent nu geabonneerd op PovWatch. Klik op de onderstaande knop om u uit te schrijven.',
	'povwatch_unsubscribe' => 'Uitschrijven',
	'povwatch_subscribe_intro' => 'U bent niet ingeschreven voor PovWatch. Klik op de onderstaande knop om u te abonneren.',
	'povwatch_subscribe' => 'Abonneren',
	'povwatch_added' => 'toegevoegd',
	'right-povwatch_admin' => 'Beheer gebruikersrechten voor het toevoegen van artikelen aan de volglijst van andere gebruikers',
	'right-povwatch_user' => "Pagina's toevoegen aan de volglijst van andere gebruikers",
	'action-povwatch_admin' => 'rechten te beheren voor PovWatch',
	'action-povwatch_user' => 'deze pagina toe te voegen aan de volglijst van een andere gebruiker',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Harald Khan
 * @author Jon Harald Søby
 */
$messages['nn'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Utviding for å [[Special:PovWatch|plassera sider på andre brukarar sine overvakingslister]]',
	'povwatch_no_session' => 'Feil: Kunne ikkje levera skjema grunna øktdatatap.',
	'povwatch_not_allowed_push' => 'Du er ikkje ein PovWatch-administrator, du kan ikkje plassera sider på overvakingslister.',
	'povwatch_already_subscribed' => 'Du abonnerer alt på PovWatch',
	'povwatch_subscribed' => 'Du abonnerer no på PovWatch',
	'povwatch_not_subscribed' => 'Du abonnerer ikkje på PovWatch, so du kan ikkje avslutta noko abonnement.',
	'povwatch_unsubscribed' => 'Du har no avslutta abonnementet på PovWatch',
	'povwatch_invalid_title' => 'Den oppgjevne tittelen var ikkje gyldig',
	'povwatch_pushed' => '[[$1]] har vorte plassert på {{PLURAL:$2|éi overvakingslista|$2 overvakingslister}}.',
	'povwatch_intro' => 'PovWatch er ei tenesta som lèt kontroversielle sider verta plasserte på overvakingslistene til abonnerande administratorar.

Ein logg over nylege plasseringar er tilgjengeleg på [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Ei [[Special:PovWatch/subscribers|lista over abonnentar]] er tilgjengeleg.',
	'povwatch_subscriber_list_intro' => '<strong>Abonnentlista</strong>',
	'povwatch_not_allowed_subscribers' => 'Du har ikkje tilgjenge til lista over PovWatch-abonnentar.',
	'povwatch_unknown_subpage' => 'Ukjend undersida.',
	'povwatch_push' => 'Plasser',
	'povwatch_push_intro' => 'Nytt skjemaet nedanfor for å plassera sider på overvakingslistene til abonnentar.
Ver varsam når du skriv inn tittelen; òg ikkje-eksisterande sider kan verta lagt til, og det er ingen måte å fjerna ein tittel på med ein gong han er plassert.',
	'povwatch_title' => 'Tittel:',
	'povwatch_comment' => 'Kommentar:',
	'povwatch_no_log' => 'Det finst ingen element i loggen.',
	'povwatch_no_subscribers' => 'Det finst ingen abonnentar.',
	'povwatch_unsubscribe_intro' => 'Du abonnerer på PovWatch. 
Trykk på knappen nedanfor for å stogga abonnementet.',
	'povwatch_unsubscribe' => 'Stogg abonnement',
	'povwatch_subscribe_intro' => 'Du abonnerer ikkje på PovWatch. 
Trykk på knappen nedanfor for å abonnera.',
	'povwatch_subscribe' => 'Abonner',
	'povwatch_added' => 'lagt til',
	'right-povwatch_admin' => 'Handsama brukarrettar for kven som kan leggja til sider i overvakingslistene til andre brukarar.',
	'right-povwatch_user' => 'Leggja til sider i overvakingslistene til andre brukarar.',
	'action-povwatch_admin' => 'handsama brukarrettar for PovWatch',
	'action-povwatch_user' => 'leggja til denne sida på overvakingslista til ein annan brukar',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Harald Khan
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Utvidelse for å [[Special:PovWatch|plassere sider på andre brukeres overvåkningsliste]]',
	'povwatch_no_session' => 'Feil: Kunne ikke levere skjema på grunn av øktdatatap.',
	'povwatch_not_allowed_push' => 'Du er ikke en PovWatch-administrator, du kan ikke plassere sider på overvåkningslister.',
	'povwatch_already_subscribed' => 'Du abonnerer allerede på PovWatch',
	'povwatch_subscribed' => 'Du abonnerer nå på PovWatch',
	'povwatch_not_subscribed' => 'Du abonnerer ikke på PovWatch, så du kan ikke avslutte noe abonnement.',
	'povwatch_unsubscribed' => 'Du har nå avsluttet abonnementet på PovWatch',
	'povwatch_invalid_title' => 'Den gitte tittelen var ugyldig',
	'povwatch_pushed' => '[[$1]] har blitt plassert på {{PLURAL:$2|éi overvåkningsliste|$2 overvåkningslister}}.',
	'povwatch_intro' => 'PovWatch er en tjeneste som lar kontroversielle sider bli plassert på abonnerende administratorers overvåkningslister.

En log over nylige plasseringer er tilgjengelig på [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'En [[Special:PovWatch/subscribers|liste over abonnenter]] er tilgjengelig.',
	'povwatch_subscriber_list_intro' => '<strong>Abonnentliste</strong>',
	'povwatch_not_allowed_subscribers' => 'Du kan ikke se listen over PovWatch-abonnenter.',
	'povwatch_unknown_subpage' => 'Ukjent underside.',
	'povwatch_push' => 'Plasser',
	'povwatch_push_intro' => 'Bruk skjemaet nedenfor for å plassere sider på abonnenters overvåkningslister.
Vær forsiktig når du skriver inn tittelen; også ikke-eksisterende sider kan legges til, og det er ingen måte å fjerne en tittel på med en gang den er plassert.',
	'povwatch_title' => 'Tittel:',
	'povwatch_comment' => 'Kommentar:',
	'povwatch_no_log' => 'Det er ingen elementer i loggen.',
	'povwatch_no_subscribers' => 'Det er ingen abonnenter.',
	'povwatch_unsubscribe_intro' => 'Du abonnerer på PovWatch. Klikk på knappen nedenfor for å avslutte abonnementet.',
	'povwatch_unsubscribe' => 'Avslutt abonnement',
	'povwatch_subscribe_intro' => 'Du abonnerer ikke på PovWatch. Klikk på knappen nedenfor for å abonnere.',
	'povwatch_subscribe' => 'Abonner',
	'povwatch_added' => 'lagt til',
	'right-povwatch_admin' => 'Administrere brukerrettigheter for hvem som kan legge til sider i andre brukeres overvåkningslister',
	'right-povwatch_user' => 'Legge til sider i andres overvåkningslister',
	'action-povwatch_admin' => 'administrere brukerrettigheter for PovWatch',
	'action-povwatch_user' => 'legge denne siden til overvåkningslista til en annen bruker',
);

/** Northern Sotho (Sesotho sa Leboa)
 * @author Mohau
 */
$messages['nso'] = array(
	'povwatch_title' => 'Thaetlele:',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'povwatch' => 'Susvelhança de las guèrras d’edicions',
	'povwatch_desc' => 'Extension permetent d’[[Special:PovWatch|apondre de paginas a la lista de seguit]] d’autres utilizaires',
	'povwatch_no_session' => 'Error : Impossible de sometre lo formulari en seguida de la pèrda de las donadas de la sesilha.',
	'povwatch_not_allowed_push' => 'Sètz pas un administrator per la susvelhança de las guèrras d’edicion. Podètz pas apondre los articles dins la lista correspondenta.',
	'povwatch_already_subscribed' => 'Ja sètz inscrich(a) per la susvelhança de las guèrras d’edicion.',
	'povwatch_subscribed' => 'Ara sètz inscrich(a) per la susvelhança de las guèrras d’edicion.',
	'povwatch_not_subscribed' => 'Sètz pas marcat(ada) per la susvelhança de las guèrras d’edicions. Atal doncas, vos podètz pas desmarcar.',
	'povwatch_unsubscribed' => 'Vòstra inscripcion per la susvelhança de las guèrras d’edicion ara es resiliada.',
	'povwatch_invalid_title' => 'Lo títol indicat es invalid.',
	'povwatch_pushed' => '[[$1]] es estada inscricha amb succès dins {{PLURAL:$2|la lista de susvelhança|las listas de susvelhança}} de l’utilizaire $2.',
	'povwatch_intro' => "La susvelhança de las guèrras d’edicion es un servici qu'autoriza la susvelhança discrèta dels articles conflictuals. Aquestes pòdon èsser inscriches dins la lista de susvelhança dels administrators enregistrats. Un jornal de susvelhança dels articles inscriches es disponible sus [[Special:PovWatch/log]].",
	'povwatch_subscriber_list' => 'Una [[Special:PovWatch/subscribers|lista dels abonats]] es disponibla.',
	'povwatch_subscriber_list_intro' => '<strong>Lista dels abonats</strong>',
	'povwatch_not_allowed_subscribers' => 'Avètz pas la permission de visionar la lista de las personas inscrichas per la susvelhança de las guèrras d’edicions.',
	'povwatch_unknown_subpage' => 'Sospagina desconeguda.',
	'povwatch_push' => 'Inscriure',
	'povwatch_push_intro' => "Utilizatz lo formulari çaijós per inscriure los articles dins la tièra de susvelhança dels utilizaires abonats. Inscrivètz escrupulosament lo títol : los articles pòdon quitament èsser aponduts, e existís pas cap d'eissida per o levar un còp inscrich.",
	'povwatch_title' => 'Títol :',
	'povwatch_comment' => 'Comentari del jornal :',
	'povwatch_no_log' => "Existís pas cap d'entrada dins lo jornal.",
	'povwatch_no_subscribers' => 'Existís pas cap de persona abonada.',
	'povwatch_unsubscribe_intro' => 'Sètz inscrich(-a) a la lista de susvelhança de las guèrras d’edicion. Clicatz sul boton çaijós per vos desinscriure.',
	'povwatch_unsubscribe' => 'Resiliar',
	'povwatch_subscribe_intro' => 'Sètz pas marcat(ada) sus la tièra de susvelhança de las guèrras d’edicions. Clicatz sul boton çaijós per vos marcar.',
	'povwatch_subscribe' => 'Soscriure',
	'povwatch_added' => 'apondut',
	'right-povwatch_admin' => "Administrar los dreches d’utilizaire per l'ajust de paginas a la lista de seguit dels autres utilizaires.",
	'right-povwatch_user' => 'Apond de paginas a la lista de seguit dels autres utilizaires',
	'action-povwatch_admin' => "administrar los dreches d'utilizaire per PovWatch",
	'action-povwatch_user' => "apondre aquesta pagina a la lista de seguit d'autres utilizaires",
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$messages['os'] = array(
	'povwatch_title' => 'Сæргонд:',
);

/** Polish (Polski)
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'povwatch' => 'Strażnik POV',
	'povwatch_desc' => 'Rozszerzenie służące [[Special:PovWatch|do wstawiania stron na listę obserwowanych]] innych użytkowników',
	'povwatch_no_session' => 'Błąd! Nie można zapisać formularza z powodu utraty danych sesji.',
	'povwatch_not_allowed_push' => 'Nie jesteś administratorem „Strażnika POV”, dlatego nie możesz wstawiać stron na listę obserwowanych.',
	'povwatch_already_subscribed' => 'Prenumerujesz już w obserwowanych „Strażnika POV”',
	'povwatch_subscribed' => 'Zaprenumerowałeś w obserwowanych „Strażnika POV”',
	'povwatch_not_subscribed' => 'Nie prenumerujesz w obserwowanych „Strażnika POV”, więc nie możesz zakończyć prenumeraty.',
	'povwatch_unsubscribed' => 'Zaprzestałeś prenumeraty w obserwowanych „Strażnika POV”',
	'povwatch_invalid_title' => 'Podany tytuł jest nieprawidłowy',
	'povwatch_pushed' => '[[$1]] został dodany do obserwowanych u $2 {{PLURAL:$2|użytkownika|użytkowników}}',
	'povwatch_intro' => '„Strażnik POV” jest mechanizmem, który umożliwia administratorom tej usługi w dyskretny sposób dodawać strony do listy obserwowanych innych użytkowników.

Rejestr ostatnich operacji dodawania dostępny jest na stronie [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Dostępna jest [[Special:PovWatch/subscribers|lista prenumerujących]].',
	'povwatch_subscriber_list_intro' => '<strong>Lista prenumerujących</strong>',
	'povwatch_not_allowed_subscribers' => 'Nie masz uprawnień aby zobaczyć listę prenumerujących „Strażnika POV”.',
	'povwatch_unknown_subpage' => 'Nieznana podstrona.',
	'povwatch_push' => 'Dodaj',
	'povwatch_push_intro' => 'Użyj formularza aby dodać stronę do listy obserwowanych użytkowników prenumerujących „Strażnika POV”.
Uważnie wprowadź tytuł - możesz dodać nieistniejący artykuł, a nie będziesz miał później możliwości usunięcia raz dodanego tytułu.',
	'povwatch_title' => 'Tytuł:',
	'povwatch_comment' => 'Komentarz',
	'povwatch_no_log' => 'Brak wpisów w rejestrze.',
	'povwatch_no_subscribers' => 'Brak prenumeratorów.',
	'povwatch_unsubscribe_intro' => 'Prenumerujesz „Strażnika POV”
Kliknij guzik poniżej jeśli chcesz zaprzestać prenumeraty.',
	'povwatch_unsubscribe' => 'Zakończ prenumeratę',
	'povwatch_subscribe_intro' => 'Nie prenumerujesz „Strażnika POV”.
Kliknij guzik poniżej aby zaprenumerować.',
	'povwatch_subscribe' => 'Zaprenumeruj',
	'povwatch_added' => 'dodano',
	'right-povwatch_admin' => 'Uprawnienia administratora „Strażnika POV” umożliwiające dodawanie stron do listy obserwowanych innych użytkowników',
	'right-povwatch_user' => 'Dodawanie stron do listy obserwowanych przez innych użytkowników',
	'action-povwatch_admin' => 'administrowania uprawnieniami użytkowników „Strażnika POV”',
	'action-povwatch_user' => 'dodania tej strony do listy obserwowanych innego użytkownika',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'povwatch_invalid_title' => 'ستاسو ځانګړی شوی سرليک سم نه وو',
	'povwatch_title' => 'سرليک:',
);

/** Portuguese (Português)
 * @author Lijealso
 * @author Malafaya
 * @author Sir Lestaty de Lioncourt
 * @author Waldir
 */
$messages['pt'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Extensão para [[Special:PovWatch|adicionar páginas nas listas de artigos vigiados]] de outros utilizadores',
	'povwatch_no_session' => 'Erro: Não foi possível submeter o formulário devida a perda de dados da sessão.',
	'povwatch_not_allowed_push' => 'Você não é um administrador PovWatch, você não pode adicionar páginas em listas de artigos vigiados.',
	'povwatch_already_subscribed' => 'Você já esta inscrito para o PovWatch',
	'povwatch_subscribed' => 'Você está subscrito agora para o Povwatch',
	'povwatch_not_subscribed' => 'Você não está inscrito no PovWatch, por isso não pode remover sua inscrição.',
	'povwatch_unsubscribed' => 'Você não está mais inscrito na lista do PovWatch',
	'povwatch_invalid_title' => 'O título especificado é inválido',
	'povwatch_pushed' => '[[$1]] foi adicionada com sucesso à lista de páginas vigiadas de {{PLURAL:$2|$2 utilizador|$2 utilizadores}}',
	'povwatch_intro' => 'PovWatch é um serviço que permite que páginas sejam discretamente adicionadas para a lista de artigos vigiados de administradores subscritos.

Um registro das recentes páginas adicionadas na lista de artigos vigiados está disponível na página [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Uma [[Special:PovWatch/subscribers|lista de subscritos]] está disponível.',
	'povwatch_subscriber_list_intro' => '<strong>Lista de subscritos</strong>',
	'povwatch_not_allowed_subscribers' => 'Você não tem permissão para visualizar a lista de subscritos do PovWatch.',
	'povwatch_unknown_subpage' => 'Subpágina desconhecida.',
	'povwatch_push' => 'Enviar',
	'povwatch_push_intro' => 'Utilize o formulário abaixo para adicionar páginas na lista de artigos vigiados de utilizadores subscritos.
Tenha cuidado ao digitar o título: mesmo os títulos que não existem podem ser adicionados, e não há uma maneira de remover um título depois de ter sido adicionado.',
	'povwatch_title' => 'Título:',
	'povwatch_comment' => 'Registrar comentário:',
	'povwatch_no_log' => 'Não há regitros',
	'povwatch_no_subscribers' => 'Não existem subscritores.',
	'povwatch_unsubscribe_intro' => 'Você está subscrito para o PovWatch.
Clique no botão abaixo para remover sua inscrição.',
	'povwatch_unsubscribe' => 'Cancelar subscrição',
	'povwatch_subscribe_intro' => 'Você não está subscrito para o PovWatch.
Clique no botão abaixo para subscrever.',
	'povwatch_subscribe' => 'Subscrever',
	'povwatch_added' => 'adicionado',
	'right-povwatch_admin' => 'Administrar privilégios do utilizador para adicionar páginas nas listas de artigos vigiados de outros utilizadores',
	'right-povwatch_user' => 'Adicionar páginas na lista de artigos vigiados de outros utilizadores',
	'action-povwatch_admin' => 'administrar direitos de utilizador para o PovWatch',
	'action-povwatch_user' => 'adicionar esta página à lista de vigiados de outro utilizador',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 */
$messages['pt-br'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Extensão para [[Special:PovWatch|adicionar páginas nas listas de artigos vigiados]] de outros utilizadores',
	'povwatch_no_session' => 'Erro: Não foi possível enviar o formulário devido a perda de dados da sessão.',
	'povwatch_not_allowed_push' => 'Você não é um administrador PovWatch, você não pode adicionar páginas em listas de artigos vigiados.',
	'povwatch_already_subscribed' => 'Você já esta inscrito para o PovWatch',
	'povwatch_subscribed' => 'Você agora está inscrito para o Povwatch',
	'povwatch_not_subscribed' => 'Você não está inscrito no PovWatch, por isso não pode remover sua inscrição.',
	'povwatch_unsubscribed' => 'Você não está mais inscrito no PovWatch',
	'povwatch_invalid_title' => 'O título especificado é inválido',
	'povwatch_pushed' => '[[$1]] foi adicionada com sucesso à lista de páginas vigiadas de {{PLURAL:$2|$2 utilizador|$2 utilizadores}}',
	'povwatch_intro' => 'PovWatch é um serviço que permite que páginas sejam discretamente adicionadas para a lista de artigos vigiados de administradores inscritos.

Um registro das páginas adicionadas recentemente na lista de artigos vigiados está disponível na página [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Uma [[Special:PovWatch/subscribers|lista de inscritos]] está disponível.',
	'povwatch_subscriber_list_intro' => '<strong>Lista de inscritos</strong>',
	'povwatch_not_allowed_subscribers' => 'Você não tem permissão para visualizar a lista de inscritos no PovWatch.',
	'povwatch_unknown_subpage' => 'Subpágina desconhecida.',
	'povwatch_push' => 'Enviar',
	'povwatch_push_intro' => 'Utilize o formulário abaixo para adicionar páginas na lista de artigos vigiados de utilizadores inscritos.
Tenha cuidado ao digitar o título: mesmo os títulos que não existem podem ser adicionados, e não há uma maneira de remover um título depois de ter sido adicionado.',
	'povwatch_title' => 'Título:',
	'povwatch_comment' => 'Registrar comentário:',
	'povwatch_no_log' => 'Não há regitros',
	'povwatch_no_subscribers' => 'Não existem inscritos.',
	'povwatch_unsubscribe_intro' => 'Você está inscrito no PovWatch.
Clique no botão abaixo para remover sua inscrição.',
	'povwatch_unsubscribe' => 'Cancelar inscrição',
	'povwatch_subscribe_intro' => 'Você não está inscrito no PovWatch.
Clique no botão abaixo para inscrever-se.',
	'povwatch_subscribe' => 'Inscrever-se',
	'povwatch_added' => 'adicionado',
	'right-povwatch_admin' => 'Administrar privilégios do utilizador para adicionar páginas nas listas de artigos vigiados de outros utilizadores',
	'right-povwatch_user' => 'Adicionar páginas na lista de artigos vigiados de outros utilizadores',
	'action-povwatch_admin' => 'administrar direitos de utilizador para o PovWatch',
	'action-povwatch_user' => 'adicionar esta página à lista de vigiados de outro utilizador',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'povwatch_invalid_title' => 'Titlul specificat este incorect',
	'povwatch_unknown_subpage' => 'Subpagină necunoscută.',
	'povwatch_title' => 'Titlu:',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'povwatch_added' => 'aggiunde',
);

/** Russian (Русский)
 * @author Ferrer
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'povwatch' => 'НтзНадзор',
	'povwatch_desc' => 'Расширение, позволяющее [[Special:PovWatch|помещать страницы в списки наблюдения]] других участников',
	'povwatch_no_session' => 'Ошибка. Невозможно отправить форму из-за потери данных сессии.',
	'povwatch_not_allowed_push' => 'Вы не являетесь администратором НтзНадзора, вы не можете помещать страницы в списки наблюдения.',
	'povwatch_already_subscribed' => 'Вы уже подписаны на НтзНадзор',
	'povwatch_subscribed' => 'Теперь вы подписаны на НтзНадзор',
	'povwatch_not_subscribed' => 'Вы не подписаны на НтзНадзор, поэтому вы не можете отписаться.',
	'povwatch_unsubscribed' => 'Вы отписались от НтзНадзора.',
	'povwatch_invalid_title' => 'Указанный заголовок неверен',
	'povwatch_pushed' => '[[$1]] была успешно помещёна в список наблюдения $2 {{PLURAL:$2|участника|участников|участников}}',
	'povwatch_intro' => 'НтзНадзор (PovWatch ) — служба, позволяющая скрытно помещать спорные страницы в списки наблюдения подписанных администраторов.

Журнал недавних помещений в списки наблюдения доступен на странице [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Доступен [[Special:PovWatch/subscribers|список подписчиков]].',
	'povwatch_subscriber_list_intro' => '<strong>Список подписчиков</strong>',
	'povwatch_not_allowed_subscribers' => 'Вам не разрешено просматривать список подписчиков НтзНадзора.',
	'povwatch_unknown_subpage' => 'Неизвестная подстраница.',
	'povwatch_push' => 'Поместить',
	'povwatch_push_intro' => 'Используйте форму ниже, чтобы поместить страницы в списки наблюдения подписанных участников. Пожалуйста, будьте осторожны набирая название: даже несуществующие названия могут быть добавлены, и нет никакой возможности удалить название, если оно уже было добавлено.',
	'povwatch_title' => 'Название:',
	'povwatch_comment' => 'Примечание для журнала:',
	'povwatch_no_log' => 'Нет записей в журнале.',
	'povwatch_no_subscribers' => 'Нет подписчиков.',
	'povwatch_unsubscribe_intro' => 'Вы подписались на НтзНадзор. Нажмите на кнопку ниже, чтобы отписаться.',
	'povwatch_unsubscribe' => 'Отписаться',
	'povwatch_subscribe_intro' => 'Вы не подписаны на НтзНадзор. Нажмите кнопку ниже, чтобы подписаться.',
	'povwatch_subscribe' => 'Подписаться',
	'povwatch_added' => 'добавлен',
	'right-povwatch_admin' => 'управление правом участников добавлять страницы в чужие списки наблюдения',
	'right-povwatch_user' => 'Добавлять страницы в список наблюдения других участников',
	'action-povwatch_admin' => 'управлять правами участников для НтзНадзора',
	'action-povwatch_user' => 'добавить эту страницу в список наблюдения другого участника',
);

/** Yakut (Саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Сирэйдэри атын киһи [[Special:PovWatch|кэтээн көрүүтүн тиһигэр киллэрэргэ]] туһаныллар тупсарыы',
	'povwatch_no_session' => 'Алҕас: Ситим быстан форма кыайан ыытыллыбата.',
	'povwatch_not_allowed_push' => 'PovWatch дьаһабыла буолбатаххын, онон сирэйдэри кэтэбил тиһигэр эбэр кыаҕыҥ суох эбит.',
	'povwatch_already_subscribed' => 'PovWatch сурутуутугар бэлиэр суруппут эбиккин',
	'povwatch_subscribed' => 'PovWatch сурутуутугар дьэ суруттуҥ',
	'povwatch_not_subscribed' => 'PovWatch сурутуутугар суруппатах эбиккин, онон ол сурутуугун сотор кыаҕыҥ суох буоллаҕа.',
	'povwatch_unsubscribed' => 'PovWatch сурутуутутун тохтоттуҥ',
	'povwatch_invalid_title' => 'Ааттаммыт бас сыыһалаах',
	'povwatch_pushed' => '[[$1]] $2 кыттааччы кэтээн көрүүтүн {{PLURAL:$2|тиһигэр|тиһиктэригэр}} сөпкө киирдэ',
	'povwatch_intro' => 'PovWatch - дьаһабыллар кэтээн көрүүлэригэр мөккүөрдээх сирэйдэри атыттартан кистээн киллэрэр сулууспа.

Соторутааҕыта кэтэбилгэ угуллубут сирэйдэр тиһиктэрэ манна баар [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => '[[Special:PovWatch/subscribers|Сурутааччылар тиһиктэрэ]] баар.',
	'povwatch_subscriber_list_intro' => '<strong>Сурутааччылар тиһиктэрэ</strong>',
	'povwatch_not_allowed_subscribers' => 'Эн PovWatch сурутааччыларын тиһигин көрөр кыаҕыҥ суох.',
	'povwatch_unknown_subpage' => 'Биллибэт алын сирэй.',
	'povwatch_push' => 'Угарга',
	'povwatch_push_intro' => 'Аллара баар форманы туһанан суруттарбыт кыттааччылар кэтиир сирэйдэригэр туһааннаах сирэйдэри киллэр. Ааты таларгытыгар сэрэнээр: суох да ааттар эбиллиэхтэрин сөп, ону төттөрү сотор кыах суох буолуо.',
	'povwatch_title' => 'Аата:',
	'povwatch_comment' => 'Сурунаал быһаарыыта:',
	'povwatch_no_log' => 'Сурунаалга сурук суох.',
	'povwatch_no_subscribers' => 'Сурутааччылар суохтар.',
	'povwatch_unsubscribe_intro' => 'PovWatch сурутуутугар суруттуҥ.
Аллараа тимэҕи баттаан сурутууттан аккаастаныаххын сөп.',
	'povwatch_unsubscribe' => 'Сурутууттан аккаастаныы',
	'povwatch_subscribe_intro' => 'PovWatch сурутууга суруппатаххын.
Аллараа тимэҕи баттаан сурутуоххун сөп.',
	'povwatch_subscribe' => 'Сурутуу',
	'povwatch_added' => 'эбилиннэ',
	'right-povwatch_admin' => 'кыттааччылар атын кыттааччылар кэтээһиннэригэр сирэйдэри эбэллэрин салайыы',
	'right-povwatch_user' => 'Атын кыттааччылар кэтээһиннэригэр сирэй эбээһин',
	'action-povwatch_admin' => 'PovWatch анаан кыттааччылар бырааптарын салайыы',
	'action-povwatch_user' => 'бу сирэйи атын кыттааччы кэтээһинигэр киллэр',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Rozšírenie na [[Special:PovWatch|pridávanie stránok na zoznamy sledovaných stránok]] ostatných používateľov',
	'povwatch_no_session' => 'Error: nebolo možné odoslať formulár kvôli strate údajov prihlasovacej relácie.',
	'povwatch_not_allowed_push' => 'Nie ste správca PovWatch, nemôžete pridávať stránky na zoznamy sledovaných stránok.',
	'povwatch_already_subscribed' => 'Už ste sa prihlásili na odber PovWatch',
	'povwatch_subscribed' => 'Teraz ste sa prihlásili na odber PovWatch',
	'povwatch_not_subscribed' => 'Nie ste prihlásený na odber PovWatch, takže ho nemôžete odhlásiť.',
	'povwatch_unsubscribed' => 'Teraz ste sa odhlásili z odberu PovWatch',
	'povwatch_invalid_title' => 'Zadaný názov bol neplatný',
	'povwatch_pushed' => '[[$1]] bolo úspešne pridané na {{PLURAL:$2|zoznam sledovaných stránok jedného používateľa|zoznamy sledovaných stránok $2 používateľov}}',
	'povwatch_intro' => 'PovWatch je služba, ktorá umožňuje diskrétne pridávať obsažné stránky na zoznamy sledovaných stránok správcov, ktorí si to objednali.

Záznam posledných zoznamov sledovaných stránok sa nachádza na [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Je dostupný [[Special:PovWatch/subscribers|zoznam odoberateľov]].',
	'povwatch_subscriber_list_intro' => '<strong>Zoznam odoberateľov</strong>',
	'povwatch_not_allowed_subscribers' => 'Nemáte oprávnenie prehliadať zoznam odoberateľov PovWatch.',
	'povwatch_unknown_subpage' => 'Neznáma podstránka.',
	'povwatch_push' => 'Pridať',
	'povwatch_push_intro' => 'Použite tento formulár na pridanie stránok na zoznamy sledovaných stránok používateľov, ktorí ich odoberajú. Prosím, buďte pozorní pri písaní názvu stránky, je možné pridať aj názvy neexistujúcich stránok a neexistuje spôsob ako ich odstrániť, keď raz boli pridané.',
	'povwatch_title' => 'Názov:',
	'povwatch_comment' => 'Komentár v zázname:',
	'povwatch_no_log' => 'Neexistujú žiadne položky záznamu.',
	'povwatch_no_subscribers' => 'Neexistujú žiadni odoberatelia.',
	'povwatch_unsubscribe_intro' => 'Prihlásili ste sa na odber PovWatch. Odhlásiť odber môžete kliknutím na tlačidlo dolu.',
	'povwatch_unsubscribe' => 'Odhlásiť odber',
	'povwatch_subscribe_intro' => 'Nie ste prihlásený na odber PovWatch. Prihlásiť odber môžete kliknutím na tlačidlo dolu.',
	'povwatch_subscribe' => 'Prihlásiť odber',
	'povwatch_added' => 'pridaný',
	'right-povwatch_admin' => 'Spravovať oprávnenie pridávať stránky do zoznamu sledovaných ostatných používateľov',
	'right-povwatch_user' => 'Pridávať stránku do zoznamu sledovaných ostatných používateľov',
	'action-povwatch_admin' => 'spravovať práva používateľov PovWatch',
	'action-povwatch_user' => 'pridať túto stránku na zoznam sledovaných stránok iného používateľa',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Sasa Stefanovic
 */
$messages['sr-ec'] = array(
	'povwatch_title' => 'Наслов:',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Ärwiederenge, uum [[Special:PovWatch|Sieden fon ju Beoboachtengslieste]] fon uur Benutsere bietoutouföigjen',
	'povwatch_no_session' => 'Failer: Formulardoaten konnen nit feroarbaided wäide, deer do Sittengsdoaten ferlädden geen sunt.',
	'povwatch_not_allowed_push' => 'Du bäst naan PovWatch-Administrator un koast froamde Beooboachtengsliesten neen Sieden bietouföigje.',
	'povwatch_already_subscribed' => 'Du bäst al foar PovWatch registrierd',
	'povwatch_subscribed' => 'Du bäst nu foar Povwatch registrierd',
	'povwatch_not_subscribed' => 'Du bäst nit foar PovWatch registrierd; ne Oumäldenge is deeruum nit muugelk.',
	'povwatch_unsubscribed' => 'Du bäst nu fon PovWatch oumälded',
	'povwatch_invalid_title' => 'Die anroate Siedennoome is uungultich',
	'povwatch_pushed' => '[[$1]] wuud mäd Ärfoulch {{PLURAL:$2|ju Beooboachtengslieste fon n Benutser|do Beooboachtungsliesten fon $2 Benutsere}} bietouföiged.',
	'povwatch_intro' => 'PovWatch is n Service, uum uumstriedede Sieden diskret do Beooboachtengsliesten fon registrierde Administratore bietoutouföigjen.

N Logbouk fon do uur PovWatch bietouföigede Sieden is ferföichboar unner [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Ne [[Special:PovWatch/subscribers|Lieste fon do registrierde Benutsere]] is ferföichboar.',
	'povwatch_subscriber_list_intro' => '<strong>Lieste fon do registrierde Benutsere</strong>',
	'povwatch_not_allowed_subscribers' => 'Du hääst neen Begjuchtigenge, ju PovWatch-Benutserlieste ientoukiekjen.',
	'povwatch_unknown_subpage' => 'Uunbekoande Unnersiede',
	'povwatch_push' => 'Bietouföigje',
	'povwatch_push_intro' => 'Benuts dät Formular, uum Sieden an do Beooboachtengsliesten mäd registrierde Benutsere bietoutouföigjen.
Beoachtje: uk nit foarhoundene Sieden konnen bietouföiged wäide un dät rakt naan Wai, dät tourääch tou traalen.',
	'povwatch_title' => 'Siedennoome:',
	'povwatch_comment' => 'Logbouk-Kommentoar:',
	'povwatch_no_log' => 'Dät Logbouk änthaalt neen Iendraage.',
	'povwatch_no_subscribers' => 'Dät rakt neen registrierde Benutsere.',
	'povwatch_unsubscribe_intro' => 'Du bäst foar Povwatch registrierd. Klik ap dän Knoop unner, uum die antoumäldjen.',
	'povwatch_unsubscribe' => 'Oumäldje',
	'povwatch_subscribe_intro' => 'Du bäst nit foar PovWatch registrierd. Klik ap dän Knoop unner, uum die antoumäldjen.',
	'povwatch_subscribe' => 'Registrierje',
	'povwatch_added' => 'bietouföiged',
	'right-povwatch_admin' => 'Dät Benutsergjucht touluuke of äntluuke, Sieden tou ju Beooboachtengslieste fon uur Benutsere bietouföigje tou duuren',
	'right-povwatch_user' => 'Bietouföigjen fon Sieden tou ju Beooboachtengslieste fon uur Benutsere',
	'action-povwatch_admin' => 'Gjuchte foar PovWatch tou ferwaltjen',
	'action-povwatch_user' => 'föigje disse Siede tou ju Beoboachtengslieste fon n uur Benutser bietou',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author Jon Harald Søby
 * @author M.M.S.
 * @author Najami
 */
$messages['sv'] = array(
	'povwatch' => 'PovBevakning',
	'povwatch_desc' => 'Programtillägg för att [[Special:PovWatch|placera sidor på andra användares bevakningslistor]]',
	'povwatch_no_session' => 'Fel: Kunde inte leverera formulär på grund av tapp av sessionsdata.',
	'povwatch_not_allowed_push' => 'Du är inte en PovBevaknings-administratör, du kan inte placera sidor på bevakningslistor.',
	'povwatch_already_subscribed' => 'Du abonnerar redan på PovBevakning',
	'povwatch_subscribed' => 'Du abonnerar nu på PovBevakning',
	'povwatch_not_subscribed' => 'Du abonnerar inte på PovBevakning, så du kan inte sluta abonnera.',
	'povwatch_unsubscribed' => 'Du har nu slutat abonnera på PovBevakning',
	'povwatch_invalid_title' => 'Den angivna titeln var ogiltig',
	'povwatch_pushed' => '[[$1]] har placerats på användaren $2:s {{PLURAL:$2|bevakningslista|bevakningslistor}}',
	'povwatch_intro' => 'PovBevakning är en tjänst som låter kontroversiella sidor bli placerade på abonnerande administratörers bevakningslistor.

En logg över dom senaste placeringarna är tillgänglig på [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'En [[Special:PovWatch/subscribers|lista över abonnenter]] är tillgänglig.',
	'povwatch_subscriber_list_intro' => '<strong>Lista över abonnenter</strong>',
	'povwatch_not_allowed_subscribers' => 'Du är inte tillåten att se listan över PovBevakning-abonnenter.',
	'povwatch_unknown_subpage' => 'Okänd undersida.',
	'povwatch_push' => 'Tryck',
	'povwatch_push_intro' => 'Använd formuläret nedan för att placera sidor på abonnenters bevakninglistor.
Var försiktig när du skriver in titeln; ej existerande sidor kan också läggas till, och det finns inget sätt att ta bort en titel när den har placerats ut.',
	'povwatch_title' => 'Titel:',
	'povwatch_comment' => 'Kommentar:',
	'povwatch_no_log' => 'Det finns inga element i loggen.',
	'povwatch_no_subscribers' => 'Det finns inga abonnenter.',
	'povwatch_unsubscribe_intro' => 'Du abonnerar på PovBevakning.
Klicka på knappen nedan för att avsluta abonnemanget.',
	'povwatch_unsubscribe' => 'Avsluta abonnemang',
	'povwatch_subscribe_intro' => 'Du abonnerar inte på PovBevakning.
Klicka på knappen nedan för att abonnera.',
	'povwatch_subscribe' => 'Abonnera',
	'povwatch_added' => 'tillaggd',
	'right-povwatch_admin' => 'Administrera användarrättigheter för tilläggande av sidor i andra användares bevakningslistor',
	'right-povwatch_user' => 'Lägga till sidor i andra användares bevakningslistor',
	'action-povwatch_admin' => 'hantera användarrättigheter för PovWatch',
	'action-povwatch_user' => 'lägg till denna sida till bevakningslistan för en annan användare',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'povwatch_invalid_title' => 'మీరిచ్చిన శీర్షిక సరైనది కాదు',
	'povwatch_subscriber_list_intro' => '<strong>చందాదార్ల జాబితా</strong>',
	'povwatch_unknown_subpage' => 'గుర్తుతెలియని ఉపపేజీ.',
	'povwatch_title' => 'శీర్షిక:',
	'povwatch_comment' => 'చిట్టా వ్యాఖ్య:',
	'povwatch_no_log' => 'దినచర్యలో అంశాలేమీ లేవు.',
	'povwatch_no_subscribers' => 'చందాదార్లు ఎవరూ లేరు.',
	'povwatch_added' => 'చేర్చాం',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$messages['tet'] = array(
	'povwatch_title' => 'Títulu:',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'povwatch_unknown_subpage' => 'Зерсаҳифаи ношинос.',
	'povwatch_title' => 'Унвон:',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Karugtong para [[Special:PovWatch|pagtulak ng mga pahina patungo sa ibabaw ng mga talaan ng binabantayan]] ng ibang mga tagagamit',
	'povwatch_no_session' => 'Kamalian: Hindi maipasa ang pormularyo dahil sa isang kawalan ng nakalaang oras/panahon na nakalaan para sa dato.',
	'povwatch_not_allowed_push' => "Hindi ka isang tagapangasiwa ng ''PovWatch'', hindi mo maitutulak ang mga pahina patungo sa mga talaan ng binabantayan.",
	'povwatch_already_subscribed' => "Tumatanggap ka na ng sipi ng ''PovWatch''",
	'povwatch_subscribed' => "Tatanggap ka na ngayon ng sipi ng ''PovWatch''",
	'povwatch_not_subscribed' => "Hindi ka pa tumatanggap ng sipi ng ''PovWatch'', kaya't hindi ka maaaring humiling na huwag tumanggap ng sipi.",
	'povwatch_unsubscribed' => "Hindi na ngayon tatanggap ng sipi ng ''PovWatch''",
	'povwatch_invalid_title' => 'Hindi tanggap ang tinukoy na pamagat',
	'povwatch_pushed' => 'Matagumpay na naitulak ang [[$1]] patungo sa $2 {{PLURAL:$2|talaan ng binabantayan|mga talaan ng binabantayan}} ng tagagamit',
	'povwatch_intro' => "Ang ''PovWatch'' ay isang paglilingkod/serbisyo na nagpapahintulot sa mga pahinang sumasalungat/maaaring pagtalunan na matahimik na maitulat patungo sa ibabaw ng mga talaan ng binabantayan ng mga tagapangasiwang tumatanggap ng sipi.

Makakakuha mula sa [[Special:PovWatch/log]] ng isang talaan ng kamakailang naitulak na mga talaan ng binabantayan.",
	'povwatch_subscriber_list' => 'Makakakuha ng isang [[Special:PovWatch/subscribers|talaan ng mga tumatanggap ng sipi]].',
	'povwatch_subscriber_list_intro' => '<strong>Talaan ng mga tumatanggap ng sipi</strong>',
	'povwatch_not_allowed_subscribers' => "Hindi ka pinapahintulutang matingnan ang talaan ng mga tumatanggap ng sipi ng ''PovWatch''.",
	'povwatch_unknown_subpage' => 'Hindi alam na kabahaging pahina.',
	'povwatch_push' => 'Itulak',
	'povwatch_push_intro' => 'Gamitin ang pormularyo sa ibaba upang maitulak ang mga pahina patungo sa ibabaw ng mga talaan ng binabantayan ng mga tagagamit na tumatanggap ng sipi.
Mangyaring mag-ingat lamang sa pagmamakinilya ng pamagat: maidaragdag ang kahit mga pamagat na hindi pa umiiral, at walang paraan para matanggal ang isang pamagat kapag naitulak na ito palabas.',
	'povwatch_title' => 'Pamagat:',
	'povwatch_comment' => 'Tala ng kumento/puna:',
	'povwatch_no_log' => 'Wala pang mga nakapasok/entrada sa tala.',
	'povwatch_no_subscribers' => 'Walang mga tumatanggap ng sipi.',
	'povwatch_unsubscribe_intro' => "Tumatanggap ka ng sipi ng ''PovWatch''.
Pindutin ang pindutan sa ibaba upang huwag nang tumanggap ng sipi.",
	'povwatch_unsubscribe' => 'Pahintuin na ang pagtanggap ng sipi',
	'povwatch_subscribe_intro' => "Hindi ka pa tumatanggap ng sipi ng ''PovWatch''.
Pindutin ang pindutan sa ibaba upang tumanggap ng sipi.",
	'povwatch_subscribe' => 'Pumayag na tumanggap ng sipi',
	'povwatch_added' => 'naidagdag na',
	'right-povwatch_admin' => 'Pangasiwaan ang mga karapatan ng tagagamit para sa pagdaragdag ng mga pahina sa mga talaan ng binabantayan ng iba pang mga tagagamit',
	'right-povwatch_user' => 'Magdagdag ng mga pahina sa mga talaan ng binabantayan ng iba pang mga tagagamit',
	'action-povwatch_admin' => 'pangasiwaan ang mga karapatan ng tagagamit para sa PovWatch',
	'action-povwatch_user' => 'idagdag ang pahinang ito sa talaan ng binabantayan ng iba pang tagagamit',
);

/** Turkish (Türkçe)
 * @author Joseph
 * @author Karduelis
 */
$messages['tr'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Sayfaları, diğer kullanıcıların [[Special:PovWatch|izleme listelerine itmek]] için eklenti',
	'povwatch_no_session' => 'Hata: Oturumdaki veri kaybından dolayı form gönderilemedi.',
	'povwatch_not_allowed_push' => 'Bir PovWatch yöneticisi değilsiniz, izleme listelerine sayfa itemezsiniz.',
	'povwatch_already_subscribed' => "PovWatch'a zaten abonesiniz",
	'povwatch_subscribed' => "PovWatch'a abone oldunuz",
	'povwatch_not_subscribed' => "PovWatch'a abone değilsiniz, bu yüzden aboneliğinizi iptal edemezsiniz.",
	'povwatch_unsubscribed' => 'PovWatch aboneliğiniz iptal edildi',
	'povwatch_invalid_title' => 'Belirtilen başlık geçersizdi',
	'povwatch_pushed' => '[[$1]] $2 kullanıcının {{PLURAL:$2|izleme listesine|izleme listelerine}} başarıyla itildi.',
	'povwatch_intro' => 'PovWatch, tartışmalı sayfaların abone olan yöneticilerin izleme listelerine ihtiyaten itilmesine izin veren bir servistir.

Son izleme listesi itmelerinin günlüğü, [[Special:PovWatch/günlük]] sayfasında mevcuttur.',
	'povwatch_subscriber_list' => 'Bir [[Special:PovWatch/subscribers|abone listesi]] mevcut.',
	'povwatch_subscriber_list_intro' => '<strong>Abone listesi</strong>',
	'povwatch_not_allowed_subscribers' => 'PovWatch abone listesini görmeye izniniz yok.',
	'povwatch_unknown_subpage' => 'Bilinmeyen altsayfa.',
	'povwatch_push' => 'İt',
	'povwatch_push_intro' => 'Abone kullanıcıların izleme listelerine sayfaları itmek için aşağıdaki formu kullanın.
Lütfen başlığı yazarken dikkatli olun: varolmayan sayfalar bile eklenebilir, ve bir kere itildikten sonra başlığı geri alma yolu yoktur.',
	'povwatch_title' => 'Başlık:',
	'povwatch_comment' => 'Günlük yorumu:',
	'povwatch_no_log' => 'Hiç günlük girdisi yok.',
	'povwatch_no_subscribers' => 'Abone yok.',
	'povwatch_unsubscribe_intro' => "PovWatch'a abone oldunuz.
Abonelikten çıkmak için aşağıdaki düğmeye tıklayın.",
	'povwatch_unsubscribe' => 'Abonelikten çık',
	'povwatch_subscribe_intro' => "PovWatch'a abone değilsiniz.
Abone olmak için aşağıdaki düğmeye tıklayın.",
	'povwatch_subscribe' => 'Abone ol',
	'povwatch_added' => 'eklendi',
	'right-povwatch_admin' => 'Diğer kullanıcıların izleme listesine sayfa eklemek için kullanıcı haklarını yönet',
	'right-povwatch_user' => 'Diğer kullanıcıların izleme listelerine sayfa ekle',
	'action-povwatch_admin' => 'PovWatch için kullanıcı haklarını yönetmeye',
	'action-povwatch_user' => 'bu sayfayı başka bir kullanıcının izleme listesine eklemeye',
);

/** Ukrainian (Українська)
 * @author AS
 */
$messages['uk'] = array(
	'povwatch_title' => 'Назва:',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'povwatch' => 'PovWatch',
	'povwatch_desc' => 'Estension par [[Special:PovWatch|xontar pàxene sui osservati speciali]] de altri utenti',
	'povwatch_no_session' => "Eròr: No se gà podesto inviar el mòdulo parché xe 'ndà persi i dati de la session.",
	'povwatch_not_allowed_push' => 'No te sì mia un aministrador de PovWatch, no te poli xontar pàxene ai osservati speciali.',
	'povwatch_already_subscribed' => 'Te sì zà iscrito a PovWatch',
	'povwatch_subscribed' => 'Desso te sì iscrito a PovWatch',
	'povwatch_not_subscribed' => 'No te sì mia iscrito a PovWatch, quindi no te poli disiscrìvarte.',
	'povwatch_unsubscribed' => 'Desso te te sì disiscrito da PovWatch',
	'povwatch_invalid_title' => "El tìtolo indicà no'l xe valido",
	'povwatch_pushed' => "[[$1]] xe stà zontà su i {{PLURAL:$2|osservati speciali|osservati speciali}} de l'utente $2",
	'povwatch_intro' => 'PovWatch el xe un servissio che el parmete de xontar, in maniera discreta, pàxene controverse ai osservati speciali dei aministradori iscriti al servissio.

Un registro dei ultimi inserimenti el se cata su [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Se pol consultar la [[Special:PovWatch/subscribers|lista dei iscriti]].',
	'povwatch_subscriber_list_intro' => '<strong>Lista dei iscriti</strong>',
	'povwatch_not_allowed_subscribers' => 'No te ghè el parmesso de vardar la lista dei iscriti a PovWatch.',
	'povwatch_unknown_subpage' => 'Sotopàxena sconossiùa.',
	'povwatch_push' => 'Inviar',
	'povwatch_push_intro' => 'Dòpara el mòdulo qua de soto par xontar pàxene sui osservati speciali dei utenti iscriti.
Par piaser stà tento a scrìvar ben el tìtolo: anca pàxene che no esiste le se pol xontar, e no ghe xe modo de cavar un tìtolo na olta che el xe stà inserìo.',
	'povwatch_title' => 'Titolo:',
	'povwatch_comment' => 'Comento par el registro:',
	'povwatch_no_log' => 'No ghe xe comenti in tel registro.',
	'povwatch_no_subscribers' => 'No ghe xe iscriti.',
	'povwatch_unsubscribe_intro' => 'Te sì iscrito a PovWatch.
Struca el boton qua soto par disiscrìvarte.',
	'povwatch_unsubscribe' => 'Disiscrìvete',
	'povwatch_subscribe_intro' => 'No te sì mia iscrito a PovWatch.
Struca el boton qua soto par iscrìvarte.',
	'povwatch_subscribe' => 'Iscrìvete',
	'povwatch_added' => 'zontà',
	'right-povwatch_admin' => 'Diriti de utente aministrador par xontar pàxene ai osservati speciali de altri utenti',
	'right-povwatch_user' => 'Zonta pàxene ai osservati speciali de altri utenti',
	'action-povwatch_admin' => 'aministra i parmessi dei utenti par PovWatch',
	'action-povwatch_user' => "zonta sta pàxena ai osservati speciali de n'altro utente",
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'povwatch' => 'Theo dõi trung lập',
	'povwatch_desc' => 'Gói mở rộng để [[Special:PovWatch|đẩy trang vào danh sách theo dõi]] của thành viên khác',
	'povwatch_no_session' => 'Lỗi: Không thể đăng mẫu do mất dữ liệu phiên làm việc.',
	'povwatch_not_allowed_push' => 'Bạn không phải là một quản lý PovWatch, bạn không thể đẩy trang vào danh sách theo dõi.',
	'povwatch_already_subscribed' => 'Bạn đã đăng ký vào PovWatch',
	'povwatch_subscribed' => 'Hiện bạn đã đăng ký vào PovWatch',
	'povwatch_not_subscribed' => 'Bạn chưa đăng ký vào PovWatch, do đó bạn không thể bỏ đăng ký.',
	'povwatch_unsubscribed' => 'Hiện bạn đã bỏ đăng ký khỏi PovWatch',
	'povwatch_invalid_title' => 'Tựa đề chỉ định không hợp lệ',
	'povwatch_pushed' => '[[$1]] đã được đẩy thành công vào $2 danh sách theo dõi thành viên',
	'povwatch_intro' => 'PovWatch là dịch vụ cho phép các trang có tranh cãi được đẩy vào danh sách theo dõi của những bảo quản viên đã đăng ký.

Một nhật trình các lần đẩy vào danh sách theo dõi gần đây có tại [[Special:PovWatch/log]].',
	'povwatch_subscriber_list' => 'Cũng có một [[Special:PovWatch/subscribers|danh sách các người đã đăng ký]].',
	'povwatch_subscriber_list_intro' => '<strong>Danh sách người đăng ký</strong>',
	'povwatch_not_allowed_subscribers' => 'Bạn không được phép xem danh sách người đăng ký PovWatch.',
	'povwatch_unknown_subpage' => 'Không rõ trang con.',
	'povwatch_push' => 'Đẩy',
	'povwatch_push_intro' => 'Dùng mẫu ở dưới để đẩy trang vào danh sách theo dõi của thành viên đã đăng ký.
Xin hãy gõ cẩn thận tựa đề: thậm chí những tựa đề không tồn tại cũng có thể được thêm vào, và không có cách nào bỏ một tựa đề khi nó đã được đẩy đi.',
	'povwatch_title' => 'Tên trang:',
	'povwatch_comment' => 'Ghi chú nhật trình:',
	'povwatch_no_log' => 'Không có mục nhật trình nào.',
	'povwatch_no_subscribers' => 'Không có thành viên nào đăng ký.',
	'povwatch_unsubscribe_intro' => 'Bạn đã đăng ký vào PovWatch.
Nhấn vào nút phía dưới để bỏ đăng ký.',
	'povwatch_unsubscribe' => 'Ngừng theo dõi',
	'povwatch_subscribe_intro' => 'Bạn không đăng ký vào PovWatch.
Nhấn vào nút phía dưới để đăng ký.',
	'povwatch_subscribe' => 'Theo dõi',
	'povwatch_added' => 'được thêm vào',
	'right-povwatch_admin' => 'Quản lý quyền thành viên để đưa trang vào danh sách thành viên của người khác',
	'right-povwatch_user' => 'Thêm trang vào danh sách theo dõi của thành viên khác',
	'action-povwatch_admin' => 'quản trị quyền thành viên cho PovWatch',
	'action-povwatch_user' => 'thêm trang này vào danh sách theo dõi của người khác',
);

/** Volapük (Volapük)
 * @author Malafaya
 */
$messages['vo'] = array(
	'povwatch_title' => 'Tiäd:',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gzdavidwong
 */
$messages['zh-hans'] = array(
	'povwatch_already_subscribed' => '您已订阅过PovWatch',
	'povwatch_subscribed' => '您现已订阅PovWatch',
	'povwatch_not_subscribed' => '您并未订阅PovWatch，因此不能取消订阅。',
	'povwatch_unsubscribed' => '您已取消订阅PovWatch',
	'povwatch_subscriber_list_intro' => '<strong>订阅用户列表</strong>',
	'povwatch_title' => '标题：',
	'povwatch_no_subscribers' => '现时没有订阅用户。',
	'povwatch_unsubscribe' => '取消订阅',
	'povwatch_subscribe_intro' => '您并未订阅PovWatch。按下方的按钮订阅。',
	'povwatch_subscribe' => '订阅',
	'povwatch_added' => '已加入',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Gzdavidwong
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'povwatch_already_subscribed' => '您已訂閱過PovWatch',
	'povwatch_subscribed' => '您現已訂閱PovWatch',
	'povwatch_not_subscribed' => '您並未訂閱PovWatch，因此不能取消訂閱。',
	'povwatch_unsubscribed' => '您已取消訂閱PovWatch',
	'povwatch_subscriber_list_intro' => '<strong>訂閱用戶清單</strong>',
	'povwatch_title' => '標題：',
	'povwatch_no_subscribers' => '現時沒有訂閱用戶。',
	'povwatch_unsubscribe' => '取消訂閱',
	'povwatch_subscribe_intro' => '您並未訂閱PovWatch。
按下方的按鈕訂閱。',
	'povwatch_subscribe' => '訂閱',
	'povwatch_added' => '已加入',
);

