<?php

/* Messages for Special:SignDocument.
 * @addtogroup Extensions
 */

$messages = array();

$messages['en'] = array(
	'signdocument'         => 'Sign Document',
	'sign-nodocselected'   => 'Please select the document you wish to sign.',
	'sign-selectdoc'       => 'Document:',
	'sign-docheader'       => '<div class="noarticletext">Please use this form to sign the document "[[$1]]," shown below.
Please read through the entire document, and if you wish to indicate your support for it, please fill in the required fields to sign it.</div>',
	'sign-error-nosuchdoc' => 'The document you requested ($1) does not exist.',
	'sign-realname'        => 'Name:',
	'sign-address'         => 'Street address:',
	'sign-city'            => 'City:',
	'sign-state'           => 'State:',
	'sign-zip'             => 'Zip code:',
	'sign-country'         => 'Country:',
	'sign-phone'           => 'Phone number:',
	'sign-bday'            => 'Age:',
	'sign-email'           => 'E-mail address:',
	'sign-indicates-req'   => '<small><i><font color="red">*</font> indicates required field.</i></small>',
	'sign-hide-note'       => '<small><i><font color="red">**</font> Note: Unlisted information will still be visible to moderators.</i></small>',
	'sign-list-anonymous'  => 'List anonymously',
	'sign-list-hideaddress'=> 'Do not list address',
	'sign-list-hideextaddress'=>'Do not list city, state, zip, or country',
	'sign-list-hidephone'  => 'Do not list phone',
	'sign-list-hidebday'   => 'Do not list age',
	'sign-list-hideemail'  => 'Do not list e-mail',
	'sign-submit'          => 'Sign document',
	'sign-information'     => '<div class="noarticletext">Thank you for taking the time to read through this document.
If you agree with it, please indicate your support by filling in the required fields below and clicking "Sign Document."
Please ensure that your personal information is correct and that we have some way to contact you to verify your identity.
Note that your IP address and other identifying information will be recorded by this form and used by moderators to eliminate duplicate signatures and confirm the correctness of your personal information.
As the use of open and anonymizing proxies inhibits our ability to perform this task, signatures from such proxies will likely not be counted.
If you are currently connected through a proxy server, please disconnect from it and use a standard connection while signing.</div>

$1',
	'sig-success'               => 'You have successfully signed the document.',
	'sign-view-selectfields'    => '<b>Fields to display:</b>',
	'sign-viewfield-entryid'    => 'Entry id',
	'sign-viewfield-timestamp'  => 'Timestamp',
	'sign-viewfield-realname'   => 'Name',
	'sign-viewfield-address'    => 'Address',
	'sign-viewfield-city'       => 'City',
	'sign-viewfield-state'      => 'State',
	'sign-viewfield-country'    => 'Country',
	'sign-viewfield-zip'        => 'Zip',
	'sign-viewfield-ip'         => 'IP address',
	'sign-viewfield-agent'      => 'User agent',
	'sign-viewfield-phone'      => 'Phone',
	'sign-viewfield-email'      => 'E-mail',
	'sign-viewfield-age'        => 'Age',
	'sign-viewfield-options'    => 'Options',
	'sign-viewsigs-intro'       => 'Shown below are the signatures recorded for <span class="plainlinks">[{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} $1]</span>.',
	'sign-sigadmin-currentlyopen'=>'Signing is currently enabled for this document.',
	'sign-sigadmin-close'       => 'Disable signing',
	'sign-sigadmin-currentlyclosed'=>'Signing is currently disabled for this document.',
	'sign-sigadmin-open'        => 'Enable signing',
	'sign-signatures'           => 'Signatures',
	'sign-sigadmin-closesuccess'=> 'Signing successfully disabled.',
	'sign-sigadmin-opensuccess' => 'Signing successfully enabled.',
	'sign-viewsignatures'       => 'view signatures',
	'sign-closed'               => 'closed',
	'sign-error-closed'         => 'Signing of this document is currently disabled.',
	'sig-anonymous'             => '<i>Anonymous</i>',
	'sig-private'               => '<i>Private</i>',
	'sign-sigdetails'           => 'Signature details',
	'sign-emailto'              => '<a href="mailto:$1">$1</a>',
	'sign-iptools'              => '<span class="plainlinksneverexpand"><!--
-->[[User:$1|$1]] ([[User talk:$1|talk]] • <!--
-->[[Special:Contributions/$1|contribs]] • <!--
-->[http://www.dnsstuff.com/tools/whois.ch?domain={{urlencode:$1}}&cache=off&email=on WHOIS] • <!--
-->[http://www.dnsstuff.com/tools/ptr.ch?ip={{urlencode:$1}}&cache=off&email=on RDNS] • <!--
-->[http://www.robtex.com/rbls/$1.html RBLs] • <!--
-->[[Special:Blockip/$1|block user]] • <!--
-->[{{fullurl:Special:Log/block|page=User:{{urlencode:$1}}}} block log] • <!--
-->[{{fullurl:Special:CheckUser|ip={{urlencode:$1}}}} checkip])<!--
--></span>',
	'sign-viewfield-stricken'      => 'Stricken',
	'sign-viewfield-reviewedby'    => 'Reviewer',
	'sign-viewfield-reviewcomment' => 'Comment',
	'sign-detail-uniquequery'      => 'Similar entities',
	'sign-detail-uniquequery-run'  => 'Run query',
	'sign-detail-strike'           => 'Strike signature',
	'sign-reviewsig'               => 'Review signature',
	'sign-review-comment'          => 'Comment',
	'sign-submitreview'            => 'Submit review',
	'sign-uniquequery-similarname' => 'Similar name',
	'sign-uniquequery-similaraddress'=> 'Similar address',
	'sign-uniquequery-similarphone'=> 'Similar phone',
	'sign-uniquequery-similaremail'=> 'Similar email',
	'sign-uniquequery-1signed2'    => '[{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs&detail=$3}} $1] signed [{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs}} $2].',
);

/** Afrikaans (Afrikaans)
 * @author SPQRobin
 */
$messages['af'] = array(
	'sign-realname'           => 'Naam:',
	'sign-city'               => 'Stad:',
	'sign-viewfield-realname' => 'Naam',
	'sign-viewfield-city'     => 'Stad',
);

$messages['ang'] = array(
	'sign-realname' => 'Nama:',
);

/** Arabic (العربية)
 * @author Meno25
 * @author ترجمان05
 * @author Siebrand
 */
$messages['ar'] = array(
	'signdocument'                    => 'توقيع الوثيقة',
	'sign-nodocselected'              => 'من فضلك اختر الوثيقة التي تود توقيعها.',
	'sign-selectdoc'                  => 'وثيقة:',
	'sign-docheader'                  => '<div class="noarticletext">من فضلك استخدم هذه الاستمارة لتوقيع الوثيقة "[[$1]]," المعروضة بالأسفل. من فضلك اقرأ الوثيقة كلها، وإذا كنت تود التعبير عن تأييدك لها، من فضلك املأ الحقول المطلوبة لتوقعها.</div>',
	'sign-error-nosuchdoc'            => 'الوثيقة التي طلبتها ($1) غير موجودة.',
	'sign-realname'                   => 'الاسم:',
	'sign-address'                    => 'عنوان الشارع:',
	'sign-city'                       => 'المدينة:',
	'sign-state'                      => 'الولاية:',
	'sign-zip'                        => 'كود الرقم البريدي:',
	'sign-country'                    => 'البلد:',
	'sign-phone'                      => 'رقم الهاتف:',
	'sign-bday'                       => 'العمر:',
	'sign-email'                      => 'عنوان البريد الإلكتروني:',
	'sign-indicates-req'              => '<small><i><font color="red">*</font> يشير إلى حقل مطلوب.</i></small>',
	'sign-hide-note'                  => '<small><i><font color="red">**</font> ملاحظة: المعلومات غير المعروضة ستظل مرئية للمديرين.</i></small>',
	'sign-list-anonymous'             => 'عرض المجهول',
	'sign-list-hideaddress'           => 'لا تعرض العنوان',
	'sign-list-hideextaddress'        => 'لا تعرض المدينة، الولاية، الرقم البريدي، أو البلد',
	'sign-list-hidephone'             => 'لا تعرض الهاتف',
	'sign-list-hidebday'              => 'لا تعرض العمر',
	'sign-list-hideemail'             => 'لا تعرض البريد الإلكتروني',
	'sign-submit'                     => 'توقيع الوثيقة',
	'sign-information'                => '<div class="noarticletext">شكرا لك لقضائك وقتا في قراءة هذه الوثيقة. لو أنك تتفق معها، من فضلك عبر عن تأييدك بواسطة ملأ الحقول المطلوبة بالأسفل وضغط "توقيع الوثيقة." من فضلك تأكد من أن معلوماتك الشخصية صحيحة وأننا نملك وسيلة للاتصال بك للتأكد من هويتك. لاحظ أن عنوان الأيبي الخاص بك و other معلومات التعريف الأخرى سيتم تسجيلها بواسطة هذه الاستمارة وسيتم استخدامها بواسطة المديرين لتحجيم التوقيعات المكررة وتأكيد صحة معلوماتك الشخصية. بما أن استخدام البروكسيهات المجهولة والمفتوحة يمنع قدرتنا على أداء هذه المهمة، التوقيعات من هذه البروكسيهات على الأرجح لن يتم احتسابها. لو أنك موصول حاليا بواسطة خادم بروكسي، من فضلك اقطع التوصيل منه واستخدم اتصالا قياسيا أثناء التوقيع.</div>

$1',
	'sig-success'                     => 'لقد وقعت الوثيقة بنجاح.',
	'sign-view-selectfields'          => '<b>الحقول للعرض:</b>',
	'sign-viewfield-entryid'          => 'رقم المدخلة',
	'sign-viewfield-timestamp'        => 'طابع الزمن',
	'sign-viewfield-realname'         => 'اسم',
	'sign-viewfield-address'          => 'عنوان',
	'sign-viewfield-city'             => 'مدينة',
	'sign-viewfield-state'            => 'ولاية',
	'sign-viewfield-country'          => 'بلد',
	'sign-viewfield-zip'              => 'الرقم البريدي',
	'sign-viewfield-ip'               => 'عنوان الأيبي',
	'sign-viewfield-agent'            => 'وكيل المستخدم',
	'sign-viewfield-phone'            => 'هاتف',
	'sign-viewfield-email'            => 'بريد إلكتروني',
	'sign-viewfield-age'              => 'عمر',
	'sign-viewfield-options'          => 'اختيارات',
	'sign-viewsigs-intro'             => 'معروض بالأسفل التوقيعات المسجلة ل<span class="plainlinks">[{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} $1]</span>.',
	'sign-sigadmin-currentlyopen'     => 'التوقيع مفعل حاليا لهذه الوثيقة.',
	'sign-sigadmin-close'             => 'عطل التوقيع',
	'sign-sigadmin-currentlyclosed'   => 'التوقيع معطل حاليا لهذه الوثيقة.',
	'sign-sigadmin-open'              => 'فعل التوقيع',
	'sign-signatures'                 => 'توقيعات',
	'sign-sigadmin-closesuccess'      => 'تم تعطيل التوقيع بنجاح.',
	'sign-sigadmin-opensuccess'       => 'تم تفعيل التوقيع بنجاح.',
	'sign-viewsignatures'             => 'عرض التوقيعات',
	'sign-closed'                     => 'مغلق',
	'sign-error-closed'               => 'توقيع هذه الوثيقة معطل حاليا.',
	'sig-anonymous'                   => '<i>مجهول</i>',
	'sig-private'                     => '<i>خاص</i>',
	'sign-sigdetails'                 => 'تفاصيل التوقيع',
	'sign-emailto'                    => '<a href="mailto:$1">$1</a>',
	'sign-iptools'                    => '<div dir="rtl">
<span class="plainlinksneverexpand"><!--
-->[[User:$1|$1]] ([[User talk:$1|نقاش]] • <!--
-->[[Special:Contributions/$1|مساهمات]] • <!--
-->[http://www.dnsstuff.com/tools/whois.ch?domain={{urlencode:$1}}&cache=off&email=on WHOIS] • <!--
-->[http://www.dnsstuff.com/tools/ptr.ch?ip={{urlencode:$1}}&cache=off&email=on RDNS] • <!--
-->[http://www.robtex.com/rbls/$1.html RBLs] • <!--
-->[[Special:Blockip/$1|منع المستخدم]] • <!--
-->[{{fullurl:Special:Log/block|page=User:{{urlencode:$1}}}} سجل المنع] • <!--
-->[{{fullurl:Special:CheckUser|ip={{urlencode:$1}}}} تدقيق الأيبي])<!--
--></span>',
	'sign-viewfield-stricken'         => 'مشطوب',
	'sign-viewfield-reviewedby'       => 'مراجع',
	'sign-viewfield-reviewcomment'    => 'تعليق',
	'sign-detail-uniquequery'         => 'كيانات مشابهة',
	'sign-detail-uniquequery-run'     => 'تنفيذ الكويري',
	'sign-detail-strike'              => 'شطب التوقيع',
	'sign-reviewsig'                  => 'راجع التوقيع',
	'sign-review-comment'             => 'تعليق',
	'sign-submitreview'               => 'تنفيذ المراجعة',
	'sign-uniquequery-similarname'    => 'اسم مشابه',
	'sign-uniquequery-similaraddress' => 'عنوان مشابه',
	'sign-uniquequery-similarphone'   => 'هاتف مشابه',
	'sign-uniquequery-similaremail'   => 'بريد إلكتروني مشابه',
	'sign-uniquequery-1signed2'       => '[{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs&detail=$3}} $1] وقع [{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs}} $2].',
);

$messages['bcl'] = array(
	'signdocument' => 'Pirmahan an Dokumento',
	'sign-selectdoc' => 'Dokumento:',
	'sign-realname' => 'Pangaran:',
	'sign-city' => 'Ciudad:',
	'sign-country' => 'Nacion:',
	'sign-viewfield-realname' => 'Pangaran',
	'sign-viewfield-address' => 'Istaran',
	'sign-viewfield-city' => 'Ciudad',
	'sign-viewfield-country' => 'Nacion',
	'sign-viewfield-age' => 'Edad',
	'sign-viewfield-reviewcomment' => 'Komento',
	'sign-review-comment' => 'Komento',
);

/** Bulgarian (Български)
 * @author DCLXVI
 * @author Siebrand
 */
$messages['bg'] = array(
	'sign-selectdoc'               => 'Документ:',
	'sign-error-nosuchdoc'         => 'Документът, който пожелахте ($1) не съществува.',
	'sign-realname'                => 'Име:',
	'sign-address'                 => 'Адрес:',
	'sign-city'                    => 'Град:',
	'sign-zip'                     => 'Пощенски код:',
	'sign-country'                 => 'Държава:',
	'sign-phone'                   => 'Телефонен номер:',
	'sign-bday'                    => 'Възраст:',
	'sign-email'                   => 'Адрес за е-поща:',
	'sign-indicates-req'           => '<small><i><font color="red">*</font> задължително поле</i></small>',
	'sign-view-selectfields'       => '<b>Полета за показване:</b>',
	'sign-viewfield-realname'      => 'Име',
	'sign-viewfield-address'       => 'Адрес',
	'sign-viewfield-city'          => 'Град',
	'sign-viewfield-country'       => 'Държава',
	'sign-viewfield-zip'           => 'Пощенски код',
	'sign-viewfield-ip'            => 'IP адрес',
	'sign-viewfield-phone'         => 'Телефон',
	'sign-viewfield-email'         => 'Е-поща',
	'sign-viewfield-age'           => 'Възраст',
	'sign-viewfield-options'       => 'Настройки',
	'sign-emailto'                 => '<a href="mailto:$1">$1</a>',
	'sign-iptools'                 => '<span class="plainlinksneverexpand"><!--
-->[[User:$1|$1]] ([[User talk:$1|беседа]] • <!--
-->[[Special:Contributions/$1|приноси]] • <!--
-->[http://www.dnsstuff.com/tools/whois.ch?domain={{urlencode:$1}}&cache=off&email=on WHOIS] • <!--
-->[http://www.dnsstuff.com/tools/ptr.ch?ip={{urlencode:$1}}&cache=off&email=on RDNS] • <!--
-->[http://www.robtex.com/rbls/$1.html RBLs] • <!--
-->[[Special:Blockip/$1|блокиране]] • <!--
-->[{{fullurl:Special:Log/block|page=User:{{urlencode:$1}}}} дневник на блокиранията] • <!--
-->[{{fullurl:Special:CheckUser|ip={{urlencode:$1}}}} проверка])<!--
--></span>',
	'sign-viewfield-reviewcomment' => 'Коментар',
	'sign-review-comment'          => 'Коментар',
);

/** Danish (Dansk)
 * @author Jon Harald Søby
 */
$messages['da'] = array(
	'sign-realname'           => 'Navn:',
	'sign-city'               => 'By:',
	'sign-country'            => 'Land:',
	'sign-viewfield-realname' => 'Navn',
	'sign-viewfield-city'     => 'By',
	'sign-viewfield-country'  => 'Land',
	'sign-viewfield-ip'       => 'IP-adresse',
	'sign-viewfield-email'    => 'E-mail',
	'sig-private'             => '<i>Privat</i>',
);

/** Greek (Ελληνικά)
 * @author Consta
 */
$messages['el'] = array(
	'sign-realname'                   => 'Όνομα:',
	'sign-city'                       => 'Πόλη:',
	'sign-country'                    => 'Χώρα:',
	'sign-phone'                      => 'Αριθμός τηλεφώνου:',
	'sign-bday'                       => 'Ηλικία:',
	'sign-email'                      => 'Διεύθυνση ηλεκτρονικού ταχυδρομείου:',
	'sign-viewfield-realname'         => 'Όνομα',
	'sign-viewfield-address'          => 'Διεύθυνση',
	'sign-viewfield-city'             => 'Πόλη',
	'sign-viewfield-country'          => 'Χώρα',
	'sign-viewfield-phone'            => 'Τηλέφωνο',
	'sign-viewfield-email'            => 'Ηλεκτρονικό ταχυδρομείο',
	'sign-viewfield-age'              => 'Ηλικία',
	'sign-viewfield-options'          => 'Επιλογές',
	'sign-signatures'                 => 'Υπογραφές',
	'sig-anonymous'                   => '<i>Ανώνυμος</i>',
	'sign-viewfield-reviewcomment'    => 'Σχόλιο',
	'sign-review-comment'             => 'Σχόλιο',
	'sign-uniquequery-similarname'    => 'Παρόμοιο όνομα',
	'sign-uniquequery-similaraddress' => 'Παρόμοια διεύθυνση',
	'sign-uniquequery-similarphone'   => 'Παρόμοιο τηλέφωνο',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'sign-selectdoc'               => 'Dosiero:',
	'sign-realname'                => 'Nomo:',
	'sign-address'                 => 'Adreso:',
	'sign-city'                    => 'Urbo:',
	'sign-state'                   => 'Ŝtato:',
	'sign-zip'                     => 'Poŝta kodo:',
	'sign-country'                 => 'Lando:',
	'sign-bday'                    => 'Aĝo:',
	'sign-email'                   => 'Retpoŝta adreso:',
	'sign-list-hideaddress'        => 'Ne listigu adreson',
	'sign-list-hidephone'          => 'Ne listigu nombron de telefono',
	'sign-list-hideemail'          => 'Ne listigu retadreson',
	'sign-view-selectfields'       => '<b>Kampoj montri:</b>',
	'sign-viewfield-realname'      => 'Nomo',
	'sign-viewfield-address'       => 'Adreso',
	'sign-viewfield-city'          => 'Urbo',
	'sign-viewfield-state'         => 'Ŝtato',
	'sign-viewfield-country'       => 'Lando',
	'sign-viewfield-zip'           => 'Poŝta kodo',
	'sign-viewfield-ip'            => 'IP-adreso',
	'sign-viewfield-email'         => 'Retadreso',
	'sign-viewfield-age'           => 'Aĝo',
	'sign-closed'                  => 'fermita',
	'sig-anonymous'                => '<i>Anonima</i>',
	'sig-private'                  => '<i>Privata</i>',
	'sign-emailto'                 => '<a href="mailto:$1">$1</a>',
	'sign-viewfield-reviewedby'    => 'Kontrolanto',
	'sign-viewfield-reviewcomment' => 'Komento',
	'sign-review-comment'          => 'Komento',
);

$messages['ext'] = array(
	'sign-selectdoc' => 'Decumentu:',
	'sign-error-nosuchdoc' => 'El decumentu que piisti ($1) nu desisti.',
	'sign-realname' => 'Nombri:',
	'sign-city' => 'Ciá:',
	'sign-state' => 'Estau:',
	'sign-country' => 'Pais:',
	'sign-viewfield-realname' => 'Nombri',
	'sign-viewfield-city' => 'Ciá',
	'sign-viewfield-state' => 'Estau',
	'sign-viewfield-country' => 'Pais',
	'sign-viewfield-options' => 'Ocionis',
	'sign-signatures' => 'Firmas',
	'sign-closed' => 'afechau',
);

/** French (Français)
 * @author Sherbrooke
 * @author Urhixidur
 * @author Grondin
 */
$messages['fr'] = array(
	'signdocument'                    => 'Authentifier le document',
	'sign-nodocselected'              => 'Prière de choisir le document que vous voulez authentifier',
	'sign-selectdoc'                  => 'Document :',
	'sign-docheader'                  => '<div class="noarticletext">Prière d\'utiliser ce formulaire pour authentifier le document « [[$1]] » affichée ci-dessous. Lire le document au complet, et si vous souhaitez signifier votre appui, remplir les champs pour l\'authentifier.</div>',
	'sign-error-nosuchdoc'            => "Le document demandé ($1) n'existe pas.",
	'sign-realname'                   => 'Nom :',
	'sign-address'                    => 'Adresse rue :',
	'sign-city'                       => 'Ville :',
	'sign-state'                      => 'État, département ou province :',
	'sign-zip'                        => 'Code postal :',
	'sign-country'                    => 'Pays :',
	'sign-phone'                      => 'Numéro de téléphone :',
	'sign-bday'                       => 'Âge :',
	'sign-email'                      => 'Adresse de courriel :',
	'sign-indicates-req'              => '<small><i><font color="red">*</font> indique les champs obligatoires.</i></small>',
	'sign-hide-note'                  => '<small><i><font color="red">**</font> Les informations non listées sont toujours visibles pour les modérateurs.</i></small>',
	'sign-list-anonymous'             => 'Lister de façon anonyme',
	'sign-list-hideaddress'           => "Ne pas lister l'adresse",
	'sign-list-hideextaddress'        => "Ne pas lister la ville, l'état (le département ou la province), le code postal ou le pays",
	'sign-list-hidephone'             => 'Ne pas lister le numéro de téléphone',
	'sign-list-hidebday'              => "Ne pas lister l'âge",
	'sign-list-hideemail'             => "Ne pas lister l'adresse de courriel",
	'sign-submit'                     => 'Authentifier le document',
	'sign-information'                => '<div class="noarticletext">Merci d’avoir complètement lu ce document. Si vous êtes d’accord avec son contenu, signifiez votre appui en remplissant les champs requis ci-dessous et en cliquant « Authentifier document ». Prière de vérifier que vos informations personnelles sont exactes et que nous possédons un moyen de vous contacter pour valider votre identité. Votre adresse IP et d’autres informations qui peuvent vous identifier sont notées et seront utilisées par les modérateurs pour éliminer les signatures en doublon et confirmer les informations saisies. Les mandataires (proxys) ne nous permettant pas d’identifier à coup sûr le signataire, les signatures obtenues à travers ceux-ci ne seront probablement pas comptées. Si vous êtes connecté à travers un mandataire, prière d’utiliser un compte qui n’en utilise pas.</div>

$1',
	'sig-success'                     => 'Vous avez authentifié le document.',
	'sign-view-selectfields'          => "'''Champs à afficher :'''",
	'sign-viewfield-entryid'          => "ID de l'entrée",
	'sign-viewfield-timestamp'        => 'Date et heure',
	'sign-viewfield-realname'         => 'Nom',
	'sign-viewfield-address'          => 'Adresse',
	'sign-viewfield-city'             => 'Ville',
	'sign-viewfield-state'            => 'État (département ou province)',
	'sign-viewfield-country'          => 'Pays',
	'sign-viewfield-zip'              => 'Code postal',
	'sign-viewfield-ip'               => 'Adresse IP',
	'sign-viewfield-agent'            => 'Agent utilisateur',
	'sign-viewfield-phone'            => 'Numéro de téléphone',
	'sign-viewfield-email'            => 'Adresse de courriel',
	'sign-viewfield-age'              => 'Âge',
	'sign-viewfield-options'          => 'Options',
	'sign-viewsigs-intro'             => 'CI-dessous apparaissent les signatures enrgistrées pour <span class="plainlinks">[{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} $1]</span>.',
	'sign-sigadmin-currentlyopen'     => "L'authentification est présentement activée pour ce document.",
	'sign-sigadmin-close'             => "Désactiver l'authentification",
	'sign-sigadmin-currentlyclosed'   => "L'authentification est présentement désactivée pour ce document.",
	'sign-sigadmin-open'              => "Activer l'authentification",
	'sign-signatures'                 => 'Signatures',
	'sign-sigadmin-closesuccess'      => "L'authentification est désactivée.",
	'sign-sigadmin-opensuccess'       => "L'authentification est activée.",
	'sign-viewsignatures'             => 'Voir les signatures',
	'sign-closed'                     => 'fermée',
	'sign-error-closed'               => "L'authentification de ce document est présentée désactivée.",
	'sig-anonymous'                   => "''Anonymement''",
	'sig-private'                     => "''Privé''",
	'sign-sigdetails'                 => 'Détails de la signature',
	'sign-emailto'                    => '<a href="mailto:$1">$1</a>',
	'sign-iptools'                    => '<span class="plainlinksneverexpand"><!--
-->[[User:$1|$1]] ([[User talk:$1|Discussion]] • <!--
-->[[Special:Contributions/$1|Contributions]] • <!--
-->[http://www.dnsstuff.com/tools/whois.ch?domain={{urlencode:$1}}&cache=off&email=on WHOIS] • <!--
-->[http://www.dnsstuff.com/tools/ptr.ch?ip={{urlencode:$1}}&cache=off&email=on RDNS] • <!--
-->[http://www.robtex.com/rbls/$1.html RBLs] • <!--
-->[[Special:Blockip/$1|Bloquer l\'utisateur]] • <!--
-->[{{fullurl:Special:Log/block|page=User:{{urlencode:$1}}}} Journal des blocages] • <!--
-->[{{fullurl:Special:CheckUser|ip={{urlencode:$1}}}} Vérification d\'utilisateur])<!--
--></span>',
	'sign-viewfield-stricken'         => 'Biffé',
	'sign-viewfield-reviewedby'       => 'Réviseur',
	'sign-viewfield-reviewcomment'    => 'Commentaire',
	'sign-detail-uniquequery'         => 'Entités semblables',
	'sign-detail-uniquequery-run'     => 'Lancer la requête',
	'sign-detail-strike'              => 'Biffer la signature',
	'sign-reviewsig'                  => 'Réviser la signature',
	'sign-review-comment'             => 'Commentaire',
	'sign-submitreview'               => 'Soumettre la révision',
	'sign-uniquequery-similarname'    => 'Nom semblable',
	'sign-uniquequery-similaraddress' => 'Adresse semblable',
	'sign-uniquequery-similarphone'   => 'Numéro de téléphone semblable',
	'sign-uniquequery-similaremail'   => 'Adresse de courriel semblable',
	'sign-uniquequery-1signed2'       => '[{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs&detail=$3}} $1] a authentifié [{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs}} $2].',
);

/** Galician (Galego)
 * @author Xosé
 * @author Alma
 * @author Siebrand
 */
$messages['gl'] = array(
	'signdocument'                    => 'Asine o Documento',
	'sign-nodocselected'              => 'Seleccione o documento que vostede quere asinar.',
	'sign-selectdoc'                  => 'Documento:',
	'sign-docheader'                  => '<div class="noarticletext">Use este formulario para asinar o documento "[[$1]],", amosado a continuación. Lea o documento enteiro, e se desexa indicar o seu apoio o mesmo, encha os campos necesarios para asinalo.</div>',
	'sign-error-nosuchdoc'            => 'O documento que vostede pediu ($1) non existe.',
	'sign-realname'                   => 'Nome:',
	'sign-address'                    => 'Enderezo postal:',
	'sign-city'                       => 'Cidade:',
	'sign-state'                      => 'Estado:',
	'sign-zip'                        => 'Código postal:',
	'sign-country'                    => 'País:',
	'sign-phone'                      => 'Número de teléfono:',
	'sign-bday'                       => 'Idade:',
	'sign-email'                      => 'Enderezo de correo electrónico:',
	'sign-indicates-req'              => '<small><i><font color="red">*</font> indica campo requirido.</i></small>',
	'sign-hide-note'                  => '<small><i><font color="red">**</font> Nota: a información non listada poderana ver, porén, os moderadores.</i></small>',
	'sign-list-anonymous'             => 'Listar anonimamente',
	'sign-list-hideaddress'           => 'Non listar o enderezo',
	'sign-list-hideextaddress'        => 'Non listar cidade, estado/provincia, código postal ou país',
	'sign-list-hidephone'             => 'Non listar o teléfono',
	'sign-list-hidebday'              => 'Non listar a idade',
	'sign-list-hideemail'             => 'Non listar o enderezo de correo electrónico',
	'sign-submit'                     => 'Asinar o documento',
	'sign-information'                => '<div class="noarticletext">Grazas por botar un tempo a ler este documento. Se está de acordo con el, indique o seu apoio enchendo os campos requiridos de embaixo e prema en "Asinar Documento". Asegúrese de que a súa información persoal é correcta e de que ten maneira de ser contactado para verificar a súa identidade. Observe que o seu enderezo IP e outra información identificativa serán gardados con este formulario e usados polos moderadores para eliminar sinaturas duplicadas e confirmar que a súa información persoal é correcta. Dado que o uso de proxies abertos e que permitan o anonimato dificulta a nosa capacidade de realizar esta tarefa, as sinaturas desde eses proxies probabelmente non se teñan en conta. Se está conectado neste momento a través dun servidor proxy, desconéctese del e use unha conexión normal ao asinar.</div>

$1',
	'sig-success'                     => 'Asinou o documento sen problemas.',
	'sign-view-selectfields'          => '<b>Campos a mostrar:</b>',
	'sign-viewfield-entryid'          => 'ID da entrada',
	'sign-viewfield-timestamp'        => 'Selo temporal',
	'sign-viewfield-realname'         => 'Nome',
	'sign-viewfield-address'          => 'Enderezo',
	'sign-viewfield-city'             => 'Cidade',
	'sign-viewfield-state'            => 'Estado/Provincia',
	'sign-viewfield-country'          => 'País',
	'sign-viewfield-zip'              => 'Código postal',
	'sign-viewfield-ip'               => 'Enderezo IP',
	'sign-viewfield-agent'            => 'Axente de usuario',
	'sign-viewfield-phone'            => 'Teléfono',
	'sign-viewfield-email'            => 'Correo electrónico',
	'sign-viewfield-age'              => 'Idade',
	'sign-viewfield-options'          => 'Opcións',
	'sign-viewsigs-intro'             => 'Abaixo amósanse as sinaturas gardadas para <span class="plainlinks">[{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} $1]</span>.',
	'sign-sigadmin-currentlyopen'     => 'Actualmente están habilitadas as sinaturas para este documento.',
	'sign-sigadmin-close'             => 'Desactivar as sinaturas',
	'sign-sigadmin-currentlyclosed'   => 'Actualmente están desactivadas as sinaturas para este documento.',
	'sign-sigadmin-open'              => 'Activar as sinaturas',
	'sign-signatures'                 => 'Sinaturas',
	'sign-sigadmin-closesuccess'      => 'As sinaturas desactiváronse sen problemas.',
	'sign-sigadmin-opensuccess'       => 'As sinaturas activáronse sen problemas.',
	'sign-viewsignatures'             => 'ver as sinaturas',
	'sign-closed'                     => 'fechado',
	'sign-error-closed'               => 'Actualmente están desactivadas as sinaturas neste documento.',
	'sig-anonymous'                   => '<i>Anónimo</i>',
	'sig-private'                     => '<i>Privado</i>',
	'sign-sigdetails'                 => 'Detalles da sinatura',
	'sign-emailto'                    => '<a href="mailto:$1">$1</a>',
	'sign-iptools'                    => '<span class="plainlinksneverexpand"><!--
-->[[User:$1|$1]] ([[User talk:$1|talk]] • <!--
-->[[Special:Contributions/$1|contribucións]] • <!--
-->[http://www.dnsstuff.com/tools/whois.ch?domain={{urlencode:$1}}&cache=off&email=on WHOIS] • <!--
-->[http://www.dnsstuff.com/tools/ptr.ch?ip={{urlencode:$1}}&cache=off&email=on RDNS] • <!--
-->[http://www.robtex.com/rbls/$1.html RBLs] • <!--
-->[[Special:Blockip/$1|bloquear usuario]] • <!--
-->[{{fullurl:Special:Log/block|page=User:{{urlencode:$1}}}} bloquear rexistro] • <!--
-->[{{fullurl:Special:CheckUser|ip={{urlencode:$1}}}} comprobar IP])<!--
--></span>',
	'sign-viewfield-stricken'         => 'Tachado',
	'sign-viewfield-reviewedby'       => 'Revisor',
	'sign-viewfield-reviewcomment'    => 'Comentario',
	'sign-detail-uniquequery'         => 'Entidades semellantes',
	'sign-detail-uniquequery-run'     => 'Executar consulta',
	'sign-detail-strike'              => 'Tachar a sinatura',
	'sign-reviewsig'                  => 'Revisar a sinatura',
	'sign-review-comment'             => 'Comentario',
	'sign-submitreview'               => 'Enviar revisión',
	'sign-uniquequery-similarname'    => 'Nome parecido',
	'sign-uniquequery-similaraddress' => 'Enderezo parecido',
	'sign-uniquequery-similarphone'   => 'Teléfono parecido',
	'sign-uniquequery-similaremail'   => 'Correo electrónico parecido',
	'sign-uniquequery-1signed2'       => '[{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs&detail=$3}} $1] asinado [{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs}} $2].',
);

/** Gujarati (ગુજરાતી)
 * @author Dsvyas
 */
$messages['gu'] = array(
	'sign-realname' => 'નામ:',
	'sign-address'  => 'સરનામુ:',
	'sign-city'     => 'શહેર/નગરઃ',
	'sign-state'    => 'રાજ્ય:',
	'sign-zip'      => 'પોસ્ટ કોડ:',
	'sign-country'  => 'દેશ:',
	'sign-phone'    => 'દુરભાષઃ',
	'sign-bday'     => 'ઉંમરઃ',
	'sign-email'    => 'ઇ મેલ:',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 */
$messages['hi'] = array(
	'sign-realname'                => 'नाम:',
	'sign-email'                   => 'इ-मेल एड्रेस:',
	'sign-viewfield-realname'      => 'नाम',
	'sign-viewfield-ip'            => 'आइपी एड्रेस',
	'sign-viewfield-email'         => 'इ-मेल',
	'sign-viewfield-options'       => 'विकल्प',
	'sign-viewfield-reviewcomment' => 'टिप्पणी',
	'sign-review-comment'          => 'टिप्पणी',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 * @author Siebrand
 */
$messages['hsb'] = array(
	'signdocument'                    => 'Dokument podpisać',
	'sign-nodocselected'              => 'Prošu wubjer dokument, kotryž chceš podpisać.',
	'sign-selectdoc'                  => 'Dokument:',
	'sign-docheader'                  => '<div class="noarticletext">Prošu wužij tutón formular, zo by dokument podpisał "[[$1]]," kotryž deleka steji. Prošu přečitaj cyły dokument, a jeli chceš jón podpěrać, wupjelń prošu trěbne pola a podpisaj jón.</div>',
	'sign-error-nosuchdoc'            => 'Dokument, kotryž sy požadał ($1) njeeksistuje.',
	'sign-realname'                   => 'Mjeno:',
	'sign-address'                    => 'Hasa:',
	'sign-city'                       => 'Město:',
	'sign-state'                      => 'Stat:',
	'sign-zip'                        => 'Póstowe wodźenske čisło:',
	'sign-country'                    => 'Kraj:',
	'sign-phone'                      => 'Telefonowe čisło:',
	'sign-bday'                       => 'Staroba:',
	'sign-email'                      => 'E-mejlowa adresa:',
	'sign-indicates-req'              => '<small><i><font color="red">*</font> trěbne polo poznamjenja.</i></small>',
	'sign-hide-note'                  => '<small><i><font color="red">**</font> Kedźbu: Njenalistowane informacije budu hišće moderatoram widźomne być.</i></small>',
	'sign-list-anonymous'             => 'Anonymnje nalistować',
	'sign-list-hideaddress'           => 'Njenalistuj adresu',
	'sign-list-hideextaddress'        => 'Njenalistuj město, stat, póstowe wodźenske čisło abo kraj',
	'sign-list-hidephone'             => 'Njenalistuj telefonowe čisło',
	'sign-list-hidebday'              => 'Njenalistuj starobu',
	'sign-list-hideemail'             => 'Njenalistuj e-mejlowu adresu',
	'sign-submit'                     => 'Dokument podpisać',
	'sign-information'                => '<div class="noarticletext">Dźakujemy so, zo sej bjerješ čas, zo by tutón dokument přečitał. Jeli sy z nim přezjedny, wupjelń trěbne pola a klikń na "Dokument podpisać", zo by swoje podpěru pokazał. Prošu zawěsć sej, zo twoje wosobinske informacije su korektne a podaj móžnosć, z kotrejž móžemy će skontaktować, zo bychmy twoju identitu přepruwowali. Wobkedźbuj, zo twoja IP-adresa a druhe identifikowace informacije budu so z tutym formularom registrować a wot moderatorow wužiwać, zo bychu dwójne podpisy wotstronili a korektnosć twojich wosobinskich informacijow potwjerdźili. Dokelž wotewrjene a anonymizowace proksy wobmjezuja našu kmanosć tutón nadawk wuwjesć, njebudu so podpisy z tajkich proksy najskerje ličić. Jeli sy tuchwilu přez proksy-serwer zwjazany, rozdźěl tutón zwjazk a wutwar standardny zwjazk za podpisowanje.</div>

$1',
	'sig-success'                     => 'Sy dokument wuspěšnje podpisał.',
	'sign-view-selectfields'          => '<b>Pola, kotrež maja so zwobraznić:</b>',
	'sign-viewfield-entryid'          => 'ID zapiska',
	'sign-viewfield-timestamp'        => 'Časowy kołk',
	'sign-viewfield-realname'         => 'Mjeno',
	'sign-viewfield-address'          => 'Adresa',
	'sign-viewfield-city'             => 'Město',
	'sign-viewfield-state'            => 'Stat',
	'sign-viewfield-country'          => 'Kraj',
	'sign-viewfield-zip'              => 'Póstowe wodźenske čisło',
	'sign-viewfield-ip'               => 'IP-adresa',
	'sign-viewfield-agent'            => 'User agent',
	'sign-viewfield-phone'            => 'Telefonowe čisło',
	'sign-viewfield-email'            => 'E-mejl',
	'sign-viewfield-age'              => 'Staroba',
	'sign-viewfield-options'          => 'Opcije',
	'sign-viewsigs-intro'             => 'Deleka su podpisy, kotrež buchu za <span class="plainlinks">[{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} $1] zregistrowane.',
	'sign-sigadmin-currentlyopen'     => 'Podpisanje je tuchwilu za tutón dokument zmóžnjene.',
	'sign-sigadmin-close'             => 'Podpisanje znjemóžnić',
	'sign-sigadmin-currentlyclosed'   => 'Podpisanje je tuchwilu za tutón dokument znjemóžnjene.',
	'sign-sigadmin-open'              => 'Podpisanje zmóžnić',
	'sign-signatures'                 => 'Podpisy',
	'sign-sigadmin-closesuccess'      => 'Podpisanje wuspěšnje znjemóžnjene.',
	'sign-sigadmin-opensuccess'       => 'Podpisanje wuspěšnje zmóžnjene.',
	'sign-viewsignatures'             => 'Podpisy sej wobhladać',
	'sign-closed'                     => 'začinjeny',
	'sign-error-closed'               => 'Podpisanje tutoho dokumenta je tuchwilu znjemóžnjene.',
	'sig-anonymous'                   => '<i>Anonymny</i>',
	'sig-private'                     => '<i>Priwatny</i>',
	'sign-sigdetails'                 => 'Podrobnosće podpisanja',
	'sign-emailto'                    => '<a href="mailto:$1">$1</a>',
	'sign-iptools'                    => '<span class="plainlinksneverexpand"><!--
-->[[User:$1|$1]] ([[User talk:$1|Diskusija]] • <!--
-->[[Special:Contributions/$1|Přinoški]] • <!--
-->[http://www.dnsstuff.com/tools/whois.ch?domain={{urlencode:$1}}&cache=off&email=on WHOIS] • <!--
-->[http://www.dnsstuff.com/tools/ptr.ch?ip={{urlencode:$1}}&cache=off&email=on RDNS] • <!--
-->[http://www.robtex.com/rbls/$1.html RBLs] • <!--
-->[[Special:Blockip/$1|Wužiwarja blokować]] • <!--
-->[{{fullurl:Special:Log/block|page=User:{{urlencode:$1}}}} Protokol blokowanja] • <!--
-->[{{fullurl:Special:CheckUser|ip={{urlencode:$1}}}} checkip])<!--
--></span>',
	'sign-viewfield-stricken'         => 'Wušmórnjeny',
	'sign-viewfield-reviewedby'       => 'Pruwowar',
	'sign-viewfield-reviewcomment'    => 'Komentar',
	'sign-detail-uniquequery'         => 'Podobne entity',
	'sign-detail-uniquequery-run'     => 'Wotprašenje startować',
	'sign-detail-strike'              => 'Podpis šmórnyć',
	'sign-reviewsig'                  => 'Podpis přepruwować',
	'sign-review-comment'             => 'Komentar',
	'sign-submitreview'               => 'Pruwowanje přewjesć',
	'sign-uniquequery-similarname'    => 'Podobne mjeno',
	'sign-uniquequery-similaraddress' => 'Podobna adresa',
	'sign-uniquequery-similarphone'   => 'Podobne telefonowe čisło',
	'sign-uniquequery-similaremail'   => 'Podobna e-mejlowa adresa',
	'sign-uniquequery-1signed2'       => '[{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs&detail=$3}} $1] je [{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs}} $2] podpisał.',
);

/** Hungarian (Magyar)
 * @author Dorgan
 */
$messages['hu'] = array(
	'sign-realname' => 'Név:',
	'sign-city'     => 'Város:',
	'sign-zip'      => 'Irányítószám:',
	'sign-phone'    => 'Telefonszám:',
	'sign-bday'     => 'Életkor:',
	'sign-email'    => 'E-mail cím:',
);

/** Icelandic (Íslenska)
 * @author SPQRobin
 */
$messages['is'] = array(
	'sign-realname' => 'Nafn:',
	'sign-city'     => 'Staður:',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Lovekhmer
 * @author Chhorran
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'sign-nodocselected'              => 'សូម​ជ្រើសរើស​ឯកសារ​ដែលអ្នក​ចង់​ចុះហត្ថលេខា។',
	'sign-selectdoc'                  => 'ឯកសារ៖',
	'sign-realname'                   => 'ឈ្មោះ៖',
	'sign-address'                    => 'អាស័យដ្ឋាន ផ្លូវ ៖',
	'sign-city'                       => 'ក្រុង៖',
	'sign-state'                      => 'រដ្ឋ៖',
	'sign-country'                    => 'ប្រទេស៖',
	'sign-phone'                      => 'លេខទូរស័ព្ទ៖',
	'sign-bday'                       => 'អាយុ៖',
	'sign-email'                      => 'អាសយដ្ឋានអ៊ីមែល៖',
	'sign-list-hideaddress'           => 'មិនរាយ អាស័យដ្ឋាន',
	'sign-list-hideemail'             => 'សូមកុំដាក់ក្នុងបញ្ជីអ៊ីមែល',
	'sign-viewfield-realname'         => 'ឈ្មោះ',
	'sign-viewfield-address'          => 'អាសយដ្ឋាន',
	'sign-viewfield-city'             => 'ក្រុង',
	'sign-viewfield-state'            => 'រដ្ឋ',
	'sign-viewfield-country'          => 'ប្រទេស',
	'sign-viewfield-ip'               => 'អាសយដ្ឋាន IP',
	'sign-viewfield-phone'            => 'ទូរស័ព្ទ',
	'sign-viewfield-email'            => 'អ៊ីមែល',
	'sign-viewfield-age'              => 'អាយុ',
	'sign-viewfield-options'          => 'ជំរើស',
	'sign-signatures'                 => 'ហត្ថលេខា',
	'sign-closed'                     => 'ត្រូវបានបិទ',
	'sign-emailto'                    => '<a href="mailto:$1">$1</a>',
	'sign-viewfield-reviewcomment'    => 'យោបល់',
	'sign-uniquequery-similarname'    => 'ឈ្មោះស្រដៀងគ្នា',
	'sign-uniquequery-similaraddress' => 'អាសយដ្ឋានស្រដៀងគ្នា',
	'sign-uniquequery-similarphone'   => 'ទូរស័ព្ទ ស្រដៀង',
	'sign-uniquequery-similaremail'   => 'អ៊ីមែលស្រដៀងគ្នា',
);

$messages['la'] = array(
	'sign-realname' => 'Nomen:',
	'sign-city' => 'Urbs:',
	'sign-viewfield-realname' => 'Nomen',
	'sign-viewfield-city' => 'Urbs',
	'sign-viewfield-reviewcomment' => 'Sententia',
	'sign-review-comment' => 'Sententia',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'sign-selectdoc'                => 'Dokument:',
	'sign-realname'                 => 'Numm:',
	'sign-city'                     => 'Stad/Gemeng:',
	'sign-state'                    => 'Staat:',
	'sign-zip'                      => 'Postleitzuel:',
	'sign-country'                  => 'Land:',
	'sign-phone'                    => 'Telefonsnummer:',
	'sign-bday'                     => 'Alter:',
	'sign-email'                    => 'E-Mail-Adress:',
	'sign-viewfield-realname'       => 'Numm',
	'sign-viewfield-address'        => 'Adress',
	'sign-viewfield-city'           => 'Stad/Gemeng',
	'sign-viewfield-country'        => 'Land',
	'sign-viewfield-zip'            => 'Postcode',
	'sign-viewfield-ip'             => 'IP-Adress',
	'sign-viewfield-email'          => 'E-Mail',
	'sign-viewfield-age'            => 'Alter',
	'sign-viewfield-options'        => 'Optiounen',
	'sign-signatures'               => 'Ënnerschreften',
	'sign-closed'                   => 'zou',
	'sig-anonymous'                 => '<i>Anonym</i>',
	'sign-viewfield-reviewcomment'  => 'Bemierkung',
	'sign-review-comment'           => 'Bemierkung',
	'sign-uniquequery-similarname'  => 'Ähnleche Numm',
	'sign-uniquequery-similarphone' => 'Ähnlech Telefonsnummer',
	'sign-uniquequery-similaremail' => 'Ähnlech E-Mailadress',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'sign-viewfield-reviewcomment' => 'അഭിപ്രായം',
	'sign-review-comment'          => 'അഭിപ്രായം',
);

/** Marathi (मराठी)
 * @author Mahitgar
 * @author Kaustubh
 */
$messages['mr'] = array(
	'sign-realname'                 => 'नाव:',
	'sign-viewfield-realname'       => 'नाव',
	'sign-viewfield-country'        => 'देश',
	'sign-viewfield-zip'            => 'झीप(पीन)',
	'sign-viewfield-ip'             => 'आयपी अंकपत्ता:',
	'sign-viewfield-phone'          => 'दूरध्वनी',
	'sign-viewfield-email'          => 'विपत्र',
	'sign-viewfield-age'            => 'वय',
	'sign-viewfield-options'        => 'विकल्प',
	'sign-signatures'               => 'सह्या',
	'sign-uniquequery-similaremail' => 'तसलेच विपत्र',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'signdocument'                    => 'Document ondertekenen',
	'sign-nodocselected'              => 'Selecteer alstublieft het document dat u wilt ondertekenen.',
	'sign-selectdoc'                  => 'Document:',
	'sign-docheader'                  => '<div class="noarticletext">Gebruik dit formulier alstublieft om het document "[[$1]]" te ondertekenen, dat hieronder wordt weergeven.
Lees alstublieft het hele document en als u het wilt steunen vul dan alstublieft de verplichte velden in om het te ondertekenen.</div>',
	'sign-error-nosuchdoc'            => 'Het opgegeven document ($1) bestaat niet.',
	'sign-realname'                   => 'Naam:',
	'sign-address'                    => 'Straat:',
	'sign-city'                       => 'Plaats:',
	'sign-state'                      => 'Staat:',
	'sign-zip'                        => 'Postcode:',
	'sign-country'                    => 'Land:',
	'sign-phone'                      => 'Telefoonnummer:',
	'sign-bday'                       => 'Leeftijd:',
	'sign-email'                      => 'E-mailadres:',
	'sign-indicates-req'              => '<small><i><font color="red">*</font> geeft verplichte velden aan.</i></small>',
	'sign-hide-note'                  => '<small><i><font color="red">**</font> Nota bene: Informatie die niet wordt weergegeven, blijft zichtbaar voor beheerders.</i></small>',
	'sign-list-anonymous'             => 'Neem anoniem deel',
	'sign-list-hideaddress'           => 'Verberg straat',
	'sign-list-hideextaddress'        => 'Verberg plaats, staat, postcode en/of land',
	'sign-list-hidephone'             => 'Verberg telefoonnummer',
	'sign-list-hidebday'              => 'Verberg leeftijd',
	'sign-list-hideemail'             => 'Verberg e-mailadres',
	'sign-submit'                     => 'Document ondertekenen',
	'sign-information'                => '<div class="noarticletext">Dank u wel voor het nemen van de tijd om dit document door te lezen.
Als u ermee instemt, geef uw steun dan alstublieft aan door hieronder de benodigde velden in te vullen en daar te klikken op "Document ondertekenen."
Zorg er alstublieft voor dat uw persoonlijke informatie correct is en dat we op een of andere manier contact met u kunnen opnemen.
om uw identiteit te bevestigen.
Uw IP-adres en andere identificerende informatie die via dit formulier woren opgeslagen, worden gebruikt voor beheerders om dubbele ondertekeningen te verwijderen en om de juistheid van uw persoonlijke informatie te toetsen.
Omdat het gebruik van open en anonimiserende proxy\'s voorkomt dat deze taak uitgevoerd kan worden, worden ondertekeningen via deze wegen waarschijnlijk niet meegeteld.
Als u op dit moment verbonden bent via een proxyserver, maak dan voor het ondertekenen een directe verbinding.</div>

$1',
	'sig-success'                     => 'U hebt het document succesvol ondertekend.',
	'sign-view-selectfields'          => '<b>Weer te geven velden:</b>',
	'sign-viewfield-entryid'          => 'ID-nummer',
	'sign-viewfield-timestamp'        => 'Tijdstip',
	'sign-viewfield-realname'         => 'Naam',
	'sign-viewfield-address'          => 'Adres',
	'sign-viewfield-city'             => 'Plaats',
	'sign-viewfield-state'            => 'Staat',
	'sign-viewfield-country'          => 'Land',
	'sign-viewfield-zip'              => 'Postcode',
	'sign-viewfield-ip'               => 'IP-address',
	'sign-viewfield-agent'            => 'User agent',
	'sign-viewfield-phone'            => 'Telefoonnummer',
	'sign-viewfield-email'            => 'E-mailadres',
	'sign-viewfield-age'              => 'Leeftijd',
	'sign-viewfield-options'          => 'Opties',
	'sign-viewsigs-intro'             => 'Hieronder worden de ondertekeningen weergegeven voor <span class="plainlinks">[{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} $1]</span>.',
	'sign-sigadmin-currentlyopen'     => 'Ondertekenen is ingeschakeld voor dit document.',
	'sign-sigadmin-close'             => 'Onderteken uitschakelen',
	'sign-sigadmin-currentlyclosed'   => 'Onderteken is uitgeschakeld voor dit document.',
	'sign-sigadmin-open'              => 'Ondertekenen inschakelen',
	'sign-signatures'                 => 'Ondertekeningen',
	'sign-sigadmin-closesuccess'      => 'Ondertekenen uitgeschakeld.',
	'sign-sigadmin-opensuccess'       => 'Ondertekenen ingeschakeld.',
	'sign-viewsignatures'             => 'ondertekeningen bekijken',
	'sign-closed'                     => 'gesloten',
	'sign-error-closed'               => 'Onderteken eis uitgeschakeld voor dit document.',
	'sig-anonymous'                   => '<i>Anoniem</i>',
	'sig-private'                     => '<i>Privé</i>',
	'sign-sigdetails'                 => 'Ondertekeningsdetails',
	'sign-emailto'                    => '<a href="mailto:$1">$1</a>',
	'sign-iptools'                    => '<span class="plainlinksneverexpand"><!--
-->[[User:$1|$1]] ([[User talk:$1|ovelreg]] • <!--
-->[[Special:Contributions/$1|bijdragen]] • <!--
-->[http://www.dnsstuff.com/tools/whois.ch?domain={{urlencode:$1}}&cache=off&email=on WHOIS] • <!--
-->[http://www.dnsstuff.com/tools/ptr.ch?ip={{urlencode:$1}}&cache=off&email=on RDNS] • <!--
-->[http://www.robtex.com/rbls/$1.html RBL\'s] • <!--
-->[[Special:Blockip/$1|blokkeer gebruiker]] • <!--
-->[{{fullurl:Special:Log/block|page=User:{{urlencode:$1}}}} blokkerlogboek] • <!--
-->[{{fullurl:Special:CheckUser|ip={{urlencode:$1}}}} IP controleren])<!--
--></span>',
	'sign-viewfield-stricken'         => 'Doorgehaald',
	'sign-viewfield-reviewedby'       => 'Controleur',
	'sign-viewfield-reviewcomment'    => 'Opmerking',
	'sign-detail-uniquequery'         => 'Gelijkaardige entiteiten',
	'sign-detail-uniquequery-run'     => 'Zoekopdracht uitvoeren',
	'sign-detail-strike'              => 'Ondertekening doorhalen',
	'sign-reviewsig'                  => 'Ondertekening controleren',
	'sign-review-comment'             => 'Opmerking',
	'sign-submitreview'               => 'Controle opslaan',
	'sign-uniquequery-similarname'    => 'Gelijkaardige naam',
	'sign-uniquequery-similaraddress' => 'Gelijkaardige adres',
	'sign-uniquequery-similarphone'   => 'Gelijkaardige telefoonnummer',
	'sign-uniquequery-similaremail'   => 'Gelijkaardige e-mailadres',
	'sign-uniquequery-1signed2'       => '[{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs&detail=$3}} $1] ondertekende [{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs}} $2].',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Jon Harald Søby
 */
$messages['nn'] = array(
	'sign-realname'                => 'Namn:',
	'sign-city'                    => 'By:',
	'sign-country'                 => 'Land:',
	'sign-viewfield-realname'      => 'Namn',
	'sign-viewfield-city'          => 'By',
	'sign-viewfield-country'       => 'Land',
	'sign-viewfield-ip'            => 'IP-adresse',
	'sign-viewfield-email'         => 'E-post',
	'sig-private'                  => '<i>Privat</i>',
	'sign-viewfield-reviewcomment' => 'Kommentar',
	'sign-review-comment'          => 'Kommentar',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 * @author Siebrand
 */
$messages['no'] = array(
	'signdocument'                    => 'Signer dokument',
	'sign-nodocselected'              => 'Vennligst velg dokumentet du ønsker å signere.',
	'sign-selectdoc'                  => 'Dokument:',
	'sign-docheader'                  => '<div class="noarticletext">Bruk dette skjemaet for å signere dokumentet «[[$1]]» vist nedenunder. Vennligst les gjennom hele dokumentet, og om du ønsker å vise din støtte for det, fyll inn de nødvendige feltene for å signere.</div>',
	'sign-error-nosuchdoc'            => 'Dokumentet du etterspurte ($1) finnes ikke.',
	'sign-realname'                   => 'Navn:',
	'sign-address'                    => 'Hjemmeadresse:',
	'sign-city'                       => 'By:',
	'sign-state'                      => 'Delstat, fylke, etc.:',
	'sign-zip'                        => 'Postnummer:',
	'sign-country'                    => 'Land:',
	'sign-phone'                      => 'Telefonnummer:',
	'sign-bday'                       => 'Alder:',
	'sign-email'                      => 'E-postadresse:',
	'sign-indicates-req'              => '<small><i><font color="red">*</font> indikerer felt som må fylles ut.</i></small>',
	'sign-hide-note'                  => '<small><i><font color="red">**</font> Merk: Informasjon som ikke listes opp vil fortsatt kunne ses av moderatorer.</i></small>',
	'sign-list-anonymous'             => 'List opp anonymt',
	'sign-list-hideaddress'           => 'Ikke list opp adresse',
	'sign-list-hideextaddress'        => 'Ikke list opp by, stat, postnummer eller land',
	'sign-list-hidephone'             => 'Ikke list opp telefonnummer',
	'sign-list-hidebday'              => 'Ikke list opp alder',
	'sign-list-hideemail'             => 'Ikke list opp e-post',
	'sign-submit'                     => 'Signer dokumentet',
	'sign-information'                => '<div class="noarticletext">Takk for at du har tatt deg tiden til å lese gjennom dokumentet. Om du er enig med det, vis din støtte ved å fylle inn de nødvendige feltene nedenfor og klikke «Signer dokumentet». Forsikre deg om at personlig informasjon er korrekt, og at vi har en måte å kontakte deg på for å bekrefte din identitet. Merk at din IP-adresse og annen identifiserbar informasjon vil bli brukt av moderatorer for å eliminere duplikatsignaturer og bekrefte korrektheten av din personlige informasjon. Siden bruken av åpne og anonymiserende proxyer hindrer vår evne til å gjøre dette, vil signaturer fra slike proxyer trolig ikke telles. Om du er tilkoblet via en proxytjener, koble fra denne og bruk en vanlig tilkobling når du signerer.</div>

$1',
	'sig-success'                     => 'Du har signert dokumentet.',
	'sign-view-selectfields'          => '<b>Felter som vises:</b>',
	'sign-viewfield-entryid'          => 'Innskrifts-ID',
	'sign-viewfield-timestamp'        => 'Tidsmerke',
	'sign-viewfield-realname'         => 'Navn',
	'sign-viewfield-address'          => 'Adresse',
	'sign-viewfield-city'             => 'By',
	'sign-viewfield-state'            => 'Delstat, fylke, etc.',
	'sign-viewfield-country'          => 'Land',
	'sign-viewfield-zip'              => 'Postnummer',
	'sign-viewfield-ip'               => 'IP-adresse',
	'sign-viewfield-agent'            => 'Brukeragent',
	'sign-viewfield-phone'            => 'Telefonnummer',
	'sign-viewfield-email'            => 'E-post',
	'sign-viewfield-age'              => 'Alder',
	'sign-viewfield-options'          => 'Alternativer',
	'sign-viewsigs-intro'             => 'Under vises de oppsamlede signaturene for <span class="plainlinks">[{{fullurl:Special:SignDocument|doc=$2}} $1]</span>.',
	'sign-sigadmin-currentlyopen'     => 'Signering er slått på for dette dokumentet.',
	'sign-sigadmin-close'             => 'Slå av signering',
	'sign-sigadmin-currentlyclosed'   => 'Signering er slått av for dette dokumentet.',
	'sign-sigadmin-open'              => 'Slå på signering',
	'sign-signatures'                 => 'Signaturer',
	'sign-sigadmin-closesuccess'      => 'Signering ble slått av.',
	'sign-sigadmin-opensuccess'       => 'Signering ble slått på.',
	'sign-viewsignatures'             => 'vis signaturer',
	'sign-closed'                     => 'stengt',
	'sign-error-closed'               => 'Signering av dette dokumentet er slått av.',
	'sig-anonymous'                   => '<i>Anonym</i>',
	'sig-private'                     => '<i>Privat</i>',
	'sign-sigdetails'                 => 'Signaturdetaljer',
	'sign-emailto'                    => '<a href="mailto:$1">$1</a>',
	'sign-iptools'                    => '<span class="plainlinksneverexpand"><!--
-->[[User:$1|$1]] ([[User talk:$1|diskusjon]] • <!--
-->[[Special:Contributions/$1|bidrag]] • <!--
-->[http://www.dnsstuff.com/tools/whois.ch?domain={{urlencode:$1}}&cache=off&email=on WHOIS] • <!--
-->[http://www.dnsstuff.com/tools/ptr.ch?ip={{urlencode:$1}}&cache=off&email=on RDNS] • <!--
-->[http://www.robtex.com/rbls/$1.html RBL-er] • <!--
-->[[Special:Blockip/$1|blokker]] • <!--
-->[{{fullurl:Special:Log/block|page=User:{{urlencode:$1}}}} blokkeringslogg] • <!--
-->[{{fullurl:Special:CheckUser|ip={{urlencode:$1}}}} sjekk IP])<!--
--></span>',
	'sign-viewfield-stricken'         => 'Strøket',
	'sign-viewfield-reviewedby'       => 'Gjennomgangsperson',
	'sign-viewfield-reviewcomment'    => 'Kommentar',
	'sign-detail-uniquequery'         => 'Lignende entiteter',
	'sign-detail-uniquequery-run'     => 'Kjør spørring',
	'sign-detail-strike'              => 'Stryk signatur',
	'sign-reviewsig'                  => 'Se over signatur',
	'sign-review-comment'             => 'Kommentar',
	'sign-submitreview'               => 'Send inn gjennomgang',
	'sign-uniquequery-similarname'    => 'Lignende navn',
	'sign-uniquequery-similaraddress' => 'Lignende adresse',
	'sign-uniquequery-similarphone'   => 'Lignende telefonnummer',
	'sign-uniquequery-similaremail'   => 'Lignende e-postadresse',
	'sign-uniquequery-1signed2'       => '[{{fullurl:Special:SignDocument|doc=$4&viewsigs&detail=$3}} $1] signerte [{{fullurl:Special:SignDocument|doc=$4&viewsigs}} $2].',
);

/** Northern Sotho (Sesotho sa Leboa)
 * @author Mohau
 */
$messages['nso'] = array(
	'sign-realname'           => 'Leina:',
	'sign-city'               => 'Toropo:',
	'sign-country'            => 'Naga:',
	'sign-bday'               => 'Mengwaga:',
	'sign-email'              => 'Email atrese:',
	'sign-viewfield-realname' => 'Leina',
	'sign-viewfield-city'     => 'Toropo',
	'sign-viewfield-country'  => 'Naga',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'signdocument'                    => 'Autentificar lo document',
	'sign-nodocselected'              => 'Mercés de causir lo document que volètz autentificar',
	'sign-selectdoc'                  => 'Document :',
	'sign-docheader'                  => '<div class="noarticletext">Mercés d\'utilizar aqueste formulari per autentificar lo document « [[$1]] » afichat çaijós. Legissètz lo document al complet, e se desiratz significar vòstre sosten, emplenatz los camps per l\'autentificar.</div>',
	'sign-error-nosuchdoc'            => 'Lo document demandat ($1) existís pas.',
	'sign-realname'                   => 'Nom :',
	'sign-address'                    => 'Adreça civica :',
	'sign-city'                       => 'Vila :',
	'sign-state'                      => 'Estat, departament o província :',
	'sign-zip'                        => 'Còde postal :',
	'sign-country'                    => 'País :',
	'sign-phone'                      => 'Numèro de telèfon :',
	'sign-bday'                       => 'Edat :',
	'sign-email'                      => 'Adreça de corrièr electronic :',
	'sign-indicates-req'              => '<small><i><font color="red">*</font> indica los camps obligatòris.</i></small>',
	'sign-hide-note'                  => '<small><i><font color="red">**</font> Las entresenhas pas listadas son totjorn visiblas pels moderaires.</i></small>',
	'sign-list-anonymous'             => 'Listar de biais anonim',
	'sign-list-hideaddress'           => "Listar pas l'adreça",
	'sign-list-hideextaddress'        => "Listar pas la vila, l'estat (lo departament o la província), lo còde postal o lo país",
	'sign-list-hidephone'             => 'Listar pas lo numèro de telèfon',
	'sign-list-hidebday'              => "Listar pas l'edat",
	'sign-list-hideemail'             => "Listar pas l'adreça de corrièr electronic",
	'sign-submit'                     => 'Autentificar lo document',
	'sign-information'                => "<div class=\"noarticletext\">Mercés d'aver complètament legit aqueste document. Se sètz d'acòrdi amb son contengut, significatz vòstre sosten en emplenant los camps requeses çaijós e en clicant « Autentificar document ». Mercés de verificar que vòstras entresenhas personalas son exactas e qu'avèm un mejan de vos contactar per validar vòstra identitat. Vòstra adreça IP e d'autras entresenhas que vos pòdon identificar son notadas e seràn utilizadas pels moderaires per eliminar de signaturas en doblon e confirmar las entresenhas picadas. Los proxys nos permeton pas d'identificar de segur lo signatari, las signaturas obtengudas a travèrs los proxys seràn probablament pas comptadas. Se sètz connectat a travèrs un proxy, mercés d'utilizar un compte que l'utiliza pas.</div>

\$1",
	'sig-success'                     => 'Avètz autentificat lo document.',
	'sign-view-selectfields'          => "'''Camps d'afichar :'''",
	'sign-viewfield-entryid'          => 'ID de la dintrada',
	'sign-viewfield-timestamp'        => 'Timestamp',
	'sign-viewfield-realname'         => 'Nom',
	'sign-viewfield-address'          => 'Adreça',
	'sign-viewfield-city'             => 'Vila',
	'sign-viewfield-state'            => 'Estat (departament o província)',
	'sign-viewfield-country'          => 'País',
	'sign-viewfield-zip'              => 'Còde postal',
	'sign-viewfield-ip'               => 'Adreça IP',
	'sign-viewfield-agent'            => 'User agent',
	'sign-viewfield-phone'            => 'Numèro de telèfon',
	'sign-viewfield-email'            => 'Adreça de corrièr electronic',
	'sign-viewfield-age'              => 'Edat',
	'sign-viewfield-options'          => 'Opcions',
	'sign-viewsigs-intro'             => 'Çaijós apareisson las signaturas enrgistradas per <span class="plainlinks">[{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} $1]</span>.',
	'sign-sigadmin-currentlyopen'     => "L'autentificacion es presentament activada per aqueste document.",
	'sign-sigadmin-close'             => "Desactivar l'autentificacion",
	'sign-sigadmin-currentlyclosed'   => "L'autentificacion es presentament desactivada per aqueste document.",
	'sign-sigadmin-open'              => "Activar l'autentificacion",
	'sign-signatures'                 => 'Signaturas',
	'sign-sigadmin-closesuccess'      => "L'autentificacion es desactivada.",
	'sign-sigadmin-opensuccess'       => "L'autentificacion es activada.",
	'sign-viewsignatures'             => 'Veire las signaturas',
	'sign-closed'                     => 'tampada',
	'sign-error-closed'               => "L'autentificacion d'aqueste document es presentada desactivada.",
	'sig-anonymous'                   => "''Anonimament''",
	'sig-private'                     => "''Privat''",
	'sign-sigdetails'                 => 'Detalhs de la signatura',
	'sign-emailto'                    => '<a href="mailto:$1">$1</a>',
	'sign-iptools'                    => '<span class="plainlinksneverexpand"><!--
		-->[[User:$1|$1]] ([[User talk:$1|talk]] • <!--
		-->[[Special:Contributions/$1|contribs]] • <!--
		-->[http://www.dnsstuff.com/tools/whois.ch?domain={{urlencode:$1}}&cache=off&email=on WHOIS] • <!--
		-->[http://www.dnsstuff.com/tools/ptr.ch?ip={{urlencode:$1}}&cache=off&email=on RDNS] • <!--
		-->[http://www.robtex.com/rbls/$1.html RBLs] • <!--
		-->[[Special:Blockip/$1|block user]] • <!--
		-->[{{fullurl:Special:Log/block|page=User:{{urlencode:$1}}}} block log] • <!--
		-->[{{fullurl:Special:CheckUser|ip={{urlencode:$1}}}} checkip])<!--
		--></span>',
	'sign-viewfield-stricken'         => 'Fautiu',
	'sign-viewfield-reviewedby'       => 'Revisor',
	'sign-viewfield-reviewcomment'    => 'Comentari',
	'sign-detail-uniquequery'         => 'Entitats semblablas',
	'sign-detail-uniquequery-run'     => 'Amodar la requèsta',
	'sign-detail-strike'              => 'Raiar la signatura',
	'sign-reviewsig'                  => 'Revisar la signatura',
	'sign-review-comment'             => 'Comentari',
	'sign-submitreview'               => 'Sometre la revision',
	'sign-uniquequery-similarname'    => 'Nom similar',
	'sign-uniquequery-similaraddress' => 'Adreça similara',
	'sign-uniquequery-similarphone'   => 'Numèro de telèfon similar',
	'sign-uniquequery-similaremail'   => 'Adreça de corrièr electronica similara',
	'sign-uniquequery-1signed2'       => '[{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs&detail=$3}} $1] a autentificat [{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs}} $2].',
);

/** Polish (Polski)
 * @author McMonster
 * @author Derbeth
 */
$messages['pl'] = array(
	'sign-realname'            => 'Nazwisko:',
	'sign-address'             => 'Ulica:',
	'sign-city'                => 'Miasto:',
	'sign-state'               => 'Stan:',
	'sign-zip'                 => 'Kod ZIP:',
	'sign-country'             => 'Kraj:',
	'sign-phone'               => 'Numer telefonu:',
	'sign-bday'                => 'Wiek:',
	'sign-email'               => 'Adres e-mail:',
	'sign-indicates-req'       => '<small><i><font color="red">*</font> oznacza wymagane pole.</i></small>',
	'sign-submit'              => 'Podpisz dokument',
	'sign-view-selectfields'   => '<b>Pola do wyświetlenia:</b>',
	'sign-viewfield-timestamp' => 'Znacznik czasu',
	'sign-viewfield-address'   => 'Adres',
	'sign-viewfield-city'      => 'Miasto',
	'sign-viewfield-country'   => 'Państwo',
	'sign-viewfield-ip'        => 'Adres IP',
	'sign-viewfield-agent'     => 'User agent',
	'sign-viewfield-phone'     => 'Telefon',
	'sign-viewfield-email'     => 'E-mail',
	'sign-viewfield-age'       => 'Wiek',
	'sign-viewfield-options'   => 'Opcje',
	'sign-sigadmin-close'      => 'Wyłącz podpisywanie',
	'sign-signatures'          => 'Podpisy',
	'sign-review-comment'      => 'Komentarz',
);

/** Piemontèis (Piemontèis)
 * @author Bèrto 'd Sèra
 * @author Siebrand
 */
$messages['pms'] = array(
	'signdocument'                    => "Firma digital d'un document",
	'sign-nodocselected'              => "Për piasì, ch'a sërna ël document ch'a veul firmé.",
	'sign-selectdoc'                  => 'Document:',
	'sign-docheader'                  => "<div class=\"noarticletext\">Për piasì, ch'a dòvra ës mòdulo-sì për firmé an manera digital ël document \"[[\$1]],\" che i-j ësmonoma ambelessì sota. Ch'a sia gentil, ch'a lesa tut ël document e '''ch<nowiki>'</nowiki>a firma mach s<nowiki>'</nowiki>a l<nowiki>'</nowiki>é d<nowiki>'</nowiki>acòrdi an manera completa'''. Për firmé ch'a buta sò dat ant ij camp a pòsta.</div>",
	'sign-error-nosuchdoc'            => "A l'ha ciamane un document ($1) ch'a-i é pa.",
	'sign-realname'                   => 'Nòm e cognòm:',
	'sign-address'                    => 'Abitant an via:',
	'sign-city'                       => 'Sità:',
	'sign-state'                      => 'Provinsa:',
	'sign-zip'                        => 'Còdes postal:',
	'sign-country'                    => 'Stat:',
	'sign-phone'                      => 'Nùmer ëd telèfono:',
	'sign-bday'                       => 'Età:',
	'sign-email'                      => 'Adrëssa ëd pòsta eletrònica:',
	'sign-indicates-req'              => '<small><i><font color="red">*</font> a marca ij camp ch\'a-i é òbligh dë buté.</i></small>',
	'sign-hide-note'                  => "<small><i><font color=\"red\">**</font> Nòta: a l'é n'anformassion nen pùblica, ch'a s-ciàiro mach j'aministrator.</i></small>",
	'sign-list-anonymous'             => "An pùblich march-me coma anònim, sensa gnente ch'a peula feje capì a la gent chi ch'i son (contut che j'aministrator ij dat personaj a-j ës-ciàiro franch midem)",
	'sign-list-hideaddress'           => "Pùblica nen mia adrëssa (contut che j'aministrator ij dat personaj a-j ës-ciàiro franch midem)",
	'sign-list-hideextaddress'        => "Pùblica nen stat, provinsa, còdes postal ò sità (contut che j'aministrator ij dat personaj a-j ës-ciàiro franch midem)",
	'sign-list-hidephone'             => "Pùblica nen ël telèfono (contut che j'aministrator ij dat personaj a-j ës-ciàiro franch midem)",
	'sign-list-hidebday'              => "Pùblica nen l'età (contut che j'aministrator ij dat personaj a-j ës-ciàiro franch midem)",
	'sign-list-hideemail'             => "Pùblica nen l'adrëssa ëd pòsta eletrònica (contut che j'aministrator ij dat personaj a-j ës-ciàiro franch midem)",
	'sign-submit'                     => "Ch'a-i daga 'n colp ambelessì për firmé",
	'sign-information'                => "<div class=\"noarticletext\">Motobin mersì për avej dovrà sò temp a lese ës document-sì. S'a l'é d'acòrdi con lòn ch'a-i é scrit për piasì ch'a lo disa ën butand sò dat personaj e dand-ie un colp ansima al boton dla firma.

Ch'a varda che sò dat a sio giust, e che i peulo contatela për verifiché soa identità. Ch'a ten-a present che soa adrëssa IP e dj'àotre anformassion ansima soa identità a resteran registrà quand a firma e saran dovrà da j'aministrator për eliminé le firme dobie e confermé che ij dat personaj a sio giust.

'''Nòta''': për via che ën passand për ij '''proxy duvèrt''' (ch'a fan ëvnì anònima la gent), un an permëtt nen da fé sossì, le firme ch'a rivo ën passand për dij canaj parej as peulo nen contesse. Se ant ës moment-sì chiel/chila a l'é tacà a 'n proxy, për piasì, '''për firmé''' ch'as dëstaca e '''ch'a dòvra na conession normal'''.</div>

\$1",
	'sig-success'                     => "La firma dël document a l'é andaita a bonfin.",
	'sign-view-selectfields'          => '<b>Camp da smon-e:</b>',
	'sign-viewfield-entryid'          => "Id dl'element",
	'sign-viewfield-timestamp'        => 'Tìmber data e ora',
	'sign-viewfield-realname'         => 'Nòm',
	'sign-viewfield-address'          => 'Adrëssa',
	'sign-viewfield-city'             => 'Sità',
	'sign-viewfield-state'            => 'Provinsa',
	'sign-viewfield-country'          => 'Nassion',
	'sign-viewfield-zip'              => 'Còdes postal',
	'sign-viewfield-ip'               => 'Adrëssa IP',
	'sign-viewfield-agent'            => "Agent dl'utent",
	'sign-viewfield-phone'            => 'Teléfono',
	'sign-viewfield-email'            => 'Pòsta eletrònica',
	'sign-viewfield-age'              => 'Età',
	'sign-viewfield-options'          => 'Opsion',
	'sign-viewsigs-intro'             => 'Ambelessì sota a-i son le firme butà al document <span class="plainlinks">[{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} $1]</span>.',
	'sign-sigadmin-currentlyopen'     => 'Ës document-sì as peul firmesse.',
	'sign-sigadmin-close'             => 'Chité dë cheuje firme',
	'sign-sigadmin-currentlyclosed'   => 'Ës document-sì as peul nen firmesse.',
	'sign-sigadmin-open'              => 'Deurbe la cheujta dle firme',
	'sign-signatures'                 => 'Firme',
	'sign-sigadmin-closesuccess'      => "La possibilità dë firmé a l'é stàita gavà",
	'sign-sigadmin-opensuccess'       => "La possibilità dë firmé a l'é stàita butà",
	'sign-viewsignatures'             => 'vardé le firme',
	'sign-closed'                     => 'sërà',
	'sign-error-closed'               => 'Ës document-sì al moment as peul nen firmesse',
	'sig-anonymous'                   => '<i>Anònim</i>',
	'sig-private'                     => '<i>Privà</i>',
	'sign-sigdetails'                 => 'Detaj dla firma',
	'sign-emailto'                    => '<a href="mailto:$1">$1</a>',
	'sign-iptools'                    => '<span class="plainlinksneverexpand"><!-- -->[[Utent:$1|$1]] ([[Ciaciarade:$1|talk]] • <!-- -->[[Special:Contributions/$1|contribs]] • <!-- -->[http://www.dnsstuff.com/tools/whois.ch?domain={{urlencode:$1}}&cache=off&email=on WHOIS] • <!-- -->[http://www.dnsstuff.com/tools/ptr.ch?ip={{urlencode:$1}}&cache=off&email=on RDNS] • <!-- -->[http://www.robtex.com/rbls/$1.html RBLs] • <!-- -->[[Special:Blockip/$1|block user]] • <!-- -->[{{fullurl:Special:Log/block|page=User:{{urlencode:$1}}}} block log] • <!-- -->[{{fullurl:Special:CheckUser|ip={{urlencode:$1}}}} checkip])<!-- --></span>',
	'sign-viewfield-stricken'         => 'Anulà',
	'sign-viewfield-reviewedby'       => 'Controlor',
	'sign-viewfield-reviewcomment'    => 'Coment',
	'sign-detail-uniquequery'         => "Entità ch'a-j ësmijo",
	'sign-detail-uniquequery-run'     => 'Consulté la base dat',
	'sign-detail-strike'              => 'Anulé la firma',
	'sign-reviewsig'                  => 'Controlé la firma',
	'sign-review-comment'             => 'Coment',
	'sign-submitreview'               => 'Registré ël contròl',
	'sign-uniquequery-similarname'    => "Nòm ch'a-j ësmija",
	'sign-uniquequery-similaraddress' => "Adrëssa ch'a-j ësmija",
	'sign-uniquequery-similarphone'   => "Teléfono ch'a-j ësmija",
	'sign-uniquequery-similaremail'   => "Pòsta eletrònica ch'a-j ësmija",
	'sign-uniquequery-1signed2'       => '[{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs&detail=$3}} $1] firmà [{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs}} $2].',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'sign-selectdoc'           => 'لاسوند:',
	'sign-error-nosuchdoc'     => 'د کوم لاسوند غوښتنه چې تاسو کړې ($1)، هغه نشته.',
	'sign-realname'            => 'نوم:',
	'sign-address'             => 'د کوڅې پته:',
	'sign-city'                => 'ښار:',
	'sign-state'               => 'ايالت:',
	'sign-zip'                 => 'پوست کوډ:',
	'sign-country'             => 'هېواد:',
	'sign-phone'               => 'د ټيليفون شمېره:',
	'sign-bday'                => 'عمر:',
	'sign-email'               => 'برېښليک پته:',
	'sign-list-anonymous'      => 'په ورکنومي توګه مې ښکاره کړه',
	'sign-list-hideaddress'    => 'پته مې مه ښکاره کوه',
	'sign-list-hideextaddress' => 'ښار، ايالت، پوست کوډ، يا هېواد مې مه ښکاره کوه',
	'sign-list-hidephone'      => 'د ټيليفون شمېره مې مه ښکاره کوه',
	'sign-list-hidebday'       => 'عمر مې مه ښکاره کوه',
	'sign-list-hideemail'      => 'برېښليک مې مه ښکاره کوه',
	'sign-viewfield-realname'  => 'نوم',
	'sign-viewfield-address'   => 'پته',
	'sign-viewfield-city'      => 'ښار',
	'sign-viewfield-state'     => 'ايالت',
	'sign-viewfield-country'   => 'هېواد',
	'sign-viewfield-ip'        => 'IP پته',
	'sign-viewfield-agent'     => 'د کارونکي پلاوی',
	'sign-viewfield-phone'     => 'ټيليفون',
	'sign-viewfield-email'     => 'برېښليک',
	'sign-viewfield-age'       => 'عمر',
	'sign-signatures'          => 'لاسليکونه',
	'sig-anonymous'            => '<i>ورکنومی</i>',
);

/** Portuguese (Português)
 * @author Malafaya
 * @author Lijealso
 */
$messages['pt'] = array(
	'sign-selectdoc'               => 'Documento:',
	'sign-error-nosuchdoc'         => 'O documento que requisitou ($1) não existe.',
	'sign-realname'                => 'Nome:',
	'sign-address'                 => 'Endereço da morada:',
	'sign-city'                    => 'Cidade:',
	'sign-state'                   => 'Estado:',
	'sign-zip'                     => 'Código postal:',
	'sign-country'                 => 'País:',
	'sign-phone'                   => 'Número de telefone:',
	'sign-bday'                    => 'Idade:',
	'sign-email'                   => 'Endereço de e-mail:',
	'sign-list-anonymous'          => 'Listar como anónimo',
	'sign-list-hideaddress'        => 'Não listar endereço',
	'sign-list-hideextaddress'     => 'Não listar cidade, estado, código postal ou país',
	'sign-list-hidephone'          => 'Não listar telefone',
	'sign-list-hidebday'           => 'Não listar idade',
	'sign-list-hideemail'          => 'Não listar email',
	'sign-submit'                  => 'Assinar documento',
	'sig-success'                  => 'O documento foi assinado com sucesso.',
	'sign-viewfield-realname'      => 'Nome',
	'sign-viewfield-address'       => 'Endereço',
	'sign-viewfield-city'          => 'Cidade',
	'sign-viewfield-state'         => 'Estado',
	'sign-viewfield-country'       => 'País',
	'sign-viewfield-zip'           => 'Código Postal',
	'sign-viewfield-ip'            => 'Endereço IP',
	'sign-viewfield-phone'         => 'Telefone',
	'sign-viewfield-email'         => 'E-mail',
	'sign-viewfield-age'           => 'Idade',
	'sign-viewfield-options'       => 'Opções',
	'sign-viewsignatures'          => 'ver assinaturas',
	'sign-closed'                  => 'fechado',
	'sig-anonymous'                => '<i>Anónimo</i>',
	'sig-private'                  => '<i>Privado</i>',
	'sign-sigdetails'              => 'Detalhes da assinatura',
	'sign-viewfield-reviewedby'    => 'Revisor',
	'sign-viewfield-reviewcomment' => 'Comentário',
);

$messages['rm'] = array(
	'sign-viewfield-realname' => 'Num',
);

/** Russian (Русский)
 * @author .:Ajvol:.
 */
$messages['ru'] = array(
	'signdocument'                    => 'Подписание документа',
	'sign-nodocselected'              => 'Пожалуйста, выберите документ, который вы хотите подписать.',
	'sign-selectdoc'                  => 'Документ:',
	'sign-docheader'                  => '<div class="noarticletext">Пожалуйста, используйте эту форму для подписи документа «[[$1]]», представленного ниже.
Пожалуйста, прочтите документ целиком, и если вы хотите выразить ему поддержку, заполните требуемые поля, чтобы подписать его.</div>',
	'sign-error-nosuchdoc'            => 'Запрошенный вами документ ($1) не существует.',
	'sign-realname'                   => 'Имя:',
	'sign-address'                    => 'Адрес (улица, дом и пр.):',
	'sign-city'                       => 'Город:',
	'sign-state'                      => 'Положение:',
	'sign-zip'                        => 'Почтовый индекс:',
	'sign-country'                    => 'Страна:',
	'sign-phone'                      => 'Номер телефона:',
	'sign-bday'                       => 'Возраст:',
	'sign-email'                      => 'Адрес эл. почты:',
	'sign-indicates-req'              => '<small><i><font color="red">*</font> отмечает обязательные поля.</i></small>',
	'sign-hide-note'                  => '<small><i><font color="red">**</font> Замечание: невключённая в список информация будет видна модераторам.</i></small>',
	'sign-list-anonymous'             => 'Анонимно',
	'sign-list-hideaddress'           => 'Не включать в список адрес',
	'sign-list-hideextaddress'        => 'Не включать в список город, страну и индекс',
	'sign-list-hidephone'             => 'Не включать в список телефон',
	'sign-list-hidebday'              => 'Не включать в список возраст',
	'sign-list-hideemail'             => 'Не включать в список эл. почту',
	'sign-submit'                     => 'Подписать документ',
	'sign-information'                => '<div class="noarticletext">Спасибо, что потратили своё время на прочтение этого документа.
Если вы согласны с ним, пожалуйста, выразите вашу поддержку, заполнив приведённые ниже поля и нажав кнопку «Подписать документ». 
Пожалуйста, убедитесь, что приводимые вами личные сведения правильны, что указаны способы связи, которыми можено воспользоваться для проверки подлинности.
Заметьте, что ваш IP-адрес и иная идентификационная информация будет записана с помощью этой формы и использована модераторами для удаления повторных подписей и подтверждения правильности личных сведений.
Поскольку использование открытых и анонимизирующих прокси препятствует нашей возможности выполнить эту задачу, подписи с таких прокси, скорее всего, будут учитываться.
Если вы подключены через прокси-сервер, пожалуйста, отсоединитесь от него, используйте обычное подключение к сети во время подписи документа.</div>

$1',
	'sig-success'                     => 'Подписание документа прошло успешно.',
	'sign-view-selectfields'          => '<b>Поля для оображения:</b>',
	'sign-viewfield-entryid'          => 'ID записи',
	'sign-viewfield-timestamp'        => 'Дата/время',
	'sign-viewfield-realname'         => 'Имя',
	'sign-viewfield-address'          => 'Адрес',
	'sign-viewfield-city'             => 'Город',
	'sign-viewfield-state'            => 'Штат',
	'sign-viewfield-country'          => 'Страна',
	'sign-viewfield-zip'              => 'Почт. индекс',
	'sign-viewfield-ip'               => 'IP-адрес',
	'sign-viewfield-agent'            => 'Браузер',
	'sign-viewfield-phone'            => 'Телефон',
	'sign-viewfield-email'            => 'Эл. почта',
	'sign-viewfield-age'              => 'Возраст',
	'sign-viewfield-options'          => 'Настройки',
	'sign-viewsigs-intro'             => 'Ниже показаны подписи, собранные за <span class="plainlinks">[{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} $1]</span>.',
	'sign-sigadmin-currentlyopen'     => 'Сбор подписей включён для этого документа.',
	'sign-sigadmin-close'             => 'Отключить сбор подписей',
	'sign-sigadmin-currentlyclosed'   => 'Сбор подписей сейчас отключён для этого документа.',
	'sign-sigadmin-open'              => 'Включить сбор подписей',
	'sign-signatures'                 => 'Подписи',
	'sign-sigadmin-closesuccess'      => 'Сбор подписей успешно отключён.',
	'sign-sigadmin-opensuccess'       => 'Сбор подписей успешно включён.',
	'sign-viewsignatures'             => 'просмотреть подписи',
	'sign-closed'                     => 'закрыто',
	'sign-error-closed'               => 'Сбор подписей для этого документа в настоящее время отключён.',
	'sig-anonymous'                   => '<i>Аноним</i>',
	'sig-private'                     => '<i>Частный</i>',
	'sign-sigdetails'                 => 'Подробнее о подписи',
	'sign-emailto'                    => '<a href="mailto:$1">$1</a>',
	'sign-iptools'                    => '<span class="plainlinksneverexpand"><!--
-->[[User:$1|$1]] ([[User talk:$1|обсуждение]] • <!--
-->[[Special:Contributions/$1|вклад]] • <!--
-->[http://www.dnsstuff.com/tools/whois.ch?domain={{urlencode:$1}}&cache=off&email=on WHOIS] • <!--
-->[http://www.dnsstuff.com/tools/ptr.ch?ip={{urlencode:$1}}&cache=off&email=on RDNS] • <!--
-->[http://www.robtex.com/rbls/$1.html RBLs] • <!--
-->[[Special:Blockip/$1|заблокировать участника]] • <!--
-->[{{fullurl:Special:Log/block|page=User:{{urlencode:$1}}}} журнал блокировок] • <!--
-->[{{fullurl:Special:CheckUser|ip={{urlencode:$1}}}} проверить])<!--
--></span>',
	'sign-viewfield-stricken'         => 'Вычеркнуто',
	'sign-viewfield-reviewedby'       => 'Проверяющий',
	'sign-viewfield-reviewcomment'    => 'Примечание',
	'sign-detail-uniquequery'         => 'Схожие записи',
	'sign-detail-uniquequery-run'     => 'Выполнить запрос',
	'sign-detail-strike'              => 'Вычеркнуть подпись',
	'sign-reviewsig'                  => 'Проверить подпись',
	'sign-review-comment'             => 'Примечание',
	'sign-submitreview'               => 'Отправить проверку',
	'sign-uniquequery-similarname'    => 'Схожее имя',
	'sign-uniquequery-similaraddress' => 'Схожий адрес',
	'sign-uniquequery-similarphone'   => 'Схожий телефон',
	'sign-uniquequery-similaremail'   => 'Схожий эл. адрес',
	'sign-uniquequery-1signed2'       => '[{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs&detail=$3}} $1] подписал [{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs}} $2].',
);

/** Slovak (Slovenčina)
 * @author Helix84
 * @author Siebrand
 */
$messages['sk'] = array(
	'signdocument'                    => 'Podpísať dokument',
	'sign-nodocselected'              => 'Prosím, zvoľte dokument, ktorý chcete podpísať.',
	'sign-selectdoc'                  => 'Dokument:',
	'sign-docheader'                  => '<div class="noarticletext">Prosím, použite tento formulár na podpísanie dolu zobrazeného dokumentu „[[$1]]“. Prosím, prečítajte si celý dokument a ak chcete vyjadriť jeho podporu, vyplňte prosím požadované polia, aby mohol byť podpísaný.</div>',
	'sign-error-nosuchdoc'            => 'Dokument, ktorý ste vyžiadali ($1) neexistuje.',
	'sign-realname'                   => 'Meno:',
	'sign-address'                    => 'Adresa:',
	'sign-city'                       => 'Mesto:',
	'sign-state'                      => 'Štát:',
	'sign-zip'                        => 'PSČ:',
	'sign-country'                    => 'Krajina:',
	'sign-phone'                      => 'Telefónne číslo:',
	'sign-bday'                       => 'Vek:',
	'sign-email'                      => 'Emailová adresa:',
	'sign-indicates-req'              => '<small><i><font color="red">*</font> označuje povinné polia.</i></small>',
	'sign-hide-note'                  => '<small><i><font color="red">**</font> Pozn.: Informácie, ktoré sa nezobrazujú budú aj tak viditeľné moderátorom.</i></small>',
	'sign-list-anonymous'             => 'Uviesť anonymne',
	'sign-list-hideaddress'           => 'Neuvádzať adresu',
	'sign-list-hideextaddress'        => 'Neuvádzať mesto, štát, PSČ a krajinu',
	'sign-list-hidephone'             => 'Neuvádzať telefón',
	'sign-list-hidebday'              => 'Neuvádzať vek',
	'sign-list-hideemail'             => 'Neuvádzať email',
	'sign-submit'                     => 'Podpísať dokument',
	'sign-information'                => '<div class="noarticletext">Ďakujeme, že ste si našli čas prečítať tento dokument. Ak s jeho obsahom súhlasíte, prosím vyjadrite svoju podporu tým, že nižšie vyplníte požadované polia a kliknete na „Podpísať dokument“. Prosím, uistite sa, že vaše osobné údaje sú správne uvedené a že ste nám poskytli spôsob, ako vás kontaktovať pre overenie vašej identity. Majte na pamäti, že vaša IP adresa a iné identifikačné informáce budú zaznamenané s týmto formulárom a moderátori ich použijú na elimináciu dvojitých podpisov a potvrdenie správnosti vašich osobných údajov. Keďže používanie otvorených a anonymných proxy serverov bráni našej schopnosti vykonávať túto úlohu, podpisy z takýcto proxy pravdepodobne nebudú započítané. Ak ste momentálne pripojený prostredníctvom proxy, odpojte sa prosím a použite pri podpisovaní priame pripojenie.</div>

$1',
	'sig-success'                     => 'Úspešne ste podpísali dokument',
	'sign-view-selectfields'          => '<b>Zobrazované polia:</b>',
	'sign-viewfield-entryid'          => 'ID záznamu',
	'sign-viewfield-timestamp'        => 'Časová známka',
	'sign-viewfield-realname'         => 'Meno',
	'sign-viewfield-address'          => 'Adresa',
	'sign-viewfield-city'             => 'Mesto',
	'sign-viewfield-state'            => 'Štát',
	'sign-viewfield-country'          => 'Krajina',
	'sign-viewfield-zip'              => 'PSČ',
	'sign-viewfield-ip'               => 'IP adresa',
	'sign-viewfield-agent'            => 'Prehliadač',
	'sign-viewfield-phone'            => 'Telefón',
	'sign-viewfield-email'            => 'Email',
	'sign-viewfield-age'              => 'Vek',
	'sign-viewfield-options'          => 'Voľby',
	'sign-viewsigs-intro'             => 'Dolu zobrazené sú zaznamenané podpisy <span class="plainlinks">[{{SERVER}}{{localurl: Special:SignDocument|doc=$2}} $1]</span>.',
	'sign-sigadmin-currentlyopen'     => 'Pre tento dokument je momentálne pospisovanie zapnuté.',
	'sign-sigadmin-close'             => 'Vypnúť podpisovanie',
	'sign-sigadmin-currentlyclosed'   => 'Podpisovanie pre tento dokument je momentálne vypnuté.',
	'sign-sigadmin-open'              => 'Zapnúť podpisovanie',
	'sign-signatures'                 => 'Podpisy',
	'sign-sigadmin-closesuccess'      => 'Podpisovanie je úspešne vypnuté.',
	'sign-sigadmin-opensuccess'       => 'Podpisovanie je úspešne zapnuté.°',
	'sign-viewsignatures'             => 'zobraziť podpisy',
	'sign-closed'                     => 'zatvorené',
	'sign-error-closed'               => 'Podpisovanie pre tento dokument je momentálne vypnuté.',
	'sig-anonymous'                   => '<i>anonym</i>',
	'sig-private'                     => '<i>súkromné</i>',
	'sign-sigdetails'                 => 'Podrobnosti podpisu',
	'sign-emailto'                    => '<a href="mailto:$1">$1</a>',
	'sign-iptools'                    => '<span class="plainlinksneverexpand"><!--
-->[[User:$1|$1]] ([[User talk:$1|diskusia]] • <!--
-->[[Special:Contributions/$1|príspevky]] • <!--
-->[http://www.dnsstuff.com/tools/whois.ch?domain={{urlencode:$1}}&cache=off&email=on WHOIS] • <!--
-->[http://www.dnsstuff.com/tools/ptr.ch?ip={{urlencode:$1}}&cache=off&email=on RDNS] • <!--
-->[http://www.robtex.com/rbls/$1.html RBLs] • <!--
-->[[Special:Blockip/$1|zablokovať používateľa]] • <!--
-->[{{fullurl:Special:Log/block|page=User:{{urlencode:$1}}}} záznam blokovaní] • <!--
-->[{{fullurl:Special:CheckUser|ip={{urlencode:$1}}}} kontrola ip])<!--
--></span>',
	'sign-viewfield-stricken'         => 'Vyčiarknuté',
	'sign-viewfield-reviewedby'       => 'Kontrolór',
	'sign-viewfield-reviewcomment'    => 'Komentár',
	'sign-detail-uniquequery'         => 'Podobné entity',
	'sign-detail-uniquequery-run'     => 'Spustiť požiadavku',
	'sign-detail-strike'              => 'Vyčiarknuť podpis',
	'sign-reviewsig'                  => 'Skontrolovať podpis',
	'sign-review-comment'             => 'Komentár',
	'sign-submitreview'               => 'Odoslať kontrolu',
	'sign-uniquequery-similarname'    => 'Podobné meno',
	'sign-uniquequery-similaraddress' => 'Podobná adresa',
	'sign-uniquequery-similarphone'   => 'Podobný telefón',
	'sign-uniquequery-similaremail'   => 'Podobný email',
	'sign-uniquequery-1signed2'       => '[{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs&detail=$3}} $1] podpísal [{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs}} $2].',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Sasa Stefanovic
 */
$messages['sr-ec'] = array(
	'sign-email'                   => 'Е-пошта:',
	'sign-viewfield-reviewcomment' => 'Коментар',
	'sign-review-comment'          => 'Коментар',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'sign-realname' => 'Noome:',
);

/** Swedish (Svenska)
 * @author M.M.S.
 * @author Lejonel
 * @author Jon Harald Søby
 */
$messages['sv'] = array(
	'signdocument'                 => 'Signera dokument',
	'sign-nodocselected'           => 'Välj det dokument du vill signera.',
	'sign-selectdoc'               => 'Dokument:',
	'sign-docheader'               => '<div class="noarticletext">Använd det här formuläret för att signera dokumentet "[[$1]]," som visas härunder. Var god läs igenom hela dokumentet, och om du vill visa ditt stöd för det, fyll i de nödvändiga fälten för att signera.</div>',
	'sign-error-nosuchdoc'         => 'Dokumentet du efterfrågade ($1) existerar inte.',
	'sign-realname'                => 'Namn:',
	'sign-address'                 => 'Gatuadress:',
	'sign-city'                    => 'Ort:',
	'sign-state'                   => 'Stat:',
	'sign-zip'                     => 'Postnummer:',
	'sign-country'                 => 'Land:',
	'sign-phone'                   => 'Telefonnummer:',
	'sign-bday'                    => 'Ålder:',
	'sign-email'                   => 'E-postadress:',
	'sign-indicates-req'           => '<small><i><font color="red">*</font> betyder att fältet måste fyllas i.</i></small>',
	'sign-hide-note'               => '<small><i><font color="red">**</font> Observera: Dold informationen är fortfarande tillgänglig för moderatorer.</i></small>',
	'sign-list-anonymous'          => 'Lista anonymt',
	'sign-list-hideaddress'        => 'Lista inte adress',
	'sign-list-hideextaddress'     => 'Lista inte ort, stat, postnummer eller land',
	'sign-list-hidephone'          => 'Lista inte telefon',
	'sign-list-hidebday'           => 'Lista inte ålder',
	'sign-list-hideemail'          => 'Lista inte e-post',
	'sign-submit'                  => 'Signera dokumentet',
	'sig-success'                  => 'Du har signerat dokumentet lyckat.',
	'sign-view-selectfields'       => '<b>Fält som visas:</b>',
	'sign-viewfield-timestamp'     => 'Tidssttämpel',
	'sign-viewfield-realname'      => 'Namn',
	'sign-viewfield-address'       => 'Adress',
	'sign-viewfield-city'          => 'Ort',
	'sign-viewfield-state'         => 'Stat',
	'sign-viewfield-country'       => 'Land',
	'sign-viewfield-zip'           => 'Postnummer',
	'sign-viewfield-ip'            => 'IP-adress',
	'sign-viewfield-agent'         => 'Användaragent',
	'sign-viewfield-phone'         => 'Telefon',
	'sign-viewfield-email'         => 'E-post',
	'sign-viewfield-age'           => 'Ålder',
	'sign-signatures'              => 'Signaturer',
	'sign-viewsignatures'          => 'visa signaturer',
	'sign-closed'                  => 'stängd',
	'sign-error-closed'            => 'Signering av detta dokument är just nu stängd.',
	'sig-anonymous'                => '<i>Anonym</i>',
	'sig-private'                  => '<i>Privat</i>',
	'sign-sigdetails'              => 'Signatur detaljer',
	'sign-emailto'                 => '<a href="mailto:$1">$1</a>',
	'sign-iptools'                 => '<span class="plainlinksneverexpand"><!--
-->[[User:$1|$1]] ([[User talk:$1|diskussion]] • <!--
-->[[Special:Contributions/$1|ändringar]] • <!--
-->[http://www.dnsstuff.com/tools/whois.ch?domain={{urlencode:$1}}&cache=off&email=on WHOIS] • <!--
-->[http://www.dnsstuff.com/tools/ptr.ch?ip={{urlencode:$1}}&cache=off&email=on RDNS] • <!--
-->[http://www.robtex.com/rbls/$1.html RBLs] • <!--
-->[[Special:Blockip/$1|blockera användare]] • <!--
-->[{{fullurl:Special:Log/block|page=User:{{urlencode:$1}}}} blockerings logg] • <!--
-->[{{fullurl:Special:CheckUser|ip={{urlencode:$1}}}} kontrollera IP])<!--
--></span>',
	'sign-viewfield-stricken'      => 'Struken',
	'sign-viewfield-reviewcomment' => 'Kommentar',
	'sign-detail-strike'           => 'Stryk signatur',
	'sign-reviewsig'               => 'Granska signatur',
	'sign-review-comment'          => 'Kommentar',
	'sign-uniquequery-similarname' => 'Liknande namn',
	'sign-uniquequery-1signed2'    => '[{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs&detail=$3}} $1] signerade [{{SERVER}}{{localurl: Special:SignDocument|doc=$4&viewsigs}} $2].',
);

/** Silesian (ślůnski)
 * @author Herr Kriss
 */
$messages['szl'] = array(
	'sign-realname'           => 'Mjano:',
	'sign-viewfield-realname' => 'Mjano',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'signdocument'                  => 'పత్రంపై సంతకం చేయండి',
	'sign-nodocselected'            => 'మీ సంతకం చేయాలనుకుంటున్న పత్రాన్ని ఎంచుకోండి.',
	'sign-selectdoc'                => 'పత్రం:',
	'sign-error-nosuchdoc'          => 'మీరు అభ్యర్థించిన పత్రం ($1) ఇక్కడ లేదు.',
	'sign-realname'                 => 'పేరు:',
	'sign-address'                  => 'వీధి చిరునామా:',
	'sign-city'                     => 'నగరం:',
	'sign-state'                    => 'రాష్ట్రం:',
	'sign-zip'                      => 'జిప్ కోడ్:',
	'sign-country'                  => 'దేశం:',
	'sign-phone'                    => 'ఫోన్ నెంబర్:',
	'sign-bday'                     => 'వయసు:',
	'sign-email'                    => 'ఈ-మెయిల్ చిరునామా:',
	'sign-indicates-req'            => '<small><i><font color="red">*</font> తప్పనిసరి వాటిని సూచిస్తుంది.</i></small>',
	'sign-hide-note'                => '<small><i><font color="red">**</font> గమనిక: చూపించని సమాచారాన్ని నిర్వాహకులు మాత్రం చూడగలరు.</i></small>',
	'sign-list-anonymous'           => 'అనామకంగా చూపించు',
	'sign-list-hideaddress'         => 'చిరునామాని చూపించకు',
	'sign-list-hideextaddress'      => 'నగరం, రాష్ట్రం, జిప్, లేదా దేశంలను చూపించకు',
	'sign-list-hidephone'           => 'ఫోన్ నంబరు చూపించకు',
	'sign-list-hidebday'            => 'వయసుని చూపించకు',
	'sign-list-hideemail'           => 'ఈ-మెయిలుని చూపించకు',
	'sign-submit'                   => 'సంతకం చేయండి',
	'sig-success'                   => 'ఈ పత్రంపై మీరు విజయవంతంగా సంతకం చేసారు.',
	'sign-viewfield-timestamp'      => 'కాలముద్ర',
	'sign-viewfield-realname'       => 'పేరు',
	'sign-viewfield-address'        => 'చిరునామా',
	'sign-viewfield-city'           => 'నగరం',
	'sign-viewfield-state'          => 'రాష్ట్రం',
	'sign-viewfield-country'        => 'దేశం',
	'sign-viewfield-zip'            => 'జిప్',
	'sign-viewfield-ip'             => 'IP చిరునామా',
	'sign-viewfield-phone'          => 'ఫోన్',
	'sign-viewfield-email'          => 'ఈమెయిల్',
	'sign-viewfield-age'            => 'వయసు',
	'sign-viewfield-options'        => 'ఎంపికలు',
	'sign-sigadmin-currentlyopen'   => 'ఈ పత్రంపై సంతకం చేయడం ప్రస్తుతం సచేతనమైవుంది.',
	'sign-sigadmin-close'           => 'సంతకం చేయడాన్ని అచేతనం చెయ్యండి',
	'sign-sigadmin-currentlyclosed' => 'ఈ పత్రంపై సంతకం చేయడం ప్రస్తుతం అచేతనమైవుంది.',
	'sign-sigadmin-open'            => 'సంతకం చేయడాన్ని చేతనం చెయ్యండి',
	'sign-signatures'               => 'సంతకాలు',
	'sign-sigadmin-closesuccess'    => 'సంతకం చేయడాన్ని విజయవంతంగా అచేతనం చేసాం.',
	'sign-sigadmin-opensuccess'     => 'సంతకం చేయడాన్ని విజయవంతంగా చేతనం చేసాం.',
	'sign-viewsignatures'           => 'సంతకాలు చూడండి',
	'sign-error-closed'             => 'ఈ పత్రంపై సంతకం చేయడాన్ని ప్రస్తుతం అచేతనం చేసారు.',
	'sig-anonymous'                 => '<i>అనామకం</i>',
	'sig-private'                   => '<i>అంతరంగికం</i>',
	'sign-sigdetails'               => 'సంతకం వివరాలు',
	'sign-emailto'                  => '<a href="mailto:$1">$1</a>',
	'sign-viewfield-reviewedby'     => 'సమీక్షకులు',
	'sign-viewfield-reviewcomment'  => 'వ్యాఖ్య',
	'sign-reviewsig'                => 'సంతకాన్ని సమీక్షించండి',
	'sign-review-comment'           => 'వ్యాఖ్య',
	'sign-submitreview'             => 'సమీక్షని దాఖలు చేయండి',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$messages['tet'] = array(
	'sign-realname'           => 'Naran:',
	'sign-city'               => 'Sidade:',
	'sign-email'              => 'Diresaun korreiu eletróniku:',
	'sign-viewfield-realname' => 'Naran',
	'sign-viewfield-city'     => 'Sidade',
	'sign-viewfield-email'    => 'Korreiu eletróniku',
);

/** Tajik (Cyrillic) (Тоҷикӣ/tojikī (Cyrillic))
 * @author Ibrahim
 * @author Siebrand
 */
$messages['tg-cyrl'] = array(
	'sign-realname'                => 'Ном:',
	'sign-address'                 => 'Нишонаи кӯча:',
	'sign-city'                    => 'Шаҳр:',
	'sign-state'                   => 'Вилоят:',
	'sign-country'                 => 'Кишвар:',
	'sign-phone'                   => 'Шумораи телефон:',
	'sign-bday'                    => 'Синну сол:',
	'sign-email'                   => 'Нишонаи E-mail:',
	'sign-viewfield-realname'      => 'Ном',
	'sign-viewfield-address'       => 'Нишона',
	'sign-viewfield-city'          => 'Шаҳр',
	'sign-viewfield-state'         => 'Вилоят',
	'sign-viewfield-country'       => 'Кишвар',
	'sign-viewfield-zip'           => 'Индекс',
	'sign-viewfield-ip'            => 'Нишонаи IP',
	'sign-viewfield-phone'         => 'Телефон',
	'sign-viewfield-email'         => 'Почтаи электронӣ',
	'sign-viewfield-options'       => 'Ихтиёрот',
	'sign-viewfield-reviewcomment' => 'Тавзеҳот',
	'sign-review-comment'          => 'Тавзеҳ',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'sign-city'              => 'Thành phố:',
	'sign-viewfield-city'    => 'Thành phố',
	'sign-viewfield-options' => 'Tùy chọn',
);

/** Volapük (Volapük)
 * @author Malafaya
 */
$messages['vo'] = array(
	'sign-realname'                => 'Nem:',
	'sign-city'                    => 'Zif:',
	'sign-state'                   => 'Tat:',
	'sign-country'                 => 'Län:',
	'sign-viewfield-realname'      => 'Nem',
	'sign-viewfield-city'          => 'Zif',
	'sign-viewfield-state'         => 'Tat',
	'sign-viewfield-country'       => 'Län',
	'sign-viewfield-reviewcomment' => 'Küpet',
);

