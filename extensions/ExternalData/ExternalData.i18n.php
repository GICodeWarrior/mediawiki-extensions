<?php
/**
 * Internationalization file for the External Data extension
 *
 * @addtogroup Extensions
 */

$messages = array();

/** English
 * @author Yaron Koren
 */
$messages['en'] = array(
	// user messages
	'getdata' => 'Get data',
	'externaldata-desc' => 'Allows for retrieving data in CSV, JSON and XML formats from both external URLs and local wiki pages',
	'externaldata-ldap-unable-to-connect' => 'Unable to connect to $1',
	'externaldata-json-decode-not-supported' => 'Error: json_decode() is not supported in this version of PHP',
	'externaldata-xml-error' => 'XML error: $1 at line $2',
	'externaldata-db-incomplete-information' => 'Error: Incomplete information for this server ID.',
	'externaldata-db-could-not-get-url' => 'Could not get URL after $1 {{PLURAL:$1|try|tries}}.',
	'externaldata-db-unknown-type' => 'Error: Unknown database type.',
	'externaldata-db-could-not-connect' => 'Error: Could not connect to database.',
	'externaldata-db-no-return-values' => 'Error: No return values specified.',
	'externaldata-db-invalid-query' => 'Invalid query.',
);

/** Message documentation (Message documentation)
 * @author Dead3y3
 * @author Fryed-peach
 */
$messages['qqq'] = array(
	'externaldata-desc' => '{{desc}}',
);

/** Arabic (العربية)
 * @author Meno25
 * @author OsamaK
 */
$messages['ar'] = array(
	'getdata' => 'الحصول على البيانات',
	'externaldata-desc' => 'يسمح باسترجاع البيانات بصيغة CSV، JSON و XML من مسارات خارجية وصفحات الويكي المحلية',
	'externaldata-ldap-unable-to-connect' => 'تعذّر الاتصال ب$1',
	'externaldata-json-decode-not-supported' => 'خطأ: json_decode() غير مدعوم في نسخة PHP هذه',
	'externaldata-xml-error' => 'خطأ XML: $1 عند السطر $2',
	'externaldata-db-incomplete-information' => 'خطأ: معلومات غير كاملة عن هوية هذا الخادوم.',
	'externaldata-db-could-not-get-url' => 'تعذّر الحصول على المسار بعد {{PLURAL:$1||محاولة واحدة|محاوتين|$1 محاولات|$1 محاولة }}.',
	'externaldata-db-unknown-type' => 'خطأ: نوع قاعدة بيانات غير معروف.',
	'externaldata-db-could-not-connect' => 'خطأ: تعذّر الاتصال بقاعدة البيانات.',
	'externaldata-db-no-return-values' => 'خطأ: لم تحدد أي قيم عائدة.',
	'externaldata-db-invalid-query' => 'استعلام غير صالح.',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 */
$messages['arz'] = array(
	'getdata' => 'الحصول على البيانات',
	'externaldata-desc' => 'يسمح باسترجاع البيانات بصيغة CSV، JSON و XML من مسارات خارجية وصفحات الويكى المحلية',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 */
$messages['be-tarask'] = array(
	'getdata' => 'Атрымаць зьвесткі',
	'externaldata-desc' => 'Дазваляе атрымліваць зьвесткі ў фарматах CSV, JSON і XML з вонкавых крыніц і лякальных старонак вікі',
	'externaldata-ldap-unable-to-connect' => 'Немагчыма далучыцца да $1',
	'externaldata-json-decode-not-supported' => 'Памылка: json_decode() не падтрымліваецца ў гэтай вэрсіі PHP',
	'externaldata-xml-error' => 'Памылка XML: $1 у радку $2',
	'externaldata-db-incomplete-information' => 'Памылка: Няпоўная інфармацыя для гэтага ідэнтыфікатара сэрвэра.',
	'externaldata-db-could-not-get-url' => 'Немагчыма атрымаць URL-адрас пасьля $1 {{PLURAL:$1|спробы|спробаў|спробаў}}.',
	'externaldata-db-unknown-type' => 'Памылка: Невядомы тып базы зьвестак.',
	'externaldata-db-could-not-connect' => 'Памылка: Немагчыма далучыцца да базы зьвестак.',
	'externaldata-db-no-return-values' => 'Памылка: Не пазначаныя выніковыя значэньні.',
	'externaldata-db-invalid-query' => 'Няслушны запыт.',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'getdata' => 'Uzmi podatke',
	'externaldata-desc' => 'Omogućuje za preuzimanje podataka u formatima CSV, JSON i XML za vanjske URLove i lokalnu wiki',
	'externaldata-ldap-unable-to-connect' => 'Ne može se spojiti na $1',
	'externaldata-json-decode-not-supported' => 'Greška: json_decode() nije podržan u ovoj PHP verziji',
	'externaldata-xml-error' => 'XML greška: $1 na liniji $2',
	'externaldata-db-incomplete-information' => 'Greška: Nepotpune informacije za ovaj ID servera.',
	'externaldata-db-could-not-get-url' => 'Nije pronađen URL nakon $1 {{PLURAL:$1|pokušaja|pokušaja}}.',
	'externaldata-db-unknown-type' => 'Greška: Nepoznat tip baze podataka.',
	'externaldata-db-could-not-connect' => 'Greška: Ne može se spojiti na bazu podataka.',
	'externaldata-db-no-return-values' => 'Greška: Nije navedena povratna vrijednost.',
	'externaldata-db-invalid-query' => 'Nevaljan upit.',
);

/** Catalan (Català)
 * @author Paucabot
 * @author Solde
 */
$messages['ca'] = array(
	'getdata' => 'Obtenir dades',
	'externaldata-xml-error' => 'Error XML: $1 a la línia $2',
	'externaldata-db-unknown-type' => 'Error: Tipus de base de dades desconegut.',
	'externaldata-db-could-not-connect' => "Error: No s'ha pogut connectar a la base de dades.",
	'externaldata-db-invalid-query' => 'Consulta no vàlida.',
);

/** German (Deutsch)
 * @author Imre
 * @author MF-Warburg
 * @author Purodha
 * @author Umherirrender
 */
$messages['de'] = array(
	'getdata' => 'Daten holen',
	'externaldata-desc' => 'Erlaubt das Einfügen von Daten der Formate CSV, JSON und XML sowohl von externer URL als auch von lokalen Wikiseite',
	'externaldata-ldap-unable-to-connect' => 'Keine Verbindung zu $1',
	'externaldata-json-decode-not-supported' => 'Fehler: json_decode() wird nicht von dieser PHP-Version unterstützt',
	'externaldata-xml-error' => 'XML-Fehler: $1 in Zeile $2',
	'externaldata-db-incomplete-information' => 'Fehler: Unvollständige Informationen für diese Server-ID.',
	'externaldata-db-could-not-get-url' => 'URL konnte nach $1 {{PLURAL:$1|Versuch|Versuchen}} nicht abgerufen werden.',
	'externaldata-db-unknown-type' => 'Fehler: Unbekannter Datenbanktyp.',
	'externaldata-db-could-not-connect' => 'Fehler: Keine Verbindung zur Datenbank.',
	'externaldata-db-no-return-values' => 'Fehler: Keine Rückgabewerte festgelegt.',
	'externaldata-db-invalid-query' => 'Ungültige Abfrage.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'getdata' => 'Daty wobstaraś',
	'externaldata-desc' => 'Zmóžnja wótwołanje datow w formatach CSV, JSON a XML ako z eksternych URL tak teke lokalnych wikijowych bokow',
	'externaldata-ldap-unable-to-connect' => 'Njemóžno z $1 zwězaś',
	'externaldata-json-decode-not-supported' => 'Zmólka: json_decode() njepódpěra se w toś tej wersiji PHP',
	'externaldata-xml-error' => 'Zmólka XML: $1 na smužce $2',
	'externaldata-db-incomplete-information' => "'''Zmólka: Njedopołne informacije za toś ten serwerowy ID.'''",
	'externaldata-db-could-not-get-url' => 'Njemóžno URL pó $1 {{PLURAL:$1|wopyśe|wopytoma|wopytach|wopytach}} dostaś.',
	'externaldata-db-unknown-type' => "'''Zmólka: Njeznata datowa banka.'''",
	'externaldata-db-could-not-connect' => "'''Zmólka: Njemóžno z datoweju banku zwězaś.'''",
	'externaldata-db-no-return-values' => "'''Zmólka: Žedne gódnoty slědkdaśa pódane.'''",
	'externaldata-db-invalid-query' => 'Njepłaśiwe napšašowanje.',
);

/** Greek (Ελληνικά)
 * @author Dead3y3
 * @author Omnipaedista
 */
$messages['el'] = array(
	'getdata' => 'Πάρε δεδομένα',
	'externaldata-desc' => 'Επιτρέπει την ανάκτηση δεδομένων σε μορφές CSV, JSON και XML και για εξωτερικά URLs και για σελίδες του τοπικού wiki',
	'externaldata-xml-error' => 'Σφάλμα XML : $1 στη γραμμή $2',
	'externaldata-db-invalid-query' => 'Άκυρο αίτημα.',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Sanbec
 */
$messages['es'] = array(
	'getdata' => 'Obtener datos',
	'externaldata-desc' => 'Permite la recuperación de datos en formatos CSV, JSON y XML a partir de URL externos y de páginas wiki locales',
);

/** Basque (Euskara)
 * @author Kobazulo
 */
$messages['eu'] = array(
	'getdata' => 'Datuak eskuratu',
);

/** Finnish (Suomi)
 * @author Silvonen
 * @author Str4nd
 */
$messages['fi'] = array(
	'externaldata-ldap-unable-to-connect' => 'Ei voitu yhdistää palvelimelle $1',
	'externaldata-json-decode-not-supported' => 'Virhe: json_decode() ei ole tuettu tässä PHP:n versiossa',
	'externaldata-xml-error' => 'XML-virhe: $1 rivillä $2',
	'externaldata-db-unknown-type' => 'Virhe: Tuntematon tietokantatyyppi.',
);

/** French (Français)
 * @author Crochet.david
 * @author IAlex
 */
$messages['fr'] = array(
	'getdata' => 'Obtenir des données',
	'externaldata-desc' => 'Permet de récupérer des données en CSV, JSON et XML depuis des URL externes et des pages du wiki',
	'externaldata-ldap-unable-to-connect' => 'Impossible de se connecter à $1',
	'externaldata-json-decode-not-supported' => "Erreur : json_decode() n'est pas supportée dans cette version de PHP",
	'externaldata-xml-error' => 'Erreur XML : $1 à la ligne $2',
	'externaldata-db-incomplete-information' => 'Erreur : Informations incomplètes pour cet identifiant de serveur.',
	'externaldata-db-could-not-get-url' => "Impossible d'obtenir l'URL après $1 essai{{PLURAL:$1|s|s}}.",
	'externaldata-db-unknown-type' => 'ERREUR: Type de base de données inconnu.',
	'externaldata-db-could-not-connect' => 'Erreur : Impossible de se connecteur à la base de données.',
	'externaldata-db-no-return-values' => "Erreur : Aucune valeur de retour n'a été spécifiée.",
	'externaldata-db-invalid-query' => 'Requête invalide.',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'getdata' => 'Obter os datos',
	'externaldata-desc' => 'Permite a recuperación de datos en formatos CSV, JSON e XML a partir dos enderezos URL externos e mais das páxinas wiki locais',
	'externaldata-ldap-unable-to-connect' => 'Non se pode conectar a $1',
	'externaldata-json-decode-not-supported' => 'Erro: json_decode() non está soportado nesta versión de PHP',
	'externaldata-xml-error' => 'Erro XML: $1 na liña $2',
	'externaldata-db-incomplete-information' => 'Erro: información incompleta para este ID de servidor.',
	'externaldata-db-could-not-get-url' => 'Non se puido obter o enderezo URL despois de $1 {{PLURAL:$1|intento|intentos}}.',
	'externaldata-db-unknown-type' => 'Erro: tipo de base de datos descoñecido.',
	'externaldata-db-could-not-connect' => 'Erro: non se puido conectar á base de datos.',
	'externaldata-db-no-return-values' => 'Erro: non se especificou ningún valor de retorno.',
	'externaldata-db-invalid-query' => 'Consulta non válida.',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'getdata' => 'Date hole',
	'externaldata-desc' => 'Erlaubt Daten abzruefe im CSV, JSON un XML Format vu extärne URL un lokale Wikisyte',
	'externaldata-ldap-unable-to-connect' => 'Cha kei Verbindig härstellen zue $1',
	'externaldata-json-decode-not-supported' => 'Fähler: json_decode() wird nit unterstitzt in däre Version vu PHP',
	'externaldata-xml-error' => 'XML-Fähler: $1 in dr Zyyle $2',
	'externaldata-db-incomplete-information' => 'Fähler: Nit vollständigi Information fir die Server-ID.',
	'externaldata-db-could-not-get-url' => 'Cha d URL nit finde no $1 {{PLURAL:$1|Versuech|Versuech}}.',
	'externaldata-db-unknown-type' => 'Fähler: Nit bekannte Datebanktyp.',
	'externaldata-db-could-not-connect' => 'Fähler: Cha kei Verbindig härstelle zue dr Datebank.',
	'externaldata-db-no-return-values' => 'Fähler: Kei Ruckgabewärt spezifiziert.',
	'externaldata-db-invalid-query' => 'Nit giltigi Umfrog.',
);

/** Gujarati (ગુજરાતી)
 * @author Ashok modhvadia
 */
$messages['gu'] = array(
	'getdata' => 'માહિતી પ્રાપ્ત કરો',
	'externaldata-desc' => 'બાહ્ય કડીઓ અને સ્થાનિક વિકિ પાનાઓ પરથી CSV, JSON અને XML શૈલીમાં માહિતીની પુન:પ્રાપ્તિની છુટ',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'getdata' => 'קבלת נתונים',
	'externaldata-desc' => 'אפשרות לקבלת נתונים בפורמטים: CSV, JSON ו־XML, גם מכתובות חיצוניות וגם מדפי ויקי מקומיים',
	'externaldata-ldap-unable-to-connect' => 'לא ניתן להתחבר ל־$1',
	'externaldata-json-decode-not-supported' => 'שגיאה: הפקודה json_decode() אינה נתמכת בגרסה זו של PHP',
	'externaldata-xml-error' => 'שגיאת XML: $1 בשורה $2',
	'externaldata-db-incomplete-information' => 'שגיאה: יש רק מידע חלקי על מספר השרת הזה.',
	'externaldata-db-could-not-get-url' => 'לא ניתן לקבל את כתובת ה־URL לאחר {{PLURAL:$1|נסיון אחד|$1 נסיונות}}.',
	'externaldata-db-unknown-type' => 'שגיאה: סוג בסיס הנתונים אינו מוכר.',
	'externaldata-db-could-not-connect' => 'שגיאה: לא ניתן להתחבר אל בסיס הנתונים.',
	'externaldata-db-no-return-values' => 'שגיאה: לא הוגדרו ערכים להחזרה.',
	'externaldata-db-invalid-query' => 'שאילתה בלתי תקינה.',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'getdata' => 'Daty wobstarać',
	'externaldata-desc' => 'Zmóžnja wotwołanje datow we formatach CSV, JSON a XML z eksternych URL kaž tež lokalnych wikijowych stronow',
	'externaldata-ldap-unable-to-connect' => 'Njemóžno z $1 zwjazać',
	'externaldata-json-decode-not-supported' => 'Zmylk: json_decode() so w tutej wersiji PHP njepodpěruje',
	'externaldata-xml-error' => 'Zmylk XML: $1 na lince $2',
	'externaldata-db-incomplete-information' => "'''Zmylk: Njedospołne informacije za ID tutoho serwera.'''",
	'externaldata-db-could-not-get-url' => 'Njebě móžno URL po $1 {{PLURAL:$1|pospyće|pospytomaj|pospytach|pospytach}} dóstać.',
	'externaldata-db-unknown-type' => "'''Zmylk: Njeznaty typ datoweje banki.'''",
	'externaldata-db-could-not-connect' => "'''Zmylk: Njemóžno z datowej banku zwjazać.'''",
	'externaldata-db-no-return-values' => "'''Zmylk: Žane hódnoty wróćenja podate.'''",
	'externaldata-db-invalid-query' => 'Njepłaćiwe naprašowanje.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'getdata' => 'Obtener datos',
	'externaldata-desc' => 'Permitte recuperar datos in le formatos CSV, JSON e XML, e ab adresses URL externe e ab paginas wiki local',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 */
$messages['id'] = array(
	'getdata' => 'Ambil data',
	'externaldata-desc' => 'Mengijinkan data untuk diunduh dalam format CSV, JSON, dan XML dari pranala luar maupun dari halaman wiki',
	'externaldata-ldap-unable-to-connect' => 'Tidak dapat terhubung ke $1',
	'externaldata-json-decode-not-supported' => 'Galat: json_decode() tidak didukung oleh versi PHP ini',
	'externaldata-xml-error' => 'Galat XML: $1 pada baris $2',
	'externaldata-db-incomplete-information' => 'Galat: Informasi tak lengkap untuk ID peladen ini.',
	'externaldata-db-could-not-get-url' => 'Tidak dapat mengambil URL setelah dicoba {{PLURAL:$1||}}$1 kali.',
	'externaldata-db-unknown-type' => 'Galat: Jenis basis data tidak diketahui.',
	'externaldata-db-could-not-connect' => 'Galat: Tidak dapat terhubung ke basis data.',
	'externaldata-db-no-return-values' => 'Galat: Nilai pengembalian tidak dispesifikasi.',
	'externaldata-db-invalid-query' => 'Kueri tidak sah.',
);

/** Italian (Italiano)
 * @author Pietrodn
 */
$messages['it'] = array(
	'getdata' => 'Ottieni dati',
	'externaldata-desc' => 'Consente di recuperare dati nei formati CSV, XML e JSON sia da URL esterni sia da pagine wiki locali',
);

/** Japanese (日本語)
 * @author Fryed-peach
 */
$messages['ja'] = array(
	'getdata' => 'データ取得',
	'externaldata-desc' => '外部URLやローカルのウィキページから、CSV・JSON・XML形式のデータを取得できるようにする',
	'externaldata-ldap-unable-to-connect' => '$1 に接続できません',
	'externaldata-json-decode-not-supported' => 'エラー: json_decode() はこのバージョンの PHP ではサポートされていません',
	'externaldata-xml-error' => 'XMLエラー: 行$2で$1',
	'externaldata-db-incomplete-information' => 'エラー: このサーバーIDに対する情報が不十分です。',
	'externaldata-db-could-not-get-url' => '$1回の試行を行いましたが URL を取得できませんでした。',
	'externaldata-db-unknown-type' => 'エラー: データベースの種類が不明です。',
	'externaldata-db-could-not-connect' => 'エラー: データベースに接続できませんでした。',
	'externaldata-db-no-return-values' => 'エラー: 戻り値が指定されていません。',
	'externaldata-db-invalid-query' => '不正なクエリー',
);

/** Khmer (ភាសាខ្មែរ)
 * @author វ័ណថារិទ្ធ
 */
$messages['km'] = array(
	'getdata' => 'យក​ទិន្នន័យ',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'getdata' => 'Date holle!',
	'externaldata-desc' => 'Äloup, Date em <i lang="en">CSV</i> Fomaat, em <i lang="en">JSON</i> Fomaat, un em <i lang="en">XML</i> Fomaat fun <i lang="en">URLs</i> un vun Wiki-Sigge ze holle.',
	'externaldata-ldap-unable-to-connect' => 'Kann nit noh $1 verbenge',
	'externaldata-json-decode-not-supported' => '<span style="text-transform: uppercase">Fähler:</span> De Fungxuhn <code lang="en">json_decode()</code> weedt vun heh dä Version vun <i lang="en">PHP</i> nit ongerschtöz.',
	'externaldata-xml-error' => 'Fähler em XML, op Reih $2: $1',
	'externaldata-db-incomplete-information' => '<span style="text-transform: uppercase">Fähler:</span> De Enfomazjuhne vör di ßööver Kännong sin nit kumplätt.',
	'externaldata-db-could-not-get-url' => 'Kunnt {{PLURAL:$1|noh eimohl Versöhke|och noh $1 Mohl Versöhke|ohne enne Versöhk}} nix vun däm <i lang="en">URL</i> krijje.',
	'externaldata-db-unknown-type' => '<span style="text-transform: uppercase">Fähler:</span> Di Zoot Datebangk es unbikannt.',
	'externaldata-db-could-not-connect' => '<span style="text-transform: uppercase">Fähler:</span> Kunnt kein Verbendung noh dä Datebangk krijje.',
	'externaldata-db-no-return-values' => '<span style="text-transform: uppercase">Fähler:</span> Kein Wääte för Zerökzeävve aanjejovve.',
	'externaldata-db-invalid-query' => 'Onjöltesch Frooch aan de Datebangk.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'getdata' => 'Donnéeë kréien',
	'externaldata-desc' => 'Erlaabt et Donnéeën an de Formater CSV, JSON an XML vun externen URLen a lokale Wiki-Säiten ze verschaffen',
	'externaldata-ldap-unable-to-connect' => 'Onméiglech sech op $1 ze connectéieren',
	'externaldata-xml-error' => 'XML Feeler: $1 an der Linn $2',
	'externaldata-db-unknown-type' => 'Feeler: Onbekannten Datebank-Typ.',
	'externaldata-db-could-not-connect' => "Feeler: D'Verbindung mat der Datebank konnt net opgebaut ginn.",
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'getdata' => 'Gegevens ophalen',
	'externaldata-desc' => "Maakt het mogelijk gegevens in CSV, JSON en XML op te halen van zowel externe URL's als lokale wikipagina's",
	'externaldata-ldap-unable-to-connect' => 'Het was niet mogelijk te verbinden met $1',
	'externaldata-json-decode-not-supported' => 'Fout: json_decode() wordt niet ondersteund in deze versie van PHP',
	'externaldata-xml-error' => 'XML-fout: $1 op regel $2',
	'externaldata-db-incomplete-information' => 'Fout: Onvolledige informatie voor dit servernummer.',
	'externaldata-db-could-not-get-url' => 'Na $1 {{PLURAL:$1|poging|pogingen}} gaf de URL geen resultaat.',
	'externaldata-db-unknown-type' => 'Fout: onbekend databasetype.',
	'externaldata-db-could-not-connect' => 'Fout: het was niet mogelijk met de database te verbinden.',
	'externaldata-db-no-return-values' => 'Fout: er zijn geen return-waarden ingesteld.',
	'externaldata-db-invalid-query' => 'Ongeldige zoekopdracht.',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Gunnernett
 */
$messages['nn'] = array(
	'getdata' => 'Hent data',
	'externaldata-desc' => 'Gjev høve til å lasta inn data i formata CSV, JSON og XML frå både eksterne nettadresser og lokale wikisider',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'getdata' => 'Hent data',
	'externaldata-desc' => 'Gir mulighet til å hente data i formatene CSV, JSON og XML fra både eksterne nettadresser og lokale wikisider',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'getdata' => 'Obténer de donadas',
	'externaldata-desc' => "Permet de recuperar de donadas en CSV, JSON e XML dempuèi d'URL extèrnas e de paginas del wiki",
	'externaldata-ldap-unable-to-connect' => 'Impossible de se connectar a $1',
	'externaldata-json-decode-not-supported' => 'Error : json_decode() es pas suportada dins aquesta version de PHP',
	'externaldata-xml-error' => 'Error XML : $1 a la linha $2',
	'externaldata-db-incomplete-information' => 'Error : Informacions incompletas per aqueste identificant de servidor.',
	'externaldata-db-could-not-get-url' => "Impossible d'obténer l'URL aprèp $1 {{PLURAL:$1|ensag|ensages}}.",
	'externaldata-db-unknown-type' => 'ERROR: Tipe de banca de donadas desconegut.',
	'externaldata-db-could-not-connect' => 'Error : Impossible de se connectar a la banca de donadas.',
	'externaldata-db-no-return-values' => 'Error : Cap de valor de retorn es pas estada especificada.',
	'externaldata-db-invalid-query' => 'Requèsta invalida.',
);

/** Polish (Polski)
 * @author Leinad
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'getdata' => 'Pobierz dane',
	'externaldata-desc' => 'Umożliwia pobieranie danych w formatach CSV, JSON lub XML zarówno z zewnętrznych adresów URL jak i lokalnych stron wiki',
	'externaldata-ldap-unable-to-connect' => 'Nie można połączyć się z $1',
	'externaldata-json-decode-not-supported' => 'Błąd – json_decode() nie jest obsługiwana w tej wersji PHP',
	'externaldata-xml-error' => 'Błąd XML – $1 w wierszu $2',
	'externaldata-db-incomplete-information' => 'Błąd – niepełne informacje o tym identyfikatorze serwera.',
	'externaldata-db-could-not-get-url' => 'Nie można uzyskać adresu URL po $1 {{PLURAL:$1|próbie|próbach}}.',
	'externaldata-db-unknown-type' => 'Błąd: Nieznany typ bazy danych.',
	'externaldata-db-could-not-connect' => 'Błąd: Nie można połączyć się z bazą danych.',
	'externaldata-db-no-return-values' => 'Błąd – nie określono zwracanej wartości.',
	'externaldata-db-invalid-query' => 'Nieprawidłowe zapytanie.',
);

/** Portuguese (Português)
 * @author Giro720
 * @author Waldir
 */
$messages['pt'] = array(
	'getdata' => 'Obter dados',
	'externaldata-desc' => 'Permite a obtenção de dados em CSV, JSON e XML tanto a partir de URLs externos como de páginas wiki locais',
	'externaldata-ldap-unable-to-connect' => 'Não foi possível conectar-se a $1',
	'externaldata-xml-error' => 'erro no XML: $1 na linha $2',
	'externaldata-db-could-not-get-url' => 'Não foi possível obter o URL após $1 {{PLURAL:$1|tentativa|tentativas}}.',
	'externaldata-db-could-not-connect' => 'Erro: Não foi possível conectar-se ao banco de dados.',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 */
$messages['pt-br'] = array(
	'getdata' => 'Obter dados',
	'externaldata-desc' => 'Permite a obtenção de dados em CSV, JSON e XML tanto a partir de URLs externos como de páginas wiki locais',
	'externaldata-ldap-unable-to-connect' => 'Não foi possível conectar-se a $1',
	'externaldata-json-decode-not-supported' => 'Erro: json_decode() não é suportado nesta versão do PHP',
	'externaldata-xml-error' => 'Erro no XML: $1 na linha $2',
	'externaldata-db-incomplete-information' => 'Erro: Informação incompleta para o ID deste servidor</P>',
	'externaldata-db-could-not-get-url' => 'Não foi possível obter o URL após $1 {{PLURAL:$1|tentativa|tentativas}}.',
	'externaldata-db-unknown-type' => 'Erro: Tipo de base de dados desconhecido.',
	'externaldata-db-could-not-connect' => 'Erro: Não foi possível conectar-se a base de dados.',
	'externaldata-db-no-return-values' => 'Erro: Nenhum valor de retorno especificado.',
	'externaldata-db-invalid-query' => 'Consulta inválida.',
);

/** Romanian (Română)
 * @author Firilacroco
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'getdata' => 'Obţine date',
	'externaldata-desc' => 'Permite obţinerea datelor în format CSV, JSON şi XML din atât adrese URL externe, cât şi pagini wiki locale',
	'externaldata-xml-error' => 'Eroare XML: $1 la linia $2',
	'externaldata-db-unknown-type' => 'Eroare: Tipul bazei de date necunoscut.',
	'externaldata-db-invalid-query' => 'Interogare invalidă.',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'getdata' => 'Pigghie le date',
	'externaldata-desc' => "Permette de repigghià le data jndr'à le formate CSV, JSON e XML da URL fore a Uicchipèdie e da pàggene locale de Uicchipèdie",
);

/** Russian (Русский)
 * @author Ferrer
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'getdata' => 'Получить данные',
	'externaldata-desc' => 'Позволяет получение данных в форматах CSV, JSON и XML, как с внешних адресов, так и с локальных вики-страниц.',
	'externaldata-ldap-unable-to-connect' => 'Не удаётся подключиться к $1',
	'externaldata-json-decode-not-supported' => 'Ошибка. json_decode() не поддерживается в данной версии PHP',
	'externaldata-xml-error' => 'Ошибка XML. $1 в строке $2',
	'externaldata-db-incomplete-information' => 'ОШИБКА. Неполная информация для этого ID сервера.',
	'externaldata-db-could-not-get-url' => 'Не удалось получить URL после $1 {{PLURAL:$1|попытки|попыток|попыток}}.',
	'externaldata-db-unknown-type' => 'ОШИБКА. Неизвестный тип базы данных.',
	'externaldata-db-could-not-connect' => 'ОШИБКА. Не удаётся подключиться к базе данных.',
	'externaldata-db-no-return-values' => 'ОШИБКА. Не указаны возвращаемые значение.',
	'externaldata-db-invalid-query' => 'Ошибочный запрос.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'getdata' => 'Získať dáta',
	'externaldata-desc' => 'Umožňuje získavanie údajov vo formátoch CSV, JSON a XML z externých URL aj z lokálnych wiki stránok',
	'externaldata-ldap-unable-to-connect' => 'Nepodarilo sa pripojiť k $1',
	'externaldata-json-decode-not-supported' => 'Chyba: táto verzia PHP nepodporuje json_decode()',
	'externaldata-xml-error' => 'Chyba XML: $1 na riadku $2',
	'externaldata-db-incomplete-information' => 'Chyba: Nekompletné informácie s týmto ID servera.',
	'externaldata-db-could-not-get-url' => 'Nepodarilo sa získať URL po $1 {{PLURAL:$1|pokuse|pokusoch}}.',
	'externaldata-db-unknown-type' => 'Chyba: Neznámy typ databázy.',
	'externaldata-db-could-not-connect' => 'Chyba: Nepodarilo sa pripojiť k databáze.',
	'externaldata-db-no-return-values' => 'Chyba: Neboli zadané žiadne návratové hodnoty.',
	'externaldata-db-invalid-query' => 'Neplatná požiadavka.',
);

/** Serbian Cyrillic ekavian (Српски (ћирилица))
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'getdata' => 'Преузми податке',
	'externaldata-desc' => 'Омогућава преузимање података у CSV, JSON и XML форматима, како преко спољашњих веза, тако и са локалних вики-страна',
);

/** Serbian Latin ekavian (Srpski (latinica))
 * @author Michaello
 */
$messages['sr-el'] = array(
	'getdata' => 'Preuzmi podatke',
	'externaldata-desc' => 'Omogućava preuzimanje podataka u CSV, JSON i XML formatima, kako preko spoljašnjih veza, tako i sa lokalnih viki-strana',
);

/** Swedish (Svenska)
 * @author Najami
 */
$messages['sv'] = array(
	'getdata' => 'Hämta data',
	'externaldata-desc' => 'Tillåter att hämta data i formaten CSV, JSON och XML från både externa URL:er och lokala wikisidor',
);

/** Telugu (తెలుగు)
 * @author Kiranmayee
 */
$messages['te'] = array(
	'getdata' => 'విషయములు తీసుకునిరా',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'getdata' => 'Kunin ang dato',
	'externaldata-desc' => 'Nagpapahintulot sa muling pagkuha ng datong nasa mga anyong CSV, JSON at XML na kapwa mula sa panlabas na mga URL at pampook na mga pahina ng wiki',
);

/** Turkish (Türkçe)
 * @author Karduelis
 */
$messages['tr'] = array(
	'getdata' => 'Veri al',
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'getdata' => 'Sada andmused',
);

/** Vietnamese (Tiếng Việt)
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'getdata' => 'Lấy dữ liệu',
	'externaldata-desc' => 'Cho phép truy xuất dữ liệu theo định dạng CSV, JSON và XML từ cả URL bên ngoài lẫn các trang wiki bên trong',
);

