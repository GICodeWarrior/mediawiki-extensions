<?php
/**
 * Internationalisation for RecordAdmin extension
 *
 * @author Bertrand GRONDIN
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Nad
 * @author Bertrand GRONDIN
 */
$messages['en'] = array(
	'recordadmin' => 'Record administration',
	'recordadmin-desc' => 'Search, queries, forms and reporting of wiki data derived from template parameters',
	'recordadmin-specialdesc' => 'A [[Special:RecordAdmin|special page]] for finding and creating pages using associated forms',
	'recordadmin-noforms' => 'There are currently no forms defined to use for searching and creating',
	'recordadmin-select' => 'Select the type of record to manage',
	'recordadmin-createtype' => 'Enter the name of a new record type to create',
	'recordadmin-recordtype' => 'record type',
	'recordadmin-newsearch' => 'New $1 search',
	'recordadmin-newrecord' => 'Select another record type',
	'recordadmin-submit' => 'Submit',
	'recordadmin-create' => 'Find or create "$1" records',
	'recordadmin-alreadyexist' => 'Sorry, "$1" already exists!',
	'recordadmin-createsuccess' => '$1 created',
	'recordadmin-createerror' => 'An error occurred while attempting to create the $1!',
	'recordadmin-badtitle' => 'Bad title!',
	'recordadmin-recordid' => 'Record ID/name:',
	'recordadmin-invert' => 'Invert selection',
	'recordadmin-buttonsearch' => 'Search',
	'recordadmin-buttoncreate' => 'Create',
	'recordadmin-buttonreset' => 'Reset',
	'recordadmin-searchresult' => 'Search results',
	'recordadmin-nomatch' => 'No matching records found!',
	'recordadmin-typeupdated' => '$1 properties updated',
	'recordadmin-buttonsave' => 'Save',
	'recordadmin-noform' => 'There is no form associated with "$1" records!',
	'recordadmin-createlink' => 'create one',
	'recordadmin-newcreated' => 'New $1 created from public form',
	'recordadmin-summary-typecreated' => 'New $1 created',
	'recordadmin-viewlink' => 'view',
	'recordadmin-editlink' => 'edit',
	'recordadmin-title' => '$1',
	'recordadmin-created' => 'Created',
	'recordadmin-modified' => 'Modified',
	'recordadmin-actions' => 'Edit',
	'recordadmin-select' => 'Select',
	'recordadmin-needscontent' => 'Add content...',
	'right-recordadmin' => 'Find and edit record pages',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'No "$1"',
	'recordadmin-edit-info' => 'This page contains templates which have their own forms which you can fill in from this tab-set',
	'recordadmin-properties' => 'Properties',
);

/** Message documentation (Message documentation)
 * @author CERminator
 * @author EugeneZelenko
 * @author Purodha
 * @author Raymond
 * @author Siebrand
 * @author The Evil IP address
 * @author Umherirrender
 */
$messages['qqq'] = array(
	'recordadmin-desc' => '{{desc}}',
	'recordadmin-submit' => '{{Identical|Submit}}',
	'recordadmin-invert' => '{{Identical|Invert selection}}',
	'recordadmin-buttonsearch' => '{{Identical|Search}}',
	'recordadmin-buttoncreate' => '{{Identical|Create}}',
	'recordadmin-buttonreset' => '{{Identical|Reset}}',
	'recordadmin-buttonsave' => '{{Identical|Save}}',
	'recordadmin-editlink' => '{{Identical|Edit}}',
	'recordadmin-actions' => '{{Identical|Action}}',
	'right-recordadmin' => '{{doc-right|recordadmin}}',
	'recordadmin-export-csv' => '{{Optional}}',
	'recordadmin-export-pdf' => '{{Optional}}',
	'recordadmin-notset' => 'Parameters:
* $1 is string of one or more comma separated field names.',
	'recordadmin-properties' => '{{Identical|Property}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'recordadmin-submit' => 'Dien in',
	'recordadmin-invert' => 'Omgekeerde seleksie',
	'recordadmin-buttonsearch' => 'Soek',
	'recordadmin-buttoncreate' => 'Skep',
	'recordadmin-buttonreset' => 'Herstel',
	'recordadmin-buttonsave' => 'Stoor',
	'recordadmin-editlink' => 'wysig',
	'recordadmin-actions' => 'Aksies',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'recordadmin-submit' => 'Ninviar',
	'recordadmin-buttoncreate' => 'Creyar',
	'recordadmin-buttonsave' => 'Alzar',
	'recordadmin-actions' => 'Accions',
);

/** Arabic (العربية)
 * @author Meno25
 * @author Ouda
 */
$messages['ar'] = array(
	'recordadmin' => 'إدارة السجل',
	'recordadmin-desc' => '[[Special:RecordAdmin|صفحة خاصة]] لإيجاد وتعديل صفحات السجلات باستخدام استمارة',
	'recordadmin-select' => 'اختر نوع السجل للتحكم به',
	'recordadmin-createtype' => 'أدخل اسم نوع سجل جديد للإنشاء',
	'recordadmin-recordtype' => 'نوع التسجيل',
	'recordadmin-newsearch' => 'بحث $1 جديد',
	'recordadmin-newrecord' => 'أختار نوع سجل أخر',
	'recordadmin-submit' => 'نفذ',
	'recordadmin-create' => 'ابحث عن أو أنشئ سجلات "$1"',
	'recordadmin-alreadyexist' => '! للأسف، "$1" موجود فعلا',
	'recordadmin-createsuccess' => '$1 أنشئت',
	'recordadmin-createerror' => 'حدث خطأ أثناء محاولة إنشاء $1!',
	'recordadmin-badtitle' => '! عنوان سئ',
	'recordadmin-recordid' => 'رقم السجل/الاسم:',
	'recordadmin-invert' => 'أعكس الأختيار',
	'recordadmin-buttonsearch' => 'بحث',
	'recordadmin-buttoncreate' => 'أنشئ',
	'recordadmin-buttonreset' => 'إعادة ضبط',
	'recordadmin-searchresult' => 'نتائج البحث',
	'recordadmin-nomatch' => 'لا سجلات مطابقة تم العثور عليها!',
	'recordadmin-typeupdated' => '$1 تم تحديث خصائص',
	'recordadmin-buttonsave' => 'حفظ',
	'recordadmin-noform' => 'لا توجد استمارة ملحقة بسجلات "$1"!',
	'recordadmin-createlink' => 'إنشاء واحدة',
	'recordadmin-newcreated' => '$1 جديد تم إنشاؤه من الاستمارة العامة',
	'recordadmin-summary-typecreated' => '$1 جديد تم إنشاؤه',
	'recordadmin-viewlink' => 'عرض',
	'recordadmin-editlink' => 'عدل',
	'recordadmin-created' => 'أنشئت',
	'recordadmin-modified' => 'معدل',
	'recordadmin-actions' => 'أفعال',
	'recordadmin-needscontent' => 'أضف المحتوى...',
	'right-recordadmin' => 'أبحث و عدل صفحات السجل',
	'recordadmin-export-csv' => 'سي في إس',
	'recordadmin-export-pdf' => 'بي دي إف',
);

/** Aramaic (ܐܪܡܝܐ)
 * @author Basharh
 */
$messages['arc'] = array(
	'recordadmin-invert' => 'ܐܗܦܟ ܠܓܘܒܝܐ',
	'recordadmin-buttonsearch' => 'ܒܨܝ',
	'recordadmin-buttoncreate' => 'ܒܪܝ',
	'recordadmin-buttonsave' => 'ܠܒܘܟ',
	'recordadmin-viewlink' => 'ܚܙܝ',
	'recordadmin-editlink' => 'ܫܚܠܦ',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Ghaly
 * @author Meno25
 * @author Ouda
 * @author Ramsis II
 */
$messages['arz'] = array(
	'recordadmin' => 'إدارة السجل',
	'recordadmin-desc' => '[[Special:RecordAdmin|صفحة خاصة]] لإيجاد وتعديل صفحات السجلات باستخدام استمارة',
	'recordadmin-select' => 'اختار نوع السجل',
	'recordadmin-recordtype' => 'نوع التسجيل',
	'recordadmin-newsearch' => 'بحث $1 جديد',
	'recordadmin-newrecord' => 'أختار نوع سجل تانى',
	'recordadmin-submit' => 'نفذ',
	'recordadmin-create' => ' دور على أو أنشئ سجل "$1"',
	'recordadmin-alreadyexist' => 'متأسفين، "$1"  موجوده بالفعل',
	'recordadmin-createsuccess' => '$1 أنشئت',
	'recordadmin-createerror' => 'حدث خطأ أثناء محاولة إنشاء $1!',
	'recordadmin-badtitle' => '! عنوان سئ',
	'recordadmin-recordid' => 'رقم السجل/الاسم:',
	'recordadmin-invert' => 'أعكس الأختيار',
	'recordadmin-buttonsearch' => 'بحث',
	'recordadmin-buttoncreate' => 'أنشئ',
	'recordadmin-buttonreset' => 'إعادة الظبط',
	'recordadmin-searchresult' => 'نتائج البحث',
	'recordadmin-nomatch' => 'لا يوجد سجلات متطابقة',
	'recordadmin-typeupdated' => '$1 تم تحديث خصائص',
	'recordadmin-buttonsave' => 'حفظ',
	'recordadmin-noform' => 'لا توجد استمارة ملحقة بسجلات "$1"!',
	'recordadmin-createlink' => 'إنشاء واحدة',
	'recordadmin-newcreated' => '$1 جديد تم إنشاؤه من الاستمارة العامة',
	'recordadmin-summary-typecreated' => '$1 جديد تم إنشاؤه',
	'recordadmin-viewlink' => 'عرض',
	'recordadmin-editlink' => 'عدل',
	'recordadmin-created' => 'أنشئت',
	'recordadmin-modified' => 'متعدل',
	'recordadmin-actions' => 'أفعال',
	'recordadmin-needscontent' => 'ضيف المحتوى',
	'right-recordadmin' => 'أبحث و عدل صفحات السجل',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 */
$messages['be-tarask'] = array(
	'recordadmin' => 'Кіраваньне запісамі',
	'recordadmin-desc' => 'Пошук, запыты, формы і справаздачы па вікі-зьвестках, атрыманым з парамэтраў шаблёну',
	'recordadmin-specialdesc' => '[[Special:RecordAdmin|Спэцыяльная старонка]], якая ўжываецца для пошуку і стварэньня старонак з дапамогай асацыяваных формаў',
	'recordadmin-noforms' => 'Цяпер няма вызначаных формаў для пошуку і стварэньня',
	'recordadmin-select' => 'Выберыце тып запісаў для кіраваньня',
	'recordadmin-createtype' => 'Для стварэньня новага тыпу запісаў увядзіце яго назву',
	'recordadmin-recordtype' => 'тып запісаў',
	'recordadmin-newsearch' => 'Новы пошук $1',
	'recordadmin-newrecord' => 'Выберыце іншы тып запісаў',
	'recordadmin-submit' => 'Адправіць',
	'recordadmin-create' => 'Знайсьці альбо стварыць запісы «$1»',
	'recordadmin-alreadyexist' => 'Прабачце, «$1» ужо існуе!',
	'recordadmin-createsuccess' => '$1 створаны',
	'recordadmin-createerror' => 'Адбылася памылка пад час спробы стварэньня $1!',
	'recordadmin-badtitle' => 'Няслушная назва!',
	'recordadmin-recordid' => 'Ідэнтыфікатар/назва запісу:',
	'recordadmin-invert' => 'Адваротны выбар',
	'recordadmin-buttonsearch' => 'Шукаць',
	'recordadmin-buttoncreate' => 'Стварыць',
	'recordadmin-buttonreset' => 'Скінуць',
	'recordadmin-searchresult' => 'Вынікі пошуку',
	'recordadmin-nomatch' => 'Адпаведных запісаў ня знойдзена!',
	'recordadmin-typeupdated' => 'Уласьцівасьці $1 абноўлены',
	'recordadmin-buttonsave' => 'Захаваць',
	'recordadmin-noform' => 'Не існуе формы зьвязанай з запісамі «$1»!',
	'recordadmin-createlink' => 'стварыць',
	'recordadmin-newcreated' => 'Новы $1 створаны з публічнай формы',
	'recordadmin-summary-typecreated' => 'Новы $1 створаны',
	'recordadmin-viewlink' => 'паказаць',
	'recordadmin-editlink' => 'рэдагаваць',
	'recordadmin-created' => 'Створаны',
	'recordadmin-modified' => 'Абноўлены',
	'recordadmin-actions' => 'Дзеяньні',
	'recordadmin-needscontent' => 'Дадаць зьмест...',
	'right-recordadmin' => 'пошук і рэдагаваньне старонак запісаў',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Няма $1',
	'recordadmin-edit-info' => 'Гэтая старонка ўтрымлівае шаблёны, якія маюць уласныя формы, якія Вы можаце запоўніць з гэтага набору',
	'recordadmin-properties' => 'Уласьцівасьці',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'recordadmin-submit' => 'Изпращане',
	'recordadmin-invert' => 'Обръщане на избора',
	'recordadmin-buttonsearch' => 'Търсене',
	'recordadmin-buttoncreate' => 'Създаване',
	'recordadmin-searchresult' => 'Резултати от търсенето',
	'recordadmin-buttonsave' => 'Съхраняване',
	'recordadmin-viewlink' => 'преглеждане',
	'recordadmin-editlink' => 'редактиране',
	'recordadmin-actions' => 'Действия',
);

/** Bengali (বাংলা)
 * @author Bellayet
 */
$messages['bn'] = array(
	'recordadmin-select' => 'নির্বাচন',
	'recordadmin-submit' => 'জমা দিন',
	'recordadmin-badtitle' => 'মন্দ শিরোনাম!',
);

/** Breton (Brezhoneg)
 * @author Fohanno
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'recordadmin' => 'Mererezh an enrolladennoù',
	'recordadmin-desc' => 'Ur [[Special:RecordAdmin|bajenn dibar]] da gavout ha da gemmañ pajennoù enrollet en ur ober gant ur furmskrid',
	'recordadmin-select' => 'Diuzañ',
	'recordadmin-createtype' => 'Ebarzhiñ anv ur seurt enrolladennoù nevez evit e grouiñ',
	'recordadmin-recordtype' => 'seurt enrolladenn',
	'recordadmin-newsearch' => 'Enklask nevez $1',
	'recordadmin-newrecord' => 'Diuzañ ur seurt enrolladennoù all',
	'recordadmin-submit' => 'Kas',
	'recordadmin-create' => 'Klask pe krouiñ "$1" enrolladenn',
	'recordadmin-alreadyexist' => 'Digarez, « $1 » zo anezhañ dija !',
	'recordadmin-createsuccess' => '$1 zo bet krouet',
	'recordadmin-createerror' => "C'hoarvezet ez eus ur fazi pa oad o klask krouiñ an $1 !",
	'recordadmin-badtitle' => 'Titl fall !',
	'recordadmin-recordid' => 'ID/Anv an enrolladenn :',
	'recordadmin-invert' => 'Eilpennañ an diuzadenn',
	'recordadmin-buttonsearch' => 'Klask',
	'recordadmin-buttoncreate' => 'Krouiñ',
	'recordadmin-buttonreset' => 'Adderaouekaat',
	'recordadmin-searchresult' => "Disoc'hoù klask",
	'recordadmin-nomatch' => "N'eo bet kavet enrolladenn klotaus ebet !",
	'recordadmin-typeupdated' => 'hizivaet eo perzhioù $1',
	'recordadmin-buttonsave' => 'Enrollañ',
	'recordadmin-noform' => 'N\'eus furmskrid ebet stag ouzh an enrolladennoù "$1" !',
	'recordadmin-createlink' => 'krouiñ unan',
	'recordadmin-newcreated' => '$1 nevez krouet adalek ur furmskrid foran',
	'recordadmin-summary-typecreated' => 'Krouet ez eus bet un $1 nevez',
	'recordadmin-viewlink' => 'gwelet',
	'recordadmin-editlink' => 'aozañ',
	'recordadmin-created' => 'Krouet',
	'recordadmin-modified' => 'Kemmet',
	'recordadmin-actions' => 'Oberoù',
	'recordadmin-needscontent' => 'Ouzhpennañ an danvez...',
	'right-recordadmin' => 'Kavout hag aozañ ar pajennoù enrollañ',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => '"$1" ebet',
	'recordadmin-properties' => 'Perzhioù',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'recordadmin' => 'Zapis administracije',
	'recordadmin-desc' => 'Pretraga, upiti, obrasci i izvještaji o wiki podacima izvedenim iz parametara šablona',
	'recordadmin-specialdesc' => '[[Special:RecordAdmin|Posebna stranica]] za traženje i pravljenje stranica koristeći pridružene obrasce',
	'recordadmin-noforms' => 'Trenutno nema definisanih obrazaca za korištenje za traženje i pravljenje',
	'recordadmin-select' => 'Odaberite tip zapisa za upravljanje',
	'recordadmin-createtype' => 'Unesite ime novog tipa zapisa da ga napravite',
	'recordadmin-recordtype' => 'tip zapisa',
	'recordadmin-newsearch' => '{{PLURAL:$1|Nova $1 pretraga|Nove $1 pretrage|Novih $1 pretraga}}',
	'recordadmin-newrecord' => 'Odaberi drugi tip zapisa',
	'recordadmin-submit' => 'Pošalji',
	'recordadmin-create' => 'Nađi ili napravi "$1" zapise',
	'recordadmin-alreadyexist' => 'Žao nam je, "$1" već postoji!',
	'recordadmin-createsuccess' => '$1 napravljen',
	'recordadmin-createerror' => 'Desila se greška pri pokušaju pravljenja $1!',
	'recordadmin-badtitle' => 'Nevaljan naslov!',
	'recordadmin-recordid' => 'ID zapisa/naziv:',
	'recordadmin-invert' => 'Obrnuti odabir',
	'recordadmin-buttonsearch' => 'Traži',
	'recordadmin-buttoncreate' => 'Napravi',
	'recordadmin-buttonreset' => 'Poništi',
	'recordadmin-searchresult' => 'Rezultati pretrage',
	'recordadmin-nomatch' => 'Nije pronađen odgovarajući zapis!',
	'recordadmin-typeupdated' => '$1 svojstvo ažurirano',
	'recordadmin-buttonsave' => 'Sačuvaj',
	'recordadmin-noform' => 'Ne postoji obrazac koji je pripojen "$1" zapisima!',
	'recordadmin-createlink' => 'napravi jedan',
	'recordadmin-newcreated' => 'Nova $1 je napravljena iz javnog obrasca',
	'recordadmin-summary-typecreated' => 'Novi $1 napravljen',
	'recordadmin-viewlink' => 'pogledaj',
	'recordadmin-editlink' => 'uredi',
	'recordadmin-created' => 'Napravljeno',
	'recordadmin-modified' => 'Izmijenjeno',
	'recordadmin-actions' => 'Akcije',
	'recordadmin-needscontent' => 'Dodaj sadržaj...',
	'right-recordadmin' => 'Traženje i uređivanje stranica zapisa',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Bez "$1"',
	'recordadmin-edit-info' => 'Ova stranica sadrži šablone sa vlastitim obrascima koje možete popuniti iz ovog seta jezičaka',
	'recordadmin-properties' => 'Svojstva',
);

/** Catalan (Català)
 * @author Ssola
 */
$messages['ca'] = array(
	'recordadmin-editlink' => 'modifica',
);

/** Sorani (کوردی) */
$messages['ckb'] = array(
	'recordadmin-submit' => 'ناردن',
	'recordadmin-buttonsearch' => 'گەڕان',
	'recordadmin-buttonsave' => 'پاشەکەوت',
);

/** Czech (Česky) */
$messages['cs'] = array(
	'recordadmin-select' => 'Vybrat',
	'recordadmin-badtitle' => 'Neplatný název!',
	'recordadmin-buttonsave' => 'Uložit',
	'recordadmin-viewlink' => 'prohlédnout',
	'recordadmin-editlink' => 'editovat',
	'recordadmin-created' => 'Vytvořeno',
	'recordadmin-modified' => 'Upraveno',
	'recordadmin-actions' => 'Akce',
);

/** German (Deutsch)
 * @author Imre
 * @author Kghbln
 * @author Melancholie
 * @author Purodha
 * @author Revolus
 * @author Sebastian Wallroth
 * @author The Evil IP address
 * @author Umherirrender
 */
$messages['de'] = array(
	'recordadmin' => 'Aufzeichnungsadministrierung',
	'recordadmin-desc' => 'Ermöglicht Suchen, Abfragen, Formulare und Berichte zu Daten aus in Vorlagen eingebetteten Parametern',
	'recordadmin-specialdesc' => 'Stellt eine [[Special:RecordAdmin|Spezialseite]] bereit mit der Seiten mit Hilfe zugehöriger Formulare ermittelt und erstellt werden können',
	'recordadmin-noforms' => 'Momentan gibt es keine Formulare mit denen Seiten ermittelt und erstellt werden können',
	'recordadmin-select' => 'Auswählen',
	'recordadmin-createtype' => 'Gib den Namen des zu erstellenden Aufzeichnungstyps an',
	'recordadmin-recordtype' => 'Aufzeichnungstyp',
	'recordadmin-newsearch' => 'Neue $1-Suche',
	'recordadmin-newrecord' => 'Wähle einen anderen Aufzeichnungstypen',
	'recordadmin-submit' => 'Übermitteln',
	'recordadmin-create' => 'Finde oder erstelle „$1“-Aufzeichnungen',
	'recordadmin-alreadyexist' => 'Entschuldige, „$1“ existiert bereits!',
	'recordadmin-createsuccess' => '$1 erstellt',
	'recordadmin-createerror' => 'Während des Erstellens von $1 trat ein Fehler auf!',
	'recordadmin-badtitle' => 'Ungültiger Titel!',
	'recordadmin-recordid' => 'Aufzeichnungskennung/-name:',
	'recordadmin-invert' => 'Auswahl umkehren',
	'recordadmin-buttonsearch' => 'Suche',
	'recordadmin-buttoncreate' => 'Erstelle',
	'recordadmin-buttonreset' => 'Zurücksetzen',
	'recordadmin-searchresult' => 'Suchergebnisse',
	'recordadmin-nomatch' => 'Keine passenden Aufzeichnungen gefunden!',
	'recordadmin-typeupdated' => '$1 Werte aktualisiert',
	'recordadmin-buttonsave' => 'Speichern',
	'recordadmin-noform' => 'Es gibt kein Formular für „$1“-Aufzeichnungen!',
	'recordadmin-createlink' => 'erstelle eins',
	'recordadmin-newcreated' => 'Neues $1 auf einem öffentlichen Formular erstellt',
	'recordadmin-summary-typecreated' => 'Neues $1 erstellt',
	'recordadmin-viewlink' => 'ansehen',
	'recordadmin-editlink' => 'bearbeiten',
	'recordadmin-created' => 'Erstellt',
	'recordadmin-modified' => 'Modifiziert',
	'recordadmin-actions' => 'Aktionen',
	'recordadmin-needscontent' => 'Inhalt hinzufügen …',
	'right-recordadmin' => 'Aufzeichnungsseiten finden und bearbeiten',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Keine „$1“',
	'recordadmin-edit-info' => 'Diese Seite enthält Vorlagen, die über eigene Formulare verfügen und über diese Registerkarte ausgefüllt werden können.',
	'recordadmin-properties' => 'Attribute',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author Imre
 * @author Revolus
 * @author Umherirrender
 */
$messages['de-formal'] = array(
	'recordadmin-select' => 'Wählen Sie den zu verwaltenden Aufzeichnungstyp',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'recordadmin' => 'Administracija zapisow',
	'recordadmin-desc' => '[[Special:RecordAdmin|Specialny bok]] za pytanje a wobźěłowanje zapisowych bokow z pomocu formulara',
	'recordadmin-select' => 'Wubjeŕ typ registracije, kótaryž ma se zastojaś',
	'recordadmin-createtype' => 'Zapódaj mě nowego typa registracije, kótaryž ma se napóraś',
	'recordadmin-recordtype' => 'typ registracije',
	'recordadmin-newsearch' => 'Nowe pytanje $1',
	'recordadmin-newrecord' => 'Wubjeŕ drugi zapisowy typ',
	'recordadmin-submit' => 'Wótpósłaś',
	'recordadmin-create' => 'Zapise "$1" namakaś abo napóraś',
	'recordadmin-alreadyexist' => 'Wódaj, "$1" južo eksistěrujo!',
	'recordadmin-createsuccess' => '$1 napórany',
	'recordadmin-createerror' => 'Pśi wopyśe $1 napóraś jo zmólka nastała!',
	'recordadmin-badtitle' => 'Njepłaśiwy titel!',
	'recordadmin-recordid' => 'ID registrěrowanja/mě:',
	'recordadmin-invert' => 'Wuběrk pśewobrośiś',
	'recordadmin-buttonsearch' => 'Pytaś',
	'recordadmin-buttoncreate' => 'Napóraś',
	'recordadmin-buttonreset' => 'Anulěrowaś',
	'recordadmin-searchresult' => 'Pytańske wuslědki',
	'recordadmin-nomatch' => 'Žedne wótpowědne zapise namakane!',
	'recordadmin-typeupdated' => 'Kakosći $1 zaktualizěrowane',
	'recordadmin-buttonsave' => 'Składowaś',
	'recordadmin-noform' => 'Njejo formular za zapisy "$1"!',
	'recordadmin-createlink' => 'jaden napóraś',
	'recordadmin-newcreated' => 'Nowy $1 ze zjawnego formulara napórany',
	'recordadmin-summary-typecreated' => 'Nowy $1 napórany',
	'recordadmin-viewlink' => 'woglědaś se',
	'recordadmin-editlink' => 'wobźěłaś',
	'recordadmin-created' => 'Napórany',
	'recordadmin-modified' => 'Změnjony',
	'recordadmin-actions' => 'Akcije',
	'recordadmin-needscontent' => 'Wopśimjeśe pśidaś...',
	'right-recordadmin' => 'Zapisowe boki namakaś a wobźěłaś',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Žeden "$1"',
);

/** Ewe (Eʋegbe) */
$messages['ee'] = array(
	'recordadmin-buttonsearch' => 'Dii',
	'recordadmin-buttoncreate' => 'Dze egɔme',
	'recordadmin-editlink' => 'trɔ asi le eŋu',
);

/** Greek (Ελληνικά)
 * @author Crazymadlover
 * @author ZaDiak
 */
$messages['el'] = array(
	'recordadmin' => 'Καταγραφή διαχείρισης',
	'recordadmin-select' => 'Επιλογή',
	'recordadmin-recordtype' => 'τύπος καταγραφής',
	'recordadmin-newsearch' => 'Νέα $1 αναζήτηση',
	'recordadmin-newrecord' => 'Επιλογή ενός άλλου τύπου καταγραφής',
	'recordadmin-submit' => 'Υποβολή',
	'recordadmin-alreadyexist' => 'Συγνώμη, το "$1" υπάρχει ήδη!',
	'recordadmin-createsuccess' => 'Το $1 δημιουργήθηκε',
	'recordadmin-badtitle' => 'Άσχημος τίτλος!',
	'recordadmin-recordid' => 'Καταγραφή ταυτότητας/ονόματος:',
	'recordadmin-invert' => 'Ανατροπή επιλογής',
	'recordadmin-buttonsearch' => 'Αναζήτηση',
	'recordadmin-buttoncreate' => 'Δημιουργία',
	'recordadmin-buttonreset' => 'Επαναφορά',
	'recordadmin-searchresult' => 'Αποτελέσματα αναζήτησης',
	'recordadmin-nomatch' => 'Δεν βρέθηκαν αντίστοιχα αποτελέσματα!',
	'recordadmin-typeupdated' => 'Οι $1 ιδιότητες ενημερώθηκαν',
	'recordadmin-buttonsave' => 'Αποθήκευση',
	'recordadmin-createlink' => 'δημιουργία ενός',
	'recordadmin-summary-typecreated' => 'Νέα $1 δημιουργήθηκε',
	'recordadmin-viewlink' => 'προβολή',
	'recordadmin-editlink' => 'επεξεργασία',
	'recordadmin-created' => 'Δημιουργήθηκε',
	'recordadmin-modified' => 'Μετατράπηκε',
	'recordadmin-actions' => 'Ενέργειες',
	'recordadmin-needscontent' => 'Προσθήκη περιεχομένου...',
);

/** Esperanto (Esperanto)
 * @author Airon90
 * @author Michawiki
 * @author Yekrats
 */
$messages['eo'] = array(
	'recordadmin-select' => 'Elekti',
	'recordadmin-newsearch' => 'Nova $1 serĉo',
	'recordadmin-submit' => 'Ek!',
	'recordadmin-create' => 'Trovi aŭ krei rikordojn "$1"',
	'recordadmin-alreadyexist' => 'Bedaŭrinde, "$1" jam ekzistas!',
	'recordadmin-createsuccess' => '$1 kreita',
	'recordadmin-badtitle' => 'Fuŝa titolo',
	'recordadmin-invert' => 'Inversigi selekton',
	'recordadmin-buttonsearch' => 'Serĉi',
	'recordadmin-buttoncreate' => 'Krei',
	'recordadmin-searchresult' => 'Rezultoj de serĉo',
	'recordadmin-buttonsave' => 'Konservi',
	'recordadmin-createlink' => 'krei unu',
	'recordadmin-summary-typecreated' => 'Nova $1 kreita',
	'recordadmin-viewlink' => 'vidi',
	'recordadmin-editlink' => 'redakti',
	'recordadmin-created' => 'Kreita',
	'recordadmin-modified' => 'Modifita',
	'recordadmin-actions' => 'Agoj',
	'recordadmin-needscontent' => 'Aldoni enhavon...',
);

/** Spanish (Español)
 * @author Antur
 * @author Crazymadlover
 * @author Imre
 * @author Peter17
 * @author Translationista
 */
$messages['es'] = array(
	'recordadmin' => 'Administración de registros',
	'recordadmin-desc' => 'Una [[Special:RecordAdmin|página especial]] para encontrar y editar páginas de registros usando un formulario',
	'recordadmin-select' => 'Seleccionar el tipo de registro a gestionar',
	'recordadmin-createtype' => 'Ingrese el nombre de un nuevo tipo de registro para crear',
	'recordadmin-recordtype' => 'tipo de registro',
	'recordadmin-newsearch' => 'Nueva búsqueda $1',
	'recordadmin-newrecord' => 'Seleccionar otro tipo de registro',
	'recordadmin-submit' => 'Enviar',
	'recordadmin-create' => 'Encontrar o crear "$1" registros',
	'recordadmin-alreadyexist' => 'Perdón, "$1" ya existe!',
	'recordadmin-createsuccess' => '$1 creado',
	'recordadmin-createerror' => 'Un error ocurrió cuando se intentaba crear el $1!',
	'recordadmin-badtitle' => 'Mal título!',
	'recordadmin-recordid' => 'ID de registro/nombre:',
	'recordadmin-invert' => 'Invertir selección',
	'recordadmin-buttonsearch' => 'Buscar',
	'recordadmin-buttoncreate' => 'Crear',
	'recordadmin-buttonreset' => 'Reestablecer',
	'recordadmin-searchresult' => 'Resultados de la búsqueda',
	'recordadmin-nomatch' => 'No se encontraron registros coincidentes!',
	'recordadmin-typeupdated' => '$1 propiedades actualizadas',
	'recordadmin-buttonsave' => 'Guardar',
	'recordadmin-noform' => '¡No hay ningún formulario asociado a los registros "$1"!',
	'recordadmin-createlink' => 'crear uno',
	'recordadmin-newcreated' => 'Nuevo $1 creado desde un formulario público',
	'recordadmin-summary-typecreated' => 'Nuevo $1 creado',
	'recordadmin-viewlink' => 'ver',
	'recordadmin-editlink' => 'editar',
	'recordadmin-created' => 'Creado',
	'recordadmin-modified' => 'Modificado',
	'recordadmin-actions' => 'Acciones',
	'recordadmin-needscontent' => 'Agregar contenido...',
	'right-recordadmin' => 'Encontrar y editar páginas de registro',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'No existe ningún "$1"',
);

/** Estonian (Eesti)
 * @author Avjoska
 */
$messages['et'] = array(
	'recordadmin-newsearch' => 'Uus $1 otsing',
	'recordadmin-badtitle' => 'Vale pealkiri!',
	'recordadmin-buttonsearch' => 'Otsing',
	'recordadmin-buttoncreate' => 'Loo',
	'recordadmin-searchresult' => 'Otsingu tulemused',
	'recordadmin-nomatch' => 'Sobivaid tulemusi ei leitud!',
	'recordadmin-buttonsave' => 'Salvesta',
	'recordadmin-viewlink' => 'vaata',
	'recordadmin-editlink' => 'toimeta',
);

/** Basque (Euskara)
 * @author An13sa
 * @author Kobazulo
 */
$messages['eu'] = array(
	'recordadmin-select' => 'Hautatu',
	'recordadmin-submit' => 'Bidali',
	'recordadmin-badtitle' => 'Izenburu okerra!',
	'recordadmin-buttonsearch' => 'Bilatu',
	'recordadmin-buttoncreate' => 'Sortu',
	'recordadmin-buttonreset' => 'Berrezarri',
	'recordadmin-buttonsave' => 'Gorde',
	'recordadmin-viewlink' => 'ikusi',
	'recordadmin-editlink' => 'aldatu',
);

/** Finnish (Suomi)
 * @author Cimon Avaro
 * @author Crt
 * @author Silvonen
 * @author Str4nd
 */
$messages['fi'] = array(
	'recordadmin-select' => 'Valitse',
	'recordadmin-newsearch' => 'Uusi haku $1',
	'recordadmin-submit' => 'Lähetä',
	'recordadmin-alreadyexist' => '”$1” on jo olemassa.',
	'recordadmin-createsuccess' => '$1 luotiin',
	'recordadmin-createerror' => 'Tapahtui virhe, kun yritettiin luoda $1.',
	'recordadmin-badtitle' => 'Virheellinen otsikko.',
	'recordadmin-invert' => 'Käänteinen valinta',
	'recordadmin-buttonsearch' => 'Etsi',
	'recordadmin-buttoncreate' => 'Luo',
	'recordadmin-buttonreset' => 'Tyhjennä',
	'recordadmin-searchresult' => 'Hakutulokset',
	'recordadmin-buttonsave' => 'Tallenna',
	'recordadmin-createlink' => 'luo sellainen',
	'recordadmin-summary-typecreated' => 'Luotiin uusi $1',
	'recordadmin-viewlink' => 'näytä',
	'recordadmin-editlink' => 'muokkaa',
	'recordadmin-created' => 'Luotu',
	'recordadmin-modified' => 'Muutettu',
	'recordadmin-actions' => 'Toiminnot',
	'recordadmin-needscontent' => 'Lisää sisältöä...',
);

/** French (Français)
 * @author Crochet.david
 * @author Grondin
 * @author IAlex
 * @author Peter17
 * @author PieRRoMaN
 * @author Verdy p
 */
$messages['fr'] = array(
	'recordadmin' => 'Gestion des enregistrements',
	'recordadmin-desc' => 'Recherche, requêtes, formulaires et rapport de données du wiki dérivés de paramètres de modèle',
	'recordadmin-specialdesc' => 'Une [[Special:RecordAdmin|page spéciale]] pour trouver et créer des pages en utilisant des formulaires associés.',
	'recordadmin-noforms' => 'Il n’y a actuellement aucun formulaire défini à utiliser pour la recherche et la création',
	'recordadmin-select' => 'Sélectionner le type d’enregistrement à gérer',
	'recordadmin-createtype' => 'Entrez le nom d’un type d’enregistrement pour le créer',
	'recordadmin-recordtype' => 'type d’enregistrement',
	'recordadmin-newsearch' => 'Nouvelle recherche $1',
	'recordadmin-newrecord' => 'Sélectionner un autre type d’enregistrement',
	'recordadmin-submit' => 'Soumettre',
	'recordadmin-create' => 'Chercher ou créer des enregistrements « $1 »',
	'recordadmin-alreadyexist' => 'Désolé, « $1 » existe déjà !',
	'recordadmin-createsuccess' => '$1 creé avec succès',
	'recordadmin-createerror' => 'Une erreur est intervenue lors de la tentative de création de $1 !',
	'recordadmin-badtitle' => 'Mauvais titre!',
	'recordadmin-recordid' => 'ID/Nom de l’enregistrement :',
	'recordadmin-invert' => 'Inverser la sélection',
	'recordadmin-buttonsearch' => 'Rechercher',
	'recordadmin-buttoncreate' => 'Créer',
	'recordadmin-buttonreset' => 'Réinitialiser',
	'recordadmin-searchresult' => 'Résultats de la recherche',
	'recordadmin-nomatch' => 'Aucun enregistrement correspondant de trouvé !',
	'recordadmin-typeupdated' => 'propriété de $1 mises à jour',
	'recordadmin-buttonsave' => 'Sauvegarder',
	'recordadmin-noform' => 'Il n’y a aucun formulaire avec l’enregistrement « $1 » !',
	'recordadmin-createlink' => 'cliquez ici pour en créer un',
	'recordadmin-newcreated' => 'Nouveau $1 créé à partir d’un formulaire public',
	'recordadmin-summary-typecreated' => 'Nouveau $1 de créer',
	'recordadmin-viewlink' => 'voir',
	'recordadmin-editlink' => 'modifier',
	'recordadmin-created' => 'Créé',
	'recordadmin-modified' => 'Modifié',
	'recordadmin-actions' => 'Actions',
	'recordadmin-needscontent' => 'Ajouter le contenu...',
	'right-recordadmin' => 'Trouver et modifier les pages d’enregistrement',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Aucun « $1 »',
	'recordadmin-edit-info' => 'Cette page contient des modèles qui ont leurs propres formulaires que vous pouvez remplir depuis ce jeu d’onglets',
	'recordadmin-properties' => 'Propriétés',
);

/** Franco-Provençal (Arpetan)
 * @author Cedric31
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'recordadmin' => 'Administracion des encartâjos',
	'recordadmin-select' => 'Chouèsir',
	'recordadmin-createtype' => 'Buchiéd lo nom d’un tipo novél d’encartâjo por lo fâre',
	'recordadmin-recordtype' => 'tipo d’encartâjo',
	'recordadmin-newsearch' => 'Rechèrche novèla $1',
	'recordadmin-newrecord' => 'Chouèsir un ôtro tipo d’encartâjo',
	'recordadmin-submit' => 'Sometre',
	'recordadmin-create' => 'Chèrchiér ou ben fâre des encartâjos « $1 »',
	'recordadmin-alreadyexist' => 'Dèsolâ, « $1 » ègziste ja !',
	'recordadmin-createsuccess' => '$1 fêt',
	'recordadmin-badtitle' => 'Crouyo titro !',
	'recordadmin-recordid' => 'Numerô / nom de l’encartâjo :',
	'recordadmin-invert' => 'Envèrsar lo chouèx',
	'recordadmin-buttonsearch' => 'Rechèrchiér',
	'recordadmin-buttoncreate' => 'Fâre',
	'recordadmin-buttonreset' => 'Tornar inicialisar',
	'recordadmin-searchresult' => 'Rèsultats de la rechèrche',
	'recordadmin-nomatch' => 'Nion encartâjo que corrèspond at étâ trovâ !',
	'recordadmin-typeupdated' => 'propriètâts de $1 betâs a jorn',
	'recordadmin-buttonsave' => 'Sôvar',
	'recordadmin-createlink' => 'nen fâre yon',
	'recordadmin-newcreated' => '$1 novél fêt dês un formulèro publico',
	'recordadmin-summary-typecreated' => '$1 novél fêt',
	'recordadmin-viewlink' => 'vêre',
	'recordadmin-editlink' => 'changiér',
	'recordadmin-created' => 'Fêt',
	'recordadmin-modified' => 'Changiê',
	'recordadmin-actions' => 'Accions',
	'recordadmin-needscontent' => 'Apondre lo contegnu...',
	'right-recordadmin' => 'Trovar et pués changiér les pâges d’encartâjo',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Nion « $1 »',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'recordadmin' => 'Xestión dos rexistros',
	'recordadmin-desc' => 'Procuras, pescudas, formularios e informes de datos do wiki derivados de parámetros de modelo',
	'recordadmin-specialdesc' => 'Unha [[Special:RecordAdmin|páxina especial]] para atopar e crear páxinas usando un formulario',
	'recordadmin-noforms' => 'Actualmente non hai formularios definidos a usar para as procurar e creacións',
	'recordadmin-select' => 'Seleccione o tipo de rexistro a xestionar',
	'recordadmin-createtype' => 'Introduza o nome dun novo tipo de rexistro para crealo',
	'recordadmin-recordtype' => 'tipo de rexistro',
	'recordadmin-newsearch' => 'Nova procura $1',
	'recordadmin-newrecord' => 'Seleccione outro tipo de rexistro',
	'recordadmin-submit' => 'Enviar',
	'recordadmin-create' => 'Atopar ou crear rexistros "$1"',
	'recordadmin-alreadyexist' => 'Sentímolo, "$1" xa existe!',
	'recordadmin-createsuccess' => '"$1" creado',
	'recordadmin-createerror' => 'Ocorreu un erro ao intentar crear o $1!',
	'recordadmin-badtitle' => 'Título incorrecto!',
	'recordadmin-recordid' => 'ID do rexistro/nome:',
	'recordadmin-invert' => 'Inverter a selección',
	'recordadmin-buttonsearch' => 'Procurar',
	'recordadmin-buttoncreate' => 'Crear',
	'recordadmin-buttonreset' => 'Restablecer',
	'recordadmin-searchresult' => 'Resultados da procura',
	'recordadmin-nomatch' => 'Non se atoparon rexistros que coincidisen!',
	'recordadmin-typeupdated' => 'Propiedades de "$1" actualizadas',
	'recordadmin-buttonsave' => 'Gardar',
	'recordadmin-noform' => 'Non hai ningún formulario asociado cos rexistros "$1"!',
	'recordadmin-createlink' => 'crear un',
	'recordadmin-newcreated' => 'Novo $1 creado a partir dun formulario público',
	'recordadmin-summary-typecreated' => 'Novo $1 creado',
	'recordadmin-viewlink' => 'ver',
	'recordadmin-editlink' => 'editar',
	'recordadmin-created' => 'Creado',
	'recordadmin-modified' => 'Modificado',
	'recordadmin-actions' => 'Accións',
	'recordadmin-needscontent' => 'Engadir o contido...',
	'right-recordadmin' => 'Atopar e editar páxinas de rexistro',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Non existe ningún "$1"',
	'recordadmin-edit-info' => 'Esta páxina contén os modelos que teñen os seus propios formularios, cos que encher desde este conxunto de lapelas',
	'recordadmin-properties' => 'Propiedades',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'recordadmin-select' => 'Ἐπιλέγειν',
	'recordadmin-submit' => 'Ὑποβάλλειν',
	'recordadmin-buttonsearch' => 'Ζητεῖν',
	'recordadmin-buttoncreate' => 'Ποιεῖν',
	'recordadmin-buttonreset' => 'Ἀνατιθέναι',
	'recordadmin-buttonsave' => 'Γράφειν',
	'recordadmin-editlink' => 'μεταγραφή',
	'recordadmin-actions' => 'Δράσεις',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'recordadmin' => 'Ufzeichnigsverwaltig',
	'recordadmin-desc' => 'Sueche, Abfroge, Formular un Bricht zue Wikidate us Vorlage-Parameter',
	'recordadmin-specialdesc' => 'E [[Special:RecordAdmin|Spezialsyte]] zum Finde un Aalege vu Syte mit eme zuegherige Formular',
	'recordadmin-noforms' => 'Zur Zyt git s kei Formular zum Suehce un Aalege vu Syte',
	'recordadmin-select' => 'Wehl dr Ufzeichnigstyp, wu soll verwaltet wäre',
	'recordadmin-createtype' => 'Trag dr Name yy vun eme neje Ufzeichnigstyp, wu soll aagleit wäre',
	'recordadmin-recordtype' => 'Ufzeichnigstyp',
	'recordadmin-newsearch' => 'Neji $1-Suechi',
	'recordadmin-newrecord' => 'Wehl en andere Ufzeichnigstyp',
	'recordadmin-submit' => 'Ibertrage',
	'recordadmin-create' => 'Find „$1“-Ufzeichnige oder leg eini aa',
	'recordadmin-alreadyexist' => 'Excusez, „$1“ git s scho!',
	'recordadmin-createsuccess' => '$1 aagleit',
	'recordadmin-createerror' => 'Derwylscht $1 aagleit woren isch, isch e Fähler ufträtte!',
	'recordadmin-badtitle' => 'Nit giltige Titel!',
	'recordadmin-recordid' => 'Ufzeichnigskännig/name:',
	'recordadmin-invert' => 'Uuswahl umchehre',
	'recordadmin-buttonsearch' => 'Suechi',
	'recordadmin-buttoncreate' => 'Leg aa',
	'recordadmin-buttonreset' => 'Zruggsetze',
	'recordadmin-searchresult' => 'Suechergebnis',
	'recordadmin-nomatch' => 'Kei Ufzeichnige gfunde, wu passe!',
	'recordadmin-typeupdated' => '$1 Wärt aktualisiert',
	'recordadmin-buttonsave' => 'Spychere',
	'recordadmin-noform' => 'S git kei Formular fir „$1“-Ufzeichnige!',
	'recordadmin-createlink' => 'leg eis aa',
	'recordadmin-newcreated' => 'Nej $1 uf eme effentlige Formular aagleit',
	'recordadmin-summary-typecreated' => 'Nej $1 aagleit',
	'recordadmin-viewlink' => 'aaluege',
	'recordadmin-editlink' => 'ändere',
	'recordadmin-created' => 'Aagleit',
	'recordadmin-modified' => 'Gänderet',
	'recordadmin-actions' => 'Aktione',
	'recordadmin-needscontent' => 'Inhalt zuefiege ...',
	'right-recordadmin' => 'Find Ufzeichnigssyte un bearbeit si',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Kei „$1“',
	'recordadmin-edit-info' => 'In däre Syte het s Vorlage mit eigene Formular, wu Du iber die Regischtercharte chasch uusfille',
	'recordadmin-properties' => 'Eigeschafte',
);

/** Hausa (هَوُسَ) */
$messages['ha'] = array(
	'recordadmin-buttonsearch' => 'Nema',
	'recordadmin-buttoncreate' => 'Ƙirƙira',
);

/** Hawaiian (Hawai`i)
 * @author Kalani
 */
$messages['haw'] = array(
	'recordadmin-editlink' => 'e hoʻololi',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'recordadmin' => 'ניהול רשומות',
	'recordadmin-desc' => '[[Special:RecordAdmin|דף מיוחד]] למציאה ועריכה של דפי רשומות באמצעות טופס',
	'recordadmin-select' => 'בחירת סוג הרשומות לניהול',
	'recordadmin-createtype' => 'כתבו את סוג הרשומה החדש ליצירה',
	'recordadmin-recordtype' => 'סוג הרשומה',
	'recordadmin-newsearch' => 'חיפוש $1 חדש',
	'recordadmin-newrecord' => 'בחירת סוג אחר של רשומות',
	'recordadmin-submit' => 'שליחה',
	'recordadmin-create' => 'מציאת או יצירת רשומות "$1"',
	'recordadmin-alreadyexist' => '"$1" כבר קיים!',
	'recordadmin-createsuccess' => '$1 נוצרה',
	'recordadmin-createerror' => 'אירעה שגיאה בעת הנסיון ליצור את $1!',
	'recordadmin-badtitle' => 'כותרת בלתי תקינה!',
	'recordadmin-recordid' => 'שם/מספר הרשומה:',
	'recordadmin-invert' => 'הפיכת הבחירה',
	'recordadmin-buttonsearch' => 'חיפוש',
	'recordadmin-buttoncreate' => 'יצירה',
	'recordadmin-buttonreset' => 'איפוס',
	'recordadmin-searchresult' => 'תוצאות החיפוש',
	'recordadmin-nomatch' => 'לא נמצאו רשומות תואמות!',
	'recordadmin-typeupdated' => 'עודכנו $1 מאפיינים',
	'recordadmin-buttonsave' => 'שמירה',
	'recordadmin-noform' => 'אין טופס המשוייך לרשומות "$1"!',
	'recordadmin-createlink' => 'יצירת אחת כזו',
	'recordadmin-newcreated' => 'נוצרה $1 חדשה מטופס ציבורי',
	'recordadmin-summary-typecreated' => 'נוצרה $1 חדשה',
	'recordadmin-viewlink' => 'הצגה',
	'recordadmin-editlink' => 'עריכה',
	'recordadmin-created' => 'נוצרה',
	'recordadmin-modified' => 'השתנתה',
	'recordadmin-actions' => 'פעולות',
	'recordadmin-needscontent' => 'הוספת תוכן...',
	'right-recordadmin' => 'מציאת ועריכת דפי רשומות',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'recordadmin' => 'Administracija zregistrowanjow',
	'recordadmin-desc' => '[[Special:RecordAdmin|Specialna strona]] za namakanje a wobdźěłowanje stronow zregistrowanjow z pomocu formulara',
	'recordadmin-select' => 'Wubjer typ registracijow, kotrež so maja zrjadować',
	'recordadmin-createtype' => 'Zapodaj mjeno typa registracije, kotryž ma so wutworić',
	'recordadmin-recordtype' => 'typ registracije',
	'recordadmin-newsearch' => 'Nowe pytanje $1',
	'recordadmin-newrecord' => 'Druhi typ zregistrowanja wubrać',
	'recordadmin-submit' => 'Wotpósłać',
	'recordadmin-create' => 'Zapiski "$1" namakać abo wutworić',
	'recordadmin-alreadyexist' => 'Wodaj, "$1" hižo eksistuje!',
	'recordadmin-createsuccess' => '$1 wutworjene',
	'recordadmin-createerror' => 'Při popyće $1 wutworić je zmylk nastał!',
	'recordadmin-badtitle' => 'Wopačny titul!',
	'recordadmin-recordid' => 'ID registrowanja/mjeno:',
	'recordadmin-invert' => 'Wuběr wobroćić',
	'recordadmin-buttonsearch' => 'Pytać',
	'recordadmin-buttoncreate' => 'Wutworić',
	'recordadmin-buttonreset' => 'Wróćo stajić',
	'recordadmin-searchresult' => 'Pytanske wuslědki',
	'recordadmin-nomatch' => 'Žane wotpowědowace zregistrowanja namakane!',
	'recordadmin-typeupdated' => '$1 {{PLURAL:$1|kajkosć zaktualizowana|kajkosći zaktualizowanej|kajkosće zaktualizowane|kajkosćow zaktualizowane}}',
	'recordadmin-buttonsave' => 'Składować',
	'recordadmin-noform' => 'Njeje formular za zregistrowanja "$1"!',
	'recordadmin-createlink' => 'jedne wutworić',
	'recordadmin-newcreated' => 'Nowy $1 ze zjawneho formulara wutworjeny',
	'recordadmin-summary-typecreated' => 'Nowy $1 wutworjeny',
	'recordadmin-viewlink' => 'wobhladać sej',
	'recordadmin-editlink' => 'wobdźěłać',
	'recordadmin-created' => 'Wutworjeny',
	'recordadmin-modified' => 'Změnjeny',
	'recordadmin-actions' => 'Akcije',
	'recordadmin-needscontent' => 'Wobsah přidać...',
	'right-recordadmin' => 'Strony zregistrowanjow namakać a wobdźěłać',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Žadyn "$1"',
);

/** Hungarian (Magyar)
 * @author Glanthor Reviol
 */
$messages['hu'] = array(
	'recordadmin' => 'Rekord adminisztráció',
	'recordadmin-desc' => '[[Special:RecordAdmin|Speciális lap]] rekord oldalak kereséséhez és szerkesztéséhez űrlap segítségével',
	'recordadmin-select' => 'Kijelölés',
	'recordadmin-createtype' => 'Add meg az új rekordtípus nevét a létrehozásához',
	'recordadmin-recordtype' => 'rekordtípus',
	'recordadmin-newsearch' => 'Új $1 keresés',
	'recordadmin-newrecord' => 'Válassz másik rekordtípust',
	'recordadmin-submit' => 'Elküldés',
	'recordadmin-create' => '„$1” rekordok keresése vagy létrehozása',
	'recordadmin-alreadyexist' => 'Bocsánat, a(z) „$1” már létezik!',
	'recordadmin-createsuccess' => '$1 létrehozva',
	'recordadmin-createerror' => 'Hiba történt a(z) $1 létrehozása közben!',
	'recordadmin-badtitle' => 'Rossz cím!',
	'recordadmin-recordid' => 'Rekordazonosító/név:',
	'recordadmin-invert' => 'Kijelölés megfordítása',
	'recordadmin-buttonsearch' => 'Keresés',
	'recordadmin-buttoncreate' => 'Létrehozás',
	'recordadmin-buttonreset' => 'Alaphelyzet',
	'recordadmin-searchresult' => 'Keresési eredmények',
	'recordadmin-nomatch' => 'Nem található egyező rekord!',
	'recordadmin-typeupdated' => '$1 tulajdonságai frissítve',
	'recordadmin-buttonsave' => 'Mentés',
	'recordadmin-noform' => 'Nincs a(z) „$1” rekordokkal kapcsolatban levő űrlap!',
	'recordadmin-createlink' => 'hozz létre egyet',
	'recordadmin-newcreated' => 'Új $1 létrehozva nyilvános űrlap alapján',
	'recordadmin-summary-typecreated' => 'Új $1 létrehozva',
	'recordadmin-viewlink' => 'megjelenítés',
	'recordadmin-editlink' => 'szerkesztés',
	'recordadmin-created' => 'Létrehozva',
	'recordadmin-modified' => 'Módosítva',
	'recordadmin-actions' => 'Műveletek',
	'recordadmin-needscontent' => 'Tartalom hozzáadása…',
	'right-recordadmin' => 'Rekord lapok keresése és szerkesztése',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Nincs „$1”',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'recordadmin' => 'Gestion de datos',
	'recordadmin-desc' => 'Recerca, consultas, formularios e reportos de datos wiki, derivate de parametros a patronos',
	'recordadmin-specialdesc' => 'Un [[Special:RecordAdmin|pagina special]] pro cercar e crear paginas usante formularios associate',
	'recordadmin-noforms' => 'Il ha actualmente nulle formulario definite a usar pro cercar e crear',
	'recordadmin-select' => 'Selige',
	'recordadmin-createtype' => 'Entra le nomine de un nove typo de registro a crear',
	'recordadmin-recordtype' => 'typo de registro',
	'recordadmin-newsearch' => 'Nove recerca $1',
	'recordadmin-newrecord' => 'Selige un altere typo de datos',
	'recordadmin-submit' => 'Submitter',
	'recordadmin-create' => 'Cercar o crear datos "$1"',
	'recordadmin-alreadyexist' => 'Pardono, "$1" ja existe!',
	'recordadmin-createsuccess' => '$1 create',
	'recordadmin-createerror' => 'Un error occurreva durante le creation de $1!',
	'recordadmin-badtitle' => 'Titulo invalide!',
	'recordadmin-recordid' => 'ID del dato/nomine:',
	'recordadmin-invert' => 'Inverter selection',
	'recordadmin-buttonsearch' => 'Cercar',
	'recordadmin-buttoncreate' => 'Crear',
	'recordadmin-buttonreset' => 'Reinitialisar',
	'recordadmin-searchresult' => 'Resultatos del recerca',
	'recordadmin-nomatch' => 'Nulle datos correspondente trovate!',
	'recordadmin-typeupdated' => '$1 proprietates actualisate',
	'recordadmin-buttonsave' => 'Salveguardar',
	'recordadmin-noform' => 'Non existe un formulario associate con datos "$1"!',
	'recordadmin-createlink' => 'crear un',
	'recordadmin-newcreated' => 'Nove $1 create ex formulario public',
	'recordadmin-summary-typecreated' => 'Nove $1 create',
	'recordadmin-viewlink' => 'vider',
	'recordadmin-editlink' => 'modificar',
	'recordadmin-created' => 'Create',
	'recordadmin-modified' => 'Modificate',
	'recordadmin-actions' => 'Actiones',
	'recordadmin-needscontent' => 'Adder contento...',
	'right-recordadmin' => 'Cercar e modificar paginas de datos',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Non existe "$1"',
	'recordadmin-edit-info' => 'Iste pagina contine patronos que ha lor proprie formularios le quales tu pote completar ab iste gruppo de schedas',
	'recordadmin-properties' => 'Proprietates',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 * @author Farras
 * @author Irwangatot
 * @author Kandar
 */
$messages['id'] = array(
	'recordadmin' => 'Catatan Administrasi',
	'recordadmin-desc' => 'Sebuah [[Special:RecordAdmin|halaman istimewa]] untuk menemukan dan menyunting catatan halaman menggunakan formulir',
	'recordadmin-select' => 'Pilih',
	'recordadmin-createtype' => 'Masukkan nama tipe rekaman baru yang akan dibuat',
	'recordadmin-recordtype' => 'tipe rekaman',
	'recordadmin-newsearch' => 'Pencarian $1 baru',
	'recordadmin-newrecord' => 'Pilih tipe rekaman lain',
	'recordadmin-submit' => 'Kirim',
	'recordadmin-create' => 'Pilih atau buat "$1" rekaman',
	'recordadmin-alreadyexist' => 'Maaf, "$1" sudah ada!',
	'recordadmin-createsuccess' => '$1 telah dibuat',
	'recordadmin-createerror' => 'Ada kesalahan saat mencoba membuat $1!',
	'recordadmin-badtitle' => 'Judul tidak dibenarkan!',
	'recordadmin-recordid' => 'ID/nama rekaman:',
	'recordadmin-invert' => 'Balikkan pilihan',
	'recordadmin-buttonsearch' => 'Cari',
	'recordadmin-buttoncreate' => 'Buat',
	'recordadmin-buttonreset' => 'Reset',
	'recordadmin-searchresult' => 'Hasil pencarian',
	'recordadmin-nomatch' => 'Tidak ditemukan rekaman yang cocok!',
	'recordadmin-typeupdated' => '$1 perbaharui propertis',
	'recordadmin-buttonsave' => 'Simpan',
	'recordadmin-noform' => 'Tidak ada formulir yang terkait dengan rekaman "$1"!',
	'recordadmin-createlink' => 'buat',
	'recordadmin-newcreated' => '$1 baru telah dibuat dari formulir umum',
	'recordadmin-summary-typecreated' => '$1 baru telah dibuat',
	'recordadmin-viewlink' => 'lihat',
	'recordadmin-editlink' => 'sunting',
	'recordadmin-created' => 'Telah dibuat',
	'recordadmin-modified' => 'Dirubah',
	'recordadmin-actions' => 'Tindakan',
	'recordadmin-needscontent' => 'Menambah isi...',
	'right-recordadmin' => 'Temukan dan sunting catatan halaman',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Tidak ada "$1"',
);

/** Igbo (Igbo)
 * @author Ukabia
 */
$messages['ig'] = array(
	'recordadmin-createsuccess' => '$1 kèrè',
	'recordadmin-badtitle' => 'Ishi edemede öjö!',
	'recordadmin-buttonsearch' => 'Chöwá',
	'recordadmin-buttoncreate' => 'Ké',
	'recordadmin-buttonsave' => 'Donyéré',
	'recordadmin-editlink' => 'rüwa',
	'recordadmin-actions' => 'Mmèmé',
);

/** Ido (Ido)
 * @author Malafaya
 */
$messages['io'] = array(
	'recordadmin-buttonsave' => 'Registragar',
);

/** Italian (Italiano)
 * @author Darth Kule
 * @author Melos
 */
$messages['it'] = array(
	'recordadmin-select' => 'Seleziona',
	'recordadmin-submit' => 'Invia',
	'recordadmin-badtitle' => 'Titolo non corretto',
	'recordadmin-invert' => 'Inverti selezione',
	'recordadmin-buttonsearch' => 'Ricerca',
	'recordadmin-buttoncreate' => 'Crea',
	'recordadmin-buttonreset' => 'Reimposta',
	'recordadmin-searchresult' => 'Risultati della ricerca',
	'recordadmin-buttonsave' => 'Salva',
	'recordadmin-viewlink' => 'visualizza',
	'recordadmin-editlink' => 'modifica',
	'recordadmin-created' => 'Creata',
	'recordadmin-modified' => 'Modificati',
	'recordadmin-actions' => 'Azioni',
	'recordadmin-export-csv' => 'CSV',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fryed-peach
 * @author Hosiryuhosi
 * @author Yanajin66
 * @author 青子守歌
 */
$messages['ja'] = array(
	'recordadmin' => '記録管理',
	'recordadmin-desc' => 'フォームを用いて記録ページを検索および編集するための[[Special:RecordAdmin|特別ページ]]',
	'recordadmin-noforms' => '現在、検索と作成のために使用されるフォームは存在しません',
	'recordadmin-select' => '対処したい記録種別を選んでください',
	'recordadmin-createtype' => '新規作成したい記録種別の名前を入力してください',
	'recordadmin-recordtype' => '記録種別',
	'recordadmin-newsearch' => '新規$1検索',
	'recordadmin-newrecord' => '別の記録種別を選んでください',
	'recordadmin-submit' => '送信',
	'recordadmin-create' => '「$1」記録を検索または作成する',
	'recordadmin-alreadyexist' => '「$1」は既に存在します。',
	'recordadmin-createsuccess' => '$1 を作成',
	'recordadmin-createerror' => '$1 の作成処理中にエラーが発生しました！',
	'recordadmin-badtitle' => 'ページ名が不正です！',
	'recordadmin-recordid' => '記録ID/名前:',
	'recordadmin-invert' => '選択を反転',
	'recordadmin-buttonsearch' => '検索',
	'recordadmin-buttoncreate' => '作成',
	'recordadmin-buttonreset' => 'リセット',
	'recordadmin-searchresult' => '検索結果',
	'recordadmin-nomatch' => '一致する記録は見つかりませんでした！',
	'recordadmin-typeupdated' => '$1 のプロパティを更新',
	'recordadmin-buttonsave' => '保存',
	'recordadmin-noform' => '「$1」記録と関連付けられたフォームはありません。',
	'recordadmin-createlink' => '作成',
	'recordadmin-newcreated' => '新規$1が公開フォームから作成されました',
	'recordadmin-summary-typecreated' => '新規$1が作成されました',
	'recordadmin-viewlink' => '表示',
	'recordadmin-editlink' => '編集',
	'recordadmin-created' => '作成',
	'recordadmin-modified' => '変更',
	'recordadmin-actions' => '操作',
	'recordadmin-needscontent' => '内容の追加...',
	'right-recordadmin' => '記録ページを検索および編集する',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => '"$1"なし',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Lovekhmer
 * @author Thearith
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'recordadmin' => 'កណត់ត្រា​ការគ្រប់គ្រង',
	'recordadmin-select' => 'ជ្រើស​យក',
	'recordadmin-newsearch' => 'ថ្មី $1 ស្វែងរក',
	'recordadmin-newrecord' => 'ជ្រើស​ប្រភេទ​កំណត់ត្រ​មួយ​ផ្សេង​ទៀត',
	'recordadmin-submit' => 'ដាក់ស្នើ',
	'recordadmin-create' => 'ស្វែងរក ឬ បង្កើត​កំណត់ត្រា "$1"',
	'recordadmin-alreadyexist' => 'សូម​អភ័យទោស, "$1" មាន​រួចហើយ​!',
	'recordadmin-createsuccess' => '$1 ត្រូវ​បាន​បង្កើត',
	'recordadmin-createerror' => 'កំហុស​មួយ​បាន​កើតឡើង ខណៈដែល​កំពុង​ព្យាយាម​បង្កើត $1',
	'recordadmin-badtitle' => 'ចំណងជើង​មិនល្អ',
	'recordadmin-invert' => 'ដាក់បញ្ច្រាស​ជម្រើស',
	'recordadmin-buttonsearch' => 'ស្វែងរក',
	'recordadmin-buttoncreate' => 'បង្កើត',
	'recordadmin-buttonreset' => 'កំណត់ឡើងវិញ',
	'recordadmin-searchresult' => 'លទ្ធផល​ស្វែងរក',
	'recordadmin-buttonsave' => 'រក្សាទុក',
	'recordadmin-summary-typecreated' => 'ថ្មី $1 ត្រូវ​បាន​បង្កើត',
	'recordadmin-viewlink' => 'មើល',
	'recordadmin-editlink' => 'កែប្រែ',
	'recordadmin-created' => 'បាន​បង្កើត',
	'right-recordadmin' => 'ស្វែងរក និង​កែប្រែ​ទំព័រ​កំណត់ត្រា',
);

/** Kannada (ಕನ್ನಡ)
 * @author Nayvik
 */
$messages['kn'] = array(
	'recordadmin-buttonsearch' => 'ಹುಡುಕು',
	'recordadmin-editlink' => 'ಸಂಪಾದಿಸಿ',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'recordadmin' => 'Datesätz verwallde',
	'recordadmin-desc' => 'En [[Special:RecordAdmin|Söndersigg]] för Sigge met Datesätz ze fenge un övver e Fommulaa zo ändere.',
	'recordadmin-select' => 'Donn de Zoot Datesatz ußsöke, för die de jet verwallde wells',
	'recordadmin-createtype' => 'Donn dä Name för ene neue Zoot Datesätz enjäve',
	'recordadmin-recordtype' => 'Datesatz-Zoote',
	'recordadmin-newsearch' => 'Neu $1 söke',
	'recordadmin-newrecord' => 'Sök en ander Zoot Datesatz uß',
	'recordadmin-submit' => 'Loß Jonn!',
	'recordadmin-create' => 'Donn „$1“-Datesätz fenge udder ändere',
	'recordadmin-alreadyexist' => '„$1“ jitt et ald.',
	'recordadmin-createsuccess' => '$1 aanjelaat',
	'recordadmin-createerror' => 'Ene Fääler eß opjetrodde: neu $1 kunnt nit aanjelaat wääde.',
	'recordadmin-badtitle' => 'Dä Tittel es onjöltesch!',
	'recordadmin-recordid' => 'Däm Datesatz singe Nommer un Name:',
	'recordadmin-invert' => 'Ußwahl ömdriehe',
	'recordadmin-buttonsearch' => 'Söke',
	'recordadmin-buttoncreate' => 'Aanläje',
	'recordadmin-buttonreset' => 'Zeröksäze',
	'recordadmin-searchresult' => 'Wat bem Söke eruß kohm',
	'recordadmin-nomatch' => 'Kein zopaß Datesätz jefonge.',
	'recordadmin-typeupdated' => 'De Date fun däm $1 sin jeändert',
	'recordadmin-buttonsave' => 'Dä Datesatz avspeichere!',
	'recordadmin-noform' => 'Mer han kei Fommulaa för de „$1“-Datesätz',
	'recordadmin-createlink' => 'ein aanlääje',
	'recordadmin-newcreated' => 'Neu $1 övver e öffentlesch Fommulaa aanjelaat',
	'recordadmin-summary-typecreated' => 'Neu $1 aanjelaat',
	'recordadmin-viewlink' => 'aankike',
	'recordadmin-editlink' => 'ändere',
	'recordadmin-created' => 'Neu aanjelaat',
	'recordadmin-modified' => 'Jeändert',
	'recordadmin-actions' => 'Axjohne',
	'recordadmin-needscontent' => 'Enhalld dobei donn&nbsp;...',
	'right-recordadmin' => 'Datesätz fenge un ändere',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'recordadmin-select' => 'Eraussichen',
	'recordadmin-newsearch' => 'Nei $1 sichen',
	'recordadmin-alreadyexist' => 'Pardon, "$1" gëtt et schonn!',
	'recordadmin-createsuccess' => '$1 ugeluecht',
	'recordadmin-badtitle' => 'Schlechten Titel!',
	'recordadmin-recordid' => 'ID/Numm vun deem wat gespäichert gouf:',
	'recordadmin-invert' => 'Auswiel ëmdréinen',
	'recordadmin-buttonsearch' => 'Sichen',
	'recordadmin-buttoncreate' => 'Uleeën',
	'recordadmin-buttonreset' => 'Zrécksetzen',
	'recordadmin-searchresult' => 'Resultater vun der Sich',
	'recordadmin-typeupdated' => 'Eegeschafte vu(n) $1 aktualiséiert',
	'recordadmin-buttonsave' => 'Späicheren',
	'recordadmin-viewlink' => 'weisen',
	'recordadmin-editlink' => 'änneren',
	'recordadmin-created' => 'Ugeluecht',
	'recordadmin-modified' => 'Geännert',
	'recordadmin-actions' => 'Aktiounen',
	'recordadmin-needscontent' => 'Inhalt derbäisetzen ...',
	'recordadmin-notset' => 'Keng "$1"',
);

/** Limburgish (Limburgs)
 * @author Pahles
 */
$messages['li'] = array(
	'recordadmin-invert' => 'Ómgedriejde selectie',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'recordadmin' => 'Администрација на записи',
	'recordadmin-desc' => 'Пребарување, барања, обрасци и извештаи за вики-податоци изведени од шаблонските параметри',
	'recordadmin-specialdesc' => '[[Special:RecordAdmin|Специјална страница]] за пронаоѓање и создавање на страници користејќи здружени обрасци',
	'recordadmin-noforms' => 'Моментално нема обрасци определени за пребарување и создавање',
	'recordadmin-select' => 'Избери',
	'recordadmin-createtype' => 'Внесете назив на новиот записен тип за создавање',
	'recordadmin-recordtype' => 'записен тип',
	'recordadmin-newsearch' => 'Ново пребарување на $1',
	'recordadmin-newrecord' => 'Изберете друг записен тип',
	'recordadmin-submit' => 'Испрати',
	'recordadmin-create' => 'Пронајди или создај записи за „$1“',
	'recordadmin-alreadyexist' => 'Жалам, но „$1“ веќе постои!',
	'recordadmin-createsuccess' => '$1 е создадено',
	'recordadmin-createerror' => 'Настана грешка при обидот за создавање на $1!',
	'recordadmin-badtitle' => 'Лош наслов!',
	'recordadmin-recordid' => 'ID/име на записот:',
	'recordadmin-invert' => 'Обратен избор',
	'recordadmin-buttonsearch' => 'Пребарај',
	'recordadmin-buttoncreate' => 'Создај',
	'recordadmin-buttonreset' => 'Одново',
	'recordadmin-searchresult' => 'Резултати од пребарувањето',
	'recordadmin-nomatch' => 'Нема пронајдено соодветни записи!',
	'recordadmin-typeupdated' => 'Обновени се $1 својства',
	'recordadmin-buttonsave' => 'Зачувај',
	'recordadmin-noform' => 'Нема образец поврзан со записи од типот „$1“!',
	'recordadmin-createlink' => 'создај',
	'recordadmin-newcreated' => 'Создаден е нов $1 со јавен образец',
	'recordadmin-summary-typecreated' => 'Создаден е нов $1',
	'recordadmin-viewlink' => 'преглед',
	'recordadmin-editlink' => 'уреди',
	'recordadmin-created' => 'Создадено',
	'recordadmin-modified' => 'Изменето',
	'recordadmin-actions' => 'Дејства',
	'recordadmin-needscontent' => 'Додај содржина...',
	'right-recordadmin' => 'Пронаоѓање и уредување на записни страници',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Нема „$1“',
	'recordadmin-edit-info' => 'Оваа страница содржи шаблони кои имаат свои обрасци што можете да ги пополните од овој збир јазичиња.',
	'recordadmin-properties' => 'Својства',
);

/** Mongolian (Монгол)
 * @author Chinneeb
 */
$messages['mn'] = array(
	'recordadmin-buttonsearch' => 'Хайх',
);

/** Malay (Bahasa Melayu)
 * @author Aurora
 */
$messages['ms'] = array(
	'recordadmin-actions' => 'Tindakan',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'recordadmin-invert' => 'Кочказень таркас апаконь кочкамо',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'recordadmin-badtitle' => '¡Ahcualli tōcāitl!',
	'recordadmin-buttonsearch' => 'Titlatēmōz',
	'recordadmin-buttoncreate' => 'Ticchīhuāz',
	'recordadmin-buttonsave' => 'Ticchīhuāz',
	'recordadmin-summary-typecreated' => 'Yancuīc $1 ōmochīuh',
	'recordadmin-viewlink' => 'tiquittāz',
	'recordadmin-editlink' => 'ticpatlāz',
	'recordadmin-created' => 'Ōmochīuh',
);

/** Dutch (Nederlands)
 * @author Siebrand
 * @author Tvdm
 */
$messages['nl'] = array(
	'recordadmin' => 'Gegevensbeheer',
	'recordadmin-desc' => 'Zoeken, zoekopdrachten, formulieren en rapporten met betrekking tot wikigegevens die komen uit sjabloonparameters',
	'recordadmin-specialdesc' => "Een [[Special:RecordAdmin|speciale pagina]] voor het zoeken en aanmaken van pagina's die gerelateerde formulieren gebruiken",
	'recordadmin-noforms' => 'Er zijn geen formulieren gedefinieerd die gebruikt kunnen worden voor zoeken en aanmaken',
	'recordadmin-select' => 'Selecteer het te beheren gegevenstype',
	'recordadmin-createtype' => 'Voer de naam van een nieuw aan te maken gegevenstype in',
	'recordadmin-recordtype' => 'gegevenstype',
	'recordadmin-newsearch' => 'Nieuwe zoekopdracht voor $1',
	'recordadmin-newrecord' => 'Een ander gegevenstype selecteren',
	'recordadmin-submit' => 'OK',
	'recordadmin-create' => 'Gegevens van het type "$1" zoeken of aanmaken',
	'recordadmin-alreadyexist' => '"$1" bestaat al!',
	'recordadmin-createsuccess' => '$1 aangemaakt',
	'recordadmin-createerror' => 'Er is een fout opgetreden bij het aanmaken van het $1.',
	'recordadmin-badtitle' => 'Onjuiste paginanaam!',
	'recordadmin-recordid' => 'Gegevensnummer/naam:',
	'recordadmin-invert' => 'Omgekeerde selectie',
	'recordadmin-buttonsearch' => 'Zoeken',
	'recordadmin-buttoncreate' => 'Aanmaken',
	'recordadmin-buttonreset' => 'Fomulier wissen',
	'recordadmin-searchresult' => 'Zoekresultaten',
	'recordadmin-nomatch' => 'Er zijn geen gegevens gevonden die aan de voorwaarden voldoen.',
	'recordadmin-typeupdated' => 'De eigenschappen van $1 zijn bijgewerkt',
	'recordadmin-buttonsave' => 'Opslaan',
	'recordadmin-noform' => 'Er is geen formulier gekoppeld aan gegevens van het type "$1"!',
	'recordadmin-createlink' => 'aanmaken',
	'recordadmin-newcreated' => 'Nieuwe $1 aangemaakt van openbaar formulier',
	'recordadmin-summary-typecreated' => 'Nieuwe $1 aangemaakt',
	'recordadmin-viewlink' => 'bekijken',
	'recordadmin-editlink' => 'bewerken',
	'recordadmin-created' => 'Aangemaakt',
	'recordadmin-modified' => 'Gewijzigd',
	'recordadmin-actions' => 'Handelingen',
	'recordadmin-needscontent' => 'Inhoud toevoegen...',
	'right-recordadmin' => "Gegevenspagina's zoeken en bewerken",
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Geen "$1"',
	'recordadmin-edit-info' => 'Deze pagina bevat sjablonen die hun eigen formulieren hebben die u hier in kunt vullen.',
	'recordadmin-properties' => 'Eigenschappen',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Gunnernett
 * @author Harald Khan
 */
$messages['nn'] = array(
	'recordadmin' => 'Oppføringshandsaming',
	'recordadmin-desc' => 'Ei [[Special:RecordAdmin|spesialside]] for å finna og redigera oppføringar ved å bruka eit skjema',
	'recordadmin-select' => 'Vel kva oppføringstype du ynskjer å handsama',
	'recordadmin-createtype' => 'Skriv inn namnet på ein ny oppføringstype som du ynskjer å oppretta',
	'recordadmin-recordtype' => 'oppføringstype',
	'recordadmin-newsearch' => 'Nytt søk etter $1',
	'recordadmin-newrecord' => 'Vel ein annan type oppføring',
	'recordadmin-submit' => 'Send',
	'recordadmin-create' => 'Finn eller opprett «$1»-oppføringar',
	'recordadmin-alreadyexist' => '«$1» finst frå før.',
	'recordadmin-createsuccess' => '$1 er oppretta',
	'recordadmin-createerror' => 'Ein feil oppstod under opprettinga av $1!',
	'recordadmin-badtitle' => 'Ugyldig tittel!',
	'recordadmin-recordid' => 'Oppførings-ID/-namn:',
	'recordadmin-invert' => 'Vend om utval',
	'recordadmin-buttonsearch' => 'Søk',
	'recordadmin-buttoncreate' => 'Opprett',
	'recordadmin-buttonreset' => 'Still attende',
	'recordadmin-searchresult' => 'Søkjeresultat',
	'recordadmin-nomatch' => 'Ingen høvelege resultat funne!',
	'recordadmin-typeupdated' => 'Eigenskapane til $1 blei oppdaterte',
	'recordadmin-buttonsave' => 'Lagra',
	'recordadmin-noform' => 'Det er ikkje knytt eit skjema til oppføringa «$1»!',
	'recordadmin-createlink' => 'opprett ein',
	'recordadmin-newcreated' => 'Ny $1 laga frå eit offentleg skjema',
	'recordadmin-summary-typecreated' => 'Ny $1 laga til',
	'recordadmin-viewlink' => 'sjå',
	'recordadmin-editlink' => 'endra',
	'recordadmin-created' => 'Oppretta',
	'recordadmin-modified' => 'Endra',
	'recordadmin-actions' => 'Handlingar',
	'recordadmin-needscontent' => 'Legg til innhald',
	'right-recordadmin' => 'Finn og gjer endringar på oppføringssider',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'recordadmin' => 'Oppføringshåndtering',
	'recordadmin-desc' => 'En [[Special:RecordAdmin|spesialside]] for å finne og redigere oppføringer ved å bruke et skjema',
	'recordadmin-select' => 'Velg',
	'recordadmin-createtype' => 'Skriv inn navnet på en ny oppføringstype som du vil opprette',
	'recordadmin-recordtype' => 'oppføringstype',
	'recordadmin-newsearch' => 'Nytt søk etter $1',
	'recordadmin-newrecord' => 'Velg en annen oppføringstype',
	'recordadmin-submit' => 'Send',
	'recordadmin-create' => 'Finn eller opprett «$1»-oppføringer',
	'recordadmin-alreadyexist' => 'Beklager, «$1» finnes allerede!',
	'recordadmin-createsuccess' => '$1 ble opprettet',
	'recordadmin-createerror' => 'En feil oppsto under opprettelsen av $1!',
	'recordadmin-badtitle' => 'Ugyldig tittel!',
	'recordadmin-recordid' => 'Oppførings-ID/-navn:',
	'recordadmin-invert' => 'Inverter valget',
	'recordadmin-buttonsearch' => 'Søk',
	'recordadmin-buttoncreate' => 'Opprett',
	'recordadmin-buttonreset' => 'Nullstill',
	'recordadmin-searchresult' => 'Søkeresultat',
	'recordadmin-nomatch' => 'Ingen samsvarende oppføringer funnet!',
	'recordadmin-typeupdated' => 'Egenskapene til $1 ble oppdatert',
	'recordadmin-buttonsave' => 'Lagre',
	'recordadmin-noform' => 'Det finnes ikke et skjema tilknyttet oppføringen «$1»!',
	'recordadmin-createlink' => 'opprett en',
	'recordadmin-newcreated' => 'Ny $1 opprettet fra offentlig skjema',
	'recordadmin-summary-typecreated' => 'Ny $1 opprettet',
	'recordadmin-viewlink' => 'vis',
	'recordadmin-editlink' => 'endre',
	'recordadmin-created' => 'Opprettet',
	'recordadmin-modified' => 'Endret',
	'recordadmin-actions' => 'Handlinger',
	'recordadmin-needscontent' => 'Legg til innhold...',
	'right-recordadmin' => 'Finn og endre oppføringssider',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Ingen «$1»',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'recordadmin' => 'Gestion dels enregistraments',
	'recordadmin-desc' => 'Una pagina especiala per trobar e modificar l’enregistrament de las paginas per l’utilizacion d’un formulari',
	'recordadmin-select' => 'Seleccionatz lo tipe d’enregistrament de gerir',
	'recordadmin-createtype' => "Picatz lo nom d'un tipe d'enregistrament per o crear",
	'recordadmin-recordtype' => "tipe d'enregistrament",
	'recordadmin-newsearch' => 'Recèrca novèla $1',
	'recordadmin-newrecord' => 'Seleccionar un autre tipe d’enregistrament',
	'recordadmin-submit' => 'Sometre',
	'recordadmin-create' => "Cercar o crear d'enregistraments « $1 »",
	'recordadmin-alreadyexist' => 'O planhèm, « $1 » existís ja !',
	'recordadmin-createsuccess' => '$1 creat amb succès',
	'recordadmin-createerror' => 'Una error es intervenguda al moment de la temptativa de creacion de $1 !',
	'recordadmin-badtitle' => 'Títol marrit!',
	'recordadmin-recordid' => 'Enregistrament ID / nom :',
	'recordadmin-invert' => 'Inversar la seleccion',
	'recordadmin-buttonsearch' => 'Recercar',
	'recordadmin-buttoncreate' => 'Crear',
	'recordadmin-buttonreset' => 'Tornar inicializar',
	'recordadmin-searchresult' => 'Resultats de la recèrca',
	'recordadmin-nomatch' => "Cap d'enregistrament correspondent pas trobat !",
	'recordadmin-typeupdated' => 'proprietat de $1 mesas a jorn',
	'recordadmin-buttonsave' => 'Salvar',
	'recordadmin-noform' => 'I a pas cap de formulari amb l’enregistrament « $1 » !',
	'recordadmin-createlink' => 'clicatz aicí per ne crear un',
	'recordadmin-newcreated' => '$1 novèl creat a partir d’un formulari public',
	'recordadmin-summary-typecreated' => '$1 novèl de crear',
	'recordadmin-viewlink' => 'veire',
	'recordadmin-editlink' => 'modificar',
	'recordadmin-created' => 'Creat',
	'recordadmin-modified' => 'Modificat',
	'recordadmin-actions' => 'Accions',
	'recordadmin-needscontent' => 'Apondre lo contengut...',
	'right-recordadmin' => 'Trobar e modificar las paginas d’enregistrament',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Pas cap de « $1 »',
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$messages['os'] = array(
	'recordadmin-buttonsave' => 'Афтæ уæд',
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'recordadmin-buttonsearch' => 'Guck uff',
	'recordadmin-buttoncreate' => 'Schtaerte',
	'recordadmin-editlink' => 'ennere',
	'recordadmin-modified' => 'Gennert',
	'recordadmin-notset' => 'Keen „$1“',
);

/** Polish (Polski)
 * @author Derbeth
 * @author Leinad
 * @author Sp5uhe
 * @author ToSter
 */
$messages['pl'] = array(
	'recordadmin' => 'Administracja rekordami',
	'recordadmin-desc' => 'Wyszukiwanie, zapytania, formularze i raportowanie dla danych pochodzących z parametrów szablonów',
	'recordadmin-specialdesc' => '[[Special:RecordAdmin|Strona specjalna]] służąca do wyszukiwania i tworzenia stron z użyciem przypisanych formularzy',
	'recordadmin-noforms' => 'Obecnie brak jest formularzy służących do wyszukiwania i tworzenia stron',
	'recordadmin-select' => 'Wybierz typ rekordu, którym chcesz zarządzać',
	'recordadmin-createtype' => 'Podaj nazwę nowego typu rekordy, który chcesz utworzyć',
	'recordadmin-recordtype' => 'typ rekordu',
	'recordadmin-newsearch' => 'Nowe wyszukiwanie $1',
	'recordadmin-newrecord' => 'Wybierz inny typ rekordu',
	'recordadmin-submit' => 'OK',
	'recordadmin-create' => 'Znajdź lub utwórz rekordy „$1”',
	'recordadmin-alreadyexist' => 'Niestety, „$1” już istnieje!',
	'recordadmin-createsuccess' => '$1 utworzony',
	'recordadmin-createerror' => 'Wystąpił błąd podczas próby utworzenia $1!',
	'recordadmin-badtitle' => 'Niepoprawny tytuł!',
	'recordadmin-recordid' => 'ID lub nazwa rekordu',
	'recordadmin-invert' => 'Odwróć wybór',
	'recordadmin-buttonsearch' => 'Szukaj',
	'recordadmin-buttoncreate' => 'Utwórz',
	'recordadmin-buttonreset' => 'Resetuj',
	'recordadmin-searchresult' => 'Wyniki wyszukiwania',
	'recordadmin-nomatch' => 'Nie znaleziono pasujących rekordów!',
	'recordadmin-typeupdated' => 'Właściwości $1 zaktualizowane',
	'recordadmin-buttonsave' => 'Zapisz',
	'recordadmin-noform' => 'Brak formularza współpracującego z rekordami „$1”!',
	'recordadmin-createlink' => 'utwórz',
	'recordadmin-newcreated' => 'Nowy $1 utworzono z publicznego formularza',
	'recordadmin-summary-typecreated' => 'Nowy $1 utworzony',
	'recordadmin-viewlink' => 'zobacz',
	'recordadmin-editlink' => 'edytuj',
	'recordadmin-created' => 'Utworzony',
	'recordadmin-modified' => 'Zmienione',
	'recordadmin-actions' => 'Operacje',
	'recordadmin-needscontent' => 'Dodaj zawartość...',
	'right-recordadmin' => 'Znajdywanie i edycja stron z rekordami danych',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Nie „$1”',
	'recordadmin-edit-info' => 'Ta strona zawiera szablony z formularzami, które można wypełnić korzystając z tego zestawu gotowych odpowiedzi',
	'recordadmin-properties' => 'Właściwości',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'recordadmin' => "Aministrassion d'anotassion",
	'recordadmin-desc' => 'Arserca, query, formolari e rapòrt ëd dat dla wiki derivà da paràmetr dë stamp',
	'recordadmin-specialdesc' => 'Na [[Special:RecordAdmin|pàgina special]] për trové e creé pàgine an dovrand ij formolari associà',
	'recordadmin-noforms' => 'A-i é pa gnun formolari al moment definì për serché e creé',
	'recordadmin-select' => 'Selession-a',
	'recordadmin-createtype' => "Anseriss ël nòm ëd na neuva sòrt d'anotassion da creé",
	'recordadmin-recordtype' => "sòrt d'anotassion",
	'recordadmin-newsearch' => 'Neuva $1 arserca',
	'recordadmin-newrecord' => "Selession-a n'àutra sòrt d'anotassion",
	'recordadmin-submit' => 'Spediss',
	'recordadmin-create' => 'Treuva o crea l\'anotassion "$1"',
	'recordadmin-alreadyexist' => 'Darmagi, "$1" a esist già!',
	'recordadmin-createsuccess' => 'Creà $1',
	'recordadmin-createerror' => "A l'é capitaje n'eror an tentand ëd creé ël $1!",
	'recordadmin-badtitle' => 'Tìtol pa bon!',
	'recordadmin-recordid' => 'ID anotassion/nòm:',
	'recordadmin-invert' => 'Anvert selession',
	'recordadmin-buttonsearch' => 'Serca',
	'recordadmin-buttoncreate' => 'Crea',
	'recordadmin-buttonreset' => 'Spian-a',
	'recordadmin-searchresult' => "Arzultà dl'arserca",
	'recordadmin-nomatch' => 'Pa gnun-e anotassion corispondente trovà!',
	'recordadmin-typeupdated' => 'Modificà $1 proprietà',
	'recordadmin-buttonsave' => 'Salva',
	'recordadmin-noform' => 'A-i é gnun formolari associà con l\'anotassion "$1"!',
	'recordadmin-createlink' => 'crea un',
	'recordadmin-newcreated' => "Creà $1 neuv da 'n formolari pùblich",
	'recordadmin-summary-typecreated' => 'Creà $1 neuv',
	'recordadmin-viewlink' => 'varda',
	'recordadmin-editlink' => 'modìfica',
	'recordadmin-created' => 'Creà',
	'recordadmin-modified' => 'Modificà',
	'recordadmin-actions' => 'Assion',
	'recordadmin-needscontent' => 'Gionté contnù ...',
	'right-recordadmin' => "Treuva e modifica pàgine d'anotassion",
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Pa gnun "$1"',
	'recordadmin-edit-info' => "Sta pàgina a conten djë stamp che a l'han ij sò pròpi formolari ch'it peule ampinì da sto tab-set",
	'recordadmin-properties' => 'Proprietà',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'recordadmin-select' => 'ټاکل',
	'recordadmin-newsearch' => 'د $1 نوې پلټنه',
	'recordadmin-submit' => 'سپارل',
	'recordadmin-createsuccess' => '$1 جوړ شو',
	'recordadmin-buttonsearch' => 'پلټنه',
	'recordadmin-buttoncreate' => 'جوړول',
	'recordadmin-searchresult' => 'د پلټنې پايلې',
	'recordadmin-buttonsave' => 'خوندي کول',
	'recordadmin-createlink' => 'يو جوړول',
	'recordadmin-summary-typecreated' => 'نوی $1 جوړ شو',
	'recordadmin-viewlink' => 'کتل',
	'recordadmin-editlink' => 'سمول',
	'recordadmin-created' => 'جوړ شوي',
	'recordadmin-modified' => 'بدلېدلي',
	'recordadmin-actions' => 'کړنې',
	'recordadmin-needscontent' => 'مېنځپانګه ورګډول ...',
);

/** Portuguese (Português)
 * @author Giro720
 * @author Hamilton Abreu
 * @author Malafaya
 * @author Waldir
 */
$messages['pt'] = array(
	'recordadmin' => 'Administração de registos',
	'recordadmin-desc' => 'Pesquisa, consultas, formulários e relatórios de dados da wiki derivados de parâmetros de predefinições',
	'recordadmin-specialdesc' => 'Uma [[Special:RecordAdmin|página especial]] para pesquisar e criar páginas usando formulários associados',
	'recordadmin-noforms' => 'Não existem formulários definidos para uso na pesquisa e criação de páginas',
	'recordadmin-select' => 'Seleccione o tipo de registo a gerir',
	'recordadmin-createtype' => 'Introduza o nome do novo tipo de registo a criar',
	'recordadmin-recordtype' => 'Tipo de registo',
	'recordadmin-newsearch' => 'Nova pesquisa $1',
	'recordadmin-newrecord' => 'Seleccionar outro tipo de registo',
	'recordadmin-submit' => 'Submeter',
	'recordadmin-create' => 'Procurar ou criar registos "$1"',
	'recordadmin-alreadyexist' => 'Desculpe, "$1" já existe!',
	'recordadmin-createsuccess' => '$1 criado',
	'recordadmin-createerror' => 'Ocorreu um erro ao tentar criar o $1!',
	'recordadmin-badtitle' => 'Título inválido!',
	'recordadmin-recordid' => 'ID/nome do registo:',
	'recordadmin-invert' => 'Inverter selecção',
	'recordadmin-buttonsearch' => 'Pesquisar',
	'recordadmin-buttoncreate' => 'Criar',
	'recordadmin-buttonreset' => 'Repor',
	'recordadmin-searchresult' => 'Resultados da pesquisa',
	'recordadmin-nomatch' => 'Não foram encontrados resultados correspondentes!',
	'recordadmin-typeupdated' => 'Propriedades de $1 actualizadas',
	'recordadmin-buttonsave' => 'Gravar',
	'recordadmin-noform' => 'Não há um formulário associado com registos "$1"!',
	'recordadmin-createlink' => 'criar um',
	'recordadmin-newcreated' => 'Novo $1 criado a partir de formulário público',
	'recordadmin-summary-typecreated' => 'Novo $1 criado',
	'recordadmin-viewlink' => 'ver',
	'recordadmin-editlink' => 'editar',
	'recordadmin-created' => 'Criado',
	'recordadmin-modified' => 'Modificado',
	'recordadmin-actions' => 'Acções',
	'recordadmin-needscontent' => 'Adicionar conteúdo...',
	'right-recordadmin' => 'Encontrar e editar páginas de registos',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => '"$1" não {{PLURAL:$1|existe|existem}}',
	'recordadmin-edit-info' => 'Esta página contém predefinições que têm formulários próprios, os quais pode preencher a partir deste grupo de separadores.',
	'recordadmin-properties' => 'Propriedades',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 * @author Giro720
 * @author Luckas Blade
 */
$messages['pt-br'] = array(
	'recordadmin' => 'Administração de registros',
	'recordadmin-desc' => 'Pesquisa, consultas, formulários e relatórios de dados da wiki derivados de parâmetros de predefinições',
	'recordadmin-specialdesc' => 'Uma [[Special:RecordAdmin|página especial]] para pesquisar e criar páginas usando formulários associados',
	'recordadmin-noforms' => 'Não existem formulários definidos para uso na pesquisa e criação de páginas',
	'recordadmin-select' => 'Selecione o tipo de registro a gerenciar',
	'recordadmin-createtype' => 'Introduza o nome do novo tipo de registo a criar',
	'recordadmin-recordtype' => 'Tipo de registro',
	'recordadmin-newsearch' => 'Nova pesquisa $1',
	'recordadmin-newrecord' => 'Selecionar outro tipo de registro',
	'recordadmin-submit' => 'Enviar',
	'recordadmin-create' => 'Procurar ou criar registros "$1"',
	'recordadmin-alreadyexist' => 'Desculpe, "$1" já existe!',
	'recordadmin-createsuccess' => '$1 criado',
	'recordadmin-createerror' => 'Ocorreu um erro ao tentar criar o $1!',
	'recordadmin-badtitle' => 'Título inválido!',
	'recordadmin-recordid' => 'ID/nome do registro:',
	'recordadmin-invert' => 'Inverter seleção',
	'recordadmin-buttonsearch' => 'Pesquisar',
	'recordadmin-buttoncreate' => 'Criar',
	'recordadmin-buttonreset' => 'Reiniciar',
	'recordadmin-searchresult' => 'Resultados da pesquisa',
	'recordadmin-nomatch' => 'Não foram encontrados resultados correspondentes!',
	'recordadmin-typeupdated' => 'Propriedades de $1 atualizadas',
	'recordadmin-buttonsave' => 'Gravar',
	'recordadmin-noform' => 'Não há um formulário associado com registros "$1"!',
	'recordadmin-createlink' => 'criar um',
	'recordadmin-newcreated' => 'Novo $1 criado a partir de formulário público',
	'recordadmin-summary-typecreated' => 'Novo $1 criado',
	'recordadmin-viewlink' => 'ver',
	'recordadmin-editlink' => 'editar',
	'recordadmin-created' => 'Criado',
	'recordadmin-modified' => 'Modificado',
	'recordadmin-actions' => 'Ações',
	'recordadmin-needscontent' => 'Adicione conteúdo...',
	'right-recordadmin' => 'Encontrar e editar páginas de registros',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Não {{PLURAL:$1|existe|existem}} "$1"',
	'recordadmin-edit-info' => 'Esta página contém predefinições que têm formulários próprios, os quais pode preencher a partir deste grupo de separadores.',
	'recordadmin-properties' => 'Propriedades',
);

/** Romanian (Română)
 * @author Firilacroco
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'recordadmin-select' => 'Selectați',
	'recordadmin-submit' => 'Trimite',
	'recordadmin-badtitle' => 'Titlu greșit!',
	'recordadmin-invert' => 'Inversează selecția',
	'recordadmin-buttonsearch' => 'Căutare',
	'recordadmin-buttoncreate' => 'Creare',
	'recordadmin-buttonreset' => 'Resetare',
	'recordadmin-buttonsave' => 'Salvare',
	'recordadmin-viewlink' => 'vedeți',
	'recordadmin-created' => 'Creat',
	'recordadmin-modified' => 'Modificat',
	'recordadmin-actions' => 'Acțiuni',
	'recordadmin-needscontent' => 'Adăugați conținut...',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'recordadmin-createsuccess' => '$1 ccrejete',
);

/** Russian (Русский)
 * @author Ferrer
 * @author Innv
 * @author Lockal
 * @author Rubin
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'recordadmin' => 'Администрирование записей',
	'recordadmin-desc' => 'Поиск, запросы, формы и отчёты по вики-данным, полученным из параметров шаблона',
	'recordadmin-specialdesc' => '[[Special:RecordAdmin|Служебная страница]] для поиска и создания страниц с помощью ассоциированных форм',
	'recordadmin-noforms' => 'Есть в настоящее время не определены формы для поиска и создания',
	'recordadmin-select' => 'Выбрать',
	'recordadmin-createtype' => 'Введите название нового типа записи для создания',
	'recordadmin-recordtype' => 'тип записи',
	'recordadmin-newsearch' => 'Новый поиск $1',
	'recordadmin-newrecord' => 'Выберите другой тип записи',
	'recordadmin-submit' => 'Отправить',
	'recordadmin-create' => 'Найти или создать запись «$1»',
	'recordadmin-alreadyexist' => 'Извините, «$1» уже существует !',
	'recordadmin-createsuccess' => '$1 создано',
	'recordadmin-createerror' => 'При создании $1 произошла ошибка!',
	'recordadmin-badtitle' => 'Неправильный заголовок!',
	'recordadmin-recordid' => 'ID/имя записи:',
	'recordadmin-invert' => 'Обратить выделение',
	'recordadmin-buttonsearch' => 'Найти',
	'recordadmin-buttoncreate' => 'Создать',
	'recordadmin-buttonreset' => 'Сбросить',
	'recordadmin-searchresult' => 'Результаты поиска',
	'recordadmin-nomatch' => 'Подходящие записи не найдены!',
	'recordadmin-typeupdated' => 'Обновлено $1 свойств',
	'recordadmin-buttonsave' => 'Сохранить',
	'recordadmin-noform' => 'Нет формы, ассоциированной с записями «$1»!',
	'recordadmin-createlink' => 'создать один',
	'recordadmin-newcreated' => 'Новый $1 создан через общедоступную форму',
	'recordadmin-summary-typecreated' => 'Создан новый $1',
	'recordadmin-viewlink' => 'просмотр',
	'recordadmin-editlink' => 'править',
	'recordadmin-created' => 'Создано',
	'recordadmin-modified' => 'Изменено',
	'recordadmin-actions' => 'Действия',
	'recordadmin-needscontent' => 'Добавить содержимое...',
	'right-recordadmin' => 'поиск и редактирование страниц записей',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Нет «$1»',
	'recordadmin-edit-info' => 'Эта страница содержит шаблоны, которые имеют свои собственные формы, которые можно заполнить с этого набора вкладок',
	'recordadmin-properties' => 'Свойства',
);

/** Rusyn (Русиньскый)
 * @author Gazeb
 */
$messages['rue'] = array(
	'recordadmin-select' => 'Выбрати',
	'recordadmin-submit' => 'Одослати',
	'recordadmin-buttonsearch' => 'Глядати',
	'recordadmin-buttoncreate' => 'Створити',
	'recordadmin-buttonreset' => 'Ресетовати',
	'recordadmin-searchresult' => 'Резултаты гляданя',
	'recordadmin-buttonsave' => 'Уложыти',
	'recordadmin-viewlink' => 'відїти',
	'recordadmin-editlink' => 'едітовати',
	'recordadmin-created' => 'Створено',
	'recordadmin-modified' => 'Змінено',
	'recordadmin-actions' => 'Дїї',
);

/** Serbo-Croatian (Srpskohrvatski / Српскохрватски)
 * @author OC Ripper
 */
$messages['sh'] = array(
	'recordadmin-submit' => 'Unesi',
	'recordadmin-invert' => 'Sve osim odabranog',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'recordadmin' => 'Správa záznamov',
	'recordadmin-desc' => '[[Special:RecordAdmin|Špeciálna stránka]] na hľadanie a úpravu stránok záznamov pomocou fomulára',
	'recordadmin-select' => 'Vyberte typ záznamu, ktorý chcete spravovať',
	'recordadmin-createtype' => 'Zadajte názov nového typu záznamu, ktorý sa má vytvoriť',
	'recordadmin-recordtype' => 'typ záznamu',
	'recordadmin-newsearch' => 'Nové hľadanie $1',
	'recordadmin-newrecord' => 'Vyberte iný typ záznamu',
	'recordadmin-submit' => 'Odoslať',
	'recordadmin-create' => 'Nájsť alebo vytvoriť záznamy „$1“',
	'recordadmin-alreadyexist' => 'Ľutujeme, „$1“ už existuje.',
	'recordadmin-createsuccess' => '„$1“ vytvorený',
	'recordadmin-createerror' => 'Vyskytla sa chyba pri pokuse o vytvorenie „$1“.',
	'recordadmin-badtitle' => 'Chybný názov!',
	'recordadmin-recordid' => 'ID/názov záznamu:',
	'recordadmin-invert' => 'Invertovať výber',
	'recordadmin-buttonsearch' => 'Hľadať',
	'recordadmin-buttoncreate' => 'Vytvoriť',
	'recordadmin-buttonreset' => 'Reset',
	'recordadmin-searchresult' => 'Výsledky hľadania',
	'recordadmin-nomatch' => 'Neboli nájdené žiadne zodpovedajúce záznamy!',
	'recordadmin-typeupdated' => 'vlastnosti $1 aktualizované',
	'recordadmin-buttonsave' => 'Uložiť',
	'recordadmin-noform' => 'So záznamami „$1“ nie je asociovaný žiadny formulár!',
	'recordadmin-createlink' => 'vytvoriť ho',
	'recordadmin-newcreated' => 'Nový $1 vytvorený z verejného fóra',
	'recordadmin-summary-typecreated' => 'Nový $1 vytvorený',
	'recordadmin-viewlink' => 'zobraziť',
	'recordadmin-editlink' => 'upraviť',
	'recordadmin-created' => 'Vytvorené',
	'recordadmin-modified' => 'Zmenené',
	'recordadmin-actions' => 'Operácie',
	'recordadmin-needscontent' => 'Pridať obsah...',
	'right-recordadmin' => 'Nájsť a upravovať stránky záznamov',
);

/** Slovenian (Slovenščina)
 * @author Dbc334
 */
$messages['sl'] = array(
	'recordadmin-buttonsave' => 'Shrani',
);

/** Serbian Cyrillic ekavian (Српски (ћирилица))
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'recordadmin-select' => 'Изабери',
	'recordadmin-submit' => 'Пошаљи',
	'recordadmin-alreadyexist' => 'Жао нам је, „$1“ већ постоји!',
	'recordadmin-createsuccess' => '$1 направљен',
	'recordadmin-badtitle' => 'Лош наслов!',
	'recordadmin-buttoncreate' => 'Направи',
	'recordadmin-buttonreset' => 'Ресетуј',
	'recordadmin-buttonsave' => 'Сними',
	'recordadmin-newcreated' => 'Нови $1 направљен са јавне форме',
	'recordadmin-summary-typecreated' => 'Нови $1 направљен',
	'recordadmin-viewlink' => 'види',
	'recordadmin-editlink' => 'измени',
	'recordadmin-created' => 'Направљено',
	'recordadmin-modified' => 'Измењено',
	'recordadmin-actions' => 'Акције',
	'recordadmin-needscontent' => 'Додај садржај...',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
);

/** Serbian Latin ekavian (Srpski (latinica))
 * @author Michaello
 */
$messages['sr-el'] = array(
	'recordadmin-select' => 'Izaberi',
	'recordadmin-submit' => 'Pošalji',
	'recordadmin-alreadyexist' => 'Žao nam je, „$1“ već postoji!',
	'recordadmin-createsuccess' => '$1 napravljen',
	'recordadmin-badtitle' => 'Loš naslov!',
	'recordadmin-buttoncreate' => 'Napravi',
	'recordadmin-buttonreset' => 'Resetuj',
	'recordadmin-buttonsave' => 'Snimi',
	'recordadmin-newcreated' => 'Novi $1 napravljen sa javne forme',
	'recordadmin-summary-typecreated' => 'Novi $1 napravljen',
	'recordadmin-viewlink' => 'vidi',
	'recordadmin-editlink' => 'izmeni',
	'recordadmin-created' => 'Napravljeno',
	'recordadmin-modified' => 'Izmenjeno',
	'recordadmin-actions' => 'Akcije',
	'recordadmin-needscontent' => 'Dodaj sadržaj...',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'recordadmin' => 'Apteekenge-Administrierenge',
	'recordadmin-desc' => 'Ne [[Special:RecordAdmin|spezielle Siede]] tou dät Fienden un Editierjen fon do Apteekenge-Sieden middels n Formular',
	'recordadmin-select' => 'Wääl dän tou ferwaltjene Apteekenge-Typ',
	'recordadmin-newsearch' => 'Näie $1-Säike',
	'recordadmin-newrecord' => 'Wääl n uur Apteekenge-Typ',
	'recordadmin-submit' => 'Uurmiddelje',
	'recordadmin-create' => 'Fiend of moakje "$1"-Apteekengen',
	'recordadmin-alreadyexist' => '"$1" existiert al!',
	'recordadmin-createsuccess' => '$1 moaked',
	'recordadmin-createerror' => 'Unner dät Moakjen fon $1 tried n Failer ap!',
	'recordadmin-badtitle' => 'Uungultigen Tittel!',
	'recordadmin-recordid' => 'Apteekengskannenge/-noome:',
	'recordadmin-invert' => 'Uutwoal uumekiere',
	'recordadmin-buttonsearch' => 'Säike',
	'recordadmin-buttoncreate' => 'Moak',
	'recordadmin-buttonreset' => 'Touräächsätte',
	'recordadmin-searchresult' => 'Säikresultoate',
	'recordadmin-nomatch' => 'Neen paasjende Apteekengen fuunen!',
	'recordadmin-typeupdated' => '$1 Wäide aktualisierd',
	'recordadmin-buttonsave' => 'Spiekerje',
	'recordadmin-noform' => 'Dät rakt neen Formular foar "$1"-Apteekengen!',
	'recordadmin-createlink' => 'moak een',
	'recordadmin-newcreated' => 'Näi $1 ap n eepentelk Formular moaked',
	'recordadmin-summary-typecreated' => 'Näi $1 moaked',
	'recordadmin-viewlink' => 'bekiekje',
	'recordadmin-editlink' => 'annerje',
	'recordadmin-created' => 'Moaked',
	'right-recordadmin' => 'Fiend un editier Apteekenge-Sieden',
);

/** Swedish (Svenska)
 * @author Dafer45
 * @author Fluff
 * @author Gabbe.g
 * @author Per
 */
$messages['sv'] = array(
	'recordadmin' => 'Rekordadministration',
	'recordadmin-desc' => 'En [[Special:RecordAdmin|specialsida]] för att hitta och ändra titelinformation med hjälp av ett formulär.',
	'recordadmin-select' => 'Välj',
	'recordadmin-newsearch' => 'Ny sökning efter $1',
	'recordadmin-alreadyexist' => 'Tyvärr, "$1" finns redan!',
	'recordadmin-createsuccess' => '$1 skapad',
	'recordadmin-badtitle' => 'Ogiltig titel!',
	'recordadmin-invert' => 'Invertera markering',
	'recordadmin-buttonsearch' => 'Sök',
	'recordadmin-buttoncreate' => 'Skapa',
	'recordadmin-buttonreset' => 'Återställ',
	'recordadmin-searchresult' => 'Sökresultat',
	'recordadmin-typeupdated' => '$1 egenskaper uppdaterade',
	'recordadmin-buttonsave' => 'Spara',
	'recordadmin-createlink' => 'skapa en',
	'recordadmin-summary-typecreated' => 'Ny $1 skapad',
	'recordadmin-viewlink' => 'visa',
	'recordadmin-editlink' => 'redigera',
	'recordadmin-created' => 'Skapad',
	'recordadmin-modified' => 'Ändrad',
	'recordadmin-actions' => 'Åtgärder',
	'recordadmin-needscontent' => 'Lägg till innehåll...',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'recordadmin-submit' => 'దాఖలుచేయి',
	'recordadmin-alreadyexist' => 'క్షమించండి, "$1" ఇప్పటికే ఉంది!',
	'recordadmin-badtitle' => 'తప్పు శీర్షిక!',
	'recordadmin-buttonsearch' => 'వెతుకు',
	'recordadmin-buttoncreate' => 'సృష్టించు',
	'recordadmin-searchresult' => 'అన్వేషణ ఫలితాలు',
	'recordadmin-buttonsave' => 'భద్రపరచు',
	'recordadmin-viewlink' => 'చూడు',
	'recordadmin-editlink' => 'మార్చు',
	'recordadmin-actions' => 'చర్యలు',
	'recordadmin-properties' => 'లక్షణాలు',
);

/** Thai (ไทย)
 * @author Mopza
 * @author Octahedron80
 */
$messages['th'] = array(
	'recordadmin-buttonsearch' => 'สืบค้น',
	'recordadmin-editlink' => 'แก้ไข',
);

/** Turkmen (Türkmençe)
 * @author Hanberke
 */
$messages['tk'] = array(
	'recordadmin-submit' => 'Tabşyr',
	'recordadmin-buttoncreate' => 'Döret',
	'recordadmin-buttonsave' => 'Ýazdyr',
	'recordadmin-editlink' => 'redaktirle',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'recordadmin' => 'Pangangasiwa ng tala (rekord)',
	'recordadmin-desc' => 'Paghahanap, mga pagtatanong, mga pormularyo at pag-uulat ng dato ng wiki na hinango mula sa mga parametro ng suleras',
	'recordadmin-specialdesc' => 'Isang [[Special:RecordAdmin|natatanging pahina]] para sa paghahanp at paglikha ng mga pahina na ginagamitan ng kaugnay na mga pormularyo',
	'recordadmin-noforms' => 'Kasalukuyang walang mga pormularyong tinukoy upang gamitin para sa paghahanap at paglikha',
	'recordadmin-select' => 'Piliin ang uri ng tala/rekord na hahanapin',
	'recordadmin-createtype' => 'Ipasok ang pangalan ng isang bagong uri ng talaang lilikhain',
	'recordadmin-recordtype' => 'uri ng talaan',
	'recordadmin-newsearch' => 'Bagong paghahanap ng $1',
	'recordadmin-newrecord' => 'Pumili ng iba pang uri ng tala/rekord',
	'recordadmin-submit' => 'Ipasa',
	'recordadmin-create' => 'Hanapin o likhain ang "$1" mga talaan',
	'recordadmin-alreadyexist' => 'Paumanhin, umiiral na ang "$1"!',
	'recordadmin-createsuccess' => '$1 nalikha na',
	'recordadmin-createerror' => 'Naganap ang isang kamalian habang sinusubok na likhain ang $1!',
	'recordadmin-badtitle' => 'Masamang pamagat!',
	'recordadmin-recordid' => 'ID ng talaan/pangalan:',
	'recordadmin-invert' => 'Baligtarin ang pagpipilian',
	'recordadmin-buttonsearch' => 'Maghanap/Hanapin',
	'recordadmin-buttoncreate' => 'Likhain',
	'recordadmin-buttonreset' => 'Muling itakda',
	'recordadmin-searchresult' => 'Kinalabasan/resulta ng paghahanap',
	'recordadmin-nomatch' => 'Walang natagpuang mga tala/rekord na tumutugma!',
	'recordadmin-typeupdated' => '$1 mga pag-aari ang naisapanahon na',
	'recordadmin-buttonsave' => 'Sagipin',
	'recordadmin-noform' => 'Walang pormularyong kaugnay ng "$1" mga tala/rekord!',
	'recordadmin-createlink' => 'lumikha ng isa',
	'recordadmin-newcreated' => 'Bagong $1 nalikha na mula sa pormularyong pangmadla/publiko',
	'recordadmin-summary-typecreated' => 'Bagong $1 nalikha na',
	'recordadmin-viewlink' => 'tingnan',
	'recordadmin-editlink' => 'baguhin',
	'recordadmin-created' => 'Nilikha na',
	'recordadmin-modified' => 'Binago',
	'recordadmin-actions' => 'Mga galaw',
	'recordadmin-needscontent' => 'Idagdag ang nilalaman...',
	'right-recordadmin' => 'Hanapin at baguhin ang mga pahina ng tala/rekord',
	'recordadmin-export-csv' => 'CSV',
	'recordadmin-export-pdf' => 'PDF',
	'recordadmin-notset' => 'Walang "$1"',
	'recordadmin-edit-info' => 'Ang pahinang ito ay naglalaman ng mga suleras na mayroong sarili nilang mga pormularyo na maaari mong punuin mula sa takdang-panglaylay na ito',
	'recordadmin-properties' => 'Mga katangiang-ari',
);

/** Turkish (Türkçe)
 * @author Karduelis
 * @author Vito Genovese
 */
$messages['tr'] = array(
	'recordadmin-recordtype' => 'kayıt türü',
	'recordadmin-submit' => 'Gönder',
	'recordadmin-badtitle' => 'Uygunsuz başlık!',
	'recordadmin-buttonsearch' => 'Ara',
	'recordadmin-buttoncreate' => 'Oluştur',
	'recordadmin-buttonreset' => 'Sıfırla',
	'recordadmin-searchresult' => 'Sonuçları ara',
	'recordadmin-nomatch' => 'Eşleşen kayıt bulunamadı!',
	'recordadmin-buttonsave' => 'Kaydet',
	'recordadmin-createlink' => 'bir tane oluştur',
	'recordadmin-viewlink' => 'gör',
	'recordadmin-editlink' => 'değiştir',
	'recordadmin-created' => 'Oluşturuldu',
	'recordadmin-modified' => 'Değiştirildi',
	'recordadmin-actions' => 'İşlemler',
	'recordadmin-needscontent' => 'İçerik ekle...',
);

/** Ukrainian (Українська)
 * @author Prima klasy4na
 */
$messages['uk'] = array(
	'recordadmin-buttonreset' => 'Скинути',
	'recordadmin-editlink' => 'ред.',
	'recordadmin-actions' => 'Дії',
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'recordadmin-select' => 'Valiče',
	'recordadmin-badtitle' => 'Vär pälkirjutez!',
	'recordadmin-buttonsearch' => 'Ectä',
	'recordadmin-buttoncreate' => 'Säta',
	'recordadmin-buttonreset' => 'Udištada',
	'recordadmin-viewlink' => 'kc.',
	'recordadmin-editlink' => 'redaktiruida',
	'recordadmin-created' => 'Sätud',
	'recordadmin-modified' => 'Toižetadud',
	'recordadmin-actions' => 'Tegendad',
	'recordadmin-needscontent' => 'Ližata südäimišt...',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'recordadmin' => 'Quản lý bản ghi',
	'recordadmin-desc' => 'Một [[Special:RecordAdmin|trang đặc biệt]] để tìm kiếm và sửa đổi các trang bản ghi bằng cách dùng một mẫu có sẵn',
	'recordadmin-select' => 'Chọn một loại bản ghi để quản lý',
	'recordadmin-newsearch' => 'Tìm $1 mới',
	'recordadmin-newrecord' => 'Chọn một loại bản ghi khác',
	'recordadmin-submit' => 'Đăng',
	'recordadmin-create' => 'Tìm hoặc tạo bản ghi “$1”',
	'recordadmin-alreadyexist' => 'Xin lỗi,  	 	 	“$1” đã tồn tại!',
	'recordadmin-buttonsearch' => 'Tìm kiếm',
	'recordadmin-buttoncreate' => 'Tạo',
	'recordadmin-buttonreset' => 'Mặc định lại',
	'recordadmin-searchresult' => 'Kết quả tìm kiếm',
	'recordadmin-buttonsave' => 'Lưu',
	'recordadmin-viewlink' => 'xem',
	'recordadmin-editlink' => 'sửa đổi',
	'recordadmin-actions' => 'Tác động',
	'recordadmin-needscontent' => 'Thêm nội dung…',
);

/** Yiddish (ייִדיש)
 * @author פוילישער
 */
$messages['yi'] = array(
	'recordadmin-buttonsearch' => 'זוכן',
	'recordadmin-buttonsave' => 'אויפֿהיטן',
	'recordadmin-editlink' => 'ענדערן',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gzdavidwong
 * @author Liangent
 * @author PhiLiP
 */
$messages['zh-hans'] = array(
	'recordadmin-select' => '选择',
	'recordadmin-submit' => '提交',
	'recordadmin-badtitle' => '标题错误！',
	'recordadmin-invert' => '反向选择',
	'recordadmin-buttonsearch' => '搜寻',
	'recordadmin-buttoncreate' => '创建',
	'recordadmin-buttonreset' => '重置',
	'recordadmin-searchresult' => '搜索结果',
	'recordadmin-buttonsave' => '保存',
	'recordadmin-viewlink' => '检视',
	'recordadmin-editlink' => '编辑',
	'recordadmin-created' => '已发起',
	'recordadmin-modified' => '曾修改',
	'recordadmin-actions' => '操作',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Gzdavidwong
 * @author Liangent
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'recordadmin-badtitle' => '標題錯誤！',
	'recordadmin-invert' => '反向選擇',
	'recordadmin-buttonsearch' => '搜尋',
	'recordadmin-buttonreset' => '重置',
	'recordadmin-buttonsave' => '保存',
	'recordadmin-viewlink' => '檢視',
	'recordadmin-editlink' => '編輯',
);

