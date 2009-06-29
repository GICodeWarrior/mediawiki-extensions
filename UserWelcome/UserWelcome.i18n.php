<?php
/**
 * Internationalization file for UserWelcome extension.
 *
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Wikia, Inc.
 */
$messages['en'] = array(
	'userwelcome-desc' => 'Adds <tt>&lt;welcomeUser&gt;</tt> tag to display user-specific social info to logged-in users',
	'mp-userlevels-link' => 'User levels', // This is the help page...e.g. English default is Help:User Levels -- you can define a new help page with this msg.
	'mp-welcome-upload' => 'Upload',
	'mp-welcome-edit' => 'Edit',
	'mp-welcome-points' => '$1 {{PLURAL:$1|point|points}}',
	'mp-welcome-needed-points' => 'To advance to <b><a href="$1">$2</a></b> earn <i>$3</i> more {{PLURAL:$3|point|points}}!',
	'mp-welcome-logged-in' => 'Hello $1',
	'mp-requests-title' => 'Requests',
	'mp-requests-message' => 'You have the following requests.', // FIXME: should support plural.
	'mp-request-new-message' => 'new message',
	'mp-request-new-award' => '$1 new {{PLURAL:$1|award|awards}}',
	'mp-request-new-gift' => '$1 new {{PLURAL:$1|gift|gifts}}',
	'mp-request-new-foe' => '$1 new {{PLURAL:$1|foe|foes}}',
	'mp-request-new-friend' => '$1 new {{PLURAL:$1|friend|friends}}',
);

/** Message documentation (Message documentation)
 * @author Purodha
 * @author Siebrand
 */
$messages['qqq'] = array(
	'userwelcome-desc' => 'Short description of the extension.
Shown in [[Special:Version]].
{{doc-important|Do not translate tags names, and links targets.}}',
	'mp-userlevels-link' => 'This is the help page...e.g. English default is Help:User Levels. You can define a new help page with this message.',
);

/** Amharic (አማርኛ)
 * @author Codex Sinaiticus
 */
$messages['am'] = array(
	'mp-welcome-logged-in' => 'ጤና ይስጥልኝ፣ $1',
	'mp-request-new-message' => 'አዲስ መልዕክት',
	'mp-request-new-award' => '$1 አዲስ {{PLURAL:$1|ሽልማት|ሽልማቶች}}',
	'mp-request-new-gift' => '$1 አዲስ {{PLURAL:$1|ስጦታ|ስጦታዎች}}',
	'mp-request-new-foe' => '$1 አዲስ {{PLURAL:$1|ጠላት|ጠላቶች}}',
	'mp-request-new-friend' => '$1 አዲስ {{PLURAL:$1|ወዳጅ|ወዳጆች}}',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'mp-welcome-edit' => 'Editar',
);

/** Arabic (العربية)
 * @author Meno25
 * @author OsamaK
 */
$messages['ar'] = array(
	'userwelcome-desc' => 'يضيف وسم <tt>&lt;welcomeUser&gt;</tt> لعرض معلومات اجتماعية خاصة بالمستخدم للمستخدمين المسجلين',
	'mp-userlevels-link' => 'مستويات المستخدم',
	'mp-welcome-upload' => 'رفع',
	'mp-welcome-edit' => 'عدل',
	'mp-welcome-points' => '{{PLURAL:$1|لا نقاط|نقطة واحدة|نقطتان|$1 نقاط|$1 نقطة}}',
	'mp-welcome-needed-points' => 'للتقدم <b><a href="$1">$2</a></b> لاستحقاق {{PLURAL:$3||نقطة واحدة إضافية|نقطتان إضافيتان|<i>$3</i> نقاط إضافية|<i>$3</i> نقطة إضافية}}!',
	'mp-welcome-logged-in' => 'مرحبا $1',
	'mp-requests-title' => 'طلبات',
	'mp-requests-message' => 'لديك الطلبات التالية.',
	'mp-request-new-message' => 'رسالة جديدة',
	'mp-request-new-award' => '{{PLURAL:$1|لا جوائز جديدة|جائزة جديدة|جائزتان جديدتان|$1 جوائز جديدة|$1 جائزة جديدة}}',
	'mp-request-new-gift' => '{{PLURAL:$1|لا منح جديدة|منحة جديدة|منحتان جديدتان|$1 منح جديدة|$1 منحة جديدة}}',
	'mp-request-new-foe' => '{{PLURAL:$1|لا أعداء جدد|عدو جديد|عدوّان جديدان|$1 أعداء جدد|$1 عدوًا جديدًا|$1 عدو جديد}}',
	'mp-request-new-friend' => '{{PLURAL:$1|لا أصدقاء جدد|صديق جديد|صديقان جديدان|$1 أصدقاء جدد|$1 صديقًا جديدًا|$1 صديق جديد}}',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Ghaly
 * @author Meno25
 */
$messages['arz'] = array(
	'userwelcome-desc' => 'يضيف وسم <tt>&lt;welcomeUser&gt;</tt> لعرض معلومات اجتماعية خاصة باليوزر لليوزرز المسجلين',
	'mp-userlevels-link' => 'مستويات اليوزر',
	'mp-welcome-upload' => 'رفع',
	'mp-welcome-edit' => 'عدل',
	'mp-welcome-points' => '$1 {{PLURAL:$1|نقطة|نقطة}}',
	'mp-welcome-needed-points' => 'للتقدم ل <b><a href="$1">$2</a></b> احصل على <i>$3</i> {{PLURAL:$3|نقطه|نقط}} اكتر!',
	'mp-welcome-logged-in' => 'مرحبا $1',
	'mp-requests-title' => 'طلبات',
	'mp-requests-message' => 'لديك الطلبات التالية.',
	'mp-request-new-message' => 'رسالة جديدة',
	'mp-request-new-award' => '$1 {{PLURAL:$1|جائزة|جائزة}} جديدة',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|منحة|منحة}} جديدة',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|عدو|عدو}} جديد',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|صديق|صديق}} جديد',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 * @author Red Winged Duck
 */
$messages['be-tarask'] = array(
	'userwelcome-desc' => 'Дадае тэг <tt>&lt;welcomeUser&gt;</tt>, каб паказваць сацыяльную інфармацыю пра ўдзельніка іншым зарэгістраваным удзельнікам',
	'mp-userlevels-link' => 'Узроўні ўдзельніка',
	'mp-welcome-upload' => 'Загрузіць',
	'mp-welcome-edit' => 'Рэдагаваць',
	'mp-welcome-points' => '$1 {{PLURAL:$1|пункт|пункты|пунктаў}}',
	'mp-welcome-needed-points' => 'Каб узьняцца да <b><a href="$1">$2</a></b> неабходна здабыць яшчэ <i>$3</i>  {{PLURAL:$3|пункт|пункты|пунктаў}}!',
	'mp-welcome-logged-in' => 'Прывітаньне $1',
	'mp-requests-title' => 'Запыты',
	'mp-requests-message' => 'Вы атрымалі наступныя запыты.',
	'mp-request-new-message' => 'новае паведамленьне',
	'mp-request-new-award' => '$1 {{PLURAL:$1|новая ўзнагарода|новыя ўзнагароды|новых узнагародаў}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|новы падарунак|новыя падарункі|новых падарункаў}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|новы вораг|новыя ворагі|новых ворагаў}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|новы сябар|новыя сябры|новых сябраў}}',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'userwelcome-desc' => 'Добавя етикет <tt>&lt;welcomeUser&gt;</tt> за показване на специфична социална потребителска информация за влезлите потребители',
	'mp-userlevels-link' => 'Потребителски рангове',
	'mp-welcome-upload' => 'Качване',
	'mp-welcome-edit' => 'Редактиране',
	'mp-welcome-points' => '$1 {{PLURAL:$1|точка|точки}}',
	'mp-welcome-logged-in' => 'Здрасти $1',
	'mp-requests-title' => 'Заявки',
	'mp-requests-message' => 'Имате следните заявки.',
	'mp-request-new-message' => 'ново съобщение',
	'mp-request-new-award' => '$1 {{PLURAL:$1|нова награда|нови награди}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|нов подарък|нови подаръка}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|нов неприятел|нови неприятели}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|нов приятел|нови приятели}}',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'mp-welcome-logged-in' => 'Salud $1',
	'mp-requests-title' => 'Goulennoù',
	'mp-requests-message' => 'Setu aze ho koulennoù',
	'mp-request-new-message' => 'Kemennadenn nevez',
	'mp-request-new-award' => '$1 priz {{PLURAL:$1|nevez|nevez}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|prof|prof}} nevez',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'userwelcome-desc' => 'Dodaje <tt>&lt;dobrodoslicaKorisnik&gt;</tt> posebnu oznaku logiranim korisnicima sa posebnim socijalnim informacijama',
	'mp-userlevels-link' => 'Nivoi korisnika',
	'mp-welcome-upload' => 'Postavljanje',
	'mp-welcome-edit' => 'Izmjena',
	'mp-welcome-points' => '$1 {{PLURAL:$1|bod|boda|bodova}}',
	'mp-welcome-needed-points' => 'Da bi ste napredovali do <b><a href="$1">$2</a></b> trebate još {{PLURAL:$3|$3 bod|$3 boda|$3 bodova}}!',
	'mp-welcome-logged-in' => 'Zdravo $1',
	'mp-requests-title' => 'Zahtjevi',
	'mp-requests-message' => 'Imate slijedeće zahtjeve.',
	'mp-request-new-message' => 'nova poruka',
	'mp-request-new-award' => '$1 {{PLURAL:$1|nova nagrada|nove nagrade|novih nagrada}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|novi poklon|nova poklona|novih poklona}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|novi neprijatelj|nova neprijatelja|novih neprijatelja}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|novi prijatelja|nova prijatelja|novih prijatelja}}',
);

/** Catalan (Català)
 * @author Solde
 */
$messages['ca'] = array(
	'mp-welcome-edit' => 'Edita',
	'mp-welcome-logged-in' => 'Hola $1',
	'mp-request-new-message' => 'nou missatge',
);

/** Czech (Česky)
 * @author Matěj Grabovský
 */
$messages['cs'] = array(
	'userwelcome-desc' => 'Přidává značku <tt>&lt;welcomeUser&gt;</tt> pro zobrazování sociálních informací specifických pro uživatele (pro přihlášené uživatele)',
	'mp-userlevels-link' => 'Urovně uživatelů',
	'mp-welcome-upload' => 'Nahrát soubor',
	'mp-welcome-edit' => 'Upravit',
	'mp-welcome-points' => '$1 {{PLURAL:$1|bod|body|bodů}}',
	'mp-welcome-needed-points' => 'Abyste postoupili na <b><a href="$1">$2</a></b>, udělejte ještě <i>$3</i> {{PLURAL:$3|bod|body|bodů}}!',
	'mp-welcome-logged-in' => 'Ahoj $1',
	'mp-requests-title' => 'Požadavky',
	'mp-requests-message' => 'Máte následující požadavky.',
	'mp-request-new-message' => 'nová zpráva',
	'mp-request-new-award' => '$1 {{PLURAL:$1|nové ocenění|nová ocenění|nových ocenění}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|nový dárek|nové dárky|nových dárků}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|nový nepřítel|noví nepřátelé|nových nepřátel}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|nový přítel|noví přátelé|nových přátel}}',
);

/** German (Deutsch)
 * @author ChrisiPK
 * @author MF-Warburg
 * @author Melancholie
 * @author Revolus
 */
$messages['de'] = array(
	'userwelcome-desc' => 'Fügt ein <tt>&lt;welcomeUser&gt;</tt>-Tag hinzu, mit dem man benutzerspezifische soziale Informationen eingeloggten Benutzern zeigen kann',
	'mp-userlevels-link' => 'Benutzerebenen',
	'mp-welcome-upload' => 'Hochladen',
	'mp-welcome-edit' => 'Bearbeiten',
	'mp-welcome-points' => '$1 {{PLURAL:$1|Punkt|Punkte}}',
	'mp-welcome-needed-points' => 'Um <b><a href="$1">$2</a></b> zu werden musst du noch <i>$3</i> {{PLURAL:$3|weiteren Punkt|weitere Punkte}} verdienen!',
	'mp-welcome-logged-in' => 'Hallo $1',
	'mp-requests-title' => 'Anfragen',
	'mp-requests-message' => 'Du hast die folgenden Anfragen.',
	'mp-request-new-message' => 'neue Nachricht',
	'mp-request-new-award' => '$1 neue {{PLURAL:$1|Auszeichnung|Auszeichnungen}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|neues Geschenk|neue Geschenke}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|neuen Gegner/Feind|neue Gegner/Feinde}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|neuen Freund|neue Freunde}}',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'userwelcome-desc' => 'Pśidawa toflicku <tt>&lt;welcomeUser&gt;</tt> za zwobraznjenje wužywarjeju specifiske socialne informacije pśizjawjonych wužywarjow',
	'mp-userlevels-link' => 'Wužywarske rowniny',
	'mp-welcome-upload' => 'Nagraś',
	'mp-welcome-edit' => 'Wobźěłaś',
	'mp-welcome-points' => '$1 {{PLURAL:$1|dypk|dypka|dypki|dypkow}}',
	'mp-welcome-needed-points' => 'Aby póstupował k <b><a href="$1">$2</a></b>, zasłuž <i>$3</i> {{PLURAL:$3|dalšny dypk|dalšnej dypka|dalšne dypki|dalšnych dypkow}}!',
	'mp-welcome-logged-in' => 'Halo $1',
	'mp-requests-title' => 'Póžedanja',
	'mp-requests-message' => 'Maš slědujuce póžedanja.',
	'mp-request-new-message' => 'nowa powěsć',
	'mp-request-new-award' => '$1 {{PLURAL:$1|nowe myto|nowej myśe|nowe myta|nowych mytow}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|nowy dar|nowej dara|nowe dary|nowych darow}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|nowy pśeśiwnik|nowej pśeśiwnika|nowe pśeśiwniki|nowych pśeśiwnikow}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|nowy pśijaśel|nowej pśijaśela|nowe pśijaśele|nowych pśijaśelow}}',
);

/** Ewe (Eʋegbe)
 * @author Natsubee
 */
$messages['ee'] = array(
	'mp-requests-title' => 'Babiawo',
	'mp-request-new-message' => 'du yeye',
);

/** Greek (Ελληνικά)
 * @author Consta
 * @author Omnipaedista
 */
$messages['el'] = array(
	'mp-userlevels-link' => 'Επίπεδα χρήστη',
	'mp-welcome-upload' => 'Επιφόρτωση',
	'mp-welcome-edit' => 'Επεξεργασία',
	'mp-welcome-points' => '$1 {{PLURAL:$1|βαθμός|βαθμοί}}',
	'mp-welcome-logged-in' => 'Γεια σου $1',
	'mp-requests-title' => 'Αιτήματα',
	'mp-requests-message' => 'Έχετε τα ακόλουθα αιτήματα.',
	'mp-request-new-message' => 'νέα μηνύματα',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'mp-userlevels-link' => 'Uzulaj niveloj',
	'mp-welcome-upload' => 'Alŝuti',
	'mp-welcome-edit' => 'Redakti',
	'mp-welcome-points' => '$1 poentoj',
	'mp-welcome-needed-points' => 'Pliniveligi al <b><a href="$1">$2</a></b> gajnu <i>$3</i> {{PLURAL:$3|plian poenton|pliajn poentojn}}!',
	'mp-welcome-logged-in' => 'Saluton $1',
	'mp-requests-title' => 'Petoj',
	'mp-requests-message' => 'Vi havas la jenajn petojn.',
	'mp-request-new-message' => 'nova mesaĝo',
	'mp-request-new-award' => '$1 {{PLURAL:$1|nova premio|novaj premioj}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|nova donaco|novaj donacoj}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|nova malamiko|novaj malamikoj}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|nova amiko|novaj amikoj}}',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Fluence
 * @author Imre
 * @author Sanbec
 */
$messages['es'] = array(
	'userwelcome-desc' => 'Añade la etiqueta <tt>&lt;welcomeUser&gt;</tt> para mostrar información social específica de cada usuario a los usuarios registrados',
	'mp-userlevels-link' => 'Niveles de usuario',
	'mp-welcome-upload' => 'Subir',
	'mp-welcome-edit' => 'Editar',
	'mp-welcome-points' => '$1 {{PLURAL:$1|punto|puntos}}',
	'mp-welcome-needed-points' => 'Avanzar para <b><a href="$1">$2</a></b> ganar <i>$3</i> más {{PLURAL:$3|punto|puntos}}!',
	'mp-welcome-logged-in' => 'Hola $1',
	'mp-requests-title' => 'Solicitudes',
	'mp-requests-message' => 'Usted tien las siguientes solicitudes.',
	'mp-request-new-message' => 'nuevo mensaje',
	'mp-request-new-award' => '$1 nuevos {{PLURAL:$1|premio|premios}}',
	'mp-request-new-gift' => '$1 nuevos {{PLURAL:$1|regalo|regalos}}',
	'mp-request-new-foe' => '$1 nuevos {{PLURAL:$1|adversario|adversarios}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|nuevo amigo|nuevos amigos}}',
);

/** Estonian (Eesti)
 * @author Avjoska
 * @author KalmerE.
 */
$messages['et'] = array(
	'mp-userlevels-link' => 'Kasutajate tasemed',
	'mp-welcome-upload' => 'Laadi üles',
	'mp-welcome-edit' => 'Toimeta',
	'mp-welcome-points' => '$1 punkti',
	'mp-welcome-logged-in' => 'Tere $1',
	'mp-request-new-message' => 'uus sõnum',
);

/** Basque (Euskara)
 * @author An13sa
 * @author Kobazulo
 */
$messages['eu'] = array(
	'mp-userlevels-link' => 'Lankide mailak',
	'mp-welcome-upload' => 'Igo',
	'mp-welcome-edit' => 'Aldatu',
	'mp-welcome-points' => '$1 {{PLURAL:$1|puntu|puntu}}',
	'mp-welcome-logged-in' => 'Kaixo $1',
	'mp-requests-title' => 'Eskaerak',
	'mp-requests-message' => 'Hurrengo eskaerak dituzu.',
	'mp-request-new-message' => 'mezu berria',
	'mp-request-new-award' => '{{PLURAL:$1|Sari berri bat|$1 sari berri}}',
	'mp-request-new-gift' => '{{PLURAL:$1|Opari berri bat|$1 opari berri}}',
	'mp-request-new-foe' => '{{PLURAL:$1|Etsai berri bat|$1 etsai berri}}',
	'mp-request-new-friend' => '{{PLURAL:$1|Lagun berri bat|$1 lagun berri}}',
);

/** Finnish (Suomi)
 * @author Crt
 * @author Jack Phoenix
 * @author Nike
 */
$messages['fi'] = array(
	'userwelcome-desc' => 'Lisää <tt>&lt;welcomeUser&gt;</tt>-elementin käyttäjäkohtaisten sosiaalisten tietojen näyttämiseen.',
	'mp-userlevels-link' => 'Käyttäjätasot',
	'mp-welcome-upload' => 'Tallenna',
	'mp-welcome-edit' => 'Muokkaa',
	'mp-welcome-points' => '$1 {{PLURAL:$1|piste|pistettä}}',
	'mp-welcome-needed-points' => 'Päästäksesi tasolle <b><a href="$1">$2</a></b>, ansaitse <i>$3</i> {{PLURAL:$3|piste|pistettä}} lisää!',
	'mp-welcome-logged-in' => 'Hei $1',
	'mp-requests-title' => 'Pyynnöt',
	'mp-requests-message' => 'Sinulla on seuraavat pyynnöt.',
	'mp-request-new-message' => 'uusi viesti',
	'mp-request-new-award' => '$1 {{PLURAL:$1|uusi palkinto|uutta palkintoa}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|uusi lahja|uutta lahjaa}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|uusi vihollinen|uutta vihollista}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|uusi ystävä|uutta ystävää}}',
);

/** French (Français)
 * @author Cedric31
 * @author Crochet.david
 * @author Grondin
 * @author IAlex
 */
$messages['fr'] = array(
	'userwelcome-desc' => 'Ajoute une balise <tt>&lt;welcomeUser&gt;</tt> pour afficher des informations sociales spécifiques à chaque utilisateur aux utilisateurs enregistrés',
	'mp-userlevels-link' => 'Niveaux de l’utilisateur',
	'mp-welcome-upload' => 'Télécharger',
	'mp-welcome-edit' => 'Modifier',
	'mp-welcome-points' => '$1 point{{PLURAL:$1||s}}',
	'mp-welcome-needed-points' => 'Avancer vers <b><a href="$1">$2</a></b> gagne <i>$3</i> point{{PLURAL:$3||s}} en plus !',
	'mp-welcome-logged-in' => 'Bienvenue $1',
	'mp-requests-title' => 'Requêtes',
	'mp-requests-message' => 'Vous avez les requêtes suivantes.',
	'mp-request-new-message' => 'nouveau message',
	'mp-request-new-award' => '$1 nouveau{{PLURAL:$1||x}} prix',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|nouveau don|nouveaux dons}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|nouveau ennemi|nouveaux ennemis}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|nouvel ami|nouveaux amis}}',
);

/** Irish (Gaeilge)
 * @author Alison
 */
$messages['ga'] = array(
	'mp-welcome-points' => '{{PLURAL:$1|point amháin|$1 pointí}}',
	'mp-requests-title' => 'Iarratais',
	'mp-request-new-message' => 'teachtaireacht nua',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'userwelcome-desc' => 'Engade a etiqueta <tt>&lt;welcomeUser&gt;</tt> para amosar información social específica a un usuario rexistrado',
	'mp-userlevels-link' => 'Niveis de usuario',
	'mp-welcome-upload' => 'Cargar',
	'mp-welcome-edit' => 'Editar',
	'mp-welcome-points' => '$1 {{PLURAL:$1|punto|puntos}}',
	'mp-welcome-needed-points' => 'Para avanzar a <b><a href="$1">$2</a></b>, gañe <i>$3</i> {{PLURAL:$3|punto|puntos}} máis!',
	'mp-welcome-logged-in' => 'Ola, $1',
	'mp-requests-title' => 'Solicitudes',
	'mp-requests-message' => 'Ten as seguintes solicitudes.',
	'mp-request-new-message' => 'mensaxes novas',
	'mp-request-new-award' => '$1 {{PLURAL:$1|novo premio|novos premios}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|novo agasallo|novos agasallos}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|novo inimigo|novos inimigos}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|novo amigo|novos amigos}}',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 */
$messages['grc'] = array(
	'mp-welcome-edit' => 'Μεταγράφειν',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'userwelcome-desc' => 'Fiegt e <tt>&lt;welcomeUser&gt;</tt>-Tag dezue, wu mer aagmäldete Benutzer benutzerspezifischi soziali Informatione demit cha zeige',
	'mp-userlevels-link' => 'Benutzerebene',
	'mp-welcome-upload' => 'Uffelade',
	'mp-welcome-edit' => 'Bearbeite',
	'mp-welcome-points' => '$1 {{PLURAL:$1|Punkt|Pinkt}}',
	'mp-welcome-needed-points' => 'Zum <b><a href="$1">$2</a></b> z wäre, muesch no <i>$3</i> {{PLURAL:$3|wytere Punkt Punkt|wyteri Pinkt}} verdiene!',
	'mp-welcome-logged-in' => 'Sali $1',
	'mp-requests-title' => 'Aafroge',
	'mp-requests-message' => 'Du hesch die Aafroge.',
	'mp-request-new-message' => 'neji Nochricht',
	'mp-request-new-award' => '$1 neji {{PLURAL:$1|Uuszeichnig|Uuszeichnige}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|nej Gschänk|neji Gschänk}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|neje Gegner/Fynd|neji Gegner/Fynd}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|neje Frynd|neji Frynd}}',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'userwelcome-desc' => 'הוספת תגית <tt>&lt;welcomeUser&gt;</tt> כדי להציג, למשתמשים רשומים בלבד, נתונים חברתיים לפי משתמש',
	'mp-userlevels-link' => 'רמות המשתמשים',
	'mp-welcome-upload' => 'העלאה',
	'mp-welcome-edit' => 'עריכה',
	'mp-welcome-points' => '{{PLURAL:$1|נקודה אחת|$1 נקודות}}',
	'mp-welcome-needed-points' => 'כדי להתקדם ל<b><a href="$1">$2</a></b> הרוויחו {{PLURAL:$3|נקודה <i>אחת</i> נוספת|<i>$3</i> נקודות נוספות}}!',
	'mp-welcome-logged-in' => 'שלום $1',
	'mp-requests-title' => 'בקשות',
	'mp-requests-message' => 'הגיעו אליכם הבקשות הבאות.',
	'mp-request-new-message' => 'הודעה חדשה',
	'mp-request-new-award' => '{{PLURAL:$1|פרס חדש אחד|$1 פרסים חדשים}}',
	'mp-request-new-gift' => '{{PLURAL:$1|מתנה חדשה אחת|$1 מתנות חדשות}}',
	'mp-request-new-foe' => '{{PLURAL:$1|יריב חדש אחד|$1 יריבים חדשים}}',
	'mp-request-new-friend' => '{{PLURAL:$1|חבר חדש אחד|$1 חברים חדשים}}',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'userwelcome-desc' => 'Přidawa tafličku <tt>&lt;welcomeUser&gt;</tt> za zwobraznjenje wužiwarjej specifiske socialne informacije přizjewjenych wužiwarjow',
	'mp-userlevels-link' => 'Wužiwarske runiny',
	'mp-welcome-upload' => 'Nahrać',
	'mp-welcome-edit' => 'Wobdźěłać',
	'mp-welcome-points' => '$1 {{PLURAL:$1|dypk|dypkaj|dypki|dypkow}}',
	'mp-welcome-needed-points' => 'Zo by k <b><a href="$1">$2</a></b> postupował, zasłuž <i>$3</i> {{PLURAL:$3|dalši dypk|dalšej dypkaj|dalše dypki|dalšich dypkow}}!',
	'mp-welcome-logged-in' => 'Halo $1',
	'mp-requests-title' => 'Požadanja',
	'mp-requests-message' => 'Maš slědowace požadanja.',
	'mp-request-new-message' => 'nowa powěsć',
	'mp-request-new-award' => '$1 {{PLURAL:$1|nowe myto|nowej myće|nowe myta|nowych mytow}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|nowy dar|nowej daraj|nowe dary|nowych darow}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|nowy přećiwnik|nowaj přećiwnikaj|nowi přećiwnicy|nowych přećiwnikow}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|nowy přećel|nowaj přećelej|nowi přećeljo|nowych přećelow}}',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'userwelcome-desc' => 'Adde le etiquetta <tt>&lt;welcomeUser&gt;</tt> pro monstrar informationes social specific a cata usator al usatores que ha aperite un session',
	'mp-userlevels-link' => 'Nivellos de usator',
	'mp-welcome-upload' => 'Cargar',
	'mp-welcome-edit' => 'Modificar',
	'mp-welcome-points' => '$1 {{PLURAL:$1|puncto|punctos}}',
	'mp-welcome-needed-points' => 'Pro avantiar verso <b><a href="$1">$2</a></b> gania <i>$3</i> plus {{PLURAL:$3|puncto|punctos}}!',
	'mp-welcome-logged-in' => 'Salute $1',
	'mp-requests-title' => 'Requestas',
	'mp-requests-message' => 'Tu ha le sequente requestas.',
	'mp-request-new-message' => 'nove message',
	'mp-request-new-award' => '$1 nove {{PLURAL:$1|premio|premios}}',
	'mp-request-new-gift' => '$1 nove {{PLURAL:$1|dono|donos}}',
	'mp-request-new-foe' => '$1 nove {{PLURAL:$1|inimico|inimicos}}',
	'mp-request-new-friend' => '$1 nove {{PLURAL:$1|amico|amicos}}',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 */
$messages['id'] = array(
	'mp-welcome-edit' => 'Sunting',
);

/** Ido (Ido)
 * @author Malafaya
 */
$messages['io'] = array(
	'mp-welcome-points' => '$1 punti',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Hosiryuhosi
 */
$messages['ja'] = array(
	'userwelcome-desc' => 'ログイン利用者に利用者ごとの情報を表示させる<tt>&lt;welcomeUser&gt;</tt>タグを追加する',
	'mp-userlevels-link' => '利用者レベル',
	'mp-welcome-upload' => 'アップロード',
	'mp-welcome-edit' => '編集',
	'mp-welcome-points' => '$1{{PLURAL:$1|点}}',
	'mp-welcome-needed-points' => '<b><a href="$1">$2</a></b>に進むにはあと<i>$3</i>{{PLURAL:$3|点}}必要です！',
	'mp-welcome-logged-in' => 'こんにちは $1',
	'mp-requests-title' => 'リクエスト',
	'mp-requests-message' => '以下のリクエストがあります。',
	'mp-request-new-message' => '新しいメッセージ',
	'mp-request-new-award' => '$1つの新しい{{PLURAL:$1|賞}}',
	'mp-request-new-gift' => '$1つの新しい{{PLURAL:$1|贈り物}}',
	'mp-request-new-foe' => '$1人の新しい{{PLURAL:$1|敵}}',
	'mp-request-new-friend' => '$1人の新しい{{PLURAL:$1|友人}}',
);

/** Javanese (Basa Jawa)
 * @author Pras
 */
$messages['jv'] = array(
	'userwelcome-desc' => 'Nambahaké tag <tt>&lt;welcomeUser&gt;</tt> kanggo nuduhaké info sosial mligi-panganggo marang panganggo sing mlebu log',
	'mp-userlevels-link' => 'Tataran panganggo',
	'mp-welcome-upload' => 'Unggah',
	'mp-welcome-edit' => 'Sunting',
	'mp-welcome-points' => '$1 {{PLURAL:$1|poin|poin}}',
	'mp-welcome-needed-points' => 'Kanggo maju menyang <b><a href="$1">$2</a></b> kumpulna <i>$3</i> {{PLURAL:$3|poin|poin}} luwih akèh!',
	'mp-welcome-logged-in' => 'Halo $1',
	'mp-requests-title' => 'Panyuwunan',
	'mp-requests-message' => 'Ana panyuwunan iki marang panjenengan.',
	'mp-request-new-message' => 'warta/pesen anyar',
	'mp-request-new-award' => '$1 {{PLURAL:$1|bebungah|bebungah}} anyar',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|pawèwèh|pawèwèh}} anyar',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|lawan|lawan}} anyar',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|kanca|kanca-kanca}} anyar',
);

/** Georgian (ქართული)
 * @author Temuri rajavi
 */
$messages['ka'] = array(
	'mp-request-new-message' => 'ახალი შეტყობინება',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Lovekhmer
 * @author Thearith
 */
$messages['km'] = array(
	'mp-userlevels-link' => 'កម្រិត​អ្នកប្រើប្រាស់',
	'mp-welcome-upload' => 'ផ្ទុកឯកសារឡើង',
	'mp-welcome-edit' => 'កែប្រែ',
	'mp-welcome-points' => '$1 {{PLURAL:$1|ពិន្ទុ|ពិន្ទុ}}',
	'mp-welcome-logged-in' => 'សួរស្តី $1',
	'mp-requests-title' => 'សំណើ',
	'mp-requests-message' => 'អ្នក​មាន​សំណើ​ដូចខាងក្រោម​។',
	'mp-request-new-message' => 'សារថ្មី',
	'mp-request-new-award' => '{{PLURAL:$1|រង្វាន់|រង្វាន់}} ថ្មី $1',
	'mp-request-new-gift' => '{{PLURAL:$1|អំណោយ|អំណោយ}}ថ្មីចំនួន$1',
	'mp-request-new-foe' => '{{PLURAL:$1|បច្ចាមិត្ត|បច្ចាមិត្ត}}ថ្មី $1',
	'mp-request-new-friend' => '{{PLURAL:$1|មិត្តភ័ក្ដិ|មិត្តភ័ក្ដិ}}ថ្មី $1',
);

/** Korean (한국어)
 * @author Yknok29
 */
$messages['ko'] = array(
	'mp-userlevels-link' => '사용자 수준',
	'mp-welcome-edit' => '편집',
	'mp-requests-title' => '요청',
	'mp-request-new-message' => '새로운 메시지',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'userwelcome-desc' => 'Deit dä Befäähl <tt lang="en">&lt;welcomeUser&gt;</tt> en et Wiki, öm bestemmpte Saache övver de Metmaacher un sing Schmölzjes aanzezeije, wann hä ennjelogg eß.',
	'mp-userlevels-link' => 'Ebene för Metmaacher',
	'mp-welcome-upload' => 'Huhlaade',
	'mp-welcome-edit' => 'Ändere',
	'mp-welcome-points' => '{{PLURAL:$1|Eine Pungk|$1 Pungkte|nix}}',
	'mp-welcome-needed-points' => 'Öm föraanzekumme op <b><a href="$1">$2</a></b>, donn {{PLURAL:$3|<i>eine</i> Pungk mieh|<i>$3</i> zosätzlijje Pungkte|<i>kein</i> Pungkte dobei}} sammele!',
	'mp-welcome-logged-in' => 'Daach $1,',
	'mp-requests-title' => 'Wönsch und Aanfroore',
	'mp-requests-message' => 'Do häß hee di Wönsch und Aanfroore:',
	'mp-request-new-message' => 'Neu Nohresch',
	'mp-request-new-award' => '{{PLURAL:$1|Ein neu Beloonung|$1 neu Beloonunge|Kein neu Beloonunge!}}',
	'mp-request-new-gift' => '{{PLURAL:$1|Ein neu Jeschengk|$1 neu Jeschengke|Kein neu Jeschengke!}}',
	'mp-request-new-foe' => '{{PLURAL:$1|Eine neue Feind|$1 neu Feinde|Kein neu Feinde!}}',
	'mp-request-new-friend' => '{{PLURAL:$1|Eine neue Frünnd|$1 neue Frünnde|Keine neue Frünnd}}',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'userwelcome-desc' => 'Setzt e <tt>&lt;welcomeUser&gt;</tt> Tag derbäi fir den ageloggte Benotzer  benotzerspezifesch Sozialinformatiounen vun anere Benotzer ze weisen.',
	'mp-userlevels-link' => 'Benotzerniveauen',
	'mp-welcome-upload' => 'Eroplueden',
	'mp-welcome-edit' => 'Änneren',
	'mp-welcome-points' => '$1 {{PLURAL:$1|Punkt|Punkten}}',
	'mp-welcome-needed-points' => 'Fir weiderzekommen <b><a href="$1">$2</a></b> verdéngt <i>$3</i> {{PLURAL:$3|Punkt|Punkte}} méi!',
	'mp-welcome-logged-in' => 'Salut $1',
	'mp-requests-title' => 'Ufroen',
	'mp-requests-message' => 'Dir hutt dës Ufroen',
	'mp-request-new-message' => 'neie Message',
	'mp-request-new-award' => '$1 nei {{PLURAL:$1|Auszeechnung|Auszeechnungen}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|neie Cadeau|nei Cadeauen}}',
	'mp-request-new-foe' => '$1 nei {{PLURAL:$1|Géigner|Géigner}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|neie Frënd|nei Frënn}}',
);

/** Macedonian (Македонски)
 * @author Brest
 */
$messages['mk'] = array(
	'userwelcome-desc' => 'Додава <tt>&lt;welcomeUser&gt;</tt> приврзок за приказ на специфични кориснички социјални информации на најавени корисници',
	'mp-userlevels-link' => 'Кориснички нивоа',
	'mp-welcome-upload' => 'Подигнување',
	'mp-welcome-edit' => 'Уреди',
	'mp-welcome-points' => '$1 {{PLURAL:$1|поен|поени}}',
	'mp-welcome-needed-points' => 'За да напредувате до <b><a href="$1">$2</a></b> заработете повеќе од <i>$3</i> {{PLURAL:$3|поен|поени}}!',
	'mp-welcome-logged-in' => 'Добредојдовте $1',
	'mp-requests-title' => 'Барања',
	'mp-requests-message' => 'Вие ги имате следниве барања.',
	'mp-request-new-message' => 'нова порака',
	'mp-request-new-award' => '$1 {{PLURAL:$1|нова награда|нови награди}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|нов подарок|нови подароци}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|нов непријател|нови непријатели}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|нов пријател|нови пријатели}}',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'mp-welcome-upload' => 'Titlaquetzāz',
	'mp-welcome-edit' => 'Ticpatlāz',
	'mp-welcome-logged-in' => 'Niltze $1',
);

/** Nedersaksisch (Nedersaksisch)
 * @author Servien
 */
$messages['nds-nl'] = array(
	'userwelcome-desc' => 'Zet de tag <tt>&lt;welcomeUser&gt;</tt> derbie um gebrukerspecefieke sociale infermasie over an-emelde gebrukers te laoten zien',
	'mp-userlevels-link' => "Gebrukersnivo's",
	'mp-welcome-upload' => 'Bestand toevoegen',
	'mp-welcome-edit' => 'Bewark',
	'mp-welcome-points' => '$1 punten',
	'mp-welcome-needed-points' => 'Um te promoveren naor <b><a href="$1">$2</a></b> mu-j nog <i>$3</i> {{PLURAL:$3|punte|punten}} verdienen!',
	'mp-welcome-logged-in' => 'Huj $1',
	'mp-requests-title' => 'Anvragen',
	'mp-requests-message' => 'Je hemmen de volgende anvragen.',
	'mp-request-new-message' => 'niej berich',
	'mp-request-new-award' => '{{PLURAL:$1|1 nieje pries|$1 nieje priezen}}',
	'mp-request-new-gift' => "{{PLURAL:$1|1 niej kedo|$1 nieje kedo's}}",
	'mp-request-new-foe' => '{{PLURAL:$1|1 nieje viejanen|$1 nieje viejanen}}',
	'mp-request-new-friend' => '{{PLURAL:$1|1 nieje vriend|$1 nieje vrienden}}',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'userwelcome-desc' => 'Voegt de tag <tt>&lt;welcomeUser&gt;</tt> toe om gebruikerspecifieke sociale informatie over aangemelde gebruikers weer te geven',
	'mp-userlevels-link' => 'Gebruikersniveaus',
	'mp-welcome-upload' => 'Uploaden',
	'mp-welcome-edit' => 'Bewerken',
	'mp-welcome-points' => '$1 {{PLURAL:$1|punt|punten}}',
	'mp-welcome-needed-points' => 'Om te promoveren naar <b><a href="$1">$2</a></b> moet u nog <i>$3</i> {{PLURAL:$3|punt|punten}} verdienen!',
	'mp-welcome-logged-in' => 'Hallo $1',
	'mp-requests-title' => 'Aanvragen',
	'mp-requests-message' => 'U hebt de volgende aanvragen.',
	'mp-request-new-message' => 'nieuw bericht',
	'mp-request-new-award' => '{{PLURAL:$1|1 nieuwe prijs|$1 nieuwe prijzen}}',
	'mp-request-new-gift' => '{{PLURAL:$1|1 nieuw geschenk|$1 nieuwe geschenken}}',
	'mp-request-new-foe' => '{{PLURAL:$1|1 nieuwe vijand|$1 nieuwe vijanden}}',
	'mp-request-new-friend' => '{{PLURAL:$1|1 nieuwe vriend|$1 nieuwe vrienden}}',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Frokor
 * @author Harald Khan
 */
$messages['nn'] = array(
	'userwelcome-desc' => 'Legg til <tt>&lt;welcomeUser&gt;</tt>-taggen for å vise brukarspesifisert sosial informasjon for innlogga brukarar',
	'mp-userlevels-link' => 'Brukarnivå',
	'mp-welcome-upload' => 'Last opp',
	'mp-welcome-edit' => 'Endre',
	'mp-welcome-points' => '{{PLURAL:$1|eitt poeng|$1 poeng}}',
	'mp-welcome-needed-points' => 'For å avansere for <b><a href="$1">$2</a></b> må du oppnå <i>$3</i> {{PLURAL:$3|poeng|poeng}} til!',
	'mp-welcome-logged-in' => 'Hei $1',
	'mp-requests-title' => 'Oppmodingar',
	'mp-requests-message' => 'Du har følgjande oppmodingar.',
	'mp-request-new-message' => 'ny melding',
	'mp-request-new-award' => '$1 {{PLURAL:$1|ny utmerking|nye utmerkingar}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|ny gåve|nye gåver}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|ny fiende|nye fiendar}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|ny ven|nye vener}}',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'userwelcome-desc' => 'Legger til <tt>&lt;welcomeUser&gt;</tt>-merkelappen for å vise brukerspesifisert sosial informasjon for innloggede brukere',
	'mp-userlevels-link' => 'Brukernivå',
	'mp-welcome-upload' => 'Last opp',
	'mp-welcome-edit' => 'Rediger',
	'mp-welcome-points' => '{{PLURAL:$1|ett poeng|$1 poeng}}',
	'mp-welcome-needed-points' => 'For å avansere til <b><a href="$1">$2</a></b> må du oppnå <i>$3</i> {{PLURAL:$3|poeng|poeng}} til!',
	'mp-welcome-logged-in' => 'Hei $1',
	'mp-requests-title' => 'Forespørsler',
	'mp-requests-message' => 'Du har følgende forespørsler.',
	'mp-request-new-message' => 'ny melding',
	'mp-request-new-award' => '$1 {{PLURAL:$1|ny utmerkelse|nye utmerkelser}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|ny gave|nye gaver}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|ny fiende|nye fiender}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|ny venn|nye venner}}',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'userwelcome-desc' => "Apond una balisa <tt>&lt;welcomeUser&gt;</tt> per afichar d'informacions socialas especificas a cada utilizaire als utilizaires enregistrats",
	'mp-userlevels-link' => "Nivèls de l'utilizaire",
	'mp-welcome-upload' => 'Telecargar',
	'mp-welcome-edit' => 'Modificar',
	'mp-welcome-points' => '$1 {{PLURAL:$1|punt|punts}}',
	'mp-welcome-needed-points' => 'Avançar cap a <b><a href="$1">$2</a></b> ganha <i>$3</i> {{PLURAL:$3|punt|punts}} en mai !',
	'mp-welcome-logged-in' => 'Benvenguda $1',
	'mp-requests-title' => 'Requèstas',
	'mp-requests-message' => 'Avètz las requèstas seguentas.',
	'mp-request-new-message' => 'messatge novèl',
	'mp-request-new-award' => '$1 {{PLURAL:$1|prèmi novèl|prèmis novèls}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|present novèl|presents novèls}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|enemic novèl|enemics novèls}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|amic novèl|amics novèls}}',
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$messages['os'] = array(
	'mp-welcome-edit' => 'Баив',
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'mp-welcome-edit' => 'Ennere',
);

/** Polish (Polski)
 * @author Maikking
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'userwelcome-desc' => 'Dodaje znacznik <tt>&lt;welcomeUser&gt;</tt> wyświetlający zalogowanym użytkownikom informacje o innych użytkownikach służące do utrzymywania kontaktów towarzyskich',
	'mp-userlevels-link' => 'Poziomy użytkownika',
	'mp-welcome-upload' => 'Prześlij',
	'mp-welcome-edit' => 'Edytuj',
	'mp-welcome-points' => '$1 {{PLURAL:$1|punkt|punkty|punktów}}',
	'mp-welcome-needed-points' => 'Aby posunąć się do <b><a href="$1">$2</a></b> musisz zdobyć nie mniej niż <i>$3</i> {{PLURAL:$3|punkt|punkty|punktów}}!',
	'mp-welcome-logged-in' => 'Witaj $1',
	'mp-requests-title' => 'Prośby',
	'mp-requests-message' => 'Otrzymałeś następujące prośby.',
	'mp-request-new-message' => 'nowa wiadomość',
	'mp-request-new-award' => '$1 {{PLURAL:$1|nowe odznaczenie|nowe odznaczenia|nowych odznaczeń}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|nowy prezent|nowe prezenty|nowych prezentów}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|nowy wróg|nowych wrogów}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|nowy przyjaciel|nowych przyjaciół}}',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'mp-welcome-edit' => 'سمون',
	'mp-welcome-logged-in' => '$1 سلامونه',
	'mp-requests-title' => 'غوښتنې',
	'mp-requests-message' => 'تاسو دغه لاندينۍ غوښتنې لری.',
	'mp-request-new-message' => 'نوی پيغام',
	'mp-request-new-gift' => 'د $1 {{PLURAL:$1|نوې ډالۍ|نوي ډالۍ}}',
	'mp-request-new-friend' => 'د $1 {{PLURAL:$1|نوی ملګری|نوي ملګري}}',
);

/** Portuguese (Português)
 * @author Lijealso
 * @author Malafaya
 * @author Waldir
 */
$messages['pt'] = array(
	'userwelcome-desc' => 'Adiciona a marca <tt>&lt;welcomeUser&gt;</tt> para apresentar informação social específica do utilizador, para utilizadores autenticados',
	'mp-userlevels-link' => 'Níveis de utilizador',
	'mp-welcome-upload' => 'Carregar',
	'mp-welcome-edit' => 'Editar',
	'mp-welcome-points' => '$1 {{PLURAL:$1|ponto|pontos}}',
	'mp-welcome-needed-points' => 'Para avançar para <b><a href="$1">$2</a></b>, ganhe mais <i>$3</i> {{PLURAL:$3|ponto|pontos}}!',
	'mp-welcome-logged-in' => 'Olá, $1',
	'mp-requests-title' => 'Pedidos',
	'mp-requests-message' => 'Você tem os seguinte pedidos.',
	'mp-request-new-message' => 'nova mensagem',
	'mp-request-new-award' => '$1 {{PLURAL:$1|novo galardão|novos galardões}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|nova prenda|novas prendas}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|novo inimigo|novos inimigos}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|novo amigo|novos amigos}}',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 */
$messages['pt-br'] = array(
	'userwelcome-desc' => 'Adiciona a marca <tt>&lt;welcomeUser&gt;</tt> para apresentar informação social específica do utilizador, para utilizadores autenticados',
	'mp-userlevels-link' => 'Níveis de utilizador',
	'mp-welcome-upload' => 'Carregar',
	'mp-welcome-edit' => 'Editar',
	'mp-welcome-points' => '$1 {{PLURAL:$1|ponto|pontos}}',
	'mp-welcome-needed-points' => 'Para avançar para <b><a href="$1">$2</a></b>, ganhe mais <i>$3</i> {{PLURAL:$3|ponto|pontos}}!',
	'mp-welcome-logged-in' => 'Olá, $1',
	'mp-requests-title' => 'Pedidos',
	'mp-requests-message' => 'Você tem os seguinte pedidos.',
	'mp-request-new-message' => 'nova mensagem',
	'mp-request-new-award' => '$1 {{PLURAL:$1|nova condecoração|novas condecorações}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|nova presente|novos presentes}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|novo inimigo|novos inimigos}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|novo amigo|novos amigos}}',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'mp-userlevels-link' => 'Niveluri de utilizatori',
	'mp-welcome-points' => '$1 puncte',
	'mp-requests-title' => 'Cereri',
	'mp-requests-message' => 'Aveţi următoarele cereri.',
	'mp-request-new-message' => 'mesaj nou',
	'mp-request-new-award' => '$1 {{PLURAL:$1|premiu nou|premii noi}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|cadou nou|cadouri noi}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|inamic nou|inamici noi}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|prieten nou|prieteni noi}}',
);

/** Russian (Русский)
 * @author Ferrer
 * @author Rubin
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'userwelcome-desc' => 'Добавляет тег <tt>&lt;welcomeUser&gt;</tt> для отображения зарегистрированным участникам социальной информации',
	'mp-userlevels-link' => 'Уровни участников',
	'mp-welcome-upload' => 'Загрузить',
	'mp-welcome-edit' => 'Править',
	'mp-welcome-points' => '$1 {{PLURAL:$1|очко|очков|очков}}',
	'mp-welcome-needed-points' => 'Для продвижения на <b><a href="$1">$2</a></b> требуется ещё <i>$3</i> {{PLURAL:$3|очко|очка|очков|}}!',
	'mp-welcome-logged-in' => 'Привет, $1',
	'mp-requests-title' => 'Запросы',
	'mp-requests-message' => 'У вас есть следующие запросы.',
	'mp-request-new-message' => 'новое сообщение',
	'mp-request-new-award' => '$1 {{PLURAL:$1|новая награда|новых награды|новых наград}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|новый подарок|новых подарка|новых подарков}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|новый недруг|новых недруга|новых недругов}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|новый друг|новых друга|новых друзей}}',
);

/** Sanskrit (संस्कृत)
 * @author Hemant wikikosh1
 * @author Mahitgar
 */
$messages['sa'] = array(
	'userwelcome-desc' => '<tt>&lt;सदस्यस्वागत&gt;</tt> चिह्नं योजयति यस्मात् सदस्यविशिष्टा सामाजिक-सूचना प्रवेशित-सदस्येभ्यः प्रदर्श्यते',
	'mp-userlevels-link' => 'सदस्य-स्तराः',
	'mp-welcome-upload' => 'उद्भारयतु',
	'mp-welcome-edit' => 'सम्पादयतु',
	'mp-welcome-points' => '$1 गुणदिष्ट',
	'mp-welcome-needed-points' => 'प्रगतिकृते <b><a href="$1">$2</a></b> अर्जति <i>$3</i> अधिक {{PLURAL:$3|गुण:|गुण:}}!',
	'mp-welcome-logged-in' => 'नमस्ते $1',
	'mp-requests-title' => 'विनन्ती',
	'mp-requests-message' => 'भवन्तं प्रति निवेदनानि एवं सन्ति।',
	'mp-request-new-message' => 'नूतनः संदेशः',
	'mp-request-new-award' => '$1 नूतनाः {{PLURAL:$1|प्रशस्तिः|प्रशस्तयः}}',
	'mp-request-new-gift' => '$1 नूतनाः {{PLURAL:$1|उपहारः|उपहाराः}}',
	'mp-request-new-foe' => '$1 नूतनाः {{PLURAL:$1|शत्रुः|शत्रवः}}',
	'mp-request-new-friend' => '$1 नूतनानि {{PLURAL:$1|मित्रम्|मित्राणि}}',
);

/** Sinhala (සිංහල)
 * @author නන්දිමිතුරු
 */
$messages['si'] = array(
	'userwelcome-desc' => 'පරිශීලක-විශේෂී සමාජීය තොරතුරු ප්‍රදක්ෂීණා කෙරුම සඳහා, ප්‍රවිෂ්ට-වූ පරිශීලකයන්ට <tt>&lt;welcomeUser&gt;</tt> ටැගය එකතු කෙරෙයි',
	'mp-userlevels-link' => 'පරිශීලක මට්ටම්',
	'mp-welcome-upload' => 'උඩුගත කිරීම',
	'mp-welcome-edit' => 'සංස්කරණය',
	'mp-welcome-points' => 'ලකුණු $1',
	'mp-welcome-needed-points' => '<b><a href="$1">$2</a></b> වෙත උසස් වීමට, තවත් ලකුණු <i>$3</i> ක් උපයා ගන්න!',
	'mp-welcome-logged-in' => 'සැරදේ $1',
	'mp-requests-title' => 'ඉල්ලීම්',
	'mp-requests-message' => 'පහත ඉල්ලීම් ඔබ වෙත යොමු වී ඇත.',
	'mp-request-new-message' => 'නව පණිවුඩය',
	'mp-request-new-award' => 'නව {{PLURAL:$1|සම්මානයක්|සම්මාන $1 ක්}}',
	'mp-request-new-gift' => 'නව {{PLURAL:$1|ත්‍යාගයක්|ත්‍යාගයන් $1 ක්}}',
	'mp-request-new-foe' => 'නව {{PLURAL:$1|ප්‍රතිමල්ලවයෙක්|ප්‍රතිමල්ලවයන් $1 ක්}}',
	'mp-request-new-friend' => 'නව {{PLURAL:$1|මිතුරෙක්|මිතුරන් $1 ක්}}',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'userwelcome-desc' => 'Pridáva značku <tt>&lt;welcomeUser&gt;</tt> na zobrazovanie sociálnych informácií špecifických pre používateľa (pre prihlásených používateľov)',
	'mp-userlevels-link' => 'Úrovne používateľov',
	'mp-welcome-upload' => 'Nahrať súbor',
	'mp-welcome-edit' => 'Upraviť',
	'mp-welcome-points' => '$1 {{PLURAL:$1|bod|body|bodov}}',
	'mp-welcome-needed-points' => 'Aby ste postúpili na <b><a href="$1">$2</a></b>, zarobte ešte <i>$3</i> {{PLURAL:$3|bod|body|bodov}}!',
	'mp-welcome-logged-in' => 'Ahoj $1',
	'mp-requests-title' => 'Požiadavky',
	'mp-requests-message' => 'Máte nasledovné požiadavky.',
	'mp-request-new-message' => 'nová správa',
	'mp-request-new-award' => '$1 {{PLURAL:$1|nové ocenenie|nové ocenenia|nových ocenení}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|nový dar|nové dary|nových darov}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|nový nepriateľ|noví nepriatelia|nových nepriateľov}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|nový priateľ|noví priatelia|nových priateľov}}',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'mp-userlevels-link' => 'Кориснички нивои',
	'mp-welcome-upload' => 'Слање',
	'mp-welcome-edit' => 'Измена',
	'mp-welcome-points' => '$1 {{PLURAL:$1|поен|поена}}',
	'mp-welcome-logged-in' => 'Здраво, $1',
	'mp-requests-title' => 'Захтеви',
	'mp-request-new-message' => 'нова порука',
	'mp-request-new-award' => '$1 {{PLURAL:$1|нова награда|нових награда}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|нови поклон|нових поклона}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|нови непријатељ|нових непријатеља}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|нови пријатељ|нових пријатеља}}',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'userwelcome-desc' => 'Föiget n <tt>&lt;welcomeUser&gt;</tt>-Tag bietou, wiermäd me benutserspezifiske sozioale Informatione fon ienloggede Benutsere wiese kon',
	'mp-userlevels-link' => 'Benutser-Ieuwenen',
	'mp-welcome-upload' => 'Hoochleede',
	'mp-welcome-edit' => 'Beoarbaidje',
	'mp-welcome-points' => '$1 Punkte',
	'mp-welcome-needed-points' => 'Uum <b><a href="$1">$2</a></b> tou wäiden moast du noch <i>$3</i> {{PLURAL:$3|wiederen Punkt|wiedere Punkte}} fertjoonje!',
	'mp-welcome-logged-in' => 'Hallo $1',
	'mp-requests-title' => 'Anfroagen',
	'mp-requests-message' => 'Do hääst do foulgjende Anfroagen.',
	'mp-request-new-message' => 'näie Ättergjucht',
	'mp-request-new-award' => '$1 näie {{PLURAL:$1|Uutteekenge|Uutteekengen}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|näi Geschoank|näie Geschoanke}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|näien Fäind|näie Fäinde}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|näien Früünd|näie Früünde}}',
);

/** Swedish (Svenska)
 * @author Najami
 */
$messages['sv'] = array(
	'userwelcome-desc' => 'Lägger till <tt>&lt;welcomeUser&gt;</tt>-taggen för att visa användarspecifierad social information för inloggade användare',
	'mp-userlevels-link' => 'Användarnivåer',
	'mp-welcome-upload' => 'Ladda upp',
	'mp-welcome-edit' => 'Redigera',
	'mp-welcome-points' => '$1 {{PLURAL:$1|poäng|poäng}}',
	'mp-welcome-needed-points' => 'För att avancera för <b><a href="$1">$2</a></b> måste du uppnå <i>$3</i> fler {{PLURAL:$3|poäng|poäng}}!',
	'mp-welcome-logged-in' => 'Hej $1',
	'mp-requests-title' => 'Efterfrågningar',
	'mp-requests-message' => 'Du har följande efterfrågningar.',
	'mp-request-new-message' => 'nytt meddelande',
	'mp-request-new-award' => '$1 {{PLURAL:$1|ny utmärkelse|nya utmärkelser}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|ny present|nya presenter}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|ny fiende|nya fiender}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|ny vän|nya vänner}}',
);

/** Silesian (Ślůnski)
 * @author Lajsikonik
 */
$messages['szl'] = array(
	'userwelcome-desc' => 'Dodej <tt>&lt;welcomeUser&gt;</tt> tag do pokozańo dedykowanym specyficznymu użytkowńikowi informacyjům socyjolnym lů zalogowanych użytkowńikůw',
	'mp-userlevels-link' => 'Poźůmy użytkowńika',
	'mp-welcome-upload' => 'Wćepńij',
	'mp-welcome-edit' => 'Sprowjej',
	'mp-welcome-points' => '$1 půnktůw',
	'mp-welcome-needed-points' => 'Coby przyńść ku <b><a href="$1">$2</a></b> zdobůńdź <i>$3</i> wjyncyj {{PLURAL:$3|půnkt|půnktůw}}!',
	'mp-welcome-logged-in' => 'Witej $1',
	'mp-requests-title' => 'Żůndańo',
	'mp-requests-message' => 'Mosz nastympujůnce żůndańa.',
	'mp-request-new-message' => 'nowo wjadůmość',
	'mp-request-new-award' => '$1 {{PLURAL:$1|nowo nadgroda|nowe nadgrody}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|nowy geszynk|nowe geszynki}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|nowy przećiwńik|nowe przećiwńiki}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|nowy przijaćel|nowych przijaćeli}}',
);

/** Tamil (தமிழ்)
 * @author Ulmo
 */
$messages['ta'] = array(
	'userwelcome-desc' => 'புகுபதிகை செய்த பயனர்களுக்கு அவர்கட்குரிய சமூக தகவல்களை காட்டுவதற்காக <tt>&lt;welcomeUser&gt;</tt> இணையை சேர்க்கின்றது.',
	'mp-userlevels-link' => 'பயனர் நிலைகள்',
	'mp-welcome-upload' => 'பதிவேற்று',
	'mp-welcome-edit' => 'தொகு',
	'mp-welcome-points' => '$1 புள்ளிகள்',
	'mp-welcome-needed-points' => '<b><a href="$1">$2</a></b> இற்கு முன்னேறிச்செல்ல <i>$3</i> {{PLURAL:$3|புள்ளி|புள்ளிகள்}} ஈட்டுக!',
	'mp-welcome-logged-in' => 'வணக்கம் $1',
	'mp-requests-title' => 'கோரிக்கைகள்',
	'mp-requests-message' => 'உங்களுக்கு பின்வரும் கோரிக்கைகள் உள்ளன.',
	'mp-request-new-message' => 'புதிய செய்தி',
	'mp-request-new-award' => '$1 புதிய {{PLURAL:$1|விருது|விருதுகள்}}',
	'mp-request-new-gift' => '$1 புதிய {{PLURAL:$1|பரிசு|பரிசுகள்}}',
	'mp-request-new-foe' => '$1 புதிய {{PLURAL:$1|பகைவர்|பகைவர்கள்}}',
	'mp-request-new-friend' => '$1 புதிய {{PLURAL:$1|தோழர்|தோழர்கள்}}',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'mp-userlevels-link' => 'వాడుకరి స్థాయిలు',
	'mp-welcome-upload' => 'ఎగుమతిచేయి',
	'mp-welcome-edit' => 'మార్చు',
	'mp-welcome-points' => '$1 {{PLURAL:$1|పాయింటు|పాయింట్లు}}',
	'mp-welcome-logged-in' => 'హలో $1',
	'mp-requests-title' => 'అభ్యర్థనలు',
	'mp-requests-message' => 'మీకై ఈ క్రింది అభ్యర్థనలు ఉన్నాయి.',
	'mp-request-new-message' => 'కొత్త సందేశం',
	'mp-request-new-award' => '$1 కొత్త {{PLURAL:$1|అవార్డు|అవార్డులు}}',
	'mp-request-new-gift' => '$1 కొత్త {{PLURAL:$1|బహుమతి|బహుమతులు}}',
	'mp-request-new-foe' => '$1 కొత్త {{PLURAL:$1|శతృవు|శతృవులు}}',
	'mp-request-new-friend' => '$1 కొత్త {{PLURAL:$1|మిత్రుడు|మిత్రులు}}',
);

/** Thai (ไทย)
 * @author Manop
 */
$messages['th'] = array(
	'mp-userlevels-link' => 'ระดับผู้ใช้',
	'mp-welcome-upload' => 'อัปโหลด',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'userwelcome-desc' => 'Nagdaragdag ng tatak na <tt>&lt;maligayangpagdatingTagagamit&gt;</tt> upang maipakita sa nakalagda/nakatalang mga tagagamit ang kabatirang panlipunang (impormasyon) tumutukoy sa   partikular na tagagamit',
	'mp-userlevels-link' => 'Mga antas na pangtagagamit',
	'mp-welcome-upload' => 'Ikarga',
	'mp-welcome-edit' => 'Baguhin',
	'mp-welcome-points' => '$1 {{PLURAL:$1|puntos|mga puntos}}',
	'mp-welcome-needed-points' => 'Upang makasulong patungo sa <b><a href="$1">$2</a></b> umani ng <i>$3</i> karagdagang {{PLURAL:$3|puntos|mga puntos}}!',
	'mp-welcome-logged-in' => 'Mabuhay $1',
	'mp-requests-title' => 'Mga kahilingan',
	'mp-requests-message' => 'Mayroon kang sumusunod na mga kahilingan.',
	'mp-request-new-message' => 'bagong mensahe',
	'mp-request-new-award' => '$1 bagong {{PLURAL:$1|gantimpala|mga gantimpala}}',
	'mp-request-new-gift' => '$1 bagong {{PLURAL:$1|handog|mga handog}}',
	'mp-request-new-foe' => '$1 bagong {{PLURAL:$1|katunggali|mga katunggali}}',
	'mp-request-new-friend' => '$1 bagong {{PLURAL:$1|kaibigan|mga kaibigan}}',
);

/** Turkish (Türkçe)
 * @author Joseph
 * @author Karduelis
 */
$messages['tr'] = array(
	'userwelcome-desc' => 'Kullanıcıya-özgü sosyal bilgileri giriş yapmış kullanıcılara göstermek için <tt>&lt;welcomeUser&gt;</tt> etiketini ekler',
	'mp-userlevels-link' => 'Kullanıcı seviyeleri',
	'mp-welcome-upload' => 'Yükle',
	'mp-welcome-edit' => 'Düzenle',
	'mp-welcome-points' => '$1 {{PLURAL:$1|puan|puan}}',
	'mp-welcome-needed-points' => '<b><a href="$1">$2</a></b>\'ye ilerlemek için <i>$3</i> {{PLURAL:$3|puan|puan}} daha kazanın!',
	'mp-welcome-logged-in' => '$1 Hoşgeldiniz',
	'mp-requests-title' => 'İstekler',
	'mp-requests-message' => 'Şu istekleriniz var.',
	'mp-request-new-message' => 'yeni mesajlar',
	'mp-request-new-award' => '$1 yeni {{PLURAL:$1|ödül|ödül}}',
	'mp-request-new-gift' => '$1 yeni {{PLURAL:$1|hediye|hediye}}',
	'mp-request-new-foe' => '$1 yeni {{PLURAL:$1|düşman|düşman}}',
	'mp-request-new-friend' => '$1 yeni {{PLURAL:$1|arkadaş|arkadaş}}',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'userwelcome-desc' => 'Thêm thẻ <tt>&lt;welcomeUser&gt;</tt> để hiển thị thông tin cá nhân cho những thành viên đăng ký',
	'mp-userlevels-link' => 'Cấp thành viên',
	'mp-welcome-upload' => 'Tải lên',
	'mp-welcome-edit' => 'Sửa đổi',
	'mp-welcome-points' => '$1 {{PLURAL:$1|điểm|điểm}}',
	'mp-welcome-needed-points' => 'Để trở thành <b><a href="$1">$2</a></b>, hãy kiếm thêm <i>$3</i> {{PLURAL:$3|điểm|điểm}} nữa!',
	'mp-welcome-logged-in' => 'Chào $1',
	'mp-requests-title' => 'Các yêu cầu',
	'mp-requests-message' => 'Bạn có các yêu cầu sau.',
	'mp-request-new-message' => 'tin nhắn mới',
	'mp-request-new-award' => '$1 {{PLURAL:$1|giải thưởng|giải thưởng}} mới',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|quà tặng|quà tặng}} mới',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|kẻ thù|ker thù}} mới',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|người bạn|người bạn}} mới',
);

/** Volapük (Volapük)
 * @author Malafaya
 * @author Smeira
 */
$messages['vo'] = array(
	'mp-userlevels-link' => 'Gebananivods',
	'mp-welcome-upload' => 'Löpükön',
	'mp-welcome-edit' => 'Redakön',
	'mp-welcome-logged-in' => 'Glidis, o $1!',
	'mp-requests-title' => 'Begs',
	'mp-requests-message' => 'Labol begis sököl.',
	'mp-request-new-message' => 'nun nulik',
	'mp-request-new-gift' => '{{PLURAL:$1|Legivot|Legivots}} nulik $1',
	'mp-request-new-foe' => '{{PLURAL:$1|Neflen|Neflens}} nulik $1',
	'mp-request-new-friend' => '{{PLURAL:$1|Flen|Flens}} nulik $1',
);

/** Wolof (Wolof)
 * @author Ibou
 */
$messages['wo'] = array(
	'mp-userlevels-link' => 'Tolluwaayu jëfandikukat bi',
	'mp-welcome-upload' => 'Yeb',
	'mp-welcome-edit' => 'Soppi',
	'mp-welcome-points' => '$1 tomb',
	'mp-welcome-logged-in' => 'Dalal-jámm $1',
	'mp-requests-title' => 'Cakkuteef',
	'mp-requests-message' => 'Yaa moom yii cakkuteef.',
	'mp-request-new-message' => 'Bataaxal bu bees',
	'mp-request-new-award' => '$1 neexal {{PLURAL:$1|bu bees|yu yees}}',
	'mp-request-new-gift' => '$1 {{PLURAL:$1|ndimbal bu bees|ndimbal yu yees}}',
	'mp-request-new-foe' => '$1 {{PLURAL:$1|noon bu bees|noon yu yees}}',
	'mp-request-new-friend' => '$1 {{PLURAL:$1|xarit bu bees|xarit yu yees}}',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gzdavidwong
 */
$messages['zh-hans'] = array(
	'mp-welcome-upload' => '上传',
	'mp-welcome-edit' => '编辑',
	'mp-welcome-logged-in' => '$1，您好',
	'mp-requests-title' => '请求',
	'mp-requests-message' => '您有以下请求：',
	'mp-request-new-message' => '新信息',
	'mp-request-new-gift' => '{{PLURAL:$1件|新礼物}}',
	'mp-request-new-friend' => '{{PLURAL:$1名|新朋友}}',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Gzdavidwong
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'mp-welcome-upload' => '上載',
	'mp-welcome-edit' => '編輯',
	'mp-welcome-logged-in' => '$1，您好',
	'mp-requests-title' => '請求',
	'mp-requests-message' => '您有以下請求。',
	'mp-request-new-message' => '新訊息',
	'mp-request-new-gift' => '{{PLURAL:$1件|新禮物}}',
	'mp-request-new-friend' => '{{PLURAL:$1名|新朋友}}',
);

