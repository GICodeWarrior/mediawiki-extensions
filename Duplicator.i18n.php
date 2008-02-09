<?php
/**
 * Internationalisation file for extension Duplicator.
 *
 * @addtogroup Extensions
 * @author Rob Church <robchur@gmail.com>
 */

$messages = array();

/* English
 * @author Rob Church
 */
$messages['en'] = array(
	'duplicator' => 'Duplicate a page',
	'duplicator-desc' => 'Create independent copies of pages with full edit histories',
	'duplicator-toolbox' => 'Duplicate this page',
	'duplicator-header' => 'This page allows the complete duplication of a page, creating independent copies of all histories. This is useful for page forking, etc.',
	'duplicator-options' => 'Options',
	'duplicator-source' => 'Source:',
	'duplicator-dest' => 'Destination:',
	'duplicator-dotalk' => 'Duplicate discussion page (if applicable)',
	'duplicator-submit' => 'Duplicate',
	'duplicator-summary' => 'Copied from [[$1]]',
	'duplicator-success' => "<big>'''[[$1]] was copied to [[$2]].'''</big>",
	'duplicator-success-revisions' => '$1 {{PLURAL:$1|revision was|revisions were}} copied.',
	'duplicator-success-talkcopied' => 'The discussion page was also copied.',
	'duplicator-success-talknotcopied' => 'The talk page could not be copied.',
	'duplicator-failed' => 'The page could not be duplicated. An unknown error occurred.',
	'duplicator-source-invalid' => 'Please provide a valid source title.',
	'duplicator-source-notexist' => '[[$1]] does not exist. Please provide the title of a page that exists.',
	'duplicator-dest-invalid' => 'Please provide a valid destination title.',
	'duplicator-dest-exists' => '[[$1]] already exists. Please provide a destination title which doesn\'t exist.',
	'duplicator-toomanyrevisions' => '[[$1]] has too many ($2) revisions and cannot be copied. The current limit is $3.',
);

/** Arabic (العربية)
 * @author Meno25
 * @author Gharbeia
 */
$messages['ar'] = array(
	'duplicator'                       => 'استنساخ صفحة',
	'duplicator-desc'                  => 'ينشيء نسخا مستقلة من الصفحات بتاريخ التعديلات الكامل',
	'duplicator-toolbox'               => 'استنسخ هذه الصفحة',
	'duplicator-header'                => 'هذه الصفحة تسمح بالاستنساخ الكامل لصفحة، وإنشاء نسخ مستقلة لكل التواريخ. هذا مفيد في استساخ صفحة، إلى آخره.',
	'duplicator-options'               => 'خيارات',
	'duplicator-source'                => 'المصدر:',
	'duplicator-dest'                  => 'الوجهة:',
	'duplicator-dotalk'                => 'استنسخ صفحة النقاش (إن أمكن)',
	'duplicator-submit'                => 'استنساخ',
	'duplicator-summary'               => 'منسوخ من [[$1]]',
	'duplicator-success'               => "<big>'''[[$1]] تم نسخها إلى [[$2]].'''</big>",
	'duplicator-success-revisions'     => '$1 {{PLURAL:$1|نسخة|نسخ}} تم نسخها.',
	'duplicator-success-talkcopied'    => 'صفحة النقاش تم نقلها أيضا.',
	'duplicator-success-talknotcopied' => 'لم يمكن نسخ صفحة النقاش.',
	'duplicator-failed'                => 'لم يمكن استساخ الصفحة. حدث خطأ غير معروف.',
	'duplicator-source-invalid'        => 'من فضلك اكتب عنوان مصدر صحيح.',
	'duplicator-source-notexist'       => '[[$1]] غير موجودة. من فضلك اكتب عنوان صفحة موجودة.',
	'duplicator-dest-invalid'          => 'من فضلك اكتب عنوان وجهة صحيح.',
	'duplicator-dest-exists'           => '[[$1]] موجودة بالفعل. من فضلك اكتب عنوان هدف غير موجود.',
	'duplicator-toomanyrevisions'      => '[[$1]] لديه عدد كبير ($2) من النسخ و لا يمكن نسخه. الحد الحالي هو $3.',
);

$messages['bcl'] = array(
	'duplicator-options' => 'Mga pilian',
	'duplicator-source' => 'Ginikanan:',
	'duplicator-dest' => 'Destinasyon:',
	'duplicator-summary' => 'Kinopya sa [[$1]]',
);

/** Bulgarian (Български)
 * @author DCLXVI
 * @author Spiritia
 */
$messages['bg'] = array(
	'duplicator-options'               => 'Настройки',
	'duplicator-source'                => 'Източник:',
	'duplicator-dest'                  => 'Цел:',
	'duplicator-summary'               => 'Копирано от [[$1]]',
	'duplicator-success'               => "<big>'''Страницата [[$1]] беше копирана като [[$2]].'''</big>",
	'duplicator-success-revisions'     => '$1 {{PLURAL:$1|редакция беше копирана|редакции бяха копирани}}.',
	'duplicator-success-talkcopied'    => 'Дискусионната страница също беше копирана.',
	'duplicator-success-talknotcopied' => 'Дискусионната страница не можа да бъде копирана.',
	'duplicator-source-notexist'       => 'Не съществува страница [[$1]]. Необходимо е да се посочи заглавие, което съществува.',
	'duplicator-dest-invalid'          => 'Необходимо е валидно целево заглавие.',
	'duplicator-dest-exists'           => 'Вече съществува страница [[$1]]. Необходимо е да се посочи целево заглавие, което не съществува.',
	'duplicator-toomanyrevisions'      => 'Страницата [[$1]] има твърде много ($2) редакции и не може да бъде копирана. Най-много могат да са $3 редакции.',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'duplicator'                       => 'Eilañ ur pennad',
	'duplicator-toolbox'               => 'Eilañ ar pennad-mañ',
	'duplicator-header'                => "Dre ar bajenn-mañ e c'haller eilañ ur pennad penn-da-benn ha sevel stummoù emren evit pep kemm degaset. Talvoudus eo evit diforc'hañ pennadoù, da skouer.",
	'duplicator-options'               => 'Dibarzhioù',
	'duplicator-source'                => 'Mammenn :',
	'duplicator-dest'                  => "Lec'h-kas :",
	'duplicator-dotalk'                => 'Eilañ ar bajenn gaozeal (mar galler)',
	'duplicator-submit'                => 'Eilañ',
	'duplicator-summary'               => 'Eilet eus [[$1]]',
	'duplicator-success'               => "<big>'''Eilet eo bet [[$1]] war [[$2]].'''</big>",
	'duplicator-success-revisions'     => '$1 kemm zo bet eilet.',
	'duplicator-success-talkcopied'    => 'Eilet eo bet ar bajenn gaozeal ivez.',
	'duplicator-success-talknotcopied' => "N'eus ket bet gallet eilañ ar bajenn gaozeal.",
	'duplicator-failed'                => "N'eus ket bet gallet eilañ ar bajenn-mañ. C'hoarvezet ez eus ur fazi digomprenus.",
	'duplicator-source-invalid'        => "Mar plij, lakait anv ur pennad zo anezhañ c'hoazh.",
	'duplicator-source-notexist'       => "N'eus ket eus [[$1]]. Lakait titl ur pennad zo anezhañ mar plij",
	'duplicator-dest-invalid'          => "Merkit un titl reizh evel lec'h-kas, mar plij",
	'duplicator-dest-exists'           => "Bez' ez eus eus [[$1]] c'hoazh. Merkit titl ul lec'h-kas n'eo ket bet krouet c'hoazh.",
	'duplicator-toomanyrevisions'      => "Re a ($2) gemmoù zo gant [[$1]]. N'haller ket o eilañ. $3 eo ar vevenn e talvoud.",
);

/** Catalan (Català)
 * @author Toniher
 * @author SMP
 */
$messages['ca'] = array(
	'duplicator'                       => 'Duplica una pàgina',
	'duplicator-toolbox'               => 'Duplica aquesta pàgina',
	'duplicator-header'                => "Aquesta pàgina permet la duplicació completa d'una pàgina, creant còpies independents de tots els historials. Això és útil per a l'edició de nous articles a partir d'altres, etc.",
	'duplicator-options'               => 'Opcions',
	'duplicator-source'                => 'Origen:',
	'duplicator-dest'                  => 'Destinació',
	'duplicator-dotalk'                => 'Duplica la pàgina de discussió (quan així es pugui)',
	'duplicator-submit'                => 'Duplica',
	'duplicator-summary'               => 'Copiat des de [[$1]]',
	'duplicator-success'               => "<big>'''[[$1]] s'ha copiat a [[$2]].'''</big>",
	'duplicator-success-revisions'     => "{{PLURAL:$1|S'ha copiat una revisió|S'han copiat $1 revisions}}.",
	'duplicator-success-talkcopied'    => "La pàgina de discussió també s'ha copiat.",
	'duplicator-success-talknotcopied' => "La pàgina de discussió no s'ha pogut copiar.",
	'duplicator-failed'                => "La pàgina no s'ha pogut duplicar. S'ha produït un error desconegut.",
	'duplicator-source-invalid'        => 'Si us plau, proporcioneu un títol de pàgina original vàlid.',
	'duplicator-source-notexist'       => "[[$1]] no existeix. Proporcioneu un títol d'una pàgina que existeixi.",
	'duplicator-dest-invalid'          => 'Si us plau, proporcioneu un títol de destinació vàlid.',
	'duplicator-dest-exists'           => '[[$1]] ja existeix. Proporcioneu un títol de destinació que no existeixi.',
	'duplicator-toomanyrevisions'      => "La pàgina [[$1]] té $2 revisions i no pot ser copiada. EL límit màxim d'edicions que es poden copiar és de $3.",
);

/* German (Leon Weber) */
$messages['de'] = array(
	'duplicator'         => 'Seite duplizieren',
	'duplicator-header'  => 'Mit dieser Spezialseite können Seiten komplett dupliziert werden. Dabei wird die gesamte ' .
				'Versionsgeschichte übernommen. Dies kann beispielsweise nützlich sein, um eine Seite in ' .
				'Unterseiten aufzuteilen.',
	'duplicator-options' => 'Optionen',
	'duplicator-source'  => 'Quelle:',
	'duplicator-dest'    => 'Ziel:',
	'duplicator-dotalk'  => 'Diskussionsseite mitkopieren (wenn möglich)',
	'duplicator-submit'  => 'Seite duplizieren',

	'duplicator-summary' => '[[$1]] wurde dupliziert',

	'duplicator-success'               => "<big>'''[[$1]] wurde nach [[$2]] kopiert.'''</big>",
	'duplicator-success-revisions'     => '{{PLURAL:$1|1 Version wurde|$1 Versionen wurden}} dupliziert.',
	'duplicator-success-talkcopied'    => 'Die Diskussionsseite wurde auch dupliziert.',
	'duplicator-success-talknotcopied' => 'Die Diskussionsseite konnte nicht dupliziert werden.',
	'duplicator-failed'                => 'Die Seite konnte nicht dupliziert werden, da ein unbekannter Fehler auftrat.',

	'duplicator-source-invalid'   => 'Bitte gebe eine gültigen Quell-Seite an.',
	'duplicator-source-notexist'  => 'Die Seite [[$1]] existiert nicht. Bitte gebe eine existierende Seite an.',
	'duplicator-dest-invalid'     => 'Bitte gebe eine gültige Ziel-Seite an.',
	'duplicator-dest-exists'      => 'Die Seite [[$1]] existiert bereits. Bitte gebe eine nicht existierende Seite an.',
	'duplicator-toomanyrevisions' => 'Die Seite [[$1]] hat $2 Versionen, um kann daher nicht dupliziert. Es können nur Seiten mit maximal $3 Versionen dupliziert werden.',
);

/** Greek (Ελληνικά)
 * @author Consta
 */
$messages['el'] = array(
	'duplicator-options' => 'Επιλογές',
	'duplicator-source'  => 'Πηγή:',
	'duplicator-dest'    => 'Προορισμός:',
);

/** Esperanto (Esperanto)
 * @author Tlustulimu
 * @author Yekrats
 */
$messages['eo'] = array(
	'duplicator'                       => 'Duplikatu paĝon',
	'duplicator-toolbox'               => 'Duplikatu ĉi paĝon',
	'duplicator-header'                => 'Ĉi paĝo permesas la tutan dupklikatadon de paĝo, kreante sendependajn kopiojn de ĉiuj historioj. Estus utila por disigo de artikoloj, ktp.',
	'duplicator-options'               => 'Preferoj',
	'duplicator-source'                => 'Fonto:',
	'duplicator-dest'                  => 'Destino:',
	'duplicator-dotalk'                => 'Duobligu diskutan paĝon (se estas aplikebla)',
	'duplicator-submit'                => 'Duobligu',
	'duplicator-summary'               => 'Kopiita de [[$1]]',
	'duplicator-success'               => "<big>'''[[$1]] estas kopiita al [[$2]].'''</big>",
	'duplicator-success-revisions'     => '$1 {{PLURAL:$1|revizio|revizioj}} estas {{PLURAL:$1|kopiita|kopiitaj}}.',
	'duplicator-success-talkcopied'    => 'La diskuta paĝo ankaŭ estas kopiita.',
	'duplicator-success-talknotcopied' => 'La diskuta paĝo ne povis esti kopiita.',
	'duplicator-failed'                => 'La paĝo ne povis esti duobligita. Nekonata eraro okazis.',
	'duplicator-source-invalid'        => 'Bonvolu provizi validan fontan titolon.',
	'duplicator-source-notexist'       => '[[$1]] ne ekzistas. Bonvolu provizi la titolon de paĝo kiu ekzistas.',
	'duplicator-dest-invalid'          => 'Bonvolu provizi validan destinan titolon.',
	'duplicator-dest-exists'           => '[[$1]] jam ekzistas. Bonvolu provizi destinan titolon kiu ne ekzistas.',
	'duplicator-toomanyrevisions'      => '[[$1]] havas tro multajn ($2) reviziojn kaj ne povas esti kopiata. La aktuala limo estas $3.',
);

$messages['ext'] = array(
	'duplicator-options' => 'Ocionis',
);

/* Finnish (Niklas Laxström) */
$messages['fi'] = array(
	'duplicator' => 'Monista sivu',
	'duplicator-toolbox' => 'Monista tämä sivu',
	'duplicator-header' => 'Tällä sivulla voit luoda artikkelista täydellisen kopion historioineen.',
	'duplicator-options' => 'Asetukset',
	'duplicator-source' => 'Lähdesivu:',
	'duplicator-dest' => 'Kohdesivu:',
	'duplicator-dotalk' => 'Monista myös keskustelusivu, jos mahdollista',
	'duplicator-submit' => 'Monista',
	'duplicator-summary' => 'Täydellinen kopio sivusta [[$1]]',
	'duplicator-success' => "<big>'''[[$1]] monistettiin sivulle [[$2]].'''</big>",
	'duplicator-success-revisions' => '{{PLURAL:$1|yksi muutos|$1 muutosta}} kopioitiin.',
	'duplicator-success-talkcopied' => 'Myös keskustelusivu monistettiin.',
	'duplicator-success-talknotcopied' => 'Keskustelusivua ei monistettu.',
	'duplicator-failed' => 'Sivun monistaminen ei onnistunut.',
	'duplicator-source-invalid' => 'Lähdesivun nimi ei kelpaa.',
	'duplicator-source-notexist' => 'Sivua [[$1]] ei ole olemassa.',
	'duplicator-dest-invalid' => 'Kohdesivun nimi ei kelpaa.',
	'duplicator-dest-exists' => '[[$1]] on jo olemassa. Anna nimi, joka ei ole vielä käytössä.',
	'duplicator-toomanyrevisions' => 'Sivu [[$1]] koostuu liian monesta muutoksesta ($2), minkä takia sitä ei voi monistaa. Nykyinen raja on $3.',
);

/* French */
$messages['fr'] = array(
	'duplicator' => 'Dupliquer un article',
	'duplicator-desc' => 'Créer des copies distinctes d’articles avec l’historique complet des modifications.',
	'duplicator-toolbox' => 'Dupliquer cet article',
	'duplicator-header' => 'Cette page permet la duplication complète d’un article, en créant deux versions indépendantes de l’historique complet. Il sert par exemple à séparer un article en deux.',
	'duplicator-options' => 'Options',
	'duplicator-source' => 'Source :',
	'duplicator-dest' => 'Destination :',
	'duplicator-dotalk' => 'Dupliquer la page de discussion (si elle existe)',
	'duplicator-submit' => 'Dupliquer',
	'duplicator-summary' => 'Copié depuis [[$1]]',
	'duplicator-success' => "<big>'''[[$1]] a été copié vers [[$2]].'''</big>\n\n",
	'duplicator-success-revisions' => '$1 révisions ont été copiées.',
	'duplicator-success-talkcopied' => 'La page de discussion a également été copiée.',
	'duplicator-success-talknotcopied' => 'La page de discussion n’a pas pu être copiée.',
	'duplicator-failed' => 'La page n’a pas pu être dupliquée. Une erreur inconnue s’est produite.',
	'duplicator-source-invalid' => 'Veuillez donner un nom valide pour l’article.',
	'duplicator-source-notexist' => '[[$1]] n’existe pas. Veuillez donner le nom d’un article existant.',
	'duplicator-dest-invalid' => 'Veuillez donner un nom valide pour la destination.',
	'duplicator-dest-exists' => '[[$1]] existe déjà. Veuillez donner le nom d’un article qui n’existe pas encore.',
	'duplicator-toomanyrevisions' => '[[$1]] a trop ($2) de révisions et ne peut pas être copié. La limite actuelle est de $3.',
);

/** Galician (Galego)
 * @author Xosé
 * @author Alma
 */
$messages['gl'] = array(
	'duplicator'                       => 'Duplicar unha páxina',
	'duplicator-toolbox'               => 'Duplicar esta páxina',
	'duplicator-header'                => 'Esta páxina permite a duplicación completa dunha páxina e crea copias independentes
de todos os historiais. Resulta útil cando se subdivide unha páxina, etc.',
	'duplicator-options'               => 'Opcións',
	'duplicator-source'                => 'Fonte:',
	'duplicator-dest'                  => 'Destino:',
	'duplicator-dotalk'                => 'Duplicar a páxina de discusión (se proceder)',
	'duplicator-submit'                => 'Duplicar',
	'duplicator-summary'               => 'Copiado desde [[$1]]',
	'duplicator-success'               => "<big>'''Copiouse [[$1]] a [[$2]].'''</big>",
	'duplicator-success-revisions'     => '{{PLURAL:$1|Copiouse|Copiáronse}} $1 revisións.',
	'duplicator-success-talkcopied'    => 'Tamén se copiou a páxina de discusión.',
	'duplicator-success-talknotcopied' => 'Non se puido copiar a páxina de discusión.',
	'duplicator-failed'                => 'Non se puido copiar a páxina. Produciuse un erro descoñecido.',
	'duplicator-source-invalid'        => 'Forneza un título de orixe válido.',
	'duplicator-source-notexist'       => 'Non existe [[$1]]. Forneza un título de páxina que exista.',
	'duplicator-dest-invalid'          => 'Forneza un título de destino válido.',
	'duplicator-dest-exists'           => '[[$1]] xa existe. Forneza un título de destino que non exista.',
	'duplicator-toomanyrevisions'      => '[[$1]] ten demasiadas ($2) revisións e non se pode copiar. O límite actual é $3.',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'duplicator'                       => 'Nastawk duplicěrować',
	'duplicator-desc'                  => 'Njewotwisne kopije stronow z dospołnymi wersijowymi stawiznami wutworić',
	'duplicator-toolbox'               => 'Tutón nastawk duplicěrować',
	'duplicator-header'                => 'Z tutej specialnej stronu móžeš strony dospołnje duplicěrować. Při tym přewozmu so cyle stawizny strony. To móže z wužitkom być, hdyž ma so na pr. strona do wjacorych nastawkow rozdźělić.',
	'duplicator-options'               => 'Opcije',
	'duplicator-source'                => 'Žórło:',
	'duplicator-dest'                  => 'Cil:',
	'duplicator-dotalk'                => 'Diskusijnu stronu sobu kopěrować (jeli móžno)',
	'duplicator-submit'                => 'Duplicěrować',
	'duplicator-summary'               => '[[$1]] kopěrowany.',
	'duplicator-success'               => "<big>'''[[$1]] bu do [[$2]] kopěrowany.'''</big>",
	'duplicator-success-revisions'     => '$1 {{PLURAL:$1|wersija bu kopěrowana|wersijow bu kopěrowane|wersiji buštej kopěrowanej|wersije buchu kopěrowane}}.',
	'duplicator-success-talkcopied'    => 'Diskusijna strona bu tež kopěrowana.',
	'duplicator-success-talknotcopied' => 'Diskusijna strona njeda so kopěrować.',
	'duplicator-failed'                => 'Strona njeda so duplicěrować. Njeznaty zmylk je wustupił.',
	'duplicator-source-invalid'        => 'Prošu podaj płaćiwu žórłowu stronu.',
	'duplicator-source-notexist'       => 'Strona [[$1]] njeeksistuje. Prošu zapodaj eksistowacu stronu.',
	'duplicator-dest-invalid'          => 'Prošu podaj płaćiwu cilowu stronu.',
	'duplicator-dest-exists'           => 'Strona [[$1]] hižo eksistuje. Prošu zapodaj cilowy titl kotryž hišće njeeksistuje.',
	'duplicator-toomanyrevisions'      => 'Strona [[$1]] ma přewjele ($2) wersijow a njehodźi so tohodla kopěrować. Kopěrowanje je na strony z maksimalnje $3 wersijemi wobmjezowane.',
);

/** Hungarian (Magyar)
 * @author Bdanee
 */
$messages['hu'] = array(
	'duplicator'                       => 'Oldal másolása',
	'duplicator-toolbox'               => 'Oldal másolása',
	'duplicator-header'                => 'Ez az oldal lehetővé teszi egy teljes oldal lemásolását, a laptörténettel együttvéve. A funkció hasznos lehet pl. oldalak két ágra bontásánál.',
	'duplicator-options'               => 'Beállítások',
	'duplicator-source'                => 'Forrás:',
	'duplicator-dest'                  => 'Cél:',
	'duplicator-dotalk'                => 'Vitalap másolása (ha lehetséges)',
	'duplicator-submit'                => 'Másolás',
	'duplicator-summary'               => '[[$1]] másolata',
	'duplicator-success'               => "<big>'''[[$1]] átmásolva [[$2]] névre.'''</big>",
	'duplicator-success-revisions'     => '$1 változat lett átmásolva.',
	'duplicator-success-talkcopied'    => 'A vitalap is át lett másolva.',
	'duplicator-success-talknotcopied' => 'A vitalap másolása nem sikerült.',
	'duplicator-failed'                => 'Az oldalt nem sikerült lemásolni. Ismeretlen hiba történt.',
	'duplicator-source-invalid'        => 'Adj meg egy érvényes forráscímet.',
	'duplicator-source-notexist'       => '[[$1]] nem létezik. Add meg egy olyan lapnak a címét, amely létezik.',
	'duplicator-dest-invalid'          => 'Adj meg egy érvényes címet.',
	'duplicator-dest-exists'           => '[[$1]] már létezik. Add meg egy olyan oldal címet, amely még nem létezik.',
	'duplicator-toomanyrevisions'      => '[[$1]] túl sok ($2) változattal rendelkezik, ezért nem másolható. A jelenlegi határ $3.',
);

/* Indonesia (Ivan Lanin) */
$messages['id'] = array(
	'duplicator' => 'Duplikasikan suatu artikel',
	'duplicator-toolbox' => 'Duplikasikan artikel ini',
	'duplicator-header' => 'Halaman ini menyediakan fasilitas untuk membuat duplikat lengkap suatu artikel, membuat salinan independen dari semua versi terdahulu. Hal ini berguna untuk mencabangkan artikel, dll.',
	'duplicator-options' => 'Opsi',
	'duplicator-source' => 'Sumber:',
	'duplicator-dest' => 'Tujuan:',
	'duplicator-dotalk' => 'Duplikasikan halaman pembicaraan (jika tersedia)',
	'duplicator-submit' => 'Duplikasi',
	'duplicator-summary' => 'Disalin dari [[$1]]',
	'duplicator-success' => "<big>'''[[$1]] telah disalin ke [[$2]].'''</big>",
	'duplicator-success-revisions' => '$1 revisi telah disalin.',
	'duplicator-success-talkcopied' => 'Halaman pembicaraan juga telah disalin.',
	'duplicator-success-talknotcopied' => 'Halaman pembicaraan tidak dapat disalin.',
	'duplicator-failed' => 'Halaman tidak dapat diduplikasi. Telah terjadi suatu kesalahan yang tak dikenal.',
	'duplicator-source-invalid' => 'Harap masukkan judul sumber yang sah.',
	'duplicator-source-notexist' => '[[$1]] tidak ditemukan. Harap masukkan judul halaman yang sudah ada.',
	'duplicator-dest-invalid' => 'Harap masukkan judul tujuan yang sah.',
	'duplicator-dest-exists' => '[[$1]] telah ada. Harap berikan judul tujuan yang halamannya belum ada.',
	'duplicator-toomanyrevisions' => '[[$1]] memiliki terlalu banyak ($2) revisi dan tidak dapat disalin. Limit saat ini adalah $3.',
);

/* Italian (BrokenArrow) */
$messages['it'] = array(
	'duplicator' => 'Duplica una pagina',
	'duplicator-toolbox' => 'Duplica questa pagina',
	'duplicator-header' => "Questa pagina speciale consente la duplicazione completa di una pagina, dando origine a due copie distinte della relativa cronologia. Tale operazione può essere utile per scindere due pagine (''forking''), ecc.",
	'duplicator-options' => 'Opzioni',
	'duplicator-source' => 'Pagina di partenza:',
	'duplicator-dest' => 'Pagina di arrivo:',
	'duplicator-dotalk' => 'Duplica anche la pagina di discussione, se esiste',
	'duplicator-submit' => 'Duplica',
	'duplicator-summary' => 'Pagina copiata da [[$1]]',
	'duplicator-success' => "<big>La pagina '''[[$1]] è stata copiata in [[$2]].'''</big>",
	'duplicator-success-revisions' => '$1 {{PLURAL:$1|revisione copiata|revisioni copiate}}.',
	'duplicator-success-talkcopied' => 'Anche la pagina di discussione è stata copiata.',
	'duplicator-success-talknotcopied' => 'Impossibile copiare la pagina di discussione.',
	'duplicator-failed' => 'Impossibile duplicare la pagina. Errore sconosciuto.',
	'duplicator-source-invalid' => 'Indicare un titolo di partenza valido.',
	'duplicator-source-notexist' => 'La pagina [[$1]] non esiste. Indicare il titolo di una pagina esistente.',
	'duplicator-dest-invalid' => 'Indicare un titolo di arrivo valido.',
	'duplicator-dest-exists' => 'La pagina [[$1]] esiste già. Indicare un titolo di arrivo non ancora esistente.',
	'duplicator-toomanyrevisions' => 'Impossibile copiare [[$1]]. La pagina ha troppe revisioni ($2). Il limite attuale è $3.',
);
/* Japanese */
$messages['ja'] = array(
	'duplicator' => 'ページの複製',
	'duplicator-toolbox' => 'このページを複製',
	'duplicator-header' => 'ここではではページを複製することができます。履歴を含む同じ内容の複製が新たに作成されます。記事の分割などに利用してください。',
	'duplicator-options' => '設定',
	'duplicator-source' => '複製元:',
	'duplicator-dest' => '複製先:',
	'duplicator-dotalk' => '可能ならノートも複製する',
	'duplicator-submit' => '複製',
	'duplicator-summary' => '[[$1]] を複製しました。',
	'duplicator-success' => '<big>\'\'\'[[$1]] を [[$2]] へ複製しました\'\'\'</big>',
	'duplicator-success-revisions' => '$1 版を複製しました。',
	'duplicator-success-talkcopied' => 'ノートページも複製しました。',
	'duplicator-success-talknotcopied' => 'ノートは複製できませんでした。',
	'duplicator-failed' => '不明なエラーです。このページの複製に失敗しました。',
	'duplicator-source-invalid' => '複製元に有効なタイトルを指定してください。',
	'duplicator-source-notexist' => '[[$1]] は既に存在しています。複製元には存在するページを指定してください。',
	'duplicator-dest-invalid' => '複製先に有効なタイトルを指定してください。',
	'duplicator-dest-exists' => '[[$1]] は既に存在しています。複製先には存在しないページを指定してください。',
	'duplicator-toomanyrevisions' => '[[$1]] は版が多すぎるため（$2 版）複製できません。現在の上限は $3 版までです。',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'duplicator-options'               => 'Méiglechkeeten',
	'duplicator-source'                => 'Quell:',
	'duplicator-submit'                => 'Säit duplizéieren',
	'duplicator-summary'               => 'Vun [[$1]] kopéiert',
	'duplicator-success-revisions'     => '$1 {{PLURAL:$1|Versioun gouf|Versioune goufe}} kopéiert.',
	'duplicator-success-talkcopied'    => "D'Diskussiounssäit gouf och kopéiert.",
	'duplicator-success-talknotcopied' => "D'Diskussiounssäit konnt net kopéiert ginn.",
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'duplicator-options' => 'Opschonen',
	'duplicator-source'  => 'Born:',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'duplicator'                       => 'Kopieer een pagina',
	'duplicator-desc'                  => "Maakt onafhankelijke kopieën van pagina's met een volledige bewerkingsgeschiedenis",
	'duplicator-toolbox'               => 'Kopieer deze pagina',
	'duplicator-header'                => 'Deze pagina maakt het mogelijk een pagina volledig te kopiëren, waardoor er onafhankelijke
kopieën ontstaan met een volledige geschiedenis. Dit is handig voor forks, enzovoort.',
	'duplicator-options'               => 'Opties',
	'duplicator-source'                => 'Bron:',
	'duplicator-dest'                  => 'Doel:',
	'duplicator-dotalk'                => 'Kopieer overlegpagina (als van toepassing)',
	'duplicator-submit'                => 'Kopiëren',
	'duplicator-summary'               => 'Gekopieerd van [[$1]]',
	'duplicator-success'               => "<big>'''[[$1]] is gekopieerd naar [[$2]].'''</big>",
	'duplicator-success-revisions'     => '$1 versies gekopieerd.',
	'duplicator-success-talkcopied'    => 'De overlegpagina is ook gekopieerd.',
	'duplicator-success-talknotcopied' => 'De overlegpagina kon niet gekopieerd worden.',
	'duplicator-failed'                => 'De pagina kon niet gekopieerd worden. Er is een onbekende fout opgetreden.',
	'duplicator-source-invalid'        => 'Geef alstublieft een geldige bronpagina op.',
	'duplicator-source-notexist'       => '[[$1]] bestaat niet. Geef alstublieft een pagina op die bestaat.',
	'duplicator-dest-invalid'          => 'Geef alstublieft een geldige doelpagina op.',
	'duplicator-dest-exists'           => '[[$1]] bestaat al. Geeft alstublieft een doelpagina op die niet bestaat.',
	'duplicator-toomanyrevisions'      => '[[$1]] heeft te veel versies ($2) en kan niet gekopieerd worden. De huidige limiet is $3.',
);

/** Norwegian (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'duplicator'                       => 'Kopier en side',
	'duplicator-toolbox'               => 'Kopier denne siden',
	'duplicator-header'                => 'Denne siden muliggjør fullstendig kopiering av en side, med uavhengige kopier av all historikk. Dette er nyttig for oppdeling av sider, etc.',
	'duplicator-options'               => 'Alternativer',
	'duplicator-source'                => 'Kilde:',
	'duplicator-dest'                  => 'Mål:',
	'duplicator-dotalk'                => 'Kopier diskusjonsside (om mulig)',
	'duplicator-submit'                => 'Kopier',
	'duplicator-summary'               => 'Kopiert fra [[$1]]',
	'duplicator-success'               => "<big>'''[[$1]]''' ble kopiert til [[$2]].'''</big>",
	'duplicator-success-revisions'     => '$1 {{PLURAL:$1|revisjon|revisjoner}} ble kopiert.',
	'duplicator-success-talkcopied'    => 'Diskusjonssiden ble også kopiert.',
	'duplicator-success-talknotcopied' => 'Diskusjonssiden kunne ikke kopieres.',
	'duplicator-failed'                => 'Siden kunne ikke kopieres. En ukjent feil forekom.',
	'duplicator-source-invalid'        => 'Vennligst angi en gyldig kildetittel.',
	'duplicator-source-notexist'       => '[[$1]] finnes ikike. Oppgi tittelen til en eksisterende side.',
	'duplicator-dest-invalid'          => 'Angi en gyldig måltittel.',
	'duplicator-dest-exists'           => '[[$1]] finnes allerede. Oppgi en måltittel som ikke eksisterer.',
	'duplicator-toomanyrevisions'      => '[[$1]] har for mange revisjoner, og kan ikke kopieres. Nåværende grense er $3.',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'duplicator'                       => 'Duplicar un article',
	'duplicator-toolbox'               => 'Duplicar aqueste article',
	'duplicator-header'                => 'Aquesta pagina permet la duplicacion complèta d’un article, en creant doas versions independentas de l’istoric complet. Servís per exemple a separar un article en dos.',
	'duplicator-options'               => 'Opcions',
	'duplicator-source'                => 'Font:',
	'duplicator-dest'                  => 'Destinacion:',
	'duplicator-dotalk'                => 'Duplicar la pagina de discussion (se existís)',
	'duplicator-submit'                => 'Duplicar',
	'duplicator-summary'               => 'Copiat dempuèi [[$1]]',
	'duplicator-success'               => "<big>'''[[$1]] es estat copiat vèrs [[$2]].'''</big>",
	'duplicator-success-revisions'     => '$1 {{PLURAL:$1|revision es estada copiada|revisions son estadas copiadas}}.',
	'duplicator-success-talkcopied'    => 'La pagina de discussion es estada copiada tanben.',
	'duplicator-success-talknotcopied' => 'La pagina de discussion es pas pogut èsser copiada.',
	'duplicator-failed'                => 'La pagina es pas pogut èsser duplicada. Una error desconeguda s’es producha.',
	'duplicator-source-invalid'        => 'Donatz un nom valid per l’article.',
	'duplicator-source-notexist'       => '[[$1]] existís pas. Donatz lo nom d’un article existent.',
	'duplicator-dest-invalid'          => 'Donatz un nom valid per la destinacion.',
	'duplicator-dest-exists'           => '[[$1]] existís ja. Donatz lo nom d’un article qu’existís pas encara.',
	'duplicator-toomanyrevisions'      => '[[$1]] a tròp ($2) de revisions e pòt pas èsser copiat. La limita actuala es de $3.',
);

/** Polish (Polski)
 * @author Derbeth
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'duplicator'                       => 'Duplikowanie strony',
	'duplicator-toolbox'               => 'Duplikuj tą stronę',
	'duplicator-header'                => 'Ta strona pozwala na stworzenie kompletnego duplikatu artykułu, tworząc niezależne kopie aktualnej treści wraz z pełną historią zmian. Jest to przydatne przy rozwidlaniu (klonowaniu) artykułów itp.',
	'duplicator-options'               => 'Opcje',
	'duplicator-source'                => 'Źródło:',
	'duplicator-dest'                  => 'Cel:',
	'duplicator-dotalk'                => 'Zduplikuj stronę dyskusji (jeśli istnieje)',
	'duplicator-submit'                => 'Duplikuj',
	'duplicator-summary'               => 'Skopiowano z [[$1]]',
	'duplicator-success'               => "<big>'''Artykuł [[$1]] został skopiowany do [[$2]].'''</big>",
	'duplicator-success-revisions'     => '$1 {{PLURAL:$1|edycja została skopiowana|edycji zostało skopiowanych}}.',
	'duplicator-success-talkcopied'    => 'Strona dyskusji również została skopiowana.',
	'duplicator-success-talknotcopied' => 'Strona dyskusji nie mogła być skopiowana.',
	'duplicator-failed'                => 'Strona nie może zostać zduplikowana. Wystąpił nieznany błąd.',
	'duplicator-source-invalid'        => 'Podaj poprawny tytuł źródła.',
	'duplicator-source-notexist'       => 'Artykuł [[$1]] nie istnieje. Podaj tytuł strony, która istnieje.',
	'duplicator-dest-invalid'          => 'Podaj poprawny tytuł celu.',
	'duplicator-dest-exists'           => 'Artykuł [[$1]] już istnieje. Wybierz tytuł celu, który nie jest używany przez istniejącą stronę.',
	'duplicator-toomanyrevisions'      => 'Artykuł [[$1]] ma zbyt dużo ($2) edycji i nie może być skopiowany. Aktualny limit edycji to $3.',
);

/** Piemontèis (Piemontèis)
 * @author Bèrto 'd Sèra
 */
$messages['pms'] = array(
	'duplicator'                       => "Dupliché n'artìcol",
	'duplicator-toolbox'               => "Sdobié st'artìcol-sì",
	'duplicator-header'                => "Sòn a lassa feje na duplicassion completa a n'artìcol, ën fasend-ne ëdcò la còpia dla stòria. A ven motobin a taj quand n'artìcol a ven tròp gròss e a venta sdobielo, e via fòrt",
	'duplicator-options'               => 'Opsion',
	'duplicator-source'                => 'Sorgiss:',
	'duplicator-dest'                  => 'Destinassion:',
	'duplicator-dotalk'                => "Dupliché ëdcò la pàgina ëd discussion (s'a-i é)",
	'duplicator-submit'                => 'Dùplica',
	'duplicator-summary'               => 'Copià da [[$1]]',
	'duplicator-success'               => "<big>La pàgina '''[[$1]] a l'é staita sdobià con la còpia neuva an [[$2]].'''</big>",
	'duplicator-success-revisions'     => "$1 revision {{PLURAL:$1|a l'é staita|a son ëstaite}} copià.",
	'duplicator-success-talkcopied'    => "A l'é sdobiasse ëdcò la pàgina ëd discussion.",
	'duplicator-success-talknotcopied' => "La pàgina ëd discussion a l'é pa podusse sdobié.",
	'duplicator-failed'                => "Sta pàgina a l'é pa podusse dupliché. A l'é riva-ie n'eror nen identificà.",
	'duplicator-source-invalid'        => "Për piasì ch'a-i buta un tìtol bon ant la sorgiss",
	'duplicator-source-notexist'       => "[[$1]] a-i é pa. Për piasì, ch'a buta ël tìtol ëd na pàgina ch'a-i sia.",
	'duplicator-dest-invalid'          => "Për piasì, ch'a-i buta un tìtol bon ant la destinassion",
	'duplicator-dest-exists'           => "[[$1]] a-i é già. Për piasì, ch'a buta un tìtol ch'a-i sia anco' nen.",
	'duplicator-toomanyrevisions'      => "[[$1]] a l'ha tròpe ($2) revision e as peul pa copiesse. Al dì d'ancheuj ël màssim a l'é $3.",
);

/** Portuguese (Português)
 * @author Malafaya
 * @author 555
 */
$messages['pt'] = array(
	'duplicator'                       => 'Duplicar uma página',
	'duplicator-desc'                  => 'Criar cópias independentes de páginas com histórico completo de edições',
	'duplicator-toolbox'               => 'Duplicar esta página',
	'duplicator-header'                => 'Esta página permite a duplicação completa de uma página de conteúdo, criando cópias independentes de todo o seu histórico. Isto é útil para separar versões de páginas, etc.',
	'duplicator-options'               => 'Opções',
	'duplicator-source'                => 'Fonte:',
	'duplicator-dest'                  => 'Destino:',
	'duplicator-dotalk'                => 'Duplicar página de discussão (se aplicável)',
	'duplicator-submit'                => 'Duplicar',
	'duplicator-summary'               => 'Copiado de [[$1]]',
	'duplicator-success'               => "<big>'''[[$1]] foi copiada para [[$2]].'''</big>",
	'duplicator-success-revisions'     => '$1 {{PLURAL:$1|revisão foi copiada|revisões foram copiadas}}.',
	'duplicator-success-talkcopied'    => 'A página de discussão foi também copiada.',
	'duplicator-success-talknotcopied' => 'A página de discussão não pôde ser copiada.',
	'duplicator-failed'                => 'A página não pôde ser duplicada. Ocorreu um erro desconhecido.',
	'duplicator-source-invalid'        => 'Por favor, forneça um título fonte válido.',
	'duplicator-source-notexist'       => '[[$1]] não existe. Por favor, forneça o título de uma página que exista.',
	'duplicator-dest-invalid'          => 'Por favor, forneça um título de destino válido.',
	'duplicator-dest-exists'           => '[[$1]] já existe. Por favor, forneça um título de destino que ainda não exista.',
	'duplicator-toomanyrevisions'      => '[[$1]] possui demasiadas ($2) revisões e não pode ser copiada. O limite actual é $3.',
);

/* Russian */
$messages['ru'] = array(
	'duplicator' => 'Клонировать статью',
	'duplicator-toolbox' => 'Клонировать статью',
	'duplicator-header' => 'Эта страница позволяет полностью клонировать статью, создать независимую копию истории её изменений. Данная функция полезна при разделении статьи на две отдельные.',
	'duplicator-options' => 'Настройки',
	'duplicator-source' => 'Откуда:',
	'duplicator-dest' => 'Куда:',
	'duplicator-dotalk' => 'Клонировать страницу обсуждения (если возможно)',
	'duplicator-submit' => 'Клонировать',
	'duplicator-summary' => 'Копия [[$1]]',
	'duplicator-success' => "<big>'''[[$1]] клонирована в [[$2]].'''</big>",
	'duplicator-success-revisions' => '$1 {{PLURAL:$1|изменение было|изменения было|изменений было}} скопировано.',
	'duplicator-success-talkcopied' => 'Страница обсуждения была скопирована.',
	'duplicator-success-talknotcopied' => 'Страница обсуждения не была скопирована.',
	'duplicator-failed' => 'Страница не может быть клопирована. Неизвестная ошибка.',
	'duplicator-source-invalid' => 'Пожалуйста, введите корректное название статьи-источника.',
	'duplicator-source-notexist' => 'Страница «[[$1]]» не существует. Пожалуйста, введите название страницы, которая существует.',
	'duplicator-dest-invalid' => 'Пожалуйста введите корректное название страницы-назначения.',
	'duplicator-dest-exists' => 'Страница «[[$1]]» уже существует. Пожалуйста, введите название несуществующей страницы-назначения.',
	'duplicator-toomanyrevisions' => 'Страница «[[$1]]» имеет слишком много ($2) изменений. Текущим ограничением является $3.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'duplicator'                       => 'Duplikovať stránku',
	'duplicator-desc'                  => 'Vytvorí nezávislé kópie stránok s úplnou históriou úprav',
	'duplicator-toolbox'               => 'Duplikovať túto stránku',
	'duplicator-header'                => 'Táto stránka umožňuje kompletnú duplikáciu stránky, čím sa vytvorí nazávislá kópia všetkých histórií. Je to užitočné napríklad pri vetvení a pod.',
	'duplicator-options'               => 'Možnosti',
	'duplicator-source'                => 'Zdroj:',
	'duplicator-dest'                  => 'Cieľ:',
	'duplicator-dotalk'                => 'Duplikovať aj diskusnú stránku (ak existuje)',
	'duplicator-submit'                => 'Duplikovať',
	'duplicator-summary'               => 'Skopírované z [[$1]]',
	'duplicator-success'               => "<big>Vytvorená kópia '''[[$1]] na [[$2]].'''</big>",
	'duplicator-success-revisions'     => '{{PLURAL:$1|Skopírovaná $1 revízia|Skopírované $1 revízie|Skopírovaných $1 revízií}}.',
	'duplicator-success-talkcopied'    => 'Diskusné stránky boli tiež skopírované.',
	'duplicator-success-talknotcopied' => 'Nebolo možné skopírovať diskusné stránky.',
	'duplicator-failed'                => 'Túto stránku nebolo možné duplikovať. Vyskytla sa neznáma chyba.',
	'duplicator-source-invalid'        => 'Poskytnite platný názov zdrojovej stránky.',
	'duplicator-source-notexist'       => '[[$1]] neexistuje. Poskytnite názov zdrojovej stránky, ktorá už existuje.',
	'duplicator-dest-invalid'          => 'Prosím, zadajte platný názov cieľovej stránky.',
	'duplicator-dest-exists'           => '[[$1]] už existuje. Prosím zadajte cieľ, ktorý ešte neexistuje.',
	'duplicator-toomanyrevisions'      => '[[$1]] má príliš veľa ($2) revízií a preto ho nie je možné skopírovať. Aktuálny limit je $3.',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'duplicator'                       => 'Ne Siede duplizierje',
	'duplicator-toolbox'               => 'Duplizierje disse Siede',
	'duplicator-header'                => 'Mäd disse Spezialsiede konnen Sieden komplett duplizierd wäide. Deerbie wäd ju ganse Versionsgeschichte uurnuumen. Dit kon biespilswiese nutselk weese, uum ne Siede in Unnersieden aptoudeelen.',
	'duplicator-options'               => 'Optione',
	'duplicator-source'                => 'Wälle:',
	'duplicator-dest'                  => 'Siel:',
	'duplicator-dotalk'                => 'Diskussionssiede mee kopierje (wan muugelk)',
	'duplicator-submit'                => 'Siede duplizierje',
	'duplicator-summary'               => '[[$1]] wuude duplizierd',
	'duplicator-success'               => "<big>'''[[$1]] wuude ätter [[$2]] kopierd.'''</big>",
	'duplicator-success-revisions'     => '{{PLURAL:$1|1 Version wuude|$1 Versione wuuden}} duplizierd.',
	'duplicator-success-talkcopied'    => 'Ju Diskussionssiede wuude uk duplizierd.',
	'duplicator-success-talknotcopied' => 'Ju Diskussionssiede kuude nit duplizierd wäide.',
	'duplicator-failed'                => 'Ju Siede kuude nit duplizierd wäide, deer n uunbekoanden Failer aptried.',
	'duplicator-source-invalid'        => 'Reek ne gultige Wälle-Siede an.',
	'duplicator-source-notexist'       => 'Ju Siede [[$1]] bestoant nit. Reek ne bestoundende Siede an.',
	'duplicator-dest-invalid'          => 'Reek ne gultige Siel-Siede an.',
	'duplicator-dest-exists'           => 'Ju Siede [[$1]] bestoant al. Reek ne nit bestoundende Siede an.',
	'duplicator-toomanyrevisions'      => 'Ju Siede [[$1]] häd $2 Versione, un kon deeruum nit duplizierd wäide. Der konnen bloot Sieden mäd maximoal $3 Versione duplizierd wäide.',
);

/** Swedish (Svenska)
 * @author Lejonel
 */
$messages['sv'] = array(
	'duplicator'                       => 'Duplicera en sida',
	'duplicator-toolbox'               => 'Duplicera denna sida',
	'duplicator-header'                => 'Med den här specialsidan är det möjligt att duplicera en sida, och på så sätt skapa två oberoende versioner av hela dess historik. Det kan vara användbart t.ex. om en sida ska delas upp på flera sidor.',
	'duplicator-options'               => 'Alternativ',
	'duplicator-source'                => 'Källsida:',
	'duplicator-dest'                  => 'Målsida:',
	'duplicator-dotalk'                => 'Duplicera (om möjligt) även diskussionssidan',
	'duplicator-submit'                => 'Duplicera',
	'duplicator-summary'               => 'Kopierad från [[$1]]',
	'duplicator-success'               => "<big>'''[[$1]] kopierades till [[$2]].'''</big>",
	'duplicator-success-revisions'     => '$1 {{PLURAL:$1|sidversion|sidversioner}} kopierades.',
	'duplicator-success-talkcopied'    => 'Diskussionssidan kopierades också.',
	'duplicator-success-talknotcopied' => 'Diskussionssidan kunde inte dupliceras.',
	'duplicator-failed'                => 'Sidan kunde inte dupliceras. Ett okänt fel inträffade.',
	'duplicator-source-invalid'        => 'Du har inte angivit någon giltig källsida.',
	'duplicator-source-notexist'       => '[[$1]] finns inte. Du måste ange en källsida som existerar.',
	'duplicator-dest-invalid'          => 'Du har inte angivit någon giltig målsida.',
	'duplicator-dest-exists'           => '[[$1]] finns redan. Du måste ange en målsida som inte finns.',
	'duplicator-toomanyrevisions'      => '[[$1]] kan inte dupliceras eftersom den har för många ($2) versioner. Gränsen för duplicering är $3 sidversioner.',
);

/** Turkish (Türkçe)
 * @author Karduelis
 */
$messages['tr'] = array(
	'duplicator-options' => 'Seçenekler',
	'duplicator-source'  => 'Kaynak:',
	'duplicator-dest'    => 'Hedef:',
);

/* Cantonese (Shinjiman) */
$messages['yue'] = array(
	'duplicator' => '複製一篇文章',
	'duplicator-toolbox' => '複製呢篇文章',
	'duplicator-header' => '呢一版可以完全複製一篇文章，建立一個完整嘅修訂歷史。呢個係對於文章分叉等嘅動作係好有用嘅。',
	'duplicator-options' => '選項',
	'duplicator-source' => '來源:',
	'duplicator-dest' => '目標:',
	'duplicator-dotalk' => '複製討論頁 (如可用嘅話)',
	'duplicator-submit' => '複製',
	'duplicator-summary' => '由[[$1]]複製過來',
	'duplicator-success' => "<big>'''[[$1]]已經複製到[[$2]]。'''</big>",
	'duplicator-success-revisions' => '$1個修訂已經複製。',
	'duplicator-success-talkcopied' => '個討論頁亦都複製咗。',
	'duplicator-success-talknotcopied' => '個討論頁唔能夠複製。',
	'duplicator-failed' => '呢一版唔能夠複製落來。未知嘅錯誤發生咗。',
	'duplicator-source-invalid' => '請提供一個正確嘅來源標題。',
	'duplicator-source-notexist' => '[[$1]]並唔存在。請提供一個已經存在嘅版面標題。',
	'duplicator-dest-invalid' => '請提供一個正確嘅目標標題。',
	'duplicator-dest-exists' => '[[$1]]已經存在。請提供一個未存在嘅目標標題。',
	'duplicator-toomanyrevisions' => '[[$1]]有太多 ($2次) 修訂，唔能夠複製。現時嘅上限係有$3次。',
);

/* Chinese (Simplified) (Shinjiman) */
$messages['zh-hans'] = array(
	'duplicator' => '复制一篇文章',
	'duplicator-toolbox' => '复制这篇文章',
	'duplicator-header' => '这一版可以完全复制一篇文章，建立一个完整的修订历史。这对于文章分叉等的动作是很有用的。',
	'duplicator-options' => '选项',
	'duplicator-source' => '来源:',
	'duplicator-dest' => '目标:',
	'duplicator-dotalk' => '复制讨论页 (如可用的话)',
	'duplicator-submit' => '复制',
	'duplicator-summary' => '由[[$1]]复制过来',
	'duplicator-success' => "<big>'''[[$1]]已经复制到[[$2]]。'''</big>",
	'duplicator-success-revisions' => '$1个修订已经复制。',
	'duplicator-success-talkcopied' => '讨论页亦已经复制。',
	'duplicator-success-talknotcopied' => '讨论页不能够复制。',
	'duplicator-failed' => '这一页唔能够复制落来。发生了未知的错误。',
	'duplicator-source-invalid' => '请提供一个正确的来源标题。',
	'duplicator-source-notexist' => '[[$1]]并不存在。请提供一个已经存在的页面标题。',
	'duplicator-dest-invalid' => '请提供一个正确的目标标题。',
	'duplicator-dest-exists' => '[[$1]]已经存在。请提供一个未存在的目标标题。',
	'duplicator-toomanyrevisions' => '[[$1]]有太多 ($2次) 修订，不能够复制。当前的上限有$3次。',
);

/* Chinese (Traditional) (Shinjiman) */
$messages['zh-hant'] = array(
	'duplicator' => '複製一篇文章',
	'duplicator-toolbox' => '複製這篇文章',
	'duplicator-header' => '這一版可以完全複製一篇文章，建立一個完整的修訂歷史。這對於文章分叉等的動作是很有用的。',
	'duplicator-options' => '選項',
	'duplicator-source' => '來源:',
	'duplicator-dest' => '目標:',
	'duplicator-dotalk' => '複製討論頁 (如可用的話)',
	'duplicator-submit' => '複製',
	'duplicator-summary' => '由[[$1]]複製過來',
	'duplicator-success' => "<big>'''[[$1]]已經複製到[[$2]]。'''</big>",
	'duplicator-success-revisions' => '$1個修訂已經複製。',
	'duplicator-success-talkcopied' => '討論頁亦已經複製。',
	'duplicator-success-talknotcopied' => '討論頁不能夠複製。',
	'duplicator-failed' => '這一頁唔能夠複製落來。發生了未知的錯誤。',
	'duplicator-source-invalid' => '請提供一個正確的來源標題。',
	'duplicator-source-notexist' => '[[$1]]並不存在。請提供一個已經存在的頁面標題。',
	'duplicator-dest-invalid' => '請提供一個正確的目標標題。',
	'duplicator-dest-exists' => '[[$1]]已經存在。請提供一個未存在的目標標題。',
	'duplicator-toomanyrevisions' => '[[$1]]有太多 ($2次) 修訂，不能夠複製。目前的上限有$3次。',
);

