<?php
/**
 * Internationalisation file for extension CentralAuth.
 *
 * @addtogroup Extensions
 */

$messages = array();

/** English
 * @author Brion Vibber
 */
$messages['en'] = array(
	// When not logged in...
	'mergeaccount'                   => 'Login unification status',
	'centralauth-desc'               => '[[Special:MergeAccount|Merge Account]] across Wikimedia Foundation wikis',
	'centralauth-mergeaccount-desc'  => '[[Special:MergeAccount|Merges multiple accounts]] for Single User Login',
	'centralauth-merge-denied'       => 'Sorry, you don\'t have permission to access this page.',
	'centralauth-merge-notlogged'    => 'Please <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} log in]</span> to check if your accounts have been fully merged.',
	'centralauth-merge-welcome'      => "'''Your user account has not yet been migrated to Wikimedia's unified login system.'''

If you choose to migrate your accounts, you will be able to use the same username and password to log in to all of Wikimedia's project wikis in all available languages.
This makes it easier to work with shared projects such as uploading to [http://commons.wikimedia.org/ Wikimedia Commons], and avoids the confusion or conflict that could result from two people picking the same username on different projects.

If someone else has already taken your username on another site this will not disturb them, but it will give you a chance to work out with them or an administrator later.",

	'centralauth-merge-step1-title'  => 'Begin login unification',
	'centralauth-merge-step1-detail' => 'Your password and registered e-mail address will be checked against the accounts on other wikis to confirm that they match.
No changes will be made until you have confirmed that things look ok.',
	'centralauth-merge-step1-submit' => 'Confirm login information',

	'centralauth-merge-step2-title'  => 'Confirm more accounts',
	'centralauth-merge-step2-detail' => "Some of the accounts could not be automatically matched to the designated home wiki.
If these accounts belong to you, you can confirm that they are yours by providing the password for them.",
	'centralauth-merge-step2-submit' => 'Confirm login information',

	// Dry run messages
	'centralauth-merge-dryrun-complete'   => 'All existing accounts can be automatically unified!

No changes have been made to your accounts yet.',
	'centralauth-merge-dryrun-incomplete' => "You are set to continue, but some accounts could not be automatically verified and will not be migrated immediately.
You will be able to merge these later.

No changes have been made to your accounts yet.",
	'centralauth-merge-dryrun-or'         => "'''or'''",
	'centralauth-merge-dryrun-home'       => "The migration system could not confirm that you're the owner of the home wiki account for your username.

Another wiki was determined as the home account for your username; follow the link below and log in there to finish your account migration.",

	'centralauth-merge-step3-title'  => 'Create unified account',
	'centralauth-merge-step3-detail' => "You're ready to create your unified account, with the following wikis attached:",
	'centralauth-merge-step3-submit' => 'Unify accounts',

	// Big text on completion
	'centralauth-complete'   => 'Login unification complete!',
	'centralauth-incomplete' => 'Login unification not complete!',

	// Wheeee
	'centralauth-complete-text'   => 'You can now log in to any Wikimedia wiki site without creating a new account;
the same username and password will work on Wikipedia, Wiktionary, Wikibooks, and their sister projects in all languages.',
	'centralauth-incomplete-text' => 'Once your login is unified, you will be able to log in to any Wikimedia wiki site without creating a new account;
the same username and password will work on Wikipedia, Wiktionary, Wikibooks, and their sister projects in all languages.',
	'centralauth-not-owner-text'  => 'The username "$1" was automatically assigned to the owner of the account on $2.

If this is you, you can finish the login unification process simply by typing the master password for that account here:',

	'centralauth-notice-dryrun'   => "<div class='successbox'>Demo mode only</div><br clear='all'/>",

	'centralauth-disabled-dryrun' => "Account unification is currently in a demo / debugging mode, so actual merging operations are disabled. Sorry!",

	// Appended to various messages above
	'centralauth-readmore-text'   => ":''[[meta:Help:Unified login|Read more about '''unified login''']]…''",

	// For lists of wikis/accounts:
	'centralauth-list-home-title'       => 'Home wiki',
	'centralauth-list-home-dryrun'      => 'The password and e-mail address set at this wiki will be used for your unified account.
You will be able to change which is your home wiki later.',
	'centralauth-list-attached-title'   => 'Attached accounts',
	'centralauth-list-attached'         => 'The account named "$1" on each the following sites have been automatically attached to the unified account:',
	'centralauth-list-attached-dryrun'  => 'The account named "$1" on each of the following sites will be automatically attached to the unified account:',
	'centralauth-list-unattached-title' => 'Unattached accounts',
	'centralauth-list-unattached'       => 'The account "$1" could not be automatically confirmed as belonging to you on the following sites;
most likely they have a different password from your primary account:',
	'centralauth-foreign-link'          => 'User $1 on $2',

	// Merge methods
	'centralauth-merge-method-primary'  => 'home wiki',
	'centralauth-merge-method-empty'    => 'no contributions',
	'centralauth-merge-method-mail'     => 'confirmed by e-mail',
	'centralauth-merge-method-password' => 'confirmed by password',
	'centralauth-merge-method-admin'    => 'admin merged account',
	'centralauth-merge-method-new'      => 'new account',
	'centralauth-merge-method-login'    => 'confirmed by login',

	// When not complete, offer to finish...
	'centralauth-finish-title'             => 'Finish merge',
	'centralauth-finish-text'              => 'If these accounts do belong to you, you can finish the login unification process simply by typing the passwords for the other accounts here:',
	'centralauth-finish-password'          => 'Password:',
	'centralauth-finish-login'             => 'Login',
	'centralauth-finish-send-confirmation' => 'E-mail password',
	'centralauth-finish-problems'          => "Are you having trouble, or are you not the owner of these other accounts?
[[meta:Help:Unified login problems|How to find help]]…",
	'centralauth-finish-noconfirms'        => 'No accounts could be confirmed using this password.',
	'centralauth-finish-incomplete'        => 'Several accounts were merged using this password.
Other accounts are not yet confirmed.',

	'centralauth-merge-attempt' => "'''Checking provided password against remaining unmerged accounts…'''",

	# When unattached, offer to attach...
	'centralauth-attach-list-attached' => 'The unified account named "$1" includes the following accounts:',
	'centralauth-attach-title'         => 'Confirm account',
	'centralauth-attach-text'          => 'This account has not yet been migrated to the unified account.
If the global account is yours too, you can merge this account if you type the global account password:',
	'centralauth-attach-submit'        => 'Migrate account',
	'centralauth-attach-success'       => 'The account was migrated to the unified account.',

	// Administrator's console
	'centralauth'                        => 'Unified login administration',
	'centralauth-admin-manage'           => 'Manage user data',
	'centralauth-admin-username'         => 'User name:',
	'centralauth-admin-lookup'           => 'View or edit user data',
	'centralauth-admin-permission'       => "Only stewards may merge other people's accounts for them.",
	'centralauth-admin-no-unified'       => 'No unified account for this username.',
	'centralauth-admin-info-id'          => 'User ID:',
	'centralauth-admin-info-registered'  => 'Registered:',
	'centralauth-admin-info-locked'      => 'Locked:',
	'centralauth-admin-info-hidden'      => 'Hidden:',
	'centralauth-admin-yes'              => 'yes',
	'centralauth-admin-no'               => 'no',
	'centralauth-admin-attached'         => 'Fully merged accounts',
	'centralauth-admin-unattached'       => 'Unattached accounts',
	'centralauth-admin-no-unattached'    => 'No unmerged accounts remain.',
	'centralauth-admin-list-localwiki'   => 'Local wiki',
	'centralauth-admin-list-attached-on' => 'Attached on',
	'centralauth-admin-list-method'      => 'Method',
	'centralauth-admin-unmerge'          => 'Unmerge selected',
	'centralauth-admin-merge'            => 'Merge selected',
	'centralauth-admin-bad-input'        => 'Invalid merge selection',
	'centralauth-admin-none-selected'    => 'No accounts selected to modify.',
	'centralauth-admin-already-unmerged' => 'Skipping $1, already unmerged',
	'centralauth-admin-unmerge-success'  => 'Successfully unmerged $1 {{PLURAL:$2|account|accounts}}',
	'centralauth-admin-delete-title'     => 'Delete account',
	'centralauth-admin-delete-description' => 'Deleting the global account will delete any global preferences, unattach all local accounts, and leave the global name free for another user to take.
All local accounts will continue to exist.
The passwords for local accounts created before the merge will revert to their pre-merge values.',
	'centralauth-admin-delete-button'    => 'Delete this account',
	'centralauth-admin-delete-success'   => 'Successfully deleted the global account for "<nowiki>$1</nowiki>"',
	'centralauth-admin-nonexistent'      => 'There is no global account for "<nowiki>$1</nowiki>"',
	'centralauth-admin-delete-nonexistent' => 'Error: the global account "<nowiki>$1</nowiki>" does not exist.',
	'centralauth-token-mismatch'         => 'Sorry, we could not process your form submission due to a loss of session data.',
	'centralauth-admin-lock-title'      => 'Lock account',
	'centralauth-admin-lock-description' => 'Locking account will make impossible to log under it in any wiki.',
	'centralauth-admin-lock-button' => 'Lock this account',
	'centralauth-admin-lock-success' => 'Successfully locked the global account for "<nowiki>$1</nowiki>"',
	'centralauth-admin-lock-nonexistent' => 'Error: the global account "<nowiki>$1</nowiki>" does not exist.',
	'centralauth-admin-unlock-title'      => 'Unlock account',
	'centralauth-admin-unlock-description' => 'Unlocking account will make it possible again to log under it.',
	'centralauth-admin-unlock-button' => 'Unlock this account',
	'centralauth-admin-unlock-success' => 'Successfully unlocked the global account for "<nowiki>$1</nowiki>"',
	'centralauth-admin-unlock-nonexistent' => 'Error: the global account "<nowiki>$1</nowiki>" does not exist.',
	'centralauth-admin-reason' => 'Reason: ',

	// Pretty timespan
	'centralauth-seconds-ago' => '$1 {{PLURAL:$1|second|seconds}} ago',
	'centralauth-minutes-ago' => '$1 {{PLURAL:$1|minute|minutes}} ago',
	'centralauth-hours-ago'   => '$1 {{PLURAL:$1|hour|hours}} ago',
	'centralauth-days-ago'    => '$1 {{PLURAL:$1|day|days}} ago',
	'centralauth-months-ago'  => '$1 {{PLURAL:$1|month|months}} ago',
	'centralauth-years-ago'   => '$1 {{PLURAL:$1|year|years}} ago',

	// Info panel in preferences
	'centralauth-prefs-status'            => 'Global account status:',
	'centralauth-prefs-not-managed'       => 'Not using unified account',
	'centralauth-prefs-unattached'        => 'Unconfirmed',
	'centralauth-prefs-complete'          => 'All in order!',
	'centralauth-prefs-migration'         => 'In migration',
	'centralauth-prefs-count-attached'    => 'Your account is active on $1 project {{plural:$1|site|sites}}.',
	'centralauth-prefs-count-unattached'  => 'Unconfirmed accounts with your name remain on $1 {{plural:$1|project|projects}}.',
	'centralauth-prefs-detail-unattached' => 'This project site has not been confirmed as belonging to the global account.',
	'centralauth-prefs-manage'            => 'Manage your global account',

	// Interaction with Special:Renameuser
	'centralauth-renameuser-abort' => "<div class=\"errorbox\">Cannot rename user $1 locally as this username has been migrated to the unified login system.</div>",
	'centralauth-renameuser-exists' => "<div class=\"errorbox\">Cannot rename user $2 as this username is reserved for a global account.</div>",

	// Other messages
	'centralauth-invalid-wiki'       => 'No such wiki DB: $1',
	'centralauth-account-exists'     => 'Cannot create account: the requested username is already taken in the unified login system.',
	
	// Logging
	'centralauth-log-name'           => 'Global account management log',
	'centralauth-log-header'         => 'This log contains operations under global accounts: deletions, locking and unlocking.',
	'centralauth-log-entry-delete'   => 'deleted global account "<nowiki>$1</nowiki>"',
	'centralauth-log-entry-lock'     => 'locked global account "<nowiki>$1</nowiki>"',
	'centralauth-log-entry-unlock'   => 'unlocked global account "<nowiki>$1</nowiki>"',
);

/** Afrikaans (Afrikaans)
 * @author SPQRobin
 */
$messages['af'] = array(
	'centralauth-foreign-link'   => 'Gebruiker $1 op $2',
	'centralauth-admin-username' => 'Gebruikersnaam:',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'mergeaccount'                         => "Estau d'a unificazión de cuentas",
	'centralauth-desc'                     => "[[Special:MergeAccount|Unificar as cuentas d'usuario]] en os wikis de Wikimedia Foundation",
	'centralauth-mergeaccount-desc'        => "[[Special:MergeAccount|Unifica multiples cuentas]] d'un unico usuario",
	'centralauth-merge-denied'             => 'No tiene os premisos ta azeder ta ista pachina.',
	'centralauth-merge-notlogged'          => 'Por fabor <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} identifique-se]</span> ta comprebar si as suyas cuentas s\'han combinato de tot.',
	'centralauth-merge-welcome'            => "'''A suya cuenta d'usuario no s'ha tresladato encara ta o sistema de cuentas unificato de Wikimedia'''

Si triga migrar as suyas cuentas, podrá usar o mesmo nombre d'usuario y palabra de paso ta dentrar en toz os procheutos wiki de Wikimedia en todas as luengas.
Isto fa más fázil o treballo compartito entre procheutos, como cargar archibos ta [http://commons.wikimedia.org/ Wikimedia Commons], y priba que bi aiga a confusion u o conflito que podría escaizer si dos presonas trigan o mesmo nombre d'usuario en procheutos diferents.

Si bel usuario más ha pillato o suyo nombre d'usuario en atro sitio, podrá contautar con el u con un almenistrador más entadebant.",
	'centralauth-merge-step1-title'        => 'Prenzipiar a unificazión de cuentas',
	'centralauth-merge-step1-detail'       => "A suya palabra de paso y adreza de correu-e rechistrada se comprebarán con as d'atras wikis ta confirmar si concuerdan. No se ferá garra cambio dica que confirme que o resultau pareixe correuto.",
	'centralauth-merge-step1-submit'       => "Confirmar a informazión d'a cuenta",
	'centralauth-merge-step2-title'        => 'Confirmar más cuentas',
	'centralauth-merge-step2-detail'       => "Bellas cuentas no s'han puesto concordar automaticament con o wiki endicato. Si estas cuentas le pertenexen, puede confirmar que son suyas escribindo as suyas palabras de paso.",
	'centralauth-merge-step2-submit'       => "Confirmar a informazión d'a cuenta",
	'centralauth-merge-step3-title'        => 'Creyar una cuenta unificata',
	'centralauth-merge-step3-detail'       => 'Ya ye parau ta creyar una cuenta unificada, con os siguients wikis ligatos:',
	'centralauth-merge-step3-submit'       => 'Unificar cuentas',
	'centralauth-complete'                 => "S'ha rematau a unificazión d'as cuentas!",
	'centralauth-incomplete'               => "No s'ha rematau a unificazión d'as cuentas!",
	'centralauth-complete-text'            => "Agora puede identificar-se y dentrar en cualsiquier wiki de Wikimedia sin aber de creyar una nueba cuenta; o mesmo nombre d'usuario y palabra de paso serbirá ta Wikipedia, Wiktionary, Wikibooks, y os procheutos chirmans en todas as luengas.",
	'centralauth-incomplete-text'          => "Malas que tienga un nombre d'usuario unificato, podrá identificar-se y dentrar en cualsiquier wiki de Wikimedia sin aber de creyar una nueba cuenta; o mesmo nombre d'usuario y palabra de paso serbirá ta Wikipedia, Wiktionary, Wikibooks, y os procheutos chirmans en todas as luengas.",
	'centralauth-not-owner-text'           => 'O nombre d\'usuario "$1" s\'ha asinnato ta o proprietario d\'a cuenta en $2.

Si ye bustet, puede rematar o prozeso d\'unificazión de cuentas escribindo aquí a palabra de paso mayestra ta ixa cuenta.',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Sólo modo contrimuestra</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => "A unificazión de cuentas ye autualment en modo contrimuestra / prebatina, y por ixo, s'han desautibato as operazions de fusión. Lo sentimos!",
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Leyer más sobre a '''cuenta unificata''']]...''",
	'centralauth-list-home-title'          => "Wiki d'orichen",
	'centralauth-list-home-dryrun'         => "A palabra de paso y a cuenta de correu que tiene establitas en iste wiki se ferán serbir en a suya cuenta unificata.
Más entadebant podrá cambiar cuál ye a suya wiki d'orichen.",
	'centralauth-list-attached-title'      => 'Cuentas ligatas',
	'centralauth-list-attached'            => 'A cuenta dita "$1" en cadagún d\'os siguients procheutos s\'ha ligato automaticament t\'a cuenta unificata:',
	'centralauth-list-attached-dryrun'     => 'A cuenta dita "$1" en cadagún d\'istos procheutos se ligará automaticament t\'a cuenta unificata:',
	'centralauth-list-unattached-title'    => 'Cuentas no ligatas',
	'centralauth-list-unattached'          => 'No s\'ha puesto confirmar automaticament que a cuenta "$1" le pertenexca en os siguients procheutos; por un regular, será que tiene una palabra de paso diferent d\'a suya cuenta primaria:',
	'centralauth-foreign-link'             => 'Usuario $1 en $2',
	'centralauth-finish-title'             => 'Rematar a fusión',
	'centralauth-finish-text'              => "Si estas cuenta le perteneixen, puede rematar o prozeso d'unificazión de cuentas escribindo aquí as palabras de paso d'as atras cuentas.",
	'centralauth-finish-password'          => 'Palabra de paso:',
	'centralauth-finish-login'             => "Nombre d'usuario",
	'centralauth-finish-send-confirmation' => 'Palabra de paso de correu-e',
	'centralauth-finish-problems'          => 'Tiene dificultaz, u istas atras cuentas no son suyas? [[meta:Help:Unified login problems|Como mirar aduya]]...',
	'centralauth-merge-attempt'            => "'''Comprebando a palabra de paso furnita con a reta de cuentas no unificatas...'''",
	'centralauth-attach-list-attached'     => 'A cuenta unificata "$1" encluye as siguients cuentas:',
	'centralauth-attach-title'             => 'Confirmar cuenta',
	'centralauth-attach-text'              => "Ista cuenta encara no s'ha migrato t'a cuenta unificata. Si a cuenta global ye suya, puede fusionar-ie ista cuenta escribindo a palabra de paso d'a cuenta global:",
	'centralauth-attach-submit'            => 'Migrar a cuenta',
	'centralauth-attach-success'           => "S'ha migrato a cuenta t'a cuenta unificata.",
	'centralauth'                          => "Almenistrazión d'a cuenta unificata",
	'centralauth-admin-manage'             => "Amenistrar os datos d'usuario",
	'centralauth-admin-username'           => "Nombre d'usuario:",
	'centralauth-admin-lookup'             => "Beyer u editar os datos d'usuario",
	'centralauth-admin-permission'         => "Sólo os stewards pueden unificar as cuentas d'atros usuario por ellos.",
	'centralauth-admin-unmerge'            => 'S\'ha siñalato "trestallar"',
	'centralauth-admin-merge'              => 'S\'ha siñalato "unificar"',
	'centralauth-admin-bad-input'          => 'Triga de unificazión incorreuta',
	'centralauth-admin-none-selected'      => "No s'han trigato cuentas ta cambiar.",
	'centralauth-prefs-status'             => "Status d'a cuenta global:",
	'centralauth-prefs-not-managed'        => 'No ye usando a cuenta unificata',
	'centralauth-prefs-unattached'         => 'No confirmata',
	'centralauth-prefs-complete'           => 'Tot bien!',
	'centralauth-prefs-migration'          => 'En migrazión',
	'centralauth-prefs-count-attached'     => 'A suya cuenta ye autiba en $1 {{plural:$1|procheuto|procheutos}}.',
	'centralauth-prefs-count-unattached'   => 'Quedan cuentas no confirmatas con o suyo nombre en $1 {{plural:$1|procheuto|procheutos}}.',
	'centralauth-prefs-detail-unattached'  => "Iste procheuto no s'ha confirmau como parte d'a cuenta global.",
	'centralauth-prefs-manage'             => 'Almenistrar a suya cuenta global',
	'centralauth-renameuser-abort'         => '<div class="errorbox">No se puede renombrar o usuario $1 localment pues o suyo nombre d\'usuario s\'ha migrato ta o sistema de cuentas unificatas.</div>',
);

$messages['ang'] = array(
	'centralauth-admin-username'           => 'Brūcendnama:',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'mergeaccount'                         => 'حالة توحيد الدخول',
	'centralauth-desc'                     => '[[Special:MergeAccount|دمج الحساب]] عبر ويكيات مؤسسة ويكيميديا',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|يدمج حسابات متعددة]] لدخول المستخدم الموحد',
	'centralauth-merge-denied'             => 'عذرا، أنت لا تمتلك السماح للدخول إلى هذه الصفحة.',
	'centralauth-merge-notlogged'          => 'من فضلك <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} قم بتسجيل الدخول]</span> لتتحقق من أن حساباتك تم دمجها بالكامل.',
	'centralauth-merge-welcome'            => "'''حساب المستخدم الخاص بك لم يتم نقله إلى نظام ويكيميديا لتوحيد الدخول.'''

إذا اخترت دمج حساباتك، سيمكنك استخدام نفس اسم المستخدم و كلمة السر للدخول لكل مشاريع ويكيميديا بكل اللغات المتوفرة.
هذا يجعل من السهل العمل مع المشاريع المشتركة مثل الرفع ل [http://commons.wikimedia.org/ ويكيميديا كومنز]، و يتجنب الارتباك أو التعارض الذي قد ينشأ عندما يستخدم شخصان نفس اسم المستخدم في مشاريع مختلفة.

لو كان شخص آخر أخذ اسم المستخدم الخاص بك في موقع آخر هذا لن يزعجهم، ولكن سيعطيك فرصة للتعامل معهم أو مع إداري فيما بعد.",
	'centralauth-merge-step1-title'        => 'ابدأ توحيد الدخول',
	'centralauth-merge-step1-detail'       => 'كلمة السر الخاصة بك وبريدك الإلكتروني المسجل سيتم فحصهما مع الحسابات في مواقع الويكي الأخرى للتأكد من أنهما يتطابقان. لن يتم عمل أي تغييرات حتى تؤكد أن الأمور على ما يرام.',
	'centralauth-merge-step1-submit'       => 'أكد معلومات الدخول',
	'centralauth-merge-step2-title'        => 'أكد مزيد من الحسابات',
	'centralauth-merge-step2-detail'       => 'بعض الحسابات لم يمكن مطابقتها تلقائيا لموقع الويكي الرئيسي المعين. لو أن هذه الحسابات تنتمي لك، يمكنك تأكيد ذلك عن طريق توفير كلمة السر لهم.',
	'centralauth-merge-step2-submit'       => 'أكد معلومات الدخول',
	'centralauth-merge-dryrun-complete'    => 'كل الحسابات الموجودة يمكن توحيدها تلقائيا!

لا تغييرات تمت لحساباتك بعد.',
	'centralauth-merge-dryrun-incomplete'  => 'يمكنك الاستمرار، لكن بعض الحسابات لم يمكن تأكيدها تلقائيا ولن يتم دمجها حالا. سيمكنك دمجها لاحقا.

لا تغييرات تمت لحساباتك بعد.',
	'centralauth-merge-dryrun-or'          => "'''أو'''",
	'centralauth-merge-dryrun-home'        => 'نظام الدمج لم يمكنه التأكد من أنك مالك حساب الويكي الأساسي لاسم المستخدم الخاص بك.

ويكي آخر تم تحديده كالحساب الأساسي لاسم المستخدم الخاص بك؛ اتبع الوصلة بالأسفل وسجل الدخول هناك لإنهاء دمج حسابك.',
	'centralauth-merge-step3-title'        => 'أنشىء الحساب الموحد',
	'centralauth-merge-step3-detail'       => 'أنت جاهز لإنشاء حسابك الموحد، وستكون مواقع الويكي التالية ملحقة به:',
	'centralauth-merge-step3-submit'       => 'وحد الحسابات',
	'centralauth-complete'                 => 'توحيد الدخول اكتمل!',
	'centralauth-incomplete'               => 'توحيد الدخول لم يكتمل!',
	'centralauth-complete-text'            => 'يمكنك الآن الدخول لأي مشروع من مشاريع ويكيميديا بدون إنشاء حساب جديد؛ نفس اسم المستخدم وكلمة السر ستعمل في ويكيبيديا وويكاموس وويكي الكتب ومشاريعهم الشقيقة بكل اللغات.',
	'centralauth-incomplete-text'          => 'عندما يتم توحيد دخولك، يمكنك الدخول لأي مشروع من مشاريع ويكيميديا بدون إنشاء حساب جديد؛ نفس اسم المستخدم وكلمة السر ستعمل في ويكيبيديا وويكاموس وويكي الكتب ومشاريعهم الشقيقة بكل اللغات.',
	'centralauth-not-owner-text'           => 'اسم المستخدم "$1" تم إعطاؤه تلقائيا لمالك الحساب على $2.

لو كان هذا أنت، يمكنك إنهاء عملية توحيد الدخول ببساطة بكتابة كلمة السر الرئيسية لذلك الحساب هنا:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>نمط التجربة فقط</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'توحيد الحساب حاليا في طور التجربة/تصحيح الأخطاء، لذا عمليات الدمج الفعلية معطلة. عذرا!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|اقرأ المزيد حول '''الدخول الموحد''']]...''",
	'centralauth-list-home-title'          => 'موقع الويكي الرئيسي',
	'centralauth-list-home-dryrun'         => 'كلمة السر وعنوان البريد الإلكتروني المحدد في هذا الويكي سيتم استخدامهما لحسابك الموحد. سيمكنك تغيير أيها هي موقع الويكي الرئيسي الخاص بك فيما بعد.',
	'centralauth-list-attached-title'      => 'الحسابات الملحقة',
	'centralauth-list-attached'            => 'الحساب المسمى "$1" على كل من المواقع التالية تم إلحاقه تلقائيا بالحساب الموحد:',
	'centralauth-list-attached-dryrun'     => 'الحساب المسمى "$1" على كل من المواقع التالية سيتم إلحاقها تلقائيا للحساب الموحد:',
	'centralauth-list-unattached-title'    => 'حسابات غير ملحقة',
	'centralauth-list-unattached'          => 'الحساب "$1" لم يمكن تأكيده تلقائيا كمنتمي لك في المواقع التالية؛ على الأرجح لأنهم يمتلكون كلمة سر مختلفة عن حسابك الأساسي:',
	'centralauth-foreign-link'             => 'المستخدم $1 في $2',
	'centralauth-merge-method-primary'     => 'الويكي الأساسي',
	'centralauth-merge-method-empty'       => 'لا مساهمات',
	'centralauth-merge-method-mail'        => 'مؤكدة بواسطة البريد الإلكتروني',
	'centralauth-merge-method-password'    => 'مؤكدة بواسطة كلمة السر',
	'centralauth-merge-method-admin'       => 'حساب إداري مدمج',
	'centralauth-merge-method-new'         => 'حساب جديد',
	'centralauth-merge-method-login'       => 'مؤكدة بواسطة تسجيل الدخول',
	'centralauth-finish-title'             => 'انتهاء الدمج',
	'centralauth-finish-text'              => 'لو كانت هذه الحسابات تنتمي لك, يمكنك إنهاء عملية توحيد الدخول ببساطة بكتابة كلمات السر للحسابات الأخرى هنا:',
	'centralauth-finish-password'          => 'كلمة السر:',
	'centralauth-finish-login'             => 'دخول',
	'centralauth-finish-send-confirmation' => 'أرسل كلمة السر عبر البريد الإلكتروني',
	'centralauth-finish-problems'          => 'لديك مشكلة، أو لا تمتلك هذه الحسابات الأخرى؟ [[meta:Help:Unified login problems|كيف تجد المساعدة]]...',
	'centralauth-finish-noconfirms'        => 'لا حسابات يمكن تأكيدها بواسطة كلمة السر هذه.',
	'centralauth-finish-incomplete'        => 'عدة حسابات تم دمجها باستخدام كلمة السر هذه. الحسابات الأخرى لم يتم تأكيدها بعد.',
	'centralauth-merge-attempt'            => "'''التحقق من كلمة السر المعطاة ضد الحسابات الباقية غير المدمجة...'''",
	'centralauth-attach-list-attached'     => 'الحساب الموحد المسمى "$1" يتضمن الحسابات التالية:',
	'centralauth-attach-title'             => 'تأكيد الحساب',
	'centralauth-attach-text'              => 'هذا الحساب لم يتم دمجه بعد مع الحساب الموحد. لو أن الحساب العام ملكك أيضا، يمكنك دمج هذا الحساب لو كتبت كلمة سر الحساب العام:',
	'centralauth-attach-submit'            => 'دمج الحساب',
	'centralauth-attach-success'           => 'الحساب تم دمجه مع الحساب الموحد.',
	'centralauth'                          => 'إدارة الدخول الموحد',
	'centralauth-admin-manage'             => 'إدارة بيانات المستخدم',
	'centralauth-admin-username'           => 'اسم المستخدم:',
	'centralauth-admin-lookup'             => 'عرض أو تعديل بيانات المستخدم',
	'centralauth-admin-permission'         => 'فقط المضيفون يمكنهم أن يدمجوا حسابات الآخرين.',
	'centralauth-admin-no-unified'         => 'لا حساب موحد لاسم المستخدم هذا.',
	'centralauth-admin-info-id'            => 'رقم المستخدم:',
	'centralauth-admin-info-registered'    => 'مسجلة:',
	'centralauth-admin-info-locked'        => 'مغلقة:',
	'centralauth-admin-info-hidden'        => 'مخفية:',
	'centralauth-admin-yes'                => 'نعم',
	'centralauth-admin-no'                 => 'لا',
	'centralauth-admin-attached'           => 'حسابات مدمجة بالكامل',
	'centralauth-admin-unattached'         => 'حسابات غير مرتبطة',
	'centralauth-admin-no-unattached'      => 'لا حسابات غير مدمجة باقية.',
	'centralauth-admin-list-localwiki'     => 'الويكي المحلي',
	'centralauth-admin-list-attached-on'   => 'مرتبطة',
	'centralauth-admin-list-method'        => 'طريقة',
	'centralauth-admin-unmerge'            => 'تم اختيار الفصل',
	'centralauth-admin-merge'              => 'تم اختيار الدمج',
	'centralauth-admin-bad-input'          => 'اختيار دمج غير صحيح',
	'centralauth-admin-none-selected'      => 'لم يتم اختيار حسابات للدمج',
	'centralauth-admin-already-unmerged'   => 'تجاوز $1، غير مدمج بالفعل',
	'centralauth-admin-unmerge-success'    => 'بنجاح أزال دمج $1 {{PLURAL:$2|حساب|حساب}}',
	'centralauth-admin-delete-title'       => 'حذف الحساب',
	'centralauth-admin-delete-description' => 'حذف الحساب العام سيحذف أية تفضيلات عامة، فصل ارتباط كل الحسابات المحلية، ويترك الاسم العام حرا لأي مستخدم ليأخذه.
كل الحسابات المحلية ستستمر في الوجود.
كلمات السر للحسابات المحلية المنشأة قبل الدمج ستسترجع إلى قيمها قبل الدمج.',
	'centralauth-admin-delete-button'      => 'حذف هذا الحساب',
	'centralauth-admin-delete-success'     => 'بنجاح حذف الحساب العام ل "<nowiki>$1</nowiki>"',
	'centralauth-admin-nonexistent'        => 'لا يوجد حساب عام ل "<nowiki>$1</nowiki>"',
	'centralauth-admin-delete-nonexistent' => 'خطأ: الحساب العام "<nowiki>$1</nowiki>" غير موجود.',
	'centralauth-token-mismatch'           => 'عذرا، لم نستطع معالجة طلبك نتيجة لفقد بيانات الجلسة.',
	'centralauth-seconds-ago'              => 'منذ $1 {{PLURAL:$1|ثانية|ثانية}}',
	'centralauth-minutes-ago'              => 'منذ $1 {{PLURAL:$1|دقيقة|دقيقة}}',
	'centralauth-hours-ago'                => 'منذ $1 {{PLURAL:$1|ساعة|ساعة}}',
	'centralauth-days-ago'                 => 'منذ $1 {{PLURAL:$1|يوم|يوم}}',
	'centralauth-months-ago'               => 'منذ $1 {{PLURAL:$1|شهر|شهر}}',
	'centralauth-years-ago'                => 'منذ $1 {{PLURAL:$1|سنة|سنة}}',
	'centralauth-prefs-status'             => 'حالة الحساب العام:',
	'centralauth-prefs-not-managed'        => 'لا يستخدم الحساب الموحد',
	'centralauth-prefs-unattached'         => 'غير مؤكد',
	'centralauth-prefs-complete'           => 'الكل في ترتيب!',
	'centralauth-prefs-migration'          => 'في الهجرة',
	'centralauth-prefs-count-attached'     => 'حسابك نشط في $1 مشروع.',
	'centralauth-prefs-count-unattached'   => 'حسابات غير مؤكدة باسمك موجودة في $1 مشروع.',
	'centralauth-prefs-detail-unattached'  => 'موقع المشروع هذا لم يتم تأكيده كمنتمي للحساب العام.',
	'centralauth-prefs-manage'             => 'أدر حسابك العام',
	'centralauth-renameuser-abort'         => '<div class="errorbox">لا يمكن إعادة تسمية المستخدم $1 محليا حيث أن اسم المستخدم هذا تم نقله إلى نظام الدخول الموحد.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">لم يمكن إعادة تسمية المستخدم $2 لأن اسم المستخدم هذا محجوز لحساب عام.</div>',
	'centralauth-invalid-wiki'             => 'لا توجد قاعدة بيانات ويكي كهذه: $1',
	'centralauth-account-exists'           => 'لم يمكن إنشاء الحساب: اسم المستخدم المطلوب مأخوذ بالفعل في نظام الدخول الموحد.',
);

/** Asturian (Asturianu)
 * @author Esbardu
 * @author Siebrand
 */
$messages['ast'] = array(
	'mergeaccount'                         => 'Estatus de fusión de cuentes',
	'centralauth-desc'                     => 'Fusiona cuentes ente les wikis de la Fundación Wikimedia',
	'centralauth-merge-notlogged'          => 'Por favor <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} identifícate]</span> pa comprobar si les tos cuentes se fusionaron completamente.',
	'centralauth-merge-welcome'            => "'''La to cuenta d'usuariu inda nun foi migrada al sistema de cuentes fusionaes de Wikimedia.'''

Si decides migrar les tos cuentes, podrás usar el mesmu nome d'usuariu y la mesma clave pa identificate en toles wikis de Wikimedia de cualesquier llingua disponible.
Esto facilita trabayar con proyeutos compartíos como les xubíes a [http://commons.wikimedia.org/ Wikimedia Commons], y evita la confusión o'l conflictu que pudiera surdir al escoyer dos persones el mesmu nome d'usuariu en proyeutos distintos.

Si daquién yá escoyó'l to nome d'usuariu n'otru sitiu nun habría haber problema, yá que podrás ponete en contautu con él o con un alministrador más tarde.",
	'centralauth-merge-step1-title'        => 'Emprimar la fusión de cuentes',
	'centralauth-merge-step1-detail'       => 'La to clave y la to direición rexistrada de corréu electrónicu van ser comprobaes coles de les cuentes de les demás wikis pa confirmar que concueyen. Nun se van facer cambeos hasta que confirmes que too ta correcho.',
	'centralauth-merge-step1-submit'       => 'Confirmar la fusión de cuentes',
	'centralauth-merge-step2-title'        => 'Confirmar más cuentes',
	'centralauth-merge-step2-detail'       => 'Dalgunes de les cuentes nun pudieron ser automáticamente asociaes a la wiki principal conseñada. Si estes cuentes son de yo, pues confirmalo escribiendo la so clave.',
	'centralauth-merge-step2-submit'       => 'Confirmar la información de cuentes',
	'centralauth-merge-step3-title'        => 'Crear la cuenta fusionada',
	'centralauth-merge-step3-detail'       => 'Tas a piques de crear la to cuenta fusionada, coles siguientes wikis asociaes:',
	'centralauth-merge-step3-submit'       => 'Fusionar cuentes',
	'centralauth-complete'                 => '¡Fusión de cuentes completada!',
	'centralauth-incomplete'               => '¡Fusión de cuentes non completada!',
	'centralauth-complete-text'            => "Agora yá pues identificate en cualesquier wiki de Wikimedia ensin crear una cuenta nueva; el mesmu nome d'usuariu y la mesma clave van funcionar en Wikipedia, Wiktionary, Wikiboos y los sos proyeutos hermanos en cualesquier llingua.",
	'centralauth-incomplete-text'          => "En cuantes que la to cuenta tea fusionada, podrás identificate en cualesquier wiki de Wikimedia ensin crear una cuenta nueva; el mesmu nome d'usuariu y la mesma clave van funcionar en Wikipedia, Wiktionary, Wikiboos y los sos proyeutos hermanos en cualesquier llingua.",
	'centralauth-not-owner-text'           => 'El nome d\'usuariu "$1" asignóse automáticamente al poseyedor de la cuenta en $2.

Si yes tu, pues finar el procesu de fusión de cuentes escribiendo simplemente la clave maestra pa esa cuenta equí:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Namái mou demo</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'La fusión de cuentes ta nestos momentos nun estáu de depuración / demo, polo que les operaciones de fusión tán desactivaes anguaño. ¡Sentímoslo!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Llei más tocante a '''cuenta fusionada''']]...''",
	'centralauth-list-home-title'          => 'Wiki principal',
	'centralauth-list-home-dryrun'         => 'La clave y la direición de corréu electrónicu conseñaos nesta wiki va ser usada pola to cuenta fusionada.
Podrás camudar cuála ye la to wiki principal más tarde.',
	'centralauth-list-attached-title'      => 'Cuentes asociaes',
	'centralauth-list-attached'            => 'La cuenta nomada "$1" en caún de los siguientes sitios foi asociada automáticamente a la cuenta fusionada:',
	'centralauth-list-attached-dryrun'     => 'La cuenta nomada "$1" en caún de los siguientes sitios va ser asociada automáticamente a la cuenta fusionada:',
	'centralauth-list-unattached-title'    => 'Cuentes non asociaes',
	'centralauth-list-unattached'          => 'Nun se pudo confirmar automáticamente que la cuenta "$1" ye de to nos siguientes sitios; lo más probable ye que tengan claves distintes a les de la to cuenta primaria:',
	'centralauth-foreign-link'             => 'Usuariu $1 en $2',
	'centralauth-finish-title'             => 'Completar la fusión',
	'centralauth-finish-text'              => 'Si estes cuentes son de to, pues finar el procesu de fusión de cuentes escribiendo simplemente les claves de les otres cuentes equí:',
	'centralauth-finish-password'          => 'Clave:',
	'centralauth-finish-login'             => 'Cuenta',
	'centralauth-finish-send-confirmation' => 'Clave de corréu electrónicu',
	'centralauth-finish-problems'          => '¿Tienes problemes o nun poseyes estes otres cuentes? [[meta:Help:Unified login problems|Cómo atopar aida]]...',
	'centralauth-merge-attempt'            => "'''Comprobando la clave conseñada pa les cuentes non fusionaes...'''",
	'centralauth-attach-list-attached'     => 'La cuenta fusionada nomada "$1" inclúi les siguientes cuentes:',
	'centralauth-attach-title'             => 'Confirmar cuenta',
	'centralauth-attach-text'              => 'Esta cuenta inda nun foi migrada a la cuenta fusionada. Si la cuenta global tamién ye de to, pues fusionar esta cuenta escribiendo la clave de cuenta global:',
	'centralauth-attach-submit'            => 'Migrar cuenta',
	'centralauth-attach-success'           => 'La cuenta foi migrada a la cuenta fusionada.',
	'centralauth'                          => 'Alministración de cuentes fusionaes',
	'centralauth-admin-manage'             => "Remanar los datos d'usuariu",
	'centralauth-admin-username'           => "Nome d'usuariu:",
	'centralauth-admin-lookup'             => "Ver o editar los datos d'usuariu",
	'centralauth-admin-permission'         => "Namái los stewards puen fusionar les cuentes d'otres persones por ellos.",
	'centralauth-admin-unmerge'            => 'Dixebrar seleicionaes',
	'centralauth-admin-merge'              => 'Fusionar seleicionaes',
	'centralauth-admin-bad-input'          => 'Seleición de fusión non válida',
	'centralauth-admin-none-selected'      => 'Nun se seleicionaron cuentes pa modificar.',
	'centralauth-prefs-status'             => 'Estatus de cuenta global:',
	'centralauth-prefs-not-managed'        => 'Nun se ta usando la cuenta fusionada',
	'centralauth-prefs-unattached'         => 'Non confirmada',
	'centralauth-prefs-complete'           => "¡Too n'orde!",
	'centralauth-prefs-migration'          => 'Migrando',
	'centralauth-prefs-count-attached'     => 'La to cuenta ta activa {{plural:$1|nun sitiu|en $1 sitios}} de proyeutu.',
	'centralauth-prefs-count-unattached'   => 'Queden cuentes non confirmaes col to nome {{plural:$1|nun proyeutu|en $1 proyeutos}}.',
	'centralauth-prefs-detail-unattached'  => "Nun se confirmó la pertenencia d'esti sitiu de proyeutu a la cuenta global.",
	'centralauth-prefs-manage'             => 'Remanar la to cuenta global',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Nun se pue renomar llocalmente al usuariu $1 yá que esti nome d\'usuariu foi migráu al sistema de cuentes fusionaes.</div>',
);

/** Kotava (Kotava)
 * @author Wikimistusik
 */
$messages['avk'] = array(
	'centralauth-merge-step1-submit'    => 'Va dogluyaragivara gruyel !',
	'centralauth-merge-step2-title'     => 'Va lo pata se gruyel !',
	'centralauth-merge-step2-submit'    => 'Va dogluyaragivara gruyel !',
	'centralauth-merge-step3-title'     => 'Redura va tutanana pata',
	'centralauth-merge-step3-submit'    => 'Tutanara va pata se',
	'centralauth-list-attached-title'   => 'Benef pateem',
	'centralauth-list-unattached-title' => 'Mebenef pateem',
	'centralauth-foreign-link'          => '$1 favesik moe $2',
	'centralauth-attach-title'          => 'Patagruyera',
	'centralauth-attach-submit'         => 'Patarrundara',
	'centralauth-admin-manage'          => 'Bowera va favesikorigeem',
	'centralauth-admin-username'        => 'Favesikyolt :',
	'centralauth-admin-lookup'          => 'Wira va favesikorigeem oku betara',
	'centralauth-admin-unmerge'         => 'Voljoara rebana',
	'centralauth-admin-merge'           => 'Joara rebana',
);

$messages['bcl'] = array(
	'centralauth-list-home-title'          => 'Harong na wiki',
	'centralauth-finish-login'             => 'Maglaog',
);

/** Belarusian (Беларуская)
 * @author Yury Tarasievich
 */
$messages['be'] = array(
	'mergeaccount'                   => 'Стан уніфікацыі рахункаў',
	'centralauth-desc'               => "[[Special:MergeAccount|Аб'яднанне рахункаў]] на вікі-пляцоўках Фонду Вікімедыя",
	'centralauth-mergeaccount-desc'  => "[[Special:MergeAccount|Аб'ядноўвае некалькі рахункаў]] у Адзінае Прадстаўленне",
	'centralauth-merge-denied'       => 'На жаль, вам не дазволены доступ да гэтай старонкі.',
	'centralauth-merge-step3-submit' => "Аб'яднаць рахункі",
	'centralauth-complete'           => "Аб'яднанне рахункаў завершана!",
	'centralauth-incomplete'         => "Аб'яднанне рахункаў не завершана!",
	'centralauth-finish-password'    => 'Пароль:',
	'centralauth-admin-username'     => 'Імя ўдзельніка:',
	'centralauth-admin-yes'          => 'так',
	'centralauth-admin-no'           => 'не',
	'centralauth-seconds-ago'        => '$1 секунд{{PLURAL:$1|у|аў}} таму',
	'centralauth-minutes-ago'        => '$1 мінут{{PLURAL:$1|у|аў}} таму',
	'centralauth-hours-ago'          => '$1 гадзін{{PLURAL:$1|у|аў}} таму',
	'centralauth-days-ago'           => '$1 {{PLURAL:$1|дзень|дзён}} таму',
	'centralauth-months-ago'         => '$1 месяц{{PLURAL:$1||аў}} таму',
	'centralauth-years-ago'          => '$1 {{PLURAL:$1|год|гадоў}} таму',
	'centralauth-prefs-status'       => 'Стан глабальнага рахунку:',
	'centralauth-prefs-not-managed'  => 'Уніфікаваны рахунак не ўжываецца',
	'centralauth-prefs-unattached'   => 'Не пацверджана',
	'centralauth-prefs-complete'     => 'Усё ў парадку!',
	'centralauth-prefs-migration'    => 'Адбываецца перанос',
);

/** Bulgarian (Български)
 * @author DCLXVI
 * @author Borislav
 * @author Spiritia
 */
$messages['bg'] = array(
	'mergeaccount'                         => 'Състояние на обединението на сметки',
	'centralauth-desc'                     => '[[Special:MergeAccount|Сливане на потребителски сметки]] от няколко уикита',
	'centralauth-merge-denied'             => 'За съжаление, нямате права за достъп до тази страница.',
	'centralauth-merge-step1-title'        => 'Започване на обединението на сметки',
	'centralauth-merge-step1-submit'       => 'Потвърждаване на информацията за влизане',
	'centralauth-merge-step2-title'        => 'Потвърждаване на още сметки',
	'centralauth-merge-step2-submit'       => 'Потвърждаване на информацията за влизане',
	'centralauth-merge-dryrun-or'          => "'''или'''",
	'centralauth-merge-step3-title'        => 'Създаване на единна сметка',
	'centralauth-merge-step3-detail'       => 'Създаването на единната сметка може да започне. Следните уикита ще бъдат прикрепени към нея:',
	'centralauth-merge-step3-submit'       => 'Обединяване на сметките',
	'centralauth-complete'                 => 'Обединението на сметките завърши!',
	'centralauth-incomplete'               => 'Обединението на сметките не е завършено!',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Само демонстрационен режим</div><br clear='all'/>",
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Прочетете повече за системата за '''единно влизане''']]…''",
	'centralauth-list-home-title'          => 'Домашно уики',
	'centralauth-list-attached-title'      => 'Прикрепени сметки',
	'centralauth-list-attached'            => 'Потребителската сметка „$1“ на всеки от следните сайтове беше автоматично прикачена към унифицираната сметка:',
	'centralauth-list-attached-dryrun'     => 'Потребителската сметка „$1“ на всеки от следните сайтове ще бъде автоматично прикачена към унифицираната сметка:',
	'centralauth-list-unattached-title'    => 'Неприкрепени сметки',
	'centralauth-foreign-link'             => 'Потребител $1 от $2',
	'centralauth-merge-method-empty'       => 'няма приноси',
	'centralauth-merge-method-new'         => 'нова сметка',
	'centralauth-finish-title'             => 'Приключване на сливането',
	'centralauth-finish-text'              => 'Ако следните сметки са ваши, можете да приключите процеса по унифициране на сметките като въведете паролите за другите сметки тук:',
	'centralauth-finish-password'          => 'Парола:',
	'centralauth-finish-login'             => 'Влизане',
	'centralauth-finish-send-confirmation' => 'Пращане на паролата по е-пощата',
	'centralauth-finish-problems'          => 'Имате ли проблеми или просто не притежавате тези сметки? [[meta:Help:Unified login problems|Потърсете помощ]]…',
	'centralauth-merge-attempt'            => "'''Проверка на въведената парола с останалите неслети сметки…'''",
	'centralauth-attach-list-attached'     => 'Единната сметка на име „$1“ включва следните сметки:',
	'centralauth-attach-title'             => 'Потвърждаване на сметка',
	'centralauth-attach-text'              => 'Тази сметка все още не е прехвърлена към единната сметка. Ако единната сметка е ваша, можете да я слеете с настоящата сметка, като въведете паролата за единната сметка:',
	'centralauth-attach-submit'            => 'Мигриране на сметка',
	'centralauth-attach-success'           => 'Сметката е била прехвърлена към единната сметка.',
	'centralauth'                          => 'Управление на единните сметки',
	'centralauth-admin-manage'             => 'Управление на потребителските данни',
	'centralauth-admin-username'           => 'Потребителско име:',
	'centralauth-admin-lookup'             => 'Преглед и редактиране на потребителските данни',
	'centralauth-admin-permission'         => 'Само стюарди могат да сливат потребителските сметки на други потребители.',
	'centralauth-admin-info-id'            => 'Потребителски номер:',
	'centralauth-admin-info-registered'    => 'Регистрация:',
	'centralauth-admin-yes'                => 'да',
	'centralauth-admin-no'                 => 'не',
	'centralauth-admin-list-method'        => 'Метод',
	'centralauth-admin-unmerge'            => 'Разделяне на избраните',
	'centralauth-admin-merge'              => 'Сливане на избраните',
	'centralauth-admin-bad-input'          => 'Невалиден избор за сливане',
	'centralauth-admin-none-selected'      => 'Не са избрани сметки за промяна.',
	'centralauth-admin-delete-button'      => 'Изтриване на сметката',
	'centralauth-admin-delete-success'     => 'Глобалната сметка за „<nowiki>$1</nowiki>“ беше изтрита успешно',
	'centralauth-admin-nonexistent'        => 'Не съществува глобална сметка за „<nowiki>$1</nowiki>”',
	'centralauth-admin-delete-nonexistent' => 'Грешка: Не съществува глобална сметка „<nowiki>$1</nowiki>”.',
	'centralauth-admin-lock-title'         => 'Заключване на сметка',
	'centralauth-admin-lock-description'   => 'Заключването на сметка ще направи невъзможно влизането в кое да е уики.',
	'centralauth-admin-lock-button'        => 'Заключване на сметката',
	'centralauth-admin-lock-success'       => 'Глобалната сметка за „<nowiki>$1</nowiki>“ беше успешно заключена',
	'centralauth-admin-lock-nonexistent'   => 'Грешка: Не съществува глобална сметка „<nowiki>$1</nowiki>“.',
	'centralauth-admin-unlock-title'       => 'Отключване на сметка',
	'centralauth-admin-unlock-description' => 'Отключването на сметка ще направи възможно влизането с нея в уикитата.',
	'centralauth-admin-unlock-button'      => 'Отключване на сметката',
	'centralauth-admin-unlock-success'     => 'Успешно отключена глобална сметка за „<nowiki>$1</nowiki>“',
	'centralauth-admin-unlock-nonexistent' => 'Грешка: Не съществува глобална сметка „<nowiki>$1</nowiki>“.',
	'centralauth-admin-reason'             => 'Причина:',
	'centralauth-seconds-ago'              => 'преди $1 {{PLURAL:$1|секунда|секунди}}',
	'centralauth-minutes-ago'              => 'преди $1 {{PLURAL:$1|минута|минути}}',
	'centralauth-hours-ago'                => 'преди $1 {{PLURAL:$1|час|часа}}',
	'centralauth-days-ago'                 => 'преди $1 {{PLURAL:$1|ден|дни}}',
	'centralauth-months-ago'               => 'преди $1 {{PLURAL:$1|месец|месеца}}',
	'centralauth-years-ago'                => 'преди $1 {{PLURAL:$1|година|години}}',
	'centralauth-prefs-status'             => 'Състояние на потребителските сметки:',
	'centralauth-prefs-not-managed'        => 'Не се използва единна сметка',
	'centralauth-prefs-unattached'         => 'Непотвърден',
	'centralauth-prefs-complete'           => 'Всичко е наред!',
	'centralauth-prefs-migration'          => 'Преносът е в ход',
	'centralauth-prefs-count-attached'     => 'Сметката ви е активна в {{plural:$1|един проект|$1 проекта}}.',
	'centralauth-prefs-count-unattached'   => '{{plural:$1|В един проект е останала непотвърдена сметка|В $1 проекта са останали непотвърдени сметки}} с вашето име.',
	'centralauth-prefs-detail-unattached'  => 'За този проект липсва потвърждение, че принадлежи към единната сметка.',
	'centralauth-prefs-manage'             => 'Управление на глобалната сметка',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Не е възможно локалното преименуване на $1, защото това потребителско име е било прехвърлено към системата за единно влизане.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Потребителят $2 не може да бъде преименуван, тъй като новото потребителско име е запазено за глобална сметка.</div>',
	'centralauth-invalid-wiki'             => 'Не съществува такава база данни: $1',
);

/** Bengali (বাংলা)
 * @author Bellayet
 * @author Zaheen
 */
$messages['bn'] = array(
	'mergeaccount'                         => 'লগ-ইন একত্রিকরণ অবস্থা',
	'centralauth-desc'                     => 'উইকিমিডিয়া ফাউন্ডেশন উইকিসমূহের মধ্যে অ্যাকাউন্ট একীভূত করো',
	'centralauth-merge-notlogged'          => 'দয়াকরে <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} লগ-ইন করুন]</span> যাতে পরীক্ষা করতে পারেন আপনার অ্যাকাউন্ট সম্পূর্ণরূপে একীভূত হয়েছে কিনা।',
	'centralauth-merge-welcome'            => "'''আপনার ব্যবহারকারী অ্যাকাউন্ট উইকিমিডিয়ার একীভূত লগ-ইন পদ্ধতির সাথে একীভূত করা হয় নাই।'''

যদি একীভূত করার জন্য আপনার অ্যাকাউন্ট পছন্দ করেন, তাহলে আপনি উইকিমিডিয়ার প্রকল্পে সমস্ত ভাষার উইকিতে একই ব্যবহারকারী নাম এবং শব্দচাবি দিয়ে লগ-ইন করতে পারবেন।

এটি সহপ্রকল্পকে কাজ করা যেমন [http://commons.wikimedia.org/ উইকিমিডিয়া কমন্স] এ আপলোড করা সহজ করবে, এবং একই ব্যবহারকারী নাম বিভিন্ন প্রকল্পে একাধিক ব্যক্তি ব্যবহার করা নিয়ে দ্বিধা দ্বন্দের অবসা করবে।

যদি অন্য কেউ ইতিমধ্যে এই ব্যবহারকারী নাম অন্যকেউ অন্য কোন সাইটে ব্যবহার করে থাকে, তাদের বিরক্ত করবেন না, তবে এ ব্যপারে আপনাকে তাদের অথবা কোন প্রশাসকের সাথে কাজ করার সুযোগ করে দিবে।",
	'centralauth-merge-step1-title'        => 'লগইন একত্রীকরণ শুরু করো',
	'centralauth-merge-step1-detail'       => 'আপনার শব্দচাবি এবং নিবন্ধকৃত ইমেইল ঠিকানা, আপনার অ্যাকাউন্টের বিপক্ষে পরীক্ষা করা হবে যাতে অন্য উইকিতে নিশ্চিতভাবে মিলে যায়। এটি ঠিক আছে তা আপনি নিশ্চত না করা পর্যন্ত কোন পরিবর্তন করা হবে না।',
	'centralauth-merge-step1-submit'       => 'লগইন তথ্য নিশ্চিত করুন',
	'centralauth-merge-step2-title'        => 'আরও অ্যাকাউন্ট নিশ্চিত করুন',
	'centralauth-merge-step2-detail'       => 'কিছু অ্যাকাউন্টসমূহ সয়ংক্রিয় ভাবে আপনার প্রধান উইকির অ্যাকাউন্টের সাথে মিলে না। যদি ঐ অ্যাকাউন্টসমূহ আপনার হয়ে থাকে, শব্দচাবি ব্যবহার করে আপনি নিশ্চিত করুন যে  ঐ অ্যাকাউন্টগুলো আপনার।',
	'centralauth-merge-step2-submit'       => 'লগইন তথ্য নিশ্চিত করুন',
	'centralauth-merge-step3-title'        => 'একত্রিত অ্যাকাউন্ট সৃষ্টি করা হোক',
	'centralauth-merge-step3-detail'       => 'আপনি আপনার একত্রিত অ্যাকাউন্ট সৃষ্টি করতে প্রস্তুত, সাথে নিচের উইকিগুলি সংযুক্ত হবে:',
	'centralauth-merge-step3-submit'       => 'অ্যাকাউন্ট একত্রিত করা হোক',
	'centralauth-complete'                 => 'অ্যাকাউন্ট একত্রীকরণ সমাপ্ত!',
	'centralauth-incomplete'               => 'অ্যাকাউন্ট একত্রীকরণ নিষ্পন্ন হয়নি!',
	'centralauth-complete-text'            => 'আপনি এখন যেকোন উইকিমিডিয়া উইকি সাইটে অ্যাকাউন্ট তৈরি ছাড়াই লগ-ইন করতে পারবেন; উইকিপিডিয়া, উইকশনারি, উইকিবুক এবং সকল ভাষায় তাদের সহ প্রকল্পসমূহে  একই ব্যবহারকারী নাম এবং শব্দচাবি কাজ করবে।',
	'centralauth-incomplete-text'          => 'একবার আপনার লগ-ইন একীভূত হয়ে গেলে, আপনি যেকোন উইকিমিডিয়া উইকিতে নতুন অ্যাকাউন্ট তৈরি করা ছাড়াই লগ-ইন করতে পারবেন; উইকিপিডিয়া, উইকশনারি, উইকিবুক এবং সকল ভাষায় তাদের সহ প্রকল্পসমূহে একই ব্যবহারকারী নাম এবং শব্দচাবি কাজ করবে।',
	'centralauth-not-owner-text'           => 'ব্যবহারকারী নাম "$1" সয়ংক্রিয়ভাবে $2 তে অ্যাকাউন্টের মালিকের জন্য বরাদ্দ হয়েছে।

যদি আপনিই তিনি হন, তাহলে এখনে দেওয়া মূল/মাস্টার শব্দচাবি দিতে লগ-ইন করে লগ-ইন একীভূতকরণ শেষ করতে পারেন:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>ডেমো/পরীক্ষামূলক অবস্থা</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'অ্যাকাউন্ট একীভূতকরণ বর্তমানে ডেমো/পরীক্ষামূলক অবস্থায় আছে, তাই মূল একীকরণের কাজ সক্রিয় নয়। দুঃখিত!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|'''একীভূত লগ-ইন''' সম্পর্কে আরও পড়ুন]]...''",
	'centralauth-list-home-title'          => 'প্রধান উইকি',
	'centralauth-list-home-dryrun'         => 'এই উইকিতে দেওয়া শব্দচাবি এবং ইমেইল ঠিকানা আপনার একীভূত অ্যাকাউন্টের জন্য ব্যবহৃত হয়েছে, এবং আপনার ব্যবহারকারীপাতা এখান থেকে সয়ংক্রিয়ভাবে অন্যান্য উইকিসমূহে সংযুক্ত হবে। আপনার প্রধান উইকিতে যা আছে তা আপনি পরবর্তীতে পরিবর্তন করতে পারবেন।',
	'centralauth-list-attached-title'      => 'সংগবদ্ধ অ্যাকাউন্ট',
	'centralauth-list-attached'            => 'এই সমস্ত সাইটে সয়ংক্রিয়ভাবে অ্যাকাউন্ট নাম "$1" একীভূত অ্যাকাউন্টের সাথে যুক্ত হয়েছে:',
	'centralauth-list-attached-dryrun'     => 'এই সমস্ত সাইটে সয়ংক্রিয়ভাবে অ্যাকাউন্ট নাম "$1" একীভূত অ্যাকাউন্টের সাথে যুক্ত হবে:',
	'centralauth-list-unattached-title'    => 'অসংগবদ্ধ অ্যাকাউন্ট',
	'centralauth-list-unattached'          => 'অ্যাকাউন্ট "$1" সয়ংক্রিয়ভাবে এই সমস্ত সাইটে আপনাকে দেওয়ার জন্য নিশ্চিত করা যাচ্ছে না; সম্ভবত এগুলোতে আপনার প্রধান অ্যাকাউন্ট থেকে ভিন্ন শব্দচাবি ব্যবহৃত হয়েছে:',
	'centralauth-foreign-link'             => 'ব্যবহারকারী $2 তে $1',
	'centralauth-finish-title'             => 'একত্রীকরণ সম্পন্ন হয়েছে',
	'centralauth-finish-text'              => 'যদি এই অ্যাকাউন্টসমূহ আপনার হয়, তাহলে আপনি সহজেই অ্যাকাউন্টগুলোর জন্য শব্দচাবি প্রদান করে লগ-ইন একীভূতকরণের কাজ সম্পূর্ণ করতে পারেন:',
	'centralauth-finish-password'          => 'শব্দচাবি:',
	'centralauth-finish-login'             => 'প্রবেশ',
	'centralauth-finish-send-confirmation' => 'ই-মেইল শব্দচাবি',
	'centralauth-finish-problems'          => 'সমস্যা হচ্ছে, অথবা এই অ্যাকাউন্টসমূহ আপনার নয়? [[meta:Help:Unified login problems|কিভাবে সাহায্য খুজতে হবে]]...',
	'centralauth-merge-attempt'            => "'''প্রদত্ত শব্দচাবি বাকি বিচ্ছিন্ন অ্যাকাউন্টের বিপক্ষে পরীক্ষা করা হচ্ছে...'''",
	'centralauth-attach-list-attached'     => 'অ্যাকাউন্ট "$1" যে সব অ্যাকাউন্টসমূহের সাথে একীভূত হয়েছে:',
	'centralauth-attach-title'             => 'অ্যাকাউন্ট নিশ্চিত করুন',
	'centralauth-attach-text'              => 'এই অ্যাকাউন্টটি এখনও একীভূত অ্যাকাউন্টে সরিয়ে নেওয়া হয়নি। প্রধান অ্যাকাউন্টটি যদি আপনার হয় তাহলে আপনি তা ব্যবহার করে এই অ্যাকাউন্টটি একীভূত করে নিতে পারেন:',
	'centralauth-attach-submit'            => 'অ্যাকাউন্ট স্থানান্তর করো',
	'centralauth-attach-success'           => 'অ্যাকাউন্টটি সফলভাবে একীভূত অ্যাকাউন্টে সরিয়ে নেওয়া হয়েছে।',
	'centralauth'                          => 'একীভূত লগ-ইন প্রশাসন',
	'centralauth-admin-manage'             => 'ব্যবহারকারী ডাটা ব্যবস্থাপনা করুন',
	'centralauth-admin-username'           => 'ব্যবহারকারী নাম:',
	'centralauth-admin-lookup'             => 'ব্যবহারকারী ডাটা দেখুন অথবা সম্পাদনা করুন',
	'centralauth-admin-permission'         => 'শুধুমাত্র স্টুয়ার্ডগণ অন্যের অ্যাকাউন্ট তাদের জন্য একীভূত করতে পারেন।',
	'centralauth-admin-unmerge'            => 'নির্বাচিতসমূহ বিচ্ছিন্ন করো',
	'centralauth-admin-merge'              => 'নির্বাচিতসমূহ একীভূত করো',
	'centralauth-admin-bad-input'          => 'একীভূতকরণের জন্য অবৈধ নির্বাচন',
	'centralauth-admin-none-selected'      => 'পরিবর্তনের জন্য কোন অ্যাকাউন্ট নির্বাচন করা হয় নাই।',
	'centralauth-prefs-status'             => 'প্রধান অ্যাকাউন্টের অবস্থা:',
	'centralauth-prefs-not-managed'        => 'একীভূত অ্যাকাউন্ট ব্যবহৃত হচ্ছে না',
	'centralauth-prefs-unattached'         => 'অনিশ্চিত',
	'centralauth-prefs-complete'           => 'সমস্ত একই ক্রমে!',
	'centralauth-prefs-migration'          => 'সরানো হচ্ছে',
	'centralauth-prefs-count-attached'     => 'আপনার অ্যাকাউন্ট $1 প্রকল্প {{plural:$1|সাইট|সাইটসমূহ}} এ সক্রিয় আছে।',
	'centralauth-prefs-count-unattached'   => 'আপনার নাম দিয়ে নিশ্চিতকরণ হয় নাই এমন অ্যাকাউন্ট $1 {{plural:$1|প্রকল্পে|প্রকল্পসমূহে}} বাকি আছে।',
	'centralauth-prefs-detail-unattached'  => 'এই প্রকল্প সাইটটি গ্লোবাল অ্যাকাউন্টের জন্য প্রযোজ্য বলে নিশ্চিত করা হয়নি।',
	'centralauth-prefs-manage'             => 'আপনার প্রধান অ্যাকাউন্ট ব্যবস্থাপনা করুন',
	'centralauth-renameuser-abort'         => '<div class="errorbox">ব্যবহারকারী $1-কে স্থানীয়ভাবে পুনরায় নামকরণ করা যায়নি, কারণ এই ব্যবহারকারী নামটি একটি একত্রিত লগ-ইন ব্যবস্থায় স্থানান্তর করা হয়েছে।</div>',
);

/** Breton (Brezhoneg)
 * @author Fulup
 * @author Jon Harald Søby
 */
$messages['br'] = array(
	'mergeaccount'                         => "Statud unvaniñ ar c'hontoù implijer",
	'centralauth-desc'                     => "[[Special:MergeAccount|Unvaniñ a ra ar c'hontoù implijer]] dre-holl raktresoù wiki Diazezadur Wikimedia",
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Kendeuziñ a ra meur a gont]] evit ur marilhañ unvan',
	'centralauth-merge-denied'             => "Hon digarezit, n'oc'h ket aotreet da vont war ar bajenn-mañ.",
	'centralauth-merge-notlogged'          => 'Trugarez d\'en em <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} lugañ]</span> evit gwiriañ eo bet unvanet mat ho kontoù.',
	'centralauth-merge-welcome'            => "'''N'eo ket bet kaset ho kontoù implijer davet reizhiad emlugañ unvan Wikimedia c'hoazh.'''

Ma tibabit treuzkas ho kontoù e viot gouest da implijout an hevelep anv implijer ha ger-tremen hed-ha-hed holl raktresoù Wikimedia en holl yezhoù a c'haller kaout.
Gant se eo aesoc'h labourat a-dreuz ar raktresoù, aesaet eo an enporzhiañ skeudennoù war [http://commons.wikimedia.org/ Wikimedia Commons], hag evel-se ne vo ket tamm kemmesk ebet mui gant daou zen disheñvel oc'h ober gant an hevelep anv implijer war meur a raktres.

Ma rit dija gant an hevelep anv implijer war an holl raktresoù ne zlefe ket bezañ kudenn ebet. Ma ra unan bennak all gant an hevelep anv implijer ha c'hwi war ur raktres all e c'hallot mont e darempred gant an den-se pe gwelet se gant ur merour bennak.",
	'centralauth-merge-step1-title'        => "Kregiñ da unvaniñ ar c'hontoù",
	'centralauth-merge-step1-detail'       => "Keñveriet e vo ho ker-tremen hag ho chomlec'h postel gant re ar c'hontoù dezho an hevelep anv war ar wikioù all evit bezañ sur e klotont an eil gant egile. Ne vo degaset kemm ebet a-raok na vefe kadarnaet ganeoc'h emañ mat pep tra.",
	'centralauth-merge-step1-submit'       => 'Kadarnaat an titouroù',
	'centralauth-merge-step2-title'        => 'Lakaat kontoù all',
	'centralauth-merge-step2-detail'       => "Kontoù zo n'eus ket bet gallet stagañ anezho ent emgefre ouzh ar gont pennañ. Ma piaouit ar c'hontoù-se e c'hallit en kadarnaat en ur verkañ ar ger-tremen reizh evito.",
	'centralauth-merge-step2-submit'       => 'Kadarnaat an titouroù',
	'centralauth-merge-dryrun-complete'    => "Gallout a reer unvaniñ an holl gontoù zo en un doare emgefre!

N'eus bet graet tamm cheñchamant ebet en ho kontoù evit c'hoazh.",
	'centralauth-merge-dryrun-incomplete'  => "Mennet oc'h da genderc'hel, padal meur a gont n'eus ket bet gallet gwiriañ anezho ent emgefre ha ne vint ket treuzkaset diouzhtu. Gouest e viot d'ho unvaniñ diwezhatoc'hik.

N'eus bet graet tamm cheñchamant ebet d'ho kontoù evit c'hoazh.",
	'centralauth-merge-dryrun-or'          => "'''pe'''",
	'centralauth-merge-dryrun-home'        => "N'eo ket bet ar reizhiad treuzkas evit kadarnaat ez oc'h-c'hwi perc'henn war ar gont wiki pennañ evit ar pezh a sell ouzh hoc'h anv implijer.

Didermenet ez eus bet ur wiki all evel kont pennañ evit hoc'h anv implijer ; kit da-heul al liamm a-is hag en em lugit en-dro evit echuiñ treuzkas ar gont.",
	'centralauth-merge-step3-title'        => 'Krouiñ ur gont unvan',
	'centralauth-merge-step3-detail'       => "Prest oc'h bremañ da grouiñ ur gont unvan evit ar wikioù-mañ :",
	'centralauth-merge-step3-submit'       => "Unvaniñ ar c'hontoù",
	'centralauth-complete'                 => "Unvanet eo ar c'hontoù !",
	'centralauth-incomplete'               => "N'eo ket echu unvaniñ ar c'hontoù !",
	'centralauth-complete-text'            => 'Gallout a rit en em lugañ ouzh ne vern pe raktres Wikimedia hep bezañ rediet da grouiñ ur gont nevez;
Mont a raio an hevelep ger-tremen en-dro war Wikipedia, Wikeriadur, Wikilevrioù hag ar raktresoù kar all en holl yezhoù.',
	'centralauth-incomplete-text'          => "Pa vo bet unvanet ho kontoù e c'hallot en em lugañ war ne vern pe raktres eus Wikimedia hep bezañ rediet da grouiñ ur gont nevez;
mont a raio an hevelep ger-tremen en-dro war Wikipedia, wikilevrioù, hag ar raktresoù kar all en holl yezhoù.",
	'centralauth-not-owner-text'           => 'Staget eo bet ent emgefre an anv implijer "$1" ouzh perc\'henn ar gont $2.

Mard eo c\'hwi e c\'hallot kas da benn vat an argerzh unvaniñ kontoù dre verkañ amañ ar ger-tremen pennañ evit ar gont-se :',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Mod demo hepken</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => "An unvaniñ kontoù zo er mod arnodiñ / dizreinañ evit poent, setu n'haller ket c'hoazh unvaniñ kontoù da vat. Hon digarezit !",
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Gouzout hiroc'h diwar-benn '''ar gont unvan''']]…''",
	'centralauth-list-home-title'          => 'Pennraktres',
	'centralauth-list-home-dryrun'         => "Ar ger-tremen hag ar chomlec'h postel merket evit ar wiki-mañ eo a vo implijet evit ho kont unvanet.
Gouest e viot da cheñch pehini eo ho raktres pennañ diwezhatoc'h.",
	'centralauth-list-attached-title'      => 'Kontoù stag',
	'centralauth-list-attached'            => 'Staget war-eeun eo bet ar c\'hontoù implijer anvet "$1" d\'ar gont unvan evit ar raktresoù da-heul :',
	'centralauth-list-attached-dryrun'     => 'Staget war-eeun e vo ar c\'hontoù implijer anvet "$1" d\'ar gont unvan evit ar raktresoù da-heul :',
	'centralauth-list-unattached-title'    => 'Kontoù distag',
	'centralauth-list-unattached'          => "N'eus ket bet gallet kadarnaat ent emgefre eo deoc'h ar c'hontoù \"\$1\" war al lec'hiennoù da-heul;
evit doare zo bet lakaet evito ur ger-tremen disheñvel diouzh hini ho kont pennañ :",
	'centralauth-foreign-link'             => 'Implijer $1 war $2',
	'centralauth-merge-method-primary'     => 'penn wiki',
	'centralauth-merge-method-empty'       => 'degasadenn ebet',
	'centralauth-merge-method-mail'        => 'kadarnaet dre bostel',
	'centralauth-merge-method-password'    => 'kadarnaet dre ur ger-tremen',
	'centralauth-merge-method-admin'       => 'kont verour unvanet',
	'centralauth-merge-method-new'         => 'kont nevez',
	'centralauth-merge-method-login'       => "kadarnaet p'en em luger",
	'centralauth-finish-title'             => 'Echuiñ an unvaniñ',
	'centralauth-finish-text'              => "Mard oc'h perc'henn war ar c'hontoù-se e c'hallit echuiñ an unvaniñ en ur verkañ ar gerioù-tremen evito amañ dindan :",
	'centralauth-finish-password'          => 'Ger-tremen :',
	'centralauth-finish-login'             => 'Kont implijer :',
	'centralauth-finish-send-confirmation' => 'Kas ar ger-tremen dre bostel',
	'centralauth-finish-problems'          => "Ma c'hoarvez kudennoù pe ma noc'h ket perc'henn war ar c'hontoù-se, 
sellit ouzh [[meta:Help:Unified login problems|Penaos bezañ skoazellet]]…",
	'centralauth-finish-noconfirms'        => "N'eus bet gallet kadarnaat kont ebet gant ar ger-tremen-se.",
	'centralauth-finish-incomplete'        => "Meur a gont zo bet unvanet en ur implijout ar ger-tremen-se.
Kontoù all n'int ket bet kadarnaet avat.",
	'centralauth-merge-attempt'            => "'''O wiriañ ar ger-tremen roet evit ar c'hontoù chomet a-ziforc'h…'''",
	'centralauth-attach-list-attached'     => 'Er gont unvan anvet "$1" e kaver ar c\'hontoù-mañ :',
	'centralauth-attach-title'             => 'Kadarnaat ar gont',
	'centralauth-attach-text'              => "N'eo ket bet treuzkaset ar gont-mañ d'ar gont unvanet c'hoazh.
Mard eo deoc'h ar gont hollek ivez e c'hallit unvaniñ ar c'hontoù-se en ur verkañ ger-tremen ar gont hollek :",
	'centralauth-attach-submit'            => "Treuzkas ar c'hontoù",
	'centralauth-attach-success'           => "Treuzkaset eo bet ar gont d'ar gont unvan.",
	'centralauth'                          => "Mererezh ar c'hontoù unvanet",
	'centralauth-admin-manage'             => 'Merañ ar roadoù implijer',
	'centralauth-admin-username'           => 'Anv implijer :',
	'centralauth-admin-lookup'             => 'Gwelet pe gemmañ ar roadoù implijer',
	'centralauth-admin-permission'         => "N'eus nemet ar stewarded a c'hall unvaniñ kontoù tud all en o flas.",
	'centralauth-admin-no-unified'         => 'Kont unvan ebet war anv an implijer-mañ',
	'centralauth-admin-info-id'            => 'Niverenn implijer :',
	'centralauth-admin-info-registered'    => 'Marilhet :',
	'centralauth-admin-info-locked'        => 'Prennet :',
	'centralauth-admin-info-hidden'        => 'Kuzhet :',
	'centralauth-admin-yes'                => 'ya',
	'centralauth-admin-no'                 => 'ket',
	'centralauth-admin-attached'           => 'Kontoù peurunvanet',
	'centralauth-admin-unattached'         => 'Kontoù distag',
	'centralauth-admin-no-unattached'      => "Ne chom kont ebet a-ziforc'h.",
	'centralauth-admin-list-localwiki'     => "wiki lec'hel",
	'centralauth-admin-list-attached-on'   => 'Staget ouzh',
	'centralauth-admin-list-method'        => 'Hentenn',
	'centralauth-admin-unmerge'            => 'Dizunvaniñ ar pezh zo diuzet',
	'centralauth-admin-merge'              => 'Unvaniñ ar pezh zo diuzet',
	'centralauth-admin-bad-input'          => 'Diuzadenn unvaniñ direizh',
	'centralauth-admin-none-selected'      => "N'eus bet merket kont ebet da vezañ cheñchet.",
	'centralauth-admin-already-unmerged'   => 'Na ober van ouzh $1, dizunvanet eo bet dija',
	'centralauth-admin-unmerge-success'    => 'Dizunvanet ez eus bet $1 {{PLURAL:$2|gont|kont}}',
	'centralauth-admin-delete-title'       => 'Diverkañ ar gont',
	'centralauth-admin-delete-description' => "Diverkañ ar gont hollek a zistrujo an holl benndibaboù hollek, a zistago an holl gontoù lec'hel hag a laosko vak an anv hollek evit neb implijer all. Distreiñ a raio ar gerioù-tremen bet krouet a-raok unvaniñ ar c'hontoù d'o zoavoudegezh kent.",
	'centralauth-admin-delete-button'      => 'Diverkañ ar gont-mañ',
	'centralauth-admin-delete-success'     => 'Diverket mat eo bet ar gont hollek evit "<nowiki>$1</nowiki>"',
	'centralauth-admin-nonexistent'        => 'N\'eus kont hollek ebet evit "<nowiki>$1</nowiki>"',
	'centralauth-admin-delete-nonexistent' => 'Fazi : ar gont hollek "<nowiki>$1</nowiki>" n\'eus ket anezhañ.',
	'centralauth-token-mismatch'           => "Ho tigarez, n'omp ket bet gouest d'ober war-dro ho furmskrid rak kollet eo bet roadennoù an dalc'h.",
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|eilenn|eilenn}} zo',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|munut|munut}} zo',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|eurvezh|eurvezh}} zo',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|deiz|deiz}} zo',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|miz|miz}} zo',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|bloaz|bloaz}} zo',
	'centralauth-prefs-status'             => 'Statud ar gont hollek :',
	'centralauth-prefs-not-managed'        => 'Kont unvan ebet',
	'centralauth-prefs-unattached'         => "N'eo ket kadarnaet",
	'centralauth-prefs-complete'           => 'Mat ar jeu !',
	'centralauth-prefs-migration'          => 'O treuzkas',
	'centralauth-prefs-count-attached'     => 'Mont a ra ho kont en-dro war $1 raktres.',
	'centralauth-prefs-count-unattached'   => "Kontoù ankadarnaet gant hoc'h anv implijer a chom war $1 {{plural:$1|raktres|raktres}}.",
	'centralauth-prefs-detail-unattached'  => "N'eo ket bet kadarnaet e vije ar raktres-se e-touez raktresoù ar gont hollek",
	'centralauth-prefs-manage'             => 'Merañ ho kont hollek',
	'centralauth-renameuser-abort'         => '<div class="errorbox">N\'haller ket adenvel an implijer $1 war al lec\'h : ur gont unvan zo gant an implijer-mañ bremañ.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Dibosupl adenvel $2 evel anv implijer, miret eo evit ur gont hollek.</div>',
	'centralauth-invalid-wiki'             => 'Bank-titouroù wiki ebet : $1',
	'centralauth-account-exists'           => 'Dibosupl krouiñ ar gont : er reizhiad kontoù unvanet emañ an anv implijer goulennet dija.',
);

/** Catalan (Català)
 * @author SMP
 * @author Toniher
 * @author Paucabot
 */
$messages['ca'] = array(
	'mergeaccount'                         => "Estat de fusió de comptes d'usuari",
	'centralauth-desc'                     => 'Fusiona els comptes a través dels wikis de la Fundació Wikimedia',
	'centralauth-mergeaccount-desc'        => "[[Special:MergeAccount|Fusiona comptes]] per a la unificació d'usuaris",
	'centralauth-merge-denied'             => 'Ho sentim, no teniu permisos per a accedir a aquesta pàgina.',
	'centralauth-merge-notlogged'          => 'Si us plau, <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} entreu amb un compte registrat]</span> per a comprovar si els vostres comptes s\'han pogut fusionar adequadament.',
	'centralauth-merge-welcome'            => "'''El vostre compte d'usuari encara no ha migrat al sistema unificat de comptes de Wikimedia.'''

Si decidiu migrar els vostres comptes, podreu fer servir el mateix nom d'usuari i contrasenya en els wikis de tots els projectes de Wikimedia en qualsevol idioma. Això fa que la feina que involucra diferents projectes, com la càrrega d'imatges a [http://commons.wikimedia.org/ Wikimedia Commons] sigui molt més fàcil, i impedeix la confusió o conflicte que pugui resultar del fet que persones diferents hagin escollit el mateix nom d'usuari en diferents projectes.

Si algú altre ja ha pres el vostre nom d'usuari en un altre projecte aquest procés no el perjudicarà, i permetrà que es puguin resoldre aquest casos posteriorment amb la seva coŀlaboració o la d'un administrador.",
	'centralauth-merge-step1-title'        => 'Comença la unificació de comptes',
	'centralauth-merge-step1-detail'       => 'Es comprovaran les vostres contrasenyes i adreces de correu electrònic per a verificar que els vostres comptes coincideixen. No es desarà cap canvi fins que no confirmeu que les dades semblen correctes.',
	'centralauth-merge-step1-submit'       => 'Informació per a confirmar els comptes',
	'centralauth-merge-step2-title'        => 'Confirma més comptes',
	'centralauth-merge-step2-detail'       => 'Alguns dels vostres comptes no coincideixen amb les dades del compte de la vostra wiki principal. Si aquests comptes us pertanyen podeu confirmar-ho introduint les seves contrasenyes.',
	'centralauth-merge-step2-submit'       => 'Confirmació dels comptes',
	'centralauth-merge-dryrun-complete'    => "Tots els comptes existents el poden unificar automàticament!

Encara no s'ha fet cap canvi als vostres comptes.",
	'centralauth-merge-dryrun-incomplete'  => "Podeu continuar, però alguns comptes no han pogut ser verificats automàticament i no s'unificaran immediatament. Podreu fusionar-los més tard.

Encara no s'ha fet cap canvi als vostres comptes.",
	'centralauth-merge-dryrun-or'          => "'''o bé'''",
	'centralauth-merge-dryrun-home'        => "El sistema de migració no ha pogut confirmar que sou el propietari del compte del vostre wiki principal amb aquest nom d'usuari.

S'ha determinat que un altre wiki com al wiki principal del vostre compte; seguiu l'enllaç a continuació per a finalitzar la migració del vostre compte.",
	'centralauth-merge-step3-title'        => 'Unificació dels comptes',
	'centralauth-merge-step3-detail'       => 'Ja podeu crear el vostre compte unificat, que inclourà els següents wikis:',
	'centralauth-merge-step3-submit'       => 'Unifica comptes',
	'centralauth-complete'                 => "La unificació dels vostres comptes s'ha completat!",
	'centralauth-incomplete'               => "No s'ha completat la unificació dels comptes.",
	'centralauth-complete-text'            => "Ara podeu entrar al wiki de qualsevol projecte Wikimedia sense haver de crear-vos un compte nou; el mateix nom d'usuari i la mateixa contrasenya funcionaran a la Viquipèdia, el Viccionari, Viquillibres i els seus projectes germans en qualsevol idioma.",
	'centralauth-incomplete-text'          => "Una vegada el vostre compte estigui unificat, podreu entrar en el wiki de qualsevol projecte Wikimedia sense haver de crear un compte nou;
el mateix nom d'usuari i la mateixa contrasenya serviran a la Viquipèdia, el Viccionari, Viquillibres i els seus projectes germans en qualsevol idioma.",
	'centralauth-not-owner-text'           => "El nom d'usuari «$1» ha estat automàticament assignat a l'usuari del compte $2.

Si efectivament és vostre, podeu finalitzar el procés d'unificació escrivint a continuació la contrasenya mestra del compte:",
	'centralauth-notice-dryrun'            => "<div class='successbox'>Només mode de demostració</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'La unificació de comptes es troba de moment en mode de proves o de demostració. Per tant, les operacions de fusió estan desactivades.',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Vegeu més sobre la '''unificació de comptes''']]...''",
	'centralauth-list-home-title'          => 'Wiki principal',
	'centralauth-list-home-dryrun'         => "La contrasenya i l'adreça electrònica d'aquest wiki seran les que es faran servir al vostre compte unificat. Més endavant podreu canviar quin és el vostre wiki principal.",
	'centralauth-list-attached-title'      => 'Comptes vinculats',
	'centralauth-list-attached'            => 'El compte de nom «$1» de cadascun dels llocs següents ha estat associat automàticament al compte unificat:',
	'centralauth-list-attached-dryrun'     => "El compte de nom «$1» de cadascun dels llocs següents s'associaran al compte unificat:",
	'centralauth-list-unattached-title'    => 'Comptes no vinculats',
	'centralauth-list-unattached'          => "No s'ha pogut confirmar automàticament que us pertanyi el compte «$1» dels següents llocs web;
segurament és perquè tenen una contrasenya diferent de la del vostre compte principal:",
	'centralauth-foreign-link'             => 'Usuari $1 a $2',
	'centralauth-merge-method-primary'     => 'wiki principal',
	'centralauth-merge-method-empty'       => 'cap contribució',
	'centralauth-merge-method-mail'        => 'confirmat pel correu electrònic',
	'centralauth-merge-method-password'    => 'confirmat per la contrasenya',
	'centralauth-merge-method-admin'       => "compte d'administrador fusionat",
	'centralauth-merge-method-new'         => 'nou compte',
	'centralauth-merge-method-login'       => 'confirmat per accés',
	'centralauth-finish-title'             => 'Finalitza la fusió',
	'centralauth-finish-text'              => "Si aquests comptes us pertanyen, podeu finalitzar el procés d'unificació escrivint a continuació les contrasenyes corresponents:",
	'centralauth-finish-password'          => 'Contrasenya:',
	'centralauth-finish-login'             => 'Inici de sessió',
	'centralauth-finish-send-confirmation' => "Envia'm la contrasenya per correu electrònic",
	'centralauth-finish-problems'          => 'Teniu problemes o no posseïu aquests altres comptes? Doncs [[meta:Help:Unified login problems|demaneu ajuda]]...',
	'centralauth-finish-noconfirms'        => "No s'han pogut confirmar comptes fent servir aquesta contrasenya.",
	'centralauth-finish-incomplete'        => "Diversos comptes s'han fusionat usant aquesta contrasenya.
Altres comptes encara no s'han confirmat.",
	'centralauth-merge-attempt'            => "'''Comprovant la contrasenya introduïda a la resta de comptes no fusionats...'''",
	'centralauth-attach-list-attached'     => 'El compte unificat anomenat «$1» inclou els comptes següents:',
	'centralauth-attach-title'             => 'Confirma el compte',
	'centralauth-attach-text'              => 'Aquest compte no ha migrat al sistema unificat.
Si el compte global és vostre, podeu associar-hi aquest compte escrivint la contrasenya:',
	'centralauth-attach-submit'            => 'Migra el compte',
	'centralauth-attach-success'           => "S'ha migrat el compte al sistema unificat.",
	'centralauth'                          => 'Administració de sessió unificada',
	'centralauth-admin-manage'             => "Gestiona les dades d'usuari",
	'centralauth-admin-username'           => "Nom d'usuari:",
	'centralauth-admin-lookup'             => "Visualitza o edita les dades d'usuari",
	'centralauth-admin-permission'         => "Només els stewards poden fusionar comptes d'altra gent.",
	'centralauth-admin-no-unified'         => "Cap compte unificat per aquest nom d'usuari.",
	'centralauth-admin-info-id'            => "Identificador d'usuari:",
	'centralauth-admin-info-registered'    => 'Registrat:',
	'centralauth-admin-info-locked'        => 'Bloquejat:',
	'centralauth-admin-info-hidden'        => 'Amagat:',
	'centralauth-admin-yes'                => 'sí',
	'centralauth-admin-no'                 => 'no',
	'centralauth-admin-attached'           => 'Comptes completament fusionats',
	'centralauth-admin-unattached'         => 'Comptes no vinculats',
	'centralauth-admin-no-unattached'      => 'No queden comptes sense fusionar.',
	'centralauth-admin-list-localwiki'     => 'Wiki local',
	'centralauth-admin-list-attached-on'   => 'Associats el',
	'centralauth-admin-list-method'        => 'Mètode',
	'centralauth-admin-unmerge'            => 'Separació seleccionada',
	'centralauth-admin-merge'              => 'Fusiona els seleccionats',
	'centralauth-admin-bad-input'          => 'Selecció de unificació invàlida',
	'centralauth-admin-none-selected'      => "No s'han seleccionat comptes a modificar.",
	'centralauth-admin-delete-title'       => 'Esborra el compte',
	'centralauth-admin-delete-button'      => 'Esborra aquest compte',
	'centralauth-seconds-ago'              => 'fa $1 {{PLURAL:$1|segon|segons}}',
	'centralauth-minutes-ago'              => 'fa $1 {{PLURAL:$1|minut|minuts}}',
	'centralauth-hours-ago'                => 'fa $1 {{PLURAL:$1|hora|hores}}',
	'centralauth-days-ago'                 => 'fa $1 {{PLURAL:$1|dia|dies}}',
	'centralauth-months-ago'               => 'fa $1 {{PLURAL:$1|mes|mesos}}',
	'centralauth-years-ago'                => 'fa $1 {{PLURAL:$1|any|anys}}',
	'centralauth-prefs-status'             => 'Estat del compte global:',
	'centralauth-prefs-not-managed'        => "No s'usa la unificació de comptes",
	'centralauth-prefs-unattached'         => 'Per confirmar',
	'centralauth-prefs-complete'           => 'Tot en ordre!',
	'centralauth-prefs-migration'          => 'En migració',
	'centralauth-prefs-count-attached'     => 'El vostre compte és actiu en {{PLURAL:$1|un projecte|$1 projectes}}.',
	'centralauth-prefs-count-unattached'   => 'Es mantenen comptes amb el vostre nom sense confirmar a $1 {{plural:$1|projecte|projectes}}.',
	'centralauth-prefs-detail-unattached'  => "No s'ha confirmat que aquest projecte pugui accedir als comptes unificats.",
	'centralauth-prefs-manage'             => 'Gestioneu el vostre compte global',
	'centralauth-renameuser-abort'         => '<div class="errorbox"> No es pot canviar el nom de l\'usuari $1 localment, perquè ha migrat al sistema unificat de comptes.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">No es pot reanomenat l\'usuari $2 perquè el seu nom d\'usuari està reservat en un compte unificat.</div>',
	'centralauth-invalid-wiki'             => "No s'ha trobat la base de dades del wiki: $1",
	'centralauth-account-exists'           => "No es pot crear el compte: El nom d'usuari demanat ja l'utilitza algun usuari del sistema unificat de comptes.",
);

/** Czech (Česky)
 * @author Li-sung
 * @author Matěj Grabovský
 * @author Siebrand
 * @author Mormegil
 * @author Danny B.
 */
$messages['cs'] = array(
	'mergeaccount'                         => 'Stav sjednocení přihlašovacích účtů',
	'centralauth-desc'                     => '[[Special:MergeAccount|Sloučení účtů]] na jednotlivých wiki nadace Wikimedia',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Sloučení více účtu]] na jednotné přihlašování',
	'centralauth-merge-denied'             => 'Na tuto stránku nemáte přístup.',
	'centralauth-merge-notlogged'          => 'Pokud se <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} přihlásíte]</span>, budete moci zkontrolovat, zda Vaše účty byly sloučeny.',
	'centralauth-merge-welcome'            => "'''Váš uživatelský účet nebyl dosud převeden na jednotný systém přihlašování projektů Wikimedia.'''

Pokud si vyberete převedení vašich účtů, budete moci používat stejné uživatelské jméno a heslo k přihlášení do všech projektů nadace Wikimedia ve všech dostupných jazycích.
To umožní snazší práci se sdílenými projekty, například načítání souborů do [http://commons.wikimedia.org/ Wikimedia Commons], a předejde se konfliktům a zmatkům, které mohou vzniknout, pokud dva si lidé na různých projektech vyberou stejné uživatelské jméno.

Pokud si již někdo jiný vzal vaše uživatelské jméno na jiném projektu, tak to neovlivníte, ale budete mít možnost se později dohodnou na řešení buď s ním nebo s pomocí správců.",
	'centralauth-merge-step1-title'        => 'Začít sjednocovat přihlašování',
	'centralauth-merge-step1-detail'       => 'Bude porovnáno, zda souhlasí Vaše heslo a registrovaný e-mail s účty na jiných wiki. Žádné změny nebudou provedeny dokud nepotvrdíte, že je vše v pořádku.',
	'centralauth-merge-step1-submit'       => 'Potvrdit přihlašovací informace',
	'centralauth-merge-step2-title'        => 'Potvrzení více účtů',
	'centralauth-merge-step2-detail'       => 'Některé účty nebylo možné automaticky přiřadit k určené domovské wiki. Potvrďte, že tyto účty jsou Vaše, zadáním jejich hesla.',
	'centralauth-merge-step2-submit'       => 'Potvrdit přihlašovací informace',
	'centralauth-merge-dryrun-complete'    => 'Všechny současné účty mohou být sjednoceny!

Zatím nebyly provedeny žádné změny vašeho účtu.',
	'centralauth-merge-dryrun-incomplete'  => 'Můžete pokračovat, ale některé účty se nepodařilo automaticky ověřit a nebudou tak převedeny okamžitě. Budete je moci sloučit později.

Zatím nebyly provedeny žádné změny vašich účtu.',
	'centralauth-merge-dryrun-or'          => "'''nebo'''",
	'centralauth-merge-dryrun-home'        => 'Systém nemohl potvrdit, že jste majitel účtu s tímto uživatelským jménem na domovské wiki.

Pro vaše uživatelské jméno byla určena jiná wiki jako domovská; přejděte na odkaz níže, přihlaste se, aby mohla být migrace dokončena.',
	'centralauth-merge-step3-title'        => 'Vytvoření jednotného účtu',
	'centralauth-merge-step3-detail'       => 'Vytvoření vašeho jednotného účtu je připraveno. Účty z následujících wiki budou připojeny:',
	'centralauth-merge-step3-submit'       => 'Sjednotit účty',
	'centralauth-complete'                 => 'Sjednocení přihlašovacích účtů bylo dokončeno!',
	'centralauth-incomplete'               => 'Sjednocení přihlašovacích účtů nebylo dokončeno!',
	'centralauth-complete-text'            => 'Nyní se můžete přihlásit na kterýkoliv projekt nadace Wikimedia, aniž byste si museli zakládat nový účet; stejné uživatelské jméno a heslo bude fungovat na Wikipedii, Wikislovníku, Wikiknihách a dalších sesterských projektech ve všech jazycích.',
	'centralauth-incomplete-text'          => 'Až bude vaše přihlašování sjednoceno, budete se moci přihlásit na kterýkoliv projekt nadace Wikimedia aniž byste si museli zakládat nový účet; stejné uživatelské jméno a heslo bude fungovat na Wikipedii, Wikislovníku, Wikiknihách a dalších sesterských projektech ve všech jazycích.',
	'centralauth-not-owner-text'           => 'Uživatelské jméno „$1“ bylo automaticky přiřazeno majiteli účtu na projektu $2.

Pokud to jste vy, můžete dokončit proces sjednocení přihlašování zadáním hesla pro uvedený účet:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Toto je jen demonstrační režim</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Sloučení účtů probíhá momentálně jen v demonstračním / ladícím režimu, takže samotné operace spojení jsou vypnuté. Promiňte!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Přečtěte si více o '''sjednocení přihlašování''']]...''",
	'centralauth-list-home-title'          => 'Domovská wiki',
	'centralauth-list-home-dryrun'         => 'Heslo a e-mailová adresa nastavené na této wiki budou použity i na vašem jednotném účtu. Příležitost změnit si nastavený domovský projekt budete mít i později.',
	'centralauth-list-attached-title'      => 'Připojené účty',
	'centralauth-list-attached'            => 'Účty se jménem „$1“ na všech následujících projektech byly automaticky připojeny k jednotnému účtu:',
	'centralauth-list-attached-dryrun'     => 'Účty se jménem „$1“ na všech následujících projektech budou automaticky připojeny k jednotnému účtu:',
	'centralauth-list-unattached-title'    => 'Nepřipojené účty',
	'centralauth-list-unattached'          => 'Nebylo možné automaticky potvrdit, že účet „$1“ na následujících projektech patří vám; pravděpodobně má jiné heslo, než váš primární účet:',
	'centralauth-foreign-link'             => 'Uživatel $1 na $2',
	'centralauth-merge-method-primary'     => 'domovská wiki',
	'centralauth-merge-method-empty'       => 'žádné příspěvky',
	'centralauth-merge-method-mail'        => 'potvrzeno e-mailem',
	'centralauth-merge-method-password'    => 'potvrzeno heslem',
	'centralauth-merge-method-admin'       => 'účet sloučený správcem',
	'centralauth-merge-method-new'         => 'nový účet',
	'centralauth-merge-method-login'       => 'potvrzeno přihlášením',
	'centralauth-finish-title'             => 'Dokončit sloučení',
	'centralauth-finish-text'              => 'Pokud tyto účty opravdu patří vám, můžete skončit proces sloučení jednoduše napsáním hesel dotyčných účtů:',
	'centralauth-finish-password'          => 'Heslo:',
	'centralauth-finish-login'             => 'Přihlašovací jméno',
	'centralauth-finish-send-confirmation' => 'Zaslat heslo emailem',
	'centralauth-finish-problems'          => 'Máte problém nebo nejste vlastníkem těchto účtů? [[meta:Help:Unified login problems|Jak hledat pomoc]]…',
	'centralauth-finish-noconfirms'        => 'Tímto heslem se nepodařilo potvrdit žádný účet.',
	'centralauth-finish-incomplete'        => 'Několik účtu bylo sloučeno použitím tohoto hesla. Ostatní účty zatím nejsou potvrzeny.',
	'centralauth-merge-attempt'            => "'''Prověřuje se, zda poskytnuté heslo odpovídá zbylým nesloučeným účtům...'''",
	'centralauth-attach-list-attached'     => 'K jednotnému účtu s názvem „$1“ patří následující účty:',
	'centralauth-attach-title'             => 'Potvrdit účet',
	'centralauth-attach-text'              => 'Tento účet nebyl dosud převeden na jednotný účet. Pokud je jednotný účet také váš, můžete připojit tento účet k jednotnému účtu, když napíšete heslo k jednotnému účtu:',
	'centralauth-attach-submit'            => 'Převést účet',
	'centralauth-attach-success'           => 'Účet byl převeden na jednotný účet.',
	'centralauth'                          => 'Správa jednotného přihlašování',
	'centralauth-admin-manage'             => 'Správa údajů o uživatelích',
	'centralauth-admin-username'           => 'Uživatelské jméno:',
	'centralauth-admin-lookup'             => 'Zobrazit nebo změnit data uživatele',
	'centralauth-admin-permission'         => 'Pouze stevardi mohou slučovat účty za jiné uživatele.',
	'centralauth-admin-no-unified'         => 'Toto uživatelské jméno nemá žádný jednotný účet.',
	'centralauth-admin-info-id'            => 'Uživatelské ID:',
	'centralauth-admin-info-registered'    => 'Registrováno:',
	'centralauth-admin-info-locked'        => 'Zamčeno:',
	'centralauth-admin-info-hidden'        => 'Skryto:',
	'centralauth-admin-yes'                => 'ano',
	'centralauth-admin-no'                 => 'ne',
	'centralauth-admin-attached'           => 'Plně sloučené účty',
	'centralauth-admin-unattached'         => 'Nepřipojené účty',
	'centralauth-admin-no-unattached'      => 'Nezbývají žádné nesloučené účty.',
	'centralauth-admin-list-localwiki'     => 'Místní wiki',
	'centralauth-admin-list-attached-on'   => 'Připojené k',
	'centralauth-admin-list-method'        => 'Způsob',
	'centralauth-admin-unmerge'            => 'Rozdělit vybrané',
	'centralauth-admin-merge'              => 'Sloučit vybrané',
	'centralauth-admin-bad-input'          => 'Neplatný výběr ke sloučení',
	'centralauth-admin-none-selected'      => 'Ke změně nebyl vybrán žádný účet.',
	'centralauth-admin-already-unmerged'   => 'Přeskakuje se $1, již byl odloučen',
	'centralauth-admin-unmerge-success'    => '$1 {{plural:$2|účet úspěšně odloučen|účty úspěšně odloučeny|účtů úspěšně odloučeno}}',
	'centralauth-admin-delete-title'       => 'Smazat účet',
	'centralauth-admin-delete-button'      => 'Smazat tento účet.',
	'centralauth-admin-delete-success'     => 'Globální účet „<nowiki>$1</nowiki>“ byl úspěšně smazán.',
	'centralauth-admin-nonexistent'        => 'Globální účet „<nowiki>$1</nowiki>“ neexistuje.',
	'centralauth-admin-delete-nonexistent' => 'Chyba: globální účet „<nowiki>$1</nowiki>“ neexistuje.',
	'centralauth-token-mismatch'           => 'Je nám líto, nebylo možné zpracovat údaje z formuláře, které jste poslali, z důvodu ztráty informací o vaší relaci.',
	'centralauth-seconds-ago'              => 'před $1 {{PLURAL:$1|sekundou|sekundami|sekundami}}',
	'centralauth-minutes-ago'              => 'před $1 {{PLURAL:$1|minutou|minutami|minutami}}',
	'centralauth-hours-ago'                => 'před $1 {{PLURAL:$1|hodinou|hodinami|hodinami}}',
	'centralauth-days-ago'                 => 'před $1 {{PLURAL:$1|dnem|dny|dny}}',
	'centralauth-months-ago'               => 'před $1 {{PLURAL:$1|měsícem|měsíci|měsíci}}',
	'centralauth-years-ago'                => 'před $1 {{PLURAL:$1|rokem|roky|lety}}',
	'centralauth-prefs-status'             => 'Stav jednotného účtu:',
	'centralauth-prefs-not-managed'        => 'Jednotný účet není používán',
	'centralauth-prefs-unattached'         => 'Nepotvrzený',
	'centralauth-prefs-complete'           => 'Vše v pořádku!',
	'centralauth-prefs-migration'          => 'Probíhá převod',
	'centralauth-prefs-count-attached'     => 'Váš účet je aktivní na $1 {{plural:$1|projektu|projektech|projektech}}.',
	'centralauth-prefs-count-unattached'   => 'Na $1 {{plural:$1|projektu zůstává nepotvrzený účet|projektech zůstávají nepotvrzené účty|projektech zůstávají nepotvrzené účty}} s vaším jménem.',
	'centralauth-prefs-detail-unattached'  => 'Dosud nebylo potvrzeno, zda účet na tomto projektu patří k jednotnému účtu.',
	'centralauth-prefs-manage'             => 'Správa jednotného účtu',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Uživatele $1 není možné lokálně přejmenovat, protože toto uživatelské jméno bylo přesunuto do systému jednotných přihlašovacích účtů.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Není možné přejmenovat na $2, protože toto uživatelské jméno je rezervováno pro jednotný účet.</div>',
	'centralauth-invalid-wiki'             => 'Taková DB wiki neexistuje: $1',
	'centralauth-account-exists'           => 'Nelze vytvořit účet: Požadované uživatelské jméno je již registrováno v unifikovaném přihlašovacím systému.',
);

/** Danish (Dansk)
 * @author Peter Andersen
 * @author Jon Harald Søby
 * @author M.M.S.
 */
$messages['da'] = array(
	'mergeaccount'                      => 'Status for sammenlægning af konti',
	'centralauth-desc'                  => 'på Wikimedia Foundations wikier',
	'centralauth-mergeaccount-desc'     => "for ''Single User Login''",
	'centralauth-merge-denied'          => 'Du har ikke adgang til denne side.',
	'centralauth-merge-notlogged'       => '<span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special:MergeAccount}} Log ind]</span> for at se dine konti er blevet lagt fuldstændigt sammen.',
	'centralauth-merge-welcome'         => "'''Din brukerkonto er endnu ikke blevet overført til Wikimedias fælles loginsystem.'''

Hvis du vælger at flytte dine konti dine kan du bruge samme brugernavn og password for at logge ind på alle Wikimedias projekter på alle sprog.
Dette gør det enklere at arbejde med delte projekter, som uploads til [http://commons.wikimedia.org/ Wikimedia Commons], og undgår forvirringer og konflikter der kan opstå hvis to personer på forskellige projekter har samme brugernavn.

Hvis der allerede er nogen der har taget dit brugernavn på et andet projekt vil det ikke påvirke dem endnu, men give dig muligheden for at finde en løsning med denne eller med en administrator senere.",
	'centralauth-merge-step1-title'     => 'Begynd sammenlægning af konti',
	'centralauth-merge-step1-detail'    => 'Dit password og e-mailadresse vil blive tjekket op mod kontiene på andre wikier for at bekræfte, at de stemmer overens. Der vil ikke blive foretaget nogen ændringer før end, du har bekræftet, at alting ser rigtigt ud.',
	'centralauth-merge-step1-submit'    => 'Bekræft login information',
	'centralauth-merge-step2-title'     => 'Bekræft flere konti',
	'centralauth-merge-dryrun-complete' => 'Alle eksisterende konti kan automatisk slås sammen.

Dine konti er ikke blevet ændret endnu.',
	'centralauth-merge-dryrun-or'       => "'''eller'''",
	'centralauth-list-home-title'       => 'Hjemwiki',
	'centralauth-foreign-link'          => 'Bruger $1 på $2',
	'centralauth-merge-method-primary'  => 'hjemwiki',
	'centralauth-finish-password'       => 'Adgangskode:',
	'centralauth-finish-login'          => 'Log på',
	'centralauth-admin-username'        => 'Brugernavn:',
	'centralauth-admin-info-id'         => 'Bruger-ID:',
	'centralauth-admin-yes'             => 'ja',
	'centralauth-admin-no'              => 'nej',
	'centralauth-seconds-ago'           => '$1 {{PLURAL:$1|sekund|sekunder}} siden',
	'centralauth-minutes-ago'           => '$1 {{PLURAL:$1|minut|minutter}} siden',
	'centralauth-hours-ago'             => '$1 {{PLURAL:$1|time|timer}} siden',
	'centralauth-days-ago'              => '$1 {{PLURAL:$1|dag|dage}} siden',
	'centralauth-months-ago'            => '$1 {{PLURAL:$1|måned|måneder}} siden',
	'centralauth-years-ago'             => '$1 {{PLURAL:$1|år|år}} siden',
);

/** German (Deutsch)
 * @author Raimond Spekking
 */
$messages['de'] = array(
	// When not logged in...
	'mergeaccount'                   => 'Status der Benutzerkonten-Zusammenführung',
	'centralauth-desc'               => 'Benutzerkonten in Wikis der Wikimedia Foundation [[Special:MergeAccount|zusammenführen]]',
 	'centralauth-mergeaccount-desc'  => "[[Special:MergeAccount|Zusammenführen mehrerer Benutzerkonten]] für das ''Single User Login''",
	'centralauth-merge-denied'       => 'Entschuldigung, aber du hast keine Berechtigung für diese Seite.',
	'centralauth-merge-notlogged'    => 'Bitte <span class="plainlinks">
		[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} melde dich an],
		</span> um zu prüfen, ob deine Benutzerkonten vollständig zusammengeführt wurden.',

	'centralauth-merge-welcome'      => "'''Dein Benutzerkonto wurde noch nicht in das globale Wikimedia-Anmelde-System überführt.

		Falls du dich für eine Migration deines Benutzerkontos entscheidest, wird es dir möglich sein,
		dich mit einem gemeinsamen Benutzernamen und Passwort in allen Wikimedia-Projekten in allen
		verfügbaren Sprachen anzumelden.\n
		Dies macht die Arbeit in gemeinsam genutzten Projekten einfacher, z. B. das Hochladen von Dateien nach
		[http://commons.wikimedia.org/ Wikimedia Commons] und vermeidet Verwirrungen und Konflikte,
		die entstehen können, wenn zwei Menschen denselben Benutzernamen in verschiedenen Projekten benutzen.

		Wenn jemand anderes deinen Benutzernamen bereits in einem anderen Projekt benutzt,
		so beeinträchtigt es diesen nicht, aber du hast die Möglichkeit,
		später mit diesem anderen Benutzer oder in Zusammenarbeit mit einem Administrator nach einer Lösung zu suchen.",

	'centralauth-merge-step1-title'  => 'Beginn der Benutzerkonten-Zusammenführung',
	'centralauth-merge-step1-detail' => 'Dein Passwort und deine eingetragene E-Mail-Adresse werden mit Benutzerkonten in den anderes Wikis abgeglichen, um Übereinstimmungen zu finden. Es werden keine Änderungen vorgenommen, bis du bestätigst, dass alles richtig ist.',

	'centralauth-merge-step1-submit' => 'Anmelde-Informationen bestätigen',

	'centralauth-merge-step2-title'  => 'Bestätige weitere Benutzerkonten',
	'centralauth-merge-step2-detail' => 'Einige der Benutzerkonten konnten nicht automatisch deinem Heimat-Wiki zugeordnet werden. Wenn diese Konten dir gehören, kannst du dies bestätigen, indem du das Passwort zu diesen Konten eingibst.',
	'centralauth-merge-step2-submit' => 'Anmelde-Informationen bestätigen',

	// Dry run messages
	'centralauth-merge-dryrun-complete'   => 'Alle existierenden Benutzerkonten können automatisch zusammengeführt werden!

	Bis jetzt wurden keine Änderungen an deinen Benutzerkonten vorgenommen.',
	'centralauth-merge-dryrun-incomplete' => "Es geht weiter, aber einige Benutzerkonten konnten nicht automatisch geprüft werden und werden in diesem ersten Schritt nicht zusammengeführt.
	Es wird dir möglich sein, diese später zusammenzuführen.

	Bis jetzt wurden keine Änderungen an deinen Benutzerkonten vorgenommen.",
	'centralauth-merge-dryrun-or'         => "'''oder'''",
	'centralauth-merge-dryrun-home'       => 'Das Migrationssystem konnte nicht bestätigen, dass du der Eigentümer des Heimatwiki-Benutzerkontos für diesen Benutzernamen bist.

	Ein anderes Wiki wurde für deinen Benutzernamen als Heimatwiki bestimmt; folge dem untenstehenden Link und logge dich dort ein, um die Benutzerkonten-Zusammenführung abzuschließen.',

	'centralauth-merge-step3-title'  => 'Erzeuge globales Benutzerkonto',
	'centralauth-merge-step3-detail' => 'Du kannst nun ein globales Benutzerkonto für die folgenden Wikis erzeugen.',
	'centralauth-merge-step3-submit' => 'Benutzerkonten zusammenführen',


	// Big text on completion
	'centralauth-complete'           => 'Die Zusammenführung der Benutzerkonten ist vollständig.',
	'centralauth-incomplete'         => 'Die Zusammenführung der Benutzerkonten ist unvollständig!',

	// Wheeee
	'centralauth-complete-text'      => 'Du kannst dich nun auf jeder Wikimedia-Webseite anmelden,
		ohne ein neues Benutzerkonto anzulegen;
		derselbe Benutzername und dasselbe Passwort ist für Wikipedia,
		Wiktionary, Wikisource, Wikibooks und alle Schwesterprojekte
		in allen Sprachen gültig.',

	'centralauth-incomplete-text'    => 'Sobald deine Benutzerkonten zusammengeführt sind,
		kannst du dich auf jeder Wikimedia-Webseite anmelden, ohne ein
		neues Benutzerkonto anzulegen; derselbe Benutzername
		und dasselbe Passwort ist für Wikipedia, Wiktionary, Wikisource,
		WWikibooks und alle Schwesterprojekte in allen Sprachen gültig.',

	'centralauth-not-owner-text'     => 'Der Benutzername „$1“ wurde automatisch dem Eigentümer
		des Benutzerkontos auf $2 zugewiesen.

		Wenn dies dein Benutzername ist, kannst du die Zusammenführung
		der Benutzerkonten durch Eingabe des Haupt-Passwortes
		für dieses Benutzerkonto vollenden:',

	'centralauth-notice-dryrun'      => "<div class='successbox'>Demonstrationsmodus</div><br clear='all'/>",

	'centralauth-disabled-dryrun'    => 'Die Benutzerkonto-Zusammenführung befindet sich gegenwärtig in einem Demonstrations/Fehlersuch-Modus. Zusammenführungs-Aktionen sind deaktiviert.',

	// Appended to various messages above
	'centralauth-readmore-text'      => ":''[[meta:Help:Unified login|Informationen über die Zusammenführung der Benutzerkonten]] …''",

	// For lists of wikis/accounts:
	'centralauth-list-home-title'    => 'Heimat-Wiki',
	'centralauth-list-home-dryrun'   => 'Das Passwort und die E-Mail-Adresse, die du in diesem Wiki eingetragen hast, wird für die Zusammenführung der Benutzerkonten verwendet.
		Du kannst dein Heimat-Wiki später noch ändern.',

	'centralauth-list-attached-title'   => 'Zusammengeführte Benutzerkonten',
	'centralauth-list-attached'         => 'Die Benutzerkonten mit dem Namen „$1“ auf den folgenden Projekten wurden automatisch zusammengeführt:',
	'centralauth-list-attached-dryrun'  => 'Die Benutzerkonten mit dem Namen „$1“ auf den folgenden Projekten werden automatisch zusammengeführt:',
	'centralauth-list-unattached-title' => 'Nicht zusammengeführte Benutzerkonten',
	'centralauth-list-unattached'       => 'Das Benutzerkonto „$1“ konnte für die folgenden Projekte nicht automatisch als zu dir gehörend bestätigt werden;
		vermutlich hat es ein anderes Passwort als dein primäres Benutzerkonto:',
	'centralauth-foreign-link'          => 'Benutzer $1 auf $2',

	// Merge methods
	'centralauth-merge-method-primary'  => 'Heimatwiki',
	'centralauth-merge-method-empty'    => 'keine Benutzerbeiträge',
	'centralauth-merge-method-mail'     => 'bestätigt durch E-Mail-Adresse',
	'centralauth-merge-method-password' => 'bestätigt durch Passwort',
	'centralauth-merge-method-admin'    => 'durch Administrator zusammengeführtes Benutzerkonto',
	'centralauth-merge-method-new'      => 'neues Benutzerkonto',
	'centralauth-merge-method-login'    => 'bestätigt durch Anmeldevorgang',

	// When not complete, offer to finish...
	'centralauth-finish-title'             => 'Zusammenführung vollenden',
	'centralauth-finish-text'              => 'Wenn diese Benutzerkonten dir gehören, kannst du hier
		den Prozess der Benutzerkonten-Zusammenführung durch die
		Eingabe des Passwortes für die anderen Benutzerkonten vollenden:',
	'centralauth-finish-password'          => 'Passwort:',
	'centralauth-finish-login'             => 'Anmeldung',
	'centralauth-finish-send-confirmation' => 'Passwort per E-Mail zusenden',
	'centralauth-finish-problems'          => 'Hast du Probleme oder gehören dir diese anderen Benutzerkonten nicht? [[meta:Help:Unified login problems|Hier findest du Hilfe]] …',
	'centralauth-finish-noconfirms'        => 'Kein Benutzerkonto konnte mit diesem Passwort bestätigt werden.',
	'centralauth-finish-incomplete'        => 'Mehrere Benutzerkonten wurden mit diesem Passwort zusammengeführt. Andere Benutzerkonten wurden noch nicht bestätigt.',

	'centralauth-merge-attempt'            => "'''Prüfe das eingegebene Passwort mit den restlichen Benutzerkonten …'''",

	# When unattached, offer to attach...
	'centralauth-attach-list-attached'     => 'Das globale Benutzerkonto mit dem Namen „$1“ beinhaltet die folgenden Benutzerkonten:',
	'centralauth-attach-title'             => 'Benutzerkonto bestätigen',
	'centralauth-attach-text'              => 'Dieses Benutzerkonto wurde noch nicht in ein globales Benutzerkonto integriert.
		Wenn das globale Benutzerkonto auch von dir ist, kannst du die Zusammenführung veranlassen, indem du hier das Passwort des globalen Benutzerkontos eingibst:',
	'centralauth-attach-submit'            => 'Benutzerkonto integrieren',
	'centralauth-attach-success'           => 'Das Benutzerkonto wurde in das globale Benutzerkonto integriert.',

	// Administrator's console
	'centralauth'                        => 'Verwaltung der Benutzerkonten-Zusammenführung',
	'centralauth-admin-manage'           => 'Benutzerdaten verwalten',
	'centralauth-admin-username'         => 'Benutzername:',
	'centralauth-admin-lookup'           => 'Benutzerdaten ansehen oder bearbeiten',
	'centralauth-admin-permission'       => 'Die Zusammenführung von Benutzerkonten für andere Benutzer kann nur durch Stewards erfolgen.',
	'centralauth-admin-no-unified'       => 'Für diesen Benutzernamen gibt es kein globales Benutzerkonto.',
	'centralauth-admin-info-id'          => 'Benutzer-ID:',
	'centralauth-admin-info-registered'  => 'Registriert:',
	'centralauth-admin-info-locked'      => 'Gesperrt:',
	'centralauth-admin-info-hidden'      => 'Versteckt:',
	'centralauth-admin-yes'              => 'Ja',
	'centralauth-admin-no'               => 'Nein',
	'centralauth-admin-attached'         => 'Vollständig zusammengeführte Benutzerkonten',
	'centralauth-admin-unattached'       => 'Nicht verbundene Benutzerkonten',
	'centralauth-admin-no-unattached'    => 'Keine nicht zusammengeführten Benutzerkonten mehr vorhanden.',
	'centralauth-admin-list-localwiki'   => 'Lokales Wiki',
	'centralauth-admin-list-attached-on' => 'Verbunden mit',
	'centralauth-admin-list-method'      => 'Methode',
	'centralauth-admin-unmerge'          => 'Ausgewählte Benutzerkonten trennen',
	'centralauth-admin-merge'            => 'Ausgewählte Benutzerkonten zusammenführen',
	'centralauth-admin-bad-input'        => 'Ungültige Auswahl',
	'centralauth-admin-none-selected'    => 'Es wurden keine zu ändernden Benutzerkonten ausgewählt.',
	'centralauth-admin-already-unmerged' => '$1 wird übersprungen, da bereits abgespaltet.',
	'centralauth-admin-unmerge-success'  => 'Es {{PLURAL:$2|wurde 1 Benutzerkonto|wurden $1 Benutzerkonten}} erfolgreich abgespalten.',
	'centralauth-admin-delete-title'     => 'Benutzerkonto gelöscht',
	'centralauth-admin-delete-description' => 'Die Löschung des globalen Benutzerkontos wird alle globalen Benutzereinstellungen löschen, alle lokalen Benutzerkonten abspalten,
	und der globale Benutzername wird für eine erneute Verwendung frei werden.
	Alle lokalen Benutzerkonten werden weiterhin bestehen bleiben.
	Die Passwörter für die lokalen Benutzerkonten werden auf das ursprüngliche Passwort vor der Zusammenführung zurückgesetzt.',
	'centralauth-admin-delete-button'    => 'Lösche dieses Benutzerkonto',
	'centralauth-admin-delete-success'   => 'Das globale Benutzerkonto „<nowiki>$1</nowiki>“ wurde erfolgreich gelöscht.',
	'centralauth-admin-nonexistent'      => 'Es gibt kein globales Benutzerkonto „<nowiki>$1</nowiki>“.',
	'centralauth-admin-delete-nonexistent' => 'Fehler: Es gibt kein globales Benutzerkonto „<nowiki>$1</nowiki>“.',
	'centralauth-token-mismatch'         => 'Entschuldigung, aber die Formulareingaben konnten nicht verarbeitet werden, da deine Sitzungsdaten verloren gegangen sind.',

	'centralauth-admin-lock-title'         => 'Benutzerkonto sperren',
	'centralauth-admin-lock-description'   => 'Die Sperre eines Benutzerkonto verhindert die Anmeldung in jedem Wiki.',
	'centralauth-admin-lock-button'        => 'Benutzerkonto sperren',
	'centralauth-admin-lock-success'       => 'Das globale Benutzerkonto „<nowiki>$1</nowiki>“ wurde global gesperrt.',
	'centralauth-admin-lock-nonexistent'   => 'Fehler: Das globale Benutzerkonto „<nowiki>$1</nowiki>“ ist nicht vorhanden.',
	'centralauth-admin-unlock-title'       => 'Benutzerkonto entsperren',
	'centralauth-admin-unlock-description' => 'Die Entsperrung eines Benutzerkonto ermöglicht wieder die Anmeldung in jedem Wiki.',
	'centralauth-admin-unlock-button'      => 'Benutzerkonto entsperren',
	'centralauth-admin-unlock-success'     => 'Die Sperre für das globale Benutzerkonto „<nowiki>$1</nowiki>“ wurde aufgehoben.',
	'centralauth-admin-unlock-nonexistent' => 'Fehler: Das globale Benutzerkonto „<nowiki>$1</nowiki>“ ist nicht vorhanden.',
	'centralauth-admin-reason'             => 'Grund:',

 	// Pretty timespan
	'centralauth-seconds-ago' => '$1 {{PLURAL:$1|Sekunde|Sekunden}} zuvor',
	'centralauth-minutes-ago' => '$1 {{PLURAL:$1|Minute|Minuten}} zuvor',
	'centralauth-hours-ago'   => '$1 {{PLURAL:$1|Stunde|Stunden}} zuvor',
	'centralauth-days-ago'    => '$1 {{PLURAL:$1|Tag|Tage}} zuvor',
	'centralauth-months-ago'  => '$1 {{PLURAL:$1|Monat|Monate}} zuvor',
	'centralauth-years-ago'   => '$1 {{PLURAL:$1|Jahr|Jahre}} zuvor',

	// Info panel in preferences
       'centralauth-prefs-status'            => 'Benutzerkonten-Status:',
       'centralauth-prefs-not-managed'       => 'Es wird kein zusammengeführtes Benutzerkonto benutzt.',
       'centralauth-prefs-unattached'        => 'Unbestätigt',
       'centralauth-prefs-complete'          => 'Fertig!',
       'centralauth-prefs-migration'         => 'Zusammenführung in Arbeit',
       'centralauth-prefs-count-attached'    => 'Dein Benutzerkonto ist in $1 {{PLURAL:$1|Projekt|Projekten}} aktiv.',
       'centralauth-prefs-count-unattached'  => 'Es gibt in $1 {{PLURAL:$1|Projekt|Projekten}} unbestätigte Benutzerkonten mit deinem Namen.',
       'centralauth-prefs-detail-unattached' => 'Für dieses Projekt liegt keine Bestätigung für das zusammengeführte Benutzerkonto vor.',
       'centralauth-prefs-manage'            => 'Bearbeite dein zusammengeführtes Benutzerkonto',

	// Interaction with Special:Renameuser
	'centralauth-renameuser-abort'       => "<div class=\"errorbox\">Benutzer $1 kann nicht lokal umbenannt werden, da er bereits in das globale Benutzerkonten-System übernommen wurde.</div>",
	'centralauth-renameuser-exists'      => "<div class=\"errorbox\">Benutzer $2 kann nicht umbenannt werden, da dieser Benutzername als globales Benutzerkonto reserviert ist.</div>",

	// Other messages
	'centralauth-invalid-wiki'   => 'Die Wiki-Datenbank ist nicht vorhanden: $1',
	'centralauth-account-exists' => 'Benutzerkonto kann nicht erstellt werden: der angefragte Benutzername wird bereits für das globale Benutzerkonten-System verwendet.',
	
	// Logging
	'centralauth-log-name'         => 'Globales Benutzerkonten-Logbuch',
	'centralauth-log-header'       => 'Dieses Logbuch zeigt alle Löschungen, Sperrungen und Entsperrungen globaler Benutzerkonten.',
	'centralauth-log-entry-delete' => 'löschte das globale Benutzerkonto „<nowiki>$1</nowiki>“',
	'centralauth-log-entry-lock'   => 'sperrte das globale Benutzerkonto „<nowiki>$1</nowiki>“',
	'centralauth-log-entry-unlock' => 'entsperrte das globale Benutzerkonto „<nowiki>$1</nowiki>“',
);

/** Ewe (Eʋegbe)
 * @author M.M.S.
 */
$messages['ee'] = array(
	'centralauth-finish-login' => 'Ge ɖe eme',
);

/** Greek (Ελληνικά)
 * @author Απεργός
 * @author Lou
 * @author ZaDiak
 * @author Consta
 * @author Flyax
 */
$messages['el'] = array(
	'mergeaccount'                         => 'Κατάσταση της ενοποίησης λογαριασμών',
	'centralauth-desc'                     => '[[Special:MergeAccount|Συγχώνευση Λογαριασμών]] σε όλα τα εγχειρήματα του Ιδρύματος Wikimedia',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Συγχωνεύει]] πολλαπλούς λογαριασμούς για ενιαία σύνδεση χρηστών',
	'centralauth-merge-denied'             => 'Συγνώμη, δεν έχετε άδεια πρόσβασης σε αυτή τη σελίδα',
	'centralauth-merge-notlogged'          => 'Παρακαλούμε <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} συνδεθείτε]</span> για να ελέγξετε εάν οι λογαριασμοί σας έχουν συγχωνευθεί πλήρως.',
	'centralauth-merge-welcome'            => "'''Ο λογαριασμός χρήστη σας δεν έχει ακόμη μετακινηθεί στο σύστημα ενιαίας σύνδεσης του Wikimedia.'''

Εάν διαλέξετε να μετακινήσετε τους λογαριασμούς σας, θα μπορείτε να χρησιμοποιήσετε το ίδιο όνομα χρήστη και τον ίδιο κωδικό σε όλα τα εγχειρήματα του Wikimedia σε όλες τις διαθέσιμες γλώσσες.
Αυτό διευκολύνει εργασίες σε κοινόχρηστα εγχειρήματα, όπως την επιφόρτωση αρχείων στο [http://commons.wikimedia.org/ Wikimedia Commons], και αποφεύγει τη σύγχυση ή αντιπαράθεση που θα μπορούσε να προκύψει εάν δύο χρήστες διάλεγαν το ίδιο όνομα σε διαφορετικά εγχειρήματα.

Εάν κάποιος άλλος έχει ήδη πάρει το όνομα χρήστη σας σε άλλον ιστοχώρο, αυτό δεν θα τον ενοχλήσει, θα σας δώσει όμως την ευκαιρία αργότερα να λύσετε το πρόβλημα μαζί του ή με κάποιον διαχειριστή.",
	'centralauth-merge-step1-title'        => 'Έναρξη ενοποίησης των λογαριασμών',
	'centralauth-merge-step1-detail'       => 'Ο κωδικός σας και η ηλεκτρονική διεύθυνση που έχετε δηλώσει θα υποβληθούν σε έλεγχο με τους λογαριασμούς σε άλλα εγχειρήματα για να επιβεβαιωθεί ότι ταιριάζουν. Δεν θα γίνει καμία αλλαγή έως ότου επιβεβαιώσετε ότι τα πάντα είναι εντάξει.',
	'centralauth-merge-step1-submit'       => 'Επαλήθευση των πληροφοριών σύνδεσης',
	'centralauth-merge-step2-title'        => 'Επιβεβαίωση περισσότερων λογαριασμών',
	'centralauth-merge-step2-detail'       => 'Μερικοί λογαριασμοί δεν έγινε δυνατό να συνταιριάξουν αυτόματα με το αρχικό προκαθορισμένο εγχείρημα. Εάν αυτοί οι λογαριασμοί σας ανήκουν, μπορείτε να επιβεβαιώσετε ότι είναι δικοί σας παρέχοντας τον κωδικό τους.',
	'centralauth-merge-step2-submit'       => 'Επιβεβαίωση πληροφοριών σύνδεσης',
	'centralauth-merge-dryrun-complete'    => 'Όλοι οι υπάρχοντες λογαριασμοί μπορούν να ενοποιηθούν αυτόματα!

Δεν έχουν γίνει αλλαγές ακόμα στους λογαριασμούς σας.',
	'centralauth-merge-dryrun-incomplete'  => 'Είστε έτοιμος να συνεχίσετε, αλλά κάποιοι λογαριασμοί δεν μπόρεσαν να επαληθευθούν αυτόματα και δεν θα μετακινηθούν αμέσως. Θα μπορέσετε να τους ενοποιήσετε αργότερα.

Δεν έχουν γίνει αλλαγές στους λογαριασμούς σας ακόμα.',
	'centralauth-merge-dryrun-or'          => "'''ή'''",
	'centralauth-merge-dryrun-home'        => 'Το σύστημα μετακίνησης δεν μπορούσε να επιβεβαιώσει ότι εσείς είστε ο ιδιοκτήτης του λογαριασμού για το όνομα χρήστη σας στο αρχικό εγχείρημα.

Ένα άλλο εγχείρημα έχει οριστεί ως το αρχικό εγχείρημα για το όνομα χρήστη σας. Ακολουθήστε τον παρακάτω σύνδεσμο και συνδεθείτε εκεί για να τελειώσετε την μετακίνηση των λογαριασμών σας.',
	'centralauth-merge-step3-title'        => 'Δημιουργία ενιαίου λογαριασμού',
	'centralauth-merge-step3-detail'       => 'Είστε έτοιμος να δημιουργήσετε τον ενιαίο σας λογαριασμό, με την επισύναψη των επόμενων εγχειρημάτων:',
	'centralauth-merge-step3-submit'       => 'Ενοποίηση λογαριασμών',
	'centralauth-complete'                 => 'Η ενοποίηση των λογαριασμών ολοκληρώθηκε!',
	'centralauth-incomplete'               => 'Η ενοποίηση των λογαριασμών δεν ολοκληρώθηκε!',
	'centralauth-complete-text'            => 'Μπορείτε πλέον να συνδεθείτε σε οποιονδήποτε εγχείρημα του Wikimedia χωρίς να δημιουργήσετε νέο λογαριασμό. Το ίδιο όνομα χρήστη και ο ίδιος κωδικός πρόσβασης ισχύουν για την Βικιπαίδεια, το Βικιλεξικό, τα Βικιβιβλία και τα αδελφά τους εγχειρήματα σε όλες τις γλώσσες.',
	'centralauth-incomplete-text'          => 'Μόλις ενοποιηθεί ο λογαριασμός σας, θα μπορείτε να συνδεθείτε σε οποιοδήποτε εγχείρημα του Wikimedia χωρίς να δημιουργήσετε νέο λογαριασμό. Το ίδιο όνομα χρήστη και ο ίδιος κωδικός πρόσβασης θα ισχύουν για την Βικιπαίδεια, το Βικιλεξικό, τα Βικιβιβλία και τα αδελφά τους εγχειρήματα σε όλες τις γλώσσες.',
	'centralauth-not-owner-text'           => 'Το όνομα χρήστη "$1" παραχωρήθηκε αυτόματα στον ιδιοκτήτη του λογαριασμού στο έργο $2.

Εάν είστε εσείς ο ίδιος, μπορείτε να ολοκληρώσετε την διαδικασία ενοποίησης των λογαριασμών πληκτρολογώντας τον κύριο κωδικό πρόσβασης εκείνου του λογαριασμού εδώ:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Πειραματική λειτουργία μόνο</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => "Λυπόμαστε πολύ αλλά, προς το παρόν, η ενοποίηση των λογαριασμών βρίσκεται σε πειραματική περίοδο. Γι' αυτόν τον λόγο, οι πραγματικές λειτουργίες συγχώνευσης έχουν απενεργοποιηθεί.",
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Διαβάστε περισσότερα σχετικά με την '''ενιαία πρόσβαση''']]...''",
	'centralauth-list-home-title'          => 'Αρχικό εγχείρημα',
	'centralauth-list-home-dryrun'         => 'Ο κωδικός πρόσβασης και η ηλεκτρονική διεύθυνση που καθορίστηκαν σε αυτό το εγχείρημα θα χρησιμοποιηθούν για τον ενοποιημένο σας λογαριασμό. Θα μπορέσετε αργότερα να αλλάξετε το αρχικό σας εγχείρημα.',
	'centralauth-list-attached-title'      => 'Λογαριασμοί που έχουν επισυναφθεί',
	'centralauth-list-attached'            => 'Ο λογαριασμός που έχει το όνομα "$1" στον κάθε ένα από τους επόμενους ιστοχώρους έχει επισυναφθεί αυτόματα προς τον ενοποιημένο λογαριασμό:',
	'centralauth-list-attached-dryrun'     => 'Ο λογαριασμός που έχει το όνομα "$1" στον κάθε ένα από τους επόμενους ιστοχώρους θα επισυναφθεί αυτόματα προς τον ενοποιημένο λογαριασμό:',
	'centralauth-list-unattached-title'    => 'Λογαριασμοί που δεν έχουν επισυναφθεί',
	'centralauth-list-unattached'          => 'Δεν έγινε δυνατή η επιβεβαίωση ότι ο λογαριασμός "$1" των επόμενων ιστοχώρων σας ανήκει. Είναι πολύ πιθανόν ότι έχουν διαφορετικό κωδικό πρόσβασης από τον πρωτεύοντα λογαριασμό σας:',
	'centralauth-foreign-link'             => 'Χρήστης $1 στον ιστοχώρο $2',
	'centralauth-merge-method-primary'     => 'αρχικό εγχείρημα',
	'centralauth-merge-method-empty'       => 'καμία συνεισφορά',
	'centralauth-merge-method-mail'        => 'επιβεβαιώθηκε μέσω ηλεκτρονικής διεύθυνσης',
	'centralauth-merge-method-password'    => 'επιβεβαιώθηκε μέσω κωδικού πρόσβασης',
	'centralauth-merge-method-admin'       => 'Συγχωνευμένος λογαριασμός λόγω ιδιότητας διαχειριστή',
	'centralauth-merge-method-new'         => 'νέος λογαριασμός',
	'centralauth-merge-method-login'       => 'επιβεβαιώθηκε κάνοντας σύνδεση',
	'centralauth-finish-title'             => 'Ολοκλήρωση της συγχώνευσης',
	'centralauth-finish-text'              => 'Εάν αυτοί οι λογαριασμοί ανήκουν πραγματικά σε σας, μπορείτε να ολοκληρώσετε απλά την διαδικασία ενοποίησης λογαριασμών πληκτρολογώντας εδώ τους κωδικούς πρόσβασης των άλλων λογαριασμών:',
	'centralauth-finish-password'          => 'Κωδικός:',
	'centralauth-finish-login'             => 'Σύνδεση',
	'centralauth-finish-send-confirmation' => 'Αποστολή κωδικού',
	'centralauth-finish-problems'          => 'Συναντήσατε προβλήματα ή δεν είστε ο ιδιοκτήτης των λογαριασμών που ακολουθούν; [[meta:Help:Unified login problems|Πώς να βρείτε βοήθεια]]...',
	'centralauth-finish-noconfirms'        => 'Κανένας λογαριασμός δεν μπορούσε να επιβεβαιωθεί χρησιμοποιώντας αυτόν τον κωδικό.',
	'centralauth-finish-incomplete'        => 'Μερικοί λογαριασμοί συγχωνεύθηκαν χρησιμοποιώντας αυτόν τον κωδικό. Άλλοι λογαριασμοί δεν επιβεβαιώθηκαν ακόμα.',
	'centralauth-merge-attempt'            => "'''Ο κωδικός πρόσβασης που πληκτρολογήσατε ελέγχεται με τους λογαριασμούς που δεν έχουν ακόμα συγχωνευθεί...'''",
	'centralauth-attach-list-attached'     => 'Ο ενοποιημένος λογαριασμός "$1" συμπεριλαμβάνει τους επόμενους λογαριασμούς:',
	'centralauth-attach-title'             => 'Επιβεβαίωση του λογαριασμού',
	'centralauth-attach-text'              => 'Αυτός ο λογαριασμός δεν έχει ακόμη μετακινηθεί προς τον ενοποιημένο λογαριασμό. Εάν ο καθολικός λογαριασμός σας ανήκει επίσης, μπορείτε να συγχωνεύσετε αυτόν εδώ τον λογαριασμό πληκτρολογώντας τον κωδικό πρόσβασης του καθολικού λογαριασμού:',
	'centralauth-attach-submit'            => 'Μετακίνηση του λογαριασμού',
	'centralauth-attach-success'           => 'Ο λογαριασμός μετακινήθηκε προς τον ενοποιημένο λογαριασμό.',
	'centralauth'                          => 'Διαχείριση της ενιαίας σύνδεσης',
	'centralauth-admin-manage'             => 'Διαχείριση δεδομένων χρήστη',
	'centralauth-admin-username'           => 'Όνομα χρήστη:',
	'centralauth-admin-lookup'             => 'Προβολή ή επεξεργασία των δεδομένων χρήστη',
	'centralauth-admin-permission'         => 'Μόνο stewards μπορούν να συγχωνεύσουν λογαριασμούς άλλων χρηστών στη θέση τους.',
	'centralauth-admin-no-unified'         => 'Δεν υπάρχει ενοποιημένος λογαριασμός για αυτό το όνομα χρήστη.',
	'centralauth-admin-info-id'            => 'Ταυτότητα χρήστη:',
	'centralauth-admin-info-registered'    => 'Εγγράφηκε:',
	'centralauth-admin-info-locked'        => 'Προστατευμένοι:',
	'centralauth-admin-info-hidden'        => 'Κρυμμένοι:',
	'centralauth-admin-yes'                => 'ναι',
	'centralauth-admin-no'                 => 'όχι',
	'centralauth-admin-attached'           => 'Λογαριασμοί που έχουν συγχωνευθεί πλήρως',
	'centralauth-admin-unattached'         => 'Ανεπισύναπτοι λογαριασμοί',
	'centralauth-admin-no-unattached'      => 'Δεν υπάρχουν άλλοι ασυγχώνευτοι λογαριασμοί',
	'centralauth-admin-list-localwiki'     => 'Τοπικό εγχείρημα',
	'centralauth-admin-list-attached-on'   => 'Επισυνάπτεται σε',
	'centralauth-admin-list-method'        => 'Μέθοδος',
	'centralauth-admin-unmerge'            => 'Αναίρεση συγχώνευσης των επιλεγμένων',
	'centralauth-admin-merge'              => 'Συγχώνευση των επιλεγμένων',
	'centralauth-admin-bad-input'          => 'Η επιλογή για την συγχώνευση είναι άκυρη',
	'centralauth-admin-none-selected'      => 'Δεν διαλέξατε λογαριασμούς προς τροποποίηση.',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|δευτερόλεπτο|δευτερόλεπτα}} πριν',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|λεπτό|λεπτά}} πριν',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|ώρα|ώρες}} πριν',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|μέρα|μέρες}} πριν',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|μήνα|μήνες}} πριν',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|χρόνο|χρόνια}} πριν',
	'centralauth-prefs-status'             => 'Κατάσταση του καθολικού λογαριασμού:',
	'centralauth-prefs-not-managed'        => 'Δεν χρησιμοποιείται ενοποιημένος λογαριασμός',
	'centralauth-prefs-unattached'         => 'Δεν έχει επιβεβαιωθεί',
	'centralauth-prefs-complete'           => 'Όλα εντάξει!',
	'centralauth-prefs-migration'          => 'Η μετακίνηση βρίσκεται σε εξέλιξη',
	'centralauth-prefs-count-attached'     => 'Ο λογαριασμός σας είναι ενεργός σε $1 {{plural:$1|εγχείρημα|εγχειρήματα}}.',
	'centralauth-prefs-count-unattached'   => 'Παραμένουν ανεπιβεβαίωτοι λογαριασμοί με το όνομά σας σε $1 {{plural:$1|εγχείρημα|εγχειρήματα}}.',
	'centralauth-prefs-detail-unattached'  => 'Δεν έχει επιβεβαιωθεί ότι αυτό το εγχείρημα ανήκει στον καθολικό λογαριασμό.',
	'centralauth-prefs-manage'             => 'Διαχείριση του καθολικού σας λογαριασμού',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Ο χρήστης $1 δεν μπορεί να μετονομαστεί τοπικά καθώς αυτό το όνομα χρήστη έχει μετακινηθεί προς το σύστημα ενιαίας σύνδεσης.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Αδύνατη η μετονομασία του χρήστη $2 γιατί αυτό το όνομα χρήστη είναι κρατημένο για καθολικό λογαριασμό.</div>',
	'centralauth-account-exists'           => 'Αδύνατη η δημιουργία λογαριασμού: το ζητούμενο όνομα είναι επιλεγμένη ήδη στο σύστημα ενιαίας σύνδεσης.',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'mergeaccount'                         => 'Statuso de unuigado de salutnomoj',
	'centralauth-desc'                     => '[[Special:MergeAccount|Kunigu Kontojn]] trans vikioj de la Fondaĵo Vikimedio',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Unuigo de pluraj kontoj]] por ensaluto de unuopa uzulo',
	'centralauth-merge-denied'             => 'Bedaŭrinde, vi ne havas permeson por atingi ĉi tiun paĝon.',
	'centralauth-merge-notlogged'          => 'Bonvolu <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} ensaluti]</span> por kontroli cxu viaj kontoj ja plene kunfandiĝis.',
	'centralauth-merge-welcome'            => "'''Via uzanto-konto ne jam estis migrigita al unuigita salutsistemo de Wikimedia.'''

Se vi elektas migrigi viajn kontojn, vi povos uzi la saman uzulnomon kaj pasvorton por ensaluti en cxiuj vikioj de la projektoj de Wikimedia en ĉiuj haveblaj lingvoj. 
Tio faciligas la laboron kun komunaj projektoj kiaj enŝutado de dosiero en [http://commons.wikimedia.org/ Wikimedia Komunejo], kaj eviti konfuzon aŭ konflikton kiu povus rezulti de tio ke du uzantoj salutantaj per sama salutnomo en diversaj projektoj. 

Se iu alia jam prenis vian uzanto-nomon sur alia paĝaro, tio donos al vi ŝancon ekrilati kun tiu aŭ kun administranto pli poste.",
	'centralauth-merge-step1-title'        => 'Komenci salutnoman unuigadon.',
	'centralauth-merge-step1-detail'       => 'Via pasvorto kaj registrita retadreso estos kontrolitaj kompare kun la kontoj sur aliaj vikioj por konfirmi ke ili korespondas. 
Neniu ŝanĝo estos farita ĝis vi konfirmos ke ĉio aspektas en ordo.',
	'centralauth-merge-step1-submit'       => 'Konfirmu salutadan informon',
	'centralauth-merge-step2-title'        => 'Konfirmu pluajn kontojn',
	'centralauth-merge-step2-detail'       => 'Iuj el la kontoj ne povis esti aŭtomate ligitaj al la menciita hejma vikio. 
Se ĉi tiuj kontoj apartenas al vi, vi povas konfirmi, ke ili estas viaj provizante la pasvorton por ili.',
	'centralauth-merge-step2-submit'       => 'Konfirmu salutinformon',
	'centralauth-merge-dryrun-complete'    => 'Ĉiuj ekzistantaj kontoj povas esti aŭtomate unuigita!

Neniu sxanĝo estis jam farita al viaj kontoj.',
	'centralauth-merge-dryrun-incomplete'  => 'Vi decidis daŭrigi sed iuj kontoj ne povis esti aŭtomate kontrolitaj kaj ne estos migrigitaj tuje. 
Vi povos tion fari pli poste. 

Neniu sxanĝo estis jam farita al viaj kontoj.',
	'centralauth-merge-dryrun-or'          => "'''aŭ'''",
	'centralauth-merge-dryrun-home'        => 'La migrada sistemo ne povis konfirmi ke vi estas la posedanto de la konto en la hejma vikio por via saltunomo. 

Alia vikio estis difinita kiel hejma konto por via salutnomo; sekvu la ligilon suban kaj ensalutu tie por finfari la migrigon de via konto.',
	'centralauth-merge-step3-title'        => 'Kreu unuigitan konton',
	'centralauth-merge-step3-detail'       => 'Vi estas preta por krei vian unuigitan konton kun la jenaj ligitaj vikioj:',
	'centralauth-merge-step3-submit'       => 'Unuigu kontojn',
	'centralauth-complete'                 => 'Unuigado de salutnomoj estas finita!',
	'centralauth-incomplete'               => 'Unuigado de salutnomoj ne estas kompleta!',
	'centralauth-complete-text'            => 'Vi povas nun ensaluti en iu ajn Wikimedia vikipaĝaro ne kreinte novan konton; la sama salutnomo kaj pasvorto nun funkcios en Vikipedio, Vikivortaro, Vikilibroj kaj ties fratinaj projektoj en ĉiuj lingvoj.',
	'centralauth-incomplete-text'          => 'Kiam via ensalutkonto estos unuigita, vi povos ensaluti en kiu ajn Wikimedia vikipaĝaro ne kreinte novan konton; 
la sama uzanto-nomo kaj pasvorto funkcios en Vikipedio, Vikivortaro, Vikilibroj kaj ties fratinaj projektoj en ĉiuj lingvoj.',
	'centralauth-not-owner-text'           => 'La salutnomo "$1" estis aŭtomate donita al la posedanto de la konto $2.

Se vi estas tiu, vi povas finfari la ensalutunuigan proceson simple tajpante la ĉefan pasvorton por tiu konto ĉi tien:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Nur demonstracia reĝimo</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Kontunuigo estas nun en prova fazo, do la unuigaj agoj estas malaktivitaj. Ni bedaŭras!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login/eo|Legu plu pri '''unuigita ensalutado''']]…''",
	'centralauth-list-home-title'          => 'Hejma vikio',
	'centralauth-list-home-dryrun'         => 'La pasvorto kaj retadreso en ĉi tiu vikio estos uzitaj por via unuigita konto. Vi povos ŝanĝi ilin poste en via hejma vikio.',
	'centralauth-list-attached-title'      => 'Ligitaj kontoj',
	'centralauth-list-attached'            => 'La konto nomita "$1" sur ĉiu el al sekvantaj paĝaroj estis aŭtomate ligita al la unuigita konto:',
	'centralauth-list-attached-dryrun'     => 'La konto nomita "$1" sur ĉiu el al sekvantaj paĝaroj estos aŭtomate ligita al la unuigita konto:',
	'centralauth-list-unattached-title'    => 'Neligitaj kontoj',
	'centralauth-list-unattached'          => 'La konto "$1" ne povis esti aŭtomate konfirmita kiel apartenanta al vi sur jenaj paĝaroj; plej verŝajne ili havas pasvorton malsaman de tiu de via ĉefa konto:',
	'centralauth-foreign-link'             => 'Uzanto $1 ĉe $2',
	'centralauth-merge-method-primary'     => 'hejma vikio',
	'centralauth-merge-method-empty'       => 'neniuj kontribuoj',
	'centralauth-merge-method-mail'        => 'konfirmis retpoŝte',
	'centralauth-merge-method-password'    => 'konfirmis per pasvorto',
	'centralauth-merge-method-admin'       => 'kontoj unuigitaj de administranto',
	'centralauth-merge-method-new'         => 'nova konto',
	'centralauth-merge-method-login'       => 'konfirmis per salutado',
	'centralauth-finish-title'             => 'Finu unuigadon',
	'centralauth-finish-text'              => 'Se tiuj kontoj ja apartenas la vi, vi povas finfari la ensalutunuigan proceson simple tajpante la pasvortojn por la aliaj kontoj ĉi tie:',
	'centralauth-finish-password'          => 'Pasvorto:',
	'centralauth-finish-login'             => 'Ensalutu',
	'centralauth-finish-send-confirmation' => 'Retpoŝtu pasvorton',
	'centralauth-finish-problems'          => 'Ĉu vi renkontas problemon, aŭ ne posedante tiujn aliajn kontojn? [[meta:Help:Unified login/eo|Kiel trovi helpon]]...',
	'centralauth-finish-noconfirms'        => 'Neniu konto povis esti konfirmita uzante ĉi tiun pasvorton.',
	'centralauth-finish-incomplete'        => 'Pluraj kontoj estis unuigitaj uzante ĉi tiun pasvorton.
Aliaj kontoj ne jam estas konfirmitaj.',
	'centralauth-merge-attempt'            => "'''Kontrolo de la provizita pasvorto kontraŭ restantaj nekunfanditaj kontoj…'''",
	'centralauth-attach-list-attached'     => 'La unuigita konto nomata "$1" inkluzivas la jenajn kontojn:',
	'centralauth-attach-title'             => 'Konfirmu konton',
	'centralauth-attach-text'              => 'Ĉi tiu konto ne jam estis migrigita al unuigita konto.
Se la ĝenerala konto ankaŭ estas via, vi povas unuigi ĉi tiun konton se vi tajpas la pasvorton de la ĝenerala konto:',
	'centralauth-attach-submit'            => 'Migru konton',
	'centralauth-attach-success'           => 'La konto estis migrigita al la unuigita konto.',
	'centralauth'                          => 'Administrado de la unuigita salutsistemo',
	'centralauth-admin-manage'             => 'Prizorgu uzulajn datenojn',
	'centralauth-admin-username'           => 'Salutnomo:',
	'centralauth-admin-lookup'             => 'Rigardu aŭ redaktu datenojn de uzanto',
	'centralauth-admin-permission'         => 'Nur stevardoj povas kunigi kontojn de aliaj uzantoj.',
	'centralauth-admin-no-unified'         => 'Ne estas unuigita konto por ĉi tiu uzanto.',
	'centralauth-admin-info-id'            => 'Identigo de uzanto:',
	'centralauth-admin-info-registered'    => 'Registrita:',
	'centralauth-admin-info-locked'        => 'Ŝlosita:',
	'centralauth-admin-info-hidden'        => 'Kaŝita:',
	'centralauth-admin-yes'                => 'jes',
	'centralauth-admin-no'                 => 'ne',
	'centralauth-admin-attached'           => 'Plene unuigitaj kontoj',
	'centralauth-admin-unattached'         => 'Neligitaj kontoj',
	'centralauth-admin-no-unattached'      => 'Restas neniu konto neunuigita.',
	'centralauth-admin-list-localwiki'     => 'Loka vikio',
	'centralauth-admin-list-attached-on'   => 'Ligita al',
	'centralauth-admin-list-method'        => 'Metodo',
	'centralauth-admin-unmerge'            => 'Malunuigu selektitaĵojn',
	'centralauth-admin-merge'              => 'Unuigu selektitaĵojn',
	'centralauth-admin-bad-input'          => 'Nevalida unuiga selekto',
	'centralauth-admin-none-selected'      => 'Ne estas selektitaj ŝanĝendaj kontoj.',
	'centralauth-admin-already-unmerged'   => 'Preterlasante $1, jam nekunigitan.',
	'centralauth-admin-delete-title'       => 'Forigu konton',
	'centralauth-admin-delete-button'      => 'Forigu ĉi tiu konton',
	'centralauth-seconds-ago'              => 'antaŭ $1 {{PLURAL:$1|sekundo|sekundoj}}',
	'centralauth-minutes-ago'              => 'antaŭ $1 {{PLURAL:$1|minuto|minutoj}}',
	'centralauth-hours-ago'                => 'antaŭ $1 {{PLURAL:$1|horo|horoj}}',
	'centralauth-days-ago'                 => 'antaŭ $1 {{PLURAL:$1|tago|tagoj}}',
	'centralauth-months-ago'               => 'antaŭ $1 {{PLURAL:$1|monato|monatoj}}',
	'centralauth-years-ago'                => 'antaŭ $1 {{PLURAL:$1|jaro|jaroj}}',
	'centralauth-prefs-status'             => 'Statuso de la unuigita konto:',
	'centralauth-prefs-not-managed'        => 'Ne uzante unuigitan konton',
	'centralauth-prefs-unattached'         => 'Nekonfirmita',
	'centralauth-prefs-complete'           => 'Ĉiuj bonas!',
	'centralauth-prefs-migration'          => 'Migrante',
	'centralauth-prefs-count-attached'     => 'Via konto estas aktiva sur $1 {{plural:$1|projekta paĝaro|projektaj paĝaroj}}.',
	'centralauth-prefs-count-unattached'   => 'Nekonfirmitaj kontoj kun via nomo restas sur $1 {{plural:$1|projekto|projektoj}}.',
	'centralauth-prefs-detail-unattached'  => 'Ĉi tiu projekta paĝaro ne estis konfirmita kiel aparteanta al la unuigita salutsistemo.',
	'centralauth-prefs-manage'             => 'Prizorgu vian unuigitan konton',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Neeblis renomi la uzanton $1 en la loka vikio ĉar tiu salutnomo estis migrigita  al unuigita salutsistemo.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Neeblis alinomigu uzanton $2 ĉar tiu salutnomo estas rezervita por unuigita konto.</div>',
	'centralauth-invalid-wiki'             => 'Nenia vikia datumbazo: $1',
	'centralauth-account-exists'           => 'Neeblis krei konton: la petita uzulnomo estas jam uzita en la unuigita salutsistemo.',
);

/** Spanish (Español)
 * @author Drini
 * @author Piolinfax
 */
$messages['es'] = array(
	'mergeaccount'                        => 'Estado de la unificación de cuentas',
	'centralauth-desc'                    => '[[Special:MergeAccount|Fusiona cuentas]] entre wikis de la Fundación Wikimedia',
	'centralauth-mergeaccount-desc'       => '[[Special:MergeAccount|Fusiona múltiples cuentas]] para Ingreso de Usuario Unico (SUL)',
	'centralauth-merge-denied'            => 'Lo siento, no tienes permiso para acceder a esta página.',
	'centralauth-merge-notlogged'         => 'Por favor <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} ingresa]</span> para revisar que tus cuentas hayan sido completamente fusionadas.',
	'centralauth-merge-welcome'           => "'''Tu cuenta de usuario no ha sido migrada al sistema de cuentas unificadas de Wikimedia.'''

Si decides migrar tus cuentas, podrás usar el mismo nombre de usuario y contraseña para ingresar a todas las wikis de los proyectos Wikimedia en todos los idiomas.
Esto facilitará el trabajo en proyectos compartidos, tales como subir contenido a [http://commons.wikimedia.org/ Wikimedia Commons], y evitará la confusión o conflicto que resulte de que dos personas escojan el mismo nombre de usuario en proyectos diferentes.

Si alguien ya ha tomado tu nombre de usuario en otro sitio, esto no les afectará, pero podrás llegar a un arreglo posterior con ellos o con un administrador.",
	'centralauth-merge-step1-title'       => 'Inicia la unificación de cuentas',
	'centralauth-merge-step1-detail'      => 'Tu contraseña y dirección de correo electrónico registrados se compararán con las cuentas de las otras wikis para asegurarse que coinciden. No se harán cambios hasta que confirmes que todo parece estar bien.',
	'centralauth-merge-step1-submit'      => 'Confirma la información de ingreso',
	'centralauth-merge-step2-title'       => 'Confirma más cuentas',
	'centralauth-merge-step2-detail'      => 'Algunas de estas cuentas no pudieron relacionarse automáticamente con la de la wiki designada como principal.
Si estas cuentas te pertenecen, confirma que son tuyas ingresando la contraseña de las mismas.',
	'centralauth-merge-step2-submit'      => 'Confirma la información de ingreso',
	'centralauth-merge-dryrun-complete'   => '¡Todas las cuentas existentes pueden unificarse automáticamente!

Todavía no se han realizado cambios a las cuentas.',
	'centralauth-merge-dryrun-incomplete' => 'Todo está listo para continuar, pero algunas cuentas no pudieron ser verificadas automáticamente y no serán migradas de inmediato.
Podrás fusionarlas más adelante.

Todavía no se han realizado cambios a tus cuentas.',
	'centralauth-merge-dryrun-or'         => "'''o'''",
	'centralauth-merge-dryrun-home'       => 'El sistema de migración no puede confirmar que eres el propietario de la wiki principal para el nombre de usuario.

Otra wiki se designó como la cuenta principal para tu nombre de usuario. Sigue el enlace e ingresa en ella para terminar la migración de las cuentas.',
	'centralauth-merge-step3-title'       => 'Crear una cuenta unificada',
	'centralauth-merge-step3-detail'      => 'Estás listo para crear tu cuenta unificada con las siguientes wikis adjuntas:',
	'centralauth-merge-step3-submit'      => 'Unificar cuentas',
	'centralauth-complete'                => '¡Se completó la unificación de cuentas!',
	'centralauth-incomplete'              => '¡No se completó la unificación de cuentas!',
	'centralauth-complete-text'           => 'Ahora puedes ingresar a cualquier wiki de Wikimedia sin crear una cuenta nueva;
El mismo usuario y contraseña funcionarán en Wikipedia, Wikcionario, Wikilibros y sus proyectos hermanos en todos los idiomas.',
	'centralauth-incomplete-text'         => 'Una vez que tus cuentas hayan sido unificadas, podrás ingresar a cualquier wiki de Wikimedia sin crear una cuenta nueva;
El mismo usuario y contraseña funcionarán en Wikipedia, Wikcionario, Wikilibros y sus proyectos hermanos en todos los idiomas.',
	'centralauth-not-owner-text'          => 'El usuario "$1" ha sido asignado de forma automática al dueño de la cuenta en $2.

Si éste eres tú, puedes terminar el proceso de unificación ingresando aquí la contraseña maestra para esa cuenta:',
	'centralauth-notice-dryrun'           => "<div class='successbox'>Unicamente modo demo</div><br clear='all'/>",
	'centralauth-disabled-dryrun'         => 'La unificación de cuentas está por ahora en modo demostración / depuración, por lo que las operaciones de fusión están desactivadas. ¡Lo sentimos!',
	'centralauth-readmore-text'           => ":''[[meta:Help:Unified login|Lee más sobre '''cuentas unificadas''']]…''",
	'centralauth-list-home-title'         => 'Wiki hogar',
	'centralauth-list-home-dryrun'        => 'La contraseña y la dirección de correo electrónico asignados a esta cuenta serán usados para la cuenta unificada. 
Podrás cambiar posteriormente la wiki considerada hogar.',
	'centralauth-list-attached-title'     => 'Cuentas adjuntas',
	'centralauth-list-attached'           => 'La cuenta llamada "$1" en cada uno de los siguientes sitios ha sido automáticamente añadida a la cuenta unificada:',
	'centralauth-list-attached-dryrun'    => 'La cuenta llamada "$1" en cada uno de los siguientes sitios será automáticamente añadida a la cuenta unificada:',
	'centralauth-list-unattached-title'   => 'Cuentas no adjuntas',
	'centralauth-foreign-link'            => 'Usuario $1 en $2',
	'centralauth-merge-method-primary'    => 'wiki hogar',
	'centralauth-merge-method-empty'      => 'sin contribuciones',
	'centralauth-seconds-ago'             => 'hace $1 {{PLURAL:$1|segundo|segundos}}',
	'centralauth-minutes-ago'             => 'hace $1 {{PLURAL:$1|minuto|minutos}}',
	'centralauth-hours-ago'               => 'hace $1 {{PLURAL:$1|hora|horas}}',
	'centralauth-days-ago'                => 'hace $1 {{PLURAL:$1|día|días}}',
	'centralauth-months-ago'              => 'hace $1 {{PLURAL:$1|mes|meses}}',
	'centralauth-years-ago'               => 'hace $1 {{PLURAL:$1|año|años}}',
);

$messages['ext'] = array(
	'centralauth-admin-username'           => 'Nombri d´usuáriu:',
);

/** Persian (فارسی)
 * @author Huji
 */
$messages['fa'] = array(
	'mergeaccount'                         => 'وضعیت یکی کردن حساب‌ها',
	'centralauth-desc'                     => 'یکی کردن حساب‌های کاربری در ویکی‌های بنیاد ویکی‌مدیا',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|ادغام چند حساب کاربری]] به منظور یکی کردن حساب‌های کاربری',
	'centralauth-merge-denied'             => 'متاسفیم، شما اختیارات لازم برای دسترسی به این صفحه را ندارید.',
	'centralauth-merge-notlogged'          => 'لطفاً <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} به سیستم وارد شوید]</span> تا از ادغام حساب‌های کاربر‌ی‌تان اطمینان حاصل کنید.',
	'centralauth-merge-welcome'            => "'''حساب کاربری شما هنوز به سامانه یکی کردن حساب‌های ویکی‌مدیا انتقال داده نشده‌است.'''

اگر شما تصمیم بگیرید که حساب‌های کاربری‌تان را انتقال بدهید، شما قادر خواهید بود که با یک حساب کاربری و کلمه عبور در تمام پروژه‌های ویکی‌مدیا به تمام زبان‌ها وارد شوید.
این عمل باعث آسان‌تر شدن کار با پروژه‌های مشترک نظیر بارگذاری تصاویر در [http://commons.wikimedia.org/ ویکی‌انبار] می‌شود، و مانع از سردرگمی‌هایی می‌شود که از استفادهٔ دو نفر از یک نام کاربری در دو پروژهٔ مختلف ناشی می‌شود.

اگر نام کاربری شما قبلاً در پروژهٔ دیگری توسط شخص دیگری استفاده شده باشد، این کار باعث مزاحمت برای آن‌ها نمی‌شود بلکه به شما این امکان را می‌دهد که بعداً این مشکل را با کمک آن‌ها یا یک مدیر حل کنید.",
	'centralauth-merge-step1-title'        => 'آغاز یکی کردن حساب‌های کاربری',
	'centralauth-merge-step1-detail'       => 'کلمه عبور و نشانی پست الکترونیکی ثبت‌شده توسط شما با حساب‌های کاربری دیگر ویکی‌ها مقایسه می‌شود تا از مطابقت آن‌ها اطمینان حاصل گردد. تا زمانی که شما تایید نکنید که همه چیز درست است، تغییر صورت نمی‌گیرد.',
	'centralauth-merge-step1-submit'       => 'تایید اطلاعات ورود به سیستم',
	'centralauth-merge-step2-title'        => 'تایید حساب‌های کاربری بیشتر',
	'centralauth-merge-step2-detail'       => 'برخی از حساب‌های کاربری را نمی‌توان به طور خودکار با حساب ویکی اصلی مطابقت داد. اگر این حساب‌های کاربری متعلق به شما هستند، شما می‌توانید این مساله را با وارد کردن کلمه عبور این حساب‌ها تایید کنید.',
	'centralauth-merge-step2-submit'       => 'تایید اطلاعات ورود به سیستم',
	'centralauth-merge-dryrun-complete'    => 'تمامی حساب‌های کاربری موجود را می‌توان به طور خودکار یکی کرد!

هنوز تغییری در حساب‌های کاربری شما داده نشده‌است.',
	'centralauth-merge-dryrun-incomplete'  => 'شما می‌توانید به کار خود ادامه دهید، اما برخی از حساب‌های کاربری به طور خودکار قابل ادغام نیستند.
شما می‌توانید آن‌ها را بعداً ادغام کنید.

هنوز تغییری در حساب‌های کاربری شما داده نشده‌است.',
	'centralauth-merge-dryrun-or'          => "'''یا'''",
	'centralauth-merge-dryrun-home'        => 'سامانه انتقال نمی‌توان تایید کند که شما صاحب حساب کاربری مورد نظر در ویکی خانه هستید.

یک ویکی دیگر به عنوان ویکی خانه برای حساب‌ کاربری شما در نظر گرفته شد؛ پیوند زیر را دنبال کنید تا به سیستم وارد شوید و انتقال حساب کاربری خود را به پایان برسانید.',
	'centralauth-merge-step3-title'        => 'ایجاد حساب مشترک',
	'centralauth-merge-step3-detail'       => 'شما آماده‌اید که حساب مشترک خود را در ویکی‌های زیر ایجاد کنید:',
	'centralauth-merge-step3-submit'       => 'یکی کردن حساب‌ها',
	'centralauth-complete'                 => 'یکی کردن حساب‌ها کامل شد!',
	'centralauth-incomplete'               => 'یکی کردن حساب‌ها کامل نشد!',
	'centralauth-complete-text'            => 'اکنون شما می‌توانید در هر یک از ویکی‌های ویکی‌مدیا وارد شوید بدون آن که حساب جدیدی بسازید؛ حساب کاربری مشترک شما در ویکی‌پدیا، ویکی‌واژه، ویکی‌نسک و دیگر پروژه‌های خواهر، در تمام زبان‌ها کار خواهد کرد.',
	'centralauth-incomplete-text'          => 'از زمانی که حساب‌های کاربری شما یکی شود، شما قادر خواهید بود در هر یک از ویکی‌های ویکی‌مدیا وارد شوید بدون آن که حساب کاربری جدیدی بسازید؛ حساب کاربری مشترک شما در ویکی‌پدیا، ویکی‌واژه، ویکی‌نسک و دیگر پروژه‌های خواهر، در تمام زبان‌ها کار خواهد کرد.',
	'centralauth-not-owner-text'           => 'حساب کاربری «$1» به طور خودکار به صاحب حساب کاربری در $2 اختصاص داده شد.

اگر شما صاحب این حساب هستید، شما می‌توانید روند یکی کردن حساب‌های کاربری را با وارد کردن کلمه عبور سراسری در این‌جا به پایان برسانید:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>فقط مدل نمایشی</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'سامانه یکی کردن حساب‌های کاربری در حال حاضر به طور آزمایشی و برای رفع ایراد فعال است، بنابراین یکی کردن واقعی حساب‌های کاربری هنوز فعال نیست. متاسفیم!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|اطلاعات بیشتر دربارهٔ '''حساب کاربری مشترک''']]...''",
	'centralauth-list-home-title'          => 'ویکی اصلی',
	'centralauth-list-home-dryrun'         => 'کلمه عبور و نشانی پست الکترونیکی انتخاب شده در این ویکی برای حساب کاربری مشترک شما مورد استفاده قرار خواهد گرفت، و حساب کاربری شما در دیگر ویکی‌ها به طور خودکار به این ویکی پیوند خواهد شد. شما می‌توانید بعداً ویکی اصلی خود را تغییر دهید.',
	'centralauth-list-attached-title'      => 'حساب‌های کاربری غیرمتصل',
	'centralauth-list-attached'            => 'حساب کاربری «$1» در هر یک از پروژه‌های زیر به طور خودکار به حساب کاربری مشترک شما متصل شده‌است:',
	'centralauth-list-attached-dryrun'     => 'حساب کاربری «$1» در هر یک از پروژه‌های زیر به طور خودکار به حساب کاربری مشترک شما متصل خواهد شد:',
	'centralauth-list-unattached-title'    => 'حساب‌های کاربری متصل',
	'centralauth-list-unattached'          => 'حساب کاربری $1 را در وبگاه‌های زیر نمی‌توان به طور خودکار متعلق به شما دانست؛ به احتمال زیاد کلمه عبور آن‌ها با حساب کاربری اصلی شما متفاوت است:',
	'centralauth-foreign-link'             => 'حساب کاربری $1 در $2',
	'centralauth-merge-method-primary'     => 'ویکی خانه',
	'centralauth-merge-method-empty'       => 'بدون مشارکت',
	'centralauth-merge-method-mail'        => 'تایید شده توسط پست الکترونیکی',
	'centralauth-merge-method-password'    => 'تایید شده توسط گذرواژه',
	'centralauth-merge-method-admin'       => 'حساب کاربری ادغام شده توسط مدیر',
	'centralauth-merge-method-new'         => 'حساب کاربری جدید',
	'centralauth-merge-method-login'       => 'تایید شده توسط ورود به سیستم',
	'centralauth-finish-title'             => 'خاتمه ادغام',
	'centralauth-finish-text'              => 'اگر شما صاحب این حساب‌ها هستید، می‌توانید روند یکی کردن حساب‌های کاربری را با وارد کردن کلمه عبور سراسری در این‌جا به پایان برسانید:',
	'centralauth-finish-password'          => 'کلمه عبور:',
	'centralauth-finish-login'             => 'ورود به سیستم',
	'centralauth-finish-send-confirmation' => 'کلمه عبور پست الکترونیکی',
	'centralauth-finish-problems'          => 'دچار مشکلی شده‌اید یا صاحب حساب‌های کاربری دیگری که فهرست شده‌اند نیستید؟ [[meta:Help:Unified login problems|راهنما را بخوانید]]...',
	'centralauth-finish-noconfirms'        => 'هیچ حساب کاربری با این گذرواژه قابل تایید نیست.',
	'centralauth-finish-incomplete'        => 'چندین حساب کاربری توسط این گذرواژه یکی شدند.
دیگر حساب‌های کاربری هنوز تایید نشده‌اند.',
	'centralauth-merge-attempt'            => "'''مطابقت دادن کلمه عبور وارد شده با حساب‌های ادغام‌نشدهٔ باقی‌مانده...'''",
	'centralauth-attach-list-attached'     => 'حساب کاربری مشترک «$1» شامل این حساب‌های کاربری می‌شود:',
	'centralauth-attach-title'             => 'تایید حساب کاربری',
	'centralauth-attach-text'              => 'این حساب کاربری هنوز به حساب کاربری مشترک انتقال داده نشده‌است. اگر حساب کاربری مشترک متعلق به شما است، می‌توانید این حساب را هم با وارد کردن کلمه عبور آن به حساب کاربری مشترک متصل کنید:',
	'centralauth-attach-submit'            => 'انتقال حساب کاربری',
	'centralauth-attach-success'           => 'حساب کاربری به حساب کاربری مشترک انتقال داده شد.',
	'centralauth'                          => 'مدیریت حساب کاربری مشترک',
	'centralauth-admin-manage'             => 'مدیریت اطلاعات کاربر',
	'centralauth-admin-username'           => 'نام کاربری:',
	'centralauth-admin-lookup'             => 'مشاهده یا تغییر اطلاعات کاربری',
	'centralauth-admin-permission'         => 'تنها ویکیبدها می‌توانند حساب کاربری دیگر کاربرها را یکی کنند.',
	'centralauth-admin-no-unified'         => 'حساب کاربری مشترک برای این نام کاربری وجود ندارد.',
	'centralauth-admin-info-id'            => 'شماره کاربر:',
	'centralauth-admin-info-registered'    => 'ثبت شده:',
	'centralauth-admin-info-locked'        => 'قفل شده:',
	'centralauth-admin-info-hidden'        => 'پنهان شده:',
	'centralauth-admin-yes'                => 'بله',
	'centralauth-admin-no'                 => 'خیر',
	'centralauth-admin-attached'           => 'حساب‌های یکی شده به طور کامل',
	'centralauth-admin-unattached'         => 'حساب‌های متصل نشده',
	'centralauth-admin-no-unattached'      => 'هیچ حساب ادغام نشده‌ای باقی نمانده‌است.',
	'centralauth-admin-list-localwiki'     => 'ویکی محلی',
	'centralauth-admin-list-attached-on'   => 'متصل شده',
	'centralauth-admin-list-method'        => 'روش',
	'centralauth-admin-unmerge'            => 'از ادغام درآوردن موارد انتخاب شده',
	'centralauth-admin-merge'              => 'انتخاب ادغام',
	'centralauth-admin-bad-input'          => 'انتخاب غیرمجاز برای ادغام',
	'centralauth-admin-none-selected'      => 'هیچ حساب کاربری برای تغییر انتخاب نشده‌است.',
	'centralauth-admin-already-unmerged'   => 'پریدن از روی $1، به دلیل این که از ادغام در آورده شده',
	'centralauth-admin-unmerge-success'    => '$1 {{PLURAL:$2|حساب کاربری|حساب کاربری}} را با موفقیت از ادغام در آورد',
	'centralauth-admin-delete-title'       => 'حذف حساب کاربری',
	'centralauth-admin-delete-description' => 'حذف حساب کاربری مشترک باعث حذف تنظیمات مشترک و از ادغام در آمدن حساب‌های محلی می‌شود و نام کاربری مشترک را برای استفاده دیگر کاربرها آزاد می‌گذارد.
حساب‌های کاربری محلی باقی خواهند ماند.
گذرواژهٔ حساب‌های کاربری که قبل از ادغام ایجاد شده بودند به مقدار قبل از ادغام بازگشت خواهد کرد.',
	'centralauth-admin-delete-button'      => 'حذف این حساب کاربری',
	'centralauth-admin-delete-success'     => 'حساب کاربری مشترک «<nowiki>$1</nowiki>» را با موفقیت حذف کرد.',
	'centralauth-admin-nonexistent'        => 'حساب کاربری مشترکی برای «<nowiki>$1</nowiki>» وجود ندارد.',
	'centralauth-admin-delete-nonexistent' => 'خطا: حساب کاربری مشترک «<nowiki>$1</nowiki>» وجود ندارد.',
	'centralauth-token-mismatch'           => 'شرمنده! به علت از دست رفتن اطلاعات نشست کاربری، نمی‌توانیم فرم شما را پردازش کنیم.',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|ثانیه|ثانیه}} قبل',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|دقیقه|دقیقه}} قبل',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|ساعت|ساعت}} قبل',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|روز|روز}} قبل',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|ماه|ماه}} قبل',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|سال|سال}} قبل',
	'centralauth-prefs-status'             => 'وضعیت حساب کاربری مشترک',
	'centralauth-prefs-not-managed'        => 'عدم استفاده از حساب کاربری مشترک',
	'centralauth-prefs-unattached'         => 'تایید نشده',
	'centralauth-prefs-complete'           => 'همه‌چیز مرتب است!',
	'centralauth-prefs-migration'          => 'در حال انتقال',
	'centralauth-prefs-count-attached'     => 'حساب کاربری شما در $1 {{plural:$1|پروژه|پروژه}} فعال است.',
	'centralauth-prefs-count-unattached'   => 'حساب‌های کاربری تایید نشده‌ای با نام شما در $1 {{plural:$1|پروژه|پروژه}} باقی می‌مانند.',
	'centralauth-prefs-detail-unattached'  => 'وبگاه این پروژه مورد تایید برای استفاده از حساب کاربری مشترک قرار نگرفته‌است.',
	'centralauth-prefs-manage'             => 'مدیریت حساب کاربری مشترک',
	'centralauth-renameuser-abort'         => '<div class="errorbox">امکان تغییر نام حساب کاربری $1 به طور محلی وجود ندارد، زیرا این حساب به سامانه یکی کردن حساب‌های کاربری منتقل شده‌است.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">نام حساب کاربری $2 را نمی‌توان تغییر داد زیرا این حساب کاربری برای یک حساب مشترک کنار گذاشته شده‌است.</div>',
	'centralauth-invalid-wiki'             => 'چنین پایگاه اطلاعاتی وجود ندارد: $1',
	'centralauth-account-exists'           => 'امکان ایجاد حساب کاربری وجود ندارد: حساب کاربری مورد نظر پیش از این در سامانه حساب کاربری مشترک به کار گرفته شده‌است.',
);

/** Finnish (Suomi)
 * @author Nike
 * @author Crt
 * @author Cimon Avaro
 */
$messages['fi'] = array(
	'mergeaccount'                         => 'Käyttäjätunnusten yhdistämisen tila',
	'centralauth-desc'                     => 'Mahdollistaa [[Special:MergeAccount|käyttäjätunnusten yhdistämisen]] Wikimedian wikeissä.',
	'centralauth-merge-denied'             => 'Et ole oikeutettu käyttämään tätä sivua.',
	'centralauth-merge-notlogged'          => 'Kirjaudu <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} sisään]</span>, jos haluat tarkistaa, ovatko käyttäjätunnuksesi yhdistetty.',
	'centralauth-merge-welcome'            => "'''Tunnustasi ei ole vielä siirretty Wikimedian yhden tunnuksen kirjautumisjärjestelmään.'''

Jos päivität tunnuksesi, voit jatkossa kirjautua kaikkiin Wikimedian projekteihin ja niiden kieliversioihin samalla käyttäjätunnuksella ja salasanalla.
Vain yhden tunnuksen olemassa olo helpottaa yhteisten projektien käyttöä, kuten esimerkiksi kuvien ja muiden tiedostojen tallentamisen [http://commons.wikimedia.org/ Wikimedia Commonsiin]. Se myös vähentää sekaannuksia, jos eri ihmisillä on sama käyttäjänimi eri projekteissa.

Jos käyttäjänimesi on jo varattu toisessa projektissa, yhdistäminen ei haittaa näitä toisia käyttäjiä, mutta antaa sinulle mahdollisuuden neuvotella käyttäjänimestä näiden toisten käyttäjien kanssa, tai myöhemmin ylläpitäjän kanssa.",
	'centralauth-merge-step1-title'        => 'Tunnusten yhdistäminen',
	'centralauth-merge-step1-detail'       => 'Salasanaasi ja asettamaasi sähköpostiosoitetta verrataan muissa wikeissä oleviin tunnuksiin, niiden samuuden varmistamiseksi. Mitään muutoksia ei toteuteta ennen kuin varmistat, että kaikki näyttää hyvältä.',
	'centralauth-merge-step1-submit'       => 'Vahvista yhdistäminen',
	'centralauth-merge-step2-title'        => 'Muiden tunnusten yhdistäminen',
	'centralauth-merge-step2-detail'       => 'Joidenkin käyttäjätunnusten samuutta kotiwikin käyttäjätunnukseen ei  voitu varmistaa. Jos nämä tunnukset kuuluvat sinulle, voit todistaa niiden kuuluvan sinulle antamalla niiden salasanan.',
	'centralauth-merge-step2-submit'       => 'Vahvista yhdistäminen',
	'centralauth-merge-dryrun-complete'    => 'Kaikki käyttäjätunnuksesi voidaan yhdistää automaattisesti.

Mitään muutoksia ei ole vielä tehty.',
	'centralauth-merge-dryrun-incomplete'  => 'Olet valmis jatkamaan, mutta kaikkia tunnuksia ei voitu varmistaa automaattisesti, joten niitä ei yhdistetä heti.
Sinulle tulee myöhemmin mahdollisuus yhdistää ne.

Mitään muutoksia ei ole vielä tehty.',
	'centralauth-merge-dryrun-or'          => "'''tai'''",
	'centralauth-merge-dryrun-home'        => 'Järjestelmä ei pystynyt varmentamaan, että oletko kotiwikisi käyttäjätunnuksen omistaja tällä käyttäjänimellä.

Käyttäjänimesi kotiwikiksi on arvioitu toinen wiki; napsauta seuraavaa linkkiä ja kirjaudu sisään viimeistelläksesi käyttäjätunnuksien yhdistämisen.',
	'centralauth-merge-step3-title'        => 'Yhdistetyn käyttäjätunnuksen luominen',
	'centralauth-merge-step3-detail'       => 'Voit nyt luoda yhdistetyn käyttäjätunnuksen, johon on tehty kytkökset seuraavista wikeistä:',
	'centralauth-merge-step3-submit'       => 'Yhdistä tunnukset',
	'centralauth-complete'                 => 'Käyttäjätunnusten yhdistäminen on valmis.',
	'centralauth-incomplete'               => 'Käyttäjätunnusten yhdistäminen ei ole valmis.',
	'centralauth-complete-text'            => 'Voit nyt kirjautua mihin tahansa Wikimedian wikiin luomatta uutta käyttäjätunnusta. Sama käyttäjänimi ja salasana toimii Wikipediassa, Wikisanakirjassa, Wikikirjastossa ja muissa projekteissa sekä niiden kaikissa kieliversioissa.',
	'centralauth-incomplete-text'          => 'Kun kaikki tunnuksesi on yhdistetty, voit kirjautua mihin tahansa Wikimedian wikiin luomatta uutta käyttäjätunnusta. Sama käyttäjänimi ja salasana toimii Wikipediassa, Wikisanakirjassa, Wikikirjastossa ja muissa projekteissa sekä niiden kaikissa kieliversioissa.',
	'centralauth-not-owner-text'           => 'Käyttäjänimi ”$1” annettiin automaattisesti käyttäjätunnuksen $2 omistajalle.

Jos tämä tunnus on sinun, voi viimeistellä tunnusten yhdistämisen antamalla päätunnuksen salasanan:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Vain testi</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Tunnusten yhdistäminen on tällä hetkellä kokeilutilassa. Tunnusten yhdistämisoperaatioita ei suoriteta.',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Lisätietoja '''yhdistetystä tunnuksesta''']]...''",
	'centralauth-list-home-title'          => 'Kotiwiki',
	'centralauth-list-home-dryrun'         => 'Kotiwikissä olevan tunnuksen salasanaa ja sähköpostiosoitetta käytetään yhdistetyssä tunnuksessa.
Voit vaihtaa kotiwikiäsi myöhemmin tulevaisuudessa.',
	'centralauth-list-attached-title'      => 'Liitetyt tunnukset',
	'centralauth-list-attached'            => 'Tunnus nimeltä ”$1” on liitetty automaattisesti yhdistettyyn käyttäjätunnukseesi seuraavista wikeistä:',
	'centralauth-list-attached-dryrun'     => 'Tunnus nimeltä ”$1” liitetään automaattisesti yhdistettyyn käyttäjätunnukseesi seuraavista wikeistä:',
	'centralauth-list-unattached-title'    => 'Liittämättömät tunnukset',
	'centralauth-list-unattached'          => 'Tunnusta ”$1” ei voitu liittää automaattisesti seuraavista wikeistä, koska niissä todennäköisesti on eri salasana:',
	'centralauth-foreign-link'             => 'Tunnus $1 projektissa $2',
	'centralauth-merge-method-primary'     => 'kotiwiki',
	'centralauth-merge-method-empty'       => 'ei muokkauksia',
	'centralauth-merge-method-mail'        => 'vahvistettu sähköpostiosoitteella',
	'centralauth-merge-method-password'    => 'vahvistettu salasanalla',
	'centralauth-merge-method-admin'       => 'ylläpitäjän yhdistämä käyttäjätunnus',
	'centralauth-merge-method-new'         => 'uusi tunnus',
	'centralauth-merge-method-login'       => 'vahvistettu kirjautumalla',
	'centralauth-finish-title'             => 'Suorita yhdistäminen',
	'centralauth-finish-text'              => 'Jos nämä käyttäjätunnukset kuuluvat sinulle, voit suorittaa käyttäjätunnusten yhdistämisen kirjoittamalla toisten käyttäjätunnusten salasanat:',
	'centralauth-finish-password'          => 'Salasana',
	'centralauth-finish-login'             => 'Kirjaudu sisään',
	'centralauth-finish-send-confirmation' => 'Lähetä salasana sähköpostitse',
	'centralauth-finish-problems'          => 'Ongelmia? Etkö omista näitä tunnuksia? [[meta:Help:Unified login problems|Apua voi etsiä täältä]]...',
	'centralauth-finish-noconfirms'        => 'Tällä salasanalla ei voitu varmentaa yhtään käyttäjätunnusta.',
	'centralauth-finish-incomplete'        => 'Tätä salasanaa käyttäen yhdistettiin useita käyttäjätunnuksia. Muut tunnukset ovat vielä varmentamattomia.',
	'centralauth-merge-attempt'            => "'''Tarkistetaan annettua salasanaa jäljellä oleviin liittämättömiin tunnuksiin...'''",
	'centralauth-attach-list-attached'     => 'Yhdistetty käyttäjätunnuksesi ”$1” sisältää seuraavat tunnukset:',
	'centralauth-attach-title'             => 'Vahvista käyttäjätunnus',
	'centralauth-attach-text'              => 'Tätä tunnusta ei ole vielä liitetty yhdistettyyn käyttäjätunnukseen. Jos myös päätunnus kuuluu sinulle, voit yhdistää tämän tunnuksen antamalla päätunnuksen salasanan:',
	'centralauth-attach-submit'            => 'Liitä tunnus',
	'centralauth-attach-success'           => 'Tunnus liitettiin yhdistettyyn käyttäjätunnukseen.',
	'centralauth'                          => 'Yhdistetyn käyttäjätunnuksen hallinta',
	'centralauth-admin-manage'             => 'Käyttäjätietojen hallinta',
	'centralauth-admin-username'           => 'Käyttäjätunnus',
	'centralauth-admin-lookup'             => 'Näytä tai muokkaa käyttäjätietoja',
	'centralauth-admin-permission'         => 'Vain ylivalvojat (steward) voivat yhdistää toisten ihmisten tunnuksia heidän puolestaan.',
	'centralauth-admin-no-unified'         => 'Käyttäjänimellä ei ole yhdistettyä käyttäjätunnusta.',
	'centralauth-admin-info-id'            => 'Käyttäjänumero',
	'centralauth-admin-yes'                => 'kyllä',
	'centralauth-admin-no'                 => 'ei',
	'centralauth-admin-attached'           => 'Täysin yhdistetyt tunnukset',
	'centralauth-admin-no-unattached'      => 'Yhdistämättömiä käyttäjätunnuksia ei ole jäljellä.',
	'centralauth-admin-list-localwiki'     => 'Paikallinen wiki',
	'centralauth-admin-unmerge'            => 'Erota valitut',
	'centralauth-admin-merge'              => 'Liitä valitut',
	'centralauth-admin-bad-input'          => 'Kelpaamaton liitosvalinta',
	'centralauth-admin-none-selected'      => 'Et valinnut tunnuksia, joita haluat muokata.',
	'centralauth-admin-delete-title'       => 'Poista käyttäjätunnus',
	'centralauth-admin-delete-description' => 'Globaalin käyttäjätunnuksen poistaminen hävittää kaikki globaalit asetukset, irroittaa kaikki paikalliset käyttäjätunnukset, ja siten globaalin käyttäjänimen voi vapaasti ottaa toinen käyttäjä. Kaikki paikalliset käyttäjätunnukset pysyvät olemassa. Paikallisilla käyttäjätunnuksilla, jotka luotiin ennen yhdistämistä, palautetaan yhdistämistä edeltäviin arvoihinsa.',
	'centralauth-prefs-status'             => 'Päätunnuksen tila',
	'centralauth-prefs-not-managed'        => 'Yhdistämätön tunnus',
	'centralauth-prefs-unattached'         => 'Varmistamaton',
	'centralauth-prefs-complete'           => 'Kaikki kunnossa',
	'centralauth-prefs-migration'          => 'Liittäminen kesken',
	'centralauth-prefs-count-attached'     => 'Tunnuksesi on käytössä $1 {{plural:$1|wikissä}}.',
	'centralauth-prefs-count-unattached'   => 'Liittämättömiä tunnuksia on $1 {{plural:$1|wikissä}}.',
	'centralauth-prefs-detail-unattached'  => 'Tätä sivua ei ole varmistettu päätunnukseen kuuluvaksi.',
	'centralauth-prefs-manage'             => 'Päätunnuksen hallinta',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Käyttäjätunnusta $1 ei nimetä uudelleen, koska se on yhdistetty käyttäjätunnus.</div>',
	'centralauth-account-exists'           => 'Tunnusta ei voi luoda: Pyydetty käyttäjänimi on jo käytössä yhdistetyssä sisäänkirjautumisjärjestelmässä.',
);

/** French (Français)
 * @author Grondin
 * @author Guillom
 * @author Sherbrooke
 * @author Urhixidur
 * @author Seb35
 * @author Siebrand
 */
$messages['fr'] = array(
	'mergeaccount'                         => 'Statut de la fusion des comptes utilisateur',
	'centralauth-desc'                     => '[[Special:MergeAccount|Fusionner les comptes utilisateur]] des wikis de la Wikimedia Foundation',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Fusionne plusieurs comptes]] pour l’identification unique',
	'centralauth-merge-denied'             => "Désolé, vous n'avez pas les droits pour accéder à cette page.",
	'centralauth-merge-notlogged'          => 'Merci de bien vouloir <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} vous connecter]</span> pour vérifier si vos comptes ont bien été fusionnés.',
	'centralauth-merge-welcome'            => "'''Vos comptes utilisateur n’ont pas encore été transférés vers le système de compte unique de Wikimedia.'''
Si vous choisissez de fusionner vos comptes, vous pourrez utiliser le même nom d’utilisateur et le même mot de passe sur tous les projets Wikimedia dans toutes les langues.
Il sera ainsi plus facile de travailler sur plusieurs projets et notamment d’importer des images sur [http://commons.wikimedia.org/ Wikimedia Commons] ; cela évitera aussi la confusion survenant quand deux personnes utilisent le même nom d’utilisateur sur deux projets différents.

Si vous avez déjà le même nom d’utilisateur sur tous les projets, il ne devrait pas y avoir de problème. Si une autre personne a le même nom d’utilisateur que vous sur un autre projet, vous aurez l’occasion d’entrer en contact avec cette personne ou avec un administrateur plus tard.",
	'centralauth-merge-step1-title'        => 'Commencer le processus de fusion des comptes',
	'centralauth-merge-step1-detail'       => 'Nous allons comparer votre adresse courriel et votre mot de passe avec ceux des comptes homonymes sur les autes wikis, et vérifier qu’ils correspondent. Aucun changement ne sera effectué tant que vous n’aurez pas donné votre accord.',
	'centralauth-merge-step1-submit'       => 'Confirmer les informations',
	'centralauth-merge-step2-title'        => 'Inclure d’autres comptes',
	'centralauth-merge-step2-detail'       => 'Certains des comptes n’ont pas pu être rattachés automatiquement à votre compte principal. Si ces comptes vous appartiennent, veuillez confirmer qu’ils vous appartiennent en entrant le mot de passe correspondant.',
	'centralauth-merge-step2-submit'       => 'Confirmer les informations',
	'centralauth-merge-dryrun-complete'    => 'Tous les comptes existant peuvent être unifiés automatiquement !

Cependant, aucun changement n’a été fait pour vos comptes.',
	'centralauth-merge-dryrun-incomplete'  => 'Vous avez décidé de continuer, mais plusieurs comptes n’ont pas pu être vérifiés automatiquement et ne seront pas migrés immédiatement. Vous pourrez les fusionner plus tard.

Cependant, aucun changement n’a été fait pour vos comptes.',
	'centralauth-merge-dryrun-or'          => "'''ou'''",
	'centralauth-merge-dryrun-home'        => 'Le système de migration n’a pas pu confirmer que vous être le propriétaire du compte du wiki principal en ce qui concerne votre nom d’utilisateur.

Un autre wiki a été déterminé comme compte principal pour votre nom d’utilisateur ; suivez le lien ci-dessous et connectez-vous pour terminer la migration du compte.',
	'centralauth-merge-step3-title'        => 'Créer un compte unique',
	'centralauth-merge-step3-detail'       => 'Vous êtes maintenant prêt à créer votre compte unique, comprenant les wikis suivants :',
	'centralauth-merge-step3-submit'       => 'Fusionner les comptes',
	'centralauth-complete'                 => 'Fusion des comptes terminée !',
	'centralauth-incomplete'               => 'Fusion des comptes non terminée !',
	'centralauth-complete-text'            => 'Vous pouvez maintenant vous connecter à n’importe quel projet Wikimedia sans avoir à créer un nouveau compte ; le même nom d’utilisateur et le même mot de passe fonctionnent sur Wikipédia, Wiktionary, Wikibooks et leurs projets frères, dans toutes les langues.',
	'centralauth-incomplete-text'          => 'Une fois vos comptes fusionnés, vous pourrez vous connecter sur n’importe quel projet Wikimedia sans avoir à créer un nouveau compte ; le même nom d’utilisateur et mot de passe fonctionneront sur Wikipédia, Wiktionary, Wikibooks et leurs projets frères, dans toutes les langues.',
	'centralauth-not-owner-text'           => 'Le compte utilisateur « $1 » a été automatiquement assigné au propriétaire du compte sur $2.

Si c’est vous, vous pourrez terminer le processus d’unification de comptes en entrant ici le mot de passe principal pour ce compte :',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Mode de démonstration seulement</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'La fusion des comptes est actuellement en mode de démonstration ou de test, on ne peut donc pas encore réellement fusionner de comptes. Désolé !',
	'centralauth-readmore-text'            => ":''[[w:fr:Wikipédia:Login unique|En savoir plus sur le '''compte unique''']]''",
	'centralauth-list-home-title'          => 'Projet principal',
	'centralauth-list-home-dryrun'         => 'Le mot de passe et l’adresse courriel du projet principal ci-dessous seront utilisés pour votre compte unifié. Vous pourrez modifier votre projet principal par la suite.',
	'centralauth-list-attached-title'      => 'Comptes rattachés',
	'centralauth-list-attached'            => 'Les comptes utilisateur nommés « $1 » ont été rattachés pour les projets suivants :',
	'centralauth-list-attached-dryrun'     => 'Le compte nommé « $1 » sur chacun des sites suivants sera automatiquement rattaché au compte unique :',
	'centralauth-list-unattached-title'    => 'Comptes non rattachés',
	'centralauth-list-unattached'          => 'Les comptes utilisateur nommés « $1 » sur les sites suivants ne peuvent pas être rattachés automatiquement ; ils ont probablement un mot de passe différent de celui de votre compte principal :',
	'centralauth-foreign-link'             => 'Utilisateur $1 sur $2',
	'centralauth-merge-method-primary'     => 'wiki principal',
	'centralauth-merge-method-empty'       => 'aucune contribution',
	'centralauth-merge-method-mail'        => 'confirmé par courriel',
	'centralauth-merge-method-password'    => 'confirmé par mot de passe',
	'centralauth-merge-method-admin'       => 'compte administrateur fusionné',
	'centralauth-merge-method-new'         => 'nouveau compte',
	'centralauth-merge-method-login'       => 'confirmé à la connexion',
	'centralauth-finish-title'             => 'Terminer la fusion',
	'centralauth-finish-text'              => 'Si ces comptes vous appartiennent, vous pouvez terminer leur fusion en tapant leurs mots de passe ci-dessous :',
	'centralauth-finish-password'          => 'Mot de passe :',
	'centralauth-finish-login'             => 'Compte utilisateur :',
	'centralauth-finish-send-confirmation' => 'Envoyer le mot de passe par courriel',
	'centralauth-finish-problems'          => 'En cas de problème ou si vous ne possédez pas ces autres comptes, voyez [[meta:Help:Unified login problems|Problèmes]] (en anglais)...',
	'centralauth-finish-noconfirms'        => 'Aucun comptne n’a été confirmé en utilisant ce mot de passe.',
	'centralauth-finish-incomplete'        => "Plusieurs comptes ont été fusionnés en utilisant ce mot de passe. D'autres comptes n’ont, cependant, pas été confirmés.",
	'centralauth-merge-attempt'            => "'''Vérification du mot de passe fourni pour les comptes non réunis...'''",
	'centralauth-attach-list-attached'     => 'Le compte unique nommé "$1" inclut les comptes suivants :',
	'centralauth-attach-title'             => 'Confirmer le compte',
	'centralauth-attach-text'              => 'Ce compte n’a pas encore été transféré vers un compte unique. Si le compte global vous appartient également, vous pouvez fusionner ces comptes en tapant le mot de passe du compte global :',
	'centralauth-attach-submit'            => 'Fusionner le compte',
	'centralauth-attach-success'           => 'Le compte a été transféré vers le compte unique.',
	'centralauth'                          => 'Administration des comptes uniques',
	'centralauth-admin-manage'             => 'Gérer les données utilisateur',
	'centralauth-admin-username'           => 'Nom d’utilisateur :',
	'centralauth-admin-lookup'             => 'Voir ou modifier les données utilisateur',
	'centralauth-admin-permission'         => 'Seuls les stewards peuvent fusionner les comptes d’autres personnes à leur place.',
	'centralauth-admin-no-unified'         => 'Aucun compte unifié pour ce nom d’utilisateur.',
	'centralauth-admin-info-id'            => 'Numéro d’utilisateur :',
	'centralauth-admin-info-registered'    => 'Enregistré :',
	'centralauth-admin-info-locked'        => 'verrouillé :',
	'centralauth-admin-info-hidden'        => 'Caché :',
	'centralauth-admin-yes'                => 'oui',
	'centralauth-admin-no'                 => 'non',
	'centralauth-admin-attached'           => 'Comptes entièrement fusionnés',
	'centralauth-admin-unattached'         => 'Comptes non rattachés',
	'centralauth-admin-no-unattached'      => 'Il ne reste aucun compte non fusionné.',
	'centralauth-admin-list-localwiki'     => 'Wiki local',
	'centralauth-admin-list-attached-on'   => 'Rattachés sur',
	'centralauth-admin-list-method'        => 'Méthode',
	'centralauth-admin-unmerge'            => 'Séparer la sélection',
	'centralauth-admin-merge'              => 'Fusionner la sélection',
	'centralauth-admin-bad-input'          => 'Sélection invalide',
	'centralauth-admin-none-selected'      => 'Aucun compte sélectionné.',
	'centralauth-admin-already-unmerged'   => 'Sauter $1, déjà défusionné',
	'centralauth-admin-unmerge-success'    => '$1 {{PLURAL:$2|compte|comptes}} défusionnés avec succès',
	'centralauth-admin-delete-title'       => 'Supprimer le compte',
	'centralauth-admin-delete-description' => "La suppression du compte global détruiera toutes les références globales, détachera l'ensemble des comptes locaux, et laissera le nom global disponible pour tout autre utilisateur. Les mots de passe pour les comptes créés localement, avant la fusion, annuleront toutes leurs valeurs avant la fusion.",
	'centralauth-admin-delete-button'      => 'Supprimer ce compte',
	'centralauth-admin-delete-success'     => 'Le compte global pour « <nowiki>$1</nowiki> » a été supprimé avec succès',
	'centralauth-admin-nonexistent'        => "Il n'existe aucun compte global pour « <nowiki>$1</nowiki> »",
	'centralauth-admin-delete-nonexistent' => 'Erreur : le compte global « <nowiki>$1</nowiki> » n’existe pas.',
	'centralauth-token-mismatch'           => 'Désolé, nous ne pouvons soumettre votre formulaire à cause de la perte des données de votre session.',
	'centralauth-admin-lock-title'         => 'Verrouiller le compte',
	'centralauth-admin-lock-description'   => 'Le verrouillage du compte rendra impossible toute connexion sous son nom dans n’importe quel wiki.',
	'centralauth-admin-lock-button'        => 'Verrouiller ce compte',
	'centralauth-admin-lock-success'       => 'Verrouillage réussi du compte global « <nowiki>$1</nowiki> »',
	'centralauth-admin-lock-nonexistent'   => 'Erreur : le compte global « <nowiki>$1</nowiki> » n’existe pas.',
	'centralauth-admin-unlock-title'       => 'Déverrouiller le compte',
	'centralauth-admin-unlock-description' => 'Le déverrouillage du compte rendra possible toute connexion sous son nom.',
	'centralauth-admin-unlock-button'      => 'Déverrouiller ce compte',
	'centralauth-admin-unlock-success'     => 'Déverrouillage réussi du compte global « <nowiki>$1</nowiki> »',
	'centralauth-admin-unlock-nonexistent' => 'Erreur : le compte global « <nowiki>$1</nowiki> » n’existe pas.',
	'centralauth-admin-reason'             => 'Motif :',
	'centralauth-seconds-ago'              => 'depuis $1 {{plural:$1|seconde|secondes}}',
	'centralauth-minutes-ago'              => 'depuis $1 {{plural:$1|minute|minutes}}',
	'centralauth-hours-ago'                => 'depuis $1 {{PLURAL:$1|heure|heures}}',
	'centralauth-days-ago'                 => 'depuis $1 {{plural:$1|jour|jours}}',
	'centralauth-months-ago'               => 'depuis $1 mois',
	'centralauth-years-ago'                => 'depuis $1 {{plural:$1|année|années}}',
	'centralauth-prefs-status'             => 'Statut du compte unique :',
	'centralauth-prefs-not-managed'        => 'Pas de compte unique',
	'centralauth-prefs-unattached'         => 'Non confirmé',
	'centralauth-prefs-complete'           => 'Tout va bien !',
	'centralauth-prefs-migration'          => 'En transfert',
	'centralauth-prefs-count-attached'     => 'Votre compte est actif sur $1 {{plural:$1|projet|projets}}.',
	'centralauth-prefs-count-unattached'   => 'Il y a $1 {{plural:$1|projet sur lequel|projets sur lesquels}} il existe un compte non confirmé avec le même nom d’utilisateur que le vôtre.',
	'centralauth-prefs-detail-unattached'  => 'Votre compte sur ce projet n’a pas pu être rattaché au compte unique.',
	'centralauth-prefs-manage'             => 'Gérez votre compte global',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Impossible de renommer le compte utilisateur $1 localement : cet utilisateur a maintenant un compte unique.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Impossible de renommer $2 comme nom d’utilisateur lequel est réservé pour un compte global.</div>',
	'centralauth-invalid-wiki'             => 'Aucune base de donnée wiki : $1',
	'centralauth-account-exists'           => 'Impossible de créer le compte : le nom d’utilisateur demandé est déjà actif dans le système des comptes unifiés.',
	'centralauth-log-name'                 => 'Journal de la gestion des comptes globaux',
	'centralauth-log-header'               => 'Ce journal contient les opérations concernant les comptes globaux : suppressions, verrouillages et déverrouillages.',
	'centralauth-log-entry-delete'         => 'a supprimé le compte global « <nowiki>$1</nowiki> »',
	'centralauth-log-entry-lock'           => 'a verrouillé le compte global « <nowiki>$1</nowiki> »',
	'centralauth-log-entry-unlock'         => 'a déverrouillé le compte global « <nowiki>$1</nowiki> »',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 * @author Siebrand
 */
$messages['frp'] = array(
	'mergeaccount'                         => 'Statut de la fusion des comptos utilisator',
	'centralauth-desc'                     => 'Fusione los comptos utilisator de projèts de la Wikimedia Foundation.',
	'centralauth-merge-notlogged'          => 'Marci de franc volêr vos <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} conèctar]</span> por controlar se voutros comptos ont bien étâ fusionâs.',
	'centralauth-merge-welcome'            => "'''Voutros comptos utilisator ont p’oncor étâ migrâs vers lo sistèmo de compto unico de Wikimedia.'''

Se vos chouèsésséd/cièrde de fâre migrar voutros comptos, vos porréd utilisar lo mémo nom d’utilisator et lo mémo mot de pâssa sur tôs los projèts Wikimedia dens totes les lengoues.
D’ense, lo travâly entèrprojèts serat facilitâ coment, per ègzemplo, l’impôrt d’émâges dessus [http://commons.wikimedia.org/ Wikimedia Commons] ; cen èviterat asse-ben la confusion arrevent quand doves gens utilisont lo mémo nom d’utilisator sur doux projèts difèrents.

Se vos avéd ja lo mémo nom d’utilisator sur tôs los projèts, devrêt pas y avêr de problèmo. S’una ôtra pèrsona at lo mémo nom d’utilisator que vos sur un ôtro projèt, vos aréd l’ocasion de vos veriér vers cela pèrsona ou ben vers un administrator ples târd.",
	'centralauth-merge-step1-title'        => 'Comenciér lo procès de fusion des comptos',
	'centralauth-merge-step1-detail'       => 'Nos alens comparar voutra adrèce de mèl et voutron mot de pâssa avouéc celos des comptos homonimos sur los ôtros vouiquis, et controlar que corrèspondont. Nion changement serat fêt tant que vos aréd pas balyê voutron acôrd.',
	'centralauth-merge-step1-submit'       => 'Confirmar les enformacions',
	'centralauth-merge-step2-title'        => 'Encllure d’ôtros comptos',
	'centralauth-merge-step2-detail'       => 'Cèrtins des comptos ont pas possu étre rapondus ôtomaticament a voutron compto principâl. Se celos comptos sont a vos, volyéd confirmar que sont a vos en entrent lo mot de pâssa corrèspondent.',
	'centralauth-merge-step2-submit'       => 'Confirmar les enformacions',
	'centralauth-merge-step3-title'        => 'Crèacion du compto unico',
	'centralauth-merge-step3-detail'       => 'Orendrêt, vos éte prèst a crèar voutron compto unico, compregnent los vouiquis siuvents :',
	'centralauth-merge-step3-submit'       => 'Fusionar los comptos',
	'centralauth-complete'                 => 'Fusion des comptos chavonâ !',
	'centralauth-incomplete'               => 'Fusion des comptos pas chavonâ !',
	'centralauth-complete-text'            => 'Orendrêt, vos pouede vos conèctar a quint que seye lo projèt Wikimedia sen avêr a crèar un novél compto ; lo mémo nom d’utilisator et lo mémo mot de pâssa fonccioneront dessus Vouiquipèdia, Vouiccionèro, Vouiquilévros et lors projèts serors, et cen por totes les lengoues.',
	'centralauth-incomplete-text'          => 'Un côp voutros comptos fusionâs, vos porréd vos conèctar a quint que seye lo projèt Wikimedia sen avêr a crèar un novél compto ; lo mémo nom d’utilisator et lo mémo mot de pâssa fonccioneront dessus Vouiquipèdia, Vouiccionèro, Vouiquilévros et lors projèts serors, et cen por totes les lengoues.',
	'centralauth-not-owner-text'           => 'Lo compto utilisator « $1 » at étâ ôtomaticament assignê u propriètèro du compto dessus $2.

S’o est vos, vos porréd chavonar lo procès de fusion des comptos en buchient lo mot de pâssa mêtre por cél compto dessus :',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Môdo de dèmonstracion solament</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'La fusion des comptos est ora en môdo de dèmonstracion ou d’èprôva, pôvont vêr p’oncor verément fusionar de comptos. Dèsolâ !',
	'centralauth-readmore-text'            => ":''[[w:frp:Vouiquipèdia:Login unico|Nen savêr de ples sur lo '''compto unico''']]...''",
	'centralauth-list-home-title'          => 'Projèt principâl',
	'centralauth-list-home-dryrun'         => 'Lo mot de pâssa et l’adrèce de mèl du projèt principâl ce-desot seront utilisâs por voutron compto unico.
Vos porréd modifiar voutron projèt principâl ples târd.',
	'centralauth-list-attached-title'      => 'Comptos rapondus',
	'centralauth-list-attached'            => 'Los comptos utilisator apelâs « $1 » ont étâ rapondus por los projèts siuvents :',
	'centralauth-list-attached-dryrun'     => 'Lo compto apelâ « $1 » sur châcun des setos siuvents serat ôtomaticament rapondu u compto unico :',
	'centralauth-list-unattached-title'    => 'Comptos pas rapondus',
	'centralauth-list-unattached'          => 'Los comptos utilisator apelâs « $1 » sur los setos siuvents pôvont pas étre rapondus ôtomaticament ; ils ont probâblament un mot de pâssa difèrent de voutron compto mêtre :',
	'centralauth-foreign-link'             => 'Utilisator $1 dessus $2',
	'centralauth-finish-title'             => 'Chavonar la fusion des comptos',
	'centralauth-finish-text'              => 'Se cetos comptos sont a vos, vos pouede chavonar lor fusion en buchient lors mots de pâssa ce-desot :',
	'centralauth-finish-password'          => 'Mot de pâssa :',
	'centralauth-finish-login'             => 'Compto utilisator :',
	'centralauth-finish-send-confirmation' => 'Emmandar lo mot de pâssa per mèl',
	'centralauth-finish-problems'          => 'En câs de problèmo ou ben se vos avéd pas cetos ôtros comptos, vêde [[meta:Help:Unified login problems|<span title="« Help:Unified login problems » : pâge en anglès" style="text-decoration:none">Problèmos</span>]]...',
	'centralauth-merge-attempt'            => "'''Contrôlo du mot de pâssa forni por los comptos pas rapondus...'''",
	'centralauth-attach-list-attached'     => 'Lo compto unico apelâ « $1 » encllut los comptos siuvents :',
	'centralauth-attach-title'             => 'Confirmar lo compto',
	'centralauth-attach-text'              => 'Ceti compto at p’oncor étâ migrâ en un compto unico. Se lo compto unico est asse-ben a vos, vos pouede fusionar ceti compto se vos buchiéd lo mot de pâssa du compto unico :',
	'centralauth-attach-submit'            => 'Migrar los comptos',
	'centralauth-attach-success'           => 'Lo compto at étâ migrâ en un compto unico.',
	'centralauth'                          => 'Administracion des comptos unicos',
	'centralauth-admin-manage'             => 'G·èrar les balyês utilisator',
	'centralauth-admin-username'           => 'Nom d’utilisator :',
	'centralauth-admin-lookup'             => 'Vêre ou modifiar les balyês utilisator',
	'centralauth-admin-permission'         => 'Solèts los stevârds pôvont rapondre los comptos d’ôtres gens a lor place.',
	'centralauth-admin-unmerge'            => 'Sèparar la sèlèccion',
	'centralauth-admin-merge'              => 'Fusionar la sèlèccion',
	'centralauth-admin-bad-input'          => 'Sèlèccion envalida',
	'centralauth-admin-none-selected'      => 'Nion compto sèlèccionâ.',
	'centralauth-prefs-status'             => 'Statut du compto unico :',
	'centralauth-prefs-not-managed'        => 'Pas de compto unico',
	'centralauth-prefs-unattached'         => 'Pas confirmâ',
	'centralauth-prefs-complete'           => 'Tot vat bien !',
	'centralauth-prefs-migration'          => 'En migracion',
	'centralauth-prefs-count-attached'     => 'Voutron compto est actif dessus $1 projèts.',
	'centralauth-prefs-count-unattached'   => 'Des comptos pas confirmâs avouéc lo mémo nom d’utilisator que lo voutro sè trovont dessus $1 projèts.',
	'centralauth-prefs-detail-unattached'  => 'Voutron compto sur ceti projèt at pas possu étre rapondu u compto unico.',
	'centralauth-prefs-manage'             => 'G·èrâd voutron compto unico',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Empossiblo de renomar lo compto utilisator $1 localament : ceti utilisator at ora un compto unico.</div>',
);

/** Friulian (Furlan)
 * @author Klenje
 */
$messages['fur'] = array(
	'mergeaccount' => 'Stât dal procès di unificazion des identitâts dai utents',
);

/** Galician (Galego)
 * @author Xosé
 * @author Toliño
 * @author Kaustubh
 * @author Alma
 * @author Siebrand
 */
$messages['gl'] = array(
	'mergeaccount'                         => 'Estado da unificación do rexistro',
	'centralauth-desc'                     => '[[Special:MergeAccount|Fusionar contas]] entre wikis da Fundación Wikimedia',
	'centralauth-merge-denied'             => 'Sentímolo, pero non ten permiso para acceder a esta páxina.',
	'centralauth-merge-notlogged'          => 'Por favor, <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} rexístrese]</span> para comprobar se as súas contas se  unificaron completamente.',
	'centralauth-merge-welcome'            => "'''A súa conta de usuario aínda non se pasou ao sistema de rexistro unificado de Wikimedia.'''

Se escolle unificar as súas contas, poderá empregar o mesmo nome de usuario e contrasinal para se rexistrar en todos os wikis dos proxectos de Wikimedia en todas as linguas disponíbeis.
Isto fai que sexa máis doado traballar con proxectos compartidos, como enviar a [http://commons.wikimedia.org/ Wikimedia Commons], e evita a confusión ou conflito que pode resultar se dúas persoas escollen o mesmo nome de usuario en proxectos diferentes.",
	'centralauth-merge-step1-title'        => 'Comezar a unificación do rexistro',
	'centralauth-merge-step1-detail'       => 'O seu contrasinal e os enderezos de correo electrónico rexistrados comprobaranse nas contas doutros wikis para confirmar que coinciden. Non se realizarán cambios até que vostede confirme que todo está ben.',
	'centralauth-merge-step1-submit'       => 'Confirme a información de rexistro',
	'centralauth-merge-step2-title'        => 'Confirmar máis contas',
	'centralauth-merge-step2-detail'       => 'Algunhas contas non se puideron comprobar automaticamente no wiki sinalado. Se estas contas lle pertencen, pode confirmar que son súas introducindo o contrasinal que usa nelas.',
	'centralauth-merge-step2-submit'       => 'Confirme a información de rexistro',
	'centralauth-merge-dryrun-or'          => "'''ou'''",
	'centralauth-merge-step3-title'        => 'Crear unha conta unificada',
	'centralauth-merge-step3-detail'       => 'Xa pode crear a súa conta unificada cos seguintes wikis relacionados:',
	'centralauth-merge-step3-submit'       => 'Unificar contas',
	'centralauth-complete'                 => 'Completouse a unificación do rexistro!',
	'centralauth-incomplete'               => 'A unificación do rexistro non está completa!',
	'centralauth-complete-text'            => 'Agora pode rexistrarse en calquera wiki da Wikimedia sen crear unha conta nova;
os mesmos nome de usuario e contrasinal valerán en Wikipedia, Wiktionary, Wikibooks e os seus proxectos irmáns en todas as linguas.',
	'centralauth-incomplete-text'          => 'Unha vez se unificar o rexistro, poderá rexistrarse en calquer sitio wiki de Wikimedia sen crear unha conta nova; os mesmos nome de usuario e contrasinal valerán en Wikipedia, Wiktionary, Wikibooks e os seus proxectos irmáns en todas as linguas.',
	'centralauth-not-owner-text'           => 'O nome de usuario "$1" asignouse automaticamente ao propietario da conta en $2.

Se se trata de vostede, pode completar o proceso de unificación de rexistro simplemente con escribir o contrasinal mestre desa conta aquí:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Só modo demostración</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'A unificación de contas é actualmente só un modo de demostración / depuración, polo que as operacións de unificación non están activadas. Sentímolo!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Lea máis acerca do '''rexistro unificado''']]...''",
	'centralauth-list-home-title'          => 'Wiki primario',
	'centralauth-list-home-dryrun'         => 'Usaranse o contrasinal e enderezo de correo electrónico indicados neste wiki para a súa conta unificada.
Poderá mudar o seu wiki primario máis tarde.',
	'centralauth-list-attached-title'      => 'Contas relacionadas',
	'centralauth-list-attached'            => 'A conta chamada "$1" en cada un dos sitios seguintes relacionouse automaticamente coa conta unificada:',
	'centralauth-list-attached-dryrun'     => 'A conta chamada "$1" en cada un dos sitios seguintes relacionarase automaticamente coa conta unificada:',
	'centralauth-list-unattached-title'    => 'Contas non relacionadas',
	'centralauth-list-unattached'          => 'Non se puido confirmar que a conta "$1" lle pertenza a vostede nos sitios seguintes; o máis probábel é que teñan un contrasinal diferente do da súa conta primaria:',
	'centralauth-foreign-link'             => 'Usuario $1 en $2',
	'centralauth-merge-method-empty'       => 'ningunha contribución',
	'centralauth-merge-method-mail'        => 'confirmado por correo electrónico',
	'centralauth-merge-method-password'    => 'confirmado por contrasinal',
	'centralauth-merge-method-new'         => 'nova conta',
	'centralauth-finish-title'             => 'Finalizar a unificación',
	'centralauth-finish-text'              => 'Se estas contas lle pertencen a vostede, pode finalizar o proceso de unificación do rexistro simplemente con introducir os contrasinais das outras contas aquí:',
	'centralauth-finish-password'          => 'Contrasinal:',
	'centralauth-finish-login'             => 'Rexistro',
	'centralauth-finish-send-confirmation' => 'Enviádeme un contrasinal novo por correo electrónico',
	'centralauth-finish-problems'          => 'Ten problemas ou non é o dono destoutras contas? [[meta:Help:Unified login problems|Como atopar axuda]]...',
	'centralauth-finish-noconfirms'        => 'Ningunha conta pode ser confirmada usando ese contrasinal.',
	'centralauth-finish-incomplete'        => 'Varias contas de usuario foron fusionadas usando este contrasinal.
Outras contas aínda non están confirmadas.',
	'centralauth-merge-attempt'            => "'''A contrastar o contrasinal fornecido coas demais contas aínda sen unificar...'''",
	'centralauth-attach-list-attached'     => 'A conta unificada chamada "$1" inclúe as contas seguintes:',
	'centralauth-attach-title'             => 'Confirmar conta',
	'centralauth-attach-text'              => 'Esta conta aínda non se pasou á conta unificada. Se a conta global tamén é súa, pode unificar esta conta se escribe o contrasinal da conta global:',
	'centralauth-attach-submit'            => 'Unificar conta',
	'centralauth-attach-success'           => 'A conta pasou á conta unificada.',
	'centralauth'                          => 'Administración do rexistro unificado',
	'centralauth-admin-manage'             => 'Xestionar os datos de usuario',
	'centralauth-admin-username'           => 'Nome de usuario:',
	'centralauth-admin-lookup'             => 'Ver ou editar os datos de usuario',
	'centralauth-admin-permission'         => 'Só os stewards poden unificar as contas doutra xente.',
	'centralauth-admin-no-unified'         => 'Non hai contas de usuario unificadas para este nome de usuario.',
	'centralauth-admin-info-id'            => 'ID do usuario:',
	'centralauth-admin-yes'                => 'si',
	'centralauth-admin-no'                 => 'non',
	'centralauth-admin-list-localwiki'     => 'Wiki local',
	'centralauth-admin-list-method'        => 'Método',
	'centralauth-admin-unmerge'            => 'Seleccionouse des-unificar',
	'centralauth-admin-merge'              => 'Seleccionouse unificar',
	'centralauth-admin-bad-input'          => 'A selección de unificación non é válida',
	'centralauth-admin-none-selected'      => 'Non se seleccionaron contas para modificar.',
	'centralauth-admin-delete-title'       => 'Eliminar unha conta de usuario',
	'centralauth-admin-delete-button'      => 'Eliminar a conta de usuario',
	'centralauth-admin-delete-success'     => 'O borrado da conta global de "<nowiki>$1</nowiki>" foi completado con éxito',
	'centralauth-admin-nonexistent'        => 'Non hai ningunha conta global de "<nowiki>$1</nowiki>"',
	'centralauth-admin-delete-nonexistent' => 'Erro: a conta global "<nowiki>$1</nowiki>" non existe.',
	'centralauth-admin-lock-title'         => 'Bloquear unha conta de usuario',
	'centralauth-admin-lock-description'   => 'Se bloquea unha conta de usuario fará que sexa imposible acceder ao sistema con esta conta en calquera wiki.',
	'centralauth-admin-lock-button'        => 'Bloquear a conta',
	'centralauth-admin-lock-success'       => 'A conta global de "<nowiki>$1</nowiki>" foi bloqueada con éxito',
	'centralauth-admin-lock-nonexistent'   => 'Erro: a conta global "<nowiki>$1</nowiki>" non existe.',
	'centralauth-admin-unlock-title'       => 'Desbloquear unha conta de usuario',
	'centralauth-admin-unlock-description' => 'Se desbloquea unha conta de usuario fará que sexa posible acceder ao sistema con esta conta.',
	'centralauth-admin-unlock-button'      => 'Desbloquear a conta',
	'centralauth-admin-unlock-success'     => 'A conta de usuario global de "<nowiki>$1</nowiki>" foi desbloqueada con éxito',
	'centralauth-admin-unlock-nonexistent' => 'Erro: a conta global "<nowiki>$1</nowiki>" non existe.',
	'centralauth-admin-reason'             => 'Motivo:',
	'centralauth-seconds-ago'              => 'Hai {{PLURAL:$1|un segundo|$1 segundos}}',
	'centralauth-minutes-ago'              => 'Hai {{PLURAL:$1|un minuto|$1 minutos}}',
	'centralauth-hours-ago'                => 'Hai {{PLURAL:$1|unha hora|$1 horas}}',
	'centralauth-days-ago'                 => 'Hai {{PLURAL:$1|un día|$1 días}}',
	'centralauth-months-ago'               => 'Hai {{PLURAL:$1|un mes|$1 meses}}',
	'centralauth-years-ago'                => 'Hai {{PLURAL:$1|un ano|$1 anos}}',
	'centralauth-prefs-status'             => 'Estado da conta global:',
	'centralauth-prefs-not-managed'        => 'Non está a usar a conta unificada',
	'centralauth-prefs-unattached'         => 'Sen confirmar',
	'centralauth-prefs-complete'           => 'Todo perfecto!',
	'centralauth-prefs-migration'          => 'En proceso de unificación',
	'centralauth-prefs-count-attached'     => 'A súa conta está activada en $1 sitios de proxectos.',
	'centralauth-prefs-count-unattached'   => 'Fican contas sen confirmar co seu nome en $1 proxectos.',
	'centralauth-prefs-detail-unattached'  => 'Non se confirmou que o sitio do proxecto pertenza á conta global.',
	'centralauth-prefs-manage'             => 'Xestionar a súa conta global',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Non se lle pode mudar o nome ao usuario $1 localmente xa que este nome de usuario pasou ao sistema de rexistro unificado.</div>',
	'centralauth-log-entry-delete'         => 'eliminou a conta de usuario global de "<nowiki>$1</nowiki>"',
	'centralauth-log-entry-lock'           => 'bloqueou a conta de usuario global de "<nowiki>$1</nowiki>"',
	'centralauth-log-entry-unlock'         => 'desbloqueou a conta de usuario global de "<nowiki>$1</nowiki>"',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author AndreasJS
 */
$messages['grc'] = array(
	'centralauth-finish-login' => 'συνδεῖσθαι',
);

$messages['he'] = array(
	# When not logged in...
	'mergeaccount'                  => 'מצב מיזוג החשבונות',
	'centralauth-desc'              => '[[Special:MergeAccount|מיזוג חשבונות]] מאתרי קרן ויקימדיה השונים',
	'centralauth-mergeaccount-desc' => '[[Special:MergeAccount|מיזוג מספר חשבונות]] עבור חשבון המשתמש המאוחד',
	'centralauth-merge-denied'      => 'מצטערים, אין לך הרשאה להשתמש בדף זה.',
	'centralauth-merge-notlogged'   => 'אנא <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} היכנסו לחשבון]</span> כדי לבדוק האם חשבונותיכם מוזגו במלואם.',
	'centralauth-merge-welcome'     => "'''חשבון המשתמש שלכם עדיין לא התווסף למערכת החשבונות הממוזגים של ויקימדיה.'''

אם תבחרו להוסיף את החשבונות שלכם, תוכלו להשתמש בשם משתמש וסיסמה זהים בכל מיזמי קרן ויקימדיה ובכל השפות. אפשרות זו תקל עליכם לעבוד במיזמים משותפים כגון העלאות ל[http://commons.wikimedia.org/ וויקישיתוף], וימנע בלבול או סכסוך שעלול להיגרם כתוצאה מכך ששני אנשים יבחרו שם משתמש זהה בשני מיזמים שונים.

אם מישהו כבר בחר את שם המשתמש שלכם באתר אחר, זה לא אמור להפריע להם, אבל יאפשר לכם לעבוד איתם או עם מנהל מערכת מאוחר יותר.",

	'centralauth-merge-step1-title'  => 'תחילת מיזוג החשבונות',
	'centralauth-merge-step1-detail' => 'סיסמתכם וכתובת הדוא"ל הרשומה שלכם יושוו עם החשבונות באתרים האחרים כדי לוודא שהם זהים לאלה שלכם.
לא יבוצעו שינויים עד שתאשרו אותם.',
	'centralauth-merge-step1-submit' => 'אישור של מידע הכניסה',

	'centralauth-merge-step2-title'  => 'אישור חשבונות נוספים',
	'centralauth-merge-step2-detail' => "לא ניתן היה לאשר אוטומטית שמספר חשבונות זהים לחשבון הראשי.
אם החשבונות הללו שייכים לכם, תוכלו לאשר זאת באמצעות כתיבת סיסמאותיהם.",
	'centralauth-merge-step2-submit' => 'אישור של מידע הכניסה',

	# Dry run messages
	'centralauth-merge-dryrun-complete'   => 'ניתן למזג אוטומטית את כל החשבונות הקיימים!

לא בוצעו עדיין שינויים בחשבונות המשתמש שלכם.',
	'centralauth-merge-dryrun-incomplete' => 'מספר חשבונות לא עברו את הבדיקה האוטומטית ולא ימוזגו מיד. אתם יכולים להמשיך במיזוג, ותוכלו למזג את החשבונות האלה מאוחר יותר.

לא בוצעו עדיין שינויים בחשבונות המשתמש שלכם.',
	'centralauth-merge-dryrun-or'         => "'''או'''",
	'centralauth-merge-dryrun-home'       => 'מערכת המיזוג לא הצליחה לוודא שאתם בעלי החשבון הראשי בשם המשתמש הזה.

אתר אחר זוהה כחשבון הראשי לשם משתמש זה; אנא לחצו על הקישור להלן והיכנסו לחשבון שם כדי לסיים את מיזוג החשבונות שלכם.',

	'centralauth-merge-step3-title'  => 'יצירת החשבון הממוזג',
	'centralauth-merge-step3-detail' => 'אתם מוכנים ליצירת החשבון הממוזג שלכם, שהחשבונות באתרים הבאים ימוזגו אליו:',
	'centralauth-merge-step3-submit' => 'מיזוג החשבונות',

	# Big text on completion
	'centralauth-complete'   => 'מיזוג החשבון הושלם!',
	'centralauth-incomplete' => 'מיזוג החשבון לא הושלם!',

	# Wheeee
	'centralauth-complete-text'   => 'כעת באפשרותכם להיכנס לכל אתר ויקי של ויקימדיה בלי ליצור חשבון חדש; שם המשתמש והסיסמה הזהים יעבדו בוויקיפדיה, בוויקימילון, בוויקיספר, ובמיזמים השונים בכל השפות.',
	'centralauth-incomplete-text' => 'כשמיזוג החשבון שלכם יושלם, יהיה באפשרותכם להיכנס לכל אתר ויקי של ויקימדיה בלי ליצור חשבון חדש; שם המשתמש והסיסמה הזהים יעבדו בוויקיפדיה, בוויקימילון, בוויקיספר, ובמיזמים השונים בכל השפות.',
	'centralauth-not-owner-text'  => 'שם המשתמש "$1" הוקצה אוטומטית לבעלי החשבון באתר $2.

אם אתם בעלי החשבון, באפשרותכם לסיים את תהליך מיזוג החשבונות פשוט על־ידי הקלדת הסיסמה של החשבון הכללי כאן:',

	'centralauth-notice-dryrun'   => '<div class="successbox">מצב הדגמה בלבד</div><br clear="all" />',
	'centralauth-disabled-dryrun' => 'מיזוג החשבונות הוא כרגע במצב הדגמה ובדיקה, ולכן לא ניתן למזג את החשבונות. מצטערים!',

	# Appended to various messages above
	'centralauth-readmore-text' => ":[[meta:Help:Unified login|מידע נוסף על '''מיזוג החשבונות''']]...",

	# For lists of wikis/accounts:
	'centralauth-list-home-title'       => 'האתר הראשי',
	'centralauth-list-home-dryrun'      => 'הסיסמה וכתובת הדוא"ל שהוגדרו באתר הזה יהיו בשימוש עבור החשבון הממוזג שלכם. תוכלו לשנות את האתר הראשי שלכם מאוחר יותר.',
	'centralauth-list-attached-title'   => 'חשבונות ממוזגים',
	'centralauth-list-attached'         => 'החשבונות בשם "$1" באתרי ויקימדיה הבאים מוזגו באופן אוטומטי:',
	'centralauth-list-attached-dryrun'  => 'החשבונות בשם "$1" באתרי ויקימדיה הבאים ימוזגו באופן אוטומטי:',
	'centralauth-list-unattached-title' => 'חשבונות לא ממוזגים',
	'centralauth-list-unattached'       => 'לא ניתן היה לבדוק אוטומטית האם החשבונות בשם "$1" באתרים הבאים שייכים לכם; כנראה שיש להם סיסמאות שונות מאשר בחשבון הראשי שלכם:',
	'centralauth-foreign-link'          => 'המשתמש $1 באתר $2',

	# Merge methods
	'centralauth-merge-method-primary'  => 'האתר הראשי',
	'centralauth-merge-method-empty'    => 'אין תרומות',
	'centralauth-merge-method-mail'     => 'אומת באמצעות דואר אלקטרוני',
	'centralauth-merge-method-password' => 'אומת באמצעות סיסמה',
	'centralauth-merge-method-admin'    => 'מנהל מיזג את החשבון',
	'centralauth-merge-method-new'      => 'חשבון חדש',
	'centralauth-merge-method-login'    => 'אומת באמצעות כניסה לחשבון',

	# When not complete, offer to finish...
	'centralauth-finish-title'             => 'סיום המיזוג',
	'centralauth-finish-text'              => 'אם חשבונות אלה אכן שייכים לכם, באפשרותכם לסיים את תהליך מיזוג החשבונות פשוט על־ידי הקלדת הסיסמאות לחשבונות האחרים כאן:',
	'centralauth-finish-password'          => 'סיסמה:',
	'centralauth-finish-login'             => 'כניסה',
	'centralauth-finish-send-confirmation' => 'שליחת סיסמה בדוא"ל',
	'centralauth-finish-problems'          => "יש לכם בעיה, או שאינכם בעלי החשבונות האחרים? [[meta:Help:Unified login problems|ניתן למצוא עזרה כאן]]...",
	'centralauth-finish-noconfirms'        => 'לא ניתן היה למזג אף חשבון באמצעות הסיסמה הזו.',
	'centralauth-finish-incomplete'        => 'מספר חשבונות מוזגו באמצעות הסיסמה הזו. חשבונות אחרים עדיין לא אושרו.',

	'centralauth-merge-attempt' => "'''בודק האם הסיסמאות שניתנו תואמים לחשבונות הנותרים שלא מוזגו...'''",

	# When unattached, offer to attach...
	'centralauth-attach-list-attached'     => 'החשבון הממוזג בשם המשתמש "$1" כולל את החשבונות הבאים:',
	'centralauth-attach-title'             => 'אימות החשבון',
	'centralauth-attach-text'              => 'חשבון זה לא נוסף עדיין לחשבון הממוזג. אם גם החשבון הממוזג שייך לכם, באפשרותכם למזג חשבון זה פשוט על־ידי הקלדת סיסמת החשבון הכללי:',
	'centralauth-attach-submit'            => 'מיזוג החשבון',
	'centralauth-attach-success'           => 'החשבון נוסף לחשבון הממוזג.',

	# Administrator's console
	'centralauth'                          => 'ניהול מיזוג החשבונות',
	'centralauth-admin-manage'             => 'ניהול המידע על המשתמש',
	'centralauth-admin-username'           => 'שם משתמש:',
	'centralauth-admin-lookup'             => 'הצגת ועריכת המידע על המשתמש',
	'centralauth-admin-permission'         => "רק דיילים יכולים למזג את חשבונותיהם של אנשים אחרים עבורם.",
	'centralauth-admin-no-unified'         => 'אין חשבון ממוזג בשם זה.',
	'centralauth-admin-info-id'            => 'מספר משתמש:',
	'centralauth-admin-info-registered'    => 'נרשם:',
	'centralauth-admin-info-locked'        => 'נעול:',
	'centralauth-admin-info-hidden'        => 'מוסתר:',
	'centralauth-admin-yes'                => 'כן',
	'centralauth-admin-no'                 => 'לא',
	'centralauth-admin-attached'           => 'חשבונות שהושלם מיזוגם',
	'centralauth-admin-unattached'         => 'חשבונות בלתי ממוזגים',
	'centralauth-admin-no-unattached'      => 'לא נותרו חשבונות בלתי ממוזגים.',
	'centralauth-admin-list-localwiki'     => 'האתר המקומי',
	'centralauth-admin-list-attached-on'   => 'מוזג בתאריך',
	'centralauth-admin-list-method'        => 'שיטה',
	'centralauth-admin-unmerge'            => 'ביטול המיזוג של החשבונות שנבחרו',
	'centralauth-admin-merge'              => 'מיזוג החשבונות שנבחרו',
	'centralauth-admin-bad-input'          => 'בחירה שגויה של מיזוג',
	'centralauth-admin-none-selected'      => 'לא נבחרו חשבונות לשינוי.',
	'centralauth-admin-already-unmerged'   => 'החשבון $1 כבר מוזג',
	'centralauth-admin-unmerge-success'    => '{{PLURAL:$1|חשבון אחד|$2 חשבונות}} מוזגו בהצלחה',
	'centralauth-admin-delete-title'       => 'מחיקת חשבון',
	'centralauth-admin-delete-description' => 'מחיקת החשבון הכללי תמחק את כל ההעדפות הכלליות, תבטל את מיזוגם של כל החשבונות המקומיים, ותשאיר את השם הכללי חופשי למשתמשים אחרים. כל החשבונות הקיימים ימשיכו להתקיים. הסיסמאות לחשבונות מקומיים שנוצרו לפני המיזוג יוחזרו לערכיהם לפני המיזוג.',
	'centralauth-admin-delete-button'      => 'מחיקת חשבון זה',
	'centralauth-admin-delete-success'     => 'החשבון הראשי"<nowiki>$1</nowiki>" נמחק בהצלחה',
	'centralauth-admin-nonexistent'        => 'אין חשבון כללי בשם "<nowiki>$1</nowiki>"',
	'centralauth-admin-delete-nonexistent' => 'שגיאה: החשבון הכללי "<nowiki>$1</nowiki>" אינו קיים.',
	'centralauth-token-mismatch'           => 'מצטערים, לא יכולנו לעבד את בקשתכם עקב אובדן מידע הכניסה.',
	'centralauth-admin-lock-title'         => 'נעילת חשבון',
	'centralauth-admin-lock-description'   => 'נעילת חשבון תגרום לכך שאי אפשר יהיה להיכנס אליו באף אתר.',
	'centralauth-admin-lock-button'        => 'נעילת חשבון זה',
	'centralauth-admin-lock-success'       => 'נעילת החשבון הכללי בשם "<nowiki>$1</nowiki>" הושלמה בהצלחה',
	'centralauth-admin-lock-nonexistent'   => 'שגיאה: לא קיים חשבון כללי בשם "<nowiki>$1</nowiki>".',
	'centralauth-admin-unlock-title'       => 'ביטול נעילת חשבון',
	'centralauth-admin-unlock-description' => 'ביטול נעילת חשבון תגרום לכך שאפשר יהיה שוב להיכנס אליו.',
	'centralauth-admin-unlock-button'      => 'ביטול נעילת חשבון זה',
	'centralauth-admin-unlock-success'     => 'ביטול נעילת החשבון הכללי בשם "<nowiki>$1</nowiki>" הושלמה בהצלחה.',
	'centralauth-admin-unlock-nonexistent' => 'שגיאה: החשבון הכללי "<nowiki>$1</nowiki>" אינו קיים.',
	'centralauth-admin-reason'             => 'סיבה:',

	# Pretty timespan
	'centralauth-seconds-ago' => 'לפני {{plural:$1|שנייה|$1 שניות}}',
	'centralauth-minutes-ago' => 'לפני {{plural:$1|דקה|$1 דקות}}',
	'centralauth-hours-ago'   => 'לפני {{plural:$1|שעה|$1 שעות|שעתיים}}',
	'centralauth-days-ago'    => 'לפני {{plural:$1|יום|$1 ימים|יומיים}}',
	'centralauth-months-ago'  => 'לפני {{plural:$1|חודש|$1 חודשים|חודשיים}}',
	'centralauth-years-ago'   => 'לפני {{plural:$1|שנה|$1 שנים|שנתיים}}',

	# Info panel in preferences
	'centralauth-prefs-status'            => 'מצב החשבון הכללי:',
	'centralauth-prefs-not-managed'       => 'לא משתמש בחשבון ממוזג',
	'centralauth-prefs-unattached'        => 'בלתי מאומת',
	'centralauth-prefs-complete'          => 'הכל תקין!',
	'centralauth-prefs-migration'         => 'בתהליך מיזוג',
	'centralauth-prefs-count-attached'    => 'החשבון שלכם פעיל ב{{plural:$1|מיזם אחד|־$1 מיזמים}}.',
	'centralauth-prefs-count-unattached'  => 'חשבונות בלתי מאומתים בשם המשתמש הזה נותרו ב{{plural:$1|מיזם אחד|־$1 מיזמים}}.',
	'centralauth-prefs-detail-unattached' => 'מיזם זה לא אושר כשייך לחשבון הכללי.',
	'centralauth-prefs-manage'            => 'ניהול החשבון הכללי',

	# Interaction with Special:Renameuser
	'centralauth-renameuser-abort'  => '<div class="errorbox">לא ניתן לשנות את שם המשתמש של $1 באופן מקומי, כיוון שהוא כבר התווסף למערכת החשבונות הממוזגים.</div>',
	'centralauth-renameuser-exists' => '<div class="errorbox">לא ניתן לשנות את שם המשתמש ל"$2" כיוון שהוא שמור לחשבון כללי.</div>',

	# Other messages
	'centralauth-invalid-wiki'   => 'אין מסד נתונים בשם $1',
	'centralauth-account-exists' => 'לא ניתן ליצור את החשבון: שם המשתמש המבוקש כבר בשימוש במערכת החשבונות הממוזגים.',

	# Logging
	'centralauth-log-name'           => 'יומן ניהול החשבון הכללי',
	'centralauth-log-header'         => 'יומן זה כולל פעולות שבוצעו על חשבונות כלליים: מחיקות, נעילות וביטולי נעילות.',
	'centralauth-log-entry-delete'   => 'מחק את החשבון הכללי "<nowiki>$1</nowiki>"',
	'centralauth-log-entry-lock'     => 'נעל את החשבון הכללי "<nowiki>$1</nowiki>"',
	'centralauth-log-entry-unlock'   => 'ביטל את נעילת החשבון הכללי "<nowiki>$1</nowiki>"',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 * @author Siebrand
 */
$messages['hi'] = array(
	'mergeaccount'                         => 'खाता एकत्रिकरण स्थिती',
	'centralauth-desc'                     => 'विकिमीडिया फाऊंडेशन विकियोंमें [[Special:MergeAccount|सदस्यत्व एकत्रिकरण]] करें',
	'centralauth-mergeaccount-desc'        => 'एक सदस्यकी [[Special:MergeAccount|सभी खातें]] एकत्रित करें।',
	'centralauth-merge-denied'             => 'माफ किजीये, इस पन्नेपर जानेकी आपको अनुमति नहीं हैं।',
	'centralauth-merge-notlogged'          => 'कृपया आपका खाता एकत्रिकरण बराबर हुआ हैं यह जाँचने के लिये <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} लॉग इन]</span> करें।',
	'centralauth-merge-welcome'            => "'''आपका सदस्य खाता अभीतक विकिमीडियाके एकत्रित खातेमें मिलाया नहीं गया हैं।'''

अगर आप अपना खाता मिलायें, तो आप एक ही सदस्यनाम और कूटशब्द का इस्तेमाल कर सभी भाषाओंके सभी विकि प्रकल्पोंमें लॉग इन कर सकतें हैं।
इससे आपको शेअर्ड प्रकल्पोंमें काम करना आसान हो जायेगा। उदा. [http://commons.wikimedia.org/ विकिमीडिया कॉमन्स] पे फ़ाईल अपलोड करना, और अगर दो अलग व्यक्ती एकही सदस्यनामसे दो अलग प्रकल्पोंमें काम कर रहे हो तो निर्माण होनेवाले संभ्रम से मुक्ती मिल सकती हैं।

अगर किसी औरने आपका सदस्यनाम पहले से ले लिया हैं तो आप उनसे संपर्क करके अथवा प्रबंधकोंके द्वारा बदलाव किये जा सकतें हैं।",
	'centralauth-merge-step1-title'        => 'खाता एकत्रिकरण शुरू करें',
	'centralauth-merge-step1-detail'       => 'आपका कूटशब्द और इ-मेल एड्रेस अन्य विकियों के साथ जाँचा जा रहा हैं। 
जब तक आप अनुमति नहीं देते तब तक कोई भी बदलाव नहीं किये जायेंगे।',
	'centralauth-merge-step1-submit'       => 'खाता ज़ानकारी को सहमती दें',
	'centralauth-merge-step2-title'        => 'अन्य खाता निश्चित करें',
	'centralauth-merge-step2-detail'       => 'आपके द्वारा डेसिग्नेटेड होम विकिके साथ कुछ खाता जोड़ नहीं पाये हैं।
अगर यह खातें आपके ही हैं, तो आप उनके लिये इस्तेमालमें लाया जाने वाला कूटशब्द देकर निश्चित कर सकतें हैं।',
	'centralauth-merge-step2-submit'       => 'लॉग इन ज़ानकारी जाँचें',
	'centralauth-merge-dryrun-complete'    => 'सभी खातें अपने आप एकत्रित किये जा सकतें हैं।

अभीतक आपके खातोंमें बदलाव नहीं किये गये हैं।',
	'centralauth-merge-dryrun-incomplete'  => 'आप कन्टिन्यू कर सकते हैं, पर कुछ खातोंकी निश्चिती ना हुई होने के कारण वे जोडे नहीं जा सकतें। आप उन्हें बादमें एकत्रित कर सकतें हैं।

अभीतक आपके सदस्यत्वमें बदलाव नहीं किये गये हैं।',
	'centralauth-merge-dryrun-or'          => "'''या फिर'''",
	'centralauth-merge-dryrun-home'        => 'एकत्रिकरण प्रणाली आपही होम विकिपर आपके सदस्यनामके उपयोगकर्ता हैं यह जाँच नहीं पाई हैं।

एक अन्य विकि आपके होम विकिके तौर पर चुना गया हैं; खाता एकत्रिकरण को पूरा करने के लिये नीचे दिये कड़ीपर जाकर लॉग इन करें।',
	'centralauth-merge-step3-title'        => 'यूनिफाइड खाता तयार करें',
	'centralauth-merge-step3-detail'       => 'आप निम्नलिखित विकियोंके लिये यूनिफाईड खाता बनाने के लिये तैयार हैं:',
	'centralauth-merge-step3-submit'       => 'खातें जोडें',
	'centralauth-complete'                 => 'खाता एकत्रिकरण पूरा हुआ!',
	'centralauth-incomplete'               => 'खाता एकत्रिकरण पूरा नहीं हुआ!',
	'centralauth-complete-text'            => 'अब आप किसी भी विकिमीडिया विकिपर नया खाता बनाये बिना लॉग इन कर सकतें हैं;
एकही सदस्यनाम और कूटशब्द विकिपीडिया, विक्शनरी, विकिताबें तथा अन्य सभी भाषाओंके सभी प्रकल्पोंमें इस्तेमाल किया जा सकता हैं।',
	'centralauth-incomplete-text'          => 'एक बार आपका यूनिफाइड लॉग इन तैयार हो जायें, फिर आप कोईभी विकिमीडिया विकिपर नया खाता खोले बिना लॉग इन कर सकतें हैं; एकही सदस्यनाम और कूटशब्द विकिपीडिया, विक्शनरी, विकिताबें तथा अन्य सभी भाषाओंके सभी प्रकल्पोंमें इस्तेमाल किया जा सकता हैं।',
	'centralauth-not-owner-text'           => '$2 पे "$1" यह सदस्यनाम अपनेआप दिया गया हैं।

अगर यह आप ही हैं, तो आप उस अकाउंटका मुख्य कूटशब्द यहां देकर लॉग इन एकत्रिकरण प्रक्रिया को पूरा कर सकतें हैं:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>सिर्फ डेमो मोड</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'माफ किजीयें! खाता एकत्रिकरण अभी डेमो मोडमें हैं, इसलिये सचमुच का एकत्रिकरण संभव नहीं हैं।',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|'''एकत्रित खातोंके लिये''' अधिक ज़ानकारी]]...''",
	'centralauth-list-home-title'          => 'होम विकी',
	'centralauth-list-home-dryrun'         => 'इस विकिका आपका सदस्यनाम और कूटशब्द एकत्रित अकाउंट के लिये इस्तेमाल किया जायेगा।
आप अपना मुख्य विकि बाद में बदल सकतें हैं।',
	'centralauth-list-attached-title'      => 'जुडे हुए खातें',
	'centralauth-list-attached'            => 'नीचे दिये गये साईट्स पर उपलब्ध "$1" यह सदस्यनाम अपनेआप एकत्रित खातेमें डाल दिया गया हैं:',
	'centralauth-list-attached-dryrun'     => 'नीचे दिये गये साईट्स पर उपलब्ध "$1" यह सदस्यनाम अपनेआप एकत्रित खातेमें डाल दिया जायेगा:',
	'centralauth-list-unattached-title'    => 'न जुडे हुए खातें',
	'centralauth-list-unattached'          => 'नीचे दी हुई साईट्स पर "$1" यह खाता आपकाही हैं इसकी निश्चिती अपने आप नहीं हो पाई हैं; शायद उनका कूटशब्द अलग हो सकता हैं:',
	'centralauth-foreign-link'             => '$2 पर सदस्य $1',
	'centralauth-merge-method-primary'     => 'होम विकि',
	'centralauth-merge-method-empty'       => 'योगदान दिया नहीं हैं',
	'centralauth-merge-method-mail'        => 'इ-मेल द्वारा निश्चित किया गया',
	'centralauth-merge-method-password'    => 'कूटशब्द के द्वारा निश्चित किया गया',
	'centralauth-merge-method-admin'       => 'प्रबंधक एकत्रित खाता',
	'centralauth-merge-method-new'         => 'नया खाता',
	'centralauth-merge-method-login'       => 'लॉग इन के द्वारा निश्चित किया',
	'centralauth-finish-title'             => 'एकत्रिकरण खतम करें',
	'centralauth-finish-text'              => 'अगर निम्नलिखित अकाउंट आपही के हैं तो उनके कूटशब्द देकर आप इन्हें एकत्रित कर सकतें हैं:',
	'centralauth-finish-password'          => 'कूटशब्द:',
	'centralauth-finish-login'             => 'लॉग इन',
	'centralauth-finish-send-confirmation' => 'कूटशब्द इ-मेल से भेजें',
	'centralauth-finish-problems'          => 'आपको कुछ संदेह है क्या, या फिर ये अकाउंट आपके नहीं हैं क्या?
[[meta:Help:Unified login problems|सहायता कैसे प्राप्त करें]]...',
	'centralauth-finish-noconfirms'        => 'दिये हुए कूटशब्दसे कोई भी खाता निश्चित नहीं हुआ हैं।',
	'centralauth-finish-incomplete'        => 'बहुत सारे अकाउंट दिया हुआ कूटशब्द के इस्तेमाल से एकत्रित हो गये हैं।
अन्य अकाउंट अभी तक निश्चित नहीं हो पायें।',
	'centralauth-merge-attempt'            => "'''आपका दिया हुआ कूटशब्द अन्य समावेश न हुए अकाउंट के लिये परखा जा रहा हैं...'''",
	'centralauth-attach-list-attached'     => '"$1" इस एकत्रित अकाउंटमें निम्नलिखित अकाउंट हैं:',
	'centralauth-attach-title'             => 'खाता निश्चिती करें',
	'centralauth-attach-text'              => 'यह अकाउंट एकत्रित अकाउंटमें नहीं हैं। 
अगर एकत्रित अकाउंट आपकाही हैं, तो उसका कूटशब्द देकर आप इसे जोड सकतें हैं:',
	'centralauth-attach-submit'            => 'खाता स्थलांतरित करें',
	'centralauth-attach-success'           => 'खाता एकत्रित खातेसे जोड दिया गया हैं।',
	'centralauth'                          => 'यूनिफाईड लॉग इन प्रबंधन',
	'centralauth-admin-manage'             => 'सदस्य डाटा का व्यवस्थापन करें',
	'centralauth-admin-username'           => 'सदस्यनाम:',
	'centralauth-admin-lookup'             => 'सदस्य ज़ानकारी देखें या बदलें',
	'centralauth-admin-permission'         => 'सिर्फ स्टिवार्ड्स ही अन्य सदस्योंके खाते एकत्रित कर सकतें हैं।',
	'centralauth-admin-no-unified'         => 'इस सदस्यनाम का एकत्रित खाता नहीं हैं।',
	'centralauth-admin-info-id'            => 'सदस्य ID:',
	'centralauth-admin-info-registered'    => 'पंजीकृत:',
	'centralauth-admin-info-locked'        => 'लॉक किया हुआ:',
	'centralauth-admin-info-hidden'        => 'छुपाया हुआ:',
	'centralauth-admin-yes'                => 'हां',
	'centralauth-admin-no'                 => 'नहीं',
	'centralauth-admin-attached'           => 'पूरी तरह से एकत्रित किये अकाउंट',
	'centralauth-admin-unattached'         => 'ना जुडे हुए अकाउंट',
	'centralauth-admin-no-unattached'      => 'एकत्रित न किये हुए खाते बचे नहीं।',
	'centralauth-admin-list-localwiki'     => 'स्थानिक विकि',
	'centralauth-admin-list-attached-on'   => 'को जुडे हुए',
	'centralauth-admin-list-method'        => 'पद्धती',
	'centralauth-admin-unmerge'            => 'चुने हुए अलग करें',
	'centralauth-admin-merge'              => 'चुने हुए एकत्रित करें',
	'centralauth-admin-bad-input'          => 'चुनने में गलती हुई हैं',
	'centralauth-admin-none-selected'      => 'बदलनेके लिये कोई भी खाता चुना नहीं।',
	'centralauth-admin-already-unmerged'   => 'पहले से अनमर्ज किया हुआ होने से $1 को हटा रहें हैं',
	'centralauth-admin-unmerge-success'    => '$1 {{PLURAL:$2|खातेका|खातोंका}} अनमर्ज हो गया',
	'centralauth-admin-delete-title'       => 'खाता हटायें',
	'centralauth-admin-delete-description' => 'अगर विश्व खाता हटा दिया, तो सभी वरीयतायें, सभी स्थानिक खातोंके अलग अलग खातोंमें परिवर्तन, और विश्व सदस्यनाम और किसीके इस्तेमाल के लिये छोड दिया जायेगा।
सभी स्थानिक खातायें अस्तित्वमें रहेंगे।
स्थानिक खातोंके एकत्रिकरण करने से पहले के कूटशब्द पूर्ववत कर दिये जायेंगे।',
	'centralauth-admin-delete-button'      => 'यह खाता हटायें',
	'centralauth-admin-delete-success'     => '"<nowiki>$1</nowiki>" का विश्व खाता हटाया',
	'centralauth-admin-nonexistent'        => '"<nowiki>$1</nowiki>" का विश्व खाता नहीं हैं',
	'centralauth-admin-delete-nonexistent' => 'गलती: "<nowiki>$1</nowiki>" यह विश्व खाता अस्तित्वमें नहीं हैं।',
	'centralauth-token-mismatch'           => 'माफ किजीये, सेशन डाटाके खो जाने से आपकी अर्जी भेज नहीं पा रहें हैं।',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|सेकैंद के पहले|सेकेंदोंके पहले}}',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|मिनट के पहले|मिनटोंके पहले}}',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|घंटे पहले|घंटे पहले}}',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|दिन पहले|दिन पहले}}',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|महीना पहले|महिनोंपहले}}',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|साल पहले|साल पहले}}',
	'centralauth-prefs-status'             => 'ग्लोबल खाता स्थिती:',
	'centralauth-prefs-not-managed'        => 'एकत्रित अकाउंटका इस्तेमाल नहीं किया हैं',
	'centralauth-prefs-unattached'         => 'सहमती नहीं दी',
	'centralauth-prefs-complete'           => 'सब कुछ ठीकठाक!',
	'centralauth-prefs-migration'          => 'भेजने का काम चालू',
	'centralauth-prefs-count-attached'     => 'आपका खाता $1 {{plural:$1|साईटपर|साईट्सपर}} अस्तित्वमें हैं।',
	'centralauth-prefs-count-unattached'   => '$1 {{plural:$1|प्रकल्पमें|प्रकल्पोंमें}} आपके खाते (जिन्हें आपने निश्चित नहीं किया हैं) बचे हुए हैं।',
	'centralauth-prefs-detail-unattached'  => 'आपके एकत्रित अकाउंटमें इस साईटको निश्चित नहीं किया गया हैं।',
	'centralauth-prefs-manage'             => 'आपके ग्लोबल अकाउंटको मैनेज करें',
	'centralauth-renameuser-abort'         => '<div class="errorbox">$1 यह सदस्यनाम एकत्रित खाते से जुडा हुआ होनेसे यहां इसे बदला नहीं जा सकता।</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">सदस्य $2 का नाम बदल नहीं सकते क्योंकी यह विश्व खाते से जुडने के लिये रखा हैं।</div>',
	'centralauth-invalid-wiki'             => 'ऐसा विकि नहीं हैं DB: $1',
	'centralauth-account-exists'           => 'खाता खोल नहीं सकते: पूछा गया सदस्यनाम पहले से विश्व खाते के लिये सुरक्षित हैं।',
);

/** Croatian (Hrvatski)
 * @author Dalibor Bosits
 * @author SpeedyGonsales
 */
$messages['hr'] = array(
	'mergeaccount'                         => 'Status središnje prijave',
	'centralauth-desc'                     => '[[Special:MergeAccount|Spoji račune]] na svim wikijima Wikimedijine zaklade',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Spajanje više suradničkih računa]] za prijavljivanje jednog suradnika',
	'centralauth-merge-denied'             => 'Nemate ovlasti za pristup ovoj stranici.',
	'centralauth-merge-notlogged'          => 'Molimo <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} prijavite se]</span> kako bi provjerili jesu li Vaši suradnički računi uspješno spojeni.',
	'centralauth-merge-welcome'            => "'''Vaš suradnički račun nije još premješten na Wikimedijin središnji sustav prijave.'''

Ukoliko izaberete spajanje vaših računa, moći ćete se prijaviti s istim imenom i lozinkom na sve Wikimedijine projekte.
Takav pristup omogućuje lakši rad na dijeljenim projektima kao i postavljanje slika na [http://commons.wikimedia.org/ Wikimedijin zajednički poslužitelj], i izbjegava se moguća zabuna ukoliko dvije osobe izaberu isto ime na različitim projektima.

Ukoliko je netko već uporabio vaše ime/nadimak na nekom drugom projektu, ovo neće smetati niti jednu stranu, nego će vam dati šansu da se konflikt naknadno riješi s njima ili administratorom.",
	'centralauth-merge-step1-title'        => 'Počni spajanje suradničkih računa',
	'centralauth-merge-step1-detail'       => 'Vaša lozinka i prijavljena e-mail adresa će biti uspoređeni s podacima na drugim wikijima da se ustanovi da li odgovaraju jedni drugima. Promjene neće biti izvršene dok ne potvrdite da je sve u redu.',
	'centralauth-merge-step1-submit'       => 'Potvrdi podatke o prijavi',
	'centralauth-merge-step2-title'        => 'Potvrdi više suradničkih računa',
	'centralauth-merge-step2-detail'       => 'Neki računi ne odgovaraju onom koji ste naveli kao polazišni wiki. Ako su vaši, potvrdite to navođenjem lozinke za te račune.',
	'centralauth-merge-step2-submit'       => 'Potvrdi podatke o prijavi',
	'centralauth-merge-dryrun-complete'    => 'Svi postojeći računi mogu automatski biti spojeni!',
	'centralauth-merge-dryrun-or'          => "'''ili'''",
	'centralauth-merge-step3-title'        => 'Stvori središnji suradnički račun',
	'centralauth-merge-step3-detail'       => 'Možete stvoriti središnji račun, koji spaja račune na slijedećim wikiprojektima:',
	'centralauth-merge-step3-submit'       => 'Spoji suradničke račune',
	'centralauth-complete'                 => 'Spajanje suradničkih računa izvršeno!',
	'centralauth-incomplete'               => 'Spajanje suradničkih računa nije izvršeno!',
	'centralauth-complete-text'            => 'Sad se možete prijaviti na bilo koji Wikimedijin projekt bez otvaranja novog računa; isto ime i lozinka vrijede na Wikipediji, Wječniku, Wikiknjigama i ostalim projektima na svim jezicima.',
	'centralauth-incomplete-text'          => 'Kad vaš račun bude jedinstven, moći ćete se prijaviti na svaki Wikimedija projekt bez stvaranja novog računa; isto ime i lozinka vrijedit će na Wikipediji, Wječniku, Wikiknjigama, i svim ostalim Wikiprojektima na svim jezicima.',
	'centralauth-not-owner-text'           => 'Suradničko ime "$1" je automatski dodijeljeno suradniku na $2.

Ukoliko ste to vi, možete dovršiti proces spajanja računa unošenjem glavne lozinke:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Samo demo mod</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Spajanje računa je trenutno u demo / debugging modu, pa je stvarno spajanje računa onemogućeno.',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Saznaj više o '''središnjoj prijavi''']]...''",
	'centralauth-list-home-title'          => 'Glavna wiki',
	'centralauth-list-home-dryrun'         => 'Lozinka i e-mail adresa postavljeni na ovom wikiju bit će uporabljeni za vaš središnji račun.
Naravno, moguća je promjena početnog wikija.',
	'centralauth-list-attached-title'      => 'Spojeni suradnički računi',
	'centralauth-list-attached'            => 'Suradnički račun "$1" na slijedećim stranicama (wikijima) je automatski priključen središnjem računu:',
	'centralauth-list-attached-dryrun'     => 'Suradnički račun "$1" na slijedećim stranicama (wikijima) će biti automatski priključen središnjem računu:',
	'centralauth-list-unattached-title'    => 'Nespojeni suradnički računi',
	'centralauth-list-unattached'          => 'Suradnički račun "$1" ne može vam biti automatski pridružen na slijedećim projektima; najvjerojatnije ima različitu lozinku od vaše primarne:',
	'centralauth-foreign-link'             => 'Suradnik $1 na $2',
	'centralauth-merge-method-primary'     => 'početna wiki',
	'centralauth-merge-method-empty'       => 'nema doprinosa',
	'centralauth-merge-method-mail'        => 'potvrđeno putem e-maila',
	'centralauth-merge-method-password'    => 'potvrđeno lozinkom',
	'centralauth-merge-method-new'         => 'novi račun',
	'centralauth-merge-method-login'       => 'potvrđeno prijavljivanjem',
	'centralauth-finish-title'             => 'Završi spajanje',
	'centralauth-finish-text'              => 'Ukoliko su slijedeći računi vaši, možete završiti proces spajanja računa unošenjem lozinki za preostale račune:',
	'centralauth-finish-password'          => 'Lozinka:',
	'centralauth-finish-login'             => 'Prijavite se',
	'centralauth-finish-send-confirmation' => 'Pošalji lozinku e-poštom',
	'centralauth-finish-problems'          => 'Imate problem, ili ovi računi nisu vaši? [[meta:Help:Unified login problems|Kako naći pomoć]]...',
	'centralauth-finish-noconfirms'        => 'Računi nemogu biti potvrđeni korištenjem ove lozinke',
	'centralauth-finish-incomplete'        => 'Nekoliko računa je spojeno korištenjem ove lozinke.<br>
Ostali računi nisu još potvrđeni.',
	'centralauth-merge-attempt'            => "'''Provjeravam navedene lozinke za ostale još nespojene račune...'''",
	'centralauth-attach-list-attached'     => 'Jedinstveni račun "$1" uključuje slijedeće račune:',
	'centralauth-attach-title'             => 'Potvrdi suradnički račun',
	'centralauth-attach-text'              => 'Ovaj račun nije još spojen s jedinstvenim računom. Ukoliko je jedinstaveni račun vaš, možete ga spojiti ako znate lozinku jedinstvenog računa:',
	'centralauth-attach-submit'            => 'Prenesi suradnički račun',
	'centralauth-attach-success'           => 'Vaš suradnički račun je sada postao središnjim računom.',
	'centralauth'                          => 'Administracija središnjeg suradničkog računa',
	'centralauth-admin-manage'             => 'Upravljanje suradničkim podacima',
	'centralauth-admin-username'           => 'Suradničko ime:',
	'centralauth-admin-lookup'             => 'Vidi ili uredi suradničke podatke',
	'centralauth-admin-permission'         => 'Samo stjuardi mogu spajati suradničke račune umjesto njih.',
	'centralauth-admin-no-unified'         => 'Nema spojenih računa za ovaj nadimak/ime.',
	'centralauth-admin-info-id'            => 'ID suradnika:',
	'centralauth-admin-info-registered'    => 'Prijavljen:',
	'centralauth-admin-info-locked'        => 'Zaključano:',
	'centralauth-admin-info-hidden'        => 'Sakriven:',
	'centralauth-admin-yes'                => 'da',
	'centralauth-admin-no'                 => 'ne',
	'centralauth-admin-attached'           => 'U potpunosti spojeni računi',
	'centralauth-admin-unattached'         => 'Nespojeni suradnički računi',
	'centralauth-admin-list-localwiki'     => 'Glavna wiki',
	'centralauth-admin-list-attached-on'   => 'Spojeno na',
	'centralauth-admin-list-method'        => 'Način',
	'centralauth-admin-unmerge'            => 'Razdvoji odabrane',
	'centralauth-admin-merge'              => 'Spoji odabrane',
	'centralauth-admin-bad-input'          => 'Nevaljan odabir',
	'centralauth-admin-none-selected'      => 'Nijedan račun nije odabran za promjenu.',
	'centralauth-seconds-ago'              => 'prije $1 {{PLURAL:$1|sekunde|sekundi}}',
	'centralauth-minutes-ago'              => 'prije $1 {{PLURAL:$1|minute|minuta}}',
	'centralauth-hours-ago'                => 'prije $1 {{PLURAL:$1|sata|sati}}',
	'centralauth-days-ago'                 => 'prije $1 {{PLURAL:$1|dana|dana}}',
	'centralauth-months-ago'               => 'prije $1 {{PLURAL:$1|mjeseca|mjeseci}}',
	'centralauth-years-ago'                => 'prije $1 {{PLURAL:$1|godine|godina}}',
	'centralauth-prefs-status'             => 'Status središnjeg suradničkog računa:',
	'centralauth-prefs-not-managed'        => 'Ne rabite centralni račun',
	'centralauth-prefs-unattached'         => 'Nepotvrđeno',
	'centralauth-prefs-complete'           => 'Sve u redu!',
	'centralauth-prefs-migration'          => 'Migracija u tijeku',
	'centralauth-prefs-count-attached'     => 'Vaš suradnički račun je aktivan na $1 {{PLURAL:$1|projektu|projekta|projekata}}.',
	'centralauth-prefs-count-unattached'   => 'Nepotvrđeni računi s vašim imenom postoje još na {{plural:$1|slijedećem projektu|slijedećim projektima|slijedećim projektima}} $1.',
	'centralauth-prefs-detail-unattached'  => 'Pripadnost ovog projekta jedinstvenom sustavu prijave nije potvrđena.',
	'centralauth-prefs-manage'             => 'Uredite Vaš središnji suradnički račun',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Ne mogu preimenovati suradnika $1 lokalno jer je to suradničko ime spojeno u jedinstveni sustav prijave.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Suradnik $2 nemože biti preimenovan jer je ime zauzeto za jedinstveni račun.</div>',
	'centralauth-account-exists'           => 'Račun nemože biti stvoren: traženo ime je već zauzeto u jedinstvenom sustavu prijave.',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'mergeaccount'                         => 'Status zjednoćenja wužiwarskich kontow',
	'centralauth-desc'                     => 'Konta přez wikije Wikimedijoweje załožby [[Special:MergeAccount|zjednoćić]]',
	'centralauth-merge-notlogged'          => 'Prošu <span class="plainlinks"> [{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} přizjew so]</span>, zo by přepruwował, hač su so twoje wužiwarske konta dospołnje zjednoćili.',
	'centralauth-merge-welcome'            => "'''Twoje wužiwarske konto njeje so hišće do zhromadneho systema přizjewjenja Wikimedije přiwzało.'''

Hdyž so rozsudźiš twoje konta tam składować, budźe móžno ze samsnym wužiwarskim mjenom a hesłom we wšěch projektach Wikimedije dźěłać.
To zjednori runočasne dźěło we wjacorych wikijach kaž nahraće datajow do [http://commons.wikimedia.org/ Wikimedia Commons] a wobeńdźe konflikty a mylenja hdyž chce něchto druhi samsne přimjeno kaž ty w druhich projektach wužiwać.",
	'centralauth-merge-step1-title'        => 'Wužiwarske konta so zjednoća',
	'centralauth-merge-step1-detail'       => 'Twoje hesło a zregistrowana e-mejlowa adresa přirunatej so z kontami w druhich wikijach zo by so jenakosć zwěsćiła. Ničo změnjene njebudźe doniž njewobkrućiš, zo je wšo w porjadku.',
	'centralauth-merge-step1-submit'       => 'Přizjewjenske daty potwjerdźić',
	'centralauth-merge-step2-title'        => 'Dalše konta potwjerdźić',
	'centralauth-merge-step2-detail'       => 'Někotre z wužiwarskich kontow njemóžachu so awtomatisce zjednoćić. Hdyž su konta twoje, móžeš to z hesłom dopokazać.',
	'centralauth-merge-step2-submit'       => 'Přizjewjenske daty potwjerdźić',
	'centralauth-merge-step3-title'        => 'Zjednoćene konto wutworić',
	'centralauth-merge-step3-detail'       => 'Sy hotowy swoje zjednoćene konto wutworić, ze slědowacymi připowěsnjenymi wikijemi:',
	'centralauth-merge-step3-submit'       => 'Konta zjednoćić',
	'centralauth-complete'                 => 'Wužiwarske konta su so dospołnje zjednoćili.',
	'centralauth-incomplete'               => 'Wužiwarske konta <b>njejsu</b> so dospołnje zjednoćili!',
	'centralauth-complete-text'            => 'Móžeš so nětko we wšěch projektach Wikimedije přizjewić bjez toho, zo by tam nowe konto wutworić dyrbjał; samsne přimjeno a samsne hesło stej   płaćiwej za Wikipedija, Wikisłownik, Wikiknihi a wšě sotrowske projekty we wšěch rěčach.',
	'centralauth-incomplete-text'          => 'Tak ruče kaž su so twoje wužiwarske konta zjednoćili, móžeš so we wšěch projektach Wikimedije přizjewić bjez toho, zo by tam nowe konto wutworić dyrbjał; samsne přimjeno a samsne hesło stej   płaćiwej za Wikipedija, Wikisłownik, Wikiknihi a wšě sotrowske projekty we wšěch rěčach.',
	'centralauth-not-owner-text'           => 'Wužiwarske mjeno "$1" bu awtomatisce swójstwownikej wužiwarskeho konta $2 připokazane. Jeli je to twoje wužiwarske mjeno, móžeš zjednoćenje wužiwarskich kontow přez zapodaće hłowneho hesła za tute wužiwarske konto dokónčić:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Jenož demonstraciski modus</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Kontowe zjednoćenje je runje w demonstraciskim modusu abo při pytanju za zmylkami, tohodla su aktuelne zjednoćenske procesy znjemóžnjene. Bohužel!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Informacije wo '''zjednoćenju wužiwarskich kontow''']]...''",
	'centralauth-list-home-title'          => 'Domjacy wiki',
	'centralauth-list-home-dryrun'         => 'Hesło a e-mejlowa adresa nastajenej w tutym wikiju budźetej so za twoje zjednoćene konto wužiwać, a twoja wužiwarska strona tu budźe so awtomatisce z druhich wwikijow wotkazować. Móžeš tež pozdźišo swoju domjacy wiki změnić.',
	'centralauth-list-attached-title'      => 'Připowěsnjene konta',
	'centralauth-list-attached'            => 'Konto z mjenom "$1" na slědowacych sydłow buchu awtomatisce zjednoćenemu kontu přidate.',
	'centralauth-list-attached-dryrun'     => 'Konto z mjenom "$1" na kóždym ze slědowacych sydłow budźe so awtomatisće zjednoćenemu kontu přidać:',
	'centralauth-list-unattached-title'    => 'Njepřipowěsnjene konta',
	'centralauth-list-unattached'          => 'Njeda so awtomatisce potwjerdźeć, zo by konto "S1" za slědowace sydła je twoje; najskerje je wone druhe hesło hač twoej primarne konto.',
	'centralauth-foreign-link'             => 'Wužiwar $1 na $2',
	'centralauth-finish-title'             => 'Zjednoćenje dokónčić',
	'centralauth-finish-text'              => 'Jeli tute wužiwarske konta su twoje, móžeš proces zjednoćenja wužiwarskich kontow přez zapodaće hesłow za druhe konta dokónčić.',
	'centralauth-finish-password'          => 'Hesło:',
	'centralauth-finish-login'             => 'Přizjewjenje',
	'centralauth-finish-send-confirmation' => 'Hesło mejlować',
	'centralauth-finish-problems'          => 'Maš problemy abo njejsu tute druhe konto twoje? [[meta:Help:Unified login problems|Tu namakaš pomoc]]...',
	'centralauth-merge-attempt'            => "'''Zapodate hesło so z njezjednoćenymi wužiwarskimi kontami přepruwuje...'''",
	'centralauth-attach-list-attached'     => 'Zjednoćene konto z mjenom "$1" zapřijima slědowace konta:',
	'centralauth-attach-title'             => 'Konto wobkrućić',
	'centralauth-attach-text'              => 'Tute konto hišće njeje so do zjednoćeneho konta přewzało. Jeli tež globalne konto tebi słuša, móžeš tute konto zapřijeć, jeli zapodaš hesło globalneho konta:',
	'centralauth-attach-submit'            => 'Konto přewzać',
	'centralauth-attach-success'           => 'Tute konto bu do zjednoćeneho konta přewzate.',
	'centralauth'                          => 'Zarjadowanje kontoweho zjednoćenja',
	'centralauth-admin-manage'             => 'Wužiwarske daty zrjadować',
	'centralauth-admin-username'           => 'Wužiwarske mjeno',
	'centralauth-admin-lookup'             => 'Wužiwarske daty wobhladać abo wobdźěłać',
	'centralauth-admin-permission'         => 'Jenož stewardźa smědźa konta druhich wužiwarjow zjednoćić.',
	'centralauth-admin-unmerge'            => 'Wubrane wotdźělić',
	'centralauth-admin-merge'              => 'Wubrane zjednoćić',
	'centralauth-admin-bad-input'          => 'Njepłaćiwy wuběr za zjednoćenje',
	'centralauth-admin-none-selected'      => 'Žane konto za změnjenje wubrane.',
	'centralauth-prefs-status'             => 'Status globalneho konta',
	'centralauth-prefs-not-managed'        => 'Njewužiwa so zjednoćene konto',
	'centralauth-prefs-unattached'         => 'Njepotwjerdźeny',
	'centralauth-prefs-complete'           => 'Wšo w porjadku!',
	'centralauth-prefs-migration'          => 'W přeměnje',
	'centralauth-prefs-count-attached'     => 'Twoje konto je na $1 projekotwych sydłach aktiwne.',
	'centralauth-prefs-count-unattached'   => 'Njepotwjerdźene konta z twojim mjenom zwostanu na $1 projektach.',
	'centralauth-prefs-detail-unattached'  => 'Njeje potwjerdźenje, zo tute projektowe sydło ke globalnemu kontu słuša.',
	'centralauth-prefs-manage'             => 'Twoje globalne konto zrjadować',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Wužiwar $1 njeda so lokalnje přemjenować, dokelž tute wužiwarske mjeno je do systema zjednoćeneho přizjewjenja přešoł.</div>',
);

/** Haitian (Kreyòl ayisyen)
 * @author Masterches
 */
$messages['ht'] = array(
	'mergeaccount' => 'Estati reyinyon, fizyon kont itilizatè yo',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Tgr
 * @author Dorgan
 * @author KossuthRad
 */
$messages['hu'] = array(
	'mergeaccount'                         => 'Felhasználói fiókok egyesítésének állapota',
	'centralauth-desc'                     => '[[Special:MergeAccount|Felhasználói fiókok egységesítése]] a Wikimedia Alapítvány wikijein',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Felhasználói fiókok összevonása]] az egységes bejelentkezéshez',
	'centralauth-merge-denied'             => 'Sajnáljuk, de nincs jogod az oldal megtekintéséhez.',
	'centralauth-merge-notlogged'          => '<span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} Jelentkezz be]</span>, hogy ellenőrizhessük, felhasználói fiókjaid egyesítve vannak-e.',
	'centralauth-merge-welcome'            => "'''A felhasználói fiókod még nincs integrálva a Wikimedia egységesített bejelentkezési rendszerébe.'''

Ha fiókjaid egységesítését választod, egyetlen felhasználói névvel és jelszóval léphetsz be a Wikimedia összes wikijébe.
Ez könnyebb munkát tesz lehetővé például a [http://commons.wikimedia.org/ Wikimedia Commonsban], és nem fordulhat elő az, hogy két felhasználó ugyanazt a nevet választja két különböző projektben.

Ha valaki más már korábban beregisztrált a neveden egy másik oldalon, a folyamat nem fogja őket zavarni, de később esélyed lesz megoldásra jutni velük vagy egy adminisztrátorral.",
	'centralauth-merge-step1-title'        => 'Bejelentkezés egységesítésének megkezdése',
	'centralauth-merge-step1-detail'       => 'Ellenőrizzük, hogy jelszavad és regisztrált e-mail címed melyik más wikin lévő felhasználói nevekkel egyezik meg. Nem történik változás, míg meg nem erősíted, hogy minden rendben van.',
	'centralauth-merge-step1-submit'       => 'Bejelentkezési információk megerősítése',
	'centralauth-merge-step2-title'        => 'Más fiókok megerősítése',
	'centralauth-merge-step2-detail'       => 'Néhány fiókot nem sikerült automatikusan párosítani a kijelölt saját wikihez. Ha ezek hozzád tartoznak, erősítsd meg a jelszó megadásával, hogy tényleg hozzád tartoznak.',
	'centralauth-merge-step2-submit'       => 'Bejelentkezési információ megerősítése',
	'centralauth-merge-dryrun-complete'    => 'Az összes felhasználói fiók automatikusan egyesíthető!

Még semmilyen változtatás nem történt.',
	'centralauth-merge-dryrun-incomplete'  => 'Az egyesítés folytatható, de néhány fiókot nem sikerült automatikusan ellenőrizni; ezek nem lesznek most integrálva. Később bevonhatod őket.

Eddig még semmilyen változtatás nem történt.',
	'centralauth-merge-dryrun-or'          => "'''vagy'''",
	'centralauth-merge-dryrun-home'        => 'A rendszer nem tudta ellenőrizni, hogy te vagy-e a név tulajdonosa az elsődleges wikin.

Ha igen, kövesd az alábbi linket, és ott folytasd az egyesítést.',
	'centralauth-merge-step3-title'        => 'Egységesített felhasználói fiók elkészítése',
	'centralauth-merge-step3-detail'       => 'Most már készen állsz az egységesített felhasználói fiók elkészítéséhez, amelyekhez a következő wikiket csatoljuk:',
	'centralauth-merge-step3-submit'       => 'Felhasználói fiókok egységesítése',
	'centralauth-complete'                 => 'A bejelentkezés egységesítése sikeresen befejeződött!',
	'centralauth-incomplete'               => 'A bejelentkezés egységesítése nincs befejezve!',
	'centralauth-complete-text'            => 'Most már bármelyik Wikimedia webhelyre beléphetsz anélkül, hogy újabb felhasználói fiókot hoznál létre; például a magyar Wikipédiában regisztrált felhasználóneveddel bejelentkezhetsz Wikihírekbe és akár az összes további Wikimedia webhelyre bármely nyelven.',
	'centralauth-incomplete-text'          => 'Ha bejelentkezésed egységesítve lesz, bármelyik Wikimedia wikibe bejelentkezhetsz új felhasználói fiók létrehozása nélkül: ugyanazt a felhasználói nevet és jelszót használhatod a Wikipédia, Wikiszótár, Wikikönyvek és más testvérprojektek minden nyelvű változatánál.',
	'centralauth-not-owner-text'           => 'A(z) „$1” felhasználói nevet automatikusan hozzárendeltük a(z) $2-s tulajdonosához.

Ha ez te vagy, akkor a gazda jelszavának megadásával erősítsd meg az itteni fiókodat:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Demó mód</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'A felhasználói fiókok egységesítése jelenleg csak demó / hibakeresés céljából működik, ezért a valós egységesítés le van tiltva. Sajnáljuk!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login/hu|Tudj meg többet az '''egységesített bejelentkezésről''']]...''",
	'centralauth-list-home-title'          => 'Saját wiki',
	'centralauth-list-home-dryrun'         => 'Az ezen a wikin beállított jelszavad és e-mail címed lesz használva az egységesített felhasználói fiókodnál. Később megváltoztathatod, melyik a saját wikid.',
	'centralauth-list-attached-title'      => 'Csatolt felhasználói fiókok',
	'centralauth-list-attached'            => 'A(z) „$1” nevű felhasználói fiókok automatikusan csatolva lettek az egységesített felhasználói fiókhoz:',
	'centralauth-list-attached-dryrun'     => 'A(z) „$1” nevű felhasználói fiókok automatikusan csatolva lesznek az egységesített felhasználói fiókhoz:',
	'centralauth-list-unattached-title'    => 'Csatolatlan felhasználói fiókok',
	'centralauth-list-unattached'          => 'A(z) „$1” nevű felhasználói fiókról nem sikerült automatikusan megállapítani, hogy hozzád tartozik az alábbi oldalakon; valószínűleg más jelszóval rendelkeznek:',
	'centralauth-foreign-link'             => '$1 szerkesztő, $2',
	'centralauth-merge-method-primary'     => 'elsődleges wiki',
	'centralauth-merge-method-empty'       => 'nincsenek szerkesztések',
	'centralauth-merge-method-mail'        => 'megerősítve e-mailen keresztül',
	'centralauth-merge-method-password'    => 'megerősítve jelszóval',
	'centralauth-merge-method-admin'       => 'admin által egyesített azonosító',
	'centralauth-merge-method-new'         => 'új felhasználói fiók',
	'centralauth-merge-method-login'       => 'megerősítve bejelentkezéssel',
	'centralauth-finish-title'             => 'Egyesítés befejezése',
	'centralauth-finish-text'              => 'Ha ezek a felhasználói fiókok hozzád tartoznak, befejezheted az egységesítési folyamatot, úgy, hogy megadod a hozzájuk tartozó jelszavakat:',
	'centralauth-finish-password'          => 'Jelszó:',
	'centralauth-finish-login'             => 'Bejelentkezés',
	'centralauth-finish-send-confirmation' => 'E-mail jelszó',
	'centralauth-finish-problems'          => 'Problémád van, vagy ezek nem hozzád tartoznak? [[meta:Help:Unified login problems|Hogyan találhatsz segítséget]]…',
	'centralauth-finish-noconfirms'        => 'Egyetlen felhasználói fiókot sem sikerült megerősíteni ezzel a jelszóval.',
	'centralauth-finish-incomplete'        => 'Számos azonosítót összevontunk, mert ugyanez volt a jelszavuk.
Vannak további azonosítók, amik még nincsenek megerősítve.',
	'centralauth-merge-attempt'            => "'''A megadott jelszavak ellenőrzése a hátralévő, még nem egységesített felhasználói fiókoknál…'''",
	'centralauth-attach-list-attached'     => 'A(z) „$1” nevű egységesített felhasználói fiók a következőket tartalmazza:',
	'centralauth-attach-title'             => 'Felhasználói fiók megerősítése',
	'centralauth-attach-text'              => 'Ez a felhasználói fiók még nincs integrálva az egységesített fiókba. Ha a globális fiók a tied, egységesítheted azzal, hogy megadod a jelszavadat:',
	'centralauth-attach-submit'            => 'Felhasználói fiók költöztetése',
	'centralauth-attach-success'           => 'A felhasználói fiók sikeresen integrálva lett az egységesített fiókba.',
	'centralauth'                          => 'Egységes belépés adminisztrációja',
	'centralauth-admin-manage'             => 'Felhasználói adatok beállítása',
	'centralauth-admin-username'           => 'Felhasználói név:',
	'centralauth-admin-lookup'             => 'Felhasználói adatok megtekintése vagy szerkesztése',
	'centralauth-admin-permission'         => 'Csak helytartók integrálhatják más emberek számára a fiókjukat.',
	'centralauth-admin-no-unified'         => 'Ehhez a felhasználói névhez nem tartozik egységesített fiók.',
	'centralauth-admin-info-id'            => 'Azonosító:',
	'centralauth-admin-info-registered'    => 'Regisztráció ideje:',
	'centralauth-admin-info-locked'        => 'Lezárva:',
	'centralauth-admin-info-hidden'        => 'Rejtett:',
	'centralauth-admin-yes'                => 'igen',
	'centralauth-admin-no'                 => 'nem',
	'centralauth-admin-attached'           => 'Sikeresen egyesített fiókok',
	'centralauth-admin-unattached'         => 'Érintetlen fiókok',
	'centralauth-admin-no-unattached'      => 'Nincs több egységesítetlen fiók.',
	'centralauth-admin-list-localwiki'     => 'Helyi wiki',
	'centralauth-admin-list-attached-on'   => 'Csatolás dátuma',
	'centralauth-admin-list-method'        => 'Módszer',
	'centralauth-admin-unmerge'            => 'Kiválasztott integrálásának megszüntetése',
	'centralauth-admin-merge'              => 'Kiválasztott integrálása',
	'centralauth-admin-bad-input'          => 'Érvénytelen integrálandó kiválasztás',
	'centralauth-admin-none-selected'      => 'Nem volt módosítandó fiók kiválasztva.',
	'centralauth-admin-already-unmerged'   => '$1 kihagyása, már fel van oldva',
	'centralauth-admin-unmerge-success'    => '$1 felhasználói fiók sikeresen feloldva',
	'centralauth-admin-delete-title'       => 'Felhasználói fiók törölve',
	'centralauth-admin-delete-description' => 'A globális fiók törlésével minden globális beállítás törlődik, a helyi fiókok lecsatolódnak, és a globális név szabad marad más felhasználók számára.
Minden helyi fiók megmarad.
A helyi fiókok jelszavai visszaállnak az egyesítés előtti értékükre.',
	'centralauth-admin-delete-button'      => 'Felhasználói fiók törlése',
	'centralauth-admin-delete-success'     => '„<nowiki>$1</nowiki>” globális felhasználói fiókja sikeresen törölve.',
	'centralauth-admin-nonexistent'        => '„<nowiki>$1</nowiki>” nem rendelkezik globális felhasználói fiókkal',
	'centralauth-admin-delete-nonexistent' => 'Hiba: nem létezik globális felhasználói fiók „$1” néven.',
	'centralauth-token-mismatch'           => 'Sajnáljuk, nem tudtuk feldolgozni a küldött adatokat a munkamenet-adatok hiánya miatt',
	'centralauth-admin-lock-title'         => 'Fiók lezárása',
	'centralauth-admin-lock-description'   => 'A fiók lezárása után egyik wikiben sem lehet majd bejelentkezni vele.',
	'centralauth-admin-lock-button'        => 'Fiók lezárása',
	'centralauth-admin-lock-success'       => 'A(z) „<nowiki>$1</nowiki>” nevű globális fiók sikeresen lezárva.',
	'centralauth-admin-lock-nonexistent'   => 'Hiba: nem létezik „<nowiki>$1</nowiki>” nevű globális fiók.',
	'centralauth-admin-unlock-title'       => 'Fiók feloldása',
	'centralauth-admin-unlock-description' => 'A fiók feloldásával ismét lehetséges lesz belépni vele.',
	'centralauth-admin-unlock-button'      => 'Fiók feloldása',
	'centralauth-admin-unlock-success'     => 'Az „<nowiki>$1</nowiki>” nevű globális fiók sikeresen feloldva.',
	'centralauth-admin-unlock-nonexistent' => 'Hiba: nem létezik „<nowiki>$1</nowiki>” nevű globális fiók.',
	'centralauth-admin-reason'             => 'Ok:',
	'centralauth-seconds-ago'              => '$1 másodperccel ezelőtt',
	'centralauth-minutes-ago'              => '$1 perccel ezelőtt',
	'centralauth-hours-ago'                => '$1 órával ezelőtt',
	'centralauth-days-ago'                 => '$1 nappal ezelőtt',
	'centralauth-months-ago'               => '$1 hónappal ezelőtt',
	'centralauth-years-ago'                => '$1 évvel ezelőtt',
	'centralauth-prefs-status'             => 'Globális felhasználói fiók állapota:',
	'centralauth-prefs-not-managed'        => 'Nem használsz egységesített felhasználói fiókot',
	'centralauth-prefs-unattached'         => 'Nincs megerősítve',
	'centralauth-prefs-complete'           => 'Minden rendben!',
	'centralauth-prefs-migration'          => 'Költöztetés alatt',
	'centralauth-prefs-count-attached'     => 'A felhasználói fiókod $1 oldalon van használva.',
	'centralauth-prefs-count-unattached'   => '$1 nem megerősített felhasználói fiók van a neveddel $1 oldalon.',
	'centralauth-prefs-detail-unattached'  => 'Még nem lett megerősítve, hogy az oldal a globális felhasználói fiókodhoz tartozik.',
	'centralauth-prefs-manage'             => 'Globális felhasználói fiók beállítása',
	'centralauth-renameuser-abort'         => '<div class="errorbox">$1 nem nevezhető át helyben, mivel integrálva van az egységesített bejelentkezési rendszerbe.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">$2 felhasználót nem sikerült átnevezni: ez a felhaználónév le van foglalva egy globális azonosítóhoz.</div>',
	'centralauth-invalid-wiki'             => 'Nincs ilyen adatbázis: $1',
	'centralauth-account-exists'           => 'Nem sikerült új felhasználót létrehozni: az egységes bejelentkezési rendszerben már van ilyen felhasználónév.',
	'centralauth-log-name'                 => 'Globális fiók-kezelési napló',
	'centralauth-log-header'               => 'Ez a napló a globális felhasználói nevekhez kapcsolódó műveleteket (törlés, lezárás, feloldás) listázza.',
	'centralauth-log-entry-delete'         => 'törölte a(z) „<nowiki>$1</nowiki>” nevű globális fiókot',
	'centralauth-log-entry-lock'           => 'lezárta a(z) „<nowiki>$1</nowiki>” nevű globális fiókot',
	'centralauth-log-entry-unlock'         => 'feloldta a(z) „<nowiki>$1</nowiki>” nevű globális fiókot',
);

/** Indonesian (Bahasa Indonesia)
 * @author IvanLanin
 */
$messages['id'] = array(
	'mergeaccount' =>
		'Status penggabungan log masuk',
	'centralauth-desc' => 'Menggabungkan akun dari wiki-wiki Yayasan Wikimedia',
	'centralauth-merge-notlogged' =>
		'Harap <span class="plainlinks">' .
		'[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} masuk log]' .
		'</span> untuk mengecek apakah akun Anda telah sepenuhnya digabungkan.',
	'centralauth-merge-welcome' =>
		"'''Akun pengguna Anda belum dimigrasikan ke dalam sistem unifikasi log masuk Wikimedia.'''\n" .
		"\n" .
		"Jika Anda memilih untuk memigrasikan akun Anda, Anda dapat menggunakan " .
		"nama pengguna dan kata sandi yang sama untuk masuk log ke semua proyek wiki " .
		"Wikimedia pada semua bahasa yang tersedia.\n" .
		"Hal ini memudahkan untuk bekerja pada proyek berbagi seperti memuat berkas ke " .
		"[http://commons.wikimedia.org/ Wikimedia Commons] serta menghindari " .
		"kebingungan atau konflik yang mungkin muncul dari dua orang yang memiliki " .
		"nama pengguna sama pada proyek yang berbeda.\n" .
		"\n" .
		"Jika orang lain telah mengambil nama pengguna Anda pada situs lain, hal ini " .
		"tak akan mengganggu mereka, tapi nantinya akan memberikan Anda kesempatan untuk " .
		"memecahkan masalah ini dengan mereka atau pengurus.",
	'centralauth-merge-step1-title' => 'Mulai unifikasi log masuk',
	'centralauth-merge-step1-detail' =>
		'Kata sandi dan alamat surat-e Anda akan dicek dengan akun pada wiki lain ' .
		'untuk mengkonfirmasi kecocokannya. ' .
		'Perubahan tak akan dilakukan sampai Anda memberikan konfirmasi bahwa tak ada masalah.',
	'centralauth-merge-step1-submit' => 'Konfirmasi informasi log masuk',

	'centralauth-merge-step2-title' => 'Konfirmasi akun lain',
	'centralauth-merge-step2-detail' =>
		"Beberapa akun tak dapat secara otomatis dicocokkan dengan wiki awal yang dipilih. " .
		"Jika akun-akun ini milik Anda, Anda dapat mengkonfirmasikan kepemilikannya " .
		"dengan memberikan kata sandi mereka.\n",
	'centralauth-merge-step2-submit' => 'Konfirmasi informasi log masuk',
	'centralauth-merge-step3-title' => 'Buat akun gabungan',
	'centralauth-merge-step3-detail' => "Anda siap membuat akun gabungan Anda dengan wiki-wiki berikut:",
	'centralauth-merge-step3-submit' => 'Gabungkan akun',
	'centralauth-complete' => 'Penggabungan log masuk berhasil!',
	'centralauth-incomplete' => 'Penggabungan log masuk tidak berhasil!',
	'centralauth-complete-text' =>
		'Kini Anda dapat masuk log ke situs wiki Wikimedia manapun tanpa membuat ' .
		'akun baru; nama pengguna dan kata santi yang sama dapat digunakan ' .
		'di Wikipedia, Wiktionary, Wikibooks, dan proyek-proyek lainnya ' .
		'dalam semua bahasa.',
	'centralauth-incomplete-text' =>
		'Setelah log masuk Anda digabungkan, Anda akan dapat masuk log ke situs ' .
		'wiki Wikimedia manapun tanpa harus membuat akukn baru; nama pengguna ' .
		'dan kata sandi yang sama akan dapat digunakan di Wikipedia, Wiktionary, ' .
		'Wikibooks, dan proyek-proyek lainnya dalam semua bahasa.',
	'centralauth-not-owner-text' =>
		'Nama pengguna "$1" diberikan secara otomatis kepada pemilik akun ' .
		"$2.\n\n" .
		"Jika ini adalah Anda, Anda dapat menyelesaikan proses penggabungan log masuk " .
		"dengan hanya mengetikkan kata kunci utama untuk akun tersebut di sini:",
	'centralauth-notice-dryrun' =>
		"<div class='successbox'>Mode demo</div><br clear='all'/>",
	'centralauth-disabled-dryrun' =>
		"Penggabungan akun saat ini hanya berupa demo/debugging, " .
		"jadi operasi penggabungan yang sesungguhnya tak dilakukan. Mohon maaf!",
	'centralauth-readmore-text' =>
		":''[[meta:Help:Unified login|Baca lebih lanjut mengenai '''log masuk gabungan''']]...''",
	'centralauth-list-home-title' =>
		'Wiki asal',
	'centralauth-list-home-dryrun' =>
		'Kata sandi dan alamat surat=e pada wiki ini akan digunakan untuk akun gabungan Anda, ' .
		'dan halaman pengguna di sini akan secara otomatis ditautkan dari wiki lain. ' .
		"Anda dapat mengganti wiki asal Anda nanti.",
	'centralauth-list-attached-title' =>
		'Akun tergabung',
	'centralauth-list-attached' =>
		'Akun "$1" di situs-situs berikut telah digabung secara otomatis:' ,
	'centralauth-list-attached-dryrun' =>
		'Akun dengan nama "$1" pada masing-masing situs berikut secara otomatis ' .
		'akan disertakan dalam akun gabungan:',
	'centralauth-list-unattached-title' =>
		'Akun terpisah',
	'centralauth-list-unattached' =>
		'Akun "$1" tidak dapat dikonfirmasikan secara otomatis sebagai milik Anda ' .
		'di situs-situs berikut; kemungkinan besar karena mereka memiliki ' .
		'kata sandi yang berbeda dengan akun utama Anda:',
	'centralauth-foreign-link' =>
		'Pengguna $1 di $2',
	'centralauth-finish-title' =>
		'Selesaikan penggabungan',
	'centralauth-finish-text' =>
		'Jika akun-akun ini miliki Anda, Anda dapat menyelesaikan proses ' .
		'penggabungan hanya dengan mengetikkan kata sandi untuk akun lain di sini:',
	'centralauth-finish-password' =>
		'Kata sandi:',
	'centralauth-finish-login' =>
		'Masuk log',
	'centralauth-finish-send-confirmation' =>
		'Kirim kata sandi',
	'centralauth-finish-problems' =>
		"Ada masalah, atau tidak memiliki akun-akun lain tersebut? " .
		"[[meta:Help:Unified login problems|Bagaimana mendapat bantuan]]...",
	'centralauth-merge-attempt' =>
		"'''Mengecek kata sandi yang diberikan terhadap akun-akun yang belum " .
		"digabungkan...'''",
	'centralauth-attach-list-attached'     => 'Akun gabungan dengan nama "$1" mencakup akun-akun berikut:',
	'centralauth-attach-title'             => 'Konfirmasi akun',
	'centralauth-attach-text'              => 'Akun ini belum dimigrasikan ke akun gabungan. Jika akun global adalah milik Anda juga, Anda dapat menggabungkan akun ini jika Anda memasukkan kata sandi akun global:',
	'centralauth-attach-submit'            => 'Migrasi akun',
	'centralauth-attach-success'           => 'Akun berhasil dimigrasi ke akun gabungan.',
	'centralauth' => 'Pengelolaan log masuk gabungan',
	'centralauth-admin-manage' =>
		'Atur data pengguna',
	'centralauth-admin-username' =>
		'Nama pengguna:',
	'centralauth-admin-lookup' =>
		'Lihat atau ubah data pengguna',
	'centralauth-admin-permission' =>
		"Hanya steward yang dapat melakukan penggabungan akun orang lain.",
	'centralauth-admin-unmerge' =>
		'Batalkan penggabungan akun terpilih',
	'centralauth-admin-merge' =>
		'Gabungkan akun terpilih',
	'centralauth-admin-bad-input' =>
		'Pilihan penggabungan tak sah',
	'centralauth-admin-none-selected' =>
		'Tidak ada akun yang dipilih untuk diubah.',
	'centralauth-prefs-status' =>
		'Status akun global:',
	'centralauth-prefs-not-managed' =>
		'Tidak menggunakan akun gabungan',
	'centralauth-prefs-unattached' =>
		'Belum dikonfirmasi',
	'centralauth-prefs-complete' =>
		'Semua beres!',
	'centralauth-prefs-migration' =>
		'Proses migrasi',
	'centralauth-prefs-count-attached' =>
		'Akun Anda aktif pada $1 {{plural:$1|situs|situs}} proyek.',
	'centralauth-prefs-count-unattached' =>
		'Akun dengan nama Anda yang belum terkonfirmasi masih terdapat dalam $1 {{plural:$1|proyek|proyek}}.',
	'centralauth-prefs-detail-unattached' =>
		'Situs proyek ini belum dikonfirmasi sebagai bagian dari akun global.',
	'centralauth-prefs-manage' =>
		'Kelola akun global Anda',
	'centralauth-renameuser-abort' =>
		"<div class=\"errorbox\">" .
		"Tidak dapat mengganti nama pengguna lokal $1 karena nama pengguna ini telah " .
		"dimigrasikan ke sistem log masuk gabungan.</div>",
);

/** Icelandic (Íslenska)
 * @author S.Örvarr.S
 */
$messages['is'] = array(
	'centralauth-merge-step3-submit'       => 'Sameina aðganga',
	'centralauth-list-home-title'          => 'Heimawiki',
	'centralauth-foreign-link'             => 'Notandi $1 á $2',
	'centralauth-finish-password'          => 'Lykilorð:',
	'centralauth-finish-login'             => 'Innskráning',
	'centralauth-finish-send-confirmation' => 'Senda lykilorð í tölvupósti',
	'centralauth-admin-username'           => 'Notandanafn:',
);

/** Italian (Italiano)
 * @author Gianfranco
 * @author BrokenArrow
 * @author Cruccone
 * @author Siebrand
 */
$messages['it'] = array(
	'mergeaccount'                         => 'Processo di unificazione delle utenze - status',
	'centralauth-desc'                     => '[[Special:MergeAccount|Unifica gli account]] sui siti gestiti da Wikimedia Foundation',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Unifica più account]] per il Login Unico',
	'centralauth-merge-denied'             => 'Non si possiedono i permessi necessari per accedere a questa pagina.',
	'centralauth-merge-notlogged'          => 'Si prega di <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} effettuare il login]</span> per verificare se il processo di unificazione delle proprie utenze è completo.',
	'centralauth-merge-welcome'            => "'''Il tuo account utente non è ancora stato importato nel sistema di identificazione unificato di Wikimedia (Wikimedia's unified login system).''' Se decidi di unificare i tuoi account, potrai usare lo stesso nome utente e la stessa password per accedere a tutti i progetti wiki di Wikimedia in tutte le lingue disponibili. Questo faciliterà il lavoro con i progetti comuni, ad esempio caricare file su [http://commons.wikimedia.org/ Wikimedia Commons], ed eviterà la confusione ed i conflitti che nascerebbero se due o più utenti scegliessero lo stesso nome utente su più progetti. Se qualcun altro ha già preso il tuo nome utente su un altro sito, questo non lo disturberà, ma l'unificazione darà a te la possibilità di sottoporre in futuro il problema all'altro utente o ad un amministratore.",
	'centralauth-merge-step1-title'        => "Avvia l'unificazione dei login",
	'centralauth-merge-step1-detail'       => "La tua password e l'indirizzo e-mail registrato saranno ora controllati sugli account in altre wiki per confermare che corrispondano. Nessuna modifica sarà effettuata prima della tua conferma che tutto appare in regola.",
	'centralauth-merge-step1-submit'       => 'Conferma le informazioni per il login',
	'centralauth-merge-step2-title'        => 'Conferma altri account',
	'centralauth-merge-step2-detail'       => 'Non è stato possibile collegare automaticamente alcuni account a quello sulla tua wiki principale. Se sei il titolare di questi account, prova che ti appartengono indicando le password per ciascuno di essi.',
	'centralauth-merge-step2-submit'       => 'Conferma le informazioni di login',
	'centralauth-merge-dryrun-complete'    => 'È possibile unificare automaticamente tutti gli account esistenti.

Al momento non è stata apportata alcuna modifica agli account.',
	'centralauth-merge-dryrun-incomplete'  => 'Si è scelto di continuare anche se non è stato possibile verificare automaticamente alcuni account. Per tali account non verrà effettuata ora la migrazione; il processo di unificazione potrà essere completato in un secondo tempo.

Al momento non è stata apportata alcuna modifica agli account.',
	'centralauth-merge-dryrun-or'          => "'''oppure'''",
	'centralauth-merge-dryrun-home'        => "Il sistema di trasferimento non è stato in grado di verificare che questo utente sia il proprietario dell'account con lo stesso nome sulla wiki principale.

È stato rilevato che a questo nome utente corrisponde un account principale su un'altra wiki. Seguire il collegamento indicato di seguito ed affettuare l'accesso su quel sito per completare il trasferimento dei propri account.",
	'centralauth-merge-step3-title'        => "Crea l'account unificato",
	'centralauth-merge-step3-detail'       => 'È tutto pronto per creare il tuo account unificato sulle seguenti wiki:',
	'centralauth-merge-step3-submit'       => 'Unifica gli account',
	'centralauth-complete'                 => 'Il processo di unificazione delle utenze è stato completato.',
	'centralauth-incomplete'               => 'Il processo di unificazione delle utenze non è ancora stato completato.',
	'centralauth-complete-text'            => 'È ora possibile accedere a tutti i siti Wikimedia senza dover creare nuovi account; questo nome utente e questa password sono attivi su tutte le edizioni di Wikipedia, Wiktionary, Wikibooks, ecc. nelle varie lingue e su tutti i progetti correlati.',
	'centralauth-incomplete-text'          => 'Dopo aver unificato le proprie utenze, sarà possibile accedere a tutti i siti Wikimedia senza dover creare nuovi account; il nome utente e la password saranno attivi su tutte le edizioni di Wikipedia, Wiktionary, Wikibooks, ecc. nelle varie lingue e su tutti i progetti correlati.',
	'centralauth-not-owner-text'           => 'Il nome utente "$1" è stato assegnato automaticamente al titolare dell\'account con lo stesso nome sul progetto $2.

Se si è il titolare dell\'utenza, per terminare il processo di unificazione è sufficiente inserire la password principale di quell\'account qui di seguito:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Solo modalità Demo</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => "L'unificazione degli account attualmente può essere sperimentata solo in modalità ''demo'' o ''debugging'', quindi le operazioni di effettiva fusione dei dati sono disabilitate. Siamo spiacenti!",
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Per saperne di più sul '''login unico''']]...''",
	'centralauth-list-home-title'          => 'Wiki principale',
	'centralauth-list-home-dryrun'         => "La password e l'indirizzo e-mail registrati in questo wiki saranno usati per l'account unificato.
Potrai in seguito cambiare il tuo wiki principale.",
	'centralauth-list-attached-title'      => 'Account collegati',
	'centralauth-list-attached'            => 'Gli account con nome utente "$1" sui progetti elencati di seguito sono stati unificati automaticamente:',
	'centralauth-list-attached-dryrun'     => 'Gli account chiamati "$1" sui siti indicati di seguito saranno collegati automaticamente all\'account unificato:',
	'centralauth-list-unattached-title'    => 'Account non collegati',
	'centralauth-list-unattached'          => 'Non è stato possibile verificare automaticamente che gli account con nome utente "$1" sui progetti elencati di seguito appartengano allo stesso titolare; è probabile che sia stata usata una password diversa da quella dell\'account principale:',
	'centralauth-foreign-link'             => 'Utente $1 su $2',
	'centralauth-merge-method-primary'     => 'wiki principale',
	'centralauth-merge-method-empty'       => 'nessun contributo',
	'centralauth-merge-method-mail'        => 'confermato mediante e-mail',
	'centralauth-merge-method-password'    => 'confermato mediante password',
	'centralauth-merge-method-admin'       => 'account unificati da un amministratore',
	'centralauth-merge-method-new'         => 'nuovo account',
	'centralauth-merge-method-login'       => 'confermato mediante accesso',
	'centralauth-finish-title'             => 'Completa il processo di unificazione',
	'centralauth-finish-text'              => 'Se si è il titolare di queste utenze, per completare il processo di unificazione degli account è sufficiente inserire le password relative alle utenze stesse qui di seguito:',
	'centralauth-finish-password'          => 'Password:',
	'centralauth-finish-login'             => 'Esegui il login',
	'centralauth-finish-send-confirmation' => 'Invia password via e-mail',
	'centralauth-finish-problems'          => 'Se non si è il titolare di queste utenze, o se si incontrano altri problemi, si invita a consultare la [[meta:Help:Unified login problems|pagina di aiuto]]...',
	'centralauth-finish-noconfirms'        => 'Impossibile confermare degli account mediante questa password.',
	'centralauth-finish-incomplete'        => 'Sono stati unificati alcuni account mediante questa password. Sono presenti altri account in attesa di conferma.',
	'centralauth-merge-attempt'            => "'''Verifica della password inserita sulle utenze non ancora unificate...'''",
	'centralauth-attach-list-attached'     => "L'account unificato chiamato \"'''\$1'''\" include i seguenti account:",
	'centralauth-attach-title'             => "Conferma l'account",
	'centralauth-attach-text'              => "Questo account non è ancora stato collegato all'account unificato. Se sei il titolare dell'account globale, puoi collegare questo account inserendo la password dell'account globale:",
	'centralauth-attach-submit'            => "Collega l'account",
	'centralauth-attach-success'           => "L'account è stato trasferito all'account unificato.",
	'centralauth'                          => 'Amministrazione del login unificato',
	'centralauth-admin-manage'             => 'Gestione dati utente',
	'centralauth-admin-username'           => 'Nome utente',
	'centralauth-admin-lookup'             => 'Visualizza o modifica i dati utente',
	'centralauth-admin-permission'         => 'Solo gli steward possono unificare gli account altrui per loro conto.',
	'centralauth-admin-no-unified'         => 'Non esistono account unificati per questo nome utente.',
	'centralauth-admin-info-id'            => 'ID utente:',
	'centralauth-admin-info-registered'    => 'Registrato:',
	'centralauth-admin-info-locked'        => 'Bloccato:',
	'centralauth-admin-info-hidden'        => 'Nascosto:',
	'centralauth-admin-yes'                => 'sì',
	'centralauth-admin-no'                 => 'no',
	'centralauth-admin-attached'           => 'Account completamente unificati',
	'centralauth-admin-unattached'         => 'Account non collegati',
	'centralauth-admin-no-unattached'      => 'Non vi sono altri account privi di collegamento.',
	'centralauth-admin-list-localwiki'     => 'Wiki locale',
	'centralauth-admin-list-attached-on'   => 'Collegato il',
	'centralauth-admin-list-method'        => 'Metodo',
	'centralauth-admin-unmerge'            => 'Scollega gli account selezionati',
	'centralauth-admin-merge'              => 'Collega gli account selezionati',
	'centralauth-admin-bad-input'          => "Selezione per l'unificazione NON valida",
	'centralauth-admin-none-selected'      => 'Non sono stati selezionati account da modificare',
	'centralauth-admin-already-unmerged'   => 'Salto $1, già separato',
	'centralauth-admin-unmerge-success'    => '$1 account {{PLURAL:$2|separato|separati}} con successo',
	'centralauth-admin-delete-title'       => 'Elimina account',
	'centralauth-admin-delete-description' => "La cancellazione dell'account globale eliminerà tutte le preferenze globali, disgiungerà tutti gli account locali e lascerà il nome globale libero perché un altro utente lo prenda.
Tutti gli account locali continueranno ad esistere.
Le password per gli account locali create prima della fusione torneranno ai loro valori precedenti la fusione.",
	'centralauth-admin-delete-button'      => 'Elimina questo account',
	'centralauth-admin-delete-success'     => 'Account globale per "<nowiki>$1</nowiki>" eliminato con successo',
	'centralauth-admin-nonexistent'        => 'Non esiste un account globale per "<nowiki>$1</nowiki>"',
	'centralauth-seconds-ago'              => '$1 secondi fa',
	'centralauth-minutes-ago'              => '$1 minuti fa',
	'centralauth-hours-ago'                => '$1 ore fa',
	'centralauth-days-ago'                 => '$1 giorni fa',
	'centralauth-months-ago'               => '$1 mesi fa',
	'centralauth-years-ago'                => '$1 anni fa',
	'centralauth-prefs-status'             => "Situazione dell'account globale:",
	'centralauth-prefs-not-managed'        => 'Account unificato non in uso',
	'centralauth-prefs-unattached'         => 'Non confermato',
	'centralauth-prefs-complete'           => 'Tutto a posto!',
	'centralauth-prefs-migration'          => 'In corso di trasferimento',
	'centralauth-prefs-count-attached'     => 'Il tuo account è attivo su $1 siti di progetto.',
	'centralauth-prefs-count-unattached'   => 'Ci sono account non confermati con il tuo nome utente su $1 progetti.',
	'centralauth-prefs-detail-unattached'  => "Questo sito non è stato confermato come appartenente all'account globale.",
	'centralauth-prefs-manage'             => 'Gestione del tuo account globale',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Impossibile rinominare localmente l\'utente $1 perché questa utenza è stata trasferita al sistema unificato di identificazione (unified login system).</div>',
);

/** Japanese (日本語)
 * @author JtFuruhata
 * @author Marine-Blue
 * @author Broad-Sky
 */
$messages['ja'] = array(
	'mergeaccount'                         => '統一ログイン状態',
	'centralauth-desc'                     => 'ウィキメデイア財団が運営する各種ウィキの[[Special:MergeAccount|アカウント統合]]',
	'centralauth-mergeaccount-desc'        => 'シングルユーザーログインのための[[Special:MergeAccount|複数アカウント統合]]',
	'centralauth-merge-notlogged'          => 'あなたのアカウントが完全に統合されたかどうか、<span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} ログイン]</span>して試してください。',
	'centralauth-merge-welcome'            => "'''あなたのアカウントは、まだウィキメディア統一ログインシステムに移行していません。'''

このシステムにアカウントを移行すると、ウィキメディアが運営しているの全プロジェクトの全言語版ウィキで、同じユーザ名とパスワードを利用したログインを行うことができます。
これにより、[http://commons.wikimedia.org/ ウィキメディア・コモンズ]へのアップロードなどウィキメディアプロジェクトでの作業が容易になり、また別の人が別のプロジェクトで同じ名前を使うといった競合や混乱を回避することができます。

もし他の誰かが既にあなたのユーザ名を他のサイトで使っていた場合、そのユーザ名を統合することはできません。ただし、後にこの問題をその人や管理者と相談する事で解消することができるかも知れません。",
	'centralauth-merge-step1-title'        => '統一ログインの開始',
	'centralauth-merge-step1-detail'       => '他ウィキ上のアカウントと一致するかどうかの確認に備え、あなたのパスワード及び登録電子メールアドレスをチェックします。あなたが問題ないと確認するまで、いかなる変更も起こりません。',
	'centralauth-merge-step1-submit'       => 'ログイン情報の確認',
	'centralauth-merge-step2-title'        => '外部アカウントの確認',
	'centralauth-merge-step2-detail'       => 'いくつかのアカウントで、ホームウィキとの自動照合ができませんでした。もしこれらのアカウントがあなたのものである場合、パスワードを入力することによって自分のものであると証明できます。',
	'centralauth-merge-step2-submit'       => 'ログイン情報の確認',
	'centralauth-merge-step3-title'        => '統一アカウントの作成',
	'centralauth-merge-step3-detail'       => '以下のウィキに関連付けられた、あなたの統一アカウントの作成準備が完了しました:',
	'centralauth-merge-step3-submit'       => 'アカウントの統一',
	'centralauth-complete'                 => 'アカウントの統一が完了しました！',
	'centralauth-incomplete'               => 'アカウントの統一に失敗しました！',
	'centralauth-complete-text'            => 'ウィキペディアやウィクショナリー、ウィキブックスといったウィキメディアの姉妹プロジェクト全言語版に、新しいアカウントを作成せずとも、同じ利用者名とパスワードでログインすることが可能になりました。',
	'centralauth-incomplete-text'          => '統一アカウントを作成すると、ウィキペディアやウィクショナリー、ウィキブックスといったウィキメディアの姉妹プロジェクト全言語版に、新しいアカウントを作成せずとも、同じ利用者名とパスワードでログインすることが可能になります。',
	'centralauth-not-owner-text'           => '"$1" という利用者名は、アカウント $2 の利用者へ既に自動割当済みです。

もしこれがあなたであるならば、このアカウントのパスワードをここに入力することで、アカウント統一処理を簡単に完了することができます:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>デモモード限定</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'アカウントの統一は、現在デモ / デバッグモードとなっており、実際の統合操作は行われません。すみません！',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|詳しくは、'''統一ログイン'''をご覧ください]]...''",
	'centralauth-list-home-title'          => 'ホームウィキ',
	'centralauth-list-home-dryrun'         => 'このウィキで設定されたパスワードと電子メールアドレスは統一アカウントでも利用され、ここの利用者ページは他のウィキから自動的にリンクされます。どこをホームウィキにするかは、あとから変更することも可能です。',
	'centralauth-list-attached-title'      => '関連付けされるアカウント',
	'centralauth-list-attached'            => '以下に示すサイトの "$1" という名前のアカウントは、統一アカウントへ自動的に関連付けられます:',
	'centralauth-list-attached-dryrun'     => '以下に示すサイトの "$1" という名前のアカウントは、統一アカウントへ自動的に関連付けられる予定です:',
	'centralauth-list-unattached-title'    => '関連付けされないアカウント',
	'centralauth-list-unattached'          => '以下に示すサイトの "$1" という名前のアカウントは、最初に指定されたアカウントとパスワードが異なるため、あなたのアカウントとして自動承認されなかったようです:',
	'centralauth-foreign-link'             => '$2 上の利用者 $1',
	'centralauth-finish-title'             => '統合完了',
	'centralauth-finish-text'              => '以下のアカウントがあなたのものであるなら、それらのパスワードを入力することで、アカウント統一処理を簡単に完了することができます:',
	'centralauth-finish-password'          => 'パスワード:',
	'centralauth-finish-login'             => 'ログイン',
	'centralauth-finish-send-confirmation' => 'パスワードを電子メールで送信',
	'centralauth-finish-problems'          => 'トラブルが発生しました。本当にこれらはあなたのアカウントですか？
[[meta:Help:Unified login problems|ヘルプを確認してください]]...',
	'centralauth-merge-attempt'            => "'''まだ統合されていないアカウントに対するパスワードを確認中です...'''",
	'centralauth-attach-list-attached'     => '統一アカウント "$1" には、以下のアカウントが含まれます:',
	'centralauth-attach-title'             => 'アカウントの確認',
	'centralauth-attach-text'              => 'このアカウントは、まだ統一アカウントに移行していません。既に統一アカウントをお持ちの場合、そのパスワードを入力することで、このアカウントを統合することができます:',
	'centralauth-attach-submit'            => 'アカウントの統合',
	'centralauth-attach-success'           => 'このアカウントは、統一アカウントへ移行されました。',
	'centralauth'                          => '統一ログインの管理',
	'centralauth-admin-manage'             => '利用者データの管理',
	'centralauth-admin-username'           => '利用者名:',
	'centralauth-admin-lookup'             => '利用者データの閲覧/編集',
	'centralauth-admin-permission'         => '他人同士のアカウントを統合できるのは、スチュワードだけです。',
	'centralauth-admin-unmerge'            => '選択された利用者の統合を解除',
	'centralauth-admin-merge'              => '選択された利用者を統合',
	'centralauth-admin-bad-input'          => '統合の選択が不正です',
	'centralauth-admin-none-selected'      => '修正対象のアカウントがひとつも選択されていません。',
	'centralauth-prefs-status'             => '統一アカウントの状態:',
	'centralauth-prefs-not-managed'        => '統一アカウントを利用していません',
	'centralauth-prefs-unattached'         => '承認されていません',
	'centralauth-prefs-complete'           => '準備完了！',
	'centralauth-prefs-migration'          => '移行中',
	'centralauth-prefs-count-attached'     => 'あなたのアカウントは、$1プロジェクト{{plural:$1|サイト|サイト}}で有効です。',
	'centralauth-prefs-count-unattached'   => 'あなたの利用者名は、$1{{plural:$1|プロジェクト|プロジェクト}}で承認されていません。',
	'centralauth-prefs-detail-unattached'  => 'このプロジェクトサイトはまだ統一アカウントに承認されていません。',
	'centralauth-prefs-manage'             => '統一アカウントの管理',
	'centralauth-renameuser-abort'         => '<div class="errorbox">利用者 $1 は統一ログインシステムに移行済みのため、ローカルでの利用者名変更はできません。</div>',
);

/** Jutish (Jysk)
 * @author Huslåke
 * @author Ælsån
 * @author Siebrand
 */
$messages['jut'] = array(
	'mergeaccount'                         => 'Loĝ in unifikåsje ståt',
	'centralauth-desc'                     => '[[Special:MergeAccount|Merge bruger]] en Wikimedia Fundåsje wikier',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Merge multiiple bruger]] før Lænsøm Bruger Loĝ På',
	'centralauth-merge-denied'             => 'Unskyld, du harst ekke permisje til aksesær dette pæge.',
	'centralauth-merge-welcome'            => "'''Your bruger beretning har ikke endnu blevet migræne hen til Wikimedia's samlet login system.'''

Selv om jer gide hen til migræne jeres regnskab , du vil være i stand til hjælp den samme username og password hen til log i hen til al i Wikimedia's planlægge wikis i alt anvendelig sprogene. Indeværende gør sig lettere hen til operere med delt anlægsarbejder såsom sender hen til [http://commons.wikimedia.org/ Wikimedia Commons], og forhindrer den sammenblanding eller konflikt at kunne opstå af to folk piller den samme username oven på anderledes anlægsarbejder.

Selv om nogen ellers har allerede taget jeres username oven på en anden arbejdsplads indeværende vil ikke forstyrre sig , men sig vil indrømme jer en hændelse hen til beregne hos sig eller en administrator senere.",
	'centralauth-merge-step1-title'        => 'Bigynde login unifikåsje',
	'centralauth-merge-step1-detail'       => 'Jeres password og anbefalet e - indlevere henvende vil være kontrollerede imod den regnskab oven på anden wikis hen til bevidne rigtigheden af at de lige. Ikke forandringer vil finde sted indtil du har stadfæstet at sager lede meget vel.',
	'centralauth-merge-step1-submit'       => 'Konfirm login informåsje',
	'centralauth-merge-step2-title'        => 'Konfirm mær bruger',
	'centralauth-merge-step2-detail'       => 'Noget af den regnskab kunne være automatisk afstemt hen til den udpeget hjem wiki. Selv om disse regnskab henhøre til jer , jer kunne bevidne rigtigheden af at de er jeres af sørger for den password nemlig sig.',
	'centralauth-merge-step2-submit'       => 'Konfirm login informåsje',
	'centralauth-merge-step3-title'        => 'Skep unifisærn bruger',
	'centralauth-merge-step3-detail'       => 'Du erst klår til skep diin unifærn bruger, ve æ desbitreffede wiki attached:',
	'centralauth-merge-step3-submit'       => 'Unifær bruger',
	'centralauth-complete'                 => 'Login unifikåsje dun!',
	'centralauth-incomplete'               => 'Login unifikåsje udun!',
	'centralauth-complete-text'            => 'Jer kunne nu log i hen til hvilken som helst Wikimedia wiki arbejdsplads uden skaber en ny beretning ; den samme username og password vil arbejde med Wikipedia Wiktionary Wikibooks , og deres afdelingssygeplejersken anlægsarbejder i alt sprogene.',
	'centralauth-incomplete-text'          => 'Når først jeres login er samlet , jer vil være i stand til log i hen til hvilken som helst Wikimedia wiki arbejdsplads uden skaber en ny beretning ; den samme username og password vil arbejde med Wikipedia Wiktionary Wikibooks , og deres afdelingssygeplejersken anlægsarbejder i alt sprogene.',
	'centralauth-not-owner-text'           => 'Den username "$1" var automatisk bestemt hen til den indehaver i den beretning oven på $2.

Selv om indeværende er jer , jer kunne komme ind den login unification oparbejde simpelt hen ved at taste den lærer password nemlig at beretning her ovre :',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Demo mode ålen</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Beretning unification er aktuelle i en demonstration fejlretning måde , altså selve sammenfald operationer er uarbejdsdygtig. Bedrøvelig!',
	'centralauth-list-home-title'          => 'Jæm wiki',
	'centralauth-list-home-dryrun'         => 'Den password og e - indlevere henvende placere herover wiki vil være anvendte nemlig jeres samlet beretning.
Jer vil være i stand til lave om på hvilke er jeres hjem wiki senere.',
	'centralauth-list-attached-title'      => 'Attached bruger',
	'centralauth-list-attached'            => 'Den beretning benævnt "$1" oven på hver den næste steder nyde blevet automatisk attacheret den samlet beretning :',
	'centralauth-list-attached-dryrun'     => 'Den beretning benævnt "$1" oven på hver i den næste steder vil være automatisk attacheret den samlet beretning :',
	'centralauth-foreign-link'             => 'Bruger $1 åp $2',
	'centralauth-finish-password'          => 'Password:',
	'centralauth-finish-login'             => 'Loĝge på',
	'centralauth-finish-send-confirmation' => 'E-mail password',
	'centralauth-attach-title'             => 'Konfirmær bruger',
	'centralauth-attach-submit'            => 'Miigrær bruger',
	'centralauth-admin-username'           => 'Bruger:',
	'centralauth-prefs-unattached'         => 'Ukonfirmærn',
	'centralauth-prefs-complete'           => "I'n årdnenge!",
	'centralauth-prefs-migration'          => 'I migråsje',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Ken ekke hernåm bruger $1 lokål als dette brugernavn er migrærn til æ unifærn loĝge på sistæm.</div>',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 */
$messages['jv'] = array(
	'mergeaccount'                         => 'Status panggabungan log mlebu',
	'centralauth-desc'                     => '[[Special:MergeAccount|Nggabungaké rékening (akun)]] ing wiki-wiki Yayasan Wikimedia',
	'centralauth-merge-denied'             => 'Nuwun sèwu, panjenengan ora diparengaké niliki kaca iki.',
	'centralauth-merge-step1-title'        => 'Miwitana unifikasi log mlebu',
	'centralauth-merge-step1-submit'       => 'Dhedhesen (konfirmasi) log mlebu',
	'centralauth-merge-step2-title'        => 'Konfirmasi rékening (akun) liya',
	'centralauth-merge-step2-submit'       => 'Dhedhesen (konfirmasi) log mlebu',
	'centralauth-merge-dryrun-complete'    => 'Kabèh rékening utawa akun sing ana bisa digabung sacara otomatis!

Durung ana owah-owahan sing dilakoni saiki kanggo rékening panjenengan.',
	'centralauth-merge-dryrun-or'          => "'''utawa'''",
	'centralauth-merge-step3-title'        => 'Gawé rékening (akun) gabungan',
	'centralauth-merge-step3-detail'       => 'Panjenengan saiki wis siap nggawé rékening (akun) gabungan panjenengan mawa wiki-wiki sing kapacak ing ngisor iki:',
	'centralauth-merge-step3-submit'       => 'Gabungaké rékening (akun)',
	'centralauth-complete'                 => 'Panggabungan log mlebu suksès!',
	'centralauth-incomplete'               => 'Panggabungan log mlebu ora suksès!',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Modus démo</div><br clear='all'/>",
	'centralauth-list-home-title'          => 'Wiki asal',
	'centralauth-list-attached-title'      => 'Rékening (akun) sing digabung',
	'centralauth-list-unattached-title'    => 'Rékening sing kapisah',
	'centralauth-merge-method-primary'     => 'Wiki asal',
	'centralauth-merge-method-empty'       => 'ora ana sumbangsihé',
	'centralauth-merge-method-mail'        => 'pandhedhesan (konfirmasi) mawa e-mail',
	'centralauth-merge-method-password'    => 'didhedhes (dikonfirmasi) déning tembung sandhi',
	'centralauth-merge-method-new'         => 'akun utawa rékening anyar',
	'centralauth-merge-method-login'       => 'Didhedhes (konfirmasi) mawa log mlebu',
	'centralauth-finish-title'             => 'Rampungna panggabungan',
	'centralauth-finish-password'          => 'Tembung sandhi:',
	'centralauth-finish-login'             => 'Mlebu log',
	'centralauth-finish-send-confirmation' => 'Kirimna tembung sandhi per e-mail',
	'centralauth-finish-noconfirms'        => 'Ora ana rékening (akun) sing bisa dikonfirmasi nganggo tembung sandhi iki.',
	'centralauth-attach-title'             => 'Dhedhes (konfirmasi) rékening utawa akun',
	'centralauth-attach-submit'            => 'Hijrahna rékening (akun)',
	'centralauth-attach-success'           => 'Rékening (akun) iki bisa dihijrahaké menyang rékening gabungan.',
	'centralauth-admin-manage'             => 'Ngatur data panganggo',
	'centralauth-admin-username'           => 'Jeneng panganggo:',
	'centralauth-admin-lookup'             => 'Ndeleng utawa ngowahi data panganggo',
	'centralauth-admin-permission'         => "Namung para ''steward'' sing bisa nggabungaké rékening (akun) wong liya.",
	'centralauth-admin-info-id'            => 'ID panganggo:',
	'centralauth-admin-info-registered'    => 'Kadaftar:',
	'centralauth-admin-info-locked'        => 'Dikunci:',
	'centralauth-admin-info-hidden'        => 'Didelikaké:',
	'centralauth-admin-yes'                => 'inggih',
	'centralauth-admin-no'                 => 'ora',
	'centralauth-admin-list-localwiki'     => 'Wiki lokal',
	'centralauth-admin-list-method'        => 'Métode',
	'centralauth-admin-delete-title'       => 'Busak rékening',
	'centralauth-admin-delete-button'      => 'Busaken rékening (akun) iki',
	'centralauth-admin-delete-success'     => 'Bisa kasil mbusak rékening (akun) global kanggo "<nowiki>$1</nowiki>"',
	'centralauth-admin-nonexistent'        => 'Saiki ora ana rékening global kanggo "<nowiki>$1</nowiki>"',
	'centralauth-admin-lock-title'         => 'Kuncinen rékening',
	'centralauth-admin-lock-description'   => 'Yèn rékeningé dikunci, mengko ora bisa diaksès saka wiki apa waé.',
	'centralauth-admin-lock-button'        => 'Kuncinen rékening iki',
	'centralauth-admin-lock-success'       => 'Bisa suksès ngunci rékening global kanggo "<nowiki>$1</nowiki>"',
	'centralauth-admin-unlock-title'       => 'Buka kunci rékening',
	'centralauth-admin-unlock-description' => 'Yèn rékening iki kunciné dibuka, mengko bisa dienggo log mlebu manèh.',
	'centralauth-admin-unlock-button'      => 'Bukanen kunci rékening iki',
	'centralauth-admin-unlock-success'     => 'Bisa kasil buka kunci rékening global kanggo "<nowiki>$1</nowiki>"',
	'centralauth-admin-unlock-nonexistent' => 'Kaluputan: rékening global "<nowiki>$1</nowiki>" ora ana.',
	'centralauth-admin-reason'             => 'Alesan:',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|detik|detik}} kapungkur',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|menit|menit}} kapungkur',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|jam|jam}} kapungkur',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|dina|dina}} kapungkur',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|sasi|sasi}} kapungkur',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|taun|taun}} kapungkur',
	'centralauth-prefs-status'             => 'Status rékening (akun) global:',
	'centralauth-prefs-unattached'         => 'Ora dikonfirmasi',
	'centralauth-prefs-complete'           => 'Kabèh bèrès!',
	'centralauth-prefs-migration'          => 'Prosès migrasi',
	'centralauth-prefs-manage'             => 'Urusana rékening (akun) global panjenengan',
	'centralauth-account-exists'           => 'Ora bisa nggawé rékening: jeneng panganggo sing disuwun iki wis ana ing sistém log mlebu gabungan.',
	'centralauth-log-entry-delete'         => 'busak rékening global "<nowiki>$1</nowiki>"',
	'centralauth-log-entry-lock'           => 'kunci rékening global "<nowiki>$1</nowiki>"',
	'centralauth-log-entry-unlock'         => 'buka kunci rékening global "<nowiki>$1</nowiki>"',
);

$messages['kk-arab'] = array(
	'mergeaccount'                         => 'تىركەلگى بىرەگەيلەندىرۋ كۇيى',
	'centralauth-merge-notlogged'          => 'تىركەلگىلەرىڭىز تولىق بىرەگەيلەندىرۋىن تەكسەرۋ ٴۇشىن Please <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} كىرىڭىز]</span>.',
	'centralauth-merge-welcome'            => "'''قاتىسۋشى تىركەلگىڭىز Wikimedia بىرەگەيلەنگەن تىركەلگى جۇيەسىنە الىدە اۋىستىرىلمادى.'''

ەگەر تىركەلگىلەرىڭىزدى اۋىستىرۋدى تاڭداعان بولساڭىز, ٴبىر قاتىسۋشى اتىڭىز بەن قۇپىييا ٴسوزىڭىزدى پايدالانىپ بارلىق Wikimedia جوبالارىنىڭ بارلىق تىلدەرىندەگى ۋىيكىيلەرىنە كىرە الاسىز.
بۇل  [http://commons.wikimedia.org/ Wikimedia ورتاققورىنا] قوتارۋى سىيياقتى بولىسەتىن جوبالارمەن جۇمىس ىستەۋگە جەڭىلدىلىك بەرەدى, جانە ٴارتۇرلى جوبالاردا ەكى تۇلعا ٴبىر قاتىسۋشى اتىن پايدالانعاننان شىعاتىن بىلىقتى نە داۋ-جانجالدى بولدىرمايدى.

ەگەر باسقا بىرەۋ ٴسىزدىڭ قاتىسۋشى اتىڭىزدى باسقا تاراۋدا الداقاشان پايدالانىپ وتىرسا, بۇل وعان كەدەرگى كەلتىرمەيدى, بىراق بۇل سوڭىرا ولمەن نە اكىمشىمەن جۇمىسىن وتەۋدى بەرەدى.",
	'centralauth-merge-step1-title'        => 'تىركەلگى بىرەگەيلەندىرۋىن باستاۋ',
	'centralauth-merge-step1-detail'       => 'قاتىسۋشى اتىڭىز بەن تىركەلگەن ە-پوشتا جايڭىز سايكەستىگىن قۇپتاۋ ٴۇشىن باسقا ۋىيكىيلەردەگى تىركەلگىلەرگە قارسى تەكسەرىلەدى. بۇل نارسەلەر جارايتىنىن ٴوزىڭىز قۇپتاعانشا دەيىن ەش وزگەرىستەر جاسالمايدى.',
	'centralauth-merge-step1-submit'       => 'تىركەلگى مالىمەتتەرىن قۇپتاۋ',
	'centralauth-merge-step2-title'        => 'كوبىرەك تىركەلگىلەردى قۇپتاۋ',
	'centralauth-merge-step2-detail'       => 'تىركەلگىلەردىڭ كەيبىرەۋلەرى ەنگىزىلگەن مەكەن ۋىيكىيگە وزدىكتىك سايكەستىرىلمەدى. ەگەر وسى تىركەلگىلەر سىزدىكى بولسا, قۇپىييا سوزدەرىن كەلتىرىپ بۇنى قۇپتاي الاسىز.',
	'centralauth-merge-step2-submit'       => 'تىركەلگى مالىمەتتەرىن قۇپتاۋ',
	'centralauth-merge-step3-title'        => 'بىرەگەيلەنگەن تىركەلگى جاراتۋ',
	'centralauth-merge-step3-detail'       => 'كەلەسى ۋىيكىيلەردى تىركەمە ەتىپ, بىرەگەيلەنگەن تىركەلگىڭىزدى جاراتۋعا دايىنسىز:',
	'centralauth-merge-step3-submit'       => 'تىركەلگىلەردى بىرەگەيلەندىرۋ',
	'centralauth-complete'                 => 'تىركەلگى بىرەگەيلەندىرۋى ٴبىتتى!',
	'centralauth-incomplete'               => 'تىركەلگى بىرەگەيلەندىرۋى بىتكەن جوق!',
	'centralauth-complete-text'            => 'ەندى ارقايسى Wikimedia قورىنىڭ ۋىيكىي تورابىنا جاڭا تىركەلگى جاساماستان كىرۋىڭىزگە بولادى; ٴدال وسى قاتىسۋشى اتىڭىز بەن قۇپىييا ٴسوزىڭىز ۋىيكىيپەدىييا, ۋىيكىيسوزدىك, ۋىيكىيكىتاپ دەگەن جوبالاردا جانە بارلىق  تىلدەردەگى تارۋلارىندا قىزمەت ىستەيدى.',
	'centralauth-incomplete-text'          => 'تىركەلگىڭىز بىرەگەيلەندىرىگەننەن باستاپ ارقايسى Wikimedia قورىنىڭ ۋىيكىي تورابىنا جاڭا تىركەلگى جاساماستان كىرۋىڭىزگە بولادى; ٴدال وسى قاتىسۋشى اتىڭىز بەن قۇپىييا ٴسوزىڭىز ۋىيكىيپەدىييا, ۋىيكىيسوزدىك, ۋىيكىيكىتاپ, دەگەن جوبالاردا جانە بارلىق تىلدەردەگى تارۋلارىندا قىزمەت ىستەيدى.',
	'centralauth-not-owner-text'           => '«$1» قاتىسۋشى اتى $2 دەگەندەگى تىركەلگى ىييەسىنە وزدىكتىك تۇيىستىرىلگەن.

بۇل ٴوزىڭىز بولساڭىز, باسقى قۇپىييا ٴسوزىڭىزدى كادىمگىدەي مىندا ەنگىزىپ تىركەلگى بىرەگەيلەندىرۋ ٴۇدىرىسىن بىتىرۋىڭىزگە بولادى:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>تەك تانىسۋ ٴادىسى</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'تىركەلگى بىرەگەيلەندىرۋى اعىمدا كورسەتۋ / مىنەتۋ كۇيىندە تۇر, سونىمەن كوكەيكەستى ٴتۇيىستىرۋ ارەكەتتەرى وشىرىلگەن. عافۋ ەتىڭىز!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|'''بىرەگەيلەندىرىلگەن تىركەلگى''' تۋرالى كوبىرەك وقىڭىز]]...''",
	'centralauth-list-home-title'          => 'مەكەن ۋىيكىي',
	'centralauth-list-home-dryrun'         => 'بۇل ۋىيكىيدەگى تاعايىندالعان قۇپىييا ٴسوز بەن ە-پوشتا جايى بىرەگەيلەنگەن تىركەلگىڭىزگە پايدالانادى, جانە جەكە بەتىڭىز باسقا ۋىيكىيلەرگە وزدىكتىك سىلتەنەدى. قاي ۋىيكىيى مەكەن ەكەن دەپ سوڭىرا  وزگەرتە الاسىز.',
	'centralauth-list-attached-title'      => 'تىركەمە ەتىلگەن تىركەلگىلەر',
	'centralauth-list-attached'            => '«$1» دەپ اتالعان تىركەلگىسى ارقايسى كەلەسى توراپتاردا بىرەگەيلەنگەن تىركەلىگە وزدىكتىك تىركەمە ەتىلگەن:',
	'centralauth-list-attached-dryrun'     => '«$1» دەپ اتالعان تىركەلگىسى ارقايسى كەلەسى توراپتاردا بىرەگەيلەنگەن تىركەلىگە وزدىكتىك تىركەمە ەتىلەدى:',
	'centralauth-list-unattached-title'    => 'تىركەمە ەتىلمەگەن تىركەلگىلەر',
	'centralauth-list-unattached'          => '«$1» دەگەن تىركەلگى كەلەسى توراپتاردا سىزگە ٴتان دەپ وزدىكتىك قۇپتالمادى; بۇلاردا باسقى تىركەلگىدەگى قۇپىييا سوزدەن ايىرماشىلىقتارى بار بولۋى ەڭ ىيقتىيمال:',
	'centralauth-foreign-link'             => '$2 دەگەندەگى $1 قاتىسۋشىسى',
	'centralauth-finish-title'             => 'ٴتۇيىستىرىلۋ ٴبىتۋى',
	'centralauth-finish-text'              => 'بۇل تىركەلگىلەر سىزگە ٴتان بولسا, قۇپىييا سوزىدەرڭىزدى باسقا تىركەلگىلەرىڭىزگە كادىمگىدەي مىندا ەنگىزىپ تىركەلگى بىرەگەيلەندىرۋىن بىتىرۋڭىزگە بولادى:',
	'centralauth-finish-password'          => 'قۇپىييا ٴسوز:',
	'centralauth-finish-login'             => 'كىرۋ',
	'centralauth-finish-send-confirmation' => 'قۇپىييا ٴسوزدى حاتپەن جىبەرۋ',
	'centralauth-finish-problems'          => 'قىيىن جاعدايعا ۇشىرادىڭىز, نەمەسە باسقا تىركەلگىلەر سىزدىكى ەمەس? [[meta:Help:Unified login problems|قالاي انىقتالۋىڭىزعا بولادى]]...',
	'centralauth-merge-attempt'            => "'''كەلتىرىلگەن قۇپىييا ٴسوزدى قالعان تۇيىستىرىلمەگەن تىركەلگىلەر ٴۇشىن تەكسەرۋدە…'''",
	'centralauth-attach-list-attached'     => '«$1» دەپ اتالعان بىرەگەيلەنگەن تىركەلگىگە كەلەسى تىركەلگىلەر ەنگەن:',
	'centralauth-attach-title'             => 'تىركەلگىنى قۇپتاۋ',
	'centralauth-attach-text'              => 'بۇل تىركەلگى ٴالى دە بىرەگەيلەنگەن تىركەلگىگە اۋىستىرىلماعان. ەگەر عالامدىق تىركەلگى دە سىزگە ٴتان بولسا, عالامدىق تىركەلگىنىڭ قۇپىييا ٴسوزىن ەنگىزىپ بۇل تىركەلگىنى تۇيىستىرۋىڭىزگە بولادى:',
	'centralauth-attach-submit'            => 'تىركەلگىنى اۋىستىرتۋ',
	'centralauth-attach-success'           => 'وسى تىركەلگى بىرەگەيلەنگەن تىركەلگىگە اۋىcتىرىلدى.',
	'centralauth'                          => 'بىرەگەيلەندىرگەن تىركەلگىلەردى اكىمشىلىك مەڭگەرۋى',
	'centralauth-admin-manage'             => 'قاتىسۋشى دەرەكتەرىن رەتتەۋ',
	'centralauth-admin-username'           => 'قاتىسۋشى اتى:',
	'centralauth-admin-lookup'             => 'قاتىسۋشى دەرەكتەرىن قاراۋ نە وڭدەۋ',
	'centralauth-admin-permission'         => 'باسقالاردىڭ تىركەلگىلەرىن بۇعان تەك جەتەكشىلەر تۇيىستىرىلەيدى.',
	'centralauth-admin-unmerge'            => 'بولەكتەنگەندى تۇيىستىرىلەمە',
	'centralauth-admin-merge'              => 'بولەكتەنگەندى تۇيىستىرلە',
	'centralauth-admin-bad-input'          => 'ٴتۇيىستىرلۋ بولەكتەنۋى جارامسىز',
	'centralauth-admin-none-selected'      => 'تۇرلەندىرۋ ٴۇشىن ەش تىركەلگى بولەكتەنبەگەن.',
	'centralauth-prefs-status'             => 'عالامدىق تىركەلگىنىڭ كۇيى:',
	'centralauth-prefs-not-managed'        => 'بىرەگەيلەنگەن تىركەلگىسى پايدالانۋسىز',
	'centralauth-prefs-unattached'         => 'قۇپتالماعان',
	'centralauth-prefs-complete'           => 'بارلىعى رەتتەلىنگەن!',
	'centralauth-prefs-migration'          => 'اۋىستىرىلۋدا',
	'centralauth-prefs-count-attached'     => 'تىركەلگىڭىز $1 جوبا {{plural:$1|تورابىندا|توراپتارىندا}} بەلسەندى بولدى.',
	'centralauth-prefs-count-unattached'   => 'ٴسىزدىڭ اتىڭىز بار قۇپتالماعان تىركەلگىلەر $1 {{plural:$1|جوبادا|جوبالاردا}} قالدى.',
	'centralauth-prefs-detail-unattached'  => 'وسى جوبا تورابى عالامدىق تىركەلگىگە ٴتان دەپ قۇپتالماعان.',
	'centralauth-prefs-manage'             => 'عالامدىق تىركەلگىڭىزدى رەتتەۋ',
	'centralauth-renameuser-abort'         => '<div class="errorbox">$1 قاتىسۋشىسىن جەرگىلىكتە قايتا اتاۋعا بولمايدى. بۇل قاتىسۋشى اتى بىرەگەيلەنگەن تىركەلگى جۇيەسىنە اۋىستىرىلعان.</div>',
);

$messages['kk-cyrl'] = array(
	'mergeaccount'                         => 'Тіркелгі бірегейлендіру күйі',
	'centralauth-merge-notlogged'          => 'Тіркелгілеріңіз толық бірегейлендіруін тексеру үшін Please <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} кіріңіз]</span>.',
	'centralauth-merge-welcome'            => "'''Қатысушы тіркелгіңіз Wikimedia бірегейленген тіркелгі жүйесіне әліде ауыстырылмады.'''

Егер тіркелгілеріңізді ауыстыруды таңдаған болсаңыз, бір қатысушы атыңыз бен құпия сөзіңізді пайдаланып барлық Wikimedia жобаларының барлық тілдеріндегі уикилеріне кіре аласыз.
Бұл  [http://commons.wikimedia.org/ Wikimedia Ортаққорына] қотаруы сияқты бөлісетін жобалармен жұмыс істеуге жеңілділік береді, және әртүрлі жобаларда екі тұлға бір қатысушы атын пайдаланғаннан шығатын былықты не дау-жанжалды болдырмайды.

Егер басқа біреу сіздің қатысушы атыңызды басқа тарауда алдақашан пайдаланып отырса, бұл оған кедергі келтірмейді, бірақ бұл соңыра олмен не әкімшімен жұмысын өтеуді береді.",
	'centralauth-merge-step1-title'        => 'Тіркелгі бірегейлендіруін бастау',
	'centralauth-merge-step1-detail'       => 'Қатысушы атыңыз бен тіркелген е-пошта жайңыз сәйкестігін құптау үшін басқа уикилердегі тіркелгілерге қарсы тексеріледі. Бұл нәрселер жарайтынын өзіңіз құптағанша дейін еш өзгерістер жасалмайды.',
	'centralauth-merge-step1-submit'       => 'Тіркелгі мәліметтерін құптау',
	'centralauth-merge-step2-title'        => 'Көбірек тіркелгілерді құптау',
	'centralauth-merge-step2-detail'       => 'Тіркелгілердің кейбіреулері енгізілген мекен уикиге өздіктік сәйкестірілмеді. Егер осы тіркелгілер сіздікі болса, құпия сөздерін келтіріп бұны құптай аласыз.',
	'centralauth-merge-step2-submit'       => 'Тіркелгі мәліметтерін құптау',
	'centralauth-merge-step3-title'        => 'Бірегейленген тіркелгі жарату',
	'centralauth-merge-step3-detail'       => 'Келесі уикилерді тіркеме етіп, бірегейленген тіркелгіңізді жаратуға дайынсыз:',
	'centralauth-merge-step3-submit'       => 'Тіркелгілерді бірегейлендіру',
	'centralauth-complete'                 => 'Тіркелгі бірегейлендіруі бітті!',
	'centralauth-incomplete'               => 'Тіркелгі бірегейлендіруі біткен жоқ!',
	'centralauth-complete-text'            => 'Енді әрқайсы Wikimedia қорының уики торабына жаңа тіркелгі жасамастан кіруіңізге болады; дәл осы қатысушы атыңыз бен құпия сөзіңіз Уикипедия, Уикисөздік, Уикикітәп деген жобаларда және барлық  тілдердегі таруларында қызмет істейді.',
	'centralauth-incomplete-text'          => 'Тіркелгіңіз бірегейлендірігеннен бастап әрқайсы Wikimedia қорының уики торабына жаңа тіркелгі жасамастан кіруіңізге болады; дәл осы қатысушы атыңыз бен құпия сөзіңіз Уикипедия, Уикисөздік, Уикикітәп, деген жобаларда және барлық тілдердегі таруларында қызмет істейді.',
	'centralauth-not-owner-text'           => '«$1» қатысушы аты $2 дегендегі тіркелгі иесіне өздіктік түйістірілген.

Бұл өзіңіз болсаңыз, басқы құпия сөзіңізді кәдімгідей мында енгізіп тіркелгі бірегейлендіру үдірісін бітіруіңізге болады:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Тек танысу әдісі</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Тіркелгі бірегейлендіруі ағымда көрсету / мінету күйінде тұр, сонымен көкейкесті түйістіру әрекеттері өшірілген. Ғафу етіңіз!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|'''Бірегейлендірілген тіркелгі''' туралы көбірек оқыңыз]]...''",
	'centralauth-list-home-title'          => 'Мекен уики',
	'centralauth-list-home-dryrun'         => 'Бұл уикидегі тағайындалған құпия сөз бен е-пошта жайы бірегейленген тіркелгіңізге пайдаланады, және жеке бетіңіз басқа уикилерге өздіктік сілтенеді. Қай уикиі мекен екен деп соңыра  өзгерте аласыз.',
	'centralauth-list-attached-title'      => 'Тіркеме етілген тіркелгілер',
	'centralauth-list-attached'            => '«$1» деп аталған тіркелгісі әрқайсы келесі тораптарда бірегейленген тіркеліге өздіктік тіркеме етілген:',
	'centralauth-list-attached-dryrun'     => '«$1» деп аталған тіркелгісі әрқайсы келесі тораптарда бірегейленген тіркеліге өздіктік тіркеме етіледі:',
	'centralauth-list-unattached-title'    => 'Тіркеме етілмеген тіркелгілер',
	'centralauth-list-unattached'          => '«$1» деген тіркелгі келесі тораптарда сізге тән деп өздіктік құпталмады; бұларда басқы тіркелгідегі құпия сөзден айырмашылықтары бар болуы ең иқтимал:',
	'centralauth-foreign-link'             => '$2 дегендегі $1 қатысушысы',
	'centralauth-finish-title'             => 'Түйістірілу бітуі',
	'centralauth-finish-text'              => 'Бұл тіркелгілер сізге тән болса, құпия сөзідерңізді басқа тіркелгілеріңізге кәдімгідей мында енгізіп тіркелгі бірегейлендіруін бітіруңізге болады:',
	'centralauth-finish-password'          => 'Құпия сөз:',
	'centralauth-finish-login'             => 'Кіру',
	'centralauth-finish-send-confirmation' => 'Құпия сөзді хатпен жіберу',
	'centralauth-finish-problems'          => 'Қиын жағдайға ұшырадыңыз, немесе басқа тіркелгілер сіздікі емес? [[meta:Help:Unified login problems|Қалай анықталуыңызға болады]]...',
	'centralauth-merge-attempt'            => "'''Келтірілген құпия сөзді қалған түйістірілмеген тіркелгілер үшін тексеруде…'''",
	'centralauth-attach-list-attached'     => '«$1» деп аталған бірегейленген тіркелгіге келесі тіркелгілер енген:',
	'centralauth-attach-title'             => 'Тіркелгіні құптау',
	'centralauth-attach-text'              => 'Бұл тіркелгі әлі де бірегейленген тіркелгіге ауыстырылмаған. Егер ғаламдық тіркелгі де сізге тән болса, ғаламдық тіркелгінің құпия сөзін енгізіп бұл тіркелгіні түйістіруіңізге болады:',
	'centralauth-attach-submit'            => 'Тіркелгіні ауыстырту',
	'centralauth-attach-success'           => 'Осы тіркелгі бірегейленген тіркелгіге ауыcтырылды.',
	'centralauth'                          => 'Бірегейлендірген тіркелгілерді әкімшілік меңгеруі',
	'centralauth-admin-manage'             => 'Қатысушы деректерін реттеу',
	'centralauth-admin-username'           => 'Қатысушы аты:',
	'centralauth-admin-lookup'             => 'Қатысушы деректерін қарау не өңдеу',
	'centralauth-admin-permission'         => 'Басқалардың тіркелгілерін бұған тек жетекшілер түйістірілейді.',
	'centralauth-admin-unmerge'            => 'Бөлектенгенді түйістірілеме',
	'centralauth-admin-merge'              => 'Бөлектенгенді түйістірле',
	'centralauth-admin-bad-input'          => 'Түйістірлу бөлектенуі жарамсыз',
	'centralauth-admin-none-selected'      => 'Түрлендіру үшін еш тіркелгі бөлектенбеген.',
	'centralauth-prefs-status'             => 'Ғаламдық тіркелгінің күйі:',
	'centralauth-prefs-not-managed'        => 'Бірегейленген тіркелгісі пайдаланусыз',
	'centralauth-prefs-unattached'         => 'Құпталмаған',
	'centralauth-prefs-complete'           => 'Барлығы реттелінген!',
	'centralauth-prefs-migration'          => 'Ауыстырылуда',
	'centralauth-prefs-count-attached'     => 'Тіркелгіңіз $1 жоба {{plural:$1|торабында|тораптарында}} белсенді болды.',
	'centralauth-prefs-count-unattached'   => 'Сіздің атыңыз бар құпталмаған тіркелгілер $1 {{plural:$1|жобада|жобаларда}} қалды.',
	'centralauth-prefs-detail-unattached'  => 'Осы жоба торабы ғаламдық тіркелгіге тән деп құпталмаған.',
	'centralauth-prefs-manage'             => 'Ғаламдық тіркелгіңізді реттеу',
	'centralauth-renameuser-abort'         => '<div class="errorbox">$1 қатысушысын жергілікте қайта атауға болмайды. Бұл қатысушы аты бірегейленген тіркелгі жүйесіне ауыстырылған.</div>',
);

$messages['kk-latn'] = array(
	'mergeaccount'                         => 'Tirkelgi biregeýlendirw küýi',
	'centralauth-merge-notlogged'          => 'Tirkelgileriñiz tolıq biregeýlendirwin tekserw üşin Please <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} kiriñiz]</span>.',
	'centralauth-merge-welcome'            => "'''Qatıswşı tirkelgiñiz Wikimedia biregeýlengen tirkelgi jüýesine älide awıstırılmadı.'''

Eger tirkelgileriñizdi awıstırwdı tañdağan bolsañız, bir qatıswşı atıñız ben qupïya söziñizdi paýdalanıp barlıq Wikimedia jobalarınıñ barlıq tilderindegi wïkïlerine kire alasız.
Bul  [http://commons.wikimedia.org/ Wikimedia Ortaqqorına] qotarwı sïyaqtı bölisetin jobalarmen jumıs istewge jeñildilik beredi, jäne ärtürli jobalarda eki tulğa bir qatıswşı atın paýdalanğannan şığatın bılıqtı ne daw-janjaldı boldırmaýdı.

Eger basqa birew sizdiñ qatıswşı atıñızdı basqa tarawda aldaqaşan paýdalanıp otırsa, bul oğan kedergi keltirmeýdi, biraq bul soñıra olmen ne äkimşimen jumısın ötewdi beredi.",
	'centralauth-merge-step1-title'        => 'Tirkelgi biregeýlendirwin bastaw',
	'centralauth-merge-step1-detail'       => 'Qatıswşı atıñız ben tirkelgen e-poşta jaýñız säýkestigin quptaw üşin basqa wïkïlerdegi tirkelgilerge qarsı tekseriledi. Bul närseler jaraýtının öziñiz quptağanşa deýin eş özgerister jasalmaýdı.',
	'centralauth-merge-step1-submit'       => 'Tirkelgi mälimetterin quptaw',
	'centralauth-merge-step2-title'        => 'Köbirek tirkelgilerdi quptaw',
	'centralauth-merge-step2-detail'       => 'Tirkelgilerdiñ keýbirewleri engizilgen meken wïkïge özdiktik säýkestirilmedi. Eger osı tirkelgiler sizdiki bolsa, qupïya sözderin keltirip bunı quptaý alasız.',
	'centralauth-merge-step2-submit'       => 'Tirkelgi mälimetterin quptaw',
	'centralauth-merge-step3-title'        => 'Biregeýlengen tirkelgi jaratw',
	'centralauth-merge-step3-detail'       => 'Kelesi wïkïlerdi tirkeme etip, biregeýlengen tirkelgiñizdi jaratwğa daýınsız:',
	'centralauth-merge-step3-submit'       => 'Tirkelgilerdi biregeýlendirw',
	'centralauth-complete'                 => 'Tirkelgi biregeýlendirwi bitti!',
	'centralauth-incomplete'               => 'Tirkelgi biregeýlendirwi bitken joq!',
	'centralauth-complete-text'            => 'Endi ärqaýsı Wikimedia qorınıñ wïkï torabına jaña tirkelgi jasamastan kirwiñizge boladı; däl osı qatıswşı atıñız ben qupïya söziñiz Wïkïpedïya, Wïkïsözdik, Wïkïkitäp degen jobalarda jäne barlıq  tilderdegi tarwlarında qızmet isteýdi.',
	'centralauth-incomplete-text'          => 'Tirkelgiñiz biregeýlendirigennen bastap ärqaýsı Wikimedia qorınıñ wïkï torabına jaña tirkelgi jasamastan kirwiñizge boladı; däl osı qatıswşı atıñız ben qupïya söziñiz Wïkïpedïya, Wïkïsözdik, Wïkïkitäp, degen jobalarda jäne barlıq tilderdegi tarwlarında qızmet isteýdi.',
	'centralauth-not-owner-text'           => '«$1» qatıswşı atı $2 degendegi tirkelgi ïesine özdiktik tüýistirilgen.

Bul öziñiz bolsañız, basqı qupïya söziñizdi kädimgideý mında engizip tirkelgi biregeýlendirw üdirisin bitirwiñizge boladı:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Tek tanısw ädisi</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Tirkelgi biregeýlendirwi ağımda körsetw / minetw küýinde tur, sonımen kökeýkesti tüýistirw äreketteri öşirilgen. Ğafw etiñiz!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|'''Biregeýlendirilgen tirkelgi''' twralı köbirek oqıñız]]...''",
	'centralauth-list-home-title'          => 'Meken wïkï',
	'centralauth-list-home-dryrun'         => 'Bul wïkïdegi tağaýındalğan qupïya söz ben e-poşta jaýı biregeýlengen tirkelgiñizge paýdalanadı, jäne jeke betiñiz basqa wïkïlerge özdiktik siltenedi. Qaý wïkïi meken eken dep soñıra  özgerte alasız.',
	'centralauth-list-attached-title'      => 'Tirkeme etilgen tirkelgiler',
	'centralauth-list-attached'            => '«$1» dep atalğan tirkelgisi ärqaýsı kelesi toraptarda biregeýlengen tirkelige özdiktik tirkeme etilgen:',
	'centralauth-list-attached-dryrun'     => '«$1» dep atalğan tirkelgisi ärqaýsı kelesi toraptarda biregeýlengen tirkelige özdiktik tirkeme etiledi:',
	'centralauth-list-unattached-title'    => 'Tirkeme etilmegen tirkelgiler',
	'centralauth-list-unattached'          => '«$1» degen tirkelgi kelesi toraptarda sizge tän dep özdiktik quptalmadı; bularda basqı tirkelgidegi qupïya sözden aýırmaşılıqtarı bar bolwı eñ ïqtïmal:',
	'centralauth-foreign-link'             => '$2 degendegi $1 qatıswşısı',
	'centralauth-finish-title'             => 'Tüýistirilw bitwi',
	'centralauth-finish-text'              => 'Bul tirkelgiler sizge tän bolsa, qupïya söziderñizdi basqa tirkelgileriñizge kädimgideý mında engizip tirkelgi biregeýlendirwin bitirwñizge boladı:',
	'centralauth-finish-password'          => 'Qupïya söz:',
	'centralauth-finish-login'             => 'Kirw',
	'centralauth-finish-send-confirmation' => 'Qupïya sözdi xatpen jiberw',
	'centralauth-finish-problems'          => 'Qïın jağdaýğa uşıradıñız, nemese basqa tirkelgiler sizdiki emes? [[meta:Help:Unified login problems|Qalaý anıqtalwıñızğa boladı]]...',
	'centralauth-merge-attempt'            => "'''Keltirilgen qupïya sözdi qalğan tüýistirilmegen tirkelgiler üşin tekserwde…'''",
	'centralauth-attach-list-attached'     => '«$1» dep atalğan biregeýlengen tirkelgige kelesi tirkelgiler engen:',
	'centralauth-attach-title'             => 'Tirkelgini quptaw',
	'centralauth-attach-text'              => 'Bul tirkelgi äli de biregeýlengen tirkelgige awıstırılmağan. Eger ğalamdıq tirkelgi de sizge tän bolsa, ğalamdıq tirkelginiñ qupïya sözin engizip bul tirkelgini tüýistirwiñizge boladı:',
	'centralauth-attach-submit'            => 'Tirkelgini awıstırtw',
	'centralauth-attach-success'           => 'Osı tirkelgi biregeýlengen tirkelgige awıctırıldı.',
	'centralauth'                          => 'Biregeýlendirgen tirkelgilerdi äkimşilik meñgerwi',
	'centralauth-admin-manage'             => 'Qatıswşı derekterin rettew',
	'centralauth-admin-username'           => 'Qatıswşı atı:',
	'centralauth-admin-lookup'             => 'Qatıswşı derekterin qaraw ne öñdew',
	'centralauth-admin-permission'         => 'Basqalardıñ tirkelgilerin buğan tek jetekşiler tüýistirileýdi.',
	'centralauth-admin-unmerge'            => 'Bölektengendi tüýistirileme',
	'centralauth-admin-merge'              => 'Bölektengendi tüýistirle',
	'centralauth-admin-bad-input'          => 'Tüýistirlw bölektenwi jaramsız',
	'centralauth-admin-none-selected'      => 'Türlendirw üşin eş tirkelgi bölektenbegen.',
	'centralauth-prefs-status'             => 'Ğalamdıq tirkelginiñ küýi:',
	'centralauth-prefs-not-managed'        => 'Biregeýlengen tirkelgisi paýdalanwsız',
	'centralauth-prefs-unattached'         => 'Quptalmağan',
	'centralauth-prefs-complete'           => 'Barlığı rettelingen!',
	'centralauth-prefs-migration'          => 'Awıstırılwda',
	'centralauth-prefs-count-attached'     => 'Tirkelgiñiz $1 joba {{plural:$1|torabında|toraptarında}} belsendi boldı.',
	'centralauth-prefs-count-unattached'   => 'Sizdiñ atıñız bar quptalmağan tirkelgiler $1 {{plural:$1|jobada|jobalarda}} qaldı.',
	'centralauth-prefs-detail-unattached'  => 'Osı joba torabı ğalamdıq tirkelgige tän dep quptalmağan.',
	'centralauth-prefs-manage'             => 'Ğalamdıq tirkelgiñizdi rettew',
	'centralauth-renameuser-abort'         => '<div class="errorbox">$1 qatıswşısın jergilikte qaýta atawğa bolmaýdı. Bul qatıswşı atı biregeýlengen tirkelgi jüýesine awıtırılğan.</div>',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Lovekhmer
 * @author Chhorran
 */
$messages['km'] = array(
	'centralauth-merge-step1-submit'       => 'ពត៌មាន បញ្ជាក់ទទួលស្គាល់ ការពិនិត្យចូល',
	'centralauth-merge-step2-title'        => 'បញ្ជាក់ទទួលស្គាល់ ច្រើនគណនី ទៀត',
	'centralauth-merge-step2-submit'       => 'ពត៌មាន បញ្ជាក់ទទួលស្គាល់ ការពិនិត្យចូល',
	'centralauth-merge-dryrun-or'          => "'''ឬ'''",
	'centralauth-merge-step3-submit'       => 'បញ្ចូលគណនីរួមគ្នា',
	'centralauth-list-home-title'          => 'វិគីទំព័រដើម',
	'centralauth-merge-method-new'         => 'គណនីថ្មី',
	'centralauth-finish-title'             => 'បញ្ចប់ ការបញ្ចូលរួមគ្នា',
	'centralauth-finish-password'          => 'ពាក្យសំងាត់ ៖',
	'centralauth-finish-login'             => 'ឡុកអ៊ីន',
	'centralauth-finish-send-confirmation' => 'ផ្ញើពាក្យសំងាត់តាមអ៊ីមែល',
	'centralauth-attach-title'             => 'បញ្ជាក់ទទួលស្គាល់ គណនី',
	'centralauth-admin-manage'             => 'គ្រប់គ្រង ទិន្នន័យ អ្នកប្រើប្រាស់',
	'centralauth-admin-username'           => 'ឈ្មោះអ្នកប្រើប្រាស់៖',
	'centralauth-admin-lookup'             => 'មើល ឬ កែប្រែ ទិន្នន័យ អ្នកប្រើប្រាស់',
	'centralauth-admin-info-locked'        => 'ត្រូវបានចាក់សោ៖',
	'centralauth-admin-info-hidden'        => 'ត្រូវបានលាក់៖',
	'centralauth-seconds-ago'              => '$1{{PLURAL:$1|វិនាទី|វិនាទី}}មុន',
	'centralauth-minutes-ago'              => '$1{{PLURAL:$1|នាទី|នាទី}}មុន',
	'centralauth-hours-ago'                => '$1{{PLURAL:$1|ម៉ោង|ម៉ោង}}មុន',
	'centralauth-prefs-unattached'         => 'លែង បញ្ជាក់ទទួលស្គាល់',
	'centralauth-prefs-complete'           => 'ទាំងអស់តាមលំដាប់ហើយ!',
	'centralauth-prefs-count-attached'     => 'គណនីរបស់អ្នកសកម្មក្នុង$1គំរោង{{plural:$1|របស់វិគី|របស់វិគី}}។',
	'centralauth-prefs-manage'             => 'គ្រប់គ្រង គណនីសកល របស់អ្នក',
);

/** Korean (한국어)
 * @author ToePeu
 */
$messages['ko'] = array(
	'centralauth-desc'                  => '위키미디어 재단 위키 사이의 [[Special:MergeAccount|계정 병합]]',
	'centralauth-merge-denied'          => '접근할 권한이 없습니다.',
	'centralauth-merge-notlogged'       => '계정이 완전히 합쳐졌는지 확인하기 위해<span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} 로그인]</span>해 주세요.',
	'centralauth-merge-welcome'         => "'''당신의 계정은 위키미디어의 통합 로그인 체계로 완전히 옮겨지지 않았습니다.'''

계정 옮기기를 선택하면 같은 이름과 암호로 모든 언어의 모든 위키미디어의 프로젝트에 로그인할 수 있습니다.
[http://commons.wikimedia.org/ 위키미디어 공용]에 파일올리기 같은 공유되는 프로젝트에서 쉽게 작업할 수 있고 서로 다른 프로젝트에서 같은 이름을 쓰는 사용자 사이의 혼란이나 갈등을 피할 수 있습니다.

If someone else has already taken your username on another site this will not disturb them, but it will give you a chance to work out with them or an administrator later.",
	'centralauth-merge-step1-detail'    => '위키 사이의 비밀번호와 등록된 이메일이 같은지 확인합니다.
모든 것을 확인하기 전까지 어떤 일도 일어나지 않습니다.',
	'centralauth-merge-dryrun-complete' => '모든 존재하는 계정이 자동으로 합쳐질 수 있습니다.

아직은 계정에 적용되지 않습니다.',
	'centralauth-merge-step3-title'     => '통합 계정 만들기',
	'centralauth-merge-step3-detail'    => '아래의 위키에 대해 통합 계정을 만들 준비가 되었습니다.',
	'centralauth-merge-step3-submit'    => '계정 합치기',
	'centralauth-complete-text'         => '이제 모든 위키미디어 위키에 새 계정을 만들지 않고 로그인할 수 있습니다.
같은 이름과 비밀번호를 모든 언어판의 위키백과, 위키낱말사전, 위키책과 그 자매 프로젝트에서 쓸 수 있습니다.',
	'centralauth-incomplete-text'       => '한번 계정을 통합하면 새 계정을 만들 필요 없이 모든 위키미디어 위키에 로그인할 수 있습니다.
같은 이름과 비밀번호를 모든 언어판의 위키백과, 위키낱말사전, 위키책과 그 자매 프로젝트에서 쓸 수 있습니다.',
	'centralauth-readmore-text'         => ":[[meta:Help:Unified_login/ko|'''통합 로그인'''에 대해 더 보기]]...",
);

/** Latin (Latina)
 * @author Rafaelgarcia
 * @author SPQRobin
 */
$messages['la'] = array(
	'centralauth-finish-password'   => 'Tessera:',
	'centralauth-admin-username'    => 'Nomen usoris:',
	'centralauth-prefs-status'      => 'Status rationis globalis:',
	'centralauth-prefs-not-managed' => 'Ratio unificata non adhibita',
	'centralauth-prefs-manage'      => 'Administrare tuam rationem globalem',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'centralauth-desc'                     => 'Benotzerkonten op de Wikien vun der Wikimedia Fondatioun [[Special:MergeAccount|zesummeleeën]]',
	'centralauth-mergeaccount-desc'        => "[[Special:MergeAccount|Zusammenleeë vu méi Benotzerkonte]] fir de ''Single User Login''",
	'centralauth-merge-denied'             => 'Pardon, dir hutt net déi néideg Rechter fir op dës Säit ze goen.',
	'centralauth-merge-step1-submit'       => 'Login Informatioune confirméieren',
	'centralauth-merge-dryrun-or'          => "'''oder'''",
	'centralauth-notice-dryrun'            => "<div class='successbox'>Demonstratiounsmodus</div><br clear='all'/>",
	'centralauth-list-home-title'          => 'Heemechts-Wiki',
	'centralauth-foreign-link'             => 'Benotzer $1 op $2',
	'centralauth-merge-method-primary'     => 'Heemechts-Wiki',
	'centralauth-merge-method-empty'       => 'Keng Kontributiounen',
	'centralauth-merge-method-new'         => 'Neie Benotzerkont',
	'centralauth-finish-password'          => 'Passwuert:',
	'centralauth-finish-login'             => 'Umeldung',
	'centralauth-finish-send-confirmation' => 'Passwuert per E-Mail zouschécken',
	'centralauth-admin-manage'             => 'Benotzerdate verwalten',
	'centralauth-admin-username'           => 'Benotzernumm:',
	'centralauth-admin-lookup'             => 'Benotzerdate kucken oder änneren',
	'centralauth-admin-permission'         => "Nëmme Stewarde kënnen d'Benotzerkonnte vun anere Benotzer fusionnéieren.",
	'centralauth-admin-info-id'            => 'Benotzernummer:',
	'centralauth-admin-info-locked'        => 'Gespaart:',
	'centralauth-admin-info-hidden'        => 'Verstoppt:',
	'centralauth-admin-yes'                => 'jo',
	'centralauth-admin-no'                 => 'neen',
	'centralauth-admin-list-localwiki'     => 'Lokal Wiki',
	'centralauth-admin-delete-title'       => 'Kont läschen',
	'centralauth-admin-delete-button'      => 'Dëse Kont läschen',
	'centralauth-admin-lock-title'         => 'Benotzerkont spären',
	'centralauth-admin-lock-button'        => 'Dëse Benotzerkont spären',
	'centralauth-admin-unlock-title'       => 'Spär vun dësem Benotzerkont ophiewen',
	'centralauth-admin-unlock-button'      => 'Spär vun dësem Benotzerkont ophiewen',
	'centralauth-seconds-ago'              => '{{PLURAL:$1|virun 1 Sekonn|viru(n) $1 Sekonnen}}',
	'centralauth-minutes-ago'              => '{{PLURAL:$1|virun 1 Minutt| viru(n) $1 Minutten}}',
	'centralauth-hours-ago'                => '{{PLURAL:$1|virun 1 Stonn| viru(n) $1 Stonnen}}',
	'centralauth-days-ago'                 => '{{PLURAL:$1|virun 1 Dag| viru(n) $1 Deeg}}',
	'centralauth-months-ago'               => '{{PLURAL:$1|virun 1 Mount| viru(n) $1 Méint}}',
	'centralauth-years-ago'                => '{{PLURAL:$1|virun|viru(n)}} $1 Joer',
	'centralauth-prefs-not-managed'        => 'De globale Benotzerkont gëtt net benotzt.',
	'centralauth-prefs-unattached'         => 'Net confirméiert',
	'centralauth-prefs-complete'           => 'Fäerdeg!',
	'centralauth-prefs-migration'          => 'Zesummeféierung gëtt elo gemaach',
	'centralauth-prefs-count-attached'     => 'Äre Benotzerkont ass op $1 {{PLURAL:$1|Projet|Projetën}} aktiv.',
	'centralauth-prefs-count-unattached'   => 'Et gëtt op $1 {{PLURAL:$1|Projet|Projeten}} onbestätegt Benotzerkonte mat ärem Numm.',
	'centralauth-prefs-manage'             => 'Geréiert äre globale Benotzerkont',
	'centralauth-invalid-wiki'             => 'Et gëtt keng Wiki-Datebank: $1',
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 * @author Siebrand
 */
$messages['li'] = array(
	'mergeaccount'                         => 'Status samevoege gebroekers',
	'centralauth-desc'                     => "[[Special:MergeAccount|Samegevoegde gebroekers]] binne Wikimedia Foundation wiki's",
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Meerdere gebroekers samevoege]] veur Single User Login',
	'centralauth-merge-denied'             => 'Sorry, doe höbs gein rech om dees paasj te bezeen.',
	'centralauth-merge-notlogged'          => '<span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} Meldj uch aan]</span> óm te konterlere of uche gebroekers volledig zeen samegevoeg.',
	'centralauth-merge-welcome'            => "'''Uche gebroeker is nag neet gemigreerd nao Wikimedia zien samegevoegdje aanmeldjsysteem.'''

Es geer uch d'rveur kees óm uche gebroekers te migrere, den kintj geer uch mit dezelfdje gebroekersnaaam-wachwaordcombinatie aanmelje bie alle projekwiki's van Wikimedia in alle besjikbare täöl. Dit maak 't einvoudiger óm te wèrke mit gedeildje projekte wie 't uploade nao [http://commons.wikimedia.org/ Wikimedia Commons] en veurkömp verwarring of konflikte doordet twieë miense dezelfdje gebroekersnaam keze op verjsillendje projekte.

Es emes anges mit uche gebroekersnaam al actief is op 'ne angere site, den haet det gein gevolge veur dae gebroeker. Geer höb de meugelikheid det mit dae gebroeker of 'ne beheerder op 'n later memènt op te losse.",
	'centralauth-merge-step1-title'        => 'Begin gebroekerssamevoege',
	'centralauth-merge-step1-detail'       => "Uch wachwaord en geregistreerd e-mailadres waere gekonterleerd taenge de gebroekers op anger wiki's óm te bevestige det ze euvereinkómme. D'r waere gein wieziginge gemaak toetdet geer höb aangegaeve det alles in orde liek.",
	'centralauth-merge-step1-submit'       => 'Bevestig aanmeldjinformatie',
	'centralauth-merge-step2-title'        => 'Bevestig mieë gebroekers',
	'centralauth-merge-step2-detail'       => "'n Aantal van de gebroekers kóste neet aan de opgegaeve thoeswiki gekoppeldj waere. Es dees gebroekers van uch zeen, kintj geer uch det aangaeve door 't wachwaord veur de gebroekers op te gaeve.",
	'centralauth-merge-step2-submit'       => 'Bevestig aanmeldjinformatie',
	'centralauth-merge-dryrun-or'          => "'''of'''",
	'centralauth-merge-step3-title'        => 'Maak samegevoegdje gebroek aan',
	'centralauth-merge-step3-detail'       => "Geer kintj uch noe uche samegevoegdje gebroeker make mit dao in de volgendje wiki's opgenaome:",
	'centralauth-merge-step3-submit'       => 'Gebroekers samevoege',
	'centralauth-complete'                 => 'Samevoege gebroekers aafgeróndj!',
	'centralauth-incomplete'               => 'Samevoege gebroekers neet volledig!',
	'centralauth-complete-text'            => "Geer kint uch nu aanmelje bie edere wiki van Wikimedia zónger 'ne nuje gebroeker aan te make; dezelfdje combinatie van gebroekersnaam en wachwaord werk veur Wikipedia, Wiktionair, Wikibeuk en häör zösterperjèkter in alle täöl.",
	'centralauth-incomplete-text'          => "Es uche gebroekers zeen samegevoeg kintj geer uch aanmelje bie edere wiki van Wikimedia zóner 'ne nuje gebroeker aan te make; dezelfdje combinatie van gebroekersnaam en wachwaord werk veur Wikipedia, Wiktionair, Wikibeuk en häör zösterperjèkter in alle täöl.",
	'centralauth-not-owner-text'           => 'De gebroekersnaam "$1" is automatisch toegeweze aan de eigenaar van de gebroeker op $2.

Es geer det böntj, kintj geer uch \'t samevoege van gebroekers aafrönje door hiej \'t wachwaprd veur dae gebroeker te gaeve:',
	'centralauth-notice-dryrun'            => "<div class='succesbox'>Allein demonstratiemodus</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => "Samevoege gebroekers is op dit memènt besjikbaar in demonstratie- en debugmodus. 't Sameviege van gebroekers is op dit memènt dus neet meugelik.",
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Lae meer euver '''samegevoegdj aanmelde''']]...''",
	'centralauth-list-home-title'          => 'Thoeswiki',
	'centralauth-list-home-dryrun'         => "'t Wachwaord en e-mailadres det veur deze wiki is ingesteld wörd gebroek veur uche samegevoegde gebroeker.
Later kint geer instelle welke wiki uche thoeswiki is.",
	'centralauth-list-attached-title'      => 'Betróg gebroekers',
	'centralauth-list-attached'            => 'De gebroekers mit de naam "$1" op de volgende sites zeen automatisch samegevoeg:',
	'centralauth-list-attached-dryrun'     => 'De gebroeker mit de naam "$1" op de volgende sites wuuertj automatisch toegevoeg aan de samegevoegde gebroeker:',
	'centralauth-list-unattached-title'    => 'Neet betróg gebroekers',
	'centralauth-list-unattached'          => 'De gebroeker "$1" kós neet automatisch aan uch toegeweze waere veur de volgende sites;
waorsjienliek ómdet \'t wachwaord aafwiek van uche primaire gebroeker:',
	'centralauth-foreign-link'             => 'Gebroeker $1 op $2',
	'centralauth-merge-method-primary'     => 'thoeswiki',
	'centralauth-merge-method-new'         => 'nuje gebroeker',
	'centralauth-finish-title'             => 'Samevoege aafrönje',
	'centralauth-finish-text'              => "Es dees gebroekers bie uch heure kinse 't proces van samevoege aafrönje door de wachwäörd veur de anger gebroekers hiej in te veure:",
	'centralauth-finish-password'          => 'Wachwaord:',
	'centralauth-finish-login'             => 'Gebroekersnaam',
	'centralauth-finish-send-confirmation' => 'E-mail wachwaord',
	'centralauth-finish-problems'          => "Kömp geer d'r neet oet of zeen dees gebroekers neet ucher? [[meta:Help:Unified login problems|Wie detse hölp vinjs]]....",
	'centralauth-merge-attempt'            => "'''Bezig mit 't controlere van de opgegaeve wachwäörd veur de nag neet samegevoegde gebroekers...'''",
	'centralauth-attach-list-attached'     => 'De samegevoegde gebroeker "$1" besteit oet de volgende gebroekers:',
	'centralauth-attach-title'             => 'Gebroeker bevestige',
	'centralauth-attach-text'              => "Deze gebroeker is nag neet gemigreerd nao 'ne samegevoegde gebroeker. Es de euverkoepelde gebroeker ouch van uch is den kint geer deze gebroeker samevoege es geer 't wachwaord veur de euverkoepelende gebroeker inguf:",
	'centralauth-attach-submit'            => 'Gebroeker migrere',
	'centralauth-attach-success'           => 'De gebroeker is gemigreerd nao de samegevoegde gebroeker.',
	'centralauth'                          => 'Beheer samegevoegdj aanmelje',
	'centralauth-admin-manage'             => 'Gebroekersgegaeves behere',
	'centralauth-admin-username'           => 'Gebroekersnaam:',
	'centralauth-admin-lookup'             => 'Gebroekersgegaeves bekieke of bewerke',
	'centralauth-admin-permission'         => 'Allein stewards kinne gebroekers van anger luuj samevoege.',
	'centralauth-admin-info-id'            => 'Gebroekersnómmer:',
	'centralauth-admin-info-registered'    => 'Vasgelag:',
	'centralauth-admin-info-locked'        => 'Geslaot:',
	'centralauth-admin-info-hidden'        => 'Verbórge:',
	'centralauth-admin-yes'                => 'jao',
	'centralauth-admin-no'                 => 'nae',
	'centralauth-admin-unmerge'            => 'Geselecteerde gebroekers splitse',
	'centralauth-admin-merge'              => 'Geselecteerde gebroekers samevoege',
	'centralauth-admin-bad-input'          => 'Onzjuuste samevoegselectie',
	'centralauth-admin-none-selected'      => "d'r Zeen gein gebroekers geselecteerd óm te verangere.",
	'centralauth-prefs-status'             => 'Globale gebroekersstatus:',
	'centralauth-prefs-not-managed'        => 'Gebroek gein samegevoegde gebroeker',
	'centralauth-prefs-unattached'         => 'Neet bevestig',
	'centralauth-prefs-complete'           => 'Alles in orde!',
	'centralauth-prefs-migration'          => 'Bezig mit migrere',
	'centralauth-prefs-count-attached'     => 'Diene gebroeker is actief in $1 {{plural:$1|perjèksite|perjèksites}}',
	'centralauth-prefs-count-unattached'   => 'Neet bevestigdje gebroekers mit uche naam zeen nag aanwezig op $1 perjèkter.',
	'centralauth-prefs-detail-unattached'  => 'Dees perjèksite is neet bevestig es beheurendje bie de globale gebroeker.',
	'centralauth-prefs-manage'             => 'Beheer diene globale gebroeker.',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Gebroeker $1 kin lokaal neet hernömp waere ómdet deze gebroeker is gemigreerdj nao \'t syteem van samegevoegdje gebroekers.</div>',
);

/** Lao (ລາວ)
 * @author Passawuth
 */
$messages['lo'] = array(
	'centralauth-finish-password' => 'ລະຫັດຜ່ານ',
	'centralauth-finish-login'    => 'ເຊັນເຂົ້າ',
	'centralauth-attach-title'    => 'ຍືນຍັນການເຊັນເຂົ້າ',
	'centralauth-admin-username'  => 'ຊື່ອຜູ້ໃຊ້ :',
	'centralauth-admin-lookup'    => 'ເບີ່ງຫຼືອດັດແກ້ຂ້ອມູນຂອງຜູ້ໃຊ້',
);

/** Lithuanian (Lietuvių)
 * @author Matasg
 */
$messages['lt'] = array(
	'centralauth-merge-step1-submit'       => 'Patvirtinti prisijungimo informaciją',
	'centralauth-merge-step2-title'        => 'Patvirtinti daugiau sąskaitų',
	'centralauth-finish-password'          => 'Slaptažodis',
	'centralauth-finish-send-confirmation' => 'Siųsti slaptažodį elektroniniu paštu',
	'centralauth-admin-username'           => 'Naudotojo vardas:',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 * @author Jacob.jose
 * @author Siebrand
 */
$messages['ml'] = array(
	'mergeaccount'                         => 'ലോഗിന്‍ സം‌യോജിപ്പിക്കുന്നതിന്റെ തല്‍‌സ്ഥിതി',
	'centralauth-desc'                     => 'വിക്കിമീഡിയ ഫൗണ്ടേഷന്‍ വിക്കികളിലെ [[Special:MergeAccount|അക്കൗണ്ടുകള്‍ സം‌യോജിപ്പിക്കുക]]',
	'centralauth-mergeaccount-desc'        => 'ഒറ്റ ഉപയോക്ത ലോഗിനു വേണ്ടി [[Special:MergeAccount|ബഹു അക്കൗണ്ടുകളുടെ സം‌യോജനം]] ഉപയോഗിക്കുക',
	'centralauth-merge-denied'             => 'ഈ താള്‍ പരിശോധിക്കുവാന്‍ താങ്കള്‍ക്ക് അനുമതിയില്ല.',
	'centralauth-merge-notlogged'          => 'താങ്കളുടെ അക്കൗണ്ടുകള്‍ പൂര്‍ണ്ണമായും സം‌യോജിപ്പിച്ചോ എന്നു പരിശോധിക്കാന്‍ <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} ലോഗിന്‍]</span> ചെയ്യുക.',
	'centralauth-merge-welcome'            => "'''നിങ്ങളുടെ ഉപയോക്ത അക്കൗണ്ട് ഇതു വരെ വിക്കിമീഡിയയുടെ സം‌യോജിത ലോഗിന്‍ വ്യൂഹത്തിലേക്കു മാറ്റിയിട്ടില്ല.'''

വിക്കിമീഡിയയുടെ സം‌യോജിത ലോഗിന്‍ വ്യൂഹത്തിലേക്കു നിങ്ങളുടെ അക്കൗണ്ട് മാറ്റിയാല്‍ എല്ലാ ഭാഷകളിലുമുള്ള വിക്കിമീഡിയ വിക്കി സം‌രംഭങ്ങളില്‍ പ്രവേശിക്കുവാന്‍ നിങ്ങള്‍ക്ക് ഒറ്റ ഉപയോക്തനാമവും രഹസ്യവാക്കും ഉപയോഗിക്കാവുന്നതാണ്‌. 

ഇതു പങ്കു വെക്കപ്പെട്ട സം‌രംഭങ്ങളായ [http://commons.wikimedia.org/ വിക്കിമീഡിയ കോമണ്‍സില്‍] പ്രാമാണങ്ങള്‍ അപ്‌ലോഡ് ചെയ്യുന്നതിനും, ഒരേ ഉപയോക്ത നാമം രണ്ടു പേര്‍ ഉപയോഗിക്കുന്നതു മൂലം ഉണ്ടാകുന്ന ചിന്താക്കുഴപ്പങ്ങളും പ്രശ്നങ്ങളും ഒഴിവാക്കാന്‍ സഹായിക്കും.

താങ്കള്‍ ഉപയോഗിക്കുന്ന ഉപയോക്തനാമം ഏതെങ്കിലും സൈറ്റില്‍ മറ്റാരെങ്കിലും ഇതിനകം എടുത്തിട്ടിട്ടുണ്ടെങ്കില്‍ ഇതു അവരെ ബാധിക്കില്ല. പക്ഷെ ഇതു സം‌ബന്ധിച്ച് അവരുമായോ ഏതെങ്കിലും കാര്യനിര്‍‌വാഹകനുമായോ പിന്നീട് സംസാരിക്കാവുന്നതാണ്‌.",
	'centralauth-merge-step1-title'        => 'ലോഗിന്‍ സം‌യോജിപ്പിക്കല്‍ ആരംഭിക്കുക',
	'centralauth-merge-step1-detail'       => 'നിങ്ങളുടെ രഹസ്യവാക്കും രെജിസ്റ്റര്‍ ചെയ്ത ഇമെയില്‍ വിലാസവും മറ്റു വിക്കികളിലെ അക്കൗണ്ടുകളുമായി അവ ചേരുന്നുണ്ടോ എന്നു പരിശോധിക്കും.

കാര്യങ്ങള്‍ എല്ലാം ശരിയാണെന്നു താങ്കള്‍ ഉറപ്പിക്കുന്നതു വരെ ഒരു മാറ്റവും വരുത്തുന്നതല്ല.',
	'centralauth-merge-step1-submit'       => 'ലോഗിന്‍ വിവരം സ്ഥിരീകരിക്കുക',
	'centralauth-merge-step2-title'        => 'കൂടുതല്‍ അക്കൗണ്ടുകള്‍ സ്ഥിരീകരിക്കുക',
	'centralauth-merge-step2-detail'       => 'ചില അക്കൗണ്ടുകള്‍ക്ക് തറവാട് വിക്കിയിലെ അക്കൗണ്ടുമായി യാന്ത്രികമായി ചേര്‍ച്ചയില്ല എന്നു കാണുന്നു. 
ഈ അക്കൗണ്ടുകള്‍ താങ്കളുടെ തന്നെയാണെന്നുറപ്പുണ്ടെങ്കില്‍ ശരിയായ രഹസ്യവാക്ക് കൊടുത്ത് താങ്കള്‍ക്ക് ഈ അക്കൗണ്ടുകളെ താങ്കള്‍ക്ക് സ്ഥിരീകരിക്കാവുന്നതാണ്‌.',
	'centralauth-merge-step2-submit'       => 'ലോഗിന്‍ വിവരം സ്ഥിരീകരിക്കുക',
	'centralauth-merge-dryrun-complete'    => 'നിലവിലുള്ള എല്ലാ അക്കൗണ്ടുകളും യാത്രികമായി സം‌യോജിപ്പിക്കാവുന്നതാണ്‌.',
	'centralauth-merge-dryrun-incomplete'  => 'തുടര്‍ പ്രക്രിയകള്‍ക്കായി നിങ്ങള്‍ തയ്യാറായി കഴിഞ്ഞു. പക്ഷെ ചില അക്കൗണ്ടുകള്‍ യാന്ത്രികമായി സ്ഥിരീകരിക്കുവാന്‍ പറ്റാഞ്ഞതിനാല്‍ അവ ഇപ്പോള്‍ സം‌യോജിത അക്കൗണ്ടുമായി ബന്ധിപ്പിക്കില്ല. താങ്കള്‍ക്കു ഇവയെ പിന്നീടു സം‌യോജിപ്പിക്കാവുന്നതാണു.

താങ്കളുടെ അക്കൗണ്ടുകള്‍ക്കു ഇതുവരെ മാറ്റമൊന്നും വരുത്തിയിട്ടില്ല.',
	'centralauth-merge-dryrun-or'          => 'അല്ലെങ്കില്‍',
	'centralauth-merge-dryrun-home'        => 'താങ്കളുടെ ഉപയോക്തനാമത്തിന്റെ തറവാട് വിക്കി ഇതാണെന്നു സ്ഥിരീകരിക്കുന്നതിനു കുടിയേറ്റ വ്യൂഹത്തിനു കഴിഞ്ഞില്ല.

താങ്കളുടെ ഉപയോക്തനാമത്തിന്റെ തറവാട് വിക്കി വേറൊരു വിക്കിയാണെന്നു കുടിയേറ്റ വ്യൂഹം കണ്ടെത്തിയിരിക്കുന്നു. താഴെയുള്ള കണ്ണിയില്‍ ഞെക്കി ആ വിക്കിയിലേക്ക് ലോഗിന്‍ ചെയ്ത് അക്കൗണ്ടിന്റെ കുടിയേറ്റ പ്രക്രിയ പൂര്‍ത്തിയാക്കുക.',
	'centralauth-merge-step3-title'        => 'സം‌യോജിത അക്കൗണ്ട് ഉണ്ടാക്കുക',
	'centralauth-merge-step3-detail'       => 'താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്ന വിക്കികളുമായി ബന്ധപ്പെട്ട് താങ്കളുടെ സം‌യോജിത അക്കൗണ്ട് ഉണ്ടാക്കാന്‍ താങ്കള്‍ തയ്യാറായിരിക്കുന്നു.',
	'centralauth-merge-step3-submit'       => 'അക്കൗണ്ടുകള്‍ സം‌യോജിപ്പിക്കുക',
	'centralauth-complete'                 => 'ലോഗിന്‍ സം‌യോജനം പൂര്‍ത്തീകരിച്ചിരിക്കുന്നു!',
	'centralauth-incomplete'               => 'ലോഗിന്‍ സം‌യോജനം പൂര്‍ത്തീകരിക്കപ്പെട്ടില്ല!',
	'centralauth-complete-text'            => 'ഏതു വിക്കിമീഡിയ വിക്കിയിലും പുതിയൊരു അക്കൗണ്ട് ഉണ്ടാക്കാതെ ലോഗിന്‍ ചെയ്യാന്‍ ഇനി മുതല്‍ നിങ്ങള്‍ക്കു സാധിക്കും. വിവിധ ഭാഷകളിലുള്ള വിക്കിപീഡിയ, വിക്ഷണറി, വിക്കിഗ്രന്ഥശാല, വിക്കിപാഠശാല തുടങ്ങി എല്ലാ തരം വിക്കികളിലും ഒരേ ഉപയോക്തനാമവും രഹസ്യവാക്കും ഉപയോഗിച്ച് നിങ്ങള്‍ക്ക് ലോഗിന്‍ ചെയ്യാവുന്നതാണ്‌.',
	'centralauth-incomplete-text'          => 'ലോഗിന്‍ സം‌യോജിപ്പിച്ചു കഴിഞ്ഞാല്‍ ഏതു വിക്കിമീഡിയ വിക്കിയിലും പുതിയൊരു അക്കൗണ്ട് ഉണ്ടാക്കാതെ ലോഗിന്‍ ചെയ്യാന്‍ നിങ്ങള്‍ക്കു സാധിക്കും. 
വിവിധ ഭാഷകളിലുള്ള വിക്കിപീഡിയ, വിക്ഷണറി, വിക്കിഗ്രന്ഥശാല, വിക്കിപാഠശാല തുടങ്ങി എല്ലാ തരം വിക്കിമീഡിയ വിക്കികളിലും ഒരേ ഉപയോക്തനാമവും രഹസ്യവാക്കും ഉപയോഗിക്കാവുന്നതാണ്‌.',
	'centralauth-not-owner-text'           => '"$1" എന്ന ഉപയോക്തനാമം യാന്ത്രികമായി $2 എന്ന അക്കൗണ്ടിന്റെ ഉടമസ്ഥനു കൊടുത്തിരിക്കുന്നു.

അതു താങ്കളാണെങ്കില്‍ പ്രധാന അക്കൗണ്ടിന്റെ രഹസ്യവാക്ക് ഇവിടെ കൊടുത്ത് താങ്കള്‍ക്ക് സം‌യോജിത ലോഗിന്‍ പ്രക്രിയ പൂര്‍ത്തിയാക്കാവുന്നതാണ്‌.',
	'centralauth-notice-dryrun'            => "<div class='successbox'>പരീക്ഷണ ഘട്ടത്തിലാണ്‌</div><br clear='all'/>",
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|'''സം‌യോജിത ലോഗിനെക്കുറിച്ച്''' കൂടുതല്‍ വായിക്കുക]]…''",
	'centralauth-list-home-title'          => 'തറവാട് വിക്കി',
	'centralauth-list-home-dryrun'         => 'ഈ വിക്കിയില്‍ നിങ്ങള്‍ സജ്ജീകരിച്ചിരിക്കുന്ന രഹസ്യവാക്കും ഇമെയില്‍ വിലാസവും നിങ്ങളുടെ സം‌യോജിത അക്കൗണ്ടിനു വേണ്ടി ഉപയോഗിക്കും. നിങ്ങള്‍ക്ക് നിങ്ങളുടെ തറവാട് വിക്കി പിന്നീടു മാറ്റുന്നതിനു സാദ്ധ്യമല്ല.',
	'centralauth-list-attached-title'      => 'ബന്ധപ്പെട്ട അക്കൗണ്ടുകള്‍',
	'centralauth-list-attached'            => 'താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്ന വിക്കികളിലുള്ള "$1" എന്ന അക്കൗണ്ട്, സം‌യോജിത അക്കൗണ്ടുമായി യാന്ത്രികമായി ബന്ധിപ്പിച്ചിരിക്കുന്നു.',
	'centralauth-list-attached-dryrun'     => 'താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്ന വിക്കികളിലുള്ള "$1" എന്ന അക്കൗണ്ട്, സം‌യോജിത അക്കൗണ്ടുമായി യാന്ത്രികമായി ബന്ധിപ്പിക്കുന്നതാണ്‌.',
	'centralauth-list-unattached-title'    => 'ബന്ധപ്പെടുത്തിയിട്ടില്ലാത്ത അക്കൗണ്ടുകള്‍',
	'centralauth-list-unattached'          => '"$1" എന്ന അക്കൗണ്ട് താങ്കളുടെ തന്നെയാണോ എന്ന് താഴെ കൊടുത്തിരിക്കുന്ന സൈറ്റുകളില്‍ സ്ഥിരീകരിക്കുവാന്‍ പറ്റിയില്ല. പ്രസ്തുത സൈറ്റുകളിലെ അക്കൗണ്ടിനുപയോഗിച്ചിരിക്കുന്ന രഹസ്യവാക്ക്, താങ്കളുടെ പ്രധാന അക്കൗണ്ടിന്റെ രഹസ്യവാക്കില്‍ നിന്നു വ്യത്യാസപ്പെട്ടിരിക്കുന്നതാകാം അതിനു കാരണം:',
	'centralauth-foreign-link'             => '$2-ല്‍ ഉള്ള $1 എന്ന ഉപയോക്താവ്',
	'centralauth-merge-method-primary'     => 'തറവാട് വിക്കി',
	'centralauth-merge-method-empty'       => 'തിരുത്തലുകള്‍ ഒന്നും തന്നെയില്ല',
	'centralauth-merge-method-mail'        => 'ഇമെയില്‍ വഴി സ്ഥിരീകരിച്ചു',
	'centralauth-merge-method-password'    => 'രഹസ്യവാക്ക് വഴി സ്ഥിരീകരിച്ചു',
	'centralauth-merge-method-admin'       => 'കാര്യനിര്‍‌വാഹകന്‍ സം‌യോജിപ്പിച്ച അക്കൗണ്ട്',
	'centralauth-merge-method-new'         => 'പുതിയ അക്കൗണ്ട്',
	'centralauth-merge-method-login'       => 'ലോഗിന്‍ വഴി സ്ഥിരീകരിച്ചു',
	'centralauth-finish-title'             => 'സം‌യോജനം പൂര്‍ത്തിയാക്കുക',
	'centralauth-finish-text'              => 'ഈ അക്കൗണ്ടുകള്‍ താങ്കളുടെ തന്നെയാണെങ്കില്‍, മറ്റുള്ള അക്കൗണ്ടുകള്‍ക്ക് രഹസ്യവാക്ക് ടൈപ്പു ചെയ്ത് സം‌യോജിത ലോഗിന്‍ പ്രക്രിയ താങ്കള്‍ക്കു പൂര്‍ത്തിയാക്കാവുന്നതാണ്‌:',
	'centralauth-finish-password'          => 'രഹസ്യവാക്ക്:',
	'centralauth-finish-login'             => 'ലോഗിന്‍',
	'centralauth-finish-send-confirmation' => 'രഹസ്യവാക്ക് ഇ-മെയില്‍ ചെയ്യുക',
	'centralauth-finish-problems'          => 'താങ്കള്‍ എന്തെങ്കിലും ബുദ്ധിമുട്ടു അനുഭവിക്കുന്നോ, അല്ലെങ്കില്‍ ഇവിടെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്ന മറ്റു അക്കൗണ്ടുകള്‍ താങ്കളുടെ അല്ലേ?  
[[meta:Help:Unified login problems|സഹായത്തിനു സന്ദര്‍ശിക്കുക]]…',
	'centralauth-finish-noconfirms'        => 'ഈ രഹസ്യവാക്ക് ഉപയോഗിച്ച് ഒരു അക്കൗണ്ടും സ്ഥിരീകരിക്കുവാന്‍ പറ്റിയില്ല.',
	'centralauth-finish-incomplete'        => 'ഈ രഹസ്യവാക്കുപയോഗിച്ച് നിരവധി അക്കൗണ്ടുകള്‍ സം‌യോജിപ്പിട്ടുണ്ട്. 
മറ്റു അക്കൗണ്ടുകള്‍ ഇതു വരെ സ്ഥിരീകരിച്ചിട്ടില്ല.',
	'centralauth-merge-attempt'            => "'''തന്നിരിക്കുന്ന രഹസ്യവാക്കു ബാക്കിയുള്ള സം‌യോജിപ്പിക്കാത്ത അക്കൗണ്ടുകളുമായി പരിശോധിക്കുന്നു…'''",
	'centralauth-attach-list-attached'     => '"$1" എന്ന സം‌യോജിത അക്കൗണ്ടില്‍ താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്ന അക്കൗണ്ടുകളും ഉള്‍പ്പെടുന്നു:',
	'centralauth-attach-title'             => 'അക്കൗണ്ട് സ്ഥിരീകരിക്കുക',
	'centralauth-attach-text'              => 'ഈ അക്കൗണ്ട് ഇതു വരെ സം‌യോജിത അക്കൗണ്ടിലേക്കു കുടിയേറ്റിയിട്ടില്ല. ആഗോള അക്കൗണ്ട് നിങ്ങളുടെയാണെങ്കില്‍ രഹസ്യ വാക്ക് ടൈപ്പ് ചെയ്ത് ഈ അക്കൗണ്ട് സം‌യോജിപ്പിക്കാവുന്നതാണ്‌.',
	'centralauth-attach-submit'            => 'അക്കൗണ്ട് കുടിയേറ്റുക',
	'centralauth-attach-success'           => 'ഈ അക്കൗണ്ട് സം‌യോജിത അക്കൗണ്ടിലേക്കു കുടിയേറ്റിയിരിക്കുന്നു.',
	'centralauth'                          => 'സം‌യോജിത ലോഗിന്‍ കാര്യനിര്‍‌വഹണം',
	'centralauth-admin-manage'             => 'ഉപയോക്തൃ ഡാറ്റ പരിപാലിക്കുക',
	'centralauth-admin-username'           => 'ഉപയോക്തൃനാമം:',
	'centralauth-admin-lookup'             => 'ഉപയോക്താവിന്റെ വിവരം കാണുകയോ തിരുത്തുകയോ ചെയ്യുക',
	'centralauth-admin-permission'         => 'സ്റ്റിവാര്‍ഡുകള്‍ക്ക് മാത്രമേ മറ്റുപയോക്താക്കളുടെ അക്കൗണ്ട് അവര്‍ക്കു വേണ്ടി സം‌യോജനം നടത്താനുള്ള അവകാശമുള്ളൂ.',
	'centralauth-admin-no-unified'         => 'ഈ ഉപയോക്തൃനാമത്തിനു സം‌യോജിത അക്കൗണ്ട് ഇല്ല.',
	'centralauth-admin-info-id'            => 'ഉപയോക്തൃ ഐഡി:',
	'centralauth-admin-info-registered'    => 'രജിസ്റ്റേ‌ര്‍‌ഡ്:',
	'centralauth-admin-info-locked'        => 'ബന്ധിച്ചിരിക്കുന്നു:',
	'centralauth-admin-info-hidden'        => 'മറച്ചിരിക്കുന്നു:',
	'centralauth-admin-yes'                => 'ശരി',
	'centralauth-admin-no'                 => 'തെറ്റ്',
	'centralauth-admin-attached'           => 'പൂര്‍ണ്ണമായും സം‌യോജിപ്പിച്ച അക്കൗണ്ടുകള്‍',
	'centralauth-admin-unattached'         => 'ബന്ധപ്പെടുത്തിയിട്ടില്ലാത്ത അക്കൗണ്ടുകള്‍',
	'centralauth-admin-no-unattached'      => 'യോജിപ്പിക്കാത്ത അക്കൗണ്ടുകള്‍ ഒന്നും ബാക്കിയില്ല.',
	'centralauth-admin-list-localwiki'     => 'പ്രാദേശിക വിക്കി',
	'centralauth-admin-list-attached-on'   => 'ചേര്‍ക്കപ്പെട്ട തീയതി',
	'centralauth-admin-list-method'        => 'മാര്‍ഗ്ഗം',
	'centralauth-admin-unmerge'            => 'തിരഞ്ഞെടുത്തവ വിഭജിക്കുക',
	'centralauth-admin-merge'              => 'തിരഞ്ഞെടുത്തവ സം‌യോജിപ്പിക്കുക',
	'centralauth-admin-bad-input'          => 'സം‌യോജിപ്പിക്കുവാന്‍ തിരഞ്ഞെടുത്തവ അസാധുവാണ്‌',
	'centralauth-admin-none-selected'      => 'മാറ്റം വരുത്തുവാന്‍ അക്കൗണ്ടുകള്‍ ഒന്നും തിരഞ്ഞെടുത്തിട്ടില്ല',
	'centralauth-admin-already-unmerged'   => 'ഇതിനകം വിഘടിപ്പിച്ചതിനാല്‍ $1നെ വിട്ടുകളയുന്നു',
	'centralauth-admin-unmerge-success'    => '$1 {{PLURAL:$2|അക്കൗണ്ട്|അക്കൗണ്ടുകള്‍}} വിജയകരമായി വിഘടിപ്പിച്ചിരിക്കുന്നു.',
	'centralauth-admin-delete-title'       => 'അക്കൗണ്ട് മായ്ക്കുക',
	'centralauth-admin-delete-description' => 'ആഗോള അക്കൗണ്ട് മായ്ക്കുന്നത് ആഗോള ക്രമീകരണങ്ങള്‍ മായ്ക്കുകയും, ആഗോള അക്കൗണ്ടിനോടൊപ്പം ചേര്‍ത്തിരിക്കുന്ന പ്രാദേശിക അക്കൗണ്ടുകളെ സ്വതന്ത്രമാക്കുകയും, ആഗോള അക്കൗണ്ടിന്റെ ഉപയോക്തൃനാമം മറ്റൊരു ഉപയോക്താവിനു തിരഞ്ഞെടുക്കാന്‍ പ്രാപ്തമാക്കുകയും ചെയ്യും. 

പ്രാദേശിക അക്കൗണ്ടുകള്‍ അതത് വിക്കികളില്‍ നിലനില്‍ക്കും. പ്രാദേശിക അക്കൗണ്ടുകളുടെ രഹസ്യവാക്ക് സം‌യോജനത്തിനു മുന്‍പുണ്ടായിരുന്ന രഹസ്യവാക്ക് ആയിരിക്കും.',
	'centralauth-admin-delete-button'      => 'ഈ അക്കൗണ്ട് മായ്ക്കുക',
	'centralauth-admin-delete-success'     => '"<nowiki>$1</nowiki>"-ന്റെ ആഗോള അക്കൗണ്ട് വിജയകരമായി മായ്ച്ചിരിക്കുന്നു',
	'centralauth-admin-nonexistent'        => '"<nowiki>$1</nowiki>"-നു ആഗോള അക്കൗണ്ട് ഇല്ല.',
	'centralauth-admin-delete-nonexistent' => 'പിഴവ്: "<nowiki>$1</nowiki>" എന്ന ആഗോള അക്കൗണ്ട് നിലവിലില്ല.',
	'centralauth-token-mismatch'           => 'ക്ഷമിക്കണം. സെഷന്‍ ഡാറ്റ നഷ്ടപ്പെട്ടതിനാല്‍ താങ്കളുടെ ഫോം സമര്‍പ്പിക്കുന്നതിനു കഴിഞ്ഞില്ല.',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|സെക്കന്റിനു|സെക്കന്റുകള്‍ക്കു}} മുന്‍പ്',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|മിനിറ്റിനു|മിനിറ്റുകള്‍ക്കു}} മുന്‍പ്',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|മണിക്കൂറിനു|മണിക്കൂറുകള്‍ക്കു}} മുന്‍പ്',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|ദിവസത്തിനു|ദിവസങ്ങള്‍ക്കു}} മുന്‍പ്',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|മാസത്തിനു|മാസങ്ങള്‍ക്കു}} മുന്‍പ്',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|വര്‍ഷത്തിനു|വര്‍ഷങ്ങള്‍ക്കു}} മുന്‍പ്',
	'centralauth-prefs-status'             => 'ആഗോള അക്കൗണ്ടിന്റെ സ്ഥിതി:',
	'centralauth-prefs-not-managed'        => 'സം‌യോജിത അക്കൗണ്ട് ഉപയോഗിക്കുന്നില്ല',
	'centralauth-prefs-unattached'         => 'സ്ഥിരീകരിച്ചിട്ടില്ല',
	'centralauth-prefs-complete'           => 'എല്ലാം ക്രമത്തിലാണ്‌!',
	'centralauth-prefs-migration'          => 'കുടിയേറ്റികൊണ്ടിരിക്കുന്നു',
	'centralauth-prefs-count-attached'     => 'നിങ്ങളുടെ അക്കൗണ്ട് $1 വിക്കി {{plural:$1|സം‌രംഭത്തില്‍|സം‌രംഭങ്ങളില്‍}} സജീവമാണ്‌.',
	'centralauth-prefs-count-unattached'   => 'നിങ്ങളുടെ പേരുള്ള ഉപഭോക്തൃനാമം $1 {{plural:$1സം‌രംഭത്തില്‍|സം‌രംഭങ്ങളില്‍‍}} സ്ഥിരീകരിക്കാതെ നിലവിലുണ്ട്.',
	'centralauth-prefs-detail-unattached'  => 'ഈ സം‌രംഭം ആഗോള അക്കൗണ്ടിന്റെ ഭാഗമാണെന്നു ഇതു വരെ സ്ഥിരീകരിച്ചിട്ടില്ല.',
	'centralauth-prefs-manage'             => 'നിങ്ങളുടെ ആഗോള അക്കൗണ്ട് പരിപാലിക്കുക.',
	'centralauth-renameuser-abort'         => '<div class="errorbox">$1 എന്ന ഉപയോക്തൃനാമം സം‌യോജിത ലോഗിന്‍ വ്യൂഹത്തിലേക്കു കുടിയേറ്റപ്പെട്ടതിനാല്‍ പ്രാദേശികമായി പുനര്‍നാമകരണം നടത്തുന്നതിനു സാദ്ധ്യമല്ല.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">ഈ ഉപയോക്തൃനാമം സം‌യോജിത ലോഗിന്‍ വ്യൂഹത്തിനു വേണ്ടി വേര്‍തിരിക്കപ്പെട്ടതിനാല്‍ $2 എന്ന ഉപയോക്തൃനാമം പുനര്‍നാമകരണം നടത്തുന്നതിനു സാദ്ധ്യമല്ല.</div>',
	'centralauth-invalid-wiki'             => 'ഇങ്ങനെ ഒരു വിക്കി നിലവിലില്ല DB: $1',
	'centralauth-account-exists'           => 'അക്കൗണ്ട് ഉണ്ടാക്കുന്നതിനു സാദ്ധ്യമല്ല. ഉപയോക്തനാമം ഇതിനകം സം‌യോജിത ലോഗിന്‍ വ്യൂഹം ഉപയോഗിച്ചു കഴിഞ്ഞു.',
);

/** Marathi (मराठी)
 * @author Kaustubh
 * @author Mahitgar
 * @author Siebrand
 */
$messages['mr'] = array(
	'mergeaccount'                         => 'खाते एकत्रीकरण स्थिती',
	'centralauth-desc'                     => 'विकिमीडिया फाऊंडेशन विकिंमध्ये [[Special:MergeAccount|सदस्यत्व एकत्रीकरण]] करा',
	'centralauth-mergeaccount-desc'        => 'एका सदस्यनामाची [[Special:MergeAccount|अनेक खाती]] एकत्रीत करा.',
	'centralauth-merge-denied'             => 'माफ करा, या पानावर जाण्याची तुम्हाला परवानगी नाही.',
	'centralauth-merge-notlogged'          => 'कृपया आपले खाते एकत्रीकरण व्यवस्थित आहे हे तपासण्यासाठी <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} प्रवेश करा]</span>',
	'centralauth-merge-welcome'            => "'''तुमचे सदस्य खाते अजून विकिमीडियाच्या एकत्रीत खात्यात समाविष्ट करण्यात आलेले नाही.'''

जर तुम्ही तुमचे खाते समाविष्ट केलेत, तर तुम्ही एकाच सदस्यनाम व परवलीचा शब्द वापरून सर्व भाषांतील सर्व विकि प्रकल्पांमध्ये प्रवेश करू शकता.
ह्यामुळे तुम्हांला शेअर्ड प्रकल्पांमध्ये काम करणे सोईचे जाईल. उदा. [http://commons.wikimedia.org/ विकिमीडिया कॉमन्स] इथे संचिका चढविणे, तसेच दोन वेगवेगळ्या व्यक्ती एकाच सदस्यनामानी दोन प्रकल्पांमध्ये काम करीत असल्यास निर्माण होणार्‍या संभ्रमापासून सुटका मिळेल.

जर इतर कोणीतरी तुमचे सदस्यनाम अगोदरच घेतले असेल तर तुम्ही त्यांच्याशी संपर्क करून अथवा प्रबंधकांकरवी बदल घडवून आणू शकता.",
	'centralauth-merge-step1-title'        => 'खाते एकत्रीकरण सुरू करा',
	'centralauth-merge-step1-detail'       => 'तुमचा परवलीचा शब्द तसेच इ-मेल पत्ता इतर विकिंशी पडताळून पाहण्यात येत आहे. जोपर्यंत तुम्ही सहमती देत नाही तोपर्यंत कुठलेही बदल केले जाणार नाहीत.',
	'centralauth-merge-step1-submit'       => 'खाते माहिती निश्चितकरा',
	'centralauth-merge-step2-title'        => 'अजून खाती निवडा',
	'centralauth-merge-step2-detail'       => 'तुम्ही सांगितलेल्या मुख्य विकिशी काही खाती जोडता आलेली नाहीत. जर ही खाती तुमचीच असतील तर तुम्ही ही खाती त्यांचा परवलीचा शब्द देऊन जोडून घेऊ शकता.',
	'centralauth-merge-step2-submit'       => 'सदस्य प्रवेश माहिती तपासून पहा',
	'centralauth-merge-dryrun-complete'    => 'सध्या अस्तित्वात असलेल्या सर्व खात्यांचे आपोआप एकत्रीकरण करता येऊ शकते!

तुमच्या खात्यांमध्ये अजून बदल करण्यात आलेले नाहीत.',
	'centralauth-merge-dryrun-incomplete'  => 'तुम्ही पुढे जायला तयार आहात, पण काही खाती ही आपोआप तपासता आलेली नाहीत व ती जोडली जाणार नाहीत. तुम्ही ती नंतर एकत्र करू शकता.

अजून तुमच्या खात्यांमध्ये बदल केलेले नाहीत.',
	'centralauth-merge-dryrun-or'          => "'''किंवा'''",
	'centralauth-merge-dryrun-home'        => 'एकत्रीकरण प्रणाली तुम्हीच मुख्य विकिवरील तुमच्या सदस्यनावाचे उपयोगकर्ते आहात हे सिद्ध करु शकलेली नाही.

दुसरा एक विकि तुमच्या मुख्य सदस्यत्वासाठी निवडलेला आहे; खाते एकत्रीकरण पूर्ण करण्यासाठी खाली दिलेल्या दुव्यावर जाऊन प्रवेश करा.',
	'centralauth-merge-step3-title'        => 'एकत्रीत खाते तयार करा',
	'centralauth-merge-step3-detail'       => 'तुम्ही खालील विकिंकरीता एकत्रीत खाते उघडण्यास तयार आहात:',
	'centralauth-merge-step3-submit'       => 'खाती एक करा',
	'centralauth-complete'                 => 'खाते एकत्रीकरण पूर्ण झाले!',
	'centralauth-incomplete'               => 'खाते एकत्रीकरण पूर्ण झालेले नाही!',
	'centralauth-complete-text'            => 'तुम्ही आता कुठल्याही विकिमीडिया विकिवर सदस्य नोंदणी न करता प्रवेश करू शकता;
एकच सदस्य नाव व परवलीचा शब्द विकिपीडिया, विक्शनरी, विकिबुक्स तसेच इतर सर्व भाषांतील प्रकल्पांमध्ये वापरले जाऊ शकते.',
	'centralauth-incomplete-text'          => 'एकदा का तुमचे एकत्रित खाते तयार झाले, की तुम्ही कुठल्याही विकिमीडिया विकिवर सदस्य नोंदणी न करता प्रवेश करू शकता;
एकच सदस्य नाम व परवलीचा शब्द तुम्ही कुठल्याही भाषेतील विकिपीडिया, विक्शनरी, विकिबुक्स तसेच इतर प्रकल्पांमध्ये वापरू शकता.',
	'centralauth-not-owner-text'           => '$2 वर "$1" हे सदस्यनाव आपोआप दिले गेलेले आहे.

जर हे तुम्हीच असाल, तर तुम्ही त्या खात्याचा मुख्य परवलीचा शब्द येथे देऊन प्रवेश प्रक्रिया पूर्ण करू शकता:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>फक्त तपासणीसाठी</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'खाते एकत्रीकरण हे सध्या प्राथमिक तपासणी अवस्थेत आहे, त्यामुळे प्रत्यक्षात एकत्रीकरण करता येत नाही. माफ करा!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|'''एकत्रीत खात्यासंबंधी''' अधिक माहिती]]...''",
	'centralauth-list-home-title'          => 'मूळचा(होम) विकि',
	'centralauth-list-home-dryrun'         => 'या विकिवरील सदस्यनाम तसेच परवलीचा शब्द तुमच्या एकत्रीत खात्यासाठी वापरला जाईल.
तुम्ही तुमचा मुख्य विकि नंतर बदलू शकता.',
	'centralauth-list-attached-title'      => 'जोडलेली खाती',
	'centralauth-list-attached'            => 'खालील संकेतस्थळांवर असणारे "$1" हे सदस्यनाम आपोआप एकत्रीत खात्यामध्ये समाविष्ट झालेले आहे:',
	'centralauth-list-attached-dryrun'     => 'खालील संकेतस्थळांवर असणारे "$1" हे सदस्यनाम आपोआप एकत्रीत खात्यामध्ये समाविष्ट होईल:',
	'centralauth-list-unattached-title'    => 'नजोडलेली खाती',
	'centralauth-list-unattached'          => '"$1" हे खाते आपोआप तुमचेच आहे याची खालील संकेतस्थळांवर खात्री होऊ शकलेली नाही; कदाचित त्यांचा परवलीचा शब्द तुमच्या मुख्य खात्यापेक्षा वेगळा असू शकतो:',
	'centralauth-foreign-link'             => '$2 वरील सदस्य $1',
	'centralauth-merge-method-primary'     => 'मुख्य विकि',
	'centralauth-merge-method-empty'       => 'संपादने नाहीत',
	'centralauth-merge-method-mail'        => 'इ-मेलने सिद्ध केले',
	'centralauth-merge-method-password'    => 'परवलीच्या शब्दाने सिद्ध केले',
	'centralauth-merge-method-admin'       => 'प्रबंधक एकत्रित खाते',
	'centralauth-merge-method-new'         => 'नवीन खाते',
	'centralauth-merge-method-login'       => 'प्रवेश करून सिद्ध केले',
	'centralauth-finish-title'             => 'एकत्रिकरण संपवा',
	'centralauth-finish-text'              => 'जर खालील खाती तुमचीच असतील तर तुम्ही त्यांचा परवलीचा शब्द देऊन एकत्रीकरण करू शकता:',
	'centralauth-finish-password'          => 'परवलीचा शब्द',
	'centralauth-finish-login'             => 'प्रवेश करा',
	'centralauth-finish-send-confirmation' => 'विपत्र परवली',
	'centralauth-finish-problems'          => 'तुम्हाला काही संदेह आहे का, किंवा ही इतर खाती तुमची नाहीत का?
[[meta:Help:Unified login problems|मदत कशी मिळवावी]]...',
	'centralauth-finish-noconfirms'        => 'दिलेला परवलीचा शब्द वापरून कुठलेही खाते सिद्ध करू शकलेलो नाही.',
	'centralauth-finish-incomplete'        => 'बरीचशी खाती दिलेला परवलीचा शब्द वापरून एकत्रित केलेली आहेत. इतर खाती अजून सिद्ध झालेली नाहीत.',
	'centralauth-merge-attempt'            => "'''तुम्ही दिलेला परवलीचा शब्द इतर समावेश न केलेल्या खात्यांच्या बाबतीत तपासला जात आहे...'''",
	'centralauth-attach-list-attached'     => '"$1" या एकत्रीत खात्यात खालील खाती आहेत:',
	'centralauth-attach-title'             => 'खाते योग्य असल्याची खात्री करा',
	'centralauth-attach-text'              => 'हे खाते एकत्रीत खात्याला पाठविलेले नाही. जर एकत्रीत खाते तुमचेच असेल, तर एकत्रीत खात्याचा परवलीचा शब्द टाकून तुम्ही हे खाते एकत्रीत खात्यात समाविष्ट करू शकता:',
	'centralauth-attach-submit'            => 'खाते स्थलांतरीत करा',
	'centralauth-attach-success'           => 'खाते एकत्रीत खात्यामध्ये टाकलेले आहे.',
	'centralauth'                          => 'सामायिक प्रवेश प्रबंधन',
	'centralauth-admin-manage'             => 'सदस्य विदेचे प्रबंधन करा',
	'centralauth-admin-username'           => 'सदस्य नाव',
	'centralauth-admin-lookup'             => 'सदस्य माहिती पहा अथवा संपादित करा',
	'centralauth-admin-permission'         => 'इतर सदस्यांची खाती एकत्रीकरण करण्याची परवानगी फक्त अधिकार्‍यांना (स्टिवार्ड्स) आहे.',
	'centralauth-admin-no-unified'         => 'या सदस्यनावाचे एकत्रित खाते उघडलेले नाही.',
	'centralauth-admin-info-id'            => 'सदस्य क्र:',
	'centralauth-admin-info-registered'    => 'नोंदणीकृत:',
	'centralauth-admin-info-locked'        => 'कुलुपबंद:',
	'centralauth-admin-info-hidden'        => 'लपविलेले:',
	'centralauth-admin-yes'                => 'हो',
	'centralauth-admin-no'                 => 'नाही',
	'centralauth-admin-attached'           => 'पूर्णत: एकत्र केलेली खाती',
	'centralauth-admin-unattached'         => 'न जोडलेली खाती',
	'centralauth-admin-no-unattached'      => 'एकत्र न केलेली खाती उरलेली नाहीत.',
	'centralauth-admin-list-localwiki'     => 'स्थानिक विकि',
	'centralauth-admin-list-attached-on'   => 'ला जोडली',
	'centralauth-admin-list-method'        => 'पद्धत',
	'centralauth-admin-unmerge'            => 'निव्डलेले वेगळे करा',
	'centralauth-admin-merge'              => 'निवडलेली खाती एकत्र करा',
	'centralauth-admin-bad-input'          => 'निवडीमध्ये चूक आहे',
	'centralauth-admin-none-selected'      => 'संपादित करण्यासाठी कुठलेही खाते निवडलेले नाही.',
	'centralauth-admin-already-unmerged'   => 'अगोदरच अनमर्ज केले असल्यामुळे $1 ला वगळत आहे',
	'centralauth-admin-unmerge-success'    => '$1 {{PLURAL:$2|खात्याचे|खात्यांचे}} अनमर्ज यशस्वी',
	'centralauth-admin-delete-title'       => 'खाते वगळा',
	'centralauth-admin-delete-description' => 'विश्व खाते वगळल्यास, सर्व विश्व पसंती, सर्व स्थानिक खात्यांचे वेगवेगळ्या खात्यांमध्ये रुपांतर, तसेच विश्व सदस्यनाम दुसर्‍या कुणालाही वापरण्यासाठी मोकळे करण्यात येईल.
सर्व स्थानिक खाती अस्तित्वात राहतील.
स्थानिक खात्यांचे एकत्रिकरण करण्यापूर्वीचे परवलीचे शब्द पूर्ववत होतील.',
	'centralauth-admin-delete-button'      => 'हे खाते वगळा',
	'centralauth-admin-delete-success'     => '"<nowiki>$1</nowiki>" साठीचे विश्व खाते वगळले',
	'centralauth-admin-nonexistent'        => '"<nowiki>$1</nowiki>" साठी विश्व खाते नाही',
	'centralauth-admin-delete-nonexistent' => 'त्रुटी: "<nowiki>$1</nowiki>" हे विश्व खाते अस्तित्वात नाही.',
	'centralauth-token-mismatch'           => 'माफ करा, सत्र विदेचा क्षयेमुळे आपला अर्ज पाठवू शकत नाही.',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|सेकंदापूर्वी|सेकंदांपूर्वी}}',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|मिनिटापूर्वी|मिनिटांपूर्वी}}',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|तासापूर्वी|तासांपूर्वी}}',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|दिवसापूर्वी|दिवसांपूर्वी}}',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|महिन्यापूर्वी|महिन्यांपूर्वी}}',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|वर्षापूर्वी|वर्षांपूर्वी}}',
	'centralauth-prefs-status'             => 'एकत्रीत खात्याची स्थिती:',
	'centralauth-prefs-not-managed'        => 'एकत्रीत खाते वापरलेले नाही',
	'centralauth-prefs-unattached'         => 'असहमत',
	'centralauth-prefs-complete'           => 'सर्व काही यथास्थित!',
	'centralauth-prefs-migration'          => 'पाठविण्याचे काम चालू',
	'centralauth-prefs-count-attached'     => 'तुमचे खाते $1 {{plural:$1|संकेतस्थळावर|संकेतस्थळांवर}} अस्तित्वात आहे.',
	'centralauth-prefs-count-unattached'   => '$1 {{plural:$1|प्रकल्पामध्ये|प्रकल्पांमध्ये}} तुमची खाती (ज्यांना तुम्ही सहमती दिलेली नाही) उरलेली आहेत.',
	'centralauth-prefs-detail-unattached'  => 'तुमच्या एकत्रीत खात्यामध्ये या प्रकल्पाच्या संकेतस्थळासाठी सहमती दिलेली नाही.',
	'centralauth-prefs-manage'             => 'तुमच्या एकत्रीत खात्याच्या पसंती बदला',
	'centralauth-renameuser-abort'         => '<div class="errorbox">$1 या सदस्य नावाचा एकत्रीत खात्यामध्ये समावेश केलेला असल्यामुळे इथे सदस्यनाम बदलता येत नाही.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">सदस्य $2 चे नाव बदलू शकत नाही कारण ते विश्व खात्यासाठी राखून ठेवलेले आहे.</div>',
	'centralauth-invalid-wiki'             => 'असा विकि नाही DB: $1',
	'centralauth-account-exists'           => 'खाते तयार करू शकत नाही: मागितलेले सदस्यनाम खाते एकत्रीकरणासाठी अगोदरच वापरण्यात आलेले आहे.',
);

/** Erzya (эрзянь кель)
 * @author Amdf
 */
$messages['myv'] = array(
	'centralauth-admin-username' => 'Совицянь лем:',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'mergeaccount'                         => 'Status vun dat Tohoopföhren vun de Brukerkonten',
	'centralauth-desc'                     => 'Brukerkonten vun Wikis vun de Wikimedia Foundation [[{{ns:Special}}:MergeAccount|tohoopföhren]]',
	'centralauth-mergeaccount-desc'        => '[[{{ns:Special}}:MergeAccount|föhrt verschedene Brukerkonten för’t Global Brukerkonto tohoop]]',
	'centralauth-merge-notlogged'          => '<span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} Mell di an], </span> natokieken, wat diene Brukerkonten ok kumplett tohoopföhrt sünd.',
	'centralauth-merge-welcome'            => "'''Dien Brukerkonto is noch nich in dat globale Wikimedia-Anmell-System rövertrocken.'''

Wenn du mit dien Brukerkonto rövertrecken wullt, hest du vun denn af an de Mööglichkeit, di mit een gemeensam Brukernaam un een Passwoort överall op alle Wikimedia-Projekten in alle mööglichen Spraken antomellen.
Dat maakt de Arbeit in gemeensam bruukte Projekten eenfacher, to’n Bispeel dat Hoochladen vun Datein na [http://commons.wikimedia.org/ Wikimedia Commons] un verhinnert de Problemen, de vörkaamt, wenn twee Lüüd in verschedene Projekten densülven Brukernaam hebbt.

Wenn al en annern dien Brukernaam op en anner Projekt bruukt, denn is dat ok keen Problem. Du kannst na dat Rövertrecken later mit em oder mit Help vun en Administrater na en Weg söken, dat Problem to lösen.",
	'centralauth-merge-step1-title'        => 'Mit Tohoopföhren vun Brukerkonten anfangen',
	'centralauth-merge-step1-detail'       => 'Dien Passwoort un dien indragene E-Mail-Adress warrt mit Brukerkonten in de annern Wikis afgleken, wat se övereenstimmen doot. Dor warrt noch nix ännert, solang du nich seggt hest, dat dat allens so bi de Reeg is.',
	'centralauth-merge-step1-submit'       => 'Anmell-Informatschonen bestätigen',
	'centralauth-merge-step2-title'        => 'Bestätige noch mehr Brukerkonten',
	'centralauth-merge-step2-detail'       => 'Welk vun de Brukerkonten kunnen nich automaatsch mit dien Heimat-Wiki tohoopbröcht warrn. Wenn disse Konten di tohöört, denn kannst du dat bestätigen, wenn du dat Passwoort to disse Konten ingiffst.',
	'centralauth-merge-step2-submit'       => 'Anmell-Informatschonen bestätigen',
	'centralauth-merge-step3-title'        => 'Vereenigt Brukerkonto opstellen',
	'centralauth-merge-step3-detail'       => 'Du kannst nu en tohoopföhrt Brukerkonto för disse Wikis opstellen:',
	'centralauth-merge-step3-submit'       => 'Brukers tohoopföhren',
	'centralauth-complete'                 => 'Vereenigen vun de Brukerkonten trech.',
	'centralauth-incomplete'               => 'Vereenigen vun de Brukerkonten nich trech.',
	'centralauth-complete-text'            => 'Du kannst di nu op all Wikimedia-Projekten anmellen ahn en nee Brukerkonto optostellen; desülve Brukernaam un datsülve Passwoort gellt för Wikipedia, Wiktionary, Wikibooks un all de Süsterprojekten in all de Spraken.',
	'centralauth-incomplete-text'          => 'Wenn diene Brukerkonten tohoopföhrt sünd, kannst du di op all Wikimedia-Projekten anmellen ahn en nee Brukerkonto optostellen; desülve Brukernaam un datsülve Passwoort gellt för Wikipedia, Wiktionary, Wikibooks un all de Süsterprojekten in all de Spraken.',
	'centralauth-not-owner-text'           => 'De Brukernaam „$1“ is automaatsch den Egendömer vun dat Brukerkonto op $2 towiest worrn.

Wenn dat dien Brukerkonto is, denn kannst du dat Tohoopföhren dör Ingeven vun dat Passwoort för dat Brukerkonto toenn bringen:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Demomodus</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Dat Tohoopföhren vun Brukerkonten is opstunns noch in’n Demo- un Fehlersöök-Modus. Dat Tohoopföhren sülvst geiht noch nich.',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Lees mehr över dat '''Tohoopföhren vun Brukerkonten''']] …''",
	'centralauth-list-home-title'          => 'Heimatwiki',
	'centralauth-list-home-dryrun'         => 'Dat Passwoort un de E-Mail-Adress, de du in dit Wiki indragen hest, warrt för dat Tohoopföhren vun de Brukerkonten bruukt un diene Brukersiet warrt automaatsch vun de annern Wikis ut verlenkt. Du kannst later dien Heimat-Wiki ok noch wedder ännern.',
	'centralauth-list-attached-title'      => 'Vereenigte Brukerkonten',
	'centralauth-list-attached'            => 'De Brukerkonten mit’n Naam „$1“ op disse Projekten warrt automaatsch tohoopföhrt:',
	'centralauth-list-attached-dryrun'     => 'De Brukerkonten mit’n Naam „$1“ op disse Projekten warrt automaatsch tohoopföhrt:',
	'centralauth-list-unattached-title'    => 'Nich tohoopföhrte Brukerkonten',
	'centralauth-list-unattached'          => 'Dat dat Brukerkonto „$1“ di tohöört, kunn för disse Projekten nich automaatsch bestätigt warrn; wohrschienlich hett dat en anner Passwoort as dien eerst Brukerkonto:',
	'centralauth-foreign-link'             => 'Bruker $1 op $2',
	'centralauth-finish-title'             => 'Tohoopföhren trech',
	'centralauth-finish-text'              => 'Wenn disse Brukerkonten di tohöört, denn kannst du hier dat Tohoopföhren vun de Brukerkonten dör Ingeven vun dat Passwoort för de annern Brukerkonten toenn bringen:',
	'centralauth-finish-password'          => 'Passwoort:',
	'centralauth-finish-login'             => 'Anmellen',
	'centralauth-finish-send-confirmation' => 'Passwoort över E-Mail toschicken',
	'centralauth-finish-problems'          => 'Hest du Problemen oder höört di disse annern Brukerkonten nich to? [[meta:Help:Unified login problems|Hier kriggst du Help]] …',
	'centralauth-merge-attempt'            => "'''Dat ingevene Passwoort warrt mit de nablevenen nich tohoopföhrten Brukerkonten vergleken …'''",
	'centralauth-attach-list-attached'     => 'To dat tohoopföhrte Brukerkonto mit’n Naam „$1“ höört disse Brukerkonten to:',
	'centralauth-attach-title'             => 'Brukerkonto bestätigen',
	'centralauth-attach-text'              => 'Dit Brukerkonto is noch nich na dat tohoopföhrte Brukerkonto rövertrocken.
Wenn dat globale Brukerkonto ok dien is, denn kannst du dit Brukerkonto mit dat globale tohoopföhren. Geev dor dien Passwoort för dat globale Brukerkonto för in:',
	'centralauth-attach-submit'            => 'Brukerkonto rövertrecken',
	'centralauth-attach-success'           => 'Dat Brukerkonto is na dat tohoopföhrte Brukerkonto rövertrocken.',
	'centralauth'                          => 'Verwalten för dat Tohoopföhren vun Brukerkonten',
	'centralauth-admin-manage'             => 'Brukerdaten verwalten',
	'centralauth-admin-username'           => 'Brukernaam:',
	'centralauth-admin-lookup'             => 'Brukerdaten ankieken oder ännern',
	'centralauth-admin-permission'         => 'Dat Tohoopföhren vun Brukerkonten för annere Brukers köönt blot Stewards maken.',
	'centralauth-admin-unmerge'            => 'Utwählte Brukerkonten uteneen nehmen',
	'centralauth-admin-merge'              => 'Utwählte Brukerkonten tohoopföhren',
	'centralauth-admin-bad-input'          => 'Fehler mit de Utwahl',
	'centralauth-admin-none-selected'      => 'Kene Brukerkonten utwählt, de ännert warrn schöölt.',
	'centralauth-prefs-status'             => 'Status vun’t globale Brukerkonto:',
	'centralauth-prefs-not-managed'        => 'Warrt keen tohoopföhrt Brukerkonto bruukt.',
	'centralauth-prefs-unattached'         => 'Noch nich bestätigt',
	'centralauth-prefs-complete'           => 'Trech!',
	'centralauth-prefs-migration'          => 'Bi’t Rövertrecken',
	'centralauth-prefs-count-attached'     => 'Dien Brukerkonto is op {{PLURAL:$1|een Projekt|$1 Projekten}} aktiv.',
	'centralauth-prefs-count-unattached'   => 'Dat gifft op {{PLURAL:$1|een Projekt noch en Brukerkonto mit dien Naam, dat nich bestätigt is.|$1 Projekten noch Brukerkonten mit dien Naam, de nich bestätigt sünd.}}',
	'centralauth-prefs-detail-unattached'  => 'För dit Projekt is dat tohoopföhrte Brukerkonto noch nich bestätigt.',
	'centralauth-prefs-manage'             => 'Dien global Brukerkonto bearbeiden',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Bruker $1 kunn lokal keen ne’en Naam kriegen, dat Konto is al op dat globale Brukerkonten-System rövertrocken.</div>',
);

/** Dutch (Nederlands)
 * @author Siebrand
 * @author SPQRobin
 * @author Meursault2004
 */
$messages['nl'] = array(
	'mergeaccount'                         => 'Status samenvoegen gebruikers',
	'centralauth-desc'                     => "[[Special:MergeAccount|Samengevoegde gebruikers]] binnen Wikimedia Foundation wiki's",
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Meerdere gebruikers samenvoegen]] voor Single User Login',
	'centralauth-merge-denied'             => 'Sorry, u hebt geen toegang tot deze pagina.',
	'centralauth-merge-notlogged'          => '<span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} Meld u aan]</span> om te controleren of uw gebruikers volledig zijn samengevoegd.',
	'centralauth-merge-welcome'            => "'''Uw gebruiker is nog niet gemigreerd naar Wikimedia's samengevoegde aanmeldsysteem.'''

Als u ervoor kiest om uw gebruikers te migreren, dan kunt u met dezelfde gebruikersnaam-wachtwoordcombinatie aanmelden bij alle projectwiki's van Wikimedia in alle beschikbare talen.
Dit maakt het eenvoudiger om te werken met gedeelde projecten, zoals het uploaden naar [http://commons.wikimedia.org/ Wikimedia Commons], en voorkomt verwarring of conflicten doordat twee mensen dezelfde gebruikersnaam kiezen op verschillende projecten.

Als iemand anders met uw gebruikersnaam al actief is op een andere site, dan heeft dat geen gevolgen voor die gebruiker. U hebt de mogelijkheid dat niet die gebruiker of een beheerder op een later moment op te lossen.",
	'centralauth-merge-step1-title'        => 'Samenvoegen gebruikers starten',
	'centralauth-merge-step1-detail'       => "Uw wachtwoord en geregistreerd e-mailadres worden gecontroleerd tegen de gebruikers op andere wiki's om te bevestigen dat ze overeenkomen.
Er worden geen wijzigingen gemaakt tot u hebt aangegeven dat alles in orde lijkt.",
	'centralauth-merge-step1-submit'       => 'Aanmeldinformatie bevestigen',
	'centralauth-merge-step2-title'        => 'Meer gebruikers bevestigen',
	'centralauth-merge-step2-detail'       => 'Een aantal van de gebruikers konden niet aan de opgegeven thuiswiki gekoppeld worden. Als deze gebruikers van u zijn, kunt u dat aangeven door het wachtwoord voor de gebruikers op te geven.',
	'centralauth-merge-step2-submit'       => 'Aanmeldinformatie bevestigen',
	'centralauth-merge-dryrun-complete'    => 'Alle bestaande gebruikers kunnen automatisch samengevoegd worden!

Er zijn nog geen wijzigingen aan uw gebruiker gemaakt.',
	'centralauth-merge-dryrun-incomplete'  => 'U bent u klaar om verder te gaan, maar een aantal gebruikers konden niet automatisch bevestigd worden en worden dus niet automatisch gemigreerd. De kunt u op een later moment samenvoegen.

Er zijn nog geen wijzigingen aan uw gebruiker gemaakt.',
	'centralauth-merge-dryrun-or'          => "'''of'''",
	'centralauth-merge-dryrun-home'        => 'Het migratiesysteem kon niet bevestigen dat u de eigenaar bent van de gebruiker op de thuiswiki voor uw gebruiker.

Er is een andere wiki vastgesteld als thuiswiki voor uw gebruiker; volg de link hieronder en meld u daar aan om uw gebruikersmigratie te voltooien.',
	'centralauth-merge-step3-title'        => 'Samengevoegde gebruiker aanmaken',
	'centralauth-merge-step3-detail'       => "U kunt nu uw samengevoegde gebruiker maken, met daarin opgenomen de volgende wiki's:",
	'centralauth-merge-step3-submit'       => 'Gebruikers samenvoegen',
	'centralauth-complete'                 => 'Samenvoegen gebruikers afgerond!',
	'centralauth-incomplete'               => 'Samenvoegen gebruikers niet volledig!',
	'centralauth-complete-text'            => 'U kunt nu aanmelden bij iedere wiki van Wikimedia zonder een nieuwe gebruiker aan te maken; dezelfde combinatie van gebruikersnaam en wachtwoord werkt voor Wikipedia, Wiktionary, Wikibooks en hun zusterprojecten in alle talen.',
	'centralauth-incomplete-text'          => 'Als uw gebruikers zijn samengevoegd kunt u aanmelden bij iedere wiki van Wikimedia zonder een nieuwe gebruiker aan te maken; dezelfde combinatie van gebruikersnaam en wachtwoord werkt voor Wikipedia, Wiktionary, Wikibooks en hun zusterprojecten in alle talen.',
	'centralauth-not-owner-text'           => 'De gebruikersnaam "$1" is automatisch toegewezen aan de eigenaar van de gebruiker op $2.

Als u dat bent, kunt u het samenvoegen van gebruikers afronden door hier het wachtwoord voor die gebruiker in te geven:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Alleen demonstratiemodus</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Samenvoegen gebruikers is op dit moment beschikbaar in demonstratie- en debugmodus. Het samenvoegen van gebruikers is op dit moment dus niet mogelijk.',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Lees meer over '''samengevoegd aanmelden''']]...''",
	'centralauth-list-home-title'          => 'Thuiswiki',
	'centralauth-list-home-dryrun'         => 'Het wachtwoord en e-mailadres dat voor deze wiki is ingesteld wordt gebruikt voor uw samengevoegde gebruiker.
Later kunt u instellen welke wiki uw thuiswiki is.',
	'centralauth-list-attached-title'      => 'Betrokken gebruikers',
	'centralauth-list-attached'            => 'De gebruikers met de naam "$1" op de volgende sites zijn automatisch samengevoegd:',
	'centralauth-list-attached-dryrun'     => 'De gebruiker met de naam "$1" op de volgende sites wordt automatisch toegevoegd aan de samengevoegde gebruiker:',
	'centralauth-list-unattached-title'    => 'Niet betrokken gebruikers',
	'centralauth-list-unattached'          => 'De gebruiker "$1" kon niet automatisch aan u toegewezen worden voor de volgende sites; waarschijnlijk omdat het wachtwoord afwijkt van uw primaire gebruiker:',
	'centralauth-foreign-link'             => 'Gebruiker $1 op $2',
	'centralauth-merge-method-primary'     => 'thuiswiki',
	'centralauth-merge-method-empty'       => 'geen bijdragen',
	'centralauth-merge-method-mail'        => 'per e-mail bevestigd',
	'centralauth-merge-method-password'    => 'per wachtwoord bevestigd',
	'centralauth-merge-method-admin'       => 'door beheerder samengevoegd',
	'centralauth-merge-method-new'         => 'nieuwe gebruiker',
	'centralauth-merge-method-login'       => 'bevestigd door aanmelden',
	'centralauth-finish-title'             => 'Samenvoegen afronden',
	'centralauth-finish-text'              => 'Als deze gebruikers bij u horen, dan kunt u het proces van samenvoegen afronden door de wachtwoorden voor de andere gebruikers hier in te voeren:',
	'centralauth-finish-password'          => 'Wachtwoord:',
	'centralauth-finish-login'             => 'Gebruikersnaam',
	'centralauth-finish-send-confirmation' => 'Wachtwoord e-mailen',
	'centralauth-finish-problems'          => 'Komt u er niet uit of zijn deze gebruikers niet van u?
[[meta:Help:Unified login problems|Hoe hulp vinden]]...',
	'centralauth-finish-noconfirms'        => 'Met dit wachtwoord zijn geen gebruikers bevestigd.',
	'centralauth-finish-incomplete'        => 'Met dit wachtwoord zijn meerdere gebruikers bevestigd.
Er zijn nog gebruikers die niet bevestigd zijn.',
	'centralauth-merge-attempt'            => "'''Bezig met het controleren van de opgegeven wachtwoorden voor de nog niet samengevoegde gebruikers...'''",
	'centralauth-attach-list-attached'     => 'De samengevoegde gebruiker "$1" bestaat uit de volgende gebruikers:',
	'centralauth-attach-title'             => 'Gebruiker bevestigen',
	'centralauth-attach-text'              => 'Deze gebruiker is nog niet gemigreerd naar een samengevoegde gebruiker. Als de overkoepelende gebruiker ook van u is, dan kunt u deze gebruiker samenvoegen als u het wachtwoord voor de overkoepelende gebruiker ingeeft:',
	'centralauth-attach-submit'            => 'Gebruiker migreren',
	'centralauth-attach-success'           => 'De gebruiker is gemigreerd naar de samengevoegde gebruiker.',
	'centralauth'                          => 'Samengevoegd aanmelden beheren',
	'centralauth-admin-manage'             => 'Gebruikersgegevens beheren',
	'centralauth-admin-username'           => 'Gebruikersnaam:',
	'centralauth-admin-lookup'             => 'Gebruikersgegevens bekijken of bewerken',
	'centralauth-admin-permission'         => 'Alleen stewards kunnen gebruikers van anderen samenvoegen.',
	'centralauth-admin-no-unified'         => 'Er is geen samengevoegde gebruik voor deze gebruikersnaam.',
	'centralauth-admin-info-id'            => 'Gebruikersnummer:',
	'centralauth-admin-info-registered'    => 'Geregistreerd:',
	'centralauth-admin-info-locked'        => 'Gedeactiveerd:',
	'centralauth-admin-info-hidden'        => 'Verborgen:',
	'centralauth-admin-yes'                => 'ja',
	'centralauth-admin-no'                 => 'nee',
	'centralauth-admin-attached'           => 'Volledig samengevoegde gebruikers',
	'centralauth-admin-unattached'         => 'Niet verbonden gebruikers',
	'centralauth-admin-no-unattached'      => 'Alle gebruikers zijn samengevoegd.',
	'centralauth-admin-list-localwiki'     => 'Lokale wiki',
	'centralauth-admin-list-attached-on'   => 'Verbonden op',
	'centralauth-admin-list-method'        => 'Methode',
	'centralauth-admin-unmerge'            => 'Geselecteerde gebruikers splitsen',
	'centralauth-admin-merge'              => 'Geselecteerde gebruikers samenvoegen',
	'centralauth-admin-bad-input'          => 'Onjuiste samenvoegselectie',
	'centralauth-admin-none-selected'      => 'Er zijn geen gebruikers geselecteerd om te wijzigen',
	'centralauth-admin-already-unmerged'   => '$1 overgeslagen. Is al niet meer samengevoegd',
	'centralauth-admin-unmerge-success'    => 'Het ongedaan maken van het samenvoegen is geslaagd voor $1 {{PLURAL:$2|gebruiker|gebruikers}}',
	'centralauth-admin-delete-title'       => 'Verwijder gebruiker',
	'centralauth-admin-delete-description' => 'Met het verwijderen van de globale gebruiker worden alle globale voorkeuren verwijderd, alle lokale gebruikers ontkoppeld, en de globale gebruiker komt beschikbaar voor een andere gebruiker.
Alle lokale gebruikers blijven bestaan.
De wachtwoorden voor de lokale gebruikers worden teruggezet naar de wachtwoorden zoals die waren voor het samenvoegen.',
	'centralauth-admin-delete-button'      => 'Verwijder deze gebruiker',
	'centralauth-admin-delete-success'     => 'Het verwijderen van de globale gebruiker "<nowiki>$1</nowiki>" is geslaagd',
	'centralauth-admin-nonexistent'        => 'Er is geen globale gebruiker voor "<nowiki>$1</nowiki>"',
	'centralauth-admin-delete-nonexistent' => 'Fout: de globale gebruiker "<nowiki>$1</nowiki>" bestaat niet.',
	'centralauth-token-mismatch'           => 'Vanwege verlies van de sessiegegevens kon uw verzoek niet verwerkt worden.',
	'centralauth-admin-lock-title'         => 'Gebruiker afsluiten',
	'centralauth-admin-lock-description'   => 'Afgesloten gebruikers kunnen niet meer gebruikt worden om bij een wiki aan te melden.',
	'centralauth-admin-lock-button'        => 'Deze gebruiker afsluiten',
	'centralauth-admin-lock-success'       => 'Het afsluiten van de globale gebruiker "<nowiki>$1</nowiki>" is geslaagd',
	'centralauth-admin-lock-nonexistent'   => 'Fout: de globale gebruiker "<nowiki>$1</nowiki>" bestaat niet.',
	'centralauth-admin-unlock-title'       => 'Gebruiker vrijgeven',
	'centralauth-admin-unlock-description' => 'Vrijgegeven gebruikers kunnen weer gebruikt worden.',
	'centralauth-admin-unlock-button'      => 'Deze gebruiker vrijgeven',
	'centralauth-admin-unlock-success'     => 'Het vrijgeven van de globale gebruiker "<nowiki>$1</nowiki>" is geslaagd',
	'centralauth-admin-unlock-nonexistent' => 'Fout: de globale gebruiker "<nowiki>$1</nowiki>" bestaat niet.',
	'centralauth-admin-reason'             => 'Reden:',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|seconde|seconden}} geleden',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|minuut|minuten}} geleden',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|uur|uur}} geleden',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|dag|dagen}} geleden',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|maand|maanden}} geleden',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|jaar|jaar}} geleden',
	'centralauth-prefs-status'             => 'Globale gebruikerstatus:',
	'centralauth-prefs-not-managed'        => 'Gebruikt geen samengevoegde gebruiker',
	'centralauth-prefs-unattached'         => 'Niet bevestigd',
	'centralauth-prefs-complete'           => 'Alles in orde!',
	'centralauth-prefs-migration'          => 'Bezig met migreren',
	'centralauth-prefs-count-attached'     => 'Uw gebruiker is actief in {{PLURAL:$1|één projectsite|$1 projectsites}}.',
	'centralauth-prefs-count-unattached'   => 'Niet-bevestigde gebruikers met uw naam zijn nog aanwezig op {{PLURAL:$1|één project|$1 projecten}}.',
	'centralauth-prefs-detail-unattached'  => 'Deze projectsite is niet bevestigd als behorende bij de globale gebruiker.',
	'centralauth-prefs-manage'             => 'Uw globale gebruiker beheren',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Gebruiker $1 kan plaatselijk niet hernoemd worden omdat deze gebruiker gemigreerd is naar het systeem van samengevoegde gebruikers.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">U kunt gebruiker $2 niet hernoemen, omdat deze naam gereserveerd is voor een samengevoegde gebruiker.</div>',
	'centralauth-invalid-wiki'             => 'De wikidatabase bestaat niet: $1',
	'centralauth-account-exists'           => 'Deze gebruiker kan niet aangemaakt worden: de gebruikersnaam is al in gebruik in het systeem voor samengevoegd aanmelden.',
	'centralauth-log-name'                 => 'Logboek globaal gebruikersbeheer',
	'centralauth-log-header'               => 'Dit logboek bevat handelingen voor globale gebruikers: verwijderingen, afsluiten en vrijgeven.',
	'centralauth-log-entry-delete'         => 'heeft de globale gebruiker "<nowiki>$1</nowiki>" verwijderd',
	'centralauth-log-entry-lock'           => 'heeft de globale gebruiker "<nowiki>$1</nowiki>" afgesloten',
	'centralauth-log-entry-unlock'         => 'heeft de globale gebruiker "<nowiki>$1</nowiki>" vrijgegeven',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Eirik
 * @author Jorunn
 * @author Jon Harald Søby
 */
$messages['nn'] = array(
	'mergeaccount'                         => 'Status for samanslåing av kontoar',
	'centralauth-desc'                     => '[[Special:MergeAccount|Slå saman kontoar]] på wikiane til Wikimedia Foundation',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Slå saman fleire kontoar]] for felles innlogging',
	'centralauth-merge-denied'             => 'Beklagar, du har ikkje tilgang til å bruke denne sida.',
	'centralauth-merge-notlogged'          => 'Ver venleg og <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special:MergeAccount}} logg inn]</span> for å sjekke om kontoane dine er fullstendig slått saman.',
	'centralauth-merge-dryrun-or'          => "'''eller'''",
	'centralauth-merge-step3-submit'       => 'Slå saman kontoane',
	'centralauth-complete'                 => 'Kontosamanslåinga er fullførd!',
	'centralauth-incomplete'               => 'Kontosamanslåinga er ikkje ferdig.',
	'centralauth-complete-text'            => 'Du kan nå logge inn på kva for helst Wikimedia-wiki utan å opprette ny konto; same brukarnamn vil fungere på Wikipedia og systerprosjekta på alle språk.',
	'centralauth-not-owner-text'           => 'Brukarnamnet «$1» vart automatisk tildeld eigaren av kontoen på $2.

Om dette er deg kan du fullføre prosessen for samanslåing ved å skrive inn hovudpassordet for kontoen her:',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Les meir om '''kontosamanslåing''']]…''",
	'centralauth-list-home-title'          => 'Heimwiki',
	'centralauth-list-home-dryrun'         => 'Passordet og e-postadressa som vert brukte på denne wikien vil verte brukte for den samanslegne kontoen.
Du kan endre kva wiki som vert rekna som heimewikien din sidan.',
	'centralauth-list-attached-title'      => 'Tilslutta kontoar',
	'centralauth-list-attached-dryrun'     => 'Kontoen kalla «$1» på følgjande sider vil koblast til den samanslegne kontoen automatisk:',
	'centralauth-list-unattached-title'    => 'Utilslutta kontoar',
	'centralauth-foreign-link'             => 'Brukar $1 på $2',
	'centralauth-merge-method-primary'     => 'heimwiki',
	'centralauth-merge-method-empty'       => 'ingen bidrag',
	'centralauth-merge-method-mail'        => 'e-poststadfesta',
	'centralauth-merge-method-password'    => 'passordstadfesta',
	'centralauth-merge-method-admin'       => 'slegne saman av administrator',
	'centralauth-merge-method-new'         => 'ny konto',
	'centralauth-merge-method-login'       => 'stadfest med innlogging',
	'centralauth-finish-title'             => 'Fullfør samanslåinga',
	'centralauth-finish-text'              => 'Om desse kontoane er dine kan du fullføre kontosamanslåinga ved å skrive inn passordet for dei andre kontoane her:',
	'centralauth-finish-password'          => 'Passord:',
	'centralauth-finish-login'             => 'Logg inn',
	'centralauth-finish-send-confirmation' => 'Send nytt passord med e-post',
	'centralauth-finish-problems'          => 'Oppstår det vanskar, eller er ikkje desse andre kontoane dine? Har du problemer, eller er ikke disse andre kontoene dine? [[meta:Help:Unified login problems|Sjå hjelpeside på Meta…]]',
	'centralauth-finish-noconfirms'        => 'Ingen kontoar kunne stadfestat med dette passordet.',
	'centralauth-finish-incomplete'        => 'Fleire kontoar vart slegne saman med dette passordet. Andre kan framleis ikkje stadfestast.',
	'centralauth-merge-attempt'            => "'''Kontrollerar det oppgjevne passordet mot dei attståande kontoane…'''",
	'centralauth-attach-list-attached'     => 'Den samanslegne kontoen med namnet «$1» femner desse kontoane:',
	'centralauth-attach-title'             => 'Stadfest konto',
	'centralauth-attach-text'              => 'Denne kontoen er enno ikkje vorten slegen saman med hovudkontoen. Om hovudkontoen også er din kan du koble denne til han ved å skrive inn passordet til hovudkontoen:',
	'centralauth-admin-username'           => 'Brukarnamn:',
	'centralauth-admin-info-id'            => 'Brukar-ID:',
	'centralauth-admin-yes'                => 'ja',
	'centralauth-admin-no'                 => 'nei',
	'centralauth-admin-list-localwiki'     => 'Lokal wiki',
	'centralauth-admin-list-attached-on'   => 'Samanslåingsdato',
	'centralauth-admin-list-method'        => 'Metode',
	'centralauth-admin-unmerge'            => 'Skil ut att dei valde',
	'centralauth-admin-merge'              => 'Slå saman dei valde',
	'centralauth-admin-bad-input'          => 'Ugyldig val for samanslåing',
	'centralauth-admin-none-selected'      => 'Ingen kontoar er valde til endring.',
	'centralauth-seconds-ago'              => '{{PLURAL:$1|Éitt sekund|$1 sekund}} sidan',
	'centralauth-minutes-ago'              => '{{PLURAL:$1|Éitt minutt|$1 minutt}} sidan',
	'centralauth-hours-ago'                => '{{PLURAL:$1|Éin time|$1 timar}} sidan',
	'centralauth-days-ago'                 => '{{PLURAL:$1|Éin dag|$1 dagar}} sidan',
	'centralauth-months-ago'               => '{{PLURAL:$1|Éin månad|$1 månader}} sidan',
	'centralauth-years-ago'                => '{{PLURAL:$1|Éitt år|$1 år}} sidan',
	'centralauth-prefs-status'             => 'Status for samanslått konto:',
	'centralauth-prefs-not-managed'        => 'Brukar ikkje samanslått konto',
	'centralauth-prefs-unattached'         => 'Ikkje stadfesta',
	'centralauth-prefs-complete'           => 'Alt er i orden!',
	'centralauth-prefs-migration'          => 'Held på med samanslåing',
	'centralauth-prefs-count-attached'     => 'Kontoen din er aktiv på {{plural:$1|éitt prosjekt|$1 prosjekt}}.',
	'centralauth-prefs-count-unattached'   => 'Ikkje stadfesta kontoar med namnet ditt står att på {{plural:$1|éitt prosjekt|$1 prosjekt}}.',
	'centralauth-prefs-detail-unattached'  => 'Det er ikkje stadfesta at denne kontoen er slått saman med hovudkontoen.',
	'centralauth-prefs-manage'             => 'Handsam hovudkontoen din',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Kan ikkje endre namn på brukaren $1 lokalt fordi brukarnamnet er ein del av systemet med samanslåtte kontoar.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Kan ikkje endre namn på brukaren $2 fordi dette brukarnamnet er reservert av ein felleskonto.</div>',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 * @author Stigmj
 * @author Atluxity
 * @author Siebrand
 */
$messages['no'] = array(
	'mergeaccount'                         => 'Status for sammenslåing av kontoer',
	'centralauth-desc'                     => '[[Special:MergeAccount|Slå sammen kontoer]] på Wikimedia Foundations wikier',
	'centralauth-mergeaccount-desc'        => "[[Special:MergeAccount|Slå sammen flere kontoer]] for ''Single User Login''",
	'centralauth-merge-denied'             => 'Du har ikke tilgang til å bruke denne siden.',
	'centralauth-merge-notlogged'          => 'Vennligst <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special:MergeAccount}} logg inn]</span> for å sjekke om kontoene dine har blitt fullstendig slått sammen.',
	'centralauth-merge-welcome'            => "'''Din brukerkonto har ennå ikke gått over til Wikimedias enhetlige innlogginssystem.'''

Om du velger å flytte kontoene dine kan du bruke samme brukernavn og passord for å logge inn på alle Wikimedias prosjekter på alle språk.
Dette gjør det enklere å arbeide med delte prosjekter, som opplasting til [http://commons.wikimedia.org/ Wikimedia Commons], og unngår forvirringene og konfliktene som kan oppstå dersom to personer på forskjellige prosjekter bruker samme brukernavn.

Dersom noen allerede har tatt ditt brukernavn på et annet prosjekt vil ikke dette påvirke dem ennå, men gi deg muligheten til å finne ut av sakene med dem eller en administrator senere.",
	'centralauth-merge-step1-title'        => 'Begynn kontosammenslåing',
	'centralauth-merge-step1-detail'       => 'Ditt passord og din e-postadresse vil bli sjekket opp mot kontoene på andre wikier for å bekrefte at de stemmer overens. Ingen endringer vil bli gjort før du har bekreftet at alt ser riktig ut.',
	'centralauth-merge-step1-submit'       => 'Bekreft innloggingsinformasjon',
	'centralauth-merge-step2-title'        => 'Bekreft flere kontoer',
	'centralauth-merge-step2-detail'       => 'For noen av kontoene var det ikke mulig å automatisk avgjøre om de var den samme som den på hjemmewikien. Om disse kontoene tilhører deg kan du bekrefte at de er dine ved å oppgi kontoenes passord.',
	'centralauth-merge-step2-submit'       => 'Bekreft innloggingsinformasjon',
	'centralauth-merge-dryrun-complete'    => 'Alle eksisterende kontoer kan slås sammen automatisk.

Kontoene dine har ikke blitt endret ennå.',
	'centralauth-merge-dryrun-incomplete'  => 'Vi er klare for å fortsette, men noen kontoer kunne ikke bekreftes automatisk, og vil ikke slås sammen foreløpig. Du vil kunne slå sammen disse senere.

Kontoene dine har ikke blitt endret ennå.',
	'centralauth-merge-dryrun-or'          => "'''eller'''",
	'centralauth-merge-dryrun-home'        => 'Systemet for kontosammenslåing kunne ikke bekrefte at du er eieren av kontoen på hjemmewikien.

En annen wiki anses som hjemmewiki for brukernavnet ditt; følg lenken nedenfor og logg inn der for å fullføre kontosammenslåingen.',
	'centralauth-merge-step3-title'        => 'Opprett sammenslått konto',
	'centralauth-merge-step3-detail'       => 'Du er klar for å opprette din sammenslåtte konto, med følgende wikier koblet til kontoen:',
	'centralauth-merge-step3-submit'       => 'Slå sammen kontoene',
	'centralauth-complete'                 => 'Kontosammenslåingen er fullført!',
	'centralauth-incomplete'               => 'Kontosammenslåingen er ikke ferdig.',
	'centralauth-complete-text'            => 'Du kan nå logge inn på enhver Wikimedia-wiki uten å opprette en ny konto; samme brukernavn vil fungere på Wikipedia, Wiktionary, Wikibøker og deres søsterprosjekter på alle språk.',
	'centralauth-incomplete-text'          => 'Etter at du har slått sammen kontoene dine vil du kunne logge inn på ethvert Wikimedia-prosjekt uten å opprette en ny konto; samme brukernavn og passord vil fungere på Wikipedia, Wiktionary, Wikibøker og deres søsterprosjekter på alle språk.',
	'centralauth-not-owner-text'           => 'Brukernavnet «$1» ble automatisk tildelt eieren av kontoen på $2.

Om dette er deg kan du fullføre prosessen for sammenslåing ved å skrive inn hovedpassordet for kontoen her:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Kun demonstrasjonsmodus</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Kontosammenslåing er foreløpig i en demonstrasjonsmodus, så faktisk sammenslåing er ikke mulig. Beklager!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Les mer om '''kontosammenslåing''']]…''",
	'centralauth-list-home-title'          => 'Hjemmewiki',
	'centralauth-list-home-dryrun'         => 'Passordet og e-postadressen som brukes på denne wikien vil bli brukt for din sammenslåtte konto.
Du kan endre hvilken wiki som regnes som din hjemmewiki senere.',
	'centralauth-list-attached-title'      => 'Tilkoblede kontoer',
	'centralauth-list-attached'            => 'Kontoen ved navn «$1» på de følgende sidene har automatisk blitt slått sammen til én konto:',
	'centralauth-list-attached-dryrun'     => 'Kontoen ved navn «$1» på følgende sider vil kobles til den sammenslåtte kontoen automatisk:',
	'centralauth-list-unattached-title'    => 'Ikke tilsluttede kontoer',
	'centralauth-list-unattached'          => 'Kontoen «$1» på følgende kunne ikke automatisk stadfestes å tilhøre deg; sannsynligvis har de et annet passord enn hovedkontoen din.',
	'centralauth-foreign-link'             => 'Bruker $1 på $2',
	'centralauth-merge-method-primary'     => 'hjemmewiki',
	'centralauth-merge-method-empty'       => 'ingen bidrag',
	'centralauth-merge-method-mail'        => 'bekreftet via e-post',
	'centralauth-merge-method-password'    => 'bekreftet med passord',
	'centralauth-merge-method-admin'       => 'slått sammen av administrator',
	'centralauth-merge-method-new'         => 'ny konto',
	'centralauth-merge-method-login'       => 'bekreftet via innlogging',
	'centralauth-finish-title'             => 'Fullfør sammenslåing',
	'centralauth-finish-text'              => 'Om disse kontoene tilhører deg kan du fullføre kontosammenslåingen ved å skrive inn passordene for de andre kontoene her:',
	'centralauth-finish-password'          => 'Passord:',
	'centralauth-finish-login'             => 'Logg inn',
	'centralauth-finish-send-confirmation' => 'Send nytt passord',
	'centralauth-finish-problems'          => 'Har du problemer, eller er ikke disse andre kontoene dine? [[meta:Help:Unified login problems|Hvordan finne hjelp…]]',
	'centralauth-finish-noconfirms'        => 'Ingen kontoer kunne bekreftes med dette passordet.',
	'centralauth-finish-incomplete'        => 'Flere kontoer ble slått sammen med dette passordet. Andre kontoer kan fortsatt ikke bekreftes.',
	'centralauth-merge-attempt'            => "'''Sjekker det angitte passordet mot gjenværende kontoer…'''",
	'centralauth-attach-list-attached'     => 'Den sammenslåtte kontoen ved navn «$1» inkluderer følgende kontoer:',
	'centralauth-attach-title'             => 'Bekreft konto',
	'centralauth-attach-text'              => 'Denne kontoen er ennå ikke blitt slått sammen med hovedkontoen. Om hovedkontoen også er din kan du koble denne til den ved å skrive inn hovedkontoens passord:',
	'centralauth-attach-submit'            => 'Koble til konto',
	'centralauth-attach-success'           => 'Kontoen ble koblet til den hovedkontoen.',
	'centralauth'                          => 'Administrasjon av kontosammenslåing',
	'centralauth-admin-manage'             => 'Behandle brukerdata',
	'centralauth-admin-username'           => 'Brukernavn:',
	'centralauth-admin-lookup'             => 'Vis eller rediger brukerdata',
	'centralauth-admin-permission'         => 'Kun stewarder kan slå sammen andres kontoer for dem.',
	'centralauth-admin-no-unified'         => 'Ingen sammenslått konto for dette brukernavnet.',
	'centralauth-admin-info-id'            => 'Bruker-ID:',
	'centralauth-admin-info-registered'    => 'Registrert:',
	'centralauth-admin-info-locked'        => 'Låst:',
	'centralauth-admin-info-hidden'        => 'Skjult:',
	'centralauth-admin-yes'                => 'ja',
	'centralauth-admin-no'                 => 'nei',
	'centralauth-admin-attached'           => 'Fullstendig sammenslåtte kontoer',
	'centralauth-admin-unattached'         => 'Ikke tilsluttede kontoer',
	'centralauth-admin-no-unattached'      => 'Det er ingen flere kontoer å slå sammen.',
	'centralauth-admin-list-localwiki'     => 'Lokal wiki',
	'centralauth-admin-list-attached-on'   => 'Sammenslåingsdato',
	'centralauth-admin-list-method'        => 'Metode',
	'centralauth-admin-unmerge'            => 'Skill ut valgte',
	'centralauth-admin-merge'              => 'Slå sammen valgte',
	'centralauth-admin-bad-input'          => 'Ugyldig valg for sammenslåing',
	'centralauth-admin-none-selected'      => 'Har ikke valgt noen kontoer å endre.',
	'centralauth-admin-already-unmerged'   => 'Hopper over $1, utskilt fra før',
	'centralauth-admin-unmerge-success'    => 'Skilte ut $1 {{PLURAL:$2|konto|kontoer}}',
	'centralauth-admin-delete-title'       => 'Slett konto',
	'centralauth-admin-delete-description' => 'Sletting av den globale kontoen vil slette globale innstillinger, skille ut alle kontoer, og gjøre det globale navnet tilgjengelig for andre brukere. Alle lokale kontoer vil fortsette å eksistere. Passordene til lokale kontoer laget før sammenslåingen vil gå tilbake til verdiene de var før sammenslåingen.',
	'centralauth-admin-delete-button'      => 'Slett denne kontoen',
	'centralauth-admin-delete-success'     => 'Slettet den globale kontoen for «<nowiki>$1</nowiki>»',
	'centralauth-admin-nonexistent'        => 'Det er ingen global konto for «<nowiki>$1</nowiki>»',
	'centralauth-admin-delete-nonexistent' => 'Feil: Den globale kontoen «<nowiki>$1</nowiki>» finnes ikke.',
	'centralauth-token-mismatch'           => 'Beklager, skjemaet kunne ikke lagres på grunn av et tap av øktdata.',
	'centralauth-admin-lock-title'         => 'Lås konto',
	'centralauth-admin-lock-description'   => 'Låsing av en konto vil gjøre det umulig å logge inn med den på noen wikier.',
	'centralauth-admin-lock-button'        => 'Lås denne kontoen',
	'centralauth-admin-lock-success'       => 'Låste den globale kontoen «<nowiki>$1</nowiki>»',
	'centralauth-admin-lock-nonexistent'   => 'Feil: Den globale kontoen «<nowiki>$1</nowiki>» finnes ikke.',
	'centralauth-admin-unlock-title'       => 'Lås opp konto',
	'centralauth-admin-unlock-description' => 'Å låse opp kontoen vil gjøre det mulig å logge inn med den igjen.',
	'centralauth-admin-unlock-button'      => 'Lås opp denne kontoen',
	'centralauth-admin-unlock-success'     => 'Låste opp den globale kontoen «<nowiki>$1</nowiki>»',
	'centralauth-admin-unlock-nonexistent' => 'Feil: Den globale kontoen «<nowiki>$1</nowiki>» finnes ikke.',
	'centralauth-admin-reason'             => 'Årsak:',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|sekund|sekunder}} siden',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|minutt|minutter}} siden',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|time|timer}} siden',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|dag|dager}} siden',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|måned|måneder}} siden',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|år|år}} siden',
	'centralauth-prefs-status'             => 'Status på sammenslått konto:',
	'centralauth-prefs-not-managed'        => 'Bruker ikke sammenslått konto',
	'centralauth-prefs-unattached'         => 'Ubekreftet',
	'centralauth-prefs-complete'           => 'Alt i orden!',
	'centralauth-prefs-migration'          => 'I ferd med å slås sammen',
	'centralauth-prefs-count-attached'     => 'Kontoen din er aktiv på $1 prosjekter.',
	'centralauth-prefs-count-unattached'   => 'Det er fortsatt ubekreftede kontoer med ditt navn på $1 prosjekter.',
	'centralauth-prefs-detail-unattached'  => 'Det er ikke bekreftet at denne kontoen er slått sammen med hovedkontoen.',
	'centralauth-prefs-manage'             => 'Behandle hovedkontoen din',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Kan ikke gi brukeren $1 nytt navn lokalt fordi brukernavnet er del av systemet for sammenslåtte kontoer.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Kan ikke endre navnet på brukeren $2 da dette brukernavnet er reservert for en global konto.</div>',
	'centralauth-invalid-wiki'             => 'Ingen slik database: $1',
	'centralauth-account-exists'           => 'Kan ikke opprette konto. Det angitte brukernavnet er allerede tatt i bruk av en global konto.',
	'centralauth-log-name'                 => 'Logg for behandling av globale kontoer',
	'centralauth-log-header'               => 'Denne loggen inneholder hendelser relatert til globale kontoer: slettinger, låsinger og opplåsinger.',
	'centralauth-log-entry-delete'         => 'slettet den globale kontoen «<nowii>$1</nowiki>»',
	'centralauth-log-entry-lock'           => 'låste den globale kontoen «<nowiki>$1</nowiki>»',
	'centralauth-log-entry-unlock'         => 'låste opp den globale kontoen «<nowiki>$1</nowiki>»',
);

/** Northern Sotho (Sesotho sa Leboa)
 * @author Mohau
 */
$messages['nso'] = array(
	'centralauth-foreign-link'    => 'Moošomiši $1 go $2',
	'centralauth-finish-password' => 'Ditlhaka tša siphiri:',
	'centralauth-admin-username'  => 'Leina la mošomiši:',
);

/** Occitan (Occitan)
 * @author Cedric31
 * @author Siebrand
 */
$messages['oc'] = array(
	'mergeaccount'                         => "Estatut d’unificacion del compte d'utilizaire",
	'centralauth-desc'                     => "[[Special:MergeAccount|Fusiona los comptes d'utilizaires]] de projèctes wikis de la Wikimedia Fondation",
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Fusiona maites comptes]] per l’identificacion unica',
	'centralauth-merge-denied'             => 'O planhèm, avètz pas los dreches per accedir a aquesta pagina.',
	'centralauth-merge-notlogged'          => 'Mercé de plan voler <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} vos connectar]</span> per verificar que vòstres comptes son plan estats acampats.',
	'centralauth-merge-welcome'            => "'''Vòstres comptes d'utilizaire son pas encara estats migrats vèrs lo sistèma de compte unic de Wikimedia.''' 

Se causissètz de far migrar vòstres comptes, poiretz utilizar lo meteis nom d’utilizaire e lo meteis senhal sus totes los projèctes Wikimèdia dins totas las lengas. Atal, lo trabalh interprojèctes serà mai aisit, e mai, per exemple, l’impòrt d’imatges sus [http://commons.wikimedia.org/ Wikimedia Commons] ; aquò evitarà tanben la confusion susvenent quand doas personas utilizant lo meteis nom d’utilizaire sus dos projèctes diferents. Se ja avètz lo meteis nom d’utilizaire sus totes los projèctes, i deurià pas aver de problèma. 

Se una autra persona a lo meteis nom d’utilizaire que vos sus un autre projècte, auretz l'occasion de dintrar en contacte amb aquesta persona o amb un administrator mai tard.",
	'centralauth-merge-step1-title'        => 'Començar lo procediment de fusion dels comptes',
	'centralauth-merge-step1-detail'       => 'Anam comparar vòstra adreça e-mail e vòstre senhal amb los dels comptes omonims suls autres wikis, e verificar que correspòndon. Cap de cambiament serà pas efectuat tant qu’aurètz pas balhat vòstre acòrdi.',
	'centralauth-merge-step1-submit'       => 'Confirmar las entresenhas',
	'centralauth-merge-step2-title'        => 'Inclure d’autres comptes',
	'centralauth-merge-step2-detail'       => 'Cèrts dels comptes an pas pogut èsser ratachats automaticament a vòstre compte principal. Se aquestes comptes vos apartenon, confirmatz que son de vos en dintrant lo senhal correspondent.',
	'centralauth-merge-step2-submit'       => 'Confirmar las entresenhas',
	'centralauth-merge-dryrun-complete'    => 'Totes los comptes existent pòdon èsser unificats automaticament !

Çaquelà, cap de cambiament es pas estat fach per vòstres comptes.',
	'centralauth-merge-dryrun-incomplete'  => 'Avètz decidit de contunhar, mas maites comptes an pas pogut èsser verificats automaticament e seràn pas migrats immediatament. Los poiretz fusionar mai tard.

Çaquelà, cap de cambiament es pas estat fach per vòstres comptes.',
	'centralauth-merge-dryrun-or'          => "'''o'''",
	'centralauth-merge-dryrun-home'        => 'Lo sistèma de migracion a pas pogut confirmar que sètz lo proprietari del compte del wiki principal per çò que concernís vòstre nom d’utilizaire.

Un autre wiki es estat determinat coma compte principal per vòstre nom d’utilizaire ; seguissètz lo ligam çaijós e connectatz-vos per acabar la migracion del compte.',
	'centralauth-merge-step3-title'        => 'Creacion del compte unic',
	'centralauth-merge-step3-detail'       => 'Ara sètz prèst per crear vòstre compte unic, comprenent las wikis seguentas :',
	'centralauth-merge-step3-submit'       => 'Fusionar los comptes',
	'centralauth-complete'                 => 'Unificacion dels comptes acabada !',
	'centralauth-incomplete'               => 'Unificacion del compte pas acabada !',
	'centralauth-complete-text'            => 'Ara vos podètz connectar sus un sit Wikimèdia que que siá sens aver de crear un compte novèl; lo meteis nom d’utilizaire e senhal foncionan sus Wikipèdia, Wikiccionari, Wikilibres e lors projèctes sòrres, aquò, per totas las lengas.',
	'centralauth-incomplete-text'          => 'Un còp vòstre compte unificat, vos poiretz connectar sus un sit Wikimèdia qué qué siá sens aver de crear un compte novèl ; lo meteis nom d’utilizaire e senhal foncionaràn sus Wikipèdia, Wikiccionari, Wikilibres e lors projèctes sòrres, aquò per totas las lengas.',
	'centralauth-not-owner-text'           => "Lo compte d'utilizaire « $1 » es estat automaticament assignat al proprietari del compte sus $2.

Se es vos, poiretz acabar lo procediment d’unificacion de compte en picant lo senhal mèstre per aqueste compte sus :",
	'centralauth-notice-dryrun'            => "<div class='successbox'>Mòde de demonstracion solament</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'La fusion dels comptes es actualament en mòde de demonstracion o de tèst, doncas, se pòt pas encara vertadièrament fusionar los comptes. O planhèm !',
	'centralauth-readmore-text'            => ":''[[w:oc:Wikipèdia:Login unic|Ne saber mai sul '''compte unificat''']]...''",
	'centralauth-list-home-title'          => 'Projècte principal',
	'centralauth-list-home-dryrun'         => 'Lo senhal e l’adreça electronica del projècte principal çaijós seràn utilizats per vòstre compte unic.
Poiretz modificar vòstre projècte principal mai tard.',
	'centralauth-list-attached-title'      => 'Comptes ratachats',
	'centralauth-list-attached'            => "Los comptes d'utilizaires nomenats « $1 » son estats acampats pels sites seguents :",
	'centralauth-list-attached-dryrun'     => 'Lo compte nomenat « $1 » sus cadun dels sits seguents serà automaticament ratachat al compte unic :',
	'centralauth-list-unattached-title'    => 'Comptes non ratachats',
	'centralauth-list-unattached'          => "Lo compte d'utilizaire « $1 » pòt èsser confirmat automaticament pels sites que seguisson ; an probablament un senhal diferent de vòstre compte mèstre :",
	'centralauth-foreign-link'             => 'Utilizaire $1 sus $2',
	'centralauth-merge-method-primary'     => 'wiki principal',
	'centralauth-merge-method-empty'       => 'cap de contribucion',
	'centralauth-merge-method-mail'        => 'confirmat per corrièr electronic',
	'centralauth-merge-method-password'    => 'confirmat per senhal',
	'centralauth-merge-method-admin'       => "compte d'administrator fusionat",
	'centralauth-merge-method-new'         => 'compte novèl',
	'centralauth-merge-method-login'       => 'confirmat a la connexion',
	'centralauth-finish-title'             => 'Completar l’unificacion',
	'centralauth-finish-text'              => 'Se aquestes comptes vos apartenon, podètz acabar lor unificacion en picant los senhals çaijós :',
	'centralauth-finish-password'          => 'Senhal:',
	'centralauth-finish-login'             => "Compte d'utilizaire:",
	'centralauth-finish-send-confirmation' => 'Mandar lo senhal per corrièr electronic',
	'centralauth-finish-problems'          => 'En cas de problèma o se possedissètz pas aquestes autres comptes, vejatz la pagina [[meta:Help:Unified login problems|Problèmas]] (en anglés)...',
	'centralauth-finish-noconfirms'        => 'Cap de compte es pas estat confirmat en utilizant aqueste senhal.',
	'centralauth-finish-incomplete'        => "Maites comptes son estats fusionats en utilizant aqueste senhal. Çaquelà, d'autres comptes son pas confirmats.",
	'centralauth-merge-attempt'            => "'''Verificacion del senhal provesit pels comptes non acampats...'''",
	'centralauth-attach-list-attached'     => 'Lo compte unificat nomenat "$1" inclutz los comptes seguents :',
	'centralauth-attach-title'             => 'Confirmar lo compte',
	'centralauth-attach-text'              => 'Aqueste compte a pas encara estat migrat en un compte unificat. Se lo compte global tanben vos aparten, podètz fusionar aqueste compte se picatz lo senhal del compte global :',
	'centralauth-attach-submit'            => 'Migrar los comptes',
	'centralauth-attach-success'           => 'Lo compte es estat migrat en un compte unificat.',
	'centralauth'                          => 'Administracion dels comptes unificats',
	'centralauth-admin-manage'             => "Administrar las donadas d'utilizaire",
	'centralauth-admin-username'           => "Nom d'utilizaire:",
	'centralauth-admin-lookup'             => "Veire o modificar las donadas d'utilizaire",
	'centralauth-admin-permission'         => 'Sols los stewards pòdon acampar los comptes d’autras personas a lor plaça.',
	'centralauth-admin-no-unified'         => 'Cap de compte unificat per aqueste nom d’utilizaire.',
	'centralauth-admin-info-id'            => 'Numèro d’utilizaire :',
	'centralauth-admin-info-registered'    => 'Enregistrat :',
	'centralauth-admin-info-locked'        => 'varrolhat :',
	'centralauth-admin-info-hidden'        => 'Amagat :',
	'centralauth-admin-yes'                => 'òc',
	'centralauth-admin-no'                 => 'non',
	'centralauth-admin-attached'           => 'Comptes entièrament fusionats',
	'centralauth-admin-unattached'         => 'Comptes pas estacats',
	'centralauth-admin-no-unattached'      => 'Demòra pas cap de compte pas fusionat.',
	'centralauth-admin-list-localwiki'     => 'Wiki local',
	'centralauth-admin-list-attached-on'   => 'Estacats sus',
	'centralauth-admin-list-method'        => 'Metòde',
	'centralauth-admin-unmerge'            => 'Separar la seleccion',
	'centralauth-admin-merge'              => 'Acampar la seleccion',
	'centralauth-admin-bad-input'          => 'Seleccion invalida',
	'centralauth-admin-none-selected'      => 'Cap de compte seleccionat.',
	'centralauth-admin-already-unmerged'   => 'Sautar $1, ja desfusionat',
	'centralauth-admin-unmerge-success'    => '$1 {{PLURAL:$2|compte|comptes}} desfusionats amb succès',
	'centralauth-admin-delete-title'       => 'Suprimir lo compte',
	'centralauth-admin-delete-button'      => 'Suprimir aqueste compte',
	'centralauth-admin-delete-success'     => 'Lo compte global per « <nowiki>$1</nowiki> » es estat suprimit amb succès',
	'centralauth-admin-nonexistent'        => 'Existís pas cap de compte global per « <nowiki>$1</nowiki> »',
	'centralauth-admin-delete-nonexistent' => 'Error : lo compte global « <nowiki>$1</nowiki> » existís pas.',
	'centralauth-token-mismatch'           => 'O planhèm, podèm sometre vòstre formulari a causa de la pèrda de donadas de vòstra sesilha.',
	'centralauth-seconds-ago'              => 'dempuèi $1 {{PLURAL:$1|segonda|segondas}}',
	'centralauth-minutes-ago'              => 'dempuèi $1 {{PLURAL:$1|minuta|minutas}}',
	'centralauth-hours-ago'                => 'dempuèi $1 {{PLURAL:$1|ora|oras}}',
	'centralauth-days-ago'                 => 'dempuèi $1 {{PLURAL:$1|jorn|jorns}}',
	'centralauth-months-ago'               => 'dempuèi $1 {{PLURAL:$1|mes|meses}}',
	'centralauth-years-ago'                => 'dempuèi $1 {{PLURAL:$1|an|ans}}',
	'centralauth-prefs-status'             => 'Estatut del compte unic :',
	'centralauth-prefs-not-managed'        => 'Pas de compte unic',
	'centralauth-prefs-unattached'         => 'Pas confirmat',
	'centralauth-prefs-complete'           => 'Tot va plan!',
	'centralauth-prefs-migration'          => 'En migracion',
	'centralauth-prefs-count-attached'     => 'Vòstre compte es actiu sus $1 projèctes.',
	'centralauth-prefs-count-unattached'   => 'De comptes non confirmats amb lo meteis nom d’utilizaire que lo vòstre se tròban sus $1 projèctes.',
	'centralauth-prefs-detail-unattached'  => 'Vòstre compte sus aqueste projècte a pas pogut èsser ratachat al compte unic.',
	'centralauth-prefs-manage'             => 'Administrar vòstre compte global',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Impossible de tornar nomenar lo compte d\'utilizaire $1 localament : ara, aqueste utilizaire a un compte unic.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Impossible de tornar nomenar $2 coma nom d’utilizaire perque aqueste nom es reservat per un compte global.</div>',
	'centralauth-invalid-wiki'             => 'Cap de banca de donada wiki : $1',
	'centralauth-account-exists'           => 'Impossible de crear lo compte : lo nom d’utilizaire demandat ja es actiu dins lo sistèma dels comptes unificats.',
);

/** Polish (Polski)
 * @author Sp5uhe
 * @author Matma Rex
 * @author Derbeth
 * @author Leinad
 * @author Siebrand
 */
$messages['pl'] = array(
	'mergeaccount'                         => 'Status tworzenia konta globalnego',
	'centralauth-desc'                     => '[[Special:MergeAccount|Łączy konta]] pomiędzy projektami Fundacji Wikimedia',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Łączy różne konta]] w jedno',
	'centralauth-merge-denied'             => 'Niestety nie masz uprawnień pozwalających na dostęp do tej strony.',
	'centralauth-merge-notlogged'          => '<span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} Zaloguj się]</span> by sprawdzić, czy wszystkie Twoje konta zostały przyłączone do konta globalnego.',
	'centralauth-merge-welcome'            => "'''Twoje konto użytkownika nie zostało jeszcze przekształcone na konto globalne.'''

Funkcjonalność konta globalnego, czyli współdzielonego między projektami, pozwala na korzystanie z tej samej nazwy użytkownika i hasła do logowania we wszystkich projektach Wikimedia; we wszystkich wersjach językowych. Ułatwia to np. ładowanie plików na [http://commons.wikimedia.org/ Wikimedia Commons] i pozwala unikać nieporozumień lub nawet konfliktów, które mogą powstać, gdy dwie osoby wybiorą tą samą nazwę użytkownika na różnych projektach.

Jeśli ktoś inny wykorzystuje na innym projekcie identyczną do Twojej nazwę użytkownika, przekształcenie Twojego konta na globalne nie stanie się dla niego problemem, lecz da Ci szansę na późniejsze znalezienie rozwiązania we współpracy bezpośrednio z tą osobą lub z wykorzystaniem pomocy administratorów.",
	'centralauth-merge-step1-title'        => 'Przekształć na globalne',
	'centralauth-merge-step1-detail'       => 'Twoje hasło i zarejestrowany adres e-mail zostaną porównane z kontami na innych wiki, w celu potwierdzenia ich zbieżności. Żadne zmiany nie zostaną wykonane, zanim ich nie zaakceptujesz.',
	'centralauth-merge-step1-submit'       => 'Sprawdzenie informacji o logowaniu',
	'centralauth-merge-step2-title'        => 'Potwierdź więcej kont',
	'centralauth-merge-step2-detail'       => 'Niektóre z kont nie mogły zostać automatycznie przyłączone do konta globalnego. Jeśli te konta należą do Ciebie, możesz potwierdzić, że są Twoje przez podanie haseł do nich.',
	'centralauth-merge-step2-submit'       => 'Potwierdź informację o logowaniu',
	'centralauth-merge-dryrun-complete'    => 'Wszystkie istniejące konta zostaną automatycznie połączone!

Nie wykonano jeszcze żadnych zmian twoich kont.',
	'centralauth-merge-dryrun-incomplete'  => 'Chcesz kontynuować, ale niektóre konta nie mogą być automatycznie zweryfikowane i migracja nie będzie natychmiastowa.
Będziesz mógł połączyć je później.

Nie wykonano jeszcze żadnych zmian twoich kont.',
	'centralauth-merge-dryrun-or'          => "'''lub'''",
	'centralauth-merge-dryrun-home'        => 'System migracji nie może potwierdzić, że jesteś właścicielem konta na wiki domowej pod tą nazwą użytkownika.

Inna wiki została uznana za domową; kliknij w link poniżej i zaloguj się do niej, aby ukończyć migrację konta.',
	'centralauth-merge-step3-title'        => 'Utwórz konto globalne',
	'centralauth-merge-step3-detail'       => 'System jest gotowy do utworzenia konta globalnego, z dołączonymi następującymi wiki:',
	'centralauth-merge-step3-submit'       => 'Utwórz konto globalne',
	'centralauth-complete'                 => 'Tworzenie konta globalnego zakończone!',
	'centralauth-incomplete'               => 'Tworzenie konta globalnego niekompletne!',
	'centralauth-complete-text'            => 'Możesz teraz logować się do każdej wiki należącej do Fundacji Wikimedia bez tworzenia nowego konta;
ta sama nazwa użytkownika i hasło będą działać na Wikipedii, Wikisłowniku, Wikipedii i ich projektach siostrzanych we wszystkich językach.',
	'centralauth-incomplete-text'          => 'Kiedy twój login zostanie ujednolicony, będziesz mógł zalogować się do każdego wiki Fundacji Wikimedia bez tworzenia nowego konta; ta sama nazwa użytkownika i hasło będzie działać na Wikipedii, Wikisłowniku, Wikibooks i ich projektach siostrzanych we wszystkich językach.',
	'centralauth-not-owner-text'           => 'Nazwa użytkownika "$1" została automatycznie przypisana właścicielowi konta globalnego na $2.

Jeśli chcesz przyłączyć konto użytkownika "$1" do konta globalnego podaj hasło konta na $2:',
	'centralauth-notice-dryrun'            => '<div class="successbox">Tylko tryb demonstracyjny</div><br style="clear:both" />',
	'centralauth-disabled-dryrun'          => 'Tworzenie konta globalnego jest dostępne tylko w trybie demonstracyjnym/debugującym. Właściwe operacje łączenia kont są wyłączone. Przepraszamy!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Czytaj więcej o '''tworzeniu konta globalnego''']]...''",
	'centralauth-list-home-title'          => 'Macierzysta wiki',
	'centralauth-list-home-dryrun'         => 'Ustawione na tej wiki hasło oraz adres e-mail będą wykorzystywane przez Twoje konto globalne.
W przyszłości będziesz jednak mógł zmienić swoją macierzystą wiki.',
	'centralauth-list-attached-title'      => 'Powiązane konta użytkownika',
	'centralauth-list-attached'            => 'Konto o nazwie "$1" we wszystkich tych witrynach zostało automatycznie przypisane do konta globalnego:',
	'centralauth-list-attached-dryrun'     => 'Konto o nazwie "$1" we wszystkich tych witrynach zostanie automatycznie przypisane do konta globalnego:',
	'centralauth-list-unattached-title'    => 'Niepowiązane konta',
	'centralauth-list-unattached'          => 'Konto o nazwie "$1" nie może zostać automatycznie przypisane do konta globalnego dla następujących witryn; najbardziej prawdopodobną przyczyną jest ustawienie dla tych witryn innego hasła niż dla konta macierzystego:',
	'centralauth-foreign-link'             => 'Użytkownik $1 na $2',
	'centralauth-merge-method-primary'     => 'wiki domowa',
	'centralauth-merge-method-empty'       => 'brak wkładu',
	'centralauth-merge-method-mail'        => 'potwierdzone e-mailem',
	'centralauth-merge-method-password'    => 'potwierdzone hasłem',
	'centralauth-merge-method-admin'       => 'konto przyłączone przez administratora',
	'centralauth-merge-method-new'         => 'nowe konto',
	'centralauth-merge-method-login'       => 'potwierdzone poprzez zalogowanie',
	'centralauth-finish-title'             => 'Zakończono tworzenie konta globalnego',
	'centralauth-finish-text'              => 'Jeżeli te konta należą do Ciebie, możesz je przyłączyć do konta globalnego wpisując tutaj hasło dla tych kont:',
	'centralauth-finish-password'          => 'Hasło:',
	'centralauth-finish-login'             => 'Zaloguj',
	'centralauth-finish-send-confirmation' => 'Hasło e-mail',
	'centralauth-finish-problems'          => 'Masz kłopoty lub nie jesteś właścicielem tych innych kont? [[meta:Help:Unified login problems|Jak znaleźć pomoc]]...',
	'centralauth-finish-noconfirms'        => 'Żadne konta nie mogą być potwierdzone przy użyciu tego hasła.',
	'centralauth-finish-incomplete'        => 'Niektóre konta zostały połączone przy użyciu tego hasła.
Pozostałe nie zostały jeszcze potwierdzone.',
	'centralauth-merge-attempt'            => "'''Sprawdzenie hasła dla pozostałych kont, nieprzyłączonych do konta globalnego...'''",
	'centralauth-attach-list-attached'     => 'Konto globalne "$1" obejmuje następujące konta:',
	'centralauth-attach-title'             => 'Potwierdź konto',
	'centralauth-attach-text'              => 'To konto nie zostało jeszcze przyłączone do konta globalnego. Jeżeli konto globalne należy również do Ciebie, podaj jego hasło, a nastąpi przyłączenie:',
	'centralauth-attach-submit'            => 'Przyłącz konto',
	'centralauth-attach-success'           => 'Konto zostało przyłączone do konta globalnego',
	'centralauth'                          => 'Zarządzanie kontem globalnym',
	'centralauth-admin-manage'             => 'Zarządzanie danymi użytkownika',
	'centralauth-admin-username'           => 'Nazwa użytkownika:',
	'centralauth-admin-lookup'             => 'Podgląd i edycja danych użytkownika',
	'centralauth-admin-permission'         => 'Tylko stewardzi mogą łączyć cudze konta w imieniu tych osób.',
	'centralauth-admin-no-unified'         => 'Brak globalnego konta dla tej nazwy użytkownika.',
	'centralauth-admin-info-id'            => 'ID użytkownika:',
	'centralauth-admin-info-registered'    => 'Zarejestrowane:',
	'centralauth-admin-info-locked'        => 'Zablokowane:',
	'centralauth-admin-info-hidden'        => 'Ukryte:',
	'centralauth-admin-yes'                => 'tak',
	'centralauth-admin-no'                 => 'nie',
	'centralauth-admin-attached'           => 'Konta są w pełni połączone',
	'centralauth-admin-unattached'         => 'Niedołączone konta',
	'centralauth-admin-no-unattached'      => 'Brak jakichkolwiek niepołączonych kont.',
	'centralauth-admin-list-localwiki'     => 'Lokalna wiki',
	'centralauth-admin-list-attached-on'   => 'Czas dołączenia',
	'centralauth-admin-list-method'        => 'Metoda',
	'centralauth-admin-unmerge'            => 'Odłącz zaznaczone',
	'centralauth-admin-merge'              => 'Przyłącz zaznaczone',
	'centralauth-admin-bad-input'          => 'Nieprawidłowe zaznaczenia dla wykonania przyłączenia',
	'centralauth-admin-none-selected'      => 'Nie zaznaczono kont do modyfikacji.',
	'centralauth-admin-already-unmerged'   => 'Pomijam $1, ponieważ jest już rozłączone',
	'centralauth-admin-unmerge-success'    => 'Rozłączono z powodzeniem $1 {{PLURAL:$2|konto|konta|kont}}',
	'centralauth-admin-delete-title'       => 'Usuwanie konta',
	'centralauth-admin-delete-description' => 'Usunięcie konta globalnego spowoduje usunięcie wszystkich globalnych preferencji, odłączenie wszystkich kont lokalnych oraz zwolnienie nazwy konta globalnego do wykorzystania przez innego użytkownika. Lokalne konta nadal będą istniały. Hasła kont lokalnych utworzonych przed przyłączeniem ich do konta globalnego zostaną przywrócone do wartości sprzed momentu przyłączenia.',
	'centralauth-admin-delete-button'      => 'Usuń to konto',
	'centralauth-admin-delete-success'     => 'Usunięto z powodzeniem konto globalne "<nowiki>$1</nowiki>"',
	'centralauth-admin-nonexistent'        => 'Brak konta globalnego "<nowiki>$1</nowiki>"',
	'centralauth-admin-delete-nonexistent' => 'Błąd: nie istnieje konto globalne "<nowiki>$1</nowiki>"',
	'centralauth-token-mismatch'           => 'Niemożliwe było wykonanie polecenia ze względu na utratę danych sesji.',
	'centralauth-admin-lock-title'         => 'Zablokuj konto',
	'centralauth-admin-lock-description'   => 'Zablokowanie konta użytkownika uniemożliwi zalogowanie na to konto na wszystkich wiki.',
	'centralauth-admin-lock-button'        => 'Zablokuj to konto',
	'centralauth-admin-lock-success'       => 'Zablokowano globalne konto „<nowiki>$1</nowiki>”',
	'centralauth-admin-lock-nonexistent'   => 'Błąd: globalne konto „<nowiki>$1</nowiki>” nie istnieje.',
	'centralauth-admin-unlock-title'       => 'Odblokuj konto',
	'centralauth-admin-unlock-description' => 'Odblokowanie konta umożliwi zalogowanie na to konto.',
	'centralauth-admin-unlock-button'      => 'Odblokuj to konto',
	'centralauth-admin-unlock-success'     => 'Odblokowano konto globalne „<nowiki>$1</nowiki>”',
	'centralauth-admin-unlock-nonexistent' => 'Błąd: nie istnieje konto globalne „<nowiki>$1</nowiki>”.',
	'centralauth-admin-reason'             => 'Powód',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|sekundę|sekundy|sekund}} temu',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|minutę|minuty|minut}} temu',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|godzinę|godziny|godzin}} temu',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|dzień|dni}} temu',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|miesiąc|miesiące|miesięcy}} temu',
	'centralauth-years-ago'                => '{{PLURAL:$1|rok|$1 lata|$1 lat}} temu',
	'centralauth-prefs-status'             => 'Status globalnego konta:',
	'centralauth-prefs-not-managed'        => 'nie używasz globalnego konta',
	'centralauth-prefs-unattached'         => 'Niepotwierdzone',
	'centralauth-prefs-complete'           => 'Wszystko w porządku!',
	'centralauth-prefs-migration'          => 'W trakcie przyłączania',
	'centralauth-prefs-count-attached'     => 'Twoje konto jest aktywne na $1 {{plural:$1|projekcie|projektach}}.',
	'centralauth-prefs-count-unattached'   => 'Nieprzyłączone konta o nazwie zbieżnej z Twoją są na $1 {{PLURAL:$1|projekcie|projektach}}.',
	'centralauth-prefs-detail-unattached'  => 'Konto na tej witrynie nie zostało przyłączone do konta globalnego.',
	'centralauth-prefs-manage'             => 'zarządzaj kontem globalnym',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Nie można lokalnie przemianować użytkownika $1, ponieważ to konto zostało przeniesione do globalnego systemu logowania.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Nie można zmienić nazwy użytkownika $2, ponieważ jest zarezerwowana dla konta globalnego.</div>',
	'centralauth-invalid-wiki'             => 'Nie istnieje wiki DB: $1',
	'centralauth-account-exists'           => 'Utworzenie konta nie jest możliwe – ta nazwa użytkownika jest już zajęta przez konto globalne.',
	'centralauth-log-name'                 => 'Rejestr zarządzania kontami globalnymi',
	'centralauth-log-header'               => 'Rejestr zawiera zdarzenia dotyczące kont globalnych: usunięcia, zablokowania i odblokowania.',
	'centralauth-log-entry-delete'         => 'usunął konto globalne „<nowiki>$1</nowiki>”',
	'centralauth-log-entry-lock'           => 'zablokował konto globalne „<nowiki>$1</nowiki>”',
	'centralauth-log-entry-unlock'         => 'odblokował konto globalne „<nowiki>$1</nowiki>”',
);

/** Piemontèis (Piemontèis)
 * @author Bèrto 'd Sèra
 * @author Siebrand
 */
$messages['pms'] = array(
	'mergeaccount'                         => 'Stat dël process dla mës-cia dë stranòm e ciav',
	'centralauth-merge-notlogged'          => 'Për piasì <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} ch\'a rintra ant ël sistema]</span> për controlé che sò cont a sio stait mës-cià coma ch\'as dev.',
	'centralauth-merge-welcome'            => "'''Sò cont a l'é nen stait portà al sistema d'intrada unificà ëd Wikimedia'''. S'a decid ëd porté sò cont a podrà dovré midem stranòm e ciav për rintré an qualsëssìa proget Wikimedia an qualsëssìa dle lenghe disponibij. Sòn a dovrìa fé belfé dovré dij proget coma la caria d'archivi ansima a [http://commons.wikimedia.org/ Wikimedia Commons], e gavé via dla confusion ch'a peul seurt-ie fòra quand doe person-e për cas as sërno ël midem stranòm an doj proget diferent. S'a fussa mai riva-ie che cheidun a l'avèissa gia sërnusse lë stranòm ch'a dòvra chiel/chila, sòn a-j darìa gnun fastudi a gnun, ma pì anans a-j darìa a tuti la possibilità d'arzolve ël problema ansema a j'aministrator.",
	'centralauth-merge-step1-title'        => "Anandié l'unificassion djë stranòm",
	'centralauth-merge-step1-detail'       => "Soa ciav e soa adrëssa ëd pòsta eletrònica a saran controlà con cole dij cont ëd j'àutre wiki, për confermé ch'a van bin. A-i rivërà nen gnun cambiament fin ch'an dis nen che tut a va bin.",
	'centralauth-merge-step1-submit'       => "Confermé j'anformassion për l'intrada ant ël sistema",
	'centralauth-merge-step2-title'        => "Confermé dj'àutri cont",
	'centralauth-merge-step2-detail'       => "Cheidun dij cont a l'é pa podusse cobié n'aotomàtich con la wiki ëd destinassion. Se sti cont-sì a son sò, a peul confermene la proprietà ën butand-se la ciav giusta.",
	'centralauth-merge-step2-submit'       => "Confermé j'anformassion për l'intrada ant ël sistema",
	'centralauth-merge-step3-title'        => 'Creé sò cont unificà',
	'centralauth-merge-step3-detail'       => "Tut a l'é pront për creé sò cont unificà, andova a l'andrìo a finì ij cont dle wiki ambelessì sota:",
	'centralauth-merge-step3-submit'       => 'Unifiché ij cont',
	'centralauth-complete'                 => 'Mës-cia dij cont bele faita!',
	'centralauth-incomplete'               => 'Mës-cia djë stranòm e dle ciav bele faita!',
	'centralauth-complete-text'            => "Adess a peul rintré an qualsëssìa sit dla Wikimedia (ëd coj ch'a travajo col programa dla wiki) sensa da manca dë deurb-se un cont; la midema cobia dë stranòm a ciav a travajo an qualsëssìa Wikipedia, Wiktionary, Wikibooks e ant sj'àotri proget soe seur an qualsëssìa lenga.",
	'centralauth-incomplete-text'          => "Na vira che sò stranòm e ciav a sio stait mës-cià a podrà rintré an qualsëssìa sit dla Wikimedia (ëd coj ch'a travajo col programa dla wiki) sensa pa da manca dë deurb-se un cont neuv; la midema cobia dë stranòm e ciav a travajeran ant tute le Wikipedia, Wiktionary, Wikibooks e sò proget seur an qualsëssìa lenga.",
	'centralauth-not-owner-text'           => 'Lë stranòm "$1" e l\'é stait dait n\'aotomàtich al proprietari dël cont ansima a $2.

Se as trata ëd chiel/chila, a peul mandé a bon fin ël process dla mës-cia dë stranòm e ciav ën butand-ie ambelessì la ciav prinsipal dël cont:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Mach për dimostrassion, da bon a-i riva gnente</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => "Ch'a në scusa, ma l'unificassion dij cont për adess a la travaja mach coma dimostrativ, për corege ël programa. L'unificassion da bon as peul pa fesse.",
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Për savejne dë pì, ch'a varda '''Stranòm e ciav globaj''']]...''",
	'centralauth-list-home-title'          => 'Ca (soa wiki prinsipal)',
	'centralauth-list-home-dryrun'         => "La ciav e l'adrëssa ëd pòsta eletrònica trovà ant sta wiki-sì a saran cole dovrà për sò cont unificà.
Sòn un a peul peuj cambiess-lo coma a-j ven mej a chiel/chila.",
	'centralauth-list-attached-title'      => 'Cont tacà',
	'centralauth-list-attached'            => 'Ij cont ch\'as ës-ciamo "$1" ansima a ij sit dla lista ambelessì sota a son stait mës-cià antra lor n\'aotomàtich:',
	'centralauth-list-attached-dryrun'     => 'Ël cont con lë stranòm "$1" ëd minca un dij sit ambelessì sota a sarà tacà al cont unificà:',
	'centralauth-list-unattached-title'    => 'Cont nen unificà',
	'centralauth-list-unattached'          => "Ant ij sit dla lista ambelessì sota ël cont \"\$1\" a l'é pa podusse confermé coma sò n'aotomàtich; a l'é belfé ch'a-i sio dle ciav diferente da cola ëd sò cont prinsipal:",
	'centralauth-foreign-link'             => 'Stranòm $1 ansima a $2',
	'centralauth-finish-title'             => 'Finiss la mës-cia',
	'centralauth-finish-text'              => "Se sti cont-sì a son sò, a peul andé a bon fin dël process ëd mës-cia dë stranòm e ciav mach ën butand-ie le ciav dj'àotri cont ambelessì sota:",
	'centralauth-finish-password'          => 'Ciav:',
	'centralauth-finish-login'             => 'Rintré ant ël sistema',
	'centralauth-finish-send-confirmation' => 'Mandé la ciav për pòsta eletrònica',
	'centralauth-finish-problems'          => "Ha-lo dle gran-e, ò pura l'é-lo pa chiel/chila ël titolar d'ës cont-sì? Ch'a varda [[meta:Help:Unified login problems|coma trové d'agiut]]...",
	'centralauth-merge-attempt'            => "'''I soma antramentr che i controloma le ciav ch'a l'ha butà con cole dij cont anco' da mës-cé...'''",
	'centralauth-attach-list-attached'     => 'Ël cont unificà con lë stranòm "$1" as ciapa andrinta ij cont listà ambelessì sota:',
	'centralauth-attach-title'             => "Confermé 'l cont",
	'centralauth-attach-text'              => "Ës cont-sì a l'é anco' nen stait migrà a col unificà. Se ëdcò ël cont global a resta sò, a peul unifiché ës cont-sì ën butand soa ciav globala:",
	'centralauth-attach-submit'            => "Unifiché 'l cont",
	'centralauth-attach-success'           => "Ël cont a l'é stait giontà a col unificà",
	'centralauth'                          => "Aministrassion unificà dj'intrade ant ël sistema",
	'centralauth-admin-manage'             => "Gestion dij dat dl'utent",
	'centralauth-admin-username'           => 'Stranòm:',
	'centralauth-admin-lookup'             => "Vardé ò modifiché ij dat dl'utent",
	'centralauth-admin-permission'         => "Mach ij vardian a peulo mës-cé ëd cont d'àotra gent.",
	'centralauth-admin-unmerge'            => 'Dasmës-cia selessionà',
	'centralauth-admin-merge'              => 'Mës-cia selessionà',
	'centralauth-admin-bad-input'          => "La selession dla mës-cia a l'é pa giusta.",
	'centralauth-admin-none-selected'      => 'Pa gnun cont da modifiché selessionà.',
	'centralauth-prefs-status'             => 'Stat dël cont global:',
	'centralauth-prefs-not-managed'        => 'A dòvra nen ël cont mës-cià',
	'centralauth-prefs-unattached'         => 'Pa confermà',
	'centralauth-prefs-complete'           => 'Gnun-a gran-a!',
	'centralauth-prefs-migration'          => "Antramentr ch'as fa la migrassion",
	'centralauth-prefs-count-attached'     => 'Sò cont a travaj ansima a ij sit dij proget $1.',
	'centralauth-prefs-count-unattached'   => 'A resto dij cont nen confermà con sò stranòm ansima a ij proget $1.',
	'centralauth-prefs-detail-unattached'  => "Ës sit-sì a l'é pa restà confermà coma bon për sò cont global.",
	'centralauth-prefs-manage'             => 'Gestion ëd sò cont global',
	'centralauth-renameuser-abort'         => '<div class="errorbox">As peul pa arbatié l\'utent $1 an local, për via che stë stranòm-sì a l\'é col dël cont unificà.</div>',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'centralauth-merge-dryrun-or'          => "'''يا'''",
	'centralauth-finish-password'          => 'پټنوم:',
	'centralauth-finish-login'             => 'ننوتل',
	'centralauth-finish-send-confirmation' => 'د برېښناليک پټنوم',
	'centralauth-admin-username'           => 'کارن-نوم:',
	'centralauth-admin-yes'                => 'هو',
	'centralauth-admin-no'                 => 'نه',
	'centralauth-prefs-count-attached'     => 'ستاسو کارن حساب په $1 پروژو باندې فعاله دی {{plural:$1|ويبځای|ويبځايونه}}.',
);

/** Portuguese (Português)
 * @author Malafaya
 * @author 555
 * @author Lijealso
 * @author Smeira
 */
$messages['pt'] = array(
	'mergeaccount'                         => 'Estado da unificação de contas',
	'centralauth-desc'                     => '[[Special:MergeAccount|Fundir contas]] nos wikis da Wikimedia Foundation',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Fundir diversas contas]] para o Single User Login',
	'centralauth-merge-denied'             => 'Desculpe-nos, você não tem permissão para acessar esta página.',
	'centralauth-merge-notlogged'          => 'Por favor, <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} efectue login]</span> para verificar se as suas contas foram correctamente fundidas.',
	'centralauth-merge-welcome'            => "'''A sua conta de utilizador ainda não foi migrada para o sistema de autenticação (login) unificado da Wikimedia.'''

Caso decida migrar as suas contas, será possível utilizar o mesmo nome de utilizador e palavra-chave para se autenticar em todos os wikis da Wikimedia (em todos os projectos e em todos os idiomas disponíveis).
Isto torna mais fácil trabalhar em projectos partilhados, tal como carregar um ficheiro no [http://commons.wikimedia.org/ Wikimedia Commons], e evita confusões ou conflitos que podem ocorrer quando duas pessoas escolhem o mesmo nome de utilizador em diferentes projectos.

Caso alguém já tenha um nome de utilizador idêntico ao seu em algum outro wiki, tal pessoa não será importunada. No entanto, será possível que dialogue com a mesma ou com um administrador posteriormente.",
	'centralauth-merge-step1-title'        => 'Iniciar a unificação de logins',
	'centralauth-merge-step1-detail'       => 'A sua palavra-chave (senha) e endereço de e-mail serão comparados com os de contas de outros wikis, para confirmar se coincidem. Não serão feitas alterações até que confime que está tudo correcto.',
	'centralauth-merge-step1-submit'       => 'Confirmar informações de login',
	'centralauth-merge-step2-title'        => 'Confirmar contas adicionais',
	'centralauth-merge-step2-detail'       => 'Algumas das contas não coincidem com os dados da residência wiki fornecida. Caso tais contas pertençam a você, será possível confirmar de que são suas fornecendo a palavra-chave (senha) das mesmas.',
	'centralauth-merge-step2-submit'       => 'Confirmar informações de login',
	'centralauth-merge-dryrun-complete'    => 'Todas as contas existentes podem ser fundidas automaticamente!

Não foram feitas modificações em suas contas até o momento.',
	'centralauth-merge-dryrun-incomplete'  => 'Você pode prosseguir, mas algumas contas não puderam ser verificadas de forma automática e não serão migradas neste momento. Será possível fundi-las mais tarde.

Não foram feitas modificações em suas contas até o momento.',
	'centralauth-merge-dryrun-or'          => "'''ou'''",
	'centralauth-merge-dryrun-home'        => 'O sistema de migração de contas não pôde confirmar você como sendo o proprietário da conta de usuário de sua residência wiki.

Uma outra wiki foi estipulada como sendo a residência de seu nome de usuário. Siga o seguinte link e se autentique através dele para que a fusão de contas seja completada.',
	'centralauth-merge-step3-title'        => 'Criar conta unificada',
	'centralauth-merge-step3-detail'       => 'Tudo pronto para que a sua conta unificada, com os seguintes wikis a ela relacionados, seja criada:',
	'centralauth-merge-step3-submit'       => 'Unificar contas',
	'centralauth-complete'                 => 'Unificação de logins completa!',
	'centralauth-incomplete'               => 'Unificação de logins incompleta!',
	'centralauth-complete-text'            => 'Agora você poderá efectuar login em qualquer wiki da Wikimedia sem ter de criar uma nova conta; o mesmo nome de utilizador e senha funcionarão na Wikipédia, no Wikcionário, no Wikibooks e demais projectos, em todos os idiomas.',
	'centralauth-incomplete-text'          => 'Uma vez estando o seu login unificado, poderá efectuar login em qualquer wiki da Wikimedia sem ter de criar novo cadastro; o mesmo nome de utilizador e senha funcionarão na Wikipédia, no Wikcionário, no Wikibooks e demais projectos, em todos os idiomas.',
	'centralauth-not-owner-text'           => 'O nome de utilizador "$1" foi automaticamente relacionado ao proprietário da conta em $2.

Se este for você, você poderá concluir o procedimento de unificação de login simplesmente digitando a senha principal de tal conta aqui:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Modo de demonstração</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'A unificação de contas se encontra no momento em modo exclusivamente de demonstração/testes. Lamentamos, mas as mesmas ainda não foram unificadas.',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Leia mais sobre o '''login unificado''']]...''",
	'centralauth-list-home-title'          => 'Residência wiki',
	'centralauth-list-home-dryrun'         => 'A palavra-chave (senha) e endereço de e-mail definidos nesta wiki serão os utilizados em sua conta unificada; sua página de utilizador será automaticamente lincada a partir de outras wikis. Será possível alterar qual é a sua residência wiki posteriormente.',
	'centralauth-list-attached-title'      => 'Contas relacionadas',
	'centralauth-list-attached'            => 'As contas nomeadas como "$1" nos seguintes sítios foram automaticamente fundidas:',
	'centralauth-list-attached-dryrun'     => 'A conta "$1" de cada um dos seguintes sítios será automaticamente fundida na conta unificada:',
	'centralauth-list-unattached-title'    => 'Contas não-relacionadas',
	'centralauth-list-unattached'          => 'A conta "$1" não pôde ser automaticamente confirmada como sendo tua nos seguintes sítios; provavelmente elas tenham uma senha diferente de sua conta principal:',
	'centralauth-foreign-link'             => 'Utilizador $1 em $2',
	'centralauth-merge-method-primary'     => 'residência wiki',
	'centralauth-merge-method-empty'       => 'sem contribuições',
	'centralauth-merge-method-mail'        => 'confirmado a partir do e-mail',
	'centralauth-merge-method-password'    => 'confirmado a partir da senha',
	'centralauth-merge-method-admin'       => 'conta fundida por administrador',
	'centralauth-merge-method-new'         => 'conta nova',
	'centralauth-merge-method-login'       => 'confirmada por autenticação',
	'centralauth-finish-title'             => 'Completar fusão',
	'centralauth-finish-text'              => 'Se estas contas pertencem a ti, será possível concluir a unificação de logins simplesmente digitando as senhas das mesmas aqui:',
	'centralauth-finish-password'          => 'Senha:',
	'centralauth-finish-login'             => 'Utilizador',
	'centralauth-finish-send-confirmation' => 'Enviar senha por e-mail',
	'centralauth-finish-problems'          => 'Está com problemas ou estas outras contas não são suas? [[meta:Help:Unified login problems|Como procurar por ajuda]]...',
	'centralauth-finish-noconfirms'        => 'Não é possível confirmar contas utilizando esta palavra-chave (senha).',
	'centralauth-finish-incomplete'        => 'Diversas contas foram fundidas ao utilizar esta palavra-chave (senha). Outras contas ainda não foram confirmadas.',
	'centralauth-merge-attempt'            => "'''Verificando a senha fornecida para encontrar as demais contas ainda não fundidas...'''",
	'centralauth-attach-list-attached'     => 'A conta unificada com o nome "$1" inclui as seguintes contas:',
	'centralauth-attach-title'             => 'Confirmar conta',
	'centralauth-attach-text'              => 'Esta conta não foi ainda migrada para a conta unificada. Se a conta global é sua também, pode fundir esta conta se introduzir a sua palavra-chave da conta global:',
	'centralauth-attach-submit'            => 'Migrar conta',
	'centralauth-attach-success'           => 'A conta foi migrada para a conta unificada.',
	'centralauth'                          => 'Administração de contas unificadas',
	'centralauth-admin-manage'             => 'Manusear dados de utilizador',
	'centralauth-admin-username'           => 'Utilizador:',
	'centralauth-admin-lookup'             => 'Ver ou editar dados de utilizador',
	'centralauth-admin-permission'         => 'Apenas stewards podem fundir as contas de outras pessoas.',
	'centralauth-admin-no-unified'         => 'Nenhuma conta unificada para este nome de utilizador.',
	'centralauth-admin-info-id'            => 'ID de utilizador:',
	'centralauth-admin-info-registered'    => 'Registado:',
	'centralauth-admin-info-locked'        => 'Trancada:',
	'centralauth-admin-info-hidden'        => 'Ocultada:',
	'centralauth-admin-yes'                => 'sim',
	'centralauth-admin-no'                 => 'não',
	'centralauth-admin-attached'           => 'Contas completamente fundidas',
	'centralauth-admin-unattached'         => 'Contas não-anexadas',
	'centralauth-admin-no-unattached'      => 'Não restaram contas sem serem fundidas.',
	'centralauth-admin-list-localwiki'     => 'Wiki local',
	'centralauth-admin-list-attached-on'   => 'Associada em',
	'centralauth-admin-list-method'        => 'Método',
	'centralauth-admin-unmerge'            => 'Desfazer a fusão nos seleccionados',
	'centralauth-admin-merge'              => 'Fundir seleccionados',
	'centralauth-admin-bad-input'          => 'Selecção para fusão inválida',
	'centralauth-admin-none-selected'      => 'Não foram seleccionadas contas a serem modificadas.',
	'centralauth-admin-already-unmerged'   => 'Ignorando $1, fusão já desfeita',
	'centralauth-admin-unmerge-success'    => 'Fusão de $1 {{PLURAL:$2|conta desfeita|contas desfeitas}}',
	'centralauth-admin-delete-title'       => 'Remover conta',
	'centralauth-admin-delete-description' => 'Remover a conta global irá remover quaisquer preferências globais, desacoplar todas as contas locais, e deixar o nome global disponível para outro utilizador o escolher.
Todas as contas locais continuarão a existir.
As palavras-chave para as contas locais criadas antes da fusão irão ser revertidas para os seus valores anteriores à fusão.',
	'centralauth-admin-delete-button'      => 'Remover esta conta',
	'centralauth-admin-delete-success'     => 'Removida a conta global de "<nowiki>$1</nowiki>" com sucesso',
	'centralauth-admin-nonexistent'        => 'Não existe uma conta global para "<nowiki>$1</nowiki>"',
	'centralauth-admin-delete-nonexistent' => 'Erro: a conta global "<nowiki>$1</nowiki>" não existe.',
	'centralauth-token-mismatch'           => 'Desculpe, não foi possível processar a sua submissão do formulário devido à perda de dados de sessão.',
	'centralauth-admin-lock-title'         => 'Bloquear conta',
	'centralauth-admin-lock-description'   => 'Bloqueando uma conta vai tornar impossível autenticar-se com ela em qualquer wiki.',
	'centralauth-admin-lock-button'        => 'Bloquear esta conta',
	'centralauth-admin-lock-success'       => 'Bloqueada conta global "<nowiki>$1</nowiki>" com sucesso.',
	'centralauth-admin-lock-nonexistent'   => 'Erro: a conta global "<nowiki>$1</nowiki>" não existe.',
	'centralauth-admin-unlock-title'       => 'Desbloquear conta',
	'centralauth-admin-unlock-description' => 'Desbloqueando uma conta vai tornar possível autenticar-se com ela.',
	'centralauth-admin-unlock-button'      => 'Desbloquear esta conta',
	'centralauth-admin-unlock-success'     => 'Desbloqueada conta global "<nowiki>$1</nowiki>" com sucesso.',
	'centralauth-admin-unlock-nonexistent' => 'Erro: a conta global "<nowiki>$1</nowiki>" não existe.',
	'centralauth-admin-reason'             => 'Motivo:',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|segundo|segundos}} atrás',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|minuto|minutos}} atrás',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|hora|horas}} atrás',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|dia|dias}} atrás',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|mês|meses}} atrás',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|ano|anos}} atrás',
	'centralauth-prefs-status'             => 'Estado da conta unificada:',
	'centralauth-prefs-not-managed'        => 'Não está utilizando a conta unificada',
	'centralauth-prefs-unattached'         => 'Não confirmado',
	'centralauth-prefs-complete'           => 'Tudo em ordem!',
	'centralauth-prefs-migration'          => 'Migrando',
	'centralauth-prefs-count-attached'     => 'A sua conta encontra-se activa em $1 {{plural:$1|sítio|sítios}} de projecto.',
	'centralauth-prefs-count-unattached'   => 'Ainda existem contas não confirmadas com seu nome de utilizador em $1 {{plural:$1|projecto|projectos}}.',
	'centralauth-prefs-detail-unattached'  => 'Este sítio não foi confirmado como fazendo parte da conta unificada.',
	'centralauth-prefs-manage'             => 'Manusear sua conta unificada',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Não foi possível renomear localmente o utilizador $1 uma vez que a conta do mesmo foi migrada para o sistema de login universal.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Não é possível renomear utilizador $2 pois este nome de utilizador está reservado para uma conta global.</div>',
	'centralauth-invalid-wiki'             => 'Não existe a BD wiki: $1',
	'centralauth-account-exists'           => 'Não é possível criar conta: o nome de utilizador pretendido já está a ser utilizado no sistema de login unificado.',
	'centralauth-log-name'                 => 'Registo de gestão de contas globais',
	'centralauth-log-header'               => 'Este registo contém operações sobre contas globais: remoções, bloqueios e debloqueios.',
	'centralauth-log-entry-delete'         => 'removeu conta global "<nowiki>$1</nowiki>"',
	'centralauth-log-entry-lock'           => 'bloqueou conta global "<nowiki>$1</nowiki>"',
	'centralauth-log-entry-unlock'         => 'desbloqueou conta global "<nowiki>$1</nowiki>"',
);

/** Quechua (Runa Simi)
 * @author AlimanRuna
 */
$messages['qu'] = array(
	'mergeaccount'                         => 'Rakiquna huñunakuypa kachkaynin',
	'centralauth-desc'                     => '[[Special:MergeAccount|Rakiqunata huñunakuy]] Wikimedia kamarisqa wikipura',
	'centralauth-mergeaccount-desc'        => "[[Special:MergeAccount|Ñawra rakiqunakunatam huñunakunqa]] ch'ulla ruraqpa yaykunanpaq",
	'centralauth-merge-denied'             => "Achachaw, manam saqillasunkichu kay p'anqaman riyta.",
	'centralauth-merge-notlogged'          => 'Ama hina kaspa, <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} yaykuy]</span> rakiqunaykikunap hunt\'alla huñunakusqaña kayninmanta rikunaykipaq.',
	'centralauth-merge-step1-title'        => 'Rakiquna huñunakuyta qallariy',
	'centralauth-merge-step1-submit'       => 'Yaykuna willakunata takyachiy',
	'centralauth-merge-step2-title'        => 'Aswan rakiqunakunata takyachiy',
	'centralauth-merge-step2-submit'       => 'Yaykuna willakunata takyachiy',
	'centralauth-merge-dryrun-or'          => "'''icha'''",
	'centralauth-merge-step3-title'        => 'Huñunakusqa rakiqunata kamariy',
	'centralauth-merge-step3-detail'       => 'Kamarisqam kachkanki huñunakusqa rakiqunaykita kamarinaykipaq, kay qatiq wikikunata yaparquspa:',
	'centralauth-merge-step3-submit'       => 'Rakiqunakunata huñunakuy',
	'centralauth-complete'                 => 'Rakiquna huñunakuyqa rurasqañam!',
	'centralauth-incomplete'               => 'Rakiquna huñunakuyqa manaraqmi rurasqachu!',
	'centralauth-list-home-title'          => 'Wasi wiki',
	'centralauth-list-attached-title'      => 'Yapasqa rakiqunakuna',
	'centralauth-list-unattached-title'    => 'Mana yapasqa rakiqunakuna',
	'centralauth-foreign-link'             => '$1 sutiyuq ruraq $2 nisqapi',
	'centralauth-merge-method-primary'     => 'wasi wiki',
	'centralauth-merge-method-empty'       => "manam llamk'apusqakuna kanchu",
	'centralauth-merge-method-mail'        => 'e-chaskiwan takyachisqa',
	'centralauth-merge-method-password'    => 'yaykuna rimawan takyachisqa',
	'centralauth-merge-method-admin'       => 'kamachiqqa rakiqunatam huñun',
	'centralauth-merge-method-new'         => 'musuq rakiquna',
	'centralauth-merge-method-login'       => 'yaykamuspa takyachisqa',
	'centralauth-finish-title'             => 'Huñunakuyta tukuchiy',
	'centralauth-finish-password'          => 'Yaykuna rima:',
	'centralauth-finish-login'             => 'Yaykuy',
	'centralauth-finish-send-confirmation' => 'Yaykuna rimata e-chaskiwan kachamuy',
	'centralauth-attach-title'             => 'Rakiqunata takyachiy',
	'centralauth-attach-submit'            => 'Rakiqunata mitmachiy',
	'centralauth-admin-username'           => 'Ruraqpa sutin:',
	'centralauth-admin-info-id'            => 'Ruraqpa kikin kaynin:',
	'centralauth-admin-info-registered'    => "Hallch'asqa:",
	'centralauth-admin-info-locked'        => "Hark'asqa:",
	'centralauth-admin-info-hidden'        => 'Pakasqa:',
	'centralauth-admin-yes'                => 'arí',
	'centralauth-admin-no'                 => 'manam',
	'centralauth-admin-attached'           => "Hunt'alla huñunakusqa rakiqunakuna",
	'centralauth-admin-unattached'         => 'Mana huñusqa rakiqunakuna',
	'centralauth-admin-no-unattached'      => 'Manañam puchunchu mana huñusqa rakiqunakuna.',
	'centralauth-admin-list-localwiki'     => 'Puystulla wiki',
	'centralauth-admin-list-attached-on'   => 'Kayman huñumusqa:',
	'centralauth-admin-list-method'        => 'Ima hina rurasqa',
	'centralauth-admin-unmerge'            => 'Akllasqata rakipuspa huñuray',
	'centralauth-admin-merge'              => 'Akllasqata huñuy',
	'centralauth-admin-bad-input'          => 'Manam allinchu huñunapaq akllasqa',
	'centralauth-admin-none-selected'      => 'Manam ima rakiqunakunapas hukchanapaq akllasqachu.',
	'centralauth-admin-delete-title'       => 'Rakiqunata qulluy',
	'centralauth-admin-delete-button'      => 'Kay rakiqunata qulluy',
	'centralauth-admin-delete-success'     => '"<nowiki>$1</nowiki>"-paq sapsi rakiqunaqa aypalla qullusqañam',
	'centralauth-admin-nonexistent'        => 'Manam kanchu "<nowiki>$1</nowiki>"-paq sapsi rakiquna',
	'centralauth-admin-delete-nonexistent' => 'Pantasqa: Manam kanchu "<nowiki>$1</nowiki>" sutiyuq sapsi rakiquna.',
	'centralauth-token-mismatch'           => "Achachaw, manam atinichu kachamusqaykita llamk'apuyta, willakuna chinkaptinmi.",
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|sikundu|sikundukuna}} ñaqha',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|minutu|minutukuna}} ñaqha',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|ura|urakuna}} ñaqha',
	'centralauth-days-ago'                 => "$1 {{PLURAL:$1|p'unchaw|p'unchawkuna}} ñaqha",
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|killa|killakuna}} ñaqha',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|wata|watakuna}} ñaqha',
	'centralauth-prefs-status'             => 'Sapsi rakiqunap kachkaynin:',
	'centralauth-prefs-not-managed'        => "Mana chay huñusqa rakiqunawan llamk'aspa",
	'centralauth-prefs-unattached'         => 'Mana takyachisqa',
	'centralauth-prefs-complete'           => 'Tukuy allillanmi!',
	'centralauth-prefs-migration'          => 'Purichkaspa',
	'centralauth-prefs-count-attached'     => "Rakiqunaykiqa $1 ruraykamay {{plural:$1|tiyaypim|tiyaykunapim}} llamk'achkan.",
	'centralauth-prefs-count-unattached'   => 'Qusqayki sutiyuq mana takyachisqa rakiqunakunaqa $1 ruraykamay {{plural:$1|tiyaypim|tiyaykunapim}} puchuchkan.',
	'centralauth-prefs-detail-unattached'  => 'Kay ruraykamay tiyaypa sapsi rakiqunaman kapuyninqa manaraqmi tayasqachu.',
	'centralauth-prefs-manage'             => 'Sapsi rakiqunaykita kamachiy',
	'centralauth-invalid-wiki'             => 'Manam kanchu kay wiki willañiqintinchu: $1',
	'centralauth-account-exists'           => "Manam atinichu rakiqunata kamariyta: munasqayki ruraqpa sutinqa huñusqa yaykuna llikapi hap'isqañam.",
);


$messages['ro'] = array(
	'centralauth-finish-password'          => 'Parolă:',
);

/** Russian (Русский)
 * @author .:Ajvol:.
 * @author Ahonc
 * @author Kaganer
 * @author Siebrand
 * @author Kalan
 */
$messages['ru'] = array(
	'mergeaccount'                         => 'Состояние объединения учётных записей',
	'centralauth-desc'                     => 'Объединение учётных записей в вики-проектах фонда «Викимедиа»',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Объединяет несколько учётных записей]] в единую учётную запись участника (Single User Login)',
	'centralauth-merge-denied'             => 'Извините, у вас недостаточно прав для доступа к этой странице.',
	'centralauth-merge-notlogged'          => 'Пожалуйста, <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} представьтесь системе]</span>, чтобы проверить были ли ваши учётные записи полностью объединены.',
	'centralauth-merge-welcome'            => "'''Ваша учётная запись ещё не переведена на единую систему авторизации проектов Викимедиа'''

Если вы решите перенести свои учётные записи, вы сможете использовать одни и те же имя участника и пароль для входа во все языковые разделы всех вики-проектов Фонда «Викимедиа».
Это сделает проще работу с централизованными проектами, — например, загрузку изображений на [http://commons.wikimedia.org/ Викисклад], — а также позволит избежать путаницы и проблем, которые могут возникнуть, когда разные люди используют в различных проектах одинаковые имена учётных записей.

Если кто-то уже занял в одном из проектов ваше имя, данная процедура не затронет эти учётные записи, и в дальнейшем вы сможете попробоватm решить эту проблему, обсудив её с этими участниками или с кем-то из администраторов.",
	'centralauth-merge-step1-title'        => 'Начать объединение учётных записей',
	'centralauth-merge-step1-detail'       => 'Будет проведено сравнение вашего пароля и адреса электронной почты с данными учётных записей других вики-проектов. Изменения не будут сделаны до тех пор, пока вы не подтвердите правильность сопоставления.',
	'centralauth-merge-step1-submit'       => 'Подтвердить информацию об учётной записи',
	'centralauth-merge-step2-title'        => 'Подтвердить дополнительные учётные записи',
	'centralauth-merge-step2-detail'       => 'Некоторые учётные записи не могут быть автоматически привязаны к обозначенной вами «домашней» вики. Если эти учётные записи принадлежат вам и у вас есть соответствующие пароли — укажите их.',
	'centralauth-merge-step2-submit'       => 'Подтвердить информацию об учётной записи',
	'centralauth-merge-dryrun-complete'    => 'Все существующие учётные записи могут быть автоматически объединены!

Пока вашим учётные записи изменены не были.',
	'centralauth-merge-dryrun-incomplete'  => 'Можно продолжать, хотя некоторые учётные записи не могут быть автоматически проверены и не будут сейчас преобразованы. Вы сможете объединить их позже.

Пока ваши учётные записи изменены не были.',
	'centralauth-merge-dryrun-or'          => "'''или'''",
	'centralauth-merge-dryrun-home'        => 'Система миграции не может получить подтверждение, что вы являетесь владельцем учётной записи в «домашней» вики.

Однако, для этой учётной записи обнаружен другой вики-проект, который определён как «домашний»; чтобы завершить процедуру миграции, перейдите по приведённой ниже ссылке и представьтесь системе.',
	'centralauth-merge-step3-title'        => 'Создание единой учётной записи',
	'centralauth-merge-step3-detail'       => 'Будет создана единая учётная запись с присоединением следующих вики-проектов:',
	'centralauth-merge-step3-submit'       => 'Объединить учётные записи',
	'centralauth-complete'                 => 'Объединение учётных записей завершено!',
	'centralauth-incomplete'               => 'Объединение учётных записей не завершено!',
	'centralauth-complete-text'            => 'Теперь вы можете использовать одну учётную запись для работы во всех проектах фонда Викимедиа: одно и то же регистрационное имя участника и пароль работают в Википедии, Викисловаре, Викитеке и других проектах на всех языках.',
	'centralauth-incomplete-text'          => 'После того как будет завершено объединение учётных записей, вам не нужно будет регистрироваться отдельно в каждом проекте фонда «Викимедиа»: одно и то же регистрационное имя участника и пароль будут работать в Википедии, Викисловаре, Викитеке и других проектах на всех языках.',
	'centralauth-not-owner-text'           => 'Имя участника «$1» было автоматически присвоено владельцу учётной записи на $2.

Если это вы, то вы можете завершить процесс объединения учётных записей, введя здесь пароль от вашей основной учётной записи:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Демонстрационный режим</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Объединение учётных записей сейчас работает в демонстрационном (отладочном) режиме, реальные операции объединения отключены. Извините.',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login/ru|Подробнее о '''единой учётной записи'''…]]''",
	'centralauth-list-home-title'          => '«Домашний» вики-проект',
	'centralauth-list-home-dryrun'         => 'Для вашей единой учётной записи будут использованы значения пароля и адреса электронной почты в этом вики-проекте.
Сменить свой «домашний» вики-проект вы сможете позднее.',
	'centralauth-list-attached-title'      => 'Присоединённые учётные записи',
	'centralauth-list-attached'            => 'К единой учётной записи были автоматически присоединены учётные записи с именем «$1» на каждом из перечисленных ниже сайтов:',
	'centralauth-list-attached-dryrun'     => 'К единой учётной записи будут автоматически присоединены учётные записи с именем «$1» на каждом из перечисленных ниже сайтов:',
	'centralauth-list-unattached-title'    => 'Неприсоединённые учётные записи',
	'centralauth-list-unattached'          => 'Принадлежность вам учётной записи «$1» не может быть автоматически подтверждена на указанных ниже сайтах; вероятно, пароль на них не совдает с паролем вашей основной учётной записи:',
	'centralauth-foreign-link'             => 'Участник $1 в $2',
	'centralauth-merge-method-primary'     => '«домашний» вики-проект',
	'centralauth-merge-method-empty'       => 'нет вклада',
	'centralauth-merge-method-mail'        => 'подтверждена электронной почтой',
	'centralauth-merge-method-password'    => 'подтверждена паролём',
	'centralauth-merge-method-admin'       => 'админ. объединённая уч. запись',
	'centralauth-merge-method-new'         => 'новая учётная запись',
	'centralauth-merge-method-login'       => 'подтверждена логином',
	'centralauth-finish-title'             => 'Завершение объединения',
	'centralauth-finish-text'              => 'Если эти учётные записи ваши, то вы можете завершить процесс перехода на единую учётную запись, введя пароли к ним:',
	'centralauth-finish-password'          => 'Пароль:',
	'centralauth-finish-login'             => 'Имя участника',
	'centralauth-finish-send-confirmation' => 'Выслать пароль по электронной почте',
	'centralauth-finish-problems'          => 'Если возникли проблемы, или вы не являетесь владельцем указанных учётных записей [[meta:Help:Unified login problems|обратитесь к справочной информации]]...',
	'centralauth-finish-noconfirms'        => 'Нет учётных записей, которые могли бы быть подтверждены этим паролём.',
	'centralauth-finish-incomplete'        => 'Несколько учётных записей были объединены с использованием этого пароля.

Другие учётные записи пока ещё не подтверждены.',
	'centralauth-merge-attempt'            => "'''Проверка указанного пароля на соответствие ещё не объединённым учётным записям…'''",
	'centralauth-attach-list-attached'     => 'Единая учётная запись «$1» включает следующие учётные записи:',
	'centralauth-attach-title'             => 'Подтверждение учётной записи',
	'centralauth-attach-text'              => 'Эта учётная запись ещё не была перемещена в систему единой учётной записи. Если глобальная учётная запись также принадлежит вам, вы можете присоединить данную учётную запись, указав пароль глобальной учётной записи:',
	'centralauth-attach-submit'            => 'Перенести учётную запись',
	'centralauth-attach-success'           => 'Учётная запись была перенесена в систему единой учётной записи.',
	'centralauth'                          => 'Администрирование объединения имён',
	'centralauth-admin-manage'             => 'Управление информацией об участниках',
	'centralauth-admin-username'           => 'Имя участника:',
	'centralauth-admin-lookup'             => 'Просмотр или редактирование информации об участнике',
	'centralauth-admin-permission'         => 'Только стюарды могут объединять учётные записи других людей.',
	'centralauth-admin-no-unified'         => 'Нет объединённой учётной записи для этого имени участника.',
	'centralauth-admin-info-id'            => 'Идентификатор участника:',
	'centralauth-admin-info-registered'    => 'Зарегистрирован:',
	'centralauth-admin-info-locked'        => 'Заморожен:',
	'centralauth-admin-info-hidden'        => 'Скрыт:',
	'centralauth-admin-yes'                => 'да',
	'centralauth-admin-no'                 => 'нет',
	'centralauth-admin-attached'           => 'Полностью объединённые учётные записи',
	'centralauth-admin-unattached'         => 'Неприсоединённые учётные записи',
	'centralauth-admin-no-unattached'      => 'Не осталось необъединённых учётных записей.',
	'centralauth-admin-list-localwiki'     => 'Локальный вики-проект',
	'centralauth-admin-list-attached-on'   => 'Присоединён',
	'centralauth-admin-list-method'        => 'Способ',
	'centralauth-admin-unmerge'            => 'Разделить выбранные',
	'centralauth-admin-merge'              => 'Объединить выбранные',
	'centralauth-admin-bad-input'          => 'Ошибочный выбор объединения',
	'centralauth-admin-none-selected'      => 'Не были выбраны учётные записи для изменения.',
	'centralauth-admin-already-unmerged'   => 'Пропуск $1, уже разделён',
	'centralauth-admin-unmerge-success'    => 'Успешно разделена $1 {{PLURAL:$2|учётная запись|учётных записи|учётных записей}}',
	'centralauth-admin-delete-title'       => 'Удаление учётной записи',
	'centralauth-admin-delete-description' => 'Удаление глобальной учётной записи приведёт к удалению глобальных настроек, отсоединению всех учётных записей и освобождению глобального имени, что позволит занять его другому участнику.
Все локальные учётные записи продолжат существовать.
Пароли локальных учётных записей, созданные до объединения, вернут свои старые значения.',
	'centralauth-admin-delete-button'      => 'Удалить учётную запись',
	'centralauth-admin-delete-success'     => 'Успешно удалена глобальная учётная запись «<nowiki>$1</nowiki>»',
	'centralauth-admin-nonexistent'        => 'Не существует глобальной учётной записи «<nowiki>$1</nowiki>»',
	'centralauth-admin-delete-nonexistent' => 'Ошибка. Глобальной учётной записи «<nowiki>$1</nowiki>» не существует.',
	'centralauth-token-mismatch'           => 'К сожалению, мы не можем продолжить обработку вашей формы, так как были потеряны данные сеанса.',
	'centralauth-admin-lock-title'         => 'Заморозка учётной записи',
	'centralauth-admin-lock-description'   => 'Если учётная запись заморожена, то ни в одной вики под ней нельзя представиться системе.',
	'centralauth-admin-lock-button'        => 'Заморозить эту учётную зпись',
	'centralauth-admin-lock-success'       => 'Глобальная учётная запись «<nowiki>$1</nowiki>» успешно заморожена',
	'centralauth-admin-lock-nonexistent'   => 'Ошибка. Глобальная учётная запись «<nowiki>$1</nowiki>» не существует.',
	'centralauth-admin-unlock-title'       => 'Разморозить учётную запись',
	'centralauth-admin-unlock-description' => 'Разморозка учётной записи делает возможным вход в систему под ней.',
	'centralauth-admin-unlock-button'      => 'Разморозить эту учётную запись',
	'centralauth-admin-unlock-success'     => 'Глобальная учётная запись «<nowiki>$1</nowiki>» успешно разморожена',
	'centralauth-admin-unlock-nonexistent' => 'Ошибка. Глобальной учётной записи «<nowiki>$1</nowiki>» не существует.',
	'centralauth-admin-reason'             => 'Причина:',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|секунду|секунды|секунд}} назад',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|минуту|минуты|минут}} назад',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|час|часа|часов}} назад',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|день|дня|дней}} назад',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|месяц|месяца|месяцев}} назад',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|год|года|лет}} назад',
	'centralauth-prefs-status'             => 'Состояние глобальной учётной записи:',
	'centralauth-prefs-not-managed'        => 'Не используется единая учётная запись',
	'centralauth-prefs-unattached'         => 'Не подтверждена',
	'centralauth-prefs-complete'           => 'Всё в порядке!',
	'centralauth-prefs-migration'          => 'Переносится',
	'centralauth-prefs-count-attached'     => 'Ваша учётная запись активна в $1 {{plural:$1|проекте|проектах|проектах}}.',
	'centralauth-prefs-count-unattached'   => 'Неподтверждённые учётные записи с вашим именем остаются в $1 {{plural:$1|проекте|проектах|проектах}}.',
	'centralauth-prefs-detail-unattached'  => 'Этот проект не был подтверждён как относящийся к вашей глобальной учётной записи.',
	'centralauth-prefs-manage'             => 'Управление глобальной учётной записью',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Невозможно переименовать участника $1 в данном проекте, так как это имя участника было перенесено в систему единой учётной записи.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Невозможно переименовать участника $2, так как это имя зарезервировано для глобальной учётной записи.</div>',
	'centralauth-invalid-wiki'             => 'Нет такой вики БД: $1',
	'centralauth-account-exists'           => 'Невозможно создать учётную запись. Запрашиваемое имя уже занято в единой системе входа.',
	'centralauth-log-name'                 => 'Журнал управления глобальными учётными записями',
	'centralauth-log-header'               => 'Этот журнал содержит записи о действиях над глобальными учётными записями: удаления, заморозки и разморозки.',
	'centralauth-log-entry-delete'         => 'удалил глобальную учётную запись «<nowiki>$1</nowiki>»',
	'centralauth-log-entry-lock'           => 'заморозил глобальную учётную запись «<nowiki>$1</nowiki>»',
	'centralauth-log-entry-unlock'         => 'разморозил глобальную учётную запись «<nowiki>$1</nowiki>»',
);

/** Yakut (Саха тыла)
 * @author HalanTul
 * @author Siebrand
 */
$messages['sah'] = array(
	'mergeaccount'                         => 'Ааттары холбооһун туруга',
	'centralauth-desc'                     => '"Викимедиа" бырайыактарын [[Special:MergeAccount|хос ааттарын холбооһун]]',
	'centralauth-merge-notlogged'          => 'Бука диэн, <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} ааккын эт]</span>, оччоҕо ааттарыҥ холбонууларын туругун көрүөҥ.',
	'centralauth-merge-welcome'            => "'''Эн аатыҥ Викимедияҕа киирэр биир аат систиэмэтигэр өссө киирэ илик'''

Ааттаргын онно киллэрэр түгэҥҥэр, биир аатынан уонна киирии тылынан ханнык баҕарар тылларынан суруллубут ханнык баҕарар Викимедиа пуондатын саайтарыгар киирэр кыахтаныаҥ.
Бу уопсай бырайыактарга үлэлииргэр көмөлөһүө, холобур, [http://commons.wikimedia.org/ Вики ыскылаакка] ойууну киллэргэ атын бырайыактартан биир ааттаах дьон киирэн булкууру таһаараллара суох буолуо.

Өскө ким эрэ эн ааккын атын бырайыакка ылбыт буоллаҕына бу дьайыы кинини таарыйыа суоҕа. Кэлин бу түгэни бэйэтин кытта эбэтэр администраторы кытта быһаарсар кыахтаныаҥ.",
	'centralauth-merge-step1-title'        => 'Бэлиэтэммит ааттары холбууру саҕалаа',
	'centralauth-merge-step1-detail'       => 'Эн киирии тылыҥ уонна электроннай буостаҥ аадырыһа атын вики бырайыактар ааттарын кытта тэҥнэниллиэ. Ханнык да уларытыы бэйэҥ бигэргэтэ иликкинэ олоххо киириэ суоҕа.',
	'centralauth-merge-step1-submit'       => 'Аатым туһунан сибидиэнньэни бигэргэт',
	'centralauth-merge-step2-title'        => 'Атын ааттары бигэргэт',
	'centralauth-merge-step2-detail'       => 'Сорох ааттар аптамаатынан талыллыбыт аакка холбоммотулар. Ол ааттар эйиэннэрэ буоллаҕына тустаах киирии тылларын киллэрэн ону бигэргэт.',
	'centralauth-merge-step2-submit'       => 'Аат туһунан сибидиэнньэни бигэргэт',
	'centralauth-merge-dryrun-or'          => "'''эбэтэр'''",
	'centralauth-merge-step3-title'        => 'Соҕотох ааты оҥоруу',
	'centralauth-merge-step3-detail'       => 'Соҕотох ааты оҥорорго бэлэм буолла. Маннык вики-бырайыактар холбоһуохтара:',
	'centralauth-merge-step3-submit'       => 'Ааттары холбуурга',
	'centralauth-complete'                 => 'Ааттар этэҥҥэ холбостулар!',
	'centralauth-incomplete'               => 'Ааттары холбооһун кыайан түмүктэммэтэ!',
	'centralauth-complete-text'            => 'Билигин ханнык баҕара Викимедиа саайтыгар саҥа ааты оҥорбокко эрэ киирэр кыахтанныҥ. Соҕотох аатынан уонна киирии тылгынан Википедияҕа да, Викитекаҕа да, атын да бырайыактарга ханнык баҕарар тылынан киирэр кыахтааххын.',
	'centralauth-incomplete-text'          => 'Ааттарыҥ холбостохторуна Викимедиа ханнык баҕарар бырайыактарыгар атын ааты оҥорбокко эрэ киирэр кыахтаныаҥ. Соҕотох аат уонна киирии тыл Википедия да, Викитека да, атын да бырайыактар ханнык баҕарар тылынан салааларыгар киирдэххинэ үлэлиэхтэрэ.',
	'centralauth-not-owner-text'           => '«$1» аат аптамаатынан бу аакка «$2» холбонно.

Ити эн буоллаххына ааттары холбооһуну сүрүн аат киирии тылын киллэрэн түмүктүөххүн сөп:',
	'centralauth-notice-dryrun'            => 'Көрдөрөр (демо) режим',
	'centralauth-disabled-dryrun'          => 'Ааттары холбооһун билиһиннэрэр (демо) эрэсиимҥэ үлэлии турар, онон дьиҥнээх холбонуу дьайыылара арахсан тураллар. Баалама.',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|'''Ааттары холбооһун''' туһунан аах]]...''",
	'centralauth-list-home-title'          => 'Сүрүн ("Дьиэ") Биики',
	'centralauth-list-home-dryrun'         => 'Бу аат киирии тыла уонна элэктроннай аадырыһа холбоммут соҕотох аакка туттуллуо.
Кэлин сүрүн (олохтонор) биикигин уларытыаххын сөп.',
	'centralauth-list-attached-title'      => 'Холбоммут ааттар',
	'centralauth-list-attached'            => 'Маннык аат "$1" бу саайтарга холбоммут:',
	'centralauth-list-attached-dryrun'     => 'Бу аат «$1» аллара бэриллибит саайтарга барыларыгар биир аакка холбонуо:',
	'centralauth-list-unattached-title'    => 'Холбоспотох ааттар',
	'centralauth-list-unattached'          => 'Манна көрдөрүллүбүт саайтарга баар "$1" эйиэнэ буолара аптамаатынан бигэргэтиллибэтэ; арааһа киирии тыллара сүрүн ааи киирии тылыттан атыннар быһыылаах:',
	'centralauth-foreign-link'             => '$1 кыттааччы манна: $2',
	'centralauth-merge-method-empty'       => 'тугу да суруйбатах',
	'centralauth-merge-method-new'         => 'саҥа аат (аккаунт)',
	'centralauth-merge-method-login'       => 'ааты бигэргэтии',
	'centralauth-finish-title'             => 'Холбооһун түмүктэннэ/түмүктэниитэ',
	'centralauth-finish-text'              => 'Бу ааттар эйиэннэрэ буоллаҕына холбооһуну атын ааттарга киирии тылларын суруйан түмүктүөххүн сөп:',
	'centralauth-finish-password'          => 'Киирии тыл:',
	'centralauth-finish-login'             => 'Кыттааччы',
	'centralauth-finish-send-confirmation' => 'Киирии тылы почтаннан ыыт',
	'centralauth-finish-problems'          => 'Туох эрэ сатамматаҕына, эбэтэр бу ааттар эйиэннэрэ буолбатах буоллаҕына [[meta:Help:Unified login problems|көмөнү көр]]...',
	'centralauth-merge-attempt'            => "'''Холбоммотох ааттар киирии тылларын бэрэбиэркэтэ...'''",
	'centralauth-attach-list-attached'     => 'Соҕотох «$1» аат маннык ааттары холбуур:',
	'centralauth-attach-title'             => 'Бэлиэтэниини бигэргэтии',
	'centralauth-attach-text'              => 'Бу аат соҕотох аат тиһигэр киирэ илик. Если глобальная учётная запись также принадлежит вам, вы можете присоединить данную учётную запись, указав пароль глобальной учётной записи:',
	'centralauth-attach-submit'            => 'Ааты көһөрөргө',
	'centralauth-attach-success'           => 'Бу аат сүрүн аакка холбосто.',
	'centralauth'                          => 'Ааттары холбооһуну салайыы',
	'centralauth-admin-manage'             => 'Кыттааччылар тустарынан сибидиэнньэлэри көрүү/уларытыы',
	'centralauth-admin-username'           => 'Кыттааччы аата:',
	'centralauth-admin-lookup'             => 'Кыттааччы туһунан информацияны уларытыы эбэтэр көрүү',
	'centralauth-admin-permission'         => 'Стюардар эрэ араас дьон ааттарын биир аакка холбуохтарын сөп.',
	'centralauth-admin-info-id'            => 'Кыттааччы нүөмэрэ:',
	'centralauth-admin-info-locked'        => 'Хатаммыт:',
	'centralauth-admin-info-hidden'        => 'Кистэммит:',
	'centralauth-admin-yes'                => 'сөп',
	'centralauth-admin-no'                 => 'эс (суох)',
	'centralauth-admin-unmerge'            => 'Талыллыбыты араарарга',
	'centralauth-admin-merge'              => 'Талыллыбыты холбуурга',
	'centralauth-admin-bad-input'          => 'Холбооһуну сыыһа талбыккын',
	'centralauth-admin-none-selected'      => 'Уларытыллар ааттары талбатаххын.',
	'centralauth-seconds-ago'              => '$1 сөкүүндэ ынаараа өттүгэр',
	'centralauth-minutes-ago'              => '$1 мүнүүтэ ынараа өттүгэр',
	'centralauth-hours-ago'                => '$1 чаас ынараа өттүгэр',
	'centralauth-days-ago'                 => '$1 күн ынараа өттүгэр',
	'centralauth-months-ago'               => '$1 ый ынараа өттүгэр',
	'centralauth-years-ago'                => '$1 сыл ынараа өттүгэр',
	'centralauth-prefs-status'             => 'Сүрүн аат туруга:',
	'centralauth-prefs-not-managed'        => 'Сүрүн (соҕотох) аат туһаныллыбат',
	'centralauth-prefs-unattached'         => 'Бигэргэтиллибэтэх',
	'centralauth-prefs-complete'           => 'Барыта сатанна!',
	'centralauth-prefs-migration'          => 'Көһөрүллэр',
	'centralauth-prefs-count-attached'     => 'Бу аат $1 {{plural:$1|бырайыакка|бырайыактарга}} туһаныллар.',
	'centralauth-prefs-count-unattached'   => 'Эн бигэргэтиллибэтэх {{plural:$1|аатыҥ|ааттарыҥ}} $1 бырайыакка {{plural:$1|хаалла|хааллылар}}.',
	'centralauth-prefs-detail-unattached'  => 'Бу бырайыакка эн сүрүн аатыҥ бигэргэтиллибэтэх.',
	'centralauth-prefs-manage'             => 'Сүрүн ааты салайыы',
	'centralauth-renameuser-abort'         => "<div class=\"errorbox\">\$1 ааты бу бырайыакка уларытар кыах суох, тоҕо диэтэххэ бу аат ''Сүрүн ааты'' кытта холбоно сылдьар.</div>",
);

/** Tachelhit (Tašlḥiyt)
 * @author Zanatos
 */
$messages['shi'] = array(
	'centralauth-admin-yes' => 'yah',
	'centralauth-admin-no'  => 'oho',
);

/** Slovak (Slovenčina)
 * @author Helix84
 * @author Siebrand
 * @author Michawiki
 */
$messages['sk'] = array(
	'mergeaccount'                         => 'Stav zjednotenia prihlasovacích účtov',
	'centralauth-desc'                     => '[[Special:MergeAccount|Zlúčenie účtov]] na jednotlivých wiki nadácie Wikimedia',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Zlúčenie účtov]] pre zjednotené prihlasovanie',
	'centralauth-merge-denied'             => 'Prepáčte, nemáte oprávnenie pristupovať na túto stránku.',
	'centralauth-merge-notlogged'          => 'Prosím, <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} prihláste sa]</span>, aby ste mohli skontrolovať, či sú vaše účty celkom zjednotené.',
	'centralauth-merge-welcome'            => "'''Váš používateľský účet ešte nebol migrovaný na zjednotený prihlasovací systém Wikimedia.'''

Ak si zvolíte, aby vaše účty boli migrované, budete môcť používať rovnaké používateľské meno a heslo na prihlasovanie do každého z wiki projektov nadácie Wikimedia vo všetkých dostupných jazykoch.
To zjednoduší prácu so zdieľanými projektami ako nahrávanie na [http://commons.wikimedia.org/Hlavná_stránka Wikimedia Commons] a zamedzí zmätkom v prípade, že dvaja ľudia majú rovnaké používateľské meno na rôznych projektoch.

Ak niekto iný už zabral vaše používateľské meno na inom projekte, toto ich nenaruší, ale dá vám možnosť dohodnúť sa s ním alebo s administrátorom neskôr.

== Čo sa stane ďalej? ==

Keď sa rozhodnete, že chcete vykonať migráciu na zjednotené prihlasovanie, systém sa pozrie na každý z projektov, ktorý prevádzkujeme -- Wikipedia, Wikinews, Commons, atď. -- a vypíše každý, kde bolo vaše používateľské meno zaregistrované.

Jedna z týchto wiki bude zvolená za „domovskú wiki“ vášho účtu, zvyčajne tá, ktorá je najviac používaná. Ak to nie je wiki, do ktorej sa momentálne prihlasujete, môžete byť predtým, než proces bude pokračovať požiadaný o potvrdenie, že poznáte heslo k danému účtu.

Informácie účtu na domovskej wiki budú porovnané s každým s ostatných účtov a tie, ktorých heslo alebo emailová adresa sa zhodujú alebo neboli použité budú automaticky pripojené k vášmu novému globálnemu účtu.

Tie, ktoré sa nezhodujú budú vynechané, pretože systém nemôže s istotou určiť, či sú vaše účty. Pre tieto účty, ak patria vám, môžete dokončiť pripojenie zadaním správneho prihlasovacieho hesla; ak ich zaregistroval niekto iný, budete mať možnosť zanechať im správu a uvidíte, či niečo vymyslíte.

Nie je ''povinné'' spojiť všetky účty; niektoré môžete nechať oddelené, a budú tak označené.",
	'centralauth-merge-step1-title'        => 'Začať zjednotenie prihlasovania',
	'centralauth-merge-step1-detail'       => 'Vaše heslo a registrovaná emailová adresa bude porovnaná s účtami na ostatných wiki, aby sa potvrdilo, že sa zhodujú. Žiadne zmeny sa nevykonajú, kým nepotvrdíte, že je to v poriadku.',
	'centralauth-merge-step1-submit'       => 'Potvrdiť prihlasovacie informácie',
	'centralauth-merge-step2-title'        => 'Potvrdiť viac účtov',
	'centralauth-merge-step2-detail'       => 'Pri niektorých účtoch nebolo možné automaticky potvrdiť, že majú rovnakého vlastníka ako určená domovská wiki. Ak vám tieto účty patria, môžete to potvrdiť tým, že k nim zadáte heslo.',
	'centralauth-merge-step2-submit'       => 'Potvrdiť prihlasovanie informácie',
	'centralauth-merge-dryrun-complete'    => 'Všetky existujúce účty boli automaticky zjednotené!

Vo vašich účtoch sa zatiaľ nevykonali žiadne zmeny.',
	'centralauth-merge-dryrun-incomplete'  => 'Ste pripravený pokračovať, ale niektoré účty nebolo možné automaticky overiť a nebudú migrované okamžite. Budete mať možnosť zlúčiť ich neskôr.

Vo vašich účtoch sa zatiaľ nevykonali žiadne zmeny.',
	'centralauth-merge-dryrun-or'          => "'''alebo'''",
	'centralauth-merge-dryrun-home'        => 'Migračný systém nedokázal potvrdiť, že ste vlastníkom účtu s vašim používateľským menom na domovskej wiki.

Pre vaše používateľské meno sa určila iná wiki ako domovská; kliknutím na nasledovný odkaz sa tam môžete prihlásiť a dokončiť svoju migráciu.',
	'centralauth-merge-step3-title'        => 'Vytvoriť zjednotený účet',
	'centralauth-merge-step3-detail'       => 'Vytvorenie vášho zjednoteného účtu je pripravené s nasledovnými pripojenými wiki:',
	'centralauth-merge-step3-submit'       => 'Zjednotiť účty',
	'centralauth-complete'                 => 'Zjednotenie prihlasovacích účtov dokončené!',
	'centralauth-incomplete'               => 'Zjednotenie prihlasovacích účtov nebolo dokončené!',
	'centralauth-complete-text'            => 'Teraz sa môžete prihlásiť na ľubovoľnú wiki nadácie Wikimedia bez toho, aby ste si museli vytvárať nový účet; rovnaké používateľské meno a heslo bude fungovať na projektoch Wikipedia, Wiktionary, Wikibooks a ďalších sesterských projektoch vo všetkých jazykoch.',
	'centralauth-incomplete-text'          => 'Potom, ako budú vaše účty zjednotené sa budete môcť prihlásiť na ľubovoľnú wiki nadácie Wikimedia bez toho, aby ste si museli vytvárat ďalší účet; rovnaké používateľské meno a heslo bude fungovať na projektoch Wikipedia, Wiktionary, Wikibooks a ďalších sesterských projektoch vo všetkých jazykoch.',
	'centralauth-not-owner-text'           => 'Používateľské meno „$1“ bolo automaticky priradené vlastníkovi účtu na projekte $2.

Ak ste to vy, môžete dokončiť proces zjednotenia účtov jednoducho napísaním hesla pre uvedený účet sem:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Toto je iba demonštračný režim</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Zjednotenie účtov prebieha momentálne iba v demonštračnom / ladiacom režime, takže samotné operácie spojenia sú vypnuté. Prepáčte!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Prečítajte si viac o '''zjednotení prihlasovacích účtov''']]...''",
	'centralauth-list-home-title'          => 'Domovská wiki',
	'centralauth-list-home-dryrun'         => 'Heslo a emailová adresa nastavená na tejto wiki sa použije pre váš zjednotený účet.
Svoju domovskú wiki budete môcť zmeniť neskôr.',
	'centralauth-list-attached-title'      => 'Pripojené účty',
	'centralauth-list-attached'            => 'Účty z názvom „$1“ na nasledujúcich projektoch boli automaticky zjednotené:',
	'centralauth-list-attached-dryrun'     => 'Účet s názvom „$1“ na kažom z nasledovných projektov bude automaticky pripojený k zjednotenému účtu:',
	'centralauth-list-unattached-title'    => 'Nepripojené účty',
	'centralauth-list-unattached'          => 'Nebolo možné automaticky potvrdiť, že účet „$1“ na nasledujúcich projektoch patrí vám; pravdepodobne má odlišné heslo ako váš primárny účet:',
	'centralauth-foreign-link'             => 'Užívateľ $1 na $2',
	'centralauth-merge-method-primary'     => 'domovská wiki',
	'centralauth-merge-method-empty'       => 'žiadne príspevky',
	'centralauth-merge-method-mail'        => 'potvrdené emailom',
	'centralauth-merge-method-password'    => 'potvrdené heslom',
	'centralauth-merge-method-admin'       => 'účet zlúčil správca',
	'centralauth-merge-method-new'         => 'nový účet',
	'centralauth-merge-method-login'       => 'potvrdené prihlasovacím menom',
	'centralauth-finish-title'             => 'Dokončiť zjednotenie',
	'centralauth-finish-text'              => 'Ak tieto účty naozaj patria vám, môžete skončiť proces zjednotenia jednoducho napísaním hesiel dotyčných účtov:',
	'centralauth-finish-password'          => 'Heslo:',
	'centralauth-finish-login'             => 'Prihlasovacie meno',
	'centralauth-finish-send-confirmation' => 'Zaslať heslo emailom',
	'centralauth-finish-problems'          => 'Máte problém alebo nie ste vlastníkom týchto účtov? [[meta:Help:Unified login problems|Ako hľadať pomoc]]...',
	'centralauth-finish-noconfirms'        => 'Týmto heslom neboli potvrdené žiadne účty.',
	'centralauth-finish-incomplete'        => 'Týmto heslom bolo potvrdených niekoľko účtov. Ostatné účty zatiaľ nie sú potvrdené.',
	'centralauth-merge-attempt'            => "'''Kontrolujem poskytnuté heslá voči zostávajúcim zatiaľ nezjednoteným účtom...'''",
	'centralauth-attach-list-attached'     => 'K zjednotenému účtu s názvom „$1“ patria nasledovné účty:',
	'centralauth-attach-title'             => 'Potvrdiť účet',
	'centralauth-attach-text'              => 'Tento účet zatiaľ nebol migrovaný na zjednotený účet. Ak je globálny účet váš, môžete tento účet zlúčiť napísaním hesla ku globálnemu účtu:',
	'centralauth-attach-submit'            => 'Migrovať účet',
	'centralauth-attach-success'           => 'Účet bol migrovaný na zjednotený účet.',
	'centralauth'                          => 'Administrácia zjednoteného prihlasovania',
	'centralauth-admin-manage'             => 'Správa údajov o používateľoch',
	'centralauth-admin-username'           => 'Používateľské meno:',
	'centralauth-admin-lookup'             => 'Zobraziť alebo upravovať údaje o používateľovi',
	'centralauth-admin-permission'         => 'Iba stewardi môžu za druhých ľudí zlučovať ich účty.',
	'centralauth-admin-no-unified'         => 'Pre toto používateľské meno neexistujú žiadne zjednotené účty.',
	'centralauth-admin-info-id'            => 'ID používateľa:',
	'centralauth-admin-info-registered'    => 'Zaregistroval sa:',
	'centralauth-admin-info-locked'        => 'Zamknutý:',
	'centralauth-admin-info-hidden'        => 'Skrytý:',
	'centralauth-admin-yes'                => 'áno',
	'centralauth-admin-no'                 => 'nie',
	'centralauth-admin-attached'           => 'Úplne zlúčené účty',
	'centralauth-admin-unattached'         => 'Nepripojené účty',
	'centralauth-admin-no-unattached'      => 'Nezostávajú žiadne nezlúčené účty.',
	'centralauth-admin-list-localwiki'     => 'Lokálna wiki',
	'centralauth-admin-list-attached-on'   => 'Pripojené k',
	'centralauth-admin-list-method'        => 'Spôsob',
	'centralauth-admin-unmerge'            => 'Oddelenie zvolených',
	'centralauth-admin-merge'              => 'Zlúčenie zvolených',
	'centralauth-admin-bad-input'          => 'Neplatný výber pre zlúčenie',
	'centralauth-admin-none-selected'      => 'Neboli vybrané účty, ktoré sa majú zmeniť.',
	'centralauth-admin-already-unmerged'   => 'Preskakuje sa $1, už bol odlúčený',
	'centralauth-admin-unmerge-success'    => '$1 {{PLURAL:$2|účet úspešne odlúčený|účty úspešne odlúčené|účov úspešne odlúčených}}',
	'centralauth-admin-delete-title'       => 'Zmazať účet',
	'centralauth-admin-delete-description' => 'Zmazaním globálneho účetu zmažete všetky globélne nastavenia, odpojíte všetky účty a uvoľníte globálne meno, teda si ho bude môcť zobrať iný používateľ. Všetky lokálne účty budú naďalej existovať. Heslá lokálnych účtov vytvorené pre zlúčením sa vrátia na svoje pôvodné hodnoty, ktoré mali pred zlúčením.',
	'centralauth-admin-delete-button'      => 'Zmazať tento účet',
	'centralauth-admin-delete-success'     => 'Bol úspešne zmazaný globálny účet „<nowiki>$1</nowiki>“',
	'centralauth-admin-nonexistent'        => 'Globálny účet „<nowiki>$1</nowiki>“ neexistuje',
	'centralauth-admin-delete-nonexistent' => 'Chyba: globálny účet „<nowiki>$1</nowiki>“ neexistuje.',
	'centralauth-token-mismatch'           => 'Je nám ľúto, nebolo možné spracovať údaje formulára, ktoré ste poslali, z dôvodu straty informácií o vašej relácii.',
	'centralauth-admin-lock-title'         => 'Zamknúť účet',
	'centralauth-admin-lock-description'   => 'Zamknutím účtu znemožníte prihlásenie sa k nemu na všetkých wiki.',
	'centralauth-admin-lock-button'        => 'Zamknúť tento účet',
	'centralauth-admin-lock-success'       => 'Globálny účet „<nowiki>$1</nowiki>“ bol úspešne zamknutý',
	'centralauth-admin-lock-nonexistent'   => 'Chyba: Globálny účet „<nowiki>$1</nowiki>“ neexistuje.',
	'centralauth-admin-unlock-title'       => 'Odomknúť účet',
	'centralauth-admin-unlock-description' => 'Odomknutím účtu opäť umožníte prihlásenie sa k nemu.',
	'centralauth-admin-unlock-button'      => 'Odomknúť tento účet',
	'centralauth-admin-unlock-success'     => 'Globálny účet „<nowiki>$1</nowiki>“ bol úspešne odomknutý',
	'centralauth-admin-unlock-nonexistent' => 'Chyba: Globálny účet „<nowiki>$1</nowiki>“ neexistuje.',
	'centralauth-admin-reason'             => 'Dôvod:',
	'centralauth-seconds-ago'              => '{{PLURAL:$1|pred sekundou|pred $1 sekundami}}',
	'centralauth-minutes-ago'              => '{{PLURAL:$1|pred minútou|pred $1 minútami}}',
	'centralauth-hours-ago'                => '{{PLURAL:$1|pred hodinou|pred $1 hodinami}}',
	'centralauth-days-ago'                 => '{{PLURAL:$1|včera|pred $1 dňami}}',
	'centralauth-months-ago'               => '{{PLURAL:$1|pred mesiacom|pred $1 mesiacmi}}',
	'centralauth-years-ago'                => '{{PLURAL:$1|pred rokom|pred $1 rokmi}}',
	'centralauth-prefs-status'             => 'Globálny stav účtu:',
	'centralauth-prefs-not-managed'        => 'Nepoužíva zjednotený účet',
	'centralauth-prefs-unattached'         => 'Nepotvrdené',
	'centralauth-prefs-complete'           => 'Všetko v poriadku!',
	'centralauth-prefs-migration'          => 'Prebieha migrácia',
	'centralauth-prefs-count-attached'     => 'Váš účet je aktívny na $1 {{PLURAL:$1|projekte|projektoch}}.',
	'centralauth-prefs-count-unattached'   => 'Nepotvrdené účty s vašim menom zostávajú na $1 {{PLURAL:$1|projekte|projektoch}}.',
	'centralauth-prefs-detail-unattached'  => 'Nebolo potvrdené, že účet na tomto projekte patrí ku globálnemu účtu.',
	'centralauth-prefs-manage'             => 'Spravovať váš globálny účet',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Nie je možné lokálne premenovať používateľa $1, keďže toto používateľské meno bolo migrované na zjednotený prihlasovací systém.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Nie je možné premenovať používateľa $2, pretože toto meno je vyhradené pre globálny účet.</div>',
	'centralauth-invalid-wiki'             => 'Taká DB wiki neexistuje: $1',
	'centralauth-account-exists'           => 'Nie je možné vytvoriť účet: požadované používateľské meno si už vyhradil systém pre zjednotené prihlasovanie.',
	'centralauth-log-name'                 => 'Záznam správy globálnych účtov',
	'centralauth-log-header'               => 'Tento záznam obsahuje informácie o operáciách na globálnych účtoch: mazanie, zamykanie a odomykanie.',
	'centralauth-log-entry-delete'         => 'zmazal globálny účet „<nowiki>$1</nowiki>“',
	'centralauth-log-entry-lock'           => 'zamkol globálny účet „<nowiki>$1</nowiki>“',
	'centralauth-log-entry-unlock'         => 'odomkol globálny účet „<nowiki>$1</nowiki>“',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Sasa Stefanovic
 */
$messages['sr-ec'] = array(
	'mergeaccount'                         => 'Статус уједињења налога',
	'centralauth-merge-notlogged'          => 'Молимо вас да се <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} пријавите]</span> како бисте проверили да ли је ваш налог спојен успешно.',
	'centralauth-complete'                 => 'Спајање налога завршено!',
	'centralauth-incomplete'               => 'Спајање налога није завршено!',
	'centralauth-complete-text'            => 'Сада се можете пријавити на било који Викимедијин вики сајт без прављењановог налога; исто корисничко име и лозинка ће свугде радити Википедија, Викиречник, Викикњиге, и њихови остали братски пројекти на свим језицима.',
	'centralauth-incomplete-text'          => 'Када једном спојите налог, можете се пријавити на било који Викимедијин вики сајт без прављења; the same username and password will work on Википедија, Викиречник, Викикњиге, и њихови остали братски пројекти на свим језицима.',
	'centralauth-not-owner-text'           => 'Корисничко име "$1" је аутоматски додељено власнику налога на $2.

Уколико сте ово ви, можете једноставно завршити процес спајања уписујући лозинку за налог овде::',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Прочитајте више о '''спајању налога''']]...''",
	'centralauth-list-attached-title'      => 'Приложени налози',
	'centralauth-list-attached'            => 'Налог "$1" на следећим сајтовима је аутоматски спојен:',
	'centralauth-list-unattached'          => 'Налог "$1" се не може аутоматски потврдити да припада вама на следећим сајтовима; највероватније имају различите лозинке него ваш примаран налог:',
	'centralauth-foreign-link'             => 'Корисник $1 на $2',
	'centralauth-finish-title'             => 'Заврши спајање',
	'centralauth-finish-text'              => 'Уколико ови налози припадају вама, можете завршити процес спајања налога уписујући лозинку за остале налоге овде:',
	'centralauth-finish-password'          => 'Лозинка:',
	'centralauth-finish-login'             => 'Пријава',
	'centralauth-finish-send-confirmation' => 'Пошаљи лозинку на е-пошту',
	'centralauth-finish-problems'          => 'Имате проблем, или ви нисте власник осталих налога? [[meta:Help:Unified login problems|Помоћ]]...',
	'centralauth-merge-attempt'            => "'''Провера унете лозинке наспрам осталих налога који још нису спојени......'''",
	'centralauth'                          => 'Администрација спајања налога',
	'centralauth-admin-manage'             => 'Надгледање корисничких података',
	'centralauth-admin-username'           => 'Корисничко име:',
	'centralauth-admin-lookup'             => 'Преглед или измена корисничких података',
	'centralauth-admin-permission'         => 'Само стјуарди могу да споје остале корисничке налоге за њих.',
	'centralauth-admin-yes'                => 'да',
	'centralauth-admin-no'                 => 'не',
	'centralauth-admin-unmerge'            => 'Одвоји селектоване',
	'centralauth-admin-merge'              => 'Споји селектоване',
);

$messages['sr-el'] = array(
	// When not logged in...
	'mergeaccount' =>
		'Status ujedinjenja naloga',
	'centralauth-merge-notlogged' =>
		'Molimo vas da se <span class="plainlinks">' .
		'[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} prijavite]' .
		'</span> kako biste proverili da li je vaš nalog spojen uspešno.',

	// Big text on completion
	'centralauth-complete' =>
		'Spajanje naloga završeno!',
	'centralauth-incomplete' =>
		'Spajanje naloga nije završeno!',

	// Wheeee
	'centralauth-complete-text' =>
		'Sada se možete prijaviti na bilo koji Vikimedijin viki sajt bez pravljenja' .
		'novog naloga; isto korisničko ime i lozinka će svugde raditi ' .
		'Vikipedija, Vikirečnik, Vikiknjige, i njihovi ostali bratski projekti ' .
		'na svim jezicima.',
	'centralauth-incomplete-text' =>
		'Kada jednom spojite nalog, možete se prijaviti ' .
		'na bilo koji Vikimedijin viki sajt bez pravljenja; ' .
		'the same username and password will work on ' .
		'Vikipedija, Vikirečnik, Vikiknjige, i njihovi ostali bratski projekti ' .
		'na svim jezicima.',
	'centralauth-not-owner-text' =>
		'Korisničko ime "$1" je automatski dodeljeno vlasniku ' .
		"naloga na $2.\n" .
		"\n" .
		"Ukoliko ste ovo vi, možete jednostavno završiti proces spajanja " .
		"upisujući lozinku za nalog ovde::",

	// Appended to various messages above
	'centralauth-readmore-text' =>
		":''[[meta:Help:Unified login|Pročitajte više o '''spajanju naloga''']]...''",

	// For lists of wikis/accounts:
	'centralauth-list-attached' =>
		'Nalog "$1" na sledećim sajtovima ' .
		'je automatski spojen:',
	'centralauth-list-unattached' =>
		'Nalog "$1" se ne može automatski potvrditi ' .
		'da pripada vama na sledećim sajtovima; ' .
		'najverovatnije imaju različite lozinke nego vaš ' .
		'primaran nalog:',
	'centralauth-foreign-link' =>
		'Korisnik $1 na $2',

	// When not complete, offer to finish...
	'centralauth-finish-title' =>
		'Završi spajanje',
	'centralauth-finish-text' =>
		'Ukoliko ovi nalozi pripadaju vama, možete završiti ' .
		'proces spajanja naloga upisujući lozinku ' .
		'za ostale naloge ovde:',
	'centralauth-finish-password' =>
		'Lozinka:',
	'centralauth-finish-login' =>
		'Prijava',
	'centralauth-finish-send-confirmation' =>
		'Pošalji lozinku na e-poštu',
	'centralauth-finish-problems' =>
		"Imate problem, ili vi niste vlasnik ostalih naloga? " .
		"[[meta:Help:Unified login problems|Pomoć]]...",

	'centralauth-merge-attempt' =>
		"'''Provera unete lozinke naspram ostalih naloga koji još nisu spojeni......'''",

	// Administrator's console
	'centralauth' => 'Administracija spajanja naloga',
	'centralauth-admin-manage' =>
		'Nadgledanje korisničkih podataka',
	'centralauth-admin-username' =>
		'Korisničko ime:',
	'centralauth-admin-lookup' =>
		'Pregled ili izmena korisničkih podataka',
	'centralauth-admin-permission' =>
		"Samo stjuardi mogu da spoje ostale korisničke naloge za njih.",
	'centralauth-admin-unmerge' =>
		'Odvoji selektovane',
	'centralauth-admin-merge' =>
		'Spoji selektovane',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'mergeaccount'                         => 'Stoatus fon ju Benutserkonten-Touhoopefierenge',
	'centralauth-desc'                     => 'Benutserkonten in Wikis fon ju Wikimedia Foundation touhoopefiere',
	'centralauth-merge-notlogged'          => 'Jädden <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} mäldje die an], </span> uum tou wröigjen, of dien Benutserkonten fulboodich touhoopefierd wuuden.',
	'centralauth-merge-welcome'            => "'''Dien Benutserkonto wuude noch nit in dät globoale Wikimedia-Anmälde-System uurfierd.'''
In dän Fal du die foar ne Migration fon dien Benutserkonto äntschatst, wäd et die muugelk, die mäd n gemeensoamen Benutsernoome un Paaswoud in aal Wikimedia-Projekte in aal ferföigboare Sproaken antoumäldjen.
Dit moaket ju Oarbaid in gemeensoam nutsede Projekte eenfacher, t.B. dät Hoochleeden fon Doatäie ätter [http://commons.wikimedia.org/ Wikimedia Commons] un fermit Fersjoon un Konflikte, do der äntstounde konnen, wan two Moanskene dän sälwen Benutsernoome in ferscheedene Projekte benutsje.

Wan uurswäl din Benutsernoome al in n uur Projekt benutset, so be-ienfloudet et dissen nit, man du hääst ju Muugelkhaid, leeter mäd dissen uur Benutser of in Touhoopeoarbaid mäd n Administrator ätter ne Löösenge tou säiken.",
	'centralauth-merge-step1-title'        => 'Ounfang fon ju Benutserkonten-Touhoopefierenge',
	'centralauth-merge-step1-detail'       => 'Dien Paaswoud un dien iendraine E-Mail-Adresse wäd mäd Benutserkonten in do uur Wikis ouglieked, uum Uureenstämmengen tou fienden. Der wäide neen Annerengen foarnuumen, bit du bestäätigest, dät aal gjucht is.',
	'centralauth-merge-step1-submit'       => 'Anmälde-Informatione bestäätigje',
	'centralauth-merge-step2-title'        => 'Bestätigje moor Benutserkonten',
	'centralauth-merge-step2-detail'       => 'Wäkke fon do Benutserkonten kuuden nit automatisk dien Heemat-Wiki toureekend wäide. Wan disse Konton die heere, koast du dät bestäätigje, deertruch dät du dät Paaswoud tou disse Konten ienrakst.',
	'centralauth-merge-step2-submit'       => 'Anmälde-Informatione bestäätigje',
	'centralauth-merge-step3-title'        => 'Moakje globoal Benutserkonto',
	'centralauth-merge-step3-detail'       => 'Du koast nu n globoal Benutserkonto foar do foulgjende Wikis moakje.',
	'centralauth-merge-step3-submit'       => 'Benutserkonten touhoopefiere',
	'centralauth-complete'                 => 'Ju Touhoopefierenge fon do Benutserkonten is fulboodich.',
	'centralauth-incomplete'               => 'Ju Touhoopefierenge fon do Benutserkonten is nit kompläit!',
	'centralauth-complete-text'            => 'Du koast die nu ap älke Wikimedia-Websiede anmäldje sunner n näi Benutserkonto antoulääsen; diesälge Benutsernoome un dätsälge Paaswoud is foar Wikipedia, Wiktionary, Wikibooks un aal Susterprojekte in aal Sproaken gultich.',
	'centralauth-incomplete-text'          => 'Sogau dien Benutserkonten touhoopefierd sunt, koast du die ap älke Wikimedia-Websiede anmäldje sunner n näi Benutserkonto antoulääsen; diesäalge Benutsernoome un dätsälge Paaswoud is foar Wikipedia, Wiktionary, Wikibooks un aal Susterprojekte gultich.',
	'centralauth-not-owner-text'           => 'Die Benutsernoome „$1“ wuude automatisk dän Oaindummer fon dät Benutserkonto ap $2 touwiesd.

Wan dit din Benutsernoome is, koast du ju Touhoopefoatenge fon do Benutserkonten truch Iengoawe fon dät Haud-Paaswoud fon dit Benutserkonto be-eendje.',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Demonstrationsmodus</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Ju Benutserkonto-Touhoopefierenge befint sik apstuuns in n Demonstrations/Failersäik-Modus. Touhoopefierengs-Aktione sunt deaktivierd.',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Informatione uur ju '''Touhoopefierenge fon do Benutserkonten''']] …''",
	'centralauth-list-home-title'          => 'Heemat-Wiki',
	'centralauth-list-home-dryrun'         => 'Dät Paaswoud un ju E-Mail-Adresse, do du in dissen Wiki iendrain hääst, wäd foar ju Touhoopefierenge fon do Benutserkonten ferwoand un ätter dien Benutsersiede wäide automatisk fon do uur Wikis Ferbiendengen moaked. Du koast leeter din Heemat-Wiki noch annerje.',
	'centralauth-list-attached-title'      => 'Touhoopefierde Benutserkonten',
	'centralauth-list-attached'            => 'Do Benutserkonten mäd dän Noome „$1“ ap do foulgjende Projekte wäide automatisk touhoopefierd:',
	'centralauth-list-attached-dryrun'     => 'Do Benutserkonten mäd dän Noome „$1“ ap do foulgjende Projekte wäide automatisk touhoopefierd:',
	'centralauth-list-unattached-title'    => 'Nit touhoopefierde Benutserkonten',
	'centralauth-list-unattached'          => 'Dät Benutserkonto „$1“ kuude foar do foulgjende Projekte nit automatisk as tou die heerend bestäätiged wäide; fermoudelk häd dät n uur Paaswoud as dien primäre Benutserkonto:',
	'centralauth-foreign-link'             => 'Benutser $1 ap $2',
	'centralauth-finish-title'             => 'Touhoopefierenge kloor be-eendje',
	'centralauth-finish-text'              => 'Wan disse Benutserkonten die heere, koast du hier dän Prozess fon ju Benutserkonten-Touhoopefierenge truch ju Iengoawe fon dät Paaswoud foar do uur Benutserkonten kloor be-eendje":',
	'centralauth-finish-password'          => 'Paaswoud:',
	'centralauth-finish-login'             => 'Anmäldenge',
	'centralauth-finish-send-confirmation' => 'Paaswoud uur E-Mail touseende',
	'centralauth-finish-problems'          => 'Hääst du Probleme of heere die disse uur Benutserkonten neit?
[[meta:Help:Unified login problems|Hier finst du Hälpe]] ...',
	'centralauth-merge-attempt'            => "'''Wröigje dät ienroate Paaswoud mäd do uurblieuwene Benutserkonten...'''",
	'centralauth-attach-list-attached'     => 'Dät globoale Benutserkonto mäd dän Noome „$1“ änthaalt do foulgjende Benutserkonten:',
	'centralauth-attach-title'             => 'Benutserkonto bestäätigje',
	'centralauth-attach-text'              => 'Dit Benutserkonto wuude noch nit in n globoal Benutserkonto integrierd.
	Wan dät globoale Benutserkonto uk fon die is, koast du ju Touhoopefierenge moakje, truch dät du hier dät Paaswoud fon dät globoale Benutserkonto ienrakst:',
	'centralauth-attach-submit'            => 'Benutserkonto integrierje',
	'centralauth-attach-success'           => 'Dät Benutserkonto wuude in dät globoale Benutserkonto integrierd.',
	'centralauth'                          => 'Ferwaltenge fon ju Benutserkonten-Touhoopefierenge.',
	'centralauth-admin-manage'             => 'Benutserdoaten ferwaltje',
	'centralauth-admin-username'           => 'Benutsernoome:',
	'centralauth-admin-lookup'             => 'Benutserdoaten ankiekje of beoarbaidje',
	'centralauth-admin-permission'         => 'Ju Touhoopefierenge fon Benutserkonten fon uur Benutsere kon bloot truch Stewarde geböäre.',
	'centralauth-admin-unmerge'            => 'Uutwoalde Benutserkonten tränne',
	'centralauth-admin-merge'              => 'Uutwoalde Benutserkonten touhoopefiere',
	'centralauth-admin-bad-input'          => 'Uungultige Uutwoal',
	'centralauth-admin-none-selected'      => 'Der wuuden neen tou annerjende Benutserkonten uutwääld.',
	'centralauth-prefs-status'             => 'Benutserkonten-Stoatus:',
	'centralauth-prefs-not-managed'        => 'Der wäd neen touhoopefierd Benutserkonto bruukt.',
	'centralauth-prefs-unattached'         => 'Nit bestäätiged',
	'centralauth-prefs-complete'           => 'Kloor!',
	'centralauth-prefs-migration'          => 'Touhoopefierenge in Oarbaid',
	'centralauth-prefs-count-attached'     => 'Dien Benutserkonto is in $1 {{PLURAL:$1|Projekt|Projekte}} aktiv.',
	'centralauth-prefs-count-unattached'   => 'Dät rakt in $1 {{PLURAL:$1|Projekt|Projekte}} uunbestäätigede Benutserkonten mäd din Noome.',
	'centralauth-prefs-detail-unattached'  => 'Foar dit Projekt lait neen Bestäätigenge foar dät touhoopefierde Benutserkonto foar.',
	'centralauth-prefs-manage'             => 'Beoarbaidje dien touhoopefierd Benutserkonto',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Benutser $1 kon nit lokoal uumebenaamd wäide, deer hie al in dät globoale Benutserkonten-System uurnuumen wuude.</div>',
);

/** Sundanese (Basa Sunda)
 * @author Kandar
 */
$messages['su'] = array(
	'mergeaccount'                         => 'Status ngahijikeun log asup',
	'centralauth-desc'                     => '[[Special:MergeAccount|Gabung Rekening]] di sakabéh wiki Yayasan Wikimédia',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Gabungkeun sababaraha rekening]] pikeun Login Pamaké Tunggal',
	'centralauth-merge-denied'             => 'Punten, anjeun teu diwenangkeun muka ieu kaca.',
	'centralauth-merge-notlogged'          => 'Mangga <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} lebet log]</span> pikeun mariksa anggeus/henteuna rekening anjeun dihijieun.',
	'centralauth-merge-welcome'            => "'''Rekening pamaké anjeun can dipindahkeun ka sistem login tunggal Wikimédia.'''

Mun milih mindahkeun rekening, anjeun bakal bisa migunakeun landihan jeung sandi nu sarua pikeun asup ka sakabéh wiki proyék Wikimédia di sakabéh vérsi basa.
Hal ieu ngabantu pikeun proyék gabungan sarupaning ngunjal ka [http://commons.wikimedia.org/ Wikimedia Commons] sarta nyingkahan pahilina dua pamaké nu migunakeun landihan nu sarua di proyék nu béda.

Mun landihan anjeun geus dipaké ku nu séjén di loka séjén, hal ieu moal ngaganggu maranéhna. Anjeun justru bisa rampak gawé jeung maranéhna atawa jeung kuncén, jaga.",
	'centralauth-merge-step1-title'        => 'Mitambeyan ngahijikeun login',
	'centralauth-merge-step1-detail'       => 'Sandi jeung alamat surélék anjeun bakal diakurkeun jeung rekening di wiki séjén. Moal aya parobahan mun anjeun can konfirmasi ngeunaan hal ieu.',
	'centralauth-merge-step1-submit'       => 'Konfirmasi émbaran login',
	'centralauth-merge-step2-title'        => 'Konfirmasi rekening lianna',
	'centralauth-merge-step2-detail'       => 'Sababaraha rekeningna teu bisa sacara otomatis dicocogkeun jeung wiki asal nu dimaksud.
Mun éta rekening kagungan, anjeun bisa konfirmasi yén éta téh rekening anjeun ku cara ngasupkeun sandina.',
	'centralauth-merge-step2-submit'       => 'Konfirmasi émbaran login',
	'centralauth-merge-dryrun-complete'    => 'Sakabéh rekening nu aya bisa sacara otomatis dihijikeun!

Can aya parobahan nu dilarapkeun ka rekening anjeun.',
	'centralauth-merge-dryrun-incomplete'  => 'Anjeun geus siap neruskeun, iwal sababaraha nu teu bisa otomatis. Engké anjeun bakal bisa ngagabungkeun éta rekening.

Can aya parobahan nu dilarapkeun ka rekening anjeun.',
	'centralauth-merge-dryrun-or'          => "'''atawa'''",
	'centralauth-merge-dryrun-home'        => 'Sistem migrasi teu bisa konfirmasi yén anjeun nu miboga landihan di rekening wiki asal.

Wiki séjén geus dipilih salaku rekening asal pikeun landihan anjeun; tuturkeun tumbu di handap pikeun asup log sarta méréskeun migrasi rekening anjeun.',
	'centralauth-merge-step3-title'        => 'Jieun rekening nunggal',
	'centralauth-merge-step3-detail'       => 'Anjeun geus siap nyieun rekening nunggal nu ngawengku wiki di handap ieu:',
	'centralauth-merge-step3-submit'       => 'Hijikeun rekening',
	'centralauth-complete'                 => 'Ngahijikeun log asup geus réngsé!',
	'centralauth-incomplete'               => 'Ngahijikeun log asup can anggeus!',
	'centralauth-complete-text'            => 'Ayeuna anjeun bisa asup log ka loka wiki Wikimédia tanpa kudu nyieun rekening anyar; ladihan pamaké katut sandina bisa dipaké dina Wikipédia, Wikikamus, Wikipustaka, sarta proyék sawargina dina basa séjén.',
	'centralauth-incomplete-text'          => 'Mun log asupna geus dihijikeun, anjeun bakal bisa asup log ka loka wiki Wikimédia mana waé tanpa kudu nyieun rekening anyar; landihan pamaké katut sandina bakal bisa dipaké dina Wikipédia, Wikikamus, Wikipustaka, sarta proyék sawargina dina basa séjén.',
	'centralauth-not-owner-text'           => 'Landihan pamaké "$1" geus diajangkeun ka rekening di $2.

Mun éta téh anjeun, anjeun bisa nganggeuskeun prosés ngahijikeun log asup ku cara ngetikkeun sandi master pikeun éta rekening di dieu:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Ukur mode démo</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Nunggalkeun rekening téh kakara dina modeu démo/debugging, jadi sabenerna mah can bisa. Punten!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Baca lengkepna ngeunaan '''log asup nu dihijikeun''']]...''",
	'centralauth-list-home-title'          => 'Wiki asal',
	'centralauth-list-home-dryrun'         => 'Sandi jeung alamat surélék nu disetél di ieu wiki bakal dipaké pikeun rekening tunggal anjeun.
Engké, anjeun bakal bisa milih wiki asal anjeun.',
	'centralauth-list-attached-title'      => 'Rekening nunggal',
	'centralauth-list-attached'            => 'Ngaran rekening "$1" di loka di handap ieu geus sacara otomatis dihijikeun kana rekening nunggal:',
	'centralauth-list-attached-dryrun'     => 'Ngaran rekening "$1" di loka di handap ieu bakal sacara otomatis dihijikeun kana rekening nunggal:',
	'centralauth-list-unattached-title'    => 'Rekening teu kawengku',
	'centralauth-list-unattached'          => 'Rekening "$1" teu bisa sacara otomatis dikonfirmasi milik anjeun di loka di handap ieu; sigana mah alatan beda sandina ti rekening utama anjeun:',
	'centralauth-foreign-link'             => 'Pamaké $1 di $2',
	'centralauth-merge-method-primary'     => 'wiki asal',
	'centralauth-merge-method-empty'       => 'euweuh kontribusi',
	'centralauth-merge-method-mail'        => 'konfirmasi ngaliwatan surélék',
	'centralauth-merge-method-password'    => 'konfirmasi maké sandi',
	'centralauth-merge-method-admin'       => 'rekening nu dihijikeun ku kuncén',
	'centralauth-merge-method-new'         => 'rekening anyar',
	'centralauth-merge-method-login'       => 'konfirmasi maké login',
	'centralauth-finish-title'             => 'Réngsé ngahijikeun',
	'centralauth-finish-text'              => 'Mun rekening ieu bener boga anjeun, mangga réngsékeun prosés ngahijikeun log asup ku cara ngasupkeun sandi rekening lianna di dieu:',
	'centralauth-finish-password'          => 'Sandi:',
	'centralauth-finish-login'             => 'Asup log',
	'centralauth-finish-send-confirmation' => 'Kirimkeun sandi kana surélék',
	'centralauth-finish-problems'          => 'Aya masalah? Teu boga rekening lianna ieu? [[meta:Help:Unified login problems|Ménta pitulung]]...',
	'centralauth-finish-noconfirms'        => 'Taya rekening nu bisa dikonfirmasi maké ieu sandi.',
	'centralauth-finish-incomplete'        => 'Sababaraha rekening geus dihijikeun maké ieu sandi. Rekening lianna can konfirmasi.',
	'centralauth-merge-attempt'            => "'''Ngakurkeun sandi nu disadiakeun jeung rekening nu can dihijikeun...'''",
	'centralauth-attach-list-attached'     => 'Rekening nunggal "$1" ngawengku rekening-rekening di handap ieu:',
	'centralauth-attach-title'             => 'Konfirmasi rekening',
	'centralauth-attach-text'              => 'Ieu rekening can dipindahkeun ka rekening tunggal. Mun rekening globalna kénéh-kénéh nu anjeun, anjeun bisa ngagabungkeun ieu rekening mun ngasupkeun sandi rekening global:',
	'centralauth-attach-submit'            => 'Pindahkeun rekening',
	'centralauth-attach-success'           => 'Rekening dimaksud geus dipindahkeun ka rekening nunggal.',
	'centralauth'                          => 'Administrasi log asup nu dihijikeun',
	'centralauth-admin-manage'             => 'Kokolakeun data pamaké',
	'centralauth-admin-username'           => 'Landihan pamaké:',
	'centralauth-admin-lookup'             => 'Témbongkeun atawa robah data pamaké',
	'centralauth-admin-permission'         => 'Nu bisa ngahijikeun rekening batur mah ngan steward.',
	'centralauth-admin-no-unified'         => 'Euweuh rekening nunggal keur landihan ieu.',
	'centralauth-admin-info-id'            => 'Landihan pamaké:',
	'centralauth-admin-info-registered'    => 'Kadaptar:',
	'centralauth-admin-info-locked'        => 'Kakonci:',
	'centralauth-admin-info-hidden'        => 'Nyumput:',
	'centralauth-admin-yes'                => 'enya',
	'centralauth-admin-no'                 => 'henteu',
	'centralauth-admin-attached'           => 'Rekening nu geus ngahiji',
	'centralauth-admin-unattached'         => 'Rekening nu teu kawengku',
	'centralauth-admin-no-unattached'      => 'Euweuh rekening séjén nu can ngagabung.',
	'centralauth-admin-list-localwiki'     => 'Wiki lokal',
	'centralauth-admin-list-attached-on'   => 'Kawengku di',
	'centralauth-admin-list-method'        => 'Cara',
	'centralauth-admin-unmerge'            => 'Pisahkeun nu dipilih',
	'centralauth-admin-merge'              => 'Hijikeun nu dipilih',
	'centralauth-admin-bad-input'          => 'Pilihan ngagabungna salah',
	'centralauth-admin-none-selected'      => 'Euweuh rekening nu dipilih pikeun dirobah.',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|detik|detik}} kaliwat',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|menit|menit}} kaliwat',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|jam|jam}} kaliwat',
	'centralauth-days-ago'                 => '$1 poé kaliwat',
	'centralauth-months-ago'               => '$1 bulan kaliwat',
	'centralauth-years-ago'                => '$1 taun kaliwat',
	'centralauth-prefs-status'             => 'Status rekening global:',
	'centralauth-prefs-not-managed'        => 'Teu migunakeun rekening nunggal',
	'centralauth-prefs-unattached'         => 'Can konfirmasi',
	'centralauth-prefs-complete'           => 'Bérés kabéh!',
	'centralauth-prefs-migration'          => 'Keur migrasi',
	'centralauth-prefs-count-attached'     => 'Rekening anjeun aktif di $1 proyék {{plural:$1|loka|loka}}.',
	'centralauth-prefs-count-unattached'   => 'Sababaraha rekening anjeun di $1 {{plural:$1|proyék|proyék}} can konfirmasi.',
	'centralauth-prefs-detail-unattached'  => 'Loka ieu proyék can dikonfirmasi kaasup kana rekening global.',
	'centralauth-prefs-manage'             => 'Kokolakeun rekening global anjeun',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Pamaké $1 teu bisa diganti sacara lokal, sabab geus dipindahkeun ka sistem login tunggal.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Teu bisa ngaganti ngaran $2 kusabab ieu landihan diajangkeun keur rekening global.</div>',
	'centralauth-account-exists'           => 'Rekening teu bisa dijieun: landihan nu dipénta geus dipaké dina sistem login tunggal.',
);

/** Swedish (Svenska)
 * @author M.M.S.
 * @author Lejonel
 * @author Sannab
 * @author Leo Johannes
 * @author Siebrand
 * @author Micke
 */
$messages['sv'] = array(
	'mergeaccount'                         => 'Status för gemensam inloggning',
	'centralauth-desc'                     => '[[Special:MergeAccount|Sammanfogar användarkonton]] på Wikimedia Foundations olika wikier till ett konto',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Sammanfogar flera konton]] för gemensam inloggning',
	'centralauth-merge-denied'             => 'Du har tyvärr inte åtkomstsbehörighet till denna sida.',
	'centralauth-merge-notlogged'          => 'Du måste <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} logga in]</span> för att se om dina konton har blivit fullständigt sammanslagna.',
	'centralauth-merge-welcome'            => "'''Ditt konto har ännu inte flyttats över till Wikimedias gemensamma inloggningssystem.'''

Om du väljer att slå samman dina konton, så kommer du att kunna använda samma användarnamn och lösenord för att logga in på alla språkversioner av alla Wikimedias projekt.
På så sätt blir det enklare att arbeta på gemensamma projekt, till exempel att ladda upp filer till [http://commons.wikimedia.org/ Wikimedia Commons]. Det undviker också förvirring och andra problem som kan uppstå när olika personer har samma användarnamn på olika projekt.

Om någon annan redan har tagit ditt användarnamn på ett annat projekt så påverkar det här inte denne nu, men du kommer att få möjlighet att reda ut det med personen i fråga eller med en administratör senare.",
	'centralauth-merge-step1-title'        => 'Påbörja sammanslagning av konton',
	'centralauth-merge-step1-detail'       => 'Ditt lösenord och din e-postadress kommer kontrolleras mot användarkonton på andra wikier för att bekräfta att de stämmer överens. Inga ändringar kommer att genomföras innan du bekräftar att allting ser riktigt ut.',
	'centralauth-merge-step1-submit'       => 'Bekräfta lösenord',
	'centralauth-merge-step2-title'        => 'Bekräfta fler konton',
	'centralauth-merge-step2-detail'       => 'Några av kontona kunde inte automatiskt matchas med kontot på den wiki som utsetts till hemwiki. Om dessa konton tillhör dig kan du bekräfta det genom att ange lösenorden för dem.',
	'centralauth-merge-step2-submit'       => 'Bekräfta inloggningsinformation',
	'centralauth-merge-dryrun-complete'    => 'Alla existerande konton kan automatiskt slås samman!

Inga ändringar av dina konton har gjorts än.',
	'centralauth-merge-dryrun-incomplete'  => 'Du är redo att fortsätta, men några konton kunde inte automatiskt bekräftas tillhöra dig och kan därför inte slås ihop direkt. Du kommer senare få möjlighet att slå samman de kontona.

Inga ändringar av dina konton har gjorts än.',
	'centralauth-merge-dryrun-or'          => "'''eller'''",
	'centralauth-merge-dryrun-home'        => 'Systemet för kontosammanslagning kunde inte bekräfta att du är ägaren till kontot på användarnamnets hemwiki.

En annan wiki har utsetts till hemwiki för ditt användarnamn. Följ länken härunder och logga in där för att slutföra sammanslagningen av dina konton.',
	'centralauth-merge-step3-title'        => 'Skapa gemensamt konto',
	'centralauth-merge-step3-detail'       => 'Du kan nu skapa ditt gemensamma användarkonto, med följande wikier anslutna:',
	'centralauth-merge-step3-submit'       => 'Slå samman konton',
	'centralauth-complete'                 => 'Dina användarkonton har slagits ihop!',
	'centralauth-incomplete'               => 'Sammanslagning av inloggning är inte fullständig!',
	'centralauth-complete-text'            => 'Du kan nu logga in på alla Wikimedias wikier utan att skapa nya konton. Samma användarnamn och lösenord kommer fungera på alla språkversioner av Wikipedia, Wiktionary, Wikibooks och deras systerprojekt.',
	'centralauth-incomplete-text'          => 'När du har gemensam inloggning kommer du kunna logga in på alla Wikimedias wikier utan att skapa nya konton. Samma användarnamn och lösenord kommer fungera på alla språkversioner av Wikipedia, Wiktionary, Wikibooks och deras systerprojekt.',
	'centralauth-not-owner-text'           => 'Användarnamnet "$1" tilldelades automatiskt ägaren av kontot på $2.

Om du är ägaren av det kontot, så kan du slutföra sammanslagningen genom att ange lösenordet för det kontot här:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Endast demonstration</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Sammanslagning av konton körs för närvarande i demonstrations- eller debugläge, så funktionerna som gör kontosammanslagningar är avaktiverade.',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Läs mer om '''gemensam inloggning''']]...''",
	'centralauth-list-home-title'          => 'Hemwiki',
	'centralauth-list-home-dryrun'         => 'Ditt lösenord och din e-postadress på denna wiki kommer att användas för ditt gemensamma konto.
Du kommer senare kunna ändra vilken wiki som är din hemwiki.',
	'centralauth-list-attached-title'      => 'Anslutna konton',
	'centralauth-list-attached'            => 'Konton med namnet "$1" på följade webbplatser har automatiskt anslutits till det gemensamma kontot:',
	'centralauth-list-attached-dryrun'     => 'Konton med namnet "$1" på följande webbplatser kommer automatiskt anslutas till det gemensamma kontot:',
	'centralauth-list-unattached-title'    => 'Ej anslutna konton',
	'centralauth-list-unattached'          => 'På följande webbplatser kunde det inte automatiskt bekräftas att kontot "$1" tillhör dig; det beror troligen på att de har ett annat lösenord än ditt huvudkonto:',
	'centralauth-foreign-link'             => 'Användare $1 på $2',
	'centralauth-merge-method-primary'     => 'hemwiki',
	'centralauth-merge-method-empty'       => 'inga bidrag',
	'centralauth-merge-method-mail'        => 'bekräftat via e-post',
	'centralauth-merge-method-password'    => 'bekräftat med lösenord',
	'centralauth-merge-method-admin'       => 'anslutet av administratör',
	'centralauth-merge-method-new'         => 'nytt konto',
	'centralauth-merge-method-login'       => 'bekräftat via inloggning',
	'centralauth-finish-title'             => 'Slutför sammanslagning',
	'centralauth-finish-text'              => 'Om dessa konton tillhör dig, så kan du slutföra sammanslagningen genom att ange lösenorden för dem här:',
	'centralauth-finish-password'          => 'Lösenord:',
	'centralauth-finish-login'             => 'Logga in',
	'centralauth-finish-send-confirmation' => 'Skicka lösenord via e-post',
	'centralauth-finish-problems'          => 'Har du problem, eller är du inte är ägare till de andra kontona? Se [[meta:Help:Unified login problems|hjälpsidan]]...',
	'centralauth-finish-noconfirms'        => 'Inga konton kunde bekräftas med det lösenordet.',
	'centralauth-finish-incomplete'        => 'Några konton anslöts med detta lösenord. Andra konton har ännu inte bekräftats.',
	'centralauth-merge-attempt'            => "'''Kontrollerar det angivna lösenordet mot återstående oanslutna konton...'''",
	'centralauth-attach-list-attached'     => 'Det gemensamma kontot med namnet "$1" omfattar följande konton:',
	'centralauth-attach-title'             => 'Bekräfta konto',
	'centralauth-attach-text'              => 'Detta konto har ännu inte anslutits till det gemensamma kontot. Om det gemensamma kontot är ditt, så kan du ansluta det här kontot genom att ange det gemensamma kontots lösenord:',
	'centralauth-attach-submit'            => 'Anslut konto',
	'centralauth-attach-success'           => 'Kontot har anslutits till det gemensamma kontot.',
	'centralauth'                          => 'Administration av gemensam inloggning',
	'centralauth-admin-manage'             => 'Hantera användardata',
	'centralauth-admin-username'           => 'Användarnamn:',
	'centralauth-admin-lookup'             => 'Visa eller redigera användardata',
	'centralauth-admin-permission'         => 'Endast stewarder kan slå samman andra användares konton åt dem.',
	'centralauth-admin-no-unified'         => 'Det finns inget gemensamt konto med det användarnamnet',
	'centralauth-admin-info-id'            => 'Användar-ID:',
	'centralauth-admin-info-registered'    => 'Registrerad:',
	'centralauth-admin-info-locked'        => 'Låst:',
	'centralauth-admin-info-hidden'        => 'Dold:',
	'centralauth-admin-yes'                => 'ja',
	'centralauth-admin-no'                 => 'nej',
	'centralauth-admin-attached'           => 'Fullständigt sammanslagna konton',
	'centralauth-admin-unattached'         => 'Ej anslutna konton',
	'centralauth-admin-no-unattached'      => 'Det finns inte kvar några konton att slå samman.',
	'centralauth-admin-list-localwiki'     => 'Lokal wiki',
	'centralauth-admin-list-attached-on'   => 'Anslutningsdatum',
	'centralauth-admin-list-method'        => 'Metod',
	'centralauth-admin-unmerge'            => 'Åtskilj valda',
	'centralauth-admin-merge'              => 'Slå samman valda',
	'centralauth-admin-bad-input'          => 'Ogiltigt val för sammanslagning',
	'centralauth-admin-none-selected'      => 'Har inte valt några konton att modifiera.',
	'centralauth-admin-already-unmerged'   => 'Hoppar över $1, redan skild',
	'centralauth-admin-unmerge-success'    => 'Skilde $1 {{PLURAL:$2|konto|konton}}',
	'centralauth-admin-delete-title'       => 'Radera konto',
	'centralauth-admin-delete-description' => 'Radering av det globala kontot kommer ta bort globala inställningar, skilja ut alla konton, och göra det globala namnet tillgängligt för andra användare. Alla lokala konton kommer fortsätta att existera. Lösenorden till lokala konton sparat för sammanslagningen kommer gå tillbaka till värdena dom var före sammanslagningen.',
	'centralauth-admin-delete-button'      => 'Radera detta konto',
	'centralauth-admin-delete-success'     => 'Raderade det globala kontot för "<nowiki>$1</nowiki>"',
	'centralauth-admin-nonexistent'        => 'Det är inget globalt konto för "<nowiki>$1</nowiki>"',
	'centralauth-admin-delete-nonexistent' => 'Fel: Det globala kontot "<nowiki>$1</nowiki>" finns inte.',
	'centralauth-token-mismatch'           => 'Beklagar, formuläret kunde inte lagras på grund av förlorad sessionsdata.',
	'centralauth-admin-lock-title'         => 'Lås kontot',
	'centralauth-admin-lock-description'   => 'Låsning av ett konto kommmer göra det omöjligt att logga in med det på någon wiki.',
	'centralauth-admin-lock-button'        => 'Lås detta konto',
	'centralauth-admin-lock-success'       => 'Låste det globala kontot "<nowiki>$1</nowiki>"',
	'centralauth-admin-lock-nonexistent'   => 'Fel: det globala kontot "<nowiki>$1</nowiki>" finns inte.',
	'centralauth-admin-unlock-title'       => 'Lås upp konto',
	'centralauth-admin-unlock-description' => 'Upplåsning av konton kommer göra det möjligt att logga in med det igen.',
	'centralauth-admin-unlock-button'      => 'Lås upp detta konto',
	'centralauth-admin-unlock-success'     => 'Låste upp det globala kontot "<nowiki>$1</nowiki>"',
	'centralauth-admin-unlock-nonexistent' => 'Fel: det globala kontot "<nowiki>$1</nowiki>" finns inte.',
	'centralauth-admin-reason'             => 'Anledning:',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|sekund|sekunder}} sedan',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|minut|minuter}} sedan',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|timme|timmar}} sedan',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|dag|dagar}} sedan',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|månad|månader}} sedan',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|år|år}} sedan',
	'centralauth-prefs-status'             => 'Status för gemensamt konto:',
	'centralauth-prefs-not-managed'        => 'Använder inte gemensamt konto',
	'centralauth-prefs-unattached'         => 'Obekräftat',
	'centralauth-prefs-complete'           => 'Allt är i ordning!',
	'centralauth-prefs-migration'          => 'Anslutning pågår',
	'centralauth-prefs-count-attached'     => 'Ditt konto är aktivt på $1 projekt.',
	'centralauth-prefs-count-unattached'   => 'Obekräftade konton med ditt namn finns fortfarande på $1 projekt.',
	'centralauth-prefs-detail-unattached'  => 'Det är inte bekräftat att det här kontot tillhör det globala kontot.',
	'centralauth-prefs-manage'             => 'Hantera ditt gemensamma konto',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Det går inte att döpa om användare $1 lokalt eftersom användarnamnet har anslutits till systemet för gemensam inloggning.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Kan inte byta namn på användare $2 eftersom detta användarnamn är reserverat för ett gemensamt konto.</div>',
	'centralauth-invalid-wiki'             => 'Ingen sådan databas: $1',
	'centralauth-account-exists'           => 'Kan inte skapa konto: det angivna användarnamnet används redan av ett gemensamt konto.',
	'centralauth-log-name'                 => 'Logg för behandling av globala konton',
	'centralauth-log-header'               => 'Denna logg innehåller händelser relaterade till globala konton: raderingar, låsningar och upplåsningar.',
	'centralauth-log-entry-delete'         => 'raderade globalt konto "<nowiki>$1</nowiki>"',
	'centralauth-log-entry-lock'           => 'låste globalt konto "<nowiki>$1</nowiki>"',
	'centralauth-log-entry-unlock'         => 'låste upp globalt konto "<nowiki>$1</nowiki>"',
);

/** Tamil (தமிழ்)
 * @author Trengarasu
 */
$messages['ta'] = array(
	'centralauth-finish-password'          => 'கடவுச்சொல்:',
	'centralauth-finish-login'             => 'புகுபதிகை',
	'centralauth-finish-send-confirmation' => 'கடவுச்சொல்லை மின்னஞ்சல் செய்',
	'centralauth-admin-username'           => 'பயனர் பெயர்:',
);

/** Telugu (తెలుగు)
 * @author Veeven
 * @author Chaduvari
 * @author వైజాసత్య
 * @author Mpradeep
 * @author Siebrand
 */
$messages['te'] = array(
	'mergeaccount'                         => 'ప్రవేశపు ఏకీకరణ స్థితి',
	'centralauth-desc'                     => 'వికీమీడియా ఫౌండేషన్ వికీలన్నింటిలో [[Special:MergeAccount|ఖాతాని విలీనం చేయి]]',
	'centralauth-merge-notlogged'          => 'మీ ఖాతాలు పూర్తిగా విలీనమయినవని సరిచూసుకునేందుకు, దయచేసి <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} లోనికి ప్రవేశించండి]</span>.',
	'centralauth-merge-welcome'            => "'''మీ వాడుకరి ఖాతా ఇంకా వికీమీడియా యొక్క ఏకీకృత ప్రవేశపు వ్యవస్థ లోనికి విలీనం కాలేదు.'''

మీ ఖాతాలని విలీనం చేస్తే, వికీమీడియా యొక్క అన్ని ప్రాజెక్టు వికీలలోనికి అందుబాటులో ఉన్న అన్ని భాషలలోనికి ఒకే వాడుకరి పేరు మరియు సంకేతపదం ఉపయోగించి మీరు ప్రవేశించవచ్చు.

అందువల్ల [http://commons.wikimedia.org/ వికీమీడియా కామన్స్]లోనికి ఎగుమతి చేయడం లాంటి బహుళ ప్రాజెక్టులలో పనులు సులువౌతాయు, మరియు ఇది ఇద్దరు వ్యక్తులు వేర్వేరు ప్రాజెక్టులలో ఒకే వాడుకరి పేరు ఎంచుకోవడం వల్ల వచ్చే అయోమయాన్ని మరియు సంఘర్షణని నివారిస్తుంది.

మీ వాడుకరి పేరుని ఇతర సైట్లో వేరెవరైనా ఇప్పటికే తీసేసుకునివుంటే ఇది వారిని కదపదు, కానీ తర్వాత వారితోనూ లేదా నిర్వాహకులతోనూ పరిష్కరించుకోవడానికి అవకాశమిస్తుంది.",
	'centralauth-merge-step1-title'        => 'ప్రవేశ ఏకీకరణని మొదలుపెట్టు',
	'centralauth-merge-step1-detail'       => 'మీ సంకేతపదం మరియు నమోదైన ఈ-మెయిల్ చిరునామాలు సరిపోతున్నాయని నిర్ధారించడానికి ఇతర వికీలలో ఉన్న ఖాతాలతో పోల్చిచూస్తాం. అన్నీ సరిగానే ఉన్నాయని మీరు నిర్ధారించే వరకు మార్పులేమీ చెయ్యబోము.',
	'centralauth-merge-step1-submit'       => 'ప్రవేశపు సమాచారాన్ని నిర్ధారించండి',
	'centralauth-merge-step2-title'        => 'మరిన్ని ఖాతాలను నిర్ధారించండి',
	'centralauth-merge-step2-detail'       => 'కొన్ని ఖాతాలను లక్ష్యిత ప్రధాన వికీతో ఆటోమేటిగ్గా సరిపోల్చలేకపోయాం. ఈ ఖాతాలు మీకు సంబంధించినవైతే, వాటి సంకేతపదాలను ఇవ్వడం ద్వారా అవి మీవే అని నిర్ధారించవచ్చు.',
	'centralauth-merge-step2-submit'       => 'ప్రవేశపు సమాచారాన్ని నిర్ధారించండి',
	'centralauth-merge-dryrun-or'          => "'''లేదా'''",
	'centralauth-merge-step3-title'        => 'ఏకీకృత ఖాతాని సృష్టించండి',
	'centralauth-merge-step3-detail'       => 'ఈ క్రింద పేర్కొన్న వికీల జోడింపుతో, మీ ఏకీకృత ఖాతాని సృష్టించడానికి సిద్ధంగా ఉన్నారు.',
	'centralauth-merge-step3-submit'       => 'ఖాతాలను ఏకీకరించు',
	'centralauth-complete'                 => 'ప్రవేశపు ఏకీకరణ పూర్తయ్యింది!',
	'centralauth-incomplete'               => 'ప్రవేశపు ఏకీకరణ పూర్తి కాలేదు!',
	'centralauth-complete-text'            => 'కొత్త ఖాతా సృష్టించుకోకుండానే మీరిప్పుడు ఏదైనా వికీమీడియా వికీ లోనికి ప్రవేశించవచ్చు; అదే వాడుకరిపేరు మరియు సంకేతపదం వికీపీడియా, విక్షనరీ, వికీపుస్తకాలు, మరియు అన్ని భాషలలోని వాటి సోదర ప్రాజెక్టులలోనూ పనిచేస్తాయి.',
	'centralauth-incomplete-text'          => 'ఒక్కసారి ప్రవేశం ఏకీకృతమయ్యాక, మీరు ఏదైనా వికీమీడియా వికీ సైటు లోనికి కొత్త ఖాతా సృష్టించనవసరం లేకుండానే ప్రవేశించగల్గుతారు; వికీపీడియా, విక్షనరీ, వికీపుస్తకాలు, మరియు అన్ని భాషలలోనూ వాటి సోదర ప్రాజెక్టులలోనూ ఒకే వాడుకరి పేరు మరియు సంకేతపదం పనిచేస్తాయి.',
	'centralauth-not-owner-text'           => '"$1" అన్న వాడుకరి పేరు $2లోని ఖాతా యజమానికి ఆటోమేటిగ్గా ఆపాదించివుంది.

అది మీరే అయితే, ఆ ఖాతాకి ప్రధాన సంకేతపదాన్ని ఇక్కడ ఇవ్వడం ద్వారా తేలిగ్గా ప్రవేశపు ఏకీకృత ప్రక్రియని ముగించవచ్చు:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>డెమో మాత్రమే</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'ఖాతా ఏకీకరణ ప్రస్తుతం డెమో / పరీక్షా స్థితిలో ఉంది, కనుక వాస్తవ విలీన కలాపాలని అచేతనం చేసాము. క్షమించండి!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|'''ఏకీకృత ప్రవేశం''' గురించి మరింత తెలుసుకోండి]]...''",
	'centralauth-list-home-title'          => 'ప్రధాన వికీ',
	'centralauth-list-home-dryrun'         => 'ఈ వికీలోని మీ సంకేతపదం మరియు ఈ-మెయిల్ చిరునామాని మీ ఏకీకృత ఖాతాకి ఉపయోగిస్తాం. మీ ప్రధాన వికీ ఏదో మీరు తర్వాత మార్చుకోవచ్చు.',
	'centralauth-list-attached-title'      => 'జోడించిన ఖాతాలు',
	'centralauth-list-attached'            => 'క్రింది సైట్లలోని "$1" అనే పేరుగల ఖాతాని ఏకీకృత ఖాతాకి ఆటోమెటిగ్గా జోడించాం:',
	'centralauth-list-attached-dryrun'     => 'ఈ క్రింద పేర్కొన్న సైట్లలోని "$1" పేరున్న ఖాతాలన్నీ ఆటోమేటిగ్గా ఏకీకృత ఖాతాకి జోడించబడతాయి:',
	'centralauth-list-unattached-title'    => 'జోడించని ఖాతాలు',
	'centralauth-list-unattached'          => 'ఈ క్రింద పేర్కొన్న సైట్లలో "$1" అనే ఖాతా మీదే అని నిర్ధారించలేకున్నాం; బహుశా వీటిల్లో సంకేతపదం మీ ప్రధాన ఖాతాది కాక వేరేది అయివుండవచ్చు:',
	'centralauth-foreign-link'             => '$2లో వాడుకరి $1',
	'centralauth-merge-method-mail'        => 'ఈ-మెయిలు ద్వారా నిర్ధారించారు',
	'centralauth-merge-method-password'    => 'సంకేతపదం ద్వారా నిర్ధారించారు',
	'centralauth-merge-method-admin'       => 'ఖాతాని నిర్వాహకులు విలీనం చేసారు',
	'centralauth-merge-method-new'         => 'కొత్త ఖాతా',
	'centralauth-merge-method-login'       => 'ప్రవేశం ద్వారా నిర్ధారించారు',
	'centralauth-finish-title'             => 'విలీనం ముగించు',
	'centralauth-finish-text'              => 'ఈ ఖాతాలు మీవే అయితే, వాటి సంకేతపదాలను ఇక్కడ ఇవ్వడం ద్వారా ప్రవేశపు ఏకీకరణ ప్రక్రియని ముగించవచ్చు:',
	'centralauth-finish-password'          => 'సంకేతపదం:',
	'centralauth-finish-login'             => 'ప్రవేశించు',
	'centralauth-finish-send-confirmation' => 'సంకేతపదాన్ని ఈ-మెయిల్లో పంపించు',
	'centralauth-finish-problems'          => 'సమస్య ఉందా, లేదా ఈ ఇతర ఖాతాలు మీవి కాదా? [[meta:Help:Unified login problems|సహాయం పొందడం ఎలా]]...',
	'centralauth-merge-attempt'            => "'''మీరిచ్చిన సంకేతపదాన్ని ఇంకా విలీనంకాని ఖాతాలలో సరిచూస్తున్నాం...'''",
	'centralauth-attach-list-attached'     => '"$1" అనే పేరుగల ఏకీకృత ఖాతా ఈ క్రింద పేర్కొన్న ఖాతాలను కలిగివుంది:',
	'centralauth-attach-title'             => 'ఖాతాని నిర్ధారించు',
	'centralauth-attach-text'              => 'ఈ ఖాతా ఇంకా ఏకీకృత ఖాతాలో విలీనం కాలేదు. క్రింద పేర్కొన్న ఏకీకృత ఖాతా మీదే అయితే, దాని సంకేతపదాన్ని ఇచ్చి ఈ ఖాతాని విలీనం చేసుకోవచ్చు:',
	'centralauth-attach-submit'            => 'ఖాతాను బదిలీ చెయ్యండి',
	'centralauth-attach-success'           => 'ఈ ఖాతా ఏకీకృత ఖాతాకు బదిలీ చేయబడినది',
	'centralauth'                          => 'ఏకీకృత ప్రవేశపు నిర్వహణ',
	'centralauth-admin-manage'             => 'వాడుకరి డాబాను నిర్వహించు',
	'centralauth-admin-username'           => 'వాడుకరి పేరు:',
	'centralauth-admin-lookup'             => 'వాడుకరి సమాచారాన్ని చూడండి లేదా మార్చండి',
	'centralauth-admin-permission'         => 'స్టీవార్డులు మాత్రమే ఇతరుల ఖాతాలను విలీనం చెయ్యగలరు.',
	'centralauth-admin-no-unified'         => 'ఈ వాడుకరిపేరుకి ఏకీకృత ఖాతా లేదు.',
	'centralauth-admin-info-id'            => 'వాడుకరి ID:',
	'centralauth-admin-yes'                => 'అవును',
	'centralauth-admin-no'                 => 'కాదు',
	'centralauth-admin-attached'           => 'పూర్తిగా విలీనమైన ఖాతాలు',
	'centralauth-admin-unattached'         => 'జోడించని ఖాతాలు',
	'centralauth-admin-no-unattached'      => 'విలీనం కాని ఖాతాలేమీ లేవు.',
	'centralauth-admin-list-localwiki'     => 'స్థానిక వికీ',
	'centralauth-admin-list-method'        => 'పద్ధతి',
	'centralauth-admin-unmerge'            => 'ఎంచుకున్నవాటి విలీనాన్ని రద్దుచెయ్యి',
	'centralauth-admin-merge'              => 'ఎంచుకున్నవాటిని విలీనం చేయి',
	'centralauth-admin-bad-input'          => 'తప్పుడు విలీనపు ఎంపిక',
	'centralauth-admin-none-selected'      => 'మార్చడానికి ఖాతాలేమీ ఎంచుకోలేదు.',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|క్షణం|క్షణాల}} క్రితం',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|నిమిషం|నిమిషాల}} క్రితం',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|గంట|గంటల}} క్రితం',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|రోజు|రోజుల}} క్రితం',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|నెల|నెలల}} క్రితం',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|సంవత్సరం|సంవత్సరాల}} క్రితం',
	'centralauth-prefs-status'             => 'గ్లోబల్ ఖాతా స్థితి:',
	'centralauth-prefs-not-managed'        => 'ఏకీకృత ఖాతాని వాడటం లేదు',
	'centralauth-prefs-unattached'         => 'నిర్థారణకాలేదు',
	'centralauth-prefs-complete'           => 'అన్నీ సరిపోయాయి!',
	'centralauth-prefs-migration'          => 'బదిలీలో ఉన్నవి',
	'centralauth-prefs-count-attached'     => 'మీ ఖాతా $1 ప్రాజెక్టు {{plural:$1|సైటు|సైట్ల}}లో సచేతనంగా ఉంది.',
	'centralauth-prefs-count-unattached'   => '$1 {{plural:$1|ప్రాజెక్టు|ప్రాజెక్టుల}}లో మీ పేరుతో ఉండి నిర్ధారణకాని ఖాతాలు.',
	'centralauth-prefs-detail-unattached'  => 'ఈ ప్రాజెక్టు సైటు గ్లోబల్ ఖాతాకు చెందినదని నిర్ధారణ కాలేదు.',
	'centralauth-prefs-manage'             => 'మీ గ్లోబల్ ఖాతాను నిర్వహించుకోండి',
	'centralauth-renameuser-abort'         => '<div class="errorbox">$1 అనే వాడుకరి పేరు ఏకీకృత ప్రవేశపు వ్యవస్థలో నిలీనమైనందున, స్థానికంగా ఆ పేరుని మార్చలేరు.</div>',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$messages['tet'] = array(
	'centralauth-admin-yes' => 'sin',
	'centralauth-admin-no'  => 'lae',
);

/** Tajik (Cyrillic) (Тоҷикӣ/tojikī (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'mergeaccount'                         => 'Вазъияти якка кардани ҳисобҳо',
	'centralauth-desc'                     => '[[Special:MergeAccount|Якка кардани ҳисоб]] дар викиҳои Бунёди Викимедиа',
	'centralauth-mergeaccount-desc'        => 'Барои Вуруди Яккаи Корбар [[Special:MergeAccount|якчанд ҳисобҳоро якка мекунад]]',
	'centralauth-merge-denied'             => 'Бубахшед, шумо иҷозати дастрасӣ ба ин саҳифаро надоред.',
	'centralauth-merge-notlogged'          => 'Лутфан <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} ба систем ворид шавед]</span>  то аз идғоми ҳисобҳои корбариатон итминон ҳосил кунед.',
	'centralauth-merge-welcome'            => "'''Ҳисоби корбарии шумо ҳанӯз ба сомонаи яки кардани ҳисобҳои ВикиМедиа интиқол нашудааст.'''

Агар шумо тасмим бигиред, ки ҳисобҳои корбариатонро интикол бидиҳед, шумо қодир хоҳед буд, ки бо як ҳисоби корбарӣ ва калимаи убур дар тамоми лоиҳаҳои ВикиМедиа ба тамоми забонҳои ворид шавед.
Ин амал боиси осонтар шудани кор бо лоиҳаҳои муштарак ба монанди борзузорӣ ба [http://commons.wikimedia.org/ Викимедиа Умумӣ] мешавад, ва монеаъ аз сардаргамиҳо ё бархӯрдҳо аз истифодаи ду нафар аз як номи корбарӣ дар як лоиҳаи мухталиф ношӣ мешавад.

Агар номи корбарии шумо қаблан дар лоиҳаи дигаре тавассути шахси дигаре истифода шуда бошад, ин кор боиси халалрасонӣ ба онҳо намешавад, балки ба шумо имконеро медиҳад, ки баъдан ин мушкилро бо кӯмаки онҳо ё як мудир ҳал кунед.",
	'centralauth-merge-step1-title'        => 'Оғози якка кардани ҳисобҳои корбарӣ',
	'centralauth-merge-step1-detail'       => 'Калимаи убур ва нишонаи почтаи электронии сабтшуда тавассути шумо бо ҳисобҳои корбарӣ викиҳои дигаре муқоиса мешавад, то аз мутобиқати онҳо итминон ҳосил гардад. То замоне, ки шумо таъйид накунед, ки ҳама чиз дуруст аст, тағйир сурат нахоҳад гирифт.',
	'centralauth-merge-step1-submit'       => 'Тасдиқи иттилооти вуруд ба систем',
	'centralauth-merge-step2-title'        => 'Тасдиқи ҳисобҳои корбарии бештар',
	'centralauth-merge-step2-detail'       => 'Бархе аз ҳисобҳои корбариро наметавон ба таври худкор бо хисоби викии аслӣ мутобиқат дод. Агар ин хисобҳои корбарӣ ба шумо мутаалуқ ҳастанд, шумо метавонед ин масъаларо бо ворид кардани калимаи убури ин ҳисобҳо таъйид кунед.',
	'centralauth-merge-step2-submit'       => 'Тасдиқи иттилооти вуруд ба систем',
	'centralauth-merge-dryrun-complete'    => 'Тамоми ҳисобҳои вуҷуддошат метавонанд ба таври худкор якка карда шаванд!

Ягон тағйироте то ҳол ба ҳисобҳои шумо амалӣ нашудаанд.',
	'centralauth-merge-dryrun-incomplete'  => 'Шумо барои давом қарор доред, аммо баъзе ҳисобҳо наметавонанд ба таври худкор таъйид шаванд ё мустақиман кӯчонида шаванд.
Шумо дертар метавонед инҳоро идғом кунед.

Ҳеҷ тағйироте ба ҳисобҳои шумо анҷом нашудаанд.',
	'centralauth-merge-dryrun-or'          => "'''ё'''",
	'centralauth-merge-dryrun-home'        => 'Системаи кӯчонидан натавонист тасдиқ кунед, ки шумо соҳиби ҳисоби викии аслӣ барои номи корбариатон ҳастед.

Дигар вики ҳамчун ҳисоби аслӣ барои ҳисоби шумо мушаххас шудааст; пайванди зерро дунбол кунед ва ба кӯчонидани ҳисоби худ хотима диҳед.',
	'centralauth-merge-step3-title'        => 'Эҷоди ҳисоби муштарак',
	'centralauth-merge-step3-detail'       => 'Шумо омодаед ҳисоби муштараки худро дар викиҳои зерин эҷод кунед:',
	'centralauth-merge-step3-submit'       => 'Якка кардани ҳисобҳо',
	'centralauth-complete'                 => 'Эҷод кардани ҳисобҳо комил шуд!',
	'centralauth-incomplete'               => 'Эҷод кардани ҳисобҳо комил нашуд!',
	'centralauth-complete-text'            => 'Акнун шумо метавонед дар ҳар як аз викиҳои Викимедиа ворид шавид бидуни сохтани ҳисоби ҷадид; ҳисоби корбарии муштараки шумо дар Википедиа, Викилуғат, Викикитобҳо ва дигар лоиҳаҳои Викимедиа дар тамоми забонҳо кор хоҳад кард.',
	'centralauth-incomplete-text'          => 'Дар ҳоле, ки ҳисоби корбарии шумо якка шавад, шумо қодир хоҳед буд дар ҳар яки аз викиҳои Викимедиа бидуни эҷоди ҳисоби ҷадид вуруд кунед. Як ҳисоб ва калима убур дар Википедиа, Викилуғат, Викикитобҳо ва дигар лоиҳаҳои Википедиа дар тамоми забонҳо кор хоҳад кард.',
	'centralauth-not-owner-text'           => 'Ҳисоби корбарии "$1" ба таври худкор ба соҳиби ҳисоби корбарӣ дар $2 ихтисос дода шуд.

Агар шумо соҳиби ин ҳисоб ҳастед, шумо метавонед раванди якка кардан ҳисобҳои корбариро бо ворид кардани калимаи убури саросарӣ дар ин ҷо поён бирасонед:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Фақат тарзи намоишӣ</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Сомонаи якка кардани ҳисобҳои корбарӣ дар ҳоли ҳозир ба таври озмоишӣ ва барои рафъи эрод фаъол аст, бинобар ин якка кардани ҳисобҳои воқеӣ ҳануз фаъол нест. Бубахшед!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Иттилооти бештар дар бораи '''ҳисоби корбарии муштарак''']]...''",
	'centralauth-list-home-title'          => 'Викии аслӣ',
	'centralauth-list-home-dryrun'         => 'Калимаи убур ва нишонаи почтаи электронии интихоб шуда дар ин вики барои ҳисоби корбарии муштараки шумо мавриди истифода қарор хоҳад гирифт. Баъдан шумо метавонед онро дар викии аслии худ тағйир диҳед.',
	'centralauth-list-attached-title'      => 'Ҳисобҳои корбарии пайваста',
	'centralauth-list-attached'            => 'Ҳисоби корбарии "$1" дар ҳар як аз лоиҳаҳои зерин ба таври худкор ба ҳисоби корбарии муштарак пайваста  аст:',
	'centralauth-list-attached-dryrun'     => 'Ҳисоби корбарии "$1" дар ҳар як аз лоиҳаҳои зерин ба таври худкор ба ҳисоби корбарии муштарак шумо пайваста хоҳад шуд:',
	'centralauth-list-unattached-title'    => 'Ҳисобҳои ҷудо карда шуда',
	'centralauth-list-unattached'          => 'Ҳисоби корбарии "$1"ро дар сомонаҳои зерин наметавон ба таври худкор мутаалиқ ба шумо донист; бо эҳтимоли зиёд онҳо калимаи убури дигар аз ҳисоби корбарии аслии шумо доранд:',
	'centralauth-foreign-link'             => 'Ҳисоби корбари $1 дар $2',
	'centralauth-merge-method-primary'     => 'викии аслӣ',
	'centralauth-merge-method-empty'       => 'ҳеҷ ҳиссагузориҳо',
	'centralauth-merge-method-mail'        => 'тариқи почтаи электронӣ таъйид шуд',
	'centralauth-merge-method-password'    => 'бо гузарвожа таъйид шуд',
	'centralauth-merge-method-admin'       => 'мудир ҳисобро идғом кард',
	'centralauth-merge-method-new'         => 'ҳисоби корбарии ҷадид',
	'centralauth-merge-method-login'       => 'бо номи корбарӣ таъйид шуд',
	'centralauth-finish-title'             => 'Хотимаи идғом',
	'centralauth-finish-text'              => 'Агар шумо соҳиби ин ҳисобҳо ҳастед, метавонед раванди якка кардани ҳисобҳои корбариро бо ворид кардани калимаи убури саросарӣ дар инҷо ба поён бирасонед:',
	'centralauth-finish-password'          => 'Калимаи убур:',
	'centralauth-finish-login'             => 'Вуруд ба систем',
	'centralauth-finish-send-confirmation' => 'Калимаи убур ба почтаи электронӣ фиристода шавад',
	'centralauth-finish-problems'          => 'Дучори мушкили шудаед ё соҳиби ҳисобҳои корбарии дигаре, ки феҳрист шудаанд нестед? [[meta:Help:Unified login problems|Роҳнаморо бихонед]]...',
	'centralauth-finish-noconfirms'        => 'Ҳеҷ ҳисобе бо истифодаи ин гузарвожа наметавонад таъйид шавад.',
	'centralauth-finish-incomplete'        => 'Якчанд ҳисобҳо бо истифодаи ин гузарвожа идгом шудаанд.
Дигар ҳисобҳо то ҳол таъйид нашудаанд.',
	'centralauth-merge-attempt'            => "'''Мутобиқат додани калимаи убури ворид шуда бо ҳисобҳои идғом нашудаи боқимонда...'''",
	'centralauth-attach-list-attached'     => 'Ҳисоби корбарии муштарак "$1" шомили ҳисобҳои корбарии зерин мешавад:',
	'centralauth-attach-title'             => 'Тасдиқи ҳисоби корбарӣ',
	'centralauth-attach-text'              => 'Ин ҳисоби корбарӣ ҳанӯз ба ҳисоби корбарии муштарак интиқол дода нашудааст. Агар ҳисоби корбарии муштарак мутаалиқ ба шумо аст, ин ҳисобро ҳам метавонед бо ворид кардани калимаи убури он ба ҳисоби корбарии муштарак якка кунед:',
	'centralauth-attach-submit'            => 'Интиқоли ҳисоби корбарӣ',
	'centralauth-attach-success'           => 'Ҳисоби корбарӣ ба ҳисоби корбарии муштарак интиқол дода шуд.',
	'centralauth'                          => 'Мудирияти ҳисоби корбарии муштарак',
	'centralauth-admin-manage'             => 'Мудирияти иттилооти корбар',
	'centralauth-admin-username'           => 'Номи корбарӣ:',
	'centralauth-admin-lookup'             => 'Мушоҳида ё тағйири иттилооти корбарӣ',
	'centralauth-admin-permission'         => 'Танҳо википедҳо метавонанд ҳисоби корбарии дигар корбаронро якка кунанд.',
	'centralauth-admin-no-unified'         => 'Ҳеҷ ҳисоби яккашуда ба ин номи корбарӣ.',
	'centralauth-admin-info-id'            => 'Нишонаи Корбар:',
	'centralauth-admin-info-registered'    => 'Сабтшуда:',
	'centralauth-admin-info-locked'        => 'Қуфлшуда:',
	'centralauth-admin-info-hidden'        => 'Пинҳоншуда:',
	'centralauth-admin-yes'                => 'бале',
	'centralauth-admin-no'                 => 'на',
	'centralauth-admin-attached'           => 'Ҳисобҳои корбарии комилан идғомшуда',
	'centralauth-admin-unattached'         => 'Ҳисобҳои ҷудошуда',
	'centralauth-admin-no-unattached'      => 'Ҳеҷ ҳисобҳои идғомнашуда монданд.',
	'centralauth-admin-list-localwiki'     => 'Викии муқимӣ',
	'centralauth-admin-list-attached-on'   => 'Пайваста дар',
	'centralauth-admin-list-method'        => 'Услуб',
	'centralauth-admin-unmerge'            => 'Аз идғом озод кардани маводи интихобшуда',
	'centralauth-admin-merge'              => 'Интихоби идғом',
	'centralauth-admin-bad-input'          => 'Интихоби ғайри миҷози идғом',
	'centralauth-admin-none-selected'      => 'Ҳеҷ ҳисоби корбари барои тағйир интихоб нашудааст.',
	'centralauth-admin-already-unmerged'   => 'Ҷаҳиш аз $1, аллакай аз идғом гирифта шудааст',
	'centralauth-admin-unmerge-success'    => 'Бо муваффақият $1 {{PLURAL:$2|ҳисобро|ҳисобҳоро}} аз идғом озод кардам',
	'centralauth-admin-delete-title'       => 'Ҳазфи ҳисоб',
	'centralauth-admin-delete-description' => 'Ҳазфи ҳисоби муштарак ба ҳамаи тарҷиҳоти муштарак хоҳад расон, ҷудо кардани ҳисобҳои маҳаллӣ, ва озод кардани номи муштарак барои гирифтани дигар корбар. Ҳамаи ҳисобҳои маҳаллим вуҷуд хоҳанд дошт. Гузарвожаҳо барои ҳисобҳои маҳаллӣ пеш аз баргардонидан ба қиматҳои пеш худ пеш аз идғом эҷод шуданд.',
	'centralauth-admin-delete-button'      => 'Ҳазфи ин ҳисоб',
	'centralauth-admin-delete-success'     => 'Бомуваффақият ҳисоби муштарак барои "<nowiki>$1</nowiki>" ҳафз шуд',
	'centralauth-admin-nonexistent'        => 'Барои "<nowiki>$1</nowiki>" ҳеҷ ҳисоби муштарак нест',
	'centralauth-admin-delete-nonexistent' => 'Хато: ҳисоби муштараки "<nowiki>$1</nowiki>" вуҷуд надорад.',
	'centralauth-token-mismatch'           => 'Бубахшед, мо натавонистем ирсоли форми шуморо аз сабаби аз байн рафтани додаҳои нишаст ба анҷом расонем.',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|сония|сония}} пеш',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|дақиқа|дақиқа}} пеш',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|соат|соат}} пеш',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|рӯз|рӯз}} пеш',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|моҳ|моҳ}} пеш',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|сол|сол}} пеш',
	'centralauth-prefs-status'             => 'Вазъияти ҳисоби корбари муштарак:',
	'centralauth-prefs-not-managed'        => 'Ҳисоби корбарии муштарак мавриди истифода нест',
	'centralauth-prefs-unattached'         => 'Тасдиқнашуда',
	'centralauth-prefs-complete'           => 'Ҳама чиз мураттаб аст!',
	'centralauth-prefs-migration'          => 'Дар ҳоли интиқол',
	'centralauth-prefs-count-attached'     => 'Ҳисоби корбарии шумо дар $1 {{plural:$1|лоиҳа|лоиҳаҳо}} фаъол аст.',
	'centralauth-prefs-count-unattached'   => 'Ҳисобҳои корбарии таъйиднашуда бо номи шумо дар $1 {{plural:$1|лоиҳа|лоиҳаҳо}} боқӣ мемонад.',
	'centralauth-prefs-detail-unattached'  => 'Сомонаи ин лоиҳа мавриди таъйид барои истифода аз ҳисоби корбарии муштарак қарор нагирифтааст.',
	'centralauth-prefs-manage'             => 'Мудирияти ҳисоби корбарии муштарак',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Имкони тағйири номи ҳисоби корбари $1 ба таври маҳаллӣ вуҷуд надорад, зеро ин ҳисоб ба сомонаи якка кардани ҳисобҳои корбарӣ интиқол шудааст.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Наметавон корбар $2ро тағйир кард чун ин номи корбарӣ барои ҳисоби муштарак ҳифз шудааст.</div>',
	'centralauth-invalid-wiki'             => 'Чунин вики ПД нест: $1',
	'centralauth-account-exists'           => 'Наметавон ҳисоберо эчод кард: номи корбарии дархостшуда пеш аз ин дар системи вуруди муштарак гирифта шудааст.',
);

/** Thai (ไทย)
 * @author Passawuth
 */
$messages['th'] = array(
	'centralauth-merge-denied'       => 'ขออภัย คุณไม่สามารถเข้าหน้านี้ได้',
	'centralauth-merge-dryrun-or'    => "'''หรือ'''",
	'centralauth-foreign-link'       => 'ผู้ใช้ $1 บน $2',
	'centralauth-merge-method-empty' => 'ไม่มีประวัติการเขียน',
	'centralauth-merge-method-new'   => 'บัญชีใหม่',
	'centralauth-finish-password'    => 'รหัสผ่าน:',
	'centralauth-finish-login'       => 'ล็อกอิน',
	'centralauth-admin-username'     => 'ผู้ใช้:',
	'centralauth-admin-info-hidden'  => 'ซ่อน:',
	'centralauth-admin-yes'          => 'ใช่',
	'centralauth-admin-no'           => 'ไม่ใช่',
);

/** Turkish (Türkçe)
 * @author Karduelis
 * @author Srhat
 * @author Erkan Yilmaz
 */
$messages['tr'] = array(
	'centralauth-finish-password'          => 'Parola:',
	'centralauth-finish-login'             => 'Oturum açma',
	'centralauth-finish-send-confirmation' => 'E-posta parolası',
	'centralauth-attach-title'             => 'Hesabı doğrula',
	'centralauth-admin-username'           => 'Kullanıcı:',
	'centralauth-prefs-unattached'         => 'Doğrulanmamış',
);

/** Ukrainian (Українська)
 * @author Ahonc
 * @author Siebrand
 */
$messages['uk'] = array(
	'mergeaccount'                         => "Стан об'єднання облікових записів",
	'centralauth-desc'                     => "Об'єднання облікових записів на вікі-проектах Фонду «Вікімедіа»",
	'centralauth-mergeaccount-desc'        => "[[Special:MergeAccount|Об'єднує кілька облікових записів]] у Єдиний обліковий запис користувача",
	'centralauth-merge-denied'             => 'Вибачте, у вас недостатньо прав для доступу до цієї сторінки.',
	'centralauth-merge-notlogged'          => 'Будь ласка, <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} ввійдіть до системи]</span>, щоб перевірити, чи були ваші облікові записи об\'єднані.',
	'centralauth-merge-welcome'            => "'''Ваш обліковий запис ще не переведений на єдину систему авторизації проектів Вікімедіа'''

Якщо ви вирішите перенести свої облікові записи, ви зможете використовувати одні й ті самі ім'я користувача і пароль для входу до всіх мовних розділів усіх вікі-проектів фонду «Вікімедіа».
Це зробить простішою роботу з централізованими проектами, — наприклад, завантаження зображень [http://commons.wikimedia.org/ Вікісховище], — а також дозволить уникнути плутанини і проблем, які можуть виникнути, коли різні люди використовують у різних проектах однакові імена облікових записів.

Якщо хтось уже зайняв в одному з проектів ваше ім'я, дана процедура не зачепить ці облікові записи, і надалі ви зможете спробувати розв'язати цю проблему, обговоривши її з цими користувачами або з кимось із адміністраторів.",
	'centralauth-merge-step1-title'        => "Почати об'єднання облікових записів",
	'centralauth-merge-step1-detail'       => 'Буде проведене порівняння вашого пароля і адреси електронної пошти з даними облікових записів інших вікі-проектів. Зміни не будуть зроблені доти, поки ви не підтвердите правильність зіставлення.',
	'centralauth-merge-step1-submit'       => 'Підтвердити інформацію про обліковий запис',
	'centralauth-merge-step2-title'        => 'Підтвердити додаткові облікові записи',
	'centralauth-merge-step2-detail'       => "Деякі облікові записи не можуть бути автоматично прив'язані до позначеної вами «домашньої» вікі. Якщо ці облікові записи належать вам і ви маєте відповідні паролі — зазначте їх.",
	'centralauth-merge-step2-submit'       => 'Підтвердити інформацію про обліковий запис',
	'centralauth-merge-dryrun-complete'    => "Усі існуючі облікові записи можуть бути автоматично об'єднані!

Поки що ваші облікові записи не були змінені.",
	'centralauth-merge-dryrun-incomplete'  => "Можна продовжувати, хоча деякі облікові записи не можуть бути автоматично перевірені і не будуть зараз перетворені. Ви зможете об'єднати їх пізніше.

Ваші облікові записи ще не були змінені.",
	'centralauth-merge-dryrun-or'          => "'''або'''",
	'centralauth-merge-dryrun-home'        => 'Система міграції не може отримати підтвердження того, що ви є власником облікового запису у «домашній» вікі.

Однак, для цього облікового запису виявлено інший вікі-проект, який визначений як «домашній»; щоб завершити процедуру міграції, перейдіть по наведеному нижче посиланню і ввійдіть до системи.',
	'centralauth-merge-step3-title'        => 'Створення єдиного облікового запису',
	'centralauth-merge-step3-detail'       => 'Буде створено єдиний обліковий запис із приєднанням наступних вікі-проектів:',
	'centralauth-merge-step3-submit'       => "Об'єднати облікові записи",
	'centralauth-complete'                 => "Об'єднання облікових записів завершене!",
	'centralauth-incomplete'               => "Об'єднання облікових записів не завершене!",
	'centralauth-complete-text'            => "Тепер ви можете авторизуватися на будь-якому сайті Вікімедіа без створення нового облікового запису. Одні й ті самі ім'я користувача і пароль будуть працювати у Вікіпедії, Вісловнику, Вікіпідручнику та інших проектах на всіх мовах.",
	'centralauth-incomplete-text'          => "Як тільки ваші облікові записи будуть об'єднані в рамках єдиного облікового запису, ви зможете авторизуватися в будь-яких проектах Вікімедіа, не створюючи нових облікових записів. Одні й ті самі ім'я користувача і пароль будуть працювати у Вікіпедії, Вікісловнику, Вікіпідручнику та інших проектах на всіх мовах.",
	'centralauth-not-owner-text'           => "Ім'я «$1» було автоматично передане власнику облікового запису «$2».

Якщо це ви, то ви можете завершити процес об'єднання облікових записів, увівши тут основний пароль для цього облікового запису:",
	'centralauth-notice-dryrun'            => "<div class='successbox'>Демонстраційний режим</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => "Об'єднання облікових записів зараз працює в демонстраційному режимі. Реальні операції об'єднання відключені. Вибачте.",
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Інформація про '''об'єднання облікових записів''']]...''",
	'centralauth-list-home-title'          => 'Домашня вікі',
	'centralauth-list-home-dryrun'         => 'Значення пароля і адреси електронної пошти в цій вікі будуть використані для вашого єдиного облікового запису. У подальшому ви зможете змінити вашу домашню вікі.',
	'centralauth-list-attached-title'      => 'Приєднані облікові записи',
	'centralauth-list-attached'            => "Обліковий запис «$1» на наступних сайтах був автоматично об'єднаний:",
	'centralauth-list-attached-dryrun'     => "Облікове ім'я «$1» на кожному з перерахованих нижче сайтів буде автоматично приєднане до єдиного облікового запису.",
	'centralauth-list-unattached-title'    => 'Неприєднані облікові записи',
	'centralauth-list-unattached'          => 'Неможливо автоматично підтвердити, що обліковий запис «$1» належить вам на зазначених нижче сайтах; імовірно, пароль на них не співпадає з паролем вашого основного облікового запису:',
	'centralauth-foreign-link'             => 'Користувач $1 на $2',
	'centralauth-merge-method-primary'     => 'домашня вікі',
	'centralauth-merge-method-empty'       => 'нема внеску',
	'centralauth-merge-method-mail'        => 'підтверджений електронною поштою',
	'centralauth-merge-method-password'    => 'підтверджені паролем',
	'centralauth-merge-method-admin'       => "адмін. об'єднаний обліковий запис",
	'centralauth-merge-method-new'         => 'новий обліковий запис',
	'centralauth-merge-method-login'       => 'підтверджений логіном',
	'centralauth-finish-title'             => "Закінчення об'єднання",
	'centralauth-finish-text'              => "Якщо ці облікові записи належать вам, то ви можете завершити процес об'єднання, ввівши тут паролі для інших облікових записів:",
	'centralauth-finish-password'          => 'Пароль:',
	'centralauth-finish-login'             => "Ім'я користувача",
	'centralauth-finish-send-confirmation' => 'Надіслати пароль електронною поштою',
	'centralauth-finish-problems'          => 'Якщо виникли проблеми, і ви не є власником зазначених облікових записів [[meta:Help:Unified login problems|зверніться за довідкою]]...',
	'centralauth-finish-noconfirms'        => 'Нема облікових записів, які могли б бути підтверджені цим паролем.',
	'centralauth-finish-incomplete'        => "Кілька облікових записів були об'єднані з використанням цього пароля.
Інші облікові записи ще не підтверджені.",
	'centralauth-merge-attempt'            => "'''Перевірка введеного пароля для решти необ'єднаних облікових записів...'''",
	'centralauth-attach-list-attached'     => 'Єдиний обліковий запис «$1» включає наступні облікові записи:',
	'centralauth-attach-title'             => 'Підтвердження облікового запису',
	'centralauth-attach-text'              => 'Цей обліковий запис ще не переміщений до системи єдиного облікового запису. Якщо глобальний обліковий запис також належить вам, ви можете приєднати цей акаунт, зазначивши пароль глобального облікового запису:',
	'centralauth-attach-submit'            => 'Перенести обліковий запис',
	'centralauth-attach-success'           => 'Обліковий запис був перенесений до системи єдиного облікового запису.',
	'centralauth'                          => "Адміністрування об'єднання імен",
	'centralauth-admin-manage'             => 'Управління інформацією про користувачів',
	'centralauth-admin-username'           => "Ім'я користувача:",
	'centralauth-admin-lookup'             => 'Перегляд або редагування інформації про користувача',
	'centralauth-admin-permission'         => "Тільки стюарди можуть об'єднувати облікові записи інших людей.",
	'centralauth-admin-no-unified'         => "Нема об'єднаного облікового запису для цього імені користувача.",
	'centralauth-admin-info-id'            => 'Ідентифікатор користувача:',
	'centralauth-admin-info-registered'    => 'Зареєстрований:',
	'centralauth-admin-info-locked'        => 'Заблокований:',
	'centralauth-admin-info-hidden'        => 'Прихований:',
	'centralauth-admin-yes'                => 'так',
	'centralauth-admin-no'                 => 'ні',
	'centralauth-admin-attached'           => "Повністю об'єднані облікові записи",
	'centralauth-admin-unattached'         => 'Неприєднані облікові записи',
	'centralauth-admin-no-unattached'      => "Не залишилось необ'єднаних облікових записів.",
	'centralauth-admin-list-localwiki'     => 'Локальна вікі',
	'centralauth-admin-list-attached-on'   => 'Приєднаний',
	'centralauth-admin-list-method'        => 'Спосіб',
	'centralauth-admin-unmerge'            => 'Розділити обрані',
	'centralauth-admin-merge'              => "Об'єднати обрані",
	'centralauth-admin-bad-input'          => "Помилковий вибір об'єднання",
	'centralauth-admin-none-selected'      => 'Не були вибрані акаунти для зміни.',
	'centralauth-admin-already-unmerged'   => 'Пропуск $1, уже розділений',
	'centralauth-admin-unmerge-success'    => 'Успішно {{PLURAL:$2|розділений один обліковий запис|розділені $1 облікових записи|розділені $1 облікових записів}}',
	'centralauth-admin-delete-title'       => 'Вилучення облікового запису',
	'centralauth-admin-delete-description' => "Вилучення глобального облікового запису призведе до вилучення глобальних налаштувань, від'єднання всіх облікових записів і звільнення глобального імені, що дозволить зайняти його іншому користувачеві.
Усі локальні облікові записи продовжать існування.
Паролі локальних облікових записів, створені до об'єднання, повернуть свої старі значення.",
	'centralauth-admin-delete-button'      => 'Вилучити обліковий запис',
	'centralauth-admin-delete-success'     => 'Успішно вилучений глобальний обілковий запис «<nowiki>$1</nowiki>»',
	'centralauth-admin-nonexistent'        => 'Нема глобального облікового запису «<nowiki>$1</nowiki>»',
	'centralauth-admin-delete-nonexistent' => 'Помилка: глобальний обліковий запис «<nowiki>$1</nowiki>» не існує.',
	'centralauth-token-mismatch'           => 'На жаль, ми не можемо продовжити обробку вашої форму, так як були втрачені дані сеансу.',
	'centralauth-admin-lock-title'         => 'Блокування облікового запису',
	'centralauth-admin-lock-description'   => 'Якщо обліковий запис заблокований, то в жодній вікі під ним не можна ввійти до системи.',
	'centralauth-admin-lock-button'        => 'Заблокувати цей обліковий запис',
	'centralauth-admin-lock-success'       => 'Глобальний обліковий запис «<nowiki>$1</nowiki>» успішно заблокований',
	'centralauth-admin-lock-nonexistent'   => 'Помилка. Глобальний обліковий запис «<nowiki>$1</nowiki>» не існує.',
	'centralauth-admin-unlock-title'       => 'Розблокувати обліковий запис',
	'centralauth-admin-unlock-description' => 'Розблокування облікового запису робить можливим вхід до системи під ним.',
	'centralauth-admin-unlock-button'      => 'Розблокувати цей обліковий запис',
	'centralauth-admin-unlock-success'     => 'Глобальний обліковий запис «<nowiki>$1</nowiki>» успішно розблокований',
	'centralauth-admin-unlock-nonexistent' => 'Помилка. Глобальний обліковий запис «<nowiki>$1</nowiki>» не існує.',
	'centralauth-admin-reason'             => 'Причина:',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|секунду|секунди|секунд}} тому',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|хвилину|хвилини|хвилин}} тому',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|годину|години|годин}} тому',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|день|дні|днів}} тому',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|місяць|місяці|місяців}} тому',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|рік|роки|років}} тому',
	'centralauth-prefs-status'             => 'Стан глобального облікового запису:',
	'centralauth-prefs-not-managed'        => 'Не використовується єдиний обліковий запис',
	'centralauth-prefs-unattached'         => 'Непідтверджена',
	'centralauth-prefs-complete'           => 'Усе в порядку!',
	'centralauth-prefs-migration'          => 'Переноситься',
	'centralauth-prefs-count-attached'     => 'Ваш обліковий запис активний у $1 {{plural:$1|проекті|проектах|проектах}}.',
	'centralauth-prefs-count-unattached'   => 'Непідтверджені облікові записи з вашим іменем залишають в $1 {{plural:$1|проекті|проектах|проектах}}.',
	'centralauth-prefs-detail-unattached'  => 'Цей проект не був підтверджений як такий, що належить до вашого глобального облікового запису.',
	'centralauth-prefs-manage'             => 'Керування глобальним обліковим записом',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Неможливо перейменувати користувача $1 у даному проекті, так як це ім\'я користувача було перенесене до системи єдиного облікового запису.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Неможливо перейменувати користувача $2, так як це ім\'я зарезервовано для глобального облікового запису.</div>',
	'centralauth-invalid-wiki'             => 'Нема такої вікі БД: $1',
	'centralauth-account-exists'           => "Неможливо створити обліковий запис. Таке ім'я вже зайняте для єдиного облікового запису.",
	'centralauth-log-name'                 => 'Журнал керування глобальними обліковими записами',
	'centralauth-log-header'               => 'Цей журнал містить записи про дії над глобальними обліковими записами: вилучення, блокування, розблокування.',
	'centralauth-log-entry-delete'         => 'вилучив глобальний обліковий запис «<nowiki>$1</nowiki>»',
	'centralauth-log-entry-lock'           => 'заблокував глобальний обліковий запис «<nowiki>$1</nowiki>»',
	'centralauth-log-entry-unlock'         => 'розблокував глобальний обліковий запис «<nowiki>$1</nowiki>»',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'mergeaccount'                         => 'Processo de unificazion de le utenze - status',
	'centralauth-desc'                     => '[[Special:MergeAccount|Unifica i account]] sui siti gestìi da Wikimedia Foundation',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Unifica più account]] par el Login Unico',
	'centralauth-merge-denied'             => 'No te ghè i parmessi necessari par entrar su sta pagina.',
	'centralauth-merge-notlogged'          => 'Par piaser, de <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} fà el login]</span> par verificar se el processo de unificazion de le to utenze el xe conpleto.',
	'centralauth-merge-welcome'            => "'''El to account utente no'l xe gnancora stà inportà nel sistema de identificazion unificà de Wikimedia (Wikimedia's unified login system).''' Se te decidi de unificar i to account, te podarè doparar el stesso nome utente e la stessa password par entrar in tuti quanti i progeti wiki de Wikimedia in tute le lengue disponibili. Questo el rendarà pi façile el laoro coi progeti comuni, par esenpio cargar file su [http://commons.wikimedia.org/ Wikimedia Commons], e se evitarà la confusion e i confliti che vegnarìa fora se du o più utenti i siegliesse el stesso nome utente su più progeti. Se qualchedun altro el s'à zà tolto el to nome utente su un altro sito, questo no'l lo disturbarà, ma l'unificazion la te darà a ti la possibilità de sotoporghe in futuro el problema a l'altro utente o a un aministrador.",
	'centralauth-merge-step1-title'        => "Intaca l'unificazion dei login",
	'centralauth-merge-step1-detail'       => "La to password e l'indirizo e-mail registrà i sarà desso controlà sui account in altre wiki par confermar che i corisponda. No sarà fata nissuna modifica prima de la to conferma che tuto quanto xe in regola.",
	'centralauth-merge-step1-submit'       => 'Conferma le informazion par el login',
	'centralauth-merge-step2-title'        => 'Conferma altri account',
	'centralauth-merge-step2-detail'       => "No s'à mìa podesto colegar automaticamente alcuni account a quel su la to wiki prinçipal. Se te sì ti el paron de sti account, dimostra che i xe tui indicando le password par ognuno de lori.",
	'centralauth-merge-step2-submit'       => 'Conferma le informazion de login',
	'centralauth-merge-dryrun-complete'    => 'Se pol unificar automaticamente tuti i account esistenti.

Par el momento no xe stà fata alcuna modifica ai account.',
	'centralauth-merge-dryrun-incomplete'  => "Se gà sielto de 'ndar vanti anca se s'à mìa podesto verificar automaticamente çerti account. Per sti account no vegnarà mìa fata la migrazion par el momento; el processo de unificazion el se podarà conpletar in un secondo tenpo.

Al momento no xe stà gnancora fata nissuna modifica ai account.",
	'centralauth-merge-dryrun-or'          => "'''opure'''",
	'centralauth-merge-dryrun-home'        => "El sistema de trasferimento no l'è stà bon de verificar che sto utente el sia el proprietario de l'account col stesso nome su la wiki prinçipal.

Xe stà rilevato che a sto nome utente corisponde un account prinçipal su n'altra wiki. Segui el colegamento indicà de seguito e esegui l'accesso su quel sito par conpletar el trasferimento dei to account.",
	'centralauth-merge-step3-title'        => "Crea l'account unificado",
	'centralauth-merge-step3-detail'       => 'Xe tuto pronto par crear el to account unificà su le seguenti wiki:',
	'centralauth-merge-step3-submit'       => 'Unifica i account',
	'centralauth-complete'                 => 'El processo de unificazion de le utenze el xe stà conpletà.',
	'centralauth-incomplete'               => "El processo de unificazion de le utenze no'l xe gnancora stà conpletà.",
	'centralauth-complete-text'            => 'Desso te pol entrar su tuti quanti i siti Wikimedia senza che te toca crear account novi; sto nome utente e sta password i xe ativi su tute le edizion d Wikipedia, Wiktionary, Wikibooks, ecc. nele varie lengue e su tuti i progeti ligà a questi.',
	'centralauth-incomplete-text'          => "Dopo 'ver unificato le to utenze, te podarè entrar su tuti i siti Wikimedia senza che te toca crear account novi; el nome utente e la password i funsionarà su tute quante le edizioni de Wikipedia, Wiktionary, Wikibooks, ecc. ne le varie lengue e su tuti i progeti ligà a questi.",
	'centralauth-not-owner-text'           => 'El nome utente "$1" el xe sta assegnà automaticamente al paron de l\'account col stesso nome sul progeto $2.

Se te sì ti el paron de l\'utenza, par finir el processo de unificazion basta che te inserissi la password prinçipal de quel\'account qua de seguito:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Solo modalità Demo</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => "L'unificazion dei account par el momento la se pol sperimentar solo in modalità ''demo'' o ''debugging'', quindi le operazion de efetiva fusion dei dati le xe disabilità. Semo spiacenti!",
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Par savérghene piassè sul '''login unico''']]...''",
	'centralauth-list-home-title'          => 'Wiki prinçipale',
	'centralauth-list-home-dryrun'         => "La password e l'indirizo e-mail registrà in sto wiki i sarà doparà par l'account unificà.
Te podarè in seguito canbiar el tuo wiki prinçipal.",
	'centralauth-list-attached-title'      => 'Account colegadi',
	'centralauth-list-attached'            => 'I account con nome utente "$1" sui progeti elencà de seguito i xe stà unificà automaticamente:',
	'centralauth-list-attached-dryrun'     => 'I account ciamà "$1" sui siti indicà de seguito i sarà colegà automaticamente a l\'account unificà:',
	'centralauth-list-unattached-title'    => 'Account mìa colegadi',
	'centralauth-list-unattached'          => 'No s\'à mìa podesto verificar automaticamente che i account con nome utente "$1" sui progeti elencà de seguito i gàvia el stesso paron; xe probabile che sia stà doparà na password difarente da quela de l\'account prinçipal:',
	'centralauth-foreign-link'             => 'Utente $1 su $2',
	'centralauth-merge-method-primary'     => 'wiki prinçipale',
	'centralauth-merge-method-empty'       => 'nissun contributo',
	'centralauth-merge-method-mail'        => 'confermà par e-mail',
	'centralauth-merge-method-password'    => 'confermà mediante password',
	'centralauth-merge-method-admin'       => 'account unificà da un aministrador',
	'centralauth-merge-method-new'         => 'account novo',
	'centralauth-merge-method-login'       => 'confermà mediante accesso',
	'centralauth-finish-title'             => 'Conpleta el processo de unificazion',
	'centralauth-finish-text'              => 'Se te sì ti el paron de ste utenze, par conpletar el processo de unificazion dei account basta che te inserissi le password relative a le utenze stesse qua de seguito:',
	'centralauth-finish-password'          => 'Password:',
	'centralauth-finish-login'             => 'Esegui el login',
	'centralauth-finish-send-confirmation' => 'Invia password par e-mail',
	'centralauth-finish-problems'          => 'Se no te sì mìa ti el paron de ste utenze, o se te cati qualche altro problema, te invitemo a consultar la [[meta:Help:Unified login problems|pagina de ajuto]]...',
	'centralauth-finish-noconfirms'        => 'Inpossibile confermar dei account mediante sta password qua.',
	'centralauth-finish-incomplete'        => 'Xe stà unificà alcuni account mediante sta password. Ghe xe altri account in atesa de conferma.',
	'centralauth-merge-attempt'            => "'''Verifica de la password inserìa su le utenze gnancora unificàe...'''",
	'centralauth-attach-list-attached'     => "L'account unificà ciamà \"'''\$1'''\" l'include i seguenti account:",
	'centralauth-attach-title'             => "Conferma l'account",
	'centralauth-attach-text'              => "Sto account qua no'l xe gnancora stà colegà a l'account unificà. Se te sì ti el paron de l'account globale, te pol colegar sto account inserendo la password de l'account globale:",
	'centralauth-attach-submit'            => "Colèga l'account",
	'centralauth-attach-success'           => "L'account el xe stà trasferìo a l'account unificà.",
	'centralauth'                          => 'Aministrazion del login unificà',
	'centralauth-admin-manage'             => 'Gestion dati utente',
	'centralauth-admin-username'           => 'Nome utente',
	'centralauth-admin-lookup'             => 'Varda o modifica i dati utente',
	'centralauth-admin-permission'         => 'Solo i steward i pol unificar i account par conto de altri.',
	'centralauth-admin-no-unified'         => 'No ghe xe account unificà par sto nome utente.',
	'centralauth-admin-info-id'            => 'ID utente:',
	'centralauth-admin-info-registered'    => 'Registrado:',
	'centralauth-admin-info-locked'        => 'Blocà:',
	'centralauth-admin-info-hidden'        => 'Sconto:',
	'centralauth-admin-yes'                => 'sì',
	'centralauth-admin-no'                 => 'no',
	'centralauth-admin-attached'           => 'Account conpletamente unificadi',
	'centralauth-admin-unattached'         => 'Account mìa colegadi',
	'centralauth-admin-no-unattached'      => 'No ghe xe altri account privi de colegamento.',
	'centralauth-admin-list-localwiki'     => 'Wiki local',
	'centralauth-admin-list-attached-on'   => 'Colegado el',
	'centralauth-admin-list-method'        => 'Metodo',
	'centralauth-admin-unmerge'            => 'Scolèga i account selezionà',
	'centralauth-admin-merge'              => 'Colèga i account selezionà',
	'centralauth-admin-bad-input'          => "Selezion par l'unificazion NO valida",
	'centralauth-admin-none-selected'      => 'No xe stà selezionè account da modificar',
	'centralauth-admin-already-unmerged'   => 'Salto via $1, zà destacà',
	'centralauth-admin-unmerge-success'    => 'Destacà con sucesso $1 {{PLURAL:$2|account|account}}',
	'centralauth-admin-delete-title'       => 'Scancela account',
	'centralauth-admin-delete-description' => "Scancelando l'account globale sarà scancelà tute le preferense globali, destacà tuti i account locali, e lassà lìbaro el nome globale par altri utenti.
Tuti quanti i account locali i continuarà a esìstar.
Le password par i account locali creà prima de l'unificazion le tornarà indrio a i so valori precedenti l'unificazion.",
	'centralauth-admin-delete-button'      => 'Scancela sto account',
	'centralauth-admin-delete-success'     => 'Xe stà scancelà con sucesso l\'account globale par "<nowiki>$1</nowiki>"',
	'centralauth-admin-nonexistent'        => 'No ghe xe nissun account globale par "<nowiki>$1</nowiki>"',
	'centralauth-admin-delete-nonexistent' => 'Eror: l\'account globale "<nowiki>$1</nowiki>" no l\'esiste mìa.',
	'centralauth-token-mismatch'           => "Ne dispiase, ma no gavemo mìa podesto elaborar el modulo che te ghè invià parché xe 'ndà persi i dati de la session.",
	'centralauth-admin-lock-title'         => 'Bloca account',
	'centralauth-admin-lock-description'   => "Blocando l'account no se podarà entrar co sto account in nissuna wiki.",
	'centralauth-admin-lock-button'        => 'Bloca sto account',
	'centralauth-admin-lock-success'       => 'L\'account globale par "<nowiki>$1</nowiki>" el xe stà blocà con sucesso.',
	'centralauth-admin-lock-nonexistent'   => 'Eror: l\'account globale "<nowiki>$1</nowiki>" no l\'esiste mìa.',
	'centralauth-admin-unlock-title'       => "Desbloca l'account",
	'centralauth-admin-unlock-description' => "Desblocando l'account se podarà de novo far l'acesso con quelo.",
	'centralauth-admin-unlock-button'      => 'Desbloca sto account',
	'centralauth-admin-unlock-success'     => 'L\'account globale par "<nowiki>$1</nowiki>" el xe stà desblocà con sucesso.',
	'centralauth-admin-unlock-nonexistent' => 'Eror: l\'account globale "<nowiki>$1</nowiki>" no l\'esiste mìa.',
	'centralauth-admin-reason'             => 'Motivo:',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|secondo|secondi}} fa',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|minuto|minuti}} fa',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|ora|ore}} fa',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|giòrno|giòrni}} fa',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|mese|mese}} fa',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|ano|ani}} fa',
	'centralauth-prefs-status'             => "Situazion de l'account globale:",
	'centralauth-prefs-not-managed'        => 'Account unificà non in uso',
	'centralauth-prefs-unattached'         => 'Mìa confermà',
	'centralauth-prefs-complete'           => 'Tuto a posto!',
	'centralauth-prefs-migration'          => 'In corso de trasferimento',
	'centralauth-prefs-count-attached'     => 'El to account el xe ativo su $1 {{plural:$1|sito|siti}} de progeto.',
	'centralauth-prefs-count-unattached'   => 'Ghe xe account non confermà col to nome utente su $1 {{plural:$1|progeto|progeti}}.',
	'centralauth-prefs-detail-unattached'  => "Sto sito qua no l'è stà confermà come fasente parte de l'account globale.",
	'centralauth-prefs-manage'             => 'Gestion del to account globale',
	'centralauth-renameuser-abort'         => '<div class="errorbox">No se pol rinominar localmente l\'utente $1 parché sta utenza la xe stà trasferìa al sistema de identificazion unificà (unified login system).</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">No se pol rinominar l\'utente $2 parché sto nome utente el xe riservà par un account globale.</div>',
	'centralauth-invalid-wiki'             => 'No ghe xe un database wiki co sto nome: $1',
	'centralauth-account-exists'           => "No se pol crear l'account: el nome utente richiesto se l'à zà tolto qualchedun altro nel sistema de login unificà.",
	'centralauth-log-name'                 => "Registro de gestion de l'account globale",
	'centralauth-log-header'               => 'Sto registro el contien le operazion fate su i account globali: scancelazioni, blochi e desblocamenti.',
	'centralauth-log-entry-delete'         => 'scancelà account globale "<nowiki>$1</nowiki>"',
	'centralauth-log-entry-lock'           => 'blocà account globale "<nowiki>$1</nowiki>"',
	'centralauth-log-entry-unlock'         => 'desblocà account globale "<nowiki>$1</nowiki>"',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 * @author Siebrand
 */
$messages['vi'] = array(
	'mergeaccount'                         => 'Tình trạng hợp nhất tài khoản',
	'centralauth-desc'                     => '[[Special:MergeAccount|Hợp nhất]] tài khoản tại các wiki trực thuộc Quỹ Wikimedia',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|Hợp nhất các tài khoản]] để cho các thành viên chỉ cần đăng nhập một lần',
	'centralauth-merge-denied'             => 'Rất tiếc, bạn không có quyền truy cập vào trang này.',
	'centralauth-merge-notlogged'          => 'Xin hãy <span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special:MergeAccount}} đăng nhập]</span> để kiểm tra các tài khoản của bạn được hợp nhất hay không.',
	'centralauth-merge-welcome'            => "'''Tài khoản của bạn chưa được đổi qua hệ thống tài khoản hợp nhất của Wikimedia.'''

Sau khi chọn hợp nhất các tài khoản, bạn có thể đăng nhập vào các phiên bản ngôn ngữ của các dự án Wikimedia dùng cùng một tài khoản. Làm vầy thì dễ đóng góp vào các dự án dùng chung, thí dụ tải lên [http://commons.wikimedia.org/ Wikimedia Commons], và tránh sự nhầm lẫn hay mâu thuẫn trong trường hợp hai người chọn cùng tên hiệu ở hai dự án khác nhau.

Nếu ai đã lấy tên hiệu của bạn tại website khác, việc hợp nhất các tài khoản không sẽ thay đổi tài khoản họ có hiện nay, nhưng sẽ dẫn đến cơ hội để giải quyết sự mâu thuẫn với họ hay một quản lý viên về sau.",
	'centralauth-merge-step1-title'        => 'Bắt đầu hợp nhất tài khoản',
	'centralauth-merge-step1-detail'       => 'Mật khẩu và địa chỉ thư mà bạn đã đăng ký sẽ được kiểm tra với các tài khoản trên các wiki khác để xác nhận rằng nó khớp với nhau.
Sẽ không có thay đổi nào diễn ra cho đến khi bạn xác nhận mọi thứ đều ổn.',
	'centralauth-merge-step1-submit'       => 'Xác nhận thông tin tài khoản',
	'centralauth-merge-step2-title'        => 'Xác nhận thêm tài khoản',
	'centralauth-merge-step2-detail'       => 'Một số tài khoản không thể so trùng tự động với wiki chủ đã chỉ định.
Nếu những tài khoản này thuộc về bạn, bạn có thể xác nhận rằng chúng thực sự là của bạn bằng cách cung cấp mật khẩu của chúng.',
	'centralauth-merge-step2-submit'       => 'Xác nhận thông tin tài khoản',
	'centralauth-merge-dryrun-complete'    => 'Tất cả các tài khoản đang tồn tại sẽ được tự động hợp nhất!

Hiện các tài khoản của bạn chưa bị thay đổi.',
	'centralauth-merge-dryrun-incomplete'  => 'Bạn đã quyết định tiếp tục, nhưng một số tài khoản không thể được xác nhận tự động và sẽ không được tích hợp vào ngay lập tức. Bạn có thể nhập nó vào sau.

Hiện các tài khoản của bạn chưa bị thay đổi.',
	'centralauth-merge-dryrun-or'          => "'''hoặc'''",
	'centralauth-merge-dryrun-home'        => 'Hệ thống tích hợp không thể xác nhận rằng bạn có phải là người sở hữu tài khoản wiki chính đối với tên người dùng của bạn.

Một wiki khác đã được chọn làm tài khoản chính đối với tên người dùng của bạn; hãy đi đến liên kết ở dưới và đăng nhập vào đấy để hoàn thành việc tích hợp tài khoản.',
	'centralauth-merge-step3-title'        => 'Mở tài khoản hợp nhất',
	'centralauth-merge-step3-detail'       => 'Bạn sẵn sàng mở tài khoản hợp nhất, bao gồm các wiki sau:',
	'centralauth-merge-step3-submit'       => 'Hợp nhất các tài khoản',
	'centralauth-complete'                 => 'Đã hợp nhất xong các tài khoản!',
	'centralauth-incomplete'               => 'Chưa hợp nhất tài khoản xong!',
	'centralauth-complete-text'            => 'Bây giờ bạn có thể đăng nhập vào các website trực thuộc Wikimedia, không cần mở tài khoản riêng; các phiên bản ngôn ngữ của Wikipedia, Wiktionary, Wikibooks, và các dự án liên quan đều nhận tên hiệu và mật khẩu của bạn.',
	'centralauth-incomplete-text'          => 'Sau khi hợp nhất các tài khoản, có thể đăng nhập vào các website trực thuộc Wikimedia, không cần mở tài khoản riêng; các phiên bản ngôn ngữ của Wikipedia, Wiktionary, Wikibooks, và các dự án liên quan đều nhận tên hiệu và mật khẩu của bạn.',
	'centralauth-not-owner-text'           => 'Tên người dùng “$1” đã được gán tự động cho chủ tài khoản ở $2.

Nếu đây là bạn, bạn có thể kết thúc quá trình hợp nhất tài khoản bằng cách gõ vào mật khẩu chủ cho tài khoản đó vào đây:',
	'centralauth-notice-dryrun'            => "<div class='successbox'>Mới chỉ đang thử</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => 'Rất tiếc, mới chỉ đang thử chức năng hợp nhất tài khoản, nên thực sự chưa có thể hợp nhất.',
	'centralauth-readmore-text'            => ":''Đọc thêm về '''[[m:Help:Unified login|tài khoản hợp nhất]]'''…''",
	'centralauth-list-home-title'          => 'Wiki chính',
	'centralauth-list-home-dryrun'         => 'Mật khẩu và địa chỉ thư điện tử ở wiki này sẽ được dùng cho tài khoản thống nhất của bạn.
Bạn có thể thay đổi wiki chủ của bạn sau.',
	'centralauth-list-attached-title'      => 'Các tài khoản được gắn',
	'centralauth-list-attached'            => 'Tài khoản “$1” ở các website sau được tự động gắn vào tài khoản hợp nhất:',
	'centralauth-list-attached-dryrun'     => 'Tài khoản “$1” ở các website sau sẽ được tự động gắn vào tài khoản hợp nhất:',
	'centralauth-list-unattached-title'    => 'Các tài khoản không ràng buộc',
	'centralauth-list-unattached'          => 'Tài khoản “$1” không thể tự động xác nhận thuộc quyền sở hữu của bạn trên các trang sau; rất có thể chúng có mật khẩu khác với tài khoản chính của bạn:',
	'centralauth-foreign-link'             => 'Thành viên $1 tại $2',
	'centralauth-merge-method-primary'     => 'wiki chính',
	'centralauth-merge-method-empty'       => 'không có đóng góp',
	'centralauth-merge-method-mail'        => 'xác nhận nhờ e-mail',
	'centralauth-merge-method-password'    => 'xác nhận nhờ mật khẩu',
	'centralauth-merge-method-admin'       => 'tài khoản tích hợp quản lý',
	'centralauth-merge-method-new'         => 'tài khoản mới',
	'centralauth-merge-method-login'       => 'xác nhận nhờ đăng nhập',
	'centralauth-finish-title'             => 'Hợp nhất xong',
	'centralauth-finish-text'              => 'Nếu các tài khoản này của bạn, chỉ việc đưa vào mật khẩu của các tài khoản ở dưới để hợp nhất tài khoản:',
	'centralauth-finish-password'          => 'Mật khẩu:',
	'centralauth-finish-login'             => 'Đăng nhập',
	'centralauth-finish-send-confirmation' => 'Gửi mật khẩu bằng thư điện tử',
	'centralauth-finish-problems'          => "Trục trặc khi đăng nhập, hay những tài khoản kia không của bạn? '''[[meta:Help:Unified login problems|Trợ giúp…]]'''",
	'centralauth-finish-noconfirms'        => 'Không thể xác nhận tài khoản nào khi dùng mật khẩu này.',
	'centralauth-finish-incomplete'        => 'Một số tài khoản được tích hợp nhờ mật khẩu này.
Các tài khoản khác chưa được xác nhận.',
	'centralauth-merge-attempt'            => "'''Đang so sánh những mật khẩu mà bạn đưa vào với các tài khoản chưa được hợp nhất…'''",
	'centralauth-attach-list-attached'     => 'Tài khoản hợp nhất dưới tên “$1” bao gồm các tài khoản sau:',
	'centralauth-attach-title'             => 'Xác nhận tài khoản',
	'centralauth-attach-text'              => 'Tài khoản này chưa được nhập vào tài khoản thống nhất. Nếu tài khoản toàn cục cũng là của bạn, bạn có thể nhập tài khoản này nếu bạn gõ vào mật khẩu của tài khoản toàn cục:',
	'centralauth-attach-submit'            => 'Chuyển tài khoản',
	'centralauth-attach-success'           => 'Tài khoản này được chuyển qua tài khoản hợp nhất.',
	'centralauth'                          => 'Quản lý các tài khoản hợp nhất',
	'centralauth-admin-manage'             => 'Quản lý dữ liệu người dùng',
	'centralauth-admin-username'           => 'Tên hiệu:',
	'centralauth-admin-lookup'             => 'Xem hay sửa đổi dữ liệu thành viên',
	'centralauth-admin-permission'         => 'Chỉ các tiếp viên có quyền hợp nhất tài khoản của người khác.',
	'centralauth-admin-no-unified'         => 'Không có tài khoản hợp nhất cho tên người dùng này.',
	'centralauth-admin-info-id'            => 'ID thành viên:',
	'centralauth-admin-info-registered'    => 'Đã đăng ký:',
	'centralauth-admin-info-locked'        => 'Bị cấm:',
	'centralauth-admin-info-hidden'        => 'Bị ẩn:',
	'centralauth-admin-yes'                => 'có',
	'centralauth-admin-no'                 => 'không có',
	'centralauth-admin-attached'           => 'Các tài khoản đã được tích hợp hoàn toàn',
	'centralauth-admin-unattached'         => 'Các tài khoản không ràng buộc',
	'centralauth-admin-no-unattached'      => 'Không còn tài khoản nào chưa được tích hợp.',
	'centralauth-admin-list-localwiki'     => 'Wiki bộ phận',
	'centralauth-admin-list-attached-on'   => 'Ràng buộc với',
	'centralauth-admin-list-method'        => 'Phương thức',
	'centralauth-admin-unmerge'            => 'Đã chọn tách',
	'centralauth-admin-merge'              => 'Hợp nhất lựa chọn',
	'centralauth-admin-bad-input'          => 'Lựa chọn không hợp lệ',
	'centralauth-admin-none-selected'      => 'Chưa chọn tài khoản để sửa đổi.',
	'centralauth-seconds-ago'              => '$1 {{PLURAL:$1|giây|giây}} trước đây',
	'centralauth-minutes-ago'              => '$1 {{PLURAL:$1|phút|phút}} trước đây',
	'centralauth-hours-ago'                => '$1 {{PLURAL:$1|giờ|giờ}} trước đây',
	'centralauth-days-ago'                 => '$1 {{PLURAL:$1|ngày|ngày}} trước đây',
	'centralauth-months-ago'               => '$1 {{PLURAL:$1|tháng|tháng}} trước đây',
	'centralauth-years-ago'                => '$1 {{PLURAL:$1|năm|năm}} trước đây',
	'centralauth-prefs-status'             => 'Tình trạng của tài khoản chung:',
	'centralauth-prefs-not-managed'        => 'Không sử dụng tài khoản hợp nhất',
	'centralauth-prefs-unattached'         => 'Chưa xác nhận',
	'centralauth-prefs-complete'           => 'Đã đâu vào đấy!',
	'centralauth-prefs-migration'          => 'Đang hợp nhất',
	'centralauth-prefs-count-attached'     => 'Tài khoản của bạn có hiệu lực tại $1 dự án.',
	'centralauth-prefs-count-unattached'   => 'Còn $1 {{plural:$1|dự án|dự án}} có tài khoản trùng với tên của bạn nhưng chưa được xác nhận.',
	'centralauth-prefs-detail-unattached'  => 'Dự án này chưa được xác nhận thuộc về tài khoản chung.',
	'centralauth-prefs-manage'             => 'Quản lý tài khoản chung',
	'centralauth-renameuser-abort'         => '<div class="errorbox">Không có thể đổi tên $1 tại đây vì tên người dùng này đã được chuyển đến hệ thống đăng nhập thống nhất.</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">Không thể đổi tên người dùng $2 vì tên này đã được để dành cho một tài khoản toàn cục.</div>',
	'centralauth-account-exists'           => 'Không thể tạo tài khoản: tên người dùng chỉ định đã được sử dụng trong hệ thống đăng nhập thống nhất.',
);

/** Volapük (Volapük)
 * @author Smeira
 * @author Malafaya
 */
$messages['vo'] = array(
	'mergeaccount'                         => 'Stad balama kalas',
	'centralauth-desc'                     => '[[{{ns:special}}:MergeAccount|Balön kali]] da vüks Fünoda: Wikimedia',
	'centralauth-merge-denied'             => 'Liedo no labol däli ad logön padi at.',
	'centralauth-merge-notlogged'          => '<span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} Nunädolös oli, begö!]</span> ad logön, va kals olik pebalons lölöfiko.',
	'centralauth-merge-welcome'            => "'''Gebanakal olik no nog petopätükon ini nunädamasit balik ela Wikimedia.'''

If vilol topätükön kalis olik, okanol gebön gebananami ot e letavödi ot ad nunädön oli pö proyegs (vüks) valiks in püks gebidik valik. Atos fasilükon vobi me proyegs difik, soäs löpükam ragivas nulik ini [http://commons.wikimedia.org/Cifapad Kobädikos ela Wikimedia], e viton kofudis u konflitis (a.s. ven pösods difik välons gebananemi ot pö proyegds difik).

If ek ya labon gebananemi olik pö proyeg votik, kal balik ola no otupon oni; okanol bespikön atosi poso ko on u ko guvan.",
	'centralauth-merge-step1-title'        => 'Primön ad balön kalis',
	'centralauth-merge-step1-detail'       => 'Letavöd e ladet leäktronik peregistaröl oliks poleigodons ko uts kalas vükas votik, ad fümedön, das valiks leigons. Nos povotükon jüs efümedol, das valikos binon verätik.',
	'centralauth-merge-step1-submit'       => 'Fümedolös nunädamanünis',
	'centralauth-merge-step2-title'        => 'Fümedolös kalis pluik',
	'centralauth-merge-step2-detail'       => 'Kals anik no ekanons payümön itjäfidiko ad ut lomavüka olik. Kanol fümedön, das kals at binons oliks, medü letavöd(s) onsik.',
	'centralauth-merge-step2-submit'       => 'Fümedolös nunädamanünis',
	'centralauth-merge-step3-title'        => 'Jafön kali balik',
	'centralauth-merge-step3-detail'       => 'Kanol anu jafön kali balik ola, labü vüks sököl:',
	'centralauth-merge-step3-submit'       => 'Balön kalis',
	'centralauth-complete'                 => 'Kals olik pebalons!',
	'centralauth-incomplete'               => 'Kals olik no pebalons!',
	'centralauth-complete-text'            => 'Kanol anu nunädön oli in proyegs valik ela Wikimedia nes jafön kali nulik. Gebananem e letavöd ots lonöfons pro Vükiped, Vükivödabuk, Vükibuks äsi svistaproyegs onsik in püks valik.',
	'centralauth-incomplete-text'          => 'Posä kals olik pubalons, okanol nunädön oli pö proyegs valik ela Wikimedia nes jafön kali nulik. Gebananem e letavöd ots lonöfons pro Vükiped, Vükivödabuk, Vükibuks äsi svistaproyegs onsik in püks valik.',
	'centralauth-not-owner-text'           => 'Gebananem: „$1“ pegevon itjäfidiko dalabane kala in $2.

If ol binol dalaban, kanol finükön kalibalami medä penol letavöd kala at:',
	'centralauth-disabled-dryrun'          => 'Kalibalam binon atimo nog proyeg no pefinüköl e no nog pedälon. Pidö!',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|Reidolös mödikumosi tefü '''kals balik''']]...''",
	'centralauth-list-home-title'          => 'Lomavük',
	'centralauth-list-home-dryrun'         => 'Letavöd e ladet leäktronik in vük at pogebons in kal balik ola, e gebanapads olik in vüks votik poyümons itjäfidiko isio. Okanol votükön lomavüki olik poso.',
	'centralauth-list-attached-title'      => 'Kals peyümöl',
	'centralauth-list-attached'            => 'Kal labü nem: „$1“ pö vüks sököl peyümons itjäfidiko lü kal balik:',
	'centralauth-list-attached-dryrun'     => 'Kal labü nem: „$1“ su vüks sököl poyümon itjäfidiko lü kal balik:',
	'centralauth-list-unattached-title'    => 'Kals no peyümöl',
	'centralauth-list-unattached'          => 'No eplöpos ad fümedön itjäfidiko kali: „$1“ as ledutöl lü ol su vüks sököl (mögos, das no labons letavödi ot kala lomavüka olik).',
	'centralauth-foreign-link'             => 'Geban $1 in $2',
	'centralauth-merge-method-primary'     => 'lomavük',
	'centralauth-merge-method-empty'       => 'keblünots nonik',
	'centralauth-merge-method-new'         => 'kal nulik',
	'centralauth-finish-title'             => 'Finükön balami',
	'centralauth-finish-text'              => 'If kals at ledutons lü ol, kanol finükön kalibalami medä penol letavödis kalas at:',
	'centralauth-finish-password'          => 'Letavöd:',
	'centralauth-finish-login'             => 'Gebananem',
	'centralauth-finish-send-confirmation' => 'letavöd pota leäktronik',
	'centralauth-finish-problems'          => 'Labol-li fikulis, u no dalabol-li kalis votik at? [[meta:Help:Unified login problems|Ekö! yuf tefik]]...',
	'centralauth-merge-attempt'            => "'''Letävod pegivöl pafümedon leigodü kals no nog peyümöls...'''",
	'centralauth-attach-list-attached'     => 'Kal balik labü nem: „$1“ keninükon kalis sököl:',
	'centralauth-attach-title'             => 'Fümedolös kali',
	'centralauth-attach-text'              => 'Kal at no nog petopätükon lü kal balik. If kal at leduton lü ol, kanol yümön oni if penol letavöd onik:',
	'centralauth-attach-submit'            => 'Topätükön kali',
	'centralauth-attach-success'           => 'Kal at petopätükon lü kal balik.',
	'centralauth'                          => 'Kaliguvam balik',
	'centralauth-admin-manage'             => 'Guvam gebananünas',
	'centralauth-admin-username'           => 'Gebananem:',
	'centralauth-admin-lookup'             => 'Logön u votükön gebananünis',
	'centralauth-admin-info-hidden'        => 'Peklänedöl:',
	'centralauth-admin-yes'                => 'si',
	'centralauth-admin-no'                 => 'no',
	'centralauth-admin-list-method'        => 'Metod',
	'centralauth-admin-unmerge'            => 'Pevälos ad no balön',
	'centralauth-admin-merge'              => 'Pevälos ad balön',
	'centralauth-admin-bad-input'          => 'Pevälos negidetiko ad balön',
	'centralauth-admin-none-selected'      => 'Kals nonik pevälons ad pevotükön.',
	'centralauth-seconds-ago'              => 'bü {{PLURAL:$1|sekun|sekuns}} $1',
	'centralauth-minutes-ago'              => 'bü {{PLURAL:$1|minut|minuts}} $1',
	'centralauth-hours-ago'                => 'bü {{PLURAL:$1|düp|düps}} $1',
	'centralauth-days-ago'                 => 'bü {{PLURAL:$1|del|dels}} $1',
	'centralauth-months-ago'               => 'bü {{PLURAL:$1|mul|muls}} $1',
	'centralauth-years-ago'                => 'bü {{PLURAL:$1|yel|yels}} $1',
	'centralauth-prefs-status'             => 'Stad kala valemik:',
	'centralauth-prefs-not-managed'        => 'Kal balik no pagebon',
	'centralauth-prefs-unattached'         => 'No pefümedöl',
	'centralauth-prefs-complete'           => 'Valikos veräton!',
	'centralauth-prefs-migration'          => 'Patopätükon',
	'centralauth-prefs-count-attached'     => 'Kal olik lonöfon pö {{plural:$1|proyegatopäd|proyegatopäds}} $1.',
	'centralauth-prefs-count-unattached'   => 'Kals no pefümedöls labü nem olik dabinon nog pö {{plural:$1|proyeg|proyegs}} $1.',
	'centralauth-prefs-detail-unattached'  => 'Proyegatopäd at no pefümedon as dutöl lü kal valemik.',
	'centralauth-prefs-manage'             => 'Guvön kali valemik ola',
	'centralauth-renameuser-abort'         => '<div class="errorbox">No mögos ad votanemön gebani: $1 is bi gebananem at petopätükon lü nunädamasit balik.</div>',
);

/** Cantonese
 * @author Shinjiman
 */
$messages['yue'] = array(
	// When not logged in...
	'mergeaccount'                   => '登入統一狀態',
	'centralauth-desc'               => '響Wikimedia Foundation wiki度[[Special:MergeAccount|合併戶口]]',
	'centralauth-mergeaccount-desc'  => '[[Special:MergeAccount|合併多個戶口]]用來統一登入',
	'centralauth-merge-denied'       => '對唔住，你無權限去存取呢一版。',
	'centralauth-merge-notlogged'    => '請<span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}}登入]</span>去睇下檢查你嘅戶口係唔係已經完全整合。',
	'centralauth-merge-welcome'      =>"'''你嘅用戶戶口重未整合到Wikimedia嘅統一登入系統。'''如果你係要去整合你個戶口嘅話，噉你就可以用同一個用戶名同密碼去登入全部Wikimedia中全部語言嘅計劃。噉樣做，可以更加容易噉響一啲共用嘅計劃度進行一啲工作，好似[http://commons.wikimedia.org/ Wikimedia Commons]，同埋避免用戶名混淆同相撞，以致響唔同嘅計劃度，兩位人揀咗同一個用戶名。

如果有另一啲人已經響另一個網站度揀咗你個用戶名嘅話，係唔會擾亂佢哋，但係佢會畀你一個機會，稍後同佢地或者同管理員去處理。",

	'centralauth-merge-step1-title'  => '開始登入統一',
	'centralauth-merge-step1-detail' => '你嘅密碼同埋註冊嘅電郵地址會分別響其它wiki度檢查，去睇佢哋係一樣嘅。直至到你確認啲嘢係無問題之前，都唔會有更改嘅。',
	'centralauth-merge-step1-submit' => '確認登入資料',

	'centralauth-merge-step2-title'  => '確認更多戶口',
	'centralauth-merge-step2-detail' => "有啲戶口唔會自動噉同你自己嘅自家wiki站配合到。如果呢啲戶口係屬於你嘅話，你可以為佢哋提供一個密碼去確認佢哋係屬於你嘅。",
	'centralauth-merge-step2-submit' => '確認登入資料',

	// Dry run messages
	'centralauth-merge-dryrun-complete'   => '全部嘅現行戶口都可以自動噉統一！

你嘅戶口重未有任何嘅改變。',
	'centralauth-merge-dryrun-incomplete' => "你已經揀咗繼續，但係有啲戶口唔可以自動噉確認，唔會即時搬遷。
你可以響稍後時間再合併。

你嘅戶口重未有任何嘅改變。",
	'centralauth-merge-dryrun-or'         => "'''或'''",
	'centralauth-merge-dryrun-home'       => "個搬遷系統唔能夠確認你係個自家wiki戶口用戶名係屬於你嘅。

另一個wiki曾經認定咗你嘅用戶名做自家wiki嘅戶口；跟住下面嘅連結去完成你嘅戶口搬遷。",

	'centralauth-merge-step3-title'  => '開個統一戶口',
	'centralauth-merge-step3-detail' => "你已經預備好響加入咗嘅wiki度，去開一個統一戶口：",
	'centralauth-merge-step3-submit' => '統一戶口',

	// Big text on completion
	'centralauth-complete'   => '戶口統一已經搞掂！',
	'centralauth-incomplete' => '戶口統一重未搞掂！',

	// Wheeee
	'centralauth-complete-text'   => '你而家可以響唔使個新戶口嘅情況之下登入任何一個Wikimedia嘅wiki網站；
用同一個用戶名同密碼就可以登入響所有語言嘅維基百科、維基詞典、維基教科書同埋佢哋嘅其它姊妹計劃網站。',
	'centralauth-incomplete-text' => '一旦你嘅登入完成統一，你就可以登入所有Wikimedia嘅wiki網站，而無需再開個新戶口；
用同一組用戶名同密碼就可以登入到所有語言嘅維基百科、維基詞典、維基教科書同埋佢哋嘅其它姊妹計劃網站。',
	'centralauth-not-owner-text'  => '用戶名 "$1" 已經自動分咗畀 $2 上面嘅戶口持有者。
如果呢個係你，你可以輸入響嗰個戶口嘅主密碼以完成登入統一嘅程序：',

	'centralauth-notice-dryrun'   => "<div class='successbox'>只係示範模式</div><br clear='all'/>",

	'centralauth-disabled-dryrun' => "戶口統一而家係響示範／除錯模式，噉實際嘅合併動作已經停用。對唔住！",

	// Appended to various messages above
	'centralauth-readmore-text' => ":''[[meta:Help:Unified login|睇下更多有關'''統一登入'''嘅細節]]...''",

	// For lists of wikis/accounts:
	'centralauth-list-home-title'       => '自家wiki',
	'centralauth-list-home-dryrun'      => '你響呢個wiki嘅密碼同電郵地址會用來做你嘅統一戶口，同時你響呢度嘅用戶頁會由其它嘅wiki度自動連結過來。你可以響稍後嘅時間去改你嘅自家wiki。',
	'centralauth-list-attached-title'   => '已經附加嘅戶口',
	'centralauth-list-attached'         => '以下用戶名 "$1" 嘅戶口已經自動噉樣合併咗：',
	'centralauth-list-attached-dryrun'  => '下面每一個網站，個名係"$1"嘅戶口將會自動附加到一個統一戶口度:',
	'centralauth-list-unattached-title' => '未附加嘅戶口',
	'centralauth-list-unattached'       => '以下網站嘅戶口 "$1" 唔能夠自動噉樣合併；好有可能佢哋嘅密碼同你嘅主戶口唔同:',
	'centralauth-foreign-link'          => '響 $2 嘅用戶 $1',

	// Merge methods
	'centralauth-merge-method-primary'  => '自家 wiki',
	'centralauth-merge-method-empty'    => '無貢獻',
	'centralauth-merge-method-mail'     => '已用電郵確認',
	'centralauth-merge-method-password' => '已用密碼確認',
	'centralauth-merge-method-admin'    => '管理合併戶口',
	'centralauth-merge-method-new'      => '新戶口',
	'centralauth-merge-method-login'    => '已用登入確認',

	// When not complete, offer to finish...
	'centralauth-finish-title'             => '完成合併',
	'centralauth-finish-text'              => '如果呢啲戶口係屬於你嘅，你可以響呢度輸入其它戶口嘅密碼，以完成登入統一嘅程序:',
	'centralauth-finish-password'          => '密碼:',
	'centralauth-finish-login'             => '登入',
	'centralauth-finish-send-confirmation' => '透過電郵寄密碼',
	'centralauth-finish-problems'          => "有問題，又或者你並無持有其它嘅戶口？
	[[meta:Help:Unified login problems|如何尋求協助]]...",
	'centralauth-finish-noconfirms'        => '用呢個密碼確認唔到任何一個戶口。',
	'centralauth-finish-incomplete'        => '用呢個密碼確認唔到幾個戶口。
其它戶口重未確認。',

	'centralauth-merge-attempt' => "'''檢查緊所輸入嘅密碼，同剩底未合併戶口相對...'''",

	# When unattached, offer to attach...
	'centralauth-attach-list-attached' => '個統一戶口叫 "$1" 有下面嘅戶口:',
	'centralauth-attach-title'         => '確認戶口',
	'centralauth-attach-text'          => '呢個戶口重未搬遷過去統一戶口。
如果個全域戶口亦都係你嘅，如果你輸入全域戶口個密碼，就可以合併呢個戶口:',
	'centralauth-attach-submit'        => '搬遷戶口',
	'centralauth-attach-success'       => '個戶口已經搬遷到個統一戶口度。',

	// Administrator's console
	'centralauth'                        => '統一戶口管理',
	'centralauth-admin-manage'           => '管理用戶資料',
	'centralauth-admin-username'         => '用戶名:',
	'centralauth-admin-lookup'           => '去睇或者編輯用戶資料',
	'centralauth-admin-permission'       => '只有執行員先至可以為用戶合併其它人嘅戶口。',
	'centralauth-admin-no-unified'       => '呢個用戶名無統一戶口。',
	'centralauth-admin-info-id'          => '用戶ID:',
	'centralauth-admin-info-registered'  => '註冊咗:',
	'centralauth-admin-info-locked'      => '鎖咗:',
	'centralauth-admin-info-hidden'      => '隱藏:',
	'centralauth-admin-yes'              => '係',
	'centralauth-admin-no'               => '唔係',
	'centralauth-admin-attached'         => '完全合併咗嘅戶口',
	'centralauth-admin-unattached'       => '未附加嘅戶口',
	'centralauth-admin-no-unattached'    => '重未有未合併嘅戶口。',
	'centralauth-admin-list-localwiki'   => '本地 wiki',
	'centralauth-admin-list-attached-on' => '附加於',
	'centralauth-admin-list-method'      => '方法',
	'centralauth-admin-unmerge'          => '唔合併已經揀咗嘅',
	'centralauth-admin-merge'            => '合併已經揀咗嘅',
	'centralauth-admin-bad-input'        => '唔啱嘅合併選擇',
	'centralauth-admin-none-selected'    => '無戶口揀咗去改。',

	// Pretty timespan
	'centralauth-seconds-ago' => '$1 秒之前',
	'centralauth-minutes-ago' => '$1 分鐘之前',
	'centralauth-hours-ago'   => '$1 個鐘之前',
	'centralauth-days-ago'    => '$1 日前',
	'centralauth-months-ago'  => '$1 個用前',
	'centralauth-years-ago'   => '$1 年前',

	// Info panel in preferences
	'centralauth-prefs-status'            => '全域戶口狀態：',
	'centralauth-prefs-not-managed'       => '唔係用緊統一戶口',
	'centralauth-prefs-unattached'        => '未確認',
	'centralauth-prefs-complete'          => '全部完成！',
	'centralauth-prefs-migration'         => '遷移中',
	'centralauth-prefs-count-attached'    => '你個戶口響$1個計劃網站度係活躍嘅。',
	'centralauth-prefs-count-unattached'  => '你響$1個計劃度重有未確認嘅戶口。',
	'centralauth-prefs-detail-unattached' => '呢個計劃網站重未確認到個全域戶口。',
	'centralauth-prefs-manage'            => '管理你個全域戶口',

	// Interaction with Special:Renameuser
	'centralauth-renameuser-abort'        => "<div class=\"errorbox\">由於呢個用戶名已經遷移到統一登入系統，因此唔可以響本地度改$1做呢個用戶名。</div>",
	'centralauth-renameuser-exists'       => "<div class=\"errorbox\">由於呢個用戶名已經預留畀全域戶口，因此唔可以改$2做呢個用戶名。</div>",

	// Other messages
	'centralauth-account-exists'     => '唔可以開戶口: 所需求嘅用戶名已經響統一登入系統度拎咗。',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Alexsh
 * @author 下一次登录
 */
$messages['zh-hans'] = array(
	// When not logged in...
	'mergeaccount'                         => '用户账户整合',
	'centralauth-desc'                     => '[[Special:MergeAccount|合并]]维基媒体基金会下属维基项目的账户',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|将多个账户合并]]为单一用户账户',
	'centralauth-merge-denied'             => '很抱歉，您没有权限存取这个页面',
	'centralauth-merge-notlogged'          => '请<span class="plainlinks">[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}} 登录]</span>并检查您的账号是否已被完全合并。',
	'centralauth-merge-welcome'            => "'''您的用户账户还未被迁移到维基媒体的整合账户系统。'''

一旦您决定迁移您的账户，您便可以通过相同的用户名和密码登录到维基媒体下属所有维基项目的所有语言版本。这可以方便您在[http://commons.wikimedia.org/ 维基共享资源]这样的共享项目中进行一些工作，并避免在不同的项目中因不同用户选用相同用户名而造成的混淆与冲突。

如果在另一个维基项目上已有其他人选用了您的用户名，他们也不会受到干扰。不过，此后您将有一个与他们或该项目管理员协商解决该问题的机会。",

	'centralauth-merge-step1-title'  => '开始整合用户账户',
	'centralauth-merge-step1-detail' => '您的密码以及电子邮件地址将会与其他项目的数据进行比对，以确认它们是一致的。所有数据在您确认没有问题之前均不会更改。',
	'centralauth-merge-step1-submit' => '确认账户数据',

	'centralauth-merge-step2-title'  => '确认更多账户',
	'centralauth-merge-step2-detail' => "有一部分的账户没有与主维基项目自动匹配上。如果您拥有这些账户，请提供这些账户的密码以确认它们的归属人。",
	'centralauth-merge-step2-submit' => '确认账户数据',

	// Dry run messages
	'centralauth-merge-dryrun-complete'   => '所有已存在的的账户都能被自动整合！

目前尚未对您的帐号进行任何修改。',
	'centralauth-merge-dryrun-incomplete' => '您的账户已经确认完毕并准备进行整合作业，但部份帐号无法确认，也将不会立即合并。您可以在稍后再次合并这些账户。

目前尚未对您的帐号进行任何修改。',
	'centralauth-merge-dryrun-or'         => "'''或者是'''",
	'centralauth-merge-step3-title'       => '创建整合账户',
	'centralauth-merge-step3-detail'      => "在以下维基项目中，您已为创建整合账户作好了准备：",
	'centralauth-merge-step3-submit'      => '整合账户',

	// Big text on completion
	'centralauth-complete'   => '账户整合完成！',
	'centralauth-incomplete' => '账户整合未完成！',

	// Wheeee
	'centralauth-complete-text'   => '您现在可以登录到维基媒体的其他维基项目中，而无需创建一个新的账号；相同的用户名和密码会适用于维基百科、维基词典、维基教科书及其他姐妹项目的所有语言版本。',
	'centralauth-incomplete-text' => '当您的账户被整合后，您将能够登录到任何一处维基媒体的维基项目站点，而无需创建一个新的账户；相同的用户名和密码会适用于维基百科、维基词典、维基教科书及其他姐妹项目的所有语言版本。',
	'centralauth-not-owner-text'  => '用户名“$1”已被自动分配给$2上的账户。

如果这是您的账户，请输入该账户的密码，以完成账户整合的过程：',

	'centralauth-notice-dryrun'   => "<div class='successbox'>此功能处于演示模式。</div><br clear='all'/>",

	'centralauth-disabled-dryrun' => "账户整合功能正处于演示／除错模式，因此实际的合并操作已被禁止。抱歉！",

	// Appended to various messages above
	'centralauth-readmore-text'   => ":''[[meta:Help:Unified login|关于'''账户整合'''的更多内容]]……''",

	// For lists of wikis/accounts:
	'centralauth-list-home-title'       => '主维基项目',
	'centralauth-list-home-dryrun'      => '在本维基项目中设定的密码与电子邮件地址将会被用在您的整合账户中，而您在这里的用户页也会自动与其他项目的相关页面建立相互的链接。此后，您还可以改变您的主维基项目。',
	'centralauth-list-attached-title'   => '并入账户',
	'centralauth-list-attached'         => '以下站点中名为“$1”的账户均会被自动并入整合账户中：',
	'centralauth-list-attached-dryrun'  => '以下站点中名为“$1”的账户均会被自动并入整合账户中：',
	'centralauth-list-unattached-title' => '无法并入账户',
	'centralauth-list-unattached'       => '无法自动确认您拥有以下站点中账户“$1”的所有权；它们可能使用了与您的主账户相异的密码：',
	'centralauth-foreign-link'          => '$2上的用户$1',

	// Merge methods
	'centralauth-merge-method-primary'     => '主账户',
	'centralauth-merge-method-empty'       => '没有任何贡献',
	'centralauth-merge-method-mail'        => '经电子邮件确认',
	'centralauth-merge-method-password'    => '经密码确认',
	'centralauth-merge-method-admin'       => '管理整合账户',
	'centralauth-merge-method-new'         => '新账户',
	'centralauth-merge-method-login'       => '经登入确认',

	// When not complete, offer to finish...
	'centralauth-finish-title'             => '合并完成',
	'centralauth-finish-text'              => '如果您的确拥有这些账户，您只需在此输入它们所使用的密码便可完成账户整合过程：',
	'centralauth-finish-password'          => '密码：',
	'centralauth-finish-login'             => '登录',
	'centralauth-finish-send-confirmation' => '电子邮件密码',
	'centralauth-finish-problems'          => "发生错误，您是否不拥有这些账户？[[meta:Help:Unified login problems|寻求帮助]]……",
	'centralauth-finish-noconfirms'        => '没有账户可经密码确认。',
	'centralauth-finish-incomplete'        => '部份账户已经由密码整合，其他帐号尚未确认。',

	'centralauth-merge-attempt' => "'''检查未合并账户的密码……'''",

	# When unattached, offer to attach...
	'centralauth-attach-list-attached' => '名为“$1”的整合账户包括下列账户：',
	'centralauth-attach-title'         => '账户确认',
	'centralauth-attach-text'          => '此账户还未被迁移到整合账户中。如果您已经拥有了一个整合账户，您可以在此输入该整合账户的密码来并入此账户：',
	'centralauth-attach-submit'        => '账户迁移',
	'centralauth-attach-success'       => '该账户已被迁移到整合账户中。',

	// Administrator's console
	'centralauth'                        => '整合账户管理',
	'centralauth-admin-manage'           => '管理用户资料',
	'centralauth-admin-username'         => '用户名：',
	'centralauth-admin-lookup'           => '查看或编辑用户资料',
	'centralauth-admin-permission'       => "只有监管员才能为他人合并账户。",
	'centralauth-admin-no-unified'       => '没有这个整合账户名称。',
	'centralauth-admin-info-id'          => '用户编号：',
	'centralauth-admin-info-registered'  => '登录时间：',
	'centralauth-admin-info-locked'      => '锁定：',
	'centralauth-admin-info-hidden'      => '隐藏：',
	'centralauth-admin-yes'              => '是',
	'centralauth-admin-no'               => '否',
	'centralauth-admin-attached'         => '所有已合并的账户',
	'centralauth-admin-unattached'       => '未附属的账户',
	'centralauth-admin-no-unattached'    => '没有任何未迁移的账户。',
	'centralauth-admin-list-localwiki'   => '本地维基站',
	'centralauth-admin-list-attached-on' => '合并时间',
	'centralauth-admin-list-method'      => '验证方式',
	'centralauth-admin-unmerge'          => '拆分选中的账户',
	'centralauth-admin-merge'            => '合并选中的账户',
	'centralauth-admin-bad-input'        => '合并所选项时发生错误',
	'centralauth-admin-none-selected'    => '选中的账户未被修改。',

	// Pretty timespan
	'centralauth-seconds-ago'              => '$1秒前',
	'centralauth-minutes-ago'              => '$1分钟前',
	'centralauth-hours-ago'                => '$1小时前',
	'centralauth-days-ago'                 => '$1日前',
	'centralauth-months-ago'               => '$1月前',
	'centralauth-years-ago'                => '$1年前',

	// Info panel in preferences
	'centralauth-prefs-status'            => '整合账户状态：',
	'centralauth-prefs-not-managed'       => '尚未启用整合账户',
	'centralauth-prefs-unattached'        => '未确认',
	'centralauth-prefs-complete'          => '全部完成！',
	'centralauth-prefs-migration'         => '迁移中',
	'centralauth-prefs-count-attached'    => '您在$1个项目中已拥有被激活的账户。',
	'centralauth-prefs-count-unattached'  => '您在$1个项目中还有未被确认的账户。',
	'centralauth-prefs-detail-unattached' => '此项目站点还未被确认到整合账户。',
	'centralauth-prefs-manage' => '管理您的整合账户',

	// Interaction with Special:Renameuser
	'centralauth-renameuser-abort' => "<div class=\"errorbox\">由于该账户已被迁移到整合账户系统，因此不能在本地对其用户名$1进行修改。</div>",
	'centralauth-renameuser-exists'       => "<div class=\"errorbox\">由于这个用户名已经预留给全域账户，因此不能在更改$2作为这个用户名。</div>",

	// Other messages
	'centralauth-account-exists'           => '无法建立账户：已有其他用户于整合登入系统使用此名称。',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Alexsh
 * @author Jasonzhuocn
 * @suthor Πrate (百楽兎)
 */
$messages['zh-hant'] = array(
	'mergeaccount'                         => '使用者帳號整合',
	'centralauth-desc'                     => '[[Special:MergeAccount|整合]]所有維基媒體計劃的帳號',
	'centralauth-mergeaccount-desc'        => '[[Special:MergeAccount|將多個帳號合併]]為單一使用者帳號',
	'centralauth-merge-denied'             => '很抱歉，您沒有權限存取這個頁面',
	'centralauth-merge-notlogged'          => '請<span class="plainlinks">
		[{{fullurl:Special:Userlogin|returnto=Special%3AMergeAccount}}登入]
		</span>以驗證您的帳號是否已經完成整合。',
	'centralauth-merge-welcome'            => "'''您的使用者帳戶尚未與維基媒體的統一登入系統合併。'''

一旦您決定合併帳戶，即可以透過相同的使用者名與密碼登入到維基媒體所有計劃的所有語言版本。
這樣做可以讓您在共用的計劃如<span class=\"plainlinks\">[http://commons.wikimedia.org/ 維基共享資源]</span>中更容易的作業。

這也能避免在不同的計劃中，兩位不同的使用者因選擇相同名稱而造成的混淆與衝突。

如果在另一個計劃上已經有其他人選擇了您的用戶名，他們也不會受到干擾。不過您可以請求該計劃的管理員進行協商或解決。",
	'centralauth-merge-step1-title'        => '開始登入整合',
	'centralauth-merge-step1-detail'       => '您的密碼以及電子郵件地址將會與其他計劃的資料進行比對，以確認它們是一致的。所有資料在您確認沒有問題之前均不會更改。',
	'centralauth-merge-step1-submit'       => '確認登入資料',
	'centralauth-merge-step2-title'        => '確認更多帳號',
	'centralauth-merge-step2-detail'       => '有些帳號不會自動地跟您的主要維基計劃整合如果這些帳號是於您的，您可以為它們提供一個密碼去確認它們是屬於您的。
',
	'centralauth-merge-step2-submit'       => '確認登入資料',
	'centralauth-merge-dryrun-complete'    => '所有已存在的的帳號都能被自動整合！

目前尚未對您的帳號進行任何修改。',
	'centralauth-merge-dryrun-incomplete'  => '您的帳號已經確認完畢並準備進行整合作業，但部份帳號無法確認，也將不會立即合併。您可以在稍後再次合併這些帳號。

目前尚未對您的帳號進行任何修改。',
	'centralauth-merge-dryrun-or'          => "'''或者是'''",
	'centralauth-merge-dryrun-home'        => '遷移系統無法從主維基站確認您是這個名稱的擁有者。

已有其他維基站使用此名稱；請參閱以下的連結和記錄以完成帳號遷移。',
	'centralauth-merge-step3-title'        => '建立整合帳號',
	'centralauth-merge-step3-detail'       => '您已經準備好在已加入的計劃中建立一個整合帳號：',
	'centralauth-merge-step3-submit'       => '整合帳號',
	'centralauth-complete'                 => '帳號整合完成！',
	'centralauth-incomplete'               => '帳號整合未完成！',
	'centralauth-complete-text'            => '您現在可以使用同一組帳號與密碼登入所有維基媒體計劃網站，且不需再建立新帳號。以這組帳號密碼即可登入所有維基媒體基金會的各項計劃。',
	'centralauth-incomplete-text'          => '您現在可以使用同一組帳號與密碼登入所有維基媒體計劃網站，且不需再建立新帳號。以這組帳號密碼即可登入所有維基媒體基金會的各項計劃。',
	'centralauth-not-owner-text'           => '使用者名稱："$1"已自動分配給$2上的帳號。

如果這是您的帳號，請輸入該帳號的密碼以完成帳號整合：',
	'centralauth-notice-dryrun'            => "<div class='successbox'>目前為示範模式</div><br clear='all'/>",
	'centralauth-disabled-dryrun'          => '目前為示範模式，
實際的整合動作已停用。',
	'centralauth-readmore-text'            => ":''[[meta:Help:Unified login|了解更多'''帳號整合'''細節]]...''",
	'centralauth-list-home-title'          => '主要維基計劃',
	'centralauth-list-home-dryrun'         => '您在這個計劃中使用的密碼以及電子郵件地址將會用來做您的整合帳號，同時您在這裡的用戶頁會由其它的計劃中自動連結過來。您可以稍後更改你的主要項目。',
	'centralauth-list-attached-title'      => '已經附加的帳號',
	'centralauth-list-attached'            => '以下網站的帳號"$1"已自動完成整合：',
	'centralauth-list-attached-dryrun'     => '以下每一個網站，名字是"$1"的帳號將會自動附加到整合帳號中：',
	'centralauth-list-unattached-title'    => '未附加的帳號',
	'centralauth-list-unattached'          => '以下網站的帳號"$1"無法自動整合；很可能是因為它們的密碼
和您的主帳號不同：',
	'centralauth-foreign-link'             => '$2 上的 $1',
	'centralauth-merge-method-primary'     => '主帳號',
	'centralauth-merge-method-empty'       => '沒有任何貢獻',
	'centralauth-merge-method-mail'        => '經電子郵件確認',
	'centralauth-merge-method-password'    => '經密碼確認',
	'centralauth-merge-method-admin'       => '管埋整合帳號',
	'centralauth-merge-method-new'         => '新帳號',
	'centralauth-merge-method-login'       => '經登入確認',
	'centralauth-finish-title'             => '完成整合',
	'centralauth-finish-text'              => '如果這些帳號屬於您，請輸入這些帳號的密碼，以完成帳號整合：',
	'centralauth-finish-password'          => '密碼：',
	'centralauth-finish-login'             => '登入',
	'centralauth-finish-send-confirmation' => '透過電子郵件寄送密碼',
	'centralauth-finish-problems'          => '遇到問題或者這些帳號不屬於您嗎？
[[meta:Help:Unified login problems|如何尋求協助]]...',
	'centralauth-finish-noconfirms'        => '沒有帳號可經密碼確認。',
	'centralauth-finish-incomplete'        => '部份帳號已經由密碼整合，其他帳號尚未確認。',
	'centralauth-merge-attempt'            => "'''正在查驗您輸入的密碼是否與其餘未整合的帳號相符...'''",
	'centralauth-attach-list-attached'     => '整合帳戶"$1"中包含以下帳戶：',
	'centralauth-attach-title'             => '確認帳號',
	'centralauth-attach-text'              => '這個帳戶尚未被遷移到整合帳戶中，如果您已經擁有一個整合帳戶，您可能在此輸入該整合帳戶的密碼以遷移此帳戶：',
	'centralauth-attach-submit'            => '遷移帳號',
	'centralauth-attach-success'           => '該帳戶已被遷移到整合帳戶中。',
	'centralauth'                          => '統一帳戶管理',
	'centralauth-admin-manage'             => '管理使用者資料',
	'centralauth-admin-username'           => '使用者名稱：',
	'centralauth-admin-lookup'             => '檢視或編輯使用者資料',
	'centralauth-admin-permission'         => '只有監管員可以為用戶整合帳號。',
	'centralauth-admin-no-unified'         => '沒有這個整合帳戶名稱。',
	'centralauth-admin-info-id'            => '用戶編號：',
	'centralauth-admin-info-registered'    => '登錄時間：',
	'centralauth-admin-info-locked'        => '鎖定：',
	'centralauth-admin-info-hidden'        => '隱藏：',
	'centralauth-admin-yes'                => '是',
	'centralauth-admin-no'                 => '否',
	'centralauth-admin-attached'           => '所有已合併的帳戶',
	'centralauth-admin-unattached'         => '未附屬的帳戶',
	'centralauth-admin-no-unattached'      => '沒有任何未遷移的帳戶。',
	'centralauth-admin-list-localwiki'     => '本地維基站',
	'centralauth-admin-list-attached-on'   => '合併時間',
	'centralauth-admin-list-method'        => '驗證方式',
	'centralauth-admin-unmerge'            => '解除已選取的帳戶',
	'centralauth-admin-merge'              => '整合已選取的',
	'centralauth-admin-bad-input'          => '不正確的整合選擇',
	'centralauth-admin-none-selected'      => '選擇的帳戶沒有被修改。',
	'centralauth-seconds-ago'              => '$1秒前',
	'centralauth-minutes-ago'              => '$1分鐘前',
	'centralauth-hours-ago'                => '$1小時前',
	'centralauth-days-ago'                 => '$1日前',
	'centralauth-months-ago'               => '$1月前',
	'centralauth-years-ago'                => '$1年前',
	'centralauth-prefs-status'             => '整合帳戶狀態：',
	'centralauth-prefs-not-managed'        => '不是正在使用統一帳戶',
	'centralauth-prefs-unattached'         => '未確認',
	'centralauth-prefs-complete'           => '全部完成！',
	'centralauth-prefs-migration'          => '遷移中',
	'centralauth-prefs-count-attached'     => '您的帳戶在$1個計劃網站中是活躍的。',
	'centralauth-prefs-count-unattached'   => '您在$1個計劃中還有未確認的帳戶。',
	'centralauth-prefs-detail-unattached'  => '這個計劃網站還未確認到全域帳戶。',
	'centralauth-prefs-manage'             => '管理您的全域帳戶',
	'centralauth-renameuser-abort'         => '<div class="errorbox">由於這個用戶名已經遷移到統一登入系統，因此不能在本地中更改$1作為這個用戶名。</div>',
	'centralauth-renameuser-exists'        => '<div class="errorbox">由於這個用戶名已經預留給全域帳戶，因此不能在更改$2作為這個用戶名。</div>',
	'centralauth-account-exists'           => '無法建立帳號：已有其他用戶於整合登入系統使用此名稱。',
);

