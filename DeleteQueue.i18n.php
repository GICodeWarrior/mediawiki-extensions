<?php
/**
 * Internationalisation file for extension DeleteQueue.
 *
 * @addtogroup Extensions
 */

$messages = array();

/** English
 * @author Andrew Garrett
 */
$messages['en'] = array(
	// General
	'deletequeue-desc' => 'Creates a [[Special:DeleteQueue|queue-based system for managing deletion]]',

	// Landing page
	'deletequeue-action-queued' => 'Deletion',
	'deletequeue-action' => 'Suggest deletion',
	'deletequeue-action-title' => "Suggest deletion of \"$1\"",
	'deletequeue-action-text' => "{{SITENAME}} has a number of processes for deleting pages:
*If you believe that this page warrants ''speedy deletion'', you may suggest that [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=speedy}} here].
*If this page does not warrant speedy deletion, but ''deletion will likely be uncontroversial'', you should [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=prod}} propose uncontested deletion].
*If this page's deletion is ''likely to be contested'', you should [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=deletediscuss}} open a discussion].",
	'deletequeue-action-text-queued' => "You may view the following pages for this deletion case:
* [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} View current endorsements and objections].
* [{{fullurl:{{FULLPAGENAME}}|action=delvote}} Endorse or object to this page's deletion].",

	// Permissions errors
	'deletequeue-permissions-noedit' => "You must be able to edit a page to be able to affect its deletion status.",

	// Nomination forms
	'deletequeue-generic-reasons' => "* Generic reasons\n ** Vandalism\n ** Spam\n ** Maintenance\n ** Out of project scope",
	'deletequeue-nom-alreadyqueued' => 'This page is already in a deletion queue.',

	// Speedy deletion
	'deletequeue-speedy-title' => 'Mark "$1" for speedy deletion',
	'deletequeue-speedy-text' => "You can use this form to mark the page \"'''$1'''\" for speedy deletion.

An administrator will review this request, and, if it is well-founded, delete the page.
You must select a reason for deletion from the drop-down list below, and add any other relevant information.",
	'deletequeue-speedy-reasons' => "-",

	// Proposed deletion
	'deletequeue-prod-title' => "Propose deletion of \"$1\"",
	'deletequeue-prod-text' => "You can use this form to propose that \"'''$1'''\" is deleted.\n
	If, after five days, nobody has contested this page's deletion, it will be deleted after final review by an administrator.",
	'deletequeue-prod-reasons' => '-',

	'deletequeue-delnom-reason' => 'Reason for nomination:',
	'deletequeue-delnom-otherreason' => 'Other reason',
	'deletequeue-delnom-extra' => 'Extra information:',
	'deletequeue-delnom-submit' => 'Submit nomination',

	// Log entries
	'deletequeue-log-nominate' => "nominated [[$1]] for deletion in the '$2' queue.",
	'deletequeue-log-rmspeedy' => "declined to speedily delete [[$1]].",
	'deletequeue-log-requeue' => "transferred [[$1]] to a different deletion queue: from '$2' to '$3'.",
	'deletequeue-log-dequeue' => "removed [[$1]] from the deletion queue '$2'.",

	// Rights
	'right-speedy-nominate' => 'Nominate pages for speedy deletion',
	'right-speedy-review' => 'Review nominations for speedy deletion',
	'right-prod-nominate' => 'Propose page deletion',
	'right-prod-review' => 'Review uncontested deletion proposals',
	'right-deletediscuss-nominate' => 'Start deletion discussions',
	'right-deletediscuss-review' => 'Close deletion discussions',
	'right-deletequeue-vote' => 'Endorse or object to deletions',

	// Queue names
	'deletequeue-queue-speedy' => 'Speedy deletion',
	'deletequeue-queue-prod' => 'Proposed deletion',
	'deletequeue-queue-deletediscuss' => 'Deletion discussion',

	// Display of status in page body
	'deletequeue-page-speedy' => "This page has been nominated for speedy deletion.
The reason given for this deletion is ''$1''.",
	'deletequeue-page-prod' => "It has been proposed that this page is deleted.
The reason given was ''$1''.
If this proposal is uncontested at ''$2'', this page will be deleted.
You can contest this page's deletion by [{{fullurl:{{FULLPAGENAME}}|action=delvote}} objecting to deletion].",
	'deletequeue-page-deletediscuss' => "This page has been proposed for deletion, and that proposal has been contested.
The reason given was ''$1''.
A discussion is ongoing at [[$3]], which will conclude at ''$2''.",

	// Review
	//Generic
	'deletequeue-notqueued' => 'The page you have selected is currently not queued for deletion',
	'deletequeue-review-action' => "Action to take:",
	'deletequeue-review-delete' => "Delete the page.",
	'deletequeue-review-change' => "Delete this page, but with a different rationale.",
	'deletequeue-review-requeue' => "Transfer this page to the following queue:",
	'deletequeue-review-dequeue' => "Take no action, and remove the page from the deletion queue.",
	'deletequeue-review-reason' => 'Comments:',
	'deletequeue-review-newreason' => 'New reason:',
	'deletequeue-review-newextra' => 'Extra information:',
	'deletequeue-review-submit' => 'Save Review',
	'deletequeue-review-original' => "Reason for nomination",
	'deletequeue-actiondisabled-involved' => 'The following action is disabled because you have taken part in this deletion case in the roles $1:',
	'deletequeue-actiondisabled-notexpired' => 'The following action is disabled because the deletion nomination has not yet expired:',
	'deletequeue-review-badaction' => 'You specified an invalid action',
	'deletequeue-review-actiondenied' => 'You specified an action which is disabled for this page',
	"deletequeue-review-objections" => "'''Warning''': The deletion of this page has [{{fullurl:{{FULLPAGENAME}}|action=delvoteview&votetype=object}} objections].
Please ensure that you have considered these objections before deleting this page.",
	//Speedy deletion
	'deletequeue-reviewspeedy-tab' => 'Review speedy deletion',
	'deletequeue-reviewspeedy-title' => 'Review speedy deletion nomination of "$1"',
	'deletequeue-reviewspeedy-text' => "You can use this form to review the nomination of \"'''$1'''\" for speedy deletion.
Please ensure that this page can be speedily deleted in accordance with policy.",
	//Proposed deletion
	'deletequeue-reviewprod-tab' => 'Review proposed deletion',
	'deletequeue-reviewprod-title' => 'Review proposed deletion of "$1"',
	'deletequeue-reviewprod-text' => "You can use this form to review the uncontested proposal for the deletion of \"'''$1'''\".",
	// Discussions
	'deletequeue-reviewdeletediscuss-tab' => 'Review deletion',
	'deletequeue-reviewdeletediscuss-title' => "Review deletion discussion for \"$1\"",
	'deletequeue-reviewdeletediscuss-text' => "You can use this form to review the deletion discussion of \"'''$1'''\".

A [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} list] of endorsements and objections of this deletion is available, and the discussion itself can be found at [[$2]].
Please ensure that you make a decision in accordance with the consensus on the discussion.",

	// Deletion discussions
	'deletequeue-deletediscuss-discussionpage' => "This is the discussion page for the deletion of [[$1]].
There are currently $2 {{PLURAL:$2|user|users}} endorsing deletion, and $3 {{PLURAL:$3|user|users}} objecting to deletion.
You may [{{fullurl:$1|action=delvote}} endorse or object] to deletion, or [{{fullurl:$1|action=delviewvotes}} view all endorsements and objections].",
	'deletequeue-discusscreate-summary' => 'Creating discussion for deletion of [[$1]].',
	'deletequeue-discusscreate-text' => 'Deletion proposed for the following reason: $2',

	// Roles
	'deletequeue-role-nominator' => 'original nominator for deletion',
	'deletequeue-role-vote-endorse' => 'endorser of deletion',
	'deletequeue-role-vote-object' => 'objector to deletion',

	// Endorsement and objection
	'deletequeue-vote-tab' => 'Vote on the deletion',
	'deletequeue-vote-title' => 'Endorse or object to deletion of "$1"',
	'deletequeue-vote-text' => "You may use this form to endorse or object to the deletion of \"'''$1'''\".
This action will override any previous endorsements/objections you have given to deletion of this page.
You can [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} view] the existing endorsements and objections.
The reason given in the nomination for deletion was ''$2''.",
	'deletequeue-vote-legend' => 'Endorse/Object to deletion',
	'deletequeue-vote-action' => 'Recommendation:',
	'deletequeue-vote-endorse' => 'Endorse deletion.',
	'deletequeue-vote-object' => 'Object to deletion.',
	'deletequeue-vote-reason' => 'Comments:',
	'deletequeue-vote-submit' => 'Submit',
	'deletequeue-vote-success-endorse' => 'You have successfully endorsed the deletion of this page.',
	'deletequeue-vote-success-object' => 'You have successfully objected to the deletion of this page.',
	'deletequeue-vote-requeued' => 'You have successfully objected to the deletion of this page.
Due to your objection, the page has been moved to the $1 queue.',

	// View all votes
	'deletequeue-showvotes' => "Endorsements and objections to deletion of \"$1\"",
	'deletequeue-showvotes-text' => "Below are the endorsements and objections made to the deletion of the page \"'''$1'''\".
You can register your own endorsement of, or objection to this deletion [{{fullurl:{{FULLPAGENAME}}|action=delvote}} here].",
	'deletequeue-showvotes-restrict-endorse' => "Show endorsements only",
	'deletequeue-showvotes-restrict-object' => "Show objections only",
	'deletequeue-showvotes-restrict-none' => "Show all endorsements and objections",
	'deletequeue-showvotes-vote-endorse' => "'''Endorsed''' deletion at $1 $2",
	'deletequeue-showvotes-vote-object' => "'''Objected''' to deletion at $1 $2",
	'deletequeue-showvotes-showingonly-endorse' => "Showing only endorsements",
	'deletequeue-showvotes-showingonly-object' => "Showing only objections",
	'deletequeue-showvotes-none' => "There are no endorsements or objections to the deletion of this page.",
	'deletequeue-showvotes-none-endorse' => "There are no endorsements of the deletion of this page.",
	'deletequeue-showvotes-none-object' => "There are no objections to the deletion of this page.",

	// List of queued pages
	'deletequeue' => 'Deletion queue',
	'deletequeue-list-text' => "This page displays all pages which are in the deletion system.",
	'deletequeue-list-search-legend' => 'Search for pages',
	'deletequeue-list-queue' => 'Queue:',
	'deletequeue-list-status' => 'Status:',
	'deletequeue-list-expired' => 'Show only nominations requiring closing.',
	'deletequeue-list-search' => 'Search',
	'deletequeue-list-anyqueue' => '(any)',
	'deletequeue-list-votes' => 'List of votes',
	'deletequeue-list-votecount' => '$1 {{PLURAL:$1|endorsement|endorsements}}, $2 {{PLURAL:$2|objection|objections}}',
	'deletequeue-list-header-page' => 'Page',
	'deletequeue-list-header-queue' => 'Queue',
	'deletequeue-list-header-votes' => 'Endorsements and objections',
	'deletequeue-list-header-expiry' => 'Expiry',
	'deletequeue-list-header-discusspage' => 'Discussion page',
);

/** Message documentation (Message documentation)
 * @author Darth Kule
 * @author EugeneZelenko
 * @author Ferrer
 * @author Jon Harald Søby
 * @author Purodha
 * @author Siebrand
 */
$messages['qqq'] = array(
	'deletequeue-desc' => 'Shown in [[Special:Version]] as a short description of this extension. Do not translate links.',
	'deletequeue-permissions-noedit' => '* $1 is a list of formatted error messages.',
	'deletequeue-generic-reasons' => 'Delete reasons in a dropdown menu. Lines prepended with "*" are a category separator. Lines prepended with "**" can be used as a reason. Please do not add additional reasons. This should be customised on wikis where the extension is actually being used.',
	'deletequeue-delnom-otherreason' => '{{Identical|Other reason}}',
	'deletequeue-delnom-extra' => '{{Identical|Extra information}}',
	'right-speedy-nominate' => '{{doc-right}}',
	'right-speedy-review' => '{{doc-right}}',
	'right-prod-nominate' => '{{doc-right}}',
	'right-prod-review' => '{{doc-right}}',
	'right-deletediscuss-nominate' => '{{doc-right}}',
	'right-deletediscuss-review' => '{{doc-right}}',
	'right-deletequeue-vote' => '{{doc-right}}',
	'deletequeue-review-reason' => '{{Identical|Comments}}',
	'deletequeue-review-newextra' => '{{Identical|Extra information}}',
	'deletequeue-vote-reason' => '{{Identical|Comments}}',
	'deletequeue-vote-submit' => '{{Identical|Submit}}',
	'deletequeue-list-queue' => '{{Identical|Queue}}',
	'deletequeue-list-status' => '{{Identical|Status}}',
	'deletequeue-list-search' => '{{Identical|Search}}',
	'deletequeue-list-header-page' => '{{Identical|Page}}',
	'deletequeue-list-header-queue' => '{{Identical|Queue}}',
	'deletequeue-list-header-expiry' => '{{Identical|Expiry}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'deletequeue-review-reason' => 'Opmerkings:',
	'deletequeue-vote-reason' => 'Opmerkings:',
);

/** Aragonese (Aragonés)
 * @author Remember the dot
 */
$messages['an'] = array(
	'deletequeue-list-header-page' => 'Pachina',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'deletequeue-desc' => 'ينشئ [[Special:DeleteQueue|نظاما معتمدا على طابور للتحكم بالحذف]]',
	'deletequeue-action-queued' => 'حذف',
	'deletequeue-action' => 'اقتراح الحذف',
	'deletequeue-action-title' => 'اقتراح الحذف ل"$1"',
	'deletequeue-action-text' => "{{SITENAME}} لديه عدد من العمليات لحذف الصفحات:
*لو أنك تعتقد أن هذه الصفحة تحتاج ''الحذف السريع''، يمكنك أن تقترح هذا هنا [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=speedy}} هنا].
*لو أن هذه الصفحة لا تحتاج الحذف السريع، لكن ''الحذف سيكون على الأرجح غير خلافي''، ينبغي عليك أن [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=prod}} تقترح الحذف].
*لو أن حذف هذه الصفحة ''على الأرجح سيتم الاعتراض عليه''، ينبغي عليك أن [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=deletediscuss}} تبدأ نقاشا].",
	'deletequeue-action-text-queued' => 'أنت يمكنك رؤية الصفحات التالية لحالة الحذف هذه:
* [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} عرض عمليات التأييد والمعارضة الحالية].
* [{{fullurl:{{FULLPAGENAME}}|action=delvote}} تأييد أو معارضة حذف هذه الصفحة].',
	'deletequeue-permissions-noedit' => 'يجب أن تكون قادرا على تعديل الصفحة لتكون قادرا على التاثير على حالة حذفها.',
	'deletequeue-generic-reasons' => '* أسباب متكررة
  ** تخريب
  ** سبام
  ** صيانة
  ** خارج نطاق المشروع',
	'deletequeue-nom-alreadyqueued' => 'هذه الصفحة موجودة بالفعل في طابور حذف.',
	'deletequeue-speedy-title' => 'علم على "$1" للحذف السريع',
	'deletequeue-speedy-text' => "أنت يمكنك استخدام هذه الاستمارة للتعليم على الصفحة \"'''\$1'''\" للحذف السريع.

أحد الإداريين سيراجع هذا الطلب، و، لو أن أسبابه قوية، سيحذف الصفحة.
يجب عليك أن تختار سببا للحذف من قائمة الاختيارات بالأسفل، وتضيف أي معلومات متعلقة أخرى.",
	'deletequeue-prod-title' => 'اقتراح حذف "$1"',
	'deletequeue-prod-text' => "أنت يمكنك استخدام هذه الاستمارة لاقتراح حذف \"'''\$1'''\".

لو، بعد خمسة أيام، لا أحد اعترض على حذف هذه الصفحة، سيتم حذفها بعد مراجعة نهائية بواسطة إداري.",
	'deletequeue-delnom-reason' => 'السبب للترشيح:',
	'deletequeue-delnom-otherreason' => 'سبب آخر',
	'deletequeue-delnom-extra' => 'معلومات إضافية:',
	'deletequeue-delnom-submit' => 'تنفيذ الترشيح',
	'deletequeue-log-nominate' => "رشح [[$1]] للحذف في طابور '$2'.",
	'deletequeue-log-rmspeedy' => 'رفض أن يحذف سريعا [[$1]].',
	'deletequeue-log-requeue' => "نقل [[$1]] إلى طابور حذف مختلف: من '$2' إلى '$3'.",
	'deletequeue-log-dequeue' => "أزال [[$1]] من طابور الحذف '$2'.",
	'right-speedy-nominate' => 'ترشيح الصفحات للحذف السريع',
	'right-speedy-review' => 'مراجعة الترشيحات للحذف السريع',
	'right-prod-nominate' => 'اقتراح حذف الصفحة',
	'right-prod-review' => 'مراجعة اقتراحات الحذف غير المعترض عليها',
	'right-deletediscuss-nominate' => 'بدء نقاشات الحذف',
	'right-deletediscuss-review' => 'إغلاق نقاشات الحذف',
	'right-deletequeue-vote' => 'تأييد أو معارضة عمليات الحذف',
	'deletequeue-queue-speedy' => 'حذف سريع',
	'deletequeue-queue-prod' => 'حذف مقترح',
	'deletequeue-queue-deletediscuss' => 'نقاش الحذف',
	'deletequeue-page-speedy' => "هذه الصفحة تم ترشيحها للحذف السريع.
السبب المعطى لهذا الحذف هو ''$1''.",
	'deletequeue-page-prod' => "تم اقتراح حذف هذه الصفحة.
السبب المعطى كان ''$1''.
لو أن هذا الاقتراح لم يتم الاعتراض عليه في ''$2''، فهذه الصفحة سيتم حذفها.
يمكنك الاعتراض على حذف هذه الصفحة بواسطة [{{fullurl:{{FULLPAGENAME}}|action=delvote}} الاعتراض على الحذف].",
	'deletequeue-page-deletediscuss' => "هذه الصفحة تم اقتراحها للحذف، وهذا الاقتراح تم الاعتراض عليه.
السبب المعطى كان ''$1''.
يجري نقاش في [[$3]]، سينتهي في ''$2''.",
	'deletequeue-notqueued' => 'الصفحة التي اخترتها ليست في طابور الحذف حاليا',
	'deletequeue-review-action' => 'الفعل للعمل:',
	'deletequeue-review-delete' => 'حذف الصفحة.',
	'deletequeue-review-change' => 'حذف هذه الصفحة، لكن بسبب مختلف.',
	'deletequeue-review-requeue' => 'نقل هذه الصفحة إلى الطابور التالي:',
	'deletequeue-review-dequeue' => 'عدم اتخاذ أي إجراء، وإزالة الصفحة من طابور الحذف.',
	'deletequeue-review-reason' => 'تعليقات:',
	'deletequeue-review-newreason' => 'سبب جديد:',
	'deletequeue-review-newextra' => 'معلومات إضافية:',
	'deletequeue-review-submit' => 'حفظ المراجعة',
	'deletequeue-review-original' => 'السبب للترشيح',
	'deletequeue-actiondisabled-involved' => 'الفعل التالي معطل لأنك قمت بدور في حالة الحذف هذه في الأدوار $1:',
	'deletequeue-actiondisabled-notexpired' => 'الفعل التالي معطل لأن ترشيح الحذف لم ينته بعد:',
	'deletequeue-review-badaction' => 'أنت حددت فعلا غير صحيح',
	'deletequeue-review-actiondenied' => 'أنت حددت فعلا معطلا لهذه الصفحة',
	'deletequeue-review-objections' => "'''تحذير''': حذف هذه الصفحة لديه [{{fullurl:{{FULLPAGENAME}}|action=delvoteview&votetype=object}} اعتراضات].
من فضلك تأكد من أنك أخذت هذه الاعتراضات بالاعتبار قبل حذف هذه الصفحة.",
	'deletequeue-reviewspeedy-tab' => 'مراجعة الحذف السريع',
	'deletequeue-reviewspeedy-title' => 'مراجعة ترشيح الحذف السريع ل"$1"',
	'deletequeue-reviewspeedy-text' => "أنت يمكنك استخدام هذه الاستمارة لمراجعة ترشيح \"'''\$1'''\" للحذف السريع.
من فضلك تأكد من أن هذه الصفحة يمكن حذفها حذفا سريعا بالتوافق مع السياسة.",
	'deletequeue-reviewprod-tab' => 'مراجعة الحذف المقترح',
	'deletequeue-reviewprod-title' => 'مراجعة الحذف المقترح ل"$1"',
	'deletequeue-reviewprod-text' => "أنت يمكنك استخدام هذه الاستمارة لمراجعة ترشيح الحذف غير المعترض عليه ل\"'''\$1'''\".",
	'deletequeue-reviewdeletediscuss-tab' => 'مراجعة الحذف',
	'deletequeue-reviewdeletediscuss-title' => 'مراجعة نقاش الحذف ل"$1"',
	'deletequeue-reviewdeletediscuss-text' => "أنت يمكنك استخدام هذه الاستمارة لمراجعة نقاش الحذف ل\"'''\$1'''\".

[{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} قائمة] بالتاييدات والاعتراضات على هذا الحذف متوفرة، والنقاش نفسه يمكن العثور عليه في [[\$2]].
من فضلك تأكد من أنك تتخذ قرارا مع الأخذ في الاعتبار التوافق في النقاش.",
	'deletequeue-deletediscuss-discussionpage' => 'هذه هي صفحة النقاش لحذف [[$1]].
يوجد حاليا $2 {{PLURAL:$2|مستخدم يؤيد|مستخدم يؤيد}} الحذف، و $3 {{PLURAL:$3|مستخدم يعارض|مستخدم يعارض}} الحذف.
يمكنك [{{fullurl:$1|action=delvote}} تأييد أو معارضة] الحذف، أو [{{fullurl:$1|action=delviewvotes}} رؤية كل التأييدات والاعتراضات].',
	'deletequeue-discusscreate-summary' => 'إنشاء نقاش لحذف [[$1]].',
	'deletequeue-discusscreate-text' => 'الحذف تم اقتراحه للسبب التالي: $2',
	'deletequeue-role-nominator' => 'المرشح الأصلي للحذف',
	'deletequeue-role-vote-endorse' => 'مؤيد للحذف',
	'deletequeue-role-vote-object' => 'معترض على الحذف',
	'deletequeue-vote-tab' => 'تصويت على الحذف',
	'deletequeue-vote-title' => 'تأييد أو معارضة حذف "$1"',
	'deletequeue-vote-text' => "أنت يمكنك استخدام هذه الاستمارة لتأييد أو معارضة حذف \"'''\$1'''\".
هذا الفعل سيلغي أي تأييدات/اعتراضات قمت بها لحذف هذه الصفحة.
يمكنك [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} رؤية] التأييدات والاعتراضات الموجودة.
السبب المعطى في الترشيح للحذف كان ''\$2''.",
	'deletequeue-vote-legend' => 'تأييد/معارضة الحذف',
	'deletequeue-vote-action' => 'توصية:',
	'deletequeue-vote-endorse' => 'تأييد الحذف.',
	'deletequeue-vote-object' => 'معارضة الحذف.',
	'deletequeue-vote-reason' => 'تعليقات:',
	'deletequeue-vote-submit' => 'تنفيذ',
	'deletequeue-vote-success-endorse' => 'أنت أيدت بنجاح حذف هذه الصفحة.',
	'deletequeue-vote-success-object' => 'أنت اعترضت بنجاح على حذف هذه الصفحة.',
	'deletequeue-vote-requeued' => 'أنت اعترضت بنجاح على حذف هذه الصفحة.
نتيجة لاعتراضك، الصفحة تم نقلها إلى طابور $1.',
	'deletequeue-showvotes' => 'التأييدات والاعتراضات على حذف "$1"',
	'deletequeue-showvotes-text' => "بالأسفل التأييدات والاعتراضات على حذف الصفحة \"'''\$1'''\".
يمكنك تسجيل تأييدك الخاص، أو اعتراضك على هذا الحذف [{{fullurl:{{FULLPAGENAME}}|action=delvote}} هنا].",
	'deletequeue-showvotes-restrict-endorse' => 'عرض التأييد فقط',
	'deletequeue-showvotes-restrict-object' => 'عرض الاعتراضات فقط',
	'deletequeue-showvotes-restrict-none' => 'عرض كل التأييدات والاعتراضات',
	'deletequeue-showvotes-vote-endorse' => "'''أيد''' الحذف في $1 $2",
	'deletequeue-showvotes-vote-object' => "'''عارض''' الحذف في $1 $2",
	'deletequeue-showvotes-showingonly-endorse' => 'عرض التأييدات فقط',
	'deletequeue-showvotes-showingonly-object' => 'عرض الاعتراضات فقط',
	'deletequeue-showvotes-none' => 'لا توجد تأييدات أو اعتراضات لحذف هذه الصفحة.',
	'deletequeue-showvotes-none-endorse' => 'لا توجد تأييدات لحذف هذه الصفحة.',
	'deletequeue-showvotes-none-object' => 'لا توجد اعتراضات على حذف هذه الصفحة.',
	'deletequeue' => 'طابور الحذف',
	'deletequeue-list-text' => 'هذه الصفحة تعرض كل الصفحات التي هي في نظام الحذف.',
	'deletequeue-list-search-legend' => 'بحث عن الصفحات',
	'deletequeue-list-queue' => 'طابور:',
	'deletequeue-list-status' => 'حالة:',
	'deletequeue-list-expired' => 'اعرض فقط الترشيحات المحتاجة للإغلاق.',
	'deletequeue-list-search' => 'بحث',
	'deletequeue-list-anyqueue' => '(أي)',
	'deletequeue-list-votes' => 'قائمة الأصوات',
	'deletequeue-list-votecount' => '$1 {{PLURAL:$1|تأييد|تأييد}}، $2 {{PLURAL:$2|اعتراض|اعتراض}}',
	'deletequeue-list-header-page' => 'صفحة',
	'deletequeue-list-header-queue' => 'طابور',
	'deletequeue-list-header-votes' => 'التأييد والاعتراضات',
	'deletequeue-list-header-expiry' => 'تاريخ الانتهاء',
	'deletequeue-list-header-discusspage' => 'صفحة نقاش',
);

/** Araucanian (Mapudungun)
 * @author Remember the dot
 */
$messages['arn'] = array(
	'deletequeue-list-header-page' => 'Pakina',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 */
$messages['arz'] = array(
	'deletequeue-desc' => 'ينشئ [[Special:DeleteQueue|نظاما معتمدا على طابور للتحكم بالحذف]]',
	'deletequeue-action-queued' => 'حذف',
	'deletequeue-action' => 'اقتراح الحذف',
	'deletequeue-action-title' => 'اقتراح الحذف ل"$1"',
	'deletequeue-action-text' => "{{SITENAME}} لديه عدد من العمليات لحذف الصفحات:
*لو أنك تعتقد أن هذه الصفحة تحتاج ''الحذف السريع''، يمكنك أن تقترح هذا هنا [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=speedy}} هنا].
*لو أن هذه الصفحة لا تحتاج الحذف السريع، لكن ''الحذف سيكون على الأرجح غير خلافي''، ينبغى عليك أن [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=prod}} تقترح الحذف].
*لو أن حذف هذه الصفحة ''على الأرجح سيتم الاعتراض عليه''، ينبغى عليك أن [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=deletediscuss}} تبدأ نقاشا].",
	'deletequeue-action-text-queued' => 'أنت يمكنك رؤية الصفحات التالية لحالة الحذف هذه:
* [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} عرض عمليات التأييد والمعارضة الحالية].
* [{{fullurl:{{FULLPAGENAME}}|action=delvote}} تأييد أو معارضة حذف هذه الصفحة].',
	'deletequeue-permissions-noedit' => 'يجب أن تكون قادرا على تعديل الصفحة لتكون قادرا على التاثير على حالة حذفها.',
	'deletequeue-generic-reasons' => '* أسباب متكررة
  ** تخريب
  ** سبام
  ** صيانة
  ** خارج نطاق المشروع',
	'deletequeue-nom-alreadyqueued' => 'هذه الصفحة موجودة بالفعل فى طابور حذف.',
	'deletequeue-speedy-title' => 'علم على "$1" للحذف السريع',
	'deletequeue-speedy-text' => "أنت يمكنك استخدام هذه الاستمارة للتعليم على الصفحة \"'''\$1'''\" للحذف السريع.

أحد الإداريين سيراجع هذا الطلب، و، لو أن أسبابه قوية، سيحذف الصفحة.
يجب عليك أن تختار سببا للحذف من قائمة الاختيارات بالأسفل، وتضيف أى معلومات متعلقة أخرى.",
	'deletequeue-prod-title' => 'اقتراح حذف "$1"',
	'deletequeue-prod-text' => "أنت يمكنك استخدام هذه الاستمارة لاقتراح حذف \"'''\$1'''\".

لو، بعد خمسة أيام، لا أحد اعترض على حذف هذه الصفحة، سيتم حذفها بعد مراجعة نهائية بواسطة إداري.",
	'deletequeue-delnom-reason' => 'السبب للترشيح:',
	'deletequeue-delnom-otherreason' => 'سبب آخر',
	'deletequeue-delnom-extra' => 'معلومات إضافية:',
	'deletequeue-delnom-submit' => 'تنفيذ الترشيح',
	'deletequeue-log-nominate' => "رشح [[$1]] للحذف فى طابور '$2'.",
	'deletequeue-log-rmspeedy' => 'رفض أن يحذف سريعا [[$1]].',
	'deletequeue-log-requeue' => "نقل [[$1]] إلى طابور حذف مختلف: من '$2' إلى '$3'.",
	'deletequeue-log-dequeue' => "أزال [[$1]] من طابور الحذف '$2'.",
	'right-speedy-nominate' => 'ترشيح الصفحات للحذف السريع',
	'right-speedy-review' => 'مراجعة الترشيحات للحذف السريع',
	'right-prod-nominate' => 'اقتراح حذف الصفحة',
	'right-prod-review' => 'مراجعة اقتراحات الحذف غير المعترض عليها',
	'right-deletediscuss-nominate' => 'بدء نقاشات الحذف',
	'right-deletediscuss-review' => 'إغلاق نقاشات الحذف',
	'right-deletequeue-vote' => 'تأييد أو معارضة عمليات الحذف',
	'deletequeue-queue-speedy' => 'حذف سريع',
	'deletequeue-queue-prod' => 'حذف مقترح',
	'deletequeue-queue-deletediscuss' => 'نقاش الحذف',
	'deletequeue-page-speedy' => "هذه الصفحة تم ترشيحها للحذف السريع.
السبب المعطى لهذا الحذف هو ''$1''.",
	'deletequeue-page-prod' => "تم اقتراح حذف هذه الصفحة.
السبب المعطى كان ''$1''.
لو أن هذا الاقتراح لم يتم الاعتراض عليه فى ''$2''، فهذه الصفحة سيتم حذفها.
يمكنك الاعتراض على حذف هذه الصفحة بواسطة [{{fullurl:{{FULLPAGENAME}}|action=delvote}} الاعتراض على الحذف].",
	'deletequeue-page-deletediscuss' => "هذه الصفحة تم اقتراحها للحذف، وهذا الاقتراح تم الاعتراض عليه.
السبب المعطى كان ''$1''.
يجرى نقاش فى [[$3]]، سينتهى فى ''$2''.",
	'deletequeue-notqueued' => 'الصفحة التى اخترتها ليست فى طابور الحذف حاليا',
	'deletequeue-review-action' => 'الفعل للعمل:',
	'deletequeue-review-delete' => 'حذف الصفحة.',
	'deletequeue-review-change' => 'حذف هذه الصفحة، لكن بسبب مختلف.',
	'deletequeue-review-requeue' => 'نقل هذه الصفحة إلى الطابور التالي:',
	'deletequeue-review-dequeue' => 'عدم اتخاذ أى إجراء، وإزالة الصفحة من طابور الحذف.',
	'deletequeue-review-reason' => 'تعليقات:',
	'deletequeue-review-newreason' => 'سبب جديد:',
	'deletequeue-review-newextra' => 'معلومات إضافية:',
	'deletequeue-review-submit' => 'حفظ المراجعة',
	'deletequeue-review-original' => 'السبب للترشيح',
	'deletequeue-actiondisabled-involved' => 'الفعل التالى معطل لأنك قمت بدور فى حالة الحذف هذه فى الأدوار $1:',
	'deletequeue-actiondisabled-notexpired' => 'الفعل التالى معطل لأن ترشيح الحذف لم ينته بعد:',
	'deletequeue-review-badaction' => 'أنت حددت فعلا غير صحيح',
	'deletequeue-review-actiondenied' => 'أنت حددت فعلا معطلا لهذه الصفحة',
	'deletequeue-review-objections' => "'''تحذير''': حذف هذه الصفحة لديه [{{fullurl:{{FULLPAGENAME}}|action=delvoteview&votetype=object}} اعتراضات].
من فضلك تأكد من أنك أخذت هذه الاعتراضات بالاعتبار قبل حذف هذه الصفحة.",
	'deletequeue-reviewspeedy-tab' => 'مراجعة الحذف السريع',
	'deletequeue-reviewspeedy-title' => 'مراجعة ترشيح الحذف السريع ل"$1"',
	'deletequeue-reviewspeedy-text' => "أنت يمكنك استخدام هذه الاستمارة لمراجعة ترشيح \"'''\$1'''\" للحذف السريع.
من فضلك تأكد من أن هذه الصفحة يمكن حذفها حذفا سريعا بالتوافق مع السياسة.",
	'deletequeue-reviewprod-tab' => 'مراجعة الحذف المقترح',
	'deletequeue-reviewprod-title' => 'مراجعة الحذف المقترح ل"$1"',
	'deletequeue-reviewprod-text' => "أنت يمكنك استخدام هذه الاستمارة لمراجعة ترشيح الحذف غير المعترض عليه ل\"'''\$1'''\".",
	'deletequeue-reviewdeletediscuss-tab' => 'مراجعة الحذف',
	'deletequeue-reviewdeletediscuss-title' => 'مراجعة نقاش الحذف ل"$1"',
	'deletequeue-reviewdeletediscuss-text' => "أنت يمكنك استخدام هذه الاستمارة لمراجعة نقاش الحذف ل\"'''\$1'''\".

[{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} قائمة] بالتاييدات والاعتراضات على هذا الحذف متوفرة، والنقاش نفسه يمكن العثور عليه فى [[\$2]].
من فضلك تأكد من أنك تتخذ قرارا مع الأخذ فى الاعتبار التوافق فى النقاش.",
	'deletequeue-deletediscuss-discussionpage' => 'هذه هى صفحة النقاش لحذف [[$1]].
يوجد حاليا $2 {{PLURAL:$2|مستخدم يؤيد|مستخدم يؤيد}} الحذف، و $3 {{PLURAL:$3|مستخدم يعارض|مستخدم يعارض}} الحذف.
يمكنك [{{fullurl:$1|action=delvote}} تأييد أو معارضة] الحذف، أو [{{fullurl:$1|action=delviewvotes}} رؤية كل التأييدات والاعتراضات].',
	'deletequeue-discusscreate-summary' => 'إنشاء نقاش لحذف [[$1]].',
	'deletequeue-discusscreate-text' => 'الحذف تم اقتراحه للسبب التالي: $2',
	'deletequeue-role-nominator' => 'المرشح الأصلى للحذف',
	'deletequeue-role-vote-endorse' => 'مؤيد للحذف',
	'deletequeue-role-vote-object' => 'معترض على الحذف',
	'deletequeue-vote-tab' => 'تصويت على الحذف',
	'deletequeue-vote-title' => 'تأييد أو معارضة حذف "$1"',
	'deletequeue-vote-text' => "أنت يمكنك استخدام هذه الاستمارة لتأييد أو معارضة حذف \"'''\$1'''\".
هذا الفعل سيلغى أى تأييدات/اعتراضات قمت بها لحذف هذه الصفحة.
يمكنك [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} رؤية] التأييدات والاعتراضات الموجودة.
السبب المعطى فى الترشيح للحذف كان ''\$2''.",
	'deletequeue-vote-legend' => 'تأييد/معارضة الحذف',
	'deletequeue-vote-action' => 'توصية:',
	'deletequeue-vote-endorse' => 'تأييد الحذف.',
	'deletequeue-vote-object' => 'معارضة الحذف.',
	'deletequeue-vote-reason' => 'تعليقات:',
	'deletequeue-vote-submit' => 'تنفيذ',
	'deletequeue-vote-success-endorse' => 'أنت أيدت بنجاح حذف هذه الصفحة.',
	'deletequeue-vote-success-object' => 'أنت اعترضت بنجاح على حذف هذه الصفحة.',
	'deletequeue-vote-requeued' => 'أنت اعترضت بنجاح على حذف هذه الصفحة.
نتيجة لاعتراضك، الصفحة تم نقلها إلى طابور $1.',
	'deletequeue-showvotes' => 'التأييدات والاعتراضات على حذف "$1"',
	'deletequeue-showvotes-text' => "بالأسفل التأييدات والاعتراضات على حذف الصفحة \"'''\$1'''\".
يمكنك تسجيل تأييدك الخاص، أو اعتراضك على هذا الحذف [{{fullurl:{{FULLPAGENAME}}|action=delvote}} هنا].",
	'deletequeue-showvotes-restrict-endorse' => 'عرض التأييد فقط',
	'deletequeue-showvotes-restrict-object' => 'عرض الاعتراضات فقط',
	'deletequeue-showvotes-restrict-none' => 'عرض كل التأييدات والاعتراضات',
	'deletequeue-showvotes-vote-endorse' => "'''أيد''' الحذف فى $1 $2",
	'deletequeue-showvotes-vote-object' => "'''عارض''' الحذف فى $1 $2",
	'deletequeue-showvotes-showingonly-endorse' => 'عرض التأييدات فقط',
	'deletequeue-showvotes-showingonly-object' => 'عرض الاعتراضات فقط',
	'deletequeue-showvotes-none' => 'لا توجد تأييدات أو اعتراضات لحذف هذه الصفحة.',
	'deletequeue-showvotes-none-endorse' => 'لا توجد تأييدات لحذف هذه الصفحة.',
	'deletequeue-showvotes-none-object' => 'لا توجد اعتراضات على حذف هذه الصفحة.',
	'deletequeue' => 'طابور الحذف',
	'deletequeue-list-text' => 'هذه الصفحة تعرض كل الصفحات التى هى فى نظام الحذف.',
	'deletequeue-list-search-legend' => 'بحث عن الصفحات',
	'deletequeue-list-queue' => 'طابور:',
	'deletequeue-list-status' => 'حالة:',
	'deletequeue-list-expired' => 'اعرض فقط الترشيحات المحتاجة للإغلاق.',
	'deletequeue-list-search' => 'بحث',
	'deletequeue-list-anyqueue' => '(أي)',
	'deletequeue-list-votes' => 'قائمة الأصوات',
	'deletequeue-list-votecount' => '$1 {{PLURAL:$1|تأييد|تأييد}}، $2 {{PLURAL:$2|اعتراض|اعتراض}}',
	'deletequeue-list-header-page' => 'صفحة',
	'deletequeue-list-header-queue' => 'طابور',
	'deletequeue-list-header-votes' => 'التأييد والاعتراضات',
	'deletequeue-list-header-expiry' => 'تاريخ الانتهاء',
	'deletequeue-list-header-discusspage' => 'صفحة نقاش',
);

/** Assamese (অসমীয়া)
 * @author Chaipau
 */
$messages['as'] = array(
	'deletequeue-list-search' => 'সন্ধান কৰক',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 */
$messages['be-tarask'] = array(
	'deletequeue-list-status' => 'Статус:',
	'deletequeue-list-header-page' => 'Старонка',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'deletequeue-speedy-title' => 'Отбелязване на „$1“ за бързо изтриване',
	'deletequeue-delnom-reason' => 'Причина за номинирането:',
	'deletequeue-delnom-otherreason' => 'Друга причина',
	'deletequeue-delnom-extra' => 'Допълнителна информация:',
	'deletequeue-review-action' => 'Действие за предприемане:',
	'deletequeue-review-delete' => 'Изтриване на страницата.',
	'deletequeue-review-reason' => 'Коментари:',
	'deletequeue-review-newreason' => 'Нова причина:',
	'deletequeue-review-newextra' => 'Допълнителна информация:',
	'deletequeue-review-original' => 'Причина за номинирането',
	'deletequeue-vote-reason' => 'Коментари:',
	'deletequeue-vote-submit' => 'Изпращане',
	'deletequeue-list-search-legend' => 'Търсене за страници',
	'deletequeue-list-queue' => 'Опашка:',
	'deletequeue-list-status' => 'Статут:',
	'deletequeue-list-search' => 'Търсене',
	'deletequeue-list-header-page' => 'Страница',
	'deletequeue-list-header-queue' => 'Опашка',
	'deletequeue-list-header-discusspage' => 'Дискусионна страница',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'deletequeue-delnom-otherreason' => 'Ostali razlozi',
	'deletequeue-list-search' => 'Traži',
	'deletequeue-list-header-page' => 'Stranica',
);

/** German (Deutsch)
 * @author ChrisiPK
 */
$messages['de'] = array(
	'deletequeue-desc' => 'Erstellt ein [[Special:DeleteQueue|auf einer Warteschlange basierendes System zur Verwaltung von Löschungen]]',
	'deletequeue-action-queued' => 'Löschung',
	'deletequeue-action' => 'Löschung vorschlagen',
	'deletequeue-action-title' => '„$1“ zur Löschung vorschlagen',
	'deletequeue-action-text' => "{{SITENAME}} hat mehrere unterschiedliche Vorgehensweisen bei der Löschung von Seiten:
*Wenn du glaubst, dass diese Seite die ''Schnelllöschkriterien'' erfüllt, kannst du sie [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=speedy}} hier] vorschlagen.
*Wenn diese Seite nicht zur Schnelllöschung geeignet ist, aber die Löschung ''wahrscheinlich nicht kontrovers'' ist, solltest du sie zur [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=prod}} unumstrittenen Löschung] vorschlagen.
*Wenn die Löschung dieser Seite ''wahrscheinlich umstritten'' ist, solltest du [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=deletediscuss}} eine Diskussion eröffnen].",
	'deletequeue-action-text-queued' => 'Du kannst die folgenden Seiten für den Löschantrag aufrufen:
* [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} Pros und Contras].
* [{{fullurl:{{FULLPAGENAME}}|action=delvote}} Stimme zu diesem Löschantrag abgeben].',
	'deletequeue-permissions-noedit' => 'Du musst eine Seite bearbeiten können, um ihren Löschstatus zu verändern.',
	'deletequeue-generic-reasons' => '* Oft vorkommende Gründe
  ** Vandalismus
  ** Werbung
  ** Wartung
  ** Nicht mit dem Projektziel vereinbar',
	'deletequeue-nom-alreadyqueued' => 'Diese Seite ist bereits in der Lösch-Warteschlange.',
	'deletequeue-speedy-title' => '„$1“ zur Schnelllöschung vorschlagen',
	'deletequeue-speedy-text' => "Auf dieser Seite kannst du „'''$1'''“ zur Schnelllöschung vorschlagen.

Ein Administrator wird den Antrag begutachten und, wenn er gut begründet ist, die Seite löschen.
Du musst einen Löschgrund aus dem untenstehenden Dropdown-Menü auswählen und alle weiteren relevanten Informationen hinzufügen.",
	'deletequeue-prod-title' => '„$1“ zur Löschung vorschlagen',
	'deletequeue-prod-text' => "Auf dieser Seite kannst du „'''$1'''“ zur Löschung vorschlagen.

Wenn nach fünf Tagen niemand Einspruch gegen die Löschung eingelegt hat, wird die Seite nach Begutachtung durch einen Administrator gelöscht.",
	'deletequeue-delnom-reason' => 'Grund für den Löschantrag:',
	'deletequeue-delnom-otherreason' => 'Anderer Grund',
	'deletequeue-delnom-extra' => 'Weitere Informationen:',
	'deletequeue-delnom-submit' => 'Löschung eintragen',
	'deletequeue-log-nominate' => "hat [[$1]] zur Löschung in der Lösch-Warteschlange '$2' vorgeschlagen.",
	'deletequeue-log-rmspeedy' => 'hat den Schnelllöschantrag für [[$1]] abgelehnt.',
	'deletequeue-log-requeue' => "hat [[$1]] zu einer anderen Lösch-Warteschlange verschoben: von '$2' zu '$3'.",
	'deletequeue-log-dequeue' => "hat [[$1]] aus der Lösch-Warteschlange '$2' entfernt.",
	'right-speedy-nominate' => 'Seiten zur Schnelllöschung vorschlagen',
	'right-speedy-review' => 'Schnelllöschanträge prüfen',
	'right-prod-nominate' => 'Seite zur Löschung vorschlagen',
	'right-prod-review' => 'Unumstrittene Löschanträge prüfen',
	'right-deletediscuss-nominate' => 'Löschdiskussionen eröffnen',
	'right-deletediscuss-review' => 'Löschdiskussionen beenden',
	'right-deletequeue-vote' => 'Für oder gegen die Löschung stimmen',
	'deletequeue-queue-speedy' => 'Schnelllöschung',
	'deletequeue-queue-prod' => 'Löschantrag',
	'deletequeue-queue-deletediscuss' => 'Löschdiskussion',
	'deletequeue-page-speedy' => "Diese Seite wurde zur Schnelllöschung vorgeschlagen.
Der angegebene Grund lautet ''$1''.",
	'deletequeue-page-prod' => "Diese Seite wurde zur Löschung vorgeschlagen.
Der angegebene Grund lautet ''$1''.
Wenn hiergegen bis zum ''$2'' kein Widerspruch eingelegt wird, wird diese Seite gelöscht werden.
Du kannst gegen diesen Löschantrag [{{fullurl:{{FULLPAGENAME}}|action=delvote}} Widerspruch einlegen].",
	'deletequeue-page-deletediscuss' => "Diese Seite wurde zur Löschung vorgeschlagen und hiergegen wurde Widerspruch eingelegt.
Der angegebene Grund lautet ''$1''.
Die [[$3|Löschdiskussion]] läuft noch bis zum ''$2''.",
	'deletequeue-notqueued' => 'Die von dir ausgewählte Seite ist momentan in keiner Lösch-Warteschlange',
	'deletequeue-review-action' => 'Auszuführende Aktion:',
	'deletequeue-review-delete' => 'Seite löschen.',
	'deletequeue-review-change' => 'Seite löschen, aber mit einem anderen Grund.',
	'deletequeue-review-requeue' => 'Seite in diese Lösch-Warteschlange verschieben:',
	'deletequeue-review-dequeue' => 'Keine Aktion ausführen und Seite aus der Lösch-Warteschlange entfernen.',
	'deletequeue-review-reason' => 'Kommentare:',
	'deletequeue-review-newreason' => 'Neuer Grund:',
	'deletequeue-review-newextra' => 'Weitere Informationen:',
	'deletequeue-review-submit' => 'Überprüfung speichern',
	'deletequeue-review-original' => 'Grund für den Antrag',
	'deletequeue-actiondisabled-involved' => 'Die folgende Aktion ist deaktiviert, weil du in dieser Löschsache bereits als $1 teilgenommen hast:',
	'deletequeue-actiondisabled-notexpired' => 'Die folgende Aktion ist deaktiviert, weil der Löschantrag noch nicht ausgelaufen ist:',
	'deletequeue-review-badaction' => 'Du hast eine ungültige Aktion angegeben',
	'deletequeue-review-actiondenied' => 'Du hast eine Aktion angegeben, die für diese Seite deaktiviert ist',
	'deletequeue-review-objections' => "'''Warnung''': Gegen die Löschung dieser Seite wurde [{{fullurl:{{FULLPAGENAME}}|action=delvoteview&votetype=object}} Widerspruch eingelegt].
Bitte prüfe die Widerspruchs-Argumente, bevor du diese Seite löschst.",
	'deletequeue-reviewspeedy-tab' => 'Schnelllöschung prüfen',
	'deletequeue-reviewspeedy-title' => 'Schnelllöschantrag für „$1“ prüfen',
	'deletequeue-reviewspeedy-text' => "Auf dieser Seite kannst du den Schnelllöschantrag für „'''$1'''“ überprüfen.
Bitte stelle sicher, dass diese Seite in Übereinstimmung mit den Richtlinien schnellgelöscht werden kann.",
	'deletequeue-reviewprod-tab' => 'Löschantrag prüfen',
	'deletequeue-reviewprod-title' => 'Löschantrag für „$1“ prüfen',
	'deletequeue-reviewprod-text' => "Auf dieser Seite kannst du den unumstrittenen Löschantrag für „'''$1'''“ prüfen.",
	'deletequeue-reviewdeletediscuss-tab' => 'Löschung prüfen',
	'deletequeue-reviewdeletediscuss-title' => 'Löschdiskussion für „$1“ prüfen',
	'deletequeue-reviewdeletediscuss-text' => "Auf dieser Seite kannst du die Löschdiskussion von „'''$1'''“ prüfen.

Es gibt eine [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} Liste] mit Stimmen für und gegen die Löschung; die eigentliche Diskussion ist unter [[$2]] zu finden.
Bitte achte darauf, dass deine Entscheidung mit dem Konsens der Diskussion vereinbar ist.",
	'deletequeue-deletediscuss-discussionpage' => 'Dies ist die Diskussionsseite für die Löschung von [[$1]].
Momentan {{PLURAL:$2|unterstützt ein|unterstützen $2}} Benutzer die Löschung, während $3 Benutzer sie ablehnen.
Du kannst die Löschung [{{fullurl:$1|action=delvote}} befürworten oder ablehnen] oder [{{fullurl:$1|action=delviewvotes}} alle Stimmen ansehen].',
	'deletequeue-discusscreate-summary' => 'Löschdiskussion für [[$1]] wird erstellt.',
	'deletequeue-discusscreate-text' => 'Die Löschung wurde aus folgendem Grund vorgeschlagen: $2',
	'deletequeue-role-nominator' => 'ursprünglicher Löschantragsteller',
	'deletequeue-role-vote-endorse' => 'Befürworter der Löschung',
	'deletequeue-role-vote-object' => 'Gegner der Löschung',
	'deletequeue-vote-tab' => 'Löschung befürworten/ablehnen',
	'deletequeue-vote-title' => 'Löschung von „$1“ befürworten oder ablehnen',
	'deletequeue-vote-text' => "Auf dieser Seite kannst du die Löschung von „'''$1'''“ befürworten oder ablehnen.
Diese Aktion überschreibt alle Stimmen, die du vorher zur Löschung dieser Seite abgegeben hast.
Du kannst die bereits abgegebenen Stimmen [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} ansehen].
Der Löschantragsgrund war ''$2'.",
	'deletequeue-vote-legend' => 'Löschung befürworten/ablehnen',
	'deletequeue-vote-action' => 'Empfehlung:',
	'deletequeue-vote-endorse' => 'Löschung befürworten.',
	'deletequeue-vote-object' => 'Löschung ablehnen.',
	'deletequeue-vote-reason' => 'Kommentare:',
	'deletequeue-vote-submit' => 'Abschicken',
	'deletequeue-vote-success-endorse' => 'Die hast erfolgreich die Löschung dieser Seite befürwortet.',
	'deletequeue-vote-success-object' => 'Du hast erfolgreich die Löschung dieser Seite abgelehnt.',
	'deletequeue-vote-requeued' => 'Du hast erfolgreich die Löschung dieser Seite abgelehnt.
Durch deinen Widerspruch wurde die Seite in die Lösch-Warteschlange $1 verschoben.',
	'deletequeue-showvotes' => 'Befürwortungen und Ablehnungen der Löschung von „$1“',
	'deletequeue-showvotes-text' => "Untenstehend sind die Befürwortungen und Ablehnungen der Löschung von „'''$1'''“ .
Du kannst deine eigene Befürwortung oder Ablehnung der Löschung [{{fullurl:{{FULLPAGENAME}}|action=delvote}} hier] eintragen.",
	'deletequeue-showvotes-restrict-endorse' => 'Nur Befürwortungen anzeigen',
	'deletequeue-showvotes-restrict-object' => 'Nur Ablehnungen anzeigen',
	'deletequeue-showvotes-restrict-none' => 'Alle Befürwortungen und Ablehnungen anzeigen',
	'deletequeue-showvotes-vote-endorse' => "Löschung um $1 $2 '''befürwortet'''",
	'deletequeue-showvotes-vote-object' => "Löschung um $1 $2 '''abgelehnt'''",
	'deletequeue-showvotes-showingonly-endorse' => 'Nur Befürwortungen werden angezeigt',
	'deletequeue-showvotes-showingonly-object' => 'Nur Ablehnungen werden angezeigt.',
	'deletequeue-showvotes-none' => 'Es gibt keine Befürwortungen oder Ablehnungen der Löschung dieser Seite.',
	'deletequeue-showvotes-none-endorse' => 'Es gibt keine Befürwortungen der Löschung dieser Seite.',
	'deletequeue-showvotes-none-object' => 'Es gibt keine Ablehnungen der Löschung dieser Seite.',
	'deletequeue' => 'Lösch-Warteschlange',
	'deletequeue-list-text' => 'Diese Seite zeigt alle Seiten an, die sich im Löschsystem befinden.',
	'deletequeue-list-search-legend' => 'Suche nach Seiten',
	'deletequeue-list-queue' => 'Warteschlange:',
	'deletequeue-list-status' => 'Status:',
	'deletequeue-list-expired' => 'Zeige nur zu schließende Löschanträge',
	'deletequeue-list-search' => 'Suche',
	'deletequeue-list-anyqueue' => '(irgendeine)',
	'deletequeue-list-votes' => 'Stimmenliste',
	'deletequeue-list-votecount' => '$1 {{PLURAL:$1|Befürwortung|Befürwortungen}}, $2 {{PLURAL:$2|Ablehnung|Ablehnungen}}',
	'deletequeue-list-header-page' => 'Seite',
	'deletequeue-list-header-queue' => 'Warteschlange',
	'deletequeue-list-header-votes' => 'Befürwortungen und Ablehnungen',
	'deletequeue-list-header-expiry' => 'Ablaufdatum',
	'deletequeue-list-header-discusspage' => 'Diskussionsseite',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'deletequeue-action-queued' => 'Forigo',
	'deletequeue-action' => 'Sugesti forigon',
	'deletequeue-action-title' => 'Sugesti forigon de "$1"',
	'deletequeue-generic-reasons' => '*Ĝeneralaj kialoj
 ** Vandalismo
 ** Spamo
 ** Prizorgado
 ** El la projekta regiono',
	'deletequeue-speedy-title' => 'Marki "$1" por rapida forigo',
	'deletequeue-prod-title' => 'Proponi forigon de "$1"',
	'deletequeue-delnom-reason' => 'Kialo por kandidateco:',
	'deletequeue-delnom-otherreason' => 'Alia kialo',
	'deletequeue-delnom-extra' => 'Plia informo:',
	'deletequeue-delnom-submit' => 'Sendi peton',
	'deletequeue-log-rmspeedy' => 'neis rapide forigi [[$1]].',
	'deletequeue-log-dequeue' => "forviŝis [[$1]] el la forigada listo '$2'.",
	'right-speedy-nominate' => 'Kandidatigi paĝojn por rapida forigo',
	'right-speedy-review' => 'Kontroli kandidatojn por rapida forigo',
	'right-prod-nominate' => 'Proponi forigon de paĝo',
	'right-deletediscuss-nominate' => 'malfermi diskuton pri forigado',
	'right-deletediscuss-review' => 'Fermi diskuton pri forigado',
	'right-deletequeue-vote' => 'Kunsenti aŭ malkunsenti forigojn',
	'deletequeue-queue-speedy' => 'Rapida forigo',
	'deletequeue-queue-prod' => 'Proponita forigo',
	'deletequeue-queue-deletediscuss' => 'Diskuto pri forigo',
	'deletequeue-page-prod' => "Estis proponita ke ĉi tiu paĝo estas forigenda.
La kialo donita estis ''$1''.
Se ĉi tiun proponon neniu ajn kontraŭus de ''$2'', ĉi tiu paĝon estus forigita.
Vi povas kontraŭi la forigon de ĉi tiu paĝo de [{{fullurl:{{FULLPAGENAME}}|action=delvote}} oponado de la forigo].",
	'deletequeue-review-action' => 'Ago por fari:',
	'deletequeue-review-delete' => 'Forigi la paĝon.',
	'deletequeue-review-change' => 'Forigi ĉi tiun paĝon, sed kun malsama kialo.',
	'deletequeue-review-requeue' => 'Movi ĉi tiun paĝon al la jena listo:',
	'deletequeue-review-dequeue' => 'Fari nenion, kaj forigi la paĝon de la forigo-listo.',
	'deletequeue-review-reason' => 'Komentoj:',
	'deletequeue-review-newreason' => 'Nova kialo:',
	'deletequeue-review-newextra' => 'Plia informo:',
	'deletequeue-review-submit' => 'Konservi Kontrolon',
	'deletequeue-review-original' => 'Kialo por peto',
	'deletequeue-reviewspeedy-tab' => 'Kontroli rapidan forigon',
	'deletequeue-reviewprod-tab' => 'Kontroli proponitan forigon',
	'deletequeue-reviewdeletediscuss-tab' => 'Kontroli forigon',
	'deletequeue-discusscreate-text' => 'Forigo estis proponita pro la jena kialo: $2',
	'deletequeue-role-nominator' => 'originala proponinto por forigo',
	'deletequeue-role-vote-endorse' => 'konsentanto de forigo',
	'deletequeue-role-vote-object' => 'malkonsentanto de forigo',
	'deletequeue-vote-tab' => 'Konsenti/Malkonsenti forigon',
	'deletequeue-vote-legend' => 'Konsenti/Malkonsenti forigon.',
	'deletequeue-vote-action' => 'Rekomendo:',
	'deletequeue-vote-endorse' => 'Konsenti forigon.',
	'deletequeue-vote-object' => 'Malkonsenti forigon.',
	'deletequeue-vote-reason' => 'Komentoj:',
	'deletequeue-vote-submit' => 'Ek',
	'deletequeue-vote-success-endorse' => 'Vi sukcese subtenis la forigon de ĉi tiu paĝo.',
	'deletequeue-vote-success-object' => 'Vi sukcese malkonsentis la forigon de ĉi tiu paĝo.',
	'deletequeue-vote-requeued' => 'Vi sukcese malkonsentis la forigon de ĉi tiu paĝo.
Pro via malkonsento, la paĝo estis movita al la laborlisto $1.',
	'deletequeue' => 'Listo de forigoj',
	'deletequeue-list-search-legend' => 'Serĉi paĝojn',
	'deletequeue-list-status' => 'Statuso:',
	'deletequeue-list-search' => 'Serĉi',
	'deletequeue-list-anyqueue' => '(iu)',
	'deletequeue-list-votes' => 'Listo de voĉdonoj',
	'deletequeue-list-header-page' => 'Paĝo',
	'deletequeue-list-header-queue' => 'Laborlisto',
	'deletequeue-list-header-votes' => 'Aproboj kaj malaproboj',
	'deletequeue-list-header-expiry' => 'Findato',
	'deletequeue-list-header-discusspage' => 'Diskuto-paĝo',
);

/** Spanish (Español)
 * @author Antur
 * @author Sanbec
 */
$messages['es'] = array(
	'deletequeue-desc' => 'Crea un [[Special:DeleteQueue|sistema de listas para organizar los borrados]]',
	'deletequeue-action-queued' => 'Borrado',
	'deletequeue-action' => 'Sugiera un borrado',
	'deletequeue-action-title' => 'Sugiera el borrado de «$1»',
	'deletequeue-action-text' => "{{SITENAME}} tiene varios procedimientos para borrar páginas:
*Si Ud. cree que la página es candidata para  ''borrado rápido'', puede sugerirlo [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=speedy}} aquí].
*Si la página no reúne las condiciones para borrado rápido, pero ''su borrado no generaría oposición o conflictos'', puede proponer su [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=prod}} borrado directo].
*Si puede existir oposición al borrado, debería abrir [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=deletediscuss}} una propuesta de borrado].",
	'deletequeue-action-text-queued' => 'Ud. debe leer las siguientes páginas para este caso de borrado:
* [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} Opiniones a favor y en contra].
* [{{fullurl:{{FULLPAGENAME}}|action=delvote}} Opine sobre el borrado de esta página].',
);

/** French (Français)
 * @author Grondin
 * @author IAlex
 * @author McDutchie
 * @author Meno25
 */
$messages['fr'] = array(
	'deletequeue-desc' => 'Crée un [[Special:DeleteQueue|système de queue pour gérer les suppression]]',
	'deletequeue-action-queued' => 'Suppression',
	'deletequeue-action' => 'Suggérer la suppression',
	'deletequeue-action-title' => 'Suggérer la suppression de « $1 »',
	'deletequeue-action-text' => "{{SITENAME}} dispose d'un nombre de processus pour la suppression des pages :
*Si vous croyez que cette page doit passer par une ''suppression immédiate'', vous pouvez en faire la demande [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=speedy}} ici].
*Si cette page ne relève pas de la suppression immédiate, mais ''que cette suppression ne posera aucune controverse pour'', vous devrez [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=prod}} proposer une suppression non contestable].
*Si la suppression de la page est ''sujète à controverses'', vous devrez [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=deletediscuss}} ouvrir une discussion].",
	'deletequeue-action-text-queued' => 'Vous pouvez visionner les pages suivantes pour cette suppression :
* [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} Voir les acquiescements et les objections].
* [{{fullurl:{{FULLPAGENAME}}|action=delvote}} Accepter ou objection pour la suppression de cette page].',
	'deletequeue-permissions-noedit' => 'Vous devez être capable de modifier une page pour pourvoir affecter son statut de suppression.',
	'deletequeue-generic-reasons' => '*Motifs les plus courants
** Vandalisme
** Pourriel
** Maintenance
** Hors critères',
	'deletequeue-nom-alreadyqueued' => 'Cette page est déjà dans la queue des suppressions.',
	'deletequeue-speedy-title' => 'Marquer « $1 » pour une suppression immédiate',
	'deletequeue-speedy-text' => "Vous pouvez utiliser ce formulaire pour parquer la page « '''$1''' » pour une suppression immédiate.

Un administrateur étudiera cette requête et, si elle est bien fondée, supprimera la page.
Vous devez sélectionner un motif à partir de la liste déroulante ci-dessous, et ajouter d’autres information y afférentes.",
	'deletequeue-prod-title' => 'Proposer la suppression de « $1 »',
	'deletequeue-prod-text' => "Vous pouvez utiliser ce formulaire pour propose que « '''$1''' » soit supprimée.

Si, après cinq jours, personne n’a émis d’objection pour cela, elle sera supprimée, après un examen final, par un administrateur.",
	'deletequeue-delnom-reason' => 'Motif pour la nomination :',
	'deletequeue-delnom-otherreason' => 'Autre raison',
	'deletequeue-delnom-extra' => 'Informations supplémentaires :',
	'deletequeue-delnom-submit' => 'Soumettre la nomination',
	'deletequeue-log-nominate' => '[[$1]] nominé pour la suppression dans la queue « $2 ».',
	'deletequeue-log-rmspeedy' => 'refusé pour la suppression immédiate de [[$1]].',
	'deletequeue-log-requeue' => '[[$1]] transféré vers une queue de suppression différente : de « $2 » vers « $3 ».',
	'deletequeue-log-dequeue' => '[[$1]] enlevé depuis la queue de suppression « $2 ».',
	'right-speedy-nominate' => 'Nomine les pages pour une suppression immédiate.',
	'right-speedy-review' => 'Revoir les nominations pour la suppression immédiate',
	'right-prod-nominate' => 'Proposer la suppression de la page',
	'right-prod-review' => 'Revoir les propositions de suppression non contestées',
	'right-deletediscuss-nominate' => 'Commencer les discussions sur la suppression',
	'right-deletediscuss-review' => 'Clôturer les discussions sur la suppression',
	'right-deletequeue-vote' => 'Acquiescer ou objecter pour les suppressions',
	'deletequeue-queue-speedy' => 'Suppression immédiate',
	'deletequeue-queue-prod' => 'Suppression proposée',
	'deletequeue-queue-deletediscuss' => 'Discussion sur la suppression',
	'deletequeue-page-speedy' => "Cette page a été nominée pour une suppression immédiate.
La raison invoquée pour cela est ''« $1 »''.",
	'deletequeue-page-prod' => "Il a été proposé la suppression de cette page.
La raison invoquée est ''« $1 »''.
Si la proposition ne rencontre aucune objection sur ''$2'', la page sera supprimée.
Vous pouvez contester cette suppression en [{{fullurl:{{FULLPAGENAME}}|action=delvote}} vous y opposant].",
	'deletequeue-page-deletediscuss' => "Cette page a été proposé à la suppression, celle-ci a été contestée.
Le motif invoqué était ''« $1 »''
Une discussion est intervenue sur [[$3]], laquelle sera conclue le ''$2''.",
	'deletequeue-notqueued' => 'La page que vous avez sélectionnée n’est pas dans la queue des suppression',
	'deletequeue-review-action' => 'Action à prendre :',
	'deletequeue-review-delete' => 'Supprimer la page.',
	'deletequeue-review-change' => 'Supprimer cette page, mais avec une autre raison.',
	'deletequeue-review-requeue' => 'Transférer cette page vers la queue suivante :',
	'deletequeue-review-dequeue' => 'Ne rien faire et retirer la page de la queue de suppression.',
	'deletequeue-review-reason' => 'Commentaires :',
	'deletequeue-review-newreason' => 'Nouveau motif :',
	'deletequeue-review-newextra' => 'Information supplémentaire :',
	'deletequeue-review-submit' => 'Sauvegarder la relecture',
	'deletequeue-review-original' => 'Motif de la nomination',
	'deletequeue-actiondisabled-involved' => 'L’action suivante est désactivée car vous avez pris part dans ce cas de suppression dans le sens de $1 :',
	'deletequeue-actiondisabled-notexpired' => 'L’action suivante a été désactivée car le délai pour la nomination à la suppression n’est pas encore expiré :',
	'deletequeue-review-badaction' => 'Vous avez indiqué une action incorrecte',
	'deletequeue-review-actiondenied' => 'Vous avez indiqué une action qui est désactivée pour cette page.',
	'deletequeue-review-objections' => "'''Attention''' : la suppression de cette page est [{{FULLURL:{{FULLPAGENAME}}|action=delvoteview|votetype=object}} contestée]. Assurez-vous que vous ayez examiné ces objections avant sa suppression.",
	'deletequeue-reviewspeedy-tab' => 'Revoir la suppression immédiate',
	'deletequeue-reviewspeedy-title' => 'Revoir la suppression immédiate de « $1 »',
	'deletequeue-reviewspeedy-text' => "Vous pouvez utiliser ce formulaire pour revoir la nommination de « '''$1''' » en suppression immédiate.
Veuillez vous assurer que cette page peut être supprimée de la sorte en conformité des règles du projet.",
	'deletequeue-reviewprod-tab' => 'Revoir les suppressions proposées',
	'deletequeue-reviewprod-title' => 'Revoir la suppression proposée pour « $1 »',
	'deletequeue-reviewprod-text' => "Vous pouvez utiliser ce formulaire pour revoir la proposition non contestée pour supprimer « '''$1''' ».",
	'deletequeue-reviewdeletediscuss-tab' => 'Revoir la suppression',
	'deletequeue-reviewdeletediscuss-title' => 'Revoir la discussion de la suppression pour « $1 »',
	'deletequeue-reviewdeletediscuss-text' => "Vous pouvez utiliser ce formulaire pour revoir la discussion concernant la suppression de « ''$1''».

Une [{{FULLURL:{{FULLPAGENAME}}|action=delviewvotes}} liste] des « pour » et des « contre » est disponible, la discussion par elle-même disponible sur [[$2]].
Veuillez vous assurer que vous ayez pris une décision en conformité du consensus issus de la discussion.",
	'deletequeue-deletediscuss-discussionpage' => 'Ceci est la page de discussion concernant la suppression de [[$1]].
Il y a actuellement $2 {{PLURAL:$2|utilisateur|utilisateurs}} en faveur, et $3 {{PLURAL:$3|utilisateur|utilisateurs}} qui y sont opposés.
Vous pouvez [{{FULLURL:$1|action=delvote}} appuyez ou refuser] la suppression, ou [{{FULLURL:$1|action=delviewvotes}} voir tous les « pour » et les « contre »].',
	'deletequeue-discusscreate-summary' => 'Création de la discussion concernant la suppression de [[$1]].',
	'deletequeue-discusscreate-text' => 'Suppression proposée pour la raison suivante : $2',
	'deletequeue-role-nominator' => 'initiateur original de la suppression',
	'deletequeue-role-vote-endorse' => 'Partisan pour la suppression',
	'deletequeue-role-vote-object' => 'Opposant à la suppression',
	'deletequeue-vote-tab' => 'Voter sur la suppression',
	'deletequeue-vote-title' => 'Appuyer ou refuser la suppression de « $1 »',
	'deletequeue-vote-text' => "Vous pouvez utiliser ce formulaire pour appuyer ou refuser la suppression de « '''$1''' ».
Cette action écrasera les avis que vous avez émis auparavant dans cette discussion.
Vous pouvez [{{FULLURL:{{FULLPAGENAME}}|action=delviewvotes}} voir] les différents avis déjà émis.
Le motif indiqué pour la nomination à la suppression était ''« $2 »''.",
	'deletequeue-vote-legend' => 'Appuyer/Refuser la suppression',
	'deletequeue-vote-action' => 'Recommandation :',
	'deletequeue-vote-endorse' => 'Appuie la suppression',
	'deletequeue-vote-object' => 'S’oppose à la suppression.',
	'deletequeue-vote-reason' => 'Commentaires :',
	'deletequeue-vote-submit' => 'Soumettre',
	'deletequeue-vote-success-endorse' => 'Vous avez appuyé, avec succès, la demande de suppression de cette page.',
	'deletequeue-vote-success-object' => 'Vous avez refusé, avec succès, la demande de suppression de cette page.',
	'deletequeue-vote-requeued' => 'Vous avez rejeté, avec succès, la demande de suppression de cette page.
Par votre refus, la page été déplacée dans la queue $1.',
	'deletequeue-showvotes' => 'Accords et refus concernant la suppression de « $1 »',
	'deletequeue-showvotes-text' => "Voici, ci-dessous, les accords et les désaccords émis en vue de la suppression de la page « '''$1''' ».
Vous pouvez enregistrer [{{FULLURL:{{FULLPAGENAME}}|action=delvote}} ici] votre propre accord ou désaccord sur cette suppression.",
	'deletequeue-showvotes-restrict-endorse' => 'Affiche uniquement les partisans',
	'deletequeue-showvotes-restrict-object' => 'Voir uniquement les oppositions',
	'deletequeue-showvotes-restrict-none' => 'Visionner tous les accords et les refus.',
	'deletequeue-showvotes-vote-endorse' => "'''Pour''' la suppression $2 le $1",
	'deletequeue-showvotes-vote-object' => "'''Contre''' la suppression $2 le $1",
	'deletequeue-showvotes-showingonly-endorse' => 'Ne voir que les accords',
	'deletequeue-showvotes-showingonly-object' => 'Ne voir que les refus',
	'deletequeue-showvotes-none' => 'Il n’existe ni « pour », ni « contre » la suppression de cette page.',
	'deletequeue-showvotes-none-endorse' => 'Personne ne s’est prononcé en faveur de la suppression de cette page.',
	'deletequeue-showvotes-none-object' => 'Personne ne s’est prononcé contre la suppression de cette page.',
	'deletequeue' => 'Queue de la suppression',
	'deletequeue-list-text' => 'Cette page affiche toutes les pages qui sont dans le système de suppression.',
	'deletequeue-list-search-legend' => 'Rechercher des pages',
	'deletequeue-list-queue' => 'Queue :',
	'deletequeue-list-status' => 'Statut :',
	'deletequeue-list-expired' => 'Ne voir que les clôture des nominations requises.',
	'deletequeue-list-search' => 'Rechercher',
	'deletequeue-list-anyqueue' => '(plusieurs)',
	'deletequeue-list-votes' => 'Liste des votes',
	'deletequeue-list-votecount' => '$1 {{PLURAL:$1|accord|accords}}, $2 {{PLURAL:$2|refus|refus}}',
	'deletequeue-list-header-page' => 'Page',
	'deletequeue-list-header-queue' => 'Queue',
	'deletequeue-list-header-votes' => 'Accords et refus',
	'deletequeue-list-header-expiry' => 'Expiration',
	'deletequeue-list-header-discusspage' => 'Page de discussion',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'deletequeue-desc' => 'Crea un [[Special:DeleteQueue|sitema baseado na cola para xestionar as eliminacións]]',
	'deletequeue-action-queued' => 'Borrado',
	'deletequeue-action' => 'Suxestionar o borrado',
	'deletequeue-action-title' => 'Suxestionar o borrado de "$1"',
	'deletequeue-action-text' => "{{SITENAME}} ten un número de procesos para borrar páxinas:
*Se cre que esta páxina posúe motivos xustificados para a súa ''eliminación rápida'', pode propoñelo [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=speedy}} aquí].
*Se non os ten, pero a ''eliminación será probablemente sen controversia'', debería [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=prod}} propor un borrado non contestado].
*Se esta páxina de eliminación ''será probablemente contestada'', debería [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=deletediscuss}} abrir unha conversa].",
	'deletequeue-action-text-queued' => 'Pode ver as seguintes páxina para este caso de borrado:
* [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} Ver os apoios e as obxeccións actuais].
* [{{fullurl:{{FULLPAGENAME}}|action=delvote}} Apoiar este borrado ou obxectar no mesmo].',
	'deletequeue-permissions-noedit' => 'Debe ser capaz de editar unha páxina para poder afectar o seu status de borrado.',
	'deletequeue-generic-reasons' => '* Razóns xenéricas
  ** Vandalismo
  ** Spam
  ** Mantemento
  ** Fóra dos límites do proxecto',
	'deletequeue-nom-alreadyqueued' => 'Esta páxina xa está nunha cola de borrados.',
	'deletequeue-speedy-title' => 'Marcar "$1" para o seu borrado rápido',
	'deletequeue-speedy-text' => "Pode usar este formulario para marcar a páxina \"'''\$1'''\" para a súa eliminación rápida.

Un administrador revisará esta solicitude, e, se ten fundamentos, borrará a páxina.
Debe seleccionar un motivo para a eliminación da lista da caixa despregable de embaixo, e engadir calquera outra información relevante.",
	'deletequeue-prod-title' => 'Propor a eliminación de "$1"',
	'deletequeue-prod-text' => "Pode usar este formulario para propor \"'''\$1'''\" para a súa eliminación.

Se despois de cinco días ninguén dá contestación nesta páxina, será borrada tras unha revisión final feita por un administrador.",
	'deletequeue-delnom-reason' => 'Razón para a nominación:',
	'deletequeue-delnom-otherreason' => 'Outro motivo',
	'deletequeue-delnom-extra' => 'Información adicional:',
	'deletequeue-delnom-submit' => 'Enviar a nominación',
	'deletequeue-log-nominate' => 'nominou "[[$1]]" para a súa eliminación da cola "$2".',
	'deletequeue-log-rmspeedy' => 'declinou a eliminación rápida de "[[$1]]".',
	'deletequeue-log-requeue' => 'transferiu "[[$1]]" a unha cola de borrados diferente: de "$2" a "$3".',
	'deletequeue-log-dequeue' => 'eliminou "[[$1]]" da cola de borrados "$2".',
	'right-speedy-nominate' => 'Nominar páxinas para a súa eliminación rápida',
	'right-speedy-review' => 'Revisar as nominacións das eliminacións rápidas',
	'right-prod-nominate' => 'Propor o borrado dunha páxina',
	'right-prod-review' => 'Revisar as propostas de borrado non respostadas',
	'right-deletediscuss-nominate' => 'Comezar discusións de borrado',
	'right-deletediscuss-review' => 'Pechar discusións de borrado',
	'right-deletequeue-vote' => 'Apoiar os borrados ou obxectar nos mesmos',
	'deletequeue-queue-speedy' => 'Eliminación rápida',
	'deletequeue-queue-prod' => 'Borrado proposto',
	'deletequeue-queue-deletediscuss' => 'Discusión do borrado',
	'deletequeue-page-speedy' => "Esta páxina foi nominada para a súa eliminación rápida.
O motivo dado para este borrado é ''$1''.",
	'deletequeue-page-prod' => "Propoñeuse que esta páxina fose borrada.
A razón dada foi ''$1''.
Se esta proposta non recibe resposta en ''$2'', esta páxina será borrada.
Pode votar na páxina de eliminación [{{fullurl:{{FULLPAGENAME}}|action=delvote}} obxectando].",
	'deletequeue-page-deletediscuss' => "Esta páxina foi proposta para a súa eliminación e esa proposta foi contestada.
A razón dada foi ''\$1''.
Unha conversa está en curso en \"[[\$3]]\", que concluirá o ''\$2''.",
	'deletequeue-notqueued' => 'A páxina que seleccionou non está na cola de eliminación actualmente',
	'deletequeue-review-action' => 'Acción que levar a cabo:',
	'deletequeue-review-delete' => 'Borrar a páxina.',
	'deletequeue-review-change' => 'Eliminar esta páxina, pero cun motivo diferente.',
	'deletequeue-review-requeue' => 'Transferir esta páxina á seguinte cola:',
	'deletequeue-review-dequeue' => 'Non levar a cabo ningunha función e retirar a páxina da cola de eliminación.',
	'deletequeue-review-reason' => 'Comentarios:',
	'deletequeue-review-newreason' => 'Novo motivo:',
	'deletequeue-review-newextra' => 'Información adicional:',
	'deletequeue-review-submit' => 'Gardar a revisión',
	'deletequeue-review-original' => 'Motivo para a nominación',
	'deletequeue-actiondisabled-involved' => 'A seguinte acción está deshabilitada porque formou parte neste caso de borrado no papel de $1:',
	'deletequeue-actiondisabled-notexpired' => 'A seguinte acción está deshabilitada porque a nominación para o seu borrado aínda non caducou:',
	'deletequeue-review-badaction' => 'Especificou unha acción inválida',
	'deletequeue-review-actiondenied' => 'Especificou unha acción que foi deshabilitada para esta páxina',
	'deletequeue-review-objections' => "'''Aviso:''' a eliminación desta páxina ten [{{fullurl:{{FULLPAGENAME}}|action=delvoteview&votetype=object}} obxeccións].
Por favor, asegúrese que considerou estas obxeccións antes de borrar a páxina.",
	'deletequeue-reviewspeedy-tab' => 'Revisar a eliminación rápida',
	'deletequeue-reviewspeedy-title' => 'Revisar a nominación da eliminación rápida de "$1"',
	'deletequeue-reviewspeedy-text' => "Pode usar este formulario para revisar a nominación de \"'''\$1'''\" para a súa eliminación.
Por favor, asegúrese que esta páxina pode ser borrada rapidamente de acordo coa política.",
	'deletequeue-reviewprod-tab' => 'Revisar a proposta de eliminación',
	'deletequeue-reviewprod-title' => 'Revisar a proposta de eliminación de "$1"',
	'deletequeue-reviewprod-text' => "Pode usar este formulario para revisar a proposta de eliminación non respostada de \"'''\$1'''\".",
	'deletequeue-reviewdeletediscuss-tab' => 'Revisar o borrado',
	'deletequeue-reviewdeletediscuss-title' => 'Revisar a conversa de borrado de "$1"',
	'deletequeue-reviewdeletediscuss-text' => 'Pode usar este formulario para revisar a conversa de borrado de "\'\'\'$1\'\'\'".

Está dispoñible, unha [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} lista] cos apoios e obxeccións desta eliminación, e a conversa pode ser atopada en "[[$2]]".
Por favor, asegúrese de que toma a decisión de acordo co consenso.',
	'deletequeue-deletediscuss-discussionpage' => 'Esta é a páxina de conversa para a eliminación de "[[$1]]".
Actualmente hai $2 {{PLURAL:$2|usuario|usuarios}} que {{PLURAL:$2|apoia|apoian}} a eliminación, e $3 que {{PLURAL:$2|pon obxeccións|poñen obxeccións}}.
Pode [{{fullurl:$1|action=delvote}} apoiar ou obxectar] ou [{{fullurl:$1|action=delviewvotes}} ver todos os apoios e obxeccións].',
	'deletequeue-discusscreate-summary' => 'Creando a conversa para a eliminación de "[[$1]]".',
	'deletequeue-discusscreate-text' => 'Propoñeuse esta eliminación pola seguinte razón: $2',
	'deletequeue-role-nominator' => 'nominador orixinal da eliminación',
	'deletequeue-role-vote-endorse' => 'partícipe da eliminación',
	'deletequeue-role-vote-object' => 'obxector da eliminación',
	'deletequeue-vote-tab' => 'Votar na eliminación',
	'deletequeue-vote-title' => 'Apoiar a/Obxectar na eliminación de "$1"',
	'deletequeue-vote-text' => "Pode usar este formulario para apoiar ou obxectar na páxina de eliminación de \"'''\$1'''\".
Esta acción ignorará calquera apoio/obxección anterior que teña dado na eliminación desta páxina.
Pode [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} ver] os apoios e obxeccións existentes.
O motivo dado na nominación para a eliminación foi ''\$2''.",
	'deletequeue-vote-legend' => 'Apoiar a/Obxectar na eliminación',
	'deletequeue-vote-action' => 'Recomentación:',
	'deletequeue-vote-endorse' => 'Apoiar a eliminación.',
	'deletequeue-vote-object' => 'Obxectar na eliminación.',
	'deletequeue-vote-reason' => 'Comentarios:',
	'deletequeue-vote-submit' => 'Enviar',
	'deletequeue-vote-success-endorse' => 'Apoiou con éxito a eliminación desta páxina.',
	'deletequeue-vote-success-object' => 'Obxectou con éxito a eliminación desta páxina.',
	'deletequeue-vote-requeued' => 'Obxectou con éxito na eliminación desta páxina.
Debido á súa obxección, a páxina foi movida á cola "$1".',
	'deletequeue-showvotes' => 'Apoios e obxeccións da eliminación de "$1"',
	'deletequeue-showvotes-text' => "Embaixo están os apoios e obxección feitos na páxina de eliminación de \"'''\$1'''\".
Pode rexistrar o seu propio apoio ou obxección na páxina da eliminación: [{{fullurl:{{FULLPAGENAME}}|action=delvote}} aquí].",
	'deletequeue-showvotes-restrict-endorse' => 'Amosar só os apoios',
	'deletequeue-showvotes-restrict-object' => 'Amosar só as obxeccións',
	'deletequeue-showvotes-restrict-none' => 'Amosar todos os apoios e obxeccións',
	'deletequeue-showvotes-vote-endorse' => "'''Apoiou''' a eliminación o $2 ás $1",
	'deletequeue-showvotes-vote-object' => "'''Obxectou''' na eliminación o $2 ás $1",
	'deletequeue-showvotes-showingonly-endorse' => 'Amosando só os apoios',
	'deletequeue-showvotes-showingonly-object' => 'Amosando só as obxeccións',
	'deletequeue-showvotes-none' => 'Non hai apoios ou obxeccións na eliminación desta páxina.',
	'deletequeue-showvotes-none-endorse' => 'Non hai apoios na eliminación desta páxina.',
	'deletequeue-showvotes-none-object' => 'Non hai obxeccións na eliminación desta páxina.',
	'deletequeue' => 'Cola de borrados',
	'deletequeue-list-text' => 'Esta páxina amosa todas as páxinas que están no sistema de eliminación.',
	'deletequeue-list-search-legend' => 'Procurar páxinas',
	'deletequeue-list-queue' => 'Cola:',
	'deletequeue-list-status' => 'Status:',
	'deletequeue-list-expired' => 'Amosar só as nominacións que requiren ser pechadas.',
	'deletequeue-list-search' => 'Procurar',
	'deletequeue-list-anyqueue' => '(calquera)',
	'deletequeue-list-votes' => 'Lista de votos',
	'deletequeue-list-votecount' => '$1 {{PLURAL:$1|apoio|apoios}}, $2 {{PLURAL:$2|obxección|obxeccións}}',
	'deletequeue-list-header-page' => 'Páxina',
	'deletequeue-list-header-queue' => 'Cola',
	'deletequeue-list-header-votes' => 'Apoios e obxeccións',
	'deletequeue-list-header-expiry' => 'Caducidade',
	'deletequeue-list-header-discusspage' => 'Páxina de conversa',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'deletequeue-action-queued' => 'Διαγραφή',
	'deletequeue-action' => 'Πρότασις διαγραφῆς',
	'deletequeue-action-title' => 'Πρότασις διαγραφῆς τοῦ "$1"',
	'deletequeue-delnom-otherreason' => 'Ἑτέρα αἰτία',
	'deletequeue-review-reason' => 'Σχόλια:',
	'deletequeue-vote-submit' => 'Ὑποβάλλειν',
	'deletequeue-list-queue' => 'Οὐρά:',
	'deletequeue-list-status' => 'Καθεστώς:',
	'deletequeue-list-search' => 'Ζητεῖν',
	'deletequeue-list-anyqueue' => '(οἱαδήποτε)',
	'deletequeue-list-header-page' => 'Δέλτος',
	'deletequeue-list-header-queue' => 'Οὐρά',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'deletequeue-desc' => 'יצירת [[Special:DeleteQueue|מערכת מבוססת תורים לניהול המחיקות]]',
	'deletequeue-action-queued' => 'מחיקה',
	'deletequeue-action' => 'הצעת מחיקה',
	'deletequeue-action-title' => 'הצעת מחיקה של "$1"',
);

/** Croatian (Hrvatski)
 * @author Dalibor Bosits
 */
$messages['hr'] = array(
	'deletequeue-list-header-page' => 'Stranica',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'deletequeue-desc' => 'Crea un [[Special:DeleteQueue|systema con caudas pro gerer deletiones]]',
	'deletequeue-action-queued' => 'Deletion',
	'deletequeue-action' => 'Suggerer deletion',
	'deletequeue-action-title' => 'Suggerer deletion de "$1"',
	'deletequeue-action-text' => "{{SITENAME}} ha plure processos pro deler paginas:
*Si tu crede que iste pagina merita un ''deletion rapide'', tu pote suggerer lo [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=speedy}} hic].
*Si iste pagina non merita un deletion rapide, sed le ''deletion probabilemente non esserea controversial'', tu deberea [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=prod}} proponer un deletion non contestabile].
*Si le deletion de iste pagina ''probabilemente esserea contestate'', tu deberea [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=deletediscuss}} initiar un discussion].",
	'deletequeue-action-text-queued' => 'Tu pote vider le sequente paginas pro iste caso de deletion:
* [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} Vider le actual declarationes pro e contra].
* [{{fullurl:{{FULLPAGENAME}}|action=delvote}} Declarar te pro o contra le deletion de iste pagina].',
	'deletequeue-permissions-noedit' => 'Tu debe poter modificar un pagina pro poter afficer su stato de deletion.',
	'deletequeue-generic-reasons' => '* Motivos generic
  ** Vandalismo
  ** Spam
  ** Mantenentia
  ** Foras del criterios del projecto',
	'deletequeue-nom-alreadyqueued' => 'Iste pagina es ja in un cauda de deletiones.',
	'deletequeue-speedy-title' => 'Marcar "$1" pro deletion rapide',
	'deletequeue-speedy-text' => "Tu pote usar iste formulario pro marcar le pagina \"'''\$1'''\" pro deletion rapide.

Un administrator revidera iste requesta, e, si illo es ben fundate, delera le pagina.
Tu debe seliger un motivo pro deletion ab le lista disrolante infra, e adder omne altere information relevante.",
	'deletequeue-prod-title' => 'Proponer deletion de "$1"',
	'deletequeue-prod-text' => "Tu pote usar iste formulario pro proponer que \"'''\$1'''\" sia delite.

Si, post cinque dies, necuno ha contestate le deletion de iste pagina, illo essera delite post un examine final per un administrator.",
	'deletequeue-delnom-reason' => 'Motivo pro nomination:',
	'deletequeue-delnom-otherreason' => 'Altere motivo',
	'deletequeue-delnom-extra' => 'Informationes supplementari:',
	'deletequeue-delnom-submit' => 'Submitter nomination',
	'deletequeue-log-nominate' => "nominava [[$1]] pro deletion in le cauda '$2'.",
	'deletequeue-log-rmspeedy' => 'refusava le deletion rapide de [[$1]].',
	'deletequeue-log-requeue' => "transfereva [[$1]] a un altere cauda de deletiones: ab '$2' verso '$3'.",
	'deletequeue-log-dequeue' => "removeva [[$1]] del cauda de deletiones '$2'.",
	'right-speedy-nominate' => 'Nominar paginas pro deletion rapide',
	'right-speedy-review' => 'Revider nominationes pro deletion rapide',
	'right-prod-nominate' => 'Proponer le deletion de paginas',
	'right-prod-review' => 'Revider le propositiones de deletion non contestate',
	'right-deletediscuss-nominate' => 'Comenciar discussiones super deletiones',
	'right-deletediscuss-review' => 'Clauder discussiones super deletiones',
	'right-deletequeue-vote' => 'Declarar te pro o contra deletiones',
	'deletequeue-queue-speedy' => 'Deletion rapide',
	'deletequeue-queue-prod' => 'Deletion proponite',
	'deletequeue-queue-deletediscuss' => 'Discussion super le deletion',
	'deletequeue-page-speedy' => "Iste pagina ha essite nominate pro deletion rapide.
Le motivo date pro iste deletion es ''$1''.",
	'deletequeue-page-prod' => "Il ha essite proponite que iste pagina sia delite.
Le motivo date esseva ''$1''.
Si iste proposition remane non contestate al ''$2'', le pagina essera delite.
Tu pote contestar iste deletion per [{{fullurl:{{FULLPAGENAME}}|action=delvote}} facer un objection contra le deletion].",
	'deletequeue-page-deletediscuss' => "Iste pagina ha essite proponite pro deletion, e iste proposition ha essite contestate.
Le motivo date esseva ''$1''.
Un discussion es in curso a [[$3]], le qual se concludera le ''$2''.",
	'deletequeue-notqueued' => 'Le pagina que tu ha seligite non es in le cauda de deletiones',
	'deletequeue-review-action' => 'Action a prender:',
	'deletequeue-review-delete' => 'Deler le pagina.',
	'deletequeue-review-change' => 'Deler iste pagina, sed con un altere motivo.',
	'deletequeue-review-requeue' => 'Transferer iste pagina verso le cauda sequente:',
	'deletequeue-review-dequeue' => 'Facer nihil, e retirar le pagina del cauda de deletiones.',
	'deletequeue-review-reason' => 'Commentos:',
	'deletequeue-review-newreason' => 'Nove motivo:',
	'deletequeue-review-newextra' => 'Informationes supplementari:',
	'deletequeue-review-submit' => 'Immagazinar revision',
	'deletequeue-review-original' => 'Motivo pro nomination',
	'deletequeue-actiondisabled-involved' => 'Le sequente action es disactivate post que tu ha participate in iste caso de deletion in le rolos $1:',
	'deletequeue-actiondisabled-notexpired' => 'Le sequente action es disactivate proque le nomination del deletion non ha ancora expirate:',
	'deletequeue-review-badaction' => 'Tu specificava un action invalide',
	'deletequeue-review-actiondenied' => 'Tu specificava un action que es diactivate pro iste pagina',
	'deletequeue-review-objections' => "'''Attention''': Le deletion de iste pagina ha
[{{fullurl:{{FULLPAGENAME}}|action=delvoteview&votetype=object}} objectiones].
Per favor assecura te que tu ha considerate iste objectiones ante que tu dele iste pagina.",
	'deletequeue-reviewspeedy-tab' => 'Revider deletion rapide',
	'deletequeue-reviewspeedy-title' => 'Revider le nomination pro deletion rapide de "$1"',
	'deletequeue-reviewspeedy-text' => "Tu pote usar iste formulario pro revider le nomination de \"'''\$1'''\" pro deletion rapide.
Per favor assecura te que iste pagina pote esser delite rapidemente in conformitate con le politicas.",
	'deletequeue-reviewprod-tab' => 'Revider deletion proponite',
	'deletequeue-reviewprod-title' => 'Revider deletion proponite de "$1"',
	'deletequeue-reviewprod-text' => "Tu pote usar iste formulario pro revider le proposition non contestate pro le deletion de \"'''\$1'''\".",
	'deletequeue-reviewdeletediscuss-tab' => 'Revider deletion',
	'deletequeue-reviewdeletediscuss-title' => 'Revider le discussion super le deletion de "$1"',
	'deletequeue-reviewdeletediscuss-text' => "Tu pote usar iste formulario pro revider le discussion super le deletion de \"'''\$1'''\".

Un [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} lista] de declarationes pro e contra iste deletion es disponibile, e le discussion mesme se trova a [[\$2]].
Per favor assecura te que tu face un decision in conformitate con le consenso del discussion.",
	'deletequeue-deletediscuss-discussionpage' => 'Isto es le pagina de discussion super le deletion de [[$1]].
Al momento, il ha $2 {{PLURAL:$2|usator|usatores}} qui se ha declarate pro iste deletion, e $3 {{PLURAL:$3|usator|usatores}} contra.
Tu pote [{{fullurl:$1|action=delvote}} declarar te pro o contra] le deletion, o [{{fullurl:$1|action=delviewvotes}} vider tote le declarationes pro e contra].',
	'deletequeue-discusscreate-summary' => 'Creation del discussion super le deletion de [[$1]].',
	'deletequeue-discusscreate-text' => 'Deletion proponite pro le sequente motivo: $2',
	'deletequeue-role-nominator' => 'nominator original pro deletion',
	'deletequeue-role-vote-endorse' => 'appoiator del deletion',
	'deletequeue-role-vote-object' => 'opponente del deletion',
	'deletequeue-vote-tab' => 'Pro/contra deletion',
	'deletequeue-vote-title' => 'Declarar se pro o contra le deletion de "$1"',
	'deletequeue-vote-text' => "Tu pote usar iste formulario pro declarar te pro o contra le deletion de \"'''\$1'''\".
Iste action ultrapassara omne previe declarationes pro/contra que tu ha date a proposito del deletion de iste pagina.
Tu pote [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} vider] le existente declarationes pro e contra.
Le motivo indicate in le nomination pro deletion esseva ''\$2''.",
	'deletequeue-vote-legend' => 'Declarar se pro o contra le deletion',
	'deletequeue-vote-action' => 'Recommendation:',
	'deletequeue-vote-endorse' => 'Pro deletion.',
	'deletequeue-vote-object' => 'Contra deletion.',
	'deletequeue-vote-reason' => 'Commentos:',
	'deletequeue-vote-submit' => 'Submitter',
	'deletequeue-vote-success-endorse' => 'Tu te ha declarate con successo pro le deletion de iste pagina.',
	'deletequeue-vote-success-object' => 'Tu te ha declarate con successo contra le deletion de iste pagina.',
	'deletequeue-vote-requeued' => 'Tu te ha declarate con successo contra le deletion de iste pagina.
A causa de tu objection, le pagina ha essite displaciate verso le cauda $1.',
	'deletequeue-showvotes' => 'Declarationes pro e contra le deletion de "$1"',
	'deletequeue-showvotes-text' => "Infra es le declarationes facite pro e contra le deletion del pagina \"'''\$1'''\".
Tu pote registrar tu proprie declaration pro o contra iste deletion [{{fullurl:{{FULLPAGENAME}}|action=delvote}} hic].",
	'deletequeue-showvotes-restrict-endorse' => 'Monstrar solmente declarationes pro',
	'deletequeue-showvotes-restrict-object' => 'Monstrar solmente declarationes contra',
	'deletequeue-showvotes-restrict-none' => 'Monstrar tote le declarationes',
	'deletequeue-showvotes-vote-endorse' => "'''Pro''' deletion le $2 a $1",
	'deletequeue-showvotes-vote-object' => "'''Contra''' deletion le $2 a $1",
	'deletequeue-showvotes-showingonly-endorse' => 'Se monstra solmente le declarationes pro',
	'deletequeue-showvotes-showingonly-object' => 'Se monstra solmente le declarationes contra',
	'deletequeue-showvotes-none' => 'Il ha nulle declarationes pro o contra le deletion de iste pagina.',
	'deletequeue-showvotes-none-endorse' => 'Il ha nulle declarationes pro le deletion de iste pagina.',
	'deletequeue-showvotes-none-object' => 'Il ha nulle declarationes contra le deletion de iste pagina.',
	'deletequeue' => 'Cauda de deletiones',
	'deletequeue-list-text' => 'Iste pagina monstra tote le paginas que se trova in le systema de deletiones.',
	'deletequeue-list-search-legend' => 'Cercar paginas',
	'deletequeue-list-queue' => 'Cauda:',
	'deletequeue-list-status' => 'Stato:',
	'deletequeue-list-expired' => 'Monstrar solmente nominationes que require clausura.',
	'deletequeue-list-search' => 'Cercar',
	'deletequeue-list-anyqueue' => '(omne)',
	'deletequeue-list-votes' => 'Lista de votos',
	'deletequeue-list-votecount' => '$1 {{PLURAL:$1|pro|pro}}, $2 {{PLURAL:$2|contra|contra}}',
	'deletequeue-list-header-page' => 'Pagina',
	'deletequeue-list-header-queue' => 'Cauda',
	'deletequeue-list-header-votes' => 'Declarationes pro e contra',
	'deletequeue-list-header-expiry' => 'Expiration',
	'deletequeue-list-header-discusspage' => 'Pagina de discussion',
);

/** Indonesian (Bahasa Indonesia)
 * @author Rex
 */
$messages['id'] = array(
	'deletequeue-list-search' => 'Cari',
);

/** Italian (Italiano)
 * @author Darth Kule
 */
$messages['it'] = array(
	'deletequeue-desc' => 'Crea un [[Special:DeleteQueue|sistema per gestire le cancellazioni basato su code]]',
	'deletequeue-action' => 'Proponi cancellazione',
	'deletequeue-action-title' => 'Proponi la cancellazione di "$1"',
	'deletequeue-action-text' => "{{SITENAME}} ha una serie di processi per la cancellazione delle pagine:
*Se si crede che questa pagina debba essere ''cancellata immediatamente'', lo si può suggerire [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=speedy}} qui].
*Se questa pagina non può essere cancellata immediatamente ma la sua ''cancellazione sarà probabilmente incontroversa'', dovrebbe essere [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=prod}} proposta per la cancellazione].
*Se la cancellazione di questa pagina è ''probabilmente discutibile'', si dovrebbe [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=deletediscuss}} aprire una discussione].",
	'deletequeue-permissions-noedit' => 'Si deve essere in grado di modificare una pagina per modificarne lo stato di cancellazione.',
	'deletequeue-generic-reasons' => '*Motivazioni generiche
** Vandalismo
** Spam
** Manutenzione
** Al di fuori degli scopi del progetto',
	'deletequeue-speedy-title' => 'Segnala "$1" per la cancellazione immediata',
	'deletequeue-speedy-text' => "È possibile utilizzare questo modulo per segnalare la pagina \"'''\$1'''\" per la cancellazione immediata.

Un amministratore controllerà questa richiesta e, se fondata, cancellerà la pagina. È necessario selezionare una motivazione di cancellazione dal menù a tendina e aggiungere qualsiasi altra informazione importante.",
	'deletequeue-prod-title' => 'Proponi cancellazione di "$1"',
	'deletequeue-prod-text' => "È possibile proporre la cancellazione di \"'''\$1'''\".

Se, dopo cinque giorni, non ci sono state opposizioni alla cancellazione della pagina, sarà cancellata dopo la verifica finale da parte di un amministratore.",
	'deletequeue-delnom-reason' => 'Motivazioni per la segnalazione:',
	'deletequeue-delnom-otherreason' => 'Altra motivazione',
	'deletequeue-delnom-extra' => 'Informazioni aggiuntive:',
	'deletequeue-delnom-submit' => 'Invia segnalazione',
	'deletequeue-log-nominate' => "ha segnalato [[$1]] per la cancellazione nella coda '$2'.",
	'deletequeue-log-rmspeedy' => 'ha respinto la cancellazione immediata di [[$1]].',
	'deletequeue-log-requeue' => "ha spostato [[$1]] in una differente coda di cancellazione: da '$2' a '$3'.",
	'deletequeue-log-dequeue' => "ha rimosso [[$1]] dalla coda '$2' delle cancellazioni.",
	'right-speedy-nominate' => 'Segnala pagine per la cancellazione immediata',
	'right-speedy-review' => 'Controlla le segnalazioni di cancellazioni immediate',
	'right-prod-nominate' => 'Propone una pagina per la cancellazione',
	'right-prod-review' => 'Controlla le proposte di cancellazione non contestate',
	'right-deletediscuss-nominate' => 'Inizia le discussioni sulla cancellazione',
	'right-deletediscuss-review' => 'Chiude le discussioni sulla cancellazione',
	'deletequeue-queue-speedy' => 'Cancellazione immediata',
	'deletequeue-queue-prod' => 'Cancellazione proposta',
	'deletequeue-queue-deletediscuss' => 'Discussione sulla cancellazione',
	'deletequeue-page-speedy' => "Questa pagina è stata segnalata per la cancellazione immediata. La motivazione fornita per questa cancellazione è ''$1''.",
	'deletequeue-page-prod' => "Questa pagina è stata proposta per la cancellazione. La motivazione fornita è ''$1''. Se questa proposta non avrà opposizioni il ''$2'', questa pagina sarà cancellata. È possibile contestare questa cancellazione [{{fullurl:{{FULLPAGENAME}}|action=delvote}} opponendosi a essa].",
	'deletequeue-page-deletediscuss' => "Questa pagina è stata proposta per la cancellazione e la proposta è stata contestata. La motivazione fornita è ''$1''. La discussione si sta tenendo in [[$3]] e si concluderà il ''$2''.",
	'deletequeue-notqueued' => 'La pagina che è stata selezionata non è al momento in coda per la cancellazione',
	'deletequeue-review-action' => 'Azione da effettuare:',
	'deletequeue-review-delete' => 'Cancella la pagina.',
	'deletequeue-review-change' => 'Cancella questa pagina, ma con una motivazione diversa.',
	'deletequeue-review-requeue' => 'Sposta questa pagina nella coda seguente:',
	'deletequeue-review-dequeue' => 'Non effettuare azioni e rimuovi la pagina dalla coda di cancellazione.',
	'deletequeue-review-reason' => 'Commenti:',
	'deletequeue-review-newreason' => 'Nuova motivazione:',
	'deletequeue-review-newextra' => 'Informazioni aggiuntive:',
	'deletequeue-review-submit' => 'Salva verifica',
	'deletequeue-review-original' => 'Motivazioni per la segnalazione',
	'deletequeue-actiondisabled-involved' => "L'azione seguente è stata disattivata perché hai preso parte in questo caso di cancellazione nei ruoli di: $1",
	'deletequeue-actiondisabled-notexpired' => "L'azione seguente è stata disattivata perché la segnalazione della cancellazione non è ancora scaduta:",
	'deletequeue-review-badaction' => "È stata specificata un'azione non valida",
	'deletequeue-review-actiondenied' => "È stata specificata un'azione che è disattivata per questa pagina",
	'deletequeue-review-objections' => "'''Attenzione''': La cancellazione di questa pagina ha delle [{{fullurl:{{FULLPAGENAME}}|action=delvoteview&votetype=object}} opposizioni]. Assicurarsi di aver considerato queste opposizioni prima di cancellare la pagina.",
	'deletequeue-reviewspeedy-tab' => 'Verifica cancellazione immediata',
	'deletequeue-reviewspeedy-title' => 'Verifica la segnalazione della cancellazione immediata di "$1"',
	'deletequeue-reviewspeedy-text' => "È possibile utilizzare questo modulo per verificare la segnalazione della cancellazione immediata di \"'''\$1'''\". Assicurarsi che questa pagina possa essere cancellata immediatamente secondo le policy.",
	'deletequeue-reviewprod-tab' => 'Verifica cancellazione proposta',
	'deletequeue-reviewprod-title' => 'Verifica la proposta di cancellazione cancellazione di "$1"',
	'deletequeue-reviewprod-text' => "È possibile utilizzare questo modulo per controllare la proposta di cancellazione non contestata di \"'''\$1'''\".",
	'deletequeue-reviewdeletediscuss-tab' => 'Controlla cancellazione',
	'deletequeue-reviewdeletediscuss-title' => 'Controlla la discussione sulla cancellazione di "$1"',
	'deletequeue-reviewdeletediscuss-text' => "È possibile utilizzare questo modulo per controllare la discussione sulla cancellazione di \"'''\$1'''\".

È disponibile un [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} elenco] dei supporti e delle opposizioni a questa cancellazione e la discussione può essere trovata a [[\$2]]. Assicurarsi di prendere una decisione in base al consenso raggiunto nella discussione.",
	'deletequeue-deletediscuss-discussionpage' => 'Questa è la pagina di discussione per la cancellazione di [[$1]]. Ci sono al momento $2 {{PLURAL:$2|utente che supporta|utenti che supportano}} la cancellazione e $3 {{PLURAL:$3|utente che si oppone|utenti che si oppongono}} a essa. È possibile [{{fullurl:$1|action=delvote}} supportare oppure opporsi] alla cancellazione o [{{fullurl:$1|action=delviewvotes}} visualizzare tutti i supporti e le opposizioni].',
	'deletequeue-discusscreate-summary' => 'Creazione della discussione sulla cancellazione di [[$1]].',
	'deletequeue-discusscreate-text' => 'Cancellazione proposta per il seguente motivo: $2',
	'deletequeue-role-nominator' => 'proponente della cancellazione',
	'deletequeue-role-vote-endorse' => 'supporti alla cancellazione',
	'deletequeue-role-vote-object' => 'opposizioni alla cancellazione',
	'deletequeue-vote-tab' => 'Supporta/Opponiti alla cancellazione',
	'deletequeue-vote-title' => 'Supporto o opposizione alla cancellazione di "$1"',
	'deletequeue-vote-text' => "È possibile utilizzare questo modulo per sostenere oppure opporsi alla cancellazione di \"'''\$1'''\". Questa azione sostituirà qualsiasi supporto o opposizione precedentemente dati alla cancellazione di questa pagina. È possibile [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} visualizzare] i supporti e le opposizioni già presenti. La motivazione fornita per la segnalazione di cancellazione è ''\$2''.",
	'deletequeue-vote-legend' => 'Supporta/Opponiti alla cancellazione',
	'deletequeue-vote-action' => 'Raccomandazioni:',
	'deletequeue-vote-endorse' => 'Supporta cancellazione.',
	'deletequeue-vote-object' => 'Opponiti alla cancellazione.',
	'deletequeue-vote-reason' => 'Commenti:',
	'deletequeue-vote-submit' => 'Invia',
	'deletequeue-vote-success-endorse' => 'Hai supportato con successo la cancellazione di questa pagina.',
	'deletequeue-vote-success-object' => 'Ti sei opposto con successo alla cancellazione di questa pagina.',
	'deletequeue-vote-requeued' => 'Ti sei opposto con successo alla cancellazione di questa pagina. A causa della tua opposizione la pagina è stata spostata nella coda $1.',
	'deletequeue-showvotes' => 'Supporti e opposizioni alla cancellazione di "$1"',
	'deletequeue-showvotes-text' => "Di seguito sono elencati i supporti e le opposizioni alla cancellazione della pagina \"'''\$1'''\". È possibile registrare il proprio supporto o la propria opposizione a questa cancellazione  [{{fullurl:{{FULLPAGENAME}}|action=delvote}} qui].",
	'deletequeue-showvotes-restrict-endorse' => 'Mostra solo i supporti',
	'deletequeue-showvotes-restrict-object' => 'Mostra solo le opposizioni',
	'deletequeue-showvotes-restrict-none' => 'Mostra tutti i supporti e le opposizioni',
	'deletequeue-showvotes-vote-endorse' => "Cancellazione '''supportata''' il $2 alle $1",
	'deletequeue-showvotes-vote-object' => "'''Opposizione''' alla cancellazione il $2 alle $1",
	'deletequeue-showvotes-none' => 'Non ci sono supporti o opposizioni alla cancellazione di questa pagina.',
	'deletequeue-showvotes-none-endorse' => 'Non ci sono supporti alla cancellazione di questa pagina.',
	'deletequeue-showvotes-none-object' => 'Non ci sono opposizioni alla cancellazione di questa pagina.',
	'deletequeue' => 'Coda di cancellazione',
	'deletequeue-list-text' => 'Di seguito sono mostrate tutte le pagine che si trovano nel sistema di cancellazione.',
	'deletequeue-list-search-legend' => 'Cerca pagine',
	'deletequeue-list-queue' => 'Coda:',
	'deletequeue-list-status' => 'Stato:',
	'deletequeue-list-expired' => 'Mostra solo le segnalazioni che richiedono di essere chiuse.',
	'deletequeue-list-search' => 'Ricerca',
	'deletequeue-list-anyqueue' => '(alcuni)',
	'deletequeue-list-votes' => 'Elenco dei voti',
	'deletequeue-list-votecount' => '$1 {{PLURAL:$1|supporto|supporti}}, $2 {{PLURAL:$2|opposizione|opposizioni}}',
	'deletequeue-list-header-page' => 'Pagina',
	'deletequeue-list-header-queue' => 'Coda',
	'deletequeue-list-header-votes' => 'Supporti e opposizioni',
	'deletequeue-list-header-expiry' => 'Scadenza',
	'deletequeue-list-header-discusspage' => 'Pagina di discussione',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Lovekhmer
 */
$messages['km'] = array(
	'deletequeue-action-queued' => 'ការលុប',
	'deletequeue-delnom-otherreason' => 'មូលហេតុផ្សេងទៀត',
	'deletequeue-delnom-extra' => 'ពត៌មានបន្ថែម៖',
	'deletequeue-review-delete' => 'លុបទំព័រ។',
	'deletequeue-review-reason' => 'យោបល់៖',
	'deletequeue-review-newreason' => 'មូលហេតុថ្មី៖',
	'deletequeue-review-newextra' => 'ពត៌មានបន្ថែម៖',
	'deletequeue-vote-submit' => 'ដាក់ស្នើ',
	'deletequeue-list-search' => 'ស្វែងរក',
	'deletequeue-list-header-page' => 'ទំព័រ',
);

/** Krio (Krio)
 * @author Jose77
 */
$messages['kri'] = array(
	'deletequeue-list-search' => 'Luk foh am',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'deletequeue-desc' => 'Schaff en Süßteem met [[Special:DeleteQueue|Schlange fun Sigge, di op et Fottschmiiße am waade]] sin.',
	'deletequeue-delnom-otherreason' => 'Ene andere Jrund',
	'deletequeue-delnom-extra' => 'Zosätzlijje Enfommazjuhne:',
	'deletequeue-list-status' => 'Stattus:',
	'deletequeue-list-search' => 'Söke',
	'deletequeue-list-votes' => 'Leß met de Stemme',
	'deletequeue-list-votecount' => '{{PLURAL:$1|Eine es|$1 sin|Keine es}} doför, un {{PLURAL:$2|eine|$2|keine}} dojähje',
	'deletequeue-list-header-page' => 'Sigg',
	'deletequeue-list-header-votes' => 'Doför un dojäje',
	'deletequeue-list-header-discusspage' => 'Klaafsigg',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'deletequeue-action-queued' => 'Läschen',
	'deletequeue-action' => 'Läsche virschloen',
	'deletequeue-action-title' => 'Läsche vu(n) "$1" virschloen',
	'deletequeue-permissions-noedit' => 'Dir musst eng Säit ännere kënnen, fir hire Läschstatus veränneren ze kënnen.',
	'deletequeue-generic-reasons' => '* Heefegst Grënn
** Vandalismus
** Spam
** Maintenance
** Net am Sënn vum Projet',
	'deletequeue-nom-alreadyqueued' => 'Dës Säit steet schon op der Lëscht fir ze läschen.',
	'deletequeue-prod-title' => 'D\'Läsche vu(n) "$1" virschloen',
	'deletequeue-delnom-reason' => "Grond fir d'Ufro (fir ze läschen):",
	'deletequeue-delnom-otherreason' => 'Anere Grond',
	'deletequeue-delnom-extra' => 'Zousätzlech Informatioun:',
	'right-prod-nominate' => 'Säit virschloe vir ze läschen',
	'right-deletediscuss-nominate' => 'Läschdiskussiounen ufänken',
	'right-deletediscuss-review' => 'Läschdiskussiounen ofschléissen',
	'deletequeue-queue-speedy' => 'Séier Läschen',
	'deletequeue-queue-prod' => 'Virgeschlo fir ze läschen',
	'deletequeue-queue-deletediscuss' => 'Läschdiskussioun',
	'deletequeue-review-delete' => "D'Säit läschen",
	'deletequeue-review-change' => 'Dës Säit läschen, awer mat engem anere Grond.',
	'deletequeue-review-reason' => 'Bemierkungen:',
	'deletequeue-review-newreason' => 'Neie Grond:',
	'deletequeue-review-newextra' => 'Zousätzlech Informatioun:',
	'deletequeue-reviewspeedy-tab' => 'Séier läschen iwwerpréifen',
	'deletequeue-reviewdeletediscuss-tab' => 'Läschen iwwerpréifen',
	'deletequeue-reviewdeletediscuss-title' => 'Diskussioun iwwer d\'Läsche vu(n) "$1" nokucken',
	'deletequeue-discusscreate-text' => "D'Läsche gouf aus dësem Grond virgeschlo: $2",
	'deletequeue-role-vote-endorse' => "Fir d'Läschen",
	'deletequeue-role-vote-object' => "Géint d'Läschen",
	'deletequeue-vote-tab' => "Iwwer d'Läschen ofstëmmen",
	'deletequeue-vote-legend' => "Dem Läschen zoustëmmen/Géint d'Läsche stëmmen",
	'deletequeue-vote-action' => 'Rot:',
	'deletequeue-vote-endorse' => 'Läschen ënnerstetzen',
	'deletequeue-vote-object' => "Géint d'Läschen",
	'deletequeue-vote-reason' => 'Bemierkungen:',
	'deletequeue-showvotes-restrict-endorse' => 'Nëmmem Zoustëmmunge weisen',
	'deletequeue-showvotes-showingonly-endorse' => "Nëmmen d'Zoustëmmunge gi gewisen",
	'deletequeue-list-text' => 'Op dëser Sàit stinn all déi Säiten déi am Läschsystem dra sinn.',
	'deletequeue-list-search-legend' => 'Säite sichen:',
	'deletequeue-list-status' => 'Status:',
	'deletequeue-list-search' => 'Sichen',
	'deletequeue-list-anyqueue' => '(iergendeng)',
	'deletequeue-list-votes' => 'Lëscht vun de Stëmmen',
	'deletequeue-list-header-page' => 'Säit',
	'deletequeue-list-header-discusspage' => 'Diskussiounssäit',
);

/** Eastern Mari (Олык Марий)
 * @author Сай
 */
$messages['mhr'] = array(
	'deletequeue-delnom-otherreason' => 'Вес амал',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'deletequeue-review-newreason' => 'Од тувталось:',
	'deletequeue-review-newextra' => 'Поладкс информациясь:',
	'deletequeue-list-queue' => 'Чиполань пулось:',
	'deletequeue-list-search' => 'Вешнэмс',
	'deletequeue-list-header-page' => 'Лопа',
	'deletequeue-list-header-queue' => 'Чиполань пуло',
	'deletequeue-list-header-expiry' => 'Таштомома шказо',
	'deletequeue-list-header-discusspage' => 'Кортнема лопа',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'deletequeue-desc' => "Voegt een [[Special:DeleteQueue|wachtrij voor het beheren van te verwijderen pagina's]] toe",
	'deletequeue-action-queued' => 'Verwijderverzoek',
	'deletequeue-action' => 'Ter verwijdering voordragen',
	'deletequeue-action-title' => '"$1" ter verwijdering voordragen',
	'deletequeue-action-text' => "{{SITENAME}} heeft een aantal processen voor het verwijderen van pagina's:
* Als u denkt dat deze pagina ''direct verwijderd'' kan worden, kunt u deze pagina voor [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=speedy}} direct verwijdering] voordragen.
* Als deze pagina niet in aanmerking komt voor directe verwijdering, maar het verwijderen ''waarschijnlijk niet tot discussie leidt'', dan kunt u deze [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=prod}} voor verwijdering nomineren].
* Als het verwijderen van deze pagina ''waarschijnlijk bezwaar oplevert'', dan kunt u [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=deletediscuss}} verwijderoverleg starten].",
	'deletequeue-action-text-queued' => "Bij dit verwijderverzoek horen de volgende pagina's:
* [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} Overzicht steun en bezwaar].
* [{{fullurl:{{FULLPAGENAME}}|action=delvote}} Het verwijderverzoek steunen of afwijzen].",
	'deletequeue-permissions-noedit' => 'U moet rechten hebben een pagina te bewerken om de verwijderstatus te kunnen veranderen.',
	'deletequeue-generic-reasons' => '* Algemene redenen
** Vandalisme
** Spam
** Onderhoud
** Buiten projectscope',
	'deletequeue-nom-alreadyqueued' => 'Voor deze pagina bestaat al een verwijderverzoek.',
	'deletequeue-speedy-title' => '"$1" voordragen voor directe verwijdering',
	'deletequeue-speedy-text' => "U kunt dit formulier gebruiken om \"'''\$1'''\" voor te dragen voor directe verwijdering.

Een beheerder bekijkt dit verzoek, en verwijdert de pagina's als het verzoek terecht is.
U moet een reden voor verwijdering opgeven uit de onderstaande uitklaplijst en overige relevante informatie invoeren.",
	'deletequeue-prod-title' => '"$1" ter verwijdering voordragen',
	'deletequeue-prod-text' => "U kunt dit formulier gebruiken om \"'''\$1'''\" voor verwijdering voor te dragen.

Als na vijf dagen niemand protest heeft aangetekend tegen de verwijdernominatie, wordt deze na beoordeling door een beheerder verwijderd.",
	'deletequeue-delnom-reason' => 'Reden voor nominatie:',
	'deletequeue-delnom-otherreason' => 'Andere reden',
	'deletequeue-delnom-extra' => 'Extra informatie:',
	'deletequeue-delnom-submit' => 'Nominatie opslaan',
	'deletequeue-log-nominate' => "heeft [[$1]] voor verwijdering voorgedragen in de wachtrij '$2'.",
	'deletequeue-log-rmspeedy' => 'heeft snelle verwijdering van [[$1]] geweigerd.',
	'deletequeue-log-requeue' => "heeft [[$1]] naar een andere verwijderingswachtrij verplaatst: van '$2' naar '$3'.",
	'deletequeue-log-dequeue' => "heeft [[$1]] uit de verwijderingswachtrij '$2' verwijderd.",
	'right-speedy-nominate' => "Pagina's voordragen voor directe verwijdering",
	'right-speedy-review' => 'Nominaties voor directe verwijdering beoordelen',
	'right-prod-nominate' => "Pagina's voor verwijdering voordragen",
	'right-prod-review' => 'Verwijderingsnominaties zonder bezwaar beoordelen',
	'right-deletediscuss-nominate' => 'Verwijderoverleg starten',
	'right-deletediscuss-review' => 'Verwijderoverleg sluiten',
	'right-deletequeue-vote' => 'Verwijderverzoeken steunen of afwijzen',
	'deletequeue-queue-speedy' => 'Snelle verwijdering',
	'deletequeue-queue-prod' => 'Verwijderingsvoorstel',
	'deletequeue-queue-deletediscuss' => 'Verwijderoverleg',
	'deletequeue-page-speedy' => "Deze pagina is genomineerd voor snelle verwijdering. De opgegeven reden is: ''$1''.",
	'deletequeue-page-prod' => "Deze pagina is voor verwijdering voorgedragen.
De opgegeven reden is: ''$1''.
Als er geen bezwaar is tegen dit voorstel op ''$2'', wordt deze pagina verwijderd.
U kunt [{{fullurl:{{FULLPAGENAME}}|action=delvote}} bezwaar maken] tegen de verwijdernominatie.",
	'deletequeue-page-deletediscuss' => "Deze pagina is genomineerd voor verwijdering, en tegen dat voorstel is bezwaar gemaakt.
De opgegeven reden is: ''$1''.
Overleg over dit voorstel wordt gevoerd op [[$3]], en loopt af op ''$2''.",
	'deletequeue-notqueued' => 'De door u geselecteerde pagina is niet genomineerd voor verwijdering',
	'deletequeue-review-action' => 'Te nemen actie:',
	'deletequeue-review-delete' => 'De pagina verwijderen.',
	'deletequeue-review-change' => 'Deze pagina om een andere reden verwijderen.',
	'deletequeue-review-requeue' => 'Deze pagina naar een andere wachtrij verplaatsen:',
	'deletequeue-review-dequeue' => 'Geen verwijdering uitvoeren, en de pagina weghalen van de verwijderingswachtrij.',
	'deletequeue-review-reason' => 'Opmerkingen:',
	'deletequeue-review-newreason' => 'Nieuwe reden:',
	'deletequeue-review-newextra' => 'Extra informatie:',
	'deletequeue-review-submit' => 'Beoordeling opslaan',
	'deletequeue-review-original' => 'Reden voor nominatie',
	'deletequeue-actiondisabled-involved' => 'De volgende handeling is uitgeschakeld omdat u in de volgende rollen aan deze verwijdernominatie hebt deelgenomen: $1',
	'deletequeue-actiondisabled-notexpired' => 'De volgende handeling is uitgeschakeld omdat de verwijdernominatie is nog niet verlopen:',
	'deletequeue-review-badaction' => 'U hebt een niet-bestaande handeling opgegeven',
	'deletequeue-review-actiondenied' => 'U hebt een handeling opgegeven die voor deze pagina is uigeschakeld',
	'deletequeue-review-objections' => "'''Waarschuwing''': er is [{{FULLURL:{{FULLPAGENAME}}|action=delvoteview|votetype=object}} bezwaar] gemaakt tegen de verwijdernominatie voor deze pagina.
Zorg er voor dat u deze overweegt voordat u deze pagina verwijdert.",
	'deletequeue-reviewspeedy-tab' => 'Snelle verwijdering beoordelen',
	'deletequeue-reviewspeedy-title' => 'De snelle verwijderingsnominatie voor "$1" beoordelen',
	'deletequeue-reviewspeedy-text' => "U kunt dit formulier gebruiken om de nominatie voor snelle verwijdering van \"'''\$1'''\" te beoordelen.
Zorg er voor dat u in lijn met het geldende beleid handelt.",
	'deletequeue-reviewprod-tab' => 'Voorgestelde verwijdering nakijken',
	'deletequeue-reviewprod-title' => 'Voorgestelde verwijdering van "$1" nakijken',
	'deletequeue-reviewprod-text' => "U kunt dit formulier gebruiken om de verwijdernominatie van \"'''\$1'''\" te beoordelen.",
	'deletequeue-reviewdeletediscuss-tab' => 'Verwijdernominatie beoordelen',
	'deletequeue-reviewdeletediscuss-title' => "Verwijderoverleg voor \"'''\$1'''\" beoordelen",
	'deletequeue-reviewdeletediscuss-text' => 'U kunt dit formulier gebruiken om de verwijderingsdiscussie voor "$1" na te kijken.

Een [{{FULLURL:{{FULLPAGENAME}}|action=delviewvotes}} lijst] met ondersteuningen en bezwaren voor deze verwijdering is beschikbaar, en de discussie zelf kunt u terugvinden op [[$2]].
Wees zeker dat u een beslissing maakt in overeenstemming met de consensus van de discussie.',
	'deletequeue-deletediscuss-discussionpage' => 'Dit is het verwijderoverleg voor [[$1]].
Er {{PLURAL:$2|is|zijn}} op dit moment {{PLURAL:$2|één gebruiker|$2 gebruikers}} die de verwijdernominatie steunen en {{PLURAL:$3|één gebruiker|$3 gebruikers}} die bezwaart {{PLURAL:$3|heeft|hebben}} tegen de verwijdernominatie.
U kunt [{{FULLURL:$1|action=delvote}} steun of bezwaar] bij de verwijdernominatie aangeven of [{{FULLURL:$1|action=delviewvotes}} alle steun en bezwaar bekijken].',
	'deletequeue-discusscreate-summary' => 'Bezig met het starten van een discussie voor de verwijdering van [[$1]].',
	'deletequeue-discusscreate-text' => 'Verwijdering voorgesteld voor de volgende reden: $2',
	'deletequeue-role-nominator' => 'indiener verwijdervoorstel',
	'deletequeue-role-vote-endorse' => 'ondersteunt verwijdervoorstel',
	'deletequeue-role-vote-object' => 'maakt bezwaar tegen verwijdervoorstel',
	'deletequeue-vote-tab' => 'Bezwaar maken/Steun geven aan de verwijdernominatie',
	'deletequeue-vote-title' => 'Bezwaar maken tegen of steun geven aan de verwijdernominatie voor "$1"',
	'deletequeue-vote-text' => "U kunt dit formulier gebruiken om bezwaar te maken tegen de verwijdernominatie voor \"'''\$1'''\" of deze te steunen.
Deze handeling komt in de plaats van eventuele eerdere uitspraken van steun of bezwaar bij de verwijdernominatie van deze pagina.
U kunt [{{FULLURL:{{FULLPAGENAME}}|action=delviewvotes}} alle steun en bezwaar bekijken].
De reden voor de verwijdernominatie is ''\$2''.",
	'deletequeue-vote-legend' => 'Bezwaar en ondersteuning verwijdervoorstel',
	'deletequeue-vote-action' => 'Aanbeveling:',
	'deletequeue-vote-endorse' => 'Verwijdervoorstel steunen.',
	'deletequeue-vote-object' => 'Bezwaar maken tegen verwijdervoorstel.',
	'deletequeue-vote-reason' => 'Opmerkingen:',
	'deletequeue-vote-submit' => 'Opslaan',
	'deletequeue-vote-success-endorse' => 'Uw steun voor de verwijdernominatie van deze pagina is opgeslagen.',
	'deletequeue-vote-success-object' => 'Uw bezwaar tegen de verwijdernominatie van deze pagina is opgeslagen.',
	'deletequeue-vote-requeued' => 'Uw bezwaar tegen de verwijdernominatie van deze pagina is opgeslagen.
Vanwege uw bezwaar, is de pagina verplaatst naar de wachtrij "$1".',
	'deletequeue-showvotes' => 'Steun en bezwaar bij de verwijdernominatie van "$1"',
	'deletequeue-showvotes-text' => "Hieronder worden steun en bezwaar bij de verwijdernominatie van de pagin \"'''\$1'''\" weergegeven.
U kunt ook [{{FULLURL:{{FULLPAGENAME}}|action=delvote}} steun of bezwaar] aangegeven bij deze verwijdernominatie.",
	'deletequeue-showvotes-restrict-endorse' => 'Alleen steun weergeven',
	'deletequeue-showvotes-restrict-object' => 'Alleen bezwaren weergeven',
	'deletequeue-showvotes-restrict-none' => 'Alle steun en bezwaar weergeven',
	'deletequeue-showvotes-vote-endorse' => "Heeft '''steun''' gegeven voor verwijdering op $1 om $2",
	'deletequeue-showvotes-vote-object' => "Heeft '''bezwaar''' gemaakt tegen verwijdering op $1 om $2",
	'deletequeue-showvotes-showingonly-endorse' => 'Alleen steun wordt weergegeven',
	'deletequeue-showvotes-showingonly-object' => 'Alleen bezwaar wordt weergegeven',
	'deletequeue-showvotes-none' => 'Is is geen steun of bezwaar bij de verwijdernominatie van deze pagina.',
	'deletequeue-showvotes-none-endorse' => 'Er is geen steun voor de verwijdernominatie van deze pagina.',
	'deletequeue-showvotes-none-object' => 'Er is geen bezwaar tegen de verwijdermoninatie van deze pagina.',
	'deletequeue' => 'Verwijderingswachtrij',
	'deletequeue-list-text' => "Deze pagina toont alle pagina's die in het verwijderingssysteem zijn.",
	'deletequeue-list-search-legend' => "Zoeken naar pagina's",
	'deletequeue-list-queue' => 'Wachtrij:',
	'deletequeue-list-status' => 'Status:',
	'deletequeue-list-expired' => 'Alleen verwijdernominaties weergeven die gesloten moeten worden.',
	'deletequeue-list-search' => 'Zoeken',
	'deletequeue-list-anyqueue' => '(alle)',
	'deletequeue-list-votes' => 'Stemmen',
	'deletequeue-list-votecount' => '$1 {{PLURAL:$1|steunbetuiging|steunbetuigingen}}, $2 {{PLURAL:$2|bezwaar|bezwaren}}',
	'deletequeue-list-header-page' => 'Pagina',
	'deletequeue-list-header-queue' => 'Wachtrij',
	'deletequeue-list-header-votes' => 'Steun en bezwaar',
	'deletequeue-list-header-expiry' => 'Verloopdatum',
	'deletequeue-list-header-discusspage' => 'Overlegpagina',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'deletequeue-desc' => 'Skaper et [[Spcial:DeleteQueue|købasert system for å håndtere sletting]]',
	'deletequeue-action' => 'Foreslå sletting',
	'deletequeue-action-title' => 'Foreslå sletting av «$1»',
	'deletequeue-action-text' => "{{SITENAME}} har flere prosesser for sletting av sider:
* Om du mener at denne siden kvalifiserer for ''hurtigsletting'', kan du foreslå det [{{fullurl:{{FULLPAGENAMEE}}|action=delnom&queue=speedy}} her].
* Om siden ikke kvalifserer for hurtigsletting, men ''sletting likevel vil være ukontroversielt'', kan du [{{fullurl:{{FULLPAGENAMEE}}|action=delnom&queue=prod}} foreslå sletting her].
* Om det er sannsynlig at sletting av siden ''vil bli omdiskutert'', burde du [{{fullurl:{{FULLPAGENAMEE}}|action=delnom&queue=deletediscuss}} åpne en diskusjon].",
	'deletequeue-permissions-noedit' => 'Du må kunne redigere en side for kunne påvirke dens slettingsstatus.',
	'deletequeue-generic-reasons' => '* Vanlige reasons
  ** Hæverk
  ** Søppel
  ** Reklame
  ** Vedlikehold
  ** Ikke relevant for prosjektet',
	'deletequeue-speedy-title' => 'Merk «$1» for hurtigsletting',
	'deletequeue-speedy-text' => "Du kan bruke dette skjemaet for å merke siden «'''$1'''» for hurtigsletting.

En administrator vil se gjennom forespørselen, og om den er rimelig, slette siden.
Du må velge en årsak fra lista nedenfor, og legge til annen relevant informasjon.",
	'deletequeue-prod-title' => 'Foreslå sletting av «$1»',
	'deletequeue-prod-text' => "Du kan bruke dette skjemaet for å foreslå at «'''$1'''» slettes.

Om ingen har motsetninger mot slettingen innen fem dager, vil slettingen vurderes av en administrator.",
	'deletequeue-delnom-reason' => 'Nomneringsårsak:',
	'deletequeue-delnom-otherreason' => 'Annen grunn',
	'deletequeue-delnom-extra' => 'Ekstra informasjon:',
	'deletequeue-delnom-submit' => 'Nominer',
	'deletequeue-log-nominate' => 'nominerte [[$1]] for sletting i køen «$2».',
	'deletequeue-log-rmspeedy' => 'avviste hurtigsletting av [[$1]].',
	'deletequeue-log-requeue' => 'overførte [[$1]] til fra slettingskøen «$2» til «$3».',
	'deletequeue-log-dequeue' => 'fjernet [[$1]] fra slettingskøen «$2».',
	'right-speedy-nominate' => 'Nominere sider til hurtigsletting',
	'right-speedy-review' => 'Behandle nominasjoner til hurtigsletting',
	'right-prod-nominate' => 'Foreslå sletting av sider',
	'right-prod-review' => 'Behandle ukontroversielle slettingsforslag',
	'right-deletediscuss-nominate' => 'Starte slettingsdiskusjoner',
	'right-deletediscuss-review' => 'Avslutte slettingsdiskusjoner',
	'deletequeue-queue-speedy' => 'Hurtigsletting',
	'deletequeue-queue-prod' => 'Slettingsforslag',
	'deletequeue-queue-deletediscuss' => 'Slettingsdiskusjon',
	'deletequeue-page-speedy' => "Denne siden har blitt nominert for hurtigsletting.
Årsaken som ble oppgitt var ''$1''.",
	'deletequeue-page-prod' => "Denne siden har blitt foreslått for sletting.
Årsaken som ble oppgitt var ''$1''.
Om dette forslaget ikke er motsagt innen ''$2'', vil siden bli slettet.
Du kan bestride sletting av siden ved å [{{fullurl:{{FULLPAGENAME}}|action=delvote}} motsi sletting].",
	'deletequeue-page-deletediscuss' => "Denne siden har blitt foreslått slettet, men forslaget har blitt bestridt.
Den oppgitte slettingsgrunnen var ''$1''.
En diskusjon foregår på [[$3]]; den vil slutte ''$2''.",
	'deletequeue-notqueued' => 'Siden du har valgt er ikke foreslått slettet',
	'deletequeue-review-action' => 'Handling:',
	'deletequeue-review-delete' => 'Slette siden.',
	'deletequeue-review-change' => 'Slette siden, men med annen begrunnelse.',
	'deletequeue-review-requeue' => 'Overføre siden til følgende kø:',
	'deletequeue-review-dequeue' => 'Ikke gjøre noe, og fjerne siden fra slettingskøen.',
	'deletequeue-review-reason' => 'Kommentarer:',
	'deletequeue-review-newreason' => 'Ny årsak:',
	'deletequeue-review-newextra' => 'Ekstra informasjon:',
	'deletequeue-review-submit' => 'Lagre gjennomgang',
	'deletequeue-review-original' => 'Nominasjonsårsak',
	'deletequeue-actiondisabled-involved' => 'Følgende handling kan ikke gjøres av deg, fordi du har tatt del i slettingen som $1:',
	'deletequeue-actiondisabled-notexpired' => 'Følgende handling kan ikke gjennomføres, fordi slettingsforslaget ikke har utgått:',
	'deletequeue-review-badaction' => 'Du oppga en ugyldig handling',
	'deletequeue-review-actiondenied' => 'Du oppga en handling som er slått av for denne siden',
	'deletequeue-review-objections' => "'''Advarsel''': Det er [{{fullurl:{{FULLPAGENAME}}|action=delvoteview&votetype=object}} motsigelser] til sletting av denne siden.
Forsikre deg om at du har tatt disse til hensyn før du sletter siden.",
	'deletequeue-reviewspeedy-tab' => 'Behandle hurtigsletting',
	'deletequeue-reviewspeedy-title' => 'Behandle hurtigsletting av «$1»',
	'deletequeue-reviewspeedy-text' => "Du kan bruke denne skjemaet for å vurdere hurtigsletting av «'''$1'''».
Forsikre deg om at siden kan hurtigslettes ifm. retningslinjene.",
	'deletequeue-reviewprod-tab' => 'Behandle slettingsforslag',
	'deletequeue-reviewprod-title' => 'Behandle slettingsforslag av «$1»',
	'deletequeue-reviewprod-text' => "Du kan bruke dette skjamet for å behandle sletting av «'''$1'''».",
	'deletequeue-vote-reason' => 'Kommentarer:',
	'deletequeue' => 'Slettingskø',
	'deletequeue-list-search-legend' => 'Søk etter sider',
	'deletequeue-list-queue' => 'Kø:',
	'deletequeue-list-status' => 'Status:',
	'deletequeue-list-search' => 'Søk',
	'deletequeue-list-anyqueue' => '(noen)',
	'deletequeue-list-votes' => 'Liste over stemmer',
	'deletequeue-list-header-page' => 'Side',
	'deletequeue-list-header-queue' => 'Kø',
	'deletequeue-list-header-expiry' => 'Varighet',
	'deletequeue-list-header-discusspage' => 'Diskusjonsside',
);

/** Occitan (Occitan)
 * @author Cedric31
 * @author Meno25
 */
$messages['oc'] = array(
	'deletequeue-desc' => 'Crea un [[Special:DeleteQueue|sistèma de coa per gerir las supressions]]',
	'deletequeue-action-queued' => 'Supression',
	'deletequeue-action' => 'Suggerís la supression',
	'deletequeue-action-title' => 'Suggerís la supression de « $1 »',
	'deletequeue-action-text' => "{{SITENAME}} dispausa d'un nombre de processús per la supression de las paginas :
*Se cresètz qu'aquesta pagina deu passar per una ''supression immediata'', ne podètz far la demanda [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=speedy}} aicí].
*S'aquesta pagina relèva pas de la supression immediata, mas ''qu'aquesta supression pausarà pas cap de controvèrsa per'', vos caldrà [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=prod}} prepausar una supression pas contestabla].
*Se la supression de la pagina es ''subjècta a controvèrsas'', vos caldrà [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=deletediscuss}} dobrir una discussion].",
	'deletequeue-action-text-queued' => "Podètz visionar las paginas seguentas per aquesta supression :
* [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} Veire las acòrdis e las objeccions].
* [{{fullurl:{{FULLPAGENAME}}|action=delvote}} Acceptar o objectar per la supression d'aquesta pagina].",
	'deletequeue-permissions-noedit' => 'Vos cal èsser capable de modificar una pagina per poder afectar son estatut de supression.',
	'deletequeue-generic-reasons' => '*Motius mai corrents
** Vandalisme
** Spam
** Mantenença
** Fòra de critèris',
	'deletequeue-nom-alreadyqueued' => 'Aquesta pagina ja es dins la coa de las supressions.',
	'deletequeue-speedy-title' => 'Marcar « $1 » per una supression immediata',
	'deletequeue-speedy-text' => "Podètz utilizar aqueste formulari per marcar la pagina « '''$1''' » per una supression immediata.

Un administrator estudiarà aquesta requèsta e, s'es fondada, suprimirà la pagina.
Vos cal seleccionar un motiu a partir de la lista desenrotlanta çaijós, e apondre d’autras entresenha aferentas.",
	'deletequeue-prod-title' => 'Prepausar la supression de « $1 »',
	'deletequeue-prod-text' => "Podètz utilizar aqueste formulari per prepausar que « '''$1''' » siá suprimida.

Se, aprèp cinc jorns, degun a pas emés d’objeccion per aquò, serà suprimida, aprèp un examèn final, per un administrator.",
	'deletequeue-delnom-reason' => 'Motiu per la nominacion :',
	'deletequeue-delnom-otherreason' => 'Autra rason',
	'deletequeue-delnom-extra' => 'Entresenhas suplementàrias :',
	'deletequeue-delnom-submit' => 'Sometre la nominacion',
	'deletequeue-log-nominate' => '[[$1]] nomenat per la supression dins la coa « $2 ».',
	'deletequeue-log-rmspeedy' => 'refusat per la supression immediata de [[$1]].',
	'deletequeue-log-requeue' => '[[$1]] transferit cap a una coa de supression diferenta : de « $2 » cap a « $3 ».',
	'deletequeue-log-dequeue' => '[[$1]] levat dempuèi la coa de supression « $2 ».',
	'right-speedy-nominate' => 'Nomena las paginas per una supression immediata.',
	'right-speedy-review' => 'Tornar veire las nominacions per la supression immediata',
	'right-prod-nominate' => 'Prepausar la supression de la pagina',
	'right-prod-review' => 'Tornar veire las proposicions de supression pas contestadas',
	'right-deletediscuss-nominate' => 'Començar las discussions sus la supression',
	'right-deletediscuss-review' => 'Clausurar las discussions sus la supression',
	'right-deletequeue-vote' => 'Consentir o objectar per las supressions',
	'deletequeue-queue-speedy' => 'Supression immediata',
	'deletequeue-queue-prod' => 'Supression prepausada',
	'deletequeue-queue-deletediscuss' => 'Discussion sus la supression',
	'deletequeue-page-speedy' => "Aquesta pagina es estada nomenada per una supression immediata.
La rason invocada per aquò es ''« $1 »''.",
	'deletequeue-page-prod' => "Es estat prepausada la supression d'aquesta pagina.
La rason invocada es ''« $1 »''.
Se la proposicion rencontra pas cap d'objeccion sus ''$2'', la pagina serà suprimida.
Podètz contestar aquesta supression en [{{fullurl:{{FULLPAGENAME}}|action=delvote}} vos i opausant].",
	'deletequeue-page-deletediscuss' => "Aquesta pagina es estada prepausada a la supression, aquesta es estada contestada.
Lo motiu invocat èra ''« $1 »''
Una discussion es intervenguda sus [[$3]], la quala serà concluida lo ''$2''.",
	'deletequeue-notqueued' => "La pagina qu'avètz seleccionada es pas dins la coa de las supressions",
	'deletequeue-review-action' => 'Accion de prene :',
	'deletequeue-review-delete' => 'Suprimir la pagina.',
	'deletequeue-review-change' => 'Suprimir aquesta pagina, mas amb una autra rason.',
	'deletequeue-review-requeue' => 'Transferir aquesta pagina cap a la coa seguenta :',
	'deletequeue-review-dequeue' => 'Far pas res e levar la pagina de la coa de supression.',
	'deletequeue-review-reason' => 'Comentaris :',
	'deletequeue-review-newreason' => 'Motiu novèl :',
	'deletequeue-review-newextra' => 'Entresenha suplementària :',
	'deletequeue-review-submit' => 'Salvar la relectura',
	'deletequeue-review-original' => 'Motiu de la nominacion',
	'deletequeue-actiondisabled-involved' => 'L’accion seguenta es desactivada perque avètz pres part a aqueste cas de supresion dins lo sens de $1 :',
	'deletequeue-actiondisabled-notexpired' => 'L’accion seguenta es estada desactivada perque lo relambi per la nominacion a la supression a pas encara expirat :',
	'deletequeue-review-badaction' => 'Avètz indicat una accion incorrècta',
	'deletequeue-review-actiondenied' => "Avètz indicat una accion qu'es desactivada per aquesta pagina.",
	'deletequeue-review-objections' => "'''Atencion''' : la supression d'aquesta pagina es [{{FULLURL:{{FULLPAGENAME}}|action=delvoteview|votetype=object}} contestada]. Asseguratz-vos qu'avètz examinat aquestas objeccions abans sa supression.",
	'deletequeue-reviewspeedy-tab' => 'Tornar veire la supression immediata',
	'deletequeue-reviewspeedy-title' => 'Tornar veire la supression immediata de « $1 »',
	'deletequeue-reviewspeedy-text' => "Podètz utilizar aqueste formular per tornar veire la nominacion de « '''$1''' » en supression immediata.
Asseguratz-vos qu'aquesta pagina pòt èsser suprimida atal en conformitat amb las règlas del projècte.",
	'deletequeue-reviewprod-tab' => 'Tornar veire las supressions prepausadas',
	'deletequeue-reviewprod-title' => 'Tornar veire la supression prepausada per « $1 »',
	'deletequeue-reviewprod-text' => "Podètz utilizar aqueste formulari per tornar veire la proposicion pas contestada per suprimir « '''$1''' ».",
	'deletequeue-reviewdeletediscuss-tab' => 'Tornar veire la supression',
	'deletequeue-reviewdeletediscuss-title' => 'Tornar veire la discussion de la supression per « $1 »',
	'deletequeue-reviewdeletediscuss-text' => "Podètz utilizar aqueste formulari per tornar veire la discussion concernent la supression de « ''$1''».

Una [{{FULLURL:{{FULLPAGENAME}}|action=delviewvotes}} lista] dels « per » e dels « contra » es disponibla, la discussion es ela-meteissa disponibla sus [[$2]].
Asseguratz-vos qu'avètz prés una decision en conformitat amb lo consensús eissit de la discussion.",
	'deletequeue-deletediscuss-discussionpage' => "Aquò es la pagina de discussion concernent la supression de [[$1]].
I a actualament $2 {{PLURAL:$2|utilizaire|utilizaires}} en favor, e $3 {{PLURAL:$3|utilizaire|utilizaires}} qu'i son opausats.
Podètz [{{FULLURL:$1|action=delvote}} sosténer o refusar] la supression, o [{{FULLURL:$1|action=delviewvotes}} veire totes los « per » e los « contra »].",
	'deletequeue-discusscreate-summary' => 'Creacion de la discussion concernent la supression de [[$1]].',
	'deletequeue-discusscreate-text' => 'Supression prepausada per la rason seguenta : $2',
	'deletequeue-role-nominator' => 'iniciaire original de la supression',
	'deletequeue-role-vote-endorse' => 'Partidari de la supression',
	'deletequeue-role-vote-object' => 'Opausant a la supression',
	'deletequeue-vote-tab' => 'Sosténer/Refusar la supression',
	'deletequeue-vote-title' => 'Sosténer o refusar la supression de « $1 »',
	'deletequeue-vote-text' => "Podètz utilizar aqueste formulari per apiejar o refusar la supression de « '''$1''' ».
Aquesta accion espotirà los vejaires qu'avètz emeses deperabans dins aquesta discussion.
Podètz [{{FULLURL:{{FULLPAGENAME}}|action=delviewvotes}} veire] los diferents vejaires ja emeses.
Lo motiu indicat per la nominacion a la supression èra ''« $2 »''.",
	'deletequeue-vote-legend' => 'Sosténer/Refusar la supression',
	'deletequeue-vote-action' => 'Recomandacion :',
	'deletequeue-vote-endorse' => 'Sosténer la supression.',
	'deletequeue-vote-object' => 'Refusar la supression.',
	'deletequeue-vote-reason' => 'Comentaris :',
	'deletequeue-vote-submit' => 'Sometre',
	'deletequeue-vote-success-endorse' => "Avètz sostengut, amb succès, la demanda de supression d'aquesta pagina.",
	'deletequeue-vote-success-object' => "Avètz refusat, amb succès, la demanda de supression d'aquesta pagina.",
	'deletequeue-vote-requeued' => "Avètz regetat, amb succès, la demanda de supression d'aquesta pagina.
Per vòstre refús, la pagina es estada desplaçada dins la coa $1.",
	'deletequeue-showvotes' => 'Acòrdis e refuses concernent la supression de « $1 »',
	'deletequeue-showvotes-text' => "Vaquí, çaijós, los acòrdis e los desacòrdis emeses en vista de la supression de la pagina « '''$1''' ».
Podètz enregistrar [{{FULLURL:{{FULLPAGENAME}}|action=delvote}} aicí] vòstra pròpri acòrdi o desacòrdi sus aquesta supression.",
	'deletequeue-showvotes-restrict-endorse' => 'Aficha unicament los partidaris',
	'deletequeue-showvotes-restrict-object' => 'Aficha unicament los opausants',
	'deletequeue-showvotes-restrict-none' => 'Aficha totes los partidaris e opausants',
	'deletequeue-showvotes-vote-endorse' => "'''Per''' la supression lo $2 a $1",
	'deletequeue-showvotes-vote-object' => "'''Contra''' la supression lo $2 a $1",
	'deletequeue-showvotes-showingonly-endorse' => 'Veire pas que los acòrdis',
	'deletequeue-showvotes-showingonly-object' => 'Veire pas que los desacòrdis',
	'deletequeue-showvotes-none' => "Existís pas ni « per », ni « contra » per la supression d'aquesta pagina.",
	'deletequeue-showvotes-none-endorse' => "Degun s’es pas prononciat en favor de la supression d'aquesta pagina.",
	'deletequeue-showvotes-none-object' => "Degun s’es pas prononciat contra la supression d'aquesta pagina.",
	'deletequeue' => 'Coa de la supression',
	'deletequeue-list-text' => 'Aquesta pagina aficha totas las paginas que son dins lo sistèma de supression.',
	'deletequeue-list-search-legend' => 'Recercar de paginas',
	'deletequeue-list-queue' => 'Coa :',
	'deletequeue-list-status' => 'Estatut :',
	'deletequeue-list-expired' => 'Veire pas que las clausuras de las nominacions requesas.',
	'deletequeue-list-search' => 'Recercar',
	'deletequeue-list-anyqueue' => "(mai d'un)",
	'deletequeue-list-votes' => 'Lista dels vòtes',
	'deletequeue-list-votecount' => '$1 {{PLURAL:$1|acòrdi|acòrdis}}, $2 {{PLURAL:$2|refús|refuses}}',
	'deletequeue-list-header-page' => 'Pagina',
	'deletequeue-list-header-queue' => 'Coa',
	'deletequeue-list-header-votes' => 'Acòrdis e refuses',
	'deletequeue-list-header-expiry' => 'Expiracion',
	'deletequeue-list-header-discusspage' => 'Pagina de discussion',
);

/** Polish (Polski)
 * @author Jwitos
 * @author Leinad
 * @author Maikking
 */
$messages['pl'] = array(
	'deletequeue-speedy-title' => 'Oznacz „$1” do ekspresowego skasowania',
	'right-speedy-nominate' => 'Oznacz strony do ekspresowego skasowania',
	'right-speedy-review' => 'Przejrzyj strony do ekspresowego skasowania',
	'deletequeue-review-delete' => 'Usuń stronę.',
	'deletequeue-vote-reason' => 'Komentarze:',
	'deletequeue-vote-submit' => 'Zapisz',
	'deletequeue-list-search-legend' => 'Szukaj stron',
	'deletequeue-list-queue' => 'Kolejka:',
	'deletequeue-list-status' => 'Status:',
	'deletequeue-list-search' => 'Szukaj',
	'deletequeue-list-header-page' => 'Strona',
	'deletequeue-list-header-queue' => 'Kolejka',
	'deletequeue-list-header-expiry' => 'Upływa',
	'deletequeue-list-header-discusspage' => 'Strona dyskusji',
);

/** Portuguese (Português)
 * @author Malafaya
 */
$messages['pt'] = array(
	'deletequeue-speedy-title' => 'Marcar "$1" para eliminação rápida',
	'deletequeue-delnom-otherreason' => 'Outro motivo',
	'deletequeue-review-action' => 'Acção a tomar:',
	'deletequeue-review-newreason' => 'Novo motivo:',
	'deletequeue-vote-reason' => 'Comentários:',
	'deletequeue-vote-submit' => 'Submeter',
	'deletequeue-list-anyqueue' => '(qualquer)',
	'deletequeue-list-header-page' => 'Página',
);

/** Russian (Русский)
 * @author Ferrer
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'deletequeue-action-queued' => 'Удаление',
	'deletequeue-action' => 'Предложить удаление',
	'deletequeue-action-title' => 'Предложить удаление "$1"',
	'deletequeue-generic-reasons' => '* Типовые причины
  ** Вандализм
  ** Спам
  ** Поддержка
  ** Вне сферы проекта',
	'deletequeue-nom-alreadyqueued' => 'Эта страница уже находится в очереди удаления.',
	'deletequeue-speedy-title' => 'Отметить "$1" к быстрому удалению',
	'deletequeue-speedy-text' => "Вы можете использовать эту форму для пометки страницы «'''$1'''» к быстрому удалению.

Администратор рассмотрит этот запрос и, если он обоснован, удалит эту страницу.
Вам следует выбрать причину удаления из выпадающего списка, добавить любую другую существенную информацию.",
	'deletequeue-prod-title' => 'Предложить удаление «$1»',
	'deletequeue-delnom-reason' => 'Причина номинации:',
	'deletequeue-delnom-otherreason' => 'Другие причины',
	'deletequeue-delnom-extra' => 'Дополнительная информация:',
	'deletequeue-delnom-submit' => 'Подтвердить номинацию',
	'deletequeue-log-nominate' => "номинирована [[$1]] для удаления в очереди '$2'.",
	'deletequeue-log-dequeue' => "удалено [[$1]] из очереди удаления '$2'.",
	'right-speedy-nominate' => 'Номинация страниц к быстрому удалению',
	'right-prod-nominate' => 'Предложение страниц к удалению',
	'right-prod-review' => 'Просмотр неоспоренных предложений к удалению',
	'right-deletediscuss-nominate' => 'Начать обсуждение удаления',
	'right-deletediscuss-review' => 'Закрыть обсуждение удаления',
	'right-deletequeue-vote' => 'Одобрение или отклонение удаления',
	'deletequeue-queue-speedy' => 'Быстрое удаление',
	'deletequeue-queue-prod' => 'Предлагаемые удаления',
	'deletequeue-queue-deletediscuss' => 'Обсуждение удаления',
	'deletequeue-page-speedy' => "Эта страница была номинирована на быстрое удаление.
Причина для этого удаления - ''$1''.",
	'deletequeue-review-delete' => 'Удалить страницу.',
	'deletequeue-review-change' => 'Удалить эту страницу, но по другой причине.',
	'deletequeue-review-requeue' => 'Переместить эту страницу в следующую очередь:',
	'deletequeue-review-reason' => 'Комментарии:',
	'deletequeue-review-newreason' => 'Новая причина:',
	'deletequeue-review-newextra' => 'Дополнительные сведения:',
	'deletequeue-review-original' => 'Причина номинации',
	'deletequeue-review-badaction' => 'Вы указали неправильное действие',
	'deletequeue-reviewprod-tab' => 'Просмотр предлагаемых удалений',
	'deletequeue-reviewprod-title' => 'Просмотр предлагаемого удаления «$1»',
	'deletequeue-discusscreate-summary' => 'Создание обсуждения удаления [[$1]].',
	'deletequeue-discusscreate-text' => 'Удаление предлагается по следующей причине: $2',
	'deletequeue-role-nominator' => 'оригинальный номинатор к удалению',
	'deletequeue-vote-legend' => 'Одобрение/Отказ удаления',
	'deletequeue-vote-action' => 'Рекомендация:',
	'deletequeue-vote-endorse' => 'Одобрить удаление.',
	'deletequeue-vote-object' => 'Отказать в удалении.',
	'deletequeue-vote-reason' => 'Комментарии:',
	'deletequeue-vote-submit' => 'Отправить',
	'deletequeue' => 'Очередь удаления',
	'deletequeue-list-search-legend' => 'Поиск по страницам',
	'deletequeue-list-queue' => 'Очередь:',
	'deletequeue-list-status' => 'Статус:',
	'deletequeue-list-search' => 'Поиск',
	'deletequeue-list-votes' => 'Список голосований',
	'deletequeue-list-header-page' => 'Страница',
	'deletequeue-list-header-queue' => 'Очередь',
	'deletequeue-list-header-expiry' => 'Истёкшие',
	'deletequeue-list-header-discusspage' => 'Страница обсуждения',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'deletequeue-desc' => 'Vytvára systém [[Special:DeleteQueue|frontu na správu mazaní]]',
	'deletequeue-action-queued' => 'Zmazanie',
	'deletequeue-action' => 'Navrhnúť zmazanie',
	'deletequeue-action-title' => 'Navrhnúť zmazanie „$1”',
	'deletequeue-action-text' => "{{SITENAME}} má niekoľko procesov mazania stránok:
* Ak sa domnievate, že táto stránka je kandidátom na ''rýchle zmazanie'', môžete ho [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=speedy}} navrhnúť].
*Ak táto stránka nie je kandidátom na rýchle zmazanie, ale ''zmazanie bude pravdepodobne nekontroverzné'', mali by ste [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=prod}} navrhnúť jej zmazanie].
*Ak bude zmazanie tejto stránky ''pravdepodobne kontroverzné'', mali by ste o tom [{{fullurl:{{FULLPAGENAME}}|action=delnom&queue=deletediscuss}} začať diskusiu].",
	'deletequeue-action-text-queued' => 'Nasledovné stránky obsahujú informácie týkajúce sa tohto prípadu na zmazanie:
* [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} Zobraziť aktuálne odporúčania a námietky].
* [{{fullurl:{{FULLPAGENAME}}|action=delvote}} Odporučiť alebo namietnuť proti zmazaniu tejto strány].',
	'deletequeue-permissions-noedit' => 'Aby ste mohli ovplyvniť stav zmazania stránky, musíte mať oprávnenie upravovať stránku.',
	'deletequeue-generic-reasons' => '* Všeobecné dôvody
  ** Vandalizmus
  ** Spam
  ** Údržba
  ** Mimo rozsahu projektu',
	'deletequeue-nom-alreadyqueued' => 'Táto stránka sa už nachádza vo fronte na správu mazaní.',
	'deletequeue-speedy-title' => 'Označiť „$1” na rýchle zmazanie',
	'deletequeue-speedy-text' => "Tento formulár slúži na označenie stránky „'''$1'''” na rýchle zmazanie.

Správca túto požiadavku preverí a aj je podložená, stránku zmaže.
Musíte uviesť dôvod zmazania z dolu uvedeného zoznamu a poskytnúť ďalšie relevantné informácie.",
	'deletequeue-speedy-reasons' => '-',
	'deletequeue-prod-title' => 'Navrhnúť zmazanie „$1”',
	'deletequeue-prod-text' => 'Pomocou tohto formulára môžete navrhnúť zmazanie stránky „$1”.

Ak po piatich dňoch nikto nenapadne návrh na zmazanie tejto stránky, zmaže ju po konečnej kontrole správca.',
	'deletequeue-prod-reasons' => '-',
	'deletequeue-delnom-reason' => 'Dôvod návrhu:',
	'deletequeue-delnom-otherreason' => 'Iný dôvod',
	'deletequeue-delnom-extra' => 'Ďalšie informácie:',
	'deletequeue-delnom-submit' => 'Odoslať návrh',
	'deletequeue-log-nominate' => 'navrhol na zmazanie [[$1]]  vo fronte „$2”.',
	'deletequeue-log-rmspeedy' => 'zamietol rýchle zmazanie [[$1]].',
	'deletequeue-log-requeue' => 'preniesol [[$1]] do iného frontu mazaní: z „$2” do „$3”.',
	'deletequeue-log-dequeue' => 'odstránil [[$1]] z frontu mazaní „$2”.',
	'right-speedy-nominate' => 'Navrhnúť stránky na rýchle zmazanie',
	'right-speedy-review' => 'Skontrolovať návrhy na rýchle zmazanie',
	'right-prod-nominate' => 'Navrhnúť zmazanie stránky',
	'right-prod-review' => 'Skontrolovať návrhy na zmazanie bez komentárov proti',
	'right-deletediscuss-nominate' => 'Začať diskusiu o zmazaní',
	'right-deletediscuss-review' => 'Uzavrieť diskusiu o zmazaní',
	'right-deletequeue-vote' => 'Odporučiť alebo namietnuť proti zmazaniu',
	'deletequeue-queue-speedy' => 'Rýchle zmazanie',
	'deletequeue-queue-prod' => 'Navrhované zmazanie',
	'deletequeue-queue-deletediscuss' => 'Diskusia o zmazaní',
	'deletequeue-page-speedy' => "Táto stránka bola navrhnutá na rýchle zmazanie.
Ako dôvod návrhu bolo uvedené ''$1''.",
	'deletequeue-page-prod' => "Bolo navrhnuté zmazanie tejto stránky.
Ako dôvod návrhu bolo uvedené ''$1''.
Ak nebude tento návrh napadnutý ''$2'', táto stránka bude zmazaná.
Návrh môžete napadnúť [{{fullurl:{{FULLPAGENAME}}|action=delvote}} námietkou proti zmazaniu].",
	'deletequeue-page-deletediscuss' => "Bolo navrhnuté zmazanie tejto stránky a tento návrh bol napadnutý.
Ako dôvod bolo uvedené ''$1''.
Na [[$3]] prebieha diskusia, ktorá skončí ''$2''.",
	'deletequeue-notqueued' => 'Stránka, ktorú ste vybrali, momentálne nie je vo fronte na zmazanie',
	'deletequeue-review-action' => 'Vykonať operáciu:',
	'deletequeue-review-delete' => 'Zmazať stránku.',
	'deletequeue-review-change' => 'Zmazať stránku, ale s iným zdôvodnením.',
	'deletequeue-review-requeue' => 'Preniesť túto stránku do iného frontu:',
	'deletequeue-review-dequeue' => 'Nrobiť nič a odstrániť stránku z frontu na zmazanie.',
	'deletequeue-review-reason' => 'Komentáre:',
	'deletequeue-review-newreason' => 'Nový dôvod:',
	'deletequeue-review-newextra' => 'Ďalšie informácie:',
	'deletequeue-review-submit' => 'Uložiť kontrolu',
	'deletequeue-review-original' => 'Dôvod návrhu',
	'deletequeue-actiondisabled-involved' => 'Nasledovná činnosť je vypnutá, pretože ste sa podieľali na tomto prípade zmazania v úlohách $1:',
	'deletequeue-actiondisabled-notexpired' => 'Nasledovná činnosť je vypnutá, pretože zatiaľ nevypršal návrh na zmazanie:',
	'deletequeue-review-badaction' => 'Zadali ste neplatnú operáciu',
	'deletequeue-review-actiondenied' => 'Zadali ste operáciu, ktorá je pre túto stránku vypnutá',
	'deletequeue-review-objections' => "'''Upozornenie''': Existujú [{{fullurl:{{FULLPAGENAME}}|action=delvoteview&votetype=object}} námietky] proti zmazaniu tejto stránky.
Prosím, uistite sa, že ste tieto námietky zvážili, než sa rozhodnete stránku zmazať.",
	'deletequeue-reviewspeedy-tab' => 'Skontrolovať rýchle zmazanie',
	'deletequeue-reviewspeedy-title' => 'Skontrolovať návrh na rýchle zmazanie „$1”',
	'deletequeue-reviewspeedy-text' => "Tento formulár môžete použiť na kontrolu návrhu stránky „'''$1'''” na rýchle zmazanie.
Prosím, uistite sa, že je možné túto stránku rýchlo zmazať v súlade s pravidlami.",
	'deletequeue-reviewprod-tab' => 'Skontrolovať návrh na zmazanie',
	'deletequeue-reviewprod-title' => 'Skontrolovať návrh na zmazanie „$1”',
	'deletequeue-reviewprod-text' => "Tento formulár môžete použiť na kontrolu nenapadnutého návrhu stránky „'''$1'''” na zmazanie.",
	'deletequeue-reviewdeletediscuss-tab' => 'Skontrolovať zmazanie',
	'deletequeue-reviewdeletediscuss-title' => 'Skontrolovať diskusiu o zmazaní „$1”',
	'deletequeue-reviewdeletediscuss-text' => "Tento formulár môžete použiť na kontrolu diskusie o zmazaní stránky „'''$1'''”.

Existuje [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} zoznam] podporení zmazania a námietok proti zmazaniu tejto stránky a samotnú diskusiu nájdete na [[$2]].
Prosím, uistite sa, že sa rozhodnete v súlade s konsenzom v diskusii.",
	'deletequeue-deletediscuss-discussionpage' => 'Toto je diskusná stránka o zmazaní stránky [[$1]].
Momentálne {{PLURAL:$2|existuje $2 používateľ|existujú $2 používatelia|existuje $2 používateľov}} podporujúcich zmazanie a {{PLURAL:$3|$3 používateľ|$3 používatelia|$3 používateľov}} namietajúcich proti zmazaniu.
Môžete [{{fullurl:$1|action=delvote}} podporiť alebo namietať proti] zmazaniu alebo [{{fullurl:$1|action=delviewvotes}} si pozrieť všetky podporujúce a namietajúce príspevky].',
	'deletequeue-discusscreate-summary' => 'Vytvára sa diskusia o zmazaní stránky [[$1]].',
	'deletequeue-discusscreate-text' => 'Zmazanie bolo navrhnuté z nasledovného dôvodu: $2',
	'deletequeue-role-nominator' => 'pôvodný navrhovateľ zmazania',
	'deletequeue-role-vote-endorse' => 'podporujúci zmazanie',
	'deletequeue-role-vote-object' => 'namietajúci proti zmazaniu',
	'deletequeue-vote-tab' => 'Podporiť/namietať proti zmazaniu',
	'deletequeue-vote-title' => 'Podporiť alebo namietať proti zmazaniu stránky „$1”',
	'deletequeue-vote-text' => "Tento formulár môžete použiť na podporenie alebo namietnutie proti návrhu na zmazanie stránky „'''$1'''”.
Táto činnosť bude mať prednosť pred všetkými podporeniami/námietkami, ktoré ste už mohli k zmazaniu tejto stránky uviesť.
Môžete [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} si pozrieť] zoznam podporení zmazania a námietok proti zmazaniu tejto stránky.

Ako dôvod návrhu na zmazanie bolo uvedené: ''$2''.",
	'deletequeue-vote-legend' => 'Podporiť/namietať proti zmazaniu',
	'deletequeue-vote-action' => 'Odporúčanie:',
	'deletequeue-vote-endorse' => 'Podporiť zmazanie.',
	'deletequeue-vote-object' => 'Namietať proti zmazaniu.',
	'deletequeue-vote-reason' => 'Komentáre:',
	'deletequeue-vote-submit' => 'Odoslať',
	'deletequeue-vote-success-endorse' => 'Úspešne ste podporili zmazanie tejto stránky.',
	'deletequeue-vote-success-object' => 'Úspešne ste podali námietku proti zmazaniu tejto stránky.',
	'deletequeue-vote-requeued' => 'Úspešne ste podali námietku proti zmazaniu tejto stránky.
Vďaka vašej námietke bola táto stránka presunutá do frontu $1.',
	'deletequeue-showvotes' => 'Podpora a námietky prosti zmazaniu stránky „$1”',
	'deletequeue-showvotes-text' => "Tu sa nachádza podpora a námietky prosti zmazaniu stránky „'''$1'''”.
Môžete [{{fullurl:{{FULLPAGENAME}}|action=delvote}} pridať] svoju vlastnú podporu alebo námietku proti zmazaniu.",
	'deletequeue-showvotes-restrict-endorse' => 'Zobraziť iba podporu',
	'deletequeue-showvotes-restrict-object' => 'Zobraziť iba námietky',
	'deletequeue-showvotes-restrict-none' => 'Zobraziť všetky podporu a námietky',
	'deletequeue-showvotes-vote-endorse' => "'''Podporil''' zmazanie $1 $2",
	'deletequeue-showvotes-vote-object' => "'''Namietal proti''' zmazaniu $1 $2",
	'deletequeue-showvotes-showingonly-endorse' => 'Zobrazuje sa iba podpora',
	'deletequeue-showvotes-showingonly-object' => 'Zobrazujú sa iba námietky',
	'deletequeue-showvotes-none' => 'Neexistuje podpora ani námietky proti zmazaniu tejto stránky.',
	'deletequeue-showvotes-none-endorse' => 'Neexistuje podpora zmazania tejto stránky.',
	'deletequeue-showvotes-none-object' => 'Neexistujú námietky proti zmazaniu tejto stránky.',
	'deletequeue' => 'Front mazaní',
	'deletequeue-list-text' => 'Táto stránka obsahuje zoznam všetkých stránok v systéme mazania.',
	'deletequeue-list-search-legend' => 'Hľadať stránky',
	'deletequeue-list-queue' => 'Front:',
	'deletequeue-list-status' => 'Stav:',
	'deletequeue-list-expired' => 'Zobraziť iba návrhy čakajúce na uzavretie.',
	'deletequeue-list-search' => 'Hľadať',
	'deletequeue-list-anyqueue' => '(všetky)',
	'deletequeue-list-votes' => 'Zoznam hlasov',
	'deletequeue-list-votecount' => '$1 {{PLURAL:$1|podporenie|podporenia|podporení}}, $2 {{PLURAL:$2|námietka|námietky|námietok}}',
	'deletequeue-list-header-page' => 'Stránka',
	'deletequeue-list-header-queue' => 'Front',
	'deletequeue-list-header-votes' => 'Podpora a námietky',
	'deletequeue-list-header-expiry' => 'Vyprší',
	'deletequeue-list-header-discusspage' => 'Diskusná stránka',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'deletequeue-reviewdeletediscuss-tab' => 'Läskenge wröigje',
	'deletequeue-reviewdeletediscuss-title' => 'Läskdiskussion foar „$1“ wröigje',
	'deletequeue-reviewdeletediscuss-text' => "Ap disse Siede koast du ju Läskdiskussion fon „'''$1'''“ wröigje.

Dät rakt  ne [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} Lieste] mäd Stimmen foar un juun ju Läskenge; ju eegentelke Diskussion is unner [[$2]] tou fienden.
Oachtje deerap, dät ne Äntscheedenge mäd dän Konsens fon ju Diskussion fereenboar is.",
	'deletequeue-deletediscuss-discussionpage' => 'Dit is ju Diskussionssiede foar ju Läskenge fon [[$1]].
Apstuuns {{PLURAL:$2|unnerstutset aan Benutser|unnerstutsje $2 Benutsere}} ju Läskenge, wülst $3 {{PLURAL:$3|Benutser|Benutsere}} hier ouliene.
Du koast ju Läskenge [{{fullurl:$1|action=delvote}} unnerstutsje of ouliene] of [{{fullurl:$1|action=delviewvotes}} aal Stimme bekiekje].',
	'deletequeue-discusscreate-summary' => 'Läskdiskussion foar [[$1]] wäd moaked.',
	'deletequeue-discusscreate-text' => 'Ju Läskenge wuud uut foulgjenden Gruund foarsloain: $2',
	'deletequeue-role-nominator' => 'uursproangelken Läskandraachstaaler',
	'deletequeue-role-vote-endorse' => 'Unnerstutser fon ju Läskenge',
	'deletequeue-role-vote-object' => 'Juun de Läskenge',
	'deletequeue-vote-title' => 'Läskenge fon „$1“ unnerstutsje of ouliene',
	'deletequeue-vote-text' => "Ap disse Siede koast du ju Läskenge fon „'''$1'''“ unnerstutsje of ouliene.
Disse Aktion uurschrift aal Stimmen, do du foartied tou ju Läskenge fon disse Siede ouroat hääst.
Du koast do al ouroate Stimmen [{{fullurl:{{FULLPAGENAME}}|action=delviewvotes}} bekiekje].
Die Läskandraachsgruund waas ''$2''.",
	'deletequeue-vote-legend' => 'Läskenge unnerstutsje/ouliene',
	'deletequeue-vote-action' => 'Ämpfeelenge:',
	'deletequeue-vote-endorse' => 'Läskenge unnerstutsje.',
	'deletequeue-vote-object' => 'Läskenge ouliene.',
	'deletequeue-vote-reason' => 'Kommentoare:',
	'deletequeue-vote-submit' => 'Ouseende',
	'deletequeue-vote-success-endorse' => 'Du hääst mäd Ärfoulch ju Läskenge fon disse Siede unnerstutsed.',
	'deletequeue-vote-success-object' => 'Du hääst mäd Ärfoulch ju Läskenge fon disse Siede ouliend.',
	'deletequeue-vote-requeued' => 'Du hääst mäd Ärfoulch ju Läskenge fon disse Siede ouliend.
Truch dien Wierspruch wuud ju Siede in ju Läsk-Täiweslange $1 ferschäuwen.',
	'deletequeue-showvotes' => 'Unnerstutsengen un Oulienengen fon ju Läskenge fon „$1“',
	'deletequeue-showvotes-text' => "Unnerstoundend sunt do Unnerstutsengen un Oulienengen fon ju Läskenge fon „'''$1'''“ .
Du koast dien oaine Unnerstutsenge of Oulienenge fon ju Läskenge [{{fullurl:{{FULLPAGENAME}}|action=delvote}} hier] iendreege.",
	'deletequeue-showvotes-restrict-object' => 'Bloot Oulienengen ounwiese',
	'deletequeue-showvotes-restrict-none' => 'Aal Unnerstutsengen un Oulienengen ounwiese',
	'deletequeue-showvotes-vote-endorse' => "Läskenge uum $1 $2 '''unnerstutsed'''",
	'deletequeue-showvotes-vote-object' => "Läskenge uum $1 $2 '''ouliend'''",
	'deletequeue-showvotes-showingonly-endorse' => 'Bloot Unnerstutsengen wuuden ounwiesd',
	'deletequeue-showvotes-showingonly-object' => 'Bloot Oulienengen wuuden ounwiesd',
	'deletequeue-showvotes-none' => 'Dät rakt neen Unnerstutsengen of Oulienengen fon ju Läskenge fon disse Siede.',
	'deletequeue-showvotes-none-endorse' => 'Dät rakt neen Unnerstutsengen fon ju Läskenge fon disse Siede.',
	'deletequeue-showvotes-none-object' => 'Dät rakt neen Oulienengen fon ju Läskenge fon disse Siede.',
	'deletequeue' => 'Läsk-Täiweslange',
	'deletequeue-list-text' => 'Disse Siede wiest aal Sieden an, do sik in dät Läsksystem befiende.',
	'deletequeue-list-search-legend' => 'Säik ätter Sieden',
	'deletequeue-list-queue' => 'Täiweslange:',
	'deletequeue-list-status' => 'Stoatus:',
	'deletequeue-list-expired' => 'Wies bloot tou sluutende Läskandraage',
	'deletequeue-list-search' => 'Säik',
	'deletequeue-list-anyqueue' => '(irgendeen)',
	'deletequeue-list-votes' => 'Stimmenlieste',
	'deletequeue-list-votecount' => '$1 {{PLURAL:$1|Unnerstutsenge|Unnerstutsengen}}, $2 {{PLURAL:$2|Oulienenge|Oulienengen}}',
	'deletequeue-list-header-page' => 'Siede',
	'deletequeue-list-header-queue' => 'Täiweslange',
	'deletequeue-list-header-votes' => 'Unnerstutsengen un Oulienengen',
	'deletequeue-list-header-expiry' => 'Ouloopdoatum',
	'deletequeue-list-header-discusspage' => 'Diskussionssiede',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author Leo Johannes
 * @author M.M.S.
 * @author Najami
 * @author StefanB
 */
$messages['sv'] = array(
	'deletequeue-desc' => 'Skapar en [[Special:DeleteQueue|köbaserat system för att hantera raderingar]]',
	'deletequeue-action-queued' => 'Radering',
	'deletequeue-action' => 'Föreslå radering',
	'deletequeue-action-title' => 'Föreslå radering av "$1"',
	'deletequeue-permissions-noedit' => 'Du måste kunna redigera en sida för att kunna påverka dess raderingsstatus.',
	'deletequeue-generic-reasons' => '* Vanliga anledningar
  ** Vandalisering
  ** Spam
  ** Underhåll
  ** Inte relevant för projektet',
	'deletequeue-nom-alreadyqueued' => 'Den här sidan ligger redan i raderingskön.',
	'deletequeue-speedy-title' => 'Märk "$1" för snabbradering',
	'deletequeue-speedy-text' => "Du kan använda det här formuläret för att märka sidan \"'''\$1'''\" för snabbradering.

En administratör kommer granska begäran, och om den är rimlig, radera sidan.
Du måste ange en anledning från listan nedan, och lägga till annan relevant information.",
	'deletequeue-prod-title' => 'Föreslå radering av "$1"',
	'deletequeue-prod-text' => "Du kan använda det här formuläret för att föreslå att \"'''\$1'''\" raderas.

Om ingen har några motsättningar mot raderingen inom fem dagar, kommer raderingen granskas av en administratör.",
	'deletequeue-delnom-reason' => 'Anledning till nominering:',
	'deletequeue-delnom-otherreason' => 'Annan anledning',
	'deletequeue-delnom-extra' => 'Extrainformation:',
	'deletequeue-delnom-submit' => 'Nominera',
	'deletequeue-queue-speedy' => 'Snabbradering',
	'deletequeue-queue-prod' => 'Föreslagen radering',
	'deletequeue-queue-deletediscuss' => 'Raderingsdiskussion',
	'deletequeue-page-speedy' => "Denna sida har nominerats för snabbradering.
Anledningen som givits för denna radering är ''$1''.",
	'deletequeue-review-delete' => 'Radera sidan.',
	'deletequeue-review-reason' => 'Kommentarer:',
	'deletequeue-review-newreason' => 'Ny anledning:',
	'deletequeue-review-newextra' => 'Extrainformation:',
	'deletequeue-discusscreate-text' => 'Radering föreslagen på grund av följande anledning: $2 \'\'\'[[User:M.M.S.|<span style="color:red;">M.</span>]][[User_talk:M.M.S.|<span style="color:green;">M.</span>]][[Special:Contributions/M.M.S.|<span style="color:blue;">S.</span>]]\'\'\' 19:22, 16 August 2008 (UTC)',
	'deletequeue-vote-reason' => 'Kommentarer:',
	'deletequeue-vote-submit' => 'Skicka',
	'deletequeue' => 'Raderingskö',
	'deletequeue-list-search-legend' => 'Sök efter sidor',
	'deletequeue-list-queue' => 'Kö:',
	'deletequeue-list-status' => 'Status:',
	'deletequeue-list-search' => 'Sök',
	'deletequeue-list-anyqueue' => '(någon)',
	'deletequeue-list-votes' => 'Lista över röster',
	'deletequeue-list-header-page' => 'Sida',
	'deletequeue-list-header-queue' => 'Kö',
	'deletequeue-list-header-expiry' => 'Utgår',
	'deletequeue-list-header-discusspage' => 'Diskussionssida',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'deletequeue-delnom-otherreason' => 'ఇతర కారణం',
	'deletequeue-review-reason' => 'వ్యాఖ్యలు:',
	'deletequeue-review-newreason' => 'కొత్త కారణం:',
	'deletequeue-review-newextra' => 'అదనపు సమాచారం:',
	'deletequeue-vote-reason' => 'వ్యాఖ్యలు:',
	'deletequeue-list-status' => 'స్థితి:',
	'deletequeue-list-header-page' => 'పేజీ',
);

/** Thai (ไทย)
 * @author Octahedron80
 */
$messages['th'] = array(
	'deletequeue-list-search' => 'ค้นหา',
);

/** Turkish (Türkçe)
 * @author Mach
 */
$messages['tr'] = array(
	'deletequeue-queue-speedy' => 'Hızlı silme',
	'deletequeue-queue-deletediscuss' => 'Silme tartışması',
	'deletequeue-review-newreason' => 'Yeni gerekçe:',
	'deletequeue-list-header-page' => 'Sayfa',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'deletequeue-desc' => 'Tạo [[Special:DeleteQueue|hệ thống hàng đợi xóa]]',
	'deletequeue-action' => 'Đề nghị xóa',
	'deletequeue-action-title' => 'Đề nghị xóa “$1”',
	'deletequeue-prod-title' => 'Đề nghị xóa “$1”',
	'deletequeue-delnom-reason' => 'Lý do đề nghị',
	'deletequeue-delnom-otherreason' => 'Lý do khác',
	'deletequeue-delnom-extra' => 'Bổ sung:',
	'deletequeue-delnom-submit' => 'Đề nghị',
	'deletequeue-log-nominate' => 'đã đề nghị xóa [[$1]] trong hàng “$2”.',
	'deletequeue-log-rmspeedy' => 'từ chối xóa nhanh [[$1]].',
	'deletequeue-log-requeue' => 'chuyển [[$1]] qua hàng đợi xóa khác, từ “$2” đến “$3”.',
	'deletequeue-log-dequeue' => 'dời [[$1]] khỏi hàng đợi xóa “$2”.',
	'right-speedy-nominate' => 'Đề nghị xóa nhanh trang',
	'right-speedy-review' => 'Duyệt các trang chờ xóa nhanh',
	'right-prod-nominate' => 'Đề nghị xóa trang',
	'right-prod-review' => 'Duyệt trang chờ xóa',
	'right-deletediscuss-nominate' => 'Bắt đầu thảo luận về trang chờ xóa',
	'right-deletediscuss-review' => 'Kết thúc thảo luận về trang chờ xóa',
	'deletequeue-queue-speedy' => 'Xóa nhanh',
	'deletequeue-queue-prod' => 'Đề nghị xóa',
	'deletequeue-queue-deletediscuss' => 'Thảo luận về trang chờ xóa',
	'deletequeue-review-delete' => 'Xóa trang này.',
	'deletequeue-review-change' => 'Xóa trang này nhưng vì lý do khác.',
	'deletequeue-review-requeue' => 'Chuyển trang này qua hàng sau:',
	'deletequeue-review-dequeue' => 'Không làm gì và dời trang khỏi hàng đợi xóa.',
	'deletequeue-review-reason' => 'Ghi chú:',
	'deletequeue-review-newreason' => 'Lý do mới:',
	'deletequeue-review-newextra' => 'Bổ sung:',
	'deletequeue-review-submit' => 'Lưu thông tin',
	'deletequeue-review-original' => 'Lý do đề nghị',
	'deletequeue-reviewspeedy-tab' => 'Duyệt đề nghị xóa nhanh',
	'deletequeue-reviewspeedy-title' => 'Duyệt đề nghị xóa nhanh “$1”',
	'deletequeue-reviewprod-tab' => 'Duyệt đề nghị xóa',
	'deletequeue-reviewprod-title' => 'Duyệt đề nghị xóa “$1”',
	'deletequeue-reviewdeletediscuss-tab' => 'Duyệt đề nghị xóa',
	'deletequeue-reviewdeletediscuss-title' => 'Duyệt thảo luận về việc xóa “$1”',
	'deletequeue-discusscreate-summary' => 'Đang tạo trang thảo luận về việc xóa [[$1]].',
	'deletequeue-discusscreate-text' => 'Trang bị đề nghị xóa vì lý do sau: $2',
	'deletequeue-role-nominator' => 'người đầu tiên đề nghị xóa',
	'deletequeue-role-vote-endorse' => 'người ủng hộ việc xóa',
	'deletequeue-role-vote-object' => 'người phản đối việc xóa',
	'deletequeue-vote-tab' => 'Ủng hộ/phản đối xóa',
	'deletequeue-vote-title' => 'Ủng hộ hay phản đối việc xóa “$1”',
	'deletequeue-vote-legend' => 'Ủng hộ/phản đối xóa',
	'deletequeue-vote-action' => 'Lựa chọn:',
	'deletequeue-vote-endorse' => 'Ủng hộ việc xóa.',
	'deletequeue-vote-object' => 'Phản đối việc xóa.',
	'deletequeue-vote-reason' => 'Ghi chú:',
	'deletequeue-vote-submit' => 'Bỏ phiếu',
	'deletequeue-showvotes-vote-endorse' => "'''Ủng hộ''' xóa $1 $2",
	'deletequeue-showvotes-vote-object' => "'''Phản đối''' xóa $1 $2",
	'deletequeue' => 'Hàng đợi xóa',
	'deletequeue-list-text' => 'Trang này liệt kê các trang đang chờ xóa.',
	'deletequeue-list-search-legend' => 'Tìm kiếm trang',
	'deletequeue-list-queue' => 'Hàng:',
	'deletequeue-list-status' => 'Tình trạng:',
	'deletequeue-list-search' => 'Tìm kiếm',
	'deletequeue-list-anyqueue' => '(tất cả)',
	'deletequeue-list-votes' => 'Danh sách lá phiếu',
	'deletequeue-list-votecount' => '$1 phiếu ủng hộ, $2 phiếu phản đối',
	'deletequeue-list-header-page' => 'Trang',
	'deletequeue-list-header-queue' => 'Hàng',
	'deletequeue-list-header-votes' => 'Số phiếu',
	'deletequeue-list-header-expiry' => 'Thời hạn',
	'deletequeue-list-header-discusspage' => 'Trang thảo luận',
);

