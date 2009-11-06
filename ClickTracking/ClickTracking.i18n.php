<?php
/**
 * Internationalisation for Usability Initiative Click Tracking extension
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Nimish Gautam
 */
$messages['en'] = array(
	'clicktracking' => 'Usability Initiative click tracking',
	'clicktracking-desc' => 'Click tracking for tracking events that do not cause a page refresh',
	'ct-title' => 'Aggregated user clicks',
	'ct-event-name' => 'Event name',
	'ct-expert-header' => '"Expert" clicks',
	'ct-intermediate-header' => '"Intermediate" clicks',
	'ct-beginner-header' => '"Beginner" clicks',
	'ct-total-header' => 'Total clicks',
	'ct-start-date' => 'Start Date (YYYYMMDD)', 
	'ct-end-date' => 'End Date (YYYYMMDD)',
	'ct-increment-by' =>'Number of days each data point represents', 
	'ct-change-graph' =>'Change graph',
	'ct-beginner' => 'Beginner',
	'ct-intermediate' => 'Intermediate',
	'ct-expert' => 'Expert',
	'ct-date-range' => 'Date range',
	'ct-editing' => 'Currently editing:',
	'ct-anon-users' => 'Anonymous users',
	'ct-user-contribs' => 'Total user contributions',
	'ct-user-span' => 'User contributions in timespan',
	'ct-and' => 'and',
	'ct-update-table' => 'Update table',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Fryed-peach
 */
$messages['qqq'] = array(
	'clicktracking-desc' => '{{desc}}',
	'ct-expert-header' => '"Expert" is a user-definable category, these will show the number of clicks that fall into that category',
	'ct-intermediate-header' => '"Intermediate" is a user-definable category, these will show the number of clicks that fall into that category',
	'ct-beginner-header' => '"Beginner" is a user-definable category, these will show the number of clicks that fall into that category',
	'ct-total-header' => 'total',
	'ct-start-date' => 'YYYYMMDD refers to the date format (4-digit year, 2-digit month, 2-digit day)

{{Identical|Start date}}',
	'ct-end-date' => 'YYYYMMDD  refers to the date format (4-digit year, 2-digit month, 2-digit day)

{{Identical|End date}}',
	'ct-beginner' => 'label for a user at beginner skill level',
	'ct-intermediate' => 'label for a user at intermediate skill level',
	'ct-expert' => 'label for a user at expert skill level',
	'ct-date-range' => 'range of dates being shown currently
{{Identical|Date range}}',
	'ct-and' => '{{Identical|And}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'ct-event-name' => 'Gebeurtenis',
	'ct-expert-header' => '"Deskundige"-klieks',
	'ct-intermediate-header' => '"Gemiddeld"-klieks',
	'ct-beginner-header' => '"Beginner"-klieks',
	'ct-total-header' => 'Totaal klieke',
	'ct-start-date' => 'Begindatum (JJJJMMDD)',
	'ct-end-date' => 'Einddatum (JJJJMMDD)',
	'ct-beginner' => 'Beginner',
	'ct-intermediate' => 'Gemiddeld',
	'ct-expert' => 'Deskundige',
	'ct-date-range' => 'Periode',
	'ct-editing' => 'Tans besig met redigering:',
	'ct-anon-users' => 'Anonieme gebruikers',
	'ct-user-contribs' => 'Totaal aantal gebruikersbydraes',
	'ct-and' => 'en',
	'ct-update-table' => 'Opdateer tabel',
);

/** Arabic (العربية)
 * @author Meno25
 * @author OsamaK
 */
$messages['ar'] = array(
	'clicktracking' => 'تتبع نقرات مبادرة الاستخدامية',
	'ct-event-name' => 'اسم الحدث',
	'ct-expert-header' => 'نقرات "الخبراء"',
	'ct-intermediate-header' => 'نقرات "المتوسطين"',
	'ct-beginner-header' => 'نقرات "المبتدئين"',
	'ct-total-header' => 'مجموع النقرات',
	'ct-beginner' => 'مبتدئ',
	'ct-intermediate' => 'متوسط',
	'ct-expert' => 'خبير',
	'ct-date-range' => 'نطاق التاريخ',
	'ct-editing' => 'يحرر حاليًا:',
	'ct-anon-users' => 'المستخدمون المجهولون',
	'ct-user-contribs' => 'مجموع مساهمات المستخدم',
	'ct-user-span' => 'مساهمات المستخدم في فترة زمنية',
	'ct-and' => 'و',
	'ct-update-table' => 'حدّث الجدول',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 * @author Red Winged Duck
 */
$messages['be-tarask'] = array(
	'clicktracking' => 'Сачэньне за націскамі кампутарнай мышшу ў межах ініцыятывы па паляпшэньні зручнасьці і прастаты выкарыстаньня',
	'clicktracking-desc' => 'Сачэньне за націскамі кампутарнай мышшу, прызначанае для сачэньня за здарэньнямі, якія не вядуць да абнаўленьня старонкі',
	'ct-title' => 'Групаваныя націскі мышшу ўдзельнікам',
	'ct-event-name' => 'Назва падзеі',
	'ct-expert-header' => 'Націскі мышшу для «Экспэрта»',
	'ct-intermediate-header' => 'Націскі мышшу для «Сярэдняга»',
	'ct-beginner-header' => 'Націскі мышшу для «Пачынаючага»',
	'ct-total-header' => 'Усяго націскаў мышшу',
	'ct-start-date' => 'Дата пачатку (ГГГГММДзДз)',
	'ct-end-date' => 'Дата сканчэньня (ГГГГММДзДз)',
	'ct-increment-by' => 'Колькасьць дзён, якія адлюстроўваюцца ў кожным пункце зьвестак',
	'ct-change-graph' => 'Зьмяніць графік',
	'ct-beginner' => 'Пачынаючы',
	'ct-intermediate' => 'Сярэдні',
	'ct-expert' => 'Экспэрт',
	'ct-date-range' => 'Дыяпазон датаў',
	'ct-editing' => 'Цяперашняе рэдагаваньне:',
	'ct-anon-users' => 'Ананімныя ўдзельнікі',
	'ct-user-contribs' => 'Агульны ўнёсак удзельніка',
	'ct-user-span' => 'Унёсак удзельніка за адлегласьць часу',
	'ct-and' => 'і',
	'ct-update-table' => 'Абнавіць табліцу',
);

/** Bengali (বাংলা)
 * @author Bellayet
 */
$messages['bn'] = array(
	'clicktracking' => 'ইউজাবিলিটি ইনিসিয়াটিভ ক্লিক ট্র্যাকিং',
	'ct-event-name' => 'ইভেন্টের নাম',
	'ct-expert-header' => '"দক্ষ" ক্লিক',
	'ct-intermediate-header' => '"মাধ্যমিক" ক্লিক',
	'ct-beginner-header' => '"নবাগত" ক্লিক',
	'ct-total-header' => 'মোট ক্লিক',
	'ct-start-date' => 'শুরুর তারিখ (YYYYMMDD)',
	'ct-end-date' => 'শেষ তারিখ  (YYYYMMDD)',
	'ct-increment-by' => 'প্রতিটি ডাটা পয়েন্ট দিনের সংখ্যা বোঝায়',
	'ct-change-graph' => 'লেখচিত্র পরিবর্তন',
	'ct-beginner' => 'নবাগত',
	'ct-intermediate' => 'মাধ্যমিক',
	'ct-expert' => 'দক্ষ',
);

/** Breton (Brezhoneg)
 * @author Fohanno
 * @author Fulup
 */
$messages['br'] = array(
	'clicktracking' => 'Heuliañ klikoù an intrudu implijadusted',
	'clicktracking-desc' => "Heuliañ klikoù, talvezout a ra da heuliañ an darvoudoù na vez ket adkarget ur bajenn d'ho heul",
	'ct-title' => "Sammad ar c'hlikoù implijerien",
	'ct-event-name' => 'Anv an darvoud',
	'ct-total-header' => "Hollad ar c'hlikoù",
	'ct-start-date' => 'Deiziad kregiñ (AAAAMMJJ)',
	'ct-end-date' => 'Deiziad echuiñ (AAAAMMJJ)',
	'ct-beginner' => 'Deraouad',
	'ct-intermediate' => 'Etre',
	'ct-expert' => 'Mailh',
	'ct-editing' => "Oc'h aozañ er mare-mañ :",
	'ct-anon-users' => 'implijerien dizanv',
	'ct-and' => 'ha(g)',
	'ct-update-table' => 'Hizivaat an daolenn',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'clicktracking' => 'Praćenje klikova u Inicijativi upotrebljivosti',
	'clicktracking-desc' => 'Praćenje klikova, napravljeno za praćenje događaja koji ne proizvode osvježavanje stanice',
	'ct-title' => 'Akumulirani korisnički klikovi',
	'ct-event-name' => 'Naziv događaja',
	'ct-expert-header' => "''Stručnjački'' klikovi",
	'ct-intermediate-header' => "''Napredni'' klikovi",
	'ct-beginner-header' => "''Početnički'' klikovi",
	'ct-total-header' => 'Ukupno klikova',
	'ct-start-date' => 'Početni datum (YYYYMMDD)',
	'ct-end-date' => 'Završni datum (YYYYMMDD)',
	'ct-increment-by' => 'Broj dana koje svaka tačka podataka predstavlja',
	'ct-change-graph' => 'Promijeni grafikon',
	'ct-beginner' => 'Početnik',
	'ct-intermediate' => 'Napredni',
	'ct-expert' => 'Stručnjak',
	'ct-date-range' => 'Raspon podataka',
	'ct-editing' => 'Trenutno se uređuje:',
	'ct-anon-users' => 'Anonimni korisnici',
	'ct-user-contribs' => 'Ukupni doprinosi korisnika',
	'ct-user-span' => 'Korisnički doprinosi u vremenskom periodu',
	'ct-and' => 'i',
	'ct-update-table' => 'Ažuriranje tabele',
);

/** Catalan (Català)
 * @author SMP
 */
$messages['ca'] = array(
	'ct-total-header' => 'Clics totals',
	'ct-start-date' => "Data d'inici (AAAAMMDD)",
	'ct-end-date' => 'Data de finalització (AAAAMMDD)',
	'ct-beginner' => 'Principiant',
	'ct-intermediate' => 'Intermedi',
	'ct-expert' => 'Expert',
	'ct-anon-users' => 'Usuaris anònims',
	'ct-user-contribs' => "Total de contribucions de l'usuari",
	'ct-and' => 'i',
);

/** Czech (Česky)
 * @author Mormegil
 */
$messages['cs'] = array(
	'clicktracking' => 'Sledování kliknutí pro Iniciativu použitelnosti',
	'clicktracking-desc' => 'Sledování kliknutí pro sledování událostí, které nezpůsobují znovunačtení stránky',
	'ct-event-name' => 'Název události',
	'ct-expert-header' => 'Kliknutí „expertů“',
	'ct-intermediate-header' => 'Kliknutí „pokročilých“',
	'ct-beginner-header' => 'Kliknutí „začátečníků“',
	'ct-total-header' => 'Celkem kliknutí',
	'ct-start-date' => 'Datum začátku (RRRRMMDD)',
	'ct-end-date' => 'Datum konce (RRRRMMDD)',
	'ct-increment-by' => 'Počet dní reprezentovaných každým bodem',
	'ct-change-graph' => 'Změnit graf',
	'ct-beginner' => 'Začátečník',
	'ct-intermediate' => 'Pokročilý',
	'ct-expert' => 'Expert',
	'ct-date-range' => 'Časový rozsah',
	'ct-editing' => 'Aktivní uživatelé:',
	'ct-anon-users' => 'Anonymní uživatelé',
	'ct-user-contribs' => 'Celkem příspěvků uživatele',
	'ct-user-span' => 'Příspěvků uživatele během',
	'ct-and' => 'a zároveň',
);

/** German (Deutsch)
 * @author Metalhead64
 * @author Umherirrender
 */
$messages['de'] = array(
	'clicktracking' => 'Benutzerfreundlichkeitsinitiative Klickverfolgung',
	'clicktracking-desc' => 'Klickverfolgung, gedacht für die Aufzeichnung von Aktionen, die nicht zu einer Seitenaktualisierung führen',
	'ct-title' => 'Gesamtsumme aller Benutzerklicks',
	'ct-event-name' => 'Ereignisname',
	'ct-expert-header' => 'Expertenklicks',
	'ct-intermediate-header' => 'Klicks von Mittleren',
	'ct-beginner-header' => 'Anfängerklicks',
	'ct-total-header' => 'Gesamtklicks',
	'ct-start-date' => 'Start (JJJJMMTT)',
	'ct-end-date' => 'Ende (JJJJMMTT)',
	'ct-increment-by' => 'Anzahl der Tage, die von jedem Datenpunkt repräsentiert werden',
	'ct-change-graph' => 'Grafik ändern',
	'ct-beginner' => 'Anfänger',
	'ct-intermediate' => 'Mittlere',
	'ct-expert' => 'Experte',
	'ct-date-range' => 'Datumsbereich',
	'ct-editing' => 'Derzeit bearbeitet von:',
	'ct-anon-users' => 'Anonyme Benutzer',
	'ct-user-contribs' => 'Gesamte Benutzerbeiträge',
	'ct-user-span' => 'Benutzerbeiträge in Zeitspanne',
	'ct-and' => 'und',
	'ct-update-table' => 'Tabelle aktualisieren',
);

/** Zazaki (Zazaki)
 * @author Aspar
 * @author Xoser
 */
$messages['diq'] = array(
	'clicktracking' => 'tıknayiş u temaşakerdışê teşebbusê şuxul biyayişi',
	'clicktracking-desc' => 'Eka yew pele ke reciwane nibeno, ay ser gocekê trackingî rê bitekne',
	'ct-title' => 'tıknayişê karberê kombiyayeyi',
	'ct-event-name' => 'nameyê meselayi',
	'ct-expert-header' => 'tıknayişê "tecrubeyınan"',
	'ct-intermediate-header' => 'tıknayişê "seviyeya weseti"',
	'ct-beginner-header' => 'tıknayişê "ecemiyani"',
	'ct-total-header' => 'heme tıknayişi',
	'ct-start-date' => 'tarixê destpêkerdışi (YYYYMMDD)',
	'ct-end-date' => 'tarixê qediyayişi (YYYYMMDD)',
	'ct-increment-by' => 'Number of days each data point represents',
	'ct-change-graph' => 'Grafiki bıvurnê',
	'ct-beginner' => 'ecemi',
	'ct-intermediate' => 'seviyeya weseti',
	'ct-expert' => 'tecrubeyın',
	'ct-date-range' => 'tarix de',
	'ct-editing' => 'nıka vurneno',
	'ct-anon-users' => 'karberê anonimi',
	'ct-user-contribs' => 'heme ardimê karberi',
	'ct-user-span' => 'ardimê karberi',
	'ct-and' => 'u',
	'ct-update-table' => 'tabloya rocaneyi',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'clicktracking' => 'Kliknjeńske pśeslědowanje iniciatiwy wužywajobnosći',
	'clicktracking-desc' => 'Kliknjeńske pśeslědowanje, myslone za slědowanje tšojenjow, kótarež njezawinuju aktualizaciju boka',
	'ct-title' => 'Nakopjone wužywarske kliknjenja',
	'ct-event-name' => 'Mě tšojenja',
	'ct-expert-header' => 'Kliknjenja "ekspertow"',
	'ct-intermediate-header' => 'Kliknjenja "pókšacanych"',
	'ct-beginner-header' => 'Kliknjenja "zachopjeńkarjow"',
	'ct-total-header' => 'Kliknjenja dogromady',
	'ct-start-date' => 'Zachopny datum (YYYYMMDD)',
	'ct-end-date' => 'Kóńcny datum (YYYYMMDD)',
	'ct-increment-by' => 'Licba dnjow, kótaruž kuždy datowy dypk reprezentěrujo',
	'ct-change-graph' => 'Grafisku liniju změniś',
	'ct-beginner' => 'Zachopjeńkaŕ',
	'ct-intermediate' => 'Pókšacony',
	'ct-expert' => 'Ekspert',
	'ct-date-range' => 'Datumowy wobcerk',
	'ct-editing' => 'Tuchylu so wobźěłujo:',
	'ct-anon-users' => 'Anonymne wužywarje',
	'ct-user-contribs' => 'Wužywarske pśinoski dogromady',
	'ct-user-span' => 'Wužywarske pśinoski w casowem wótrězku',
	'ct-and' => 'a',
	'ct-update-table' => 'Tabelu aktualizěrowaś',
);

/** Greek (Ελληνικά)
 * @author Consta
 * @author Crazymadlover
 * @author Omnipaedista
 * @author ZaDiak
 */
$messages['el'] = array(
	'clicktracking' => 'Πατήστε παρακολούθηση της Πρωτοβουλίας Χρηστικότητας',
	'clicktracking-desc' => 'Πατήστε παρακολούθηση, προορίζεται για την παρακολούθηση εκδηλώσεων που δεν προκαλούν ανανέωση σελίδας',
	'ct-event-name' => 'Όνομα γεγονότος',
	'ct-expert-header' => 'Κλικ "ειδικοί"',
	'ct-intermediate-header' => 'Κλικ "μέτριοι"',
	'ct-beginner-header' => 'Κλικ "αρχάριοι"',
	'ct-total-header' => 'Συνολικά κλικ',
	'ct-start-date' => 'Ημερομηνία έναρξης (ΕΕΕΕΜΜΗΗ)',
	'ct-end-date' => 'Ημερομηνία λήξης (ΕΕΕΕΜΜΗΗ)',
	'ct-change-graph' => 'Αλλαγή γραφήματος',
	'ct-beginner' => 'Αρχάριος',
	'ct-intermediate' => 'Μέτριος',
	'ct-expert' => 'Ειδικός',
	'ct-and' => 'και',
);

/** Esperanto (Esperanto)
 * @author Lucas
 * @author Yekrats
 */
$messages['eo'] = array(
	'clicktracking-desc' => 'Sekvado de klakoj, por sekvi klakeventojn kiu ne kaŭzas paĝan refreŝigon',
	'ct-event-name' => 'Eventa nomo',
	'ct-expert-header' => 'Klakoj de "Spertuloj"',
	'ct-intermediate-header' => 'Klakoj de "progresantoj"',
	'ct-beginner-header' => 'Klakoj de "novuloj"',
	'ct-total-header' => 'Sumo de klakoj',
	'ct-start-date' => 'Komenca Dato (JJJJMMTT)',
	'ct-end-date' => 'Fina Dato (JJJJMMTT)',
	'ct-beginner' => 'Novulo',
	'ct-intermediate' => 'Progresanto',
	'ct-expert' => 'Spertulo',
	'ct-editing' => 'Nune redaktante:',
	'ct-anon-users' => 'Sennomaj uzantoj',
	'ct-and' => 'kaj',
);

/** Spanish (Español)
 * @author Antur
 * @author Crazymadlover
 * @author Dalton2
 * @author Locos epraix
 * @author Translationista
 */
$messages['es'] = array(
	'clicktracking' => 'Iniciativa de usabilidad de seguimiento mediante clics',
	'clicktracking-desc' => 'Seguimiento mediante clics de eventos que no producen refresco de página',
	'ct-title' => 'Clics de usuario agregados',
	'ct-event-name' => 'Nombre de evento',
	'ct-expert-header' => 'Clics "de experto"',
	'ct-intermediate-header' => 'Clics "de usuario intermedio"',
	'ct-beginner-header' => 'Clics "de principiante"',
	'ct-total-header' => 'Clics totales',
	'ct-start-date' => 'Fecha de inicio (AAMMDD)',
	'ct-end-date' => 'Fecha de fin (AAMMDD)',
	'ct-increment-by' => 'Número de días que cada punto representa',
	'ct-change-graph' => 'Gráfico de cambio',
	'ct-beginner' => 'Principiante',
	'ct-intermediate' => 'Intemedio',
	'ct-expert' => 'Experto',
	'ct-date-range' => 'Rango de fecha',
	'ct-editing' => 'Actualmente editando:',
	'ct-anon-users' => 'Usuarios anónimos',
	'ct-user-contribs' => 'Total de contribuciones de los usuarios',
	'ct-user-span' => 'Contribuciones de usuario en lapso de tiempo',
	'ct-and' => 'y',
	'ct-update-table' => 'Actualizar tabla',
);

/** Estonian (Eesti)
 * @author Pikne
 */
$messages['et'] = array(
	'clicktracking' => 'Kasutushõlpsuse algatuse klõpsujälitus',
	'ct-event-name' => 'Sündmuse nimi',
	'ct-expert-header' => 'Asjatundjaklõpsud',
	'ct-intermediate-header' => 'Edasijõudnuklõpsud',
	'ct-beginner-header' => 'Algajaklõpsud',
	'ct-start-date' => 'Alguskuupäev (AAAAKKPP)',
	'ct-end-date' => 'Lõpukuupäev (AAAAKKPP)',
	'ct-beginner' => 'Algaja',
	'ct-intermediate' => 'Edasijõudnu',
	'ct-expert' => 'Asjatundja',
	'ct-date-range' => 'Kuupäevavahemik',
	'ct-editing' => 'Parajasti muutmisel:',
	'ct-anon-users' => 'Nimetud kasutajad',
	'ct-and' => 'ja',
);

/** Basque (Euskara)
 * @author An13sa
 */
$messages['eu'] = array(
	'ct-event-name' => 'Ekintzaren izena',
	'ct-expert-header' => '"Aditu" klikak',
	'ct-intermediate-header' => '"Maila ertaineko" klikak',
	'ct-beginner-header' => '"Hasiberri" klikak',
	'ct-total-header' => 'Klikak guztira',
	'ct-start-date' => 'Hasiera Data (UUUUHHEE)',
	'ct-end-date' => 'Amaiera Data (UUUUHHEE)',
	'ct-change-graph' => 'Grafikoa aldatu',
	'ct-beginner' => 'Hasiberria',
	'ct-intermediate' => 'Maila ertainekoa',
	'ct-expert' => 'Aditua',
	'ct-anon-users' => 'Lankide anonimoak',
	'ct-and' => 'eta',
	'ct-update-table' => 'Taula eguneratu',
);

/** Finnish (Suomi)
 * @author Cimon Avaro
 * @author Crt
 * @author Str4nd
 */
$messages['fi'] = array(
	'clicktracking' => 'Käytettävyyshankkeen klikkausten seuranta',
	'clicktracking-desc' => 'Klikkausten seuranta, tarkoituksena seurata tapahtumia, jotka eivät aiheuta sivun uudelleenlataamista.',
	'ct-title' => 'Käyttäjän napsautuksien yhteenlaskettu määrä',
	'ct-event-name' => 'Tapahtuman nimi',
	'ct-expert-header' => '”Asiantuntija”-napsautukset',
	'ct-intermediate-header' => '”Keskitaso”-napsautukset',
	'ct-beginner-header' => '”Aloittelija”-napsautukset',
	'ct-total-header' => 'Napsautuksia yhteensä',
	'ct-start-date' => 'Alkamispäivä (VVVVKKPP)',
	'ct-end-date' => 'Lopetuspäivä (VVVVKKPP)',
	'ct-increment-by' => 'Päivien määrä, jota kukin tietopiste esittää',
	'ct-change-graph' => 'Vaihda kuvaajaa',
	'ct-beginner' => 'Aloittelija',
	'ct-intermediate' => 'Keskitaso',
	'ct-expert' => 'Asiantuntija',
	'ct-date-range' => 'Aikaväli',
	'ct-editing' => 'Tällä hetkellä muokkaamassa:',
	'ct-anon-users' => 'Anonyymit käyttäjät',
	'ct-user-contribs' => 'Käyttäjän kaikki muokkaukset',
	'ct-user-span' => 'Käyttäjän muokkaukset aikavälillä',
	'ct-and' => 'ja',
	'ct-update-table' => 'Päivitä taulukko',
);

/** French (Français)
 * @author McDutchie
 * @author PieRRoMaN
 */
$messages['fr'] = array(
	'clicktracking' => "Suivi de clics de l'initiative d'utilisabilité",
	'clicktracking-desc' => 'Suivi de clics, visant à traquer les événements qui ne causent pas un rechargement de page',
	'ct-title' => "Agrégation des clics d'utilisateurs",
	'ct-event-name' => "Nom de l'événement",
	'ct-expert-header' => 'Clics « experts »',
	'ct-intermediate-header' => 'Clics « intermédiaires »',
	'ct-beginner-header' => 'Clics « débutants »',
	'ct-total-header' => 'Total des clics',
	'ct-start-date' => 'Date de début (AAAAMMJJ)',
	'ct-end-date' => 'Date de fin (AAAAMMJJ)',
	'ct-increment-by' => 'Nombre de jours que représente chaque point de donnée',
	'ct-change-graph' => 'Changer le graphe',
	'ct-beginner' => 'Débutant',
	'ct-intermediate' => 'Intermédiaire',
	'ct-expert' => 'Expert',
	'ct-date-range' => 'Portée de la date',
	'ct-editing' => 'En cours de modification :',
	'ct-anon-users' => 'Utilisateurs anonymes',
	'ct-user-contribs' => 'Contributions totales des utilisateurs',
	'ct-user-span' => "Contributions de l'utilisateur sur la durée",
	'ct-and' => 'et',
	'ct-update-table' => 'Mettre à jour la table',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'clicktracking' => 'Seguimento dos clics da Iniciativa de usabilidade',
	'clicktracking-desc' => 'Seguimento dos clics, co obxectivo de seguir os acontecementos que non causan unha actualización da páxina',
	'ct-title' => 'Clics de usuario engadidos',
	'ct-event-name' => 'Nome do evento',
	'ct-expert-header' => 'Clics "expertos"',
	'ct-intermediate-header' => 'Clics "intermedios"',
	'ct-beginner-header' => 'Clics "principiantes"',
	'ct-total-header' => 'Total de clics',
	'ct-start-date' => 'Data de inicio (AAAAMMDD)',
	'ct-end-date' => 'Data de fin (AAAAMMDD)',
	'ct-increment-by' => 'Número de días que representa cada punto de datos',
	'ct-change-graph' => 'Cambiar a gráfica',
	'ct-beginner' => 'Principiante',
	'ct-intermediate' => 'Intermedio',
	'ct-expert' => 'Experto',
	'ct-date-range' => 'Intervalo de datas',
	'ct-editing' => 'Editando nestes intres:',
	'ct-anon-users' => 'Usuarios anónimos',
	'ct-user-contribs' => 'Contribucións totais do usuario',
	'ct-user-span' => 'Contribucións do usuario nun período de tempo',
	'ct-and' => 'e',
	'ct-update-table' => 'Actualizar a táboa',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'clicktracking' => 'D Klickverfolgig vu dr Benutzerfrejndligkeits-Initiative',
	'clicktracking-desc' => 'Klickverfolgig, fir Aktione, wu kei Syteaktualisierig verursache',
	'ct-title' => 'Aggregierti Benutzerklicks',
	'ct-event-name' => 'Ereignis',
	'ct-expert-header' => '„Experte“-Klicks',
	'ct-intermediate-header' => 'Klicks vu „Mittlere“',
	'ct-beginner-header' => '„Aafänger“-Klicks',
	'ct-total-header' => 'Klicks insgsamt',
	'ct-start-date' => 'Startdatum (JJJJMMTT)',
	'ct-end-date' => 'Änddatum (JJJJMMTT)',
	'ct-increment-by' => 'Aazahl vu Täg, wu ne jede Punkt derfir stoht',
	'ct-change-graph' => 'Abbildig ändere',
	'ct-beginner' => 'Aafänger',
	'ct-intermediate' => 'Mittlere',
	'ct-expert' => 'Expert',
	'ct-date-range' => 'Datumsberyych',
	'ct-editing' => 'Am bearbeite:',
	'ct-anon-users' => 'Anonymi Benutzer',
	'ct-user-contribs' => 'Gsamti Benutzerbyytreg',
	'ct-user-span' => 'Benutzerbyytreg in Zytspanne',
	'ct-and' => 'un',
	'ct-update-table' => 'Tabälle aktualisiere',
);

/** Hebrew (עברית)
 * @author Rotem Liss
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'clicktracking' => 'מעקב לחיצות במיזם השימושיות',
	'clicktracking-desc' => 'מעקב לחיצות עבור בדיקת אירועים שאינם גורמים לרענון דף',
	'ct-title' => 'הכמות המצטברת של לחיצות המשתמשים',
	'ct-event-name' => 'שם האירוע',
	'ct-expert-header' => 'לחיצות של "מומחים"',
	'ct-intermediate-header' => 'לחיצות של "בינוניים"',
	'ct-beginner-header' => 'לחיצות של "מתחילים"',
	'ct-total-header' => 'סך כל הלחיצות',
	'ct-start-date' => 'תאריך התחלה (YYYYMMDD)',
	'ct-end-date' => 'תאריך סיום (YYYYMMDD)',
	'ct-increment-by' => 'מספר הימים שמייצגת כל נקודת מידע',
	'ct-change-graph' => 'שינוי הגרף',
	'ct-beginner' => 'מתחיל',
	'ct-intermediate' => 'בינוני',
	'ct-expert' => 'מומחה',
	'ct-date-range' => 'טווח התאריכים',
	'ct-editing' => 'כרגע בעריכה:',
	'ct-anon-users' => 'משתמשים אנונימיים',
	'ct-user-contribs' => 'סך כל תרומות המשתמשים',
	'ct-user-span' => 'תרומות המשתמשים לאורך הזמן',
	'ct-and' => 'וגם',
	'ct-update-table' => 'עדכון הטבלה',
);

/** Croatian (Hrvatski)
 * @author Mvrban
 * @author Suradnik13
 */
$messages['hr'] = array(
	'clicktracking' => 'Praćenje klikova u Inicijativi za uporabljivosti',
	'clicktracking-desc' => 'Praćenje klikova, napravljeno za praćenje događaja koji ne dovode do osvježavanja stanice',
	'ct-start-date' => 'Početni datum (DDMMYYYY)',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'clicktracking' => 'Kliknjenske přesćěhanje iniciatiwy wužiwajomnosće',
	'clicktracking-desc' => 'Kliknjenske přesćěhanje, myslene za přesćěhowanje podawkow, kotrež aktualizaciju strony njezawinuja',
	'ct-title' => 'Nakopjene wužiwarske kliknjenja',
	'ct-event-name' => 'Mjenp podawka',
	'ct-expert-header' => 'Kliknjenja "ekspertow"',
	'ct-intermediate-header' => 'Kliknjenja "pokročenych"',
	'ct-beginner-header' => 'Kliknjenja "započatkarjow"',
	'ct-total-header' => 'Kliknjenja dohromady',
	'ct-start-date' => 'Spočatny datum (YYYYMMDD)',
	'ct-end-date' => 'Kónčny datum (YYYYMMDD)',
	'ct-increment-by' => 'Ličba dnjow, kotruž kóždy datowy dypk reprezentuje',
	'ct-change-graph' => 'Grafisku liniju změnić',
	'ct-beginner' => 'Započatkar',
	'ct-intermediate' => 'Pokročeny',
	'ct-expert' => 'Ekspert',
	'ct-date-range' => 'Datumowy rozsah',
	'ct-editing' => 'Tuchwilu so wobdźěłuje:',
	'ct-anon-users' => 'Anonymni wužiwarjo',
	'ct-user-contribs' => 'Wužiwarske přinoški dohromady',
	'ct-user-span' => 'Wužiwarske přinoški w časowym wotrězku',
	'ct-and' => 'a',
	'ct-update-table' => 'Tabelu aktualizować',
);

/** Hungarian (Magyar)
 * @author Bdamokos
 * @author Dani
 * @author Glanthor Reviol
 */
$messages['hu'] = array(
	'clicktracking' => 'Usability Initiative kattintásszámláló',
	'clicktracking-desc' => 'Kattintásszámláló, az olyan események rögzítésére, melyekhez nem szükséges a lap frissítése',
	'ct-title' => 'Aggregált felhasználói kattintások',
	'ct-event-name' => 'Esemény neve',
	'ct-expert-header' => '„Szakértők” kattintásai',
	'ct-intermediate-header' => '„Középhaladók” kattintásai',
	'ct-beginner-header' => '„Kezdők” kattintásai',
	'ct-total-header' => 'Összes kattintás',
	'ct-start-date' => 'Kezdődátum (ÉÉÉÉHHNN)',
	'ct-end-date' => 'Végdátum (ÉÉÉÉHHNN)',
	'ct-increment-by' => 'Az egyes adatpontok által jelölt napok száma',
	'ct-change-graph' => 'Változásgrafikon',
	'ct-beginner' => 'Kezdő',
	'ct-intermediate' => 'Középhaladó',
	'ct-expert' => 'Szakértő',
	'ct-date-range' => 'Időszak',
	'ct-editing' => 'Jelenleg szerkesztők:',
	'ct-anon-users' => 'Névtelen szerkesztők',
	'ct-user-contribs' => 'Összes szerkesztői közreműködés',
	'ct-user-span' => 'A szerkesztő közreműködései az időszakon  belül',
	'ct-and' => 'és',
	'ct-update-table' => 'Táblázat frissítése',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'clicktracking' => 'Traciamento de clics del Initiativa de Usabilitate',
	'clicktracking-desc' => 'Traciamento de clics, pro traciar eventos que non causa un recargamento de pagina',
	'ct-title' => 'Clics de usator aggregate',
	'ct-event-name' => 'Nomine del evento',
	'ct-expert-header' => 'Clics "experte"',
	'ct-intermediate-header' => 'Clics "intermedie"',
	'ct-beginner-header' => 'Clics "comenciante"',
	'ct-total-header' => 'Total de clics',
	'ct-start-date' => 'Data de initio (AAAAMMDD)',
	'ct-end-date' => 'Data de fin (AAAAMMDD)',
	'ct-increment-by' => 'Numero de dies representate per cata puncto de datos',
	'ct-change-graph' => 'Cambiar graphico',
	'ct-beginner' => 'Comenciante',
	'ct-intermediate' => 'Intermedie',
	'ct-expert' => 'Experte',
	'ct-date-range' => 'Intervallo de datas',
	'ct-editing' => 'Actualmente modificante:',
	'ct-anon-users' => 'Usatores anonyme',
	'ct-user-contribs' => 'Total de contributiones de usatores',
	'ct-user-span' => 'Contributiones de usatores in intervallo de tempore',
	'ct-and' => 'e',
	'ct-update-table' => 'Actualisar tabella',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 * @author Irwangatot
 */
$messages['id'] = array(
	'clicktracking' => 'Pelacak klik Inisiatif Kebergunaan',
	'clicktracking-desc' => "Pelacak klik, digunakan untuk melacak kejadian yang tidak menyebabkan ''refresh'' halaman",
	'ct-title' => 'Total klik pengguna',
	'ct-event-name' => 'Nama even',
	'ct-expert-header' => 'Klik "mahir"',
	'ct-intermediate-header' => 'Klik "menengah"',
	'ct-beginner-header' => 'Klik "pemula"',
	'ct-total-header' => 'Klik total',
	'ct-start-date' => 'Tanggal Mulai (YYYYMMDD)',
	'ct-end-date' => 'Tanggal selesai (YYYYMMDD)',
	'ct-increment-by' => 'Setiap poin mencerminkan jumlah hari',
	'ct-change-graph' => 'Ganti grafik',
	'ct-beginner' => 'Pemula',
	'ct-intermediate' => 'Menengah',
	'ct-expert' => 'Mahir',
	'ct-date-range' => 'Interval tanggal',
	'ct-editing' => 'Saat ini menyunting:',
	'ct-anon-users' => 'Pengguna anonim',
	'ct-user-contribs' => 'Total kontribusi pengguna',
	'ct-user-span' => 'Kontribusi pengguna dalam rentang waktu',
	'ct-and' => 'dan',
	'ct-update-table' => 'Pemutahiran tabel',
);

/** Italian (Italiano)
 * @author Gianfranco
 */
$messages['it'] = array(
	'ct-title' => 'Clic utente aggregati',
	'ct-event-name' => "Nome dell'evento",
	'ct-total-header' => 'Clic totali',
	'ct-start-date' => 'Data Inizio (AAAAMMGG)',
	'ct-end-date' => 'Data Fine (AAAAMMGG)',
	'ct-increment-by' => 'Numero di giorni per ogni punto dati',
	'ct-beginner' => 'Principiante',
	'ct-intermediate' => 'Medio',
	'ct-expert' => 'Esperto',
	'ct-anon-users' => 'Utenti anonimi',
	'ct-user-contribs' => 'Totale contributi utente',
	'ct-and' => 'e',
	'ct-update-table' => 'Aggiorna la tabella',
);

/** Japanese (日本語)
 * @author Fryed-peach
 * @author 青子守歌
 */
$messages['ja'] = array(
	'clicktracking' => 'Usability Initiative クリック追跡',
	'clicktracking-desc' => 'クリック追跡：ページの再描画を引き起こさないイベントを追跡記録する機能',
	'ct-title' => '利用者クリック集計',
	'ct-event-name' => 'イベント名',
	'ct-expert-header' => '「上級者」のクリック数',
	'ct-intermediate-header' => '「中級者」のクリック数',
	'ct-beginner-header' => '「初級者」のクリック数',
	'ct-total-header' => 'クリック回数合計',
	'ct-start-date' => '開始日 (YYYYMMDD)',
	'ct-end-date' => '終了日 (YYYYMMDD)',
	'ct-increment-by' => '各データ点が表す日数',
	'ct-change-graph' => 'グラフ変更',
	'ct-beginner' => '初級者',
	'ct-intermediate' => '中級者',
	'ct-expert' => '上級者',
	'ct-date-range' => '日付範囲',
	'ct-editing' => '現在編集中:',
	'ct-anon-users' => '匿名利用者',
	'ct-user-contribs' => '利用者投稿の合計',
	'ct-user-span' => '期間ごとの利用者投稿',
	'ct-and' => 'および',
	'ct-update-table' => 'テーブルを更新',
);

/** Georgian (ქართული)
 * @author Temuri rajavi
 */
$messages['ka'] = array(
	'ct-beginner' => 'დამწყები',
);

/** Khmer (ភាសាខ្មែរ)
 * @author វ័ណថារិទ្ធ
 */
$messages['km'] = array(
	'ct-event-name' => 'ឈ្មោះព្រឹត្តិការណ៍​',
	'ct-total-header' => 'ចំនួនចុចសរុប​',
	'ct-start-date' => 'កាលបរិច្ឆេទ​ចាប់ផ្ដើម (YYYYMMDD)',
	'ct-end-date' => 'កាលបរិច្ឆេទ​បញ្ចប់ (YYYYMMDD)',
	'ct-and' => 'និង​',
);

/** Korean (한국어)
 * @author Klutzy
 * @author Kwj2772
 */
$messages['ko'] = array(
	'clicktracking' => 'Usability Initiative 사용자 클릭 추적기',
	'clicktracking-desc' => '마우스 클릭 이벤트 중에서 웹 페이지 새로고침과 관계없는 것들을 추적합니다.',
	'ct-event-name' => '이벤트 이름',
	'ct-start-date' => '시작 날짜 (YYYYMMDD)',
	'ct-end-date' => '마지막 날짜 (YYYYMMDD)',
	'ct-beginner' => '초보자',
	'ct-intermediate' => '중급 사용자',
	'ct-expert' => '전문가',
	'ct-date-range' => '날짜 범위',
	'ct-and' => '그리고',
	'ct-update-table' => '표 업데이트',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'clicktracking' => 'Dä <i lang="en">Wikipedia Usability Initiative</i> ier Kleckverfolljung',
	'clicktracking-desc' => 'Klecks un Akßuhne Verfollje, di kein neu Sigg afroofe donn.',
	'ct-title' => 'Metmaacher ier jesampte Klecks',
	'ct-event-name' => 'Da Name vun dämm, wat passeet es',
	'ct-expert-header' => 'Klecks vun „{{int:Expert}}“',
	'ct-intermediate-header' => 'Klecks vun „{{int:Intermediate}}“',
	'ct-beginner-header' => 'Klecks vun „{{int:Beginner}}e“',
	'ct-total-header' => 'Jesampzahl aan Kleks',
	'ct-start-date' => 'Et Dattum vum Aanfang (en dä Forrem: JJJJMMDD)',
	'ct-end-date' => 'Et Dattum vum Engk (en dä Forrem: JJJJMMDD)',
	'ct-increment-by' => 'De Aanzahl Dääsch, woh jede Pungk em Diajramm daashtälle sull',
	'ct-change-graph' => 'Dat Diajramm ändere',
	'ct-beginner' => 'Aanfänger udder Neuling',
	'ct-intermediate' => 'Meddel',
	'ct-expert' => 'Mer kännt sesch uß',
	'ct-date-range' => 'Zick',
	'ct-editing' => 'Aam Ändere',
	'ct-anon-users' => 'Nameloose Metmaacher',
	'ct-user-contribs' => 'Em Metmaacher sing Beidrääsch enßjesamp',
	'ct-user-span' => 'Em Metmaacher sing Beidrääsch en dä Zick',
	'ct-and' => ', un',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'clicktracking' => 'Benotzerfrëndlechkeetsinitiative Suivi vun de Klicken',
	'clicktracking-desc' => "Suivi vun de Klicken, fir déi Aktiounen z'erfaassen déi net zu engem neie Luede vun der Säit féieren",
	'ct-title' => 'Opgezeechent Benotzerklicken',
	'ct-event-name' => 'Numm vum Evenement',
	'ct-expert-header' => '"Expert"-Klicken',
	'ct-intermediate-header' => '"Duerschnëtt"-Klicken',
	'ct-beginner-header' => '"Ufänker"-Klicken',
	'ct-total-header' => 'Total vun de Klicken',
	'ct-start-date' => 'Ufanksdatum (YYYYMMDD)',
	'ct-end-date' => 'Schlussdatum (YYYYMMDD)',
	'ct-increment-by' => 'Zuel vun Deeg déi vun all Datepunkt duergestallt ginn',
	'ct-change-graph' => 'Ännerungs-Grafik',
	'ct-beginner' => 'Ufänger',
	'ct-intermediate' => 'Dertëschent',
	'ct-expert' => 'Expert',
	'ct-date-range' => 'Datumsberäich',
	'ct-editing' => 'Ännert elo:',
	'ct-anon-users' => 'Anonym Benotzer',
	'ct-user-contribs' => 'Total vun de Benotzer-Kontributiounen',
	'ct-user-span' => 'Benotzerkontributiounen am Zäitraum',
	'ct-and' => 'an',
	'ct-update-table' => 'Tabell aktualiséieren',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'clicktracking' => 'Следење на кликнувања на Иницијативата за употребливост',
	'clicktracking-desc' => 'Следење на кликнувања, наменето за следење на постапки кои не предизвикуваат превчитување на страницата',
	'ct-title' => 'Насобрани кориснички кликови',
	'ct-event-name' => 'Име на настанот',
	'ct-expert-header' => '„Експертски“ кликови',
	'ct-intermediate-header' => '„Средно-учеснички“ кликови',
	'ct-beginner-header' => '„Почетнички“ кликови',
	'ct-total-header' => 'Вкупно кликови',
	'ct-start-date' => 'Почетен датум (ГГГГММДД)',
	'ct-end-date' => 'Завршен датум (ГГГГММДД)',
	'ct-increment-by' => 'Број на денови што ги претставува секоја податочна точка',
	'ct-change-graph' => 'Промени го графикот',
	'ct-beginner' => 'Почетник',
	'ct-intermediate' => 'Среден',
	'ct-expert' => 'Експерт',
	'ct-date-range' => 'Датуми',
	'ct-editing' => 'Моментално уредувате:',
	'ct-anon-users' => 'Анонимни корисници',
	'ct-user-contribs' => 'Вкупно кориснички придонеси',
	'ct-user-span' => 'Ккориснички придонеси за период',
	'ct-and' => 'и',
	'ct-update-table' => 'Ажурирај ја таблицата',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'ct-event-name' => 'പരിപാടിയുടെ പേര്',
	'ct-expert-header' => '"വിദഗ്ദ്ധ" ഞെക്കലുകൾ',
	'ct-intermediate-header' => '"മദ്ധ്യവർത്തി" ഞെക്കലുകൾ',
	'ct-beginner-header' => '"പ്രാരംഭക" ഞെക്കലുകൾ',
	'ct-total-header' => 'ആകെ ഞെക്കലുകൾ',
	'ct-start-date' => 'തുടങ്ങുന്ന തീയതി (YYYYMMDD)',
	'ct-end-date' => 'അവസാനിക്കുന്ന തീയതി (YYYYMMDD)',
	'ct-increment-by' => 'ഓരോ വിവര ബിന്ദുവും പ്രതിനിധീകരിക്കുന്ന ദിനങ്ങളുടെ എണ്ണം',
	'ct-change-graph' => 'ഗ്രാഫിൽ മാറ്റംവരുത്തുക',
	'ct-beginner' => 'പ്രാരംഭക(ൻ)',
	'ct-intermediate' => 'മദ്ധ്യവർത്തി',
	'ct-expert' => 'വിദഗ്ദ്ധ(ൻ)',
	'ct-date-range' => 'തീയതിയുടെ പരിധി',
	'ct-editing' => 'ഇപ്പോൾ തിരുത്തുന്നത്:',
	'ct-anon-users' => 'അജ്ഞാത ഉപയോക്താക്കൾ',
	'ct-user-contribs' => 'ഉപയോക്താവിന്റെ ആകെ സേവനങ്ങൾ',
	'ct-user-span' => 'ഉപയോക്താവിന്റെ സേവനങ്ങൾ സമയക്രമത്തിൽ',
	'ct-and' => 'ഒപ്പം',
	'ct-update-table' => 'പട്ടിക പുതുക്കുക',
);

/** Malay (Bahasa Melayu)
 * @author Kurniasan
 */
$messages['ms'] = array(
	'clicktracking' => 'Pengesanan klik Inisiatif Kebolehgunaan',
	'clicktracking-desc' => 'Pengesanan klik, bertujuan untuk mengesan peristiwa-peristiwa yang tidak menyebabkan penyegaran semula sebuah laman.',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'clicktracking' => 'Klikvolgen voor het Bruikbaarheidsinitiatief',
	'clicktracking-desc' => 'Klikvolgen voor het volgens van handelingen die niet het oproepen van een nieuwe pagina tot gevolg hebben',
	'ct-title' => 'Samengevoegde gebruikerskliks',
	'ct-event-name' => 'Gebeurtenis',
	'ct-expert-header' => '"Expert"-kliks',
	'ct-intermediate-header' => '"Gemiddeld"-kliks',
	'ct-beginner-header' => '"Beginner"-kliks',
	'ct-total-header' => 'Kliktotaal',
	'ct-start-date' => 'Startdatum (JJJJMMDD)',
	'ct-end-date' => 'Einddatum (JJJJMMDD)',
	'ct-increment-by' => 'Aantal dagen dat ieder punt representeert',
	'ct-change-graph' => 'Grafiek wijzigen',
	'ct-beginner' => 'Beginner',
	'ct-intermediate' => 'Gemiddeld',
	'ct-expert' => 'Expert',
	'ct-date-range' => 'Periode',
	'ct-editing' => 'Bezig met het bewerken van:',
	'ct-anon-users' => 'Anonieme gebruikers',
	'ct-user-contribs' => 'Totaal aantal gebruikersbijdragen',
	'ct-user-span' => 'Gebruikersbijdragen in periode',
	'ct-and' => 'en',
	'ct-update-table' => 'Tabel bijwerken',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Gunnernett
 */
$messages['nn'] = array(
	'ct-start-date' => 'Startdato (ÅÅÅÅMMDD)',
	'ct-expert' => 'Ekspert',
	'ct-anon-users' => 'Anonyme brukarar',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'clicktracking' => 'Klikksporing for brukervennlighetsprosjektet.',
	'clicktracking-desc' => 'Sporer klikk som ikke forårsaker lasting av ny side.',
	'ct-expert-header' => '«Ekspertklikk»',
	'ct-intermediate-header' => '«Mellomnivåbrukerklikk»',
	'ct-beginner-header' => '«Nybegynnerklikk»',
	'ct-total-header' => 'Totalt antall klikk',
	'ct-start-date' => 'Fra (ÅÅÅÅMMDD)',
	'ct-end-date' => 'Til (ÅÅÅÅMMDD)',
	'ct-increment-by' => 'Antall dager representert i hvert datapunkt.',
	'ct-change-graph' => 'Endre graf',
	'ct-beginner' => 'Nybegynner',
	'ct-intermediate' => 'Mellomnivåbruker',
	'ct-expert' => 'Ekspert',
	'ct-date-range' => 'Datoer som vises',
	'ct-editing' => 'Redigerer:',
	'ct-anon-users' => 'Anonyme brukere',
	'ct-user-contribs' => 'Totalt antall bidrag',
	'ct-user-span' => 'Bidrag i tid',
	'ct-and' => 'og',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'clicktracking' => "Seguit de clics de l'iniciativa d'utilizabilitat",
	'clicktracking-desc' => 'Seguit de clics, visant a tracar los eveniments que causan pas un recargament de pagina',
	'ct-title' => "Agregacion dels clics d'utilizaires",
	'ct-event-name' => "Nom de l'eveniment",
	'ct-expert-header' => 'Clics « expèrts »',
	'ct-intermediate-header' => 'Clics « intermediaris »',
	'ct-beginner-header' => 'Clics « debutants »',
	'ct-total-header' => 'Total dels clics',
	'ct-start-date' => 'Data de començament (AAAAMMJJ)',
	'ct-end-date' => 'Data de fin (AAAAMMJJ)',
	'ct-increment-by' => 'Nombre de jorns que representa cada punt de donada',
	'ct-change-graph' => 'Graf de cambi',
	'ct-beginner' => 'Debutant',
	'ct-intermediate' => 'Intermediari',
	'ct-expert' => 'Expèrt',
	'ct-date-range' => 'Portada de la data',
	'ct-editing' => 'En cors de modificacion :',
	'ct-anon-users' => 'Utilizaires anonims',
	'ct-user-contribs' => 'Contribucions totalas dels utilizaires',
	'ct-user-span' => "Contribucions de l'utilizaire sus la durada",
	'ct-and' => 'e',
	'ct-update-table' => 'Metre a jorn la taula',
);

/** Polish (Polski)
 * @author Leinad
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'clicktracking' => 'Śledzenie kliknięć dla inicjatywy użyteczności',
	'clicktracking-desc' => 'Śledzenie kliknięć, przeznaczone do poszukiwania zdarzeń, które nie powodują odświeżenia strony',
	'ct-title' => 'Zestawienie kliknięć użytkowników',
	'ct-event-name' => 'Nazwa zdarzenia',
	'ct-expert-header' => 'Kliknięcia „specjalistów”',
	'ct-intermediate-header' => 'Kliknięcia „zaawansowanych”',
	'ct-beginner-header' => 'Kliknięcia „nowicjuszy”',
	'ct-total-header' => 'Wszystkich kliknięć',
	'ct-start-date' => 'Data rozpoczęcia (RRRRMMDD)',
	'ct-end-date' => 'Data zakończenia (RRRRMMDD)',
	'ct-increment-by' => 'Liczba dni, którą oznacza każdy punkt danych',
	'ct-change-graph' => 'Wykres zmian',
	'ct-beginner' => 'Nowicjusz',
	'ct-intermediate' => 'Zaawansowany',
	'ct-expert' => 'Specjalista',
	'ct-date-range' => 'Zakres dat',
	'ct-editing' => 'Teraz edytują:',
	'ct-anon-users' => 'Anonimowi użytkownicy',
	'ct-user-contribs' => 'Ogółem wkład użytkownika',
	'ct-user-span' => 'Wkład użytkownika w przedziale czasu',
	'ct-and' => 'i',
	'ct-update-table' => 'Uaktualnij tabelę',
);

/** Piedmontese (Piemontèis)
 * @author Dragonòt
 */
$messages['pms'] = array(
	'clicktracking' => "Trassadura dij click ëd l'Usability Initiative",
	'clicktracking-desc' => "Trassadura dij click, për trassé dj'event cha a causo pa ël refresh ëd na pàgina",
	'ct-title' => "Clich agregà ëd l'utent",
	'ct-event-name' => "Nòm ëd l'event",
	'ct-expert-header' => 'Click d\'"Espert"',
	'ct-intermediate-header' => 'Click dj\'"antërmedi"',
	'ct-beginner-header' => 'Click ëd "prinsipiant"',
	'ct-total-header' => 'Click totaj',
	'ct-start-date' => 'Data ëd partensa (AAAAMMDD)',
	'ct-end-date' => 'Data ëd fin (AAAAMMDD)',
	'ct-increment-by' => 'Nùmer ëd di che minca pont a arpresenta',
	'ct-change-graph' => 'Cambia ël graf',
	'ct-beginner' => 'Prinsipiant',
	'ct-intermediate' => 'Antërmedi',
	'ct-expert' => 'Espert',
	'ct-date-range' => 'Antërval ëd date',
	'ct-editing' => 'Al moment an modìfica:',
	'ct-anon-users' => 'Utent anònim',
	'ct-user-contribs' => "Contribussion totaj ëd l'utent",
	'ct-user-span' => "Contribussion ëd l'utent ant l'interval",
	'ct-and' => 'e',
	'ct-update-table' => 'Modìfica tàula',
);

/** Portuguese (Português)
 * @author Giro720
 * @author Hamilton Abreu
 * @author Lijealso
 */
$messages['pt'] = array(
	'clicktracking' => 'Monitorização de cliques da Iniciativa de Usabilidade',
	'clicktracking-desc' => 'Monitorização de cliques para seguir eventos que não causam refrescamentos de página',
	'ct-title' => 'Cliques de utilizador agregados',
	'ct-change-graph' => 'Mudar gráfico',
	'ct-beginner' => 'Iniciante',
	'ct-intermediate' => 'Intermediário',
	'ct-expert' => 'Experiente',
	'ct-date-range' => 'Intervalo de datas',
	'ct-editing' => 'A editar actualmente:',
	'ct-anon-users' => 'Usuários anónimos',
	'ct-and' => 'e',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 */
$messages['pt-br'] = array(
	'clicktracking' => 'Monitoramento de cliques da Iniciativa de Usabilidade',
	'clicktracking-desc' => 'Monitoramento de cliques, destinado ao monitoramento de eventos que não causem uma atualização de página',
);

/** Russian (Русский)
 * @author HalanTul
 * @author Kv75
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'clicktracking' => 'Отслеживание нажатий в рамках Инициативы юзабилити',
	'clicktracking-desc' => 'Отслеживание нажатий. Предназначается для отслеживания событий, не приводящих к обновлению страницы',
	'ct-title' => 'Агрегированные щелчки мышью участников',
	'ct-event-name' => 'Название события',
	'ct-expert-header' => 'Нажатия «экспертов»',
	'ct-intermediate-header' => 'Нажатия «средних участников»',
	'ct-beginner-header' => 'Нажатия «новичков»',
	'ct-total-header' => 'Всего нажатий',
	'ct-start-date' => 'Дата начала (ГГГГММДД)',
	'ct-end-date' => 'Дата окончания (ГГГГММДД)',
	'ct-increment-by' => 'Количество дней, которое представляет каждая точка данных',
	'ct-change-graph' => 'Изменить график',
	'ct-beginner' => 'Новичок',
	'ct-intermediate' => 'Средний участник',
	'ct-expert' => 'Эксперт',
	'ct-date-range' => 'Диапазон дат',
	'ct-editing' => 'Текущее редактирование:',
	'ct-anon-users' => 'Анонимные участники',
	'ct-user-contribs' => 'Общий вклад участников',
	'ct-user-span' => 'Вклад участников за период',
	'ct-and' => 'и',
	'ct-update-table' => 'Обновить таблицу',
);

/** Yakut (Саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'clicktracking' => 'Баттааһыннары Табыгас Ситиһиитин иһинэн кэтээһин',
	'clicktracking-desc' => 'Баттааһыны кэтээһин. Сирэйи саҥардыбат түбэлтэлэри кэтииргэ туттуллар',
	'ct-event-name' => 'Түбэлтэ аата',
	'ct-expert-header' => '"Экспертар" баттааһыннара (клик)',
	'ct-intermediate-header' => '"Орто кыттааччылар" баттааһыннара (клик)',
	'ct-beginner-header' => '"Саҕалааччылар" баттааһыннара (клик)',
	'ct-total-header' => 'Баттааһын барытын ахсаана',
	'ct-start-date' => 'Саҕаламмыт күнэ-ыйа (ССССЫЫКК)',
	'ct-end-date' => 'Бүппүт күнэ-дьыла (ССССЫЫКК)',
	'ct-change-graph' => 'Графигы уларытыы',
	'ct-beginner' => 'Саҥа кыттааччы',
	'ct-intermediate' => 'Бороохтуйбут кыттааччы',
	'ct-expert' => 'Эксперт',
	'ct-date-range' => 'Күн-дьыл диапазона',
	'ct-anon-users' => 'Ааттамматах кыттааччылар',
	'ct-and' => 'уонна',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'clicktracking' => 'Sledovanie kliknutí pre Iniciatívu použiteľnosti',
	'clicktracking-desc' => 'Sledovanie kliknutí, na sledovanie udalostí, ktoré nespôsobujú opätovné načítanie stránky',
	'ct-title' => 'Agregovaných kliknutí',
	'ct-event-name' => 'Názov udalosti',
	'ct-expert-header' => 'Kliknutia „expertov“',
	'ct-intermediate-header' => 'Kliknutia „pokročilých“',
	'ct-beginner-header' => 'Kliknutia „začiatočníkov“',
	'ct-total-header' => 'Kliknutí celkom',
	'ct-start-date' => 'Dátum začiatku (YYYYMMDD)',
	'ct-end-date' => 'Dátum konca (YYYYMMDD)',
	'ct-increment-by' => 'Počet dní, ktorý predstavuje každý z bodov v dátach',
	'ct-change-graph' => 'Zmeniť graf',
	'ct-beginner' => 'Začiatočník',
	'ct-intermediate' => 'Pokročilý',
	'ct-expert' => 'Expert',
	'ct-date-range' => 'Rozsah dátumov',
	'ct-editing' => 'Momentálne upravuje:',
	'ct-anon-users' => 'Anonymní používatelia',
	'ct-user-contribs' => 'Používateľských príspevkov celkom',
	'ct-user-span' => 'Používateľských príspevkov za obdobie',
	'ct-and' => 'a',
	'ct-update-table' => 'Aktualizovať tabuľku',
);

/** Slovenian (Slovenščina)
 * @author Smihael
 */
$messages['sl'] = array(
	'clicktracking' => 'Sledenje klikom Iniciative za uporabnost',
	'clicktracking-desc' => 'Sledenje klikom, namenjeno odkrivanju dogodkov, ki preprečujejo osvežitev strani med urejanjem',
);

/** Swedish (Svenska)
 * @author GameOn
 */
$messages['sv'] = array(
	'ct-expert-header' => '"Expertklick"',
	'ct-beginner-header' => '"Nybörjarklick"',
	'ct-total-header' => 'Totala antalet klick',
	'ct-start-date' => 'Startdatum (YYYYMMDD)',
	'ct-end-date' => 'Slutdatum (YYYYMMDD)',
	'ct-beginner' => 'Nybörjare',
	'ct-expert' => 'Expert',
	'ct-and' => 'och',
	'ct-update-table' => 'Tppdatera tabell',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'ct-event-name' => 'ఘటన పేరు',
	'ct-total-header' => 'మొత్తం నొక్కులు',
	'ct-start-date' => 'ప్రారంభ తేదీ (YYYYMMDD)',
	'ct-end-date' => 'ముగింపు తేదీ (YYYYMMDD)',
	'ct-editing' => 'ప్రస్తుతం మారుస్తున్నారు:',
	'ct-anon-users' => 'అజ్ఞాత వాడుకరులు',
	'ct-and' => 'మరియు',
);

/** Turkmen (Türkmençe)
 * @author Hanberke
 */
$messages['tk'] = array(
	'ct-start-date' => 'Başlangyç senesi (YYYYMMDD)',
	'ct-end-date' => 'Gutaryş senesi (YYYYMMDD)',
);

/** Turkish (Türkçe)
 * @author Joseph
 */
$messages['tr'] = array(
	'clicktracking' => 'Kullanılabilirlik Girişimi tıklama izleme',
	'clicktracking-desc' => 'Tıklama izleme, bir sayfa yenilemesine sebep olmadan olayları izleme amaçlı',
	'ct-title' => 'Kümeli kullanıcı tıklamaları',
	'ct-event-name' => 'Olay adı',
	'ct-expert-header' => '"Deneyimli" tıklamaları',
	'ct-intermediate-header' => '"Orta düzeyde" tıklamaları',
	'ct-beginner-header' => '"Acemi" tıklamaları',
	'ct-total-header' => 'Toplam tıklama',
	'ct-start-date' => 'Başlangıç Tarihi (YYYYAAGG)',
	'ct-end-date' => 'Bitiş tarihi (YYYYAAGG)',
	'ct-increment-by' => 'Her veri noktasının temsil ettiği gün sayısı',
	'ct-change-graph' => 'Grafiği değiştir',
	'ct-beginner' => 'Acemi',
	'ct-intermediate' => 'Orta düzeyde',
	'ct-expert' => 'Deneyimli',
	'ct-date-range' => 'Tarih aralığı',
	'ct-editing' => 'Şuanda değiştiriyor:',
	'ct-anon-users' => 'Anonim kullanıcılar',
	'ct-user-contribs' => 'Toplam kullanıcı katkıları',
	'ct-user-span' => 'Zaman içerisindeki kullanıcı katkıları',
	'ct-and' => 've',
	'ct-update-table' => 'Tabloyu güncelle',
);

/** Ukrainian (Українська)
 * @author NickK
 * @author Prima klasy4na
 */
$messages['uk'] = array(
	'clicktracking' => 'Відстеження кліків в рамках Ініціативи Ефективності',
	'clicktracking-desc' => 'Відстеження кліків для відстеження подій, які не викликають оновлення сторінки',
	'ct-title' => 'Всього кліків користувачів',
	'ct-event-name' => 'Назва події',
	'ct-expert-header' => 'Кліків «експертів»',
	'ct-intermediate-header' => 'Кліків «середніх користувачів»',
	'ct-beginner-header' => 'Кліків «новачків»',
	'ct-total-header' => 'Всього кліків',
	'ct-start-date' => 'Дата початку (РРРРММДД)',
	'ct-end-date' => 'Дата закінчення (РРРРММДД)',
	'ct-increment-by' => 'Кількість днів, які позначає кожна точка даних',
	'ct-change-graph' => 'Змінити графік',
	'ct-beginner' => 'Новачок',
	'ct-intermediate' => 'Середній користувач',
	'ct-expert' => 'Експерт',
	'ct-date-range' => 'Діапазон дат',
	'ct-editing' => 'Поточне редагування:',
	'ct-anon-users' => 'Анонімні користувачі',
	'ct-user-contribs' => 'Загальний внесок користувачів',
	'ct-user-span' => 'Внесок користувачів за період',
	'ct-and' => 'і',
	'ct-update-table' => 'Оновити таблицю',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'clicktracking' => "Traciamento click de l'Inissiativa par l'Usabilità",
	'clicktracking-desc' => 'Traciamento dei click, par traciare i eventi che no provoca mia un refresh de la pagina.',
	'ct-title' => 'Clic dei utenti messi insieme',
	'ct-event-name' => "Nome de l'evento",
	'ct-expert-header' => 'Clic de "esperti"',
	'ct-intermediate-header' => 'Clic de "intermedi"',
	'ct-beginner-header' => 'Clic de "prinsipianti"',
	'ct-total-header' => 'Clic totali',
	'ct-start-date' => 'Data de inissio (AAAAMMGG)',
	'ct-end-date' => 'Data de fine(AAAAMMGG)',
	'ct-increment-by' => 'Nùmaro de zorni che ogni ponto el rapresenta',
	'ct-change-graph' => 'Canbiar el gràfico',
	'ct-beginner' => 'Prinsipiante',
	'ct-intermediate' => 'Intermedio',
	'ct-expert' => 'Esperto',
	'ct-date-range' => 'Interval de date',
	'ct-editing' => 'En corso de modìfega:',
	'ct-anon-users' => 'Utenti anonimi',
	'ct-user-contribs' => 'Contributi utente totali',
	'ct-user-span' => "Contributi de l'utente su la durata",
	'ct-and' => 'e',
	'ct-update-table' => 'Ajorna tabèla',
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'ct-beginner' => 'Augotai',
	'ct-expert' => 'Ekspert',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'clicktracking' => 'Theo dõi nhấn chuột Sáng kiến Khả dụng',
	'clicktracking-desc' => 'Theo dõi hành vi nhấn chuột, dùng để theo dõi các hoạt động không làm tươi trang',
	'ct-title' => 'Các lần nhấn chuột tập hợp lại',
	'ct-event-name' => 'Tên sự kiện',
	'ct-expert-header' => 'Cú nhấn "chuyên gia"',
	'ct-intermediate-header' => 'Cú nhấn "trung bình"',
	'ct-beginner-header' => 'Cú nhấn "người mới"',
	'ct-total-header' => 'Tổng số lần nhấn',
	'ct-start-date' => 'Ngày bắt đầu (YYYYMMDD)',
	'ct-end-date' => 'Ngày kết thúc (YYYYMMDD)',
	'ct-increment-by' => 'Số ngày mà mỗi điểm dữ liệu thể hiện',
	'ct-change-graph' => 'Đồ thị thay đổi',
	'ct-beginner' => 'Người mới',
	'ct-intermediate' => 'Trung bình',
	'ct-expert' => 'Chuyên gia',
	'ct-date-range' => 'Dãy ngày',
	'ct-editing' => 'Đang sửa đổi:',
	'ct-anon-users' => 'Người dùng vô danh',
	'ct-user-contribs' => 'Tổng số lần đóng góp',
	'ct-user-span' => 'Số lần đóng góp trong thời gian',
	'ct-and' => 'và',
	'ct-update-table' => 'Cập nhật bảng',
);

/** Yue (粵語)
 * @author Shinjiman
 */
$messages['yue'] = array(
	'clicktracking' => '可用性倡議撳追蹤',
	'clicktracking-desc' => '撳追蹤，響唔使重載版嘅情況之下追蹤撳',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Shinjiman
 */
$messages['zh-hans'] = array(
	'clicktracking' => '可用性倡议点击追踪',
	'clicktracking-desc' => '点击追踪，不在重载页面的情况中用来追踪点击',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Shinjiman
 */
$messages['zh-hant'] = array(
	'clicktracking' => '可用性倡議點擊追蹤',
	'clicktracking-desc' => '點擊追蹤，不在重載頁面的情況中用來追蹤點擊',
);

