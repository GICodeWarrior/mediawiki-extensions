<?php
/**
 * Internationalization file for the API sandbox extension.
 *
 * @file
 * @ingroup Extensions
*/

$messages = array();

$messages['en'] = array(
	'apisb-desc'              => 'Allows to debug [//www.mediawiki.org/wiki/API MediaWiki API] calls from browser',
	'apisandbox'              => 'API sandbox',
	'apisb-no-js'             => "'''Error''': this feature requires JavaScript.",
	'apisb-intro'             => "Use this page to experiment with '''MediaWiki API'''.
	Refer to [//www.mediawiki.org/wiki/API the API documentation] for further details of API usage.",
	'apisb-api-disabled'      => 'API is disabled on this site.',
	'apisb-parameters'        => 'Parameters',
	'apisb-result'            => 'Result',
	'apisb-request-url'       => 'Request URL:',
	'apisb-request-post'      => 'POST data:',
	'apisb-select-action'     => 'Select action',
	'apisb-select-query'      => 'What to query?',
	'apisb-select-value'      => 'Select value',
	'apisb-loading'           => 'Loading...',
	'apisb-load-error'        => 'Error loading API description',
	'apisb-request-error'     => 'Error performing API request',
	'apisb-namespaces-error'  => 'Error loading namespaces',
	'apisb-ns-main'           => '(Main)',
	'apisb-submit'            => 'Make request',
	'apisb-query-prop'        => 'Properties',
	'apisb-query-list'        => 'Lists',
	'apisb-query-meta'        => 'Meta information',
	'apisb-generic-parameters'=> 'Generic parameters',
	'apisb-generator-parameters'=> 'Generator',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Purodha
 */
$messages['qqq'] = array(
	'apisb-desc' => '{{desc}}',
	'apisb-parameters' => '{{Identical|Parameter}}',
	'apisb-result' => '{{Identical|Result}}',
	'apisb-request-url' => 'This is about the URL of a request.',
	'apisb-loading' => '{{Identical|Loading}}',
	'apisb-query-prop' => '{{Identical|Property}}',
	'apisb-query-list' => '{{Identical|List}}',
);

/** Arabic (العربية)
 * @author روخو
 */
$messages['ar'] = array(
	'apisb-no-js' => "'''خطأ''' : هذه الخاصية تتطلب الجافا سكريبت.",
	'apisb-result' => 'النتيجة',
	'apisb-select-action' => 'اختر حدث',
	'apisb-ns-main' => '(رئيسي)',
	'apisb-query-prop' => 'الخصائص',
	'apisb-query-list' => 'قوائم',
	'apisb-query-meta' => 'معلومات الميتا',
	'apisb-generator-parameters' => 'مولد',
);

/** Azerbaijani (Azərbaycanca)
 * @author Cekli829
 * @author Vago
 */
$messages['az'] = array(
	'apisb-parameters' => 'Parametrlər',
	'apisb-result' => 'Nəticə',
	'apisb-loading' => 'Yüklənir…',
	'apisb-ns-main' => '(Əsas)',
	'apisb-query-list' => 'Siyahılar',
	'apisb-query-meta' => 'Meta məlumatları',
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 * @author Jim-by
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'apisb-desc' => 'Дазваляе налажваць выклікі [//www.mediawiki.org/wiki/API MediaWiki API] з браўзэра',
	'apisandbox' => 'Пясочніца API',
	'apisb-no-js' => "'''Памылка''': гэтая магчымасьць патрабуе JavaScript.",
	'apisb-intro' => "Гэтая старонка зьяўляецца экспэрымэнтам з '''MediaWiki API'''.
Зазірніце ў [//www.mediawiki.org/wiki/API дакумэнтацыю API] для дадатковай інфармацыі па выкарыстаньні API.",
	'apisb-api-disabled' => 'API забаронены на гэтым сайце.',
	'apisb-parameters' => 'Парамэтры',
	'apisb-result' => 'Вынік',
	'apisb-request-url' => 'URL-адрас запыту:',
	'apisb-request-post' => 'POST-зьвесткі:',
	'apisb-select-action' => 'Выбраць дзеяньне',
	'apisb-select-query' => 'Што запытаць?',
	'apisb-select-value' => 'Выбраць значэньне',
	'apisb-loading' => 'Загрузка…',
	'apisb-load-error' => 'Немагчыма загрузіць апісаньне API',
	'apisb-request-error' => 'Немагчыма апрацаваць запыт API',
	'apisb-namespaces-error' => 'Немагчыма загрузіць прасторы назваў',
	'apisb-ns-main' => '(Асноўная)',
	'apisb-submit' => 'Зрабіць запыт',
	'apisb-query-prop' => 'Уласьцівасьці',
	'apisb-query-list' => 'Сьпісы',
	'apisb-query-meta' => 'Мэтазьвесткі',
	'apisb-generic-parameters' => 'Агульныя парамэтры',
	'apisb-generator-parameters' => 'Генэратар',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'apisb-no-js' => "'''Грешка''': тази функционалност изисква Джаваскрипт.",
	'apisb-result' => 'Резултат',
	'apisb-loading' => 'Зареждане...',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'apisb-desc' => 'Aotren dizreinañ galvadennoù [//www.mediawiki.org/wiki/API API MediaWikiI] eus ar merdeer',
	'apisandbox' => 'Poull-traezh API',
	'apisb-no-js' => "'''Fazi''' : Rekis eo JavaScript evit an arc'hwel-mañ.",
	'apisb-intro' => "Grit gant ar bajenn-mañ evit amprouiñ '''MediaWiki API'''.
Kit da deuler ur sell war [//www.mediawiki.org/wiki/API teulioù API] evit gouzout hiroc'h penaos embreger API.",
	'apisb-api-disabled' => "Diweredekaet eo API war al lec'hienn-mañ.",
	'apisb-parameters' => 'Arventennoù',
	'apisb-result' => "Disoc'h",
	'apisb-request-url' => 'Goulenn URL :',
	'apisb-request-post' => 'roadennoù POST :',
	'apisb-select-action' => 'Dibab un ober',
	'apisb-select-query' => 'Petra glask ?',
	'apisb-select-value' => 'Dibab an talvoud',
	'apisb-loading' => 'O kargañ...',
	'apisb-load-error' => 'Fazi en ur gargañ deskrivadur an API',
	'apisb-request-error' => 'Ur fazi zo bet o klask seveniñ ar goulenn API',
	'apisb-namespaces-error' => 'Fazi en ur gargañ an esaouennoù anv',
	'apisb-ns-main' => '(Pennañ)',
	'apisb-submit' => 'Sevel ar goulenn',
	'apisb-query-prop' => 'Perzhioù',
	'apisb-query-list' => 'Rolloù',
	'apisb-query-meta' => 'Titouroù Meta',
	'apisb-generic-parameters' => 'Arventennoù hollek',
	'apisb-generator-parameters' => 'Ganer',
);

/** Catalan (Català)
 * @author Solde
 */
$messages['ca'] = array(
	'apisb-parameters' => 'Paràmetres',
	'apisb-result' => 'Resultat',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Purodha
 */
$messages['de'] = array(
	'apisb-desc' => 'Ermöglicht das Beseitigen von Fehlern bei Aufrufen der [//www.mediawiki.org/wiki/API MediaWiki-API] mit dem Browser',
	'apisandbox' => 'API-Spielwiese',
	'apisb-no-js' => "'''Fehler:''' Diese Funktion erfordert JavaSkript.",
	'apisb-intro' => "Diese Seite für Versuche mit der '''MediaWiki-API''' verwenden.
Die [//www.mediawiki.org/wiki/API Dokumentation zur API] enthält weitere Hinweise zur Nutzung der API.",
	'apisb-api-disabled' => 'Die API wurde auf diesem Wiki deaktiviert.',
	'apisb-parameters' => 'Parameter',
	'apisb-result' => 'Ergebnis',
	'apisb-request-url' => 'Anforderungs-URL:',
	'apisb-request-post' => 'POST-Daten:',
	'apisb-select-action' => 'Vorgang auswählen',
	'apisb-select-query' => 'Was soll abgefragt werden?',
	'apisb-select-value' => 'Wert auswählen',
	'apisb-loading' => 'Lade …',
	'apisb-load-error' => 'Fehler beim Laden der API-Beschreibung',
	'apisb-request-error' => 'Fehler beim Ausführen der API-Anforderung',
	'apisb-namespaces-error' => 'Fehler beim Laden der Namensräume',
	'apisb-ns-main' => '(Seiten)',
	'apisb-submit' => 'Anfrage ausführen',
	'apisb-query-prop' => 'Eigenschaften',
	'apisb-query-list' => 'Listen',
	'apisb-query-meta' => 'Metainformationen',
	'apisb-generic-parameters' => 'Generische Parameter',
	'apisb-generator-parameters' => 'Generator',
);

/** Greek (Ελληνικά)
 * @author Glavkos
 */
$messages['el'] = array(
	'apisb-parameters' => 'Παράμετροι',
	'apisb-result' => 'Αποτέλεσμα',
	'apisb-request-url' => 'Αίτηση URL:',
	'apisb-select-action' => 'Επιλέξτε ενέργεια',
	'apisb-select-query' => 'Τι πρέπει να ρωτήσω;',
	'apisb-select-value' => 'Επιλέξτε τιμή',
	'apisb-loading' => 'Φόρτωση...',
	'apisb-namespaces-error' => 'Σφάλμα φόρτωσης ονοματοχώρων',
	'apisb-ns-main' => '(Κύρια)',
	'apisb-query-prop' => 'Ιδιότητες',
	'apisb-query-list' => 'Λίστες',
	'apisb-query-meta' => 'Πληροφορίες Meta',
);

/** Esperanto (Esperanto)
 * @author Lucas
 */
$messages['eo'] = array(
	'apisb-result' => 'Rezulto',
	'apisb-select-action' => 'Elekti agojn',
	'apisb-select-value' => 'Elekti valoron',
	'apisb-loading' => 'Ŝarĝante...',
	'apisb-query-prop' => 'Ecoj',
	'apisb-query-list' => 'Listoj',
);

/** Spanish (Español)
 * @author Fitoschido
 * @author Pvgreenzebra
 */
$messages['es'] = array(
	'apisb-desc' => 'Permite depurar llamadas a la [//www.mediawiki.org/wiki/API API de MediaWiki] desde el navegador',
	'apisb-no-js' => "'''Error ''': esta característica requiere JavaScript.",
	'apisb-api-disabled' => 'La API está desactivada en este sitio.',
	'apisb-parameters' => 'Parámetros',
	'apisb-result' => 'Resultado',
	'apisb-request-url' => 'URL solicitante:',
	'apisb-request-post' => 'Datos POST:',
	'apisb-select-action' => 'Selecciona acción',
	'apisb-select-query' => '¿Qué consultar?',
	'apisb-select-value' => 'Seleccionar valor',
	'apisb-loading' => 'Cargando...',
	'apisb-load-error' => 'Error al cargar la descripción de la API',
	'apisb-request-error' => 'Error al realizar la solicitud de API',
	'apisb-namespaces-error' => 'Error al cargar los espacios de nombres',
	'apisb-ns-main' => '(Principal)',
	'apisb-submit' => 'Realizar solicitud',
	'apisb-query-prop' => 'Propiedades',
	'apisb-query-list' => 'Listas',
	'apisb-query-meta' => 'información de Meta',
);

/** Persian (فارسی)
 * @author Ebraminio
 * @author Leyth
 * @author Mjbmr
 * @author ZxxZxxZ
 */
$messages['fa'] = array(
	'apisb-desc' => 'اشکال‌یابی فراخوانی‌های [//www.mediawiki.org/wiki/API رابط برنامه‌نویسی مدیاویکی] را از طریق مرورگر اجازه می‌دهد',
	'apisandbox' => 'گودال ماسه‌بازی رابط برنامه‌نویسی',
	'apisb-no-js' => "'''خطا''': این قابلیت نیازمند جاوااسکریپت است.",
	'apisb-api-disabled' => 'رابط برنامه‌نویسی در این تارنما غیرفعال شده‌است.',
	'apisb-parameters' => 'پارامترها',
	'apisb-result' => 'نتیجه',
	'apisb-request-url' => 'درخواست آدرس:',
	'apisb-request-post' => 'فرستادن داده‌ها:',
	'apisb-select-action' => 'انتخاب اقدامات',
	'apisb-select-value' => 'انتخاب مقدار',
	'apisb-loading' => 'در حال بارگذاری…',
	'apisb-load-error' => 'خطا در بارگذاری توضیحات ای‌پی‌آی',
	'apisb-request-error' => 'خطا در اجرای درخواست ای‌پی‌آی',
	'apisb-namespaces-error' => 'خطا در بارگذاری فضاهای نام',
	'apisb-ns-main' => '(اصلی)',
	'apisb-submit' => 'ایجاد درخواست',
	'apisb-query-prop' => 'ویژگی‌ها',
	'apisb-query-list' => 'فهرست‌ها',
	'apisb-query-meta' => 'اطلاعات متا',
	'apisb-generic-parameters' => 'پارامترهای عمومی',
	'apisb-generator-parameters' => 'تولیدکننده',
);

/** Finnish (Suomi)
 * @author Crt
 */
$messages['fi'] = array(
	'apisandbox' => 'API-hiekkalaatikko',
	'apisb-no-js' => "'''Virhe:''' Tämä ominaisuus vaatii JavaScriptin.",
	'apisb-api-disabled' => 'API on poistettu käytöstä tällä sivustolla.',
	'apisb-result' => 'Tulos',
	'apisb-select-action' => 'Valitse toiminto',
	'apisb-select-value' => 'Valitse arvo',
	'apisb-loading' => 'Ladataan...',
);

/** French (Français)
 * @author Balzac 40
 * @author Crochet.david
 * @author Grondin
 * @author Verdy p
 */
$messages['fr'] = array(
	'apisb-desc' => 'Permet de déboguer les appels de l’[//www.mediawiki.org/wiki/API API de MediaWiki] à partir du navigateur',
	'apisandbox' => 'Bac à sable API',
	'apisb-no-js' => "''' Erreur ''': cette fonctionnalité nécessite JavaScript.",
	'apisb-intro' => "Utilisez cette page pour expérimenter '''MediaWiki API'''.
Reportez-vous sur [//www.mediawiki.org/wiki/API la documentation de l’API] pour plus de détails sur l’utilisation de l’API.",
	'apisb-api-disabled' => 'API est désactivé sur ce site.',
	'apisb-parameters' => 'Paramètres',
	'apisb-result' => 'Résultat',
	'apisb-request-url' => 'Requête URL :',
	'apisb-request-post' => 'données POST :',
	'apisb-select-action' => 'Sélectionner une action',
	'apisb-select-query' => 'Que faut-il interroger ?',
	'apisb-select-value' => 'Sélectionnez la valeur',
	'apisb-loading' => 'Chargement...',
	'apisb-load-error' => 'Erreur lors du chargement de description de l’API',
	'apisb-request-error' => "Erreur lors de l'exécution d'une requête API",
	'apisb-namespaces-error' => 'Erreur lors du chargement des espaces de noms',
	'apisb-ns-main' => '(Principal)',
	'apisb-submit' => 'Faire la demande',
	'apisb-query-prop' => 'Propriétés',
	'apisb-query-list' => 'Listes',
	'apisb-query-meta' => 'Méta-information',
	'apisb-generic-parameters' => 'Paramètres génériques',
	'apisb-generator-parameters' => 'Générateur',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'apisb-desc' => 'Pèrmèt d’èliminar les cofieries des apèls de l’[//www.mediawiki.org/wiki/API API de MediaWiki] dês lo navigator.',
	'apisandbox' => 'Bouèta de sabla API',
	'apisb-no-js' => "'''Èrror :''' cela fonccionalitât at fôta de JavaScript.",
	'apisb-intro' => "Utilisâd ceta pâge por èxpèrimentar avouéc '''MediaWiki API'''.
Reportâd-vos sur [//www.mediawiki.org/wiki/API la documentacion de l’API] por més de dètalys sur l’usâjo de l’API.",
	'apisb-api-disabled' => 'API est dèsactivâ sur ceti seto.',
	'apisb-parameters' => 'Paramètres',
	'apisb-result' => 'Rèsultat',
	'apisb-request-url' => 'Requéta URL :',
	'apisb-request-post' => 'Balyês POST :',
	'apisb-select-action' => 'Chouèsir una accion',
	'apisb-select-query' => 'Que fôt-o entèrrogiér ?',
	'apisb-select-value' => 'Chouèsir la valor',
	'apisb-loading' => 'Chargement...',
	'apisb-load-error' => 'Èrror pendent lo chargement de la dèscripcion de l’API',
	'apisb-request-error' => 'Èrror pendent l’ègzécucion d’una requéta API',
	'apisb-namespaces-error' => 'Èrror pendent lo chargement des èspâços de noms',
	'apisb-ns-main' => '(Principâl)',
	'apisb-submit' => 'Fâre la demanda',
	'apisb-query-prop' => 'Propriètâts',
	'apisb-query-list' => 'Listes',
	'apisb-query-meta' => 'Mèta-enformacions',
	'apisb-generic-parameters' => 'Paramètres g·ènèricos',
	'apisb-generator-parameters' => 'G·ènèrator',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'apisb-desc' => 'Permite a depuración das chamadas da [//www.mediawiki.org/wiki/API API de MediaWiki] desde o navegador',
	'apisandbox' => 'Zona de probas API',
	'apisb-no-js' => "'''Erro:''' Esta característica necesita JavaScript.",
	'apisb-intro' => "Use esta páxina para experimentar coa '''API de MediaWiki'''.
Consulte a [//www.mediawiki.org/wiki/API documentación da API] para obter máis información sobre o uso da API.",
	'apisb-api-disabled' => 'API está desactivado neste sitio.',
	'apisb-parameters' => 'Parámetros',
	'apisb-result' => 'Resultado',
	'apisb-request-url' => 'URL da solicitude:',
	'apisb-request-post' => 'Datos POST:',
	'apisb-select-action' => 'Seleccionar unha acción',
	'apisb-select-query' => 'Que quere consultar?',
	'apisb-select-value' => 'Seleccione o valor',
	'apisb-loading' => 'Cargando...',
	'apisb-load-error' => 'Erro ao cargar a descrición API',
	'apisb-request-error' => 'Erro ao executar a solicitude API',
	'apisb-namespaces-error' => 'Erro ao cargar o espazo de nomes',
	'apisb-ns-main' => '(Principal)',
	'apisb-submit' => 'Facer a solicitude',
	'apisb-query-prop' => 'Propiedades',
	'apisb-query-list' => 'Listas',
	'apisb-query-meta' => 'Metainformación',
	'apisb-generic-parameters' => 'Parámetros xenéricos',
	'apisb-generator-parameters' => 'Xerador',
);

/** Hebrew (עברית)
 * @author Deror avi
 */
$messages['he'] = array(
	'apisb-parameters' => 'פרמטרים',
	'apisb-result' => 'תוצאה',
	'apisb-request-url' => 'כתובת ה-URL של הבקשה:',
	'apisb-select-action' => 'בחירת פעולה',
	'apisb-select-query' => 'מהי השאילתה?',
	'apisb-select-value' => 'בחירת ערך',
	'apisb-loading' => 'בטעינה...',
	'apisb-load-error' => 'שגיאה בטעינת תיאור API',
	'apisb-request-error' => 'שגיעה בביצוע בקשת API',
	'apisb-namespaces-error' => 'שגיעה בטעינת שם מתחם',
	'apisb-ns-main' => '(ראשי)',
	'apisb-submit' => 'ביצוע שאילתה',
	'apisb-query-prop' => 'מאפיינים',
	'apisb-query-list' => 'רשימות',
	'apisb-query-meta' => 'מידע נוסף',
	'apisb-generic-parameters' => 'פרמטרים כלליים',
	'apisb-generator-parameters' => 'מחולל',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'apisb-desc' => 'Zmóžnja wotstronjenje zmylkow při wołanju [//www.mediawiki.org/wiki/API MediaWiki API] z wobhladowaka',
	'apisandbox' => 'API-hrajkanišćo',
	'apisb-no-js' => "'''Zmylk''': tuta funkcija sej JavaScript wužaduje.",
	'apisb-intro' => "Wužij tutu stronu, zo by z '''Mediawiki API''' eksperimentował.
Hlej [//www.mediawiki.org/wiki/API API-dokumentaciju] za dalše podrobnosće za wužiwanje API.",
	'apisb-api-disabled' => 'API je so na tutym sydle znjemóžnił.',
	'apisb-parameters' => 'Parametry',
	'apisb-result' => 'Wuslědk',
	'apisb-request-url' => 'URL naprašowanja:',
	'apisb-request-post' => 'POST-daty:',
	'apisb-select-action' => 'Akciju wubrać',
	'apisb-select-query' => 'Što ma so wotprašeć?',
	'apisb-select-value' => 'Hódnotu wubrać',
	'apisb-loading' => 'Začituje so...',
	'apisb-load-error' => 'Zmylk při začitowanju API-wopisanja',
	'apisb-request-error' => 'Zmylk při přewjedźenju API-naprašowanja',
	'apisb-namespaces-error' => 'Zmylk při začitowanju mjenowych rumow',
	'apisb-ns-main' => '(Nastawki)',
	'apisb-submit' => 'Naprašowanje přewjesć',
	'apisb-query-prop' => 'Kajkosće',
	'apisb-query-list' => 'Lisćiny',
	'apisb-query-meta' => 'Metainformacije',
	'apisb-generic-parameters' => 'Powšitkowne parametry',
	'apisb-generator-parameters' => 'Generator',
);

/** Hungarian (Magyar)
 * @author Dj
 */
$messages['hu'] = array(
	'apisb-desc' => 'Lehetőséget biztosít az [//www.mediawiki.org/wiki/API MediaWiki API] hívások nyomkövetésére a böngészőből',
	'apisandbox' => 'API homokozó',
	'apisb-no-js' => "'''Hiba''': ehhez a szolgáltatáshoz JavaScript szükséges.",
	'apisb-intro' => "Használd ezt az oldalt '''MediaWiki API''' kísérletezésekre.
Az API használatának további részletei az [//www.mediawiki.org/wiki/API the API dokumentációnál] található.",
	'apisb-api-disabled' => 'API le van tiltva ezen az oldalon.',
	'apisb-parameters' => 'Paraméterek',
	'apisb-result' => 'Eredmény',
	'apisb-request-url' => 'Kérő URL:',
	'apisb-request-post' => 'POST adat:',
	'apisb-select-action' => 'Műveletek kiválasztása',
	'apisb-select-query' => 'Mi a lekérdezés?',
	'apisb-select-value' => 'Válassz értéket',
	'apisb-loading' => 'Betöltés…',
	'apisb-load-error' => 'Hiba a API leírás betöltésekor',
	'apisb-request-error' => 'Hiba az API kérés végrehajtásakor',
	'apisb-namespaces-error' => 'Hiba a névtér betöltése során',
	'apisb-ns-main' => '(Fő)',
	'apisb-submit' => 'Kérés végrehajtása',
	'apisb-query-prop' => 'Tulajdonságok',
	'apisb-query-list' => 'Listák',
	'apisb-query-meta' => 'Metaadatok',
	'apisb-generic-parameters' => 'Általános paraméterek',
	'apisb-generator-parameters' => 'Generátor',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'apisb-desc' => 'Permitte cercar defectos in appellos del [//www.mediawiki.org/wiki/API API de MediaWiki] ab le navigator del web',
	'apisandbox' => 'Cassa de sablo pro API',
	'apisb-no-js' => "'''Error''': iste function require JavaScript.",
	'apisb-intro' => "Usa iste pagina pro experimentar con le '''API de MediaWiki'''.
Consulta [//www.mediawiki.org/wiki/API le documentation del API] pro ulterior detalios concernente le uso del API.",
	'apisb-api-disabled' => 'Le API ha essite disactivate in iste sito.',
	'apisb-parameters' => 'Parametros',
	'apisb-result' => 'Resultato',
	'apisb-request-url' => 'URL de requesta:',
	'apisb-request-post' => 'Datos POST:',
	'apisb-select-action' => 'Selige action',
	'apisb-select-query' => 'Que consultar?',
	'apisb-select-value' => 'Selige valor',
	'apisb-loading' => 'Cargamento…',
	'apisb-load-error' => 'Error durante le cargamento del description del API',
	'apisb-request-error' => 'Error durante le execution del requesta al API',
	'apisb-namespaces-error' => 'Error durante le cargamento del spatios de nomines',
	'apisb-ns-main' => '(Principal)',
	'apisb-submit' => 'Facer requesta',
	'apisb-query-prop' => 'Proprietates',
	'apisb-query-list' => 'Listas',
	'apisb-query-meta' => 'Metainformationes',
	'apisb-generic-parameters' => 'Parametros generic',
	'apisb-generator-parameters' => 'Generator',
);

/** Indonesian (Bahasa Indonesia)
 * @author IvanLanin
 */
$messages['id'] = array(
	'apisb-desc' => 'Menyediakan fasilitas debug untuk pemanggilan [//www.mediawiki.org/wiki/API API MediaWiki] dari peramban',
	'apisandbox' => 'Bak pasir API',
	'apisb-no-js' => "'''Galat''': fitur ini memerlukan JavaScript.",
	'apisb-intro' => "Gunakan halaman ini untuk bereksperimen dengan '''MediaWiki API'''.
Lihat [//www.mediawiki.org/wiki/API dokumentasi API] untuk perincian lanjut penggunaan API.",
	'apisb-api-disabled' => 'API dinonaktifkan pada situs ini.',
	'apisb-parameters' => 'Parameter',
	'apisb-result' => 'Hasil',
	'apisb-request-url' => 'URL Permintaan:',
	'apisb-request-post' => 'Data POST:',
	'apisb-select-action' => 'Pilih tindakan',
	'apisb-select-query' => 'Pilih permintaan',
	'apisb-select-value' => 'Pilih nilai',
	'apisb-loading' => 'Memuat...',
	'apisb-load-error' => 'Galat sewaktu memuat deskripsi API',
	'apisb-request-error' => 'Galat sewaktu melakukan permintaan API',
	'apisb-namespaces-error' => 'Galat sewaktu memuat ruang nama',
	'apisb-ns-main' => '(Utama)',
	'apisb-submit' => 'Kirim permintaan',
	'apisb-query-prop' => 'Properti',
	'apisb-query-list' => 'Daftar',
	'apisb-query-meta' => 'Informasi meta',
);

/** Italian (Italiano)
 * @author Beta16
 * @author Gianfranco
 * @author Rippitippi
 */
$messages['it'] = array(
	'apisb-desc' => 'Permette di eseguire il debug delle chiamate [//www.mediawiki.org/wiki/API MediaWiki API] dal browser',
	'apisandbox' => 'Sandbox API',
	'apisb-no-js' => "'''Errore''': questa funzione richiede JavaScript.",
	'apisb-intro' => "Utilizza questa pagina per sperimentare con '''MediaWiki API'''.
Per ulteriori dettagli di utilizzo delle API, fai riferimento alla [//www.mediawiki.org/wiki/API documentazione API].",
	'apisb-api-disabled' => 'Le funzionalità API sono disabilitate su questo sito.',
	'apisb-parameters' => 'Parametri',
	'apisb-result' => 'Risultato',
	'apisb-select-action' => 'Seleziona azione',
	'apisb-select-value' => 'Selezionare il valore',
	'apisb-loading' => 'Caricamento in corso ...',
	'apisb-ns-main' => '(Principale)',
	'apisb-query-prop' => 'Proprietà',
	'apisb-query-list' => 'Liste',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'apisb-desc' => 'Hellef noh Fähler ze söhke bei [//www.mediawiki.org/wiki/API MediaWiki <i lang="en">API</i>] Oprohfe uss_em Brauser.',
	'apisb-parameters' => 'Parrameetere',
	'apisb-result' => 'Erus jekumme es',
	'apisb-request-url' => 'Dä URL vun dä Aanfrooch:',
	'apisb-query-prop' => 'Eijeschafte',
	'apisb-query-list' => 'Leste',
);

/** Kurdish (Latin script) (‪Kurdî (latînî)‬)
 * @author George Animal
 */
$messages['ku-latn'] = array(
	'apisb-parameters' => 'Parametre',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'apisandbox' => 'API-Sandkëscht',
	'apisb-no-js' => "'''Feeler''': dës Fonctioun brauch JavaScript",
	'apisb-api-disabled' => 'API ass op dësem Site ausgeschalt.',
	'apisb-parameters' => 'Parameteren',
	'apisb-result' => 'Resultat',
	'apisb-request-url' => 'URL fir Ufroen:',
	'apisb-select-action' => 'Aktioun eraussichen',
	'apisb-select-value' => 'Wäert eraussichen',
	'apisb-loading' => 'Lueden...',
	'apisb-load-error' => 'Feeler beim Luede vun der API- Beschreiwung',
	'apisb-namespaces-error' => 'Feeler beim Luede vun den Nummraim',
	'apisb-ns-main' => '(Haapt)',
	'apisb-submit' => 'Ufro maachen',
	'apisb-query-prop' => 'Eegeschaften',
	'apisb-query-list' => 'Lëschten',
	'apisb-query-meta' => 'Meta-Informatioun',
);

/** Lithuanian (Lietuvių)
 * @author Eitvys200
 * @author Ignas693
 */
$messages['lt'] = array(
	'apisb-desc' => 'Leidžia derinti [MediaWiki API http://www.mediawiki.org/wiki/API] skambučių iš naršyklės',
	'apisandbox' => 'API smėlio dėžės',
	'apisb-no-js' => '"" Klaida "": ši funkcija reikalauja JavaScript.',
	'apisb-intro' => "Naudokite šį puslapį norėdami eksperimentuoti su '''MediaWiki API \"„.
	Ieškokite [//www.mediawiki.org/wiki/API API dokumentacijoje] Išsamesnės informacijos apie API naudojimo.",
	'apisb-api-disabled' => 'API yra išjungtas šioje svetainėje.',
	'apisb-parameters' => 'Parametrai',
	'apisb-result' => 'Rezultatai',
	'apisb-request-url' => 'Prašyti URL:',
	'apisb-request-post' => 'POST duomenys:',
	'apisb-select-action' => 'Pasirinkite veiksmą',
	'apisb-select-query' => 'Ką užklausą?',
	'apisb-select-value' => 'Pasirinkite vertę',
	'apisb-loading' => 'Kraunasi ...',
	'apisb-load-error' => 'Klaida įkeliant API aprašymas',
	'apisb-request-error' => 'Klaida scenos API prašymą',
	'apisb-namespaces-error' => 'Klaida pakrovimo vardų sritys',
	'apisb-ns-main' => '(Pagrindinė)',
	'apisb-submit' => 'Pateikti prašymą',
	'apisb-query-prop' => 'Nusttymai',
	'apisb-query-list' => 'Sąrašai',
	'apisb-query-meta' => 'Meta informacija',
	'apisb-generator-parameters' => 'Generatorius',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'apisb-desc' => 'Овозможува отстранување на грешки во повикувањата на [//www.mediawiki.org/wiki/API?uselang=mk посредникот за програмирање на прилози (API) на МедијаВики] од прелистувачот',
	'apisandbox' => 'API-песочница',
	'apisb-no-js' => "'''Грешка''': оваа функција бара JavaScript.",
	'apisb-intro' => "На оваа страница можете да експериментирате со '''API на МедијаВики'''.
	Повеќе напатствија за користење ќе најдете на [//www.mediawiki.org/wiki/API?uselang=mk документацијата на API].",
	'apisb-api-disabled' => 'API е оневозможен на ова мрежно место.',
	'apisb-parameters' => 'Параметри',
	'apisb-result' => 'Извод',
	'apisb-request-url' => 'URL на барањето:',
	'apisb-request-post' => 'POST-податоци:',
	'apisb-select-action' => 'Одберете дејство',
	'apisb-select-query' => 'Што да барам?',
	'apisb-select-value' => 'Одберете вредност',
	'apisb-loading' => 'Вчитувам...',
	'apisb-load-error' => 'Грешка при вчитувањето на описот на API',
	'apisb-request-error' => 'Грешка при извршувањето на барањето од API',
	'apisb-namespaces-error' => 'Грешка при вчитувањето на именските простори',
	'apisb-ns-main' => '(Главен)',
	'apisb-submit' => 'Постави барање',
	'apisb-query-prop' => 'Својства',
	'apisb-query-list' => 'Списоци',
	'apisb-query-meta' => 'Метаинформации',
	'apisb-generic-parameters' => 'Општи параметри',
	'apisb-generator-parameters' => 'Создавач',
);

/** Malayalam (മലയാളം)
 * @author Junaidpv
 * @author Praveenp
 */
$messages['ml'] = array(
	'apisb-no-js' => "'''പിഴവ്''': ഈ വിശേഷഗുണത്തിനു ജാവാസ്ക്രിപ്റ്റ് ആവശ്യമാണ്.",
	'apisb-api-disabled' => 'ഈ സൈറ്റിൽ എ.പി.ഐ. പ്രവർത്തനരഹിതമാക്കിയിരിക്കുന്നു.',
	'apisb-parameters' => 'ചരങ്ങൾ',
	'apisb-result' => 'ഫലം',
	'apisb-request-url' => 'അഭ്യർത്ഥിച്ച യൂ.ആർ.എൽ.:',
	'apisb-loading' => 'ശേഖരിക്കുന്നു...',
	'apisb-ns-main' => '(മുഖ്യം)',
	'apisb-query-meta' => 'മെറ്റ വിവരങ്ങൾ',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'apisb-desc' => 'Membolehkan penyahpepijatan panggilan [//www.mediawiki.org/wiki/API MediaWiki API] dari pelayar',
	'apisandbox' => 'Kotak pasir API',
	'apisb-no-js' => "'''Perhatian''': ciri ini memerlukan JavaScript.",
	'apisb-intro' => "Gunakan laman ini untuk bereksperimen dengan '''MediaWiki API'''.
	Rujuk [//www.mediawiki.org/wiki/API dokumentasi API] untuk keterangan lanjut tentang penggunaan API.",
	'apisb-api-disabled' => 'API dimatikan di tapak web ini.',
	'apisb-parameters' => 'Parameter',
	'apisb-result' => 'Hasil',
	'apisb-request-url' => 'URL permohonan:',
	'apisb-request-post' => 'Data POST:',
	'apisb-select-action' => 'Pilih tindakan',
	'apisb-select-query' => 'Apa untuk ditanya?',
	'apisb-select-value' => 'Pilih nilai',
	'apisb-loading' => 'Memuatkan...',
	'apisb-load-error' => 'Ralat ketika memuatkan keterangan API',
	'apisb-request-error' => 'Ralat ketika melakukan permohonan API',
	'apisb-namespaces-error' => 'Ralat ketika memuatkan ruang nama',
	'apisb-ns-main' => '(Utama)',
	'apisb-submit' => 'Buat permintaan',
	'apisb-query-prop' => 'Sifat',
	'apisb-query-list' => 'Senarai',
	'apisb-query-meta' => 'Maklumat meta',
	'apisb-generic-parameters' => 'Parameter am',
	'apisb-generator-parameters' => 'Penjana',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'apisb-desc' => 'Maakt het mogelijk om [//www.mediawiki.org/wiki/API API-verzoeken voor MediaWiki] vanuit een browser te debuggen',
	'apisandbox' => 'API-zandbak',
	'apisb-no-js' => "'''Fout''': deze functie vereist JavaScript.",
	'apisb-intro' => "Gebruik deze pagina om te experimenteren met de '''MediaWiki API'''.
Zie de [//www.mediawiki.org/wiki/API API-documentatie] voor verdere details over het gebruik van de API.",
	'apisb-api-disabled' => 'API is uitgeschakeld op deze site.',
	'apisb-parameters' => 'Parameters',
	'apisb-result' => 'Resultaat',
	'apisb-request-url' => 'Verzoek-URL:',
	'apisb-request-post' => 'POST-gegevens:',
	'apisb-select-action' => 'Handeling selecteren',
	'apisb-select-query' => 'Wat is uw vraag?',
	'apisb-select-value' => 'Selecteer waarde',
	'apisb-loading' => 'Bezig met laden…',
	'apisb-load-error' => 'Fout bij het laden van de API-beschrijving',
	'apisb-request-error' => 'Fout bij het uitvoeren van het API-verzoek',
	'apisb-namespaces-error' => 'Fout laden bij het laden van de naamruimten',
	'apisb-ns-main' => '(Hoofdnaamruimte)',
	'apisb-submit' => 'Verzoek uitvoeren',
	'apisb-query-prop' => 'Eigenschappen',
	'apisb-query-list' => 'Lijsten',
	'apisb-query-meta' => 'Metaigegevens',
	'apisb-generic-parameters' => 'Algemene parameters',
	'apisb-generator-parameters' => 'Generator',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'apisb-desc' => 'Tillater å feilsøke [//www.mediawiki.org/wiki/API MediaWiki API]-kall fra nettleseren',
	'apisandbox' => 'API-sandkasse',
	'apisb-no-js' => "'''Feil''': denne funksjonen krever JavaScript.",
	'apisb-intro' => "Bruk denne siden til å eksperimentere med '''MediaWiki API'''.
Sjekk [//www.mediawiki.org/wiki/API API-dokumentasjonen] for flere detaljer om bruk av API.",
	'apisb-api-disabled' => 'API er deaktivert på dette nettstedet.',
	'apisb-parameters' => 'Parametere',
	'apisb-result' => 'Resultat',
	'apisb-request-url' => 'Forespurt URL:',
	'apisb-request-post' => 'POST-data:',
	'apisb-select-action' => 'Velg handling',
	'apisb-select-query' => 'Hva skal du spørre etter?',
	'apisb-select-value' => 'Velg verdi',
	'apisb-loading' => 'Laster...',
	'apisb-load-error' => 'Feil under lasting av API-beskrivelse',
	'apisb-request-error' => 'Feil under utføring av API-forespørsel',
	'apisb-namespaces-error' => 'Feil under lasting av navnerom',
	'apisb-ns-main' => '(Hoved)',
	'apisb-submit' => 'Foreta en forespørsel',
	'apisb-query-prop' => 'Egenskaper',
	'apisb-query-list' => 'Lister',
	'apisb-query-meta' => 'Metainformasjon',
);

/** Oriya (ଓଡ଼ିଆ)
 * @author Odisha1
 */
$messages['or'] = array(
	'apisb-ns-main' => '(ମୂଳ)',
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'apisb-ns-main' => '(Bledder)',
);

/** Polish (Polski)
 * @author Sp5uhe
 * @author Woytecr
 */
$messages['pl'] = array(
	'apisb-no-js' => "'''Błąd''' – ta funkcja wymaga JavaScript.",
	'apisb-parameters' => 'Parametry',
	'apisb-result' => 'Rezultat',
	'apisb-request-url' => 'Żądanie URL:',
	'apisb-request-post' => 'Dane POST:',
	'apisb-select-action' => 'Wybierz działanie',
	'apisb-select-value' => 'Wybierz wartość',
	'apisb-loading' => 'Trwa ładowanie…',
	'apisb-ns-main' => '(główna)',
	'apisb-submit' => 'Wykonaj żądanie',
	'apisb-query-prop' => 'Właściwości',
	'apisb-query-list' => 'Listy',
	'apisb-query-meta' => 'Matainformacje',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'apisb-desc' => 'Permite depurar chamadas à [//www.mediawiki.org/wiki/API API do MediaWiki] a partir do browser',
	'apisandbox' => 'Testes da API',
	'apisb-no-js' => "'''Erro''': Esta funcionalidade requer o JavaScript.",
	'apisb-intro' => "Use esta página para fazer experiências com a '''API do MediaWiki'''.
Consulte a [//www.mediawiki.org/wiki/API documentação da API] para informações sobre o uso da API.",
	'apisb-api-disabled' => 'A API está desactivada neste site.',
	'apisb-parameters' => 'Parâmetros',
	'apisb-result' => 'Resultado',
	'apisb-request-url' => 'URL do pedido:',
	'apisb-request-post' => 'Dados POST:',
	'apisb-select-action' => 'Seleccionar acção',
	'apisb-select-query' => 'O que pretende consultar?',
	'apisb-select-value' => 'Seleccionar o valor',
	'apisb-loading' => 'A carregar…',
	'apisb-load-error' => 'Erro ao carregar a descrição da API',
	'apisb-request-error' => 'Erro ao executar o pedido da API',
	'apisb-namespaces-error' => 'Erro ao carregar os espaços nominais',
	'apisb-ns-main' => '(Principal)',
	'apisb-submit' => 'Fazer o pedido',
	'apisb-query-prop' => 'Propriedades',
	'apisb-query-list' => 'Listas',
	'apisb-query-meta' => 'Meta informação',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Giro720
 */
$messages['pt-br'] = array(
	'apisb-desc' => 'Permite depurar chamadas do [//www.mediawiki.org/wiki/API API do MediaWiki] a partir do navegador',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'apisb-parameters' => 'Parametre',
	'apisb-result' => 'Resultate',
	'apisb-select-action' => "Scacchie l'azione",
	'apisb-select-value' => "Scacchie 'nu valore",
	'apisb-loading' => 'Stoche a careche…',
	'apisb-ns-main' => '(Prengepàle)',
	'apisb-submit' => "Fà 'na richieste",
	'apisb-query-prop' => 'probbietà',
	'apisb-query-list' => 'Elenghe',
);

/** Russian (Русский)
 * @author DCamer
 * @author KorneySan
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'apisb-desc' => 'Позволяет отлаживать вызовы [//www.mediawiki.org/wiki/API MediaWiki API] из браузера',
	'apisandbox' => 'Песочница API',
	'apisb-no-js' => "'''Ошибка''': эта возможность требует JavaScript.",
	'apisb-intro' => "Используйте эту страницу для экспериментов с '''MediaWiki API'''.
Обратитесь к [//www.mediawiki.org/wiki/API документации API] для получения дополнительной информации об использовании API.",
	'apisb-api-disabled' => 'API отключен на этом сайте.',
	'apisb-parameters' => 'Параметры',
	'apisb-result' => 'Результат',
	'apisb-request-url' => 'URL-адрес запроса:',
	'apisb-request-post' => 'POST данные:',
	'apisb-select-action' => 'Выберите действие',
	'apisb-select-query' => 'Что запросить?',
	'apisb-select-value' => 'Выберите значение',
	'apisb-loading' => 'Загрузка…',
	'apisb-load-error' => 'Ошибка при загрузке описания API',
	'apisb-request-error' => 'Ошибка выполнения запроса API',
	'apisb-namespaces-error' => 'Ошибка при загрузке пространств имен',
	'apisb-ns-main' => '(Основная)',
	'apisb-submit' => 'Сделать запрос',
	'apisb-query-prop' => 'Свойства',
	'apisb-query-list' => 'Списки',
	'apisb-query-meta' => 'Мета-информация',
	'apisb-generic-parameters' => 'Общие параметры',
	'apisb-generator-parameters' => 'Генератор',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'apisandbox' => 'API pieskovisko',
	'apisb-parameters' => 'Parametre',
	'apisb-result' => 'Výsledok',
	'apisb-request-url' => 'URL požiadavky:',
	'apisb-request-post' => 'Údaje POST:',
	'apisb-select-action' => 'Vyberte operáciu',
	'apisb-select-query' => 'Požiadavku na čo?',
	'apisb-select-value' => 'Vyberte hodnotu',
	'apisb-loading' => 'Načítava sa...',
	'apisb-ns-main' => '(Hlavné)',
	'apisb-submit' => 'Podať žiadosť',
	'apisb-query-prop' => 'Vlastnosti',
	'apisb-query-list' => 'Zoznamy',
	'apisb-query-meta' => 'Metainformácie',
);

/** Slovenian (Slovenščina)
 * @author Dbc334
 */
$messages['sl'] = array(
	'apisb-desc' => 'Omogoča popravljanje napak klicev [//www.mediawiki.org/wiki/API MediaWiki API] iz brskalnika',
	'apisandbox' => 'Peskovnik API',
	'apisb-no-js' => "'''Napaka''': funkcija potrebuje JavaScript.",
	'apisb-intro' => "Uporabite to stran za preizkušanje '''MediaWiki API'''.
	Oglejte si [//www.mediawiki.org/wiki/API dokumentacijo API] za nadaljnje podrobnosti uporabe API.",
	'apisb-api-disabled' => 'API je onemogočen na tej spletni strani.',
	'apisb-parameters' => 'Parametri',
	'apisb-result' => 'Rezultat',
	'apisb-request-url' => 'URL zahteve:',
	'apisb-request-post' => 'Podatki POST:',
	'apisb-select-action' => 'Izberite dejanje',
	'apisb-select-query' => 'Kaj naj poizvem?',
	'apisb-select-value' => 'Izberite vrednost',
	'apisb-loading' => 'Nalaganje ...',
	'apisb-load-error' => 'Napaka pri nalaganju opisa API',
	'apisb-request-error' => 'Napak pri izvajanju zahteve API',
	'apisb-namespaces-error' => 'Napaka pri nalaganju imenskih prostorov',
	'apisb-ns-main' => '(Osnovno)',
	'apisb-submit' => 'Izvedi zahtevo',
	'apisb-query-prop' => 'Lastnosti',
	'apisb-query-list' => 'Seznami',
	'apisb-query-meta' => 'Metapodatki',
	'apisb-generic-parameters' => 'Generični parametri',
	'apisb-generator-parameters' => 'Generator',
);

/** Swedish (Svenska)
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'apisb-desc' => 'Gör det möjligt att felsöka [//www.mediawiki.org/wiki/API MediaWiki API]-samtal från webbläsaren',
	'apisandbox' => 'API-sandlåda',
	'apisb-no-js' => "'''Fel''': Denna funktion kräver JavaScript.",
	'apisb-intro' => "Använd denna sida för att experimentera med '''MediaWiki API'''.
Kolla på [//www.mediawiki.org/wiki/API API-dokumentationen] för fler detaljer om API-användning.",
	'apisb-api-disabled' => 'API är inaktiverat på denna webbplats.',
	'apisb-parameters' => 'Parametrar',
	'apisb-result' => 'Resultat',
	'apisb-request-url' => 'Begär URL:',
	'apisb-request-post' => 'POST-data:',
	'apisb-select-action' => 'Välj handling',
	'apisb-select-query' => 'Vad ska begäras?',
	'apisb-select-value' => 'Välj värde',
	'apisb-loading' => 'Läser in...',
	'apisb-load-error' => 'Fel uppstod när API-beskrivningen skulle läsas in',
	'apisb-request-error' => 'Fel uppstod när API skulle begäras',
	'apisb-namespaces-error' => 'Fel uppstod när namnrymden skulle läsas in',
	'apisb-ns-main' => '(Huvud)',
	'apisb-submit' => 'Göra en begäran',
	'apisb-query-prop' => 'Egenskaper',
	'apisb-query-list' => 'Listor',
	'apisb-query-meta' => 'Metainformation',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'apisb-parameters' => 'పరామితులు',
	'apisb-result' => 'ఫలితం',
	'apisb-select-action' => 'చర్యను ఎంచుకోండి',
	'apisb-loading' => 'లోడవుతోంది...',
	'apisb-ns-main' => '(మొదటి)',
	'apisb-query-list' => 'జాబితాలు',
	'apisb-query-meta' => 'మెటా సమాచారం',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'apisb-desc' => 'Nagpapahintulot ng pagkumpuni ng mga pagtawag ng [//www.mediawiki.org/wiki/API MediaWiki API] mula sa pantingin-tingin',
	'apisandbox' => 'Kahong buhanginan ng API',
	'apisb-no-js' => "'''Kamalian''': nangangailangan ng JavaScript ang tampok na ito.",
	'apisb-intro' => "Gamitin ang pahinang ito upang mag-eksperimento sa pamamagitan ng '''API ng MediaWiki'''.
Sumangguni sa [//www.mediawiki.org/wiki/API dokumentasyon ng API] para sa karagdagan pang mga detalye sa paggamit ng API.",
	'apisb-api-disabled' => 'Hindi pinagagana ang API sa sityong ito.',
	'apisb-parameters' => 'Mga parametro',
	'apisb-result' => 'Kinalabasan',
	'apisb-request-url' => 'Hilingin ang URL:',
	'apisb-request-post' => 'Dato ng POST:',
	'apisb-select-action' => 'Piliin ang kilos',
	'apisb-select-query' => 'Ano ang itatanong?',
	'apisb-select-value' => 'Piliin ang halaga',
	'apisb-loading' => 'Ikinakarga...',
	'apisb-load-error' => 'Kamalian sa pagkakarga ng paglalarawan ng API',
	'apisb-request-error' => 'Kamalian sa pagsasagawa ng hiling ng API',
	'apisb-namespaces-error' => 'Kamalian sa pagkakarga ng mga puwang ng pangalan',
	'apisb-ns-main' => '(Pangunahin)',
	'apisb-submit' => 'Gumawa ng kahilingan',
	'apisb-query-prop' => 'Mga katangiang-ari',
	'apisb-query-list' => 'Mga talaan',
	'apisb-query-meta' => 'Kabatirang meta',
);

/** Turkish (Türkçe)
 * @author Emperyan
 */
$messages['tr'] = array(
	'apisb-parameters' => 'Parametreler',
	'apisb-result' => 'Sonuç',
	'apisb-loading' => 'Yükleniyor...',
	'apisb-ns-main' => '(Ana)',
	'apisb-query-prop' => 'Özellikler',
	'apisb-query-list' => 'Listeler',
);

/** Ukrainian (Українська)
 * @author Microcell
 * @author Sodmy
 */
$messages['uk'] = array(
	'apisb-desc' => 'Дозволяє налагоджувати виклики [//www.mediawiki.org/wiki/API MediaWiki API] з браузера',
	'apisandbox' => 'Майданчик для тестування API',
	'apisb-no-js' => "'''Помилка''': ця функція вимагає JavaScript.",
	'apisb-intro' => "Ця сторінка служить для експериментування з '''MediaWiki API'''.
Звертайтеся до [//www.mediawiki.org/wiki/API документації] для докладнішої інформації про використання API.",
	'apisb-api-disabled' => 'API вимкнуто на цьому сайті.',
	'apisb-parameters' => 'Параметри',
	'apisb-result' => 'Результат',
	'apisb-request-url' => 'URL-адреса запиту:',
	'apisb-request-post' => 'POST данні:',
	'apisb-select-action' => 'Виберіть дію',
	'apisb-select-query' => 'Що запитати?',
	'apisb-select-value' => 'Оберіть значення',
	'apisb-loading' => 'Завантаження...',
	'apisb-load-error' => 'Помилка завантаження API опису',
	'apisb-request-error' => 'Помилка виконання запиту API',
	'apisb-namespaces-error' => 'Помилка завантаження простору імен',
	'apisb-ns-main' => '(Основний)',
	'apisb-submit' => 'Зробити запит',
	'apisb-query-prop' => 'Властивості',
	'apisb-query-list' => 'Списки',
	'apisb-query-meta' => 'Мета-інформація',
	'apisb-generic-parameters' => 'Загальні параметри',
	'apisb-generator-parameters' => 'Генератор',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Trần Nguyễn Minh Huy
 */
$messages['vi'] = array(
	'apisb-desc' => 'Cho phép gỡ lỗi các lần gọi [//www.mediawiki.org/wiki/API API của MediaWiki] trong trình duyệt',
	'apisandbox' => 'Chỗ thử API',
	'apisb-no-js' => "'''Lỗi:''' Tính năng này cần JavaScript.",
	'apisb-intro' => "Trang này dùng để thử nghiệm với '''API của MediaWiki'''.
	Hãy tra cứu [//www.mediawiki.org/wiki/API tài liệu API] để biết chi tiết về cách sử dụng API.",
	'apisb-api-disabled' => 'API đã bị vô hiệu hóa trên trang web này.',
	'apisb-parameters' => 'Các tham số',
	'apisb-result' => 'Kết quả',
	'apisb-request-url' => 'URL của yêu cầu:',
	'apisb-request-post' => 'Dữ liệu POST:',
	'apisb-select-action' => 'Chọn tác vụ',
	'apisb-select-query' => 'Bạn muốn truy vấn gì?',
	'apisb-select-value' => 'Chọn giá trị',
	'apisb-loading' => 'Đang tải…',
	'apisb-load-error' => 'Lỗi khi tải miêu tả API',
	'apisb-request-error' => 'Lỗi khi phản ứng yêu cầu API',
	'apisb-namespaces-error' => 'Lỗi khi tải các không gian tên',
	'apisb-ns-main' => '(Chính)',
	'apisb-submit' => 'Yêu cầu',
	'apisb-query-prop' => 'Thuộc tính',
	'apisb-query-list' => 'Danh sách',
	'apisb-query-meta' => 'Siêu thông tin',
	'apisb-generic-parameters' => 'Tham số chung',
	'apisb-generator-parameters' => 'Bộ xuất phát',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Hydra
 * @author PhiLiP
 * @author Xiaomingyan
 */
$messages['zh-hans'] = array(
	'apisb-desc' => '允许调试 [//www.mediawiki.org/wiki/API MediaWiki API] 从浏览器的调用',
	'apisandbox' => 'API 沙箱',
	'apisb-no-js' => "'''错误'''：此功能需要 JavaScript。",
	'apisb-api-disabled' => '此站点上禁用了 API。',
	'apisb-parameters' => '参数',
	'apisb-result' => '结果',
	'apisb-request-url' => '请求的 URL：',
	'apisb-request-post' => 'POST数据：',
	'apisb-select-action' => '选择操作',
	'apisb-select-query' => '查询又如何？',
	'apisb-select-value' => '选择值',
	'apisb-loading' => '正在载入...',
	'apisb-load-error' => '加载 API 说明时出错',
	'apisb-request-error' => '执行 API 请求时出错',
	'apisb-namespaces-error' => '载入名字空间出错',
	'apisb-ns-main' => '（主）',
	'apisb-submit' => '提出要求',
	'apisb-query-prop' => '属性',
	'apisb-query-list' => '列表',
	'apisb-query-meta' => 'Meta 信息',
);

