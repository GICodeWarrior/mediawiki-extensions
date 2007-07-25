<?php

/**
 * Internationalisation file for the Oversight extension
 */

function efHideRevisionMessages() {
	$messages = array(

/* English (Brion Vibber) */
'en' => array(
'hiderevision' => 'Permanently hide revisions',
// Empty form
'hiderevision-prompt' => 'Revision number to remove:',
'hiderevision-continue' => 'Continue',
// Confirmation form
'hiderevision-text' =>
"This should '''only''' be used for the following cases:
* Inappropriate personal information
*: ''home addresses and telephone numbers, social security numbers, etc''

'''Abuse of this system will result in loss of privileges.'''

Removed items will not be visible to anyone through the web site,
but the deletions are logged and can be restored manually by a
database administrator if you make a mistake.",
'hiderevision-reason' => 'Reason (will be logged privately):',
'hiderevision-submit' => 'Hide this data permanently',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Hide revision',
// Status & errors on action
'hiderevision-norevisions' => 'No revisions specified to delete.',
'hiderevision-noreason' => 'You must decribe the reason for this removal.',
'hiderevision-status' => 'Revision $1: $2',
'hiderevision-success' => 'Archived and deleted successfully.',
'hiderevision-error-missing' => 'Not found in database.',
'hiderevision-error-current' => 'Cannot delete the latest edit to a page. Revert this change first.',
'hiderevision-error-delete' => 'Could not archive; was it previously deleted?',
'hiderevision-archive-status' => 'Deleted revision from $1: $2',
'oversight-nodiff' => 'Unable to track changes as there is currently no previous revision for the page. Either:
*The page was deleted
*This hidden revision was the first revision',
// Logging
'oversight-log-hiderev' => 'removed an edit from $1',
// Oversight review page
'oversight' => 'Oversight',
'oversight-view' => 'details',
'oversight-difference' => '(Difference from previous remaining revision)',
'oversight-prev' => 'Last previous revision',
'oversight-hidden' => 'Hidden revision',
'oversight-header' => 'Below is a list of revisions recently permanently hidden from public view.
Releasing this information can result in permanent loss of Oversight privileges.',
),

/* German (Raymond) */
'de' => array(
'hiderevision' => 'Versionen dauerhaft entfernen',
// Empty form
'hiderevision-prompt' => 'Zu entfernende Versionsnummer:',
'hiderevision-continue' => 'Weiter',
// Confirmation form
'hiderevision-text' =>
"Dies darf '''ausschließlich''' in den folgenden Fällen geschehen:
* Persönliche Informationen:
*: ''Realname, Adresse, Telefonnummer und ähnlicher privater Details''

'''Der Missbrauch dieses Systems zieht den Verlust dieser Rechte nach sich!'''

Entfernte Versionen sind durch Niemanden mehr über die Website einzusehen.
Sie werden aber protokolliert und können bei einem Fehler durch einen Datenbankadministrator wiederhergestellt werden",
'hiderevision-reason' => 'Grund (wird unsichtbar protokolliert):',
'hiderevision-submit' => 'Entferne diese Daten dauerhaft',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Entferne Versionen',
// Status & errors on action
'hiderevision-norevisions' => 'Es wurde keine Version zum Entfernen angegeben.',
'hiderevision-noreason' => 'Sie müssen einen Grund für die Entfernung angeben.',
'hiderevision-status' => 'Version $1: $2',
'hiderevision-success' => 'Erfolgreich archiviert und entfernt.',
'hiderevision-error-missing' => 'In der Datenbank nicht gefunden.',
'hiderevision-error-current' => 'Die letzte Bearbeitung einer Seite kann nicht entfernt werden. Setze die Bearbeitung erst zurück.',
'hiderevision-error-delete' => 'Archivierung nicht möglich. Wurde sie zuvor gelöscht?',
'hiderevision-archive-status' => 'Gelöschte Versionen von $1: $2',
'oversight-nodiff' => 'Es ist kein Versionsvergleich möglich, da es gegenwärtig keine frühere Version dieser Seite gibt. Mögliche Gründe:
*Die Seite wurde gelöscht
*Die entfernte Version war die erste Version',
// Logging
'oversight-log-hiderev' => 'Entfernte eine Bearbeitung von $1',
// Oversight review page
'oversight' => 'Oversight',
'oversight-view' => 'Details',
'oversight-difference' => '(Unterschied zur vorhergehenden verbleibenden Version)',
'oversight-prev' => 'Letzte vorhergehenden Version',
'oversight-hidden' => 'Entfernte Version',
'oversight-header' => 'Es folgt die Liste der dauerhaft für die öffentliche Einsicht entfernten Versionen. Die Veröffentlichung dieser Informationen kann den dauerhaften Entzug der Oversight-Rechte bedeuten.',
),

/* French (Bertrand Grondin) */
'fr' => array(
'hiderevision' => 'Cacher définitivement les révisions',
// Empty form
'hiderevision-prompt' => 'Numéro d’édition à supprimer :',
'hiderevision-continue' => 'Continuer',
// Confirmation form
'hiderevision-text' =>
"Cette fonctionnalité doit être utilisée '''uniquement''' pour les cas suivants :
* Information personnelle inappropriée,
*: ''Adresse personnelle et numéro de téléphone, numéro de sécurité sociale, etc...''

''' L'abus de cette fonctionnalité impliquera la perte de ces privilèges.

Les articles effacés ne sont plus visibles dans ce système, mais ces suppressions sont journalisées et peuvent être restaurées manuellement par un administrateur ayant l'accès direct sur la base de données si vous avez fait une erreur.",
'hiderevision-reason' => 'Motif (sera enregistré séparément) :',
'hiderevision-submit' => 'Cacher cette donnée de manière permanente',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Cacher la modification',
// Status & errors on action
'hiderevision-norevisions' => 'Aucune modification indiquée à supprimer.',
'hiderevision-noreason' => 'Vous devez indiquer la raison précise de cette suppression.',
'hiderevision-status' => 'Modification $1 : $2',
'hiderevision-success' => 'Archivé et supprimé avec succès.',
'hiderevision-error-missing' => 'Non trouvé dans la base de données.',
'hiderevision-error-current' => 'Ne peut supprimer la dernière révision dans une page. Faites une annulation d’édition auparavant.',
'hiderevision-error-delete' => 'Ne peut être archivé ; la page aurait-elle été supprimée ?',
'hiderevision-archive-status' => 'Modification supprimée de $1 : $2',
'oversight-nodiff' => 'Impossible de détecter des changements tant que ne se trouve aucune révision antérieure pour la page. Les raisons peuvent être les suivantes :
*La page a été supprimée,
*La révision cachée était la toute première de la page',
// Logging
'oversight-log-hiderev' => 'a supprimé une édition de $1',
// Oversight review page
'oversight' => 'Oversight',
'oversight-view' => 'détails',
'oversight-difference' => '(Différence par rapport à la révision précédente)',
'oversight-prev' => 'Dernière révision précédente',
'oversight-hidden' => 'Révision cachée',
'oversight-header' => 'Ci-dessous, figure la liste des révisions cachées de manière permanente au public. La divulgation de cette information peut avoir comme conséquence la déchéance des privilèges d\'Oversight.',
),

/* Hebrew (Rotem Liss) */
'he' => array(
'hiderevision' => 'מחיקת גרסאות לצמיתות',
// Empty form
'hiderevision-prompt' => 'מספר גרסה למחיקה:',
'hiderevision-continue' => 'המשך',
// Confirmation form
'hiderevision-text' =>
"יש להשתמש באפשרות זו '''אך ורק''' במקרים הבאים:
* פרסום מידע אישי
*: '''כתובות, מספרי טלפון וכדומה'''

'''שימוש לרעה במערכת יגרום לאובדן הסמכויות.'''

הפריטים שהוסרו לא יהיו גלויים לאיש דרך האתר עצמו, אבל נשמר יומן של המחיקות ומנהל מסד הנתונים יכול לשחזר אותן ידנית אם תתבצע טעות.",
'hiderevision-reason' => 'סיבה (תיכתב ביומן פרטי):',
'hiderevision-submit' => 'מחיקת המידע הזה לצמיתות',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'הסתרת גרסאות',
// Status & errors on action
'hiderevision-norevisions' => 'לא נבחרו גרסאות למחיקה.',
'hiderevision-noreason' => 'עליכם לכתוב את הסיבה להסרה זו.',
'hiderevision-status' => 'גרסה $1: $2',
'hiderevision-success' => 'נמחקה בהצלחה.',
'hiderevision-error-missing' => 'לא נמצאה במסד הנתונים.',
'hiderevision-error-current' => 'לא ניתן למחוק את הגרסה האחרונה בדף. ראשית יש לשחזר את השינוי.',
'hiderevision-error-delete' => 'לא ניתן למחוק; אולי הגרסה כבר נמחקה.',
'hiderevision-archive-status' => 'נמחקה גרסה של $1: $2',
'oversight-nodiff' => 'לא ניתן לעקוב אחרי השינויים כיוון שאין כרגע שום גרסה קודמת לדף זה. ייתכן ש:
* הדף נמחק
* הגרסה שהוסתרה הייתה הגרסה האחרונה',
// Logging
'oversight-log-hiderev' => 'הסיר עריכה מהדף $1',
// Oversight review page
'oversight' => 'אוברסייט',
'oversight-view' => 'פרטים',
'oversight-difference' => '(שינויים מהגרסה הקודמת שנשארה)',
'oversight-prev' => 'הגרסה הקודמת',
'oversight-hidden' => 'גרסה מוסתרת',
'oversight-header' => 'להלן רשימת גרסאות שנמחקו לאחרונה לצמיתות מתצוגה ציבורית.
שחרור מידע זה לציבור עלול לגרום להסרה לצמיתות של ההרשאות.',
),

/* Italian (BrokenArrow) */
'it' => array(
'hiderevision' => 'Oscuramento permanente di una revisione',
// Empty form
'hiderevision-prompt' => 'Numero della revisione da oscurare:',
'hiderevision-continue' => 'Continua',
// Confirmation form
'hiderevision-text' =>
"Questa funzione deve essere usata '''unicamente''' nei seguenti casi:
* Dati personali non appropriati
*: ''indirizzi postali, numeri di telefono, codici fiscali, ecc.''

'''Qualunque abuso del sistema comporterà la rimozione dei relativi privilegi.'''

Gli elementi oscurati sono invisibili per chiunque sul sito, ma
esiste un registro delle revisioni oscurate e la possibilità di
un ripristino manuale da parte di un amministratore del database
in caso di errori.",
'hiderevision-reason' => 'Motivo (per il registro riservato):',
'hiderevision-submit' => 'Oscura i dati in modo permanente',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Oscura revisione',
// Status & errors on action
'hiderevision-norevisions' => 'Non è stata indicata alcuna revisione da oscurare.',
'hiderevision-noreason' => 'È necessario indicare il motivo dell\'oscuramento.',
'hiderevision-status' => 'Revisione $1: $2',
'hiderevision-success' => 'Archiviazione e oscuramento completati.',
'hiderevision-error-missing' => 'Non presente nel database.',
'hiderevision-error-current' => 'Impossibile oscurare l\'ultima modifica di una pagina. Annullare la modifica prima di procedere all\'oscuramento.',
'hiderevision-error-delete' => 'Impossibile archiviare; c\'erano delle cancellazioni precedenti?',
'hiderevision-archive-status' => 'Revisione oscurata di $1: $2',
'oversight-nodiff' => 'Impossibile mostrare le modifiche in quanto non sono presenti revisioni precedenti della pagina. Possibili cause:
*La pagina è stata cancellata
*Questa revisione oscurata era la prima per la pagina',
// Logging
'oversight-log-hiderev' => 'ha oscurato una modifica di $1',
// Oversight review page
'oversight' => 'Oversight',
'oversight-view' => 'dettagli',
'oversight-difference' => '(Differenza rispetto alla versione precedente rimasta)',
'oversight-prev' => 'Ultima revisione precedente',
'oversight-hidden' => 'Revisione oscurata',
'oversight-header' => 'Qui di seguito viene presentata una lista delle revisioni oscurate in modo permanente ai visitatori del sito.
La divulgazione di tali informazioni può dar luogo alla rimozione permanente dei diritti di oversight.',
),

/* Kazakh Cyrillic (AlefZet) */
'kk-kz' => array('hiderevision' => 'Нұсқаларды тұрақты жасыру',
// Empty form
'hiderevision-prompt' => 'Жойылатын нұсқа нөмірі:',
'hiderevision-continue' => 'Жалғастыру',
// Confirmation form
'hiderevision-text' =>
"Бұл ''тек''' келесі жағдайларда қолданылу қажет:
* Жеке деректер теріс болса
*: ''үй мекен жайы және телефон нөмірі, әлеуметтік сақтандыру нөмірі, т.б.''

'''Бұл жүйе қызметін теріс пайдалансаңыз, құқықтарыңыз өшіріледі.'''

Аластатылған даналар торап бойынша әркімгеде көрінбейді,
дегенмен, жоюлар жазылып алынады және қате әрекет болса,
дерекқор әкімшісі қолмен қайтадан келтіруге мүмкін.",
'hiderevision-reason' => 'Себебі (жеке жазылып алынады):',
'hiderevision-submit' => 'Деректерді тұрақты жасыру',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Нұсқаны жасыр',
// Status & errors on action
'hiderevision-norevisions' => 'Жоюға ешқандай нусқа белгіленбеген.',
'hiderevision-noreason' => 'Бұл жоюдың себебін жазып беріңіз.',
'hiderevision-status' => '$1 нұсқасы: $2',
'hiderevision-success' => 'Сәтті мұрағаталды және жойлды.',
'hiderevision-error-missing' => 'Дерекқорда табылмады.',
'hiderevision-error-current' => 'Беттің соңғы түзетуі жойылынбады. Алдынан бұл түзетуді қайтарыңыз.',
'hiderevision-error-delete' => 'Мұрағатталынбады; алдынан жойылғанба?',
'hiderevision-archive-status' => '$1 кезіндегі нұсқа жойылды: $2',
'oversight-nodiff' => 'Өзгерістер байқалынбайды, өйткені ағымда бұл беттің алдыңғы нұсқасы жоқ. Қай-қайсысы болуы мүмкін:
* Бет жойлған
* Жасырылған нұсқа бірінші болған',
// Logging
'oversight-log-hiderev' => '$1 кезіндегі түзету жойылды',
// Oversight review page
'oversight' => 'Бет нұсқаларын жасыру',
'oversight-view' => 'егжей-тегжейлері',
'oversight-difference' => '(Алдынан қалған нұсқамен айырмашылық)',
'oversight-prev' => 'Алдыңғы нұсқа',
'oversight-hidden' => 'Жасырылған нұсқа',
'oversight-header' => 'Төменде баршадан тұрақты жасырылған нұсқалар тізімі беріледі.
Бұл мәліметті баршаға ашқанда Нұсқа жасырушы құқықтарыңыз әрдайым өшіріледі.',
),

/* Kazakh Latin (AlefZet) */
'kk-tr' => array('hiderevision' => 'Nusqalardı turaqtı jasırw',
// Empty form
'hiderevision-prompt' => 'Joýılatın nusqa nömiri:',
'hiderevision-continue' => 'Jalğastırw',
// Confirmation form
'hiderevision-text' =>
"Bul ''tek''' kelesi jağdaýlarda qoldanılw qajet:
* Jeke derekter teris bolsa
*: ''üý meken jaýı jäne telefon nömiri, älewmettik saqtandırw nömiri, t.b.''

'''Bul jüýe qızmetin teris paýdalansañız, quqıqtarıñız öşiriledi.'''

Alastatılğan danalar torap boýınşa ärkimgede körinbeýdi,
degenmen, joywlar jazılıp alınadı jäne qate äreket bolsa,
derekqor äkimşisi qolmen qaýtadan keltirwge mümkin.",
'hiderevision-reason' => 'Sebebi (jeke jazılıp alınadı):',
'hiderevision-submit' => 'Derekterdi turaqtı jasırw',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Nusqanı jasır',
// Status & errors on action
'hiderevision-norevisions' => 'Joywğa eşqandaý nwsqa belgilenbegen.',
'hiderevision-noreason' => 'Bul joywdıñ sebebin jazıp beriñiz.',
'hiderevision-status' => '$1 nusqası: $2',
'hiderevision-success' => 'Sätti murağataldı jäne joýldı.',
'hiderevision-error-missing' => 'Derekqorda tabılmadı.',
'hiderevision-error-current' => 'Bettiñ soñğı tüzetwi joýılınbadı. Aldınan bul tüzetwdi qaýtarıñız.',
'hiderevision-error-delete' => 'Murağattalınbadı; aldınan joýılğanba?',
'hiderevision-archive-status' => '$1 kezindegi nusqa joýıldı: $2',
'oversight-nodiff' => 'Özgerister baýqalınbaýdı, öýtkeni ağımda bul bettiñ aldıñğı nusqası joq. Qaý-qaýsısı bolwı mümkin:
* Bet joýlğan
* Jasırılğan nusqa birinşi bolğan',
// Logging
'oversight-log-hiderev' => '$1 kezindegi tüzetw joýıldı',
// Oversight review page
'oversight' => 'Bet nusqaların jasırw',
'oversight-view' => 'egjeý-tegjeýleri',
'oversight-difference' => '(Aldınan qalğan nusqamen aýırmaşılıq)',
'oversight-prev' => 'Aldıñğı nusqa',
'oversight-hidden' => 'Jasırılğan nusqa',
'oversight-header' => 'Tömende barşadan turaqtı jasırılğan nusqalar tizimi beriledi.
Bul mälimetti barşağa aşqanda Nusqa jasırwşı quqıqtarıñız ärdaýım öşiriledi.',
),

/* Kazakh Arabic (AlefZet) */
'kk-cn' => array('hiderevision' => 'نۇسقالاردى تۇراقتى جاسىرۋ',
// Empty form
'hiderevision-prompt' => 'جويىلاتىن نۇسقا نٶمٸرٸ:',
'hiderevision-continue' => 'جالعاستىرۋ',
// Confirmation form
'hiderevision-text' =>
"بۇل ''تەك''' كەلەسٸ جاعدايلاردا قولدانىلۋ قاجەت:
* جەكە دەرەكتەر تەرٸس بولسا
*: ''ٷي مەكەن جايى جٵنە تەلەفون نٶمٸرٸ, ٵلەۋمەتتٸك ساقتاندىرۋ نٶمٸرٸ, ت.ب.''

'''بۇل جٷيە قىزمەتٸن تەرٸس پايدالانساڭىز, قۇقىقتارىڭىز ٶشٸرٸلەدٸ.'''

الاستاتىلعان دانالار توراپ بويىنشا ٵركٸمگەدە كٶرٸنبەيدٸ,
دەگەنمەن, جويۋلار جازىلىپ الىنادى جٵنە قاتە ٵرەكەت بولسا,
دەرەكقور ٵكٸمشٸسٸ قولمەن قايتادان كەلتٸرۋگە مٷمكٸن.",
'hiderevision-reason' => 'سەبەبٸ (جەكە جازىلىپ الىنادى):',
'hiderevision-submit' => 'دەرەكتەردٸ تۇراقتى جاسىرۋ',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'نۇسقانى جاسىر',
// Status & errors on action
'hiderevision-norevisions' => 'جويۋعا ەشقانداي نۋسقا بەلگٸلەنبەگەن.',
'hiderevision-noreason' => 'بۇل جويۋدىڭ سەبەبٸن جازىپ بەرٸڭٸز.',
'hiderevision-status' => '$1 نۇسقاسى: $2',
'hiderevision-success' => 'سٵتتٸ مۇراعاتالدى جٵنە جويلدى.',
'hiderevision-error-missing' => 'دەرەكقوردا تابىلمادى.',
'hiderevision-error-current' => 'بەتتٸڭ سوڭعى تٷزەتۋٸ جويىلىنبادى. الدىنان بۇل تٷزەتۋدٸ قايتارىڭىز.',
'hiderevision-error-delete' => 'مۇراعاتتالىنبادى; الدىنان جويىلعانبا؟',
'hiderevision-archive-status' => '$1 كەزٸندەگٸ نۇسقا جويىلدى: $2',
'oversight-nodiff' => 'ٶزگەرٸستەر بايقالىنبايدى, ٶيتكەنٸ اعىمدا بۇل بەتتٸڭ الدىڭعى نۇسقاسى جوق. قاي-قايسىسى بولۋى مٷمكٸن:
* بەت جويلعان
* جاسىرىلعان نۇسقا بٸرٸنشٸ بولعان',
// Logging
'oversight-log-hiderev' => '$1 كەزٸندەگٸ تٷزەتۋ جويىلدى',
// Oversight review page
'oversight' => 'بەت نۇسقالارىن جاسىرۋ',
'oversight-view' => 'ەگجەي-تەگجەيلەرٸ',
'oversight-difference' => '(الدىنان قالعان نۇسقامەن ايىرماشىلىق)',
'oversight-prev' => 'الدىڭعى نۇسقا',
'oversight-hidden' => 'جاسىرىلعان نۇسقا',
'oversight-header' => 'تٶمەندە بارشادان تۇراقتى جاسىرىلعان نۇسقالار تٸزٸمٸ بەرٸلەدٸ.
بۇل مٵلٸمەتتٸ بارشاعا اشقاندا نۇسقا جاسىرۋشى قۇقىقتارىڭىز ٵردايىم ٶشٸرٸلەدٸ.',
),

/* nld / Dutch (Siebrand Mazeland) */
'nl' => array(
'hiderevision' => 'Versies permanent verbergen',
// Empty form
'hiderevision-prompt' => 'Te verwijderen versienummer:',
'hiderevision-continue' => 'Doorgaan',
// Confirmation form
'hiderevision-text' =>
"Dit dient '''alleen''' gebruikt te worden in de volgende gevallen:
* Ontoelaatbare persoonlijke informatie
*: ''woonadressen en telefoonnummers, sofinummers, enzovoort''

'''Misbruik van dit systeem wordt betreft met het intrekken van rechten.'''

Verwijderde versies zijn niet voor iedereen zichtbaar via de website,
maar verwijderde objecten worden in logboeken bijgehouden en kunnen handmatig
teruggeet worden door databasebeheerders als u een fout maakt.",
'hiderevision-reason' => 'Reden (wordt discreet opgeslaten):',
'hiderevision-submit' => 'Deze gegevens permanent verbergen',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Verberg versie',
// Status & errors on action
'hiderevision-norevisions' => 'Er zijn geen te verwijderen versies opgegeven.',
'hiderevision-noreason' => 'U moet een reden opgeven voor het verwijderen.',
'hiderevision-status' => 'Versie $1: $2',
'hiderevision-success' => 'Archiveren en verwijderen geslaagd.',
'hiderevision-error-missing' => 'Niet gevonden in database.',
'hiderevision-error-current' => 'De laatste bewerkin van een pagina kan niet verwijderd worden. Draai de bewerking eerst terug.',
'hiderevision-error-delete' => 'Archiveren mislukt; waren de gegevens al verwijderd?',
'hiderevision-archive-status' => 'Verwijder versie van $1: $2',
'oversight-nodiff' => 'Niet in staat om de wijzigingen weer te geven omdat er geen eerdere versie van de pagina aanwezig is, omdat::
*De pagina was verwijderd
*Deze verborgen versie de eerste versie was',
// Logging
'oversight-log-hiderev' => 'verwijderde een bewerking uit $1',
// Oversight review page
'oversight-difference' => '(Verschillen met vorige zichtbare versie)',
'oversight-prev' => 'Laatste vorige versie',
'oversight-hidden' => 'Verborgen versie',
'oversight-header' => 'Hieronder staat een lijst met versies die permanent verborgen zijn voor iedereen.
Het vrijgeven van deze informatie kan tot gevolg hebben dat Oversightrechten worden ingenomen.',
),

/* Portuguese (Lugusto) */
'pt' => array(
'hiderevision' => 'Ocultar revisões permanentemente',
// Empty form
'hiderevision-prompt' => 'Número da revisão (edição) a ser removida:',
'hiderevision-continue' => 'Avançar',
// Confirmation form
'hiderevision-text' =>
"Isto deverá ser utilizado '''apenas''' nos seguintes casos:
* Informações pessoais inadequadas
*: ''endereços residenciais e números de telefone, número do seguro social, etc''

'''Abusos com este recurso poderão resultar na perda dos privilégios de acesso.'''

Os itens removidos não estarão mais visíveis a todos neste sítio,
mas estarão registados e poderão ser restaurados manualmente
por administrador da base de dados, caso você tenha cometido um engano.",
'hiderevision-reason' => 'Motivo (será registado privadamente):',
'hiderevision-submit' => 'Ocultar estes dados permanentemente',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Ocultar revisões',
// Status & errors on action
'hiderevision-norevisions' => 'Não foram especificadas revisões a serem ocultadas.',
'hiderevision-noreason' => 'É necessário descrever o motivo para esta remoção.',
'hiderevision-status' => 'Revisão $1: $2',
'hiderevision-success' => 'Arquivado e deletado com sucesso.',
'hiderevision-error-missing' => 'Não foi localizada na base de dados.',
'hiderevision-error-current' => 'Não é possível ocultar a edição mais recente de uma página. Reverta a alteração primeiro.',
'hiderevision-error-delete' => 'Não é possível arquivar; não teria sido eliminada antes da tentativa?',
'hiderevision-archive-status' => 'Revisão ocultada de $1: $2',
'oversight-nodiff' => 'Não foi possível verificar as alterações, uma vez que não há edições anteriores para esta página. Motivos possíveis:
*A página foi eliminada
*Esta edição oculta era a primeira edição da página',
// Logging
'oversight-log-hiderev' => 'removida uma edição de $1',
// Oversight review page
'oversight' => 'Oversight',
'oversight-view' => 'detalhes',
'oversight-difference' => '(Diferenças entre as edições anteriores restantes)',
'oversight-prev' => 'Última edição anterior',
'oversight-hidden' => 'Edição oculta',
'oversight-header' => 'Listagem de edições permanentemente ocultas de serem vistas publicamente.
Liberar tais dados poderá resultar na perda em definitivo dos privilégios de oversight.',
),

/* Russian */
'ru' => array(
'hiderevision' => 'Скрыть версию страницы',
// Empty form
'hiderevision-prompt' => 'Номер версии, которую требуется скрыть:',
'hiderevision-continue' => 'Продолжить',
// Confirmation form
'hiderevision-text' =>
"Данная страница должна использоваться '''только''' в случае разглашения личной информации —''реальные имя и фамилия, домашние адреса и номера телефонов, паспортов, и тому подобное''.

'''Злоупотребление данной системой повлечёт за собой лишение прав.'''

Скрытые версии страниц не будут видны через интерфейс MediaWiki,
но они записываются в журнал и могут быть восстановлены
администратором базы данных, если вы случайно сделаете ошибку.",
'hiderevision-reason' => 'Причина (будет записана в закрытый журнал):',
'hiderevision-submit' => 'Скрыть данные',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Скрыть версию',
// Status & errors on action
'hiderevision-norevisions' => 'Не были указаны версии, которые следует скрыть.',
'hiderevision-noreason' => 'Вы должны написать причину сокрытия.',
'hiderevision-status' => 'Версия №$1: $2',
'hiderevision-success' => 'Успешно заархивирована и скрыта.',
'hiderevision-error-missing' => 'Не найдена в базе данных.',
'hiderevision-error-current' => 'Невозможно удалить текущую версию страницы. Сначала откатите изменения',
'hiderevision-error-delete' => 'Невзможно заархивировать. Проверьте, не была-ли версия удалена ранее?',
'hiderevision-archive-status' => 'Удалена версия со страницы $1: $2',
'oversight-nodiff' => 'Невозможно опрдеделить изменения из-за недоступности предыдущей версии страницы. Возможно:
*Данная страница была удалена
*Скрытая версия была первой',
// Logging
'oversight-log-hiderev' => 'скрыта правка со страницы $1',
// Oversight review page
'oversight' => 'Журнал скрытия версий',
'oversight-view' => 'детали',
'oversight-difference' => '(Разница с предыдущей неудалённой версией)',
'oversight-prev' => 'Предыдущая версия',
'oversight-hidden' => 'Скрытая версия',
'oversight-header' => 'Ниже приведены версии, которые недавно были скрыты.
Распространение данной информации может повлечь лишение прав ревизора.',
),

/* Slovak (helix84) */
'sk' => array(
'hiderevision' => 'Natrvalo skryť revízie',
// Empty form
'hiderevision-prompt' => 'Číslo revízie, ktorá sa má odstrániť:',
'hiderevision-continue' => 'Pokračovať',
// Confirmation form
'hiderevision-text' =>
"Táto funkcia by sa mala využívať '''výlučne''' v nasledovných prípadoch:
* Nevhodné osobné informácie
*: ''domáce adresy a telefónne čísla, čísla sociálneho poistenia atď.''

'''Zneužitie tohto systému bude potrestané odňatím privilégií.'''

Odstránené položky nebudú viditeľné nikomu prostredníctvom webstránky,
ale o mazaniach sa vedie záznam a je možné ich obnoviť ručne
administrátorom databázy v prípade, že spravíte chybu.",
'hiderevision-reason' => 'Dôvod (bude privátne zaznamenaný):',
'hiderevision-submit' => 'Natrvalo skryť tieto údaje',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Skryť revíziu',
// Status & errors on action
'hiderevision-norevisions' => 'Neboli uvedené revízie, ktoré majú byť skryté.',
'hiderevision-noreason' => 'Musíte uviesť dôvod odstránenia.',
'hiderevision-status' => 'Revízia $1: $2',
'hiderevision-success' => 'Úspešne archivované a zmazané.',
'hiderevision-error-missing' => 'Nenájdené v databáze.',
'hiderevision-error-current' => 'Nebolo možné zmazať poslednú úpravu stránky. Najprv túto zmenu vráťte.',
'hiderevision-error-delete' => 'Nebolo možné archivovať; bolo už predtým zmazané?',
'hiderevision-archive-status' => 'Zmazané revízie počínajúc $1: $2',
// Logging
'oversight-log-hiderev' => 'Odstránená úprava z $1',
// Oversight review page
'oversight' => 'Oversight',
'oversight-view' => 'podrobnosti',
),

/* Serbian default (Sasa Stefanovic) */
'sr' => array(
'hiderevision' => 'Трајно сакриј ревизије',
// Empty form
'hiderevision-prompt' => 'Број ревизије за уклањање:',
'hiderevision-continue' => 'Настави',
// Confirmation form
'hiderevision-text' =>
"Ова опција треба да се користи '''само''' у следећим случајевима:

* Неумесне личне информације
*: ''кућне адресе, бројеви телефона, матични бројеви и сл.''

'''Злоупотреба овог система ће довести до губитка ових привилегија.'''

Уклоњене ставке неће бити видљиве никоме преко сајта, али се брисања записују
и администратори базе података их могу ручно вратити ако направите грешку.",
'hiderevision-reason' => 'Разлог (биће записан приватно)::',
'hiderevision-submit' => 'Сакриј ове податке заувек',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Сакриј ревизију',
// Status & errors on action
'hiderevision-norevisions' => 'Није назначена ниједна ревизија за брисање.',
'hiderevision-noreason' => 'Морате дати разлог за ово уклањање.',
'hiderevision-status' => 'Ревизија $1: $2',
'hiderevision-success' => 'Успешно архивирање и брисање.',
'hiderevision-error-missing' => 'Није пронађено у бази података.',
'hiderevision-error-current' => 'Не могу да обришем најскорију измену на страници. Прво вратите измену.',
'hiderevision-error-delete' => 'Не могу да архивирам; да ли је претходно обрисана?',
'hiderevision-archive-status' => 'Обрисана ревизија из $1: $2',
// Logging
'oversight-log-hiderev' => 'уклоњена измена из $1',
// Oversight review page
'oversight' => 'Пропуст',
'oversight-view' => 'детаљи',
),

/* Serbian cyrillic (Sasa Stefanovic) */
'sr-ec' => array(
'hiderevision' => 'Трајно сакриј ревизије',
// Empty form
'hiderevision-prompt' => 'Број ревизије за уклањање:',
'hiderevision-continue' => 'Настави',
// Confirmation form
'hiderevision-text' =>
"Ова опција треба да се користи '''само''' у следећим случајевима:

* Неумесне личне информације
*: ''кућне адресе, бројеви телефона, матични бројеви и сл.''

'''Злоупотреба овог система ће довести до губитка ових привилегија.'''

Уклоњене ставке неће бити видљиве никоме преко сајта, али се брисања записују
и администратори базе података их могу ручно вратити ако направите грешку.",
'hiderevision-reason' => 'Разлог (биће записан приватно)::',
'hiderevision-submit' => 'Сакриј ове податке заувек',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Сакриј ревизију',
// Status & errors on action
'hiderevision-norevisions' => 'Није назначена ниједна ревизија за брисање.',
'hiderevision-noreason' => 'Морате дати разлог за ово уклањање.',
'hiderevision-status' => 'Ревизија $1: $2',
'hiderevision-success' => 'Успешно архивирање и брисање.',
'hiderevision-error-missing' => 'Није пронађено у бази података.',
'hiderevision-error-current' => 'Не могу да обришем најскорију измену на страници. Прво вратите измену.',
'hiderevision-error-delete' => 'Не могу да архивирам; да ли је претходно обрисана?',
'hiderevision-archive-status' => 'Обрисана ревизија из $1: $2',
// Logging
'oversight-log-hiderev' => 'уклоњена измена из $1',
// Oversight review page
'oversight' => 'Пропуст',
'oversight-view' => 'детаљи',
),

/* Serbian latin (Sasa Stefanovic) */
'sr-el' => array(
'hiderevision' => 'Trajno sakrij revizije',
// Empty form
'hiderevision-prompt' => 'Broj revizije za uklanjanje:',
'hiderevision-continue' => 'Nastavi',
// Confirmation form
'hiderevision-text' =>
"Ova opcija treba da se koristi '''samo''' u sledećim slučajevima:

* Neumesne lične informacije
*: ''kućne adrese, brojevi telefona, matični brojevi i sl.''

'''Zloupotreba ovog sistema će dovesti do gubitka ovih privilegija.'''

Uklonjene stavke neće biti vidljive nikome preko sajta, ali se brisanja zapisuju
i administratori baze podataka ih mogu ručno vratiti ako napravite grešku.",
'hiderevision-reason' => 'Razlog (biće zapisan privatno)::',
'hiderevision-submit' => 'Sakrij ove podatke zauvek',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Sakrij reviziju',
// Status & errors on action
'hiderevision-norevisions' => 'Nije naznačena nijedna revizija za brisanje.',
'hiderevision-noreason' => 'Morate dati razlog za ovo uklanjanje.',
'hiderevision-status' => 'Revizija $1: $2',
'hiderevision-success' => 'Uspešno arhiviranje i brisanje.',
'hiderevision-error-missing' => 'Nije pronađeno u bazi podataka.',
'hiderevision-error-current' => 'Ne mogu da obrišem najskoriju izmenu na stranici. Prvo vratite izmenu.',
'hiderevision-error-delete' => 'Ne mogu da arhiviram; da li je prethodno obrisana?',
'hiderevision-archive-status' => 'Obrisana revizija iz $1: $2',
// Logging
'oversight-log-hiderev' => 'uklonjena izmena iz $1',
// Oversight review page
'oversight' => 'Propust',
'oversight-view' => 'detalji',
),

/* Cantonese (Shinjiman) */
'yue' => array(
'hiderevision' => '永久收埋修訂',
// Empty form
'hiderevision-prompt' => '要拎走嘅修訂號:',
'hiderevision-continue' => '繼續',
// Confirmation form
'hiderevision-text' =>
"呢樣嘢'''只係'''應該可幾響下面嘅情況之下去用:
* 唔合適嘅個人資料
*: ''屋企嘅地址同電話號碼、社區保安號等''

'''濫用呢個系統將會無咗呢度嘢嘅權限。'''

任何人都唔會響個網站度見到拎走咗嘅項目，
但係嗰啲刪除都會記錄落來，如果你先前做錯咗嘅話，
係可以由數據庫管理員做手動回復，攞番之前啲資料。",
'hiderevision-reason' => '原因 (會私人噉記低):',
'hiderevision-submit' => '永久收埋呢樣資料',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => '收埋修訂',
// Status & errors on action
'hiderevision-norevisions' => '無指定一個修訂去刪除。',
'hiderevision-noreason' => '你一定要講出一個原因去刪除。',
'hiderevision-status' => '修訂 $1: $2',
'hiderevision-success' => '已經成功歸檔同刪除咗。',
'hiderevision-error-missing' => '響數據庫度搵唔到。',
'hiderevision-error-current' => '唔可以響嗰版度刪除最新嘅編輯。請先將呢個修改打回頭。',
'hiderevision-error-delete' => '唔可以歸檔；係咪之前已經刪除咗？',
'hiderevision-archive-status' => '已經由$1度刪除咗修訂: $2',
'oversight-nodiff' => '唔能夠追蹤更改，因為響嗰版而家無先前嘅修訂。一係:
*嗰一版已經刪除咗，又或者
*呢個收埋咗嘅版本係第一個修訂',
// Logging
'oversight-log-hiderev' => '已經響$1度拎走咗一個編輯',
// Oversight review page
'oversight' => '監督',
'oversight-view' => '細節',
'oversight-difference' => '(由之前剩底修訂嘅差異)',
'oversight-prev' => '上一個之前嘅修訂',
'oversight-hidden' => '收埋修訂',
'oversight-header' => '下面係一個之前永久收埋，唔畀公眾睇嘅修訂清單。
發放呢啲資料可以導致永久損失監督嘅權限。',
),

/* Chinese (Simplified) (Alex S.H. Lin) */
'zh-hans' => array(
'hiderevision' => '永久隐藏修订版本',
// Empty form
'hiderevision-prompt' => '要隐藏的修订版本号码:',
'hiderevision-continue' => '继续',
// Confirmation form
'hiderevision-text' =>
"'''注意！'''本工具'''只能'''在以下情况才能使用：
* 这个修订版本含有不适当的个人隐私资讯。
*: ''例如一个人的住处地址、电话号码、身分证号码等等…''

'''滥用此工具，最终将会失去使用此工具的特殊权限！'''

删除这个项目，将会使这个网站上何任人都无法看到此项目,
如果您误删了修订版本，必须请管理员从资料库中手动恢复。",
'hiderevision-reason' => '理由 (这个记录将不会公开):',
'hiderevision-submit' => '永久隐藏这项资料',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => '隐藏此修订',
// Status & errors on action
'hiderevision-norevisions' => '没有指定的修订版本被删除',
'hiderevision-noreason' => '您必须说明隐藏这个修订版本的理由。',
'hiderevision-status' => '修订版本 $1: $2',
'hiderevision-success' => '已经完成隐藏与记录此操作',
'hiderevision-error-missing' => '资料库找不到这个修订版本。',
'hiderevision-error-current' => '本页为该页面的最新版本，无法隐藏。请先恢复这个页面之前的编辑。',
'hiderevision-error-delete' => '无法记录此操作。可能之前已经被删除。',
'hiderevision-archive-status' => '已删除的修订版本。从 $1: $2',
'oversight-nodiff' => '无法与过去之前的版本做差异比较，可能是因为：
*这个页面已经被删除。
*隐藏的页面为最先建立的版本。',
// Logging
'oversight-log-hiderev' => '隐藏 $1 中的一个修订版本',
// Oversight review page
'oversight' => 'Oversight',
'oversight-view' => '内容',
'oversight-difference' => '(与之前存在之修订版本的差异)',
'oversight-prev' => '最后一个之前的修订版本',
'oversight-hidden' => '隐藏修订',
'oversight-header' => '以下列示的是已经永久隐藏的修订版本。请注意！泄漏这些讯息将会永远丧失{{int:Oversight}}权限！',
),

/* Chinese (Traditional) (Alex S.H. Lin) */
'zh-hant' => array(
'hiderevision' => '永久隱藏修訂版本',
// Empty form
'hiderevision-prompt' => '要隱藏的修訂版本號碼:',
'hiderevision-continue' => '繼續',
// Confirmation form
'hiderevision-text' =>
"'''注意！'''本工具'''只能'''在以下情況才能使用：
* 這個修訂版本含有不適當的個人隱私資訊。
*: ''例如一個人的住處地址、電話號碼、身分證號碼等等…''

'''濫用此工具，最終將會失去使用此工具的特殊權限！'''

刪除這個項目，將會使這個網站上何任人都無法看到此項目,
如果您誤刪了修訂版本，必須請管理員從資料庫中手動恢復。",
'hiderevision-reason' => '理由 (這個記錄將不會公開):',
'hiderevision-submit' => '永久隱藏這項資料',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => '隱藏此修訂',
// Status & errors on action
'hiderevision-norevisions' => '沒有指定的修訂版本被刪除',
'hiderevision-noreason' => '您必須說明隱藏這個修訂版本的理由。',
'hiderevision-status' => '修訂版本 $1: $2',
'hiderevision-success' => '已經完成隱藏與記錄此操作',
'hiderevision-error-missing' => '資料庫找不到這個修訂版本。',
'hiderevision-error-current' => '本頁為該頁面的最新版本，無法隱藏。請先恢復這個頁面之前的編輯。',
'hiderevision-error-delete' => '無法記錄此操作。可能之前已經被刪除。',
'hiderevision-archive-status' => '已刪除的修訂版本。從 $1: $2',
'oversight-nodiff' => '無法與過去之前的版本做差異比較，可能是因為：
*此頁面已經被刪除。
*隱藏的頁面為最先建立的版本。',
// Logging
'oversight-log-hiderev' => '隱藏 $1 中的一個修訂版本',
// Oversight review page
'oversight' => 'Oversight',
'oversight-view' => '內容',
'oversight-difference' => '(與之前存在之修訂版本的差異)',
'oversight-prev' => '最後一個之前的修訂版本',
'oversight-hidden' => '隱藏修訂',
'oversight-header' => '以下列示的是已經永久隱藏的修訂版本。請注意！洩漏這些訊息將會永遠喪失{{int:Oversight}}權限！',
),

	);

	/* Kazakh default, fallback to kk-kz */
	$messages['kk'] = $messages['kk-kz'];
	/* Chinese defaults, fallback to zh-hans or zh-hant */
	$messages['zh-cn'] = $messages['zh-hans'];
	$messages['zh-hk'] = $messages['zh-hant'];
	$messages['zh-sg'] = $messages['zh-hans'];
	$messages['zh-tw'] = $messages['zh-hant'];
	/* Cantonese default, fallback to yue */
	$messages['zh-yue'] = $messages['yue'];

	return $messages;

}

