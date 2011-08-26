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
	# General messages
	'wminc-desc' => 'Test wiki system for Wikimedia Incubator',
	'wminc-manual' => 'Manual',
	'wminc-listwikis' => 'List of wikis',
	'wminc-testwiki' => 'Test wiki:',
	'wminc-testwiki-none' => 'None/All',
	'wminc-recentchanges-all' => 'All recent changes',

	# Preferences
	'wminc-prefinfo-language' => 'Your interface language - independent from your test wiki',
	'wminc-prefinfo-code' => 'The ISO 639 language code',
	'wminc-prefinfo-project' => 'Select the Wikimedia project (Incubator option is for users who do general work)',
	'wminc-prefinfo-error' => 'You selected a project that needs a language code.',

	# Editing/creating pages errors
	'wminc-error-move-unprefixed' => "Error: The page you are trying to move to [[{{MediaWiki:Helppage}}|is unprefixed or has a wrong prefix]]!",
	'wminc-error-wronglangcode' => "'''Error:''' This page contains a [[{{MediaWiki:Helppage}}|wrong language code]] \"$1\"!",
	'wminc-error-unprefixed' => "'''Error:''' This page is [[{{MediaWiki:Helppage}}|unprefixed]]!",
	'wminc-error-unprefixed-suggest' => "'''Error:''' This page is [[{{MediaWiki:Helppage}}|unprefixed]]! You can create a page at [[:$1]].",
	'wminc-error-wiki-exists' => 'This wiki already exists. You can find this page on $1. If the wiki was recently created, please wait a few hours or days until all content is imported.',
	'wminc-error-wiki-sister' => 'This page belongs to a project that is not hosted here. Please go to $1 to find the wiki.',

	# Special:RandomByTest
	'randombytest' => 'Random page by test wiki',
	'randombytest-nopages' => 'There are no pages in your test wiki, in the namespace: $1.',

	# Special:ViewUserLang
	'wminc-viewuserlang' => 'Look up user language and test wiki',
	'wminc-viewuserlang-user' => 'Username:',
	'wminc-viewuserlang-go' => 'Go',
	'wminc-userdoesnotexist' => 'The user "$1" does not exist.',
	'wminc-ip' => '"$1" is an IP address.',

	# User groups
	'right-viewuserlang' => 'View [[Special:ViewUserLang|user language and test wiki]]',
	'group-test-sysop' => 'Test wiki administrators',
	'group-test-sysop-member' => 'test wiki administrator',
	'grouppage-test-sysop' => 'Project:Test wiki administrators',

	# Language codes
	'wminc-code-macrolanguage' => 'The [[wikipedia:$2 language|"$3" language]] is a [[wikipedia:ISO 639 macrolanguage|macrolanguage]], consisting of the following member languages:',
	'wminc-code-collective' => 'The code "$1" does not refer to a specific language, but to a collection of languages, namely the [[wikipedia:$2 language|"$3" languages]].',
	'wminc-code-retired' => 'This language code has been changed and no longer refers to the original language.',

	# Special:ListUsers
	'wminc-listusers-testwiki' => 'You are viewing users who have set their test wiki preference to [[$1]].',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Fryed-peach
 * @author Purodha
 * @author SPQRobin
 */
$messages['qqq'] = array(
	'wminc-desc' => '{{desc}}',
	'wminc-manual' => 'As in "handbook".',
	'wminc-listwikis' => 'List of wikis that are in Wikimedia Incubator.',
	'wminc-testwiki' => 'See [[:File:Incubator-testwiki-preference.jpg]].',
	'wminc-testwiki-none' => "* Used on Special:Preferences when the user didn't select a test wiki preference (yet).
* Used on Special:RecentChanges to show normal recent changes display.",
	'wminc-prefinfo-language' => 'See [[:File:Incubator-testwiki-preference.jpg]]. Extra clarification for the (normal) language selection.',
	'wminc-prefinfo-code' => 'See [[:File:Incubator-testwiki-preference.jpg]].',
	'wminc-prefinfo-project' => 'See [[:File:Incubator-testwiki-preference.jpg]].',
	'wminc-prefinfo-error' => 'See [[:File:Incubator-testwiki-preference.jpg]]. If the user selected a Wikimedia project but not a language code, this error message is shown.',
	'wminc-error-move-unprefixed' => 'Do not change <code><nowiki>{{MediaWiki:Helppage}}</nowiki></code>',
	'wminc-error-wronglangcode' => '* $1 is a language code.
* Do not change <code><nowiki>{{MediaWiki:Helppage}}</nowiki></code>',
	'wminc-error-unprefixed-suggest' => '* $1 is a new page title based on the page title the user is currently trying to edit. E.g. "Test" would become "Wx/xx/Test".
* Do not change <code><nowiki>{{MediaWiki:Helppage}}</nowiki></code>',
	'wminc-error-wiki-exists' => "'''$1''' is a URL to the existing wiki.",
	'wminc-error-wiki-sister' => '$1 is a link to either Wikisource or Wikiversity.',
	'wminc-viewuserlang' => 'Title of a special page to look up the language and test wiki of a user. See [[:File:Incubator-testwiki-viewuserlang.jpg]].',
	'wminc-viewuserlang-user' => 'Label for the input.

{{Identical|Username}}',
	'wminc-viewuserlang-go' => "Text on the submit button to view the user's language and test wiki.

{{Identical|Go}}",
	'right-viewuserlang' => '{{doc-right|viewuserlang}}',
	'group-test-sysop' => 'Name of the group of administrators of a specific test wiki on the Wikimedia Incubator.',
	'group-test-sysop-member' => 'An administrator of a specific test wiki on the Wikimedia Incubator.',
	'grouppage-test-sysop' => 'Do not change the "Project:" part!',
	'wminc-code-macrolanguage' => "* '''$1''' is the language code (not used by default)
* '''$2''' is the language name in English
* '''$3''' is the translated language name from CLDR, if available (otherwise, English)
It is best '''not''' to change the link to the Wikipedia article about the language. The article about macrolanguage can be changed to point to a translated article.",
	'wminc-code-collective' => "* '''$1''' is the language code
* '''$2''' is the language name in English
* '''$3''' is the translated language namefrom CLDR, if available (otherwise, English) 
It is best '''not''' to change the link to the Wikipedia article about the language.",
);

/** Adyghe (Cyrillic) ()
 * @author Celekan
 */
$messages['ady-cyrl'] = array(
	'wminc-desc' => 'Щыплъэк1у Вики систэмыр Викимедия Инкубаторым',
	'wminc-viewuserlang' => 'Нэбгырэм ибзэм еплъий плъэк1у Викир',
);

/** Moroccan Spoken Arabic (Maġribi)
 * @author Enzoreg
 */
$messages['ary'] = array(
	'wminc-desc' => 'L-Wiki dyal t-tést le Wikimédya Incubator',
	'wminc-testwiki' => "L-Wiki dyal 't-tést :",
	'wminc-testwiki-none' => 'Ḫṫa ḫaja / Kol ċi',
	'wminc-prefinfo-language' => "Loġṫ wajihṫek - mesṫaqela men 't-tést dyal l-Wiki dyalek",
	'wminc-prefinfo-code' => 'L-kod ISO 639 dyal l-loġa',
	'wminc-prefinfo-project' => 'Ĥṫar l-meċroĝ Wikimédya (l-opsyon Incubator mĥeṣeṣa le mosṫeĥdimin li ka iṣaybo ĥedma ĝama)',
	'wminc-prefinfo-error' => 'Ĥṫariṫi meċroĝ li ka iḫṫaj l-kod dyal l-loġa.',
	'randombytest' => "Ṣefḫa ĝel l-Lah men l-Wiki dyal 't-tést",
	'randombytest-nopages' => "L-Wiki dyal 't-tést ma fih ḫṫa ṣefḫa, fe l-maḫel dyal 's-smiyaṫ : $1.",
	'wminc-viewuserlang' => "Ha hiya loġaṫ l-mosṫeĥdim o l-Wiki dyal 't-tést dyalo",
	'wminc-viewuserlang-user' => 'Smiyṫ l-mosṫeĥdim :',
	'wminc-viewuserlang-go' => 'Sir',
	'right-viewuserlang' => "Ċof [[Special:ViewUserLang|loġṫ l-mosṫeĥdim o l-Wiki dyal 't-tést]]",
);

/** Achinese (Acèh)
 * @author Fadli Idris
 */
$messages['ace'] = array(
	'wminc-desc' => 'Sistem cuba wiki keu Wikimedia Incubator',
	'wminc-viewuserlang' => 'Kaleun bahsa pengguna dan cuba wiki',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'wminc-desc' => 'Toets wiki-stelsel vir die Wikipedia Inkubator',
	'wminc-testwiki' => 'Testwiki:',
	'wminc-testwiki-none' => 'Geen/alles',
	'wminc-prefinfo-language' => 'U koppelvlaktaal - onafhanklik van u toetswiki',
	'wminc-prefinfo-code' => 'Die ISO 639-taalkode',
	'wminc-prefinfo-project' => 'Kies die Wikimedia-projek (Inkubator-opsie is vir gebruikers wat nie algemeen werk doen nie)',
	'wminc-prefinfo-error' => "Jy het 'n projek gekies wat 'n taalkode benodig.",
	'randombytest' => 'Lukrake bladsy uit die toetswiki',
	'randombytest-nopages' => 'Daar is geen bladsye in jou toetswiki in die $1-naamruimte nie.',
	'wminc-viewuserlang' => 'Soek op gebruikerstaal en toetswiki',
	'wminc-viewuserlang-user' => 'Gebruikersnaam:',
	'wminc-viewuserlang-go' => 'OK',
	'right-viewuserlang' => 'Sien [[Special:ViewUserLang|gebruikerstaal en toetswiki]]',
);

/** Gheg Albanian (Gegë)
 * @author Mdupont
 */
$messages['aln'] = array(
	'wminc-desc' => 'Sistemi Test wiki për Wikimedia Inkubatori',
	'wminc-testwiki' => 'wiki Test:',
	'wminc-testwiki-none' => 'Asnjë / Të gjitha',
	'wminc-prefinfo-language' => 'Gjuha juaj interface - të pavarur nga testin tuaj wiki',
	'wminc-prefinfo-code' => 'Kodi i gjuhës ISO 639',
	'wminc-prefinfo-project' => 'Zgjidhni projekti Wikimedia (opsion Inkubatori është për përdoruesit që bëjnë punë të përgjithshme)',
	'wminc-prefinfo-error' => 'Ju zgjedhur një projekt që ka nevojë për një kod gjuhë.',
	'randombytest' => 'faqe të rastësishme nga wiki provë',
	'randombytest-nopages' => 'Nuk ka faqe në wiki në provim, në hapësirën: $1.',
	'wminc-viewuserlang' => 'Kërkoni gjuhën e përdoruesit dhe wiki provë',
	'wminc-viewuserlang-user' => 'Emri i përdoruesit:',
	'wminc-viewuserlang-go' => 'Shkoj',
	'right-viewuserlang' => 'Shikoni [[Special:ViewUserLang|gjuhën përdoruesit dhe provë wiki]]',
);

/** Angika (अङ्गिका)
 * @author Angpradesh
 */
$messages['anp'] = array(
	'wminc-desc' => 'विकीपीडिया इनक्यूबेटर केरॊ टेस्ट विकी सिस्टम',
	'wminc-testwiki' => 'टेस्ट विकी',
	'wminc-testwiki-none' => 'कुच्छु नै / सबेभॆ',
	'wminc-prefinfo-language' => 'तोरॊ इंटरफेस भाषा - टेस्ट विकी सॆं अलग',
	'wminc-prefinfo-code' => 'ISO 639 भाषा कोड',
	'wminc-prefinfo-project' => 'विकीमीडिया प्रोजेक्ट केरॊ चयन करॊ (इनक्यूबेटर विकल्प सामान्य काम करै वाला लेली)',
	'wminc-prefinfo-error' => 'अपनॆ एगॊ प्रोजेक्ट चुनलॆ छियै, जेकरा लेली भाषा कोड के जरूरत छै.',
	'randombytest' => 'बेतरतीब पन्ना - प्रारंभिक विकी द्वारा.',
	'randombytest-nopages' => 'तोरॊ प्रारंभिक विकी मॆं $1 नामॊ के जग्घॊ पॆ कोय पन्ना नै छौं.',
	'wminc-viewuserlang' => 'भाषा उपयोगकर्ता आरू टेस्ट विकी सिस्टम कॆ देखॊ',
	'wminc-viewuserlang-user' => 'उपयोगकर्ता',
	'wminc-viewuserlang-go' => 'जा',
	'right-viewuserlang' => 'देखॊ [[Special:ViewUserLang|user language and test wiki]]',
);

/** Arabic (العربية)
 * @author Ciphers
 * @author Meno25
 * @author Orango
 * @author OsamaK
 */
$messages['ar'] = array(
	'wminc-desc' => 'جرّب نظام الويكي لحضانة ويكيميديا',
	'wminc-testwiki' => 'ويكي الاختبار:',
	'wminc-testwiki-none' => 'لا شيء/الكل',
	'wminc-prefinfo-language' => 'لغة واجهتك - مستقلة عن ويكي الاختبار',
	'wminc-prefinfo-code' => 'رمز ISO 639 للغة',
	'wminc-prefinfo-project' => 'إختر مشروع ويكيميديا (خيار الحضانة هو للمستخدمين الذين يقومون بعمل عام)',
	'wminc-prefinfo-error' => 'اخترت مشروعًا يختاج رمز لغة.',
	'randombytest' => 'صفحة عشوائية بواسطة ويكي الاختبار',
	'randombytest-nopages' => 'لا توجد صفحات في ويكي الاختبار الخاص بك، في النطاق: $1.',
	'wminc-viewuserlang' => 'أوجد لغة المستخدم و جرّب الويكي',
	'wminc-viewuserlang-user' => 'اسم المستخدم:',
	'wminc-viewuserlang-go' => 'اذهب',
	'right-viewuserlang' => 'رؤية [[Special:ViewUserLang|لغة وويكي الاختبار الخاص بالمستخدم]]',
);

/** Aramaic (ܐܪܡܝܐ)
 * @author Basharh
 */
$messages['arc'] = array(
	'wminc-testwiki' => 'ܘܝܩܝ ܢܣܝܘܢܐ:',
	'wminc-testwiki-none' => 'ܠܐ ܡܕܡ/ܟܠ',
	'wminc-viewuserlang-user' => 'ܫܡܐ ܕܡܦܠܚܢܐ:',
	'wminc-viewuserlang-go' => 'ܙܠ',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 */
$messages['arz'] = array(
	'wminc-testwiki' => 'ويكى تجربه:',
	'wminc-testwiki-none' => 'ولاحاجه/كل',
	'wminc-viewuserlang-user' => 'اسم اليوزر:',
	'wminc-viewuserlang-go' => 'روح',
);

/** Asturian (Asturianu)
 * @author Xuacu
 */
$messages['ast'] = array(
	'wminc-manual' => 'Manual',
	'wminc-listwikis' => 'Llista de wikis',
	'wminc-testwiki' => 'Wiki de prueba:',
	'wminc-testwiki-none' => 'Nengún/Toos',
	'wminc-recentchanges-all' => 'Tolos cambios recientes',
);

/** Bavarian (Boarisch)
 * @author Man77
 * @author Mucalexx
 */
$messages['bar'] = array(
	'wminc-desc' => 'Daméglécht Testwikis fyrn Wikimedia Incubator',
	'wminc-manual' => 'Åloattung',
	'wminc-listwikis' => 'Listen voh dé Wikis',
	'wminc-testwiki' => 'Testwiki:',
	'wminc-testwiki-none' => 'Koane / Olle',
	'wminc-recentchanges-all' => 'Olle létzden Änderrungen',
	'wminc-prefinfo-language' => 'Sprooch voh deiner Benutzerówerflächen - vom Testwiki unobhängég',
	'wminc-prefinfo-code' => 'Da ISO-639-Sproochcode',
	'wminc-prefinfo-project' => '\'s Wikimedia-Prójekt, ån dém du do orweidst ("Incubator" fyr Benutzer, dé oigmoane Aufgom ywernemmern)',
	'wminc-prefinfo-error' => 'Bei dém Prójekt muass a Sproochcode ågeem wern!',
	'wminc-error-move-unprefixed' => 'Feeler: Dé Seiten, dé du vaschiam wüst, hod [[{{MediaWiki:Helppage}}|koah óder a foischs Präfix]].',
	'wminc-error-wronglangcode' => "'''Feeler:''' Dé Seiten enthoit an [[{{MediaWiki:Helppage}}|foischen Sproochcode]]: „$1“.",
	'wminc-error-unprefixed' => "'''Feeler:''' Dé Seiten hod [[{{MediaWiki:Helppage}}|koan Präfix]].",
	'wminc-error-unprefixed-suggest' => "'''Feeler:''' Dé Seiten hod [[{{MediaWiki:Helppage}}|koan Präfix]]. Du kåst unter [[:$1]] a Seiten åléng.",
	'wminc-error-wiki-exists' => 'Dés Wiki do gibts bereits schoh. Dé Seiten befindt sé auf $1. Wånns Wiki erst grod amoi erstöd worn is, bitt ma di um a por Stund Geduid, bis olle Inhoite durthih ywertrong worn san.',
	'randombytest' => "Zuafällige Seiten aus 'm Testwiki",
	'randombytest-nopages' => 'Es befinden sé koane Seiten im Nåmensraum "$1" voh deim Testwiki.',
	'wminc-viewuserlang' => 'Benutzersprooch und Testwiki åschauh',
	'wminc-viewuserlang-user' => 'Benutzernåm:',
	'wminc-viewuserlang-go' => 'Hoin',
	'wminc-userdoesnotexist' => 'Der Benutzer „$1“ existird néd.',
	'right-viewuserlang' => '[[Special:ViewUserLang|Benutzersprooch und Testwiki]] åschauh',
	'group-test-sysop' => 'Testadministraatorn',
	'group-test-sysop-member' => 'Testadministraator',
	'grouppage-test-sysop' => 'Project:Testadministraatorn',
	'wminc-code-macrolanguage' => "Dé [[wikipedia:$2 language|Sprooch „$3“]] is a [[wikipedia:de:Makrosprache_(ISO_639)|Makrósprooch]], dé d' fóigenden Oahzelsproochn enthoit:",
	'wminc-code-collective' => 'Da Code „$1“ bziagt sé néd auf a bstimmte Sprooch, sondern auf a Gruppm voh Sproochen, nåmentlich dé [[wikipedia:$2 language|Sproochen „$3“]].',
	'wminc-code-retired' => "Der Sproochcode is gänderd worn und beziagt sé nimmer auf d' urspryngliche Sprooch.",
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 * @author Jim-by
 * @author Wizardist
 * @author Zedlik
 */
$messages['be-tarask'] = array(
	'wminc-desc' => 'Тэставая вікі-сыстэма для інкубатара Фундацыі «Вікімэдыя»',
	'wminc-manual' => 'Інструкцыя',
	'wminc-listwikis' => 'Сьпіс вікі',
	'wminc-testwiki' => 'Тэставая вікі:',
	'wminc-testwiki-none' => 'Ніякая/усе',
	'wminc-recentchanges-all' => 'Усе апошнія зьмены',
	'wminc-prefinfo-language' => 'Вашая мова інтэрфэйсу — незалежная ад мовы Вашай тэставай вікі',
	'wminc-prefinfo-code' => 'Код мовы ISO 639',
	'wminc-prefinfo-project' => 'Выберыце праект фундацыі «Вікімэдыя» (выберыце варыянт Інкубатар, калі займаецеся агульнай працай)',
	'wminc-prefinfo-error' => 'Вы выбралі праект, які патрабуе код мовы.',
	'wminc-error-move-unprefixed' => 'Памылка: старонка, якую Вы спрабуеце перанесьці [[{{MediaWiki:Helppage}}|ня мае прэфіксу ці мае няслушны прэфікс]]!',
	'wminc-error-wronglangcode' => "'''Памылка:''' гэтая старонка утрымлівае [[{{MediaWiki:Helppage}}|няслушны код мовы]] «$1»!",
	'wminc-error-unprefixed' => "'''Памылка:''' гэтая старонка [[{{MediaWiki:Helppage}}|ня мае прэфіксу]]!",
	'wminc-error-unprefixed-suggest' => "'''Памылка:''' гэтая старонка [[{{MediaWiki:Helppage}}|не мае прэфіксу]]! Вы можаце стварыць старонку на [[:$1]].",
	'wminc-error-wiki-exists' => 'Гэтая вікі ўжо існуе. Вы можаце знайсьці гэтую старонку на $1. Калі вікі была створаная нядаўна, калі ласка, пачакайце некалькі гадзінаў ці дзён, пакуль будзе імпартаваны зьмест.',
	'randombytest' => 'Выпадковая старонка тэставай вікі',
	'randombytest-nopages' => 'Няма старонак ў Вашай тэставай вікі, у прасторы назваў: $1.',
	'wminc-viewuserlang' => 'Пошук мовы ўдзельніка і тэставай вікі',
	'wminc-viewuserlang-user' => 'Імя ўдзельніка:',
	'wminc-viewuserlang-go' => 'Перайсьці',
	'wminc-userdoesnotexist' => 'Удзельнік «$1» не існуе.',
	'right-viewuserlang' => 'прагляд [[Special:ViewUserLang|мовы ўдзельніка і тэставаньне вікі]]',
	'group-test-sysop' => 'Адміністратары тэставай вікі',
	'group-test-sysop-member' => 'адміністратар тэставай вікі',
	'grouppage-test-sysop' => 'Project:Адміністратары тэставай вікі',
	'wminc-code-macrolanguage' => '[[wikipedia:$2 мова|«$3» мова]] зьяўляецца [[wikipedia:ISO 639 macrolanguage|макрамовай]], якая ўтрымлівае наступную колькасьць моваў:',
	'wminc-code-collective' => 'Код «$1» адносіцца не да пэўнай мовы, а да набору моваў, а менавіта да [[wikipedia:$2 language|«$3»]].',
	'wminc-code-retired' => 'Гэты код мовы быў зьменены і болей не датычыцца арыгінальнай мовы.',
);

/** Bulgarian (Български)
 * @author DCLXVI
 * @author Spiritia
 * @author Stanqo
 */
$messages['bg'] = array(
	'wminc-desc' => 'Тестова уики система за Уикимедия Инкубатор',
	'wminc-testwiki' => 'Тестово уики:',
	'wminc-testwiki-none' => 'Никои / Всички',
	'wminc-prefinfo-language' => 'Език на интерфейса (независим от езика на вашето тестово уики)',
	'wminc-prefinfo-code' => 'Езиковият код според стандарта ISO 639',
	'wminc-prefinfo-project' => 'Изберете проект на Уикимедия (Опцията инкубатор е за потребители, които извършват обща работа)',
	'wminc-prefinfo-error' => 'Избрали сте проект, който се нуждае от езиков код.',
	'randombytest' => 'Случайна страница от тестваното уики',
	'randombytest-nopages' => 'В тестваното уики няма страници в именно пространство $1.',
	'wminc-viewuserlang' => 'Справка за езика на потребителя и тестваното от него уики',
	'wminc-viewuserlang-user' => 'Потребител:',
	'wminc-viewuserlang-go' => 'Отваряне',
	'right-viewuserlang' => 'Вижте [[Special:ViewUserLang|езика на потребителя и езика на тестваното уики]]',
);

/** Bengali (বাংলা)
 * @author Bellayet
 */
$messages['bn'] = array(
	'wminc-desc' => 'উইকিমিডিয়া ইনকিউবেটরের জন্য পরীক্ষামূলক উইকি ব্যবস্থা',
	'wminc-testwiki' => 'পরীক্ষামূলক উইকি:',
	'wminc-testwiki-none' => 'কিছু না/সমস্ত',
	'wminc-prefinfo-language' => 'আপনার ইন্টারফেস ভাষা - আপনার পরীক্ষামূলক উইকি হতে স্বাধীন',
	'wminc-prefinfo-code' => 'ISO 639 ভাষা কোড',
	'wminc-prefinfo-error' => 'আপনার নির্বাচিত প্রকল্পের ভাষার কোড প্রয়োজন।',
	'randombytest' => 'পরীক্ষামূলক উইকির অজানা পাতা',
	'wminc-viewuserlang' => 'ব্যবহারকারী ভাষা এবং পরীক্ষামূলক উইকি দেখুন',
	'wminc-viewuserlang-user' => 'ব্যবহারকারী নাম:',
	'wminc-viewuserlang-go' => 'যাও',
	'right-viewuserlang' => '[[Special:ViewUserLang|ব্যবহারকারী ভাষা এবং পরীক্ষামূলক উইকি]] দেখাও',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'wminc-desc' => 'Reizhiad testiñ wiki evit Wikimedia Incubator',
	'wminc-testwiki' => 'Wiki testiñ :',
	'wminc-testwiki-none' => 'Hini ebet / An holl',
	'wminc-recentchanges-all' => 'An holl gemmoù diwezhañ',
	'wminc-prefinfo-language' => "Yezh hoc'h etrefas - distag diouzh hini ho wiki testiñ",
	'wminc-prefinfo-code' => 'Kod ISO 639 ar yezh',
	'wminc-prefinfo-project' => 'Diuzit ar raktres Wikimedia (miret eo an dibarzh Incubator evit an implijerien a gas da benn ul labour dre vras)',
	'wminc-prefinfo-error' => "Diuzet hoc'h eus ur raktres zo ezhomm ur c'hod yezh evitañ.",
	'wminc-error-move-unprefixed' => "Fazi : N'eus [[{{MediaWiki:Helppage}}|rakger ebet pe fall eo rakger]] ar bajenn emaoc'h o klask dilec'hiañ !",
	'wminc-error-wronglangcode' => "'''Fazi :''' Ur [[{{MediaWiki:Helppage}}|c'hod yezh fall]] \"\$1\" zo d'ar bajenn emaoc'h o klask degas kemmoù enni !",
	'wminc-error-unprefixed' => "'''Fazi :''' N'eus [[{{MediaWiki:Helppage}}|rakger ebet]] d'ar bajenn emaoc'h o klask degas kemmoù enni !",
	'wminc-error-unprefixed-suggest' => "'''Fazi :''' N'eus [[{{MediaWiki:Helppage}}|rakger ebet]] d'ar bajenn emaoc'h o klask degas kemmoù enni ! Gallout a rit  krouiñ ur bajenn war [[:$1]].",
	'randombytest' => 'Pajenn dargouezhek gant ar wiki amprouiñ',
	'randombytest-nopages' => "N'eus pajenn ebet en ho wiki amprouiñ, en esaouenn anv : $1.",
	'wminc-viewuserlang' => 'Gwelet yezh an implijer hag e wiki testiñ',
	'wminc-viewuserlang-user' => 'Anv implijer :',
	'wminc-viewuserlang-go' => 'Mont',
	'wminc-userdoesnotexist' => 'N\'eus ket eus an implijer "$1".',
	'right-viewuserlang' => 'Gwelet [[Special:ViewUserLang|yezh an implijer hag ar wiki testiñ]]',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'wminc-desc' => 'Testiranje wiki sistema za Wikimedia Incubator',
	'wminc-testwiki' => 'Testna wiki:',
	'wminc-testwiki-none' => 'Ništa/Sve',
	'wminc-recentchanges-all' => 'Sve nedavne izmjene',
	'wminc-prefinfo-language' => 'Vaš jezik interfejsa - nezavisno od Vaše testirane wiki',
	'wminc-prefinfo-code' => 'ISO 639 kod jezika',
	'wminc-prefinfo-project' => 'Odaberite Wikimedia projekat (Opcija u inkubatoru za korisnike koje rade opći posao)',
	'wminc-prefinfo-error' => 'Odabrali ste projekat koji zahtijeva kod jezika.',
	'randombytest' => 'Slučajna stranica od testirane wiki',
	'randombytest-nopages' => 'Nema stranica u Vašoj probnoj wiki, u imenskom prostoru: $1.',
	'wminc-viewuserlang' => 'Pregledaj korisnički jezik i testiranu wiki',
	'wminc-viewuserlang-user' => 'Korisničko ime:',
	'wminc-viewuserlang-go' => 'Idi',
	'right-viewuserlang' => 'Pregledavanje [[Special:ViewUserLang|korisničkog jezika i probne wiki]]',
);

/** Catalan (Català)
 * @author Paucabot
 * @author SMP
 * @author Solde
 */
$messages['ca'] = array(
	'wminc-testwiki-none' => 'Cap/Tots',
	'wminc-prefinfo-code' => 'El codi de llengua ISO 639',
	'wminc-viewuserlang-user' => "Nom d'usuari:",
	'wminc-viewuserlang-go' => 'Vés-hi!',
	'right-viewuserlang' => "Veure [[Special:ViewUserLang|l'idioma i el wiki de prova]]",
);

/** Sorani (کوردی)
 * @author Marmzok
 */
$messages['ckb'] = array(
	'wminc-testwiki' => 'تاقی‌کردنه‌وه‌ی ویکی:',
	'wminc-testwiki-none' => 'هیچیان\\هەموویان',
	'wminc-prefinfo-language' => 'ڕووکاری زمانی تۆ جیاوازه‌ له‌ تاقی کردنه‌وه‌ی ویکی',
	'wminc-prefinfo-code' => 'کۆدی زمانی ISO 639',
	'wminc-prefinfo-error' => 'پڕۆژەیەکت هەڵبژاردووه کە پێویستی بە کۆدی زمانە.',
	'wminc-viewuserlang-user' => 'ناوی بەکارهێنەری:',
	'wminc-viewuserlang-go' => 'بڕۆ',
);

/** Czech (Česky)
 * @author Kuvaly
 * @author Matěj Grabovský
 * @author Mormegil
 */
$messages['cs'] = array(
	'wminc-desc' => 'Testovací wiki systém pro Inkubátor Wikimedia',
	'wminc-testwiki' => 'Testovací wiki:',
	'wminc-testwiki-none' => 'Nic/vše',
	'wminc-prefinfo-language' => 'Váš jazyk rozhraní – nezávislý na vaší testovací wiki',
	'wminc-prefinfo-code' => 'Jazykový kód ISO 639',
	'wminc-prefinfo-project' => 'Vybrat projekt Wikimedia (možnost „Inkubátor“ je pro uživatele, kteří vykonávají všeobecnou činnost)',
	'wminc-prefinfo-error' => 'Vybrali jste projekt, který vyžaduje kód jazyku.',
	'randombytest' => 'Náhodná stránka z testovací wiki',
	'randombytest-nopages' => 'Ve vaší testovací wiki nejsou ve jmenném prostoru $1 žádné stránky.',
	'wminc-viewuserlang' => 'Vyhledat jazyk uživatele a testovací wiki',
	'wminc-viewuserlang-user' => 'Uživatelské jméno:',
	'wminc-viewuserlang-go' => 'Přejít',
	'right-viewuserlang' => 'Prohlížení [[Special:ViewUserLang|uživatelského jazyka a testovací wiki]]',
);

/** Danish (Dansk)
 * @author Byrial
 * @author Froztbyte
 * @author Masz
 */
$messages['da'] = array(
	'wminc-desc' => 'Testwikisystem for Wikimedia Incubator',
	'wminc-testwiki' => 'Testwiki:',
	'wminc-testwiki-none' => 'Ingen/Alle',
	'wminc-prefinfo-code' => 'ISO 639-sprogkode',
	'wminc-viewuserlang-user' => 'Brugernavn:',
	'wminc-viewuserlang-go' => 'Gå',
);

/** German (Deutsch)
 * @author Imre
 * @author Kghbln
 * @author MF-Warburg
 * @author Umherirrender
 */
$messages['de'] = array(
	'wminc-desc' => 'Ermöglicht Testwikis für den Wikimedia Incubator',
	'wminc-manual' => 'Anleitung',
	'wminc-listwikis' => 'Liste der Wikis',
	'wminc-testwiki' => 'Testwiki:',
	'wminc-testwiki-none' => 'Keins/Alle',
	'wminc-recentchanges-all' => 'Alle letzten Änderungen',
	'wminc-prefinfo-language' => 'Sprache deiner Benutzeroberfläche - vom Testwiki unabhängig',
	'wminc-prefinfo-code' => 'Der ISO-639-Sprachcode',
	'wminc-prefinfo-project' => 'Das Wikimedia-Projekt, an dem du hier arbeitest („Incubator“ für Benutzer, die allgemeine Aufgaben übernehmen)',
	'wminc-prefinfo-error' => 'Bei diesem Projekt muss ein Sprachcode angeben werden!',
	'wminc-error-move-unprefixed' => 'Fehler: Die Seite, die du verschieben willst, hat [[{{MediaWiki:Helppage}}|kein oder ein falsches Präfix]].',
	'wminc-error-wronglangcode' => "'''Fehler:''' Diese Seite enthält einen [[{{MediaWiki:Helppage}}|falschen Sprachcode]]: „$1“.",
	'wminc-error-unprefixed' => "'''Fehler:''' Diese Seite hat [[{{MediaWiki:Helppage}}|kein Präfix]].",
	'wminc-error-unprefixed-suggest' => "'''Fehler:''' Diese Seite hat [[{{MediaWiki:Helppage}}|kein Präfix]]. Du kannst unter [[:$1]] eine Seite anlegen.",
	'wminc-error-wiki-exists' => 'Dieses Wiki ist bereits vorhanden. Diese Seite befindet sich auf $1. Sofern das Wiki erst kürzlich erstellt wurde, bitten wir um ein paar Stunden Geduld bis alle Inhalte dorthin übertragen wurden.',
	'wminc-error-wiki-sister' => 'Diese Seite gehört zu einem Projekt, das nicht hier gehostet ist. Geh bitte zu $1, um das Wiki zu finden.',
	'randombytest' => 'Zufällige Seite aus dem Testwiki',
	'randombytest-nopages' => 'Es befinden sich keine Seiten im Namensraum „$1“ deines Testwikis.',
	'wminc-viewuserlang' => 'Benutzersprache und Testwiki einsehen',
	'wminc-viewuserlang-user' => 'Benutzername:',
	'wminc-viewuserlang-go' => 'Holen',
	'wminc-userdoesnotexist' => 'Der Benutzer „$1“ ist nicht vorhanden.',
	'right-viewuserlang' => '[[Special:ViewUserLang|Benutzersprache und Testwiki]] anschauen',
	'group-test-sysop' => 'Testadministratoren',
	'group-test-sysop-member' => 'Testadministrator',
	'grouppage-test-sysop' => 'Project:Testadministratoren',
	'wminc-code-macrolanguage' => 'Die [[wikipedia:$2 language|Sprache „$3“]] ist eine [[wikipedia:de:Makrosprache_(ISO_639)|Makrosprache]], welche die folgenden Einzelsprachen enthält:',
	'wminc-code-collective' => 'Der Code „$1“ bezieht sich nicht auf eine bestimmte Sprache, sondern auf eine Gruppe von Sprachen, namentlich die [[wikipedia:$2 language|Sprachen „$3“]].',
	'wminc-code-retired' => 'Dieser Sprachcode wurde geändert und bezieht sich nicht mehr auf die ursprüngliche Sprache.',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Kghbln
 * @author MF-Warburg
 * @author Umherirrender
 */
$messages['de-formal'] = array(
	'wminc-prefinfo-language' => 'Sprache Ihrer Benutzeroberfläche - vom Testwiki unabhängig',
	'wminc-prefinfo-project' => 'Das Wikimedia-Projekt, an dem Sie hier arbeiten („Incubator“ für Benutzer, die allgemeine Aufgaben übernehmen)',
	'wminc-error-move-unprefixed' => 'Fehler: Die Seite, die Sie verschieben wollen, hat entweder [[{{MediaWiki:Helppage}}|kein oder ein falsches Präfix]].',
	'wminc-error-unprefixed-suggest' => "'''Fehler:''' Diese Seite hat [[{{MediaWiki:Helppage}}|kein Präfix]]. Sie können unter [[:$1]] eine Seite anlegen.",
	'wminc-error-wiki-sister' => 'Diese Seite gehört zu einem Projekt, das nicht hier gehostet ist. Gehen Sie bitte zu $1, um das Wiki zu finden.',
	'randombytest-nopages' => 'Es befinden sich keine Seiten im Namensraum „$1“ Ihres Testwikis.',
);

/** Zazaki (Zazaki)
 * @author Mirzali
 */
$messages['diq'] = array(
	'wminc-viewuserlang-user' => 'Namey karberi:',
	'wminc-viewuserlang-go' => 'Şo',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'wminc-desc' => 'Testowy wikijowy system za Wikimedia Incubator',
	'wminc-testwiki' => 'Testowy wiki:',
	'wminc-testwiki-none' => 'Žeden/Wše',
	'wminc-prefinfo-language' => 'Rěc twójogo wužywarskego pówjercha - wót twójogo testowego wikija njewótwisna',
	'wminc-prefinfo-code' => 'Rěcny kod ISO 639',
	'wminc-prefinfo-project' => 'Wikimedijowy projekt wubraś (Incubatorowa opcija jo za wužywarjow, kótarež cynje powšykne źěło)',
	'wminc-prefinfo-error' => 'Sy projekt wubrał, kótaryž se rěcny kod pomina.',
	'randombytest' => 'Pśipadny bok pó testowem wikiju',
	'randombytest-nopages' => 'W twójom testowem wikiju w mjenjowem rumje $1 boki njejsu.',
	'wminc-viewuserlang' => 'Wužywarsku rěc a testowy wiki se woglědaś',
	'wminc-viewuserlang-user' => 'Wužywarske mě:',
	'wminc-viewuserlang-go' => 'Pokazaś',
	'right-viewuserlang' => '[[Special:ViewUserLang|Wužywarsku rěc a testowy wiki]] se woglědaś',
);

/** Central Dusun (Dusun Bundu-liwan)
 * @author FRANCIS5091
 */
$messages['dtp'] = array(
	'wminc-desc' => 'Nuludan pogumbalan wiki montok Pongongomut Wikimodia',
	'wminc-testwiki' => 'Wiki pogumbalan',
	'wminc-testwiki-none' => 'Aiso/Oinsanan',
	'wminc-prefinfo-language' => 'Woyoboros gunoonnu - poinsuai mantad wiki pogumbalannu',
	'wminc-prefinfo-code' => 'Kod woyoboros tumanud ISO 639',
	'wminc-prefinfo-project' => 'Pilio purujik wikimodia (Pongongomut nopo nga pipilion montok momomoguno di pigosusuaian wonsoion)',
	'wminc-prefinfo-error' => 'Minomili ko di purujik di momoguno kod woyoboros',
	'randombytest' => 'Songkobolikon do wiki pogumbalan',
	'randombytest-nopages' => 'Ingaa bobolikon id wiki pogumbalannu, it koingaran do: $1.',
	'wminc-viewuserlang' => 'Ihumo boros momoguno om pogumbalan wiki',
	'wminc-viewuserlang-user' => 'Ngarannu:',
	'wminc-viewuserlang-go' => 'Ongoi',
	'right-viewuserlang' => 'Intaai [[Special:ViewUserLang|woyoboros momomoguno om wiki pogumbalan]]',
);

/** Ewe (Eʋegbe) */
$messages['ee'] = array(
	'wminc-viewuserlang-go' => 'Yi',
);

/** Greek (Ελληνικά)
 * @author Crazymadlover
 * @author Omnipaedista
 * @author ZaDiak
 */
$messages['el'] = array(
	'wminc-desc' => 'Δοκιμή του συστήματος βίκι για το Wikimedia Incubator',
	'wminc-testwiki' => 'Δοκιμαστικό wiki:',
	'wminc-testwiki-none' => 'Κανένα/Όλα',
	'wminc-prefinfo-language' => 'Η γλώσσα συστήματος - ανεξάρτητη από το δοκιμαστικό σας βίκι',
	'wminc-prefinfo-code' => 'Ο κωδικός γλώσσας ISO 639',
	'wminc-prefinfo-project' => 'Επιλογή του εγχειρήματος Wikimedia (η επιλογή Incubator είναι για όσους χρήστες κάνουν γενική δουλειά)',
	'wminc-prefinfo-error' => 'Επιλέξατε ένα σχέδιο που χρειάζεται ένα κωδικό γλώσσας.',
	'randombytest' => 'Τυχαία σελίδα βάσει του δοκιμαστικού βίκι',
	'randombytest-nopages' => 'Δεν υπάρχουν σελίδες στο wiki δοκιμής σας, στις περιοχές ονομάτων: $1.',
	'wminc-viewuserlang' => 'Ανατρέξτε στη γλώσσα χρήστη και στο δοκιμαστικό βίκι',
	'wminc-viewuserlang-user' => 'Όνομα χρήστη:',
	'wminc-viewuserlang-go' => 'Μετάβαση',
	'right-viewuserlang' => 'Προβολή της [[Special:ViewUserLang|γλώσσας χρήστη και του δοκιμαστικού βίκι]]',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'wminc-desc' => 'Testa vikisistemo por Wikimedia-Inkubatoro',
	'wminc-testwiki' => 'Prova vikio:',
	'wminc-testwiki-none' => 'Nenio/Ĉio',
	'wminc-prefinfo-language' => 'Via interfaca lingvo - sendepende de via prova vikio',
	'wminc-prefinfo-code' => 'La lingvo kodo ISO 639',
	'wminc-prefinfo-error' => 'Vi elektis projekton kiu bezonas lingvan kodon.',
	'randombytest' => 'Hazarda paĝo de testvikio',
	'randombytest-nopages' => 'Mankas paĝoj en via testvikio en la nomspaco: $1.',
	'wminc-viewuserlang' => 'Trarigardi uzulan lingvon kaj testi vikion',
	'wminc-viewuserlang-user' => 'Salutnomo:',
	'wminc-viewuserlang-go' => 'Ek',
	'right-viewuserlang' => 'Vidi [[Special:ViewUserLang|uzulan lingvon kaj testvikion]]',
);

/** Spanish (Español)
 * @author Antur
 * @author Crazymadlover
 * @author Fitoschido
 * @author Translationista
 */
$messages['es'] = array(
	'wminc-desc' => 'Sistema de wiki de prueba para Wikimedia Incubator',
	'wminc-manual' => 'Manual',
	'wminc-listwikis' => 'Lista de wikis',
	'wminc-testwiki' => 'Wiki de prueba:',
	'wminc-testwiki-none' => 'Ninguno/Todo',
	'wminc-recentchanges-all' => 'Todos los cambios recientes',
	'wminc-prefinfo-language' => 'Tu idioma de interface - independiente de tu wiki de prueba',
	'wminc-prefinfo-code' => 'El código de idioma ISO 639',
	'wminc-prefinfo-project' => 'Seleccione el proyecto de Wikimedia (la opción Incubator es para usuarios que hacen el trabajo general)',
	'wminc-prefinfo-error' => 'Seleccionaste un proyecto que necesita un código de lenguaje.',
	'randombytest' => 'Página aleatoria para probar wiki',
	'randombytest-nopages' => 'No hay páginas en su wiki de prueba, en el espacio de nombres: $1.',
	'wminc-viewuserlang' => 'Ver lenguaje de usuario y wiki de prueba',
	'wminc-viewuserlang-user' => 'Nombre de usuario:',
	'wminc-viewuserlang-go' => 'Ir',
	'wminc-userdoesnotexist' => 'El usuario «$1» no existe.',
	'right-viewuserlang' => 'Ver [[Special:ViewUserLang|idioma de usuario y prueba wiki]]',
	'group-test-sysop' => 'Administradores de wiki de prueba',
	'group-test-sysop-member' => 'administrador de wiki de prueba',
	'grouppage-test-sysop' => 'Project:Administradores de wiki de pruebas',
	'wminc-code-macrolanguage' => 'El [[wikipedia:$2 language|$3]] es una [[wikipedia:es:Macrolengua|macrolengua]], que se compone de los siguientes idiomas:',
);

/** Estonian (Eesti)
 * @author Avjoska
 * @author Pikne
 */
$messages['et'] = array(
	'wminc-desc' => 'Katsevikide süsteem Wikimedia Incubatori jaoks',
	'wminc-manual' => 'Käsiraamat',
	'wminc-listwikis' => 'Vikide nimekiri',
	'wminc-testwiki' => 'Katseviki:',
	'wminc-testwiki-none' => 'Puudub/Kõik',
	'wminc-recentchanges-all' => 'Kõik viimased muudatused',
	'wminc-prefinfo-language' => 'Sinu liidese keel (katsevikist olenematu)',
	'wminc-prefinfo-code' => 'ISO 639 keelekood',
	'wminc-prefinfo-project' => 'Vali Wikimedia projekt (valik "Incubator" on kasutajatele, kes teevad üldist tööd)',
	'wminc-prefinfo-error' => 'Koos valitud projektiga tuleb määrata ka keelekood.',
	'wminc-error-move-unprefixed' => 'Tõrge: Lehekülg, mida üritad teisaldada, [[{{MediaWiki:Helppage}}|on eesliiteta või vale eesliitega]]!',
	'wminc-error-wronglangcode' => "'''Tõrge:''' See lehekülg sisaldab [[{{MediaWiki:Helppage}}|vale keelekoodi]] \"\$1\"!",
	'wminc-error-unprefixed' => "'''Tõrge:''' See lehekülg on [[{{MediaWiki:Helppage}}|eesliiteta]]!",
	'wminc-error-unprefixed-suggest' => "'''Tõrge:''' See lehekülg on [[{{MediaWiki:Helppage}}|eesliiteta]]! Uue lehekülje saad luua asukohas [[:$1]].",
	'wminc-error-wiki-exists' => 'See viki on juba olemas. Selle lehekülje leiad asukohast $1. Kui viki loodi hiljuti, oota palun mõned tunnid või päevad, kuni kogu sisu on imporditud.',
	'wminc-error-wiki-sister' => 'See lehekülg on osa projektist, mida ei peeta siin. Mine palun asukohta $1, et see viki leida.',
	'randombytest' => 'Juhuslik katseviki lehekülg',
	'randombytest-nopages' => 'Sinu katseviki nimeruumis "$1" pole lehekülgi.',
	'wminc-viewuserlang' => 'Kasutaja keele ja katseviki vaatamine',
	'wminc-viewuserlang-user' => 'Kasutajanimi:',
	'wminc-viewuserlang-go' => 'Mine',
	'wminc-userdoesnotexist' => 'Kasutajat "$1" pole olemas.',
	'right-viewuserlang' => 'Vaadata [[Special:ViewUserLang|kasutaja keelt ja katsevikit]]',
	'group-test-sysop' => 'Katseviki administraatorid',
	'group-test-sysop-member' => 'katseviki administraator',
	'grouppage-test-sysop' => 'Project:Katseviki administraatorid',
	'wminc-code-macrolanguage' => '[[wikipedia:$2 language|$3 keel]] on [[wikipedia:ISO 639 macrolanguage|makrokeel]], mis koosneb järgmistest keeltest:',
	'wminc-code-collective' => 'Keelekood "$1" ei viita kindlale keelele, vaid järgmisele keelterühmale: [[wikipedia:$2 language|$3 keeled]].',
	'wminc-code-retired' => 'Seda keelekoodi on muudetud ja see ei viita enam esialgsele keelele.',
);

/** Basque (Euskara)
 * @author An13sa
 * @author Kobazulo
 */
$messages['eu'] = array(
	'wminc-desc' => 'Wikimedia Incubatorrerako wiki proba sistema',
	'wminc-testwiki' => 'Probazko wikia:',
	'wminc-testwiki-none' => 'Bat ere ez/Guztiak',
	'wminc-recentchanges-all' => 'Aldaketa berri guztiak',
	'wminc-prefinfo-language' => 'Zure interfazearen hizkuntza - Wiki probatik independentea da',
	'wminc-prefinfo-code' => 'ISO 639 hizkuntza kodea',
	'wminc-prefinfo-project' => 'Aukeratu Wikimedia proiektua (Incubator aukera lan orokorra egiten dutenentzako da)',
	'wminc-prefinfo-error' => 'Hizkuntza-kodea behar duen proiektua aukeratu duzu.',
	'randombytest' => 'Wiiki testaren ausazko orria',
	'randombytest-nopages' => 'Ez dago orrialderik zure proba wikian, $1 izen-tartearekin.',
	'wminc-viewuserlang' => 'Lankidearen hizkuntza eta probazko wikia ikusi',
	'wminc-viewuserlang-user' => 'Erabiltzaile izena:',
	'wminc-viewuserlang-go' => 'Joan',
	'right-viewuserlang' => 'Ikusi [[Special:ViewUserLang|lankide hizkuntza eta wiki testa]]',
);

/** Persian (فارسی)
 * @author Huji
 * @author Mjbmr
 * @author Sahim
 */
$messages['fa'] = array(
	'wminc-desc' => 'سامانهٔ ویکی آزمایشی برای ویکی‌رشد ویکی‌مدیا',
	'wminc-manual' => 'راهنمای کاربر',
	'wminc-listwikis' => 'فهرست ویکی‌ها',
	'wminc-testwiki' => 'ویکی آزمایشی:',
	'wminc-testwiki-none' => 'هیچ‌کدام/همه',
	'wminc-recentchanges-all' => 'همه تغییرات اخیر',
	'wminc-prefinfo-language' => 'زبان رابط کاربری شما - مستقل از ویکی آزمایشی شما',
	'wminc-prefinfo-code' => 'کد زبان ایزو ۶۳۹',
	'wminc-prefinfo-project' => 'پروژه ویکی‌مدیا را انتخاب کنید (گزینه ویکی‌رشد برای کاربرانی که کار عمومی انجام می‌دهند)',
	'wminc-prefinfo-error' => 'شما یک پروژه‌ای را انتخاب کرده‌اید که به یک کد زبان احتیاج دارد.',
	'wminc-error-move-unprefixed' => 'خطا: صفحه‌ای که شما قصد انتقال آن را دارید [[{{MediaWiki:Helppage}}|فاقد پیشوند و یا دارای پیشوند نادرست]] می‌باشد!',
	'wminc-error-wronglangcode' => "'''خطا:''' این صفحه شامل یک [[{{MediaWiki:Helppage}}|کد زبان نادرست]] می‌باشد!: «$1»",
	'wminc-error-unprefixed' => "'''خطا:''' این صفحه [[{{MediaWiki:Helppage}}|فاقد پیشوند]] می‌باشد!",
	'wminc-error-unprefixed-suggest' => "'''خطا:''' این صفحه [[{{MediaWiki:Helppage}}|فاقد پیشوند]] می‌باشد! شما می‌توانید یک صفحه در [[:$1]] ایجاد کنید.",
	'wminc-error-wiki-exists' => 'این ویکی در حال حاضر وجود دارد. شما می‌توانید این صفحه را در $1 پیدا کنید. اگر ویکی به تازگی ایجاد شده است، لطفاً چند ساعت یا چند روز صبر کنید تا تمامی محتوا وارد شوند.',
	'randombytest' => 'صفحه تصادفی بر اساس ویکی آزمایشی',
	'randombytest-nopages' => 'هیچ صفحه‌ای در ویکی آزمایشی شما وجود ندارد، در فضای نامی: $1.',
	'wminc-viewuserlang' => 'مشاهده زبان و ویکی آزمایشی کاربر',
	'wminc-viewuserlang-user' => 'نام کاربری:',
	'wminc-viewuserlang-go' => 'برو',
	'wminc-userdoesnotexist' => 'کاربر «$1» وجود ندارد.',
	'right-viewuserlang' => 'مشاهده [[Special:ViewUserLang|زبان و ویکی آزمایشی کاربر]]',
	'group-test-sysop' => 'مدیران ویکی آزمایشی',
	'group-test-sysop-member' => 'مدیر ویکی آزمایشی',
	'grouppage-test-sysop' => 'Project:مدیران ویکی آزمایشی',
	'wminc-code-macrolanguage' => '[[wikipedia:$2 language|زبان «$3»]] یک [[wikipedia:ISO 639 macrolanguage|زبان بزرگ]] می‌باشد، که ترکیبی از زبان‌های مقابل می‌باشد:',
	'wminc-code-collective' => 'کد "$1" به زبان خاصی ارجاع نمی‌دهد، ولی به مجموعه‌ای از زبان‌ها ارجاع می‌دهد، یعنی [[wikipedia:$2 language|زبان‌های «$3»]].',
	'wminc-code-retired' => 'کد زبان تغییر کرده است و دیگر به زبان اصلی ارجاع نمی‌دهد.',
);

/** Finnish (Suomi)
 * @author Cimon Avaro
 * @author Crt
 * @author Silvonen
 * @author Str4nd
 * @author Varusmies
 */
$messages['fi'] = array(
	'wminc-desc' => 'Testiwiki-järjestelmä Wikimedia-hautomoa varten',
	'wminc-testwiki' => 'Testiwiki:',
	'wminc-testwiki-none' => 'Ei lainkaan/Kaikki',
	'wminc-prefinfo-language' => 'Käyttöliittymän kieli – riippumaton testiwikistäsi',
	'wminc-prefinfo-code' => 'ISO 639:n mukainen kielilyhennekoodi',
	'wminc-prefinfo-project' => 'Valitse Wikimedia-hanke (Hautomossa tätä käyttävät ne jotka toimittavat yleisluontoisia askareita)',
	'wminc-prefinfo-error' => 'Olet valinnut hankkeen, joka vaatii kielikoodin.',
	'randombytest' => 'Satunnainen sivu testiwikistä',
	'randombytest-nopages' => 'Testiwikisi nimiavaruudessa $1 ei ole sivuja.',
	'wminc-viewuserlang' => 'Hae esiin käyttäjän kieli ja testiwiki',
	'wminc-viewuserlang-user' => 'Käyttäjätunnus:',
	'wminc-viewuserlang-go' => 'Siirry',
	'right-viewuserlang' => 'Nähdä [[Special:ViewUserLang|käyttäjän kieli ja testiwiki]]',
);

/** French (Français)
 * @author Crochet.david
 * @author IAlex
 * @author PieRRoMaN
 * @author Seb35
 * @author Sylvain2803
 * @author Urhixidur
 */
$messages['fr'] = array(
	'wminc-desc' => 'Système de test de wiki pour Wikimedia Incubator',
	'wminc-manual' => 'Manuel',
	'wminc-listwikis' => 'Liste des wikis',
	'wminc-testwiki' => 'Wiki de test :',
	'wminc-testwiki-none' => 'Aucun / tous',
	'wminc-recentchanges-all' => 'Toutes les modifications récentes',
	'wminc-prefinfo-language' => 'Votre langue d’interface - indépendante de celle de votre wiki de test',
	'wminc-prefinfo-code' => 'Le code ISO 639 de la langue',
	'wminc-prefinfo-project' => 'Sélectionnez le projet Wikimedia (l’option Incubator est destinée aux utilisateurs qui font un travail général)',
	'wminc-prefinfo-error' => 'Vous avez sélectionné un projet qui nécessite un code de langue.',
	'wminc-error-move-unprefixed' => "Erreur : La page vers laquelle vous tentez de renommer [[{{MediaWiki:Helppage}}|n'a pas de préfixe ou a un préfixe erroné]] !",
	'wminc-error-wronglangcode' => "'''Erreur :''' cette page contient un [[{{MediaWiki:Helppage}}|code de langue erroné]] \"\$1\" !",
	'wminc-error-unprefixed' => "'''Erreur :''' cette page n’a [[{{MediaWiki:Helppage}}|pas de préfixe]] !",
	'wminc-error-unprefixed-suggest' => "'''Erreur :''' cette page n’a [[{{MediaWiki:Helppage}}|pas de préfixe]] ! Vous pouvez créer une page sur : [[:$1]].",
	'wminc-error-wiki-exists' => 'Ce wiki existe déjà. Vous pouvez trouver cette page sur $1. Si le wiki a été récemment créé, veuillez attendre quelques heures ou jours afin que tout le contenu soit importé.',
	'randombytest' => 'Page aléatoire par le wiki de test',
	'randombytest-nopages' => 'Votre wiki de test ne contient pas de page dans l’espace de noms : $1.',
	'wminc-viewuserlang' => 'Voir la langue de l’utilisateur et son wiki de test',
	'wminc-viewuserlang-user' => 'Nom d’utilisateur :',
	'wminc-viewuserlang-go' => 'Aller',
	'wminc-userdoesnotexist' => "L'utilisateur « $1 » n'existe pas.",
	'right-viewuserlang' => 'Voir [[Special:ViewUserLang|la langue de l’utilisateur et le wiki de test]]',
	'wminc-code-macrolanguage' => 'La [[wikipedia:fr:$3|langue « $3 »]] est une [[wikipedia:fr:macro-langue|macro-langue]], comprenant les langues suivantes :',
	'wminc-code-collective' => 'Le code « $1 » ne se réfère pas à une langue spécifique, mais à une collection de langues, en particulier les [[wikipedia:fr:$3|langues « $3 »]]',
	'wminc-code-retired' => 'Ce code de langue a été changé est ne fait plus référence à la langue d’origine.',
);

/** Franco-Provençal (Arpetan)
 * @author Cedric31
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'wminc-desc' => 'Sistèmo de vouiqui d’èprôva por Wikimedia Covosa.',
	'wminc-manual' => 'Manuâl',
	'wminc-listwikis' => 'Lista des vouiquis',
	'wminc-testwiki' => 'Vouiqui d’èprôva :',
	'wminc-testwiki-none' => 'Nion / tôs',
	'wminc-recentchanges-all' => 'Tôs los dèrriérs changements',
	'wminc-prefinfo-language' => 'Voutra lengoua d’entèrface - endèpendenta de cela de voutron vouiqui d’èprôva',
	'wminc-prefinfo-code' => 'Lo code ISO 639 de la lengoua',
	'wminc-prefinfo-project' => 'Chouèsésséd lo projèt Wikimedia (lo chouèx Covosa est dèstinâ ux utilisators que font un travâly g·ènèral)',
	'wminc-prefinfo-error' => 'Vos éd chouèsi un projèt qu’at fôta d’un code lengoua.',
	'randombytest' => 'Pâge a l’hasârd per lo vouiqui d’èprôva',
	'randombytest-nopages' => 'Voutron vouiqui d’èprôva contint gins de pâge dens l’èspâço de noms : $1.',
	'wminc-viewuserlang' => 'Vêre la lengoua a l’utilisator et lo vouiqui d’èprôva',
	'wminc-viewuserlang-user' => 'Nom d’utilisator :',
	'wminc-viewuserlang-go' => 'Alar trovar',
	'wminc-userdoesnotexist' => 'L’utilisator « $1 » ègziste pas.',
	'right-viewuserlang' => 'Vêre la [[Special:ViewUserLang|lengoua a l’utilisator et lo vouiqui d’èprôva]]',
	'wminc-code-retired' => 'Ceti code lengoua at étâ changiê et fât pas més refèrence a la lengoua d’origina.',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'wminc-desc' => 'Sistema wiki de probas para a Incubadora da Wikimedia',
	'wminc-manual' => 'Manual',
	'wminc-listwikis' => 'Lista dos wikis',
	'wminc-testwiki' => 'Wiki de proba:',
	'wminc-testwiki-none' => 'Ningún/Todos',
	'wminc-recentchanges-all' => 'Todos os cambios recentes',
	'wminc-prefinfo-language' => 'A súa lingua da interface (independente do seu wiki de proba)',
	'wminc-prefinfo-code' => 'O código de lingua ISO 639',
	'wminc-prefinfo-project' => 'Seleccione o proxecto Wikimedia (a opción da Incubadora é para os usuarios que fan traballo xeral)',
	'wminc-prefinfo-error' => 'Escolleu un proxecto que precisa dun código de lingua.',
	'wminc-error-move-unprefixed' => 'Erro: A páxina de destino [[{{MediaWiki:Helppage}}|non ten prefixo ou este é incorrecto]]!',
	'wminc-error-wronglangcode' => "'''Erro:''' A páxina que intenta editar contén un [[{{MediaWiki:Helppage}}|código de lingua incorrecto]] (\"\$1\")!",
	'wminc-error-unprefixed' => "'''Erro:''' A páxina que intenta editar non ten [[{{MediaWiki:Helppage}}|prefixo]]!",
	'wminc-error-unprefixed-suggest' => "'''Erro:''' A páxina que intenta editar non ten [[{{MediaWiki:Helppage}}|prefixo]]! Pode crear unha páxina en \"[[:\$1]]\".",
	'randombytest' => 'Páxina ao chou para o wiki de proba',
	'randombytest-nopages' => 'O seu wiki de proba aínda non ten páxinas no espazo de nomes: $1.',
	'wminc-viewuserlang' => 'Olle a lingua de usuario e o wiki de proba',
	'wminc-viewuserlang-user' => 'Nome de usuario:',
	'wminc-viewuserlang-go' => 'Ir',
	'wminc-userdoesnotexist' => 'O usuario "$1" non existe.',
	'right-viewuserlang' => 'Ver [[Special:ViewUserLang|a lingua do usuario e o wiki de probas]]',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'wminc-testwiki' => 'Βίκι δοκιμή:',
	'wminc-testwiki-none' => 'Οὐδέν/Ἅπαντα',
	'wminc-prefinfo-code' => 'Ὁ κῶδιξ γλώσσης ISO 639',
	'wminc-viewuserlang-user' => 'Ὄνομα χρωμένου:',
	'wminc-viewuserlang-go' => 'Ἰέναι',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'wminc-desc' => 'Teschtwiki-Syschtem fir dr Wikimedia Incubator',
	'wminc-testwiki' => 'Teschtwiki:',
	'wminc-testwiki-none' => 'Keis/Alli',
	'wminc-prefinfo-language' => 'Sproch vu Dyyre Benutzeroberflächi - nit abhängig vum Teschtwiki',
	'wminc-prefinfo-code' => 'Dr ISO-639-Sprochcode',
	'wminc-prefinfo-project' => 'S Wikimedia-Projäkt, wu du dra schaffsch („Incubator“ fir Benutzer, wu allgmeini Ufgabe ibernämme)',
	'wminc-prefinfo-error' => 'Du hesch e Projäkt uusgwehlt, wu s e Sprochcode derfir brucht.',
	'randombytest' => 'Zuefallssyte no Teschtwiki',
	'randombytest-nopages' => 'S git kei Syte im Namensruum $1 in Dyym Teschtwiki.',
	'wminc-viewuserlang' => 'Benutzersproch un Teschtwiki aaluege',
	'wminc-viewuserlang-user' => 'Benutzername:',
	'wminc-viewuserlang-go' => 'Gang ane',
	'right-viewuserlang' => '[[Special:ViewUserLang|D Benutzersproch und s Teschtwiki]] aaluege',
);

/** Gujarati (ગુજરાતી)
 * @author Ashok modhvadia
 */
$messages['gu'] = array(
	'wminc-desc' => 'વિકિમીડિયા ઇનક્યુબેટર માટે પરિક્ષણ વિકિ પ્રણાલી',
	'wminc-testwiki' => 'પરિક્ષણ વિકિ:',
	'wminc-testwiki-none' => 'કોઇ પણ નહીં/તમામ',
	'wminc-prefinfo-language' => 'તમારી ઇન્ટરફેસ ભાષા - તમારા પરિક્ષણ વિકિથી સ્વતંત્ર',
	'wminc-prefinfo-code' => 'ISO ૬૩૯ ભાષા સંજ્ઞા',
	'wminc-prefinfo-project' => 'વિકિમીડિયા યોજના પસંદ કરો (સામાન્ય કાર્ય કરતા સભ્ય માટે ઇનક્યુબેટર વિકલ્પ)',
	'wminc-prefinfo-error' => 'તમે પસંદ કરેલ યોજના માટે ભાષા સંજ્ઞા જરૂરી છે.',
	'wminc-viewuserlang' => 'સભ્ય ભાષા અને પરિક્ષણ વિકિ જુઓ',
	'wminc-viewuserlang-user' => 'સભ્યનામ:',
	'wminc-viewuserlang-go' => 'જાઓ',
);

/** Hebrew (עברית)
 * @author Amire80
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'wminc-desc' => 'מערכת אתרי ויקי ניסיוניים עבור האינקובטור של ויקימדיה',
	'wminc-manual' => 'ספר הוראות',
	'wminc-listwikis' => 'רשימת אתרי ויקי',
	'wminc-testwiki' => 'אתר ויקי ניסיוני:',
	'wminc-testwiki-none' => 'הכול/לא כלום',
	'wminc-recentchanges-all' => 'כל השינויים האחרונים',
	'wminc-prefinfo-language' => 'שפת הממשק שלכם – בלתי תלויה באתר הוויקי הניסיוני שלכם',
	'wminc-prefinfo-code' => 'קוד השפה לפי ISO 639',
	'wminc-prefinfo-project' => 'בחרו אחד ממיזמי ויקימדיה (האפשרות "אינקובטור" מיועדת למשתמשים המבצעים עבודה כללית)',
	'wminc-prefinfo-error' => 'בחרתם במיזם הדורש קוד שפה.',
	'wminc-error-move-unprefixed' => 'שגיאה: הדף שאתם מנסים להעביר אליו [[{{MediaWiki:Helppage}}|אינו בעל תחילית או שהוא בעלת תחילית שאינה נכונה]]!',
	'wminc-error-wronglangcode' => "'''שגיאה:''' הדף הזה מכיל את [[{{MediaWiki:Helppage}}|קוד השפה השגוי]] \"\$1\"!",
	'wminc-error-unprefixed' => 'שגיאה: לדף הזה [[{{MediaWiki:Helppage}}|אין תחילית]]!',
	'wminc-error-unprefixed-suggest' => 'שגיאה: לדף הזה [[{{MediaWiki:Helppage}}|אין תחילית]]! אפשר ליצור דף בשם [[:$1]].',
	'wminc-error-wiki-exists' => 'הוויקי הזה כבר קיים. אפשר למצוא את הדף הזה בשם $1. אם הוויקי נוצר לאחרונה, נא לחכות מספר שעות או ימים עד שכל התוכן ייובא.',
	'wminc-error-wiki-sister' => 'הדף הזה שייך למיזם שלא מתארח כאן. הוויקי הזה נמצא באתר $1.',
	'randombytest' => 'דף אקראי באתר ויקי ניסיוני',
	'randombytest-nopages' => 'אין דפים באתר הוויקי הניסיוני שלכם, במרחב השם: $1.',
	'wminc-viewuserlang' => 'חיפוש שפת משתמש ואתר ויקי ניסיוני',
	'wminc-viewuserlang-user' => 'שם המשתמש:',
	'wminc-viewuserlang-go' => 'הצגה',
	'wminc-userdoesnotexist' => 'המשתמש "$1" אינו קיים.',
	'right-viewuserlang' => 'צפייה ב[[Special:ViewUserLang|שפת המשתמש ואתר הוויקי הניסיוני]]',
	'group-test-sysop' => 'מפעילי ויקי לבדיקה',
	'group-test-sysop-member' => 'מפעיל ויקי לבדיקה',
	'grouppage-test-sysop' => 'Project:מפעילי ויקי לבדיקה',
	'wminc-code-macrolanguage' => '[[wikipedia:$2 language|השפה "$3"]] היא [[wikipedia:ISO 639 macrolanguage|מקרו־שפה]], שמורכבת מהשפות הבאות:',
	'wminc-code-collective' => 'הקוד "$1" לא מתייחס לשפה מסוימת, אלא לאוסף שפות, [[wikipedia:$2 language|"$3"]].',
	'wminc-code-retired' => 'קוד השפה הזה השתנה וכבר אינו מתייחס לשפה המקורית.',
);

/** Hiligaynon (Ilonggo)
 * @author Tagimata
 */
$messages['hil'] = array(
	'wminc-desc' => 'Testing nga sistema wiki para sa Wikimedia Inkyubeytor',
	'wminc-testwiki' => 'Pagtilaw wiki:',
	'wminc-testwiki-none' => 'Wala/Tanan',
	'wminc-prefinfo-language' => 'Ang imo hambalanon nga interface - kahilwayan halin sa imo pagtilaw wiki',
	'wminc-prefinfo-code' => 'Ang ISO 639 lengwahe koda',
	'wminc-prefinfo-project' => 'Pilion ang Wikimedia proyekto (Inkyubeytor pilili-an ar para sa mga user nga nagahimo sang kabilugan nga obra)',
	'wminc-prefinfo-error' => 'Ginpili mo nga proyekto nga naga kilanlan sang lengwahe koda.',
	'randombytest' => 'Ginpalagpat-pagpili nga pahina sang test wiki',
	'randombytest-nopages' => 'Wala sang mga pahina sa imo nga test wiki, sa may ngalanespasyo: $1.',
	'wminc-viewuserlang' => 'Tan-awon ang user halamabalanon kag pagtilaw wiki',
	'wminc-viewuserlang-user' => 'Usarngalan:',
	'wminc-viewuserlang-go' => 'Lakat',
	'right-viewuserlang' => 'Tan-awon [[Special:ViewUserLang|user lengwahe kag pagtilaw wiki]]',
);

/** Croatian (Hrvatski)
 * @author Bugoslav
 * @author Ex13
 * @author Tivek
 */
$messages['hr'] = array(
	'wminc-desc' => 'Testni wiki sustav za Wikimedia Incubator',
	'wminc-testwiki' => 'Testni wiki:',
	'wminc-testwiki-none' => 'Nijedno/Sve',
	'wminc-recentchanges-all' => 'Sve nedavne promjene',
	'wminc-prefinfo-language' => 'Vaš jezik sučelja - neovisno o Vašem testnom wikiju',
	'wminc-prefinfo-code' => 'ISO 639 kôd jezika',
	'wminc-prefinfo-project' => 'Odaberi Wikimedia projekt (opcija Inkubator je za suradnike koji rade opće poslove)',
	'wminc-prefinfo-error' => 'Odabrali ste projekt koji zahtijeva kôd jezika.',
	'randombytest' => 'Slučajna stranica prema testnom wikiju',
	'randombytest-nopages' => 'Nema stranica u Vašem testnom wikiju, u imenskom prostoru: $1.',
	'wminc-viewuserlang' => 'Potraži jezik i testni wiki suradnika',
	'wminc-viewuserlang-user' => 'Suradničko ime:',
	'wminc-viewuserlang-go' => 'Idi',
	'wminc-userdoesnotexist' => 'Suradnik "$1" ne postoji.',
	'right-viewuserlang' => 'Pogledaj [[Special:ViewUserLang|suradnikov jezik i testni wiki]]',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'wminc-desc' => 'Testowy wikijowy system za Wikimedia Incubator',
	'wminc-testwiki' => 'Testowy wiki:',
	'wminc-testwiki-none' => 'Žadyn/Wšě',
	'wminc-prefinfo-language' => 'Rěč twojeho wužiwarskeho powjercha - wot twojeho testoweho wikija njewotwisna',
	'wminc-prefinfo-code' => 'Rěčny kod ISO 639',
	'wminc-prefinfo-project' => 'Wikimedijowy projekt wubrać (Incubatorowa opcija je za wužiwarjow, kotřiž powšitkowne dźěło činja)',
	'wminc-prefinfo-error' => 'Sy projekt wubrał, kotryž sej rěčny kod wužaduje.',
	'randombytest' => 'Připadna strona po testowym wikiju',
	'randombytest-nopages' => 'W twojim testowym wikiju w mjenowym rumje $1 strony njejsu.',
	'wminc-viewuserlang' => 'Wužiwarsku rěč a testowy wiki sej wobhladać',
	'wminc-viewuserlang-user' => 'Wužiwarske mjeno:',
	'wminc-viewuserlang-go' => 'Pokazać',
	'wminc-userdoesnotexist' => 'Wužiwar "$1" njeeksistuje.',
	'right-viewuserlang' => '[[Special:ViewUserLang|Wužiwarsku rěč a testowy wiki]] sej wobhladać',
);

/** Hungarian (Magyar)
 * @author Bdamokos
 * @author Glanthor Reviol
 * @author Xbspiro
 */
$messages['hu'] = array(
	'wminc-desc' => 'Tesztwiki rendszer a Wikimédia Inkubátorhoz',
	'wminc-testwiki' => 'Tesztwiki:',
	'wminc-testwiki-none' => 'Egyik sem/Mind',
	'wminc-recentchanges-all' => 'Minden friss változtatás',
	'wminc-prefinfo-language' => 'A felhasználói felületed nyelve – független a teszt wikidtől',
	'wminc-prefinfo-code' => 'Az ISO 639 szerinti nyelvkód. A fenti beállítás kiegészítése: a kettő együtt határozza meg, hogy melyik lesz az elsődleges tesztprojekted.',
	'wminc-prefinfo-project' => 'Melyik tesztprojektben dolgozol elsődlegesen? Ennek kezdőlapja és friss változtatásainak listája az oldalmenüben külön is elérhető lesz.',
	'wminc-prefinfo-error' => 'Olyan projektet választottál, amihez szükség van nyelvkódra.',
	'randombytest' => 'Véletlen lap a tesztwikiből',
	'randombytest-nopages' => 'Nincsenek lapok a teszt wikid $1 névterében.',
	'wminc-viewuserlang' => 'Felhasználó nyelvének és a tesztwikinek a felkeresése',
	'wminc-viewuserlang-user' => 'Felhasználói név:',
	'wminc-viewuserlang-go' => 'Menj',
	'right-viewuserlang' => '[[Special:ViewUserLang|felhasználó nyelv és teszt wiki]] megjelenítése',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'wminc-desc' => 'Systema pro wikis de test in Wikimedia Incubator',
	'wminc-manual' => 'Manual',
	'wminc-listwikis' => 'Lista de wikis',
	'wminc-testwiki' => 'Wiki de test:',
	'wminc-testwiki-none' => 'Nulle/Totes',
	'wminc-recentchanges-all' => 'Tote le modificationes recente',
	'wminc-prefinfo-language' => 'Le lingua de tu interfacie - independente de tu wiki de test',
	'wminc-prefinfo-code' => 'Le codice ISO 639 del lingua',
	'wminc-prefinfo-project' => 'Selige le projecto Wikimedia (le option Incubator es pro usatores qui face labor general)',
	'wminc-prefinfo-error' => 'Tu seligeva un projecto que require un codice de lingua.',
	'wminc-error-move-unprefixed' => 'Error: Le nove nomine de pagina [[{{MediaWiki:Helppage}}|non ha prefixo o ha un prefixo incorrecte]]!',
	'wminc-error-wronglangcode' => "'''Error:''' Iste pagina contine un [[{{MediaWiki:Helppage}}|codice de lingua incorrecte]] \"\$1\"!",
	'wminc-error-unprefixed' => "'''Error:''' Iste pagina [[{{MediaWiki:Helppage}}|non ha prefixo]]!",
	'wminc-error-unprefixed-suggest' => "'''Error:''' Iste pagina [[{{MediaWiki:Helppage}}|non ha prefixo]]! Tu pote crear un pagina con le nomine [[:$1]].",
	'wminc-error-wiki-exists' => 'Iste wiki jam existe. Tu pote trovar iste pagina a $1. Si le wiki esseva create recentemente, per favor attende alcun horas o dies usque tote le contento ha essite importate.',
	'wminc-error-wiki-sister' => 'Iste pagina pertine a un projecto que non es albergate hic. Per favor vade a $1 pro cercar le wiki.',
	'randombytest' => 'Pagina aleatori per le wiki de test',
	'randombytest-nopages' => 'Le wiki de test non ha paginas in le spatio de nomines: $1',
	'wminc-viewuserlang' => 'Vider le lingua de un usator e su wiki de test',
	'wminc-viewuserlang-user' => 'Nomine de usator:',
	'wminc-viewuserlang-go' => 'Ir',
	'wminc-userdoesnotexist' => 'Le usator "$1" non existe.',
	'right-viewuserlang' => 'Vider le [[Special:ViewUserLang|lingua e wiki de test de usatores]]',
	'group-test-sysop' => 'Administratores del wiki de test',
	'group-test-sysop-member' => 'administrator del wiki de test',
	'grouppage-test-sysop' => 'Project:Administratores del wiki de test',
	'wminc-code-macrolanguage' => 'Le [[wikipedia:$2 language|lingua "$3"]] es un [[wikipedia:ISO 639 macrolanguage|macrolingua]] que se compone del sequente linguas membros:',
	'wminc-code-collective' => 'Le codice "$1" non refere a un lingua specific, ma a un collection de linguas, a saper le [[wikipedia:$2 language|linguas "$3"]].',
	'wminc-code-retired' => 'Iste codice de lingua ha essite cambiate e non plus refere al lingua original.',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 * @author Irwangatot
 * @author IvanLanin
 * @author Kandar
 * @author Rex
 */
$messages['id'] = array(
	'wminc-desc' => 'Sistem wiki pengujian untuk Inkubator Wikimedia',
	'wminc-testwiki' => 'Wiki pengujian:',
	'wminc-testwiki-none' => 'Tidak ada/Semua',
	'wminc-prefinfo-language' => 'Bahasa antarmuka Anda - tidak terpengaruh oleh wiki pengujian Anda',
	'wminc-prefinfo-code' => 'Kode bahasa ISO 639',
	'wminc-prefinfo-project' => 'Pilih proyek Wikimedia (pilihan Inkubator adalah untuk pengguna-pengguna yang melakukan kerja umum)',
	'wminc-prefinfo-error' => 'Anda memilih sebuah proyek yang membutuhkan sebuah kode bahasa.',
	'randombytest' => 'Halaman sembarang oleh wiki percobaan',
	'randombytest-nopages' => 'Tidak ada halaman  wiki pengujian anda, dalam ruangnama: $1.',
	'wminc-viewuserlang' => 'Cari bahasa pengguna dan wiki pengujian',
	'wminc-viewuserlang-user' => 'Nama pengguna:',
	'wminc-viewuserlang-go' => 'Tuju ke',
	'wminc-userdoesnotexist' => 'Pengguna "$1" tidak ditemukan.',
	'right-viewuserlang' => 'Lihat [[Special:ViewUserLang|bahasa pengguna dan wiki pengujian]]',
);

/** Igbo (Igbo)
 * @author Ukabia
 */
$messages['ig'] = array(
	'wminc-testwiki' => 'Dàmatu wiki:',
	'wminc-testwiki-none' => 'Enwerö/Hánilé',
	'wminc-viewuserlang-go' => 'Gá',
);

/** Italian (Italiano)
 * @author Annayram
 * @author Beta16
 * @author Darth Kule
 * @author Gianfranco
 * @author HalphaZ
 * @author Melos
 * @author OrbiliusMagister
 */
$messages['it'] = array(
	'wminc-desc' => 'Sistema wiki di test per Wikimedia Incubator',
	'wminc-listwikis' => 'Elenco di wiki',
	'wminc-testwiki' => 'Test wiki:',
	'wminc-testwiki-none' => 'Nessuno/Tutti',
	'wminc-recentchanges-all' => 'Tutte le modifiche recenti',
	'wminc-prefinfo-language' => "La lingua dell'interfaccia - indipendente dal tuo wiki di test",
	'wminc-prefinfo-code' => 'Il codice ISO 639 per la lingua',
	'wminc-prefinfo-project' => "Seleziona il progetto Wikimedia (l'opzione Incubator è per gli utentu che fanno del lavoro generale)",
	'wminc-prefinfo-error' => 'Hai selezionato un progetto che ha bisogno di un codice di linguaggio',
	'wminc-error-move-unprefixed' => 'Errore: La pagina che stai cercando di spostare a [[{{MediaWiki:Helppage}}|è senza prefisso o ha un prefisso sbagliato]]!',
	'wminc-error-wronglangcode' => "'''Errore:''' Questa pagina contiene un [[{{MediaWiki:Helppage}}|codice lingua errato]] \"\$1\"!",
	'wminc-error-unprefixed' => "'''Errore:''' Questa pagina è [[{{MediaWiki:Helppage}}|senza prefisso]]!",
	'wminc-error-unprefixed-suggest' => "'''Errore:''' Questa pagina è [[{{MediaWiki:Helppage}}|senza prefisso]]! Puoi creare la pagina [[:$1]].",
	'randombytest' => 'Una pagina a caso dalla wiki di test',
	'randombytest-nopages' => 'Non ci sono pagine nella tua wiki di test, per il namespace: $1.',
	'wminc-viewuserlang' => 'Ricerca della lingua utente e del wiki di test',
	'wminc-viewuserlang-user' => 'Nome utente:',
	'wminc-viewuserlang-go' => 'Vai',
	'wminc-userdoesnotexist' => 'L\'utente "$1" non esiste.',
	'right-viewuserlang' => 'Visualizza [[Special:ViewUserLang|il linguaggio utente e prova il wiki]]',
	'wminc-code-macrolanguage' => 'La [[wikipedia:$2 language|lingua "$3"]] è una [[wikipedia:ISO 639 macrolanguage|macrolingua]], composta dalle seguenti lingue:',
	'wminc-code-retired' => 'Questo codice lingua è stato modificato e non si riferisce più alla lingua originale.',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fryed-peach
 * @author 青子守歌
 */
$messages['ja'] = array(
	'wminc-desc' => 'ウィキメディア・インキュベーター用の試験版ウィキシステム',
	'wminc-testwiki' => '試験版ウィキ:',
	'wminc-testwiki-none' => 'なし/すべて',
	'wminc-prefinfo-language' => 'あなたのインタフェース言語 (あなたの試験版ウィキとは独立しています)',
	'wminc-prefinfo-code' => 'ISO 639 言語コード',
	'wminc-prefinfo-project' => 'ウィキメディア・プロジェクトを選択する (「Incubator」オプションは全般的な作業を行う利用者のためのものです)',
	'wminc-prefinfo-error' => 'あなたが選択したプロジェクトは言語コードが必要です。',
	'randombytest' => '試験版ウィキによるおまかせ表示',
	'randombytest-nopages' => 'あなたの試験版ウィキには名前空間 $1 にページがありません。',
	'wminc-viewuserlang' => '利用者の言語と試験版ウィキを探す',
	'wminc-viewuserlang-user' => '利用者名：',
	'wminc-viewuserlang-go' => '表示',
	'right-viewuserlang' => '[[Special:ViewUserLang|利用者言語と試験版ウィキ]]を見る',
);

/** Javanese (Basa Jawa)
 * @author Pras
 */
$messages['jv'] = array(
	'wminc-desc' => 'Sistem pangujian wiki kanggo Inkubator Wikimedia',
	'wminc-testwiki' => 'Wiki pangujian:',
	'wminc-testwiki-none' => 'Ora ana/Kabèh',
	'wminc-prefinfo-language' => 'Basa adu-rai panjenengan - indhepèndhen saka wiki pacoban panjenengan',
	'wminc-prefinfo-code' => 'Kodhe basa ISO 639',
	'wminc-prefinfo-project' => 'Pilih proyèk Wikimedia (pilihan inkubator iku kanggo para panganggo sing ngayahi kerja umum)',
	'wminc-prefinfo-error' => 'Panjenengan milih sawijining proyèk sing mbutuhaké sawijining kodhe basa.',
	'wminc-viewuserlang' => 'Golèki basa panganggo lan wiki pangujian',
	'wminc-viewuserlang-user' => 'Jeneng panganggo:',
	'wminc-viewuserlang-go' => 'Tumuju menyang',
	'right-viewuserlang' => 'Pirsani [[Special:ViewUserLang|basa panganggo lan wiki pacoban]]',
);

/** Georgian (ქართული)
 * @author BRUTE
 */
$messages['ka'] = array(
	'wminc-recentchanges-all' => 'ყველა ბოლო ცვლილება',
);

/** Khmer (ភាសាខ្មែរ)
 * @author វ័ណថារិទ្ធ
 */
$messages['km'] = array(
	'wminc-desc' => 'សាកល្បង​ប្រព័ន្ធ​វិគី​សម្រាប់​ Wikimedia Incubator',
	'wminc-testwiki' => 'សាកល្បង​វីគី៖',
	'wminc-testwiki-none' => 'គ្មាន​/ទាំងអស់​',
	'wminc-prefinfo-code' => 'លេខ​កូដ​ភាសា​ ISO 639',
	'wminc-prefinfo-error' => 'អ្នក​បាន​ជ្រើសរើស​គម្រោង​មួយ​ដែល​ត្រូវការ​លេខ​កូដ​ភាសា​។',
	'wminc-viewuserlang' => 'រក​មើល​ភាសា​អ្នក​ប្រើប្រាស់​និង​សាក​ល្បង​វិគី​',
	'wminc-viewuserlang-user' => 'អ្នកប្រើប្រាស់​៖',
	'wminc-viewuserlang-go' => 'ទៅ​',
	'right-viewuserlang' => 'មើល​[[Special:ViewUserLang|ភាសា​អ្នកប្រើប្រាស់​និងធ្វើការ​សាកល្បង​វិគី]]',
);

/** Kannada (ಕನ್ನಡ)
 * @author Nayvik
 */
$messages['kn'] = array(
	'wminc-viewuserlang-go' => 'ಹೋಗು',
);

/** Korean (한국어)
 * @author Kwj2772
 * @author Pakman
 */
$messages['ko'] = array(
	'wminc-desc' => '위키미디어 인큐베이터의 테스트 위키 시스템',
	'wminc-prefinfo-code' => 'ISO 639 언어 코드',
	'wminc-viewuserlang' => '사용자 언어와 테스트 위키 찾기',
	'wminc-viewuserlang-user' => '사용자이름:',
	'wminc-viewuserlang-go' => '찾기',
);

/** Komi-Permyak (Перем Коми)
 * @author Enye Lav
 */
$messages['koi'] = array(
	'wminc-viewuserlang-user' => 'Уджкерисьлöн ним:',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'wminc-desc' => 'Süßtemm för Versöhkß-Wikis för dä Inkubator vun de Wikimedia Shtefftung',
	'wminc-manual' => 'Handbooch',
	'wminc-listwikis' => 'Leß met de Wikis',
	'wminc-testwiki' => 'Et Versöhkß-Wiki:',
	'wminc-testwiki-none' => 'Kein/All',
	'wminc-recentchanges-all' => 'All de {{LCFIRST:{{int:recentchanges}}}}',
	'wminc-prefinfo-language' => 'Ding Shprooch för däm Wiki sing Bovverfläsch un et Wiki ze bedeene — hät nix met Dingem Versöhkß-Wiki singe Shprooch ze donn',
	'wminc-prefinfo-code' => 'Dat Köözel för di Shprooch noh dä Norrem ISO 639',
	'wminc-prefinfo-project' => 'Donn dat Projäk ußwähle — „Incubator“ is för Lück met alljemein Werk.',
	'wminc-prefinfo-error' => 'Bei dämm Projäk moß och e Köözel för de Shprooch aanjejovve wääde.',
	'wminc-error-move-unprefixed' => 'Dat es jeiht nit: Dä neue Name för di Sigg hät [[{{MediaWiki:Helppage}}|kei udder e verkeeht Köözel]] am Aanfang!',
	'wminc-error-wronglangcode' => "'''Dat es jeiht nit:''' Di Sigg häd [[{{MediaWiki:Helppage}}|e verkeeht Köözel för de Shprooch]], dat es: „$1“",
	'wminc-error-unprefixed' => "'''Dat es jeiht nit:''' Di Sigg hät kei [[{{MediaWiki:Helppage}}|Köözel am Aanfang]]!",
	'wminc-error-unprefixed-suggest' => "'''Dat es jeiht nit:''' Di Sigg hät kei [[{{MediaWiki:Helppage}}|Köözel am Aanfang]]! Do kanns en Sigg onger [[:$1]] aanlääje.",
	'wminc-error-wiki-exists' => 'Dat Wiki jidd_et ald. Do kanns di Sigg op $1 fenge. Wann dat Wiki jraad neu opjemaat woode sin sullt, donn e paa Shtonde udder a paa Dääsch waade, bes dat alle Sigg von heh noh doh erövver jehollt woode sen.',
	'randombytest' => 'En zohfällije Sigg uss_em Versöhkß-Wiki',
	'randombytest-nopages' => 'En Appachtemang $1 sin kein Sigge uß Dingem Versöhkß-Wiki.',
	'wminc-viewuserlang' => 'Däm Metmaacher sing Shprooch un sing Versöhkß-Wiki aanloore',
	'wminc-viewuserlang-user' => 'Däm Metmaacher singe Name:',
	'wminc-viewuserlang-go' => 'Lohß Jonn!',
	'wminc-userdoesnotexist' => 'Ene Metmaacher „$1“ jidd_et nit.',
	'right-viewuserlang' => 'De [[Special:ViewUserLang|Metmaacher ier Shprooch un Versöhkß-Wiki]] beloore',
	'group-test-sysop' => 'Köbeße för e Versöhkß-Wiki',
	'group-test-sysop-member' => 'Köbes för e Versöhkß-Wiki',
	'grouppage-test-sysop' => 'Project:Köbeße för Versöhkß-Wikis',
	'wminc-code-macrolanguage' => 'De Sprooch „[[wikipedia:$2 language|$3]]“ is en [[wikipedia:ksh:Makroshprooch (ISO 639-3)|Makroshprooch noh ISO 639-3]], woh heh di Shprooche bei jehüre:',
	'wminc-code-collective' => 'Dat Köözel „$1“ es nit för en bestemmpte Shprooch, söndern för en Sammlong vun Shprooche, nämmlesch de [[wikipedia:$2 language|$3 Shprooche]].',
	'wminc-code-retired' => 'Dat Köözel fö di Shprooch wood jeändert un deiht nit mieh för di Shprooch.',
);

/** Kurdish (Latin) (Kurdî (Latin))
 * @author George Animal
 */
$messages['ku-latn'] = array(
	'wminc-prefinfo-code' => 'Koda ISO 639 a ziman',
	'wminc-viewuserlang-user' => 'Navê bikarhêner:',
	'wminc-viewuserlang-go' => 'Biçe',
);

/** Cornish (Kernowek)
 * @author Kernoweger
 * @author Kw-Moon
 */
$messages['kw'] = array(
	'wminc-testwiki-none' => 'Nagonen/Oll',
	'wminc-prefinfo-code' => 'Coden ISO 639 an yeth',
	'wminc-viewuserlang-user' => 'Hanow-usyer:',
	'wminc-viewuserlang-go' => 'Ke',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'wminc-desc' => 'Testwiki-System fir de Wikimedia-Incubator',
	'wminc-manual' => 'Handbuch',
	'wminc-listwikis' => 'Lëscht vun de Wikien',
	'wminc-testwiki' => 'Test-Wiki:',
	'wminc-testwiki-none' => 'Keen/All',
	'wminc-recentchanges-all' => 'All rezent Ännerungen',
	'wminc-prefinfo-language' => 'Sprooch vun ärem Interface - onofhängeg vun Ärer Test-Wiki',
	'wminc-prefinfo-code' => 'Den ISO 639 Sprooche-Code',
	'wminc-prefinfo-project' => "Wielt de Wikimediaprojet (D'Optioun 'Incubator' ass fir Benotzer déi allgemeng Aufgaben erledigen)",
	'wminc-prefinfo-error' => 'Dir hutt e Projet gewielt deen e Sproochecode brauch.',
	'wminc-error-wronglangcode' => "'''Feeler:''' Op dëser Säit ass e [[{{MediaWiki:Helppage}}|falsche Sproochecode]] \"\$1\"!",
	'randombytest' => 'Zoufallssäit duerch Test Wiki',
	'randombytest-nopages' => 'Et si keng Säiten op Ärer Test-Wiki, am Nummraum: $1.',
	'wminc-viewuserlang' => 'Benotzersprooch an Test-Wiki nokucken',
	'wminc-viewuserlang-user' => 'Benotzernumm:',
	'wminc-viewuserlang-go' => 'Lass',
	'wminc-userdoesnotexist' => "De Benotzer ''$1'' gëtt et net.",
	'right-viewuserlang' => '[[Special:ViewUserLang|Benotzersprooch an Test-Wiki]] weisen',
	'wminc-code-retired' => "Dëse Sproochcode gouf geännert a bezitt sech net méi op d'Original-Sprooch.",
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 */
$messages['li'] = array(
	'wminc-desc' => 'Teswikisysteem veur Wikimedia Inkubater',
	'wminc-testwiki' => 'Teswiki:',
	'wminc-testwiki-none' => 'Gein/al',
	'wminc-prefinfo-language' => 'Dien oeterliksspraok - ónaafhenkelik van diene teswiki',
	'wminc-prefinfo-code' => 'De ISO 639-spraokcode',
	'wminc-prefinfo-project' => "Selecteer 't Wikimediaprojek (inkubateroptie is veur gebroekers die algemein wèrk doon)",
	'wminc-prefinfo-error' => "Doe selecteerdes e projek det 'n spraokcode gebroek.",
	'randombytest' => 'Willekäörige pazjena oete teswiki',
	'randombytest-nopages' => "d'r Zeen gein pazjena's in diene teswiki inne naamruumdje $1.",
	'wminc-viewuserlang' => 'Zeuk de gebroekersspraok en teswiki óp',
	'wminc-viewuserlang-user' => 'Gebroekersnaam:',
	'wminc-viewuserlang-go' => 'Gank',
	'right-viewuserlang' => '[[Special:ViewUserLang|Bekiek gebroekersspraok en teswiki]]',
);

/** Lithuanian (Lietuvių)
 * @author Eitvys200
 * @author Hugo.arg
 */
$messages['lt'] = array(
	'wminc-desc' => 'Wiki testasvimo sistema Vikimedija Inkubatoriui',
	'wminc-testwiki' => 'Testavimo wiki:',
	'wminc-testwiki-none' => 'Nei vienas/Visi',
	'wminc-prefinfo-language' => 'Jūsų sąsajos kalba - nepriklausomai nuo jūsų testavimo wiki',
	'wminc-prefinfo-code' => 'ISO 639 kalbos kodas',
	'wminc-prefinfo-error' => 'Jūs pasirinkote projektą, kuriam reikia kalbos kodo.',
	'randombytest' => 'Atsitiktinis puslapis iš testavimo wiki',
	'wminc-viewuserlang' => 'Ieškoti vartotojo kalbos ir testavimo wiki',
	'wminc-viewuserlang-user' => 'Naudotojo vardas:',
	'wminc-viewuserlang-go' => 'Eiti',
	'wminc-userdoesnotexist' => 'Vartotojas " $1 "neegzistuoja.',
	'right-viewuserlang' => 'Žiūrėti [[Special:ViewUserLang|naudotojo kalbą ir testavimo wiki]]',
);

/** Latvian (Latviešu)
 * @author Xil
 */
$messages['lv'] = array(
	'wminc-testwiki' => 'Testa projekts:',
	'wminc-prefinfo-language' => 'Tava interfeisa valoda - nav saistīta ar testa projektu, kurā tu piedalies',
	'wminc-prefinfo-code' => 'ISO 639 valodas kods',
	'wminc-prefinfo-project' => 'Izvēlēties Wikimedia projektu (iespēja Incubator ir domāta tiem lietotājiem, kuri darbojas inkubatorā vispār, nevis konkrētos testa projektos)',
	'wminc-prefinfo-error' => 'Jūs izvēlējāties projektu, bet nenorādījāt valodas kodu',
	'wminc-viewuserlang' => 'Sameklēt lietotāja valodu un testa projektu',
	'wminc-viewuserlang-user' => 'Lietotājvārds:',
	'wminc-viewuserlang-go' => 'Aiziet!',
	'right-viewuserlang' => 'Apskatīt [[Special:ViewUserLang|lietotāja valodu un testa projektu]]',
);

/** Lazuri (Lazuri)
 * @author Bombola
 */
$messages['lzz'] = array(
	'wminc-prefinfo-code' => "ISO 639 nena k'odi",
	'wminc-viewuserlang-go' => 'İgzali',
);

/** Malagasy (Malagasy)
 * @author Jagwar
 */
$messages['mg'] = array(
	'wminc-testwiki' => 'Wiki fanandramana :',
	'wminc-testwiki-none' => 'Tsy misy / izy rehetra',
	'wminc-prefinfo-language' => "Ny ten'ny rindrankajy ho anao - tsy mifatotra amin'ny wiki fanandramanao",
	'wminc-prefinfo-code' => 'Kaody ISO 639 ny teny',
	'wminc-prefinfo-error' => 'Nisafidy tetikasa mila kaodim-piteny ianao.',
	'wminc-viewuserlang-user' => 'Solonanarana :',
	'wminc-viewuserlang-go' => 'Andana',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'wminc-desc' => 'Тестирање на вики-систем за Викимедија Инкубаторот',
	'wminc-manual' => 'Прирачник',
	'wminc-listwikis' => 'Список на викија',
	'wminc-testwiki' => 'Тест-вики:',
	'wminc-testwiki-none' => 'Ништо/Сè',
	'wminc-recentchanges-all' => 'Сите скорешни промени',
	'wminc-prefinfo-language' => 'Јазикот на вашиот посредник - назависно од вашето тест-вики',
	'wminc-prefinfo-code' => 'Јазичниот ISO 639 код',
	'wminc-prefinfo-project' => 'Изберете го проектот (можноста за Инкубатор е за корисници кои работат општи задачи)',
	'wminc-prefinfo-error' => 'Избравте проект на кој му треба јазичен код.',
	'wminc-error-move-unprefixed' => 'Грешка: Страницата што сакате да ја преместите на [[{{MediaWiki:Helppage}}|нема префикс или префиксот ѝ е грешен]]!',
	'wminc-error-wronglangcode' => "'''Грешка:''' Страницава содржи [[{{MediaWiki:Helppage}}|погрешен јазичен код]] „$1“!",
	'wminc-error-unprefixed' => "'''Грешка:''' Страницава [[{{MediaWiki:Helppage}}|нема префикс]]!",
	'wminc-error-unprefixed-suggest' => "'''Грешка:''' Страницава [[{{MediaWiki:Helppage}}|нема префикс]]! Можете да создадете страница на [[:$1]].",
	'wminc-error-wiki-exists' => 'Ова вики веќе постои. Страницата ќе ја најдете на $1. Ако в икито е новосоздадено, почекајте неколку часа или дена за да се увезат сите содржини.',
	'wminc-error-wiki-sister' => 'Оваа страница припаѓа на проект што не е вдомен тука. Појдете на $1 за да го пронајдете викито.',
	'randombytest' => 'Случајна страница од тест вики',
	'randombytest-nopages' => 'Не постојат страници на вашето пробно вики, во именскиот простор: $1.',
	'wminc-viewuserlang' => 'Провери го јазикот на корисникот и неговото тест-вики',
	'wminc-viewuserlang-user' => 'Корисничко име:',
	'wminc-viewuserlang-go' => 'Оди',
	'wminc-userdoesnotexist' => 'Корисникот „$1“ не постои.',
	'right-viewuserlang' => 'Погледајте [[Special:ViewUserLang|кориснички јазик и текст вики]]',
	'group-test-sysop' => 'Администратори на пробно вики',
	'group-test-sysop-member' => 'администратор на пробно вики',
	'grouppage-test-sysop' => 'Project:Администратори на пробни викија',
	'wminc-code-macrolanguage' => '[[wikipedia:$2 language|Јазикот „$3“]] е [[wikipedia:ISO 639 macrolanguage|макројазик]], кој се состои од следниве јазици:',
	'wminc-code-collective' => 'Кодот „$1“ не се однесува на поединечен јазик, туку на збирот јазици наречен [[wikipedia:$2 language|„$3“ јазици]].',
	'wminc-code-retired' => 'Овој јазичен код е изменет и повеќе не се однесува на првоназначениот јазик.',
);

/** Malayalam (മലയാളം)
 * @author Junaidpv
 * @author Praveenp
 */
$messages['ml'] = array(
	'wminc-desc' => 'വിക്കിമീഡിയ ഇൻകുബേറ്ററിനുള്ള പരീക്ഷണ വിക്കി വ്യവസ്ഥ',
	'wminc-manual' => 'സഹായഗ്രന്ഥം',
	'wminc-listwikis' => 'വിക്കികളുടെ പട്ടിക',
	'wminc-testwiki' => 'പരീക്ഷണ വിക്കി:',
	'wminc-testwiki-none' => 'ഒന്നുമില്ല/എല്ലാം',
	'wminc-recentchanges-all' => 'എല്ലാ സമീപകാല മാറ്റങ്ങളും',
	'wminc-prefinfo-language' => 'താങ്കളുടെ സമ്പർക്കമുഖ ഭാഷ - താങ്കളുടെ പരീക്ഷണ വിക്കിയിൽ നിന്ന് സ്വതന്ത്രം',
	'wminc-prefinfo-code' => 'ISO 639 ഭാഷാ കോഡ്',
	'wminc-prefinfo-project' => 'വിക്കിമീഡിയ പദ്ധതി തിരഞ്ഞെടുക്കുക (സാധാരണ പ്രവൃത്തികൾ ചെയ്യുന്ന ഉപയോക്താക്കൾക്കാണ് ഇൻകുബേറ്റർ ഐച്ഛികം)',
	'wminc-prefinfo-error' => 'ഭാഷാ കോഡ് വേണ്ട ഒരു പദ്ധതിയാണ് താങ്കൾ തിരഞ്ഞെടുത്തിരിക്കുന്നത്.',
	'wminc-error-move-unprefixed' => 'പിഴവ്: താങ്കൾ മാറ്റാൻ ശ്രമിക്കുന്ന താൾ [[{{MediaWiki:Helppage}}|പൂർവ്വപദം ഇല്ലാത്തതോ തെറ്റായി പൂർവ്വപദത്തോടു കൂടിയതോ ആണ്]]!',
	'wminc-error-wronglangcode' => "'''പിഴവ്:''' ഈ താളിൽ [[{{MediaWiki:Helppage}}|തെറ്റായ ഭാഷാ കോഡ്]] \"\$1\" ആണുള്ളത്!",
	'wminc-error-unprefixed' => "'''പിഴവ്:''' ഈ താളിന് [[{{MediaWiki:Helppage}}|പൂർവ്വപദമില്ല]]!",
	'wminc-error-unprefixed-suggest' => "'''പിഴവ്:''' ഈ താളിന് [[{{MediaWiki:Helppage}}|പൂർവ്വപദമില്ല]]! താങ്കൾക്ക് [[:$1]]-ൽ ഒരു താൾ സൃഷ്ടിക്കാവുന്നതാണ്.",
	'wminc-error-wiki-exists' => 'ഈ വിക്കി നിലവിലുണ്ട്. ഈ താൾ താങ്കൾക്ക് $1-ൽ കാണാവുന്നതാണ്. ഈ വിക്കി സമീപകാലത്ത് സൃഷ്ടിച്ചതാണെങ്കിൽ, എല്ലാ ഉള്ളടക്കവും ഇറക്കുമതി ചെയ്യാനായി ഏതാനം മണിക്കൂറുകളോ ദിവസങ്ങളോ ദയവായി കാത്തിരിക്കുക.',
	'wminc-error-wiki-sister' => 'ഈ താൾ മറ്റെവിടെയോ ഹോസ്റ്റ് ചെയ്തിട്ടുള്ള പദ്ധതിയുടെ ഭാഗമാണ്. ദയവായി  $1 സന്ദർശിച്ച് വിക്കിയേതാണെന്ന് കണ്ടെത്തുക.',
	'randombytest' => 'പരീക്ഷണ വിക്കിയിൽ നിന്നും ക്രമരഹിതമായി എടുത്ത താൾ',
	'randombytest-nopages' => 'ഈ നാമമേഖലയിൽ പരീക്ഷണ വിക്കിയിൽ താങ്കൾക്ക് ഒരു താളും ഇല്ല: $1.',
	'wminc-viewuserlang' => 'താങ്കളുടെ പരീക്ഷണ വിക്കിയും ഉപയോക്തൃഭാഷയും നോക്കുക',
	'wminc-viewuserlang-user' => 'ഉപയോക്തൃനാമം:',
	'wminc-viewuserlang-go' => 'പോകൂ',
	'wminc-userdoesnotexist' => '"$1" എന്ന ഉപയോക്താവ് നിലവിലില്ല.',
	'right-viewuserlang' => '[[Special:ViewUserLang|ഉപയോക്തൃഭാഷയും പരീക്ഷണ വിക്കിയും]] കാണുക',
	'group-test-sysop' => 'പരീക്ഷണവിക്കി കാര്യനിർവ്വാഹകർ',
	'group-test-sysop-member' => 'പരീക്ഷണവിക്കി കാര്യനിർവ്വാഹക(ൻ)',
	'grouppage-test-sysop' => 'Project:പരീക്ഷണവിക്കി കാര്യനിർവ്വാഹകർ',
	'wminc-code-macrolanguage' => '[[wikipedia:$2 language|"$3" എന്ന ഭാഷ]] ഒരു [[wikipedia:ISO 639 macrolanguage|ചെറുഭാഷയാണ്]], അത് ഉൾക്കൊള്ളുന്ന അംഗഭാഷകൾ ഇനി നൽകുന്നു:',
	'wminc-code-collective' => '"$1" എന്ന കോഡ് ഒരു പ്രത്യേക ഭാഷയെ പ്രതിനിധീകരിക്കുന്നില്ല, മറിച്ച് [[wikipedia:$2 language|"$3" ഭാഷകൾ]] എന്ന ഒരു കൂട്ടം ഭാഷകളാണ്.',
	'wminc-code-retired' => 'ഈ ഭാഷാ കോഡ് മാറിയിരിക്കുന്നു, യഥാർത്ഥ ഭാഷയെ അത് പ്രതിനിധീകരിക്കുന്നില്ല.',
);

/** Mongolian (Монгол)
 * @author Chinneeb
 */
$messages['mn'] = array(
	'wminc-viewuserlang-user' => 'Хэрэглэгчийн нэр:',
	'wminc-viewuserlang-go' => 'Явах',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 * @author Aurora
 * @author Yosri
 */
$messages['ms'] = array(
	'wminc-desc' => 'Sistem wiki ujian untuk Wikimedia Incubator',
	'wminc-manual' => 'Manual',
	'wminc-listwikis' => 'Senarai wiki',
	'wminc-testwiki' => 'Wiki ujian:',
	'wminc-testwiki-none' => 'Tiada/Semua',
	'wminc-recentchanges-all' => 'Semua perubahan terkini',
	'wminc-prefinfo-language' => 'Bahasa antaramuka anda - bebas dari wiki ujian anda',
	'wminc-prefinfo-code' => 'Kod bahasa ISO 639',
	'wminc-prefinfo-project' => 'Pilih projek Wikimedia (pilihan Incubator ialah bagi pengguna yang membuat kerja umum)',
	'wminc-prefinfo-error' => 'Anda memilih projek yang memerlukan kod bahasa.',
	'wminc-error-move-unprefixed' => 'Ralat: Laman yang anda cuba pindahkan itu [[{{MediaWiki:Helppage}}|tiada awalan atau tersalah awalan]]!',
	'wminc-error-wronglangcode' => "'''Ralat:''' Laman ini mengandungi [[{{MediaWiki:Helppage}}|kod bahasa yang salah]] \"\$1\"!",
	'wminc-error-unprefixed' => "'''Ralat:''' Laman ini [[{{MediaWiki:Helppage}}|tiada awalan]]!",
	'wminc-error-unprefixed-suggest' => "'''Error:''' Laman ini [[{{MediaWiki:Helppage}}|tiada awalan]]! Anda boleh membuat laman baru di [[:$1]].",
	'wminc-error-wiki-exists' => 'Wiki ini sudah wujud. Anda boleh mencari laman ini di $1. Jika wiki itu baru dibuka, sila tunggu beberapa jam atau beberapa hari sehingga semua kandungan diimport.',
	'wminc-error-wiki-sister' => 'Laman ini tergolong dalam projek yang tidak dihoskan di sini. Sila ke $1 untuk mencari wikinya.',
	'randombytest' => 'Laman rawak oleh wiki ujian',
	'randombytest-nopages' => 'Tidak terdapat laman dalam wiki ujian anda, dalam ruang nama: $1.',
	'wminc-viewuserlang' => 'Lihat bahasa pengguna dan wiki ujian',
	'wminc-viewuserlang-user' => 'Nama pengguna:',
	'wminc-viewuserlang-go' => 'Pergi',
	'wminc-userdoesnotexist' => 'Pengguna "$1" tidak wujud.',
	'right-viewuserlang' => 'Melihat [[Special:ViewUserLang|bahasa pengguna dan wiki ujian]]',
	'group-test-sysop' => 'Pentadbir wiki ujian',
	'group-test-sysop-member' => 'pentadir wiki ujian',
	'grouppage-test-sysop' => 'Project:Pentadbir wiki ujian',
	'wminc-code-macrolanguage' => '[[wikipedia:$2 language|Bahasa "$3"]] ialah sejenis [[wikipedia:ISO 639 macrolanguage|bahasa makro]], yang terdiri daripada bahasa-bahasa ahli yang berikut:',
	'wminc-code-collective' => 'Kod "$1" tidak merujuk kepada satu bahasa yang tertentu, sebaliknya merujuk kepada koleksi bahasa, iaitu [[wikipedia:$2 language|rumpun bahasa "$3"]].',
	'wminc-code-retired' => 'Kod bahasa ini sudah berubah dan tidak lagi merujuk kepada bahasa asal.',
);

/** Maltese (Malti)
 * @author Chrisportelli
 */
$messages['mt'] = array(
	'wminc-viewuserlang-go' => 'Mur',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'wminc-testwiki-none' => 'Мезеяк/Весе',
	'wminc-viewuserlang-user' => 'Сёрмадыцянь леметь:',
);

/** Nedersaksisch (Nedersaksisch)
 * @author Servien
 */
$messages['nds-nl'] = array(
	'wminc-desc' => 'Testwikisysteem veur de Wikimedia Incubator',
	'wminc-testwiki' => 'Testwiki:',
	'wminc-testwiki-none' => 'Gien/alles',
	'wminc-prefinfo-language' => 'De gebrukerstaal - onaofhankelik van joew testwiki',
	'wminc-prefinfo-code' => 'De ISO639-taalkode',
	'wminc-prefinfo-project' => 'Kies t Wikimedia-projekt (Incubator-opsie is veur gebrukers die algemeen wark doon)',
	'wminc-prefinfo-error' => "Je hebben ekeuzen veur n projekt waor da'j n taalkode veur neudig hebben.",
	'wminc-viewuserlang' => 'Gebrukerstaal en testwiki opzeuken',
	'wminc-viewuserlang-user' => 'Gebrukersnaam:',
	'wminc-viewuserlang-go' => 'Zeuken',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'wminc-desc' => 'Testwiki-systeem voor Wikimedia Incubator',
	'wminc-manual' => 'Handleiding',
	'wminc-listwikis' => "Lijst met wiki's",
	'wminc-testwiki' => 'Testwiki:',
	'wminc-testwiki-none' => 'Geen/alles',
	'wminc-recentchanges-all' => 'Alle recente wijzigingen',
	'wminc-prefinfo-language' => 'Uw interfacetaal - onafhankelijk van uw testwiki',
	'wminc-prefinfo-code' => 'De ISO 639-taalcode',
	'wminc-prefinfo-project' => 'Selecteer het Wikimedia-project (Incubator-optie is voor gebruikers die algemeen werk doen)',
	'wminc-prefinfo-error' => 'U selecteerde een project dat een taalcode nodig heeft.',
	'wminc-error-move-unprefixed' => 'Fout: De doelpagina waarnaar u probeert te hernoemen [[{{MediaWiki:Helppage}}|heeft geen of een verkeerd voorvoegsel]]!',
	'wminc-error-wronglangcode' => "'''Fout:''' Deze pagina bevat een [[{{MediaWiki:Helppage}}|verkeerde taalcode]] \"\$1\".",
	'wminc-error-unprefixed' => "'''Fout:''' Deze pagina heeft [[{{MediaWiki:Helppage}}|geen voorvoegsel]]!",
	'wminc-error-unprefixed-suggest' => "'''Fout:''' Deze pagina heeft [[{{MediaWiki:Helppage}}|geen voorvoegsel]]. U kunt een pagina aanmaken op [[:$1]].",
	'wminc-error-wiki-exists' => 'Deze wiki bestaat al. U kunt deze pagina vinden op $1. Als de wiki onlangs gemaakt is, wacht dan enkele uren of dagen totdat alle inhoud is geïmporteerd.',
	'wminc-error-wiki-sister' => 'Deze pagina behoort tot een project dat hier niet wordt gehost. Ga naar $1 om de wiki te vinden.',
	'randombytest' => 'Willekeurige pagina uit testwiki',
	'randombytest-nopages' => "Er zijn geen pagina's in uw testwiki in de naamruimte $1.",
	'wminc-viewuserlang' => 'Gebruikerstaal en testwiki opzoeken',
	'wminc-viewuserlang-user' => 'Gebruikersnaam:',
	'wminc-viewuserlang-go' => 'OK',
	'wminc-userdoesnotexist' => 'De gebruiker "$1" bestaat niet.',
	'right-viewuserlang' => '[[Special:ViewUserLang|Gebruikerstaal en test wiki]] bekijken',
	'group-test-sysop' => 'testwiki-beheerders',
	'group-test-sysop-member' => 'testwiki-beheerder',
	'grouppage-test-sysop' => 'Project:Testwiki-beheerders',
	'wminc-code-macrolanguage' => 'De [[wikipedia:$2 language|taal "$3"]] is een [[wikipedia:nl:Macrotaal|macrotaal]], die bestaat uit de volgende talen:',
	'wminc-code-collective' => 'De code "$1" verwijst niet naar een specifieke taal, maar naar een verzameling talen, namelijk de [[wikipedia:$2 language|"$3" talen.]]',
	'wminc-code-retired' => 'Deze taal code is gewijzigd en verwijst niet langer naar de oorspronkelijke taal.',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Gunnernett
 */
$messages['nn'] = array(
	'wminc-desc' => 'Testwikisystem for Wikimedia Incubator',
	'wminc-testwiki' => 'Testwiki:',
	'wminc-testwiki-none' => 'Ingen/alle',
	'wminc-prefinfo-language' => 'Ditt grensesnittspråk - uavhengig av testwikien din',
	'wminc-prefinfo-code' => 'ISO 639-språkkode',
	'wminc-prefinfo-project' => 'Vél Wikimediaprosjekt (alternativet Incubator er for brukarar som gjer generelt arbeid)',
	'wminc-prefinfo-error' => 'Du valde eit prosjekt som krev ei språkkode.',
	'randombytest' => 'Tilfelleleg side frå testwiki',
	'randombytest-nopages' => 'Det er ingen sider i testwikien din, i namneromet:  $1.',
	'wminc-viewuserlang' => 'Slå opp brukarspråk og testwiki',
	'wminc-viewuserlang-user' => 'Brukarnamn:',
	'wminc-viewuserlang-go' => 'Gå',
	'right-viewuserlang' => 'Vis [[Special:ViewUserLang|brukarspråk og testwiki]]',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Audun
 * @author Jon Harald Søby
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'wminc-desc' => 'Testwikisystem for Wikimedia Incubator',
	'wminc-testwiki' => 'Testwiki:',
	'wminc-testwiki-none' => 'Ingen/Alle',
	'wminc-prefinfo-language' => 'Ditt grensesnittspråk - uavhengig av din testwiki',
	'wminc-prefinfo-code' => 'ISO 639-språkkoden',
	'wminc-prefinfo-project' => 'Velg Wikimedia-prosjektet (alternativet Incubator er for brukere som gjør generelt arbeid)',
	'wminc-prefinfo-error' => 'Du valgte et prosjekt som krever en språkkode.',
	'randombytest' => 'Tilfeldig side fra testwiki',
	'randombytest-nopages' => 'Det er ingen sider i din testwiki, i navnerommet: $1.',
	'wminc-viewuserlang' => 'Slå opp brukerspråk og testwiki',
	'wminc-viewuserlang-user' => 'Brukernavn:',
	'wminc-viewuserlang-go' => 'Gå',
	'wminc-userdoesnotexist' => 'Brukeren «$1» finnes ikke.',
	'right-viewuserlang' => 'Vis [[Special:ViewUserLang|brukerspråk og testwiki]]',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'wminc-desc' => 'Sistèma de tèst de wiki per Wikimedia Incubator',
	'wminc-testwiki' => 'Wiki de tèst :',
	'wminc-testwiki-none' => 'Pas cap / totes',
	'wminc-prefinfo-language' => "Vòstra lenga de l'interfàcia - independenta de vòstre wiki de tèst",
	'wminc-prefinfo-code' => 'Lo còde ISO 639 de la lenga',
	'wminc-prefinfo-project' => "Seleccionatz lo projècte Wikimedia (l'opcion Incubator es destinada als utilizaires que fan un trabalh general)",
	'wminc-prefinfo-error' => 'Avètz seleccionat un projècte que necessita un còde de lenga.',
	'randombytest' => 'Pagina aleatòria pel wiki de tèst',
	'randombytest-nopages' => "Vòstre wiki de tèst conten pas de pagina dins l'espaci de noms : $1.",
	'wminc-viewuserlang' => "Veire la lenga de l'utilizaire e son wiki de tèst",
	'wminc-viewuserlang-user' => "Nom d'utilizaire :",
	'wminc-viewuserlang-go' => 'Anar',
	'right-viewuserlang' => 'Vejatz [[Special:ViewUserLang|lenga de l’utilizaire e lo wiki de tèst]]',
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'wminc-testwiki-none' => 'Ken/All',
	'wminc-viewuserlang-user' => 'Yuuser-Naame:',
	'wminc-viewuserlang-go' => 'Hole',
);

/** Polish (Polski)
 * @author Leinad
 * @author Sp5uhe
 * @author ToSter
 */
$messages['pl'] = array(
	'wminc-desc' => 'Testowa wiki dla Inkubatora Wikimedia',
	'wminc-manual' => 'Podręcznik',
	'wminc-listwikis' => 'Spis wiki',
	'wminc-testwiki' => 'Testowa wiki',
	'wminc-testwiki-none' => 'Żadna lub wszystkie',
	'wminc-recentchanges-all' => 'Wszystkie ostatnie zmiany',
	'wminc-prefinfo-language' => 'Język interfejsu (niezależny od języka testowej wiki)',
	'wminc-prefinfo-code' => 'Kod języka według ISO 639',
	'wminc-prefinfo-project' => 'Wybierz projekt Wikimedia (opcja wyboru Inkubatora jest przeznaczona dla użytkowników, którzy wykonują prace ogólne)',
	'wminc-prefinfo-error' => 'Został wybrany projekt, który wymaga podania kodu języka.',
	'wminc-error-move-unprefixed' => 'Błąd – strona, którą próbujesz przenieść [[{{MediaWiki:Helppage}}|nie ma lub ma zły przedrostek]]!',
	'wminc-error-wronglangcode' => "'''Błąd''' – w treści strony odnaleziono [[{{MediaWiki:Helppage}}|błędny kod języka]] „$1“!",
	'wminc-error-unprefixed' => "'''Błąd''' – ta strona nie ma [[{{MediaWiki:Helppage}}|przedrostka]]!",
	'wminc-error-unprefixed-suggest' => "'''Błąd''' – ta strona nie ma [[{{MediaWiki:Helppage}}|przedrostka]]! Możesz utworzyć stronę [[:$1]].",
	'wminc-error-wiki-exists' => 'Taka wiki już istnieje. Możesz odnaleźć tę stronę na $1. Jeśli wiki została utworzona niedawno, poczekaj kilka godzin lub dni, aż cała zawartość zostanie zaimportowana.',
	'wminc-error-wiki-sister' => 'Niniejsza strona znajduje się w projekcie, który nie znajduje się tutaj. Przejdź do $1, aby znaleźć właściwą wiki.',
	'randombytest' => 'Losowa strona testowej wiki',
	'randombytest-nopages' => 'W Twojej testowej wiki brak jest stron w przestrzeni nazw $1.',
	'wminc-viewuserlang' => 'Sprawdzanie języka użytkownika i testowej wiki',
	'wminc-viewuserlang-user' => 'Nazwa użytkownika',
	'wminc-viewuserlang-go' => 'Pokaż',
	'wminc-userdoesnotexist' => 'Użytkownik „$1” nie istnieje.',
	'right-viewuserlang' => 'Podgląd [[Special:ViewUserLang|języka użytkownika oraz testowej wiki]]',
	'group-test-sysop' => 'Administratorzy testowej wiki',
	'group-test-sysop-member' => 'administrator testowej wiki',
	'grouppage-test-sysop' => 'Project:Administratorzy testowej wiki',
	'wminc-code-macrolanguage' => '[[Wikipedia:$2 language|Język $3]] jest [[wikipedia:ISO 639 macrolanguage|makrojęzykiem]], zawierającym następujące warianty języka:',
	'wminc-code-collective' => 'Kod „$1“ nie odnosi się do jednego języka, a do kolekcji języków – [[wikipedia:$2 language|$3]].',
	'wminc-code-retired' => 'Ten kod języka został zmieniony i nie odnosi się do wcześniej przypisanego mu języka.',
);

/** Piedmontese (Piemontèis)
 * @author Dragonòt
 */
$messages['pms'] = array(
	'wminc-desc' => 'Preuva ël sistema ëd wiki për Wikimedia Incubator',
	'wminc-testwiki' => 'Preuva wiki:',
	'wminc-testwiki-none' => 'Gnun/Tùit',
	'wminc-prefinfo-language' => "Toa lenga d'antërfacia - andipendenta da toa wiki ëd preuva",
	'wminc-prefinfo-code' => 'Ël còdes ISO 639 dla lenga',
	'wminc-prefinfo-project' => "Selession-a ël proget Wikimedia (l'opsion Incubator a l'é për utent che a fan travaj general)",
	'wminc-prefinfo-error' => "It l'has selessionà un proget che a l'ha dbzògn d'un còdes ëd lenga.",
	'randombytest' => 'Pàgina a cas da wiki ëd preuva',
	'randombytest-nopages' => 'A-i son pa ëd pàgine ant toa wiki ëd preuva, ant lë spassi nominal: $1:',
	'wminc-viewuserlang' => "varda la lenga dl'utent e preuva la wiki",
	'wminc-viewuserlang-user' => 'Nòm utent:',
	'wminc-viewuserlang-go' => 'Va',
	'wminc-userdoesnotexist' => 'L\'utent "$1" a esist pa.',
	'right-viewuserlang' => "Visualisa [[Special:ViewUserLang|lenga dl'utent e wiki ëd preuva]]",
);

/** Pontic (Ποντιακά)
 * @author Omnipaedista
 */
$messages['pnt'] = array(
	'wminc-viewuserlang-go' => 'Δέβα',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'wminc-testwiki' => 'د آزمېښت ويکي:',
	'wminc-testwiki-none' => 'هېڅ/ټول',
	'wminc-viewuserlang-user' => 'کارن-نوم:',
	'wminc-viewuserlang-go' => 'ورځه',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 * @author Lijealso
 * @author Malafaya
 * @author Waldir
 */
$messages['pt'] = array(
	'wminc-desc' => 'Sistema de wikis de testes para a Incubadora Wikimedia',
	'wminc-manual' => 'Manual',
	'wminc-listwikis' => 'Lista de wikis',
	'wminc-testwiki' => 'Wiki de testes:',
	'wminc-testwiki-none' => 'Nenhum/Tudo',
	'wminc-recentchanges-all' => 'Todas as mudanças recentes',
	'wminc-prefinfo-language' => 'A língua da interface - independente da língua da sua wiki de testes',
	'wminc-prefinfo-code' => 'O código de língua ISO 639',
	'wminc-prefinfo-project' => 'Seleccione o projeto Wikimedia (a opção Incubadora é para utilizadores que fazem trabalho geral)',
	'wminc-prefinfo-error' => 'Seleccionou um projecto que necessita de um código de língua.',
	'wminc-error-move-unprefixed' => 'Erro: A página de destino [[{{MediaWiki:Helppage}}|não tem prefixo ou tem um prefixo incorrecto]]!',
	'wminc-error-wronglangcode' => "'''Erro:''' A página contém um [[{{MediaWiki:Helppage}}|código de língua incorrecto]]: \"\$1\"!",
	'wminc-error-unprefixed' => "'''Erro:''' Esta página [[{{MediaWiki:Helppage}}|não tem prefixo]]!",
	'wminc-error-unprefixed-suggest' => "'''Erro:''' Esta página [[{{MediaWiki:Helppage}}|não tem prefixo]]! Pode criar uma página em [[:$1]].",
	'wminc-error-wiki-exists' => 'Esta wiki já existe. Encontra esta página em $1. Se a wiki foi criada recentemente, aguarde algumas horas ou dias até que todo o conteúdo tenha sido importado.',
	'randombytest' => 'Página aleatória da wiki de testes',
	'randombytest-nopages' => 'Não há páginas na sua wiki de testes, no espaço nominal: $1.',
	'wminc-viewuserlang' => 'Procurar a língua do utilizador e a wiki de testes',
	'wminc-viewuserlang-user' => 'Nome de utilizador:',
	'wminc-viewuserlang-go' => 'Prosseguir',
	'wminc-userdoesnotexist' => 'O utilizador "$1" não existe.',
	'right-viewuserlang' => 'Ver [[Special:ViewUserLang|língua do utilizador e wiki de testes]]',
	'group-test-sysop' => 'Administradores da wiki de testes',
	'group-test-sysop-member' => 'administrador da wiki de testes',
	'grouppage-test-sysop' => 'Project:Administradores da wiki de testes',
	'wminc-code-macrolanguage' => 'A [[wikipedia:$2 language|língua "$3"]] é uma [[wikipedia:ISO 639 macrolanguage|macrolíngua]], composta pelas seguintes línguas:',
	'wminc-code-collective' => 'O código "$1" não se refere a uma língua específica, mas sim a um conjunto de línguas, nomeadamente as [[wikipedia:$2 language|línguas "$3"]].',
	'wminc-code-retired' => 'O código de língua foi alterado e já não se refere à língua original.',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 * @author Helder.wiki
 * @author Heldergeovane
 * @author MetalBrasil
 */
$messages['pt-br'] = array(
	'wminc-desc' => 'Sistema de wikis de teste para a Incubadora Wikimedia',
	'wminc-manual' => 'Manual',
	'wminc-listwikis' => 'Lista de wikis',
	'wminc-testwiki' => 'Wiki de teste:',
	'wminc-testwiki-none' => 'Nenhum/Tudo',
	'wminc-recentchanges-all' => 'Todas as mudanças recentes',
	'wminc-prefinfo-language' => 'Seu idioma de interface - independente do seu wiki de teste',
	'wminc-prefinfo-code' => 'O código de língua ISO 639',
	'wminc-prefinfo-project' => 'Selecione o projeto Wikimedia (a opção Incubadora é para usuários que fazem trabalho geral)',
	'wminc-prefinfo-error' => 'Você selecionou um projeto que necessita de um código de língua.',
	'wminc-error-move-unprefixed' => 'Erro: A página que você está tentando mover para [[{{MediaWiki:Helppage}}|é aprefixada ou tem um prefixo incorreto]]!',
	'wminc-error-wronglangcode' => "'''Erro:''' Esta página contém um [[{{MediaWiki:Helppage}}|código de linguagem errado]] \"\$1\"!",
	'wminc-error-unprefixed' => "'''Erro:''' Esta página é [[{{MediaWiki:Helppage}}|aprefixada]]!",
	'wminc-error-unprefixed-suggest' => "'''Erro:''' Esta página é [[{{MediaWiki:Helppage}}|aprefixada]]! Você pode criar uma página em [[:$1]].",
	'wminc-error-wiki-exists' => 'Esta wiki já existe. Encontra esta página em $1. Se a wiki foi criada recentemente, aguarde algumas horas ou dias até que todo o conteúdo seja importado.',
	'randombytest' => 'Página aleatória da wiki de testes',
	'randombytest-nopages' => 'Não há páginas em sua wiki de testes no domínio: $1',
	'wminc-viewuserlang' => 'Procurar idioma do utilizador e wiki de teste',
	'wminc-viewuserlang-user' => 'Nome de usuário:',
	'wminc-viewuserlang-go' => 'Ir',
	'wminc-userdoesnotexist' => 'A conta de usuário "$1" não existe.',
	'right-viewuserlang' => 'Ver [[Special:ViewUserLang|idioma do usuário e wiki de teste]]',
	'group-test-sysop' => 'Administradores da Test wiki',
	'group-test-sysop-member' => 'Administrador da Test wiki',
	'grouppage-test-sysop' => 'Project:Administradores da Testwiki',
	'wminc-code-macrolanguage' => 'A [[wikipedia:$2 língua|"$3" língua]] é uma [[wikipedia:ISO 639 macrolíngua|macrolíngua]], consistindo das seguintes línguas:',
	'wminc-code-collective' => 'O código "$1" não se refere a uma mensagem específica, mas a uma coleção de línguas, nomeadas a [[wikipedia:$2 language|"$3" línguas]].',
	'wminc-code-retired' => 'Este código de idioma foi mudado e já não se refere à língua original.',
);

/** Romanian (Română)
 * @author Emily
 * @author Firilacroco
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'wminc-desc' => 'Sistemul wiki de testare pentru Wikimedia Incubator',
	'wminc-testwiki' => 'Wikia test:',
	'wminc-testwiki-none' => 'Niciunul/Toți',
	'wminc-prefinfo-language' => 'Limba interfeței dumneavoastră - independentă de wikia test',
	'wminc-prefinfo-code' => 'Limbajul cod ISO 639',
	'wminc-prefinfo-error' => 'Ați selectat un proiect care are nevoie de un cod al limbajului.',
	'wminc-viewuserlang-user' => 'Nume de utilizator:',
	'wminc-viewuserlang-go' => 'Du-te',
	'right-viewuserlang' => 'Vizualizează [[Special:ViewUserLang|limba utilizatorului și wikia test]]',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'wminc-desc' => 'Test pu sisteme Uicchi pe UicchiMedia Incubatore',
	'wminc-testwiki' => 'Test de Uicchi:',
	'wminc-testwiki-none' => 'Nisciune/Tutte',
	'wminc-prefinfo-language' => "L'inderfacce indipendende de lènghe da 'u teste tue de Uicchi",
	'wminc-prefinfo-code' => "'U codece ISO 639 d'a lènghe",
	'wminc-prefinfo-project' => "Scacchie 'u proggette UicchiMedia (opzione Incubatore jè pe l'utinde ca fanne 'na fatìe generale)",
	'wminc-prefinfo-error' => "Tu è scacchiate 'nu proggette ca abbesogne de 'nu codece de lènghe.",
	'randombytest' => 'Pàgene a uecchie pe testà Uicchi',
	'randombytest-nopages' => "Non ge stonne pàggene jndr'à Uicchi de test, jndr'à 'u namespace: $1.",
	'wminc-viewuserlang' => "Combronde 'mbrà 'a lènghe de l'utende e 'u teste de Uicchi",
	'wminc-viewuserlang-user' => "Nome de l'utende:",
	'wminc-viewuserlang-go' => 'Veje',
	'wminc-userdoesnotexist' => 'L\'utende "$1" non g\'esiste.',
	'right-viewuserlang' => "Vide [[Special:ViewUserLang|'a lènghe de l'utende e teste Uicchi]]",
);

/** Russian (Русский)
 * @author Ferrer
 * @author Kaganer
 * @author Kv75
 * @author MaxSem
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'wminc-desc' => 'Пробная вики-система для Инкубатора Викимедиа',
	'wminc-testwiki' => 'Пробная вики:',
	'wminc-testwiki-none' => 'Нет/все',
	'wminc-recentchanges-all' => 'Все недавние правки',
	'wminc-prefinfo-language' => 'Ваш язык интерфейса не зависит от вашей пробной вики',
	'wminc-prefinfo-code' => 'Код языка по ISO 639',
	'wminc-prefinfo-project' => 'Выбор проекта Викимедиа (выберите Инкубатор, если занимаетесь общими вопросами)',
	'wminc-prefinfo-error' => 'Вы выбрали проект, для которого необходимо указать код языка.',
	'wminc-error-move-unprefixed' => 'Ошибка. Страница, в которую вы пытаетесь переименовать [[{{MediaWiki:Helppage}}|имеет ошибочный префикс или не имеет его вообще]]!',
	'wminc-error-wronglangcode' => "''' Ошибка.''' Страница, которую вы пытаетесь отредактировать, содержит [[{{MediaWiki:Helppage}}|неправильный код языка]] «$1»!",
	'wminc-error-unprefixed' => "''' Ошибка.''' Страница, которую вы пытаетесь отредактировать, [[{{MediaWiki:Helppage}}|не имеет префикса]]!",
	'wminc-error-unprefixed-suggest' => "''' Ошибка.''' Страница, которую вы пытаетесь отредактировать, [[{{MediaWiki:Helppage}}|не имеет префикса]]! Вы можете создать страницу на [[:$1]].",
	'randombytest' => 'Случайная страница пробной вики',
	'randombytest-nopages' => 'В вашей пробной вики нет страниц в пространстве имён $1.',
	'wminc-viewuserlang' => 'Поиск языковых настроек участника и его пробной вики',
	'wminc-viewuserlang-user' => 'Имя участника:',
	'wminc-viewuserlang-go' => 'Найти',
	'wminc-userdoesnotexist' => 'Участник «$1» не существует',
	'right-viewuserlang' => 'просматривать [[Special:ViewUserLang|языковые настройки участника и его пробную вики]]',
	'group-test-sysop' => 'Администраторы тестовой вики',
	'group-test-sysop-member' => 'администратор тестовой вики',
	'grouppage-test-sysop' => 'Project:Администраторы тестовой вики',
);

/** Rusyn (Русиньскый)
 * @author Gazeb
 */
$messages['rue'] = array(
	'wminc-desc' => 'Тестова вікі про Інкубатор Вікімедіа',
	'wminc-testwiki' => 'Вікі про тестованя:',
	'wminc-testwiki-none' => 'Ніч/Вшытко',
	'wminc-prefinfo-language' => 'Ваш язык інтерфейсу не залежыть од языка тестовой вікі',
	'wminc-prefinfo-code' => 'Языковый код ISO 639',
	'wminc-prefinfo-project' => 'Выбрати проєкт Вікімедія (варіант Інкубатор про тых, што ся занимають общов роботов)',
	'wminc-prefinfo-error' => 'Выбрали сьте проєкт, котрый потребує код языка.',
	'randombytest' => 'Нагодна сторінка з тестовой вікі',
	'randombytest-nopages' => 'Во вашій тестовій вікі немає сторінок у просторі мен $1.',
	'wminc-viewuserlang' => 'Выглядати язык тай тестову вікі хоснователя',
	'wminc-viewuserlang-user' => 'Мено хоснователя:',
	'wminc-viewuserlang-go' => 'Перейти',
	'right-viewuserlang' => 'Відїти [[Special:ViewUserLang|языковы наставлиня хоснователя і його тестову вікі]]',
);

/** Sakha (Саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'wminc-desc' => 'Бикимиэдьийэ Инкубаатарын тургутар биики-систиэмэтэ',
	'wminc-testwiki' => 'Тургутуллар биики:',
	'wminc-testwiki-none' => 'Суох/Барыта',
	'wminc-prefinfo-language' => 'Эн тылыҥ туруоруута тургутар биикигиттэн тутулуга суох',
	'wminc-prefinfo-code' => 'Тыл ISO 639 тиһилигэр анаммыт куода',
	'wminc-prefinfo-project' => 'Бикимиэдьийэ бырайыактарыттан талыы (уопсай боппуруостарынан дьарыктаныаххын баҕарар буоллаххына Инкубаатары тал)',
	'wminc-viewuserlang' => 'Кыттааччы тыллары талыытын уонна тургутар биикитин көрдөөһүн',
	'wminc-viewuserlang-user' => 'Кытааччы аата:',
	'wminc-viewuserlang-go' => 'Бул',
);

/** Sardinian (Sardu)
 * @author Andria
 */
$messages['sc'] = array(
	'wminc-testwiki-none' => 'Nudda/Totu',
	'wminc-viewuserlang-user' => 'Nùmene usuàriu:',
	'wminc-viewuserlang-go' => 'Bae',
);

/** Tachelhit (Tašlḥiyt)
 * @author Dalinanir
 */
$messages['shi'] = array(
	'wminc-desc' => 'Arm wiki anagraw i Wikimidya Ankubatur',
	'wminc-testwiki' => 'Arm n wiki',
	'wminc-testwiki-none' => 'Walu/kullu',
	'wminc-prefinfo-language' => 'Udm n tutlayt nk.  tbḍa d arm  n wiki',
	'wminc-prefinfo-code' => 'Asngl ISO 639 n tutlayt',
	'wminc-prefinfo-project' => 'Sti tawuri n Wikipedya (Astay n tusnkert ittuyzlay s imsxdamn li skarni tawuri ur ittiyslayn)',
	'wminc-prefinfo-error' => 'Tstit yat tuwuri li iran asngl n tutlayt',
	'randombytest' => 'Tasna nn ḥlli s astay n wiki',
	'randombytest-nopages' => 'Ur gis kra n tasna ɣ warm n wiki, li ittafn assaɣ: $1.',
	'wminc-viewuserlang' => 'Af tutlayt nu amsdaqc tarmt wiki',
	'wminc-viewuserlang-user' => 'Assaɣ nu-msxdan',
	'wminc-viewuserlang-go' => 'Balak',
	'right-viewuserlang' => 'Ẓr [[Special:ViewUserLang|Tutlayt nu umsxdam d arm n  wiki]]',
);

/** Sinhala (සිංහල)
 * @author Calcey
 */
$messages['si'] = array(
	'wminc-desc' => 'විකි මීඩියා ආසීනකාරකය සඳහා විකි පද්ධතිය පරීක්ෂා කරන්න',
	'wminc-testwiki' => 'විකිය පරීක්ෂා කරන්න:',
	'wminc-testwiki-none' => 'කිසිවක් නොවේ/සියල්ලම',
	'wminc-prefinfo-language' => 'ඔබේ අතුරු මුහුණත් භාෂාව - ඔබේ විකි පරීක්ෂාවෙන් ස්වායත්ත වේ',
	'wminc-prefinfo-code' => 'ISO  639 භාෂා කේතය',
	'wminc-prefinfo-project' => 'විකි මීඩියා ව්‍යාපෘතිය තෝරන්න.(ආසීනකාරක තොරාගැනීම සාමාන්‍ය කාර්යයන් කරන පරිශීලකයන් සඳහා වේ)',
	'wminc-prefinfo-error' => 'භාෂා කේතයක් අවශ්‍ය වන ව්‍යාපෘතියක් ඔබ විසින්  තෝරා ගෙන ඇත.',
	'randombytest' => 'විකි පරීක්ෂාවකින් සසම්භාවී පිවුවක්',
	'randombytest-nopages' => '$1 නාම අවකාශය තුළ,ඔබේ විකි පරීක්ෂාවේ කිසිදු පිටුවක් නොමැත.',
	'wminc-viewuserlang' => 'පරිශීලක භාෂාව බලා විකිය පරීක්ෂා කරන්න.',
	'wminc-viewuserlang-user' => 'පරිශීලක නාමය:',
	'wminc-viewuserlang-go' => 'යන්න',
	'right-viewuserlang' => ' [[Special:ViewUserLang|පරිශීලක භාෂාව හා විකි පරීක්ෂාව]] බලන්න.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'wminc-desc' => 'Testovací wiki systém pre Inkubátor Wikimedia',
	'wminc-testwiki' => 'Testovacia wiki:',
	'wminc-testwiki-none' => 'Žiadna/všetky',
	'wminc-prefinfo-language' => 'Jazyk vášho rozhrania - nezávisle od vašej testovacej wiki',
	'wminc-prefinfo-code' => 'ISO 639 kód jazyka',
	'wminc-prefinfo-project' => 'Vybrať projekt Wikimedia (voľba Inkubátor je pre používateľov, ktorí vykonávajú všeobecnú prácu)',
	'wminc-prefinfo-error' => 'Vybrali ste projekt, ktorý potrebuje kód jazyka.',
	'randombytest' => 'Náhodná stránka z testovacej wiki',
	'randombytest-nopages' => 'Vo vašej testovacej wiki neexistujú stránky v mennom priestore $1.',
	'wminc-viewuserlang' => 'Vyhľadať jazyk používateľa a testovaciu wiki',
	'wminc-viewuserlang-user' => 'Používateľské meno:',
	'wminc-viewuserlang-go' => 'Vykonať',
	'right-viewuserlang' => 'Zobraziť [[Special:ViewUserLang|jazyk používateľa a testovaciu wiki]]',
);

/** Slovenian (Slovenščina)
 * @author Dbc334
 */
$messages['sl'] = array(
	'wminc-desc' => 'Preizkusni sistem wiki za Wikimedia Incubator',
	'wminc-manual' => 'Priročnik',
	'wminc-listwikis' => 'Seznam wikijev',
	'wminc-testwiki' => 'Preizkusni wiki:',
	'wminc-testwiki-none' => 'Nič/Vse',
	'wminc-recentchanges-all' => 'Vse zadnje spremembe',
	'wminc-prefinfo-language' => 'Vaš jezik vmesnika – neodvisen od vašega preizkusnega wikija',
	'wminc-prefinfo-code' => 'Koda jezika ISO 639',
	'wminc-prefinfo-project' => 'Izberite projekt Wikimedie (možnost Incubator je namenjena uporabnikom, ki opravljajo splošna dela)',
	'wminc-prefinfo-error' => 'Izbrali ste projekt, ki zahteva kodo jezika.',
	'wminc-error-move-unprefixed' => 'Napaka: Stran, na katero skušate prestaviti, [[{{MediaWiki:Helppage}}|nima predpone ali ima napačno predpono]]!',
	'wminc-error-wronglangcode' => "'''Napaka:''' Stran vsebuje [[{{MediaWiki:Helppage}}|napačno kodo jezika]] »$1«!",
	'wminc-error-unprefixed' => "'''Napaka:''' Stran [[{{MediaWiki:Helppage}}|nima predpone]]!",
	'wminc-error-unprefixed-suggest' => "'''Napaka:''' Stran [[{{MediaWiki:Helppage}}|nima predpone]]! Stran lahko ustvarite na [[:$1]].",
	'wminc-error-wiki-exists' => 'Wiki že obstaja. Stran lahko najdete na $1. Če je bil wiki ustvarjen pred kratkim, počakajte nekaj ur ali dni, dokler vsa vsebina ni uvožena.',
	'wminc-error-wiki-sister' => 'Ta stran pripada projektu, katerega tukaj ne gostujemo. Prosimo, pojdite na $1, da najdete wiki.',
	'randombytest' => 'Naključna stran preizkusnega wikija',
	'randombytest-nopages' => 'Na vašem wikiju ni strani v imenskem prostoru: $1.',
	'wminc-viewuserlang' => 'Poiščite jezik in preizkusni wiki uporabnika',
	'wminc-viewuserlang-user' => 'Uporabniško ime:',
	'wminc-viewuserlang-go' => 'Pojdi',
	'wminc-userdoesnotexist' => 'Uporabnik »$1« ne obstaja.',
	'right-viewuserlang' => 'Vpogled v [[Special:ViewUserLang|jezik in preizkusni wiki uporabnika]]',
	'group-test-sysop' => 'Administratorji poskusnega wikija',
	'group-test-sysop-member' => 'administrator poskusnega wikija',
	'grouppage-test-sysop' => 'Project:Administratorji poskusnega wikija',
	'wminc-code-macrolanguage' => '[[wikipedia:$2 language|Jezik »$3«]] je [[wikipedia:ISO 639 macrolanguage|makrojezik]], sestavljen iz naslednjih jezikovnih članov:',
	'wminc-code-collective' => 'Koda »$1« se ne nanaša na določen jezik, ampak na skupino jezikov, in sicer [[wikipedia:$2 language|jeziki »$3«]].',
	'wminc-code-retired' => 'Koda jezika je spremenjena in se več ne nanaša na izvirni jezik.',
);

/** Serbian Cyrillic ekavian (‪Српски (ћирилица)‬)
 * @author Rancher
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'wminc-testwiki' => 'Тест-Вики:',
	'wminc-testwiki-none' => 'Ништа/Све',
	'wminc-viewuserlang-user' => 'Корисничко име:',
	'wminc-viewuserlang-go' => 'Пређи',
);

/** Serbian Latin ekavian (‪Srpski (latinica)‬)
 * @author Michaello
 */
$messages['sr-el'] = array(
	'wminc-testwiki' => 'Test-Viki:',
	'wminc-testwiki-none' => 'Ništa/Sve',
	'wminc-viewuserlang-user' => 'Korisničko ime:',
	'wminc-viewuserlang-go' => 'Idi',
);

/** Sundanese (Basa Sunda)
 * @author Kandar
 */
$messages['su'] = array(
	'wminc-prefinfo-code' => 'Sandi basa ISO 639',
	'wminc-prefinfo-project' => 'Pilih proyék Wikimédia (pilihan Inkubator pikeun pamaké nu ngahanca pagawéan umum)',
	'wminc-prefinfo-error' => 'Anjeun milih proyék anu merlukeun sandi basa.',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author Gabbe.g
 * @author Lokal Profil
 * @author Najami
 * @author Ozp
 * @author Poxnar
 */
$messages['sv'] = array(
	'wminc-desc' => 'Testwikisystem för Wikimedia Incubator',
	'wminc-testwiki' => 'Testwiki:',
	'wminc-testwiki-none' => 'Ingen/Alla',
	'wminc-recentchanges-all' => 'Alla de senaste ändringarna',
	'wminc-prefinfo-language' => 'Ditt gränssnittsspråk - oavhängigt från din testwiki',
	'wminc-prefinfo-code' => 'ISO 639-språkkoden',
	'wminc-prefinfo-project' => 'Välj Wikimediaprojekt (alternativet Incubator för användare som gör allmänt arbete)',
	'wminc-prefinfo-error' => 'Du valde ett projekt som kräver en språkkod.',
	'randombytest' => 'Slumpvis sida från testwiki',
	'randombytest-nopages' => 'Det finns inga sidor i din textwiki, i namnrymden: $1.',
	'wminc-viewuserlang' => 'Kolla upp användarspråk och testwiki',
	'wminc-viewuserlang-user' => 'Användarnamn:',
	'wminc-viewuserlang-go' => 'Gå till',
	'wminc-userdoesnotexist' => 'Användaren "$1" finns inte.',
	'right-viewuserlang' => 'Visa [[Special:ViewUserLang|användarspråk och testwiki]]',
);

/** Silesian (Ślůnski)
 * @author Britscher
 * @author Ozi64
 */
$messages['szl'] = array(
	'wminc-desc' => 'Testowo wiki lo Inkubatůra Wikimedia',
	'wminc-testwiki' => 'Testowo wiki',
	'wminc-testwiki-none' => 'Żodno/Wszyjske',
	'wminc-prefinfo-language' => 'Godka interface (ńyznoleżno na godce testowyj wiki)',
	'wminc-prefinfo-code' => 'Kod godki podug ISO 639',
	'wminc-prefinfo-project' => 'Uobjer projekt Wikimedia (uopcyjo uobjyrańo Inkubatůra je zuůnaczůno lo używaczůw, kere robjům uogůlne roboty)',
	'wminc-prefinfo-error' => 'Uostoł uobrany projekt, przi kerym trza podać kod godki.',
	'randombytest' => 'Losowo zajta testowyj wiki',
	'randombytest-nopages' => 'We twojij testowyj wiki ńyma zajtůw we raumje mjan $1',
	'wminc-viewuserlang' => 'Nojdowańy godki używacza a testowyj wiki',
	'wminc-viewuserlang-user' => 'Mjano używacza:',
	'wminc-viewuserlang-go' => 'Pokoż',
	'wminc-userdoesnotexist' => 'Ńyma używacza ze mjanym "$1"',
	'right-viewuserlang' => 'Uobocz [[Special:ViewUserLang|zajta używacza a testowo wiki]]',
);

/** Telugu (తెలుగు)
 * @author Kiranmayee
 * @author Veeven
 */
$messages['te'] = array(
	'wminc-desc' => 'వికీమీడియా ఇంక్యుబేటర్ కొరకు పరీక్షా వికీ సిస్టం',
	'wminc-testwiki' => 'పరీక్షా వికీ:',
	'wminc-testwiki-none' => 'ఏమికాదు/అన్నీ',
	'wminc-prefinfo-code' => 'ISO 639 భాష కోడు',
	'wminc-prefinfo-error' => 'భాష కోడు కావాల్సిన ఒక ప్రాజెక్టును మీరు ఎన్నుకున్నారు.',
	'randombytest' => 'పరీక్షా వికీ ద్వారా ఒక యాధృచిక పేజి',
	'wminc-viewuserlang-user' => 'వాడుకరిపేరు:',
	'wminc-viewuserlang-go' => 'వెళ్ళు',
	'right-viewuserlang' => 'వీక్షించండి [[Special:ViewUserLang|సభ్యుని భాష మరియు పరీక్షా వికీ]]',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$messages['tet'] = array(
	'wminc-viewuserlang-user' => "Naran uza-na'in:",
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'wminc-testwiki' => 'Санҷиши вики:',
	'wminc-testwiki-none' => 'Ҳеҷ/Ҳама',
	'wminc-viewuserlang-user' => 'Номи корбарӣ:',
	'wminc-viewuserlang-go' => 'Рав',
);

/** Tajik (Latin) (Тоҷикӣ (Latin))
 * @author Liangent
 */
$messages['tg-latn'] = array(
	'wminc-testwiki' => 'Sançişi viki:',
	'wminc-testwiki-none' => 'Heç/Hama',
	'wminc-viewuserlang-user' => 'Nomi korbarī:',
	'wminc-viewuserlang-go' => 'Rav',
);

/** Turkmen (Türkmençe)
 * @author Hanberke
 */
$messages['tk'] = array(
	'wminc-testwiki' => 'Test wiki:',
	'wminc-viewuserlang-user' => 'Ulanyjy ady:',
	'wminc-viewuserlang-go' => 'Git',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'wminc-desc' => 'Sistemang pangsubok ng wiki para sa Pisaan ng Wikimedia',
	'wminc-testwiki' => 'Wiking sinusubok:',
	'wminc-testwiki-none' => 'Wala/Lahat',
	'wminc-prefinfo-language' => 'Ang wika ng pangtawid-mukha mo - malaya mula sa iyong wiking sinusubok',
	'wminc-prefinfo-code' => 'Ang kodigo ng wika ng ISO 639',
	'wminc-prefinfo-project' => 'Piliin ang proyekto ng Wikimedia (Ang mapipiling pisaan ay para sa mga tagagamit na gumagawa ng pangkalahatang gawain)',
	'wminc-prefinfo-error' => 'Nakapili ka ng isang proyektong nangangailangan ng isang kodigong pangwika.',
	'randombytest' => 'Alinmang pahina ayon sa wiking sinusubukan',
	'randombytest-nopages' => 'Walang mga pahina sa loob ng iyong wiking sinusubok, sa loob ng puwang ng pangalan: $1.',
	'wminc-viewuserlang' => 'Hanapin ang wika ng tagagamit ang wiking sinusubok',
	'wminc-viewuserlang-user' => 'Pangalan ng tagagamit:',
	'wminc-viewuserlang-go' => 'Gawin',
	'wminc-userdoesnotexist' => 'Hindi umiiral ang tagagamit na si "$1".',
	'right-viewuserlang' => 'Tingnan ang [[Special:ViewUserLang|wika ng tagagamit at wiking sinusubukan]]',
);

/** Turkish (Türkçe)
 * @author Joseph
 * @author Karduelis
 * @author Vito Genovese
 */
$messages['tr'] = array(
	'wminc-desc' => 'Vikimedya İnkübatör için test viki sistemi',
	'wminc-testwiki' => 'Test viki:',
	'wminc-testwiki-none' => 'Hiçbiri/Tümü',
	'wminc-prefinfo-language' => 'Arayüz diliniz - test vikinizden bağımsız',
	'wminc-prefinfo-code' => 'ISO 639 dil kodu',
	'wminc-prefinfo-project' => 'Vikimedya projesini seçin (İnkübatör seçeneği genel çalışma yapan kullanıcılar için)',
	'wminc-prefinfo-error' => 'Bir dil kodu gereken bir proje seçtiniz.',
	'randombytest' => 'Test vikisinden rastgele sayfa',
	'randombytest-nopages' => 'Test vikinizdeki $1 isim alanında herhangi bir sayfa bulunmuyor.',
	'wminc-viewuserlang' => 'Kullanıcı dili ve test vikisine bak',
	'wminc-viewuserlang-user' => 'Kullanıcı adı:',
	'wminc-viewuserlang-go' => 'Git',
	'right-viewuserlang' => '[[Special:ViewUserLang|Kullanıcı dilini ve test vikisini]] gör',
);

/** Tatar (Cyrillic) (Татарча/Tatarça (Cyrillic))
 * @author Ajdar
 */
$messages['tt-cyrl'] = array(
	'wminc-desc' => 'Викимедиа Инкубаторы өчен тикшерелмә вики-система',
	'wminc-manual' => 'Әсбап',
	'wminc-listwikis' => 'Викилар исемлеге',
	'wminc-testwiki' => 'Тикшерелүче вики',
	'wminc-testwiki-none' => 'Юк/барысы да',
	'wminc-recentchanges-all' => 'Барлык соңгы үзгәртүләр',
	'wminc-prefinfo-language' => 'Сезнең интерфейс теле сезнең тикшерелүче викига бәйле түгел',
	'wminc-prefinfo-code' => 'Телнең ISO 639 буенча коды',
	'wminc-prefinfo-project' => 'Викимедиа проектын сайлау (әгәр гомуми мәсьәләләр белән шөгыльләнсәгез, Инкубаторны сайлагыз)',
	'wminc-prefinfo-error' => 'Сез тел кодын күрсәтү мәҗбүри булган проектны сайладыгыз.',
	'wminc-error-move-unprefixed' => 'Хата. Сез күчерергә теләгән бит [[{{MediaWiki:Helppage}}|хаталы префикска ия яки аның префиксы бөтенләй юк]]!',
	'wminc-error-wronglangcode' => "'''Хата:''' Сез үзгәртергә теләгән биттә  [[{{MediaWiki:Helppage}}|дөрес булмаган тел коды бар]]",
	'wminc-error-unprefixed' => "'''Хата:''' Сез үзгәртергә теләгән битнең  [[{{MediaWiki:Helppage}}|префиксы юк]]!",
	'randombytest' => 'Тикшерелүче викиның очраклы мәкаләсе',
	'randombytest-nopages' => 'Сезнең тикшерелүче викида $1 исемнәр аланындагы битләр юк',
	'wminc-viewuserlang' => 'Кулланучының һәм аның тикшерелүче викиенең тел көйләнмәләрен эзләү',
	'wminc-viewuserlang-user' => 'Кулланучы исеме:',
	'wminc-viewuserlang-go' => 'Табарга',
	'wminc-userdoesnotexist' => '"$1" дигән кулланучы юк',
	'group-test-sysop' => 'Тикшерелүче вики идарәчеләре',
	'group-test-sysop-member' => 'тикшерелүче вики идарәчесе',
	'grouppage-test-sysop' => 'Project:Тикшерелүче вики идарәчеләре',
);

/** ئۇيغۇرچە (ئۇيغۇرچە)
 * @author Sahran
 */
$messages['ug-arab'] = array(
	'wminc-testwiki' => 'wiki سىناش:',
	'wminc-testwiki-none' => 'ھەممىسى/يوق',
	'wminc-prefinfo-language' => 'سىزنىڭ كۆرۈنمە تىلىڭىز - wiki سىناشتىن مۇستەقىل تۇرىدۇ',
	'wminc-prefinfo-code' => 'ISO 639 تىل كودى',
	'wminc-viewuserlang' => 'ئىشلەتكۈچى تىلىنى كۆرۈپ، wiki سىناش',
	'wminc-viewuserlang-user' => 'ئىشلەتكۈچى ئاتى:',
	'wminc-viewuserlang-go' => 'يۆتكەل',
);

/** Ukrainian (Українська)
 * @author AS
 * @author Aleksandrit
 */
$messages['uk'] = array(
	'wminc-desc' => 'Тестова вікі для Інкубатора Вікімедіа',
	'wminc-testwiki' => 'Тестова вікі:',
	'wminc-testwiki-none' => 'Жодна або всі',
	'wminc-prefinfo-language' => 'Мова інтерфейсу (залежить від мови тестової вікі)',
	'wminc-prefinfo-code' => 'Код мови згідно з ISO 639',
	'wminc-prefinfo-project' => 'Оберіть проект Вікімедіа (варіант Інкубатор для тих, хто займається загальними питаннями)',
	'wminc-prefinfo-error' => 'Ви обрали проект, для якого необхідно вказати код мови.',
	'randombytest' => 'Випадкова сторінка тестової вікі',
	'randombytest-nopages' => 'У вашій тестовій вікі немає сторінок у просторі імен $1.',
	'wminc-viewuserlang' => 'Проглянути мову й тестову вікі користувача',
	'wminc-viewuserlang-user' => 'Ім’я користувача:',
	'wminc-viewuserlang-go' => 'Пошук',
	'right-viewuserlang' => 'Переглядати [[Special:ViewUserLang|мовні налаштування користувача і його тестову вікі]]',
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'wminc-testwiki' => 'Kodvwiki:',
	'wminc-testwiki-none' => 'Ei ole/Kaik',
	'wminc-prefinfo-code' => "ISO 639-kel'kod",
	'wminc-viewuserlang-user' => 'Kävutajan nimi:',
	'wminc-viewuserlang-go' => 'Ectä',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Trần Nguyễn Minh Huy
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'wminc-desc' => 'Hệ thống wiki thử nghiệm của Wikimedia Incubator',
	'wminc-manual' => 'Hướng dẫn',
	'wminc-listwikis' => 'Danh sách các wiki',
	'wminc-testwiki' => 'Wiki thử:',
	'wminc-testwiki-none' => 'Không có / tất cả',
	'wminc-recentchanges-all' => 'Mọi thay đổi gần đây',
	'wminc-prefinfo-language' => 'Ngôn ngữ giao diện của bạn – có thể khác với wiki thử',
	'wminc-prefinfo-code' => 'Mã ngôn ngữ ISO 639',
	'wminc-prefinfo-project' => 'Hãy chọn dự án Wikimedia (hay Incubator để làm việc chung)',
	'wminc-prefinfo-error' => 'Bạn đã chọn một dự án bắt phải có mã ngôn ngữ.',
	'wminc-error-move-unprefixed' => 'Lỗi: Tên mới của trang [[{{MediaWiki:Helppage}}|thiếu tiền tố hoặc có tiền tố sai]]!',
	'wminc-error-wronglangcode' => "'''Lỗi:''' Trang này có [[{{MediaWiki:Helppage}}|mã ngôn ngữ sai]] “$1”!",
	'wminc-error-unprefixed' => "'''Lỗi:''' Trang này [[{{MediaWiki:Helppage}}|thiếu tiền tố]]!",
	'wminc-error-unprefixed-suggest' => "'''Lỗi:''' Trang này [[{{MediaWiki:Helppage}}|thiếu tiền tố]]! Bạn có thể tạo trang tại “[[:$1]]” thay thế.",
	'wminc-error-wiki-exists' => 'Wiki này đã tồn tại: bạn có thể truy cập trang tại $1. Nếu wiki mới được mở cửa gần đây, xin vui lòng chờ một vài giờ hoặc ngày cho đến khi tất cả nội dung được nhập xong.',
	'randombytest' => 'Trang ngẫu nhiên theo wiki thử',
	'randombytest-nopages' => 'Không có trang này tại wiki thử của bạn trong không gian tên “$1”.',
	'wminc-viewuserlang' => 'Ngôn ngữ và wiki thử của người dùng',
	'wminc-viewuserlang-user' => 'Tên hiệu:',
	'wminc-viewuserlang-go' => 'Xem',
	'wminc-userdoesnotexist' => 'Thành viên “$1” không tồn tại.',
	'right-viewuserlang' => 'Xem [[Special:ViewUserLang|ngôn ngữ và wiki thử của người dùng]]',
	'group-test-sysop' => 'Bảo quản viên tại wiki thử nghiệm',
	'group-test-sysop-member' => 'bảo quản viên tại wiki thử nghiệm',
	'grouppage-test-sysop' => 'Project:Bảo quản viên tại wiki thử nghiệm',
	'wminc-code-macrolanguage' => '[[Wikipedia:$2 language|Tiếng “$3”]] là một [[Wikipedia:ISO 639 macrolanguage|ngôn ngữ vĩ mô]] bao gồm các ngôn ngữ này:',
	'wminc-code-collective' => 'Mã “$1” không phải chỉ đến một ngôn ngữ riêng mà chỉ đến nhóm ngôn ngữ [[wikipedia:$2 language|tiếng “$3”]].',
	'wminc-code-retired' => 'Mã ngôn ngữ này đã thay đổi và không còn chỉ đến ngôn ngữ ban đầu.',
);

/** Yiddish (ייִדיש)
 * @author פוילישער
 */
$messages['yi'] = array(
	'wminc-testwiki' => 'פרווו וויקי',
	'wminc-testwiki-none' => 'קיינע/אלע',
	'wminc-viewuserlang-user' => 'באַניצער נאָמען:',
	'wminc-viewuserlang-go' => 'גיין',
);

/** Cantonese (粵語)
 * @author Shinjiman
 */
$messages['yue'] = array(
	'wminc-desc' => 'Wikimedia Incubator嘅測試wiki系統',
	'wminc-testwiki' => '測試wiki:',
	'wminc-testwiki-none' => '無/全部',
	'wminc-prefinfo-language' => '你嘅界面語言 - 響你嘅測試wiki獨立嘅',
	'wminc-prefinfo-code' => 'ISO 639語言碼',
	'wminc-prefinfo-project' => '揀Wikimedia計劃 (Incubator選項用來做一般嘅嘢)',
	'wminc-prefinfo-error' => '你揀咗一個需要語言碼嘅計劃。',
	'wminc-viewuserlang' => '睇用戶語言同測試wiki',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Hydra
 * @author Jimmy xu wrk
 * @author Liangent
 * @author PhiLiP
 * @author Shinjiman
 * @author Xiaomingyan
 */
$messages['zh-hans'] = array(
	'wminc-desc' => '维基孵育场测试维基系统',
	'wminc-manual' => '手动',
	'wminc-listwikis' => 'Wiki列表',
	'wminc-testwiki' => '测试维基：',
	'wminc-testwiki-none' => '无/所有',
	'wminc-recentchanges-all' => '所有最近的更改',
	'wminc-prefinfo-language' => '你的界面语言-从你的测试维基独立',
	'wminc-prefinfo-code' => 'ISO 639 语言代码',
	'wminc-prefinfo-project' => '选择维基媒体项目（孵育场选项用作一般用途）',
	'wminc-prefinfo-error' => '你选择了需要语言代码的项目。',
	'wminc-error-move-unprefixed' => '错误：您要移动页面到的目的地 [[{{MediaWiki:Helppage}}|没有前缀或有错误的前缀]] ！',
	'wminc-error-wronglangcode' => "'''错误'''：该页面包含了[[{{MediaWiki:Helppage}}|错误的语言代码]]“$1”！",
	'wminc-error-unprefixed' => "'''错误'''：该页面[[{{MediaWiki:Helppage}}|无法前缀]]！",
	'wminc-error-unprefixed-suggest' => "'''错误'''：该页面[[{{MediaWiki:Helppage}}|无法前缀]]！您可以在[[:$1]]创建页面。",
	'wminc-error-wiki-exists' => '该wiki已经存在。您可以在$1找到该页面。如果该wiki是近期创建的，请耐心等待数小时至数日，以便所有内容都被导入。',
	'randombytest' => '测试维基随机页面',
	'randombytest-nopages' => '您的测试wiki的名字空间$1中没有页面。',
	'wminc-viewuserlang' => '查看用户语言与测试维基',
	'wminc-viewuserlang-user' => '用户名：',
	'wminc-viewuserlang-go' => '提交',
	'wminc-userdoesnotexist' => '用户 "$1" 并不存在。',
	'right-viewuserlang' => '请查看[[Special:ViewUserLang|用户语言与测试维基]]',
	'group-test-sysop' => '测试wiki管理员',
	'group-test-sysop-member' => '测试wiki管理员',
	'grouppage-test-sysop' => 'Project:测试wiki管理员',
	'wminc-code-macrolanguage' => '[[wikipedia:$2 language|$3]]是[[wikipedia:ISO 639 macrolanguage|宏语言]]之一，由以下成员语言组成：',
	'wminc-code-collective' => '代码“$1”并不是一种语言，而是一系列语言的集合，即[[wikipedia:$2 language|$3语言]]。',
	'wminc-code-retired' => '该语言代码已更改，并且不再指向原来的语言。',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Horacewai2
 * @author Liangent
 * @author Mark85296341
 * @author Shinjiman
 * @author Waihorace
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'wminc-desc' => '維基孵育場的測試 wiki 系統',
	'wminc-testwiki' => '測試 wiki:',
	'wminc-testwiki-none' => '無/所有',
	'wminc-prefinfo-language' => '您的介面語言 - 在您的測試 wiki 中為獨立的',
	'wminc-prefinfo-code' => 'ISO 639 語言代碼',
	'wminc-prefinfo-project' => '選擇維基媒體計劃 （孵育場選項用作一般用途）',
	'wminc-prefinfo-error' => '您已選擇一個需要語言代碼的計畫。',
	'randombytest' => '測試維基上的隨機頁面',
	'randombytest-nopages' => '在你的測試網頁的 $1 名字空間中，沒有頁面。',
	'wminc-viewuserlang' => '檢視使用者語言與測試 wiki',
	'wminc-viewuserlang-user' => '使用者名稱：',
	'wminc-viewuserlang-go' => '轉到',
	'right-viewuserlang' => '檢視[[Special:ViewUserLang|使用者語言和測試 wiki]]',
);

