<?php 
#coding: utf-8
/** \file
* \brief Internationalization file for the User Merge and Delete Extension.
*/

$messages = array();

$messages['en'] = array(
	'usermerge' => 'User Merge and Delete',
	'usermerge-badolduser' 		=> 'Invalid Old Username',
	'usermerge-badnewuser' 		=> 'Invalid New User',
	'usermerge-nonewuser' 		=> 'Empty New Username - Assuming merge to $1.<br />Click <u>Merge User</u> to accept.',
	'usermerge-noolduser' 		=> 'Empty Old Username',
	'usermerge-olduser' 		=> 'Old User(Merge From)',
	'usermerge-newuser' 		=> 'New User(Merge To)',
	'usermerge-deleteolduser' 	=> 'Delete Old User?',
	'usermerge-submit' 		=> 'Merge User',
	'usermerge-badtoken' 		=> 'Invalid Edit Token',
	'usermerge-userdeleted' 	=> '$1($2) has been deleted.',
	'usermerge-userdeleted-log' 	=> 'Deleted user: $2($3)',
	'usermerge-updating' 		=> 'Updating $1 table ($2 to $3)',
	'usermerge-success' 		=> 'Merge from $1($2) to $3($4) is complete.',
	'usermerge-success-log' 	=> 'User $2($3) merged to $4($5)',
	'usermerge-logpage'           	=> 'User Merge log',
	'usermerge-logpagetext'       	=> 'This is a log of user merge actions'
);

$messages['ar'] = array(
	'usermerge' => 'دمج وحذف المستخدم',
	'usermerge-badolduser' => 'اسم المستخدم القديم غير صحيح',
	'usermerge-badnewuser' => 'المستخدم الجديد غير صحيح',
	'usermerge-nonewuser' => 'اسم مستخدم جديد فارغ - افتراض الدمج إلى $1.<br />اضغط <u>دمج المستخدم</u> للقبول.',
	'usermerge-noolduser' => 'اسم المستخدم القديم فارغ',
	'usermerge-olduser' => 'مستخدم قديم(دمج من)',
	'usermerge-newuser' => 'مستخدم جديد(دمج إلى)',
	'usermerge-deleteolduser' => 'حذف المستخدم القديم؟',
	'usermerge-submit' => 'دمج المستخدم',
	'usermerge-badtoken' => 'نص تعديل غير صحيح',
	'usermerge-userdeleted' => '$1($2) تم حذفه.',
	'usermerge-userdeleted-log' => 'حذف المستخدم: $2($3)',
	'usermerge-updating' => 'تحديث $1 جدول ($2 إلى $3)',
	'usermerge-success' => 'الدمج من $1($2) إلى $3($4) اكتمل.',
	'usermerge-success-log' => 'المستخدم $2($3) تم دمجه مع $4($5)',
	'usermerge-logpage' => 'سجل دمج المستخدم',
	'usermerge-logpagetext' => 'هذا سجل بعمليات دمج المستخدمين',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'usermerge'                 => 'Сливане и изтриване на потребители',
	'usermerge-badolduser'      => 'Невалиден стар потребител',
	'usermerge-badnewuser'      => 'Невалиден нов потребител',
	'usermerge-deleteolduser'   => 'Изтриване на стария потребител?',
	'usermerge-submit'          => 'Сливане',
	'usermerge-userdeleted'     => '$1($2) беше изтрит.',
	'usermerge-userdeleted-log' => 'Изтрит потребител: $2($3)',
	'usermerge-logpage'         => 'Дневник на потребителските сливания',
);

$messages['de'] = array(
	'usermerge' => 'Benutzerkonten zusammenführen und löschen',
);
$messages['fr'] = array(
	'usermerge' => 'Fusionner utilisateur et détruire',
	'usermerge-badolduser' => 'Ancien nom d\'utilisateur invalide',
	'usermerge-badnewuser' => 'Nouveau nom d\'utilisateur invalide',
	'usermerge-nonewuser' => 'Nouveau nom d\'utilisateur vide. Nous faisons l\'hypothèse que vous voulez fusionner dans $1.

Cliquez sur \'\'Fusionner utilisateur\'\' pour accepter.',
	'usermerge-noolduser' => 'Ancien nom d\'utilisateur vide',
	'usermerge-olduser' => 'Ancien utilisateur(fusionner depuis)',
	'usermerge-newuser' => 'Nouvel utilisateur(fusionner dans)',
	'usermerge-deleteolduser' => 'Détruire l’ancien utilisateur ?',
	'usermerge-submit' => 'Fusionner utilisateur',
	'usermerge-badtoken' => 'Token d\'édition invalide',
	'usermerge-userdeleted' => '$1($2) est détruit.',
	'usermerge-userdeleted-log' => 'Contributeur effacé : $2($3)',
	'usermerge-updating' => 'Mise à jour de la table $1 (de $2 à $3)',
	'usermerge-success' => 'La fusion de $1($2) à $3($4) est complétée.',
	'usermerge-success-log' => 'Contributeur $2($3) fusionné avec $4($5)',
	'usermerge-logpage' => 'Journal des fusions de contributeurs',
	'usermerge-logpagetext' => 'Ceci est un journal des actions de fusions des contributeurs',
);
/** Galician (Galego)
 * @author Alma
 */
$messages['gl'] = array(
	'usermerge'                 => 'Fusionar e Eliminar usuario',
	'usermerge-badolduser'      => 'Antigo Nome de usuario non válido',
	'usermerge-badnewuser'      => 'Novo Usuario non válido',
	'usermerge-nonewuser'       => 'Novo Nome de usuario baleiro - Asumindo que se fusionan para $1.<br />Prema <u>Fusionar Usuario</u> para aceptar.',
	'usermerge-noolduser'       => 'Antigo Nome de usuario baleiro',
	'usermerge-olduser'         => 'Antigo Usuario(Fusionar Para)',
	'usermerge-newuser'         => 'Novo Usuario(Fusionar A)',
	'usermerge-deleteolduser'   => 'Eliminar Antigo Usuario?',
	'usermerge-submit'          => 'Fusionar Usuario',
	'usermerge-badtoken'        => 'Sinal de Edición non válida',
	'usermerge-userdeleted'     => '$1($2) foi eliminado.',
	'usermerge-userdeleted-log' => 'Eliminado usuario: $2($3)',
	'usermerge-updating'        => 'Actualizando táboa $1 ($2 a $3)',
	'usermerge-success'         => 'A fusión de $1($2) a $3($4) está completa.',
	'usermerge-success-log'     => 'Usuario $2($3) fusionado a $4($5)',
	'usermerge-logpage'         => 'Rexistro da Fusión de usuarios',

);
$messages['hsb'] = array(
	'usermerge' => 'Wužiwarske konta zjednoćić a zničić',
	'usermerge-badolduser' => 'Njepłaćiwe stare wužiwarske mjeno',
	'usermerge-badnewuser' => 'Njepłaćiwe nowe wužiwarske mjeno',
	'usermerge-nonewuser' => 'Nowe wužiwarske mjeno faluje - najskerje ma so z $1 zjednoćić.<br /> Klikń na <u>Wužiwarske konta zjednoćić</u>, zo by potwerdźił.',
	'usermerge-noolduser' => 'Falowace stare wužiwarske mjeno',
	'usermerge-olduser' => 'Stare wužiwarske konto (Zjednoćić wot)',
	'usermerge-newuser' => 'Nowe wužiwarske konto (Zjednoćić do)',
	'usermerge-deleteolduser' => 'Stare wužiwarske mjeno zničić?',
	'usermerge-submit' => 'Wužiwarske konta zjednoćić',
	'usermerge-badtoken' => 'Njepłaćiwe wobdźěłanske znamjo',
	'usermerge-userdeleted' => '$1($2) bu zničeny.',
	'usermerge-userdeleted-log' => 'Wušmórnjeny wužiwar: $2($3)',
	'usermerge-updating' => '$1 tabela so aktualizuje ($2 do $3)',
	'usermerge-success' => 'Zjednoćenje wot $1($2) do $3($4) je dokónčene.',
	'usermerge-success-log' => 'Wužiwar $2($3) je so z $4 ($5) zjednoćił',
	'usermerge-logpage' => 'Protokol wužiwarskich zjednoćenjow',
	'usermerge-logpagetext' => 'To je protokol wužiwarskich zjednoćenjow',
);

/** French (Français)
 * @author Sherbrooke
 * @author Grondin
 */
$messages['fr'] = array(
	'usermerge'                 => 'Fusionner utilisateur et détruire',
	'usermerge-badolduser'      => "Ancien nom d'utilisateur invalide",
	'usermerge-badnewuser'      => "Nouveau nom d'utilisateur invalide",
	'usermerge-nonewuser'       => "Nouveau nom d'utilisateur vide. Nous faisons l'hypothèse que vous voulez fusionner dans $1.

Cliquez sur ''Fusionner utilisateur'' pour accepter.",
	'usermerge-noolduser'       => "Ancien nom d'utilisateur vide",
	'usermerge-olduser'         => 'Ancien utilisateur (fusionner depuis)',
	'usermerge-newuser'         => 'Nouvel utilisateur(fusionner dans)',
	'usermerge-deleteolduser'   => 'Détruire l’ancien utilisateur ?',
	'usermerge-submit'          => 'Fusionner utilisateur',
	'usermerge-badtoken'        => "Token d'édition invalide",
	'usermerge-userdeleted'     => '$1($2) est détruit.',
	'usermerge-userdeleted-log' => 'Contributeur effacé : $2($3)',
	'usermerge-updating'        => 'Mise à jour de la table $1 (de $2 à $3)',
	'usermerge-success'         => 'La fusion de $1($2) à $3($4) est complétée.',
	'usermerge-success-log'     => 'Contributeur $2($3) fusionné avec $4($5)',
	'usermerge-logpage'         => 'Journal des fusions de contributeurs',
	'usermerge-logpagetext'     => 'Ceci est un journal des actions de fusions de contributeurs',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'usermerge-userdeleted-log' => 'Geläschte Benotzer: $2($3)',
);

$messages['nl'] = array(
	'usermerge' => 'Gebruikers samenvoegen en verwijderen',
	'usermerge-badolduser' => 'Verkeerde oude gebruiker',
	'usermerge-badnewuser' => 'Verkeerde nieuwe gebruiker',
	'usermerge-nonewuser' => 'Nieuwe gebruiker is niet ingegeven - er wordt aangenomen dat er samengevoegd moet worden naar $1.<br />Klik <u>Gebruiker samenvoegen</u> om te aanvaarden.',
	'usermerge-noolduser' => 'Oude gebruiker is niet ingegeven',
	'usermerge-olduser' => 'Oude gebruiker (samenvoegen van)',
	'usermerge-newuser' => 'Nieuwe gebruiker (samenvoegen naar)',
	'usermerge-deleteolduser' => 'Oude gebruiker verwijderen?',
	'usermerge-submit' => 'Gebruiker samenvoegen',
	'usermerge-badtoken' => 'Ongeldig bewerkingstoken',
	'usermerge-userdeleted' => '$1($2) is verwijderd.',
	'usermerge-userdeleted-log' => 'Verwijderde gebruiker: $2($3)',
	'usermerge-updating' => 'Tabel $1 aan het bijwerken ($2 naar $3)',
	'usermerge-success' => 'Samenvoegen van $1($2) naar $3($4) is afgerond.',
	'usermerge-success-log' => 'Gebruiker $2($3) samengevoegd naar $3($5)',
	'usermerge-logpage' => 'Logboek gebruikerssamenvoegingen',
	'usermerge-logpagetext' => 'Dit is het logboek van gebruikerssamenvoegingen.',
);

$messages['no'] = array(
	'usermerge' => 'Brukersammenslåing og -sletting',
	'usermerge-badolduser' => 'Gammelt brukernavn ugyldig',
	'usermerge-badnewuser' => 'Nytt brukernavn ugyldig',
	'usermerge-nonewuser' => 'Nytt brukernavn tomt &ndash; antar sammenslåing til $1.<br />Klikk <u>Slå sammen brukere</u> for å godta.',
	'usermerge-noolduser' => 'Gammelt brukernavn tomt',
	'usermerge-olduser' => 'Gammelt brukernavn (slå sammen fra)',
	'usermerge-newuser' => 'Nytt brukernavn (slå sammen til)',
	'usermerge-deleteolduser' => 'Slett gammel bruker?',
	'usermerge-submit' => 'Slå sammen brukere',
	'usermerge-badtoken' => 'Ugydlgi redigeringstegn',
	'usermerge-userdeleted' => '$1 ($2) har blitt slettet.',
	'usermerge-userdeleted-log' => 'Slettet bruker: $2 ($3)',
	'usermerge-updating' => 'Oppdaterer $1-tabell ($2 til $3)',
	'usermerge-success' => 'Sammenslåing fra $1 ($2) til $3 ($4) er ferdig.',
	'usermerge-success-log' => 'Brukeren $2 ($3) slått sammen med $4 ($5)',
	'usermerge-logpage' => 'Brukersammenslåingslogg',
	'usermerge-logpagetext' => 'Dette er en logg over brukersammenslåinger.',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'usermerge'                 => 'Fusionar utilizaire e destruire',
	'usermerge-badolduser'      => "Nom d'utilizaire ancian invalid",
	'usermerge-badnewuser'      => "Nom d'utilizaire novèl invalid",
	'usermerge-nonewuser'       => "Nom d'utilizaire novèl void. Fasèm l'ipotèsi que volètz fusionar dins $1. Clicatz sus ''Fusionar utilizaire'' per acceptar.",
	'usermerge-noolduser'       => "Nom d'utilizaire ancian void",
	'usermerge-olduser'         => 'Utilizaire ancian (fusionar dempuèi)',
	'usermerge-newuser'         => 'Utilizaire novèl (fusionar dins)',
	'usermerge-deleteolduser'   => 'Destruire utilizaire ancian ?',
	'usermerge-submit'          => 'Fusionar utilizaire',
	'usermerge-badtoken'        => "Token d'edicion invalid",
	'usermerge-userdeleted'     => '$1($2) es destruch.',
	'usermerge-userdeleted-log' => 'Contributor escafat : $2($3)',
	'usermerge-updating'        => 'Mesa a jorn de la taula $1 (de $2 a $3)',
	'usermerge-success'         => 'La fusion de $1($2) a $3($4) es completada.',
	'usermerge-success-log'     => 'Contributor $2($3) fusionat amb $4($5)',
	'usermerge-logpage'         => 'Jornal de las fusions de contributors',
	'usermerge-logpagetext'     => 'Aquò es un jornal de las accions de fusions de contributors',
);

$messages['pms'] = array(
	'usermerge' => 'Union e scancelament d\'utent',
	'usermerge-badolduser' => 'Vej stranòm nen bon',
	'usermerge-badnewuser' => 'Neuv stranòm nen bon',
	'usermerge-nonewuser' => 'Neuv stranòm veujd - i la tnisoma bon për n\'union a $1.<br />de-ie \'n colp ansima a <u>Unì Utent</u> për aceté.',
	'usermerge-noolduser' => 'Vej stranòm veujd',
	'usermerge-olduser' => 'Vej stranòm (Unì da)',
	'usermerge-newuser' => 'Neuv stranòm (Unì a)',
	'usermerge-deleteolduser' => 'Veul-lo scancelé l\'utent vej?',
	'usermerge-submit' => 'Unì Utent',
	'usermerge-badtoken' => 'Geton d\'edission nen bon',
	'usermerge-userdeleted' => '$1($2) a l\'é stàit scancelà.',
	'usermerge-updating' => 'Antramentr ch\'i agiornoma la tàola $1 ($2 a $3)',
	'usermerge-success' => 'Union da $1($2) a $3($4) completà.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'usermerge'                 => 'Zlúčenie a zmazanie používateľov',
	'usermerge-badolduser'      => 'Neplatné staré používateľské meno',
	'usermerge-badnewuser'      => 'Neplatné nové používateľské meno',
	'usermerge-nonewuser'       => 'Prázdne nové používateľské meno - Predpokladá sa zlúčenie do $1.<br />Kliknutím na <u>Zlúčiť používateľov</u> prijmete.',
	'usermerge-noolduser'       => 'Prázdne staré používateľské meno',
	'usermerge-olduser'         => 'Starý používateľ(zlúčiť odtiaľto)',
	'usermerge-newuser'         => 'Nový používate(zlúčiť sem)',
	'usermerge-deleteolduser'   => 'Zmazať starého používateľa?',
	'usermerge-submit'          => 'Zlúčiť používateľov',
	'usermerge-badtoken'        => 'Neplatný token úprav',
	'usermerge-userdeleted'     => '$1($2) bol zmazaný.',
	'usermerge-userdeleted-log' => 'Zmazaný používateľ: $2($3)',
	'usermerge-updating'        => 'Aktualizuje sa tabuľka $1 ($2 na $3)',
	'usermerge-success'         => 'Zlúčenie z $1($2) do $3($4) je dokončené.',
	'usermerge-success-log'     => 'Používateľ $2($3) bol zlúčený do $4($5)',
	'usermerge-logpage'         => 'Záznam zlúčení používateľov',
	'usermerge-logpagetext'     => 'Toto je záznam zlúčení používateľov',
);

$messages['yue'] = array(
	'usermerge' => '用戶合併同刪除',
	'usermerge-badolduser' => '無效嘅舊用戶名',
	'usermerge-badnewuser' => '無效嘅新用戶名',
	'usermerge-nonewuser' => '清除新用戶名 - 假設合併到$1。<br />撳<u>合併用戶</u>去接受。',
	'usermerge-noolduser' => '清除舊用戶名',
	'usermerge-olduser' => '舊用戶 (合併自)',
	'usermerge-newuser' => '新用戶 (合併到)',
	'usermerge-deleteolduser' => '刪舊用戶？',
	'usermerge-submit' => '合併用戶',
	'usermerge-badtoken' => '無效嘅編輯幣',
	'usermerge-userdeleted' => '$1($2) 已經刪除咗。',
	'usermerge-updating' => '更新緊 $1 表 ($2 到 $3)',
	'usermerge-success' => '由 $1($2) 到 $3($4) 嘅合併已經完成。'
);

$messages['zh-hans'] = array(
	'usermerge' => '用户合并和删除',
	'usermerge-badolduser' => '无效的旧用户名',
	'usermerge-badnewuser' => '无效的新用户名',
	'usermerge-nonewuser' => '清除新用户名 - 假设合并到$1。<br />点击<u>合并用户</u>以接受。',
	'usermerge-noolduser' => '清除旧用户名',
	'usermerge-olduser' => '旧用户 (合并自)',
	'usermerge-newuser' => '新用户 (合并到)',
	'usermerge-deleteolduser' => '删除旧用户？',
	'usermerge-submit' => '合并用户',
	'usermerge-badtoken' => '无效的编辑币',
	'usermerge-userdeleted' => '$1($2) 已删除。',
	'usermerge-updating' => '正在更新 $1 表格 ($2 到 $3)',
	'usermerge-success' => '由 $1($2) 到 $3($4) 的合并已经完成。'
);

$messages['zh-hant'] = array(
	'usermerge' => '用戶合併和刪除',
	'usermerge-badolduser' => '無效的舊用戶名',
	'usermerge-badnewuser' => '無效的新用戶名',
	'usermerge-nonewuser' => '清除新用戶名 - 假設合併到$1。<br />點擊<u>合併用戶</u>以接受。',
	'usermerge-noolduser' => '清除舊用戶名',
	'usermerge-olduser' => '舊用戶 (合併自)',
	'usermerge-newuser' => '新用戶 (合併到)',
	'usermerge-deleteolduser' => '刪除舊用戶？',
	'usermerge-submit' => '合併用戶',
	'usermerge-badtoken' => '無效的編輯幣',
	'usermerge-userdeleted' => '$1($2) 已刪除。',
	'usermerge-updating' => '正在更新 $1 表格 ($2 到 $3)',
	'usermerge-success' => '由 $1($2) 到 $3($4) 的合併已經完成。'
);

$messages['zh'] = $messages['zh-hans'];
$messages['zh-cn'] = $messages['zh-hans'];
$messages['zh-hk'] = $messages['zh-hant'];
$messages['zh-sg'] = $messages['zh-hans'];
$messages['zh-tw'] = $messages['zh-hant'];
$messages['zh-yue'] = $messages['yue'];
