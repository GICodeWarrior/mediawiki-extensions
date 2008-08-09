<?php
/**
 * Internationalisation file for UserRelationship extension pages.
 *
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author David Pean
 */
$messages['en'] = array(
	'viewrelationships'                          => 'View relationship',
	'viewrelationshiprequests'                   => 'View relationship requests',
	'ur-already-submitted'                       => 'Your request has been sent',
	'ur-error-page-title' => 'Woops!',
	'ur-error-title'                             => 'Whoops, you took a wrong turn!',
	'ur-error-message-no-user'                   => 'We cannot complete your request, because no user with this name exists.',
	'ur-main-page'                               => 'Main page',
	'ur-your-profile'                            => 'Your profile',
	'ur-backlink'                                => '&lt; Back to $1\'s profile',
	'ur-friend'                                  => 'friend',
	'ur-foe'                                     => 'foe',
	'ur-relationship-count-foes' => '$1 has $2 {{PLURAL:$2|foe|foes}}. Want more foes? <a href="$3">Invite them.</a>',
	'ur-relationship-count-friends' => '$1 has $2 {{PLURAL:$2|friend|friends}}. Want more friends? <a href="$3">Invite them.</a>',
	'ur-add-friends'                             => ' Want more friends? <a href="$1">Invite them</a>',
	'ur-add-friend'                              => 'Add as friend',
	'ur-add-foe'                                 => 'Add as foe',
	'ur-add-no-user'                             => 'No user selected.
Please request friends/foes through the correct link.',
	'ur-add-personal-message'                    => 'Add a personal message',
	'ur-remove-relationship-friend' => 'Remove as friend',
	'ur-remove-relationship-foe' => 'Remove as foe',
	'ur-give-gift'                               => 'Give a gift',
	'ur-previous'                                => 'prev',
	'ur-next'                                    => 'next',
	'ur-remove-relationship-title-foe' => 'Do you want to remove $1 as your foe?',
	'ur-remove-relationship-title-confirm-foe' => 'You have removed $1 as your foe',
	'ur-remove-relationship-title-friend' => 'Do you want to remove $1 as your friend?',
	'ur-remove-relationship-title-confirm-friend' => 'You have removed $1 as your friend',
	'ur-remove-relationship-message-foe' => 'You have requested to remove $1 as your foe, press "$2" to confirm.',
	'ur-remove-relationship-message-confirm-foe' => 'You have successfully removed $1 as your foe.',
	'ur-remove-relationship-message-friend' => 'You have requested to remove $1 as your friend, press "$2" to confirm.',
	'ur-remove-relationship-message-confirm-friend' => 'You have successfully removed $1 as your friend.',
	'ur-remove-error-message-no-relationship'    => 'You do not have a relationship with $1.',
	'ur-remove-error-message-remove-yourself'    => 'You cannot remove yourself.',
	'ur-remove-error-message-pending-request'    => 'You have a pending $1 request with $2.',
	'ur-remove-error-message-pending-foe-request' => 'You have a pending foe request with $1.',
	'ur-remove-error-message-pending-friend-request' => 'You have a pending friend request with $1.',
	'ur-remove-error-not-loggedin'               => 'You have to be logged in to remove a $1.',
	'ur-remove-error-not-loggedin-foe' => 'You have to be logged in to remove a foe.',
	'ur-remove-error-not-loggedin-friend' => 'You have to be logged in to remove a friend.',
	'ur-remove'                                  => 'Remove',
	'ur-cancel'                                  => 'Cancel',
	'ur-login'                                   => 'Login',
	'ur-add-title-foe' => 'Do you want to add $1 as your foe?',
	'ur-add-title-friend' => 'Do you want to add $1 as your friend?',
	'ur-add-message-foe' => 'You are about to add $1 as your foe.
We will notify $1 to confirm your grudge.',
	'ur-add-message-friend' => 'You are about to add $1 as your friend.
We will notify $1 to confirm your friendship.',
	'ur-friendship'                              => 'friendship',
	'ur-grudge'                                  => 'grudge',
	'ur-add-button'                              => "Add as $1",
	'ur-add-button-foe' => 'Add as foe',
	'ur-add-button-friend' => 'Add as friend',
	'ur-add-sent-title-foe' => 'We have sent your foe request to $1!',
	'ur-add-sent-title-friend' => 'We have sent your friend request to $1!',
	'ur-add-sent-message-foe' => 'Your foe request has been sent to $1 for confirmation.
If $1 confirms your request, you will receive a follow-up e-mail',
	'ur-add-sent-message-friend' => 'Your friend request has been sent to $1 for confirmation.
If $1 confirms your request, you will receive a follow-up e-mail',
	'ur-add-error-message-no-user'               => 'The user you are trying to add does not exist.',
	'ur-add-error-message-blocked'               => 'You are currently blocked and cannot add friends or foes.',
	'ur-add-error-message-yourself'              => 'You cannot add yourself as a friend or foe.',
	'ur-add-error-message-existing-relationship' => 'You are already $1 with $2.',
	'ur-add-error-message-existing-relationship-foe' => 'You are already foes with $1.',
	'ur-add-error-message-existing-relationship-friend' => 'You are already friends with $1.',
	'ur-add-error-message-pending-request-title' => 'Patience!',
	'ur-add-error-message-pending-friend-request' => 'You have a pending friend request with $1.
We will notify you when $1 confirms your request.',
	'ur-add-error-message-pending-foe-request' => 'You have a pending foe request with $1.
We will notify you when $1 confirms your request.',
	'ur-add-error-message-not-loggedin'          => 'You must be logged in to add a $1',
	'ur-add-error-message-not-loggedin-foe' => 'You must be logged in to add a foe',
	'ur-add-error-message-not-loggedin-friend' => 'You must be logged in to add a friend',
	'ur-requests-title'                          => 'Relationship requests',
	'ur-requests-message-foe' => '<a href="$1">$2</a> wants to be your foe.',
	'ur-requests-message-friend' => '<a href="$1">$2</a> wants to be your friend.',
	'ur-accept'                                  => 'Accept',
	'ur-reject'                                  => 'Reject',
	'ur-no-requests-message'                     => 'You have no friend or foe requests.
If you want more friends, <a href="$1">invite them!</a>',
	'ur-requests-added-message-foe' => 'You have added $1 as your foe.',
	'ur-requests-added-message-friend' => 'You have added $1 as your friend.',
	'ur-requests-reject-message-friend' => 'You have rejected $1 as your friend.',
	'ur-requests-reject-message-foe' => 'You have rejected $1 as your foe.',
	'ur-title-foe'                               => "$1's foe list",
	'ur-title-friend'                            => "$1's friend list",
	'friend_request_subject'                     => '$1 has added you as a friend on {{SITENAME}}!',
	'friend_request_body'                        => 'Hi $1:

$2 has added you as a friend on {{SITENAME}}.  We want to make sure that you two are actually friends.

Please click this link to confirm your friendship:
$3

Thanks

---

Hey, want to stop getting e-mails from us?

Click $4
and change your settings to disable e-mail notifications.',
	'foe_request_subject'                        => 'It\'s war! $1 has added you to as a foe on {{SITENAME}}!',
	'foe_request_body'                           => 'Hi $1:

$2 just listed you as a foe on {{SITENAME}}.  We want to make sure that you two are actually mortal enemies  or at least having an argument.

Please click this link to confirm the grudge match.

$3

Thanks

---

Hey, want to stop getting e-mails from us?

Click $4
and change your settings to disable e-mail notifications.',

	'friend_accept_subject'                      => '$1 has accepted your friend request on {{SITENAME}}!',
	'friend_accept_body'                         => 'Hi $1:

$2 has accepted your friend request on {{SITENAME}}!

Check out $2\'s page at $3

Thanks,

---

Hey, want to stop getting e-mails from us?

Click $4
and change your settings to disable e-mail notifications.',
	'foe_accept_subject'                         => 'It\'s on! $1 has accepted your foe request on {{SITENAME}}!',
	'foe_accept_body'                            => 'Hi $1:

$2 has accepted your foe request on {{SITENAME}}!

Check out $2\'s page at $3

Thanks

---

Hey, want to stop getting e-mails from us?

Click $4
and change your settings to disable e-mail notifications.',
	'friend_removed_subject'                     => 'Oh no! $1 has removed you as a friend on {{SITENAME}}!',
	'friend_removed_body'                        => 'Hi $1:

$2 has removed you as a friend on {{SITENAME}}!

Thanks

---

Hey, want to stop getting e-mails from us?

Click $4
and change your settings to disable e-mail notifications.',
	'foe_removed_subject'                        => 'Woohoo! $1 has removed you as a foe on {{SITENAME}}!',
	'foe_removed_body'                           => 'Hi $1:

	$2 has removed you as a foe on {{SITENAME}}!

Perhaps you two are on your way to becoming friends?

Thanks

---

Hey, want to stop getting e-mails from us?

Click $4
and change your settings to disable e-mail notifications.',
);

/** Faeag Rotuma (Faeag Rotuma)
 * @author Jose77
 */
$messages['rtm'] = array(
	'ur-main-page' => 'Pej Maha',
	'ur-cancel'    => "Mao'ạki",
	'ur-login'     => 'Surum',
);

/** Karelian (Karjala)
 * @author Flrn
 */
$messages['krl'] = array(
	'ur-main-page' => 'Piälehyt',
	'ur-cancel'    => 'Keskevytä',
);

/** Eastern Mari (Олык Марий)
 * @author Сай
 */
$messages['mhr'] = array(
	'ur-main-page' => 'Тӱҥ лаштык',
	'ur-cancel'    => 'Чараш',
);

/** Niuean (ko e vagahau Niuē)
 * @author Jose77
 */
$messages['niu'] = array(
	'ur-main-page' => 'Matapatu Lau',
	'ur-cancel'    => 'Tiaki',
	'ur-login'     => 'Hu ki loto',
);

/** Afrikaans (Afrikaans)
 * @author Arnobarnard
 * @author Naudefj
 */
$messages['af'] = array(
	'ur-main-page' => 'Tuisblad',
	'ur-previous'  => 'vorige',
	'ur-next'      => 'volgende',
	'ur-remove'    => 'Skrap',
	'ur-cancel'    => 'Kanselleer',
	'ur-login'     => 'Inteken',
);

/** Arabic (العربية)
 * @author Alnokta
 * @author OsamaK
 * @author Meno25
 */
$messages['ar'] = array(
	'viewrelationships'                                 => 'عرض العلاقة',
	'viewrelationshiprequests'                          => 'اعرض طلبات العلاقات',
	'ur-already-submitted'                              => 'طلبك تم إرساله',
	'ur-error-page-title'                               => 'آه!',
	'ur-error-title'                                    => 'آه، أنت أخذت منحنيا خاطئا!',
	'ur-error-message-no-user'                          => 'لا يمكننا استكمال طلبك، لأنه لا يوجد مستخدم بهذا الاسم.',
	'ur-main-page'                                      => 'الصفحة الرئيسية',
	'ur-your-profile'                                   => 'ملفك',
	'ur-backlink'                                       => '&lt; رجوع إلى ملف $1',
	'ur-friend'                                         => 'صديق',
	'ur-foe'                                            => 'عدو',
	'ur-relationship-count-foes'                        => '$1 لديه $2 {{PLURAL:$2|عدو|عدو}}. تريد المزيد من الأعداء؟ <a href="$3">ادعهم.</a>',
	'ur-relationship-count-friends'                     => '$1 لديه $2 {{PLURAL:$2|صديق|صديق}}. تريد المزيد من الأصدقاء؟ <a href="$3">ادعهم.</a>',
	'ur-add-friends'                                    => '  تريد المزيد من الأصدقاء؟ <a href="$1">أدعهم</a>',
	'ur-add-friend'                                     => 'أضف كصديق',
	'ur-add-foe'                                        => 'أضف كعدو',
	'ur-add-no-user'                                    => 'لا مستخدم تم اختياره.
من فضلك اطلب الأصدقاء/الأعداء من خلال الوصلة الصحيحة.',
	'ur-add-personal-message'                           => 'إضافة رسالة شخصية',
	'ur-remove-relationship-friend'                     => 'إزالة كصديق',
	'ur-remove-relationship-foe'                        => 'إزالة كعدو',
	'ur-give-gift'                                      => 'أعط هدية',
	'ur-previous'                                       => 'قبل',
	'ur-next'                                           => 'بعد',
	'ur-remove-relationship-title-foe'                  => 'هل تريد إزالة $1 كعدوك؟',
	'ur-remove-relationship-title-confirm-foe'          => 'أنت أزلت $1 كعدوك',
	'ur-remove-relationship-title-friend'               => 'هل تريد إزالة $1 كصديقك؟',
	'ur-remove-relationship-title-confirm-friend'       => 'أنت أزلت $1 كصديقك',
	'ur-remove-relationship-message-foe'                => 'أنت طلبت إزالة $1 كعدوك، اضغط "$2" للتأكيد.',
	'ur-remove-relationship-message-confirm-foe'        => 'أنت أزلت بنجاح $1 كعدوك.',
	'ur-remove-relationship-message-friend'             => 'أنت طلبت إزالة $1 كصديقك، اضغط "$2" للتأكيد.',
	'ur-remove-relationship-message-confirm-friend'     => 'أنت أزلت بنجاح $1 كصديقك.',
	'ur-remove-error-message-no-relationship'           => 'لا تمتلك أي علاقة مع $1.',
	'ur-remove-error-message-remove-yourself'           => 'لا يمكنك أن تزيل نفسك.',
	'ur-remove-error-message-pending-request'           => 'لديك طلب $1 قيد الانتظار مع $2.',
	'ur-remove-error-message-pending-foe-request'       => 'لديك طلب عداوة قيد الانتظار مع $1.',
	'ur-remove-error-message-pending-friend-request'    => 'لديك طلب صداقة قيد الانتظار مع $1.',
	'ur-remove-error-not-loggedin'                      => 'أنت ينبغي أن تكون مسجل الدخول لإزالة $1.',
	'ur-remove-error-not-loggedin-foe'                  => 'يجب أن تكون مسجل الدخول لإزالة عدو.',
	'ur-remove-error-not-loggedin-friend'               => 'يجب أن تكون مسجل الدخول لإزالة صديق.',
	'ur-remove'                                         => 'أزل',
	'ur-cancel'                                         => 'إلغاء',
	'ur-login'                                          => 'دخول',
	'ur-add-title-foe'                                  => 'هل تريد إضافة $1 كعدوك؟',
	'ur-add-title-friend'                               => 'هل تريد إضافة $1 كصديقك؟',
	'ur-add-message-foe'                                => 'أنت على وشك إضافة $1 كعدوك.
سنخطر $1 لتأكيد عداوتك.',
	'ur-add-message-friend'                             => 'أنت على وشك إضافة $1 كصديقك.
سنخطر $1 لتأكيد صداقتك.',
	'ur-friendship'                                     => 'صداقة',
	'ur-grudge'                                         => 'ضغينة',
	'ur-add-button'                                     => 'أضف ك&#x200d; $1',
	'ur-add-button-foe'                                 => 'إضافة كعدو',
	'ur-add-button-friend'                              => 'إضافة كصديق',
	'ur-add-sent-title-foe'                             => 'لقد أرسلنا طلب عداوتك إلى $1!',
	'ur-add-sent-title-friend'                          => 'لقد أرسلنا طلب صداقتك إلى $1!',
	'ur-add-sent-message-foe'                           => 'طلب عداوتك تم إرساله إلى $1 للتأكيد.
لو أن $1 أكد طلبك، ستتلقى بريد متابعة',
	'ur-add-sent-message-friend'                        => 'طلب صداقتك تم إرساله إلى $1 للتأكيد.
لو أن $1 أكد طلبك، ستتلقى بريد متابعة',
	'ur-add-error-message-no-user'                      => 'المستخدم الذي تحاول أن تضيفه غير موجود.',
	'ur-add-error-message-blocked'                      => 'أنت حاليا ممنوع ولا يمكنك إضافة أصدقاء أو أعداء.',
	'ur-add-error-message-yourself'                     => 'أنت لا يمكنك إضافة نفسك كصديق أو عدو.',
	'ur-add-error-message-existing-relationship'        => 'أنت بالفعل $1 مع $2.',
	'ur-add-error-message-existing-relationship-foe'    => 'أنت بالفعل عدو $1.',
	'ur-add-error-message-existing-relationship-friend' => 'أنت بالفعل صديق $1.',
	'ur-add-error-message-pending-request-title'        => 'صبرا!',
	'ur-add-error-message-pending-friend-request'       => 'لديك طلب صداقة قيد الانتظار مع $1.
سنخطرك عندما $1 يؤكد طلبك.',
	'ur-add-error-message-pending-foe-request'          => 'لديك طلب عداوة قيد الانتظار مع $1.
سنخطرك عندما $1 يؤكد طلبك.',
	'ur-add-error-message-not-loggedin'                 => 'يجب أن تكون مسجلا دخولك لتضيف $1',
	'ur-add-error-message-not-loggedin-foe'             => 'يجب أن تكون مسجل الدخول لإضافة عدو',
	'ur-add-error-message-not-loggedin-friend'          => 'يجب أن تكون مسجل الدخول لإضافة صديق',
	'ur-requests-title'                                 => 'طلبات العلاقات',
	'ur-requests-message-foe'                           => '<a href="$1">$2</a> يريد أن يكون عدوك.',
	'ur-requests-message-friend'                        => '<a href="$1">$2</a> يريد أن يكون صديقك.',
	'ur-accept'                                         => 'قبول',
	'ur-reject'                                         => 'رفض',
	'ur-no-requests-message'                            => 'ليس لديك طلبات صداقة أو عداوة.
لو أنك تريد المزيد من الأصدقاء، <a href="$1">ادعوهم!</a>',
	'ur-requests-added-message-foe'                     => 'أنت أضفت $1 كعدوك.',
	'ur-requests-added-message-friend'                  => 'أنت أضفت $1 كصديقك.',
	'ur-requests-reject-message-friend'                 => 'أنت رفضت $1 كصديقك.',
	'ur-requests-reject-message-foe'                    => 'أنت رفضت $1 كعدوك.',
	'ur-title-foe'                                      => 'قائمة أعداء $1',
	'ur-title-friend'                                   => 'قائمة أصدقاء $1',
	'friend_request_subject'                            => '$1 أضافك كصديق في {{SITENAME}}!',
	'friend_request_body'                               => 'مرحبا $1:

$2 أضافك كصديق في {{SITENAME}}.  نريد التأكد من أنكما فعلا صديقان.

من فضلك اضغط هذه الوصلة لتأكيد صداقتك:
$3

شكرا

---

هل تريد التوقف عن تلقي رسائل بريد إلكتروني مننا؟

اضغط $4
وغير إعداداتك لتعطيل إخطارات البريد الإلكتروني.',
	'foe_request_subject'                               => 'إنها الحرب! $1 أضافك كعدو في {{SITENAME}}!',
	'foe_request_body'                                  => 'مرحبا $1:

$2 أضافك حالا كعدو في {{SITENAME}}.  نريد التحقق من أنكما فعلا عدوان أو على الأقل بينكما خلاف.

من فضلك اضغط هذه الوصلة لتأكيد التطابق.

$3

شكرا

---

هل تريد التوقف عن تلقي رسائل بريد إلكتروني مننا؟

اضغط $4
وغير إعداداتك لتعطيل إخطارات البريد الإلكتروني.',
	'friend_accept_subject'                             => '$1 قبل طلب صداقتك في {{SITENAME}}!',
	'friend_accept_body'                                => 'مرحبا $1:

$2 قبل طلب صداقتك في {{SITENAME}}!

تحقق من صفحة $2 في $3

شكرا،

---

هل تريد التوقف عن تلقي رسائل بريد إلكتروني مننا؟

اضغط $4
وغير إعداداتك لتعطيل إخطارات البريد الإلكتروني.',
	'foe_accept_subject'                                => 'إنه يعمل! $1 قبل طلب عداوتك في {{SITENAME}}!',
	'foe_accept_body'                                   => 'مرحبا $1:

$2 قبل طلب عداوتك في {{SITENAME}}!

تحقق من صفحة $2 في $3

شكرا

---

هل تريد التوقف عن تلقي رسائل بريد إلكتروني مننا؟

اضغط $4
وغير إعداداتك لتعطيل إخطارات البريد الإكتروني.',
	'friend_removed_subject'                            => 'كلا! أزالك $1 كصديق على {{SITENAME}}!',
	'friend_removed_body'                               => 'مرحبا $1:

$2 أزالك كصديق في {{SITENAME}}!

شكرا

---

هل تريد التوقف عن تلقي رسائل بريد إلكتروني مننا؟

اضغط $4
وغير إعداداتك لتعطيل إخطارات البريد الإلكتروني.',
	'foe_removed_subject'                               => 'هاه! $1 أزالك كعدو في {{SITENAME}}!',
	'foe_removed_body'                                  => 'مرحبا $1:

$2 أزالك كعدو في {{SITENAME}}!

ربما أنتما الاثنان على الطريق لتكونا صديقين؟

شكرا

---

هل تريد التوقف عن تلقي رسائل بريد إلكتروني مننا؟

اضغط $4
وغير إعداداتك لتعطيل إخطارات البريد الإكتروني.',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'ur-already-submitted'                              => 'Вашата заявка беше изпратена',
	'ur-error-page-title'                               => 'Опа!',
	'ur-error-title'                                    => 'Опа, грешен ход!',
	'ur-error-message-no-user'                          => 'Заявката не може да бъде изпълнена, тъй като не съществува потребител с това име.',
	'ur-main-page'                                      => 'Начална страница',
	'ur-your-profile'                                   => 'Моят профил',
	'ur-backlink'                                       => '&lt; Обратно към профила на $1',
	'ur-friend'                                         => 'приятел',
	'ur-foe'                                            => 'неприятел',
	'ur-relationship-count-foes'                        => '$1 има $2 {{PLURAL:$2|неприятел|неприятели}}. Искате още? <a href="$3">Поканете ги.</a>',
	'ur-relationship-count-friends'                     => '$1 има $2 {{PLURAL:$2|приятел|приятели}}. Искате още? <a href="$3">Поканете ги.</a>',
	'ur-add-friends'                                    => '  Искате повече приятели? <a href="$1">Поканете ги!</a>',
	'ur-add-friend'                                     => 'Добавяне в приятели',
	'ur-add-foe'                                        => 'Добавяне в неприятели',
	'ur-add-no-user'                                    => 'Не е посочен потребител.
Заявките за приятелство/неприятелство се извършват чрез съответната препратка.',
	'ur-add-personal-message'                           => 'Добавяне на лично съобщение',
	'ur-remove-relationship-friend'                     => 'Премахване от приятели',
	'ur-remove-relationship-foe'                        => 'Премахване от неприятели',
	'ur-give-gift'                                      => 'Подаряване на подарък',
	'ur-previous'                                       => 'предишни',
	'ur-next'                                           => 'следващи',
	'ur-remove-relationship-title-foe'                  => 'Желаете ли да премахнете $1 от списъка ви с неприятели?',
	'ur-remove-relationship-title-confirm-foe'          => 'Премахнахте $1 от списъка ви с неприятели',
	'ur-remove-relationship-title-friend'               => 'Желаете ли да премахнете $1 от списъка ви с приятели?',
	'ur-remove-relationship-title-confirm-friend'       => 'Премахнахте $1 от списъка ви с приятели',
	'ur-remove-relationship-message-foe'                => 'Направихте заявка да премахнете $1 от списъка ви с неприятели; написнете „$2“ за потвърждаване.',
	'ur-remove-relationship-message-confirm-foe'        => 'Успешно премахнахте $1 от списъка ви с неприятели.',
	'ur-remove-relationship-message-friend'             => 'Направихте заявка да премахнете $1 от списъка ви с приятели; написнете „$2“ за потвърждаване.',
	'ur-remove-relationship-message-confirm-friend'     => 'Успешно премахнахте $1 от списъка ви с приятели.',
	'ur-remove-error-message-remove-yourself'           => 'Не можете да премахнете себе си.',
	'ur-remove-error-message-pending-request'           => 'Имате чакаща заявка за $1 с $2.',
	'ur-remove-error-message-pending-foe-request'       => 'Имате чакаща заявка за неприятелство с $1.',
	'ur-remove-error-message-pending-friend-request'    => 'Имате чакаща заявка за приятелство с $1.',
	'ur-remove-error-not-loggedin'                      => 'Необходимо е да влезете за да премахнете $1.',
	'ur-remove-error-not-loggedin-foe'                  => 'За да премахвате неприятели е необходимо да влезете в системата.',
	'ur-remove-error-not-loggedin-friend'               => 'За да премахвате приятели е необходимо да влезете в системата.',
	'ur-remove'                                         => 'Премахване',
	'ur-cancel'                                         => 'Отказване',
	'ur-login'                                          => 'Влизане',
	'ur-add-title-foe'                                  => 'Желаете ли да добавите $1 като ваш неприятел?',
	'ur-add-title-friend'                               => 'Желаете ли да добавите $1 като ваш приятел?',
	'ur-add-message-foe'                                => 'На път сте да добавите $1 като свой неприятел.
Ще изпратим писмо на $1 да потвърди омразата ви.',
	'ur-add-message-friend'                             => 'На път сте да добавите $1 като свой приятел.
Ще изпратим писмо на $1 да потвърди приятелството ви.',
	'ur-friendship'                                     => 'приятелство',
	'ur-grudge'                                         => 'неприятелство',
	'ur-add-button'                                     => 'Добавяне като $1',
	'ur-add-button-foe'                                 => 'Добавяне като неприятел',
	'ur-add-button-friend'                              => 'Добавяне като приятел',
	'ur-add-sent-title-foe'                             => 'Заявката за неприятелство беше изпратена на $1!',
	'ur-add-sent-title-friend'                          => 'Заявката за приятелство беше изпратена на $1!',
	'ur-add-sent-message-foe'                           => 'Заявката ви за неприятелство беше изпратена на $1 за потвърждение.
Ако $1 потвърди, че сте неприятели, ще получите оповестително писмо',
	'ur-add-sent-message-friend'                        => 'Заявката ви за приятелство беше изпратена на $1 за потвърждение.
Ако $1 потвърди, че сте приятели, ще получите оповестително писмо.',
	'ur-add-error-message-no-user'                      => 'Потребителят, който се опитвате да добавите, не съществува.',
	'ur-add-error-message-blocked'                      => 'В момента потребителската ви сметка е блокирана и не можете да добавяте приятели или неприятели.',
	'ur-add-error-message-yourself'                     => 'Не е позволено да добавяте себе си като приятел или неприятел.',
	'ur-add-error-message-existing-relationship'        => 'Вече сте $1 с $2.',
	'ur-add-error-message-existing-relationship-foe'    => 'Вече сте неприятели с $1.',
	'ur-add-error-message-existing-relationship-friend' => 'Вече сте приятели с $1.',
	'ur-add-error-message-pending-friend-request'       => 'Имате изчакваща заявка за приятелство с $1.
Ще ви оповестим когато $1 потвърди заявката.',
	'ur-add-error-message-pending-foe-request'          => 'Имате изчакваща заявка за неприятелство с $1.
Ще ви оповестим когато $1 потвърди заявката.',
	'ur-add-error-message-not-loggedin'                 => 'Необходимо е влизане в системата за добавяне на $1',
	'ur-add-error-message-not-loggedin-foe'             => 'За да добавяте неприятели е необходимо да влезете в системата.',
	'ur-add-error-message-not-loggedin-friend'          => 'За да добавяте приятели е необходимо да влезете в системата.',
	'ur-requests-message-foe'                           => '<a href="$1">$2</a> иска да бъдете неприятели.',
	'ur-requests-message-friend'                        => '<a href="$1">$2</a> иска да бъдете приятели.',
	'ur-accept'                                         => 'Приемане',
	'ur-reject'                                         => 'Отказване',
	'ur-no-requests-message'                            => 'Нямате заявки за приятелства или неприятелства.
Ако искате да имате повече приятели, можете да ги <a href="$1">поканите!</a>',
	'ur-requests-added-message-foe'                     => 'Добавихте $1 като свой неприятел.',
	'ur-requests-added-message-friend'                  => 'Добавихте $1 като свой приятел.',
	'ur-requests-reject-message-friend'                 => 'Отказахте на $1 да бъдете приятели.',
	'ur-requests-reject-message-foe'                    => 'Отказахте на $1 да бъдете неприятели.',
	'ur-title-foe'                                      => 'Списък с неприятели на $1',
	'ur-title-friend'                                   => 'Списък с приятели на $1',
	'friend_request_subject'                            => '$1 ви добави като свой приятел в {{SITENAME}}!',
	'friend_request_body'                               => 'Здравейте $1:

$2 ви добави в списъка си с приятели в {{SITENAME}}. Бихме искали да се уверим, 
че това наистина е така и вие двамата наистина сте приятели.

За потвърждаване на приятелството, щракнете върху долната препратка:
$3

Благодарим ви!

---

Ако не желаете да получавате повече писма от нас, натиснете $4
и променете настройките за оповестяване по е-поща.',
	'foe_request_subject'                               => 'Война! $1 ви добави в списъка си с неприятели в {{SITENAME}}!',
	'friend_accept_subject'                             => '$1 прие поканата ви за приятелство в {{SITENAME}}!',
	'friend_accept_body'                                => 'Здравейте $1:

$2 прие поканата за приятелство в {{SITENAME}}!

Можете да разгледате страницата на $2 на адрес $3

---

Искате да спрете да получавате писма от нас?

Щракнете $4
за промяна на настройките и изключване на възможността за оповестяване по е-поща.',
	'foe_accept_subject'                                => '$1 се съгласи с неприятелството ви в {{SITENAME}}!',
	'foe_accept_body'                                   => 'Здравейте $1:

$2 прие поканата за неприятелство в {{SITENAME}}!

Можете да разгледате страницата на $2 на адрес $3

---

Искате да спрете да получавате писма от нас?

Щракнете $4
за промяна на настройките и изключване на възможността за оповестяване по е-поща.',
	'friend_removed_subject'                            => 'О, не! $1 ви премахна от списъка си с приятели в {{SITENAME}}!',
	'friend_removed_body'                               => 'Здравейте $1:

$2 ви премахна от списъка си с приятели в {{SITENAME}}!

---

Искате да спрете да получавате писма от нас?

Щракнете $4
за промяна на настройките и изключване на възможността за оповестяване по е-поща.',
	'foe_removed_subject'                               => 'Юху! $1 ви премахна от списъка си с неприятели в {{SITENAME}}!',
	'foe_removed_body'                                  => 'Здравейте $1:

$2 ви премахна от списъка си с неприятели в {{SITENAME}}!

Може би двамата сте на път да станете приятели?

---

Искате да спрете да получавате писма от нас?

Щракнете $4
за промяна на настройките и изключване на възможността за оповестяване по е-поща.',
);

/** Chamorro (Chamoru)
 * @author Jatrobat
 */
$messages['ch'] = array(
	'ur-main-page' => 'Fanhaluman',
);

/** Church Slavic (Словѣ́ньскъ / ⰔⰎⰑⰂⰡⰐⰠⰔⰍⰟ)
 * @author ОйЛ
 */
$messages['cu'] = array(
	'ur-main-page' => 'гла́вьна страни́ца',
);

/** Danish (Dansk)
 * @author Jon Harald Søby
 */
$messages['da'] = array(
	'ur-main-page' => 'Forside',
	'ur-next'      => 'næste',
	'ur-cancel'    => 'Afbryd',
	'ur-login'     => 'Log på',
);

/** German (Deutsch)
 * @author Tim 'Avatar' Bartel
 * @author Revolus
 */
$messages['de'] = array(
	'viewrelationships'                          => 'Zeige Beziehungen',
	'viewrelationshiprequests'                   => 'Zeige Beziehungsanfragen',
	'ur-already-submitted'                       => 'Deine Anfrage wurde gesendet',
	'ur-error-title'                             => 'Uuups, hier gehts nicht weiter!',
	'ur-error-message-no-user'                   => 'Wir können die Anfrage nicht ausführen, da kein Benutzer dieses Namens existiert.',
	'ur-main-page'                               => 'Hauptseite',
	'ur-your-profile'                            => 'Dein Profil',
	'ur-backlink'                                => '&lt; Zurück zu $1s Profil',
	'ur-friend'                                  => 'Freund',
	'ur-foe'                                     => 'Feind',
	'ur-relationship-count'                      => '$1 hat $2 {{PLURAL:$2|$3|$3e}}.',
	'ur-add-friends'                             => ' Du möchtest mehr Freunde haben? <a href="$1">Lad\' sie ein...</a>',
	'ur-add-friend'                              => 'Als Freund hinzufügen',
	'ur-add-foe'                                 => 'Als Feind hinzufügen',
	'ur-remove-relationship'                     => '$1 entfernen',
	'ur-give-gift'                               => 'Geschenk senden',
	'ur-previous'                                => 'vorherige',
	'ur-next'                                    => 'nächste',
	'ur-remove-relationship-title'               => 'Möchtest du $1 als deinen $2 entfernen?',
	'ur-remove-relationship-title-confirm'       => 'Du hast $1 als deinen $2 entfernt',
	'ur-remove-relationship-message'             => 'Du möchtest $1 als deinen $2 entfernen, klicke "$3" zur Bestätigung.',
	'ur-remove-relationship-message-confirm'     => 'Du hast $1 erfolgreich als deinen $2 entfernt.',
	'ur-remove-error-message-no-relationship'    => '$1 steht in keiner Beziehung zu dir.',
	'ur-remove-error-message-remove-yourself'    => 'Du kannst dich nicht selbst enfernen.',
	'ur-remove-error-message-pending-request'    => 'Du hast eine offene $1-Anfrage mit $2.',
	'ur-remove-error-not-loggedin'               => 'Du musst angemeldet sein um einen $1 zu entfernen.',
	'ur-remove'                                  => 'Entfernen',
	'ur-cancel'                                  => 'Abbrechen',
	'ur-login'                                   => 'Anmelden',
	'ur-add-title'                               => 'Möchtest du $1 als $2 hinzufügen?',
	'ur-add-message'                             => 'Du bist dabei $1 als $2 hinzuzufügen.  Wir informieren $1, damit er deine $3 bestätigen kann.',
	'ur-friendship'                              => 'Freundschaft',
	'ur-grudge'                                  => 'Feindschaft',
	'ur-add-button'                              => 'Als $1 hinzufügen',
	'ur-add-sent-title'                          => 'Wir haben deine $1-Anfrage an $2 geschickt!',
	'ur-add-sent-message'                        => 'Deine $1-Anfrage wurde zur Bestätigung an $2 geschickt.  Wenn $2 deine Anfrage bestätigt, bekommst du eine E-Mail',
	'ur-add-error-message-no-user'               => 'Der Benutzer, den du hinzufügen möchtest, existiert nicht.',
	'ur-add-error-message-blocked'               => 'Du bist momentan gesperrt und kannst keine Freunde oder Feinde hinzufügen.',
	'ur-add-error-message-yourself'              => 'Du kannst dich nicht selbst als Freund oder Feind hinzufügen.',
	'ur-add-error-message-existing-relationship' => 'Du bist bereits $1 mit $2.',
	'ur-add-error-message-pending-request-title' => 'Geduld!',
	'ur-add-error-message-pending-request'       => 'Du hast eine offene $1-Anfrage mit $2.  Wir benachrichtigen dich, wenn $2 deine Anfrage bestätigt.',
	'ur-add-error-message-not-loggedin'          => 'Du musst angemeldet sein um einen $1 hinzuzufügen',
	'ur-requests-title'                          => 'Beziehungsanfrage',
	'ur-requests-message'                        => '<a href="$1">$2</a> will dein $3 sein.',
	'ur-accept'                                  => 'Annehmen',
	'ur-reject'                                  => 'Ablehnen',
	'ur-no-requests-message'                     => 'Du hast keine Freund- oder Feind-Anfrage.  Wenn du mehr Freunde haben möchtest, <a href="$1">Lad\' sie ein...</a>',
	'ur-requests-added-message'                  => 'Du hast $1 als deinen $2 hinzugefügt.',
	'ur-requests-reject-message'                 => 'Du hast $1 als deinen $2 abgelehnt.',
	'friend_request_subject'                     => '{{SITENAME}}: $1 hat dich als Freund hinzugefügt!',
	'friend_request_body'                        => 'Hi $1:

$2 hat dich in {{SITENAME}} als Freund hinzugefügt.  Wir wollen sicher gehen, dass ihr zwei wirklich Freunde seit.

Bitte klicke den folgenden Link um eure Freundschaft zu bestätigen:
$3

---

Hm, du willst keine E-Mails mehr von uns bekommen?

Klicke $4
und ändere deine Einstellungen um E-Mail-Benachrichtigungen auszuschalten.',
	'foe_request_subject'                        => '{{SITENAME}}: Kriegserklärung! $1 hat dich als Feind hinzugefügt!',
	'foe_request_body'                           => 'Hi $1:

$2 hat dich in {{SITENAME}} als Feind hinzugefügt.  Wir wollen sicher gehen, dsas ihr zwei wirklich tödliche Feinde seid  oder euch wenigstens ein wenig streitet.

Bitte klicke den folgenden Link um eure Feindschaft zu bestätigen:

$3

---

Hm, du willst keine E-Mails mehr von uns bekommen?

Klicke $4
und ändere deine Einstellungen um E-Mail-Benachrichtigungen auszuschalten.',
	'friend_accept_subject'                      => '{{SITENAME}}: $1 hat deine Freundschaftsanfrage bestätigt!',
	'friend_accept_body'                         => 'Hi $1:

$2 hat deine Freundschaftsanfrage in {{SITENAME}} bestätigt!

Siehe $2s Seite hier: $3

Danke

---

Hm, du willst keine E-Mails mehr von uns bekommen?

Klicke $4
und ändere deine Einstellungen um E-Mail-Benachrichtigungen auszuschalten.',
	'foe_accept_subject'                         => '{{SITENAME}}: $1 hat deine Feind-Anfrage bestätigt!',
	'foe_accept_body'                            => 'Hi $1:

$2 hat deine Feind-Anfrage in {{SITENAME}} bestätigt!

Siehe $2s Seite hier: $3

---

Hm, du willst keine E-Mails mehr von uns bekommen?

Klicke $4
und ändere deine Einstellungen um E-Mail-Benachrichtigungen auszuschalten.',
	'friend_removed_subject'                     => '{{SITENAME}}: Oh nein! $1 hat seine Freundschaft zu dir beendet!',
	'friend_removed_body'                        => 'Hi $1:

$2 hat seine Freundschaft zu dir in {{SITENAME}} beendet!

---

Hm, du willst keine E-Mails mehr von uns bekommen?

Klicke $4
und ändere deine Einstellungen um E-Mail-Benachrichtigungen auszuschalten.',
	'foe_removed_subject'                        => '{{SITENAME}}: Hey! $1 hat seine Feindschaft zu dir beendet!',
	'foe_removed_body'                           => 'Hi $1:

$2 hat seine Feindschaft zu dir in {{SITENAME}} beendet!

Vielleicht werdet ihr beide ja sogar mal Freunde?

---

Hm, du willst keine E-Mails mehr von uns bekommen?

Klicke $4
und ändere deine Einstellungen um E-Mail-Benachrichtigungen auszuschalten.',
);

/** Greek (Ελληνικά)
 * @author Consta
 */
$messages['el'] = array(
	'ur-main-page'                               => 'Κύρια σελίδα',
	'ur-friend'                                  => 'φίλος',
	'ur-give-gift'                               => 'Δώστε ένα Δώρο',
	'ur-friendship'                              => 'φιλία',
	'ur-add-error-message-pending-request-title' => 'Υπομονή!',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'viewrelationships'                          => 'Rigardi rilatecon',
	'ur-main-page'                               => 'Ĉefpaĝo',
	'ur-friend'                                  => 'amiko',
	'ur-foe'                                     => 'malamiko',
	'ur-add-friend'                              => 'Amiko',
	'ur-add-foe'                                 => 'Aldoni kiel malamikon',
	'ur-remove-relationship'                     => 'Forigu kiel $1',
	'ur-give-gift'                               => 'Doni donacon',
	'ur-previous'                                => 'antaŭ',
	'ur-next'                                    => 'sekv',
	'ur-remove'                                  => 'Forigi',
	'ur-cancel'                                  => 'Nuligi',
	'ur-login'                                   => 'Ensaluti',
	'ur-friendship'                              => 'amikeco',
	'ur-grudge'                                  => 'venĝemo',
	'ur-add-button'                              => 'Aldonu kiel $1',
	'ur-add-error-message-pending-request-title' => 'Pacienciĝu!',
	'ur-accept'                                  => 'Akceptu',
	'ur-reject'                                  => 'Malakceptu',
	'ur-title-foe'                               => 'Listo de malamikoj de $1',
	'ur-title-friend'                            => 'Listo de amikoj de $1',
	'friend_accept_subject'                      => '$1 akceptis vian amiko-peton en {{SITENAME}}!',
);

/** Finnish (Suomi)
 * @author Jack Phoenix
 */
$messages['fi'] = array(
	'viewrelationships' => 'Ystävä- ja vihollislista',
	'viewrelationshiprequests' => 'Katso ystävä- ja vihollispyyntöjä',
	'ur-accept' => 'Hyväksy',
	'ur-add-button-foe' => 'Lisää viholliseksi',
	'ur-add-button-friend' => 'Lisää ystäväksi',
	'ur-add-error-message-blocked' => 'Olet muokkauseston alaisena etkä voi lisätä ystäviä tai vihollisia.',
	'ur-add-error-message-existing-relationship-foe' => 'Olet jo vihollsia käyttäjän $1 kanssa.',
	'ur-add-error-message-existing-relationship-friend' => 'Olet jo ystäviä käyttäjän $1 kanssa.',
	'ur-add-error-message-no-user' => 'Käyttäjää, jota koitat lisätä ei ole olemassa.',
	'ur-add-error-message-not-loggedin-foe' => 'Sinun tulee olla kirjautunut sisään lisätäksesi vihollisen',
	'ur-add-error-message-not-loggedin-friend' => 'Sinun tulee olla kirjautunut sisään lisätäksesi ystävän',
	'ur-add-error-message-pending-request-title' => 'Kärsivällisyyttä!',
	'ur-add-error-message-pending-friend-request' => 'Sinulla on odottava ystävyyspyyntö käyttäjän $1 kanssa.
Ilmoitamme sinulle, kun $1 vahvistaa pyyntösi.',
	'ur-add-error-message-pending-foe-request' => 'Sinulla on odottava vihollisuuspyyntö käyttäjän $1 kanssa.
Ilmoitamme sinulle, kun $1 vahvistaa pyyntösi.',
	'ur-add-error-message-yourself' => 'Et voi lisätä itseäsi ystäväksesi tai viholliseksesi.',
	'ur-add-friend' => 'Lisää ystäväksi',
	'ur-add-friends' => ' Haluatko lisää ystäviä? <a href="$1">Kutsu heidät</a>',
	'ur-add-foe' => 'Lisää viholliseksi',
	'ur-add-message-foe' => 'Olet aikeissa lisätä käyttäjän $1 viholliseksesi.
Ilmoitamme käyttäjälle $1 asiasta, jotta hän voi vahvistaa kaunanne.',
	'ur-add-message-friend' => 'Olet aikeissa lisätä käyttäjän $1 ystäväksesi.
Ilmoitamme käyttäjälle $1 asiasta, jotta hän voi vahvistaa ystävyytenne.',
	'ur-add-sent-title-foe' => 'Olemme lähettäneet vihollisuuspyyntösi käyttäjälle $1!',
	'ur-add-sent-title-friend' => 'Olemme lähettäneet ystävyyspyyntösi käyttäjälle $1!',
	'ur-add-sent-message-foe' => 'Vihollisuuspyyntösi on lähetetty käyttäjälle $1 vahvistusta varten.
Jos $1 vahvistaa pyyntösi, saat sähköpostia aiheesta',
	'ur-add-sent-message-friend' => 'Ystävyyspyyntösi on lähetetty käyttäjälle $1 vahvistusta varten.
Jos $1 vahvistaa pyyntösi, saat sähköpostia aiheesta',
	'ur-add-no-user' => 'Käyttäjää ei valittu. Teethän ystävyys-/vihollisuuspyynnöt oikean linkin kautta.',
	'ur-add-personal-message' => 'Lisää henkilökohtainen viesti ',
	'ur-add-title-foe' => 'Haluatko lisätä käyttäjän $1 viholliseksesi?',
	'ur-add-title-friend' => 'Haluatko lisätä käyttäjän $1 ystäväksesi?',
	'ur-already-submitted' => 'Pyyntösi on lähetetty',
	'ur-backlink' => '&lt; Takaisin käyttäjän $1 profiiliin',
	'ur-cancel' => 'Peruuta',
	'ur-error-message-no-user' => 'Emme voi suorittaa pyyntöäsi loppuun, koska tämännimistä käyttäjää ei ole olemassa.',
	'ur-error-page-title' => 'Hups!',
	'ur-error-title' => 'Hups, astuit harhaan!',
	'ur-give-gift' => 'Anna lahja',
	'ur-login' => 'Kirjaudu sisään ',
	'ur-main-page' => 'Etusivu',
	'ur-next' => 'seur.',
	'ur-no-requests-message' => 'Sinulla ei ole ystävä- tai vihollispyyntöjä. Jos haluat lisää ystäviä, <a href="$1">kutsu heidät!</a>',
	'ur-previous' => 'edell.',
	'ur-relationship-count-friends' => 'Käyttäjällä $1 on $2 {{PLURAL:$2|ystävä|ystävää}}. Haluatko lisää ystäviä? <a href="$3">Kutsu heidät.</a>',
	'ur-relationship-count-foes' => 'Käyttäjällä $1 on $2 {{PLURAL:$2|vihollinen|vihollista}}. Haluatko lisää vihollisia? <a href="$3">Kutsu heidät.</a>',
	'ur-remove' => 'Poista',
	'ur-remove-relationship-foe' => 'Poista vihollisista',
	'ur-remove-relationship-friend' => 'Poista ystävistä',
	'ur-remove-relationship-title-foe' => 'Haluatko poistaa käyttäjän $1 vihollisistasi?',
	'ur-remove-relationship-title-confirm-foe' => 'Olet poistanut käyttäjän $1 vihollisistasi',
	'ur-remove-relationship-title-friend' => 'Haluatko poistaa käyttäjän $1 ystävistäsi?',
	'ur-remove-relationship-title-confirm-friend' => 'Olet poistanut käyttäjän $1 ystävistäsi',
	'ur-remove-relationship-message-foe' => 'Olet pyytänyt poistaa käyttäjän $1 vihollisistasi, paina "$2" vahvistaaksesi.',
	'ur-remove-relationship-message-confirm-foe' => 'Olet onnistuneesti poistanut käyttäjän $1 vihollisistasi.',
	'ur-remove-relationship-message-friend' => 'Olet pyytänyt poistaa käyttäjän $1 ystävistäsi, paina "$2" vahvistaaksesi.',
	'ur-remove-relationship-message-confirm-friend' => 'Olet onnistuneesti poistanut käyttäjän $1 ystävistäsi.',
	'ur-remove-error-message-no-relationship' => 'Sinulla ei ole minkäänlaista suhdetta käyttäjään $1.',
	'ur-remove-error-message-remove-yourself' => 'Et voi poistaa itseäsi.',
	'ur-remove-error-message-pending-foe-request' => 'Sinulla on odottava vihollisuuspyyntö käyttäjän $1 kanssa.',
	'ur-remove-error-message-pending-friend-request' => 'Sinulla on odottava ystävyyspyyntö käyttäjän $1 kanssa.',
	'ur-remove-error-not-loggedin-foe' => 'Sinun tulee olla kirjautunut sisään poistaaksesi vihollisen.',
	'ur-remove-error-not-loggedin-friend' => 'Sinun tulee olla kirjautunut sisään poistaaksesi ystävän.',
	'ur-requests-title' => 'Ystävä- ja vihollispyynnöt',
	'ur-requests-message-foe' => '<a href="$1">$2</a> haluaa olla vihollisesi.',
	'ur-requests-message-friend' => '<a href="$1">$2</a> haluaa olla ystäväsi.',
	'ur-reject' => 'Hylkää',
	'ur-requests-added-message-foe' => 'Olet lisännyt käyttäjän $1 viholliseksesi.',
	'ur-requests-added-message-friend' => 'Olet lisännyt käyttäjän $1 ystäväksesi.',
	'ur-requests-reject-message-friend' => 'Olet hylännyt käyttäjän $1 ystävähakemuksen.',
	'ur-requests-reject-message-foe' => 'Olet hylännyt käyttäjän $1 vihollishakemuksen.',
	'ur-title-foe' => 'Käyttäjän $1 vihollislista',
	'ur-title-friend' => 'Käyttäjän $1 ystävälista',
	'ur-your-profile' => 'Profiilisi',
	'friend_request_subject' => '$1 on lisännyt sinut ystäväksesi {{GRAMMAR:inessive|{{SITENAME}}}}!',
	'friend_request_body' => 'Hei $1:

$2 on lisännyt sinut ystäväksesi {{GRAMMAR:inessive|{{SITENAME}}}}.  Haluamme varmistua siitä, että te olette oikeasti ystäviä.

Napsauta allaolevaa linkkiä vahvistaaksesi ystävyytenne:
$3

Kiitos

---

Hei, etkö enää halua saada sähköpostia meiltä?

Napsauta $4
ja muuta asetuksiasi poistaaksesi sähköposti-ilmoitukset käytöstä.',
	'foe_request_subject'  => 'Sotaa! $1 on lisännyt sinut vihollisekseen {{GRAMMAR:inessive|{{SITENAME}}}}!',
	'foe_request_body' => 'Hei $1:

$2 juuri listasi sinut vihollisekseen {{GRAMMAR:inessive|{{SITENAME}}}}.  Haluamme varmistua siitä, että te olette oikeasti perivihollisia tai että teillä ainakin on pientä kinaa.

Napsauta allaolevaa linkkiä vahvistaaksesi kaunanne.

$3

Kiitos

---

Hei, etkö enää halua saada sähköpostia meiltä? 

Napsauta $4 ja muuta asetuksiasi poistaaksesi sähköposti-ilmoitukset käytöstä.',

	'friend_accept_subject' => '$1 on hyväksynyt ystävyyspyyntösi {{GRAMMAR:inessive|{{SITENAME}}}}!',
	'friend_accept_body' => 'Hei $1:

$2 on hyväksynyt ystävyyspyyntösi {{GRAMMAR:inessive|{{SITENAME}}}}!

Katso $2:n sivu osoitteessa $3

Kiitos

---

Hei, etkö enää halua saada sähköpostia meiltä? 

Napsauta $4
ja muuta asetuksiasi poistaaksesi sähköposti-ilmoitukset käytöstä.',
	'foe_accept_subject' => 'Sotaa! $1 on hyväksynyt vihollisuuspyyntösi {{GRAMMAR:inessive|{{SITENAME}}}}!',
	'foe_accept_body' => 'Hei $1:

$2 on hyväksynyt vihollisuuspyyntösi {{GRAMMAR:inessive|{{SITENAME}}}}!

Katso $2:n sivu osoitteessa $3

Kiitos

---

Hei, etkö enää halua saada sähköpostia meiltä? 

Napsauta $4
ja muuta asetuksiasi poistaaksesi sähköposti-ilmoitukset käytöstä.',
	'friend_removed_subject' => 'Voi ei! $1 on poistanut sinut ystävälistaltaan {{GRAMMAR:inessive|{{SITENAME}}}}!',
	'friend_removed_body' => 'Hei $1:

$2 on poistanut sinut ystävälistaltaan {{GRAMMAR:inessive|{{SITENAME}}}}!

Kiitos

---

Hei, etkö enää halua saada sähköpostia meiltä? 

Napsauta $4
ja muuta asetuksiasi poistaaksesi sähköposti-ilmoitukset käytöstä.',
	'foe_removed_subject' => 'Jippii! $1 on poistanut sinut vihollislistaltaan {{GRAMMAR:inessive|{{SITENAME}}}}!',
	'foe_removed_body' => 'Hei $1:

$2 on poistanut sinut vihollislistaltaan {{GRAMMAR:inessive|{{SITENAME}}}}!

Ehkäpä teistä tulee vielä ystävät?

Kiitos

---

Hei, etkö enää halua saada sähköpostia meiltä? 

Napsauta $4
ja muuta asetuksiasi poistaaksesi sähköposti-ilmoitukset käytöstä.',
);

/** French (Français)
 * @author Grondin
 * @author IAlex
 */
$messages['fr'] = array(
	'viewrelationships'                                 => 'Voir les relations',
	'viewrelationshiprequests'                          => 'Voir les requêtes des relations',
	'ur-already-submitted'                              => 'Votre demande a été envoyée',
	'ur-error-page-title'                               => 'Oups !',
	'ur-error-title'                                    => 'Houla, vous avez pris un mauvais virage !',
	'ur-error-message-no-user'                          => 'Nous ne pouvons compléter votre requête, car aucun utilisateur ne porte ce nom.',
	'ur-main-page'                                      => 'Accueil',
	'ur-your-profile'                                   => 'Votre profile',
	'ur-backlink'                                       => '&lt; retour vers le profil de $1',
	'ur-friend'                                         => 'ami',
	'ur-foe'                                            => 'ennemi',
	'ur-relationship-count-foes'                        => '$1 a $2 {{PLURAL:$2|ennemi|ennemis}}. En vouloir encore plus ? <a href="$3">Inviter les.</a>',
	'ur-relationship-count-friends'                     => '$1 a $2 {{PLURAL:$2|ami|amis}}. En vouloir encore plus ? <a href="$3">Inviter les.</a>',
	'ur-add-friends'                                    => 'Vouloir plus d’amis ? <a href="$1">Inviter les</a>.',
	'ur-add-friend'                                     => 'Ajouter comme ami',
	'ur-add-foe'                                        => 'Ajouter comme ennemi',
	'ur-add-no-user'                                    => 'Aucun utilisateur sélectionné. Veuiller requérir des amis ou des ennemis au travers du lien correct.',
	'ur-add-personal-message'                           => 'Ajouter un message personnel',
	'ur-remove-relationship-friend'                     => 'Enlever comme ami',
	'ur-remove-relationship-foe'                        => 'Enlever comme ennemi',
	'ur-give-gift'                                      => 'Envoyer un cadeau',
	'ur-previous'                                       => 'préc.',
	'ur-next'                                           => 'suiv.',
	'ur-remove-relationship-title-foe'                  => 'Voulez-vouz enlever $1 comme votre ennemi ?',
	'ur-remove-relationship-title-confirm-foe'          => 'Vous avez enlevé $1 de vos ennemis',
	'ur-remove-relationship-title-friend'               => 'Voulez-vous enlever $1 comme votre ami ?',
	'ur-remove-relationship-title-confirm-friend'       => 'Vous avez enlevé $1 de vos amis.',
	'ur-remove-relationship-message-foe'                => 'vous avez requis la suppression de $1 en tant qu’ennemi, appuyez sur « $2 » pour confirmer.',
	'ur-remove-relationship-message-confirm-foe'        => 'Vous avez enlevé $1 avec succès de vos ennemis.',
	'ur-remove-relationship-message-friend'             => 'Vous avez requis la suppression de $1 de vos amis, appuyer sur « $2 » pour confirmer.',
	'ur-remove-relationship-message-confirm-friend'     => 'Vous enlevé $1 avec succès de vos amis.',
	'ur-remove-error-message-no-relationship'           => "Vous n'avez aucune relation avec $1.",
	'ur-remove-error-message-remove-yourself'           => 'Vous ne pouvez pas vous supprimer vous-même.',
	'ur-remove-error-message-pending-request'           => 'Vous avez une requête de $1 en cours avec $2.',
	'ur-remove-error-message-pending-foe-request'       => 'Vous avez, en cours, une requête d’un ennemi avec $1.',
	'ur-remove-error-message-pending-friend-request'    => 'Vous avez, en cours, une requête d’un ami avec $1.',
	'ur-remove-error-not-loggedin'                      => 'Vous devez être en session pour supprimer un $1.',
	'ur-remove-error-not-loggedin-foe'                  => 'Vous devez être connecté pour enlever un ennemi.',
	'ur-remove-error-not-loggedin-friend'               => 'Vous devez être connecté pour enlever un ami.',
	'ur-remove'                                         => 'Enlever',
	'ur-cancel'                                         => 'Annuler',
	'ur-login'                                          => 'Connexion',
	'ur-add-title-foe'                                  => 'Voulez-vous ajouter $1 parmi vos ennemis ?',
	'ur-add-title-friend'                               => 'Voulez-vous ajouter $1 parmi vos amis ?',
	'ur-add-message-foe'                                => 'Vous être sur le point d’ajouter $1 parmi vos ennemis.
Nous informerons $1 pour confirmer votre rancune.',
	'ur-add-message-friend'                             => 'Vous être sur le point d’ajouter $1 parmi vos amis.
Nous informerons $1 pour confirmer votre amitié.',
	'ur-friendship'                                     => 'amitié',
	'ur-grudge'                                         => 'rancœur',
	'ur-add-button'                                     => 'Ajouter comme $1',
	'ur-add-button-foe'                                 => 'Ajouter comme ennemi',
	'ur-add-button-friend'                              => 'Ajouter comme ami',
	'ur-add-sent-title-foe'                             => 'Vous avez envoyé déclaration d’hostilité à $1 !',
	'ur-add-sent-title-friend'                          => 'Vous avez envoyé déclaration d’amitié à $1 !',
	'ur-add-sent-message-foe'                           => 'Votre requête en hostilité a été envoyé à $1 pour confirmation.
Si $1 confirme votre demande, vous recevrez le suivi par courriel.',
	'ur-add-sent-message-friend'                        => 'Votre requête en amitié a été envoyé à $1 pour confirmation.
Si $1 confirme votre demande, vous recevrez le suivi par courriel.',
	'ur-add-error-message-no-user'                      => 'L’utilisateur que vous être en train d’ajouter n’existe pas.',
	'ur-add-error-message-blocked'                      => 'Vous êtes actuellement bloqué et vous ne pouvez donc ajouter ni amis ni ennemis.',
	'ur-add-error-message-yourself'                     => 'Vous ne pouvez vous-même vous ajouter comme ennemi ou ami.',
	'ur-add-error-message-existing-relationship'        => 'Vous êtes déjà $1 avec $2.',
	'ur-add-error-message-existing-relationship-foe'    => 'Vous êtes déjà l’ennemi de $1.',
	'ur-add-error-message-existing-relationship-friend' => 'vous êtes déjà l’ami de $1.',
	'ur-add-error-message-pending-request-title'        => 'Patience !',
	'ur-add-error-message-pending-friend-request'       => 'Vous avez une demande d’amitié en cours avec $1.
Nous vous notifierons si $1 confirme votre requête.',
	'ur-add-error-message-pending-foe-request'          => 'Vous avez une déclaration d’hostilité en cours avec $1.
Nous vous notifierons si $1 confirme votre requête.',
	'ur-add-error-message-not-loggedin'                 => 'Vous devez être connecté pour ajouter un $1.',
	'ur-add-error-message-not-loggedin-foe'             => 'Vous devez être connecté pour ajouter un ennemi',
	'ur-add-error-message-not-loggedin-friend'          => 'Vous devez être connecté pour ajouter un ami',
	'ur-requests-title'                                 => 'Demandes de relations.',
	'ur-requests-message-foe'                           => '<a href="$1">$2</a> veut être votre ennemi.',
	'ur-requests-message-friend'                        => '<a href="$1">$2</a> veut être votre ami.',
	'ur-accept'                                         => 'Accepter',
	'ur-reject'                                         => 'Rejeter',
	'ur-no-requests-message'                            => 'Vous n’avez aucune requête en ami ou ennemi. Si vous désirez plus d\'amis, <a href="$1">invitez les !</a>',
	'ur-requests-added-message-foe'                     => 'Vous avez ajouté $1 en tant qu’ennemi.',
	'ur-requests-added-message-friend'                  => 'Vous avez ajouté $1 en tant qu’ami.',
	'ur-requests-reject-message-friend'                 => 'Vous avez refusé $1 en tant qu’ami.',
	'ur-requests-reject-message-foe'                    => 'Vous avez refusé $1 en tant qu’ennemi.',
	'ur-title-foe'                                      => 'Liste des ennemis de $1',
	'ur-title-friend'                                   => 'Liste des amis de $1',
	'friend_request_subject'                            => '$1 vous a ajouté comme un ami sur {{SITENAME}} !',
	'friend_request_body'                               => 'Salut $1 :

$2 vous a ajouté comme un ami sur {{SITENAME}}. Nous voulons nous assurer que vous êtes tous deux actuellement amis.

Veuillez cliquer sur ce lien pour confirmer votre amitié :
$3

Merci.

---

Hé ! Voulez-vous vous arrêter de recevoir des courriels de notre part ?

Cliquez $4
et modifiez vos préférences pour désactiver les notifications par courriel.',
	'foe_request_subject'                               => "C'est la guerre ! $1 vous a ajouté comme ennemi sur {{SITENAME}} !",
	'foe_request_body'                                  => 'Salut $1 :

$2 vient juste de vous répertorier comme un ennemi sur {{SITENAME}}. Nous voulons nous assurer que vous êtes vraiement des emmenis mortel ou avoir au moins des griefs l’un envers l’autre/

Veuillez cliquer sur ce lien, pour accepter, à contrecœur, cet état de fait.

$3

Merci

---

Hé ! Voulez-vous vous arrêter de recevoir des courriels de notre part ?

Cliquez $4 et modifiez vos préférences pour désactiver les notifications par courriel.',
	'friend_accept_subject'                             => '$1 a accepté votre requête en amitié sur {{SITENAME}} !',
	'friend_accept_body'                                => 'Salut $1 : 

$2 a accepté votre requête en amitié sur {{SITENAME}} !

Allez sur la page de $2 sur $3

Merci.

---

Hé ! Voulez-vous vous arrêter de recevoir des courriels de notre part ?

Cliquez $4
et modifiez vos préférences pour désactiver les notifications par courriel.',
	'foe_accept_subject'                                => "C'est fait ! $1 a accepté votre déclaration de guerre sur  {{SITENAME}} !",
	'foe_accept_body'                                   => 'Salut $1 : 

$2 a accepté votre déclaration de guerre sur  {{SITENAME}} !

Visitez la page de $2 sur $3.

Merci

---

Hé ! Voulez-vous vous arrêter de recevoir des courriels de notre part ?

Cliquez $4 et modifiez vos préférences pour désactiver les notifications par courriel.',
	'friend_removed_subject'                            => 'Saperlipopette ! $1 vous a retiré de la liste de ses amis sur {{SITENAME}} !',
	'friend_removed_body'                               => 'Salut $1 :

$2 vous a retiré de la liste de ses amis sur {{SITENAME}} !

Merci

---

Hé ! Voulez-vous vous arrêter de recevoir des courriels de notre part ?

Cliquez $4 et modifiez vos préférences pour désactiver les notifications par courriel.',
	'foe_removed_subject'                               => 'Par Jupiter ! $1 vous a retiré de la liste de ses ennemis {{SITENAME}} !',
	'foe_removed_body'                                  => 'Salut $1 :

$2 vous a retiré de la liste de ses ennemis sur {{SITENAME}} !

Ne seriez-vous pas, peut-être, sur le chemin pour devenir amis ?

Merci

---

Hé ! Voulez-vous vous arrêter de recevoir des courriels de notre part ?

Cliquez $4
et modifiez vos préférences pour désactiver les notifications par courriel.',
);

/** Western Frisian (Frysk)
 * @author Snakesteuben
 */
$messages['fy'] = array(
	'ur-main-page' => 'Haadside',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'viewrelationships'                          => 'Ver relación',
	'viewrelationshiprequests'                   => 'Ver solcitudes de relación',
	'ur-already-submitted'                       => 'A súa solicitude foi enviada',
	'ur-error-title'                             => 'Ups, tomou un xiro erróneo!',
	'ur-error-message-no-user'                   => 'Non podemos completar a súa petición porque non existe ningún usuario con ese nome.',
	'ur-main-page'                               => 'Portada',
	'ur-your-profile'                            => 'O seu perfil',
	'ur-backlink'                                => '&lt; Voltar ao perfil de $1',
	'ur-friend'                                  => 'amigo',
	'ur-foe'                                     => 'inimigo',
	'ur-relationship-count'                      => '$1 ten $2 {{PLURAL:$2|$3|$3s}}.',
	'ur-add-friends'                             => '  Quere máis amigos? <a href="$1">Invíteos</a>',
	'ur-add-friend'                              => 'Engadir como amigo',
	'ur-add-foe'                                 => 'Engadir como inimigo',
	'ur-add-no-user'                             => 'Non foi seleccionado ningún usuario.
Por favor, solicite amigos/inimigos a través da ligazón correcta.',
	'ur-add-personal-message'                    => 'Engadir unha mensaxe persoal',
	'ur-remove-relationship'                     => 'Eliminar dos seus $1',
	'ur-give-gift'                               => 'Dar un agasallo',
	'ur-previous'                                => 'anterior',
	'ur-next'                                    => 'seguinte',
	'ur-remove-relationship-title'               => 'Quere eliminar a $1 dos seus $2?',
	'ur-remove-relationship-title-confirm'       => 'Eliminou a $1 dos seus $2',
	'ur-remove-relationship-message'             => 'Solicitou que se eliminase a $1 dos seus $2, prema no botón "$3" para confirmalo.',
	'ur-remove-relationship-message-confirm'     => 'Eliminou con éxito a $1 dos seus $2.',
	'ur-remove-error-message-no-relationship'    => 'Non ten relación con $1.',
	'ur-remove-error-message-remove-yourself'    => 'Non pode eliminarse a si mesmo.',
	'ur-remove-error-message-pending-request'    => 'Ten pendientes $1 solicitudes con $2.',
	'ur-remove-error-not-loggedin'               => 'Ten que acceder ao sistema para eliminar a $1.',
	'ur-remove'                                  => 'Eliminar',
	'ur-cancel'                                  => 'Cancelar',
	'ur-login'                                   => 'Rexistro',
	'ur-add-title'                               => 'Quere engadir a $1 aos seus $2?',
	'ur-add-message'                             => 'Está a engadir a $1 como o ser $2.
Notificaremos a $1 para confirmar a súa $3.',
	'ur-friendship'                              => 'amizade',
	'ur-grudge'                                  => 'rancor',
	'ur-add-button'                              => 'Engadir aos seus $1',
	'ur-add-sent-title'                          => 'Enviamos a súa solicitude $1 a $2!',
	'ur-add-sent-message'                        => 'A súa solicitude $1 foi envidada a $2 para a súa confirmación.
Se $2 a confirma, recibirá unha mensaxe de correo electrónico',
	'ur-add-error-message-no-user'               => 'O usuario que está tentando engadir non existe.',
	'ur-add-error-message-blocked'               => 'Actualmente está bloqueado e non pode engadir amigos nin inimigos.',
	'ur-add-error-message-yourself'              => 'Non pode engadirse a si mesmo como amigo ou inimigo.',
	'ur-add-error-message-existing-relationship' => 'Xa é $1 con $2.',
	'ur-add-error-message-pending-request-title' => 'Paciencia!',
	'ur-add-error-message-pending-request'       => 'Ten pendientes $1 solicitudes con $2.  Notificarémoslle cando $2 confirme a súa solicitude.',
	'ur-add-error-message-not-loggedin'          => 'Ten que acceder ao sistema para engadir un $1',
	'ur-requests-title'                          => 'Solicitudes de relación',
	'ur-requests-message'                        => '<a href="$1">$2</a> quere ser o seu $3.',
	'ur-accept'                                  => 'Aceptar',
	'ur-reject'                                  => 'Rexeitar',
	'ur-no-requests-message'                     => 'Non ten solicitudes de amigo ou inimigo.  Se quere máis amigos, <a href=$1">invíteos!</a>',
	'ur-requests-added-message'                  => 'Engadiu a $1 aos seus $2.',
	'ur-requests-reject-message'                 => 'Rexeitou a $1 para ser o seu $2.',
	'ur-title-foe'                               => 'Listaxe de inimigos de $1',
	'ur-title-friend'                            => 'Listaxe de amigos de $1',
	'friend_request_subject'                     => '$1 engadiuno como amigo en {{SITENAME}}!',
	'friend_request_body'                        => 'Ola $1:

$2 engdiuno como amigo seu en {{SITENAME}}.  Queremos estar seguros de que vostedes dous son amigos actualmente.

Por favor, faga clic nesta ligazón para confirmar a súa amizade:
$3

Grazas

---

Quere deixar de recibir correos electrónicos nosos?

Faga clic $4
e troque as súas configuracións para deshabilitar as notificacións por correo electrónico.',
	'foe_request_subject'                        => 'É a guerra! $1 engadiuno como inimigo seu en {{SITENAME}}!',
	'foe_request_body'                           => 'Ola $1:

$2 engdiuno como inimigo seu en {{SITENAME}}.  Queremos estar seguros de que vostedes dous son inimigos mortais actualmente  ou que teñen, polo menos, un argumento.

Por favor, faga clic nesta ligazón para confirmar a súa inimizade:
$3

Grazas

---

Quere deixar de recibir correos electrónicos nosos?

Faga clic $4
e troque as súas configuracións para deshabilitar as notificacións por correo electrónico.',
	'friend_accept_subject'                      => '$1 aceptou a súa solicitude de amizade en {{SITENAME}}!',
	'friend_accept_body'                         => 'Ola $1:

$2 aceptou a súa solicitude de amizade en {{SITENAME}}!

Comprobe a páxina de $2 en $3

Grazas

---

Quere deixar de recibir correos electrónicos nosos?

Faga clic $4
e troque as súas configuracións para deshabilitar as notificacións por correo electrónico.',
	'foe_accept_subject'                         => 'A cousa está que arde! $1 aceptou a súa solicitude de inimizade en {{SITENAME}}!',
	'foe_accept_body'                            => 'Ola $1:

$2 aceptou a súa solicitude de inimizade en {{SITENAME}}!

Comprobe a páxina de $2 en $3

Grazas

---

Quere deixar de recibir correos electrónicos nosos?

Faga clic $4
e troque as súas configuracións para deshabilitar as notificacións por correo electrónico.',
	'friend_removed_subject'                     => 'Non! $1 eliminouno dos seus amigos en {{SITENAME}}!',
	'friend_removed_body'                        => 'Ola $1:

$2 eliminouno dos seus amigos en {{SITENAME}}!

Grazas

---

Quere deixar de recibir correos electrónicos nosos?

Faga clic $4
e troque as súas configuracións para deshabilitar as notificacións por correo electrónico.',
	'foe_removed_subject'                        => 'Ben! $1 eliminouno dos seus inimigos en {{SITENAME}}!',
	'foe_removed_body'                           => 'Ola $1:

$2 eliminouno dos seus inimigos en {{SITENAME}}!

Estares no bo camiño para convertirvos en amigos?

Grazas

---

Quere deixar de recibir correos electrónicos nosos?

Faga clic $4
e troque as súas configuracións para deshabilitar as notificacións por correo electrónico.',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author AndreasJS
 */
$messages['grc'] = array(
	'ur-login' => 'Συνδεῖσθαι',
);

/** Hakka (Hak-kâ-fa)
 * @author Hakka
 */
$messages['hak'] = array(
	'ur-main-page' => 'Thèu-chông',
);

/** Hawaiian (Hawai`i)
 * @author Singularity
 */
$messages['haw'] = array(
	'ur-remove' => 'Kāpae',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 */
$messages['hi'] = array(
	'ur-main-page' => 'मुखपृष्ठ',
	'ur-remove'    => 'हटायें',
	'ur-cancel'    => 'रद्द करें',
);

/** Hiligaynon (Ilonggo)
 * @author Jose77
 */
$messages['hil'] = array(
	'ur-main-page' => 'Mayor nga Panid',
	'ur-cancel'    => 'Kanselahon',
	'ur-login'     => 'Mag sulod',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'ur-login' => 'Aperir un session',
);

/** Indonesian (Bahasa Indonesia)
 * @author Irwangatot
 */
$messages['id'] = array(
	'ur-cancel' => 'Batalkan',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 */
$messages['jv'] = array(
	'ur-already-submitted'                       => 'Panyuwunan panjenengan wis dikirim',
	'ur-error-title'                             => 'Adhuh, panjenengan salah ménggok!',
	'ur-main-page'                               => 'Kaca utama',
	'ur-your-profile'                            => 'Profil panjenengan',
	'ur-friend'                                  => 'kanca',
	'ur-foe'                                     => 'mungsuh',
	'ur-give-gift'                               => 'Mènèhi bebungah',
	'ur-previous'                                => 'sadurungé',
	'ur-next'                                    => 'sabanjuré',
	'ur-remove'                                  => 'Busak',
	'ur-cancel'                                  => 'Batal',
	'ur-login'                                   => 'Log mlebu',
	'ur-friendship'                              => 'kekancan',
	'ur-add-button'                              => 'Tambah minangka $1',
	'ur-add-error-message-existing-relationship' => 'Panjenengan wis $1 karo $2.',
	'ur-add-error-message-pending-request-title' => 'Tulung sabar sadélok.',
	'ur-add-error-message-not-loggedin'          => 'Panjenengan kudu log mlebu kanggo nambahaké $1',
	'ur-accept'                                  => 'Tampa',
	'ur-reject'                                  => 'Tulak',
	'ur-no-requests-message'                     => 'Panjenengan ora duwé panyuwunan kanca utawa mungsuh.
Yèn panjenengan péngin kanca luwih akèh, <a href="$1">ayo padha diundhang!</a>',
	'foe_request_subject'                        => 'Saiki perang! $1 wis nambahaké panjenengan minangka mungsuh ing {{SITENAME}}!',
	'friend_removed_subject'                     => 'Adhuh! $1 njabel status panjenengan minangka kanca ing {{SITENAME}}!',
	'foe_removed_subject'                        => 'Horé! $1 wis njabel status panjenengan minangka mungsuh ing {{SITENAME}}!',
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

/** Kinaray-a (Kinaray-a)
 * @author Jose77
 */
$messages['krj'] = array(
	'ur-main-page' => 'Pono nga Pahina',
	'ur-cancel'    => 'Kanselar',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'ur-cancel' => 'Draanjevve',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'ur-already-submitted'                       => 'Är Ufro gouf fortgeschéckt',
	'ur-error-title'                             => 'Ups, hei geet et net weider!',
	'ur-main-page'                               => 'Haaptsäit',
	'ur-your-profile'                            => 'Äre Profil',
	'ur-backlink'                                => '&lt; Zréck op de Profil vum $1',
	'ur-friend'                                  => 'Frënd',
	'ur-foe'                                     => 'Géigner',
	'ur-add-personal-message'                    => 'Eng perséinlech Noriicht derbäisetzen',
	'ur-give-gift'                               => 'Cadeau schécken',
	'ur-previous'                                => 'vireg',
	'ur-next'                                    => 'nächst',
	'ur-remove'                                  => 'Ewechhuelen',
	'ur-cancel'                                  => 'Annulléieren',
	'ur-login'                                   => 'Umellen',
	'ur-friendship'                              => 'Frëndschaft',
	'ur-add-error-message-blocked'               => 'Dir sidd elo gespaart a kënnt dofir keng Frënn oder Géigner derbäisetzen.',
	'ur-add-error-message-pending-request-title' => 'Gedold!',
	'ur-accept'                                  => 'Akzeptéieren',
	'ur-reject'                                  => 'Refuséieren',
	'ur-no-requests-message'                     => 'Dir hutt keng Ufroen fir Frënn oder Géigner.
Wann Dir méi Frënn wellt <a href="$1">invitéiert se!</a>',
	'ur-requests-added-message'                  => 'Dir hutt den $1 als äre $2 derbäigesat.',
	'ur-title-friend'                            => 'L!escht vun de Frënn vum $1',
	'friend_request_subject'                     => '$1 huet iech als Frënd op {{SITENAME}} derbäigesat!',
	'foe_request_subject'                        => 'Et ass Krich! $1 huet iech als Géigner op {{SITENAME}} derbàigesat!',
	'friend_accept_subject'                      => '$1 huet är Ufro als Frënd op {{SITENAME}} ugeholl!',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'ur-main-page'                               => 'പ്രധാന താള്‍',
	'ur-friend'                                  => 'സുഹൃത്ത്',
	'ur-add-friends'                             => 'കൂടുതല്‍ സുഹൃത്തുക്കളെ വേണോ? <a href="$1">ക്ഷണിക്കുക</a>',
	'ur-add-friend'                              => 'സുഹൃത്തായി ചേര്‍ക്കുക',
	'ur-previous'                                => 'മുന്‍പുള്ളത്',
	'ur-next'                                    => 'അടുത്തത്',
	'ur-remove-relationship-title'               => 'താങ്കള്‍ക്ക് $1നെ താങ്കളുടെ $2ല്‍ നിന്നു ഒഴിവാക്കണോ?',
	'ur-remove-relationship-title-confirm'       => 'താങ്കള്‍ $1നെ താങ്കളുടെ $2ല്‍ നിന്നു ഒഴിവാക്കിയിരിക്കുന്നു',
	'ur-remove-relationship-message'             => 'താങ്കള്‍ $1നെ താങ്കളുടെ $2ല്‍ നിന്നു ഒഴിവാക്കണമെന്നു അഭ്യര്‍ത്ഥിച്ചിരിക്കുന്നു. സ്ഥിരീകരിക്കുവാന്‍ "$3" അമര്‍ത്തുക.',
	'ur-remove-relationship-message-confirm'     => 'താങ്കള്‍ $1നെ താങ്കളുടെ $2ല്‍ നിന്നു വിജയകരമായി ഒഴിവാക്കിയിരിക്കുന്നു.',
	'ur-remove-error-message-no-relationship'    => 'താങ്കള്‍ക്ക് $1മായി ബന്ധം സ്ഥാപിച്ചിട്ടില്ല.',
	'ur-remove-error-message-remove-yourself'    => 'താങ്കള്‍ക്ക് താങ്കളെത്തന്നെ ഒഴിവാക്കാന്‍ പറ്റില്ല.',
	'ur-remove-error-not-loggedin'               => '$1നെ ഒഴിവാക്കണമെങ്കില്‍ താങ്കള്‍ ലോഗിന്‍ ചെയ്തിരിക്കണം.',
	'ur-remove'                                  => 'നീക്കം ചെയ്യുക',
	'ur-cancel'                                  => 'റദ്ദാക്കുക',
	'ur-login'                                   => 'ലോഗിന്‍',
	'ur-add-title'                               => 'താങ്കള്‍ക്ക് $1നെ താങ്കളുടെ $2 ആയി ചേര്‍ക്കണമോ?',
	'ur-add-message'                             => 'താങ്കള്‍ $1നെ താങ്കളുടെ $2 ആയി ചേര്‍ക്കാന്‍ തുടങ്ങുകയാണ്‌. ഞങ്ങള്‍ $1നു നിങ്ങളുടെ $3 സ്വീകരിക്കുവാനുള്ള അഭ്യര്‍ത്ഥന അയക്കാം.',
	'ur-friendship'                              => 'സുഹൃത്ബന്ധം',
	'ur-add-button'                              => '$1 ആയി ചേര്‍ക്കാം',
	'ur-add-sent-title'                          => 'ഞങ്ങള്‍ താങ്കളുടെ $1 അഭ്യര്‍ത്ഥന $2നു അയച്ചു!',
	'ur-add-error-message-no-user'               => 'താങ്കള്‍ ചേര്‍ക്കുവാന്‍ ശ്രമിക്കുന്ന ഉപയോക്താവ് നിലവിലില്ല.',
	'ur-add-error-message-pending-request-title' => 'കാത്തിരിക്കൂ!',
	'ur-requests-message'                        => '<a href="$1">$2</a>നു താങ്കളുടെ $3 ആവാന്‍ ആഗ്രഹമുണ്ട്.',
	'ur-accept'                                  => 'സ്വീകരിക്കുക',
	'ur-reject'                                  => 'നിരാകരിക്കുക',
	'ur-requests-added-message'                  => 'താങ്കള്‍ $1നെ താങ്കളുടെ $2 ആയി ചേര്‍ത്തു.',
	'ur-requests-reject-message'                 => 'താങ്കള്‍ $1നെ താങ്കളുടെ $2 ആവാന്‍ അനുവദിച്ചില്ല.',
	'ur-title-friend'                            => '$1ന്റെ സുഹൃത്തുക്കളുടെ പട്ടിക',
	'friend_request_subject'                     => '$1 താങ്കളെ {{SITENAME}} സം‌രംഭത്തില്‍ സുഹൃത്തായി ചേര്‍ത്തിരിക്കുന്നു!',
	'friend_accept_subject'                      => '{{SITENAME}} സം‌രംഭത്തിലുള്ള താങ്കളുടെ സൗഹൃദ അഭ്യര്‍ത്ഥന $1 സ്വീകരിച്ചു!',
);

/** Marathi (मराठी)
 * @author Kaustubh
 * @author Mahitgar
 */
$messages['mr'] = array(
	'viewrelationships'                          => 'नाते पहा',
	'viewrelationshiprequests'                   => 'नाते मागण्या पहा',
	'ur-already-submitted'                       => 'तुमची मागणी पाठविलेली आहे',
	'ur-error-title'                             => 'बापरे, तुम्ही चुकीच्या ठिकाणी आलात!',
	'ur-error-message-no-user'                   => 'तुमची मागणी पूर्ण करता येत नाही, कारण या नावाचा सदस्य अस्तित्वात नाही.',
	'ur-main-page'                               => 'मुखपृष्ठ',
	'ur-your-profile'                            => 'तुमचे प्रोफाइल',
	'ur-backlink'                                => '&lt; $1च्या प्रोफाइलकडे परत',
	'ur-friend'                                  => 'मित्र',
	'ur-foe'                                     => 'शत्रू',
	'ur-relationship-count'                      => ' $1 कडे  $2 {{PLURAL:$2|$3|$3s}} आहेत.',
	'ur-add-friends'                             => 'अजून मित्र पाहिजेत? <a href="$1">त्यांना बोलवा</a>',
	'ur-add-friend'                              => 'मित्र म्हणून वाढवा',
	'ur-add-foe'                                 => 'शत्रू म्हणून वाढवा',
	'ur-add-no-user'                             => 'सदस्य निवडलेला नाही.
योग्य दुव्यावरून मित्र/शत्रू मागवा.',
	'ur-add-personal-message'                    => 'एक वैयक्तिक संदेश लिहा',
	'ur-remove-relationship'                     => '$1 म्हणून काढा',
	'ur-give-gift'                               => 'एक भेट द्या',
	'ur-previous'                                => 'मागचा',
	'ur-next'                                    => 'पुढील',
	'ur-remove-relationship-title'               => 'तुम्ही $1ला $2 म्हणून काढू इच्छिता का?',
	'ur-remove-relationship-title-confirm'       => 'तुम्ही $1ला $2 म्हणून काढलेले आहे',
	'ur-remove-relationship-message'             => 'तुम्ही $1ला $2 म्हणून काढण्याची मागणी केलेली आहे, निश्चित करण्यासाठी "$3" दाबा.',
	'ur-remove-relationship-message-confirm'     => 'तुम्ही $1ला $2 म्हणून यशस्वीरित्या काढलेले आहे',
	'ur-remove-error-message-no-relationship'    => 'तुमचे $1शी नाते नाही.',
	'ur-remove-error-message-remove-yourself'    => 'तुम्ही स्वत:लाच काढू शकत नाही.',
	'ur-remove-error-message-pending-request'    => 'तुमची एक मागणी $1, $2 कडे प्रलंबित आहे.',
	'ur-remove-error-not-loggedin'               => '$1 ला काढण्यासाठी तुम्ही प्रवेश केलेला असणे आवश्यक आहे.',
	'ur-remove'                                  => 'काढा',
	'ur-cancel'                                  => 'रद्द करा',
	'ur-login'                                   => 'प्रवेश',
	'ur-add-title'                               => 'तुम्ही $1ला $2 म्हणून वाढवू इच्छिता का?',
	'ur-add-message'                             => 'तुम्ही $1ला $2 म्हणून वाढवित आहात.
आम्ही $1ला तुमची $3 निश्चित करायला सांगू.',
	'ur-friendship'                              => 'मैत्री',
	'ur-grudge'                                  => 'ग्रज (grudge)',
	'ur-add-button'                              => '$1 म्हणून वाढवा',
	'ur-add-sent-title'                          => 'आम्ही तुमची $1 मागणी $2 ला पाठविलेली आहे!',
	'ur-add-sent-message'                        => 'तुमची $1 मागणी $2 ला निश्चितीकरिता पाठविलेली आहे.
जर $2 ने निश्चिती केली तर तुम्हाला एक इ-मेल मिळेल',
	'ur-add-error-message-no-user'               => 'तुम्ही वाढवू इच्छित असलेला सदस्य अस्तित्वात नाही.',
	'ur-add-error-message-blocked'               => 'तुम्हाला सध्या ब्लॉक करण्यात आलेले आहे व तुम्ही मित्र किंवा शत्रू वाढवू शकत नाही.',
	'ur-add-error-message-yourself'              => 'तुम्ही स्वत:लाच मित्र किंवा शत्रू म्हणून वाढवू शकत नाही.',
	'ur-add-error-message-existing-relationship' => 'तुम्ही $2 बरोबर अगोदरच $1 आहात.',
	'ur-add-error-message-pending-request-title' => 'वाटपहा!',
	'ur-add-error-message-pending-request'       => 'तुमची $1 मागणी $2 कडे निश्चितीकरिता प्रलंबित आहे.
जर $2 ने निश्चिती केली तर तुम्हाला एक इ-मेल मिळेल',
	'ur-add-error-message-not-loggedin'          => '$1ला वाढविण्यासाठी तुम्ही प्रवेश केलेला असणे आवश्यक आहे',
	'ur-requests-title'                          => 'नाते मागण्या',
	'ur-requests-message'                        => '<a href="$1">$2</a> तुमचा $3 होऊ इच्छितो.',
	'ur-accept'                                  => 'स्विकारा',
	'ur-reject'                                  => 'अव्हेर',
	'ur-no-requests-message'                     => 'तुम्हाला एकही शत्रू अथवा मित्र मागणी आलेली नाही.
जर तुम्हाला अजून मित्र हवे असतील, तर <a href="$1">त्यांना बोलवा!</a>',
	'ur-requests-added-message'                  => 'तुम्ही $1ला $2 म्हणून वाढविलेले आहे',
	'ur-requests-reject-message'                 => 'तुम्ही $1ला $2 म्हणून नाकारलेले आहे',
	'ur-title-foe'                               => '$1ची शत्रू यादी',
	'ur-title-friend'                            => '$1ची मित्र यादी',
	'friend_request_subject'                     => '$1 ने {{SITENAME}} वर तुम्हाला मित्र म्हणून वाढविलेले आहे!',
	'friend_request_body'                        => 'नमस्कार $1:

$2 ने तुम्हांला {{SITENAME}} वर मित्र म्हणून वाढविलेले आहे. आम्ही खात्री करू इच्छितो की तुम्ही खरोखरच मित्र आहात.

कृपया मैत्रीची निश्चिती करण्यासाठी खालील दुव्यावर टिचकी मारा:
$3

धन्यवाद

---

आमच्या कडून इमेल यायला नको आहे?

इथे टिचकी द्या $4
व इमेल सूचनांच्या तुमच्या पसंती बदला.',
	'foe_request_subject'                        => 'हे युद्ध आहे! $1ने तुम्हाला {{SITENAME}} वर शत्रू म्हणून वाढविलेले आहे!',
	'foe_request_body'                           => 'नमस्कार $1:

$2 ने तुम्हांला {{SITENAME}} वर शत्रू म्हणून वाढविलेले आहे. आम्ही खात्री करू इच्छितो की तुम्ही खरोखरच शत्रू आहात किंवा तुमच्यामध्ये मतभेद आहेत.

कृपया शत्रूत्वाची निश्चिती करण्यासाठी खालील दुव्यावर टिचकी मारा:
$3

धन्यवाद

---

आमच्या कडून इमेल यायला नको आहे?

इथे टिचकी द्या $4
व इमेल सूचनांच्या तुमच्या पसंती बदला.',
	'friend_accept_subject'                      => '$1ने तुमची {{SITENAME}} वरची मित्रत्वाची मागणी स्वीकारलेली आहे!',
	'friend_accept_body'                         => 'नमस्कार $1:

$2 ने तुम्हांला {{SITENAME}} वर मित्र म्हणून स्वीकारलेले आहे!

$2चे पान $3 इथे पहा.

धन्यवाद

---

आमच्या कडून इमेल यायला नको आहे?

इथे टिचकी द्या $4
व इमेल सूचनांच्या तुमच्या पसंती बदला.',
	'foe_accept_subject'                         => 'युद्ध सुरू!$1ने तुमची {{SITENAME}} वरची मित्रत्वाची मागणी स्वीकारलेली आहे!',
	'foe_accept_body'                            => 'नमस्कार $1:

$2 ने तुम्हांला {{SITENAME}} वर शत्रू म्हणून स्वीकारलेले आहे!

$2चे पान $3 इथे पहा.

धन्यवाद

---

आमच्या कडून इमेल यायला नको आहे?

इथे टिचकी द्या $4
व इमेल सूचनांच्या तुमच्या पसंती बदला.',
	'friend_removed_subject'                     => 'बापरे! $1 ने {{SITENAME}} वर तुम्हाला मित्र म्हणून काढलेले आहे!',
	'friend_removed_body'                        => 'नमस्कार $1:

$2 ने तुम्हांला {{SITENAME}} वर मित्र म्हणून काढलेले आहे!

धन्यवाद

---

आमच्या कडून इमेल यायला नको आहे?

इथे टिचकी द्या $4
व इमेल सूचनांच्या तुमच्या पसंती बदला.',
	'foe_removed_subject'                        => 'अरे वा! $1ने तुम्हाला {{SITENAME}} वर शत्रू म्हणून काढलेले आहे!',
	'foe_removed_body'                           => 'नमस्कार $1:

	$2 ने तुम्हांला {{SITENAME}} वर शत्रू म्हणून काढलेले आहे!

तुम्ही दोघे मित्रत्वाच्या मार्गावर निघालेले आहात का?

धन्यवाद

---

आमच्या कडून इमेल यायला नको आहे?

इथे टिचकी द्या $4
व इमेल सूचनांच्या तुमच्या पसंती बदला.',
);

/** Nahuatl (Nahuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'ur-next'   => 'niman',
	'ur-cancel' => 'Ticcuepāz',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'ur-main-page'                               => 'Hööftsiet',
	'ur-friend'                                  => 'Fründ',
	'ur-foe'                                     => 'Feend',
	'ur-add-friend'                              => 'As Fründ tofögen',
	'ur-add-foe'                                 => 'As Feend tofögen',
	'ur-give-gift'                               => 'Geschenk maken',
	'ur-cancel'                                  => 'Afbreken',
	'ur-friendship'                              => 'Fründschop',
	'ur-add-button'                              => 'As $1 tofögen',
	'ur-add-error-message-pending-request-title' => 'Geduld!',
	'ur-accept'                                  => 'Annehmen',
	'ur-reject'                                  => 'Afwiesen',
	'ur-title-foe'                               => '$1 sien Feendenlist',
	'ur-title-friend'                            => '$1 sien Frünnlist',
);

/** Dutch (Nederlands)
 * @author Siebrand
 * @author SPQRobin
 */
$messages['nl'] = array(
	'viewrelationships'                                 => 'Connecties bekijken',
	'viewrelationshiprequests'                          => 'Connectieverzoeken bekijken',
	'ur-already-submitted'                              => 'Uw verzoek is verzonden',
	'ur-error-page-title'                               => 'Oops.',
	'ur-error-title'                                    => 'U hebt een verkeerde afslag genomen.',
	'ur-error-message-no-user'                          => 'We kunnen uw verzoek niet afhandelen omdat de gebruiker niet bestaat.',
	'ur-main-page'                                      => 'Hoofdpagina',
	'ur-your-profile'                                   => 'Uw profiel',
	'ur-backlink'                                       => "&lt; Terug naar $1's profiel",
	'ur-friend'                                         => 'vriend',
	'ur-foe'                                            => 'tegenstander',
	'ur-relationship-count-foes'                        => '$1 heeft $2 {{PLURAL:$2|tegenstander|tegenstanders}}.
Behoefte aan meer tegenstanders?
<a href="$3">Nodig ze uit</a>.',
	'ur-relationship-count-friends'                     => '$1 heeft $2 {{PLURAL:$2|vriend|vrienden}}.
Behoefte aan meer vrienden?
<a href="$3">Nodig ze uit</a>.',
	'ur-add-friends'                                    => 'Wilt u meer vrienden? <a href="$1">Nodig ze uit</a>',
	'ur-add-friend'                                     => 'Als vriend toevoegen',
	'ur-add-foe'                                        => 'Als tegenstander toevoegen',
	'ur-add-no-user'                                    => 'Er is geen gebruiker geselecteerd.
Maak verzoeken voor vrienden/tegenstanders alstublieft via de daarvoor bedoelde link.',
	'ur-add-personal-message'                           => 'Persoonlijk bericht toevoegen',
	'ur-remove-relationship-friend'                     => 'Als vriend verwijderen',
	'ur-remove-relationship-foe'                        => 'Als tegenstander verwijderen',
	'ur-give-gift'                                      => 'Presentje geven',
	'ur-previous'                                       => 'vorige',
	'ur-next'                                           => 'volgende',
	'ur-remove-relationship-title-foe'                  => 'Wilt u $1 verwijderen als uw tegenstander?',
	'ur-remove-relationship-title-confirm-foe'          => 'U hebt $1 verwijderd als uw tegenstander',
	'ur-remove-relationship-title-friend'               => 'Wilt u $1 verwijderen als uw vriend?',
	'ur-remove-relationship-title-confirm-friend'       => 'U hebt $1 verwijderd als uw vriend',
	'ur-remove-relationship-message-foe'                => 'U wilt $1 verwijderen als uw tegenstander.
Klik op "$2" om dit te bevestigen.',
	'ur-remove-relationship-message-confirm-foe'        => 'U hebt $1 als tegenstander verwijderd.',
	'ur-remove-relationship-message-friend'             => 'U wilt $1 verwijderen als uw vriend.
Klik op "$2" om dit te bevestigen.',
	'ur-remove-relationship-message-confirm-friend'     => 'U hebt $1 als tegenstander vriend.',
	'ur-remove-error-message-no-relationship'           => 'U hebt geen connectie met $1.',
	'ur-remove-error-message-remove-yourself'           => 'U kunt uzelf niet verwijderen.',
	'ur-remove-error-message-pending-request'           => 'U hebt een openstaand connectieverzoek als $1 bij $2.',
	'ur-remove-error-message-pending-foe-request'       => 'U hebt een openstaand tegenstandersverzoek van $1.',
	'ur-remove-error-message-pending-friend-request'    => 'U hebt een openstaand vriendschapsverzoek van $1.',
	'ur-remove-error-not-loggedin'                      => 'U moet aangemeld zijn om een $1 te kunnen verwijderen.',
	'ur-remove-error-not-loggedin-foe'                  => 'U moet aangemeld zijn om een tegenstander te verwijderen.',
	'ur-remove-error-not-loggedin-friend'               => 'U moet aangemeld zijn om een vriend te verwijderen.',
	'ur-remove'                                         => 'Verwijderen',
	'ur-cancel'                                         => 'Annuleren',
	'ur-login'                                          => 'Aanmelden',
	'ur-add-title-foe'                                  => 'Wilt u $1 toevoegen als tegenstander?',
	'ur-add-title-friend'                               => 'Wilt u $1 toevoegen als vriend?',
	'ur-add-message-foe'                                => 'U wilt $1 toevoegen als tegenstander.
$1 wordt hiervan op de hoogte gesteld.',
	'ur-add-message-friend'                             => 'U wilt $1 toevoegen als vriend.
$1 wordt hiervan op de hoogte gesteld.',
	'ur-friendship'                                     => 'vriendschap',
	'ur-grudge'                                         => 'wrok',
	'ur-add-button'                                     => 'Als $1 toevoegen',
	'ur-add-button-foe'                                 => 'Als tegenstander toevoegen',
	'ur-add-button-friend'                              => 'Als vriend toevoegen',
	'ur-add-sent-title-foe'                             => 'Uw tegenstandersverzoek is verstuurd aan $1.',
	'ur-add-sent-title-friend'                          => 'Uw vriendschapsverzoek is verstuurd aan $1.',
	'ur-add-sent-message-foe'                           => 'Uw tegenstandersverzoek is ter bevestiging verstuurd aan $1.
Als $1 uw verzoek bevestigt, ontvangt u daar een e-mail over.',
	'ur-add-sent-message-friend'                        => 'Uw vriendschapsverzoek is ter bevestiging verstuurd aan $1.
Als $1 uw verzoek bevestigt, ontvangt u daar een e-mail over.',
	'ur-add-error-message-no-user'                      => 'De gebruiker die u probeert toe te voegen bestaat niet.',
	'ur-add-error-message-blocked'                      => 'U bent geblokkeerd en kunt geen vrienden of tegenstanders toevoegen.',
	'ur-add-error-message-yourself'                     => 'U kunt uzelf niet als vriend of tegenstander toevoegen.',
	'ur-add-error-message-existing-relationship'        => 'U bent al $1 bij $2.',
	'ur-add-error-message-existing-relationship-foe'    => 'U bent al bevriend met $1.',
	'ur-add-error-message-existing-relationship-friend' => '$1 is al uw tegenstander.',
	'ur-add-error-message-pending-request-title'        => 'Even geduld alstublieft.',
	'ur-add-error-message-pending-friend-request'       => 'U hebt een openstaand vriendschapsverzoek bij $1.
U wordt op de hoogte gesteld als $1 uw verzoek bevestigt.',
	'ur-add-error-message-pending-foe-request'          => 'U hebt een openstaand tegenstandersverzoek bij $1.
U wordt op de hoogte gesteld als $1 uw verzoek bevestigt.',
	'ur-add-error-message-not-loggedin'                 => 'U moet aangemeld zijn om een $1 toe te voegen',
	'ur-add-error-message-not-loggedin-foe'             => 'U moet aangemeld zijn om een tegenstander toe te kunnen voegen',
	'ur-add-error-message-not-loggedin-friend'          => 'U moet aangemeld zijn om een vriend toe te kunnen voegen',
	'ur-requests-title'                                 => 'Connectieverzoeken',
	'ur-requests-message-foe'                           => '<a href="$1">$2</a> wil uw tegenstander zijn.',
	'ur-requests-message-friend'                        => '<a href="$1">$2</a> wil uw vriend zijn.',
	'ur-accept'                                         => 'Aanvaarden',
	'ur-reject'                                         => 'Weigeren',
	'ur-no-requests-message'                            => 'U hebt geen uitstaande verzoeken voor vrienden of tegenstanders. Als u meer vrienden wilt, <a href="$1">nodig ze dan uit!</a>',
	'ur-requests-added-message-foe'                     => 'U hebt $1 toegevoegd als tegenstander.',
	'ur-requests-added-message-friend'                  => 'U hebt $1 toegevoegd als uw vriend.',
	'ur-requests-reject-message-friend'                 => 'U hebt $1 geweigerd als vriend.',
	'ur-requests-reject-message-foe'                    => 'U hebt $1 geweigerd als tegenstander.',
	'ur-title-foe'                                      => 'Tegenstanderslijst van $1',
	'ur-title-friend'                                   => 'Vriendenlijst van $1',
	'friend_request_subject'                            => '$1 heeft u als vriend toegevoegd op {{SITENAME}}.',
	'friend_request_body'                               => 'Hallo $1.

$2 heeft u als vriend toegevoegd op {{SITENAME}}. We willen graag bevestiging dat u echt bevriend bent.

Klik op de onderstaande link om uw vriendschap te bevestigen:
$3

Bedankt.
---

Wilt u niet langer e-mails van ons ontvangen?

Klik $4
en wijzig uw instellingen om e-mailberichten uit te schakelen.',
	'foe_request_subject'                               => '$1 heeft u toegevoegd als tegenstander op {{SITENAME}}!',
	'foe_request_body'                                  => 'Hallo $1.

$2 heeft u als tegenstander toegevoegd op {{SITENAME}}. We willen graag bevestiging dat u echt tegenstanders bent of in ieder geval gebrouilleerd bent.

Klik op de onderstaande link om uw animositeit te bevestigen:
$3

Bedankt.
---

Wilt u niet langer e-mails van ons ontvangen?

Klik $4
en wijzig uw instellingen om e-mailberichten uit te schakelen.',
	'friend_accept_subject'                             => '$1 heeft uw verzoek om vrienden te worden op {{SITENAME}} aanvaard.',
	'friend_accept_body'                                => "Hallo $1.

$2 heeft u als vriend geaccepteerd op {{SITENAME}}.

U kunt $2's pagina bekijken op $3

Bedankt.
---

Wilt u niet langer e-mails van ons ontvangen?

Klik $4
en wijzig uw instellingen om e-mailberichten uit te schakelen.",
	'foe_accept_subject'                                => '$1 heeft u als tegenstander aanvaard op {{SITENAME}}.',
	'foe_accept_body'                                   => "Hallo $1.

$2 heeft u als tegenstander bevestigd op {{SITENAME}}.

U kunt $2's pagina bekijken op $3

Bedankt.
---

Wilt u niet langer e-mails van ons ontvangen?

Klik $4
en wijzig uw instellingen om e-mailberichten uit te schakelen.",
	'friend_removed_subject'                            => '$1 heeft u helaas verwijderd als vriend op {{SITENAME}}!',
	'friend_removed_body'                               => 'Hallo $1.

$2 heeft u als vriend verwijderd op {{SITENAME}}.

Bedankt.
---

Wilt u niet langer e-mails van ons ontvangen?

Klik $4
en wijzig uw instellingen om e-mailberichten uit te schakelen.',
	'foe_removed_subject'                               => '$1 heeft u verwijderd als tegenstander op {{SITENAME}}!',
	'foe_removed_body'                                  => 'Hallo $1.

$2 heeft u als tegenstander verwijderd op {{SITENAME}}.

Wellicht bent u op weg om vrienden te worden?

Bedankt.
---

Wilt u niet langer e-mails van ons ontvangen?

Klik $4
en wijzig uw instellingen om e-mailberichten uit te schakelen.',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Jon Harald Søby
 */
$messages['nn'] = array(
	'ur-main-page' => 'Hovudside',
	'ur-next'      => 'neste',
	'ur-remove'    => 'Fjern',
	'ur-cancel'    => 'Avbryt',
	'ur-login'     => 'Logg inn',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'viewrelationships'                                 => 'Vis forbindelse',
	'viewrelationshiprequests'                          => 'Vis forespørsler om forbindelse',
	'ur-already-submitted'                              => 'Forespørselen din har blitt sendt',
	'ur-error-page-title'                               => 'Ops!',
	'ur-error-title'                                    => 'Ops, du svingte feil.',
	'ur-error-message-no-user'                          => 'Vi kan ikke fullføre forespørselen din fordi det ikke finnes noen brukere ved dette navnet.',
	'ur-main-page'                                      => 'Hovedside',
	'ur-your-profile'                                   => 'Profilen din',
	'ur-backlink'                                       => '&lt; Tilbake til profilen til $1',
	'ur-friend'                                         => 'venn',
	'ur-foe'                                            => 'fiende',
	'ur-relationship-count-foes'                        => '$1 har $2 {{PLURAL:$2|fiende|fiender}}. Flere fiender? <a href="$3">Inviter dem.</a>',
	'ur-relationship-count-friends'                     => '$1 har $2 {{PLURAL:$2|venn|venner}}. Flere venner? <a href="$3">Inviter dem.</a>',
	'ur-add-friends'                                    => 'Vil du ha flere venner? <a href="$1">Inviter dem</a>',
	'ur-add-friend'                                     => 'Legg til som venn',
	'ur-add-foe'                                        => 'Legg til som fiende',
	'ur-add-no-user'                                    => 'Ingen bruker valgt. Vennligst legg til venner eller fiender med den korrekte lenken.',
	'ur-add-personal-message'                           => 'Legg til en personlig beskjed',
	'ur-remove-relationship-friend'                     => 'Fjern fra venner',
	'ur-remove-relationship-foe'                        => 'Fjern fra fiender',
	'ur-give-gift'                                      => 'Gi gave',
	'ur-previous'                                       => 'forrige',
	'ur-next'                                           => 'neste',
	'ur-remove-relationship-title-foe'                  => 'Vil du fjerne $1 fra fiender?',
	'ur-remove-relationship-title-confirm-foe'          => 'Du har fjernet $1 fra fiender',
	'ur-remove-relationship-title-friend'               => 'Vil du fjerne $1 fra venner?',
	'ur-remove-relationship-title-confirm-friend'       => 'Du har fjernet $1 fra venner',
	'ur-remove-relationship-message-foe'                => 'Du har spurt om å fjerne $1 fra fiender, trykk «$2» for å bekrefte.',
	'ur-remove-relationship-message-confirm-foe'        => 'Du har fjernet $1 fra fiender.',
	'ur-remove-relationship-message-friend'             => 'Du har spurt om å fjerne $1 fra venner, trykk «$2» for å bekrefte.',
	'ur-remove-relationship-message-confirm-friend'     => 'Du har fjernet $1 fra venner.',
	'ur-remove-error-message-no-relationship'           => 'Du har ingen forbindelse med $1.',
	'ur-remove-error-message-remove-yourself'           => 'Du kan ikke fjerne deg selv.',
	'ur-remove-error-message-pending-request'           => 'Du har en ventende forespørsel om å bli $1 med $2 hos $2.',
	'ur-remove-error-message-pending-foe-request'       => 'Du har en ventende fiendeforespørsel hos $1.',
	'ur-remove-error-message-pending-friend-request'    => 'Du har en ventende venneforespørsel hos $1.',
	'ur-remove-error-not-loggedin'                      => 'Du må logge inn for å fjerne en $1.',
	'ur-remove-error-not-loggedin-foe'                  => 'Du må være logget inn for å fjerne en fiende.',
	'ur-remove-error-not-loggedin-friend'               => 'Du må være logget inn for å fjerne en venn.',
	'ur-remove'                                         => 'Fjern',
	'ur-cancel'                                         => 'Avbryt',
	'ur-login'                                          => 'Logg inn',
	'ur-add-title-foe'                                  => 'Vil du legge til $1 som fiende?',
	'ur-add-title-friend'                               => 'Vil du legge til $1 som venn?',
	'ur-add-message-foe'                                => 'Du er i ferd med å legge til $1 som fiende.
Vi vil sende $1 en melding for å bekrefte fiendeskapet.',
	'ur-add-message-friend'                             => 'Du er i ferd med å legge til $1 som venn.
Vi vil sende $1 en melding for å bekrefte vennskapet.',
	'ur-friendship'                                     => 'vennskap',
	'ur-grudge'                                         => 'fiendeskap',
	'ur-add-button'                                     => 'Legg til som $1',
	'ur-add-button-foe'                                 => 'Legg til som fiende',
	'ur-add-button-friend'                              => 'Legg til som venn',
	'ur-add-sent-title-foe'                             => 'Vi har sendt fiendeforespørselen din til $1.',
	'ur-add-sent-title-friend'                          => 'Vi har sendt venneforespørselen din til $1.',
	'ur-add-sent-message-foe'                           => 'Fiendeforespørselen din har blitt sendt til $1 for bekreftelse.
Om $1 bekrefter forespørselen din vil du motta en oppfølgingsmelding.',
	'ur-add-sent-message-friend'                        => 'Venneforespørselen din har blitt sendt til $1 for bekreftelse.
Om $1 bekrefter forespørselen din vil du motta en oppfølgingsmelding.',
	'ur-add-error-message-no-user'                      => 'Brukeren du prøvde å legge til finnes ikke.',
	'ur-add-error-message-blocked'                      => 'Du er blokkert, og kan ikke legge til venner eller fiender.',
	'ur-add-error-message-yourself'                     => 'Du kan ikke legge til deg selv som venn eller fiende.',
	'ur-add-error-message-existing-relationship'        => 'Du er allerede $1 med $2.',
	'ur-add-error-message-existing-relationship-foe'    => 'Du er allerede fiende med $1.',
	'ur-add-error-message-existing-relationship-friend' => 'Du er allerede venn med $1.',
	'ur-add-error-message-pending-request-title'        => 'Tålmodighet ...',
	'ur-add-error-message-pending-friend-request'       => 'Du har en ventende venneforespørsel hos $1.
Vi vil gi deg en melding når $1 bekrefter forespørselen din.',
	'ur-add-error-message-pending-foe-request'          => 'Du har en ventende fiendeforespørsel hos $1.
Vi vil gi deg en melding når $1 bekrefter forespørselen din.',
	'ur-add-error-message-not-loggedin'                 => 'Du må være logget inn for å legge til en $1',
	'ur-add-error-message-not-loggedin-foe'             => 'Du må være logget inn for å legge til en fiende',
	'ur-add-error-message-not-loggedin-friend'          => 'Du må være logget inn for å legge til en venn',
	'ur-requests-title'                                 => 'Forbindelsesforespørsler',
	'ur-requests-message-foe'                           => '<a href="$1">$2</a> ønsker å bli fienden din.',
	'ur-requests-message-friend'                        => '<a href="$1">$2</a> ønsker å bli venn med deg.',
	'ur-accept'                                         => 'Godta',
	'ur-reject'                                         => 'Avvis',
	'ur-no-requests-message'                            => 'Du har ingen venne- eller fiendeforespørsler. Om du vil ha flere venner, <a href="$1">inviter dem</a>!',
	'ur-requests-added-message-foe'                     => 'Du har lagt til $1 som fiende.',
	'ur-requests-added-message-friend'                  => 'Du har lagt til $1 som venn.',
	'ur-requests-reject-message-friend'                 => 'Du har avvist venneforespørselen fra $1.',
	'ur-requests-reject-message-foe'                    => 'Du har avvist fiendeforespørselen til $1.',
	'ur-title-foe'                                      => '$1s fiendeliste',
	'ur-title-friend'                                   => '$1s venneliste',
	'friend_request_subject'                            => '$1 har lagt deg til som venn på {{SITENAME}}!',
	'friend_request_body'                               => 'Hei, $1.

$2 har lagt deg til som venn på {{SITENAME}}. Vi vil være sikre på at dere faktisk er venner.

Følg denne lenken for å bekrefte vennskapet deres:
$3

Takk

---

Vil du ikke motta flere e-poster fra oss?

Klikk $4 og endre innstillingene dine for å slå av e-postbeskjeder.',
	'foe_request_subject'                               => 'Det er krig! $1 har lagt deg til som fiende på {{SITENAME}}!',
	'foe_request_body'                                  => 'Hei, $1.

$2 har lagt deg til som fiende på {{SITENAME}}. Vi vil forsikre oss om at dere faktisk er svorne fiender &ndash; eller i hvert fall krangler.

Følg lenken nedenunder for å bekrefte fiendeskapet.

$3

Takk

---

Vil du ikke motta flere e-poster fra oss?

Klikk $4
og endre innstillingene dine for ikke å motta flere slike e-poster.',
	'friend_accept_subject'                             => '$1 har godtatt din venneforespørsel på {{SITENAME}}.',
	'friend_accept_body'                                => 'Hei, $1.

$2 har godtatt din venneforespørsel på {{SITENAME}}.

Sjekk ut siden til $2 på $3.

Takk.

---

Vil du ikke motta flere e-poster fra oss??

Klikk $4 og endre innstillingene dine for å slå av e-postbeskjeder.',
	'foe_accept_subject'                                => '$1 har godtatt din fiendeforespørsel på {{SITENAME}}.',
	'foe_accept_body'                                   => 'Hei, $1.

$2 har godtatt din fiendeforespørsel på {{SITENAME}}.

Sjekk ut siden til $2 på $3

Takk

---

Vil du ikke motta flere e-poster fra oss?

Klikk $4 og endre innstillingene dine for å slå av e-postmeldinger.',
	'friend_removed_subject'                            => 'Å nei! $1 har fjernet deg som venn på {{SITENAME}}.',
	'friend_removed_body'                               => 'Hei, $1

$2 har fjernet deg som venn på {{SITENAME}}.

---

Vil du ikke motta flere e-poster fra oss?

Klikk $4 og endre innstillingene dine for å slå av e-postbeskjeder.',
	'foe_removed_subject'                               => 'Jippi! $1 har fjernet deg som fiende på {{SITENAME}}.',
	'foe_removed_body'                                  => 'Hei, $1.

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
	'ur-already-submitted'                       => 'Vòstra demanda es estada mandada',
	'ur-error-title'                             => 'Op, avètz pres un marrida virada !',
	'ur-error-message-no-user'                   => "Podèm pas completar vòstre requèsta, perque cap d'utilizaire pòrta pas aqueste nom.",
	'ur-main-page'                               => 'Acuèlh',
	'ur-your-profile'                            => 'Vòstre perfil',
	'ur-backlink'                                => '&lt; retorn cap al perfil de $1',
	'ur-friend'                                  => 'amic',
	'ur-foe'                                     => 'enemic',
	'ur-relationship-count'                      => '$1 a $2 {{PLURAL:$2|$3|$3s}}.',
	'ur-add-friends'                             => 'Volètz mai d’amics ? <a href="$1">Invitatz-los !</a>.',
	'ur-add-friend'                              => 'Apondre coma amic',
	'ur-add-foe'                                 => 'Apondre coma enemic',
	'ur-add-no-user'                             => "Cap d'utilizaire pas seleccionat. Requerissètz d'amics o d'enemics a travèrs del ligam corrècte.",
	'ur-add-personal-message'                    => 'Apondre un messatge personal',
	'ur-remove-relationship'                     => 'Levar coma $1',
	'ur-give-gift'                               => 'Mandar un present',
	'ur-previous'                                => 'precedent',
	'ur-next'                                    => 'seguent',
	'ur-remove-relationship-title'               => 'Volètz levar $1 coma vòstre $2 ?',
	'ur-remove-relationship-title-confirm'       => 'Avètz levat $1 coma vòstre $2',
	'ur-remove-relationship-message'             => 'Avètz demandat la supression de $1 coma vòstre $2, picatz sus « $3 » per confirmar.',
	'ur-remove-relationship-message-confirm'     => 'Avètz suprimit amb succès $1 coma vòstre $2.',
	'ur-remove-error-message-no-relationship'    => 'Avètz pas cap de relacion amb $1.',
	'ur-remove-error-message-remove-yourself'    => 'Vos podètz pas suprimir vos meteis.',
	'ur-remove-error-message-pending-request'    => 'Avètz una requèsta de $1 en cors amb $2.',
	'ur-remove-error-not-loggedin'               => 'Vos cal èsser en sesilha per suprimir un $1.',
	'ur-remove'                                  => 'Levar',
	'ur-cancel'                                  => 'Anullar',
	'ur-login'                                   => 'Senhal',
	'ur-add-title'                               => 'Volètz apondre $1 coma vòstre $2 ?',
	'ur-add-message'                             => 'Avètz l’intencion d’ajustar $1 coma vòstre $2. Lo notificarem a $1 per confirmar vòstre $3.',
	'ur-friendship'                              => 'amistat',
	'ur-grudge'                                  => 'rancòr',
	'ur-add-button'                              => 'Apondre coma $1',
	'ur-add-sent-title'                          => 'Avètz mandat vòstra requèsta en $1 a $2 !',
	'ur-add-sent-message'                        => 'Vòstra requèsta en $1 es estada mandada a $2 per confirmacion. Se $2 confirma vòstra demanda, recebretz un corrièr electronic en retorn.',
	'ur-add-error-message-no-user'               => 'L’utilizaire que sètz a apondre existís pas.',
	'ur-add-error-message-blocked'               => "Actualament, sètz blocat e doncas podètz pas apondre ni d'amics ni d'enemics.",
	'ur-add-error-message-yourself'              => 'Vos podètz pas apondre vos meteis coma enemic o amic.',
	'ur-add-error-message-existing-relationship' => 'Ja sètz $1 amb $2.',
	'ur-add-error-message-pending-request-title' => 'Paciéncia!',
	'ur-add-error-message-pending-request'       => 'Avètz una requèsta en $1 en espèra amb $2. Vos notificarem quora $2 aurà confirmat vòstra demanda.',
	'ur-add-error-message-not-loggedin'          => 'Vos cal èsser connectat(ada) per apondre un $1.',
	'ur-requests-title'                          => 'Demandas de relacions.',
	'ur-requests-message'                        => '<a href="$1">$2</a> desira èsser vòstre $3.',
	'ur-accept'                                  => 'Acceptar',
	'ur-reject'                                  => 'Regetar',
	'ur-no-requests-message'                     => 'Avètz pas cap de requèsta en amic o enemic. Se desiratz mai d\'amics, <a href="$1">invitatz-los !</a>',
	'ur-requests-added-message'                  => 'Avètz apondut $1 coma vòstre $2.',
	'ur-requests-reject-message'                 => 'Avètz regetat $1 coma vòstre $2.',
	'ur-title-foe'                               => 'Tièra dels enemics de $1',
	'ur-title-friend'                            => 'Tièra dels amics de $1',
	'friend_request_subject'                     => '$1 vos a apondut coma un amic sus {{SITENAME}} !',
	'friend_request_body'                        => 'Adiu $1 :

$2 vos a apondut coma amic sus {{SITENAME}}. Nos volèm assegurar que sètz totes dos actualament amics.

Clicatz sus aqueste ligam per confirmar vòstra amistat :
$3

Mercés.

---

E ! Vos volètz arrestar de recebre de corrièrs de nòstra part ?

Clicatz $4
e modificatz vòstras preferéncias per desactivar las notificacions per corrièr electronic.',
	'foe_request_subject'                        => 'Es la guèrra ! $1 vos a apondut coma enemic sus {{SITENAME}} !',
	'foe_request_body'                           => "Adiu $1 :

$2 vos ven just de repertoriar coma un enemic sus {{SITENAME}}. Nos volèm assegurar que sètz vertadièrament d'enemics mortals o qu'almens avètz de grèuges un envèrs l’autre/

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

/** Polish (Polski)
 * @author Sp5uhe
 * @author Airwolf
 * @author Derbeth
 * @author Maikking
 */
$messages['pl'] = array(
	'viewrelationships'                          => 'Zobacz znajomych',
	'viewrelationshiprequests'                   => 'Zobacz zaproszenia do znajomości',
	'ur-already-submitted'                       => 'Twoje zaproszenie zostało wysłane',
	'ur-error-title'                             => 'Błąd',
	'ur-error-message-no-user'                   => 'Nie można zrealizować Twojego zaproszenia, ponieważ nie istnieje użytkownik o takiej nazwie.',
	'ur-main-page'                               => 'Strona główna',
	'ur-your-profile'                            => 'Twój profil',
	'ur-backlink'                                => '&lt; Powrót do profilu $1',
	'ur-friend'                                  => 'przyjaciel',
	'ur-foe'                                     => 'wróg',
	'ur-relationship-count'                      => '$1 ma $2 {{PLURAL:$2|znajomych/wrogów|znajomych/wrogów}}.',
	'ur-add-friends'                             => '  Chcesz mieć więcej przyjaciół? <a href="$1">Zaproś ich</a>',
	'ur-add-friend'                              => 'Dodaj do przyjaciół',
	'ur-add-foe'                                 => 'Dodaj do wrogów',
	'ur-add-no-user'                             => 'Nie wybrano żadnego użytkownika.
Wybierz znajomych/wrogów poprzez poprawny link.',
	'ur-add-personal-message'                    => 'Dodaj wiadomość osobistą',
	'ur-remove-relationship'                     => 'Usuń ze swoich $1',
	'ur-give-gift'                               => 'Daj prezent',
	'ur-previous'                                => 'poprz.',
	'ur-next'                                    => 'nast.',
	'ur-remove-relationship-title'               => 'Czy chcesz usunąć $1 ze swoich $2?',
	'ur-remove-relationship-title-confirm'       => 'Usunąłeś $1 ze swoich $2',
	'ur-remove-relationship-message'             => 'Chcesz usunąć $1 z listy swoich $2, potwierdź wciskając  "$3".',
	'ur-remove-relationship-message-confirm'     => 'Użytkownik $1 został usunięty z listy Twoich $2.',
	'ur-remove-error-message-no-relationship'    => 'Nie masz żadnych związków z $1.',
	'ur-remove-error-message-remove-yourself'    => 'Nie możesz usunąć sam siebie.',
	'ur-remove-error-message-pending-request'    => 'Masz oczekujące zaproszenie do $1 od $2.',
	'ur-remove-error-not-loggedin'               => 'Musisz być zalogowany, aby usunąć $1.',
	'ur-remove'                                  => 'Usuń',
	'ur-cancel'                                  => 'Anuluj',
	'ur-login'                                   => 'Zaloguj się',
	'ur-add-title'                               => 'Na pewno chcesz dodać $1 do grona swoich $2?',
	'ur-add-message'                             => 'Dodamy $1 do Twoich $2.
Powiadomimy $1 w celu potwierdzenia Twojego $3.',
	'ur-friendship'                              => 'znajomość',
	'ur-grudge'                                  => 'wrogość',
	'ur-add-button'                              => 'Dodaj jako $1',
	'ur-add-sent-title'                          => 'Wysłaliśmy Twoją propozycję $1 do $2!',
	'ur-add-sent-message'                        => 'Twoja prośba $1 została wysłana do $2 w celu potwierdzenia.
Jeżeli $2 potwierdzi Twoją prośbę, otrzymasz e-mail.',
	'ur-add-error-message-no-user'               => 'Użytkownik, którego próbujesz dodać, nie istnieje.',
	'ur-add-error-message-blocked'               => 'Jesteś zablokowany i nie możesz dodawać nowych znajomych i wrogów.',
	'ur-add-error-message-yourself'              => 'Nie możesz dodać samego siebie.',
	'ur-add-error-message-existing-relationship' => 'Już jesteś $1 z $2.',
	'ur-add-error-message-pending-request-title' => 'Cierpliwości!',
	'ur-add-error-message-not-loggedin'          => 'Żeby dodać $1, musisz się zalogować',
	'ur-requests-title'                          => 'Nawiązanie znajomości',
	'ur-requests-message'                        => '<a href="$1">$2</a> chce być twoim $3.',
	'ur-accept'                                  => 'Zaakceptuj',
	'ur-reject'                                  => 'Odrzuć',
	'ur-no-requests-message'                     => 'Nie masz zaproszeń do przyjaźni oraz zgłoszeń od wrogów.
Jeśli chcesz mieć więcej przyjaciół <a href="$1">zaproś ich!</a>',
	'ur-requests-added-message'                  => 'Dodałeś $1 do swoich $2.',
	'ur-requests-reject-message'                 => 'Odmówiłeś dodania $1 do swoich $2.',
	'ur-title-foe'                               => 'Lista wrogów $1',
	'ur-title-friend'                            => 'Lista przyjaciół $1',
	'friend_request_subject'                     => '$1 dodał Ciebie do swoich przyjaciół na {{GRAMMAR:MS.lp|{{SITENAME}}}}!',
	'friend_removed_subject'                     => 'Och nie! $1 usunął Cię z listy przyjaciół na {{GRAMMAR:MS.lp|{{SITENAME}}}}!',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'viewrelationships'          => 'اړيکې کتل',
	'viewrelationshiprequests'   => 'د اړيکو غوښتنې کتل',
	'ur-already-submitted'       => 'ستاسو غوښتنه ولېږل شوه',
	'ur-main-page'               => 'لومړی مخ',
	'ur-your-profile'            => 'ستاسو پېژنليک',
	'ur-friend'                  => 'ملګری',
	'ur-add-friend'              => 'خپل په ملګرو کې ورګډول',
	'ur-previous'                => 'پخوانی',
	'ur-next'                    => 'راتلونکي',
	'ur-remove'                  => 'غورځول',
	'ur-login'                   => 'ننوتل',
	'ur-friendship'              => 'ملګرتيا',
	'ur-requests-title'          => 'د اړيکو غوښتنې',
	'ur-accept'                  => 'منل',
	'ur-reject'                  => 'ردول',
	'ur-requests-added-message'  => 'تاسو $1 د ځان سره د $2 په توګه ګډ کړی.',
	'ur-requests-reject-message' => 'تاسو $1 د ځان سره د $2 په توګه رټلی.',
);

/** Portuguese (Português)
 * @author 555
 * @author Lijealso
 * @author Malafaya
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
	'ur-add-sent-title'                          => 'Enviámos o seu pedido de $1 para $2!',
	'ur-add-error-message-no-user'               => 'O usuário que pretende adicionar não existe.',
	'ur-add-error-message-pending-request-title' => 'Paciência!',
	'ur-add-error-message-not-loggedin'          => 'Necessita estar logado para adicionar $1',
	'ur-accept'                                  => 'Aceitar',
	'ur-reject'                                  => 'Rejeitar',
);

/** Tarifit (Tarifit)
 * @author Jose77
 */
$messages['rif'] = array(
	'ur-main-page' => 'Tasbtirt Tamzwarut',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'ur-main-page' => 'Pagina principală',
	'ur-remove'    => 'Elimină',
	'ur-cancel'    => 'Anulează',
	'ur-login'     => 'Autentificare',
);

/** Russian (Русский)
 * @author Innv
 * @author Flrn
 */
$messages['ru'] = array(
	'ur-already-submitted' => 'Ваш запрос был отправлен',
	'ur-main-page'         => 'Заглавная страница',
	'ur-your-profile'      => 'Ваш профиль',
);

/** Tachelhit (Tašlḥiyt)
 * @author Zanatos
 */
$messages['shi'] = array(
	'ur-accept'           => 'qbl',
	'ur-reject'           => 'adur-tqblt',
	'friend_request_body' => 'Azul $1:

$2 iskr gik zod amdakl ns ɣ {{SITENAME}}.  nra annisan isnit tgam imdukal nsaḥt.

ad o-zday ad bach atsḥut tidukla nk:
$3

Tanmirte

---

yak ortrit azakn soul ur-nsifid tibratin?
ad $4
sbddlt reglage nk bach aktnin soul ur-nsifid.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'viewrelationships'                                 => 'Zobraziť vzťah',
	'viewrelationshiprequests'                          => 'Zobraziť žiadosti o vzťah',
	'ur-already-submitted'                              => 'Vaša požiadavka bola odoslaná',
	'ur-error-page-title'                               => 'Ops!',
	'ur-error-title'                                    => 'Ops, niečo ste spravili zle!',
	'ur-error-message-no-user'                          => 'Nebolo možné dokončiť vašu požiadavku, pretože používateľ s daným menom neexistuje.',
	'ur-main-page'                                      => 'Hlavná stránka',
	'ur-your-profile'                                   => 'Váš profil',
	'ur-backlink'                                       => '&lt; Späť na profil $1',
	'ur-friend'                                         => 'priateľ',
	'ur-foe'                                            => 'nepriateľ',
	'ur-relationship-count-foes'                        => '$1 má $2 {{PLURAL:$2|nepriateľa|nepriateľov}}. Chcete viac nepriateľov? <a href="$3">Pozvite ich.</a>',
	'ur-relationship-count-friends'                     => '$1 má $2 {{PLURAL:$2|priateľa|priateľov}}. Chcete viac priateľov? <a href="$3">Pozvite ich.</a>',
	'ur-add-friends'                                    => 'Chcete viac priateľov? <a href="$1">Pozvite ich</a>',
	'ur-add-friend'                                     => 'Pridať ako priateľa',
	'ur-add-foe'                                        => 'Pridať ako nepriateľa',
	'ur-add-no-user'                                    => 'Nebol vybraný žiadny používateľ. Prosím, žiadajte o priateľov/nepriateľov použitím správneho odkazu.',
	'ur-add-personal-message'                           => 'Pridať osobnú správu',
	'ur-remove-relationship-friend'                     => 'Odstrániť priateľa',
	'ur-remove-relationship-foe'                        => 'Odstrániť nepriateľa',
	'ur-give-gift'                                      => 'Darovať darček',
	'ur-previous'                                       => 'predch',
	'ur-next'                                           => 'nasled',
	'ur-remove-relationship-title-foe'                  => 'Chcete odstrániť $1 zo zoznamu svojich nepriateľov?',
	'ur-remove-relationship-title-confirm-foe'          => 'Odstránili ste $1 zo zoznamu svojich nepriateľov',
	'ur-remove-relationship-title-friend'               => 'Chcete odstrániť $1 zo zoznamu svojich priateľov?',
	'ur-remove-relationship-title-confirm-friend'       => 'Odstránili ste $1 zo zoznamu svojich priateľov',
	'ur-remove-relationship-message-foe'                => 'Požiadali ste o odstránenie $1 zo zoznamu svojich nepriateľov. Potvrďte to stlačením „$2”.',
	'ur-remove-relationship-message-confirm-foe'        => 'Úspešne ste odstránili $1 zo zoznamu svojich nepriateľov.',
	'ur-remove-relationship-message-friend'             => 'Požiadali ste o odstránenie $1 zo zoznamu svojich priateľov. Potvrďte to stlačením „$2”.',
	'ur-remove-relationship-message-confirm-friend'     => 'Úspešne ste odstránili $1 zo zoznamu svojich priateľov.',
	'ur-remove-error-message-no-relationship'           => 'Nemáte žiaden vzťah s $1.',
	'ur-remove-error-message-remove-yourself'           => 'Nemôžete odstrániť seba.',
	'ur-remove-error-message-pending-request'           => 'Máte nevybavenú žiadosť o $1 u $2.',
	'ur-remove-error-message-pending-foe-request'       => 'Máte čakajúcu požiadavku na nepriateľstvo s $1.',
	'ur-remove-error-message-pending-friend-request'    => 'Máte čakajúcu požiadavku na priateľstvo s $1.',
	'ur-remove-error-not-loggedin'                      => 'Aby ste mohli odstrániť $1, musíte byť prihlásený.',
	'ur-remove-error-not-loggedin-foe'                  => 'Aby ste mohli odstrániť nepriateľa, musíte sa prihlásiť.',
	'ur-remove-error-not-loggedin-friend'               => 'Aby ste mohli odstrániť priateľa, musíte sa prihlásiť.',
	'ur-remove'                                         => 'Odstrániť',
	'ur-cancel'                                         => 'Zrušiť',
	'ur-login'                                          => 'Prihlásiť sa',
	'ur-add-title-foe'                                  => 'Želáte si pridať $1 medzi svojich nepriateľov?',
	'ur-add-title-friend'                               => 'Želáte si pridať $1 medzi svojich priateľov?',
	'ur-add-message-foe'                                => 'Chystáte sa pridať $1 medzi svojich nepriateľov.
Upozorníme $1, aby potvrdil váš spor.',
	'ur-add-message-friend'                             => 'Chystáte sa pridať $1 medzi svojich priateľov.
Upozorníme $1, aby potvrdil vaše priateľstvo.',
	'ur-friendship'                                     => 'priateľstvo',
	'ur-grudge'                                         => 'nepriateľstvo',
	'ur-add-button'                                     => 'Pridať ako $1',
	'ur-add-button-foe'                                 => 'Pridať medzi nepriateľov',
	'ur-add-button-friend'                              => 'Pridať medzi priateľov',
	'ur-add-sent-title-foe'                             => 'Vaša požiadavka na nepriateľstvo s $1 bola odoslaná!',
	'ur-add-sent-title-friend'                          => 'Vaša požiadavka na uzatvorenie priateľstva s $1 bola odoslaná!',
	'ur-add-sent-message-foe'                           => 'Vaša požiadavka na nepriateľstvo bola odoslaná, aby ju $1 potrvrdil.
Ak ju $1 potvrdí, dostanete o tom upozornenie emailom.',
	'ur-add-sent-message-friend'                        => 'Vaša požiadavka na uzatvorenie priateľstva bola odoslaná, aby ju $1 potrvrdil.
Ak ju $1 potvrdí, dostanete o tom upozornenie emailom.',
	'ur-add-error-message-no-user'                      => 'Používateľ, ktorého sa pokúšate pridať, neexistuje.',
	'ur-add-error-message-blocked'                      => 'Momentálne ste zablokovaný a nemôžete pridávať priadteľov alebo nepriateľov.',
	'ur-add-error-message-yourself'                     => 'Nemôžete pridať sám seba ako priateľa alebo nepriateľa.',
	'ur-add-error-message-existing-relationship'        => 'S $2 už ste $1.',
	'ur-add-error-message-existing-relationship-foe'    => 'Už ste nepriateľ s $1.',
	'ur-add-error-message-existing-relationship-friend' => 'Už ste priateľ s $1.',
	'ur-add-error-message-pending-request-title'        => 'Trpezlivosť!',
	'ur-add-error-message-pending-friend-request'       => 'Máte žiadosť o uzatvorenie priateľstva s $1, ktorá čaká na potvrdenie.
Upozorníme vás, keď $1 potvrdí vašu žiadosť.',
	'ur-add-error-message-pending-foe-request'          => 'Máte žiadosť o nepriateľstvo s $1, ktorá čaká na potvrdenie.
Upozorníme vás, keď $1 potvrdí vašu žiadosť.',
	'ur-add-error-message-not-loggedin'                 => 'Aby ste mohli pridať $1, musíte sa prihlásiť.',
	'ur-add-error-message-not-loggedin-foe'             => 'Aby ste mohli pridať nepriateľa, musíte sa prihlásiť',
	'ur-add-error-message-not-loggedin-friend'          => 'Aby ste mohli pridať priateľa, musíte sa prihlásiť',
	'ur-requests-title'                                 => 'Žiadosti o vzťah',
	'ur-requests-message-foe'                           => '<a href="$1">$2</a> chce byť váš nepriateľ.',
	'ur-requests-message-friend'                        => '<a href="$1">$2</a> chce byť váš priateľ.',
	'ur-accept'                                         => 'Prijať',
	'ur-reject'                                         => 'Odmietnuť',
	'ur-no-requests-message'                            => 'Nemáte žiadosti o vytvorenie vzťahu priateľ či nepriateľ.
Ak chcete viac priateľov, <a href="$1">pozvite ich!</a>',
	'ur-requests-added-message-foe'                     => 'Pridali ste $1 medzi svojich nepriateľov.',
	'ur-requests-added-message-friend'                  => 'Pridali ste $1 medzi svojich priateľov.',
	'ur-requests-reject-message-friend'                 => 'Odmietli ste pridať $1 medzi svojich priateľov.',
	'ur-requests-reject-message-foe'                    => 'Odmietli ste pridať $1 medzi svojich nepriateľov.',
	'ur-title-foe'                                      => 'Zoznam nepriateľov používateľa $1',
	'ur-title-friend'                                   => 'Zoznam priateľov používateľa $1',
	'friend_request_subject'                            => '$1 si vás pridal ako priateľa na {{GRAMMAR:lokál|{{SITENAME}}}}!',
	'friend_request_body'                               => 'Ahoj $1:

$2 si vás pridal ako priateľa na {{GRAMMAR:lokál|{{SITENAME}}}}. Chceme sa uistiť, že ste skutočne priatelia.

Svoje priateľstvo potvrdíte kliknutím na nasledovný odkaz:

$3

Vďaka

---

Nechcete viac od nás dostávať email?

Kliknite na $4
a vypnite upozornenia emailov vo svojich nastaveniach.',
	'foe_request_subject'                               => 'Je vojna! $1 si vás pridal ako nepriateľa na {{GRAMMAR:lokál|{{SITENAME}}}}!',
	'foe_request_body'                                  => 'Ahoj $1:

$2 si vás pridal ako nepriateľa na {{GRAMMAR:lokál|{{SITENAME}}}}. Chceme sa uistiť, že ste skutočne nepriatelia na smrť alebo ste sa aspoň pohádali.

Svoje nepriateľstvo potvrdíte kliknutím na nasledovný odkaz:

$3

Vďaka

---

Nechcete viac od nás dostávať email?

Kliknite na $4
a vypnite upozornenia emailov vo svojich nastaveniach.',
	'friend_accept_subject'                             => '$1 prijal vašu požiadavku na uzavretie priateľstva na {{GRAMMAR:lokál|{{SITENAME}}}}!',
	'friend_accept_body'                                => 'Ahoj $1:

$1 prijal vašu požiadavku na uzavretie priateľstva na {{GRAMMAR:lokál|{{SITENAME}}}}!

Pozrite si stránku $2 na $3

Vďaka

---

Nechcete viac od nás dostávať email?

Kliknite na $4
a vypnite upozornenia emailov vo svojich nastaveniach.',
	'foe_accept_subject'                                => 'Je to tu! $1 prijal vašu požiadavku na vyhlásenie nepriateľstva na {{GRAMMAR:lokál|{{SITENAME}}}}!',
	'foe_accept_body'                                   => 'Ahoj $1:

$1 prijal vašu požiadavku na vyhlásenie nepriateľstva na {{GRAMMAR:lokál|{{SITENAME}}}}!

Pozrite si stránku $2 na $3

Vďaka

---

Nechcete viac od nás dostávať email?

Kliknite na $4
a vypnite upozornenia emailov vo svojich nastaveniach.',
	'friend_removed_subject'                            => 'Ó. nie! $1 si vás odstránil ako priateľa na {{GRAMMAR:lokál|{{SITENAME}}}}!',
	'friend_removed_body'                               => 'Ahoj $1:

$2 si vás odstránil ako priateľa na {{GRAMMAR:lokál|{{SITENAME}}}}!

Vďaka

---

Nechcete viac od nás dostávať email?

Kliknite na $4
a vypnite upozornenia emailov vo svojich nastaveniach.',
	'foe_removed_subject'                               => 'Hej! $1 si vás odstránil ako nepriateľa na {{GRAMMAR:lokál|{{SITENAME}}}}!',
	'foe_removed_body'                                  => 'Ahoj $1:

$2 si vás odstránil ako nepriateľa na {{GRAMMAR:lokál|{{SITENAME}}}}!

Že by ste sa začínali spriateľovať?

Vďaka

---

Nechcete viac od nás dostávať email?

Kliknite na $4
a vypnite upozornenia emailov vo svojich nastaveniach.',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Sasa Stefanovic
 */
$messages['sr-ec'] = array(
	'ur-remove' => 'Уклони',
);

/** Swati (SiSwati)
 * @author Jatrobat
 */
$messages['ss'] = array(
	'ur-main-page' => 'Likhasi lelikhulu',
);

/** Swedish (Svenska)
 * @author M.M.S.
 */
$messages['sv'] = array(
	'viewrelationships'                           => 'Visa relationer',
	'viewrelationshiprequests'                    => 'Visa efterfrågningar om relationer',
	'ur-already-submitted'                        => 'Din efterfrågning har skickats',
	'ur-error-page-title'                         => 'Oops!',
	'ur-error-title'                              => 'Oops, du hamnade fel!',
	'ur-error-message-no-user'                    => 'Vi kan inte fullfölja din efterfrågning, för att det inte finns någon användare med detta namn.',
	'ur-main-page'                                => 'Huvudsida',
	'ur-your-profile'                             => 'Din profil',
	'ur-backlink'                                 => '&lt; Tillbaka till $1s profil',
	'ur-friend'                                   => 'vän',
	'ur-foe'                                      => 'fiende',
	'ur-relationship-count-foes'                  => '$1 har $2 {{PLURAL:$2|fiende|fiender}}. Vill du ha fler fiender? <a href="$3">Bjud in dem.</a>',
	'ur-relationship-count-friends'               => '$1 har $2 {{PLURAL:$2|vän|vänner}}. Vill du ha flera vänner? <a href="$3">Bjud in dem.</a>',
	'ur-add-friends'                              => 'Vill du ha mer vänner? <a href="$1">Bjud in dom</a>',
	'ur-add-friend'                               => 'Lägg till som vän',
	'ur-add-foe'                                  => 'Lägg till som fiende',
	'ur-add-no-user'                              => 'Ingen användare väljd. Var god lägg till vänner eller fiender med den korrekta länken.',
	'ur-add-personal-message'                     => 'Lägg till ett personligt meddelande',
	'ur-remove-relationship-friend'               => 'Ta bort som vän',
	'ur-remove-relationship-foe'                  => 'Ta bort som fiende',
	'ur-give-gift'                                => 'Ge en present',
	'ur-previous'                                 => 'föregående',
	'ur-next'                                     => 'nästa',
	'ur-remove-relationship-title-foe'            => 'Vill du ta bort $1 som din fiende?',
	'ur-remove-relationship-title-confirm-foe'    => 'Du har tagit bort $1 som din fiende',
	'ur-remove-relationship-title-friend'         => 'Vill du ta bort $1 som din vän?',
	'ur-remove-relationship-title-confirm-friend' => 'Du har tagit bort $1 som din vän',
	'ur-remove-error-message-no-relationship'     => 'Du har ingen relation med $1.',
	'ur-remove-error-message-remove-yourself'     => 'Du kan inte ta bort dig själv.',
	'ur-remove-error-message-pending-request'     => 'Du har en väntande efterfrågning om att bli $1 med $2 hos $2.',
	'ur-remove-error-not-loggedin'                => 'Du måste logga in för att ta bort en $1.',
	'ur-remove'                                   => 'Ta bort',
	'ur-cancel'                                   => 'Avbryt',
	'ur-login'                                    => 'Logga in',
	'ur-friendship'                               => 'vänskap',
	'ur-grudge'                                   => 'fiendeskap',
	'ur-add-button'                               => 'Lägg till som $1',
	'ur-add-error-message-no-user'                => 'Användaren du prövade att lägga till finns inte.',
	'ur-add-error-message-blocked'                => 'Du är blockerad, och kan inte lägga till vänner eller fiender.',
	'ur-add-error-message-yourself'               => 'Du kan inte lägga till dig själv som vän eller fiende.',
	'ur-add-error-message-existing-relationship'  => 'Du är redan $1 med $2.',
	'ur-add-error-message-pending-request-title'  => 'Var tålmodig...',
	'ur-add-error-message-not-loggedin'           => 'Du måste vara inloggad för att lägga till en $1',
	'ur-requests-title'                           => 'Relationsefterfrågningar',
	'ur-accept'                                   => 'Acceptera',
	'ur-reject'                                   => 'Avslå',
	'ur-no-requests-message'                      => 'Du har inga vän- eller fiendeefterfrågningar. Om du vill ha mer vänner, <a href="$1">bjud in dom</a>!',
	'ur-title-foe'                                => '$1s lista över fiender',
	'ur-title-friend'                             => '$1s lista över vänner',
	'friend_request_subject'                      => '$1 har laggt till dig som vän på {{SITENAME}}!',
	'friend_request_body'                         => 'Hej, $1!

$2 har lagt till dig som en vän på {{SITENAME}}.  Vi vill vara säkra på att ni två verkligen är vänner.

Var god klicka på den här länken för att bekräfta eran vänskap:
$3

Tack

---

Vill du inte ha mer mejl från oss?

Klicka $4
och ändra dina inställningar att inte tillåta e-postmeddelanden.',
	'foe_request_subject'                         => 'Det är krig! $1 har lagt till dig som fiende på {{SITENAME}}!',
	'foe_request_body'                            => 'Hej, $1!

$2 har lagt till dig som fiende på {{SITENAME}}.  Vi vill vara säkra på att ni två är fiender  eller i varje fall bråkar.

Var god klicka på den här länken för att bekräfta eran fiendeskap.

$3

Tack

---

Vill du inte ha mer mejl från oss?

Klicka $4
och ändra dina inställningar att inte tillåta e-postmeddelanden.',
	'friend_accept_subject'                       => '$1 har accepterat din vänskapsefterfrågning på {{SITENAME}}!',
	'friend_accept_body'                          => 'Hej, $1!

$2 har accepterat din efterfrågning om att bli vän med $2 på {{SITENAME}}!

Kolla på $2s sida på $3

Tack

---

Vill du inte ha mer mejl från oss?

Klicka $4
och ändra dina inställningar att inte tillåta e-postmeddelanden.',
	'foe_accept_subject'                          => '$1 har accepterat din fiendeskapsefterfrågning på {{SITENAME}}!',
	'foe_accept_body'                             => 'Hej, $1!

$2 har accepterat din efterfrågning om fiendeskap med $2 på {{SITENAME}}!

Kolla på $2s sida på $3

Tack

---

Vill du inte ha mer mejl från oss?

Klicka $4
och ändra dina inställningar att inte tillåta e-postmeddelanden.',
	'friend_removed_subject'                      => 'Å Nej! $1 har tagit bort dig som vän på {{SITENAME}}!',
	'friend_removed_body'                         => 'Hej, $1

$2 har tagit bort dig som vän på {{SITENAME}}.

---

Vill du inte mottaga mer e-post från oss?

Klicka $4 och ändra dina inställningar för att stänga av e-postmeddelanden.',
	'foe_removed_subject'                         => 'Hurra! $1 har tagit bort dig som fiende på {{SITENAME}}!',
	'foe_removed_body'                            => 'Hej, $1.

$2 har tagit bort dig som fiende på {{SITENAME}}.

Kanske ni två är på väg att bli vänner?

---

Vill du inte motta mer e-post från oss?

Klicka $4 och ändra dina inställningarna för att slå av e-postmeddelanden.',
);

/** Silesian (Ślůnski)
 * @author Herr Kriss
 */
$messages['szl'] = array(
	'ur-main-page' => 'Přodńo zajta',
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
	'ur-add-button'                              => '$1గా చేర్చు',
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

/** Tajik (Cyrillic) (Тоҷикӣ/tojikī (Cyrillic))
 * @author Ibrahim
 * @author Siebrand
 */
$messages['tg-cyrl'] = array(
	'ur-main-page'                               => 'Саҳифаи Аслӣ',
	'ur-your-profile'                            => 'Намояи шумо',
	'ur-friend'                                  => 'дӯст',
	'ur-foe'                                     => 'душман',
	'ur-add-friends'                             => ' Бештар дӯстон мехоҳед? <a href="$1">Онҳоро даъват кунед</a>',
	'ur-add-friend'                              => 'Чун дӯст илова кунед',
	'ur-add-foe'                                 => 'Чун ҳариф илова кунед',
	'ur-remove-relationship'                     => 'Чун $1 пок шавад',
	'ur-give-gift'                               => 'Ҳадя диҳед',
	'ur-previous'                                => 'қаблӣ',
	'ur-next'                                    => 'баъдӣ',
	'ur-remove-relationship-title'               => 'Оё шумо мехоҳед $1-ро чун $2 худ пок кунед?',
	'ur-remove-relationship-title-confirm'       => 'Шумо $1ро чун $2ӣ худ пок кардед',
	'ur-remove-relationship-message'             => 'Шумо дархост кардед, ки $1 чун $2 шумо пок шавад, бо пахш кардани "$3" тасдиқ кунед.',
	'ur-remove-relationship-message-confirm'     => 'Шумо бо муваффақият $1ро чун $2атон пок кардед.',
	'ur-remove-error-message-no-relationship'    => 'Шумо муносибате бо $1 надоред.',
	'ur-remove-error-message-remove-yourself'    => 'Шумо худро наметавонед пок кунед.',
	'ur-remove-error-not-loggedin'               => 'Барои пок кардани $1 шумо бояд вуруд шавед.',
	'ur-remove'                                  => 'Ҳазф',
	'ur-cancel'                                  => 'Лағв',
	'ur-login'                                   => 'Вуруд кунед',
	'ur-friendship'                              => 'дӯстӣ',
	'ur-add-sent-title'                          => 'Мо дархости $1 шуморо ба $2 фиристодем!',
	'ur-add-sent-message'                        => 'Дархости $1 шумо ба $2 барои тасдиқ фиристода шуд.
Агар $2 дархости шуморо тасдиқ кунад, шумо номаи электронии баъдиро хоҳед дарёфт кард',
	'ur-add-error-message-no-user'               => 'Корбари шумо кӯшиши илова кардани ҳастед вуҷуд надорад.',
	'ur-add-error-message-yourself'              => 'Шумо худро наметавонед чун дӯст ё ҳариф илова кунед.',
	'ur-add-error-message-existing-relationship' => 'Шумо аллакай $1 бо $2 мебошед.',
	'ur-add-error-message-pending-request-title' => 'Сабр!',
	'ur-add-error-message-not-loggedin'          => 'Шумо барои илова кардани $1 бояд вуруд кунед.',
	'ur-requests-title'                          => 'Дархостҳои иртибот',
	'ur-accept'                                  => 'Пазируфтан',
	'ur-reject'                                  => 'Рад кардан',
	'ur-requests-added-message'                  => 'Шумо $1-ро чун $2 худ илова кардед.',
	'ur-requests-reject-message'                 => 'Шумо $1-ро чун $2 худ рад кардед.',
	'friend_request_subject'                     => '$1 шуморо чун дӯсташ дар {{SITENAME}} илова кард!',
	'friend_request_body'                        => 'Салом $1:

$2 шуморо ҳамчун дӯст дар {{SITENAME}} илова кард.  Мо мехоҳем мутмаин бошем, ки шумо дар ҳақиқат дӯстон ҳастед.

Лутфан ин пайвандро бо тасдиқ кардани дӯстии худ пахш кунед:
$3

Ташаккур

---

Ҳой, оё шумо мехоҳед ба дарёфт кардани номаҳои электронӣ аз мо хотима бидиҳед?

$4-ро клик кунед
ва тарҷиҳоти худро бо ғайрифаъол кардани огоҳсозии тариқи почтаи электронӣ тағйир диҳед.',
	'foe_request_subject'                        => 'Ин низоъ аст! $1 шуморо ҳамчун душмани худ дар {{SITENAME}} илова кард!',
	'foe_request_body'                           => 'Салом $1:

$2 шуморо ҳамчун душмани худ дар {{SITENAME}} илова кард. Мо мехоҳем мутмаин бошем, ки шумо дар ҳақиқат душманони ашадӣ ҳастед ё ҳадди ақал мунозира доред.

Лутфан ин пайвандро бо тасдиқ кардани рост наомадани муносибати дӯстонаатон пахш кунед: $3

$3

Ташаккур

---

Ҳой, оё шумо мехоҳед ба дарёфт кардани номаҳои электронӣ аз мо хотима бидиҳед?

$4-ро клик кунед ва тарҷиҳоти худро бо ғайрифаъол кардани огоҳсозии тариқи почтаи электронӣ тағйир диҳед.',
	'friend_accept_subject'                      => '$1 дархости дӯстии шуморо дар {{SITENAME}} қабул кард!',
	'friend_accept_body'                         => 'Салом $1:

$2 дархости дӯстшавии шуморо дар {{SITENAME}} қабул кард!

Саҳифаи $2-ро дар $3 нигаред

Ташаккур,

---

Ҳой, оё шумо мехоҳед ба дарёфт кардани номаҳои электронӣ аз мо хотима бидиҳед?

$4-ро клик кунед
ва тарҷиҳоти худро бо ғайрифаъол кардани огоҳсозии тариқи почтаи электронӣ тағйир диҳед.',
	'foe_accept_subject'                         => 'Ана тамом! $1 дархости ҳарифии шуморо дар {{SITENAME}} қабул кард!',
	'foe_accept_body'                            => 'Салом $1:

$2 дархости душмании шуморо дар {{SITENAME}} қабул кард!

Саҳифаи $2-ро дар $3 нигаред

Ташаккур,

---

Ҳой, оё шумо мехоҳед ба дарёфт кардани номаҳои электронӣ аз мо хотима бидиҳед?

$4-ро клик кунед
ва тарҷиҳоти худро бо ғайрифаъол кардани огоҳсозии тариқи почтаи электронӣ тағйир диҳед.',
	'friend_removed_subject'                     => 'Ваҳ! $1 шуморо ҳамчун дӯст дар {{SITENAME}} пок кард!',
	'friend_removed_body'                        => 'Салом $1:

$2 шуморо ҳамчун дӯст дар {{SITENAME}} пок кард!

Ташаккур

---

Ҳой, оё шумо мехоҳед ба дарёфт кардани номаҳои электронӣ аз мо хотима бидиҳед?

$4-ро клик кунед
ва тарҷиҳоти худро бо ғайрифаъол кардани огоҳсозии тариқи почтаи электронӣ тағйир диҳед.',
	'foe_removed_subject'                        => 'Уҳу! $1 шуморо ҳамчун душмани худ дар {{SITENAME}} пок кард!',
	'foe_removed_body'                           => 'Салом $1:

$2 шуморо ҳамчун душмани худ дар  {{SITENAME}} пок кард!

Шояд шумо ҳарду дар роҳи дӯст шудан бошед?

Ташаккур

---


Ҳой, оё шумо мехоҳед ба дарёфт кардани номаҳои электронӣ аз мо хотима бидиҳед?

$4-ро клик кунед
ва тарҷиҳоти худро бо ғайрифаъол кардани огоҳсозии тариқи почтаи электронӣ тағйир диҳед.',
);

/** Turkish (Türkçe)
 * @author Karduelis
 */
$messages['tr'] = array(
	'ur-remove' => 'Kaldır',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'ur-main-page'  => 'Trang Chính',
	'ur-add-friend' => 'Thêm người bạn',
	'ur-add-foe'    => 'Thêm kẻ thù',
	'ur-cancel'     => 'Bãi bỏ',
	'ur-login'      => 'Đăng nhập',
);

