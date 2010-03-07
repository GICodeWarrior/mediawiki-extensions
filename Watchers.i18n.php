<?php
/**
 * Internationalisation file for extension Watchers.
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

$messages['en'] = array(
	'watchers' => 'Watchers',
	'watchers-desc' => 'Shows [[Special:Watchers|which users have a page on their watchlist]]',
	'watchers_link_title' => 'Who watches this page?',
	'watchers_error_article' => "'''Error:''' Page does not exist.",
	'watchers-error-invalid-page' => "'''Error:''' \"$1\" is an invalid page title.",
	'watchers_header' => '{{PLURAL:$2|User who is|Users who are}} watching "[[:$1]]"',
	'watchers_noone_watches' => 'No one watches the page [[:$1]].',
	'watchers_x_or_more' => '$1 or more {{PLURAL:$1|users|users}} have the page [[:$2]] on their watchlist.',
	'watchers_less_than_x' => 'Fewer than $1 {{PLURAL:$1|users|users}} have the page [[:$2]] on their watchlist.',
	'watchers-num' => '$1 {{PLURAL:$1|user has|users have}} the page [[:$2]] on {{PLURAL:$1|its|their}} watchlist.',
	'right-watchers-list' => '[[Special:Watchers|List users watching a specific page]]',
);

/** Message documentation (Message documentation)
 * @author Lejonel
 * @author PieRRoMaN
 * @author Raymond
 */
$messages['qqq'] = array(
	'watchers' => 'In Watchers extension. The title of the page Special:Watchers, which lists users who has an article on their watch list.',
	'watchers-desc' => 'Shown as description in [[Special:Version]]',
	'watchers_link_title' => 'In Watchers extension. The text for the link to Special:Watchers in the toolbox.',
	'watchers_error_article' => 'In Watchers extension. Error message which is displayed when trying to use Special:Watchers for a page that does no exist.',
	'watchers_noone_watches' => 'In Watchers extension. Used in Special:Watchers for pages which are not on the watchlist of any user.',
	'watchers_x_or_more' => 'In Watchers extension. Used in Special:Watchers for pages that have at least a certain number of watching users.

$1 is an integer (specified in the configuration of the wiki).',
	'watchers_less_than_x' => 'In Watchlist extension. Used in Special:Watchers for pages that has less than a certain number of watching users.

Parameter $1 is an integer (specified in the configuration of the wiki).',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'watchers' => 'Dophouers',
	'watchers_link_title' => 'Wie hou die bladsy dop?',
	'watchers_error_article' => '<b>Fout:</b> bladsy bestaan nie.',
	'watchers_header' => 'Gebruikers wat "[[:$1]]" dophou',
	'watchers_noone_watches' => 'Niemand hou die bladsy dop nie.',
	'watchers_x_or_more' => '$1 of meer gebruikers hou die bladsy dop.',
	'watchers_less_than_x' => 'Minder as $1 gebruikers hou die bladsy dop.',
);

/** Old English (Anglo-Saxon)
 * @author Wōdenhelm
 */
$messages['ang'] = array(
	'watchers' => 'Ƿaċiendas',
	'watchers_link_title' => 'Hƿā ƿacaþ þisne tramet?',
	'watchers_noone_watches' => 'Nǣniȝ ƿacaþ þisne tramet.',
	'watchers_x_or_more' => '$1 oþþe mā {{PLURAL:$1|users|brūcendas}} habbaþ þisne tramet on hiere behealdnestalu.',
);

/** Arabic (العربية)
 * @author Meno25
 * @author OsamaK
 */
$messages['ar'] = array(
	'watchers' => 'المراقبون',
	'watchers-desc' => 'يعرض [[Special:Watchers|أي المستخدمين لديهم صفحة ما في قائمة مراقبتهم]]',
	'watchers_link_title' => 'من يراقب هذه الصفحة؟',
	'watchers_error_article' => '<b>خطأ:</b> الصفحة غير موجودة.',
	'watchers_header' => '{{PLURAL:$2||المستخدم الذي يراقب|المستخدمان اللذان يراقبان|المستخدمون الذين يراقبون}} "[[:$1]]"',
	'watchers_noone_watches' => 'لا أحد يراقب الصفحة [[:$1]].',
	'watchers_x_or_more' => '{{PLURAL:$1|لا مستخدمون|مستخدم واحد أو أكثر لديه|مستخدمان أو أكثر لديهما|$1 مستخدمون أو أكثر لديهم|$1 مستخدمًا أو أكثر لديهم|$1 مستخدم أو أكثر لديهم}} صفحة [[:$2]] في قائمة {{PLURAL:$1|مراقبتهم|مراقبته|مراقبتهما|مراقبتهم}}.',
	'watchers_less_than_x' => 'أقل من $1 {{PLURAL:$1|مستخدم|مستخدم}} لديهم هذه الصفحة في قائمة مراقبتهم.',
);

/** Aramaic (ܐܪܡܝܐ)
 * @author Basharh
 */
$messages['arc'] = array(
	'watchers' => 'ܪ̈ܗܝܢܐ',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Ghaly
 * @author Meno25
 */
$messages['arz'] = array(
	'watchers' => 'المراقبون',
	'watchers-desc' => 'يعرض [[Special:Watchers|أى يوزرز عندهم صفحة فى لستة مراقبتهم]]',
	'watchers_link_title' => 'من يراقب هذه الصفحة؟',
	'watchers_error_article' => '<b>خطأ:</b> الصفحة غير موجودة.',
	'watchers_header' => '{{PLURAL:$2|اليوزر اللى بيراقب|اليوزرز اللى بيراقبو}} "[[:$1]]"',
	'watchers_noone_watches' => 'لا أحد يراقب هذه الصفحة.',
	'watchers_x_or_more' => '$1 {{PLURAL:$1|يوزر|يوزر}} أو أكتر  الصفحة دى  فى لستة مراقبتهم.',
	'watchers_less_than_x' => 'أقل من $1 $1 {{PLURAL:$1|يوزر|يوزر}} أو أكتر  الصفحة دى  فى لستة مراقبتهم.',
);

/** Asturian (Asturianu)
 * @author Esbardu
 */
$messages['ast'] = array(
	'watchers' => 'Vixilantes',
	'watchers_link_title' => '¿Quién vixila esta páxina?',
	'watchers_error_article' => '<b>Error:</b> La páxina nun esiste.',
	'watchers_header' => 'Persones que tán vixilando "[[:$1]]"',
	'watchers_noone_watches' => 'Naide ta vixilando esta páxina.',
	'watchers_x_or_more' => '$1 o más persones tán vixilando esta páxina.',
	'watchers_less_than_x' => 'Hai menos de $1 vixilando esta páxina.',
);

/** Kotava (Kotava)
 * @author Wikimistusik
 */
$messages['avk'] = array(
	'watchers' => 'Suzdasikeem',
	'watchers_link_title' => 'Toktan va batu bu suzdar ?',
	'watchers_error_article' => '<b>Rokla :</b> Batu bu me tir.',
	'watchers_header' => 'Tan va "[[:$1]]" suzdas',
	'watchers_noone_watches' => 'Metan va batu bu suzdar',
	'watchers_x_or_more' => '$1 ok lotan va batu bu suzdad.',
	'watchers_less_than_x' => 'Le $1 korik tid suzdas va batu bu.',
);

/** Bavarian (Boarisch)
 * @author Man77
 */
$messages['bar'] = array(
	'watchers' => 'Beobåchta',
	'watchers-desc' => 'Zoagt, [[Special:Watchers|wiavüi Benutza]] a Seitn auf iara Beobåchtungslistn håm',
	'watchers_link_title' => 'Wea beobåcht de Seitn?',
	'watchers_error_article' => "'''Fehla:''' De Seitn gibt's ned.",
	'watchers_header' => '{{PLURAL:$2|Benutza, dea „[[:$1]]“ beobåcht|Benutza, de „[[:$1]]“ beobåchtn}}',
	'watchers_noone_watches' => 'De Seitn beobåcht neamt.',
	'watchers_x_or_more' => '$1 oda mea {{PLURAL:$1|Benutza|Benutza}} beobåchtn de Seitn.',
	'watchers_less_than_x' => 'Weniga wia {{PLURAL:$1|$1 Benutza|$1 Benutza}} beobåchtn de Seitn.',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 * @author Red Winged Duck
 */
$messages['be-tarask'] = array(
	'watchers' => 'Назіральнікі',
	'watchers-desc' => 'Паказвае, [[Special:Watchers|якія ўдзельнікі маюць старонку ў сваім сьпісе назіраньня]]',
	'watchers_link_title' => 'Хто назірае за гэтай старонкай?',
	'watchers_error_article' => "'''Памылка:''' старонка не існуе.",
	'watchers-error-invalid-page' => "'''Памылка:''' «$1» — няслушная назва старонкі.",
	'watchers_header' => '{{PLURAL:$2|Удзельнік, які назірае|Удзельнікі, які назіраюць}} за старонкай «[[:$1]]»',
	'watchers_noone_watches' => 'Ніхто не назірае за старонкай [[:$1]].',
	'watchers_x_or_more' => 'За старонкай [[:$2]] {{PLURAL:$1|назірае|назіраюць|назіраюць}} $1 ці болей удзельнікаў.',
	'watchers_less_than_x' => 'За гэтай старонкай назірае меней $1 {{PLURAL:$1|удзельніка|удзельнікаў|удзельнікаў}}.',
	'watchers-num' => '$1 {{PLURAL:$1|удзельнік назірае|удзельнікі назіраюць|удзельнікаў назіраюць}} за старонкай [[:$2]].',
	'right-watchers-list' => 'прагляд [[Special:Watchers|сьпісу удзельнікаў, якія назіраюць пэўную старонку]]',
);

/** Bulgarian (Български)
 * @author DCLXVI
 * @author Spiritia
 */
$messages['bg'] = array(
	'watchers' => 'Наблюдаващи',
	'watchers-desc' => 'Показва [[Special:Watchers|кои потребители са добавили страниците в списъка си за наблюдение]]',
	'watchers_link_title' => 'Кой наблюдава тази страница?',
	'watchers_error_article' => '<b>Грешка:</b> Страницата не съществува.',
	'watchers_header' => '{{PLURAL:$2|Потребител, който наблюдава|Потребители, които наблюдават}} „[[:$1]]“',
	'watchers_noone_watches' => 'Тази страница не се наблюдава от никого.',
	'watchers_x_or_more' => '$1 {{PLURAL:$1|потребител наблюдава|или повече потребители наблюдават}} тази страница.',
	'watchers_less_than_x' => 'Най-много $1 {{PLURAL:$1|потребител|потребители}} наблюдават тази страница.',
);

/** Bengali (বাংলা)
 * @author Zaheen
 */
$messages['bn'] = array(
	'watchers' => 'নজরদারগণ',
	'watchers_link_title' => 'কে এই পাতাটি নজরে রাখছেন?',
	'watchers_error_article' => '<b>ত্রুটি:</b> পাতাটির অস্তিত্ব নেই।',
	'watchers_header' => 'যারা "[[:$1]]" নজরে রাখছেন',
	'watchers_noone_watches' => 'এই পাতাটি কেউ নজরে রাখছেন না।',
	'watchers_x_or_more' => 'এই পাতাটি $1 বা তারও বেশি লোক নজরে রাখছেন।',
	'watchers_less_than_x' => '$1-এরও কম লোক এই পাতাটি নজরে রাখছেন।',
);

/** Breton (Brezhoneg)
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'watchers' => 'Evezhierien',
	'watchers-desc' => 'Diskwel a ra [[Special:Watchers|peseurt implijerien o deus enrollet pajennoù en o roll evezhiañ]]',
	'watchers_link_title' => "Piv a vez oc'h evezhiañ ar bajenn-mañ ?",
	'watchers_error_article' => "<b>Fazi :</b> n'eus ket eus ar bajenn-se.",
	'watchers-error-invalid-page' => "'''Fazi :''' un titl pennad fall eo \"\$1\"",
	'watchers_header' => '{{PLURAL:$2|Den|Tud}} a heuilh "[[:$1]]"',
	'watchers_noone_watches' => 'Den ebet ne heuilh ar bajenn [[:$1]].',
	'watchers_x_or_more' => "$1 implijer{{PLURAL:$1||}} pe muioc'h zo renablet ar bajenn [[:$2]] en o roll evezhiañ.",
	'watchers_less_than_x' => "Nebeutoc'h eget $1 {{PLURAL:$1|implijer|implijer}} zo renablet ar bajenn-mañ en o roll evezhiañ.",
	'watchers-num' => '$1 implijer{{PLURAL:$1||}} o deus ar bajenn [[:$2]] en {{PLURAL:$1|e|o}} roll evezhiañ.',
	'right-watchers-list' => "[[Special:Watchers|Rollañ an implijerien oc'h evezhiañ ur bajenn bennak]]",
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'watchers' => 'Posmatrači',
	'watchers-desc' => 'Prikazuje [[Special:Watchers|koji korisnici imaju stranicu na svom spisku za praćenje]]',
	'watchers_link_title' => 'Ko prati ovu stranicu?',
	'watchers_error_article' => "'''Greška:''' Stranica ne postoji.",
	'watchers_header' => '{{PLURAL:$2|Korisnik koji prati|Korisnici koji prate}} "[[:$1]]"',
	'watchers_noone_watches' => 'Niko ne posmatra ovu stranicu.',
	'watchers_x_or_more' => '$1 ili više {{PLURAL:$1|korisnika ima|korisnika imaju}} ovu stranicu na svom spisku praćenja.',
	'watchers_less_than_x' => 'Manje od $1 {{PLURAL:$1|korisnika ima|korisnika imaju}} ovu stranicu na svom spisku praćenja.',
);

/** Catalan (Català)
 * @author Paucabot
 */
$messages['ca'] = array(
	'watchers' => 'Vigilants',
	'watchers-desc' => 'Mostra [[Special:Watchers|quins usuaris tenen una pàgina a la seva llista de seguiment]]',
	'watchers_link_title' => 'Qui vigila aquesta pàgina?',
	'watchers_error_article' => "'''Error:''' La pàgina no existeix.",
	'watchers_header' => '{{PLURAL:$2|usuari està|usuaris estan}} vigilant "[[:$1]]"',
	'watchers_noone_watches' => 'Ningú vigila aquesta pàgina.',
	'watchers_x_or_more' => '$1 o més {{PLURAL:$1|usuaris|usuaris}} tenen aquesta pàgina a la seva llista de seguiment.',
	'watchers_less_than_x' => 'Menys de $1 {{PLURAL:$1|usuaris|usuaris}} tenen aquesta pàgina a la seva llista de seguiment.',
);

/** Sorani (Arabic script) (‫کوردی (عەرەبی)‬)
 * @author Marmzok
 */
$messages['ckb-arab'] = array(
	'watchers' => 'چاودێران',
	'watchers_link_title' => 'کێ چاو له ئه‌‌م لاپه‌ڕه‌ ده‌کات؟',
	'watchers_error_article' => "'''هه‌ڵه‌:''' ئه‌و لاپه‌ڕه‌ بوونی نیه‌.",
	'watchers_noone_watches' => 'هیچ‌که‌س چاودێری ئه‌م لاپه‌ڕه‌یه‌ ناکات.',
);

/** Czech (Česky)
 * @author Matěj Grabovský
 * @author Mormegil
 */
$messages['cs'] = array(
	'watchers' => 'Sledující',
	'watchers-desc' => 'Zobrazuje [[Special:Watchers|uživatele, kteří mají stránku v seznamu sledovaných]]',
	'watchers_link_title' => 'Kdo sleduje tuto stránku?',
	'watchers_error_article' => '<b>Chyba:</b> Článek neexistuje.',
	'watchers_header' => '{{PLURAL:$2|Uživatel|Uživatelé}} sledující stránku „[[:$1]]“',
	'watchers_noone_watches' => 'Nikdo nesleduje tuto stránku',
	'watchers_x_or_more' => '$1 nebo více uživatelů sleduje tuto stránku.{{PLURAL:$1||}}',
	'watchers_less_than_x' => 'Méně než $1 {{PLURAL:|uživatel sleduje|uživatelé sledují|uživatelů sleduje}} tuto stránku.',
);

/** Welsh (Cymraeg)
 * @author Lloffiwr
 */
$messages['cy'] = array(
	'watchers' => 'Gwylwyr',
	'watchers-desc' => 'Yn dangos rhestr y [[Special:Watchers|gwylwyr sydd yn dilyn hynt rhyw dudalen]]',
	'watchers_link_title' => "Pwy sy'n dilyn hynt y dudalen hon?",
	'watchers_error_article' => "'''Gwall:''' Nid yw'r dudalen yn bod.",
	'watchers-error-invalid-page' => "'''Gwall:''' Nid yw \"\$1\" yn deitl dilys ar dudalen.",
	'watchers_header' => '{{PLURAL:$2|Defnyddwyr|Defnyddiwr|Defnyddwyr|Defnyddwyr|Defnyddwyr|Defnyddwyr}} sy\'n dilyn hynt "[[:$1]]"',
	'watchers_noone_watches' => 'Nid oes neb yn dilyn hynt y dudalen [[:$1]].',
	'watchers_x_or_more' => "Mae'r dudalen [[:$2]] ar restr wylio o leiaf $1 {{PLURAL:$1||defnyddiwr|ddefnyddiwr|o ddefnyddwyr|o ddefnyddwyr|o ddefnyddwyr}}.",
	'watchers_less_than_x' => "Mae'r dudalen hon ar restr gwylio llai na(g) $1 {{PLURAL:$1||defnyddiwr|ddefnyddiwr|o ddefnyddwyr|o ddefnyddwyr|o ddefnyddwyr}}.",
	'watchers-num' => "{{PLURAL:$1|Nid oes gan neb o'r defnyddwyr|Mae gan un defnyddiwr|Mae gan $1 ddefnyddiwr|Mae gan $1 defnyddiwr|Mae gan $1 defnyddiwr|Mae gan $1 o ddefnyddwyr}} y dudalen [[:$2]] ar {{PLURAL:$1|eu rhestri gwylio|ei restr wylio|eu rhestri gwylio|eu rhestri gwylio|eu rhestri gwylio|eu rhestri gwylio}}.",
	'right-watchers-list' => "[[Special:Watchers|Rhestru defnyddwyr sy'n dilyn hynt tudalen benodol]]",
);

/** German (Deutsch)
 * @author Revolus
 * @author Umherirrender
 */
$messages['de'] = array(
	'watchers' => 'Beobachter',
	'watchers-desc' => 'Zeigt, [[Special:Watchers|wieviele Benutzer]] eine Seite auf ihrer Beobachtungsliste haben',
	'watchers_link_title' => 'Wer beobachtet diese Seite?',
	'watchers_error_article' => "'''Fehler:''' Seite existiert nicht.",
	'watchers_header' => '{{PLURAL:$2|Benutzer, der „[[:$1]]“ beobachtet|Benutzer, die „[[:$1]]“ beobachten}}',
	'watchers_noone_watches' => 'Kein Benutzer beobachtet die Seite [[:$1]].',
	'watchers_x_or_more' => '$1 oder mehr {{PLURAL:$1|Benutzer|Benutzer}} beobachten die Seite [[:$2]].',
	'watchers_less_than_x' => 'Weniger als {{PLURAL:$1|$1 Benutzer|$1 Benutzer}} beobachten diese Seite.',
	'watchers-num' => '$1 ((PLURAL:$1|Benutzer hat|Benutzer haben)) die Seite [[:$2]] auf ((PLURAL:$1|seiner|ihrer)) Beobachtungsliste.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'watchers' => 'Wobglědowarje',
	'watchers-desc' => 'Pokazujo, [[Special:Watchers|kótare wužywarje maju bok na swójich wobglědowańkach]]',
	'watchers_link_title' => 'Chto wobglědujo toś ten bok?',
	'watchers_error_article' => "'''Zmólka:''' Bok njeeksistěrujo.",
	'watchers_header' => '{{PLURAL:$2|Wužywaŕ, kótaryž "[[:$1]]" wobglědujo|Wužywarja, kótarejž "[[:$1]]" wobglědujotej|Wužywarje, kótarež "[[:$1]]" wobglěduju|Wužywarje, kótarež "[[:$1]]" wobglěduju}}',
	'watchers_noone_watches' => 'Nichten njewužywa toś ten bok.',
	'watchers_x_or_more' => '$1 {{PLURAl:$1|wužywaŕ|wužywarja|wužywarje|wužywarjow}} abo wěcej {{PLURAl:$1|wobglědujo|wobglědujotej|wobglěduju|wobglědujo}} toś ten bok.',
	'watchers_less_than_x' => 'Mjenjej ako $1 {{PLURAL:$1|wužywaŕ wobglědujo|wužywarja wobglědujotej|wužywarje wobglěduju|wužywarjow wobglědujo}} toś ten bok.',
);

/** Greek (Ελληνικά)
 * @author Consta
 * @author Omnipaedista
 */
$messages['el'] = array(
	'watchers' => 'Παρατηρητές',
	'watchers-desc' => 'Εμφανίζει [[Special:Watchers|ποιοι χρήστες έχουν μια σελίδα στη λίστα παρακολούθησής τους]]',
	'watchers_link_title' => 'Ποιος παρατηρεί αυτήν τη σελίδα;',
	'watchers_error_article' => '<b>Σφάλμα:</b> Η σελίδα δεν υπάρχει.',
	'watchers_header' => '{{PLURAL:$2|Χρήστης που παρακολουθεί|Χρήστες που παρακολουθούν}} το "[[:$1]]"',
	'watchers_noone_watches' => 'Κανείς δεν παρατηρεί αυτήν την σελίδα.',
	'watchers_x_or_more' => '$1 ή περισσότεροι {{PLURAL:$1|χρήστης παρακολουθεί|χρήστες παρακολουθούν}} αυτήν τη σελίδα.',
	'watchers_less_than_x' => '$1 ή λιγότεροι {{PLURAL:$1|χρήστης παρακολουθεί|χρήστες παρακολουθούν}} αυτήν τη σελίδα.',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'watchers' => 'Rigardantoj',
	'watchers-desc' => 'Montras [[Special:Watchers|kiujn uzantojn tiuj havas paĝon en ties atentaro]]',
	'watchers_link_title' => 'Kiu atentas ĉi tiun paĝon?',
	'watchers_error_article' => '<b>Eraro:</b> Paĝo ne ekzistas.',
	'watchers_header' => '{{PLURAL:$2|Uzanto kiu|Uzantoj kiuj}} atentas "[[:$1]]"',
	'watchers_noone_watches' => 'Neniu rigardas ĉi tiun paĝon',
	'watchers_x_or_more' => '$1 aŭ pli {{PLURAL:$1|uzanto|uzantoj}} atentas ĉi tiun paĝon.',
	'watchers_less_than_x' => 'Malpli ol $1 {{PLURAL:$1|uzanto|uzantoj}} atentas ĉi tiun paĝon.',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Dferg
 * @author Fluence
 * @author Imre
 * @author McDutchie
 * @author Translationista
 */
$messages['es'] = array(
	'watchers' => 'Vigilantes',
	'watchers-desc' => 'Muestra [[Special:Watchers|aquellos usuarios que tienen una página en sus listas de vigilancia]]',
	'watchers_link_title' => '¿Quién vigila esta página?',
	'watchers_error_article' => "'''Error:''' La página no existe.",
	'watchers_header' => '{{PLURAL:$2|usuario quien está|Usuarios quienes están}} vigilando "[[:$1]]"',
	'watchers_noone_watches' => 'Nadie vigila la página [[:$1]]',
	'watchers_x_or_more' => '$1 o más {{PLURAL:$1|usuarios|usuarios}} tienen la página [[:$2]] en sus listas de vigilancia.',
	'watchers_less_than_x' => 'menos de $1 {{PLURAL:$1|usuario|usuarios}} tienen esta página en su lista de vigilancia.',
);

/** Basque (Euskara)
 * @author Kobazulo
 */
$messages['eu'] = array(
	'watchers' => 'Zaintzaileak',
	'watchers_link_title' => 'Nork begiratzen du orrialde hau?',
	'watchers_error_article' => "'''Errorea:''' Orrialde hau ez da existitzen.",
	'watchers_header' => '"[[:$1]]" zaintzen ari {{PLURAL:$2|den erabaltzailea|diren erabaltzaileak}}',
	'watchers_noone_watches' => 'Inork ez du orrialde hau ikusten.',
);

/** Finnish (Suomi)
 * @author Crt
 * @author Silvonen
 * @author Vililikku
 */
$messages['fi'] = array(
	'watchers' => 'Tarkkailijat',
	'watchers-desc' => 'Kertoo, [[Special:Watchers|keillä käyttäjillä on sivu tarkkailulistoillansa]].',
	'watchers_link_title' => 'Kuka tarkkailee tätä sivua?',
	'watchers_error_article' => "'''Virhe:''' Sivua ei ole olemassa.",
	'watchers_header' => '{{PLURAL:$2|Käyttäjä, joka tarkkailee|Käyttäjät, jotka tarkkailevat}} sivua ”[[:$1]]”',
	'watchers_noone_watches' => 'Kukaan ei tarkkaile sivua [[:$1]].',
	'watchers_x_or_more' => '$1 tai useampi {{PLURAL:$1|käyttäjä|käyttäjä}} tarkkailee tätä sivua.',
	'watchers_less_than_x' => 'Vähemmän kuin $1 {{PLURAL:$1|käyttäjä|käyttäjää}} tarkkailee tätä sivua.',
);

/** French (Français)
 * @author Grondin
 * @author IAlex
 * @author PieRRoMaN
 * @author Sherbrooke
 * @author Urhixidur
 * @author Zetud
 */
$messages['fr'] = array(
	'watchers' => 'Suiveurs',
	'watchers-desc' => 'Affiche [[Special:Watchers|quels utilisateurs ont une page dans leur liste de suivi]]',
	'watchers_link_title' => 'Qui a cette page en suivi ?',
	'watchers_error_article' => '<b>Erreur :</b> La page n’existe pas.',
	'watchers-error-invalid-page' => "'''Erreur :''' « $1 » est un titre de page invalide.",
	'watchers_header' => '{{PLURAL:$2|Utilisateur qui suit|Utilisateurs qui suivent}} « [[:$1]] »',
	'watchers_noone_watches' => 'Personne ne suit la page [[:$1]].',
	'watchers_x_or_more' => '$1 utilisateur{{PLURAL:$1||s}} ou plus ont la page [[:$2]] dans leur liste de suivi.',
	'watchers_less_than_x' => 'Moins {{PLURAL:$1|d’un utilisateur suit|de $1 utilisateurs suivent}} cette page.',
	'watchers-num' => '$1 {{PLURAL:$1|utilisateur a| utilisateurs ont}} la page [[:$2]] dans {{PLURAL:$1|sa liste|leurs listes}} de suivi.',
	'right-watchers-list' => '[[Special:Watchers|Lister les utilisateur qui suivent une page spécifique]]',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 */
$messages['gl'] = array(
	'watchers' => 'Vixiantes',
	'watchers-desc' => 'Amosa [[Special:Watchers|que usuarios teñen unha páxina concreta na súa lista de vixilancia]]',
	'watchers_link_title' => 'Quen vixía esta páxina?',
	'watchers_error_article' => "'''Erro:''' A páxina non existe.",
	'watchers-error-invalid-page' => "'''Erro:''' \"\$1\" é un título de páxina inválido.",
	'watchers_header' => '{{PLURAL:$2|Usuario|Usuarios}} que {{PLURAL:$2|está|están}} vixiando "[[:$1]]"',
	'watchers_noone_watches' => 'Ninguén vixía a páxina "[[:$1]]".',
	'watchers_x_or_more' => '$1 {{PLURAL:$1|usuario|usuarios}} ou máis teñen a páxina "[[:$2]]" na súa lista de vixilancia.',
	'watchers_less_than_x' => '$1 {{PLURAL:$1|usuario|usuarios}} ou menos teñen a páxina "[[:$2]]" na súa lista de vixilancia.',
	'watchers-num' => '$1 {{PLURAL:$1|usuario ten|usuarios teñen}} a páxina "[[:$2]]" {{PLURAL:$1|na súa lista|nas súas listas}} de vixilancia.',
	'right-watchers-list' => '[[Special:Watchers|Listar os usuarios que vixían unha páxina concreta]]',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'watchers' => 'Beobachter',
	'watchers-desc' => 'Zeigt, [[Special:Watchers|wievyyl Benutzer]] e Seite uf ihre Beobachtigslischt hän.',
	'watchers_link_title' => 'Wär beobachtet die Syte?',
	'watchers_error_article' => "'''Fähler:''' Syte git s nit.",
	'watchers-error-invalid-page' => "'''Fähler:''' \"\$1\" isch kei giltige Sytename.",
	'watchers_header' => '{{PLURAL:$2|Benutzer, wu „[[:$1]]“ beobachtet|Benutzer, wu „[[:$1]]“ beobachte}}',
	'watchers_noone_watches' => 'S git kei Benutzer, wu d Syte [[:$1]] beobachte.',
	'watchers_x_or_more' => '$1 oder meh {{PLURAL:$1|Benutzer|Benutzer}} beobachte d Syte [[:$2]].',
	'watchers_less_than_x' => 'Weniger as {{PLURAL:$1|$1 Benutzer|$1 Benutzer}} beobachte die Syte.',
	'watchers-num' => '$1 {{PLURAL:$1|Benutzer het|Benutzer hän}} d Syte [[:$2]] uf {{PLURAL:$1|syyre|ihre}} Beobachtigslischt.',
	'right-watchers-list' => '[[Special:Watchers|Benutzer uflischte, wu ne bstimmti Syte beobachte]]',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'watchers' => 'עוקבים',
	'watchers-desc' => 'הצגה [[Special:Watchers|אילו משתמשים עוקבים אחרי דף זה]]',
	'watchers_link_title' => 'מי עוקב אחרי דף זה?',
	'watchers_error_article' => "'''שגיאה:''' הדף אינו קיים.",
	'watchers_header' => '{{PLURAL:$2|משתמש העוקב|משתמשים העוקבים}} אחרי "[[:$1]]"',
	'watchers_noone_watches' => 'אף אחד לא עוקב אחר דף זה.',
	'watchers_x_or_more' => '{{PLURAL:$1|משתמש אחד|$1 משתמשים}} או יותר עוקבים אחרי דף זה.',
	'watchers_less_than_x' => 'פחות מ{{PLURAL:$1|משתמש אחד עוקב|־$1 משתמשים עוקבים}} אחרי דף זה.',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'watchers' => 'Wobkedźbowarjo',
	'watchers-desc' => 'Pokazuje [[Special:Watchers|kotři wužiwarjo maja stronu na swojich wobkedźbowankach]]',
	'watchers_link_title' => 'Štó tutu stronu wobkedźbuje?',
	'watchers_error_article' => '<b>Zmylk:</b> Strona njeeksistuje.',
	'watchers-error-invalid-page' => "'''Zmylk''' \"\$1\" je njepłaćiwy titul strony.",
	'watchers_header' => '{{PLURAL:$2|Wužiwar|Wužiwarjej|Wužiwarjo|Wužiwarjo}}, {{PLURAL:$2|kotryž|kotrajž|kotřiž|kotřiž}} "[[:$1]]" {{PLURAL:$2|wobkedźbuje|wobkedźbujetaj|wobkedźbuja|wobkedźbuja}}',
	'watchers_noone_watches' => 'Nichtó tutu stronu njewobkedźbuje.',
	'watchers_x_or_more' => '$1 {{PLURAL:$1|wužiwar|wužiwarjej|wužiwarjo|wužiwarjow}} abo wjace {{PLURAL:$1|wobkedźbuje|wobkedźbujetej|wobkedźbuja|wobkedźbuje}} stronu [[:$2]].',
	'watchers_less_than_x' => 'Mjenje hač $1 {{PLURAL:$1|wužiwar|wužiwarjej|wužiwarjo|wužiwarjow}} {{PLURAL:$1|wobkedźbuje|wobkedźbujetaj|wobkedźbuja|wobkedźbuje}} tutu stronu.',
	'watchers-num' => '$1 {{PLURAL:$1|wužiwar wobkedźbuje|wužiwarjej wobkedźbujetej|wužiwarjo wobkedźbuja|wužiwarjow wobkedźbuje}} stronu [[:$2]].',
	'right-watchers-list' => '[[Special:Watchers|Lisćina wužiwarjow, kotřiž wěstu stronu wobkedźbuja]]',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Glanthor Reviol
 */
$messages['hu'] = array(
	'watchers' => 'Figyelők',
	'watchers-desc' => 'Megmutatja, hogy [[Special:Watchers|egy adott lapot mely szerkesztők figyelik]]',
	'watchers_link_title' => 'Ki figyeli ezt a lapot?',
	'watchers_error_article' => "'''Hiba:''' A lap nem létezik.",
	'watchers-error-invalid-page' => "'''Hiba:''' a(z) „$1” érvénytelen lapcím.",
	'watchers_header' => '{{PLURAL:$2|Szerkesztő, aki figyeli|Szerkesztők, akik figyelik}} a(z) „[[:$1]]” című lapot',
	'watchers_noone_watches' => 'Ezt a lapot nem figyeli senki.',
	'watchers_x_or_more' => '{{PLURAL:$1|Egy|$1}} vagy több felhasználó figyelőlistáján szerepel a(z) [[:$2]] lap.',
	'watchers_less_than_x' => 'Kevesebb, mint {{PLURAL:$1|Egy|$1}} szerkesztő figyeli ezt a lapot.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'watchers' => 'Observatores',
	'watchers-desc' => 'Monstra [[Special:Watchers|le usatores qui ha un pagina in lor observatorios]]',
	'watchers_link_title' => 'Qui observa iste pagina?',
	'watchers_error_article' => '<b>Error:</b> Pagina non existe.',
	'watchers-error-invalid-page' => "'''Error:''' \"\$1\" es un titulo de pagina invalide.",
	'watchers_header' => '{{PLURAL:$2|Usator|Usatores}} qui observa "[[:$1]]"',
	'watchers_noone_watches' => 'Necuno observa iste pagina.',
	'watchers_x_or_more' => 'Al minus $1 {{PLURAL:$1|usator|usatores}} ha le pagina [[:$2]] in {{PLURAL:$1|su observatorio|lor observatorios}}.',
	'watchers_less_than_x' => 'Minus de $1 {{PLURAL:$1|usator|usatores}} observa iste pagina.',
	'watchers-num' => '$1 {{PLURAL:$1|usator|usatores}} ha le pagina [[:$2]] in {{PLURAL:$1|su|lor}} observatorio.',
	'right-watchers-list' => '[[Special:Watchers|Listar le usatores qui observa un pagina specific]]',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 */
$messages['id'] = array(
	'watchers' => 'Pemantau',
	'watchers-desc' => 'Menunjukkan [[Special:Watchers|pengguna yang memiliki sebuah halaman di daftar pantauan mereka]]',
	'watchers_link_title' => 'Siapa yang memantau halaman ini?',
	'watchers_error_article' => "'''Galat:''' Halaman tidak ada.",
	'watchers_header' => '{{PLURAL:$2|Pengguna|Pengguna}} yang memantau "[[:$1]]"',
	'watchers_noone_watches' => 'Tidak ada yang memantau halaman ini.',
	'watchers_x_or_more' => '$1 orang {{PLURAL:$1|pengguna|pengguna}} atau lebih memantau halaman ini.',
	'watchers_less_than_x' => 'Kurang dari $1 orang {{PLURAL:$1|pengguna|pengguna}} memantau halaman ini.',
);

/** Italian (Italiano)
 * @author Darth Kule
 * @author McDutchie
 * @author Pietrodn
 */
$messages['it'] = array(
	'watchers' => 'Osservatori',
	'watchers-desc' => 'Mostra [[Special:Watchers|quanti utenti hanno una pagina negli osservati speciali]]',
	'watchers_link_title' => 'Chi osserva questa pagina?',
	'watchers_error_article' => '<b>Errore:</b> la pagina richiesta non esiste.',
	'watchers_header' => '{{PLURAL:$2|Utente che osserva|Utenti che osservano}} la pagina "[[:$1]]"',
	'watchers_noone_watches' => 'La pagina non è osservata da alcun utente.',
	'watchers_x_or_more' => 'La pagina [[:$2]] è osservata da almeno $1 {{PLURAL:$1|utente|utenti}}.',
	'watchers_less_than_x' => 'La pagina è osservata da meno di $1 {{PLURAL:$1|utente|utenti}}.',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fryed-peach
 */
$messages['ja'] = array(
	'watchers' => 'ウォッチしている利用者',
	'watchers-desc' => '[[Special:Watchers|どの利用者がページをウォッチリストに入れている]]のか表示する',
	'watchers_link_title' => '誰がこのページをウォッチしているのか',
	'watchers_error_article' => "'''エラー:''' ページが存在しません。",
	'watchers_header' => '「[[:$1]]」をウォッチしている{{PLURAL:$2|利用者}}',
	'watchers_noone_watches' => '誰もこのページをウォッチしていません。',
	'watchers_x_or_more' => '$1人以上の{{PLURAL:$1|利用者}}がこのページをウォッチリストに入れています。',
	'watchers_less_than_x' => '$1人未満の{{PLURAL:$1|利用者}}がこのページをウォッチリストに入れています。',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 * @author Pras
 */
$messages['jv'] = array(
	'watchers' => 'Pangawas',
	'watchers-desc' => 'Tuduhaké [[Special:Watchers|panganggo sing ngawasi kaca]]',
	'watchers_link_title' => 'Sapa sing ngawasi kaca iki?',
	'watchers_error_article' => '<b>Kaluputan:</b> Kaca iki ora ana.',
	'watchers_header' => '{{PLURAL:$2|Panganggo sing|Panganggo sing}} ngawasi "[[:$1]]"',
	'watchers_noone_watches' => 'Ora ana sing ngawasi kaca iki.',
	'watchers_x_or_more' => '$1 utawa luwih {{PLURAL:$1|panganggo|panganggo}} ngawasi kaca iki.',
	'watchers_less_than_x' => 'Kurang saka $1 {{PLURAL:$1|panganggo|panganggo}} ngawasi kaca iki.',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author Lovekhmer
 * @author Thearith
 * @author គីមស៊្រុន
 * @author វ័ណថារិទ្ធ
 */
$messages['km'] = array(
	'watchers' => 'អ្នកតាមដាន',
	'watchers-desc' => 'បង្ហាញ​ [[Special:Watchers|អ្នក​ប្រើ​ប្រាស់​ទាំង​ឡាយ​ណា​ដែល​មាន​ទំព័រ​នៅ​ក្នុងបញ្ជី​តាម​ដាន​របស់​ពួក​គេ​]]',
	'watchers_link_title' => 'អ្នកណាកំពុងតាមដាន​ទំព័រនេះ?',
	'watchers_error_article' => '<b>កំហុស៖</b> ទំព័រមិនមាន ។',
	'watchers_header' => 'មាន​{{PLURAL:$2|អ្នកប្រើប្រាស់|អ្នកប្រើប្រាស់}} កំពុងតាមដាន "[[:$1]]"',
	'watchers_noone_watches' => 'គ្មាននរណាម្នាក់​កំពុងតាមដាន​ទំព័រនេះទេ។',
	'watchers_x_or_more' => 'មាន{{PLURAL:$1|អ្នកប្រើប្រាស់|អ្នកប្រើប្រាស់}} $1 ឬ​ច្រើនជាងនេះ​​កំពុងតាមដាន​ទំព័រនេះ​​។',
	'watchers_less_than_x' => '{{PLURAL:$1|អ្នកប្រើប្រាស់|អ្នកប្រើប្រាស់}} ​តិចជាង $1 ​កំពុងតាមដានទំព័រនេះ​។',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'watchers' => 'Oppasser',
	'watchers-desc' => 'Zeich de [[Special:Watchers|Metmaacher, di_j_en Sigg op ier Oppaßleß shtonn han]].',
	'watchers_link_title' => 'Wä paß op di Sigg op?',
	'watchers_error_article' => '<b>Fähler:</b> Di Sigg ham_mer nit.',
	'watchers_header' => '{{PLURAL:$2|Dä Metmaacher, dä op di Sigg „[[:$1]]“ oppaß|Metmaacher, die op di Sigg „[[:$1]]“ oppasse donn|Keine Metmaacher paß op di Sigg „[[:$1]]“ op}}.',
	'watchers_noone_watches' => 'Keiner pass op di Sigg op.',
	'watchers_x_or_more' => 'Mieh wi {{PLURAL:$1|eine Metmaacher paß|$1 Metmaacher passe|keine Metmaacher paß}} op hee di Sigg op.',
	'watchers_less_than_x' => 'Winnijer wi {{PLURAL:$1|eine Metmaacher paß|$1 Metmaacher passe|keine Metmaacher paß}} op hee di Sigg op.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'watchers' => 'Benotzer déi iwwerwaachen',
	'watchers-desc' => 'Weist [[Special:Watchers|watfir eng Benotzer eng Säit iwwerwaachen]]',
	'watchers_link_title' => 'Wien iwwerwaacht dës Säit?',
	'watchers_error_article' => '<b>Feeler:</b> Dës Säit gëtt et net.',
	'watchers-error-invalid-page' => "'''Feeler:''' ''$1'' ass kee valabele Säitentitel ,",
	'watchers_header' => '{{PLURAL:$2|Benotzer den|Benotzer déi}} "[[:$1]]" iwwerwaachen',
	'watchers_noone_watches' => 'Keen iwwerwaacht dës Säit.',
	'watchers_x_or_more' => '$1 oder méi {{PLURAL:$1|Benotzer|Benotzer}} iwwerwaachen dës Säit.',
	'watchers_less_than_x' => 'Manner wéi $1 {{PLURAL:$1|Benotzer iwwerwaacht|Benotzer iwwerwaachen}} dës Säit.',
	'watchers-num' => "$1 Benotzer  {{PLURAL:$1|huet|hunn}} d'Säit [[:$2]] op hirer Iwwerwaachungslëscht.",
	'right-watchers-list' => '[[Special:Watchers|Lëscht vun de Benotzer déi eng spezifesch Säit iwwerwaachen]]',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 * @author Brest
 */
$messages['mk'] = array(
	'watchers' => 'Набљудувачи',
	'watchers-desc' => 'Прикажува [[Special:Watchers|кои корисници имаат страници во својата листа на набљудувања]]',
	'watchers_link_title' => 'Кој ја набљудува оваа страница?',
	'watchers_error_article' => "'''Грешка:''' Страницата не постои.",
	'watchers-error-invalid-page' => "'''Грешка:''' „$1“ е неправилен наслов на страница.",
	'watchers_header' => '{{PLURAL:$2|Корисник кој ја набљудува|Корисници кои ја набљудуваат}} "[[:$1]]"',
	'watchers_noone_watches' => 'Никој не ја набљудува оваа страница.',
	'watchers_x_or_more' => '{{PLURAL:$1|$1 корисник ја има|$1 корисници ја имаат}} оваа страница во својата листа на набљудувања.',
	'watchers_less_than_x' => '{{PLURAL:$1|Еден корисник|Помалку од $1 корисници}} ја имаат оваа страница во својата листа на набљудувања.',
	'watchers-num' => '$1 {{PLURAL:$1|корисник ја има|корисници ја имаат}} страницата [[:$2]] на {{PLURAL:$1|неговата|нивната}} листа на набљудувања.',
	'right-watchers-list' => '[[Special:Watchers|Листа на корисници кои следат извесна страница]]',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'watchers' => 'നിരീക്ഷകര്‍',
	'watchers_link_title' => 'ഈ താള്‍ ആരൊക്കെ നിരീക്ഷിക്കുന്നു?',
	'watchers_error_article' => '<b>പിഴവ്:</b> താള്‍ നിലവിലില്ല',
	'watchers_header' => '"[[:$1]]" ശ്രദ്ധിക്കുന്ന ഉപയോക്താക്കള്‍',
	'watchers_noone_watches' => 'ഈ താള്‍ ആരും നിരീക്ഷിക്കുന്നില്ല.',
	'watchers_x_or_more' => '$1 ഓ അതിലധികമോ ഉപയോക്താക്കള്‍ ഈ താള്‍ ശ്രദ്ധിക്കുന്നുണ്ട്.',
	'watchers_less_than_x' => 'ഈ താള്‍ $1ല്‍ കുറവ് ഉപയോക്താക്കള്‍ മാത്രമേ ശ്രദ്ധിക്കുന്നുള്ളൂ.',
);

/** Marathi (मराठी)
 * @author Kaustubh
 * @author Mahitgar
 */
$messages['mr'] = array(
	'watchers' => 'दर्शक',
	'watchers_link_title' => 'या पानाला कोणी पहारा दिलेला आहे?',
	'watchers_error_article' => '<b>त्रुटी:</b> पान अस्तित्वात नाही',
	'watchers_header' => '"[[:$1]]" ला पहारा देणारे सदस्य',
	'watchers_noone_watches' => 'या पानावर कुणीही पहारा दिलेला नाही.',
	'watchers_x_or_more' => '$1 किंवा जास्त सदस्यांनी पहारा दिलेला आहे.',
	'watchers_less_than_x' => '$1 पेक्षा कमी सदस्यांनी पहारा दिलेला आहे.',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'watchers' => 'Tlachiyalōnih',
);

/** Dutch (Nederlands)
 * @author McDutchie
 * @author Siebrand
 */
$messages['nl'] = array(
	'watchers' => 'Volgers',
	'watchers-desc' => 'Geeft aan [[Special:Watchers|welke gebruikers een pagina op hun volglijst hebben]]',
	'watchers_link_title' => 'Wie volgen deze pagina?',
	'watchers_error_article' => '<b>Fout:</b> pagina bestaat niet.',
	'watchers-error-invalid-page' => "'''Fout:''' \"\$1\" is een ongeldige paginanaam.",
	'watchers_header' => '{{PLURAL:$2|Gebruiker die "[[:$1]]" volgt|Gebruikers die "[[:$1]]" volgen}}',
	'watchers_noone_watches' => 'Niemand volgt deze pagina.',
	'watchers_x_or_more' => '$1 of meer {{PLURAL:$1|gebruikers|gebruikers}} hebben de pagina [[:$2]] op hun volglijst.',
	'watchers_less_than_x' => '{{PLURAL:$1|Er zijn geen gebruikers met deze pagina op hun volglijst|Minder dan $1 gebruikers hebben deze pagina op hun volglijst}}.',
	'watchers-num' => 'De pagina [[:$2]] staat op de volglijst van $1 {{PLURAL:$1|gebruiker|gebruikers}}.',
	'right-watchers-list' => '[[Special:Watchers|Gebruikers die een pagina volgen weergeven]]',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Frokor
 * @author Gunnernett
 */
$messages['nn'] = array(
	'watchers' => 'Overvakarar',
	'watchers-desc' => 'Viser [[Special:Watchers|kva brukarar som overvaker ei viss side]]',
	'watchers_link_title' => 'Kven overvaker denne sida?',
	'watchers_error_article' => '<b>Feil:</b> Sida finst ikkje.',
	'watchers_header' => '{{PLURAL:$2|Brukar|Brukarar}} som overvakar «[[:$1]]»',
	'watchers_noone_watches' => 'Ingen overvaker denne sida.',
	'watchers_x_or_more' => '$1 eller fleire {{PLURAL:$1|brukarar|brukarar}} overvakar denne sida.',
	'watchers_less_than_x' => 'Mindre enn $1 {{PLURAL:$1|brukarar|brukar}} overvaker denne sida.',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Boivie
 * @author Jon Harald Søby
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'watchers' => 'Overvåkende',
	'watchers-desc' => 'Viser [[Special:Watchers|hvilke brukere som overvåker en viss side]]',
	'watchers_link_title' => 'Hvem overvåker denne siden?',
	'watchers_error_article' => '<b>Feil:</b> Siden finnes ikke.',
	'watchers-error-invalid-page' => "'''Feil:''' «$1» er en ugyldig sidetittel.",
	'watchers_header' => '{{PLURAL:$2|Person|Personer}} som overvåker «[[:$1]]»',
	'watchers_noone_watches' => 'Ingen overvåker denne siden.',
	'watchers_x_or_more' => '$1 eller flere {{PLURAL:$1|personer|personer}} overvåker denne siden.',
	'watchers_less_than_x' => 'Mindre enn $1 {{PLURAL:$1|personer|personer}} overvåker denne siden.',
	'watchers-num' => '$1 {{PLURAL:$1|bruker|brukere}} har siden [[:$2]] på sin overvåkningsliste.',
	'right-watchers-list' => '[[Special:Watchers|Liste over brukere som overvåker en bestemt side]]',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'watchers' => 'Agachaires',
	'watchers-desc' => "Afichar [[Special:Watchers|los utilizaires qu'an una pagina dins lor lista de seguiment]]",
	'watchers_link_title' => 'Qui seguís aquesta pagina ?',
	'watchers_error_article' => '<b>Error :</b> La pagina existís pas.',
	'watchers_header' => '{{PLURAL:$2|Utilizaire que seguís|Utilizaires que seguisson}} « [[:$1]] »',
	'watchers_noone_watches' => 'Degun seguís pas aquesta pagina.',
	'watchers_x_or_more' => '$1 utilizaires o quitament {{PLURAL:$1|un autre|maites autres}} an aquesta pagina dins lor lista de seguiment.',
	'watchers_less_than_x' => 'Mens {{PLURAL:$1|d’un utilizaire seguís|de $1 utilizaires seguisson}} aquesta pagina.',
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$messages['os'] = array(
	'watchers' => 'Цæстдарджытæ',
	'watchers_link_title' => 'Чи йæ цæст дары ацы фарсмæ?',
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'watchers' => 'Watschers',
);

/** Polish (Polski)
 * @author Derbeth
 * @author Maikking
 * @author Masti
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'watchers' => 'Obserwujący',
	'watchers-desc' => 'Pokazuje [[Special:Watchers|użytkowników, którzy mają stroną w obserwowanych]]',
	'watchers_link_title' => 'Kto obserwuje tę stronę?',
	'watchers_error_article' => '<b>Błąd:</b> Strona nie istnieje',
	'watchers_header' => '{{PLURAL:$2|Obserwujący|Obserwujący}} „[[:$1]]”',
	'watchers_noone_watches' => 'Nikt nie obserwuje tej strony',
	'watchers_x_or_more' => 'Przynajmniej $1 {{PLURAL:$1|użytkownik|użytkowników}} obserwuje tę stronę.',
	'watchers_less_than_x' => 'Mniej niż $1 {{PLURAL:$1|użytkownik|użytkowników}} obserwuje tę stronę.',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'watchers' => 'Osservador',
	'watchers-desc' => "A mosta  [[Special:Watchers|vàire utent a l'han na pàgina ch'as ten-o sot euj]]",
	'watchers_link_title' => "Chi a ten d'euj sta pàgina-sì?",
	'watchers_error_article' => "'''Eror:''' La pàgina a esist pa.",
	'watchers-error-invalid-page' => "'''Eror:''' \"\$1\" a l'é un ëd tìtol pàgina nen bon.",
	'watchers_header' => "{{PLURAL:$2|Utent ch'a ten|Utent ch'a ten-o}} d'euj ''[[:$1]]''.",
	'watchers_noone_watches' => "Pa gnun ch'a ten-a d'euj sta pàgina-sì.",
	'watchers_x_or_more' => "$1 o pì {{PLURAL:$1|utent|utent}} a ten-o d'euj sta pàgina-sì.",
	'watchers_less_than_x' => "Men che $1 {{PLURAL:$1|utent|uten}} a ten-o d'euj sta pàgina-sì.",
	'watchers-num' => "$1 {{PLURAL:$1|utent a l'ha|utent a l'han}} la pàgina [[:$2]] dzora {{PLURAL:$1|soa|soa}} lista ëd lòn ch'as ten sot euj.",
	'right-watchers-list' => "[[Special:Watchers|Lista j'utent ch'a ten-o d'euj na pàgina specìfica]]",
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'watchers' => 'کتونکي',
	'watchers_link_title' => 'څوک همدا مخ ګوري؟',
	'watchers_error_article' => '<b>ستونزه:</b> دا مخ نه شته.',
	'watchers_header' => '{{PLURAL:$2|هغه کارن|هغه کارنان}} چې "[[:$1]]" ګوري',
	'watchers_noone_watches' => 'همدا مخ اوس هېڅوک نه ګوري.',
	'watchers_x_or_more' => '$1 او يا هم تر دې ډېر {{PLURAL:$1|کارن|کارنان}} همدا مخ په خپل کتنلړليک کې لري.',
	'watchers_less_than_x' => 'له $1 لږ {{PLURAL:$1|کارونکي|کارونکي}} همدا مخ په خپل کتنلړليک کې لري.',
);

/** Portuguese (Português)
 * @author Malafaya
 * @author Waldir
 */
$messages['pt'] = array(
	'watchers' => 'Vigiadores',
	'watchers-desc' => 'Mostra [[Special:Watchers|quais utilizadores têm uma dada página na sua lista de vigiados]]',
	'watchers_link_title' => 'Quem está vigiando esta página?',
	'watchers_error_article' => '<b>Erro:</b> Página inexistente.',
	'watchers_header' => '{{PLURAL:$2|Utilizador que está|Utilizadores que estão}} vigiando "[[:$1]]"',
	'watchers_noone_watches' => 'Ninguém está vigiando esta página.',
	'watchers_x_or_more' => '$1 ou mais {{PLURAL:$1|pessoa está|pessoas estão}} vigiando esta página.',
	'watchers_less_than_x' => 'Menos de $1 {{PLURAL:$1|pessoa está|pessoas estão}} vigiando esta página.',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 */
$messages['pt-br'] = array(
	'watchers' => 'Vigiadores',
	'watchers-desc' => 'Mostra [[Special:Watchers|quais utilizadores têm uma dada página na sua lista de vigiados]]',
	'watchers_link_title' => 'Quem está vigiando esta página?',
	'watchers_error_article' => '<b>Erro:</b> Página inexistente.',
	'watchers_header' => '{{PLURAL:$2|Utilizador que está|Utilizadores que estão}} vigiando "[[:$1]]"',
	'watchers_noone_watches' => 'Ninguém está vigiando esta página.',
	'watchers_x_or_more' => '$1 ou mais {{PLURAL:$1|pessoa está|pessoas estão}} vigiando esta página.',
	'watchers_less_than_x' => 'Menos de $1 {{PLURAL:$1|pessoa está|pessoas estão}} vigiando esta página.',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'watchers_link_title' => 'Cine urmăreşte această pagină?',
	'watchers_error_article' => "'''Eroare:''' Pagina nu există.",
	'watchers_header' => '{{PLURAL:$2|Utilizator care urmăreşte|Utilizatori care urmăresc}} "[[:$1]]"',
	'watchers_noone_watches' => 'Nimeni nu urmăreşte această pagină.',
	'watchers_x_or_more' => '$1 sau mai mulţi {{PLURAL:$1|utilizatori|utilizatori}} au această pagină în lista de urmărire.',
	'watchers_less_than_x' => 'Mai puţin de $1 {{PLURAL:$1|utilizatori|utilizatori}} au această pagină pe lista de urmărire.',
);

/** Russian (Русский)
 * @author Kaganer
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'watchers' => 'Наблюдающие',
	'watchers-desc' => 'Показывает [[Special:Watchers|участников, которые включили страницу в свой список наблюдения]]',
	'watchers_link_title' => 'Кто следит за этой страницей?',
	'watchers_error_article' => '<b>ошибка:</b> статьи не существует.',
	'watchers-error-invalid-page' => "'''Ошибка.''' «$1» является недействительным названием страницы.",
	'watchers_header' => '{{PLURAL:$2|Участник|Участники}}, наблюдающие за страницей "[[:$1]]"',
	'watchers_noone_watches' => 'Никто не следит за этой страницей.',
	'watchers_x_or_more' => 'За этой страницей {{PLURAL:$1|наблюдает|наблюдают}} $1 или более участников.',
	'watchers_less_than_x' => 'За этой страницей {{PLURAL:$1|наблюдает|наблюдают}} менее $1 {{PLURAL:$1|участника|участников|участников}}.',
	'watchers-num' => '$1 {{PLURAL:$1|участник добавил|участника добавили|участников добавили}} страницу [[:$2]] в {{PLURAL:$1|свой список наблюдения|свои списки наблюдения|свои списки наблюдения}}.',
	'right-watchers-list' => '[[Special:Watchers|просмотр списка участников, следящих за конкретной страницей]]',
);

/** Sinhala (සිංහල)
 * @author Calcey
 */
$messages['si'] = array(
	'watchers' => 'මුරකරුවන්',
	'watchers-desc' => '[[Special:Watchers|ඔවුන්ගේ මුර ලඅයිස්තුවේ පිටුවක් ඇති පරිශීලකයින්]] පෙන්වයි',
	'watchers_link_title' => 'මෙම පිටුව මුර කරන්නේ කවුද?',
	'watchers_error_article' => '"දෝෂය:" පිටුව නොපවතී.',
	'watchers_header' => '"[[:$1]]" මුර කරන {{PLURAL:$2|පරිශිලකයා|පරිශීලකයින්}}',
	'watchers_noone_watches' => 'මෙම පිටුව කිසිවෙකු විසින් මුර කරනු ලබන්නේ නැත.',
	'watchers_x_or_more' => '$1 හෝ {{PLURAL:$1|පරිශීලකයින|පරිශීලකයින්}}ගේ මුර ලැයිස්තුවේ මෙම පිටුව ඇත.',
	'watchers_less_than_x' => '{{PLURAL:$1|පරිශීලකයින්|පරිශීලකයින්}} $1ට වඩා අඩුවෙන් මෙම පිටුව තමන්ගේ මුර ලැයිස්තුවේ ඇත.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'watchers' => 'Sledujúci',
	'watchers-desc' => 'Zobrazuje [[Special:Watchers|používateľov, ktorí majú stránku v zozname sledovaných]]',
	'watchers_link_title' => 'Kto sleduje túto stránku?',
	'watchers_error_article' => '<b>Chyba:</b> Článok neexistuje.',
	'watchers_header' => '{{PLURAL:$2|Používateľ|Používatelia}} sledujúci stránku „[[:$1]]”',
	'watchers_noone_watches' => 'Nikto nesleduje túto stránku.',
	'watchers_x_or_more' => '$1 alebo viac používateľov sleduje túto stránku.{{PLURAL:$1||}}',
	'watchers_less_than_x' => 'Menej ako $1 {{PLURAL:$1|používateľ sleduje|používatelia sledujú|používateľov sleduje}} túto stránku.',
);

/** Serbian Cyrillic ekavian (Српски (ћирилица))
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'watchers_link_title' => 'Ко гледа овај чланак?',
	'watchers_error_article' => "'''Грешка:''' Чланак не постоји.",
);

/** Serbian Latin ekavian (Srpski (latinica))
 * @author Michaello
 */
$messages['sr-el'] = array(
	'watchers_link_title' => 'Ko gleda ovaj članak?',
	'watchers_error_article' => "'''Greška:''' Članak ne postoji.",
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'watchers' => 'Beooboachtere',
	'watchers-desc' => 'Wiest, [[Special:Watchers|wofuul Benutsere]] ne Siede ap hiere Beooboachtengslieste hääbe',
	'watchers_link_title' => 'Wäl beooboachtet disse Siede?',
	'watchers_error_article' => "'''Failer:''' Siede existiert nit.",
	'watchers_header' => '{{PLURAL:$2|Benutser, die „[[:$1]]“ beooboachtet|Benutsere, do „[[:$1]]“ beooboachtje}}',
	'watchers_noone_watches' => 'Dät rakt neen Benutsere, do disse Siede beooboachtje.',
	'watchers_x_or_more' => '$1 of moor {{PLURAL:$1|Benutsere|Benutsere}} beooboachtje disse Siede.',
	'watchers_less_than_x' => 'Minner as {{PLURAL:$1|$1 Benutsere|$1 Benutsere}} beooboachtje disse Siede.',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author Lejonel
 * @author Najami
 */
$messages['sv'] = array(
	'watchers' => 'Bevakare',
	'watchers-desc' => 'Visar [[Special:Watchers|vilka användare som bevakar en viss sida]]',
	'watchers_link_title' => 'Användare som bevakar sidan',
	'watchers_error_article' => '<b>Fel:</b> Sidan finns inte.',
	'watchers_header' => '{{PLURAL:$2|Användare}} som bevakar "[[:$1]]"',
	'watchers_noone_watches' => 'Ingen bevakar denna sida.',
	'watchers_x_or_more' => '$1 eller fler {{PLURAL:$1|användare|användare}} har denna sida på sin bevakningslista.',
	'watchers_less_than_x' => 'Färre än $1 {{PLURAL:$1|användare|användare}} bevakar den här sidan.',
);

/** Silesian (Ślůnski)
 * @author Lajsikonik
 */
$messages['szl'] = array(
	'watchers' => 'Filujůncy',
	'watchers-desc' => 'Pokozuje, [[Special:Watchers|kere użytkowńiki majům zajta na pozorliśće]]',
	'watchers_link_title' => 'Fto mo ta zajta na pozorliśće?',
	'watchers_error_article' => '<b>Feler:</b> Zajta ńy istńeje',
	'watchers_header' => '{{PLURAL:$2|Filujůncy|Filujůncy}} „[[:$1]]”',
	'watchers_noone_watches' => 'Ńikt ńy mo tyj zajty na pozorliśće',
	'watchers_x_or_more' => 'Ńy myńi jak {{PLURAL:$1|użytkowńik|użytkowńikůw}} mo ta zajta na pozorliśće.',
	'watchers_less_than_x' => 'Myńi jak {{PLURAL:$1|użytkowńik|użytkowńikůw}} mo ta zajta na pozorliśće.',
);

/** Telugu (తెలుగు)
 * @author Kiranmayee
 * @author Veeven
 */
$messages['te'] = array(
	'watchers' => 'వీక్షకులు',
	'watchers-desc' => '[[Special:Watchers|ఏయే వాడుకరులు ఒక పేజీని వారి వీక్షణజాబితాలో ఉంచుకున్నారో]] చూపిస్తుంది',
	'watchers_link_title' => 'ఈ పేజీని ఎవరెవరు గమనిస్తున్నారు?',
	'watchers_error_article' => '<b>పొరపాటు:</b> పేజీ ఉనికిలో లేదు.',
	'watchers_header' => '{{PLURAL:$2|వాడుకరి|మంది వాడుకరులు }}  "[[:$1]]" పేజీని చూస్తున్నారు',
	'watchers_noone_watches' => 'ఈ పేజీని ఎవరూ గమనించట్లేదు.',
	'watchers-num' => '$1 {{PLURAL:$1|వాడుకరి|గురు వాడుకరులు}} [[:$2]] పేజీని {{PLURAL:$1|వారి|వారి}} వీక్షణజాబితాలో ఉంచుకున్నారు.',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'watchers' => 'Mga nagbabantay (nagmamatyag)',
	'watchers-desc' => 'Nagpapakita [[Special:Watchers|kung sinu-sinong mga tagagamit ang mayroon ng isang pahina sa kanilang talaan ng mga binabantayan]]',
	'watchers_link_title' => 'Sino ang nagbabantay sa pahinang ito?',
	'watchers_error_article' => "'''Kamalian:''' Hindi umiiral ang pahina.",
	'watchers_header' => '{{PLURAL:$2|Tagagamit na|Mga tagagamit na}} nagbabantay ng "[[:$1]]"',
	'watchers_noone_watches' => 'Walang nagbabantay ng (nagmamatyag sa) pahinang ito.',
	'watchers_x_or_more' => '$1 o mahigit pa sa {{PLURAL:$1|mga tagagamit|mga tagagamit}} ang mayroon ng pahinang ito sa kanilang talaan ng mga binabantayan.',
	'watchers_less_than_x' => 'Mas kakaunti kaysa $1 {{PLURAL:$1|mga tagagamit|mga tagagamit}} ang mayroon ng pahinang ito sa kanilang talaan ng mga binabantayan.',
);

/** Turkish (Türkçe)
 * @author Vito Genovese
 */
$messages['tr'] = array(
	'watchers' => 'İzleyenler',
	'watchers-desc' => '[[Special:Watchers|Hangi kullanıcıların bu sayfayı izleme listesine aldığını]] gösterir',
	'watchers_link_title' => 'Bu sayfayı kim izliyor?',
	'watchers_error_article' => "'''Hata:''' Sayfa mevcut değil.",
	'watchers_header' => '"[[:$1]]" adlı sayfayı izleyen {{PLURAL:$2|kullanıcı|kullanıcılar}}',
	'watchers_noone_watches' => 'Sayfayı kimse izlemiyor.',
	'watchers_x_or_more' => '$1 veya daha fazla {{PLURAL:$1|kullanıcı|kullanıcı}} bu sayfayı izleme listesine almış durumda.',
	'watchers_less_than_x' => '$1 sayısının altında {{PLURAL:$1|kullanıcı|kullanıcı}} bu sayfayı izleme listesine almış durumda.',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'watchers' => 'Osservadori',
	'watchers-desc' => 'Mostra [[Special:Watchers|quanti utenti i gà na pàxena in tei osservati speciali]]',
	'watchers_link_title' => "Chi tien d'ocio sta pagina?",
	'watchers_error_article' => '<b>Erór:</b> sta pagina no la esiste.',
	'watchers_header' => '{{PLURAL:$2|Utente|Utenti}} che tien d\'ocio "[[:$1]]"',
	'watchers_noone_watches' => "Nissuni tien d'ocio sta pagina.",
	'watchers_x_or_more' => "Almanco $1 {{PLURAL:$1|utente el|utenti i}} sta tegnendo d'ocio sta pagina.",
	'watchers_less_than_x' => "Manco de $1 {{PLURAL:$1|utente el|utenti i}} tien d'ocio sta pagina.",
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'watchers' => 'Kaclijad',
	'watchers_link_title' => "Ken kacleb necidä lehtpol't?",
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'watchers' => 'Người theo dõi',
	'watchers-desc' => 'Liệt kê [[Special:Watchers|những người theo dõi trang]]',
	'watchers_link_title' => 'Ai theo dõi trang này?',
	'watchers_error_article' => "'''Lỗi:''' Trang không tồn tại.",
	'watchers_header' => '{{PLURAL:$2|Người|Những người}} đang theo dõi “[[:$1]]”',
	'watchers_noone_watches' => 'Không ai theo dõi trang này.',
	'watchers_x_or_more' => '$1 {{PLURAL:$1|người|người}} trở lên có trang này trong danh sách theo dõi của họ.',
	'watchers_less_than_x' => 'Ít hơn $1 {{PLURAL:$1|người|người}} có trang này trong danh sách theo dõi của họ.',
);

/** Volapük (Volapük)
 * @author Smeira
 */
$messages['vo'] = array(
	'watchers' => 'Galädans',
	'watchers-desc' => 'Jonon [[Special:Watchers|gebanis kinik labons padi in galädalised oksik]]',
	'watchers_link_title' => 'Kin galädon-li padi at?',
	'watchers_error_article' => "'''Pöl:''' Pad no dabinon.",
	'watchers_header' => '{{PLURAL:$2|Geban, kel galädon|Gebans, kels galädons}} „[[:$1]]“',
	'watchers_noone_watches' => 'Nek galädon padi at.',
	'watchers_x_or_more' => 'Gebans pu {{PLURAL:$1|bals|$1}} labons padi at in galädaliseds oksik.',
	'watchers_less_than_x' => 'Gebans läs {{PLURAL:$1|bals|$1}} labons padi at in galädaliseds oksik.',
);

/** Chinese (China) (‪中文(中国大陆)‬)
 * @author Gzdavidwong
 */
$messages['zh-cn'] = array(
	'watchers' => '监视列表',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gaoxuewei
 */
$messages['zh-hans'] = array(
	'watchers' => '监视列表',
	'watchers_link_title' => '谁在监视本页？',
	'watchers_error_article' => "'''错误:''' 页面不存在。",
	'watchers_header' => '监视"[[:$1]]"的{{PLURAL:$2|用户|用户}}',
	'watchers_noone_watches' => '没有用户监视本页。',
	'watchers_x_or_more' => '$1 或者更多的{{PLURAL:$1|用户|用户}}将本页加入了他们的监视列表。',
	'watchers_less_than_x' => '少于$1的{{PLURAL:$1|用户|用户}}将本页加入了他们的监视列表。',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Gzdavidwong
 * @author Liangent
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'watchers' => '監視者',
	'watchers_link_title' => '誰在監視此頁？',
	'watchers_error_article' => "'''錯誤：'''頁面不存在。",
	'watchers_header' => '監視"[[:$1]]"的{{PLURAL:$2|用戶|用戶}}',
	'watchers_noone_watches' => '沒有人監視此頁面。',
	'watchers_x_or_more' => '$1 或者更多的{{PLURAL:$1|用戶|用戶}}將本頁加入了他們的監視列表。',
	'watchers_less_than_x' => '少於$1的{{PLURAL:$1|用戶|用戶}}將本頁加入了他們的監視列表。',
);

