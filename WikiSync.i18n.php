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
	'wikisync_remote_wiki_example' => 'path to api.php, for example: http://www.mediawiki.org/w',
	'wikisync_remote_wiki_user' => 'Remote wiki user name',
	'wikisync_remote_wiki_pass' => 'Remote wiki password',
	'wikisync_remote_login_button' => 'Log in',
	'wikisync_sync_files' => 'Synchronize files',
	'wikisync_store_password' => 'Store remote wiki password',
	'wikisync_synchronization_button' => 'Synchronize',
	'wikisync_scheduler_log' => 'Scheduler log',
	'wikisync_scheduler_setup' => 'Scheduler setup',
	'wikisync_scheduler_turn_on' => 'Turn on the scheduler',
	'wikisync_scheduler_switch_direction' => 'Automatically switch the direction of synchronization',
	'wikisync_scheduler_time_interval' => 'Time in minutes between automatical synchronizations',
	'wikisync_apply_button' => 'Apply',
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
	'wikisync_api_result_EmptyPass' => 'You didn\'t set the lgpassword parameter or you left it empty',
	'wikisync_api_result_WrongPass' => 'The password you provided is incorrect',
	'wikisync_api_result_WrongPluginPass' => 'The password you provided is incorrect',
	'wikisync_api_result_CreateBlocked' => 'The wiki tried to automatically create a new account for you, but your IP address has been blocked from account creation',
	'wikisync_api_result_Throttled' => 'You have logged in too many times in a short time.',
	'wikisync_api_result_Blocked' => 'User is blocked',
	'wikisync_api_result_mustbeposted' => 'The login module requires a POST request',
	'wikisync_api_result_NeedToken' => 'Either you did not provide the login token or the sessionid cookie. Request again with the token and cookie given in this response',
	'wikisync_api_result_no_import_rights' => 'This user is not allowed to import xml dump files',
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
	'wikisync_js_file_size_mismatch' => 'Temporary file "$1" size ($2 {{PLURAL:$2|byte|bytes}}) does not match required size ($3 {{PLURAL:$3|byte|bytes}}). Make sure the file "$4" was not manually overwritten in repository of source wiki.',
	'wikisync_js_invalid_scheduler_time' => 'Scheduler time must be a positive integer number',
	'wikisync_js_scheduler_countdown' => '$1 {{PLURAL:$1|minute|minutes}} left',
	'wikisync_js_sync_start_ltr' => 'Starting the synchronization from local wiki to remote wiki at $1',
	'wikisync_js_sync_start_rtl' => 'Starting the synchronization from remote wiki to local wiki at $1',
	'wikisync_js_sync_end_ltr' => 'Finished the synchronization from local wiki to remote wiki at $1',
	'wikisync_js_sync_end_rtl' => 'Finished the synchronization from remote wiki to local wiki at $1',
);


/** Message documentation (Message documentation)
 * @author Тест
 */
$messages['qqq'] = array(
	'wikisync_remote_login_button' => '{{Identical|Log in}}',
	'wikisync_api_result_WrongPluginPass' => 'Same as WrongPass, returned when an authentication plugin rather than MediaWiki itself rejected the password',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'wikisync' => 'Wiki-sinchronisasie',
	'wikisync_clear_log' => 'Maak logoek skoon',
	'wikisync_sync_files' => 'Sinchroniseer lêers',
	'wikisync_synchronization_button' => 'Sinchroniseer',
	'wikisync_api_result_Blocked' => 'Die gebruiker is geblokkeer',
	'wikisync_js_revision' => 'Weergawe $1',
);

/** Breton (Brezhoneg)
 * @author Y-M D
 */
$messages['br'] = array(
	'wikisync_remote_login_button' => 'Kevreañ',
	'wikisync_sync_files' => 'Sinkronelañ restroù',
	'wikisync_synchronization_button' => 'Sinkronaat',
	'wikisync_log_imported_by' => 'Enporzhiet gant [[Special:WikiSync|WikiSync]]',
	'wikisync_log_uploaded_by' => 'Karget gant [[Special:WikiSync|WikiSync]]',
	'wikisync_api_result_Blocked' => 'Implijer stanket',
	'wikisync_js_revision' => 'Adweladenn $1',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'wikisync' => 'Wiki sinhronizacija',
	'wikisync-desc' => 'Omogućava [[Special:WikiSync|posebnu stranicu]] za sinhronizaciju nedavnih izmjena na dvije wiki - lokalnoj i udaljenoj',
	'wikisync_direction' => 'Molimo odaberite smjer sinhronizacije',
	'wikisync_local_root' => 'Osnovna adresa lokalne wiki',
	'wikisync_remote_root' => 'Osnovna adresa udaljene wiki',
	'wikisync_remote_log' => 'Zapisnik udaljenih operacija',
	'wikisync_clear_log' => 'Očisti zapisnik',
	'wikisync_login_to_remote_wiki' => 'Prijava na udaljenu wiki',
	'wikisync_remote_wiki_root' => 'Osnovna adresa udaljene wiki',
	'wikisync_remote_wiki_example' => 'Putanja do api.php, Na primjer: http://www.mediawiki.org/w',
	'wikisync_remote_login_button' => 'Prijava',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'wikisync' => 'Wiki-Synchronisierung',
	'wikisync-desc' => 'Ermöglicht eine [[Special:WikiSync|Spezialseite]] mit der die letzten Änderungen von zwei Wikis, einem Lokalen und einem Fernen, synchronisiert werden können',
	'wikisync_direction' => 'Bitte Synchronisierungsrichtung auswählen',
	'wikisync_local_root' => 'Hauptverzeichnis des lokalen Wikis',
	'wikisync_remote_root' => 'Hauptverzeichnis des fernen Wikis',
	'wikisync_remote_log' => 'Logbuch der fernen Aktivitäten',
	'wikisync_clear_log' => 'Logbuch löschen',
	'wikisync_login_to_remote_wiki' => 'Anmeldung beim entfernten Wiki',
	'wikisync_remote_wiki_root' => 'Hauptverzeichnis des fernen Wikis',
	'wikisync_remote_wiki_example' => 'Pfad zur api.php, beispielsweise http://www.mediawiki.org/w',
	'wikisync_remote_wiki_user' => 'Benutzername beim fernen Wiki',
	'wikisync_remote_wiki_pass' => 'Passwort beim fernen Wiki',
	'wikisync_remote_login_button' => 'Anmelden',
	'wikisync_sync_files' => 'Dateien synchronisieren',
	'wikisync_store_password' => 'Passwort des fernen Wikis speichern',
	'wikisync_synchronization_button' => 'Synchronisieren',
	'wikisync_scheduler_log' => 'Ausführungs-Logbuch',
	'wikisync_scheduler_setup' => 'Einrichtung der Ausführungen',
	'wikisync_scheduler_turn_on' => 'Ausführungen aktivieren',
	'wikisync_scheduler_switch_direction' => 'Automatisch die Richtung der Synchronisierung ändern',
	'wikisync_scheduler_time_interval' => 'Zeit in Minuten zwischen automatischen Synchronisierungen',
	'wikisync_apply_button' => 'Anwenden',
	'wikisync_log_imported_by' => 'Importiert von [[Special:WikiSync|WikiSync]]',
	'wikisync_log_uploaded_by' => 'Hochgeladen von [[Special:WikiSync|WikiSync]]',
	'wikisync_api_result_unknown_action' => 'Unbekannte API-Aktion',
	'wikisync_api_result_exception' => 'Eine Ausnahme ist beim lokalen API-Aufruf aufgetreten',
	'wikisync_api_result_noaccess' => 'Nur Mitglieder der folgenden Benutzergruppen können diese Aktion ausführen: $1',
	'wikisync_api_result_invalid_parameter' => 'Ungültiger Parameterwert',
	'wikisync_api_result_http' => 'HTTP-Fehler beim Abfragen von Daten mit ferner API',
	'wikisync_api_result_Unsupported' => 'Diese MediaWiki-Version wird nicht unterstützt (niedriger als 1.15)',
	'wikisync_api_result_NoName' => 'Der Parameter „lgname“ wurde nicht angegeben',
	'wikisync_api_result_Illegal' => 'Ein unzulässiger Benutzername wurde angegeben',
	'wikisync_api_result_NotExists' => 'Der angegebene Benutzername ist nicht vorhanden',
	'wikisync_api_result_EmptyPass' => 'Der Parameter „lgpassword“ wurde nicht angegeben',
	'wikisync_api_result_WrongPass' => 'Das angegebene Passwort ist ungültig',
	'wikisync_api_result_WrongPluginPass' => 'Das angegebene Passwort ist ungültig',
	'wikisync_api_result_CreateBlocked' => 'Das Wiki versuchte ein neues Benutzerkonto automatisch anzulegen. Die verwendete IP-Adresse wurde allerdings für die Erstellung von Benutzerkonten gesperrt.',
	'wikisync_api_result_Throttled' => 'Es erfolgte zu häufig eine Anmeldung während eines zu kurzen Zeitraums.',
	'wikisync_api_result_Blocked' => 'Der Benutzer ist gesperrt',
	'wikisync_api_result_mustbeposted' => 'Das Anmeldemodul benötigt eine POST-Anfrage',
	'wikisync_api_result_NeedToken' => 'Entweder wurde kein Anmeldetoken oder kein Sitzungscookie angegeben. Bitte erneut mit Token und Cookie anfragen, die bei dieser Meldung angegeben wurden.',
	'wikisync_api_result_no_import_rights' => 'Diesem Benutzer ist es nicht gestatten XML-Speicherauszüge zu importieren',
	'wikisync_api_result_Success' => 'Erfolgreich auf dem entfernten Wiki angemeldet',
	'wikisync_js_last_op_error' => 'Der letzte Vorgang führte zu einem Fehler.

Code: $1

Nachricht: $2

[OK] klicken, um zu versuchen den letzten Vorgang zu wiederholen.',
	'wikisync_js_synchronization_confirmation' => 'Soll wirklich eine Synchronisierung

zwischen $1

und $2

ab Version $3 durchgeführt werden?',
	'wikisync_js_synchronization_success' => 'Die Synchronisierung wurde erfolgreich abgeschlossen',
	'wikisync_js_already_synchronized' => 'Beide Wikis scheinen bereits synchronisiert zu sein',
	'wikisync_js_sync_to_itself' => 'Das Wiki kann nicht mit sich selbst synchronisiert werden',
	'wikisync_js_diff_search' => 'Suche nach Unterschieden bei den Zielversionen',
	'wikisync_js_revision' => 'Version $1',
	'wikisync_js_file_size_mismatch' => 'Die Größe der temporären Datei „$1“ ($2 {{PLURAL:$2|Byte|Bytes}}) entspricht nicht der erforderlichen Größe ($3 {{PLURAL:$3|Byte|Bytes}}). Es muss sichergestellt sein, dass Datei „$4“ im Repositorium des Quellwikis nicht manuell überschrieben wurde.',
	'wikisync_js_invalid_scheduler_time' => 'Der Ausführungszeitpunkt muss eine positive ganze Zahl sein',
	'wikisync_js_scheduler_countdown' => '$1 {{PLURAL:$1|Minute|Minuten}} verbleiben',
	'wikisync_js_sync_start_ltr' => 'Synchronisierung des fernen Wikis mit dem lokalen Wiki startet um $1',
	'wikisync_js_sync_start_rtl' => 'Synchronisierung des lokalen Wikis mit dem fernen Wiki startet um $1',
	'wikisync_js_sync_end_ltr' => 'Synchronisierung des fernen Wikis mit dem lokalen Wiki war um $1 fertig',
	'wikisync_js_sync_end_rtl' => 'Synchronisierung des lokalen Wikis mit dem fernen Wiki war um $1 fertig',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'wikisync_remote_login_button' => 'Rexistro',
	'wikisync_api_result_unknown_action' => 'Non se coñece esa acción API',
	'wikisync_api_result_WrongPass' => 'O contrasinal dado é incorrecto',
	'wikisync_api_result_WrongPluginPass' => 'A clave dada é incorrecta',
	'wikisync_api_result_Blocked' => 'O usuario está bloqueado',
	'wikisync_js_revision' => 'Revisión $1',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'wikisync' => 'Wiki-Synchronisierig',
	'wikisync-desc' => 'Stellt e [[Special:WikiSync|Spezialsyte]] z Verfiegig, wu di letschte Änderige vu zwei Wiki, eme Lokalen un eme andere, dermit chenne synchronisiert wäre',
	'wikisync_direction' => 'Bitte d Synchronisierigsrichtig uuswehle',
	'wikisync_local_root' => 'Hauptverzeichnis vum lokale Wiki',
	'wikisync_remote_root' => 'Hauptverzeichnis vum andere Wiki',
	'wikisync_remote_log' => 'Logbuech vu dr extärne Aktivitete',
	'wikisync_clear_log' => 'Logbuech lesche',
	'wikisync_login_to_remote_wiki' => 'Bim andere Wiki aamälde',
	'wikisync_remote_wiki_root' => 'Hauptverzeichnis vum andere Wiki',
	'wikisync_remote_wiki_example' => 'Pfad zue dr api.php, zem Byschpel http://www.mediawiki.org/w',
	'wikisync_remote_wiki_user' => 'Benutzername bim andere Wiki',
	'wikisync_remote_wiki_pass' => 'Passwort bim andere Wiki',
	'wikisync_remote_login_button' => 'Aamälde',
	'wikisync_sync_files' => 'Dateie synchronisiere',
	'wikisync_synchronization_button' => 'Synchronisiere',
	'wikisync_log_imported_by' => 'Importiert vu [[Special:WikiSync|WikiSync]]',
	'wikisync_log_uploaded_by' => 'Uffeglade vu [[Special:WikiSync|WikiSync]]',
	'wikisync_api_result_unknown_action' => 'Nit bekannti API-Aktion',
	'wikisync_api_result_exception' => 'Bim lokale API-Ufruef isch e Uusnahm ufträtte',
	'wikisync_api_result_noaccess' => 'Nume Mitglider vu däne Benutzergruppe chenne die Aktion uusfiere: $1',
	'wikisync_api_result_invalid_parameter' => 'Nit giltige Parameterwärt',
	'wikisync_api_result_http' => 'HTTP-Fähler bim Abfroge vu Date vu dr andere API',
	'wikisync_api_result_Unsupported' => 'Die MediaWiki-Version wird nit unterstitzt (niderer wie 1.15)',
	'wikisync_api_result_NoName' => 'Du hesch kei Parameter „lgname“ aagee',
	'wikisync_api_result_Illegal' => 'Du hesch e nit giltige Benutzername aagee',
	'wikisync_api_result_NotExists' => 'Dr Benutzername, wu Du aagee hesch, git s nit',
	'wikisync_api_result_EmptyPass' => 'Du hesch dr Parameter lgpassword nit aagee oder hesch s Fäld läär gloo',
	'wikisync_api_result_WrongPass' => 'S Passwort, wu Du aagee hesch, isch nit giltig',
	'wikisync_api_result_WrongPluginPass' => 'S Passwort, wu Du aagee hesch, isch nit giltig',
	'wikisync_api_result_CreateBlocked' => 'S Wiki het versuecht, fir di automatisch e nej Benutzerkonto aazlege, aber Dyy IP-Adräss isch fir s Aaletge vu Benutzerkonte gsperrt wore.',
	'wikisync_api_result_Throttled' => 'Du hesch du z vilmol aagmäldet in ere z churze Zyt.',
	'wikisync_api_result_Blocked' => 'Benutzer isch gsperrt.',
	'wikisync_api_result_mustbeposted' => 'S Aamäldmodul brucht e POST-Aafrog',
	'wikisync_api_result_NeedToken' => 'Entweder hesch du kei Aamäld-Token oder kei Sitzig-Ccookie aagee. Bitte frog nomol aa mit em Token un em Cookie, wu in däre Antwort aagee sin.',
	'wikisync_api_result_no_import_rights' => 'Dää Benutzer derf kei XML-Spycheruuszig importiere',
	'wikisync_api_result_Success' => 'Erfolgrych uf em andere Wiki aagmäldet',
	'wikisync_js_last_op_error' => 'Dr letschte Vorgang het zue me Fähler gfiert.

Code: $1

Nochricht: $2

Druck [OK] zum dr letscht Vorgang widerhole',
	'wikisync_js_synchronization_confirmation' => 'Bisch sicher, ass Du wirkli ne Synchronisierig

zwische $1

un $2

ab dr Version $3 witt durfiere?',
	'wikisync_js_synchronization_success' => 'D Synchronisierig isch erfolgrych abgschlosse wore',
	'wikisync_js_already_synchronized' => 'S Quäll- un s Ziil-Wiki sin schyns scho synchronisier',
	'wikisync_js_sync_to_itself' => 'Du chasch des wiki nit mit sich sälber synchronisiere',
	'wikisync_js_diff_search' => 'Am Sueche no Unterschid bi dr Ziilversione',
	'wikisync_js_revision' => 'Version $1',
	'wikisync_js_file_size_mismatch' => 'D Greßi vu dr temporären Datei „$1“ ($2 Byte) entspricht nit dr erforderlige Greßi ($3 Byte). S mueß sichergstellt syy, ass d Datei „$4“ im Repositorium vum Quällwiki nit manuäll iberschribe woren sich.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'wikisync' => 'Synchronisation inter wikis',
	'wikisync-desc' => 'Forni un [[Special:WikiSync|pagina special]] pro synchronisar le modificationes recente de duo wikis - un local e un remote',
	'wikisync_direction' => 'Selige le direction del synchronisation',
	'wikisync_local_root' => 'Directorio principal del sito wiki local',
	'wikisync_remote_root' => 'Directorio principal del sito wiki remote',
	'wikisync_remote_log' => 'Registro de operationes remote',
	'wikisync_clear_log' => 'Rader registro',
	'wikisync_login_to_remote_wiki' => 'Aperir session in wiki remote',
	'wikisync_remote_wiki_root' => 'Directorio principal del wiki remote',
	'wikisync_remote_wiki_example' => 'Cammino verso api.php, per exemplo: http://www.mediawiki.org/w',
	'wikisync_remote_wiki_user' => 'Nomine de usator in wiki remote',
	'wikisync_remote_wiki_pass' => 'Contrasigno in wiki remote',
	'wikisync_remote_login_button' => 'Aperir session',
	'wikisync_sync_files' => 'Synchronisar files',
	'wikisync_synchronization_button' => 'Synchronisar',
	'wikisync_log_imported_by' => 'Importate per [[Special:WikiSync|WikiSync]]',
	'wikisync_log_uploaded_by' => 'Incargate per [[Special:WikiSync|WikiSync]]',
	'wikisync_api_result_unknown_action' => 'Action API incognite',
	'wikisync_api_result_exception' => 'Exception occurreva in appello API local',
	'wikisync_api_result_noaccess' => 'Solmente membros del sequente gruppos pote exequer iste action: $1',
	'wikisync_api_result_invalid_parameter' => 'Valor invalide de parametro',
	'wikisync_api_result_http' => 'Error HTTP durante le recuperation de datos ab API remote',
	'wikisync_api_result_Unsupported' => 'Iste version de MediaWiki non es supportate (minus de 1.15)',
	'wikisync_api_result_NoName' => 'Tu non specificava le parametro lgname',
	'wikisync_api_result_Illegal' => 'Tu forniva un nomine de usator invalide',
	'wikisync_api_result_NotExists' => 'Le nomine de usator que tu forniva non existe',
	'wikisync_api_result_EmptyPass' => 'Tu non specificava le parametro lgpassword o tu lo lassava vacue',
	'wikisync_api_result_WrongPass' => 'Le contrasigno que tu forniva es incorrecte',
	'wikisync_api_result_WrongPluginPass' => 'Le contrasigno que tu forniva es incorrecte',
	'wikisync_api_result_CreateBlocked' => 'Le wiki tentava crear automaticamente un nove conto pro te, ma tu adresse IP ha essite blocate del creation de contos',
	'wikisync_api_result_Throttled' => 'Tu ha aperite session troppo de vices durante un curte tempore.',
	'wikisync_api_result_Blocked' => 'Le usator es blocate',
	'wikisync_api_result_mustbeposted' => 'Le modulo de authentication require un requesta POST',
	'wikisync_api_result_NeedToken' => 'Tu non forniva le indicio de session o le cookie "sessionid". Repete le requesta con le indicio e cookie date in iste responsa.',
	'wikisync_api_result_no_import_rights' => 'Iste usator non ha le permission de importar files de datos in XML',
	'wikisync_api_result_Success' => 'Apertura de session in sito wiki remote succedite',
	'wikisync_js_last_op_error' => 'Le ultime operation resultava in un error.

Codice: $1

Message: $2

Preme [OK] pro tentar repeter le ultime operation.',
	'wikisync_js_synchronization_confirmation' => 'Es tu secur de voler synchronisar

de $1
	
a $2
	
a partir del version $3?',
	'wikisync_js_synchronization_success' => 'Synchronisation completate con successo',
	'wikisync_js_already_synchronized' => 'Le wikis de origine e de destination pare esser jam synchronisate',
	'wikisync_js_sync_to_itself' => 'Non es possibile synchronisar un wiki con se mesme',
	'wikisync_js_diff_search' => 'Cerca differentias in versiones de destination',
	'wikisync_js_revision' => 'Version $1',
	'wikisync_js_file_size_mismatch' => 'Le dimension del file temporari "$1" ($2 bytes) non corresponde al dimension requirite ($3 bytes). Assecura te que le file $4 non ha essite superscribite manualmente in le deposito del wiki de origine.',
);

/** Japanese (日本語)
 * @author Iwai.masaharu
 */
$messages['ja'] = array(
	'wikisync_remote_login_button' => 'ログイン',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'wikisync' => 'Wiki-Synchronisatioun',
	'wikisync_direction' => "Sicht w.e.g. d'Richtung vun der Synchronisatioun eraus",
	'wikisync_remote_login_button' => 'Umellen',
	'wikisync_sync_files' => 'Fichiere synchroniséieren',
	'wikisync_synchronization_button' => 'Synchroniséieren',
	'wikisync_api_result_invalid_parameter' => 'Net valabele Wäert vum Parameter',
	'wikisync_api_result_WrongPass' => "D'Passwuert dat Dir ginn hutt ass net richteg",
	'wikisync_api_result_Blocked' => 'Benotzer ass gespaart',
	'wikisync_js_revision' => 'Versioun $1',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'wikisync' => 'Усогласување на викија',
	'wikisync-desc' => 'Дава [[Special:WikiSync|специјална страница]] за усогласување на скорешните страници на две викија - локално и далечинско',
	'wikisync_direction' => 'Одберете насока на усогласувањето',
	'wikisync_local_root' => 'Основна адреса на локалното мреж. место',
	'wikisync_remote_root' => 'Основна адреса на далечинското мреж. место',
	'wikisync_remote_log' => 'Дневник на далечински дејства',
	'wikisync_clear_log' => 'Исчисти дневник',
	'wikisync_login_to_remote_wiki' => 'Најава на далечинското вики',
	'wikisync_remote_wiki_root' => 'Основна адреса на викито',
	'wikisync_remote_wiki_example' => 'Патека до api.php, на пример: http://www.mediawiki.org/w',
	'wikisync_remote_wiki_user' => 'Корисничко име на далечинското вики',
	'wikisync_remote_wiki_pass' => 'Лозинка на далечинското вики',
	'wikisync_remote_login_button' => 'Најава',
	'wikisync_sync_files' => 'Усогласи податотеки',
	'wikisync_synchronization_button' => 'Усогласи',
	'wikisync_log_imported_by' => 'Увезено со [[Special:WikiSync|WikiSync]]',
	'wikisync_log_uploaded_by' => 'Поигнато со [[Special:WikiSync|WikiSync]]',
	'wikisync_api_result_unknown_action' => 'Непознато дејство на API',
	'wikisync_api_result_exception' => 'Се појави исклучок во повикот на локалниот API',
	'wikisync_api_result_noaccess' => 'Само членови на следниве групи можат да го извршат ова дејство: $1',
	'wikisync_api_result_invalid_parameter' => 'Неважечка вредност за параметарот',
	'wikisync_api_result_http' => 'HTTP-грешка при барањето на податоци од далечинскиот API',
	'wikisync_api_result_Unsupported' => 'Вашата верзија на МедијаВики не е поддржана (постара е од 1.15)',
	'wikisync_api_result_NoName' => 'Не го утврдивте парамтетарот lgname',
	'wikisync_api_result_Illegal' => 'Наведовте недопуштено корисничко име',
	'wikisync_api_result_NotExists' => 'Корисничкото име што го наведовте не постои',
	'wikisync_api_result_EmptyPass' => 'Не го утврдивте параметарот lgpassword или го имате оставено празен',
	'wikisync_api_result_WrongPass' => 'Наведената лозинка е грешна',
	'wikisync_api_result_WrongPluginPass' => 'Наведената лозинка е грешна',
	'wikisync_api_result_CreateBlocked' => 'Викито се обиде автоматски да ви создаде сметка, но вашата IP-адреса е блокирана за создавање сметки',
	'wikisync_api_result_Throttled' => 'Се најавивте премногу пати за кратко време.',
	'wikisync_api_result_Blocked' => 'Корисникот е блокиран',
	'wikisync_api_result_mustbeposted' => 'Најавниот модул бара POST-барање',
	'wikisync_api_result_NeedToken' => 'Немате наведено најавен жетон или колаче за назнаката на сесијата. Поднесете го барањето повторно, со жетонот и колачето наведени во овој одговор',
	'wikisync_api_result_no_import_rights' => 'На корисников не му е дозолено да увезува резервни XML-податотеки',
	'wikisync_api_result_Success' => 'Најавата на далечинското вики е успешна',
	'wikisync_js_last_op_error' => 'Последното дејство врати грешка.

Код: $1

Порака: $2

Притиснете [ОК] за да ја повторите',
	'wikisync_js_synchronization_confirmation' => 'Дали сте сигурни дека сакате да извршите усогласување

од $1

на $2

почнувајќи од ревизијата $3?',
	'wikisync_js_synchronization_success' => 'Усогласувањето е успешно завршено',
	'wikisync_js_already_synchronized' => 'Изворното и целнот вики се веќе усогласени',
	'wikisync_js_sync_to_itself' => 'Не можете да го усогласите викито според самото себе',
	'wikisync_js_diff_search' => 'Барам разлики во ревизиите на целното вики',
	'wikisync_js_revision' => 'Ревизија $1',
	'wikisync_js_file_size_mismatch' => 'Големината на привремената податотека „$1“ ($2 бајти) не соодветствува на потребната големина ($3 бајти). Проверете дали податотеката $4 не била рачно презапишана во складиштето на изворното вики.',
);

/** Dutch (Nederlands)
 * @author McDutchie
 * @author Siebrand
 */
$messages['nl'] = array(
	'wikisync' => 'Wikisynchronisatie',
	'wikisync-desc' => "Biedt een [[Special:WikiSync|speciale pagina]] om recente wijzigingen tussen twee wiki's te synchroniseren - de lokale wiki en een andere wiki",
	'wikisync_direction' => 'Kies de richting van de synchronisatie',
	'wikisync_local_root' => 'Siteroot van de lokale wiki',
	'wikisync_remote_root' => 'Siteroot van de andere wiki',
	'wikisync_remote_log' => 'Logboek externe activiteiten',
	'wikisync_clear_log' => 'Logboek wissen',
	'wikisync_login_to_remote_wiki' => 'Aanmelden bij andere wiki',
	'wikisync_remote_wiki_root' => 'Root andere wiki',
	'wikisync_remote_wiki_example' => 'Pad naar api.php, bijvoorbeeld http://www.mediawiki.org/w',
	'wikisync_remote_wiki_user' => 'Gebruikersnaam andere wiki',
	'wikisync_remote_wiki_pass' => 'Wachtwoord andere wiki',
	'wikisync_remote_login_button' => 'Aanmelden',
	'wikisync_sync_files' => 'Bestanden synchroniseren',
	'wikisync_synchronization_button' => 'Synchroniseren',
	'wikisync_log_imported_by' => 'Geïmporteerd via [[Special:WikiSync|WikiSync]]',
	'wikisync_log_uploaded_by' => 'Geüpload via [[Special:WikiSync|WikiSync]]',
	'wikisync_api_result_unknown_action' => 'Onbekende API-handeling',
	'wikisync_api_result_exception' => 'Er is een fout opgetreden in de lokale API-aanroep',
	'wikisync_api_result_noaccess' => 'Alleen leden van de volgende groepen kunnen deze handeling uitvoeren: $1',
	'wikisync_api_result_invalid_parameter' => 'Ongeldige waarde voor parameter',
	'wikisync_api_result_http' => 'Er is een HTTP-fout opgetreden tijdens het opvragen van gegevens via de API van de andere wiki',
	'wikisync_api_result_Unsupported' => 'Uw versie van MediaWiki wordt niet ondersteund (lager dan 1.15)',
	'wikisync_api_result_NoName' => 'U hebt de parameter "lgname" niet ingesteld',
	'wikisync_api_result_Illegal' => 'U hebt een ongeldige gebruikersnaam opgegeven',
	'wikisync_api_result_NotExists' => 'De gebruikersnaam die u hebt opgegeven bestaat niet',
	'wikisync_api_result_EmptyPass' => 'U hebt de parameter "lgpassword" niet ingesteld of leeg gelaten',
	'wikisync_api_result_WrongPass' => 'Het wachtwoord dat u hebt opgegeven is niet correct',
	'wikisync_api_result_WrongPluginPass' => 'Het wachtwoord dat u hebt opgegeven is niet correct',
	'wikisync_api_result_CreateBlocked' => 'De wiki heeft geprobeerd automatisch een gebruiker voor u aan te maken, maar via uw IP-adres mogen geen gebruikers aangemaakt worden',
	'wikisync_api_result_Throttled' => 'U bent te vaak aangemeld in een korte tijd.',
	'wikisync_api_result_Blocked' => 'De gebruiker is geblokkeerd',
	'wikisync_api_result_mustbeposted' => 'De aanmeldmodule vereist een POST-aanvraag',
	'wikisync_api_result_NeedToken' => 'U hebt het aanmeldtoken of het cookie met het sessie-ID niet opgegeven. Probeer het opnieuw met het in dit antwoord geleverde token en cookie',
	'wikisync_api_result_no_import_rights' => 'Deze gebruiker mag geen XML-dumpbestanden importeren',
	'wikisync_api_result_Success' => 'Aangemeld bij de andere wiki',
	'wikisync_js_last_op_error' => 'De laatste handeling heeft een fout opgeleverd.

Code: $1

Bericht: $2

Klik [OK] om de laatste handeling te herhalen.',
	'wikisync_js_synchronization_confirmation' => 'Weet u zeker dat u wilt synchroniseren

van $1

naar $2

vanaf versie $3?',
	'wikisync_js_synchronization_success' => 'De synchronisatie is voltooid',
	'wikisync_js_already_synchronized' => "Bron- en doelwiki's lijken al te zijn gesynchroniseerd",
	'wikisync_js_sync_to_itself' => 'U kunt de wiki niet naar zichzelf synchroniseren',
	'wikisync_js_diff_search' => 'Op zoek naar verschillen in doelversies',
	'wikisync_js_revision' => 'versie $1',
	'wikisync_js_file_size_mismatch' => 'De grootte van het tijdelijke bestand "$1" ($2 bytes) komt niet overeen met de vereiste grootte ($3 bytes). Controleer dat het bestand "$4" niet handmatig overschreven is in de bronwiki.',
);

/** Polish (Polski)
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'wikisync' => 'Synchronizacja wiki',
	'wikisync-desc' => 'Dodaje [[Special:WikiSync|stronę specjalną]] służącą do synchronizacji ostatnich zmian pomiędzy dwoma wiki – lokalną i zdalną',
	'wikisync_direction' => 'Wybierz kierunek synchronizacji',
	'wikisync_local_root' => 'Katalog główny witryny lokalnej wiki',
	'wikisync_remote_root' => 'Katalog główny witryny zdalnej wiki',
	'wikisync_remote_log' => 'Rejestr operacji zdalnych',
	'wikisync_clear_log' => 'Wyczyść rejestr',
	'wikisync_login_to_remote_wiki' => 'Zaloguj się do zdalnej wiki',
	'wikisync_remote_wiki_root' => 'Katalog główny zdalnej wiki',
	'wikisync_remote_wiki_example' => 'Ścieżka do „api.php”, na przykład „http://www.mediawiki.org/w”',
	'wikisync_remote_wiki_user' => 'Nazwa użytkownika zdalnej wiki',
	'wikisync_remote_wiki_pass' => 'Hasło do zdalnej wiki',
	'wikisync_remote_login_button' => 'Zaloguj się',
	'wikisync_sync_files' => 'Synchronizuj pliki',
	'wikisync_synchronization_button' => 'Synchronizuj',
	'wikisync_log_imported_by' => 'Zaimportowane przez [[Special:WikiSync|WikiSync]]',
	'wikisync_log_uploaded_by' => 'Przesłane przez [[Special:WikiSync|WikiSync]]',
	'wikisync_api_result_unknown_action' => 'Nieznane działanie API',
	'wikisync_api_result_exception' => 'Wystąpił wyjątek w lokalnym wywołaniu API',
	'wikisync_api_result_noaccess' => 'Tylko członkowie następujących grup mogą wykonać tę akcję: $1',
	'wikisync_api_result_invalid_parameter' => 'Nieprawidłowa wartość parametru',
	'wikisync_api_result_http' => 'Wystąpił błąd HTTP podczas zapytania o dane ze zdalnego API',
	'wikisync_api_result_Unsupported' => 'Ta wersja MediaWiki nie jest wspierana (niższa od 1.15)',
	'wikisync_api_result_NoName' => 'Nie ustawiłeś parametru „lgname”',
	'wikisync_api_result_Illegal' => 'Podałeś niedopuszczalną nazwę użytkownika',
	'wikisync_api_result_NotExists' => 'Nie istnieje użytkownik o nazwie, którą podałeś',
	'wikisync_api_result_EmptyPass' => 'Nie ustawiłeś wartości parametru „lgpassword” lub pozostawiłeś ją pustą',
	'wikisync_api_result_WrongPass' => 'Podane hasło jest nieprawidłowe',
	'wikisync_api_result_WrongPluginPass' => 'Podane hasło jest nieprawidłowe',
	'wikisync_api_result_CreateBlocked' => 'Wiki próbowała utworzyć dla Ciebie nowe konto, ale dla Twojego adresu IP zablokowano możliwość tworzenia kont',
	'wikisync_api_result_Throttled' => 'Zalogowałeś się zbyt wiele razy w zbyt krótkim przedziale czasu.',
	'wikisync_api_result_Blocked' => 'Użytkownik jest zablokowany',
	'wikisync_api_result_mustbeposted' => 'Moduł logowania wymaga użycia metody POST',
	'wikisync_api_result_NeedToken' => 'Brak żetonu logowania lub ciasteczka z identyfikatorem sesji. Ponów zapytanie z żetonem oraz ciasteczkiem podanych w tej odpowiedzi',
	'wikisync_api_result_no_import_rights' => 'Ten użytkownik nie ma możliwości importu plików zrzutu w formacie XML',
	'wikisync_api_result_Success' => 'Zalogowano do zdalnej wiki',
	'wikisync_js_last_op_error' => 'Ostatnia operacja zwróciła błąd.

Kod – $1.

Komunikat – $2

Wciśnij „OK” aby ponowić ostatnią operację',
	'wikisync_js_synchronization_confirmation' => 'Czy na pewno chcesz zsynchronizować

$2

z $1

rozpoczynając od wersji $3?',
	'wikisync_js_synchronization_success' => 'Synchronizacja została zakończona',
	'wikisync_js_already_synchronized' => 'Źródłowa i docelowa wiki wyglądają na zsynchronizowane',
	'wikisync_js_sync_to_itself' => 'Nie możesz zsynchronizować wiki z nią samą',
	'wikisync_js_diff_search' => 'Wyszukiwanie różnic w docelowych wersjach',
	'wikisync_js_revision' => 'Wersja $1',
	'wikisync_js_file_size_mismatch' => 'Rozmiar pliku tymczasowego „$1” ($2 {{PLURAL:$2|bajt|bajty|bajtów}}) jest różny od wymaganego ($3 {{PLURAL:$3|bajt|bajty|bajtów}}). Upewnij się, czy plik „$4” znajdujący się w repozytorium źródłowej wiki, nie został ręcznie nadpisany.',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'wikisync' => 'Sincronização de wikis',
	'wikisync-desc' => 'Fornece uma [[Special:WikiSync|página especial]] para sincronizar as mudanças recentes de duas wikis - uma local e outra remota',
	'wikisync_direction' => 'Escolha a direcção da sincronização',
	'wikisync_local_root' => 'Raiz do site da wiki local',
	'wikisync_remote_root' => 'Raiz do site da wiki remota',
	'wikisync_remote_log' => 'Registo de operações remotas',
	'wikisync_clear_log' => 'Limpar o registo',
	'wikisync_login_to_remote_wiki' => 'Entrar na wiki remota',
	'wikisync_remote_wiki_root' => 'Raiz da wiki remota',
	'wikisync_remote_wiki_example' => 'Caminho para o ficheiro api.php, por exemplo: http:/www.mediawiki.org/w',
	'wikisync_remote_wiki_user' => 'Nome de utilizador na wiki remota',
	'wikisync_remote_wiki_pass' => 'Palavra-chave na wiki remota',
	'wikisync_remote_login_button' => 'Autenticação',
	'wikisync_sync_files' => 'Sincronizar ficheiros',
	'wikisync_synchronization_button' => 'Sincronizar',
	'wikisync_log_imported_by' => 'Importação de [[Special:WikiSync|WikiSync]]',
	'wikisync_log_uploaded_by' => 'Upload de [[Special:WikiSync|WikiSync]]',
	'wikisync_api_result_unknown_action' => 'Operação desconhecida da API',
	'wikisync_api_result_exception' => 'Ocorreu uma excepção na chamada local da API',
	'wikisync_api_result_noaccess' => 'Só os membros dos seguintes grupos podem executar esta operação: $1',
	'wikisync_api_result_invalid_parameter' => 'O valor do parâmetro é inválido',
	'wikisync_api_result_http' => 'Ocorreu um erro de HTTP ao fazer uma consulta de dados pela API remota',
	'wikisync_api_result_Unsupported' => 'A sua versão do MediaWiki não é suportada (anterior à 1.15)',
	'wikisync_api_result_NoName' => 'Não definiu o parâmetro lgname',
	'wikisync_api_result_Illegal' => 'O nome de utilizador fornecido não é adequado',
	'wikisync_api_result_NotExists' => 'O nome de utilizador fornecido não existe',
	'wikisync_api_result_EmptyPass' => 'Não definiu o parâmetro lgpassword, ou deixou-o vazio',
	'wikisync_api_result_WrongPass' => 'A palavra-chave fornecida está incorrecta',
	'wikisync_api_result_WrongPluginPass' => 'A palavra-chave fornecida está incorrecta',
	'wikisync_api_result_CreateBlocked' => 'A wiki tentou criar automaticamente uma conta nova para si, mas a criação de contas foi bloqueada para o seu endereço IP',
	'wikisync_api_result_Throttled' => 'Autenticou-se demasiadas vezes num curto espaço de tempo.',
	'wikisync_api_result_Blocked' => 'O utilizador está bloqueado',
	'wikisync_api_result_mustbeposted' => 'O módulo de autenticação requer um pedido POST',
	'wikisync_api_result_NeedToken' => 'Não forneceu uma chave de autenticação ou um cookie de identificação da sessão. Faça o pedido novamente com a chave e o cookie desta resposta',
	'wikisync_api_result_no_import_rights' => 'Este utilizador não pode importar ficheiros de arquivo XML',
	'wikisync_api_result_Success' => 'Foi autenticado no site da wiki remota',
	'wikisync_js_last_op_error' => 'A última operação retornou um erro. 

 Código: $1 

 Mensagem: $2 

 Pressione [OK] para repetir a última operação',
	'wikisync_js_synchronization_confirmation' => 'Tem a certeza de que quer sincronizar 

 de $1 

 para $2 

 a partir da revisão $3?',
	'wikisync_js_synchronization_success' => 'A sincronização terminou com êxito',
	'wikisync_js_already_synchronized' => 'As wikis de origem e destino parecem já estar sincronizadas',
	'wikisync_js_sync_to_itself' => 'Não pode sincronizar a wiki consigo própria',
	'wikisync_js_diff_search' => 'A procurar a diferença nas revisões de destino',
	'wikisync_js_revision' => 'Revisão $1',
	'wikisync_js_file_size_mismatch' => 'O tamanho ($2 bytes) do ficheiro temporário "$1" não corresponde ao tamanho requerido ($3 bytes). Certifique-se de que o ficheiro $4 não foi alterado manualmente no repositório da wiki de origem.',
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
	'wikisync_store_password' => 'Сохранить пароль удалённого сайта',
	'wikisync_synchronization_button' => 'Синхронизировать',
	'wikisync_scheduler_log' => 'Журнал планировщика',
	'wikisync_scheduler_setup' => 'Настройки планировщика',
	'wikisync_scheduler_turn_on' => 'Включить планировщик',
	'wikisync_scheduler_switch_direction' => 'Автоматически изменять направление синхронизации',
	'wikisync_scheduler_time_interval' => 'Количество минут между автоматическими синхронизациями',
	'wikisync_apply_button' => 'Применить',
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
	'wikisync_js_file_size_mismatch' => 'Размер временного файла "$1" ($2 {{PLURAL:$2|байт|байта|байтов}}) не соответствует требуемому размеру файла ($3 {{PLURAL:$3|байт|байта|байтов}}). Пожалуйста убедитесь, что файл "$4" не был переписан вручную в репозиторий исходного вики-сайта.',
	'wikisync_js_invalid_scheduler_time' => 'Время планировщика должно быть положительным целым числом',
	'wikisync_js_scheduler_countdown' => 'Осталось $1 {{PLURAL:$1|минута|минуты|минут}}',
	'wikisync_js_sync_start_ltr' => 'Запуск синхронизации с локального вики-сайта на удалённый $1',
	'wikisync_js_sync_start_rtl' => 'Запуск синхронизации с удалённого вики-сайта на локальный $1',
	'wikisync_js_sync_end_ltr' => 'Окончание синхронизации с локального вики-сайта на удалённый $1',
	'wikisync_js_sync_end_rtl' => 'Окончание синхронизации с удалённого вики-сайта на локальный $1',
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
	'wikisync-desc' => 'Впроваджує [[Special:WikiSync|спеціальну сторінку]] для синхронізації останніх зміни двох вікі - локальної і віддаленої',
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

