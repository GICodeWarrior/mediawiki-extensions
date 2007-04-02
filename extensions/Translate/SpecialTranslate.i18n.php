<?php
/**
 * Internationalisation file for Translate extension.
 *
 * @addtogroup Extensions
*/

$wgTranslateMessages = array();

$wgTranslateMessages['en'] = array(
	'translate' => 'Translate',
	'translate-show-label' => 'Show:',
	'translate-opt-review' => 'Review mode',
	'translate-opt-trans' => 'Untranslated only',
	'translate-opt-optional' => 'Optional',
	'translate-opt-changed' => 'Changed only',
	'translate-opt-ignored' => 'Ignored',
	'translate-opt-database' => 'In database only',
	'translate-messageclass' => 'Message class:',
	'translate-sort-label' => 'Sort:',
	'translate-sort-normal' => 'Normal',
	'translate-sort-alpha'  => 'Alphabetical',
	'translate-fetch-button' => 'Fetch',
	'translate-export-button' => 'Export',
	'translate-edit-message-format' => 'The format of this message is <b>$1</b>.',
	'translate-edit-message-in' => 'Current string in <b>$1</b> ($2):',
	'translate-edit-message-in-fb' => 'Current string in fallback language <b>$1</b> ($2):',
	'translate-choose-settings' => 'Please choose your settings. Note that fetching all core message results in huge table and over 100 KB page!',
	'translate-language'  => 'Language:',
);

$wgTranslateMessages['br'] = array(
	'translate' => 'Treiñ',
	'translate-show-label' => 'Diskouez :',
	'translate-opt-review' => 'Mod gwiriañ',
	'translate-opt-trans' => 'Didro hepken',
	'translate-opt-optional' => 'Diret',
	'translate-opt-changed' => 'Bet kemmet hepken',
	'translate-opt-ignored' => 'Dilezet',
	'translate-opt-database' => 'En diaz-titouroù hepken',
	'translate-messageclass' => 'Rumm kemennadenn',
	'translate-sort-label' => 'Seurt :',
	'translate-sort-normal' => 'Boutin',
	'translate-sort-alpha' => 'Alfabetek',
	'translate-fetch-button' => 'Klask',
	'translate-export-button' => 'Ezporzhiañ',
	'translate-edit-message-format' => 'Furmad ar gemennadenn-mañ zo <b>$1</b>.',
	'translate-edit-message-in' => 'Neudennad red e <b>$1</b> (Kemennadennoù$2.php):',
	'translate-edit-message-in-fb' => 'Neudennad red er yezh kein <b>$1</b> (Kemennadennoù$2.php):',
);

$wgTranslateMessages['ca'] = array(
	'translate'=> 'Tradueix',
	'translate-show-label'=> 'Mostra missatges:',
	'translate-opt-review'=> 'Mode de revisió',
	'translate-opt-trans'=> 'Només sense traduir',
	'translate-opt-optional'=> 'Opcionals',
	'translate-opt-changed'=> 'Només canviats',
	'translate-opt-ignored'=> 'A ignorar',
	'translate-opt-database'=> 'Només traduïts en aquesta base de dades',
	'translate-messageclass'=> 'Classe de missatge:',
	'translate-sort-label'=> 'Ordenació:',
	'translate-sort-normal'=> 'Normal',#identical but defined
	'translate-sort-alpha'=> 'Alfabètica',
	'translate-fetch-button'=> 'Recull',
	'translate-export-button'=> 'Exporta',
	'translate-edit-message-in'=> 'Cadena actual en <strong>$1</strong> (Messages$2.php):',
	'translate-edit-message-in-fb'=> 'Cadena actual en la llengua per defecte <strong>$1</strong> (Messages$2.php):',
);

// bug 8455
$wgTranslateMessages['cs'] = array(
	'translate' => 'Přeložit',
	'translate-show-label' => 'Ukázat:',
	'translate-opt-trans' => 'Jen nepřeložené',
	'translate-opt-optional' => 'volitelné',
	'translate-opt-changed' => 'jen změnené',
	'translate-opt-ignored' => 'ignorované',
	'translate-opt-database' => 'jen v databázi',
	'translate-messageclass' => 'Třída hlášení:',
	'translate-sort-label' => 'Třídění:',
	'translate-sort-normal' => 'obvyklé',
	'translate-sort-alpha'  => 'abecední',
	'translate-fetch-button' => 'Provést',
	'translate-export-button' => 'Exportovat',
	'translate-edit-message-in' => 'Současný řetězec v <b>$1</b> (Messages$2.php):',
	'translate-edit-message-in-fb' => 'Současný řetězec v záložním jazyce <b>$1</b> (Messages$2.php):',
);

/* German by Raymond */
$wgTranslateMessages['de'] = array(
	'translate'                     => 'Übersetze',
	'translate-show-label'          => 'Zeige:',
	'translate-opt-review'          => 'Überprüfungs-Modus',
	'translate-opt-trans'           => 'Nur nicht übersetzte',
	'translate-opt-optional'        => 'Optional',
	'translate-opt-changed'         => 'Nur veränderte',
	'translate-opt-ignored'         => 'ignoriert',
	'translate-opt-database'        => 'Nur in Datenbank',
	'translate-messageclass'        => 'Nachrichten-Klasse:',
	'translate-sort-label'          => 'Sortierung:',
	'translate-sort-normal'         => 'Normal',
	'translate-sort-alpha'          => 'Alphabetisch',
	'translate-fetch-button'        => 'Holen',
	'translate-export-button'       => 'Exportieren',
	'translate-edit-message-format' => 'Das Format dieser Nachricht ist <b>$1</b>.',
	'translate-edit-message-in'     => 'Aktueller Text in <b>$1</b> ($2):',
	'translate-edit-message-in-fb'  => 'Aktueller Text in der Ausweich-Sprache <b>$1</b> ($2):',
);

$wgTranslateMessages['fr'] = array(
	'translate' => 'Traduire',
	'translate-show-label' => 'Montrer :',
	'translate-opt-trans' => 'Non traduits seulement',
	'translate-opt-optional' => 'Optionel',
	'translate-opt-changed' => 'Modifiés seulement',
	'translate-opt-ignored' => 'Ignorés',
	'translate-opt-database' => 'Dans la base de données seulement',
	'translate-messageclass' => 'Classe de message :',
	'translate-sort-label' => 'Trier :',
	'translate-sort-normal' => 'Normal',
	'translate-sort-alpha'  => 'Alphabétique',
	'translate-fetch-button' => 'Obtenir',
	'translate-export-button' => 'Exporter',
	'translate-edit-message-in' => 'Chaîne actuellement dans <b>$1</b> (Messages$2.php) :',
	'translate-edit-message-in-fb' => 'Chaîne actuellement dans la langue par défaut <b>$1</b> (Messages$2.php) :',
);

$wgTranslateMessages['he'] = array(
	'translate'                     => 'תרגום',
	'translate-show-label'          => 'הצג:',
	'translate-opt-trans'           => 'רק לא מתורגמות',
	'translate-opt-optional'        => 'אופציונאליות',
	'translate-opt-changed'         => 'רק אם השתנו',
	'translate-opt-ignored'         => 'אינן לתרגום',
	'translate-opt-database'        => 'במסד הנתונים בלבד',
	'translate-messageclass'        => 'סוג ההודעה:',
	'translate-sort-label'          => 'מיון:',
	'translate-sort-normal'         => 'רגיל',
	'translate-sort-alpha'          => 'אלפביתי',
	'translate-fetch-button'        => 'קבל',
	'translate-export-button'       => 'ייצוא',
	'translate-edit-message-format' => 'המבנה של הודעה זו הוא <b>$1</b>.',
	'translate-edit-message-in'     => 'המחרוזת הנוכחית ל־<b>$1</b> ($2):',
	'translate-edit-message-in-fb'  => 'המחרוזת הנוכחית ל־<b>$1</b> בשפת הגיבוי ($2):',
);

$wgTranslateMessages['id'] = array(
	'translate' => 'Terjemahan',
	'translate-show-label' => 'Tampilkan:',
	'translate-opt-review' => 'Mode tinjauan',
	'translate-opt-trans' => 'Hanya yang tidak diterjemahkan',
	'translate-opt-optional' => 'Opsional',
	'translate-opt-changed' => 'Hanya yang berubah',
	'translate-opt-ignored' => 'Diabaikan',
	'translate-opt-database' => 'Hanya dalam basis data',
	'translate-messageclass' => 'Kelas pesan:',
	'translate-sort-label' => 'Urutan:',
	'translate-sort-normal' => 'Normal',
	'translate-sort-alpha'  => 'Alfabetis',
	'translate-fetch-button' => 'Cari',
	'translate-export-button' => 'Ekspor',
	'translate-edit-message-format' => 'Format pesan ini adalah <b>$1</b>.',
	'translate-edit-message-in' => 'Kalimat dalam <b>$1</b> (Messages$2.php):',
	'translate-edit-message-in-fb' => 'Kalimat dalam bahasa <b>$1</b> (Messages$2.php):',
	'translate-choose-settings' => 'Harap tandai pilihan Anda. Perhatikan bahwa tampilan pesan sistem inti akan menghasilkan tabel yang besar dan berukuran lebih dari 100 KB!',
	'translate-language'  => 'Bahasa:',
);

$wgTranslateMessages['it'] = array(
	'translate' => 'Traduzione',
	'translate-show-label' => 'Mostra:',
	'translate-opt-review' => 'Modalità revisione',
	'translate-opt-trans' => 'Messaggi da tradurre',
	'translate-opt-optional' => 'Messagi opzionali',
	'translate-opt-changed' => 'Messaggi modificati',
	'translate-opt-ignored' => 'Messaggi ignorati',
	'translate-opt-database' => 'Messaggi presenti nel database',
	'translate-messageclass' => 'Classe del messaggio:',
	'translate-sort-label' => 'Ordinamento:',
	'translate-sort-normal' => 'Normale',
	'translate-sort-alpha'  => 'Alfabetico',
	'translate-fetch-button' => 'Importa',
	'translate-export-button' => 'Esporta',
	'translate-edit-message-format' => 'Formato del messaggio: <b>$1</b>.',
	'translate-edit-message-in' => 'Contenuto attuale in <b>$1</b> ($2):',
	'translate-edit-message-in-fb' => 'Contenuto attuale nella lingua di riserva <b>$1</b> ($2):',
);

$wgTranslateMessages['kk-kz'] = array(
	'translate' => 'Аудару',
	'translate-show-label' => 'Көрсету:',
	'translate-opt-trans' => 'Тек аударылмағандарды',
	'translate-opt-optional' => 'Міндетті емес',
	'translate-opt-changed' => 'Тек өзгергендерді',
	'translate-opt-ignored' => 'Елемелінген',
	'translate-opt-database' => 'Тек дерекқорда',
	'translate-messageclass' => 'Хабар табы:',
	'translate-sort-label' => 'Сұрыптау:',
	'translate-sort-normal' => 'Қалыпты',
	'translate-sort-alpha'  => 'Әліппемен',
	'translate-fetch-button' => 'Келтіру',
	'translate-export-button' => 'Сыртқа беру',
	'translate-edit-message-in' => '<b>$1</b> (Messages$2.php) дегендегі ағымдағы жол:',
	'translate-edit-message-in-fb' => '<b>$1</b> (Messages$2.php) деген сүйену тіліндегі ағымдағы жол:',
);
$wgTranslateMessages['kk-tr'] = array(
	'translate' => 'Awdarw',
	'translate-show-label' => 'Körsetw:',
	'translate-opt-trans' => 'Tek awdarılmağandardı',
	'translate-opt-optional' => 'Mindetti emes',
	'translate-opt-changed' => 'Tek özgergenderdi',
	'translate-opt-ignored' => 'Elemelingen',
	'translate-opt-database' => 'Tek derekqorda',
	'translate-messageclass' => 'Xabar tabı:',
	'translate-sort-label' => 'Surıptaw:',
	'translate-sort-normal' => 'Qalıptı',
	'translate-sort-alpha'  => 'Älippemen',
	'translate-fetch-button' => 'Keltirw',
	'translate-export-button' => 'Sırtqa berw',
	'translate-edit-message-in' => '<b>$1</b> (Messages$2.php) degendegi ağımdağı jol:',
	'translate-edit-message-in-fb' => '<b>$1</b> (Messages$2.php) degen süýenw tilindegi ağımdağı jol:',
);
$wgTranslateMessages['kk-cn'] = array(
	'translate' => 'اۋدارۋ',
	'translate-show-label' => 'كٴورسەتۋ:',
	'translate-opt-trans' => 'تەك اۋدارىلماعانداردى',
	'translate-opt-optional' => 'مٴىندەتتٴى ەمەس',
	'translate-opt-changed' => 'تەك ٴوزگەرگەندەردٴى',
	'translate-opt-ignored' => 'ەلەمەلٴىنگەن',
	'translate-opt-database' => 'تەك دەرەكقوردا',
	'translate-messageclass' => 'حابار تابى:',
	'translate-sort-label' => 'سۇرىپتاۋ:',
	'translate-sort-normal' => 'قالىپتى',
	'translate-sort-alpha'  => 'ٴالٴىپپەمەن',
	'translate-fetch-button' => 'كەلتٴىرۋ',
	'translate-export-button' => 'سىرتقا بەرۋ',
	'translate-edit-message-in' => '<b>$1</b> (Messages$2.php) دەگەندەگٴى اعىمداعى جول:',
	'translate-edit-message-in-fb' => '<b>$1</b> (Messages$2.php) دەگەن سٴۇيەنۋ تٴىلٴىندەگٴى اعىمداعى جول:',
);
$wgTranslateMessages['kk'] = $wgTranslateMessages['kk-kz'];


$wgTranslateMessages['nl'] = array(
	'translate' => 'Vertalen',
	'translate-show-label' => 'Toon:',
	'translate-opt-trans' => 'Alleen onvertaalde',
	'translate-opt-optional' => 'Optineel',
	'translate-opt-changed' => 'Alleen gewijzigd',
	'translate-opt-ignored' => 'Genegeerd',
	'translate-opt-database' => 'Alleen in de database',
	'translate-messageclass' => 'Berichtklasse:',
	'translate-sort-label' => 'Sorteren:',
	'translate-sort-normal' => 'Normaal',
	'translate-sort-alpha'  => 'Alfabetisch',
	'translate-fetch-button' => 'Ophalen',
	'translate-export-button' => 'Exporteren',
	'translate-edit-message-in' => 'Huidige tekst in <b>$1</b> (Messages$2.php):',
	'translate-edit-message-in-fb' => 'Huidige tekst in alternatieve taal <b>$1</b> (Messages$2.php):',
);

$wgTranslateMessages['oc'] = array(
	'translate' => 'Revirar',
	'translate-show-label' => 'Mostrar:',

	'translate-opt-trans' => 'Non revirats solament',
	'translate-opt-optional' => 'Opcional',
	'translate-opt-changed' => 'Modificats solament',
	'translate-opt-ignored' => 'Ignorats',
	'translate-opt-database' => 'Dins la banca de donadas solament',
	'translate-messageclass' => 'Classa de messatge',
	'translate-sort-label' => 'Triar:',

	'translate-sort-alpha' => 'Alfabetic',
	'translate-fetch-button' => 'Obténer',
	'translate-export-button' => 'Exportar',
	'translate-edit-message-format' => 'Lo format d\'aqueste messatge es <b>$1</b>.',
	'translate-edit-message-in' => 'Cadena actualament dins <b>$1</b> (Messages$2.php) :',
	'translate-edit-message-in-fb' => 'Cadena actualament dins la lenga per defaut <b>$1</b> (Messages$2.php) :',
);

$wgTranslateMessages['sk'] = array(
	'translate' => 'Preložiť',
	'translate-show-label' => 'Zobraziť:',
	'translate-opt-review' => 'Režim kontroly',
	'translate-opt-trans' => 'Iba nepreložené',
	'translate-opt-optional' => 'Voliteľné',
	'translate-opt-changed' => 'Iba zmenené',
	'translate-opt-ignored' => 'Ignorované',
	'translate-opt-database' => 'Iba z databázy',
	'translate-messageclass' => 'Trieda správy:',
	'translate-sort-label' => 'Zoradiť:',
	'translate-sort-normal' => 'normálne',
	'translate-sort-alpha' => 'abecedne',
	'translate-fetch-button' => 'Priniesť',
	'translate-export-button' => 'Export',#identical but defined
	'translate-edit-message-format' => 'Formát tejto správy je <b>$1</b>.',
	'translate-edit-message-in' => 'Aktuálny reťazec v jazyku <b>$1</b> (Messages$2.php):',
	'translate-edit-message-in-fb' => 'Aktuálny reťazec v jazyku <b>$1</b>, ktorý sa použije ak správa nie je preložená (Messages$2.php):',
);

$wgTranslateMessages['sr-ec'] = array(
	'translate' => 'Превод',
	'translate-show-label' => 'Покажи:',
	'translate-opt-trans' => 'Само непреведене',
	'translate-opt-optional' => 'Опционо',
	'translate-opt-changed' => 'Само измењене',
	'translate-opt-ignored' => 'Игнорисано',
	'translate-opt-database' => 'Само у бази података',
	'translate-messageclass' => 'Класа порука:',
	'translate-sort-label' => 'Сортирање:',
	'translate-sort-normal' => 'Нормално',
	'translate-sort-alpha'  => 'По абедеци',
	'translate-fetch-button' => 'Прикупљање података',
	'translate-export-button' => 'Извоз',
	'translate-edit-message-in' => 'Тренутни стринг у <b>$1</b> (Messages$2.php):',
	'translate-edit-message-in-fb' => 'Тренутни стринг у језику <b>$1</b> (Messages$2.php):',
);

$wgTranslateMessages['sr-el'] = array(
	'translate' => 'Prevod',
	'translate-show-label' => 'Pokaži:',
	'translate-opt-trans' => 'Samo neprevedene',
	'translate-opt-optional' => 'Opciono',
	'translate-opt-changed' => 'Samo izmenjene',
	'translate-opt-ignored' => 'Ignorisano',
	'translate-opt-database' => 'Samo u bazi podataka',
	'translate-messageclass' => 'Klasa poruka:',
	'translate-sort-label' => 'Sortiranje:',
	'translate-sort-normal' => 'Normalno',
	'translate-sort-alpha'  => 'Po abedeci',
	'translate-fetch-button' => 'Prikupljanje podataka',
	'translate-export-button' => 'Izvoz',
	'translate-edit-message-in' => 'Trenutni string u <b>$1</b> (Messages$2.php):',
	'translate-edit-message-in-fb' => 'Trenutni string u jeziku <b>$1</b> (Messages$2.php):',
);

$wgTranslateMessages['sr'] = $wgTranslateMessages['sr-ec'];
$wgTranslateMessages['zh-cn'] = array(
	'translate' => '翻译',
	'translate-show-label' => '显示:',
	'translate-opt-review' => '翻看方式',
	'translate-opt-trans' => '只有未翻译的',
	'translate-opt-optional' => '可选的',
	'translate-opt-changed' => '只有更改过的',
	'translate-opt-ignored' => '已略过',
	'translate-opt-database' => '只在数据库中',
	'translate-messageclass' => '信息类别:',
	'translate-sort-label' => '排序:',
	'translate-sort-normal' => '标准',
	'translate-sort-alpha'  => '按字母排列',
	'translate-fetch-button' => '颉取',
	'translate-export-button' => '导出',
	'translate-edit-message-format' => '这句信息的格式是 <b>$1</b>。',
	'translate-edit-message-in' => '在 <b>$1</b> 的当前字串 ($2):',
	'translate-edit-message-in-fb' => '在 <b>$1</b> 于倚靠语言中的当前字串 ($2):',
);

$wgTranslateMessages['zh-tw'] = array(
	'translate' => '翻譯',
	'translate-show-label' => '顯示:',
	'translate-opt-review' => '翻看模式',
	'translate-opt-trans' => '只有未翻譯的',
	'translate-opt-optional' => '可選的',
	'translate-opt-changed' => '只有更改過的',
	'translate-opt-ignored' => '已略過',
	'translate-opt-database' => '只在資料庫中',
	'translate-messageclass' => '信息類別:',
	'translate-sort-label' => '排序:',
	'translate-sort-normal' => '標準',
	'translate-sort-alpha'  => '按字母排列',
	'translate-fetch-button' => '頡取',
	'translate-export-button' => '匯出',
	'translate-edit-message-format' => '這句信息的格式是 <b>$1</b>。',
	'translate-edit-message-in' => '在 <b>$1</b> 的現行字串 ($2):',
	'translate-edit-message-in-fb' => '在 <b>$1</b> 於倚靠語言中的現行字串 ($2):',
);

$wgTranslateMessages['zh-yue'] = array(
	'translate' => '翻譯',
	'translate-show-label' => '顯示:',
	'translate-opt-review' => '翻睇模式',
	'translate-opt-trans' => '只有未翻譯嘅',
	'translate-opt-optional' => '可選嘅',
	'translate-opt-changed' => '只有改過嘅',
	'translate-opt-ignored' => '已略過',
	'translate-opt-database' => '只響資料庫度',
	'translate-messageclass' => '信息類:',
	'translate-sort-label' => '排次序:',
	'translate-sort-normal' => '標準',
	'translate-sort-alpha'  => '按字母排',
	'translate-fetch-button' => '攞',
	'translate-export-button' => '倒出',
	'translate-edit-message-format' => '呢句信息嘅格式係 <b>$1</b>。',
	'translate-edit-message-in' => '響 <b>$1</b> 嘅現行字串 ($2):',
	'translate-edit-message-in-fb' => '響 <b>$1</b> 於倚靠語言中嘅現行字串 ($2):',
);

$wgTranslateMessages['zh-hk'] = $wgTranslateMessages['zh-tw'];
$wgTranslateMessages['zh-sg'] = $wgTranslateMessages['zh-cn'];

?>
