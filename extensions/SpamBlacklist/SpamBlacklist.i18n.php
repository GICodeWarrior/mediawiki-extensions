<?php
/**
 * Internationalisation file for SpamBlacklist extension.
 *
 * @addtogroup Extensions
*/

/**
 * Prepare extension messages
 *
 * @return array
 */
function efSpamBlacklistMessages() {
	$messages = array(

'en' => array(
	'spam-blacklist' => '
 # External URLs matching this list will be blocked when added to a page.
 # This list affects only this wiki; refer also to the global blacklist.
 # For documentation see http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- leave this line exactly as it is --> <pre>
#
# Syntax is as follows:
#   * Everything from a "#" character to the end of the line is a comment
#   * Every non-blank line is a regex fragment which will only match hosts inside URLs

 #</pre> <!-- leave this line exactly as it is -->',
	'spam-whitelist' => '
 #<!-- leave this line exactly as it is --> <pre>
# External URLs matching this list will *not* be blocked even if they would
# have been blocked by blacklist entries.
#
# Syntax is as follows:
#   * Everything from a "#" character to the end of the line is a comment
#   * Every non-blank line is a regex fragment which will only match hosts inside URLs

 #</pre> <!-- leave this line exactly as it is -->',
	'spam-invalid-lines' =>
	"The following spam blacklist {{PLURAL:$1|line is an|lines are}} " .
	" invalid regular {{PLURAL:$1|expression|expressions}} " .
	" and {{PLURAL:$1|needs|need}} to be corrected before saving the page:\n",
),

'de' => array(
	'spam-blacklist' => '
 # Externe URLs, die in dieser Liste enthalten sind, blockieren das Speichern der Seite.
 # Diese Liste betrifft nur dieses Wiki; siehe auch die globale Blacklist.
 # Zur Dokumenation siehe http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- Diese Zeile darf nicht verändert werden! --> <pre>
#
# Syntax:
#   * Alles ab dem "#"-Zeichen bis zum Ende der Zeile ist ein Kommentar
#   * Jede nicht-leere Zeile ist ein regulärer Ausdruck, der gegen die Host-Namen in den URLs geprüft wird.

 #</pre> <!-- Diese Zeile darf nicht verändert werden! -->',

	'spam-whitelist' => '
 #<!-- Diese Zeile darf nicht verändert werden! --> <pre>
# Externe URLs, die in dieser Liste enthalten sind, blockieren das Speichern der Seite nicht, auch wenn sie
# in der globalen oder lokalen schwarzen Liste enthalten sind.
#
# Syntax:
#   * Alles ab dem "#"-Zeichen bis zum Ende der Zeile ist ein Kommentar
#   * Jede nicht-leere Zeile ist ein regulärer Ausdruck, der gegen die Host-Namen in den URLs geprüft wird.

 #</pre> <!-- Diese Zeile darf nicht verändert werden! -->',

	'spam-invalid-lines' =>
	"{{PLURAL:$1
	| Die folgende Zeile in der Spam-Blacklist ist ein ungültiger regulärer Ausdruck. Sie muss vor dem Speichern der Seite korrigiert werden
	| Die folgenden Zeilen in der Spam-Blacklist sind ungültige reguläre Ausdrücke. Sie müssen vor dem Speichern der Seite korrigiert werden}}:\n",
),

'fr' => array(
	'spam-blacklist'     => ' # Les liens externes faisant partie de cette liste seront bloqués lors de leur insertion dans une page.
 # Cette liste ne concerne que Wikinews ; référez vous aussi à la liste noire générale de Méta.
 # La documentation se trouve à l’adresse suivante : http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 # <!--Laissez cette ligne telle quelle --> <pre>
#
# La syntaxe est la suivante
#   * Tout texte qui suit le « # » est considéré comme un commentaire.
#   * Toute ligne non vide est un fragment regex qui ne concerne que les liens hypertextes.
 #</pre> <!--Laissez cette ligne telle quelle -->',
	'spam-whitelist'     => ' #<!-- Laissez cette ligne telle quelle--> <pre>
# Les liens externes faisant partie de cette liste ne seront pas bloqués même
# si elles ont été bloquées en vertu d’une liste noire.
#
# La syntaxe est la suivante
#   * Tout texte qui suit le « # » est considéré comme un commentaire.
#   * Toute ligne non vide est un fragment regex qui ne concerne que les liens hypertextes.
 #</pre> <!--Laissez cette ligne telle quelle -->',
	'spam-invalid-lines' => '{{PLURAL:$1|La ligne suivante |Les lignes suivantes}} de la liste des spams {{PLURAL:$1|est rédigée|sont rédigées}} de manière incorrecte et {{PLURAL:$1|nécessite|nécessitent}} les corrections nécessaires avant toute sauvegarde de la page :',
),

'hsb' => array(
'blacklistedusername' => 'Wužiwarske mjeno na lisćinje zawrjenjow',
'blacklistedusernametext' => 'Wubrane wužiwarske mjeno steji na [[MediaWiki:Usernameblacklist|lisćinje zawrjenych wužiwarskich mjenow]]. Prošu wubjer druhe mjeno.',
'usernameblacklist' => '<pre>
# Zapiski w tutej lisćinje budu so jako dźěl regularneho wuraza wužiwać, 
# hdyž so wužiwarske mjena z registracije blokuja. Kóždy zapisk měł dźěl
# nječisłowaneje lisćiny być, na př.
#
# * Foo
# * [Bb]ar
</pre>',
'usernameblacklist-invalid-lines' => '{{PLURAL:$1|slědowaca linka|slědowacej lince|slědowace linki|slědowacych linkow}} {{PLURAL:$1|je|stej|su|je}}w lisćinje njewitanych wužiwarskich mjenow je {{PLURAL:$1|njepłaćiwa|njepłaćiwje|njepłaćiwe|njepłaćiwe}}; prošu skoriguj {{PLURAL:$1|ju|jej|je|je}} před składowanjom:',
),

'id' => array(
	'spam-blacklist' => '
 # Pranala luar yang cocok dengan daftar ini akan diblok ketika ditambahkan ke suatu halaman.
 # Daftar ini hanya mempengaruhi wiki ini saja; lihat pula daftar hitam global.
 # Untuk dokumentasi lihat http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 # <!-- jangan ubah baris ini --> <pre>
#
# Sintaks:
# * Semua baris yang dimulai dengan sebuah karakter "#" akan dianggap sebagai komentar
# * Semua baris yang tidak kosong adalah sebuah fragmen regex yang hanya cocok dengan host di dalam URL.

 #</pre> <!-- jangan ubah baris ini -->',
	'spam-whitelist' => '
 #<!-- jangan ubah baris ini --> <pre>
# Pranala luar yang cocok dengan daftar ini *tidak* akan diblok walaupun terdaftar dalam daftar hitam.
#
# Sintaks:
#   * Semua baris yang dimulai dengan sebuah karakter "#" akan dianggap sebagai komentar
#   * Semua baris yang tidak kosong adalah sebuah fragmen regex yang hanya cocok dengan host di dalam URL.

 #</pre> <!-- jangan ubah baris ini -->'
),

'nl' => array(
	'spam-blacklist' => '
 # Externe URL\'s die voldoen aan deze lijst worden geweigerd bij het
 # toevoegen aan een pagina. Deze lijst heeft alleen invloed op deze wiki.
 # Er bestaat ook een globale zwarte lijst.
 # Documentatie: http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- leave this line exactly as it is --> <pre>
#
# De syntaxis is als volgt:
#   * Alles vanaf het karakter "#" tot het einde van de regel is opmerking
#   * Iedere niet-lege regel is een fragment van een regulier expressie die
#     alleen van toepassing is op hosts binnen URL\'s.

 #</pre> <!-- leave this line exactly as it is -->',
	'spam-whitelist' => '
 #<!-- leave this line exactly as it is --> <pre>
# Externe URL\'s die voldoen aan deze lijst, worden *nooit* geweigerd, al
# zouden ze geblokkeerd moeten worden door regels uit de zwarte lijst.
#
# De syntaxis is als volgt:
#   * Alles vanaf het karakter "#" tot het einde van de regel is opmerking
#   * Iedere niet-lege regel is een fragment van een regulier expressie die
#     alleen van toepassing is op hosts binnen URL\'s.

 #</pre> <!-- leave this line exactly as it is -->',
	'spam-invalid-lines' =>
	"De volgende {{PLURAL:$1|regel|regels}} van de zwarte lijst{{PLURAL:$1|is een|zijn}} " .
	" onjuiste reguliere {{PLURAL:$1|expressie|expressies}} " .
	" en {{PLURAL:$1|moet|moeten}} gecorrigeerd worden alvorens de pagina kan worden opgeslagen:\n",
),

'yue' => array(
	'spam-blacklist' => '
 # 同呢個表合符嘅外部 URL 當加入嗰陣會被封鎖。
 # 呢個表只係會影響到呢個wiki；請同時參閱全域黑名單。
 # 要睇註解請睇 http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- 請完全噉留番呢行 --> <pre>
#
# 語法好似下面噉:
#   * 每一個由 "#" 字元開頭嘅行，到最尾係一個註解
#   * 每個非空白行係一個標準表示式碎片，只係會同入面嘅URL端核對

 #</pre> <!-- 請完全噉留番呢行 -->',
	'spam-whitelist' => '
 #<!-- 請完全噉留番呢行 --> <pre>
# 同呢個表合符嘅外部 URL ，即使響黑名單項目度封鎖，
# 都*唔會*被封鎖。
#
# 語法好似下面噉:
#   * 每一個由 "#" 字元開頭嘅行，到最尾係一個註解
#   * 每個非空白行係一個標準表示式碎片，只係會同入面嘅URL端核對

 #</pre> <!-- 請完全噉留番呢行 -->',
	'spam-invalid-lines' =>
	"下面響灌水黑名單嘅{{PLURAL:$1|一行|多行}}有無效嘅表示式，" .
	"請響保存呢版之前先將{{PLURAL:$1|佢|佢哋}}修正:\n",
),

'zh-hans' => array(
	'spam-blacklist' => '
 # 跟这个表合符的外部 URL 当加入时会被封锁。
 # 这个表只是会影响到这个wiki；请同时参阅全域黑名单。
 # 要参看注解请看 http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- 请完全地留下这行 --> <pre>
#
# 语法像下面这样:
#   * 每一个由 "#" 字元开头的行，到结尾是一个注解
#   * 每个非空白行是一个标准表示式碎片，只是跟里面的URL端核对

 #</pre> <!-- 请完全地留下这行 -->',
	'spam-whitelist' => '
 #<!-- 请完全地留下这行 --> <pre>
# 跟这个表合符的外部 URL ，即使在黑名单项目中封锁，
# 都*不会*被封锁。
#
# 语法像下面这样:
#   * 每一个由 "#" 字元开头的行，到结尾是一个注解
#   * 每个非空白行是一个标准表示式碎片，只是跟里面的URL端核对

 #</pre> <!-- 请完全地留下这行 -->',
	'spam-invalid-lines' =>
	"以下在灌水黑名单的{{PLURAL:$1|一行|多行}}有无效的表示式，" .
	"请在保存这页前先将{{PLURAL:$1|它|它们}}修正:\n",
),

'zh-hant' => array(
	'spam-blacklist' => '
 # 跟這個表合符的外部 URL 當加入時會被封鎖。
 # 這個表只是會影響到這個wiki；請同時參閱全域黑名單。
 # 要參看註解請看 http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- 請完全地留下這行 --> <pre>
#
# 語法像下面這樣:
#   * 每一個由 "#" 字元開頭的行，到結尾是一個註解
#   * 每個非空白行是一個標準表示式碎片，只是跟裡面的URL端核對

 #</pre> <!-- 請完全地留下這行 -->',
	'spam-whitelist' => '
 #<!-- 請完全地留下這行 --> <pre>
# 跟這個表合符的外部 URL ，即使在黑名單項目中封鎖，
# 都*不會*被封鎖。
#
# 語法像下面這樣:
#   * 每一個由 "#" 字元開頭的行，到結尾是一個註解
#   * 每個非空白行是一個標準表示式碎片，只是跟裡面的URL端核對

 #</pre> <!-- 請完全地留下這行 -->',
	'spam-invalid-lines' =>
	"以下在灌水黑名單的{{PLURAL:$1|一行|多行}}有無效的表示式，" .
	"請在保存這頁前先將{{PLURAL:$1|它|它們}}修正:\n",
),

	);

	$messages['zh'] = $messages['zh-hans'];
	$messages['zh-cn'] = $messages['zh-hans'];
	$messages['zh-hk'] = $messages['zh-hant'];
	$messages['zh-sg'] = $messages['zh-hans'];
	$messages['zh-tw'] = $messages['zh-hant'];
	$messages['zh-yue'] = $messages['yue'];

return $messages;
}
