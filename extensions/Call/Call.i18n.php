<?php
/*
 * Internationalization file for Call Extension
 *
 * @addGroup Extension
 */

$messages = array();

$messages['en'] = array(
	'call' => 'Call',
	'call-desc' => 'Create a hyperlink to a template (or to a normal wiki page) with parameter passing.
Can be used at the browser’s command line or within wiki text.',
	'call-text' => 'The Call extension expects a wiki page and optional parameters for that page as an argument.

Example 1: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
Example 2: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
Example 3: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br />
Example 4 (Browser URL): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My Page,parm1=value1</tt>

The <i>Call extension</i> will call the given page and pass the parameters.<br />
You will see the contents of the called page and its title but its \'type\' will be that of a special page, i.e. such a page cannot be edited.<br />The contents you see may vary depending on the value of the parameters you passed.

The <i>Call extension</i> is useful to build interactive applications with MediaWiki.<br />
For an example see <a href=\'http://semeb.com/dpldemo/Template:Catlist\'>the DPL GUI</a> ..<br />
In case of problems you can try <b>Special:Call/DebuG</b>',
	'call-save' => 'The output of this call would be saved to a page called \'\'$1\'\'.',
	'call-save-success' => 'The following text has been saved to page <big>[[$1]]</big> .',
	'call-save-failed' => 'The following text has NOT been saved to page <big>[[$1]]</big> because that page already exists.',
);

/** Message documentation (Message documentation)
 * @author Purodha
 */
$messages['qqq'] = array(
	'call-desc' => 'Short description of this extension, shown on [[Special:Version]]. Do not translate or change links.',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'call' => 'Roep',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'call' => 'استدعاء',
	'call-desc' => 'ينشئ وصلة فائقة لقالب (أو لصفحة ويكي عادية) مع تمرير المحددات. يمكن استخدامها في سطر أوامر المتصفح أو خلال نص الويكي.',
	'call-text' => "امتداد الاستدعاء يتوقع صفحة ويكي ومحددات اختيارية لهذه الصفحة كمدخلات.<br /><br />
مثال 1: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
مثال 2: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
مثال 3: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br /><br />
مثال 4 (مسار متصفح): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My Page,parm1=value1</tt><br /><br />

<i>امتداد الاستدعاء</i> سيستدعي الصفحة المعطاة ويمرر المحددات.<br />سترى محتويات الصفحة المستدعاة وعنوانها ولكن 'نوعها' سيكون ذلك الخاص بصفحة خاصة،<br />أي أن صفحة مثل هذه لا يمكن تعديلها.<br />المحتويات التي تراها ربما تتغير على حسب قيمة المحددات التي مررتها.<br /><br />
<i>امتداد الاستدعاء</i> مفيد في بناء تطبيقات تفاعلية مع الميدياويكي.<br />لمثال انظر <a href='http://semeb.com/dpldemo/Template:Catlist'>DPL GUI</a> ..<br />
في حالة وجود مشكلات يمكنك محاولة <b>Special:Call/DebuG</b>",
	'call-save' => "ناتج هذا الاستدعاء سيتم حفظه في صفحة اسمها ''$1''.",
	'call-save-success' => 'النص التالي تم حفظه لصفحة <big>[[$1]]</big> .',
	'call-save-failed' => 'النص التالي لم يتم حفظه لصفحة <big>[[$1]]</big> لأن هذه الصفحة موجودة بالفعل.',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 * @author Ramsis II
 */
$messages['arz'] = array(
	'call' => 'نادى',
	'call-desc' => 'ينشئ وصلة فائقة لقالب (أو لصفحة ويكى عادية) مع تمرير المحددات. يمكن استخدامها فى سطر أوامر المتصفح أو خلال نص الويكي.',
	'call-text' => "امتداد الاستدعاء يتوقع صفحة ويكى ومحددات اختيارية لهذه الصفحة كمدخلات.<br /><br />
مثال 1: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
مثال 2: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
مثال 3: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br /><br />
مثال 4 (مسار متصفح): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My Page,parm1=value1</tt><br /><br />

<i>امتداد الاستدعاء</i> سيستدعى الصفحة المعطاة ويمرر المحددات.<br />سترى محتويات الصفحة المستدعاة وعنوانها ولكن 'نوعها' سيكون ذلك الخاص بصفحة خاصة،<br />أى أن صفحة مثل هذه لا يمكن تعديلها.<br />المحتويات التى تراها ربما تتغير على حسب قيمة المحددات التى مررتها.<br /><br />
<i>امتداد الاستدعاء</i> مفيد فى بناء تطبيقات تفاعلية مع الميدياويكي.<br />لمثال انظر <a href='http://semeb.com/dpldemo/Template:Catlist'>DPL GUI</a> ..<br />
فى حالة وجود مشكلات يمكنك محاولة <b>Special:Call/DebuG</b>",
	'call-save' => "ناتج هذا الاستدعاء سيتم حفظه فى صفحة اسمها ''$1''.",
	'call-save-success' => 'النص التالى تم حفظه لصفحة <big>[[$1]]</big> .',
	'call-save-failed' => 'النص التالى لم يتم حفظه لصفحة <big>[[$1]]</big> لأن هذه الصفحة موجودة بالفعل.',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'call' => 'Извикване',
	'call-save-success' => 'Следният текст беше съхранен на страницата <big>[[$1]]</big> .',
	'call-save-failed' => 'Следният текст НЕ БЕШЕ съхранен на страницата <big>[[$1]]</big>, тъй като тя вече съществува.',
);

/** Bengali (বাংলা)
 * @author Zaheen
 */
$messages['bn'] = array(
	'call' => 'কল',
	'call-desc' => 'প্যারামিটার পাস করে কোন টেম্পলেটের (বা সাধারণ উইকি পাতার) দিকে একটি সংযোগ সৃষ্টি করুন। ব্রাউজারের কমান্ড লাইনে কিংবা উইকি টেক্সটের ভেতরে ব্যবহার করা যাবে।',
	'call-text' => "কল এক্সটেনশনটি আর্গুমেন্ট হিসেবে কোন উইকি পাতা এবং সেই পাতার জন্য ঐচ্ছিক প্যারামিটারসমূহ প্রত্যাশা করে।<br /><br />
উদাহরণ ১: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
উদাহরণ ২: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
উদাহরণ ৩: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br /><br />
উদাহরণ ৪ (ব্রাউজার URL): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My Page,parm1=value1</tt><br /><br />

<i>কল এক্সটেনশন</i> প্রদত্ত পাতাটিকে কল করবে এবং প্যারামিটার সরবরাহ করবে।<br />আপনি কল করা পাতা ও তার শিরোনাম দেখতে পাবেন কিন্তু পাতাটির 'টাইপ' হবে বিশেষ পাতার টাইপ,<br />অর্থাৎ এই পাতাটি সম্পাদনা করা যাবে না।<br />আপনি কী বিষয়বস্তু দেখতে পাবেন তা নির্ভর করবে আপনার সরবরাহকৃত প্যারামিটারের মানগুলির উপর।<br /><br />
<i>কল এক্সটেনশন</i> মিডিয়াউইকির সাথে মিথস্ক্রিয়াশীল অ্যাপ্লিকেশন তৈরিতে কাজে লাগতে পারে। <br />উদাহরণের জন্য দেখুন <a href='http://semeb.com/dpldemo/Template:Catlist'>ডিপিএল গুই</a> ..<br />
কোন সমস্যা হলে আপনি <b>Special:Call/DebuG</b> ব্যবহার করতে পারেন",
	'call-save' => "এই কলটির আউটপুট ''$1'' নামের পাতায় সংরক্ষণ করা হবে।",
	'call-save-success' => '<big>[[$1]]</big> পাতায় নিচের টেক্সট সংরক্ষণ করা হয়েছে।',
	'call-save-failed' => '<big>[[$1]]</big> পাতায় নিচের টেক্সট সংরক্ষণ করা হয়নি, কারণ পাতাটি ইতিমধ্যেই বিদ্যমান।',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'call' => 'Galv',
	'call-desc' => 'Krouiñ a ra ur gourliamm davet ur patrom (pe ur pennad wiki boutin) en ur dremen arventennoù drezañ. Gallout a ra bezañ implijet evel linenn urzhiad adal ur merdeer pe e testenn ur wiki.',
	'call-text' => "Ezhomm en deus an astenn galv eus ur bajenn wiki hag eus an arventennoù diret eviti.<br /><br />
Skouer 1: &nbsp; <tt>[[Special:Call/Ma fatrom,parm1=value1]]</tt><br />
Skouer 2: &nbsp; <tt>[[Special:Call/Kaozeal:Ma c'haozeadenn,parm1=value1]]</tt><br />
Skouer 3: &nbsp; <tt>[[Special:Call/:Ma fajenn,parm1=value1,parm2=value2]]</tt><br /><br />
Skouer 4 (chomlec'h evit merdeer): &nbsp; <tt>http://madomani/mywiki/index.php?Special:Call/:Ma fajenn,parm1=value1</tt><br /><br />

Gervel a raio an astenn <i>Galv</i> ar bajenn merket en ur dremen an arventennoù drezi.<br />Gwelout a reot danvez ar bajenn hag an titl anezhi met 'tres' ur bajenn zibar a vo warni<br />ha n'hallo ket kemmoù bezañ degaset warni.<br />An titouroù a vo warni a vo diouzh talvoud an arventennoù bet merket ganeoc'h.<br /><br />
Emsav-kenañ eo an <i>Astenn Galv</i> evit sevel arloadoù etregwezhiat gant MediaWiki.<br />Da skouer, gwelet <a href='http://semeb.com/dpldemo/Template:Catlist'>the DPL GUI</a> ..<br />
M'ho pez kudennoù e c'hallit klask ober gant <b>Special:Call/DebuG</b>",
	'call-save' => "Gallout a rafe ar pezh zo merket gant ar galv-mañ bezañ enrollet en ur bajenn anvet ''$1''.",
	'call-save-success' => 'Enrollet eo bet an destenn da-heul war ar bajenn <big>[[$1]]</big> .',
	'call-save-failed' => "N'EO KET BET enrollet an destenn da-heul war ar bajenn <big>[[$1]]</big> rak bez'ez eus anezhi c'hoazh.",
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'call' => 'Poziv',
	'call-desc' => 'Pravi hiperlink prema šablonu (ili običnoj wiki stranici) sa datim parametrima.
Može se koristiti i putem komandne linije preglednika ili unutar wiki teksta.',
	'call-text' => "Proširenje poziva očekuje wiki stranicu i moguće parametre za tu stranicu kao arugumente.

Primjer 1: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
Primjer 2: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
Primjer 3: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br />
Primjer 4 (URL preglednika): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My Page,parm1=value1</tt>

<i>Proširenje poziva</i> će pozvati navedenu stranicu i unijeti parametre.<br />
Vi ćete vidjeti sadržaj pozvane stranice i njen naslov ali njen 'tip' će biti kao da je specijalna stranica tj. takva stranica se ne može uređivati.<br />Sadržaji koji su prikazani mogu biti različiti u zavisnosti od vrijednosti parametara koje ste naveli.

<i>Proširenje poziva</i> je korisno za pravljenje interaktivnih aplikacija sa MediaWiki.<br />Za primjer pogledajte na a href='http://semeb.com/dpldemo/Template:Catlist'>DPL GUI</a> ..<br />
U slučaju problema možete pokušati <b>Special:Call/DebuG</b>",
	'call-save' => "Izlaz ovog poziva će biti spremljen na stranicu ''$1''.",
	'call-save-success' => 'Slijedeći tekst je spremljen na stranicu <big>[[$1]]</big> .',
	'call-save-failed' => 'Slijedeći tekst NEĆE biti spremljen na stranicu <big>[[$1]]</big> jer ova stranica već postoji.',
);

/** Czech (Česky)
 * @author Matěj Grabovský
 */
$messages['cs'] = array(
	'call' => 'Call',
	'call-desc' => 'Vytvoří hyperodkaz na šablonu (nebo na běžnou wiki stránku) s odevzdáním parametrů. Je možné použít z řádku s adresou v prohlížečí nebo ve wiki textu.',
	'call-text' => "Doplněk Call očekává jako argumenty wiki stránku a volitelné parametry dané stránky.<br /><br />
Příklad 1: &nbsp; <tt>[[Special:Call/Moje šablona,parm1=value1]]</tt><br />
Příklad 2: &nbsp; <tt>[[Special:Call/Diskuse:Moje diskuse,parm1=value1]]</tt><br />
Příklad 3: &nbsp; <tt>[[Special:Call/:Moje stránka,parm1=value1,parm2=value2]]</tt><br /><br />
Příklad 4 (URL prohlížeče): &nbsp; <tt>http://mojedomena/mojewiki/index.php?Special:Call/:Moje stránka,parm1=value1</tt><br /><br />

<i>Doplněk Call</i> zavolá danbou stránku a odevzdá jí parametry.<br />
Uvidíte obsah zavolané stránky a její název, ale její 'typ' bude speciální stránka,<br />tj. takovou stránku není možné uprovat.<br />
Obsah, který uvidíte se může lišit v závislosti na parametrech, které jste odevzdali.<br /><br />
<i>Doplněk Call</i> je užitečný při budovaní interaktivních aplikací pomocí MediaWiki.<br />
Jako příklad se můžete podívat na <a href='http://semeb.com/dpldemo/Template:Catlist'>GUI DPL</a> ..<br />
V případě problémů můžete zkusit <b>Special:Call/DebuG</b>",
	'call-save' => "Výstup této stránky byl uložen do stránky s názvem ''$1''.",
	'call-save-success' => 'Následující text byl uložený do stránky <big>[[$1]]</big>',
	'call-save-failed' => "Následující text NEBYL uložený do stránky ''$1'', protože tato stránka už existuje.",
);

/** German (Deutsch)
 * @author ChrisiPK
 */
$messages['de'] = array(
	'call' => 'Parameteraufruf',
	'call-desc' => 'Erstellt einen Hyperlink zu einer Vorlage (oder zu einer normalen Seite) mit Parameterübergabe.
Kann in der Eingabeaufforderung des Browser oder im Wiki-Text verwendet werden.',
	'call-text' => "Die Parameteraufruf-Erweiterung erwartet eine Wiki-Seite und optionale Parameter für diese Seite als Argument.

Beispiel 1: &nbsp; <tt>[[{{ns:special}}:Call/Meine Vorlage,parm1=wert1]]</tt><br />
Beispiel 2: &nbsp; <tt>[[{{ns:special}}:Call/Diskussion:Meine Diskussion,parm1=wert1]]</tt><br />
Beispiel 3: &nbsp; <tt>[[{{ns:special}}:Call/:My Page,parm1=wert1,parm2=wert2]]</tt><br />
Beispiel 4 (URL im Browser): &nbsp; <tt>http://meinedomain/meinwiki/index.php?Special:Call/:My Page,parm1=wert1</tt>

Die <i>Parameteraufruf-Erweiterung</i> wird die angegebene Seite aufrufen und die Parameter übergeben.<br />
Es werden der Inhalt und der Titel der aufgerufenen Seite angezeigt, aber der Seitentyp wird der einer Spezialseite sein, daher kann so eine Seite z.B. nicht bearbeitet werden.<br />Der angezeigte Inhalt kann unterschiedlich sein, abhängig von den übergebenen Parameterwerten.

Die <i>Parameteraufruf-Erweiterung</i> ist praktisch, um interaktive Anwendungen mit MediaWiki zu erstellen.<br />
Ein Beispiel hierfür ist die <a href='http://semeb.com/dpldemo/Template:Catlist'>DPL GUI</a> ..<br />
Für Probleme gibt es <b>{{ns:special}}:Call/DebuG</b>",
	'call-save' => "Die Ausgabe dieses Aufrufs würde als Seite ''$1'' gespeichert werden.",
	'call-save-success' => 'Der folgende Text wurde auf Seite <big>[[$1]]</big> gespeichert.',
	'call-save-failed' => 'Der folgende Text wurde NICHT auf Seite <big>[[$1]]</big> gespeichert, weil diese Seite bereits existiert.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'call' => 'Zawołanje',
	'call-desc' => 'Wótkaz k pśedloze (abo k normalnemu wikjowemu bokoju) z pśepódaśim parametra napóraś.
Dajo se na pśikazowej smužce wobglědowaka abo we wikijowem teksće wužywaś.',
	'call-text' => "Rozšyrjenje Call wótcakujo wikijowy bok a opcionalne parametry za toś ten bok ako argument.

Pśikład 1: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
Pśikład 2: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
Pśikład 3: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br />
Pśikład 4: (URL we wobglědowaku): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My_Page,parm1=value1</tt>

<i>Rozšyrjenje Call</i> wuwołajo dany bok a pśepódajo parametry.<br />
Buźoš wiźeś wopśimjeśe wuwołanego boka a jogo titel, ale jogo 'typ' buźo ten wot specialnego boka, to groni, až taki bok njedajo se wobźěłaś.<br />Wopśimjeśe, kótarež wiźiš, móžo wariěrowaś, we wótwisnosći wót gódnoty parametrow, kótarež sy pśepódał.

<i>Rozšyrjenje Call</i> jo wužytne, aby twóriło interaktiwne aplikacije z MediaWiki.<br />
Glědaj na pśikład <a href='http://semeb.com/dpldemo/Template:Catlist'>DPL GUI</a> ..<br />
W paźe problemow, móžoš wopytaś <b>Special:Call/DebuG</b>",
	'call-save' => "Wudaśe toś togo zawołanja by se do boka z mjenim ''$1'' składowało.",
	'call-save-success' => 'Slědujucy tekst jo se do boka <big>[[$1]]</big> składował.',
	'call-save-failed' => 'Slědujucy tekst NJEjo se do boka <big>[[$1]]</big> składł, dokulaž ten bok južo eksistěrujo.',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'call' => 'Voki',
	'call-save' => "La eligo de ĉi tiu voko estus konservita al paĝo nomata ''$1''.",
	'call-save-success' => 'La jena teksto estis konservita al paĝo <big>[[$1]]</big> .',
	'call-save-failed' => 'La jena teksto NE estis konservita al paĝo <big>[[$1]]</big> ĉar tiu paĝo jam ekzistas.',
);

/** Finnish (Suomi)
 * @author Cimon Avaro
 * @author Crt
 * @author Ilaiho
 */
$messages['fi'] = array(
	'call' => 'Mallinekutsu',
	'call-desc' => 'Luo hyperlinkki mallineeseen (tai tavalliseen sivuun) siten, että parametrit välittyvät.
Voidaan käyttää selaimen osoiterivillä tai wikitekstin joukossa.',
	'call-text' => "Mallinekutsulaajennus hyväksyy syötteeksi wikisivun ja mahdolliset parametrit.

Esimerkki 1: &nbsp; <tt>[[Special:Call/Esimerkkimalline,parm1=arvo1]]</tt><br />
Esimerkki 2: &nbsp; <tt>[[Special:Call/Keskustelu:Esimerkkikeskustelusivu,parm1=arvo1]]</tt><br />
Esimerkki 3: &nbsp; <tt>[[Special:Call/:My Page,parm1=arvo1,parm2=arvo2]]</tt><br />
Esimerkki 4 (selaimen URL): &nbsp; <tt>http://omadomain/wiki/index.php?Special:Call/:Esimerkkisivu,parm1=arvo1</tt>

''Mallinekutsulaajennus'' kutsuu annettua sivua ja välittää parametrit.<br />
Ruudulle tulostuu kutsutun sivun otsikko ja sisältö, mutta sen tyyppi on toimintosivu, eli sitä ei voi muokata.<br />Tulostuva sisältö saattaa muuttua parametrien mukaan.

''Mallinekutsulaajennus'' soveltuu interaktiivisten toimintojen rakentamiseen MediaWiki-ohjelmiston avulla.<br />
Sillä on toteutettu esimerkiksi <a href='http://semeb.com/dpldemo/Template:Catlist'>DPL:n graafinen käyttöliittymä</a> ..<br /> <br />
Ongelmien ratkaisuun voit kokeilla sivua <b>Special:Call/DebuG</b>",
	'call-save' => "Tämän mallinekutsun tuloste tallennettaisiin sivulle ''$1''.",
	'call-save-success' => 'Tämä teksti on tallennettu sivulle <big>[[$1]]</big> .',
	'call-save-failed' => 'Seuraavaa tekstiä EI tallennettu sivulle <big>[[$1]]</big>, sillä sivu on jo olemassa.',
);

/** French (Français)
 * @author Grondin
 * @author IAlex
 * @author Urhixidur
 */
$messages['fr'] = array(
	'call' => 'Appel',
	'call-desc' => 'Crée un lien hypertexte vers un modèle ou une page wiki normal tout en passant des paramètres. Elle peut être utilisée en ligne de commande depuis un navigateur ou à travers un texte wiki.',
	'call-text' => "L’extension Appel a besoin d’une page wiki et des paramètres facultatifs pour cette dernière comme argument.<br /><br />
Exemple 1: &nbsp; <tt>[[Special:Call/Mon modèle,parm1=value1]]</tt><br />
Exemple 2: &nbsp; <tt>[[Special:Call/Discussion:Ma discussion,parm1=value1]]</tt><br />
Exemple 3: &nbsp; <tt>[[Special:Call/:Ma page,parm1=value1,parm2=value2]]</tt><br /><br />
Exemple 4 (Adresse pour navigateur) : &nbsp; <tt>http://mondomaine/monwiki/index.php?Special:Call/:Ma_Page,parm1=value1</tt><br /><br />

L’extension <i>Appel</i> appellera la page indiquée en lui passant les paramètres.<br />Vous verrez les informations de cette page, son titre, mais son « type » sera celui d’une page spéciale qui ne pourra pas être éditée.<br />Les informations que vous verrez varieront en fonction des paramètres que vous aurez indiqués.<br />Cette extension est très pratique pour créer des applications interactives avec MediaWiki.<br />À titre d’exemple, voyez <a href='http://semeb.com/dpldemo/Template:Catlist'>the DPL GUI</a> ..<br />En cas de problèmes, vous pouvez essayer <b>Special:Call/DebuG</b>",
	'call-save' => "Ce qui est indiqué par cet appel pourrait être sauvé vers une page intitulée ''$1''.",
	'call-save-success' => 'Le texte suivant a été sauvegardé vers la page <big>[[$1]]</big> .',
	'call-save-failed' => 'Le texte suivant n’a pu être sauvergardé vers la page <big>[[$1]]</big> du fait qu’elle existe déjà.',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 * @author Xosé
 */
$messages['gl'] = array(
	'call' => 'Chamada',
	'call-desc' => 'Crear unha ligazón cara a un modelo (ou cara a unha páxina normal dun wiki) con pasaxe de parámetros.
Pode ser usado na liña de comandos do navegador ou dentro do texto dun wiki.',
	'call-text' => "A extensión Call agarda unha páxina dun wiki e parámetros opcionais para esa páxina como argumentos.

Exemplo 1: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
Exemplo 2: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
Exemplo 3: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br />
Exemplo 4 (URL do navegador): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My Page,parm1=value1</tt>

A <i>extensión Call</i> chamará á páxina dada e pasaralle os parámetros.<br />
Poderá ver os contidos da páxina chamada e o seu título, pero o seu 'tipo' será o dunha páxina especial, isto é, a devandita páxina non poderá ser editada.<br />Os contidos que ve poden variar dependendo do valor dos parámetros que pasou.

A <i>extensión Call</i> é útil para construír aplicacións interactivas con MediaWiki.<br />
Para ver un exemplo, visite <a href='http://semeb.com/dpldemo/Template:Catlist'>o DPL GUI</a>...<br />
En caso de que haxa algún problema pode probar con <b>Special:Call/DebuG</b>",
	'call-save' => "A saída desta chamada gardaríase nunha páxina chamada ''$1''.",
	'call-save-success' => 'O texto seguinte gardouse na páxina <big>[[$1]]</big>.',
	'call-save-failed' => 'O texto seguinte NON se gardou na páxina <big>[[$1]]</big> porque xa existe esa páxina.',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'call' => 'Καλεῖν',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'call' => 'Parameterufruef',
	'call-desc' => 'Leit e Hypergleich aa zuen ere Vorlag (oder zuen ere normale Syte) mit Parameteribergab.
Cha in dr Yygabufforderig vum Browser oder im Wiki-Täxt bruucht wäre.',
	'call-text' => "D Parameterufruef-Erwyterig bruucht e Wiki-Syte un optionali Parameter fir die Syte as Argumänt.

Byyspil 1: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
Byyspil 2: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
Byyspil 3: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br />
Byyspil 4:(Browser URL): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My Page,parm1=value1</tt>

D <i>Parameterufruef-Erwyterig</i> rieft die Syte uf, wu aagee isch, un ibergit d Parameter.<br />
Dr Inhalt un dr Titel vu dr ufgruefene Syte wäre aazeigt, aber dr Sytetyp isch dää vun ere Spezialsyte, wäge däm cha eso ne Syte z. B. bearbeitet wäre.<br />Dr aazeigt Inhalt cha unterschidlig syy, abhängig vu dr Parameterwärt, wu ibergee wäre.

D <i>Parameterufruef-Erwyterig</i> isch praktisch go interaktivi Aawändige mit MediaWiki aazlege.<br />
E Byyspil dodefir isch d <a href='http://semeb.com/dpldemo/Template:Catlist'>DPL GUI</a> ..<br />
Fir Probläm git s <b>{{ns:special}}:Call/DebuG</b>",
	'call-save' => "D Uusgab vu däm Ufruef tet as Syte ''$1'' gspycheret wäre.",
	'call-save-success' => 'Dää Täxt isch uf dr Syte <big>[[$1]]</big> gspycheret wore.',
	'call-save-failed' => 'Dää Täxt ischt NIT uf dr Syte <big>[[$1]]</big> gspycheret wore, wel s die Syte scho git.',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 */
$messages['hi'] = array(
	'call' => 'कॉल',
	'call-desc' => 'एक टेम्प्लेटसे (या साधारण विकिपन्ने से) जुडने वाली और कुछ पॅरॅमीटरके मिलने के बाद ही इस्तेमाल में आने वाली कड़ी बनायें।
यह कड़ी ब्राउज़रके कमांड लाईनमें अथवा विकिसंज्ञाओं द्वारा इस्तेमाल की जा सकती हैं।',
	'call-text' => "कॉल एक्स्टेंशन के लिये एक विकि पृष्ठ और उसके अन्य पॅरॅमीटर अर्ग्युमेंटमें दिये हुए होने आवश्यक हैं।<br /><br />
उदाहरण १: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
उदाहरण २: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
उदाहरण ३: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br /><br />
उदाहरण ४ (ब्राउझर URL): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My Page,parm1=value1</tt><br /><br />

<i>कॉल क्रिया</i> उस विशिष्ट पृष्ठ को मंगाकर दिये हुए पॅरॅमीटर्स जाँच लेगी।<br />आप उस पन्नेका शीर्षक तथा पाठ देख सकतें हैं पर उसका 'प्रकार' विशेष पॄष्ठ ही रहेगा,<br />मतलब उसे आप बदल नहीं सकतें हैं।<br />आपको दिखने वाला पाठ जितने पॅरॅमीटर्स मिलेंगे उसके हिसाब से बदल सकता हैं।<br /><br />
<i>कॉल क्रिया</i> यह मीडियाविकीको संलग्न ऍप्लीकेशन लिखनेके लिये उपयुक्त हैं।<br />उदाहरणके लिये देखें <a href='http://semeb.com/dpldemo/Template:Catlist'>डीपीएल जीयूआय</a> ..<br />
कोई भी समस्या आने पर आप <b>Special:Call/DebuG</b> का इस्तेमाल करके देख सकतें हैं।",
	'call-save' => "इस कॉलका आउटपुट ''$1'' नाम के पन्नेपर दर्ज किया जायेगा।",
	'call-save-success' => 'नीचे दिया हुआ पाठ <big>[[$1]]</big> नामके पन्नेपर दर्ज किया गया हैं।',
	'call-save-failed' => 'नीचे का पाठ <big>[[$1]]</big> इस पन्ने पर संजोया नहीं गया हैं, क्योंकि यह पन्ना पहले से अस्तित्वमें हैं।',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'call' => 'Wołać',
	'call-desc' => 'Wotkaz k předłoze (abo k normalnej wikijowej stronje) z přepodaću parametrow wutworić. Da so w přikazowej lince wobhladowaka abo znutřka wikijoweho teksta wužiwać.',
	'call-text' => "Rozšěrjenja Call wočakuje wiki-stronu a opcionalne parametry za tutu stronu jako argument.<br /><br />
Přikład 1: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
Přikład 2: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
Přikład 3: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br /><br />
Přikład 4 (URL wobhladowaka): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My Page,parm1=value1</tt><br /><br />

<i>Rozšěrjenje Call</i> budźe datu stronu podać a parametry přepodać.<br />Budźeš wobsah zwołaneje strony a jeje titul widźeć, ale jeje 'typ' budźe tón specialneje strony, <br />t.r. tajka strona njeda so wobdźěłować.<br />Wobsah, kotryž widźiš, móže, wotwisujo wot hódnoty parametrow, kotruž sy přepodał, wariěrować.<br /><br />
<i>Rozšěrjenje Call</i> je wužitne, zo bychu so interaktiwne aplikacije z MediaWiki tworili.<br /> Za přikład hlej <a href='http://semeb.com/dpldemo/Template:Catlist'>DPL GUI</a> ..<br /> W padźe problemow móžeš <b>Special:Call/DebuG</b> spytać.",
	'call-save' => "Wudaće tutoho zwołanja by so na stronu z mjenom ''$1'' składowało.",
	'call-save-success' => 'Slědowacy tekst bu na stronu <big>[[$1]]</big> składował.',
	'call-save-failed' => 'Slědowacy tekst NJEje so na stronu <big>[[$1]]</big> składował, dokelž ta strona hižo eksistuje.',
);

/** Hungarian (Magyar)
 * @author Dani
 */
$messages['hu'] = array(
	'call' => 'Hívás',
	'call-desc' => 'Lehetővé teszi sablon (vagy egy normális wiki lap) meghívását paraméterátadással.
Használható a böngésző címsorából, vagy a wikiszövegben is.',
	'call-text' => "A kiegészítőnek meg kell adni egy wiki oldalt és kiegészítő paramétereket ahhoz az oldalhoz.<br /><br />
1. példa: &nbsp; <tt>[[Special:Call/Sablon neve,parm1=érték1]]</tt><br />
2. példa: &nbsp; <tt>[[Special:Call/Vita:Vitalapom,parm1=érték1]]</tt><br />
3. példa: &nbsp; <tt>[[Special:Call/:Az én lapom,parm1=érték1,parm2=érték2]]</tt><br /><br />
4. példa (URL a böngészőben): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:Az én lapom,parm1=érték1</tt><br /><br />

A kiegészítő meghívja az adott oldalt, és átadja neki a megadott paramétereket.<br />Láthatod a lap tartalmát, és a címét is, de a 'típusa' speciális lap lesz,<br />amit nem lehet szerkeszteni.<br />A lap tartalma változhat az általad megadott paraméterektől függően.<br /><br />
Hasznos lehet interaktív alkalmazások építésére a MediaWikivel.<br />Példának lásd <a href='http://semeb.com/dpldemo/Template:Catlist'>a DPL GUI</a>-t.<br />
Probléma esetén megpróbálhatod a <b>Special:Call/DebuG</b> használatát",
	'call-save' => "A hívás kimenetét el lehet menteni egy ''$1'' nevű lapra.",
	'call-save-success' => 'A következő szöveg el lett mentve <big>[[$1]]</big> néven.',
	'call-save-failed' => 'A következő szöveg NEM lett elmentve, mert már létezik <big>[[$1]]</big> nevű lap.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'call' => 'Appello',
	'call-desc' => 'Crea un ligamine verso un patrono (o verso un pagina wiki normal) con passage de parametros.
Pote esser usate in le linea de commandos del navigator o in texto wiki.',
	'call-text' => "Le extension Appello expecta un pagina wiki al qual pote eser passate parametros.

Exemplo 1: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
Exemplo 2: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
Exemplo 3: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br />
Exemplo 4 (adresse URL): &nbsp; <tt>http://midominio/miwiki/index.php?Special:Call/:Mi_pagina,parm1=valor1</tt>

Le <i>extension Appello</i> appellara le pagina date e passara le parametros.<br />
Tu videra le contento del pagina appellate e su titulo, ma su 'typo' essera de un pagina special, i.e. un tal pagina non pote esser modificate.<br />Le contento que tu vide pote variar dependente del valores del parametros que tu passa.

Le <i>extension Appello</i> es utile pro construer applicationes interactive con MediaWiki.<br />
Pro un exemplo, vide <a href='http://semeb.com/dpldemo/Template:Catlist'>le interfacie de usator graphic de DPL</a> ..<br />
In caso de problemas, tu pote probar <b>Special:Call/DebuG</b>",
	'call-save' => "Le output de iste appello se immagazinarea in un pagina con titulo ''$1''.",
	'call-save-success' => 'Le sequente texto ha essite immagazinate in le pagina <big>[[$1]]</big> .',
	'call-save-failed' => 'Le sequente texto NON ha essite immagazinate in le pagina <big>[[$1]]</big> proque iste pagina existe ja.',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fryed-peach
 * @author JtFuruhata
 */
$messages['ja'] = array(
	'call' => 'ページ呼び出し',
	'call-desc' => 'テンプレート（または普通のウィキページ）にパラメータを渡すハイパーリンクを作成する。ブラウザのアドレス欄やウィキテキスト内部で利用可能',
	'call-text' => "ページ呼び出し拡張機能は、あるウィキページに、そのページが取る引数であるオプションパラメータが設定されていることを想定しています。

例1: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
例2: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
例3: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br />
例4 (ブラウザURL): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:MyPage,parm1=value1</tt>

<i>ページ呼び出しエクステンション</i> は、与えられたページをパラメータ付きで呼び出します。<br />あなたは呼び出されたページ内容とページ名を見ることはできますが、ページの「タイプ」は特別ページとなり、<br />つまりそのページを編集することはできません。<br />ページ内容は指定したパラメータによって変化します。

<i>ページ呼び出しエクステンション</i> は、MediaWiki 上で対話的なアプリケーションを構築するのに便利です。<br /><a href='http://semeb.com/dpldemo/Template:Catlist'>DPL GUI</a>を参考にしてください。<br />
問題が発生した場合は、<b>Special:Call/DebuG</b> をお試しください。",
	'call-save' => "このページ呼び出し結果は、ページ ''$1'' として保存されます。",
	'call-save-success' => '以下のテキストが、ページ <big>[[$1]]</big> として保存されました。',
	'call-save-failed' => "以下のテキストは、既に同名のページが存在するため、ページ <big>[[$1]]</big> として'''保存されませんでした'''。",
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 */
$messages['jv'] = array(
	'call' => 'Celuk',
	'call-desc' => 'Nggawé pranala menyang sawijining cithakan (utawa kaca wiki biasa) nganggo paramèter.
Bisa dienggo ing baris paréntah panjlajah utawa sajroning tèks wiki.',
	'call-save' => "Kasil panyelukan iki bakal disimpen ing sawijining kaca sing diarani ''$1''.",
	'call-save-success' => 'Tèks sing kapacak ing ngisor iki wis disimpen ing kaca <big>[[$1]]</big> .',
	'call-save-failed' => 'Tèks ing ngisor iki ORA disimpen ing kaca <big>[[$1]]</big> amerga kaca iku wis ana.',
);

/** Khmer (ភាសាខ្មែរ)
 * @author T-Rithy
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'call' => 'ហៅ',
	'call-save-success' => 'អត្ថបទដូចតទៅនេះត្រូវបានរក្សាទុកទៅក្នុងទំព័រ <big>[[$1]]</big>។',
	'call-save-failed' => 'អត្ថបទដូចតទៅនេះមិនត្រូវបានរក្សាទុកទៅក្នុងទំព័រ <big>[[$1]]</big> ពីព្រោះទំព័រនោះមានរួចហើយ។',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'call' => 'Call',
	'call-desc' => 'Kann ene Link op en Schabloon udder och jeede Sigg em Wiki maache, un derbei Parrametere övverjävve. Kam_mer em Brauser un em Wiki-Täx bruche.',
	'call-text' => 'Dä „<i lang="en">Call</i>“ Zosatz zor Wiki-Sofwäer bruch en Sigg em Wiki un, wann et paß, och en Leß met Parameetere.

Beispell 1: &nbsp; <tt>[[Special:Call/Ming Schablon,parm1=wäät1]]</tt><br />
Beispell 2: &nbsp; <tt>[[Special:Call/Talk:Minge Klaaf,parm1=wäät1]]</tt><br />
Beispell 3: &nbsp; <tt>[[Special:Call/:Ming Sigg,parm1=wäät1,parm2=wäät2]]</tt><br />
Beispell 4 (Brauser URL): &nbsp; <tt>http://mingdomain/mingwiki/index.php?Special:Call/:Ming_Sigg,parm1=wäät1</tt>

„<i lang="en">Call</i>“ weed dė aanjejovve Sigg oprohfe, un de Parammeetere dobei wigger jevve, wann welsche doh sin.<br />
Dann süühs De dä Ennhald fun dä Sigg, un dä ier Övverschreff, ävver dä Tüp fun dä Sigg es wi bei en Söndersigg, dat es, De kanns do nit draan ändere.<br />
Wat mer süüht maach ongerscheedlesch sinn, je noh dämm, wat för en Parrammeetere mer do wigger jejovve hät.

„<i lang="en">Call</i>“ hellef, öm Aanwendunge met MediaWiki opzeboue, woh de Minsche dren enjriife künne, ohne projrammeere ze möße.<br />
För e Beispell för esu jät, loor Der <a href=\'http://semeb.com/dpldemo/Template:Catlist\'>et DPL GUI</a> aan.<br />
Wann de Probleme häß, versooch et enß met <b>[[Special:Call/DebuG]]</b>.',
	'call-save' => 'Wat bei dämm Oprohf eruß köhm, wööd als de Sigg „$1“ afjeshpeischert.',
	'call-save-success' => 'Dä Täx hee noh wood als de Sigg </big>[[$1]]</big> afjeshpeischert.',
	'call-save-failed' => "Dä Täx hee noh eß '''nit''' als de Sigg </big>[[$1]]</big> afjeshpeischert woode. Di Sigg jidd et nämlejj ald.",
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'call' => 'Opruff',
	'call-desc' => 'Mecht een Hyperlink op eng Schabloun (oder eng normal wiki-Säit) mat der Benotzung vu Parameteren. Kann an der Kommandozeil vum Browser oder am Wiki-Text benotzt ginn.',
	'call-save' => "D'Resultat vun dësem Opruff géif op der Säit '''$1''' gespäichert ginn.",
	'call-save-success' => 'Dësen Text gouf op der Säit <big>[[$1]]</big> gespäichert.',
	'call-save-failed' => 'Dësen Text konnt NET op der Säit <big>[[$1]]</big> ofgespäichert ginn, well et dës Säit scho gëtt.',
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 */
$messages['li'] = array(
	'call' => 'Kalle',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'call' => 'വിളിക്കുക',
	'call-save-success' => 'താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്ന ടെക്സ്റ്റ് <big>[[$1]]</big> എന്ന താളിലേക്ക് സേവ് ചെയ്തിരിക്കുന്നു.',
	'call-save-failed' => 'താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്ന ടെക്സ്റ്റ് <big>[[$1]]</big> എന്ന താള്‍ മുന്‍പേ നിലവിലുള്ളതിനാല്‍ സേവ് ചെയ്യുന്നതിനു സാധിച്ചില്ല.',
);

/** Marathi (मराठी)
 * @author Kaustubh
 */
$messages['mr'] = array(
	'call' => 'बोलवा (मागवा)',
	'call-desc' => 'एखाद्या साचा (अथवा पानाशी) जोडणारा व काही पॅरॅमीटर जुळल्यानंतरच वापरता येणारा दुवा तयार करते. हा दुवा ब्राउझरच्या कमांड लाईन अथवा विकि संज्ञांच्या माध्यमातून वापरता येतो.',
	'call-text' => "कॉल ही क्रिया करण्यासाठी एक विकि पान व त्याचे इतर पॅरॅमीटर अर्ग्युमेंटमध्ये दिलेले असणे
आवश्यक आहे.<br /><br />
उदाहरण १: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
उदाहरण २: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
उदाहरण ३: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br /><br />
उदाहरण ४ (ब्राउझर URL): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My Page,parm1=value1</tt><br /><br />

<i>कॉल क्रिया</i> ते विशिष्ट पान मागवून दिलेले पॅरॅमीटर्स तपासून पाहील.<br />तुम्ही त्या पानाचे शीर्षक तसेच मजकूर पाहू शकता पण त्याचा 'प्रकार' विशेष पान असा राहील,,<br />म्हणजेच ते पान संपादित करता येणार नाही.<br />तुम्हाला दिसत असलेला मजकूर किती पॅरॅमीटर्स जुळले त्याप्रमाणे बदलू शकतो.<br /><br />
<i>कॉल क्रिया</i> ही मीडियाविकीशी संलग्न असणारी ऍप्लीकेशन लिहिण्यासाठी उपयुक्त आहे..<br />उदाहरणासाठी पहा <a href='http://semeb.com/dpldemo/Template:Catlist'>डीपीएल जीयूआय</a> ..<br />
काही अडचणी आल्यास आल्यास तुम्ही <b>Special:Call/DebuG</b> वापरून पाहू शकता",
	'call-save' => "या कॉल क्रियेचा निकाल ''$1'' या नावाच्या पानावर नोंदला जाईल.",
	'call-save-success' => 'खालील मजकूर <big>[[$1]]</big> या पानावर जतन केलेला आहे.',
	'call-save-failed' => 'खालील मजकूर <big>[[$1]]</big> या पानावर जतन केलेला नाही, कारण ते पान अगोदरच अस्तित्वात आहे.',
);

/** Malay (Bahasa Melayu)
 * @author Kurniasan
 */
$messages['ms'] = array(
	'call' => 'Panggil',
	'call-desc' => 'Membuat hiperpautan ke templat (atau ke laman wiki biasa) melalui penguluran parameter.
Boleh digunakan di baris perintah penyemak imbas atau di dalam teks wiki.',
	'call-save' => "Keluaran bagi panggilan ini akan disimpan di laman ''$1''.",
	'call-save-success' => 'Teks berikut telah disimpan di laman <big>[[$1]]</big> .',
	'call-save-failed' => 'Teks berikut TIDAK disimpan di laman <big>[[$1]]</big> kerana laman tersebut telah pun wujud.',
);

/** Maltese (Malti)
 * @author Chrisportelli
 */
$messages['mt'] = array(
	'call-save-success' => 'Dan it-test segwenti kien salvat fuq il-paġna <big>[[$1]]</big>.',
	'call-save-failed' => 'Dan it-test segwenti ma ġiex salvat fuq il-paġna <big>[[$1]]</big> minħabba li din il-paġna diġà teżisti.',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'call' => 'Aanroepen',
	'call-desc' => 'Maak een hyperlink naar een sjabloon (of naar een normale wikipagina) met gebruik van parameters.
Kan gebruikt worden in de adresregel van de browser of in wikitekst.',
	'call-text' => "De uitbreiding Aanroepen (Call) verwacht een wikipagina en optioneel parameters voor die pagina.

Voorbeeld 1: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
Voorbeeld 2: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
Voorbeeld 3: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br /><br />
Voorbeeld 4 (Browser URL): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My Page,parm1=value1</tt>

De <i>uitbreiding Aanroepen</i> roept de opgegeven pagina aan en geeft de parameters door.<br />
U krijgt de inhoud van de aangeroepen pagina te zien en de naam, maar deze is van het 'type' speciale pagina, dat wil zeggen dat de pagina niet bewerkt kan worden.<br />
De inhoud die u te zien krijgt kan verschillen, afhankelijk van de parameters die u hebt meegegeven.

De <i>uitbreiding Aanroepen</i> kan behulpzaam zijn bij het bouwen van interactieve applicaties met MediaWiki.
De <a href='http://semeb.com/dpldemo/Template:Catlist'>DPL GUI</a> is daar een voorbeeld van.<br />
Bij problemen kunt u gebruik maken van <b>Special:Call/DebuG</b>",
	'call-save' => "De uitvoer van deze aanroep zou opgeslagen zijn in de pagina ''$1''.",
	'call-save-success' => 'De volgende tekst is opgeslagen in pagina <big>[[$1]]</big>.',
	'call-save-failed' => 'De volgende tekst is NIET opgeslagen in pagina <big>[[$1]]</big> omdat die pagina al bestaat.',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Harald Khan
 */
$messages['nn'] = array(
	'call' => 'Kall opp',
	'call-desc' => 'Gjer det mogleg å oppretta lenkjer til malar (eller vanlige wikisider) med oppgjevne parametrar. Lenkjene kan bli brukte i adressefeltet til nettlesaren eller i wikitekst.',
	'call-text' => 'Utvidinga Kall opp (Call) forventar at ei wikisida og valfrie parametrar for sida blir oppgjevne som eit argument.<br /><br />
Døme 1: &nbsp; <tt>[[Special:Call/Malen min,parm1=verdi1]]</tt><br />
Døme 2: &nbsp; <tt>[[Special:Call/Talk:Diskusjonssida mi,parm1=verdi1]]</tt><br /><br />
Døme 3: &nbsp; <tt>[[Special:Call/:Sida mi,parm1=verdi1,parm2=verdi2]]</tt><br /><br />
Døme 4 (URL for adressefeltet): &nbsp; <tt>http://mittdomene/minwiki/index.php?Special:Call/:Mi_sida,parm1=verdi1</tt><br /><br />

<i>Kall opp</i>-tillegget kallar opp den oppgjevne sida og sender med parametrane.<br />Du kjem til å sjå sida som er kalla opp sitt innhald og tittel, men sida som blir vist er ei spesialsida og kan difor ikkje bli redigert.<br />
Innhaldet som blir vist kan variera avhengig av verdiane til dei parametrane som som blir sendte med.<br /><br />
Tillegget <i>Kall opp</i> kan bli brukt for å skapa interaktive applikasjonar med MediaWiki.<br />
Sjå til dømes <a href="http://semeb.com/dpldemo/Template:Catlist">grensesnittet for DPL</a><br />
Om du har problem, kan du prøva <b>Special:Call/DebuG</b>.',
	'call-save' => "Resultatet av denne oppkallinga ville blitt lagra på ei sida med namnet ''$1''.",
	'call-save-success' => 'Følgjande tekst har blitt lagra på sida <big>[[$1]]</big>.',
	'call-save-failed' => 'Følgjande tekst har IKKJE blitt lagra på sida <big>[[$1]]</big> av di sida allereie finst.',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'call' => 'Kall opp',
	'call-desc' => 'Gir mulighet til å skape linker til maler (eller vanlige wikisider) med angitte parametre. Lenkene kan brukes i nettleserens adressefelt eller i wikitekst.',
	'call-text' => 'Utvidelsen Kall opp (Call) forventer seg at en wikiside og valgfrie parametere for den siden angis som et argument.<br /><br />
Eksempel 1: &nbsp; <tt>[[Special:Call/Min mal,parm1=verdi1]]</tt><br />
Eksempel 2: &nbsp; <tt>[[Special:Call/Talk:Min diskusjonsside,parm1=verdi1]]</tt><br /><br />
Eksempel 3: &nbsp; <tt>[[Special:Call/:Min side,parm1=verdi1,parm2=verdi2]]</tt><br /><br />
Eksempel 4 (URL for adressefeltet): &nbsp; <tt>http://mittdomene/minwiki/index.php?Special:Call/:Min_side,parm1=verdi1</tt><br /><br />

<i>Kall opp</i>-tillegget anroper den angitte siden og sender med parameterne.<br />Du kommer til å se den anropte sidens innhold og tittel, men siden som vises er en spesialside og kan derfor ikke redigeres.<br />
Innholdet som vises kan variere avhengig av verdiene til de parameterne som sendes med.<br /><br />
Tillegget <i>Kall opp</i> kan brukes for å skape interaktive applikasjoner med MediaWiki.<br />
Se for eksempel <a href="http://semeb.com/dpldemo/Template:Catlist">grensesnittet for DPL</a><br />
Om du har noen problemer kan du prøve <b>Special:Call/DebuG</b>.',
	'call-save' => "Resultatet av denne oppkallingen ville blitt lagret på en side ved navn ''$1''.",
	'call-save-success' => 'Følgende tekst har blitt lagret på siden <big>[[$1]]</big>.',
	'call-save-failed' => 'Følgende tekst har IKKE blitt lagret på siden <big>[[$1]]</big> fordi siden allerede finnes.',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'call' => 'Ampèl',
	'call-desc' => 'Crèa un ligam ipertèxt vèrs un modèl o un article wiki normals tot i passant de paramètres. Pòt èsser utilizada en linha de comanda dempuèi un navigador o a travèrs un tèxt wiki.',
	'call-text' => "L’extension Ampèl a besonh d’una pagina wiki e de paramètres facultatius per aquesta darrièra.<br /><br />
Exemple 1: &nbsp; <tt>[[Special:Call/Mon modèl,parm1=value1]]</tt><br />
Exemple 2: &nbsp; <tt>[[Special:Call/Discussion:Ma discussion,parm1=value1]]</tt><br />
Exemple 3: &nbsp; <tt>[[Special:Call/:Ma pagina,parm1=value1,parm2=value2]]</tt><br /><br />
Exemple 4 (Adreça per navigador) : &nbsp; <tt>http://mondomeni/monwiki/index.php?Special:Call/:Ma_Pagina,parm1=value1</tt><br /><br />

L’extension <i>Ampèl</i> apelarà la pagina indicada en i passant los paramètres.<br />Veiretz las entresenhas d'aquesta pagina, son títol, mas son « tipe » serà lo d’una pagina especiala mas poirà pas èsser editada.<br />Las entresenhas que veiretz variaràn en foncion dels paramètres qu'auretz indicats.<br />Aquesta extension es fòrt practica per crear d'aplicacions interactivas amb MediaWiki.<br />A títol d’exemple, vejatz <a href='http://semeb.com/dpldemo/Template:Catlist'>the DPL GUI</a> ..<br />En cas de problèmas, podètz ensajar <b>Special:Call/DebuG</b>",
	'call-save' => "Çò qu'es indicat per aqueste ampèl poiriá èsser salvat cap a una pagina intitolada ''$1''.",
	'call-save-success' => 'Lo tèxt seguent es estat salvat cap a la pagina <big>[[$1]]</big> .',
	'call-save-failed' => 'Lo tèxt seguent a pas pogut èsser salvat cap a la pagina <big>[[$1]]</big> perque aquesta pagina existís ja.',
);

/** Polish (Polski)
 * @author Holek
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'call' => 'Wywołaj z parametrem',
	'call-desc' => 'Tworzy hiperłącze do szablonu (oraz strony w każdej przestrzeni nazw) z przesłaniem parametrów.
Funkcjonalność może być wykorzystana bezpośrednio w wikitekście lub jako adres dla pokazania możliwości szablonu/strony.',
	'call-text' => "Rozszerzenie <i>Wywołaj z parametrem</i> wywołuje się podając jako argument nazwę strony oraz opcjonalnie parametry wywołania dla tej strony.

Przykład 1: &nbsp; <tt>[[Specjalna:Wywołaj z parametrem/Mój szablon,parametr1=wartość1]]</tt><br />
Przykład 2: &nbsp; <tt>[[Specjalna:Wywołaj z parametrem/Dyskusja:Moja dyskusja,parametr1=wartość1]]</tt><br />
Przykład 3: &nbsp; <tt>[[Specjalna:Wywołaj z parametrem/:Moja strona,parametr1=wartość1,parametr2=wartość2]]</tt><br />
Przykład 4 (link): &nbsp; <tt>http://mojadomena/mojawiki/index.php?Special:Call/:Moja strona,parametr1=wartość1</tt>

Rozszerzenie <i>Wywołaj z parametrem</i> wywoła podaną stronę i wysyłając jej podane parametry.<br />
Zobaczysz zawartość wywołanej strony i jej tytuł, ale dalej będzie to strona specjalna, przez co nie będzie mogła być edytowana.<br />Zawartość, którą zobaczysz, będzie różna w zależności od podanych parametrów.

Rozszerzenie <i>Wywołaj z parametrem</i> jest przydatne przy budowaniu interaktywnych aplikacji na bazie MediaWiki.<br />Przykładem takiej aplikacji może być <a href='http://semeb.com/dpldemo/Template:Catlist'>DPL GUI</a>.<br />
W razie problemów, spróbuj <b>Specjalna:Wywołaj z parametrem/DebuG</b>",
	'call-save' => "Rezultat tego wywołania zostanie zapisany na stronie ''$1''.",
	'call-save-success' => 'Poniższy tekst został zapisany na stronie <big>[[$1]]</big>.',
	'call-save-failed' => "Poniższy tekst '''NIE''' został zapisany na stronie <big>[[$1]]</big>, ponieważ ta strona już istnieje.",
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'call-save-success' => 'لاندينی متن د <big>[[$1]]</big> مخ کې خوندي شوی.',
);

/** Portuguese (Português)
 * @author Malafaya
 */
$messages['pt'] = array(
	'call' => 'Call',
	'call-desc' => 'Cria uma hiperligação para uma predefinição (ou para uma página wiki normal) com passagem de parâmetros. Pode ser usada na linha de comandos do "browser" ou dentro de texto wiki.',
	'call-text' => "A extensão Call espera uma página wiki e parâmetros opcionais para essa página como argumentos.<br /><br />
Exemplo 1: &nbsp; <tt>[[Special:Call/Minha Predefinição,parm1=value1]]</tt><br />
Exemplo 2: &nbsp; <tt>[[Special:Call/Talk:Minha Discussão,parm1=value1]]</tt><br />
Exemplo 3: &nbsp; <tt>[[Special:Call/:Minha Página,parm1=value1,parm2=value2]]</tt><br /><br />
Exemplo 4 (URL de \"browser\"): &nbsp; <tt>http://meudominio/meuwiki/index.php?Special:Call/:Minha Página,parm1=value1</tt><br /><br />

A <i>extensão Call</i> irá realizar uma chamada à página fornecida e passar os parâmetros.<br />Você irá ver o conteúdo da página chamada e o seu título, mas o seu 'tipo' será o de uma página especial,<br />i.e. tal página não poderá ser editada.<br />O conteúdo que verá poderá variar dependendo do valor dos parâmetros que forem passados.<br /><br />
A <i>extensão Call</i> é útil na construção de aplicações interactivas com MediaWiki.<br />Para um exemplo, veja <a href='http://semeb.com/dpldemo/Template:Catlist'>o GUI DPL</a> ..<br />
Em caso de problemas, poderá experimentar <b>Special:Call/DebuG</b>",
	'call-save' => "O resultado desta chamada seria gravado numa página chamada ''$1''.",
	'call-save-success' => 'O seguinte texto foi gravado na página <big>[[$1]]</big>.',
	'call-save-failed' => 'O seguinte texto NÃO foi gravado na página <big>[[$1]]</big> porque essa página já existe.',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 */
$messages['pt-br'] = array(
	'call' => 'Call',
	'call-desc' => 'Cria uma hiperligação para uma predefinição (ou para uma página wiki normal) com passagem de parâmetros. Pode ser usada na linha de comandos do navegador ou dentro de texto wiki.',
	'call-text' => "A extensão Call espera uma página wiki e parâmetros opcionais para essa página como argumentos.<br /><br />
Exemplo 1: &nbsp; <tt>[[Special:Call/Minha Predefinição,parm1=value1]]</tt><br />
Exemplo 2: &nbsp; <tt>[[Special:Call/Talk:Minha Discussão,parm1=value1]]</tt><br />
Exemplo 3: &nbsp; <tt>[[Special:Call/:Minha Página,parm1=value1,parm2=value2]]</tt><br /><br />
Exemplo 4 (URL de \"browser\"): &nbsp; <tt>http://meudominio/meuwiki/index.php?Special:Call/:Minha Página,parm1=value1</tt><br /><br />

A <i>extensão Call</i> irá realizar uma chamada à página fornecida e passar os parâmetros.<br />Você irá ver o conteúdo da página chamada e o seu título, mas o seu 'tipo' será o de uma página especial,<br />i.e. tal página não poderá ser editada.<br />O conteúdo que verá poderá variar dependendo do valor dos parâmetros que forem passados.<br /><br />
A <i>extensão Call</i> é útil na construção de aplicações interativas com MediaWiki.<br />Para um exemplo, veja <a href='http://semeb.com/dpldemo/Template:Catlist'>o GUI DPL</a> ..<br />
Em caso de problemas, você poderá experimentar <b>Special:Call/DebuG</b>",
	'call-save' => "O resultado desta chamada seria gravado numa página chamada ''$1''.",
	'call-save-success' => 'O seguinte texto foi gravado na página <big>[[$1]]</big>.',
	'call-save-failed' => ' seguinte texto NÃO foi gravado na página <big>[[$1]]</big> porque essa página já existe.',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'call-save-success' => 'Următorul text a fost salvat la pagina <big>[[$1]]</big> .',
);

/** Russian (Русский)
 * @author Ahonc
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'call' => 'Вызов',
	'call-desc' => 'Создаёт гиперссылку на шаблон (или обычную вики-страницу) с передачей параметров. Может использоваться в адресной строке браузера или в вики-тексте.',
	'call-text' => "Расширение «Вызов» (Call) принимает в качестве входных данных название страницы и значения параметров.<br /><br />
Пример 1: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
Пример 2: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
Пример 3: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br />
Пример 4 (URL для браузера): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My Page,parm1=value1</tt>

Данное расширение вызовет указанную страницу и передаст ей параметры.<br />Вы увидите сожержимое страницы, её заголовок, но её тип будет типом служебной страницы,<br />т. е. содержимое нельзя будет редактировать.<br />Отображаемое содержимое страницы может изменяться, в зависимости от переданных параметров.<br /><br />Расширение «Вызов» полезно для построения интерактивных приложений с помощью MediaWiki.<br />См. например <a href='http://semeb.com/dpldemo/Template:Catlist'>DPL GUI</a>.<br />
В случае возникновения проблем, вы можете использовать <b>Special:Call/DebuG</b>",
	'call-save' => "Вывод этого вызова будет сохранён на страницу ''$1''.",
	'call-save-success' => 'Следующий текст был сохранён на страницу <big>[[$1]]</big>.',
	'call-save-failed' => 'Следующий текст НЕ был сохранён на страницу <big>[[$1]]</big>, так как данная страница уже существует.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'call' => 'Call',
	'call-desc' => 'Vytvorí hyperodkaz na šablónu (alebo na bežnú wiki stránku) s odovzdávaním parametrov. Je možné použiť z riadka s adresou v prehliadači alebo v rámci wiki textu.',
	'call-text' => "Rozšírenie Call očakáva ako argumenty stránku wiki a voliteľné parametre danej stránky.<br /><br />
Príklad 1: &nbsp; <tt>[[Special:Call/Moja šablóna,parm1=value1]]</tt><br />
Príklad 2: &nbsp; <tt>[[Special:Call/Diskusia:Moja diskusia,parm1=value1]]</tt><br />
Príklad 3: &nbsp; <tt>[[Special:Call/:Moja stránka,parm1=value1,parm2=value2]]</tt><br /><br />
Príklad 4 (URL prehliadača): &nbsp; <tt>http://mojadoména/mojawiki/index.php?Special:Call/:Moja stránka,parm1=value1</tt><br /><br />

<i>Rozšírenie Call</i> zavolá danú stránku a odovzdá jej parametre.<br />
Uvidiíte obsah zavolanej stránky a jej názov, ale jej ''typ'' bude špeciálna stránka,<br />
t.j. takú stránku nie je možné upravovať.<br />
Obsah, ktorý uvidíte sa môže líšiť v závislosti od parametrov, ktoré ste odovzdali.<br /><br />
<i>Rozšírenie Call</i> je užitočné pri budovaní interaktívnych aplikácií pomocou MediaWiki.<br />
Ako príklad si môžete pozrieť <a href='http://semeb.com/dpldemo/Template:Catlist'>GUI DPL</a> ..<br />
V prípade problémov môžete skúsuť <b>Special:Call/DebuG</b>",
	'call-save' => "Výstup tejto stránky by bol uložený na stránku s názvom ''$1''.",
	'call-save-success' => 'Nasledovný text bol uložený na stránku <big>[[$1]]</big>.',
	'call-save-failed' => "Nasledovný text NEBOL uložený na stránku ''$1'', pretože taká stránka už existuje.",
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'call' => 'Parameter-Aproup',
	'call-desc' => 'Moaket n Hyperlink tou ne Foarloage (of tou ne normoale Siede) mäd Parameter-Uurgoawe.
Kon in ju Iengoawe-Apfoarderenge fon dän Browser of in dän Wiki-Text ferwoand wäide.',
	'call-save' => "Ju Uutgoawe fon dissen Aproup wüül as Siede ''$1'' spiekerd wäide.",
	'call-save-success' => 'Die foulgjende Text wuud ap Siede <big>[[$1]]</big> spiekerd.',
	'call-save-failed' => 'Die foulgjende Text wuud NIT ap Siede <big>[[$1]]</big> spiekerd, wült disse Siede al existiert.',
);

/** Sundanese (Basa Sunda)
 * @author Kandar
 */
$messages['su'] = array(
	'call' => 'Calukan',
	'call-desc' => "Jieun hipertumbu ka citakan (atawa ka kaca wiki biasa) nu mibanda ''parameter passing''. Ieu bisa dipaké dina the browser’s command line or within wiki text.",
	'call-save' => "Kaluaran ieu panyaluk bakal disimpen di kaca nu disebut ''$1''.",
	'call-save-success' => 'Tulisan di handap ieu geus disimpen dina kaca <big>[[$1]]</big> .',
	'call-save-failed' => 'Tulisan di handap ieu CAN disimpen dina kaca <big>[[$1]]</big> kusabab éta kaca geus aya.',
);

/** Swedish (Svenska)
 * @author Lejonel
 * @author M.M.S.
 */
$messages['sv'] = array(
	'call' => 'Anropa',
	'call-desc' => 'Ger möjlighet att skapa länkar till mallar (eller vanliga wikisidor) med angivna parametrar. Länkarna kan användas i webbläsarens adressfält eller i wikitext.',
	'call-text' => "Programtillägget Call (Anropa) förväntar sig att en wikisida, och eventuellt parametrar till sidan, anges som argument.<br /><br />
Exempel 1: &nbsp; <tt>[[Special:Call/Min mall,parm1=värde1]]</tt><br />
Exempel 2: &nbsp; <tt>[[Special:Call/Talk:Min diskussion,parm1=värde1]]</tt><br />
Exempel 3: &nbsp; <tt>[[Special:Call/:Min sida,parm1=värde1,parm2=värde2]]</tt><br /><br />
Example 4 (URL för adressfältet): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:Min_sida,parm1=värde1</tt><br /><br />

<i>Call</i>-tillägget anropar den angivna sidan och skickar med parametrarna.<br />Du kommer att se den anropade sidans innehåll och titel, men sidan som visas är en specialsida och kan därför inte redigeras.<br />
Innehållet som visas kan variera beroende på värdena på de parametrar som skickas med.<br /><br />
Tillägget <i>Call</i> kan användas för att skapa interaktiva applikationer med MediaWiki.<br />
Se som ett exempel <a href='http://semeb.com/dpldemo/Template:Catlist'>gränssnittet för DPL</a> <br />
Om du har några problem så kan du prova <b>Special:Call/DebuG</b>.",
	'call-save' => "Resultatet av det här anropet skulle ha sparats på en sida med titeln ''$1''.",
	'call-save-success' => 'Följande text har sparats på sidan <big>[[$1]]</big>.',
	'call-save-failed' => 'Följande text har <b>inte</b> sparats på sidan <big>[[$1]]</big> eftersom sidan redan existerar.',
);

/** Telugu (తెలుగు)
 * @author Veeven
 * @author వైజాసత్య
 */
$messages['te'] = array(
	'call' => 'పిలువు',
	'call-save-success' => 'ఈ క్రింది పాఠ్యాన్ని <big>[[$1]]</big> అనే పేజీలో భద్రపరిచాం.',
	'call-save-failed' => '<big>[[$1]]</big> అనే పేజీ ఈసరికే ఉన్నందువల్ల ఈ క్రింది పాఠ్యాన్ని అందులో భద్రపరచలేకపోయాం.',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'call-save-success' => 'Матни зерин ба саҳифа <big>[[$1]]</big> захира шуд.',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'call' => 'Tawagin',
	'call-desc' => "Lumikha ng isang sangguniang kawing (''hyperlink'') sa isang suleras (o sa isang karaniwang pahina ng wiki) na may pagpasa ng parametro.
Magagamit sa guhit ng utos ng pangtingin (''browser'') o sa loob ng isang teksto ng wiki.",
	'call-text' => "Ang karugtong ng Pagtawag ay may inaasahang isang pahina ng wiki at mga parametro (na hindi naman talaga kinakailangang mayroon) para sa pahinang iyon bilang isang pangangatwiran.

Halimbawa 1: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
Halimbawa 2: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
Halimbawa 3: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br />
Halimbawa 4 (Browser URL): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My Page,parm1=value1</tt>

Tatawagin ng <i>karugtong ng Pagtawag</i> ang isang ibinigay na pahina at magpapasa ng mga parametro.<br />
Makikita mo ang mga nilalaman ng tinawag na pahina at ang pamagat nito subalit ang 'uri' nito ay magiging para sa isang natatanging pahina, iyan ay ang katulad ng isang pahinang hindi maaaring baguhin.<br />Maaaring maging magkakaiba ang mga nilalaman na makikita mo ayon sa halaga ng mga parametrong ipinasa mo.

Magagamit ang <i>karugtong ng Pagtawag</i> sa pagbubuo ng nakapagpapasigla sa pakikipag-ugnayan o inter-aktibong mga sopwer o aplikasyong kasama sa MediaWiki.<br />
Bilang halimbawa, tingnan ang <a href='http://semeb.com/dpldemo/Template:Catlist'>ang GUI ng DPL </a> ..<br />
Kung sakaling may mga suliranin, maaari mong subukan ang <b>Special:Call/DebuG</b>",
	'call-save' => "Ang kinalabasan ng pagtawag na ito ay sasagipin sa isang pahinang tinatawag na ''$1''.",
	'call-save-success' => 'Ang sumusunod na teksto ay sinagip na sa pahinang <big>[[$1]]</big>.',
	'call-save-failed' => 'Ang sumusunod na teksto ay HINDI nasagip sa pahinang <big>[[$1]]</big> dahil umiiral na ang pahinang iyan.',
);

/** Ukrainian (Українська)
 * @author Ahonc
 */
$messages['uk'] = array(
	'call' => 'Виклик',
	'call-desc' => 'Створює посилання на шаблон (або звичайну вікі-сторінку) з передачею параметрів. Може використовуватися в адресному рядку браузера або у вікі-тексті.',
	'call-text' => "Розширення Call приймає в якості вхідних даних назву сторінки і значення параметрів.<br />

Приклад 1: &nbsp; <tt>[[Special:Call/My Template,parm1=value1]]</tt><br />
Приклад 2: &nbsp; <tt>[[Special:Call/Talk:My Discussion,parm1=value1]]</tt><br />
Приклад 3: &nbsp; <tt>[[Special:Call/:My Page,parm1=value1,parm2=value2]]</tt><br />
Приклад 4 (URL для браузера): &nbsp; <tt>http://mydomain/mywiki/index.php?Special:Call/:My Page,parm1=value1</tt>

Це розширення викличе зазначену сторінку і передасть їй параметри. Ви побачите вміст сторінки, її заголовок, але її тип буде типом спеціальної сторінки, тобто вміст не можна буде редагувати.<br />Вімст сторінки, який відображається, може змінюватися, в залежності від переданих параметрів.<br />

Розширення Call корисне для побудови інтерактивних застосувань за допомогою MediaWiki.<br />Див. наприклад <a href='http://semeb.com/dpldemo/Template:Catlist'>DPL GUI</a>.<br />
У випадку виникнення проблем ви можете використовувати <b>Special:Call/DebuG</b>",
	'call-save' => "Вивід цього виклику буде збережений на сторінку ''$1''.",
	'call-save-success' => 'Наступний текст був збережений на сторінку <big>[[$1]]</big>.',
	'call-save-failed' => 'Наступний текст НЕ був збережений на сторінку <big>[[$1]]</big>, оскільки ця сторінка вже існує.',
);

/** Vietnamese (Tiếng Việt)
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'call' => 'Gọi',
	'call-desc' => 'Tạo một siêu liên kết đến một tiêu bản (hoặc đến một trang wiki thông thường) bằng cách truyền tham số.
Có thể được dùng tại dòng lệnh của trình duyệt hoặc trong văn bản wiki.',
	'call-text' => "Gói mở rộng Call mong đợi một trang wiki và những thông số tùy chọn của trang đó là tham số.

Ví dụ 1: &nbsp; <tt>[[Special:Call/Tiêu bản của tôi,tham1=trị1]]</tt><br />
Ví dụ 2: &nbsp; <tt>[[Special:Call/Thảo luận:Thảo luận của tôi,tham1=trị1]]</tt><br />
Ví dụ 3: &nbsp; <tt>[[Special:Call/:Trang của tôi,tham1=trị1,tham2=trị2]]</tt><br />
Ví dụ 4 (URL trình duyệt): &nbsp; <tt>http://tênmiền/wikitôi/index.php?Special:Call/:Trang của tôi,tham1=trị1</tt>

<i>Gói mở rộng Call</i> sẽ gọi trang chỉ định và truyền tham số.<br />
Bạn sẽ nhìn thấy nội dung của trang được gọi cùng với tựa đề của nó nhưng 'kiểu' của nó sẽ là một trang đặc biệt, có nghĩa là bạn không thể sửa đổi trang đó.<br />Nội dung bạn nhìn thấy có thể thay đổi tùy theo giá trị tham số bạn truyền vào.

<i>Gói mở rộng Call</i> hữu hiệu trong việc xây dựng những ứng dụng tương tác với MediaWiki.<br />
Xem ví dụ <a href='http://semeb.com/dpldemo/Template:Catlist'>DPL GUI</a> ..<br />
Trong trường hợp có vấn đề bạn có thể thử <b>Special:Call/DebuG</b>",
	'call-save' => "Ngõ ra của lần gọi này sẽ được lưu vào trang có tên ''$1''.",
	'call-save-success' => 'Văn bản sau đã được lưu vào trang <big>[[$1]]</big> .',
	'call-save-failed' => 'Văn bản sau KHÔNG được lưu vào trang <big>[[$1]]</big> vì trang đó đã tồn tại.',
);

/** Volapük (Volapük)
 * @author Smeira
 */
$messages['vo'] = array(
	'call' => 'Vokön',
	'call-save' => "Seks voka at padakiponsöv as pad tiädü ''$1''.",
	'call-save-success' => 'Vödem fovik pedakipon su pad: <big>[[$1]]</big>.',
	'call-save-failed' => 'Vödem fovik NO pedakipon su pad: <big>[[$1]]</big> bi pad at ya dabinon.',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gzdavidwong
 */
$messages['zh-hans'] = array(
	'call' => '呼叫',
	'call-save' => '本呼叫的输出将保存至名为“$1”的页面内。',
	'call-save-success' => '以下文字经已保存至页面<big>[[$1]]</big>。',
	'call-save-failed' => '由于页面已存在，以下文字并未保存至页面<big>[[$1]]</big>。',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'call' => '呼叫',
	'call-save' => '本呼叫的輸出將儲存至名為「$1」的頁面內。',
	'call-save-success' => '以下文字經已儲存至頁面<big>[[$1]]</big>。',
	'call-save-failed' => '由於頁面已存在，以下文字並未儲存至頁面<big>[[$1]]</big>。',
);

