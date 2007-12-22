<?php
/** Persian (فارسی)
 * @author Huji
 * @author Siebrand
 */
$messages = array(
	'editor'                      => 'ویرایشگر',
	'group-editor'                => 'ویرایشگران',
	'group-editor-member'         => 'ویرایشگر',
	'grouppage-editor'            => '{{ns:project}}:ویرایشگر',
	'reviewer'                    => 'مرورگر',
	'group-reviewer'              => 'مرورگران',
	'group-reviewer-member'       => 'مرورگر',
	'grouppage-reviewer'          => '{{ns:project}}:مرورگر',
	'revreview-current'           => 'پیش‌نویس',
	'tooltip-ca-current'          => 'مشاهده پیش‌نویس فعلی این صفحه',
	'revreview-edit'              => 'ویرایش پیش‌نویس',
	'revreview-source'            => 'منبع پیش‌نویس',
	'revreview-stable'            => 'پایدار',
	'tooltip-ca-stable'           => 'مشاهده نسخه پایدار این صفحه',
	'revreview-oldrating'         => 'نمره داده شده:',
	'revreview-noflagged'         => 'نسخهٔ مرورشده‌ای از این صفحه وجود ندارد، احتمالاً به این دلیل که ای صفحه از نظر کیفیت بررسی
[[{{MediaWiki:Validationpage}}|نشده‌است]].',
	'stabilization-tab'           => '(کک)',
	'tooltip-ca-default'          => 'تنظیمات کنترل کیفیت',
	'revreview-quick-none'        => "'''فعلی'''. فاقد نسخه مرورشده",
	'revreview-quick-see-quality' => "'''فعلی'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} مشاهده نسخه پایدار]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{plural:$2|تغییر|تغییر}}])",
	'revreview-quick-see-basic'   => "'''فعلی'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} مشاهده نسخه پایدار]] 
($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{plural:$2|تغییر|تغییر}}])",
	'revreview-quick-basic'       => "'''[[{{MediaWiki:Validationpage}}|بررسی‌شده]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} مشاهده نسخه فعلی]] 
	($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{plural:$2|تغییر|تغییر}}])",
	'revreview-quick-quality'     => "'''[[{{MediaWiki:Validationpage}}|با کیفیت]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} مشاهده نسخه فعلی]] 
	($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{plural:$2|تغییر|تغییر}}])",
	'revreview-newest-basic'      => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخرین نسخه بررسی‌شده] 
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} فهرست کامل]) در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است].
	 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} $3 {{plural:$3|تغییر|تغییر}}] نیازمند بررسی {{plural:$3|است|هستند}}.',
	'revreview-newest-quality'    => '[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} آخرین نسخه باکیفیت] 
	([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} فهرست کامل]) در <i>$2</i> [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است].
[{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} $3 {{plural:$3|تغییر|تغییر}}] نیازمند بررسی {{plural:$3|است|هستند}}.',
	'revreview-basic'             => 'این آخرین نسخه [[{{MediaWiki:Validationpage}}|بررسی‌ شده]] است که در <i>$2</i> 
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش‌نویس] 
	قابل [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} ویرایش] است؛ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} $3 {{plural:$3|تغییر|تغییر}}] 
نیازمند بررسی {{plural:$3|است|هستند}}.',
	'revreview-quality'           => 'این آخرین نسخه [[{{MediaWiki:Validationpage}}|باکیفیت]] است که در <i>$2</i> 
	[{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} تائید شده‌است]. [{{fullurl:{{FULLPAGENAMEE}}|stable=0}} پیش‌نویس] 
	قابل [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} ویرایش] است؛ [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} $3 {{plural:$3|تغییر|تغییر}}] 
	نیازمند بررسی {{plural:$3|است|هستند}}.',
	'revreview-static'            => "این یک نسخه [[{{MediaWiki:Validationpage}}|بررسی شده]] از  '''[[:$3|$3]]''' است، که در <i>$2</i>  
	[{{fullurl:Special:Log/review|page=$1}} تائید شده‌است].",
	'revreview-note'              => '[[User:$1]] این توضیحات را ضمن [[{{MediaWiki:Validationpage}}|بررسی]] این نسخه ثبت کرد:',
	'revreview-update'            => 'لطفاً تمام تغییراتی که از آخرین نسخه پایدار صورت گرفته را بررسی کنید. برخی الگوها/تصویرها تغییر یافته‌اند:',
	'revreview-update-none'       => 'لطفاً تمام تغییراتی که پس از آخرین نسخه پایدار اعمال شده‌اند را بررسی کنید.',
	'revreview-auto'              => '(خودکار)',
	'revreview-auto-w'            => "شما در حال ویرایش نسخه پایدار هستید و تغییرات شما '''به طور خودکار بررسی خواهند شد'''. ممکن است مایل باشید قبل از ذخیره کردن صحفه پیش‌نمایش آن را ببینید.",
	'revreview-auto-w-old'        => "شما در حال ویرایش یک نسخه قدیمی هستید و تغییرات شما '''به طور خودکار بررسی خواهند شد'''. ممکن است مایل باشید قبل از ذخیره کردن صحفه پیش‌نمایش آن را ببینید.",
	'hist-stable'                 => '[بررسی شده]',
	'hist-quality'                => '[با کیفیت]',
	'flaggedrevs'                 => 'نسخه‌های علامت‌دار',
	'review-logpage'              => 'سیاهه بررسی مقاله',
	'review-logpagetext'          => 'این سیاهه‌ای از تعییرات وضعیت [[{{MediaWiki:Validationpage}}|تائید]] نسخه‌های صفحه‌ها است.',
	'review-logentry-app'         => '[[$1]] را بررسی کرد',
	'review-logentry-dis'         => 'نسخه‌ای از [[$1]] را کم‌بها کرد',
	'review-logaction'            => 'شماره نسخه $1',
	'stable-logpage'              => 'سیاهه نسخه پایدار',
	'stable-logpagetext'          => 'این سیاهه‌ای از تنظیمات [[{{MediaWiki:Validationpage}}|نسخه پایدار]] صفحه‌ها است.',
	'stable-logentry'             => 'نسخه پایدار [[$1]] را تنظیم کرد',
	'stable-logentry2'            => 'بازنشاندن نسخه پایدار [[$1]]',
	'revisionreview'              => 'نسخه‌های بررسی',
	'revreview-main'              => 'شما باید یک نسخه خاص از یک صفحه را برگزینید تا بررسی کنید.

فهرستی از صفحه‌های بررسی نشده را در [[Special:Unreviewedpages]] می‌یابید.',
	'revreview-selected'          => "نسخه انتخابی '''$1:'''",
	'revreview-text'              => 'نسخه پایدار (و نه آخرین نسخه) هر صفحه به عنوان پیش‌فرض محتوای صفحه تنظیم شد.',
	'revreview-toolow'            => 'شما باید هر یک از موارد زیر را با درجه‌ای بیش از «تائیدنشده» علامت بزنید تا آن نسخه بررسی شده به حساب بیاید. برای بی‌بها کردن یک نسخه، تمام موارد را «تائیدنشده» علامت بزنید.',
	'revreview-flag'              => 'بررسی این نسخه (#$1)',
	'revreview-legend'            => 'نمره دادن به محتوای بررسی شده',
	'revreview-notes'             => 'مشاهدات یا ملاحظات',
	'revreview-accuracy'          => 'دقت',
	'revreview-accuracy-0'        => 'تائیدنشده',
	'revreview-accuracy-1'        => 'بررسی شده',
	'revreview-accuracy-2'        => 'دقیق',
	'revreview-accuracy-3'        => 'دارای منابع خوب',
	'revreview-accuracy-4'        => 'برگزیده',
	'revreview-depth'             => 'عمق',
	'revreview-depth-0'           => 'تائیدنشده',
	'revreview-depth-1'           => 'مقدماتی',
	'revreview-depth-2'           => 'متوسط',
	'revreview-depth-3'           => 'بالا',
	'revreview-depth-4'           => 'برگزیده',
	'revreview-style'             => 'خوانایی',
	'revreview-style-0'           => 'تائیدنشده',
	'revreview-style-1'           => 'قابل قبول',
	'revreview-style-2'           => 'خوب',
	'revreview-style-3'           => 'مختصر',
	'revreview-style-4'           => 'برگزیده',
	'revreview-log'               => 'توضیح سیاهه:',
	'revreview-submit'            => 'ثبت بررسی',
	'revreview-changed'           => "'''عمل درخواست شده را نمی‌توان روی این نسخه از صفحه انجام داد.'''

یک تصویر یا الگو درخواست شده بدون ان که نسخه خاصی تعیین شده باشد. این اتفاق می‌تواند زمانی رخ دهد که یک الگوی پویا یک الگو یا تصویر دیگر را شامل شود که به متغیری بستگی دارد که از زمانی که شما صفحه را تغییر داده‌اید تغییر کرده‌است.
بارگذاری دوباره صحفه و بررسی دوباره می‌تواند مشکل را برطرف کند.",
	'stableversions'              => 'نسخه‌های پایدار',
	'stableversions-leg1'         => 'فهرست کردن نسخه‌های بررسی شده یک صفحه',
	'stableversions-page'         => 'نام صفحه:',
	'stableversions-none'         => '"[[:$1]]" هیچ نسخه بررسی‌ شده‌ای ندارد.',
	'stableversions-list'         => 'در زیر فهرستی از نسخه‌ةای بررسی شده «[[:$1]]» را می‌بینید:',
	'stableversions-review'       => 'بررسی شده در <i>$1</i> توسط $2',
	'review-diff2stable'          => 'تفاوت با نسخه پایدار',
	'unreviewedpages'             => 'صفحه‌های بررسی نشده',
	'viewunreviewed'              => 'فهرست صفحه‌های بررسی نشده',
	'unreviewed-outdated'         => 'نمایش صفحه‌هایی که دارای نسخه‌های بررسی نشده‌ای هستند که از ویرایش نسخه پایدار حاصل شده‌اند.',
	'unreviewed-category'         => 'رده:',
	'unreviewed-diff'             => 'تغییرات',
	'unreviewed-list'             => 'این صفحه فهرستی از مقاله‌هایی را نشان می‌دهد که بررسی نشده‌اند یا دارای نسخه‌های جدید بررسی نشده‌ای هستند.',
	'revreview-visibility'        => 'این صفحه دارای یک [[{{MediaWiki:Validationpage}}|نسخه پایدار است]] که قابل 
	[{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} تنظیم] است.',
	'stabilization'               => 'پایدارسازی صفحه‌ها',
	'stabilization-text'          => 'تغییر تنظیمات زیر به منظور تعیین این که نسخه پایدار [[:$1|$1]] چگونه انتخاب و نمایش داده می‌شود.',
	'stabilization-perm'          => 'حساب شما اجازه تغییر تنظیمات نسخه پایدار را ندارد.
تنظیمات فعلی برای [[:$1|$1]] چنین هستند:',
	'stabilization-page'          => 'نام صفحه:',
	'stabilization-leg'           => 'تنظیم نسخه پایدار برای یک صفحه',
	'stabilization-select'        => 'چگونگی انتخاب نسخه پایدار',
	'stabilization-select1'       => 'آخرین نسخه با کیفیت، یا در صورت عدم وجود آن، آخرین نسخه بررسی شده',
	'stabilization-select2'       => 'آخرین نسخه بررسی شده',
	'stabilization-def'           => 'نسخه‌ای که در حالت پیش‌فرض نمایش داده می‌شود',
	'stabilization-def1'          => 'نسخه پایدار، یا در صورت عدم وجود، نسخه فعلی',
	'stabilization-def2'          => 'نسخه فعلی',
	'stabilization-submit'        => 'تائید',
	'stabilization-notexists'     => 'صفحه‌ای با عنوان «[[:$1|$1]]» وجود ندارد. تنظیمات ممکن نیست.',
	'stabilization-notcontent'    => 'صفحه «[[:$1|$1]]» قابل بررسی نیست. تنظیمات ممکن نیست.',
	'stabilization-comment'       => 'توضیح:',
	'stabilization-sel-short'     => 'تقدم',
	'stabilization-sel-short-0'   => 'با کیفیت',
	'stabilization-sel-short-1'   => 'هیچ',
	'stabilization-def-short'     => 'پیش‌فرض',
	'stabilization-def-short-0'   => 'فعلی',
	'stabilization-def-short-1'   => 'پایدار',
	'reviewedpages'               => 'صفحه‌های بررسی شده',
	'reviewedpages-leg'           => 'نمایش صفحه‌هایی که تا حد خاصی بررسی شده‌اند',
	'reviewedpages-list'          => 'صفحه‌های زیر تا حد تعیین شده مورد بررسی قرار گرفته‌اند',
	'reviewedpages-none'          => 'صفحه‌ای در این فهرست نیست',
	'reviewedpages-lev-0'         => 'بررسی شده',
	'reviewedpages-lev-1'         => 'با کیفیت',
	'reviewedpages-lev-2'         => 'برگزیده',
	'reviewedpages-all'           => 'نسخه‌های بررسی شده',
	'reviewedpages-best'          => 'آخرین نسخه با بالاترین نمره',
);
