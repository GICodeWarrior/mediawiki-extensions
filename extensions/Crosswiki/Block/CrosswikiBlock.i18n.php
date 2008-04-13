<?php
/**
 * Internationalisation file for extension CrosswikiBlock.
 *
 * @addtogroup Extensions
*/

$messages = array();

$messages['en'] = array(
	# Special page
	'crosswikiblock-desc'       => 'Allows to block users on other wikis using a [[Special:Crosswikiblock|special page]]',
	'crosswikiblock'            => 'Block user on other wiki',
	'crosswikiblock-header'     => 'This page allows to block user on other wiki.
Please check if you are allowed to act on this wiki and your actions match all policies.',
	'crosswikiblock-target'     => 'IP address or username and destination wiki:',
	'crosswikiblock-expiry'     => 'Expiry:',
	'crosswikiblock-reason'     => 'Reason:',
	'crosswikiblock-submit'     => 'Block this user',
	'crosswikiblock-anononly'   => 'Block anonymous users only',
	'crosswikiblock-nocreate'   => 'Prevent account creation',
	'crosswikiblock-autoblock'  => 'Automatically block the last IP address used by this user, and any subsequent IP addresses they try to edit from',
	'crosswikiblock-noemail'    => 'Prevent user from sending e-mail',

	# Special:Unblock
	'crosswikiunblock'              => 'Unblock user on other wiki',
	'crosswikiunblock-header'       => 'This page allows to unblock user on other wiki.
Please check if you are allowed to act on this wiki and your actions match all policies.',
	'crosswikiunblock-user'         => 'Username, IP address or block ID and destination wiki:',
	'crosswikiunblock-reason'       => 'Reason:',
	'crosswikiunblock-submit'       => 'Unblock this user',
	'crosswikiunblock-success'      => "User '''$1''' unblocked successfully.

Return to:
* [[Special:CrosswikiBlock|Block form]]
* [[$2]]",

	# Errors and success message
	'crosswikiblock-nousername'     => 'No username was inputed',
	'crosswikiblock-local'          => 'Local blocks are not supported via this interface. Use [[Special:Blockip]]',
	'crosswikiblock-dbnotfound'     => 'Database $1 does not exist',
	'crosswikiblock-noname'         => '"$1" is not a valid username.',
	'crosswikiblock-nouser'         => 'User "$3" is not found.',
	'crosswikiblock-noexpiry'       => 'Invalid expiry: $1.',
	'crosswikiblock-noreason'       => 'No reason specified.',
	'crosswikiblock-notoken'        => 'Invalid edit token.',
	'crosswikiblock-alreadyblocked' => 'User $3 is already blocked.',
	'crosswikiblock-noblock'        => 'This user is not blocked.',
	'crosswikiblock-success'        => "User '''$3''' blocked successfully.

Return to:
* [[Special:CrosswikiBlock|Block form]]
* [[$4]]",
	'crosswikiunblock-local'          => 'Local unblocks are not supported via this interface. Use [[Special:Ipblocklist]]',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'crosswikiblock-desc'           => 'يسمح بمنع المستخدمين في ويكيات أخرى باستخدام [[Special:Crosswikiblock|صفحة خاصة]]',
	'crosswikiblock'                => 'منع مستخدم في ويكي آخر',
	'crosswikiblock-header'         => 'هذه الصفحة تسمح بمنع المستخدمين في ويكي آخر.
من فضلك تحقق لو كان مسموحا لك بالعمل في هذه الويكي وأفعالك تطابق كل السياسات.',
	'crosswikiblock-target'         => 'عنوان الأيبي أو اسم المستخدم والويكي المستهدف:',
	'crosswikiblock-expiry'         => 'الانتهاء:',
	'crosswikiblock-reason'         => 'السبب:',
	'crosswikiblock-submit'         => 'منع هذا المستخدم',
	'crosswikiblock-anononly'       => 'امنع المستخدمين المجهولين فقط',
	'crosswikiblock-nocreate'       => 'امنع إنشاء الحسابات',
	'crosswikiblock-autoblock'      => 'تلقائيا امنع آخر عنوان أيبي تم استخدامه بواسطة هذا المستخدم، وأي أيبيهات لاحقة يحاول التعديل منها',
	'crosswikiblock-noemail'        => 'امنع المستخدم من إرسال بريد إلكتروني',
	'crosswikiunblock'              => 'رفع المنع عن مستخدم في ويكي أخرى',
	'crosswikiunblock-header'       => 'هذه الصفحة تسمح برفع المنع عن مستخدم في ويكي أخرى.
من فضلك تحقق من أنه مسموح لك بالعمل على هذه الويكي وأن أفعالك تطابق كل السياسات.',
	'crosswikiunblock-user'         => 'اسم المستخدم، عنوان الأيبي أو رقم المنع والويكي المستهدفة:',
	'crosswikiunblock-reason'       => 'السبب:',
	'crosswikiunblock-submit'       => 'رفع المنع عن هذا المستخدم',
	'crosswikiunblock-success'      => "المستخدم '''$1''' تم رفع المنع عنه بنجاح.

ارجع إلى:
* [[Special:CrosswikiBlock|استمارة المنع]]
* [[$2]]",
	'crosswikiblock-nousername'     => 'لا اسم مستخدم تم إدخاله',
	'crosswikiblock-local'          => 'عمليات المنع المحلية غير مدعومة من خلال هذه الواجهة. استخدم [[Special:Blockip]]',
	'crosswikiblock-dbnotfound'     => 'قاعدة البيانات $1 غير موجودة',
	'crosswikiblock-noname'         => '"$1" ليس اسم مستخدم صحيحا.',
	'crosswikiblock-nouser'         => 'المستخدم "$3" غير موجود.',
	'crosswikiblock-noexpiry'       => 'تاريخ انتهاء غير صحيح: $1.',
	'crosswikiblock-noreason'       => 'لا سبب تم تحديده.',
	'crosswikiblock-notoken'        => 'نص تعديل غير صحيح.',
	'crosswikiblock-alreadyblocked' => 'المستخدم $3 ممنوع بالفعل.',
	'crosswikiblock-noblock'        => 'هذا المستخدم ليس ممنوعا.',
	'crosswikiblock-success'        => "المستخدم '''$3''' تم منعه بنجاح.

ارجع إلى:
* [[Special:CrosswikiBlock|استمارة المنع]]
* [[$4]]",
	'crosswikiunblock-local'        => 'عمليات المنع المحلية غير مدعومة بواسطة هذه الواجهة. استخدم [[Special:Ipblocklist]]',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'crosswikiblock-desc'           => 'Позволява блокирането на потребители в други уикита чрез [[Special:Crosswikiblock|специална страница]]',
	'crosswikiblock'                => 'Блокиране на потребител в друго уики',
	'crosswikiblock-header'         => 'Тази страница позволява блокирането на потребители в други уикита.
Необходимо е да проверите дали имате права да изпълните действието на това уики и дали не е в разрез с действащите политики.',
	'crosswikiblock-target'         => 'IP адрес или потребителско име и целево уики:',
	'crosswikiblock-expiry'         => 'Изтича на:',
	'crosswikiblock-reason'         => 'Причина:',
	'crosswikiblock-submit'         => 'Блокиране на този потребител',
	'crosswikiblock-anononly'       => 'Блокиране само на нерегистрирани потребители',
	'crosswikiblock-nocreate'       => 'Без създаване на сметки',
	'crosswikiblock-autoblock'      => 'Автоматично блокиране на посления използван от потребителя IP адрес и всички адреси, от които направи опит за редактиране',
	'crosswikiblock-noemail'        => 'Без възможност за изпращане на е-поща',
	'crosswikiunblock'              => 'Отблокиране на потребител на друго уики',
	'crosswikiunblock-header'       => 'Тази страница позволява отблокирането на потребители на други уикита.
Убедете се, че имате необходимите права за извършване на действието и че действието не е в разрез с текущата политика.',
	'crosswikiunblock-user'         => 'Потребителско име, IP адрес или номер на блокирането и целево уики:',
	'crosswikiunblock-reason'       => 'Причина:',
	'crosswikiunblock-submit'       => 'Отблокиране на потребителя',
	'crosswikiunblock-success'      => "Потребител '''$1''' беше успешно отблокиран.

Връщане към:
* [[Special:CrosswikiBlock|Формуляра за блокиране]]
* [[$2]]",
	'crosswikiblock-nousername'     => 'Не беше въведено потребителско име',
	'crosswikiblock-local'          => 'Локалните блокирания не се поддържат от този интерфейс. Използва се [[Special:Blockip]]',
	'crosswikiblock-dbnotfound'     => 'Не съществува база данни $1',
	'crosswikiblock-noname'         => '„$1“ не е валидно потребителско име.',
	'crosswikiblock-nouser'         => 'Не беше намерен потребител „$3“',
	'crosswikiblock-noexpiry'       => 'Невалиден срок за изтичане: $1.',
	'crosswikiblock-noreason'       => 'Не е посочена причина.',
	'crosswikiblock-alreadyblocked' => 'Потребител $3 е вече блокиран.',
	'crosswikiblock-noblock'        => 'Този потребител не е блокиран.',
	'crosswikiblock-success'        => "Потребител '''$3''' беше блокиран успешно.

Връщане към:
* [[Special:CrosswikiBlock|Формуляра за блокиране]]
* [[$4]]",
	'crosswikiunblock-local'        => 'Локалните отблокирания не се поддържат от този интерфейс. Използва се [[Special:Ipblocklist]]',
);

/** Czech (Česky)
 * @author Matěj Grabovský
 */
$messages['cs'] = array(
	'crosswikiblock-desc'     => 'Umožňuje blokování uživatelů na jiných wiki pomocí [[Special:Crosswikiblock|speciální stránky]]',
	'crosswikiblock-expiry'   => 'Vypršení:',
	'crosswikiblock-reason'   => 'Důvod:',
	'crosswikiblock-submit'   => 'Zablokovat tohoto uživatele',
	'crosswikiblock-anononly' => 'Zablokovat všechny anonymní uživatele',
	'crosswikiblock-nocreate' => 'Zabránit tvorbě účtů',
	'crosswikiblock-noemail'  => 'Zabránit uživateli odesílat e-mail',
	'crosswikiunblock'        => 'Odblokovat uživatele na jiné wiki',
	'crosswikiunblock-submit' => 'Odblokovat tohoto uživatele',
);

/** Danish (Dansk)
 * @author Jon Harald Søby
 */
$messages['da'] = array(
	'crosswikiblock-reason'    => 'Begrundelse:',
	'crosswikiblock-submit'    => 'Bloker denne bruger',
	'crosswikiblock-nocreate'  => 'Forhindre oprettelse af brugerkonti',
	'crosswikiblock-autoblock' => 'Spærre den IP-adresse, der bruges af denne bruger samt automatisk alle følgende, hvorfra han foretager ændringer eller forsøger at anlægge brugerkonti',
	'crosswikiblock-noemail'   => 'Spærre brugerens adgang til at sende mail',
	'crosswikiunblock-reason'  => 'Begrundelse:',
);

/** German (Deutsch)
 * @author Raimond Spekking
 */
$messages['de'] = array(
	# Special page
	'crosswikiblock-desc'       => 'Erlaubt die Sperre von Benutzern in anderen Wikis über eine [[Special:Crosswikiblock|Spezialseite]]',
	'crosswikiblock'            => 'Sperre Benutzer in einem anderen Wiki',
	'crosswikiblock-header'     => 'Diese Spezialseite erlaubt die Sperre eines Benutzers in einem anderen Wiki.
	Bitte prüfe, ob du die Befugnis hast, in diesem anderen Wiki zu sperren und ob deine Aktion deren Richtlinien entspricht.',
	'crosswikiblock-target'     => 'IP-Adresse oder Benutzername und Zielwiki:',
	'crosswikiblock-expiry'     => 'Sperrdauer:',
	'crosswikiblock-reason'     => 'Begründung:',
	'crosswikiblock-submit'     => 'IP-Adresse/Benutzer sperren',
	'crosswikiblock-anononly'   => 'Sperre nur anonyme Benutzer (angemeldete Benutzer mit dieser IP-Adresse werden nicht gesperrt). In vielen Fällen empfehlenswert.',
	'crosswikiblock-nocreate'   => 'Erstellung von Benutzerkonten verhindern',
	'crosswikiblock-autoblock'  => 'Sperre die aktuell von diesem Benutzer genutzte IP-Adresse sowie automatisch alle folgenden, von denen aus er Bearbeitungen oder das Anlegen von Benutzeraccounts versucht.',
	'crosswikiblock-noemail'    => 'E-Mail-Versand sperren',

	# Special:Unblock
	'crosswikiunblock'              => 'Entsperre Benutzer in einem anderen Wiki',
	'crosswikiunblock-header'       => 'Diese Spezialseite erlaubt die Aufhebung einer Benutzersperre in einem anderen Wiki.
	Bitte prüfe, ob du die Befugnis hast, in diesem anderen Wiki zu sperren und ob deine Aktion deren Richtlinien entspricht.',
	'crosswikiunblock-user'         => 'IP-Adresse oder Benutzername und Zielwiki:',
	'crosswikiunblock-reason'       => 'Begründung:',
	'crosswikiunblock-submit'       => 'Sperre für IP-Adresse/Benutzer aufheben',
	'crosswikiunblock-success'      => "Benutzer '''„$1“''' erfolgreich entsperrt.

Zurück zu:
* [[Special:CrosswikiBlock|Sperrformular]]
* [[$2]]",
	# Errors and success message
	'crosswikiblock-nousername'     => 'Es wurde kein Benutzername eingegeben',
	'crosswikiblock-local'          => 'Lokale Sperren werden durch dieses Interface nicht unterstützt. Benutze [[{{#special:Blockip}}]]',
	'crosswikiblock-dbnotfound'     => 'Datenbank $1 ist nicht vorhanden',
	'crosswikiblock-noname'         => '„$1“ ist kein gültiger Benutzername.',
	'crosswikiblock-nouser'         => 'Benutzer „$3“ nicht gefunden.',
	'crosswikiblock-noexpiry'       => 'Ungültige Sperrdauer: $1.',
	'crosswikiblock-noreason'       => 'Begründung fehlt.',
	'crosswikiblock-notoken'        => 'Ungültiges Bearbeitungs-Token.',
	'crosswikiblock-alreadyblocked' => 'Benutzer „$3“ ist bereits gesperrt.',
	'crosswikiblock-noblock'        => 'Dieser Benutzer ist nicht gesperrt.',
	'crosswikiblock-success'        => "Benutzer '''„$3“''' erfolgreich gesperrt.

Zurück zu:
* [[Special:CrosswikiBlock|Sperrformular]]
* [[$4]]",
'crosswikiunblock-local'                => 'Lokale Sperren werden über dieses Interfache nicht unterstützt. Bitte benutze [[{{#special:Ipblocklist}}]].',
);

/** Greek (Ελληνικά)
 * @author Consta
 */
$messages['el'] = array(
	'crosswikiblock-reason'   => 'Λόγος:',
	'crosswikiunblock-reason' => 'Λόγος',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'crosswikiblock-desc'           => 'Permesas forbari uzantojn ĉe aliaj vikioj uzante [[Special:Crosswikiblock|specialan paĝon]]',
	'crosswikiblock'                => 'Forbaru uzanton ĉe alia vikio',
	'crosswikiblock-header'         => 'Ĉi paĝo permesas forbari uzanton ĉe alia vikio.
Bonvolu verigi se vi rajtas agi en ĉi vikio kaj viaj agoj sekvas ĉiujn kondutmanierojn.',
	'crosswikiblock-target'         => 'IP-adreso aŭ uzanto-nomo kaj cela vikio:',
	'crosswikiblock-expiry'         => 'Findato:',
	'crosswikiblock-reason'         => 'Kialo:',
	'crosswikiblock-submit'         => 'Forbaru ĉi uzanton',
	'crosswikiblock-anononly'       => 'Forbaru nur anonimajn uzantojn',
	'crosswikiblock-nocreate'       => 'Preventu kreadon de kontoj',
	'crosswikiblock-autoblock'      => 'Aŭtomate forbaru la lastan IP-adreson uzatan de ĉi uzanto, kaj iujn ajn postajn el kiujn ili provas redakti.',
	'crosswikiblock-noemail'        => 'Preventu de uzanto sendi retpoŝton',
	'crosswikiunblock'              => 'Malforbaru uzanton ĉe alia vikio',
	'crosswikiunblock-header'       => 'Ĉi paĝo permesas malforbari uzanton ĉe alia vikio.
Bonvolu verigi se vi rajtas agi en ĉi vikio kaj viaj agoj sekvas ĉiujn kondutmanierojn.',
	'crosswikiunblock-user'         => 'Uzanto-nomo, IP-adreso, aŭ forbaro-identigo kaj cela vikio:',
	'crosswikiunblock-reason'       => 'Kialo:',
	'crosswikiunblock-submit'       => 'Malforbaru ĉi uzanton',
	'crosswikiunblock-success'      => "Uzanto '''$1''' malforbarita sukcese.

Reen:
* [[Special:CrosswikiBlock|Forbarpaĝo]]
* [[$2]]",
	'crosswikiblock-nousername'     => 'Neniu uzanto-nomo estis entajpita',
	'crosswikiblock-local'          => 'Lokaj forbaroj ne estas subtenataj per ĉi interfaco. Uzu [[Special:Blockip]]',
	'crosswikiblock-dbnotfound'     => 'Datumbazo $1 ne ekzistas.',
	'crosswikiblock-noname'         => '"$1" ne estas valida uzanto-nomo.',
	'crosswikiblock-nouser'         => 'Uzanto "$3" ne estas trovita.',
	'crosswikiblock-noexpiry'       => 'Nevalida findato: $1.',
	'crosswikiblock-noreason'       => 'Nenia kialo donata.',
	'crosswikiblock-notoken'        => 'Nevalida redakta ĵetono.',
	'crosswikiblock-alreadyblocked' => 'Uzanto $3 jam estas forbarita.',
	'crosswikiblock-noblock'        => 'Ĉi uzanto ne estas forbarita.',
	'crosswikiblock-success'        => "Uzanto '''$3''' sukcese forbarita.

Reen:
* [[Special:CrosswikiBlock|Forbarpaĝo]]
* [[$4]]",
	'crosswikiunblock-local'        => 'Lokaj malforbaroj ne estas subtenataj per ĉi interfaco. Uzu [[Special:Ipblocklist]]',
);

/** Finnish (Suomi)
 * @author Jack Phoenix
 * @author Nike
 */
$messages['fi'] = array(
	'crosswikiblock'           => 'Estä käyttäjä toisessa wikissä',
	'crosswikiblock-header'    => 'Tämä sivu mahdollistaa käyttäjien estämisen toisessa wikissä.
Tarkista, saatko toimia tässä wikissä ja että toimesi ovat käytäntöjen mukaisia.',
	'crosswikiblock-target'    => 'IP-osoite tai käyttäjänimi kohdewikissä',
	'crosswikiblock-expiry'    => 'Kesto',
	'crosswikiblock-reason'    => 'Syy',
	'crosswikiblock-submit'    => 'Estä tämä käyttäjä',
	'crosswikiblock-anononly'  => 'Estä vain kirjautumattomat käyttäjät',
	'crosswikiblock-nocreate'  => 'Estä tunnusten luonti',
	'crosswikiblock-autoblock' => 'Estä viimeisin IP-osoite, josta käyttäjä on muokannut, sekä ne osoitteet, joista hän jatkossa yrittää muokata.',
	'crosswikiblock-noemail'   => 'Estä käyttäjää lähettämästä sähköpostia',
	'crosswikiunblock'         => 'Poista käyttäjän muokkausesto toisesta wikistä',
	'crosswikiunblock-header'  => 'Tämä sivu mahdollistaa käyttäjien muokkauseston poistamisen toisesta wikistä.
Tarkista, saatko toimia tässä wikissä ja että toimesi ovat käytäntöjen mukaisia.',
	'crosswikiunblock-user'    => 'Käyttäjänimi, IP-osoite tai eston ID ja kohdewiki',
	'crosswikiunblock-reason'  => 'Syy',
	'crosswikiunblock-submit'  => 'Poista tämän käyttäjän muokkausesto',
);

/** French (Français)
 * @author Grondin
 * @author Meithal
 * @author Urhixidur
 */
$messages['fr'] = array(
	'crosswikiblock-desc'           => "Permet de bloquer des utilisateurs sur d'autres wikis en utilisant [[Special:Crosswikiblock|une page spéciale]]",
	'crosswikiblock'                => 'Bloquer un utilisateur sur un autre wiki',
	'crosswikiblock-header'         => 'Cette page permet de bloquer un utilisateur sur un autre wiki.

Vérifiez si vous êtes habilité pour agir sur ce wiki et que vos actions respectent toutes les règles.',
	'crosswikiblock-target'         => "Adresse IP ou nom d'utilisateur et wiki de destination :",
	'crosswikiblock-expiry'         => 'Expiration :',
	'crosswikiblock-reason'         => 'Motif :',
	'crosswikiblock-submit'         => 'Bloquer cet utilisateur',
	'crosswikiblock-anononly'       => 'Bloquer uniquement les utilisateurs anonymes',
	'crosswikiblock-nocreate'       => 'Interdire la création de compte',
	'crosswikiblock-autoblock'      => "Bloque automatiquement la dernière adresse IP utilisée par cet utilisateur, et toutes les IP subséquentes qui essaient d'éditer",
	'crosswikiblock-noemail'        => "Interdire à l'utilisateur d'envoyer un courriel",
	'crosswikiunblock'              => "Débloquer en écriture un utilisateur d'un autre wiki",
	'crosswikiunblock-header'       => "Cette page permet de débloquer en écriture un utilisateur d'un autre wiki.
Veuillez vous assurer que vous possédez les droits et respectez les règles en vigueur sur ce wiki.",
	'crosswikiunblock-user'         => "Nom d'utilisateur, adresse IP ou l'id de blocage et le wiki ciblé :",
	'crosswikiunblock-reason'       => 'Motif :',
	'crosswikiunblock-submit'       => 'Débloquer en écriture cet utilisateur',
	'crosswikiunblock-success'      => "L'utilisateur '''1$''' a été débloqué en écriture avec succès.

Revenir à :
* [[Special:CrosswikiBlock|Formulaire de blocage]]
* [[$2]]",
	'crosswikiblock-nousername'     => "Aucun nom d'utilisateur n'a été indiqué",
	'crosswikiblock-local'          => 'Les blocages locaux ne sont pas supportés au travers de cette interface. Utilisez [[Special:Blockip]].',
	'crosswikiblock-dbnotfound'     => 'La base de données « $1 » n’existe pas',
	'crosswikiblock-noname'         => '« $1 » n’est pas un nom d’utilisateur valide.',
	'crosswikiblock-nouser'         => 'L’utilisateur « $3 » est introuvable.',
	'crosswikiblock-noexpiry'       => 'Date ou durée d’expiration incorrecte : $1.',
	'crosswikiblock-noreason'       => 'Aucun motif indiqué.',
	'crosswikiblock-notoken'        => 'Édition prise incorrecte.',
	'crosswikiblock-alreadyblocked' => 'L’utilisateur « $3 » est déjà bloqué.',
	'crosswikiblock-noblock'        => "Cet utilisateur n'est pas bloqué en écriture.",
	'crosswikiblock-success'        => "L’utilisateur '''$3''' a été bloqué avec succès.

Revenir vers :
* [[Special:CrosswikiBlock|Le formulaire de blocage]] ;
* [[$4]].",
	'crosswikiunblock-local'        => 'Les blocages en écriture locaux ne sont pas supportés via cette interface. Utilisez [[Special:Ipblocklist]]',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 * @author Xosé
 */
$messages['gl'] = array(
	'crosswikiblock-desc'           => 'Permite bloquear usuarios doutros wikis mediante unha [[Special:Crosswikiblock|páxina especial]]',
	'crosswikiblock'                => 'Usuario bloqueado noutro wiki',
	'crosswikiblock-target'         => 'Enderezo IP ou nome de usuario e wiki de destino:',
	'crosswikiblock-expiry'         => 'Caducidade:',
	'crosswikiblock-reason'         => 'Razón:',
	'crosswikiblock-submit'         => 'Bloquear este usuario',
	'crosswikiblock-anononly'       => 'Bloquear só usuarios anónimos',
	'crosswikiblock-nocreate'       => 'Impedir a creación de contas',
	'crosswikiblock-noemail'        => 'Advertir ao usuario do envío de correo electrónico',
	'crosswikiunblock'              => 'Desbloquear este usuario noutro wiki',
	'crosswikiunblock-reason'       => 'Razón:',
	'crosswikiunblock-submit'       => 'Desbloquear este usuario',
	'crosswikiunblock-success'      => "O usuario '''$1''' foi desbloqueado con éxito.

Voltar a:
* [[Special:CrosswikiBlock|Formulario de bloqueo]]
* [[$2]]",
	'crosswikiblock-nousername'     => 'Non foi inserido ningún alcume',
	'crosswikiblock-dbnotfound'     => 'A base de datos $1 non existe',
	'crosswikiblock-noname'         => '"$1" non é un nome de usuario válido.',
	'crosswikiblock-nouser'         => 'Non se atopa o usuario "$3".',
	'crosswikiblock-noexpiry'       => 'Caducidade non válida: $1.',
	'crosswikiblock-noreason'       => 'Ningunha razón especificada.',
	'crosswikiblock-notoken'        => 'Sinal de edición non válido.',
	'crosswikiblock-alreadyblocked' => 'O usuario $3 xa está bloqueado.',
	'crosswikiblock-noblock'        => 'Este usuario non está bloqueado.',
	'crosswikiblock-success'        => "O usuario '''$3''' foi bloqueado con éxito.

Voltar a:
* [[Special:CrosswikiBlock|Formulario de bloqueo]]
* [[$4]]",
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 */
$messages['hi'] = array(
	'crosswikiblock-desc'           => 'अन्य विकियोंपर [[Special:Crosswikiblock|विशेष पृष्ठ]] का इस्तेमाल करके सदस्य ब्लॉक करने की अनुमति देता हैं।',
	'crosswikiblock'                => 'अन्य विकिपर सदस्यको ब्लॉक करें',
	'crosswikiblock-header'         => 'यह पन्ना अन्य विकियोंपर सदस्य को ब्लॉक करने की अनुमति देता हैं।
कृपया यह क्रिया करनेके लिये पर्याप्त अधिकार आपको हैं और यह क्रिया नीती के अनुसार ही हैं यह जाँच लें।',
	'crosswikiblock-target'         => 'आईपी एड्रेस या सदस्यनाम तथा लक्ष्य विकि:',
	'crosswikiblock-expiry'         => 'समाप्ती:',
	'crosswikiblock-reason'         => 'कारण:',
	'crosswikiblock-submit'         => 'इस सदस्य को ब्लॉक करें',
	'crosswikiblock-anononly'       => 'सिर्फ अनामक सदस्योंको ब्लॉक करें',
	'crosswikiblock-nocreate'       => 'खाता खोलने पर प्रतिबंध लगायें',
	'crosswikiblock-noemail'        => 'इ-मेल भेजने पर प्रतिबंध लगायें',
	'crosswikiunblock'              => 'अन्य विकियोंपर सदस्यको अनब्लॉक करें',
	'crosswikiunblock-user'         => 'सदस्य नाम, आईपी एड्रेस या ब्लॉक क्रमांक तथा लक्ष्य विकि:',
	'crosswikiunblock-reason'       => 'कारण:',
	'crosswikiunblock-submit'       => 'इस सदस्य को अनब्लॉक करें',
	'crosswikiblock-nousername'     => 'सदस्यनाम दिया नहीं',
	'crosswikiblock-local'          => 'स्थानिक ब्लॉक यहां पर बदले नहीं जा सकतें। [[Special:Blockip]] का इस्तेमाल करें',
	'crosswikiblock-dbnotfound'     => 'डाटाबेस $1 उपलब्ध नहीं हैं',
	'crosswikiblock-noname'         => '"$1" यह वैध सदस्यनाम नहीं हैं।',
	'crosswikiblock-nouser'         => 'सदस्य "$3" मिला नहीं।',
	'crosswikiblock-noexpiry'       => 'गलत समाप्ती: $1।',
	'crosswikiblock-noreason'       => 'कारण दिया नहीं।',
	'crosswikiblock-notoken'        => 'गलत एडिट टोकन',
	'crosswikiblock-alreadyblocked' => 'सदस्य $3 को पहलेसे ब्लॉक किया हुआ हैं।',
	'crosswikiblock-noblock'        => 'इस सदस्यको ब्लॉक नहीं किया हैं।',
	'crosswikiunblock-local'        => 'स्थानिक अनब्लॉक यहां पर बदले नहीं जा सकतें। [[Special:Ipblocklist]] का इस्तेमाल करें',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'crosswikiblock-desc'           => 'Dowola wužiwarjow na druhich wikijach z pomocu [[Special:Crosswikiblock|specialneje strony]] blokować',
	'crosswikiblock'                => 'Wužiwarja na druhim wikiju blokować',
	'crosswikiblock-header'         => 'Tuta strona dowola wužiwarja na druhim wikiju blokować.
Prošu pruwuj, hač maš dowolnosć na tym wikiju skutkować a swoje akcije wšěm prawidłam wotpowěduja.',
	'crosswikiblock-target'         => 'IP-adresa abo wužiwarske mjeno a cilowy wiki:',
	'crosswikiblock-expiry'         => 'Spadnjenje:',
	'crosswikiblock-reason'         => 'Přičina:',
	'crosswikiblock-submit'         => 'Tutoho wužiwarja blokować',
	'crosswikiblock-anononly'       => 'Jenož anonymnych wužiwarjow blokować',
	'crosswikiblock-nocreate'       => 'Wutworjenju konta zadźěwać',
	'crosswikiblock-autoblock'      => 'Awtomatisce poslednju IPa-dresu wužitu wot tutoho wužiwarja blokować, inkluziwnje naslědnych IP-adresow, z kotrychž pospytuje wobdźěłać',
	'crosswikiblock-noemail'        => 'Słanju e-mejlkow wot wužiwarja zadźěwać',
	'crosswikiunblock'              => 'Wužiwarja na druhim wikiju wotblokować',
	'crosswikiunblock-header'       => 'Tuta strona zmóžnja wužiwarja na druhim wikiju wotblokować.
Přepruwuj prošu, hač směš na tutym wikiju skutkować a hač twoje akcije wšěm prawidłam wotpowěduja.',
	'crosswikiunblock-user'         => 'Wužiwarske mjeno, IP-adresa abo ID blokowanja a cilowy wiki:',
	'crosswikiunblock-reason'       => 'Přičina:',
	'crosswikiunblock-submit'       => 'Tutoho wužiwarja wotblokować',
	'crosswikiunblock-success'      => "Wužiwar '''$1''' bu wuspěšnje wotblokowany.

Wróćo k:
* [[Special:CrosswikiBlock|Formular blokowanjow]]
* [[$2]]",
	'crosswikiblock-nousername'     => 'Njebu wužiwarske mjeno zapodate',
	'crosswikiblock-local'          => 'Lokalne blokowanja so přez tutón interfejs njepodpěruja. Wužij [[Special:Blockip]]',
	'crosswikiblock-dbnotfound'     => 'Datowa banka $1 njeeksistuje',
	'crosswikiblock-noname'         => '"$1" płaćiwe wužiwarske mjeno njeje.',
	'crosswikiblock-nouser'         => 'Wužiwar "$3" njebu namakany.',
	'crosswikiblock-noexpiry'       => 'Njepłaćiwe spadnjenje: $1.',
	'crosswikiblock-noreason'       => 'Žana přičina podata.',
	'crosswikiblock-notoken'        => 'Njepłaćiwy wobdźełanski token.',
	'crosswikiblock-alreadyblocked' => 'Wužiwar $3 je hižo zablokowany.',
	'crosswikiblock-noblock'        => 'Tutón wužiwar njeje zablokowany.',
	'crosswikiblock-success'        => "Wužiwar '''$3''' wuspěšnje zablokowany.

Wróćo k:
* [[Special:CrosswikiBlock|Blokowanski formular]]
* [[$4]]",
	'crosswikiunblock-local'        => 'Lokalne blokowanja so přez tutón interfejs njepodpěruja. Wužij [[Special:Ipblocklist]]',
);

/** Japanese (日本語)
 * @author JtFuruhata
 */
$messages['ja'] = array(
	'crosswikiblock-desc'           => '他ウィキでも利用者をブロックすることができる[[Special:Crosswikiblock|{{int:specialpage}}]]。',
	'crosswikiblock'                => '他ウィキの利用者をブロック',
	'crosswikiblock-header'         => 'このページでは他ウィキの利用者をブロックすることができます。
あなたのその行動は、影響を与えるウィキ全ての方針で適切かどうか、注意深く考えてください。',
	'crosswikiblock-target'         => 'IPアドレスか利用者名、および対象となるウィキ:',
	'crosswikiblock-expiry'         => 'ブロック期限:',
	'crosswikiblock-reason'         => 'ブロック理由:',
	'crosswikiblock-submit'         => 'この利用者をブロック',
	'crosswikiblock-anononly'       => '匿名利用者以外はブロックできません',
	'crosswikiblock-nocreate'       => 'アカウント作成が拒否されています',
	'crosswikiblock-autoblock'      => 'この利用者が最近編集に使用したIPアドレスは、全て自動的にブロックされているものです',
	'crosswikiblock-noemail'        => '電子メールを送ることのできない利用者です',
	'crosswikiunblock'              => '他ウィキの利用者をブロック解除',
	'crosswikiunblock-header'       => 'このページでは他ウィキの利用者をブロック解除することができます。
あなたのその行動は、影響を与えるウィキ全ての方針で適切かどうか、注意深く考えてください。',
	'crosswikiunblock-user'         => '利用者名かIPアドレスまたはブロックID、および対象となるウィキ:',
	'crosswikiunblock-reason'       => 'ブロック解除理由:',
	'crosswikiunblock-submit'       => 'この利用者のブロックを解除',
	'crosswikiunblock-success'      => "利用者 '''$1''' のブロックを解除しました。

元のページへ戻る:
* [[Special:CrosswikiBlock|他ウィキの利用者をブロック]]
* [[$2]]",
	'crosswikiblock-nousername'     => '利用者名が入力されていません',
	'crosswikiblock-local'          => 'このウィキ自身における利用者ブロックを、このページでは行えません。[[{{ns:special}}:Blockip]]を利用してください。',
	'crosswikiblock-dbnotfound'     => 'データベース $1 が存在しません',
	'crosswikiblock-noname'         => '"$1" は、不正な利用者名です。',
	'crosswikiblock-nouser'         => '利用者 "$3" が見つかりません。',
	'crosswikiblock-noexpiry'       => '不正な期限指定です: $1',
	'crosswikiblock-noreason'       => '理由が記入されていません。',
	'crosswikiblock-notoken'        => '編集トークンが不正です。',
	'crosswikiblock-alreadyblocked' => '利用者 $3 は、既にブロックされています。',
	'crosswikiblock-noblock'        => 'この利用者は、ブロックされていません。',
	'crosswikiblock-success'        => "利用者 '''$1''' をブロックしました。

元のページへ戻る:
* [[Special:CrosswikiBlock|他ウィキの利用者をブロック]]
* [[$2]]",
	'crosswikiunblock-local'        => 'このウィキ自身における利用者ブロック解除を、このページでは行えません。[[{{ns:special}}:Ipblocklist]]を利用してください。',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'crosswikiblock-desc'           => 'អនុញ្ញាត​អោយរាំងខ្ទប់​អ្នកប្រើប្រាស់​លើ​​វិគីផ្សេង​ដែលប្រើប្រាស់ [[Special:Crosswikiblock|ទំព័រពិសេស]]',
	'crosswikiblock'                => 'រាំងខ្ទប់​អ្នកប្រើប្រាស់​លើ​វិគីផ្សេង',
	'crosswikiblock-target'         => 'អាស័យដ្ឋាន IP ឬ ឈ្មោះអ្នកប្រើប្រាស់ និង វិគីគោលដៅ ៖',
	'crosswikiblock-expiry'         => 'ផុតកំណត់ ៖',
	'crosswikiblock-reason'         => 'ហេតុផល ៖',
	'crosswikiblock-submit'         => 'រាំងខ្ទប់​អ្នកប្រើប្រាស់​នេះ',
	'crosswikiblock-anononly'       => 'រាំងខ្ទប់​តែ​អ្នកប្រើប្រាស់​អនាមិក',
	'crosswikiblock-nocreate'       => 'បង្ការ​ការបង្កើត​គណនី',
	'crosswikiblock-noemail'        => 'បង្ការ​អ្នកប្រើប្រាស់​ពី​ការផ្ញើ​អ៊ីមែល',
	'crosswikiunblock'              => 'លែងរាំងខ្ទប់​អ្នកប្រើប្រាស់​លើ​វិគី​ផ្សេង',
	'crosswikiunblock-user'         => 'ឈ្មោះអ្នកប្រើប្រាស់, អាស័យដ្ឋាន IP ឬ រាំងខ្ទប់ ID និង វិគី គោលដៅ ៖',
	'crosswikiunblock-reason'       => 'ហេតុផល ៖',
	'crosswikiunblock-submit'       => 'លែងរាំងខ្ទប់ អ្នកប្រើប្រាស់ នេះ',
	'crosswikiblock-nousername'     => 'គ្មានឈ្មោះអ្នកប្រើប្រាស់ បានត្រូវបញ្ចូល',
	'crosswikiblock-dbnotfound'     => 'មូលដ្ឋានទិន្នន័យ $1 មិនមាន',
	'crosswikiblock-noname'         => 'ឈ្មោះអ្នកប្រើប្រាស់ "$1" គ្មានសុពលភាព ។',
	'crosswikiblock-nouser'         => 'រកមិនឃើញ អ្នកប្រើប្រាស់ "$3" ។',
	'crosswikiblock-noreason'       => 'គ្មានហេតុផល ត្រូវបានសំដៅ ។',
	'crosswikiblock-alreadyblocked' => 'អ្នកប្រើប្រាស់ $3 ត្រូវបាន រាំងខ្ទប់ ហើយ ។',
	'crosswikiblock-noblock'        => 'អ្នកប្រើប្រាស់នេះ មិនត្រូវបាន​ រាំងខ្ទប់ ។',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'crosswikiblock-desc'           => "Erlaabt d'Späre vu Benotzer op anere Wikien iwwer eng [[Special:Crosswikiblock|Spezialsäit]]",
	'crosswikiblock'                => 'E Benotzer op enger anerer Wiki spären',
	'crosswikiblock-header'         => 'Dës Spezialsäit erlaabt et e Benotzer op enger anere Wiki ze spären.

Vergewëssert iech w.e.g. ob dir déi néideg Rechter op däer anerer Wiki dofir hutt an ob är Aktioun de Regegelen vun däer wiki entsprecht.',
	'crosswikiblock-reason'         => 'Grond:',
	'crosswikiblock-submit'         => 'Dëse Benotzer spären',
	'crosswikiblock-anononly'       => 'Nëmmen anonym Benotzer spären',
	'crosswikiunblock'              => "D'Spär vum Benotzer op enger anerer Wiki ophiewen",
	'crosswikiunblock-reason'       => 'Grond:',
	'crosswikiunblock-submit'       => 'Spär fir dëse Benotzer ophiewen',
	'crosswikiblock-nousername'     => 'Dir hutt kee Benotzernumm aginn',
	'crosswikiblock-dbnotfound'     => "D'Datebank $1 gëtt et net.",
	'crosswikiblock-noname'         => '"$1" ass kee gültege Benotzernumm.',
	'crosswikiblock-nouser'         => 'De Benotzer "$3" gouf net fonnt.',
	'crosswikiblock-noreason'       => 'Kee Grond uginn.',
	'crosswikiblock-alreadyblocked' => 'De Benotzer $3 ass scho gespaart.',
	'crosswikiblock-noblock'        => 'Dëse Benotzer ass net gespaart.',
);

/** Marathi (मराठी)
 * @author Kaustubh
 */
$messages['mr'] = array(
	'crosswikiblock-desc'           => 'इतर विकिंवर [[Special:Crosswikiblock|विशेष पान]] वापरून सदस्य ब्लॉक करायची परवानगी देते',
	'crosswikiblock'                => 'इतर विकिवर सदस्याला ब्लॉक करा',
	'crosswikiblock-header'         => 'हे पान इतर विकिवर सदस्याला ब्लॉक करायची परवानगी देते.
कृपया ही क्रिया करण्याची तुम्हाला परवानगी आहे तसेच तुम्ही करीत असलेली क्रिया नीतीला धरुन आहे याची खात्री करा.',
	'crosswikiblock-target'         => 'आयपी अंकपत्ता किंवा सदस्यनाव तसेच कुठल्या विकिवर करायचे तो विकि:',
	'crosswikiblock-expiry'         => 'रद्दीकरण:',
	'crosswikiblock-reason'         => 'कारण:',
	'crosswikiblock-submit'         => 'या सदस्याला ब्लॉक करा',
	'crosswikiblock-anononly'       => 'फक्त अनामिक सदस्यांना ब्लॉक करा',
	'crosswikiblock-nocreate'       => 'खाते उघडणी बंद करा',
	'crosswikiblock-autoblock'      => 'या सदस्याचा आपोआप शेवटचा आयपी अंकपत्ता ब्लॉक करा, तसेच यानंतरच्या कुठल्याही आयपी वरुन संपादने करण्याचा प्रयत्न केल्यास ते अंकपत्ते सुद्धा ब्लॉक करा',
	'crosswikiblock-noemail'        => 'सदस्याला इमेल पाठविण्यापासून रोखा',
	'crosswikiunblock'              => 'इतर विकिंवर सदस्याचा ब्लॉक काढा',
	'crosswikiunblock-header'       => 'हे पान इतर विकिंवर सदस्याचा ब्लॉक काढण्यासाठी वापरण्यात येते.
कृपया या विकिवर ही क्रिया करण्याचे अधिकार तुम्हाला आहेत तसेच तुम्ही करीत असलेली क्रिया नीतीला धरुन आहे याची खात्री करा.',
	'crosswikiunblock-user'         => 'सदस्यनाव, आयपी अंकपत्ता किंवा ब्लॉक क्रमांक तसेच कुठल्या विकिवर ब्लॉक काढायचा आहे:',
	'crosswikiunblock-reason'       => 'कारण:',
	'crosswikiunblock-submit'       => 'या सदस्याचा ब्लॉक काढा',
	'crosswikiunblock-success'      => "'''$1''' चा ब्लॉक यशस्वीरित्या काढलेला आहे.

परत जा:
* [[Special:CrosswikiBlock|ब्लॉक अर्ज]]
* [[$2]]",
	'crosswikiblock-nousername'     => 'सदस्यनाव दिलेले नाही',
	'crosswikiblock-local'          => 'स्थानिक ब्लॉक या ठिकाणी बदलता येत नाहीत. [[Special:Blockip]] चा वापर करा',
	'crosswikiblock-dbnotfound'     => 'डाटाबेस $1 उपलब्ध नाही',
	'crosswikiblock-noname'         => '"$1" हे योग्य सदस्यनाव नाही.',
	'crosswikiblock-nouser'         => '"$3" नावाचा सदस्य सापडला नाही.',
	'crosswikiblock-noexpiry'       => 'चुकीचे रद्दीकरण: $1.',
	'crosswikiblock-noreason'       => 'कारण दिलेले नाही',
	'crosswikiblock-notoken'        => 'चुकीची संपादन चावी.',
	'crosswikiblock-alreadyblocked' => 'सदस्य $3 ला अगोदरच ब्लॉक केलेले आहे.',
	'crosswikiblock-noblock'        => 'ह्या सदस्याला ब्लॉक केलेले नाही.',
	'crosswikiblock-success'        => "सदस्य '''$3''' ला ब्लॉक केलेले आहे.

परत जा:
* [[Special:CrosswikiBlock|ब्लॉक अर्ज]]
* [[$4]]",
	'crosswikiunblock-local'        => 'स्थानिक अनब्लॉक इथे बदलता येत नाहीत. [[Special:Ipblocklist]] चा उपयोग करा',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'crosswikiblock-desc'           => 'Laat toe om gebruikers op andere wikis te blokkeren via een [[Special:Crosswikiblock|speciale pagina]]',
	'crosswikiblock'                => 'Gebruiker blokkeren op een andere wiki',
	'crosswikiblock-header'         => 'Deze pagina laat toe om gebruikers te blokkeren op een andere wiki.
Gelieve te controleren of u de juiste rechten hebt op deze wiki en of uw acties het beleid volgt.',
	'crosswikiblock-target'         => 'IP-adres of gebruikersnaam en bestemmingswiki:',
	'crosswikiblock-expiry'         => 'Duur:',
	'crosswikiblock-reason'         => 'Reden:',
	'crosswikiblock-submit'         => 'Deze gebruiker blokkeren',
	'crosswikiblock-anononly'       => 'Alleen anonieme gebruikers blokkeren',
	'crosswikiblock-nocreate'       => 'Gebruiker aanmaken voorkomen',
	'crosswikiblock-autoblock'      => "Automatisch het laatste IP-adres gebruikt door deze gebruiker blokkeren, en elke volgende IP's waarmee ze proberen te bewerken",
	'crosswikiblock-noemail'        => 'Het verzenden van e-mails door deze gebruiker voorkomen',
	'crosswikiunblock'              => 'Gebruiker op een andere wiki deblokkeren',
	'crosswikiunblock-header'       => 'Via deze pagina kunt u een gebruiker op een andere wiki deblokkeren.
Controleer alstublieft of u dit op die wiki mag doen en of u in overeenstemming met het beleid handelt.',
	'crosswikiunblock-user'         => 'Gebruiker, IP-adres of blokkadenummer en bestemmingswiki:',
	'crosswikiunblock-reason'       => 'Reden:',
	'crosswikiunblock-submit'       => 'Gebruiker deblokkeren',
	'crosswikiunblock-success'      => "Gebruiker '''$1''' is gedeblokkeerd.

Ga terug naar:
* [[Special:CrosswikiBlock|Blokkadeformulier]]
* [[$2]]",
	'crosswikiblock-nousername'     => 'Er werd geen gebruikersnaam opgegeven',
	'crosswikiblock-local'          => 'Plaatselijke blokkades worden niet ondersteund door dit formulier. Gebruik daarvoor [[Special:Blockip]].',
	'crosswikiblock-dbnotfound'     => 'Database $1 bestaat niet',
	'crosswikiblock-noname'         => '"$1" is geen geldige gebruikersnaam.',
	'crosswikiblock-nouser'         => 'Gebruiker "$3" is niet gevonden.',
	'crosswikiblock-noexpiry'       => 'Ongeldige duur: $1.',
	'crosswikiblock-noreason'       => 'Geen reden opgegeven.',
	'crosswikiblock-notoken'        => 'Onjuist bewerkingstoken.',
	'crosswikiblock-alreadyblocked' => 'Gebruiker $3 is al geblokkeerd.',
	'crosswikiblock-noblock'        => 'Deze gebruiker is niet geblokkeerd',
	'crosswikiblock-success'        => "Gebruiker '''$3''' succesvol geblokkeerd.

Teruggaan naar:
* [[Special:CrosswikiBlock|Blokkeerformulier]]
* [[$4]]",
	'crosswikiunblock-local'        => 'Plaatselijke deblokkades worden niet ondersteund door dit formulier. Gebruik daarvoor [[Special:Ipblocklist]].',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Jon Harald Søby
 */
$messages['nn'] = array(
	'crosswikiblock-reason'    => 'Årsak:',
	'crosswikiblock-submit'    => 'Blokker denne brukaren',
	'crosswikiblock-nocreate'  => 'Hindre kontooppretting',
	'crosswikiblock-autoblock' => 'Blokker den førre IP-adressa som vart brukt av denne brukaren automatisk, og alle andre IP-adresser brukaren prøvar å endre sider med i framtida',
	'crosswikiblock-noemail'   => 'Hindre sending av e-post til andre brukarar',
	'crosswikiunblock-reason'  => 'Årsak:',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'crosswikiblock-desc'           => 'Gjør det mulig å blokkere brukere på andre wikier ved hjelp av en [[Special:Crosswikiblock|spesialside]]',
	'crosswikiblock'                => 'Blokker brukere på andre wikier',
	'crosswikiblock-header'         => 'Denne siden gjør at man kan blokkere brukere på andre wikier. Sjekk om du har tillatelse til å gjøre det på denne wikien, og at du følger alle retningslinjene.',
	'crosswikiblock-target'         => 'IP-adresse eller brukernavn og målwiki:',
	'crosswikiblock-expiry'         => 'Varighet:',
	'crosswikiblock-reason'         => 'Årsak:',
	'crosswikiblock-submit'         => 'Blokker denne brukeren',
	'crosswikiblock-anononly'       => 'Blokker kun anonyme brukere',
	'crosswikiblock-nocreate'       => 'Hindre kontoopprettelse',
	'crosswikiblock-autoblock'      => 'Blokker forrige IP-adresse brukt av denne brukeren automatisk, samt alle IP-adresser brukeren forsøker å redigere med i framtiden',
	'crosswikiblock-noemail'        => 'Forhindre brukeren fra å sende e-post',
	'crosswikiunblock'              => 'Avblokker brukeren på andre wikier',
	'crosswikiunblock-header'       => 'Denne siden lar deg avblokkere brukere på andre wikier. Sjekk om du har lov til å gjøre dette på den lokale wikien i henhold til deres retningslinjer.',
	'crosswikiunblock-user'         => 'Brukernavn, IP-adresse eller blokkerings-ID og målwiki:',
	'crosswikiunblock-reason'       => 'Årsak:',
	'crosswikiunblock-submit'       => 'Avblokker brukeren',
	'crosswikiunblock-success'      => "Brukeren '''$1''' ble avblokkert.

Tilbake til:
* [[Special:CrosswikiBlock|Blokkeringsskjema]]
* [[$2]]",
	'crosswikiblock-nousername'     => 'Ingen brukernavn ble skrevet inn',
	'crosswikiblock-local'          => 'Lokale blokkeringer støttes ikke av dette grensesnittet. Bruk [[Special:Blockip]]',
	'crosswikiblock-dbnotfound'     => 'Databasen $1 finnes ikke',
	'crosswikiblock-noname'         => '«$1» er ikke et gyldig brukernavn.',
	'crosswikiblock-nouser'         => 'Brukeren «$3» ble ikke funnet.',
	'crosswikiblock-noexpiry'       => 'Ugyldig utløpstid: $1.',
	'crosswikiblock-noreason'       => 'Ingen begrunnelse gitt.',
	'crosswikiblock-notoken'        => 'Ugyldig redigeringstegn.',
	'crosswikiblock-alreadyblocked' => '«$3» er allerede blokkert.',
	'crosswikiblock-noblock'        => 'Denne brukeren er ikke blokkert.',
	'crosswikiblock-success'        => "'''$3''' er blokkert.

Tilbake til:
* [[Special:CrosswikiBlock|Blokkeringsskjemaet]]
* [[$4]]",
	'crosswikiunblock-local'        => 'Lokale blokkeringer støttes ikke via dette grensesnittet. Bruk [[Special:Ipblocklist]].',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'crosswikiblock-desc'           => "Permet de blocar d'utilizaires sus d'autres wikis en utilizant [[Special:Crosswikiblock|una pagina especiala]]",
	'crosswikiblock'                => 'Blocar un utilizaire sus un autre wiki',
	'crosswikiblock-header'         => 'Aquesta pagina permet de blocar un utilizaire sus un autre wiki.

Verificatz se sètz abilitat per agir sus aqueste wiki e que vòstras accions respèctan totas las règlas.',
	'crosswikiblock-target'         => "Adreça IP o nom d'utilizaire e wiki de destinacion :",
	'crosswikiblock-expiry'         => 'Expiracion :',
	'crosswikiblock-reason'         => 'Motiu :',
	'crosswikiblock-submit'         => 'Blocar aqueste utilizaire',
	'crosswikiblock-anononly'       => 'Blocar unicament los utilizaires anonims',
	'crosswikiblock-nocreate'       => 'Interdire la creacion de compte',
	'crosswikiblock-autoblock'      => "Bloca automaticament la darrièra adreça IP utilizada per aqueste utilizaire, e totas las IP subsequentas que ensajan d'editar",
	'crosswikiblock-noemail'        => "Interdire a l'utilizaire de mandar un corrièr electronic",
	'crosswikiunblock'              => "Deblocar en escritura un utilizaire d'un autre wiki",
	'crosswikiunblock-header'       => "Aquesta pagina permet de deblocar en escritura un utilizaire d'un autre wiki.
Asseguratz-vos qu'avètz los dreches e respectatz las règlas en vigor sus aqueste wiki.",
	'crosswikiunblock-user'         => "Nom d'utilizaire, adreça IP o l'id de blocatge e lo wiki ciblat :",
	'crosswikiunblock-reason'       => 'Motiu :',
	'crosswikiunblock-submit'       => 'Deblocar en escritura aqueste utilizaire',
	'crosswikiunblock-success'      => "L'utilizaire '''1$''' es estat desblocat en escritura amb succès.

Tornar a :
* [[Special:CrosswikiBlock|Formulari de blocatge]]
* [[$2]]",
	'crosswikiblock-nousername'     => "Cap de nom d'utilizaire es pas estat indicat",
	'crosswikiblock-local'          => 'Los blocatges locals son pas suportats a travèrs aquesta interfàcia. Utilizatz [[Special:Blockip]].',
	'crosswikiblock-dbnotfound'     => 'La banca de donadas « $1 » existís pas',
	'crosswikiblock-noname'         => '« $1 » es pas un nom d’utilizaire valid.',
	'crosswikiblock-nouser'         => 'L’utilizaire « $3 » es introbable.',
	'crosswikiblock-noexpiry'       => 'Data o durada d’expiracion incorrècta : $1.',
	'crosswikiblock-noreason'       => 'Cap de motiu indicat.',
	'crosswikiblock-notoken'        => 'Edicion presa incorrècta.',
	'crosswikiblock-alreadyblocked' => 'L’utilizaire « $3 » ja es blocat.',
	'crosswikiblock-noblock'        => 'Aqueste utilizaire es pas blocat en escritura.',
	'crosswikiblock-success'        => "L’utilizaire '''$3''' es estat blocat amb succès.

Tornar vèrs :
* [[Special:CrosswikiBlock|Lo formulari de blocatge]] ;
* [[$4]].",
	'crosswikiunblock-local'        => 'Los blocatges en escritura locals son pas suportats via aquesta interfàcia. Utilizatz [[Special:Ipblocklist]]',
);

/** Polish (Polski)
 * @author Masti
 * @author Derbeth
 * @author McMonster
 * @author Sp5uhe
 * @author Equadus
 */
$messages['pl'] = array(
	'crosswikiblock-desc'           => 'Umożliwia blokowanie użytkowników na innych wiki za pomocą [[{{ns:Special}}:Crosswikiblock|strony specjalnej]]',
	'crosswikiblock-expiry'         => 'Wygasa:',
	'crosswikiblock-reason'         => 'Powód:',
	'crosswikiblock-submit'         => 'Zablokuj użytkownika',
	'crosswikiblock-anononly'       => 'Zablokuj tylko anonimowych użytkowników',
	'crosswikiblock-nocreate'       => 'Zablokuj tworzenie konta',
	'crosswikiblock-autoblock'      => 'Zablokuj ostatni adres IP tego użytkownika i automatycznie wszystkie kolejne, z których będzie próbował edytować',
	'crosswikiblock-noemail'        => 'Zablokuj możliwość wysyłania e-maili',
	'crosswikiunblock-reason'       => 'Powód:',
	'crosswikiunblock-submit'       => 'Odblokuj użytkownika',
	'crosswikiblock-nousername'     => 'Nie wprowadzono nazwy użytkownika',
	'crosswikiblock-dbnotfound'     => 'Baza $1 nie istnieje',
	'crosswikiblock-noname'         => '"$1" nie jest poprawną nazwą użytkownika.',
	'crosswikiblock-nouser'         => 'Nie znaleziono użytkownika "$3".',
	'crosswikiblock-noexpiry'       => 'Nieprawidłowy czas wygaśnięcia: $1.',
	'crosswikiblock-noreason'       => 'Nie podano powodu.',
	'crosswikiblock-notoken'        => 'Nieprawidłowy token edycji',
	'crosswikiblock-alreadyblocked' => 'Użytkownik $3 jest już zablokowany.',
	'crosswikiblock-noblock'        => 'Ten użytkownik nie jest zablokowany.',
	'crosswikiblock-success'        => "Pomyślnie zablokowano użytkownika '''$3'''.

Powrót do:
* [[{{ns:special}}:CrosswikiBlock|Formularza blokowania]]
* [[$4]]",
	'crosswikiunblock-local'        => 'Lokalne odblokowywanie nie jest obsługiwane w tym interfejsie. Użyj [[Special:Ipblocklist]]',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'crosswikiunblock-reason' => 'سبب:',
);

/** Portuguese (Português)
 * @author Malafaya
 * @author Lijealso
 */
$messages['pt'] = array(
	'crosswikiblock-desc'           => 'Permite bloquear utilizadores noutros wikis usando uma [[{{ns:special}}:Crosswikiblock|página especial]]',
	'crosswikiblock'                => 'Bloquear utilizador noutro wiki',
	'crosswikiblock-target'         => 'Endereço IP ou nome de utilizador e wiki destino:',
	'crosswikiblock-expiry'         => 'Expiração:',
	'crosswikiblock-reason'         => 'Motivo:',
	'crosswikiblock-submit'         => 'Bloquear este utilizador',
	'crosswikiblock-anononly'       => 'Bloquear apenas utilizadores anónimos',
	'crosswikiblock-nocreate'       => 'Impedir criação de conta',
	'crosswikiblock-noemail'        => 'Impedir utilizador de enviar email',
	'crosswikiunblock'              => 'Desbloquear utilizador noutro wiki',
	'crosswikiunblock-user'         => 'Nome de utilizador, endereço IP ou ID de bloqueio e wiki destino:',
	'crosswikiunblock-reason'       => 'Motivo:',
	'crosswikiunblock-submit'       => 'Desbloquear este utilizador',
	'crosswikiunblock-success'      => "Usuário '''$1''' desbloqueado com sucesso.

Regressar a:
* [[Special:CrosswikiBlock|Formulário de bloqueio]]
* [[$2]]",
	'crosswikiblock-nousername'     => 'Nenhum nome de utilizador foi introduzido',
	'crosswikiblock-local'          => 'Bloqueios locais não podem ser efectuados a partir deste interface. Use [[Special:Blockip]]',
	'crosswikiblock-dbnotfound'     => 'A base de dados $1 não existe',
	'crosswikiblock-noname'         => '"$1" não é um nome de utilizador válido.',
	'crosswikiblock-nouser'         => 'O utilizador "$3" não foi encontrado.',
	'crosswikiblock-noexpiry'       => 'Expiração inválida: $1.',
	'crosswikiblock-noreason'       => 'Nenhum motivo especificado.',
	'crosswikiblock-alreadyblocked' => 'O utilizador $3 já está bloqueado.',
	'crosswikiblock-noblock'        => 'Este utilizador não está bloqueado.',
	'crosswikiblock-success'        => "Utilizador '''$3''' bloqueado com sucesso.

Voltar para:
* [[{{ns:special}}:CrosswikiBlock|Formulário de bloqueio]]
* [[$4]]",
	'crosswikiunblock-local'        => 'Desbloqueios locais são podem ser efectuados a partir deste interface. Use [[Special:Ipblocklist]]',
);

/** Russian (Русский)
 * @author .:Ajvol:.
 */
$messages['ru'] = array(
	'crosswikiblock-desc'           => 'Позволяет блокировать участников на других вики с помощью [[Special:Crosswikiblock|служебной страницы]]',
	'crosswikiblock'                => 'Блокировка участников на других вики',
	'crosswikiblock-header'         => 'Эта страница позволяет блокировать участников на других вики.
Пожалуйста, убедитесь, что вам разрешено производить подобные действия на этой вики и что вы следуете всем правилам.',
	'crosswikiblock-target'         => 'IP-адрес или имя участника и целевая вики:',
	'crosswikiblock-expiry'         => 'Истекает:',
	'crosswikiblock-reason'         => 'Причина:',
	'crosswikiblock-submit'         => 'Заблокировать этого участника',
	'crosswikiblock-anononly'       => 'Заблокировать только анонимных участников',
	'crosswikiblock-nocreate'       => 'Запретить создание учётных записей',
	'crosswikiblock-autoblock'      => 'Автоматически заблокировать последний использованный этим участником IP-адрес и любые последующие IP-адреса с которых производятся попытки редактирования',
	'crosswikiblock-noemail'        => 'Запретить участнику отправку электронной почты',
	'crosswikiunblock'              => 'Разблокировать участника в этой вики',
	'crosswikiunblock-header'       => 'Эта страница позволяет разблокировать участников в других вики.
Пожалуйста, убедитесь что вам разрешены подобные действия и что что они соответствуют всем правилам.',
	'crosswikiunblock-user'         => 'Имя участника, IP-адрес или идентификатор блокировки на целевой вики:',
	'crosswikiunblock-reason'       => 'Причина:',
	'crosswikiunblock-submit'       => 'Разблокировать участника',
	'crosswikiunblock-success'      => "Участник '''$1''' успешно разблокирован.

Вернуться к:
* [[Special:CrosswikiBlock|Форма блокировки]]
* [[$2]]",
	'crosswikiblock-nousername'     => 'Не введено имя участника',
	'crosswikiblock-local'          => 'Локальные блокировки не поддерживаются через этот интерфейс. Используйте [[Special:Blockip]].',
	'crosswikiblock-dbnotfound'     => 'База данных $1 не существует',
	'crosswikiblock-noname'         => '«$1» не является допустимым именем участника.',
	'crosswikiblock-nouser'         => 'Участник «$3» не найден.',
	'crosswikiblock-noexpiry'       => 'Ошибочный срок окончания: $1.',
	'crosswikiblock-noreason'       => 'Не указана причина.',
	'crosswikiblock-notoken'        => 'Ошибочный маркер правки.',
	'crosswikiblock-alreadyblocked' => 'Участник $3 уже заблокирован.',
	'crosswikiblock-noblock'        => 'Этот участник не был заблокирован.',
	'crosswikiblock-success'        => "Участник '''$3''' успешно заблокирован.

Вернуться к:
* [[Special:CrosswikiBlock|форма блокировки]]
* [[$4]]",
	'crosswikiunblock-local'        => 'Локальные блокировки не поддерживаются с помощью этого интерфейса. Используйте [[Special:Ipblocklist]]',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'crosswikiblock-desc'           => 'Umožňuje blokovanie používateľov na iných wiki pomocou [[Special:Crosswikiblock|špeciálnej stránky]]',
	'crosswikiblock'                => 'Zablokovať používateľa na inej wiki',
	'crosswikiblock-header'         => 'Táto stránka umožňuje zablokovať používateľa na inej wiki.
Prosím, overte si, či máte povolené na danej wiki konať a vaše konanie je v súlade so všetkými pravidlami.',
	'crosswikiblock-target'         => 'IP adresa alebo používateľské meno a cieľová wiki:',
	'crosswikiblock-expiry'         => 'Expirácia:',
	'crosswikiblock-reason'         => 'Dôvod:',
	'crosswikiblock-submit'         => 'Zablokovať tohto používateľa',
	'crosswikiblock-anononly'       => 'Zablokovať iba anonymných používateľov',
	'crosswikiblock-nocreate'       => 'Zabrániť tvorbe účtov',
	'crosswikiblock-autoblock'      => 'Automaticky blokovať poslednú IP adresu, ktorú tento používateľ použil a akékoľvek ďalšie adresy, z ktorých sa pokúsia upravovať.',
	'crosswikiblock-noemail'        => 'Zabrániť používateľovi odosielať email',
	'crosswikiunblock'              => 'Odblokovať používateľa na inej wiki',
	'crosswikiunblock-header'       => 'Táto stránka umožňuje odblokovanie používateľa na inej wiki.
Prosím, uistite sa, že máte povolenie konať na tejto wiki a vaše konanie je v súlade so všetkými pravidlami.',
	'crosswikiunblock-user'         => 'Používateľské meno, IP adresa alebo ID blokovania a cieľová wiki:',
	'crosswikiunblock-reason'       => 'Dôvod:',
	'crosswikiunblock-submit'       => 'Odblokovať tohto používateľa',
	'crosswikiunblock-success'      => "Používateľ '''$1''' bol úspešne odblokovaný.

Vrátiť sa na:
* [[Special:CrosswikiBlock|Formulár blokovania]]
* [[$2]]",
	'crosswikiblock-nousername'     => 'Nebolo zadané používateľské meno',
	'crosswikiblock-local'          => 'Toto rozhranie nepodporuje lokálne blokovanie. Použite [[Special:Blockip]].',
	'crosswikiblock-dbnotfound'     => 'Databáza $1 neexistuje',
	'crosswikiblock-noname'         => '„$1“ nie je platné používateľské meno.',
	'crosswikiblock-nouser'         => 'Používateľ „$3“ nebol nájdený.',
	'crosswikiblock-noexpiry'       => 'Neplatná expirácia: $1.',
	'crosswikiblock-noreason'       => 'Nebol uvedený dôvod.',
	'crosswikiblock-notoken'        => 'Neplatný upravovací token.',
	'crosswikiblock-alreadyblocked' => 'Používateľ $3 je už zablokovaný.',
	'crosswikiblock-noblock'        => 'Tento používateľ nie je zablokovaný.',
	'crosswikiblock-success'        => "Používateľ '''$3''' bol úspešne zablokovaný.

Vrátiť sa na:
* [[Special:CrosswikiBlock|Blokovací formulár]]
* [[$4]]",
	'crosswikiunblock-local'        => 'Lokálne blokovania nie sú týmto rozhraním podporované. Použite [[Special:Ipblocklist]].',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Sasa Stefanovic
 */
$messages['sr-ec'] = array(
	'crosswikiblock-reason'   => 'Разлог:',
	'crosswikiunblock-reason' => 'Разлог:',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'crosswikiblock-desc'           => "Ferlööwet ju Speere fon Benutsere in uur Wiki's uur ne [[Special:Crosswikiblock|Spezioalsiede]]",
	'crosswikiblock'                => 'Speer Benutser in n uur Wiki',
	'crosswikiblock-header'         => 'Disse Spezioalsiede ferlööwet ju Speere fon n Benutser in n uur Wiki.
Wröich, of du ju Beföichnis hääst, in dissen uur Wiki tou speeren un of dien Aktion do Gjuchtlienjen fon do äntspräkt.',
	'crosswikiblock-target'         => 'IP-Adresse of Benutsernoome un Sielwiki:',
	'crosswikiblock-expiry'         => 'Speerduur:',
	'crosswikiblock-reason'         => 'Begruundenge:',
	'crosswikiblock-submit'         => 'IP-Adresse/Benutser speere',
	'crosswikiblock-anononly'       => 'Speer bloot anonyme Benutsere (anmäldede Benutsere mäd disse IP-Adresse wäide nit speerd). In fuul Falle is dät beeter.',
	'crosswikiblock-nocreate'       => 'Dät Moakjen fon Benutserkonten ferhinnerje',
	'crosswikiblock-autoblock'      => 'Speer ju aktuell fon dissen Benutser bruukte IP-Adresse as uk automatisk aal do foulgjende, fon do uut hie Beoarbaidengen of dät Anlääsen fon Benutserkonten fersäkt.',
	'crosswikiblock-noemail'        => 'E-Mail-Ferseenden speere',
	'crosswikiunblock'              => 'Äntspeer Benutser in n uur Wiki',
	'crosswikiunblock-header'       => 'Disse Spezioalsiede ferlööwet ju Aphieuwenge fon ne Benutserspeere in n uur Wiki.
Wröich, of du ju Beföichnis hääst, in dissen uur Wiki tou speeren un of dien Aktion hiere Gjuchlienjen äntspräkt.',
	'crosswikiunblock-user'         => 'IP-Adresse of Benutsernoome un Sielwiki:',
	'crosswikiunblock-reason'       => 'Begruundenge:',
	'crosswikiunblock-submit'       => 'Speere foar IP-Adresse/Benutser aphieuwje',
	'crosswikiunblock-success'      => "Benutser '''„$1“''' mäd Ärfoulch äntspeerd.

Tourääch tou:
* [[Special:CrosswikiBlock|Speerformular]]
* [[$2]]",
	'crosswikiblock-nousername'     => 'Der wuude naan Benutsernoome ienroat',
	'crosswikiblock-local'          => 'Lokoale Speeren wäide truch disse Interface nit unnerstutsed. Benutsje [[{{#special:Blockip}}]]',
	'crosswikiblock-dbnotfound'     => 'Doatenboank $1 is nit deer',
	'crosswikiblock-noname'         => '„$1“ is naan gultigen Benutsernoome.',
	'crosswikiblock-nouser'         => 'Benutser "$3" nit fuunen.',
	'crosswikiblock-noexpiry'       => 'Uungultige Speerduur: $1.',
	'crosswikiblock-noreason'       => 'Begruundenge failt.',
	'crosswikiblock-notoken'        => 'Uungultich Beoarbaidengs-Token.',
	'crosswikiblock-alreadyblocked' => 'Benutser "$3" is al speerd.',
	'crosswikiblock-noblock'        => 'Dissen Benutser is nit speerd.',
	'crosswikiblock-success'        => "Benutser '''„$3“''' mäd Ärfoulch speerd.

Tourääch tou:
* [[Special:CrosswikiBlock|Speerformular]]
* [[$4]]",
	'crosswikiunblock-local'        => 'Lokoale Speeren wäide uur dit Interface nit unnerstutsed. Benutsje [[{{#special:Ipblocklist}}]].',
);

/** Swedish (Svenska)
 * @author Lejonel
 * @author M.M.S.
 */
$messages['sv'] = array(
	'crosswikiblock-desc'           => 'Gör det möjligt att blockera användare på andra wikier med hjälp av en [[Special:Crosswikiblock|specialsida]]',
	'crosswikiblock'                => 'Blockera användare på en annan wiki',
	'crosswikiblock-header'         => 'Den här sidan används för att blockera användare på andra wikier.
Kontrollera att du har tillåtelse att utföra åtgärder på den andra wikin, och att du följer alla policyer.',
	'crosswikiblock-target'         => 'IP-adress eller användarnamn och målwiki:',
	'crosswikiblock-expiry'         => 'Varaktighet:',
	'crosswikiblock-reason'         => 'Anledning:',
	'crosswikiblock-submit'         => 'Blockera användaren',
	'crosswikiblock-anononly'       => 'Blockera bara oinloggade användare',
	'crosswikiblock-nocreate'       => 'Förhindra registrering av användarkonton',
	'crosswikiblock-autoblock'      => 'Blockera automatiskt den IP-adress som användaren använde senast, samt alla adresser som användaren försöker redigera ifrån',
	'crosswikiblock-noemail'        => 'Hindra användaren från att skicka e-post',
	'crosswikiunblock'              => 'Ta bort blockering av användare på en annan wiki',
	'crosswikiunblock-header'       => 'Den här sidan används för att ta bort blockeringar av användare på andra wikier.
Kontrollera att du har tillåtelse att utföra åtgärder på den andra wikin, och att du följer alla policyer.',
	'crosswikiunblock-user'         => 'Användarnamn, IP-adress eller blockerings-ID och målwiki:',
	'crosswikiunblock-reason'       => 'Anledning:',
	'crosswikiunblock-submit'       => 'Ta bort blockeringen',
	'crosswikiunblock-success'      => "Blockeringen av '''$1''' har tagits bort.

Gå tillbaka till:
* [[Special:CrosswikiBlock|Blockeringsformuläret]]
* [[$2]]",
	'crosswikiblock-nousername'     => 'Inget användarnamn angavs',
	'crosswikiblock-local'          => 'Lokala blockeringar kan inte göras från den här sidan. Använd [[Special:Blockip]] istället.',
	'crosswikiblock-dbnotfound'     => 'Databasen "$1" existerar inte',
	'crosswikiblock-noname'         => '"$1" är inte ett giltigt användarnamn.',
	'crosswikiblock-nouser'         => 'Användaren "$3" hittades inte.',
	'crosswikiblock-noexpiry'       => 'Ogiltig varaktighet: $1.',
	'crosswikiblock-noreason'       => 'Ingen anledning angavs.',
	'crosswikiblock-notoken'        => 'Ogiltigt redigerings-token.',
	'crosswikiblock-alreadyblocked' => 'Användaren $3 är redan blockerad.',
	'crosswikiblock-noblock'        => 'Användaren är inte blockerad.',
	'crosswikiblock-success'        => "Blockeringen av användaren '''$3''' lyckades.

Gå tillbaka till:
* [[Special:CrosswikiBlock|Blockeringsformuläret]]
* [[$4]]",
	'crosswikiunblock-local'        => 'Lokala blockeringar kan inte tas bort via det här formuläret. Använd [[Special:Ipblocklist]] istället.',
);

/** Silesian (ślůnski)
 * @author Herr Kriss
 */
$messages['szl'] = array(
	'crosswikiblock-expiry'   => 'Wygaso:',
	'crosswikiblock-reason'   => 'Čymu:',
	'crosswikiunblock-reason' => 'Čymu:',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'crosswikiblock-desc'           => '[[Special:Crosswikiblock|ప్రత్యేక పేజీ]] ద్వారా వాడుకర్లని ఇతర వికీల్లో కూడా నిరోధించే వీలుకల్పిస్తుంది',
	'crosswikiblock'                => 'ఇతర వికీలో వాడుకరిని నిరోధించండి',
	'crosswikiblock-target'         => 'IP చిరునామా లేదా వాడుకరిపేరు మరియు గమ్యస్థానపు వికీ:',
	'crosswikiblock-expiry'         => 'కాలపరిమితి:',
	'crosswikiblock-reason'         => 'కారణం:',
	'crosswikiblock-submit'         => 'ఈ వాడుకరిని నిరోధించండి',
	'crosswikiblock-anononly'       => 'అనామక వాడుకరులను మాత్రమే నిరోధించు',
	'crosswikiblock-nocreate'       => 'ఖాతా సృష్టింపుని నివారించు',
	'crosswikiblock-noemail'        => 'వాడుకరి ఈ-మెయిల్ పంపించడం నియంత్రించండి',
	'crosswikiunblock-user'         => 'వాడుకరిపేరు, ఐపీ చిరునామా లేదా నిరోధపు ID మరియు లక్ష్యిత వికీ:',
	'crosswikiunblock-reason'       => 'కారణం:',
	'crosswikiunblock-submit'       => 'ఈ వాడుకరిపై నిరోధం ఎత్తివేయండి',
	'crosswikiunblock-success'      => "'''$1''' అనే వాడుకరిపై నిరోధాన్ని విజయవంతంగా ఎత్తివేసాం.

తిరిగి:
* [[Special:CrosswikiBlock|నిరోధపు ఫారం]]
* [[$2]]",
	'crosswikiblock-nousername'     => 'వాడుకరిపేరు ఇవ్వలేదు',
	'crosswikiblock-dbnotfound'     => '$1 అనే డాటాబేసు లేదు',
	'crosswikiblock-noname'         => '"$1" అన్నది సరైన వాడుకరిపేరు కాదు.',
	'crosswikiblock-nouser'         => '"$3" అనే వాడుకరి కనబడలేదు.',
	'crosswikiblock-noexpiry'       => 'తప్పుడు కాలపరిమితి: $1.',
	'crosswikiblock-noreason'       => 'కారణం తెలుపలేదు.',
	'crosswikiblock-alreadyblocked' => '$3 అనే వాడుకరిని ఇదివరకే నిరోధించాం.',
	'crosswikiblock-noblock'        => 'ఈ వాడుకరిని నిరోధించలేదు.',
	'crosswikiblock-success'        => "'''$3''' అనే వాడుకరిని విజయవంతంగా నిరోధించాం.

తిరిగి:
* [[Special:CrosswikiBlock|నిరోధపు ఫారం]]
* [[$4]]",
);

/** Tajik (Cyrillic) (Тоҷикӣ/tojikī (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'crosswikiblock-target'         => 'Нишонаи IP ё номи корбарӣ ва викии мақсад:',
	'crosswikiblock-reason'         => 'Далел:',
	'crosswikiblock-submit'         => 'Бастани ин корбар',
	'crosswikiblock-anononly'       => 'Фақат бастани корбарони гумном',
	'crosswikiblock-nocreate'       => 'Ҷилавгирӣ аз эҷоди ҳисоб',
	'crosswikiblock-noemail'        => 'Ҷилавгирии корбар аз фиристодани почтаи электронӣ',
	'crosswikiunblock'              => 'Аз бастан озод кардани корбар дар дигар вики',
	'crosswikiunblock-user'         => 'Номи корбарӣ, нишонаи IP  ё нишонаи бастан ва викии мақсад:',
	'crosswikiunblock-reason'       => 'Сабаб:',
	'crosswikiunblock-submit'       => 'Боз кардани ин корбар',
	'crosswikiunblock-success'      => "Корбар '''$1''' бо муваффақият боз шуд.

Баргардед ба:
* [[Special:CrosswikiBlock|Форми бастан]]
* [[$2]]",
	'crosswikiblock-dbnotfound'     => 'Пойгоҳи додаи $1 вуҷуд надорад',
	'crosswikiblock-noname'         => '"$1" номи корбарии номӯътабар аст.',
	'crosswikiblock-nouser'         => 'Корбар "$3" ёфт нашуд.',
	'crosswikiblock-noreason'       => 'Сабабе мушаххас нашудааст.',
	'crosswikiblock-alreadyblocked' => 'Корбар $3 аллакай баста шудааст.',
	'crosswikiblock-noblock'        => 'Ин корбар баста нашудааст.',
	'crosswikiblock-success'        => "Корбар '''$3''' бо муваффақият баста шуд.

Баргардед ба:
* [[Special:CrosswikiBlock|Форми бастан]]
* [[$4]]",
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'crosswikiblock-reason'         => 'Lý do:',
	'crosswikiblock-submit'         => 'Cấm',
	'crosswikiblock-anononly'       => 'Chỉ cấm thành viên vô danh',
	'crosswikiblock-autoblock'      => 'Tự động cấm các địa chỉ IP mà thành viên này sử dụng',
	'crosswikiunblock-reason'       => 'Lý do:',
	'crosswikiblock-alreadyblocked' => '“$3” đã bị cấm rồi.',
);

