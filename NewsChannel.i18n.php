<?php
/**
* News Channel extension 1.6
* This MediaWiki extension represents a RSS 2.0/Atom 1.0 news channel for wiki project.
* 	The channel is implemented as a dynamic [[Special:NewsChannel|special page]].
* 	All pages from specified category (e.g. "Category:News") are considered
* 	to be articles about news and published on the site's news channel.
* Internationalization file, containing message strings for extension.
* Requires MediaWiki 1.8 or higher.
* Extension's home page: http://www.mediawiki.org/wiki/Extension:News_Channel
*
* Distributed under GNU General Public License 2.0 or later (http://www.gnu.org/copyleft/gpl.html)
*/

$messages = array();

/** English
 * @author Iaroslav Vassiliev
 */
$messages['en'] = array(
	'newschannel' => 'News channel',
	'newschannel-desc' => 'Implements a news channel as a dynamic [[Special:NewsChannel|special page]]',
	'newschannel_format' => 'Format:',
	'newschannel_limit' => 'Limit:',
	'newschannel_include_category' => 'Additional category:',
	'newschannel_exclude_category' => 'Exclude category:',
	'newschannel_submit_button' => 'Create feed',
);

/** Message documentation (Message documentation)
 * @author Purodha
 */
$messages['qqq'] = array(
	'newschannel-desc' => 'Short description of this extension, shown on [[Special:Version]]. Do not translate or change links.',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'newschannel' => 'قناة أخبار',
	'newschannel-desc' => 'يطبق قناة أخبار [[Special:NewsChannel|كصفحة خاصة]] ديناميكية',
	'newschannel_format' => 'الصيغة:',
	'newschannel_limit' => 'الحد:',
	'newschannel_include_category' => 'تصنيف إضافي:',
	'newschannel_exclude_category' => 'استبعد التصنيف:',
	'newschannel_submit_button' => 'إنشاء التلقيم',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 */
$messages['arz'] = array(
	'newschannel' => 'قناة أخبار',
	'newschannel-desc' => 'يطبق قناة أخبار [[Special:NewsChannel|كصفحة خاصة]] ديناميكية',
	'newschannel_format' => 'الصيغة:',
	'newschannel_limit' => 'الحد:',
	'newschannel_include_category' => 'تصنيف إضافي:',
	'newschannel_exclude_category' => 'استبعد التصنيف:',
	'newschannel_submit_button' => 'إنشاء التلقيم',
);

/** Asturian (Asturianu)
 * @author Esbardu
 */
$messages['ast'] = array(
	'newschannel' => "Canal d'anuncies",
	'newschannel-desc' => "Implementa una canal d'anuncies como una [[Special:NewsChannel|páxina especial]] dinámica",
	'newschannel_format' => 'Formatu:',
	'newschannel_limit' => 'Llímite:',
	'newschannel_include_category' => 'Categoría adicional:',
	'newschannel_exclude_category' => 'Escluyir categoría:',
	'newschannel_submit_button' => "Crear fonte d'anuncies",
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'newschannel_format' => 'Формат:',
	'newschannel_limit' => 'Лимит:',
	'newschannel_include_category' => 'Допълнителна категория:',
	'newschannel_exclude_category' => 'Изключване на категория:',
);

/** Czech (Česky)
 * @author Matěj Grabovský
 */
$messages['cs'] = array(
	'newschannel' => 'Kanál novinek',
	'newschannel-desc' => 'Implementuje kanál novinek jako dynamickou [[Special:NewsChannel|speciální stránku]]',
	'newschannel_format' => 'Formát:',
	'newschannel_limit' => 'Omezení:',
	'newschannel_include_category' => 'Další kategorie:',
	'newschannel_exclude_category' => 'Kromě kategorií:',
	'newschannel_submit_button' => 'Vytvořit kanál',
);

/** German (Deutsch)
 * @author Cornelius Sicker
 */
$messages['de'] = array(
	'newschannel' => 'Nachrichten',
	'newschannel-desc' => 'Ergänzt einen Nachrichtenkanal als dynamische [[Special:NewsChannel|Spezialseite]]',
	'newschannel_format' => 'Format:',
	'newschannel_limit' => 'Limit:',
	'newschannel_include_category' => 'Zusätzliche Kategorie:',
	'newschannel_exclude_category' => 'Auszuschließende Kategorie:',
	'newschannel_submit_button' => 'Feed erstellen',
);

/** French (Français)
 * @author Grondin
 * @author Mauro Bornet
 * @author McDutchie
 */
$messages['fr'] = array(
	'newschannel' => "Chaîne d'information",
	'newschannel-desc' => 'Implémente une chaîne de nouvelles comme une [[Special:NewsChannel|page spéciale]] dynamique',
	'newschannel_format' => 'Format:',
	'newschannel_limit' => 'Limite:',
	'newschannel_include_category' => 'Catégorie(s) additionnelle(s):',
	'newschannel_exclude_category' => 'Catégorie(s) exclue(s):',
	'newschannel_submit_button' => 'Créer le flux',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'newschannel' => 'Canle de novas',
	'newschannel-desc' => 'Insire unha canle de novas como unha [[Special:NewsChannel|páxina especial]] dinámica',
	'newschannel_format' => 'Formato:',
	'newschannel_limit' => 'Límite:',
	'newschannel_include_category' => 'Categoría adicional:',
	'newschannel_exclude_category' => 'Excluír a categoría:',
	'newschannel_submit_button' => 'Crear a fonte de novas',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'newschannel' => 'Canal de novas',
	'newschannel-desc' => 'Implementa un canal de novas como un [[Special:NewsChannel|pagina special]] dynamic',
	'newschannel_format' => 'Formato:',
	'newschannel_limit' => 'Limite:',
	'newschannel_include_category' => 'Categoria additional:',
	'newschannel_exclude_category' => 'Excluder categoria:',
	'newschannel_submit_button' => 'Crear syndication',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'newschannel' => 'Neueschkeite-Kanaal',
	'newschannel-desc' => 'Määt ene Neueschkeite-Kanaal als en dünamesch [[Special:NewsChannel|Söndersigg]] op.',
	'newschannel_format' => 'Fomaat:',
	'newschannel_limit' => 'Limit:',
	'newschannel_include_category' => 'Zosätzlijje Saachjropp:',
	'newschannel_exclude_category' => 'Ußjeschloße Saachjrupp:',
	'newschannel_submit_button' => 'Kanaal opmaache',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'newschannel_format' => 'Format:',
	'newschannel_limit' => 'Limit:',
	'newschannel_include_category' => 'Zousätzlech Kategorie:',
	'newschannel_exclude_category' => 'Kategorie ausschléissen:',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'newschannel' => 'Nieuwskanaal',
	'newschannel-desc' => 'Voegt een nieuwskanaal toe als een dynamische [[Special:NewsChannel|speciale pagina]]',
	'newschannel_format' => 'Formaat:',
	'newschannel_limit' => 'Limiet:',
	'newschannel_include_category' => 'Additionele categorie:',
	'newschannel_exclude_category' => 'Uitgesloten categorie:',
	'newschannel_submit_button' => 'Feed aanmaken',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'newschannel' => 'Nyhtskanal',
	'newschannel-desc' => 'Implementerer en nyhetskanal som en dynamisk [[Special:NewsChannel|spesialside]]',
	'newschannel_format' => 'Format:',
	'newschannel_limit' => 'Grense:',
	'newschannel_include_category' => 'Ekstra kategori:',
	'newschannel_exclude_category' => 'Ekskluder kategori:',
	'newschannel_submit_button' => 'Opprett nyhetskilde',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'newschannel' => "Cadena d'informacion",
	'newschannel-desc' => 'Implementa un canal novèl coma una [[Special:NewsChannel|pagina especiala]] dinamica',
	'newschannel_format' => 'Format :',
	'newschannel_limit' => 'Limit :',
	'newschannel_include_category' => 'Categoria(s) addicionala(s) :',
	'newschannel_exclude_category' => 'Categoria(s) excluida(s) :',
	'newschannel_submit_button' => 'Crear lo flus',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'newschannel' => 'خبري کانال',
	'newschannel_include_category' => 'اضافه وېشنيزه:',
);

/** Portuguese (Português)
 * @author Malafaya
 */
$messages['pt'] = array(
	'newschannel_format' => 'Formato:',
	'newschannel_limit' => 'Limite:',
	'newschannel_include_category' => 'Categoria adicional:',
	'newschannel_exclude_category' => 'Excluir categoria:',
);

/** Russian (Русский)
 * @author Iaroslav Vassiliev
 */
$messages['ru'] = array(
	'newschannel' => 'Канал новостей',
	'newschannel_format' => 'Формат новостей:',
	'newschannel_limit' => 'Кол-во последних новостей:',
	'newschannel_include_category' => 'Дополнительная категория:',
	'newschannel_exclude_category' => 'Исключить категорию:',
	'newschannel_submit_button' => 'Вывести',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'newschannel' => 'Kanál noviniek',
	'newschannel-desc' => 'Implementuje kanál noviniek ako dynamickú [[Special:NewsChannel|špeciálnu stránku]]',
	'newschannel_format' => 'Formát:',
	'newschannel_limit' => 'Obmedzenie:',
	'newschannel_include_category' => 'Ďalšia kategória:',
	'newschannel_exclude_category' => 'Okrem kategórie:',
	'newschannel_submit_button' => 'Vytvoriť kanál',
);

/** Swedish (Svenska)
 * @author M.M.S.
 */
$messages['sv'] = array(
	'newschannel' => 'Nyhetskanal',
	'newschannel-desc' => 'Implementerar en nyhetskanal som en dynamisk [[Special:NewsChannel|specialsida]]',
	'newschannel_format' => 'Format:',
	'newschannel_limit' => 'Gräns:',
	'newschannel_include_category' => 'Ytterligare kategori:',
	'newschannel_exclude_category' => 'Exkluderar kategori:',
	'newschannel_submit_button' => 'Skapa nyhetskanal',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'newschannel' => 'Đài tin tức',
	'newschannel-desc' => 'Cung cấp đài tin tức tại [[Special:NewsChannel|trang đặc biệt]] động',
	'newschannel_format' => 'Định dạng:',
	'newschannel_limit' => 'Hạn chế:',
	'newschannel_include_category' => 'Thể loại khác:',
	'newschannel_exclude_category' => 'Trừ thể loại:',
	'newschannel_submit_button' => 'Tạo feed',
);

/** Volapük (Volapük)
 * @author Malafaya
 */
$messages['vo'] = array(
	'newschannel_limit' => 'Mied:',
);

