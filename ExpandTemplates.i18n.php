<?php
/**
 * Internationalisation file for ExpandTemplates extension.
 *
 * @addtogroup Extensions
*/

$wgExpandTemplatesMessages = array();

$wgExpandTemplatesMessages['en'] = array(
	'expandtemplates'                  => 'Expand templates',
	'expand_templates_intro'           => 'This special page takes some text and expands 
all templates in it recursively. It also expands parser functions like 
<nowiki>{{</nowiki>#if:...}}, and variables like 
<nowiki>{{</nowiki>CURRENTDAY}}&mdash;in fact pretty much everything in double-braces.
It does this by calling the relevant parser stage from MediaWiki itself.',
	'expand_templates_title'           => 'Context title, for {{PAGENAME}} etc.:',
	'expand_templates_input'           => 'Input text:',
	'expand_templates_output'          => 'Result:',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Remove comments',
);
$wgExpandTemplatesMessages['cs'] = array(
	'expandtemplates'                  => 'Substituovat šablony',
	'expand_templates_intro'           => 'Pomocí této speciální stránky můžete nechat v textu substituovat všechny šablony a funkce parseru jako <code><nowiki>{{</nowiki>#if:…...}}</code> či proměnné jako <code><nowiki>{{</nowiki>CURRENTDAY}} – tzn. prakticky všechno v dvojitých složených závorkách. K tomu se používají přímo odpovídající funkce parseru MediaWiki.',
	'expand_templates_title'           => 'Název stránky kvůli kontextu pro <code>{{PAGENAME}}</code> apod.:',
	'expand_templates_input'           => 'Vstupní text:',
	'expand_templates_output'          => 'Výstup:',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Odstranit komentáře',
);
$wgExpandTemplatesMessages['de'] = array(
	'expandtemplates'                  => 'Vorlagen expandieren',
	'expand_templates_intro'           => 'In diese Spezialseite kann Text eingegeben werden und alle Vorlagen in ihr werden rekursiv expandiert. Auch Parserfunkionen wie <nowiki>{{</nowiki>#if:...}} und Variablen wie <nowiki>{{</nowiki>CURRENTDAY}} werden ausgewertet - faktisch alles was in doppelten geschweiften Klammern enthalten ist. Dies geschieht durch den Aufruf der jeweiligen Parser-Phasen in MediaWiki.',
	'expand_templates_title'           => 'Kontexttitel, für {{PAGENAME}} etc.:',
	'expand_templates_input'           => 'Eingabefeld:',
	'expand_templates_output'          => 'Ergebnis:',
	'expand_templates_ok'              => 'Ausführen',
	'expand_templates_remove_comments' => 'Kommentare entfernen',
);
$wgExpandTemplatesMessages['fi'] = array(
	'expandtemplates'                  => 'Mallineiden laajennus',
	'expand_templates_intro'           => 'Tämä toimintosivu ottaa syötteekseen tekstiä ja laajentaa kaikki mallineet rekursiivisesti sekä jäsenninfunktiot, kuten <nowiki>{{</nowiki>#if:...}}, ja -muuttujat, kuten
<nowiki>{{</nowiki>CURRENTDAY}} &mdash  toisin sanoen melkein kaiken, joka on kaksoisaaltosulkeiden sisällä.',
	'expand_templates_title'           => 'Otsikko ({{PAGENAME}} yms.):',
	'expand_templates_input'           => 'Teksti:',
	'expand_templates_output'          => 'Tulos:',
	'expand_templates_ok'              => 'Laajenna',
	'expand_templates_remove_comments' => 'Poista kommentit',
);
$wgExpandTemplatesMessages['fr'] = array(
	'expandtemplates'                  => 'Expansion des modèles',
	'expand_templates_intro'           => 'Cette page permet de tester l’expansion de modèles, 
qui sont développés recursivement. Les fonctions et les variables prédéfinies, 
telles que <nowiki>{{</nowiki>#if:...}} et <nowiki>{{</nowiki>CURRENTDAY}} sont aussi développées.',
	'expand_templates_title'           => 'Titre de l’article, utile par exemple si le modèle utilise {{PAGENAME}} :',
	'expand_templates_input'           => 'Entrez votre texte ici :',
	'expand_templates_output'          => 'Visualisez le résultat :',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Supprimer les commentaires.',
);
$wgExpandTemplatesMessages['he'] = array(
	'expandtemplates'                  => 'פריסת תבניות',
	'expand_templates_intro'           => 'דף זה מקבל כמות מסוימת של טקסט ופורס ומפרש את כל התבניות שבתוכו באופן רקורסיבי. בנוסף, הוא פורס הוראות פירוש כגון <nowiki>{{</nowiki>#תנאי:...}}, ומשתנים כגון <nowiki>{{</nowiki>יום נוכחי}}, ולמעשה בערך כל דבר בסוגריים מסולסלות כפולות. הוא עושה זאת באמצעות קריאה לפונקציות הפענוח המתאימות מתוך תוכנת מדיה־ויקי עצמה.',
	'expand_templates_title'           => 'כותרת ההקשר לפענוח, בשביל משתנים כגון {{שם הדף}} וכדומה:',
	'expand_templates_input'           => 'טקסט:',
	'expand_templates_output'          => 'תוצאה:',
	'expand_templates_ok'              => 'פרוס תבניות',
	'expand_templates_remove_comments' => 'הסר הערות',
);
$wgExpandTemplatesMessages['id'] = array(
	'expandtemplates'                  => 'Pengembangan templat',
	'expand_templates_intro'           => 'Halaman istimewa ini menerima teks dan mengembangkan semua templat di dalamnya secara rekursif. Halaman ini juga menerjemahkan semua fungsi parser seperti <nowiki>{{</nowiki>#if:...}}, dan variabel seperti <nowiki>{{</nowiki>CURRENTDAY}}&mdash;bahkan bisa dibilang segala sesuatu yang berada di antara dua tanda kurung. Ini dilakukan dengan memanggil tahapan parser yang sesuai dari MediaWiki.',
	'expand_templates_title'           => 'Judul konteks, untuk {{PAGENAME}} dll.:',
	'expand_templates_input'           => 'Teks sumber:',
	'expand_templates_output'          => 'Hasil:',
	'expand_templates_ok'              => 'Jalankan',
	'expand_templates_remove_comments' => 'Buang komentar',
);
$wgExpandTemplatesMessages['it'] = array(
	'expandtemplates'                  => 'Espansione dei template',
	'expand_templates_intro'           => 'Questa pagina speciale elabora un testo espandendo tutti i template presenti. Calcola inoltre il risultato delle funzioni supportate dal parser come <nowiki>{{</nowiki>#if:...}} e delle variabili di sistema quali <nowiki>{{</nowiki>CURRENTDAY}}, ovvero praticamente tutto ciò che si trova tra doppie parentesi graffe. Funziona richiamando le opportune funzioni del parser di MediaWiki.',
	'expand_templates_title'           => 'Contesto (per {{PAGENAME}} ecc.):',
	'expand_templates_input'           => 'Testo da espandere:',
	'expand_templates_output'          => 'Risultato:',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Ignora i commenti',
);
$wgExpandTemplatesMessages['ja'] = array(
	'expandtemplates'                  => 'テンプレートを展開',
	'expand_templates_intro'           => '入力したウィキ構文に含まれている全てのテンプレートを再帰的に展開します。
<nowiki>{{</nowiki>#if:...}} のようなパーサ関数や、<nowiki>{{</nowiki>CURRENTDAY}} のような変数など、
<nowiki>{{</nowiki> ～ }} で囲まれているものが展開されます。',
	'expand_templates_title'           => '{{PAGENAME}} 等に使用するページ名: ',
	'expand_templates_input'           => '展開するテキスト',
	'expand_templates_output'          => '展開結果',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'コメントを除去',
);
$wgExpandTemplatesMessages['kk-kz'] = array(
	'expandtemplates'                  => 'Үлгілерді ұлғайту',
	'expand_templates_intro'           => 'Осы құрал арнайы беті әлдебір мәтінді алады да,
бұның ішіндегі барлық кіріктелген үлгілерді мейлінше ұлғайтады.
Мына <nowiki>{{</nowiki>#if:...}} сияқты жөңдету функцияларын да, және <nowiki>{{</nowiki>CURRENTDAY}}
сияқты айнамалыларын да ұлғайтады (нақты айтқанда, қос қабат садақ жақшалар арасындағы барлығын).
Бұны өз MediaWiki бағдарламасынан қатысты жөңдету сатын шақырып істелінеді.',
	'expand_templates_title'           => '{{PAGENAME}} т.б. беттер үшін мәтін аралық атауы:',
	'expand_templates_input'           => 'Кіріс мәтіні:',
	'expand_templates_output'          => 'Нәтижесі:',
	'expand_templates_ok'              => 'Жарайды',
	'expand_templates_remove_comments' => 'Мәндемелерін аластатып?',
);
$wgExpandTemplatesMessages['kk-tr'] = array(
	'expandtemplates'                  => 'Ülgilerdi ulğaýtw',
	'expand_templates_intro'           => 'Osı qural arnaýı beti äldebir mätindi aladı da,
bunıñ işindegi barlıq kiriktelgen ülgilerdi meýlinşe ulğaýtadı.
Mına <nowiki>{{</nowiki>#if:...}} sïyaqtı jöñdetw fwnkcïyaların da, jäne <nowiki>{{</nowiki>CURRENTDAY}}
sïyaqtı aýnamalıların da ulğaýtadı (naqtı aýtqanda, qos qabat sadaq jaqşalar arasındağı barlığın).
Bunı öz MediaWiki bağdarlamasınan qatıstı jöñdetw satın şaqırıp istelinedi.',
	'expand_templates_title'           => '{{PAGENAME}} t.b. better üşin mätin aralıq atawı:',
	'expand_templates_input'           => 'Kiris mätini:',
	'expand_templates_output'          => 'Nätïjesi:',
	'expand_templates_ok'              => 'Jaraýdı',
	'expand_templates_remove_comments' => 'Mändemelerin alastatıp?',
);
$wgExpandTemplatesMessages['kk-cn'] = array(
	'expandtemplates'                  => 'ٴۇلگٴىلەردٴى ۇلعايتۋ',
	'expand_templates_intro'           => 'وسى قۇرال ارنايى بەتٴى ٴالدەبٴىر مٴاتٴىندٴى الادى دا,
بۇنىڭ ٴىشٴىندەگٴى بارلىق كٴىرٴىكتەلگەن ٴۇلگٴىلەردٴى مەيلٴىنشە ۇلعايتادى.
مىنا <nowiki>{{</nowiki>#if:...}} سيياقتى جٴوڭدەتۋ فۋنكتسييالارىن دا, جٴانە <nowiki>{{</nowiki>CURRENTDAY}}
سيياقتى اينامالىلارىن دا ۇلعايتادى (ناقتى ايتقاندا, قوس قابات ساداق جاقشالار اراسىنداعى بارلىعىن).
بۇنى ٴوز MediaWiki باعدارلاماسىنان قاتىستى جٴوڭدەتۋ ساتىن شاقىرىپ ٴىستەلٴىنەدٴى.',
	'expand_templates_title'           => '{{PAGENAME}} ت.ب. بەتتەر ٴۇشٴىن مٴاتٴىن ارالىق اتاۋى:',
	'expand_templates_input'           => 'كٴىرٴىس مٴاتٴىنٴى:',
	'expand_templates_output'          => 'نٴاتيجەسٴى:',
	'expand_templates_ok'              => 'جارايدى',
	'expand_templates_remove_comments' => 'مٴاندەمەلەرٴىن الاستاتىپ?',
);
$wgExpandTemplatesMessages['kk'] = $wgExpandTemplatesMessages['kk-kz'];
$wgExpandTemplatesMessages['ksh'] = array(
	'expandtemplates'                  => 'Schablone üvverpröfe',
	'expand_templates_intro'           => 'Hee kanns de en Schablon usprobeere. Do jiss ene Oprof en, un dann kriss De dä 
komplett opjelös, och all die ennedren widder opjerofe Schablone, Parameter, Funktione, speziell Name, 
un esu, bes nix mieh üvverich es, wat mer noch oplöse künnt. Wann jet en <nowiki>{{ â€¦ }} Klammere 
üvverbliet, dann wor et unbekannt. Do passeet jenau et selve wie söns em Wiki och, nor dat De hee tirek ze 
sinn kriss wat erus kütt.',
	'expand_templates_title'           => 'Dä Siggetitel, also wat för {{PAGENAME}} uew. enjeföllt weed:',
	'expand_templates_input'           => 'Wat De üvverpröfe wells:',
	'expand_templates_output'          => 'Wat erus kütt es:',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'De ennere Kommentare fottlooße',
);
$wgExpandTemplatesMessages['nl'] = array(
	'expandtemplates'                  => 'Sjablonen substitueren',
	'expand_templates_intro'           => 'Deze speciale pagina leest de ingegeven tekst in en
substitueert recursief alle sjablonen in de tekst.
Het substitueert ook alle parserfuncties zoals <nowiki>{{</nowiki>#if:...}} en
variabelen als <nowiki>{{</nowiki>CURRENTDAY}} &mdash; vrijwel alles tussen dubbele accolades.
Hiervoor worden de relevante functies van de MediaWiki-parser gebruikt.',
	'expand_templates_title'           => 'Contexttitel, voor {{PAGENAME}}, enzovoort:',
	'expand_templates_input'           => 'Inputtekst:',
	'expand_templates_output'          => 'Resultaat:',
	'expand_templates_remove_comments' => 'Verwijder opmerkingen',
);
$wgExpandTemplatesMessages['ru'] = array(
	'expandtemplates'                  => 'Развёртка шаблонов',
	'expand_templates_intro'           => 'Эта служебная страница преобразует текст, рекурсивно разворачивая все шаблоны в нём.
Также развёртке подвергаются все функции парсера (например, <nowiki>{{</nowiki>#if:...}} и переменные (<nowiki>{{</nowiki>CURRENTDAY}} и т.&nbsp;п.) — в общем, всё внутри двойных фигурных скобок.
Это производится корректным образом, с вызовом соответствующего обработчика MediaWiki.',
	'expand_templates_title'           => 'Заголовок страницы для {{PAGENAME}} и т.&nbsp;п.:',
	'expand_templates_input'           => 'Входной текст:',
	'expand_templates_output'          => 'Результат:',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Удалить комментарии',
);
$wgExpandTemplatesMessages['sk'] = array(
	'expandtemplates'                  => 'Substituovať šablóny',
	'expand_templates_intro'           => 'Táto špeciálna stránka prijme na
vstup text a rekurzívne substituuje všetky šablóny,
ktoré sú v ňom použité. Tiež expanduje funkcie parsera
ako <nowiki>{{</nowiki>#if:...}} a premenné ako
<nowiki>{{</nowiki>CURRENTDAY}}&mdash;v podstate
takmer všetko v zložených zátvorkách. Robí to pomocou
volania relevantnej fázy parsera samotného MediaWiki.',
	'expand_templates_title'           => 'Názov kontextu pre {{PAGENAME}} atď.:',
	'expand_templates_input'           => 'Vstupný text:',
	'expand_templates_output'          => 'Výsledok:',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Odstrániť komentáre',
);
$wgExpandTemplatesMessages['sr-ec'] = array(
	'expandtemplates'                  => 'Замена шаблона',
	'expand_templates_intro'           => 'Ова посебна страница узима неки текст и мења све шаблоне у њему рекурзивно. 
Такође мења функције парсера као што је <nowiki>{{</nowiki>#if:...}}, и променљиве као што је 
<nowiki>{{</nowiki>ТРЕНУТНИДАН}}&mdash;заправо практично све што се налази између витичастих заграда. 
До овога долази тако што се зове одговарајуће стање парсера из самог МедијаВикија.',
	'expand_templates_title'           => 'Назив контекста; за <nowiki>{{</nowiki>СТРАНИЦА}} итд.:',
	'expand_templates_input'           => 'Унос:',
	'expand_templates_output'          => 'Резултат:',
	'expand_templates_ok'              => 'У реду',
	'expand_templates_remove_comments' => 'Уклони коментаре',
);
$wgExpandTemplatesMessages['sr-el'] = array(
	'expandtemplates'                  => 'Zamena šablona',
	'expand_templates_intro'           => 'Ova posebna stranica uzima neki tekst i menja sve šablone u njemu rekurzivno. 
Takođe menja funkcije parsera kao što je <nowiki>{{</nowiki>#if:...}}, i promenljive kao što je 
<nowiki>{{</nowiki>TRENUTNIDAN}}&mdash;zapravo praktično sve što se nalazi između vitičastih zagrada. 
Do ovoga dolazi tako što se zove odgovarajuće stanje parsera iz samog MedijaVikija.',
	'expand_templates_title'           => 'Naziv konteksta; za <nowiki>{{</nowiki>STRANICA}} itd.:',
	'expand_templates_input'           => 'Unos:',
	'expand_templates_output'          => 'Rezultat:',
	'expand_templates_ok'              => 'U redu',
	'expand_templates_remove_comments' => 'Ukloni komentare',
);
$wgExpandTemplatesMessages['sr'] = $wgExpandTemplatesMessages['sr-ec'];
$wgExpandTemplatesMessages['zh-cn'] = array(
	'expandtemplates'                  => '展开模板',
	'expand_templates_intro'           => '本特殊页面用于将一些文字中的模板展开，包括模板中引用的模板。同时也展开解释器函数如<nowiki>{{</nowiki>#if:...}}，以及变量如<nowiki>{{</nowiki>CURRENTDAY}}&mdash;实际上，几乎所有在双括号中的内容都被展开。本特殊页面是通过调用MediaWiki的相关解释阶段的功能完成的。',
	'expand_templates_title'           => '上下文标题，用于 {{PAGENAME}} 等页面：',
	'expand_templates_input'           => '输入文字：',
	'expand_templates_output'          => '结果：',
	'expand_templates_ok'              => '确定',
	'expand_templates_remove_comments' => '移除注释',
);
$wgExpandTemplatesMessages['zh-tw'] = array(
	'expandtemplates'                  => '展開模板',
	'expand_templates_intro'           => '本特殊頁面用於將一些文字中的模版展開，包括模版中引用的模版。同時也展開解譯器函數如<nowiki>{{</nowiki>#if:...}}，以及變數如<nowiki>{{</nowiki>CURRENTDAY}}&mdash;實際上，幾乎所有在雙括弧中的內容都被展開。本特殊頁面是通過使用MediaWiki的相關解釋階段的功能完成的。',
	'expand_templates_title'           => '上下文標題，用於 {{PAGENAME}} 等頁面：',
	'expand_templates_input'           => '輸入文字：',
	'expand_templates_output'          => '結果：',
	'expand_templates_ok'              => '確定',
	'expand_templates_remove_comments' => '移除注釋',
);
$wgExpandTemplatesMessages['zh-yue'] = array(
	'expandtemplates'                  => '展開模',
	'expand_templates_intro'           => '呢個特別頁係用於將一啲文字中嘅模展開，包括響個模度引用嘅模。同時亦都展開解譯器函數好似<nowiki>{{</nowiki>#if:...}}，以及一啲變數好似<nowiki>{{</nowiki>CURRENTDAY}}&mdash;實際上，幾乎所有響雙括弧中嘅內容都會被展開。呢個特別頁係通過使用MediaWiki嘅相關解釋階段嘅功能完成嘅。',
	'expand_templates_title'           => '內容標題，用於 {{PAGENAME}} 等頁面：',
	'expand_templates_input'           => '輸入文字：',
	'expand_templates_output'          => '結果：',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => '拎走注釋',
);
$wgExpandTemplatesMessages['zh-hk'] = $wgExpandTemplatesMessages['zh-tw'];
$wgExpandTemplatesMessages['zh-sg'] = $wgExpandTemplatesMessages['zh-cn'];
?>
