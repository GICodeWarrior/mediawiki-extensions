<?php
/**
 * Internationalisation file for CheckUser extension.
 *
 * @addtogroup Extensions
*/

$wgCheckUserMessages = array();

$wgCheckUserMessages['en'] = array(
	'checkuser-summary'      => 'This tool scans recent changes to retrieve the IPs used by a user or show the edit/user data for an IP.
	Users and edits by a client IP can be retrieved via XFF headers by appending the IP with "/xff". IPv4 (CIDR 16-32) and IPv6 (CIDR 64-128) are supported.
	No more than 5000 edits will be returned for performance reasons. Use this in accordance with policy.',
	'checkuser-logcase'      => 'The log search is case sensitive.',
	'checkuser'              => 'Check user',
	'group-checkuser'        => 'Check users',
	'group-checkuser-member' => 'Check user',
	'grouppage-checkuser'    => '{{ns:project}}:Check user',
	'checkuser-reason'       => 'Reason',
	'checkuser-showlog'      => 'Show log',
	'checkuser-log'          => 'Checkuser log',
	'checkuser-query'        => 'Query recent changes',
	'checkuser-target'       => 'User or IP',
	'checkuser-users'        => 'Get users',
	'checkuser-edits'        => 'Get edits from IP',
	'checkuser-ips'          => 'Get IPs',
	'checkuser-search'       => 'Search',
	'checkuser-empty'        => 'The log contains no items.',
	'checkuser-nomatch'      => 'No matches found.',
	'checkuser-check'        => 'Check',
	'checkuser-log-fail'     => 'Unable to add log entry',
	'checkuser-nolog'        => 'No log file found.',
	'checkuser-blocked'      => 'Blocked',
	'checkuser-login'        => 'Logged in, but had a valid session for another account',
	'checkuser-xff'          => 'XFF:',
	'checkuser-ip'           => 'IP:',
	'checkuser-prev-name'    => 'Previous session:',
	'checkuser-pagelogs'     => 'page logs',
);
$wgCheckUserMessages['ar'] = array(
	'checkuser'              => 'افحص مستخدم',
	'group-checkuser'        => 'مدققو مستخدم',
	'group-checkuser-member' => 'مدقق مستخدم',
	'grouppage-checkuser'    => '{{ns:project}}:تدقيق مستخدم',
);
$wgCheckUserMessages['br'] = array(
	'checkuser'              => 'Gwiriañ an implijer',
	'group-checkuser'        => 'Gwiriañ an implijerien',
	'group-checkuser-member' => 'Gwiriañ an implijer',
	'grouppage-checkuser'    => '{{ns:project}}:Gwiriañ an implijer',
);
$wgCheckUserMessages['ca'] = array(
	'checkuser'              => 'Comprova l\'usuari',
	'group-checkuser'        => 'Comprova els usuaris',
	'group-checkuser-member' => 'Comprova l\'usuari',
	'grouppage-checkuser'    => '{{ns:project}}:Comprova l\'usuari',
);
$wgCheckUserMessages['cs'] = array(
	'checkuser'              => 'Revize uživatele',
	'group-checkuser'        => 'Revizoři',
	'group-checkuser-member' => 'Revizor',
	'grouppage-checkuser'    => '{{ns:project}}:Revize uživatele',
);
$wgCheckUserMessages['de'] = array(
	'checkuser-summary'	 => 'Dieses Werkzeug durchsucht die letzten Änderungen, um die IP-Adressen eines Benutzers
	bzw. die Bearbeitungen/Benutzernamen für eine IP-Adresse zu ermitteln. Benutzer und Bearbeitungen einer IP-Adresse können auch nach Informationen aus den XFF-Headern
	abgefragt werden, indem der IP-Adresse ein „/xff“ angehängt wird. IPv4 (CIDR 16-32) und IPv6 (CIDR 64-128) werden unterstützt.
	Aus Performance-Gründen werden maximal 5000 Bearbeitungen ausgegeben. Benutze diese in Übereinstimmung mit den Richtlinien.',
	'checkuser-logcase'	 => 'Die Suche im Logbuch unterscheidet zwischen Groß- und Kleinschreibung.',
	'checkuser'              => 'Checkuser',
	'group-checkuser'        => 'Checkusers',
	'group-checkuser-member' => 'Checkuser-Berechtigter',
	'grouppage-checkuser'    => '{{ns:project}}:CheckUser',
	'checkuser-reason'	 => 'Grund',
	'checkuser-showlog'	 => 'Logbuch anzeigen',
	'checkuser-log'		 => 'Checkuser-Logbuch',
	'checkuser-query'	 => 'Letzte Änderungen abfragen',
	'checkuser-target'	 => 'Benutzer oder IP-Adresse',
	'checkuser-users'	 => 'Hole Benutzer',
	'checkuser-edits'	 => 'Hole Bearbeitungen von IP-Adresse',
	'checkuser-ips'	  	 => 'Hole IP-Adressen',
	'checkuser-search'	 => 'Suche',
	'checkuser-empty'	 => 'Das Logbuch enthält keine Einträge.',
	'checkuser-nomatch'	 => 'Keine Übereinstimmungen gefunden.',
	'checkuser-check'	 => 'Ausführen',
	'checkuser-log-fail'	 => 'Logbuch-Eintrag kann nicht hinzugefügt werden.',
	'checkuser-nolog'	 => 'Kein Logbuch vorhanden.',
	'checkuser-blocked'      => 'gesperrt',
);
$wgCheckUserMessages['fi'] = array(
	'checkuser-summary'      => 'Tämän työkalun avulla voidaan tutkia tuoreet muutokset ja paljastaa käyttäjien IP-osoitteet tai noutaa IP-osoitteiden muokkaukset ja käyttäjätiedot.
	Käyttäjät ja muokkaukset voidaan hakea myös uudelleenohjausosoitteen (X-Forwarded-For) takaa käyttämällä IP-osoitteen perässä <tt>/xff</tt> -merkintää. Työkalu tukee sekä IPv4 (CIDR 16–32) ja IPv6 (CIDR 64–128) -standardeja.',
	'checkuser-logcase'      => 'Haku lokista on kirjainkokoriippuvainen.',
	'checkuser'              => 'Osoitepaljastin',
	'group-checkuser'        => 'Osoitepaljastimen käyttäjät',
	'group-checkuser-member' => 'Osoitepaljastimen käyttäjä',
	'grouppage-checkuser'    => '{{ns:project}}:Osoitepaljastin',
	'checkuser-reason'       => 'Syy',
	'checkuser-showlog'      => 'Näytä loki',
	'checkuser-log'          => 'Osoitepaljastinloki',
	'checkuser-query'        => 'Hae tuoreet muutokset',
	'checkuser-target'       => 'Käyttäjä tai IP-osoite',
	'checkuser-users'        => 'Hae käyttäjät',
	'checkuser-edits'        => 'Hae IP-osoitteen muokkaukset',
	'checkuser-ips'          => 'Hae IP-osoitteet',
	'checkuser-search'       => 'Etsi',
	'checkuser-empty'        => 'Ei lokitapahtumia.',
	'checkuser-nomatch'      => 'Hakuehtoihin sopivia tuloksia ei löytynyt.',
	'checkuser-check'        => 'Tarkasta',
	'checkuser-log-fail'     => 'Lokitapahtuman lisäys epäonnistui',
	'checkuser-nolog'        => 'Lokitiedostoa ei löytynyt.',
);
$wgCheckUserMessages['es'] = array(
	'checkuser'              => 'Verificador del usuarios',
	'group-checkuser'        => 'Verificadors del usuarios',
	'group-checkuser-member' => 'Verificador del usuarios',
	'grouppage-checkuser'    => '{{ns:project}}:verificador del usuarios',
);
$wgCheckUserMessages['fr'] = array(
	'checkuser-summary'		 => 'Cet outil balaye les changements récents à la recherche de l’adresse IP employée 
	par un utilisateur, affiche toutes les éditions d’une adresse IP (même enregistrée), ou liste les comptes utilisés 
	par une adresse IP. Les comptes et modifications peuvent être trouvés avec une IP XFF si elle finit avec « /xff ». 
	Il est possible d’utiliser les protocoles IPv4 (CIDR 16-32) et IPv6 (CIDR 64-128). 
	Veuillez utiliser cet outil dans les limites de la charte d’utilisation.',
	'checkuser-logcase'		 => 'La recherche dans le Journal est sensible à la casse.',
	'checkuser'              => 'Vérificateur d’utilisateur',
	'group-checkuser'        => 'Vérificateurs d’utilisateur',
	'group-checkuser-member' => 'Vérificateur d’utilisateur',
	'grouppage-checkuser'    => '{{ns:projet}}:Vérificateur d’utilisateur',
	'checkuser-reason'		 => 'Motif',
	'checkuser-showlog'		 => 'Afficher le journal',
	'checkuser-log'			 => 'Notation de Vérificateur d’utilisateur',
	'checkuser-query'		 => 'Recherche par les changements récents',
	'checkuser-target'		 => 'Nom de l’utilisateur ou IP',
	'checkuser-users'		 => 'Obtenir les utilisateurs',
	'checkuser-edits'	  	 => 'Obtenir les modifications de l’IP',
	'checkuser-ips'	  	 	 => 'Obtenir les adresses IP',
	'checkuser-search'	  	 => 'Recherche',
	'checkuser-empty'	 	 => 'Le journal ne contient aucun article',
	'checkuser-nomatch'	  	 => 'Recherches infructueuses.',
	'checkuser-check'	  	 => 'Recherche',
	'checkuser-log-fail'	 => 'Impossible d’ajouter l’entrée du journal.',
	'checkuser-nolog'		 => 'Aucune entrée dans le Journal.'
);
$wgCheckUserMessages['he'] = array(
	'checkuser-summary'      => 'כלי זה סורק את השינויים האחרונים במטרה למצוא את כתובות ה־IP שהשתמש בהן משתמש מסוים או כדי להציג את כל המידע על המשתמשים שהשתמשו בכתובת IP ועל העריכות שבוצעו ממנה.
	ניתן לקבל עריכות ומשתמשים מכתובות IP של הכותרת X-Forwarded-For באמצעות הוספת הטקסט "/xff" לסוף הכתובת. הן כתובות IPv4 (כלומר, CIDR 16-32) והן כתובות IPv6 (כלומר, CIDR 64-128) נתמכות.
	לא יוחזרו יותר מ־5000 עריכות מסיבות של עומס על השרתים. אנא השתמשו בכלי זה בהתאם למדיניות.',
	'checkuser-logcase'      => 'החיפוש ביומנים הוא תלוי־רישיות.',
	'checkuser'              => 'בדיקת משתמש',
	'group-checkuser'        => 'בודקים',
	'group-checkuser-member' => 'בודק',
	'grouppage-checkuser'    => '{{ns:project}}:בודק',
	'checkuser-reason'       => 'סיבה',
	'checkuser-showlog'      => 'הצגת יומן',
	'checkuser-log'          => 'יומן בדיקות',
	'checkuser-query'        => 'בדוק שינויים אחרונים',
	'checkuser-target'       => 'שם משתמש או כתובת IP',
	'checkuser-users'        => 'הצגת משתמשים',
	'checkuser-edits'        => 'הצגת עריכות מכתובת IP מסוימת',
	'checkuser-ips'          => 'הצגת כתובות IP',
	'checkuser-search'       => 'חיפוש',
	'checkuser-empty'        => 'אין פריטים ביומן.',
	'checkuser-nomatch'      => 'לא נמצאו התאמות.',
	'checkuser-check'        => 'בדיקה',
	'checkuser-log-fail'     => 'לא ניתן היה להוסיף פריט ליומן',
	'checkuser-nolog'        => 'לא נמצא קובץ יומן.',
	'checkuser-blocked'      => 'חסום',
	'checkuser-login'        => 'מחובר, אבל בעל חיבור תקין לחשבון אחר',
	'checkuser-xff'          => 'XFF:',
	'checkuser-ip'           => 'IP:',
	'checkuser-prev-name'    => 'חיבור קודם:',
	'checkuser-pagelogs'     => 'יומני דף',
);
$wgCheckUserMessages['id'] = array(
	'checkuser-summary'		 => 'Peralatan ini memindai perubahan terbaru untuk mendapatkan IP yang digunakan oleh seorang pengguna atau menunjukkan data suntingan/pengguna untuk suatu IP.
	Pengguna dan suntingan dapat diperoleh dari suatu IP XFF dengan menambahkan "/xff" pada suatu IP. IPv4 (CIDR 16-32) dan IPv6 (CIDR 64-128) dapat digunakan.
	Karena alasan kinerja, maksimum hanya 5000 suntingan yang dapat diambil. Harap gunakan peralatan ini sesuai dengan kebijakan yang ada.',
	'checkuser-logcase'		 => 'Log ini bersifat sensitif terhadap kapitalisasi.',
	'checkuser'              => 'Pemeriksaan pengguna',
	'group-checkuser'        => 'Pemeriksa',
	'group-checkuser-member' => 'Pemeriksa',
	'grouppage-checkuser'    => '{{ns:project}}:Pemeriksa',
	'checkuser-reason'		 => 'Alasan',
	'checkuser-showlog'		 => 'Tampilkan log',
	'checkuser-log'			 => 'Log pemeriksaan pengguna',
	'checkuser-query'		 => 'Kueri perubahan terbaru',
	'checkuser-target'		 => 'Pengguna atau IP',
	'checkuser-users'		 => 'Cari pengguna',
	'checkuser-edits'	  	 => 'Cari suntingan dari IP',
	'checkuser-ips'	  	 	 => 'Cari IP',
	'checkuser-search'	  	 => 'Cari',
	'checkuser-empty'	 	 => 'Log kosong.',
	'checkuser-nomatch'	  	 => 'Data yang sesuai tidak ditemukan.',
	'checkuser-check'	  	 => 'Periksa',
	'checkuser-log-fail'	 => 'Entri log tidak dapat ditambahkan',
	'checkuser-nolog'		 => 'Berkas log tidak ditemukan.',

);
$wgCheckUserMessages['it'] = array(
	'checkuser'              => 'Controllo utenze',
	'group-checkuser'        => 'Controllori',
	'group-checkuser-member' => 'Controllore',
	'grouppage-checkuser'    => '{{ns:project}}:Controllo utenze',
);
$wgCheckUserMessages['ja'] = array(
	'checkuser'              => 'チェックユーザー',
	'group-checkuser'        => 'チェックユーザー',
	'group-checkuser-member' => 'チェックユーザー',
	'grouppage-checkuser'    => '{{ns:project}}:チェックユーザー',
);
$wgCheckUserMessages['kk-kz'] = array(
	'checkuser-summary'      => 'Бұл құрал пайдаланушы қолданған IP жайлар үшін, немесе IP жай түзету/пайдаланушы деректерін көрсету үшін жуықтағы өзгерістерді қарап шығады.
	Пайдаланушыларды мен түзетулерді XFF IP арқылы IP жайға «/xff» дегенді қосып келтіруге болады. IPv4 (CIDR 16-32) және IPv6 (CIDR 64-128) арқауланады.
	Орындаушылық себептерімен 5000 түзетуден артық қайтарылмайды. Бұны ережелерге сәйкес пайдаланыңыз.',
	'checkuser-logcase'      => 'Журналдан іздеу әріп бас-кішілігін айырады.',
	'checkuser'              => 'Пайдаланушыны сынау',
	'group-checkuser'        => 'Пайдаланушы сынаушылар',
	'group-checkuser-member' => 'пайдаланушы сынаушы',
	'grouppage-checkuser'    => '{{ns:project}}:Пайдаланушыны сынау',
	'checkuser-reason'       => 'Себебі',
	'checkuser-showlog'      => 'Журналды көрсет',
	'checkuser-log'          => 'Пайдаланушыны сынау журналы',
	'checkuser-query'        => 'Жуықтағы өзгерістерді сұраныстау',
	'checkuser-target'       => 'Пайдаланушы аты / IP жай',
	'checkuser-users'        => 'Пайдаланушыларды келтіру',
	'checkuser-edits'        => 'IP жайдан жасалған түзетулерді келтіру',
	'checkuser-ips'          => 'IP жайларды келтіру',
	'checkuser-search'       => 'Іздеу',
	'checkuser-empty'        => 'Журналда еш жазба жоқ.',
	'checkuser-nomatch'      => 'Сәйкес табылмады.',
	'checkuser-check'        => 'Сынау',
	'checkuser-log-fail'     => 'Журналға жазба үстелінбеді',
	'checkuser-nolog'        => 'Журнал файлы табылмады.'
);
$wgCheckUserMessages['kk-tr'] = array(
	'checkuser-summary'      => 'Bul qural paýdalanwşı qoldanğan IP jaýlar üşin, nemese IP jaý tüzetw/paýdalanwşı derekterin körsetw üşin jwıqtağı özgeristerdi qarap şığadı.
	Paýdalanwşılardı men tüzetwlerdi XFF IP arqılı IP jaýğa «/xff» degendi qosıp keltirwge boladı. IPv4 (CIDR 16-32) jäne IPv6 (CIDR 64-128) arqawlanadı.
	Orındawşılıq sebepterimen 5000 tüzetwden artıq qaýtarılmaýdı. Bunı erejelerge säýkes paýdalanıñız.',
	'checkuser-logcase'      => 'Jwrnaldan izdew ärip bas-kişiligin aýıradı.',
	'checkuser'              => 'Paýdalanwşını sınaw',
	'group-checkuser'        => 'Paýdalanwşı sınawşılar',
	'group-checkuser-member' => 'paýdalanwşı sınawşı',
	'grouppage-checkuser'    => '{{ns:project}}:Paýdalanwşını sınaw',
	'checkuser-reason'       => 'Sebebi',
	'checkuser-showlog'      => 'Jwrnaldı körset',
	'checkuser-log'          => 'Paýdalanwşını sınaw jwrnalı',
	'checkuser-query'        => 'Jwıqtağı özgeristerdi suranıstaw',
	'checkuser-target'       => 'Paýdalanwşı atı / IP jaý',
	'checkuser-users'        => 'Paýdalanwşılardı keltirw',
	'checkuser-edits'        => 'IP jaýdan jasalğan tüzetwlerdi keltirw',
	'checkuser-ips'          => 'IP jaýlardı keltirw',
	'checkuser-search'       => 'İzdew',
	'checkuser-empty'        => 'Jwrnalda eş jazba joq.',
	'checkuser-nomatch'      => 'Säýkes tabılmadı.',
	'checkuser-check'        => 'Sınaw',
	'checkuser-log-fail'     => 'Jwrnalğa jazba üstelinbedi',
	'checkuser-nolog'        => 'Jwrnal faýlı tabılmadı.'
);
$wgCheckUserMessages['kk-cn'] = array(
	'checkuser-summary'      => 'بۇل قۇرال پايدالانۋشى قولدانعان IP جايلار ٷشٸن, نەمەسە IP جاي تٷزەتۋ/پايدالانۋشى دەرەكتەرٸن كٶرسەتۋ ٷشٸن جۋىقتاعى ٶزگەرٸستەردٸ قاراپ شىعادى.
	پايدالانۋشىلاردى مەن تٷزەتۋلەردٸ XFF IP ارقىلى IP جايعا «/xff» دەگەندٸ قوسىپ كەلتٸرۋگە بولادى. IPv4 (CIDR 16-32) جٵنە IPv6 (CIDR 64-128) ارقاۋلانادى.
	ورىنداۋشىلىق سەبەپتەرٸمەن 5000 تٷزەتۋدەن ارتىق قايتارىلمايدى. بۇنى ەرەجەلەرگە سٵيكەس پايدالانىڭىز.',
	'checkuser-logcase'      => 'جۋرنالدان ٸزدەۋ ٵرٸپ باس-كٸشٸلٸگٸن ايىرادى.',
	'checkuser'              => 'پايدالانۋشىنى سىناۋ',
	'group-checkuser'        => 'پايدالانۋشى سىناۋشىلار',
	'group-checkuser-member' => 'پايدالانۋشى سىناۋشى',
	'grouppage-checkuser'    => '{{ns:project}}:پايدالانۋشىنى سىناۋ',
	'checkuser-reason'       => 'سەبەبٸ',
	'checkuser-showlog'      => 'جۋرنالدى كٶرسەت',
	'checkuser-log'          => 'پايدالانۋشىنى سىناۋ جۋرنالى',
	'checkuser-query'        => 'جۋىقتاعى ٶزگەرٸستەردٸ سۇرانىستاۋ',
	'checkuser-target'       => 'پايدالانۋشى اتى / IP جاي',
	'checkuser-users'        => 'پايدالانۋشىلاردى كەلتٸرۋ',
	'checkuser-edits'        => 'IP جايدان جاسالعان تٷزەتۋلەردٸ كەلتٸرۋ',
	'checkuser-ips'          => 'IP جايلاردى كەلتٸرۋ',
	'checkuser-search'       => 'ٸزدەۋ',
	'checkuser-empty'        => 'جۋرنالدا ەش جازبا جوق.',
	'checkuser-nomatch'      => 'سٵيكەس تابىلمادى.',
	'checkuser-check'        => 'سىناۋ',
	'checkuser-log-fail'     => 'جۋرنالعا جازبا ٷستەلٸنبەدٸ',
	'checkuser-nolog'        => 'جۋرنال فايلى تابىلمادى.'
);
$wgCheckUserMessages['kk'] = $wgCheckUserMessages['kk-kz'];
$wgCheckUserMessages['nl'] = array(
	'checkuser'              => 'Rechercheer gebruiker',
	'group-checkuser'        => 'Rechercheer gebruikers',
	'group-checkuser-member' => 'Rechercheer gebruiker',
	'grouppage-checkuser'    => '{{ns:project}}:Rechercheer gebruiker',
);
$wgCheckUserMessages['no'] = array(
	'checkuser-summary'      => 'Dette verktøyet går gjennom siste endringer for å hente IP-ene som er brukt av en bruker, eller viser redigerings- eller brukerinformasjonen for en IP.

Brukere og redigeringer kan hentes med en XFF-IP ved å legge til «/xff» bak IP-en. IPv4 (CIDR 16-32) og IPv6 (CIDR 64-128) støttes.

Av ytelsesgrunner vises maksimalt 5000 redigeringer. Bruk dette verktøyet i samsvar med retningslinjer.',
	'checkuser-logcase'      => 'Loggsøket er sensitivt for store/små bokstaver.',
	'checkuser'              => 'Brukersjekk',
	'group-checkuser'        => 'IP-kontrollører',
	'group-checkuser-member' => 'IP-kontrollør',
	'grouppage-checkuser'    => '{{ns:project}}:IP-kontrollør',
	'checkuser-reason'       => 'Grunn',
	'checkuser-showlog'      => 'Vis logg',
	'checkuser-log'          => 'Brukersjekkingslogg',
	'checkuser-query'        => 'Søk i siste endringer',
	'checkuser-target'       => 'Bruker eller IP',
	'checkuser-users'        => 'Få brukere',
	'checkuser-edits'        => 'Få redigeringer fra IP',
	'checkuser-ips'          => 'Få IP-er',
	'checkuser-search'       => 'Søk',
	'checkuser-empty'        => 'Loggen inneholder ingen elementer.',
	'checkuser-nomatch'      => 'Ingen treff.',
	'checkuser-check'        => 'Sjekk',
	'checkuser-log-fail'     => 'Kunne ikke legge til loggelement.',
	'checkuser-nolog'        => 'Ingen loggfil funnet.',
);
$wgCheckUserMessages['oc'] = array(
	'checkuser-summary'      => 'Aqueste esplech passa en revista los cambiaments recents per recercar l\'IPS emplegada per un utilizaire, mostrar totas las edicions fachas per una IP, o per enumerar los utilizaires qu\'an emplegat las IPs. Los utilizaires e las modificacions pòdon èsser trobatss amb una IP XFF se s\'acaba amb « /xff ». IPv4 (CIDR 16-32) e IPv6(CIDR 64-128) son suportats. Emplegatz aquò segon las cadenas de caractèrs.',
	'checkuser-logcase'      => 'La recèrca dins lo Jornal es sensibla a la cassa.',
	'checkuser'              => 'Verificator d’utilizaire',
	'group-checkuser'        => 'Verificators d’utilizaire',
	'group-checkuser-member' => 'Verificator d’utilizaire',
	'grouppage-checkuser'    => '{{ns:project}}:Verificator d’utilizaire',
	'checkuser-reason'       => 'Explicacion',
	'checkuser-showlog'      => 'Mostrar la lista obtenguda',
	'checkuser-log'          => 'Notacion de Verificator d\'utilizaire',
	'checkuser-query'        => 'Recèrca pels darrièrs cambiaments',
	'checkuser-target'       => 'Nom de l\'utilizaire o IP',
	'checkuser-users'        => 'Obténer los utilizaires',
	'checkuser-edits'        => 'Obténer las modificacions de l\'IP',
	'checkuser-ips'          => 'Obténer las IPs',
	'checkuser-search'       => 'Recèrca',
	'checkuser-empty'        => 'Lo jornal conten pas cap d\'article',
	'checkuser-nomatch'      => 'Recèrcas infructuosas.',
	'checkuser-check'        => 'Recèrca',
	'checkuser-log-fail'     => 'Incapaç d\'ajustar la dintrada del jornal.',
	'checkuser-nolog'        => 'Cap de dintrada dins lo Jornal.',
);
$wgCheckUserMessages['pl'] = array(
	'checkuser'              => 'Sprawdź użytkownika',
	'group-checkuser'        => 'Check users',
	'group-checkuser-member' => 'Check user',
	'grouppage-checkuser'    => '{{ns:project}}:Check user',
);
$wgCheckUserMessages['pt'] = array(
	'checkuser-summary'      => 'Esta ferramenta varre as Mudanças recentes para obter os endereços de IP de um utilizador ou para exibir os dados de edições/utilizadores para um IP.
	Utilizadores edições podem ser obtidos por um IP XFF colocando-se "/xff" no final do endereço. São suportados endereços IPv4 (CIDR 16-32) e IPv6 (CIDR 64-128).
	Não serão retornadas mais de 5000 edições por motivos de desempenho. O uso desta ferramenta deverá estar de acordo com as políticas.',
	'checkuser-logcase'      => 'As buscas nos registos são sensíveis a letras maiúsculas ou minúsculas.',
	'checkuser'              => 'Verificar utilizador',
	'group-checkuser'        => 'CheckUser',
	'group-checkuser-member' => 'CheckUsers',
	'grouppage-checkuser'    => '{{ns:project}}:CheckUser',
	'checkuser-reason'       => 'Motivo',
	'checkuser-showlog'      => 'Exibir registos',
	'checkuser-log'          => 'Registos de verificação de utilizadores',
	'checkuser-query'        => 'Examinar as Mudanças recentes',
	'checkuser-target'       => 'Utilizador ou IP',
	'checkuser-users'        => 'Obter utilizadores',
	'checkuser-edits'        => 'Obter edições de IPs',
	'checkuser-ips'          => 'Obter IPs',
	'checkuser-search'       => 'Pesquisar',
	'checkuser-empty'        => 'O registo não contém itens.',
	'checkuser-nomatch'      => 'Não foram encontrados resultados.',
	'checkuser-check'        => 'Verificar',
	'checkuser-log-fail'     => 'Não foi possível adicionar entradas ao registo',
+	'checkuser-nolog'        => 'Não foi encontrado o ficheiro de registos.'
);
$wgCheckUserMessages['ru'] = array(
	'checkuser-summary'      => 'Данный инструмент может быть использован, чтобы получить IP-адреса, использовавшиеся участником, либо чтобы показать правки/участников, работавших с IP-адреса.
	Правки и пользователи, которые правили с опрделеннного IP-адреса, указанного в X-Forwarded-For, можно получить, добавив префикс <code>/xff</code> к IP-адресу. Поддерживаемые версии IP: 4 (CIDR 16—32) и 6 (CIDR 64—128).
	Из соображений производительности будут показаны только первые 5000 правок. Используйте эту страницу \'\'\'только в соответствии с правилами\'\'\'.',
	'checkuser-logcase'      => 'Поиск по журналу чувствителен к регистру.',
	'checkuser'              => 'Проверить участника',
	'group-checkuser'        => 'Проверяющие',
	'group-checkuser-member' => 'проверяющий',
	'grouppage-checkuser'    => '{{ns:project}}:Проверка участников',
	'checkuser-reason'       => 'Причина',
	'checkuser-showlog'      => 'Показать журнал',
	'checkuser-log'          => 'Журнал проверки участников',
	'checkuser-query'        => 'Запросить свежие правки',
	'checkuser-target'       => 'Пользователь или IP-адрес',
	'checkuser-users'        => 'Получить пользователей',
	'checkuser-edits'        => 'Запросить правки, сделанные с IP-адреса',
	'checkuser-ips'          => 'Запросить IP-адреса',
	'checkuser-search'       => 'Искать',
	'checkuser-empty'        => 'Журнал пуст.',
	'checkuser-nomatch'      => 'Совпадений не найдено.',
	'checkuser-check'        => 'Проверить',
	'checkuser-log-fail'     => 'Невозможно добавить запись в журнал',
	'checkuser-nolog'        => 'Файл журнала не найден.'
);
$wgCheckUserMessages['sk'] = array(
	'checkuser-summary'      => 'Tento nástroj kontroluje Posledné úpravy, aby získal IP adresy používané používateľom alebo zobrazil úpravy/používateľské dáta IP adresy.
	Používateľov a úpravy je možné získať s XFF IP pridaním "/xff" k IP. Sú podporované IPv4 (CIDR 16-32) a IPv6 (CIDR 64-128).
	Z dôvodov výkonnosti nebude vrátených viac ako 5000 úprav. Túto funkciu využívajte len v súlade s platnou politikou.',
	'checkuser-logcase'      => 'Vyhľadávanie v zázname zohľadňuje veľkosť písmen.',
	'checkuser'              => 'Overiť používateľa',
	'group-checkuser'        => 'Revízor',
	'group-checkuser-member' => 'Revízori',
	'grouppage-checkuser'    => '{{ns:project}}:Revízia používateľa',
	'checkuser-reason'       => 'Dôvod',
	'checkuser-showlog'      => 'Zobraziť záznam',
	'checkuser-log'          => 'Záznam kontroly používateľov',
	'checkuser-query'        => 'Získať z posledných úprav',
	'checkuser-target'       => 'Používateľ alebo IP',
	'checkuser-users'        => 'Získať používateľov',
	'checkuser-edits'        => 'Získať úpravy z IP',
	'checkuser-ips'          => 'Získať IP adresy',
	'checkuser-search'       => 'Hľadať',
	'checkuser-empty'        => 'Záznam neobsahuje žiadne položky.',
	'checkuser-nomatch'      => 'Žiadny vyhovujúci záznam.',
	'checkuser-check'        => 'Skontrolovať',
	'checkuser-log-fail'     => 'Nebolo možné pridať položku záznamu',
	'checkuser-nolog'        => 'Nebol nájdený súbor záznamu.',
);
$wgCheckUserMessages['sr-ec'] = array(
	'checkuser'              => 'Чекјузер',
	'group-checkuser'        => 'Чекјузери',
	'group-checkuser-member' => 'Чекјузер',
	'grouppage-checkuser'    => '{{ns:project}}:Чекјузер',
);
$wgCheckUserMessages['sr-el'] = array(
	'checkuser'              => 'Čekjuzer',
	'group-checkuser'        => 'Čekjuzeri',
	'group-checkuser-member' => 'Čekjuzer',
	'grouppage-checkuser'    => '{{ns:project}}:Čekjuzer',
);
$wgCheckUserMessages['sr'] = $wgCheckUserMessages['sr-ec'];
$wgCheckUserMessages['sv'] = array(
	'checkuser-summary'      => 'Det här verktyget söker igenom de senaste ändringarna för att hämta IP-adresser för en användare, eller redigeringar och användare för en IP-adress.
Användare och redigeringar kan visas med IP-adress från XFF genom att lägga till "/xff" efter IP-adressen. Verktyget stödjer IPv4 (CIDR 16-32) och IPv6 (CIDR 64-128).
På grund av prestandaskäl så visas inte mer än 5000 redigeringar. Använd verktyget i enlighet med policy.',
	'checkuser-logcase'      => 'Loggsökning är skiftlägeskänslig.',
	'checkuser'              => 'Kontroll av användare',
	'group-checkuser'        => 'Användarkontrollanter',
	'group-checkuser-member' => 'Användarkontrollant',
	'grouppage-checkuser'    => '{{ns:project}}:Användarkontrollant',
	'checkuser-reason'       => 'Anledning',
	'checkuser-showlog'      => 'Visa logg',
	'checkuser-log'          => 'Logg över användarkontroller',
	'checkuser-query'        => 'Sök de senaste ändringarna',
	'checkuser-target'       => 'Användare eller IP',
	'checkuser-users'        => 'Hämta användare',
	'checkuser-edits'        => 'Hämta redigeringar från IP-adress',
	'checkuser-ips'          => 'Hämta IP-adresser',
	'checkuser-search'       => 'Sök',
	'checkuser-empty'        => 'Loggen innehåller inga poster.',
	'checkuser-nomatch'      => 'Inga träffar hittades.',
	'checkuser-check'        => 'Kontrollera',
	'checkuser-log-fail'     => 'Loggposten kunde inte läggas i loggfilen.',
	'checkuser-nolog'        => 'Hittade ingen loggfil.'
);
$wgCheckUserMessages['wa'] = array(
	'checkuser' => 'Verifyî l\' uzeu',
);
$wgCheckUserMessages['zh-cn'] = array(
	'checkuser-summary'      => '本工具会从{{int:recentchanges}}中查询使用者使用过的IP位址，或是一个IP位址发送出来的任何编辑记录。本工具支持IPv4及IPv6的位址。由于技术上的限制，本工具只能查询最近5000笔的记录。请确定你的行为符合守则。',
	'checkuser-logcase'      => '搜寻时请注意大小写的区分',
	'checkuser'              => '核对用户',
	'group-checkuser'        => '账户核查',
	'group-checkuser-member' => '账户核查',
	'grouppage-checkuser'    => '{{ns:project}}:账户核查',
	'checkuser-reason'       => '理由',
	'checkuser-showlog'      => '显示日志',
	'checkuser-log'          => '用户查核日志',
	'checkuser-query'        => '查询最近更改',
	'checkuser-target'       => '用户名称或IP位扯',
	'checkuser-users'        => '查询用户名称',
	'checkuser-edits'        => '从IP位址查询编辑日志',
	'checkuser-ips'          => '查询IP位址',
	'checkuser-search'       => '搜寻',
	'checkuser-empty'        => '日志里没有资料。',
	'checkuser-nomatch'      => '没有符合的资讯',
	'checkuser-check'        => '查询',
	'checkuser-log-fail'     => '无法更新日志。',
	'checkuser-nolog'        => '找不到记录档'
);
$wgCheckUserMessages['zh-tw'] = array(
	'checkuser-summary'      => '本工具會從{{int:recentchanges}}中查詢使用者使用過的IP位址，或是一個IP位址發送出來的任何編輯記錄。本工具支援IPv4及IPv6的位址。由於技術上的限制，本工具只能查詢最近5000筆的記錄。請確定您的行為符合守則。',
	'checkuser-logcase'      => '搜尋時請注意大小寫的區分',
 	'checkuser'              => '核對用戶',
 	'group-checkuser'        => '用戶查核',
 	'group-checkuser-member' => '用戶查核',
	'grouppage-checkuser'    => '{{ns:project}}:用戶查核',
	'checkuser-reason'       => '理由',
	'checkuser-showlog'      => '顯示記錄',
	'checkuser-log'          => '用戶查核記錄',
	'checkuser-query'        => '查詢最近更改',
	'checkuser-target'       => '用戶名稱或IP位扯',
	'checkuser-users'        => '查詢用戶名稱',
	'checkuser-edits'        => '從IP位址查詢編輯記錄',
	'checkuser-ips'          => '查詢IP位址',
	'checkuser-search'       => '搜尋',
	'checkuser-empty'        => '記錄裡沒有資料。',
	'checkuser-nomatch'      => '沒有符合的資訊',
	'checkuser-check'        => '查詢',
	'checkuser-log-fail'     => '無法更新記錄。',
	'checkuser-nolog'        => '找不到記錄檔'
);
$wgCheckUserMessages['zh-yue'] = array(
	'checkuser'              => '核對用戶',
	'group-checkuser'        => '稽查員',
	'group-checkuser-member' => '稽查員',
	'grouppage-checkuser'    => '{{ns:project}}:稽查員',
);
$wgCheckUserMessages['zh-hk'] = $wgCheckUserMessages['zh-tw'];
$wgCheckUserMessages['zh-sg'] = $wgCheckUserMessages['zh-cn'];

