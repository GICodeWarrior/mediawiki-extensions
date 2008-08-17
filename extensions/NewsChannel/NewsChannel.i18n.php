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

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'newschannel_format' => 'Формат:',
	'newschannel_limit' => 'Лимит:',
	'newschannel_include_category' => 'Допълнителна категория:',
	'newschannel_exclude_category' => 'Изключване на категория:',
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
 */
$messages['fr'] = array(
	'newschannel' => "Chaîne d'information",
	'newschannel-desc' => 'Implémente un nouveau canal comme une [[Special:NewsChannel|page spéciale]] dynamique',
	'newschannel_format' => 'Format:',
	'newschannel_limit' => 'Limite:',
	'newschannel_include_category' => 'Catégorie(s) additionnelle(s):',
	'newschannel_exclude_category' => 'Catégorie(s) exclue(s):',
	'newschannel_submit_button' => 'Créer le flux',
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

