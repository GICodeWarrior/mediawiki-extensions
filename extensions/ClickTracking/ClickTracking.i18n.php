<?php
/**
 * Internationalisation for Click Tracking extension
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
 * @author Adriaan
 * @author Naudefj
 */
$messages['af'] = array(
	'clicktracking' => 'Kliekdophou vir Bruikbaarheidsinisiatief',
	'clicktracking-desc' => "Kliekdophou vir dophoubare handelinge wat nie 'n bladsyverfrissing tot gevolg het nie",
	'ct-title' => 'Saamgevoegde gebruikersklieks',
	'ct-event-name' => 'Gebeurtenis',
	'ct-expert-header' => '"Deskundige"-klieks',
	'ct-intermediate-header' => '"Gemiddeld"-klieks',
	'ct-beginner-header' => '"Beginner"-klieks',
	'ct-total-header' => 'Totaal klieke',
	'ct-start-date' => 'Begindatum (JJJJMMDD)',
	'ct-end-date' => 'Einddatum (JJJJMMDD)',
	'ct-increment-by' => 'Aantal dae wat elke data-punt verteenwoordig',
	'ct-change-graph' => 'Wysig grafiek',
	'ct-beginner' => 'Beginner',
	'ct-intermediate' => 'Gemiddeld',
	'ct-expert' => 'Deskundige',
	'ct-date-range' => 'Periode',
	'ct-editing' => 'Tans besig met redigering:',
	'ct-anon-users' => 'Anonieme gebruikers',
	'ct-user-contribs' => 'Totaal aantal gebruikersbydraes',
	'ct-user-span' => 'Gebruikersbydraes in periode',
	'ct-and' => 'en',
	'ct-update-table' => 'Opdateer tabel',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'clicktracking' => "Seguimiento de clics d'a Iniciativa d'Usabilidat",
	'clicktracking-desc' => "Seguimiento de clics d'esdevenimientos que no causen a recarga d'a pachina",
	'ct-title' => "Agregación d'os clics de l'usuario",
	'ct-event-name' => "Nombre de l'evento",
	'ct-expert-header' => "Clics d'«experto»",
	'ct-intermediate-header' => "Clics d'usuario «intermeyo»",
	'ct-beginner-header' => 'Clics de «novenzano»',
	'ct-total-header' => 'Clics totals',
	'ct-start-date' => "Calendata d'inicio (AAAAMMDD)",
	'ct-end-date' => 'Calendata de finalización (AAAAMMDD)',
	'ct-increment-by' => 'Numero de días que represienta cada punto',
	'ct-change-graph' => 'Cambiar o grafico',
	'ct-beginner' => 'Prencipiant',
	'ct-intermediate' => 'Intermeyo',
	'ct-expert' => 'Experto',
	'ct-date-range' => 'Intervalo de calendatas',
	'ct-editing' => 'Editando actualment:',
	'ct-anon-users' => 'Usuarios anonimos',
	'ct-user-contribs' => "Total de contribucions de l'usuario",
	'ct-user-span' => "Contribucions de l'usuario en l'intervalo de tiempo",
	'ct-and' => 'y',
	'ct-update-table' => 'Esviellar a tabla',
);

/** Arabic (العربية)
 * @author Meno25
 * @author OsamaK
 */
$messages['ar'] = array(
	'clicktracking' => 'تتبع نقرات مبادرة الاستخدامية',
	'clicktracking-desc' => 'تتبع الضغطات لتتبع الاحداث التي لا تسبب تحديث الصفحة',
	'ct-title' => 'ضغطات المستخدمين المجمعة',
	'ct-event-name' => 'اسم الحدث',
	'ct-expert-header' => 'نقرات "الخبراء"',
	'ct-intermediate-header' => 'نقرات "المتوسطين"',
	'ct-beginner-header' => 'نقرات "المبتدئين"',
	'ct-total-header' => 'مجموع النقرات',
	'ct-start-date' => 'تاريخ البدء (YYYYMMDD)',
	'ct-end-date' => 'تاريخ النهاية (YYYYMMDD)',
	'ct-increment-by' => 'عدد الأيام التي تمثلها كل نقطة بيانات',
	'ct-change-graph' => 'غير الرسم البياني',
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

/** Aramaic (ܐܪܡܝܐ)
 * @author Basharh
 */
$messages['arc'] = array(
	'ct-beginner' => 'ܫܪܘܝܐ',
	'ct-intermediate' => 'ܡܨܥܝܐ',
	'ct-anon-users' => '$1 ܡܦܠܚܢ̈ܐ ܠܐ ܝܕ̈ܝܥܐ',
	'ct-and' => 'ܘ',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 */
$messages['arz'] = array(
	'clicktracking' => 'تتبع نقرات مبادره الاستخدامية',
	'clicktracking-desc' => 'تتبع الضغطات لتتبع الاحداث التى لا تسبب تحديث الصفحة',
	'ct-title' => 'ضغطات المستخدمين المجمعة',
	'ct-event-name' => 'اسم الحدث',
	'ct-expert-header' => 'نقرات "الخبراء"',
	'ct-intermediate-header' => 'نقرات "المتوسطين"',
	'ct-beginner-header' => 'نقرات "المبتدئين"',
	'ct-total-header' => 'مجموع النقرات',
	'ct-start-date' => 'تاريخ البدء (YYYYMMDD)',
	'ct-end-date' => 'تاريخ النهايه (YYYYMMDD)',
	'ct-increment-by' => 'عدد الأيام التى تمثلها كل نقطه بيانات',
	'ct-change-graph' => 'غير الرسم البياني',
	'ct-beginner' => 'مبتدئ',
	'ct-intermediate' => 'متوسط',
	'ct-expert' => 'خبير',
	'ct-date-range' => 'نطاق التاريخ',
	'ct-editing' => 'يحرر حاليًا:',
	'ct-anon-users' => 'المستخدمون المجهولون',
	'ct-user-contribs' => 'مجموع مساهمات المستخدم',
	'ct-user-span' => 'مساهمات المستخدم فى فتره زمنية',
	'ct-and' => 'و',
	'ct-update-table' => 'حدّث الجدول',
);

/** Asturian (Asturianu)
 * @author Xuacu
 */
$messages['ast'] = array(
	'clicktracking' => "Siguimientu de los clics de la Iniciativa d'usabilidá",
	'clicktracking-desc' => "Siguimientu de clics pa siguir los socesos que nun causen l'anovamientu de la páxina",
	'ct-title' => "Clics d'usuariu acumulaos",
	'ct-event-name' => 'Nome del socesu',
	'ct-expert-header' => "Clics «d'espertu»",
	'ct-intermediate-header' => "Clics d'usuariu «mediu»",
	'ct-beginner-header' => 'Clics de «novatu»',
	'ct-total-header' => 'Total de clics',
	'ct-start-date' => "Data d'aniciu (YYYYMMDD)",
	'ct-end-date' => 'Data final (YYYYMMDD)',
	'ct-increment-by' => 'Númberu de díes que representa cada puntu',
	'ct-change-graph' => 'Camudar gráficu',
	'ct-beginner' => 'Principiante',
	'ct-intermediate' => 'Intermediu',
	'ct-expert' => 'Espertu',
	'ct-date-range' => 'Intervalu de dates',
	'ct-editing' => 'Editando actualmente:',
	'ct-anon-users' => 'Usuarios anónimos',
	'ct-user-contribs' => 'Total de contribuciones del usuariu',
	'ct-user-span' => 'Contribuciones del usuariu nel intervalu de tiempu',
	'ct-and' => 'y',
	'ct-update-table' => 'Anovar la tabla',
);

/** Azerbaijani (Azərbaycanca)
 * @author Cekli829
 */
$messages['az'] = array(
	'ct-and' => 'və',
);

/** Bashkir (Башҡортса)
 * @author Assele
 */
$messages['ba'] = array(
	'clicktracking' => 'Юзабилити Инициативаһы сиктәрендә баҫыуҙарҙы күҙәтеү',
	'clicktracking-desc' => 'Биттең яңырыуына килтермәгән ваҡиғаларҙы күҙәтеү өсөн баҫыуҙарҙы күҙәтеү',
	'ct-title' => 'Ҡатнашыусыларҙың дөйөм баҫыуҙары',
	'ct-event-name' => 'Ваҡиғаның исеме',
	'ct-expert-header' => '"Белгестәр"ҙең баҫыуҙары',
	'ct-intermediate-header' => '"Уртаса ҡатнашыусылар"ҙың баҫыуҙары',
	'ct-beginner-header' => '"Башланғыстар"ҙың баҫыуҙары',
	'ct-total-header' => 'Бөтә баҫыуҙар',
	'ct-start-date' => 'Башлау ваҡыты (ЙЙЙЙААКК)',
	'ct-end-date' => 'Тамамлау ваҡыты (ЙЙЙЙААКК)',
	'ct-increment-by' => 'Һәр мәғлүмәттәр нөктәһе күрһәткән көндәр һаны',
	'ct-change-graph' => 'Рәсемде үҙгәртергә',
	'ct-beginner' => 'Башланғыс',
	'ct-intermediate' => 'Уртаса ҡатнашыусы',
	'ct-expert' => 'Белгес',
	'ct-date-range' => 'Ваҡыт арауығы',
	'ct-editing' => 'Әлеге үҙгәртеү:',
	'ct-anon-users' => 'Танылмаған ҡулланыусылар',
	'ct-user-contribs' => 'Ҡатнашыусыларҙың дөйөм индергән өлөшө',
	'ct-user-span' => 'Ҡатнашыусыларҙың ваҡыт арауығында индергән өлөшө',
	'ct-and' => 'һәм',
	'ct-update-table' => 'Таблицаны яңыртырға',
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 * @author Jim-by
 * @author Red Winged Duck
 * @author Zedlik
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
	'ct-user-span' => 'Унёсак удзельніка за пэрыяд',
	'ct-and' => 'і',
	'ct-update-table' => 'Абнавіць табліцу',
);

/** Bulgarian (Български)
 * @author DCLXVI
 * @author Turin
 */
$messages['bg'] = array(
	'ct-event-name' => 'Име на събитието',
	'ct-expert-header' => 'Натискания от "специалисти"',
	'ct-intermediate-header' => 'Натискания от "средно напреднали"',
	'ct-beginner-header' => 'Натискания от "начинаещи"',
	'ct-total-header' => 'Общо натискания',
	'ct-start-date' => 'Начална дата (ГГГГММДД)',
	'ct-end-date' => 'Крайна дата (ГГГГММДД)',
	'ct-increment-by' => 'Брой дни, представяни от всяка точка',
	'ct-change-graph' => 'Смяна на графиката',
	'ct-beginner' => 'Начинаещ',
	'ct-intermediate' => 'Средно напреднал',
	'ct-expert' => 'Специалист',
	'ct-date-range' => 'Обхват дати',
	'ct-editing' => 'В момента се редактира:',
	'ct-anon-users' => 'Анонимни потребители',
	'ct-and' => 'и',
	'ct-update-table' => 'Обновяване на таблицата',
);

/** Bahasa Banjar (Bahasa Banjar)
 * @author Ezagren
 * @author J Subhi
 */
$messages['bjn'] = array(
	'ct-expert-header' => 'KiKlik "harat"',
	'ct-intermediate-header' => 'Kiklik "manangah"',
	'ct-beginner-header' => 'Kiklik "pamula"',
	'ct-total-header' => 'Kiklik sabaraataan',
	'ct-start-date' => 'Tanggal Bamula(YYYYMMDD)',
	'ct-end-date' => 'Tanggal Tuntung (YYYYMMDD)',
	'ct-change-graph' => 'Ubah grapik',
	'ct-beginner' => 'Pamula',
	'ct-intermediate' => 'Manangah',
	'ct-expert' => 'Bisa',
	'ct-editing' => 'Wayahini mambabak:',
	'ct-anon-users' => 'Pamuruk kada bangaran',
	'ct-user-contribs' => 'Sabarataan sumbangan pamuruk',
	'ct-user-span' => 'Sumbangan pamuruk di babatas wayah',
	'ct-and' => 'wan',
);

/** Bengali (বাংলা)
 * @author Bellayet
 * @author Wikitanvir
 */
$messages['bn'] = array(
	'clicktracking' => 'ইউজাবিলিটি ইনিশিয়েটিভ ক্লিক ট্র্যাকিং',
	'clicktracking-desc' => 'ট্র্যাকিং কার্যগুলোর জন্য ট্র্যাকিংয়ে ক্লিক করুন, যেগুলো পাতাকে রিফ্রেশ করা থেকে বিরত রাখে',
	'ct-title' => 'সমষ্টিগত ব্যবহারকারীর ক্লিক',
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
	'ct-date-range' => 'তারিখের পরিসীমা',
	'ct-editing' => 'বর্তমানে সম্পাদনা করছেন:',
	'ct-anon-users' => 'বেনামী ব্যবহারকারী',
	'ct-user-contribs' => 'মোট ব্যবহাকারী অবদান',
	'ct-user-span' => 'সময় সহকারে ব্যবহারকারীর অবদান',
	'ct-and' => 'এবং',
	'ct-update-table' => 'ছক হালনাগাদ',
);

/** Bishnupria Manipuri (ইমার ঠার/বিষ্ণুপ্রিয়া মণিপুরী)
 * @author Usingha
 */
$messages['bpy'] = array(
	'clicktracking' => 'ইউজাবিলিটি ইনিশিয়েটিভ ক্লিক ট্র্যাকিং',
	'clicktracking-desc' => 'ট্রাকিং ইভেন্টর কা ট্রাকিংর মা ক্লিক কর যেহানে পাতাহান রিফ্রেস না করব',
	'ct-title' => 'আতাকুরা হাবির ক্লিকহানি',
	'ct-event-name' => 'ইভেন্টর নাঙ',
	'ct-expert-header' => '"দক্ষ" ক্লিকহানি',
	'ct-intermediate-header' => '"বুকগর" ক্লিকহানি',
	'ct-beginner-header' => '"অকরার" ক্লিকহানি',
	'ct-total-header' => 'পুল্লাপ ক্লিক',
	'ct-start-date' => 'অকরার তারিখ (YYYYMMDD)',
	'ct-end-date' => 'লমনির তারিখ  (YYYYMMDD)',
	'ct-increment-by' => 'হারি ডাটা পয়েন্ট দিনর সংখ্যাহান থাকরের',
	'ct-change-graph' => 'লেখচিত্র সিলকরানি',
	'ct-beginner' => 'নুৱাতা',
	'ct-intermediate' => 'বুকগরতা',
	'ct-expert' => 'দক্ষ',
	'ct-date-range' => 'তারিখর বের',
	'ct-editing' => 'হাদাএহান পতানি অরতা',
	'ct-anon-users' => 'হারানাপাসি আতাকুরাগি',
	'ct-user-contribs' => 'পুল্লাপ আতাকুরার অবদানহানি',
	'ct-user-span' => 'আতাকুরার অবদান ক্ষেন্তাম ইলয়া',
	'ct-and' => 'বারো',
	'ct-update-table' => 'ছক আপডেট',
);

/** Breton (Brezhoneg)
 * @author Fohanno
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'clicktracking' => 'Heuliañ klikoù an intrudu implijadusted',
	'clicktracking-desc' => "Heuliañ klikoù a dalvez da heuliañ an darvoudoù n'int ket pennkaoz d'ur bajenn da vezañ adkarget",
	'ct-title' => "Sammad ar c'hlikoù implijerien",
	'ct-event-name' => 'Anv an darvoud',
	'ct-expert-header' => 'Klikoù "arbennigourien"',
	'ct-intermediate-header' => 'Klikoù "implijerien etre"',
	'ct-beginner-header' => 'Klikoù "deraouad"',
	'ct-total-header' => "Hollad ar c'hlikoù",
	'ct-start-date' => 'Deiziad kregiñ (AAAAMMJJ)',
	'ct-end-date' => 'Deiziad echuiñ (AAAAMMJJ)',
	'ct-increment-by' => 'Niver a zevezhioù aroueziet gant pep poent roadenn.',
	'ct-change-graph' => 'Cheñch grafik',
	'ct-beginner' => 'Deraouad',
	'ct-intermediate' => 'Etre',
	'ct-expert' => 'Mailh',
	'ct-date-range' => 'Prantad deiziadoù',
	'ct-editing' => "Oc'h aozañ er mare-mañ :",
	'ct-anon-users' => 'implijerien dizanv',
	'ct-user-contribs' => 'Sammad hollek degasadennoù an implijer',
	'ct-user-span' => 'Degasadennoù an implijer e-pad ar frapad amzer',
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
 * @author Vriullop
 */
$messages['ca'] = array(
	'clicktracking' => "Seguiment de clics de la Iniciativa d'Usabilitat",
	'clicktracking-desc' => "Seguiment de clics d'esdeveniments que no causen una actualització de pàgina",
	'ct-title' => "Clics agregats d'usuari",
	'ct-event-name' => "Nom d'esdeveniment",
	'ct-expert-header' => "Clics d'«expert»",
	'ct-intermediate-header' => "Clics d'usuari «mitjà»",
	'ct-beginner-header' => 'Clics de «novell»',
	'ct-total-header' => 'Clics totals',
	'ct-start-date' => "Data d'inici (AAAAMMDD)",
	'ct-end-date' => 'Data de finalització (AAAAMMDD)',
	'ct-increment-by' => 'Nombre de dies que cada punt representa',
	'ct-change-graph' => 'Canvia el gràfic',
	'ct-beginner' => 'Principiant',
	'ct-intermediate' => 'Intermedi',
	'ct-expert' => 'Expert',
	'ct-date-range' => 'interval de dates',
	'ct-editing' => 'Actualment editant:',
	'ct-anon-users' => 'Usuaris anònims',
	'ct-user-contribs' => "Total de contribucions de l'usuari",
	'ct-user-span' => "Contribucions de l'usuari en l'interval de temps",
	'ct-and' => 'i',
	'ct-update-table' => 'Actualitza taula',
);

/** Sorani (کوردی)
 * @author Asoxor
 * @author Marmzok
 */
$messages['ckb'] = array(
	'ct-start-date' => 'ڕێکەوتی دەستپێکردن (YYYYMMDD)',
	'ct-end-date' => 'ڕێکەوتی دوایی‌ھاتن (YYYYMMDD)',
	'ct-beginner' => 'دەستپێکەر',
	'ct-intermediate' => 'نێوەندی',
	'ct-expert' => 'شارەزا',
	'ct-anon-users' => 'بەکارھێنەری نەناسراو',
	'ct-and' => 'و',
	'ct-update-table' => 'نوێکردنەوەی خشتە',
);

/** Czech (Česky)
 * @author Matěj Grabovský
 * @author Mormegil
 */
$messages['cs'] = array(
	'clicktracking' => 'Sledování kliknutí pro Iniciativu použitelnosti',
	'clicktracking-desc' => 'Sledování kliknutí pro sledování událostí, které nezpůsobují znovunačtení stránky',
	'ct-title' => 'Agregovaná kliknutí',
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
	'ct-update-table' => 'Aktualizovat tabulku',
);

/** Church Slavic (Словѣ́ньскъ / ⰔⰎⰑⰂⰡⰐⰠⰔⰍⰟ)
 * @author ОйЛ
 */
$messages['cu'] = array(
	'ct-and' => 'и',
);

/** Welsh (Cymraeg)
 * @author Lloffiwr
 */
$messages['cy'] = array(
	'ct-anon-users' => 'Defnyddwyr anhysbys',
	'ct-update-table' => 'Diweddarer y tabl',
);

/** Danish (Dansk)
 * @author Froztbyte
 * @author Sarrus
 */
$messages['da'] = array(
	'clicktracking' => 'Klik-logning til brugervenlighedsinitiativet.',
	'clicktracking-desc' => 'Klik-logning til sporing af hændelser, som ikke forårsager en sideopdatering',
	'ct-title' => 'Opsamlede brugerklik',
	'ct-event-name' => 'Navn på hændelse',
	'ct-expert-header' => '"Ekspertklik"',
	'ct-intermediate-header' => 'Klik på "mellemniveau"',
	'ct-beginner-header' => '"Nybegynderklik"',
	'ct-total-header' => 'Totalt antal klik',
	'ct-start-date' => 'Startdato (ÅÅÅÅMMDD)',
	'ct-end-date' => 'Slutdato (ÅÅÅÅMMDD)',
	'ct-increment-by' => 'Antal dage hvert datapunkt repræsenterer',
	'ct-change-graph' => 'Ændre graf',
	'ct-beginner' => 'Begynder',
	'ct-intermediate' => 'Mellemniveau',
	'ct-expert' => 'Ekspert',
	'ct-date-range' => 'Datointerval',
	'ct-editing' => 'Redigerer lige nu:',
	'ct-anon-users' => 'Anonyme brugere',
	'ct-user-contribs' => 'Totalt antal brugerbidrag',
	'ct-user-span' => 'Brugerbidrag i periode',
	'ct-and' => 'og',
	'ct-update-table' => 'Opdater tabel',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Metalhead64
 * @author Umherirrender
 */
$messages['de'] = array(
	'clicktracking' => 'Benutzerfreundlichkeitsinitiative - Nachvollziehen von Klicks',
	'clicktracking-desc' => 'Ermöglicht das Nachvollziehen der Klicks von Benutzern, die nicht zu einer Seitenaktualisierung führten',
	'ct-title' => 'Gesamtzahl aller Benutzerklicks',
	'ct-event-name' => 'Ereignisname',
	'ct-expert-header' => 'Klicks von „Experten“',
	'ct-intermediate-header' => 'Klicks von „Fortgeschrittenen“',
	'ct-beginner-header' => 'Klicks von „Anfängern“',
	'ct-total-header' => 'Anzahl der Klicks',
	'ct-start-date' => 'Anfangsdatum (JJJJMMTT)',
	'ct-end-date' => 'Enddatum (JJJJMMTT)',
	'ct-increment-by' => 'Anzahl der Tage, die jeder Datenpunkt repräsentiert',
	'ct-change-graph' => 'Grafik ändern',
	'ct-beginner' => 'Anfänger',
	'ct-intermediate' => 'Fortgeschrittener',
	'ct-expert' => 'Experte',
	'ct-date-range' => 'Datumsbereich',
	'ct-editing' => 'Derzeit bearbeitet von:',
	'ct-anon-users' => 'Unangemeldete Benutzer',
	'ct-user-contribs' => 'Benutzerbeiträge insgesamt',
	'ct-user-span' => 'Benutzerbeiträge während der Zeitspanne',
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
 * @author Dead3y3
 * @author Omnipaedista
 * @author ZaDiak
 */
$messages['el'] = array(
	'clicktracking' => 'Πατήστε παρακολούθηση της Πρωτοβουλίας Χρηστικότητας',
	'clicktracking-desc' => 'Πατήστε παρακολούθηση, προορίζεται για την παρακολούθηση εκδηλώσεων που δεν προκαλούν ανανέωση σελίδας',
	'ct-title' => 'Συναθροισμένα κλικ χρήστη',
	'ct-event-name' => 'Όνομα γεγονότος',
	'ct-expert-header' => 'Κλικ "ειδικοί"',
	'ct-intermediate-header' => 'Κλικ "μέτριοι"',
	'ct-beginner-header' => 'Κλικ "αρχάριοι"',
	'ct-total-header' => 'Συνολικά κλικ',
	'ct-start-date' => 'Ημερομηνία έναρξης (ΕΕΕΕΜΜΗΗ)',
	'ct-end-date' => 'Ημερομηνία λήξης (ΕΕΕΕΜΜΗΗ)',
	'ct-increment-by' => 'Αριθμός των ημερών που κάθε σημείο δεδομένων αναπαριστά',
	'ct-change-graph' => 'Αλλαγή γραφήματος',
	'ct-beginner' => 'Αρχάριος',
	'ct-intermediate' => 'Μέτριος',
	'ct-expert' => 'Ειδικός',
	'ct-date-range' => 'Σειρά ημερομηνίας',
	'ct-editing' => 'Τρέχουσα επεξεργασία:',
	'ct-anon-users' => 'Ανώνυμοι χρήστες',
	'ct-user-contribs' => 'Συνολικές συνεισφορές χρήστη',
	'ct-user-span' => 'Συνεισφορά χρήστη σε χρονικό διάστημα',
	'ct-and' => 'και',
	'ct-update-table' => 'Πίνακας ενημερώσεων',
);

/** Esperanto (Esperanto)
 * @author Lucas
 * @author Yekrats
 */
$messages['eo'] = array(
	'clicktracking' => 'Klakspurado de Iniciato de Uzebleco',
	'clicktracking-desc' => 'Sekvado de klakoj, por sekvi klakeventojn kiu ne kaŭzas paĝan refreŝigon',
	'ct-title' => 'Kunkontitaj klakoj de uzantoj',
	'ct-event-name' => 'Eventa nomo',
	'ct-expert-header' => 'Klakoj de "Spertuloj"',
	'ct-intermediate-header' => 'Klakoj de "progresantoj"',
	'ct-beginner-header' => 'Klakoj de "novuloj"',
	'ct-total-header' => 'Sumo de klakoj',
	'ct-start-date' => 'Komenca Dato (JJJJMMTT)',
	'ct-end-date' => 'Fina Dato (JJJJMMTT)',
	'ct-increment-by' => 'Po tagoj por ĉiu datumpunkto',
	'ct-change-graph' => 'Ŝanĝi diagramon',
	'ct-beginner' => 'Novulo',
	'ct-intermediate' => 'Progresanto',
	'ct-expert' => 'Spertulo',
	'ct-date-range' => 'Data intervalo',
	'ct-editing' => 'Nune redaktante:',
	'ct-anon-users' => 'Sennomaj uzantoj',
	'ct-user-contribs' => 'Tuto de uzulaj kontribuoj',
	'ct-user-span' => 'Uzulaj kontribuoj en tempintervalo',
	'ct-and' => 'kaj',
	'ct-update-table' => 'Ĝisdatigi tabelon',
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
 * @author Avjoska
 * @author Pikne
 */
$messages['et'] = array(
	'clicktracking' => 'Kasutushõlpsuse algatuse klõpsujälgimine',
	'clicktracking-desc' => 'Klõpsujälgimine sündmustele, mis ei põhjusta lehekülje taaslaadimist',
	'ct-event-name' => 'Sündmuse nimi',
	'ct-expert-header' => 'Asjatundjaklõpsud',
	'ct-intermediate-header' => 'Edasijõudnuklõpsud',
	'ct-beginner-header' => 'Algajaklõpsud',
	'ct-total-header' => 'Kõik klõpsud',
	'ct-start-date' => 'Alguskuupäev (AAAAKKPP)',
	'ct-end-date' => 'Lõpukuupäev (AAAAKKPP)',
	'ct-change-graph' => 'Muuda graafikut',
	'ct-beginner' => 'Algaja',
	'ct-intermediate' => 'Edasijõudnu',
	'ct-expert' => 'Asjatundja',
	'ct-date-range' => 'Kuupäevavahemik',
	'ct-editing' => 'Parajasti muutmisel:',
	'ct-anon-users' => 'Nimetud kasutajad',
	'ct-user-contribs' => 'Kõik kasutaja muudatused',
	'ct-and' => 'ja',
	'ct-update-table' => 'Uuenda tabelit',
);

/** Basque (Euskara)
 * @author An13sa
 * @author Joxemai
 * @author Unai Fdz. de Betoño
 */
$messages['eu'] = array(
	'clicktracking' => 'Erabilgarritasun Ekimenerako klik laburpena',
	'clicktracking-desc' => 'Orriaren berritzea ez dakarten gertakari laburpenen klik laburpena',
	'ct-title' => 'Gehitutako erabiltzailearen klikak',
	'ct-event-name' => 'Ekintzaren izena',
	'ct-expert-header' => '"Aditu" klikak',
	'ct-intermediate-header' => '"Maila ertaineko" klikak',
	'ct-beginner-header' => '"Hasiberri" klikak',
	'ct-total-header' => 'Klikak guztira',
	'ct-start-date' => 'Hasiera Data (UUUUHHEE)',
	'ct-end-date' => 'Amaiera Data (UUUUHHEE)',
	'ct-increment-by' => 'Data-puntu bakoitzak irudikatzen duen egun kopurua',
	'ct-change-graph' => 'Grafikoa aldatu',
	'ct-beginner' => 'Hasiberria',
	'ct-intermediate' => 'Maila ertainekoa',
	'ct-expert' => 'Aditua',
	'ct-date-range' => 'Data eremua',
	'ct-editing' => 'Orain editatzen:',
	'ct-anon-users' => 'Lankide anonimoak',
	'ct-user-contribs' => 'Lankidearen ekarpen guztiak',
	'ct-user-span' => 'Lankidearen ekarpenak denbora-tarte batean',
	'ct-and' => 'eta',
	'ct-update-table' => 'Taula eguneratu',
);

/** Persian (فارسی)
 * @author Ebraminio
 * @author Ladsgroup
 * @author Sahim
 * @author Wayiran
 */
$messages['fa'] = array(
	'clicktracking' => 'قابلیت ردیابی طرح را کلیک کنید',
	'clicktracking-desc' => 'برای ردیابی کلیک کنید و برای دنبال کردن رویداد هایی که برای تازه کردن صفحه به کار نمی‌رود.',
	'ct-title' => 'جمع کلیک‌های کاربر',
	'ct-event-name' => 'نام رویداد',
	'ct-expert-header' => 'کلیک‌های «متخصص»',
	'ct-intermediate-header' => 'کلیک‌های «متوسط»',
	'ct-beginner-header' => 'کلیک‌های «تازه‌کار»',
	'ct-total-header' => 'مجموع کلیک‌ها',
	'ct-start-date' => 'تاریخ شروع (YYYYMMDD)',
	'ct-end-date' => 'تاریخ پایان (YYYYMMDD)',
	'ct-increment-by' => 'تعداد روزهایی که هر نقطهٔ داده نشان می‌دهد',
	'ct-change-graph' => 'نمودار تغییرات',
	'ct-beginner' => 'مبتدی',
	'ct-intermediate' => 'متوسط',
	'ct-expert' => 'پیشرفته',
	'ct-date-range' => 'بازه زمانی',
	'ct-editing' => 'ویرایش‌های در حال حاضر:',
	'ct-anon-users' => 'کاربران گمنام',
	'ct-user-contribs' => 'مجموع مشارکت‌های کاربر',
	'ct-user-span' => 'مشارکت‌های کاربر در محدودهٔ زمانی',
	'ct-and' => 'و',
	'ct-update-table' => 'جدول بروزرسانی',
);

/** Finnish (Suomi)
 * @author Cimon Avaro
 * @author Crt
 * @author Str4nd
 */
$messages['fi'] = array(
	'clicktracking' => 'Käytettävyyshankkeen napsautusten seuranta',
	'clicktracking-desc' => 'Napsautusten seuranta, tarkoituksena seurata tapahtumia, jotka eivät aiheuta sivun uudelleenlataamista.',
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
 * @author Urhixidur
 */
$messages['fr'] = array(
	'clicktracking' => 'Suivi de clics de l’initiative d’utilisabilité',
	'clicktracking-desc' => 'Suivi de clics, visant à traquer les événements qui ne causent pas un rechargement de page',
	'ct-title' => 'Agrégation des clics d’utilisateurs',
	'ct-event-name' => 'Nom de l’événement',
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
	'ct-date-range' => 'Plage de dates',
	'ct-editing' => 'En cours de modification :',
	'ct-anon-users' => 'Utilisateurs anonymes',
	'ct-user-contribs' => 'Contributions totales des utilisateurs',
	'ct-user-span' => 'Contributions de l’utilisateur pendant la durée',
	'ct-and' => 'et',
	'ct-update-table' => 'Mettre à jour la table',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'clicktracking' => 'Survelyence des clics de l’iniciativa d’utilisabilitât',
	'clicktracking-desc' => 'Survelyence des clics, visent a tracar los èvènements que côsont pas un rechargement de pâge',
	'ct-title' => 'Agrègacion des clics d’utilisators',
	'ct-event-name' => 'Nom de l’èvènement',
	'ct-expert-header' => 'Clics « èxpèrts »',
	'ct-intermediate-header' => 'Clics « entèrmèdièros »',
	'ct-beginner-header' => 'Clics « comencients »',
	'ct-total-header' => 'Soma des clics',
	'ct-start-date' => 'Dâta de comencement (AAAAMMJJ)',
	'ct-end-date' => 'Dâta de fin (AAAAMMJJ)',
	'ct-increment-by' => 'Nombro de jorns que reprèsente châque pouent de balyê',
	'ct-change-graph' => 'Changiér lo diagramo',
	'ct-beginner' => 'Comencient',
	'ct-intermediate' => 'Entèrmèdièro',
	'ct-expert' => 'Èxpèrt',
	'ct-date-range' => 'Plage de dâtes',
	'ct-editing' => 'Aprés étre changiê per :',
	'ct-anon-users' => 'Utilisators pas encartâs',
	'ct-user-contribs' => 'Contribucions totâles ux utilisators',
	'ct-user-span' => 'Contribucions a l’utilisator sur lo temps',
	'ct-and' => 'et',
	'ct-update-table' => 'Betar a jorn la trâbla',
);

/** Scottish Gaelic (Gàidhlig)
 * @author Akerbeltz
 */
$messages['gd'] = array(
	'clicktracking' => 'An lorgachadh briogaidh aig Iomairt na So-chleachdachd',
	'clicktracking-desc' => 'Lorgachadh briogaidh airson sùil a chumail air tachartasan nach cuir air duilleag e fhèin ùrachadh',
	'ct-title' => 'Briogaidhean iomlan le cleachdaichean',
	'ct-event-name' => 'Ainm tachartais',
	'ct-expert-header' => 'Briogaidhean nan "sàr-eòlach"',
	'ct-intermediate-header' => 'Briogaidhean "luchd-eadar-mheadhanach"',
	'ct-beginner-header' => 'Briogaidhean "luchd-tòiseachaidh"',
	'ct-total-header' => 'Briogaidhean uile gu lèir',
	'ct-start-date' => 'Latha tòiseachaidh (BBBBMMLL)',
	'ct-end-date' => 'Latha crìochnachaidh (BBBBMMLL)',
	'ct-increment-by' => "Àireamh de latha a tha gach puing dàta 'ga riochdachadh",
	'ct-change-graph' => 'Atharraich an graf',
	'ct-beginner' => 'Luchd-tòiseachaidh',
	'ct-intermediate' => 'Luchd-eadar-mheadhanach',
	'ct-expert' => 'Sàr-eòlaich',
	'ct-date-range' => 'An raon-ama',
	'ct-editing' => "A' deasachadh an-dràsta:",
	'ct-anon-users' => 'Cleachdaichean gun ainm',
	'ct-user-contribs' => "Mùthaidhean a' chleachdaiche uile gu lèir",
	'ct-user-span' => "Mùthaidhean a' chleachdaiche am broinn an raoin-ama",
	'ct-and' => 'agus',
	'ct-update-table' => 'Ùraich an clàr',
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

/** Manx (Gaelg)
 * @author Shimmin Beg
 */
$messages['gv'] = array(
	'ct-and' => 'as',
);

/** Hebrew (עברית)
 * @author Amire80
 * @author Rotem Liss
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'clicktracking' => 'מעקב לחיצות במיזם השמישות',
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
 * @author Ex13
 * @author Mvrban
 * @author SpeedyGonsales
 */
$messages['hr'] = array(
	'clicktracking' => 'Praćenje klikova u Inicijativi za uporabljivosti',
	'clicktracking-desc' => 'Praćenje klikova, napravljeno za praćenje događaja koji ne dovode do osvježavanja stanice',
	'ct-title' => 'Skupljeni klikovi korisnika',
	'ct-event-name' => 'Naziv događaja',
	'ct-expert-header' => '"Ekspertni" klikovi',
	'ct-intermediate-header' => 'Klikovi iskusnih suradnika',
	'ct-beginner-header' => 'Klikovi početnika',
	'ct-total-header' => 'Ukupno klikova',
	'ct-start-date' => 'Početni datum (DDMMYYYY)',
	'ct-end-date' => 'Završni datum (YYYYMMDD)',
	'ct-increment-by' => 'Broj dana koji svaka podatkovna točka predstavlja',
	'ct-change-graph' => 'Promijeni graf',
	'ct-beginner' => 'Početnik',
	'ct-intermediate' => 'Iskusni korisnik',
	'ct-expert' => 'Stručnjak',
	'ct-date-range' => 'Raspon datuma',
	'ct-editing' => 'Trenutno uređujete:',
	'ct-anon-users' => 'Anonimnih suradnika',
	'ct-user-contribs' => 'Ukupno suradničkih doprinosa',
	'ct-user-span' => 'Doprinosi suradnika u razdoblju',
	'ct-and' => 'i',
	'ct-update-table' => 'Ažuriraj tablicu',
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

/** Igbo (Igbo)
 * @author Ukabia
 */
$messages['ig'] = array(
	'ct-total-header' => 'Ntiyé ole níle',
	'ct-start-date' => 'Ubochi mmbido (YYYYMMDD)',
	'ct-end-date' => 'Ubochi o na kushi (YYYYMMDD)',
	'ct-beginner' => 'Onye mbídó',
	'ct-intermediate' => 'Nke ditu mmá',
	'ct-expert' => 'Díokà',
	'ct-anon-users' => "Ọ'bànifé ézíghị ihu",
	'ct-and' => 'na',
);

/** Ido (Ido)
 * @author Malafaya
 */
$messages['io'] = array(
	'ct-beginner' => 'Novico',
	'ct-expert' => 'Experto',
	'ct-editing' => 'Prezente, vu redaktas:',
	'ct-anon-users' => 'Anonima uzanti',
	'ct-and' => 'e(d)',
	'ct-update-table' => 'Aktualigar tabelo',
);

/** Italian (Italiano)
 * @author Gianfranco
 * @author Una giornata uggiosa '94
 */
$messages['it'] = array(
	'clicktracking' => "Monitoraggio dei click dell'Iniziativa per l'Usabilità",
	'clicktracking-desc' => 'Monitoraggio dei click per gli eventi di monitoraggio che non causano un ricaricamento della pagina',
	'ct-title' => 'Clic utente aggregati',
	'ct-event-name' => "Nome dell'evento",
	'ct-expert-header' => 'Click su "esperto"',
	'ct-intermediate-header' => 'Click su "intermedio"',
	'ct-beginner-header' => 'Click su "principiante"',
	'ct-total-header' => 'Clic totali',
	'ct-start-date' => 'Data Inizio (AAAAMMGG)',
	'ct-end-date' => 'Data Fine (AAAAMMGG)',
	'ct-increment-by' => 'Numero di giorni per ogni punto dati',
	'ct-change-graph' => 'Cambia grafico',
	'ct-beginner' => 'Principiante',
	'ct-intermediate' => 'Medio',
	'ct-expert' => 'Esperto',
	'ct-date-range' => 'Intervallo di date',
	'ct-editing' => 'Attualmente in modifica:',
	'ct-anon-users' => 'Utenti anonimi',
	'ct-user-contribs' => 'Totale contributi utente',
	'ct-user-span' => "Contributi utente nell'arco di tempo",
	'ct-and' => 'e',
	'ct-update-table' => 'Aggiorna la tabella',
);

/** Japanese (日本語)
 * @author Fryed-peach
 * @author 青子守歌
 */
$messages['ja'] = array(
	'clicktracking' => '使用性改善のクリック追跡',
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
 * @author BRUTE
 * @author ITshnik
 * @author Temuri rajavi
 * @author გიორგიმელა
 */
$messages['ka'] = array(
	'clicktracking' => 'Usability ინიციატივის ფარგლებში დაწკაპუნებებზე თვალის დევნება',
	'clicktracking-desc' => 'იმ დაწყაპუნებებზე თვალყურის დევნება, რომლებიც არ იწვევენ გვერდის განახლებას',
	'ct-title' => 'მომხმარებლის აგრეგირებული  დაწკაპუნების',
	'ct-event-name' => 'მოვლენის სახელი',
	'ct-expert-header' => '"ექსპერტის" დაჭერა',
	'ct-intermediate-header' => '"შუალედური" დაწკაპუნებები',
	'ct-beginner-header' => '"დამწყებთა" მოქმედებები',
	'ct-total-header' => 'სულ დაწკაპუნებით',
	'ct-start-date' => 'დაწყების თარიღი (წწწწთთდდ)',
	'ct-end-date' => 'დამთავრების თარიღი (წწწწთთდდ)',
	'ct-increment-by' => 'დღეების რაოდენობა თითოეული მონაცემების წერტილი წარმოადგენს',
	'ct-change-graph' => 'გრაფიკის შეცვლა',
	'ct-beginner' => 'დამწყები',
	'ct-intermediate' => 'შუალედური',
	'ct-expert' => 'ექსპერტი',
	'ct-date-range' => 'თარიღის დიაპაზონი',
	'ct-editing' => 'ამჟამად რედაქტირდება:',
	'ct-anon-users' => 'ანონიმური მომხმარებლები',
	'ct-user-contribs' => 'მომხმარებლების საერთო წვლილი',
	'ct-user-span' => 'მომხმარებლის წვლილი პერიოდში',
	'ct-and' => 'და',
	'ct-update-table' => 'ცხრილის განახლება',
);

/** کھوار (کھوار)
 * @author Rachitrali
 */
$messages['khw'] = array(
	'ct-beginner' => 'شروع کوراک',
	'ct-and' => 'وا',
);

/** Khmer (ភាសាខ្មែរ)
 * @author គីមស៊្រុន
 * @author វ័ណថារិទ្ធ
 */
$messages['km'] = array(
	'ct-event-name' => 'ឈ្មោះព្រឹត្តិការណ៍​',
	'ct-expert-header' => 'ចំនួនការចុចរបស់ «អ្នកជំនាញ»',
	'ct-intermediate-header' => 'ចំនួនការចុចរបស់ «អ្នកមធ្យម»',
	'ct-beginner-header' => 'ចំនួនការចុចរបស់ «អ្នកដំបូង»',
	'ct-total-header' => 'ចំនួនចុចសរុប​',
	'ct-start-date' => 'កាលបរិច្ឆេទ​ចាប់ផ្ដើម (YYYYMMDD)',
	'ct-end-date' => 'កាលបរិច្ឆេទ​បញ្ចប់ (YYYYMMDD)',
	'ct-increment-by' => 'ចំនួនថ្ងៃដែលចំនុចទិន្នន័យនីមួយៗតំណាងអោយ',
	'ct-change-graph' => 'ផ្លាស់ប្ដូរក្រាហ្វ',
	'ct-beginner' => 'អ្នកដំបូង',
	'ct-intermediate' => 'អ្នកមធ្យម',
	'ct-expert' => 'អ្នកជំនាញ',
	'ct-date-range' => 'ដែនកំណត់កាលបរិច្ឆេទ',
	'ct-editing' => 'បច្ចុប្បន្នកំពុង​កែប្រែ៖',
	'ct-anon-users' => 'អ្នកប្រើប្រាស់អនាមិក',
	'ct-user-contribs' => 'ការរួមចំណែកសរុបរបស់អ្នកប្រើប្រាស់',
	'ct-user-span' => 'ការរួមចំណែករបស់អ្នកប្រើប្រាស់ក្នុងរយៈកាលមួយ',
	'ct-and' => 'និង​',
	'ct-update-table' => 'អាប់ដេតតារាង',
);

/** Kannada (ಕನ್ನಡ)
 * @author Nayvik
 */
$messages['kn'] = array(
	'ct-and' => 'ಮತ್ತು',
);

/** Korean (한국어)
 * @author Klutzy
 * @author Kwj2772
 */
$messages['ko'] = array(
	'clicktracking' => 'Usability Initiative 사용자 클릭 추적기',
	'clicktracking-desc' => '마우스 클릭 이벤트 중에서 웹 페이지 새로고침과 관계없는 것들을 추적합니다.',
	'ct-title' => '사용자 클릭 수 집계',
	'ct-event-name' => '이벤트 이름',
	'ct-expert-header' => '"전문가" 클릭 수',
	'ct-intermediate-header' => '"중급 사용자" 클릭 수',
	'ct-beginner-header' => '"초보자" 클릭 수',
	'ct-total-header' => '총 클릭 수',
	'ct-start-date' => '시작 날짜 (YYYYMMDD)',
	'ct-end-date' => '마지막 날짜 (YYYYMMDD)',
	'ct-increment-by' => '각 데이터가 나타내는 일수',
	'ct-change-graph' => '그래프 바꾸기',
	'ct-beginner' => '초보자',
	'ct-intermediate' => '중급 사용자',
	'ct-expert' => '전문가',
	'ct-date-range' => '날짜 범위',
	'ct-editing' => '현재 편집 중:',
	'ct-anon-users' => '익명 사용자',
	'ct-user-contribs' => '총 사용자 기여',
	'ct-user-span' => '특정 기간 동안의 사용자 기여',
	'ct-and' => '그리고',
	'ct-update-table' => '표 업데이트',
);

/** Karachay-Balkar (Къарачай-Малкъар)
 * @author Iltever
 */
$messages['krc'] = array(
	'clicktracking' => 'Юзабилити башламчылыкъ юсю бла басыуланы сынчыкълау',
	'clicktracking-desc' => 'Басыуланы сынчыкълау. Бетни джангыртханнга келтирмеген болууланы сынчыкъларгъа деб этилгенди.',
	'ct-title' => 'Къошулуучуланы чычханлары бла агрегирланнган басыулары',
	'ct-event-name' => 'Болууну аты',
	'ct-expert-header' => '«Экспертлени» басылары',
	'ct-intermediate-header' => '«Орта къошулуучуланы» басыулары',
	'ct-beginner-header' => '«Джангыланы» басыулары',
	'ct-total-header' => 'Бютеу басыула',
	'ct-start-date' => 'Башланнганны датасы (ДДДДААКК)',
	'ct-end-date' => 'Бошалгъанны датасы (ДДДДААКК)',
	'ct-increment-by' => 'Кюнлени, билгилени хар нохтасы кёргюзген саны',
	'ct-change-graph' => 'Графикни тюрлендир',
	'ct-beginner' => 'Джангы адам',
	'ct-intermediate' => 'Орта къошулуучу',
	'ct-expert' => 'Эксперт',
	'ct-date-range' => 'Даталаны диапазону',
	'ct-editing' => 'Бара тургъан тюрлендириу:',
	'ct-anon-users' => 'Анонимле',
	'ct-user-contribs' => 'Бютеу къошулуучула къошхан юлюш',
	'ct-user-span' => 'Къошулуучуланы къошхан юлюшлери кёзюуге кёре',
	'ct-and' => 'эм',
	'ct-update-table' => 'Таблицаны джангырт',
);

/** Colognian (Ripoarisch)
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
	'ct-update-table' => 'De Tabäll op der neuste Schtand bränge',
);

/** Kurdish (Latin) (Kurdî (Latin))
 * @author George Animal
 */
$messages['ku-latn'] = array(
	'ct-and' => 'û',
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

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 */
$messages['li'] = array(
	'clicktracking' => "Klikvolge veur 't Broekbaarheidsinitiatief",
	'clicktracking-desc' => "Klikvolge veur 't volges van hanjelingen die neet 't oprope van 'n nuuj pagina toet gevolg höbbe",
	'ct-title' => 'Samegevoogdje gebroekerskliks',
	'ct-event-name' => 'Gebeurtenis',
	'ct-expert-header' => '"Expert"-kliks',
	'ct-intermediate-header' => '"Gemiddeld"-kliks',
	'ct-beginner-header' => '"Beginner"-kliks',
	'ct-total-header' => 'Kliktotaal',
	'ct-start-date' => 'Startdatum (JJJJMMDD)',
	'ct-end-date' => 'Einddatum (JJJJMMDD)',
	'ct-increment-by' => 'Aantal daag det eder puntj representeert',
	'ct-change-graph' => 'Wiezig grafiek',
	'ct-beginner' => 'Beginner',
	'ct-intermediate' => 'Gemiddeld',
	'ct-expert' => 'Expert',
	'ct-date-range' => 'Periode',
	'ct-editing' => 'Noe bewèrkendje:',
	'ct-anon-users' => 'Anoniem gebroekers',
	'ct-user-contribs' => 'Totaal aantal gebroekersbiedraag',
	'ct-user-span' => 'Gebroekersbiedraag in periode',
	'ct-and' => 'en',
	'ct-update-table' => 'Wèrk tabel bie',
);

/** Lithuanian (Lietuvių)
 * @author Eitvys200
 */
$messages['lt'] = array(
	'ct-total-header' => 'Viso paspaudimų',
	'ct-start-date' => 'Pradžios data (MMMM MM DD)',
	'ct-end-date' => 'Pabaigos data (MMMM MM DD)',
	'ct-beginner' => 'Pradedantysis',
	'ct-expert' => 'Ekspertas',
	'ct-anon-users' => 'Anoniminiai vartotojai',
	'ct-and' => 'ir',
	'ct-update-table' => 'Atnaujinti lentelę',
);

/** Latvian (Latviešu)
 * @author GreenZeb
 * @author Papuass
 */
$messages['lv'] = array(
	'ct-anon-users' => 'Anonīmie lietotāji',
	'ct-user-contribs' => 'Kopējais lietotāja devums',
	'ct-and' => 'un',
);

/** Lazuri (Lazuri)
 * @author Bombola
 */
$messages['lzz'] = array(
	'ct-and' => 'do',
);

/** Minangkabau (Baso Minangkabau)
 * @author VoteITP
 */
$messages['min'] = array(
	'clicktracking' => 'Klik pelacak Inisiatif Kagunoan',
	'clicktracking-desc' => "Klik pelacak untuak menelusuri kejadian yang indak menyebabkan ''refresh'' laman",
	'ct-title' => 'Kumpulan klik pangguno',
	'ct-event-name' => 'Namo kejadian',
	'ct-expert-header' => 'Klik "Mahir"',
	'ct-intermediate-header' => 'Klik "Menengah"',
	'ct-beginner-header' => 'Klik "Rang baru"',
	'ct-total-header' => 'Total klik',
	'ct-start-date' => 'Bamulo (YYYYMMDD)',
	'ct-end-date' => 'Baakhir (YYYYMMDD)',
	'ct-increment-by' => 'Satiok poin mencerminkan jumlah hari',
	'ct-change-graph' => 'Ganti grafik',
	'ct-beginner' => 'Rang baru',
	'ct-intermediate' => 'Menengah',
	'ct-expert' => 'Mahir',
	'ct-date-range' => 'Jangko maso',
	'ct-editing' => 'Kini ko suntingan:',
	'ct-anon-users' => 'Pangguno anonim',
	'ct-user-contribs' => 'Keseluruhan jariah pangguno',
	'ct-user-span' => 'Jariah pangguno dalam rentang waktu',
	'ct-and' => 'dan',
	'ct-update-table' => 'Tabel diperbarui',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'clicktracking' => 'Следење на стискања на Иницијативата за употребливост',
	'clicktracking-desc' => 'Следење на стискања, наменето за следење на постапки кои не предизвикуваат превчитување на страницата',
	'ct-title' => 'Насобрани кориснички кликови',
	'ct-event-name' => 'Име на настанот',
	'ct-expert-header' => 'Стискања на „експерти“',
	'ct-intermediate-header' => 'Стискања на „средни корисници“',
	'ct-beginner-header' => 'Стискања на „почетници“',
	'ct-total-header' => 'Вкупно стискања',
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
	'ct-update-table' => 'Поднови ја табелата',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'clicktracking' => 'യൂസബിലിറ്റി ഇനിഷ്യേറ്റീവ് ക്ലിക്ക് പിന്തുടരൽ',
	'clicktracking-desc' => 'താൾ റിഫ്രഷ് ചെയ്യേണ്ടതില്ലാത്ത സാഹചര്യങ്ങളിൽ ഉപയോഗിക്കുന്ന ക്ലിക്കുകൾ പിന്തുടരൽ',
	'ct-title' => 'ആകെ ഉപയോക്തൃ ഞെക്കലുകൾ',
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

/** Marathi (मराठी)
 * @author Htt
 * @author Mahitgar
 * @author V.narsikar
 * @author अभय नातू
 */
$messages['mr'] = array(
	'clicktracking' => 'ऊपयोगसुलभता उपक्रम टिचकीवेध',
	'clicktracking-desc' => 'पान ताजेतवाने न करणार्‍या प्रसंगांचा(इव्हेंट) वेध घेण्या साठी वेधवर टिचकी मारा',
	'ct-title' => 'एकुण उपयोगकर्ता टिचक्या',
	'ct-event-name' => 'घटनेचे नाव',
	'ct-expert-header' => '"कुशलांच्या" टिचक्या',
	'ct-intermediate-header' => '"मध्यमकौशल्य" टिचक्या',
	'ct-beginner-header' => '"नवशिक्यांच्या" टिचक्या',
	'ct-total-header' => 'एकुण टिचक्या',
	'ct-start-date' => 'सुरवात दिनांक (YYYYMMDD)',
	'ct-end-date' => 'अंतीम दिनांक (YYYYMMDD)',
	'ct-increment-by' => 'प्रत्येक विदा निर्देशक किती दिवसांचे प्रतिनिधीत्व करतो',
	'ct-change-graph' => 'आलेख बदला',
	'ct-beginner' => 'नवशिका',
	'ct-intermediate' => 'मध्यम',
	'ct-expert' => 'तज्ज्ञ',
	'ct-date-range' => 'तारीख सीमा',
	'ct-editing' => 'सध्या संपादत आहे:',
	'ct-anon-users' => 'अनामिक उपयोगकर्ता',
	'ct-user-contribs' => 'सदस्याची एकूण संपादने',
	'ct-user-span' => 'कालावधीतील सदस्याची संपादने',
	'ct-and' => 'आणि',
	'ct-update-table' => 'सारणी (टेबल) अद्ययावत करा',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 * @author Aurora
 * @author CoolCityCat
 * @author Kurniasan
 */
$messages['ms'] = array(
	'clicktracking' => 'Pengesanan klik Inisiatif Kebolehgunaan',
	'clicktracking-desc' => 'Pengesanan klik, bertujuan untuk mengesan peristiwa-peristiwa yang tidak menyebabkan penyegaran semula sebuah laman.',
	'ct-title' => 'Klik pengguna teragregat',
	'ct-event-name' => 'Nama peristiwa',
	'ct-expert-header' => 'Klik "pakar"',
	'ct-intermediate-header' => 'Klik "pertengahan"',
	'ct-beginner-header' => 'Klik "pemula"',
	'ct-total-header' => 'Jumlah klik',
	'ct-start-date' => 'Tarikh Mula (YYYYMMDD)',
	'ct-end-date' => 'Tarikh Tamat (YYYYMMDD)',
	'ct-increment-by' => 'Bilangan hari yang diwakili oleh setiap titik data',
	'ct-change-graph' => 'Tukar graf',
	'ct-beginner' => 'Pemula',
	'ct-intermediate' => 'Pertengahan',
	'ct-expert' => 'Pakar',
	'ct-date-range' => 'Julat tarikh',
	'ct-editing' => 'Sedang menyunting:',
	'ct-anon-users' => 'Pengguna tanpa nama',
	'ct-user-contribs' => 'Jumlah sumbangan pengguna',
	'ct-user-span' => 'Sumbangan pengguna dalam jangka masa',
	'ct-and' => 'dan',
	'ct-update-table' => 'Kemaskini jadual',
);

/** Maltese (Malti)
 * @author Chrisportelli
 */
$messages['mt'] = array(
	'clicktracking' => "Moniteraġġ tal-klikks tal-Inizjattiva ta' Użabilità",
	'clicktracking-desc' => "Moniteraġġ tal-klikks għall-moniteraġġ ta' avvenimenti li ma jikkawżawx riffriskar tal-paġna",
	'ct-title' => 'Klikks tal-utenti aggregati',
	'ct-event-name' => 'Isem tal-avveniment',
	'ct-expert-header' => 'Klikks fuq "Espert"',
	'ct-intermediate-header' => 'Klikks fuq "Intermedju"',
	'ct-beginner-header' => 'Klikks fuq "Prinċipjant"',
	'ct-total-header' => "Total ta' klikks",
	'ct-start-date' => 'Data tal-bidu (SSSSXXJJ)',
	'ct-end-date' => 'Data tat-tmiem (SSSSXXJJ)',
	'ct-increment-by' => "Numru ta' ġranet li kull punt ta' data jirrappreżenta",
	'ct-change-graph' => 'Biddel il-grafu',
	'ct-beginner' => 'Prinċipjant',
	'ct-intermediate' => 'Intermedju',
	'ct-expert' => 'Espert',
	'ct-date-range' => "Intervall ta' dati",
	'ct-editing' => 'Attwalment timmodifika:',
	'ct-anon-users' => 'Utenti anonimi',
	'ct-user-contribs' => 'Total tal-kontribuzzjonijiet tal-utent',
	'ct-user-span' => 'Kontribuzzjonijiet tal-utent fix-xefaq temporanju adottat',
	'ct-and' => 'u',
	'ct-update-table' => 'Aġġorna t-tabella',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'ct-anon-users' => 'Лемтеме сёрмадыця',
);

/** Nahuatl (Nāhuatl)
 * @author Ricardo gs
 * @author Teòtlalili
 */
$messages['nah'] = array(
	'ct-and' => 'wàn',
);

/** Nedersaksisch (Nedersaksisch)
 * @author Servien
 */
$messages['nds-nl'] = array(
	'ct-event-name' => 'Gebeurtenisse',
	'ct-expert-header' => '"Expert"-kliks',
);

/** Nepali (नेपाली)
 * @author Bhawani Gautam
 * @author Bhawani Gautam Rhk
 */
$messages['ne'] = array(
	'ct-and' => 'अनि',
	'ct-update-table' => 'तालिका अद्यतन गर्ने',
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
 * @author Eirik
 * @author Gunnernett
 * @author Harald Khan
 */
$messages['nn'] = array(
	'ct-title' => 'Oppsamla brukarklikk',
	'ct-event-name' => 'Namn på hending',
	'ct-expert-header' => '«Ekspertklikk»',
	'ct-intermediate-header' => '«Vidarekomen-klikk»',
	'ct-beginner-header' => '«Nybegynnarklikk»',
	'ct-total-header' => 'Klikk i alt',
	'ct-start-date' => 'Startdato (ÅÅÅÅMMDD)',
	'ct-end-date' => 'Sluttdato (ÅÅÅÅMMDD)',
	'ct-increment-by' => 'Tal dagar for kvart datapunkt',
	'ct-change-graph' => 'Endre graf',
	'ct-beginner' => 'Nybegynnar',
	'ct-intermediate' => 'Vidarekomen',
	'ct-expert' => 'Ekspert',
	'ct-date-range' => 'Datoar som viser',
	'ct-editing' => 'Endrar no:',
	'ct-anon-users' => 'Anonyme brukarar',
	'ct-user-contribs' => 'Bidrag i alt',
	'ct-user-span' => 'Bidrag i tid',
	'ct-and' => 'og',
	'ct-update-table' => 'Oppdater tabell',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 * @author Laaknor
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'clicktracking' => 'Klikksporing for brukervennlighetsprosjektet.',
	'clicktracking-desc' => 'Sporer klikk som ikke forårsaker lasting av ny side.',
	'ct-title' => 'Oppsamlede brukerklikk',
	'ct-event-name' => 'Hendelsesnavn',
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
	'ct-update-table' => 'Oppdater tabell',
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

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'ct-beginner' => 'Aafaenger',
	'ct-and' => 'unn',
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

/** Western Punjabi (پنجابی)
 * @author Khalid Mahmood
 */
$messages['pnb'] = array(
	'ct-beginner' => 'مڈلا',
	'ct-and' => 'تے',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'ct-event-name' => 'د پېښې نوم',
	'ct-start-date' => 'د پيل نېټه (ک.ک.ک.ک.م.م.و.و)',
	'ct-end-date' => 'د پای نېټه (ک.ک.ک.ک.م.م.و.و)',
	'ct-change-graph' => 'ګراف بدلول',
	'ct-anon-users' => 'ورکنومي کارنان',
	'ct-user-contribs' => 'د کارن ټولټال ونډې',
	'ct-and' => 'او',
	'ct-update-table' => 'لښتيال اوسمهالول',
);

/** Portuguese (Português)
 * @author Giro720
 * @author Hamilton Abreu
 * @author Lijealso
 */
$messages['pt'] = array(
	'clicktracking' => 'Monitorização de cliques da Iniciativa de Usabilidade',
	'clicktracking-desc' => 'Monitorização de cliques para seguir eventos que não causam refrescamento da página',
	'ct-title' => 'Cliques de utilizador agregados',
	'ct-event-name' => 'Nome do evento',
	'ct-expert-header' => 'Cliques de "Perito"',
	'ct-intermediate-header' => 'Cliques de "Intermédio"',
	'ct-beginner-header' => 'Cliques de "Iniciante"',
	'ct-total-header' => 'Cliques totais',
	'ct-start-date' => 'Data de Início (AAAAMMDD)',
	'ct-end-date' => 'Data de Fim (AAAAMMDD)',
	'ct-increment-by' => 'Número de dias representado por cada ponto',
	'ct-change-graph' => 'Mudar gráfico',
	'ct-beginner' => 'Iniciante',
	'ct-intermediate' => 'Intermédio',
	'ct-expert' => 'Perito',
	'ct-date-range' => 'Intervalo de datas',
	'ct-editing' => 'A editar actualmente:',
	'ct-anon-users' => 'Utilizadores anónimos',
	'ct-user-contribs' => 'Total de contribuições dos utilizadores',
	'ct-user-span' => 'Contribuições dos utilizadores no período de tempo',
	'ct-and' => 'e',
	'ct-update-table' => 'Actualizar tabela',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author 555
 * @author Eduardo.mps
 * @author Everton137
 * @author Hamilton Abreu
 * @author Luckas Blade
 */
$messages['pt-br'] = array(
	'clicktracking' => 'Monitoramento de cliques da Iniciativa de Usabilidade',
	'clicktracking-desc' => 'Monitoramento de cliques, destinado ao monitoramento de eventos que não causem uma atualização de página',
	'ct-title' => 'Cliques de usuário agregados',
	'ct-event-name' => 'Nome do evento',
	'ct-expert-header' => 'Cliques de "experiente"',
	'ct-intermediate-header' => 'Cliques de usuário "intermediário"',
	'ct-beginner-header' => 'Cliques de "Iniciante"',
	'ct-total-header' => 'Cliques totais',
	'ct-start-date' => 'Data de início (AAAAMMDD)',
	'ct-end-date' => 'Data de término (AAAAMMDD)',
	'ct-increment-by' => 'Número de dias representado por cada ponto',
	'ct-change-graph' => 'Mudar gráfico',
	'ct-beginner' => 'Iniciante',
	'ct-intermediate' => 'Intermediário',
	'ct-expert' => 'Experiente',
	'ct-date-range' => 'Intervalo de datas',
	'ct-editing' => 'Atualmente editando:',
	'ct-anon-users' => 'Usuários anônimos',
	'ct-user-contribs' => 'Total de contribuições dos usuários',
	'ct-user-span' => 'Contribuições dos usuários no período de tempo',
	'ct-and' => 'e',
	'ct-update-table' => 'Atualizar tabela',
);

/** Quechua (Runa Simi)
 * @author AlimanRuna
 */
$messages['qu'] = array(
	'clicktracking' => "Llamk'apunalla ruraykachanap ñit'ipasqakuna qatipaynin",
	'clicktracking-desc' => "Ñit'ipasqakuna qatipay mana p'anqata musuqchaq tukusqakunata qatipanapaq",
	'ct-title' => "Ruraqpa tawqachasqa ñit'ipasqankuna",
	'ct-event-name' => 'Tukusqap sutin',
	'ct-expert-header' => '"Kamayuqpa" ñit\'ipasqankuna',
	'ct-intermediate-header' => '"Ñawparikusqap" ñit\'ipasqankuna',
	'ct-beginner-header' => '"Qallariqpa" ñit\'ipasqankuna',
	'ct-total-header' => "Tukuy ñit'ipasqankuna",
	'ct-start-date' => "Qallariy p'unchaw (WWWWKKPP)",
	'ct-end-date' => "Puchukay p'unchaw (WWWWKKPP)",
	'ct-increment-by' => "Hayk'a p'unchawta llapa t'uksi (iñu) rikuchikun",
	'ct-change-graph' => "Wakinchasqamanta rikch'a",
	'ct-beginner' => 'Qallariq',
	'ct-intermediate' => 'Ñawparikusqa',
	'ct-expert' => 'Kamayuq',
	'ct-date-range' => "Kaymanta chaykama p'unchawkuna",
	'ct-editing' => "Kunan llamk'apuchkaspa:",
	'ct-anon-users' => 'Sutinnaq ruraqkuna',
	'ct-user-contribs' => "Ruraqpa tukuy llamk'apusqankuna",
	'ct-user-span' => "Ruraqpa llamk'apusqankuna wiñaykawsaypachapi",
	'ct-and' => '+',
	'ct-update-table' => 'Wachuchasqata musuqchay',
);

/** Romanian (Română)
 * @author AdiJapan
 * @author Cin
 * @author Firilacroco
 * @author Lionbeat
 * @author Minisarm
 * @author Stelistcristi
 */
$messages['ro'] = array(
	'clicktracking' => 'Monitorizarea clicurilor de către Inițiativa de Utilizabilitate',
	'clicktracking-desc' => 'Monitorizarea clicurilor în scopul monitorizării evenimentelor care nu produc reîncărcarea paginii',
	'ct-title' => 'Clicuri utilizator cumulate',
	'ct-event-name' => 'Numele evenimentului',
	'ct-expert-header' => 'Clicuri „expert”',
	'ct-intermediate-header' => 'Clicuri „intermediar”',
	'ct-beginner-header' => 'Clicuri „începător”',
	'ct-total-header' => 'Total clicuri',
	'ct-start-date' => 'Data de start (AAAALLZZ)',
	'ct-end-date' => 'Data de sfârșit (AAAALLZZ)',
	'ct-increment-by' => 'Număr de zile reprezentate de fiecare punct din grafic',
	'ct-change-graph' => 'Grafic de schimbări',
	'ct-beginner' => 'Începător',
	'ct-intermediate' => 'Intermediar',
	'ct-expert' => 'Expert',
	'ct-date-range' => 'Interval de timp',
	'ct-editing' => 'În curs de modificare:',
	'ct-anon-users' => 'Utilizatori anonimi',
	'ct-user-contribs' => 'Totalul contribuțiilor utilizatorului',
	'ct-user-span' => 'Contribuțiile utilizatorului în intervalul de timp',
	'ct-and' => 'și',
	'ct-update-table' => 'Actualizare tabel',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'clicktracking' => "Iniziative de Ausabbeletà cazze 'u tracciamende",
	'clicktracking-desc' => "Cazze tracciamende pu tracciamende de le evende ca non ge causane l'aggiornamende d'a pàgene.",
	'ct-title' => "Cazzaminde de l'utinde aggregate",
	'ct-event-name' => "Nome de l'evende",
	'ct-expert-header' => 'Cazzaminde de l\'"esperrte"',
	'ct-intermediate-header' => 'Cazzaminde de l\'"Indermedie"',
	'ct-beginner-header' => 'Cazzaminde de le "Curciule"',
	'ct-total-header' => 'Cazzaminde totale',
	'ct-start-date' => 'Date de Inizie (YYYYMMD)',
	'ct-end-date' => 'Date de Fine (YYYYMMD)',
	'ct-increment-by' => 'Numere de sciurne ca ogne punde de date rappresende',
	'ct-change-graph' => "Cange 'u grafeche",
	'ct-beginner' => 'Curciule',
	'ct-intermediate' => 'Intermedie',
	'ct-expert' => 'Esperte',
	'ct-date-range' => 'Indervalle de date',
	'ct-editing' => 'Cangiaminde de mò:',
	'ct-anon-users' => 'Utinde anonime',
	'ct-user-contribs' => "Condrebbute totale de l'utende",
	'ct-user-span' => "Condrebbute de l'utende sus a 'u timbe",
	'ct-and' => 'e',
	'ct-update-table' => "Aggiorne 'a tabbelle",
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

/** Rusyn (Русиньскый)
 * @author Gazeb
 */
$messages['rue'] = array(
	'clicktracking' => 'Слїдованя кликнутёх про Ініціатіву хосновательности.',
	'clicktracking-desc' => 'Слїдованя кликнутёх про слїдованя подїй, котры не запричінюють зновуначітаня сторінкы',
	'ct-title' => 'Аґреґованы кликнутя',
	'ct-event-name' => 'Назва події',
	'ct-expert-header' => 'Кликів «експертів»',
	'ct-intermediate-header' => 'Кликів «покрочілых»',
	'ct-beginner-header' => 'Кликнутя «новачків»',
	'ct-total-header' => 'Цілком кликів',
	'ct-start-date' => 'Датум початку (РРРРММДД)',
	'ct-end-date' => 'Датум кінця (РРРРММДД)',
	'ct-increment-by' => 'Почет днїв репрезентованых каждым бодом.',
	'ct-change-graph' => 'Змінити ґраф',
	'ct-beginner' => 'Новачок',
	'ct-intermediate' => 'Покрочілый',
	'ct-expert' => 'Експерт',
	'ct-date-range' => 'Часовый розсяг',
	'ct-editing' => 'Актівны хоснователї:',
	'ct-anon-users' => 'Анонімны хоснователї',
	'ct-user-contribs' => 'Цілком приспевків хоснователя',
	'ct-user-span' => 'Приспевкы хоснователїв за період',
	'ct-and' => 'і',
	'ct-update-table' => 'Актуалізовати таблицю',
);

/** Sakha (Саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'clicktracking' => 'Баттааһыннары Табыгас Ситиһиитин иһинэн кэтээһин',
	'clicktracking-desc' => 'Баттааһыны кэтээһин. Сирэйи саҥардыбат түбэлтэлэри кэтииргэ туттуллар',
	'ct-title' => 'Кыттааччылар холбоммут клииктара',
	'ct-event-name' => 'Түбэлтэ аата',
	'ct-expert-header' => '"Экспертар" баттааһыннара (клик)',
	'ct-intermediate-header' => '"Орто кыттааччылар" баттааһыннара (клик)',
	'ct-beginner-header' => '"Саҕалааччылар" баттааһыннара (клик)',
	'ct-total-header' => 'Баттааһын барытын ахсаана',
	'ct-start-date' => 'Саҕаламмыт күнэ-ыйа (ССССЫЫКК)',
	'ct-end-date' => 'Бүппүт күнэ-дьыла (ССССЫЫКК)',
	'ct-increment-by' => 'Дааннайдар хас биирдии точкаларын көрдөрөр күннэрин ахсаана',
	'ct-change-graph' => 'Графигы уларытыы',
	'ct-beginner' => 'Саҥа кыттааччы',
	'ct-intermediate' => 'Бороохтуйбут кыттааччы',
	'ct-expert' => 'Эксперт',
	'ct-date-range' => 'Күн-дьыл диапазона',
	'ct-editing' => 'Билиҥҥи көннөрүү:',
	'ct-anon-users' => 'Ааттамматах кыттааччылар',
	'ct-user-contribs' => 'Кыттааччылар бүттүүн кылааттара',
	'ct-user-span' => 'Ханнык эрэ быстах кэмҥэ кыттааччылар кылааттара',
	'ct-and' => 'уонна',
	'ct-update-table' => 'Таабылы саҥардыы',
);

/** Sardinian (Sardu)
 * @author Andria
 */
$messages['sc'] = array(
	'ct-and' => 'e',
);

/** Sicilian (Sicilianu)
 * @author Aushulz
 */
$messages['scn'] = array(
	'ct-anon-users' => 'Utenti anònimi',
	'ct-and' => 'e',
);

/** Sinhala (සිංහල)
 * @author චතුනි අලහප්පෙරුම
 * @author බිඟුවා
 */
$messages['si'] = array(
	'ct-total-header' => 'මුළු ක්ලික් ගණන',
	'ct-start-date' => 'ඇරඹුම් දිනය (YYYYMMDD)',
	'ct-end-date' => 'අවසන් දිනය (YYYYMMDD)',
	'ct-increment-by' => 'එක් එක් දත්ත ලක්ෂ්‍යය නිරූපණය කරන දින සංඛ්‍යාව',
	'ct-change-graph' => 'ප්‍රස්තාරය වෙනස් කරන්න',
	'ct-beginner' => 'නවකයා',
	'ct-intermediate' => 'අතරමැදි',
	'ct-expert' => 'ප්‍රවීණයා',
	'ct-date-range' => 'දත්ත පරාසය',
	'ct-editing' => 'වත්මන සංස්කරණය කෙරෙමින්:',
	'ct-anon-users' => 'නිර්නාමික පරිශීලකයන්',
	'ct-user-contribs' => 'මුළු පරිශීලක දායකත්වයන්',
	'ct-user-span' => 'කාලපරාසය තුලදී පරිහීලක දායකත්වයන්',
	'ct-and' => 'සහ',
	'ct-update-table' => 'වගුව යාවත්කාල කරන්න',
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
 * @author Dbc334
 * @author Smihael
 */
$messages['sl'] = array(
	'clicktracking' => 'Sledenje klikom Iniciative za uporabnost',
	'clicktracking-desc' => 'Sledenje klikom, namenjeno odkrivanju dogodkov, ki preprečujejo osvežitev strani med urejanjem',
	'ct-title' => 'Zbrani uporabniški kliki',
	'ct-event-name' => 'Ime dogodka',
	'ct-expert-header' => 'Klikov »Strokovnjakov«',
	'ct-intermediate-header' => 'Klikov »Nadaljevalcev«',
	'ct-beginner-header' => 'Klikov »Začetnikov«',
	'ct-total-header' => 'Skupno klikov',
	'ct-start-date' => 'Začetni datum (YYYYMMDD)',
	'ct-end-date' => 'Končni datum (YYYYMMDD)',
	'ct-increment-by' => 'Število dni, ki jih predstavlja vsaka podatkovna točka',
	'ct-change-graph' => 'Graf sprememb',
	'ct-beginner' => 'Začetnik',
	'ct-intermediate' => 'Nadaljevalec',
	'ct-expert' => 'Strokovnjak',
	'ct-date-range' => 'Časovno obdobje',
	'ct-editing' => 'Trenutno urejanje:',
	'ct-anon-users' => 'Brezimni uporabniki',
	'ct-user-contribs' => 'Skupno število uporabniških prispevkov',
	'ct-user-span' => 'Uporabniški prispevki v časovnem razponu',
	'ct-and' => 'in',
	'ct-update-table' => 'Posodobi tabelo',
);

/** Serbian Cyrillic ekavian (‪Српски (ћирилица)‬)
 * @author Rancher
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'ct-event-name' => 'Назив догађаја',
	'ct-expert-header' => 'Кликови "експерата"',
	'ct-intermediate-header' => 'Кликови "напредних"',
	'ct-beginner-header' => 'Кликови "почетника"',
	'ct-total-header' => 'Укупно кликова',
	'ct-start-date' => 'Почетни датум (YYYYMMDD)',
	'ct-end-date' => 'Крајњи датум (YYYYMMDD)',
	'ct-change-graph' => 'Промени графикон',
	'ct-beginner' => 'Почетник',
	'ct-intermediate' => 'Напредни',
	'ct-expert' => 'Стручњак',
	'ct-date-range' => 'Опсег датума',
	'ct-editing' => 'Тренутно мења:',
	'ct-anon-users' => 'Анонимни корисници',
	'ct-user-contribs' => 'Укупно прилога',
	'ct-and' => 'и',
	'ct-update-table' => 'Ажурирај табелу',
);

/** Serbian Latin ekavian (‪Srpski (latinica)‬) */
$messages['sr-el'] = array(
	'ct-expert-header' => 'Klikovi "eksperata"',
	'ct-intermediate-header' => 'Klikovi "naprednih"',
	'ct-beginner-header' => 'Klikovi "početnika"',
	'ct-total-header' => 'Ukupno klikova',
	'ct-start-date' => 'Početni datum (YYYYMMDD)',
	'ct-end-date' => 'Krajnji datum (YYYYMMDD)',
	'ct-beginner' => 'Početnik',
	'ct-intermediate' => 'Napredni',
	'ct-expert' => 'Ekspert',
	'ct-date-range' => 'Opseg datuma',
	'ct-editing' => 'Trenutno menja:',
	'ct-anon-users' => 'Anonimni korisnici',
	'ct-user-contribs' => 'Ukupno korisničkih doprinosa',
	'ct-and' => 'i',
	'ct-update-table' => 'Ažuriraj tabelu',
);

/** Sundanese (Basa Sunda)
 * @author Kandar
 */
$messages['su'] = array(
	'clicktracking' => 'Panglacak klik Inisiatif Kamangpaatan',
	'ct-event-name' => 'Ngaran acara',
	'ct-expert-header' => 'Klik "ahli"',
	'ct-intermediate-header' => 'Klik "menengah"',
	'ct-beginner-header' => 'Klik "pemula"',
	'ct-total-header' => 'Jumlah klik',
	'ct-start-date' => 'Titimangsa Ngamimitian (YYYYMMDD)',
	'ct-end-date' => 'Titimangsa Anggeusan (YYYYMMDD)',
	'ct-change-graph' => 'Robah grafik',
	'ct-beginner' => 'Pemula',
	'ct-intermediate' => 'Menengah',
	'ct-expert' => 'Mahér',
	'ct-date-range' => 'Selang titimangsa',
	'ct-editing' => 'Keur ngédit:',
	'ct-anon-users' => 'Pamaké anonim',
	'ct-user-contribs' => 'Sakabéh kontribusi pamaké',
	'ct-user-span' => 'Kontribusi pamaké tina lilana',
	'ct-and' => 'jeung',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author GameOn
 */
$messages['sv'] = array(
	'clicktracking' => 'Klickspårning för användbarhetsinitiativet',
	'clicktracking-desc' => 'Spårar klickningar för spårningshändelser som inte orsakar en siduppdatering',
	'ct-title' => 'Sammanlagda användarklickningar',
	'ct-event-name' => 'Händelsenamn',
	'ct-expert-header' => '"Expertklick"',
	'ct-intermediate-header' => 'Klickningar på "mellannivå"',
	'ct-beginner-header' => '"Nybörjarklick"',
	'ct-total-header' => 'Totala antalet klick',
	'ct-start-date' => 'Startdatum (YYYYMMDD)',
	'ct-end-date' => 'Slutdatum (YYYYMMDD)',
	'ct-increment-by' => 'Antal dagar varje datapunkt representerar',
	'ct-change-graph' => 'Ändra graf',
	'ct-beginner' => 'Nybörjare',
	'ct-intermediate' => 'Mellannivå',
	'ct-expert' => 'Expert',
	'ct-date-range' => 'Datumomfång',
	'ct-editing' => 'Redigerar nu:',
	'ct-anon-users' => 'Anonyma användare',
	'ct-user-contribs' => 'Totalt antal användarbidrag',
	'ct-user-span' => 'Användarbidrag i tidsperiod',
	'ct-and' => 'och',
	'ct-update-table' => 'Tppdatera tabell',
);

/** Swahili (Kiswahili)
 * @author Ikiwaner
 * @author Lloffiwr
 */
$messages['sw'] = array(
	'ct-event-name' => 'Jina la tukio',
	'ct-start-date' => 'Tarehe ya kuanza (mwaka - tarakimu 4, mwezi - tarakimu 2, siku - tarakimu 2)',
	'ct-end-date' => 'Tarehe ya kumaliza (mwaka - tarakimu 4, mwezi - tarakimu 2, siku - tarakimu 2)',
	'ct-beginner' => 'Mwanzishi',
	'ct-expert' => 'Mtaalam',
	'ct-anon-users' => 'Watumiaji bila majina',
	'ct-user-contribs' => 'Jumla ya michango ya mtumiaji',
	'ct-and' => 'na',
	'ct-update-table' => 'Sasisha jedwali',
);

/** Tamil (தமிழ்)
 * @author TRYPPN
 */
$messages['ta'] = array(
	'ct-start-date' => 'ஆரம்பத் தேதி (YYYYMMDD)',
	'ct-end-date' => 'முடிவுத் தேதி (YYYYMMDD)',
	'ct-beginner' => 'ஆரம்பநிலையில் உள்ளவர்',
	'ct-intermediate' => 'இடைப்பட்ட நிலையில் உள்ளவர்',
	'ct-expert' => 'முதிர்ந்த நிலையில் உள்ளவர்',
	'ct-and' => 'மற்றும்',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'ct-title' => 'సంకలిత వాడుకరి నొక్కులు',
	'ct-event-name' => 'ఘటన పేరు',
	'ct-expert-header' => '"నిపుణుల" నొక్కులు',
	'ct-beginner-header' => '"ప్రారంభీకుల" నొక్కులు',
	'ct-total-header' => 'మొత్తం నొక్కులు',
	'ct-start-date' => 'ప్రారంభ తేదీ (YYYYMMDD)',
	'ct-end-date' => 'ముగింపు తేదీ (YYYYMMDD)',
	'ct-increment-by' => 'ప్రతీ దత్తాంశ బిందువు ప్రతిబింబించే రోజుల సంఖ్య',
	'ct-change-graph' => 'గ్రాఫుని మార్చు',
	'ct-beginner' => 'ప్రారంభీకులు',
	'ct-expert' => 'నిపుణులు',
	'ct-date-range' => 'తేదీ వ్యవధి',
	'ct-editing' => 'ప్రస్తుతం మారుస్తున్నారు:',
	'ct-anon-users' => 'అజ్ఞాత వాడుకరులు',
	'ct-user-contribs' => 'మొత్తం వాడుకరి రచనలు',
	'ct-and' => 'మరియు',
	'ct-update-table' => 'పట్టికని తాజాకరించు',
);

/** Thai (ไทย)
 * @author Octahedron80
 */
$messages['th'] = array(
	'ct-start-date' => 'วันที่เริ่มต้น (YYYYMMDD)',
	'ct-end-date' => 'วันที่สิ้นสุด (YYYYMMDD)',
	'ct-and' => 'และ',
);

/** Turkmen (Türkmençe)
 * @author Hanberke
 */
$messages['tk'] = array(
	'clicktracking' => 'Oňaýlylyk Başlangyjy tyklama trekingi',
	'clicktracking-desc' => 'Sahypa täzelemesine sebäp bolmaýan wakalary treklemek üçin tyklama trekingi',
	'ct-title' => 'Agregirlenen ulanyjy tyklamalary',
	'ct-event-name' => 'Waka ady',
	'ct-expert-header' => '"Ekspert" tyklamalary',
	'ct-intermediate-header' => '"Orta tap" tyklamalary',
	'ct-beginner-header' => '"Öwrenje" tyklamalary',
	'ct-total-header' => 'Jemi tyklama',
	'ct-start-date' => 'Başlangyç senesi (YYYYMMDD)',
	'ct-end-date' => 'Gutaryş senesi (YYYYMMDD)',
	'ct-increment-by' => 'Her maglumat nokadyny görkezýän gün sany',
	'ct-change-graph' => 'Grafigi üýtget',
	'ct-beginner' => 'Öwrenje',
	'ct-intermediate' => 'Orta tap',
	'ct-expert' => 'Ekspert',
	'ct-date-range' => 'Sene aralygy',
	'ct-editing' => 'Şu wagt redaktirleýär:',
	'ct-anon-users' => 'Anonim ulanyjylar',
	'ct-user-contribs' => 'Jemi ulanyjy goşantlary',
	'ct-user-span' => 'Wagtyň dowamynda ulanyjy goşantlary',
	'ct-and' => 'we',
	'ct-update-table' => 'Tablisany täzele',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'clicktracking' => 'papindot na pagsubaybay sa Pasimula ng Pagkanagagamit',
	'clicktracking-desc' => 'Papindot na pangpagsubaybay para sa pagsubaybay ng  mga kaganapang hindi nakakasanhi ng pagsariwa ng isang pahina',
	'ct-title' => 'Tinipong mga pagpindot ng tagagamit',
	'ct-event-name' => 'Pangalan ng kaganapan',
	'ct-expert-header' => 'Mga pagpindot na "dalubhasa"',
	'ct-intermediate-header' => 'Mga pagpindot na "nasa pagitan"',
	'ct-beginner-header' => 'Mga pagpindot na "pambaguhan"',
	'ct-total-header' => 'Kabuoan ng mga pagpindot',
	'ct-start-date' => 'Simula ng Petsa (TTTTBBAA)',
	'ct-end-date' => 'Pangwakas na Petsa (TTTTBBAA)',
	'ct-increment-by' => 'Bilang ng mga araw na kinakatawan ng bawat punto ng dato',
	'ct-change-graph' => 'Baguhin ang talangguhit',
	'ct-beginner' => 'Baguhan',
	'ct-intermediate' => 'Panggitna',
	'ct-expert' => 'Dalubhasa',
	'ct-date-range' => 'Sakop na petsa',
	'ct-editing' => 'Kasalukuyang pinapatnugutan:',
	'ct-anon-users' => 'Hindi nakikilalang mga tagagamit',
	'ct-user-contribs' => 'Kabuuan ng mga ambag ng tagagamit',
	'ct-user-span' => 'Mga ambag ng tagagamit sa loob ng dangkal ng panahon',
	'ct-and' => 'at',
	'ct-update-table' => 'Isapanahon ang tabla',
);

/** Turkish (Türkçe)
 * @author Joseph
 * @author Vito Genovese
 */
$messages['tr'] = array(
	'clicktracking' => 'Kullanılabilirlik Girişimi tıklama izleme',
	'clicktracking-desc' => 'Tıklama izleme, bir sayfa yenilemesine sebep olmadan olayları izleme amaçlı',
	'ct-title' => 'Kümeli kullanıcı tıklamaları',
	'ct-event-name' => 'Olay adı',
	'ct-expert-header' => '"Uzman" tıklamaları',
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
	'ct-editing' => 'Şu anda değiştiriyor:',
	'ct-anon-users' => 'Anonim kullanıcılar',
	'ct-user-contribs' => 'Toplam kullanıcı katkıları',
	'ct-user-span' => 'Zaman içerisindeki kullanıcı katkıları',
	'ct-and' => 've',
	'ct-update-table' => 'Tabloyu güncelle',
);

/** Tatar (Cyrillic) (Татарча/Tatarça (Cyrillic))
 * @author Ильнар
 */
$messages['tt-cyrl'] = array(
	'clicktracking' => 'Яңа юзабилитины сайлаучыларны күзәтү',
	'clicktracking-desc' => 'Караулар төймәсе. Бу битне яңартмыйча башкарылган эшләрне карау өчен бирелгән',
	'ct-title' => 'Кабатланган төймә басулары',
	'ct-event-name' => 'Вакыйганың исеме',
	'ct-expert-header' => '«Белгечләр» басу',
	'ct-intermediate-header' => '«Уртача кулланучылар» басу',
	'ct-beginner-header' => '«Яңа кулланучылар» басу',
	'ct-total-header' => 'Барлык басулар',
	'ct-start-date' => 'Башлау вакыты (YYYYMMDD)',
	'ct-end-date' => 'Бетә вакыты (YYYYMMDD)',
	'ct-increment-by' => 'Мәгълүмат белән тәэмин итүче көннәр саны',
	'ct-change-graph' => 'Сызымны үзгәртү',
	'ct-beginner' => 'Яңа кулланучы',
	'ct-intermediate' => 'Уртача кулланучы',
	'ct-expert' => 'Белгеч',
	'ct-date-range' => 'Вакыт бүленеше',
	'ct-editing' => 'Әлеге үзгәртү',
	'ct-anon-users' => 'Аноним кулланучылар',
	'ct-user-contribs' => 'Кулланучының гомуми кертеме',
	'ct-user-span' => 'Билге бер вакыт өчендә кулланучыларны кертеме',
	'ct-and' => 'һәм',
	'ct-update-table' => 'Битне яңарту',
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

/** Volapük (Volapük)
 * @author Malafaya
 */
$messages['vo'] = array(
	'ct-and' => 'e',
);

/** Yiddish (ייִדיש)
 * @author פוילישער
 */
$messages['yi'] = array(
	'clicktracking' => 'ניצלעכקייט איניציאַטיוו קליקן אויפֿפאַסן',
	'ct-beginner' => 'אָנהייבער',
	'ct-anon-users' => 'אַנאנימע באַניצער',
	'ct-user-contribs' => 'סח"כ באַניצער בײַשטײַערונגען',
	'ct-and' => 'און',
	'ct-update-table' => 'דערהײַנטיקן טאַבעלע',
);

/** Yoruba (Yorùbá)
 * @author Demmy
 */
$messages['yo'] = array(
	'clicktracking' => 'Ìtẹ̀lé títẹ̀ Ìṣeémúlò Abẹ̀rẹ̀fúnraẹni',
	'clicktracking-desc' => 'Ìtẹ̀lé títẹ̀ fún títẹ̀lé àwọn ìṣẹ̀lẹ̀ tí wọn kò jẹ́ kí ojúewé kó túnraṣe',
	'ct-title' => 'Àròpapọ̀ àwọn títẹ̀ oníṣe',
	'ct-event-name' => 'Orúkọ ìṣèlẹ̀',
	'ct-expert-header' => 'Àwọn títẹ̀ "Awo"',
	'ct-intermediate-header' => 'Àwọn títẹ̀ "àrin"',
	'ct-beginner-header' => 'Àwọn títẹ̀ "olùkọ́bẹ̀rẹ̀"',
	'ct-total-header' => 'Àpapọ̀ iye títẹ̀',
	'ct-start-date' => 'Ọjọ́ ìbẹ̀rẹ̀ (YYYYMMDD)',
	'ct-end-date' => 'Ọjọ́ ìparí (YYYYMMDD)',
	'ct-increment-by' => 'Iye ọjọ́ tí ojúàmì ìpèsè kọ̀ọ̀kan dúró fún',
	'ct-change-graph' => 'Ìyípadà ìṣàwòrán',
	'ct-beginner' => 'Olùkọ́bẹ̀rẹ̀',
	'ct-intermediate' => 'Àrin',
	'ct-expert' => 'Awo',
	'ct-date-range' => 'Ìgbà ọjọ́',
	'ct-editing' => 'Àtúnṣe lọ́wọ́lọ́wọ́ sí:',
	'ct-anon-users' => 'Àwọn oníṣe aláìlórúkọ',
	'ct-user-contribs' => 'Àpapọ̀ iye àwọn àfikún oníṣe',
	'ct-user-span' => 'Àwọn àfikún oníṣe nígbà àsíkò',
	'ct-and' => 'àti',
	'ct-update-table' => 'Pátákó ìtúnṣe',
);

/** Cantonese (粵語)
 * @author Horacewai2
 * @author Shinjiman
 * @author Waihorace
 */
$messages['yue'] = array(
	'clicktracking' => '可用性倡議撳追蹤',
	'clicktracking-desc' => '撳追蹤，響唔使重載版嘅情況之下追蹤撳',
	'ct-title' => '聚集用戶點擊',
	'ct-event-name' => '活動名',
	'ct-expert-header' => '"專家"嘅撳數',
	'ct-intermediate-header' => '"中間者"嘅撳數',
	'ct-beginner-header' => '"初心者"嘅撳數',
	'ct-total-header' => '總計撳數',
	'ct-start-date' => '開始日期 (YYYYMMDD)',
	'ct-end-date' => '結束日期 (YYYYMMDD)',
	'ct-increment-by' => '提供數據嘅日數',
	'ct-change-graph' => '改圖像',
	'ct-beginner' => '初心者',
	'ct-intermediate' => '中間者',
	'ct-expert' => '專家',
	'ct-date-range' => '日期範圍',
	'ct-editing' => '而家編輯緊:',
	'ct-anon-users' => '匿名用戶',
	'ct-user-contribs' => '總計用戶貢獻',
	'ct-user-span' => '時段內嘅用戶貢獻',
	'ct-and' => '同',
	'ct-update-table' => '更新表格',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Bencmq
 * @author Gaoxuewei
 * @author Shinjiman
 */
$messages['zh-hans'] = array(
	'clicktracking' => 'Usability Initiative点击追踪',
	'clicktracking-desc' => '点击追踪，追踪对象为不造成页面刷新的事件',
	'ct-title' => '整合用户点击统计',
	'ct-event-name' => '事件名称',
	'ct-expert-header' => '“专家”点击数',
	'ct-intermediate-header' => '“中级”点击',
	'ct-beginner-header' => '“新手”点击数',
	'ct-total-header' => '总点击数',
	'ct-start-date' => '开始日期（年月日）',
	'ct-end-date' => '结束日期（年月日）',
	'ct-increment-by' => '每个数据点代表的天数',
	'ct-change-graph' => '更改图像',
	'ct-beginner' => '新手',
	'ct-intermediate' => '中级',
	'ct-expert' => '专家',
	'ct-date-range' => '日期范围',
	'ct-editing' => '当前编辑：',
	'ct-anon-users' => '匿名用户',
	'ct-user-contribs' => '总用户贡献',
	'ct-user-span' => '时间范围内的用户贡献',
	'ct-and' => '和',
	'ct-update-table' => '更新表格',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Gaoxuewei
 * @author Mark85296341
 * @author Shinjiman
 */
$messages['zh-hant'] = array(
	'clicktracking' => '可用性倡議點擊追蹤',
	'clicktracking-desc' => '點擊追蹤，不在重載頁面的情況中用來追蹤點擊',
	'ct-title' => '整合用戶點擊統計',
	'ct-event-name' => '事件名稱',
	'ct-expert-header' => '「專家」點擊數',
	'ct-intermediate-header' => '「中級」點擊數',
	'ct-beginner-header' => '「新手」點擊數',
	'ct-total-header' => '總點擊數',
	'ct-start-date' => '開始日期（年月日）',
	'ct-end-date' => '結束日期（年月日）',
	'ct-increment-by' => '每個數據點代表的天數',
	'ct-change-graph' => '更改圖片',
	'ct-beginner' => '新手',
	'ct-intermediate' => '中級',
	'ct-expert' => '專家',
	'ct-date-range' => '日期範圍',
	'ct-editing' => '當前編輯：',
	'ct-anon-users' => '匿名用戶',
	'ct-user-contribs' => '用戶貢獻合計',
	'ct-user-span' => '時間範圍內的用戶貢獻',
	'ct-and' => '&#32;和&#32;',
	'ct-update-table' => '更新表格',
);

