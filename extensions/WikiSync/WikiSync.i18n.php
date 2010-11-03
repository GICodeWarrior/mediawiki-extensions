<?php

/**
 * Messages list.
 */

$messages = array();

/** English (English)
 * @author QuestPC
 */
$messages['en'] = array(
	'wikisync' => 'Wiki synchronization',
	'wikisync-desc' => 'Provides a [[Special:WikiSync|special page]] to synchronize recent changes of two wikis - local one and remote one',
	'wikisync_direction' => 'Please choose the direction of synchronization',
	'wikisync_local_root' => 'Local wiki site root',
	'wikisync_remote_root' => 'Remote wiki site root',
	'wikisync_remote_log' => 'Remote operations log',
	'wikisync_clear_log' => 'Clear log',
	'wikisync_login_to_remote_wiki' => 'Login to remote wiki',
	'wikisync_remote_wiki_root' => 'Remote wiki root',
	'wikisync_remote_wiki_example' => 'Path to api.php, for example: http://www.mediawiki.org/w',
	'wikisync_remote_wiki_user' => 'Remote wiki user name',
	'wikisync_remote_wiki_pass' => 'Remote wiki password',
	'wikisync_remote_login_button' => 'Log in',
	'wikisync_sync_files' => 'Synchronize files',
	'wikisync_synchronization_button' => 'Synchronize',
	'wikisync_log_imported_by' => 'Imported by [[Special:WikiSync|WikiSync]]',
	'wikisync_log_uploaded_by' => 'Uploaded by [[Special:WikiSync|WikiSync]]',
	'wikisync_api_result_unknown_action' => 'Unknown API action',
	'wikisync_api_result_exception' => 'Exception occured in local API call',
	'wikisync_api_result_noaccess' => 'Only members of the following groups can perform this action: $1',
	'wikisync_api_result_invalid_parameter' => 'Invalid value of parameter',
	'wikisync_api_result_http' => 'HTTP error while querying data from remote API',
	'wikisync_api_result_Unsupported' => 'Your version of MediaWiki is unsupported (less than 1.15)',
	'wikisync_api_result_NoName' => 'You did not set the lgname parameter',
	'wikisync_api_result_Illegal' => 'You provided an illegal username',
	'wikisync_api_result_NotExists' => 'The username you provided does not exist',
	'wikisync_api_result_EmptyPass' => 'You did not set the lgpassword parameter or you left it empty',
	'wikisync_api_result_WrongPass' => 'The password you provided is incorrect',
	'wikisync_api_result_WrongPluginPass' => 'Same as WrongPass, returned when an authentication plugin rather than MediaWiki itself rejected the password',
	'wikisync_api_result_CreateBlocked' => 'The wiki tried to automatically create a new account for you, but your IP address has been blocked from account creation',
	'wikisync_api_result_Throttled' => 'You have logged in too many times in a short time.',
	'wikisync_api_result_Blocked' => 'User is blocked',
	'wikisync_api_result_mustbeposted' => 'The login module requires a POST request',
	'wikisync_api_result_NeedToken' => 'Either you did not provide the login token or the sessionid cookie. Request again with the token and cookie given in this response',
	'wikisync_api_result_no_import_rights' => 'This user is not allowed to import XML dump files',
	'wikisync_api_result_Success' => 'Successfully logged into remote wiki site',
	'wikisync_js_last_op_error' => 'Last operation returned an error.

Code: $1

Message: $2

Press [OK] to retry last operation',
	'wikisync_js_synchronization_confirmation' => 'Are you sure you want to synchronize

from $1
	
to $2
	
starting from revision $3?',
	'wikisync_js_synchronization_success' => 'Synchronization was completed successfully',
	'wikisync_js_already_synchronized' => 'Source and destination wikis seems to be already synchronized',
	'wikisync_js_sync_to_itself' => 'You cannot synchronize the wiki to itself',
	'wikisync_js_diff_search' => 'Looking for difference in destination revisions',
	'wikisync_js_revision' => 'Revision $1',
	'wikisync_js_file_size_mismatch' => 'Temporary file "$1" size ($2 bytes) does not match required size ($3 bytes). Make sure the file $4 was not manually overwritten in repository of source wiki.', // FIXME: needs plural support.
);

/** Message documentation (Message documentation)
 * @author Тест
 */
$messages['qqq'] = array(
	'wikisync_remote_login_button' => '{{Identical|Log in}}',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'wikisync' => 'Synchronisation inter wikis',
	'wikisync-desc' => 'Forni un [[Special:WikiSync|pagina special]] pro synchronisar le modificationes recente de duo wikis - un local e un remote',
	'wikisync_direction' => 'Selige le direction del synchronisation',
);

/** Russian (Русский)
 * @author QuestPC
 */
$messages['ru'] = array(
	'wikisync' => 'Синхронизация вики сайтов',
	'wikisync-desc' => 'Предоставляет специальную страницу [[Special:WikiSync]] для автоматической синхронизации последних изменений двух вики-сайтов - удалённого сайта и его локальной копии.',
	'wikisync_direction' => 'Пожалуйста выберите направление синхронизации',
	'wikisync_local_root' => 'Корневой адрес локального сайта',
	'wikisync_remote_root' => 'Корневой адрес удалённого сайта',
	'wikisync_remote_log' => 'Журнал удалённых действий',
	'wikisync_clear_log' => 'Очистить журнал',
	'wikisync_login_to_remote_wiki' => 'Зайти на удалённый сайт',
	'wikisync_remote_wiki_root' => 'Корневой адрес удалённого сайта',
	'wikisync_remote_wiki_example' => 'путь к api.php, например: http://www.mediawiki.org/w',
	'wikisync_remote_wiki_user' => 'Имя пользователя удалённого сайта',
	'wikisync_remote_wiki_pass' => 'Пароль на удалённом сайте',
	'wikisync_remote_login_button' => 'Зайти',
	'wikisync_sync_files' => 'Синхронизировать файлы',
	'wikisync_synchronization_button' => 'Синхронизировать',
	'wikisync_log_imported_by' => 'Импортировано с помощью [[Special:WikiSync]]',
	'wikisync_log_uploaded_by' => 'Загружено с помощью [[Special:WikiSync]]',
	'wikisync_api_result_unknown_action' => 'Неизвестное действие (action) API',
	'wikisync_api_result_noaccess' => 'Только пользователи, входящие в нижеперечисленные группы, могут выполнять указанное действие: ($1)',
	'wikisync_api_result_Illegal' => 'Недопустимое имя пользователя',
	'wikisync_api_result_NotExists' => 'Такого пользователя не существует',
	'wikisync_api_result_WrongPass' => 'Неверный пароль',
	'wikisync_api_result_WrongPluginPass' => 'Неверный пароль для плагина авторизации',
	'wikisync_api_result_Throttled' => 'Слишком много логинов в течение короткого времени.',
	'wikisync_api_result_Blocked' => 'Пользователь заблокирован',
	'wikisync_api_result_no_import_rights' => 'У пользователя нет прав на импортирование xml дампов',
	'wikisync_api_result_Success' => 'Успешный заход на удалённый вики сайт',
	'wikisync_js_last_op_error' => 'Последнее действие вызвало ошибку
Код ошибки: $1
Сообщение: $2
Нажмите [OK], чтобы попытаться повторить последнее действие',
	'wikisync_js_synchronization_confirmation' => 'Вы уверены в том что хотите синхронизировать последние изменения
с $1
на $2
начиная с ревизии $3?',
	'wikisync_js_synchronization_success' => 'Синхронизация успешно завершена',
	'wikisync_js_already_synchronized' => 'Исходный и назначенный вики-сайты выглядят уже синхронизированными',
	'wikisync_js_sync_to_itself' => 'Невозможно синхронизировать вики сайт сам в себя',
	'wikisync_js_diff_search' => 'Поиск отличий в ревизиях вики-сайта назначения',
	'wikisync_js_revision' => 'Ревизия $1',
	'wikisync_js_file_size_mismatch' => 'Размер временного файла $1 ($2 байт) не соответствует требуемому размеру файла ($3 байт). Пожалуйста убедитесь, что файл $4 не был переписан вручную в репозиторий исходного вики-сайта.',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'wikisync_remote_login_button' => 'ప్రవేశించండి',
);

/** Ukrainian (Українська)
 * @author Тест
 */
$messages['uk'] = array(
	'wikisync' => 'Синхронізація вікі',
	'wikisync_direction' => 'Будь ласка, оберіть напрямок синхронізації',
	'wikisync_clear_log' => 'Очистити журнал',
	'wikisync_remote_login_button' => 'Увійти',
	'wikisync_sync_files' => 'Синхронізувати файли',
	'wikisync_synchronization_button' => 'Синхронізувати',
	'wikisync_api_result_invalid_parameter' => 'Неприпустиме значення параметра',
	'wikisync_api_result_WrongPass' => 'Пароль, що ви вказали — невірний',
	'wikisync_js_synchronization_success' => 'Синхронізацію успішно завершено',
	'wikisync_js_sync_to_itself' => 'Ви не можете синхронізувати вікі саму до себе',
	'wikisync_js_revision' => 'Версія $1',
);

