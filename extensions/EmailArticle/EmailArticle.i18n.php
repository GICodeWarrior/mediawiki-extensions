<?php
/**
 * Internationalisation file for extension EmailArticle.
 *
 * @addtogroup Extensions
*/

$messages = array();

/** English
 * @author Nad
 */
$messages['en'] = array(
	'emailarticle'        => 'E-mail page',
	'ea-desc'             => 'Send rendered HTML page to an e-mail address or list of addresses using [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading'          => "=== E-mailing [[$1]] page ===",
	'ea-fromgroup'        => 'From group:',
	'ea-articlesend'      => 'Page "$1" sent from $2',
	'ea-noarticle'        => "Please specify a page to send, for example [[Special:EmailArticle/Main Page]].",
	'ea-norecipients'     => "No valid e-mail addresses found!",
	'ea-listrecipients'   => "=== List of $1 {{PLURAL:$1|recipient|recipients}} ===",
	'ea-error'            => "'''Error sending [[$1]]:''' ''$2''",
	'ea-denied'           => 'Permission denied',
	'ea-sent'             => "Page [[$1]] sent successfully to '''$2''' {{PLURAL:$2|recipient|recipients}} by [[User:$3|$3]].",
	'ea-selectrecipients' => 'Select recipients',
	'ea-compose'          => 'Compose content',
	'ea-selectlist'       => "Additional recipients as page titles or e-mail addresses
*''separate items with , ; * \\n
*''list can contain templates and parser-functions''",
	'ea-show'             => 'Show recipients',
	'ea-send'             => 'Send!',
	'ea-subject'          => 'Enter a subject line for the e-mail',
	'ea-header'           => 'Prepend content with optional message (wikitext)',
	'ea-selectcss'        => 'Select a CSS stylesheet',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'ea-listrecipients' => '=== Списък на $1 {{PLURAL:$1|получател|получателя}} ===',
	'ea-send'           => 'Изпращане!',
);

/** French (Français)
 * @author Grondin
 */
$messages['fr'] = array(
	'emailarticle'        => 'Envoyer l’article par courriel',
	'ea-desc'             => 'Envoie le rendu d’une page HTML à une adresse électronique où à une liste d’adresses en utilisant [http://phpmailer.sourceforge.net phpmailer]',
	'ea-heading'          => '=== Envoi de la page [[$1]] par courrier électronique ===',
	'ea-fromgroup'        => 'Depuis le groupe :',
	'ea-articlesend'      => 'Page « $1 » envoyée depuis $2',
	'ea-noarticle'        => 'Veuillez spécifier une page à envoyer, par exemple [[Special:EmailArticle/Accueil]]',
	'ea-norecipients'     => 'Aucune adresse courriel de trouvée !',
	'ea-listrecipients'   => '=== Liste de $1 {{PLURAL:$1|destinataire|destinataires}} ===',
	'ea-error'            => "'''Erreur de l’envoi de [[$1]] :''' ''$2''",
	'ea-denied'           => 'Permission refusée',
	'ea-sent'             => "L'article [[$1]] a été envoyé avec succès à '''$2''' {{PLURAL:$2|destinataire|destinataires}} par [[User:$3|$3]].",
	'ea-selectrecipients' => 'Sélectionner les destinataires',
	'ea-compose'          => 'Composer le contenu',
	'ea-selectlist'       => "Destinataires supplémentaires comme les titres d'articles ou les adresses courriel
* ''séparer les articles avec , : * \\n''
* ''la liste peut contenir des modèles et des fonctions parseurs''",
	'ea-show'             => 'Visionner les destinataires',
	'ea-send'             => 'Envoyer !',
	'ea-subject'          => 'Entrer une ligne « objet » pour le courriel',
	'ea-header'           => 'Ajouter le contenu au début avec un message facultatif (texte wiki)',
	'ea-selectcss'        => 'Sélectionner une feuille de style CSS',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'emailarticle'        => 'Enviar a páxina por correo electrónico',
	'ea-desc'             => 'Enviar páxinas HTML renderizadas a un enderezo de correo electrónico (ou a varios correos) usando [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading'          => '=== Enviando a páxina "[[$1]]" ===',
	'ea-fromgroup'        => 'Desde o grupo:',
	'ea-articlesend'      => 'O artigo "$1" foi enviado desde $2',
	'ea-noarticle'        => 'Por favor, especifique a páxina que quere enviar, por exemplo: [[Special:EmailArticle/Main Page]].',
	'ea-norecipients'     => 'Non foi atopado ningún enderezo de correo electrónico válido!',
	'ea-listrecipients'   => '=== {{PLURAL:$1|Nome do destinatario|Listaxe dos $1 destinatarios}} ===',
	'ea-error'            => "'''Erro no envío de \"[[\$1]]\":''' ''\$2''",
	'ea-denied'           => 'Permiso denegado',
	'ea-sent'             => 'A páxina "[[$1]]" foi enviada con éxito a \'\'\'$2\'\'\' {{PLURAL:$2|destinatario|destinatarios}} por [[User:$3|$3]].',
	'ea-selectrecipients' => 'Seleccionar os destinatarios',
	'ea-compose'          => 'Compoñer o contido',
	'ea-selectlist'       => "Destinatarios adicionais como títulos de páxinas ou correos electrónicos
*''separar os ítems con , ; * \\n
*''a listaxe`pode conter modelos e funcións analíticas''",
	'ea-show'             => 'Amosar os destinatarios',
	'ea-send'             => 'Enviar!',
	'ea-subject'          => 'Introducir un asunto ao correo electrónico',
	'ea-header'           => 'Engadir o contido cunha mensaxe opcional (texto wiki)',
	'ea-selectcss'        => 'Seleccionar unha folla de estilo CSS',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'emailarticle'        => 'Säit per Mail schécken',
	'ea-heading'          => '=== Säit [[$1]] peer E-Mail verschécken ===',
	'ea-fromgroup'        => 'Vun der Grupp:',
	'ea-articlesend'      => 'D\'Säit "$1" gouf verschéckt vum $2',
	'ea-norecipients'     => 'Keng gëlteg E-Mailadress fonnt',
	'ea-denied'           => 'Rechter refuséiert',
	'ea-selectrecipients' => 'Adressaten erauswielen',
	'ea-show'             => 'Adressate weisen',
	'ea-send'             => 'Schécken!',
	'ea-selectcss'        => "Een ''CSS Stylesheet'' auswielen",
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'emailarticle'        => 'ഇമെയില്‍ താള്‍',
	'ea-heading'          => '=== [[$1]] എന്ന താള്‍ ഇമെയില്‍ ചെയ്യുന്നു ===',
	'ea-fromgroup'        => 'ഗ്രൂപ്പ്:',
	'ea-articlesend'      => '$2 സം‌രംഭത്തില്‍ നിന്നു "$1" എന്ന താള്‍ അയച്ചു',
	'ea-noarticle'        => 'അയക്കുവാന്‍ വേണ്ടി ഒരു താള്‍ തിരഞ്ഞെടുക്കുക. ഉദാ: [[Special:EmailArticle/Main Page]]',
	'ea-norecipients'     => 'സാധുവായ ഇമെയില്‍ വിലാസങ്ങള്‍ കണ്ടില്ല!',
	'ea-listrecipients'   => '=== $1 {{PLURAL:$1|സ്വീകര്‍ത്താവിന്റെ|സ്വീകര്‍ത്താക്കളുടെ}} പട്ടിക ===',
	'ea-error'            => "'''[[$1]] അയക്കുന്നതില്‍ പിഴവ്:''' ''$2''",
	'ea-denied'           => 'അനുവാദം നിഷേധിച്ചിരിക്കുന്നു',
	'ea-sent'             => "[[User:$3|$3]] എന്ന ഉപയോക്താവ് [[$1]] എന്ന താള്‍ വിജയകരമായി '''$2''' {{PLURAL:$2|സ്വീകര്‍ത്താവിനു|സ്വീകര്‍ത്താക്കള്‍ക്ക്}} അയച്ചിരിക്കുന്നു.",
	'ea-selectrecipients' => 'സ്വീകര്‍ത്താക്കളെ‍ തിരഞ്ഞെടുക്കുക',
	'ea-compose'          => 'ഉള്ളടക്കം ചേര്‍ക്കുക',
	'ea-show'             => 'സ്വീകര്‍ത്താക്കളെ പ്രദര്‍ശിപ്പിക്കുക',
	'ea-send'             => 'അയക്കൂ!',
	'ea-subject'          => 'ഇമെയിലിനു ഒരു വിഷയം/ശീര്‍ഷകം ചേര്‍ക്കുക',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'emailarticle'        => 'Pagina e-mailen',
	'ea-desc'             => 'Stuur een gerenderde pagina naar een e-mailadres of een lijst van adressen met behulp van [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading'          => '=== Pagina [[$1]] e-mailen ===',
	'ea-fromgroup'        => 'Van groep:',
	'ea-articlesend'      => 'Pagina "$1" is vanuit $2 verstuurd',
	'ea-noarticle'        => 'Geef een pagina op om te versturen, bijvoorbeeld [[Special:EmailArticle/Hoofdpagina]].',
	'ea-norecipients'     => 'Er is geen geldig e-mailadres opgegeven!',
	'ea-listrecipients'   => '=== Lijst met $1 {{PLURAL:$1|ontvanger|ontvangers}} ===',
	'ea-error'            => "'''Fout bij het versturen van [[$1]]:''' ''$2''",
	'ea-denied'           => 'U hebt geen rechten om deze handeling uit te voeren',
	'ea-sent'             => "Pagina [[$1]] is verstuurd naar '''$2''' {{PLURAL:$2|ontvanger|ontvangers}} door [[User:$3|$3]].",
	'ea-selectrecipients' => 'Ontvangers selecteren',
	'ea-compose'          => 'Inhoud samenstellen',
	'ea-selectlist'       => 'Meer ontvangers als paginanamen of e-mailadressen
*\'\'u kunt adressen scheiden met  ",", ";", "*", of "\\n"
*\'\'de lijst mag sjablonen en parserfuncties bevatten\'\'',
	'ea-show'             => 'Ontvangers weergeven',
	'ea-send'             => 'Versturen',
	'ea-subject'          => 'Voer een onderwerp in voor de e-mail',
	'ea-header'           => 'Laat de pagina-inhoud vooraf gaan door een bericht (in wikitekst)',
	'ea-selectcss'        => 'Selecteer een CSS',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'emailarticle'        => 'Send side som e-post',
	'ea-desc'             => 'Send HTML-side til en eller flere e-postadresser ved hjelp av [http://phpmailer.sourceforge.net/ phpmailer].',
	'ea-heading'          => '=== Send siden [[$1]] som e-post ===',
	'ea-fromgroup'        => 'Fra gruppe:',
	'ea-articlesend'      => 'Siden «$1» sendt fra $2',
	'ea-noarticle'        => 'Oppgi en side du vil sende, for eksempel [[Special:EmailArticle/{{MediaWiki:Mainpage}}]].',
	'ea-norecipients'     => 'Ingen gyldige e-postadresser funnet.',
	'ea-listrecipients'   => '=== Liste over $1 {{PLURAL:$1|mottaker|mottakere}} ===',
	'ea-error'            => "'''Feil under sending av [[$1]]:''' ''$2''",
	'ea-denied'           => 'Ingen adgang',
	'ea-sent'             => "Siden [[$1]] ble sendt til '''$2''' {{PLURAL:$2|mottaker|mottakere}} av [[User:$3|$3]].",
	'ea-selectrecipients' => 'Velg mottakere',
	'ea-compose'          => 'Skriv inn innhold',
	'ea-selectlist'       => "Ytterligere mottakere som sidetitler eller e-postadresser
* ''skill elementer med , ; * \\n
* ''listen kan inneholde maler og parserfunksjoner''",
	'ea-show'             => 'Vis mottakere',
	'ea-send'             => 'Send',
	'ea-subject'          => 'Skriv inn et emne for e-posten',
	'ea-header'           => 'Fyll innholdet med en valgfri beskjed (wikitekst)',
	'ea-selectcss'        => 'Angi en CSS-stilmal',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'emailarticle'        => 'Mandar l’article per corrièr electronic',
	'ea-desc'             => 'Manda lo rendut d’una pagina HTML a una adreça electronica o a una tièra d’adreças en utilizant [http://phpmailer.sourceforge.net phpmailer]',
	'ea-heading'          => '=== Mandadís de la pagina [[$1]] per corrièr electronic ===',
	'ea-fromgroup'        => 'Dempuèi lo grop :',
	'ea-articlesend'      => 'Pagina « $1 » mandada dempuèi $2',
	'ea-noarticle'        => 'Especificatz una pagina de mandar, per exemple [[Special:EmailArticle/Acuèlh]]',
	'ea-norecipients'     => "Cap d'adreça de corrièr electronic pas trobada !",
	'ea-listrecipients'   => '=== Tièra de $1 {{PLURAL:$1|destinatari|destinataris}} ===',
	'ea-error'            => "'''Error del mandadís de [[$1]] :''' ''$2''",
	'ea-denied'           => 'Permission refusada',
	'ea-sent'             => "L'article [[$1]] es estat mandat amb succès a '''$2''' {{PLURAL:$2|destinatari|destinataris}} per [[User:$3|$3]].",
	'ea-selectrecipients' => 'Seleccionar los destinataris',
	'ea-compose'          => 'Compausar lo contengut',
	'ea-selectlist'       => "Destinataris suplementaris coma los títols d'articles o las adreças de corrièr electronic
* ''separar los articles amb , : * \\n''
* ''la tièra pòt conténer de modèls e de foncions parsaires''",
	'ea-show'             => 'Visionar los destinataris',
	'ea-send'             => 'Mandar !',
	'ea-subject'          => 'Entrar una linha « objècte » pel corrièr electronic',
	'ea-header'           => 'Apondre lo contengut al començament amb un messatge facultatiu (tèxt wiki)',
	'ea-selectcss'        => "Seleccionar un fuèlh d'estil CSS",
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'emailarticle'        => 'Poslať stránku emailom',
	'ea-desc'             => 'Poslať stránku vo formáte HTML na emailovú adresu alebo zoznam adries pomocou [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading'          => '=== Poslanie stránky [[$1]] emailom ===',
	'ea-fromgroup'        => 'Zo skupiny:',
	'ea-articlesend'      => 'Článok „$1” poslaný z $2',
	'ea-noarticle'        => 'Prosím, uveďte stránku, ktorú chcete poslať, napr. [[Special:EmailArticle/Hlavná stránka]].',
	'ea-norecipients'     => 'Nebola nájdená platná emailová adresa!',
	'ea-listrecipients'   => '=== Zoznam $1 {{PLURAL:$1|príjemcu|príjemcov}} ===',
	'ea-error'            => "'''Chyba pri odosielaní [[$1]]:''' ''$2''",
	'ea-denied'           => 'Nemáte potrebné oprávnenie',
	'ea-sent'             => "[[User:$3|$3]] úspešne poslal stránku [[$1]] '''$2''' {{PLURAL:$2|používateľovi|používateľom}}.",
	'ea-selectrecipients' => 'Vybrať príjemcov',
	'ea-compose'          => 'Napísať obsah správy',
	'ea-selectlist'       => "Ďalší príjemci vo forme názvov stránok alebo emailových adries
*''položky oddeľujte pomocu , ; * \\n
*''zoznam môže obsahovať šablóny a funkcie syntaktického analyzátora''",
	'ea-show'             => 'Zobraziť príjemcov',
	'ea-send'             => 'Poslať!',
	'ea-subject'          => 'Zadajte predmet emailu',
	'ea-header'           => 'Pred obsah pridať (nepovinne) správu (wikitext)',
	'ea-selectcss'        => 'Vyberte CSS štýl',
);

/** Swedish (Svenska)
 * @author M.M.S.
 */
$messages['sv'] = array(
	'emailarticle'        => 'E-posta sida',
	'ea-desc'             => 'Skicka en renderad HTML-sida till en e-postadress eller en lista över adresser som använder [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading'          => '=== E-posta sidan [[$1]] ===',
	'ea-fromgroup'        => 'Från grupp:',
	'ea-articlesend'      => 'Artikeln "$1" skickades från $2',
	'ea-noarticle'        => 'Var god ange en sida att skicka, för exempel [[Special:EmailArticle/Main Page]].',
	'ea-norecipients'     => 'Inga giltiga e-postadresser hittades!',
	'ea-listrecipients'   => '=== Lista över $1 {{PLURAL:$1|mottagare|mottagare}} ===',
	'ea-error'            => "'''Fel under sändande av [[$1]]:''' ''$2''",
	'ea-denied'           => 'Åtkomst nekas',
	'ea-sent'             => "Sidan [[$1]] har skickats till '''$2''' {{PLURAL:$2|mottagare|mottagare}} av [[User:$3|$3]].",
	'ea-selectrecipients' => 'Ange mottagare',
	'ea-compose'          => 'Komponera innehåll',
	'ea-selectlist'       => "Ytterligare mottagare som sidtitlar eller e-postadresser
*''separera element med, ; * \\n
*''listor kan innehålla mallar och parser-funktioner''",
	'ea-show'             => 'Visa mottagare',
	'ea-send'             => 'Skicka!',
	'ea-subject'          => 'Ange ett ämne för e-brevet',
	'ea-header'           => 'Fyll innehållet med ett valfritt meddelande (wikitext)',
	'ea-selectcss'        => 'Ange en CSS-stilmall',
);

/** Telugu (తెలుగు)
 * @author వైజాసత్య
 */
$messages['te'] = array(
	'ea-send' => 'పంపించు!',
);

/** Vietnamese (Tiếng Việt)
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'emailarticle'        => 'Trang thư điện tử',
	'ea-desc'             => 'Gửi trang HTML giản lược đến một địa chỉ hoặc danh sách các địa chỉ thư điện tử dùng [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading'          => '=== Gửi trang [[$1]] ===',
	'ea-noarticle'        => 'Xin hãy xác định trang muốn gửi, ví dụ [[Special:EmailArticle/Trang_Chính]].',
	'ea-norecipients'     => 'Không tìm thấy địa chỉ thư điện tử hợp lệ!',
	'ea-listrecipients'   => '=== Danh sách $1 {{PLURAL:$1|người nhận|người nhận}} ===',
	'ea-error'            => "'''Lỗi khi gửi [[$1]]:''' ''$2''",
	'ea-sent'             => "Trang [[$1]] đã được [[User:$3|$3]] gửi thành công đến '''$2''' {{PLURAL:$2|người nhận|người nhận}}.",
	'ea-selectrecipients' => 'Chọn người nhận',
	'ea-compose'          => 'Soạn nội dung',
	'ea-selectlist'       => "Những người nhận khác theo tựa đề trang hoặc địa chỉ thư điện tử
*''phân cách các mục bằng , ; * \\n
*''danh sách có thể chứa tiêu bản và hàm cú pháp''",
	'ea-show'             => 'Hiển thị người nhận',
	'ea-send'             => 'Gửi!',
	'ea-subject'          => 'Nhập vào dòng tiêu đề cho thư điện tử',
	'ea-header'           => 'Gắn nội dung với thông điệp tùy chọn (văn bản wiki)',
	'ea-selectcss'        => 'Lựa chọn một kiểu trình bày CSS',
);

