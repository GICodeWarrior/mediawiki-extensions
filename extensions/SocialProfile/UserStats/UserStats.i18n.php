<?php
/**
 * Internationalization file for the UserStats extension.
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Wikia, Inc.
 */
$messages['en'] = array(
	'user-stats-alltime-title' => 'All-time most points',
	'user-stats-weekly-title' => 'Most points this week',
	'user-stats-monthly-title' => 'Most points this month',
	'topusers' => 'Top users',
	'top-fans-by-points-nav-header' => 'Top fans',
	'top-fans-by-category-nav-header' => 'Top by category',
	'top-fans-total-points-link' => 'Total points',
	'top-fans-weekly-points-link' => 'Points this week',
	'top-fans-monthly-points-link' => 'Points this month',
	'top-fans-points' => 'points',
	'top-fans-by-category-title' => 'Top overall $1',
	'top-fans-bad-field-title' => 'Oops!',
	'top-fans-bad-field-message' => 'The specified stat does not exist.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Vote|Votes}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Monthly win|Monthly wins}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Weekly win|Weekly wins}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Edit|Edits}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Comment|Comments}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Referral|Referrals}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Friend|Friends}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Foe|Foes}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Published opinion|Published opinions}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Opinion|Opinions}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Thumb up|Thumbs up}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Thumb down|Thumbs down}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Thumb up give|Thumbs up give}}n',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Thumb down given|Thumbs down given}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Gift received|Gifts received}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Gift sent|Gifts sent}}',
	'right-updatepoints' => 'Update edit counts',
	'level-advanced-to' => 'advanced to level <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'You are now a "$1" on {{SITENAME}}!',
	'level-advance-body' => 'Hi $1.

You are now a "$2" on {{SITENAME}}!

Congratulations,

The {{SITENAME}} team

---
Hey, want to stop getting e-mails from us?

Click $3
and change your settings to disable e-mail notifications.'
);

/** Message documentation (Message documentation)
 * @author Bennylin
 * @author Fryed-peach
 * @author Purodha
 * @author Umherirrender
 */
$messages['qqq'] = array(
	'top-fans-by-category-title' => '$1 is any of the messages starting with "top-fans-stats-" and the name of the statistic. Examples are {{msg-mw|top-fans-stats-vote-count}}, {{msg-mw|top-fans-stats-weekly-winner-count}}, {{msg-mw|top-fans-stats-referrals-completed}}, {{msg-mw|top-fans-stats-friends-count}}, and {{msg-mw|top-fans-stats-edit-count}}.',
	'top-fans-stats-vote-count' => '{{Identical|Vote}}',
	'top-fans-stats-edit-count' => '{{Identical|Edit}}',
	'top-fans-stats-comment-count' => '{{Identical|Comment}}',
	'right-updatepoints' => '{{doc-right|updatepoints}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'user-stats-monthly-title' => 'Meeste punte die maand',
	'topusers' => 'Topgebruikers',
	'top-fans-total-points-link' => 'Puntetotaal',
	'top-fans-weekly-points-link' => 'Punte die week',
	'top-fans-monthly-points-link' => 'Punte die maand',
	'top-fans-points' => 'punte',
	'top-fans-bad-field-title' => 'Oeps!',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Stem|Stemme}}',
);

/** Amharic (አማርኛ)
 * @author Codex Sinaiticus
 */
$messages['am'] = array(
	'top-fans-stats-friends-count' => '{{PLURAL:$1|ወዳጅ|ወዳጆች}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|ጠላት|ጠላቶች}}',
);

/** Arabic (العربية)
 * @author Meno25
 * @author OsamaK
 */
$messages['ar'] = array(
	'user-stats-alltime-title' => 'أكثر النقاط كل الوقت',
	'user-stats-weekly-title' => 'أكثر النقاط هذا الأسبوع',
	'user-stats-monthly-title' => 'أكثر النقاط هذا الشهر',
	'topusers' => 'أعلى المستخدمين',
	'top-fans-by-points-nav-header' => 'أعلى المعجبين',
	'top-fans-by-category-nav-header' => 'الأعلى بالتصنيف',
	'top-fans-total-points-link' => 'إجمالي النقاط',
	'top-fans-weekly-points-link' => 'النقاط هذا الأسبوع',
	'top-fans-monthly-points-link' => 'النقاط هذا الشهر',
	'top-fans-points' => 'نقاط',
	'top-fans-by-category-title' => 'أعلى إجمالي $1',
	'top-fans-bad-field-title' => 'آه!',
	'top-fans-bad-field-message' => 'الإحصاءات المحددة غير موجودة.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|لا يوجد تصويت|تصويت|تصويتان|تصويتات}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|لا يوجد فوز شهري|فوز شهري|فوزان شهريان|فوز شهري}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|لا يوجد فوز أسبوعي|فوز أسبوعي|فوزان أسبوعيان|فوز أسبوعي}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|لا توجد تعديلات|تعديل|تعديلان|تعديلات}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|لا توجد تعليقات|تعليق|تعليقان|تعليقات}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|لا توجد إحالات|إحالة|إحالتان|إحالات}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|لا يوجد أصدقاء|صديق|صديقان|أصدقاء}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|لا يوجد أعداء|عدو|عدوان|أعداء}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|لا يوجد رأي منشور|رأي منشور|رأيان منشوران|آراء منشورة}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|لا توجد آراء|رأي|رأيان|آراء}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|لا توجد أوسمة|وسام|وسامان|أوسمة}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|لا توجد استنكارات|استنكار|استنكاران|استنكارات}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|لا توجد إشادات معطاة|إشادة معطاة|إشادتان معطاتان|إشادات معطاة}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|لا توجد استنكارات معطاة|استنكار معطى|استنكاران معطان|استنكارات معطاة}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|لا توجد هدايا مستلمة|هدية مستلمة|هديتان مستلمتان|هدايا مستلمة}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|لا توجد هدايا مرسلة|هدية مرسلة|هديتان مرسلتان|هدايا مرسلة}}',
	'right-updatepoints' => 'تحديث عدادات التعديلات',
	'level-advanced-to' => 'تقدم إلى المستوى <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'أنت الآن "$1" في {{SITENAME}}!',
	'level-advance-body' => 'مرحبا $1:

أنت الآن "$2" في {{SITENAME}}!

تهانينا،

فرق {{SITENAME}}

---
هل تريد التوقف عن تلقي رسائل بريد إلكتروني منا؟

اضغط $3
وغير إعداداتك لتعديل إخطارات البريد الإلكتروني.',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Ghaly
 * @author Meno25
 */
$messages['arz'] = array(
	'user-stats-alltime-title' => 'أكثر النقاط كل الوقت',
	'user-stats-weekly-title' => 'أكثر النقاط هذا الأسبوع',
	'user-stats-monthly-title' => 'أكثر النقاط هذا الشهر',
	'topusers' => 'أعلى اليوزرز',
	'top-fans-by-points-nav-header' => 'أعلى المعجبين',
	'top-fans-by-category-nav-header' => 'الأعلى بالتصنيف',
	'top-fans-total-points-link' => 'إجمالى النقاط',
	'top-fans-weekly-points-link' => 'النقاط هذا الأسبوع',
	'top-fans-monthly-points-link' => 'النقاط هذا الشهر',
	'top-fans-points' => 'نقاط',
	'top-fans-by-category-title' => 'أعلى إجمالى $1',
	'top-fans-bad-field-title' => 'آه!',
	'top-fans-bad-field-message' => 'الإحصاءات المحددة غير موجودة.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|تصويت|تصويت}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|فوز شهري|فوز شهري}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|فوز أسبوعي|فوز أسبوعي}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|تعديل|تعديل}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|تعليق|تعليق}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|تراجع|تراجع}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|صديق|صديق}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|عدو|عدو}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|رأى منشور|رأى منشور}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|رأي|رأي}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|وسام|وسام}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|عيب|عيب}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|وسام معطى|وسام معطى}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|عيب معطى|عيب معطى}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|هدية تم تلقيها|هدية تم تلقيها}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|هدية مرسلة|هدية مرسلة}}',
	'level-advance-subject' => 'أنت الآن "$1" فى {{SITENAME}}!',
	'level-advance-body' => 'مرحبا $1:

أنت الآن "$2" فى {{SITENAME}}!

تهانينا،

فرق {{SITENAME}}

---
هل تريد التوقف عن تلقى رسائل بريد إلكترونى منا؟

اضغط $3
وغير إعداداتك لتعديل إخطارات البريد الإلكتروني.',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 * @author Red Winged Duck
 */
$messages['be-tarask'] = array(
	'user-stats-alltime-title' => 'Болей за ўсё пунктаў у гісторыі',
	'user-stats-weekly-title' => 'Болей за ўсё пунктаў у гэтым тыдні',
	'user-stats-monthly-title' => 'Болей за ўсё пунктаў у гэтым месяцы',
	'topusers' => 'Самыя актыўныя ўдзельнікі',
	'top-fans-by-points-nav-header' => 'Самыя актыўныя аматары',
	'top-fans-by-category-nav-header' => 'Самыя актыўныя па катэгорыях',
	'top-fans-total-points-link' => 'Усяго пунктаў',
	'top-fans-weekly-points-link' => 'Пунктаў на гэтым тыдні',
	'top-fans-monthly-points-link' => 'Пунктаў у гэтым месяцы',
	'top-fans-points' => 'пунктаў',
	'top-fans-by-category-title' => 'Самы актыўны за ўсіх $1',
	'top-fans-bad-field-title' => 'Ой!',
	'top-fans-bad-field-message' => 'Такой статыстыкі няма.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Голас|Галасы|Галасоў}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Пераможца месяца|Пераможцы месяца|Пераможцаў месяца}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Пераможца тыдня|Пераможцы тыдня}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Рэдагаваньне|Рэдагаваньні|Рэдагаваньняў}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Камэнтар|Камэнтары|Камэнтараў}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Прыцягнуты|Прыцягнутых|Прыцягнутых}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Сябар|Сябры|Сяброў}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Вораг|Ворагі|Ворагаў}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Апублікаванае меркаваньне|Апублікаваныя меркаваньні}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Меркаваньне|Меркаваньні|Меркаваньняў}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Атрыманы голас за|Атрыманыя галасы за|Атрыманых галасоў за}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Атрыманы голас супраць|Атрыманыя галасы супраць|Атрыманых галасоў супраць}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Адданы голас за|Адданыя галасы за|Адданых галасоў за}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Адданы голас супраць|Адданыя галасы супраць|Адданых галасоў супраць}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Атрыманы падарунак|Атрыманыя падарункі|Атрыманых падарункаў}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Дасланы падарунак|Дасланыя падарункі|Дасланых падарункаў}}',
	'right-updatepoints' => 'абнаўленьне колькасьці рэдагаваньняў',
	'level-advanced-to' => 'палепшаны да ўзроўню <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Цяпер Вы ў групе «$1» у {{SITENAME}}!',
	'level-advance-body' => 'Прывітаньне, $1:

Цяпер Вы «$2» у {{SITENAME}}!

Віншуем,

Каманда {{SITENAME}}

---
Калі Вы не жадаеце болей атрымліваць ад нас лісты па электроннай пошце, націсьніце $3 і зьмяніце Вашыя ўстаноўкі для паведамленьняў.',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'user-stats-weekly-title' => 'Най-много точки тази седмица',
	'user-stats-monthly-title' => 'Най-много точки този месец',
	'topusers' => 'Топ потребители',
	'top-fans-by-points-nav-header' => 'Топ фенове',
	'top-fans-total-points-link' => 'Общо точки',
	'top-fans-weekly-points-link' => 'Точки тази седмица',
	'top-fans-monthly-points-link' => 'Точки този месец',
	'top-fans-points' => 'точки',
	'top-fans-bad-field-title' => 'Опа!',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Редакция|Редакции}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Коментар|Коментари}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Приятел|Приятели}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Неприятел|Неприятели}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Мнение|Мнения}}',
	'level-advance-subject' => 'Вече сте „$1“ в {{SITENAME}}!',
	'level-advance-body' => 'Привет $1,

Вече сте с ранг „$2“ в {{SITENAME}}!

Поздравления,

Екипът на {{SITENAME}}

---
Не искате да получавате повече писма от нас?

Можете да промените настройките си за известяване от следната препратка: $3.',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'user-stats-alltime-title' => 'Najviše bodova svih vremena',
	'user-stats-weekly-title' => 'Najviše bodova ove sedmice',
	'user-stats-monthly-title' => 'Najviše bodova ovog mjeseca',
	'topusers' => 'Najkorisnici',
	'top-fans-by-points-nav-header' => 'Najveći obožavatelji',
	'top-fans-total-points-link' => 'Ukupni bodovi',
	'top-fans-weekly-points-link' => 'Bodova ove sedmice',
	'top-fans-monthly-points-link' => 'Bodova ovog mjeseca',
	'top-fans-points' => 'bodovi',
	'top-fans-by-category-title' => 'Najbolji ukupno po $1',
	'top-fans-bad-field-title' => 'Ups!',
	'top-fans-bad-field-message' => 'Navedena statistika ne postoji.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Glas|Glasa|Glasova}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Izmjena|Izmjene|Izmjena}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Komentar|Komentari}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Prijatelj|Prijatelja}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Neprijatelj|Neprijatelja}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Objavljeno mišljenje|Objavljena mišljenja}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Mišljenje|Mišljenja}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Poklon primljen|Poklona primljeno}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Poslan poklon|Poslano poklona}}',
	'right-updatepoints' => 'Ažuriranje brojanja izmjena',
	'level-advanced-to' => 'prešao na nivo <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Vi ste sada "$1" na {{SITENAME}}!',
	'level-advance-body' => 'Zdravo $1.

Sada ste "$2" na {{SITENAME}}!

Čestitamo,

Urednici {{SITENAME}}

---
Hej, želite da prestanete dobivati e-mailove od nas?

Kliknite $3
i promijenite Vaše postavke da bi onemogućili e-mail obavještenja.',
);

/** Catalan (Català)
 * @author Solde
 */
$messages['ca'] = array(
	'top-fans-total-points-link' => 'Punts totals',
	'top-fans-weekly-points-link' => 'Punts aquesta setmana',
	'top-fans-monthly-points-link' => 'Punts aquest mes',
	'top-fans-points' => 'punts',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Vot|Vots}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Guany mensual|Guanys mensuals}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Edició|Edicions}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Comentari|Comentaris}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Opinió|Opinions}}',
);

/** Czech (Česky)
 * @author Matěj Grabovský
 */
$messages['cs'] = array(
	'user-stats-alltime-title' => 'Nejvíc bodů celkem',
	'user-stats-weekly-title' => 'Nejvíc bodů tento týden',
	'user-stats-monthly-title' => 'Nejvíc bodů tento měsíc',
	'topusers' => 'Nej uživatelé',
	'top-fans-by-points-nav-header' => 'Nej fanouškové',
	'top-fans-by-category-nav-header' => 'Nej podle kategorie',
	'top-fans-total-points-link' => 'Celkem bodů',
);

/** German (Deutsch)
 * @author MF-Warburg
 * @author Melancholie
 * @author Purodha
 * @author Revolus
 * @author Umherirrender
 */
$messages['de'] = array(
	'user-stats-alltime-title' => 'Am meisten Punkte (gesamt)',
	'user-stats-weekly-title' => 'Am meisten Punkte diese Woche',
	'user-stats-monthly-title' => 'Am meisten Punkte diesen Monat',
	'topusers' => 'Top-Benutzer',
	'top-fans-by-points-nav-header' => 'Top-Fans',
	'top-fans-by-category-nav-header' => 'Top-per-Kategorie',
	'top-fans-total-points-link' => 'Gesamtpunktzahl',
	'top-fans-weekly-points-link' => 'Punkte diese Woche',
	'top-fans-monthly-points-link' => 'Punkte diesen Monat',
	'top-fans-points' => 'Punkte',
	'top-fans-by-category-title' => 'Top gesamt $1',
	'top-fans-bad-field-title' => 'Hoppla!',
	'top-fans-bad-field-message' => 'Die angegebene Statistik existiert nicht.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Stimme|Stimmen}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Monatsgewinn|Monatsgewinne}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Wochengewinn|Wochengewinne}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Bearbeitung|Bearbeitungen}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Kommentar|Kommentare}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Empfehlung|Empfehlungen}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Freund|Freunde}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Gegner/Feind|Gegner/Feinde}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Veröffentlichte Meinung|Veröffentlichte Meinungen}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Meinung|Meinungen}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Daumen nach oben|Daumen nach oben}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Daumen nach unten|Daumen nach unten}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Gegebener Daumen nach oben|Gegebene Daumen nach oben}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Gegebener Daumen nach unten|Gegebene Daumen nach unten}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Geschenk erhalten|Geschenke erhalten}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Geschenk gemacht|Geschenke gemacht}}',
	'right-updatepoints' => 'Beiträgszähler aktualisieren',
	'level-advanced-to' => 'erweitert auf Level <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Du bist jetzt „$1“ auf {{SITENAME}}!',
	'level-advance-body' => 'Hallo $1,

Du bist jetzt ein „$2“ bei {{SITENAME}}!

Es gratuliert das {{SITENAME}}-Team

---
Du willst gar keine E-Mails mehr von uns bekommen?

Klicke $3
und ändere deine Einstellungen, um die E-Mail-Benachrichtigungen abzustellen.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'user-stats-alltime-title' => 'Absolutnje nejwěcej dypkow',
	'user-stats-weekly-title' => 'Nejwěcej dypkow toś ten tyźeń',
	'user-stats-monthly-title' => 'Nejwěcej dypkow toś ten mjasec',
	'topusers' => 'Nejlěpše wužywarje',
	'top-fans-by-points-nav-header' => 'Nejlěpše fany',
	'top-fans-by-category-nav-header' => 'Nejlěpše pó kategoriji',
	'top-fans-total-points-link' => 'Dypki dogromady',
	'top-fans-weekly-points-link' => 'Dypki toś ten tyźeń',
	'top-fans-monthly-points-link' => 'Dypki toś ten mjasec',
	'top-fans-points' => 'dypki',
	'top-fans-by-category-title' => 'Nejlěpše dogromady $1',
	'top-fans-bad-field-title' => 'Hopla!',
	'top-fans-bad-field-message' => 'Pódana statistika njeeksistěrujo.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Głos|Głosa|Głose|Głosow}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Mjasecne dobyśe|Mjasecnej dobyśi|Mjasecne dobyśa|Mjasecnych dobyśow}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Tyźeńske dobyśe|Tyźeńskej dobyśi|Tyźeńske dobyśa|Tyźeńskich dobyśow}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Změna|Změnje|Změny|Změnow}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Komentar|Komentara|Komentary|Komentarow}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Pórucenje|Póruceni|Pórucenja|Pórucenjow}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Pśijaśel|Pśijaśela|Pśijaśele|Pśijaśelow}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Njepśijaśel|Njepśijaśela|Njepśijaśele|Njepśijaśelow}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Wózjawjone měnjenje|Wózjawjonej měnjeni|Wózjawjone měnjenja|Wózjawjonych měnjenjow}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Měnjenje|Měnjeni|Měnjenja|Měnjenjow}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Tłusty palc|Tłustej palca|Tłuste palce|Tłustych palcow}} górjej',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Tłusty palc|Tłustej palca|Tłuste palce|Tłustych palcow}} dołoj',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Dany tłusty palc|Danej tłustej palca|Dane tłuste palce|Danych tłustych palcow}} górjej',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Dany tłusty palc|Danej tłustej palca|Dane tłuste palce|Danych tłustych palcow}} dołoj',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Dar dostaty|Dara dostatej|Dary dostate|Darow dostatych}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Dar pósłany|Dara pósłanej|Dary pósłane|Darow pósłanych}}',
	'right-updatepoints' => 'Licbu změnow wobźěłaś',
	'level-advanced-to' => 'póstupijo k rowninje <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Sy něnto "$1" na {{GRAMMAR:lokatiw|{{SITENAME}}}}!',
	'level-advance-body' => 'Witaj $1.

Sy něnto "$2" na {{GRAMMAR:lokatiw|{{SITENAME}}}}!

Glukužycenje,

Team {{GRAMMAR:genitiw|{{SITENAME}}}}

---
Njocoš wěcej scełego žedne e-maile wót nas dostawaś?

Klikni na $3
a změń swóje nastajenja, aby znjemóžnił zdźělenja pśez e-mail.',
);

/** Ewe (Eʋegbe)
 * @author Natsubee
 */
$messages['ee'] = array(
	'top-fans-bad-field-title' => 'Tsalele!',
);

/** Greek (Ελληνικά)
 * @author Consta
 * @author Omnipaedista
 * @author ZaDiak
 */
$messages['el'] = array(
	'user-stats-alltime-title' => 'Περισσότεροι πόντοι όλων των εποχών',
	'user-stats-weekly-title' => 'Περισσότεροι πόντοι αυτή την εβδομάδα',
	'user-stats-monthly-title' => 'Περισσότεροι πόντοι αυτό το μήνα',
	'topusers' => 'Κορυφαίοι χρήστες',
	'top-fans-by-points-nav-header' => 'Κορυφαίοι θαυμαστές',
	'top-fans-by-category-nav-header' => 'Κορυφαίοι βάσει κατηγορίας',
	'top-fans-total-points-link' => 'Συνολικοί πόντοι',
	'top-fans-weekly-points-link' => 'Πόντοι αυτή την εβδομάδα',
	'top-fans-monthly-points-link' => 'Πόντοι αυτό το μήνα',
	'top-fans-points' => 'βαθμοί',
	'top-fans-by-category-title' => 'Κορυφαίοι συνολικά $1',
	'top-fans-bad-field-title' => 'Ωχ!',
	'top-fans-bad-field-message' => 'Το συγκεκριμένο στατιστικό δεν υπάρχει.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Ψήφος|Ψήφοι}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Μηνιαία νίκη|Μηνιαίες νίκες}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Εβδομαδιαία νίκη|Εβδομαδιαίες νίκες}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Επεξεργασία|Επεξεργασίες}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Σχόλιο|Σχόλια}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Παραπομπή|Παραπομπές}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Φίλος|Φίλοι}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Εχθρός|Εχθροί}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Δημοσιευμένη γνώμη|Δημοσιευμένες γνώμες}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Γνώμη|Γνώμες}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Επιδοκιμασία|Επιδοκιμασίες}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Αποδοκιμασία|Αποδοκιμασίες}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Επιδοκιμασία που δώθηκε|Επιδοκιμασίες που δώθηκαν}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Αποδοκιμασία που δώθηκε|Αποδοκιμασίες που δώθηκαν}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Δώρο λήφθηκε|Δώρα λήφθηκαν}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Δώρο στάλθηκε|Δώρα στάλθηκαν}}',
	'right-updatepoints' => 'Ενημέρωση των μετρήσεων επεξεργασιών',
	'level-advanced-to' => 'προχωρημένος στο επίπεδο <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Τώρα είσαι ένας "$1" στο {{SITENAME}}!',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'topusers' => 'Plej aktivaj uzantoj',
	'top-fans-by-category-nav-header' => 'Plej altaj laŭ kategorio',
	'top-fans-total-points-link' => 'Tutaj poentoj',
	'top-fans-weekly-points-link' => 'Poentoj dum ĉi tiu semajno',
	'top-fans-monthly-points-link' => 'Poentoj dum ĉi tiu monato',
	'top-fans-points' => 'poentoj',
	'top-fans-bad-field-title' => 'Ho ve!',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Voĉdono|Voĉdonoj}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Monata venko|Monataj venkoj}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Semajna venko|Semajnaj venkoj}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Redakto|Redaktoj}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Komento|Komentoj}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Amiko|Amikoj}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Malamiko|Malamikoj}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Opinio|Opinioj}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Donaco ricevita|Donacoj ricevita}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Donaco sendita|Donacoj senditaj}}',
	'level-advance-subject' => 'Vi nun estas "$1" en {{SITENAME}}!',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Imre
 * @author Sanbec
 */
$messages['es'] = array(
	'topusers' => 'Usuarios top',
	'top-fans-by-points-nav-header' => 'Fans top',
	'top-fans-total-points-link' => 'Puntos totales',
	'top-fans-weekly-points-link' => 'Puntos esta semana',
	'top-fans-monthly-points-link' => 'Puntos este mes',
	'top-fans-points' => 'puntos',
	'top-fans-bad-field-title' => 'Oops!',
	'top-fans-bad-field-message' => 'La estadística especificada no existe.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Voto|Votos}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|victoria mensual|Victorias mensuales}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Victoria semanal|Victorias semanales}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Edición|Ediciones}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Comentario|Comentarios}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Remisión|Remisiones}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Amigo|Amigos}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Enemigo|Enemigos}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Opinión publicada|Opiniones publicadas}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Opinión|Opiniones}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Pulgar arriba|Pulgares arriba}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Pulgar abajo|Pulgares abajo}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Pulgar arriba dado|Pulgares arriba dados}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Pulgar abajo dado|Pulgares abajos dados}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Regalo recibido|Regalos recibidos}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Regalo enviado|Regalos enviados}}',
	'right-updatepoints' => 'Actualizar conteos de ediciones',
	'level-advanced-to' => 'avanzó a nivel <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => '¡Ahora eres un «$1» en {{SITENAME}}!',
	'level-advance-body' => 'Hola $1.

Usted es ahora un "$2" en {{SITENAME}}!

Felicitaciones,

El  Equipo {{SITENAME}}

---
Hey, Desea no recibir correos electrónicos de nosotros?

Haga click en  $3
y cambie sus configuraciones para deshabilitar notificaciones por correo electrónico.',
);

/** Basque (Euskara)
 * @author An13sa
 * @author Kobazulo
 */
$messages['eu'] = array(
	'top-fans-total-points-link' => 'Puntuak guztira',
	'top-fans-weekly-points-link' => 'Aste honetako puntuak',
	'top-fans-monthly-points-link' => 'Hilabete honetako puntuak',
	'top-fans-points' => 'puntuak',
	'top-fans-bad-field-title' => 'Hara!',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Bozka|Bozkak}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Aldaketa|Aldaketak}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Iruzkina|Iruzkinak}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Laguna|Lagunak}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Etsaia|Etsaiak}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Iritzia|Iritziak}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Aldekoa|Aldekoak}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Aurkakoa|Aurkakoak}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Opari bat jaso duzu|Opariak jaso dituzu}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Oparia bidali duzu|Opariak bidali dituzu}}',
	'level-advance-body' => 'Kaixo $1!

Orain "$2" zara {{SITENAME}} gunean!

Zorionak!

Agur bero bat {{SITENAME}} gunearen taldearen izenean.

---
Aizu, ez al dituzu gure mezu elektronikoak jaso nahi?

Egizu klik $3
eta alda itzazu ezarpenak e-posta bidezko jakinarazpenak ezgaitzeko.',
);

/** Finnish (Suomi)
 * @author Cimon Avaro
 * @author Jack Phoenix <jack@countervandalism.net>
 * @author Str4nd
 */
$messages['fi'] = array(
	'user-stats-alltime-title' => 'Kaikkien aikojen suurimmat pistemäärät',
	'user-stats-weekly-title' => 'Eniten pisteitä tällä viikolla',
	'user-stats-monthly-title' => 'Eniten pisteitä tässä kuussa',
	'topusers' => 'Huippukäyttäjät',
	'top-fans-by-points-nav-header' => 'Huippufanit',
	'top-fans-by-category-nav-header' => 'Huiput luokittain',
	'top-fans-total-points-link' => 'Pisteitä yhteensä',
	'top-fans-weekly-points-link' => 'Pisteitä tällä viikolla',
	'top-fans-monthly-points-link' => 'Pisteitä tässä kuussa',
	'top-fans-points' => 'pistettä',
	'top-fans-bad-field-title' => 'Ups!',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|ääni|ääniä}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|kuukausittainen voitto|kuukausittaista voittoa}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|viikottainen voitto|viikottaista voittoa}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|muokkaus|muokkausta}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|kommentti|kommenttia}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|ystävä|ystävää}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|vihollinen|vihollista}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|julkaistu mielipide|julkaistua mielipidettä}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|mielipide|mielipidettä}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|peukalo ylös|peukaloa ylös}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|peukalo alas|peukaloa alas}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|saatu lahja|saatua lahjaa}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|lähetetty lahja|lähetettyä lahjaa}}',
	'right-updatepoints' => 'Päivittää muokkausmääriä',
	'level-advanced-to' => 'pääsi tasolle <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Olet nyt "$1" {{GRAMMAR:inessive|{{SITENAME}}}}!',
	'level-advance-body' => 'Hei $1:

Olet nyt "$2" {{GRAMMAR:inessive|{{SITENAME}}}}!

Onneksi olkoon,

{{GRAMMAR:genitive|{{SITENAME}}}} tiimi

---
Hei, etkö enää halua saada sähköpostia meiltä?

Napsauta $3
ja muuta asetuksiasi poistaaksesi sähköposti-ilmoitukset käytöstä.',
);

/** French (Français)
 * @author Cedric31
 * @author Crochet.david
 * @author Grondin
 * @author McDutchie
 */
$messages['fr'] = array(
	'user-stats-alltime-title' => 'Points les plus élevés toutes périodes confondues',
	'user-stats-weekly-title' => 'Points les plus élevés cette semaine',
	'user-stats-monthly-title' => 'Points les plus élevés ce mois-ci',
	'topusers' => 'Top des utilisateurs',
	'top-fans-by-points-nav-header' => 'Top des fans',
	'top-fans-by-category-nav-header' => 'Top par catégorie',
	'top-fans-total-points-link' => 'Total des points',
	'top-fans-weekly-points-link' => 'Points de cette semaine',
	'top-fans-monthly-points-link' => 'Points de ce mois-ci',
	'top-fans-points' => 'points',
	'top-fans-by-category-title' => 'Top général de $1',
	'top-fans-bad-field-title' => 'Zut !',
	'top-fans-bad-field-message' => 'La statistique indiquée n’existe pas.',
	'top-fans-stats-vote-count' => 'Vote{{PLURAL:$1||s}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|victoire mensuelle|victoires mensuelles}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|victoire hebdomadaire|victoires hebdomadaires}}',
	'top-fans-stats-edit-count' => 'modification{{PLURAL:$1||s}}',
	'top-fans-stats-comment-count' => 'commentaire{{PLURAL:$1||s}}',
	'top-fans-stats-referrals-completed' => 'référence{{PLURAL:$1||s}}',
	'top-fans-stats-friends-count' => 'ami{{PLURAL:$1||s}}',
	'top-fans-stats-foe-count' => 'ennemi{{PLURAL:$1||s}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|opinion publiée|opinions publiées}}',
	'top-fans-stats-opinions-created' => 'opinion{{PLURAL:$1||s}}',
	'top-fans-stats-comment-score-positive-rec' => 'bravo{{PLURAL:$1||s}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|nul|nuls}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|bravo attribué|bravos attribués}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|nul attribué|nuls attribués}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|cadeau reçu|cadeaux reçus}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|cadeau envoyé|cadeaux envoyés}}',
	'right-updatepoints' => 'Mise à jour du compteur d’éditions',
	'level-advanced-to' => 'a avancé vers le niveau <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Vous avez désormais un « $1 » sur {{SITENAME}} !',
	'level-advance-body' => 'Salut $1 :

Vous avez maintenant un « $2 » sur {{SITENAME}} !

Toutes nos félicitations,

L’équipe de {{SITENAME}}

---
Voulez-vous arrêter de recevoir des courriels de notre part ?

Cliquez $3
et modifiez vos paramètres en désactivant les notifications par courriel.',
);

/** Franco-Provençal (Arpetan)
 * @author Cedric31
 */
$messages['frp'] = array(
	'top-fans-points' => 'pouents',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Edicion|Edicions}}',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'user-stats-alltime-title' => 'Os que obtiveron máis puntos en total',
	'user-stats-weekly-title' => 'Máis puntos nesta semana',
	'user-stats-monthly-title' => 'Máis puntos neste mes',
	'topusers' => 'Usuarios máis votados',
	'top-fans-by-points-nav-header' => 'Seguidores máis votados',
	'top-fans-by-category-nav-header' => 'Máis votados por categoría',
	'top-fans-total-points-link' => 'Puntos totais',
	'top-fans-weekly-points-link' => 'Puntos nesta semana',
	'top-fans-monthly-points-link' => 'Puntos neste mes',
	'top-fans-points' => 'puntos',
	'top-fans-by-category-title' => 'Máis votados en xeral na categoría $1',
	'top-fans-bad-field-title' => 'Vaites!',
	'top-fans-bad-field-message' => 'A estatística especificada non existe.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Voto|Votos}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Vitoria mensual|Vitorias mensuais}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Vitoria semanal|Vitorias semanais}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Edición|Edicións}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Comentario|Comentarios}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Referencia|Referencias}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Amigo|Amigos}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Inimigo|Inimigos}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Opinión publicada|Opinións publicadas}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Opinión|Opinións}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Aprobación|Aprobacións}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Desaprobación|Desaprobacións}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Aprobación dada|Aprobacións dadas}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Desaprobación dada|Desaprobacións dadas}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Agasallo recibido|Agasallos recibidos}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Agasallo enviado|Agasallos enviados}}',
	'right-updatepoints' => 'Actualizar o contador de edicións',
	'level-advanced-to' => 'avanzou ata o nivel <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Agora é un "$1" en {{SITENAME}}!',
	'level-advance-body' => 'Ola, $1:

Agora é un "$2" en {{SITENAME}}!

Parabéns,

O equipo de {{SITENAME}}

---
Quere deixar de recibir correos electrónicos nosos?

Faga clic $3
e troque as súas configuracións para deshabilitar as notificacións por correo electrónico.',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'user-stats-alltime-title' => 'Am meischte Pinkt (insgsamt)',
	'user-stats-weekly-title' => 'Am meischte Pinkt in däre Wuche',
	'user-stats-monthly-title' => 'Am meische Pinkt in däm Monet',
	'topusers' => 'Top-Benutzer',
	'top-fans-by-points-nav-header' => 'Top-Fan',
	'top-fans-by-category-nav-header' => 'Top-per-Kategorii',
	'top-fans-total-points-link' => 'Gsamtpunktzahl',
	'top-fans-weekly-points-link' => 'Pinkt in däre Wuche',
	'top-fans-monthly-points-link' => 'Pinkt in däm Monet',
	'top-fans-points' => 'Pinkt',
	'top-fans-by-category-title' => 'Top insgsamt $1',
	'top-fans-bad-field-title' => 'Hoppla!',
	'top-fans-bad-field-message' => 'Die Statischtik git s nit.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Stimm|Stimme}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Monetsgwinn|Monatsgwinn}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Wuchegwinn|Wuchegwinn}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Bearbeitig|Bearbeitige}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Kommentar|Kommentar}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Empfählig|Empfählige}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Frynd|Frynd}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Fynd|Fynd}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Vereffentligti Meinig|Vereffentligti Meinige}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Meinig|Meinige}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Duume ufezues|Dyyme ufezues}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Duume abezues|Dyyme aabezues}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Duume ufezues|Dyyme ufezues}} gee',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Duume abezues|Dyyme abezues}} gee',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Gschänk iberchu|Gschänk inerchu}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Gschänk gmacht|Gschänk gmacht}}',
	'right-updatepoints' => 'Bearbeitigszeller aktualisiere',
	'level-advanced-to' => 'furtgschritte zum Level <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Du bisch jetz „$1“ uf {{SITENAME}}!',
	'level-advance-body' => 'Sali $1,

Du bisch jetz e „$2“ uf {{SITENAME}}!

S {{SITENAME}}-Team grateliert Dir!

---
Du witt gar kei E-Mail vu uns iberchu?

Druck $3
un ändere Dyyi Yystellige go d E-Mail-Benochrichtigunge abzstelle.',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'user-stats-alltime-title' => 'מספר הנקודות המירבי בכל הזמנים',
	'user-stats-weekly-title' => 'מספר הנקודות המירבי השבוע',
	'user-stats-monthly-title' => 'מספר הנקודות המירבי החודש',
	'topusers' => 'המשתמשים המובילים',
	'top-fans-by-points-nav-header' => 'המעריצים המובילים',
	'top-fans-by-category-nav-header' => 'מובילים לפי קטגוריה',
	'top-fans-total-points-link' => 'סך כל הנקודות',
	'top-fans-weekly-points-link' => 'נקודות השבוע',
	'top-fans-monthly-points-link' => 'נקודות החודש',
	'top-fans-points' => 'נקודות',
	'top-fans-by-category-title' => 'סך כל המובילים $1',
	'top-fans-bad-field-title' => 'אופס!',
	'top-fans-bad-field-message' => 'הסטטיסטיקה שצוינה אינה קיימת.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|הצבעה|הצבעות}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|נצחון חודשי|נצחונות חודשיים}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|נצחון שבועי|נצחונות שבועיים}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|עריכה|עריכות}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|הערה|הערות}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|הפניה|הפניות}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|חבר|חברים}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|יריב|יריבים}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|דעה שפורסמה|דעות שפורסמו}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|דעה|דעות}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|המלצה|המלצות}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|גינוי|גינויים}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|ניתנה המלצה|ניתנו המלצות}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|ניתן גינוי|ניתנו גינויים}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|התקבלה מתנה|התקבלו מתנות}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|נשלחה מתנה|נשלחו מתנות}}',
	'right-updatepoints' => 'עדכון מספרי העריכות',
	'level-advanced-to' => 'התקדמות לשלב <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'כעת הינכם  "$1" ב{{grammar:תחילית|{{SITENAME}}}}!',
	'level-advance-body' => 'שלום $1:

כעת הנכם "$2" ב{{grammar:תחילית|{{SITENAME}}}}!

ברכותינו,

צוות {{SITENAME}}

---
מעוניינים להפסיק לקבל מאיתנו הודעות?

לחצו $3
ושנו את הגדרותיכם כדי לבטל התראות בדואר אלקטרוני.',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'user-stats-alltime-title' => 'Najwjace dypkow za cyłu dobu',
	'user-stats-weekly-title' => 'Najwjace dypkow tutón tydźeń',
	'user-stats-monthly-title' => 'Najwjace dypkow tutón měsac',
	'topusers' => 'Najlěpši wužiwarjo',
	'top-fans-by-points-nav-header' => 'Najlěpši přiwisnicy',
	'top-fans-by-category-nav-header' => 'Najlěpši po kategoriji',
	'top-fans-total-points-link' => 'Dypki w cyłku',
	'top-fans-weekly-points-link' => 'Dypki tutón tydźeń',
	'top-fans-monthly-points-link' => 'Dypki tutón měsac',
	'top-fans-points' => 'dypki',
	'top-fans-by-category-title' => 'Najlěpše w cyłku $1',
	'top-fans-bad-field-title' => 'Hopla!',
	'top-fans-bad-field-message' => 'Podata statistika njeeksistuje.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|hłós|hłosaj|hłosy|hłosow}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Měsačne dobyće|Měsačnej dobyći|Měsačne dobyća|Měsačnych dobyćow}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Tydźenske dobyće|Tydźenskej dobyći|Tydźenske dobyća|Tydźenskich dobyćow}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|$1|ZMěna|Změnje|Změny|Změnow}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Komentar|Komentaraj|Komentary|Komentarow}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Referenca|Referency|Referency|Referencow}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Přećel|Přećelej|Přećeljo|Přećelow}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Njepřećel|Njepřećelej|Njepřećeljo|Njepřećelow}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Wozjewjene měnjenje|Wozjewjenej měnjeni|Wozjewjene měnjenja|Wozjewjenych měnjenjow}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Měnjenje|Měnjeni|Měnjenja|Měnjenjow}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Palc|Palcaj|Palcy|Palcow}} horje',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Palc|Palcaj|Palcy|Palcow}} dele',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Data sława|Datej sławje|Date sławy|Datych sławow}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Podata fujwołanje|Podatej fujwołani|Podate fujwołanja|Podatych fujwołanjow}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Dóstany dar|Dóstanej daraj|Dóstane dary|Dóstanych darow}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Pósłany dar|Pósłanej daraj|Pósłane dary|Pósłanych darow}}',
	'right-updatepoints' => 'Ličbu změnow aktualizować',
	'level-advanced-to' => 'postupi k runinje <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Sy nětko "$1" na {{GRAMMAR:lokatiw|{{SITENAME}}}}',
	'level-advance-body' => 'Witaj $1:

Sy nětko "$2" na {{GRAMMAR:lokatiw|{{SITENAME}}}}!

Zbožopřeća,

Team {{GRAMMAR:genitiw|{{SITENAME}}}}

---
Nochceš hižo žane e-mejlki wot nas dóstać?

Klikń na $3
a změn swoje nastajenja, zo by e-mejlowe zdźělenki znjemóžnił.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'user-stats-alltime-title' => 'Le plus punctos de omne tempore',
	'user-stats-weekly-title' => 'Le plus punctos de iste septimana',
	'user-stats-monthly-title' => 'Le plus punctos de iste mense',
	'topusers' => 'Usatores supreme',
	'top-fans-by-points-nav-header' => 'Admiratores supreme',
	'top-fans-by-category-nav-header' => 'Summitate per categoria',
	'top-fans-total-points-link' => 'Total del punctos',
	'top-fans-weekly-points-link' => 'Punctos de iste septimana',
	'top-fans-monthly-points-link' => 'Punctos de iste mense',
	'top-fans-points' => 'punctos',
	'top-fans-by-category-title' => 'Summitate general $1',
	'top-fans-bad-field-title' => 'Ups!',
	'top-fans-bad-field-message' => 'Le statistica specificate non existe.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Voto|Votos}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Victoria mensual|Victorias mensual}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Victoria septimanal|Victorias septimanal}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Modification|Modificationes}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Commento|Commentos}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Referentia|Referentias}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Amico|Amicos}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Inimico|Inimicos}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Opinion|Opiniones}} publicate',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Opinion|Opiniones}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Acclamation|Acclamationes}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Disapprobation|Disapprobationes}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Acclamation|Acclamationes}} date',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Disapprobation|Disapprobationes}} date',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Dono|Donos}} recipite',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Dono|Donos}} inviate',
	'right-updatepoints' => 'Actualisar le contator de modificationes',
	'level-advanced-to' => 'avantiava verso le nivello <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Tu es ora un "$1" in {{SITENAME}}!',
	'level-advance-body' => 'Salute $1,

Tu es ora un "$2" in {{SITENAME}}!

Felicitationes,

Le equipa de {{SITENAME}}

---
Tu non vole reciper plus e-mail de nos?

Clicca $3
e disactiva in tu preferentias le notificationes per e-mail.',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 */
$messages['id'] = array(
	'user-stats-alltime-title' => 'Poin terbanyak sepanjang masa',
	'user-stats-weekly-title' => 'Poin terbanyak minggu ini',
	'user-stats-monthly-title' => 'Poin terbanyak bulan ini',
	'topusers' => 'Pengguna teratas',
	'top-fans-by-points-nav-header' => 'Penggemar teratas',
	'top-fans-by-category-nav-header' => 'Teratas menurut kategori',
	'top-fans-total-points-link' => 'Poin total',
	'top-fans-weekly-points-link' => 'Poin minggu ini',
	'top-fans-monthly-points-link' => 'Poin bulan ini',
	'top-fans-points' => 'poin',
	'top-fans-by-category-title' => 'Top secara keseluruhan $1',
	'top-fans-bad-field-title' => 'Oh tidak!',
	'top-fans-bad-field-message' => 'Statistik yang diminta tidak ada.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1||}}Suara',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1||}}Kemenangan bulanan',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1||}}Kemenangan mingguan',
	'top-fans-stats-edit-count' => '{{PLURAL:$1||}}Suntingan',
	'top-fans-stats-comment-count' => '{{PLURAL:$1||}}Komentar',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1||}}Rujukan',
	'top-fans-stats-friends-count' => '{{PLURAL:$1||}}Kawan',
	'top-fans-stats-foe-count' => '{{PLURAL:$1||}}Lawan',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1||}}Opini yang dipublikasikan',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1||}}Opini',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1||}}Bagus',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1||}}Jelek',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1||}}Nilai bagus yang diberikan',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1||}}Nilai jelek yang diberikan',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1||}}Hadiah yang diterima',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1||}}Hadiah yang diberikan',
	'right-updatepoints' => 'Mutakhirkan penghitungan suntingan',
	'level-advanced-to' => 'naik ke level <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Anda sekarang adalah "$1" di {{SITENAME}}!',
	'level-advance-body' => 'Halo $1.

Sekarang Anda adalah "$2" di {{SITENAME}}!

Selamat,

Tim {{SITENAME}}

---
Mau berhenti mendapatkan pesan ini?

Klik $3
dan ganti seting Anda untuk mematikan pemberitahuan lewat surel.',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fryed-peach
 * @author Hosiryuhosi
 */
$messages['ja'] = array(
	'user-stats-alltime-title' => '通算最高得点者',
	'user-stats-weekly-title' => '今週の最高得点者',
	'user-stats-monthly-title' => '今月の最高得点者',
	'topusers' => '上位利用者',
	'top-fans-by-points-nav-header' => '上位ファン',
	'top-fans-by-category-nav-header' => 'カテゴリ別上位者',
	'top-fans-total-points-link' => '総得点',
	'top-fans-weekly-points-link' => '今週の得点',
	'top-fans-monthly-points-link' => '今月の得点',
	'top-fans-points' => '得点',
	'top-fans-by-category-title' => '総合上位$1',
	'top-fans-bad-field-title' => 'おっと！',
	'top-fans-bad-field-message' => '指定した統計は存在しません。',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|投票}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|月間勝者}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|週間勝者}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|編集}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|コメント}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|推薦}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|友人}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|敵}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|公表された意見}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|意見}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|拍手}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|ブーイング}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|拍手}}をうけました',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|ブーイング}}を受けました',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|贈り物}}を受け取りました',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|贈り物}}を送りました',
	'right-updatepoints' => '編集回数を更新する',
	'level-advanced-to' => 'レベル<span style="font-weight:800;">$1</span>に上がりました',
	'level-advance-subject' => '{{SITENAME}}の"$1"になりました！',
	'level-advance-body' => '$1さん、こんにちは。

おめでとうございます。
$1さんは{{SITENAME}}の「$2」になりました！

{{SITENAME}}チーム

---
メール受信を停止したい場合は、
$3
をクリックして、メール通知を無効にするよう設定変更してください。',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Thearith
 */
$messages['km'] = array(
	'user-stats-alltime-title' => 'ពិន្ទុ​ខ្ពស់​បំផុត​សម្រាប់​រយៈពេល​ទាំងអស់',
	'user-stats-weekly-title' => 'ពិន្ទុ​ខ្ពស់បំផុត​សម្រាប់​សប្ដាហ៍​នេះ',
	'user-stats-monthly-title' => 'ពិន្ទុ​ខ្ពស់បំផុត​សម្រាប់​ខែ​នេះ',
	'topusers' => 'អ្នកប្រើប្រាស់​កំពូល',
	'top-fans-by-points-nav-header' => 'អ្នកគាំទ្រ​កំពូល',
	'top-fans-by-category-nav-header' => 'ច្រើនបំផុតតាម​​ចំណាត់ថ្នាក់ក្រុម',
	'top-fans-total-points-link' => 'ពិន្ទុ​សរុប',
	'top-fans-weekly-points-link' => 'ពិន្ទុ​សប្ដាហ៍​នេះ',
	'top-fans-monthly-points-link' => 'ពិន្ទុ​ខែ​នេះ',
	'top-fans-points' => 'ពិន្ទុ',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|បោះឆ្នោត|បោះឆ្នោត}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|អ្នកឈ្នះ​ប្រចាំខែ|អ្នកឈ្នះ​ប្រចាំខែ}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|អ្នកឈ្នះ​ប្រចាំសប្ដាហ៍|អ្នកឈ្នះ​ប្រចាំសប្ដាហ៍}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|កែប្រែ|កែប្រែ}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|វចនាធិប្បាយ|វចនាធិប្បាយ}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|ការផ្ទេរ|ការផ្ទេរ}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|មិត្តភ័ក្ដិ|មិត្តភ័ក្ដិ}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|បច្ចាមិត្ត|បច្ចាមិត្ត}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|ជម្រើស​បោះពុម្ពផ្សាយ|ជម្រើស​បោះពុម្ពផ្សាយ}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|ជម្រើស|ជម្រើស}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|ពង្រីក|ពង្រីក}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|បង្រួម|បង្រួម}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|ជំនូន​ដែល​បាន​ទទួល|ជំនូន​ដែល​បាន​ទទួល}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|ជំនូន​ដែល​បាន​ផ្ញើ|ជំនូន​ដែល​បាន​ផ្ញើ}}',
	'level-advance-subject' => 'ឥឡូវនេះ អ្នក​មាន "$1" នៅ {{SITENAME}}!',
	'level-advance-body' => 'សួស្ដី $1:

ឥឡូវនេះ អ្នក​មាន "$2" នៅ​លើ {{SITENAME}}!

សូមអបអរសាទរ,

ក្រុម {{SITENAME}}

---
ហេ៎, តើ​អ្នក​ពិតជា​ចង់​បញ្ឈប់​ការ​ទទួល​អ៊ីមែល​ពី​យើង​មែន​ឬ​?

សូម​ចុច $3
និង​ផ្លាស់ប្ដូរ​ការកំណត់​របស់​អ្នក ដើម្បី​បិទ​មិន​ទទួល​សេចក្ដីជូនដំណឹង​តាម​អ៊ីមែល​។',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'user-stats-alltime-title' => 'De miehßte Punkte övver alle Zick',
	'user-stats-weekly-title' => 'De miehßte Punkte övver diß Woch',
	'user-stats-monthly-title' => 'De miehßte Punkte disse Mohnd',
	'topusers' => 'Spetze-Metmaachere',
	'top-fans-by-points-nav-header' => 'Aan de Spetz per Stemme',
	'top-fans-by-category-nav-header' => 'Aan der Spetz per Saachjropp',
	'top-fans-total-points-link' => 'Punkte ensjesamp',
	'top-fans-weekly-points-link' => 'Punkte diß Woch',
	'top-fans-monthly-points-link' => 'Punkte disse Mohnd',
	'top-fans-points' => 'Punkte',
	'top-fans-by-category-title' => 'De mihßte $1 ensjesamap',
	'top-fans-bad-field-title' => 'Hoppalla!',
	'top-fans-bad-field-message' => 'De aanjejovve Statistik jidd_et nit.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Stemm|Stemme}}',
	'top-fans-stats-monthly-winner-count' => 'Jewenn{{PLURAL:$1||e|—}} vum Mohnd',
	'top-fans-stats-weekly-winner-count' => 'wöschentlesche Jewenn{{PLURAL:$1||e|—}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Änderung|Änderunge}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Kommentaa|Kommentaare}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Verwies|Verwiese}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Frünnd|Frünnde}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Feind|Feinde}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|öffentlesch afjejovve Meinung|veröffentleschte Meinunge}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Meinung|Meinunge}}',
	'top-fans-stats-comment-score-positive-rec' => '<!--{{PLURAL:$1}}-->„Duume erop“',
	'top-fans-stats-comment-score-negative-rec' => '<!--{{PLURAL:$1}}-->„Dume eraf“',
	'top-fans-stats-comment-score-positive-given' => '<!--{{PLURAL:$1}}-->Duume noh bovve',
	'top-fans-stats-comment-score-negative-given' => '<!--{{PLURAL:$1}}-->Duume noh unge',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Jeschenk|Jeschenke}} kräje',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Jeschenk|Jeschenke}} jejovve',
	'right-updatepoints' => 'De Aanzahl Änderunge ändere',
	'level-advanced-to' => 'opjeschtoof op dat Nivoh <span style="font-weight:800">$1</span>',
	'level-advance-subject' => 'Do bes jätz ene „$1“ op de {{SITENAME}}!',
	'level-advance-body' => 'Hallo $1,

Do bes jetz ene $2 op de {{SITENAME}}!

Hätzlesche Jlöckwonsch fun de janze {{SITENAME}}

---

Wells De kein e-mail fun uns han? Dann kleck
$3
un donn en Dinge Ennstellunge affschallde, dat
De e-mail jescheck kriß.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'user-stats-alltime-title' => 'Am Meeschte Punkte vn allen Zäiten',
	'user-stats-weekly-title' => 'Am Meeschte Punkten dës Woch',
	'user-stats-monthly-title' => 'Am meeschte Punkten dëse Mount',
	'topusers' => 'Top Benotzer',
	'top-fans-by-points-nav-header' => 'Top vun de Fans',
	'top-fans-by-category-nav-header' => 'Top pro Kategorie',
	'top-fans-total-points-link' => 'Total vun de Punkten',
	'top-fans-weekly-points-link' => 'Punkte vun dëser Woch',
	'top-fans-monthly-points-link' => 'Punkte vun dësem Mount',
	'top-fans-points' => 'Punkten',
	'top-fans-by-category-title' => 'Allgemengen Top $1',
	'top-fans-bad-field-title' => 'Ups!',
	'top-fans-bad-field-message' => 'Déi gefrote Statistik gëtt et net.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Stëmm|Stëmmen}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Gewënner vum Mount|Gewënner vum Mount}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Gewënn vun der Woch|Gewënner vun der Woch}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Ännerung|Ännerungen}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Bemierkung|Bemierkungen}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Referenz|Referenzen}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Frënd|Frënn}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Géigner|Géigner}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Verëffentlecht Meenung| Verëffentlecht Meenungen}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Meenung|Meenungen}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Daum no uewen|Daumen no uewen}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Daum no ënnen|Daumen no ënnen}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Cadeau kritt|Cadeaue kritt}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Cadeau|Cadeauë}} geschéckt',
	'right-updatepoints' => 'De Compteur vun den Ännerungen aktualiséieren',
	'level-advanced-to' => 'ass op den Niveau <span style="font-weight:800;">$1</span> komm',
	'level-advance-subject' => 'Dir sidd elo "$1" op {{SITENAME}}!',
	'level-advance-body' => 'Bonjour $1:

Dir sidd elo e(n) "$2" op {{SITENAME}}!

Eis Felicitatiounen!

D\'Equipe vu(n) {{SITENAME}}

--
Wëllt dir keng E-Maile méi vun eis kréien?

Klickt $3
an ännert Är Astellungen a schalt den E-Mai-Benoriichtungssystem aus.',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'topusers' => 'Huēyi tlatequitiltilīlli',
	'top-fans-by-points-nav-header' => 'Huēyi fans',
	'top-fans-by-category-nav-header' => 'Huēyi neneuhcāyōcopa',
	'top-fans-bad-field-title' => '¡Ō!',
);

/** Dutch (Nederlands)
 * @author Siebrand
 * @author Tvdm
 */
$messages['nl'] = array(
	'user-stats-alltime-title' => 'Meeste punten aller tijden',
	'user-stats-weekly-title' => 'Meeste punten deze week',
	'user-stats-monthly-title' => 'Meeste punten deze maand',
	'topusers' => 'Topgebruikers',
	'top-fans-by-points-nav-header' => 'Topfans',
	'top-fans-by-category-nav-header' => 'Top per categorie',
	'top-fans-total-points-link' => 'Totaal punten',
	'top-fans-weekly-points-link' => 'Punten deze week',
	'top-fans-monthly-points-link' => 'Punten per maand',
	'top-fans-points' => 'punten',
	'top-fans-by-category-title' => 'Top algemeen $1',
	'top-fans-bad-field-title' => 'Oeps!',
	'top-fans-bad-field-message' => 'De opgegeven statistiek bestaat niet.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Stem|Stemmen}}',
	'top-fans-stats-monthly-winner-count' => 'Maandelijkse {{PLURAL:$1|overwinning|overwinningen}}',
	'top-fans-stats-weekly-winner-count' => 'Wekelijkse {{PLURAL:$1|overwinning|overwinningen}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Bewerking|Bewerkingen}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Opmerking|Opmerkingen}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Verwijzing|Verwijzingen}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Vriend|Vrienden}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Tegenstander|Tegenstanders}}',
	'top-fans-stats-opinions-published' => 'Gepubliceerde {{PLURAL:$1|mening|meningen}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Mening|Meningen}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Duim|Duimen}} omhoog',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Duim|Duimen}} omlaag',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Duim|Duimen}} omhoog uitgedeeld',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Duim|Duimen}} omlaag uitgedeeld',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Cadeautje|Cadeautjes}} ontvangen',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Cadeautje|Cadeautjes}} gestuurd',
	'right-updatepoints' => 'Bewerkingstellers bijwerken',
	'level-advanced-to' => 'is gepromoveerd tot niveau tot niveau <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'U bent nu "$1" op {{SITENAME}}',
	'level-advance-body' => 'Hallo $1.

U bent nu "$2" op {{SITENAME}}

Van harte gefeliciteerd.

Het team van {{SITENAME}}

---
Wilt u niet langer e-mails van ons ontvangen?

Klik $3
en wijzig uw instellingen om e-mailberichten uit te schakelen.",',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Harald Khan
 */
$messages['nn'] = array(
	'user-stats-alltime-title' => 'Flest poeng nokosinne',
	'user-stats-weekly-title' => 'Flest poeng denne veka',
	'user-stats-monthly-title' => 'Flest poeng denne månaden',
	'topusers' => 'Beste brukarar',
	'top-fans-by-points-nav-header' => 'Beste tilhengjarar',
	'top-fans-by-category-nav-header' => 'Beste etter katgegori',
	'top-fans-total-points-link' => 'Poeng totalt',
	'top-fans-weekly-points-link' => 'Poeng denne veka',
	'top-fans-monthly-points-link' => 'Poeng denne månaden',
	'top-fans-points' => 'poeng',
	'top-fans-by-category-title' => 'Best i alt $1',
	'top-fans-bad-field-title' => 'Ops!',
	'top-fans-bad-field-message' => 'Den oppgjevne statistikken finst ikkje.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Røyst|Røyster}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Månadleg siger|Månadlege sigrar}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Vekesiger|Vekesigrar}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Endring|Endringar}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Kommentar|Kommentarar}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Referanse|Referansar}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Ven|Vener}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Fiende|Fiendar}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Publisert meining|Publiserte meiningar}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Meining|Meiningar}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Tommel opp|Tomlar opp}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Tommel ned|Tomlar ned}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Tommel opp gjeven|Tomlar opp gjevne}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Tommel ned gjeven|Tomlar ned gjevne}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Gåva motteke|Gåver mottekne}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Gavå sendt|Gåver sendte}}',
	'level-advance-subject' => 'Du er no $1 på {{SITENAME}}!',
	'level-advance-body' => 'Hei, $1.

Du er no ein «$2» på {{SITENAME}}.

Gratulerer,

{{SITENAME}}-laget

----
Vil du ikkje lenger motta e-postar frå oss?

Trykk $3
og endra innstillingane dine for å slå av e-postmeldingar.',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'user-stats-alltime-title' => 'Flest poeng noensinne',
	'user-stats-weekly-title' => 'Flest poeng denne uka',
	'user-stats-monthly-title' => 'Flest poeng denne måneden',
	'topusers' => 'Beste brukere',
	'top-fans-by-points-nav-header' => 'Beste tilhengere',
	'top-fans-by-category-nav-header' => 'Beste per kategori',
	'top-fans-total-points-link' => 'Poeng totalt',
	'top-fans-weekly-points-link' => 'Poeng denne uka',
	'top-fans-monthly-points-link' => 'Poeng denne måneden',
	'top-fans-points' => 'poeng',
	'top-fans-by-category-title' => 'Best totalt $1',
	'top-fans-bad-field-title' => 'Ops!',
	'top-fans-bad-field-message' => 'Den valgte statistikken finnes ikke.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Stemme|Stemmer}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Månedlig seier|Månedlige seire}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Ukentlig seier|Ukentlige seire}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Redigering|Redigeringer}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Kommentar|Kommentarer}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Referering|Refereringer}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Venn|Venner}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Fiende|Fiender}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Publisert mening|Publiserte meninger}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Mening|Meninger}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Tommel opp|Tomler opp}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Tommel ned|Tomler ned}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Tommel opp gitt|Tomler opp gitt}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Tommel ned gitt|Tomler ned gitt}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Gave mottatt|Gaver mottatt}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Gave|Gaver}} sendt',
	'right-updatepoints' => 'Oppdater redigeringsteller',
	'level-advanced-to' => 'avanserte til nivå <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Du er nå $1 på {{SITENAME}}.',
	'level-advance-body' => 'Hei, $1.

Du er nå $2 på {{SITENAME}}.

Gratulerer,
{{SITENAME}}-teamet

----
Vil du ikke lenger motta e-poster fra oss?

Klikk $3
og endre innstillingene dine for å slå av e-postmeldinger.',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'user-stats-alltime-title' => 'Punts los mai elevats totes periòdes confonduts',
	'user-stats-weekly-title' => 'Punts los mai elevats aquesta setmana',
	'user-stats-monthly-title' => 'Punts los mai elevats aqueste mes',
	'topusers' => 'Top dels utilizaires',
	'top-fans-by-points-nav-header' => 'Top dels fans',
	'top-fans-by-category-nav-header' => 'Top per categoria',
	'top-fans-total-points-link' => 'Total dels punts',
	'top-fans-weekly-points-link' => "Punts d'aquesta setmana",
	'top-fans-monthly-points-link' => "Punts d'aqueste mes",
	'top-fans-points' => 'punts',
	'top-fans-by-category-title' => 'Top general de $1',
	'top-fans-bad-field-title' => 'Au!',
	'top-fans-bad-field-message' => "L'estatistica indicada existís pas.",
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Vòt|Vòts}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|victòria mesadièra|victòrias mesadièras}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|victòria setmanièra|victòrias setmanièras}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|modificacion|modificacions}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Comentari|Comentaris}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|referéncia|referéncias}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|amic|amics}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|enemic|enemics}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|opinion publicada|opinions publicadas}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Opinion|Opinions}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|òsca|òscas}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|nul|nuls}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|òsca atribuit|òscas atribuits}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|nul atribuit|nuls atribuits}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|present recebut|presents recebuts}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|present mandat|presents mandats}}',
	'right-updatepoints' => "Mesa a jorn del comptador d'edicions",
	'level-advanced-to' => 'a avançat cap al nivèl <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => "D'ara enlà, avètz un « $1 » sus {{SITENAME}} !",
	'level-advance-body' => "Adiu $1 :

Ara avètz un « $2 » sus {{SITENAME}} !

Totas nòstras felicitacions,

L'equipa de {{SITENAME}}

---
Volètz arrestar de recebre de corrièrs electronics de nòstra part ?

Clicatz $3
e modificatz vòstres paramètres en desactivant las notificacions per corrièr electronic.",
);

/** Polish (Polski)
 * @author Leinad
 * @author Maikking
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'user-stats-alltime-title' => 'Najwięcej punktów w historii',
	'user-stats-weekly-title' => 'Najwięcej punktów w tym tygodniu',
	'user-stats-monthly-title' => 'Najwięcej punktów w tym miesiącu',
	'topusers' => 'Najwyżej notowani użytkownicy',
	'top-fans-by-points-nav-header' => 'Najwyżej notowani wielbiciele',
	'top-fans-by-category-nav-header' => 'Najwyżej notowani według kategorii',
	'top-fans-total-points-link' => 'Suma punktów',
	'top-fans-weekly-points-link' => 'Punkty w tym tygodniu',
	'top-fans-monthly-points-link' => 'Punkty w tym miesiącu',
	'top-fans-points' => 'punktów',
	'top-fans-by-category-title' => 'Ogólnie najwyżej notowani $1',
	'top-fans-bad-field-title' => 'Oops!',
	'top-fans-bad-field-message' => 'Brak takiej statystyki.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Głos|Głosy}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Zwycięzca miesiąca|Zwycięzcy miesiąca}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Zwycięzca tygodnia|Zwycięzcy tygodnia}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Edycja|Edycje}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Komentarz|Komentarze}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Rekomendacja|Rekomendacje}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Znajomy|Znajomych}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Wróg|Wrogów}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Opublikowana opinia|Opublikowane opinie}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Opinia|Opinie}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Otrzymany głos|Otrzymane głosy}} poparcia',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Otrzymany głos|Otrzymane głosy}} sprzeciwu',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Oddany głos|Oddane głosy}} poparcia',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Oddany głos|Oddane głosy}} sprzeciwu',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Otrzymany prezent|Otrzymane prezenty}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Podarowany prezent|Podarowane prezenty}}',
	'right-updatepoints' => 'Aktualizacja liczników edycji',
	'level-advanced-to' => 'awansowany do poziomu <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Należysz teraz do grupy „$1” na {{GRAMMAR:MS.lp|{{SITENAME}}}}!',
	'level-advance-body' => 'Witaj $1.

Jesteś „$2” w {{GRAMMAR:Ms.lp|{{SITENAME}}}}!

Gratulacje

od zespołu {{GRAMMAR:D.lp|{{SITENAME}}}}

---
Jeżeli nie chcesz otrzymywać od nas więcej wiadomości, kliknij na poniższy link i zmień swoje ustawienia powiadamiania:

$3',
);

/** Portuguese (Português)
 * @author Vanessa Sabino
 * @author Waldir
 */
$messages['pt'] = array(
	'user-stats-alltime-title' => 'Mais pontos de todo o tempo',
	'user-stats-weekly-title' => 'Mais pontos esta semana',
	'user-stats-monthly-title' => 'Mais pontos deste mês',
	'topusers' => 'Usuários top',
	'top-fans-by-points-nav-header' => 'Fãs top',
	'top-fans-by-category-nav-header' => 'Top por categoria',
	'top-fans-total-points-link' => 'Pontos totais',
	'top-fans-weekly-points-link' => 'Pontos esta semana',
	'top-fans-monthly-points-link' => 'Pontos este mês',
	'top-fans-points' => 'pontos',
	'top-fans-by-category-title' => 'Top overall $1',
	'top-fans-bad-field-title' => 'Ops!',
	'top-fans-bad-field-message' => 'O status especificado não existe.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Voto|Votos}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|vencedor do mês|vencedores do mês}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|vencedor da semana|vencedores da semana}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Edição|Edições}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Comentário|Comentários}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Indicação|Indicações}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Amigo|Amigos}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Inimigo|Inimigos}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Opinião publicada|Opiniões publicadas}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Opinião|Opiniões}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Polegar para cima|Polegares para cima}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Polegar para baixo|Polegares para baixo}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Polegar para cima dado|Polegares para cima dados}}n',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Polegar para baixo dado|Polegares para baixo dados}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Presente recebido|Presentes recebidos}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Presente enviado|Presentes enviados}}',
	'right-updatepoints' => 'Atualizar contadores de edição',
	'level-advance-subject' => 'Você agora é um "$1" em {{SITENAME}}!',
	'level-advance-body' => 'Oi $1:

Você agora é um "$2" em {{SITENAME}}!

Parabéns,

O Time de {{SITENAME}}

---
Ei, quer parar de receber e-mails de nós?

Clique $3
e altere suas preferências para desabilitar e-mails de notificação',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 */
$messages['pt-br'] = array(
	'user-stats-alltime-title' => 'Mais pontos de todo o tempo',
	'user-stats-weekly-title' => 'Mais pontos esta semana',
	'user-stats-monthly-title' => 'Mais pontos deste mês',
	'topusers' => 'Melhores utilizadores',
	'top-fans-by-points-nav-header' => 'Maiores Fãs',
	'top-fans-by-category-nav-header' => 'Melhores por categoria',
	'top-fans-total-points-link' => 'Pontos totais',
	'top-fans-weekly-points-link' => 'Pontos esta semana',
	'top-fans-monthly-points-link' => 'Pontos este mês',
	'top-fans-points' => 'pontos',
	'top-fans-by-category-title' => 'Melhores $1 de sempre',
	'top-fans-bad-field-title' => 'Ops!',
	'top-fans-bad-field-message' => 'O status especificado não existe.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Voto|Votos}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|vencedor do mês|vencedores do mês}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|vencedor da semana|vencedores da semana}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Edição|Edições}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Comentário|Comentários}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Indicação|Indicações}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Amigo|Amigos}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Inimigo|Inimigos}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Opinião publicada|Opiniões publicadas}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Opinião|Opiniões}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Polegar para cima|Polegares para cima}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Polegar para baixo|Polegares para baixo}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Polegar para cima dado|Polegares para cima dados}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Polegar para baixo dado|Polegares para baixo dados}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Presente recebido|Presentes recebidos}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Presente enviado|Presentes enviados}}',
	'right-updatepoints' => 'Atualizar contadores de edição',
	'level-advanced-to' => 'Avançou para o nível <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Você agora é um "$1" em {{SITENAME}}!',
	'level-advance-body' => 'Oi $1:

Você agora é um "$2" em {{SITENAME}}!

Parabéns,

O Time de {{SITENAME}}

---
Ei, quer parar de receber e-mails de nós?

Clique $3
e altere suas preferências para desabilitar e-mails de notificação',
);

/** Romanian (Română)
 * @author Firilacroco
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'user-stats-weekly-title' => 'Cele mai multe puncte în această săptămână',
	'user-stats-monthly-title' => 'Cele mai multe puncte în această lună',
	'topusers' => 'Top utilizatori',
	'top-fans-by-points-nav-header' => 'Top fani',
	'top-fans-by-category-nav-header' => 'Top după categorie',
	'top-fans-total-points-link' => 'Total puncte',
	'top-fans-weekly-points-link' => 'Puncte în această săptămână',
	'top-fans-monthly-points-link' => 'Puncte în această lună',
	'top-fans-points' => 'puncte',
	'top-fans-bad-field-title' => 'Ups!',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Vot|Voturi}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Câştig lunar|Câştiguri lunare}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Câştig săptămânal|Câştiguri săptămânale}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Modificare|Modificări}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Comentariu|Comentarii}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Prieten|Prieteni}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Cadou primit|Cadouri primite}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Cadou oferit|Cadouri oferite}}',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'top-fans-bad-field-title' => "Ohhhhh! C'è scritte!",
	'top-fans-stats-vote-count' => "{{PLURAL:$1|'u Vote|le Vote}}",
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|vingita menzile|vingite menzile}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|vingita settimanele|vingite settimanele}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Cangiamende|Cangiaminde}}',
	'top-fans-stats-comment-count' => "{{PLURAL:$1|'u Commende|le Commende}}",
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|referimende|refereminde}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Amiche|Amice}}',
	'level-advance-subject' => 'Tu, mò, si \'nu "$1" sus a {{SITENAME}}!',
);

/** Russian (Русский)
 * @author Ferrer
 * @author Rubin
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'user-stats-alltime-title' => 'Больше всего очков за всё время',
	'user-stats-weekly-title' => 'Больше всего очков на этой неделе',
	'user-stats-monthly-title' => 'Больше всего очков в этом месяце',
	'topusers' => 'Рейтинг участников',
	'top-fans-by-points-nav-header' => 'Рейтинг болельщиков',
	'top-fans-by-category-nav-header' => 'Рейтинг по категориям',
	'top-fans-total-points-link' => 'Всего очков',
	'top-fans-weekly-points-link' => 'Очков за эту неделю',
	'top-fans-monthly-points-link' => 'Очков за этот месяц',
	'top-fans-points' => 'очков',
	'top-fans-by-category-title' => 'Рейтинг $1',
	'top-fans-bad-field-title' => 'Ой!',
	'top-fans-bad-field-message' => 'Указанной статистики не существует.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Голос|Голосов}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Побед за месяц|Побед за месяц}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Побед за неделю|Побед за неделю}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Правка|Правок}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Комментарий|Комментариев}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Направление|Направлений}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Друг|Друзей}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Недруг|Недругов}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Опубликовано мнений|Опубликовано мнений}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Мнение|Мнений}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Голосов за|Голосов за}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Голосов против|Голосов против}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Подано голосов за|Подано голосов за}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Подано голосов против|Подано голосов против}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Получено подарков|Получено подарков}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Отправлено подарков|Отправлено подарков}}',
	'right-updatepoints' => 'обновление счётчика правок',
	'level-advanced-to' => 'перешёл на уровень <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Вы теперь «$1» в проекте {{SITENAME}}!',
	'level-advance-body' => 'Привет, $1.

Вы теперь «$2» в проекте {{SITENAME}}!

Поздравляем!

Команда проекта {{SITENAME}}

---
Эй, не хотите больше получать таких писем от нас?

Нажмите $3
и измените настройки отправки уведомлений по эл. почте.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'user-stats-alltime-title' => 'Najviac bodov celkom',
	'user-stats-weekly-title' => 'Najviac bodov tento týždeň',
	'user-stats-monthly-title' => 'Najviac bodov tento mesiac',
	'topusers' => 'Naj používatelia',
	'top-fans-by-points-nav-header' => 'Naj fanúšikovia',
	'top-fans-by-category-nav-header' => 'Naj podľa kategórie',
	'top-fans-total-points-link' => 'Celkom bodov',
	'top-fans-weekly-points-link' => 'Bodov tento týždeň',
	'top-fans-monthly-points-link' => 'Bodov tento mesiac',
	'top-fans-points' => 'bodov',
	'top-fans-by-category-title' => 'Naj celkom $1',
	'top-fans-bad-field-title' => 'Ops!',
	'top-fans-bad-field-message' => 'Uvedená štatistika neexistuje.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Hlas|Hlasy|Hlasov}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Mesačná výhra|Mesačné výhry|Mesačných výhier}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Týždenná výhra|Týždenné výhry|Týždenných výhier}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Úprava|Úpravy|Úprav}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Komentár|Komentáre|Komentárov}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Odkazujúci|Odkazujúci|Odkazujúcich}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Priateľ|Priatelia|Priateľov}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Nepriateľ|Nepriatelia|Nepriateľov}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Zverejnený názor|Zverejnené názory|Zverejnených názorov}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Názor|Názory|Názorov}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Pochvala|Pochvaly|Pochvál}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Pokarhanie|Pokarhania|Pokarhaní}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Daná pochvala|Dané pochvaly|Daných pochvál}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Dané pokarhanie|Dané pokarhania|Daných pokarhaní}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Obdržaný dar|Obdržané dary|Obdržaných darov}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Poslaný dar|Poslané dary|Poslaných darov}}',
	'right-updatepoints' => 'Aktualizovať počty úprav',
	'level-advanced-to' => 'postúpil na úroveň <span style="font-weight:800;">$1</span>',
	'level-advance-subject' => 'Teraz ste „$1” na {{GRAMMAR:lokál|{{SITENAME}}}}!',
	'level-advance-body' => 'Ahoj $1:

Teraz ste „$2” na {{GRAMMAR:lokál|{{SITENAME}}}}!

Gratulujeme,

Tím {{GRAMMAR:genitív|{{SITENAME}}}}

---
Nechcete ďalej dostávať tieto emaily?

Kliknite na $3
a vypnite v svojich nastaveniach upozornenia emailom.',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author Najami
 */
$messages['sv'] = array(
	'user-stats-alltime-title' => 'Flest poäng någonsin',
	'user-stats-weekly-title' => 'Flest poäng den här veckan',
	'user-stats-monthly-title' => 'Flest poäng den här månaden',
	'topusers' => 'Bästa användare',
	'top-fans-by-points-nav-header' => 'Bästa fans',
	'top-fans-by-category-nav-header' => 'Bästa per kategori',
	'top-fans-total-points-link' => 'Poäng totalt',
	'top-fans-weekly-points-link' => 'Poäng den här veckan',
	'top-fans-monthly-points-link' => 'Poäng den här månaden',
	'top-fans-points' => 'poäng',
	'top-fans-by-category-title' => 'Bäst totalt $1',
	'top-fans-bad-field-title' => 'Hoppsan!',
	'top-fans-bad-field-message' => 'Den valda statistiken finns inte.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Röst|Röster}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Månadsvis vinst|Månadsvisa vinster}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Veckovis vinst|Veckovisa vinster}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Redigering|Redigeringar}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Kommentar|Kommentarer}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Referering|Refereringar}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Vän|Vänner}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Ovän|Ovänner}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Publiserad åsikt|Publicerade åsikter}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Åsikt|Åsikter}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Tummen upp|Tummen upp}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Tummen ner|Tummen ner}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Given tummen upp|Givna tummen upp}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Given tummen ner|Givna tummen ner}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Fådd gåva|Fådda gåvor}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Skickad gåva|Skickade gåvor}}',
	'right-updatepoints' => 'Uppdatera redigeringsräknare',
	'level-advance-subject' => 'Du är nu en "$1" på {{SITENAME}}!',
	'level-advance-body' => 'Hej $1!

Du är nu en "$2" på {{SITENAME}}!

Grattis,

{{SITENAME}}-teamet

---
Förresten, vill du slippa få epost från oss?

Klicka $3
och ändra dina inställningar för att avaktivera epost-meddelanden.',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'user-stats-alltime-title' => 'ఇప్పటివరకు ఎక్కువ పాయింట్లు',
	'user-stats-weekly-title' => 'ఈ వారంలో ఎక్కువ పాయింట్లు',
	'user-stats-monthly-title' => 'ఈ నెలలో ఎక్కువ పాయింట్లు',
	'top-fans-total-points-link' => 'మొత్తం పాయింట్లు',
	'top-fans-weekly-points-link' => 'ఈ వారం పాయింట్లు',
	'top-fans-monthly-points-link' => 'ఈ నెల పాయింట్లు',
	'top-fans-points' => 'పాయింట్లు',
	'top-fans-bad-field-title' => 'అయ్యో!',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|వోటు|వోట్లు}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|మార్పు|మార్పులు}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|వ్యాఖ్య|వ్యాఖ్యలు}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|మిత్రుడు|మిత్రులు}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|శతృవు|శతృవులు}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|అభిప్రాయం|అభిప్రాయాలు}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|అందుకున్న బహుమతి|అందుకున్న బహుమతులు}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|ఇచ్చిన బహుమతి|ఇచ్చిన బహుమతులు}}',
	'level-advance-subject' => '{{SITENAME}}లో మీరిప్పుడు "$1"!',
	'level-advance-body' => 'హాయ్ $1:

మీరిప్పుడు {{SITENAME}}లో "$2"!

అభినందనలు,

{{SITENAME}} బృందం

---
మా నుండి ఈ-మెయిళ్ళు వద్దనుకుంటున్నారా?

$3 ని నొక్కి
ఈ-మెయిలు గమనింపులని అచేతనం చేసుకునేందుకు అమరికలని మార్చుకోండి.',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'user-stats-alltime-title' => 'Pinakamaraming mga puntos sa lahat ng mga panahon',
	'user-stats-weekly-title' => 'Pinakamaraming mga puntos sa linggong ito',
	'user-stats-monthly-title' => 'Pinakamaraming mga puntos sa buwang ito',
	'topusers' => 'Nangungunang mga tagagamit',
	'top-fans-by-points-nav-header' => 'Nangungunang mga tagahanga',
	'top-fans-by-category-nav-header' => 'Nangunguna ayon sa kaurian',
	'top-fans-total-points-link' => 'Kabuoang mga puntos',
	'top-fans-weekly-points-link' => 'Mga puntos sa linggong ito',
	'top-fans-monthly-points-link' => 'Mga puntos sa buwang ito',
	'top-fans-points' => 'mga puntos',
	'top-fans-by-category-title' => 'Nangunguna sa pangkalahatan $1',
	'top-fans-bad-field-title' => 'Ay!',
	'top-fans-bad-field-message' => 'Hindi umiiral ang tinukoy na estadistika.',
	'top-fans-stats-vote-count' => '{{PLURAL:$1|Boto|Mga boto}}',
	'top-fans-stats-monthly-winner-count' => '{{PLURAL:$1|Buwanang pagwawagi|Buwanang mga pagwawagi}}',
	'top-fans-stats-weekly-winner-count' => '{{PLURAL:$1|Lingguhang pagwawagi|Lingguhang mga pagwawagi}}',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Pagbabago|Mga pagbabago}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Kumento|Mga kumento}}',
	'top-fans-stats-referrals-completed' => '{{PLURAL:$1|Pagsangguni|Mga pagsangguni}}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Kaibigan|Mga kaibigan}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Katunggali|Mga katunggali}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Nalathalang pananaw|Nalathalang mga pananaw}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Pananaw|Mga pananaw}}',
	'top-fans-stats-comment-score-positive-rec' => '{{PLURAL:$1|Pagtaas ng hinlalaki|Pagtataas ng mga hinlalaki}}',
	'top-fans-stats-comment-score-negative-rec' => '{{PLURAL:$1|Pagbaba ng mga hinlalagi|Pagbababa ng mga hinlalaki}}',
	'top-fans-stats-comment-score-positive-given' => '{{PLURAL:$1|Ibinigay na pagtaas ng hinlalaki|Ibinigay na mga pagtataas ng mga hinlalaki}}',
	'top-fans-stats-comment-score-negative-given' => '{{PLURAL:$1|Ibinigay na pagbaba ng hinlalaki|Ibinigay na mga pagbababa ng mga hinlalaki}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Natanggap na handog|Natanggap na mga handog}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Naipadalang handog|Naipadalang mga handog}}',
	'level-advance-subject' => 'Isa ka na ngayong "$1" sa {{SITENAME}}!',
	'level-advance-body' => 'Kumusta ka $1:

Isa ka na ngayong "$2" sa {{SITENAME}}!

Maligayang bati,

Ang Pangkat {{SITENAME}}

---
Hoy, nais mo bang matigil ang pagtanggap ng mga e-liham mula sa amin?

Pindutin ang $3
at baguhin ang mga pagtatakda mo upang huwag nang paganahin ang mga pagpapabatid sa pamamagitan ng e-liham.',
);

/** Turkish (Türkçe)
 * @author Joseph
 */
$messages['tr'] = array(
	'user-stats-alltime-title' => 'Tüm zamanların en çok puanı',
	'user-stats-weekly-title' => 'Bu hafta en çok puan',
	'user-stats-monthly-title' => 'Bu ay en çok puan',
	'top-fans-total-points-link' => 'Toplam puan',
	'top-fans-weekly-points-link' => 'Bu haftadaki puanlar',
	'top-fans-monthly-points-link' => 'Bu ayki puanlar',
	'top-fans-points' => 'puan',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'top-fans-total-points-link' => 'Điểm tổng cộng',
	'top-fans-weekly-points-link' => 'Số điểm tuần này',
	'top-fans-monthly-points-link' => 'Số điểm tháng này',
	'top-fans-points' => 'điểm',
	'top-fans-bad-field-title' => 'Oái!',
	'top-fans-stats-vote-count' => 'Lá phiếu',
	'top-fans-stats-edit-count' => 'Sửa đổi',
	'top-fans-stats-friends-count' => 'Người bạn',
	'top-fans-stats-opinions-created' => 'Ý kiến',
	'right-updatepoints' => 'Cập nhật số lần sửa đổi',
);

/** Volapük (Volapük)
 * @author Malafaya
 * @author Smeira
 */
$messages['vo'] = array(
	'top-fans-bad-field-message' => 'Statit pavilöl no dabinon.',
	'top-fans-stats-edit-count' => '{{PLURAL:$1|Redakam|Redakams}}',
	'top-fans-stats-comment-count' => '{{PLURAL:$1|Küpet|Küpets}',
	'top-fans-stats-friends-count' => '{{PLURAL:$1|Flen|Flens}}',
	'top-fans-stats-foe-count' => '{{PLURAL:$1|Neflen|Neflens}}',
	'top-fans-stats-opinions-published' => '{{PLURAL:$1|Ced pepüböl|Ceds pepüböl}}',
	'top-fans-stats-opinions-created' => '{{PLURAL:$1|Ced|Ceds}}',
	'top-fans-stats-gifts-rec-count' => '{{PLURAL:$1|Legivot pegetöl|Legivots pegetöl}}',
	'top-fans-stats-gifts-sent-count' => '{{PLURAL:$1|Legivot pesedöl|Legivots pesedöl}}',
	'level-advance-subject' => 'Anu binol „$1“ in {{SITENAME}}!',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'top-fans-stats-edit-count' => '$1次編輯',
	'top-fans-stats-friends-count' => '$1名朋友',
	'top-fans-stats-foe-count' => '$1名仇敵',
	'top-fans-stats-opinions-created' => '$1個意見',
	'top-fans-stats-gifts-rec-count' => '已收到禮物',
	'top-fans-stats-gifts-sent-count' => '已傳送禮物',
	'right-updatepoints' => '更新編輯次數',
	'level-advanced-to' => '已升至第<span style="font-weight:800;">$1</span>級',
);

