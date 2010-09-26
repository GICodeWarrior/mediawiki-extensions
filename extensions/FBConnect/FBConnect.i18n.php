<?php
/*
 * Copyright © 2008-2010 Garrett Brown <http://www.mediawiki.org/wiki/User:Gbruin>
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License along
 * with this program. If not, see <http://www.gnu.org/licenses/>.
 */


/**
 * FBConnect.i18n.php
 * 
 * Internationalization file for FBConnect.
 */


$messages = array();

/** English */
$messages['en'] = array(
// Extension name
	'fbconnect'               => 'Facebook Connect',
	'fbconnect-desc'          => 'Enables users to [[Special:Connect|Connect]] with their [http://www.facebook.com Facebook] accounts.
Offers authentification based on Facebook groups and the use of FBML in wiki text',
// Group containing Facebook Connect users
	'group-fb-user'           => 'Facebook Connect users',
	'group-fb-user-member'    => 'Facebook Connect user',
	'grouppage-fb-user'       => '{{ns:project}}:Facebook Connect users',
	// Group for Facebook Connect users beloning to the group specified by $wgFbUserRightsFromGroup
	'group-fb-groupie'        => 'Group members',
	'group-fb-groupie-member' => 'Group member',
	'grouppage-fb-groupie'    => '{{ns:project}}:Group members',
	// Officers of the Facebook group
	'group-fb-officer'        => 'Group officers',
	'group-fb-officer-member' => 'Group officer',
	'grouppage-fb-officer'    => '{{ns:project}}:Group officers',
	// Admins of the Facebook group
	'group-fb-admin'          => 'Group admins',
	'group-fb-admin-member'   => 'Group administrator',
	'grouppage-fb-admin'      => '{{ns:project}}:Group admins',
	// Personal toolbar
	'fbconnect-connect'  => 'Log in with Facebook Connect',
	'fbconnect-convert'  => 'Connect this account with Facebook',
	'fbconnect-logout'   => 'Logout of Facebook',
	'fbconnect-link'     => 'Back to facebook.com',
	
	// Special:Connect
	'fbconnect-title'    => 'Connect account with Facebook',
	'fbconnect-intro'    => 'This wiki is enabled with Facebook Connect, the next evolution of Facebook platform.
This means that when you are connected, in addition to the normal [[Wikipedia:Help:Logging in#Why log in?|benefits]] you see when logging in, you will be able to take advantage of some extra features...',
	'fbconnect-click-to-login' => 'Click to login to this site via Facebook',
	'fbconnect-click-to-connect-existing' => 'Click to connect your Facebook account to $1',
	'fbconnect-conv'     => 'Convenience',
	'fbconnect-convdesc' => 'Connected users are automatically logged you in.
If permission is given, then this wiki can even use Facebook as an e-mail proxy so you can continue to receive important notifications without revealing your e-mail address.',
	'fbconnect-fbml'     => 'Facebook markup language',
	'fbconnect-fbmldesc' => 'Facebook has provided a bunch of built-in tags that will render dynamic data.
Many of these tags can be included in wiki text, and will be rendered differently depending on which connected user they are being viewed by.',
	'fbconnect-comm'     => 'Communication',
	'fbconnect-commdesc' => 'Facebook cnnect ushers in a whole new level of networking.
See which of your friends are using the wiki, and optionally share your actions with your friends through the Facebook news feed.',
	'fbconnect-welcome'  => 'Welcome, Facebook Connect user!',
	'fbconnect-loginbox' => "Or '''login''' with Facebook:
	
$1",
	'fbconnect-merge'    => 'Merge your wiki account with your Facebook ID',
/*
	'fbconnect-mergebox' => 'This feature has not yet been implemented.
Accounts can be [[Special:Renameuser|merged manually]] if the [http://mediawiki.org/wiki/Extension:Renameuser|Rename user extension] has been installed.

$1

Note: This can be undone by a sysop.',
*/
	'fbconnect-logoutbox'=> '$1
	
This will also log you out of Facebook and all connected sites, including this wiki.',
	'fbconnect-listusers-header' => '$1 and $2 privileges are automatically transfered from the officer and admin titles of the Facebook group $3.

For more info, please contact the group creator $4.',
	// Prefix to use for automatically-generated usernames
	'fbconnect-usernameprefix' => 'FacebookUser',
	// Special:Connect
	'fbconnect-error' => 'Verification error',
	'fbconnect-errortext' => 'An error occured during verification with Facebook Connect.',
	'fbconnect-cancel' => 'Action cancelled',
	'fbconnect-canceltext' => 'The previous action was cancelled by the user.',
	'fbconnect-invalid' => 'Invalid option',
	'fbconnect-invalidtext' => 'The selection made on the previous page was invalid.',
	'fbconnect-success' => 'Facebook verification succeeded',
	'fbconnect-successtext' => 'You have been successfully logged in with Facebook Connect.',
	#'fbconnect-optional' => 'Optional',
	#'fbconnect-required' => 'Required',
	'fbconnect-nickname' => 'Nickname',
	'fbconnect-fullname' => 'Fullname',
	'fbconnect-email' => 'E-mail address',
	'fbconnect-language' => 'Language',
	'fbconnect-timecorrection' => 'Time zone correction (hours)',
	'fbconnect-chooselegend' => 'Username choice',
	'fbconnect-chooseinstructions' => 'All users need a nickname; you can choose one from the options below.',
	'fbconnect-invalidname' => 'The nickname you chose is already taken or not a valid nickname.
Please chose a different one.',
	'fbconnect-choosenick' => 'Your Facebook profile name ($1)',
	'fbconnect-choosefirst' => 'Your first name ($1)',
	'fbconnect-choosefull' => 'Your full name ($1)',
	'fbconnect-chooseauto' => 'An auto-generated name ($1)',
	'fbconnect-choosemanual' => 'A name of your choice:',
	'fbconnect-chooseexisting' => 'An existing account on this wiki',
	'fbconnect-chooseusername' => 'Username:',
	'fbconnect-choosepassword' => 'Password:',
	'fbconnect-updateuserinfo' => 'Update the following personal information:',
	'fbconnect-alreadyloggedin' => "'''You are already logged in, $1!'''
	
If you want to use Facebook Connect to log in in the future, you can [[Special:Connect/Convert|convert your account to use Facebook Connect]].",
	/*
	'fbconnect-convertinstructions' => 'This form lets you change your user account to use an OpenID URL or add more OpenID URLs',
	'fbconnect-convertoraddmoreids' => 'Convert to OpenID or add another OpenID URL',
	'fbconnect-convertsuccess' => 'Successfully converted to OpenID',
	'fbconnect-convertsuccesstext' => 'You have successfully converted your OpenID to $1.',
	'fbconnect-convertyourstext' => 'That is already your OpenID.',
	'fbconnect-convertothertext' => 'That is someone else\'s OpenID.',
	*/
	
	'fbconnect-error-creating-user' => 'Error creating the user in the local database.',
	'fbconnect-error-user-creation-hook-aborted' => 'A hook (extension) aborted the account creation with the message: $1',

	'fbconnect-prefstext' => 'Facebook Connect',
	'fbconnect-link-to-profile' => 'Facebook profile',
	'fbconnect-prefsheader' => "To control which events will push an item to your Facebook news feed, <a id='fbConnectPushEventBar_show' href='#'>show preferences</a> <a id='fbConnectPushEventBar_hide' href='#' style='display:none'>hide preferences</a>",
	'fbconnect-prefs-can-be-updated' => 'You can update these any time by visiting the "$1" tab of your preferences page.',
);

/** Message documentation (Message documentation)
 * @author Garrett Brown
 */
$messages['qqq'] = array(
	'fbconnect-desc' => 'Short description of the FBConnect extension, shown in [[Special:Version]]. Do not translate or change links.',
	'fbconnect-email' => '{{Identical|E-mail address}}',
	'fbconnect-language' => '{{Identical|Language}}',
	'fbconnect-choosepassword' => '{{Identical|Password}}',
	'fbconnect-alreadyloggedin' => '$1 is a user name.',
	'fbconnect-prefstext' => 'FBConnect preferences tab text above the list of preferences',
	'fbconnect-link-to-profile' => 'Appears next to the user\\s name in their Preferences page and this text is made into link to the profile of that user if they are connected.',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'fbconnect-link' => 'Terug na facebook.com',
	'fbconnect-comm' => 'Kommunikasie',
	'fbconnect-error' => 'Verifikasiefout',
	'fbconnect-invalid' => 'Ongeldige opsie',
	'fbconnect-nickname' => 'Bynaam',
	'fbconnect-fullname' => 'Volle naam',
	'fbconnect-email' => 'E-posadres',
	'fbconnect-language' => 'Taal',
	'fbconnect-choosefirst' => 'U eerste naam ($1)',
	'fbconnect-choosefull' => 'U volledige naam ($1)',
	'fbconnect-chooseauto' => "'n Outomaties gegenereerde naam ($1)",
	'fbconnect-choosemanual' => "'n Naam van u keuse:",
	'fbconnect-chooseexisting' => "'n Bestaande gebruiker op hierdie wiki:",
	'fbconnect-chooseusername' => 'Gebruikersnaam:',
	'fbconnect-choosepassword' => 'Wagwoord:',
	'fbconnect-link-to-profile' => 'Facebook-profiel',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 */
$messages['be-tarask'] = array(
	'fbconnect' => 'Злучэньне Facebook',
	'fbconnect-desc' => 'Дае магчымасьць удзельнікам [[Special:Connect|злучыцца]] з іх рахункам на [http://www.facebook.com Facebook].
Прапануе аўтэнтыфікацыю заснаваную на групах Facebook і выкарыстаньні FBML у вікі-тэксьце',
	'group-fb-user' => 'Карыстальнікі злучэньня Facebook',
	'group-fb-user-member' => 'Карыстальнік злучэньня Facebook',
	'grouppage-fb-user' => '{{ns:project}}:Карыстальнікі злучэньня Facebook',
	'group-fb-groupie' => 'Удзельнікі групы',
	'group-fb-groupie-member' => 'Удзельнік групы',
	'grouppage-fb-groupie' => '{{ns:project}}:Удзельнікі групы',
	'group-fb-officer' => 'Кіраўнікі групы',
	'group-fb-officer-member' => 'Кіраўнік групы',
	'grouppage-fb-officer' => '{{ns:project}}:Кіраўнікі групы',
	'group-fb-admin' => 'Адміністратары групы',
	'group-fb-admin-member' => 'Адміністратар групы',
	'grouppage-fb-admin' => '{{ns:project}}:Адміністратары групы',
	'fbconnect-connect' => 'Увайсьці ў сыстэму праз злучэньне Facebook',
	'fbconnect-convert' => 'Злучыць гэты рахунак і Facebook',
	'fbconnect-logout' => 'Выйсьці з Facebook',
	'fbconnect-link' => 'Вярнуцца на facebook.com',
	'fbconnect-title' => 'Злучыць рахунак з Facebook',
	'fbconnect-intro' => 'У {{GRAMMAR:месны|{{SITENAME}}}} дазволенае злучэньне Facebook, што зьяўляецца наступным крокам эвалюцыі плятформы Facebook.
Гэта азначае, што калі Вы далучаныя, у дадатак да звычайных [[Wikipedia:Help:Logging in#Why log in?|магчымасьцяў]], якія Вы бачыце пад час уваходу у сыстэму, Вы зможаце карыстацца некаторымі дадатковымі магчымасьцямі…',
	'fbconnect-click-to-login' => 'Націсьніце, каб увайсьці на гэты сайт праз Facebook',
	'fbconnect-click-to-connect-existing' => 'Націсьніце, каб злучыць Ваш рахунак на Facebook з $1',
	'fbconnect-conv' => 'Зручнасьць',
	'fbconnect-convdesc' => 'Злучаныя удзельнікі аўтаматычна ўваходзяць у сыстэму.
Калі дазвол атрыманы, то {{GRAMMAR:вінавальны|{{SITENAME}}}} можа нават выкарыстоўваць Facebook як проксі для электроннай пошты, такім чынам Вы можаце атрымліваць важныя паведамленьні, ня робячы вядомым Ваш адрас электроннай пошты.',
	'fbconnect-fbml' => 'Мова разьметкі Facebook',
	'fbconnect-fbmldesc' => 'Facebook прадстаўляе ўбудаваныя тэгаў, якія візуалізуюць дынамічныя зьвесткі.
Большасьць з гэтых тэгаў могуць утрымлівацца ў вікі-тэксьце, і будуць паказвацца па рознаму, у залежнасьці ад таго, які ўдзельнік іх праглядаць.',
	'fbconnect-comm' => 'Сувязь',
	'fbconnect-welcome' => 'Вітаем карыстальніка злучэньня Facebook!',
	'fbconnect-loginbox' => "Ці '''увайдзіце ў сыстэму''' праз Facebook:
	
$1",
	'fbconnect-merge' => 'Аб’яднаць Ваш вікі-рахунак з Вашым ідэнтыфікатарам Facebook',
	'fbconnect-logoutbox' => '$1
	
Гэта, таксама, выведзе Вас з сыстэмы Facebook і усіх злучаных зь ім сайтаў, уключаючы {{GRAMMAR:вінавальны|{{SITENAME}}}}.',
	'fbconnect-listusers-header' => 'Правы $1 і $2 аўтаматычна перанесеныя ад кіраўніка і адміністратара групы Facebook $3.

Для атрыманьня дадатковай інфармацыі, калі ласка, зьвяжыцеся са стваральнікам групы $4.',
	'fbconnect-error' => 'Памылка праверкі',
	'fbconnect-errortext' => 'Узьнікла памылка падчас праверкі са злучэньнем Facebook.',
	'fbconnect-cancel' => 'Дзеяньне адмененае',
	'fbconnect-canceltext' => 'Папярэдняе дзеяньне было адмененае ўдзельнікам.',
	'fbconnect-invalid' => 'Няслушная ўстаноўка',
	'fbconnect-invalidtext' => 'Выбар, зроблены на папярэдняй старонцы, быў няслушны.',
	'fbconnect-success' => 'Праверка Facebook адбылася пасьпяхова',
	'fbconnect-successtext' => 'Вы пасьпяхова ўвайшлі ў сыстэму праз злучэньне Facebook.',
	'fbconnect-nickname' => 'Мянушка',
	'fbconnect-fullname' => 'Поўнае імя',
	'fbconnect-email' => 'Адрас электроннай пошты',
	'fbconnect-language' => 'Мова',
	'fbconnect-timecorrection' => 'Карэкцыя часавага пасу (гадзінаў)',
);

/** Breton (Brezhoneg)
 * @author Gwendal
 * @author Y-M D
 */
$messages['br'] = array(
	'fbconnect' => 'Facebook Connect',
	'group-fb-user' => 'Implijerien Facebook Connect',
	'group-fb-user-member' => 'Implijer Facebook Connect',
	'grouppage-fb-user' => '{{ns:project}}: Implijerien Facebook Connect',
	'group-fb-groupie' => 'Izili ar strollad',
	'group-fb-groupie-member' => 'Ezel ar strollad',
	'grouppage-fb-groupie' => '{{ns:project}}: Izili ar strollad',
	'group-fb-admin' => 'Merourien ar strollad',
	'group-fb-admin-member' => 'Merour ar strollad',
	'grouppage-fb-admin' => '{{ns:project}}: Merourien ar strollad',
	'fbconnect-connect' => 'Kevreañ gant Facebook Connect',
	'fbconnect-convert' => "Kevreañ ar c'hont-mañ gant Facebook",
	'fbconnect-logout' => 'Digrevreañ eus Facebook',
	'fbconnect-link' => 'E facebook.com en-dro',
	'fbconnect-title' => 'Kont kevreañ gant Facebook',
	'fbconnect-click-to-login' => "Klikit evit kevreañ el lec'hienn-mañ dre Facebook",
	'fbconnect-click-to-connect-existing' => 'Klikit evit kevreañ ho kont Facebook da $1',
	'fbconnect-comm' => 'Daremprederezh',
	'fbconnect-loginbox' => "Pe '''kevreañ''' gant Facebook:

$1",
	'fbconnect-error' => 'Fazi gwiriañ',
	'fbconnect-invalid' => "N'haller ket dibab an dra-se",
	'fbconnect-nickname' => 'Lesanv',
	'fbconnect-fullname' => 'Anv klok',
	'fbconnect-email' => "Chomlec'h postel",
	'fbconnect-language' => 'Yezh',
	'fbconnect-chooselegend' => 'Dibab an anv implijer',
	'fbconnect-chooseinstructions' => "An holl implijerien o deus ezhomm ul lesanv; gallout a rit dibab unan eus ar c'hinnigoù a-is.",
	'fbconnect-invalidname' => 'Al lezanv ho peus dibabet a zo direizh pe implijet dija.
Trugarez da zibab unan all.',
	'fbconnect-choosenick' => 'Anv ho profil Facebook ($1)',
	'fbconnect-choosefirst' => "Hoc'h anv-bihan ($1)",
	'fbconnect-choosefull' => "Hoc'h anv klok ($1)",
	'fbconnect-chooseauto' => 'Un anv krouet emgefre ($1)',
	'fbconnect-choosemanual' => "Un anv dibabet ganeoc'h :",
	'fbconnect-chooseexisting' => 'Ur gont zo anezhi war ar wiki-mañ',
	'fbconnect-chooseusername' => 'Anv implijer :',
	'fbconnect-choosepassword' => 'Ger-tremen :',
	'fbconnect-alreadyloggedin' => "'''Kevreet oc'h dija, $1!'''

Ma fell deoc'h implijout Facebook Connect da gevreañ diwezhatoc'h, e c'hallit [[Special:Connect/Convert|amdreiñ ho kont evit implijout Facebook Connect]].",
	'fbconnect-prefstext' => 'Facebook Connect',
	'fbconnect-link-to-profile' => 'Profil Facebook',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'fbconnect-desc' => 'Omogućuje korisnicima [[Special:Connect|spajanje]] sa svojim [http://www.facebook.com Facebook] računima.
Nudi autentifikaciju zasnovanu na Facebook grupama i korištenju FBML u wiki tekstu',
	'group-fb-groupie' => 'Članovi grupe',
	'group-fb-groupie-member' => 'Član grupe',
	'group-fb-admin' => 'Administratori grupe',
	'group-fb-admin-member' => 'Administrator grupe',
	'fbconnect-link' => 'Nazad na facebook.com',
	'fbconnect-title' => 'Spajanje računa sa Facebook',
	'fbconnect-cancel' => 'Akcija obustavljena',
	'fbconnect-invalid' => 'Nevaljana opcija',
	'fbconnect-nickname' => 'Nadimak',
	'fbconnect-fullname' => 'Puno ime',
	'fbconnect-email' => 'E-mail adresa',
	'fbconnect-language' => 'Jezik',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'fbconnect' => 'Facebook Connect',
	'fbconnect-desc' => 'Stellt eine [[Special:Connect|Spezialseite]] bereit mit der Benutzer eine Verbindung mit ihrem [http://de-de.facebook.com/ Facebook-Konten] herstellen können.
Zudem wird die Authentifizierung basierend auf Facebook-Gruppen und der Einsatz von FBML in Wikitext ermöglicht.',
	'group-fb-user' => 'Facebook-Connect-Benutzer',
	'group-fb-user-member' => 'Facebook-Connect-Benutzer',
	'grouppage-fb-user' => '{{ns:project}}:Facebook-Connect-Benutzer',
	'group-fb-groupie' => 'Gruppenmitglieder',
	'group-fb-groupie-member' => 'Gruppenmitglied',
	'grouppage-fb-groupie' => '{{ns:project}}:Gruppenmitglieder',
	'group-fb-officer' => 'Gruppenrechteverwalter',
	'group-fb-officer-member' => 'Gruppenrechteverwalter',
	'grouppage-fb-officer' => '{{ns:project}}:Gruppenrechteverwalter',
	'group-fb-admin' => 'Gruppenadministratoren',
	'group-fb-admin-member' => 'Gruppenadministrator',
	'grouppage-fb-admin' => '{{ns:project}}:Gruppenadministratoren',
	'fbconnect-connect' => 'Anmelden mit Facebook Connect',
	'fbconnect-convert' => 'Dieses Konto mit Facebook verknüpfen',
	'fbconnect-logout' => 'Aus Facebook abmelden',
	'fbconnect-link' => 'Zurück zu de-de.facebook.com',
	'fbconnect-title' => 'Konto mit Facebook verknüpfen',
	'fbconnect-intro' => 'Dieses Wiki hat Facebook Connect, die nächsten Weiterentwicklung der Plattform Facebook, aktiviert.
Dies bedeutet, dass man, sofern man angemeldet ist, zusätzlich zu den herkömmlichen [[Wikipedia:Help:Logging in#Why log in?|Vorteilen]] einer Anmeldung, weitere zusätzliche Funktionen nutzen kann...',
	'fbconnect-click-to-login' => 'Auf diese Schaltfläche klicken, um sich auf diesem Wiki via Facebook anzumelden',
	'fbconnect-click-to-connect-existing' => 'Auf diese Schaltfläche klicken, um das Facebook-Konto mit $1 zu verknüpfen',
	'fbconnect-conv' => 'Bequemlichkeit',
	'fbconnect-convdesc' => 'Verknüpfte Benutzer werden automatisch angemeldet.
Sofern die Erlaubnis vorliegt, kann dieses Wiki sogar Facebook als Kommunikationsschnittstelle für E-Mails nutzen, so dass man weiterhin wichtige Nachrichten erhalten kann, ohne hierzu die E-Mail-Adresse offenlegen zu müssen.',
	'fbconnect-fbml' => 'Facebook Auszeichnungssprache',
	'fbconnect-fbmldesc' => 'Facebook stellt ein Bündel integrierter Tags bereit, die dynamisch erzeugte Daten verarbeiten können.
Viele dieser Tags können in Wikitext einbezogen werden. Sie werden, je nach auf dem Wiki angemeldeten Benutzer, individuell mit Daten versehen und ausgegeben.',
	'fbconnect-comm' => 'Kommunikation',
	'fbconnect-commdesc' => 'Facebook Connect ermöglicht eine vollkommen neuartige Möglichkeit des Netzwerkens.
Man kann sehen welche der eigenen Freunde das Wiki nutzen und, sofern gewünscht, ihnen die eigenen Aktionen über den eigenen Facebook-Newsfeed ausgeben lassen.',
	'fbconnect-welcome' => 'Willkommen, Facebook-Connect-Benutzer!',
	'fbconnect-loginbox' => "Oder via Facebook '''anmelden''':

$1",
	'fbconnect-merge' => 'Das Wikikonto mit der Facebook-ID verknüpfen',
	'fbconnect-logoutbox' => '$1

Dies führt zu einer Abmeldung von Facebook und allen verknüpften Websites, einschließlich dieses Wikis.',
	'fbconnect-listusers-header' => 'Die Privilegien $1 und $2 werden automatisch von denen des Gruppenrechteverwalters und Gruppenadministrators der Facebook-Gruppe $3 übertragen.

Für weitere Informationen kann man den Gruppenersteller $4 kontaktieren.',
	'fbconnect-usernameprefix' => 'Facebook-Benutzer',
	'fbconnect-error' => 'Überprüfungsfehler',
	'fbconnect-errortext' => 'Ein Fehler trat während der Überprüfung mit Facebook Connect auf.',
	'fbconnect-cancel' => 'Aktion abgebrochen',
	'fbconnect-canceltext' => 'Die vorherige Aktion wurde vom Benutzer abgebrochen.',
	'fbconnect-invalid' => 'Ungültige Option',
	'fbconnect-invalidtext' => 'Die Auswahl, die auf der vorherigen Seite getroffen wurde, ist ungültig.',
	'fbconnect-success' => 'Facebook Connect-Überprüfung erfolgreich',
	'fbconnect-successtext' => 'Die Anmeldung via Facebook Connect war erfolgreich.',
	'fbconnect-nickname' => 'Benutzername',
	'fbconnect-fullname' => 'Vollständiger Name',
	'fbconnect-email' => 'E-Mail-Adresse',
	'fbconnect-language' => 'Sprache',
	'fbconnect-timecorrection' => 'Zeitzonenkorrektur (Stunden)',
	'fbconnect-chooselegend' => 'Wahl des Benutzernamens',
	'fbconnect-chooseinstructions' => 'Alle Benutzer benötigen einen Benutzernamen. Es kann einer aus der untenstehenden Liste ausgewählt werden.',
	'fbconnect-invalidname' => 'Der ausgewählte Benutzername wurde bereits vergeben oder ist nicht zulässig.
Bitte einen anderen auswählen.',
	'fbconnect-choosenick' => 'Der Profilname auf Facebook ($1)',
	'fbconnect-choosefirst' => 'Vorname ($1)',
	'fbconnect-choosefull' => 'Vollständiger Name ($1)',
	'fbconnect-chooseauto' => 'Ein automatisch erzeugter Name ($1)',
	'fbconnect-choosemanual' => 'Ein Name der Wahl:',
	'fbconnect-chooseexisting' => 'Ein bestehendes Benutzerkonto in diesem Wiki',
	'fbconnect-chooseusername' => 'Benutzername:',
	'fbconnect-choosepassword' => 'Passwort:',
	'fbconnect-updateuserinfo' => 'Die folgenden persönlichen Angaben müssen aktualisiert werden:',
	'fbconnect-alreadyloggedin' => "'''Du bist bereits angemeldet, $1!'''

Sofern OpenID für künftige Anmeldevorgänge genutzt werden soll, kann das [[Special:Connect/Convert|Benutzerkonto für die Nutzung durch Facebook Connect eingerichtet werden]].",
	'fbconnect-error-creating-user' => 'Fehler beim Erstellen des Benutzers in der lokalen Datenbank.',
	'fbconnect-error-user-creation-hook-aborted' => 'Die Schnittstelle einer Softwareerweiterung hat die Benutzerkontoerstellung mit folgender Nachricht abgebrochen: $1',
	'fbconnect-prefstext' => 'Facebook Connect',
	'fbconnect-link-to-profile' => 'Facebook-Profil',
	'fbconnect-prefsheader' => "Einstellungen zu den Aktionen, die über den eigenen Facebook-Newsfeed ausgegeben werden sollen: <a id='fbConnectPushEventBar_show' href='#'>Einstellungen anzeigen</a> <a id='fbConnectPushEventBar_hide' href='#' style='display:none'>Einstellungen ausblenden</a>",
	'fbconnect-prefs-can-be-updated' => 'Sie können jederzeit aktualisiert werden, indem man sie unter der Registerkarte „$1“ auf der Seite Einstellungen ändert.',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'fbconnect-alreadyloggedin' => "'''Sie sind bereits angemeldet, $1!'''

Sofern OpenID für künftige Anmeldevorgänge genutzt werden soll, kann das [[Special:Connect/Convert|Benutzerkonto für die Nutzung durch Facebook Connect eingerichtet werden]].",
);

/** French (Français)
 * @author Verdy p
 */
$messages['fr'] = array(
	'fbconnect' => 'Facebook Connect',
	'fbconnect-desc' => 'Permet aux utilisateurs de [[Special:Connect|se connecter]] avec leurs comptes [http://www.facebook.com Facebook]. Offre une authentification basée sur les groupes Facebook et l’utilisation de FBML dans le texte wiki',
	'group-fb-user' => 'Utilisateurs de Facebook Connect',
	'group-fb-user-member' => 'Utilisateur de Facebook Connect',
	'grouppage-fb-user' => '{{ns:project}}:Utilisateurs de Facebook Connect',
	'group-fb-groupie' => 'Membres de groupe',
	'group-fb-groupie-member' => 'Membre de groupe',
	'grouppage-fb-groupie' => '{{ns:project}}:Membres de groupe',
	'group-fb-officer' => 'Responsables de groupe',
	'group-fb-officer-member' => 'Responsable de groupe',
	'grouppage-fb-officer' => '{{ns:project}}:Responsables de groupe',
	'group-fb-admin' => 'Administrateurs de groupe',
	'group-fb-admin-member' => 'Administrateur de groupe',
	'grouppage-fb-admin' => '{{ns:project}}:Administrateurs de groupe',
	'fbconnect-connect' => 'Se connecter avec Facebook Connect',
	'fbconnect-convert' => 'Connecter ce compte avec Facebook',
	'fbconnect-logout' => 'Se déconnecter de Facebook',
	'fbconnect-link' => 'Retour à Facebook.com',
	'fbconnect-title' => 'Connecter un compte avec Facebook',
	'fbconnect-intro' => 'Ce wiki est activé avec Facebook Connect, une évolution récente de la plateforme Facebook.
Cela signifie que lorsque vous êtes connecté, en plus des [[Wikipedia:Help:Logging in#Why log in?|avantages]] dont vous bénéficiez lorsque vous vous connectez, vous pourrez profiter de quelques fonctionnalités supplémentaires...',
	'fbconnect-click-to-login' => 'Cliquez pour accéder à ce site via Facebook',
	'fbconnect-click-to-connect-existing' => 'Cliquez ici pour connecter votre compte Facebook à $1',
	'fbconnect-conv' => 'Commodité',
	'fbconnect-convdesc' => 'Les utilisateurs connectés sont automatiquement inscrits. 
Si l’autorisation est donnée, alors ce wiki peut même utiliser Facebook en tant que mandataire de messagerie afin que vous puissiez continuer à recevoir les notifications importantes sans révéler votre adresse courriel.',
	'fbconnect-fbml' => 'Langage de balisage Facebook',
	'fbconnect-fbmldesc' => 'Facebook a fourni un tas de balises intégrées qui va afficher des données dynamiques. 
Nombre de ces balises peuvent être inclues dans le texte wiki et seront rendues différemment selon l’utilisateur connecté qui les visualisent.',
	'fbconnect-comm' => 'Communication',
	'fbconnect-commdesc' => "Facebook Connect inaugure un tout nouveau niveau de mise en réseau.
Voyez qui de vos amis utilisent le wiki, et éventuellement partagez vos actions avec vos amis par l'intermédiaire du fil de nouvelles Facebook.",
	'fbconnect-welcome' => 'Bienvenue, utilisateur de Facebook Connect !',
	'fbconnect-loginbox' => "Ou '''connexion''' avec Facebook :

$1",
	'fbconnect-merge' => 'Fusionner votre compte wiki avec votre identifiant Facebook',
	'fbconnect-logoutbox' => '$1

Cela permettra également vous déconnecter de Facebook et tous les sites connectés, y compris ce wiki.',
	'fbconnect-listusers-header' => 'Les privilèges $1 et $2 sont automatiquement transférés depuis les titres d’administrateurs et responsables du groupe Facebook $3.

Pour plus d’informations, veuillez contacter le créateur du groupe $4.',
	'fbconnect-error' => 'Erreur de vérification',
	'fbconnect-errortext' => 'Une erreur s’est produite lors de la vérification avec Facebook Connect.',
	'fbconnect-cancel' => 'Action annulée',
	'fbconnect-canceltext' => 'L’action précédente a été annulée par l’utilisateur.',
	'fbconnect-invalid' => 'Option invalide',
	'fbconnect-invalidtext' => 'La sélection faite à la page précédente était invalide.',
	'fbconnect-success' => 'Vérification Facebook réussie',
	'fbconnect-successtext' => 'Vous avez été connecté avec succès avec Facebook Connect.',
	'fbconnect-nickname' => 'Pseudonyme',
	'fbconnect-fullname' => 'Nom complet',
	'fbconnect-email' => 'Adresse courriel',
	'fbconnect-language' => 'Langue',
	'fbconnect-timecorrection' => 'Ajustement de fuseau horaire (en heures)',
	'fbconnect-chooselegend' => 'Choix du nom d’utilisateur',
	'fbconnect-chooseinstructions' => 'Tous les utilisateurs ont besoin d’un pseudonyme ; vous pouvez en choisir un à partir des choix ci-dessous.',
	'fbconnect-invalidname' => 'Le pseudonyme que vous avez choisi est déjà pris ou n’est pas un pseudonyme valide.
Veuillez en choisir un autre.',
	'fbconnect-choosenick' => 'Votre nom de profil Facebook ($1)',
	'fbconnect-choosefirst' => 'Votre prénom ($1)',
	'fbconnect-choosefull' => 'Votre nom complet ($1)',
	'fbconnect-chooseauto' => 'Un nom créé automatiquement ($1)',
	'fbconnect-choosemanual' => 'Un nom de votre choix :',
	'fbconnect-chooseexisting' => 'Un compte existant sur ce wiki',
	'fbconnect-chooseusername' => 'Nom d’utilisateur :',
	'fbconnect-choosepassword' => 'Mot de passe :',
	'fbconnect-updateuserinfo' => 'Mettre à jour les renseignements personnels suivants :',
	'fbconnect-alreadyloggedin' => "'''Vous êtes déjà connecté, $1 !''' 

Si vous souhaitez utiliser Facebook Connect pour vous connecter à l’avenir, vous pouvez [[Special:Connect/Convert|convertir votre compte pour utiliser Facebook Connect]].",
	'fbconnect-error-creating-user' => 'Erreur de création de l’utilisateur dans la base de données locale.',
	'fbconnect-error-user-creation-hook-aborted' => 'Un crochet (extension) a abandonné la création de compte avec le message : $1',
	'fbconnect-prefstext' => 'Facebook Connect',
	'fbconnect-link-to-profile' => 'Profil Facebook',
	'fbconnect-prefsheader' => 'Pour contrôler quels évènements vont générer un élément inclus dans votre flux de nouvelles Facebook, <a id="fbConnectPushEventBar_show" href="#">montrer les préférences</a> <a id="fbConnectPushEventBar_hide" href="#" style="display:none">cacher les préférences</a>',
	'fbconnect-prefs-can-be-updated' => 'Vous pouvez mettre à jour ces éléments à tout moment en visitant l’onglet « $1 » de votre page de préférences.',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'fbconnect' => 'Facebook Connect',
	'group-fb-user' => 'Usuarios do Facebook Connect',
	'group-fb-user-member' => 'Usuario do Facebook Connect',
	'grouppage-fb-user' => '{{ns:project}}:Usuarios do Facebook Connect',
	'group-fb-groupie' => 'Membros do grupo',
	'group-fb-groupie-member' => 'Membro do grupo',
	'grouppage-fb-groupie' => '{{ns:project}}:Membros do grupo',
	'group-fb-officer' => 'Directores do grupo',
	'group-fb-officer-member' => 'Director do grupo',
	'grouppage-fb-officer' => '{{ns:project}}:Directores do grupo',
	'group-fb-admin' => 'Administradores do grupo',
	'group-fb-admin-member' => 'Administrador do grupo',
	'grouppage-fb-admin' => '{{ns:project}}:Administradores do grupo',
	'fbconnect-connect' => 'Identificarse co Facebook Connect',
	'fbconnect-convert' => 'Conectar esta conta co Facebook',
	'fbconnect-logout' => 'Desconectarse do Facebook',
	'fbconnect-link' => 'Volver a facebook.com',
	'fbconnect-title' => 'Conectar a conta co Facebook',
	'fbconnect-click-to-login' => 'Prema para acceder a este sitio mediante o Facebook',
	'fbconnect-click-to-connect-existing' => 'Prema para conectar a súa conta no Facebook con $1',
	'fbconnect-conv' => 'Comodidade',
	'fbconnect-fbml' => 'Lingua de formato do Facebook',
	'fbconnect-comm' => 'Comunicación',
	'fbconnect-welcome' => 'Benvido, usuario do Facebook Connect!',
	'fbconnect-loginbox' => "Ou '''acceda ao sistema''' co Facebook:
	
$1",
	'fbconnect-merge' => 'Fusionar a súa conta wiki co ID do Facebook',
	'fbconnect-error' => 'Erro de verificación',
	'fbconnect-errortext' => 'Houbo un erro durante a comprobación co Facebook Connect.',
	'fbconnect-cancel' => 'Acción cancelada',
	'fbconnect-canceltext' => 'O usuario cancelou a acción anterior.',
	'fbconnect-invalid' => 'Opción incorrecta',
	'fbconnect-invalidtext' => 'A selección feita na páxina anterior era incorrecta.',
	'fbconnect-success' => 'Verificación do Facebook correcta',
	'fbconnect-successtext' => 'Accedeu ao sistema correctamente co Facebook Connect.',
	'fbconnect-nickname' => 'Alcume',
	'fbconnect-fullname' => 'Nome completo',
	'fbconnect-email' => 'Enderezo de correo electrónico',
	'fbconnect-language' => 'Lingua',
	'fbconnect-timecorrection' => 'Corrección da zona horaria (horas)',
	'fbconnect-chooselegend' => 'Elección do nome de usuario',
	'fbconnect-chooseinstructions' => 'Todos os usuarios precisan un alcume; pode escoller un de entre as opcións de embaixo.',
	'fbconnect-invalidname' => 'O alcume elixido xa está tomado ou non é válido.
Escolla un diferente.',
	'fbconnect-choosenick' => 'O nome do seu perfil no Facebook ($1)',
	'fbconnect-choosefirst' => 'O seu nome ($1)',
	'fbconnect-choosefull' => 'O seu nome completo ($1)',
	'fbconnect-chooseauto' => 'Un nome xerado automaticamente ($1)',
	'fbconnect-choosemanual' => 'Un nome da súa escolla:',
	'fbconnect-chooseexisting' => 'Unha conta existente neste wiki',
	'fbconnect-chooseusername' => 'Nome de usuario:',
	'fbconnect-choosepassword' => 'Contrasinal:',
	'fbconnect-updateuserinfo' => 'Actualice a seguinte información persoal:',
	'fbconnect-error-creating-user' => 'Erro ao crear o usuario na base de datos local.',
	'fbconnect-error-user-creation-hook-aborted' => 'Un hook (extensión) abortou a creación da conta con esta mensaxe: $1',
	'fbconnect-prefstext' => 'Facebook Connect',
	'fbconnect-link-to-profile' => 'Perfil no Facebook',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'fbconnect' => 'Facebook Connect',
	'fbconnect-desc' => 'Permitte al usatores de [[Special:Connect|connecter se]] con lor contos de [http://www.facebook.com Facebook].
Offere authentication a base de gruppos de Facebook e le uso de FBML in texto wiki.',
	'group-fb-user' => 'Usatores de Facebook Connect',
	'group-fb-user-member' => 'Usator de Facebook Connect',
	'grouppage-fb-user' => '{{ns:project}}:Usatores de Facebook Connect',
	'group-fb-groupie' => 'Membros del gruppo',
	'group-fb-groupie-member' => 'Membro del gruppo',
	'grouppage-fb-groupie' => '{{ns:project}}:Membros del gruppo',
	'group-fb-officer' => 'Directores del gruppo',
	'group-fb-officer-member' => 'Director del gruppo',
	'grouppage-fb-officer' => '{{ns:project}}:Directores del gruppo',
	'group-fb-admin' => 'Administratores del gruppo',
	'group-fb-admin-member' => 'Administrator del gruppo',
	'grouppage-fb-admin' => '{{ns:project}}:Administratores del gruppo',
	'fbconnect-connect' => 'Aperir session con Facebook Connect',
	'fbconnect-convert' => 'Connecter iste conto con Facebook',
	'fbconnect-logout' => 'Clauder session de Facebook',
	'fbconnect-link' => 'Retornar a facebook.com',
	'fbconnect-title' => 'Connecter le conto con Facebook',
	'fbconnect-intro' => 'Iste wiki dispone de Facebook Connect, le proxime evolution del platteforma Facebook.
Isto significa que, si tu es connectite, in addition al normal [[Wikipedia:Help:Logging in#Why log in?|beneficios]] que tu vide quando aperir un session, tu potera traher avantage de alcun functionalitate extra...',
	'fbconnect-click-to-login' => 'Clicca pro authenticar te a iste sito via Facebook',
	'fbconnect-click-to-connect-existing' => 'Clicca pro connecter tu conto de Facebook a $1',
	'fbconnect-conv' => 'Commoditate',
	'fbconnect-convdesc' => 'Le usatores connectite es automaticamente authenticate.
Si permission es date, alora iste wiki pote mesmo usar Facebook como proxy de e-mail de sorta que tu pote continuar a reciper importante notificationes sin revelar tu adresse de e-mail.',
	'fbconnect-fbml' => 'Linguage de marcation de Facebook',
	'fbconnect-fbmldesc' => 'Facebook ha providite un collection de etiquettas integrate pro tractamento dynamic de datos.
Multes de iste etiquettas pote esser includite in texto wiki, e essera tractate differentemente dependente de qual usator connectite los visualisa.',
	'fbconnect-comm' => 'Communication',
	'fbconnect-commdesc' => 'Facebook Connect introduce un totalmente nove nivello de communication in rete.
Vide quales de tu amicos usa le wiki, e optionalmente condivide tu actiones con tu amicos per le syndication de novas de Facebook.',
	'fbconnect-welcome' => 'Benvenite, usator de Facebook Connect!',
	'fbconnect-loginbox' => "O '''aperir session''' via Facebook:
	
$1",
	'fbconnect-merge' => 'Fusionar tu conto wiki con tu ID de Facebook',
	'fbconnect-logoutbox' => '$1

Isto claudera anque tu session de Facebook e de tote le sitos connectite, incluse iste wiki.',
	'fbconnect-listusers-header' => 'Le privilegios $1 e $2 es automaticamente transferite ab le titulos de officiero e de administrator del gruppo Facebook $3.

Pro plus informationes, per favor contacta le creator del gruppo, $4.',
	'fbconnect-error' => 'Error de verification',
	'fbconnect-errortext' => 'Un error occurreva durante le verification con Facebook Connect.',
	'fbconnect-cancel' => 'Action cancellate',
	'fbconnect-canceltext' => 'Le previe action esseva cancellate per le usator.',
	'fbconnect-invalid' => 'Option invalide',
	'fbconnect-invalidtext' => 'Le modo de selection in le previe pagina esseva invalide.',
	'fbconnect-success' => 'Verification de Facebook succedite',
	'fbconnect-successtext' => 'Le apertura de session con Facebook Connect ha succedite.',
	'fbconnect-nickname' => 'Pseudonymo',
	'fbconnect-fullname' => 'Nomine complete',
	'fbconnect-email' => 'Adresse de e-mail',
	'fbconnect-language' => 'Lingua',
	'fbconnect-timecorrection' => 'Correction de fuso horari (horas)',
	'fbconnect-chooselegend' => 'Selection del nomine de usator',
	'fbconnect-chooseinstructions' => 'Tote le usatores require un pseudonymo;
tu pote seliger un del optiones in basso.',
	'fbconnect-invalidname' => 'Le pseudonymo que tu seligeva es jam in uso o non es un pseudonymo valide.
Per favor selige un altere.',
	'fbconnect-choosenick' => 'Le nomine de tu profilo de Facebook ($1)',
	'fbconnect-choosefirst' => 'Tu prenomine ($1)',
	'fbconnect-choosefull' => 'Tu nomine complete ($1)',
	'fbconnect-chooseauto' => 'Un nomine automaticamente generate ($1)',
	'fbconnect-choosemanual' => 'Un nomine de tu preferentia:',
	'fbconnect-chooseexisting' => 'Un conto existente in iste wiki',
	'fbconnect-chooseusername' => 'Nomine de usator:',
	'fbconnect-choosepassword' => 'Contrasigno:',
	'fbconnect-updateuserinfo' => 'Actualisar le sequente informationes personal:',
	'fbconnect-alreadyloggedin' => "'''Tu es jam authenticate, $1!'''

Si tu vole usar Facebook Connect pro aperir un session in le futuro, tu pote [[Special:Connect/Convert|converter tu conto pro usar Facebook Connect]].",
	'fbconnect-error-creating-user' => 'Error durante le creation del usator in le base de datos local.',
	'fbconnect-error-user-creation-hook-aborted' => 'Le interfacie de un extension ha abortate le creation del conto con le message: $1',
	'fbconnect-prefstext' => 'Facebook Connect',
	'fbconnect-link-to-profile' => 'Profilo de Facebook',
	'fbconnect-prefsheader' => "Pro determinar le eventos que pote inserer un entrata in tu lista de novas a Facebook, <a id='fbConnectPushEventBar_show' href='#'>monstra preferentias</a> <a id='fbConnectPushEventBar_hide' href='#' style='display:none'>cela preferentias</a>",
	'fbconnect-prefs-can-be-updated' => 'Tu pote sempre actualisar istes per visitar le scheda "$1" de tu pagina de preferentias.',
);

/** Italian (Italiano)
 * @author Ric
 */
$messages['it'] = array(
	'fbconnect-link' => 'Torna a facebook.com',
	'fbconnect-click-to-login' => 'Fare clic per accedere a questo sito tramite Facebook',
	'fbconnect-click-to-connect-existing' => 'Clicca per collegare il tuo account Facebook a $1',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'fbconnect' => 'Facebook Connect',
	'group-fb-user' => 'Facebook Connect Benotzer',
	'group-fb-user-member' => 'Facebook-Connect-Benotzer',
	'grouppage-fb-user' => '{{ns:project}}:Facebook-Connect-Benotzer',
	'group-fb-groupie' => 'Membere vum Grupp',
	'group-fb-groupie-member' => 'Member vum Grupp',
	'grouppage-fb-groupie' => '{{ns:project}}: Gruppememberen',
	'fbconnect-connect' => 'Mat Facebook-Connect aloggen',
	'fbconnect-convert' => 'Dëse Kont mat Facebook verbannen',
	'fbconnect-logout' => 'Ofmellen op Facebook',
	'fbconnect-link' => 'Zréck op facebook.com',
	'fbconnect-title' => 'Kont mat Facebook verbannen',
	'fbconnect-click-to-connect-existing' => 'Klickt fir Äre Facebook-Kont mat $1 ze verbannen',
	'fbconnect-conv' => 'Bequemlechkeet',
	'fbconnect-fbml' => 'Facebook-Markup Sprooch',
	'fbconnect-comm' => 'Kommunikatioun',
	'fbconnect-welcome' => 'Wëllkomm, Facebook-Connect-Benotzer!',
	'fbconnect-merge' => 'Verbannt Äre Wiki-Kont mat Ärer Facebook-ID',
	'fbconnect-usernameprefix' => 'Facebook-Benotzer',
	'fbconnect-error' => 'Feeler bei der Iwwerpréifung',
	'fbconnect-cancel' => 'Aktioun ofgebrach',
	'fbconnect-nickname' => 'Spëtznumm',
	'fbconnect-fullname' => 'Ganzen Numm',
	'fbconnect-email' => 'E-Mailadress',
	'fbconnect-language' => 'Sprooch',
	'fbconnect-chooseinstructions' => 'All Benotzer brauchen e Spëtznumm; Dir kënnt Iech een aus den Optiounen hei drënner eraussichen.',
	'fbconnect-choosenick' => 'Äre Facbook-Profilnumm ($1)',
	'fbconnect-choosefirst' => 'Äre Virnumm ($1)',
	'fbconnect-choosefull' => 'Äre ganzen Numm ($1)',
	'fbconnect-chooseauto' => 'En Numm deen automatesch generéiert gouf ($1)',
	'fbconnect-choosemanual' => 'En Numm vun Ärer Wiel:',
	'fbconnect-chooseexisting' => 'E Benotzerkont deen et op dëser Wiki gëtt',
	'fbconnect-chooseusername' => 'Benotzernumm:',
	'fbconnect-choosepassword' => 'Passwuert:',
	'fbconnect-updateuserinfo' => 'Dës perséinlech Informatioun aktualiséieren:',
	'fbconnect-alreadyloggedin' => "'''Dir sidd schonn ageloggt, $1!'''

Wann Dir Facebook-Connect benotze wëllt fir Iech an Zukunft anzeloggen, da kënnt Dir [[Special:Connect/Convert|Äre Benotzerkont ëmwandelen Fir Facebook-Connect ze benotzen]].",
	'fbconnect-prefstext' => 'Facebook-Connect',
	'fbconnect-link-to-profile' => 'Facebook-Profil',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'fbconnect' => 'Facebook Connect',
	'fbconnect-desc' => 'Им овозможува на корисниците да се [[Special:Connect|поврзат]] со нивните сметки на [http://mk-mk.facebook.com Facebook].
Нуди потврдување на корисник врз основа на  групи на Facebook и употреба на FBML во викитекст.',
	'group-fb-user' => 'Корисници на Facebook Connect',
	'group-fb-user-member' => 'Корисник на Facebook Connect',
	'grouppage-fb-user' => '{{ns:project}}:Корисници на Facebook Connect',
	'group-fb-groupie' => 'Членови на група',
	'group-fb-groupie-member' => 'Член на група',
	'grouppage-fb-groupie' => '{{ns:project}}:Членови на група',
	'group-fb-officer' => 'Раководители на група',
	'group-fb-officer-member' => 'Раководител на група',
	'grouppage-fb-officer' => '{{ns:project}}:Раководители на група',
	'group-fb-admin' => 'Администратори на група',
	'group-fb-admin-member' => 'Администратор на група',
	'grouppage-fb-admin' => '{{ns:project}}:Администратори на група',
	'fbconnect-connect' => 'Најава со Facebook Connect',
	'fbconnect-convert' => 'Поврзи ја оваа сметка со Facebook',
	'fbconnect-logout' => 'Одјава од Facebook',
	'fbconnect-link' => 'Назад кон страницата на Facebook',
	'fbconnect-title' => 'Поврзи ја сметката преку Facebook',
	'fbconnect-intro' => 'Ова вики има овозможено Facebook Connect, следниот развоен стадиум на платформата Facebook.
Ова значи дека кога сте поврзани, покрај нормалните [[Wikipedia:Help:Logging in#Why log in?|погодности]] при најавување, ќе можете да ги користите предностите на некои дополнителни фунции...',
	'fbconnect-click-to-login' => 'Кликнете го копчево за да се најавите на ова мреж. место преку Facebook',
	'fbconnect-click-to-connect-existing' => 'Кликнете го копчево за да ја поврзете Вашата сметка на Facebook со $1',
	'fbconnect-conv' => 'Погодност',
	'fbconnect-convdesc' => 'Поврзаните корисници се автоматски најавени.
Ако дадете дозвола, ова вики може дури и да го користи Facebook како застапник за е-пошта, така што продолжувате да добивате важни известувања без да ја разоткриете вашата е-поштенска адреса.',
	'fbconnect-fbml' => 'Facebook-ов јазик за означување',
	'fbconnect-fbmldesc' => 'Facebook ни дава низа вградени ознаки со чија помош се прикажуваат динамичките податоци.
Многу вакви ознаки можат да се вклучат во викитест, и ќе се прикажуваат различно, во зависност од тоа кој поврзан корисник ги разгледува.',
	'fbconnect-comm' => 'Комуникација',
	'fbconnect-commdesc' => 'Facebook Connect воведува еден нов начин на мрежно општење.
Погледајте кои од Вашите пријатели го користат викито, а по желба можете и да го споделувате она што го правите со Вашите пријатели преку каналот за новости на Facebook.',
	'fbconnect-welcome' => 'Добредојде, кориснику на Facebook Connect!',
	'fbconnect-loginbox' => "Или пак '''најавете се''' со Facebook:

$1",
	'fbconnect-merge' => 'Спојте ја Вашата вики-сметка со Вашата назнака (ID) на Facebook',
	'fbconnect-logoutbox' => '$1

Ова исто така ќе ве одјави од Facebook и сите поврзани мрежни места, вклучувајќи го ова вики.',
	'fbconnect-listusers-header' => 'Привилегиите $1 и $2 автоматски преоѓаат од звањата на раководителот и администраторот на Facebook-групата  $3.

За повеќе информации, обратете се кај создавачот на групата - $4.',
	'fbconnect-usernameprefix' => 'FacebookUser',
	'fbconnect-error' => 'Грешка при потврдувањето',
	'fbconnect-errortext' => 'Се појави грешка при потврдувањето во однос на Facebook Connect.',
	'fbconnect-cancel' => 'Дејството е откажано',
	'fbconnect-canceltext' => 'Претходното дејство е откажано од корисникот.',
	'fbconnect-invalid' => 'Неважечка можност',
	'fbconnect-invalidtext' => 'Направениот избор на претходната страница е неважечки.',
	'fbconnect-success' => 'Потврдата на Facebook успеа',
	'fbconnect-successtext' => 'Успешно сте најавени со Facebook Connect.',
	'fbconnect-nickname' => 'Прекар',
	'fbconnect-fullname' => 'Име и презиме',
	'fbconnect-email' => 'Е-пошта',
	'fbconnect-language' => 'Јазик',
	'fbconnect-timecorrection' => 'Исправка на часовната зона (часови)',
	'fbconnect-chooselegend' => 'Избор на корисничко име',
	'fbconnect-chooseinstructions' => 'Сите корисници треба да имаат прекар; можете да одберете од долунаведените можности.',
	'fbconnect-invalidname' => 'Прекарот што го избравте е зафатен или не претставува важечки прекар.
Изберете друг.',
	'fbconnect-choosenick' => 'Името на Вашиот профил на Facebook ($1)',
	'fbconnect-choosefirst' => 'Вашето име ($1)',
	'fbconnect-choosefull' => 'Вашето име и презиме ($1)',
	'fbconnect-chooseauto' => 'Автоматски-создадено име ($1)',
	'fbconnect-choosemanual' => 'Име по ваш избор:',
	'fbconnect-chooseexisting' => 'Постоечка сметка на ова вики',
	'fbconnect-chooseusername' => 'Корисничко име:',
	'fbconnect-choosepassword' => 'Лозинка:',
	'fbconnect-updateuserinfo' => 'Поднови ги следниве лични податоци:',
	'fbconnect-alreadyloggedin' => "'''Веќе сте најавени, $1!'''

Ако во иднина сакате да користите Facebook Connect за најава, можете да [[Special:Connect/Convert|ја претворите сметката во таква што користи Facebook Connect]].",
	'fbconnect-error-creating-user' => 'Грешка при создавањето на корисникот во локалната база на податоци.',
	'fbconnect-error-user-creation-hook-aborted' => 'создавањето на сметката беше прекинато од кука (додаток), со пораката: $1',
	'fbconnect-prefstext' => 'Facebook Connect',
	'fbconnect-link-to-profile' => 'Профил на Facebook',
	'fbconnect-prefsheader' => "Контролирање кои настани ќе истакнат некоја ставка на Вашето емитување на новости на Facebook: <a id='fbConnectPushEventBar_show' href='#'>прикажи нагодувања</a> <a id='fbConnectPushEventBar_hide' href='#' style='display:none'>сокриј нагодувања</a>",
	'fbconnect-prefs-can-be-updated' => 'Овие можете да ги подновите во секое време во јазичето „$1“ во Вашата страница за нагодувања.',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'group-fb-groupie-member' => 'Куронь ломань',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'fbconnect' => 'Verbinden met Facebook',
	'fbconnect-desc' => 'Stelt gebruikers in staat een [[Special:Connect|verbinding te maken]] met hun [http://www.facebook.com Facebookgebruiker].
Maakt het mogelijk om aan te melden met de Facebookgebruiker en FBML te gebruiken in wikitekst',
	'group-fb-user' => 'Facebook Connectgebruikers',
	'group-fb-user-member' => 'Facebook Connectgebruiker',
	'grouppage-fb-user' => '{{ns:project}}:Facebook Connectgebruikers',
	'group-fb-groupie' => 'groepsleden',
	'group-fb-groupie-member' => 'groepslid',
	'grouppage-fb-groupie' => '{{ns:project}}:Groepsleden',
	'group-fb-officer' => 'groepshoofden',
	'group-fb-officer-member' => 'groepshoofd',
	'grouppage-fb-officer' => '{{ns:project}}:Groepshoofden',
	'group-fb-admin' => 'groepsbeheerders',
	'group-fb-admin-member' => 'groepsbeheerder',
	'grouppage-fb-admin' => '{{ns:project}}:Groepsbeheerders',
	'fbconnect-connect' => 'Aanmelden via Facebook Connect',
	'fbconnect-convert' => 'Deze gebruiker met Facebook verbinden',
	'fbconnect-logout' => 'Afmelden van Facebook',
	'fbconnect-link' => 'Terug naar facebookcom',
	'fbconnect-title' => 'Gebruiker verbinden met Facebook',
	'fbconnect-intro' => 'In deze wiki is Facebook Connect ingeschakeld, de volgende evolutie van het Facebookplatform. 
Dit betekent dat wanneer u bent verbonden, in aanvulling op de normale [[Wikipedia:Help:Logging in#Why log in?|voordelen]] bij aangemeld zijn, u ook een aantal extra mogelijkheden kunt gebruiken.',
	'fbconnect-click-to-login' => 'Klik om bij deze site aan te melden via Facebook',
	'fbconnect-click-to-connect-existing' => 'Klik om uw Facebookgebruiker te verbinden met $1',
	'fbconnect-conv' => 'Gemak',
	'fbconnect-convdesc' => 'Verbonden gebruikers zijn automatisch aangemeld.
Als er toestemming is gegeven, kan deze wiki zelfs Facebook gebruiken als doorgeefluik voor e-mail, zodat u belangrijke berichten kunt verzenden zonder uw e-mailadres prijs te geven.',
	'fbconnect-fbml' => 'Facebookopmaaktaal',
	'fbconnect-fbmldesc' => 'Facebook heeft een aantal labels beschikbaar gemaakt die het mogelijk maken gegevens dynamisch weer te geven.
Veel van deze labels kunnen opgenomen worden in wikitekst en worden anders weergegeven afhankelijk van door welke gebruiker ze worden bekeken.',
	'fbconnect-comm' => 'Communicatie',
	'fbconnect-commdesc' => 'Facebook Connect bied teen totaal nieuw niveau van netwerken.
U kunt zien welke van uw vrienden de wiki gebruiken en optioneel uw handelingen met uw vrienden delen via een nieuwsfeed in Facebook.',
	'fbconnect-welcome' => 'Welkom, Facebook Connectgebruiker!',
	'fbconnect-loginbox' => "Of '''meld aan'''via Facebook:

$1",
	'fbconnect-merge' => 'Voeg uw wikigebruiker samen met uw Facebookgebruiker',
	'fbconnect-logoutbox' => '$1

Hierdoor wordt u ook afgemeld van Facebook en alle gekoppelde sites, inclusief deze wiki.',
	'fbconnect-listusers-header' => 'Rechten voor $1 en $2 worden automatisch doorgegeven vanuit de rollen officer en beheerder in de Facebookgroep $3.

Neem alstublieft contact met met de oprichter $4 van de groep voor meer informatie.',
	'fbconnect-error' => 'Controlefout',
	'fbconnect-errortext' => 'Er is een fout opgetreden tijdens de verificatie via Facebook Connect.',
	'fbconnect-cancel' => 'Handeling geannuleerd',
	'fbconnect-canceltext' => 'De vorige handeling is geannuleerd door de gebruiker.',
	'fbconnect-invalid' => 'Ongeldige optie',
	'fbconnect-invalidtext' => 'De gemaakte selectie op de vorige pagina is ongeldig.',
	'fbconnect-success' => 'Aangemeld via Facebook',
	'fbconnect-successtext' => 'U bent aangemeld via Facebook Connect.',
	'fbconnect-nickname' => 'Gebruikersnaam',
	'fbconnect-fullname' => 'Volledige naam',
	'fbconnect-email' => 'E-mailadres',
	'fbconnect-language' => 'Taal',
	'fbconnect-timecorrection' => 'Tijdzonecorrectie (uren)',
	'fbconnect-chooselegend' => 'Gebruikersnaamkeuze',
	'fbconnect-chooseinstructions' => 'Alle gebruikers hebben een gebruikersnaam nodig. U kunt er een kiezen uit de onderstaande mogelijkheden.',
	'fbconnect-invalidname' => 'De gebruikersnaam van uw keuze is al in gebruik of ongeldig.
Kies een andere.',
	'fbconnect-choosenick' => 'Uw profielnaam bij Facebook ($1)',
	'fbconnect-choosefirst' => 'Uw voornaam ($1)',
	'fbconnect-choosefull' => 'Uw volledig naam ($1)',
	'fbconnect-chooseauto' => 'Een automatisch aangemaakte naam ($1)',
	'fbconnect-choosemanual' => 'Een voorkeursnaam:',
	'fbconnect-chooseexisting' => 'Een bestaande gebruiker op deze wiki',
	'fbconnect-chooseusername' => 'Gebruikersnaam:',
	'fbconnect-choosepassword' => 'Wachtwoord:',
	'fbconnect-updateuserinfo' => 'De volgende persoonlijke informatie bijwerken:',
	'fbconnect-alreadyloggedin' => "'''U bent al aangemeld, $1!'''

Als u in de toekomst uw Facebook Connect wilt gebruiken om aan te melden, [[Special:Connect/Convert|zet uw gebruiker dan om naar Facebook Connect]].",
	'fbconnect-error-creating-user' => 'Er is een fout opgetreden tijdens het aanmaken van de gebruiker in de lokale database.',
	'fbconnect-error-user-creation-hook-aborted' => 'Een uitbreiding heeft het aanmaken van de gebruiker beëindigd met het volgende bericht: $1',
	'fbconnect-prefstext' => 'Verbinden met Facebook',
	'fbconnect-link-to-profile' => 'Facebookprofiel',
	'fbconnect-prefsheader' => "Bepalen welke handelingen worden toegevoegd aan uw nieuwsfeed in Facebook. <a id='fbConnectPushEventBar_show' href='#'>Voorkeuren weergeven</a><a id='fbConnectPushEventBar_hide' href='#' style='display:none'>Voorkeuren verbergen</a>.",
	'fbconnect-prefs-can-be-updated' => 'U kunt deze te allen tijde bijwerken door naar het tabblad "$1" in uw voorkeuren te gaan.',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'fbconnect' => 'Facebook Connect',
	'fbconnect-desc' => 'Gjør det mulig for brukere å [[Special:Connect|koble til]] med sine [http://www.facebook.com Facebook]-kontoer.
Tilbyr autentisering basert på Facebookgrupper og bruken av FBML i wikitekst',
	'group-fb-user' => 'Facebook Connect-brukere',
	'group-fb-user-member' => 'Facebook Connect-bruker',
	'grouppage-fb-user' => '{{ns:project}}:Facebook Connect-brukere',
	'group-fb-groupie' => 'Gruppemedlemmer',
	'group-fb-groupie-member' => 'Gruppemedlem',
	'grouppage-fb-groupie' => '{{ns:project}}:Gruppemedlemmer',
	'group-fb-officer' => 'Gruppeoffiserer',
	'group-fb-officer-member' => 'Gruppeoffiser',
	'grouppage-fb-officer' => '{{ns:project}}:Gruppeoffiserer',
	'group-fb-admin' => 'Gruppeadministratorer',
	'group-fb-admin-member' => 'Gruppeadministrator',
	'grouppage-fb-admin' => '{{ns:project}}:Gruppeadministratorer',
	'fbconnect-connect' => 'Logg inn med Facebook Connect',
	'fbconnect-convert' => 'Koble til denne kontoen med Facebook',
	'fbconnect-logout' => 'Logg ut av Facebook',
	'fbconnect-link' => 'Tilbake til facebook.com',
	'fbconnect-title' => 'Koble til konto med Facebook',
	'fbconnect-intro' => 'Denne wikien er aktivert med Facebook Connect, den neste evolusjonen av Facebook-plattformen.
Dette betyr at når du er koblet til, i tillegg til de vanlige [[Wikipedia:Help:Logging in#Why log in?|fordelene]] du ser når du logger inn, vil du kunne dra nytte av noen ekstra funksjoner...',
	'fbconnect-click-to-login' => 'Klikk for å logge inn på dette nettstedet via Facebook',
	'fbconnect-click-to-connect-existing' => 'Klikk for å koble din Facebook-konto til $1',
	'fbconnect-conv' => 'Bekvemmelighet',
	'fbconnect-convdesc' => 'Tilkoblede brukere er automatisk logget inn.
Om tillatelse er gitt kan denne wikien til og med bruke Facebook som en e-postmellomtjener slik at du kan fortsette å motta viktige varsler uten å avsløre e-postadressen din.',
	'fbconnect-fbml' => 'Facebook-markeringsspråk (markup language)',
	'fbconnect-fbmldesc' => 'Facebook har levert en haug med innebygde elementer som vil gjengi dynamiske data.
Mange av disse elementene kan inkluderes i wikitekst og vil gjengis forskjellig avhengig av hvilken tilkoblet bruker som de blir sett av.',
	'fbconnect-comm' => 'Kommunikasjon',
	'fbconnect-commdesc' => 'Facebook kobler sammen brukere på et helt nytt nivå av nettverksbygging.
Se hvilke av dine venner som bruker denne wikien og eventuelt del handlingene dine med vennene dine gjennom Facebooks nyhetsstrøm.',
	'fbconnect-welcome' => 'Velkommen, Facebook Connect-bruker!',
	'fbconnect-loginbox' => "Eller '''logg inn''' med Facebook:

$1",
	'fbconnect-merge' => 'Slå sammen wikikontoen din med din Facebook-ID',
	'fbconnect-logoutbox' => '$1

Dette vil også logge deg ut av Facebook og alle tilkoblede nettsteder, inkludert denne wikien.',
	'fbconnect-listusers-header' => '$1- og $2-privilegier blir automatisk overført fra offiser- og admintitler i Facebook-gruppen $3.

For mer info, kontakt en gruppeoppretteren $4.',
	'fbconnect-usernameprefix' => 'FacebookBruker',
	'fbconnect-error' => 'Bekreftelsesfeil',
	'fbconnect-errortext' => 'En feil oppstod under bekreftelse med Facebook Connect.',
	'fbconnect-cancel' => 'Handling avbrutt',
	'fbconnect-canceltext' => 'Den forrige handlingen ble avbrutt av brukeren.',
	'fbconnect-invalid' => 'Ugyldig valg',
	'fbconnect-invalidtext' => 'Valget gjort på den forrige siden var ugyldig.',
	'fbconnect-success' => 'Facebookbekreftelsen var vellykket',
	'fbconnect-successtext' => 'Du har blitt logget inn med Facebook Connect.',
	'fbconnect-nickname' => 'Kallenavn',
	'fbconnect-fullname' => 'Fullt navn',
	'fbconnect-email' => 'E-postadresse',
	'fbconnect-language' => 'Språk',
	'fbconnect-timecorrection' => 'Tidssonekorreksjon (timer)',
	'fbconnect-chooselegend' => 'Brukernavnvalg',
	'fbconnect-chooseinstructions' => 'Alle brukere trenger et kallenavn; du kan velge et fra alternativene under.',
	'fbconnect-invalidname' => 'Kallenavnet du valgte er allerede tatt eller er ikke et gyldig kallenavn.
Velg et annet.',
	'fbconnect-choosenick' => 'Ditt Facebook-profilnavn ($1)',
	'fbconnect-choosefirst' => 'Ditt fornavn ($1)',
	'fbconnect-choosefull' => 'Ditt fulle navn ($1)',
	'fbconnect-chooseauto' => 'Et automatisk generert navn ($1)',
	'fbconnect-choosemanual' => 'Et valgfritt navn:',
	'fbconnect-chooseexisting' => 'En eksisterende konto på denne wikien',
	'fbconnect-chooseusername' => 'Brukernavn:',
	'fbconnect-choosepassword' => 'Passord:',
	'fbconnect-updateuserinfo' => 'Oppdater følgende personlige informasjon:',
	'fbconnect-alreadyloggedin' => "'''Du er allerede logget inn, $1'''

Om du ønsker å bruke Facebook Connect for å logge inn i fremtiden, kan du [[Special:Connect/Convert|konvertere kontoen din til å bruke Facebook Connect]].",
	'fbconnect-error-creating-user' => 'Feil ved opprettelse av brukeren i den lokale databasen.',
	'fbconnect-error-user-creation-hook-aborted' => 'En krok (utvidelse) avbrøt kontoopprettelsen med meldingen: $1',
	'fbconnect-prefstext' => 'Facebook Connect',
	'fbconnect-link-to-profile' => 'Facebook-profil',
	'fbconnect-prefsheader' => "For å kontrollere hvilke hendelser som vil dytte et element til Facebooks nyhetsstrøm, <a id='fbConnectPushEventBar_show' href='#'>vis innstillinger</a> <a id='fbConnectPushEventBar_hide' href='#' style='display:none'>skjul innstillinger</a>",
	'fbconnect-prefs-can-be-updated' => 'Du kan oppdatere disse når som helst ved å gå til «$1»-fanen på innstillingssiden din.',
);

/** Polish (Polski)
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'fbconnect' => 'Facebook Connect',
	'fbconnect-desc' => 'Pozwala użytkownikom na [[Special:Connect|połączenie]] ze swoim [http://www.facebook.com kontem na Facebooku].
Umożliwia uwierzytelnianie w oparciu o grupy Facebooka i wykorzystanie FBML w tekście wiki',
	'group-fb-user' => 'Użytkownicy Facebook Connect',
	'group-fb-user-member' => 'Użytkownik Facebook Connect',
	'grouppage-fb-user' => '{{ns:project}}:Użytkownicy Facebook Connect',
	'group-fb-groupie' => 'Członkowie grupy',
	'group-fb-groupie-member' => 'Członek grupy',
	'grouppage-fb-groupie' => '{{ns:project}}:Członkowie grupy',
	'group-fb-officer' => 'Przywódcy grupy',
	'group-fb-officer-member' => 'Przywódca grupy',
	'grouppage-fb-officer' => '{{ns:project}}:Przywódcy grupy',
	'group-fb-admin' => 'Administratorzy grupy',
	'group-fb-admin-member' => 'Administrator grupy',
	'grouppage-fb-admin' => '{{ns:project}}:Administratorzy grupy',
	'fbconnect-connect' => 'Zaloguj przy pomocy Facebook Connect',
	'fbconnect-convert' => 'Połącz to konto z Facebookiem',
	'fbconnect-logout' => 'Wyloguj się z Facebooka',
	'fbconnect-link' => 'Powrót na facebook.com',
	'fbconnect-title' => 'Połącz konto z Facebookiem',
	'fbconnect-intro' => 'Ta wiki korzysta z Facebook Connect, które jest kolejnym krokiem w ewolucji Facebooka.
Oznacza to, że po nawiązaniu połączenia, oprócz normalnych [[Wikipedia:Help:Logging in#Why log in?|przydatnych dodatków]] widocznych po zalogowaniu, będziesz mógł korzystać z kilku dodatkowych funkcji...',
	'fbconnect-click-to-login' => 'Kliknij, aby zalogować się do tej witryny logując się na Facebooku',
	'fbconnect-click-to-connect-existing' => 'Kliknij, aby przyłączyć swoje konto na Facebooku do $1',
	'fbconnect-conv' => 'Wygoda',
	'fbconnect-convdesc' => 'Użytkownicy korzystający z Facebook Connect są automatycznie zalogowywani.
Jeśli dopuszczono taką możliwość, ta wiki może korzystać z Facebooka jako pośrednika dla poczty e‐mail, dzięki czemu można otrzymywać powiadomienia o ważnych zdarzeniach bez konieczności podawania swojego adresu e‐mail.',
	'fbconnect-fbml' => 'Język znaczników Facebooka',
	'fbconnect-fbmldesc' => 'Facebook dostarcza kilka wbudowanych znaczników, które powodują wstawienie dynamicznie generowanej treści.
Wiele z tych znaczników może zostać wykorzystanych w tekście wiki – zostaną automatycznie zastąpione dynamiczną treścią zależnie od tego, który zalogowany użytkownik ogląda stronę.',
	'fbconnect-comm' => 'Komunikacja',
	'fbconnect-commdesc' => 'Facebook Connect to nowy poziom współpracy w sieci.
Sprawdź, którzy z Twoich znajomych korzystają z tej wiki i podziel się z nimi tym co robisz poprzez system aktualności na Facebooku.',
	'fbconnect-welcome' => 'Witaj użytkowniku Facebook Connect!',
	'fbconnect-loginbox' => "Lub '''zaloguj się''' z Facebookiem

$1",
	'fbconnect-merge' => 'Połącz swoje konto wiki ze swoim identyfikatorem w Facebooku.',
	'fbconnect-logoutbox' => '$1

Spowoduje to również wylogowanie z Facebooka i wszystkich połączonych z nim stron, włącznie z tą wiki.',
	'fbconnect-listusers-header' => 'Uprawnienia $1 i $2 są automatycznie przenoszone z przywódcy i administratora Facebookowej grupy $3.

Więcej informacji uzyskasz od $4, który utworzył tę grupę.',
	'fbconnect-error' => 'Błąd weryfikacji',
	'fbconnect-errortext' => 'Wystąpił błąd podczas weryfikacji przez Facebook Connect.',
	'fbconnect-cancel' => 'Akcja anulowana',
	'fbconnect-canceltext' => 'Poprzednia akcja została anulowana przez użytkownika.',
	'fbconnect-invalid' => 'Nieprawidłowa opcja',
	'fbconnect-invalidtext' => 'Wybór wykonany na poprzedniej stronie był nieprawidłowy.',
	'fbconnect-success' => 'Facebook zweryfikował',
	'fbconnect-successtext' => 'Zostałeś zalogowany poprzez Facebook Connect.',
	'fbconnect-nickname' => 'Nazwa użytkownika',
	'fbconnect-fullname' => 'Imię i nazwisko',
	'fbconnect-email' => 'Adres e‐mail',
	'fbconnect-language' => 'Język',
	'fbconnect-timecorrection' => 'Strefa czasowa (liczba godzin)',
	'fbconnect-chooselegend' => 'Wybór nazwy użytkownika',
	'fbconnect-chooseinstructions' => 'Każdy musi mieć przypisaną nazwę użytkownika. Możesz wybrać jedną z poniższych.',
	'fbconnect-invalidname' => 'Nazwa użytkownika, którą wybrałeś jest już wykorzystywana lub jest nieprawidłowa.
Wybierz inną nazwę użytkownika.',
	'fbconnect-choosenick' => 'Nazwa Twojego profilu na Facebooku ($1)',
	'fbconnect-choosefirst' => 'Twoje imię ($1)',
	'fbconnect-choosefull' => 'Imię i nazwisko ($1)',
	'fbconnect-chooseauto' => 'Automatycznie wygenerowana nazwa ($1)',
	'fbconnect-choosemanual' => 'Nazwa do wyboru:',
	'fbconnect-chooseexisting' => 'Istniejące konto na tej wiki',
	'fbconnect-chooseusername' => 'Nazwa użytkownika',
	'fbconnect-choosepassword' => 'Hasło',
	'fbconnect-updateuserinfo' => 'Aktualizacja następujących danych o użytkowniku',
	'fbconnect-alreadyloggedin' => "'''Jesteś już zalogowany jako $1!'''

Jeśli chcesz w przyszłości używać Facebook Connect do logowania się, możesz [[Special:Connect/Convert|przełączyć konto na korzystanie z Facebook Connect]].",
	'fbconnect-error-creating-user' => 'Wystąpił błąd podczas tworzenia konta użytkownika w lokalnej bazie danych.',
	'fbconnect-error-user-creation-hook-aborted' => 'Hak (rozszerzenie) przerwał tworzenie konta z komunikatem – $1',
	'fbconnect-prefstext' => 'Facebook Connect',
	'fbconnect-link-to-profile' => 'Profil na Facebooku',
	'fbconnect-prefsheader' => "Kontrola, które zdarzenia spowodują dodanie nowej aktualności do Facebooka – <a id='fbConnectPushEventBar_show' href='#'>pokaż preferencje</a> <a id='fbConnectPushEventBar_hide' href='#' style='display:none'>ukryj preferencje</a>",
	'fbconnect-prefs-can-be-updated' => 'Możesz aktualizować informacje w dowolnym momencie odwiedzając zakładkę „$1” na stronie preferencji.',
);

/** Piedmontese (Piemontèis)
 * @author Dragonòt
 */
$messages['pms'] = array(
	'fbconnect' => 'Conession Facebook',
	'fbconnect-desc' => "A abìlita j'utent a [[Special:Connect|Conëttse]] con ij sò cont [http://www.facebook.com Facebook].
A eufr autenticassion basà an sle partìe Facebook e ël dovragi ëd FBML an test wiki",
	'group-fb-user' => 'Utent ëd Facebook Connect',
	'group-fb-user-member' => 'Utent ëd Facebook Connect',
	'grouppage-fb-user' => '{{ns:project}}:Utent ëd Facebook Connect',
	'group-fb-groupie' => 'Mèmber ëd la partìa',
	'group-fb-groupie-member' => 'Mèmber ëd la partìa',
	'grouppage-fb-groupie' => '{{ns:project}}:Mèmber ëd la partìa',
	'group-fb-officer' => 'Ufissiaj dla partìa',
	'group-fb-officer-member' => 'Ufissiaj dla partìa',
	'grouppage-fb-officer' => '{{ns:project}}:Ufissiaj dla partìa',
	'group-fb-admin' => 'Aministrador ëd la partìa',
	'group-fb-admin-member' => 'Aministrador ëd la partìa',
	'grouppage-fb-admin' => '{{ns:project}}:Aministrador ëd la partìa',
	'fbconnect-connect' => 'Intra con Facebook Connect',
	'fbconnect-convert' => 'Colega sto cont con Facebook',
	'fbconnect-logout' => 'Seurt da Facebook',
	'fbconnect-link' => 'André a Facebook.com',
	'fbconnect-title' => 'Colega cont con Facebook',
	'fbconnect-intro' => "Sta wiki a l'é abilità con Facebook Connect, la pròssima evolussion dla piataforma Facebook.
Sossì a veul dì che quand ch'it ses colegà, an gionta ai [[Wikipedia:Help:Logging in#Why log in?|benefissi]] normaj ch'it vëdde quand it intre, it podras pijé vantagi ëd quàich funsion extra...",
	'fbconnect-click-to-login' => 'Sgnaca për intré ant sto sit via Facebook',
	'fbconnect-click-to-connect-existing' => 'Sgnaca për celeghé a tò cont Facebook a $1',
	'fbconnect-conv' => 'Conveniensa',
	'fbconnect-convdesc' => "J'utent colegà a son intrà automaticament.
Se a son dàit ij përmess, antlora sta wiki a peul ëdcò dovré Facebook con un proxy e-mail an manera ch'it peusse continué a arseive notìfiche amportante sensa arvelé toa adrëssa e-mail.",
	'fbconnect-fbml' => 'Lenga dij marcador ëd Facebook',
	'fbconnect-fbmldesc' => "Facebok a l'ha dàit un mucc ëd tag built-in che a presento data dinàmich.
Motobin dë sti tag a peulo esse anserì an test wiki, e a saran presentà an manera diferenta an dipendensa on which connected user they are being viewed by.",
	'fbconnect-comm' => 'Comunicassion',
	'fbconnect-commdesc' => "Facebook a colega j'utent ant n'anter level neuv ëd rej.
Varda chi dij tò amis a stan dovrand la wiki, e opsionalment condivid toe assion con ij tò amis via ij feed ëd neuve ëd Facebook.",
	'fbconnect-welcome' => 'Bin ëvnù, utent ëd Facebook Connect!',
	'fbconnect-loginbox' => "O '''intra''' con Facebook:

$1",
	'fbconnect-merge' => 'Mës-cia tò cont wiki con tò ID Facebook',
	'fbconnect-logoutbox' => '$1

Sossì at farà ëdcò seurte da Facebook e tùit ij sit colegà, compreis sta wiki.',
	'fbconnect-listusers-header' => "Ij privilegi ëd $1 e $2 a son automaticament trasferì dai tìtoj d'uficial e d'aministrador ëd la partìa ëd Facebook $3.

Për savèjne ëd pi, për piasì contata ël creador dla partìa $4.",
	'fbconnect-error' => 'Eror ëd verìfica',
	'fbconnect-errortext' => "A l'é capitaje n'eror an mente dla verìfica con Facebook Connect.",
	'fbconnect-cancel' => 'Assion scanselà',
	'fbconnect-canceltext' => "L'assion ëd prima a l'é stàita scanselà da l'utent.",
	'fbconnect-invalid' => 'Opsion pa bon-a.',
	'fbconnect-invalidtext' => "La selession fàita an sla pàgina ëd prima a l'era pa bon-a.",
	'fbconnect-success' => "La verìfica ëd Facebook a l'é andàita bin",
	'fbconnect-successtext' => 'It sen intrà da bin con Facebook Connect.',
	'fbconnect-nickname' => 'Stranòm',
	'fbconnect-fullname' => 'Nòm complet',
	'fbconnect-email' => 'Adrëssa ëd pòsta eletrònica',
	'fbconnect-language' => 'Lenga',
	'fbconnect-timecorrection' => 'Coression dël fus orari (ore)',
	'fbconnect-chooselegend' => 'Sërnùa dël nòm utent',
	'fbconnect-chooseinstructions' => "Tùit j'utent a l'han dabzògn ëd në stranòm,
a peul sern-ne un da j'opsion sì-sota.",
	'fbconnect-invalidname' => "Lë stranòm ch'it l'has sërnù a l'é già pijà o a l'é pa në stranòm bon.
Për piasì sern-ne un diferent.",
	'fbconnect-choosenick' => 'Tò nòm ëd profil Facebook ($1)',
	'fbconnect-choosefirst' => 'Tò nòm ($1)',
	'fbconnect-choosefull' => 'Tò nòm complet ($1)',
	'fbconnect-chooseauto' => 'Un nòm generà da sol ($1)',
	'fbconnect-choosemanual' => 'Un nòm sërnù da ti:',
	'fbconnect-chooseexisting' => 'Un cont esistent an sta wiki-sì',
	'fbconnect-chooseusername' => 'Nòm utent:',
	'fbconnect-choosepassword' => 'Ciav:',
	'fbconnect-updateuserinfo' => "Modìfica j'anformassion përsonaj ch'a ven-o:",
	'fbconnect-alreadyloggedin' => "'''A l'é già intrà ant ël sistema, $1!'''

S'a veul dovré Facebook Connect për intré ant l'avnì, a peul [[Special:Connect/Convert|convertì sò cont për dovré Facebook Connect]].",
	'fbconnect-error-creating-user' => "Eror an creand l'utent ant ël database local.",
	'fbconnect-error-user-creation-hook-aborted' => "n'hook (estension) a l'ha abortì la creassion dël cont con ël mëssagi:$1",
	'fbconnect-prefstext' => 'Conession Facebook',
	'fbconnect-link-to-profile' => 'Profil ëd Facebook',
	'fbconnect-prefsheader' => "Për controlé che event a posserà un element a tò feed ëd neuve ëd Facebook, <a id='fbConnectPushEventBar_show' href='#'>mosta tò gust</a> <a id='fbConnectPushEventBar_hide' href='#' style='display:none'>stërma gust</a>",
	'fbconnect-prefs-can-be-updated' => 'It peule modifiché sossì quand it veule an visitand ël tab "$1" ëd la pàgina dij tò gust.',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'fbconnect' => 'Facebook Connect',
	'fbconnect-desc' => 'Permite que os utilizadores se [[Special:Connect|autentiquem]] com as suas contas do [http://www.facebook.com Facebook]. Oferece autenticação baseada nos grupos do Facebook e o uso de FBML no texto wiki',
	'group-fb-user' => 'Utilizadores do Facebook Connect',
	'group-fb-user-member' => 'Utilizador do Facebook Connect',
	'grouppage-fb-user' => '{{ns:project}}:Utilizadores do Facebook Connect',
	'fbconnect-connect' => 'Autenticação com o Facebook Connect',
	'fbconnect-convert' => 'Ligar esta conta ao Facebook',
	'fbconnect-logout' => 'Sair do Facebook',
	'fbconnect-link' => 'Voltar ao facebook.com',
	'fbconnect-title' => 'Ligar conta ao Facebook',
	'fbconnect-intro' => 'Esta wiki tem o Facebook Connect, a evolução seguinte da plataforma Facebook.
Isto significa que quando se autentica, adicionalmente aos [[Wikipedia:Help:Logging in#Why log in?|privilégios]] de que disfruta por estar autenticado, tem acesso a algumas funcionalidades adicionais...',
	'fbconnect-click-to-login' => 'Clique para se autenticar através do Facebook',
	'fbconnect-click-to-connect-existing' => 'Clique para ligar a sua conta no Facebook a $1',
	'fbconnect-fbml' => 'Linguagem de formatação do Facebook',
	'fbconnect-fbmldesc' => 'O Facebook fornece vários elementos predefinidos que apresentam dados dinâmicos.
Muitos destes elementos podem ser incuídos no texto wiki e serão apresentados de formas diferentes, em função do utilizador que os vê.',
	'fbconnect-comm' => 'Comunicação',
	'fbconnect-welcome' => 'Bem-vindo, utilizador do Facebook Connect!',
	'fbconnect-merge' => 'Fundir a conta wiki com o seu ID no Facebook',
	'fbconnect-error' => 'Erro de verificação',
	'fbconnect-errortext' => 'Ocorreu um erro durante a verificação com o Facebook Connect.',
	'fbconnect-cancel' => 'Operação cancelada',
	'fbconnect-canceltext' => 'A operação anterior foi cencelada pelo utilizador.',
	'fbconnect-invalid' => 'Opção inválida',
	'fbconnect-invalidtext' => 'A escolha feita na página anterior era inválida.',
	'fbconnect-success' => 'A verificação Facebook ocorreu com sucesso',
	'fbconnect-successtext' => 'Foi autenticado com o Facebook Connect.',
	'fbconnect-email' => 'Correio electrónico',
	'fbconnect-language' => 'Língua',
	'fbconnect-timecorrection' => 'Correcção do fuso horário (horas)',
	'fbconnect-choosenick' => 'O nome do seu perfil no Facebook ($1)',
	'fbconnect-choosefirst' => 'O seu primeiro nome ($1)',
	'fbconnect-choosefull' => 'O seu nome completo ($1)',
	'fbconnect-chooseauto' => 'Um nome gerado automaticamente ($1)',
	'fbconnect-choosemanual' => 'Um nome à sua escolha:',
	'fbconnect-chooseexisting' => 'Uma conta existente nesta wiki',
	'fbconnect-chooseusername' => 'Nome de utilizador:',
	'fbconnect-choosepassword' => 'Palavra-chave:',
	'fbconnect-updateuserinfo' => 'Actualize as seguintes informações pessoais:',
	'fbconnect-error-creating-user' => 'Ocorreu um erro ao criar o utilizador na base de dados local.',
	'fbconnect-error-user-creation-hook-aborted' => "Um ''hook'' (extensão) abortou a criação da conta, com a mensagem: $1",
	'fbconnect-prefstext' => 'Facebook Connect',
	'fbconnect-link-to-profile' => 'Perfil no Facebook',
	'fbconnect-prefs-can-be-updated' => 'Pode actualizar estes elementos a qualquer altura, no separador "$1" das suas preferências.',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Luckas Blade
 */
$messages['pt-br'] = array(
	'fbconnect-comm' => 'Comunicação',
	'fbconnect-error' => 'Erro de verificação',
	'fbconnect-cancel' => 'Operação cancelada',
	'fbconnect-canceltext' => 'A operação anterior foi cencelada pelo usuário.',
	'fbconnect-invalid' => 'Opção inválida',
	'fbconnect-nickname' => 'Apelido',
	'fbconnect-fullname' => 'Nome completo',
	'fbconnect-email' => 'Endereço de e-mail',
	'fbconnect-language' => 'Língua',
	'fbconnect-choosefirst' => 'Seu primeiro nome ($1)',
	'fbconnect-choosefull' => 'Seu nome completo ($1)',
	'fbconnect-choosemanual' => 'Um nome de sua escolha:',
	'fbconnect-chooseusername' => 'Nome de usuário:',
	'fbconnect-choosepassword' => 'Senha:',
);

/** Russian (Русский)
 * @author Eleferen
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'group-fb-groupie-member' => 'Группа участников',
	'group-fb-admin' => 'Группа администраторов',
	'fbconnect-cancel' => 'Действие отменено',
	'fbconnect-invalid' => 'Неверный параметр',
	'fbconnect-success' => 'Проверка через Facebook закончилась успешно',
	'fbconnect-nickname' => 'Псевдоним',
	'fbconnect-fullname' => 'Полное имя',
	'fbconnect-email' => 'Адрес электронной почты',
	'fbconnect-language' => 'Язык',
	'fbconnect-timecorrection' => 'Часовой пояс (в часах)',
	'fbconnect-chooselegend' => 'Выбор имени пользователя',
	'fbconnect-chooseinstructions' => 'У каждого участника должен быть псевдоним. Вы можете выбрать один из представленных ниже.',
	'fbconnect-choosenick' => 'Имя вашего профиля в Facebook ($1)',
	'fbconnect-choosefull' => 'Ваше полное имя ($1)',
	'fbconnect-chooseauto' => 'Автоматически созданное имя ($1)',
	'fbconnect-choosemanual' => 'Имя на ваш выбор:',
	'fbconnect-chooseexisting' => 'Существующая учётная запись в этой вики',
	'fbconnect-chooseusername' => 'Имя участника:',
	'fbconnect-choosepassword' => 'Пароль:',
	'fbconnect-updateuserinfo' => 'Обновите следующие личные сведения:',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'fbconnect' => 'Ugnay sa Facebook',
	'fbconnect-desc' => 'Nagpapahintulot sa mga tagagamit na [[Special:Connect|Umugnay]] sa kanilang mga akawnt sa [http://www.facebook.com Facebook].
Nagbibigay ng pagpapatunay batay sa mga pangkat sa Facebook at ang paggamit ng FBML sa teksto ng wiki',
	'group-fb-user' => 'Mga tagagamit ng Ugnay sa Facebook',
	'group-fb-user-member' => 'Tagagamit ng Ugnay sa Facebook',
	'grouppage-fb-user' => '{{ns:project}}:Mga tagagamit ng Ugnay sa Facebook',
	'group-fb-groupie' => 'Mga kasapi sa pangkat',
	'group-fb-groupie-member' => 'Kasapi sa pangkat',
	'grouppage-fb-groupie' => '{{ns:project}}:Mga kasapi sa pangkat',
	'group-fb-officer' => 'Mga opisyal ng pangkat',
	'group-fb-officer-member' => 'Opisyal ng pangkat',
	'grouppage-fb-officer' => '{{ns:project}}:Mga opisyal ng pangkat',
	'group-fb-admin' => 'Mga tagapangasiwa ng pangkat',
	'group-fb-admin-member' => 'Tagapangasiwa ng pangkat',
	'grouppage-fb-admin' => '{{ns:project}}:Mga tagapangasiwa ng pangkat',
	'fbconnect-connect' => 'Lumagdang may Ugnay sa Facebook',
	'fbconnect-convert' => 'Iugnay ang akawnt na ito sa Facebook',
	'fbconnect-logout' => 'Lumabas mula sa Facebook',
	'fbconnect-link' => 'Bumalik sa facebook.com',
	'fbconnect-title' => 'Iugnay ang akawnt sa Facebook',
	'fbconnect-intro' => 'Ang wiking ito ay pinaganang may Ugnay sa Facebook, ang susunod na ebolusyon ng plataporma ng Facebook.
Nangangahulugan itong kapag nakakunekta ka, bilang dagdag sa normal na [[Wikipedia:Help:Logging in#Why log in?|mga benepisyong]] nakikita mo kapag lumalagdang papasok, maaari kang makinabang sa ilang karagdagang mga tampok...',
	'fbconnect-click-to-login' => 'Pindutin upang lumagda sa sityong ito sa pamamagitan ng Facebook',
	'fbconnect-click-to-connect-existing' => 'Pindutin upang umugnay sa iyong akawnt sa Facebook sa $1',
	'fbconnect-conv' => 'Kaginhawahan',
	'fbconnect-convdesc' => 'Ang nakaugnay na mga tagagamit ay kusang naglalagda sa iyong papasok.
Kapag ibinigay ang pahintulot, kung gayon ang wiki ay maaari ring gamitin ang Facebook bilang isang kahaliling e-liham upang makapagpatuloy kang makatanggap ng mahahalagang mga pabatid na hindi ibinubunyag ang iyong tirahan ng e-liham.',
	'fbconnect-fbml' => 'Wikang pangmarka ng Facebook',
	'fbconnect-fbmldesc' => 'Nagbigay ang Facebook ng isang bungkos ng nakapaloob nang mga tatak na gagawa ng masisiglang dato.  Marami sa mga tatak na ito ang maidaragdag sa teksto ng wiki, at ipapakitang kaiba depende sa aling nakaugnay na tagagamit ang tumitingin sa kanila.',
	'fbconnect-comm' => 'Pakikipag-ugnayan',
	'fbconnect-commdesc' => 'Ang Ugnay sa Facebook ay naghahatid ng isang buong bagong antas ng pagnenetwork.
Tingnan kung sino sa inyong mga kaibigan ang gumagamit ng wiki, at opsyonal na ipamahagi ang iyong mga galaw sa mga kaibigan mo sa pamamagitan ng pakain ng balita ng Facebook.',
	'fbconnect-welcome' => 'Maligayang pagdating, tagagamit ng Ugnay sa Facebook!',
	'fbconnect-loginbox' => "O '''lumagda''' sa pamamagitan ng Facebook:

$1",
	'fbconnect-merge' => 'Isanib ang iyong akawnt na pangwiki sa iyong ID na pang-Facebook',
	'fbconnect-logoutbox' => '$1

Ilalabas ka rin nito mula sa Facebook at lahat ng nakaugnay na mga sityo, kabilang ang wiking ito.',
	'fbconnect-listusers-header' => 'Ang mga pribilehiyong $1 at $2 ay kusang nalilipat mula sa mga pamagat ng opisyal at tagapangasiwa ng pangkat na $3 ng Facebook.

Para sa mas maraming mga kabatiran, mangyaring makipag-ugnayan sa tagapaglikha ng pangkat na $4.',
	'fbconnect-usernameprefix' => 'Tagagamit ng Facebook',
	'fbconnect-error' => 'Kamalian sa pagpapatunay',
	'fbconnect-errortext' => 'Naganap ang isang kamalian habang nagpapatunay sa pamamagitan ng Ugnay sa Facebook.',
	'fbconnect-cancel' => 'Hindi itinuloy ang galaw',
	'fbconnect-canceltext' => 'Ang nakaraang kilos ay hindi itinuloy ng tagagamit.',
	'fbconnect-invalid' => 'Hindi tanggap na opsyon',
	'fbconnect-invalidtext' => 'Ang ginawang pagpili sa nakaraang pahina ay hindi tanggap.',
	'fbconnect-success' => 'Nagtagumpay ang pagpapatibay ng Facebook',
	'fbconnect-successtext' => 'Matagumpay kang nailagdang papasok sa pamamagitan ng Ugnay sa Facebook.',
	'fbconnect-nickname' => 'Palayaw',
	'fbconnect-fullname' => 'Buong pangalan',
	'fbconnect-email' => 'Tirahan ng e-liham',
	'fbconnect-language' => 'Wika',
	'fbconnect-timecorrection' => 'Pagtatama sa sona ng oras (mga oras)',
	'fbconnect-chooselegend' => 'Pagpili ng pangalan ng tagagamit',
	'fbconnect-chooseinstructions' => 'Ang lahat ng mga tagagamit ay nangangailangan ng palayaw; maaari kang pumili mula sa mga mapagpipiliang nasa ibaba.',
	'fbconnect-invalidname' => 'May nakakuha na ng napiling mong palayaw o hindi isang tanggap na palayaw.
Mangyaring pumili ng isang naiiba.',
	'fbconnect-choosenick' => 'Ang iyong pangalan ng balangkas sa Facebook ($1)',
	'fbconnect-choosefirst' => 'Ang unang pangalan mo ($1)',
	'fbconnect-choosefull' => 'Ang buong pangalan mo ($1)',
	'fbconnect-chooseauto' => 'Isang kusang nalikhang pangalan ($1)',
	'fbconnect-choosemanual' => 'Isang pangalang napili mo:',
	'fbconnect-chooseexisting' => 'Isang umiiral na akawnt sa wiking ito',
	'fbconnect-chooseusername' => 'Pangalan ng tagagamit:',
	'fbconnect-choosepassword' => 'Hudyat:',
	'fbconnect-updateuserinfo' => 'Isapanahon ang sumusunod na kabatirang pangsarili:',
	'fbconnect-alreadyloggedin' => "'''Nakalagda ka na, $1!'''

Kung nais mong gamitin ang Ugnay sa Facebook upang makalagda ka sa hinaharap, maaari mong [[Special:Connect/Convert|palitan ang iyong akawnt upang gamitin ang Ugnay sa Facebook]].",
	'fbconnect-error-creating-user' => 'Kamalian sa paglikha ng tagagamit sa katutubong kalipunan ng dato.',
	'fbconnect-error-user-creation-hook-aborted' => 'Isang kawit (dugtong) ang pumigil sa paglikha ng akawnt na may mensaheng: $1',
	'fbconnect-prefstext' => 'Ugnay sa Facebook',
	'fbconnect-link-to-profile' => 'Balangkas sa Facebook',
	'fbconnect-prefsheader' => "Upang matabanan ang kung aling mga kaganapan ang tutulak sa isang bagay papunta sa iyong pakain ng balita sa Facebook, <a id='fbConnectPushEventBar_show' href='#'>ipakita ang mga nais</a> <a id='fbConnectPushEventBar_hide' href='#' style='display:none'>itago ang mga nais</a>",
	'fbconnect-prefs-can-be-updated' => 'Maisasapanahon mo ang mga ito anumang oras sa pamamagitan ng pagdalaw sa panglaylay na "$1" ng iyong pahina ng mga nais.',
);

