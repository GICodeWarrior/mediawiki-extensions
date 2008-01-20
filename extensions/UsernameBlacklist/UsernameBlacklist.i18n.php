<?php

/**
 * Internationalisation file for the Username Blacklist extension
 *
 * @author Rob Church <robchur@gmail.com>
 * @addtogroup Extensions
 */

$messages = array();

/* English (Rob Church) */
$messages['en'] = array(
	'blacklistedusername'     => 'Blacklisted username',
	'blacklistedusernametext' => 'The user name you have chosen matches the [[MediaWiki:Usernameblacklist|list of blacklisted usernames]]. Please choose another name.',
	'usernameblacklist' => '<pre>
# Entries in this list will be used as part of a regular expression when
# blacklisting usernames from registration. Each item should be part of
# a bulleted list, e.g.
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => 'The following {{PLURAL:$1|line|lines}} in the username blacklist {{PLURAL:$1|is|are}} invalid; please correct {{PLURAL:$1|it|them}} before saving:',
);

/* Arabic (Meno25) */
$messages['ar'] = array(
	'blacklistedusername' => 'اسم مستخدم في القائمة السوداء',
	'blacklistedusernametext' => 'اسم المستخدم الذي اخترته يطابق [[MediaWiki:Usernameblacklist|
قائمة أسماء المستخدمين السوداء]]. من فضلك اختر اسما آخر.',
	'usernameblacklist' => '<pre>
# المدخلات في هذه القائمة ستستخدم كجزء من تعبير منتظم عند
# منع أسماء المستخدمين في القائمة السوداء من التسجيل. كل مدخلة يجب أن تكون جزءا من
# قائمة مرقمة، كمثال.
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|السطر التالي|السطور التالية}} في قائمة اسم المستخدم السوداء {{PLURAL:$1|غير صحيح|غير صحيحة}} ؛ من فضلك {{PLURAL:$1|صححه|صححها}} قبل الحفظ:',
);

/** Asturian (Asturianu)
 * @author Esbardu
 */
$messages['ast'] = array(
	'blacklistedusername'     => "Nome d'usuariu na llista negra",
	'blacklistedusernametext' => "El nome d'usuariu qu'escoyisti ta na [[MediaWiki:Usernameblacklist|llista negra de nomes d'usuariu]]. Por favor, escueyi otru nome.",
);

$messages['bcl'] = array(
	'blacklistedusername' => 'Blacklisted na username',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'blacklistedusernametext'         => 'Избраното потребителско име съвпада със запис от [[MediaWiki:Usernameblacklist|списъка с непозволени имена]]. Изберете друго.',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|Следният ред|Следните редове}} в черния списък за потребителски имена {{PLURAL:$1|е невалиден|са невалидни}}; Необходимо е да {{PLURAL:$1|бъде поправен|бъдат поправени}} преди да {{PLURAL:$1|бъде съхранен|бъдат съхранени}}:',
);

$messages['bn'] = array(
	'blacklistedusername' => 'নিষিদ্ধ ঘোষিত ব্যবহারকারী নাম',
	'blacklistedusernametext' => 'ব্যবহারকারীর নাম [[MediaWiki:Usernameblacklist|কালতালিকাভুক্ত ব্যবহারকারীর নাম সমূহের]] সাথে মিলেছে। দয়াকরে অন্য নাম পছন্দ করুন।',
	'usernameblacklist' => '<pre> # এই তালিকায় ভুক্তি সমূহ রেগুলার এক্সপ্রেশনের অংশ হিসেবে ব্যবহৃত হবে যেখানে # রেজিষ্ট্রশন থেকে নিষিদ্ধ ব্যবহারকারী নামসমূহ। প্রতিটি উপাদান # একটি বুলেট তালিকার অংশ হয়ে থাকবে, অর্থাৎ # # * Foo # * [Bb]ar </pre>',
	'usernameblacklist-invalid-lines' => 'এই {{PLURAL:$1|লাইন|লাইনসমূহ}} নিষিদ্ধ ব্যবহারকারী নাম তালিকাভুক্ত {{PLURAL:$1|নাম|নামসমূহ}} অসিদ্ধ; দয়াকরে সংরক্ষণ করার পূর্বে {{PLURAL:$1|এটি|এগুলো}} ঠিক করুন:',
);

$messages['ca'] = array(
	'blacklistedusername' => 'Nom no permès',
	'blacklistedusernametext' => 'El nom d\'usuari que heu escollit forma part de la [[MediaWiki:Usernameblacklist|llista de noms no permesos]]. Escolliu-ne un altre de diferent, si us plau.',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|La següent línia|Les següents línies}} de la llista negra de noms d\'usuari no {{PLURAL:$1|és vàlida|són vàlides}}; si us plau, corregiu{{PLURAL:$1|-la|-les}} abans de desar-ho:',
);

$messages['cs'] = array(
	'blacklistedusername' => 'Nepovolené uživatelské jméno',
	'blacklistedusernametext' => 'Vámi vybrané uživatelské jméno se shoduje s&nbsp;některým ze [[MediaWiki:Usernameblacklist|seznamu nepovolených uživatelských jmen]]. Prosíme, vyberte si jiné jméno.',
	'usernameblacklist' => '<pre>
# Položky v&nbsp;tomto seznamu budou použity jako části regulárního výrazu
# při kontrole nepovolených uživatelských jmen při registraci.
# Každý výraz by měl být označen jako položka nečíslovaného seznamu, např.:
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => 'Následující {{plural:$1|řádka|řádky|řádky}} v&nbsp;seznamu nepovolených uživatelských jmen {{plural:$1|je neplatná|jsou neplatné|jsou neplatné}}; prosíme, opravte {{plural:$1|ji|je|je}} před uložením:',
);

/* German (Raymond) */
$messages['de'] = array(
	'blacklistedusername'             => 'Benutzername auf der Sperrliste',
	'blacklistedusernametext'         => 'Der gewählte Benutzername steht auf der [[MediaWiki:Usernameblacklist|Liste der gesperrten Benutzernamen]]. Bitte einen anderen wählen.',
	'usernameblacklist'               => '<pre>
# Einträge in dieser Liste sind Teil eines regulären Ausdrucks,
# der bei der Prüfung von Neuanmeldungen auf unerwünschte Benutzernamen angewendet wird.
# Jede Zeile muss mit einem * beginnen, z.B.
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => 'Die {{PLURAL:$1|folgende Zeile|folgenden Zeilen}} in der Liste unerwünschter Benutzernamen {{PLURAL:$1|ist|sind}} ungültig; bitte korrigiere sie vor dem Speichern:',
);

$messages['eu'] = array(
	'blacklistedusername' => 'Zerrenda beltzeko erabiltzaile izena',
	'blacklistedusernametext' => 'Hautatu duzun erabiltzaile izena [[MediaWiki:Usernameblacklist|zerrenda beltzean]] ageri da. Aukeratu ezazu beste bat.',
);

$messages['fa'] = array(
	'blacklistedusername' => 'نام کاربری غیر مجاز',
	'blacklistedusernametext' => 'نام کاربری مورد نظر شما در با [[MediaWiki:Usernameblacklist|فهرست سیاه نام‌های کاربری]] مطابقت دارد. لطفاً یک نام کاربری دیگر انتخاب کنید.',
	'usernameblacklist' => '<pre>
# مدخل‌های این صفحه به عنوان یک الگوی regular expression برای 
# فهرست سیاه هنگام ثبت نام کاربری به کار می‌روند. هر مورد باید
# در یک سطر جدا که با علامت * آغاز شده باشد تعریف گردد، مانند:
#
# * فلان
</pre>',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|سطر|سطرهای}} زیر از فهرست سیاه نام کاربری غیر مجاز {{PLURAL:$1|است|هستند}}؛ لطفاً {{PLURAL:$1|آن|آن‌ها}} را قبل از ذخیره کردن صفحه اصلاح کنید:',
);

/** Finnish (Suomi)
 * @author Nike
 */
$messages['fi'] = array(
	'blacklistedusername'             => 'Kielletty tunnus',
	'blacklistedusernametext'         => 'Haluamasi tunnus on [[MediaWiki:Usernameblacklist|kiellettyjen tunnusten listalla]]. Valitse toinen nimi.',
	'usernameblacklist'               => '<pre>
# Listan rivit ovat säännöllisiä lausekkeita, jotka estävät niihin sopivien tunnusten luomisen.
# Jokaisen rivin pitää olla järjestelemättömän listan jäseniä. Esimerkikki:
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|Seuraava listan rivi ei ole kelvollinen|Seuraavat listan rivit eivät ole kelvollisia}}. Korjaa {{PLURAL:$1|se|ne}} ennen tallentamista.',
);

/* French */
$messages['fr'] = array(
	'blacklistedusername' => 'Noms d’utilisateurs en liste noire',
	'blacklistedusernametext' => 'Le nom d’utilisateur que vous avez choisi se trouve sur la
[[MediaWiki:Usernameblacklist|liste des noms interdits]]. Veuillez choisir un autre nom.',
	'usernameblacklist' => '<pre>
# Les entrées de cette liste seront utilisées en tant qu\'expressions régulières
# afin d\'empêcher la création de noms d\'utilisateurs interdits. Chaque item doit
# faire partie d\'une liste à puces, par exemple
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|La ligne suivante|Les lignes suivantes}} de la liste noire des noms d\'utilisateurs {{PLURAL:$1|est invalide|sont invalides}} ; veuillez {{PLURAL:$1|la|les}} corriger avant d\'enregistrer :',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'blacklistedusername'             => 'Noms d’utilisator en lista nêre',
	'blacklistedusernametext'         => 'Lo nom d’utilisator que vos éd chouèsi/cièrdu sè trove sur la [[MediaWiki:Usernameblacklist|lista des noms dèfendus]]. Volyéd chouèsir/cièrdre un ôtro nom.',
	'usernameblacklist'               => '<pre>
# Les entrâs de ceta lista seront utilisâs a titro d’èxprèssions règuliéres
# por empachiér la crèacion de noms d’utilisator dèfendus. Châque èlèment dêt
# étre dens una lista de puges, per ègzemplo
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|La legne siuventa|Les legnes siuventes}} de la lista nêre des noms d’utilisator {{PLURAL:$1|est envalida|sont envalides}} ; volyéd {{PLURAL:$1|la|les}} corregiér devant qu’enregistrar :',
);

$messages['gl'] = array(
	'blacklistedusername' => 'Nome de usuario non permitido',
	'blacklistedusernametext' => 'O nome de usuario que elixiu está na [[MediaWiki:Usernameblacklist| lista de nomes de usuario non permitidos]]. Por favor escolla outro nome.',
	'usernameblacklist' => '<pre>
# As entradas desta listaxe empregaranse como parte dunha expresión regular
# ao incluír os nomes de usuario nunha lista negra de rexistro. Cada elemento
# deberá incluírse nunha listaxe sen numerar, p.ex.:
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|A liña seguinte|As liñas seguintes}} na listaxe negra de nomes de usuario {{PLURAL:$1|non é válida|non son válidas}}; corríxa{{PLURAL:$1|a|as}} antes de gardar:',
);

$messages['hak'] = array(
	'blacklistedusername' => 'Lie̍t-ngi̍p het-miàng-tân ke yung-fu-miàng',
	'blacklistedusernametext' => 'Ngì só sién-chet ke yung-fu-miàng he lâu [[MediaWiki:Usernameblacklist|Yung-fu-miàng het-miàng-tân lie̍t-péu]] fù-ha̍p. Chhiáng sién-chet nang-ngoi yit-ke miàng-chhṳ̂n.',
);

$messages['hr'] = array(
	'blacklistedusername' => 'Nedozvoljeno suradničko ime',
	'blacklistedusernametext' => 'Ime koje ste izabrali je na popisu [[MediaWiki:Usernameblacklist|nedozvoljenih imena]]. Molimo izaberite drugo ime.',
	'usernameblacklist' => '<pre>
# Zapisi u ovom popisu će biti rabljeni kao dio regularnog izraza pri
# provjeravanju suradničkih imena pri prijavljivanju/registraciji. Svako ime treba navesti kao dio
# popisa, npr:
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|$1 slijedeći redak|Slijedeća $1 retka|Slijedećih $1 redova}} u popisu zabranjenih suradničkih imena {{PLURAL:$1|je nevaljan|su nevaljana|je nevaljano}}; molimo ispravite {{PLURAL:$1|ga|ih|ih}} prije snimanja:',
);

$messages['hsb'] = array(
	'blacklistedusername' => 'Tute wužiwarske mjeno steji na čornej lisćinje.',
	'blacklistedusernametext' => 'Wubrane wužiwarske mjeno steji na [[MediaWiki:Usernameblacklist|čornej lisćinje wužiwarskich mjenow]]. Prošu wubjer druhe mjeno.',
	'usernameblacklist' => '<pre>
# Zapiski w tutej lisćinje budu so jako dźěl regularneho wuraza wužiwać, 
# hdyž so wužiwarske mjena z registracije blokuja. Kóždy zapisk měł dźěl
# nječisłowaneje lisćiny być, na př.
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|slědowaca linka|slědowacej lince|slědowace linki|slědowacych linkow}} {{PLURAL:$1|je|stej|su|je}}w lisćinje njewitanych wužiwarskich mjenow je {{PLURAL:$1|njepłaćiwa|njepłaćiwje|njepłaćiwe|njepłaćiwe}}; prošu skoriguj {{PLURAL:$1|ju|jej|je|je}} před składowanjom:',
);

/** Hungarian (Magyar)
 * @author Bdanee
 */
$messages['hu'] = array(
	'blacklistedusername'             => 'Feketelistás felhasználónév',
	'blacklistedusernametext'         => 'Az általad választott felhasználónév megegyezik a egyik [[MediaWiki:Usernameblacklist|feketelistán lévővel]]. Válassz másikat.',
	'usernameblacklist'               => '<pre>
# Az ebben a listában található bejegyzések egy reguláris kifejezés részei lesznek
# adott felhasználónevek tiltására regisztrációkor. Mindegyik elemnek felsorolásban kell
# lennie, pl.
#
# * Polgár Jenő
# * Kovács [Jj]ános
</pre>',
	'usernameblacklist-invalid-lines' => 'Az alábbi {{PLURAL:$1|sor hibás|sorok hibásak}} a felhasználói nevek feketelistájában; {{PLURAL:$1|javítsd|javítsd őket}} mentés előtt:',
);

$messages['hy'] = array(
	'blacklistedusername' => 'Արգելված մասնակցի անուն',
	'blacklistedusernametext' => 'Ձեր ընտրած մասնակցի անունը գտնվում է [[MediaWiki:Usernameblacklist|արգելված մասնակիցների անունների ցանկում]]։ Խնդրում ենք ընտրել մեկ այլ անուն։',
	'usernameblacklist' => '<pre>
# Այս ցանկում ընդգրկված բառերը կօգտագործվեն որպես սովորական արտահայտության մաս
# մասնակցային անունները գրանցման արգելման ժամանակ։ Յուրաքանչյուր բառ պետք է լինի
# գնդիկներով ցանկի կետ, օրինակ.
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => 'Մասնակցայի անունների արգելման ցանկի հետևյալ {{PLURAL:$1|տողը|տողերը}} անթույլատրելի են; խնդրում ենք ուղղել {{PLURAL:$1|դա|դրանք}} էջը հիշելուց առաջ.',
);

/* Indonesian (Ivan Lanin) */
	$messages['id'] = array(
	'blacklistedusername' => 'Daftar hitam nama pengguna',
	'blacklistedusernametext' => 'Nama pengguna yang Anda pilih berada dalam [[MediaWiki:Usernameblacklist|
daftar hitam nama pengguna]]. Harap pilih nama lain.',
);

$messages['is'] = array(
	'blacklistedusername' => 'Bannað notendanafn',
	'blacklistedusernametext' => 'Þetta notendanafn sem þú hefur valið passar við [[MediaWiki:Usernameblacklist|listann með bönnuðum notendanöfnum]]. Vinsamlegast veldu annað nafn.',
);

/** Italian (Italiano)
 * @author BrokenArrow
 */
$messages['it'] = array(
	'blacklistedusername'             => 'Nome utente non consentito',
	'blacklistedusernametext'         => 'Il nome utente scelto è inserito nella [[MediaWiki:Usernameblacklist|lista dei nomi non consentiti]]. Si prega di scegliere un altro nome.',
	'usernameblacklist'               => '<pre>
# Le voci contenute in questa lista verranno utilizzate per costruire una
# espressione regolare dei nomi utente ai quali non è consentita la registrazione.
# Ciascun elemento deve essere nella forma di un elenco puntato, ad es.
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => "{{PLURAL:$1|La seguente riga|Le seguenti righe}} dell'elenco dei nomi utente non consentiti {{PLURAL:$1|non è valida|non sono valide}}; si prega di correggere {{PLURAL:$1|l'errore|gli errori}} prima di salvare la pagina.",
);

/* Kazakh Arabic (kk:AlefZet) */
$messages['kk-arab'] = array(
	'blacklistedusername' => 'قارا تىزىمدەگى قاتىسۋشى اتى',
	'blacklistedusernametext' => 'تانداعان قاتىسۋشى اتىڭىز [[{{ns:mediawiki}}:Usernameblacklist| قاتىسۋشى اتى قارا تىزىمىنە]] كىرەدى.
باسقا اتاۋ تالعاڭىز.',
	'usernameblacklist' => '<pre>
# قارا تىزىمدەگى قاتىسۋشى اتىن تىركەلگى جاساۋدان ساقتاپ قالۋ ٴۇشىن بۇل تىزىمدەگى دانالار
# جۇيەلى ايتىلىم (regular expression) بولىگى بوپ پايدالانىلادى. ارقايسى دانا بايراقشامەن
# پىشىمدەلگەن ٴتىزىمدىڭ بولىگى بولۋى قاجەت, مىسالى:
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => 'قاتىسۋشى اتى قارا تىزىمىندەگى كەلەسى {{PLURAL:$1|جول|جولدار}} جارامسىز {{PLURAL:$1|بولدى|بولدى}}; ساقتاۋدىڭ الدىندا {{PLURAL:$1|بۇنى|بۇلاردى}} دۇرىستاپ شىعىڭىز:',
);
/* Kazakh Cyrillic (kk:AlefZet) */
$messages['kk-cyrl'] = array(
	'blacklistedusername' => 'Қара тізімдегі қатысушы аты',
	'blacklistedusernametext' => 'Тандаған қатысушы атыңыз [[{{ns:mediawiki}}:Usernameblacklist| қатысушы аты қара тізіміне]] кіреді.
Басқа атау талғаңыз.',
	'usernameblacklist' => '<pre>
# Қара тізімдегі қатысушы атын тіркелгі жасаудан сақтап қалу үшін бұл тізімдегі даналар
# жүйелі айтылым (regular expression) бөлігі боп пайдаланылады. Әрқайсы дана байрақшамен
# пішімделген тізімдің бөлігі болуы қажет, мысалы:
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => 'Қатысушы аты қара тізіміндегі келесі {{PLURAL:$1|жол|жолдар}} жарамсыз {{PLURAL:$1|болды|болды}}; сақтаудың алдында {{PLURAL:$1|бұны|бұларды}} дұрыстап шығыңыз:',
);
/* Kazakh Latin (kk:AlefZet) */
$messages['kk-latn'] = array(
	'blacklistedusername' => 'Qara tizimdegi qatıswşı atı',
	'blacklistedusernametext' => 'Tandağan qatıswşı atıñız [[{{ns:mediawiki}}:Usernameblacklist| qatıswşı atı qara tizimine]] kiredi.
Basqa ataw talğañız.',
	'usernameblacklist' => '<pre>
# Qara tizimdegi qatıswşı atın tirkelgi jasawdan saqtap qalw üşin bul tizimdegi danalar
# jüýeli aýtılım (regular expression) böligi bop paýdalanıladı. Ärqaýsı dana baýraqşamen
# pişimdelgen tizimdiñ böligi bolwı qajet, mısalı:
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => 'Qatıswşı atı qara tizimindegi kelesi {{PLURAL:$1|jol|joldar}} jaramsız {{PLURAL:$1|boldı|boldı}}; saqtawdıñ aldında {{PLURAL:$1|bunı|bulardı}} durıstap şığıñız:',
);

/* Kurdi */
$messages['ku'] = array(
	'blacklistedusernametext' => 'Wê navî yê te hilbijart li ser [[MediaWiki:Usernameblacklist|lîstêya navên nebaş]] e. Xêra xwe navekî din hilbijêre.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'blacklistedusername'             => 'Verbuede Benotzernimm',
	'blacklistedusernametext'         => 'De gewielte Benotzernumm steet op der [[MediaWiki:Usernameblacklist|Lëscht vun de verbuedene Benotzernimm]]. Sicht iech w.e.g en anere Benotzernumm.',
	'usernameblacklist'               => "<pre>
# D'Elementer an dëser Lëscht sinn Deel vun engem regulären Ausdrock,
# dee bei der Iwwerpréifung von neien Umeldungen op ''verbuede Benotzernimm'' applizéiert gëtt.
# All Zeil muss matt engem * ufénken, z.Bsp.
#
# * Foo
# * [Bb]ar
</pre>",
	'usernameblacklist-invalid-lines' => 'Déi folgend {{PLURAL:$1|Linn|Linnen}} an der Lëscht vun de verbuedene Benotzernimm {{PLURAL:$1|ass|sinn}} ongültig; w.e.g virum Ofspäichere verbesseren:',
);

/* Lao */
$messages['lo'] = array(
	'blacklistedusername' => 'ຊື່ຜູ້ໃຊ້ ໃນ ບັນຊີດຳ',
);

$messages['nds'] = array(
	'blacklistedusername' => 'Brukernaam op de swarte List',
	'blacklistedusernametext' => 'De Brukernaam den du utsöcht hest, liekt en Naam vun de [[{{ns:8}}:Usernameblacklist|swarte List för Brukernaams]]. Söök di en annern ut.',
	'usernameblacklist' => '<pre>
# Indrääg in disse List warrt as Deel vun en regulären Utdruck bruukt,
# bi dat Blocken vun Brukernaams bi dat Anmellen över de swarte List. Jeder Indrag schall Deel vun
# ene List mit # dor vör wesen, to’n Bispeel
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => 'Disse {{PLURAL:$1|Reeg|Regen}} in de swarte List för Brukernaams {{PLURAL:$1|is|sünd}} nich bi de Reeg; korrigeer dat doch bevör du spiekerst:',
);

/** Dutch (Nederlands)
 * @author Siebrand
 * @author SPQRobin
 */
$messages['nl'] = array(
	'blacklistedusername'             => 'Gebruikersnaam op zwarte lijst',
	'blacklistedusernametext'         => 'De gebruikersnaam die u heeft gekozen staat op de [[MediaWiki:Usernameblacklist|
zwarte lijst van gebruikersnamen]]. Kies alstublieft een andere naam.',
	'usernameblacklist'               => '<pre>
# Regels in deze lijst worden gebruikt als reguliere uitdrukking voor
# gebruikersnamen op de zwarte lijst bij inschrijving. Iedere regel moet
# onderdeel zijn van een ongenummerde lijst, bijvoorbeeld:
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => 'De volgende {{PLURAL:$1|regel|regels}} in de zwarte lijst met gebruikersnamen {{PLURAL:$1|is|zijn}} onjuist; corrigeer {{PLURAL:$1|hem|ze}} alstublieft voordat u de pagina opslaat:',
);

/** Norwegian (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'blacklistedusername'             => 'Svartelistet brukernavn',
	'blacklistedusernametext'         => 'Brukernavnet du har valgt tilsvarer et navn på [[MediaWiki:Usernameblacklist|listen over svartelistede brukernavn]]. Velg et annet navn.',
	'usernameblacklist'               => '<pre>
# Punkter på denne lista vil bruke som del av et regulært uttrykk
# når man svartelister brukernavn fra registrering. Hvert punkt
# burde være del av en punktliste, f.eks.
#
# * Arne
# * [Bb]jarne
</pre>',
	'usernameblacklist-invalid-lines' => 'Følgende {{PLURAL:$1|linje|linjer}} i brukernavnsvartelista er {{PLURAL:$1|ugyldig|ugyldige}}; vennligst rett {{PLURAL:$1|den|dem}} før du lagrer:',

);

/* Occitan (Cedric31) */
$messages['oc'] = array(
	'blacklistedusername' => 'Noms d’utilizaires en lista negra',
	'blacklistedusernametext' => 'Lo nom d’utilizaire qu\'avètz causit se tròba sus la [[MediaWiki:Usernameblacklist|lista dels noms interdiches]]. Causissètz un autre nom.',
	'usernameblacklist' => '<pre> # Las dintradas d\'aquesta lista seràn utilizadas en tant qu\'expressions regularas # per empachar la creacion de noms d\'utilizaires interdiches. Cada item deu # far partida d\'una lista de piuses, per exemple # # * Foo # * [Bb]ar </pre>',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|La linha seguenta|Las linhas seguentas}} de la lista negra dels noms d\'utilizaires {{PLURAL:$1|es invalida|son invalidas}} ; corregissetz-{{PLURAL:$1|la|las}} abans d\'enregistrar :',
);

/** Polish (Polski)
 * @author Derbeth
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'blacklistedusername'             => 'Nazwa użytkownika na czarnej liście',
	'blacklistedusernametext'         => 'Wybrana przez ciebie nazwa użytkownika pasuje do [[MediaWiki:Usernameblacklist|czarnej listy]]. Prosimy o wybranie innej nazwy.',
	'usernameblacklist'               => '<pre>
# Wpisy na tej liście będą użyte jako części wyrażenia regularnego stanowiącego czarną listę
# nazw użytkowników zakazanych przy rejestracji. Każdy element powinien być częścią
# listy wypunktowanej, np.
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|Następująca linia|Następujące linie}} na czarnej liście użytkowników {{PLURAL:$1|jest niepoprawna|są niepoprawne}} ; popraw {{PLURAL:$1|ją|je}} przed zapisaniem:',
);

/* Piedmontese (Bèrto 'd Sèra) */
$messages['pms'] = array(
	'blacklistedusername' => 'Stranòm vietà',
	'blacklistedusernametext' => 'Lë stranòm ch\'a l\'ha sërnusse a l\'é ant la [[MediaWiki:Usernameblacklist|lista djë stranòm vietà]]. Për piasì, ch\'as në sërna n\'àotr.',
	'usernameblacklist' => '<pre> # Le vos dë sta lista a saran dovrà coma part ëd n\'espression regolar quand # as buto an lista nèira djë stranòm për la registrassion. Minca vos a la dovrìa fé part ëd na # lista a balin, pr\'es. # # * Ciào # * [Nn]ineta </pre>',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|La riga|Le righe}} ant la lista nèira dë stranòm ambelessì sota a {{PLURAL:$1|l\'é nen bon-a|son nen bon-a}}; për piasì, ch\'a-j daga deuit anans che salvé:',
);

/* Portuguese (Lugusto) */
$messages['pt'] = array(
	'blacklistedusername' => 'Nome de utilizador na lista negra',
	'blacklistedusernametext' => 'O nome de utilizador selecionado é similar a um presente na [[MediaWiki:Usernameblacklist|
lista negra de nomes de utilizadores]]. Por gentileza, escolha outro.',
	'usernameblacklist' => '<pre>
# As entradas nesta lista são usadas como parte de uma expressão regular
# ao impedir utilizadores de se registarem. Cada item deverá ser parte
# de uma lista com marcadores. Exemplo:
#
# * Algo
# * [Ff]ulano
</pre>',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|A seguinte linha|As seguintes linhas}} da lista negra de nomes de utilizadores {{PLURAL:$1|é inválida|são inválidas}}; por gentileza, {{PLURAL:$1|a|as}} corrija antes de salvar as alterações:',
);

/** Russian (Русский)
 * @author .:Ajvol:.
 */
$messages['ru'] = array(
	'blacklistedusername'             => 'Запрещённое имя пользователя',
	'blacklistedusernametext'         => 'Имя пользователя, которое вы выбрали, находится в [[MediaWiki:Usernameblacklist|
списке запрещённых имён]]. Пожалуйста, выберите другое имя.',
	'usernameblacklist'               => '<pre>
# Записи этого списка будут использоваться как части регулярных выражений
# для отсеивания нежелательных имён участников во время решистрации. Каждая запись должна быть частью
# маркированного списка, например:
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|Следующая строка чёрного списка имён участников ошибочна, пожалуйста, исправьте её|||Следующие строки чёрного списка имён участников ошибочны, пожалуйста, исправьте их}} перед сохранением:',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'blacklistedusername'             => 'Používateľské meno na čiernej listine',
	'blacklistedusernametext'         => 'Používateľské meno, ktoré ste si zvolili sa nachádza na [[MediaWiki:Usernameblacklist|
čiernej listine používateľských mien]]. Prosím, zvoľte si iné.',
	'usernameblacklist'               => '<pre>
# Položky z tohto zoznamu sa použijú ako časť regulárneho výrazu pre
# zamedzenie vytvorenia účtu s daným používateľským menom. Každá položka 
# musí byť ako odrážka v zozname, napr.:
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => '{{PLURAL:$1|Nasledovný riadok|Nasledovné riadky}} čiernej listiny používateľských mien {{PLURAL:$1|je neplatný|sú neplatné}} a je potrebné {{PLURAL:$1|ho|ich}} opraviť pred uložením stránky:',
);

/* Sundanese (Irwangatot via BetaWiki) */
$messages['su'] = array(
	'blacklistedusername' => 'Ngaran pamaké nu dicorét:',
	'blacklistedusernametext' => 'Ngaran pamaké nu dipilih cocog jeung [[MediaWiki:Usernameblacklist|ngaran pamaké nu dicorét]]. Mangga pilih ngaran séjén.',
);

/* Swedish */
$messages['sv'] = array(
	'blacklistedusername' => 'Svartlistat användarnamn',
	'blacklistedusernametext' => 'Det användarnamn du vill använda är [[MediaWiki:Usernameblacklist|svartlistat]]. Välj ett annat namn.',
	'usernameblacklist' => '<pre>
# Innehållet i den här listan används som del i ett reguljärt uttryck
# för att förhindra användarnamn från att registreras.
# Varje post i listan måste inledas med en asterisk (*); t.ex.
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => 'Följande {{PLURAL:$1|rad|rader}} i listan är {{PLURAL:$1|ogiltig|ogiltiga}}; rätta {{PLURAL:$1|den|dem}} innan du sparar:',
);

/** Turkish (Türkçe)
 * @author SPQRobin
 */
$messages['tr'] = array(
	'blacklistedusername'     => 'Kara listedeki kullanıcılar',
	'blacklistedusernametext' => 'Seçtiğiniz isim [[MediaWiki:Usernameblacklist|Kara listedeki kullanıcılar]] listesinde sıralanan bir kullanıcı adıyla aynı isme sahiptir. Lütfen başka bir kullanıcı adı seçiniz.',
);

/* Cantonese (Shinjiman) */
$messages['yue'] = array(
	'blacklistedusername' => '列入黑名單嘅用戶名',
	'blacklistedusernametext' => '你所揀嘅用戶名係同[[MediaWiki:Usernameblacklist|用戶名黑名單一覽]]符合。請揀過另一個名喇。',
	'usernameblacklist' => '<pre>
# 響呢個表嘅項目，當將註冊嗰陣嘅用戶名會用來做黑名單時，
# 會成為標準表示式嘅一部份。每一個項目都應該要係點列嘅一部份，好似
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => '下面響用戶名黑名單嘅{{PLURAL:$1|一行|咁多行}}唔正確；請響儲存之前改正{{PLURAL:$1|佢|佢哋}}:',
);

/* Chinese (Simplified) (Shinjiman) */
$messages['zh-hans'] = array(
	'blacklistedusername' => '列入黑名单的用户名',
	'blacklistedusernametext' => '您所选择的用户名是与[[MediaWiki:Usernameblacklist|用户名黑名单列表]]匹配。请选择另一个名称。',
	'usernameblacklist' => '<pre>
# 在这个表中的项目，当将注册时的用户名会用来做黑名单的时候，
# 会成为标准表示式的一部份。每一个项目都应该要是点列的一部份，好像
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => '以下在用户名黑名单中{{PLURAL:$1|一行|多行}}不正确；请于保存之前改正{{PLURAL:$1|它|它们}}:',
);

/* Chinese (Traditional) (Shinjiman) */
$messages['zh-hant'] = array(
	'blacklistedusername' => '列入黑名單的用戶名',
	'blacklistedusernametext' => '您所選擇的用戶名是與[[MediaWiki:Usernameblacklist|用戶名黑名單列表]]符合。請選擇另一個名稱。',
	'usernameblacklist' => '<pre>
# 在這個表中的項目，當將註冊時的用戶名會用來做黑名單的時候，
# 會成為標準表示式的一部份。每一個項目都應該要是點列的一部份，好像
#
# * Foo
# * [Bb]ar
</pre>',
	'usernameblacklist-invalid-lines' => '以下在用戶名黑名單中{{PLURAL:$1|一行|多行}}不正確；請於保存之前改正{{PLURAL:$1|它|它們}}:',
);

$messages['de-formal'] = $messages['de'];
$messages['kk'] = $messages['kk-cyrl'];
$messages['kk-cn'] = $messages['kk-arab'];
$messages['kk-kz'] = $messages['kk-cyrl'];
$messages['kk-tr'] = $messages['kk-latn'];
$messages['zh'] = $messages['zh-hans'];
$messages['zh-cn'] = $messages['zh-hans'];
$messages['zh-hk'] = $messages['zh-hant'];
$messages['zh-sg'] = $messages['zh-hans'];
$messages['zh-tw'] = $messages['zh-hant'];
$messages['zh-yue'] = $messages['yue'];
