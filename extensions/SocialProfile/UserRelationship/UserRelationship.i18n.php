<?php
/**
 * Internationalisation file for UserRelantionShip extension pages.
 *
 * @addtogroup Extensions
 */

$messages = array();

$messages['en'] = array(
		'viewrelationships' => 'View Relationship',
		'viewrelationshiprequests' => 'View Relationship Requests',
		'ur-error-title'=>'Woops, you took a wrong turn!',
		'ur-error-message-no-user'=>'We cannot complete your request, because no user with this name exists.',
		'ur-main-page'=>'Main Page',
		'ur-your-profile'=>'Your Profile',
		'ur-backlink'=>'&lt; Back to $1\'s Profile',
		'ur-friend'=>'friend',
		'ur-foe'=>'foe',
		'ur-relationship-count'=>'$1 has $2 {{PLURAL:$2|$3|$3s}}.',
		'ur-add-friends'=>' Want more friends? <a href="$1">Invite Them</a>',
		'ur-add-friend'=>'Add as Friend',
		'ur-add-foe'=>'Add as Foe',
		'ur-remove-relationship'=>'Remove as $1',
		'ur-give-gift'=>'Give a Gift',
		'ur-previous'=>'prev',
		'ur-next'=>'next',
		'ur-remove-relationship-title'=>'Do you want to remove $1 as your $2?',
		'ur-remove-relationship-title-confirm'=>'You have removed $1 as your $2',
		'ur-remove-relationship-message'=>'You have requested to remove $1 as your $2, press "$3" to confirm.',
		'ur-remove-relationship-message-confirm'=>'You have successfully removed $1 as your $2.',
		'ur-remove-error-message-no-relationship'=>'You do not have a relationship with $1.',
		'ur-remove-error-message-remove-yourself'=>'You cannot remove yourself.',
		'ur-remove-error-message-pending-request'=>'You have a pending $1 request with $2.',
		'ur-remove-error-not-loggedin'=>'You have to be logged in to remove a $1.',
		'ur-remove'=>'Remove',
		'ur-cancel'=>'Cancel',
		'ur-login'=>"Login",
		'ur-add-title'=>'Do you want to add $1 as your $2?',
		'ur-add-message'=>'You are about to add $1 as your $2.  We will notify $1 to confirm your $3.',
		'ur-friendship'=>'friendship',
		'ur-grudge'=>'grudge',
		'ur-add-button'=>"Add as $1",
		'ur-add-sent-title'=>'We have sent your $1 request to $2!',
		'ur-add-sent-message'=>'Your $1 request has been sent to $2 for confirmation.  If $2 confirms your request, you will receive a follow-up e-mail',
		'ur-add-error-message-no-user'=>'The user you are trying to add does not exist.',
		'ur-add-error-message-blocked'=>'You are currently blocked and cannot add friends or foes.',
		'ur-add-error-message-yourself'=>'You cannot add yourself as a friend or foe.',
		'ur-add-error-message-existing-relationship'=>'You are already $1 with $2.',
		'ur-add-error-message-pending-request-title'=>'Patience!',
		'ur-add-error-message-pending-request'=>'You have a pending $1 request with $2.  We will notify you when $2 confirms your request.',
		'ur-add-error-message-not-loggedin'=>'You must be logged in to add a $1',
		'ur-requests-title'=>'Relationship Requests',
		'ur-requests-message'=>'<a href="$1">$2</a> wants to be your $3.',
		'ur-accept'=>'Accept',
		'ur-reject'=>'Reject',
		'ur-no-requests-message'=>'You have no friend or foe requests.  If you want more friends, <a href="$1">invite them!</a>',
		'ur-requests-added-message'=>'You have added $1 as your $2.',
		'ur-requests-reject-message'=>'You have rejected $1 as your $2.',
		'friend_request_subject' => '$1 has added you as a friend on {{SITENAME}}!',
		'friend_request_body' => 'Hi $1:

$2 has added you as a friend on {{SITENAME}}.  We want to make sure that you two are actually friends.

Please click this link to confirm your friendship:
$3

Thanks

---

Hey, want to stop getting emails from us?

Click $4
and change your settings to disable email notifications.',
		'foe_request_subject' => 'It\'s war! $1 has added you to as a foe on {{SITENAME}}!',
		'foe_request_body' => 'Hi $1:

$2 just listed you as a foe on {{SITENAME}}.  We want to make sure that you two are actually mortal enemies  or at least having an argument.

Please click this link to confirm the grudge match.

$3

Thanks

---

Hey, want to stop getting emails from us?

Click $4
and change your settings to disable email notifications.',

		'friend_accept_subject' => '$1 has accepted your friend request on {{SITENAME}}!',
		'friend_accept_body' => 'Hi $1:

$2 has accepted your friend request on {{SITENAME}}!

Check out $2\'s page at $3

Thanks,

---

Hey, want to stop getting emails from us?

Click $4
and change your settings to disable email notifications.',
		'foe_accept_subject' => 'It\'s on! $1 has accepted your foe request on {{SITENAME}}!',
		'foe_accept_body' => 'Hi $1:

$2 has accepted your foe request on {{SITENAME}}!

Check out $2\'s page at $3

Thanks

---

Hey, want to stop getting emails from us?

Click $4
and change your settings to disable email notifications.',
		'friend_removed_subject' => 'Oh No! $1 has removed you as a friend on {{SITENAME}}!',
		'friend_removed_body' => 'Hi $1:

$2 has removed you as a friend on {{SITENAME}}!

Thanks

---

Hey, want to stop getting emails from us?

Click $4
and change your settings to disable email notifications.',
		'foe_removed_subject' => 'Woohoo! $1 has removed you as a foe on {{SITENAME}}!',
		'foe_removed_body' => 'Hi $1:

		$2 has removed you as a foe on {{SITENAME}}!

Perhaps you two are on your way to becoming friends?

Thanks

---

Hey, want to stop getting emails from us?

Click $4
and change your settings to disable email notifications.',
);

/** Arabic (العربية)
 * @author Alnokta
 */
$messages['ar'] = array(
	'viewrelationships'                          => 'اعرض العلاقة',
	'viewrelationshiprequests'                   => 'اعرض طلبات العلاقات',
	'ur-main-page'                               => 'الصفحة الرئيسية',
	'ur-your-profile'                            => 'ملفك',
	'ur-friend'                                  => 'صديق',
	'ur-foe'                                     => 'عدو',
	'ur-add-friend'                              => 'أضف كصديق',
	'ur-add-foe'                                 => 'أضف كعدو',
	'ur-remove-relationship'                     => 'أزل ك&#x200d; $1',
	'ur-give-gift'                               => 'اعطي هدية',
	'ur-previous'                                => 'قبل',
	'ur-next'                                    => 'بعد',
	'ur-remove-error-message-remove-yourself'    => 'لا يمكن أن تزيل نفسك.',
	'ur-remove'                                  => 'أزل',
	'ur-cancel'                                  => 'الغ',
	'ur-login'                                   => 'لج',
	'ur-friendship'                              => 'صداقة',
	'ur-add-button'                              => 'أضف ك&#x200d; $1',
	'ur-add-error-message-no-user'               => 'المستخدم الذي تحاول أن تضيفه غير موجود.',
	'ur-add-error-message-pending-request-title' => 'الصبر جميل!',
	'ur-requests-title'                          => 'طلبات العلاقات',
	'ur-accept'                                  => 'اقبل',
	'ur-reject'                                  => 'ارفض',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'ur-error-message-no-user'                   => 'Заявката не може да бъде изпълнена, тъй като не съществува потребител с това име.',
	'ur-main-page'                               => 'Начална страница',
	'ur-your-profile'                            => 'Моят профил',
	'ur-backlink'                                => '&lt; Обратно към профила на $1',
	'ur-friend'                                  => 'приятел',
	'ur-foe'                                     => 'неприятел',
	'ur-relationship-count'                      => '$1 има $2 {{PLURAL:$2|$3|$3и}}.',
	'ur-add-friends'                             => '  Искате повече приятели? <a href="$1">Поканете ги!</a>',
	'ur-add-friend'                              => 'Добавяне в приятели',
	'ur-add-foe'                                 => 'Добавяне в неприятели',
	'ur-remove-relationship'                     => 'Премахване от $1и',
	'ur-give-gift'                               => 'Подаряване на подарък',
	'ur-previous'                                => 'предишни',
	'ur-next'                                    => 'следващи',
	'ur-remove-relationship-title'               => 'Необходимо е потвърждение за премахване на $1 от групата на $2ите.',
	'ur-remove-relationship-title-confirm'       => 'Премахнахте $1 от групата на вашите $2и',
	'ur-remove'                                  => 'Премахване',
	'ur-cancel'                                  => 'Отказване',
	'ur-login'                                   => 'Влизане',
	'ur-add-title'                               => 'Необходимо е потвърждение за добавяне на $1 като ваш $2.',
	'ur-add-button'                              => 'Добавяне като $1',
	'ur-add-error-message-no-user'               => 'Потребителят, който се опитвате да добавите, не съществува.',
	'ur-add-error-message-existing-relationship' => 'Вече сте $1 с $2.',
	'ur-accept'                                  => 'Приемане',
	'ur-reject'                                  => 'Отказване',
	'ur-requests-reject-message'                 => 'Отказахте на $1 да бъде ваш $2.',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'ur-main-page'  => 'Ĉefpaĝo',
	'ur-foe'        => 'malamiko',
	'ur-add-friend' => 'Amiko',
);

/** French (Français)
 * @author Grondin
 */
$messages['fr'] = array(
	'viewrelationships'                          => 'Voir les relations',
	'viewrelationshiprequests'                   => 'Voir les requêtes des relations',
	'ur-error-title'                             => 'Houla, vous avez pris un mauvais virage !',
	'ur-error-message-no-user'                   => 'Nous ne pouvons compléter votre requête, car aucun utilisateur ne porte ce nom.',
	'ur-main-page'                               => 'Accueil',
	'ur-your-profile'                            => 'Votre profile',
	'ur-backlink'                                => '&lt; retour vers le profil de $1',
	'ur-friend'                                  => 'ami',
	'ur-foe'                                     => 'ennemi',
	'ur-relationship-count'                      => '$1 a $2 {{PLURAL:$2|$3|$3s}}.',
	'ur-add-friends'                             => 'Vouloir plus d’amis ? <a href="$1">Inviter les</a>.',
	'ur-add-friend'                              => 'Ajouter comme ami',
	'ur-add-foe'                                 => 'Ajouter comme ennemi',
	'ur-remove-relationship'                     => 'Enlever comme $1',
	'ur-give-gift'                               => 'Envoyer un cadeau',
	'ur-previous'                                => 'préc.',
	'ur-next'                                    => 'suiv.',
	'ur-remove-relationship-title'               => 'Voulez-vous enlever $1 comme votre $2 ?',
	'ur-remove-relationship-title-confirm'       => 'Vous avez enlevez $1 comme votre $2',
	'ur-remove-relationship-message'             => 'Vous avez demandé la suppression de $1 comme votre $2, appuyer sur « $3 » pour confirmer.',
	'ur-remove-relationship-message-confirm'     => 'Vous avez supprimé avec succès $1 comme votre $2.',
	'ur-remove-error-message-no-relationship'    => "Vous n'avez aucune relation avec $1.",
	'ur-remove-error-message-remove-yourself'    => 'Vous ne pouvez pas vous supprimer vous-même.',
	'ur-remove-error-message-pending-request'    => 'Vous avez une requête de $1 en cours avec $2.',
	'ur-remove-error-not-loggedin'               => 'Vous devez être en session pour supprimer un $1.',
	'ur-remove'                                  => 'Enlever',
	'ur-cancel'                                  => 'Annuler',
	'ur-login'                                   => 'Connexion',
	'ur-add-title'                               => 'Voulez-vous ajouter $1 comme votre $2 ?',
	'ur-add-message'                             => 'Vous avez l’intention d’ajouter $1 comme votre $2. Nous le notifierons à $1 pour confirmer votre $3.',
	'ur-friendship'                              => 'amitié',
	'ur-grudge'                                  => 'rancœur',
	'ur-add-button'                              => 'Ajouter comme $1',
	'ur-add-sent-title'                          => 'Vous avez envoyé votre requête en $1 à $2 !',
	'ur-add-sent-message'                        => 'Votre requête en $1 a été à $2 aux fins de confirmation. Si $2 confirme votre demande, vous recevrez un courriel en retour.',
	'ur-add-error-message-no-user'               => 'L’utilisateur que vous être en train d’ajouter n’existe pas.',
	'ur-add-error-message-blocked'               => 'Vous êtes actuellement bloqué et vous ne pouvez donc ajouter ni amis ni ennemis.',
	'ur-add-error-message-yourself'              => 'Vous ne pouvez vous-même vous ajouter comme ennemi ou ami.',
	'ur-add-error-message-existing-relationship' => 'Vous êtes déjà $1 avec $2.',
	'ur-add-error-message-pending-request-title' => 'Patience !',
	'ur-add-error-message-pending-request'       => 'Vous avez une requête en $1 pendante avec $2. Nous vous notifierons quand $2 aura confirmé votre demande.',
	'ur-add-error-message-not-loggedin'          => 'Vous devez être connecté pour ajouter un $1.',
	'ur-requests-title'                          => 'Demandes de relations.',
	'ur-requests-message'                        => '<a href="$1">$2</a> désire être votre $3.',
	'ur-accept'                                  => 'Accepter',
	'ur-reject'                                  => 'Rejeter',
	'ur-no-requests-message'                     => 'Vous n’avez aucune requête en ami ou ennemi. Si vous désirez plus d\'amis, <a href="$1">invitez les !</a>',
	'ur-requests-added-message'                  => 'Vous avez ajouté $1 comme votre $2.',
	'ur-requests-reject-message'                 => 'Vous avez rejeté $1 comme votre $2.',
	'friend_request_subject'                     => '$1 vous a ajouté comme un ami sur {{SITENAME}} !',
	'friend_request_body'                        => 'Salut $1 :

$2 vous a ajouté comme un ami sur {{SITENAME}}. Nous voulons nous assurer que vous êtes tous deux actuellement amis.

Veuillez cliquer sur ce lien pour confirmer votre amitié :
$3

Merci.

---

Hé ! Voulez-vous vous arrêter de recevoir des courriels de notre part ?

Cliquez $4
et modifiez vos préférences pour désactiver les notifications par courriel.',
	'foe_request_subject'                        => "C'est la guerre ! $1 vous a ajouté comme ennemi sur {{SITENAME}} !",
	'foe_request_body'                           => 'Salut $1 :

$2 vient juste de vous répertorier comme un ennemi sur {{SITENAME}}. Nous voulons nous assurer que vous êtes vraiement des emmenis mortel ou avoir au moins des griefs l’un envers l’autre/

Veuillez cliquer sur ce lien, pour accepter, à contrecœur, cet état de fait.

$3

Merci

---

Hé ! Voulez-vous vous arrêter de recevoir des courriels de notre part ?

Cliquez $4 et modifiez vos préférences pour désactiver les notifications par courriel.',
	'friend_accept_subject'                      => '$1 a accepté votre requête en amitié sur {{SITENAME}} !',
	'friend_accept_body'                         => 'Salut $1 : 

$2 a accepté votre requête en amitié sur {{SITENAME}} !

Allez sur la page de $2 sur $3

Merci.

---

Hé ! Voulez-vous vous arrêter de recevoir des courriels de notre part ?

Cliquez $4
et modifiez vos préférences pour désactiver les notifications par courriel.',
	'foe_accept_subject'                         => "C'est fait ! $1 a accepté votre déclaration de guerre sur  {{SITENAME}} !",
	'foe_accept_body'                            => 'Salut $1 : 

$2 a accepté votre déclaration de guerre sur  {{SITENAME}} !

Visitez la page de $2 sur $3.

Merci

---

Hé ! Voulez-vous vous arrêter de recevoir des courriels de notre part ?

Cliquez $4 et modifiez vos préférences pour désactiver les notifications par courriel.',
	'friend_removed_subject'                     => 'Saperlipopette ! $1 vous a retiré de la liste de ses amis sur {{SITENAME}} !',
	'friend_removed_body'                        => 'Salut $1 :

$2 vous a retiré de la liste de ses amis sur {{SITENAME}} !

Merci

---

Hé ! Voulez-vous vous arrêter de recevoir des courriels de notre part ?

Cliquez $4 et modifiez vos préférences pour désactiver les notifications par courriel.',
	'foe_removed_subject'                        => 'Par Jupiter ! $1 vous a retiré de la liste de ses ennemis {{SITENAME}} !',
	'foe_removed_body'                           => 'Salut $1 :

$2 vous a retiré de la liste de ses ennemis sur {{SITENAME}} !

Ne seriez-vous pas, peut-être, sur le chemin pour devenir amis ?

Merci

---

Hé ! Voulez-vous vous arrêter de recevoir des courriels de notre part ?

Cliquez $4
et modifiez vos préférences pour désactiver les notifications par courriel.',
);

/** German (Deutsch)
 * @author Tim 'Avatar' Bartel
 */
$messages['de'] = array(
		'viewrelationships' => 'Zeige Beziehungen',
		'viewrelationshiprequests' => 'Zeige Beziehungsanfragen',
		'ur-error-title'=>'Uuups, hier gehts nicht weiter!',
		'ur-error-message-no-user'=>'Wir können die Anfrage nicht ausführen, da kein Benutzer dieses Namens existiert.',
		'ur-main-page'=>'Hauptseite',
		'ur-your-profile'=>'Dein Profil',
		'ur-backlink'=>'&lt; Zurück zu $1s Profil',
		'ur-friend'=>'Freund',
		'ur-foe'=>'Feind',
		'ur-relationship-count'=>'$1 hat $2 {{PLURAL:$2|$3|$3e}}.',
		'ur-add-friends'=>' Du möchtest mehr Freunde haben? <a href="$1">Lad\' sie ein...</a>',
		'ur-add-friend'=>'Als Freund hinzufügen',
		'ur-add-foe'=>'Als Feind hinzufügen',
		'ur-remove-relationship'=>'$1 entfernen',
		'ur-give-gift'=>'Geschenk senden',
		'ur-previous'=>'vorherige',
		'ur-next'=>'nächste',
		'ur-remove-relationship-title'=>'Möchtest du $1 als deinen $2 entfernen?',
		'ur-remove-relationship-title-confirm'=>'Du hast $1 als deinen $2 entfernt',
		'ur-remove-relationship-message'=>'Du möchtest $1 als deinen $2 entfernen, klicke "$3" zur Bestätigung.',
		'ur-remove-relationship-message-confirm'=>'Du hast $1 erfolgreich als deinen $2 entfernt.',
		'ur-remove-error-message-no-relationship'=>'$1 steht in keiner Beziehung zu dir.',
		'ur-remove-error-message-remove-yourself'=>'Du kannst dich nicht selbst enfernen.',
		'ur-remove-error-message-pending-request'=>'Du hast eine offene $1-Anfrage mit $2.',
		'ur-remove-error-not-loggedin'=>'Du musst angemeldet sein um einen $1 zu entfernen.',
		'ur-remove'=>'Entfernen',
		'ur-cancel'=>'Abbrechen',
		'ur-login'=>"Anmelden",
		'ur-add-title'=>'Möchtest du $1 als $2 hinzufügen?',
		'ur-add-message'=>'Du bist dabei $1 als $2 hinzuzufügen.  Wir informieren $1, damit er deine $3 bestätigen kann.',
		'ur-friendship'=>'Freundschaft',
		'ur-grudge'=>'Feindschaft',
		'ur-add-button'=>"Als $1 hinzufügen",
		'ur-add-sent-title'=>'Wir haben deine $1-Anfrage an $2 geschickt!',
		'ur-add-sent-message'=>'Deine $1-Anfrage wurde zur Bestätigung an $2 geschickt.  Wenn $2 deine Anfrage bestätigt, bekommst du eine E-Mail',
		'ur-add-error-message-no-user'=>'Der Benutzer, den du hinzufügen möchtest, existiert nicht.',
		'ur-add-error-message-blocked'=>'Du bist momentan gesperrt und kannst keine Freunde oder Feinde hinzufügen.',
		'ur-add-error-message-yourself'=>'Du kannst dich nicht selbst als Freund oder Feind hinzufügen.',
		'ur-add-error-message-existing-relationship'=>'Du bist bereits $1 mit $2.',
		'ur-add-error-message-pending-request-title'=>'Geduld!',
		'ur-add-error-message-pending-request'=>'Du hast eine offene $1-Anfrage mit $2.  Wir benachrichtigen dich, wenn $2 deine Anfrage bestätigt.',
		'ur-add-error-message-not-loggedin'=>'Du musst angemeldet sein um einen $1 hinzuzufügen',
		'ur-requests-title'=>'Beziehungsanfrage',
		'ur-requests-message'=>'<a href="$1">$2</a> will dein $3 sein.',
		'ur-accept'=>'Annehmen',
		'ur-reject'=>'Ablehnen',
		'ur-no-requests-message'=>'Du hast keine Freund- oder Feind-Anfrage.  Wenn du mehr Freunde haben möchtest, <a href="$1">Lad\' sie ein...</a>',
		'ur-requests-added-message'=>'Du hast $1 als deinen $2 hinzugefügt.',
		'ur-requests-reject-message'=>'Du hast $1 als deinen $2 abgelehnt.',
		'friend_request_subject' => '{{SITENAME}}: $1 hat dich als Freund hinzugefügt!',
		'friend_request_body' => 'Hi $1:

$2 hat dich in {{SITENAME}} als Freund hinzugefügt.  Wir wollen sicher gehen, dass ihr zwei wirklich Freunde seit.

Bitte klicke den folgenden Link um eure Freundschaft zu bestätigen:
$3

---

Hm, du willst keine E-Mails mehr von uns bekommen?

Klicke $4
und ändere deine Einstellungen um E-Mail-Benachrichtigungen auszuschalten.',
		'foe_request_subject' => '{{SITENAME}}: Kriegserklärung! $1 hat dich als Feind hinzugefügt!',
		'foe_request_body' => 'Hi $1:

$2 hat dich in {{SITENAME}} als Feind hinzugefügt.  Wir wollen sicher gehen, dsas ihr zwei wirklich tödliche Feinde seid  oder euch wenigstens ein wenig streitet.

Bitte klicke den folgenden Link um eure Feindschaft zu bestätigen:

$3

---

Hm, du willst keine E-Mails mehr von uns bekommen?

Klicke $4
und ändere deine Einstellungen um E-Mail-Benachrichtigungen auszuschalten.',

		'friend_accept_subject' => '{{SITENAME}}: $1 hat deine Freundschaftsanfrage bestätigt!',
		'friend_accept_body' => 'Hi $1:

$2 hat deine Freundschaftsanfrage in {{SITENAME}} bestätigt!

Siehe $2s Seite hier: $3

Danke

---

Hm, du willst keine E-Mails mehr von uns bekommen?

Klicke $4
und ändere deine Einstellungen um E-Mail-Benachrichtigungen auszuschalten.',
		'foe_accept_subject' => '{{SITENAME}}: $1 hat deine Feind-Anfrage bestätigt!',
		'foe_accept_body' => 'Hi $1:

$2 hat deine Feind-Anfrage in {{SITENAME}} bestätigt!

Siehe $2s Seite hier: $3

---

Hm, du willst keine E-Mails mehr von uns bekommen?

Klicke $4
und ändere deine Einstellungen um E-Mail-Benachrichtigungen auszuschalten.',
		'friend_removed_subject' => '{{SITENAME}}: Oh nein! $1 hat seine Freundschaft zu dir beendet!',
		'friend_removed_body' => 'Hi $1:

$2 hat seine Freundschaft zu dir in {{SITENAME}} beendet!

---

Hm, du willst keine E-Mails mehr von uns bekommen?

Klicke $4
und ändere deine Einstellungen um E-Mail-Benachrichtigungen auszuschalten.',
		'foe_removed_subject' => '{{SITENAME}}: Hey! $1 hat seine Feindschaft zu dir beendet!',
		'foe_removed_body' => 'Hi $1:

$2 hat seine Feindschaft zu dir in {{SITENAME}} beendet!

Vielleicht werdet ihr beide ja sogar mal Freunde?

---

Hm, du willst keine E-Mails mehr von uns bekommen?

Klicke $4
und ändere deine Einstellungen um E-Mail-Benachrichtigungen auszuschalten.',
);


/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author Lovekhmer
 */
$messages['km'] = array(
	'ur-main-page'                               => 'ទំព័រដើម',
	'ur-your-profile'                            => 'ពត៌មានផ្ទាល់ខ្លួនរបស់អ្នក',
	'ur-backlink'                                => '&lt; ត្រលប់​ទៅ ពត៌មានផ្ទាល់ខ្លួន របស់ $1',
	'ur-friend'                                  => 'មិត្តភក្តិ',
	'ur-foe'                                     => 'បច្ចាមិត្ត',
	'ur-add-friend'                              => 'បន្ថែម ជា មិត្តភក្តិ',
	'ur-add-foe'                                 => 'បន្ថែម ជា បច្ចាមិត្ត',
	'ur-give-gift'                               => 'ជូនអំណោយ',
	'ur-previous'                                => 'មុន',
	'ur-next'                                    => 'បន្ទាប់',
	'ur-remove-error-not-loggedin'               => 'អ្នកត្រូវតែ ពិនិត្យចូល ដើម្បី ដកចេញ $1 ។',
	'ur-remove'                                  => 'ដកចេញ',
	'ur-cancel'                                  => 'បោះបង់',
	'ur-login'                                   => 'ចូល',
	'ur-friendship'                              => 'មិត្តភាព',
	'ur-add-button'                              => 'បន្ថែម ជា $1',
	'ur-add-error-message-pending-request-title' => 'ខន្តី អត់ធ្មត់ !',
	'ur-add-error-message-not-loggedin'          => 'អ្នកត្រូវតែ បានពិនិត្យចូល ដើម្បី បន្ថែម $1',
	'ur-accept'                                  => 'ព្រមទទួល',
	'ur-reject'                                  => 'ទាត់ចោល',
	'friend_request_subject'                     => '$1 បានបន្ថែមអ្នក ជា មិត្តភក្តិ លើ {{SITENAME}}!',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'ur-main-page'                               => 'Haaptsäit',
	'ur-friend'                                  => 'Frënd',
	'ur-foe'                                     => 'Géigner',
	'ur-previous'                                => 'vireg',
	'ur-next'                                    => 'nächst',
	'ur-remove'                                  => 'Ewechhuelen',
	'ur-cancel'                                  => 'Annulléieren',
	'ur-add-error-message-pending-request-title' => 'Gedold!',
);

/** Marathi (मराठी)
 * @author Mahitgar
 */
$messages['mr'] = array(
	'ur-foe'        => 'शत्रू',
	'ur-previous'   => 'मागचा',
	'ur-next'       => 'पुढचा',
	'ur-login'      => 'प्रवेश',
	'ur-friendship' => 'मैत्री',
	'ur-accept'     => 'स्विकारा',
	'ur-reject'     => 'अव्हेर',
);

/** Dutch (Nederlands)
 * @author Siebrand
 * @author SPQRobin
 */
$messages['nl'] = array(
	'viewrelationships'                          => 'Connecties bekijken',
	'viewrelationshiprequests'                   => 'Connectieverzoeken bekijken',
	'ur-error-title'                             => 'U hebt een verkeerde afslag genomen.',
	'ur-error-message-no-user'                   => 'We kunnen uw verzoek niet afhandelen omdat de gebruiker niet bestaat.',
	'ur-main-page'                               => 'Hoofdpagina',
	'ur-your-profile'                            => 'Uw profiel',
	'ur-backlink'                                => "&lt; Terug naar $1's profiel",
	'ur-friend'                                  => 'vriend',
	'ur-foe'                                     => 'tegenstander',
	'ur-relationship-count'                      => '$1 heeft $2 {{PLURAL:$2|$3|$3s}}.',
	'ur-add-friends'                             => 'Wilt u meer vrienden? <a href="$1">Nodig ze uit</a>',
	'ur-add-friend'                              => 'Als vriend toevoegen',
	'ur-add-foe'                                 => 'Als tegenstander toevoegen',
	'ur-remove-relationship'                     => 'Als $1 verwijderen',
	'ur-give-gift'                               => 'Presentje geven',
	'ur-previous'                                => 'vorige',
	'ur-next'                                    => 'volgende',
	'ur-remove-relationship-title'               => 'Wilt u $1 verwijderen als uw $2?',
	'ur-remove-relationship-title-confirm'       => 'U hebt $1 als $2 verwijderd',
	'ur-remove-relationship-message'             => 'U wilt $1 verwijderen als $2. Klik "$3" om te bevestigen.',
	'ur-remove-relationship-message-confirm'     => 'U hebt $1 als $2 verwijderd.',
	'ur-remove-error-message-no-relationship'    => 'U hebt geen connectie met $1.',
	'ur-remove-error-message-remove-yourself'    => 'U kunt uzelf niet verwijderen.',
	'ur-remove-error-message-pending-request'    => 'U hebt een openstaand connectieverzoek als $1 bij $2.',
	'ur-remove-error-not-loggedin'               => 'U moet aangemeld zijn om een $1 te kunnen verwijderen.',
	'ur-remove'                                  => 'Verwijderen',
	'ur-cancel'                                  => 'Annuleren',
	'ur-login'                                   => 'Aanmelden',
	'ur-add-title'                               => 'Wilt u $1 toevoegen als $2?',
	'ur-add-message'                             => 'U staat op het punt om $1 toe te voegen als $2. We stellen $1 op de hoogte om uw $3 te kunnen bevestigen.',
	'ur-friendship'                              => 'vriendschap',
	'ur-grudge'                                  => 'wrok',
	'ur-add-button'                              => 'Als $1 toevoegen',
	'ur-add-sent-title'                          => 'Uw verzoek voor een connectie als $1 is naar $2 verzonden.',
	'ur-add-sent-message'                        => 'Uw verzoek voor een connectie als $1 is naar $2 verzonden voor bevestiging. Als $2 uw verzoek bevestigd, ontvangt u daar een e-mail over',
	'ur-add-error-message-no-user'               => 'De gebruiker die u probeert toe te voegen bestaat niet.',
	'ur-add-error-message-blocked'               => 'U bent geblokkeerd en kunt geen vrienden of tegenstanders toevoegen.',
	'ur-add-error-message-yourself'              => 'U kunt uzelf niet als vriend of tegenstander toevoegen.',
	'ur-add-error-message-existing-relationship' => 'U bent al $1 bij $2.',
	'ur-add-error-message-pending-request-title' => 'Even geduld alstublieft.',
	'ur-add-error-message-pending-request'       => 'U hebt een openstaand verzoek voor $1 bij $2. We stellen u op de hoogte als $2 uw verzoek bevestigd.',
	'ur-add-error-message-not-loggedin'          => 'U moet aangemeld zijn om een $1 toe te voegen',
	'ur-requests-title'                          => 'Connectieverzoeken',
	'ur-requests-message'                        => '<a href="$1">$2</a> wil uw $3 zijn.',
	'ur-accept'                                  => 'Aanvaarden',
	'ur-reject'                                  => 'Weigeren',
	'ur-no-requests-message'                     => 'U hebt geen uitstaande verzoeken voor vrienden of tegenstanders. Als u meer vrienden wilt, <a href="$1">nodig ze dan uit!</a>',
	'ur-requests-added-message'                  => 'U hebt $1 toegevoegd als $2.',
	'ur-requests-reject-message'                 => 'U hebt $1 geweigerd als $2.',
	'friend_request_subject'                     => '$1 heeft u als vriend toegevoegd op {{SITENAME}}.',
	'friend_request_body'                        => 'Hallo $1.

$2 heeft u als vriend toegevoegd op {{SITENAME}}. We willen graag bevestiging dat u echt bevriend bent.

Klik op de onderstaande link om uw vriendschap te bevestigen:
$3

Bedankt.
---

Wilt u niet langer e-mails van ons ontvangen?

Klik $4
en wijzig uw instellingen om e-mailberichten uit te schakelen.',
	'foe_request_subject'                        => '$1 heeft u toegevoegd als tegenstander op {{SITENAME}}!',
	'foe_request_body'                           => 'Hallo $1.

$2 heeft u als tegenstander toegevoegd op {{SITENAME}}. We willen graag bevestiging dat u echt tegenstanders bent of in ieder geval gebrouilleerd bent.

Klik op de onderstaande link om uw animositeit te bevestigen:
$3

Bedankt.
---

Wilt u niet langer e-mails van ons ontvangen?

Klik $4
en wijzig uw instellingen om e-mailberichten uit te schakelen.',
	'friend_accept_subject'                      => '$1 heeft uw verzoek om vrienden te worden op {{SITENAME}} aanvaard.',
	'friend_accept_body'                         => "Hallo $1.

$2 heeft u als vriend geaccepteerd op {{SITENAME}}.

U kunt $2's pagina bekijken op $3

Bedankt.
---

Wilt u niet langer e-mails van ons ontvangen?

Klik $4
en wijzig uw instellingen om e-mailberichten uit te schakelen.",
	'foe_accept_subject'                         => '$1 heeft u als tegenstander aanvaard op {{SITENAME}}.',
	'foe_accept_body'                            => "Hallo $1.

$2 heeft u als tegenstander bevestigd op {{SITENAME}}.

U kunt $2's pagina bekijken op $3

Bedankt.
---

Wilt u niet langer e-mails van ons ontvangen?

Klik $4
en wijzig uw instellingen om e-mailberichten uit te schakelen.",
	'friend_removed_subject'                     => '$1 heeft u helaas verwijderd als vriend op {{SITENAME}}!',
	'friend_removed_body'                        => 'Hallo $1.

$2 heeft u als vriend verwijderd op {{SITENAME}}.

Bedankt.
---

Wilt u niet langer e-mails van ons ontvangen?

Klik $4
en wijzig uw instellingen om e-mailberichten uit te schakelen.',
	'foe_removed_subject'                        => '$1 heeft u verwijderd als tegenstander op {{SITENAME}}!',
	'foe_removed_body'                           => 'Hallo $1.

$2 heeft u als tegenstander verwijderd op {{SITENAME}}.

Wellicht bent u op weg om vrienden te worden?

Bedankt.
---

Wilt u niet langer e-mails van ons ontvangen?

Klik $4
en wijzig uw instellingen om e-mailberichten uit te schakelen.',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'viewrelationships'                          => 'Vis forbindelse',
	'viewrelationshiprequests'                   => 'Vis forespørsler om forbindelse',
	'ur-error-title'                             => 'Ops, du svingte feil.',
	'ur-error-message-no-user'                   => 'Vi kan ikke fullføre forespørselen din fordi det ikke finnes noen brukere ved dette navnet.',
	'ur-main-page'                               => 'Hovedside',
	'ur-your-profile'                            => 'Profilen din',
	'ur-backlink'                                => '&lt; Tilbake til profilen til $1',
	'ur-friend'                                  => 'venn',
	'ur-foe'                                     => 'fiende',
	'ur-relationship-count'                      => '$1 er $3 med $2 andre brukere.',
	'ur-add-friends'                             => 'Vil du ha flere venner? <a href="$1">Inviter dem</a>',
	'ur-add-friend'                              => 'Legg til som venn',
	'ur-add-foe'                                 => 'Legg til som fiende',
	'ur-remove-relationship'                     => 'Fjern som $1',
	'ur-give-gift'                               => 'Gi gave',
	'ur-previous'                                => 'forrige',
	'ur-next'                                    => 'neste',
	'ur-remove-relationship-title'               => 'Vil du fjerne $1 som $2?',
	'ur-remove-relationship-title-confirm'       => 'Du har fjernet $1 som $2',
	'ur-remove-relationship-message'             => 'Du har spurt om å fjerne $1 som $2, trykk «$3» for å bekrefte.',
	'ur-remove-relationship-message-confirm'     => 'Du har fjernet $1 som $2.',
	'ur-remove-error-message-no-relationship'    => 'Du har ingen forbindelse med $1.',
	'ur-remove-error-message-remove-yourself'    => 'Du kan ikke fjerne deg selv.',
	'ur-remove-error-message-pending-request'    => 'Du har en ventende forespørsel om å bli $1 med $2 hos $2.',
	'ur-remove-error-not-loggedin'               => 'Du må logge inn for å fjerne en $1.',
	'ur-remove'                                  => 'Fjern',
	'ur-cancel'                                  => 'Avbryt',
	'ur-login'                                   => 'Logg inn',
	'ur-add-title'                               => 'Vil du legge til $1 som $2?',
	'ur-add-message'                             => 'Du er i ferd med å legge til $1 som $2. Vi vil gi beskjed til $1 slik at vedkommende kan bekrefte deres $3.',
	'ur-friendship'                              => 'vennskap',
	'ur-grudge'                                  => 'fiendeskap',
	'ur-add-button'                              => 'Legg til som $1',
	'ur-add-sent-title'                          => 'Vi har sendt forespørselen din om å bli $1 med $2 til vedkommende.',
	'ur-add-sent-message'                        => 'Forespørselen din om å bli $1 med $2 har blitt sendt til vedkommende for godkjenning. Hvis $2 godkjenner forespørselen vil du få beskjed om det.',
	'ur-add-error-message-no-user'               => 'Brukeren du prøvde å legge til finnes ikke.',
	'ur-add-error-message-blocked'               => 'Du er blokkert, og kan ikke legge til venner eller fiender.',
	'ur-add-error-message-yourself'              => 'Du kan ikke legge til deg selv som venn eller fiende.',
	'ur-add-error-message-existing-relationship' => 'Du er allerede $1 med $2.',
	'ur-add-error-message-pending-request-title' => 'Tålmodighet ...',
	'ur-add-error-message-pending-request'       => 'Du har en ventende forespørsel om å bli $1 med $2. Du vil få beskjed når $2 godkjenner forespørselen.',
	'ur-add-error-message-not-loggedin'          => 'Du må være logget inn for å legge til en $1',
	'ur-requests-title'                          => 'Forbindelsesforespørsler',
	'ur-requests-message'                        => '<a href="$1">$2</a> ønsker å bli $3 med deg.',
	'ur-accept'                                  => 'Godta',
	'ur-reject'                                  => 'Avvis',
	'ur-no-requests-message'                     => 'Du har ingen venne- eller fiendeforespørsler. Om du vil ha flere venner, <a href="$1">inviter dem</a>!',
	'ur-requests-added-message'                  => 'Du har lagt til $1 som $2.',
	'ur-requests-reject-message'                 => 'Du har avvis forespørselen fra $1 om å bli $2 med deg.',
	'friend_request_subject'                     => '$1 har lagt deg til som venn på {{SITENAME}}!',
	'friend_request_body'                        => 'Hei, $1.

$2 har lagt deg til som venn på {{SITENAME}}. Vi vil være sikre på at dere faktisk er venner.

Følg denne lenken for å bekrefte vennskapet deres:
$3

Takk

---

Vil du ikke motta flere e-poster fra oss?

Klikk $4 og endre innstillingene dine for å slå av e-postbeskjeder.',
	'foe_request_subject'                        => 'Det er krig! $1 har lagt deg til som fiende på {{SITENAME}}!',
	'foe_request_body'                           => 'Hei, $1.

$2 har lagt deg til som fiende på {{SITENAME}}. Vi vil forsikre oss om at dere faktisk er svorne fiender &ndash; eller i hvert fall krangler.

Følg lenken nedenunder for å bekrefte fiendeskapet.

$3

Takk

---

Vil du ikke motta flere e-poster fra oss?',
	'friend_accept_subject'                      => '$1 har godtatt din venneforespørsel på {{SITENAME}}.',
	'friend_accept_body'                         => 'Hei, $1.

$2 har godtatt din venneforespørsel på {{SITENAME}}.

Sjekk ut siden til $2 på $3.

Takk.

---

Vil du ikke motta flere e-poster fra oss??

Klikk $4 og endre innstillingene dine for å slå av e-postbeskjeder.',
	'foe_accept_subject'                         => '$1 har godtatt din fiendeforespørsel på {{SITENAME}}.',
	'foe_accept_body'                            => 'Hei, $1.

$2 har godtatt din fiendeforespørsel på {{SITENAME}}.

Sjekk ut siden til $2 på $3

Takk

---

Vil du ikke motta flere e-poster fra oss?

Klikk $4 og endre innstillingene dine for å slå av e-postmeldinger.',
	'friend_removed_subject'                     => 'Å nei! $1 har fjernet deg som venn på {{SITENAME}}.',
	'friend_removed_body'                        => 'Hei, $1

$2 har fjernet deg som venn på {{SITENAME}}.

---

Vil du ikke motta flere e-poster fra oss?

Klikk $4 og endre innstillingene dine for å slå av e-postbeskjeder.',
	'foe_removed_subject'                        => 'Jippi! $1 har fjernet deg som fiende på {{SITENAME}}.',
	'foe_removed_body'                           => 'Hei, $1.

$2 har fjernet deg som fiende på {{SITENAME}}.

Kanskje dere er på vei til å bli venner?

---

Vil du ikke motta flere e-poster fra oss?

Klikk $4 og endre innstillingene dine for å slå av e-postbeskjeder.',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'viewrelationships'                          => 'Veire las relacions',
	'viewrelationshiprequests'                   => 'Veire las requèstas de las relacions',
	'ur-error-title'                             => 'Op, avètz pres un marrida virada !',
	'ur-error-message-no-user'                   => "Podèm pas completar vòstre requèsta, perque cap d'utilizaire pòrta pas aqueste nom.",
	'ur-main-page'                               => 'Acuèlh',
	'ur-your-profile'                            => 'Vòstre perfil',
	'ur-backlink'                                => '&lt; retorn cap al perfil de $1',
	'ur-friend'                                  => 'amic',
	'ur-foe'                                     => 'enemic',
	'ur-relationship-count'                      => '$1 a $2 {{PLURAL:$2|$3|$3s}}.',
	'ur-add-friends'                             => 'Volètz mai d’amics ? <a href="$1">Invitatz-los !</a>.',
	'ur-add-friend'                              => 'Ajustar coma amic',
	'ur-add-foe'                                 => 'Ajustar coma enemic',
	'ur-remove-relationship'                     => 'Levar coma $1',
	'ur-give-gift'                               => 'Mandar un present',
	'ur-previous'                                => 'precedent',
	'ur-next'                                    => 'seguent',
	'ur-remove-relationship-title'               => 'Volètz levar $1 coma vòstre $2 ?',
	'ur-remove-relationship-title-confirm'       => 'Avètz levat $1 coma vòstre $2',
	'ur-remove-relationship-message'             => 'Avètz demandat la supression de $1 coma vòstre $2, picatz sus « $3 » per confirmar.',
	'ur-remove-relationship-message-confirm'     => 'Avètz suprimit amb succès $1 coma vòstre $2.',
	'ur-remove-error-message-no-relationship'    => 'Avètz pas cap de relacion amb $1.',
	'ur-remove-error-message-remove-yourself'    => 'Podètz pas vos suprimir vos meteis.',
	'ur-remove-error-message-pending-request'    => 'Avètz una requèsta de $1 en cors amb $2.',
	'ur-remove-error-not-loggedin'               => 'Devètz èsser en session per suprimir un $1.',
	'ur-remove'                                  => 'Levar',
	'ur-cancel'                                  => 'Anullar',
	'ur-login'                                   => 'Senhal',
	'ur-add-title'                               => 'Volètz ajustar $1 coma vòstre $2 ?',
	'ur-add-message'                             => 'Avètz l’intencion d’ajustar $1 coma vòstre $2. Lo notificarem a $1 per confirmar vòstre $3.',
	'ur-friendship'                              => 'amistat',
	'ur-grudge'                                  => 'rancòr',
	'ur-add-button'                              => 'Ajustar coma $1',
	'ur-add-sent-title'                          => 'Avètz mandat vòstra requèsta en $1 a $2 !',
	'ur-add-sent-message'                        => 'Vòstra requèsta en $1 es estada mandada a $2 per confirmacion. Se $2 confirma vòstra demanda, recebretz un corrièr electronic en retorn.',
	'ur-add-error-message-no-user'               => 'L’utilizaire que sètz a ajustar existís pas.',
	'ur-add-error-message-blocked'               => 'Actualament sètz blocat e doncas podètz pas ajustar ni amics ni enemics.',
	'ur-add-error-message-yourself'              => 'Podètz pas vos ajustar vos meteis coma enemic o amic.',
	'ur-add-error-message-existing-relationship' => 'Ja sètz $1 amb $2.',
	'ur-add-error-message-pending-request-title' => 'Paciéncia!',
	'ur-add-error-message-pending-request'       => 'Avètz una requèsta en $1 en espèra amb $2. Vos notificarem quora $2 aurà confirmat vòstra demanda.',
	'ur-add-error-message-not-loggedin'          => 'Devètz èsser connectat per ajustar un $1.',
	'ur-requests-title'                          => 'Demandas de relacions.',
	'ur-requests-message'                        => '<a href="$1">$2</a> desira èsser vòstre $3.',
	'ur-accept'                                  => 'Acceptar',
	'ur-reject'                                  => 'Regetar',
	'ur-no-requests-message'                     => 'Avètz pas cap de requèsta en amic o enemic. Se desiratz mai d\'amics, <a href="$1">invitatz-los !</a>',
	'ur-requests-added-message'                  => 'Avètz ajustat $1 coma vòstre $2.',
	'ur-requests-reject-message'                 => 'Avètz regetat $1 coma vòstre $2.',
	'friend_request_subject'                     => '$1 vos a ajustat coma un amic sus {{SITENAME}} !',
	'friend_request_body'                        => 'Adiu $1 :

$2 vos a ajustat coma un amic sus {{SITENAME}}. Nos volèm assegurar que sètz totes dos actualament amics.

Clicatz sus aqueste ligam per confirmar vòstra amistat :
$3

Mercés.

---

E ! Volètz vos arrestar de recebre de corrièrs de nòstra part ?

Clicatz $4
e modificatz vòstras preferéncias per desactivar las notificacions per corrièr electronic.',
	'foe_request_subject'                        => 'Es la guèrra ! $1 vos a ajustat coma enemic sus {{SITENAME}} !',
	'foe_request_body'                           => "Adiu $1 :

$2 ven just de vos repertoriar coma un enemic sus {{SITENAME}}. Nos volèm assegurar que sètz vertadièrament d'enemics mortals o qu'al mens avètz de grèuges un envèrs l’autre/

Clicatz sus aqueste ligam, per acceptar, a contracòr, aqueste estat de fach.

$3

Mercés

---

E ! Volètz arrestar de recebre de corrièrs de nòstra part ?

Clicatz $4 e modificatz vòstras preferéncias per desactivar las notificacions per corrièr electronic.",
	'friend_accept_subject'                      => '$1 a acceptat vòstra requèsta en amistat sus {{SITENAME}} !',
	'friend_accept_body'                         => 'Adiu $1 : 

$2 a acceptat vòstra requèsta en amistat sus {{SITENAME}} !

Anatz sus la pagina de $2 sus $3

Mercés.

---

E ! Volètz vos arrestar de recebre de corrièrs de nòstra part ?

Clicatz $4
e modificatz vòstras preferéncias per desactivar las notificacions per corrièr electronic.',
	'foe_accept_subject'                         => 'Es fach ! $1 a acceptat vòstra declaracion de guèrra sus  {{SITENAME}} !',
	'foe_accept_body'                            => 'Adiu $1 : 

$2 a acceptat vòstra declaracion de guèrra sus  {{SITENAME}} !

Visitatz la pagina de $2 sus $3.

Mercés

---

E ! Volètz vos arrestar de recebre de corrièrs de nòstra part ?

Clicatz $4
e modificatz vòstras preferéncias per desactivar las notificacions per corrièr electronic.',
	'friend_removed_subject'                     => 'Me damne ! $1 vos a levat de la lista de sos amics sus {{SITENAME}} !',
	'friend_removed_body'                        => 'Adiu $1 :

$2 vos a levat de la lista de sos amics sus {{SITENAME}} !

Mercés

---

E ! Volètz vos arrestar de recebre de corrièrs de nòstra part ?

Clicatz $4
e modificatz vòstras preferéncias per desactivar las notificacions per corrièr electronic.',
	'foe_removed_subject'                        => 'Òsca ! $1 vos a levat de la lista de sos enemics {{SITENAME}} !',
	'foe_removed_body'                           => 'Adiu $1 :

$2 vos a levat de la lista de sos enemics sus {{SITENAME}} !

Seriatz pas, benlèu, sul camin per venir amics ?

Mercés

---

E ! Volètz vos arrestar de recebre de corrièrs de nòstra part ?

Clicatz $4
e modificatz vòstras preferéncias per desactivar las notificacions per corrièr electronic.',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'ur-friendship' => 'ملګرتيا',
	'ur-accept'     => 'منل',
	'ur-reject'     => 'ردول',
);

/** Portuguese (Português)
 * @author 555
 * @author Lijealso
 */
$messages['pt'] = array(
	'viewrelationships'                          => 'Ver relacionamentos',
	'viewrelationshiprequests'                   => 'Ver pedidos de relacionamentos',
	'ur-error-title'                             => 'Ooops, você pegou um caminho errado!',
	'ur-error-message-no-user'                   => 'Não podemos completar a sua requisição, não existe um utilizador com este nome.',
	'ur-main-page'                               => 'Página principal',
	'ur-your-profile'                            => 'Seu perfil',
	'ur-backlink'                                => '&lt; Voltar ao perfil de $1',
	'ur-friend'                                  => 'amigo',
	'ur-foe'                                     => 'inimigo',
	'ur-relationship-count'                      => '$1 possui $ {{PLURAL:$2|$3|$3s}}.',
	'ur-add-friends'                             => ' Quer mais amigos? <a href="$1">Convide-os</a>',
	'ur-add-friend'                              => 'Adicionar como amigo',
	'ur-add-foe'                                 => 'Adicionar como inimigo',
	'ur-remove-relationship'                     => 'Remover de $1',
	'ur-give-gift'                               => 'Dar um presente',
	'ur-previous'                                => 'ant',
	'ur-next'                                    => 'prox',
	'ur-remove-relationship-title'               => 'Deseja que $1 deixe de ser seu $2?',
	'ur-remove-relationship-title-confirm'       => 'Você removeu $1 de seus $2s',
	'ur-remove-relationship-message'             => 'Você requisitou a remoção de $1 como seu $2. Clique em "$3" para confirmar.',
	'ur-remove-relationship-message-confirm'     => '$1 foi removido com sucesso de seus $2s.',
	'ur-remove-error-message-no-relationship'    => 'Você não possui um relacionamento com $1.',
	'ur-remove-error-message-remove-yourself'    => 'Você não pode remover a si mesmo.',
	'ur-remove-error-message-pending-request'    => 'Você tem um pedido de $1 com $2.',
	'ur-remove-error-not-loggedin'               => 'Tem que estar logado para remover $1.',
	'ur-remove'                                  => 'Remover',
	'ur-cancel'                                  => 'Cancelar',
	'ur-login'                                   => 'Entrar',
	'ur-add-title'                               => 'Você deseja adicionar $1 como seu $2?',
	'ur-add-message'                             => 'Você está prestes a adicionar $1 como seu $2. Nós notificaremos $1, a fim de confirmar que há $3 entre vocês.',
	'ur-friendship'                              => 'amizade',
	'ur-grudge'                                  => 'ressentimento',
	'ur-add-button'                              => 'Adicionar como $1',
	'ur-add-sent-title'                          => 'O seu pedido de $1 foi enviado para 2$!',
	'ur-add-error-message-no-user'               => 'O usuário que pretende adicionar não existe.',
	'ur-add-error-message-pending-request-title' => 'Paciência!',
	'ur-add-error-message-not-loggedin'          => 'Necessita estar logado para adicionar $1',
	'ur-accept'                                  => 'Aceitar',
	'ur-reject'                                  => 'Rejeitar',
);

/** Swedish (Svenska)
 * @author M.M.S.
 */
$messages['sv'] = array(
	'ur-main-page'                               => 'Huvudsida',
	'ur-your-profile'                            => 'Din profil',
	'ur-backlink'                                => '&lt; Tillbaka till $1s profil',
	'ur-friend'                                  => 'vän',
	'ur-foe'                                     => 'fiende',
	'ur-relationship-count'                      => '$1 har $2 {{PLURAL:$2|$3|$3er}}.',
	'ur-add-friend'                              => 'Lägg till som vän',
	'ur-add-foe'                                 => 'Lägg till som fiende',
	'ur-remove-relationship'                     => 'Ta bort som $1',
	'ur-previous'                                => 'föregående',
	'ur-next'                                    => 'nästa',
	'ur-remove-relationship-title'               => 'Vill du ta bort $1 som din $2?',
	'ur-remove-relationship-title-confirm'       => 'Du har tagit bort $1 som din $2',
	'ur-remove-relationship-message'             => 'Du har begärt att ta bort $1 som din $2, tryck "$3" för att konfirmera.',
	'ur-remove-error-message-remove-yourself'    => 'Du kan inte ta bort dig själv.',
	'ur-remove'                                  => 'Ta bort',
	'ur-cancel'                                  => 'Avbryt',
	'ur-login'                                   => 'Logga in',
	'ur-add-title'                               => 'Vill du lägga till $1 som din $2?',
	'ur-add-button'                              => 'Lägg till som $1',
	'ur-add-error-message-existing-relationship' => 'Du är redan $1 med $2.',
	'ur-accept'                                  => 'Acceptera',
	'ur-reject'                                  => 'Avslå',
	'friend_request_subject'                     => '$1 har laggt till dig som vän på {{SITENAME}}!',
	'friend_removed_subject'                     => 'Å Nej! $1 har tagit bort dig som vän på {{SITENAME}}!',
	'foe_removed_subject'                        => 'Hurra! $1 har tagit bort dig som fiende på {{SITENAME}}!',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'viewrelationships'                          => 'బంధాన్ని చూడండి',
	'ur-main-page'                               => 'మొదటి పేజీ',
	'ur-your-profile'                            => 'మీ ప్రొఫైలు',
	'ur-friend'                                  => 'స్నేహితులు',
	'ur-foe'                                     => 'శత్రువు',
	'ur-add-friend'                              => 'స్నేహితునిగా చేర్చు',
	'ur-add-foe'                                 => 'శత్రువుగా చేర్చు',
	'ur-previous'                                => 'క్రితం',
	'ur-next'                                    => 'తర్వాతి',
	'ur-remove-error-message-remove-yourself'    => 'మిమ్మల్ని మీరే తొలగించుకోలేరు.',
	'ur-remove-error-not-loggedin'               => '$1ని తొలగించడానికి మీరు లోనికి ప్రవేశించి ఉండాలి.',
	'ur-remove'                                  => 'తొలగించు',
	'ur-cancel'                                  => 'రద్దు',
	'ur-login'                                   => 'ప్రవేశించు',
	'ur-friendship'                              => 'స్నేహం',
	'ur-grudge'                                  => 'పగ',
	'ur-add-error-message-no-user'               => 'మీరు చేర్చాలని ప్రయత్నిస్తున్న వాడుకరి లేనే లేరు.',
	'ur-add-error-message-yourself'              => 'మిమ్మల్ని మీరే స్నేహితునిగానో లేదా శత్రువుగానో చేర్చుకోలేరు.',
	'ur-add-error-message-pending-request-title' => 'ఓపిక!',
	'ur-add-error-message-not-loggedin'          => '$1ని చేర్చడానికి మీరు లోనికి ప్రవేశించి ఉండాలి.',
	'ur-requests-title'                          => 'సంబంధ అభ్యర్థనలు',
	'ur-requests-message'                        => '<a href="$1">$2</a> మీ $3 కావాలనుకుంటున్నారు.',
	'ur-accept'                                  => 'అంగీకరించు',
	'ur-reject'                                  => 'తిరస్కరించు',
	'ur-no-requests-message'                     => 'మీకు మిత్రుత్వ లేదా శత్రుత్వ అభ్యర్థనలు లేవు. మీకు మరింత మంది స్నేహితులు కావాలంటే, <a href="$1">వారిని ఆహ్వానించండి!</a>',
	'ur-requests-added-message'                  => '$1ని $2గా మీరు చేర్చుకున్నారు.',
	'ur-requests-reject-message'                 => '$1ని $2గా మీరు తిరస్కరించారు.',
	'friend_request_subject'                     => '{{SITENAME}}లో $1 మిమ్మల్ని స్నేహితునిగా చేర్చుకున్నారు!',
);

/** Tajik (Тоҷикӣ)
 * @author Ibrahim
 */
$messages['tg'] = array(
	'ur-main-page'                               => 'Саҳифаи Аслӣ',
	'ur-friend'                                  => 'дӯст',
	'ur-previous'                                => 'қаблӣ',
	'ur-next'                                    => 'баъдӣ',
	'ur-remove'                                  => 'Ҳазф',
	'ur-cancel'                                  => 'Лағв',
	'ur-login'                                   => 'Вуруд кунед',
	'ur-friendship'                              => 'дӯстӣ',
	'ur-add-error-message-pending-request-title' => 'Сабр!',
	'ur-accept'                                  => 'Пазируфтан',
	'ur-reject'                                  => 'Рад кардан',
);

