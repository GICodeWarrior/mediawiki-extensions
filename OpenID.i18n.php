<?php
/**
 * OpenID.i18n.php -- Interface messages for OpenID for MediaWiki
 * Copyright 2006,2007 Internet Brands (http://www.internetbrands.com/)
 * Copyright 2007,2008 Evan Prodromou <evan@prodromou.name>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @author Evan Prodromou <evan@prodromou.name>
 * @addtogroup Extensions
 */

$messages = array();

/** English
 * @author Evan Prodromou <evan@prodromou.name>
 */
$messages['en'] = array(
	'openid-desc' => 'Login to the wiki with an [http://openid.net/ OpenID], and login to other OpenID-aware web sites with a wiki user account',
	'openidlogin' => 'Login with OpenID',
	'openidfinish' => 'Finish OpenID login',
	'openidserver' => 'OpenID server',
	'openidxrds' => 'Yadis file',						
	'openidconvert' => 'OpenID converter',
	'openiderror' => 'Verification error',
	'openiderrortext' => 'An error occured during verification of the OpenID URL.',
	'openidconfigerror' => 'OpenID Configuration Error',
	'openidconfigerrortext' => 'The OpenID storage configuration for this wiki is invalid.
Please consult this site\'s administrator.',
	'openidpermission' => 'OpenID permissions error',
	'openidpermissiontext' => 'The OpenID you provided is not allowed to login to this server.',
	'openidcancel' => 'Verification cancelled',
	'openidcanceltext' => 'Verification of the OpenID URL was cancelled.',
	'openidfailure' => 'Verification failed',
	'openidfailuretext' => 'Verification of the OpenID URL failed. Error message: "$1"',
	'openidsuccess' => 'Verification succeeded',
	'openidsuccesstext' => 'Verification of the OpenID URL succeeded.',
	'openidusernameprefix' => 'OpenIDUser',
	'openidserverlogininstructions' => 'Enter your password below to log in to $3 as user $2 (user page $1).',
	'openidtrustinstructions' => 'Check if you want to share data with $1.',
	'openidallowtrust' => 'Allow $1 to trust this user account.',
	'openidnopolicy' => 'Site has not specified a privacy policy.',
	'openidpolicy' => 'Check the <a target="_new" href="$1">privacy policy</a> for more information.',
	'openidoptional' => 'Optional',
	'openidrequired' => 'Required',
	'openidnickname' => 'Nickname',
	'openidfullname' => 'Fullname',
	'openidemail' => 'E-mail address',
	'openidlanguage' => 'Language',
	'openidnotavailable' => 'Your preferred nickname ($1) is already in use by another user.',
	'openidnotprovided' => 'Your OpenID server did not provide a nickname (either because it cannot, or because you told it not to).',
	'openidchooseinstructions' => 'All users need a nickname;
you can choose one from the options below.',
	'openidchoosefull' => 'Your full name ($1)',
	'openidchooseurl' => 'A name picked from your OpenID ($1)',
	'openidchooseauto' => 'An auto-generated name ($1)',
	'openidchoosemanual' => 'A name of your choice: ',
	'openidchooseexisting' => 'An existing account on this wiki: ',
	'openidchoosepassword' => 'password: ',
	'openidconvertinstructions' => 'This form lets you change your user account to use an OpenID URL.',
	'openidconvertsuccess' => 'Successfully converted to OpenID',
	'openidconvertsuccesstext' => 'You have successfully converted your OpenID to $1.',
	'openidconvertyourstext' => 'That is already your OpenID.',
	'openidconvertothertext' => 'That is someone else\'s OpenID.',
	'openidalreadyloggedin' => "'''You are already logged in, $1!'''

If you want to use OpenID to log in in the future, you can [[Special:OpenIDConvert|convert your account to use OpenID]].",
	'tog-hideopenid' => 'Hide your <a href="http://openid.net/">OpenID</a> on your user page, if you log in with OpenID.',
	'openidnousername' => 'No username specified.',
	'openidbadusername' => 'Bad username specified.',
	'openidautosubmit' => 'This page includes a form that should be automatically submitted if you have JavaScript enabled.
If not, try the \"Continue\" button.',
	'openidclientonlytext' => 'You cannot use accounts from this wiki as OpenIDs on another site.',
	'openidloginlabel' => 'OpenID URL',
	'openidlogininstructions' => '{{SITENAME}} supports the [http://openid.net/ OpenID] standard for single signon between Web sites.
OpenID lets you log into many different Web sites without using a different password for each.
(See [http://en.wikipedia.org/wiki/OpenID Wikipedia\'s OpenID article] for more information.)

If you already have an account on {{SITENAME}}, you can [[Special:Userlogin|log in]] with your username and password as usual.
To use OpenID in the future, you can [[Special:OpenIDConvert|convert your account to OpenID]] after you have logged in normally.

There are many [http://wiki.openid.net/Public_OpenID_providers Public OpenID providers], and you may already have an OpenID-enabled account on another service.

; Other wikis : If you have an account on an OpenID-enabled wiki, like [http://wikitravel.org/ Wikitravel], [http://www.wikihow.com/ wikiHow], [http://vinismo.com/ Vinismo], [http://aboutus.org/ AboutUs] or [http://kei.ki/ Keiki], you can log in to {{SITENAME}} by entering the \'\'\'full URL\'\'\' of your user page on that other wiki in the box above. For example, \'\'<nowiki>http://kei.ki/en/User:Evan</nowiki>\'\'.
; [http://openid.yahoo.com/ Yahoo!] : If you have an account with Yahoo!, you can log in to this site by entering your Yahoo!-provided OpenID in the box above. Yahoo! OpenID URLs have the form \'\'<nowiki>https://me.yahoo.com/yourusername</nowiki>\'\'.
; [http://dev.aol.com/aol-and-63-million-openids AOL] : If you have an account with [http://www.aol.com/ AOL], like an [http://www.aim.com/ AIM] account, you can log in to {{SITENAME}} by entering your AOL-provided OpenID in the box above. AOL OpenID URLs have the form \'\'<nowiki>http://openid.aol.com/yourusername</nowiki>\'\'. Your username should be all lowercase, no spaces.
; [http://bloggerindraft.blogspot.com/2008/01/new-feature-blogger-as-openid-provider.html Blogger], [http://faq.wordpress.com/2007/03/06/what-is-openid/ Wordpress.com], [http://www.livejournal.com/openid/about.bml LiveJournal], [http://bradfitz.vox.com/library/post/openid-for-vox.html Vox] : If you have a blog on any of these services, enter your blog URL in the box above. For example, \'\'<nowiki>http://yourusername.blogspot.com/</nowiki>\'\', \'\'<nowiki>http://yourusername.wordpress.com/</nowiki>\'\', \'\'<nowiki>http://yourusername.livejournal.com/</nowiki>\'\', or \'\'<nowiki>http://yourusername.vox.com/</nowiki>\'\'.',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'openidlogin'          => 'تسجيل الدخول بالهوية المفتوحة',
	'openidserver'         => 'خادم الهوية المفتوحة',
	'openiderror'          => 'خطأ تأكيد',
	'openidcancel'         => 'التأكيد تم إلغاؤه',
	'openidfailure'        => 'التأكيد فشل',
	'openidsuccess'        => 'التأكيد نجح',
	'openidusernameprefix' => 'مستخدم الهوية المفتوحة',
	'openidoptional'       => 'اختياري',
	'openidrequired'       => 'مطلوب',
	'openidnickname'       => 'اللقب',
	'openidfullname'       => 'الاسم الكامل',
	'openidemail'          => 'عنوان البريد الإلكتروني',
	'openidlanguage'       => 'اللغة',
	'openidchoosefull'     => 'اسمك الكامل ($1)',
	'openidchoosemanual'   => 'اسم من اختيارك:',
	'openidchoosepassword' => 'كلمة السر:',
	'openidnousername'     => 'لا اسم مستخدم تم تحديده.',
	'openidbadusername'    => 'اسم المستخدم المحدد سيء.',
	'openidloginlabel'     => 'مسار الهوية المفتوحة',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'openidlogin'          => 'Влизане с OpenID',
	'openidserver'         => 'OpenID сървър',
	'openidoptional'       => 'Незадължително',
	'openidrequired'       => 'Изисква се',
	'openidnickname'       => 'Псевдоним',
	'openidfullname'       => 'Име',
	'openidemail'          => 'Електронна поща',
	'openidlanguage'       => 'Език',
	'openidnotavailable'   => 'Избраното потребителско име ($1) вече се използва от друг потребител.',
	'openidchooseauto'     => 'Автоматично генерирано име ($1)',
	'openidchoosemanual'   => 'Име по избор:',
	'openidchoosepassword' => 'парола:',
	'openidnousername'     => 'Не е посочено потребителско име.',
);

/** Danish (Dansk)
 * @author Jon Harald Søby
 */
$messages['da'] = array(
	'openidnickname'       => 'Kaldenavn',
	'openidlanguage'       => 'Sprog',
	'openidchoosepassword' => 'adgangskode:',
);

/** Greek (Ελληνικά)
 * @author Consta
 */
$messages['el'] = array(
	'openidlanguage'     => 'Γλώσσα',
	'openidchoosemanual' => 'Ένα όνομα της επιλογής σας:',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'openidrequired'       => 'Deviga',
	'openidnickname'       => 'Kaŝnomo',
	'openidfullname'       => 'Plena nomo',
	'openidemail'          => 'Retadreso',
	'openidlanguage'       => 'Lingvo',
	'openidchoosefull'     => 'Via plena nomo ($1)',
	'openidchoosepassword' => 'pasvorto:',
);

/** French (Français)
 * @author Grondin
 */
$messages['fr'] = array(
	'openid-desc'                   => "Se connecte au wiki avec [http://openid.net/ OpenID] et se connecte à d'autres site internet OpenID avec un wiki utilisant un compte utilisateur.",
	'openidlogin'                   => 'Se connecter avec OpenID',
	'openidfinish'                  => 'Finir la connection OpenID',
	'openidserver'                  => 'Serveur OpenID',
	'openidxrds'                    => 'Fichier Yadis',
	'openidconvert'                 => 'Convertisseur OpenID',
	'openiderror'                   => 'Erreur de vérification',
	'openiderrortext'               => "Une erreur est intervenue pendant la vérification de l'adresse OpenID.",
	'openidconfigerror'             => 'Erreur de configuration de OpenID',
	'openidconfigerrortext'         => 'Le stockage de la configuration OpenID pour ce wiki est incorrecte.
Veuillez vous mettre en rapport avec l’administrateur de ce site.',
	'openidpermission'              => 'Erreur de permission OpenID',
	'openidpermissiontext'          => 'L’OpenID que vous avez fournie n’est pas autorisée à se connecter sur ce serveur.',
	'openidcancel'                  => 'Vérification annulée',
	'openidcanceltext'              => 'La vérification de l’adresse OpenID a été annulée.',
	'openidfailure'                 => 'Échec de la vérification',
	'openidfailuretext'             => 'La vérification de l’adresse OpenID a échouée. Message d’erreur : « $1 »',
	'openidsuccess'                 => 'Vérification réussie',
	'openidsuccesstext'             => 'Vérification de l’adresse OpenID réussie.',
	'openidusernameprefix'          => 'Utilisateur OpenID',
	'openidserverlogininstructions' => "Entrez votre mot de passe ci-dessous pour vous connecter sur $3 comme utilisateur '''$2''' (page utilisateur $1).",
	'openidtrustinstructions'       => 'Cochez si vous désirez partager les données avec $1.',
	'openidallowtrust'              => 'Autorise $1 à faire confiance à ce compte utilisateur.',
	'openidnopolicy'                => 'Le site n’a pas indiqué une politique des données personnelles.',
	'openidpolicy'                  => 'Vérifier la <a target="_new" href="$1">Politique des données personnelles</a> pour plus d’information.',
	'openidoptional'                => 'Facultatif',
	'openidrequired'                => 'Exigé',
	'openidnickname'                => 'Surnom',
	'openidfullname'                => 'Nom en entier',
	'openidemail'                   => 'Adresse courriel',
	'openidlanguage'                => 'Langue',
	'openidnotavailable'            => 'Votre surnom préféré ($1) est déjà utilisé par un autre utilisateur.',
	'openidnotprovided'             => "Votre serveur OpenID n'a pas pu fournir un surnom (soit il ne le peut pas, soit vous lui avez demandé de ne pas le faire).",
	'openidchooseinstructions'      => "Tous les utilisateurs ont besoin d'un surnom ; vous pouvez en choisir un à partir du choix ci-dessous.",
	'openidchoosefull'              => 'Votre nom entier ($1)',
	'openidchooseurl'               => 'Un nom a été choisi depuis votre OpenID ($1)',
	'openidchooseauto'              => 'Un nom créé automatiquement ($1)',
	'openidchoosemanual'            => 'Un nom de votre choix :',
	'openidchooseexisting'          => 'Un compte existant sur ce wiki :',
	'openidchoosepassword'          => 'Mot de passe :',
	'openidconvertinstructions'     => 'Ce formulaire vous laisse changer votre compte utilisateur pour utiliser une adresse OpenID.',
	'openidconvertsuccess'          => 'Converti avec succès vers OpenID',
	'openidconvertsuccesstext'      => 'Vous avez converti avec succès votre OpenID vers $1.',
	'openidconvertyourstext'        => 'C’est déjà votre OpenID.',
	'openidconvertothertext'        => "Ceci est quelque chose autre qu'une OpenID.",
	'openidalreadyloggedin'         => "'''Vous êtes déjà connecté, $1 !'''

Vous vous désirez utiliser votre OpenID pour vous connecter ultérieurement, vous pouvez [[Special:OpenIDConvert|convertir votre compte pour utiliser OpenID]].",
	'tog-hideopenid'                => 'Cache votre <a href="http://openid.net/">OpenID</a> sur votre page utilisateur, si vous vous connectez avec OpenID.',
	'openidnousername'              => 'Aucun nom d’utilisateur n’a été indiqué.',
	'openidbadusername'             => 'Un mauvais nom d’utilisatteur a été indiqué.',
	'openidautosubmit'              => 'Cette page comprend un formulaire qui pourrait être envoyé automatiquement si vous avez activé JavaScript.
Si tel n’était pas le cas, essayez le bouton « Continuer ».',
	'openidclientonlytext'          => 'Vous ne pouvez utiliser des comptes depuis ce wiki en tant qu’OpenID sur d’autres sites.',
	'openidloginlabel'              => 'Adresse OpenID',
	'openidlogininstructions'       => "{{SITENAME}} supporte le format [http://openid.net/ OpenID] pour une seule signature entre des sites Internet.
OpenID vous permet de vous connecter sur plusieurs sites différents sans à avoir à utiliser un mot de passe différent pour chacun d’entre eux.

Si vous avez déjà un compte sur {{SITENAME}}, vous pouvez vous [[Special:Userlogin|connecter]] avec votre nom d'utilisateur et son mot de pas comme d’habitude. Pour utiliser OpenID, à l’avenir, vous pouvez [[Special:OpenIDConvert|convertir votre compte en OpenID]] après que vous vous soyez connecté normallement.

Il existe plusieurs [http://wiki.openid.net/Public_OpenID_providers fournisseur d'OpenID publiques], et vous pouvez déjà obtenir un compte OpenID activé sur un autre service.

; Autres wiki : si vous avez avec un wiki avec OpenID activé, tel que [http://wikitravel.org/ Wikitravel], [http://www.wikihow.com/ wikiHow], [http://vinismo.com/ Vinismo], [http://aboutus.org/ AboutUs] ou encore [http://kei.ki/ Keiki], vous pouvez vous connecter sur {{SITENAME}} en entrant '''l’adresse internet complète'' de votre page de cet autre wiki dans la boîte ci-dessus. Par exemple : ''<nowiki>http://kei.ki/en/User:Evan</nowiki>''.
; [http://openid.yahoo.com/ Yahoo!] : Si vous avez un compte avec Yahoo! , vous pouvez vous connecter sur ce site en entrant votre OpenID Yahoo! fournie dans la boîte ci-dessous. Les adresses OpenID doivent avoir la syntaxe ''<nowiki>https://me.yahoo.com/yourusername</nowiki>''.
; [http://dev.aol.com/aol-and-63-million-openids AOL] : si vous avec un compte avec [http://www.aol.com/ AOL], tel qu'un compte [http://www.aim.com/ AIM], vous pouvez vous connecter sur {SITENAME}} en entrant votre OpenID fournie par AOL dans la boîte ci-dessous. Les adresses OpenID doivent avoir le format ''<nowiki>http://openid.aol.com/yourusername</nowiki>''. Votre nom d’utilisateur doit être entièrement en lettres minuscules avec aucun espace.
; [http://bloggerindraft.blogspot.com/2008/01/new-feature-blogger-as-openid-provider.html Blogger], [http://faq.wordpress.com/2007/03/06/what-is-openid/ Wordpress.com], [http://www.livejournal.com/openid/about.bml LiveJournal], [http://bradfitz.vox.com/library/post/openid-for-vox.html Vox] : Si vous avec un blog ou un autre de ces services, entrez l’adresse de votre blog dans la boîte ci-dessous. Par exemple, ''<nowiki>http://yourusername.blogspot.com/</nowiki>'', ''<nowiki>http://yourusername.wordpress.com/</nowiki>'', ''<nowiki>http://yourusername.livejournal.com/</nowiki>'', ou encore ''<nowiki>http://yourusername.vox.com/</nowiki>''.",
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'openidserverlogininstructions' => 'Insira o seu contrasinal embaixo para acceder a $3 como o usuario $2 (páxina de usuario $1).',
	'openidnopolicy'                => 'O sitio non especificou unha política de privacidade.',
	'openidpolicy'                  => 'Comprobe a <a target="_new" href="$1">política de privacidade</a> para máis información.',
	'openidoptional'                => 'Opcional',
	'openidrequired'                => 'Necesario',
	'openidnickname'                => 'Alcume',
	'openidfullname'                => 'Nome completo',
	'openidemail'                   => 'Enderezo de correo electrónico',
	'openidlanguage'                => 'Lingua',
	'openidchooseinstructions'      => 'Todos os usuarios precisan un alcume; pode escoller un de entre as opcións de embaixo.',
	'openidchoosefull'              => 'O seu nome completo ($1)',
	'openidchooseauto'              => 'Un nome autoxerado ($1)',
	'openidchoosemanual'            => 'Un nome da súa escolla:',
	'openidchooseexisting'          => 'Unha conta existente neste wiki:',
	'openidchoosepassword'          => 'contrasinal:',
	'openidalreadyloggedin'         => "'''Está dentro do sistema, $1!'''

Se quere usar OpenID para acceder ao sistema no futuro, pode [[Special:OpenIDConvert|converter a súa conta para usar OpenID]].",
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'openidlogin'                   => 'Přizjewjenje z OpenID',
	'openidfinish'                  => 'Přizjewjenje OpenID skónčić',
	'openidserver'                  => 'Serwer OpenID',
	'openidconvert'                 => 'Konwerter OpenID',
	'openiderror'                   => 'Pruwowanski zmylk',
	'openiderrortext'               => 'Zmylk je při pruwowanju URL OpenID wustupił.',
	'openidconfigerror'             => 'OpenID konfiguraciski zmylk',
	'openidconfigerrortext'         => 'Składowanska konfiguracija OpenID zu tutón wiki je njepłaćiwy. Prošu skonsultuj administratora tutoho sydła.',
	'openidpermissiontext'          => 'OpenID, kotryž sy podał, njesmě so za přizjewjenje pola tutoho serwera wužiwać.',
	'openidusernameprefix'          => 'Wužiwar OpenID',
	'openidserverlogininstructions' => 'Zapodaj deleka swoje hesło, zo by so pola $3 jako wužiwar $2 přizjewił (wužiwarska strona $1).',
	'openidtrustinstructions'       => 'Pruwuj, hač chceš z $1 daty dźělić.',
	'openidallowtrust'              => '$1 dowolić, zo by so tutomu wužiwarskemu konće dowěriło.',
	'openidnopolicy'                => 'Sydło njeje zasady za priwatnosć podało.',
	'openidoptional'                => 'Opcionalny',
	'openidrequired'                => 'Trěbny',
	'openidnickname'                => 'Přimjeno',
	'openidfullname'                => 'Dospołne mjeno',
	'openidemail'                   => 'E-mejlowa adresa',
	'openidlanguage'                => 'Rěč',
	'openidnotavailable'            => 'Twoje preferowane přimjeno ($1) so hižo wot druheho wužiwarja wužiwa.',
	'openidnotprovided'             => 'Twój serwer OpenID njedoda přimjeno (pak dokelž njemóže pak dokelž njejsy je jemu zdźělił).',
	'openidchooseinstructions'      => 'Wšitcy wužiwarjo trjebaja přimjeno; móžěs jedne z opcijow deleka wuzwolić.',
	'openidchoosefull'              => 'Twoje dospołne mjeno ($1)',
	'openidchooseurl'               => 'Mjeno wzate z twojeho OpenID ($1)',
	'openidchooseauto'              => 'Awtomatisce wutworjene mjeno ($1)',
	'openidchoosemanual'            => 'Mjeno twojeje wólby:',
	'openidconvertinstructions'     => 'Tutón formular ći dowola swoje wužiwarske konto zmňić, zo by URL OpenID wužiwał.',
	'openidconvertsuccess'          => 'Wuspěšnje do OpenID konwertowany.',
	'openidconvertsuccesstext'      => 'Sy swój OpenID wuspěšnje do $1 konwertował.',
	'openidconvertyourstext'        => 'To je hižo twój OpenID.',
	'openidconvertothertext'        => 'To je OpenID někoho druheho.',
	'openidalreadyloggedin'         => '<strong>Wužiwar $1, sy hižo přizjewjeny!</strong>',
	'tog-hideopenid'                => 'Twój <a href="http://openid.net/">OpenID</a> na twojej wužiwarskej stronje schować, jeli so z OpenID přizjewješ.',
	'openidlogininstructions'       => 'Zapodaj swój identifikator OpenID, zo by so přizjewił:',
);

/** Hungarian (Magyar)
 * @author Tgr
 */
$messages['hu'] = array(
	'openid-desc'                   => 'Bejelentkezés [http://openid.net/ OpenID] azonosítóval, és más OpenID-kompatibilis weboldalak használata a wikis azonosítóval',
	'openidlogin'                   => 'Bejelentkezés OpenID-vel',
	'openidfinish'                  => 'OpenID bejelentkezés befejezése',
	'openidserver'                  => 'OpenID szerver',
	'openidxrds'                    => 'Yadis fájl',
	'openidconvert'                 => 'OpenID konverter',
	'openiderror'                   => 'Hiba az ellenőrzés során',
	'openiderrortext'               => 'Az OpenID URL elenőrzése nem sikerült.',
	'openidconfigerror'             => 'OpenID konfigurációs hiba',
	'openidconfigerrortext'         => 'A wiki OpenID-tárhely-beállítása hibás. Beszélj a wiki üzemeltetőjével.',
	'openidpermission'              => 'OpenID jogosultság hiba',
	'openidpermissiontext'          => 'Ezzel az OpenID-vel nem vagy jogosult belépni erre a wikire.',
	'openidcancel'                  => 'Ellenőrzés visszavonva',
	'openidcanceltext'              => 'Az OpenID URL ellenőrzése vissza lett vonva.',
	'openidfailure'                 => 'Ellenőrzés sikertelen',
	'openidfailuretext'             => 'Az OpenID URL ellenőrzése nem sikerült. A kapott hibaüzenet: „$1”',
	'openidsuccess'                 => 'Sikeres ellenőrzés',
	'openidsuccesstext'             => 'Az OpenID URL ellenőrzése sikerült.',
	'openidserverlogininstructions' => 'Add meg a jelszót a(z) $3 oldalra való bejelentkezéshez $2 néven (userlap: $1).',
	'openidtrustinstructions'       => 'Adatok megosztása a(z) $1 oldallal.',
	'openidallowtrust'              => '$1 megbízhat ebben a felhasználóban.',
	'openidnopolicy'                => 'Az oldalnak nincsen adatvédelmi szabályzata.',
	'openidpolicy'                  => 'További információkért lásd az <a target="_new" href="$1">adatvédelmi szabályzatot</a>.',
	'openidoptional'                => 'Opcionális',
	'openidrequired'                => 'Kötelező',
	'openidnickname'                => 'Felhasználónév',
	'openidfullname'                => 'Teljes név',
	'openidemail'                   => 'Email-cím',
	'openidlanguage'                => 'Nyelv',
	'openidnotavailable'            => 'Az alapértelmezett felhasználónevedet ($1) már használja valaki.',
	'openidnotprovided'             => 'Az OpenID szervered nem adta meg a felhasználónevedet (vagy azért, mert nem tudja, vagy mert nem engedted neki).',
	'openidchooseinstructions'      => 'Mindenkinek választania kell egy felhasználónevet; választhatsz egyet az alábbi opciókból.',
	'openidchoosefull'              => 'A teljes neved ($1)',
	'openidchooseurl'               => 'Az OpenID-dből vett név ($1)',
	'openidchooseauto'              => 'Egy automatikusan generált név ($1)',
	'openidchoosemanual'            => 'Egy általad megadott név:',
	'openidchooseexisting'          => 'Egy létező felhasználónév erről a wikiről:',
	'openidchoosepassword'          => 'jelszó:',
	'openidconvertinstructions'     => 'Ezzel az űrlappal átállíthatod a felhasználói fiókodat, hogy egy OpenId URL-t használjon.',
	'openidconvertsuccess'          => 'Sikeres átállás OpenID-re',
	'openidconvertsuccesstext'      => 'Sikeresen átállítottad az OpenID-det erre: $1.',
	'openidconvertyourstext'        => 'Ez az OpenID már a tiéd.',
	'openidconvertothertext'        => 'Ez az OpenID másvalakié.',
	'openidalreadyloggedin'         => "'''Már be vagy jelentkezve, $1!'''

Ha ezentúl az OpenID-del akarsz bejelentkezni, [[Special:OpenIDConvert|konvertálhatod a felhasználói fiókodat OpenID-re]].",
	'tog-hideopenid'                => 'Az <a href="http://openid.net/">OpenID</a>-d elrejtése a felhasználói lapodon, amikor OpenID-vel jelentkezel be.',
	'openidnousername'              => 'Nem adtál meg felhasználónevet.',
	'openidbadusername'             => 'Rossz felhasználónevet adtál meg.',
	'openidautosubmit'              => 'Az ezen az oldalon lévő űrlap automatikusan elküldi az adatokat, ha a JavaScript engedélyezve van. Ha nem, használd a \\"Tovább\\" gombot.',
	'openidclientonlytext'          => 'Az itteni felhasználónevedet nem használhatod OpenID-ként más weboldalon.',
	'openidlogininstructions'       => "A(z) {{SITENAME}} támogatja az [http://openid.net/ OpenID]-alapú bejelentkezést.
A OpenID lehetővé teszi, hogy számos különböző weboldalra jelentkezz be úgy, hogy csak egyszer kell megadnod a jelszavadat. (Lásd [http://hu.wikipedia.org/wiki/OpenID a Wikipédia OpenID cikkét] további információkért.)

Ha már regisztráltál korábban, [[Special:Userlogin|bejelentkezhetsz]] a felhasználóneveddel és a jelszavaddal, ahogy eddig is. Ha a továbbiakban OpenID-t akarsz használni, [[Special:OpenIDConvert|állítsd át a felhasználói fiókodat OpenID-re]], miután bejelentkeztél.

Számos [http://wiki.openid.net/Public_OpenID_providers nyilvános OpenID szolgáltató] van, lehetséges, hogy van már OpenID-fiókod egy másik weboldalon.

; Más wikik: ha regisztráltál egy OpenID-kompatibilis wikin, mint a [http://wikitravel.org/ Wikitravel], a [http://www.wikihow.com/ wikiHow], a [http://vinismo.com/ Vinismo], az [http://aboutus.org/ AboutUs] vagy a [http://kei.ki/ Keiki], bejelentkezhetsz ide az ottani felhasználói lapod '''teljes címének''' megadásával. (Például ''<nowiki>http://kei.ki/en/User:Evan</nowiki>''.)
; [http://openid.yahoo.com/ Yahoo!] :  ha van Yahoo! azonosítód, bejelentkezhetsz a Yahoo! OpenID-d megadásával. A Yahoo! OpenID-k ''<nowiki>https://me.yahoo.com/felhasználónév</nowiki>'' alakúak.
; [http://dev.aol.com/aol-and-63-million-openids AOL] : Ha van valamilyen [http://www.aol.com/ AOL] azonosítód, például egy [http://www.aim.com/ AIM] felhasználónév, bejelentkezhetsz az AOL OpenID-del. Az AOL OpenID-k ''<nowiki>http://openid.aol.com/felhasználónév</nowiki>'' alakúak (a felhasználónév csupa kisbetűvel, szóköz nélkül).
; [http://bloggerindraft.blogspot.com/2008/01/new-feature-blogger-as-openid-provider.html Blogger], [http://faq.wordpress.com/2007/03/06/what-is-openid/ Wordpress.com], [http://www.livejournal.com/openid/about.bml LiveJournal], [http://bradfitz.vox.com/library/post/openid-for-vox.html Vox] : ezek a blogszolgáltatók mind biztosítanak OpenID-t, a következő formákban: ''<nowiki>http://felhasználónév.blogspot.com/</nowiki>'', ''<nowiki>http://felhasználónév.wordpress.com/</nowiki>'', ''<nowiki>http://felhasználónév.livejournal.com/</nowiki>'', or ''<nowiki>http://felhasználónév.vox.com/</nowiki>''.",
);

/** Khmer (ភាសាខ្មែរ)
 * @author គីមស៊្រុន
 * @author Lovekhmer
 */
$messages['km'] = array(
	'openiderror'          => 'កំហុស​ក្នុងការផ្ទៀងផ្ទាត់',
	'openidcancel'         => 'ការផ្ទៀងផ្ទាត់​ត្រូវបានលុបចោល',
	'openidfailure'        => 'ការផ្ទៀងផ្ទាត់បរាជ័យ',
	'openidsuccess'        => 'ផ្ទៀងផ្ទាត់ដោយជោគជ័យ',
	'openidoptional'       => 'ជាជំរើស',
	'openidrequired'       => 'ត្រូវការជាចាំបាច់',
	'openidnickname'       => 'ឈ្មោះហៅក្រៅ',
	'openidfullname'       => 'ឈ្មោះពេញ',
	'openidemail'          => 'អាសយដ្ឋានអ៊ីមែល',
	'openidlanguage'       => 'ភាសា',
	'openidnotavailable'   => 'ឈ្មោះហៅក្រៅ​ដែលអ្នកពេញចិត្ត ($1) ត្រូវបានប្រើដោយ​អ្នកប្រើប្រាស់​ម្នាក់​ផ្សេងទៀតហើយ។',
	'openidchoosefull'     => 'ឈ្មោះពេញ​របស់អ្នក ($1)',
	'openidchoosepassword' => 'ពាក្យសំងាត់៖',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'openidxrds'               => 'Yadis Fichier',
	'openiderror'              => 'Feeler bäi der Iwwerpréifung',
	'openidsuccess'            => 'Iwwerpréifung huet geklappt',
	'openidusernameprefix'     => 'OpenIDBenotzer',
	'openidtrustinstructions'  => 'Klickt un wann Dir Donnéeën mat $1 deele wellt.',
	'openidallowtrust'         => 'Erlaabt $1 fir dësem Benotzerkont ze vertrauen.',
	'openidoptional'           => 'Facultatif',
	'openidrequired'           => 'Obligatoresch',
	'openidnickname'           => 'Spëtznumm',
	'openidfullname'           => 'Ganze Numm',
	'openidemail'              => 'E-Mailadress',
	'openidlanguage'           => 'Sprooch',
	'openidnotavailable'       => 'De Spëtznumm deen Dir wollt hun ($1) gëtt scho vun engem anere Benotzer benotzt.',
	'openidchooseinstructions' => 'All Benotzer brauchen e Spëtznumm; Dir kënnt iech ee vun de Méiglechkeeten ënnendrënner auswielen.',
	'openidchoosefull'         => 'Äre ganze Numm ($1)',
	'openidchooseauto'         => 'Een Numm deen automatesch generéiert gouf ($1)',
	'openidchoosemanual'       => 'E Numm vun ärer Wiel:',
	'openidchoosepassword'     => 'Passwuert:',
);

/** Marathi (मराठी)
 * @author Kaustubh
 */
$messages['mr'] = array(
	'openidoptional' => 'वैकल्पिक',
	'openidrequired' => 'आवश्यक',
	'openidnickname' => 'टोपणनाव',
	'openidfullname' => 'पूर्णनाव',
	'openidemail'    => 'इमेल पत्ता',
	'openidlanguage' => 'भाषा',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'openid-desc'                   => 'Aanmelden bij de wiki met een [http://openid.net/ OpenID] en aanmelden bij andere websites die OpenID ondersteunen met een wikigebruiker',
	'openidlogin'                   => 'Aanmelden met OpenID',
	'openidfinish'                  => 'Aanmelden met OpenID afronden',
	'openidserver'                  => 'OpenID-server',
	'openidxrds'                    => 'Yadis-bestand',
	'openidconvert'                 => 'OpenID-convertor',
	'openiderror'                   => 'Verificatiefout',
	'openiderrortext'               => 'Er is een fout opgetreden tijdens de verificatie van de OpenID URL.',
	'openidconfigerror'             => 'Fout in de installatie van OpenID',
	'openidconfigerrortext'         => "De instellingen van de opslag van OpenID's voor deze wiki klopt niet.
Raadpleeg alstublieft de beheerder van de site.",
	'openidpermission'              => 'Fout in de rechten voor OpenID',
	'openidpermissiontext'          => 'Met de OpenID die u hebt opgegeven kunt u niet aanmelden bij deze server.',
	'openidcancel'                  => 'Verificatie geannuleerd',
	'openidcanceltext'              => 'De verificatie van de OpenID URL is geannuleerd.',
	'openidfailure'                 => 'Verificatie mislukt',
	'openidfailuretext'             => 'De verificatie van de OpenID URL is mislukt. Foutmelding: "$1"',
	'openidsuccess'                 => 'Verificatie geslaagd',
	'openidsuccesstext'             => 'De verificatie van de OpenID URL is geslaagd.',
	'openidusernameprefix'          => 'OpenIDGebruiker',
	'openidserverlogininstructions' => 'Voer uw wachtwoord hieronder in om aan te melden bij $3 als gebruiker $2 (gebruikerspagina $1).',
	'openidtrustinstructions'       => 'Controleer of u gegevens wilt delen met $1.',
	'openidallowtrust'              => 'Toestaan dat $1 deze gebruiker vertrouwt.',
	'openidnopolicy'                => 'De site heeft geen privacybeleid.',
	'openidpolicy'                  => 'Lees het <a target="_new" href="$1">privacybeleid</a> voor meer informatie.',
	'openidoptional'                => 'Optioneel',
	'openidrequired'                => 'Verplicht',
	'openidnickname'                => 'Nickname',
	'openidfullname'                => 'Volledige naam',
	'openidemail'                   => 'E-mailadres',
	'openidlanguage'                => 'Taal',
	'openidnotavailable'            => 'Uw voorkeursnaam ($1) wordt al gebruikt door een andere gebruiker.',
	'openidnotprovided'             => 'Uw OpenID-server heeft geen gebruikersnaam opgegeven (omdat het niet wordt ondersteund of omdat u dit zo hebt opgegeven).',
	'openidchooseinstructions'      => 'Alle gebruikers moeten een gebruikersnaam kiezen. U kunt er een kiezen uit de onderstaande opties.',
	'openidchoosefull'              => 'Uw volledige naam ($1)',
	'openidchooseurl'               => 'Een naam uit uw OpenID ($1)',
	'openidchooseauto'              => 'Een automatisch samengestelde naam ($1)',
	'openidchoosemanual'            => 'Een te kiezen naam:',
	'openidchooseexisting'          => 'Een bestaande gebruiker op deze wiki:',
	'openidchoosepassword'          => 'wachtwoord:',
	'openidconvertinstructions'     => 'Met dit formulier kunt u uw gebruiker als OpenID URL gebruiken.',
	'openidconvertsuccess'          => 'Omzetten naar OpenID geslaagd',
	'openidconvertsuccesstext'      => 'U hebt uw OpenID succesvol omgezet naar $1.',
	'openidconvertyourstext'        => 'Dat is al uw OpenID.',
	'openidconvertothertext'        => 'Iemand anders heeft die OpenID al in gebruik.',
	'openidalreadyloggedin'         => "'''U bent al aangemeld, $1!'''

Als u in de toekomst uw OpenID wilt gebruiken om aan te melden, [[Special:OpenIDConvert|zet uw gebruiker dan om naar OpenID]].",
	'tog-hideopenid'                => 'Bij aanmelden met <a href="http://openid.net/">OpenID</a>, uw OpenID op uw gebruikerspagina verbergen.',
	'openidnousername'              => 'Er is geen gebruikersnaam opgegeven.',
	'openidbadusername'             => 'De opgegeven gebruikersnaam is niet toegestaan.',
	'openidautosubmit'              => 'Deze pagina bevat een formulier dat automatisch wordt verzonden als JavaScript is ingeschaked.
Als dat niet werkt, klik dan op de knop "Doorgaan".',
	'openidclientonlytext'          => 'U kunt gebruikers van deze wiki niet als OpenID gebruiken op een andere site.',
	'openidloginlabel'              => 'OpenID URL',
	'openidlogininstructions'       => "{{SITENAME}} ondersteunt de standaard [http://openid.net/ OpenID] voor maar een keer hoeven aanmelden voor meerdere websites.
Met OpenID kunt u aanmelden bij veel verschillende websites zonder voor iedere site opnieuw een wachtwoord te moeten opgeven.
Zie het [http://nl.wikipedia.org/wiki/OpenID Wikipedia-artikel over OpenID] voor meer informatie.

Als u al een gebruiker hebt op {{SITENAME}}, dan kunt u aanmelden met uw gebruikersnaam en wachtwoord zoals u normaal doet. Om in de toekomst OpenID te gebruiken, kunt u uw [[Special:OpenIDConvert|gebruiker naar OpenID omzetten]] nadat u hebt aangemeld.

Er zijn veel [http://wiki.openid.net/Public_OpenID_providers publieke OpenID-providers], en wellicht hebt u al een gebruiker voor OpenID bij een andere dienst.

; Andere wiki's : Als u een gebruiker hebt op een andere wiki die OpenID understeunt, zoals [http://wikitravel.org/ Wikitravel], [http://www.wikihow.com/ wikiHow], [http://vinismo.com/ Vinismo], [http://aboutus.org/ AboutUs] of [http://kei.ki/ Keiki], dan kunt u bij {{SITENAME}} aanmelden door de '''volledige URL''' van uw gebruikerspagina in die andere wiki in het veld hierboven in te geven. Voorbeeld: ''<nowiki>http://kei.ki/en/User:Evan</nowiki>''.
; [http://openid.yahoo.com/ Yahoo!] : Als u een gebruiker hebt bij Yahoo!, dan kunt u bij deze site aanmelden door uw OpenID van Yahoo! in het veld hierboven in te voeren. Een URL van een OpenID van Yahoo! heeft de volgende opmaak: ''<nowiki>https://me.yahoo.com/gebruikersnaam</nowiki>''.
; [http://dev.aol.com/aol-and-63-million-openids AOL] : Als u een gebruiker hebt bij [http://www.aol.com/ AOL], zoals een [http://www.aim.com/ AIM]-gebruiker, dan kunt u bij {{SITENAME}} aanmelden door uw OpenID van AOL in het veld hierboven in te voeren. Een URL van een OpenID van AOL heeft de volgende opmaak: ''<nowiki>http://openid.aol.com/gebruikersnaam</nowiki>''. Uw gebruikersnaam moet in kleine letters ingevoerd worden, zonder spaties.
; [http://bloggerindraft.blogspot.com/2008/01/new-feature-blogger-as-openid-provider.html Blogger], [http://faq.wordpress.com/2007/03/06/what-is-openid/ Wordpress.com], [http://www.livejournal.com/openid/about.bml LiveJournal], [http://bradfitz.vox.com/library/post/openid-for-vox.html Vox] : Als u een blog hebt bij een van de voorgaande diensten, dan kunt u bij deze site aanmelden door als uw OpenID de URL van uw blog in te geven in het veld hierboven. Bijvoorbeeld: ''<nowiki>http://yourusername.blogspot.com/</nowiki>'', ''<nowiki>http://yourusername.wordpress.com/</nowiki>'', ''<nowiki>http://yourusername.livejournal.com/</nowiki>'' of ''<nowiki>http://yourusername.vox.com/</nowiki>''.",
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Jon Harald Søby
 */
$messages['nn'] = array(
	'openidoptional'       => 'Valfri',
	'openidnickname'       => 'Kallenamn',
	'openidlanguage'       => 'Språk',
	'openidchoosepassword' => 'passord:',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'openid-desc'                   => 'Logg inn på wikien med en [http://openid.net/ OpenID] og logg inn på andre sider som bruker OpenID med kontoen herfra',
	'openidlogin'                   => 'Logg inn med OpenID',
	'openidfinish'                  => 'Fullfør OpenID-innlogging',
	'openidserver'                  => 'OpenID-tjener',
	'openidxrds'                    => 'Yadis-fil',
	'openidconvert'                 => 'OpenID-konvertering',
	'openiderror'                   => 'Bekreftelsesfeil',
	'openiderrortext'               => 'En feil oppsto under bekrefting av OpenID-adressen.',
	'openidconfigerror'             => 'Oppsettsfeil med OpenID',
	'openidconfigerrortext'         => 'Lagringsoppsettet for OpenID på denne wikien er ugyldig. Vennligst oppsøk sidens administrator om problemet.',
	'openidpermission'              => 'Tillatelsesfeil med OpenID',
	'openidpermissiontext'          => 'Du kan ikke logge inn på denne tjeneren med OpenID-en du oppga.',
	'openidcancel'                  => 'Bekreftelse avbrutt',
	'openidcanceltext'              => 'Bekreftelsen av OpenID-adressen ble avbrutt.',
	'openidfailure'                 => 'Bekreftelse mislyktes',
	'openidfailuretext'             => 'Bekreftelse av OpenID-adressen mislyktes. Feilbeskjed: «$1»',
	'openidsuccess'                 => 'Bekreftelse lyktes',
	'openidsuccesstext'             => 'Bekreftelse av OpenID-adressen lyktes.',
	'openidusernameprefix'          => 'OpenID-bruker',
	'openidserverlogininstructions' => 'Skriv inn passordet ditt nedenfor for å logge på $3 som $2 (brukerside $1).',
	'openidtrustinstructions'       => 'Sjekk om du ønsker å dele data med $1.',
	'openidallowtrust'              => 'La $1 stole på denne kontoen.',
	'openidnopolicy'                => 'Siden har ingen personvernerklæring.',
	'openidpolicy'                  => 'Sjekk <a href="_new" href="$1">personvernerklæringen</a> for mer informasjon.',
	'openidoptional'                => 'Valgfri',
	'openidrequired'                => 'Påkrevd',
	'openidnickname'                => 'Kallenavn',
	'openidfullname'                => 'Fullt navn',
	'openidemail'                   => 'E-postadresse',
	'openidlanguage'                => 'Språk',
	'openidnotavailable'            => 'Foretrukket kallenavn ($1) brukes allerede av en annen bruker.',
	'openidnotprovided'             => 'OpenID-tjeneren din oppga ikke et kallenavn (enten fordi den ikke kunne det, eller fordi du har sagt at den ikke skal gjøre det).',
	'openidchooseinstructions'      => 'Alle brukere må ha et kallenavn; du kan velge blant valgene nedenfor.',
	'openidchoosefull'              => 'Fullt navn ($1)',
	'openidchooseurl'               => 'Et navn tatt fra din OpenID ($1)',
	'openidchooseauto'              => 'Et automatisk opprettet navn ($1)',
	'openidchoosemanual'            => 'Et valgfritt navn:',
	'openidchooseexisting'          => 'En eksisterende konto på denne wikien:',
	'openidchoosepassword'          => 'passord:',
	'openidconvertinstructions'     => 'Dette skjemaet lar deg endre brukerkontoen din til å bruke en OpenID-adresse.',
	'openidconvertsuccess'          => 'Konverterte til OpenID',
	'openidconvertsuccesstext'      => 'Du har konvertert din OpenID til $1.',
	'openidconvertyourstext'        => 'Det er allerede din OpenID.',
	'openidconvertothertext'        => 'Den OpenID-en tilhører noen andre.',
	'openidalreadyloggedin'         => "'''$1, du er allerede logget inn.'''

Om du ønsker å bruke OpenID i framtiden, kan du [[Special:OpenIDConvert|konvertere kontoen din til å bruke OpenID]].",
	'tog-hideopenid'                => 'Skjul <a href="http://openid.net/">OpenID</a> på brukersiden din om du logger inn med en.',
	'openidnousername'              => 'Intet brukernavn oppgitt.',
	'openidbadusername'             => 'Ugyldig brukernavn oppgitt.',
	'openidautosubmit'              => 'Denne siden inneholder et skjema som vil leveres automatisk om du har JavaScript slått på. Om ikke, trykk på «Fortsett».',
	'openidclientonlytext'          => 'Du kan ikke bruke kontoer fra denne wikien som OpenID på en annen side.',
	'openidloginlabel'              => 'OpenID-adresse',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'openid-desc'                   => "Se connecta al wiki amb [http://openid.net/ OpenID] e se connecta a d'autres sits internet OpenID amb un wiki utilizant un compte d'utilizaire.",
	'openidlogin'                   => 'Se connectar amb OpenID',
	'openidfinish'                  => 'Acabar la conneccion OpenID',
	'openidserver'                  => 'Serveire OpenID',
	'openidxrds'                    => 'Fichièr Yadis',
	'openidconvert'                 => 'Convertisseire OpenID',
	'openiderror'                   => 'Error de verificacion',
	'openiderrortext'               => "Una error es intervenguda pendent la verificacion de l'adreça OpenID.",
	'openidconfigerror'             => 'Error de configuracion de OpenID',
	'openidconfigerrortext'         => "L'estocatge de la configuracion OpenID per aqueste wiki es incorrècte.
Metetz-vos en rapòrt amb l’administrator d'aqueste sit.",
	'openidpermission'              => 'Error de permission OpenID',
	'openidpermissiontext'          => "L’OpenID qu'avètz porvesida es pas autorizada a se connectar sus aqueste serveire.",
	'openidcancel'                  => 'Verificacion anullada',
	'openidcanceltext'              => 'La verificacion de l’adreça OpenID es estada anullada.',
	'openidfailure'                 => 'Fracàs de la verificacion',
	'openidfailuretext'             => 'La verificacion de l’adreça OpenID a fracassat. Messatge d’error : « $1 »',
	'openidsuccess'                 => 'Verificacion capitada',
	'openidsuccesstext'             => 'Verificacion de l’adreça OpenID capitada.',
	'openidusernameprefix'          => 'Utilizaire OpenID',
	'openidserverlogininstructions' => "Picatz vòstre senhal çaijós per vos connectar sus $3 coma utilizaire '''$2''' (pagina d'utilizaire $1).",
	'openidtrustinstructions'       => 'Marcatz se desiratz pertejar las donadas amb $1.',
	'openidallowtrust'              => "Autoriza $1 a far fisança a aqueste compte d'utilizaire.",
	'openidnopolicy'                => 'Lo sit a pas indicat una politica de las donadas personnalas.',
	'openidpolicy'                  => 'Verificar la <a target="_new" href="$1">Politica de las donadas personalas</a> per mai d’entresenhas.',
	'openidoptional'                => 'Facultatiu',
	'openidrequired'                => 'Exigit',
	'openidnickname'                => 'Escais',
	'openidfullname'                => 'Nom complet',
	'openidemail'                   => 'Adreça de corrièr electronic',
	'openidlanguage'                => 'Lenga',
	'openidnotavailable'            => 'Vòstre escais preferit ($1) ja es utilizat per un autre utilizaire.',
	'openidnotprovided'             => "Vòstre serveire OpenID a pas pogut provesir un escais (siá o pòt pas, siá li avètz demandat d'o far pas mai).",
	'openidchooseinstructions'      => "Totes los utilizaires an besonh d'un escais ; ne podètz causir un a partir de la causida çaijós.",
	'openidchoosefull'              => 'Vòstre nom complet ($1)',
	'openidchooseurl'               => 'Un nom es estat causit dempuèi vòstra OpenID ($1)',
	'openidchooseauto'              => 'Un nom creat automaticament ($1)',
	'openidchoosemanual'            => "Un nom qu'avètz causit :",
	'openidchooseexisting'          => 'Un compte existent sus aqueste wiki :',
	'openidchoosepassword'          => 'Senhal :',
	'openidconvertinstructions'     => "Aqueste formulari vos daissa cambiar vòstre compte d'utilizaire per utilizar una adreça OpenID.",
	'openidconvertsuccess'          => 'Convertit amb succès vèrs OpenID',
	'openidconvertsuccesstext'      => 'Avètz convertit amb succès vòstra OpenID vèrs $1.',
	'openidconvertyourstext'        => 'Ja es vòstra OpenID.',
	'openidconvertothertext'        => "Aquò es quicòm d'autre qu'una OpenID.",
	'openidalreadyloggedin'         => "'''Ja sètz connectat, $1 !'''

Se desiratz utilizar vòstra OpenID per vos connectar ulteriorament, podètz [[Special:OpenIDConvert|convertir vòstre compte per utilizar OpenID]].",
	'tog-hideopenid'                => 'Amaga vòstra <a href="http://openid.net/">OpenID</a> sus vòstra pagina d\'utilizaire, se vos connectaz amb OpenID.',
	'openidnousername'              => 'Cap de nom d’utilizaire es pas estat indicat.',
	'openidbadusername'             => 'Un nom d’utilizaire marrit es estat indicat.',
	'openidautosubmit'              => 'Aquesta pagina compren un formulari que poiriá èsser mandat automaticament se avètz activat JavaScript.
S’èra pas lo cas, ensajatz lo boton « Contunhar ».',
	'openidclientonlytext'          => 'Podètz pas utilizar de comptes dempuèi aqueste wiki en tant qu’OpenID sus d’autres sits.',
	'openidloginlabel'              => 'Adreça OpenID',
	'openidlogininstructions'       => "{{SITENAME}} supòrta lo format [http://openid.net/ OpenID] per una sola signatura entre de sits Internet.
OpenID vos permet de vos connectar sus maites sits diferents sens aver d'utilizar un senhal diferent per chadun d’entre eles.

Se ja avètz un compte sus {{SITENAME}}, vos podètz [[Special:Userlogin|connectar]] amb vòstre nom d'utilizaire e son senhal coma de costuma. Per utilizar OpenID, a l’avenidor, podètz [[Special:OpenIDConvert|convertir vòstre compte en OpenID]] aprèp vos èsser connectat normalament.

Existís maites [http://wiki.openid.net/Public_OpenID_providers provesidors d'OpenID publicas], e ja podètz obténer un compte OpenID activat sus un autre servici.

; Autres wiki : s'avètz un wiki amb OpenID activat, tal coma [http://wikitravel.org/ Wikitravel], [http://www.wikihow.com/ wikiHow], [http://vinismo.com/ Vinismo], [http://aboutus.org/ AboutUs] o encara [http://kei.ki/ Keiki], podètz vos connectar sus {{SITENAME}} en picant '''l’adreça internet complèta'' de vòstra pagina d'aqueste autre wiki dins la boita çaisús. Per exemple : ''<nowiki>http://kei.ki/en/User:Evan</nowiki>''.
; [http://openid.yahoo.com/ Yahoo!] : Se avètz un compte amb Yahoo! , vos podètz connectar sus aqueste sit en picant vòstra OpenID Yahoo! provesida dins la boita çaijós. Las adreças OpenID devon aver la sintaxi ''<nowiki>https://me.yahoo.com/yourusername</nowiki>''.
; [http://dev.aol.com/aol-and-63-million-openids AOL] : se avètz un compte amb [http://www.aol.com/ AOL], coma un compte [http://www.aim.com/ AIM], vos podètz connectar sus {SITENAME}} en picant vòstra OpenID provesida per AOL dins la boita çaijós. Las adreças OpenID devon aver lo format ''<nowiki>http://openid.aol.com/yourusername</nowiki>''. Vòstre nom d’utilizaire deu èsser entièrament en letras minusculas amb cap d'espaci.
; [http://bloggerindraft.blogspot.com/2008/01/new-feature-blogger-as-openid-provider.html Blogger], [http://faq.wordpress.com/2007/03/06/what-is-openid/ Wordpress.com], [http://www.livejournal.com/openid/about.bml LiveJournal], [http://bradfitz.vox.com/library/post/openid-for-vox.html Vox] : Se avètz un blog o un autre d'aquestes servicis, picatz l’adreça de vòstre blog dins la boita çaijós. Per exemple, ''<nowiki>http://yourusername.blogspot.com/</nowiki>'', ''<nowiki>http://yourusername.wordpress.com/</nowiki>'', ''<nowiki>http://yourusername.livejournal.com/</nowiki>'', o encara ''<nowiki>http://yourusername.vox.com/</nowiki>''.",
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'openidemail'          => 'برېښليک پته',
	'openidlanguage'       => 'ژبه',
	'openidchoosefull'     => 'ستاسو بشپړ نوم ($1)',
	'openidchoosemanual'   => 'ستاسو د خوښې يو نوم:',
	'openidchoosepassword' => 'پټنوم:',
);

/** Portuguese (Português)
 * @author Malafaya
 */
$messages['pt'] = array(
	'openidxrds'                    => 'Ficheiro Yadis',
	'openidserverlogininstructions' => 'Introduza a sua palavra-chave abaixo para se autenticar em $3 como utilizador $2 (página de utilizador $1).',
	'openidoptional'                => 'Opcional',
	'openidrequired'                => 'Requerido',
	'openidfullname'                => 'Nome completo',
	'openidlanguage'                => 'Língua',
	'openidchoosepassword'          => 'palavra-chave:',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'openid-desc'                   => 'Prihlásenie sa na wiki pomocou [http://openid.net/ OpenID] a prihlásenie na iné stránky podporujúce OpenID pomocou používateľského účtu wiki',
	'openidlogin'                   => 'Prihlásiť sa pomocou OpenID',
	'openidfinish'                  => 'Dokončiť prihlásenie pomocou OpenID',
	'openidserver'                  => 'OpenID server',
	'openidxrds'                    => 'Súbor Yadis',
	'openidconvert'                 => 'OpenID konvertor',
	'openiderror'                   => 'Chyba pri overovaní',
	'openiderrortext'               => 'Počas overovania OpenID URL sa vyskytla chyba.',
	'openidconfigerror'             => 'Chyba konfigurácie OpenID',
	'openidconfigerrortext'         => 'Konfigurácia OpenID tejto wiki je neplatná.
Prosím, poraďte sa so správcom tejto webovej lokality.',
	'openidpermission'              => 'Chyba oprávnení OpenID',
	'openidpermissiontext'          => 'OpenID, ktorý ste poskytli, nemá oprávnenie prihlásiť sa k tomuto serveru',
	'openidcancel'                  => 'Overovanie bolo zrušené',
	'openidcanceltext'              => 'Overovanie OpenID URL bolo zrušené.',
	'openidfailure'                 => 'Overovanie bolo zrušené',
	'openidfailuretext'             => 'Overovanie OpenID URL zlyhalo. Chybová správa: „$1“',
	'openidsuccess'                 => 'Overenie bolo úspešné',
	'openidsuccesstext'             => 'Overenie OpenID URL bolo úspešné.',
	'openidusernameprefix'          => 'PoužívateľOpenID',
	'openidserverlogininstructions' => 'Dolu zadajte heslo pre prihlásenie na $3 ako používateľ $2 (používateľská stránka $1).',
	'openidtrustinstructions'       => 'Skontrolujte, či chcete zdieľať dáta s používateľom $1.',
	'openidallowtrust'              => 'Povoliť $1 dôverovať tomuto používateľskému účtu.',
	'openidnopolicy'                => 'Lokalita nešpecifikovala politiku ochrany osobných údajov.',
	'openidpolicy'                  => 'Viac informácií na stránke <a target="_new" href="$1">Ochrana osobných údajov</a>',
	'openidoptional'                => 'Voliteľné',
	'openidrequired'                => 'Požadované',
	'openidnickname'                => 'Prezývka',
	'openidfullname'                => 'Plné meno',
	'openidemail'                   => 'Emailová adresa',
	'openidlanguage'                => 'Jazyk',
	'openidnotavailable'            => 'Vašu preferovanú prezývku ($1) už používa iný používateľ.',
	'openidnotprovided'             => 'Váš OpenID server neposkytol prezývku (buď preto, že nemôže alebo preto, že ste mu povedali aby ju neposkytoval).',
	'openidchooseinstructions'      => 'Každý používateľ musí mať prezývku; môžete si vybrať z dolu uvedených možností.',
	'openidchoosefull'              => 'Vaše plné meno ($1)',
	'openidchooseurl'               => 'Meno na základe vášho OpenID ($1)',
	'openidchooseauto'              => 'Automaticky vytvorené meno ($1)',
	'openidchoosemanual'            => 'Meno, ktoré si vyberiete:',
	'openidchooseexisting'          => 'Existujúci účet na tejto wiki:',
	'openidchoosepassword'          => 'heslo:',
	'openidconvertinstructions'     => 'Tento formulár vám umožňuje zmeniť váš učet, aby používal OpenID URL.',
	'openidconvertsuccess'          => 'Úspešne prevedené na OpenID',
	'openidconvertsuccesstext'      => 'Úspešne ste previedli váš OpenID na $1.',
	'openidconvertyourstext'        => 'To už je váš OpenID.',
	'openidconvertothertext'        => 'To je OpenID niekoho iného.',
	'openidalreadyloggedin'         => "'''Už ste prihlásený, $1!'''

Ak chcete na prihlasovanie v budúcnosti využívať OpenID, môžete [[Special:OpenIDConvert|previesť váš účet na OpenID]].",
	'tog-hideopenid'                => 'Nezobrazovať váš <a href="http://openid.net/">OpenID</a> na vašej používateľskej stránke ak sa prihlasujete pomocou OpenID.',
	'openidnousername'              => 'Nebolo zadané používateľské meno.',
	'openidbadusername'             => 'Bolo zadané chybné používateľské meno.',
	'openidautosubmit'              => 'Táto stránka obsahuje formulár, ktorý by mal byť automaticky odoslaný ak máte zapnutý JavaScript.
Ak nie, skúste tlačidlo „Pokračovať“.',
	'openidclientonlytext'          => 'Nemôžete používať účty z tejto wiki ako OpenID na iných weboch.',
	'openidloginlabel'              => 'OpenID URL',
	'openidlogininstructions'       => "{{SITENAME}} podporuje štandard [http://openid.net/ OpenID] na zjednotené prihlasovanie na webstránky.
OpenID vám umožňuje prihlasovať sa na množstvo rozličných webstránok bez nutnosti používať pre každú odlišné heslo. (Pozri [http://sk.wikipedia.org/wiki/OpenID Článok o OpenID na Wikipédii])

Ak už máte účet na {{GRAMMAR:lokál|{{SITENAME}}}}, môžete sa [[Special:Userlogin|prihlásiť]] pomocou používateľského mena a hesla ako zvyčajne. Ak chcete v budúcnosti používať OpenID, môžete po normálnom prihlásení [[Special:OpenIDConvert|previesť svoj účet na OpenID]].

Existuje množstvo [http://wiki.openid.net/Public_OpenID_providers Verejných poskytovateľov OpenID] a možno už máte účet s podporou OpenID u iného poskytovateľa.

; Iné wiki: Ak máte účet na wiki stránke s podporou OpenID ako napr. [http://wikitravel.org/ Wikitravel], [http://www.wikihow.com/ wikiHow], [http://vinismo.com/ Vinismo], [http://aboutus.org/ AboutUs] alebo [http://kei.ki/ Keiki], môžete sa prihlásiť na {{GRAMMAR:akuzatív|{{SITENAME}}}} zadaním '''plného URL''' svojej používateľskej stránky na danej wiki do poľa vyššie. Napríklad ''<nowiki>http://kei.ki/en/User:Evan</nowiki>''.
; [http://openid.yahoo.com/ Yahoo!]: Ak máte účet Yahoo!, môžete sa na túto stránku prihlásiť zadaním vášho OpenID, ktoré poskytuje Yahoo!, do poľa vyššie. Yahoo! OpenID URL bývajú v tvare  ''<nowiki>https://me.yahoo.com/pouzivatelskemeno</nowiki>''.
; [http://dev.aol.com/aol-and-63-million-openids AOL]: Ak máte účet [http://www.aol.com/ AOL] ako napríklad účet [http://www.aim.com/ AIM], môžete sa prihlásiť na {{GRAMMAR:akuzatív|{{SITENAME}}}} zadaním vášho OpenID, ktoré poskytuje AOL, do poľa vyššie. AOL OpenID URL bývajú v tvare ''<nowiki>http://openid.aol.com/pouzivatelskemeno</nowiki>''. Vaše používateľské meno by malo mať len malé písmená a žiadne medzery.
; [http://bloggerindraft.blogspot.com/2008/01/new-feature-blogger-as-openid-provider.html Blogger], [http://faq.wordpress.com/2007/03/06/what-is-openid/ Wordpress.com], [http://www.livejournal.com/openid/about.bml LiveJournal], [http://bradfitz.vox.com/library/post/openid-for-vox.html Vox]: Ak máte blog na niektorej z týchto služieb, zadajte do poľa vyššie URL svojho blogu. Napríklad ''<nowiki>http://pouzivatelskemeno.blogspot.com/</nowiki>'', ''<nowiki>http://pouzivatelskemeno.wordpress.com/</nowiki>'', ''<nowiki>http://pouzivatelskemeno.livejournal.com/</nowiki>'' alebo ''<nowiki>http://pouzivatelskemeno.vox.com/</nowiki>''.",
);

/** Swedish (Svenska)
 * @author Lokal Profil
 * @author Jon Harald Søby
 */
$messages['sv'] = array(
	'openidlogin'          => 'Logga in med OpenID',
	'openidxrds'           => 'Yadis-fil',
	'openidoptional'       => 'Valfri',
	'openidnickname'       => 'Smeknamn',
	'openidemail'          => 'E-postadress',
	'openidlanguage'       => 'Språk',
	'openidchoosepassword' => 'lösenord:',
	'openidnousername'     => 'Inget användarnamn angivet.',
	'openidbadusername'    => 'Ogiltigt användarnamn angivet.',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'openidoptional' => 'ఐచ్చికం',
	'openidrequired' => 'తప్పనిసరి',
	'openidfullname' => 'పూర్తిపేరు',
	'openidemail'    => 'ఈ-మెయిల్ చిరునామా',
	'openidlanguage' => 'భాష',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$messages['tet'] = array(
	'openidemail' => 'Diresaun korreiu eletróniku',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'openid-desc'                   => 'Đăng nhập vào wiki dùng [http://openid.net/ OpenID] và đăng nhập vào các website nhận OpenID dùng tài khoản wiki',
	'openidlogin'                   => 'Đăng nhập dùng OpenID',
	'openidfinish'                  => 'Đăng nhập dùng OpenID xong',
	'openidserver'                  => 'Dịch vụ OpenID',
	'openidxrds'                    => 'Tập tin Yadis',
	'openiderror'                   => 'Lỗi thẩm tra',
	'openiderrortext'               => 'Có lỗi khi thẩm tra địa chỉ OpenID.',
	'openidconfigerror'             => 'Lỗi thiết lập OpenID',
	'openidconfigerrortext'         => 'Phần giữ thông tin OpenID cho wiki này không hợp lệ. Xin hãy liên lạc với người quản lý website này.',
	'openidpermission'              => 'Lỗi quyền OpenID',
	'openidpermissiontext'          => 'Địa chỉ OpenID của bạn không được phép đăng nhập vào dịch vụ này.',
	'openidcancel'                  => 'Đã hủy bỏ thẩm tra',
	'openidcanceltext'              => 'Đã hủy bỏ việc thẩm tra địa chỉ OpenID.',
	'openidfailure'                 => 'Không thẩm tra được',
	'openidfailuretext'             => 'Không thể thẩm tra địa chỉ OpenID. Lỗi: “$1”',
	'openidsuccess'                 => 'Đã thẩm tra thành công',
	'openidsuccesstext'             => 'Đã thẩm tra địa chỉ OpenID thành công.',
	'openidserverlogininstructions' => 'Hãy cho vào mật khẩu ở dưới để đăng nhập vào $3 dùng tài khoản $2 (trang thảo luận $1).',
	'openidtrustinstructions'       => 'Hãy kiểm tra hộp này nếu bạn muốn cho $1 biết thông tin cá nhân của bạn.',
	'openidallowtrust'              => 'Để $1 tin cậy vào tài khoản này.',
	'openidnopolicy'                => 'Website chưa xuất bản chính sách về sự riêng tư.',
	'openidpolicy'                  => 'Hãy đọc <a target="_new" href="$1">chính sách về sự riêng tư</a> để biết thêm chi tiết.',
	'openidoptional'                => 'Tùy ý',
	'openidrequired'                => 'Bắt buộc',
	'openidnickname'                => 'Tên hiệu',
	'openidfullname'                => 'Tên đầy đủ',
	'openidemail'                   => 'Địa chỉ thư điện tử',
	'openidlanguage'                => 'Ngôn ngữ',
	'openidnotavailable'            => 'Tên hiệu mà bạn muốn sử dụng, “$1”, đã được sử dụng bởi người khác.',
	'openidnotprovided'             => 'Dịch vụ OpenID của bạn chưa cung cấp tên hiệu, hoặc vì nó không có khả năng này, hoặc bạn đã tắt tính năng tên hiệu.',
	'openidchooseinstructions'      => 'Mọi người dùng cần có tên hiệu; bạn có thể chọn tên hiệu ở dưới.',
	'openidchoosefull'              => 'Tên đầy đủ của bạn ($1)',
	'openidchooseurl'               => 'Tên bắt nguồn từ OpenID của bạn ($1)',
	'openidchooseauto'              => 'Tên tự động ($1)',
	'openidchoosemanual'            => 'Tên khác:',
	'openidloginlabel'              => 'Địa chỉ OpenID',
);

