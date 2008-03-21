<?php
/**
 * Internationalization file for the Semantic Drilldown extension
 *
 * @addtogroup Extensions
*/

$messages = array();

/** English
 * @author Yaron Koren
 */
$messages['en'] = array(
	// user messages
	'browsedata' => 'Browse data',
	'sd_browsedata_choosecategory' => 'Choose a category',
	'sd_browsedata_viewcategory' => 'view category',
	'sd_browsedata_subcategory' => 'Subcategory',
	'sd_browsedata_other' => 'Other',
	'sd_browsedata_none' => 'None',
	'sd_browsedata_filterbyvalue' => 'Filter by this value',
	'sd_browsedata_filterbysubcategory' => 'Filter by this subcategory',
	'sd_browsedata_otherfilter' => 'Show pages with another value for this filter',
	'sd_browsedata_nonefilter' => 'Show pages with no value for this filter',
        'sd_browsedata_removefilter' => 'Remove this filter',
        'sd_browsedata_removesubcategoryfilter' => 'Remove this subcategory filter',
        'sd_browsedata_resetfilters' => 'Reset filters',
	'filters' => 'Filters',
	'sd_filters_docu' => 'The following filters exist in {{SITENAME}}:',
	'createfilter' => 'Create a filter',
	'sd_createfilter_name' => 'Name:',
	'sd_createfilter_property' => 'Property that this filter covers:',
	'sd_createfilter_usepropertyvalues' => 'Use all values of this property for the filter',
	'sd_createfilter_usecategoryvalues' => 'Get values for filter from this category:',
	'sd_createfilter_usedatevalues' => 'Use date ranges for this filter with this time period:',
	'sd_createfilter_entervalues' => 'Enter values for filter manually (values should be separated by commas - if a value contains a comma, replace it with "\,"):',
	'sd_createfilter_label' => 'Label for this filter (optional):',
	'sd_createfilter_requirefilter' => 'Require another filter to be selected before this one is displayed:',
	'sd_blank_error' => 'cannot be blank',

	// content messages
	'sd_filter_coversproperty' => 'This filter covers the property $1.',
	'sd_filter_getsvaluesfromcategory' => 'It gets its values from the category $1.',
	'sd_filter_usestimeperiod' => 'It uses $1 as its time period.',
	'sd_filter_year' => 'Year',
	'sd_filter_month' => 'Month',
	'sd_filter_hasvalues' => 'It has the values $1.',
	'sd_filter_requiresfilter' => 'It requires the presence of the filter $1.',
	'sd_filter_haslabel' => 'It has the label $1.',
);

/** Afrikaans (Afrikaans)
 * @author SPQRobin
 */
$messages['af'] = array(
	'sd_createfilter_name' => 'Naam:',
	'sd_filter_month'      => 'Maand',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'browsedata'                            => 'تصفح البيانات',
	'sd_browsedata_choosecategory'          => 'اختر تصنيفا',
	'sd_browsedata_viewcategory'            => 'عرض التصنيف',
	'sd_browsedata_subcategory'             => 'تصنيف فرعي',
	'sd_browsedata_other'                   => 'آخر',
	'sd_browsedata_none'                    => 'لا شيء',
	'sd_browsedata_filterbyvalue'           => 'فلترة بواسطة هذه القيمة',
	'sd_browsedata_filterbysubcategory'     => 'فلترة بواسطة هذا التصنيف الفرعي',
	'sd_browsedata_otherfilter'             => 'اعرض الصفحات بقيمة أخرى لهذا الفلتر',
	'sd_browsedata_nonefilter'              => 'اعرض الصفحات التي هي بدون قيمة لهذا الفلتر',
	'sd_browsedata_removefilter'            => 'أزل هذا الفلتر',
	'sd_browsedata_removesubcategoryfilter' => 'أزل فلتر التصنيف الفرعي هذا',
	'sd_browsedata_resetfilters'            => 'أعد ضبط الفلاتر',
	'filters'                               => 'فلاتر',
	'sd_filters_docu'                       => 'الفلاتر التالية موجودة في {{SITENAME}}:',
	'createfilter'                          => 'إنشاء فلتر',
	'sd_createfilter_name'                  => 'الاسم:',
	'sd_createfilter_property'              => 'الخاصية التي يغطيها هذا الفلتر:',
	'sd_createfilter_usepropertyvalues'     => 'استخدم كل قيم هذه الخاصية للفلتر',
	'sd_createfilter_usecategoryvalues'     => 'احصل على القيم للفلتر من هذا التصنيف:',
	'sd_createfilter_usedatevalues'         => 'استخدم نطاقات زمنية لهذا الفلتر بهذه الفترة الزمنية:',
	'sd_createfilter_entervalues'           => 'أدخل القيم للفلتر يدويا (القيم ينبغي أن يتم فصلها بواسطة فاصلات - لو أن قيمة ما تحتوي على فاصلة، استبدلها ب "\\,"):',
	'sd_createfilter_label'                 => 'علامة لهذا الفلتر (اختياري):',
	'sd_createfilter_requirefilter'         => 'يتطلب اختيار فلتر آخر قبل أن يتم عرض هذا:',
	'sd_blank_error'                        => 'لا يمكن أن يكون فارغا',
	'sd_filter_coversproperty'              => 'هذا الفلتر يغطي الخاصية $1.',
	'sd_filter_getsvaluesfromcategory'      => 'يحصل على قيمه من التصنيف $1.',
	'sd_filter_usestimeperiod'              => 'يستخدم $1 كفترته الزمنية.',
	'sd_filter_year'                        => 'عام',
	'sd_filter_month'                       => 'شهر',
	'sd_filter_hasvalues'                   => 'يمتلك القيم $1.',
	'sd_filter_requiresfilter'              => 'يتطلب وجود الفلتر $1.',
	'sd_filter_haslabel'                    => 'يمتلك العلامة $1.',
);

/** Kotava (Kotava)
 * @author Wikimistusik
 */
$messages['avk'] = array(
	'browsedata'                            => 'Origwigara',
	'sd_browsedata_choosecategory'          => 'Kiblara va loma',
	'sd_browsedata_viewcategory'            => 'Wira va loma',
	'sd_browsedata_subcategory'             => 'Volveyloma',
	'sd_browsedata_other'                   => 'Ar',
	'sd_browsedata_none'                    => 'Mek',
	'sd_browsedata_filterbyvalue'           => 'Espara kan bata voda',
	'sd_browsedata_filterbysubcategory'     => 'Espara kan bata volveyloma',
	'sd_browsedata_otherfilter'             => 'Nedira va bueem vadjes va ara esparavoda',
	'sd_browsedata_nonefilter'              => 'Nedira va bueem mevadjes va bata espara',
	'sd_browsedata_removefilter'            => 'Tioltera va bata espara',
	'sd_browsedata_removesubcategoryfilter' => 'Tioltera va bata volveylomafa espara',
	'sd_browsedata_resetfilters'            => 'Dimplekura va espara',
	'filters'                               => 'Espasikieem',
	'sd_filters_docu'                       => 'Bata espara se tid in {{SITENAME}} :',
	'createfilter'                          => 'Redura va espara',
	'sd_createfilter_name'                  => 'Yolt :',
	'sd_createfilter_property'              => 'Pilkaca espanon skuna :',
	'sd_createfilter_usepropertyvalues'     => 'Favera va vodeem ke bata esparapilkaca',
	'sd_createfilter_usecategoryvalues'     => 'Plekura va esparavoda mal bata loma :',
	'sd_createfilter_label'                 => 'Kral tori bata espara (rotisa) :',
	'sd_blank_error'                        => 'me rotir vlardafa',
	'sd_filter_coversproperty'              => 'Bata espara va $1 pilkaca skur.',
	'sd_filter_getsvaluesfromcategory'      => 'Mal $1 loma in va voda plekur.',
	'sd_filter_usestimeperiod'              => 'In wetce intaf ugalolk va $1 faver.',
	'sd_filter_year'                        => 'Ilana',
	'sd_filter_month'                       => 'Aksat',
	'sd_filter_hasvalues'                   => 'In va $1 voda se digir.',
	'sd_filter_requiresfilter'              => 'Batcoba va tira ke $1 espasiki kucilar.',
	'sd_filter_haslabel'                    => 'In tir dem $1 kral.',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'sd_browsedata_choosecategory' => 'Избор на категория',
	'sd_browsedata_subcategory'    => 'Подкатегория',
	'sd_browsedata_other'          => 'Други',
	'sd_browsedata_none'           => 'Няма',
	'sd_browsedata_removefilter'   => 'Премахване на филтъра',
	'filters'                      => 'Филтри',
	'createfilter'                 => 'Създаване на филтър',
	'sd_createfilter_name'         => 'Име:',
	'sd_createfilter_label'        => 'Заглавие за този филтър (незадължително):',
	'sd_blank_error'               => 'не може да бъде празно',
	'sd_filter_year'               => 'Година',
	'sd_filter_month'              => 'Месец',
);

/** German (Deutsch)
 * @author Krabina
 */
$messages['de'] = array(
	'browsedata'                            => 'Daten ansehen',
	'sd_browsedata_choosecategory'          => 'Kategorie auswählen',
	'sd_browsedata_viewcategory'            => 'Kategorie ansehen',
	'sd_browsedata_subcategory'             => 'Unterkategorie',
	'sd_browsedata_other'                   => 'Anderes',
	'sd_browsedata_none'                    => 'Keines',
	'sd_browsedata_filterbyvalue'           => 'Filter für diesen Wert',
	'sd_browsedata_filterbysubcategory'     => 'Filter für diese Subkategorie',
	'sd_browsedata_otherfilter'             => 'Zeige Seiten mit einem anderen Wert für diesen Filter',
	'sd_browsedata_nonefilter'              => 'Zeige Seiten mit keinem Wert für diesen Filter',
	'sd_browsedata_removefilter'            => 'Lösche diesen Filter',
	'sd_browsedata_removesubcategoryfilter' => 'Lösche diesen Subkategorie-Filter',
	'sd_browsedata_resetfilters'            => 'Filter zurücksetzen',
	'filters'                               => 'Filter',
	'sd_filters_docu'                       => 'Die folgenden Filter existieren in diesem Wiki:',
	'createfilter'                          => 'Erstelle einen Filter',
	'sd_createfilter_property'              => 'Attribut dieses Filters:',
	'sd_createfilter_usepropertyvalues'     => 'Verwende alle Werte dieses Attributs für den Filter.',
	'sd_createfilter_usecategoryvalues'     => 'Verwende die Werte für den Filter von dieser Kategorie:',
	'sd_createfilter_usedatevalues'         => 'Verwende folgende Zeitangabe für diesen Filter:',
	'sd_createfilter_entervalues'           => 'Verwende diese Werte für den Filter (Werte durch Komma getrennt eingeben. Wenn ein Wert ein Komma enthält, mit "\\," ersetzen.):',
	'sd_createfilter_label'                 => 'Bezeichnung dieses Filters (optional):',
	'sd_createfilter_requirefilter'         => 'Bevor dieser Filter angezeigt wird, muss folgender anderer Filter gesetzt sein:',
	'sd_blank_error'                        => 'darf nicht leer sein',
	'sd_filter_coversproperty'              => 'Dieser Filter betrifft das Attribut $1.',
	'sd_filter_getsvaluesfromcategory'      => 'Er erhält seine Werte aus der Kategorie $1.',
	'sd_filter_usestimeperiod'              => 'Er verwendet $1 als Zeitangabe.',
	'sd_filter_year'                        => 'Jahr',
	'sd_filter_month'                       => 'Monat',
	'sd_filter_hasvalues'                   => 'Er hat den Wert $1.',
	'sd_filter_requiresfilter'              => 'Er setzt den Filter $1 voraus.',
	'sd_filter_haslabel'                    => 'Er hat die Bezeichnung $1.',
);

/** Greek (Ελληνικά)
 * @author Consta
 */
$messages['el'] = array(
	'sd_browsedata_choosecategory' => 'Επιλέξτε μια κατηγορία',
	'filters'                      => 'Φίλτρα',
	'sd_createfilter_name'         => 'Όνομα:',
	'sd_filter_year'               => 'Χρόνος',
	'sd_filter_month'              => 'Μήνας',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'sd_browsedata_subcategory'   => 'Subkategorio',
	'sd_browsedata_other'         => 'Alia',
	'sd_browsedata_filterbyvalue' => 'Filtru laŭ ĉi tiu valuto',
	'sd_createfilter_name'        => 'Nomo:',
	'sd_filter_year'              => 'Jaro',
	'sd_filter_month'             => 'Monato',
);

/** Persian (فارسی)
 * @author Tofighi
 */
$messages['fa'] = array(
	'browsedata'                            => 'نمایش اطلاعات',
	'sd_browsedata_choosecategory'          => 'انتخاب یک رده',
	'sd_browsedata_viewcategory'            => 'نمایش رده',
	'sd_browsedata_subcategory'             => 'زیررده',
	'sd_browsedata_other'                   => 'دیگر',
	'sd_browsedata_none'                    => 'هیچکدام',
	'sd_browsedata_filterbyvalue'           => 'فیلتر با این مقدار',
	'sd_browsedata_filterbysubcategory'     => 'فیلتر با این زیر رده',
	'sd_browsedata_otherfilter'             => 'نمایش صفحاتی با مقدار دیگر برای این فیلتر',
	'sd_browsedata_nonefilter'              => 'نمایش صفحات بدون مقدار برای این فیلتر',
	'sd_browsedata_removefilter'            => 'حذف این فیلتر',
	'sd_browsedata_removesubcategoryfilter' => 'حذف این فیلتر زیر رده',
	'sd_browsedata_resetfilters'            => 'تنظیم فیلترها از نو',
	'filters'                               => 'فیلترها',
	'sd_filters_docu'                       => 'فیلترهای زیر در این ویکی وجود دارد:',
	'createfilter'                          => 'فیلتر بسازید',
	'sd_createfilter_name'                  => 'نام:',
	'sd_createfilter_property'              => 'ویژگی که این فیلتر شامل آن می‌شود:',
	'sd_createfilter_usepropertyvalues'     => 'همه مقادیر این ویژگی را برای این فیلتر به‌کار برید',
	'sd_createfilter_usecategoryvalues'     => 'مقادیر فیلتر را از این رده بگیرید:',
	'sd_createfilter_usedatevalues'         => 'بازه زمانی که به عنوان پریود زمانی این فیلتر به‌کار گرفته شود:',
	'sd_createfilter_entervalues'           => 'مقادیر فیلتر را دستی وارد کنید (مقادیر باید با کاما جدا شوند، اگر یک مقدار کاما دارد، آن‌را با "\\،" جایگزین کنید):',
	'sd_createfilter_label'                 => 'برچسب این فیلتر (دلخواه)',
	'sd_createfilter_requirefilter'         => 'قبل از نمایش این یکی، یک فیلتر دیگر باید انتخاب شود:',
	'sd_blank_error'                        => 'نمی‌تواند خالی باشد',
	'sd_filter_coversproperty'              => 'این فیلتر ویژگی $1 را شامل می‌شود.',
	'sd_filter_getsvaluesfromcategory'      => 'مقادیرش را از رده $1 می‌گیرد',
	'sd_filter_usestimeperiod'              => '$1 را به عنوان پریود زمانی به‌کار می‌برد',
	'sd_filter_year'                        => 'سال',
	'sd_filter_month'                       => 'ماه',
	'sd_filter_hasvalues'                   => 'مقادیر $1 را دارد.',
	'sd_filter_requiresfilter'              => 'به وجود فیلتر $1 احتیاج دارد.',
	'sd_filter_haslabel'                    => 'برچسب $1 دارد.',
);

/** Finnish (Suomi)
 * @author Nike
 */
$messages['fi'] = array(
	'browsedata'                   => 'Datan selaus',
	'sd_browsedata_choosecategory' => 'Valitse luokka',
	'sd_browsedata_viewcategory'   => 'näytä luokka',
	'sd_browsedata_subcategory'    => 'Alaluokka',
	'sd_browsedata_other'          => 'Muu',
	'sd_browsedata_none'           => 'Ei mikään',
	'sd_browsedata_removefilter'   => 'Poista suodin',
	'sd_browsedata_resetfilters'   => 'Nollaa suotimet',
	'filters'                      => 'Suotimet',
	'sd_filters_docu'              => 'Tässä wikissä on seuraavat suotimet:',
	'createfilter'                 => 'Luo suodin',
	'sd_createfilter_name'         => 'Nimi',
	'sd_blank_error'               => 'ei voi olla tyhjä',
	'sd_filter_year'               => 'Vuosi',
	'sd_filter_month'              => 'Kuukausi',
);

/** French (Français)
 * @author Grondin
 * @author Sherbrooke
 * @author Urhixidur
 */
$messages['fr'] = array(
	'browsedata'                            => 'Chercher les données',
	'sd_browsedata_choosecategory'          => 'Choisir une catégorie',
	'sd_browsedata_viewcategory'            => 'Voir la catégorie',
	'sd_browsedata_subcategory'             => 'Sous-catégorie',
	'sd_browsedata_other'                   => 'Autre',
	'sd_browsedata_none'                    => 'Néant',
	'sd_browsedata_filterbyvalue'           => 'Filtré par valeur',
	'sd_browsedata_filterbysubcategory'     => 'Filtrer par cette sous-catégorie',
	'sd_browsedata_otherfilter'             => 'Voir les pages avec une autre valeur pour ce filtre',
	'sd_browsedata_nonefilter'              => 'Voir les pages avec aucune valeur pour ce filtre',
	'sd_browsedata_removefilter'            => 'Retirer ce filtre',
	'sd_browsedata_removesubcategoryfilter' => 'Retirer cette sous-catégorie de filtre',
	'sd_browsedata_resetfilters'            => 'Remise à zéro des filtres',
	'filters'                               => 'Filtres',
	'sd_filters_docu'                       => 'Le filtre suivant existe sur {{SITENAME}} :',
	'createfilter'                          => 'Créer un filtre',
	'sd_createfilter_name'                  => 'Nom :',
	'sd_createfilter_property'              => 'Propriété que ce filtre couvrira :',
	'sd_createfilter_usepropertyvalues'     => 'Utiliser, pour ce filtre, toutes les valeurs de cette propriété',
	'sd_createfilter_usecategoryvalues'     => 'Obtenir les valeurs pour ce filtre à partir de cette catégorie :',
	'sd_createfilter_usedatevalues'         => 'Utilise des blocs de date pour ce filtre avec cette période temporelle :',
	'sd_createfilter_entervalues'           => 'Entrez manuellement les valeurs pour ce filtre (les valeurs devront être séparées par des virgules - si une valeur contient une virgule, remplacez-la par « \\, ») :',
	'sd_createfilter_label'                 => 'Étiquette pour ce filtre (facultatif) :',
	'sd_createfilter_requirefilter'         => 'Exiger qu’un autre filtre soit sélectionné avant que celui-ci ne soit affiché :',
	'sd_blank_error'                        => 'ne peut être laissé en blanc',
	'sd_filter_coversproperty'              => 'Ce filtre couvre la propriété $1.',
	'sd_filter_getsvaluesfromcategory'      => 'Il obtient ses valeurs à partir de la catégorie $1.',
	'sd_filter_usestimeperiod'              => 'Il utilise $1 comme durée de sa période',
	'sd_filter_year'                        => 'Année',
	'sd_filter_month'                       => 'Mois',
	'sd_filter_hasvalues'                   => 'Il a $1 comme valeur',
	'sd_filter_requiresfilter'              => 'Il nécessite la présence du filtre $1.',
	'sd_filter_haslabel'                    => 'Étiqueté $1.',
);

/** Galician (Galego)
 * @author Alma
 */
$messages['gl'] = array(
	'sd_browsedata_choosecategory'          => 'Elexir unha categoría',
	'sd_browsedata_viewcategory'            => 'ver categoría',
	'sd_browsedata_subcategory'             => 'Subcategoría',
	'sd_browsedata_other'                   => 'Outro',
	'sd_browsedata_none'                    => 'Ningún',
	'sd_browsedata_filterbyvalue'           => 'Filtrar por este valor',
	'sd_browsedata_filterbysubcategory'     => 'Filtrar por esta subcategoría',
	'sd_browsedata_otherfilter'             => 'Amosar páxinas con outro valor para este filtro',
	'sd_browsedata_nonefilter'              => 'Amosar páxinas con ningún valor para este filtro',
	'sd_browsedata_removefilter'            => 'Eliminar este filtro',
	'sd_browsedata_removesubcategoryfilter' => 'Eliminar este filtro de subcategorías',
	'sd_browsedata_resetfilters'            => 'Eliminar filtros',
	'filters'                               => 'Filtros',
	'sd_filters_docu'                       => 'Os seguintes filtros existen en {{SITENAME}}:',
	'createfilter'                          => 'Crear un filtro',
	'sd_createfilter_name'                  => 'Nome:',
	'sd_createfilter_property'              => 'Propiedade que o filtro inclúe:',
	'sd_createfilter_usepropertyvalues'     => 'Usar todos os valores da propiedade para o filtro',
	'sd_createfilter_usecategoryvalues'     => 'Obter os valores para o filtro desta categoría:',
	'sd_createfilter_entervalues'           => 'Introduza valores para filtrar manualmente (os valores deben separarse por comas - se o valor contén unha coma, substitúaa por "\\,"):',
	'sd_blank_error'                        => 'non pode estar en branco',
	'sd_filter_coversproperty'              => 'O filtro inclúe a propiedade $1.',
	'sd_filter_year'                        => 'Ano',
	'sd_filter_month'                       => 'Mes',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'browsedata'                            => 'Daty přepytać',
	'sd_browsedata_choosecategory'          => 'Wubjer kategoriju',
	'sd_browsedata_viewcategory'            => 'Kategoriju wobhladać',
	'sd_browsedata_subcategory'             => 'Podkategorija',
	'sd_browsedata_other'                   => 'Druhe',
	'sd_browsedata_none'                    => 'Žane',
	'sd_browsedata_filterbyvalue'           => 'Po tutej hódnoće filtrować',
	'sd_browsedata_filterbysubcategory'     => 'Po tutej podkategoriji filtorwać',
	'sd_browsedata_otherfilter'             => 'Strony z druhej hódnotu za tutón filter pokazać',
	'sd_browsedata_nonefilter'              => 'Strony bjez hódnoty za tutón filter pokazać',
	'sd_browsedata_removefilter'            => 'Tutón filter wotstronić',
	'sd_browsedata_removesubcategoryfilter' => 'Tutón podkategorijny filter wotstronić',
	'sd_browsedata_resetfilters'            => 'Filtry wróćo stajić',
	'filters'                               => 'Filtry',
	'sd_filters_docu'                       => 'Slědowace filtry we {{GRAMMAR:Lokatiw|{{SITENAME}}}} eksistuja:',
	'createfilter'                          => 'Wutwor filter',
	'sd_createfilter_name'                  => 'Mjeno:',
	'sd_createfilter_property'              => 'Kajkosć tutho filtra:',
	'sd_createfilter_usepropertyvalues'     => 'Wužij wšě hódnoty tuteje kajkosće za filter',
	'sd_createfilter_usecategoryvalues'     => 'Wobstaraj hódnoty za filter z tuteje kategorije:',
	'sd_createfilter_usedatevalues'         => 'Wužij datumowe wotrězk za tutón filter z tutej dobu:',
	'sd_createfilter_entervalues'           => 'Zapodaj hódnoty za filter manuelnje (hódnoty měli so z komami rozdźělić  - jeli hódnota komu wobsahuje, narunaj ju přez "\\", "):',
	'sd_createfilter_label'                 => 'Mjeno tutoho filtra (opcionalny):',
	'sd_createfilter_requirefilter'         => 'Zo by tutón filter zwobrazniło, je druhi filter trjeba:',
	'sd_blank_error'                        => 'njesmě prózdny być',
	'sd_filter_coversproperty'              => 'Tutón filter wobsahuje kajkosć $1.',
	'sd_filter_getsvaluesfromcategory'      => 'Wobsahuje swoje hódnoty z kategorije $1.',
	'sd_filter_usestimeperiod'              => 'Wužiwa $1 jako dobu.',
	'sd_filter_year'                        => 'Lěto',
	'sd_filter_month'                       => 'Měsac',
	'sd_filter_hasvalues'                   => 'Ma hódnoty $1.',
	'sd_filter_requiresfilter'              => 'Trjeba filter $1.',
	'sd_filter_haslabel'                    => 'Ma mjeno $1.',
);

/** Hungarian (Magyar)
 * @author Dorgan
 */
$messages['hu'] = array(
	'sd_filter_year'  => 'Év',
	'sd_filter_month' => 'Hónap',
);

/** Icelandic (Íslenska)
 * @author SPQRobin
 */
$messages['is'] = array(
	'sd_createfilter_name' => 'Nafn:',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Lovekhmer
 * @author Chhorran
 */
$messages['km'] = array(
	'browsedata'                   => 'រាវរកទិន្នន័យ',
	'sd_browsedata_choosecategory' => 'ជ្រើសរើសចំណាត់ថ្នាក់ក្រុម',
	'sd_browsedata_viewcategory'   => 'មើលចំណាត់ថ្នាក់ក្រុម',
	'sd_browsedata_subcategory'    => 'ចំណាត់ក្រុមរង',
	'sd_browsedata_other'          => 'ផ្សេងៗទៀត',
	'sd_browsedata_none'           => 'ទទេ',
	'sd_createfilter_name'         => 'ឈ្មោះ៖',
	'sd_filter_year'               => 'ឆ្នាំ',
	'sd_filter_month'              => 'ខែ',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'sd_browsedata_choosecategory' => 'Eng Kategorie wielen',
	'sd_browsedata_viewcategory'   => 'Kategorie weisen',
	'sd_browsedata_subcategory'    => 'Ënnerkategorie',
	'sd_browsedata_other'          => 'Aner',
	'sd_browsedata_none'           => 'Keen',
	'filters'                      => 'Filteren',
	'sd_createfilter_name'         => 'Numm:',
	'sd_filter_year'               => 'Joer',
	'sd_filter_month'              => 'Mount',
);

/** Marathi (मराठी)
 * @author Mahitgar
 */
$messages['mr'] = array(
	'sd_browsedata_other' => 'इतर',
	'sd_filter_year'      => 'वर्ष',
);

/** Dutch (Nederlands)
 * @author Siebrand
 * @author SPQRobin
 */
$messages['nl'] = array(
	'browsedata'                            => 'Gegevens bekijken',
	'sd_browsedata_choosecategory'          => 'Kies een categorie',
	'sd_browsedata_viewcategory'            => 'categorie bekijken',
	'sd_browsedata_subcategory'             => 'Ondercategorie',
	'sd_browsedata_other'                   => 'Andere',
	'sd_browsedata_none'                    => 'Geen',
	'sd_browsedata_filterbyvalue'           => 'Op deze waarde filteren',
	'sd_browsedata_filterbysubcategory'     => 'Op deze ondercategorie filteren',
	'sd_browsedata_otherfilter'             => "Pagina's met een andere waarde voor deze filter bekijken",
	'sd_browsedata_nonefilter'              => "Pagina's zonder waarde voor deze filter bekijken",
	'sd_browsedata_removefilter'            => 'Deze filter verwijderen',
	'sd_browsedata_removesubcategoryfilter' => 'Deze ondercategoriefilter verwijderen',
	'sd_browsedata_resetfilters'            => 'Filters opnieuw instellen',
	'filters'                               => 'Filters',
	'sd_filters_docu'                       => 'In {{SITENAME}} bestaan de volgende filters:',
	'createfilter'                          => 'Filter aanmaken',
	'sd_createfilter_name'                  => 'Naam:',
	'sd_createfilter_property'              => 'Eigenschap voor deze filter:',
	'sd_createfilter_usepropertyvalues'     => 'Alle waarden voor deze eigenschap voor deze filter gebruiken',
	'sd_createfilter_usecategoryvalues'     => 'Waarden voor deze filter uit de volgende categorie halen:',
	'sd_createfilter_usedatevalues'         => 'Gebruik voor deze filter de volgende datumreeks:',
	'sd_createfilter_entervalues'           => 'Waarden voor de filter handmatig invoeren (waarden moeten gescheiden worden door komma\'s - als de waarde een komma bevast, vervang die dan door "\\,"):',
	'sd_createfilter_label'                 => 'Label voor deze filter (optioneel):',
	'sd_createfilter_requirefilter'         => 'Selectie van een andere filter voor deze filter zichtbaar is vereisen:',
	'sd_blank_error'                        => 'mag niet leeg zijn',
	'sd_filter_coversproperty'              => 'Deze filter heeft betrekking op de eigenschap $1.',
	'sd_filter_getsvaluesfromcategory'      => 'Het haalt de waarden van de categorie $1.',
	'sd_filter_usestimeperiod'              => 'Het gebruikt $1 als de tijdsduur.',
	'sd_filter_year'                        => 'Jaar',
	'sd_filter_month'                       => 'Maand',
	'sd_filter_hasvalues'                   => 'Het heeft de waarden $1.',
	'sd_filter_requiresfilter'              => 'De filter $1 moet aanwezig zijn.',
	'sd_filter_haslabel'                    => 'Het heeft het label $1.',
);

/** Norwegian (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'browsedata'                            => 'Bla gjennom data',
	'sd_browsedata_choosecategory'          => 'Velg en kategori',
	'sd_browsedata_viewcategory'            => 'se kategori',
	'sd_browsedata_subcategory'             => 'Underkategori',
	'sd_browsedata_other'                   => 'Annen',
	'sd_browsedata_none'                    => 'Ingen',
	'sd_browsedata_filterbyvalue'           => 'Foøtrer etter denne verdien',
	'sd_browsedata_filterbysubcategory'     => 'Filtrer etter denne underkategorien',
	'sd_browsedata_otherfilter'             => 'Vis sider med en annen verdi for dette filteret',
	'sd_browsedata_nonefilter'              => 'Vis sider uten noen verdi for dette filteret',
	'sd_browsedata_removefilter'            => 'Fjern dette filteret',
	'sd_browsedata_removesubcategoryfilter' => 'Fjern dette underkategorifilteret',
	'sd_browsedata_resetfilters'            => 'Resett filtre',
	'filters'                               => 'Filtre',
	'sd_filters_docu'                       => 'Følgende filtre finnes på {{SITENAME}}:',
	'createfilter'                          => 'Opprett et filter',
	'sd_createfilter_name'                  => 'Navn:',
	'sd_createfilter_property'              => 'Egenskap dette filteret dekker:',
	'sd_createfilter_usepropertyvalues'     => 'Bruk alle verdier av denne egenskapen for filteret',
	'sd_createfilter_usecategoryvalues'     => 'Få verdier for filteret fra denne kategorien:',
	'sd_createfilter_usedatevalues'         => 'Bruk datoområder for dette filteret med denne tidsperioden:',
	'sd_createfilter_entervalues'           => 'Skriv inn verdier for filteret manuelt (verdier burde adskilles med komma – om en verdi inneholder et komma, erstatt det med «\\,»);',
	'sd_createfilter_label'                 => 'Etikett for dette filteret (valgfritt):',
	'sd_createfilter_requirefilter'         => 'Krev at et annet filter velges før dette vises:',
	'sd_blank_error'                        => 'kan ikke være blank',
	'sd_filter_coversproperty'              => 'Dette filteret dekker egenskapen $1.',
	'sd_filter_getsvaluesfromcategory'      => 'Det får verdiene sine fra kategorien $1.',
	'sd_filter_usestimeperiod'              => 'Det bruker $1 som tidsperiode.',
	'sd_filter_year'                        => 'År',
	'sd_filter_month'                       => 'Måned',
	'sd_filter_hasvalues'                   => 'Den har verdiene $1.',
	'sd_filter_requiresfilter'              => 'Det krever at filteret $1 er til stede.',
	'sd_filter_haslabel'                    => 'Det har etiketten $1.',
);

/** Northern Sotho (Sesotho sa Leboa)
 * @author Mohau
 */
$messages['nso'] = array(
	'sd_browsedata_viewcategory' => 'Nyakorela sehlopha',
	'sd_browsedata_subcategory'  => 'Sehlophana',
	'sd_createfilter_name'       => 'Leina:',
	'sd_filter_year'             => 'Ngwaga',
	'sd_filter_month'            => 'Kgwedi',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'browsedata'                            => 'Cercar las donadas',
	'sd_browsedata_choosecategory'          => 'Causir una categoria',
	'sd_browsedata_viewcategory'            => 'Veire la categoria',
	'sd_browsedata_subcategory'             => 'Soscategoria',
	'sd_browsedata_other'                   => 'Autre',
	'sd_browsedata_none'                    => 'Nonrés',
	'sd_browsedata_filterbyvalue'           => 'Filtrat per valor',
	'sd_browsedata_filterbysubcategory'     => 'Filtrar per aquesta soscategoria',
	'sd_browsedata_otherfilter'             => 'Veire las paginas amb una autra valor per aqueste filtre',
	'sd_browsedata_nonefilter'              => 'Veire las paginas amb pas cap de valor per aqueste filtre',
	'sd_browsedata_removefilter'            => 'Levar aqueste filtre',
	'sd_browsedata_removesubcategoryfilter' => 'Levar aquesta soscategoria de filtre',
	'sd_browsedata_resetfilters'            => 'Remesa a zèro dels filtres',
	'filters'                               => 'Filtres',
	'sd_filters_docu'                       => 'Lo filtre seguent existís sus {{SITENAME}} :',
	'createfilter'                          => 'Crear un filtre',
	'sd_createfilter_name'                  => 'Nom :',
	'sd_createfilter_property'              => "Proprietat qu'aqueste filtre cobrirà :",
	'sd_createfilter_usepropertyvalues'     => "Utilizar, per aqueste filtre, totas las valors d'aquesta proprietat",
	'sd_createfilter_usecategoryvalues'     => "Obténer las valors per aqueste filtre a partir d'aquesta categoria :",
	'sd_createfilter_usedatevalues'         => 'Utiliza de blòts de data per aqueste filtre amb aqueste periòde temporal :',
	'sd_createfilter_entervalues'           => 'Entrar manualament las valors per aqueste filtre (las valors deuràn èsser separadas per de virgulas - se una valor conten una virgula, remplaçatz-la per « \\, ») :',
	'sd_createfilter_label'                 => 'Etiqueta per aqueste filtre (facultatiu) :',
	'sd_createfilter_requirefilter'         => "Necessita un filtre devent èsser seleccionat abans qu'aqueste siá afichat :",
	'sd_blank_error'                        => 'pòt pas èsser daissat en blanc',
	'sd_filter_coversproperty'              => 'Aqueste filtre cobrís la proprietat $1.',
	'sd_filter_getsvaluesfromcategory'      => 'Obten sas valors a partir de la categoria $1.',
	'sd_filter_usestimeperiod'              => 'Utiliza $1 coma durada de son periòde',
	'sd_filter_year'                        => 'Annada',
	'sd_filter_month'                       => 'Mes',
	'sd_filter_hasvalues'                   => 'A $1 coma valor',
	'sd_filter_requiresfilter'              => 'Necessita la preséncia del filtre $1.',
	'sd_filter_haslabel'                    => 'Dispausa del labèl $1.',
);

/** Polish (Polski)
 * @author Maire
 */
$messages['pl'] = array(
	'browsedata'                   => 'Przeglądaj dane',
	'sd_browsedata_choosecategory' => 'Wybierz kategorię',
	'sd_browsedata_viewcategory'   => 'podgląd kategorii',
	'sd_browsedata_subcategory'    => 'Kategoria podrzędna',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'sd_browsedata_choosecategory' => 'يوه وېشنيزه ټاکل',
	'sd_browsedata_viewcategory'   => 'وېشنيزه ښکاره کول',
	'sd_browsedata_subcategory'    => 'وړه-وېشنيزه',
	'sd_browsedata_other'          => 'بل',
	'sd_browsedata_none'           => 'هېڅ',
	'sd_createfilter_name'         => 'نوم:',
	'sd_filter_year'               => 'کال',
	'sd_filter_month'              => 'مياشت',
);

/** Portuguese (Português)
 * @author 555
 * @author Lijealso
 */
$messages['pt'] = array(
	'browsedata'                            => 'Navegar pelos dados',
	'sd_browsedata_choosecategory'          => 'Escolha uma categoria',
	'sd_browsedata_viewcategory'            => 'ver categoria',
	'sd_browsedata_subcategory'             => 'subcategoria',
	'sd_browsedata_other'                   => 'Outro',
	'sd_browsedata_none'                    => 'Nenhum',
	'sd_browsedata_filterbyvalue'           => 'Filtrar por este valor',
	'sd_browsedata_filterbysubcategory'     => 'Filtrar por esta subcategoria',
	'sd_browsedata_otherfilter'             => 'Exibir páginas com outro valor para este filtro',
	'sd_browsedata_nonefilter'              => 'Exibir páginas sem valores para este filtro',
	'sd_browsedata_removefilter'            => 'Remover este filtro',
	'sd_browsedata_removesubcategoryfilter' => 'Remover esta subcategoria da função de filtro',
	'sd_browsedata_resetfilters'            => 'Zerar filtros',
	'filters'                               => 'Filtros',
	'sd_filters_docu'                       => '{{SITENAME}} possui os seguintes filtros:',
	'createfilter'                          => 'Criar um filtro',
	'sd_createfilter_name'                  => 'Nome:',
	'sd_createfilter_property'              => 'Propriedades que este filtro abrange:',
	'sd_createfilter_usepropertyvalues'     => 'Usar todos os valores desta propriedade no filtro',
	'sd_createfilter_usecategoryvalues'     => 'Obter valores de filtro a partir desta categoria:',
	'sd_createfilter_label'                 => 'Etiqueta para este filtro (opcional):',
	'sd_createfilter_requirefilter'         => 'Necessita de outro filtro seleccionado antes deste ser exibido:',
	'sd_blank_error'                        => 'não pode estar em branco',
	'sd_filter_coversproperty'              => 'Este filtro abrange a propriedade $1.',
	'sd_filter_usestimeperiod'              => 'Utiliza $1 como seu período de tempo.',
	'sd_filter_year'                        => 'Ano',
	'sd_filter_month'                       => 'Mês',
	'sd_filter_hasvalues'                   => 'Possui os valores $1.',
	'sd_filter_requiresfilter'              => 'Requer a presença do filtro $1.',
	'sd_filter_haslabel'                    => 'Possui a etiqueta $1.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'browsedata'                            => 'Prehliadať údaje',
	'sd_browsedata_choosecategory'          => 'Vyberte kategóriu',
	'sd_browsedata_viewcategory'            => 'zobraziť kategóriu',
	'sd_browsedata_subcategory'             => 'Podkategória',
	'sd_browsedata_other'                   => 'Iné',
	'sd_browsedata_none'                    => 'Žiadne',
	'sd_browsedata_filterbyvalue'           => 'Filtrovať podľa tejto hodnoty',
	'sd_browsedata_filterbysubcategory'     => 'Filtrovať podľa tejto podkategórie',
	'sd_browsedata_otherfilter'             => 'Zobraziť stránky s inou hodnotou tohto filtra',
	'sd_browsedata_nonefilter'              => 'Zobraziť stránky s bez hodnoty tohto filtra',
	'sd_browsedata_removefilter'            => 'Odstrániť tento filter',
	'sd_browsedata_removesubcategoryfilter' => 'Odstrániť tento filter podkategórie',
	'sd_browsedata_resetfilters'            => 'Resetovať filtre',
	'filters'                               => 'Filtre',
	'sd_filters_docu'                       => 'Na {{GRAMMAR:lokál|{{SITENAME}}}} existujú nasledovné filtre:',
	'createfilter'                          => 'Vytvoriť filter',
	'sd_createfilter_name'                  => 'Názov:',
	'sd_createfilter_property'              => 'Vlastnosť, ktorú tento filter pokrýva:',
	'sd_createfilter_usepropertyvalues'     => 'Použiť všetky hodnoty tejto vlastnosti pre tento filter',
	'sd_createfilter_usecategoryvalues'     => 'Získať hodnoty filtra z tejto kategórie:',
	'sd_createfilter_usedatevalues'         => 'Použiť rozsahy dátumov pre tento filter z tohoto časového intervalu:',
	'sd_createfilter_entervalues'           => 'Zadajte hodnoty pre tento filter ručne (hodnoty by mali byť oddelené čiarkami - ak hodnota obsahuje čiarku, nahraďte ju „\\,“):',
	'sd_createfilter_label'                 => 'Označenie tohto filtra (voliteľné):',
	'sd_createfilter_requirefilter'         => 'Vyžadovať, aby bol vybraný iný filter než sa zobrazí tento:',
	'sd_blank_error'                        => 'nemôže byť nevyplnené',
	'sd_filter_coversproperty'              => 'Tento filter pokrýva vlastnosť $1.',
	'sd_filter_getsvaluesfromcategory'      => 'Získava hodnoty z kategórie $1.',
	'sd_filter_usestimeperiod'              => 'Používa ako časový interval $1.',
	'sd_filter_year'                        => 'Rok',
	'sd_filter_month'                       => 'Mesiac',
	'sd_filter_hasvalues'                   => 'Má hodnoty $1.',
	'sd_filter_requiresfilter'              => 'Vyžaduje prítomnosť filtra $1.',
	'sd_filter_haslabel'                    => 'Má označenie $1.',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'browsedata'                        => 'Doaten bekiekje',
	'sd_browsedata_choosecategory'      => 'Wääl ne Kategorie',
	'sd_browsedata_viewcategory'        => 'Kategorie bekiekje',
	'sd_browsedata_subcategory'         => 'Unnerkategorie',
	'sd_browsedata_other'               => 'Uur',
	'sd_browsedata_none'                => 'Neen',
	'filters'                           => 'Filter',
	'sd_filters_docu'                   => 'Do foulgjende Filtere existierje in disse Wiki:',
	'createfilter'                      => 'Moak n Filter',
	'sd_createfilter_name'              => 'Noome:',
	'sd_createfilter_property'          => 'Attribut fon dit Filter:',
	'sd_createfilter_usepropertyvalues' => 'Ferweend aal Wäide fon dit Attribut foar dän Filter.',
	'sd_createfilter_usecategoryvalues' => 'Ferweend do Wäide foar dän Filter fon disse Kategorie:',
	'sd_createfilter_usedatevalues'     => 'Ferweend foulgjende Tiedangoawe foar dissen Filter:',
	'sd_createfilter_entervalues'       => 'Ferweend disse Wäide foar dän Filter (Wäide truch Komma tränd ienreeke. Wan n Wäid n Komma änthaalt, mäd "\\,"ärsätte.):',
	'sd_createfilter_label'             => 'Beteekenge fon dit Filter (optionoal):',
	'sd_createfilter_requirefilter'     => 'Eer dissen Filter anwiest wäd, mout foulgjenden uur Filter sät weese:',
	'sd_blank_error'                    => 'duur nit loos weese',
	'sd_filter_coversproperty'          => 'Dissen Filter beträft dät Attribut $1.',
	'sd_filter_getsvaluesfromcategory'  => 'Hie kricht sien Wäide uut ju Kategorie $1.',
	'sd_filter_usestimeperiod'          => 'Ferwoant $1 as Tiedangoawe.',
	'sd_filter_year'                    => 'Jier',
	'sd_filter_month'                   => 'Mound',
	'sd_filter_hasvalues'               => 'Häd dän Wäid $1.',
	'sd_filter_requiresfilter'          => 'Sät dän Filter $1 foaruut.',
	'sd_filter_haslabel'                => 'Häd ju Beteekenge $1.',
);

/** Swedish (Svenska)
 * @author M.M.S.
 */
$messages['sv'] = array(
	'sd_browsedata_choosecategory' => 'Välj en kategori',
	'sd_browsedata_viewcategory'   => 'visa kategori',
	'sd_browsedata_subcategory'    => 'Subkategori',
	'sd_browsedata_other'          => 'Andra',
	'sd_browsedata_none'           => 'Ingen',
	'sd_createfilter_name'         => 'Namn:',
	'sd_filter_year'               => 'År',
	'sd_filter_month'              => 'Månad',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'browsedata'                        => 'భోగట్టాని చూడండి',
	'sd_browsedata_choosecategory'      => 'ఓ వర్గాన్ని ఎంచుకోండి',
	'sd_browsedata_viewcategory'        => 'వర్గాన్ని చూడండి',
	'sd_browsedata_subcategory'         => 'ఉపవర్గం',
	'sd_browsedata_other'               => 'ఇతర',
	'sd_browsedata_none'                => 'ఏమీలేదు',
	'sd_browsedata_removefilter'        => 'ఈ వడపోతని తొలగించు',
	'filters'                           => 'వడపోతలు',
	'sd_createfilter_name'              => 'పేరు:',
	'sd_createfilter_usecategoryvalues' => 'వడపోతకి విలువలని ఈ వర్గంనుండి తీసుకోవాలి:',
	'sd_blank_error'                    => 'ఖాళీగా ఉండకూడదు',
	'sd_filter_year'                    => 'సంవత్సరం',
	'sd_filter_month'                   => 'నెల',
);

/** Tajik (Тоҷикӣ)
 * @author Ibrahim
 */
$messages['tg'] = array(
	'sd_browsedata_other'              => 'Дигар',
	'sd_createfilter_name'             => 'Ном:',
	'sd_createfilter_entervalues'      => 'Миқдорҳоро барои филтр дастӣ ворид кунед (миқдорҳо бояд бо вергулҳо ҷудо шаванд - агар миқдор вергул дошта бошад, онро бо "\\," иваз кунед):',
	'sd_createfilter_label'            => 'Барчасб барои ин филтр (ихтиёрӣ):',
	'sd_createfilter_requirefilter'    => 'Қабл аз намоиши ин яке, филтри дигар бояд интихоб шавад:',
	'sd_blank_error'                   => 'наметавонад холӣ бошад',
	'sd_filter_coversproperty'         => 'Ин филтр вижагии $1-ро шомил мешавад.',
	'sd_filter_getsvaluesfromcategory' => 'Миқдорҳояшро аз гурӯҳи $1 мегирад.',
	'sd_filter_usestimeperiod'         => '$1-ро ба унвони давраи вақти худ ба кор мебарад.',
	'sd_filter_year'                   => 'Сол',
	'sd_filter_month'                  => 'Моҳ',
	'sd_filter_hasvalues'              => 'Миқдорҳои $1-ро дорад.',
	'sd_filter_requiresfilter'         => 'Ба вуҷуди филтри $1 эҳтиёҷ дорад.',
	'sd_filter_haslabel'               => 'Ин барчасби $1 дорад.',
);

/** Volapük (Volapük)
 * @author Malafaya
 */
$messages['vo'] = array(
	'sd_browsedata_other'  => 'Votik',
	'sd_createfilter_name' => 'Nem:',
	'sd_filter_year'       => 'Yel',
	'sd_filter_month'      => 'Mul',
);

/** Mainland Chinese
 * @author Roc Michael
 */
$messages['zh-cn'] = array(
	// user messages
	'browsedata' => '查看资料',
	'sd_browsedata_choosecategory' => '选取某项分类(category)',
	'sd_browsedata_viewcategory' => '查看分类页面',
	'sd_browsedata_subcategory' => '子分类',
	'sd_browsedata_other' => '其他的',
	'sd_browsedata_none' => '无',
	'filters' => '筛选器',
	'sd_filters_docu' => '此wiki系统内已设有如下的筛选器(filters)',
	'createfilter' => '建立筛选器',
	'sd_createfilter_name' => '名称：',
	'sd_createfilter_property' => '此一筛选器所涵盖的性质：',
	'sd_createfilter_usepropertyvalues' => '将此一性质的值设给筛选器所用',
	'sd_createfilter_usecategoryvalues' => '从此分类中为筛选器取得筛选值：',
	'sd_createfilter_usedatevalues' => '以此一期间为此筛选器设置日期范围值：',
	'sd_createfilter_entervalues' => '以手工赋予值的方式设置此一筛选器(其值必须以半型逗号分隔「,」，如果您的资料中已含有半型逗号，则须以「\,」符号取代)：',
	'sd_createfilter_label' => '为此一筛选器设置标签(选择性的)：',
	'sd_createfilter_requirefilter' => '在此一筛选器展示其作用之前要求须选取其他的筛选器：',
	'sd_createfilter_entervalues' => '以手工的方式键入筛选器的筛选值(其值必须以半型逗号","分隔，如果您的输入值内包含半型逗号则须则"\,"取代):',
	'sd_createfilter_label' => '为此一筛选选器设置标签(选择性的)：',

	'sd_blank_error' => '不得为空白',

	// content messages
	'sd_filter_coversproperty' => '此筛选器涵盖了$1性质。',
	'sd_filter_getsvaluesfromcategory' => '其从$1分类取得它的值。',
	'sd_filter_usestimeperiod' => '其使用「$1」做为时间期限值',
	'sd_filter_year' => '年',
	'sd_filter_month' => '月',
	'sd_filter_hasvalues' => '其含有$1值。',
	'sd_filter_requiresfilter' => '其以$1筛选器为基础。',
	'sd_filter_hasvalues' => '其有着$1的这些值。',
	'sd_filter_haslabel' => '其有着此一$1标签'  ,
);

/** ‪中文(台灣)‬ (‪中文(台灣)‬)
 * @author Roc michael
 */
$messages['zh-tw'] = array(
	'browsedata'                            => '瀏覽資料',
	'sd_browsedata_choosecategory'          => '選取某項分類(category)',
	'sd_browsedata_viewcategory'            => '查看分類頁面',
	'sd_browsedata_subcategory'             => '子分類',
	'sd_browsedata_other'                   => '其他的',
	'sd_browsedata_none'                    => '無',
	'sd_browsedata_filterbyvalue'           => '依此值設置篩選器',
	'sd_browsedata_filterbysubcategory'     => '依此子分類(subcategory)設置篩選器',
	'sd_browsedata_otherfilter'             => '查看屬於此篩選器中其他值的頁面，',
	'sd_browsedata_nonefilter'              => '查看此篩選器設置條件中無任何值的頁面',
	'sd_browsedata_removefilter'            => '移除此篩選器',
	'sd_browsedata_removesubcategoryfilter' => '移除此子分類(subcategory)篩選器',
	'sd_browsedata_resetfilters'            => '重置篩選器',
	'filters'                               => '篩選器',
	'sd_filters_docu'                       => '此wiki系統內已設有如下的篩選器(filters)',
	'createfilter'                          => '建立篩選器',
	'sd_createfilter_name'                  => '名稱：',
	'sd_createfilter_property'              => '此一篩選器所涵蓋的性質：',
	'sd_createfilter_usepropertyvalues'     => '將此一性質的值設給篩選器所用',
	'sd_createfilter_usecategoryvalues'     => '從此分類中為篩選器取得篩選值：',
	'sd_createfilter_usedatevalues'         => '以此一期間為此篩選器設置日期範圍值：',
	'sd_createfilter_entervalues'           => '以手工的方式鍵入篩選器的篩選值(其值必須以半型逗號","分隔，如果您的輸入值內包含半型逗號則須則"\\,"取代):',
	'sd_createfilter_label'                 => '為此一篩選選器設定標籤(選擇性的)：',
	'sd_createfilter_requirefilter'         => '在此一篩選器展示其作用之前要求須選取其他的篩選器(即此一篩選器的作用係以另一篩選器為其基礎)：',
	'sd_blank_error'                        => '不得為空白',
	'sd_filter_coversproperty'              => '此篩選器涵蓋了$1性質。',
	'sd_filter_getsvaluesfromcategory'      => '其從$1分類取得它的值。',
	'sd_filter_usestimeperiod'              => '其使用「$1」做為時間期限值',
	'sd_filter_year'                        => '年',
	'sd_filter_month'                       => '月',
	'sd_filter_hasvalues'                   => '其有著$1的這些值。',
	'sd_filter_requiresfilter'              => '其以$1篩選器為基礎。',
	'sd_filter_haslabel'                    => '其有著此一$1標籤',
);

