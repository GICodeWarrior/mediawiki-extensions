<?php
/**
 * Internationalisation file for extension EmailPage.
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Nad
 */
$messages['en'] = array(
	'e-mailpage'          => "E-mail page",
	'ea-desc'             => "Send rendered HTML page to an e-mail address or list of addresses using [http://phpmailer.sourceforge.net phpmailer]",
	'ea-heading'          => 'E-mailing the page "[[$1]]"',
	'ea-group-info'       => "Additionally you can send the page to the members of a group",
	'ea-pagesend'         => 'Page "$1" sent from $2',
	'ea-nopage'           => "No page was specified for sending, please use the e-mail link from the sidebar or page actions.",
	'ea-norecipients'     => "No valid e-mail addresses found!",
	'ea-listrecipients'   => 'Listing {{PLURAL:$1|recipient|$1 recipients}}',
	'ea-error'            => "'''Error sending [[$1]]:''' ''$2''",
	'ea-denied'           => "Permission denied",
	'ea-sent'             => "Page [[$1]] sent successfully to '''$2''' {{PLURAL:$2|recipient|recipients}} by [[User:$3|$3]].",
	'ea-compose'          => "Compose content",
	'ea-show'             => "View recipient list",
	'ea-from'             => 'From:',
	'ea-to'               => 'To:',
	'ea-to-info'          => "E-mail addresses can be separated with one or more semicolon, comma, asterisk or newline characters",
	'ea-cc'               => 'CC:',
	'ea-send'             => "Send",
	'ea-subject'          => 'Subject:',
	'ea-message'          => 'Message:',
	'ea-message-info'     => "Prepend content with optional wikitext message",
	'ea-style'            => 'Style:',
	'ea-selectcss'        => "You can select a stylesheet",
	'ea-data'             => "Data",
	'ea-selectrecord'     => "These templates can be used to fill in fields in the message content",
	'ea-allusers'         => "All users"
);

/** Message documentation (Message documentation)
 * @author Jon Harald Søby
 */
$messages['qqq'] = array(
	'ea-send' => '{{Identical|Send}}',
);

/** Arabic (العربية)
 * @author Meno25
 * @author OsamaK
 */
$messages['ar'] = array(
	'e-mailpage' => 'إرسال رسالة للمستخدم',
	'ea-desc' => 'يرسل صفحة ناتجة ب HTML لعنوان بريد إلكتروني أو قائمة عناوين باستخدام [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading' => '=== مراسلة الصفحة [[$1]] ===',
	'ea-pagesend' => 'الصفحة "$1" أُرسلت من $2',
	'ea-nopage' => 'من فضلك حدد صفحة للإرسال، على سبيل المثال "[[Special:e-mailpage/{{MediaWiki:Mainpage-url}}]]".',
	'ea-norecipients' => 'لم يتم إيجاد عناوين بريد إلكتروني صحيحة!',
	'ea-listrecipients' => '=== {{PLURAL:$1|متلقي|$1 متلقي}} ===',
	'ea-error' => "'''خطأ في إرسال [[$1]]:''' ''$2''",
	'ea-denied' => 'السماح مرفوض',
	'ea-sent' => "الصفحة [[$1]] تم إرسالها بنجاح إلى '''$2''' {{PLURAL:$2|متلق|متلق}} بواسطة [[User:$3|$3]].",
	'ea-compose' => 'كتابة المحتوى',
	'ea-show' => 'عرض المتلقين',
	'ea-send' => 'إرسال!',
	'ea-subject' => 'أدخل سطر عنوان للبريد الإلكتروني',
	'ea-message' => 'إرسال المحتوى برسالة اختيارية (نص ويكي)',
	'ea-selectcss' => 'اختر شريحة CSS',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 */
$messages['arz'] = array(
	'e-mailpage' => 'إرسال رسالة للمستخدم',
	'ea-desc' => 'يرسل صفحة ناتجة ب HTML لعنوان بريد إلكترونى أو قائمة عناوين باستخدام [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading' => '=== مراسلة الصفحة [[$1]] ===',
	'ea-pagesend' => 'الصفحة "$1" أُرسلت من $2',
	'ea-nopage' => 'من فضلك حدد صفحة للإرسال، على سبيل المثال "[[Special:e-mailpage/{{MediaWiki:Mainpage-url}}]]".',
	'ea-norecipients' => 'لم يتم إيجاد عناوين بريد إلكترونى صحيحة!',
	'ea-listrecipients' => '=== {{PLURAL:$1|متلقي|$1 متلقي}} ===',
	'ea-error' => "'''خطأ في إرسال [[$1]]:''' ''$2''",
	'ea-denied' => 'السماح مرفوض',
	'ea-sent' => "الصفحة [[$1]] تم إرسالها بنجاح إلى '''$2''' {{PLURAL:$2|متلق|متلق}} بواسطة [[User:$3|$3]].",
	'ea-compose' => 'كتابة المحتوى',
	'ea-show' => 'عرض المتلقين',
	'ea-send' => 'إرسال!',
	'ea-subject' => 'أدخل سطر عنوان للبريد الإلكتروني',
	'ea-message' => 'إرسال المحتوى برسالة اختيارية (نص ويكى)',
	'ea-selectcss' => 'اختر شريحة CSS',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'ea-from' => 'Ад:',
	'ea-to' => 'Да:',
	'ea-selectcss' => 'Вы можаце выбраць табліцу стыляў',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'ea-nopage' => 'Необходимо е да се посочи страница, която да бъде изпратена, напр. [[Special:e-mailpage/Начална страница]].',
	'ea-norecipients' => 'Не бяха намерени валидни адреси за е-поща!',
	'ea-listrecipients' => '=== Списък на $1 {{PLURAL:$1|получател|получателя}} ===',
	'ea-error' => "'''Грешка при изпращане на [[$1]]:''' ''$2''",
	'ea-show' => 'Показване на получателите',
	'ea-send' => 'Изпращане!',
	'ea-selectcss' => 'Избиране на CSS стил',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'e-mailpage' => 'Kas ar bajenn dre bostel',
	'ea-desc' => "Kas a ra ur bajenn doare HTML d'ur chomlec'h postel pe d'ur roll chomlec'hioù en ur ober gant [http://phpmailer.sourceforge.net phpmailer]",
	'ea-heading' => 'Kas ar bajenn dre bostel "[[$1]]"',
	'ea-group-info' => 'Gallout a rit kas ar bajenn da izili ur strollad ivez',
	'ea-pagesend' => 'Pajenn "$1" kaset adalek $2',
	'ea-nopage' => "N'eus bet spisaet pajenn ebet da vezañ kaset, grit gant al liamm postel er varrenn-gostez pe obererezhioù ar bajenn.",
	'ea-norecipients' => "N'eus bet kavet chomlec'h postel reizh ebet !",
	'ea-listrecipients' => 'O rollañ {{PLURAL:$1|resever|$1 resever}}',
	'ea-error' => "'''Fazi en ur gas [[$1]]:''' ''$2''",
	'ea-denied' => "Aotre nac'het",
	'ea-sent' => "Kaset eo bet ar bajenn [[$1]] ervat da '''$2''' {{PLURAL:$2|resever|resever}} gant [[User:$3|$3]].",
	'ea-compose' => 'Sevel ar pennad-skrid',
	'ea-show' => 'Gwelet roll ar reseverien',
	'ea-from' => 'Digant :',
	'ea-to' => 'Da :',
	'ea-to-info' => "Gallout a ra ar chomlec'hioù postel bezañ dispartiet dre ur pik-skej pe meur a hini, ur skej, ur steredennig pe arouezennoù linenn nevez",
	'ea-cc' => 'CC :',
	'ea-send' => 'Kas',
	'ea-subject' => 'Danvez :',
	'ea-message' => 'Postel :',
	'ea-style' => 'Stil :',
	'ea-selectcss' => 'Dibabit ur follenn stil CSS',
	'ea-data' => 'Roadennoù',
	'ea-selectrecord' => "Ober gant ar patromoù-mañ a c'haller da leuniañ maeziennoù e diabarzh ar postel",
	'ea-allusers' => 'An holl implijerien',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'e-mailpage' => 'Stranica za e-mail',
	'ea-desc' => 'Omogućava slanje HTML stranice na adresu e-maila ili spisak adresa koristeći [http://phpmailer.sourceforge.net phpmailer]',
	'ea-heading' => 'E-mailom šaljem stranicu "[[$1]]"',
	'ea-group-info' => 'Dodatno možete poslati stranicu članovima grupe',
	'ea-pagesend' => 'Stranica "$1" poslana od $2',
	'ea-nopage' => 'Nije određena stranica za slanje, molimo koristite e-mail link iz menija sa strane ili akcije stranice.',
	'ea-norecipients' => 'Nisu pronađene valjane e-mail adrese!',
	'ea-listrecipients' => 'Prikazujem {{PLURAL:$1|primaoca|$1 primaoca}}',
	'ea-error' => "'''Greška pri slanju [[$1]]:''' ''$2''",
	'ea-denied' => 'Pristup onemogućen',
	'ea-sent' => "Stranica [[$1]] uspješno poslana na '''$2''' {{PLURAL:$2|primaoca|primaoca|primaoce}} od strane [[User:$3|$3]].",
	'ea-compose' => 'Unesi sadržaj',
	'ea-show' => 'Vidi spisak primaoca',
	'ea-from' => 'Od:',
	'ea-to' => 'Za:',
	'ea-to-info' => 'E-mail adrese mogu biti odvojene sa dvije tačke ili više njih, zarezom, zvijezdicom ili znakom za novi red',
	'ea-cc' => 'CC:',
	'ea-send' => 'Pošalji',
	'ea-subject' => 'Tema:',
	'ea-message' => 'Poruka:',
	'ea-message-info' => 'Spoji sadržaj sa opcionalnom porukom u wikitekstu',
	'ea-style' => 'Stil:',
	'ea-selectcss' => 'Možete odabrati CSS-stylesheet',
	'ea-data' => 'Podatak',
	'ea-selectrecord' => 'Ovi šabloni se mogu koristiti za ispunjavanje polja u sadržaju poruke',
	'ea-allusers' => 'Svi korisnici',
);

/** German (Deutsch)
 * @author Church of emacs
 * @author Kghbln
 * @author Leithian
 * @author kghbln
 */
$messages['de'] = array(
	'e-mailpage' => 'Per E-Mail versenden',
	'ea-desc' => 'Ermöglicht das Versenden von HTML-Seiten an E-Mail-Adressen oder E-Mail-Adresslisten mit [http://phpmailer.worxware.com/ PHPMailer]',
	'ea-heading' => '=== E-Mail-Versand von Seite „[[$1]]“ ===',
	'ea-group-info' => 'Zusätzlich kann die Seite an die Mitglieder einer Benutzergruppe gesandt werden',
	'ea-pagesend' => 'Seite „$1“ (aus $2)',
	'ea-nopage' => 'Zum Versenden wurde keine Seite angegeben. Bitte den Link „Per E-Mail versenden“ in der Seitenleiste unter Werkzeuge oder den entsprechenden Reiter oben in der Menüleiste verwenden.',
	'ea-norecipients' => 'Es sind keine E-Mail-Adressen zum Versenden vorhanden!',
	'ea-listrecipients' => '=== {{PLURAL:$1|Empfänger|$1 Empfänger}} ===',
	'ea-error' => "'''Fehler beim Versenden von Seite „[[$1]]“:''' $2",
	'ea-denied' => 'E-Mail-Versand konnte aufgrund fehlender Berechtigung nicht durchgeführt werden.',
	'ea-sent' => "Seite „[[$1]]“ wurde erfolgreich von [[User:$3|$3]] an '''$2''' {{PLURAL:$2|Empfänger|Empfänger}} versandt.",
	'ea-compose' => 'Nachricht verfassen',
	'ea-show' => 'Empfänger anzeigen',
	'ea-from' => 'Von:',
	'ea-to' => 'An:',
	'ea-to-info' => 'E-Mail-Adressen können mit einem Semikolon, Komma, Sternchen oder einem Zeichen für eine neue Zeile („\\n“) voneinander getrennt werden',
	'ea-cc' => 'CC:',
	'ea-send' => 'Senden',
	'ea-subject' => 'Betreff:',
	'ea-message' => 'Nachricht:',
	'ea-message-info' => 'Dem Inhalt der Seite eine Nachricht voranstellen (optional, Eingabe in Wikitext erforderlich):',
	'ea-style' => 'Stil:',
	'ea-selectcss' => 'Stylesheet auswählen:',
	'ea-data' => 'Daten',
	'ea-selectrecord' => 'Datengruppe auswählen (falls vorhanden):',
	'ea-allusers' => 'Alle Benutzer',
);

/** German (Deutsch)
 * @author Church of emacs
 * @author Leithian
 * @author kghbln
 */
$messages['de-formal'] = array(
	'ea-nopage' => "Bitte geben Sie eine Seite zum Versenden an, bspw. \"[[Special:e-mailpage/{{MediaWiki:Mainpage-url}}]]\".",
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'e-mailpage' => 'Retpoŝtigi paĝon',
	'ea-heading' => '=== Retpoŝtigante paĝon [[$1]] ===',
	'ea-pagesend' => 'Paĝo "$1" sendita de $2',
	'ea-nopage' => 'Bonvolu enigi paĝon por retsendi, ekz-e [[Special:e-mailpage/Main Page]].',
	'ea-norecipients' => 'Neniaj validaj retadresoj trovitaj!',
	'ea-listrecipients' => '=== Listo de $1 {{PLURAL:$1|ricevonto|ricevontoj}} ===',
	'ea-error' => "'''Eraro sendante [[$1]]:''' ''$2''",
	'ea-denied' => 'Malpermesite',
	'ea-sent' => "Paĝo [[$1]] sendita sukcese al '''$2''' {{PLURAL:$2|ricevonto|ricevontoj}} de [[User:$3|$3]].",
	'ea-compose' => 'Skribu enhavon',
	'ea-send' => 'Sendi!',
	'ea-selectcss' => 'Selekti CSS-tiparŝablono',
);

/** French (Français)
 * @author Grondin
 */
$messages['fr'] = array(
	'e-mailpage' => 'Envoyer l’article par courriel',
	'ea-desc' => 'Envoie le rendu d’une page HTML à une adresse électronique où à une liste d’adresses en utilisant [http://phpmailer.sourceforge.net phpmailer]',
	'ea-heading' => '=== Envoi de la page [[$1]] par courrier électronique ===',
	'ea-pagesend' => 'Page « $1 » envoyée depuis $2',
	'ea-nopage' => 'Veuillez spécifier une page à envoyer, par exemple [[Special:e-mailpage/{{MediaWiki:Mainpage-url}}]]',
	'ea-norecipients' => 'Aucune adresse courriel de trouvée !',
	'ea-listrecipients' => '=== Liste de $1 {{PLURAL:$1|destinataire|destinataires}} ===',
	'ea-error' => "'''Erreur de l’envoi de [[$1]] :''' ''$2''",
	'ea-denied' => 'Permission refusée',
	'ea-sent' => "L'article [[$1]] a été envoyé avec succès à '''$2''' {{PLURAL:$2|destinataire|destinataires}} par [[User:$3|$3]].",
	'ea-compose' => 'Composer le contenu',
	'ea-show' => 'Visionner les destinataires',
	'ea-send' => 'Envoyer !',
	'ea-subject' => 'Entrer une ligne « objet » pour le courriel',
	'ea-message' => 'Ajouter le contenu au début avec un message facultatif (texte wiki)',
	'ea-selectcss' => 'Sélectionner une feuille de style CSS',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'e-mailpage' => 'Enviar a páxina por correo electrónico',
	'ea-desc' => 'Enviar páxinas HTML renderizadas a un enderezo de correo electrónico (ou a varios correos) usando [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading' => '=== Enviando a páxina "[[$1]]" ===',
	'ea-pagesend' => 'O artigo "$1" foi enviado desde $2',
	'ea-nopage' => 'Por favor, especifique a páxina que quere enviar, por exemplo: [[Special:e-mailpage/{{MediaWiki:Mainpage-url}}]].',
	'ea-norecipients' => 'Non foi atopado ningún enderezo de correo electrónico válido!',
	'ea-listrecipients' => '=== {{PLURAL:$1|Nome do destinatario|Listaxe dos $1 destinatarios}} ===',
	'ea-error' => "'''Erro no envío de \"[[\$1]]\":''' ''\$2''",
	'ea-denied' => 'Permiso denegado',
	'ea-sent' => 'A páxina "[[$1]]" foi enviada con éxito a \'\'\'$2\'\'\' {{PLURAL:$2|destinatario|destinatarios}} por [[User:$3|$3]].',
	'ea-compose' => 'Compoñer o contido',
	'ea-show' => 'Amosar os destinatarios',
	'ea-send' => 'Enviar!',
	'ea-subject' => 'Introducir un asunto ao correo electrónico',
	'ea-message' => 'Engadir o contido cunha mensaxe opcional (texto wiki)',
	'ea-selectcss' => 'Seleccionar unha folla de estilo CSS',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'e-mailpage' => 'E-mejlowa strona',
	'ea-heading' => 'Strona "[[$1]]" so e-mejluje',
	'ea-group-info' => 'Přidatnje móžeš stronu na čłonow skupiny pósłać',
	'ea-pagesend' => 'Stronu "$1" wot $2 pósłana',
	'ea-norecipients' => 'Žane płaćiwe e-mejlowe adresy namakane!',
	'ea-listrecipients' => '{{PLURAL:$1|přijimowar so nalistuje|$1 přijimowarjej so nalistujetaj|$1 přijimowarjo so nalistuja|$1 přijimowarjow so nalistuje}}',
	'ea-error' => "'''Zmylk při słanju [[$1]]:''' ''$2''",
	'ea-denied' => 'Dowolnosć zapowědźena',
	'ea-sent' => "Strona [[$1]] bu wot [[User:$3|$3]] wuspěšnje  na '''$2''' {{PLURAL:$2|přijimowarja|přijimowarjow|přijimowarjow|přijimowarjow}} pósłana.",
	'ea-compose' => 'Wobsah spisać',
	'ea-show' => 'Lisćinu přijimowarjow pokazać',
	'ea-from' => 'Wot:',
	'ea-to' => 'Komu:',
	'ea-to-info' => 'E-mejlowe adresy hodźa so přez semikolon, komu, asterisk abo linkowe łamanje wotdźělić',
	'ea-cc' => 'Kopija:',
	'ea-send' => 'Pósłać',
	'ea-subject' => 'Tema:',
	'ea-message' => 'Powěsć:',
	'ea-style' => 'Stil:',
	'ea-selectcss' => 'Móžeš stilowu předłohu wubrać',
	'ea-data' => 'Daty',
	'ea-allusers' => 'Wšitcy wužiwarjo',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'e-mailpage' => 'Inviar pagina per e-mail',
	'ea-desc' => 'Inviar le rendition HTML de un pagina a un adresse de e-mail o a un lista de adresses con [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading' => '=== Invio del pagina [[$1]] per e-mail ===',
	'ea-pagesend' => 'Pagina "$1" inviate ab $2',
	'ea-nopage' => 'Per favor specifica un pagina a inviar, per exemplo "[[Special:e-mailpage/{{MediaWiki:Mainpage-url}}]]".',
	'ea-norecipients' => 'Nulle adresses de e-mail valide trovate!',
	'ea-listrecipients' => '=== {{PLURAL:$1|Destinatario|$1 destinatarios}} ===',
	'ea-error' => "'''Error durante le invio de [[$1]]:''' ''$2''",
	'ea-denied' => 'Permission refusate',
	'ea-sent' => "Le pagina [[$1]] ha essite inviate con successo a '''$2''' {{PLURAL:$2|destinatario|destinatarios}} per [[User:$3|$3]].",
	'ea-compose' => 'Componer contento',
	'ea-show' => 'Monstrar destinatarios',
	'ea-send' => 'Inviar!',
	'ea-subject' => 'Entra un linea de subjecto pro le message de e-mail',
	'ea-message' => 'Adjunger le contento al initio con un message facultative (texto wiki)',
	'ea-selectcss' => 'Selige un folio de stilos CSS',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Lovekhmer
 */
$messages['km'] = array(
	'e-mailpage' => 'ទំព័រអ៊ីមែល',
	'ea-pagesend' => 'ទំព័រ"$1"ត្រូវបានបញ្ជូនពី$2',
	'ea-send' => 'ផ្ញើ!',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'e-mailpage' => 'Säit per Mail schécken',
	'ea-heading' => '=== Säit [[$1]] peer E-Mail verschécken ===',
	'ea-pagesend' => 'D\'Säit "$1" gouf verschéckt vum $2',
	'ea-norecipients' => 'Keng gëlteg E-Mailadress fonnt',
	'ea-denied' => 'Rechter refuséiert',
	'ea-show' => 'Adressate weisen',
	'ea-send' => 'Schécken!',
	'ea-subject' => "Gitt w.e.g. e Sujet fir d'E-Mail an",
	'ea-selectcss' => "Een ''CSS Stylesheet'' auswielen",
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'e-mailpage' => 'ഇമെയില്‍ താള്‍',
	'ea-heading' => '=== [[$1]] എന്ന താള്‍ ഇമെയില്‍ ചെയ്യുന്നു ===',
	'ea-pagesend' => '$2 സം‌രംഭത്തില്‍ നിന്നു "$1" എന്ന താള്‍ അയച്ചു',
	'ea-nopage' => 'അയക്കുവാന്‍ വേണ്ടി ഒരു താള്‍ തിരഞ്ഞെടുക്കുക. ഉദാ: [[Special:e-mailpage/Main Page]]',
	'ea-norecipients' => 'സാധുവായ ഇമെയില്‍ വിലാസങ്ങള്‍ കണ്ടില്ല!',
	'ea-listrecipients' => '=== $1 {{PLURAL:$1|സ്വീകര്‍ത്താവിന്റെ|സ്വീകര്‍ത്താക്കളുടെ}} പട്ടിക ===',
	'ea-error' => "'''[[$1]] അയക്കുന്നതില്‍ പിഴവ്:''' ''$2''",
	'ea-denied' => 'അനുവാദം നിഷേധിച്ചിരിക്കുന്നു',
	'ea-sent' => "[[User:$3|$3]] എന്ന ഉപയോക്താവ് [[$1]] എന്ന താള്‍ വിജയകരമായി '''$2''' {{PLURAL:$2|സ്വീകര്‍ത്താവിനു|സ്വീകര്‍ത്താക്കള്‍ക്ക്}} അയച്ചിരിക്കുന്നു.",
	'ea-compose' => 'ഉള്ളടക്കം ചേര്‍ക്കുക',
	'ea-show' => 'സ്വീകര്‍ത്താക്കളെ പ്രദര്‍ശിപ്പിക്കുക',
	'ea-send' => 'അയക്കൂ!',
	'ea-subject' => 'ഇമെയിലിനു ഒരു വിഷയം/ശീര്‍ഷകം ചേര്‍ക്കുക',
);

/** Marathi (मराठी)
 * @author Kaustubh
 */
$messages['mr'] = array(
	'e-mailpage' => 'पान इ-मेल करा',
	'ea-desc' => ' [http://phpmailer.sourceforge.net पीएचपी मेलर] चा वापर करून एखादे पान एखाद्या इ-मेल पत्त्यावर किंवा इ-मेल पत्त्यांच्या यादीवर पाठवा.',
	'ea-heading' => '=== [[$1]] पान इ-मेल करीत आहे ===',
	'ea-pagesend' => '$2 ने "$1" पान पाठविले',
	'ea-nopage' => 'कृपया पाठविण्यासाठी एक पान निवडा, उदाहरणासाठी [[Special:e-mailpage/Main Page]].',
	'ea-norecipients' => 'योग्य इ-मेल पत्ता सापडला नाही!',
	'ea-listrecipients' => '=== $1 {{PLURAL:$1|सदस्याची|सदस्यांची}}यादी ===',
	'ea-error' => "'''पाठविण्यामध्ये त्रुटी [[$1]]:''' ''$2''",
	'ea-denied' => 'परवानगी नाकारली',
	'ea-sent' => "[[User:$3|$3]] ने [[$1]] पान '''$2''' {{PLURAL:$2|सदस्याला|सदस्यांना}} पाठविले.",
	'ea-compose' => 'मजकूर लिहा',
	'ea-show' => 'निवडलेले सदस्य दाखवा',
	'ea-send' => 'पाठवा!',
	'ea-subject' => 'इ-मेल चा विषय लिहा',
	'ea-message' => 'मजकूरा आधी वैकल्पिक संदेश लिहा (विकिसंज्ञा)',
	'ea-selectcss' => 'सीएसएस स्टाइलशीट पाठवा',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'e-mailpage' => 'E-mail zāzanilli',
	'ea-heading' => '=== E-mailhua in zāzanilli $1 ===',
	'ea-send' => 'Ticquihuāz',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'ea-fromgroup' => 'Vun Grupp:',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'e-mailpage' => 'Pagina e-mailen',
	'ea-desc' => 'Stuur een gerenderde pagina naar een e-mailadres of een lijst van adressen met behulp van [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading' => '=== Pagina [[$1]] e-mailen ===',
	'ea-pagesend' => 'Pagina "$1" is vanuit $2 verstuurd',
	'ea-nopage' => 'Geef een pagina op om te versturen, bijvoorbeeld [[Special:e-mailpage/Hoofdpagina]].',
	'ea-norecipients' => 'Er is geen geldig e-mailadres opgegeven!',
	'ea-listrecipients' => '=== Lijst met $1 {{PLURAL:$1|ontvanger|ontvangers}} ===',
	'ea-error' => "'''Fout bij het versturen van [[$1]]:''' ''$2''",
	'ea-denied' => 'U hebt geen rechten om deze handeling uit te voeren',
	'ea-sent' => "Pagina [[$1]] is verstuurd naar '''$2''' {{PLURAL:$2|ontvanger|ontvangers}} door [[User:$3|$3]].",
	'ea-compose' => 'Inhoud samenstellen',
	'ea-show' => 'Ontvangers weergeven',
	'ea-send' => 'Versturen',
	'ea-subject' => 'Voer een onderwerp in voor de e-mail',
	'ea-message' => 'Laat de pagina-inhoud vooraf gaan door een bericht (in wikitekst)',
	'ea-selectcss' => 'Selecteer een CSS',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'e-mailpage' => 'Send side som e-post',
	'ea-desc' => 'Send HTML-side til en eller flere e-postadresser ved hjelp av [http://phpmailer.sourceforge.net/ phpmailer].',
	'ea-heading' => '=== Send siden [[$1]] som e-post ===',
	'ea-group-info' => 'I tillegg kan du sende siden til medlemmene av en gruppe',
	'ea-pagesend' => 'Siden «$1» sendt fra $2',
	'ea-nopage' => 'Oppgi en side du vil sende, for eksempel [[Special:e-mailpage/{{MediaWiki:Mainpage-url}}]].',
	'ea-norecipients' => 'Ingen gyldige e-postadresser funnet.',
	'ea-listrecipients' => '=== Liste over $1 {{PLURAL:$1|mottaker|mottakere}} ===',
	'ea-error' => "'''Feil under sending av [[$1]]:''' ''$2''",
	'ea-denied' => 'Ingen adgang',
	'ea-sent' => "Siden [[$1]] ble sendt til '''$2''' {{PLURAL:$2|mottaker|mottakere}} av [[User:$3|$3]].",
	'ea-compose' => 'Skriv inn innhold',
	'ea-show' => 'Vis mottakere',
	'ea-from' => 'Fra:',
	'ea-to' => 'Til:',
	'ea-to-info' => 'E-postadresser kan skilles med et eller flere semikolon, komma, stjerne eller linjeskift',
	'ea-cc' => 'CC:',
	'ea-send' => 'Send',
	'ea-subject' => 'Emne:',
	'ea-message' => 'Melding:',
	'ea-selectcss' => 'Du kan velge et stilark',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'e-mailpage' => 'Mandar l’article per corrièr electronic',
	'ea-desc' => 'Manda lo rendut d’una pagina HTML a una adreça electronica o a una tièra d’adreças en utilizant [http://phpmailer.sourceforge.net phpmailer]',
	'ea-heading' => '=== Mandadís de la pagina [[$1]] per corrièr electronic ===',
	'ea-pagesend' => 'Pagina « $1 » mandada dempuèi $2',
	'ea-nopage' => 'Especificatz una pagina de mandar, per exemple [[Special:e-mailpage/Acuèlh]]',
	'ea-norecipients' => "Cap d'adreça de corrièr electronic pas trobada !",
	'ea-listrecipients' => '=== Tièra de $1 {{PLURAL:$1|destinatari|destinataris}} ===',
	'ea-error' => "'''Error del mandadís de [[$1]] :''' ''$2''",
	'ea-denied' => 'Permission refusada',
	'ea-sent' => "L'article [[$1]] es estat mandat amb succès a '''$2''' {{PLURAL:$2|destinatari|destinataris}} per [[User:$3|$3]].",
	'ea-compose' => 'Compausar lo contengut',
	'ea-show' => 'Visionar los destinataris',
	'ea-send' => 'Mandar !',
	'ea-subject' => 'Entrar una linha « objècte » pel corrièr electronic',
	'ea-message' => 'Apondre lo contengut al començament amb un messatge facultatiu (tèxt wiki)',
	'ea-selectcss' => "Seleccionar un fuèlh d'estil CSS",
);

/** Polish (Polski)
 * @author Maikking
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'ea-desc' => 'Wyślij stronę HTML na adres e-mail lub grupę adresów za pomocą [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading' => '=== Wysłanie na e-mail strony [[$1]] ===',
	'ea-pagesend' => 'Strona "$1" wysłana z $2',
	'ea-nopage' => 'Wybierz stronę do wysłania, przykładowo [[Special:e-mailpage/{{MediaWiki:Mainpage-url}}]].',
	'ea-norecipients' => 'Nie znaleziono prawidłowego adresu e-mail.',
	'ea-listrecipients' => '=== {{PLURAL:$1|Odbiorca|$1 odbiorców}} ===',
	'ea-error' => "'''Błąd podczas wysyłania [[$1]]:''' ''$2''",
	'ea-denied' => 'Odmowa dostępu',
	'ea-sent' => "Strona [[$1]] została wysłana do '''$2''' {{PLURAL:$2|odbiorcy|odbiorców}} przez [[User:$3|$3]].",
	'ea-compose' => 'Tworzenie zawartości',
	'ea-show' => 'Pokaż odbiorców',
	'ea-send' => 'Wyślij',
	'ea-subject' => 'Wprowadź temat wiadomości e-mail',
	'ea-message' => 'Dołączanie zawartości z dodatkową informacją.',
	'ea-selectcss' => 'Wybierz styl CSS',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'ea-fromgroup' => 'Din grupul:',
	'ea-send' => 'Trimite!',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'e-mailpage' => 'Poslať stránku emailom',
	'ea-desc' => 'Poslať stránku vo formáte HTML na emailovú adresu alebo zoznam adries pomocou [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading' => '=== Poslanie stránky [[$1]] emailom ===',
	'ea-pagesend' => 'Článok „$1” poslaný z $2',
	'ea-nopage' => 'Prosím, uveďte stránku, ktorú chcete poslať, napr. [[Special:e-mailpage/Hlavná stránka]].',
	'ea-norecipients' => 'Nebola nájdená platná emailová adresa!',
	'ea-listrecipients' => '=== Zoznam $1 {{PLURAL:$1|príjemcu|príjemcov}} ===',
	'ea-error' => "'''Chyba pri odosielaní [[$1]]:''' ''$2''",
	'ea-denied' => 'Nemáte potrebné oprávnenie',
	'ea-sent' => "[[User:$3|$3]] úspešne poslal stránku [[$1]] '''$2''' {{PLURAL:$2|používateľovi|používateľom}}.",
	'ea-compose' => 'Napísať obsah správy',
	'ea-show' => 'Zobraziť príjemcov',
	'ea-send' => 'Poslať!',
	'ea-subject' => 'Zadajte predmet emailu',
	'ea-message' => 'Pred obsah pridať (nepovinne) správu (wikitext)',
	'ea-selectcss' => 'Vyberte CSS štýl',
);

/** Sundanese (Basa Sunda)
 * @author Irwangatot
 */
$messages['su'] = array(
	'ea-send' => 'Kintun!',
);

/** Swedish (Svenska)
 * @author Jon Harald Søby
 * @author M.M.S.
 */
$messages['sv'] = array(
	'e-mailpage' => 'E-posta sida',
	'ea-desc' => 'Skicka en renderad HTML-sida till en e-postadress eller en lista över adresser som använder [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading' => '=== E-posta sidan [[$1]] ===',
	'ea-pagesend' => 'Artikeln "$1" skickades från $2',
	'ea-nopage' => 'Var god ange en sida att skicka, för exempel [[Special:e-mailpage/{{MediaWiki:Mainpage-url}}]].',
	'ea-norecipients' => 'Inga giltiga e-postadresser hittades!',
	'ea-listrecipients' => '=== Lista över $1 {{PLURAL:$1|mottagare|mottagare}} ===',
	'ea-error' => "'''Fel under sändande av [[$1]]:''' ''$2''",
	'ea-denied' => 'Åtkomst nekas',
	'ea-sent' => "Sidan [[$1]] har skickats till '''$2''' {{PLURAL:$2|mottagare|mottagare}} av [[User:$3|$3]].",
	'ea-compose' => 'Komponera innehåll',
	'ea-show' => 'Visa mottagare',
	'ea-send' => 'Skicka!',
	'ea-subject' => 'Ange ett ämne för e-brevet',
	'ea-message' => 'Fyll innehållet med ett valfritt meddelande (wikitext)',
	'ea-selectcss' => 'Ange en CSS-stilmall',
);

/** Telugu (తెలుగు)
 * @author Veeven
 * @author వైజాసత్య
 */
$messages['te'] = array(
	'ea-denied' => 'అనుమతిని నిరాకరించాం',
	'ea-send' => 'పంపించు!',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'e-mailpage' => 'Trang thư điện tử',
	'ea-desc' => 'Gửi trang HTML giản lược đến một địa chỉ hoặc danh sách các địa chỉ thư điện tử dùng [http://phpmailer.sourceforge.net phpmailer].',
	'ea-heading' => '=== Gửi trang [[$1]] ===',
	'ea-nopage' => 'Xin hãy xác định trang muốn gửi, ví dụ [[Special:e-mailpage/{{MediaWiki:Mainpage-url}}]].',
	'ea-norecipients' => 'Không tìm thấy địa chỉ thư điện tử hợp lệ!',
	'ea-listrecipients' => '=== Danh sách $1 {{PLURAL:$1|người nhận|người nhận}} ===',
	'ea-error' => "'''Lỗi khi gửi [[$1]]:''' ''$2''",
	'ea-sent' => "Trang [[$1]] đã được [[User:$3|$3]] gửi thành công đến '''$2''' {{PLURAL:$2|người nhận|người nhận}}.",
	'ea-compose' => 'Soạn nội dung',
	'ea-show' => 'Hiển thị người nhận',
	'ea-send' => 'Gửi!',
	'ea-subject' => 'Nhập vào dòng tiêu đề cho thư điện tử',
	'ea-message' => 'Gắn nội dung với thông điệp tùy chọn (văn bản wiki)',
	'ea-selectcss' => 'Lựa chọn một kiểu trình bày CSS',
);

