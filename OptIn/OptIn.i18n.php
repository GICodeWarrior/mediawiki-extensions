<?php
/**
 * Internationalisation for Usability Initiative OptIn extension
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Roan Kattouw
 */
$messages['en'] = array(
	'optin' => 'Usability Initiative opt-in',
	'optin-desc' => 'Allow users to try Beta, the Usability Initiative\'s latest usability enhancements.',
	'optin-title-optedout' => 'Try Beta',
	'optin-title-optedin' => 'Leave Beta',
	'optin-title-justoptedin' => 'Welcome to Beta',
	'optin-title-justoptedout' => 'Thank you for trying our Beta',
	'optin-title-feedback' => 'Beta feedback',
	'optin-needlogin' => 'You need to [$1 log in] to try Beta.',
	'optin-intro' => 'The Wikipedia Usability Initiative has been working hard to improve the usability of Wikipedia.
Would you like to try our Beta?',
	'optin-feedback-intro' => "Thank you for trying Beta.
We would like to know what you think of our new interface, so we would appreciate it if you filled out the optional survey below.",
	'optin-feedback-back' => 'If you do not want to fill out the survey, you can return to $1.',
	'optin-success-in' => 'You are now trying out Beta.
You can opt back out at any time by clicking the "{{int:optin-leave}}" link on the top of the page.',
	'optin-leave-cancel' => 'If you would like to continue using Beta, you can return to $1.',
	'optin-success-out' => 'You have successfully left Beta.
You can try it out again at anytime by clicking the "{{int:optin-try}}" link on the top of the page.',
	'optin-success-feedback' => 'Thank you for your feedback!',
	'optin-accept-short' => 'Let\'s do it!',
	'optin-accept-long' => 'Try out Beta',
	'optin-accept-long-anon' => 'Log in and try out Beta',
	'optin-deny-short' => 'No thank you',
	'optin-deny-long' => 'Return to previous page',
	'optin-submit-out' => 'Leave Beta',
	'optin-submit-feedback' => 'Give feedback',
	'optin-survey-yes' => 'Yes',
	'optin-survey-no' => 'No',
	'optin-survey-intro' => "Thank you for trying the Beta.
We would like to know what you think about our new interface, so we would appreciate it if you filled out the optional survey below before clicking \"[[#leave|{{int:optin-submit-out}}]]\".",
	'optin-survey-question-likedislike' => 'What did you like about the Beta? What did you dislike about the Beta?',
	'optin-survey-question-whyoptout' => 'Why are you leaving the Beta? (Please select all that apply.)',
	'optin-survey-answer-whyoptout-hard' => 'It was too hard to use.',
	'optin-survey-answer-whyoptout-didntwork' => 'It did not function properly.',
	'optin-survey-answer-whyoptout-notpredictable' => 'It did not perform predictably.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'I did not like the way it looked.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'I did not like the new tabs and layout.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'I did not like the new toolbar.',
	'optin-survey-answer-whyoptout-other' => 'Other reason:',
	'optin-survey-question-explain' => 'Please explain or elaborate on your answer above:',
	'optin-survey-question-techfail' => 'Have you experienced any technical failures while using the Beta?',
	'optin-survey-question-techfail-ifyes' => 'If yes, please elaborate or explain:',
	'optin-survey-question-usedtoolbar' => 'Have you used the new expandable toolbar to edit a page?',
	'optin-survey-question-usedtoolbar-ifyes' => 'If yes, what did you like about it? What did you dislike about it?',
	'optin-survey-question-usedtoolbar-ifno' => 'If no, why not? Will you in the future? Please explain.',
	'optin-survey-question-different' => 'What could we have done differently to keep you using the Beta?',
	'optin-survey-question-feedback' => 'Please let us know about any other comments, concerns or thoughts you have for us - all feedback is useful:',
	'optin-survey-question-browser' => 'Which browser do you use?',
	'optin-survey-answer-browser-ie5' => 'Internet Explorer 5',
	'optin-survey-answer-browser-ie6' => 'Internet Explorer 6',
	'optin-survey-answer-browser-ie7' => 'Internet Explorer 7',
	'optin-survey-answer-browser-ie8' => 'Internet Explorer 8',
	'optin-survey-answer-browser-ff1' => 'Firefox 1',
	'optin-survey-answer-browser-ff2' => 'Firefox 2',
	'optin-survey-answer-browser-ff3' => 'Firefox 3',
	'optin-survey-answer-browser-cb' => 'Google Chrome Beta',
	'optin-survey-answer-browser-c1' => 'Google Chrome 1',
	'optin-survey-answer-browser-c2' => 'Google Chrome 2',
	'optin-survey-answer-browser-c3' => 'Google Chrome 3',
	'optin-survey-answer-browser-c4' => 'Google Chrome 4',
	'optin-survey-answer-browser-s3' => 'Safari 3',
	'optin-survey-answer-browser-s4' => 'Safari 4',
	'optin-survey-answer-browser-o9' => 'Opera 9',
	'optin-survey-answer-browser-o9.5' => 'Opera 9.5',
	'optin-survey-answer-browser-o10' => 'Opera 10',
	'optin-survey-answer-browser-other' => 'Other browser:',
	'optin-survey-question-os' => 'Which operating system do you use?',
	'optin-survey-answer-os-windows' => 'Windows',
	'optin-survey-answer-os-windowsmobile' => 'Windows Mobile',
	'optin-survey-answer-os-macos' => 'Mac OS',
	'optin-survey-answer-os-iphoneos' => 'iPhone OS',
	'optin-survey-answer-os-linux' => 'Linux',
	'optin-survey-answer-os-other' => 'Other operating system:',
	'optin-survey-question-res' => 'What is the resolution of your screen?',
	'optin-survey-question-changes' => 'What changes would you like to see in the Beta in the future (please select all that apply)?',
	'optin-survey-answer-changes-nav' => 'Make the overall navigation of the site easier to use.',
	'optin-survey-answer-changes-edittools' => 'Increase and enhance the editing tools.',
	'optin-survey-answer-changes-upload' => 'Improve content and media uploads.',
	'optin-survey-answer-changes-richtext' => 'Develop editing tools similar to rich-text editors.',
	'optin-survey-answer-changes-lookfeel' => 'Update the "look and feel" of the site.',
	'optin-survey-answer-changes-predictability' => 'Improve predictability of performance.',
	'optin-survey-answer-changes-custom' => 'Allow greater user customization.',
	'optin-survey-answer-changes-other' => 'Other:',
	'optin-improvements' => "== What has been improved? ==
[[File:UsabilityNavigation.png|left|link=]]
;Enhanced navigation
The new navigation system makes it easier to see where you are and what you are doing, as well as where you can go and how to get there. With the search box located in the top right corner, the search feature is easier to find and quicker to use.
<div style=\"clear:both;\"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Edit toolbar improvements
New-and-improved icons make it clearer what action each tool performs. Expandable sections reduce clutter while keeping infrequently used tools just a click away.
The help section provides quick access to a reference for common uses of wiki-markup.
<div style=\"clear:both;\"></div>
== How to get involved ==
To learn more about the project or to get involved, please visit the [http://usability.wikimedia.org Usability Initiative's wiki].  There you will find information about our grant, research, design + development, and releases.  To ask questions or leave general feedback, please use our [http://usability.wikimedia.org/wiki/Talk:Prototype prototype discussion page].  To address particular subjects, please use the associated discussion pages.  If you find bugs, please leave your comments on the [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai release discussion page] or by using [https://bugzilla.wikimedia.org Bugzilla].

Thanks and we look forward to hearing from you!",
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Fryed-peach
 * @author Mormegil
 * @author Purodha
 */
$messages['qqq'] = array(
	'optin-desc' => 'Açai is the name of the release, do not translate. In this context, "Beta" is a stage in software development.',
	'optin-title-optedout' => 'Title of Special:UsabilityOptIn when the user is opted out',
	'optin-title-optedin' => 'Title of Special:UsabilityOptIn when the user is opted in',
	'optin-title-justoptedin' => 'Title of Special:UsabilityOptIn when the user has just opted in',
	'optin-title-justoptedout' => 'Title of Special:UsabilityOptIn when the user has just opted out',
	'optin-accept-short' => 'Upper half of caption for Yes button on opt-in form',
	'optin-accept-long' => 'Bottom half of caption for Yes button on opt-in form',
	'optin-deny-short' => 'Upper half of caption for No button on opt-in form',
	'optin-deny-long' => 'Bottom half of caption for No button on opt-in form for logged-in users',
	'optin-submit-out' => 'Caption for submit button on opt-out/survey form',
	'optin-submit-feedback' => 'Caption of the submit button on the Usability Initiative Beta feedback form.',
	'optin-survey-yes' => '{{Identical|Yes}}',
	'optin-survey-no' => '{{Identical|No}}',
	'optin-survey-intro' => 'Do not translate #leave',
	'optin-survey-answer-whyoptout-notpredictable' => '"not predictably" means somehing like "randomly". Results of clicks are not alway the same.',
	'optin-survey-answer-whyoptout-other' => '{{Identical|Other reason}}',
	'optin-survey-answer-os-other' => '',
	'optin-survey-answer-changes-other' => '{{Identical|Other}}',
	'optin-improvements' => 'A few paragraphs of wikitext describing the improvements made in Beta. The referenced images have been uploaded to Commons',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'optin-title-optedout' => 'Probeer Beta',
	'optin-title-optedin' => 'Verlaat Beta',
	'optin-title-justoptedin' => 'Welkom by Beta',
	'optin-title-justoptedout' => 'Baie dankie dat u Beta uitprobeer het',
	'optin-title-feedback' => 'Beta terugvoer',
	'optin-needlogin' => 'U moet [$1 aanteken] voordat u Beta kan gebruik.',
	'optin-success-feedback' => 'Baie dankie vir u terugvoer!',
	'optin-accept-short' => 'Inskakeling',
	'optin-accept-long-anon' => 'Teken in en probeer Beta',
	'optin-deny-short' => 'Nee dankie',
	'optin-deny-long' => 'Terug na die vorige bladsy',
	'optin-submit-out' => 'Verlaat Beta',
	'optin-submit-feedback' => 'Gee terugvoer',
	'optin-survey-yes' => 'Ja',
	'optin-survey-no' => 'Nee',
	'optin-survey-answer-whyoptout-other' => 'Ander rede:',
	'optin-survey-question-browser' => 'Watter webblaaier gebruik u?',
	'optin-survey-answer-browser-other' => 'Ander webblaaier:',
	'optin-survey-question-os' => 'Watter bedryfstelsel gebruik u?',
	'optin-survey-answer-os-other' => 'Ander bedryfstelsel:',
	'optin-survey-answer-changes-other' => 'Ander:',
);

/** Arabic (العربية)
 * @author ;Hiba;1
 * @author Meno25
 * @author OsamaK
 */
$messages['ar'] = array(
	'optin' => 'اشتراك مبادرة الاستخدام',
	'optin-desc' => 'إن السماح للمستخدمين بتجربة البيتا آخر تطورات مبادرة الاستخدامية (Usability Initiative).',
	'optin-title-optedout' => 'جرّب البيتا',
	'optin-title-optedin' => 'غادر البيتا',
	'optin-title-justoptedin' => 'أهلا بك في بيتا',
	'optin-title-justoptedout' => 'شكرًا لتجريبك البيتا.',
	'optin-title-feedback' => 'شاركنا ملاحظاتك و اقتراحاتك',
	'optin-needlogin' => 'يجب أن [$1 تسجل دخولك] لتجرّب البيتا.',
	'optin-intro' => 'عملت مبادرة استخدامية ويكيبيديا (Wikipedia Usability Initiative) بجد على تحسين استخدامية ويكيبيديا.
أترغب في تجربة نسختنا البيتا؟',
	'optin-feedback-intro' => 'شكرًا لتجريبك البيتا.
نود الإطلاع على رأيك في الواجهة الجديدة، لذا فإننا سنقدر ملأك للاستطلاع الاختياري أدناه.',
	'optin-feedback-back' => 'إذا لم ترغب بملء الاستطلاع، يمكنك الرجوع إلى $1.',
	'optin-success-in' => 'تقوم الآن بتجريب البيتا.
تستطيع العودة في أي وقت بنقر وصلة "{{int:optin-leave}}" في أعلى الشاشة.',
	'optin-leave-cancel' => 'إن كنت تريد الاستمرار في استخدام بيتا, فيمكنك الرجوع إلى $1.',
	'optin-success-out' => 'لقد تركت البيتا بنجاح.
تستطيع تجريبها مرة أخرى في أي وقت بنقر وصلة "{{int:optin-try}}" في أعلى يسار الشاشة.',
	'optin-success-feedback' => 'شكرًا لك على ملاحظاتك!',
	'optin-accept-short' => 'لنجربها!',
	'optin-accept-long' => 'جرّب البيتا',
	'optin-accept-long-anon' => 'انشىء حسابا و قم بتجريب بيتا',
	'optin-deny-short' => 'لا، شكرًا',
	'optin-deny-long' => 'ارجع إلى الصفحة السابقة',
	'optin-submit-out' => 'غادر البيتا',
	'optin-submit-feedback' => 'أعطِ ملاحظاتك',
	'optin-survey-yes' => 'نعم',
	'optin-survey-no' => 'لا',
	'optin-survey-intro' => 'شكرًا لتجريب البيتا.
نود أن نطلع على رأيك في واجهتنا الجديدة، لذا فإننا سنقدر ملأك الاستطلاع الاختياري أدناه قبل أن تنقر "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'ما الذي أعجبك في البيتا؟ ما الذي لم يعجبك فيها؟',
	'optin-survey-question-whyoptout' => 'لماذا تغادر البيتا؟ (رجاءً حدّد كل ما ينطبق)',
	'optin-survey-answer-whyoptout-hard' => 'كانت صعبة الاستخدام.',
	'optin-survey-answer-whyoptout-didntwork' => 'لم تؤدِ الغرض بشكل ملائم.',
	'optin-survey-answer-whyoptout-notpredictable' => 'لم تعمل حسب ما توقعت.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'لم يعجبني مظهرها.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'لم يعجبني التصميم والألسنة الجديدة.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'لم يعجبني شريط الأدوات الجديد.',
	'optin-survey-answer-whyoptout-other' => 'أسباب أخرى:',
	'optin-survey-question-explain' => 'رجاءً وضّح وفصّل إجابتك أعلاه:',
	'optin-survey-question-techfail' => 'هل واجهت أي فشل تقني أثناء استخدامك البيتا؟',
	'optin-survey-question-techfail-ifyes' => 'إذا كانت الإجابة بنعم، فمن فضلك فصّل ووضَح:',
	'optin-survey-question-usedtoolbar' => 'هل سبق لك أن استخدمت شريط الأدوات الجديد القابل للتمديد لتحرير صفحة؟',
	'optin-survey-question-usedtoolbar-ifyes' => 'إذا كانت الإجابة بنعم، فما الذي أعجبك فيه؟ وما الذي لم يعجبك فيه؟',
	'optin-survey-question-usedtoolbar-ifno' => 'إذا كانت الإجابة بلا، فلم لم تستخدمه؟ أستسخدمه في المستقبل؟ من فضلك وضّح الإجابة.',
	'optin-survey-question-different' => 'ماذا كان بإمكاننا فعله لكي تستمر في استخدام البيتا؟',
	'optin-survey-question-feedback' => 'من فضلك أطلعنا على أي ملاحظات أو مخاوف أو آراء أخرى عن المشروع - كل ملاحظة مفيدة!:',
	'optin-survey-question-browser' => 'ما المتصفح الذي تستخدمه؟',
	'optin-survey-answer-browser-other' => 'متصفح آخر:',
	'optin-survey-question-os' => 'ما نظام التشغيل الذي تستخدمه؟',
	'optin-survey-answer-os-other' => 'نظام تشغيل آخر:',
	'optin-survey-question-res' => 'ما أبعاد شاشتك؟',
	'optin-survey-question-changes' => 'ما التغييرات التي تطمح لرؤيتها في بيتا المستقبل؟ (من فضلك اختر كل ما ينطبق)',
	'optin-survey-answer-changes-nav' => 'جعل تصفح الموقع بشكل عام أسهل.',
	'optin-survey-answer-changes-edittools' => 'زيادة وتحسين أدوات التحرير.',
	'optin-survey-answer-changes-upload' => 'تحسين المحتويات والوسائط المرفوعة.',
	'optin-survey-answer-changes-richtext' => 'تطوير أدوات تحرير شبيهة بمحررات النصوص الغنية (rich-text).',
	'optin-survey-answer-changes-lookfeel' => 'تحديث "منظر وإحساس" الموقع.',
	'optin-survey-answer-changes-predictability' => 'تطوير القدرة على تنبؤ الأداء.',
	'optin-survey-answer-changes-custom' => 'السماح بتخصيص أكبر من المستخدم.',
	'optin-survey-answer-changes-other' => 'غير ذلك:',
	'optin-improvements' => '<div dir="rtl">
== ما الذي تحسن؟ ==
[[File:UsabilityNavigation.png|left|link=]]
;تصفح أفضل
يسهل نظام التصفح الجديد معرفة المكان الذي أنت فيه والشيء الذي تقوم به، كما يريك كيفية الوصول إلى الصفحات بوضوح. صندوق البحث وضع في الزاوية العليا، لتصبح عملية البحث أسرع وأسهل استخداما.
[[File:UsabilityToolbar.png|left|link=]]
;شريط أدوات التحرير قد تطور
الأيقونات الجديدة ستجعل تحرير المقالات أسهل وأكثر وضوحا، بحيث يوضح لك النظام الجديد وظيفة هذه الأيقونات. كما تجعل المقاطع القابلة للتمديد عملية البحث عن الأداة أو الأيقونة أسهل، مع جعل الأدوات التي لا تستخدم كثيراً تظهر بضغطة زر واحدة. بالإضافة إلى ذلك، زود شريط الأدوات بقسم للمساعدة السريعة لتوضيح وظائف الأيقونات والشروحات المبسطة لاستخدام رموز الويكي.

== كيف يمكنك المشاركة؟ ==
لمعرفة المزيد حول المشروع أو للمشاركة فيه، بإمكانك زيارة صفحة [http://usability.wikimedia.org Usability Initiative]. هناك ستجد معلومات حول منحنا، وأبحاثنا، وتصاميمنا، وتطويراتنا، وإصداراتنا. لكي تطرح الأسئلة أو لكي تترك انطباعك العام، بإمكانك استخدام صفحة المناقشة [http://usability.wikimedia.org/wiki/Talk:Prototype هذه]. بإمكانك طرح الموضوعات الأخرى هناك أيضا. إذا رأيت أية مشكلة في النظام الجديد، بإمكانك ترك الملاحظات في [http://usability.wikimedia.org/wiki/Talk:Releases/Acai صفحة نقاش مشروع Acai] أو من خلال [https://bugzilla.wikimedia.org Bugzilla].

شكراً ونتمنى سماع رأيك!
</div>',
);

/** Aramaic (ܐܪܡܝܐ)
 * @author Basharh
 */
$messages['arc'] = array(
	'optin-title-optedout' => 'ܢܣܝ ܒܝܛܐ',
	'optin-title-optedin' => 'ܫܒܘܩ ܒܝܛܐ',
	'optin-title-justoptedin' => 'ܒܫܝܢܐ ܒܟ ܒܒܝܛܐ',
	'optin-title-justoptedout' => 'ܬܘܕܝ ܠܢܣܝܢܐ ܕܒܝܛܐ',
	'optin-title-feedback' => 'ܡܚܫܚܬ̈ܐ ܘܡܥܝܪ̈ܢܘܬܐ ܥܠ ܒܝܛܐ',
	'optin-success-feedback' => 'ܬܘܕܝ ܥܠ ܡܚܫܚܬ̈ܐ ܘܡܥܝܪ̈ܢܘܬܐ',
	'optin-accept-short' => 'ܢܣܝ',
	'optin-accept-long' => 'ܢܣܝ ܒܝܛܐ',
	'optin-accept-long-anon' => 'ܥܘܠ ܘܢܣܝ ܒܝܛܐ',
	'optin-deny-short' => 'ܠܐ ܬܘܕܝ',
	'optin-deny-long' => 'ܦܢܝ ܠܦܐܬܐ ܩܕܝܡܬܐ',
	'optin-submit-out' => 'ܫܒܘܩ ܒܝܛܐ',
	'optin-submit-feedback' => 'ܗܒ ܡܚܫܚܬ̈ܐ ܘܡܥܝܪ̈ܢܘܬܐ',
	'optin-survey-yes' => 'ܐܝܢ',
	'optin-survey-no' => 'ܠܐ',
	'optin-survey-answer-whyoptout-other' => 'ܥܠܬܐ ܐܚܪܬܐ:',
	'optin-survey-answer-os-other' => '',
	'optin-survey-answer-changes-other' => 'ܐܚܪܢܐ:',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Ghaly
 * @author Ramsis II
 */
$messages['arz'] = array(
	'optin-title-optedout' => 'تجريب بيتا',
	'optin-title-optedin' => 'سيب البيتا',
	'optin-accept-long' => 'جرّب البيتا',
	'optin-deny-short' => 'لا، شكرًا',
	'optin-submit-out' => 'سيب البيتا',
	'optin-survey-no' => 'لا',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 * @author Red Winged Duck
 */
$messages['be-tarask'] = array(
	'optin' => 'Удзел у ініцыятыве па паляпшэньні зручнасьці і прастаты выкарыстаньня',
	'optin-desc' => 'Дазваляе ўдзельнікам паспрабаваць Beta, апошняе паляпшэньне, зробленае ў рамках ініцыятывы па паляпшэньню зручнасьці і прастаты выкарыстаньня',
	'optin-title-optedout' => 'Паспрабаваць Beta',
	'optin-title-optedin' => 'Пакінуць Beta',
	'optin-title-justoptedin' => 'Вітаем у Beta',
	'optin-title-justoptedout' => 'Дзякуй за спробу выкарыстаньня Beta',
	'optin-title-feedback' => 'Зваротная сувязь',
	'optin-needlogin' => 'Вам неабходна [$1 увайсьці ў сыстэму] каб далучыцца да Beta',
	'optin-intro' => 'У рамках ініцыятывы па паляпшэньні зручнасьці і прастаты выкарыстаньня Вікіпэдыі была праведзеная буйная праца па паляпшэньні зручнасьці і прастаты выкарыстаньня Вікіпэдыі. Вы жадаеце паспрабаваць Beta?',
	'optin-feedback-intro' => 'Дзякуй за выкарыстаньне Beta.
Нам цікава ведаць, што Вы мяркуеце пра наш новы інтэрфэйс, таму мы былі б удзячныя, калі Вы запоўнілі неабавязковае апытаньне ўнізе.',
	'optin-feedback-back' => 'Калі Вы не жадаеце запаўняць апытаньне, Вы можаце вярнуцца да $1.',
	'optin-success-in' => 'Цяпер Вы прымаеце ўдзел у выпрабаваньні Beta.
Вы можаце пакінуць выпрабаваньне ў любы час націснуўшы кнопку «{{int:optin-leave}}» у верхяй частцы экрана.',
	'optin-leave-cancel' => 'Калі Вы жадаеце працягваць выкарыстаньне Beta, Вы можаце вярнуцца да $1',
	'optin-success-out' => 'Вы пасьпяхова пакінулі Beta.
Вы можаце зноў паспрабаваць яе націснуўшы кнопку «{{int:optin-try}}» у правым верхнім куце экрана.',
	'optin-success-feedback' => 'Дзякуй за зваротную сувязь!',
	'optin-accept-short' => 'Зрабіць гэта!',
	'optin-accept-long' => 'Паспрабаваць Beta',
	'optin-accept-long-anon' => 'Увайсьці ў сыстэму і паспрабаваць Beta',
	'optin-deny-short' => 'Не, дзякуй',
	'optin-deny-long' => 'вярнуцца да папярэдняй старонкі',
	'optin-submit-out' => 'Пакінуць Beta',
	'optin-submit-feedback' => 'Даслаць',
	'optin-survey-yes' => 'Так',
	'optin-survey-no' => 'Не',
	'optin-survey-intro' => 'Дзякуй за выпрабаваньне Beta.

Мы жадаем ведаць, што Вы мяркуеце пра новы інтэрфэйс, з-за гэтага мы былі б удзячныя, калі б Вы прынялі ўдзел у неабавязковым апытаньні, перад тым як Вы націсьніце «[[#leave|{{int:optin-submit-out}}]]».',
	'optin-survey-question-likedislike' => 'Што Вам спадабалася ў Beta? Што Вам не спадабалася ў Beta?',
	'optin-survey-question-whyoptout' => 'Чаму Вы вырашылі пакінуць Beta? (калі ласка, выберыце ўсе прычыны)',
	'optin-survey-answer-whyoptout-hard' => 'Занадта складаны ў выкарыстаньні.',
	'optin-survey-answer-whyoptout-didntwork' => 'Ён не працуе належным чынам.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Ён працуе не як чакалася.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Мне не спадабаўся зьнешні выгляд.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Мне не спадабаліся новыя закладкі і кампаноўка.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Мне не спадабалася новая панэль інструмэнтаў.',
	'optin-survey-answer-whyoptout-other' => 'Іншая прычына:',
	'optin-survey-question-explain' => 'Калі ласка, растлумачце ці ўдакладніце Ваш адказ ніжэй:',
	'optin-survey-question-techfail' => 'Вы сутыкнуліся з якімі-небудзь тэхнічнымі праблемамі пад час выкарыстаньня Beta?',
	'optin-survey-question-techfail-ifyes' => 'Калі так, калі ласка ўдакладніце ці растлумачце:',
	'optin-survey-question-usedtoolbar' => 'Вы выкарыстоўвалі новую панэль інструмэнтаў пры рэдагаваньні старонкі?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Калі так, што Вам у ёй спадабалася? Што не спадабалася?',
	'optin-survey-question-usedtoolbar-ifno' => 'Калі не, чаму? Ці будзіце выкарыстоўваць у будучыні? Калі ласка, растлумачце.',
	'optin-survey-question-different' => 'Што нам можна зрабіць інакш, каб Вы працягвалі карыстацца нашай Beta?',
	'optin-survey-question-feedback' => 'Калі ласка, паведаміце нам Вашае меркаваньне:',
	'optin-survey-question-browser' => 'Якім браўзэрам Вы карыстаецеся?',
	'optin-survey-answer-browser-other' => 'Іншы браўзэр:',
	'optin-survey-question-os' => 'Якой апэрацыйнай сыстэмай Вы карыстаецеся?',
	'optin-survey-answer-os-other' => 'Іншая апэрацыйная сыстэма:',
	'optin-survey-question-res' => 'Якое разрозьненьне Вашага манітора?',
	'optin-survey-question-changes' => 'Якія зьмены Вы жадаеце бачыць у Beta ў будучыці (выберыце ўсё што падыходзіць)?',
	'optin-survey-answer-changes-nav' => 'Зрабіць навігацыю па сайту больш простай у выкарыстаньні.',
	'optin-survey-answer-changes-edittools' => 'Пашырыць і палепшыць інструмэнты рэдагаваньня.',
	'optin-survey-answer-changes-upload' => 'Палепшыць загрузку зьместу і мэдыя-файлаў.',
	'optin-survey-answer-changes-richtext' => 'Распрацаваць прылады рэдагаваньня, падобныя на тэкставыя рэдактары.',
	'optin-survey-answer-changes-lookfeel' => 'Абнавіць «зьнешні выгляд і запаўненьне» сайта.',
	'optin-survey-answer-changes-predictability' => 'Палепшыць прадказальнасьць хуткадзеяньня.',
	'optin-survey-answer-changes-custom' => 'Дазволіць удзельнікам пашыраную настройку.',
	'optin-survey-answer-changes-other' => 'Іншыя:',
	'optin-improvements' => '== Што было палепшана? ==
[[File:UsabilityNavigation.png|left|link=]]
;Паляпшэньне навігацыі
Новая навігацыйная сыстэма дазвяляе лягчэй зразумець дзе Вы знаходзіцеся і што робіце, а так сама куды Вы можаце перайсьці і як гэта зрабіць. Поле пошуку перанесена з левай навігацыйнай панэлі ў верхні правы вугал для палягчэньня і паскарэньня пошуку.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Паляпшэньне панэлі рэдагаваньняў
Новыя і палепшаныя значкі дазваляюць лягчэй зразумець якія дзеяньні выконвае кожная прылада. Адчыняемыя сэктары зьмяньшаюць тлум, захоўваючы рэдка выкарыстоўваемыя прылады для кліку мышкай. Дапаможны падзел забясьпечвае хуткі доступ да прыкладаў па найбольш выкарыстоўваемым тыпам вікі-метак.
<div style="clear:both;"></div>
== Як далучыцца ==
Каб даведацца болей пра праект, ці ці прыняць у ім удзел, калі ласка наведайце [http://usability.wikimedia.org Вікі-сайт ініцыятывы Usability].  Там Вы знойдзіце інфармацыю пра нашыя гранты, дасьледаваньні, дызайн + распрацоўкі і рэлізы.  Каб задаць пытаньні ці заставіць водгук, калі ласка, карыстайцеся нашай [http://usability.wikimedia.org/wiki/Talk:Prototype старонкай абмеркаваньня прататыпу].  Для рашэньня неадкладных пытаньняў, калі ласка, карыстайцеся адпаведныя старонкі абмеркаваньня.  Калі Вы знайшлі памылку, калі ласка, застаўце свой камэнтар на [http://usability.wikimedia.org/wiki/Talk:Releases/Acai старонцы абмеркаваньня Acai] ці праз выкарыстаньне [https://bugzilla.wikimedia.org Bugzilla].

Дзякуй, мы чакаем Вашых водгукаў!',
);

/** Bengali (বাংলা)
 * @author Bellayet
 */
$messages['bn'] = array(
	'optin-desc' => 'ব্যবহারকারীদের বেটা ব্যবহারের সুযোগ দিন, ইউজাবিলিটি ইনিসিয়াটিভ হল সাম্প্রতিকতম ব্যবহারযোগ্যতা বৃদ্ধি।',
	'optin-title-optedout' => 'বেটা চেষ্টা করুন',
	'optin-title-optedin' => 'বেটা ছেড়ে যান',
	'optin-title-justoptedin' => 'বেটায় স্বাগতম',
	'optin-title-justoptedout' => 'বেটা চেষ্টা করার জন্য আপনাকে ধন্যবাদ',
	'optin-title-feedback' => 'বেটা ফিডব্যাক',
	'optin-needlogin' => 'বেটা চেষ্টা করার জন্য আপনাকে [$1 লগইন] করতে হবে।',
	'optin-intro' => 'উইকিপিডিয়ার ব্যবহারযোগ্যতার উন্নয়ন করার জন্য উইকিপিডিয়া ইউজাবিলিটি ইনিসিয়েটিভ কঠর পরিশ্রম করে যাচ্ছে।
আপনি বেটা ব্যবহার করতে চান?',
	'optin-success-feedback' => 'আপনার ফিডব্যাকের জন্য ধন্যবাদ!',
	'optin-accept-short' => 'চলুন শুরু করি!',
	'optin-accept-long' => 'বেটা চেষ্টা করুন',
	'optin-accept-long-anon' => 'লগইন করুন এবং বেটা চেষ্টা করুন',
	'optin-deny-short' => 'না ধন্যবাদ',
	'optin-deny-long' => 'পূর্বের পাতায় ফিরে যাও',
	'optin-submit-out' => 'বেটা ছেড়ে যাও',
	'optin-submit-feedback' => 'ফিডব্যাক দিন',
	'optin-survey-yes' => 'হ্যা',
	'optin-survey-no' => 'না',
	'optin-survey-question-likedislike' => 'বেটায় আপনার কি পছন্দ হয়েছে? বেটায় আপনার কি পছন্দ হয় নাই?',
	'optin-survey-question-whyoptout' => 'আপনি বেটা কেন ছেড়ে যাচ্ছেন? (অনুগ্রহ করে যেগুলো প্রযোজ্য প্রয়োগ করুন)',
	'optin-survey-answer-whyoptout-hard' => 'এতে কাজ করা কঠিন।',
	'optin-survey-answer-whyoptout-didntwork' => 'এটি ঠিক মত কাজ করে না।',
	'optin-survey-answer-whyoptout-notpredictable' => 'এটি আন্দাজ মত কাজ করে না।',
	'optin-survey-answer-whyoptout-didntlike-look' => 'এটা দেখতে যেমন তা আমার পছন্দ নয়।',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'নতুন ট্যাব এবং বিন্যাস আমার পছন্দ হয়নি।',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'নতুন টুলবার আমার পছন্দ হয়নি।',
	'optin-survey-answer-whyoptout-other' => 'অন্য কারণ:',
	'optin-survey-question-explain' => 'উপরে দেওয়া আপনার উত্তর অনুগ্রহ করে বিস্তারিত এবং বুঝিয়ে বলুন:',
	'optin-survey-question-techfail' => 'বেটা ব্যবহারের সময় আপনি কি কোন কারগরি দূর্বলতা লক্ষ্য করেছেন?',
	'optin-survey-question-techfail-ifyes' => 'হ্যা হলে, অনুগ্রহ করে বিস্তারিত লিখুন:',
	'optin-survey-question-usedtoolbar' => 'আপনি কি পাতা সম্পাদনার জন্য নতুন সম্প্রসারণযোগ্য টুলবার ব্যবহার করেছেন?',
	'optin-survey-question-usedtoolbar-ifyes' => 'হ্যা হলে, এটা সম্পর্কে কি পছন্দ হয়েছে? এটা সম্পর্কে কি পছন্দ হয় নাই?',
	'optin-survey-question-usedtoolbar-ifno' => 'না হলে, কেন ব্যবহার করেন নি? ভবিষ্যতে ব্যবহার করবেন? অনুগ্রহ করে বিস্তারিত লিখুন।',
	'optin-survey-question-different' => 'বেটা ব্যবহার করতে আমরা আরও অন্য কি করতে পারি?',
	'optin-survey-question-browser' => 'আপনি কোন ব্রাউজার ব্যবহার করেন?',
	'optin-survey-answer-browser-other' => 'অন্য ব্রাউজার:',
	'optin-survey-question-os' => 'আপনি কোন অপারেটিং সিস্টেম ব্যবহার করেন?',
	'optin-survey-answer-os-other' => 'অন্য অপারেটিং সিস্টেম:',
	'optin-survey-question-res' => 'আপনার পর্দার রেজ্যুলেশন কত?',
	'optin-survey-answer-changes-edittools' => 'সম্পাদনা টুল বৃদ্ধি এবং সমৃদ্ধ করা।',
	'optin-survey-answer-changes-upload' => 'কন্টেন্ট এবং মিডিয়া আপলোড ব্যবস্থার উন্নয়ন।',
	'optin-survey-answer-changes-lookfeel' => 'সাইটের "লুক এন্ড ফিল" হালনাগাদ করুন।',
	'optin-survey-answer-changes-other' => 'অন্য:',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'optin-title-optedout' => 'Amprouiñ Beta',
	'optin-title-optedin' => 'Dilezel Beta',
	'optin-title-justoptedin' => 'Degemer mat war Beta',
	'optin-title-justoptedout' => "Trugarez deoc'h da amprouiñ ar Beta",
	'optin-title-feedback' => 'Roit ho soñj war ar Beta',
	'optin-needlogin' => "Ret eo deoc'h bezañ [$1 luget] evit ober gant Beta.",
	'optin-feedback-intro' => "Trugarez deoc'h da amprouiñ Beta.
Ni a garfe gouzout petra a soñjit diwar-benn an etrefas nevez, setu e vefemp laouen ma restpontfec'h d'ar goulennoù dindan.",
	'optin-success-in' => "Emaoc'h oc'h amprouiñ Beta.
Gallout a rit distreiñ d'ar stumm boas pa garit en ur glikañ war al liamm \"{{int:optin-leave}}\" e laez ar skramm.",
	'optin-success-feedback' => 'Trugarez evit bezañ roet ho soñj !',
	'optin-accept-short' => "Bec'h de'i",
	'optin-accept-long' => 'Amprouiñ Beta',
	'optin-accept-long-anon' => 'Emlugit ha grit un taol-esae gant Beta',
	'optin-deny-short' => 'Ket, trugarez',
	'optin-deny-long' => "Distreiñ d'ar bajenn gent",
	'optin-submit-out' => 'Dilezel Beta',
	'optin-submit-feedback' => 'Roit ho soñj',
	'optin-survey-yes' => 'Ya',
	'optin-survey-no' => 'Ket',
	'optin-survey-intro' => 'Trugarez da amprouiñ ar Beta.
Ni a garfe gouzout petra a soñjit diwar-benn an etrefas nevez, setu e vefemp laouen ma respontfec\'h d\'ar goulennoù dindan a-raok klikañ war "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => "Petra zo plijet deoc'h er Beta ? Petra n'eus displijet deoc'h ?",
	'optin-survey-question-whyoptout' => "Perak e fell deoc'h dilezel ar Beta ? (dibabit kement tra a glot gant ho soñj)",
	'optin-survey-answer-whyoptout-hard' => 'Start e oa da embreger.',
	'optin-survey-answer-whyoptout-didntwork' => "Ne'z ae ket plaen en-dro.",
	'optin-survey-answer-whyoptout-notpredictable' => "Ne'z ae ket en-dro en un doare poellek.",
	'optin-survey-answer-whyoptout-didntlike-look' => 'Ne blije ket din an tres anezhañ.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Ne blije ket din ar varrenn ostilhoù nevez.',
	'optin-survey-answer-whyoptout-other' => 'Abeg all :',
	'optin-survey-question-browser' => 'Peseurt merdeer a rit gantañ ?',
	'optin-survey-answer-browser-other' => 'Merdeer all :',
	'optin-survey-question-os' => 'Peseurt reizhiad korvoiñ a rit gantañ ?',
	'optin-survey-question-res' => 'Petra eo spisder ho skramm ?',
	'optin-survey-answer-changes-other' => 'Traoù all :',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'optin' => 'Prijava na Inicijativu upotrebljivosti',
	'optin-desc' => 'Omogućuje korisnicima da isprobaju Beta, posljednje poboljšanje upotrebljivosti putem Inicijative upotrebljivosti.',
	'optin-title-optedout' => 'Isprobaj Beta',
	'optin-title-optedin' => 'Napusti Beta',
	'optin-title-justoptedin' => 'Dobrodošli na Beta',
	'optin-title-justoptedout' => 'Hvala što isprobavate Beta',
	'optin-title-feedback' => 'Slanje povratnih informacija',
	'optin-needlogin' => 'Morate se [$1 prijaviti] da biste mogli isprobati Beta.',
	'optin-intro' => 'Wikipedia Inicijativa upotrebljivosti radi na poboljšanju upotrebljivosti Wikipedije. Da li želite isprobati Beta?',
	'optin-feedback-intro' => 'Zahvaljujemo Vam se za isprobavanje Bete.
Željeli bismo saznati šta mislite o našem novom interfejsu, pa Vas molimo da ispunite neobavezni upitnik ispod.',
	'optin-feedback-back' => 'Ako ne želite da popunite upitnik, možete se vratiti na $1.',
	'optin-success-in' => 'Sada možete isprobati Beta.
Možete se bilo kada odjaviti putem klikanja na link "{{int:optin-leave}}" u gornjem dijelu ekrana.',
	'optin-leave-cancel' => 'Ako biste željeli nastaviti koristiti Beta, možete se vratiti na $1.',
	'optin-success-out' => 'Uspješno ste napustili Beta.
Možete se bilo kada ponovno prijaviti putem klika na link "{{int:optin-try}}" u gornjem desnom uglu ekrana.',
	'optin-success-feedback' => 'Hvala Vam za Vaše povratne informacije!',
	'optin-accept-short' => 'Započni!',
	'optin-accept-long' => 'Isprobajte Beta',
	'optin-accept-long-anon' => 'Prijavite se i isprobajte Beta',
	'optin-deny-short' => 'Ne hvala',
	'optin-deny-long' => 'nazad na prethodnu stranicu',
	'optin-submit-out' => 'Napusti Beta',
	'optin-submit-feedback' => 'Pošalji povratnu informaciju',
	'optin-survey-yes' => 'Da',
	'optin-survey-no' => 'Ne',
	'optin-survey-intro' => 'Hvala Vam za isprobavanje Beta.

Željeli bismo da nam opišete šta mislite o našem novom interfejsu, tako Vas ljubazno molimo da popunite neobavezni upitnik koji se nalazi ispod prije nego što kliknete na "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Šta Vam se sviđa u Beti? Šta Vam se ne sviđa u Beti?',
	'optin-survey-question-whyoptout' => 'Zašto se odjavljujete s ovog Beta? (molimo odaberite sve što se može primijeniti)',
	'optin-survey-answer-whyoptout-hard' => 'Isuviše je teško korištenje.',
	'optin-survey-answer-whyoptout-didntwork' => 'Nije pravilno funkcioniralo.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Nije se ponašao kako je uobičajeno.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Nije mi se svidjelo kako izgleda.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Ne sviđaju mi se novi jezičci i dizajn.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Ne sviđa mi se nova alatna traka.',
	'optin-survey-answer-whyoptout-other' => 'Ostali razlozi:',
	'optin-survey-question-explain' => 'Molimo objasnite Vaš odgovor odozgo:',
	'optin-survey-question-techfail' => 'Da li ste primijetili neke tehničke pogreške dok ste koristili Beta?',
	'optin-survey-question-techfail-ifyes' => 'Ako da, molimo objasnite:',
	'optin-survey-question-usedtoolbar' => 'Da li ste koristili novu proširivu alatnu traku za uređivanje stranica?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Ako da, šta Vam se sviđa kod toga? Šta Vam se u tome ne sviđa?',
	'optin-survey-question-usedtoolbar-ifno' => 'Ako ne, zašto ne? Da li će te to učiniti u budućnosti? Molimo objasnite.',
	'optin-survey-question-different' => 'Šta bi morali napraviti drugačije da bi se Vi odlučili nastaviti koristiti Betu?',
	'optin-survey-question-feedback' => 'Molimo pošaljite nam Vaš odgovor:',
	'optin-survey-question-browser' => 'Koji preglednik koristite?',
	'optin-survey-answer-browser-other' => 'Ostali preglednici:',
	'optin-survey-question-os' => 'Koji operativni sistem koristite?',
	'optin-survey-answer-os-other' => 'Drugi operativni sistemi:',
	'optin-survey-question-res' => 'Koja je rezolucija Vašeg monitora?',
	'optin-survey-question-changes' => 'Kakve izmjene bi željeli da vidite na Beti u budućnosti (molimo odaberite sve što je primjenjivo)?',
	'optin-survey-answer-changes-nav' => 'Učiniti cjelokupnu navigaciju na stranici jednostavnijom za upotrebu.',
	'optin-survey-answer-changes-edittools' => 'Povećati broj i poboljšati alate za uređivanje.',
	'optin-survey-answer-changes-upload' => 'Poboljšati sadržaj i broj postavljenih datoteka.',
	'optin-survey-answer-changes-richtext' => 'Razvoj alata za uređivanje sličnim naprednim uređivačima.',
	'optin-survey-answer-changes-lookfeel' => 'Ažurirati "izgled i preglednost" stranice.',
	'optin-survey-answer-changes-predictability' => 'Poboljšati predvidivost performansi.',
	'optin-survey-answer-changes-custom' => 'Omogućuje veća korisnička podešavanja.',
	'optin-survey-answer-changes-other' => 'Ostalo:',
	'optin-improvements' => '== Šta je poboljšano? ==
[[File:UsabilityNavigation.png|left|link=]]
;Poboljšana navigacija
Novi sistem navigacije čini jednostavnije da se vidi gdje ste i šta radite, kao i gdje idete i kako do tamo stići. Sa kutijom za pretaživanje u gornjem desnom uglu, osobina pretrage je lahka i brza za upotrebu.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Poboljšanja trake za uređivanje
Nove i poboljšane ikone prikazuju akcije koje svaki alat izvrši dosta pregledijim. Proširive sekcije smanjuju traku dok čuvaju ne mnogo korištene alate sakrivene, ali dostupne u jednom kliku. Sekcija pomoći omogućuje brzi pristup referencama za zajedničku upotrebu wiki jezika.
<div style="clear:both;"></div>
== Kako se uključiti ==
Da biste naučili više o projektu, posjetite [http://usability.wikimedia.org wiki Inicijative upotrebljivosti]. Tamo ćete naći informacije o našem istraživanju, dizajnu, razvoju i izdanjima. Da biste pitali ili ostavili opći fidbek, molimo koristite našu [http://usability.wikimedia.org/wiki/Talk:Prototype probnu stranicu za razgovor]. Da biste komentirali određenu temu, molimo koristite povezanu stranicu za razgovor. Ako nađete grešku, molimo ostavite komentar na [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai stranici za razgovor izdanja] ili putem [https://bugzilla.wikimedia.org Bugzille].

Hvala i nadamo se da ćete nam se javiti!',
);

/** Catalan (Català)
 * @author Paucabot
 * @author SMP
 */
$messages['ca'] = array(
	'optin' => 'Iniciativa de millora de la Usabilitat',
	'optin-desc' => "Permet als usuaris provar Beta, que inclou les darreres millores d'usabilitat de la ''Usability Initiative''.",
	'optin-title-optedout' => 'Provau Beta',
	'optin-title-optedin' => 'Sortiu de Beta',
	'optin-title-justoptedin' => 'Benvinguts a Beta',
	'optin-title-justoptedout' => 'Gràcies per provar Beta',
	'optin-title-feedback' => 'Donau la vostra opinió',
	'optin-needlogin' => "Us heu d'[$1 iniciar la sessió] per provar Beta.",
	'optin-intro' => "La ''Wikipedia Usability Initiative'' ha estat treballant durament per millorar la usabilitat de Wikipedia.
Voleu provar Beta?",
	'optin-feedback-intro' => "Gràcies per provar Beta.
Volem saber que n'opinau de la nova interfície, per això us agrairíem que responguéssiu l'enquesta voluntària que teniu a continuació.",
	'optin-feedback-back' => "Si no voleu respondre l'enquesta, podeu tornar a $1.",
	'optin-success-in' => "Ara estau provant Beta.
Podeu sortir en qualsevol moment clicant sobre l'enllaç «{{int:optin-leave}}» que teniu al cantó superior dret.",
	'optin-leave-cancel' => 'Si voleu continuar usant Beta, podeu tornar a $1.',
	'optin-success-out' => "Heu sortit de Beta.
Podeu provar-la una altra vegada en qualsevol moment clicant sobre l'enllaç «{{int:optin-try}}» que teniu al cantó superior dret de la pantalla.",
	'optin-success-feedback' => 'Gràcies per la vostra opinió!',
	'optin-accept-short' => 'Fem-ho!',
	'optin-accept-long' => 'Provau Beta',
	'optin-accept-long-anon' => 'Iniciau una sessió i provau Beta',
	'optin-deny-short' => 'No, gràcies',
	'optin-deny-long' => 'Torna a la pàgina anterior',
	'optin-submit-out' => 'Surt de Beta',
	'optin-submit-feedback' => 'Donau la vostra opinió',
	'optin-survey-yes' => 'Sí',
	'optin-survey-no' => 'No',
	'optin-survey-intro' => "Gràcies per provar Beta.
Volem saber què n'opinau de la nova interfície, així que us agrairíem que responguéssiu l'enquesta voluntària que teniu a continuació abans de clicar «[[#leave|{{int:optin-submit-out}}]]».",
	'optin-survey-question-likedislike' => 'Què us ha agradat de Beta? Què no us ha agradat de Beta?',
	'optin-survey-question-whyoptout' => 'Perquè deixau Beta? (Seleccionau totes les opcions escaients)',
	'optin-survey-answer-whyoptout-hard' => "Ha estat massa difícil d'usar.",
	'optin-survey-answer-whyoptout-didntwork' => 'No funcionava correctament.',
	'optin-survey-answer-whyoptout-notpredictable' => 'No funcionava de manera predictible.',
	'optin-survey-answer-whyoptout-didntlike-look' => "No m'ha agradat el seu aspecte.",
	'optin-survey-answer-whyoptout-didntlike-layout' => "No m'han agradat les noves pestanyes ni el nou format.",
	'optin-survey-answer-whyoptout-didntlike-toolbar' => "No m'ha agradat la nova barra d'eines.",
	'optin-survey-answer-whyoptout-other' => 'Una altra raó:',
	'optin-survey-question-explain' => 'Per favor, justificau la vostra resposta anterior:',
	'optin-survey-question-techfail' => 'Heu tengut alguna errada tècnica usant Beta?',
	'optin-survey-question-techfail-ifyes' => 'Si és que sí, per favor, justificau-ho:',
	'optin-survey-question-usedtoolbar' => 'Heu vist la nova barra desplegable per editar pàgines?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Si és que sí, que us ha agradat? Què no us ha agradat?',
	'optin-survey-question-usedtoolbar-ifno' => 'Si és que no, perquè no? Ho fareu en el futur? Justificau-ho, per favor.',
	'optin-survey-question-different' => 'Què podríem haver fet diferent per aconseguir que seguíssiu usant la nostra Beta?',
	'optin-survey-question-feedback' => 'Per favor, deixau-nos qualsevol altre tipus de comentaris o idees que tengueu pel projecte, totes les contribucions ens seran de molta utilitat!',
	'optin-survey-question-browser' => 'Quin navegador emprau?',
	'optin-survey-answer-browser-other' => 'Un altre navegador:',
	'optin-survey-question-os' => 'Quin sistema operatiu usau?',
	'optin-survey-answer-os-other' => 'Un altre sistema operatiu:',
	'optin-survey-question-res' => 'Quina és la resolució de la vostra pantalla?',
	'optin-survey-question-changes' => 'Quins canvis us agradaria veure a Beta en el futur (triau-ne els que volgueu)?',
	'optin-survey-answer-changes-nav' => "Fer la navegació del web més fàcil d'usar.",
	'optin-survey-answer-changes-edittools' => "Augmentar i millorar les eines d'edició.",
	'optin-survey-answer-changes-upload' => 'Millorar els continguts i les càrregues de material multimèdia.',
	'optin-survey-answer-changes-richtext' => "Desenvolupar eines d'edició similars als editors de text enriquit.",
	'optin-survey-answer-changes-lookfeel' => "Actualitzar l'aparença del lloc.",
	'optin-survey-answer-changes-predictability' => 'Millorar la predictabilitat del rendiment.',
	'optin-survey-answer-changes-custom' => 'Permet una major personalització.',
	'optin-survey-answer-changes-other' => 'Altres:',
	'optin-improvements' => "== Què s'ha millorat? ==
[[File:UsabilityNavigation.png|left|link=]]
;Navegació millorada
El nou sistema de navegació fa més fàcil veure on sou i què estau fent, així com on podeu anar i com arribar-hi. Amb la caixa de cerques situada al cantó superior dret, l'opció de cercar és més fàcil de trobar i més ràpida d'usar.
<div style=\"clear:both;\"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Millores a la barra d'edició
Noves icones fan més clar quina acció realitza cada eina. Les seccions desplegables redueixen els ecos paràsits i a la vegada mantenen les eines poc usades a només un clic.
La secció d'ajuda dóna un ràpid accés a una guia dels usos més comuns del marcatge wiki.
<div style=\"clear:both;\"></div>

== Com podeu col·laborar ==
Per a saber més o col·laborar amb el projecte, visiteu [http://usability.wikimedia.org la wiki de la ''Usability Initiative'']. Allà trobareu informació sobre el nostre projecte, recerca, disseny i desenvolupament i llançaments .  Per fer preguntes o deixar comentaris generals, per favor, usau la nostra [http://usability.wikimedia.org/wiki/Talk:Prototype Pàgina de discussió del prototipus].  Per demanar temes concrets, per favor, usau les pàgines de discussió associades. Si trobau errors en el programari, deixau els vostres comentaris a [http://usability.wikimedia.org/wiki/Talk:Releases/Acai la pàgina de discussió del llançament Acai] o usau [https://bugzilla.wikimedia.org Bugzilla].

Moltes gràcies!",
);

/** Sorani (Arabic script) (‫کوردی (عەرەبی)‬)
 * @author Marmzok
 */
$messages['ckb-arab'] = array(
	'optin-title-optedout' => 'تاقی‌کردنەوەی بێتا',
	'optin-title-optedin' => 'وازهێنان لە بێتا',
	'optin-title-justoptedin' => 'بەخێرهاتی بۆ بێتا',
	'optin-title-justoptedout' => 'سوپاس بۆ تاقی‌کردنەوەی بێتا',
	'optin-leave-cancel' => 'گەر دەتەوێ لە کەڵک وەرگرتنی بێتا بەردەوام بی، دەتوانی بگەرێیتەوە بۆ $1.',
	'optin-accept-short' => 'با ئەنجامی دەین!',
	'optin-deny-short' => 'سوپاس، نەخێر',
	'optin-deny-long' => 'گەڕانەوە بۆ لاپەڕەی پێشوو',
	'optin-submit-out' => 'وازهێنان لە بێتا',
	'optin-survey-yes' => 'بەڵێ',
	'optin-survey-no' => 'نەخێر',
	'optin-survey-question-likedislike' => 'کاتی بەکارهێنان سەبارەت بە بێتا چیت بەدڵ بوو؟ چیت بە دڵ نەبوو؟',
	'optin-survey-answer-whyoptout-hard' => 'کەڵک وەرگرتنی زۆر زەحمەت بوو.',
	'optin-survey-answer-whyoptout-other' => 'هۆکاری دیکە:',
	'optin-survey-question-browser' => 'کام گەڕۆک بەکار دەهێنی؟',
	'optin-survey-answer-browser-other' => 'گەڕۆکی دیکە:',
);

/** Czech (Česky)
 * @author Mormegil
 */
$messages['cs'] = array(
	'optin' => 'Přihlášení se do Iniciativy použitelnosti',
	'optin-desc' => 'Umožňuje uživatelům vyzkoušet Betu, nejnovější vylepšení použitelnosti vytvořená Iniciativou použitelnosti.',
	'optin-title-optedout' => 'Vyzkoušet Betu',
	'optin-title-optedin' => 'Opustit Betu',
	'optin-title-justoptedin' => 'Vítejte v Betě',
	'optin-title-justoptedout' => 'Děkujeme, že jste zkoušeli Betu',
	'optin-title-feedback' => 'Názory na Betu',
	'optin-needlogin' => 'Pokud chcete zkusit Betu, musíte se [$1 přihlásit].',
	'optin-intro' => 'Iniciativa použitelnosti Wikipedie tvrdě pracovala na vylepšení použitelnosti Wikipedie.
Nechcete zkusit naši Betu?',
	'optin-feedback-intro' => 'Děkujeme, že zkoušíte Betu.
Rádi bychom věděli, co si o našem novém rozhraní myslíte, takže oceníme, pokud vyplníte nepovinný průzkum zobrazený níže.',
	'optin-feedback-back' => 'Pokud se nechcete našeho průzkum zúčastnit, můžete se vrátit na stránku $1.',
	'optin-success-in' => 'Nyní se účastníte testování Bety.
Z testování se můžete kdykoli odhlásit kliknutím na odkaz „{{int:optin-leave}}“ v horní části obrazovky.',
	'optin-leave-cancel' => 'Pokud chcete i nadále používat Betu, můžete se vrátit na stránku $1.',
	'optin-success-out' => 'Úspěšně jste opustili Betu.
Kdykoli ji budete moci znovu vyzkoušet kliknutím na odkaz „{{int:optin-try}}“ v horní části obrazovky.',
	'optin-success-feedback' => 'Děkujeme za váš názor!',
	'optin-accept-short' => 'Jdu do toho!',
	'optin-accept-long' => 'Vyzkoušet Betu',
	'optin-accept-long-anon' => 'Přihlásit se a vyzkoušet Betu',
	'optin-deny-short' => 'Ne, díky',
	'optin-deny-long' => 'Vrátit se na předchozí stránku',
	'optin-submit-out' => 'Opustit Betu',
	'optin-submit-feedback' => 'Odeslat názor',
	'optin-survey-yes' => 'Ano',
	'optin-survey-no' => 'Ne',
	'optin-survey-intro' => 'Děkujeme, že zkoušíte Betu.
Rádi bychom věděli, co si o našem novém rozhraní myslíte, takže oceníme, pokud před kliknutím na „[[#leave|{{int:optin-submit-out}}]]“ vyplníte nepovinný průzkum zobrazený níže.',
	'optin-survey-question-likedislike' => 'Co se vám na Betě líbilo? Co se vám na Betě nelíbilo?',
	'optin-survey-question-whyoptout' => 'Proč chcete opustit Betu? (Vyberte všechny relevantní důvody.)',
	'optin-survey-answer-whyoptout-hard' => 'Byla příliš složitá na používání.',
	'optin-survey-answer-whyoptout-didntwork' => 'Nefungovala správně.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Nechovala se předvídatelně.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Nelíbil se mi její vzhled.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Nelíbily se mi nové záložky a rozvržení.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Nelíbil se mi nový panel nástrojů.',
	'optin-survey-answer-whyoptout-other' => 'Jiný důvod:',
	'optin-survey-question-explain' => 'Vysvětlení či doplnění vaší odpovědi na výše uvedenou otázku:',
	'optin-survey-question-techfail' => '{{GRAMMAR:|Zaznamenal|Zaznamenala|Zaznamenali}} jste při používání Bety nějaké technické potíže?',
	'optin-survey-question-techfail-ifyes' => 'Pokud ano, upřesněte:',
	'optin-survey-question-usedtoolbar' => '{{GRAMMAR:|Používal|Používala|Používali}} jste při editaci stránek nový rozbalovací panel nástrojů?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Pokud ano, co se vám na něm líbilo? Co se vám na něm nelíbilo?',
	'optin-survey-question-usedtoolbar-ifno' => 'Pokud ne, proč ne? Zkusíte to někdy v budoucnu? Upřesněte, prosím.',
	'optin-survey-question-different' => 'Co jsme mohli udělat lépe, abyste {{GENDER:|nepřestal|nepřestala|nepřestali}} používat Betu?',
	'optin-survey-question-feedback' => 'Napište nám prosím libovolné další komentáře, starosti či nápady, které nám chcete sdělit – jakákoli zpětná vazba pomůže:',
	'optin-survey-question-browser' => 'Jaký prohlížeč používáte?',
	'optin-survey-answer-browser-other' => 'Jiný prohlížeč:',
	'optin-survey-question-os' => 'Jaký operační systém používáte?',
	'optin-survey-answer-os-other' => 'Jiný operační systém:',
	'optin-survey-question-res' => 'Jaké je rozlišení vaší obrazovky?',
	'optin-survey-question-changes' => 'Jaké změny byste v budoucnu v Betě {{GENDER:|rád viděl|ráda viděla|rádi viděli}} (vyberte všechny relevantní možnosti)?',
	'optin-survey-answer-changes-nav' => 'Celkové zjednodušení navigace po webu',
	'optin-survey-answer-changes-edittools' => 'Rozšíření a vylepšení editačních nástrojů',
	'optin-survey-answer-changes-upload' => 'Vylepšení načítání souborů',
	'optin-survey-answer-changes-richtext' => 'Vytvoření editačních nástrojů podobných textovým editorům',
	'optin-survey-answer-changes-lookfeel' => 'Modernizovat vzhled a chování webu',
	'optin-survey-answer-changes-predictability' => 'Vylepšit předvídatelnost výkonnosti',
	'optin-survey-answer-changes-custom' => 'Umožnění výraznějšího přizpůsobení uživatelům',
	'optin-survey-answer-changes-other' => 'Jiné:',
	'optin-improvements' => '== Co jsme vylepšili? ==
[[File:UsabilityNavigation.png|left|link=]]
;Zdokonalená navigace
Díky novému systému navigace snáze vidíte, kde jste a co děláte, stejně tak i to, kam můžete jít a jak se tam dostanete. Vyhledávání umístěné v pravém horním rohu lze jednodušeji nalézt a rychleji používat.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Vylepšení editačního panelu nástrojů
Nové a vylepšené ikonky zřetelněji označují, co který nástroj dělá. Díky rozbalovacím částem je panel jednodušší, přitom méně používané nástroje jsou dostupné jediným kliknutím.
Část s nápovědou poskytuje rychlý přístup k přehledu základního použití wikikódu.
<div style="clear:both;"></div>
== Jak se zapojit ==
Pokud se chcete o projektu dozvědět více nebo se zapojit, navštivte [http://usability.wikimedia.org wiki Iniciativy použitelnosti]. Najdete tam informace o našem grantu, výzkumu, návrhu a vývoji i vydaných verzích. Pokud se chcete na něco zeptat nebo nám něco sdělit, použijte naši [http://usability.wikimedia.org/wiki/Talk:Prototype diskusi k prototypu]. Připomínky ke konkrétním tématům můžete psát na příslušné diskusní stránky. Pokud najdete nějakou chybu, můžete ji oznámit v [http://usability.wikimedia.org/wiki/Talk:Releases/Acai diskusi k vydání verze Acai] nebo pomocí [https://bugzilla.wikimedia.org Bugzilly].

Děkujeme a budeme se těšit na vaše názory!',
);

/** Welsh (Cymraeg)
 * @author Lloffiwr
 */
$messages['cy'] = array(
	'optin-accept-long' => 'Rhoi cynnig ar Beta',
	'optin-submit-out' => 'Gadael Beta',
);

/** Danish (Dansk)
 * @author Byrial
 */
$messages['da'] = array(
	'optin' => 'Deltag i initiativet til brugervenlighed',
	'optin-desc' => 'Giver brugere mulighed for at prøve Beta, Wikipedias initiativ til brugervenligheds seneste forbedringer af brugervenligheden.',
	'optin-title-optedout' => 'Prøv Beta',
	'optin-title-optedin' => 'Forlad Beta',
	'optin-title-justoptedin' => 'Velkommen til Beta',
	'optin-title-justoptedout' => 'Tak for at prøve vores Beta',
	'optin-title-feedback' => 'Tilbagemelding om Beta',
	'optin-needlogin' => 'Du skal [$1 logge på] for at prøve Beta.',
	'optin-intro' => 'Wikipedias initiativ til brugervenlighed har arbejdet hårdt for at forbedre Wikipedias brugervenlighed.
Har du lyst til at prøve vores Beta?',
	'optin-feedback-intro' => 'Tak for at du prøver Beta.
Vi vil gerne vide hvad du mener om vores nye grænseflade, så vi vil sætte pris på det hvis du udfylder den frivillige undersøgelse herunder.',
	'optin-feedback-back' => 'Hvis du ikke vil udfylde undersøgelsen, kan du gå tilbage til $1.',
	'optin-success-in' => 'Du prøver nu Beta.
Du kan når som helst vælge at gå tilbage ved at klikke på "{{int:optin-leave}}"-henvisningen øverst på siden.',
	'optin-leave-cancel' => 'Hvis du vil fortsætte med at bruge Beta, kan du gå tilbage til $1.',
	'optin-success-out' => 'Du har nu forladt Beta.
Du kan til hver en tid prøve det igen ved at klikke på "{{int:optin-try}}"-henvisningen øverst på siden.',
	'optin-success-feedback' => 'Tak for din tilbagemelding!',
	'optin-accept-short' => 'Gør det!',
	'optin-accept-long' => 'Prøv Beta',
	'optin-accept-long-anon' => 'Log på og prøv Beta',
	'optin-deny-short' => 'Nej tak',
	'optin-deny-long' => 'Gå tilbage til den forrige side',
	'optin-submit-out' => 'Forlad Beta',
	'optin-submit-feedback' => 'Giv en tilbagemelding',
	'optin-survey-yes' => 'Ja',
	'optin-survey-no' => 'Nej',
	'optin-survey-intro' => 'Tak for at du har prøvet Beta.
Vi vil gerne vide hvad du synes om vores nye grænseflade, så vi vil sætte pris på det hvis du udfylder den frivillige undersøgelse herunder før du trykker på "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Hvad kunne lide ved Beta? Hvad kunne du ikke lide ved Beta?',
	'optin-survey-question-whyoptout' => 'Hvorfor forlader du Beta? (Vælg venligst alle som passer).',
	'optin-survey-answer-whyoptout-hard' => 'Den var for vanskelig at bruge.',
	'optin-survey-answer-whyoptout-didntwork' => 'Den fungerede ikke ordentligt.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Den virkede uforudsigelig.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Jeg kunne ikke lide udseendet.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Jeg kunne ikke lide de nye faneblade og layoutet.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Jeg kunne ikke lide den nye værktøjslinje.',
	'optin-survey-answer-whyoptout-other' => 'Anden grund:',
	'optin-survey-question-explain' => 'Forklar eller uddyb gerne dit svar herover:',
	'optin-survey-question-techfail' => 'Oplevede du nogen tekniske fejl mens du brugte Beta?',
	'optin-survey-question-techfail-ifyes' => 'Hvis ja, uddyb eller forklar venligst:',
	'optin-survey-question-usedtoolbar' => 'Har du brugt den nye udvidelige værktøjslinje til at redigere en side?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Hvis ja, hvad kunne lide ved den? Hvad kunne du ikke lide ved den?',
	'optin-survey-question-usedtoolbar-ifno' => 'Hvis nej, hvorfor ikke? Vil du gøre det på et senere tidspunkt? Forklar veligst.',
	'optin-survey-question-different' => 'Hvad kunne vi have gjort anderledes for at få dig til at fortsætte med at bruge Beta?',
	'optin-survey-question-feedback' => 'Fortæl os venligst alle andre kommentarer, overvejelser eller tanker som du har til os - enhver tilbagemelding er nyttig:',
	'optin-survey-question-browser' => 'Hvilken browser bruger du?',
	'optin-survey-answer-browser-other' => 'Anden browswer:',
	'optin-survey-question-os' => 'Hvilket styresystem bruger du?',
	'optin-survey-answer-os-other' => 'Andet styresystem:',
	'optin-survey-question-res' => 'Hvor stor er din skærmopløsning?',
	'optin-survey-question-changes' => 'Hvilke foranndringer kunne du tænke dig at se i Beta fremover (vælg venligst alle som passer)?',
	'optin-survey-answer-changes-nav' => 'Gør den generelle navigering på websiderne nemmere at bruge.',
	'optin-survey-answer-changes-edittools' => 'Udbyg og forbedr redigeringsværktøjerne.',
	'optin-survey-answer-changes-upload' => 'Forbedr oplægning af indhold og media.',
	'optin-survey-answer-changes-richtext' => 'Udvikl redigeringsværktøjer som ligner tekstbehandlingsprogrammer.',
	'optin-survey-answer-changes-lookfeel' => 'Opdater websidernes udseende og virkemåde.',
	'optin-survey-answer-changes-predictability' => 'Forbedr forudsigeligheden af virkemåden.',
	'optin-survey-answer-changes-custom' => 'Giv mulighed for flere individuelle tilpasninger.',
	'optin-survey-answer-changes-other' => 'Andet:',
	'optin-improvements' => '== Hvad er blevet forbedret? ==
[[File:UsabilityNavigation.png|left|link=]]
;Forbedret navigering
Det nye navigationssystem gør det nemmere at se hvor du er og hvad du gør, samt hvorhen du kan gå og hvordan du kommer dertil. Med søgefeltet i det øvre højre hjørne er søgefunktionen nemmere at finde og hurtigere at bruge.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Forbedringer i værktøjslinjen
Nye og forbedrede ikoner gør det tydeligere hvilken funktion hvert værktøj udfører. Udvidelige afsnit reducerer støjen, men gør samtidig at sjældent brugte værktøjer kun er et klik væk.
Hjælpeafsnittet giver hurtig adgang til en reference over almindeligt brugte wiki-koder.
<div style="clear:both;"></div>

== Hvordan du kan deltage ==
For at få mere at vide om projektet eller for at deltage, kan du besøge [http://usability.wikimedia.org wikien for initiativet for brugervenlighed]. Der finder du information om vores bevillinger, forskning, design & udvikling og udgaver. Til at stille spørgsmål eller komme med generelle kommentarer kan du bruge vores [http://usability.wikimedia.org/wiki/Talk:Prototype diskusionsside for prototypen]. For at tage specifikke emner op brug venligst de respektive diskussionssider. Hvis du finder fejl, bedes du venligst kommentere dette på [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acaiudgavens diskussionsside] eller [https://bugzilla.wikimedia.org Bugzilla].

Tak, vi ser frem til at høre fra dig!',
);

/** German (Deutsch)
 * @author Als-Holder
 * @author Benzen
 * @author Imre
 * @author Metalhead64
 * @author Pill
 * @author Umherirrender
 */
$messages['de'] = array(
	'optin' => 'Anmeldung bei der Benutzerfreundlichkeitsinitiative',
	'optin-desc' => 'Erlaubt Benutzern, Beta auszuprobieren, aktuellste Benutzerfreundlichkeitsverbesserungen der Benutzerfreundlichkeitsinitiative.',
	'optin-title-optedout' => 'Beta ausprobieren',
	'optin-title-optedin' => 'Beta verlassen',
	'optin-title-justoptedin' => 'Willkommen bei Beta',
	'optin-title-justoptedout' => 'Vielen Dank, dass du Beta ausprobierst',
	'optin-title-feedback' => 'Feedback geben',
	'optin-needlogin' => 'Du musst dich [$1 anmelden], um Beta auszuprobieren',
	'optin-intro' => 'Die Wikipedia-Benutzerfreundlichkeitsinitiative hat hart daran gearbeitet, die Benutzerfreundlichkeit von Wikipedia zu verbessern.
Möchtest du jetzt die Betaversion ausprobieren?',
	'optin-feedback-intro' => 'Danke, dass du Beta ausprobierst.
Wir möchten gerne erfahren, was du über unsere neue Benutzeroberfläche denkst und würden uns freuen, wenn du an der folgenden, freiwilligen Umfrage teilnimmst',
	'optin-feedback-back' => 'Wenn du die Umfrage nicht ausfüllen willst, kannst du zu $1 zurückkehren.',
	'optin-success-in' => 'Du probierst gerade Beta aus.
Du kannst es jederzeit verlassen, indem du den Link „{{int:optin-leave}}“ oben anklickst.',
	'optin-leave-cancel' => 'Wenn du Beta weiter verwenden willst, kannst du zu $1 zurückkehren.',
	'optin-success-out' => 'Du hast Beta erfolgreich verlassen.
Du kannst es jederzeit wieder ausprobieren, indem du den Link „{{int:optin-try}}“ oben rechts anklickst.',
	'optin-success-feedback' => 'Danke für dein Feedback!',
	'optin-accept-short' => 'Los!',
	'optin-accept-long' => 'Beta ausprobieren',
	'optin-accept-long-anon' => 'Anmelden und Beta ausprobieren',
	'optin-deny-short' => 'Nein, danke',
	'optin-deny-long' => 'Zurück zur letzten Seite',
	'optin-submit-out' => 'Beta verlassen',
	'optin-submit-feedback' => 'Feedback geben',
	'optin-survey-yes' => 'Ja',
	'optin-survey-no' => 'Nein',
	'optin-survey-intro' => 'Danke, dass du Beta ausprobierst.
Wir möchten gerne erfahren, was du über unsere neue Benutzeroberfläche denkst. Wir begrüßen es, wenn du die optionale Umfrage unten beantwortest, bevor du auf „[[#leave|{{int:optin-submit-out}}]]“ klickst.',
	'optin-survey-question-likedislike' => 'Was magst du an Beta? Was magst du nicht an Beta?',
	'optin-survey-question-whyoptout' => 'Warum verlässt du diesen Betatest? (bitte alles Zutreffende auswählen)',
	'optin-survey-answer-whyoptout-hard' => 'Die Verwendung war zu kompliziert.',
	'optin-survey-answer-whyoptout-didntwork' => 'Es funktioniert nicht einwandfrei.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Es funktioniert nicht in vorhersehbarer Weise.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Ich mag das Aussehen nicht.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Ich mag die neuen Tabs und das Layout nicht.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Ich mag die neue Werkzeugleiste nicht.',
	'optin-survey-answer-whyoptout-other' => 'Andere Begründung:',
	'optin-survey-question-explain' => 'Bitte erkläre deine obige Antwort oder arbeite sie aus:',
	'optin-survey-question-techfail' => 'Hast du beim Ausprobieren von Beta irgendwelche technischen Fehler entdeckt?',
	'optin-survey-question-techfail-ifyes' => 'Falls ja, bitte ausarbeiten oder erklären:',
	'optin-survey-question-usedtoolbar' => 'Verwendest du die neue, expandierbare Bearbeitungs-Werkzeugleiste?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Falls ja, was magst du daran? Was magst du nicht daran?',
	'optin-survey-question-usedtoolbar-ifno' => 'Falls nicht, warum? Wirst du das in Zukunft tun? Bitte erkläre es.',
	'optin-survey-question-different' => 'Was können wir anders machen, dass du unseren Betatest weiter verwendest?',
	'optin-survey-question-feedback' => 'Bitte gib uns dein Feedback:',
	'optin-survey-question-browser' => 'Welchen Browser verwendest du?',
	'optin-survey-answer-browser-other' => 'Anderer Browser:',
	'optin-survey-question-os' => 'Welches Betriebssystem verwendest du?',
	'optin-survey-answer-os-other' => 'Anderes Betriebssystem:',
	'optin-survey-question-res' => 'Was ist deine Bildschirmauflösung?',
	'optin-survey-question-changes' => 'Welche Änderungen an der Beta würdest du gerne in Zukunft sehen (wähle alles Zutreffende aus)?',
	'optin-survey-answer-changes-nav' => 'Die Gesamtnavigation der Site einfacher machen.',
	'optin-survey-answer-changes-edittools' => 'Bearbeitungswerkzeuge erweitern und verbessern.',
	'optin-survey-answer-changes-upload' => 'Inhalt und Medienuploads verbessern.',
	'optin-survey-answer-changes-richtext' => 'Bearbeitungswerkzeuge ähnlich wie bei Rich-Text-Editoren entwickeln.',
	'optin-survey-answer-changes-lookfeel' => 'Erscheinungsbild der Site aktualisieren.',
	'optin-survey-answer-changes-predictability' => 'Vorhersehbarkeit der Leistung verbessern.',
	'optin-survey-answer-changes-custom' => 'Größere Benutzeranpassungen erlauben.',
	'optin-survey-answer-changes-other' => 'Andere:',
	'optin-improvements' => '== Was wurde verbessert? ==
[[File:UsabilityNavigation.png|left|link=]]
;Erweiterte Navigation
Durch das neue Navigationssystem wird es einfacher zu bestimmen, wo man sich gerade befindet, was man tut und welche anderen Seiten man wie erreichen kann. Um das Auffinden von Information noch schneller und einfacher zu gestalten, wurde beispielsweise das Suchfeld nach oben rechts verschoben.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Verbesserungen der Werkzeugleiste
Neue und verbesserte Symbole tragen dazu bei, dass man die gewünschte Funktion einfach und schnell erreichen kann. Mithilfe ausklappbarer Abschnitte konnte die Menüstruktur einerseits übersichtlich gehalten werden, andererseits sind so auch selten verwendete Werkzeuge nur einen Klick entfernt.
Der Hilfeabschnitt erlaubt den schnellen Zugriff auf häufig verwendete Wiki-Syntax.
<div style="clear:both;"></div>

== Wie kann ich mich daran beteiligen? ==
Wenn du mehr über das Projekt erfahren willst oder dich selbst daran beteiligen möchtest, besuche hierzu das [http://usability.wikimedia.org Wiki der Benutzerfreundlichkeitsinitiative]. Dort findest du neben Informationen zu unserer Spende und den Studien, die im Rahmen des Projektes durchgeführt werden, auch Details zum Design der Beta, ihrer Entwicklung und zu neuen Versionen. Für Fragen oder allgemeine Rückmeldungen steht die [http://usability.wikimedia.org/wiki/Talk:Prototype Diskussionsseite des Prototyps] zur Verfügung. Für spezielle Themen eignen sich die entsprechenden dazugehörigen Diskussionsseiten. Solltest du Fehler („Bugs“) entdecken, hinterlasse bitte unter http://usability.wikimedia.org/wiki/Talk:Releases/Acai einen entsprechenden Hinweis oder melde die Fehler über [https://bugzilla.wikimedia.org Bugzilla].

Vielen Dank, wir freuen uns auf dein Feedback!',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author Imre
 * @author Umherirrender
 */
$messages['de-formal'] = array(
	'optin-title-justoptedout' => 'Vielen Dank, dass Sie Beta ausprobieren',
	'optin-needlogin' => 'Sie müssen sich [$1 anmelden], um Beta auszuprobieren',
	'optin-intro' => 'Die Wikipedia-Benutzerfreundlichkeitsinitiative hat hart daran gearbeitet, die Benutzerfreundlichkeit von Wikipedia zu verbessern.
Möchten Sie jetzt die Betaversion ausprobieren?',
	'optin-feedback-intro' => 'Danke, dass Sie Beta ausprobieren.
Wir möchten gerne erfahren, was Sie über unsere neue Benutzeroberfläche denken und würden uns freuen, wenn Sie an der folgenden, freiwilligen Umfrage teilnehmen.',
	'optin-feedback-back' => 'Wenn Sie die Umfrage nicht ausfüllen wollen, können Sie zu $1 zurückkehren.',
	'optin-success-in' => 'Sie probieren gerade Beta aus.
Sie können es jederzeit verlassen, indem Sie den Link „{{int:optin-leave}}“ oben anklicken.',
	'optin-leave-cancel' => 'Wenn Sie Beta weiter verwenden wollen, können Sie zu $1 zurückkehren.',
	'optin-success-out' => 'Sie haben Beta erfolgreich verlassen.
Sie können es jederzeit wieder ausprobieren, indem Sie den Link „{{int:optin-try}}“ oben rechts anklicken.',
	'optin-success-feedback' => 'Danke für Ihr Feedback!',
	'optin-survey-intro' => 'Danke, dass Sie Beta ausprobieren.
Wir möchten gerne erfahren, was Sie über unsere neue Benutzeroberfläche denken. Wir begrüßen es, wenn Sie die optionale Umfrage unten beantworten, bevor Sie auf „[[#leave|{{int:optin-submit-out}}]]“ klicken.',
	'optin-survey-question-likedislike' => 'Was mögen Sie an Beta? Was mögen Sie nicht an Beta?',
	'optin-survey-question-whyoptout' => 'Warum verlassen Sie diesen Betatest? (bitte alles Zutreffende auswählen)',
	'optin-survey-question-explain' => 'Bitte erklären Sie Ihre obige Antwort oder arbeiten Sie sie aus:',
	'optin-survey-question-techfail' => 'Haben Sie beim Ausprobieren von Beta irgendwelche technischen Fehler entdeckt?',
	'optin-survey-question-usedtoolbar' => 'Verwenden Sie die neue, expandierbare Bearbeitungs-Werkzeugleiste?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Falls ja, was mögen Sie daran? Was mögen Sie nicht daran?',
	'optin-survey-question-usedtoolbar-ifno' => 'Falls nicht, warum? Werden Sie es in Zukunft tun? Bitte erklären Sie es.',
	'optin-survey-question-different' => 'Was können wir anders machen, damit Sie unseren Betatest weiter verwenden?',
	'optin-survey-question-feedback' => 'Bitte geben Sie uns Ihr Feedback:',
	'optin-survey-question-browser' => 'Welchen Browser verwenden Sie?',
	'optin-survey-question-os' => 'Welches Betriebssystem verwenden Sie?',
	'optin-survey-question-res' => 'Was ist Ihre Bildschirmauflösung?',
	'optin-survey-question-changes' => 'Welche Änderungen an der Beta würden Sie gerne in Zukunft sehen (wählen Sie alles Zutreffende aus)?',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'optin' => 'Iniciatiwa wužywajobnosći wubraśe',
	'optin-desc' => 'Wužywarjam dowóliś Betu wopytaś, slědne pólěpšenja wužywajobnosći iniciatiwy wužywajobnosći',
	'optin-title-optedout' => 'Betu wopytaś',
	'optin-title-optedin' => 'Betu spušćiś',
	'optin-title-justoptedin' => 'Witaj do Bety',
	'optin-title-justoptedout' => 'Źěkujomy se, až sy wopytał Betu',
	'optin-title-feedback' => 'Powěsći wó Beśe',
	'optin-needlogin' => 'Musyš se [$1 pśizjawiś], aby Betu wopytał.',
	'optin-intro' => 'Iniciatiwa wužywajobnosći Wikipedije jo južo žurnje źěłała, aby pólěpšyła wužywajobnosć Wikipedije. By ty rady Betu wopytaś?',
	'optin-feedback-intro' => 'Źěkujomy se, až sy Betu wopytał.
My by rady wěźeli, což mysliš wó našem nowem pówjerchu, togodla my by se wjaselili, jolic wupołnjujoš slědujucy dobrowólny formular.',
	'optin-feedback-back' => 'Jolic njocoš formular wupołniś, móžoš se k slědujucemu bokoju wrośiś: $1.',
	'optin-success-in' => 'Wopytujoš něnto Betu.
Móžoš kuždy cas pśez kliknjenje na wótkaz "{{int:optin-leave}}" górjejce na wobrazowce wótwóliś.',
	'optin-leave-cancel' => 'Jolic coš Betu dalej wužywaś, móžoš se k slědujucemu bokoju wrośiś: $1.',
	'optin-success-out' => 'Sy wuspěšnje Betu spušćił.
Móžoš ju hyšći raz kuždy cas pśez kliknjenje na wótkaz "{{int:optin-try}}" górjejce napšawo na wobrazowce wopytaś.',
	'optin-success-feedback' => 'Žěkujomy se za twójo wótegrono!',
	'optin-accept-short' => 'Něnt ale zasobu!',
	'optin-accept-long' => 'Betu wopytaś',
	'optin-accept-long-anon' => 'Pśizjawiś se a Betu wopytaś',
	'optin-deny-short' => 'Ně, źěkujomy se',
	'optin-deny-long' => 'Slědk k slědnemu bokoju',
	'optin-submit-out' => 'Betu spušćiś',
	'optin-submit-feedback' => 'Powěsć daś',
	'optin-survey-yes' => 'Jo',
	'optin-survey-no' => 'Ně',
	'optin-survey-intro' => 'Źěkujomy se za wopytanje Bety.
My by rady wěźeli, co mysliš wó našem nowem wužywarskem pówjerchu, togodla my by se wjaselili, jolic ty by wupołnił opcionalny napšašnik dołojce, nježli až kliknjoš na "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Co se śi na Beśe spódoba? Co se śi na Beśe njespódoba?',
	'optin-survey-question-whyoptout' => 'Cogodla spušćaś Betu? (Pšosym wubjeŕ wšykne, kótarež pśitrjefje.)',
	'optin-survey-answer-whyoptout-hard' => 'Wužywanje jo było pśekomplicěrowane.',
	'optin-survey-answer-whyoptout-didntwork' => 'Njejo pórědnje funkcioněrowało.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Njefunkcioněrujo na pśedwiźony nałog.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Naglěd se mě njespódoba.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Nowe rejtarki a layout se mi njespódobaju.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Nowa rědowa kšoma se mi njespódoba.',
	'optin-survey-answer-whyoptout-other' => 'Druga pśicyna:',
	'optin-survey-question-explain' => 'Pšosym wujasni abo wuźěłaj swójo górjejcne wótegrono:',
	'optin-survey-question-techfail' => 'Sy na techniske zmólki starcył, gaž sy Betu wužył?',
	'optin-survey-question-techfail-ifyes' => 'Jolic jo, pšosym wuźěłaj abo wujasni:',
	'optin-survey-question-usedtoolbar' => 'Sy nowu wócynjajobnu rědowu kšomu wužył, aby bok wobźěłał?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Jolic jo, co se śi na tom spódoba? Co se śi na tom njespódoba?',
	'optin-survey-question-usedtoolbar-ifno' => 'Jolic ně, cogodla nic? Buźoš to w pśichoźe cyniś? Pšosym rozjasni.',
	'optin-survey-question-different' => 'Co by my mógli hyšći hynac cyniś, aby ty dalej wužywaš Betu?',
	'optin-survey-question-feedback' => 'Pšosym daj nam swóje měnjenja k wěsći:',
	'optin-survey-question-browser' => 'Kótary wobglědowak wužywaš?',
	'optin-survey-answer-browser-other' => 'Drugi wobglědowak:',
	'optin-survey-question-os' => 'Kótary źěłowy system wužywaš?',
	'optin-survey-answer-os-other' => 'Drugi źěłowy system:',
	'optin-survey-question-res' => 'Kótare jo rozeznaśe twójeje wobrazowki?',
	'optin-survey-question-changes' => 'Kótare změny by ty rady wiźeł w Beśe w pśichoźe (pšosym wubjeŕ wšykne, kótarež pśitrjefje)?',
	'optin-survey-answer-changes-nav' => 'Cełkownu nawigaciju sedła zjadnoriś.',
	'optin-survey-answer-changes-edittools' => 'Wobźěłowańske rědy rozšyriś a pólěpšyś.',
	'optin-survey-answer-changes-upload' => 'Wopśimjeśe a nagraśa medijow pólěpšyś.',
	'optin-survey-answer-changes-richtext' => 'Wobźěłowańske rědy wuwiś, kótarež su pódobne na editory za rich tekst.',
	'optin-survey-answer-changes-lookfeel' => 'Wenkowny naglěd sedła aktualizěrowaś',
	'optin-survey-answer-changes-predictability' => 'Pśedpowědajobnosć wugbaśa pólěpšyś.',
	'optin-survey-answer-changes-custom' => 'Wětše wužywarske pśiměrjenja dowóliś',
	'optin-survey-answer-changes-other' => 'Druge:',
	'optin-improvements' => '== Co jo se pólěpšyło? ==
[[File:UsabilityNavigation.png|left|link=]]
;Pólěpšona nawigacija
Nowy nawigaciski system wólažcujo wiźeś, źož sy a což cyniš a teke, źož móžoš hyś a kak se tam dostanjoš. Z pytańskim pólom górjejce napšawo pytańska funkcija dajo se lažčej namakaś a malsnjej wužywaś.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Pólěpšenja wobźěłowańskeje kšomy
Nowe a pólěpšone symbole lěpjej rozjasnjuju, kótaru akciju kuždy rěd wuwjedujo. Wótrězki, kótarež daju se wócyniś, reducěruju barłog, mjaztym až rědko wužywane rědy su jano jadne kliknjenje zdalone.
Wótrězk pomocy bitujo malsny pśistup na referencu wó powšyknem wužywanju wikijoweje syntaksy.
<div style="clear:both;"></div>
== Kak móžoš se wobźěliś ==
Aby wěcej wó projekśe zgónił, abo wó tom, kak móžoš se wobźěliś, wóglědaj pšosym k [http://usability.wikimedia.org wikijeju iniciatiwy wužywajobnosći]. Tam namakajoš informacije wó našej koncesiji, slěźenju, designje + wuwiśu a nowych wersijach. Za pšašanja abo powšykne powěsći, wužyj naš [http://usability.wikimedia.org/wiki/Talk:Prototype diskusijny bok prototypa]. Aby wósebne temy wobjadnał, wužyj pšosym zwězane diskusijne boki. Jolic namakajoš programowe zmólki, zawóstaj pšosym swóje komentary na [http://usability.wikimedia.org/wiki/Talk:Releases/Acai diskusijnem boku wersije Acai] abo wužyj [https://bugzilla.wikimedia.org Bugzilla].

Źěkujomy se a by se wjaselili wót tebje słyšaś.',
);

/** Greek (Ελληνικά)
 * @author Assassingr
 * @author Crazymadlover
 * @author Omnipaedista
 * @author ZaDiak
 */
$messages['el'] = array(
	'optin' => 'Ενεργοποίηση πρωτοβουλίας χρηστικότηττας',
	'optin-desc' => 'Επιτρέψτε στους χρήστες να δοκιμάσουν τη Beta, τις τελευταίες βελτιώσεις χρηστικότητας της Πρωτοβουλίας Χρηστικότητας.',
	'optin-title-optedout' => 'Δοκιμάστε την Beta',
	'optin-title-optedin' => 'Εγκαταλείψτε την Beta',
	'optin-title-justoptedin' => 'Καλωσήρθατε στην Beta',
	'optin-title-justoptedout' => 'Σας ευχαριστούμε που δοκιμάσατε την Beta μας',
	'optin-title-feedback' => 'Ανάδραση περί της Beta',
	'optin-needlogin' => 'Πρέπει να [$1 συνδεθείς] για να δοκιμάσεις την Beta',
	'optin-intro' => 'Η Πρωτοβουλία Χρηστικότητας της Wikipedia έχει δουλέψει σκληρά για τη βελτίωση της χρηστικότητας της Wikipedia. 
Θα θέλατε να δοκιμάσετε τη Beta;',
	'optin-feedback-intro' => 'Ευχαριστούμε που δοκιμάσατε την Beta.
Θα θέλαμε να μάθουμε τι νομίζετε για την νέα διεπαφή μας. Θα το εκιμούσαμε αν συμπληρώνατε την προαιρετική φόρμα αξιολόγησης παρακάτω.',
	'optin-feedback-back' => 'Αν δεν θες να συμπληρώσεις τη δημοσκόπηση, μπορείς να επιστρέψεις πίσω στο $1.',
	'optin-success-in' => 'Προσπαθείτε τώρα να δοκιμάσετε τη Beta.
Μπορείτε ανά πάσα στιγμή να εγκαταλείψετε τη συνεδρία κάνωντας κλικ στον σύνδεσμο «{{int:optin-leave}}» στο πάνω μέρος της οθόνης.',
	'optin-leave-cancel' => 'Αν θα θέλατε να συνεχίσετε να χρησιμοποιείτε τη Beta, μπορείτε να επιστρέψετε στο $1.',
	'optin-success-out' => 'Εγκαταλείψατε επιτυχώς τη Beta.
Μπορείτε να τη δοκιμάσετε πάλι ανά πάσα στιγμή κάνοντας κλικ στο σύνδεσμο "{{int:optin-try}}" στο πάνω μέρος της οθόνης.',
	'optin-success-feedback' => 'Σας ευχαριστούμε για την γνώμη σας!',
	'optin-accept-short' => 'Ας το κάνουμε!',
	'optin-accept-long' => 'Δοκιμάστε την Beta',
	'optin-accept-long-anon' => 'Συνδεθείτε και δοκιμάστε το Beta',
	'optin-deny-short' => 'Όχι, ευχαριστώ.',
	'optin-deny-long' => 'Επιστροφή στην προηγούμενη σελίδα',
	'optin-submit-out' => 'Εγκαταλείψτε την Beta',
	'optin-submit-feedback' => 'Δώστε ανάδραση',
	'optin-survey-yes' => 'Ναι',
	'optin-survey-no' => 'Όχι',
	'optin-survey-intro' => 'Ευχαριστούμε για την δοκιμή της Beta.
Θα θέλαμε να ξέρουμε τι πιστεύετε για τη νέα μας διεπαφή, ώστε να μπορέσουμε να το εκτιμήσουμε αν συμπληρώσατε την προαιρετική δημοσκόπηση πριν πατήσετε "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Τι σας άρεσε στη Beta; Τι δεν σας άρεσε στη Beta;',
	'optin-survey-question-whyoptout' => 'Γιατί εγκαταλείπετε τη Beta; (Παρακαλώ επιλέξτε όλα όσα εφαρμόζονται.)',
	'optin-survey-answer-whyoptout-hard' => 'Ήταν δύσχρηστο.',
	'optin-survey-answer-whyoptout-didntwork' => 'Δεν λειτουργούσε σωστά.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Δεν ανταποκρινόταν προβλέψιμα.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Δεν μου άρεσε η εμφάνισή του.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Δεν μου άρεσαν οι νέες καρτέλες και η γενική σχεδιαστική διάταξη.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Δεν μου άρεσε η νέα μπάρα εργαλείων.',
	'optin-survey-answer-whyoptout-other' => 'Άλλος λόγος:',
	'optin-survey-question-explain' => 'Παρακαλώ δώστε μία πληρέστερη εξήγηση της παραπάνω απάντησής σας:',
	'optin-survey-question-techfail' => 'Έχετε τεχνικές δυσκολίες ενώ χρησιμοποιείτε τη Beta;',
	'optin-survey-question-techfail-ifyes' => 'Εάν ναι, παρακαλώ δώστε μία πληρέστερη εξήγηση:',
	'optin-survey-question-usedtoolbar' => 'Χρησιμοποιήσατε τη νέα επεκτάσιμη μπάρα εργασιών για να επεξεργαστείτε μια σελίδα;',
	'optin-survey-question-usedtoolbar-ifyes' => 'Εάν ναι, τι σας άρεσε και τι δεν σας άρεσε σε αυτό;',
	'optin-survey-question-usedtoolbar-ifno' => 'Αν όχι, γιατί όχι; Πρόκειται στο μέλλον; Παρακαλώ εξηγήστε.',
	'optin-survey-question-different' => 'Τι θα μπορούσαμε να κάνουμε διαφορετικό για να συνεχίσετε να χρησιμοποιείτε τη Beta;',
	'optin-survey-question-feedback' => 'Παρακαλώ ενημερώστε μας για οποιαδήποτε σχόλια, παρατηρήσεις ή σκέψεις έχετε για μας - οποιαδήποτε ανάδραση είναι χρήσιμη:',
	'optin-survey-question-browser' => 'Ποιον πλοηγό (browser) χρησιμοποιείτε;',
	'optin-survey-answer-browser-ie5' => 'Internet Explorer 5',
	'optin-survey-answer-browser-ie6' => 'Internet Explorer 6',
	'optin-survey-answer-browser-ie7' => 'Internet Explorer 7',
	'optin-survey-answer-browser-ie8' => 'Internet Explorer 8',
	'optin-survey-answer-browser-ff1' => 'Firefox 1',
	'optin-survey-answer-browser-ff2' => 'Firefox 2',
	'optin-survey-answer-browser-ff3' => 'Firefox 3',
	'optin-survey-answer-browser-c1' => 'Google Chrome 1',
	'optin-survey-answer-browser-c2' => 'Google Chrome 2',
	'optin-survey-answer-browser-s3' => 'Safari 3',
	'optin-survey-answer-browser-s4' => 'Safari 4',
	'optin-survey-answer-browser-o9' => 'Opera 9',
	'optin-survey-answer-browser-o9.5' => 'Opera 9.5',
	'optin-survey-answer-browser-o10' => 'Opera 10',
	'optin-survey-answer-browser-other' => 'Άλλος περιηγητής:',
	'optin-survey-question-os' => 'Ποιο λειτιυργικό σύστημα χρησιμοποιείτε;',
	'optin-survey-answer-os-windows' => 'Windows',
	'optin-survey-answer-os-macos' => 'Mac OS',
	'optin-survey-answer-os-linux' => 'Linux',
	'optin-survey-answer-os-other' => 'Άλλο λειτουργικό σύστημα:',
	'optin-survey-question-res' => 'Ποια είναι η ανάλυση της οθόνης σας;',
	'optin-survey-question-changes' => 'Τι αλλαγές θα θέλατε να δείτε στη Beta στο μέλλον (παρακαλώ επιλέξτε όλα όσα εφαρμόζονται);',
	'optin-survey-answer-changes-nav' => 'Μετατροπή της όλης πλοήγησης στον ιστότοπο πιο εύχρηστη.',
	'optin-survey-answer-changes-edittools' => 'Αυξήστε και ενισχύστε τα εργαλεία επεξεργασίας.',
	'optin-survey-answer-changes-upload' => 'Βελτίωση περιεχομένου και φορτώσεις μέσων.',
	'optin-survey-answer-changes-richtext' => 'Ανάπτυξη εργαλείων επεξεργασίας παρόμοιων με πρόγραμμα διόρθωσης πλούσιου κειμένου.',
	'optin-survey-answer-changes-lookfeel' => 'Αλλαγή της εμφάνισης του ιστοτόπου.',
	'optin-survey-answer-changes-predictability' => 'Βελτίωση προβλεψιμότητας της απόδοσης.',
	'optin-survey-answer-changes-custom' => 'Επέτρεψε μεγαλύτερη προσαρμογή χρήστη.',
	'optin-survey-answer-changes-other' => 'Άλλο:',
	'optin-improvements' => '== Τι έχει βελτιωθεί ==
[[File:UsabilityNavigation.png|left|link=]]
;Ενισχυμένη πλοήγηση
Το νέο σύστημα πλοήγησης σας διευκολύνει να δείτε που είστε και τι κάνετε, καθώς επίσης και που μπορείτε να πάτε και πως να φτάσετε εκεί. Με το κουτί αναζήτησης που βρίσκεται πάνω δεξιά, το χαρακτηριστικό αναζήτησης είναι ευκολότερο να βρεθεί και γρηγορότερο στη χρήση.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Επεξεργασία βελτιώσεων γραμμής εργασιών
Νέα-και-βελτιωμένα εικονίδια κάνουν σαφέστερο το τι ενέργεια εκτελεί το κάθε εργαλείο. Επεκτάσιμοι τομείς μειώνουν το σωρό ενώ τα μη συχνά χρησιμοποιούμενα εργαλεία είναι μόνο ένα "κλικ" μακρία.
Ο τομέας βοήθειας παρέχει γρήγορη πρόσβαση σε μια παραπομπή για κοινές χρήσεις της βικισήμανσης.
<div style="clear:both;"></div>
== Πως να περιληφθείτε ==
Για να μάθετε περισσότερα σχετικά με το εγχείρημα ή για να περιληφθείτε, παρακαλώ επισκεφθείτε το [http://usability.wikimedia.org βίκι της Πρωτοβουλίας Χρηστικότητας].  Εκεί θα βρείτε πληροφορίες για την επιχορήγηση, την έρευνα, τον σχεδιασμό + ανάπτυξη, και τις εκδόσεις.  Για να ρωτήσετε κάτι ή να αναδράσετε, παρακαλώ χρησιμοποιήστε την [http://usability.wikimedia.org/wiki/Talk:Prototype πρωτότυπη σελίδα συζήτησης] μας.  Για την αντιμετώπιση ιδιαίτερων θεμάτων, παρακαλώ χρησιμοποιήστε τις σχετικές σελίδες συζήτησης.  Αν βρείτε σφάλματα, παρακαλώ αφήστε τα σχόλιά σας στη [http://usability.wikimedia.org/wiki/Talk:Releases/Acai σελίδα συζήτησης της έκδοσης Acai] ή χρησιμοποιώντας το [https://bugzilla.wikimedia.org Bugzilla].

Ευχαριστούμε και αναμένουμε την ανταπόκρισή σας!',
);

/** Esperanto (Esperanto)
 * @author ArnoLagrange
 * @author Yekrats
 */
$messages['eo'] = array(
	'optin' => 'Nedeviga iniciato pri uzebleco',
	'optin-desc' => 'Permesi al uzantoj provi la Beta-version, la plej lastaj aldonaĵoj de la Iniciato pri Uzebleco.',
	'optin-title-optedout' => 'Provi betan version de Açai',
	'optin-title-optedin' => 'Forlasi Beta-version',
	'optin-title-justoptedin' => 'Bonvenon al Beta-version',
	'optin-title-justoptedout' => 'Dankon por provante nian Beta-version',
	'optin-title-feedback' => 'Opinioj pri Beta-versio',
	'optin-needlogin' => 'Vi devas [$1 ensaluti] por provi Beta-n.',
	'optin-intro' => 'La Iniciato pri Uzebleco de Vikipedio estis laboranta diliĝente por plibonigi la uzeblecon de Vikipedio. Ĉu vi volas provi nian Beta-version?',
	'optin-feedback-intro' => 'Dankon por provado de Beta-versio.
Ni volus scii vian opinion pri la nova interfaco, do bonvolu respondi la jenan nedevigan enketon.',
	'optin-feedback-back' => 'Se vi ne volas respondi la enketon, vi povas reiri al $1.',
	'optin-success-in' => 'Vi nun provas la Beta-version.
Vi povas reveni al la stabila versio klakante la ligilon "{{int:optin-leave}}" ĉe la supro de la ekrano.',
	'optin-leave-cancel' => 'Se vi deziras plu uzadi Beta-version, vi povas reveni al $1.',
	'optin-success-out' => 'Vi sukcese foriris el Beta-versio.
Vi povas reprovi ĝin iam ajn klakante la ligilon "{{int:optin-try}}" suprer dekstre de la ekrano.',
	'optin-success-feedback' => 'Dankon pro viaj opinioj!',
	'optin-accept-short' => 'Jes, ek!',
	'optin-accept-long' => 'Provi la Beta-version',
	'optin-accept-long-anon' => 'Ensaluti kaj provi la Beta-version',
	'optin-deny-short' => 'Ne, dankon.',
	'optin-deny-long' => 'Reiri al antaŭa paĝo',
	'optin-submit-out' => 'Forlasi Beta-version',
	'optin-submit-feedback' => 'Komenti',
	'optin-survey-yes' => 'Jes',
	'optin-survey-no' => 'Ne',
	'optin-survey-intro' => 'Dankon pro via provado de la Beta-versio.
Ni volus sciigi vian opinion pri la nova interfaco, do ni dankemus se vi plenumus la jenan nedevigan enketon antaŭ klakante "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Kio plaĉas al vi pri la Beta-versio? Kio malplaĉas al vi pri la Beta-versio?',
	'optin-survey-question-whyoptout' => 'Kial vi forlasas ĉi tiun beta-version? (bv. elekti ĉion taŭgan)',
	'optin-survey-answer-whyoptout-hard' => 'Ĝi estis tro malfacila uzi.',
	'optin-survey-answer-whyoptout-didntwork' => 'Ĝi ne funkciis ĝuste.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Ĝi ne funkciis ĝuste.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'La aspekto de la interfaco ne plaĉas al mi.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'La novaj etikedoj kaj dizajno ne plaĉas al mi.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'La nova ilobreto ne plaĉas al mi.',
	'optin-survey-answer-whyoptout-other' => 'Alia kialo:',
	'optin-survey-question-explain' => 'Bonvolu ekspliki aŭ pligrandigi vian supran respondon:',
	'optin-survey-question-techfail' => 'Ĉu vi trovis iujn ajn teknikajn fuŝojn uzante la Beta-version?',
	'optin-survey-question-techfail-ifyes' => 'Se jes, bonvolu priskribi:',
	'optin-survey-question-usedtoolbar' => 'Ĉu vi provis la novan etendeblan ilaron por redakti paĝon ?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Se jes, kion vi ŝatis en ĝi? Kion vi malŝatis en ĝi?',
	'optin-survey-question-usedtoolbar-ifno' => 'Se ne, kial ne? Ĉu vi uzos ĝin estonte? Bonvolu klarigi.',
	'optin-survey-question-different' => 'Kion ni povus fari malsame por ke vi plu uzu Beta-on?',
	'optin-survey-question-feedback' => 'Bonvolu diri al ni viajn rimarkojn:',
	'optin-survey-question-browser' => 'Kiun retumilon vi uzas?',
	'optin-survey-answer-browser-other' => 'Alia retumilo:',
	'optin-survey-question-os' => 'Kiun operaciumon vi uzas?',
	'optin-survey-answer-os-other' => 'Alia operaciumo:',
	'optin-survey-question-res' => 'Kio estas la distingivo de via ekrano?',
	'optin-survey-question-changes' => 'Kiujn ŝanĝojn vi ŝatus vidi en Beta estonte (bonvolu elekti ĉion kio taŭgas)?',
	'optin-survey-answer-changes-nav' => 'Igas la foliumadon ĉien en la retejo pli facila',
	'optin-survey-answer-changes-edittools' => 'Etendu kaj plibonigu redaktajn ilojn',
	'optin-survey-answer-changes-upload' => 'Plibonigu enhavon kaj dosierajn alŝutaĵojn.',
	'optin-survey-answer-changes-richtext' => 'Disvolvu redaktajn ilojn similaj al riĉatekstaj redaktiloj.',
	'optin-survey-answer-changes-lookfeel' => 'Ĝisdatigu la aspekton de la retejo.',
	'optin-survey-answer-changes-predictability' => 'Plibonigu funkciigon sen fuŝoj nek cimoj',
	'optin-survey-answer-changes-custom' => 'Ebligu pli multe da uzulaj preferoj',
	'optin-survey-answer-changes-other' => 'Alia:',
	'optin-improvements' => '== Kio estis plibonigita? ==
[[File:UsabilityNavigation.png|left|link=]]
;Plibonigita navigado
La nova navigada sistemo plifacilas vidi kie vi estas, kaj kion vi faras, kaj kie vi povas iri, kaj kiel iri tie. Kun la nova serĉkadro ĉe la supra-dekstra angulo, la serĉ-funkcio estas pli facila trovi kaj pli rapida uzi.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Plibonigado al la redakta ilobreto

Novaj kaj pli bonaj ikonoj klarigas la funkciojn de ĉiu ilo. Etendeblaj sekcioj kaŝas troaĵojn, sed permesas atingon al maloftaj iloj per nur simpla kliko.
La help-sekcio donas rapidan atingon al referenco por oftaj uzoj de vikia marklingvo.
<div style="clear:both;"></div>
== Kiel helpi ==
Lerni plu pri la projekto aŭ helpi, bonvolu viziti la [http://usability.wikimedia.org vikio de la Iniciato pri Uzebleco]. Tie vi trovos informon pri nia subvencio, esplorado, dezegno & disvolvado, kaj eldonado. Demandi aŭ ĝenerale komenti, bonvolu uzi nian [http://usability.wikimedia.org/wiki/Talk:Prototype prototipa diskuto-paĝo]. Trakti specifajn temojn, bonvolu uzi la temajn diskuto-paĝojn. Se vi trovas cimojn, bonvolu komenti ĉe [http://usability.wikimedia.org/wiki/Talk:Releases/Acai eldona diskuto-paĝo de Acai] aŭ uzi [https://bugzilla.wikimedia.org Bugzilla].

Dankegon, kaj ni antaŭĝojas viajn komentojn!',
);

/** Spanish (Español)
 * @author Antur
 * @author Barcex
 * @author Crazymadlover
 * @author Imre
 * @author Locos epraix
 * @author Toliño
 */
$messages['es'] = array(
	'optin' => 'Formar parte de la Iniciativa de usabilidad',
	'optin-desc' => 'Permite a los usuarios probar Beta, las últimas mejoras de usabilidad de la Iniciativa de Usabilidad.',
	'optin-title-optedout' => 'Probar Beta',
	'optin-title-optedin' => 'Abandonar Beta',
	'optin-title-justoptedin' => 'Bienvenido a Beta',
	'optin-title-justoptedout' => 'Gracias por probar Beta',
	'optin-title-feedback' => 'Retroalimentación beta',
	'optin-needlogin' => 'Necesitas [$1 iniciar sesión] para probar Beta',
	'optin-intro' => 'La Iniciativa de usabilidad de Wikipedia ha estado trabajando duro para mejorar la usabilidad de Wikipedia.
¿Te gustaría probar nuestra versión Beta?',
	'optin-feedback-intro' => 'Gracias por probar Beta.
Deseamos saber qué piensa de nuestra interfaz, por lo que le agradeceremos completar la encuesta opcional que se muestra a continuación.',
	'optin-feedback-back' => 'Si no desea llenar la encuesta, puede volver a $1.',
	'optin-success-in' => 'Estás probando ahora Beta.
Puedes volver a dejar de formar parte en cualquier momento haciendo click en el vínculo "{{int:optin-leave}}" en la parte superior derecha de la pantalla.',
	'optin-leave-cancel' => 'Si te gustaría continuar usando Beta, puedes regresar a $1',
	'optin-success-out' => 'Has abandonado exitosamente Beta.
Puedes probarlo nuevamente en cualquier momento haciendo click en el vínculo "{{int:optin-try}}" en la parte superior derecha de la pantalla.',
	'optin-success-feedback' => '¡Gracias por sus comentarios!',
	'optin-accept-short' => '¡Hagámoslo!',
	'optin-accept-long' => 'Probar Beta',
	'optin-accept-long-anon' => 'Regístrese y pruebe Beta',
	'optin-deny-short' => 'No, gracias',
	'optin-deny-long' => 'regresar a la página anterior',
	'optin-submit-out' => 'Abandonar Beta',
	'optin-submit-feedback' => 'Haga sus observaciones',
	'optin-survey-yes' => 'Sí',
	'optin-survey-no' => 'No',
	'optin-survey-intro' => 'Gracias por probar Beta.
Nos gustaría conocer que opinas acerca de la nueva interfaz, apreciaríamos si llenas la encuesta opcional de abajo antes de que hagas click en "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Qué te gustó de Beta? Qué no te gustó de Beta?',
	'optin-survey-question-whyoptout' => 'Porqué estás dejando esta Beta? (por favor selecciona todo lo que aplique)',
	'optin-survey-answer-whyoptout-hard' => 'Fue muy difícil de usar.',
	'optin-survey-answer-whyoptout-didntwork' => 'No funcionó apropiadamente.',
	'optin-survey-answer-whyoptout-notpredictable' => 'No funcionó de manera predecible.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'No me gustó la manera como lució.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'No me gustó las nuevas pestañas y diseño.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'No me gustó la nueva barra de herramientas.',
	'optin-survey-answer-whyoptout-other' => 'Otra razón:',
	'optin-survey-question-explain' => 'Por favor explica o desarrolla tu respuesta arriba:',
	'optin-survey-question-techfail' => 'Experimentaste alguna dificultad técnica cuando usaste Beta?',
	'optin-survey-question-techfail-ifyes' => 'Si es sí, por favor desarrolla o explica:',
	'optin-survey-question-usedtoolbar' => 'Usaste la nueva barra de herramientas expandible para editar una página?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Si es sí, qué te gustó de él? qué te disgustó de él?',
	'optin-survey-question-usedtoolbar-ifno' => 'En caso negativo, ¿por qué?...  ¿Lo haría en el futuro? Por favor, explíquelo.',
	'optin-survey-question-different' => 'Qué podríamos haber hecho diferente para que te mantuvieses usando nuestra Beta?',
	'optin-survey-question-feedback' => 'Por favor déjanos saber acercar de algunos otros comentarios, inquietudes u opiniones que tengas para nosotros - toda retroalimentación es útil!:',
	'optin-survey-question-browser' => '¿Qué navegador utiliza?',
	'optin-survey-answer-browser-other' => 'Otro navegador:',
	'optin-survey-question-os' => '¿Qué sistema operativo utiliza?',
	'optin-survey-answer-os-other' => 'Otro sistema operativo:',
	'optin-survey-question-res' => '¿Cuál es la resolución de su pantalla?',
	'optin-survey-question-changes' => '¿Qué cambios desearía ver en Beta en el futuro? (por favor seleccione todo lo que coincida)',
	'optin-survey-answer-changes-nav' => 'Hace la navegación general del sitio mas fácil de usar.',
	'optin-survey-answer-changes-edittools' => 'Aumenta y mejora las herramientas de edición.',
	'optin-survey-answer-changes-upload' => 'Mejorar contenido y cargas de medios.',
	'optin-survey-answer-changes-richtext' => 'Herramientas de edición similares a los editores de texto enriquecido.',
	'optin-survey-answer-changes-lookfeel' => 'Actualiza la interfaz del sitio.',
	'optin-survey-answer-changes-predictability' => 'Mejorar predictibilidad de desempeño',
	'optin-survey-answer-changes-custom' => 'Permite una gran personalización del usuario.',
	'optin-survey-answer-changes-other' => 'Otro:',
	'optin-improvements' => '== Qué ha sido mejorado? ==
[[File:UsabilityNavigation.png|left|link=]]
;Navegación mejorada
El nuevo sistema de navegación hace más fácil ver en donde estás y qué estás haciendo, también como dónde puedes ir y cómo ir. Con la tabla de búsqueda localizada en la esquina superior izquierda la búsqueda es más fácil de encontrar y más rápida de usar.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Mejoras de la barra de herramientas de edición
Nuevos-y-mejores íconos clarifican la acción de cada herramienta. Secciones expandibles reducen la saturación y mantienen herramientas poco usadas a solo un clic de distancia.
La sección de ayuda provee acceso rápido a una referencia para usos comunes del lenguaje wiki.
<div style="clear:both;"></div>
== Cómo involucrarse ==
Para aprender más acerca del proyecto o involucrarse, por favor visita la [http://usability.wikimedia.org Iniciativa de usabilidad de wiki].  Allí encontrarás información acerca de nuestra subvención, investigación, diseño + desarrollo, y versiones.  Para preguntar o dejar retroalimentación general, por favor utiliza nuestra [http://usability.wikimedia.org/wiki/Talk:Prototype página de discusión prototipo].  Para plantear temas particulares, por favor usa las páginas de discusión específicas.  Si encuentras errores, por favor deja tus comentarios en la [http://usability.wikimedia.org/wiki/Talk:Releases/Acai página de discusión versión Acai] o usando [https://bugzilla.wikimedia.org Bugzilla].

Gracias, y esperamos saber pronto de tí!',
);

/** Estonian (Eesti)
 * @author Avjoska
 * @author Pikne
 */
$messages['et'] = array(
	'optin' => 'Kasutushõlpsuse algatuses kaasategemine',
	'optin-desc' => 'Võimaldab proovida beetat, viimaseid kasutushõlpsuse täiustusi.',
	'optin-title-optedout' => 'Proovi beetat',
	'optin-title-optedin' => 'Lahku beetaversioonist',
	'optin-title-justoptedin' => 'Tere tulemast beetasse',
	'optin-title-justoptedout' => 'Täname, et proovisid beetaversiooni',
	'optin-title-feedback' => 'Anna tagasisidet',
	'optin-needlogin' => 'Beeta proovimiseks tuleb [$1 sisse logida].',
	'optin-intro' => 'Vikipeedia kasutushõlpsuse algatus on Vikipeedia paremini kasutatavaks muutmise nimel palju tööd teinud. Kas soovid beetat proovida?',
	'optin-feedback-back' => 'Kui sa ei soovi küsitlust täita, saad naasta leheküljele $1.',
	'optin-success-feedback' => 'Aitäh tagasiside eest!',
	'optin-accept-short' => 'Tehkem proovi!',
	'optin-accept-long' => 'Proovi Beta-versiooni',
	'optin-accept-long-anon' => 'Logi sisse ja proovi beetat',
	'optin-deny-short' => 'Ei, tänan',
	'optin-deny-long' => 'Naase eelmisele lehele',
	'optin-submit-out' => 'Lahku Beta-versioonist',
	'optin-submit-feedback' => 'Anna tagasisidet',
	'optin-survey-yes' => 'Jah',
	'optin-survey-no' => 'Ei',
	'optin-survey-question-likedislike' => 'Mis meeldis beetas? Mis ei meeldinud beetas?',
	'optin-survey-question-whyoptout' => 'Miks sa lahkud beetaversioonist? (Palun vali kõik sobivad põhjused.)',
	'optin-survey-answer-whyoptout-hard' => 'See oli kasutamiseks liialt keeruline.',
	'optin-survey-answer-whyoptout-didntwork' => 'See ei toiminud korralikult.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Mulle ei meeldinud selle välimus.',
	'optin-survey-answer-whyoptout-other' => 'Muu põhjus:',
	'optin-survey-question-usedtoolbar-ifyes' => 'Kui jah, siis mis sulle selle juures meeldis? Mis ei meeldinud?',
	'optin-survey-question-usedtoolbar-ifno' => 'Kui ei, siis miks? Kas edaspidi on plaanis? Palun selgita.',
	'optin-survey-question-browser' => 'Millist internetilehitsejat kasutad?',
	'optin-survey-answer-browser-other' => 'Muu internetilehitseja:',
	'optin-survey-question-os' => 'Millist operatsioonisüsteemi sa kasutad?',
	'optin-survey-answer-os-other' => 'Muu operatsioonisüsteem:',
	'optin-survey-question-res' => 'Milline on su ekraani resolutsioon?',
	'optin-survey-question-changes' => 'Milliseid muudatusi soovid näha Beta-versioonis tulevikus (vali kõik sobivad)?',
);

/** Basque (Euskara)
 * @author An13sa
 * @author Kobazulo
 * @author Theklan
 */
$messages['eu'] = array(
	'optin' => 'Erabilgarritasun Iniziatibarekin bat egin',
	'optin-desc' => 'Erabiltzaileen Beta frogatzea baimentzen die, Erabilgarritasun Iniziatibaren azkeneko erabilgarritasun hobekuntzekin.',
	'optin-title-optedout' => 'Beta probatu',
	'optin-title-optedin' => 'Beta utzi',
	'optin-title-justoptedin' => 'Ongi etorri Betara',
	'optin-title-justoptedout' => 'Mila esker Beta probatzeagatik',
	'optin-title-feedback' => 'Beta feedbacka',
	'optin-needlogin' => '[$1 saioa hasi] behar duzu Beta probatzeko.',
	'optin-intro' => 'Wikipediaren Erabilgarritasun Iniziatiba lanean aritu da Wikipediaren erabilgarritasuna hobetzeko.
Nahiko al zenuke gure Beta probatu?',
	'optin-feedback-intro' => 'Eskerrik asko Beta erabili izanagatik.
Jakin nahi dugu ea zer deritzozun interfaze berriaren inguruan, beraz asko gustatuko litzaiguke behean duzun hautazko inkesta beteko bazenu.',
	'optin-feedback-back' => 'Ez baduzu gure inkesta bete nahi, $1-(e)ra itzul zenezake.',
	'optin-success-out' => 'Betarik arrakastatsuko atera zara.
Nahi duzunean proba dezakezu berriro "{{int:optin-try}}" loturan klik eginda pantailaren goian eskuinaldean.',
	'optin-success-feedback' => 'Milesker zure feedbackarengatik!',
	'optin-accept-short' => 'Proba dezagun!',
	'optin-accept-long' => 'Beta probatu',
	'optin-accept-long-anon' => 'Saioa hasi eta Beta probatu',
	'optin-deny-short' => 'Ez, mila esker',
	'optin-deny-long' => 'Itzuli aurreko orrialdera',
	'optin-submit-out' => 'Beta utzi',
	'optin-submit-feedback' => 'Eman feedbacka',
	'optin-survey-yes' => 'Bai',
	'optin-survey-no' => 'Ez',
	'optin-survey-question-likedislike' => 'Zer gustatu zaizu Betatik? Zer ez zaizu gustatu?',
	'optin-survey-question-whyoptout' => 'Zergatik atera zara Betatik? (Mesedez galdera guztiak erantzun.)',
	'optin-survey-answer-whyoptout-hard' => 'Erabiltzea zailegia zen.',
	'optin-survey-answer-whyoptout-didntwork' => 'Ez zebilen behar bezala.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Ez du ondo funtzionatzen.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Ez nuen bere itxura gustuko.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Diseinu berria ez zait gustatu.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Ez zitzaidan tresna-barra berria gustatzen.',
	'optin-survey-answer-whyoptout-other' => 'Beste arrazoirik:',
	'optin-survey-question-explain' => 'Mesedez azaldu zure erantzuna behean:',
	'optin-survey-question-techfail' => 'Arazo teknikorik izan duzu Beta erabiltzean?',
	'optin-survey-question-different' => 'Zer egin genezakeen ezberdina zuk Beta erabiltzen jarraitzeko?',
	'optin-survey-question-browser' => 'Zein nabigatzaile erabiltzen duzu?',
	'optin-survey-answer-browser-other' => 'Beste nabigatzailerik:',
	'optin-survey-question-os' => 'Zein sistema eragile erabiltzen duzu?',
	'optin-survey-answer-os-other' => 'Beste sistema eragilerik:',
	'optin-survey-question-res' => 'Zein da zure pantailaren bereizmena?',
	'optin-survey-answer-changes-upload' => 'Edukiak eta artxiboen igoera hobetu.',
	'optin-survey-answer-changes-other' => 'Bestelakoak:',
	'optin-improvements' => '== Zer hobetu da? ==
[[File:UsabilityNavigation.png|left|link=]]
;Nabigazioa hobetua
Nabigazio sistema berriak non zauden ikusteko eta ezer egiten ari zaren jakiteko erraztasun handiagoa ematen du, hala nola nahi duzun lekura joan eta nahi duzuna lortzeko. Goian eskuinean dagoen bilaketa kutxarekin, bilaketak egitea errazagoa izango da.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Editatzeko tresna-barrako hobekuntzak
Ikono berria eta hobetuek erabili behar duzun tresna argiago erakusten dute. Gainera, gehien erabiltzen dituzun tresnak klik batera edukiko dituzu.
Laguntza atalak tresna hauen erabilera amankomunetarako erreferentzia azkar batera eramango zaitu .
<div style="clear:both;"></div>
== Gehiago jakiteko ==
Proiektuari buruz gehiago jakiteko edo parte hartzeko, joan zaitez [http://usability.wikimedia.org Erabilgarritasun Iniziatibaren wikira].  Orri horretan gure beka, ikerketa, diseinu + garapena, eta argitaratutako berriak ikusiko dituzu.  Galderak egiteko edo zure feedback orokorra uzteko, joan zaitez gure [http://usability.wikimedia.org/wiki/Talk:Prototype prototype eztabaida orrira]. Gai zehatzak helbideratzeko, erabili atxikitutako eztabaida orria.  Akatsik aurkitzen baduzu, utzi zure iruzkina [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai release eztabaida orrian] edo [https://bugzilla.wikimedia.org Bugzilla] erabiliz.

Milesker eta zure berri izateko irrikan gaude!',
);

/** Persian (فارسی)
 * @author Ladsgroup
 * @author Mardetanha
 */
$messages['fa'] = array(
	'optin-title-optedout' => 'استفاده از بتا',
	'optin-title-optedin' => 'خروج از بتا',
	'optin-title-justoptedin' => 'به نسخه بتا خوش‌آمدید',
	'optin-title-justoptedout' => 'ممنونیم از اینکه نسخه بتا را امتحان کردید',
	'optin-needlogin' => 'شما برای استفاده از نسخه بتا باید [$1 وارد شوید].',
	'optin-accept-long' => 'خروج از بتا',
	'optin-deny-short' => 'نه ممنون!',
	'optin-deny-long' => 'بازگشت به صفحه قبلی',
	'optin-submit-out' => 'خروج از بتا',
	'optin-survey-yes' => 'بله',
	'optin-survey-no' => 'نه',
	'optin-survey-answer-whyoptout-other' => 'دلایل دیگر:',
);

/** Finnish (Suomi)
 * @author Cimon Avaro
 * @author Crt
 * @author Nike
 * @author Silvonen
 * @author Str4nd
 */
$messages['fi'] = array(
	'optin' => 'Käytettävyyshankkeen valinnainen käyttöönotto',
	'optin-desc' => 'Mahdollistaa käyttäjien kokeilla Betaa – käytettävyyshankkeen uusimpia käytettävyyttä parantavia lisäyksiä.',
	'optin-title-optedout' => 'Kokeile Betaa',
	'optin-title-optedin' => 'Poistu Betasta',
	'optin-title-justoptedin' => 'Tervetuloa Betaan',
	'optin-title-justoptedout' => 'Kiitos Betan kokeilusta',
	'optin-title-feedback' => 'Anna palautetta',
	'optin-needlogin' => 'Sinun tulee [$1 kirjautua sisään] kokeillaksesi Betaa.',
	'optin-intro' => 'Wikipedian käytettävyyshanke on ahkeroinut parantaakseen Wikipedian käytettävyyttä. 
Haluatko kokeilla Betaa?',
	'optin-feedback-intro' => 'Kiitos Betan kokeilusta.
Haluaisimme tietää, mitä mieltä olet uudesta käyttöliittymästä, joten arvostaisimme jos täyttäisit alapuolelta löytyvän valinnaisen kyselyn.',
	'optin-feedback-back' => 'Jos et halua täyttää kyselylomaketta, voit palata kohteeseen $1.',
	'optin-success-in' => 'Kokeilet nyt Betaa.
Voit poistaa valinnan käytöstä milloin tahansa napsauttamalla ”{{int:optin-leave}}” -painiketta ruudun yläreunassa.',
	'optin-leave-cancel' => 'Jos haluat edelleen käyttää Betaa, voit palata kohteeseen $1',
	'optin-success-out' => 'Olet onnistuneesti poistunut Betasta.
Voit milloin tahansa kokeilla sitä uudelleen ”{{int:optin-try}}” -painikkeesta ruudun oikeasta yläkulmasta.',
	'optin-success-feedback' => 'Kiitos palautteestasi.',
	'optin-accept-short' => 'Tehdään niin!',
	'optin-accept-long' => 'Kokeile Betaa',
	'optin-accept-long-anon' => 'Kirjaudu sisään ja kokeile Betaa',
	'optin-deny-short' => 'Ei kiitos',
	'optin-deny-long' => 'Palaa edelliselle sivulle',
	'optin-submit-out' => 'Poistu Betasta',
	'optin-submit-feedback' => 'Anna palautetta',
	'optin-survey-yes' => 'Kyllä',
	'optin-survey-no' => 'Ei',
	'optin-survey-intro' => 'Kiitos Betan kokeilusta.
Haluaisimme tietää, mitä mieltä olet uudesta käyttöliittymästä, joten arvostaisimme jos täyttäisit valinnaisen kyselyn ennen ”[[#leave|{{int:optin-submit-out}}]]” -painikkeen napsautusta.',
	'optin-survey-question-likedislike' => 'Mistä pidit Betassa? Mistä et pitänyt Betassa?',
	'optin-survey-question-whyoptout' => 'Miksi olet poistumassa Betasta? (Valitse kaikki sopivat syyt.)',
	'optin-survey-answer-whyoptout-hard' => 'Se oli liian vaikeakäyttöinen.',
	'optin-survey-answer-whyoptout-didntwork' => 'Se ei toiminut oikein.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Se ei toiminut ennustettavalla tavalla.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'En pitänyt sen ulkonäöstä.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'En pitänyt uusista välilehdistä ja asettelusta.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'En pitänyt uudesta työkalurivistä.',
	'optin-survey-answer-whyoptout-other' => 'Muu syy',
	'optin-survey-question-explain' => 'Olisitteko ystävällinen ja selittäisitte tai selventäisitte edelläolevaa vastaustanne:',
	'optin-survey-question-techfail' => 'Koitko teknisiä häiriöitä käyttäessäsi Betaa?',
	'optin-survey-question-techfail-ifyes' => 'Jos kyllä, olisitko ystävällinen ja selventäisit tai selittäisit:',
	'optin-survey-question-usedtoolbar' => 'Käytitkö uutta laajennettavaa työkaluriviä sivun muokkauksessa?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Jos kyllä, mistä sinä pidit siinä? Et pitänyt siinä?',
	'optin-survey-question-usedtoolbar-ifno' => 'Jos et, miksi? Aiotko tulevaisuudessa? Ole hyvä ja perustele.',
	'optin-survey-question-different' => 'Mitä olisimme voineet tehdä toisin, jotta olisit jatkanut Betan käyttämistä?',
	'optin-survey-question-feedback' => 'Anna meille palautetta',
	'optin-survey-question-browser' => 'Mitä selainta käytät?',
	'optin-survey-answer-browser-other' => 'Muu selain',
	'optin-survey-question-os' => 'Mitä käyttöjärjestelmää käytät?',
	'optin-survey-answer-os-other' => 'Muu käyttöjärjestelmä',
	'optin-survey-question-res' => 'Mikä on näyttösi resoluutio?',
	'optin-survey-question-changes' => 'Mitä muutoksia haluaisit nähdä Betassa tulevaisuudessa (valitse kaikki sopivat)?',
	'optin-survey-answer-changes-nav' => 'Helpottaa sivuston navigointia ylipäätään.',
	'optin-survey-answer-changes-edittools' => 'Lisää ja tehosta mukkaustyökaluita.',
	'optin-survey-answer-changes-upload' => 'Paranna sisällön ja median lähettämistä.',
	'optin-survey-answer-changes-richtext' => 'Kehitä muokkaustyökaluita tekstinkäsittelyohjelmia muistuttavaksi.',
	'optin-survey-answer-changes-lookfeel' => 'Päivitä sivuston ulkonäköä ja käytettävyyttä.',
	'optin-survey-answer-changes-predictability' => 'Paranna esityksen ennustettavuutta.',
	'optin-survey-answer-changes-custom' => 'Sallii laajemman käyttäjäkohtaisen muutettavuuden.',
	'optin-survey-answer-changes-other' => 'Muu',
	'optin-improvements' => '== Mitä on uudistettu? ==
[[File:UsabilityNavigation.png|left|link=]]
;Paranneltu navigointi
Uudesta valikkojärjestelmästä näkee helpommin, missä olet ja mitä teet. Näet myös helpommin, minne voit mennä ja kuinka pääset sinne. Oikeassa yläkulmassa olevalla hakulaatikolla hakutoimintoa on helpompi ja nopeampi käyttää.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Muokkauspalkin parannukset
Uusista ja parannetuista kuvakkeista näkee helpommin, mitä mikäkin työkalu tekee. Laajennettavat osiot vähentävät epäjärjestystä, kun harvoin käytetyt työkalut ovat vain klikkauksen päässä.
Ohje-osiosta näkyy esimerkit wikimerkinnän yleiseen käyttöön nopeasti.
<div style="clear:both;"></div>',
);

/** French (Français)
 * @author IAlex
 * @author Kropotkine 113
 * @author Louperivois
 * @author PieRRoMaN
 * @author Urhixidur
 */
$messages['fr'] = array(
	'optin' => 'Participer à l’initiative d’utilisabilité',
	'optin-desc' => 'Permet aux utilisateurs d’essayer la bêta Açai, les améliorations de l’initiative d’utilisabilité',
	'optin-title-optedout' => 'Essayer la bêta Açai',
	'optin-title-optedin' => 'Quitter la bêta Açai',
	'optin-title-justoptedin' => 'Bienvenue à la bêta Açai',
	'optin-title-justoptedout' => 'Merci pour votre participation à la bêta Açai',
	'optin-title-feedback' => 'Donnez votre avis',
	'optin-needlogin' => 'Vous devez vous [$1 connecter] pour essayer la bêta Açai',
	'optin-intro' => 'L’initiative d’utilisabilité de Wikipédia a travaillé dur pour améliorer l’utilisabilité des projets Wikimédia.
Voulez-vous essayer la bêta Açai ?',
	'optin-feedback-intro' => 'Merci d’essayer la bêta.
Nous aimerions savoir ce que vous pensez de notre nouvelle interface, nous apprécierions que vous remplissiez le questionnaire ci-dessous.',
	'optin-feedback-back' => 'Si vous ne voulez pas remplir le questionnaire, vous pouvez revenir à $1.',
	'optin-success-in' => 'Vous êtes en train de tester la bêta.
Vous pouvez interrompre la session à tout moment en cliquant sur le lien « {{int:optin-leave}} » en haut de l’écran.',
	'optin-leave-cancel' => 'Si vous voulez continuer à utiliser la bêta Acai, vous pouvez revenir à $1',
	'optin-success-out' => 'Vous avez quitté la bêta Açai.
Vous pouvez de nouveau participer à tout moment en cliquant sur le lien « {{int:optin-try}} » en haut à droite de l’écran.',
	'optin-success-feedback' => 'Merci pour votre avis !',
	'optin-accept-short' => 'Allons-y !',
	'optin-accept-long' => 'Essayer la bêta Açai',
	'optin-accept-long-anon' => 'Connectez-vous et essayez la bêta',
	'optin-deny-short' => 'Non merci',
	'optin-deny-long' => 'Revenir à la page précédente',
	'optin-submit-out' => 'Quitter la bêta Açai',
	'optin-submit-feedback' => 'Donnez votre avis',
	'optin-survey-yes' => 'Oui',
	'optin-survey-no' => 'Non',
	'optin-survey-intro' => 'Merci pour votre essai de la bêta Açai.

Nous aimerions savoir ce que vous pensez de notre nouvelle interface, nous apprécierions que vous remplissiez le sondage optionnel avant de cliquer sur « [[#leave|{{int:optin-submit-out}}]] ».',
	'optin-survey-question-likedislike' => 'Qu’avez-vous aimé dans la bêta Açai ? Qu’est-ce que vous n’avez pas aimé dans la bêta Açai ?',
	'optin-survey-question-whyoptout' => 'Pourquoi quittez-vous la bêta Açai ? (sélectionnez tout ce qui convient)',
	'optin-survey-answer-whyoptout-hard' => 'Il était trop difficile de l’utiliser.',
	'optin-survey-answer-whyoptout-didntwork' => 'Ça ne fonctionne pas correctement.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Cela ne s’est pas passé comme prévu.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Je n’ai pas aimé son apparence.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Je n’ai pas aimé les nouveaux onglets et la nouvelle disposition.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Je n’ai pas aimé la nouvelle barre d’outils.',
	'optin-survey-answer-whyoptout-other' => 'Autre raison :',
	'optin-survey-question-explain' => 'Expliquez ou élaborez votre réponse ci-dessus :',
	'optin-survey-question-techfail' => 'Avez-vous rencontré des problèmes techniques en utilisant la bêta Açai ?',
	'optin-survey-question-techfail-ifyes' => 'Si oui, expliquez ou élaborez :',
	'optin-survey-question-usedtoolbar' => 'Avez-vous utilisé la nouvelle barre d’outils déroulable pour modifier une page ?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Si oui, qu’avez vous aimé et que n’avez-vous pas aimé à son propos ?',
	'optin-survey-question-usedtoolbar-ifno' => 'Si non, pourquoi ? L’utiliserez-vous dans le futur ? Expliquez.',
	'optin-survey-question-different' => 'Qu’est-ce qui aurait dû être différent pour que vous continuiez à utiliser la bêta Açai ?',
	'optin-survey-question-feedback' => 'Donnez-nous votre réaction :',
	'optin-survey-question-browser' => 'Quel navigateur utilisez-vous ?',
	'optin-survey-answer-browser-other' => 'Autre navigateur :',
	'optin-survey-question-os' => 'Quel système d’exploitation utilisez-vous ?',
	'optin-survey-answer-os-other' => 'Autre système d’exploitation :',
	'optin-survey-question-res' => 'Quelle est la résolution de votre écran ?',
	'optin-survey-question-changes' => 'Qu’aimeriez-vous voir dans la bêta dans le futur (sélectionnez tout ce qui convient) ?',
	'optin-survey-answer-changes-nav' => 'Faire que la navigation générale du site soit plus simple à utiliser.',
	'optin-survey-answer-changes-edittools' => 'Améliorer et augmenter les outils d’édition.',
	'optin-survey-answer-changes-upload' => 'Améliorer l’importation de contenu et de média.',
	'optin-survey-answer-changes-richtext' => 'Développer des outils de modification similaires aux éditeurs en texte enrichi.',
	'optin-survey-answer-changes-lookfeel' => 'Changer l’apparence du site.',
	'optin-survey-answer-changes-predictability' => 'Améliorer la prévisibilité des modifications.',
	'optin-survey-answer-changes-custom' => 'Permettre une plus grande personnalisation de l’interface.',
	'optin-survey-answer-changes-other' => 'Autre :',
	'optin-improvements' => '== Qu’est-ce qui a été amélioré ? ==
[[File:UsabilityNavigation.png|left|link=]]
;Navigation enrichie
Le nouveau système de navigation vous permet de voir plus facilement où vous êtes et ce que vous faites, de même que où vous pouvez aller et comment vous y rendre. Avec la boîte de recherche située dans le coin supérieur droit, la fonctionnalité de recherche est plus facile à trouver et plus rapide à utiliser.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Améliorations de la barre d’outils
De toutes nouvelles icônes clarifient l’action effectuée par chaque outil. Des sections expansibles réduisent le désordre tout en gardant l’accès aux outils plus rarement utilisés à portée de clic.
La section d’aide fournit un accès rapide à la documentation sur l’utilisation courante des balises wiki.
<div style="clear:both;"></div>

== Comment s’impliquer ==
Pour en savoir davantage à propos du projet ou pour s’y impliquer, visitez [http://usability.wikimedia.org le wiki de l’initiative d’utilisabilité]. Vous y trouverez des informations sur notre subvention, la recherche, la conception et le développement. Pour poser des questions ou pour laisser des commentaires, merci d’utiliser notre [http://usability.wikimedia.org/wiki/Talk:Prototype page de discussion sur le prototype]. Pour aborder des sujets particuliers, utilisez les pages de discussion associées. Si vous trouvez des bogues, merci de laisser un message sur [http://usability.wikimedia.org/wiki/Talk:Releases/Acai la page de discussion de la version Açai] ou via [https://bugzilla.wikimedia.org Bugzilla].

Merci, nous nous réjouissons de votre intérêt !',
);

/** Franco-Provençal (Arpetan)
 * @author Cedric31
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'optin-survey-yes' => 'Ouè',
	'optin-survey-no' => 'Nan',
	'optin-survey-answer-changes-other' => 'Ôtro :',
);

/** Irish (Gaeilge)
 * @author Kwekubo
 */
$messages['ga'] = array(
	'optin-intro' => 'Tá Tionscnamh Inúsáideachta na Vicipéide ag obair chun inúsáideacht na Vicipéide a fheabhsú.
Ar mhaith leat ár Béite a thriail?',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'optin' => 'Participar na Iniciativa de usabilidade',
	'optin-desc' => 'Permite que os usuarios proben Beta, as últimas melloras da Iniciativa de usabilidade.',
	'optin-title-optedout' => 'Probar Beta',
	'optin-title-optedin' => 'Deixar Beta',
	'optin-title-justoptedin' => 'Benvido a Beta',
	'optin-title-justoptedout' => 'Grazas por probar Beta',
	'optin-title-feedback' => 'Dea a súa opinión',
	'optin-needlogin' => 'Ten que [$1 acceder ao sistema] para probar Beta.',
	'optin-intro' => 'A Iniciativa de usabilidade da Wikipedia traballou duro para mellorar a usabilidade da Wikipedia.
Quere probar Beta?',
	'optin-feedback-intro' => 'Grazas por probar Beta.
Queremos saber que pensa da nosa nova interface, polo que lle agradeceriamos que enchese a enquisa opcional que aparece a continuación.',
	'optin-feedback-back' => 'Se non quere encher a enquisa, pode voltar a "$1".',
	'optin-success-in' => 'Xa está probando Beta.
Pode saír en calquera momento facendo clic na ligazón "{{int:optin-leave}}" que aparecerá na parte superior da pantalla.',
	'optin-leave-cancel' => 'Se quere seguir usando Beta, pode voltar a "$1".',
	'optin-success-out' => 'Deixou de probar Beta.
Pode participar nas probas en calquera momento facendo clic na ligazón "{{int:optin-try}}" que aparecerá no canto superior dereito da pantalla.',
	'optin-success-feedback' => 'Grazas polos seus comentarios!',
	'optin-accept-short' => 'Fagámolo!',
	'optin-accept-long' => 'Probar Beta',
	'optin-accept-long-anon' => 'Acceda ao sistema e probe Beta',
	'optin-deny-short' => 'Non, grazas',
	'optin-deny-long' => 'Voltar á páxina anterior',
	'optin-submit-out' => 'Deixar Beta',
	'optin-submit-feedback' => 'Enviar a opinión',
	'optin-survey-yes' => 'Si',
	'optin-survey-no' => 'Non',
	'optin-survey-intro' => 'Grazas por probar Beta.
Queremos saber que pensa da nosa nova interface, polo que lle agradeceriamos que enchese a enquisa opcional que aparece a continuación antes de premer en "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Que é o que lle gusta de Beta? E que non?',
	'optin-survey-question-whyoptout' => 'Por que está a saír desta beta? (por favor, seleccione o que sexa conveniente)',
	'optin-survey-answer-whyoptout-hard' => 'Foi moi difícil de usar.',
	'optin-survey-answer-whyoptout-didntwork' => 'Non funcionou correctamente.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Non funcionou de modo predicible.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Non me gustou o seu aspecto.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Non me gustaron as novas lapelas e a distribución.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Non me gustou a nova barra de ferramentas.',
	'optin-survey-answer-whyoptout-other' => 'Outro motivo:',
	'optin-survey-question-explain' => 'Por favor, explique ou elabore as súas respostas anteriores:',
	'optin-survey-question-techfail' => 'Atopouse con algún fallo técnico durante a utilización de Beta?',
	'optin-survey-question-techfail-ifyes' => 'Se a resposta é si, por favor, descríbao ou explíqueo a continuación:',
	'optin-survey-question-usedtoolbar' => 'Usou a nova barra de ferramentas expansible para editar unha páxina?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Se a resposta é si, que é o que lle gustou dela? E que non?',
	'optin-survey-question-usedtoolbar-ifno' => 'Se a resposta é non, por que non? Farao no futuro? Por favor, explíqueo.',
	'optin-survey-question-different' => 'Que poderiamos ter feito diferente para que seguise usando Beta?',
	'optin-survey-question-feedback' => 'Por favor, déixenos a súa opinión:',
	'optin-survey-question-browser' => 'Que navegador usa?',
	'optin-survey-answer-browser-other' => 'Outro navegador:',
	'optin-survey-question-os' => 'Que sistema operativo usa?',
	'optin-survey-answer-os-other' => 'Outros sistemas operativos:',
	'optin-survey-question-res' => 'Cal é a resolución da súa pantalla?',
	'optin-survey-question-changes' => 'Que cambios lle gustaría ver en Beta no futuro (seleccione todas as que cumpran)?',
	'optin-survey-answer-changes-nav' => 'Facer a navegación xeral do sitio máis doada de usar.',
	'optin-survey-answer-changes-edittools' => 'Aumentar e mellorar as ferramentas de edición.',
	'optin-survey-answer-changes-upload' => 'Mellorar o contido e as cargas multimedia.',
	'optin-survey-answer-changes-richtext' => 'Desenvolver ferramentas de edición similares aos editores de texto.',
	'optin-survey-answer-changes-lookfeel' => 'Actualizar o aspecto e apariencia do sitio.',
	'optin-survey-answer-changes-predictability' => 'Mellorar a previsibilidade dos resultados.',
	'optin-survey-answer-changes-custom' => 'Permitir unha maior personalización por parte dos usuarios.',
	'optin-survey-answer-changes-other' => 'Outros:',
	'optin-improvements' => '== Que se mellorou? ==
[[File:UsabilityNavigation.png|left|link=]]
;Navegación realzada
O novo sistema de navegación fai máis doado ver onde se está e que se está facendo, así como onde se pode ir e como chegar ata alí. Co cadro de procuras localizado no canto superior dereito obtense un acceso máis fácil para así poder realizar unha busca máis rápida.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Melloras na barra de ferramentas de edición
As novas e melloradas iconas fan máis clara a identificación da acción que realiza cada unha. As seccións expansibles reducen a desorde á vez que manteñen as ferramentas menos usadas a só un clic de distancia.
A sección de axuda proporciona un acceso rápido a unha referencia cos usos comúns do formato wiki.
<div style="clear:both;"></div>
== Como involucrarse ==
Para coñecer máis sobre o proxecto ou involucrarse nel existe o [http://usability.wikimedia.org wiki da Iniciativa de usabilidade], onde se atopa a información sobre as nosas subvencións, investigacións, deseño e desenvolvemento e lanzamentos. Para facer preguntas ou valoracións xerais existe a nosa [http://usability.wikimedia.org/wiki/Talk:Prototype páxina de conversa do prototipo], así como outras páxinas de conversa asociadas a asuntos particulares. En caso de se atopar algún erro hai á disposición a [http://usability.wikimedia.org/wiki/Talk:Releases/Acai páxina de discusión da versión Acai] ou mesmo [https://bugzilla.wikimedia.org Bugzilla].

Grazas, e agardamos calquera opinión que nos axude a mellorar!',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'optin-survey-yes' => 'Ναί',
	'optin-survey-no' => 'Οὐ',
	'optin-survey-answer-whyoptout-other' => 'Αἰτία ἄλλη:',
	'optin-survey-answer-os-other' => 'Ἄλλον λειτουργικὸν σύστημα:',
	'optin-survey-answer-changes-other' => 'Ἄλλον:',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'optin' => 'Benutzerfrejndligkeits-Initiative uuswehle',
	'optin-desc' => 'Benutzer erlaube Beta z uuszprobiere, di nejschte Verbesserige vu dr Benutzerfrejndligkeits-Initiative.',
	'optin-title-optedout' => 'Beta uusprobiere',
	'optin-title-optedin' => 'Beta verloo',
	'optin-title-justoptedin' => 'Willchuu bi Beta',
	'optin-title-justoptedout' => 'Dankschen, ass du Beta uusprobiersch',
	'optin-title-feedback' => 'Ruckmäldig gee',
	'optin-needlogin' => 'Du muesch Di [$1 aamälde] go Beta uuszprobiere',
	'optin-intro' => 'D Wikipedia-Benutzerfrejndligkeits-Initiative het zimli draa gschafft go d Benutzerfrejndligkeits vu dr Wikipedia z verbessere. 
Witt Beta uusprobiere?',
	'optin-feedback-intro' => 'Dankschen, ass Du Beta uusprobiersch.
Mir wette gärn erfahre, was Du iber unseri nej Benutzeroberflächi dänksch un deeten is freie, wänn Du an däre, frekwillige Umfrog mitmachsch.',
	'optin-feedback-back' => 'Wänn Du die Umfrog nit witt uusfille, no chasch zue $1 zruckgoh.',
	'optin-success-in' => 'Du probiersch jetz Beta uus.
Du chasch s wider ruckgängig mache dur e Klick uf „{{int:optin-leave}}“ obe uf dr Benutzeroberflächi.',
	'optin-leave-cancel' => 'Wänn du Beta wyter witt verwände, chasch zruck goh zue $1',
	'optin-success-out' => 'Du hesch Beta erfolgrych verloo.
Du chasch s wider uusprobiere dur e Klick uf „{{int:optin-try}}“ obe uf dr Benutzeroberflächi.',
	'optin-success-feedback' => 'Dankschen fir Dyy Ruckmäldig!',
	'optin-accept-short' => 'Los goht s!',
	'optin-accept-long' => 'Beta uusprobiere',
	'optin-accept-long-anon' => 'Aamälden un Beta uusprobiere',
	'optin-deny-short' => 'Nei dankschen',
	'optin-deny-long' => 'zruck zue dr letschte Syte',
	'optin-submit-out' => 'Beta verloo',
	'optin-submit-feedback' => 'Ruckmäldig gee',
	'optin-survey-yes' => 'Jo',
	'optin-survey-no' => 'Nei',
	'optin-survey-intro' => 'Dankschen, ass Du Beta uusprobiert hesch.

Mir wisste gärn, was Du iber di nej Benutzeroberflächi dänksch. Wäge däm deete mer is freie, wänn Du di frejwillig Umfrog deetsch uusfille, voreb Du uf „[[#leave|{{int:optin-submit-out}}]]“ klicksch.',
	'optin-survey-question-likedislike' => 'Was het dir an Beta gfalle? Was het dir an Beta nit gfalle?',
	'optin-survey-question-whyoptout' => 'Wurum verlosch Du des Beta? (bitte alles uuswehle, was zuetrifft)',
	'optin-survey-answer-whyoptout-hard' => 'D Verwändig isch z schwirig gsi.',
	'optin-survey-answer-whyoptout-didntwork' => 'Si het nit rächt funktioniert.',
	'optin-survey-answer-whyoptout-notpredictable' => 'S het nit eso funktioniert, wie s gheisse het.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Mir het s nit gfalle, wie s uussiht.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Mir gfalle di neje Tabs un s Layout nit.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Mir gfallt s nej Wärchzygchäschtli nit.',
	'optin-survey-answer-whyoptout-other' => 'Andere Grund:',
	'optin-survey-question-explain' => 'Bit erklär Dyyni Antwort dobe oder fier si e weng uus:',
	'optin-survey-question-techfail' => 'Hesch du tächnischi Fähler feschtgstellt, wu du Beta brucht hesch?',
	'optin-survey-question-techfail-ifyes' => 'Wänn jo, bitte uusfiere oder erkläre:',
	'optin-survey-question-usedtoolbar' => 'Hesch Du s nej uusklappbar Wärchzygchäschtli brucht go ne Syte  bearbeite?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Wänn jo, was gfallt dir draa? Was het Dir nit draa gfalle?',
	'optin-survey-question-usedtoolbar-ifno' => 'Wänn imfall nit, wurum? Machsch des in Zuechumpft? Bitte erklär s.',
	'optin-survey-question-different' => 'Was hätte mit chenne anderscht mache, ass du unser Beta wyter bruucht hättsch?',
	'optin-survey-question-feedback' => 'Gib is bitte e Ruckmäldig:',
	'optin-survey-question-browser' => 'Wele Browser bruchsch Du?',
	'optin-survey-answer-browser-other' => 'Àndere Browser:',
	'optin-survey-question-os' => 'Wel Betribssyschtem bruchsch Du?',
	'optin-survey-answer-os-other' => 'Anders Betribssyschtem:',
	'optin-survey-question-res' => 'Was fir e Uflesig het Dyy Bildschirm?',
	'optin-survey-question-changes' => 'Weli Änderige wottsch gärn säh bi Beta in Zuechumpft (wehl bitte alli uus, wu s zuetrifft)?',
	'optin-survey-answer-changes-nav' => 'D Gsamtnavigation vu dr Site eifacher mache.',
	'optin-survey-answer-changes-edittools' => 'Bearbeitigswärchzyyg erwytere un verbessere.',
	'optin-survey-answer-changes-upload' => 'Inhalt un s Uffelade vu Medie verbessere.',
	'optin-survey-answer-changes-richtext' => 'Bearbeitigswärchzyyg entwickle, wu ähnlig sin wie d Rich-Text-Editore.',
	'optin-survey-answer-changes-lookfeel' => 'Erschynigsbild vu dr Site aktualisiere.',
	'optin-survey-answer-changes-predictability' => 'Vorhärsähbarkeit vu dr Leischtig verbessere.',
	'optin-survey-answer-changes-custom' => 'Greßeri Benutzeraapassige erlaube.',
	'optin-survey-answer-changes-other' => 'Anderi:',
	'optin-improvements' => '== Was isch verbesseret wore? ==
[[File:UsabilityNavigation.png|left|link=]]
;Verbessereti Navigation
Di nej Navigation macht s eifacher z säh, wu du grad bisch un was du machsch un au wu Du chasch ane goh un wie du dert ane chunnsch. S Suechfäld isch jetz im obere rächte Ecke un eso hscnäller z finde un eifacher z bruche.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Verbesserige am Wärchzygchäschtli

Fortgschritteni Benutzer chenne s Wärchzygchäschtli uusklappe go speziälleri Wärchzyg uuswehle.
Hilfe (Spickzettel) sin in s Wärchzygchäschtli dryygsetzt wore.
D Grafike vum Wärchzygchäschtli sin nej designed wore mit Hilf vu Tango- un Gnome-Grafike.
Neji un verbessereti Grafike mache s klarer, was du chasch mache mit dr einzelne Wärchzyg. Uusklappbari Abschnitt verringere s Durenander, di wenig bruchte Wärchzyg sin aber nume ei Klick ewäg.
D Hilf-Sektion stellt e schnölle zuegang z Verfiegig zuen ere Quälle vu gängige Aawändige vu Wiki-Zueschläg 
<div style="clear:both;"></div>

== Wie chan i mitmache? ==
Go meh iber s Projäkt erfahre oder sälber mitmache, git s im [http://usability.wikimedia.org Wiki vu dr Benutzerfrejdligkeitsinitiative] meh Informatione, zem Byspel iber unseri Spänd, Forschig, Design un Entwicklig un au iber neji Versione. Fir Froge oder allgmeini Ruckmäldige stoht d [http://usability.wikimedia.org/wiki/Talk:Prototype Diskussionssyte vum Prototyp] z Verfiegig. Fir speziälli Theme het s di derzuegherige Diskussionssyte. Wänn Du Fähler („Bugs“) findsch, gib bitte unter http://usability.wikimedia.org/wiki/Talk:Releases/Acai e Hiiwys druf oder mäld d Fähler iber [https://bugzilla.wikimedia.org Bugzilla].

Dankschen vilmol, mir freien is uf Dyy Ruckmäldig!',
);

/** Hebrew (עברית)
 * @author Rotem Liss
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'optin' => 'הרשמה ליוזמת השימושיות',
	'optin-desc' => 'אפשרות למשתמשים להירשם כדי לקבל את שיפורי השימושיות של יוזמת השימושיות',
	'optin-title-optedout' => 'הרשמה לגרסת הבטא',
	'optin-title-optedin' => 'עזיבת גרסת הבטא',
	'optin-title-justoptedin' => 'ברוכים הבאים לגרסת הבטא',
	'optin-title-justoptedout' => 'תודה לכם על שניסיתם את גרסת הבטא',
	'optin-title-feedback' => 'משוב על גרסת הבטא',
	'optin-needlogin' => 'עליכם [$1 להיכנס לחשבון] כדי להירשם לקבלת שיפורי השימושיות של יוזמת השימושיות.',
	'optin-intro' => 'יוזמת השימושיות של ויקיפדיה פיתחה עיצוב חדש וסרגל עריכה חדש כדי לשפר את השימושיות של ויקיפדיה. שיפורים אלה טרם הופעלו לכל המשתמשים, אבל באפשרותכם להירשם אליהם באמצעות לחיצה על הכפתור "{{int:optin-submit-in}}" שלהלן.',
	'optin-feedback-intro' => "תודה לכם על שניסיתם את גרסת הבטא.
נשמח לדעת מה אתם חושבים על הממשק החדש שלנו, לכן נעריך זאת אם תמלאו את השאלון (האופציונלי) שלהלן.",
	'optin-feedback-back' => 'אם אינכם רוצים למלא את השאלון, באפשרותכם לחזור ל$1.',
	'optin-success-in' => 'נרשמתם בהצלחה לקבלת שיפורי השימושיות של יוזמת השימושיות.
באפשרותכם לבטל את הרשמתכם בכל זמן באמצעות לחיצה על הכפתור "{{int:optin-submit-out}}" שלהלן.',
	'optin-leave-cancel' => 'אם תרצו להמשיך להשתמש בגרסת הבטא, באפשרותכם לחזור ל$1.',
	'optin-success-out' => 'ביטלתם בהצלחה את הרשמתכם לקבלת שיפורי השימושיות של יוזמת השימושיות.
באפשרותכם להירשם שוב בכל זמן באמצעות לחיצה על הכפתור "{{int:optin-submit-out}}" שלהלן.',
	'optin-success-feedback' => 'תודה על המשוב!',
	'optin-accept-short' => 'בואו נעשה את זה!',
	'optin-accept-long' => 'נסו את גרסת הבטא',
	'optin-accept-long-anon' => 'היכנסו לחשבון ונסו את גרסת הבטא',
	'optin-deny-short' => 'לא תודה',
	'optin-deny-long' => 'חזרה לדף הקודם',
	'optin-submit-out' => 'עזיבת גרסת הבטא',
	'optin-submit-feedback' => 'מתן משוב',
	'optin-survey-yes' => 'כן',
	'optin-survey-no' => 'לא',
	'optin-survey-intro' => 'תודה לכם על שאתם מנסים את שיפורי השימושיות של יוזמת השימושיות.
באפשרותכם לבטל את הרשמתכם באמצעות לחיצה על הכפתור "{{int:optin-submit-out}}" בתחתית הדף.

נרצה לדעת מה אתם חושבים על הממשק החדש, לכן נעריך זאת אם תמלאו את הסקר האופציונלי שלהלן לפני לחיצה על הכפתור "{{int:optin-submit-out}}".',
	'optin-survey-question-likedislike' => 'מה אהבתם בגרסת הבטא? מה לא אהבתם בגרסת הבטא?',
	'optin-survey-question-whyoptout' => 'למה אתם מבטלים את הרשמתכם לממשק זה?',
	'optin-survey-answer-whyoptout-hard' => 'הוא היה קשה מדי לשימוש.',
	'optin-survey-answer-whyoptout-didntwork' => 'הוא לא פעל כפי שצריך.',
	'optin-survey-answer-whyoptout-notpredictable' => 'האתר פעל באופן בלתי צפוי.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'לא אהבתי את איך שהוא נראה.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'לא אהבתי את הפריסה והלשוניות החדשים.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'לא אהבתי את סרגל הכלים החדש.',
	'optin-survey-answer-whyoptout-other' => 'סיבה אחרת:',
	'optin-survey-question-explain' => 'אנא הסבירו או פרטו את תשובתכם לעיל:',
	'optin-survey-question-techfail' => 'האם אירעו תקלות טכניות כלשהן בעת השימוש בגרסת הבטא?',
	'optin-survey-question-techfail-ifyes' => 'אם כן, אנא פרטו או הסבירו:',
	'optin-survey-question-usedtoolbar' => 'האם השתמשתם בסרגל הכלים החדש המתרחב החדש כדי לערוך דף?',
	'optin-survey-question-usedtoolbar-ifyes' => 'אם כן, מה אהבתם לגביו? מה לא אהבתם לגביו?',
	'optin-survey-question-usedtoolbar-ifno' => 'אם לא, למה לא? האם תשתמשו בו בעתיד? אנא הסבירו.',
	'optin-survey-question-different' => 'מה יכולנו לעשות אחרת כדי שתמשיכו להשתמש בגרסת הבטא?',
	'optin-survey-question-feedback' => 'אנא כתבו לנו את כל ההערות האחרות, התהיות או המחשבות שיש לכם בשבילנו - כל משוב הוא שימושי:',
	'optin-survey-question-browser' => 'באיזה דפדפן אתם משתמשים?',
	'optin-survey-answer-browser-other' => 'דפדפן אחר:',
	'optin-survey-question-os' => 'באיזו מערכת הפעלה אתם משתמשים?',
	'optin-survey-answer-os-other' => 'מערכת הפעלה אחרת:',
	'optin-survey-question-res' => 'מהי רזולוציית המסך שלכם?',
	'optin-survey-question-changes' => 'אילו שינויים תרצו לראות בגרסת הבטא בעתיד (אנא בחרו את כל האפשרויות המתאימות)?',
	'optin-survey-answer-changes-nav' => 'הפיכת הניווט הכולל באתר לקל יותר לשימוש.',
	'optin-survey-answer-changes-edittools' => 'הרחבת ושיפור כלי העריכה.',
	'optin-survey-answer-changes-upload' => 'שיפור התוכן והעלאות המדיה.',
	'optin-survey-answer-changes-richtext' => 'פיתוח כלי עריכה הדומים לעורכי טקסט עשיר.',
	'optin-survey-answer-changes-lookfeel' => 'עדכון "המראה והתחושה" של האתר.',
	'optin-survey-answer-changes-predictability' => 'שיפור אפשרויות החיזוי של הביצועים.',
	'optin-survey-answer-changes-custom' => 'הוספת אפשרויות רבות יותר להתאמה אישית.',
	'optin-survey-answer-changes-other' => 'אחר:',
	'optin-improvements' => "== מה השתפר? ==
[[File:UsabilityNavigation.png|left|link=]]
;ניווט משופר
מערכת הניווט החדשה מקלה עליכם לראות איפה אתם ומה אתם עושים, וגם לאן אתם יכולים להגיע ואיך לעשות זאת. כאשר תיבת החיפוש ממוקמת בפינה השמאלית העליונה, קל יותר למצוא את אפשרות החיפוש והשימוש בה מהיר יותר.
<div style=\"clear:both;\"></div>

[[File:UsabilityToolbar.png|left|link=]]
;שיפורים בסרגל העריכה
סמלים חדשים ומשופרים מבהירים את הפעולה שמבצע כל כלי עריכה. חלקים מתרחבים מקטינים את הבלגן אך מאפשרים לשמור את הכלים שמשתמשים בהם פחות במרחק לחיצה אחת בלבד.
חלק העזרה מאפשר גישה מהירה לתיעוד רוב השימושים הנפוצים של תחביר ויקי.
<div style=\"clear:both;\"></div>
== איך להצטרף ==
כדי ללמוד עוד על המיזם או כדי להצטרף אליו, אנא בקרו ב[http://usability.wikimedia.org אתר הוויקי של יוזמת השימושיות]. שם תוכלו למצוא את כל המידע על המענק, המחקר, העיצוב והפיתוח, ושחרורי הגרסאות שלנו. כדי לשאול שאלות או להשאיר משוב כללי, אנא השתמשו ב[http://usability.wikimedia.org/wiki/Talk:Prototype דף השיחה על אב הטיפוס] שלנו. כדי לדון בנושאים מסוימים, אנא השתמשו בדפי השיחה המתאימים. אם אתם מוצאים באגים, אנא השאירו את הערותיכם ב[http://usability.wikimedia.org/wiki/Talk:Releases/Acai דף השיחה של הגרסה Acai] או ב[https://bugzilla.wikimedia.org באגזילה].

תודה, ואנחנו מקווים לשמוע מכם!",
);

/** Hindi (हिन्दी)
 * @author आलोक
 */
$messages['hi'] = array(
	'optin-accept-short' => 'चलो करते हैं!',
	'optin-deny-short' => 'नहीं, शुक्रिया',
	'optin-survey-yes' => 'हाँ',
	'optin-survey-no' => 'नहीं',
	'optin-survey-question-browser' => 'आप कौन से विचरक का इस्तेमाल करते हैं?',
	'optin-survey-answer-browser-other' => 'अन्य विचरक।',
	'optin-survey-question-os' => 'आपक कौन सी प्रचालन प्रणाली का इस्तेमाल करते हैं?',
	'optin-survey-answer-os-other' => 'अन्य प्रचालन प्रणाली:',
);

/** Croatian (Hrvatski)
 * @author Suradnik13
 */
$messages['hr'] = array(
	'optin' => 'Izbor Inicijative za uporabljivost',
	'optin-desc' => 'Omogućavam suradnicima isprobavanje Beta, najnovijeg poboljšanja upotrebljivosti Inicijative za uporabljivost.',
	'optin-title-optedout' => 'Isprobajte Beta',
	'optin-title-optedin' => 'Izađite iz Beta',
	'optin-title-justoptedin' => 'Dobrodošli na Beta',
	'optin-title-justoptedout' => 'Hvala što ste isprobali našu Beta',
	'optin-title-feedback' => 'Beta komentari',
	'optin-needlogin' => 'Morate se [$1 prijaviti] kako biste isprobali Beta.',
	'optin-intro' => 'Inicijativa za uporabljivost Wikipedije puno je radila na poboljšanju uporabljivosti Wikipedije. Želite li isprobati našu Beta?',
	'optin-feedback-intro' => 'Hvala što ste isprobali Beta. Željeli bismo znati što mislite o našem novom sučelju, stoga bismo cijenili ukoliko biste ispunili našu neobvezatnu anketu koja se nalazi u nastavku.',
	'optin-feedback-back' => 'Ukoliko ne želite ispuniti anketu, možete se vratiti na $1.',
	'optin-success-in' => 'Sada isprobavate Beta. U bilo kojem trenutku možete se odlučiti vratiti nazad klikom na poveznicu "{{int:optin-leave}}" koja se nalazi na vrhu zaslona.',
	'optin-leave-cancel' => 'Ako želite nastaviti koristiti Beta, možete se vratiti na $1.',
	'optin-success-out' => 'Uspješno ste izašli iz Beta. 
Možete je u svakom trenutku ponovno isprobati klikom na poveznicu "{{int:optin-try}} u gornjem desnom dijelu zaslona.',
	'optin-success-feedback' => 'Hvala Vam na Vašem komentaru!',
	'optin-accept-short' => 'Idemo isprobati!',
	'optin-accept-long' => 'Isprobajte Beta',
	'optin-accept-long-anon' => 'Prijavite se i isprobajte Beta',
	'optin-deny-short' => 'Ne hvala',
	'optin-deny-long' => 'Povratak na prethodnu stranicu',
	'optin-submit-out' => 'Izađite iz Beta',
	'optin-submit-feedback' => 'Ostavite komentare',
	'optin-survey-yes' => 'Da',
	'optin-survey-no' => 'Ne',
	'optin-survey-intro' => 'Hvala što ste isprobali Beta.
Željeli bismo znati što mislite o našem novom sučelju, stoga bismo cijenili ukoliko biste ispunili našu neobvezatnu anketu koja se nalazi u nastavku prije nego kliknete na "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Što Vam se svidjelo na Beta? Što Vam se nije svidjelo na Beta?',
	'optin-survey-question-whyoptout' => 'Zašto napuštate Beta? (molimo označite sve što se može primijeniti.)',
	'optin-survey-answer-whyoptout-hard' => 'Bilo je preteško za uporabu.',
	'optin-survey-answer-whyoptout-didntwork' => 'Nije ispravno radilo.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Nije radilo kako je predviđeno.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Ne sviđa mi se kako izgleda.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Nije mi se svidio novi izgled i kartice.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Nije mi se svidjela nova alatna traka.',
	'optin-survey-answer-whyoptout-other' => 'Drugi razlog:',
	'optin-survey-question-explain' => 'Molim objasnite ili pojasnite Vaš odgovor iznad:',
	'optin-survey-question-techfail' => 'Jeste li primjetili tehničke probleme dok ste rabili Beta?',
	'optin-survey-question-techfail-ifyes' => 'Ako da, molimo objasnite ili pojasnite:',
	'optin-survey-question-usedtoolbar' => 'Jeste li koristiti novu proširivu alatnu traku za uređivanje stranice?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Ako da, što Vam se svidjelo? Što Vam se nije svidjelo?',
	'optin-survey-question-usedtoolbar-ifno' => 'Ako ne, zašto ne? Hoćete li u budućnosti? Molimo objasnite.',
	'optin-survey-question-different' => 'Što možemo učiniti drugačije da nastavite rabiti Beta?',
	'optin-survey-question-feedback' => 'Molimo Vas da nas izvjestite o bilo kojim drugim komentarima, mišljenjima i gledištima - sve povratne informacije su korisne!:',
	'optin-survey-question-browser' => 'Koji preglednik rabite?',
	'optin-survey-answer-browser-other' => 'Drugi preglednik:',
	'optin-survey-question-os' => 'Koji operativni sustav rabite?',
	'optin-survey-answer-os-other' => 'Drugi operativni sustav:',
	'optin-survey-question-res' => 'Koja je rezolucija Vašeg zaslona?',
	'optin-survey-question-changes' => 'Koje promjene biste željeli vidjeti u Beta u budućnosti (odaberi sve što se može primijeniti)?',
	'optin-survey-answer-changes-nav' => 'Cjelokupnu navigaciju stranice učiniti jednostavnijom za uporabu.',
	'optin-survey-answer-changes-edittools' => 'Povećati i poboljšati alatnu traku.',
	'optin-survey-answer-changes-upload' => 'Poboljšati postavljanje sadržaja i medija.',
	'optin-survey-answer-changes-richtext' => 'Razviti alatnu traku sličnu naprednijim uređivačima teksta.',
	'optin-survey-answer-changes-lookfeel' => 'Ažurirati "vidi i osjeti" stranice.',
	'optin-survey-answer-changes-predictability' => 'Poboljšati predvidljivost izvedbe.',
	'optin-survey-answer-changes-custom' => 'Omogućiti suradniku veću mogućnost prilagođavanja.',
	'optin-survey-answer-changes-other' => 'Ostalo:',
	'optin-improvements' => '== Što je poboljšano? ==
[[File:UsabilityNavigation.png|left|link=]]
;Poboljšana navigacija
Novi navigacijski sustav omogućava Vam da lakše pratite gdje se nalazite i što radite, te gdje možete ići i kako doći do tamo. S okvirom za pretraživanje u gornjem desnom uglu, tražilica postaje pristupačnija za korištenje.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Unapređenja alatne trake
Nove i unaprijeđene ikonice jasnije ukazuju na to koju radnju vrši svaki alat. Proširivi odjeljci smanjuju nepreglednost, skrivajući manje korištene alate.
Odjeljak pomoći pruža brz pristup napomenama za opću uporabu wiki sintakse.
<div style="clear:both;"></div>
== Kako se uključiti==
Kako biste saznali više o projektu ili se uključili, molimo posjetite [http://usability.wikimedia.org wiki Inicijative za uporabljivost]. Tamo ćete pronaći više informacija o našim potporama, istraživanjima, dizajnu + razvoju, te izdanjima. Za postavljanje pitanja ili ostavljanje općih povratnih informacija, molimo rabite našu [http://usability.wikimedia.org/wiki/Talk:Prototype stranicu za razgovor o prototipovima].  Za komentar o posebnoj temi, molimo rabite stranicu za razgovor iste.  Ukoliko ste pronašli greške (\'\'bug\'\'), molimo ostavite svoje komentare na [http://usability.wikimedia.org/wiki/Talk:Releases/Acai stranici za razgovor o Acai izdanju] ili na [https://bugzilla.wikimedia.org Bugzilli].

Hvala Vam i nadamo se Vašim povratnim informacijama!',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'optin' => 'Iniciatiwa wužiwajomnosće wuzwolenje',
	'optin-desc' => 'Zmóžnja wužiwarjam Betu wupruwować, najnowše polěpšenja wužiwajomnosće iniciatiwy wužiwajomnosće.',
	'optin-title-optedout' => 'Betu wupruwować',
	'optin-title-optedin' => 'Betu wopušćić',
	'optin-title-justoptedin' => 'Witaj do Bety',
	'optin-title-justoptedout' => 'Dźakujemy so, zo sy Betu wupruwował',
	'optin-title-feedback' => 'Powěsć dać',
	'optin-needlogin' => 'Dyrbiš so [$1 přizjewić], zo by Betu wupruwował',
	'optin-intro' => 'Iniciatiwa wužiwajomnosće Wikipedije intensiwnje na polěpšenju wužiwajomnosće Wikipedije dźěła. By rady Betu wupruwował?',
	'optin-feedback-intro' => 'Dźakujemy so za wupruwowanje Bety.
Bychmy rady wědźeli, što mysliš wo našim nowym wužiwarskim powjerchu, bychmy so wjeselili, jeli by opcionelny naprašnik deleka wupjelnił.',
	'optin-feedback-back' => 'Jeli nochceš formular wupjelnić, móžeš so k slědowacej stronje wróćić: $1.',
	'optin-success-in' => 'Wupruwuješ nětko Betu. Móžeš ju kóždy čas přez kliknjenje na wotkaz "{{int:optin-leave}}" horjeka na wobrazowce wopušćić.',
	'optin-leave-cancel' => 'Jeli rady chceš Betu dale wužiwać, móžeš so k slědowacej stronje wróćić: $1.',
	'optin-success-out' => 'Sy Betu wuspěšnje wopušćił. Móžeš ju kóždy čas přez kliknjenje na wotkaz "{{int:optin-try}}" horjeka naprawo na wobrazowce wupruwować.',
	'optin-success-feedback' => 'Dźakujemy so za twoju powěsć!',
	'optin-accept-short' => 'Nětk pak skoku!',
	'optin-accept-long' => 'Betu wupruwować',
	'optin-accept-long-anon' => 'Přizjewić so a Betu wupruwować',
	'optin-deny-short' => 'Ně, dźakujemy so',
	'optin-deny-long' => 'wróćo k předchadnej stronje',
	'optin-submit-out' => 'Betu wopušćić',
	'optin-submit-feedback' => 'Powěsć dać',
	'optin-survey-yes' => 'Haj',
	'optin-survey-no' => 'Ně',
	'optin-survey-intro' => 'Dźakujemy so za wupruwowanje Bety.

Bychmy rady wědźeli, što mysliš wo našim nowym wužiwarskim powjerchu, bychmy so wjeselili, jeli by opcionelny naprašnik deleka wupjelnił, prjedy hač kliknješ na  "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Što so ći na Beće lubi? Što so ći na Beće njelubi?',
	'optin-survey-question-whyoptout' => 'Čehodla wopušćeš tutu betu? (prošu wubjer wšo prawe)',
	'optin-survey-answer-whyoptout-hard' => 'Wužiwanje je překomplikowane.',
	'optin-survey-answer-whyoptout-didntwork' => 'To njeje porjadnje fungowało.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Njefunguje na předwidźomne wašnje.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Napohlad njeje so mi spodobał.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Njespodobaja so mi nowe rajtarki a wuhotowanje.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Nowa gratowa lajsta njeje so mi njespodobała.',
	'optin-survey-answer-whyoptout-other' => 'Druha přičina:',
	'optin-survey-question-explain' => 'Prošu wujasń abo wudźěłaj swoju hornju wotmołwu:',
	'optin-survey-question-techfail' => 'Sy při wupruwowanju Bety na techniske zmylki {{GENDER:User|storčił|storčiła|storčił}}?',
	'optin-survey-question-techfail-ifyes' => 'Jeli haj, prošu wudźěłaj abo wujasń:',
	'optin-survey-question-usedtoolbar' => 'Sy nowu rozfałdujomnu gratowu lajstu za wobdźěłowanje stronow wupruwował?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Jeli haj, što so ći na tym spodoba? Što so ći na tym njespodoba?',
	'optin-survey-question-usedtoolbar-ifno' => 'Jeli nic, čehodla nic? Budźeš to w přichodźe činić? Prošu wujasń to.',
	'optin-survey-question-different' => 'Što móžemy hišće hinak činić, zo by Betu dale wužiwał?',
	'optin-survey-question-feedback' => 'Zdźěl nam prošu swoje měnjenja:',
	'optin-survey-question-browser' => 'Kotry wobhladowak wužiwaš?',
	'optin-survey-answer-browser-other' => 'Druhi wobhladowak:',
	'optin-survey-question-os' => 'Kotry dźěłowy system wužiwaš?',
	'optin-survey-answer-os-other' => 'Druhi dźěłowy system:',
	'optin-survey-question-res' => 'Kotre je rozeznaće twojeje wobrazowki?',
	'optin-survey-question-changes' => 'Kotre změny by rady w Beće w přichodźe widźał (prošu wubjer wšě, kotrež trjecha)?',
	'optin-survey-answer-changes-nav' => 'Cyłkownu nawigaciju sydła zjednorić.',
	'optin-survey-answer-changes-edittools' => 'Wobdźěłowanske nastroje rozšěrić a polěpšić.',
	'optin-survey-answer-changes-upload' => 'Wobsah a nahraća medijow polěpšić.',
	'optin-survey-answer-changes-richtext' => 'Wobdźěłowanske nastroje podobne tym editorow rich-teksta wuwić.',
	'optin-survey-answer-changes-lookfeel' => 'Zwonkowny napohlad sydła zaktualizować',
	'optin-survey-answer-changes-predictability' => 'Předwidźomnosć wukona polěpšić.',
	'optin-survey-answer-changes-custom' => 'Wjace wužiwarskich přiměrjenjow dowolić',
	'optin-survey-answer-changes-other' => 'Druhe:',
	'optin-improvements' => '== Što je so polěpšiło? ==
[[File:UsabilityNavigation.png|left|link=]]
;Polěpšena nawigacija
Nowy nawigaciski system wolóžuje widźeć, hdźež sy a štož činiš a tež, hdźež móžeš hić a kak so dóstanješ. Z pytanskim polom horjeka naprawo, hodźi so pytanska funkcija lóšo namakać a spěšnišo wužiwać.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Polěpšenja wobdźěłanskeje lajsty
Nowe a polěpšene symbole lěpje znazornjuja, kotru akciju kóždy nastroj čini. Rozfałdujomne wotrězki šmjatańcu redukuja, mjeztym zo su zrědka wužiwane nastroje jenož jedne kliknjenje zdalene.
Wotrězk pomocy skići spěšny přistup na referencu za powšitkowne wužiwanje wikijoweje syntaksy.
<div style="clear:both;"></div>
== Kak móžeš so wobdźělić? ==
Zo by wjace wo projekće zhonił, abo wo tym, kak móžeš so wobdźělić, wopytaj prošu [http://usability.wikimedia.org wiki iniciatiwy wužiwajomnosće]. Tam namakaš informacije wo našej koncesiji, slědźenju, designu + wuwiću a nowych wersijach. Za prašenja abo powšitkowne powěsćach, wužij prošu [http://usability.wikimedia.org/wiki/Talk:Prototype diskusijnu stronu prototypa]. Zo by wosebite temy wobjednał, wužij prošu zwjazane diskusijne strony. Jeli programowe zmylki namakaš, zawostaj prošu swoje komentary na [http://usability.wikimedia.org/wiki/Talk:Releases/Acai diskusijnej stronje wersije Acai] abo wužij [https://bugzilla.wikimedia.org Bugzilla].

Dźakujemy so a bychmy so wjeselili wot tebje słyšeć!',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Glanthor Reviol
 * @author Hunyadym
 */
$messages['hu'] = array(
	'optin-title-optedout' => 'A béta kipróbálása',
	'optin-title-optedin' => 'Kilépés a bétából',
	'optin-title-justoptedin' => 'Üdvözlünk a bétában',
	'optin-title-justoptedout' => 'Köszönjük, hogy kipróbáltad a bétát',
	'optin-title-feedback' => 'Visszajelzés a bétáról',
	'optin-needlogin' => 'A béta kipróbálásához [$1 be kell jelentkezned].',
	'optin-intro' => 'A Wikipedia Usability Initiative keményen dolgozott azon, hogy javítsa a Wikipédia használhatóságát.
Szeretnéd kipróbálni a bétánkat?',
	'optin-feedback-intro' => 'Köszönjük, hogy kipróbáltad a bétát.
Szeretnénk tudni, hogy mit gondolsz az új felületről, így örülnénk neki, ha kitöltenéd az alábbi kérdőívet.',
	'optin-feedback-back' => 'Ha nem szeretnéd kitölteni a kérdőívet, visszatérhetsz a(z) $1 lapra.',
	'optin-leave-cancel' => 'Ha továbbra is szeretnéd használni a bétát, akkor visszatérhetsz a(z) $1 lapra.',
	'optin-accept-short' => 'Kipróbálom!',
	'optin-accept-long' => 'A béta kipróbálása',
	'optin-accept-long-anon' => 'Jelentkezz be, és próbáld ki a bétát',
	'optin-deny-short' => 'Köszönöm, nem',
	'optin-deny-long' => 'Visszatérés az előző lapra',
	'optin-submit-out' => 'A bétateszt befejezése',
	'optin-submit-feedback' => 'Visszajelzés küldése',
	'optin-survey-yes' => 'Igen',
	'optin-survey-no' => 'Nem',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Nem tetszik, ahogy kinéz.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Nem tetszenek az új fülek és az elrendezés.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Nem tetszik az új szerkesztő-eszköztár.',
	'optin-survey-answer-whyoptout-other' => 'Más indok:',
	'optin-survey-answer-browser-other' => 'Más böngésző:',
	'optin-survey-answer-changes-upload' => 'Tartalom és médiafájlok feltöltésének fejlesztése.',
	'optin-survey-answer-changes-other' => 'Más:',
	'optin-improvements' => '== Mit fejlesztettünk? ==
[[File:UsabilityNavigation.png|left|link=]]
;Fejlettebb navigáció
Az új navigációs rendszer könnyebbé teszi, hogy lásd, hol vagy és mit csinálsz éppen, továbbá azt is, hogy hová mehetsz tovább, és hogy hogyan juthatsz el oda. A keresőmező jobb felső sarokba való áthelyezésével könnyebbé válik a keresés.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Kibővített szerkesztőeszköztár
Az új ikonok sokkal jobban reprezentálják, hogy melyik gomb mire való. A kinyitható részek elrejtik a ritkábban használt eszközöket, átláthatóbbá téve az eszköztárat, miközben továbbra is egyetlen kattintásra elérhetőek.
A Segítség részben a wiki-jelölőnyelv leggyakrabban használt elemeinek leírását találhatod meg.
<div style="clear:both;"></div>
== Hogyan vehetsz részt? ==
Ha többet szeretnél tudni a projektről, vagy be szeretnél kapcsolódni, látogasd meg a [http://usability.wikimedia.org Usability Initiative wikiét].  Itt információkat találsz az indulásunkról, kutatásról, tervezésről és fejlesztéstől, valamint a kiadásainkról.  Kérdéseidet vagy visszajelzéseidet a [http://usability.wikimedia.org/wiki/Talk:Prototype prototípus megbeszélési lapján] várjuk.  Konkrét probléma orvosolásához keresd fel a megfelelő vitalapot.  Ha hibával találkoznál, hagyj üzenetet az [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai kiadás vitalapján] vagy a [https://bugzilla.wikimedia.org Bugzillán].

Köszönjük, és várjuk a visszajelzésedet!',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'optin' => 'Activation del Initiativa de Usabilitate',
	'optin-desc' => 'Permitte al usatores de probar Beta, le ultime meliorationes del Initiativa de Usabilitate.',
	'optin-title-optedout' => 'Probar Beta',
	'optin-title-optedin' => 'Quitar Beta',
	'optin-title-justoptedin' => 'Benvenite a Beta',
	'optin-title-justoptedout' => 'Gratias pro probar Beta',
	'optin-title-feedback' => 'Da nos tu opinion',
	'optin-needlogin' => 'Tu debe [$1 aperir un session] pro probar Beta',
	'optin-intro' => 'Le Initiativa de Usabilitate de Wikipedia ha laborate duro pro augmentar le usabilitate de Wikipedia.
Vole tu probar Beta?',
	'optin-feedback-intro' => 'Gratias pro essayar Beta.
Nos vole saper lo que tu pensa de nostre nove interfacie, dunque nos appreciarea si tu completa le questionario optional ci infra.',
	'optin-feedback-back' => 'Si tu non vole completar le questionario, tu pote retornar a $1.',
	'optin-success-in' => 'Tu ha ora comenciate a probar Beta.
Tu pote disactivar lo a omne tempore con le ligamine "{{int:optin-leave}}" in alto a derecta del schermo.',
	'optin-leave-cancel' => 'Si tu vole continuar a usar Beta, tu pote retornar a $1',
	'optin-success-out' => 'Tu ha con successo quitate Beta.
Tu pote reactivar lo a omne tempore con le ligamine "{{int:optin-try}}" in alto a derecta del schermo.',
	'optin-success-feedback' => 'Gratias pro dar nos tu opinion!',
	'optin-accept-short' => 'In avante!',
	'optin-accept-long' => 'Probar Beta',
	'optin-accept-long-anon' => 'Aperir session e essayar Beta',
	'optin-deny-short' => 'No, gratias',
	'optin-deny-long' => 'retornar al previe pagina',
	'optin-submit-out' => 'Quitar Beta',
	'optin-submit-feedback' => 'Dar opinion',
	'optin-survey-yes' => 'Si',
	'optin-survey-no' => 'No',
	'optin-survey-intro' => 'Gratias pro essayar Beta.
Nos volerea saper lo que tu pensa super nostre nove interfacie, e nos appreciarea si tu completa le sequente questionario optional ante de cliccar super "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Que te placeva in Beta? Que non te placeva in Beta?',
	'optin-survey-question-whyoptout' => 'Proque quita tu iste Beta? (per favor selige tote le optiones applicabile)',
	'optin-survey-answer-whyoptout-hard' => 'Esseva troppo difficile de usar.',
	'optin-survey-answer-whyoptout-didntwork' => 'Non functionava correctemente.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Non functionava de modo previsibile.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Non me placeva le aspecto.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Non me placeva le nove schedas e disposition.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Non me placeva le nove barra de instrumentos.',
	'optin-survey-answer-whyoptout-other' => 'Altere motivo:',
	'optin-survey-question-explain' => 'Per favor explica o elabora tu responsa de ci supra:',
	'optin-survey-question-techfail' => 'Experimentava tu alcun fallimentos technic durante le uso de Beta?',
	'optin-survey-question-techfail-ifyes' => 'In caso de si, per favor elabora o explica:',
	'optin-survey-question-usedtoolbar' => 'Usava tu le nove instrumentario expansibile pro modificar un pagina?',
	'optin-survey-question-usedtoolbar-ifyes' => 'In caso de si, que te placeva in illo? Que non te placeva?',
	'optin-survey-question-usedtoolbar-ifno' => 'Si non, proque non? Lo usara tu in le futuro? Per favor explica.',
	'optin-survey-question-different' => 'Que poteva nos haber facite alteremente a fin que tu continuarea a usar nostre Beta?',
	'optin-survey-question-feedback' => 'Da nos tu reaction:',
	'optin-survey-question-browser' => 'Qual navigator usa tu?',
	'optin-survey-answer-browser-other' => 'Altere navigator:',
	'optin-survey-question-os' => 'Qual systema de operation usa tu?',
	'optin-survey-answer-os-other' => 'Altere systema de operation:',
	'optin-survey-question-res' => 'Qual es le resolution de tu schermo?',
	'optin-survey-question-changes' => 'Que cambios vole tu vider in le Beta in le futuro (selige tote le optiones applicabile)?',
	'optin-survey-answer-changes-nav' => 'Rende le navigation general del sito plus facile a usar.',
	'optin-survey-answer-changes-edittools' => 'Augmenta e meliora le instrumentos de modification.',
	'optin-survey-answer-changes-upload' => 'Meliora le cargamento de contento e multimedia.',
	'optin-survey-answer-changes-richtext' => 'Disveloppar instrumentos de modification similar al editores de texto inricchite.',
	'optin-survey-answer-changes-lookfeel' => 'Renova le apparentia general del sito.',
	'optin-survey-answer-changes-predictability' => 'Meliorar le previsibilitate del prestationes.',
	'optin-survey-answer-changes-custom' => 'Permitter un personalisation plus ample al usator.',
	'optin-survey-answer-changes-other' => 'Altere:',
	'optin-improvements' => '== Que ha essite meliorate? ==
[[File:UsabilityNavigation.png|left|link=]]
;Navigation plus efficace
Le nove systema de navigation rende plus facile vider ubi tu es e lo que tu face, e tamben a ubi tu pote ir e como arrivar. Con le quadro de recerca situate in alto a derecta, le facilitate de recerca es plus facile de trovar e plus rapide de usar.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Meliorationes del instrumentario de modification
Le icones nove e melior clarifica le action que cata instrumento exeque. Le sectiones expansibile simplifica le apparentia, durante que le instrumentos usate infrequentemente resta disponibile a solo un clic de distantia.
Le section de adjuta provide accesso rapide a un referentia pro usos commun del marcation wiki.
<div style="clear:both;"></div>
== Como participar ==
Pro ulterior informationes super le projecto o pro participar, per favor visita le [http://usability.wikimedia.org wiki del Initiativa de Usabilitate]. Ibi tu trovara informationes super nostre subvention, recerca, conception + disveloppamento, e edition de versiones. Pro poner questiones o lassar commentarios general, per favor usa nostre [http://usability.wikimedia.org/wiki/Talk:Prototype pagina de discussion super le prototypo]. Pro discuter subjectos particular, per favor usa le paginas de discussion dedicate a istes. Si tu trova defectos, lassa tu commentos in le [http://usability.wikimedia.org/wiki/Talk:Releases/Acai pagina de discussion super editiones de Acai] o invia los a [https://bugzilla.wikimedia.org Bugzilla].

Gratias e nos spera audir de te!',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 * @author Irwangatot
 * @author Rex
 */
$messages['id'] = array(
	'optin' => 'Bergabung dengan Proyek Inisiatif Kebergunaan',
	'optin-desc' => 'Memungkinkan pengguna untuk bergabung dengan peningkatan kebergunaan dalam Proyek Inisiatif Kebergunaan versi Beta.',
	'optin-title-optedout' => 'Coba Beta',
	'optin-title-optedin' => 'Tinggalkan Beta',
	'optin-title-justoptedin' => 'Selamat datang di Beta',
	'optin-title-justoptedout' => 'Terima kasih telah mencoba Beta',
	'optin-title-feedback' => 'Umpan balik Beta',
	'optin-needlogin' => 'Anda harus [$1 masuk log] untuk mencoba Beta.',
	'optin-intro' => 'Proyek Inisiatif Kebergunaan Wikipedia berusaha untuk mengembangkan kegunaan dari Wikipedia. Apakah Anda ingin mencoba Beta?',
	'optin-feedback-intro' => 'Terima kasih telah mencoba Beta.
Kami ingin tahu apa pendapat Anda tentang antarmuka baru kami, sehingga kami sangat menghargai jika Anda mengisi survei opsional di bawah ini .',
	'optin-feedback-back' => 'Jika Anda tidak ingin mengisi survei, Anda dapat kembali ke $1.',
	'optin-success-in' => 'Anda saat ini sedang mencoba Beta.
Anda dapat keluar kapan saja dengan menekan pranala "{{int:optin-submit-out}}" di bagian atas halaman.',
	'optin-leave-cancel' => 'Jika Anda ingin terus menggunakan Beta, Anda dapat kembali ke $1.',
	'optin-success-out' => 'Anda telah berhasil meninggalkan Beta.
Anda dapat bergabung kembali kapan saja dengan menekan pranala "{{int:optin-submit-in}}" di bagian atas halaman.',
	'optin-success-feedback' => 'Terima kasih atas umpan balik Anda!',
	'optin-accept-short' => 'Ayo lakukan!',
	'optin-accept-long' => 'Coba Beta',
	'optin-accept-long-anon' => 'Masuk log dan coba Beta',
	'optin-deny-short' => 'Tidak, terima kasih',
	'optin-deny-long' => 'Kembali ke halaman sebelum',
	'optin-submit-out' => 'Tinggalkan Beta',
	'optin-submit-feedback' => 'Berikan umpan balik',
	'optin-survey-yes' => 'Ya',
	'optin-survey-no' => 'Tidak',
	'optin-survey-intro' => 'Terima kasih telah mencoba Beta.
Kami ingin mengetahui bagaimana pendapat Anda mengenai antarmuka baru kami, karenanya kami akan sangat menghargai jika Anda mengisi survei di bawah ini sebelum mengklik "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Apa yang Anda sukai tentang Beta? Apa yang Anda tidak sukai tentang Beta?',
	'optin-survey-question-whyoptout' => 'Mengapa Anda ingin meninggalkan Beta? (Pilihlah semua yang Anda anggap benar.)',
	'optin-survey-answer-whyoptout-hard' => 'Terlalu sulit untuk digunakan.',
	'optin-survey-answer-whyoptout-didntwork' => 'Tidak berfungsi dengan baik.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Tidak dapat diprediksi.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Saya tidak suka dengan penampilannya.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Saya tidak suka dengan tab baru dan tampilannya.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Aku tidak suka dengan kotak peralatan baru.',
	'optin-survey-answer-whyoptout-other' => 'Alasan lain:',
	'optin-survey-question-explain' => 'Harap menjelaskan atau menguraikan jawaban Anda di atas:',
	'optin-survey-question-techfail' => 'Pernahkah anda mengalami kesalahan teknis ketika menggunakan Beta?',
	'optin-survey-question-techfail-ifyes' => 'Jika iya, silahkan uraikan atau jabarkan:',
	'optin-survey-question-usedtoolbar' => 'Apakah anda menggunakan kotak peralatan baru yang dapat diperluas untuk menyunting halaman?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Jika iya, apa yang kamu sukai? Apa yang Anda tidak sukai?',
	'optin-survey-question-usedtoolbar-ifno' => 'Jika tidak, mengapa tidak? Apakah akan anda lakukan kemudian? Tolong jelaskan.',
	'optin-survey-question-different' => 'Apa yang bisa kita lakukan dengan cara yang berbeda untuk menjaga Anda menggunakan Beta?',
	'optin-survey-question-feedback' => 'Beritahukan kami tanggapan Anda:',
	'optin-survey-question-browser' => 'Penjelajah web apa yang Anda gunakan?',
	'optin-survey-answer-browser-other' => 'Penjelajah web lainnya:',
	'optin-survey-question-os' => 'Sistem operasi apa yang Anda gunakan?',
	'optin-survey-answer-os-other' => 'Sistem operasi lain:',
	'optin-survey-question-res' => 'Berapa besar resolusi layar Anda?',
	'optin-survey-question-changes' => 'Perubahan apa yang ingin Anda lihat dalam Beta di masa mendatang (silakan pilih yang sesuai)?',
	'optin-survey-answer-changes-nav' => 'Membuat navigasi keseluruhan situs lebih mudah digunakan.',
	'optin-survey-answer-changes-edittools' => 'Menambah dan memperbanyak alat penyuntingan.',
	'optin-survey-answer-changes-upload' => 'Meningkatkan pemuatan konten dan media.',
	'optin-survey-answer-changes-richtext' => 'Mengembangkan perangkat penyuntingan mirip dengan penyuntingan teks biasa.',
	'optin-survey-answer-changes-lookfeel' => 'Memperbarui "tampilan dan nuansa" dari situs.',
	'optin-survey-answer-changes-predictability' => 'Meningkatkan prediktabilitas dari kinerja.',
	'optin-survey-answer-changes-custom' => 'Memperbolehkan Pengguna yang lebih tinggi untuk kustomisasi',
	'optin-survey-answer-changes-other' => 'Lain-lain:',
	'optin-improvements' => '== Apa yang telah dikembangkan? ==
[[File:UsabilityNavigation.png|left|link=]]
;Perluasan navigasi
Sistem navigasi yang baru membuat lebih mudah untuk melihat di mana Anda dan apa yang Anda lakukan, semudah anda dapat pergi dan bagaimana menuju ke sana. Dengan kotak pencarian yang terletak di pojok kanan atas, fitur pencarian mudah ditemukan dan cepat digunakan.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Perbaikan alat penyuntingan
Baru-dan-perbaikan ikon membuatnya lebih jelas tindakan apa yang dilakukan masing-masing alat. Bagian yang dapat diperluas mengurangi kekacauan sehingga alat yang jarang digunakan hanya dengan sekali klik.
Bagian yang membantu memberikan akses cepat ke referensi untuk penggunaan umum markup-wiki .
<div style="clear:both;"></div>
== Bagaimana terlibat ==
Untuk mempelajari lebih lanjut tentang proyek atau terlibat, silakan kunjungi [http://usability.wikimedia.org Usability Initiative\'s wiki]. Di sana Anda akan menemukan informasi tentang hibah, penelitian, desain + pengembangan, dan rilis. Untuk mengajukan pertanyaan atau meninggalkan umpan balik umum, silakan gunakan [http://usability.wikimedia.org/wiki/Talk:Prototype prototipe halaman pembicaraan]. Untuk mengatasi mata pelajaran tertentu, silakan gunakan halaman diskusi yang terkait. Jika anda menemukan bug, silakan tinggalkan komentar Anda pada [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai rilis halaman pembicaraan] atau dengan menggunakan [https://bugzilla.wikimedia.org Bugzilla].

Terima kasih dan kami berharap pendapat Anda!',
);

/** Ido (Ido)
 * @author Malafaya
 */
$messages['io'] = array(
	'optin-try' => 'Probez Beta',
	'optin-survey-yes' => 'Yes',
	'optin-survey-no' => 'No',
);

/** Italian (Italiano)
 * @author Darth Kule
 * @author Melos
 * @author Nemo bis
 * @author Stefano-c
 */
$messages['it'] = array(
	'optin' => 'Adesione al progetto usabilità',
	'optin-desc' => 'Consente agli utenti di provare la beta, gli ultimi miglioramenti del progetto usabilità.',
	'optin-title-optedout' => 'Prova la Beta',
	'optin-title-optedin' => 'Lascia Beta',
	'optin-title-justoptedin' => 'Benvenuto in Beta',
	'optin-title-justoptedout' => 'Grazie per aver provato Beta',
	'optin-title-feedback' => 'Feedback della Beta',
	'optin-needlogin' => "È necessario [$1 effettuare l'accesso] per provare Beta",
	'optin-intro' => "Il progetto usabilità di Wikipedia sta lavorando intensamente per migliorare l'usabilità di Wikipedia.
Vuoi provare la nostra beta?",
	'optin-feedback-intro' => 'Ti ringraziamo per aver provato la Beta.
Vorremmo sapere cosa ne pensi della nostra nuova interfaccia, quindi apprezzeremmo se compilassi il sondaggio facoltativo qui sotto.',
	'optin-feedback-back' => 'Se non si desidera compilare il sondaggio, si può tornare a $1.',
	'optin-success-in' => 'Ora stai provando la Beta.
Puoi uscirne in qualsiasi momento facendo clic sul link "{{int:optin-leave}}" nella parte superiore dello schermo.',
	'optin-leave-cancel' => 'Se si desidera continuare a usare Beta è possibile tornare a $1',
	'optin-success-out' => 'Beta è stato lasciato con successo.
È possibile provarlo nuovamente in qualsiasi momento facendo clic sul collegamento "{{int:optin-try}}" in alto a destra dello schermo.',
	'optin-success-feedback' => 'Grazie per il tuo feedback!',
	'optin-accept-short' => 'Prova!',
	'optin-accept-long' => 'Prova la Beta',
	'optin-accept-long-anon' => 'Accedi e prova la Beta',
	'optin-deny-short' => 'No grazie',
	'optin-deny-long' => 'Torna alla pagina precedente',
	'optin-submit-out' => 'Lascia Beta',
	'optin-submit-feedback' => 'Lascia un feedback',
	'optin-survey-yes' => 'Sì',
	'optin-survey-no' => 'No',
	'optin-survey-intro' => 'Ti ringraziamo per aver provato il Beta.
Vorremmo sapere cosa ne pensi della nostra nuova interfaccia, quindi apprezzeremmo se compilassi il sondaggio facoltativo qui sotto prima di fare clic su "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Cosa ti è piaciuto della Beta? Cosa non ti è piaciuto della Beta?',
	'optin-survey-question-whyoptout' => 'Perché stai lasciando la Beta? (Si prega di selezionare tutte le risposte pertinenti.)',
	'optin-survey-answer-whyoptout-hard' => 'Era troppo difficile da usare.',
	'optin-survey-answer-whyoptout-didntwork' => 'Non funzionava correttamente.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Non si comportava in modo coerente.',
	'optin-survey-answer-whyoptout-didntlike-look' => "Non mi piaceva l'aspetto.",
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Non mi piacevano le nuove schede e il layout.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Non mi piaceva la nuova barra degli strumenti.',
	'optin-survey-answer-whyoptout-other' => 'Altra motivazione:',
	'optin-survey-question-explain' => 'Spiega o approfondisci la tua risposta di cui sopra:',
	'optin-survey-question-techfail' => 'Si sono verificati problemi tecnici usando Beta?',
	'optin-survey-question-techfail-ifyes' => 'In caso affermativo, si prega di elaborare o spiegare:',
	'optin-survey-question-usedtoolbar' => 'Hai usato la nuova barra degli strumenti espandibile per modificare una pagina?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Se sì, cosa ti è piaciuto? Cosa non ti è piaciuto?',
	'optin-survey-question-usedtoolbar-ifno' => 'Se no, perché no? Potresti usarla in futuro? Si prega di spiegare.',
	'optin-survey-question-different' => 'Che cosa avremmo potuto fare diversamente per farti continuare a usare la Beta?',
	'optin-survey-question-feedback' => 'Facci conoscere altre osservazioni, preoccupazioni o pensieri che hai per noi - tutti i feedback sono utili:',
	'optin-survey-question-browser' => 'Quale browser usi?',
	'optin-survey-answer-browser-other' => 'Altri browser:',
	'optin-survey-question-os' => 'Quale sistema operativo usi?',
	'optin-survey-answer-os-other' => 'Altro sistema operativo:',
	'optin-survey-question-res' => 'Qual è la risoluzione dello schermo?',
	'optin-survey-question-changes' => 'Quali cambiamenti vorresti vedere in Beta in futuro (selezionare tutte le risposte pertinenti)?',
	'optin-survey-answer-changes-nav' => 'Rendere la navigazione del sito più semplice da usare.',
	'optin-survey-answer-changes-edittools' => 'Aumentare e migliorare gli strumenti di modifica.',
	'optin-survey-answer-changes-upload' => 'Migliorare il caricamento di contenuti e di multimedia.',
	'optin-survey-answer-changes-richtext' => 'Sviluppare strumenti di modifica simili a un editor rich-text.',
	'optin-survey-answer-changes-lookfeel' => "Aggiornare l'aspetto del sito.",
	'optin-survey-answer-changes-predictability' => 'Migliorare la prevedibilità delle prestazioni.',
	'optin-survey-answer-changes-custom' => "Consentire una maggiore personalizzazione all'utente.",
	'optin-survey-answer-changes-other' => 'Altro:',
	'optin-improvements' => '== Cosa è stato migliorato? ==
[[File:UsabilityNavigation.png|left|link=]]
;Navigazione potenziata
Il nuovo sistema di navigazione rende più semplice vedere dove ti trovi e cosa stai facendo, oltre a dove puoi andare e come puoi arrivarci. Con il box di ricerca situato nell\'angolo in alto a destra, la funzione di ricerca è più facile per trovare e più veloce da usare.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Miglioramenti della barra degli strumenti
Le icone nuove e migliorate rendono più chiare le azioni che ciascuno strumento esegue. Le sezioni espandibili riducono l\'ingombro mantenendo gli strumenti usati di rado a un clic di distanza. La sezione di aiuto fornisce un rapido accesso a un riferimento per gli usi comuni della sintassi wiki.
<div style="clear:both;"></div>
== Come aiutare ==
Per saperne di più sul progetto o aiutare, visita il [http://usability.wikimedia.org sito del progetto usabilità]. Lì potrai trovare informazioni sulla nostra sovvenzione, ricerca, progettazione e sviluppo e nuove versioni. Per porre domande o lasciare un commento generale, usa la nostra [http://usability.wikimedia.org/wiki/Talk:Prototype pagina di discussione sui prototipi]. Per discutere di specifici argomenti, usa le pagine di discussione relative. Se trovi degli errori, lascia un commento nella [http://usability.wikimedia.org/wiki/Talk:Releases/Acai pagina di discussione delle versioni di Acai] o usa [https://bugzilla.wikimedia.org Bugzilla].

Grazie; non vediamo l\'ora di sentirti.',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fryed-peach
 * @author Hosiryuhosi
 * @author Whym
 * @author 青子守歌
 */
$messages['ja'] = array(
	'optin' => 'ユーザビリティー改善への参加',
	'optin-desc' => 'ユーザビリティ改善プロジェクトによる最新のユーザビリティー改善案のベータ版の試用を可能にする',
	'optin-title-optedout' => 'ベータ版を試す',
	'optin-title-optedin' => 'ベータ版をやめる',
	'optin-title-justoptedin' => 'ベータ版にようこそ',
	'optin-title-justoptedout' => 'ベータ版をお試しいただきありがとうございます',
	'optin-title-feedback' => 'フィードバックしてください',
	'optin-needlogin' => 'ベータ版を試すには[$1 ログイン]する必要があります。',
	'optin-intro' => 'ウィキペディア・ユーザビリティ改善プロジェクトでは、ウィキペディアの使いやすさを改善するために活動しています。ベータ版を試してみませんか？',
	'optin-feedback-intro' => 'ベータ版をお試しいただきありがとうございます。よろしければこの新しいインタフェースについてご意見をお聞かせください。以下の任意調査にご協力いただければ幸いです。',
	'optin-feedback-back' => '調査表への記入を望まない場合は、$1 へお戻りください。',
	'optin-success-in' => 'ベータ版を試用しています。ページ上部の「{{int:optin-leave}}」のリンクをクリックすると、いつでも試用をやめることができます。',
	'optin-leave-cancel' => 'ベータ版の試用を続ける場合、$1に戻ることができます。',
	'optin-success-out' => 'ベータ版を停止しました。ページ上部の「{{int:optin-try}}」のリンクをクリックすると、いつでもまた試用することができます。',
	'optin-success-feedback' => 'フィードバックをご送信いただきありがとうございます！',
	'optin-accept-short' => 'はじめましょう！',
	'optin-accept-long' => 'ベータ版を試す',
	'optin-accept-long-anon' => 'ログインしてベータ版を試す',
	'optin-deny-short' => 'いりません',
	'optin-deny-long' => '前のページに戻る',
	'optin-submit-out' => 'ベータ版をやめる',
	'optin-submit-feedback' => 'フィードバックを送信',
	'optin-survey-yes' => 'はい',
	'optin-survey-no' => 'いいえ',
	'optin-survey-intro' => 'ベータ版をお試しいただきありがとうございます。よろしければこの新しいインタフェースについてご意見をお聞かせください。 [[#leave|{{int:optin-submit-out}}]]をクリックする前に以下の任意調査にご協力いただければ幸いです。',
	'optin-survey-question-likedislike' => 'ベータ版のどのような点が気に入りましたか。どのような点が気に入りませんでしたか。',
	'optin-survey-question-whyoptout' => 'なぜベータ版の試用をおやめになるのですか(あてはまるものをすべてお選びください)。',
	'optin-survey-answer-whyoptout-hard' => '使いこなせませんでした。',
	'optin-survey-answer-whyoptout-didntwork' => '正常に機能しませんでした。',
	'optin-survey-answer-whyoptout-notpredictable' => '動作が不安定、予測不能でした。',
	'optin-survey-answer-whyoptout-didntlike-look' => '見た目が好きではありませんでした。',
	'optin-survey-answer-whyoptout-didntlike-layout' => '新しいタブやレイアウトが好きではありませんでした。',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => '新しいツールバーが好きではありませんでした。',
	'optin-survey-answer-whyoptout-other' => 'その他の理由:',
	'optin-survey-question-explain' => '上で選んだ答えについて詳しく説明してください。',
	'optin-survey-question-techfail' => 'ベータ版の使用中に技術的なトラブルがありましたか。',
	'optin-survey-question-techfail-ifyes' => 'もしそうならば、詳しく説明してください。',
	'optin-survey-question-usedtoolbar' => '表示・非表示を切り替えられる新しいページ編集用ツールバーを使ってみましたか？',
	'optin-survey-question-usedtoolbar-ifyes' => 'もしそうならば、どこが気に入りましたか？あるいは気に入りませんでしたか？',
	'optin-survey-question-usedtoolbar-ifno' => 'いいえの場合、それはなぜですか？将来的には利用する予定がありますか？詳しくお答えください。',
	'optin-survey-question-different' => 'どのような点を改善すれば、このベータを引き続きお使いいただけたでしょうか。',
	'optin-survey-question-feedback' => 'その他のご意見、ご要望、気になる点などをぜひお知らせください。どのようなご意見も貴重です:',
	'optin-survey-question-browser' => '利用しているブラウザはどれですか？',
	'optin-survey-answer-browser-cb' => 'Google Chrome ベータ',
	'optin-survey-answer-browser-other' => 'その他のブラウザ:',
	'optin-survey-question-os' => '利用しているOSはどれですか？',
	'optin-survey-answer-os-other' => 'その他のオペレーティングシステム:',
	'optin-survey-question-res' => '画面の解像度はいくつですか？',
	'optin-survey-question-changes' => '今後、ベータ版にどのような点の改善を望みますか？(当てはまるものをすべて選択してください)',
	'optin-survey-answer-changes-nav' => 'サイト全体の操作方法をより使いやすくしてほしい。',
	'optin-survey-answer-changes-edittools' => '編集ツールを増やし、機能強化してほしい。',
	'optin-survey-answer-changes-upload' => 'コンテンツやメディアアップロードを改善してほしい。',
	'optin-survey-answer-changes-richtext' => 'リッチテキストエディタのような編集ツールを開発してほしい。',
	'optin-survey-answer-changes-lookfeel' => 'サイトの「見た感じ」を更新してほしい。',
	'optin-survey-answer-changes-predictability' => '動作の安定性を改善してほしい。',
	'optin-survey-answer-changes-custom' => 'より強力なカスタマイズを可能にしてほしい。',
	'optin-survey-answer-changes-other' => 'その他:',
	'optin-improvements' => '== 何が改良されたのですか？ ==
[[File:UsabilityNavigation.png|left|link=]]
;ナビゲーションの向上
新しいナビゲーションシステムでは、現在見ているページがどこか、現在行っている作業なにかがわかりやすくなりました。また、どのページにアクセスでき、どうやってそれらのページにアクセスすればよいかも分かりやすくなりました。画面右上に検索ボックスを置くことで、検索バーを見つけやすく、より素早く利用できるようになりました。
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;編集ツールバーの改良
新しく改良されたアイコンにより、各ツールの機能をより明確に表現できるようになりました。編集ツールバーの各部分について表示・非表示を切り替えられるようにすることで、ツールバーのデザインを簡潔に保ちつつ、散発的に使用される機能にもすぐアクセスできるようにしました。ツールバーにヘルプを組み込むことで、一般的なウィキ・マークアップの説明を素早く参照できるようにしました。
<div style="clear:both;"></div>
== 参加するには ==
このプロジェクトについてより詳しいことが知りたい、あるいは参加したい場合は、[http://usability.wikimedia.org Usability Initiative のウィキ]を訪れてみてください。我々の助成、研究、設計・開発、およびリリースについての情報が得られます。質問をしたり全般的なフィードバックを伝えたい場合は、[http://usability.wikimedia.org/wiki/Talk:Prototype プロトタイプ議論ページ]を使ってください。特定の問題を解決したい場合は、該当する議論ページを使ってください。バグを発見した場合は、[http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai リリース議論ページ]か [https://bugzilla.wikimedia.org Bugzilla]を使ってコメントを伝えてください。

あなたからの意見を楽しみに待っています。',
);

/** Georgian (ქართული)
 * @author Alsandro
 * @author გიორგიმელა
 */
$messages['ka'] = array(
	'optin' => 'გამოყენებადობის ინიციატივაში მონაწილეობა',
	'optin-desc' => 'მომხმარებლებისთვის ბეტას, გამოყენებადობის ინიციატივის ჯგუფის შემუშავებული ინტერფეისის, გამოცდის უფლება.',
	'optin-title-optedout' => 'გამოსცადეთ ბეტა',
	'optin-title-optedin' => 'ბეტადან გასვლა',
	'optin-title-justoptedin' => 'მოგესალმებით ბეტაში',
	'optin-title-justoptedout' => 'გმადლობთ ბეტას გამოცდისთვის',
	'optin-title-feedback' => 'გამოხმაურება',
	'optin-needlogin' => 'ბეტას მოსასინჯად უნდა [$1 დარეგისტრირდეთ].',
	'optin-intro' => 'ვიკიპედიის გამოყენებადობის საინიციატივო ჯგუფმა დიდი შრომა გასწია ვიკიპედიის გამოყენებადობის გასაუმჯობესებლად.
ხომ არ გსურთ მოსინჯოთ ჩვენი ბეტა?',
	'optin-feedback-intro' => 'გმადლობთ ბეტას მოსინჯვისთვის.
ჩვენ გვსურს გავიგოთ, თუ რას ფიქრობთ თქვენ ჩვენს ახალ ინტერფეისზე და მადლიერი დაგრჩებოდით, თუ შეავსებდით ქვემოთ მოყვანილ კითხვარს.',
	'optin-feedback-back' => 'თუ არ გსურთ კითხვარის შევსება, შეგიძლიათ დაბრუნდეთ $1-ზე.',
	'optin-success-in' => 'თქვენ ამჟამად ბეტას სცდით.
შეგიძიათ გახვიდეთ ნებისმიერ დროს ეკრანის მარჯვენა ზედა კუთხეში  "{{int:optin-leave}}" ბმულზე დაწკაპუნებით.',
	'optin-leave-cancel' => 'თუ გსურთ გააგრძელოთ ბეტას გამოყენება, შეგიძლიათ დაბრუნდეთ  $1-ზე.',
	'optin-success-out' => 'თქვენ წარმატებით გახვედით ბეტადან.
თქვენ კვლავ შეგიძლიათ მისი მოსინჯვა ნებისმიერ დროს ეკრანის ზედა მარჯვენა კუთხეში "{{int:optin-try}}" ბმულზე დაწკაპუნებით.',
	'optin-success-feedback' => 'გმადლობთ გამოხმაურებისთვის!',
	'optin-accept-short' => 'თანახმა ვარ!',
	'optin-accept-long' => 'მოსინჯეთ ბეტა',
	'optin-accept-long-anon' => 'დარეგისტრირდით და მოსინჯეთ ბეტა',
	'optin-deny-short' => 'არა, გმადლობთ',
	'optin-deny-long' => 'წინა გვერდზე დაბრუნება',
	'optin-submit-out' => 'ბეტადან გასვლა',
	'optin-submit-feedback' => 'გამოგვეხმაურეთ',
	'optin-survey-yes' => 'ჰო',
	'optin-survey-no' => 'არა',
	'optin-survey-intro' => 'გმადლობთ ბეტას გამოცდისთვის.
ჩვენ გვსურს გავიგოთ, რას ფიქრობთ ახალ ინტერფეისზე და მადლიერი ვიქნებით თუ ღილაკზე «[[#leave|{{int:optin-submit-out}}]]» დაწკაპუნებამდე შეავსებთ კითხვარს.',
	'optin-survey-question-likedislike' => 'რა მოგეწონათ ბეტაში? რა არ მოგეწონათ ბეტაში?',
	'optin-survey-question-whyoptout' => 'რატომ გადიხართ ბეტადან? (გთხოვთ მონიშნოთ ყველა შესაბამისი მიზიზი.)',
	'optin-survey-answer-whyoptout-hard' => 'ძალიან რთული იყო გამოსაყენებლად.',
	'optin-survey-answer-whyoptout-didntwork' => 'ის გაუმართავი იყო.',
	'optin-survey-answer-whyoptout-notpredictable' => 'იგი გაუთვალისწინებლად მოქმედებდა.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'არ მომწონდა მისი გარეგნობა.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'არ მომეწონა ახალი ყუები და განლაგება.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'მე არ მომეწონა რედაქტირების პანელი.',
	'optin-survey-answer-whyoptout-other' => 'სხვა მიზეზი:',
	'optin-survey-question-explain' => 'გთხოვთ დააკონკრეტოთ თქვენს მიერ ზემოთ გაცემული პასუხი:',
	'optin-survey-question-techfail' => 'ბეტას გამოყენებისას რაიმე ტექნიკური გაუმართაობა ხომ არ შეგიმჩნევიათ?',
	'optin-survey-question-techfail-ifyes' => 'თუ კი, გთხოვთ აღწეროთ ან დააკონკრეტოთ:',
	'optin-survey-question-usedtoolbar' => 'გამოიყენეთ ახალი გაშლადი ინსტრუმენტების პანელი გვერდის რედაქტირებისთვის?',
	'optin-survey-question-usedtoolbar-ifyes' => 'თუ კი, რა მოგეწონათ მასში? რა არ მოგეწონათ მასში?',
	'optin-survey-question-usedtoolbar-ifno' => 'თუ არა, მაშინ რატომ? მომავალში გამოიყენებთ? გთხოვთ განმარტოთ.',
	'optin-survey-question-different' => 'რისი გაკეთება შეგვეძლო ბეტას გამოყენება რომ გაგეგრძელებინათ?',
	'optin-survey-question-feedback' => 'გთხოვთ გაგვიზიაროთ თქვენი მოსაზრებები:',
	'optin-survey-question-browser' => 'რომელ ბრაუზერს იყენებთ?',
	'optin-survey-answer-browser-other' => 'სხვა ბრაუზერი:',
	'optin-survey-question-os' => 'რომელ ოპერაციულ სისტემას იყენებთ?',
	'optin-survey-answer-os-other' => 'სხვა ოპერაციული სისტემა:',
	'optin-survey-question-res' => 'თქვენი მონიტორის გაფართოება:',
	'optin-survey-question-changes' => 'რა ცვლილებების დანახვა გსურთ მომავალში ბეტაში (გთხოვთ მონიშნოთ ყველა შესაბამისი პასუხი)?',
	'optin-survey-answer-changes-nav' => 'საიტის ზოგადი ნავიგაციის გაადვილება.',
	'optin-survey-answer-changes-edittools' => 'გაზარდეთ და გააუმჯობესეთ რედაქტირების ინსტრუმენტები.',
	'optin-survey-answer-changes-upload' => 'გააუმჯობესეთ შიგთავსისა და მედიის ატვირთვა.',
	'optin-survey-answer-changes-richtext' => 'დაამუშავეთ რედაქტირების ხელსაწყოები რიჩ-ტექსტ რედაქტორების მსგავსად.',
	'optin-survey-answer-changes-lookfeel' => 'განაახლეთ საიტის შესახედაობა.',
	'optin-survey-answer-changes-predictability' => 'შესრულების წინასწარგანსაზღვრის გაუმჯობესება.',
	'optin-survey-answer-changes-custom' => 'კონფიგურაციის მეტი შესაძლებლობის დაშვება.',
	'optin-survey-answer-changes-other' => 'სხვა:',
	'optin-improvements' => '== რა გაუმჯობესდა? ==
[[File:UsabilityNavigation.png|left|link=]]
;გაუმჯობესებული ნავიგაცია
ახალი ნავიგაციის სისტემა საშუალებას გაძლევთ უფრო მარტივად გაერკვეთ სად ხართ და რას აკეთებთ, ასევე სად ან როგორ შეგიძლიათ გადახვიდეთ. ეკრანის მარჯვენა ზედა კუთხეში მოთავსებული საძიებო ველით ძიების ფუნქცია ადვილი მისაგნებია და მოხერხებულია.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;გაუმჯობესდა რედაქტირების პანელი
ახალი და გაუმჯობესებული ხატულები უფრო მკაფიოდ მიუთითებს ინსტრუმენტების დანიშნულებაზე. გახსნადი განყოფილებები საშუალებას იძლევა ნაკლებად გადაიტვირთოს პანელი, ხოლო ნაკლებად გამოყენებული ხელსაწყოების მიგნება მხოლოდ ერთი დაწკაპუნებით არის შესაძლებელი.
დახმარების სექცია სწრაფად მიგითითებთ ვიკი-მარკაპის გამოყენების დეტალებზე.
<div style="clear:both;"></div>
== მონაწილეობის მიღება ==
პროექტზე მეტი ინფორმაციის ან მასში მონაწილეობის მისაღებად, გთხოვთ ეწვიოთ [http://usability.wikimedia.org გამოყენებადობის ინიციატივის ვიკის].  აქ თქვენ იპოვით ინფორმაციას ჩვენს გრანტზე, კვლევაზე, დიზაინსა და დამუშავებაზე. შეკითხვებისთვის ან ზოგადი მოსაზრებებისთვის, გთხოვთ გამოიყენოთ ჩვენი [http://usability.wikimedia.org/wiki/Talk:Prototype განხილვის გვერდის პროტოტიპი].  კონკრეტული თემების განხილვისთვის, გთხოვთ გამოიყენოთ მათთან დაკავშირებული განხილვის გვერდები. თუ პროგრამაში შეცდომებს იპოვით, გთხოვთ კომენტარი დატოვოთ [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai რელიზის განხილვის გვერზე] ან [https://bugzilla.wikimedia.org ბაგზილას] გამოყენებით.

გმადლობთ და ველით თქვენს გამოხმაურებებს!',
);

/** Khmer (ភាសាខ្មែរ)
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'optin-title-optedout' => 'សាកប្រើស៊េរីបេតា',
	'optin-title-optedin' => 'ចាកចេញពីស៊េរីបេតា',
	'optin-title-justoptedin' => 'បេតាសូមសូមស្វាគមន៍',
	'optin-title-justoptedout' => 'សូមថ្លែងអំណរគុណលោកអ្នកដែលបានសាកល្បងប្រើស៊េរីបេតារបស់យើងខ្ញុំ',
	'optin-title-feedback' => 'មតិយោបល់អំពីស៊េរីបេតា',
	'optin-needlogin' => 'អ្នកត្រូវតែ[$1 ឡុកអ៊ីន]មុននឹងសាកល្បងប្រើស៊េរីបេតា។',
	'optin-intro' => 'ក្រុមការងារវីគីភីឌាកំពុងតែខំប្រឹងប្រែងធ្វើអោយវិគីភីឌាមានភាពងាយស្រួលក្នុងការប្រើប្រាស់។ តើអ្នកចង់សាកល្បងប្រើស៊េរីបេតារបស់យើងខ្ញុំទេ?',
	'optin-feedback-intro' => 'សូមថ្លែងអំណរគុណលោកអ្នកដែលបានសាកល្បងប្រើស៊េរីបេតា។ យើងខ្ញុំចង់ដឹងអំពីយោបល់លោកអ្នកស្ដីអំពីអន្តរមុខថ្មីនេះ។ ហេតុនេះយើងខ្ញុំសង្ឃឹមថាលោកអ្នកនឹងជួយឆ្លើយសំនួរអង្កេតខាងក្រោមនេះ។',
	'optin-feedback-back' => 'ប្រសិនបើលោកអ្នកមិនចង់ឆ្លើយសំនួរអង្កេតនេះទេ អ្នកអាចត្រលប់ទៅកាន់$1វិញក៏បាន។',
	'optin-success-in' => 'អ្នកកំពុងសាកល្បងប្រើស៊េរីបេតា។ អ្នកអាចចាកចេញទៅវិញពេលណាក៏បាន ដោយគ្រាន់តែចុចលើពាក្យ "{{int:optin-leave}}" នៅផ្នែកខាងលើរបស់អេក្រង់។',
	'optin-leave-cancel' => 'ប្រសិនបើអ្នកនៅចង់បន្តប្រើស៊េរីបេតា អ្នកអាចត្រលប់ទៅកាន់$1វិញក៏បាន។',
	'optin-success-out' => 'អ្នកបានចាកចេញពីបេតាដោយជោគជ័យហើត។ អ្នកអាចសាកប្រើវាម្ដងទៀតនៅពេលណាក៏ដោយ ដោយចុចលើពាក្យ "{{int:optin-try}}" នៅផ្នែកខាងលើខាងស្ដាំនៃអេក្រង់របស់អ្នក។',
	'optin-success-feedback' => 'សូមថ្លែងអំណរគុណសំរាប់មតិយោបល់របស់លោកអ្នក!',
	'optin-accept-short' => 'សាកប្រើវា!',
	'optin-accept-long' => 'សាកប្រើស៊េរីបេតា',
	'optin-accept-long-anon' => 'ឡុកអ៊ីនរួចសាកប្រើស៊េរីបេតា',
	'optin-deny-short' => 'ទេ,អរគុណ',
	'optin-deny-long' => 'ត្រលប់ទៅកាន់ទំព័រមុន',
	'optin-submit-out' => 'ចាកចេញពីស៊េរីបេតា',
	'optin-submit-feedback' => 'ដាក់ស្នើមតិយោបល់',
	'optin-survey-yes' => 'បាទ/ចាស៎',
	'optin-survey-no' => 'ទេ',
	'optin-survey-intro' => 'សូមថ្លែងអំណរគុណលោកអ្នកដែលបានសាកល្បងប្រើស៊េរីបេតា។ យើងខ្ញុំចង់ដឹងអំពីយោបល់លោកអ្នកស្ដីអំពីអន្តរមុខថ្មីនេះ។ ហេតុនេះយើងខ្ញុំសង្ឃឹមថាលោកអ្នកនឹងជួយឆ្លើយសំនួរអង្កេតខាងក្រោមនេះ មុននឹងចាកចេញទៅដោយចុចលើ"[[#leave|{{int:optin-submit-out}}]]"។',
	'optin-survey-question-likedislike' => 'តើចំនុចណាខ្លះដែលលោកអ្នកពេញចិត្តនិងមិនពេញចិត្តអំពីស៊េរីបេតានេះ? (សូមឆ្លើយជាភាសាអង់គ្លេស)',
	'optin-survey-question-whyoptout' => 'ហេតុអ្វីក៏លោកអ្នកចង់ចាកចេញពីស៊េរីបេតានេះ? (សូមជ្រើសរើសពីខាងក្រោម)',
	'optin-survey-answer-whyoptout-hard' => 'វាពិបាកប្រើពេក។',
	'optin-survey-answer-whyoptout-didntwork' => 'វាដំនើរការមិនបានល្អ។',
	'optin-survey-answer-whyoptout-notpredictable' => 'វាដំនើរការតែពិះតែពាស។',
	'optin-survey-answer-whyoptout-didntlike-look' => 'ខ្ញុំមិនចូលចិត្តការរចនារបស់វាទេ។',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'ខ្ញុំមិនចូលចិត្តស្លាកនិងប្លង់ថ្មីទេ។',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'ខ្ញុំមិនចូលចិត្តរបារឧបករណ៍ថ្មីទេ។',
	'optin-survey-answer-whyoptout-other' => 'មូលហេតុផ្សេងទៀត៖',
	'optin-survey-question-explain' => 'សូមពន្យល់រៀបរាប់ក្បោះក្បាយថែមទៀតអំពីចំលើយខាងលើរបស់លោកអ្នក៖ (សូមសរសេរជាភាសាអង់គ្លេស)',
	'optin-survey-question-techfail' => 'តើលោកអ្នកមានជួបបញ្ហាបច្ចេកទេសពេលកំពុងប្រើស៊េរីបេតានេះទេ? (សូមឆ្លើយជាភាសាអង់គ្លេស)',
	'optin-survey-question-techfail-ifyes' => 'បើមាន​​​ សូមពន្យល់រៀបរាប់៖ (សូមសរសេរជាភាសាអង់គ្លេស)',
	'optin-survey-question-usedtoolbar' => 'តើអ្នកមានបានប្រើរបារឧបករណ៍កែប្រែថ្មីនៅពេលធ្វើការកែប្រែទំព័រទេ?',
	'optin-survey-question-usedtoolbar-ifyes' => 'បើមាន តើចំនុចណាខ្លះដែលអ្នកពេញចិត្តនិងមិនពេញចិត្តអំពីវា?',
	'optin-survey-question-usedtoolbar-ifno' => 'បើទេ ហេតុអ្វី? តើអ្នកនឹងប្រើវានាពេលអនាគតទេ? សូមពន្យល់។',
	'optin-survey-question-different' => 'តើយើងខ្ញុំអាចធ្វើអ្វីផ្សេងពីនេះទៀត ដើម្បីទាក់ទាញអ្នកអោយនៅប្រើស៊េរីបេតា? (សូមឆ្លើយជាភាសាអង់គ្លេស)',
	'optin-survey-question-feedback' => 'សូមប្រាប់យើងខ្ញុំអោយដឹងពីគំនិត យោបល់ឬកង្វល់របស់អ្នកអំពីយើងខ្ញុំ។ មតិយោបល់របស់លោកអ្នកទាំងអស់មានសារសំខាន់ណាស់!៖ (សូមឆ្លើយជាភាសាអង់គ្លេស)',
	'optin-survey-question-browser' => 'តើអ្នកប្រើកម្មវិធីរាវរកប្រភេទអ្វី?',
	'optin-survey-answer-browser-other' => 'កម្មវិធីរាវរកដទៃ៖',
	'optin-survey-question-os' => 'តើអ្នកកំពុងប្រើប្រព័ន្ធប្រតិបត្តិការប្រភេទអ្វី?',
	'optin-survey-answer-os-other' => 'ប្រព័ន្ធប្រតិបត្តិការដទៃ៖',
	'optin-survey-question-res' => 'តើអេក្រង់របស់អ្នកមានភាពម៉ត់កំរិតណា?',
	'optin-survey-question-changes' => 'តើបំលាស់ប្ដូរណាខ្លះដែលអ្នកចង់ឃើញនៅក្នុងស៊េរីបេតានាពេលអនាគត (សូមជ្រើសយកពីខាងក្រោម)?',
	'optin-survey-answer-changes-nav' => 'ធ្វើអោយការចុចរាវនៅក្នុងវិបសាយទាំងមូលកាន់តែងាយស្រួល។',
	'optin-survey-answer-changes-edittools' => 'បង្កើននិងជំរុញឧបករណ៍កែប្រែអោយកាន់តែប្រសើរ។',
	'optin-survey-answer-changes-upload' => 'បង្កើតចំនួនអត្ថបទនឹងការផ្ទុកឡើងមេឌា។',
	'optin-survey-answer-changes-richtext' => 'អភិវឌ្ឍឧបករណ៍កែប្រែអោយស្រដៀងទៅនឹងឧបករណ៍កែប្រែទំរង់ rich-text ដែរ។',
	'optin-survey-answer-changes-lookfeel' => 'បន្ទាន់សម័យ"ការរចនានិងភាពទាក់ទាញ"របស់វិបសាយ។',
	'optin-survey-answer-changes-predictability' => 'បង្កើនសុក្រិតភាពនៃដំនើរការ។',
	'optin-survey-answer-changes-custom' => 'អនុញ្ញាតអោយមានការលំអតាមចិត្តអោយទូលំទូលាយទៀត។',
	'optin-survey-answer-changes-other' => 'ផ្សេងទៀត៖',
	'optin-improvements' => '== តើមានអ្វីខ្លះដែលត្រូវបានកែលំអ? ==
[[File:UsabilityNavigation.png|left|link=]]
;ប្រព័ន្ធចុចរាវកាន់តែប្រសើរ
ប្រព័ន្ធចុចរាវថ្មី​ធ្វើអោយលោកអ្នកមានភាពងាយស្រួល​ក្នុងការមើលពីកន្លែងដែលអ្នកនៅ​និងអ្វីដែលអ្នកកំពុងធ្វើ ក៏ដូចជាកន្លែងដែលអ្នកអាចទៅ​និងពីវិធីដែលអ្នកអាចចូលទៅកាន់កន្លែងនោះ។ ជាមួយនឹងប្រអប់ស្វែងរកដែលបង្ហាញនៅគែមខាងលើខាងស្ដាំ ការស្វែងរកនឹងកាន់តែមានភាពងាយស្រួលនិងលឿនជាងមុន។
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;កំនែលំអរបារឧបករណ៍កែប្រែ
កូនរូបតំណាងថ្មីៗនិងកែលំអហើយ​ធ្វើអោយលោកអ្នកកាន់តែងាយស្រួលដឹងពីមុខងាររបស់ឧបករណ៍នីមួយៗ។ ផ្នែកពង្រីកបន្ថែម​ឆ្លាស់ការបើកបិទឧបករណ៍ដែលមិនសូវប្រើដើម្បីកាត់បន្ថយភាពរញ៉េរញ៉ៃ។ ផ្នែកជំនួយ​អាចអោយលោកអ្នកចូលទៅមើល​របៀបប្រើប្រាស់របស់ឧបករណ៍នានាបានកាន់តែរហ័សជាងមុន។
<div style="clear:both;"></div>
== របៀបចូលរួម ==
ដើម្បីយល់ដឹងបន្ថែមឬចូលរួមក្នុគំរោងនេះ សូមចូលទៅកាន់[http://usability.wikimedia.org Usability Initiative\'s wiki]។ លោកអ្នកអាចរកឃើញព័ត៌មានអំពី សម្បទាន ការស្រាវជ្រាវ ការឌីហ្សាញ + ការអភិវឌ្ឍន៍ និងការចេញផ្សាយរបស់យើងខ្ញុំ។ ដើម្បីសួរសំណួរឬផ្ដល់មតិយោបល់ផ្សេងៗ សូមប្រើប្រាស់[http://usability.wikimedia.org/wiki/Talk:Prototype ទំព័រពិភាក្សាបឋម]របស់យើងខ្ញុំ។ សំរាប់សំណួរអំពីប្រធានបទពិសេសៗ សូមប្រើប្រាស់ទំព័រពិភាក្សា​ដែលទាក់ទិន។ ប្រសិនបើលោកអ្នកជួបប្រទះbug សូមដាក់វិចាររបស់អ្នកនៅ [http://usability.wikimedia.org/wiki/Talk:Releases/Acai ទំព័រពិភាក្សា Acai] ឬដោយប្រើ[https://bugzilla.wikimedia.org Bugzilla]។

យើងខ្ញុំនឹងទន្ទឹមរង់ចាំមតិយោបល់ពីលោកអ្នក។ សូមអរគុណ។',
);

/** Kannada (ಕನ್ನಡ)
 * @author Nayvik
 */
$messages['kn'] = array(
	'optin-survey-yes' => 'ಹೌದು',
	'optin-survey-no' => 'ಇಲ್ಲ',
	'optin-survey-answer-whyoptout-other' => 'ಇತರೆ ಕಾರಣ:',
	'optin-survey-answer-changes-other' => 'ಇತರ:',
);

/** Korean (한국어)
 * @author Klutzy
 * @author Kwj2772
 */
$messages['ko'] = array(
	'optin' => 'Usability Initiative 참여',
	'optin-desc' => '사용자들에게 Usability Initiative에서 만든 최신 디자인을 사용할 방법을 제공합니다.',
	'optin-title-optedout' => '베타 버전 사용하기',
	'optin-title-optedin' => '베타 버전 사용 종료',
	'optin-title-justoptedin' => '베타 버전 체험을 시작합니다',
	'optin-title-justoptedout' => '베타 버전을 사용해 주셔서 감사합니다.',
	'optin-title-feedback' => '피드백 남기기',
	'optin-needlogin' => '베타 버전을 사용하려면 [$1 로그인]을 해 주세요.',
	'optin-intro' => '위키백과에서는 사용자들의 편의성을 높이기 위해 새로운 스킨을 만들고 있습니다. 체험해 보세요!',
	'optin-feedback-intro' => '베타 버전을 사용해 주셔서 감사합니다.
아래 설문조사를 작성해 주시면 더 좋은 스킨을 만드는 데에 참고하겠습니다.',
	'optin-feedback-back' => '설문조사를 작성하지 않으려면 바로 $1 문서로 되돌아갈 수 있습니다.',
	'optin-success-in' => '베타 버전을 사용합니다. 사용을 끝내려면 오른쪽 위의 ‘{{int:optin-leave}}’를 눌러 원래 스킨으로 돌아갈 수 있습니다.',
	'optin-leave-cancel' => '베타 스킨을 계속 사용하려면 바로 $1 문서로 되돌아갈 수 있습니다.',
	'optin-success-out' => '베타 버전 사용을 종료합니다. 다시 사용하려면 오른쪽 위의 ‘{{int:optin-try}}’를 누르면 됩니다.',
	'optin-success-feedback' => '의견을 주셔서 감사합니다!',
	'optin-accept-short' => '사용하기',
	'optin-accept-long' => '베타 스킨을 사용합니다.',
	'optin-accept-long-anon' => '로그인하고 베타 스킨을 사용합니다.',
	'optin-deny-short' => '되돌아가기',
	'optin-deny-long' => '이전 문서로 되돌아갑니다.',
	'optin-submit-out' => '베타 버전 사용 종료',
	'optin-submit-feedback' => '피드백 남기기',
	'optin-survey-yes' => '예',
	'optin-survey-no' => '아니오',
	'optin-survey-intro' => '베타 버전을 사용해 주셔서 감사합니다.
아래의 ‘[[#leave|{{int:optin-submit-out}}]]를 누르기 전에, 아래에 이번 인터페이스에 대한 사용 후기를 적어주시면 스킨 개발에 더욱 도움이 됩니다.',
	'optin-survey-question-likedislike' => '어떤 부분이 마음에 들었나요? 그리고 어떤 부분이 마음에 들지 않았나요?',
	'optin-survey-question-whyoptout' => '베타 버전을 그만 사용하려는 이유는 무엇인가요? (해당하는 곳에 모두 선택해주세요)',
	'optin-survey-answer-whyoptout-hard' => '사용하기에 너무 어렵다',
	'optin-survey-answer-whyoptout-didntwork' => '기능이 제대로 동작하지 않는다',
	'optin-survey-answer-whyoptout-notpredictable' => '예상했던 동작과 다르게 돌아간다',
	'optin-survey-answer-whyoptout-didntlike-look' => '전체적으로 스킨이 적응되지 않는다',
	'optin-survey-answer-whyoptout-didntlike-layout' => '레이아웃이 마음에 들지 않는다',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => '툴바가 마음에 들지 않는다',
	'optin-survey-answer-whyoptout-other' => '다른 이유:',
	'optin-survey-question-explain' => '위에서 선택한 이유에 대해 좀 더 자세히 설명해주세요.',
	'optin-survey-question-techfail' => '베타 스킨을 사용하면서 기술적인 문제를 겪었나요?',
	'optin-survey-question-techfail-ifyes' => '해당 사항에 대해 자세하게 설명해주세요.',
	'optin-survey-question-usedtoolbar' => '새로운 툴바 기능을 써 보셨나요?',
	'optin-survey-question-usedtoolbar-ifyes' => '툴바에서 어떤 부분이 마음에 들었나요? 어떤 부분이 마음에 들지 않았나요?',
	'optin-survey-question-usedtoolbar-ifno' => '툴바를 쓰지 않은 이유는 무엇인가요?',
	'optin-survey-question-different' => '베타 스킨을 계속 쓰려면 무엇이 더 개선되어야 할까요?',
	'optin-survey-question-feedback' => '기타 제안할 것이 있다면 자유롭게 써 주세요.',
	'optin-survey-question-browser' => '어떤 웹 브라우저를 사용하고 있나요?',
	'optin-survey-answer-browser-other' => '다른 브라우저:',
	'optin-survey-question-os' => '어떤 운영 체제(OS)를 사용하고 있나요?',
	'optin-survey-answer-os-other' => '다른 운영 체제:',
	'optin-survey-question-res' => '어느 정도의 모니터 해상도를 사용하고 있나요?',
	'optin-survey-question-changes' => '베타 스킨이 앞으로 어떻게 바뀌었으면 좋겠나요? (해당 항목에 모두 선택해주세요)',
	'optin-survey-answer-changes-nav' => '사이트 내부를 이동하기 편하게 만들어주세요.',
	'optin-survey-answer-changes-edittools' => '편집 도구를 더 편리하게 만들어주세요.',
	'optin-survey-answer-changes-upload' => '글이나 파일 자료를 더 쉽게 올릴 수 있도록 만들어주세요.',
	'optin-survey-answer-changes-richtext' => '편집 도구를 워드 프로세서처럼 편리하게 만들어 주세요.',
	'optin-survey-answer-changes-lookfeel' => '스킨의 외관을 더 깔끔하게 고쳐 주세요.',
	'optin-survey-answer-changes-predictability' => '도구를 사용할 때 그 의미를 예상하기 쉽게 만들어주세요.',
	'optin-survey-answer-changes-custom' => '더 많은 부분을 사용자가 설정할 수 있도록 해 주세요.',
	'optin-survey-answer-changes-other' => '기타:',
	'optin-improvements' => '== 어떤 부분이 향상되었나요? ==
[[File:UsabilityNavigation.png|left|link=]]
;디자인 구성이 바뀌었습니다
새로운 디자인을 통해 현재 어떤 문서를 보고 있는지, 어떤 동작을 하고 있는지, 어떤 문서를 어떻게 갈 수 있는지 등을 파악하기가 쉬워졌습니다. 또한, 검색 상자를 오른쪽 위로 옮겨 더욱 사용하기 편리해졌습니다.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;편집 툴바가 더 편리해졌습니다
툴바 버튼이 더 직관적인 모습으로 바뀌었습니다. 자주 쓰지 않는 기능은 숨겨 두어 더 사용하기 쉬워졌고, 숨겨진 기능은 클릭 한 번으로 꺼낼 수 있습니다.
또한 위키 문법을 사용하기 쉽도록 도움말 링크를 추가했습니다.
<div style="clear:both;"></div>
== 참여하기 ==

위키미디어 사용성 향상 프로젝트에 참여하려면 [http://usability.wikimedia.org 프로젝트 위키](영어)에 방문해주세요. 프로젝트에서 만든 연구 결과, 디자인, 개발 제품 등을 볼 수 있습니다. 일반적인 질문이나 조언이 있다면 [http://usability.wikimedia.org/wiki/Talk:Prototype 스킨 토론란](영어)를 이용해주시면 됩니다. 특정 주제에 대해서는 해당 토론란을 이용해주세요.
버그를 발견했다면  [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai 토론란](영어)나 [https://bugzilla.wikimedia.org Bugzilla](영어)에 해당 사실을 알려주시면 됩니다.',
);

/** Ripoarisch (Ripoarisch)
 * @author Melancholie
 * @author Purodha
 */
$messages['ksh'] = array(
	'optin' => 'Op de <i lang="en">Usability Initiative</i> ier Verschöönerunge jon.',
	'optin-desc' => 'Määt et müjjelesch för de Metmaacher, <i lang="en">Beta</i>, de <i lang="en">Usability Initiative</i> ier neuste Verschöönerunge ußzeprobeere.',
	'optin-title-optedout' => '<i lang="en">Beta</i> ußprobeere',
	'optin-title-optedin' => '<i lang="en">Beta</i> verlohße',
	'optin-title-justoptedin' => 'Wellkumme bei <i lang="en">Beta</i>',
	'optin-title-justoptedout' => 'Merßi, datt De <i lang="en">Beta</i> ußprobeere deihß.',
	'optin-title-feedback' => 'Röckmäldunge',
	'optin-needlogin' => 'Do mööts alld [$1 enjelogg senn], öm <i lang="en">Beta</i> för Desch enschallde ze künne.',
	'optin-intro' => 'De <i lang="en">Usability Initiative</i> vun de Wikipedia hät kräftesch jet draan jeärbeit, öm de Wikipedia besser zom Bedeene ze maache för de Metmaacher.
Wells De <i lang="en">Beta</i> ußprobeere?',
	'optin-feedback-intro' => 'Merci för et Ußprobeere.
Mer wolle jähn weße, wat De vun uns Beta häls,
un mer sin Der dangkbaa, wann De op di Froore heh
e paa Antwoote jävve dääts. Et koß nix, un verflich zoh nix.',
	'optin-feedback-back' => 'Wann De nix ußfölle wells, kanns De och noh $1 zerök jonn.',
	'optin-success-in' => 'Do bes jäz de <i lang="en">Beta</i> am ußprobeere.
Do kanns doh emmer wider eruß kumme, endämm dat De op „{{int:optin-leave}}“ klecks.',
	'optin-leave-cancel' => 'Wann De <i lang="en">Beta</i> wigger bruche wells, kanns De noh  $1 retuur jonn.',
	'optin-success-out' => 'Do häß <i lang="en">Beta</i> verlohße.
Do kanns emmer wider zerök kumme, endämm dat De op „{{int:optin-try}}“ klecks.',
	'optin-success-feedback' => 'Häzlijje Dangk för Ding Rökmäldung.',
	'optin-accept-short' => 'Lom_mer dat donn!',
	'optin-accept-long' => 'Beta ußprobeere',
	'optin-accept-long-anon' => 'Enlogge un de Beta ußprobeere',
	'optin-deny-short' => 'Nää, dat wulle mer nit',
	'optin-deny-long' => 'retuur op de vörijje Sigg',
	'optin-submit-out' => '<i lang="en">Beta</i> verlohße',
	'optin-submit-feedback' => 'Rökmäldunge jävve',
	'optin-survey-yes' => 'Joh',
	'optin-survey-no' => 'Nää',
	'optin-survey-intro' => 'Mer bedangke uns doför, dat De <i lang="en">Beta</i> ußprobeere deihß.

Mer dääte jähn weße wat De övver uns neu Ovverflääsch meins. Dröm dääte mer uns freue, wann De unge op e paa kleine Froore antwoote dääts, ih dat De op „[[#leave|{{int:optin-submit-out}}]]“ klecks.',
	'optin-survey-question-likedislike' => 'Wat hät Der aam <i lang="en">Beta</i> jefalle?
Wat hät Der aam <i lang="en">Beta</i> nit jefalle?',
	'optin-survey-question-whyoptout' => 'Woröm deihß De <i lang="en">Beta</i> nit (mieh) bruche? (Beß esu joot, un jif alles aan, wat för Desch shtemme deiht)',
	'optin-survey-answer-whyoptout-hard' => 'Et woh mer ze schwiiresch met ömzejonn.',
	'optin-survey-answer-whyoptout-didntwork' => 'Et hät nit öhndlesch jeflup, wi et sullt.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Wat eruß kütt, kam_mer förheer nit weßße.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Wi dat ußsooch, hät mer nit jevalle.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Mer jefeele di neue Knöppe nit, un och nit wi dä Beldscherrem opjedeijlt wohr.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Mer jefeel de neue Reih met Wärkzüsch nit.',
	'optin-survey-answer-whyoptout-other' => 'Ene andere Jrond:',
	'optin-survey-question-explain' => 'Bes esu joot, un donn Ding Antwoot vun heh drövver e beßje ußföhlescher expleziere:',
	'optin-survey-question-techfail' => 'Haß De beim Ußprobeere Fähler en de Täschnek jehat?',
	'optin-survey-question-techfail-ifyes' => 'Wann Joh, donn dat jenou opschriive udder expleziere:',
	'optin-survey-question-usedtoolbar' => 'Deihß De de neue, ußklappbaa Wärkzüschreih beim Sigge Änndere bruche?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Wann Joh, wat hät Der doh draan jefalle? Wat nit?',
	'optin-survey-question-usedtoolbar-ifno' => 'Wann nää, woröm dat? Weeß De_t en de Zohkunnf donn? Beß esu joot, un donn dat jet jenouer expleziere.',
	'optin-survey-question-different' => 'Wat künnte mer anders maache, domet De uns <i lang="en">Beta</i> wigger bruche wells?',
	'optin-survey-question-feedback' => 'Beß esu joot un loß uns Ding Röckmeldunge han:',
	'optin-survey-question-browser' => 'Wat för ene Brauser bes De am bruche?',
	'optin-survey-answer-browser-ie5' => 'De Version 5 vum <i lang="en">Internet Explorer</i>',
	'optin-survey-answer-browser-ie6' => 'De Version 6 vum <i lang="en">Internet Explorer</i>',
	'optin-survey-answer-browser-ie7' => 'De Version 7 vum <i lang="en">Internet Explorer</i>',
	'optin-survey-answer-browser-ie8' => 'De Version 8 vum <i lang="en">Internet Explorer</i>',
	'optin-survey-answer-browser-ff1' => 'De Version 1 vum <i lang="en">Firefox</i>',
	'optin-survey-answer-browser-ff2' => 'De Version 2 vum <i lang="en">Firefox</i>',
	'optin-survey-answer-browser-ff3' => 'De Version 3 vum <i lang="en">Firefox</i>',
	'optin-survey-answer-browser-cb' => 'De Betta-Version vum <i lang="en">Google Chrome</i>',
	'optin-survey-answer-browser-c1' => 'De Version 1 vum <i lang="en">Google Chrome</i>',
	'optin-survey-answer-browser-c2' => 'De Version 2 vum <i lang="en">Google Chrome</i>',
	'optin-survey-answer-browser-s3' => 'De Version 3 vum <i lang="en">Safari</i>',
	'optin-survey-answer-browser-s4' => 'De Version 4 vum <i lang="en">Safari</i>',
	'optin-survey-answer-browser-o9' => 'De Version 9 vum <i lang="en">Opera</i>',
	'optin-survey-answer-browser-o9.5' => 'De Version 9.5 vum <i lang="en">Opera</i>',
	'optin-survey-answer-browser-o10' => 'De Version 10 vum <i lang="en">Opera</i>',
	'optin-survey-answer-browser-other' => 'ene andere Brauser:',
	'optin-survey-question-os' => 'Wat förr en Zoot Bedriifß_Süßteem beß De aam bruche?',
	'optin-survey-answer-os-windows' => '<i lang="en">Windows</i>',
	'optin-survey-answer-os-macos' => '<i lang="en">Mac OS</i>',
	'optin-survey-answer-os-linux' => '<i lang="en">Linux</i>',
	'optin-survey-answer-os-other' => 'En ander Zoot Bedriifßsüßtehm:',
	'optin-survey-question-res' => 'Wie es Dingem Beldscherrem sing Oplüüsung?',
	'optin-survey-question-changes' => 'Wat för Änderunge dääts De en De Zohkunnf jähn en de Bata hann? Nemm alle, di paße.',
	'optin-survey-answer-changes-nav' => 'Maat et eröm Navvijeere en heh dä Web_ßait eijfaacher.',
	'optin-survey-answer-changes-edittools' => 'Maat mieh Wärkzüsch för et Beärbeide, un maat et beßer.',
	'optin-survey-answer-changes-upload' => 'Maat et Huhlaade, för Meedije un Enhallde, beßer.',
	'optin-survey-answer-changes-richtext' => 'Doht Wärkzüsh en dä Aat vun <i lang="en">„rich-text“ editors</i> för et Täxte-Ändere entweckele.',
	'optin-survey-answer-changes-lookfeel' => 'Doht Ußsinn un de Jeschtalldung vun dä Web-ßait neuer maache.',
	'optin-survey-answer-changes-predictability' => 'Maat de Leistung mieh afseebaar.',
	'optin-survey-answer-changes-custom' => 'Jrüßer Aanpassonge aan der einzelne Metmaacher müjjelesch maache.',
	'optin-survey-answer-changes-other' => 'Söns jet:',
	'optin-improvements' => '== Wat es bäßer jemaat woode? ==
[[File:UsabilityNavigation.png|left|link=]]
; verbäßert Eöm_jonn
Dat neu Süßteem zom eröm jonn määd_et leischter ze märke, woh De bes, un wat De jraad aam Donn bes, un woh De henjonn kann, un wi De doh hen küß. Dä Kaßte zom Söhke bove räähß es bäßer ze fenge un mer es flöcker mem Söhke. 
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
; bäßer Wärkzüsch zom Ändere
Neu un bäßer Mini-Beldsche maache kloorer, wat e Wärkzüsch deiht. Verjrüüßerbaa Afschnedde maache winnijer Dorjeneein un hallde sällde jebruch Wärkzüsch nur doch eine Klick wick.
<div style="clear:both;"></div>

== Wi mer metmaache kann ==
Öm mieh do drövver ze liehre, wat uns Projäk deiht, un wi mer doh beidraare kann, jangk op et [http://usability.wikimedia.org Wiki <i lang="en">Usability Initiative</i> ier Wiki]. Doh fengkß De Aanjabe üvver uns Finanze, Fochschung, Jeschtalldung un Äntwecklung, un Veröffentleschunge. Öm Froore loßzewääde odder alljemein Röckmäldunge affzejävve, jangk övver uns [http://usability.wikimedia.org/wiki/Talk:Prototype Prottotüpe-Klaafsigg]. Öm beschtemmpte Saache aanzeschpäsche, nämm de zopaß Klaafsigge. Wann de Fähler fengks, schrief Ding Beobachtunge op de [http://usability.wikimedia.org/wiki/Talk:Releases/Acai <i lang="pt-BR">Acai</i> Klaafsigg] udder nämm dr [https://bugzilla.wikimedia.org <i lang="en">Bugzilla</i>] doför.

Mer freue uns, vun Üsch ze hüüre!',
);

/** Cornish (Kernowek)
 * @author Kw-Moon
 */
$messages['kw'] = array(
	'optin-title-optedout' => 'Previ Beta',
);

/** Latin (Latina)
 * @author Omnipaedista
 */
$messages['la'] = array(
	'optin-survey-yes' => 'Sic',
	'optin-survey-no' => 'Haut',
	'optin-survey-answer-changes-other' => 'Aliud:',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Purodha
 * @author Robby
 */
$messages['lb'] = array(
	'optin' => 'Benotzerfrëndlechkeets-Initiative matmaachen',
	'optin-desc' => 'Erlaabt et de Benotzer fir Beta auszeprobéieren, déi lescht Verbesserunge vun der Benotzerfrëndlechkeets-Initiative.',
	'optin-title-optedout' => 'Probéiert Beta aus',
	'optin-title-optedin' => 'Beta verlossen',
	'optin-title-justoptedin' => 'Wëllkomm bäi Beta',
	'optin-title-justoptedout' => 'Merci datt Dir Beta ausprobéiert',
	'optin-title-feedback' => 'Gitt eis Är Meenung',
	'optin-needlogin' => 'Dir musst Iech [$1 alogge] fir Beta auszeprobéieren.',
	'optin-intro' => "D'Benotzerfrëndlechkeets-Initiative vu Wikipedia huet vill geschafft fir d'Benotzerfrëndlechkeet vu Wikipedia ze verbesseren.
Wëllt Dir Beta ausprobéieren?",
	'optin-feedback-intro' => 'Merci datt Dir Beta ausprobéiert hutt.
Mir wëlle wësse wat Dir vun dem neien Interface halt, dofir wiere mir frou wann Dir bei der fräiwëlleger Ëmfro hei ënnedrënner matmaache géift.',
	'optin-feedback-back' => "Wann Dir d'Ëmfro net ausfëlle wëllt, da kënnt dir op $1 zréckgoen.",
	'optin-success-in' => 'Dir probéiert elo Beta aus.
Dir kënnt dës zu jidder Zäit nees ausschalten andeem datt Dir op de Link  "{{int:optin-leave}}"  uewen um Ecran klickt.',
	'optin-leave-cancel' => 'Wann Dir Beta weiderbenotze wëllt, kënnt Dir op $1 zréckgoen',
	'optin-success-out' => 'Dir hutt Beta verlooss.
Dir kënnt dës zu jidder Zäit nees aschalten andeem datt Dir op de Link "{{int:optin-try}}" ueweriets um Schierm klickt.',
	'optin-success-feedback' => 'Merci fir Är Meenung!',
	'optin-accept-short' => 'Kommt mir maachen et!',
	'optin-accept-long' => 'Probéiert Beta aus',
	'optin-accept-long-anon' => 'Aloggen a Beta ausprobéieren',
	'optin-deny-short' => 'Nee Merci',
	'optin-deny-long' => 'Zréck op déi Säit virdrun',
	'optin-submit-out' => 'Beta verloossen',
	'optin-submit-feedback' => 'Gitt eis Är Meenung',
	'optin-survey-yes' => 'Jo',
	'optin-survey-no' => 'Neen',
	'optin-survey-intro' => 'Merci datt Dir Beta ausprobéiert.
Mir wiere frou fir ze wëssen wat Dir vun deem neien Interface denkt, dofir wiere mir frou wann Dir déi fräiwëlleg Ëmfro hei ënnendrënner géift ausfëllen ier Dir op "[[#leave|{{int:optin-submit-out}}]]" klickt.',
	'optin-survey-question-likedislike' => 'Wat hutt dir bäi Beta gutt finnt? Wat huet Iech u Beta net gefall?',
	'optin-survey-question-whyoptout' => 'Firwat verloost Dir dës Beta? (wielt w.e.g. alles aus wat zoutrëfft)',
	'optin-survey-answer-whyoptout-hard' => 'Et war ze komplizéiert fir ze benotzen.',
	'optin-survey-answer-whyoptout-didntwork' => 'Et huet net richteg fonctionnéiert.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Et huet net esou fonctionnéiert wéi virgesinn.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Et huet mir net gefall wéi et ausgesäit.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Ech hat déi nei Ongleten an den neie Layout net gär.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Ech hunn déi nei Toolbar net gär.',
	'optin-survey-answer-whyoptout-other' => 'Anere Grond:',
	'optin-survey-question-explain' => 'Erklärt oder preziséiert Är Äntwert w.e.g.:',
	'optin-survey-question-techfail' => 'Hat Dir technesch Schwieregkeete beim Benotze vu Beta?',
	'optin-survey-question-techfail-ifyes' => 'Wa jo, da begrënnt oder erklärt et:',
	'optin-survey-question-usedtoolbar' => "Hutt Dir déi nei erweiderbar Toolbar benotzt fir eng Säit z'änneren?",
	'optin-survey-question-usedtoolbar-ifyes' => 'Wa jo, wat hutt Dir doru gutt fonnt? Wat huet Iech net esougutt gefall?',
	'optin-survey-question-usedtoolbar-ifno' => 'Wann neen, firwat? Wäert Dir se an der Zukunft benotzen? Gitt w.e.g. en Erklärung.',
	'optin-survey-question-different' => 'Wat kënne mir anescht maache fir datt Dir eis Beta-Versioun weider benotzt?',
	'optin-survey-question-feedback' => 'Sot eis w.e.g. Är Meenung:',
	'optin-survey-question-browser' => 'Watfir e Browser benotzt Dir?',
	'optin-survey-answer-browser-other' => 'Anere Browser:',
	'optin-survey-question-os' => 'Wafir e Betriibssystem benotzt Dir?',
	'optin-survey-answer-os-other' => 'Anere Betriibssystem:',
	'optin-survey-question-res' => "Wéi ass d'Opléisung vun ärem Ecran?",
	'optin-survey-question-changes' => 'Watfir Ännerunge géif Dir am léifsten an der Beta an Zukunft gesinn (sicht w.e.g. all déi eraus déi Iech gefalen)?',
	'optin-survey-answer-changes-nav' => 'Déi allgemeng Navigatioun vum Site méi einfach maachen.',
	'optin-survey-answer-changes-edittools' => "D'Méiglechkeete fir z'ännere vergréisseren a verbesseren.",
	'optin-survey-answer-changes-upload' => "D'Eropluede vun Inhalt a Medie verbesseren.",
	'optin-survey-answer-changes-richtext' => "Ännerungsméiglechkeeten entwéckelen ähnlech wéi 'rich-text'-Editeuren.",
	'optin-survey-answer-changes-lookfeel' => 'Ausgesi vum Site aktualiséieren.',
	'optin-survey-answer-changes-predictability' => 'Zouverléissegkeet vun der Previsioun vun der Performance verbesseren.',
	'optin-survey-answer-changes-custom' => 'Méi en grouss Benotzer-Upassung erlaben.',
	'optin-survey-answer-changes-other' => 'Anerer:',
	'optin-improvements' => '== Wat gouf verbessert? ==
[[File:UsabilityNavigation.png|left|link=]]
;Erweidert Navigatioun
Dat neit Navigatiounssystem mécht et net nëmme méi einfacher fir ze gesinn, wou een ass a wat ee mécht, mee e weist och wuer ee goe kann. Mat der Sichbox uewe riets am Eck gëtt d\'Fanne méi einfach a méi séier.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Verbesserunge vun der Ännerungs-Toolbar
Nei a verbessert Symboler maachen et méi kloer, watfireng Aktioun hanner all Tool stécht. Abschnitter déi opgeklappt kënne ginn reduzéieren den Duercherneen, während sele benotzten Toolen nëmmen ee Klick ewech sinn.
Den Abschnitt mat der Hëllef erlaabt e séieren Zougrëff mat déi am dackste benotzte Wikisyntax.
<div style="clear:both;"></div>

== Wéi Dir matmaache kënnt ==
Fir méi iwwer dëse Projet gewuer ze ginn oder fir matzemaachen, gitt w.e.g. op d\'[http://usability.wikimedia.org Benotzerfrëndlechkeets-Initiative Wiki]. Do fannt Dir Informatiounen iwwer eise Financement, eis Recherche, eisen Design, eis Entwécklung an déi verschidde Versiounen. Fir Froen ze stellen oder en allgemenge Feedback ze hannerloossen benotzt w.e.g. eis [http://usability.wikimedia.org/wiki/Talk:Prototype Prototyp-Diskussiouns-Säit].  Fir méi prezies Sujeten ze diskutéieren benotzt w.e.g. déi jeweileg Diskussiounssäiten. Wann Dir Feeler fannt da mellt eis déi w.e.g. op der [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai release Diskussiounssäit] oder andeem Dir [https://bugzilla.wikimedia.org Bugzilla] benotzt.

Merci a mir freën eis fir vun Iech ze héieren!',
);

/** Lithuanian (Lietuvių)
 * @author Matasg
 */
$messages['lt'] = array(
	'optin' => 'Įjungti naudojimo iniciatyvą',
	'optin-desc' => 'Leisti vartotojams pabandyti Beta, naudojimo iniciatyvos didinimą.',
	'optin-title-optedout' => 'Pabandykite Beta',
	'optin-title-optedin' => 'Palikite Beta',
	'optin-title-justoptedin' => 'Sveiki atvykę į Beta',
	'optin-title-justoptedout' => 'Dėkojame, kad bandote Beta',
	'optin-needlogin' => 'Jums reikia [$1 prisijungti], norint bandyti Beta',
	'optin-intro' => 'Vikipedija Naudojimo iniciatyva dirbo siekiant pagerinti Vikipedijos naudojimą.
Norite pabandyti Açai beta versiją?',
	'optin-success-in' => 'Dabar bandote Beta. 
Galite grįžti bet kuriuo metu, paspaudę "{{int:optin-leave}}" viršutiniame dešiniajame ekrano kampe.',
	'optin-leave-cancel' => 'Jei norite toliau naudoti Beta, galite grįžti į $1',
	'optin-success-out' => 'Jūs sėkmingai paliko Beta.
Galite išmėginti Beta vėl, bet kuriuo metu paspaudę "{{int:optin-try}}" viršutiniame dešiniajame ekrano kampe.',
	'optin-accept-short' => 'Padarykime tai!',
	'optin-accept-long' => 'Išbandykite Beta',
	'optin-deny-short' => 'Ne, ačiū',
	'optin-deny-long' => 'Grįžti į ankstesnį puslapį',
	'optin-submit-out' => 'Palikti Beta',
	'optin-survey-yes' => 'Taip',
	'optin-survey-no' => 'Ne',
	'optin-survey-intro' => 'Dėkojame, kad bandote Beta.
Mes norėtume sužinoti, ką manote apie mūsų naująją vartotojo sąsają, todėl būtume labai dėkingi, jei užpildyti neprivalomą tyrimo apklausą žemiau, prieš paspausdami "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Kas jums patiko Betoje? Kas jums nepatiko Betoje?',
	'optin-survey-question-whyoptout' => 'Kodėl paliekate Beta? (Pasirinkite visus, kurie tinka).',
	'optin-survey-answer-whyoptout-hard' => 'Buvo pernelyg sunku redaguoti puslapį.',
	'optin-survey-answer-whyoptout-didntwork' => 'Ji nefunkcionavo tinkamai.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Neatitiko to, ko tikėjausi.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Man nepatiko, kaip atrodė.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Man nepatiko nauji skirtukai ir išdėstymas.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Man nepatiko nauja įrankių juosta.',
	'optin-survey-answer-whyoptout-other' => 'Kita priežastis:',
	'optin-survey-question-explain' => 'Prašome paaiškinti, ar detalizuoti savo atsakymą:',
	'optin-survey-question-techfail' => 'Ar patyrėte techninių gedimų naudojant Beta?',
	'optin-survey-question-techfail-ifyes' => 'Jei taip, prašome paaiškinti:',
	'optin-survey-question-usedtoolbar' => 'Ar naudojote naują įrankių juostą puslapių redagavimui?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Jei taip, ką norite apie ją? Kas jums nepatinka joje?',
	'optin-survey-question-different' => 'Ką galėtume daryti kitaip, kad jūs naudotumėte Beta?',
	'optin-survey-question-feedback' => 'Leiskite mums sužinoti jūsų nuomonę:',
	'optin-survey-question-browser' => 'Kurią naršyklę naudojate?',
	'optin-survey-answer-browser-other' => 'Kita naršyklė:',
	'optin-survey-question-os' => 'Kurią operacinę sistemą naudojate?',
	'optin-survey-answer-os-other' => 'Kita operacinė sistema:',
	'optin-survey-question-res' => 'Kokia Jūsų ekrano rezoliucija?',
);

/** Latvian (Latviešu)
 * @author Marozols
 */
$messages['lv'] = array(
	'optin-title-optedout' => 'Izmēģināt Beta',
	'optin-title-optedin' => 'Pamest Beta',
	'optin-title-feedback' => 'Atsauksmes par Beta',
	'optin-accept-long' => 'Izmēģināt Beta',
	'optin-submit-out' => 'Pamest Beta',
	'optin-feedback' => 'Atsauksmes par Beta',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'optin' => 'Пристапување кон Иницијативата за употребливост',
	'optin-desc' => 'Дозволи на корисници да ја пробаат Бета, најновите подобрувања на Иницијативата за употребливост.',
	'optin-title-optedout' => 'Пробај ја Бета',
	'optin-title-optedin' => 'Напуштете ја Бета',
	'optin-title-justoptedin' => 'Добредојдовте на Бета',
	'optin-title-justoptedout' => 'Ви благодариме што ја пробавте Бета',
	'optin-title-feedback' => 'Мислења за Бета',
	'optin-needlogin' => 'Треба да [$1 се најавите] за да ја пробате Бета.',
	'optin-intro' => 'Иницијативата за употребливост на Википедија работеше напорно за да ја подобри употребливоста на Википедија.
Дали би сакале да ја пробате нашата Бета?',
	'optin-feedback-intro' => 'Ви благодариме што ја пробавте Бета.
Би сакале да знаеме што мислите за нашиот нов интерфејс, па затоа би ценеле доколку го пополните изборниот прашалник подолу.',
	'optin-feedback-back' => 'Доколку не сакате да го пополните прашалникот, можете да се вратите на $1.',
	'optin-success-in' => 'Моментално ја испробувате Бета.
Можете да ја напуштите во било кога со кликнување на врската „{{int:optin-leave}}“ на врвот од страницата.',
	'optin-leave-cancel' => 'Доколку сакате да продолжите да ја користите Бета, можете да се вратите на $1.',
	'optin-success-out' => 'Успешно ја напуштивте Бета.
Можете повторно да ја пробате било кога со тоа што ќе кликнете на врската „{{int:optin-try}}“ на врвот од страницата.',
	'optin-success-feedback' => 'Ви благодариме што го искажавте вашето мислење!',
	'optin-accept-short' => 'Ајде!',
	'optin-accept-long' => 'Испробајте ја Бета',
	'optin-accept-long-anon' => 'Најавете се и пробајте ја Бета',
	'optin-deny-short' => 'Не, благодарам',
	'optin-deny-long' => 'Врати ме на претходната страница',
	'optin-submit-out' => 'Напушти ја Бета',
	'optin-submit-feedback' => 'Искажи мислење',
	'optin-survey-yes' => 'Да',
	'optin-survey-no' => 'Не',
	'optin-survey-intro' => 'Ви благодариме што ја пробавте Бета.
Би сакале да знаеме што мислите за нашиот нов интерфејс, и затоа би ценеле доколку го пополние изборниот прашалник подолу пред да кликнете на „[[#leave|{{int:optin-submit-out}}]]“.',
	'optin-survey-question-likedislike' => 'Што ви се допаѓаше кај Бета? А што не ви се допадна?',
	'optin-survey-question-whyoptout' => 'Зошто ја напуштате Бета? (Изберете колку што сакате.)',
	'optin-survey-answer-whyoptout-hard' => 'Беше премногу тешка за употреба.',
	'optin-survey-answer-whyoptout-didntwork' => 'Не функционираше како што треба.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Работеше непредвидливо.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Не ми се допадна како изгледа.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Не ми се допаднаа новите менија и распоредот.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Не ми се допадна новиот алатник.',
	'optin-survey-answer-whyoptout-other' => 'Друга причина:',
	'optin-survey-question-explain' => 'Објаснете или елаборирајте го одговорот даден погоре:',
	'optin-survey-question-techfail' => 'Дали ви се случија некакви технички проблеми додека ја користевте Бета?',
	'optin-survey-question-techfail-ifyes' => 'Ако ви се случија, тогаш елаборирајте или објаснете ги:',
	'optin-survey-question-usedtoolbar' => 'Дали го користевте новото мени на отворање за да уредите страница?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Ако да, што ви се допадна таму? А што не ви се допадна?',
	'optin-survey-question-usedtoolbar-ifno' => 'Ако не, тогаш зошто не? Дали би го правеле тоа во иднина? Објаснете.',
	'optin-survey-question-different' => 'Што треба да биде поинаку направено за да сакате да ја користите Бета?',
	'optin-survey-question-feedback' => 'Ве молиме пишете ни ако имате други коментари, проблеми или идеи - сите ваши мислења се полезни!',
	'optin-survey-question-browser' => 'Кој прелистувач го користевте?',
	'optin-survey-answer-browser-other' => 'Друг прелистувач:',
	'optin-survey-question-os' => 'Кој оперативен систем го користевте?',
	'optin-survey-answer-os-other' => 'Друг оперативен систем:',
	'optin-survey-question-res' => 'Која ви е резолуцијата на екранот?',
	'optin-survey-question-changes' => 'Какви промени треба да се направат во Бета? (изберете колку што сакате)',
	'optin-survey-answer-changes-nav' => 'Општата навигација на викито треба да се направи полесна за користење.',
	'optin-survey-answer-changes-edittools' => 'Треба да има повеќе и подобри алатки за уредување.',
	'optin-survey-answer-changes-upload' => 'Подобрете ги подигнувањата на содржини и податотеки.',
	'optin-survey-answer-changes-richtext' => 'Направете алатки за уредување слични на оние за уредување со „богат текст“.',
	'optin-survey-answer-changes-lookfeel' => 'Обновете го „изгледот и чувството“ на викито.',
	'optin-survey-answer-changes-predictability' => 'Подобрете ја предвидливоста на работењето.',
	'optin-survey-answer-changes-custom' => 'Овозможете повеќе кориснички прилагодувања.',
	'optin-survey-answer-changes-other' => 'Друго:',
	'optin-improvements' => '== Што е подобрено? ==
[[File:UsabilityNavigation.png|left|link=]]
;Подобрена навигација
Со новиот навигационен систем сега е полесно да видите каде сте и каде одите, каде можете да одите и како да стасате таму. Бидејќи полето за пребарување сега е преместено во горниот десен агол, алатката за пребарување е полесна за наоѓање и побрза за употреба.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Подобрувања во алатникот за уредување
Со новите и подобрени икони сега е појасно каква улога врши секоја алатка. Алатките се групирани во менија на отворање, и со тоа значително ја намалуваат метежот на функциите, но сепак дури и ретко употребуваните алатки ви се достапни со само еден клик.
Менито за помош ви дава брз пристап кон објасненија за вообичаената употреба на вики-ознаките (кодот).
<div style="clear:both;"></div>
== Како да се приклучите ==
За да дознаете повеќе за проектот или пак да се вклучите, посетете го [http://usability.wikimedia.org Викито на Иницијативата за употребливост].  Таму ќе најдете информации за нашата дотација, истражување, дизајн + развој и изданија.  Ако сакате да поставувате прашања или да искажете општо мислење, обратете ни се на нашата [http://usability.wikimedia.org/wiki/Talk:Prototype прототип-страница за разговор].  За дискусија по некоја конкретна тема, користете ги посебните страници за разговор наведени таму.  Ако најдете бубачки, тогаш оставете коментар на [http://usability.wikimedia.org/wiki/Talk:Releases/Acai страница за разговор на Acai] или пак употребете ја [https://bugzilla.wikimedia.org Bugzilla].

Ви благодариме и ги очекуваме вашите мислења!',
);

/** Malayalam (മലയാളം)
 * @author Junaidpv
 * @author Sadik Khalid
 */
$messages['ml'] = array(
	'optin-deny-short' => 'വേണ്ട, നന്ദി',
	'optin-survey-yes' => 'ഉണ്ട്',
	'optin-survey-no' => 'ഇല്ല',
	'optin-survey-answer-whyoptout-other' => 'മറ്റു കാരണം:',
	'optin-survey-question-techfail' => 'ബീറ്റ ഉപയോഗിക്കുമ്പോള്‍ ഏന്തെങ്കിലും സാങ്കേതിക തകരാറുകള്‍ താങ്കള്‍ക്ക് അനുഭവപ്പെട്ടിട്ടുണ്ടോ?',
	'optin-survey-question-usedtoolbar' => 'ഒരു താള്‍ തിരുത്തുവാന്‍ വേണ്ടി വിപുലീകരിക്കാവുന്ന ടൂള്‍ബാര്‍ താങ്കള്‍ ഉപയോഗിച്ചിട്ടുണ്ടോ?',
	'optin-survey-question-browser' => 'ഏതു ബ്രൌസറാണ് താങ്കള്‍ ഉപയോഗിക്കുന്നത്?',
	'optin-survey-question-os' => 'ഏത് ഓപറേറ്റിങ്ങ് സിസ്റ്റമാണ് താങ്കള്‍ ഉപയോഗിക്കുന്നത്?',
	'optin-survey-question-res' => 'താങ്കളുടെ സ്ക്രീന്‍ റെസ‌ല്യൂഷന്‍ എന്താണ്?',
);

/** Mongolian (Монгол)
 * @author Chinneeb
 */
$messages['mn'] = array(
	'optin-survey-yes' => 'Тийм',
	'optin-survey-answer-changes-other' => 'Бусад:',
);

/** Malay (Bahasa Melayu)
 * @author Diagramma Della Verita
 * @author Kurniasan
 */
$messages['ms'] = array(
	'optin' => 'Opt-in Inisiatif Kebolehgunaan',
	'optin-desc' => 'Membenarkan para pengguna mencuba Beta, peningkatan kebolehgunaan Inisiatif Kebolehgunaan terbaru.',
	'optin-title-optedout' => 'Cuba Beta',
	'optin-title-optedin' => 'Tinggalkan Beta',
	'optin-title-justoptedin' => 'Selamat datang ke Beta',
	'optin-title-justoptedout' => 'Terima kasih kerana menggunakan versi Beta kami',
	'optin-title-feedback' => 'Maklum balas Beta',
	'optin-needlogin' => 'Anda perlu [$1 log masuk] untuk mencuba versi Beta.',
	'optin-intro' => 'Program Inisiatif Kebolehgunaan Wikipedia telah berusaha keras untuk memperbaiki kebolehgunaan Wikipedia. Sudikah anda mencuba versi Beta kami?',
	'optin-feedback-intro' => 'Terima kasih kerana sudi menggunakan Beta.
Kami ingin mengetahui pendapat anda tentang versi ini. Oleh itu, amat kami hargai sekiranya anda sudi mengisi soal selidik di bawah.',
	'optin-feedback-back' => 'Sekiranya anda tidak ingin mengisi soal selidik di bawah, kembali ke $1.',
	'optin-success-in' => 'Anda sekarang sedang menggunakan versi Beta. 
Sekiranya anda tidak ingin menggunakan versi ini, sila tekan "{{int:optin-leave}}" di atas skrin anda.',
	'optin-leave-cancel' => 'Sekiranya anda ingin terus menggunakan Beta, sila kembali ke $1.',
	'optin-success-out' => 'Anda tidak lagi menggunakan Beta.
Sekiranya anda ingin mencuba versi Beta, sila tekan "{{int:optin-try}}" pada bahagian kiri atas skrin anda.',
	'optin-success-feedback' => 'Terima kasih atas pendapat anda!',
	'optin-accept-short' => 'Lakukan sekarang!',
	'optin-accept-long' => 'Cuba Beta',
	'optin-accept-long-anon' => 'Daftar masuk dan cuba Beta',
	'optin-deny-short' => 'Tidak, terima kasih',
	'optin-deny-long' => 'Kembali ke laman sebelumnya',
	'optin-submit-out' => 'Tinggalkan Beta',
	'optin-submit-feedback' => 'Berikan maklum balas',
	'optin-survey-yes' => 'Ya',
	'optin-survey-no' => 'Tidak',
	'optin-survey-intro' => 'Terima kasih kerana mencuba Beta.
Kami ingin ketahui pandangan anda tentang antara muka baru kami, jadi kami menghargai jika anda mengisi tinjauan pilihan di bawah sebelum mengklik "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Apakah yang anda suka tentang Beta? Apakah yang anda tidak suka tentang Beta?',
	'optin-survey-question-whyoptout' => 'Mengapakah anda meninggalkan Beta? (Sila pilih semua yang sesuai.)',
	'optin-survey-answer-whyoptout-hard' => 'Sangat susah untuk digunakan.',
	'optin-survey-answer-whyoptout-didntwork' => 'Ia tidak berfungsi dengan betul.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Ia tidak terlaksana seperti sepatutnya.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Saya tidak suka dengan penampilannya.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Saya tidak suka dengan tab-tab dan susun atur yang baru.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Saya tidak suka dengan bar peralatan yang baru.',
	'optin-survey-answer-whyoptout-other' => 'Sebab-sebab lain:',
	'optin-survey-question-explain' => 'Sila terangkan atau perincikan jawapan anda di atas:',
	'optin-survey-question-techfail' => 'Pernahkah anda mengalami sebarang kegagalan teknikal semasa menggunakan Beta?',
	'optin-survey-question-techfail-ifyes' => 'Jika ya, sila perincikan atau terangkan:',
	'optin-survey-question-usedtoolbar' => 'Pernahkah anda menggunakan bar peralatan boleh kembang yang baru untuk menyunting sesebuah laman?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Jika ya, apa yang anda suka tentangnya? Apa yang anda tidak suka tentangnya?',
	'optin-survey-question-usedtoolbar-ifno' => 'Jika tidak, kenapa tidak? Bagaimana pula di masa akan datang? Sila jelaskan.',
	'optin-survey-question-different' => 'Apakah yang patut kami ubah suai supaya anda kekal menggunakan Beta?',
	'optin-survey-question-feedback' => 'Sila maklumkan kami sebarang komen, kerisauan ataupun pandangan yang anda ada untuk kami - semua maklumbalas adalah berguna:',
	'optin-survey-question-browser' => 'Apakah pelayar web yang anda gunakan?',
	'optin-survey-answer-browser-other' => 'Lain-lain:',
	'optin-survey-question-os' => 'Apakah sistem pengendalian yang anda gunakan?',
	'optin-survey-answer-os-other' => 'Lain-lain:',
	'optin-survey-question-res' => 'Apakah resolusi skrin anda?',
	'optin-survey-question-changes' => 'Perubahan apakah yang anda ingin lihat pada Beta di masa akan datang (sila pilih semua yang sesuai)?',
	'optin-survey-answer-changes-nav' => 'Menjadikan pandu arah keseluruhan tapak lebih mudah digunakan.',
	'optin-survey-answer-changes-edittools' => 'Menambah dan meningkatkan alatan penyuntingan.',
	'optin-survey-answer-changes-upload' => 'Memperbaiki muat naik kandungan dan media.',
	'optin-survey-answer-changes-richtext' => 'Membangun peralatan suntingan serupa dengan penyunting teks kaya.',
	'optin-survey-answer-changes-lookfeel' => 'Menjadikan "rupa dan suasana" tapak ini lebih terkini.',
	'optin-survey-answer-changes-predictability' => 'Memperbaiki kebolehjankaan prestasi.',
	'optin-survey-answer-changes-custom' => 'Benarkan pengubahsuaian penguna yang lebih besar.',
	'optin-survey-answer-changes-other' => 'Lain-lain:',
	'optin-improvements' => '== Apa yang telah dipertingkatkan? ==
[[File:UsabilityNavigation.png|left|link=]]
;Pandu arah yang dipertingkatkan
Sistem pandu arah yang baru memudahkan anda untuk melihat di mana anda berada dan apa yang anda lakukan, dan juga di mana anda boleh pergi dan bagaimana mahu ke sana. Dengan kotak carian diletakkan di bahagian atas sebelah kanan, tampilan pencarian adalah lebih mudah ditemui dan dan lebih cepat untuk digunakan.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Penambahbaikan kotak alat tulis
Arca-arca yang baru dan diperbaiki menjadikan tindakan yang akan dilakukan bagi setiap alat lebih jelas. Bahagian-bahagian yang boleh dikembangkan mengurangkan sepah sementara mengekalkan peralatan yang jarang digunakan cuma dalam jarak seklik sahaja.
Bahagian bantuan membekalkan capaian pantas kepada rujukan bagi penanda wiki yang sering digunakan.
<div style="clear:both;"></div>
== Cara untuk menyertai ==
Bagi mengetahui lebih lanjut akan projek ini ataupun ingin turut serta, sila lawati [http://usability.wikimedia.org Wiki Inisiatif Kepenggunaan].  Di sana anda akan temukan maklumat mengenai geran kami, kajian, rekaan + pembangunan, dan keluaran-keluaran. Bagi pertanyaan soalan dan maklum balas umum, sila gunakan [http://usability.wikimedia.org/wiki/Talk:Prototype laman perbincangan prototaip] kami.  Bagi mengemukakan sesuatu subjek, sila gunakan laman-laman perbincangan yang berkaitan.  Sekiranya anda menemui sebarang pepijat, sila tinggalkan komen anda di [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Laman perbincangan keluaran Acai] ataupun melalui [https://bugzilla.wikimedia.org Bugzilla].

Terima kasih, kami berharap untuk mendengar daripada anda!',
);

/** Maltese (Malti)
 * @author Chrisportelli
 */
$messages['mt'] = array(
	'optin' => "Adeżjoni għal Proġett ta' Użu",
	'optin-desc' => "Ħalli lill-utenti jipprova l-Beta, l-aħħar titjib tal-inizzjattiva ta' użu.",
	'optin-title-optedout' => 'Ipprova l-Beta',
	'optin-title-optedin' => 'Ħalli l-Beta',
	'optin-title-justoptedin' => 'Merħba fil-Beta',
	'optin-title-justoptedout' => 'Grazzi talli ippruvajt l-verżjoni Beta',
	'optin-title-feedback' => 'Rispons fuq il-Beta',
	'optin-needlogin' => 'Huwa neċessarju li l-ewwel [$1 tidħol fil-kont tiegħek] qabel ma tipprova l-Beta.',
	'optin-intro' => "L-inizzjattiva ta' użu tal-Wikipedija qed taħdem biex ittejjeb l-użu tal-Wikipedija. Tixtieq tipprova l-Beta?",
	'optin-feedback-intro' => "Grazzi talli għamilt użu mill-Beta.
Nixtiequ nkunu nafu x'taħseb fuq din l-interfaċċa l-ġdida, għalhekk napprezzaw jekk issib ħin biex tikkompila dan is-sondaġġ t'hawn taħt.",
	'optin-feedback-back' => "Jekk ma tridx timla dan is-sondaġġ, tista' tirritorna lura lejn $1.",
	'optin-success-in' => 'Bħalissa qiegħed tipprova l-Beta.
Tista\' toħroġ barra minn din il-verżjoni billi tagħfas il-ħolqa "{{int:optin-leave}}" fil-quċċata tal-iskrin.',
	'optin-leave-cancel' => "Jekk tixtieq tkompli tuża' l-Beta, tista' tirritorna lejn $1.",
	'optin-success-out' => "Tħalliet b'suċċess il-verżjoni Beta.
Huwa possibbli li terġa' tipprova mill-ġdid f'kwalunkwe mument li tixtieq billi tagħfas il-ħolqa \"{{int:optin-try}}\" fin-naħa leminija tal-quċċata tal-iskrin.",
	'optin-success-feedback' => 'Grazzi għall-fehmiet tiegħek!',
	'optin-accept-short' => 'Nipprovaha!',
	'optin-accept-long' => 'Ipprova l-Beta',
	'optin-accept-long-anon' => 'Illogja u ipprova l-Beta',
	'optin-deny-short' => 'Le grazzi',
	'optin-deny-long' => 'Irritorna lejn il-paġna preċedenti',
	'optin-submit-out' => 'Ħalli l-Beta',
	'optin-submit-feedback' => 'Ħalli l-fehmiet tiegħek',
	'optin-survey-yes' => 'Iva',
	'optin-survey-no' => 'Le',
	'optin-survey-intro' => "Nirringrazzjawk talli għamilt użu mill-Beta.
Nixtiequ nkunu nafu x'taħseb fuq din l-interfaċċa l-ġdida, fejn napprezzaw jekk issib ħin biex tikkompila dan is-sondaġġ t'hawn taħt qabel ma' tagħfas fuq \"[[#leave|{{int:optin-submit-out}}]]\".",
	'optin-survey-question-likedislike' => "X'għoġbok mill-Beta? X'ma għoġobkx mill-Beta?",
	'optin-survey-question-whyoptout' => 'Għaliex se tħalli l-Beta? (Agħżel skont dak li jaqbel.)',
	'optin-survey-answer-whyoptout-hard' => 'Kien wisq diffiċli biex tużah.',
	'optin-survey-answer-whyoptout-didntwork' => 'Ma kienx qed jaħdem tajjeb.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Ma kienx qed jaħdem kif mixtieq.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Ma kienx jogħġobni d-dehra tiegħu.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Ma kinux jogħġbuni l-buttuni l-ġodda u t-tqassim tal-paġni.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Ma kinitx togħġobni l-kaxxa tal-għodda l-ġdida.',
	'optin-survey-answer-whyoptout-other' => 'Raġuni oħra:',
	'optin-survey-question-explain' => 'Jekk jogħġbok spjega jew elabora iktar fuq it-tweġiba preċedenti li għamilt:',
	'optin-survey-question-techfail' => "Esperjenzajt ruħek ma' xi problemi tekniċi waqt l-użu tal-Beta?",
	'optin-survey-question-techfail-ifyes' => 'Jekk iva, jekk jogħġbok elabora jew spjega:',
	'optin-survey-question-usedtoolbar' => 'Għamilt użu mill-kaxxa l-ġdida tal-għodda espansiva biex timmodifika paġna?',
	'optin-survey-question-usedtoolbar-ifyes' => "Jekk iva, x'għoġbok minnha? X'ma għoġbokx minnha?",
	'optin-survey-question-usedtoolbar-ifno' => "Jekk le, għala el? Tista' tużaha fil-futur? Jekk jogħġbok spjega.",
	'optin-survey-question-different' => "Xi stajna għamilna differenti biex kieku bqajt tuża' l-Beta?",
	'optin-survey-question-feedback' => "Ħallina nkunu nafu fuq kwalunkwe kumment jew ħsibijiet oħra li għadek għalina - kull tip ta' rispons huwa bżonnjuż!:",
	'optin-survey-question-browser' => "Xi browżer tuża'?",
	'optin-survey-answer-browser-other' => 'Browżer ieħor:',
	'optin-survey-question-os' => "X'sistema operattiva tuża'?",
	'optin-survey-answer-os-other' => 'Sistema operattiva oħra:',
	'optin-survey-question-res' => "X'inhi r-riżoluzzjoni tal-iskrin tiegħek?",
	'optin-survey-question-changes' => "X'tibdil tixtieq tara fil-futur fil-Beta (agħżel skont dak li jaqbel)?",
	'optin-survey-answer-changes-nav' => 'In-navigazzjoni tas-sit isir aktar sempliċi għall-użu.',
	'optin-survey-answer-changes-edittools' => 'Tkabbir u titjib tal-għodda tal-immodifikar.',
	'optin-survey-answer-changes-upload' => "Titjib fit-tlugħ ta' medja u fit-tpoġġija ta' kontenut.",
	'optin-survey-answer-changes-richtext' => "Żvilupp fl-għodda tal-immodifikar simili għal ta' editur ''rich-text''.",
	'optin-survey-answer-changes-lookfeel' => 'Aġġornament tal-aspett tas-sit.',
	'optin-survey-answer-changes-predictability' => 'Titjib fil-prevedibilità tal-prestazzjonijiet.',
	'optin-survey-answer-changes-custom' => "Tingħata ċans ikbar ta' personalizzazzjoni min-naħa tal-utent.",
	'optin-survey-answer-changes-other' => 'Oħrajn:',
	'optin-improvements' => "== X'ġie mtejjeb ==
[[File:UsabilityNavigation.png|left|link=]]
;Navigazzjoni imsaħħha
Is-sistema ġdida ta' navigazzjoni tagħmilha aktar faċli għalik biex tkun taf fejn int u x'qiegħed tagħmel, u kif ukoll fejn tista' tmur u kif tista' tmur. Bil-kaxxa tat-tfittxija pożizzjonata fuq il-lemin tan-naħa ta' fuq tal-paġna, il-funzjoni tat-tfittxija hi aktar faċli biex issibha u aktar veloċi biex tużaha.
<div style=\"clear:both;\"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Titjib fil-kaxxa tal-għodda
L-ikoni ġodda u mtejba jagħmluha aktar evidenti x'azzjonijiet li kull għodda tesegwixxi. Is-sezzjonijiet espandibbli jnaqqsu iktar il-konfunżjoni li tista' tinħoloq bil-ħafna għodda waqt li l-għodda l-aktar użati jibqgħu biss għafsa 'l bogħod.
Is-sezzjoni tal-għajnuna tipprovdi aċċess istantanju għal referenza tas-sintassi komuni tal-wiki.
<div style=\"clear:both;\"></div>

== Kif tgħin ==
Biex titgħallem iktar fuq dan il-proġett jew tagħti l-għajnuna tiegħek, żur l-[http://usability.wikimedia.org wiki tal-Inizzjattiva ta' Użu]. Hemmhekk, inti tista' ssib informazzjoni fuq is-sovvenzjoni tagħna, it-tfittxija, id-disinn u l-iżvilupp, u verżjonijiet ġodda. Biex tistaqsi mistoqsijiet jew tħalli r-rispons tiegħek, uża l-[http://usability.wikimedia.org/wiki/Talk:Prototype paġna ta' diskussjoni fuq il-prototipi].  Biex tindirizza suġġetti partikulari, jekk jogħġbok uża l-paġni ta' diskussjoni assoċjati. Jekk issib xi żbalji, ħalli l-kummenti tiegħek fuq il-[http://usability.wikimedia.org/wiki/Talk:Releases/Acai paġna ta' diskussjoni tal-verżjonijiet Acai] jew agħmel użu minn [https://bugzilla.wikimedia.org Bugzilla].

Grazzi u nisperaw li nisimgħu mingħandek!",
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'optin-title-optedout' => 'Варчамс Бета верзиянть',
	'optin-survey-answer-whyoptout-other' => 'Лия тувтал:',
	'optin-survey-answer-changes-other' => 'Лия:',
);

/** Nedersaksisch (Nedersaksisch)
 * @author Servien
 */
$messages['nds-nl'] = array(
	'optin' => "Anmelding bie 't Bruukbaorheidsinitiatief",
	'optin-desc' => "Hierdeur kunnen gebrukers Beta, en de leste verbeteringen van 't Bruukbaorheidsinitiatief uutpreberen.",
	'optin-title-optedout' => 'Beta uutpreberen',
	'optin-title-optedin' => 'Beta uutzetten',
	'optin-title-justoptedin' => 'Welkom bie Beta',
	'optin-title-justoptedout' => "Bedank veur 't uutpreberen van Beta",
	'optin-title-feedback' => "Is 't wat?",
	'optin-needlogin' => 'U mutten [$1 an-emeld ween] veurda-j Beta anzetten kunnen.',
	'optin-intro' => "'t Bruukbaorheidsinitiatief van Wikipedie hef een nieje vormgeving en nieje bewarkingshulpmiddels ontwikkeld um de bruukbaorheid van Wikipedie te verbeteren.
Wi-j Beta uutpreberen?",
	'optin-feedback-intro' => "Bedank veur 't uutpreberen van Beta.
Wie willen grege weten wa-jie van de nieje vormgeving vienen, 't zol dus mooi ween a-j disse vragen effen in willen vullen.",
	'optin-feedback-back' => 'A-j de vragen neet in willen vullen, ku-j weerummegaon naor $1',
	'optin-success-in' => 'Je hemmen Beta noen anstaon.
Je kunnen disse instellingen altied weer uutzetten deur op de knoppe "{{int:optin-submit-out}}" te klikken.',
	'optin-leave-cancel' => 'A-j Beta an willen laoten staon, ku-j weerummegaon naor $1',
	'optin-success-out' => 'Je hemmen Beta uut-ezet.
Je kunnen disse functionaliteit altied weer anzetten deur op de knoppe {{int:optin-submit-in}} te klikken.',
	'optin-success-feedback' => 'Bedank veur joew commetaar',
	'optin-accept-short' => "Lao-w 't mar doon!",
	'optin-accept-long' => 'Beta uutpreberen',
	'optin-accept-long-anon' => 'Anmelden en Beta uutpreberen',
	'optin-deny-short' => 'Nee, dank je',
	'optin-deny-long' => 'Weerumme naor de veurige pagina',
	'optin-submit-out' => 'Beta uutzetten',
	'optin-submit-feedback' => 'Versturen',
	'optin-survey-yes' => 'Ja',
	'optin-survey-no' => 'Nee',
	'optin-survey-intro' => 'Bedank veur \'t uutpreberen van Beta.
Wie willen grege weten wa-jie van de nieje vormgeving vienen, \'t zol dus mooi ween a-j disse vragen effen in willen vullen veurda-j op "[[#leave|{{int:optin-submit-out}}]]" klikken.',
	'optin-survey-question-likedislike' => 'Wat vu-j goed an Beta en wat neet?',
	'optin-survey-question-whyoptout' => 'Waorumme gao-j Beta uutzetten? (Kies wat van toepassing is.)',
	'optin-survey-answer-whyoptout-hard' => "'t Was te meuilijk um te gebruken.",
	'optin-survey-answer-whyoptout-didntwork' => "'t Warken neet goed.",
	'optin-survey-answer-whyoptout-notpredictable' => "'t Reageren neet veurspelbaor.",
	'optin-survey-answer-whyoptout-didntlike-look' => "'t Zag der neet uut.",
	'optin-survey-answer-whyoptout-didntlike-layout' => "Ik vunne 't mar niks dee nieje tabblaojen en vormgeving.",
	'optin-survey-answer-whyoptout-didntlike-toolbar' => "Ik vunne 't mar niks dee warkbalke.",
	'optin-survey-answer-whyoptout-other' => 'Aandere rejen:',
	'optin-survey-question-explain' => 'Wat is der gebeurd dà?',
	'optin-survey-question-techfail' => 'Bi-j fouten tegen-ekeumen mit Beta?',
	'optin-survey-question-techfail-ifyes' => 'Zo ja, wat dà?',
	'optin-survey-question-usedtoolbar' => "He-j de nieje uutklapbaore warkbalke uut-eprebeerd bie 't bewarken van een pagina?",
	'optin-survey-question-usedtoolbar-ifyes' => 'Zo ja, wat vu-j der goed à, en wat neet?',
	'optin-survey-question-usedtoolbar-ifno' => "Zo nee, waorum neet dà? Meschien laoter? Wie heuren grege waorumme of dat 't is.",
	'optin-survey-question-different' => 'Wat konnen we aanders edaon hemmen um derveur te zörgen da-j Beta an-ehuilen hannen?',
	'optin-survey-question-feedback' => 'Laot effen weten wa-j dervan vienen:',
	'optin-survey-question-browser' => 'Welke webkieker he-j?',
	'optin-survey-answer-browser-other' => 'Aandere webkieker:',
	'optin-survey-question-os' => 'Welk besturingssysteem he-j?',
	'optin-survey-answer-os-other' => 'Aander besturingssysteem:',
	'optin-survey-question-res' => 'Wat is joe beeldscharmreselusie?',
	'optin-survey-question-changes' => 'Wat zo-jie aanders willen hemmen in de toekomstige Beta (kies meugelijkheen dee van toepassing bin)?',
	'optin-survey-answer-changes-nav' => 'De navigasie van de webstee makkelijker maken.',
	'optin-survey-answer-changes-edittools' => 'Meer en betere bewarkingshulpmiddels',
	'optin-survey-answer-changes-upload' => "Verbeter 't toevoegen van inhoud en media.",
	'optin-survey-answer-changes-richtext' => 'Ontwikkel bewarkingshulpmiddels vergeliekbaor mit uut-ebreien teksverwarkers.',
	'optin-survey-answer-changes-lookfeel' => 'De uutstraoling en warking van de webstee biewarken.',
	'optin-survey-answer-changes-predictability' => 'Verbeter de veurspelbaorheid van de prestasies',
	'optin-survey-answer-changes-custom' => 'Meer gebrukersanpassingen meugelijk maken.',
	'optin-survey-answer-changes-other' => 'Overig:',
	'optin-improvements' => "== Wat is der verbeterd?==
[[File:UsabilityNavigation.png|left|link=]]
;Navigasie is verbeterd
't Nieje navigasiesysteem maak 't makkelijker um te zien waor of da-j bin en wa-j doon, en oek waor of da-j hinnegaon kunnen en ho um der te koemen.
Mit 't zeukvakjen in de rechterbovenhoek is de zeukfunctie makkelijker te vienen en vlogger te gebruken.
<div style=\"clear:both;\"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Bewarkingsbalke is verbeterd
Nieje en verbeteren pictogrammen maken 't dudelijker wat elk hulpmiddel dut.
Uutklapbaore onderdelen verminderen een rommelig uterlijk, terwiel functies dee minder vake gebruuk wonnen wel bereikbaor blieven.
De hulpfunctie biejt vlogge toegang tot uutleg over veelgebruken functies van de wikiopmaaktaal.
<div style=\"clear:both;\"></div>
== Hoe kan-k meedoon ==
Um meer over 't prejek te weten te koemen, of um mee te doon, ku-j naor de [http://usability.wikimedia.org wiki van 't Bruukbaorheidsinitiatief] gaon.
Daor vie-j infermasie over schenking, 't onderzeuk, ontwarp en ontwikkeling en de uutkomsten.
Veur vragen of commetaar, ku-j de [http://usability.wikimedia.org/wiki/Talk:Prototype overlegpagina over 't prototype] gebruken.
Um specefieke punten an de orde te stellen, ku-j de biebeheurende overlegpagina's gebruken.
A-j fouten in de pregrammetuur vienen, maak dan gebruuk van de [http://usability.wikimedia.org/wiki/Talk:Releases/Acai overlegpagina voor Açai] of gebruuk [https://bugzilla.wikimedia.org Bugzilla].

Bedank en we kieken uut naor joew mening!",
);

/** Dutch (Nederlands)
 * @author McDutchie
 * @author Siebrand
 */
$messages['nl'] = array(
	'optin' => 'Opt-in bruikbaarheidsinitiatief',
	'optin-desc' => 'Maakt het mogelijk voor gebruikers om Beta, de verbeteringen van het Bruikbaarheidsinitiatief, in te schakelen',
	'optin-title-optedout' => 'Beta uitproberen',
	'optin-title-optedin' => 'Beta uitschakelen',
	'optin-title-justoptedin' => 'Welkom bij Beta',
	'optin-title-justoptedout' => 'Bedankt voor het uitproberen van Beta',
	'optin-title-feedback' => 'Terugkoppeling geven',
	'optin-needlogin' => 'U moet [$1 aanmelden] voordat u Beta kunt inschakelen.',
	'optin-intro' => 'Het Wikipedia Bruikbaarheidsinitiatief heeft een nieuwe vormgeving en nieuwe bewerkingshulpmiddelen ontwikkeld om de bruikbaarheid van Wikipedia te verbeteren.
Wilt u Beta uitproberen?',
	'optin-feedback-intro' => 'Bedankt voor het uitproberen van Beta.
We willen graag weten hoe u denkt over de nieuwe interface, dus we zouden het op prijs stellen als u de enquête hieronder invult.',
	'optin-feedback-back' => 'Als u de enquête niet wilt invullen kunt u terugkeren naar $1.',
	'optin-success-in' => 'U maakt nu gebruik van Beta.
U kunt deze instellingen op elk gewenst moment weer verwijderen door op de knop "{{int:optin-submit-out}}" te klikken.',
	'optin-leave-cancel' => 'Als u Beta wilt blijven gebruiken, kunt u terugkeren naar $1',
	'optin-success-out' => 'U hebt Beta uitgeschakeld.
U kunt deze functionaliteit op elk gewenst moment weer inschakelen door op de knop {{int:optin-submit-in}} te klikken.',
	'optin-success-feedback' => 'Dank u voor uw terugkoppeling!',
	'optin-accept-short' => 'Inschakelen',
	'optin-accept-long' => 'Beta inschakelen',
	'optin-accept-long-anon' => 'Aanmelden en Beta uitproberen',
	'optin-deny-short' => 'Nee, bedankt',
	'optin-deny-long' => 'Terug naar de vorige pagina',
	'optin-submit-out' => 'Beta uitschakelen',
	'optin-submit-feedback' => 'Terugkoppeling geven',
	'optin-survey-yes' => 'Ja',
	'optin-survey-no' => 'Nee',
	'optin-survey-intro' => 'Dank u wel voor het uitproberen van Beta.
We willen graag weten wat u vindt van deze nieuwe interface, dus wilt u alstublieft de korte vragenlijst hieronder invullen voordat u op "[[#leave|{{int:optin-submit-out}}]]" klikt?',
	'optin-survey-question-likedislike' => 'Wat vond u goed aan Beta?
Wat vond u niet goed aan Beta?',
	'optin-survey-question-whyoptout' => 'Waarom wilt u deze interface weer uitschakelen?
Selecteer alstublieft alle redenen die van toepassing zijn.',
	'optin-survey-answer-whyoptout-hard' => 'Het gebruik was te moeilijk.',
	'optin-survey-answer-whyoptout-didntwork' => 'De wijzigingen functioneerden niet correct.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Het reageerde niet voorspelbaar.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Het zag er niet zo uit als ik wilde.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Ik vond de nieuwe tabbladen en het uiterlijk niet prettig.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Ik vond de nieuwe werkbalk niet prettig werken.',
	'optin-survey-answer-whyoptout-other' => 'Andere reden:',
	'optin-survey-question-explain' => 'Geef alstublieft een toelichting op uw antwoord hierboven:',
	'optin-survey-question-techfail' => 'Hebt u technische fouten ondervonden bij het gebruik van Beta?',
	'optin-survey-question-techfail-ifyes' => 'Zo ja, geef hierop dan alstublieft een toelichting:',
	'optin-survey-question-usedtoolbar' => 'Hebt u de nieuwe uitklapbare werkbalk gebruikt bij het bewerken van een pagina?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Zo ja, wat vond u goed er aan, en wat vond u er niet goed aan?',
	'optin-survey-question-usedtoolbar-ifno' => 'Zo nee, waarom niet?
Wellicht in de toekomst?
Geef alstublieft een toelichting.',
	'optin-survey-question-different' => 'Wat had er anders gedaan moeten worden zodat u Beta was blijven gebruiken?',
	'optin-survey-question-feedback' => 'Laat ons alstublieft weten wat u vindt:',
	'optin-survey-question-browser' => 'Welke browser gebruikt u?',
	'optin-survey-answer-browser-other' => 'Andere browser:',
	'optin-survey-question-os' => 'Welk besturingssysteem gebruikt u?',
	'optin-survey-answer-os-other' => 'Ander besturingssysteem:',
	'optin-survey-question-res' => 'Wat is uw beeldschermresolutie?',
	'optin-survey-question-changes' => 'Welke wijzigingen wilt u in de toekomst in Beta zien? (selecteer alle mogelijkheden die van toepassing zijn)',
	'optin-survey-answer-changes-nav' => 'Maak de navigatie van de site eenvoudiger.',
	'optin-survey-answer-changes-edittools' => 'Meer en betere bewerkingshulpmiddelen.',
	'optin-survey-answer-changes-upload' => 'Verbeter het toevoegen van inhoud en mediauploads.',
	'optin-survey-answer-changes-richtext' => 'Ontwikkel bewerkingshulpmiddelen vergelijkbaar met uitgebreide tekstverwerkers.',
	'optin-survey-answer-changes-lookfeel' => 'Werkt het uiterlijk en de werking van de bij naar de laatste inzichten.',
	'optin-survey-answer-changes-predictability' => 'Verbeter de voorspelbaarheid van de prestaties.',
	'optin-survey-answer-changes-custom' => 'Meer gebruikersaanpassingen mogelijk maken.',
	'optin-survey-answer-changes-other' => 'Overig:',
	'optin-improvements' => '== Wat is er verbeterd?==
[[File:UsabilityNavigation.png|left|link=]]
;Verbeterde navigatie
Het nieuwe navigatiesysteem maakt het makkelijker om te zien waar u bent en op wat u doet, als ook waar u heen kunt gaan en hoe er te komen.
Met het zoekvak in de rechterbovenhoek is de zoekfunctie makkelijker te vinden en sneller te gebruiken.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Verbeterde bewerkingswerkbalk
Nieuwe en verbeterde pictogrammen maken het duidelijker wat ieder hulpmiddel doet.
Uitklapbare onderdelen verminderen een rommelig uiterlijk, terwijl minder vaak gebruikte functies wel bereikbaar blijven.
De hulpfunctie biedt snelle toegang tot uitleg over veelgebruikte functies van de wikiopmaaktaal.
<div style="clear:both;"></div>
== Hoe meedoen ==
Om meer over het project te weten te komen, of om mee te doen, kunt u naar de [http://usability.wikimedia.org wiki van het Bruikbaarheidsinitiatief] gaan.
Daar treft u informatie aan over schenking, het onderzoek, ontwerp en ontwikkeling en de uitkomsten.
Voor vragen of terugkoppeling, kunt u de [http://usability.wikimedia.org/wiki/Talk:Prototype overlegpagina over het prototype] gebruiken.
Om specifieke punten aan de orde te stellen, kunt u de bijbehorende overlegpagina\'s gebruiken.
Als u softwarefouten aantreft, maak dan gebruik van de [http://usability.wikimedia.org/wiki/Talk:Releases/Acai overlegpagina voor Acai] of gebruik[https://bugzilla.wikimedia.org Bugzilla].

Dank u wel en we zien uit naar uw mening!',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Frokor
 * @author Gunnernett
 * @author Harald Khan
 */
$messages['nn'] = array(
	'optin-title-optedout' => 'Prøv betautgåva',
	'optin-title-optedin' => 'Forlat betautgåva',
	'optin-title-justoptedin' => 'Velkommen til betautgåva',
	'optin-title-justoptedout' => 'Takk for at du prøver betautgåva',
	'optin-title-feedback' => 'Tilbakemelding om betautgåva',
	'optin-needlogin' => 'Du må [$1 logga inn] for å prøve betautgåva.',
	'optin-success-feedback' => 'Takk for di tilbakemelding!',
	'optin-accept-short' => 'Lat oss gjera det!',
	'optin-deny-long' => 'Gå attende til førre sida',
	'optin-submit-out' => 'Gå ut av Beta',
	'optin-survey-no' => 'Nei',
	'optin-survey-question-whyoptout' => 'Kvifor går du ut av Beta! (Ver venleg å vél alle aktuelle grunnar.)',
	'optin-survey-answer-whyoptout-hard' => 'Det var for vanskeleg å bruka.',
	'optin-survey-answer-whyoptout-didntwork' => 'Det fungerte ikkje på rett vis.',
	'optin-survey-answer-whyoptout-other' => 'Anna årsak:',
	'optin-survey-question-feedback' => 'Ver venleg og send ei tilbakemelding:',
	'optin-survey-question-browser' => 'Kva for ein nettlesar nyttar du?',
	'optin-survey-answer-browser-other' => 'Annan nettlesar:',
	'optin-survey-question-os' => 'Kva for operativsystem nyttar du?',
	'optin-survey-answer-os-other' => 'Anna operativsystem:',
	'optin-survey-question-res' => 'Kva er oppløysinga på skjermen din?',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 * @author Laaknor
 * @author Nghtwlkr
 * @author Simny
 * @author Stigmj
 */
$messages['no'] = array(
	'optin' => 'Deltakelse i brukervennlighetsprosjektet',
	'optin-desc' => 'La brukere prøve betaversjonen, brukervennlighetsprosjektets nyeste forbedringer.',
	'optin-title-optedout' => 'Prøv Beta',
	'optin-title-optedin' => 'Forlat Beta',
	'optin-title-justoptedin' => 'Velkommen til Beta',
	'optin-title-justoptedout' => 'Takk for at du prøver vår Beta',
	'optin-title-feedback' => 'Tilbakemelding om Beta',
	'optin-needlogin' => 'Du må [$1 logge inn] for å prøve Beta',
	'optin-intro' => 'Wikipedias brukervennlighetsprosjekt har jobbet hardt for å forbedre brukervennligheten til Wikipedia.
Ønsker du å prøve betaversjonen?',
	'optin-feedback-intro' => 'Takk for at du prøver Beta.
Vi vil gjerne vite hva du mener om vårt nye grensesnitt, og vil gjerne at du fyller ut den valgfrie undersøkelsen under.',
	'optin-feedback-back' => 'Hvis du ikke vil fylle ut undersøkelsen, kan du gå tilbake til $1.',
	'optin-success-in' => 'Du prøver nå Beta.
Du kan velge å gå tilbake når som helst ved å klikke på "{{int:optin-leave}}"-lenken øverst på siden.',
	'optin-leave-cancel' => 'Hvis du vil fortsette å bruke Beta kan du gå tilbake til $1.',
	'optin-success-out' => 'Du har forlat Beta.
Du kan forsøke det igjen ved å klikke på "{{int:optin-try}}"-lenken på toppen av skjermen.',
	'optin-success-feedback' => 'Takk for din tilbakemelding!',
	'optin-accept-short' => 'La oss gjøre det!',
	'optin-accept-long' => 'Prøv Beta',
	'optin-accept-long-anon' => 'Logg inn og prøv Beta',
	'optin-deny-short' => 'Neitakk',
	'optin-deny-long' => 'Gå tilbake til forrige side',
	'optin-submit-out' => 'Forlat Beta',
	'optin-submit-feedback' => 'Gi tilbakemelding',
	'optin-survey-yes' => 'Ja',
	'optin-survey-no' => 'Nei',
	'optin-survey-intro' => 'Takk for at du prøver Betaen.
Vi vil gjerne vite hva du tenker om vårt nye grensesnitt, så vi vil sette pris på om du fyller ut et valgfritt skjema under, før du trykker på "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Hva likte du med Beta? Hva likte du ikke om Beta?',
	'optin-survey-question-whyoptout' => 'Hvorfor forlater du Beta? (Vær vennlig og velg alle grunner du mener er aktuelle.)',
	'optin-survey-answer-whyoptout-hard' => 'Den var for vanskelig å bruke.',
	'optin-survey-answer-whyoptout-didntwork' => 'Den virket ikke ordentlig.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Den oppførte seg ikke som jeg skulle forvente.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Jeg likte ikke måten det så ut.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Jeg likte ikke de nye fanene og utseende.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Jeg likte ikke den nye menyen.',
	'optin-survey-answer-whyoptout-other' => 'Annen årsak:',
	'optin-survey-question-explain' => 'Forklar eller utdyp gjerne svarene dine over:',
	'optin-survey-question-techfail' => 'Har du opplevd noen tekniske feil mens du brukte Beta?',
	'optin-survey-question-techfail-ifyes' => 'Hvis ja, forklar:',
	'optin-survey-question-usedtoolbar' => 'Har du brukt den nye utvidbare menyen for å redigere en side?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Hvis ja, hva likte du med den? Hva likte du ikke om den?',
	'optin-survey-question-usedtoolbar-ifno' => 'Hvis nei, hvorfor ikke? Vil du gjøre det i fremtiden? Vær så snill og forklar.',
	'optin-survey-question-different' => "Hva kunne vi gjort annerledes for at du skulle fortsatt å bruke denne betaversjonen ''(tilbakemelding på engelsk)''?",
	'optin-survey-question-feedback' => 'Vennligst gi oss dine tilbakemeldinger:',
	'optin-survey-question-browser' => 'Hvilken nettleser bruker du?',
	'optin-survey-answer-browser-other' => 'Annen nettleser:',
	'optin-survey-question-os' => 'Hvilket operativsystem bruker du?',
	'optin-survey-answer-os-other' => 'Annet operativsystem:',
	'optin-survey-question-res' => 'Hva er skjermoppløsningen din?',
	'optin-survey-question-changes' => 'Hvilke forandringer kunne du tenkt deg å se i betaversjonen i framtiden (velg alle som passer)?',
	'optin-survey-answer-changes-nav' => 'Gjør det lettere å navigere på denne nettsiden.',
	'optin-survey-answer-changes-edittools' => 'Utvid og forbedre redigeringsverktøyene.',
	'optin-survey-answer-changes-upload' => 'Forbedre systemet for opplasting av innhold og media.',
	'optin-survey-answer-changes-richtext' => 'Utvikle redigeringsverktøy tilsvarende for vanlige ordbehandlingsprogram.',
	'optin-survey-answer-changes-lookfeel' => 'Oppdatere utseende og presentasjon av nettsidene.',
	'optin-survey-answer-changes-predictability' => 'Forbedre forutsigbarheten av responsen/hastigheten til nettsidene.',
	'optin-survey-answer-changes-custom' => 'Tillat mere skreddersydde innstillinger.',
	'optin-survey-answer-changes-other' => 'Andre ting:',
	'optin-improvements' => '== Hva har blitt forbedret? ==
[[File:UsabilityNavigation.png|left|link=]]
;Forbedret navigering
Det nye systemet for navigasjon gjør det enklere å se hvor du er og hva du gjør samt hvor du kan gå hvordan du kommer dit. Med søkefeltet i det øvre høyre hjørnet så er søkefunksjonen lettere å finne og kjappere å bruke. (Observer at bildene til venstre ikke bruker den norske oversettelsen som finnes).
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Forbedringer i verktøylinja
Nye og forbedrede ikoner gjør det tydeligere hvilken funksjon hvert verktøy er koblet til. Utvidbare seksjoner reduserer den visuelle støyen, men gjør samtidig verktøyene som brukes sjelden tilgjengelige.
Seksjonen for hjelp gir rask tilgang til forklaringer på vanlig bruk av kodene i wikiteksten.
<div style="clear:both;"></div>

== Hvordan du kan engasjere deg ==
For å få mer informasjon om prosjektet eller for å engasjere deg, vennligst besøk [http://usability.wikimedia.org wikien for Wikipedias initiativ for brukervennlighet]. Der finner du mer informasjon om ovårt stipendiat, forskning, design, utvikling og kommende utgaver. For å stille spørsmål eller komme med generelle kommentarer, bruk vår [http://usability.wikimedia.org/wiki/Talk:Prototype diskusjonsside for prototypen]. For å ta opp spesifikke emner, bruk de respektive diskusjonssidene. Dersom du finner feil/bugger så kan du kommentere dette på [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acaiutgavens diskusjonsside] eller [https://bugzilla.wikimedia.org Bugzilla].

Takk for din interesse og vi ser fram til å høre fra deg!',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'optin' => "Participar a l'iniciativa d'utilizabilitat",
	'optin-desc' => "Permet als utilizaires d'ensajar la Bèta, los melhoraments de l'iniciativa d'utilizabilitat.",
	'optin-title-optedout' => 'Ensajar la Bèta',
	'optin-title-optedin' => 'Quitar la Bèta',
	'optin-title-justoptedin' => 'Benvenguda dins la Bèta',
	'optin-title-justoptedout' => 'Mercés per vòstra participacion a la Bèta',
	'optin-title-feedback' => 'Balhatz vòstre vejaire',
	'optin-needlogin' => 'Vos cal vos [$1 connectar] per ensajar la Bèta.',
	'optin-intro' => "L'iniciativa d'utilizabilitat de Wikipèdia a trabalhat dur per melhorar l'utilizabilitat de Wikipèdia.
Volètz ensajar la Bèta ?",
	'optin-feedback-intro' => "Mercés d'ensajar la Bèta.
Nos agradariá saber çò que pensatz de nòstra interfàcia novèla, nos agradariá qu'emplenèssetz lo questionari çaijós.",
	'optin-feedback-back' => 'Se volètz pas emplenar lo questionari, podètz tornar a $1.',
	'optin-success-in' => "Sètz a testar Bèta.
Podètz interrompre la sesilha a tot moment en clicant sul ligam « {{int:optin-leave}} » en naut a drecha de l'ecran.",
	'optin-leave-cancel' => "Se volètz contunhar d'utilizar la Bèta, podètz tornar a $1.",
	'optin-success-out' => "Avètz quitat Bèta.
Podètz participar tornamai a tot moment en clicant sul ligam « {{int:optin-try}} » en naut a drecha de l'ecran.",
	'optin-success-feedback' => 'Mercés per vòstre vejaire !',
	'optin-accept-short' => 'Anem !',
	'optin-accept-long' => 'Ensajar la Bèta',
	'optin-accept-long-anon' => 'Connectatz-vos e ensajatz la Bèta',
	'optin-deny-short' => 'Non mercés',
	'optin-deny-long' => 'Tornar a la pagina precedenta',
	'optin-submit-out' => 'Quitar la Bèta',
	'optin-submit-feedback' => 'Balhatz vòstre vejaire',
	'optin-survey-yes' => 'Òc',
	'optin-survey-no' => 'Non',
	'optin-survey-intro' => "Mercés per ensajar la Bèta.

Nos agradariá de saber çò que pensatz de nòstra interfàcia novèla, nos agradariá s'emplenèssetz l'escandalhatge opcional abans de clicar sus « [[#leave|{{int:optin-submit-out}}]] ».",
	'optin-survey-question-likedislike' => 'Qué vos a agradat dins la Bèta ? Qué vos a pas agradat dins la Bèta ?',
	'optin-survey-question-whyoptout' => 'Perqué quitatz la Bèta ? (seleccionatz tot çò que vos conven)',
	'optin-survey-answer-whyoptout-hard' => "Èra tròp complicat d'utilizar.",
	'optin-survey-answer-whyoptout-didntwork' => 'Aquò fonciona pas corrèctament.',
	'optin-survey-answer-whyoptout-notpredictable' => "Aquò s'es pas passat coma previst.",
	'optin-survey-answer-whyoptout-didntlike-look' => "Son aspècte m'a pas agradat.",
	'optin-survey-answer-whyoptout-didntlike-layout' => "Los onglets novèls e la disposicion novèla m'an pas agradat.",
	'optin-survey-answer-whyoptout-didntlike-toolbar' => "La barra d'espleches novèla m'a pas agradat.",
	'optin-survey-answer-whyoptout-other' => 'Autra rason :',
	'optin-survey-question-explain' => 'Explicatz o elaboratz vòstra responsa çaisús :',
	'optin-survey-question-techfail' => 'Avètz rencontrat de problèmas tecnics en utilizant la Bèta ?',
	'optin-survey-question-techfail-ifyes' => 'Se òc, explicatz o elaboratz :',
	'optin-survey-question-usedtoolbar' => "Avètz utilizat la barra d'espleches desenrotlabla novèla per modificar una pagina ?",
	'optin-survey-question-usedtoolbar-ifyes' => 'Se òc, qué vos a agradat e qué vos a pas agradat a son prepaus ?',
	'optin-survey-question-usedtoolbar-ifno' => "Se non, perqué ? L'utilizaretz dins lo futur ? Explicatz-vos.",
	'optin-survey-question-different' => "Qué auriá degut èsser diferent per que continhuèssetz d'utilizar nòstra Bèta ?",
	'optin-survey-question-feedback' => 'Balhatz-nos vòstra reaccion :',
	'optin-survey-question-browser' => 'Quin navigador utilizatz ?',
	'optin-survey-answer-browser-other' => 'Autre navigador :',
	'optin-survey-question-os' => 'Quin sistèma operatiu utilizatz ?',
	'optin-survey-answer-os-other' => 'Autre sistèma operatiu :',
	'optin-survey-question-res' => 'Quina es la resolucion de vòstre ecran ?',
	'optin-survey-question-changes' => 'Qué vos agradariá veire dins la Bèta dins lo futur (seleccionatz tot çò que conven) ?',
	'optin-survey-answer-changes-nav' => "Fa que la navigacion generala del site es mai simpla d'utilizar.",
	'optin-survey-answer-changes-edittools' => "Melhora e augmenta los espleches d'edicion.",
	'optin-survey-answer-changes-upload' => "Melhora l'impòrt de contengut e de mèdia.",
	'optin-survey-answer-changes-richtext' => "Desvolopa d'espleches de modificacions similars als editors en tèxte enriquit.",
	'optin-survey-answer-changes-lookfeel' => "Càmbia l'aparéncia del site.",
	'optin-survey-answer-changes-predictability' => 'Melhora la previzibilitat de las performàncias.',
	'optin-survey-answer-changes-custom' => "Permet una màger personalizacion de l'interfàcia.",
	'optin-survey-answer-changes-other' => 'Autre :',
	'optin-improvements' => "== De qué es es estat melhorat ? ==
[[File:UsabilityNavigation.png|left|link=]]
;Navigacion enriquida
Lo sistèma de navigacion novèl vos permet de veire mau aisidament ont sètz e çò que fasètz, e mai ont podètz anar e cossí vos i rendre. Amb la bóstia de recèrca situada dins lo canton superior drech, la foncionalitat de recèrca es de melhor trobar e de melhor utilizar.
<div style=\"clear:both;\"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Melhoraments de la barra d'espleches
D'icòna tota novèlas clarifican l'accion efectuada per cada esplech. De seccions extensibles redusisson lo desòrdre tot en gardant l'accès als espleches utilizats mai raremant en un sol clic.
La seccion d'ajuda provesís un accès rapid a la documentacion sus l'utilizacion correnta de las balisas wiki.
<div style=\"clear:both;\"></div>

== Cossí s’implicar ==
Per ne saber mai a propos del projècte o per s’i implicar, visitatz [http://usability.wikimedia.org lo wiki de l’iniciativa d’utilizabilitat]. I trobaretz d'informacions sus nòstra subvencion, la recèrca, la concepcion e lo desvolopament. Per pausar de questions o per daissar de comentaris, mercés d’utilizar nòstra [http://usability.wikimedia.org/wiki/Talk:Prototype pagina de discussion sul prototipe]. Per abordar de subjèctes particulars, utilizatz las paginas de discussion associadas. Si vous trouvez des bogues, merci de laisser un message sur [http://usability.wikimedia.org/wiki/Talk:Releases/Acai la pagina de discussion de la version Açai] o via [https://bugzilla.wikimedia.org Bugzilla].

Mercés, nos regaudissèm de vòstre interès !",
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'optin-title-optedin' => 'Beta verlosse',
	'optin-title-justoptedin' => 'Wilkum zu Beta',
	'optin-deny-short' => 'Nee, ken Interest',
	'optin-deny-long' => 'Zerick zum letscht Blatt',
	'optin-submit-out' => 'Beta verlosse',
	'optin-survey-yes' => 'Ya',
	'optin-survey-no' => 'Nee',
	'optin-survey-answer-whyoptout-other' => 'Annre Grind:',
	'optin-survey-answer-browser-other' => 'Annre Browser:',
	'optin-survey-answer-changes-other' => 'Annre:',
);

/** Polish (Polski)
 * @author Leinad
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'optin' => 'Włączenie Inicjatywy Użyteczności',
	'optin-desc' => 'Pozwala użytkownikom wypróbować wersję testową zrealizowaną w ramach inicjatywy użyteczności.',
	'optin-title-optedout' => 'Wypróbuj wersję testową',
	'optin-title-optedin' => 'Koniec testowania',
	'optin-title-justoptedin' => 'Witaj w wersji testowej',
	'optin-title-justoptedout' => 'Dziękujemy za wypróbowanie wersji testowej',
	'optin-title-feedback' => 'Opinie o wersji testowej',
	'optin-needlogin' => 'Musisz [$1 zalogować się] by wypróbować wersję testową.',
	'optin-intro' => 'Podjęliśmy inicjatywę mającą poprawić użyteczność Wikipedii.
Czy chcesz wypróbować wersję testową?',
	'optin-feedback-intro' => 'Dziękujemy za wypróbowanie wersji testowej.
Chcielibyśmy wiedzieć co myślisz o nowym interfejsie. Będziemy wdzięczni, jeśli wypełnisz poniższą ankietę.',
	'optin-feedback-back' => 'Jeśli nie chcesz wypełnić ankiety, możesz powrócić do $1.',
	'optin-success-in' => 'Rozpocząłeś korzystanie z wersji testowej.
W każdej chwili możesz ją wyłączyć poprzez kliknięcie linku „{{int:optin-submit-out}}” umieszczonego na górze strony.',
	'optin-leave-cancel' => 'Jeśli chcesz nadal korzystać z wersji testowej, powróć do $1.',
	'optin-success-out' => 'Wyłączyłeś wersję testową.
W każdej chwili możesz ją przywrócić poprzez kliknięcie linku „{{int:optin-try}}” znajdującego się na górze, po prawej stronie.',
	'optin-success-feedback' => 'Dziękujemy za przesłaną opinię!',
	'optin-accept-short' => 'Tak, chcę!',
	'optin-accept-long' => 'Wypróbuj wersję testową',
	'optin-accept-long-anon' => 'Zaloguj się i wypróbuj wersję testową',
	'optin-deny-short' => 'Nie, dziękuję',
	'optin-deny-long' => 'Powrót do poprzedniej strony',
	'optin-submit-out' => 'Koniec testowania',
	'optin-submit-feedback' => 'Prześlij opinię',
	'optin-survey-yes' => 'Tak',
	'optin-survey-no' => 'Nie',
	'optin-survey-intro' => 'Dziękujemy za wypróbowanie wersji testowej.

Chcielibyśmy poznać Twoją opinię dotyczącą nowego interfejsu, w związku z tym będziemy wdzięczni za wypełnienie poniższej nieobowiązkowej ankiety, zanim klikniesz „[[#leave|{{int:optin-submit-out}}]]”.',
	'optin-survey-question-likedislike' => 'Co Ci się spodobało w wersji testowej? Co Ci się w niej nie podoba?',
	'optin-survey-question-whyoptout' => 'Dlaczego rezygnujesz z wersji testowej? (zaznacz wszystkie opcje, które pasują)',
	'optin-survey-answer-whyoptout-hard' => 'To było zbyt trudne, aby z tego korzystać.',
	'optin-survey-answer-whyoptout-didntwork' => 'Nie działał poprawnie.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Działa w sposób nieprzewidywalny.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Nie podoba mi się wygląd.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Nie podobają mi się nowe zakładki i układ.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Nie podoba mi się nowy pasek narzędzi.',
	'optin-survey-answer-whyoptout-other' => 'Inny powód',
	'optin-survey-question-explain' => 'Wyjaśnij lub omów swoją powyższą odpowiedź',
	'optin-survey-question-techfail' => 'Czy napotkałeś jakąś awarię techniczną podczas korzystania z wersji testowej?',
	'optin-survey-question-techfail-ifyes' => 'Jeśli tak, opowiedz o tym.',
	'optin-survey-question-usedtoolbar' => 'Czy korzystałeś z nowego rozszerzalnego paska narzędzi, aby edytować stronę?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Jeśli tak, to co Ci się podobało? Co Ci się nie podobało?',
	'optin-survey-question-usedtoolbar-ifno' => 'Jeśli nie, to dlaczego nie? Może jednak kiedyś? Wyjaśnij prosimy.',
	'optin-survey-question-different' => 'Co należy poprawić, aby przekonać Cię do korzystania z wersji testowej?',
	'optin-survey-question-feedback' => 'Podziel się z nami swoją opinią, wątpliwościami lub sugestiami – każdy komentarz jest mile widziany!',
	'optin-survey-question-browser' => 'Z jakiej korzystasz przeglądarki?',
	'optin-survey-answer-browser-ie5' => 'Internet Explorer 5',
	'optin-survey-answer-browser-ie6' => 'Internet Explorer 6',
	'optin-survey-answer-browser-ie7' => 'Internet Explorer 7',
	'optin-survey-answer-browser-ie8' => 'Internet Explorer 8',
	'optin-survey-answer-browser-ff1' => 'Firefox 1',
	'optin-survey-answer-browser-ff2' => 'Firefox 2',
	'optin-survey-answer-browser-ff3' => 'Firefox 3',
	'optin-survey-answer-browser-cb' => 'Google Chrome Beta',
	'optin-survey-answer-browser-c1' => 'Google Chrome 1',
	'optin-survey-answer-browser-c2' => 'Google Chrome 2',
	'optin-survey-answer-browser-s3' => 'Safari 3',
	'optin-survey-answer-browser-s4' => 'Safari 4',
	'optin-survey-answer-browser-o9' => 'Opera 9',
	'optin-survey-answer-browser-o9.5' => 'Opera 9.5',
	'optin-survey-answer-browser-o10' => 'Opera 10',
	'optin-survey-answer-browser-other' => 'Inna przeglądarka',
	'optin-survey-question-os' => 'Z jakiego systemu operacyjnego korzystasz?',
	'optin-survey-answer-os-windows' => 'Windows',
	'optin-survey-answer-os-macos' => 'Mac OS',
	'optin-survey-answer-os-linux' => 'Linux',
	'optin-survey-answer-os-other' => 'Inny system operacyjny',
	'optin-survey-question-res' => 'Z jakiej rozdzielczości ekranu korzystasz?',
	'optin-survey-question-changes' => 'Jakie zmiany chciałbyś zobaczyć w wersji testowej w przyszłości? Zaznacz wszystkie prawidłowe odpowiedzi.',
	'optin-survey-answer-changes-nav' => 'Poprawienie ogólne nawigacji wewnątrz witryny, aby stała się łatwiejsza w użyciu.',
	'optin-survey-answer-changes-edittools' => 'Zwiększenie liczby i rozszerzenie funkcjonalności narzędzi edycyjnych.',
	'optin-survey-answer-changes-upload' => 'Poprawienie przesyłania treści i plików.',
	'optin-survey-answer-changes-richtext' => 'Opracowanie narzędzi edycyjnych zbliżonych do tych z profesjonalnych edytorów tekstu.',
	'optin-survey-answer-changes-lookfeel' => 'Zaktualizowanie wyglądu i stylu witryny.',
	'optin-survey-answer-changes-predictability' => 'Poprawienie przewidywalności zmian.',
	'optin-survey-answer-changes-custom' => 'Umożliwienie lepszego dostosowania do indywidualnych potrzeb użytkownika.',
	'optin-survey-answer-changes-other' => 'Inne',
	'optin-improvements' => '== Co zostało poprawione? ==
[[File:UsabilityNavigation.png|left|link=]]
;Poprawiono nawigację
Nowy sposób nawigacji umożliwia łatwiejsze zorientowanie się w aktualnym położeniu oraz wykonywanej czynności, jak również gdzie można się udać i jak tam dotrzeć. Umieszczenie wyszukiwania w prawym górnym rogu strony ułatwiło i przyspieszyło do niego dostęp.
<div style="clear:both;"></div> 

[[File:UsabilityToolbar.png|left|link=]]
;Poprawiono pasek narzędzi edycyjnych
Nowe ikony, czytelniejsze i lepiej dopasowane do narzędzi. Rozwijalny kliknięciem pasek narzędzi zmniejsza bałagan ukrywając ikony rzadko wykorzystywanych narzędzi.
Sekcja pomocy  umożliwia szybki dostęp do pomocy kontekstowej dla często wykorzystywanych znaczników wiki.
<div style="clear:both;"></div>

== Jak można pomóc? ==
Aby dowiedzieć się więcej o projekcie lub wziąć w nim udział odwiedź witrynę [http://usability.wikimedia.org projektu użyteczności wiki]. Odnajdziesz tam informacje o tym jak nas wesprzeć finansowo, w badaniach, projektowaniu, rozwoju oraz wydawaniu wersji. Pytania można zadawać poprzez ogólny system opiniowania, używając [http://usability.wikimedia.org/wiki/Talk:Prototype prototypowej strony dyskusji]. Konkretne problemy należy poruszać na powiązanych stronach dyskusji. Odnalezione błędy należy zgłaszać pozostawiając komentarz na [http://usability.wikimedia.org/wiki/Talk:Releases/Acai stronie dyskusji wersji Acai] lub korzystając z [https://bugzilla.wikimedia.org Bugzilli].

Dziękujemy i zapraszamy!',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'optin-title-optedout' => 'آزمېښتي بڼه کارول',
	'optin-accept-short' => 'راځه چې وې آزمويو!',
	'optin-deny-short' => 'نه مننه',
	'optin-survey-yes' => 'هو',
	'optin-survey-no' => 'نه',
	'optin-survey-answer-whyoptout-other' => 'بل سبب:',
	'optin-survey-question-browser' => 'تاسې کوم کتنمل کاروۍ؟',
	'optin-survey-answer-browser-other' => 'بل کتنمل:',
	'optin-survey-question-os' => 'تاسې کوم چليز غونډال کاروۍ؟',
);

/** Portuguese (Português)
 * @author Capmo
 * @author Giro720
 * @author Malafaya
 * @author Waldir
 */
$messages['pt'] = array(
	'optin' => 'Participar na Iniciativa de Usabilidade',
	'optin-desc' => 'Permitir que os utilizadores experimentem o Beta, as melhorias mais recentes da Iniciativa de Usabilidade.',
	'optin-title-optedout' => 'Experimentar o Beta',
	'optin-title-optedin' => 'Sair do Beta',
	'optin-title-justoptedin' => 'Bem-vindo ao Beta',
	'optin-title-justoptedout' => 'Obrigado por experimentar o Beta',
	'optin-title-feedback' => 'Enviar comentários',
	'optin-needlogin' => 'Você precisa [$1 autenticar-se] para experimentar o Beta.',
	'optin-intro' => 'A Iniciativa de Usabilidade da Wikipédia tem trabalhado arduamente para melhorar a usabilidade da Wikipédia.
Gostaria de experimentar a versão Beta?',
	'optin-feedback-intro' => 'Obrigado por experimentar Beta.
Gostaríamos de saber o que você acha da nossa nova interface, por isso agradecíamos que preenchesse o inquérito opcional abaixo.',
	'optin-feedback-back' => 'Se você não quiser preencher o inquérito, pode regressar a $1.',
	'optin-success-in' => 'Você está agora a experimentar o Beta.
Você pode optar por sair a qualquer momento, clicando no link "{{int:optin-leave}}" no topo do ecrã.',
	'optin-leave-cancel' => 'Se você quiser continuar a usar o Beta, você pode voltar para $1.',
	'optin-success-out' => 'Você saiu do Beta.
Você pode experimentá-lo novamente a qualquer momento, clicando no link "{{int:optin-try}}" na parte superior direita do ecrã.',
	'optin-success-feedback' => 'Obrigado pelos seus comentários!',
	'optin-accept-short' => 'Ok, vamos fazê-lo!',
	'optin-accept-long' => 'Experimente o Beta',
	'optin-accept-long-anon' => 'Entre e experimente o Beta',
	'optin-deny-short' => 'Não, obrigado',
	'optin-deny-long' => 'Regressar à página anterior',
	'optin-submit-out' => 'Sair do Beta',
	'optin-submit-feedback' => 'Enviar comentários',
	'optin-survey-yes' => 'Sim',
	'optin-survey-no' => 'Não',
	'optin-survey-intro' => 'Obrigado por experimentar o Beta.
Gostaríamos de saber o que você acha da nossa nova interface, por isso agradecíamos que preenchesse o inquérito opcional abaixo, antes de clicar em "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'De que você gostou no Beta? De que você não gostou no Beta?',
	'optin-survey-question-whyoptout' => 'Por que você está a sair do Beta? (Selecione todas as opções que se aplicam.)',
	'optin-survey-answer-whyoptout-hard' => 'Foi muito difícil de usar.',
	'optin-survey-answer-whyoptout-didntwork' => 'Não funcionou corretamente.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Não funcionou de forma consistente.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Eu não gostei do seu aspecto.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Eu não gostei dos novos separadores e design.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Eu não gostei da nova barra de ferramentas.',
	'optin-survey-answer-whyoptout-other' => 'Outro motivo:',
	'optin-survey-question-explain' => 'Por favor explique ou elabore a sua resposta anterior:',
	'optin-survey-question-techfail' => 'Você sofreu alguma falha técnica ao usar o Beta?',
	'optin-survey-question-techfail-ifyes' => 'Se sim, por favor descreva ou explique:',
	'optin-survey-question-usedtoolbar' => 'Você usou a nova barra de ferramentas expansível para editar uma página?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Se sim, de que você gostou nela? De que você não gostou nela?',
	'optin-survey-question-usedtoolbar-ifno' => 'Se não, porque não? Irá no futuro? Por favor, elabore.',
	'optin-survey-question-different' => 'O que poderíamos ter feito de forma diferente para que você continuasse a usar o nosso Beta?',
	'optin-survey-question-feedback' => 'Por favor, indique-nos quaisquer outros comentários, críticas ou sugestões que você tenha para nós - todas as opiniões são úteis!:',
	'optin-survey-question-browser' => 'Que navegador utiliza?',
	'optin-survey-answer-browser-other' => 'Outro navegador:',
	'optin-survey-question-os' => 'Que sistema operativo utiliza?',
	'optin-survey-answer-os-other' => 'Outro sistema operativo:',
	'optin-survey-question-res' => 'Qual é a resolução do seu ecrã?',
	'optin-survey-question-changes' => 'Que mudanças você gostaria de ver futuramente no Beta? (favor selecionar as opções pertinentes)',
	'optin-survey-answer-changes-nav' => 'Tornar a navegação geral do site mais fácil de usar.',
	'optin-survey-answer-changes-edittools' => 'Criar mais e melhores ferramentas de edição.',
	'optin-survey-answer-changes-upload' => 'Melhorar o carregamento de conteúdo e multimédia.',
	'optin-survey-answer-changes-richtext' => 'Desenvolver ferramentas de edição semelhantes a editores avançados de texto.',
	'optin-survey-answer-changes-lookfeel' => 'Renovar o aspecto geral do site.',
	'optin-survey-answer-changes-predictability' => 'Melhorar a consistência dos resultados.',
	'optin-survey-answer-changes-custom' => 'Permite maior personalização pelo utilizador.',
	'optin-survey-answer-changes-other' => 'Outros:',
	'optin-improvements' => '== O que foi melhorado? ==
[[File:UsabilityNavigation.png|left|link=]]
;Navegação melhorada 
O novo sistema de navegação torna mais fácil ver onde você está e o que você está a fazer, bem como onde pode ir e como chegar lá. Com a caixa de pesquisa localizada no canto superior direito, a funcionalidade de pesquisa é mais fácil de encontrar e mais rápida de usar.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Melhoramentos na barra de ferramentas de edição
Novos e melhorados ícones tornam mais claro que acção que cada ferramenta realiza. Secções ampliáveis reduzem o empilhamento de botões, continuando a manter ferramentas menos utilizadas a apenas um clique de distância.
A secção de ajuda fornece acesso rápido a uma referência para usos comuns de código wiki.
<div style="clear:both;"></div>
== Como participar ==
Para aprender mais ou participar do projecto, por favor visite a [http://usability.wikimedia.org wiki da Iniciativa de Usabilidade]. Lá você encontrará informações sobre nossa concessão, pesquisa,  desenho + desenvolvimento, e lançamentos. Para esclarecer dúvidas ou sugestões, por favor utilize nossa [http://usability.wikimedia.org/wiki/Talk:Prototype página de discussão]. Para assuntos específicos, utilize uma das páginas de discussão associada. Caso encontro bugs, por favor deixe seu comentário na [http://usability.wikimedia.org/wiki/Talk:Releases/Acai página de discussão Acai] ou através do [https://bugzilla.wikimedia.org Bugzilla].

Obrigado e estamos ansiosos para ouvir de você!',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Heldergeovane
 */
$messages['pt-br'] = array(
	'optin' => 'Participar na Iniciativa de Usabilidade',
	'optin-desc' => 'Permitir que os usuários experimentem o Beta, as melhorias mais recentes da Iniciativa de Usabilidade.',
	'optin-title-optedout' => 'Experimentar o Beta',
	'optin-title-optedin' => 'Sair do Beta',
	'optin-title-justoptedin' => 'Bem-vindo ao Beta',
	'optin-title-justoptedout' => 'Obrigado por experimentar o Beta',
	'optin-title-feedback' => 'Enviar comentários',
	'optin-needlogin' => 'Você precisa [$1 autenticar-se] para experimentar o Beta.',
	'optin-intro' => 'A Iniciativa de Usabilidade da Wikipédia tem trabalhado arduamente para melhorar a usabilidade da Wikipédia.
Gostaria de experimentar nosso Beta?',
	'optin-feedback-intro' => 'Obrigado por experimentar o Beta.
Gostaríamos de saber o que você acha da nossa nova interface, por isso agradeceríamos se você preenchesse a pesquisa opcional abaixo.',
	'optin-feedback-back' => 'Se você não quiser preencher a pesquisa, pode voltar para $1.',
	'optin-success-in' => 'Agora você está experimentando o Beta.
Você pode optar por sair a qualquer momento, clicando na ligação "{{int:optin-leave}}" no topo da tela.',
	'optin-leave-cancel' => 'Se você quiser continuar usando o Beta, você pode voltar para $1.',
	'optin-success-out' => 'Você saiu do Beta.
Você pode experimentá-lo novamente a qualquer momento, clicando na ligação "{{int:optin-try}}" na parte superior direita da tela.',
	'optin-success-feedback' => 'Obrigado pelos seus comentários!',
	'optin-accept-short' => 'Ok, vamos fazê-lo!',
	'optin-accept-long' => 'Experimente o Beta',
	'optin-accept-long-anon' => 'Entre e experimente o Beta',
	'optin-deny-short' => 'Não, obrigado',
	'optin-deny-long' => 'Voltar à página anterior',
	'optin-submit-out' => 'Sair do Beta',
	'optin-submit-feedback' => 'Enviar comentários',
	'optin-survey-yes' => 'Sim',
	'optin-survey-no' => 'Não',
	'optin-survey-intro' => 'Obrigado por experimentar o Beta.
Gostaríamos de saber o que você acha da nossa nova interface, por isso agradeceríamos se você preenchesse a pesquisa opcional abaixo, antes de clicar em "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'De que você gostou no Beta? De que você não gostou no Beta?',
	'optin-survey-question-whyoptout' => 'Por que você está saindo do Beta? (Por favor, selecione todas as opções que se aplicam.)',
	'optin-survey-answer-whyoptout-hard' => 'Foi muito difícil de usar.',
	'optin-survey-answer-whyoptout-didntwork' => 'Não funcionou corretamente.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Não funcionou como esperado.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Eu não gostei do seu aspecto.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Eu não gostei das novas abas e design.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Eu não gostei da nova barra de ferramentas.',
	'optin-survey-answer-whyoptout-other' => 'Outro motivo:',
	'optin-survey-question-explain' => 'Por favor explique ou elabore a sua resposta anterior:',
	'optin-survey-question-techfail' => 'Você sofreu alguma falha técnica ao usar o Beta?',
	'optin-survey-question-techfail-ifyes' => 'Se sim, por favor descreva ou explique:',
	'optin-survey-question-usedtoolbar' => 'Você usou a nova barra de ferramentas expansível para editar uma página?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Se sim, de que você gostou nela? De que você não gostou nela?',
	'optin-survey-question-usedtoolbar-ifno' => 'Se não, porque não? Irá no futuro? Por favor, explique.',
	'optin-survey-question-different' => 'O que poderíamos ter feito de forma diferente para que você continuasse a usar o Beta?',
	'optin-survey-question-feedback' => 'Por favor, indique-nos quaisquer outros comentários, críticas ou sugestões que você tenha para nós - todas as opiniões são úteis!:',
	'optin-survey-question-browser' => 'Que navegador você usa?',
	'optin-survey-answer-browser-other' => 'Outro navegador:',
	'optin-survey-question-os' => 'Que sistema operacional você usa?',
	'optin-survey-answer-os-other' => 'Outro sistema operacional:',
	'optin-survey-question-res' => 'Qual é a resolução do seu monitor?',
	'optin-survey-question-changes' => 'Que mudanças você gostaria de ver futuramente no Beta? (por favor selecione todas as opções pertinentes)',
	'optin-survey-answer-changes-nav' => 'Tornar a navegação geral do site mais fácil de usar.',
	'optin-survey-answer-changes-edittools' => 'Criar mais e melhores ferramentas de edição.',
	'optin-survey-answer-changes-upload' => 'Melhorar o carregamento de conteúdo e multimédia.',
	'optin-survey-answer-changes-richtext' => 'Desenvolver ferramentas de edição semelhantes a editores avançados de texto.',
	'optin-survey-answer-changes-lookfeel' => 'Renovar o aspecto geral do site.',
	'optin-survey-answer-changes-predictability' => 'Melhorar a previsibilidade dos resultados.',
	'optin-survey-answer-changes-custom' => 'Permitir uma maior personalização para o usuário.',
	'optin-survey-answer-changes-other' => 'Outros:',
	'optin-improvements' => '== O que foi melhorado? ==
[[File:UsabilityNavigation.png|left|link=]]
;Navegação melhorada
O novo sistema de navegação torna mais fácil ver onde você está e o que você está fazendo, bem como onde pode ir e como chegar lá. Com a caixa de pesquisa localizada no canto superior direito, a funcionalidade de pesquisa é mais fácil de encontrar e mais rápida de usar.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Melhoramentos na barra de ferramentas de edição
Ícones novos e melhorados tornam mais claro que ação que cada ferramenta realiza. Seções ampliáveis reduzem o empilhamento de botões, mantendo as ferramentas menos utilizadas a apenas um clique de distância.
A seção de ajuda fornece acesso rápido a uma referência para usos comuns de código wiki.
<div style="clear:both;"></div>
== Como se envolver ==
Para aprender mais sobre o projeto ou se envolver, por favor visite a [http://usability.wikimedia.org wiki da Iniciativa de Usabilidade]. Lá você encontrará informação sobre nossa doação, pesquisa, concepção e desenvolvimento, e lançamentos. Para perguntar ou deixar comentários em geral, por favor use nossa [http://usability.wikimedia.org/wiki/Talk:Prototype página de discussão do prototipo]. Para tratar de assuntos particulares, por favor use as páginas de discussão associadas. Se você encontrar problemas, por favor deixe seus comentários na [http://usability.wikimedia.org/wiki/Talk:Releases/Acai página de discussão do Acai] ou use o [https://bugzilla.wikimedia.org Bugzilla].

Obrigado e nós estamos ansiosos para saber o que você tem a dizer!',
);

/** Quechua (Runa Simi)
 * @author AlimanRuna
 */
$messages['qu'] = array(
	'optin-title-optedout' => 'Beta nisqata llanchiy',
	'optin-title-optedin' => 'Beta nisqamanta lluqsiy',
	'optin-title-justoptedin' => 'Beta nisqaman allin hamusqayki',
	'optin-title-justoptedout' => 'Añañayki Beta nisqata llanchisqaykimanta',
	'optin-title-feedback' => 'Beta nisqamanta rimanakuy',
	'optin-needlogin' => 'Beta nisqata llanchiykachaspaykiqa, [$1 yaykunaykim] tiyan.',
	'optin-success-feedback' => 'Añañayki qillqamuwasqaykimanta!',
	'optin-accept-short' => 'Rurasunchik!',
	'optin-accept-long' => 'Beta nisqata llanchipuy',
	'optin-accept-long-anon' => 'Yaykuspa Beta nisqata llanchipuy',
	'optin-deny-short' => 'Manam munanichu',
	'optin-deny-long' => "ñawpa p'anqaman kutimuy",
	'optin-submit-out' => 'Beta nisqamanta lluqsiy',
	'optin-submit-feedback' => 'Beta nisqamanta rimanakuy',
	'optin-survey-yes' => 'Arí',
	'optin-survey-no' => 'Ama kachunchu',
);

/** Romanian (Română)
 * @author Firilacroco
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'optin-title-optedout' => 'Încercaţi Beta',
	'optin-title-optedin' => 'Părăsiţi Beta',
	'optin-title-justoptedin' => 'Bine ati venit la Beta',
	'optin-title-justoptedout' => 'Vă mulţumim că aţi încercat Beta',
	'optin-title-feedback' => 'Păreri în legătură cu Beta',
	'optin-success-feedback' => 'Vă mulţumim pentru părere!',
	'optin-accept-short' => 'S-o facem!',
	'optin-accept-long' => 'Încercaţi Beta',
	'optin-accept-long-anon' => 'Autentificaţi-vă şi încercaţi Beta',
	'optin-deny-short' => 'Nu, mulţumesc',
	'optin-deny-long' => 'Reveniţi la pagina anterioară',
	'optin-submit-out' => 'Părăsiţi Beta',
	'optin-submit-feedback' => 'Trimiteţi-vă părerea',
	'optin-survey-yes' => 'Da',
	'optin-survey-no' => 'Nu',
	'optin-survey-answer-whyoptout-notpredictable' => 'Nu s-a comportat predictibil.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Nu mi-a plăcut cum arată.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Nu mi-au plăcut filele noi şi aspectul.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Nu mi-a plăcut noua bară de unelte.',
	'optin-survey-answer-whyoptout-other' => 'Alt motiv:',
	'optin-survey-answer-browser-other' => 'Alt browser:',
	'optin-survey-answer-os-other' => 'Alt sistem de operare:',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'optin-title-optedout' => 'Pruève Beta',
	'optin-title-optedin' => 'Lasse Beta',
	'optin-title-justoptedin' => "Bovegne jndr'à Beta",
	'optin-title-feedback' => 'Segnale a Beta',
	'optin-needlogin' => 'Tu è abbesogne de [$1 trasè] pe pruvà Beta.',
	'optin-submit-feedback' => "Danne 'na segnalazione",
	'optin-survey-yes' => 'Sìne',
	'optin-survey-no' => 'None',
	'optin-survey-answer-whyoptout-other' => 'Otre mutive:',
	'optin-survey-answer-changes-other' => 'Otre:',
);

/** Russian (Русский)
 * @author AlexSm
 * @author Ferrer
 * @author Kaganer
 * @author Lockal
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'optin' => 'Участие в Инициативе юзабилити',
	'optin-desc' => 'Позволяет участникам опробовать бета-версию интерфейса («Beta») — последнее улучшение, сделанное в рамках Инициативы юзабилити.',
	'optin-title-optedout' => 'Опробование бета-версии интерфейса',
	'optin-title-optedin' => 'Покинуть Beta',
	'optin-title-justoptedin' => 'Добро пожаловать в Beta',
	'optin-title-justoptedout' => 'Благодарим вас за участие в опробовании бета-версии интерфейса',
	'optin-title-feedback' => 'Отправить отзыв',
	'optin-needlogin' => 'Вам необходимо [$1 представиться], чтобы опробовать бета-версию.',
	'optin-intro' => 'В рамках Инициативы юзабилити была проведена работа по улучшению удобства использования Википедии.
Вы хотите опробовать Beta?',
	'optin-feedback-intro' => 'Благодарим вас за согласие опробовать бета-версию интерфейса.
Нам хотелось бы знать, что вы думаете о нашем новом интерфейсе, поэтому мы были бы признательны, если бы вы приняли участие в приведённом ниже опросе.',
	'optin-feedback-back' => 'Если вы не хотите участвовать в опросе, вы можете вернуться к $1.',
	'optin-success-in' => 'Теперь вы принимаете участие в опробовании бета-версии интерфейса.
Вы можете отключиться от программы в любое время, нажав  на ссылку «{{int:optin-leave}}» в верхней части экрана.',
	'optin-leave-cancel' => 'Если вы хотите продолжить использовать бета-версию, вы можете вернуться к $1.',
	'optin-success-out' => 'Вы успешно вышли из режима опробования бета-версии интерфейса.
Вы можете ещё раз попробовать эту версию, нажав ссылку «{{int:optin-try}}» в правом верхнем углу экрана.',
	'optin-success-feedback' => 'Спасибо за отзыв!',
	'optin-accept-short' => 'Поехали!',
	'optin-accept-long' => 'Опробовать бета-версию',
	'optin-accept-long-anon' => 'Авторизоваться и опробовать бета-версию интерфейса',
	'optin-deny-short' => 'Нет, спасибо',
	'optin-deny-long' => 'Вернуться на предыдущую страницу',
	'optin-submit-out' => 'Покинуть бета-версию',
	'optin-submit-feedback' => 'Отправить отзыв',
	'optin-survey-yes' => 'Да',
	'optin-survey-no' => 'Нет',
	'optin-survey-intro' => 'Благодарим вас за участие в опробовании бета-версии интерфейса.
Нам бы хотелось знать, что вы думаете о новом интерфейсе, поэтому, перед тем, как вы нажмёте «[[#leave|{{int:optin-submit-out}}]]», мы были бы вам признательны за участие в приведённом ниже опросе.',
	'optin-survey-question-likedislike' => 'Что вам нравится в Beta? Что вам не нравится в Beta?',
	'optin-survey-question-whyoptout' => 'Почему вы покидаете Beta? (пожалуйста, выберите все подходящие значения)',
	'optin-survey-answer-whyoptout-hard' => 'Он слишком сложен в использовании.',
	'optin-survey-answer-whyoptout-didntwork' => 'Он не работает должным образом.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Она работает непредсказуемо.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Мне не нравится как она выглядит.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Мне не понравились новые вкладки и вёрстка.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Мне не понравилась новая панель редактирования.',
	'optin-survey-answer-whyoptout-other' => 'Другая причина:',
	'optin-survey-question-explain' => 'Пожалуйста, объясните или уточните ваш ответ выше:',
	'optin-survey-question-techfail' => 'Вы столкнулись с какими-либо техническими сбоями при использовании Beta?',
	'optin-survey-question-techfail-ifyes' => 'Если да, то пожалуйста уточните или объясните:',
	'optin-survey-question-usedtoolbar' => 'Вы использовали новую разворачивающуюся панель инструментов для редактирования страниц?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Если да, то, что вам в ней понравилось? Что не понравилось?',
	'optin-survey-question-usedtoolbar-ifno' => 'Если нет, то почему? Собираетесь ли в будущем? Пожалуйста, объясните.',
	'optin-survey-question-different' => 'Что мы могли бы переделать, чтобы вы продолжили использовать нашу Beta?',
	'optin-survey-question-feedback' => 'Пожалуйста, сообщите нам своё мнение:',
	'optin-survey-question-browser' => 'Какой браузер вы используете?',
	'optin-survey-answer-browser-ie5' => 'Internet Explorer 5',
	'optin-survey-answer-browser-ie6' => 'Internet Explorer 6',
	'optin-survey-answer-browser-ie7' => 'Internet Explorer 7',
	'optin-survey-answer-browser-ie8' => 'Internet Explorer 8',
	'optin-survey-answer-browser-ff1' => 'Firefox 1',
	'optin-survey-answer-browser-ff2' => 'Firefox 2',
	'optin-survey-answer-browser-ff3' => 'Firefox 3',
	'optin-survey-answer-browser-cb' => 'Google Chrome Beta',
	'optin-survey-answer-browser-c1' => 'Google Chrome 1',
	'optin-survey-answer-browser-c2' => 'Google Chrome 2',
	'optin-survey-answer-browser-s3' => 'Safari 3',
	'optin-survey-answer-browser-s4' => 'Safari 4',
	'optin-survey-answer-browser-o9' => 'Opera 9',
	'optin-survey-answer-browser-o9.5' => 'Opera 9.5',
	'optin-survey-answer-browser-o10' => 'Opera 10',
	'optin-survey-answer-browser-other' => 'Другой браузер:',
	'optin-survey-question-os' => 'Какую операционную систему вы используете?',
	'optin-survey-answer-os-windows' => 'Windows',
	'optin-survey-answer-os-macos' => 'Mac OS',
	'optin-survey-answer-os-linux' => 'Linux',
	'optin-survey-answer-os-other' => 'Другая операционная система:',
	'optin-survey-question-res' => 'Каково разрешение вашего монитора?',
	'optin-survey-question-changes' => 'Какие изменения вы хотели бы увидеть в будущих бета-версиях (выберите все подходящие пункты)?',
	'optin-survey-answer-changes-nav' => 'Сделать навигацию по всему сайту более простой в использовании.',
	'optin-survey-answer-changes-edittools' => 'Расширить и усовершенствовать инструменты редактирования.',
	'optin-survey-answer-changes-upload' => 'Усовершенствовать загрузку содержания и медиа.',
	'optin-survey-answer-changes-richtext' => 'Разработать инструменты редактирования, аналогичные текстовым редакторам.',
	'optin-survey-answer-changes-lookfeel' => 'Обновить «внешний вид» сайта.',
	'optin-survey-answer-changes-predictability' => 'Улучшить предсказуемость работы.',
	'optin-survey-answer-changes-custom' => 'Позволить производить больше индивидуальных настроек.',
	'optin-survey-answer-changes-other' => 'Иное:',
	'optin-improvements' => '== Что было улучшено? ==
[[File:UsabilityNavigation.png|left]]
; Усовершенствование навигации 
Новая система навигации позволяет проще понять, где вы находитесь и что делаете, а также — куда вы можете перейти и как туда попасть. С полем поиска, расположенным в верхнем правом углу, искать становится проще и быстрее.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left]]
; Улучшение панели редактирования
Новые и улучшенные значки более точно показывают соответствие инструментов и выполняемых ими действий. Раскрываемые разделы уменьшают беспорядок, сохраняя при этом редко используемые инструменты на расстоянии щелчка мыши. Справочный раздел обеспечивает быстрый доступ к примерам по наиболее часто используемым типам вики-разметки.
<div style="clear:both;"></div>
== Как подключиться ==

Чтобы узнать больше о проекте, а также принять в нём участие — посетите, пожалуйста, [http://usability.wikimedia.org вики-сайт Инициативы юзабилити]. Там вы найдёте информацию о наших грантах, научных исследованиях, проектировании, релизах. Чтобы задать вопрос или оставить общий отзыв, воспользуйтесь нашей [http://usability.wikimedia.org/wiki/Talk:Prototype страницей обсуждения прототипа]. Для решения конкретных вопросов, пожалуйста, используйте соответствующие страницы обсуждения. Если вы нашли ошибку, оставьте, пожалуйста, свои замечания на [http://usability.wikimedia.org/wiki/Talk:Releases/Acai странице обсуждения выпуска Acai] или с помощью [https://bugzilla.wikimedia.org Bugzilla].

Благодарим за внимание и ждём ваших отзывов!',
);

/** Yakut (Саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'optin-title-optedout' => 'Beta-ны тургутуу',
	'optin-title-optedin' => 'Beta-ттан тахсыы',
	'optin-title-justoptedin' => 'Beta-ҕа нөрүөн нөргүй!',
	'optin-title-justoptedout' => 'Beta-ны тургутан көрбүккэр махтал',
	'optin-title-feedback' => 'Сыанабылы ыытарга',
	'optin-needlogin' => 'Beta тургутарга [$1 ааккын билиһиннэриэххин] наада.',
	'optin-feedback-intro' => 'Beta-ны туттубуккар махтанабыт.
Саҥа интерфейс туһунан туох санаалааххын билиэхпитин баҕарабыт, онон аллара баар ыйытыыларга хоруйдууруҥ буоллар наһаа үөрүө этибит.',
	'optin-feedback-back' => 'Ыйытыкка кыттыаххын баҕарбат буоллаххына, төннүөххүн сөп $1.',
	'optin-success-in' => 'Beta-ны тургутууга кыттан эрэҕин.
Мантан хаһан баҕарар тахсыаххын сөп: экран үөһээ өттүгэр "{{int:optin-leave}}" диэни баттаан.',
	'optin-leave-cancel' => 'Beta-ны туттан бүттэххинэ төннүөххүн сөп $1.',
	'optin-success-out' => 'Beta-ттан таҕыстыҥ.
Өссө боруобалыаххын сөп: экран хаҥас үөһээ өттүгэр "{{int:optin-try}}" диэни баттаан.',
	'optin-success-feedback' => 'Сыанаҥ иһин махтал!',
	'optin-accept-short' => 'Бардыбыт!',
	'optin-accept-long' => 'Beta-ны тургутарга',
	'optin-accept-long-anon' => 'Ааккын билиһиннэрэн баран Beta-ны тургутарга',
	'optin-deny-short' => 'Суох, махтанабын',
	'optin-deny-long' => 'Бу иннинээҕи сирэйгэ төннөргө',
	'optin-submit-out' => 'Beta-ттан тахсарга',
	'optin-submit-feedback' => 'Сыанабылы ыытыы',
	'optin-survey-yes' => 'Сөп',
	'optin-survey-no' => 'Суох',
	'optin-survey-intro' => 'Beta-ны боруобалаабыккар махтал.
Саҥа интерфейс туһунан туох санаалааххын билиэхпитин баҕарабыт, ол иһин "[[#leave|{{int:optin-submit-out}}]]" баттыаҥ иннинэ манна баар ыйытыыларга хоруйдууруҥ буоллар наһаа үөрүө этибит.',
	'optin-survey-question-likedislike' => 'Beta тугун сөбүлээтиҥ? Тугун сөбүлээбэтиҥ?',
	'optin-survey-question-whyoptout' => 'Тоҕо Beta-ттан тахсарга сананныҥ? (сөп түбэһэр хоруйдары тал эрэ)',
	'optin-survey-answer-whyoptout-hard' => 'Туттарга наһаа ыарахан.',
	'optin-survey-answer-whyoptout-didntwork' => 'Сатаан үлэлээбэт.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Хайдах үлэлиирэ оччо "дьэҥкирэ" суох.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Тас көрүҥүн оччо сөбүлээбэтим.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Саҥа кыбытыктары (вкладки) уонна макеты оччо сөбүлээбэтим.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Эрэдээксийэлиир саҥа панелы сөбүлээбэтим.',
	'optin-survey-answer-whyoptout-other' => 'Атын төрүөт:',
	'optin-survey-question-explain' => 'Бука диэн хоруйгун быһаар эбэтэр чуолкайдаа:',
	'optin-survey-question-techfail' => 'Beta-ны туттарга ханнык эмит техника кэмэлдьитин көрүстүҥ дуо?',
	'optin-survey-question-techfail-ifyes' => 'Оннук буоллаҕына, бука диэн, чуолкайдаа эбэтэр быһаар:',
	'optin-survey-question-usedtoolbar' => 'Сирэйдэри эрэдээксийэлииргэр уҥа тэнийэр панелы туһанныҥ дуо?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Оннук буллаҕына, тугун сөбүлээтиҥ? Тугун астымматыҥ?',
	'optin-survey-question-usedtoolbar-ifno' => 'Суох буоллаҕына, тоҕо? Кэлин туттуоҥ дуу? Бука диэн, быһаар эрэ.',
	'optin-survey-question-different' => 'Beta-ны кэлин да туһанарыҥ туһугар тугу оҥоруохпутун сөбүй?',
	'optin-survey-question-feedback' => 'Бука диэн, бэйэҥ санааҕын эт эрэ:',
	'optin-survey-question-browser' => 'Ханнык браузерынан туһанаҕын?',
	'optin-survey-answer-browser-other' => 'Атын браузер:',
	'optin-survey-question-os' => 'Ханнык операционнай систиэмэни туһанаҕын?',
	'optin-survey-answer-os-other' => 'Атын ОС:',
	'optin-survey-question-res' => 'Эн мониторуҥ разрешениета төһөнүй?',
	'optin-survey-question-changes' => 'Beta-ҕа кэлин ханнык уларытыылары киллэриэххэ сөбүй? (барытын талыаххын сөп)',
	'optin-survey-answer-changes-nav' => 'Саайт навигациятын туттарга арыый судургу гыныахха.',
	'optin-survey-answer-changes-edittools' => 'Эрэдээксийэлиир үнүстүрүмүөннэри элбэтэргэ уонна тупсарарга.',
	'optin-survey-answer-changes-upload' => 'Иһинээҕитин уонна медиатын хачайдыыры тупсарарга.',
	'optin-survey-answer-changes-richtext' => 'Тиэкис эрэдээктэрдэригэр баар үнүстурүмүөннэргэ майгынныыр үнүстүрүмүөннэри эбэргэ.',
	'optin-survey-answer-changes-lookfeel' => 'Саайт тас көстүүтүн уларытарга.',
	'optin-survey-answer-changes-predictability' => 'Үлэлиирэ "дьэҥкирин" ситиһэргэ.',
	'optin-survey-answer-changes-custom' => 'Тус туруоруулары өссө киэҥник уларытары көҥүллүүргэ.',
	'optin-survey-answer-changes-other' => 'Атын:',
	'optin-improvements' => '== Туох тупсарыллыбытый? ==
[[File:UsabilityNavigation.png|left|link=]]
; Навигацията тупсуута  
Саҥа навигация систиэмэтэ ханна билигин сылдьаргын, тугу гынаргын, уонна ханна хайдах барыаххын сөбүн кэбэҕэстик өйдүүргэ көмөлөһөр. Үөһээ уҥа муннукка баар көрдүүр түннүгү туттарга ордук табыгастаах.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
; Эрэдээксийэлиир панел тупсуута
Саҥа тупсарыллыбыт значоктар ханнык үнүстүрүмүөн ханнык үлэни оҥорорун ордук үчүгэйдик көрдөрөллөр. Аһыллар салаалар булкууру аҕыйаталлар, ол да буоллар сэдэхтик туттуллар үнүстүрүмүөннэри чугас илдьэ сылдьарга көмөлөһөллөр. Көмө салаата биики-бэлиэлэри сөпкө туһанар туһунан холобурдары түргэнник көрөргө табыгастаах. 
<div style="clear:both;"></div>

== Хайдах кыттабыный ==

Бу бырайыак туһунан сиһилии билиэххитин баҕарар буоллаххытына бу [http://usability.wikimedia.org биики-саайка] киириҥ. Онно биһиги грааннарбыт, чинчийиилэрбит, бырайыактарбыт уонна бырагырааммаларбыт барылларын туһунан информацияны булуоххут. Тугу эрэ ыйытаары гыннаххытына эбэтэр бородууксуйабыт туһунан тугу эрэ этиэххитин баҕардаххытына [http://usability.wikimedia.org/wiki/Talk:Prototype ырытыы сирэйигэр] киириҥ. Чопчу боппуруостары аналлаах ырытар сирэйдэргэ быһаарсыҥ. Туох эмит алҕаһы булбут буоллаххытына бука диэн   [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai тахсыытын ырытыытыгар суруйуҥ] эбэтэр [https://bugzilla.wikimedia.org Bugzilla] көмөтүнэн биллэриҥ.

Махтанабыт, суруккутун кэтэһэбит!',
);

/** Sicilian (Sicilianu)
 * @author Melos
 */
$messages['scn'] = array(
	'optin-accept-short' => 'Prova!',
	'optin-accept-long' => 'Prova a Beta',
	'optin-accept-long-anon' => 'Accedi e prova a Beta',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'optin' => 'Prihlásenie do Iniciatívy použiteľnosti',
	'optin-desc' => 'Umožňuje používateľom skúsiť Beta, najnovšie rozšírenia použiteľnosti Iniciatívy použiteľnosti',
	'optin-title-optedout' => 'Skúsiť Beta',
	'optin-title-optedin' => 'Opustiť Beta',
	'optin-title-justoptedin' => 'Vitajte v Beta',
	'optin-title-justoptedout' => 'Ďakujeme, že ste skúsili Beta',
	'optin-title-feedback' => 'Vaše komentáre',
	'optin-needlogin' => 'Ak sa chcete skúsiť Beta, musíte sa najskôr [$1 prihlásiť].',
	'optin-intro' => 'Iniciatíva použiteľnosti projektu Wikipédia pracuje s cieľom vylepšiť použiteľnosť Wikipédie. Chcete skúsiť Beta?',
	'optin-feedback-intro' => 'Ďakujeme, že ste skúsili Beta.
Radi by sme vedeli, čo si o našom novom rozhraní myslíte, preto by sme ocenili, keby ste vyplnili nasledovný nepovinný dotazník.',
	'optin-feedback-back' => 'Ak nechcete dotazník vyplniť, môžete sa vrátiť na $1.',
	'optin-success-in' => 'Teraz skúšate Beta.
Kedykoľvek môžete skúšanie opustiť kliknutím na „{{int:optin-leave}}“ v pravom hornom rohu.',
	'optin-leave-cancel' => 'Ak si želáte pokračovať v používaní Beta, môžete sa vrátiť späť na $1',
	'optin-success-out' => 'Úspešne ste opustili Beta.
Kedykoľvek ho môžete znova vyskúšať kliknutím na „{{int:optin-try}}“ v pravom hornom rohu.',
	'optin-success-feedback' => 'Ďakujeme za vaše komentáre!',
	'optin-accept-short' => 'Urobme to!',
	'optin-accept-long' => 'Vyskúšať Beta',
	'optin-accept-long-anon' => 'Prihlásiť sa a skúsiť Beta',
	'optin-deny-short' => 'Nie, ďakujem',
	'optin-deny-long' => 'späť na predošlú stránku',
	'optin-submit-out' => 'Opustiť Beta',
	'optin-submit-feedback' => 'Vaše komentáre',
	'optin-survey-yes' => 'Áno',
	'optin-survey-no' => 'Nie',
	'optin-survey-intro' => 'Ďakujeme, že ste skúsili Beta.
Chceli by sme vedieť, čo si myslíte o novom rozhraní, takže by sme ocenili keby ste vyplnili tento nepovinný dotazník predtým, než kliknete na „[[#leave|{{int:optin-submit-out}}]]“ nižšie.',
	'optin-survey-question-likedislike' => 'Čo sa vám na Beta páčilo? Čo sa vám nepáčilo?',
	'optin-survey-question-whyoptout' => 'Prečo opúšťate skúšanie tohto testovacieho rozhrania? (prosím, označte všetky relevantné dôvody)',
	'optin-survey-answer-whyoptout-hard' => 'Bolo príliš ťažké ho používať.',
	'optin-survey-answer-whyoptout-didntwork' => 'Nefungovalo správne.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Nesprávalo sa predvídateľne.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Nepáčilo sa mi ako vyzará.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Nepáčili sa mi nové záložky a rozloženie.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Nepáčil sa mi nový panel nástrojov.',
	'optin-survey-answer-whyoptout-other' => 'Iný dôvod:',
	'optin-survey-question-explain' => 'Prosím, vysvetlite alebo rozveďte svoju odpoveď, ktorú ste uviedli vyššie:',
	'optin-survey-question-techfail' => 'Nastali u vás nejaké technické problémy súvisiace s používaním Beta?',
	'optin-survey-question-techfail-ifyes' => 'Ak áno, rozveďte alebo vysvetlite ich, prosím:',
	'optin-survey-question-usedtoolbar' => 'Používali ste nový rozšíriteľný panel nástrojov na upravovanie stránky?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Ak áno, čo sa vám na ňom páčilo? Čo sa vám nepáčilo?',
	'optin-survey-question-usedtoolbar-ifno' => 'Ak nie, prečo? Skúsite v budúcnosti? Vysvetlite, prosím.',
	'optin-survey-question-different' => 'Čo sme mohli spraviť inak aby ste neprestali používať testovacie rozhranie Beta?',
	'optin-survey-question-feedback' => 'Ak máte ďalšie komentáre, napíšte ich prosím:',
	'optin-survey-question-browser' => 'Ktorý prehliadač používate?',
	'optin-survey-answer-browser-other' => 'Iný prehliadač:',
	'optin-survey-question-os' => 'Ktorý operačný systém používate?',
	'optin-survey-answer-os-other' => 'Iný operačný systém:',
	'optin-survey-question-res' => 'Aké je rozlíšenie vašej obrazovky?',
	'optin-survey-question-changes' => 'Aké zmeny by ste radi videli v Beta v budúcnosti (prosím, vyberte všetky, ktoré chcete)?',
	'optin-survey-answer-changes-nav' => 'Celkovo uľahčiť navigáciu po webovej lokalite.',
	'optin-survey-answer-changes-edittools' => 'Zväčšiť počet a vylepšiť nástroje na úpravy.',
	'optin-survey-answer-changes-upload' => 'Zlepšiť obsah a nahrávanie multimediálnych súborov.',
	'optin-survey-answer-changes-richtext' => 'Vyvinúť nástroje na úpravu podobné editorom obohateného textu.',
	'optin-survey-answer-changes-lookfeel' => 'Aktualizovať „vzhľad a správanie“ webovej lokality.',
	'optin-survey-answer-changes-predictability' => 'Zlepšiť predpovedateľnosť výkonnosti.',
	'optin-survey-answer-changes-custom' => 'Umožniť používateľom väčšiu prispôsobiteľnosť',
	'optin-survey-answer-changes-other' => 'Iné:',
	'optin-improvements' => '== Čo bolo zlepšené? ==
[[File:UsabilityNavigation.png|left|link=]]
;Rozšírená navigácia
Vďaka novému navigačnému systému je jednoduchšie rozlíšiť, kde sa nachádzate a tiež kam a ako sa môžete dostať. Vďaka vyhľadávaciemu poľu v pravom hornom rohu je prístup jednoduchší a vyhľadávanie rýchlejšie.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Vylepšenia panelu úprav
Nové a vylepšené ikony vyjasňujú čo ktorý nástroj robí.
Rozbaliteľné časti skrývajú zriedka používané nástroje, pričom sú stále len o jedno kliknutie ďalej.
Časť Pomocník poskytuje rýchly prístup do referenčnej dokumentácie bežného ppoužitia wiki syntaxe.
<div style="clear:both;"></div>

== Ako sa zapojiť ==
Ak sa chcete dozvedieť viac o projekte alebo sa zapojiť, navštívte prosím [http://usability.wikimedia.org wiki Iniciatívy použiteľnosti]. Nájdete na nej informácie o našom grante, výskume, dizajne a vývoji a vydaniach. Ak sa chcete pýtať otázky alebo napísať všeobecné komentáre, prosím, použite našu [http://usability.wikimedia.org/wiki/Talk:Prototype diskusnú stránku prototypu]. Ak sa týkajú konkrétnych problémov, komentujte na [http://usability.wikimedia.org/wiki/Talk:Releases/Acai diskusnej stránke vydania Acai] alebo pomocou [https://bugzilla.wikimedia.org Bugzilla].

Ďakujeme a tešíme sa na vašu odozvu!',
);

/** Slovenian (Slovenščina)
 * @author Smihael
 */
$messages['sl'] = array(
	'optin' => 'Vtičnik Usability Initiative (Pobuda za uporabnost)',
	'optin-desc' => 'Omogoča uporabnikom, da preizkusjo Beta različico spletišča, najnovejše izboljšave k uporabnosti.',
	'optin-title-optedout' => 'Poskusite Beta različico',
	'optin-title-optedin' => 'Zapusti Beta različico',
	'optin-title-justoptedin' => 'Dobrodošli v Beta različico',
	'optin-title-justoptedout' => 'Hvala, ker ste preizkusili našo Beta različico',
	'optin-title-feedback' => 'Povratne informacije Beta različice',
	'optin-needlogin' => 'Za preizkus Beta različice je potrebna [$1 prijava].',
	'optin-intro' => 'Wikipedijina Pobuda za uporabnost si prizadeva za izboljšanje uporabnosti Wikipedije. Želite preizkusite našo Beta različico?',
	'optin-feedback-intro' => 'Zahvaljujemo se vam za preizkušanje Beta različice.
Ker bi radi vedeli, kaj mislite o našem novem vmesniku, bi cenili če izpolnite spodnjo (neobvezno) anketo.',
	'optin-feedback-back' => 'Če ne želite izpolniti ankete, se lahko vrnete v $1.',
	'optin-success-in' => 'Sedaj preizkušate Beta različico.
Kadarkoli se lahko vrnete s klikom na povezavo »{{int:optin-leave}}« na vrhu strani.',
	'optin-leave-cancel' => 'Če želite nadaljevati z uporabo Beta različice, se lahko vrnete na $1.',
	'optin-success-out' => 'Uspešno ste zapustili Beta različico. 
Lahko jo poskusite znova kadarkoli s klikom na povezavo »{{int:optin-try}}« na vrhu strani.',
	'optin-success-feedback' => 'Zahvaljujemo se vam za povratne informacije!',
	'optin-accept-short' => 'Seveda!',
	'optin-accept-long' => 'Preizkusite Beta različico',
	'optin-accept-long-anon' => 'Prijavite se in preizkusite Beta različico',
	'optin-deny-short' => 'Ne, hvala',
	'optin-deny-long' => 'Vrni se na prejšnjo stran',
	'optin-submit-out' => 'Zapusti Beta različico',
	'optin-submit-feedback' => 'Pošlji povratne informacije',
	'optin-survey-yes' => 'Da',
	'optin-survey-no' => 'Ne',
	'optin-survey-intro' => 'Zahvaljujemo se vam za preizkušanje Beta različice.

Želimo vedeti, kaj mislite o našem novem vmesniku, zato bi cenili, če boste izpolnili neobvezno anketo preden kliknete »[[#leave|{{int:optin-submit-out}}]]«.',
	'optin-survey-question-likedislike' => 'Kaj vam je bilo pri Beta različici všeč? Česa niste marali?',
	'optin-survey-question-whyoptout' => 'Zakaj zapuščate Beta različico? (Označite lahko več možnosti.)',
	'optin-survey-answer-whyoptout-hard' => 'Prezapletena uporaba.',
	'optin-survey-answer-whyoptout-didntwork' => 'Nepravilno delovanje.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Nepredvidljivo delovanje.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Izgled mi ni všeč.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Postavitev in novi zavihki mi niso všeč.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Nova orodna vrstica mi ni všeč.',
	'optin-survey-answer-whyoptout-other' => 'Drug razlog:',
	'optin-survey-question-explain' => 'Prosimo, pojasnite vaš zgornji odgovor:',
	'optin-survey-question-techfail' => 'Ste med uporabo Beta različice nalateli na kakšno tehnično napako?',
	'optin-survey-question-techfail-ifyes' => 'Če je odgovor pritrdilen, ga prosimo pojasnite:',
	'optin-survey-question-usedtoolbar' => 'Ali ste uporabili novo razširljivo orodno vrstico za urejanje strani?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Če je odgovor pritrdilen, kaj vam je bilo všeč? Česa niste marali?',
	'optin-survey-question-usedtoolbar-ifno' => 'Če je odgovor nikalen, zakaj ne? Jo boste preizkusili v prihodnje? Prosimo, pojasnite.',
	'optin-survey-question-different' => 'Kaj bi lahko naredili drugače, da bi nadaljevali z uporabo Beta različice?',
	'optin-survey-question-feedback' => 'V primeru kakršnih koli drugih pripomb, idej ali misli o Beta različice, vas prosimo, da nam jih zaupate - vse povratne informacije so koristne:',
	'optin-survey-question-browser' => 'Kateri brskalnik uporabljate?',
	'optin-survey-answer-browser-other' => 'Drug brskalnik:',
	'optin-survey-question-os' => 'Kateri operacijski sistem uporabljate?',
	'optin-survey-answer-os-other' => 'Drug operacijski sistem:',
	'optin-survey-question-res' => 'Kakšna je ločljivost vašega zaslona?',
	'optin-survey-question-changes' => 'Kakšne spremembe želite videti v Beta različici v prihodnosti (izberete lahko več možnosti)?',
	'optin-survey-answer-changes-nav' => 'Poenostavite navigacijo.',
	'optin-survey-answer-changes-edittools' => 'Izboljšajte orodja za urejanje strani.',
	'optin-survey-answer-changes-upload' => 'Izboljšanje dodajanje vsebine in nalaganje večpredstavnostnih datotek.',
	'optin-survey-answer-changes-richtext' => 'Razvijte orodja za urejanje strani tako, da bodo bolj podobna vizualnim urejevalnikom besedila.',
	'optin-survey-answer-changes-lookfeel' => 'Posodobite izgled strani.',
	'optin-survey-answer-changes-predictability' => 'Izboljšajte predvidljivost delovanja.',
	'optin-survey-answer-changes-custom' => 'Omogočite uporabniku večjo prilagoditev.',
	'optin-survey-answer-changes-other' => 'Drugo:',
	'optin-improvements' => '== Kaj je bilo izboljšano? ==
[[File:UsabilityNavigation.png|left|link=]]
;Izboljšana navigacija
Nov sistem navigacije postavi informacijo tako o tem kje na spletišču ste, kaj počnete, kot kam lahko greste in od kod ste prišli na lažje dosegljivo mesto. S prestavitvijo iskalnega polja v zgornji desni kot, je funkcijo iskanja lažje najdi in jo hitreje uporabiti.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Izboljšave orodne vrstice
Z novimi izboljšanimi ikonami je vsakomur takoj jasno, katero dejanje izvede določeno orodje. Raširljivi razdelki zmanjšajo porabo prostora med tem, ko so vse posogto uporabljene funkcije le klik stran.
Razdelek Pomoč ponuja hiter dostop do preprostih do referenc uporabe posameznega wiki-oblikovanja.
<div style="clear:both;"></div>
== Želim sodelovati ==
Če želite izvedeti več o projektu ali pri njem sodelovati, prosimo obiščite [http://usability.wikimedia.org stran Wikipedijine Pobude za uporabnost].  Tu boste našli informacije o naših podelitvah, raziskavah, oblikovanju in razvoju ter izdajah. Splošna vprašanja lahko zastavite na [http://usability.wikimedia.org/wiki/Talk:Prototype pogovorni strani o prototipu]. Tu lahko pustite tudi povratno informacijo. Za obravnavo specifičnih zadev, prosimo uporabite primerne, s temo povezane, pogovorne strani. Če ste odkrili programske napake, nam pustite vaše komentarje na [http://usability.wikimedia.org/wiki/Talk:Releases/Acai pogovorni strani Acai] oz. poročajte o hrošču prek [https://bugzilla.wikimedia.org Bugzille].

Hvala, veselimo se vaših mnenj!',
);

/** Serbian Cyrillic ekavian (Српски (ћирилица))
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'optin' => 'Прикључивање Иницијативи за употребљивост',
	'optin-desc' => 'Омогућава корисницима да се опробају са бета-верзијом тј. последњим побољшањима Иницијативе за употребљивост.',
	'optin-title-optedout' => 'Пробај бета-верзију',
	'optin-title-optedin' => 'Напусти бета-верзију',
	'optin-title-justoptedin' => 'Добро дошли на бета-верзију',
	'optin-title-justoptedout' => 'Хвала Вам за испробавање бета-верзије',
	'optin-title-feedback' => 'Повратна информација у вези са бета-верзијом',
	'optin-needlogin' => 'Морате се [$1 улоговати] да бисте пробали бета-верзију.',
	'optin-intro' => 'Википедијина Иницијатива за употребљивост је вредно радила да би побољшала употребљивост Википедије.
Да ли бисте желели да пробате нашу бета-верзију?',
	'optin-feedback-intro' => 'Хвала вам за испробавање бета-верзије.
Волели бисмо да знамо шта мислите о нашем новом интерфејсу, тако да би нам било драго када бисте испунили необавезну анкету испод.',
	'optin-feedback-back' => 'Ако не желите да учествујете у анкети, можете се вратити на $1.',
	'optin-success-in' => 'Сада испробавате бета-верзију.
У свако доба се можете вратити на претходну верзују, кликом на „{{int:optin-leave}}“, у левом горњем делу стране.',
	'optin-leave-cancel' => 'Ако бисте желели да продужите са коришћењем бета-верзије, можете се вратити на $1.',
	'optin-success-out' => 'Успешно сте напустили бета-верзију.
Можете опет прећи на њу у свако доба, кликом на „{{int:optin-try}}“ везу у горњем десном углу стране.',
	'optin-success-feedback' => 'Хвала Вам за повратну информацију!',
	'optin-accept-short' => 'Хајде да то урадимо!',
	'optin-accept-long' => 'Пробајте бета-верзију',
	'optin-accept-long-anon' => 'Улогујте се и пробајте бета-верзију',
	'optin-deny-short' => 'Не, хвала',
	'optin-deny-long' => 'Повратак на претходну страну',
	'optin-submit-out' => 'Напусти бета-верзију',
	'optin-submit-feedback' => 'Пошаљи коментар',
	'optin-survey-yes' => 'Да',
	'optin-survey-no' => 'Не',
	'optin-survey-intro' => 'Хвала Вам за испробавање бета-верзије.
Волели бисмо да знамо шта мислите о нашем новом интерфејсу, тако да би нам значило да испуните необавезну анкету испод пре него што кликнете „[[#leave|{{int:optin-submit-out}}]]“.',
	'optin-survey-question-likedislike' => 'Шта Вам се свидело на бета-верзији? А шта вам се није свидело?',
	'optin-survey-question-whyoptout' => 'Зашто напуштате бета-верзију? (Молимо Вас да означите све што је на то утицало.)',
	'optin-survey-answer-whyoptout-hard' => 'Био је претежак за коришћење.',
	'optin-survey-answer-whyoptout-didntwork' => 'Није радио како треба.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Није радио предвидиво.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Није ми се свидело како изгледа.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Нису ми се свидели нови табови и изглед.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Није ми се свидео нови тулбар.',
	'optin-survey-answer-whyoptout-other' => 'Други разлог:',
	'optin-survey-question-explain' => 'Молимо Вас да објасните или проширите Ваш одговор изнад:',
	'optin-survey-question-techfail' => 'Да ли сте се сусрели са техничким грешкама док сте користили бета-верзију?',
	'optin-survey-question-techfail-ifyes' => 'Ако да, молимо Вас да нам о томе кажете нешто опширније:',
	'optin-survey-question-usedtoolbar' => 'Да ли сте користили нов раширив тулбар за измену стране?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Ако јесте, шта Вам се свидело у вези са њим? А шта Вам се није свидело?',
	'optin-survey-question-usedtoolbar-ifno' => 'Ако не, зашто нисте? Да ли ћете? Молимо Вас за објашњење.',
	'optin-survey-question-different' => 'Шта бисмо могли да урадимо, да бисте наставили да користите бета-верзију?',
	'optin-survey-question-feedback' => 'Слободно нам пишите, ако имате било каквих других коментара, прмедби или размишљања — свака повратна информација је добродошла!',
	'optin-survey-question-browser' => 'Који браузер користите?',
	'optin-survey-answer-browser-other' => 'Други браузер:',
	'optin-survey-question-os' => 'Који оперативни систем користите?',
	'optin-survey-answer-os-other' => 'Други оперативни систем:',
	'optin-survey-question-res' => 'Која је резолуција Вашег екрана?',
	'optin-survey-question-changes' => 'Које измене бисте волели да видите на бета-верзији у убудћности (молимо Вас да изаберете све што одговара)?',
	'optin-survey-answer-changes-nav' => 'Поједностављење целокупне навигације сајтом.',
	'optin-survey-answer-changes-edittools' => 'Проширење и побољшавање алата за измену чланка.',
	'optin-survey-answer-changes-upload' => 'Побољшање интерфејса за слање садржаја и медија фајлова.',
	'optin-survey-answer-changes-richtext' => 'Развој алата за измену чланака у смеру едитора за богати текст.',
	'optin-survey-answer-changes-lookfeel' => 'Измена изгледа сајта.',
	'optin-survey-answer-changes-predictability' => 'Побољшање предвидивости перформанси.',
	'optin-survey-answer-changes-custom' => 'Омогућавање веће прилагодљивости кориснику.',
	'optin-survey-answer-changes-other' => 'Друго:',
);

/** Serbian Latin ekavian (Srpski (latinica))
 * @author Michaello
 */
$messages['sr-el'] = array(
	'optin-survey-yes' => 'Da',
	'optin-survey-no' => 'Ne',
	'optin-survey-answer-whyoptout-hard' => 'Bio je pretežak za korišćenje.',
	'optin-survey-answer-whyoptout-didntwork' => 'Nije radio kako treba.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Nije radio predvidivo.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Nije mi se svidelo kako izgleda.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Nisu mi se svideli novi tabovi i izgled.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Nije mi se svideo novi tulbar.',
	'optin-survey-answer-whyoptout-other' => 'Drugi razlog:',
	'optin-survey-question-browser' => 'Koji brauzer koristite?',
	'optin-survey-answer-browser-other' => 'Drugi brauzer:',
	'optin-survey-question-os' => 'Koji operativni sistem koristite?',
	'optin-survey-answer-os-other' => 'Drugi operativni sistem:',
	'optin-survey-question-res' => 'Koja je rezolucija Vašeg ekrana?',
	'optin-survey-answer-changes-other' => 'Drugo:',
);

/** Swedish (Svenska)
 * @author Hannibal
 * @author Micke
 * @author Rotsee
 */
$messages['sv'] = array(
	'optin' => "Delta i ''Wikipedias initiativ för användarvänlighet''",
	'optin-desc' => "Tillåt användare att prova betaversionen, ''Wikipedias initiativ för användarvänlighet''s senaste förbättring.",
	'optin-title-optedout' => 'Prova betaversionen',
	'optin-title-optedin' => 'Lämna betatestet',
	'optin-title-justoptedin' => 'Välkommen till betaversionen',
	'optin-title-justoptedout' => 'Tack för att du deltar i vårt betatest',
	'optin-title-feedback' => 'Feedback för betaversionen',
	'optin-needlogin' => 'Du måste [$1 logga in] för att delta i betatestet.',
	'optin-intro' => "''Wikipedias initiativ för användarvänlighet'' har arbetat hårt för att förbättra Wikipedias användarvänlighet.
Skulle du vilja prova vår betaversion?",
	'optin-feedback-intro' => "Tack för att du deltar i betatestet. Vi vill veta vad du tycker om vårt nya gränssnitt, så vi skulle uppskatta om du fyllde i enkäten nedan.

'''Notera att eventuella kommentarer bör skrivas på engelska, för att hela testteamet skall kunna läsa dem!'''",
	'optin-feedback-back' => 'Om du inte vill fylla i enkäten kan du återgå till $1.',
	'optin-success-in' => 'Du använder nu betaversionen.
Du kan välja att gå tillbaka när som helst genom att klicka på "{{int:optin-leave}}"-länken högst upp på sidan.',
	'optin-leave-cancel' => 'Om du vill fortsätta använda betaversionen kan du återgå till $1.',
	'optin-success-out' => 'Du har nu lämnat betatestet.
Du kan prova betaversionen igen när som helst genom att klicka på "{{int:optin-try}}"-länken överst till höger på sidan.',
	'optin-success-feedback' => 'Tack för din feedback!',
	'optin-accept-short' => 'Gör det!',
	'optin-accept-long' => 'Prova betaversionen',
	'optin-accept-long-anon' => 'Logga in och prova betaversionen',
	'optin-deny-short' => 'Nej tack',
	'optin-deny-long' => 'Återgå till föregående sida',
	'optin-submit-out' => 'Lämna betatest',
	'optin-submit-feedback' => 'Ge feedback',
	'optin-survey-yes' => 'Ja',
	'optin-survey-no' => 'Nej',
	'optin-survey-intro' => "Tack för att du provar betaversionen. Vi vill veta vad du tycker om vårt nya gränssnitt, så vi skulle uppskatta om du svarar på enkäten nedan innan du klickar på \"[[#leave|{{int:optin-submit-out}}]]\".


'''Notera att eventuella kommentarer bör skrivas på engelska, för att hela testteamet skall kunna läsa dem!'''",
	'optin-survey-question-likedislike' => 'Vad tyckte du var bra i betaversionen? Vad tyckte du inte om?',
	'optin-survey-question-whyoptout' => 'Varför lämnar du betaversionen? (Välj allt som passar in.)',
	'optin-survey-answer-whyoptout-hard' => 'Den var för svårt att använda.',
	'optin-survey-answer-whyoptout-didntwork' => 'Den fungerade inte ordentligt.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Saker fungerade inte som jag väntade mig.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Jag tyckte inte om utseendet.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Jag tyckte inte om de nya flikarna och layouten.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Jag tyckte inte om det nya verktygsfältet.',
	'optin-survey-answer-whyoptout-other' => "Annan orsak ''(endast engelska)'':",
	'optin-survey-question-explain' => 'Förklara eller utveckla gärna ditt svar ovan:',
	'optin-survey-question-techfail' => 'Upplevde du några tekniska fel när du använde betaversionen?',
	'optin-survey-question-techfail-ifyes' => "Om ja, utveckla eller förklara ''(endast engelska)'':",
	'optin-survey-question-usedtoolbar' => 'Har du använt det nya expanderbara verktygsfältet för att redigera en sida?',
	'optin-survey-question-usedtoolbar-ifyes' => "Om ja, vad gjorde att du tyckte om det? Vad ogillade du med det ''(endast engelska)''?",
	'optin-survey-question-usedtoolbar-ifno' => "Om nej, varför inte? Kommer du göra det längre fram? Förklara ''(endast engelska)''.",
	'optin-survey-question-different' => "Vad kunde vi gjort annorlunda för att du skulle ha fortsatt att använda betaversionen ''(endast engelska)''?",
	'optin-survey-question-feedback' => "Låt oss gärna veta om du har några andra synpunkter, frågor eller funderingar - alla kommentarer är nyttiga ''(endast engelska)'':",
	'optin-survey-question-browser' => 'Vilken webbläsare använder du?',
	'optin-survey-answer-browser-other' => 'Andra webbläsare:',
	'optin-survey-question-os' => 'Vilket operativsystem använder du?',
	'optin-survey-answer-os-other' => 'Andra operativsystem:',
	'optin-survey-question-res' => 'Vilken upplösning har du på din skärm?',
	'optin-survey-question-changes' => 'Vilka förändringar skulle du vilja se i betaversionen i framtiden (välj alla som passar)?',
	'optin-survey-answer-changes-nav' => 'Gör den övergripande navigeringen för webbplatsen lättare att använda.',
	'optin-survey-answer-changes-edittools' => 'Utöka och förbättra redigeringsverktygen.',
	'optin-survey-answer-changes-upload' => 'Förbättra innehållet och filuppladdningen.',
	'optin-survey-answer-changes-richtext' => 'Utveckla redigeringsverktyg som liknar ordbehandlingsprogram.',
	'optin-survey-answer-changes-lookfeel' => 'Uppdatera webbplatsens utseende.',
	'optin-survey-answer-changes-predictability' => 'Förbättra förutsägbarheten för hur webbplatsen beter sig.',
	'optin-survey-answer-changes-custom' => 'Tillåt mer skräddarsydda inställningar.',
	'optin-survey-answer-changes-other' => "Övrigt ''(endast engelska)'':",
	'optin-improvements' => '== Vad har förbättrats? ==
[[File:UsabilityNavigation.png|left|link=]]
;Förbättrad navigering
Det nya navigationssystemet gör det enklare att se var du är och vad du gör, liksom vart du kan bege dig och hur du kan komma dit. Med sökrutan i det övre högra hörnet så är sökfunktionen lättare att hitta och går snabbare att använda. (Observera att bilderna till vänster inte använder den svenska översättningen som finns.)
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Förbättringar i verktygsraden
Nya och förbättrade ikoner gör det tydligare vilken funktion varje verktyg är kopplad till. Utfällbara sektioner minskar rörigheten, men gör att verktyg som sällan används ändå finns nära till hands.
Hjälpavsnittet ger snabbt förklaringar till vanlig koder i wikitext.
<div style="clear:both;"></div>

== Hur du kan engagera dig ==
För att få mer information om projektet eller för att engagera dig, besök [http://usability.wikimedia.org Wikipedias initiativ för användbarhets wiki].  Där finns mer information om vårt stipendium, forskning, design, utveckling och kommande utgåvor. För att ställa frågor eller lämna allmänna kommentarer, använd vår [http://usability.wikimedia.org/wiki/Talk:Prototype prototyp till diskussionssida]. För att ta upp specifika ämnen, använd respektive diskussionssidorna. Om du hittar buggar så kan du påtala det på [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acaiutgåvans diskussionssida] eller använd [https://bugzilla.wikimedia.org Bugzilla].

Tack så mycket, vi ser fram emot att höra av dig!',
);

/** Telugu (తెలుగు)
 * @author Kiranmayee
 * @author Ravichandra
 * @author Veeven
 */
$messages['te'] = array(
	'optin' => 'మెరుగైన వాడుక సౌలభ్యాన్ని ఎంచుకున్నారు',
	'optin-title-optedout' => 'బీటాని ప్రయత్నించండి',
	'optin-title-optedin' => 'బీటాను విడిచి వెళ్ళు',
	'optin-title-justoptedin' => 'బీటాకు స్వాగతం',
	'optin-title-justoptedout' => 'బీటాను ప్రయత్నిస్తున్నందుకు ధన్యవాదాలు',
	'optin-title-feedback' => 'బీటా పై అభిప్రాయాలు',
	'optin-needlogin' => 'బీటాను ప్రయత్నించడం కోసం [$1 log in] కావాలి',
	'optin-intro' => 'వికీపీడీయా వాడుక సౌలభ్యాన్ని పెంచేందుకు కొన్ని ప్రయత్నాలు జరుగుతున్నాయి. దానికి సంబంధించిన బీటాను ప్రయత్నిస్తారా?',
	'optin-feedback-intro' => 'బీటాను ప్రయత్నించినందుకు ధన్యవాదాలు.
ఈ కొత్త ఇంటర్‌ఫేస్ గురించి మీ అభిప్రాయాలేమిటో మేము తెలుసుకొనదలచాము. క్రిందనున్న అభిప్రాయ సేకరణలో పాలుపంచుకోండి.',
	'optin-feedback-back' => 'మీకు ఈ అభిప్రాయ సేకరణలో పాలుపంచుకోవడం ఇష్టం లేకపోతే $1 కి తిరిగి వెళ్ళవచ్చు.',
	'optin-success-in' => 'మీరు ఇప్పుడు బీటాను ప్రయత్నిస్తున్నారు.
ఒకవేళ మీరు వెనక్కి వెళ్ళదలిస్తే తెర పైభాగాన ఉన్న "{{int:optin-leave}}" లింకును నొక్కండి.',
	'optin-leave-cancel' => 'బీటాను వాడడం మీకు సమ్మతం అయితే $1 కు తిరిగి వెళ్ళండి.',
	'optin-success-out' => 'బీటా నుంచి మీరు విజయవంతంగా వదిలివచ్చారు.
మీకు మళ్ళీ ఎప్పుడైనా ప్రయత్నించాలనిపిస్తే తెర పైభాగం కుడివైపున ఉన్న "{{int:optin-try}}" లింకును నొక్కండి.',
	'optin-success-feedback' => 'మీ అభిప్రాయానికి ధన్యవాదాలు!',
	'optin-accept-short' => 'అలాగే చేద్దాం!',
	'optin-accept-long' => 'బీటాని ప్రయత్నించండి',
	'optin-accept-long-anon' => 'లాగిన్ అయ్యి బీటాను ప్రయత్నించండి',
	'optin-deny-short' => 'వద్దు, ధన్యవాలు',
	'optin-deny-long' => 'మునుపటి పేజీకి వెళ్ళండి.',
	'optin-submit-out' => 'బీటాను విడిచి వెళ్ళు',
	'optin-submit-feedback' => 'అభిప్రాయాన్ని తెలుపండి',
	'optin-survey-yes' => 'అవును',
	'optin-survey-no' => 'కాదు',
	'optin-survey-intro' => 'బీటాను ప్రయత్నిస్తున్నందుకు ధన్యవాదాలు.
కొత్త ఇంటర్‌ఫేస్ పై మీ అభిప్రాయాలను తెలియగోరుచున్నాము. "[[#leave|{{int:optin-submit-out}}]]" పై నొక్కడానికి ముందు క్రింద ఇచ్చిన అభిప్రాయ సేకరణలో పాలుపంచుకుంటే అభినందిస్తాము.',
	'optin-survey-answer-whyoptout-hard' => 'వాడడానికి చాలా కష్టంగా ఉంది.',
	'optin-survey-answer-whyoptout-didntwork' => 'ఇది సరిగ్గా పనిచేయడం లేదు.',
	'optin-survey-answer-whyoptout-notpredictable' => 'ఇది అనుకున్నట్లుగా పనిచేయడం లేదు',
	'optin-survey-answer-whyoptout-didntlike-look' => 'దీని రూపు నాకు నచ్చలేదు',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'కొత్త ట్యాబులు, లే అవుట్ నాకు నచ్చలేదు',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'కొత్త టూల్‌బార్ నాకు నచ్చలేదు',
	'optin-survey-answer-whyoptout-other' => 'ఇతర కారణం:',
	'optin-survey-question-explain' => 'పైన ఇచ్చిన సమాధానాన్ని మరికొంత వివరించండి:',
	'optin-survey-question-techfail' => 'బీటాను ప్రయత్నించేటపుడు మీకేమైనా సాంకేతిక లోపాలు ఎదురయ్యాయా?',
	'optin-survey-question-techfail-ifyes' => 'నిజమే అయితే దానిని గురించి వివరణ రాయండి:',
	'optin-survey-question-usedtoolbar' => 'కొత్తగా వచ్చిన తెరవగలిగే టూల్‌బార్ ను పేజీ ను మార్చేందుకు వాడారా?',
	'optin-survey-question-usedtoolbar-ifyes' => 'వాడిఉంటే దానిలో మీకు నచ్చిన/నచ్చని అంశాలేమిటి?',
	'optin-survey-question-usedtoolbar-ifno' => 'వాడకపోయి ఉంటే ఎందుకు వాడలేదు? భవిష్యత్తులో వాడతారా? కొంచెం వివరణ ఇవ్వండి.',
	'optin-survey-question-different' => 'మీరు బీటాను వాడేటట్లుగా చేయాలంటే మేము ఏమి చేసి ఉండవచ్చునని మీరు భావిస్తున్నారు?',
	'optin-survey-question-feedback' => 'మీకు తోచిన వ్యాఖ్యలు, ఆలోచనలు ఇంకేమైనా ఉంటే మాకు తప్పక పంపించండి. మీ అభిప్రాయాలు మాకు అమూల్యమైనవి!:',
	'optin-survey-question-browser' => 'మీరు ఏ విహారిణిని వాడుతున్నారు?',
	'optin-survey-answer-browser-other' => 'ఇతర విహారిణి:',
	'optin-survey-question-os' => 'మీరు వాడుతున్న నిర్వాహక వ్యవస్థ ఏది?',
	'optin-survey-answer-os-other' => 'ఇతర నిర్వాహక వ్యవస్థలు:',
	'optin-survey-question-res' => 'మీ స్క్రీన్ రిజల్యూషన్ ఎంత?',
	'optin-survey-question-changes' => 'భవిష్యత్తులో బీటాలో మీరు ఎటువంటి మార్పును చూడదలుచుకుంటున్నారు (మీరు చూడదలుచుకున్నవన్నీ ఎంచుకోండి)?',
	'optin-survey-answer-changes-nav' => 'మొత్తం నావిగేషన్ సులభంగా వాడుకునేలా తయారు చేయండి.',
	'optin-survey-answer-changes-edittools' => 'ఎడిటింగ్ టూల్స్ ను పెంచండి, అభివృద్ధి చేయండి',
	'optin-survey-answer-changes-upload' => 'కంటెంట్ ను మీడియాను పెంచండి.',
	'optin-survey-answer-changes-richtext' => 'రిచ్ టెక్స్ట్ ఎడిటర్ లాంటి ఎడిటింగ్ ఉపకరణాలను రూపొందించండి.',
	'optin-survey-answer-changes-lookfeel' => 'సైటు యొక్క లుక్ అండ్ ఫీల్ ను మార్చండి.',
	'optin-survey-answer-changes-other' => 'ఇతర:',
	'optin-improvements' => '==ఏమి మెరుగైంది?==
[[File:UsabilityNavigation.png|left|link=]]
;మెరుగైన నావిగేషన్
సరికొత్త నావిగేషన్ వ్యవస్థలో మీరు ఏమి చూస్తున్నారు? ఎక్కడ ఉన్నారు? ఎక్కడికి వెళ్ళవచ్చు? ఎలా వెళ్ళవచ్చు మొదలైనవన్నీ సులభంగా తెలుసుకోవచ్చు. ఇప్పుడు వెతుకు పెట్టె పైన ఉండటం వల్ల సులభంగానూ, వేగంగానూ వెతకవచ్చు.
<div style="clear:both;"></div>
[[File:UsabilityToolbar.png|left|link=]]
;ఎడిట్ టూల్‌బార్ నవీకరణలు
సరికొత్త ఐకాన్లు ఏ టూల్ ఏ పని చేస్తుందో స్పష్టంగా తెలియబరుస్తాయి. ఎక్కువగా అవసరమయ్యే లింకులను మాత్రమే బాగా అందుబాటులో ఉంచి మిగతా లింకులను విస్తరించగలిగే మెనూలో పెట్టడం ద్వారా టూల్‌బార్ సరళంగా కనిపిస్తుంది.
సహాయ విభాగం వికీ మార్కప్ గురించి తక్షణ సమాచారాన్ని అందజేస్తుంది.
<div style="clear:both;"></div>
==ఎలా పాల్గొనాలి==
ఈ ప్రాజెక్టు గురించి మరింత సమాచారం తెలుసుకొనేందుకు, లేదా పాల్గొనేందుకు, [http://usability.wikimedia.org వాడుక సౌలభ్యం వికీ] ని సందర్శించండి. అక్కడ మా గ్ర్రాంటులు, పరిశోధన, రూపకల్పన, అభివృద్ధి, విడుదలలు మొదలైన ఎన్నో విషయాల గురించి తెలుసుకోవచ్చు. ప్రశ్నలడటానికైనా, లేదా అభిప్రాయాలు తెలియజేయాలన్నా [http://usability.wikimedia.org/wiki/Talk:Prototype మా ప్రోటోటైప్ చర్చాపేజీ]ని వాడండి. మీకు తప్పులు కనిపిస్తే, [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai విడుదలపై చర్చా పేజీ] లేదా [https://bugzilla.wikimedia.org బగ్‌జిల్లా] లో తెలియజేయండి.

ధన్యవాదాలు మీ అమూల్యమైన సలహాల కోసం ఎదురు చూస్తుంటాము.',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'optin-survey-yes' => 'Ҳа',
	'optin-survey-no' => 'Не',
);

/** Turkish (Türkçe)
 * @author Joseph
 */
$messages['tr'] = array(
	'optin' => 'Kullanılabilirlik Girişimi katılım',
	'optin-desc' => "Kullanıcıların Beta'yı, Kullanılabilirlik Girişimi'nin en son kullanılabilirlik geliştirmelerini, denemelerine izin verir",
	'optin-title-optedout' => 'Beta Deneyin',
	'optin-title-optedin' => "Beta'dan Çık",
	'optin-title-justoptedin' => "Beta'ya Hoşgeldiniz",
	'optin-title-justoptedout' => "Beta'yı denediğiniz için teşekkür ederiz",
	'optin-title-feedback' => 'Geribildirim verin',
	'optin-needlogin' => "Beta'yı denemek için [$1 giriş yapmalısınız].",
	'optin-intro' => "Vikipedi Kullanılabilirlik Girişimi, Vikipedi'nin kullanılabilirliğini geliştirmek amacıyla çok yoğun çalışıyor.
Beta'yı denemek ister misiniz?",
	'optin-feedback-intro' => "Beta'yı denediğiniz için teşekkürler.
Yeni arayüzümüz hakkında ne düşündüğünüzü bilmek isteriz, eğer aşağıdaki isteğe bağlı anketimizi doldurursanız memnun kalırız.",
	'optin-feedback-back' => 'Eğer anketi doldurmak istemiyorsanız, $1 sayfasına dönebilirsiniz.',
	'optin-success-in' => 'Şu anda Beta\'yı deniyorsunuz.
Ekranın en üstündeki "{{int:optin-leave}}" bağlantısına tıklayarak istediğiniz zaman ayrılabilirsiniz.',
	'optin-leave-cancel' => "Eğer Beta'yı kullanmaya devam etmek isterseniz, $1 sayfasına geri dönebilirsiniz",
	'optin-success-out' => 'Beta\'dan başarıyla ayrıldınız.
Ekranın sağ üst kısmındaki "{{int:optin-try}}" bağlantısına tıklayarak istediğiniz zaman tekrar deneyebilirsiniz.',
	'optin-success-feedback' => 'Geribildiriminiz için teşekkür ederiz!',
	'optin-accept-short' => 'Hadi yapalım!',
	'optin-accept-long' => "Acai Beta'yı Dene",
	'optin-accept-long-anon' => "Giriş yapın ve Beta'yı deneyin",
	'optin-deny-short' => 'Hayır teşekkürler',
	'optin-deny-long' => 'Önceki sayfaya dön',
	'optin-submit-out' => "Beta'dan Çık",
	'optin-submit-feedback' => 'Geribildirim verin',
	'optin-survey-yes' => 'Evet',
	'optin-survey-no' => 'Hayır',
	'optin-survey-intro' => 'Beta\'yı denediğiniz için teşekkürler.
Yeni arayüzümüz konusunda ne düşündüğünüzü bilmek isteriz, o yüzden "[[#leave|{{int:optin-submit-out}}]]" düğmesine tıklamadan önce isteğe bağlı anketimizi doldurursanız memnun kalırız.',
	'optin-survey-question-likedislike' => "Beta'nın beğendiğiniz yönleri nelerdir? Beta'nın sevmediğiniz yönleri nelerdir?",
	'optin-survey-question-whyoptout' => "Neden bu Beta'dan çıkıyorsunuz? (lütfen uygun olanların hepsini seçin)",
	'optin-survey-answer-whyoptout-hard' => 'Kullanmak çok zor.',
	'optin-survey-answer-whyoptout-didntwork' => 'Düzgün çalışmadı.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Tahmin edilebilir şekilde çalışmadı.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Görünümünü beğenmedim.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Yeni sekmeleri ve düzeni beğenmedim.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Yeni araç çubuğunu beğenmedim.',
	'optin-survey-answer-whyoptout-other' => 'Diğer sebep:',
	'optin-survey-question-explain' => 'Lütfen yukarıdaki cevabınızı açıklayın ya da detaylandırın:',
	'optin-survey-question-techfail' => "Beta'yı kullanırken herhangi bir teknik arıza ile karşılaştınız mı?",
	'optin-survey-question-techfail-ifyes' => 'Evet ise, lütfen ayrıntılandırın veya açıklayınız:',
	'optin-survey-question-usedtoolbar' => 'Bir sayfayı değiştirmek için yeni genişletilebilir araç çubuğunu kullandınız mı?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Evet ise, neleri sevdiniz? Nelerden hoşlanmadınız?',
	'optin-survey-question-usedtoolbar-ifno' => 'Eğer hayırsa, neden? Gelecekte kullanacak mısınız? Lütfen açıklayın.',
	'optin-survey-question-different' => "Beta'mızı kullanmaya devam etmeniz için farklı olarak ne yapabilirdik?",
	'optin-survey-question-feedback' => 'Lütfen geribeslemenizi bildirin:',
	'optin-survey-question-browser' => 'Hangi tarayıcıyı kullanıyorsunuz?',
	'optin-survey-answer-browser-other' => 'Diğer tarayıcı:',
	'optin-survey-question-os' => 'Hangi işletim sistemini kullanıyorsunuz?',
	'optin-survey-answer-os-other' => 'Diğer işletim sistemi:',
	'optin-survey-question-res' => 'Ekran çözünürlüğünüz nedir?',
	'optin-survey-question-changes' => "Beta'da gelecekte hangi değişiklikleri görmek istersiniz (uygun olan hepsini seçin)?",
	'optin-survey-answer-changes-nav' => 'Sitenin genel dolaşımını kullanımı kolay yapın.',
	'optin-survey-answer-changes-edittools' => 'Düzenleme araçlarını çoğaltın ve geliştirin.',
	'optin-survey-answer-changes-upload' => 'Ortam yüklemelerini ve içeriği geliştirin.',
	'optin-survey-answer-changes-richtext' => 'Zengin-metin editörlerine benzer değiştirme araçlarını geliştirin.',
	'optin-survey-answer-changes-lookfeel' => 'Sitenin "görünüm ve hissini" güncelleyin.',
	'optin-survey-answer-changes-predictability' => 'Öngörülebilirlik performansını geliştirin.',
	'optin-survey-answer-changes-custom' => 'Daha fazla kullanıcı özelleştirmesine izin ver.',
	'optin-survey-answer-changes-other' => 'Diğer:',
	'optin-improvements' => '== Neler geliştirildi? ==
[[File:UsabilityNavigation.png|left|link=]]
;Geliştirilmiş dolaşım
Yeni dolaşım sistemi, nerede olduğunuzu ve ne yaptığınızı görmenizi, ayrıca nereye gidebileceğinizi ve oraya nasıl ulaşacağınızı kolaylaştırır. Sağ üst köşede yer alan yeni arama kutusu ile bulmak daha kolay ve kullanmak daha hızlı.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Değiştirme araç çubuğu geliştirmeleri
Yeni-ve-geliştirilmiş simgeler her aracın ne eylemi yaptığını daha netleştirir. Genişletilebilir bölümler dağınıklığı azaltırken az kullanılan araçları sadece bir tık ötesinde saklar.
Yardım bölümü, viki-biçimlendirmesinin genel kullanımı için bir referansa kolay erişim sağlar.
<div style="clear:both;"></div>

== Nasıl dahil olunur ==
Proje hakkında daha fazla bilgi edinmek ya da dahil olmak için lütfen [http://usability.wikimedia.org Kullanılabilirlik Girşimi\'nin vikisini] ziyaret edin. Orada, araştırmamız, tasarım + geliştirmemiz, ve yayınlarımız hakkında bilgi bulabilirsiniz. Soru sormak veya genel geridönüt bırakmak için, lütfen [http://usability.wikimedia.org/wiki/Talk:Prototype prototip tartışma sayfamızı] kullanın. Belirli konulardan bahsetmek için, lütfen ilgili tartışma sayfalarını kullanın. Eğer hata bulursanız, lütfen yorumlarınızı [http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai sürüm tartışma sayfasına] bırakın ya da [https://bugzilla.wikimedia.org Bugzilla]\'yı kullanın.

Teşekkürler, sizden haber bekliyoruz!',
);

/** Tatar (Cyrillic) (Татарча/Tatarça (Cyrillic))
 * @author Rinatus
 */
$messages['tt-cyrl'] = array(
	'optin-title-optedout' => 'Интерфейсның бета-версиясен карау',
	'optin-title-optedin' => 'Beta-версиядән чыгарга',
	'optin-survey-yes' => 'Әйе',
	'optin-survey-no' => 'Юк',
	'optin-survey-answer-whyoptout-other' => 'Башка сәбәп:',
	'optin-survey-answer-browser-other' => 'Башка браузер:',
);

/** Ukrainian (Українська)
 * @author A1
 * @author AS
 * @author Ickis
 */
$messages['uk'] = array(
	'optin' => 'Участь в ініціативі зручності',
	'optin-desc' => 'Дозволити користувачам спробувати Beta, останні покращення, в рамках ініціативи зручності.',
	'optin-title-optedout' => 'Спробуйте Beta',
	'optin-title-optedin' => 'Залишити Beta',
	'optin-title-justoptedin' => 'Ласкаво просимо до Beta',
	'optin-title-justoptedout' => 'Дякуємо вам за випробування нашої Beta',
	'optin-title-feedback' => "Зворотний зв'язок",
	'optin-needlogin' => 'Вам необхідно [$1 увійти], щоб спробувати Beta.',
	'optin-intro' => 'В рамках ініціативи зручності була проведена робота щодо поліпшення зручності використання Вікіпедії.
Чи не бажаєте ви спробувати нашу Beta?',
	'optin-feedback-intro' => 'Дякуємо вам за випробування Beta.
Нам хотілося б знати, що ви думаєте про наш новий інтерфейс, так що ми будемо вдячні, якщо ви візьмете участь у наведеному нижче опитуванні.',
	'optin-feedback-back' => 'Якщо ви не хочете брати участь в опитуванні, ви можете повернутися до $1.',
	'optin-success-in' => 'Тепер ви берете участь у випробуванні Бета-версії інтерфейсу.
Ви можете відключитися від програми в будь-який час, натиснувши на посилання «{{int:optin-leave}}» у верхній частині екрана.',
	'optin-leave-cancel' => 'Якщо ви хочете завершити використання Beta, ви можете повернуться до $1.',
	'optin-success-out' => 'Ви успішно вийшли з режиму випробування Бета-версії інтерфейсу.
Ви можете ще раз спробувати цю версію, натиснувши посилання «{{int:optin-try}}» у правому верхньому куту екрана.',
	'optin-success-feedback' => 'Дякуємо за ваш відгук!',
	'optin-accept-short' => 'Вперед!',
	'optin-accept-long' => 'Випробувати Бета-версію',
	'optin-accept-long-anon' => 'Авторизуватися й спробувати Бета-версію інтерфейсу',
	'optin-deny-short' => 'Ні, дякую',
	'optin-deny-long' => 'Повернутися на попередню сторінку',
	'optin-submit-out' => 'Покинути Бета-версію',
	'optin-submit-feedback' => 'Відправити відгук',
	'optin-survey-yes' => 'Так',
	'optin-survey-no' => 'Ні',
	'optin-survey-intro' => 'Дякуємо вас за участь у випробуванні Бета-версії інтерфейсу.
Нам би хотілося знати, що ви думаєте про новий інтерфейс, тому, перед тим, як ви натиснете «[[#leave|{{int:optin-submit-out}}]]», ми були б вам вдячні за участь у наведеному нижче опитуванні.',
	'optin-survey-question-likedislike' => 'Що вам подобається в Beta? Що вам не подобається в Beta?',
	'optin-survey-question-whyoptout' => 'Чому ви покидаєте Бету? (Будь ласка, виберіть підходящі значення)',
	'optin-survey-answer-whyoptout-hard' => 'Він дуже складний у використанні.',
	'optin-survey-answer-whyoptout-didntwork' => 'Він не працює належним чином.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Вона працює непередбачувано.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Мені не подобається як вона виглядає.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Мені не сподобалися нові вкладки й верстка.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Мені не сподобалася нова панель редагування.',
	'optin-survey-answer-whyoptout-other' => 'Інша причина:',
	'optin-survey-question-explain' => 'Будь ласка, поясніть або уточніть Вашу відповідь вище:',
	'optin-survey-question-techfail' => 'Ви зіткнулися з якими-небудь технічними збоями при використанні Beta?',
	'optin-survey-question-techfail-ifyes' => 'Якщо так, то будь ласка уточніть або поясніть:',
	'optin-survey-question-usedtoolbar' => 'Чи використали Ви нову розгортувану панель інструментів для редагування сторінок?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Якщо так, те, що вам у ній сподобалося? Що не сподобалося?',
	'optin-survey-question-usedtoolbar-ifno' => 'Якщо ні, то чому?  Чи збираєтеся в майбутньому? Будь ласка, поясніть.',
	'optin-survey-question-feedback' => 'Будь ласка, висловіть своє судження:',
	'optin-survey-question-browser' => 'Яким оглядачем ви користуєтесь?',
	'optin-survey-answer-browser-other' => 'Інший:',
	'optin-survey-question-os' => 'Якою операційною системою ви користуєтесь?',
	'optin-survey-answer-os-other' => 'Інша операційна система:',
	'optin-survey-question-res' => 'Яка роздільність вашого монітора?',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'optin' => "Adesion a l'Inissiativa par l'Usabilità",
	'optin-title-optedout' => 'Próa la Beta',
	'optin-title-optedin' => 'Và fora da Beta',
	'optin-title-justoptedin' => 'Benvegnù in Beta',
	'optin-title-justoptedout' => 'Grassie de ver proà la nostra Beta',
	'optin-title-feedback' => 'Cossa ghe ne pénsito de la Beta',
	'optin-needlogin' => 'Te ghè da [$1 far el login] par proàr Beta',
	'optin-intro' => "Noaltri del Progeto Usabilità de Wikipedia semo drio laorar come i mussi par mejorar l'usabilità de Wikipedia.
Vuto proàr la nostra version Beta?",
	'optin-feedback-intro' => 'Grassie de ver proà la Beta.
Gavaressimo caro savér cossa te ghe ne pensi de la nostra interfacia nova, quindi ne piasarìa che te conpilessi el sondagio facoltativo qua soto.',
	'optin-feedback-back' => 'Se no te vol mia conpilar el sondagio, te pol tornar a $1.',
	'optin-success-in' => 'Desso te sì drio proàr la Beta.
Te pol \'ndar fora in qualunque momento strucando "{{int:optin-leave}}" ne la parte de sora del schermo.',
	'optin-leave-cancel' => "Se te vol 'ndar vanti a doparar Beta, te pol tornar a $1.",
	'optin-success-out' => 'Te sì \'ndà fora da Beta.
Te podi entrar da novo quando te vol strucando su "{{int:optin-try}}" in alto a destra de la pagina.',
	'optin-success-feedback' => 'Grassie de verne dito la to opinion!',
	'optin-accept-short' => 'Va ben, dai!',
	'optin-accept-long' => 'Próa la Beta',
	'optin-accept-long-anon' => 'Fà el login e próa la Beta',
	'optin-deny-short' => 'No, grassie',
	'optin-deny-long' => 'Torna a la pagina de prima',
	'optin-submit-out' => 'Và fora da la Beta',
	'optin-submit-feedback' => 'Dine cossa te ghe ne pensi',
	'optin-survey-yes' => 'Sì',
	'optin-survey-no' => 'No',
	'optin-survey-intro' => 'Grassie de ver proà la Beta.
Gavaressimo caro savér cossa te ghe ne pensi de la nostra interfacia nova, quindi ne piasarìa che te conpilessi el sondagio facoltativo qua soto prima de strucar su "[[#leave|{{int:optin-submit-out}}]]".',
	'optin-survey-question-likedislike' => 'Cossa te ga piasso de la Beta? Cossa no te ga piasso?',
	'optin-survey-question-whyoptout' => "Com'èla che te vol 'ndar fora da la Beta? (Te pol selessionar anca pi de una risposta.)",
	'optin-survey-answer-whyoptout-hard' => 'Massa fadiga dopararla.',
	'optin-survey-answer-whyoptout-didntwork' => 'No la funsiona mia ben.',
	'optin-survey-answer-whyoptout-notpredictable' => 'No la funsiona come se se spetarìa.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'No me piase come la se vede.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'No me piase le schede nove e la dispoxission grafica.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'No me piase la nova bara dei strumenti.',
	'optin-survey-answer-whyoptout-other' => 'Altra motivassion:',
	'optin-survey-question-explain' => 'Par piaser spiega mejo la to risposta:',
	'optin-survey-question-techfail' => 'Se gà verificà qualche problema tecnico doparando Beta?',
	'optin-survey-question-techfail-ifyes' => 'Se sì, spiega:',
	'optin-survey-question-usedtoolbar' => 'Gheto doparà la nova bara dei strumenti espandibile par modificar na pagina?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Se sì, cossa te gà piasso? Cossa no te gà piasso?',
	'optin-survey-question-usedtoolbar-ifno' => 'Se no, parché de no? Podaressito dopararla in futuro? Spiega, par piaser.',
	'optin-survey-question-browser' => 'Che browser dòparito?',
	'optin-survey-answer-browser-other' => 'Altro browser:',
	'optin-survey-question-os' => 'Che sistema operativo dòparito?',
	'optin-survey-answer-os-other' => 'Altro sistema operativo:',
	'optin-survey-question-res' => 'Quala xea la risolussion del to schermo?',
	'optin-survey-answer-changes-other' => 'Altro:',
	'optin-improvements' => '== Cossa gavemo fato de mejo? ==
[[File:UsabilityNavigation.png|left|link=]]
;Navigassion piessè potente
El sistema novo de navigassion el rende pi senplice védar in do che te sì e cossa te sì drio far, oltre a dove te podi \'ndar e come te podi rivarghe. Co la casèla de riserca piassà in tel canton in alto a destra, la funsion de riserca la xe pi fàsile par catar le robe e pi svelta da doparar.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Mejoramenti de la bara dei strumenti
Le icone nove e fate mejo le rende pi ciare le azioni che ogni strumento el fa. Le sezioni espandibili le riduse l\'ingonbro tegnendo i strumenti doparà de manco a un clic de distansa. La sezion de aiuto la fornisse un rapido acesso a un riferimento per i usi comuni de la sintassi wiki.
<div style="clear:both;"></div>
== Come jutarne ==
Par savérghene piessè sul progeto o jutarne, visita el [http://usability.wikimedia.org sito del Progeto Usabilità]. Lì te catarè informassion su la nostra sovenzion, riserca, progetassion e svilupo e version nove. Par far domande o lassar un comento generale, ghe xe la nostra [http://usability.wikimedia.org/wiki/Talk:Prototype pagina de discussion sui prototipi]. Par ciacolar de argomenti specifici, ghe xe le pagine de discussion relative. Se te cati dei erori, lassa un comento in te la [http://usability.wikimedia.org/wiki/Talk:Releases/Acai pagina di discussion de le version de Acai] o dòpara [https://bugzilla.wikimedia.org Bugzilla].

Grassie e sperémo che ne riva presto qualche to messagio!',
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'optin-title-optedout' => 'Kodvi Betad',
	'optin-title-optedin' => 'Lähtta Betaspäi',
	'optin-title-justoptedin' => 'Tulgat tervhin Betaha!',
	'optin-accept-short' => 'Tehkam se!',
	'optin-survey-yes' => 'Ka',
	'optin-survey-no' => 'Ei',
	'optin-survey-answer-whyoptout-other' => 'Toine sü:',
	'optin-survey-answer-browser-other' => 'Toine kaclim:',
	'optin-survey-answer-changes-other' => 'Toine:',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'optin' => 'Tham gia Sáng kiến Khả dụng',
	'optin-desc' => 'Cho phép người dùng dùng thử bản Beta, bản nâng cao khả dụng mới nhất của Sáng kiến Khả dụng.',
	'optin-title-optedout' => 'Thử bản Beta',
	'optin-title-optedin' => 'Rời Beta',
	'optin-title-justoptedin' => 'Chào mừng đến với Beta',
	'optin-title-justoptedout' => 'Cảm ơn bạn đã thử bản Beta của chúng tôi',
	'optin-title-feedback' => 'Phản hồi Beta',
	'optin-needlogin' => 'Bạn cần phải [$1 đăng nhập] để thử bản Beta.',
	'optin-intro' => 'Sáng kiến Khả dụng Wikipedia đã bỏ rất nhiều công sức để tăng tính khả dụng của Wikipedia.
Bạn có muốn thử bản Beta của chúng tôi?',
	'optin-feedback-intro' => 'Cảm ơn bạn đã dùng thử bản Beta.
Chúng tôi muốn biết cảm nghĩ của bạn về giao diện mới của chúng ta, vì vậy chúng tôi rất cảm kích nếu bạn điền vào bản thăm dò ý kiến dưới đây.',
	'optin-feedback-back' => 'Nếu bạn không muốn điền vào bản thăm dò ý kiến, bạn có thể quay lại $1.',
	'optin-success-in' => 'Bạn hiện đang dùng thử bản Beta.
Bạn có thể ngừng sử dụng bất cứ lúc nào bằng cách nhấn vào liên kết “{{int:optin-leave}}” ở phía trên màn hình.',
	'optin-leave-cancel' => 'Nếu bạn muốn tiếp tục sử dụng Beta, bạn có thể quay lại $1.',
	'optin-success-out' => 'Bạn đã thoát khỏi Beta.
Bạn có thể dùng lại nó bất cứ lúc nào bằng cách nhấn vào liên kết “{{int:optin-try}}” ở phía trên bên phải màn hình.',
	'optin-success-feedback' => 'Cảm ơn vì những phản hồi của bạn!',
	'optin-accept-short' => 'Tiến hành thôi!',
	'optin-accept-long' => 'Thử bản Beta',
	'optin-accept-long-anon' => 'Đăng nhập và dùng thử bản Beta',
	'optin-deny-short' => 'Không cảm ơn',
	'optin-deny-long' => 'Quay trở lại trang trước',
	'optin-submit-out' => 'Rời khỏi Beta',
	'optin-submit-feedback' => 'Phản hồi',
	'optin-survey-yes' => 'Có',
	'optin-survey-no' => 'Không',
	'optin-survey-intro' => 'Cảm ơn bạn đã dùng thử Beta.
Chúng tôi muốn biết cảm nghĩ của bạn về giao diện mới của chúng ta, vì vậy chúng tôi sẽ rất cảm kích nếu bạn điền vào bản thăm dò dưới đây trước khi nhấn “[[#leave|{{int:optin-submit-out}}]]”.',
	'optin-survey-question-likedislike' => 'Bạn thấy thích thú điều gì về Beta? Bạn thấy không hài lòng điều gì về Beta?',
	'optin-survey-question-whyoptout' => 'Tại sao bạn rời Beta? (Xin chọn tất cả các ý phù hợp.)',
	'optin-survey-answer-whyoptout-hard' => 'Nó khó sử dụng quá.',
	'optin-survey-answer-whyoptout-didntwork' => 'Nó bị trục trặc.',
	'optin-survey-answer-whyoptout-notpredictable' => 'Nó không hành động như tiên đoán.',
	'optin-survey-answer-whyoptout-didntlike-look' => 'Tôi không thích ngoại hình của nó.',
	'optin-survey-answer-whyoptout-didntlike-layout' => 'Tôi không thích các thẻ và cách sắp xếp mới.',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => 'Tôi không thích thanh công cụ mới.',
	'optin-survey-answer-whyoptout-other' => 'Lý do khác:',
	'optin-survey-question-explain' => 'Xin hãy giải thích hoặc nói rõ hơn câu trả lời của bạn phía trên:',
	'optin-survey-question-techfail' => 'Bạn có gặp lỗi kỹ thuật khi sử dụng Beta không?',
	'optin-survey-question-techfail-ifyes' => 'Nếu có, xin nói rõ hoặc giải thích:',
	'optin-survey-question-usedtoolbar' => 'Bạn đã sử dụng thanh công cụ tùy biến để sửa đổi trang chưa?',
	'optin-survey-question-usedtoolbar-ifyes' => 'Nếu có, bạn cảm thấy thích thú về điều gì? Bạn cảm thấy không hài lòng về điều gì?',
	'optin-survey-question-usedtoolbar-ifno' => 'Nếu không thì tại sao không? Bạn sẽ dùng trong tương lai chứ? Xin hãy giải thích.',
	'optin-survey-question-different' => 'Bạn sẽ sử dụng tiếp Beta nếu chúng tôi thay đổi điều gì?',
	'optin-survey-question-feedback' => 'Xin cho chúng tôi biết các ý kiến, lo ngại hoặc suy nghĩ khác của bạn dành cho chúng tôi - mọi phản hồi đều hữu ích!:',
	'optin-survey-question-browser' => 'Bạn sử dụng trình duyệt nào?',
	'optin-survey-answer-browser-other' => 'Trình duyệt khác:',
	'optin-survey-question-os' => 'Bạn sử dụng hệ điều hành nào?',
	'optin-survey-answer-os-other' => 'Hệ điều hành khác:',
	'optin-survey-question-res' => 'Màn hình của bạn có độ phân giải nào?',
	'optin-survey-question-changes' => 'Bạn muốn nhìn thấy sự thay đổi nào của Beta trong tương lai (xin chọn tất cả phù hợp)?',
	'optin-survey-answer-changes-nav' => 'Làm cho khả năng duyệt tìm chung trên trang dễ sử dụng hơn.',
	'optin-survey-answer-changes-edittools' => 'Tăng các công cụ sửa đổi về số lượng lẫn chất lượng.',
	'optin-survey-answer-changes-upload' => 'Cải tiến tải lên nội dung và phương tiện.',
	'optin-survey-answer-changes-richtext' => 'Phát triển các công cụ sửa đổi giống như trình sửa đổi giàu chức năng.',
	'optin-survey-answer-changes-lookfeel' => 'Cập nhật “bề ngoài và cảm nhận” cho trang.',
	'optin-survey-answer-changes-predictability' => 'Tăng cường khả năng dự đoán khi hoạt động.',
	'optin-survey-answer-changes-custom' => 'Cho phép người dùng tùy chỉnh nhiều hơn.',
	'optin-survey-answer-changes-other' => 'Khác:',
	'optin-improvements' => '== Những cải tiến ==
[[File:UsabilityNavigation.png|left|link=]]
;Duyệt trang tốt hơn
Hệ thống duyệt trang giúp bạn dễ nhận thấy mình đang ở đâu và làm gì hơn, cũng như nơi bạn có thể đến và cách làm điều đó. Với hộp tìm kiếm đặt ở góc trên bên phải, tính năng tìm kiếm sẽ dễ tìm thấy và dễ sử dụng hơn.
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;Cải tiến thanh công cụ sửa đổi
Các biểu tượng mới và được cải tiến để làm rõ hơn các chức năng của từng nút công cụ. Nhiều phần có thể mở rộng giúp giảm bớt sự lộn xộn nhưng vẫn giữ lại được những công cụ thường dùng chỉ bằng một cú nhấn chuột.
Đề mục trợ giúp giúp truy cập nhanh vào hướng dẫn sử dụng mã wiki.
<div style="clear:both;"></div>
== Cách tham gia ==
Để tìm hiểu thêm về dự án hoặc tham gia vào dự án, xin mời thăm [http://usability.wikimedia.org wiki của Sáng kiến Khả dụng].  Tại đó bạn sẽ tìm thấy những thông tin về số tiền được cấp, nghiên cứu, thiết kế + phát triển, và các bản phát hành. Để đặt câu hỏi hoặc để lại hồi đáp, xin hãy sử dụng [http://usability.wikimedia.org/wiki/Talk:Prototype trang thảo luận prototype của chúng tôi].  Để bàn về các chủ đề cụ thể, hãy sử dụng các trang thảo luận đi kèm. Nếu bạn nhận thấy có lỗi phần mềm, xin để lại lời nhắn tại  [http://usability.wikimedia.org/wiki/Talk:Releases/Acai trang thảo luận bản phát hành Acai] hoặc sử dụng [https://bugzilla.wikimedia.org Bugzilla].

Cảm ơn và mong hồi âm từ bạn!',
);

/** Volapük (Volapük)
 * @author Malafaya
 */
$messages['vo'] = array(
	'optin-survey-yes' => 'Si',
	'optin-survey-no' => 'No',
);

/** Yiddish (ייִדיש)
 * @author פוילישער
 */
$messages['yi'] = array(
	'optin' => 'זיך אײַנמעלדן צו דער ניצלעכקייט איניציאטיוו',
	'optin-desc' => "דערלויבן באניצער אויספרובירן בעטאַ, דער ניצלעכקייט איניציאטיוו'ס לעצטע ניצלעכקייט פֿארבעסערונגען.",
	'optin-title-optedout' => 'פרובירן בעטא',
	'optin-title-optedin' => 'פֿארלאזן בעטא',
	'optin-title-justoptedin' => 'ברוך־הבא צו בעטא',
	'optin-title-justoptedout' => 'ייש"כ פאר פרובירן אונזער בעטא',
	'optin-title-feedback' => 'בעטא פֿידבעק',
	'optin-needlogin' => 'איר דארפֿט [$1 אריינלאגירן] צו פרובירן בעטא.',
	'optin-intro' => 'די וויקיפעדיע ניצלעכקייט איניציאטיוו האט געארבעט שווער צו פארבעסערן די ניצלעכקייט פון וויקיפעדיע.
אפשר ווילט איר פרובירן אונזער בעטא?',
	'optin-accept-long' => 'פרובירן בעטא',
	'optin-accept-long-anon' => 'ארײַנלאגירן און אויספרובירן בעטא',
	'optin-deny-short' => 'ניין א דאנק',
	'optin-deny-long' => 'צוריק צום פריערדיקן בלאט',
	'optin-submit-out' => 'פֿארלאזן בעטא',
	'optin-survey-yes' => 'יא',
	'optin-survey-no' => 'ניין',
	'optin-survey-question-browser' => 'וועלכער בלעטערער ניצט איר?',
	'optin-survey-answer-browser-other' => 'אנדער בלעטערער:',
	'optin-survey-question-os' => 'וועלכע אפערירן סיסטעם ניצט איר?',
	'optin-survey-answer-os-other' => 'אנדער אפערירן סיסטעם:',
	'optin-survey-question-res' => 'וואס איז די רעזאלוציע פון אייער עקראן?',
	'optin-survey-answer-changes-other' => 'אנדער:',
);

/** Yue (粵語)
 * @author Shinjiman
 */
$messages['yue'] = array(
	'optin' => '可用性倡議選入',
	'optin-desc' => '容許用戶選擇性去加入可用性倡議嘅可用性加強',
	'optin-title-optedout' => '試吓測試版',
	'optin-title-optedin' => '離開測試版',
	'optin-title-justoptedin' => '歡迎來到測試版',
	'optin-title-justoptedout' => '多謝你去試用測試版',
	'optin-title-feedback' => '測試版反饋',
	'optin-needlogin' => '你需要[$1 登入]去試吓測試版。',
	'optin-intro' => '維基百科可用性小組開發咗一個新皮同埋一個新編輯工具去加強維基百科嘅可用性。
你係咪想試吓我哋嘅測試版？',
	'optin-feedback-intro' => '多謝去試用個測試版。
我哋想知道你對我哋嘅新界面有啲咩睇法，如果你完成下面可選嘅調查，我哋會好樂意接受。',
	'optin-feedback-back' => '如果你唔想完成下面嘅調查，你可以返去$1。',
	'optin-success-in' => '你已經成功噉選入到可用性小組嘅可用性加強。
你可以響任何時間撳上面嘅"{{int:optin-leave}}"去選出番去。',
	'optin-leave-cancel' => '如果你繼續去用測試版，你可以返去$1。',
	'optin-success-out' => '你已經成功噉選出到可用性小組嘅可用性加強。
你可以響任何時間撳上面嘅"{{int:optin-try}}"去選入番去。',
	'optin-success-feedback' => '多謝你嘅反饋！',
	'optin-accept-short' => '而家就去做！',
	'optin-accept-long' => '試吓我哋嘅測試版',
	'optin-accept-long-anon' => '登入試吓測試版',
	'optin-deny-short' => '唔使喇，多謝',
	'optin-deny-long' => '返去上一版',
	'optin-submit-out' => '離開測試版',
	'optin-submit-feedback' => '畀意見',
	'optin-survey-yes' => '係',
	'optin-survey-no' => '唔係',
	'optin-survey-intro' => '多謝你去試用可用性小組嘅可用性加強。
你可以響任何時間響呢版上面撳"{{int:optin-leave}}"去選出。

我哋想知道你對呢個新界面嘅諗法，因此我哋會好高興如果你撳"[[#leave|{{int:optin-submit-out}}]]"之前完成一個可選嘅調查。',
	'optin-survey-question-likedislike' => '你對測試版有啲咩鍾意？有啲咩唔鍾意？',
	'optin-survey-question-whyoptout' => '點解你會選出呢個界面？（揀全部可以用到嘅）',
	'optin-survey-answer-whyoptout-hard' => '太難去用。',
	'optin-survey-answer-whyoptout-didntwork' => '唔能夠正確噉操作。',
	'optin-survey-answer-whyoptout-notpredictable' => '唔能夠做到預期嘅嘢。',
	'optin-survey-answer-whyoptout-didntlike-look' => '我唔鍾意佢嘅外觀。',
	'optin-survey-answer-whyoptout-didntlike-layout' => '我唔鍾意個新標籤同埋排版。',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => '我唔鍾意條新工具列。',
	'optin-survey-answer-whyoptout-other' => '其它原因：',
	'optin-survey-question-explain' => '請解釋或詳述你上面嘅答案：',
	'optin-survey-question-techfail' => '你響用緊測試版嗰陣，有冇曾經遇過任何嘅技術問題？',
	'optin-survey-question-techfail-ifyes' => '如果有嘅話，請詳述或者解釋：',
	'optin-survey-question-usedtoolbar' => '你有冇用過新可擴展嘅工具列去編輯一版？',
	'optin-survey-question-usedtoolbar-ifyes' => '如果有嘅，你鍾意啲乜？你又唔鍾意啲乜？',
	'optin-survey-question-usedtoolbar-ifno' => '如果冇嘅，點解唔用？會唔會響將來去用？請解釋一下。',
	'optin-survey-question-different' => '你響用緊測試版嗰陣，我哋做咗啲乜嘢改變去令到你持續去用佢？',
	'optin-survey-question-feedback' => '請畀我哋知道你嘅反饋、睇法、同埋諗法 - 全部嘅反饋都係有用嘅！：',
	'optin-survey-question-browser' => '你用邊隻瀏覽器？',
	'optin-survey-answer-browser-other' => '其它瀏覽器：',
	'optin-survey-question-os' => '你用邊套操作系統？',
	'optin-survey-answer-os-other' => '其它操作系統：',
	'optin-survey-question-res' => '你個螢光幕嘅解像度有幾大？',
	'optin-survey-question-changes' => '你想響未來，期望對測試版有啲乜嘢改變（揀全部可以用到嘅）？',
	'optin-survey-answer-changes-nav' => '整到網站嘅整體導航更加容易使用。',
	'optin-survey-answer-changes-edittools' => '增加同加強編輯工具。',
	'optin-survey-answer-changes-upload' => '改善內容同媒體上載。',
	'optin-survey-answer-changes-richtext' => '開發同廣文字編輯器相似嘅編輯工具。',
	'optin-survey-answer-changes-lookfeel' => '更新網站嘅『樣同感』。',
	'optin-survey-answer-changes-predictability' => '改善效率預測。',
	'optin-survey-answer-changes-custom' => '容許更加有彈性嘅用戶自定。',
	'optin-survey-answer-changes-other' => '其它：',
	'optin-improvements' => '== 有啲乜改善咗？ ==
[[File:UsabilityNavigation.png|left|link=]]
;導航加強
個新嘅導航系統會更加容易噉令你知道你響邊同做緊啲乜嘢，你可以去邊同埋點樣去嗰度。搵嘢盒放咗響右上角，個搵嘢功能更加容易搵到，又用得快啲。
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;編輯欄改進
新同改善嘅圖示更加清楚睇到每一個工具去做啲乜嘢。可以擴展嘅小節減少混亂，撳一個掣就可以收起啲唔常用嘅工具。
個幫手小節提供常用wiki語法嘅快捷途徑。
<div style="clear:both;"></div>
== 點樣加入 ==
要知更多有關專案或者加入，請睇吓[http://usability.wikimedia.org Usability Initiative wiki]。
嗰度你就會搵到我哋嘅准許、研究、設計開發，同埋發佈。
去問問題或者畀一般反饋，請用我哋嘅[http://usability.wikimedia.org/wiki/Talk:Prototype 模型討論頁]。
去解決特定嘅標題，請用有關嘅討論版。
如果你搵到臭蟲，請響[http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai發佈討論版]留言或者去用[https://bugzilla.wikimedia.org Bugzilla]。

多謝，我哋會等待你嘅意見！',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Liangent
 * @author PhiLiP
 * @author Shinjiman
 */
$messages['zh-hans'] = array(
	'optin' => '启用Usability Initiative',
	'optin-desc' => '允许用户使用Usability Initiative测试版提供的最新的可用性增强功能',
	'optin-title-optedout' => '试用测试版',
	'optin-title-optedin' => '离开测试版',
	'optin-title-justoptedin' => '欢迎使用测试版',
	'optin-title-justoptedout' => '感谢您试用我们的测试版',
	'optin-title-feedback' => '测试版反馈',
	'optin-needlogin' => '你需要[$1 登录]才能试用测试版。',
	'optin-intro' => '维基百科可用性小组正在努力改善维基百科的可用性。你想尝试下我们的测试版吗？',
	'optin-feedback-intro' => '感谢您试用测试版。
我们希望了解到您对我们新界面的意见，望阁下不吝笔墨填写下方的调查表。',
	'optin-feedback-back' => '如果您不愿意填写调查表，您可以返回$1。',
	'optin-success-in' => '您现在正在试用测试版。
您随时都可点击屏幕顶部的“{{int:optin-leave}}”返回。',
	'optin-leave-cancel' => '如果您想继续使用测试版，您可以返回$1。',
	'optin-success-out' => '您已成功退出测试版。
您随时都可点击屏幕右上角的“{{int:optin-try}}”再次试用。',
	'optin-success-feedback' => '多谢你的反馈！',
	'optin-accept-short' => '现在就用！',
	'optin-accept-long' => '试用测试版',
	'optin-accept-long-anon' => '登入试用测试版',
	'optin-deny-short' => '不用了，多谢',
	'optin-deny-long' => '回到上一页',
	'optin-submit-out' => '离开测试版',
	'optin-submit-feedback' => '反馈意见',
	'optin-survey-yes' => '是',
	'optin-survey-no' => '否',
	'optin-survey-intro' => '感谢您试用测试版。您可以随时点击上面的“{{int:optin-leave}}”退出。

我们希望了解到您对我们新界面的意见，希望您在单击“[[#leave|{{int:optin-submit-out}}]]”前不吝笔墨填写下方的调查表。',
	'optin-survey-question-likedislike' => '您对测试版有什么喜欢？有什么不喜欢？',
	'optin-survey-question-whyoptout' => '为什么您会退出测试版？（选全部应用到的）',
	'optin-survey-answer-whyoptout-hard' => '难以使用。',
	'optin-survey-answer-whyoptout-didntwork' => '运行不正常。',
	'optin-survey-answer-whyoptout-notpredictable' => '不能做到预期的事。',
	'optin-survey-answer-whyoptout-didntlike-look' => '我不喜欢它的外观。',
	'optin-survey-answer-whyoptout-didntlike-layout' => '我不喜欢它的新标签以及排版。',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => '我不喜欢它的新工具栏。',
	'optin-survey-answer-whyoptout-other' => '其它原因：',
	'optin-survey-question-explain' => '请解释或详述您以上的答案：',
	'optin-survey-question-techfail' => '您在使用测试版时，有没有遇到过什么技术问题？',
	'optin-survey-question-techfail-ifyes' => '如果有的话，请详述或者解释：',
	'optin-survey-question-usedtoolbar' => '您有没有使用新的可扩展工具栏去编辑页面？',
	'optin-survey-question-usedtoolbar-ifyes' => '如果有的话，您喜欢什么？您又不喜欢什么？',
	'optin-survey-question-usedtoolbar-ifno' => '如果没有的话，为什么不去用？会否在将来去用？请解释一下。',
	'optin-survey-question-different' => '我们需要做出什么改变来让你继续使用测试版？',
	'optin-survey-question-feedback' => '如果您对我们还有其他意见，也请让我们知晓——所有反馈都很有用处！',
	'optin-survey-question-browser' => '您使用的浏览器是？',
	'optin-survey-answer-browser-other' => '其它浏览器：',
	'optin-survey-question-os' => '您使用的操作系统是？',
	'optin-survey-answer-os-other' => '其他操作系统：',
	'optin-survey-question-res' => '您的屏幕分辨率有多大？',
	'optin-survey-question-changes' => '您想在未来里看到测试版作出什么改变（多选）？',
	'optin-survey-answer-changes-nav' => '让网站的整体导航更加易用。',
	'optin-survey-answer-changes-edittools' => '增加和加强编辑工具。',
	'optin-survey-answer-changes-upload' => '改善内容和媒体上传。',
	'optin-survey-answer-changes-richtext' => '开发类似于富文本编辑器的编辑工具。',
	'optin-survey-answer-changes-lookfeel' => '更新网站的“外观与感受”。',
	'optin-survey-answer-changes-predictability' => '改善效率预测。',
	'optin-survey-answer-changes-custom' => '允许更加有弹性的用户自定义。',
	'optin-survey-answer-changes-other' => '其他：',
	'optin-improvements' => '== 有何改善？ ==
[[File:UsabilityNavigation.png|left|link=]]
;增强导航功能
新的导航系统会使您更容易地了解到您所处的位置与所做的事，以及您可以前往哪里和怎样前往。我们把搜索框移到了右上角，这样您将能更容易地找到并使用它的功能。<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;编辑栏改进
新近改善的图标让您更加清楚每个工具的实际用途。可扩展的小节减少了混乱：不常用的工具被隐藏了起来，只需单击就可展开。新的帮助小节则提供了常用wiki语法的快速参考途径。
<div style="clear:both;"></div>
== 怎样加入 ==
要了解关于本项目的更多信息或加入我们的工作，请访问[http://usability.wikimedia.org Usability Initiative wiki]。在哪里您能找到关于我们的许可、研究、设计开发以及发布的相关信息。您可以在我们的[http://usability.wikimedia.org/wiki/Talk:Prototype 原型讨论页]提出问题或给出普通的反馈。如要讨论特定的主题，则请使用相关的讨论页。如果您发现了软件错误，请在[http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai发布讨论版]留言或使用[https://bugzilla.wikimedia.org Bugzilla]提交。

感谢您的参与，我们期待您的意见！',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Shinjiman
 */
$messages['zh-hant'] = array(
	'optin' => '可用性倡議加入',
	'optin-desc' => '容許用戶選擇性去加入可用性倡議的可用性增強',
	'optin-title-optedout' => '試用測試版',
	'optin-title-optedin' => '離開測試版',
	'optin-title-justoptedin' => '歡迎來到測試版',
	'optin-title-justoptedout' => '多謝你去試用測試版',
	'optin-title-feedback' => '測試版反饋',
	'optin-needlogin' => '你需要[$1 登入]去試用測試版。',
	'optin-intro' => '維基百科可用性小組開發了一個新皮膚和一個新的編輯工具去加強維基百科的可用性。
您是否想試用我們的測試版？',
	'optin-feedback-intro' => '多謝去試用這個測試版。
我們想知道你對我們的新界面有何看法，如果你完成下面可選的調查，我們會好樂意接受。',
	'optin-feedback-back' => '如果你不想完成下面嘅調查，你可以回到$1。',
	'optin-success-in' => '您已經成功地加入到可用性小組的可用性增強。
您可以隨時點擊上面的"{{int:ooptin-leave}}"去退出。',
	'optin-success-out' => '您已經成功地退出自可用性小組的可用性增強。
您可以隨時點擊上面的"{{int:optin-try}}"去加入。',
	'optin-success-feedback' => '多謝你的反饋！',
	'optin-accept-short' => '現在就去做！',
	'optin-accept-long' => '試試我們的測試版',
	'optin-accept-long-anon' => '登入試用測試版',
	'optin-deny-short' => '不用了，多謝',
	'optin-deny-long' => '回到上一頁',
	'optin-submit-out' => '離開測試版',
	'optin-submit-feedback' => '給意見',
	'optin-survey-yes' => '是',
	'optin-survey-no' => '否',
	'optin-survey-intro' => '多謝您去試用可用性小組的可用性增強。
您可以隨時點擊上面的"{{int:optin-leave}}"去退出。

我們想知道您對這個新界面的想法，因此我們會好高興如果您在點擊"[[#leave|{{int:optin-submit-out}}]]"之前完成一個可選的調查。',
	'optin-survey-question-likedislike' => '您對測試版有什麼喜歡？有什麼不喜歡？',
	'optin-survey-question-whyoptout' => '為什麼您會退出這個界面？（選全部應用到的）',
	'optin-survey-answer-whyoptout-hard' => '太難去使用。',
	'optin-survey-answer-whyoptout-didntwork' => '不能正確地操作。',
	'optin-survey-answer-whyoptout-notpredictable' => '不能做到預期的事。',
	'optin-survey-answer-whyoptout-didntlike-look' => '我不喜歡它的外觀。',
	'optin-survey-answer-whyoptout-didntlike-layout' => '我不喜歡它的新標籤以及排版。',
	'optin-survey-answer-whyoptout-didntlike-toolbar' => '我不喜歡它的新工具列。',
	'optin-survey-answer-whyoptout-other' => '其它原因：',
	'optin-survey-question-explain' => '請解釋或詳述您以上之答案：',
	'optin-survey-question-techfail' => '您在使用測試版時，有沒有曾經遇過任何的技術問題？',
	'optin-survey-question-techfail-ifyes' => '如果有的話，請詳述或者解釋：',
	'optin-survey-question-usedtoolbar' => '您有沒有用過新可擴展的工具列去編輯一個頁面？',
	'optin-survey-question-usedtoolbar-ifyes' => '如果有的話，您喜歡什麼？您又不喜歡什麼？',
	'optin-survey-question-usedtoolbar-ifno' => '如果沒有的話，為什麼不去用？會否在將來去用？請解釋一下。',
	'optin-survey-question-different' => '您在用測試版時，我們做了什麼事改變去令到你持續使用它？',
	'optin-survey-question-feedback' => '請給我們知道你的反饋、看法、以及想法 - 全部的反饋都是有用的！：',
	'optin-survey-question-browser' => '您用哪款瀏覽器？',
	'optin-survey-answer-browser-other' => '其它瀏覽器：',
	'optin-survey-question-os' => '您用哪套操作系統？',
	'optin-survey-answer-os-other' => '其它操作系統：',
	'optin-survey-question-res' => '您的屏幕解像度之大小有多大？',
	'optin-survey-question-changes' => '您想在未來中，期望對測試版有什麼改變（選全部應用到的）？',
	'optin-survey-answer-changes-nav' => '令網站的整體導航更加容易使用。',
	'optin-survey-answer-changes-edittools' => '增加和加強編輯工具。',
	'optin-survey-answer-changes-upload' => '改善內容和媒體上載。',
	'optin-survey-answer-changes-richtext' => '開發與廣文字編輯器相似的編輯工具。',
	'optin-survey-answer-changes-lookfeel' => '更新網站的『樣式與感受』。',
	'optin-survey-answer-changes-predictability' => '改善效率預測。',
	'optin-survey-answer-changes-custom' => '容許更加有彈性的用戶自定。',
	'optin-survey-answer-changes-other' => '其它：',
	'optin-improvements' => '== 有什麼改善？ ==
[[File:UsabilityNavigation.png|left|link=]]
;導航加強
新的導航系統會更加容易地令您知道您在哪裏以及正在做什麼，您可以去哪裏以及怎樣哪裏。搜尋方塊放在右上角，令它的功能更加容易找到，使用得更快。
<div style="clear:both;"></div>

[[File:UsabilityToolbar.png|left|link=]]
;編輯欄改進
新和改善的圖示更加清楚看見每一個工具去做什麼。可以擴展的小節減少混亂，點擊一個按鈕就可以隱藏一些不常用的工具。
而幫助小節提供常用wiki語法的快捷途徑。
<div style="clear:both;"></div>
== 怎樣加入 ==
要知更多有關專案或者加入，請參閱[http://usability.wikimedia.org Usability Initiative wiki]。
在那裏您就會找到我們的准許、研究、設計開發，以及發佈。
去問問題或者給予一般反饋，請用我們的[http://usability.wikimedia.org/wiki/Talk:Prototype 模型討論頁面]。
去解決特定的主題，請用有關的討論頁面。
如果您找到臭蟲，請在[http://usability.wikimedia.org/wiki/Talk:Releases/Acai Acai發佈討論版]留言或者去用[https://bugzilla.wikimedia.org Bugzilla]。

多謝，我們會等待您的意見！',
);

