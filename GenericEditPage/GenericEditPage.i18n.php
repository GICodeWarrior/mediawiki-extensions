<?php
/**
 * Internationalisation for Uniwiki/GenericEditPage extension
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English */
$messages['en'] = array(
	'gep-desc' => 'Supplements the edit page to be more user friendly',
	'gep-emailsubject' => '[$1] Category suggestion: $2',
	'gep-emailbody' => 'User "$1" suggested category "$2" for site "$3".',
	'gep-emailfailure' => 'Sorry, your suggestion could not be processed.',
	'gep-emailsuccess' => 'Thanks for suggesting the category: $1.',
	'gep-categories' => 'Categories',
	'gep-addcategory' => 'Add a category',
	'gep-addcategorybutton' => 'Add',
	'gep-suggestcategory' => 'Suggest a category',
	'gep-suggestcategorybutton' => 'Submit',
	'gep-sections' => 'Sections',
	'gep-sectionnotdisabled' => 'This section cannot be disabled',
	'gep-addsection' => 'Add a section',
	'gep-addsectionbutton' => 'Add',
	'gep-classicmode' => 'Classic mode',
	'gep-genericmode' => 'Generic mode',
	'gep-nosectioninstructions' => 'There are no sections on this page.
Add some using the tools on the right.', // on the right? How does that work in RTL UIs?
	'gep-nocategories' => 'Please select at least one category before saving',
	'gep-categorypage' => 'MediaWiki:Editpagetags',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Purodha
 */
$messages['qqq'] = array(
	'gep-desc' => 'Short description of the Gep extension, shown on [[Special:Version]].
Do not translate or change links.',
	'gep-categories' => '{{Identical|Categories}}',
	'gep-addcategorybutton' => '{{Identical|Add}}',
	'gep-addsectionbutton' => '{{Identical|Add}}',
);

/** Arabic (العربية)
 * @author ترجمان05
 */
$messages['ar'] = array(
	'gep-categories' => 'تصنيفات',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Ramsis II
 */
$messages['arz'] = array(
	'gep-emailsubject' => '[$1] اقتراح التصنيف: $2',
	'gep-emailbody' => 'اليوزر "$1" اقترح التصنيف"$2" للموقع"$3".',
	'gep-emailfailure' => 'متاسفين،الاقتراح بتاعك ماينفعش يتنفذ',
	'gep-emailsuccess' => 'شكرا لاقتراحك التصنيف : $1.',
	'gep-categories' => 'تصانيف',
	'gep-addcategory' => 'ضيف تصنيف',
	'gep-addcategorybutton' => 'ضيف',
	'gep-suggestcategory' => 'اقترح تصنيف',
	'gep-suggestcategorybutton' => 'تقديم',
	'gep-sections' => 'اقسام',
	'gep-sectionnotdisabled' => 'القسم دا ماينفعش يتعطل',
	'gep-addsection' => 'ضيف قسم',
	'gep-addsectionbutton' => 'ضيف',
	'gep-classicmode' => 'وضع كلاسيكي',
	'gep-genericmode' => 'الوضع العام',
	'gep-nosectioninstructions' => 'ضيف شوية باستعمال الادوات الموجودة على اليمين',
	'gep-nocategories' => 'لو سمحت تختار تصنيف واحد على الاقل قبل الحفظ',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Red Winged Duck
 */
$messages['be-tarask'] = array(
	'gep-emailsubject' => '[$1] Прапанаваная катэгорыя: $2',
	'gep-emailsuccess' => 'Дзякуй за прапанову катэгорыі «$1».',
	'gep-categories' => 'Катэгорыі',
	'gep-addcategory' => 'Дадаць катэгорыю',
	'gep-addcategorybutton' => 'Дадаць',
	'gep-suggestcategory' => 'Прапанаваць катэгорыю',
	'gep-sections' => 'Сэкцыі',
	'gep-addsection' => 'Дадаць сэкцыю',
	'gep-addsectionbutton' => 'Дадаць',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'gep-emailbody' => 'Потребител „$1“ предложи категория „$2“ за сайта „$3“.',
	'gep-categories' => 'Категории',
	'gep-addcategory' => 'Добавяне на категория',
	'gep-addcategorybutton' => 'Добавяне',
	'gep-suggestcategorybutton' => 'Изпращане',
	'gep-sections' => 'Раздели',
	'gep-sectionnotdisabled' => 'Този раздел не може да бъде изключен',
	'gep-addsection' => 'Добавяне на раздел',
	'gep-addsectionbutton' => 'Добавяне',
	'gep-nosectioninstructions' => 'Тази страница не съдържа раздели.
Раздели могат да бъдат добавяни чрез инструментите в дясно.',
	'gep-nocategories' => 'Преди да съхраните, изберете поне една категория',
	'gep-categorypage' => 'MediaWiki:Editpagetags',
);

/** German (Deutsch) */
$messages['de'] = array(
	'gep-emailsubject' => '[$1] Vorschlag Kategorie: $2',
	'gep-emailbody' => 'Benutzer „$1“ hat die Kategorie „$2“ für die Seite „$3“ ausgewählt.',
	'gep-emailfailure' => 'Leider konnte dein Vorschlag nicht verarbeitet werden.',
	'gep-emailsuccess' => 'Danke für den Vorschlag der Kategorie: $1.',
	'gep-categories' => 'Kategorien',
	'gep-addcategory' => 'Eine Kategorie einfügen',
	'gep-addcategorybutton' => 'Einfügen',
	'gep-suggestcategory' => 'Eine Kategorie vorschlagen',
	'gep-suggestcategorybutton' => 'Senden',
	'gep-sections' => 'Abschnitte',
	'gep-sectionnotdisabled' => 'Dieser Abschnitt kann nicht aufgehoben werden',
	'gep-addsection' => 'Einen Abschnitt einfügen',
	'gep-addsectionbutton' => 'Einfügen',
	'gep-classicmode' => 'Normaler Modus',
	'gep-genericmode' => 'Genereller Modus',
	'gep-nosectioninstructions' => 'Diese Seite hat keine Abschnitte.
Gib ein paar ein mit den Werkzeugen an der rechten Seite.',
	'gep-nocategories' => 'Bitte vor dem Abspeichern mindestens eine Kategorie aussuchen',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'gep-emailsubject' => '[$1] Kategoria sugesto: $2',
	'gep-emailbody' => 'Uzanto "$1" sugestis kategorion "$2" por vikio "$3".',
	'gep-emailfailure' => 'Bedaŭrinde via sugesto ne eblis esti procesita.',
	'gep-emailsuccess' => 'Dankon pro sugesti la kategorion: $1.',
	'gep-categories' => 'Kategorioj',
	'gep-addcategory' => 'Aldoni kategorion',
	'gep-addcategorybutton' => 'Aldoni',
	'gep-suggestcategory' => 'Sugesti kategorion',
	'gep-sections' => 'Sekcioj',
	'gep-addsection' => 'Aldoni sekcion',
	'gep-addsectionbutton' => 'Aldoni',
	'gep-classicmode' => 'Klasika regximo',
	'gep-genericmode' => 'Gxenerala regximo',
);

/** Spanish (Español) */
$messages['es'] = array(
	'gep-emailsubject' => 'Sugerencia de categoría de [$1]: $2',
	'gep-emailbody' => 'El usuario "$1" sugirió la categoría "$2" para el sitio "$3".',
	'gep-emailfailure' => 'No fue posible procesar su sugerencia.',
	'gep-emailsuccess' => 'Gracias por sugerir la categoría: $1.',
	'gep-categories' => 'Categorías',
	'gep-addcategory' => 'Agregar una Categoría',
	'gep-addcategorybutton' => 'Agregar',
	'gep-suggestcategory' => 'Sugerir una Categoría',
	'gep-suggestcategorybutton' => 'Enviar',
	'gep-sections' => 'Secciones',
	'gep-sectionnotdisabled' => 'Esta sección no se puede desactivar',
	'gep-addsection' => 'Agregar una Sección',
	'gep-addsectionbutton' => 'Agregar',
	'gep-classicmode' => 'Modo Clásico',
	'gep-genericmode' => 'Modo Genérico',
	'gep-nosectioninstructions' => 'No hay secciones en esta página.
Agrega algunas secciones utilizando las herramientas a la derecha.',
	'gep-nocategories' => 'Selecciona por lo menos una categoría antes de guardar',
);

/** French (Français)
 * @author Grondin
 * @author IAlex
 * @author Sherbrooke
 */
$messages['fr'] = array(
	'gep-desc' => 'Suppléer le formulaire de modification pour être plus facile à utiliser',
	'gep-emailsubject' => '[$1] Suggestion de catégorie : $2',
	'gep-emailbody' => "L'utilisateur « $1 » a suggéré la catégorie « $2 » pour le site « $3 ».",
	'gep-emailfailure' => "Désolé, votre suggestion n'a pas pu être effectuée.",
	'gep-emailsuccess' => 'Merci pour avoir suggéré la catégorie : $1.',
	'gep-categories' => 'Catégories',
	'gep-addcategory' => 'Ajouter une catégorie',
	'gep-addcategorybutton' => 'Ajouter',
	'gep-suggestcategory' => 'Suggérer une catégorie',
	'gep-suggestcategorybutton' => 'Soumettre',
	'gep-sections' => 'Sections',
	'gep-sectionnotdisabled' => 'Cette section ne peut pas être désactivée',
	'gep-addsection' => 'Ajouter une section',
	'gep-addsectionbutton' => 'Ajouter',
	'gep-classicmode' => 'Mode classique',
	'gep-genericmode' => 'Mode générique',
	'gep-nosectioninstructions' => "Il n'y a aucune section dans cette page.
Ajoutez-en en utilisant l'outil sur la droite.",
	'gep-nocategories' => 'Choisir au moins une catégorie avant de sauvegarder la page',
	'gep-categorypage' => 'MediaWiki:Editpagetags',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'gep-desc' => 'Complementa a caixa de edición para que sexa máis fácil de usar',
	'gep-emailsubject' => '[$1] Categoría suxerida: $2',
	'gep-emailbody' => 'O usuario "$1" suxeriu a categoría "$2" para o sitio "$3".',
	'gep-emailfailure' => 'Sentímolo, a súa suxestión non puido ser procesada.',
	'gep-emailsuccess' => 'Grazas por suxerir a categoría: $1.',
	'gep-categories' => 'Categorías',
	'gep-addcategory' => 'Engadir unha categoría',
	'gep-addcategorybutton' => 'Engadir',
	'gep-suggestcategory' => 'Suxerir unha categoría',
	'gep-suggestcategorybutton' => 'Enviar',
	'gep-sections' => 'Seccións',
	'gep-sectionnotdisabled' => 'Esta sección non pode ser deshabilitada',
	'gep-addsection' => 'Engadir unha sección',
	'gep-addsectionbutton' => 'Engadir',
	'gep-classicmode' => 'Modo clásico',
	'gep-genericmode' => 'Modo xenérico',
	'gep-nosectioninstructions' => 'Non hai seccións nesta páxina.
Engada algunha usando as ferramentas da dereita.',
	'gep-nocategories' => 'Por favor, seleccione, polo menos, unha categoría antes de gardar',
	'gep-categorypage' => 'MediaWiki:Editpagetags',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 */
$messages['grc'] = array(
	'gep-categories' => 'Κατηγορίαι',
	'gep-addcategorybutton' => 'Προστιθέναι',
	'gep-addsectionbutton' => 'Προστιθέναι',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'gep-desc' => 'פישוט דף העריכה כך שיהיה ידידותי יותר למשתמש',
	'gep-emailsubject' => '[$1] הצעת קטגוריה: $2',
	'gep-emailbody' => 'המשתמש "$1" הציע את הקטגוריה "$2" עבור האתר "$3".',
	'gep-emailfailure' => 'מצטערים, לא ניתן לעבד את בקשתכם.',
	'gep-emailsuccess' => 'תודה על שהצעתם את הקטגוריה: $1.',
	'gep-categories' => 'קטגוריות',
	'gep-addcategory' => 'הוספת קטגוריה',
	'gep-addcategorybutton' => 'הוספה',
	'gep-suggestcategory' => 'הצעת קטגוריה',
	'gep-suggestcategorybutton' => 'שליחה',
	'gep-sections' => 'פסקאות',
	'gep-sectionnotdisabled' => 'לא ניתן לבטל את הפסקה',
	'gep-addsection' => 'הוספת פסקה',
	'gep-addsectionbutton' => 'הוספה',
	'gep-classicmode' => 'מצב קלאסי',
	'gep-genericmode' => 'מצב גנרי',
	'gep-nosectioninstructions' => 'אין פסקאות בדף זה.
באפשרותכם להוסיף כמה באמצעות שימוש בכלים שמשמאל.',
	'gep-nocategories' => 'אנא בחרו לפחות קטגוריה אחת לפני השמירה',
	'gep-categorypage' => 'MediaWiki:Editpagetags',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'gep-desc' => 'Čini wobdźěłowansku stronu za wužiwarja přijomnišu',
	'gep-emailsubject' => '[$1] Namjet kategorije: $2',
	'gep-emailbody' => 'Wužiwar "$1" je kategoriju "$2" za sydło "$3" namjetował.',
	'gep-emailfailure' => 'Bohužel njeje so dał twój namjet předźěłać.',
	'gep-emailsuccess' => 'Dźakujemy so za namjetowanje kategorije: $1.',
	'gep-categories' => 'Kategorije',
	'gep-addcategory' => 'Kategoriju přidać',
	'gep-addcategorybutton' => 'Přidać',
	'gep-suggestcategory' => 'Kategoriju namjetować',
	'gep-suggestcategorybutton' => 'Pósłać',
	'gep-sections' => 'Wotrězki',
	'gep-sectionnotdisabled' => 'Tutón wotrězk njeda so znjemóžnić',
	'gep-addsection' => 'Wotrězk přidać',
	'gep-addsectionbutton' => 'Přidać',
	'gep-classicmode' => 'Klasiski modus',
	'gep-genericmode' => 'Powšitkowny modus',
	'gep-nosectioninstructions' => 'Na tutej stronje wotrězki njejsu.
Přidaj někotre z pomocu nastrojow naprawo.',
	'gep-nocategories' => 'Prošu wubjer znajmjeńša jednu kategoriju do składowanja.',
	'gep-categorypage' => 'MediaWiki:Editpagetags',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'gep-desc' => 'Supplementa le pagina de modification pro render lo plus facile a usar',
	'gep-emailsubject' => 'Suggestion de categoria pro [$1]: $2',
	'gep-emailbody' => 'Le usator "$1" suggereva le categoria "$2" pro le sito "$3".',
	'gep-emailfailure' => 'Pardono, tu suggestion non poteva esser processate.',
	'gep-emailsuccess' => 'Gratias pro suggerer le categoria: $1.',
	'gep-categories' => 'Categorias',
	'gep-addcategory' => 'Adder un categoria',
	'gep-addcategorybutton' => 'Adder',
	'gep-suggestcategory' => 'Suggerer un categoria',
	'gep-suggestcategorybutton' => 'Submitter',
	'gep-sections' => 'Sectiones',
	'gep-sectionnotdisabled' => 'Iste section non pote esser disactivate',
	'gep-addsection' => 'Adder un section',
	'gep-addsectionbutton' => 'Adder',
	'gep-classicmode' => 'Modo classic',
	'gep-genericmode' => 'Modo generic',
	'gep-nosectioninstructions' => 'Il non ha sectiones in iste pagina.
Adde alcunes con le instrumentos al derecta.',
	'gep-nocategories' => 'Per favor selige al minus un categoria ante de publicar',
	'gep-categorypage' => 'MediaWiki:Modificaretiquettasdepaginas',
);

/** Javanese (Basa Jawa)
 * @author Pras
 */
$messages['jv'] = array(
	'gep-desc' => 'Imbuhi kaca suntingan supaya luwih kepénak tumrap panganggo',
	'gep-emailsubject' => '[$1] Saran kategori: $2',
	'gep-emailbody' => 'Panganggo "$1" nyaranaké kategori "$2" kanggo situs "$3".',
	'gep-emailfailure' => 'Nyuwun pangapura, saran panjenengan ora bisa diprosès.',
	'gep-emailsuccess' => 'Matur nuwun wis nyaranaké kategori: $1.',
	'gep-categories' => 'Kategori',
	'gep-addcategory' => 'Nambahaké kategori',
	'gep-addcategorybutton' => 'Tambahaké',
	'gep-suggestcategory' => 'Saranaké kategori',
	'gep-suggestcategorybutton' => 'Kirim',
	'gep-sections' => 'Bagéan',
	'gep-sectionnotdisabled' => "Bagéan iki ora bisa dilumpuhaké (''disabled'')",
	'gep-addsection' => 'Tambahaké bagéan',
	'gep-addsectionbutton' => 'Tambahaké',
	'gep-classicmode' => 'Cara klasik',
	'gep-genericmode' => 'Cara generik',
	'gep-nosectioninstructions' => "Ora ana bagéan ing kaca iki.
Tambahaké kanthi migunakaké piranti (''tools'') sing ana ing tengen.",
	'gep-nocategories' => 'Pilih saora-orané siji kategori sadurungé nyimpen',
	'gep-categorypage' => 'MediaWiki:Tagkacasunting',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Thearith
 */
$messages['km'] = array(
	'gep-emailfailure' => 'សូម​អភ័យទោស, ការផ្ដល់យោបល់​របស់​អ្នក​មិនអាច​ដំណើរការ​បានទេ​។',
	'gep-emailsuccess' => 'សូមអរគុណ​សម្រាប់​ការស្នើ​ចំណាត់ថ្នាក់ក្រុម​៖ $1 ។',
	'gep-categories' => 'ចំណាត់ថ្នាក់ក្រុម​នានា',
	'gep-addcategory' => 'បន្ថែម​ចំណាត់ថ្នាក់ក្រុម​មួយ',
	'gep-addcategorybutton' => 'បន្ថែម',
	'gep-suggestcategory' => 'ស្នើ​ចំណាត់ថ្នាក់ក្រុម​មួយ',
	'gep-suggestcategorybutton' => 'ដាក់ស្នើ',
	'gep-sections' => 'បំណែក​ផ្សេងៗ',
	'gep-sectionnotdisabled' => 'បំណែក​នេះ​មិនអាច​ត្រូវ​បាន​បិទ​ឡើយ',
	'gep-addsection' => 'បន្ថែម​បំណែក​មួយ',
	'gep-addsectionbutton' => 'បន្ថែម',
	'gep-classicmode' => 'របៀប​បុរាណ',
	'gep-nocategories' => 'សូម​ជ្រើសយក​ចំណាត់ថ្នាក់ក្រុម​យ៉ាងហោច​មួយ​មុនពេល​រក្សាទុក',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'gep-desc' => 'Määt de de Sigg för Sigge ze Ändere bequeemer för de Schriever.',
	'gep-nocategories' => 'Vör em Afspeichere moß winnichstens ein Saachjropp ußjesooht sin.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'gep-desc' => "mécht d'ännerungssäit méi benotzerfrëndlech",
	'gep-emailsubject' => '[$1] Virschlag Kategorie: $2',
	'gep-emailbody' => 'De Benotzer "$1" huet d\'Kategorie "$2" fir de Site "$3" virgeschlo.',
	'gep-emailfailure' => 'Pardon, Äre Virschlag konnt net verschafft ginn.',
	'gep-emailsuccess' => "Merci datt Dir d'Kategorie: $1 virgeschlo hutt",
	'gep-categories' => 'Kategorien',
	'gep-addcategory' => 'Eng Kategorie derbäisetzen',
	'gep-addcategorybutton' => 'Derbäisetzen',
	'gep-suggestcategory' => 'Eng Kategorie virschloen',
	'gep-suggestcategorybutton' => 'Schécken',
	'gep-sections' => 'Abschnitter',
	'gep-sectionnotdisabled' => 'Dësen Abschnitt kann net ausgeschalt ginn',
	'gep-addsection' => 'En Abschnitt derbäisetzen',
	'gep-addsectionbutton' => 'Derbäisetzen',
	'gep-classicmode' => 'Klassesch Manéier',
	'gep-genericmode' => 'Generell Manéier',
	'gep-nosectioninstructions' => 'Et gëtt keng Abschnitter op dëser Säit.
Setzt der mat den Toolen op der rietser Säit derbäi.',
	'gep-nocategories' => 'Wielt w.e.g. mindestens eng Kategorie aus ier Dir ofspäichert',
	'gep-categorypage' => 'MediaWiki:Säitenännerungs-Tagen',
);

/** Macedonian (Македонски)
 * @author Brest
 */
$messages['mk'] = array(
	'gep-categories' => 'Категории',
	'gep-addcategory' => 'Додади категорија',
	'gep-addcategorybutton' => 'Додади',
	'gep-suggestcategory' => 'Предложи категорија',
	'gep-sections' => 'Секции',
);

/** Nedersaksisch (Nedersaksisch)
 * @author Servien
 */
$messages['nds-nl'] = array(
	'gep-addcategorybutton' => 'Toevoegen',
	'gep-addsectionbutton' => 'Toevoegen',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'gep-desc' => 'Maakt de bewerkingspagina gebruikersvriendelijker',
	'gep-emailsubject' => '[$1] Categoriesuggestie: $2',
	'gep-emailbody' => 'Gebruiker "$1" heeft de categoriesuggestie "$2" gemaakt voor site "$3".',
	'gep-emailfailure' => 'Uw suggestie kon niet verwerkt worden.',
	'gep-emailsuccess' => 'Dank uw wel voor de categoriesuggestie $1.',
	'gep-categories' => 'Categorieën',
	'gep-addcategory' => 'Categorie toevoegen',
	'gep-addcategorybutton' => 'Toevoegen',
	'gep-suggestcategory' => 'Categoriesuggestie maken',
	'gep-suggestcategorybutton' => 'OK',
	'gep-sections' => 'Kopjes',
	'gep-sectionnotdisabled' => 'Dit kopje kan niet uitgeschakeld worden',
	'gep-addsection' => 'Kopje toevoegen',
	'gep-addsectionbutton' => 'Toevoegen',
	'gep-classicmode' => 'Klassieke modus',
	'gep-genericmode' => 'Algemene modus',
	'gep-nosectioninstructions' => 'Er staan geen kopjes op deze pagina.
Gebruik de hulpmiddelen aan de rechterkant om er een toe te voegen.',
	'gep-nocategories' => 'Selecteer tenminste één categorie voordat u de pagina opslaat',
	'gep-categorypage' => 'MediaWiki:Editpagelabels',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Harald Khan
 */
$messages['nn'] = array(
	'gep-addcategorybutton' => 'Legg til',
	'gep-addsectionbutton' => 'Legg til',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'gep-desc' => 'Suplear lo formulari de modificacion per èsser de melhor utilizar',
	'gep-emailsubject' => '[$1] Suggestion de categoria : $2',
	'gep-emailbody' => "L'utilizaire « $1 » a suggerit la categoria « $2 » pel sit « $3 ».",
	'gep-emailfailure' => 'O planhèm, vòstra suggestion a pas pogut èsser efectuada.',
	'gep-emailsuccess' => 'Mercés per aver suggerit la categoria : $1.',
	'gep-categories' => 'Categorias',
	'gep-addcategory' => 'Apondre una categoria',
	'gep-addcategorybutton' => 'Apondre',
	'gep-suggestcategory' => 'Suggerir una categoria',
	'gep-suggestcategorybutton' => 'Sometre',
	'gep-sections' => 'Seccions',
	'gep-sectionnotdisabled' => 'Aquesta seccion pòt pas èsser desactivada',
	'gep-addsection' => 'Apondre una seccion',
	'gep-addsectionbutton' => 'Apondre',
	'gep-classicmode' => 'Mòde classic',
	'gep-genericmode' => 'Mòde generic',
	'gep-nosectioninstructions' => "I a pas cap de seccion dins aquesta pagina.
Apondètz-ne en utilizant l'esplech a drecha.",
	'gep-nocategories' => 'Causir al mens una categoria abans de salvar la pagina',
	'gep-categorypage' => 'MediaWiki:Editpagetags',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'gep-categories' => 'وېشنيزې',
	'gep-addcategorybutton' => 'ورګډول',
	'gep-addsectionbutton' => 'ورګډول',
);

/** Brazilian Portuguese (Português do Brasil) */
$messages['pt-br'] = array(
	'gep-emailsubject' => 'Sugestão de categoria de [$1] : $2',
	'gep-emailbody' => 'O usuário "$1" sugeriu a categoria "$2" para o site "$3".',
	'gep-emailfailure' => 'Não foi possível processar a sua sugestão.',
	'gep-emailsuccess' => 'Obrigado por sugerir essa categoria: $1.',
	'gep-categories' => 'Categorias',
	'gep-addcategory' => 'Adicionar uma Categoria',
	'gep-addcategorybutton' => 'Adicionar',
	'gep-suggestcategory' => 'Sugerir uma Categoria',
	'gep-suggestcategorybutton' => 'Encaminhar',
	'gep-sections' => 'Seções',
	'gep-sectionnotdisabled' => 'Esta seção não pode ser desativada',
	'gep-addsection' => 'Adicionar uma Seção',
	'gep-addsectionbutton' => 'Acrescentar',
	'gep-classicmode' => 'Modo Clássico',
	'gep-genericmode' => 'Modo Genérico',
	'gep-nosectioninstructions' => 'Não há seções nesta página.
Use as ferramentas à direita para incluir algumas seções.',
	'gep-nocategories' => 'Selecione, no mínimo, uma categoria antes de salvar',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'gep-emailfailure' => 'Ne pare rău, sugestia dumneavoastră nu a putut fi procesată.',
	'gep-categories' => 'Categorii',
	'gep-addcategory' => 'Adaugă o categorie',
	'gep-suggestcategory' => 'Sugerează o categorie',
	'gep-sections' => 'Secţiuni',
	'gep-addsection' => 'Adaugă o secţiune',
	'gep-classicmode' => 'Mod clasic',
	'gep-genericmode' => 'Mod generic',
);

/** Russian (Русский)
 * @author Ferrer
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'gep-desc' => 'Дополнения режима редактирования страницы, делающие его более удобным',
	'gep-emailsubject' => '[$1] Рекомендуемая категория: $2',
	'gep-emailbody' => 'Участник «$1» посоветовал категорию «$2» для сайта «$3».',
	'gep-emailfailure' => 'Извините, ваш совет не может быть обработан.',
	'gep-emailsuccess' => 'Спасибо, что посоветовали категорию: $1.',
	'gep-categories' => 'Категории',
	'gep-addcategory' => 'Добавить категорию',
	'gep-addcategorybutton' => 'Добавить',
	'gep-suggestcategory' => 'Посоветовать категорию',
	'gep-suggestcategorybutton' => 'Отправить',
	'gep-sections' => 'Разделы',
	'gep-sectionnotdisabled' => 'Этот раздел не может быть отключён',
	'gep-addsection' => 'Добавить раздел',
	'gep-addsectionbutton' => 'Добавить',
	'gep-classicmode' => 'Классический режим',
	'gep-genericmode' => 'Общий режим',
	'gep-nosectioninstructions' => 'На этой странице нет разделов.
Вы можете их добавить с помощью инструментов, размещённых справа.',
	'gep-nocategories' => 'Пожалуйста, выберите перед сохранением хотя бы одну категорию',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'gep-desc' => 'Dopĺňa stránku na úpravy, aby bola používateľsky príjemnejšia',
	'gep-emailsubject' => '[$1] Návrh kategórie: $2',
	'gep-emailbody' => 'Používateľ „$1“ navrhol kategóriu „$2“ pre stránku „$3“.',
	'gep-emailfailure' => 'Prepáčte, váš návrh nebolo možné spracovať.',
	'gep-emailsuccess' => 'Ďakujeme za váš návrh kategórie: $1.',
	'gep-categories' => 'Kategórie',
	'gep-addcategory' => 'Pridať kategóriu',
	'gep-addcategorybutton' => 'Pridať',
	'gep-suggestcategory' => 'Navrhnúť kategóriu',
	'gep-suggestcategorybutton' => 'Odoslať',
	'gep-sections' => 'Sekcie',
	'gep-sectionnotdisabled' => 'Túto sekciu nemožno vypnúť',
	'gep-addsection' => 'Pridať sekciu',
	'gep-addsectionbutton' => 'Pridať',
	'gep-classicmode' => 'Klasický režim',
	'gep-genericmode' => 'Všeobecný režim',
	'gep-nosectioninstructions' => 'Na tejto stránke nie sú žiadne sekcie.
Pomocou nástrojov vpravo ich môžete pridať.',
	'gep-nocategories' => 'Prosím, vyberte pred uložením aspoň jednu kategóriu.',
	'gep-categorypage' => 'MediaWiki:Editpagetags',
);

/** Swedish (Svenska)
 * @author Najami
 */
$messages['sv'] = array(
	'gep-categories' => 'Kategorier',
	'gep-addcategory' => 'Lägg till en kategori',
	'gep-addcategorybutton' => 'Lägg till',
	'gep-addsection' => 'Lägg till ett avsnitt',
	'gep-addsectionbutton' => 'Lägg till',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'gep-categories' => 'వర్గాలు',
	'gep-addcategorybutton' => 'చేర్చు',
	'gep-sections' => 'విభాగాలు',
	'gep-addsectionbutton' => 'చేర్చు',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'gep-categories' => 'Thể loại',
	'gep-addcategory' => 'Thêm thể loại',
	'gep-addcategorybutton' => 'Thêm',
	'gep-suggestcategory' => 'Đề nghị thể loại',
	'gep-sections' => 'Đoạn',
	'gep-addsection' => 'Thêm đoạn',
	'gep-addsectionbutton' => 'Thêm',
);

