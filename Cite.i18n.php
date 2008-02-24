<?php
/**
 * Internationalisation file for Ci;te extension.
 *
 * @addtogroup Extensions
*/

$messages = array();

$messages['en'] = array(
	'cite_desc'                      => 'Adds <nowiki><ref[ name=id]></nowiki> and <nowiki><references/></nowiki> tags, for citations',
	/*
		Debug and errors
	*/
	# Internal errors
	'cite_croak'                     => 'Cite croaked; $1: $2',
	'cite_error_key_str_invalid'     => 'Internal error; invalid $str and/or $key.  This should never occur.',
	'cite_error_stack_invalid_input' => 'Internal error; invalid stack key.  This should never occur.',

	# User errors
	'cite_error'                               => 'Cite error: $1',
	'cite_error_ref_numeric_key'               => 'Invalid <code>&lt;ref&gt;</code> tag; name cannot be a simple integer, use a descriptive title',
	'cite_error_ref_no_key'                    => 'Invalid <code>&lt;ref&gt;</code> tag; refs with no content must have a name',
	'cite_error_ref_too_many_keys'             => 'Invalid <code>&lt;ref&gt;</code> tag; invalid names, e.g. too many',
	'cite_error_ref_no_input'                  => 'Invalid <code>&lt;ref&gt;</code> tag; refs with no name must have content',
	'cite_error_references_invalid_input'      => 'Invalid <code>&lt;references&gt;</code> tag; no input is allowed, use
<code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'Invalid <code>&lt;references&gt;</code> tag; no parameters are allowed, use <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'  => "Ran out of custom backlink labels, define more in the \"''cite_references_link_many_format_backlink_labels''\" message",
	'cite_error_references_no_text'            => 'Invalid <code>&lt;ref&gt;</code> tag; no text was provided for refs named <code>$1</code>',

	/*
	   Output formatting
	*/
	'cite_reference_link_key_with_num' => '$1_$2',
	# Ids produced by <ref>
	'cite_reference_link_prefix'       => '_ref-',
	'cite_reference_link_suffix'       => '',
	# Ids produced by <references>
	'cite_references_link_prefix'      => '_note-',
	'cite_references_link_suffix'      => '',

	'cite_reference_link'                              => '<sup id="$1" class="reference">[[#$2|<nowiki>[</nowiki>$3<nowiki>]</nowiki>]]</sup>',
	'cite_references_link_one'                         => '<li id="$1">[[#$2|↑]] $3</li>',
	'cite_references_link_many'                        => '<li id="$1">↑ $2 $3</li>',
	'cite_references_link_many_format'                 => '<sup>[[#$1|$2]]</sup>',
	# An item from this set is passed as $3 in the message above
	'cite_references_link_many_format_backlink_labels' => 'a b c d e f g h i j k l m n o p q r s t u v w x y z',
	'cite_references_link_many_sep'                    => " ",
	'cite_references_link_many_and'                    => " ",

	# Although I could just use # instead of <li> above and nothing here that
	# will break on input that contains linebreaks
	'cite_references_prefix' => '<ol class="references">',
	'cite_references_suffix' => '</ol>',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'cite_desc'                                => 'Adibe as etiquetas <nowiki><ref[ name=id]></nowiki> y <nowiki><references/></nowiki> ta fer zitas',
	'cite_croak'                               => 'Zita corrompita; $1: $2',
	'cite_error_key_str_invalid'               => 'Error interna; $str y/u $key no conforme(s). Isto no abría d\'escaizer nunca.',
	'cite_error_stack_invalid_input'           => "Error interna; clau de pila no conforme. Isto no abría d'escaizer nunca.",
	'cite_error'                               => 'Error en a zita: $1',
	'cite_error_ref_numeric_key'               => "Etiqueta <code>&lt;ref&gt;</code> incorreuta; o nombre d'a etiqueta no puede estar un numero entero, faiga serbir un títol descriptibo",
	'cite_error_ref_no_key'                    => 'Etiqueta <code>&lt;ref&gt;</code> incorreuta; as referenzias sin de conteniu han de tener un nombre',
	'cite_error_ref_too_many_keys'             => 'Etiqueta <code>&lt;ref&gt;</code> incorreuta; nombres de parametros incorreutos.',
	'cite_error_ref_no_input'                  => 'Etiqueta <code>&lt;ref&gt;</code> incorreuta; as referenzias sin nombre no han de tener conteniu',
	'cite_error_references_invalid_input'      => 'Etiqueta <code>&lt;references&gt;</code> incorreuta; no se premite emplegar input en a etiqueta, faiga serbir <code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'Etiqueta <code>&lt;references&gt;</code> incorreuta; no se premiten parametros, faiga serbir <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'  => "Ya no quedan etiquetas backlink presonalizatas, defina más en o mensache \"''cite_references_link_many_format_backlink_labels''\"",
	'cite_error_references_no_text'            => "Etiqueta <code>&lt;ref&gt;</code> incorreuta; no ha escrito garra testo t'as referenzias nombratas <code>$1</code>",
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'cite_desc'                                        => 'يضيف وسوم <nowiki><ref[ name=id]></nowiki> و <nowiki><references/></nowiki> ، للاستشهادات',
	'cite_croak'                                       => 'الاستشهاد كروكد؛ $1: $2',
	'cite_error_key_str_invalid'                       => 'خطأ داخلي؛ $str و/أو $key غير صحيح.  هذا لا يجب أن يحدث أبدا.',
	'cite_error_stack_invalid_input'                   => 'خطأ داخلي؛ مفتاح ستاك غير صحيح.  هذا لا يجب أن يحدث أبدا.',
	'cite_error'                                       => 'خطأ استشهاد: $1',
	'cite_error_ref_numeric_key'                       => 'معرفة <code>&lt;ref&gt;</code> غير صحيحة؛ الاسم لا يمكن أن يكون عددا صحيحا بسيطا، استخدم عنوانا وصفيا',
	'cite_error_ref_no_key'                            => 'معرفة <code>&lt;ref&gt;</code> غير صحيحة؛ المراجع غير ذات المحتوى يجب أن تمتلك اسما',
	'cite_error_ref_too_many_keys'                     => 'معرفة <code>&lt;ref&gt;</code> غير صحيحة؛ أسماء غير صحيحة، مثال كثيرة جدا',
	'cite_error_ref_no_input'                          => 'معرفة <code>&lt;ref&gt;</code> غير صحيحة؛ المراجع غير ذات الاسم يجب أن تمتلك محتوى',
	'cite_error_references_invalid_input'              => 'معرفة <code>&lt;references&gt;</code> غير صحيحة؛ لا مدخل مسموح به، استخدم
<code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters'         => 'معرفة <code>&lt;references&gt;</code> غير صحيحة؛ لا محددات مسموح بها، استخدم <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'          => "نفدت علامات الباك لينك الكوستوم، عرف المزيد في رسالة \"''cite_references_link_many_format_backlink_labels''\"",
	'cite_error_references_no_text'                    => 'وسم <code>&lt;ref&gt;</code> غير صحيح؛ لا نص تم توفيره للمراجع المسماة <code>$1</code>',
	'cite_references_link_many_format_backlink_labels' => 'أ ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ف ق ك ل م ن ه و ي',
);

/** Asturian (Asturianu)
 * @author Esbardu
 * @author SPQRobin
 */
$messages['ast'] = array(
	'cite_desc'                                        => 'Añade les etiquetes <nowiki><ref[ name=id]></nowiki> y <nowiki><references/></nowiki> pa les cites',
	'cite_croak'                                       => 'Cita corrompida; $1: $2',
	'cite_error_key_str_invalid'                       => 'Error internu; $str y/o $key non válidos.  Esto nun habría asoceder nunca.',
	'cite_error_stack_invalid_input'                   => 'Error internu; clave de pila non válida. Esto nun habría asoceder nunca.',
	'cite_error'                                       => 'Error de cita: $1',
	'cite_error_ref_numeric_key'                       => 'Etiqueta <code>&lt;ref&gt;</code> non válida; el nome nun pue ser un enteru simple, usa un títulu descriptivu',
	'cite_error_ref_no_key'                            => 'Etiqueta <code>&lt;ref&gt;</code> non válida; les referencies ensin conteníu han tener un nome',
	'cite_error_ref_too_many_keys'                     => 'Etiqueta <code>&lt;ref&gt;</code> non válida; nomes non válidos (p.ex. demasiaos)',
	'cite_error_ref_no_input'                          => 'Etiqueta <code>&lt;ref&gt;</code> non válida; les referencies ensin nome han tener conteníu',
	'cite_error_references_invalid_input'              => 'Etiqueta <code>&lt;references&gt;</code> non válida; nun se permiten entraes, usa
<code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters'         => 'Etiqueta <code>&lt;references&gt;</code> non válida; nun se permiten parámetros, usa <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'          => "Etiquetes personalizaes agotaes, defini más nel mensaxe \"''cite_references_link_many_format_backlink_labels''\"",
	'cite_error_references_no_text'                    => 'Etiqueta <code>&lt;ref&gt;</code> non válida; nun se conseñó testu pa les referencies nomaes <code>$1</code>',
	'cite_references_link_many_format_backlink_labels' => 'a b c d e f g h i j k l m n ñ o p q r s t u v w x y z',
);

/** Bulgarian (Български)
 * @author Spiritia
 * @author DCLXVI
 */
$messages['bg'] = array(
	'cite_desc'                                => 'Добавя етикетите <nowiki><ref[ name=id]></nowiki> и <nowiki><references/></nowiki>, подходящи за цитиране',
	'cite_error_key_str_invalid'               => 'Вътрешна грешка: невалиден параметър $str и/или $key.  Това не би трябвало да се случва никога.',
	'cite_error_stack_invalid_input'           => "'''Вътрешна грешка:''' невалиден ключ на стека. Това не би трябвало да се случва никога.",
	'cite_error'                               => 'Грешка при цитиране: $1',
	'cite_error_ref_numeric_key'               => "'''Грешка в етикет <code>&lt;ref&gt;</code>:''' името не може да бъде число, използва се описателно име",
	'cite_error_ref_no_key'                    => "'''Грешка в етикет <code>&lt;ref&gt;</code>:''' етикетите без съдържание трябва да имат име",
	'cite_error_ref_too_many_keys'             => "'''Грешка в етикет <code>&lt;ref&gt;</code>:''' грешка в името, например повече от едно име на етикета",
	'cite_error_ref_no_input'                  => "'''Грешка в етикет <code>&lt;ref&gt;</code>:''' етикетите без име трябва да имат съдържание",
	'cite_error_references_invalid_input'      => "'''Грешка в етикет <code>&lt;references&gt;</code>:''' не е разрешен вход, използва се така: 
<code>&lt;references /&gt;</code>",
	'cite_error_references_invalid_parameters' => "'''Грешка в етикет <code>&lt;references&gt;</code>:''' използва се без параметри, така: <code>&lt;references /&gt;</code>",
	'cite_error_references_no_text'            => "'''Грешка в етикет <code>&lt;ref&gt;</code>:''' не е подаден текст за бележките на име <code>$1</code>",
);

/** Bengali (বাংলা)
 * @author Zaheen
 * @author Bellayet
 */
$messages['bn'] = array(
	'cite_desc'                                => 'উদ্ধৃতির জন্য <nowiki><ref[ name=id]></nowiki> এবং <nowiki><references/></nowiki> ট্যাগসমূহ যোগ করুন',
	'cite_croak'                               => 'উদ্ধৃতি ক্রোক করা হয়েছে; $1: $2',
	'cite_error_key_str_invalid'               => 'আভ্যন্তরীন ত্রুটি; অবৈধ $str এবং/অথবা $key। এটা কখনই ঘটা উচিত নয়।',
	'cite_error_stack_invalid_input'           => 'আভ্যন্তরীন ত্রুটি; অবৈধ স্ট্যাক কি। এটা কখনই ঘটা উচিত নয়।',
	'cite_error'                               => 'উদ্ধৃতি ত্রুটি: $1',
	'cite_error_ref_numeric_key'               => 'অবৈধ <code>&lt;ref&gt;</code> ট্যাগ; নাম কোন সরল পূর্ণসংখ্যা হতে পারবেনা, একটি বিবরণমূলক শিরোনাম ব্যবহার করুন',
	'cite_error_ref_no_key'                    => 'অবৈধ <code>&lt;ref&gt;</code> ট্যাগ; বিষয়বস্তুহীন refসমূহের অবশ্যই নাম থাকতে হবে',
	'cite_error_ref_too_many_keys'             => 'অবৈধ <code>&lt;ref&gt;</code> ট্যাগ; অবৈধ নাম (যেমন- সংখ্যাতিরিক্ত)',
	'cite_error_ref_no_input'                  => 'অবৈধ <code>&lt;ref&gt;</code> ট্যাগ; নামবিহীন refসমূহের অবশ্যই বিষয়বস্তু থাকতে হবে',
	'cite_error_references_invalid_input'      => 'অবৈধ <code>&lt;ref&gt;</code> ট্যাগ; কোন ইনপুট অনুমোদিত নয়, <code>&lt;references /&gt;</code> ব্যবহার করুন',
	'cite_error_references_invalid_parameters' => 'অবৈধ <code>&lt;ref&gt;</code> ট্যাগ; কোন প্যারামিটার অনুমোদিত নয়, <code>&lt;references /&gt;</code> ব্যবহার করুন',
	'cite_error_references_no_backlink_label'  => "পছন্দমাফিক ব্যাকলিংক লেবেলের সংখ্যা ফুরিয়ে গেছে, \"''cite_references_link_many_format_backlink_labels''\" বার্তায় আরও সংজ্ঞায়িত করুন",
	'cite_error_references_no_text'            => 'অবৈধ <code>&lt;ref&gt;</code> ট্যাগ; <code>$1</code> নামের refগুলির জন্য কোন টেক্সট প্রদান করা হয়নি',
);

/** Catalan (Català)
 * @author SMP
 */
$messages['ca'] = array(
	'cite_croak' => 'Cita corrompuda; $1: $2',
);

/** Czech (Česky)
 * @author Li-sung
 * @author Danny B.
 */
$messages['cs'] = array(
	'cite_desc'                                => 'Přidává značky <nowiki><ref[ name="id"]></nowiki> a&nbsp;<nowiki><references /></nowiki> na označení citací',
	'cite_croak'                               => 'Nefunkční citace; $1: $2',
	'cite_error_key_str_invalid'               => 'Vnitřní chyba; neplatný $str',
	'cite_error_stack_invalid_input'           => 'Vnitřní chyba; neplatný klíč zásobníku',
	'cite_error'                               => 'Chybná citace $1',
	'cite_error_ref_numeric_key'               => 'Chyba v tagu <code>&lt;ref&gt;</code>; názvem nesmí být prosté číslo, použijte popisné označení',
	'cite_error_ref_no_key'                    => 'Chyba v tagu <code>&lt;ref&gt;</code>; prázdné citace musí obsahovat název',
	'cite_error_ref_too_many_keys'             => 'Chyba v tagu <code>&lt;ref&gt;</code>; chybné názvy, např. je jich příliš mnoho',
	'cite_error_ref_no_input'                  => 'Chyba v tagu <code>&lt;ref&gt;</code>; citace bez názvu musí mít vlastní obsah',
	'cite_error_references_invalid_input'      => 'Chyba v tagu <code>&lt;references&gt;</code>; zde není dovolen vstup, použijte <code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'Chyba v tagu <code>&lt;references&gt;</code>;  zde není dovolen parametr, použijte <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'  => "Došla označení zpětných odkazů, přidejte jich několik do zprávy „''cite_references_link_many_format_backlink_labels''“",
	'cite_error_references_no_text'            => 'Chyba v tagu <code>&lt;ref&gt;</code>; citaci označené <code>$1</code> není určen žádný text',
);

/** Danish (Dansk)
 * @author Morten LJ
 */
$messages['da'] = array(
	'cite_croak'                               => 'Fodnoten døde: $1: $2',
	'cite_error_key_str_invalid'               => 'Intern fejl: Ugyldig $str og/eller $key. Dette burde aldrig forekomme.',
	'cite_error_stack_invalid_input'           => 'Intern fejl: Ugyldig staknøgle. Dette burde aldrig forekomme.',
	'cite_error'                               => 'Fodnotefejl: $1',
	'cite_error_ref_numeric_key'               => 'Ugyldigt <code>&lt;ref&gt;</code>-tag; "name" kan ikke være et simpelt heltal, brug en beskrivende titel',
	'cite_error_ref_no_key'                    => 'Ugyldigt <code>&lt;ref&gt;</code>-tag: Et <code>&lt;ref&gt;</code>-tag uden indhold skal have et navn',
	'cite_error_ref_too_many_keys'             => 'Ugyldigt <code>&lt;ref&gt;</code>-tag: Ugyldige navne, fx for mange',
	'cite_error_ref_no_input'                  => 'Ugyldigt <code>&lt;ref&gt;</code>-tag: Et <code>&lt;ref&gt;</code>-tag uden navn skal have indhold',
	'cite_error_references_invalid_input'      => 'Ugyldigt <code>&lt;references&gt;</code>-tag: Indhold ikke tilladt, brug i stedet <code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'Ugyldig <code>&lt;references&gt;</code>-tag: Parametre er ikke tilladt, brug i stedet <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'  => 'For mange <code>&lt;ref&gt;</code>-tags har det samme "name", tillad flere i beskeden "\'\'cite_references_link_many_format_backlink_labels\'\'"',
	'cite_error_references_no_text'            => 'Ugyldigt <code>&lt;ref&gt;</code>-tag: Der er ikke specificeret nogen fodnotetekst til navnet <code>$1</code>',
);

/** German (Deutsch)
 * @author Raimond Spekking
 */
$messages['de'] = array(
	'cite_desc'                                => 'Ergänzt für Quellennachweise die <nowiki><ref[ name=id]></nowiki> und <nowiki><references/></nowiki> Tags',
	'cite_croak'                               => 'Fehler im Referenz-System. $1: $2',
	'cite_error_key_str_invalid'               => 'Interner Fehler: ungültiger $str und/oder $key. Dies sollte eigentlich gar nicht passieren können.',
	'cite_error_stack_invalid_input'           => 'Interner Fehler: ungültiger „name“-stack. Dies sollte eigentlich gar nicht passieren können.',
	'cite_error'                               => 'Referenz-Fehler $1',
	'cite_error_ref_numeric_key'               => 'Ungültige <code>&lt;ref&gt;</code>-Verwendung: „name“ darf kein reiner Zahlenwert sein, benutze einen beschreibenden Namen.',
	'cite_error_ref_no_key'                    => 'Ungültige <code>&lt;ref&gt;</code>-Verwendung: „ref“ ohne Inhalt muss einen Namen haben.',
	'cite_error_ref_too_many_keys'             => 'Ungültige <code>&lt;ref&gt;</code>-Verwendung: „name“ ist ungültig oder zu lang.',
	'cite_error_ref_no_input'                  => 'Ungültige <code>&lt;ref&gt;</code>-Verwendung: „ref“ ohne Namen muss einen Inhalt haben.',
	'cite_error_references_invalid_input'      => 'Ungültige <code>&lt;references&gt;</code>-Verwendung: Es ist kein zusätzlicher Text erlaubt, verwende ausschließlich <code><nowiki><references /></nowiki></code>.',
	'cite_error_references_invalid_parameters' => 'Ungültige <code>&lt;reference&gt;</code>-Verwendung: Es sind keine zusätzlichen Parameter erlaubt, verwende ausschließlich <code><nowiki><reference /></nowiki></code>.',
	'cite_error_references_no_backlink_label'  => 'Eine Referenz der Form <code>&lt;ref name="…"/&gt;</code> wird öfter benutzt als Buchstaben vorhanden sind. Ein Administrator muss <nowiki>[[MediaWiki:cite references link many format backlink labels]]</nowiki> um weitere Buchstaben/Zeichen ergänzen.',
	'cite_error_references_no_text'            => 'Ungültiger <code>&lt;ref&gt;</code>-Tag; es wurde kein Text für das Ref mit dem Namen <code>$1</code> angegeben.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'cite_croak'                     => 'Zmólka w referencnem systemje. $1: $2',
	'cite_error_key_str_invalid'     => 'Interna zmólka: njpłaśiwy $str a/abo $key. To njaměło se staś.',
	'cite_error_stack_invalid_input' => 'Interna zmólka: njepłaśiwy stackowy kluc. To njaměło se staś.',
	'cite_error'                     => 'Referencna zmólka: $1',
);

/** Greek (Ελληνικά)
 * @author Consta
 */
$messages['el'] = array(
	'cite_error_references_no_text' => 'Δεν δίνετε κείμενο.',
);

/** فارسی (فارسی)
 * @author Huji
 */
$messages['fa'] = array(
	'cite_desc'                                => 'برچسب‌های <nowiki><ref[ name=id]></nowiki> و <nowiki><references/></nowiki> را برای یادکرد اضافه می‌کند',
	'cite_croak'                               => 'یادکرد خراب شد؛ $1: $2',
	'cite_error_key_str_invalid'               => 'خطای داخلی؛ $str و/یا $key غیر مجاز. این خطا نباید هرگز رخ دهد.',
	'cite_error_stack_invalid_input'           => 'خطای داخلی؛ کلید پشته غیرمجاز.  این خطا نباید هرگز رخ دهد.',
	'cite_error'                               => 'خطای یادکرد: $1',
	'cite_error_ref_numeric_key'               => 'برچسب <code><ref></code> غیرمجاز؛ نام نمی‌تواند یک عدد باشد. عنوان واضح‌تری را برگزینید',
	'cite_error_ref_no_key'                    => 'برچسب <code><ref></code> غیرمجاز؛ یادکردهای بدون محتوا باید نام داشته باشند',
	'cite_error_ref_too_many_keys'             => 'برچسب <code><ref></code> غیرمجاز؛ نام‌های غیرمجاز یا بیش از اندازه',
	'cite_error_ref_no_input'                  => 'برچسب <code><ref></code> غیرمجاز؛ یادکردهای بدون نام باید محتوا داشته باشند',
	'cite_error_references_invalid_input'      => 'برچسب <code><references></code> غیرمجاز؛ ورود متن مجاز نیست، از <code><references /></code> استفاده کنید',
	'cite_error_references_invalid_parameters' => 'برچسب <code><references></code> غیرمجاز؛ استفاده از پارامتر مجاز است. از <code><references /></code> استفاده کنید',
	'cite_error_references_no_backlink_label'  => "برچسب‌های پیوند به انتها رسید؛‌ موارد جدیدی را در پیام «''cite_references_link_many_format_backlink_labels''» تعریف کنید",
	'cite_error_references_no_text'            => 'برچسب <code><ref></code> غیرمجاز؛ متنی برای یادکردهای با نام <code>$1</code> وارد نشده‌است',

);

/** Finnish (Suomi)
 * @author Nike
 */
 
$messages['fi'] = array(
	'cite_error_references_invalid_parameters' => 'Kelpaamaton <code>&lt;references&gt;</code>-elementti: parametrit eivät ole sallittuja. Käytä muotoa <code>&lt;references /&gt;</code>.',
);

/** French (Français)
 * @author Urhixidur
 * @author Grondin
 */
$messages['fr'] = array(
	'cite_desc'                                => 'Ajoute les balises <nowiki><ref[ name=id]></nowiki> et <nowiki><references/></nowiki>, pour les citations.',
	'cite_croak'                               => 'Citation corrompue ; $1 : $2',
	'cite_error_key_str_invalid'               => 'Erreur interne ; $str attendue',
	'cite_error_stack_invalid_input'           => 'Erreur interne ; clé de pile invalide',
	'cite_error'                               => 'Erreur de citation $1',
	'cite_error_ref_numeric_key'               => 'Appel invalide ; clé non-intégrale attendue',
	'cite_error_ref_no_key'                    => 'Appel invalide ; aucune clé spécifiée',
	'cite_error_ref_too_many_keys'             => 'Appel invalide ; clés invalides, par exemple, trop de clés spécifiées ou clé erronée',
	'cite_error_ref_no_input'                  => 'Appel invalide ; aucune entrée spécifiée',
	'cite_error_references_invalid_input'      => 'Entrée invalide ; entrée attendue',
	'cite_error_references_invalid_parameters' => 'Arguments invalides ; argument attendu',
	'cite_error_references_no_backlink_label'  => 'Épuisement des étiquettes personnalisées, définissez-en un plus grand nombre dans le message « cite_references_link_many_format_backlink_labels »',
	'cite_error_references_no_text'            => 'Aucun texte indiqué.',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'cite_desc'                                => 'Apond les balises <nowiki><ref[ name=id]></nowiki> et <nowiki><references/></nowiki>, por les citacions.',
	'cite_croak'                               => 'Citacion corrompua ; $1 : $2',
	'cite_error_key_str_invalid'               => 'Èrror de dedens ; $str atendua.',
	'cite_error_stack_invalid_input'           => 'Èrror de dedens ; cllâf de pila envalida.',
	'cite_error'                               => 'Èrror de citacion $1',
	'cite_error_ref_numeric_key'               => 'Apèl envalido ; cllâf pas entègrâla atendua.',
	'cite_error_ref_no_key'                    => 'Apèl envalido ; niona cllâf spècefiâ.',
	'cite_error_ref_too_many_keys'             => 'Apèl envalido ; cllâfs envalides, per ègzemplo, trop de cllâfs spècefiâs ou ben cllâf fôssa.',
	'cite_error_ref_no_input'                  => 'Apèl envalido ; niona entrâ spècefiâ.',
	'cite_error_references_invalid_input'      => 'Entrâ envalida ; entrâ atendua.',
	'cite_error_references_invalid_parameters' => 'Arguments envalidos ; argument atendu.',
	'cite_error_references_no_backlink_label'  => 'Ègzécucion en defôr de les ètiquètes pèrsonalisâs, dèfenésséd de ples dens lo mèssâjo « cite_references_link_many_format_backlink_labels ».',
	'cite_error_references_no_text'            => 'Nion tèxte endicâ por les refèrences siuventes : <code>$1</code>',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 * @author Xosé
 */
$messages['gl'] = array(
	'cite_desc'                                => 'Engada <nowiki><ref[ nome=id]></nowiki> e <nowiki><references/></nowiki> tags, para notas',
	'cite_error_key_str_invalid'               => 'Erro interno; $str e/ou $key inválidos. Isto non debera ocorrer.',
	'cite_error_stack_invalid_input'           => 'Erro interno; stack key inválido. Isto non debera ocorrer.',
	'cite_error'                               => 'Citar erro: $1',
	'cite_error_ref_numeric_key'               => 'Etiqueta <code>&lt;ref&gt;</code> non válida; o nome non pode ser un simple entero, use un título descriptivo',
	'cite_error_ref_no_key'                    => 'Etiqueta <code>&lt;ref&gt;</code> non válida; refs que non teñan contido deben ter un nome',
	'cite_error_ref_too_many_keys'             => 'Etiqueta <code>&lt;ref&gt;</code> non válida; nomes non válidos, é dicir, demasiados',
	'cite_error_ref_no_input'                  => 'Etiqueta <code>&lt;ref&gt;</code> non válida; refs que non teñan nome, deben ter contido',
	'cite_error_references_invalid_input'      => 'Etiqueta <code>&lt;references&gt;</code> non válida; non se permite esa entrada, use
<code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'Etiqueta <code>&lt;references&gt;</code> non válida; non están permitidos esos parámetros, use <code>&lt;references /&gt;</code>',
	'cite_error_references_no_text'            => 'Etiqueta non válida <code>&lt;ref&gt;</code>; non se forneceu texto para as refs de nome <code>$1</code>',
);

/** Gujarati (ગુજરાતી) */
$messages['gu'] = array(
	'cite_references_link_many_format_backlink_labels' => 'અ આ ઇ ઈ ઉ ઊ એ ઐ ઓ ઔ ક ખ ગ ઘ ચ છ જ ઝ ટ ઠ ડ ઢ ણ ત થ દ ધ ન પ ફ બ ભ મ ય ર લ વ શ ષ સ હ ળ',
);

/** Hebrew (עברית) */
$messages['he'] = array(
	'cite_desc'                                => 'מוסיף תגיות <nowiki><ref[ name=id]></nowiki> and <nowiki><references/></nowiki>, עבור הערות שוליים',
	'cite_croak'                               => 'בהערה יש שגיאה; $1: $2',
	'cite_error_key_str_invalid'               => 'שגיאה פנימית; $str ו/או $key שגויים. זהו באג בתוכנה.',
	'cite_error_stack_invalid_input'           => 'שגיאה פנימית; מפתח שגוי במחסנית. זהו באג בתוכנה.',
	'cite_error'                               => 'שגיאת ציטוט: $1',
	'cite_error_ref_numeric_key'               => 'תגית <code>&lt;ref&gt;</code> שגויה; שם לא יכול להיות מספר פשוט, יש להשתמש בכותרת תיאורית',
	'cite_error_ref_no_key'                    => 'תגית <code>&lt;ref&gt;</code> שגויה; להערות שוליים ללא תוכן חייב להיות שם',
	'cite_error_ref_too_many_keys'             => 'תגית <code>&lt;ref&gt;</code> שגויה; שמות שגויים, למשל, רבים מדי',
	'cite_error_ref_no_input'                  => 'תגית <code>&lt;ref&gt;</code> שגויה; להערות שוליים ללא שם חייב להיות תוכן',
	'cite_error_references_invalid_input'      => 'תגית <code>&lt;references&gt;</code> שגויה; לא ניתן לכתוב תוכן, יש להשתמש בקוד <code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'תגית <code>&lt;references&gt;</code> שגויה; לא ניתן להשתמש בפרמטרים, יש להשתמש בקוד <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'  => "נגמרו תוויות הקישורים המותאמים אישית, אנא הגדירו נוספים בהודעת המערכת \"''cite_references_link_many_format_backlink_labels''\"",
	'cite_error_references_no_text'            => 'תגית <code>&lt;ref&gt;</code> שגויה; לא נכתב טקסט עבור הערת השוליים בשם <code>$1</code>',
);

/** Croatian (Hrvatski)
 * @author Dnik
 * @author SpeedyGonsales
 */
$messages['hr'] = array(
	'cite_desc'                                => 'Dodaje <nowiki><ref[ name=id]></nowiki> i <nowiki><references/></nowiki> oznake, za citiranje',
	'cite_croak'                               => 'Nevaljan citat; $1: $2',
	'cite_error_key_str_invalid'               => 'Unutrašnja greška: loš $str i/ili $key. Ovo se nikada ne bi smjelo dogoditi.',
	'cite_error_stack_invalid_input'           => 'Unutrašnja greška; loš ključ stacka.  Ovo se nikada ne bi smjelo dogoditi.',
	'cite_error'                               => 'Greška u citiranju: $1',
	'cite_error_ref_numeric_key'               => 'Loša <code>&lt;ref&gt;</code> oznaka; naziv ne smije biti jednostavni broj, koristite opisni naziv',
	'cite_error_ref_no_key'                    => 'Loša <code>&lt;ref&gt;</code> oznaka; ref-ovi bez sadržaja moraju imati naziv',
	'cite_error_ref_too_many_keys'             => 'Loša <code>&lt;ref&gt;</code> oznaka; loš naziv, npr. previše naziva',
	'cite_error_ref_no_input'                  => 'Loša <code>&lt;ref&gt;</code> oznaka; ref-ovi bez imena moraju imati sadržaj',
	'cite_error_references_invalid_input'      => 'Loša <code>&lt;references&gt;</code> oznaka; nije dozvoljen unos, koristite
<code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'Loša <code>&lt;references&gt;</code> oznaka; parametri nisu dozvoljeni, koristite <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'  => "Potrošene sve posebne oznake za poveznice unatrag, definirajte više u poruci \"''cite_references_link_many_format_backlink_labels''\"",
	'cite_error_references_no_text'            => 'Nije zadan tekst za izvor <code>$1</code>',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'cite_desc'                                => 'Přidawa taflički <nowiki><ref[ name=id]></nowiki> a <nowiki><references /></nowiki> za žórłowe podaća',
	'cite_croak'                               => 'Zmylk w referencnym systemje; $1: $2',
	'cite_error_key_str_invalid'               => 'Interny zmylk: njepłaćiwy $str a/abo $key. To njeměło ženje wustupić.',
	'cite_error_stack_invalid_input'           => 'Interny zmylk; njepłaćiwy kluč staploweho składa. To njeměło ženje wustupić.',
	'cite_error'                               => 'Referencny zmylk: $1',
	'cite_error_ref_numeric_key'               => 'Njepłaćiwe wužiwanje taflički <code>&lt;ref&gt;</code>; "name" njesmě jednora hódnota integer być, wužij wopisowace mjeno.',
	'cite_error_ref_no_key'                    => 'Njepłaćiwe wužiwanje taflički <code>&lt;ref&gt;</code>; "ref" bjez wobsaha dyrbi mjeno měć.',
	'cite_error_ref_too_many_keys'             => 'Njepłaćiwe wužiwanje taflički <code>&lt;ref&gt;</code>; njepłaćiwe mjena, na př. předołho',
	'cite_error_ref_no_input'                  => 'Njepłaćiwe wužiwanje taflički <code>&lt;ref&gt;</code>; "ref" bjez mjena dyrbi wobsah měć',
	'cite_error_references_invalid_input'      => 'Njepłaćiwe wužiwanje taflički <code>&lt;references&gt;</code>; žadyn zapodaty tekst dowoleny, wužij jenož
<code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'Njepłaćiwe wužiwanje taflički <code>&lt;references&gt;</code>; žane parametry dowolene, wužij jenož <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'  => 'Referenca formy <code><nowiki><ref name="…"/></nowiki></code> so husćišo wužiwa hač su pismiki. Administrator dyrbi <nowiki>[[MediaWiki:cite references link many format backlink labels]]</nowiki> nałožić, zo by dalše pismiki dodał.',
	'cite_error_references_no_text'            => 'Njepłaćiwa referenca formy <code>&lt;ref&gt;</code>; žadyn tekst za referency z mjenom  <code>$1</code> podaty.',
);

/** Hungarian (Magyar)
 * @author Bdanee
 * @author KossuthRad
 */
$messages['hu'] = array(
	'cite_desc'                                => 'Lehetővé teszi idézések létrehozását <nowiki><ref[ name=id]></nowiki> és <nowiki><references/></nowiki> tagek segítségével',
	'cite_croak'                               => 'Sikertelen forráshivatkozás; $1: $2',
	'cite_error_key_str_invalid'               => 'Belső hiba; érvénytelen $str és/vagy $key. Ennek soha nem kellene előfordulnia.',
	'cite_error_stack_invalid_input'           => 'Belső hiba; érvénytelen kulcs. Ennek soha nem kellene előfordulnia.',
	'cite_error'                               => 'Hiba a forráshivatkozásban: $1',
	'cite_error_ref_numeric_key'               => 'Hibás <code>&lt;ref&gt;</code> tag; a name értéke nem lehet csupán egy szám, használj leíró címeket',
	'cite_error_ref_no_key'                    => 'Hibás <code>&lt;ref&gt;</code> tag; a tartalom nélküli ref-eknek kötelező nevet (name) adni',
	'cite_error_ref_too_many_keys'             => 'Hibás <code>&lt;ref&gt;</code> tag; hibás nevek, pl. túl sok',
	'cite_error_ref_no_input'                  => 'Hibás <code>&lt;ref&gt;</code> tag; a név (name) nélküli ref-eknek adni kell valamilyen tartalmat',
	'cite_error_references_invalid_input'      => 'Hibás <code>&lt;references&gt;</code> tag; nem lehet neki tartalmat adni, használd a
<code>&lt;references /&gt;</code> formát',
	'cite_error_references_invalid_parameters' => 'Hibás <code>&lt;references&gt;</code> tag; nincsenek paraméterei, használd a <code>&lt;references /&gt;</code> formát',
	'cite_error_references_no_backlink_label'  => "Elfogytak a visszahivatkozásra használt címkék, adj meg többet a ''cite_references_link_many_format_backlink_labels'' üzenetben",
	'cite_error_references_no_text'            => 'Hibás <code>&lt;ref&gt;</code> tag; nincs megadva szöveg a(z) <code>$1</code> nevű ref-eknek',
);

/** Indonesian (Bahasa Indonesia) */
$messages['id'] = array(
	'cite_croak'                               => 'Kegagalan pengutipan; $1: $2',
	'cite_error_key_str_invalid'               => 'Kesalahan internal; $str tak sah',
	'cite_error_stack_invalid_input'           => 'Kesalahan internal; kunci stack tak sah',
	'cite_error'                               => 'Kesalahan pengutipan $1',
	'cite_error_ref_numeric_key'               => 'Kesalahan pemanggilan; diharapkan suatu kunci non-integer',
	'cite_error_ref_no_key'                    => 'Kesalahan pemanggilan; tidak ada kunci yang dispesifikasikan',
	'cite_error_ref_too_many_keys'             => 'Kesalahan pemanggilan; kunci tak sah, contohnya karena terlalu banyak atau tidak ada kunci yang dispesifikasikan',
	'cite_error_ref_no_input'                  => 'Kesalahan pemanggilan; tidak ada masukan yang dispesifikasikan',
	'cite_error_references_invalid_input'      => 'Kesalahan masukan; seharusnya tidak ada',
	'cite_error_references_invalid_parameters' => 'Paramater tak sah; seharusnya tidak ada',
	'cite_error_references_no_backlink_label'  => "Kehabisan label pralana balik, tambakan pada pesan sistem \"''cite_references_link_many_format_backlink_labels''\"",
);

/** Italian (Italiano)
 * @author BrokenArrow
 */
$messages['it'] = array(
	'cite_desc'                                => 'Aggiunge i tag <nowiki><ref[ name=id]></nowiki> e <nowiki><references/></nowiki> per gestire le citazioni',
	'cite_croak'                               => 'Errore nella citazione: $1: $2',
	'cite_error_key_str_invalid'               => 'Errore interno: $str errato',
	'cite_error_stack_invalid_input'           => 'Errore interno: chiave di stack errata',
	'cite_error'                               => 'Errore nella funzione Cite $1',
	'cite_error_ref_numeric_key'               => "Errore nell'uso del marcatore <code>&lt;ref&gt;</code>: il nome non può essere un numero intero. Usare un titolo esteso",
	'cite_error_ref_no_key'                    => "Errore nell'uso del marcatore <code>&lt;ref&gt;</code>: i ref vuoti non possono essere privi di nome",
	'cite_error_ref_too_many_keys'             => "Errore nell'uso del marcatore <code>&lt;ref&gt;</code>: nomi non validi (ad es. numero troppo elevato)",
	'cite_error_ref_no_input'                  => "Errore nell'uso del marcatore <code>&lt;ref&gt;</code>: i ref privi di nome non possono essere vuoti",
	'cite_error_references_invalid_input'      => "Errore nell'uso del marcatoree <code>&lt;references&gt;</code>: input non ammesso, usare il marcatore
<code>&lt;references /&gt;</code>",
	'cite_error_references_invalid_parameters' => "Errore nell'uso del marcatore <code>&lt;references&gt;</code>: parametri non ammessi, usare il marcatore <code>&lt;references /&gt;</code>",
	'cite_error_references_no_backlink_label'  => "Etichette di rimando personalizzate esaurite, aumentarne il numero nel messaggio \"''cite_references_link_many_format_backlink_labels''\"",
	'cite_error_references_no_text'            => 'Marcatore <code>&lt;ref&gt;</code> non valido; non è stato indicato alcun testo per il marcatore <code>$1</code>',
);

/** Japanese (日本語)
 * @author JtFuruhata
 */
$messages['ja'] = array(
	'cite_desc'                                => '引用のためのタグ<nowiki><ref[ name=id]></nowiki> および <nowiki><references/></nowiki> を追加する',
	'cite_croak'                               => '引用タグ機能の重大なエラー; $1: $2',
	'cite_error_key_str_invalid'               => '内部エラー; 無効な $str',
	'cite_error_stack_invalid_input'           => '内部エラー; 無効なスタックキー',
	'cite_error'                               => '引用エラー $1',
	'cite_error_ref_numeric_key'               => '無効な <code>&lt;ref&gt;</code> タグ: 名前に単純な数値は使用できません。',
	'cite_error_ref_no_key'                    => '無効な <code>&lt;ref&gt;</code> タグ: 引用句の内容がない場合には名前 （<code>name</code> 属性）が必要です',
	'cite_error_ref_too_many_keys'             => '無効な <code>&lt;ref&gt;</code> タグ: 無効な名前（多すぎる、もしくは誤った指定）',
	'cite_error_ref_no_input'                  => '無効な <code>&lt;ref&gt;</code> タグ: 名前 （<code>name</code> 属性）がない場合には引用句の内容が必要です',
	'cite_error_references_invalid_input'      => '無効な <code>&lt;references&gt;</code> タグ: 内容のあるタグは使用できません。 <code>&lt;references /&gt;</code> を用いてください。',
	'cite_error_references_invalid_parameters' => '無効な <code>&lt;references&gt;</code> タグ: 引数のあるタグは使用できません。 <code>&lt;references /&gt;</code> を用いてください。',
	'cite_error_references_no_backlink_label'  => "バックリンクラベルが使用できる個数を超えました。\"''cite_references_link_many_format_backlink_labels''\" メッセージでの定義を増やしてください。",
	'cite_error_references_no_text'            => '無効な <code>&lt;ref&gt;</code> タグ: <code>$1</code>という名前の引用句に対するテキストがありません。',
);

/** ‫قازاقشا (جۇنگو)‬ (‫قازاقشا (جۇنگو)‬) */
$messages['kk-arab'] = array(
	'cite_croak'                               => 'دٵيەكسٶز الۋ سٵتسٸز بٸتتٸ; $1: $2 ',
	'cite_error_key_str_invalid'               => 'ٸشكٸ قاتە; جارامسىز $str ',
	'cite_error_stack_invalid_input'           => 'ٸشكٸ قاتە; جارامسىز ستەك كٸلتٸ',
	'cite_error'                               => 'دٵيەكسٶز الۋ $1 قاتەسٸ',
	'cite_error_ref_numeric_key'               => 'جارامسىز <code>&lt;ref&gt;</code> بەلگٸشەسٸ; اتاۋ كٵدٸمگٸ بٷتٸن سان بولۋى مٷمكٸن ەمەس, سيپپاتاۋىش اتاۋ قولدانىڭىز',
	'cite_error_ref_no_key'                    => 'جارامسىز <code>&lt;ref&gt;</code> بەلگٸشەسٸ; ماعلۇماتسىز تٷسٸنٸكتەمەلەردە اتاۋ بولۋى قاجەت',
	'cite_error_ref_too_many_keys'             => 'جارامسىز <code>&lt;ref&gt;</code> بەلگٸشە; جارامسىز اتاۋلار, مىسالى, تىم كٶپ',
	'cite_error_ref_no_input'                  => 'جارامسىز <code>&lt;ref&gt;</code> بەلگٸشە; اتاۋسىز تٷسٸنٸكتەمەلەردە ماعلۇماتى بولۋى قاجەت',
	'cite_error_references_invalid_input'      => 'جارامسىز <code>&lt;references&gt;</code> بەلگٸشە; ەش كٸرٸس رۇقسات ەتٸلمەيدٸ, بىلاي <code>&lt;references /&gt;</code> قولدانىڭىز',
	'cite_error_references_invalid_parameters' => 'جارامسىز <code>&lt;references&gt;</code> بەلگٸشە; ەش باپتار رۇقسات ەتٸلمەيدٸ, بىلاي <code>&lt;references /&gt;</code> قولدانىڭىز',
	'cite_error_references_no_backlink_label'  => "قوسىمشا بەلگٸلەردٸڭ سانى بٸتتٸ, ودان ٵرٸ كٶبٸرەك «''cite_references_link_many_format_backlink_labels''» جٷيە حابارىندا بەلگٸلەڭٸز",
);

/** ‪Қазақша (Қазақстан)‬ (‪Қазақша (Қазақстан)‬) */
$messages['kk-cyrl'] = array(
	'cite_croak'                               => 'Дәйексөз алу сәтсіз бітті; $1: $2 ',
	'cite_error_key_str_invalid'               => 'Ішкі қате; жарамсыз $str ',
	'cite_error_stack_invalid_input'           => 'Ішкі қате; жарамсыз стек кілті',
	'cite_error'                               => 'Дәйексөз алу $1 қатесі',
	'cite_error_ref_numeric_key'               => 'Жарамсыз <code>&lt;ref&gt;</code> белгішесі; атау кәдімгі бүтін сан болуы мүмкін емес, сиппатауыш атау қолданыңыз',
	'cite_error_ref_no_key'                    => 'Жарамсыз <code>&lt;ref&gt;</code> белгішесі; мағлұматсыз түсініктемелерде атау болуы қажет',
	'cite_error_ref_too_many_keys'             => 'Жарамсыз <code>&lt;ref&gt;</code> белгіше; жарамсыз атаулар, мысалы, тым көп',
	'cite_error_ref_no_input'                  => 'Жарамсыз <code>&lt;ref&gt;</code> белгіше; атаусыз түсініктемелерде мағлұматы болуы қажет',
	'cite_error_references_invalid_input'      => 'Жарамсыз <code>&lt;references&gt;</code> белгіше; еш кіріс рұқсат етілмейді, былай <code>&lt;references /&gt;</code> қолданыңыз',
	'cite_error_references_invalid_parameters' => 'Жарамсыз <code>&lt;references&gt;</code> белгіше; еш баптар рұқсат етілмейді, былай <code>&lt;references /&gt;</code> қолданыңыз',
	'cite_error_references_no_backlink_label'  => "Қосымша белгілердің саны бітті, одан әрі көбірек «''cite_references_link_many_format_backlink_labels''» жүйе хабарында белгілеңіз",
);

/** ‪Qazaqşa (Türkïya)‬ (‪Qazaqşa (Türkïya)‬) */
$messages['kk-latn'] = array(
	'cite_croak'                               => 'Däýeksöz alw sätsiz bitti; $1: $2 ',
	'cite_error_key_str_invalid'               => 'İşki qate; jaramsız $str ',
	'cite_error_stack_invalid_input'           => 'İşki qate; jaramsız stek kilti',
	'cite_error'                               => 'Däýeksöz alw $1 qatesi',
	'cite_error_ref_numeric_key'               => 'Jaramsız <code>&lt;ref&gt;</code> belgişesi; ataw kädimgi bütin san bolwı mümkin emes, sïppatawış ataw qoldanıñız',
	'cite_error_ref_no_key'                    => 'Jaramsız <code>&lt;ref&gt;</code> belgişesi; mağlumatsız tüsiniktemelerde ataw bolwı qajet',
	'cite_error_ref_too_many_keys'             => 'Jaramsız <code>&lt;ref&gt;</code> belgişe; jaramsız atawlar, mısalı, tım köp',
	'cite_error_ref_no_input'                  => 'Jaramsız <code>&lt;ref&gt;</code> belgişe; atawsız tüsiniktemelerde mağlumatı bolwı qajet',
	'cite_error_references_invalid_input'      => 'Jaramsız <code>&lt;references&gt;</code> belgişe; eş kiris ruqsat etilmeýdi, bılaý <code>&lt;references /&gt;</code> qoldanıñız',
	'cite_error_references_invalid_parameters' => 'Jaramsız <code>&lt;references&gt;</code> belgişe; eş baptar ruqsat etilmeýdi, bılaý <code>&lt;references /&gt;</code> qoldanıñız',
	'cite_error_references_no_backlink_label'  => "Qosımşa belgilerdiñ sanı bitti, odan äri köbirek «''cite_references_link_many_format_backlink_labels''» jüýe xabarında belgileñiz",
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'cite_croak' => 'Feeler am Referenz-System. $1 : $2',
	'cite_error' => 'Zitéierfeeler: $1',
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 */
$messages['li'] = array(
	'cite_desc'                                => 'Voeg <nowiki><ref[ name=id]></nowiki> en <nowiki><references/></nowiki> tags toe veur citate',
	'cite_croak'                               => 'Perbleem mit Citere; $1: $2',
	'cite_error_key_str_invalid'               => 'Interne fout; ónzjuuste $str en/of $key.  Dit zów noeaits mótte veurkómme.',
	'cite_error_stack_invalid_input'           => 'Interne fout; ónzjuuste stacksleutel.  Dit zów noeaits mótte veurkómme.',
	'cite_error'                               => 'Citeerfout: $1',
	'cite_error_ref_numeric_key'               => "Ónzjuuste tag <code>&lt;ref&gt;</code>; de naam kin gein simpele integer zeen, gebroek 'ne besjrievendje titel",
	'cite_error_ref_no_key'                    => "Ónzjuuste tag <code>&lt;ref&gt;</code>; refs zónger inhoud mótte 'ne naam höbbe",
	'cite_error_ref_too_many_keys'             => 'Ónzjuuste tag <code>&lt;ref&gt;</code>; ónzjuuste name, beveurbeildj te väöl',
	'cite_error_ref_no_input'                  => 'Ónzjuuste tag <code>&lt;ref&gt;</code>; refs zónger naam mótte inhoud höbbe',
	'cite_error_references_invalid_input'      => 'Ónzjuuste tag <code>&lt;references&gt;</code>; inveur is neet toegestaon, gebroek <code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'Ónzjuuste tag <code>&lt;references&gt;</code>; paramaeters zeen neet toegestaon, gebroek <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'  => "'t Aantal besjikbare backlinklabels is opgebroek. Gaef meer labels op in 't berich \"''cite_references_link_many_format_backlink_labels''\"",
	'cite_error_references_no_text'            => "Ónzjuuste tag <code>&lt;ref&gt;</code>; d'r is gein teks opgegaeve veur refs mit de naam <code>$1</code>",
);


/** Lietuvių (Lietuvių) */
$messages['lt'] = array(
	'cite_croak'                               => 'Cituoti nepavyko; $1: $2',
	'cite_error_key_str_invalid'               => 'Vidinė klaida; neleistinas $str',
	'cite_error_stack_invalid_input'           => 'Vidinė klaida; neleistinas steko raktas',
	'cite_error'                               => 'Citavimo klaida $1',
	'cite_error_ref_numeric_key'               => 'Neleistina <code>&lt;ref&gt;</code> gairė; vardas negali būti tiesiog skaičius, naudokite tekstinį pavadinimą',
	'cite_error_ref_no_key'                    => 'Neleistina <code>&lt;ref&gt;</code> gairė; nuorodos be turinio turi turėti vardą',
	'cite_error_ref_too_many_keys'             => 'Neleistina <code>&lt;ref&gt;</code> gairė; neleistini vardai, pvz., per daug',
	'cite_error_ref_no_input'                  => 'Neleistina <code>&lt;ref&gt;</code> gairė; nuorodos be vardo turi turėti turinį',
	'cite_error_references_invalid_input'      => 'Neleistina <code>&lt;references&gt;</code> gairė; neleistina jokia įvestis, naudokite <code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'Neleistina <code>&lt;references&gt;</code> gairė; neleidžiami jokie parametrai, naudokite <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'  => "Baigėsi antraštės, nurodykite daugiau \"''cite_references_link_many_format_backlink_labels''\" sisteminiame tekste",
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'cite_desc'                                => 'Voegt <nowiki><ref[ name=id]></nowiki> en <nowiki><references/></nowiki> tags toe voor citaten',
	'cite_croak'                               => 'Probleem met Cite; $1: $2',
	'cite_error_key_str_invalid'               => 'Interne fout; onjuiste $str',
	'cite_error_stack_invalid_input'           => 'Interne fout; onjuiste stacksleutel',
	'cite_error'                               => 'Citefout $1',
	'cite_error_ref_numeric_key'               => 'Onjuiste tag <code>&lt;ref&gt;</code>; de naam kan geen simplele integer zijn, gebruik een beschrijvende titel',
	'cite_error_ref_no_key'                    => 'Onjuiste tag <code>&lt;ref&gt;</code>; refs zonder inhoud moeten een naam hebben',
	'cite_error_ref_too_many_keys'             => 'Onjuiste tag <code>&lt;ref&gt;</code>; onjuiste namen, bijvoorbeeld te veel',
	'cite_error_ref_no_input'                  => 'Onjuiste tag <code>&lt;ref&gt;</code>; refs zonder naam moeten inhoud hebben',
	'cite_error_references_invalid_input'      => 'Onjuiste tag <code>&lt;references&gt;</code>; invoer is niet toegestaan, gebruik <code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'Onjuiste tag <code>&lt;references&gt;</code>; parameters zijn niet toegestaan, gebruik <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'  => "Het aantal beschikbare backlinklabels is opgebruikt. Geef meer labels op in het bericht \"''cite_references_link_many_format_backlink_labels''\"",
	'cite_error_references_no_text'            => 'Onjuiste tag <code>&lt;ref&gt;</code>; er is geen tekst opgegeven voor refs met de naam <code>$1</code>',
);

/** Norwegian (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'cite_desc'                                => 'Legger til <nowiki><ref[ name=id]></nowiki> og <nowiki><references/></nowiki>-tagger for referanser',
	'cite_croak'                               => 'Sitering døde; $1: $2',
	'cite_error_key_str_invalid'               => 'Intern feil: Ugyldig $str og/eller $key. Dette burde aldri forekomme.',
	'cite_error_stack_invalid_input'           => 'Intern feil; ugyldig stakknøkkel. Dette burde aldri forekomme.',
	'cite_error'                               => 'Siteringsfeil: $1',
	'cite_error_ref_numeric_key'               => 'Ugyldig <code>&lt;ref&gt;</code>-kode; navnet kan ikke være et enkelt heltall, bruk en beskrivende tittel',
	'cite_error_ref_no_key'                    => 'Ugyldig <code>&lt;ref&gt;</code>-kode; referanser uten innhold må inneholde navn',
	'cite_error_ref_too_many_keys'             => 'Ugyldig <code>&lt;ref&gt;</code>-kode; ugyldige navn, f.eks. for mange',
	'cite_error_ref_no_input'                  => 'Ugyldig <code>&lt;ref&gt;</code>-kode; referanser uten navn må ha innhold',
	'cite_error_references_invalid_input'      => 'Ugyldig <code>&lt;references&gt;</code>-tagg: Innhold er ikke tillatt, bruk i stedet <code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'Ugyldig <code>&lt;references&gt;</code>-kode; ingen parametere tillates, bruk <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'  => "Gikk tom for egendefinerte tilbakelenketekster; definer flere i beskjeden «''cite_references_link_many_format_backlink_labels''»",
	'cite_error_references_no_text'            => 'Ugyldig <code>&lt;ref&gt;</code>-tagg; ingen tekst ble oppgitt for referansen ved navn <code>$1</code>',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'cite_desc'                                => 'Ajusta las balisas <nowiki><ref[ name=id]></nowiki> e <nowiki><references/></nowiki>, per las citacions.',
	'cite_croak'                               => 'Citacion corrompuda ; $1 : $2',
	'cite_error_key_str_invalid'               => 'Error intèrna ; $str esperada',
	'cite_error_stack_invalid_input'           => 'Error intèrna ; clau de pila invalida',
	'cite_error'                               => 'Error de citacion $1',
	'cite_error_ref_numeric_key'               => 'Apèl invalid ; clau non-integrala esperada',
	'cite_error_ref_no_key'                    => 'Apèl invalid ; cap de clau pas especificada',
	'cite_error_ref_too_many_keys'             => 'Apèl invalid ; claus invalidas, per exemple, tròp de claus especificadas o clau erronèa',
	'cite_error_ref_no_input'                  => 'Apèl invalid ; cap de dintrada pas especificada',
	'cite_error_references_invalid_input'      => 'Entrada invalida ; entrada esperada',
	'cite_error_references_invalid_parameters' => 'Arguments invalids ; argument esperat',
	'cite_error_references_no_backlink_label'  => 'Execucion en defòra de las etiquetas personalizadas, definissetz mai dins lo messatge « cite_references_link_many_format_backlink_labels »',
	'cite_error_references_no_text'            => 'Cap de tèxt pas indicat.',
);

/** Pangasinan (Pangasinan)
 * @author SPQRobin
 */
$messages['pag'] = array(
	'cite_error' => 'Bitlaen so error $1; $2',
);

/** Polish (Polski)
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'cite_desc'                      => 'Dodaje znaczniki <nowiki><ref[ name=id]></nowiki> and <nowiki><references/></nowiki> ułatwiające podawanie źródeł cytatów',
	'cite_error_key_str_invalid'     => 'Błąd wewnętrzny - nieprawidłowy tekst $str i/lub klucz $key. To nigdy nie powinno się zdarzyć.',
	'cite_error_stack_invalid_input' => 'Błąd wewnętrzny - nieprawidłowy klucz sterty. To nigdy nie powinno się zdarzyć.',
	'cite_error'                     => "Błąd rozszerzenia ''cite'': $1",
);

/** Portuguese (Português)
 * @author Malafaya
 * @author 555
 */
$messages['pt'] = array(
	'cite_desc'                                => 'Adiciona marcas <nowiki><ref[ name=id]></nowiki> e <nowiki><references/></nowiki> para citações',
	'cite_croak'                               => 'Citação com problemas; $1: $2',
	'cite_error_key_str_invalid'               => 'Erro interno; $str inválido',
	'cite_error_stack_invalid_input'           => 'Erro interno; chave fixa inválida',
	'cite_error'                               => 'Erro de citação $1',
	'cite_error_ref_numeric_key'               => 'Código <code>&lt;ref&gt;</code> inválido; o nome não pode ser um número. Utilize um nome descritivo',
	'cite_error_ref_no_key'                    => 'Código <code>&lt;ref&gt;</code> inválido; refs sem conteúdo devem ter um parâmetro de nome',
	'cite_error_ref_too_many_keys'             => 'Código <code>&lt;ref&gt;</code> inválido; nomes inválidos (por exemplo, nome muito extenso)',
	'cite_error_ref_no_input'                  => 'Código <code>&lt;ref&gt;</code> inválido; refs sem parâmetro de nome devem possuir conteúdo a elas associado',
	'cite_error_references_invalid_input'      => 'Código <code>&lt;references&gt;</code> inválido; no input is allowed, use
<code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'Código <code>&lt;references&gt;</code> inválido; não são permitidos parâmetros. Utilize como <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'  => "Etiquetas de backlink esgotadas. Defina mais na mensagem \"''cite_references_link_many_format_backlink_labels''\"",
	'cite_error_references_no_text'            => 'Tag <code>&lt;ref&gt;</code> inválida; não foi fornecido texto para as refs chamadas <code>$1</code>',
);

/** Russian (Русский)
 * @author Kalan
 * @author .:Ajvol:.
 */
$messages['ru'] = array(
	'cite_desc'                                        => 'Добавляет теги <nowiki><ref[ name=id]></nowiki> и <nowiki><references/></nowiki> для сносок',
	'cite_croak'                                       => 'Цитата сдохла; $1: $2',
	'cite_error_key_str_invalid'                       => 'Внутренняя ошибка: неверный $str',
	'cite_error_stack_invalid_input'                   => 'Внутренняя ошибка: неверный ключ стека ',
	'cite_error'                                       => 'Ошибка цитирования $1',
	'cite_error_ref_numeric_key'                       => 'Неправильный вызов: ожидался нечисловой ключ',
	'cite_error_ref_no_key'                            => 'Неправильный вызов: ключ не был указан',
	'cite_error_ref_too_many_keys'                     => 'Неправильный вызов: неверные ключи, например было указано слишком много ключей или ключ был неправильным',
	'cite_error_ref_no_input'                          => 'Неверный вызов: нет входных данных',
	'cite_error_references_invalid_input'              => 'Входные данные недействительны, так как не предполагаются',
	'cite_error_references_invalid_parameters'         => 'Переданы недействительные параметры; их вообще не предусмотрено.',
	'cite_error_references_no_backlink_label'          => 'Не хватает символов для возвратных гиперссылок; следует расширить системную переменную «cite_references_link_many_format_backlink_labels».',
	'cite_error_references_no_text'                    => 'Неверный тег <code>&lt;ref&gt;</code>; для сносок <code>$1</code> не указан текст',
	'cite_references_link_many_format_backlink_labels' => 'а б в г д е ё ж з и й к л м н о п р с т у ф х ц ч ш щ ъ ы ь э ю я',
);

/** Yakut (Саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'cite_desc'                                => 'Хос быһаарыы <nowiki><ref[ name=id]></nowiki> уонна <nowiki><references/></nowiki> тиэктэрин эбэр',
	'cite_croak'                               => 'Быһа тардыы суох буолбут (Цитата сдохла); $1: $2',
	'cite_error_key_str_invalid'               => 'Иһинээҕи сыыһа: $str уонна/эбэтэр $key сыыһалар.',
	'cite_error_stack_invalid_input'           => 'Иһинээҕи сыыһа: stack key сыыһалаах',
	'cite_error'                               => 'Цитата сыыһата: $1',
	'cite_error_ref_numeric_key'               => 'Неправильный вызов: ожидался нечисловой ключ',
	'cite_error_ref_no_key'                    => '<code>&lt;ref&gt;</code> тиэк алҕаһа (Неправильный вызов): аата (күлүүһэ) ыйыллыбатах',
	'cite_error_ref_too_many_keys'             => '<code>&lt;ref&gt;</code> тиэк алҕаһа (Неправильный вызов): аата сыыһа ыйыллыбыт, эбэтэр наһаа элбэх аат суруллубут',
	'cite_error_ref_no_input'                  => '<code>&lt;ref&gt;</code> тиэк алҕастаах (Неверный вызов): иһинээҕитэ сыыһа',
	'cite_error_references_invalid_input'      => '<code>&lt;references&gt;</code> тиэк алҕаһа, иһигэр туох да суох буолуохтаах',
	'cite_error_references_invalid_parameters' => 'Сыыһа параметрдар бэриллибиттэр; <code>&lt;references /&gt;</code> тиэккэ отой суох буолуохтаахтар',
	'cite_error_references_no_backlink_label'  => 'Не хватает символов для возвратных гиперссылок; следует расширить системную переменную «cite_references_link_many_format_backlink_labels».',
	'cite_error_references_no_text'            => 'Сыыһа тиэк (тег) <code>&lt;ref&gt;</code>; хос быһаарыыларга <code>$1</code> тиэкис ыйыллыбатах',
);

/** Slovak (Slovenčina)
 * @author Helix84
 * @author Siebrand
 * @author Robbot
 */
$messages['sk'] = array(
	'cite_desc'                                => 'Pridáva značky <nowiki><ref[ name=id]></nowiki> a <nowiki><references/></nowiki> pre citácie',
	'cite_croak'                               => 'Citát je už neaktuálny; $1: $2',
	'cite_error_key_str_invalid'               => 'Vnútorná chyba; neplatný $str',
	'cite_error_stack_invalid_input'           => 'Vnútorná chyba; neplatný kľúč zásobníka',
	'cite_error'                               => 'Chyba citácie $1',
	'cite_error_ref_numeric_key'               => 'Neplatné volanie; očakáva sa neceločíselný typ kľúča',
	'cite_error_ref_no_key'                    => 'Neplatné volanie; nebol špecifikovaný kľúč',
	'cite_error_ref_too_many_keys'             => 'Neplatné volanie; neplatné kľúče, napr. príliš veľa alebo nesprávne špecifikovaný kľúč',
	'cite_error_ref_no_input'                  => 'Neplatné volanie; nebol špecifikovaný vstup',
	'cite_error_references_invalid_input'      => 'Neplatné volanie; neočakával sa vstup',
	'cite_error_references_invalid_parameters' => 'Neplatné parametre; neočakávli sa žiadne',
	'cite_error_references_no_backlink_label'  => "Minuli sa generované návestia spätných odkazov, definujte viac v správe „''cite_references_link_many_format_backlink_labels''“",
	'cite_error_references_no_text'            => 'Neplatná značka <code>&lt;ref&gt;</code>; nebol zadaný text pre referencie s názvom <code>$1</code>',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'cite_desc'                                => 'Föiget foar Wällenätterwiese do <nowiki><ref[ name=id]></nowiki> un <nowiki><references/></nowiki> Tags tou',
	'cite_croak'                               => 'Failer in dät Referenz-System. $1: $2',
	'cite_error_key_str_invalid'               => 'Internen Failer: ungultigen $str',
	'cite_error_stack_invalid_input'           => 'Internen Failer: uungultigen „name“-stack. Dit schuul eegentelk goarnit passierje konne.',
	'cite_error'                               => 'Referenz-Failer $1',
	'cite_error_ref_numeric_key'               => 'Uungultige <code><nowiki><ref></nowiki></code>-Ferweendenge: „name“ duur naan scheenen Taalenwäid weese, benutsje n beschrieuwenden Noome.',
	'cite_error_ref_no_key'                    => 'Uungultige <code><nowiki><ref></nowiki></code>-Ferweendenge: „ref“ sunner Inhoold mout n Noome hääbe.',
	'cite_error_ref_too_many_keys'             => 'Uungultige <code><nowiki><ref></nowiki></code>-Ferweendenge: „name“ is uungultich of tou loang.',
	'cite_error_ref_no_input'                  => 'Uungultige <code><nowiki><ref></nowiki></code>-Ferweendenge: „ref“ sunner Noome mout n Inhoold hääbe.',
	'cite_error_references_invalid_input'      => 'Uungultige <code><nowiki><references></nowiki></code>-Ferweendenge: Der is naan bietoukuumenden Text ferlööwed, ferweend bloot <code><nowiki><references /></nowiki></code>.',
	'cite_error_references_invalid_parameters' => 'Uungultige <code><nowiki><reference></nowiki></code>-Ferweendenge: Der sunt neen bietoukuumende Parametere ferlööwed, ferweend bloot <code><nowiki><reference /></nowiki></code>.',
	'cite_error_references_no_backlink_label'  => 'Ne Referenz fon ju Foarm <code><nowiki><ref name="…"/></nowiki></code> wäd oafter benutsed as Bouksteeuwen deer sunt. N Administrator mout <nowiki>[[MediaWiki:cite references link many format backlink labels]]</nowiki> uum wiedere Bouksteeuwen/Teekene ferfulständigje.',
	'cite_error_references_no_text'            => 'Uungultigen <code>&lt;ref&gt;</code>-Tag; der wuude naan Text foar dät Ref mäd dän Noome <code>$1</code> anroat.',
);

/** Sundanese (Basa Sunda)
 * @author Kandar
 */
$messages['su'] = array(
	'cite_desc'                  => 'Nambahkeun tag <nowiki><ref[ name=id]></nowiki> jeung <nowiki><references/></nowiki>, pikeun cutatan',
	'cite_error_key_str_invalid' => 'Kasalahan internal; salah $str jeung/atawa $key. Kuduna mah teu kieu.',
);

/** Swedish (Svenska)
 * @author Lejonel
 */
$messages['sv'] = array(
	'cite_desc'                                => 'Lägger till taggarna <nowiki><ref[ name=id]></nowiki> och <nowiki><references/></nowiki> för referenser till källor',
	'cite_croak'                               => 'Fel i fotnotssystemet; $1: $2',
	'cite_error_key_str_invalid'               => 'Internt fel; $str eller $key är ogiltiga.  Det här borde aldrig hända.',
	'cite_error_stack_invalid_input'           => 'Internt fel; ogiltig nyckel i stacken.  Det här borde aldrig hända.',
	'cite_error'                               => 'Referensfel: $1',
	'cite_error_ref_numeric_key'               => "Ogiltig <code>&lt;ref&gt;</code>-tag; parametern 'name' kan inte vara ett tal, använd ett beskrivande namn",
	'cite_error_ref_no_key'                    => 'Ogiltig <code>&lt;ref&gt;</code>-tag; referenser utan innehåll måste ha ett namn',
	'cite_error_ref_too_many_keys'             => "Ogiltig <code>&lt;ref&gt;</code>-tag; ogiltiga parametrar, den enda tillåtna parametern är 'name'",
	'cite_error_ref_no_input'                  => 'Ogiltig <code>&lt;ref&gt;</code>-tag; referenser utan namn måste ha innehåll',
	'cite_error_references_invalid_input'      => 'Ogiltig <code>&lt;references&gt;</code>-tag; inget innehåll är tillåtet, använd <code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'Ogiltig <code>&lt;references&gt;</code>-tag; inga parametrar tillåts, använd <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'  => "De definierade etiketterna för tillbaka-länkar har tagit slut, definiera fler etiketter i systemmedelandet \"''cite_references_link_many_format_backlink_labels''\"",
	'cite_error_references_no_text'            => 'Ogiltig <code>&lt;ref&gt;</code>-tag; ingen text har angivits för referensen med namnet <code>$1</code>',
);

/** Telugu (తెలుగు)
 * @author Chaduvari
 * @author Veeven
 */
$messages['te'] = array(
	'cite_desc'                                => 'ఉదహరింపులకు <nowiki><ref[ name=id]></nowiki> మరియు <nowiki><references/></nowiki> టాగులను చేర్చుతుంది',
	'cite_croak'                               => 'ఉదహరింపు చచ్చింది; $1: $2',
	'cite_error_key_str_invalid'               => 'అంతర్గత పొరపాటు: తప్పుడు $str మరియు/లేదా $key. ఇది ఎప్పుడూ జరగకూడదు.',
	'cite_error_stack_invalid_input'           => 'అంతర్గత పొరపాటు: తప్పుడు స్టాక్ కీ. ఇది ఎప్పుడూ జరగకూడదు.',
	'cite_error'                               => 'ఉదహరింపు పొరపాటు: $1',
	'cite_error_ref_numeric_key'               => 'తప్పుడు <code>&lt;ref&gt;</code> టాగు; పేరు సరళ సంఖ్య అయివుండకూడదు, వివరమైన శీర్షిక వాడండి',
	'cite_error_ref_no_key'                    => 'సరైన <code>&lt;ref&gt;</code> ట్యాగు కాదు; విషయం లేని ref లకు తప్పనిసరిగా పేరొకటుండాలి',
	'cite_error_ref_too_many_keys'             => 'సరైన <code>&lt;ref&gt;</code> ట్యాగు కాదు; తప్పు పేర్లు, ఉదాహరణకు మరీ ఎక్కువ',
	'cite_error_ref_no_input'                  => 'సరైన <code>&lt;ref&gt;</code> ట్యాగు కాదు; పేరు లేని ref లలో తప్పనిసరిగా విషయం ఉండాలి',
	'cite_error_references_invalid_input'      => 'సరైన <code>&lt;references&gt;</code> ట్యాగు కాదు; ఇన్‌పుట్ కు అనుమతి లేదు, <code>&lt;references /&gt;</code> వాడండి.',
	'cite_error_references_invalid_parameters' => 'సరైన <code>&lt;references&gt;</code> ట్యాగు కాదు; పారామీటర్లకు కు అనుమతి లేదు, ఈ లోపాన్ని కలుగజేసే ఒక ఉదాహరణ: <references someparameter="value" />',
	'cite_error_references_no_backlink_label'  => "మీ స్వంత బ్యాక్‌లింకు లేబుళ్ళు అయిపోయాయి. \"''cite_references_link_many_format_backlink_labels''\" సందేశంలో మరిన్ని లేబుళ్ళను నిర్వచించుకోండి.",
	'cite_error_references_no_text'            => 'సరైన <code>&lt;ref&gt;</code> కాదు; <code>$1</code> అనే పేరుగల ref లకు పాఠ్యమేమీ ఇవ్వలేదు',
);

/** Tajik (Тоҷикӣ)
 * @author Ibrahim
 */
$messages['tg'] = array(
	'cite_error' => 'Хатои ёдкард: $1',
);

/** Turkish (Türkçe)
 * @author SPQRobin
 */
$messages['tr'] = array(
	'cite_error' => 'Kaynak hatası $1',
);

/** Vietnamese (Tiếng Việt)
 * @author Vinhtantran
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'cite_desc'                                => 'Thêm các thẻ <nowiki><ref[ name=id]></nowiki> và <nowiki><references/></nowiki> để ghi cước chú',
	'cite_croak'                               => 'Chú thích bị hỏng; $1: $2',
	'cite_error_key_str_invalid'               => 'Lỗi nội bộ; $str và/hoặc $key sai.  Đáng ra không bao giờ xảy ra điều này.',
	'cite_error_stack_invalid_input'           => 'Lỗi nội bộ; khóa xác định chồng bị sai.  Đáng ra không bao giờ xảy ra điều này.',
	'cite_error'                               => 'Lỗi chú thích: $1',
	'cite_error_ref_numeric_key'               => 'Thẻ <code>&lt;ref&gt;</code> sai; tên không thể chỉ là số nguyên, hãy dùng tựa đề có tính miêu tả',
	'cite_error_ref_no_key'                    => 'Thẻ <code>&lt;ref&gt;</code> sai; thẻ ref không có nội dung thì phải có tên',
	'cite_error_ref_too_many_keys'             => 'Thẻ <code>&lt;ref&gt;</code> sai; thông số tên sai, như, nhiều thông số tên quá',
	'cite_error_ref_no_input'                  => 'Mã <code>&lt;ref&gt;</code> sai; thẻ ref không có tên thì phải có nội dung',
	'cite_error_references_invalid_input'      => 'Thẻ <code>&lt;references&gt;</code> sai; không được phép nhập nội dung cho thẻ, hãy dùng <code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'Thẻ <code>&lt;references&gt;</code> sai; không được có thông số, hãy dùng <code>&lt;references /&gt;</code>',
	'cite_error_references_no_backlink_label'  => "Đã dùng hết nhãn tham khảo chung, hãy định nghĩa nhiều hơn ở thông báo “''cite_references_link_many_format_backlink_labels''”",
	'cite_error_references_no_text'            => 'Thẻ <code>&lt;ref&gt;</code> sai; không có nội dung trong thẻ ref có tên <code>$1</code>',
);

/** Volapük (Volapük)
 * @author Smeira
 */
$messages['vo'] = array(
	'cite_croak'                               => 'Saitot dädik; $1: $2',
	'cite_error_key_str_invalid'               => 'Pöl ninik: $str e/u $key no lonöföl(s). Atos no sötonöv jenön.',
	'cite_error_stack_invalid_input'           => 'Pöl ninik; kumakik no lonöföl. Atos neai sötonöv jenön.',
	'cite_error'                               => 'Saitamapöl: $1',
	'cite_error_ref_numeric_key'               => 'Nem ela <code>&lt;ref&gt;</code> no lonöföl. Nem no kanon binädön te me numats; gebolös bepenami.',
	'cite_error_ref_no_key'                    => 'Geb no lonöföl ela <code>&lt;ref&gt;</code>: els ref nen ninäd mutons labön nemi',
	'cite_error_ref_too_many_keys'             => 'El <code>&lt;ref&gt;</code> no lonöfon: labon nemis no lonöfikis, a. s. tumödikis',
	'cite_error_ref_no_input'                  => 'El <code>&lt;ref&gt;</code> no lonöfon: els ref nen nem mutons labön ninädi',
	'cite_error_references_invalid_input'      => 'El <code>&lt;references&gt;</code> no lonöfon; gebolös eli <code>&lt;references /&gt;</code>',
	'cite_error_references_invalid_parameters' => 'El <code>&lt;references&gt;</code> no lonöfon: paramets no padälons. Gebolös eli <code>&lt;references /&gt;</code>',
	'cite_error_references_no_text'            => 'El <code>&lt;ref&gt;</code> no lonöfon: vödem nonik pegivon eles refs labü nem: <code>$1</code>',
);

/** Kantonese (粵語) */
$messages['yue'] = array(
	'cite_croak'                               => '引用阻塞咗; $1: $2',
	'cite_error_key_str_invalid'               => '內部錯誤; 無效嘅 $str',
	'cite_error_stack_invalid_input'           => '內部錯誤; 無效嘅堆疊匙',
	'cite_error'                               => '引用錯誤 $1',
	'cite_error_ref_numeric_key'               => '無效嘅呼叫; 需要一個非整數嘅匙',
	'cite_error_ref_no_key'                    => '無效嘅呼叫; 未指定匙',
	'cite_error_ref_too_many_keys'             => '無效嘅呼叫; 無效嘅匙, 例如: 太多或者指定咗一個錯咗嘅匙',
	'cite_error_ref_no_input'                  => '無效嘅呼叫; 未指定輸入',
	'cite_error_references_invalid_input'      => '無效嘅輸入; 唔需要有嘢',
	'cite_error_references_invalid_parameters' => '無效嘅參數; 唔需要有嘢',
	'cite_error_references_no_backlink_label'  => "用晒啲自定返回標籤, 響 \"''cite_references_link_many_format_backlink_labels''\" 信息再整多啲",
);

/** Simplified Chinese (‪中文(简体)‬) */
$messages['zh-hans'] = array(
	'cite_croak'                               => '引用阻塞; $1: $2',
	'cite_error_key_str_invalid'               => '内部错误；非法的 $str',
	'cite_error_stack_invalid_input'           => '内部错误；非法堆栈键值',
	'cite_error'                               => '引用错误 $1',
	'cite_error_ref_numeric_key'               => '无效呼叫；需要一个非整数的键值',
	'cite_error_ref_no_key'                    => '无效呼叫；没有指定键值',
	'cite_error_ref_too_many_keys'             => '无效呼叫；非法键值，例如：过多或错误的指定键值',
	'cite_error_ref_no_input'                  => '无效呼叫；没有指定的输入',
	'cite_error_references_invalid_input'      => '无效输入；需求为空',
	'cite_error_references_invalid_parameters' => '非法参数；需求为空',
	'cite_error_references_no_backlink_label'  => "自定义后退标签已经用完了，现在可在标签 \"''cite_references_link_many_format_backlink_labels''\" 定义更多信息",
);

/** ‪Traditional Chinese (‪中文(繁體)‬) */
$messages['zh-hant'] = array(
	'cite_croak'                               => '引用阻塞; $1: $2',
	'cite_error_key_str_invalid'               => '內部錯誤；非法的 $str',
	'cite_error_stack_invalid_input'           => '內部錯誤；非法堆疊鍵值',
	'cite_error'                               => '引用錯誤 $1',
	'cite_error_ref_numeric_key'               => '無效呼叫；需要一個非整數的鍵',
	'cite_error_ref_no_key'                    => '無效呼叫；沒有指定鍵',
	'cite_error_ref_too_many_keys'             => '無效呼叫；非法鍵值，例如：過多或錯誤的指定鍵',
	'cite_error_ref_no_input'                  => '無效呼叫；沒有指定的輸入',
	'cite_error_references_invalid_input'      => '無效輸入；需求為空',
	'cite_error_references_invalid_parameters' => '非法參數；需求為空',
	'cite_error_references_no_backlink_label'  => "自訂後退標籤已經用完了，現在可在標籤 \"''cite_references_link_many_format_backlink_labels''\" 定義更多信息",
);

