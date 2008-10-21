<?php
/**
 * Aliases for special pages of CentralAuth  extension.
 *
 * @addtogroup Extensions
 */

$aliases = array();

/** English
 * @author Jon Harald Søby
 */
$aliases['en'] = array(
	'CentralAuth'            => array( 'CentralAuth' ),
	'AutoLogin'              => array( 'AutoLogin' ),
	'MergeAccount'           => array( 'MergeAccount' ),
	'GlobalGroupMembership'  => array( 'GlobalUserRights', 'GlobalGroupMembership' ),
	'GlobalGroupPermissions' => array( 'GlobalGroupPermissions' ),
	'EditWikiSets'           => array( 'EditWikiSets' ),
	'GlobalUsers'            => array( 'GlobalUsers' ),
);

/** Arabic (العربية)
 * @author Meno25
 */
$aliases['ar'] = array(
	'CentralAuth' => array( 'تحقق_مركزي' ),
	'AutoLogin' => array( 'دخول_تلقائي' ),
	'MergeAccount' => array( 'دمج_حساب' ),
	'GlobalGroupMembership' => array( 'صلاحيات_المستخدم_العامة', 'عضوية_المجموعة_العامة' ),
	'GlobalGroupPermissions' => array( 'سماحات_المجموعة_العامة' ),
	'EditWikiSets' => array( 'تعديل_مجموعات_الويكي' ),
	'GlobalUsers' => array( 'مستخدمون_عامون' ),
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 */
$aliases['arz'] = array(
	'CentralAuth' => array( 'تحقق_مركزى' ),
	'AutoLogin' => array( 'دخول_تلقائى' ),
	'MergeAccount' => array( 'دمج_حساب' ),
	'GlobalGroupMembership' => array( 'صلاحيات_المستخدم_العامة', 'عضوية_المجموعة_العامة' ),
	'GlobalGroupPermissions' => array( 'سماحات_المجموعة_العامة' ),
	'EditWikiSets' => array( 'تعديل_مجموعات_الويكى' ),
	'GlobalUsers' => array( 'مستخدمون_عامون' ),
);

/** Catalan (Català) */
$aliases['ca'] = array(
	'MergeAccount' => array( 'Fusió de comptes' ),
	'GlobalUsers' => array( 'Usuaris globals' ),
);

/** German (Deutsch) */
$aliases['de'] = array(
	'CentralAuth' => array( 'Verwaltung Benutzerkonten-Zusammenführung' ),
	'AutoLogin' => array( 'Automatische Anmeldung' ),
	'MergeAccount' => array( 'Benutzerkonten zusammenführen' ),
	'GlobalGroupMembership' => array( 'Globale Benutzerrechte' ),
	'GlobalGroupPermissions' => array( 'Globale Gruppenrechte' ),
	'EditWikiSets' => array( 'Wikisets bearbeiten' ),
	'GlobalUsers' => array( 'Globale Benutzerliste' ),
);

/** Persian (فارسی) */
$aliases['fa'] = array(
	'CentralAuth' => array( 'ورود_متمرکز' ),
	'AutoLogin' => array( 'ورود_خودکار' ),
	'MergeAccount' => array( 'ادغام_حساب' ),
	'GlobalGroupMembership' => array( 'اختیارات_سراسری_کاربر' ),
	'GlobalGroupPermissions' => array( 'اختیارات_سراسری_گروه' ),
	'EditWikiSets' => array( 'ویرایش_مجموعه‌های_ویکی' ),
	'GlobalUsers' => array( 'کاربران_سراسری' ),
);

/** Finnish (Suomi) */
$aliases['fi'] = array(
	'CentralAuth' => array( 'Keskitetty varmennus' ),
	'AutoLogin' => array( 'Automaattikirjautuminen' ),
	'MergeAccount' => array( 'Yhdistä tunnus' ),
	'GlobalUsers' => array( 'Yhdistetyt tunnukset' ),
);

/** French (Français) */
$aliases['fr'] = array(
	'AutoLogin' => array( 'Login Automatique', 'LoginAutomatique', 'LoginAuto' ),
	'MergeAccount' => array( 'Fusionner le compte', 'FusionnerLeCompte' ),
	'GlobalGroupMembership' => array( 'Permissions globales', 'PermissionGlobales' ),
	'GlobalGroupPermissions' => array( 'Droits des groupes globaux', 'DroitsDesGroupesGlobaux' ),
	'EditWikiSets' => array( 'Modifier les sets de wikis', 'ModifierLesSetsDeWiki' ),
	'GlobalUsers' => array( 'Utilisateurs globaux', 'UtilisateursGlobaux' ),
);

/** Hebrew (עברית)
 * @author Rotem Liss
 */
$aliases['he'] = array(
	'CentralAuth' => array( 'חשבון_משתמש_מאוחד' ),
	'AutoLogin' => array( 'כניסה_אוטומטית' ),
	'MergeAccount' => array( 'מיזוג_חשבונות' ),
	'GlobalGroupMembership' => array( 'הרשאות_משתמש_כלליות', 'חברות_בקבוצות_כלליות' ),
	'GlobalGroupPermissions' => array( 'הרשאות_קבוצות_כלליות' ),
	'EditWikiSets' => array( 'עריכת_קבוצות_אתרי_ויקי' ),
	'GlobalUsers' => array( 'משתמשים_כלליים' ),
);

/** Croatian (Hrvatski) */
$aliases['hr'] = array(
	'CentralAuth' => array( 'Središnja_prijava' ),
	'AutoLogin' => array( 'AutoPrijava' ),
	'MergeAccount' => array( 'Spoji_račun' ),
	'GlobalGroupMembership' => array( 'Globalna_suradnička_prava' ),
	'GlobalGroupPermissions' => array( 'Globalna_prava_skupina' ),
	'EditWikiSets' => array( 'Uredi_wikiset' ),
	'GlobalUsers' => array( 'Globalni_suradnici' ),
);

/** Hungarian (Magyar) */
$aliases['hu'] = array(
	'CentralAuth' => array( 'Központi azonosítás' ),
	'AutoLogin' => array( 'Automatikus bejelentkezés' ),
	'MergeAccount' => array( 'Felhasználói fiókok egyesítése' ),
	'GlobalGroupMembership' => array( 'Globális felhasználói jogok' ),
	'GlobalUsers' => array( 'Felhasználók globális listája' ),
);

/** Khmer (ភាសាខ្មែរ) */
$aliases['km'] = array(
	'AutoLogin' => array( 'ឡុកអ៊ីនដោយស្វ័យប្រវត្តិ' ),
	'MergeAccount' => array( 'ច្របាច់បញ្ចូលគណនី' ),
);

/** Korean (한국어) */
$aliases['ko'] = array(
	'MergeAccount' => array( '계정합치기', '사용자합치기' ),
	'GlobalGroupMembership' => array( '공통권한조정' ),
	'GlobalUsers' => array( '공통계정목록' ),
);

/** Luxembourgish (Lëtzebuergesch) */
$aliases['lb'] = array(
	'CentralAuth' => array( 'Verwaltung vun der Benotzerkonten-Zesummeféierung' ),
	'AutoLogin' => array( 'Automatesch Umeldung' ),
	'MergeAccount' => array( 'Benotzerkonten zesummeféieren' ),
	'GlobalGroupMembership' => array( 'Global Benotzerrechter' ),
	'GlobalGroupPermissions' => array( 'Global Grupperechter' ),
	'EditWikiSets' => array( 'Wiki-Seten änneren' ),
	'GlobalUsers' => array( 'Global Benotzer' ),
);

/** Macedonian (Македонски) */
$aliases['mk'] = array(
	'MergeAccount' => array( 'СпојувањеНаСметки' ),
	'GlobalUsers' => array( 'ГлобалниКорисници' ),
);

/** Malay (Bahasa Melayu) */
$aliases['ms'] = array(
	'MergeAccount' => array( 'Gabungkan_akaun' ),
	'GlobalGroupMembership' => array( 'Hak_kumpulan_sejagat' ),
	'GlobalGroupPermissions' => array( 'Keizinan_kumpulan_sejagat' ),
	'EditWikiSets' => array( 'Ubah_set_wiki' ),
	'GlobalUsers' => array( 'Pengguna_sejagat' ),
);

/** Erzya (Эрзянь) */
$aliases['myv'] = array(
	'MergeAccount' => array( 'ВейтьсэндямсСовамоТарка' ),
);

/** Nedersaksisch (Nedersaksisch) */
$aliases['nds-nl'] = array(
	'CentralAuth' => array( 'Centraal_anmelden' ),
	'AutoLogin' => array( 'Autematisch_anmelden' ),
	'MergeAccount' => array( 'Gebruker_bie_mekaar_doon' ),
	'GlobalGroupMembership' => array( 'Globale_gebrukersrechen' ),
	'GlobalGroupPermissions' => array( 'Globale_groepsrechen' ),
	'EditWikiSets' => array( 'Wikigroepen_bewarken' ),
	'GlobalUsers' => array( 'Globale_gebrukers' ),
);

/** Dutch (Nederlands) */
$aliases['nl'] = array(
	'CentralAuth' => array( 'CentraalAanmelden' ),
	'AutoLogin' => array( 'AutomatischAanmelden', 'AutoAanmelden' ),
	'MergeAccount' => array( 'GebruikerSamenvoegen' ),
	'GlobalGroupMembership' => array( 'GlobaleGebruikersrechten' ),
	'GlobalGroupPermissions' => array( 'GlobaleGroepsrechten' ),
	'EditWikiSets' => array( 'WikigroepenBewerken' ),
	'GlobalUsers' => array( 'GlobaleGebruikers' ),
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬) */
$aliases['no'] = array(
	'CentralAuth' => array( 'Enhetlig innlogging' ),
	'AutoLogin' => array( 'Automatisk innlogging' ),
	'MergeAccount' => array( 'Kontosammenslåing' ),
	'GlobalGroupMembership' => array( 'Globale brukerrettigheter' ),
	'GlobalGroupPermissions' => array( 'Globale gruppetillatelser' ),
	'EditWikiSets' => array( 'Rediger wikisett' ),
	'GlobalUsers' => array( 'Globale brukere' ),
);

/** Occitan (Occitan) */
$aliases['oc'] = array(
	'AutoLogin' => array( 'Login Automatic', 'LoginAutomatic', 'LoginAuto' ),
	'MergeAccount' => array( 'Fusionar lo compte', 'FusionarLoCompte' ),
	'GlobalGroupMembership' => array( 'Permissions globalas', 'PermissionGlobalas' ),
	'GlobalGroupPermissions' => array( 'Dreches dels gropes globals', 'DrechesDelsGropesGlobals' ),
	'EditWikiSets' => array( 'Modificar los sets de wikis', 'ModificarLosSetsDeWiki' ),
	'GlobalUsers' => array( 'Utilizaires globals', 'UtilizairesGlobals' ),
);

/** Polish (Polski) */
$aliases['pl'] = array(
	'CentralAuth' => array( 'Zarządzanie kontem uniwersalnym' ),
	'MergeAccount' => array( 'Łączenie kont', 'Konto uniwersalne' ),
	'GlobalUsers' => array( 'Spis kont uniwersalnych' ),
);

/** Swedish (Svenska) */
$aliases['sv'] = array(
	'CentralAuth' => array( 'Gemensam inloggning' ),
	'MergeAccount' => array( 'Slå ihop konton' ),
	'GlobalUsers' => array( 'Globala användare' ),
);

