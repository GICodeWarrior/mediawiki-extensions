<?php
/**
 * Internationalisation file for LinkSearch extension.
 *
 * @package MediaWiki
 * @subpackage Extensions
*/

$wgLinkSearchMessages = array();

$wgLinkSearchMessages['en'] = array(
	'linksearch'       => 'Search web links',
	'linksearch-pat'   => 'Search pattern:',
	'linksearch-ns'    => 'Namespace:',
	'linksearch-ok'    => 'Search',
	'linksearch-text'  => 'Wildcards such as "*.wikipedia.org" may be used.<br />Supported protocols: <tt>$1</tt>',
	'linksearch-line'  => '$1 linked from $2',
	'linksearch-error' => 'Wildcards may appear only at the start of the hostname.',
);
$wgLinkSearchMessages['ar'] = array(
	'linksearch-ns'    => 'النطاق:',
	'linksearch-ok'    => 'بحث',
	'linksearch-line'  => '$1 موصولة من $2',
);
$wgLinkSearchMessages['cs'] = array(
	'linksearch'       => 'Hledání externích odkazů',
	'linksearch-text'  => 'Lze používat zástupné znaky, např. „*.wikipedia.org“.',
	'linksearch-line'  => '$2 odkazuje na $1',
	'linksearch-error' => 'Zástupné znaky lze použít jen na začátku doménového jména.',
);
$wgLinkSearchMessages['de'] = array(
	'linksearch'       => 'Weblink-Suche',
	'linksearch-pat'   => 'Suchmuster:',
	'linksearch-ns'    => 'Namensraum:',
	'linksearch-ok'    => 'Suche',
	'linksearch-text'  => 'Diese Spezialseite ermöglicht die Suche nach Seiten, in denen bestimmte Weblinks enthalten sind. Dabei können Wildcards wie beispielsweise <tt>*.example.com</tt> benutzt werden.<br />Unterstützte Protokolle: <tt>$1</tt>',
	'linksearch-line'  => '$1 ist verlinkt von $2',
	'linksearch-error' => 'Wildcards können nur am Anfang der URL verwendet werden.',
);
$wgLinkSearchMessages['fi'] = array(
	'linksearch'       => 'Etsi ulkoisia linkkejä',
	'linksearch-text'  => 'Asteriskia (*) voi käyttää jokerimerkkinä, esimerkiksi ”*.wikipedia.org”.',
	'linksearch-line'  => '$1 on linkitetty sivulta $2',
	'linksearch-error' => 'Jokerimerkkiä voi käyttää ainoastaan osoitteen alussa.',
);
$wgLinkSearchMessages['fr'] = array(
	'linksearch'	   => 'Rechercher des liens internet',
	'linksearch-pat'   => 'Rechercher l’expression :',
	'linksearch-ns'    => 'Espace de noms :',
	'linksearch-ok'    => 'Rechercher',
	'linksearch-text'  => 'Cette page spéciale permet de rechercher les pages dans lesquelles un lien externe apparaît.<br />Des caractères « joker » peuvent être utilisés, par exemple <code>*.wikipedia.org</code>.',
	'linksearch-line'  => '$1 avec un lien à partir de $2',
	'linksearch-error' => 'Les caractères « joker » ne peuvent être utilisés qu’au début du nom de domaine.'
	);
$wgLinkSearchMessages['he'] = array(
	'linksearch'       => 'חיפוש קישורים חיצוניים',
	'linksearch-pat'   => 'קישור לחיפוש:',
	'linksearch-ns'    => 'מרחב שם:',
	'linksearch-ok'    => 'חיפוש',
	'linksearch-text'  => 'ניתן להשתמש בתווים כללים, לדוגמה "‎*.wikipedia.org".<br />פרוטוקולים נתמכים: <tt>$1</tt>',
	'linksearch-line'  => '$1 מקושר מהדף $2',
	'linksearch-error' => 'תווים כלליים יכולים להופיע רק בתחילת שם השרת.',
);
$wgLinkSearchMessages['hsb'] = array(
	'linksearch'       => 'Pytanje eksternych wotkazow',
	'linksearch-pat'   => 'Pytanski muster:',
	'linksearch-ns'    => 'Mjenowy rum:',
	'linksearch-ok'    => 'OK',
	'linksearch-text'  => 'Zastupniske znamjenja kaž "*.wikipedia.org" smědźa so wužiwać.<br />Podpěrowane protokole: <tt>$1</tt>',
	'linksearch-line'  => '$1 je z $2 wotkazany.',
	'linksearch-error' => 'Zastupniske znamjenja dadźa so jenož na spočatku URL wužiwać.',
);
$wgLinkSearchMessages['hu'] = array(
	'linksearch'       => 'Keresés külső hivatkozások szerint',
	'linksearch-text'  => 'A helyettesítő karaktereket is lehet használni, például "*.wikipedia.org".',
	'linksearch-line'  => '$1 hivatkozva innen: $2',
	'linksearch-error' => 'Helyettesítő karakterek csak a cím elején szerepelhetnek.',
);
$wgLinkSearchMessages['id'] = array(
	'linksearch'       => 'Pencarian pranala luar',
	'linksearch-pat'   => 'Pola pencarian:',
	'linksearch-ns'    => 'Ruang nama:',
	'linksearch-ok'    => 'Cari',
	'linksearch-text'  => 'Bentuk pencarian \'\'wildcards\'\' seperti "*.wikipedia.org" dapat digunakan.<br />Protokol yang didukung: <tt>$1</tt>',
	'linksearch-line'  => '$1 terpaut dari $2',
	'linksearch-error' => '\'\'Wildcards\'\' hanya dapat digunakan di bagian awal dari nama host.'
);
$wgLinkSearchMessages['it'] = array(
	'linksearch'       => 'Ricerca collegamenti esterni',
	'linksearch-pat'   => 'Pattern di ricerca:',
	'linksearch-ok'    => 'Cerca',
	'linksearch-text'  => 'È possibile fare uso di metacaratteri, ad es. "*.example.org".',
	'linksearch-line'  => '$1 presente nella pagina $2',
	'linksearch-error' => 'I metacaratteri possono essere usati solo all\'inizio del nome dell\'host.',
);
$wgLinkSearchMessages['ja'] = array(
	'linksearch'       => '外部リンクの検索',
	'linksearch-pat'   => '検索パターン:',
	'linksearch-ns'    => '名前空間:',
	'linksearch-ok'    => '検索',
	'linksearch-text'  => '"*.wikipedia.org" のようにワイルドカードを使うことができます。<br />対応プロトコル: <tt>$1</tt>',
	'linksearch-line'  => '$1 が $2 からリンクされています',
	'linksearch-error' => 'ワイルドカードはホスト名の先頭でのみ使用できます。',
);
$wgLinkSearchMessages['kk-kz'] = array(
	'linksearch'       => 'Еренсілтемелерін іздеу',
	'linksearch-pat'   => 'Іздеу шарты:',
	'linksearch-ns'    => 'Есім аясы:',
	'linksearch-ok'    => 'Іздеу',
	'linksearch-text'  => '«*.wikipedia.org» атауына ұқсасты бәдел нышандарды қолдануға болады. ',
	'linksearch-line'  => '$2 дегеннен $1 сілтеген',
	'linksearch-error' => 'Бәдел нышандар тек сервер жайы атауының бастауында болуы мүмкін.',
);
$wgLinkSearchMessages['kk-tr'] = array(
	'linksearch'       => 'Erensiltemelerin izdew',
	'linksearch-pat'   => 'İzdew şartı:',
	'linksearch-ns'    => 'Esim ayası:',
	'linksearch-ok'    => 'İzdew',
	'linksearch-text'  => '«*.wikipedia.org» atawına uqsastı bädel nışandardı qoldanwğa boladı. ',
	'linksearch-line'  => '$2 degennen $1 siltegen',
	'linksearch-error' => 'Bädel nışandar tek server jaýı atawınıñ bastawında bolwı mümkin.',
);
$wgLinkSearchMessages['kk-cn'] = array(
	'linksearch'       => 'ەرەنسٸلتەمەلەرٸن ٸزدەۋ',
	'linksearch-pat'   => 'ٸزدەۋ شارتى:',
	'linksearch-ns'    => 'ەسٸم اياسى:',
	'linksearch-ok'    => 'ٸزدەۋ',
	'linksearch-text'  => '«*.wikipedia.org» اتاۋىنا ۇقساستى بٵدەل نىشانداردى قولدانۋعا بولادى. ',
	'linksearch-line'  => '$2 دەگەننەن $1 سٸلتەگەن',
	'linksearch-error' => 'بٵدەل نىشاندار تەك سەرۆەر جايى اتاۋىنىڭ باستاۋىندا بولۋى مٷمكٸن.',
);
$wgLinkSearchMessages['kk'] = $wgLinkSearchMessages['kk-kz'];
$wgLinkSearchMessages['lo'] = array(
	'linksearch'       => 'ຄົ້ນຫາການເຊື່ອມຕໍ່ຫາເວັບ',
);
$wgLinkSearchMessages['nl'] = array(
	'linksearch'       => 'Zoek externe links',
	'linksearch-pat'   => 'Zoekpatroon:',
	'linksearch-ns'    => 'Naamruimte:',
	'linksearch-ok'    => 'Zoeken',
	'linksearch-text'  => 'Wildcards zoals "*.wikipedia.org" of "*.org" zijn toegestaan.',
	'linksearch-line'  => '$1 gelinkt vanaf $2',
	'linksearch-error' => 'Wildcards zijn alleen toegestaan aan het begin van een hostnaam.'
);
$wgLinkSearchMessages['pt'] = array(
	'linksearch'       => 'Procurar por links da web',
	'linksearch-pat'   => 'Padrão de procura:',
	'linksearch-ns'    => 'Espaço nominal:',
	'linksearch-ok'    => 'Pesquisar',
	'linksearch-text'  => 'É possível utilizar "caracteres mágicos" como em "*.wikipedia.org".<br />Protocolos suportados: <tt>$1</tt>',
	'linksearch-line'  => '$1 está lincado em $2',
	'linksearch-error' => '"Caracteres mágicos" (wildcards) podem ser utilizados apenas no início do endereço.',
);
// Brazillian portuguese inherits portuguese.
$wgLinkSearchMessages['pt-br'] = $wgLinkSearchMessages['pt'];

$wgLinkSearchMessages['ru'] = array(
	'linksearch'       => 'Поиск внешних ссылок',
	'linksearch-pat'   => 'Шаблон для поиска:',
	'linksearch-ns'    => 'Пространство имён:',
	'linksearch-ok'    => 'Искать',
	'linksearch-text'  => 'Можно использовать подстановочные символы, например, <code>*.wikipedia.org</code>.',
	'linksearch-line'  => 'Ссылка на $1 из $2',
	'linksearch-error' => 'Подстановочные символы могут использоваться только в начале адресов.',
);
$wgLinkSearchMessages['sk'] = array(
	'linksearch'       => 'Hľadať webové odkazy',
	'linksearch-text'  => 'Je možné použiť zástupné znaky ako "*.wikipedia.org".',
	'linksearch-line'  => 'Na $1 odkazuje $2',
	'linksearch-error' => 'Zástupné znaky je možné použiť iba na začiatku názvu domény.',
);
$wgLinkSearchMessages['sq'] = array(
	'linksearch'       => 'Kërkoni lidhje të jashtme',
	'linksearch-error' => 'Ylli mund të përdoret vetëm në fillim të emrit',
	'linksearch-ok'    => 'Kërko',
	'linksearch-pat'   => 'Motivi kërkimor:',
	'linksearch-text'  => 'Ylli zëvëndësues mund të përdoret si p.sh. "*.wikipedia.org".',
);
$wgLinkSearchMessages['sr'] = array(
	'linksearch'	   => 'Претрага интернет веза',
	'linksearch-text'  => 'Џокери као што су "*.wikipedia.org" могу да се користе.',
	'linksearch-line'  => '$1 повезана са $2',
	'linksearch-error' => 'Џокери могу да се појављују само на почетку домена.'
);
$wgLinkSearchMessages['sv'] = array(
	'linksearch'       => 'Sök webblänkar',
	'linksearch-pat'   => 'Sökmönster:',
	'linksearch-ns'    => 'Namnrymd:',
	'linksearch-ok'    => 'Sök',
	'linksearch-text'  => 'Jokertecken (wildcards) kan användas i början av domännamn, t.ex.  "*.wikipedia.org".<br />Stödda protokoll: <tt>$1</tt>',
	'linksearch-line'  => '$1 länkas från $2',
	'linksearch-error' => 'Jokertecken kan bara användas i början av domännamnet.',
);
$wgLinkSearchMessages['yue'] = array(
	'linksearch'       => '搵網頁連結',
	'linksearch-pat'   => '搵嘅形態:',
	'linksearch-ns'    => '空間名',
	'linksearch-ok'    => '搵',
	'linksearch-text'  => '可以用類似"*.wikipedia.org"嘅萬用字元。',
	'linksearch-line'  => '$1 連自 $2',
	'linksearch-error' => '萬用字元只可以響主機名嘅開頭度用。',
);
$wgLinkSearchMessages['zh-hans'] = array(
	'linksearch'       => '搜索网页链接',
	'linksearch-pat'   => '搜索网址:',
	'linksearch-ns'    => '名字空间:',
	'linksearch-ok'    => '搜索',
	'linksearch-text'  => '可以使用类似"*.wikipedia.org"的通配符。',
	'linksearch-line'  => '$1 链自 $2',
	'linksearch-error' => '通配符仅可在主机名称的开头使用。',
);
$wgLinkSearchMessages['zh-hant'] = array(
	'linksearch'       => '搜尋網頁連結',
	'linksearch-pat'   => '搜尋網址:',
	'linksearch-ns'    => '名稱空間:',
	'linksearch-ok'    => '搜尋',
	'linksearch-text'  => '可以使用類似"*.wikipedia.org"的萬用字元。',
	'linksearch-line'  => '$1 連自 $2',
	'linksearch-error' => '萬用字元僅可在主機名稱的開頭使用。',
);
$wgLinkSearchMessages['zh'] = $wgLinkSearchMessages['zh-hans'];
$wgLinkSearchMessages['zh-cn'] = $wgLinkSearchMessages['zh-hans'];
$wgLinkSearchMessages['zh-hk'] = $wgLinkSearchMessages['zh-hant'];
$wgLinkSearchMessages['zh-sg'] = $wgLinkSearchMessages['zh-hans'];
$wgLinkSearchMessages['zh-tw'] = $wgLinkSearchMessages['zh-hant'];
$wgLinkSearchMessages['zh-yue'] = $wgLinkSearchMessages['yue'];




