<?php
/**
 * Internationalisation file for extension WebStore.
 *
 * @addtogroup Extensions
 */

$messages = array();

$messages['en'] = array(
	'inplace_access_disabled'          => 'Access to this service has been disabled for all clients.',
	'inplace_access_denied'            => 'This service is restricted by client IP.',
	'inplace_scaler_no_temp'           => 'No valid temporary directory.
Set $wgLocalTmpDirectory to a writeable directory.',
	'inplace_scaler_not_enough_params' => 'Not enough parameters.',
	'inplace_scaler_invalid_image'     => 'Invalid image, could not determine size.',
	'inplace_scaler_failed'            => 'An error was encountered during image scaling: $1',
	'inplace_scaler_no_handler'        => 'No handler for transforming this MIME type',
	'inplace_scaler_no_output'         => 'No transformation output file was produced.',
	'inplace_scaler_zero_size'         => 'Transformation produced a zero-sized output file.',

	'webstore-desc'          => 'Web-only (non-NFS) file storage middleware',
	'webstore_access'        => 'This service is restricted by client IP.',
	'webstore_path_invalid'  => 'The filename was invalid.',
	'webstore_dest_open'     => 'Unable to open destination file "$1".',
	'webstore_dest_lock'     => 'Failed to get lock on destination file "$1".',
	'webstore_dest_mkdir'    => 'Unable to create destination directory "$1".',
	'webstore_archive_lock'  => 'Failed to get lock on archive file "$1".',
	'webstore_archive_mkdir' => 'Unable to create archive directory "$1".',
	'webstore_src_open'      => 'Unable to open source file "$1".',
	'webstore_src_close'     => 'Error closing source file "$1".',
	'webstore_src_delete'    => 'Error deleting source file "$1".',

	'webstore_rename'      => 'Error renaming file "$1" to "$2".',
	'webstore_lock_open'   => 'Error opening lock file "$1".',
	'webstore_lock_close'  => 'Error closing lock file "$1".',
	'webstore_dest_exists' => 'Error, destination file "$1" exists.',
	'webstore_temp_open'   => 'Error opening temporary file "$1".',
	'webstore_temp_copy'   => 'Error copying temporary file "$1" to destination file "$2".',
	'webstore_temp_close'  => 'Error closing temporary file "$1".',
	'webstore_temp_lock'   => 'Error locking temporary file "$1".',
	'webstore_no_archive'  => 'Destination file exists and no archive was given.',

	'webstore_no_file'       => 'No file was uploaded.',
	'webstore_move_uploaded' => 'Error moving uploaded file "$1" to temporary location "$2".',

	'webstore_invalid_zone' => 'Invalid zone "$1".',

	'webstore_no_deleted'            => 'No archive directory for deleted files is defined.',
	'webstore_curl'                  => 'Error from cURL: $1',
	'webstore_404'                   => 'File not found.',
	'webstore_php_warning'           => 'PHP Warning: $1',
	'webstore_metadata_not_found'    => 'File not found: $1',
	'webstore_postfile_not_found'    => 'File to post not found.',
	'webstore_scaler_empty_response' => 'The image scaler gave an empty response with a 200 response code.
This could be due to a PHP fatal error in the scaler.',

	'webstore_invalid_response' => "Invalid response from server:

$1\n",
	'webstore_no_response'      => 'No response from server',
	'webstore_backend_error'    => "Error from storage server:

$1\n",
	'webstore_php_error'        => 'PHP errors were encountered:',
	'webstore_no_handler'       => 'No handler for transforming this MIME type',
);

/** Message documentation (Message documentation)
 * @author Jon Harald Søby
 * @author Purodha
 */
$messages['qqq'] = array(
	'webstore-desc' => 'Short desciption of this extension.
Shown in [[Special:Version]].
Do not translate or change tag names, or link anchors.',
	'webstore_404' => '{{Identical|File not found}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 * @author SPQRobin
 */
$messages['af'] = array(
	'inplace_scaler_not_enough_params' => 'Nie genoeg parameters nie.',
	'webstore_no_response' => 'Geen antwoord van die bediener',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'inplace_access_disabled' => 'الدخول إلى هذه الخدمة تم تعطيله لكل العملاء.',
	'inplace_access_denied' => 'هذه الخدمة مقيدة بواسطة أيبي عميل.',
	'inplace_scaler_no_temp' => 'لا مجلد مؤقت صحيح.
ضبط $wgLocalTmpDirectory لمجلد قابل للكتابة.',
	'inplace_scaler_not_enough_params' => 'لا محددات كافية.',
	'inplace_scaler_invalid_image' => 'صورة غير صحيحة، لم يمكن تحديد الحجم.',
	'inplace_scaler_failed' => 'حدث خطأ أثناء وزن الصورة: $1',
	'inplace_scaler_no_handler' => 'لا وسيلة لتحويل نوع MIME هذا',
	'inplace_scaler_no_output' => 'لا ملف تحويل خارج تم إنتاجه.',
	'inplace_scaler_zero_size' => 'التحويل أنتج ملف خروج حجمه صفر.',
	'webstore_access' => 'هذه الخدمة مقيدة بواسطة أيبي عميل.',
	'webstore_path_invalid' => 'اسم الملف كان غير صحيح.',
	'webstore_dest_open' => 'غير قادر على فتح الملف الهدف "$1".',
	'webstore_dest_lock' => 'فشل في الغلق على ملف الوجهة "$1".',
	'webstore_dest_mkdir' => 'غير قادر على إنشاء مجلد الوجهة "$1".',
	'webstore_archive_lock' => 'فشل في الغلق على ملف الأرشيف "$1".',
	'webstore_archive_mkdir' => 'غير قادر على إنشاء مجلد الأرشيف "$1".',
	'webstore_src_open' => 'غير قادر على فتح ملف المصدر "$1".',
	'webstore_src_close' => 'خطأ أثناء إغلاق ملف المصدر "$1".',
	'webstore_src_delete' => 'خطأ أثناء حذف ملف المصدر "$1".',
	'webstore_rename' => 'خطأ أثناء إعادة تسمية الملف "$1" إلى "$2".',
	'webstore_lock_open' => 'خطأ أثناء فتح غلق الملف "$1".',
	'webstore_lock_close' => 'خطأ أثناء إغلاق غلق الملف "$1".',
	'webstore_dest_exists' => 'خطأ، ملف الوجهة "$1" موجود.',
	'webstore_temp_open' => 'خطأ أثناء فتح الملف المؤقت "$1".',
	'webstore_temp_copy' => 'خطأ أثناء نسخ الملف المؤقت "$1" لملف الوجهة "$2".',
	'webstore_temp_close' => 'خطأ أثناء إغلاق الملف المؤقت "$1".',
	'webstore_temp_lock' => 'خطأ غلق الملف المؤقت "$1".',
	'webstore_no_archive' => 'ملف الوجهة موجود ولم يتم إعطاء أرشيف.',
	'webstore_no_file' => 'لم يتم رفع أي ملف.',
	'webstore_move_uploaded' => 'خطأ أثناء نقل الملف المرفوع "$1" إلى الموقع المؤقت "$2".',
	'webstore_invalid_zone' => 'منطقة غير صحيحة "$1".',
	'webstore_no_deleted' => 'لم يتم تعريف مجلد أرشيف للملفات المحذوفة.',
	'webstore_curl' => 'خطأ من cURL: $1',
	'webstore_404' => 'لم يتم إيجاد الملف.',
	'webstore_php_warning' => 'تحذير PHP: $1',
	'webstore_metadata_not_found' => 'الملف غير موجود: $1',
	'webstore_postfile_not_found' => 'الملف للإرسال غير موجود.',
	'webstore_scaler_empty_response' => 'وازن الصورة أعطى ردا فارغا مع 200 كود رد. هذا يمكن أن يكون نتيجة خطأ PHP قاتل في الوازن.',
	'webstore_invalid_response' => 'رد غير صحيح من الخادم:

$1',
	'webstore_no_response' => 'لا رد من الخادم',
	'webstore_backend_error' => 'خطأ من خادم التخزين:

$1',
	'webstore_php_error' => 'حدثت أخطاء PHP:',
	'webstore_no_handler' => 'لا وسيلة لتحويل نوع MIME هذا',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 */
$messages['arz'] = array(
	'inplace_access_disabled' => 'الدخول إلى هذه الخدمة تم تعطيله لكل العملاء.',
	'inplace_access_denied' => 'هذه الخدمة مقيدة بواسطة أيبى عميل.',
	'inplace_scaler_no_temp' => 'لا مجلد مؤقت صحيح.
ضبط $wgLocalTmpDirectory لمجلد قابل للكتابة.',
	'inplace_scaler_not_enough_params' => 'لا محددات كافية.',
	'inplace_scaler_invalid_image' => 'صورة غير صحيحة، لم يمكن تحديد الحجم.',
	'inplace_scaler_failed' => 'حدث خطأ أثناء وزن الصورة: $1',
	'inplace_scaler_no_handler' => 'لا وسيلة لتحويل نوع MIME هذا',
	'inplace_scaler_no_output' => 'لا ملف تحويل خارج تم إنتاجه.',
	'inplace_scaler_zero_size' => 'التحويل أنتج ملف خروج حجمه صفر.',
	'webstore_access' => 'هذه الخدمة مقيدة بواسطة أيبى عميل.',
	'webstore_path_invalid' => 'اسم الملف كان غير صحيح.',
	'webstore_dest_open' => 'غير قادر على فتح الملف الهدف "$1".',
	'webstore_dest_lock' => 'فشل فى الغلق على ملف الوجهة "$1".',
	'webstore_dest_mkdir' => 'غير قادر على إنشاء مجلد الوجهة "$1".',
	'webstore_archive_lock' => 'فشل فى الغلق على ملف الأرشيف "$1".',
	'webstore_archive_mkdir' => 'غير قادر على إنشاء مجلد الأرشيف "$1".',
	'webstore_src_open' => 'غير قادر على فتح ملف المصدر "$1".',
	'webstore_src_close' => 'خطأ أثناء إغلاق ملف المصدر "$1".',
	'webstore_src_delete' => 'خطأ أثناء حذف ملف المصدر "$1".',
	'webstore_rename' => 'خطأ أثناء إعادة تسمية الملف "$1" إلى "$2".',
	'webstore_lock_open' => 'خطأ أثناء فتح غلق الملف "$1".',
	'webstore_lock_close' => 'خطأ أثناء إغلاق غلق الملف "$1".',
	'webstore_dest_exists' => 'خطأ، ملف الوجهة "$1" موجود.',
	'webstore_temp_open' => 'خطأ أثناء فتح الملف المؤقت "$1".',
	'webstore_temp_copy' => 'خطأ أثناء نسخ الملف المؤقت "$1" لملف الوجهة "$2".',
	'webstore_temp_close' => 'خطأ أثناء إغلاق الملف المؤقت "$1".',
	'webstore_temp_lock' => 'خطأ غلق الملف المؤقت "$1".',
	'webstore_no_archive' => 'ملف الوجهة موجود ولم يتم إعطاء أرشيف.',
	'webstore_no_file' => 'لم يتم رفع أى ملف.',
	'webstore_move_uploaded' => 'خطأ أثناء نقل الملف المرفوع "$1" إلى الموقع المؤقت "$2".',
	'webstore_invalid_zone' => 'منطقة غير صحيحة "$1".',
	'webstore_no_deleted' => 'لم يتم تعريف مجلد أرشيف للملفات المحذوفة.',
	'webstore_curl' => 'خطأ من cURL: $1',
	'webstore_404' => 'لم يتم إيجاد الملف.',
	'webstore_php_warning' => 'تحذير PHP: $1',
	'webstore_metadata_not_found' => 'الملف غير موجود: $1',
	'webstore_postfile_not_found' => 'الملف للإرسال غير موجود.',
	'webstore_scaler_empty_response' => 'وازن الصورة أعطى ردا فارغا مع 200 كود رد. هذا يمكن أن يكون نتيجة خطأ PHP قاتل فى الوازن.',
	'webstore_invalid_response' => 'رد غير صحيح من الخادم:

$1',
	'webstore_no_response' => 'لا رد من الخادم',
	'webstore_backend_error' => 'خطأ من خادم التخزين:

$1',
	'webstore_php_error' => 'حدثت أخطاء PHP:',
	'webstore_no_handler' => 'لا وسيلة لتحويل نوع MIME هذا',
);

/** Bikol Central (Bikol Central)
 * @author Filipinayzd
 */
$messages['bcl'] = array(
	'webstore_no_response' => 'Mayong simbag hali sa server',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'inplace_access_disabled' => 'Достъпът до тази услуга е изключен за всички клиенти.',
	'inplace_access_denied' => 'Тази услуга е ограничена по клиентски IP адрес.',
	'inplace_scaler_no_temp' => 'Няма валидна временна директория.
Посочете в $wgLocalTmpDirectory директория с права за запис.',
	'inplace_scaler_not_enough_params' => 'Няма достатъчно параметри',
	'inplace_scaler_invalid_image' => 'Невалидна картинка, размерът й е невъзможно да бъде определен.',
	'inplace_scaler_failed' => 'Възникна грешка при скалирането на картинката: $1',
	'webstore_access' => 'Тази услуга е ограничена по клиентски IP адрес.',
	'webstore_path_invalid' => 'Името на файла е невалидно.',
	'webstore_dest_open' => 'Целевият файл „$1“ не може да бъде отворен.',
	'webstore_dest_mkdir' => 'Невъзможно е да бъде създадена целевата директория „$1“.',
	'webstore_archive_lock' => 'Неуспех при опит за заключване на архивния файл „$1“.',
	'webstore_archive_mkdir' => 'Невъзможно е да бъде създадена архивната директория „$1“.',
	'webstore_src_open' => 'Файлът-източник „$1“ не може да бъде отворен.',
	'webstore_src_close' => 'Грешка при затваряне на файла-източник „$1“.',
	'webstore_src_delete' => 'Грешка при изтриване на файла-източник „$1“.',
	'webstore_rename' => 'Грешка при преименуване на файла „$1“ като „$2“.',
	'webstore_lock_open' => 'Възникна грешка при отваряне на заключващия файл „$1“.',
	'webstore_lock_close' => 'Възникна грешка при затваряне на заключващия файл „$1“.',
	'webstore_dest_exists' => 'Грешка, целевият файл „$1“ съществува.',
	'webstore_temp_open' => 'Грешка при отваряне на временния файл „$1“.',
	'webstore_temp_copy' => 'Грешка при копиране на временния файл „$1“ като целеви файл „$2“.',
	'webstore_temp_close' => 'Грешка при затваряне на временния файл "$1".',
	'webstore_temp_lock' => 'Грешка при заключване на временния файл "$1".',
	'webstore_no_archive' => 'Целевият файл съществува и не е посочен архив.',
	'webstore_no_file' => 'Не беше качен файл.',
	'webstore_move_uploaded' => 'Грешка при преместване на качения файл „$1“ във временния склад „$2“.',
	'webstore_invalid_zone' => 'Невалидна зона "$1".',
	'webstore_no_deleted' => 'Не е указана архивна директория за изтритите файлове.',
	'webstore_curl' => 'Грешка от cURL: $1',
	'webstore_404' => 'Файлът не беше намерен.',
	'webstore_php_warning' => 'PHP Предупреждение: $1',
	'webstore_metadata_not_found' => 'Файлът не беше намерен: $1',
	'webstore_postfile_not_found' => 'Файлът за публикуване не беше открит.',
	'webstore_invalid_response' => 'Невалиден отговор от сървъра:

$1',
	'webstore_no_response' => 'Няма отговор от сървъра',
	'webstore_backend_error' => 'Грешка от складовия сървър:

$1',
	'webstore_php_error' => 'Възникнаха следните PHP грешки:',
);

/** Bengali (বাংলা)
 * @author Zaheen
 */
$messages['bn'] = array(
	'webstore_php_warning' => 'পিএইচপি সতর্কীকরণ: $1',
	'webstore_metadata_not_found' => 'ফাইল খুঁজে পাওয়া যায়নি: $1',
	'webstore_postfile_not_found' => 'পোস্ট করার জন্য ফাইল খুঁজে পাওয়া যায়নি।',
	'webstore_scaler_empty_response' => 'ছবি মাপবর্ধকটি ২০০নং উত্তর কোডসহ একটি খালি উত্তর পাঠিয়েছে। মাপবর্ধকে পিএইচপি অসমাধানযোগ্য ত্রুটির কারণে এটি হতে পারে।',
	'webstore_invalid_response' => 'সার্ভার থেকে অবৈধ উত্তর এসেছে:


$1',
	'webstore_no_response' => 'সার্ভার কোন উত্তর দিচ্ছে না',
	'webstore_backend_error' => 'স্টোরেজ সার্ভার থেকে প্রাপ্ত ত্রুটি:

$1',
	'webstore_php_error' => 'পিএইচপি ত্রুটি ঘটেছে:',
	'webstore_no_handler' => 'এই MIME ধরনটি রূপান্তরের জন্য কোন হ্যান্ডলার নেই',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'inplace_access_disabled' => "Diweredekaet eo ar moned d'ar servij-mañ evit an holl bratikoù.",
	'inplace_access_denied' => 'Bevennet eo ar servij-mañ diouzh IP ar pratik.',
	'inplace_scaler_no_temp' => 'N\'eus teul padennek reizh ebet, ret eo da $wgLocalTmpDirectory bezañ ennañ anv un teul gant gwirioù skrivañ.',
	'inplace_scaler_not_enough_params' => 'Diouer a arventennoù zo',
	'inplace_scaler_invalid_image' => 'Skeudenn direizh, dibosupl termeniñ ar vent.',
	'inplace_scaler_failed' => "C'hoarvezet ez eus ur fazi e-ser gwaskañ/diwaskañ ar skeudenn : $1",
	'inplace_scaler_no_handler' => "Arc'hwel ebet evit treuzfurmiñ ar furmad MIME-se",
	'inplace_scaler_no_output' => "N'eus bet krouet restr dreuzfurmiñ ebet.",
	'inplace_scaler_zero_size' => 'Krouet ez eus bet ur restr gant ur vent mann gant an treuzfumadur.',
	'webstore_access' => "Bevennet eo ar servij-mañ diouzh chomlec'h IP ar pratik.",
	'webstore_path_invalid' => 'Direizh eo anv ar restr.',
	'webstore_dest_open' => 'Dibosupl digeriñ ar restr bal "$1".',
	'webstore_dest_lock' => 'C\'hwitet ar prennañ war ar restr bal "$1".',
	'webstore_dest_mkdir' => 'Dibosupl krouiñ ar c\'havlec\'h pal "$1".',
	'webstore_archive_lock' => 'C\'hwitet ar prennañ war ar restr diellaouet "$1".',
	'webstore_archive_mkdir' => 'Dibosupl krouiñ ar c\'havlec\'h diellaouiñ "$1".',
	'webstore_src_open' => 'Dibosupl digeriñ ar restr tarzh "$1".',
	'webstore_src_close' => 'Fazi en ur serriñ ar restr tarzh "$1".',
	'webstore_src_delete' => 'Fazi en ur ziverkañ ar restr tarzh "$1".',
	'webstore_rename' => 'Fazi en ur adenvel ar restr "$1" e "$2"..',
	'webstore_lock_open' => 'Fazi en ur zigeriñ ar restr prennet "$1".',
	'webstore_lock_close' => 'Fazi en ur serriñ ar restr prennet "$1".',
	'webstore_dest_exists' => 'Fazi, krouet eo bet ar restr bal "$1" dija.',
	'webstore_temp_open' => 'Fazi en ur zigeriñ ar restr padennek "$1".',
	'webstore_temp_copy' => 'Fazi en ur eilañ ar restr padennek "$1" war-du ar restr bal "$2".',
	'webstore_temp_close' => 'Fazi en ur serriñ ar restr padennek "$1".',
	'webstore_temp_lock' => 'Fazi en ur brennañ ar restr padennek "$1".',
	'webstore_no_archive' => "Bez'ez eus eus ar restr bal met n'eus bet roet diell ebet.",
	'webstore_no_file' => "N'eus bet enporzhiet restr ebet.",
	'webstore_move_uploaded' => 'Fazi en ur zilec\'hiañ ar restr enporzhiet "$1" war-du al lec\'h da c\'hortoz "$2".',
	'webstore_invalid_zone' => 'Takad "$1" direizh.',
	'webstore_no_deleted' => "N'eus bet spisaet kavlec'h diellaouiñ ebet evit ar restroù diverket.",
	'webstore_curl' => 'Fazi adal cURL: $1',
	'webstore_404' => "N'eo ket bet kavet ar restr.",
	'webstore_php_warning' => 'Kemenn PHP : $1',
	'webstore_metadata_not_found' => "N'eo ket bet kavet ar restr : $1",
	'webstore_postfile_not_found' => "N'eo ket bet kavet ar restr da enrollañ.",
	'webstore_scaler_empty_response' => "Distroet ez eus bet ur respont goullo hag ur c'hod 200 respont gant standilhonadur ar skeudenn. Marteze diwar ur fazi standilhonañ.",
	'webstore_invalid_response' => 'Respont direizh digant ar servijer :

$1',
	'webstore_no_response' => 'Direspont eo ar servijer.',
	'webstore_backend_error' => 'Fazi gant ar servijer stokañ :  

$1',
	'webstore_php_error' => 'Setu ar fazioù PHP bet kavet :',
	'webstore_no_handler' => "N'haller ket treuzfurmiñ ar seurt MIME-mañ.",
);

/** German (Deutsch)
 * @author ChrisiPK
 * @author Leithian
 * @author Revolus
 */
$messages['de'] = array(
	'inplace_access_disabled' => 'Der Zugriff auf diesen Service wurde für alle Clients deaktiviert.',
	'inplace_access_denied' => 'Der Zugriff auf diesen Service wird durch die IP-Adresse des Clients reguliert.',
	'inplace_scaler_no_temp' => 'Kein gültiges temporäres Verzeichnis.
Setze $wgLocalTmpDirectory auf ein Verzeichnis mit Schreibzugriff.',
	'inplace_scaler_not_enough_params' => 'Zu wenige Parameter.',
	'inplace_scaler_invalid_image' => 'Ungültiges Bild, Größe konnte nicht festgestellt werden.',
	'inplace_scaler_failed' => 'Beim Skalieren des Bildes ist ein Fehler aufgetreten: $1',
	'inplace_scaler_no_handler' => 'Keine Routine zur Transformation dieses MIME-Typ vorhanden',
	'inplace_scaler_no_output' => 'Die Transformation erzeugte keine Ausgabedatei.',
	'inplace_scaler_zero_size' => 'Die Transformation erzeugte eine Ausgabedatei der Länge Null.',
	'webstore_access' => 'Der Zugriff auf diesen Service wird durch die IP-Adresse des Clients reguliert.',
	'webstore_path_invalid' => 'Der Dateiname war ungültig.',
	'webstore_dest_open' => 'Zieldatei „$1“ kann nicht geöffnet werden.',
	'webstore_dest_lock' => 'Zieldatei „$1“ kann nicht gesperrt werden.',
	'webstore_dest_mkdir' => 'Zielverzeichnis „$1“ kann nicht erstellt werden.',
	'webstore_archive_lock' => 'Archivdatei „$1“ kann nicht gesperrt werden.',
	'webstore_archive_mkdir' => 'Archivverzeichnis „$1“ kann nicht erstellt werden.',
	'webstore_src_open' => 'Quelldatei „$1“ kann nicht geöffnet werden.',
	'webstore_src_close' => 'Fehler beim Schließen von Quelldatei „$1“.',
	'webstore_src_delete' => 'Fehler beim Löschen von Quelldatei „$1“.',
	'webstore_rename' => 'Fehler beim Umbenennen der Datei „$1“ zu „$2“.',
	'webstore_lock_open' => 'Fehler beim Öffnen der Lockdatei „$1“.',
	'webstore_lock_close' => 'Fehler beim Schließen der Lockdatei „$1“.',
	'webstore_dest_exists' => 'Fehler, Zieldatei „$1“ existiert.',
	'webstore_temp_open' => 'Kann temporäre Datei „$1“ nicht öffnen.',
	'webstore_temp_copy' => 'Fehler beim Kopieren der temporären Datei „$1“ zur Zieldatei „$2“.',
	'webstore_temp_close' => 'Fehler beim Schließen der temporären Datei „$1“.',
	'webstore_temp_lock' => 'Fehler beim Sperren der temporären Datei „$1“.',
	'webstore_no_archive' => 'Zieldatei existiert und kein Archiv wurde angegeben.',
	'webstore_no_file' => 'Es wurde keine Datei hochgeladen.',
	'webstore_move_uploaded' => 'Fehler beim Verschieben der hochgeladenen Datei „$1“ zum Zwischenspeicherort „$2“.',
	'webstore_invalid_zone' => 'Ungültige Zone „$1“.',
	'webstore_no_deleted' => 'Es wurde kein Archivverzeichnis für gelöschte Dateien definiert.',
	'webstore_curl' => 'Fehler von cURL: $1',
	'webstore_404' => 'Datei nicht gefunden.',
	'webstore_php_warning' => 'PHP-Warnung: $1',
	'webstore_metadata_not_found' => 'Datei nicht gefunden: $1',
	'webstore_postfile_not_found' => 'Keine Datei zum Einstellen gefunden.',
	'webstore_scaler_empty_response' => 'Der Bildskalierer hat eine leere Antwort mit dem Antwortcode 200 zurückgegeben.
Dies könnte durch einen fatalen PHP-Fehler im Skalierer verursacht werden.',
	'webstore_invalid_response' => 'Ungültige Antwort vom Server:

$1',
	'webstore_no_response' => 'Keine Antwort vom Server',
	'webstore_backend_error' => 'Fehler vom Speicherserver:

$1',
	'webstore_php_error' => 'Es traten PHP-Fehler auf:',
	'webstore_no_handler' => 'Keine Routine zur Transformation dieses MIME-Typ vorhanden',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author ChrisiPK
 */
$messages['de-formal'] = array(
	'inplace_scaler_no_temp' => 'Kein gültiges temporäres Verzeichnis.
Setzen Sie $wgLocalTmpDirectory auf ein Verzeichnis mit Schreibzugriff.',
);

/** Greek (Ελληνικά)
 * @author Consta
 */
$messages['el'] = array(
	'webstore_invalid_zone' => 'Άκυρη ζώνη "$1".',
	'webstore_404' => 'Το αρχείο δεν βρέθηκε.',
	'webstore_metadata_not_found' => 'Το Αρχείο δεν βρέθηκε: $1',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'inplace_access_denied' => 'Ĉi tiu servo estas limigita laŭ klienta IP-adreso.',
	'inplace_scaler_not_enough_params' => 'Ne sufiĉaj parametroj',
	'inplace_scaler_invalid_image' => 'Nevalida bildo; ne eblis determini pezon.',
	'webstore_access' => 'Ĉi tiu servo estas limigita laŭ klienta IP-adreso.',
	'webstore_path_invalid' => 'La dosiernomo estis nevalida.',
	'webstore_src_open' => 'Neeblas malfermi fontdosiero "$1".',
	'webstore_lock_close' => 'Eraro fermante ŝlosan dosieron "$1".',
	'webstore_dest_exists' => 'Eraro: Destina dosiero "$1" ekzistas.',
	'webstore_temp_open' => 'Eraro malfermante laboran dosieron "$1".',
	'webstore_temp_close' => 'Eraro fermante provizoran dosieron "$1".',
	'webstore_temp_lock' => 'Eraro ŝlosante provizoran dosieron "$1".',
	'webstore_no_file' => 'Neniu dosiero estis alŝutita.',
	'webstore_invalid_zone' => 'Nevalida zono "$1".',
	'webstore_curl' => 'Eraro de cURL: $1',
	'webstore_404' => 'Dosiero ne troviĝis.',
	'webstore_php_warning' => 'PHP-Averto: $1',
	'webstore_metadata_not_found' => 'Dosiero ne trovita: $1',
	'webstore_postfile_not_found' => 'Dosiero por afiŝado ne estis trovita.',
	'webstore_invalid_response' => 'Nevalida respondo de servilo:

$1',
	'webstore_no_response' => 'Servilo ne respondis',
	'webstore_backend_error' => 'Eraro de dosieruja servilo:

$1',
	'webstore_php_error' => 'Jen eraroj PHP:',
);

/** Extremaduran (Estremeñu)
 * @author Better
 */
$messages['ext'] = array(
	'webstore_rename' => 'Marru rehucheandu el archivu "$1" a "$2".',
	'webstore_no_file' => 'Nu s´á empuntau dengún archivu.',
	'webstore_404' => 'Archivu nu alcuentrau.',
);

/** French (Français)
 * @author Crochet.david
 * @author Dereckson
 * @author Grondin
 * @author Sherbrooke
 * @author Urhixidur
 */
$messages['fr'] = array(
	'inplace_access_disabled' => "L'accès à ce service est désactivé pour tous les clients.",
	'inplace_access_denied' => 'Ce service est restreint sur la base de l’IP du client.',
	'inplace_scaler_no_temp' => "Aucun dossier temporaire valide, \$wgLocalTmpDirectory doit contenir le nom d'un dossier avec droits d'écriture.",
	'inplace_scaler_not_enough_params' => 'Pas suffisamment de paramètres',
	'inplace_scaler_invalid_image' => 'Image incorrecte, ne peut déterminer sa taille',
	'inplace_scaler_failed' => "Une erreur est survenue pendant la décompression/compression (« scaling ») de l'image : $1",
	'inplace_scaler_no_handler' => 'Aucune fonction (« handler ») pour transformer ce format MIME.',
	'inplace_scaler_no_output' => 'Aucun fichier de transformation généré',
	'inplace_scaler_zero_size' => 'La transformation a créé un fichier de taille zéro.',
	'webstore-desc' => 'Intergiciel de stockage de fichiers pour Internet uniquement (non NFS)',
	'webstore_access' => 'Ce service est restreint par adresse IP.',
	'webstore_path_invalid' => "Le nom de fichier n'est pas correct.",
	'webstore_dest_open' => "Impossible d'ouvrir le fichier de destination « $1 ».",
	'webstore_dest_lock' => 'Échec d’obtention du verrou sur le fichier de destination « $1 ».',
	'webstore_dest_mkdir' => 'Impossible de créer le répertoire « $1 ».',
	'webstore_archive_lock' => 'Échec d’obtention du verrou du fichier archivé « $1 ».',
	'webstore_archive_mkdir' => "Impossible de créer le répertoire d'archivage « $1 ».",
	'webstore_src_open' => 'Impossible d’ouvrir le fichier source « $1 ».',
	'webstore_src_close' => 'Erreur de fermeture du fichier source « $1 ».',
	'webstore_src_delete' => 'Erreur de suppression du fichier source « $1 ».',
	'webstore_rename' => 'Erreur de renommage du fichier « $1 » en « $2 ».',
	'webstore_lock_open' => "Erreur d'ouverture du fichier verrouillé « $1 ».",
	'webstore_lock_close' => 'Erreur de fermeture du fichier verrouillé « $1 ».',
	'webstore_dest_exists' => 'Erreur, le fichier de destination « $1 » existe.',
	'webstore_temp_open' => "Erreur d'ouverture du fichier temporaire « $1 ».",
	'webstore_temp_copy' => 'Erreur de copie du fichier temporaire « $1 » vers le fichier de destination « $2 ».',
	'webstore_temp_close' => 'Erreur de fermeture du fichier temporaire « $1 ».',
	'webstore_temp_lock' => 'Erreur de verrouillage du fichier temporaire « $1 ».',
	'webstore_no_archive' => "Le fichier de destination existe et aucune archive n'a été donnée.",
	'webstore_no_file' => 'Aucun fichier n’a été importé.',
	'webstore_move_uploaded' => 'Erreur de déplacement du fichier importé « $1 » vers l’emplacement temporaire « $2 ».',
	'webstore_invalid_zone' => 'Zone « $1 » invalide.',
	'webstore_no_deleted' => "Aucun répertoire d’archive pour les fichiers supprimés n'a été défini.",
	'webstore_curl' => 'Erreur depuis cURL : $1',
	'webstore_404' => 'Fichier non trouvé.',
	'webstore_php_warning' => 'PHP Warning: $1',
	'webstore_metadata_not_found' => 'Fichier non trouvé : $1',
	'webstore_postfile_not_found' => 'Fichier à enregistrer non trouvé.',
	'webstore_scaler_empty_response' => "L’échantillonnage de l'image a donné une réponse nulle avec un code de réponse 200.
Ceci pourrait être dû à une erreur de l'échantillonage.",
	'webstore_invalid_response' => 'Réponse invalide depuis le serveur : 

$1',
	'webstore_no_response' => 'Le serveur ne répond pas',
	'webstore_backend_error' => 'Erreur depuis le serveur de stockage : 

$1',
	'webstore_php_error' => 'Les erreurs PHP suivantes sont survenues :',
	'webstore_no_handler' => 'Ce type MIME ne peut être transformé.',
);

/** Irish (Gaeilge)
 * @author Alison
 */
$messages['ga'] = array(
	'webstore_src_open' => 'Ní féidir comhad foinsí "$1" a oscailt.',
	'webstore_src_close' => 'Earráid dunadh comhad foinsí "$1".',
	'webstore_src_delete' => 'Earráid scriosadh comhad foinsí "$1".',
);

/** Galician (Galego)
 * @author Toliño
 * @author Xosé
 */
$messages['gl'] = array(
	'inplace_access_disabled' => 'Desactivouse o acceso a este servizo para todos os clientes.',
	'inplace_access_denied' => 'Este servizo está restrinxido polo IP do cliente.',
	'inplace_scaler_no_temp' => 'Non é un directorio temporal válido; configure $wgLocalTmpDirectory nun directorio no que se poida escribir.',
	'inplace_scaler_not_enough_params' => 'Os parámetros son insuficientes.',
	'inplace_scaler_invalid_image' => 'A imaxe non é válida, non se puido determinar o seu tamaño.',
	'inplace_scaler_failed' => 'Atopouse un erro mentres se ampliaba a imaxe: $1',
	'inplace_scaler_no_handler' => 'Non se definiu un programa para transformar este tipo MIME',
	'inplace_scaler_no_output' => 'Non se produciu ningún ficheiro de saída da transformación.',
	'inplace_scaler_zero_size' => 'A transformación produciu un ficheiro de saída de tamaño 0.',
	'webstore-desc' => 'Almacenamento de ficheiros na páxina web (non no sistema de ficheiros de rede)',
	'webstore_access' => 'Este servizo está restrinxido polo IP do cliente.',
	'webstore_path_invalid' => 'O nome do ficheiro non era válido.',
	'webstore_dest_open' => 'Foi imposíbel abrir o ficheiro de destino "$1".',
	'webstore_dest_lock' => 'Non se puido bloquear o ficheiro de destino "$1".',
	'webstore_dest_mkdir' => 'Non se puido crear o directorio de destino "$1".',
	'webstore_archive_lock' => 'Non se puido bloquear o ficheiro de arquivo "$1".',
	'webstore_archive_mkdir' => 'Non se puido crear o directorio de arquivo "$1".',
	'webstore_src_open' => 'Non se puido abrir o ficheiro de orixe "$1".',
	'webstore_src_close' => 'Erro ao pechar o ficheiro de orixe "$1".',
	'webstore_src_delete' => 'Erro ao eliminar o ficheiro de orixe "$1".',
	'webstore_rename' => 'Erro ao lle mudar o nome a "$1" para "$2".',
	'webstore_lock_open' => 'Erro ao abrir o ficheiro de bloqueo "$1".',
	'webstore_lock_close' => 'Erro ao fechar o ficheiro de bloqueo "$1".',
	'webstore_dest_exists' => 'Erro, xa existe o ficheiro de destino "$1".',
	'webstore_temp_open' => 'Erro ao abrir o ficheiro temporal "$1".',
	'webstore_temp_copy' => 'Erro ao copiar o ficheiro temporal "$1" no ficheiro de destino "$2".',
	'webstore_temp_close' => 'Erro ao fechar o ficheiro temporal "$1".',
	'webstore_temp_lock' => 'Erro ao bloquear o ficheiro temporal "$1".',
	'webstore_no_archive' => 'O ficheiro de destino xa existe e non se deu un arquivo.',
	'webstore_no_file' => 'Non se enviou ningún ficheiro.',
	'webstore_move_uploaded' => 'Erro ao mover o ficheiro enviado "$1" para a localización temporal "$2".',
	'webstore_invalid_zone' => 'Zona "$1" non válida.',
	'webstore_no_deleted' => 'Non se definiu un directorio de arquivo para os ficheiros eliminados.',
	'webstore_curl' => 'Erro de cURL: $1',
	'webstore_404' => 'Non se atopou o ficheiro.',
	'webstore_php_warning' => 'Aviso de PHP: $1',
	'webstore_metadata_not_found' => 'Non se atopou o ficheiro: $1',
	'webstore_postfile_not_found' => 'Non se atopou o ficheiro enviado.',
	'webstore_scaler_empty_response' => 'O redimensionador de imaxes deu unha resposta baleira co código de resposta 200. Isto podería deberse a un erro fatal de PHP no redimensionador.',
	'webstore_invalid_response' => 'Resposta non válida do servidor:

$1',
	'webstore_no_response' => 'Sen resposta desde o servidor',
	'webstore_backend_error' => 'Erro do servidor de almacenamento:

$1',
	'webstore_php_error' => 'Atopáronse erros de PHP:',
	'webstore_no_handler' => 'Non hai un programa para transformar este tipo MIME',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'inplace_access_disabled' => 'הגישה לשירות זה בוטלה לכל הלקוחות.',
	'inplace_access_denied' => 'שירות זה מוגבל לפי כתובת ה־IP של הלקוח.',
	'inplace_scaler_no_temp' => 'אין תיקייה זמנית תקינה.
הגדירו את $wgLocalTmpDirectory לתיקייה הניתנת לכתיבה.',
	'inplace_scaler_not_enough_params' => 'אין מספיק פרמטרים.',
	'inplace_scaler_invalid_image' => 'התמונה אינה תקינה, לא ניתן לזהות את גודלה.',
	'inplace_scaler_failed' => 'אירעה שגיאה במהלך שינוי גודל התמונה: $1',
	'inplace_scaler_no_handler' => 'אין הגדרה להצגת קבצים מסוג MIME זה',
	'inplace_scaler_no_output' => 'לא נוצר קובץ הכולל את פלט המרה.',
	'inplace_scaler_zero_size' => 'ההמרה יצרה קובץ פלט בן 0 בתים.',
	'webstore-desc' => 'תוכנת תיווך לאיחסון קבצים ברשת בלבד (ללא NFS)',
	'webstore_access' => 'שירות זה מוגבל לפי כתובת ה־IP של הלקוח.',
	'webstore_path_invalid' => 'שם הקובץ שגוי.',
	'webstore_dest_open' => 'לא ניתן לפתוח את קובץ היעד "$1".',
	'webstore_dest_lock' => 'לא ניתן לבצע נעילת בלעדיות של קובץ היעד "$1".',
	'webstore_dest_mkdir' => 'לא ניתן ליצור את תיקיית היעד "$1".',
	'webstore_archive_lock' => 'לא ניתן לבצע נעילת בלעדיות על קובץ הארכיון "$1".',
	'webstore_archive_mkdir' => 'לא ניתן ליצור את תיקיית הארכיון "$1".',
	'webstore_src_open' => 'לא ניתן לפתוח את קובץ המקור "$1".',
	'webstore_src_close' => 'שגיאה בסגירת קובץ המקור "$1".',
	'webstore_src_delete' => 'שגיאה במחיקת קובץ המקור "$1".',
	'webstore_rename' => 'שגיאה בשינוי שם הקובץ מ־"$1" ל־"$2".',
	'webstore_lock_open' => 'שגיאה בפתיחת קובץ הנעילה "$1".',
	'webstore_lock_close' => 'שגיאה בסגירת קובץ הנעילה "$1".',
	'webstore_dest_exists' => 'שגיאה, קובץ היעד "$1" קיים.',
	'webstore_temp_open' => 'שגיאה בפתיחת הקובץ הזמני "$1".',
	'webstore_temp_copy' => 'שגיאה בהעתקת הקובץ הזמני "$1" לקובץ היעד "$2".',
	'webstore_temp_close' => 'שגיאה בסגירת הקובץ הזמני "$1".',
	'webstore_temp_lock' => 'שגיאה בנעילת הקובץ הזמני "$1".',
	'webstore_no_archive' => 'קובץ היעד קיים ולא ניתן ארכיון.',
	'webstore_no_file' => 'לא הועלה קובץ.',
	'webstore_move_uploaded' => 'שגיאה בהעברת הקובץ שהועלה "$1" אל התיקייה הזמנית "$2".',
	'webstore_invalid_zone' => 'אזור שגוי "$1".',
	'webstore_no_deleted' => 'לא הוגדרה תיקיית ארכיון עבור קבצים שנמחקו.',
	'webstore_curl' => 'שגיאת cURL: $1',
	'webstore_404' => 'הקובץ לא נמצא.',
	'webstore_php_warning' => 'אזהרת PHP: $1',
	'webstore_metadata_not_found' => 'הקובץ לא נמצא: $1',
	'webstore_postfile_not_found' => 'הקובץ לשליחה לא נמצא.',
	'webstore_scaler_empty_response' => 'משנה גודלי התמונות החזיר תגובה ריקה עם קוד התגובה 200.
יתכן והדבר נגרם עקב שגיאה קריטית של PHP במשנה הגודל.',
	'webstore_invalid_response' => 'תגובה בלתי תקינה מהשרת:

$1',
	'webstore_no_response' => 'אין תגובה מהשרת',
	'webstore_backend_error' => 'שגיאה משרת האיחסון:

$1',
	'webstore_php_error' => 'אירעו שגיאות PHP:',
	'webstore_no_handler' => 'אין הגדרה להצגת קבצים מסוג MIME זה',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 */
$messages['hi'] = array(
	'webstore_404' => 'फ़ाइल मिली नहीं।',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'inplace_access_disabled' => 'Přistup k tutej słužbje bu za wšě klienty znjemóžnjeny.',
	'inplace_access_denied' => 'Tuta słužba so přez klientowy IP wobmjezuje.',
	'inplace_scaler_no_temp' => 'Žadyn płaćiwy temporerny zapis, staj wariablu $wgLocalTmpDirectory na popisajomny zapis',
	'inplace_scaler_not_enough_params' => 'Falowace parametry.',
	'inplace_scaler_invalid_image' => 'Njepłaćiwy wobraz, wulkosć njeda so zwěsćić.',
	'inplace_scaler_failed' => 'Při skalowanju je zmylk wustupił: $1',
	'inplace_scaler_no_handler' => 'Žadyn rjadowak, zo by so tutón MIME-typ přetworił',
	'inplace_scaler_no_output' => 'Njeje so žana wudawanska dataja spłodźiła.',
	'inplace_scaler_zero_size' => 'Přetworjenje spłodźi prózdnu wudawansku dataju.',
	'webstore-desc' => 'Middleware jenož za webowe (nic NFS) datajowe składowanje',
	'webstore_access' => 'Tuta słužba so přez klientowy IP wobmjezuje.',
	'webstore_path_invalid' => 'Datajowe mjeno bě njepłaćiwe.',
	'webstore_dest_open' => 'Njeje móžno cilowu dataju "$1" wočinić.',
	'webstore_dest_lock' => 'Zawrjenje ciloweje dataje "$1" njeje so poradźiło.',
	'webstore_dest_mkdir' => 'Njeje móžno cilowy zapis "$1" wutworić.',
	'webstore_archive_lock' => 'Zawrjenje archiwneje dataje "$1" njeje so poradźiło.',
	'webstore_archive_mkdir' => 'Njeje móžno archiwowy zapis "$1" wutworić.',
	'webstore_src_open' => 'Njeje móžno žórłowu dataju "$1" wočinić.',
	'webstore_src_close' => 'Zmylk při začinjenju žórłoweje dataje "$1".',
	'webstore_src_delete' => 'Zmylk při zničenju dataje "$1".',
	'webstore_rename' => 'Zmylk při přemjenowanju dataje "$1" do "$2".',
	'webstore_lock_open' => 'Zmylk při wočinjenju blokowaceje dataje "$1".',
	'webstore_lock_close' => 'Zmylk při začinjenju blokowaceje dataje "$1".',
	'webstore_dest_exists' => 'Zmylk, cilowa dataja "$1" eksistuje.',
	'webstore_temp_open' => 'Zmylk při wočinjenju temporerneje dataje "$1".',
	'webstore_temp_copy' => 'Zmylk při kopěrowanju temporerneje dataje "$1" do ciloweje dataje "$2".',
	'webstore_temp_close' => 'Zmylk při začinjenju temporerneje dataje "$1".',
	'webstore_temp_lock' => 'Zmylk při zawrjenju temporerneje dataje "$1".',
	'webstore_no_archive' => 'Cilowa dataja eksistuje a žadyn archiw njebu podaty.',
	'webstore_no_file' => 'Žana dataja njebu nahrata.',
	'webstore_move_uploaded' => 'Zmylk při přesunjenju nahrateje dataje "$1" k nachwilnemu městnu "$2".',
	'webstore_invalid_zone' => 'Njepłaćiwy wobłuk "$1".',
	'webstore_no_deleted' => 'Njebu žadyn archiwowy zapis za zničene dataje definowany.',
	'webstore_curl' => 'Zmylk z cURL: $1',
	'webstore_404' => 'Dataja njenamakana.',
	'webstore_php_warning' => 'Warnowanje PHP: $1',
	'webstore_metadata_not_found' => 'Dataja njenamakana: $1',
	'webstore_postfile_not_found' => 'Dataja, kotraž ma so wotesłać, njebu namakana.',
	'webstore_scaler_empty_response' => 'Wobrazowy skalowar wróći prózdnu wotmołwu z wotmołwnym kodom 200. Přičina móhła ćežki zmylk PHP w skalowarju być.',
	'webstore_invalid_response' => 'Njepłaćiwa wotmołwa ze serwera:

$1',
	'webstore_no_response' => 'Žana wotmołwa ze serwera',
	'webstore_backend_error' => 'Zmylk ze składowanskeho serwera:

$1',
	'webstore_php_error' => 'Zmylki PHP su wustupili:',
	'webstore_no_handler' => 'Žadyn rjadowak, zo by so tutón MIME-typ přetworił',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'inplace_access_disabled' => 'Le accesso a iste servicio ha essite disactivate pro tote le clientes.',
	'inplace_access_denied' => 'Iste servicio es restringite per adresse IP de cliente.',
	'inplace_scaler_no_temp' => 'Nulle directorio temporari valide.
Defini $wgLocalTmpDirectory a un directorio scribibile.',
	'inplace_scaler_not_enough_params' => 'Parametros insufficiente.',
	'inplace_scaler_invalid_image' => 'Imagine invalide, non poteva determinar le grandor.',
	'inplace_scaler_failed' => 'Un error esseva incontrate durante le scalamento del imagine: $1',
	'inplace_scaler_no_handler' => 'Nulle gestor pro transformar iste typo MIME',
	'inplace_scaler_no_output' => 'Nulle file de resultato del transformation esseva producite.',
	'inplace_scaler_zero_size' => 'Le transformation produceva un file de resultato a grandor zero.',
	'webstore-desc' => 'Middleware pro le immagazinage de files per Web (non NFS)',
	'webstore_access' => 'Iste servicio es restringite per adresse IP de cliente.',
	'webstore_path_invalid' => 'Le nomine del file esseva invalide.',
	'webstore_dest_open' => 'Impossibile aperir le file de destination "$1".',
	'webstore_dest_lock' => 'Impossibile serrar le file de destination "$1".',
	'webstore_dest_mkdir' => 'Impossible crear le directorio de destination "$1".',
	'webstore_archive_lock' => 'Impossibile serrar le file de archivo "$1".',
	'webstore_archive_mkdir' => 'Impossibile crear le directorio de archivo "$1".',
	'webstore_src_open' => 'Impossibile aperir le file de origine "$1".',
	'webstore_src_close' => 'Error durante le clausura del file de origine "$1".',
	'webstore_src_delete' => 'Error durante le deletion del file de origine "$1".',
	'webstore_rename' => 'Error durante le renomination del file "$1" a "$2".',
	'webstore_lock_open' => 'Error durante le apertura del file de serratura "$1".',
	'webstore_lock_close' => 'Error durante le clausura del file de serratura "$1".',
	'webstore_dest_exists' => 'Error, le file de destination "$1" existe ja.',
	'webstore_temp_open' => 'Error durante le apertura del file temporari "$1".',
	'webstore_temp_copy' => 'Error durante le copiar del file temporari "$1" verso le file de destination "$2".',
	'webstore_temp_close' => 'Error durante le clausura del file temporari "$1".',
	'webstore_temp_lock' => 'Error durante le serratura del file temporari "$1".',
	'webstore_no_archive' => 'Le file de destination existe ja e nulle archivo esseva date.',
	'webstore_no_file' => 'Nulle file esseva cargate.',
	'webstore_move_uploaded' => 'Error durante le displaciamento del file cargate "$1" verso le location temporari "$2".',
	'webstore_invalid_zone' => 'Zona "$1" invalide.',
	'webstore_no_deleted' => 'Nulle directorio de archivo pro le files delite ha essite definite.',
	'webstore_curl' => 'Error ab cURL: $1',
	'webstore_404' => 'File non trovate.',
	'webstore_php_warning' => 'Advertimento de PHP: $1',
	'webstore_metadata_not_found' => 'File non trovate: $1',
	'webstore_postfile_not_found' => 'File pro inviar non trovate.',
	'webstore_scaler_empty_response' => 'Le scalator de imagines dava un responsa vacue con un codice de responsa 200.
Isto pote esser debite a un error fatal de PHP in le scalator.',
	'webstore_invalid_response' => 'Responsa invalide ab le servitor:

$1',
	'webstore_no_response' => 'Nulle responsa ab le servitor',
	'webstore_backend_error' => 'Error ab le servitor de immagazinage:

$1',
	'webstore_php_error' => 'Errores de PHP esseva incontrate:',
	'webstore_no_handler' => 'Nulle gestor pro transformar iste typo de MIME',
);

/** Italian (Italiano)
 * @author Darth Kule
 */
$messages['it'] = array(
	'webstore_404' => 'File non trovato.',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 * @author Pras
 */
$messages['jv'] = array(
	'inplace_access_disabled' => 'Aksès menyang layanan iki wis ditutup kanggo kabèh panganggo.',
	'inplace_access_denied' => 'Pangladènan iki diwatesi déning klièn IP.',
	'inplace_scaler_no_temp' => "Ora ana dirèktori sauntara sing sah.
Sèt \$wgLocalTmpDirectory menyang dirèktori sing bisa ditulisi (''writeable directory'').",
	'inplace_scaler_not_enough_params' => 'Paramèter ora cukup.',
	'inplace_scaler_invalid_image' => 'Gambar ora absah, ora bisa nemtokaké ukurané.',
	'inplace_scaler_failed' => "Ana kasalahan jroning nykala gambar (''image scalling''): $1",
	'inplace_scaler_no_handler' => "Ora ana ''handler'' kanggo ngowahi tipe MIME iki",
	'inplace_scaler_no_output' => "Ora ana berkas transformasi wetonan (''output'') sing dikasilaké.",
	'inplace_scaler_zero_size' => "Transformasi ngasilaké wetonan (''output'') berkas kanthi ukuran nul (''zero-sized'').",
	'webstore_access' => 'Pangladènan iki diwatesi déning client IP.',
	'webstore_path_invalid' => 'Jeneng berkasé ora absah.',
	'webstore_dest_open' => 'Ora bisa mbuka berkas tujuan "$1".',
	'webstore_dest_lock' => 'Gagal ngunci tujuan berkas "$1".',
	'webstore_dest_mkdir' => 'Ora bisa gawé dirèktori tujuan "$1".',
	'webstore_archive_lock' => 'Gagal ngunci berkas arsip "$1".',
	'webstore_archive_mkdir' => 'Ora bisa gawé dirèktori arsip "$1".',
	'webstore_src_open' => 'Ora bisa buka berkas sumber "$1".',
	'webstore_src_close' => 'Kaluputan nalika nutup berkas sumber "$1".',
	'webstore_src_delete' => 'Ana kaluputan nalika mbusak berkas sumber "$1".',
	'webstore_rename' => 'Kasalahan ganti jeneng berkas "$1" dadi "$2".',
	'webstore_lock_open' => 'Kasalahan mbukak kunci berkas "$1".',
	'webstore_lock_close' => 'Kasalahan nutup kunci berkas "$1".',
	'webstore_dest_exists' => 'Kasalahan, berkas sing dituju "$1" wis ana.',
	'webstore_temp_open' => 'Kasalahan mbukak berkas sauntara "$1".',
	'webstore_temp_copy' => 'Kasalahan nulad berkas sauntara "$1". menyang berkas tujuan "$2".',
	'webstore_temp_close' => 'Ana kaluputan nalika nutup berkas sauntara "$1".',
	'webstore_temp_lock' => 'Kaluputan ngunci berkas sementara "$1".',
	'webstore_no_archive' => 'Berkas tujuan ana lan ora ana arsip sing dituduhaké.',
	'webstore_no_file' => 'Ora ana berkas sing diunggahaké.',
	'webstore_move_uploaded' => 'Kasalahan mindhahaké berkas diunggahaké "$1" menyang lokasi sauntara "$2".',
	'webstore_invalid_zone' => 'Zona invalid "$1".',
	'webstore_no_deleted' => 'Ora ana dirèktori arsip saka berkas sing dibusak.',
	'webstore_curl' => 'Kaluputan saka cURL: $1',
	'webstore_404' => 'Berkas ora ditemokaké.',
	'webstore_php_warning' => 'Pèngetan PHP: $1',
	'webstore_metadata_not_found' => 'Berkas ora ditemokaké: $1',
	'webstore_postfile_not_found' => 'Berkas sing arep didokok ora ditemokaké.',
	'webstore_scaler_empty_response' => "Panyekala gambar (''image scaler'') mènèhi rèspon kothong (''empty response'') kanthi kodhe rèspon 200.
Bab iki bisa waé disebabaké kasalahan fatal PHP ing panyekala.",
	'webstore_invalid_response' => 'Wangsulan ora absah saka server:

$1',
	'webstore_no_response' => 'Ora ana wangsulan saka server',
	'webstore_backend_error' => 'Kaluputan saka server gudhang:

$1',
	'webstore_php_error' => 'Katemu kaluputan PHP:',
	'webstore_no_handler' => "Ora ana ''handler'' kanggo ngowahi (''transforming'') tipe MIME iki",
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author Lovekhmer
 * @author Thearith
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'inplace_access_disabled' => 'ការចូលទៅប្រើប្រាស់សេវាកម្មនេះត្រូវបានបិទចំពោះអតិថិជនទាំងអស់។',
	'inplace_access_denied' => 'សេវា​នេះ​មិន​ត្រូវ​បាន​កម្រិត​ដោយ​ម៉ាស៊ីនភ្ញៀវ IP ទេ​។',
	'inplace_scaler_not_enough_params' => 'ប៉ារ៉ាម៉ែត្រមិនគ្រប់គ្រាន់។',
	'inplace_scaler_invalid_image' => 'រូបភាពមិនត្រឹមត្រូវ។ មិនអាចកំណត់ទំហំបាន។',
	'inplace_scaler_failed' => 'កំហុស១បានកើតឡើងក្នុងពេលកំពុងវាស់ទំហំរូបភាព៖ $1',
	'webstore_access' => 'សេវា​នេះ​មិន​ត្រូវ​បាន​កម្រិត​ដោយ​ម៉ាស៊ីនភ្ញៀវ IP ទេ​។',
	'webstore_path_invalid' => 'ឈ្មោះឯកសារមិនត្រឹមត្រូវ។',
	'webstore_dest_open' => 'មិនអាចបើកឯកសារគោលដៅ "$1"ទេ។',
	'webstore_archive_mkdir' => 'មិនអាច បង្កើត បញ្ជី បណ្ណសារ "$1" ។',
	'webstore_src_open' => 'មិនអាចបើកឯកសារប្រភព "$1" ទេ។',
	'webstore_src_close' => 'កំហុសក្នុងការបិទឯកសារប្រភព "$1" ។',
	'webstore_src_delete' => 'កំហុសក្នុងការលុបចោលឯកសារប្រភព "$1" ។',
	'webstore_rename' => 'កំហុសក្នុងការប្ដូរឈ្មោះឯកសារ "$1" ទៅជា "$2"។',
	'webstore_lock_open' => 'កំហុស​ក្នុង​ការបើកសោ​ឯកសារ "$1" ។',
	'webstore_lock_close' => 'កំហុស​ក្នុង​ការចាក់សោ​ឯកសារ "$1" ។',
	'webstore_dest_exists' => 'កំហុស! ឯកសារគោលដៅ "$1" មានរួចហើយ។',
	'webstore_temp_open' => 'កំហុសក្នុងការបើកឯកសារបណ្ដោះអាសន្ន "$1"។',
	'webstore_temp_copy' => 'កំហុសក្នុងការថតចម្លងឯកសារបណ្ដោះអាសន្ន "$1" ទៅកាន់ឯកសារគោលដៅ "$2"។',
	'webstore_temp_close' => 'កំហុសក្នុងការបិទឯកសារបណ្ដោះអាសន្ន "$1"។',
	'webstore_temp_lock' => 'កំហុសក្នុងការចាក់សោឯកសារបណ្ដោះអាសន្ន "$1"។',
	'webstore_no_file' => 'គ្មានឯកសារ ​បានត្រូវផ្ទុកឡើង ។',
	'webstore_move_uploaded' => 'កំហុសក្នុងការប្ដូរទីតាំងឯកសារដែលបានផ្ទុកឡើង "$1" ទៅកាន់ទីតាំងបណ្ដោះអាសន្ន "$2"។',
	'webstore_invalid_zone' => 'តំបន់មិនត្រឹមត្រូវ "$1"។',
	'webstore_curl' => 'កំហុសពី cURL: $1',
	'webstore_404' => 'រកមិនឃើញឯកសារទេ។',
	'webstore_php_warning' => 'ការព្រមាន PHP: $1',
	'webstore_metadata_not_found' => 'រកមិនឃើញ ឯកសារ ៖ $1',
	'webstore_invalid_response' => 'កំហុស​ឆ្លើយតប​ពី​ម៉ាស៊ីនបម្រើសេវា​៖

$1',
	'webstore_no_response' => 'គ្មានចម្លើយតប​ពី​ម៉ាស៊ីនបម្រើសេវា',
	'webstore_backend_error' => 'កំហុស​ពី​ឧបករណ៍ផ្ទុក​នៃ​ម៉ាស៊ីនបម្រើសេវា​៖

$1',
	'webstore_php_error' => 'មានកំហុស PHP:',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'inplace_access_disabled' => 'Dä Zohjang noh hee dämm Deenß es ußjeschalldt för Alle.',
	'inplace_access_denied' => 'Dä Deens hee es beschrängk op bestemmpte IP-Addräße.',
	'inplace_scaler_no_temp' => 'Mer han kei Verzeijschneß för jet zweschezeshpeischere.
Maach, dat <code>$wgLocalTmpDirectory</code> op e Verzeijschneß zeich,
wo mer erin schrieve künne.',
	'inplace_scaler_not_enough_params' => 'Nit jenooch Parammeetere.',
	'inplace_scaler_invalid_image' => 'Dat Belld es kapott, mer kunnte nit eruß fenge, wi jruuß dat dat es.',
	'inplace_scaler_failed' => 'Enne Fähler es opjedouch, wi mer hee dat Belld jrüüßer ov kleiner maache wullte: $1',
	'inplace_scaler_no_handler' => 'Mer han keij Projramm för hee dä <i lang="en">MIME</i>-Tüp ömzewandelle.',
	'inplace_scaler_no_output' => 'Beim Ömwandelle es kei Datei erus jekumme.',
	'inplace_scaler_zero_size' => 'Beim Ömwandelle es en Datei met nix dren eruß jekumme.',
	'webstore-desc' => 'En <i lang="en">middelware</i> för et Web (ävver nit <i lang="en">NFS</i>) för Dateie ze speichere.',
	'webstore_access' => 'Dä Deens hee es beschrängk op bestemmpte IP-Addräße.',
	'webstore_path_invalid' => 'Dä Name för di Datei es Kappes.',
	'webstore_dest_open' => 'Mer künne di Ziel-Datei „$1“ nit opmaache.',
	'webstore_dest_lock' => 'Mer künne de Ziel-Datei „$1“ nit sperre.',
	'webstore_dest_mkdir' => 'Mer künne dat Ziel-Verzeichnis „$1“ nit aanläje.',
	'webstore_archive_lock' => 'Mer künne de Aschiiv-Datei „$1“ nit sperre.',
	'webstore_archive_mkdir' => 'Mer künne dat Aschiiv-Verzeichnis „$1“ nit aanläje.',
	'webstore_src_open' => 'Mer künne de Quell-Datei „$1“ nit opmaache.',
	'webstore_src_close' => 'Mer künne de Quell-Datei „$1“ nit zomaache.',
	'webstore_src_delete' => 'Mer künne de Quell-Datei „$1“ nit fottmaache.',
	'webstore_rename' => 'Mer künne de Datei „$1“ nit op „$2“ ömnenne.',
	'webstore_lock_open' => 'Mer künne de Schotz-Datei „$1“ nit opmaache.',
	'webstore_lock_close' => 'Mer künne de Schotz-Datei „$1“ nit zomaache.',
	'webstore_dest_exists' => 'Fähler, de Ziel-Datei „$1“ jidd_et ald.',
	'webstore_temp_open' => 'Mer künne de Zwesche-Datei „$1“ nit opmaache.',
	'webstore_temp_copy' => 'Mer künne de Zwesche-Datei „$1“ nit op de Zieldate „$2“ ömkopeere.',
	'webstore_temp_close' => 'Mer künne de Zwesche-Datei „$1“ nit zomaache.',
	'webstore_temp_lock' => 'Mer künne de Zwesche-Datei „$1“ nit sperre.',
	'webstore_no_archive' => 'De Zieldatei es ald do, un en Aschiiv-Datei wohr nit aanjejovve.',
	'webstore_no_file' => 'Et wwod kei Datei huhjelade.',
	'webstore_move_uploaded' => 'Et hät nit jeklapp, de neu huhjelade Datei fun „$1“ op „$2“, dä Name fum Zwescheshpeijscher, ömzedäufe.',
	'webstore_invalid_zone' => 'Onjöltijje Bereisch — „$1“.',
	'webstore_no_deleted' => 'Mer han kei Aschiiv-Verzeijschneß för fottjeschmeße Dateie ennjestellt.',
	'webstore_curl' => 'Ene Fähler fum <code>cURL</code> es opjevalle: $1',
	'webstore_404' => 'Datei nit jefunge.',
	'webstore_php_warning' => 'PHP Warnung: $1',
	'webstore_metadata_not_found' => 'Datei nit jefonge: $1',
	'webstore_postfile_not_found' => 'De Dattei för huhzelade (met <i lang="en">post</i>) ham_mer nit jefonge.',
	'webstore_scaler_empty_response' => 'Dat Projramm för Bellder ze Verjrüüßere ov ze Verkleijnere
hät en Antwoot met enem <code>200-er Kood</code> jejovve.
Dat künnt fun enem schlemme PHP-Fähler en dämm Projramm kumme.',
	'webstore_invalid_response' => 'En onjöltije Antwoot fum Server:

$1',
	'webstore_no_response' => 'Kei Antwoot fun Server',
	'webstore_backend_error' => 'Dä <i lang="en">server</i> för Dateie ze speijschere meldt ene Fähler:

$1',
	'webstore_php_error' => 'Et sin PHP Fähler opjetrodde:',
	'webstore_no_handler' => 'Kei Projramm för et Ömwandelle för dä <i lang="en">MIME</i> tüp',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'inplace_access_disabled' => 'Den Zougang zu dësem Service gouf fir all Cliente gespaart.',
	'inplace_access_denied' => 'Dëse Service ass limitéiert op Grond vun der IP-Adress vum Client.',
	'inplace_scaler_not_enough_params' => 'Net genuch Parameteren.',
	'inplace_scaler_zero_size' => 'Bäi der Ëmwandlung gouf en eidele Fichier generéiert.',
	'webstore_access' => 'Dëse Service ass pro IP-Adress limitéiert.',
	'webstore_path_invalid' => 'De Numm vum Fichier war ongëlteg.',
	'webstore_rename' => 'Feeler beim Ëmbennen vum Fichier "$1" op "$2".',
	'webstore_lock_open' => 'Feeler beim Opmaache vum gespaarte Fichier "$1".',
	'webstore_lock_close' => 'Feeler beim Zoumaache vum gespaarte Fichier "$1".',
	'webstore_temp_open' => 'Feeler beim Opmaache vum temporäre Fichier "$1".',
	'webstore_temp_close' => 'Feeler beim Zoumaache vum temporäre Fichier "$1".',
	'webstore_temp_lock' => 'Feeler beim Zoumaache vum tempräre Fichier "$1".',
	'webstore_no_file' => 'Et gouf kee Fichier eropgelueden.',
	'webstore_404' => 'De Fichier gouf net fonnt.',
	'webstore_php_warning' => 'PHP Warnung: $1',
	'webstore_metadata_not_found' => 'De Fichier $1 gouf net fonnt',
	'webstore_invalid_response' => 'Ongëlteg Äntwert vum Server:

$1',
	'webstore_no_response' => 'De Server äntwert net',
	'webstore_backend_error' => 'Feeler vum Server op dem Date gespäichert ginn:

$1',
	'webstore_php_error' => 'Dës PHP Feeler sinn opgetratt:',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'inplace_scaler_invalid_image' => 'അസാധുവായ ചിത്രം, വലിപ്പം നിര്‍ണ്ണയിക്കാന്‍ കഴിഞ്ഞില്ല.',
	'webstore_path_invalid' => 'പ്രമാണത്തിന്റെ പേര്‌ അസാധുവാണ്‌.',
	'webstore_src_open' => '"$1" എന്ന മൂലപ്രമാണം തുറക്കുവാന്‍ കഴിഞ്ഞില്ല',
	'webstore_src_close' => '"$1" എന്ന മൂലപ്രമാണം അടയ്ക്കുമ്പോള്‍ പിശക് സംഭവിച്ചു.',
	'webstore_src_delete' => '"$1" എന്ന മൂല പ്രമാണം മായ്ക്കുമ്പോള്‍ പഴവ് സംഭവിച്ചു.',
	'webstore_rename' => '"$1" എന്ന പ്രമാണം  "$2" എന്നു പുനഃനാമകരണം നടത്തുമ്പോള്‍ പിഴവ് സംഭവിച്ചു.',
	'webstore_dest_exists' => 'പിശക്, "$1" എന്ന ലക്ഷ്യപ്രമാണം നിലവിലുണ്ട്.',
	'webstore_temp_open' => '"$1" എന്ന താല്‍ക്കാലിക പ്രമാണം തുറക്കുന്നതില്‍ പിഴവ്.',
	'webstore_temp_copy' => '"$1" എന്ന താല്‍ക്കാലിക പ്രമാണം "$2" എന്ന ലക്ഷ്യപ്രമാണത്തിലേക്കു പകര്‍ത്തുന്നതില്‍ പിഴവ് സംഭവിച്ചു.',
	'webstore_temp_close' => '"$1" എന്ന താല്‍ക്കാലിക പ്രമാണം അടയ്ക്കുന്നതില്‍ പിഴവ്.',
	'webstore_no_file' => 'പ്രമാണമൊന്നും അപ്‌ലോഡ് ചെയ്തിട്ടില്ല.',
	'webstore_invalid_zone' => 'അസാധുവായ മേഖല "$1".',
	'webstore_404' => 'പ്രമാണം കണ്ടില്ല.',
	'webstore_metadata_not_found' => 'പ്രമാണം കണ്ടില്ല: $1',
	'webstore_no_response' => 'സെര്‍‌വറില്‍ നിന്നു മറുപടിയൊന്നും ലഭിച്ചില്ല',
);

/** Marathi (मराठी)
 * @author Kaustubh
 * @author Mahitgar
 */
$messages['mr'] = array(
	'inplace_access_denied' => 'ही सेवा क्लायंट आयपीने थांबविलेली आहे.',
	'inplace_scaler_no_temp' => 'योग्य तात्पुरती डिरेक्टरी नाही.
$wgLocalTmpDirectory ची किंमत योग्य अशा डिरेक्टरीने बदला.',
	'inplace_scaler_not_enough_params' => 'पुरेसे परमीटर्स नाहीत.',
	'inplace_scaler_invalid_image' => 'चुकीचे चित्र, आकार निश्चित करता आलेला नाही.',
	'webstore_access' => 'ही सेवा क्लायंट आयपीने थांबविलेली आहे.',
	'webstore_path_invalid' => 'संचिकानाव चुकीचे होते.',
	'webstore_dest_open' => 'लक्ष्य संचिका उघडू शकत नाही "$1".',
	'webstore_dest_lock' => 'लक्ष्य संचिकेला कुलुप लावता आलेले नाही "$1".',
	'webstore_dest_mkdir' => 'लक्ष्य डिरेक्टरी तयार करू शकलेलो नाही "$1".',
	'webstore_archive_lock' => 'आर्चिव्ह संचिकेला कुलुप लावता आलेले नाही "$1".',
	'webstore_archive_mkdir' => 'आर्चिव्ह डिरेक्टरी तयार करता आलेली नाही "$1".',
	'webstore_src_open' => 'स्रोत संचिका उघडता आलेली नाही "$1".',
	'webstore_src_close' => 'स्रोत संचिका बंद करण्यामध्ये त्रुटी "$1".',
	'webstore_src_delete' => 'स्रोत संचिका वगळण्यामध्ये त्रुटी "$1".',
	'webstore_rename' => 'संचिका "$1" चे नाव "$2" ला बदलण्यामध्ये त्रुटी.',
	'webstore_lock_open' => 'कुलुपबंद संचिका "$1" उघडण्यामध्ये त्रुटी.',
	'webstore_lock_close' => 'कुलुपबंद संचिका "$1" बंद करण्यामध्ये त्रुटी.',
	'webstore_dest_exists' => 'त्रुटी, लक्ष्य डिरेक्टरी "$1" अगोदरच अस्तित्वात आहे.',
	'webstore_temp_open' => 'तात्पुरती संचिका "$1" उघडण्यामध्ये त्रुटी.',
	'webstore_temp_copy' => 'तात्पुरती संचिका "$1" ची प्रत "$2" मध्ये करण्यात त्रुटी.',
	'webstore_temp_close' => 'तात्पुरती संचिका "$1" बंद करण्यामध्ये त्रुटी.',
	'webstore_temp_lock' => 'तात्पुरती संचिका "$1" ला कुलुप लावण्यात त्रुटी.',
	'webstore_no_file' => 'कोणतीही संचिका चढवली नाही',
	'webstore_invalid_zone' => 'चुकीचा झोन "$1".',
	'webstore_no_deleted' => 'वगळलेल्या संचिकांसाठी आर्चिव्ह डिरेक्टरी सांगितलेली नाही.',
	'webstore_curl' => ' cURL मध्ये त्रुटी: $1',
	'webstore_404' => 'संचिका सापडली नाही.',
	'webstore_php_warning' => 'PHP इशारा: $1',
	'webstore_metadata_not_found' => 'संचिका सापडली नाही: $1',
	'webstore_no_response' => 'सर्व्हरकडून उत्तर नाही',
	'webstore_php_error' => 'PHP त्रुट्या आलेल्या आहेत:',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'webstore_404' => 'Файлась а муеви',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'inplace_scaler_not_enough_params' => 'Nich noog Parameters.',
	'webstore_404' => 'Datei nich funnen.',
);

/** Dutch (Nederlands)
 * @author Siebrand
 * @author Tvdm
 */
$messages['nl'] = array(
	'inplace_access_disabled' => 'Toegang tot deze dienst is uitgeschakeld voor alle clients.',
	'inplace_access_denied' => 'Deze dienst is afgeschermd op basis van het IP-adres van een client.',
	'inplace_scaler_no_temp' => 'Geen juiste tijdelijke map, geef schrijfrechten op $wgLocalTmpDirectory.',
	'inplace_scaler_not_enough_params' => 'Niet genoeg parameters.',
	'inplace_scaler_invalid_image' => 'Onjuiste afbeelding. Grootte kon niet bepaald worden.',
	'inplace_scaler_failed' => 'Er is een fout opgetreden bij het schalen van de afbeelding: $1',
	'inplace_scaler_no_handler' => 'Dit MIME-type kan niet getransformeerd worden',
	'inplace_scaler_no_output' => 'Er is geen uitvoerbestand voor de transformatie gemaakt.',
	'inplace_scaler_zero_size' => 'De grootte van het uitvoerbestand van de transformatie was nul.',
	'webstore-desc' => 'Alleen-web middleware voor bestandsopslag (niet via NFS)',
	'webstore_access' => 'Deze dienst is afgeschermd op basis van het IP-adres van een client.',
	'webstore_path_invalid' => 'De bestandnaam was ongeldig.',
	'webstore_dest_open' => 'Het doelbestand "$1" kon niet geopend worden.',
	'webstore_dest_lock' => 'Het doelbestand "$1" was niet te locken.',
	'webstore_dest_mkdir' => 'De doelmap "$1" kon niet aangemaakt worden.',
	'webstore_archive_lock' => 'Het archiefbestand "$1" was niet te locken.',
	'webstore_archive_mkdir' => 'De archiefmap "$1" kon niet aangemaakt worden.',
	'webstore_src_open' => 'Het bronbestand "$1" was niet te openen.',
	'webstore_src_close' => 'Fout bij het sluiten van bronbestand "$1".',
	'webstore_src_delete' => 'Fout bij het verwijderen van bronbestand "$1".',
	'webstore_rename' => 'Fout bij het hernoemen van "$1" naar "$2".',
	'webstore_lock_open' => 'Fout bij het openen van lockbestand "$1".',
	'webstore_lock_close' => 'Fout bij het sluiten van lockbestand "$1".',
	'webstore_dest_exists' => 'Fout, doelbestand "$1" bestaat al.',
	'webstore_temp_open' => 'Fout bij het openen van tijdelijk bestand "$1".',
	'webstore_temp_copy' => 'Fout bij het kopiren van tijdelijk bestand "$1" naar doelbestand "$2".',
	'webstore_temp_close' => 'Fout bij het sluiten van tijdelijk bestand "$1".',
	'webstore_temp_lock' => 'Fout bij het locken van tijdelijk bestand "$1".',
	'webstore_no_archive' => 'Doelbestand bestaat en er is geen archief opgegeven.',
	'webstore_no_file' => 'Er is geen bestand geüpload.',
	'webstore_move_uploaded' => 'Fout bij het verplaatsen van geüpload bestand "$1" naar tijdelijke locatie "$2".',
	'webstore_invalid_zone' => 'Ongeldige zone "$1".',
	'webstore_no_deleted' => 'Er is geen archiefmap voor verwijderde bestanden gedefinieerd.',
	'webstore_curl' => 'Fout van cURL: $1',
	'webstore_404' => 'Bestand niet gevonden.',
	'webstore_php_warning' => 'PHP-waarschuwing: $1',
	'webstore_metadata_not_found' => 'Bestand niet gevonden: $1',
	'webstore_postfile_not_found' => 'Te posten bestand niet gevonden.',
	'webstore_scaler_empty_response' => 'De afbeeldingenschaler gaf een leeg antwoord met een antwoordcode 200. Dit kan te maken hebben met een fatale PHP-fout in de schaler.',
	'webstore_invalid_response' => 'Ongeldig antwoord van de server:

$1',
	'webstore_no_response' => 'Geen antwoord van de server',
	'webstore_backend_error' => 'Fout van de opslagserver:

$1',
	'webstore_php_error' => 'Er zijn PHP-fouten opgetreden:',
	'webstore_no_handler' => 'Dit MIME-type kan niet getransformeerd worden',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Frokor
 */
$messages['nn'] = array(
	'inplace_access_disabled' => 'Tilgangen til denne tenesta er slått av for alle klientar.',
	'inplace_access_denied' => 'Denne tenesta er avgrensa av IP-adressa til klienten.',
	'inplace_scaler_no_temp' => 'Inga gyldig mellombels mappe, sett $wgLocalTmpDirectory til ei skrivbar mappe.',
	'inplace_scaler_not_enough_params' => 'For få parametrar.',
	'inplace_scaler_invalid_image' => 'Ugyldig bilete, kunne ikkje fastslå storleik.',
	'inplace_scaler_failed' => 'Ein feil oppstod under biletskalering: $1',
	'inplace_scaler_no_handler' => 'Ingen handsamar for endring av denne MIME-typen',
	'inplace_scaler_no_output' => 'Inga endringsresultatfil vart produsert.',
	'inplace_scaler_zero_size' => 'Endringa skapte ei tom resultatfil.',
	'webstore_access' => 'Tenesta er avgrensa av IP-adressa til klienten.',
	'webstore_path_invalid' => 'Filnamnet var ugyldig.',
	'webstore_dest_open' => 'Kunne ikkje opne målfil «$1».',
	'webstore_dest_lock' => 'Kunne ikkje låsast på målfil «$1».',
	'webstore_dest_mkdir' => 'Kunne ikkje opprette målmappe «$1».',
	'webstore_archive_lock' => 'Kunne ikkje låsast på arkivfil «$1».',
	'webstore_archive_mkdir' => 'Kunne ikkje opprette arkivmappe «$1».',
	'webstore_src_open' => 'Kunne ikkje opne kjeldefil «$1».',
	'webstore_src_close' => 'Feil under lukking av kjeldefil «$1».',
	'webstore_src_delete' => 'Feil under sletting av kjeldefil «$1».',
	'webstore_rename' => 'Feil under omdøyping av «$1» til «$2».',
	'webstore_lock_open' => 'Feil under opning av låsfil «$1».',
	'webstore_lock_close' => 'Feil under lukking av låsfil «$1».',
	'webstore_dest_exists' => 'Feil, målfila «$1» finst.',
	'webstore_temp_open' => 'Feil under opning av mellombels fil «$1».',
	'webstore_temp_copy' => 'Feil under kopiering av mellombels fil «$1» til målfil «$2».',
	'webstore_temp_close' => 'Feil under lukking av mellombels fil «$1».',
	'webstore_temp_lock' => 'Feil under låsing av mellombels fil «$1».',
	'webstore_no_archive' => 'Målfila finst og ikkje noko arkiv vart gjeve.',
	'webstore_no_file' => 'Inga fil vart lasta opp.',
	'webstore_move_uploaded' => 'Feil under flytting av opplasta fil «$1» til mellombels stad «$2».',
	'webstore_invalid_zone' => 'Ugyldig sone «$1».',
	'webstore_no_deleted' => 'Inga arkivmappe for sletta filer er definert.',
	'webstore_curl' => 'Feil frå cURL: $1',
	'webstore_404' => 'Fil ikkje funne.',
	'webstore_php_warning' => 'PHP-åtvaring: $1',
	'webstore_metadata_not_found' => 'Fil ikkje funne: $1',
	'webstore_postfile_not_found' => 'Fil som skal postast er ikkje funne.',
	'webstore_scaler_empty_response' => 'Biletskaleraren gav eit tomt svar med ein 200-responskode. Dette kan vere på grunn av ein fatal PHP-feil i skaleraren.',
	'webstore_invalid_response' => 'Ugyldig svar frå tenar:

$1',
	'webstore_no_response' => 'Ingen respons frå tenar.',
	'webstore_backend_error' => 'Feil frå lagringstenar:

$1',
	'webstore_php_error' => 'Fann PHP-feil:',
	'webstore_no_handler' => 'Ingen handsamar for endring av denne MIME-typen',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'inplace_access_disabled' => 'Tilgangen til denne tjenesten har blitt slått av for alle klienter.',
	'inplace_access_denied' => 'Denne tjenesten begrenses av klientens IP.',
	'inplace_scaler_no_temp' => 'Ingen gyldig midlertidig mappe, sett $wgLocalTmpDirectory til en skrivbar mappe.',
	'inplace_scaler_not_enough_params' => 'Ikke not parametere.',
	'inplace_scaler_invalid_image' => 'Ugyldig bilde, kunne ikke fastslå størrelse.',
	'inplace_scaler_failed' => 'En feil oppsto under bildeskalering: $1',
	'inplace_scaler_no_handler' => 'Ingen behandler for endring av denne MIME-typen',
	'inplace_scaler_no_output' => 'Ingen endringsresultatfil ble produsert.',
	'inplace_scaler_zero_size' => 'Endringen produserte en tom resultatfil.',
	'webstore_access' => 'Tjenesten begrenses av klientens IP.',
	'webstore_path_invalid' => 'Filnavnet var ugyldig.',
	'webstore_dest_open' => 'Kunne ikke åpne målfil «$1».',
	'webstore_dest_lock' => 'Kunne ikke låses på målfil «$1».',
	'webstore_dest_mkdir' => 'Kunne ikke opprette målmappe «$1».',
	'webstore_archive_lock' => 'Kunne ikke låses på arkivfil «$1».',
	'webstore_archive_mkdir' => 'Kunne ikke opprette arkivmappe «$1».',
	'webstore_src_open' => 'Kunne ikke åpne kildefil «$1».',
	'webstore_src_close' => 'Feil under lukking av kildefil «$1».',
	'webstore_src_delete' => 'Feil under sletting av kildefil «$1».',
	'webstore_rename' => 'Feil under omdøping av «$1» til «$2».',
	'webstore_lock_open' => 'Feil under åpning av låsfil «$1».',
	'webstore_lock_close' => 'Feil under lukking av låsfil «$1».',
	'webstore_dest_exists' => 'Feil, målfilen «$1» finnes.',
	'webstore_temp_open' => 'Feil under åpning av midlertidig fil «$1».',
	'webstore_temp_copy' => 'Feil under kopiering av midlertidig fil «$1» til målfil «$2».',
	'webstore_temp_close' => 'Feil under lukking av midlertidig fil «$1».',
	'webstore_temp_lock' => 'Feil under låsing av midlertidig fil «$1».',
	'webstore_no_archive' => 'Målfilen finnes og ikke noe arkiv ble gitt.',
	'webstore_no_file' => 'Ingen fil ble lastet opp.',
	'webstore_move_uploaded' => 'Feil under flytting av opplastet fil «$1» til midlertidig sted «$2».',
	'webstore_invalid_zone' => 'Ugyldig sone «$1».',
	'webstore_no_deleted' => 'Ingen arkivmappe for slettede filer er angitt.',
	'webstore_curl' => 'Feil fra cURL: $1',
	'webstore_404' => 'Fil ikke funnet.',
	'webstore_php_warning' => 'PHP-advarsel: $1',
	'webstore_metadata_not_found' => 'Fil ikke funnet: $1',
	'webstore_postfile_not_found' => 'Fil  som skal postes ikke funnet.',
	'webstore_scaler_empty_response' => 'Bildeskalereren ga et tomt svar med en 200-responskode. Dette kan være på grunn av en fatal PHP-feil i  skalereren.',
	'webstore_invalid_response' => 'Ugyldig svar fra tjener:

$1',
	'webstore_no_response' => 'Ingen respons fra tjener.',
	'webstore_backend_error' => 'Feil fra lagringstjener:

$1',
	'webstore_php_error' => 'PHP-feil ble funnet:',
	'webstore_no_handler' => 'Ingen behandler for endring av denne MIME-typen',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'inplace_access_disabled' => "L'accès a aqueste servici es desactivat per totes los clients.",
	'inplace_access_denied' => 'Aqueste servici es restrench sus la basa del IP del client.',
	'inplace_scaler_no_temp' => "Pas cap de dorsièr temporari valid, \$wgLocalTmpDirectory deu conténer lo nom d'un dorsièr amb dreches d'escritura.",
	'inplace_scaler_not_enough_params' => 'Pas pro de paramètres',
	'inplace_scaler_invalid_image' => 'Imatge incorrècte, pòt pas determinar sa talha',
	'inplace_scaler_failed' => "Una error es susvenguda pendent la decompression/compression (« scaling ») de l'imatge : $1",
	'inplace_scaler_no_handler' => 'Cap de foncion (« handler ») per transformar aqueste format MIME.',
	'inplace_scaler_no_output' => 'Cap de fichièr de transformacion generit',
	'inplace_scaler_zero_size' => 'La transformacion a creat un fichièr de talha zèro.',
	'webstore-desc' => "Intergicial d'estocatge de fichièrs per Internet unicament (pas NFS)",
	'webstore_access' => 'Aqueste servici es restrench per adreça IP.',
	'webstore_path_invalid' => 'Lo nom de fichièr es pas corrècte.',
	'webstore_dest_open' => 'Impossible de dobrir lo fichièr de destinacion "$1".',
	'webstore_dest_lock' => 'Fracàs per obténer lo varrolhatge sul fichièr de destinacion « $1 ».',
	'webstore_dest_mkdir' => 'Impossible de crear lo repertòri "$1".',
	'webstore_archive_lock' => 'Fracàs per obténer lo varrolhatge del fichièr archivat « $1 ».',
	'webstore_archive_mkdir' => "Impossible de crear lo repertòri d'archivatge « $1 ».",
	'webstore_src_open' => 'Impossible de dobrir lo fichièr font « $1 ».',
	'webstore_src_close' => 'Error de tampadura del fichièr font « $1 ».',
	'webstore_src_delete' => 'Error de supression del fichièr font « $1 ».',
	'webstore_rename' => 'Error de renomatge del fichièr « $1 » en « $2 ».',
	'webstore_lock_open' => 'Error de dobertura del fichièr varrolhat « $1 ».',
	'webstore_lock_close' => 'Error de tampadura del fichièr varrolhat « $1 ».',
	'webstore_dest_exists' => 'Error, lo fichièr de destinacion « $1 » existís.',
	'webstore_temp_open' => 'Error de dobertura del fichièr temporari « $1 ».',
	'webstore_temp_copy' => 'Error de còpia del fichièr temporari « $1 » cap al fichièr de destinacion « $2 ».',
	'webstore_temp_close' => 'Error de tampadura del fichièr temporari « $1 ».',
	'webstore_temp_lock' => 'Error de varrolhatge del fichièr temporari « $1 ».',
	'webstore_no_archive' => "Lo fichièr de destinacion existís e cap d'archiu es pas estat balhat.",
	'webstore_no_file' => 'Cap de fichièr es pas estat telecargat.',
	'webstore_move_uploaded' => 'Error de desplaçament del fichièr telecargat « $1 » cap a l’emplaçament temporari « $2 ».',
	'webstore_invalid_zone' => 'Zòna « $1 » invalida.',
	'webstore_no_deleted' => 'Cap de repertòri d’archius pels fichièrs suprimits es pas estat definit.',
	'webstore_curl' => 'Error dempuèi cURL : $1',
	'webstore_404' => 'Fichièr pas trobat.',
	'webstore_php_warning' => 'Atencion de PHP: $1',
	'webstore_metadata_not_found' => 'Fichièr pas trobat : $1',
	'webstore_postfile_not_found' => "Fichièr d'enregistrar pas trobat.",
	'webstore_scaler_empty_response' => "L’escandilhatge de l'imatge a balhat una responsa nulla amb un còde de 200 responsas. Aquò poiriá èsser degut a una error de l'escandilhatge.",
	'webstore_invalid_response' => 'Responsa invalida dempuèi lo servidor :  

$1',
	'webstore_no_response' => 'Lo servidor respon pas',
	'webstore_backend_error' => "Error dempuèi lo servidor d'estocatge :  

$1",
	'webstore_php_error' => 'Las errors PHP seguentas son susvengudas',
	'webstore_no_handler' => 'Aqueste tipe MIME pòt pas èsser transformat.',
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$messages['os'] = array(
	'webstore_404' => 'Файл не ссардæуы.',
	'webstore_metadata_not_found' => 'Файл не ссардæуы: $1',
	'webstore_no_response' => 'Серверæй дзуапп нæ уыд',
);

/** Polish (Polski)
 * @author Derbeth
 * @author Sp5uhe
 * @author Wpedzich
 */
$messages['pl'] = array(
	'inplace_access_disabled' => 'Dostęp do tej usługi został wyłączony dla wszystkich klientów.',
	'inplace_access_denied' => 'Ta usługa jest ograniczona przez IP klienta.',
	'inplace_scaler_no_temp' => 'Nie istnieje poprawny katalog tymczasowy, ustaw $wgLocalTmpDirectory na zapisywalny katalog.',
	'inplace_scaler_not_enough_params' => 'Niewystarczająca liczba parametrów.',
	'inplace_scaler_invalid_image' => 'Niepoprawna grafika, nie można określić rozmiaru.',
	'inplace_scaler_failed' => 'Wystąpił błąd przy skalowaniu grafiki: $1',
	'inplace_scaler_no_handler' => 'Brak handlera dla transformacji tego typu MIME',
	'inplace_scaler_no_output' => 'Nie stworzono pliku wyjściowego transformacji.',
	'inplace_scaler_zero_size' => 'Transformacja stworzyła plik o zerowej wielkości.',
	'webstore_access' => 'Ta usługa ograniczona jest dla określonych adresów IP klienta.',
	'webstore_path_invalid' => 'Nieprawidłowa nazwa pliku.',
	'webstore_dest_open' => 'Nie udało się otworzyć pliku docelowego „$1”.',
	'webstore_dest_lock' => 'Nie udało się zablokować pliku docelowego „$1”.',
	'webstore_dest_mkdir' => 'Nie udało się stworzyć katalogu docelowego „$1”.',
	'webstore_archive_lock' => 'Nie udało się zablokować pliku archiwum „$1”.',
	'webstore_archive_mkdir' => 'Nie można utworzyć katalogu archiwum „$1”.',
	'webstore_src_open' => 'Nie udało się otworzyć pliku źródłowego „$1”.',
	'webstore_src_close' => 'Błąd podczas zamykania pliku źródłowego „$1”.',
	'webstore_src_delete' => 'Błąd podczas usuwania pliku źródłowego „$1”.',
	'webstore_rename' => 'Błąd zamiany nazwy pliku „$1” na „$2”.',
	'webstore_lock_open' => 'Błąd otwarcia pliku blokady „$1”.',
	'webstore_lock_close' => 'Błąd zamknięcia pliku blokady „$1”.',
	'webstore_dest_exists' => 'Błąd: Plik docelowy „$1” już istnieje.',
	'webstore_temp_open' => 'Błąd otwarcia pliku tymczasowego „$1”.',
	'webstore_temp_copy' => 'Błąd kopiowania pliku tymczasowego „$1” do lokalizacji „$2”.',
	'webstore_temp_close' => 'Błąd zamknięcia pliku tymczasowego „$1”.',
	'webstore_temp_lock' => 'Błąd zablokowania pliku tymczasowego „$1”.',
	'webstore_no_archive' => 'Plik docelowy już istnieje, nie podano też lokalizacji archiwum.',
	'webstore_no_file' => 'Nie przesłano pliku.',
	'webstore_move_uploaded' => 'Podczas przenoszenia przesłanego pliku „$1” do lokalizacji tymczasowej „$2” wystąpił błąd.',
	'webstore_invalid_zone' => 'Nieprawidłowa strefa „$1”.',
	'webstore_no_deleted' => 'Nie zdefiniowano katalogu archiwum dla usuwanych plików.',
	'webstore_curl' => 'Błąd cURL: $1',
	'webstore_404' => 'Nie odnaleziono pliku.',
	'webstore_php_warning' => 'Ostrzeżenie PHP $1',
	'webstore_metadata_not_found' => 'Nie odnaleziono pliku $1',
	'webstore_postfile_not_found' => 'Nie odnaleziono pliku do opublikowania.',
	'webstore_scaler_empty_response' => 'Moduł skalowania grafik zwrócił pustą odpowiedź z kodem błędu 200. Może to być wynikiem krytycznego błędu PHP w module skalowania.',
	'webstore_invalid_response' => 'Serwer odpowiedział nieprawidłowo:

$1',
	'webstore_no_response' => 'Serwer nie odpowiada',
	'webstore_backend_error' => 'Serwer przechowujący dane zwrócił błąd:

$1',
	'webstore_php_error' => 'Napotkano następujące błędy PHP:',
	'webstore_no_handler' => 'Nie odnaleziono handlera do obsługi danych tego typu MIME',
);

/** Piedmontese (Piemontèis)
 * @author Bèrto 'd Sèra
 */
$messages['pms'] = array(
	'inplace_access_disabled' => "Ës servissi-sì a l'é stàit dësmortà për tuti ij client.",
	'inplace_access_denied' => "Ës servissi-sì a l'é limità a sconda dl'adrëssa IP dël client.",
	'inplace_scaler_no_temp' => "A-i é gnun dossié provisòri bon, ch'a buta un valor ëd \$wgLocalTmpDirectory ch'a men-a a un dossié ch'as peulo scriv-se.",
	'inplace_scaler_not_enough_params' => 'A-i é pa basta ëd paràmetr.',
	'inplace_scaler_invalid_image' => "Figura nen bon-a, a l'é nen podusse determiné l'amzura.",
	'inplace_scaler_failed' => "A l'é riva-ie n'eror ën ardimensionand la figura: $1",
	'inplace_scaler_no_handler' => "A-i manca l'utiss (handler) për ardimensioné sta sòrt MIME-sì",
	'inplace_scaler_no_output' => "La trasformassion a l'ha nen dàit gnun archivi d'arzultà.",
	'inplace_scaler_zero_size' => "La transformassion a l'ha dàit n'archivi d'arzultà veujd.",
	'webstore_access' => "Ës servissi-sì a l'é limità a sconda dl'adrëssa IP dël client.",
	'webstore_path_invalid' => "Ël nòm dl'archivi a l'é nen bon.",
	'webstore_dest_open' => 'As peul nen deurbe l\'archivi ëd destinassion "$1".',
	'webstore_dest_lock' => 'A l\'é nen podusse sëré ël luchèt ansima a l\'archivi ëd destinassion "$1".',
	'webstore_dest_mkdir' => 'A l\'é nen podusse creé ël dossié ëd destinassion "$1".',
	'webstore_archive_lock' => 'A l\'é nen podusse sëré ël luchèt ansima a l\'archivi "$1".',
	'webstore_archive_mkdir' => 'A l\'é nen podusse creé ël dossié da archivi "$1".',
	'webstore_src_open' => 'A l\'é nen podusse deurbe l\'archivi sorgiss "$1".',
	'webstore_src_close' => 'A l\'é riva-ie n\'eror ën sërand l\'archivi sorgiss "$1".',
	'webstore_src_delete' => 'A l\'é riva-ie n\'eror ën scanceland l\'archivi sorgiss "$1".',
	'webstore_rename' => 'A l\'é riva-ie n\'eror ën arbatiand l\'archivi "$1" coma "$2".',
	'webstore_lock_open' => 'A l\'é riva-ie n\'eror ën duvertand l\'archivi-luchèt "$1".',
	'webstore_lock_close' => 'A l\'é riva-ie n\'eror ën sërand l\'archivi-luchèt "$1".',
	'webstore_dest_exists' => 'Eror, l\'archivi ëd destinassion "$1" a-i é già.',
	'webstore_temp_open' => 'A l\'é riva-ie n\'eror ën duvertand l\'archivi provisòri "$1".',
	'webstore_temp_copy' => 'A l\'é riva-ie n\'eror ën tracopiand l\'archivi provisòri "$1" a l\'archivi ëd destinassion "$2".',
	'webstore_temp_close' => 'A l\'é riva-ie n\'eror ën sërand l\'archivi provisòri "$1".',
	'webstore_temp_lock' => "A l'é riva-ie n'eror ën butand-je 'l luchèt a l'archivi provisòri \"\$1\".",
	'webstore_no_archive' => "L'archivi ëd destinassion a-i é già e a l'é butasse gnun archivi.",
	'webstore_no_file' => 'Pa gnun archivi carià.',
	'webstore_move_uploaded' => 'A l\'é riva-ie n\'eror an tramudand l\'archivi carià "$1" a la locassion provisòria "$2".',
	'webstore_invalid_zone' => 'Zòna "$1" nen bon-a.',
	'webstore_no_deleted' => "A l'é pa specificasse gnun dossié da archivi për coj ch'as ëscancelo.",
	'webstore_curl' => "Eror da 'nt l'adrëssa (cURL): $1",
	'webstore_404' => 'Archivi nen trovà.',
	'webstore_php_warning' => 'Avis dël PHP: $1',
	'webstore_metadata_not_found' => 'Archivi nen trovà: $1',
	'webstore_postfile_not_found' => 'Archivi da mandé nen trovà.',
	'webstore_scaler_empty_response' => "Ël programa d'ardimensionament dle figure a l'ha dàit n'arspòsta veujda con un còdes d'arspòsta 200. Sòn a podrìa esse rivà për via d'un eror fatal ant ël PHP dël programa.",
	'webstore_invalid_response' => "Arspòsta nen bon-a da 'nt ël servent: $1",
	'webstore_no_response' => "Pa d'arspòsta da 'nt ël servent.",
	'webstore_backend_error' => "Eror da 'nt ël servent da stocagi: $1",
	'webstore_php_error' => "A son riva-ie dj'eror dël PHP:",
	'webstore_no_handler' => "A-i manca l'utiss (handler) për ardimensioné sta sòrt MIME-sì",
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'webstore_path_invalid' => 'د دوتنې نوم مو سم نه وو.',
	'webstore_no_file' => 'هېڅ کومه دوتنه پورته نه شوه.',
	'webstore_invalid_zone' => 'ناسمه سيمه "$1".',
	'webstore_404' => 'دوتنه و نه موندل شوه.',
	'webstore_php_warning' => 'د PHP ګواښنه: $1',
	'webstore_metadata_not_found' => 'دوتنه و نه موندل شوه: $1',
	'webstore_no_response' => 'د پالنګر نه هېڅ کوم ځواب نشته',
	'webstore_backend_error' => 'د زېرمتون د پالنګر لخوا تېروتنه:

$1',
);

/** Portuguese (Português)
 * @author Lijealso
 * @author Malafaya
 */
$messages['pt'] = array(
	'inplace_access_disabled' => 'O acesso a este serviço foi desabilitado para todos os clientes.',
	'inplace_access_denied' => 'Este serviço está restringido por IP de cliente.',
	'inplace_scaler_no_temp' => 'Não existe directoria temporária, defina $wgLocalTmpDirectory com uma directoria onde seja possível escrever.',
	'inplace_scaler_not_enough_params' => 'Parâmetros insuficientes.',
	'inplace_scaler_invalid_image' => 'Imagem inválida. Não foi possível determinar o tamanho.',
	'inplace_scaler_failed' => 'Foi encontrado um erro durante o escalamento da imagem: $1',
	'webstore_path_invalid' => 'O nome de ficheiro é inválido.',
	'webstore_no_file' => 'Nenhum arquivo foi carregado.',
	'webstore_invalid_zone' => 'Zona "$1" inválida.',
	'webstore_404' => 'Ficheiro não encontrado.',
	'webstore_php_warning' => 'Aviso PHP: $1',
	'webstore_metadata_not_found' => 'Ficheiro não encontrado: $1',
	'webstore_invalid_response' => 'Resposta inválida do servidor:

$1',
	'webstore_no_response' => 'Sem resposta do servidor',
	'webstore_php_error' => 'Foram encontrados erros PHP:',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'inplace_scaler_not_enough_params' => 'Parametri insuficienţi.',
	'webstore_path_invalid' => 'Numele fişierului a fost incorect.',
	'webstore_curl' => 'Eroare de la cURL: $1',
	'webstore_php_warning' => 'Avertizare PHP: $1',
	'webstore_invalid_response' => 'Răspuns incorect de la server:

$1',
	'webstore_no_response' => 'Nici un răspuns de la server',
	'webstore_backend_error' => 'Eroare de la serverul de stocare:

$1',
	'webstore_php_error' => 'Au fost întâlnite erori PHP:',
);

/** Russian (Русский)
 * @author Ferrer
 * @author Rubin
 */
$messages['ru'] = array(
	'inplace_access_disabled' => 'Доступ у сервису был отключён для всех клиентов',
	'inplace_scaler_not_enough_params' => 'Недостаточно параметров.',
	'webstore_path_invalid' => 'Неверное имя файла.',
	'webstore_404' => 'Файл не найден.',
	'webstore_metadata_not_found' => 'Файл не найден: $1',
	'webstore_no_response' => 'Нет ответа от сервера.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'inplace_access_disabled' => 'Prístup k tejto službe bol vypnutý pre všetkých klientov.',
	'inplace_access_denied' => 'Táto služba je obmedzená na určené klientské IP adresy.',
	'inplace_scaler_no_temp' => 'Dočasný adresár nie je platný, nastavte $wgLocalTmpDirectory na zapisovateľný adresár.',
	'inplace_scaler_not_enough_params' => 'Nedostatok parametrov.',
	'inplace_scaler_invalid_image' => 'Neplatný obrázok, nebolo možné určiť veľkosť.',
	'inplace_scaler_failed' => 'Počas zmeny veľkosti obrázka sa vyskytla chyba: $1',
	'inplace_scaler_no_handler' => 'Pre transformáciu tohto typu MIME neexistuje obsluha',
	'inplace_scaler_no_output' => 'Nebol vytvorený výstupný súbor tejto transformácie.',
	'inplace_scaler_zero_size' => 'Transformácia vytvorila výstupný súbor s nulovou veľkosťou.',
	'webstore-desc' => 'Middleware pre iba webové (nie NFS) úložisko',
	'webstore_access' => 'Táto služba je obmedzená na určené klientské IP adresy.',
	'webstore_path_invalid' => 'Názov súboru bol neplatný.',
	'webstore_dest_open' => 'Nebolo možné otvoriť cieľový súbor „$1“.',
	'webstore_dest_lock' => 'Nebolo možné záskať zámok na cieľový súbor „$1“.',
	'webstore_dest_mkdir' => 'Nebolo možné vytvoriť cieľový adresár „$1“.',
	'webstore_archive_lock' => 'Nebolo možné získať zámok na súbor archívu „$1“.',
	'webstore_archive_mkdir' => 'Nebolo možné vytvoriť archívny adresár „$1“.',
	'webstore_src_open' => 'Nebolo možné otvoriť zdrojový súbor „$1“.',
	'webstore_src_close' => 'Chyba pri zatváraní zdrojového súboru „$1“.',
	'webstore_src_delete' => 'Chyba pri mazaní zdrojového súboru „$1“.',
	'webstore_rename' => 'Chyba pri premenovávaní súboru „$1“ na „$2“.',
	'webstore_lock_open' => 'Chyba pri otváraní súboru zámku „$1“.',
	'webstore_lock_close' => 'Chyba pri zatváraní súboru zámku „$1“.',
	'webstore_dest_exists' => 'Chyba, cieľový súbor „$1“ existuje.',
	'webstore_temp_open' => 'Chyba pri otváraní dočasného súboru „$1“.',
	'webstore_temp_copy' => 'Chyba pri kopírovaní dočasného súboru „$1“ do cieľového súboru „$2“.',
	'webstore_temp_close' => 'Chyba pri zatváraní dočasného súboru „$1“.',
	'webstore_temp_lock' => 'Chyba pri zamykaní dočasného súboru „$1“.',
	'webstore_no_archive' => 'Cieľový súbor existuje a nebol zadaný archív.',
	'webstore_no_file' => 'Žiadny súbor nebol nahraný.',
	'webstore_move_uploaded' => 'Chyba pri presúvaní nahraného súboru „$1“ na dočasné miesto „$2“.',
	'webstore_invalid_zone' => 'Neplatné zóna „$1“.',
	'webstore_no_deleted' => 'Nebol definovaný žiadny archívny adresár pre zmazané súbory.',
	'webstore_curl' => 'Chýba od cURL: $1',
	'webstore_404' => 'Súbor nenájdený.',
	'webstore_php_warning' => 'Upozornenie PHP: $1',
	'webstore_metadata_not_found' => 'Súbor nebol nájdený: $1',
	'webstore_postfile_not_found' => 'Súbor na odoslanie nebol nájdený.',
	'webstore_scaler_empty_response' => 'Zmena veľkosti obrázka vrátila prázdnu odpoveď s kódom 200. Toto by mohlo znamenať kritickú chybu PHP pri zmene veľkosti obrázka.',
	'webstore_invalid_response' => 'Neplatná odpoveď od servera:

$1',
	'webstore_no_response' => 'Žiadna odpoveď od servera',
	'webstore_backend_error' => 'Chyba od úložného servera:

$1',
	'webstore_php_error' => 'Vyskytli sa chyby PHP:',
	'webstore_no_handler' => 'Pre transformáciu tohto typu MIME neexistuje obsluha',
);

/** Swedish (Svenska)
 * @author M.M.S.
 */
$messages['sv'] = array(
	'inplace_access_disabled' => 'Tillgången till den här tjänsten har stängts av för alla klienter.',
	'inplace_access_denied' => 'Den här tjänsten begränsas av klientens IP.',
	'inplace_scaler_no_temp' => 'Ingen giltig temporär mapp.
Ange $wgLocalTmpDirectory till en skrivbar mapp.',
	'inplace_scaler_not_enough_params' => 'Inte några parametrar.',
	'inplace_scaler_invalid_image' => 'Ogiltig bild, kunde inte fastslå storlek.',
	'inplace_scaler_failed' => 'Ett fel uppstod under bildskalering: $1',
	'inplace_scaler_no_handler' => 'Ingen behandlare för ändring av den här MIME-typen',
	'inplace_scaler_no_output' => 'Ingen ändringsresultatsfil producerades.',
	'inplace_scaler_zero_size' => 'Ändringen producerade en tom resultatsfil.',
	'webstore_access' => 'Tjänsten begränsas av klientens IP.',
	'webstore_path_invalid' => 'Filnamnet var ogiltigt.',
	'webstore_dest_open' => 'Kunde inte öppna målfil "$1".',
	'webstore_dest_lock' => 'Kunde inte låsas på målfil "$1".',
	'webstore_dest_mkdir' => 'Kunde inte skapa målmapp "$1".',
	'webstore_archive_lock' => 'Kunde inte låsas på arkivfil "$1".',
	'webstore_archive_mkdir' => 'Kunde inte skapa arkivmapp "$1".',
	'webstore_src_open' => 'Kunde inte öppna källfil "$1".',
	'webstore_src_close' => 'Fel under stängning av källfil "$1".',
	'webstore_src_delete' => 'Fel under radering av källfil "$1".',
	'webstore_rename' => 'Fel under namnbyte av "$1" till "$2".',
	'webstore_lock_open' => 'Fel under öppning av låsfil "$1".',
	'webstore_lock_close' => 'Fel under stängning av låsfil "$1".',
	'webstore_dest_exists' => 'Fel, målfilen "$1" existerar.',
	'webstore_temp_open' => 'Fel under öppning av temporär fil "$1".',
	'webstore_temp_copy' => 'Fel under kopiering av temporär fil "$1" till målfil "$2".',
	'webstore_temp_close' => 'Fel under låsning av temporär fil "$1".',
	'webstore_temp_lock' => 'Fel under låsning av temporär fil "$1".',
	'webstore_no_archive' => 'Målfilen existerar och inget arkiv angavs.',
	'webstore_no_file' => 'Ingen fil laddades upp.',
	'webstore_move_uploaded' => 'Fel under flyttning av uppladdad fil "$1" till temporär plats "$2".',
	'webstore_invalid_zone' => 'Ogiltig zon "$1".',
	'webstore_no_deleted' => 'Ingen arkivmapp för raderade filer angavs.',
	'webstore_curl' => 'Fel från cURL: $1',
	'webstore_404' => 'Filen hittades inte.',
	'webstore_php_warning' => 'PHP-varning: $1',
	'webstore_metadata_not_found' => 'Filen hittades inte: $1',
	'webstore_postfile_not_found' => 'Fil som ska postas hittades inte.',
	'webstore_scaler_empty_response' => 'Bildskaleraren gav ett tomt svar med en 200-responskod.
Detta kan bero på ett fatalt PHP-fel i skaleraren.',
	'webstore_invalid_response' => 'Ogiltigt svar från servern:

$1',
	'webstore_no_response' => 'Inget svar från servern.',
	'webstore_backend_error' => 'Fel från lagringsservern:

$1',
	'webstore_php_error' => 'PHP-fel hittades:',
	'webstore_no_handler' => 'Ingen behandlare för ändring av denna MIME-typ',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'inplace_scaler_invalid_image' => 'తప్పుడు బొమ్మ, పరిమాణాన్ని నిర్ణయించలేకున్నాం.',
	'webstore_path_invalid' => 'ఫైలుపేరు తప్పుగా ఉంది.',
	'webstore_dest_exists' => 'పొరపాటు, "$1" అనే గమ్యస్థానపు ఫైలు ఇప్పటికే ఉంది.',
	'webstore_temp_open' => '"$1" అనే తాత్కాలిక ఫైలుని తెరవడంలో పొరపాటు.',
	'webstore_temp_close' => '"$1" అనే తాత్కాలిక ఫైలుని మూయడంలో పొరపాటు.',
	'webstore_404' => 'ఫైలు కనబడలేదు.',
	'webstore_php_warning' => 'PHP హెచ్చరిక: $1',
	'webstore_metadata_not_found' => 'ఫైలు కనబడలేదు: $1',
	'webstore_invalid_response' => 'సర్వరు నుండి తప్పుడు స్పందన:

$1',
	'webstore_no_response' => 'సర్వరునుండి స్పందన లేదు',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'inplace_scaler_not_enough_params' => 'Параметрҳо нокифоя.',
	'webstore_path_invalid' => 'Номи парванда номӯътабар буд.',
	'webstore_no_file' => 'Ҳеҷ парвандае бор нашудааст.',
	'webstore_invalid_zone' => 'Ноҳияи номӯътабар "$1".',
	'webstore_no_deleted' => 'Ҳеҷ пӯшаи бойгонӣ барои парвандаҳои ҳазфшуда мушаххас нашудааст.',
	'webstore_404' => 'Парванда ёфт нашуд.',
	'webstore_php_warning' => 'Ҳушдори PHP: $1',
	'webstore_metadata_not_found' => 'Парванда ёфт нашуд: $1',
	'webstore_postfile_not_found' => 'Парванда барои фиристодан ёфт нашуд.',
	'webstore_php_error' => 'Хатоҳои PHP рух доданд:',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'inplace_access_disabled' => 'Hindi pinaandar para sa lahat ng mga kliyente ang akseso o daan para sa ganitong paglilingkod/serbisyo .',
	'inplace_access_denied' => 'Ipinagbawal ng IP ng kliyente ang ganitong paglilingkod/serbisyo.',
	'inplace_scaler_no_temp' => 'Walang tanggap na pansamantalang direktoryo.
Itakda sa isang nasusulatan/masusulatang direktoryo ang $wgLocalTmpDirectory',
	'inplace_scaler_not_enough_params' => 'Hindi sapat na mga parametro (sukat).',
	'inplace_scaler_invalid_image' => 'Hindi tanggap na larawan, hindi matukoy ang sukat.',
	'inplace_scaler_failed' => 'May dinanas/nasalubong na kamalian habang sinusukat ang larawan: $1',
	'inplace_scaler_no_handler' => 'Walang tagapamahalang magsasagawa ng pagbago sa anyo ng ganitong uri ng MIME',
	'inplace_scaler_no_output' => 'Walang nagawang produkto/kinalabasang talaksan ng pagbabago.',
	'inplace_scaler_zero_size' => 'Nakagawa ang pagbabagong-anyo ng isang walang sukat na produkto/kinalabasang talaksan',
	'webstore-desc' => 'Pang-web lamang (hindi pang-NFS) na panggitnang-gamit na taguan ng talaksan',
	'webstore_access' => 'Pinagbawalan ng kliyente ng IP ang ganitong paglilingkod/serbisyo.',
	'webstore_path_invalid' => 'Hindi tanggap ang pangalan ng talaksan.',
	'webstore_dest_open' => 'Hindi nabuksan/mabuksan ang bukas na patutunguhang talaksang "$1".',
	'webstore_dest_lock' => 'Nabigo ang pagkapit/pagkabit sa patutunguhang talaksang "$1".',
	'webstore_dest_mkdir' => 'Hindi nagawang/magawang likhain ang patutunguhang direktoryong "$1".',
	'webstore_archive_lock' => 'Nabigo sa pagkapit/pagkabit sa sinupan/arkibong talaksang "$1".',
	'webstore_archive_mkdir' => 'Nabigo sa paglikha ng sinupan/arkibong direktoryong "$1".',
	'webstore_src_open' => 'Nabigo sa pagbukas ng pinagmulang talaksang "$1".',
	'webstore_src_close' => 'May kamalian sa pagsasara ng pinagmulang talaksang "$1".',
	'webstore_src_delete' => 'May kamalian sa pagbura ng pinagmulang talaksang "$1".',
	'webstore_rename' => 'May kamalian sa muling pagpapangalan ng talaksan mula sa "$1" patungong (upang maging) "$2".',
	'webstore_lock_open' => 'May kamalian sa pagbubukas ng may kandadong talaksang "$1".',
	'webstore_lock_close' => 'May kamalian sa pagsasara ng may kandadong talaksang "$1".',
	'webstore_dest_exists' => 'Kamalian, umiiral na ang kapupuntahang talaksang "$1".',
	'webstore_temp_open' => 'May kamalian sa pagbubukas ng pansamantalang talaksang "$1".',
	'webstore_temp_copy' => 'May kamalian sa pagkopya ng pansamantalang talaksang "$1" papunta sa kapupuntahang talaksang "$2".',
	'webstore_temp_close' => 'May kamalian sa pagsasara ng pansamantalang talaksang "$1".',
	'webstore_temp_lock' => 'May kamalian sa pagkakandado ng pansamantalang talaksang "$1".',
	'webstore_no_archive' => 'Umiiral ang kapupuntahang talaksan at walang ibinigay na sinupan/arkibo.',
	'webstore_no_file' => 'Walang naikargang talaksan.',
	'webstore_move_uploaded' => 'May kamalian sa paglilipat na ikinargang talaksang "$1" papunta sa pansamantalang lokasyon/pook na "$2".',
	'webstore_invalid_zone' => 'Hindi tanggap ang sonang "$1".',
	'webstore_no_deleted' => 'Walang nilarawang direktoryong sinupan/pang-arkibo para sa nabura/binurang mga talaksan.',
	'webstore_curl' => 'May kamalian mula sa cURL: $1',
	'webstore_404' => 'Hindi natagpuan ang talaksan.',
	'webstore_php_warning' => 'Babala ng PHP: $1',
	'webstore_metadata_not_found' => 'Hindi natagpuang talaksan: $1',
	'webstore_postfile_not_found' => 'Hindi natagpuan ang itatalang talaksan.',
	'webstore_scaler_empty_response' => 'Nagbigay ng walang lamang tugon (sagot) ang manunukat/tagapagsukat ng larawan na may kodigo sa pagtugong 200.
Maaaring dahil ito sa isang malubhang kamaliang pang-PHP sa loob ng pansukat.',
	'webstore_invalid_response' => 'Hindi tanggap na tugon mula sa serbidor:

$1',
	'webstore_no_response' => 'Walang tugon mula sa serbidor',
	'webstore_backend_error' => 'Kamalian mula sa taguang serbidor:

$1',
	'webstore_php_error' => 'May nasalubong na (nakaranas ng) mga kamaliang pang-PHP:',
	'webstore_no_handler' => 'Walang tagapamahala para sa pagbabago ng anyo ng ganitong uri ng MIME',
);

/** Turkish (Türkçe)
 * @author Karduelis
 */
$messages['tr'] = array(
	'webstore_404' => 'Dosya bulunamadı.',
	'webstore_metadata_not_found' => '$1 dosyası bulunamadı',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'webstore_curl' => 'Lỗi cURL: $1',
	'webstore_php_warning' => 'Cảnh báo PHP: $1',
);

