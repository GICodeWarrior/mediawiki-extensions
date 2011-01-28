<?php
$messages = array();

/** English
 * @author soxred93
 */
$messages['en'] = array (
	'toolbase-header-title' => "X!'s Tools (BETA)",
	'toolbase-header-bugs' => 'Bugs',
	'toolbase-header-twitter' => 'Twitter',
	'toolbase-header-sitenotice' => 'Global Toolserver Sitenotice: $1',

	'toolbase-replag' => 'Server lagged by $1',
	'toolbase-replag-years' => 'years',
	'toolbase-replag-months' => 'months',
	'toolbase-replag-weeks' => 'weeks',
	'toolbase-replag-days' => 'days',
	'toolbase-replag-hours' => 'hours',
	'toolbase-replag-minutes' => 'minutes',
	'toolbase-replag-seconds' => 'seconds',
	
	'toolbase-footer-exectime' => 'Executed in $1 seconds',
	'toolbase-footer-source' => 'View source',
	'toolbase-footer-language' => 'Change language',
	'toolbase-footer-translate' => 'Translate',
	
	'toolbase-navigation' => 'Navigation',
	'toolbase-navigation-homepage' => 'Homepage',
	'toolbase-navigation-api' => 'API',
	'toolbase-navigation-user_id' => 'Find user ID',
	
	'toolbase-userid-submit' => 'Get user ID',
	'toolbase-userid-title' => 'Find a user ID',
	'toolbase-userid-result' => 'The user ID for <b>$1</b> on <a href="$3"><b>$3</b></a> is <b>$2</b>.',

	'toolbase-main-title' => 'Welcome!',
	'toolbase-main-content' => 'Welcome to X!\'s tools! The tool suite is still in the process of being converted to the <a href="$1">Symfony</a> framework. This process will take a while, but it should be working now. 

For a list of tools that are currently running right now on this framework, see the sidebar to the right.

Bugs can be reported at <a href="$2">Google Code</a>.',
	'toolbase-main-404' => 'File not found',
	'toolbase-main-404-content' => 'Oops! No page was found!

Make sure that you typed the URL correctly.
If you followed a link from somewhere, please <a href="$1">report a bug</a>.
</ul>',
	'toolbase-form-wiki' => 'Wiki',
	
	'toolbase-error-nouser' => '$1 is not a valid user',	
	'toolbase-error-nowiki' => '$1.$2.org is not a valid wiki',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author X!
 */
$messages['qqq'] = array(
	'toolbase-header-title' => 'Name of entire tool suite, used in titles and headers',
	'toolbase-header-bugs' => 'Text shown in link to bug reporter',
	'toolbase-header-sitenotice' => 'Text shown when a global Toolserver sitenotice is issued',
	'toolbase-replag' => 'Text shown when there is server lag',
	'toolbase-footer-exectime' => 'Text shown in the footer. Used to show how many seconds were used in the loading of the page',
	'toolbase-footer-source' => 'Text used in the link to the source code',
	'toolbase-footer-language' => 'Text on the button that changes the interface language',
	'toolbase-footer-translate' => 'Text shown in the link to the translation page
{{Identical|Translate}}',
	'toolbase-navigation' => 'Text shown at the top of the navigation sidebar
{{Identical|Navigation}}',
	'toolbase-navigation-homepage' => 'Text shown in the nagivation link to the homepage',
	'toolbase-navigation-user_id' => 'Text shown in the nagivation link to the user_id tool',
	'toolbase-userid-submit' => 'Text on the submit button for the user_id tool',
	'toolbase-userid-title' => 'Header on the user_id tool',
	'toolbase-userid-result' => 'Message shown when someone gets the user id on the user_id tool',
	'toolbase-main-title' => 'General greeting, used on homepage',
	'toolbase-main-content' => 'Content of the homepage',
	'toolbase-main-404' => 'Header shown for a 404 error',
	'toolbase-main-404-content' => 'Content of the 404 error page',
	'toolbase-form-wiki' => 'Text shown for the ___.___.org input field when specifying a wiki.',
	'toolbase-error-nouser' => 'Generic error when a user specified does not exist',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'toolbase-header-title' => 'X! se Gereedskapsboks',
	'toolbase-header-bugs' => 'Foute',
	'toolbase-header-sitenotice' => 'Globale Toolserver-kennisgewings: $1',
	'toolbase-replag' => 'Bediener is agter met $1',
	'toolbase-replag-years' => 'jare',
	'toolbase-replag-months' => 'maande',
	'toolbase-replag-weeks' => 'weke',
	'toolbase-replag-days' => 'dae',
	'toolbase-replag-hours' => 'ure',
	'toolbase-replag-minutes' => 'minute',
	'toolbase-replag-seconds' => 'sekondes',
	'toolbase-footer-exectime' => 'Uitgevoer in $1 sekondes',
	'toolbase-footer-source' => 'Wys bronteks',
	'toolbase-footer-language' => 'Verander taal',
	'toolbase-footer-translate' => 'Vertaal',
	'toolbase-navigation' => 'Navigasie',
	'toolbase-navigation-homepage' => 'Tuisblad',
	'toolbase-navigation-user_id' => 'Vind gebruikers-ID',
	'toolbase-userid-submit' => 'Kry gebruikers-ID',
	'toolbase-userid-title' => "Vind 'n gebruikers-ID",
	'toolbase-userid-result' => 'Die gebruikersnommer vir <b>$1</b> op <a href="$3"><b>$3</b></a> is <b>$2</b>.',
	'toolbase-main-title' => 'Welkom!',
	'toolbase-main-content' => 'Welkom by X! se gereedskapsboks! Ons is steeds besig om die gereedskap na die <a href="$1">Symfony</a>-raamwerk om te skakel. Hierdie proses sal \'n rukkie neem, maar dit behoort nou te werk.

Vir \'n lys van gereedskap wat tans beskikbaar is, sien die kantbalk aan die regterkant.

Foute kan by <a href="$2">Google-kode</a> gerapporteer word.',
	'toolbase-main-404' => 'Lêer nie gevind nie',
	'toolbase-main-404-content' => 'Oeps! Geen bladsy is gevind nie! 

Maak seker dat die URL korrek ingesleutel is.
As u \'n skakel vanaf elders gevolg het, <a href="$1">rapporteer \'n fout</a>.
</ul>',
	'toolbase-form-wiki' => 'Wiki',
	'toolbase-error-nouser' => "$1 is nie 'n geldige gebruiker nie",
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'toolbase-header-bugs' => 'علل',
	'toolbase-header-twitter' => 'تويتر',
	'toolbase-replag-years' => 'سنة',
	'toolbase-replag-months' => 'شهر',
	'toolbase-replag-weeks' => 'أسبوع',
	'toolbase-replag-days' => 'يوم',
	'toolbase-replag-hours' => 'ساعة',
	'toolbase-replag-minutes' => 'دقيقة',
	'toolbase-replag-seconds' => 'ثانية',
	'toolbase-footer-source' => 'عرض المصدر',
	'toolbase-footer-language' => 'تغيير اللغة',
	'toolbase-footer-translate' => 'ترجمة',
	'toolbase-navigation' => 'إبحار',
	'toolbase-navigation-homepage' => 'الصفحة الرئيسية',
	'toolbase-navigation-api' => 'إيه بي آي',
	'toolbase-main-title' => 'مرحبا!',
	'toolbase-main-404' => 'الملف غير موجود',
	'toolbase-form-wiki' => 'ويكي',
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 * @author Jim-by
 */
$messages['be-tarask'] = array(
	'toolbase-header-title' => 'Інструмэнты X!',
	'toolbase-header-bugs' => 'Памылкі',
	'toolbase-header-sitenotice' => 'Глябальныя абвяшчэньні сайта сэрвэра інструмэнтаў: $1',
	'toolbase-replag' => 'Рэплікацыя базы зьвестак затрымліваецца на $1',
	'toolbase-replag-years' => 'гадоў',
	'toolbase-replag-months' => 'месяцы',
	'toolbase-replag-weeks' => 'тыдняў',
	'toolbase-replag-days' => 'дні',
	'toolbase-replag-hours' => 'гадзіны',
	'toolbase-replag-minutes' => 'хвілінаў',
	'toolbase-replag-seconds' => 'сэкунд',
	'toolbase-footer-exectime' => 'Выканана за $1 сэкундаў',
	'toolbase-footer-source' => 'Паказаць крынічны код',
	'toolbase-footer-language' => 'Зьмяніць мову',
	'toolbase-footer-translate' => 'Перакласьці',
	'toolbase-navigation' => 'Навігацыя',
	'toolbase-navigation-homepage' => 'Хатняя старонка',
	'toolbase-navigation-user_id' => 'Знайсьці ідэнтыфікатар удзельніка',
	'toolbase-userid-submit' => 'Атрымаць ідэнтыфікатар удзельніка',
	'toolbase-userid-title' => 'Знайсьці ідэнтыфікатар удзельніка',
	'toolbase-userid-result' => 'Ідэнтыфікатарам удзельніка <b>$1</b> на <a href="$3"><b>$3</b></a> зьяўляецца <b>$2</b>.',
	'toolbase-main-title' => 'Вітаем!',
	'toolbase-main-content' => 'Вітаем у інструмэнтах X!! Набор інструмэнтаў яшчэ знаходзіцца ў працэсе канвэртацыі на базу <a href="$1">Symfony</a>. Гэта працэс яшчэ працягнецца некаторы час, яле ўсё павінна працаваць ужо зараз. 

Для таго, каб убачыць сьпіс інструмэнтаў, якія цяпер даступныя ў гэтай базе, глядзіце панэль справа.

Пра памылкі можна паведамляць на <a href="$2">Google Code</a>.',
	'toolbase-main-404' => 'Файл ня знойдзены',
	'toolbase-main-404-content' => 'Старонка ня знойдзеная!

Упэўніцеся, што Вы ўвялі слушны URL-адрас.
Калі Вы перайшлі па нейкай спасылцы, калі ласка <a href="$1">паведаміце пра памылку</a>.
</ul>',
	'toolbase-form-wiki' => 'Вікі',
	'toolbase-error-nouser' => '«$1» не зьяўляецца слушнай назвай рахунку удзельніка',
	'toolbase-error-nowiki' => '$1.$2.org не зьяўляецца слушным адрасам вікі',
);

/** Breton (Brezhoneg)
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'toolbase-header-title' => 'Ostilh X! (BETA)',
	'toolbase-header-bugs' => 'Drein',
	'toolbase-replag-years' => 'bloavezhioù',
	'toolbase-replag-months' => 'mizioù',
	'toolbase-replag-weeks' => 'sizhunvezhioù',
	'toolbase-replag-days' => 'deizioù',
	'toolbase-replag-hours' => 'eurvezhioù',
	'toolbase-replag-minutes' => 'munutennoù',
	'toolbase-replag-seconds' => 'eilennoù',
	'toolbase-footer-source' => 'Sellet ouzh tarzh an destenn',
	'toolbase-footer-language' => 'Cheñch yezh',
	'toolbase-footer-translate' => 'Treiñ',
	'toolbase-navigation' => 'Merdeiñ',
	'toolbase-navigation-homepage' => 'Pajenn degemer',
	'toolbase-navigation-user_id' => 'Kavout ID an implijer',
	'toolbase-userid-title' => 'Kavout ID un implijer',
	'toolbase-main-title' => 'Degemer mat !',
	'toolbase-main-404' => "N'eo ket bet kavet ar restr",
	'toolbase-main-404-content' => "Opala ! N'eus bet kavet pajenn ebet !

Bezit sur hoc'h eus skrivet un URL difazi.
Mard oc'h deuet eus lec'h all dre ul liamm, kasit <a href=\"\$1\">ur c'hemenn evit un draen</a>.
</ul>",
	'toolbase-form-wiki' => 'Wiki',
	'toolbase-error-nouser' => '"$1" n’eo ket un implijer reizh.',
	'toolbase-error-nowiki' => "N'eo ket $1.$2.org ur wiki reizh",
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'toolbase-header-title' => 'X!s Tools',
	'toolbase-header-bugs' => 'Softwarefehler',
	'toolbase-header-sitenotice' => 'Zentrale Meldung des Toolservers: $1',
	'toolbase-replag' => 'Serververzögerung lag bei $1',
	'toolbase-replag-years' => 'Jahre',
	'toolbase-replag-months' => 'Monate',
	'toolbase-replag-weeks' => 'Wochen',
	'toolbase-replag-days' => 'Tage',
	'toolbase-replag-hours' => 'Stunden',
	'toolbase-replag-minutes' => 'Minuten',
	'toolbase-replag-seconds' => 'Sekunden',
	'toolbase-footer-exectime' => 'Binnen $1 Sekunden ausgeführt',
	'toolbase-footer-source' => 'Quellcode ansehen',
	'toolbase-footer-language' => 'Sprache wechseln',
	'toolbase-footer-translate' => 'Übersetzen',
	'toolbase-navigation' => 'Navigation',
	'toolbase-navigation-homepage' => 'Hauptseite',
	'toolbase-navigation-user_id' => 'Benutzerkennung suchen',
	'toolbase-userid-submit' => 'Benutzerkennung beantragen',
	'toolbase-userid-title' => 'Eine Benutzerkennung suchen',
	'toolbase-userid-result' => 'Die Benutzerkennung von <b>$1</b> auf <a href="$3"><b>$3</b></a> lautet <b>$2</b>.',
	'toolbase-main-title' => 'Willkommen!',
	'toolbase-main-content' => 'Willkommen bei X!s Tools!

Die Tools werden gerade für das <a href="$1">Symfony</a>-Framework lauffähig gemacht. Dies wird eine Weile dauern, allerdings sollten sie bereits jetzt funktionieren.

Eine Liste der Tools, die mit diesem Framework laufen, befindet sich in der rechten Seitenleiste.

Softwarefehler können bei <a href="$2">Google Code</a> gemeldet werden.',
	'toolbase-main-404' => 'Datei nicht gefunden',
	'toolbase-main-404-content' => 'Hoppla! Es wurde keine Webseite gefunden!

Es muss sichergestellt sein, dass die URL richtig angegeben wurde.
Sofern ein Link hierhergeführt hat, ist dies bitte <a href="$1">als Fehler zu melden</a>.
</ul>',
	'toolbase-form-wiki' => 'Wiki',
	'toolbase-error-nouser' => '$1 ist kein Name eines Benutzers',
);

/** Finnish (Suomi)
 * @author Crt
 */
$messages['fi'] = array(
	'toolbase-footer-exectime' => 'Suoritettu $1 sekunnissa',
	'toolbase-footer-source' => 'Näytä lähdekoodi',
	'toolbase-footer-translate' => 'Käännä',
	'toolbase-main-title' => 'Tervetuloa!',
	'toolbase-main-404' => 'Tiedostoa ei löydy',
	'toolbase-form-wiki' => 'Wiki',
);

/** French (Français)
 * @author Grondin
 * @author Hashar
 * @author Sherbrooke
 * @author X!
 * @author Zetud
 */
$messages['fr'] = array(
	'toolbase-header-title' => 'Outils X! (BETA)',
	'toolbase-header-bugs' => 'Bugs',
	'toolbase-header-sitenotice' => "Avis de site du serveur d'outils global : $1",
	'toolbase-replag' => 'Serveur en retard de $1',
	'toolbase-replag-years' => 'années',
	'toolbase-replag-months' => 'mois',
	'toolbase-replag-weeks' => 'semaines',
	'toolbase-replag-days' => 'jours',
	'toolbase-replag-hours' => 'heures',
	'toolbase-replag-minutes' => 'minutes',
	'toolbase-replag-seconds' => 'secondes',
	'toolbase-footer-exectime' => 'Complété en $1 {{PLURAL:$1|seconde|secondes}}',
	'toolbase-footer-source' => 'Voir le texte source',
	'toolbase-footer-language' => 'Changer de langue',
	'toolbase-footer-translate' => 'Traduire',
	'toolbase-navigation' => 'Navigation',
	'toolbase-navigation-homepage' => "Page d'accueil",
	'toolbase-navigation-user_id' => "Trouver l'ID utilisateur",
	'toolbase-userid-submit' => "Obtenir l'ID utilisateur",
	'toolbase-userid-title' => 'Trouver un ID utilisateur',
	'toolbase-userid-result' => 'L\'ID utilisateur pour <b>$1</b> sur <a href="$3"><b>$3</b></a> est <b>$2</b>.',
	'toolbase-main-title' => 'Bienvenue !',
	'toolbase-main-content' => 'Bienvenue sur la page d\'outils X ! Cette suite d\'outils est présentement en conversion vers le framework <a href="$1">Symfony</a>. Ce processus prendra un certain temps, mais les outils devraient fonctionner correctement dès maintenant. 

Pour obtenir une liste d\'outils qui sont fonctionnels sur ce framework, voir l\'encadré à droite. 

Les bugs peuvent être rapportés à <a href="$2">Google Code</a>.',
	'toolbase-main-404' => 'Fichier introuvable',
	'toolbase-main-404-content' => 'Oups ! Aucune page n\'a été trouvée !

Assurez-vous que vous avez tapé l\'URL correctement.
Si vous avez suivi un lien, veuillez <a href="$1">rapporter le bug</a>.
</ul>',
	'toolbase-form-wiki' => 'Wiki',
	'toolbase-error-nouser' => "$1 n'est pas un utilisateur valide",
	'toolbase-error-nowiki' => "$1.$2.org n'est pas un wiki valide",
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'toolbase-header-title' => 'Ferramentas de X! (BETA)',
	'toolbase-header-bugs' => 'Erros',
	'toolbase-header-sitenotice' => 'Anuncio global do servidor de ferramentas: $1',
	'toolbase-replag' => 'Servidor con atraso por $1',
	'toolbase-replag-years' => 'anos',
	'toolbase-replag-months' => 'meses',
	'toolbase-replag-weeks' => 'semanas',
	'toolbase-replag-days' => 'días',
	'toolbase-replag-hours' => 'horas',
	'toolbase-replag-minutes' => 'minutos',
	'toolbase-replag-seconds' => 'segundos',
	'toolbase-footer-exectime' => 'Executado en $1 segundos',
	'toolbase-footer-source' => 'Ver o código fonte',
	'toolbase-footer-language' => 'Cambiar a lingua',
	'toolbase-footer-translate' => 'Traducir',
	'toolbase-navigation' => 'Navegación',
	'toolbase-navigation-homepage' => 'Inicio',
	'toolbase-navigation-user_id' => 'Atopar o ID de usuario',
	'toolbase-userid-submit' => 'Obter o ID de usuario',
	'toolbase-userid-title' => 'Atopar o ID de usuario',
	'toolbase-userid-result' => 'O ID de usuario de <b>$1</b> en <a href="$3"><b>$3</b></a> é <b>$2</b>.',
	'toolbase-main-title' => 'Benvido!',
	'toolbase-main-404' => 'Non se atopou o ficheiro',
	'toolbase-form-wiki' => 'Wiki',
	'toolbase-error-nouser' => '"$1" non é un usuario válido',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'toolbase-header-title' => "X!'s Tools (BETA)",
	'toolbase-header-bugs' => 'Programowe zmylki',
	'toolbase-header-sitenotice' => 'Globalna zdźělenka toolserwera: $1',
	'toolbase-replag' => 'Serwer komdźeše so wo $1',
	'toolbase-replag-years' => 'lět',
	'toolbase-replag-months' => 'měsacow',
	'toolbase-replag-weeks' => 'njedźelow',
	'toolbase-replag-days' => 'dnjow',
	'toolbase-replag-hours' => 'hodźin',
	'toolbase-replag-minutes' => 'mjeńšin',
	'toolbase-replag-seconds' => 'sekundow',
	'toolbase-footer-exectime' => 'Wob $1 sekundow wuwjedźeny',
	'toolbase-footer-source' => 'Žórło sej wobhladać',
	'toolbase-footer-language' => 'Rěč změnić',
	'toolbase-footer-translate' => 'Přełožić',
	'toolbase-navigation' => 'Nawigacija',
	'toolbase-navigation-homepage' => 'Startowa strona',
	'toolbase-navigation-user_id' => 'Wužiwarski ID pytać',
	'toolbase-userid-submit' => 'Wužiwarski ID wobstarać',
	'toolbase-userid-title' => 'Wužiwarski ID pytać',
	'toolbase-userid-result' => 'Wužiwarski ID za <b>$1</b> na <a href="$3"><b>$3</b></a> je <b>$2</b>.',
	'toolbase-main-title' => 'Witaj!',
	'toolbase-main-content' => 'Witaj k X!\'s tools! Gratowy pakćik so runje hišće do frameworka <a href="$1">Symfony</a> konwertuje. Tutón proces budźe chwilku trać, ale měł hižo nětko fungować.

Za lisćinu gratow, kotrež hižo z tutym frameworkom funguja, hlej bóčnicu naprawo.

Programowe zmylki móžeš k <a href="$2">Google Code</a> zdźělić.',
	'toolbase-main-404' => 'Dataja njenamakana',
	'toolbase-main-404-content' => 'Ow jej! Žane websydło namakane!

Skontroluj, hač sy URL korektnje zapisał.
Jeli wotkaz je će wot něhdźe sem wjedł, <a href="$1">zdźěl prošu programowy zmylk</a>.
</ul>',
	'toolbase-form-wiki' => 'Wiki',
	'toolbase-error-nouser' => '$1 płaćiwy wužiwar njeje.',
	'toolbase-error-nowiki' => '$1.$2.org płaćiwy wiki njeje',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'toolbase-header-title' => 'Instrumentos de X!',
	'toolbase-header-bugs' => 'Faltas',
	'toolbase-header-sitenotice' => 'Notitia global de Toolserver: $1',
	'toolbase-replag' => 'Servitor retardate $1',
	'toolbase-replag-years' => 'annos',
	'toolbase-replag-months' => 'menses',
	'toolbase-replag-weeks' => 'septimanas',
	'toolbase-replag-days' => 'dies',
	'toolbase-replag-hours' => 'horas',
	'toolbase-replag-minutes' => 'minutas',
	'toolbase-replag-seconds' => 'secundas',
	'toolbase-footer-exectime' => 'Executate in $1 secundas',
	'toolbase-footer-source' => 'Vider codice-fonte',
	'toolbase-footer-language' => 'Cambiar de lingua',
	'toolbase-footer-translate' => 'Traducer',
	'toolbase-navigation' => 'Navigation',
	'toolbase-navigation-homepage' => 'Pagina initial',
	'toolbase-navigation-user_id' => 'Cercar ID de usator',
	'toolbase-userid-submit' => 'Obtener ID',
	'toolbase-userid-title' => 'Cercar le ID de un usator',
	'toolbase-userid-result' => 'Le ID del usator <b>$1</b> in <a href="$3"><b>$3</b></a> es <b>$2</b>.',
	'toolbase-main-title' => 'Benvenite!',
	'toolbase-main-content' => 'Benvenite al instrumentos de X!. Le instrumentario es ancora in le processo de conversion al quadro <a href="$1">Symfony</a>. Iste processo durara un tempore, ma deberea functionar ora.

Pro un lista de instrumentos que ora functiona sur iste quadro, vide le barra lateral al dextra.

Faltas pote esser reportate a <a href="$2">Google Code</a>.',
	'toolbase-main-404' => 'File non trovate',
	'toolbase-main-404-content' => 'Ups! Nulle pagina esseva trovate!

Assecura te de haber entrate le URL correctemente.
Si un ligamine te ha ducite hic, per favor <a href="$1">reporta un falta</a>.
</ul>',
	'toolbase-form-wiki' => 'Wiki',
	'toolbase-error-nouser' => '"$1" non es un usator valide',
);

/** Indonesian (Bahasa Indonesia)
 * @author IvanLanin
 */
$messages['id'] = array(
	'toolbase-header-title' => 'Alat X! (BETA)',
	'toolbase-header-bugs' => 'Bug',
	'toolbase-header-sitenotice' => 'Pesan situs global Toolserver: $1',
	'toolbase-replag' => 'Server tertinggal selama $1',
	'toolbase-replag-years' => 'tahun',
	'toolbase-replag-months' => 'bulan',
	'toolbase-replag-weeks' => 'pekan',
	'toolbase-replag-days' => 'hari',
	'toolbase-replag-hours' => 'jam',
	'toolbase-replag-minutes' => 'menit',
	'toolbase-replag-seconds' => 'detik',
	'toolbase-footer-exectime' => 'Dilaksanakan dalam $1 detik',
	'toolbase-footer-source' => 'Lihat sumber',
	'toolbase-footer-language' => 'Ganti bahasa',
	'toolbase-footer-translate' => 'Terjemahkan',
	'toolbase-navigation' => 'Navigasi',
	'toolbase-navigation-homepage' => 'Beranda',
	'toolbase-navigation-user_id' => 'Cari ID pengguna',
	'toolbase-userid-submit' => 'Cari ID pengguna',
	'toolbase-userid-title' => 'Cari suatu ID pengguna',
	'toolbase-userid-result' => 'ID pengguna untuk <b>$1</b> pada <a href="$3"><b>$3</b></a> adalah <b>$2</b>.',
	'toolbase-main-title' => 'Selamat datang!',
	'toolbase-main-content' => 'Selamat datang di alat X! Perangkat alat ini masih dalam proses yang konversi ke kerangka kerja <a href="$1">Symfony</a>. Proses ini memerlukan waktu, tetapi sekarang telah dapat dipakai.

Untuk daftar alat yang saat ini berjalan pada kerangka kerja ini, lihat bilah sisi di sebelah kanan.

Bug dapat dilaporkan ke <a href="$2">Google Code</a>.',
	'toolbase-main-404' => 'Berkas tidak ditemukan.',
	'toolbase-main-404-content' => 'Ups! Halaman tidak ditemukan! 

Pastikan bahwa Anda mengetik URL dengan benar.
Jika Anda mengikuti tautan dari tempat lain, silahkan <a href="$1">laporkan bug</a>.
</ul>',
	'toolbase-form-wiki' => 'Wiki',
	'toolbase-error-nouser' => '$1 bukan pengguna yang sah',
	'toolbase-error-nowiki' => '$1.$2.org bukan wiki yang sah',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'toolbase-header-bugs' => 'Softwarefeeler (Bugs)',
	'toolbase-replag-years' => 'Joer',
	'toolbase-replag-months' => 'Méint',
	'toolbase-replag-weeks' => 'Wochen',
	'toolbase-replag-days' => 'Deeg',
	'toolbase-replag-hours' => 'Stonnen',
	'toolbase-replag-minutes' => 'Minutten',
	'toolbase-replag-seconds' => 'Sekonnen',
	'toolbase-footer-language' => 'Sprooch wiesselen',
	'toolbase-footer-translate' => 'Iwwersetzen',
	'toolbase-navigation' => 'Navigatioun',
	'toolbase-main-404' => 'Fichier gouf net fonnt',
	'toolbase-form-wiki' => 'Wiki',
	'toolbase-error-nouser' => '"$1" ass kee gültege Benotzernumm',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'toolbase-header-title' => 'Алатки на X!',
	'toolbase-header-bugs' => 'Грешки',
	'toolbase-header-twitter' => 'Twitter',
	'toolbase-header-sitenotice' => 'Глобално известување на Toolserver: $1',
	'toolbase-replag' => 'Опслужувачот изостанува $1',
	'toolbase-replag-years' => 'години',
	'toolbase-replag-months' => 'месеци',
	'toolbase-replag-weeks' => 'недели',
	'toolbase-replag-days' => 'дена',
	'toolbase-replag-hours' => 'часа',
	'toolbase-replag-minutes' => 'минути',
	'toolbase-replag-seconds' => 'секунди',
	'toolbase-footer-exectime' => 'Извршено за $1 секунди',
	'toolbase-footer-source' => 'Види извор',
	'toolbase-footer-language' => 'Смени јазик',
	'toolbase-footer-translate' => 'Преведи',
	'toolbase-navigation' => 'Навигација',
	'toolbase-navigation-homepage' => 'Домашна страница',
	'toolbase-navigation-api' => 'API',
	'toolbase-navigation-user_id' => 'Пронајди кориснички ID',
	'toolbase-userid-submit' => 'Дај кориснички ID',
	'toolbase-userid-title' => 'Пронаоѓање на кориснички ID',
	'toolbase-userid-result' => 'Корисничкиот ID за <b>$1</b> на <a href="$3"><b>$3</b></a> е <b>$2</b>.',
	'toolbase-main-title' => 'Добредојдовте!',
	'toolbase-main-content' => 'Добредојдовте на Алатките на X!! Овој комплет алатки е сè уште во фаза на претворање во склопот на <a href="$1">Symfony</a>. Оваа постапка може да потрае, но веќе би требало да работи. 

Ако сакате да погледате список на алатките што моментално работат во овој склоп, погледајте во алатникот десно.

Грешките можете да ги пријавувате на <a href="$2">Google Code</a>.',
	'toolbase-main-404' => 'Податотеката не е пронајдена',
	'toolbase-main-404-content' => 'Упс! Не пронајдов ниедна страница!

Проверете дали исправно сте ја внеле URL-адресата.
Ако тука дојдовте преку врска од некое друго место, тогаш <a href="$1">пријавете ја оваа грешка</a>.
</ul>',
	'toolbase-form-wiki' => 'Вики',
	'toolbase-error-nouser' => 'Нема корисник по име $1',
	'toolbase-error-nowiki' => '$1.$2.org не претставува важечко вики',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'toolbase-header-title' => "Hulpprogramma's van X (beta)",
	'toolbase-header-bugs' => 'Bugs',
	'toolbase-header-sitenotice' => 'Globale sitenotice van toolserver: $1',
	'toolbase-replag' => 'Synchronisatieachterstand: $1',
	'toolbase-replag-years' => 'jaar',
	'toolbase-replag-months' => 'maanden',
	'toolbase-replag-weeks' => 'weken',
	'toolbase-replag-days' => 'dagen',
	'toolbase-replag-hours' => 'uur',
	'toolbase-replag-minutes' => 'minuten',
	'toolbase-replag-seconds' => 'seconden',
	'toolbase-footer-exectime' => 'Uitgevoerd in $1 seconden',
	'toolbase-footer-source' => 'Broncode bekijken',
	'toolbase-footer-language' => 'Taal wijzigen',
	'toolbase-footer-translate' => 'Vertalen',
	'toolbase-navigation' => 'Navigatie',
	'toolbase-navigation-homepage' => 'Startpagina',
	'toolbase-navigation-user_id' => 'Gebruikersnummer zoeken',
	'toolbase-userid-submit' => 'Gebruikersnummer ophalen',
	'toolbase-userid-title' => 'Gebruikersnummer zoeken',
	'toolbase-userid-result' => 'Het gebruikersnummer voor <b>$1</b> op <a href="$3"><b>$3</b></a> is <b>$2</b>.',
	'toolbase-main-title' => 'Welkom!',
	'toolbase-main-content' => 'Welkom bij de hulpprogramma\'s van X. Deze verzameling hulpprogramma\'s wordt nog steeds omgezet naar het framework <a href="$1">Symfony</a>. Dit gaat nog enige tijd duren, maar alle programma\'s zouden nu moeten werken.

In de menubalk aan de rechterzijde ziet u een lijst met programma\'s die nu al van het framework gebruik maken.

U kunt problemen melden in <a href="$2">Google Code</a>.',
	'toolbase-main-404' => 'Bestand niet gevonden',
	'toolbase-main-404-content' => 'De pagina is niet gevonden.

Zorg dat u een correcte URL hebt ingevoerd.
Als u een verwijzing ergens anders vandaan hebt gevolgd, <a href="$1">meld dan alstublieft een probleem aan</a>.
</ul>',
	'toolbase-form-wiki' => 'Wiki',
	'toolbase-error-nouser' => '$1 is geen geldige gebruiker',
	'toolbase-error-nowiki' => '$1.$2.org is geen geldige wiki',
);

/** Polish (Polski)
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'toolbase-header-title' => 'Narzędzia X! (BETA)',
	'toolbase-header-bugs' => 'Błędy',
	'toolbase-header-sitenotice' => 'Globalny komunikat serwera narzędziowego: $1',
	'toolbase-replag' => 'Serwer jest opóźniony o $1',
	'toolbase-replag-years' => 'lat',
	'toolbase-replag-months' => 'miesięcy',
	'toolbase-replag-weeks' => 'tygodni',
	'toolbase-replag-days' => 'dni',
	'toolbase-replag-hours' => 'godzin',
	'toolbase-replag-minutes' => 'minut',
	'toolbase-replag-seconds' => 'sekund',
	'toolbase-footer-exectime' => 'Wykonano w $1 {{PLURAL:$1|sekundę|sekundy|sekund}}',
	'toolbase-footer-source' => 'Tekst źródłowy',
	'toolbase-footer-language' => 'Zmień język',
	'toolbase-footer-translate' => 'Przetłumacz',
	'toolbase-navigation' => 'Nawigacja',
	'toolbase-navigation-homepage' => 'Strona domowa',
	'toolbase-navigation-user_id' => 'Znajdź identyfikator użytkownika',
	'toolbase-userid-submit' => 'Pobierz identyfikator użytkownika',
	'toolbase-userid-title' => 'Znajdź identyfikator użytkownika',
	'toolbase-userid-result' => 'Identyfikator użytkownika dla <b>$1</b> na <a href="$3"><b>$3</b></a> to <b>$2</b>.',
	'toolbase-main-title' => 'Witaj!',
	'toolbase-main-content' => 'Witamy w zestawie narzędzi X! Pakiet narzędzi jest nadal konwertowany do pracy w ramach <href="$1">Symfony</a>. Proces ten jest czasochłonny, ale narzędzia powinny działać już teraz.

Lista narzędzi, które są obecnie uruchomione dostępna jest w pasku bocznym po prawej.

Błędy można zgłaszać poprzez <a href="$2">Google Code</a>.',
	'toolbase-main-404' => 'Nie odnaleziono pliku',
	'toolbase-main-404-content' => 'Oj! Nie odnaleziono strony!

Upewnij się, że wpisałeś poprawny adres URL.
Jeśli dotarłeś tu klikając jakiś link <a href="$1">zgłoś błąd</a>.
</ul>',
	'toolbase-form-wiki' => 'Wiki',
	'toolbase-error-nouser' => '„$1” nie jest poprawną nazwą użytkownika',
	'toolbase-error-nowiki' => '$1.$2.org nie jest poprawnym adresem wiki',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'toolbase-replag-years' => 'సంవత్సరాలు',
	'toolbase-replag-months' => 'నెలలు',
	'toolbase-replag-weeks' => 'వారాలు',
	'toolbase-replag-days' => 'రోజులు',
	'toolbase-replag-hours' => 'గంటలు',
	'toolbase-replag-minutes' => 'నిమిషాలు',
	'toolbase-replag-seconds' => 'క్షణాలు',
	'toolbase-main-title' => 'స్వాగతం!',
	'toolbase-form-wiki' => 'వికీ',
);

/** Ukrainian (Українська)
 * @author Тест
 */
$messages['uk'] = array(
	'toolbase-header-bugs' => 'Помилки',
	'toolbase-replag-years' => 'роки',
	'toolbase-replag-months' => 'місяці',
	'toolbase-replag-weeks' => 'тижня',
	'toolbase-replag-days' => 'дні',
	'toolbase-replag-hours' => 'години',
	'toolbase-replag-minutes' => 'хвилин',
	'toolbase-replag-seconds' => 'секунд',
	'toolbase-footer-source' => 'Переглянути код',
	'toolbase-footer-language' => 'Змінити мову',
	'toolbase-footer-translate' => 'Перекласти',
	'toolbase-navigation' => 'Навігація',
	'toolbase-navigation-homepage' => 'Домашня сторінка',
	'toolbase-main-title' => 'Ласкаво просимо!',
	'toolbase-main-404' => 'Файл не знайдено',
	'toolbase-main-404-content' => 'Отакої! Сторінку не знайдено!

Переконайтеся, що ви набрали URL правильно.
Якщо ви перейшли за посиланням звідки-небудь, будь ласка, <a href="$1">повідомте про помилку</a>.
</ul>',
	'toolbase-form-wiki' => 'Вікі',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'toolbase-header-title' => 'Các công cụ của X (BETA)',
	'toolbase-header-bugs' => 'Lỗi',
	'toolbase-header-sitenotice' => 'Thông báo toàn cầu Toolserver: $1',
	'toolbase-replag' => 'Máy chủ chậm $1',
	'toolbase-replag-years' => 'năm',
	'toolbase-replag-months' => 'tháng',
	'toolbase-replag-weeks' => 'tuần',
	'toolbase-replag-days' => 'ngày',
	'toolbase-replag-hours' => 'giờ',
	'toolbase-replag-minutes' => 'phút',
	'toolbase-replag-seconds' => 'giây',
	'toolbase-footer-exectime' => 'Thực hiện trong $1 giây',
	'toolbase-footer-source' => 'Xem mã nguồn',
	'toolbase-footer-language' => 'Thay đổi ngôn ngữ',
	'toolbase-footer-translate' => 'Biên dịch',
	'toolbase-navigation' => 'Xem nhanh',
	'toolbase-navigation-homepage' => 'Trang đầu',
	'toolbase-navigation-user_id' => 'Tìm ID người dùng',
	'toolbase-userid-submit' => 'Tìm ID người dùng',
	'toolbase-userid-title' => 'Tìm ID người dùng',
	'toolbase-userid-result' => 'ID của người dùng <b>$1</b> tại <a href="$3"><b>$3</b></a> là <b>$2</b>.',
	'toolbase-main-title' => 'Hoan nghênh!',
	'toolbase-main-content' => 'Hoan nghênh bạn đã đến với các công cụ của X! Bộ công cụ này vẫn đang được chuyển qua khuôn khổ <a href="$1">Symfony</a>. Quá trình này chưa xong nhưng có lẽ đã hoạt động.

Xem các công cụ đang hoạt động tốt trên khuôn khổ này trong thanh bên.

Có thể báo cáo lỗi tại <a href="$2">Google Code</a>.',
	'toolbase-main-404' => 'Không tìm thấy tập tin',
	'toolbase-main-404-content' => 'Oái! Không tìm thấy tập tin!

Hãy xem lại URL có đúng hay không.
Nếu bạn theo một liên kết từ trang khác, xin vui lòng <a href="$1">báo cáo lỗi</a>.
</ul>',
	'toolbase-form-wiki' => 'Wiki',
	'toolbase-error-nouser' => '“$1” không phải là người dùng hợp lệ',
	'toolbase-error-nowiki' => '“$1.$2.org” không phải là wiki hợp lệ',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Hydra
 */
$messages['zh-hans'] = array(
	'toolbase-replag-years' => '年',
	'toolbase-replag-months' => '月',
	'toolbase-replag-weeks' => '周',
	'toolbase-replag-days' => '天',
	'toolbase-replag-hours' => '小时',
	'toolbase-replag-minutes' => '分钟',
	'toolbase-replag-seconds' => '秒',
	'toolbase-form-wiki' => '维基',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Mark85296341
 */
$messages['zh-hant'] = array(
	'toolbase-replag-seconds' => '秒',
	'toolbase-footer-source' => '檢視原始碼',
	'toolbase-navigation' => '導覽',
	'toolbase-navigation-homepage' => '首頁',
	'toolbase-navigation-user_id' => '尋找使用者 ID',
	'toolbase-userid-submit' => '取得使用者 ID',
	'toolbase-userid-title' => '尋找使用者 ID',
	'toolbase-main-title' => '歡迎！',
	'toolbase-main-404' => '找不到檔案',
	'toolbase-form-wiki' => 'Wiki',
);

