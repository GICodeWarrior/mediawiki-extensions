<?php

/**
 * Messages file for ProfileMonitor extension
 *
 * @addtogroup Extensions
 * @author Rob Church <rob.church@mintrasystems.com>
 */

function efProfileMonitorMessages() {
	$messages = array(

/* English (Rob Church) */
'en' => array(
'profiling' => 'Profiling data',
'profiling-process' => 'Process string:',
'profiling-wildcard' => 'Use wildcard',
'profiling-ok' => 'OK',
'profiling-data' => 'Profiling data for `$1`',
'profiling-data-process' => 'Process',
'profiling-data-count' => 'Count',
'profiling-data-time' => 'Time (all)',
'profiling-data-average' => 'Time (avg)',
'profiling-no-data' => 'No matching data found.',
),

'ar' => array(
'profiling-ok' => 'موافق',
'profiling-data-process' => 'عملية',
'profiling-data-count' => 'عداد',
'profiling-no-data' => 'لم يتم إيجاد بيانات مطابقة.',
),

'hsb' => array(
'profiling' => 'Profilowanske daty',
'profiling-process' => 'Znamjenjowy slěd předźěłać:',
'profiling-wildcard' => 'Zastupowacy symbol wužiwać',
'profiling-ok' => 'W porjadku',
'profiling-data' => 'Profilowanske daty za `$1`',
'profiling-data-process' => 'Proces',
'profiling-data-count' => 'Ličić',
'profiling-data-time' => 'Čas (dohromady)',
'profiling-data-average' => 'Čas (přerězk)',
'profiling-no-data' => 'Žane wotpowědne daty namakane.',
),

/* Indonesian (IvanLanin) */
'id' => array(
'profiling' => 'Profilisasi data',
'profiling-process' => 'Proses data:',
'profiling-wildcard' => 'Gunakan wildcard',
'profiling-ok' => 'OK',
'profiling-data' => 'Profilisasi data untuk `$1`',
'profiling-data-process' => 'Proses',
'profiling-data-count' => 'Jumlah',
'profiling-data-time' => 'Waktu (seluruhnya)',
'profiling-data-average' => 'Waktu (rata-rata)',
'profiling-no-data' => 'Tidak ditemukan data yang cocok.',
),

/* Italian (BrokenArrow) */
'it' => array(
'profiling' => 'Dati di profiling',
'profiling-process' => 'Stringa processo:',
'profiling-wildcard' => 'Usa metacaratteri',
'profiling-ok' => 'OK',
'profiling-data' => 'Dati di profiling per `$1`',
'profiling-data-process' => 'Processo',
'profiling-data-count' => 'Conteggio',
'profiling-data-time' => 'Tempo totale',
'profiling-data-average' => 'Tempo medio',
'profiling-no-data' => 'Nessun dato corrispondente.',
),

/* nld / Dutch (Siebrand Mazeland) */
'nl' => array(
'profiling' => 'Profilinggegevens',
'profiling-process' => 'Verwerk string:',
'profiling-wildcard' => 'Gebruik wildcard',
'profiling-ok' => 'OK',
'profiling-data' => 'Profilinggegevens voor `$1`',
'profiling-data-process' => 'Verwerk',
'profiling-data-count' => 'Aantal',
'profiling-data-time' => 'Tijd (tot)',
'profiling-data-average' => 'Tijd (gem)',
'profiling-no-data' => 'Geen gegevens gevonden.',
),

/* Slovak (helix84) */
'sk' => array(
'profiling' => 'Profilovacie údaje',
'profiling-process' => 'Spracovať reťazec:',
'profiling-wildcard' => 'Použiť zástupné znaky',
'profiling-ok' => 'OK',
'profiling-data' => 'Profilovacie údaje pre `$1`',
'profiling-data-process' => 'Spracovať',
'profiling-data-count' => 'Počet',
'profiling-data-time' => 'Čas (všetky)',
'profiling-data-average' => 'Čas (priemer)',
'profiling-no-data' => 'Neboli nájdené vyhovujúce údaje.',
),

/* Cantonese (Shinjiman) */
'yue' => array(
'profiling' => '檢核資料',
'profiling-process' => '處理字串:',
'profiling-wildcard' => '用萬用符',
'profiling-ok' => 'OK',
'profiling-data' => '檢核緊`$1`嘅資料',
'profiling-data-process' => '處理',
'profiling-data-count' => '數量',
'profiling-data-time' => '時間 (全部)',
'profiling-data-average' => '時間 (平均)',
'profiling-no-data' => '搵唔到對應嘅資料。',
),

/* Chinese (Simplified) (Shinjiman) */
'zh-hans' => array(
'profiling' => '检核数据',
'profiling-process' => '处理字串:',
'profiling-wildcard' => '使用通配符',
'profiling-ok' => '确定',
'profiling-data' => '正在检核`$1`的数据',
'profiling-data-process' => '处理',
'profiling-data-count' => '数量',
'profiling-data-time' => '时间 (全部)',
'profiling-data-average' => '时间 (平均)',
'profiling-no-data' => '找不到匹配的数据。',
),

/* Chinese (Traditional) (Shinjiman) */
'zh-hant' => array(
'profiling' => '檢核資料',
'profiling-process' => '處理字串:',
'profiling-wildcard' => '使用萬用字元',
'profiling-ok' => '確定',
'profiling-data' => '正在檢核`$1`的資料',
'profiling-data-process' => '處理',
'profiling-data-count' => '數量',
'profiling-data-time' => '時間 (全部)',
'profiling-data-average' => '時間 (平均)',
'profiling-no-data' => '找不到對應的資料。',
),

	);

	/* Chinese defaults, fallback to zh-hans or zh-hant */
	$messages['zh'] = $messages['zh-hans'];
	$messages['zh-cn'] = $messages['zh-hans'];
	$messages['zh-hk'] = $messages['zh-hant'];
	$messages['zh-tw'] = $messages['zh-hans'];
	$messages['zh-sg'] = $messages['zh-hant'];
	/* Cantonese default, fallback to yue */
	$messages['zh-yue'] = $messages['yue'];

	return $messages;

}




