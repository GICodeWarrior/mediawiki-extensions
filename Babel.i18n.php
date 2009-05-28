<?php

/**
 * Internationalisation file for Babel extension.
 *
 * @addtogroup Extensions
*/

$messages = array();

/** English
 * @author Siebrand
 */
$messages['en'] = array(
	'babel'      => 'Babel user information',
	'babel-desc' => 'Adds the <tt>#babel</tt> parser function to allow automated generation of a babel userbox column with the ability to include custom templates',
	'babel-url'  => 'Project:Babel',

	'babel-autocreate-abort'       => 'The username you specified is used for [[$1|Babel]] category auto-creation and cannot be registered.', // $1 is babel-url
	'babel-autocreate-reason'      => 'Automatically creating [[$1|Babel]] category page.', // $1 is babel-url
	'babel-autocreate-text-levels' => 'Users in this category indicate they have skill level $1 for language $2.',
	'babel-autocreate-text-main'   => 'Users in this category indicate they have knowledge of language $1.',
	'babel-autocreate-user'        => 'Babel AutoCreate',

	'babel-directionality' => 'ltr', # Optional.

	'babel-0' => 'This user has [[$1|no]] knowledge of [[$2|$3]] (or understands it with considerable difficulty).',
	'babel-1' => 'This user has [[$1|basic]] knowledge of [[$2|$3]].',
	'babel-2' => 'This user has [[$1|intermediate]] knowledge of [[$2|$3]].',
	'babel-3' => 'This user has [[$1|advanced]] knowledge of [[$2|$3]].',
	'babel-4' => 'This user has [[$1|near native speaker]] knowledge of [[$2|$3]].',
	'babel-5' => 'This user has [[$1|professional]] knowledge of [[$2|$3]].',
	'babel-N' => 'This user has a [[$1|native]] understanding of [[$2|$3]].',

	'babel-0-n' => 'This user has [[$1|no]] knowledge of [[$2|English]] (or understands it with considerable difficulty).',
	'babel-1-n' => 'This user has [[$1|basic]] knowledge of [[$2|English]].',
	'babel-2-n' => 'This user has [[$1|intermediate]] knowledge of [[$2|English]].',
	'babel-3-n' => 'This user has [[$1|advanced]] knowledge of [[$2|English]].',
	'babel-4-n' => 'This user has [[$1|near native speaker]] knowledge of [[$2|English]].',
	'babel-5-n' => 'This user has [[$1|professional]] knowledge of [[$2|English]].',
	'babel-N-n' => 'This user has a [[$1|native]] understanding of [[$2|English]].',

	'babel-box-cellspacing' => '0', # Do not translate or duplicate this message to other languages.

	'babel-category-prefix' => '', # Do not translate or duplicate this message to other languages.
	'babel-category-suffix' => '', # Do not translate or duplicate this message to other languages.
	'babel-portal-prefix'   => '', # Do not translate or duplicate this message to other languages.
	'babel-portal-suffix'   => '', # Do not translate or duplicate this message to other languages.
	'babel-template-prefix' => '', # Do not translate or duplicate this message to other languages.
	'babel-template-suffix' => '', # Do not translate or duplicate this message to other languages.

	'babel-footer' => '', # Do not translate or duplicate this message to other languages.
);

/** Message documentation (Message documentation)
 * @author MinuteElectron
 * @author Purodha
 * @author Raimond Spekking
 * @author Raymond
 * @author RobertL
 * @author Siebrand
 */
$messages['qqq'] = array(
	'babel' => 'Header of Babel box. Parameter $1 is the name of the page it is used on, for GENDER support.',
	'babel-desc' => 'Short description of this extension, shown on [[Special:Version]]. Do not translate or change links.',
	'babel-url' => 'The page name at which more information about the babel system can be found. Do not translate the namespace Project:.',
	'babel-directionality' => 'Directionality of the language you are translating in (valid  values: "ltr" for left to right (default), or "rtl" for right to left).

\'\'\'Warning: Do not translate "ltr" or "rtl" into your language!\'\'\'',
	'babel-0' => '{{Babel Message Description|0}}',
	'babel-1' => '{{Babel Message Description|1}}',
	'babel-2' => '{{Babel Message Description|2}}',
	'babel-3' => '{{Babel Message Description|3}}',
	'babel-4' => '{{Babel Message Description|4}}',
	'babel-5' => '{{Babel Message Description|5}}',
	'babel-N' => '{{Babel Message Description|N}}',
	'babel-0-n' => '{{Babel Message Description|0|native=yes}}',
	'babel-1-n' => '{{Babel Message Description|1|native=yes}}',
	'babel-2-n' => '{{Babel Message Description|2|native=yes}}',
	'babel-3-n' => '{{Babel Message Description|3|native=yes}}',
	'babel-4-n' => '{{Babel Message Description|4|native=yes}}',
	'babel-5-n' => '{{Babel Message Description|5|native=yes}}',
	'babel-N-n' => '{{Babel Message Description|N|native=yes}}',
);

/** Säggssch (Säggssch)
 * @author Purodha
 */
$messages['sxu'] = array(
	'babel-url' => 'Project:Babel',
	'babel-0-n' => "Dor Benutzor hior sprischt [[$1|gorgeen]] [[$2|Sächs'sch]].",
	'babel-1-n' => "Dor Benutzor hior kann krad ma' [[$1|ä ganz kleenes bissl]] [[$2|Sächs'sch]], 's is abbor eing'sch nisch dor Rede wärt.",
	'babel-2-n' => "Dor Benutzor hior is eing'sch schonn [[$1|nisch ohne]] im [[$2|Sächs'sch]] Spräschn.",
	'babel-3-n' => "Dor Benutzor hior sprischt schonn [[$2|Sächs'sch]] [[$1|wie's beese Tior]].",
	'babel-4-n' => "Dor Benutzor hior sprischt so dolle [[$2|Sächs'sch]] [[$1|als wäror aus Sachsn]].",
	'babel-N-n' => "Dor Benutzor hior is ä rüscht'schor [[$1|Muddorsprachlor]] vom [[$2|Sächs'sch]]n.",
);

/** Kabuverdianu (Kabuverdianu)
 * @author Waldir
 */
$messages['kea'] = array(
	'babel-0' => "Kel utilizador li [[$1|ka ta entende]] [[$2|$3]] (o e' ta entendê-l ku txeu difikuldadi).",
	'babel-1' => 'Kel utilizador li, ta papia [[$2|$3]] ku un nível [[$1|báziku]].',
	'babel-2' => 'Kel utilizador li, ta papia [[$2|$3]] ku un nível [[$1|médiu]].',
	'babel-3' => 'Kel utilizador li, ta papia [[$2|$3]] ku un nível [[$1|avansadu]].',
	'babel-4' => 'Kel utilizador li, ta papia [[$2|$3]] [[$1|kuazi sima un falanti nativu]].',
	'babel-5' => 'Kel utilizador li, ta papia [[$2|$3]] ku un nível [[$1|prifisiunal]].',
	'babel-N' => 'Kel utilizador li, se língua [[$1|maternu]] e [[$2|$3]].',
	'babel-0-n' => "Kel utilizador li [[$1|ka ta entende]] [[$2|kriolu]] (o e' ta entendê-l ku txeu difikuldadi).",
	'babel-1-n' => 'Kel utilizador li, ta papia [[$2|kriolu]] ku un nível [[$1|báziku]].',
	'babel-2-n' => 'Kel utilizador li, ta papia [[$2|kriolu]] ku un nível [[$1|médiu]].',
	'babel-3-n' => 'Kel utilizador li, ta papia [[$2|kriolu]] ku un nível [[$1|avansadu]].',
	'babel-4-n' => 'Kel utilizador li, ta papia [[$2|kriolu]] [[$1|kuazi sima un falanti nativu]].',
	'babel-5-n' => 'Kel utilizador li, ta papia [[$2|kriolu]] ku un nível [[$1|prifisiunal]].',
	'babel-N-n' => 'Kel utilizador li, se língua [[$1|maternu]] e [[$2|kriolu]].',
);

/** Picard (Picard)
 * @author Geoleplubo
 * @author GerardM
 */
$messages['pcd'] = array(
	'babel' => 'informatchion dech uzeu Babel',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-text-levels' => "Ches uzeus din l'catégorie-lo, is déloufette qu'is ont un nivieu avinché $1 din l'langue $2.",
	'babel-autocreate-text-main' => "Ches uzeus din l'catégorie-lo, is déloufette qu'is bavette din l'langue $1.",
	'babel-0' => "Ech uzeu-lo, i n'bave [[$1|poin]] in [[$2|picard]]  (ou bin i parle un tiot peu in picard)",
	'babel-1' => 'Ech uzeu-lo, il o un [[$1|basique]] parlache in [[$2|picard]] .',
	'babel-2' => 'Echl uzeu-lo, il o un [[$1|mouéyin]] pérlache in [[$2|$3 - picard]] (picard).',
	'babel-3' => 'Ech uzeu-lo, il o un  parlache [[$1|avanché]] in [[$2|$3]] (picard).',
	'babel-5' => 'Echl uzeu-lo, il o un  parlache [[$1|proféchionèl]] in [[$2|$3]] (picard).',
	'babel-N' => "Pou echl'uzeu-lo, [[$2|$3]] ch'est l'langue ed ses pérints.",
	'babel-0-n' => "Ech uzeu-lo, i n'bave [[$1|poin]] in [[$2|picard]]  (ou bin i pérle un tiot peu in inglé)",
	'babel-1-n' => 'Echl uzeu-lo, il o un [[$1|basique]] pérlache in [[$2|picard]].',
	'babel-2-n' => 'Echl uzeu-lo, il o un [[$1|mouéyin]] pérlache in [[$2|picard]].',
	'babel-3-n' => 'Echl uzeu-lo, il o un  parlache [[$1|avanché]] in [[$2|picard]].',
	'babel-5-n' => 'Echl uzeu-lo, il o un  parlache [[$1|proféchionnèl]] in [[$2|picard]].',
	'babel-N-n' => "Pou echl'uzeu-lo, [[$2|picard]] ch'est [[$1|l'langue ed ses pérints]].",
);

/** Votic (Vaďďa)
 * @author 2Q
 */
$messages['vot'] = array(
	'babel' => 'Tšäüttijää tšeelesnorofka',
	'babel-desc' => 'Lissäb <tt>#babel</tt>-funkttsiaa, kumpa annab tšäüttijää luvaa tšeelisnorofka-škatulkaa lissämä.',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Tšäüttijänimi, kumpa õõd antõnnu, on zańimoitõttu [[$1|Babelii]] meelegruppaa avtomattskoi loomizõõ, sissi ed või registriiroitta sitä.',
	'babel-autocreate-reason' => '[[$1|Babelii]] meelegruppatšüľľee avtomattskoi loomin.',
	'babel-autocreate-text-levels' => 'Tšäüttijäd kassen gruppaza õmad kuulutõttu, jot nämä tunta $2 tšeelt $1 uroveńńalla.',
	'babel-autocreate-text-main' => 'Tšäüttijäd kassen gruppaza õmad kuulutõttu, jot nämä saa arvoa $1 tšeelt.',
	'babel-0' => 'Kase tšäüttijä tunnab [[$1|liika vähää vai eb eestiit]] [[$2|$3]] tšeelt.',
	'babel-1' => 'Kase tšäüttijä on [[$2|$3]] tšeelee [[$1|õppialkõja]]',
	'babel-2' => 'Kase tšäüttijä tunnab [[$2|$3]] tšeelt [[$1|tšehsimeisessi]].',
	'babel-3' => 'Kase tšäüttijä tunnab [[$2|$3]] tšeelt [[$1|esimeissi]].',
	'babel-4' => 'Kase tšäüttijä tunnab [[$2|$3]] tšeelt [[$1|bezmalo nii ku emätšeeli]].',
	'babel-5' => 'Kase tšäüttijä tunnab tarvitta [[$2|$3]] tšeelt [[$1|ammõttimeissi]].',
	'babel-N' => '[[$2|$3]] tšeeli on sene tšäüttijää [[$1|emätšeeli]].',
	'babel-0-n' => 'Kase tšäüttijä [[$1|eb tunna]] [[$2|vaďďakossi]].',
	'babel-1-n' => 'Kase tšäüttijä pajatab [[$1|vähää]] [[$2|vaďďakossi]].',
	'babel-2-n' => 'Kase tšäüttijä tunnab [[$1|tšehsimeisessi]] [[$2|vaďďakossi]].',
	'babel-3-n' => 'Kase tšäüttijä tunnab [[$1|esimeissi]] [[$2|vaďďakossi]].',
	'babel-4-n' => 'Kase tšäüttijä tunnab [[$2|vaďďakossi]] [[$1|bezmalo nii ku emätšeeli]].',
	'babel-5-n' => 'Kase tšäüttijä tunnab tarvitta [[$2|vaďďakossi]] [[$1|ammõttimeissi]].',
	'babel-N-n' => '[[$2|Vaďďa tšeeli]] on sene tšäüttijää [[$1|emätšeeli]].',
);

/** Achinese (Acèh)
 * @author Si Gam Acèh
 */
$messages['ace'] = array(
	'babel-0' => 'Nyang nguy nyoë [[$1|hana]] muphôm [[$2|$3]] (atawa cit ngön payah that).',
	'babel-N' => 'Nyang nguy nyoë nakeuh [[$1|geumarit aseuli]] lam bahsa [[$2|$3]].',
);

/** Afrikaans (Afrikaans)
 * @author Arnobarnard
 * @author Naudefj
 * @author SPQRobin
 */
$messages['af'] = array(
	'babel' => 'Babel Gebruikersinligting',
	'babel-desc' => "Voeg die <tt>#babel</tt> ontleder funksie by om outomatiese generasie van 'n babel gebruikerboksiekolom met die funksionaliteit om doelgemaakte sjablone in te voeg.",
	'babel-url' => 'Project:Babel',
	'babel-0' => 'Hierdie gebruiker het [[$1|geen]] kennis van [[$2|$3]] nie (of verstaan dit met groot moeite).',
	'babel-1' => 'Hierdie gebruiker het [[$1|basiese]] kennis van [[$2|$3]].',
	'babel-2' => 'Hierdie gebruiker het [[$1|middelbare]] kennis van [[$2|$3]].',
	'babel-3' => 'Hierdie gebruiker het [[$1|gevorderde]] kennis van [[$2|$3]].',
	'babel-4' => 'Hierdie gebruiker het kennis van [[$2|$3]] op [[$1|byna-moedertaalvlak]].',
	'babel-5' => 'Hierdie gebruiker het [[$1|professionele]] kennis van [[$2|$3]].',
	'babel-N' => 'Hierdie gebruiker het kennis van [[$2|$3]] op [[$1|moedertaalvlak]].',
	'babel-0-n' => 'Hierdie gebruiker het [[$1|geen]] kennis van [[$2|Afrikaans]] nie (of verstaan dit met groot moeite).',
	'babel-1-n' => 'Hierdie gebruiker het [[$1|basiese]] kennis van [[$2|Afrikaans]].',
	'babel-2-n' => 'Hierdie gebruiker het [[$1|middelbare]] kennis van [[$2|Afrikaans]].',
	'babel-3-n' => 'Hierdie gebruiker het [[$1|gevorderde]] kennis van [[$2|Afrikaans]].',
	'babel-4-n' => 'Hierdie gebruiker het kennis van [[$2|Afrikaans]] op [[$1|byna-moedertaalvlak]].',
	'babel-5-n' => 'Hierdie gebruiker het [[$1|professionele]] kennis van [[$2|Afrikaans]].',
	'babel-N-n' => 'Hierdie gebruiker het kennis van [[$2|Afrikaans]] op [[$1|moedertaalvlak]].',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'babel' => "Informazión d'usuario de Babel",
	'babel-desc' => "Adibe a funzión <tt>#babel</tt> de parseyo ta premitir a chenerazión automatica d'una colunna de caixas d'usuario de babel, con a posibilidat d'encluyir-ie plantillas personalizatas",
	'babel-url' => 'Project:Babel',
	'babel-0' => 'Iste usuario [[$1|no]] conoixe brenca o [[$2|$3]] (u lo entiende malament).',
	'babel-1' => 'Iste usuario conoixe o [[$2|$3]] con un libel [[$1|basico]].',
	'babel-2' => 'Iste usuario conoixe o [[$2|$3]] con un libel [[$1|meyo]].',
	'babel-3' => 'Iste usuario conoixe o [[$2|$3]] con un libel [[$1|abanzato]].',
	'babel-4' => 'Iste conoixe o [[$2|$3]] con un libel [[$1|cuasi natibo]].',
	'babel-5' => 'Iste usuario conoixe o [[$2|$3]] con un libel [[$1|profesional]].',
	'babel-N' => "Iste usuario conoixe o [[$2|$3]] con o libel d'un fablador [[$1|natibo]].",
	'babel-0-n' => "Iste usuario [[$1|no]] conoixe brenca l'[[$2|aragonés]] (u lo entiende malament)",
	'babel-1-n' => "Iste usuario conoixe l'[[$2|aragonés]] con un libel [[$1|basico]].",
	'babel-2-n' => "Iste usuario conoixe l'[[$2|aragonés]] con un libel [[$1|meyo]].",
	'babel-3-n' => "Iste usuario conoixe l'[[$2|aragonés]] con un libel [[$1|abanzato]].",
	'babel-4-n' => "Iste usuario conoixe l'[[$2|aragonés]] con un libel [[$1|cuasi natibo]].",
	'babel-5-n' => "Iste usuario conoixe l'[[$2|aragonés]] con un libel [[$1|profesional]].",
	'babel-N-n' => "Iste usuario conoixe l'[[$2|aragonés]] con o libel d'un fablador [[$1|patrimonial]].",
);

/** Old English (Anglo-Saxon)
 * @author Crazymadlover
 */
$messages['ang'] = array(
	'babel-1' => 'Þes brūcere cann forðian mid [[$1|grundlicgendre]] mǣðe [[$2|$3]].',
	'babel-2' => 'Þes brūcere cann forðian mid [[$1|middelre]] mǣðe [[$2|$3]].',
	'babel-3' => 'Þes brūcere cann forðian mid [[$1|forþweardre]] mǣðe [[$2|$3]].',
	'babel-1-n' => 'Þes brūcere cann forðian mid [[$1|grundlicgendre]] mǣðe [[$2|Englisces]].',
	'babel-2-n' => 'Þes brūcere cann forðian mid [[$1|middelre]] mǣðe [[$2|Englisces]].',
	'babel-3-n' => 'Þes brūcere cann forðian mid [[$1|forþweardre]] mǣðe [[$2|Englisces]].',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'babel' => 'معلومات بابل للمستخدم',
	'babel-desc' => 'يضيف دالة المحلل <tt>#babel</tt> للسماح بالتوليد التلقائي لعامود صندوق بابل مع إمكانية تضمين قوالب أخرى',
	'babel-url' => 'Project:بابل',
	'babel-autocreate-abort' => 'اسم المستخدم الذي حددته مستخدم للإنشاء التلقائي لتصنيفات [[$1|بابل]] ولا يمكن تسجيله.',
	'babel-autocreate-reason' => 'إنشاء صفحة تصنيف [[$1|بابل]] تلقائيا.',
	'babel-autocreate-text-levels' => 'المستخدمون في هذا التصنيف مستوى مهارتهم $1 للغة $2.',
	'babel-autocreate-text-main' => 'المستخدمون في هذا التصنيف لديهم معرفة باللغة $1.',
	'babel-autocreate-user' => 'إنشاء بابل التلقائي',
	'babel-directionality' => 'rtl',
	'babel-0' => 'هذا المستخدم [[$1|ليس]] لديه معرفة ب[[$2|$3]] (أو يفهمها بصعوبة شديدة).',
	'babel-1' => 'هذا المستخدم يمتلك معرفة [[$1|أساسية]] ب[[$2|$3]].',
	'babel-2' => 'هذا المستخدم يمتلك معرفة [[$1|متوسطة]] ب[[$2|$3]].',
	'babel-3' => 'هذا المستخدم يمتلك معرفة [[$1|متقدمة]] ب[[$2|$3]].',
	'babel-4' => 'هذا المستخدم يمتلك معرفة [[$1|تقترب من مستوى اللغة الأم]] ب[[$2|$3]].',
	'babel-5' => 'هذا المستخدم يمتلك معرفة [[$1|احترافية]] ب[[$2|$3]].',
	'babel-N' => 'هذا المستخدم يمتلك معرفة [[$1|كلغة أم]] ب[[$2|$3]].',
	'babel-0-n' => 'هذا المستخدم [[$1|ليس]] لديه معرفة ب[[$2|العربية]] (أو يفهمها بصعوبة شديدة).',
	'babel-1-n' => 'هذا المستخدم لديه معرفة [[$1|أساسية]] ب[[$2|العربية]].',
	'babel-2-n' => 'هذا المستخدم لديه معرفة [[$1|متوسطة]] ب[[$2|العربية]].',
	'babel-3-n' => 'هذا المستخدم يمتلك معرفة [[$1|متقدمة]] ب[[$2|العربية]].',
	'babel-4-n' => 'هذا المستخدم يمتلك معرفة [[$1|تقترب من مستوى اللغة الأم]] ب[[$2|العربية]].',
	'babel-5-n' => 'هذا المستخدم يمتلك معرفة [[$1|احترافية]] ب[[$2|العربية]].',
	'babel-N-n' => 'هذا المستخدم يمتلك معرفة [[$1|كلغة أم]] ب[[$2|العربية]].',
);

/** Aramaic (ܐܪܡܝܐ)
 * @author Basharh
 * @author GerardM
 */
$messages['arc'] = array(
	'babel' => 'ܝܕܥܬ̈ܐ ܕܡܦܠܚܢܐ ܕܒܒܠ',
	'babel-url' => 'Project:ܒܒܠ',
	'babel-directionality' => 'rtl',
	'babel-0' => 'ܗܢܐ ܡܦܠܚܢܐ [[$1|ܠܐ ܝܕܥ]] [[$2|$3]] (ܐܘ ܝܕܥ ܠܗ ܒܥܣܩܘܬܐ)',
	'babel-1' => 'ܗܢܐ ܡܦܠܚܢܐ ܐܝܬ ܠܗ ܝܕܥܬܐ [[$1|ܪܫܝܬܐ]] ܒ[[3$|2$]]',
	'babel-2' => 'ܗܢܐ ܡܦܠܚܢܐ ܐܝܬ ܠܗ ܝܕܥܬܐ [[$1|ܡܨܥܝܬܐ]] ܒ[[$2|$3]]',
	'babel-3' => 'ܗܢܐ ܡܦܠܚܢܐ ܐܝܬ ܠܗ ܝܕܥܬܐ [[$1|ܡܬܩܕܡܢܝܬܐ]] ܒ[[$2|$3]]',
	'babel-4' => 'ܗܢܐ ܡܦܠܚܢܐ ܐܝܬ ܠܗ ܝܕܥܬܐ [[$1|ܩܪܝܒܬܐ ܡܢ ܠܫܢܗ ܐܡܗܝܐ]] ܒ[[$2|$3]]',
	'babel-5' => 'ܗܢܐ ܡܦܠܚܢܐ ܐܝܬ ܠܗ ܝܕܥܬܐ [[$1|ܚܪܝܦܬܐ]] ܒ[[$2|$3]]',
	'babel-N' => 'ܗܢܐ ܡܦܠܚܢܐ ܐܝܬ ܠܗ ܝܕܥܬܐ ܒ[[$2|$3]] [[$1|ܐܝܟ ܠܫܢܗ ܐܡܗܝܐ]]',
	'babel-0-n' => 'ܗܢܐ ܡܦܠܚܢܐ [[$1|ܠܐ ܝܕܥ]] [[$2|$3]] (ܐܘ ܝܕܥ ܠܗ ܒܥܣܩܘܬܐ)',
	'babel-1-n' => 'ܗܢܐ ܡܦܠܚܢܐ ܐܝܬ ܠܗ ܝܕܥܬܐ [[$1|ܪܫܝܬܐ]] ܒ[[$2|ܐܪܡܝܐ]]',
	'babel-2-n' => 'ܗܢܐ ܡܦܠܚܢܐ ܐܝܬ ܠܗ ܝܕܥܬܐ [[$1|ܡܨܥܝܬܐ]] ܒ[[$2|ܐܪܡܝܐ]]',
	'babel-3-n' => 'ܗܢܐ ܡܦܠܚܢܐ ܐܝܬ ܠܗ ܝܕܥܬܐ [[$1|ܡܬܩܕܡܢܝܬܐ]] ܒ[[$2|ܐܪܡܝܐ]]',
	'babel-4-n' => 'ܗܢܐ ܡܦܠܚܢܐ ܐܝܬ ܠܗ ܝܕܥܬܐ [[$1|ܩܪܝܒܬܐ ܡܢ ܠܫܢܗ ܐܡܗܝܐ]] ܒ[[$2|ܐܪܡܝܐ]]',
	'babel-5-n' => 'ܗܢܐ ܡܦܠܚܢܐ ܐܝܬ ܠܗ ܝܕܥܬܐ [[$1|ܚܪܝܦܬܐ]] ܒ[[$2|ܐܪܡܝܐ]]',
	'babel-N-n' => 'ܗܢܐ ܡܦܠܚܢܐ ܐܝܬ ܠܗ ܝܕܥܬܐ [[$1|ܐܝܟ ܠܫܢܗ ܐܡܗܝܐ]] ܒ[[$2|ܐܪܡܝܐ]]',
);

/** Araucanian (Mapudungun)
 * @author Lin linao
 */
$messages['arn'] = array(
	'babel-0' => 'Tüfachi che [[$1|chemnorume]] [[$2|kim$3lay]].',
	'babel-1' => 'Tüfachi che [[$1|püchintu]] [[$2|kim$3y]].',
	'babel-2' => 'Tüfachi che [[$1|küme]] [[$2|kim$3y]].',
	'babel-3' => 'Tüfachi che [[$1|rume]] [[$2|kim$3y]].',
	'babel-N' => 'Tüfachi che ñi [[$1|wünen dungun]] ta [[$2|$3]].',
	'babel-0-n' => 'Tüfachi che [[$1|chemnorume]] [[$2|kimmapudungulay]].',
	'babel-1-n' => 'Tüfachi che [[$1|püchintu]] [[$2|kimmapudunguy]].',
	'babel-2-n' => 'Tüfachi che [[$1|küme]] [[$2|kimmapudunguy]].',
	'babel-3-n' => 'Tüfachi che [[$1|rume]] [[$2|kimmapudunguy]].',
	'babel-N-n' => 'Tüfachi che ñi [[$1|wünen dungun]] ta [[$2|mapudungun]].',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 */
$messages['arz'] = array(
	'babel' => 'معلومات بابل للمستخدم',
	'babel-desc' => 'يضيف دالة المحلل <tt>#babel</tt> للسماح بالتوليد التلقائى لعامود صندوق بابل مع إمكانية تضمين قوالب أخرى',
	'babel-url' => 'Project:بابل',
	'babel-autocreate-abort' => 'اسم المستخدم الذى حددته مستخدم للإنشاء التلقائى لتصنيفات [[$1|بابل]] ولا يمكن تسجيله.',
	'babel-autocreate-reason' => 'إنشاء صفحة تصنيف [[$1|بابل]] تلقائيا.',
	'babel-autocreate-text-levels' => 'المستخدمون فى هذا التصنيف مستوى مهارتهم $1 للغة $2.',
	'babel-autocreate-text-main' => 'المستخدمون فى هذا التصنيف لديهم معرفة باللغة $1.',
	'babel-directionality' => 'rtl',
	'babel-0' => 'هذا المستخدم [[$1|ليس]] لديه معرفة ب[[$2|$3]] (أو يفهمها بصعوبة شديدة).',
	'babel-1' => 'هذا المستخدم يمتلك معرفة [[$1|أساسية]] ب[[$2|$3]].',
	'babel-2' => 'هذا المستخدم يمتلك معرفة [[$1|متوسطة]] ب[[$2|$3]].',
	'babel-3' => 'هذا المستخدم يمتلك معرفة [[$1|متقدمة]] ب[[$2|$3]].',
	'babel-4' => 'هذا المستخدم يمتلك معرفة [[$1|تقترب من مستوى اللغة الأم]] ب[[$2|$3]].',
	'babel-5' => 'هذا المستخدم يمتلك معرفة [[$1|احترافية]] ب[[$2|$3]].',
	'babel-N' => 'هذا المستخدم يمتلك معرفة [[$1|كلغة أم]] ب[[$2|$3]].',
	'babel-0-n' => 'هذا المستخدم [[$1|ليس]] لديه معرفة ب[[$2|مصرى]] (أو يفهمها بصعوبة شديدة).',
	'babel-1-n' => 'هذا المستخدم لديه معرفة [[$1|أساسية]] ب[[$2|مصرى]].',
	'babel-2-n' => 'هذا المستخدم لديه معرفة [[$1|متوسطة]] ب[[$2|مصرى]].',
	'babel-3-n' => 'هذا المستخدم يمتلك معرفة [[$1|متقدمة]] ب[[$2|مصرى]].',
	'babel-4-n' => 'هذا المستخدم يمتلك معرفة [[$1|تقترب من مستوى اللغة الأم]] ب[[$2|مصرى]].',
	'babel-5-n' => 'هذا المستخدم يمتلك معرفة [[$1|احترافية]] ب[[$2|مصرى]].',
	'babel-N-n' => 'هذا المستخدم يمتلك معرفة [[$1|كلغة أم]] ب[[$2|مصرى]].',
);

/** Assamese (অসমীয়া)
 * @author Biraj
 */
$messages['as'] = array(
	'babel' => 'ব্যবহাৰকাৰীৰ বাবেল তথ্য',
	'babel-desc' => 'নিজৰ টেম্পলেটত স্বয়ংক্ৰিয় বাবেল ব্যবহাৰকাৰী বক্স যোগ কৰিবলৈ <tt>#babel</tt> পাৰ্চাৰ ফাংচন যোগ কৰক',
	'babel-url' => 'Project:বাবেল',
	'babel-autocreate-abort' => 'আপুনি উল্লেখ কৰা ব্যৱহাৰকাৰী নামটো (ইউজাৰনেম) [[$1|Babel]]ৰ স্বয়ংক্ৰিয় শ্ৰেণীকৰণ কৰিবলৈ ব্যৱহাৰ কৰা হৈছে আৰু পঞ্জীভূক্ত কৰিব পৰা নাযায় ।',
	'babel-autocreate-reason' => 'স্বয়ংক্ৰিয়ভাৱে সৃষ্টি কৰা বাবেল শ্ৰেণীৰ পৃষ্ঠা ।',
	'babel-autocreate-text-levels' => 'এই শ্ৰেণীৰ ব্যৱহাৰকাৰীৰ $2 ভাষাৰ $1 পৰ্য্যায়ৰ জ্ঞান থকা সূচায় ।',
	'babel-autocreate-text-main' => 'এই শ্ৰেণীত অন্তৰ্ভূক্ত সকলোবোৰ ব্যৱহাৰকাৰীৰে $1 ভাষাৰ জ্ঞান থকা সূচায় ।',
	'babel-0' => 'এই ব্যবহাৰকাৰীৰ [[$2|$3]]ৰ ওপৰত কোনো জ্ঞান [[$1|নাই]] (অথবা অশেষ কষ্টৰেহে বুজিব পাৰে)।',
	'babel-1' => 'এই ব্যবহাৰকাৰীৰ [[$2|$3]]ৰ ওপৰত [[$1|প্ৰাথমিক]] জ্ঞান আছে ।',
	'babel-2' => 'এই ব্যবহাৰকাৰীৰ [[$2|$3]]ৰ ওপৰত [[$1|মাধ্যমিক]] জ্ঞান আছে ।',
	'babel-3' => 'এই ব্যবহাৰকাৰীৰ [[$2|$3]]ৰ ওপৰত [[$1|ভাল]] জ্ঞান আছে ।',
	'babel-4' => 'এই ব্যবহাৰকাৰীৰ [[$2|$3]]ৰ ওপৰত [[$1|প্রায় মাতৃভাষাৰ সমকক্ষ]] জ্ঞান আছে।',
	'babel-5' => 'এই ব্যবহাৰকাৰীৰ [[$2|$3]]ৰ ওপৰত [[$1|বৃত্তিধাৰী]] জ্ঞান আছে ।',
	'babel-N' => 'এই ব্যবহাৰকাৰীৰ [[$2|$3]]ৰ ওপৰত [[$1|মাতৃভাষাৰ সমকক্ষ]] জ্ঞান আছে।',
	'babel-0-n' => 'এই ব্যবহাৰকাৰীৰ [[$2|অসমীয়া]]ৰ ওপৰত কোনো জ্ঞান [[$1|নাই]] (অথবা অশেষ কষ্টৰেহে বুজিব পাৰে)।',
	'babel-1-n' => 'এই ব্যবহাৰকাৰীৰ [[$2|অসমীয়া]]ৰ ওপৰত [[$1|প্ৰাথমিক]] জ্ঞান আছে ।',
	'babel-2-n' => 'এই ব্যবহাৰকাৰীৰ [[$2|অসমীয়া]]ৰ ওপৰত [[$1|মাধ্যমিক]] জ্ঞান আছে ।',
	'babel-3-n' => 'এই ব্যবহাৰকাৰীৰ [[$2|অসমীয়া]]ৰ ওপৰত [[$1|ভাল]] জ্ঞান আছে ।',
	'babel-4-n' => 'এই ব্যবহাৰকাৰীৰ [[$2|অসমীয়া]]ৰ ওপৰত [[$1|প্রায় মাতৃভাষাৰ সমকক্ষ]] জ্ঞান আছে।',
	'babel-5-n' => 'এই ব্যবহাৰকাৰীৰ [[$2|অসমীয়া]]ৰ ওপৰত [[$1|বৃত্তিধাৰী]] জ্ঞান আছে ।',
	'babel-N-n' => 'এই ব্যবহাৰকাৰীৰ [[$2|অসমীয়া]]ৰ ওপৰত [[$1|মাতৃভাষাৰ সমকক্ষ]] জ্ঞান আছে।',
);

/** Asturian (Asturianu)
 * @author Esbardu
 */
$messages['ast'] = array(
	'babel' => "Información babel d'usuariu",
	'babel-desc' => "Añade la función d'análisis sintáuticu <tt>#babel</tt> pa permitir la xeneración automática d'una columna userbox babel cola capacidá d'incluyir plantíes al gustu d'ún",
	'babel-url' => 'Project:Babel',
	'babel-0' => 'Esti usuariu [[$1|nun]] tien conocimientos de [[$2|$3]] (o entiéndelo con gran dificultá).',
	'babel-1' => 'Esti usuariu tien un conocimientu [[$1|básicu]] de [[$2|$3]].',
	'babel-2' => 'Esti usuariu tien un conocimientu [[$1|intermediu]] de [[$2|$3]].',
	'babel-3' => 'Esti usuariu tien un conocimientu [[$1|avanzáu]] de [[$2|$3]].',
	'babel-4' => 'Esti usuariu tien un conocimientu [[$1|cuasi nativu]] de [[$2|$3]].',
	'babel-5' => 'Esti usuariu tien un conocimientu [[$1|profesional]] de [[$2|$3]].',
	'babel-N' => 'Esti usuariu tien un conocimientu [[$1|nativu]] de [[$2|$3]].',
	'babel-0-n' => "Esti usuariu [[$1|nun]] tien conocimientos d'[[$2|asturianu]] (o entiéndelo con gran dificultá).",
	'babel-1-n' => "Esti usuariu tien un conocimientu [[$1|básicu]] d'[[$2|asturianu]].",
	'babel-2-n' => "Esti usuariu tien un conocimientu [[$1|intermediu]] d'[[$2|asturianu]].",
	'babel-3-n' => "Esti usuariu tien un conocimientu [[$1|avanzáu]] d'[[$2|asturianu]].",
	'babel-4-n' => "Esti usuariu tien un conocimientu [[$1|cuasi nativu]] d'[[$2|asturianu]].",
	'babel-5-n' => "Esti usuariu tien un conocimientu [[$1|profesional]] d'[[$2|asturianu]].",
	'babel-N-n' => "Esti usuariu ye un falante [[$1|nativu]] d'[[$2|asturianu]].",
);

/** Kotava (Kotava)
 * @author Sab
 */
$messages['avk'] = array(
	'babel' => 'Babel webesikgiva',
	'babel-desc' => 'Batcoba va <tt>#babel</tt> exulerafli loplekur ta mivaskafa gononasbara va Babel webesikborbriz do rotira va doplekura va ilkateza',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Ruidan webesikyolt joke [[$1|Babel]] mivredurafa loma zo faver nume me zo vertokar.',
	'babel-autocreate-reason' => 'Mivaskafa redura va [[$1|Babel]] lomabu.',
	'babel-autocreate-text-levels' => 'Webesik ke bata loma bazed da tid $1 ekastinaf icde $2 ava.',
	'babel-autocreate-text-main' => 'Webesik ke bata loma bazed da kan $1 ava grugoled.',
	'babel-0' => 'Bat webesik kan [[$2|$3]] [[$1|me]] grugoler (oke wavdapon gildar).',
	'babel-1' => 'Bat webesik kan [[$2|$3]] [[$1|omekon]] grugoler.',
	'babel-2' => 'Bat webesik kan [[$2|$3]] [[$1|mialukekon]] grugoler.',
	'babel-3' => 'Bat webesik kan [[$2|$3]] [[$1|ontinekon]] grugoler.',
	'babel-4' => 'Bat webesik kan [[$2|$3]] dum [[$1|nasbokavusik]] riwe grugoler.',
	'babel-5' => 'Bat webesik kan [[$2|$3]] [[$1|ebekon]] grugoler.',
	'babel-N' => 'Bat webesik kan [[$2|$3]] ton [[$1|nasbokavusik]] grugoler.',
	'babel-0-n' => 'Bat webesik kan [[$2|Kotava]] [[$1|me]] grugoler (oke wavdapon gildar).',
	'babel-1-n' => 'Bat webesik kan [[$2|Kotava]] [[$1|omekon]] grugoler.',
	'babel-2-n' => 'Bat webesik kan [[$2|Kotava]] [[$1|mialukekon]] grugoler.',
	'babel-3-n' => 'Bat webesik kan [[$2|Kotava]] [[$1|ontinekon]] grugoler.',
	'babel-4-n' => 'Bat webesik kan [[$2|Kotava]] ton [[$1|nasbokavusik]] riwe grugoler.',
	'babel-5-n' => 'Bat webesik kan [[$2|Kotava]] [[$1|ebekon]] grugoler.',
	'babel-N-n' => 'Bat webesik kan [[$2|Kotava]] ton [[$1|nasbokavusik]] grugoler.',
);

/** Aymara (Aymar aru)
 * @author Erebedhel
 */
$messages['ay'] = array(
	'babel' => "Wawil apnaqirxata uñt'ayawi",
	'babel-desc' => "<tt>#babel</tt> arthapi suk'atat uñakipawi lurt'awix yapxatiwa, mäwawil apnaqirina llatatax uñacht'arawi turkatax apantachi q'aphawimpiwa achurpayachayiti luräni.",
	'babel-url' => 'Project:Wawil',
	'babel-autocreate-abort' => "Jumaxa apnaqirina sutima [[$1|Wawil]]-na patawi uñstayarachayawi mirq'ta jani qillqr'ayasiway.",
	'babel-autocreate-reason' => '[[$1|Wawil]]-na patawi uñstawi uñstayarachayaski.',
	'babel-autocreate-text-levels' => "Patawinax apnaqiripacha $1 q'aphawi $2 arutakiwa sistu.",
	'babel-autocreate-text-main' => 'Patawinax apnaqiripacha $1 aru yatiniwa sistu.',
	'babel-0' => "Jupax apnaqiri [[$2|$3]]xa [[$1|jani]] yatiniwa (inasa ch'ama yattaniwa).",
	'babel-1' => "Jupax apnaqiri [[$2|$3]]xa [[$1|juk'a]] yatiniwa.",
	'babel-2' => 'Jupax apnaqiri [[$2|$3]]xa [[$1|chika]] yatiniwa.',
	'babel-3' => 'Jupax apnaqiri [[$2|$3]]xa [[$1|alluxa]] yatiniwa.',
	'babel-4' => 'Jupax apnaqiri [[$2|$3]]xa [[$1|niyaki yurawita]] yatiniwa.',
	'babel-5' => 'Jupax apnaqiri [[$2|$3]]xa [[$1|yatxatata]] yatiniwa.',
	'babel-N' => 'Jupax apnaqiri [[$2|$3]]xa [[$1|yurawita]] yatiniwa.',
	'babel-0-n' => "Jupax apnaqiri [[$2|aymar aru]]xa [[$1|jani]] yatiniwa (inasa ch'ama yattaniwa).",
	'babel-1-n' => "Jupax apnaqiri [[$2|aymar aru]]xa [[$1|juk'a]] yatiniwa.",
	'babel-2-n' => 'Jupax apnaqiri [[$2|aymar aru]]xa [[$1|chika]] yatiniwa.',
	'babel-3-n' => 'Jupax apnaqiri [[$2|aymar aru]]xa [[$1|alluxa]] yatiniwa.',
	'babel-4-n' => 'Jupax apnaqiri [[$2|aymar aru]]xa [[$1|niyaki yurawita]] yatiniwa.',
	'babel-5-n' => 'Jupax apnaqiri [[$2|aymar aru]]xa [[$1|yatxatata]] yatiniwa.',
	'babel-N-n' => 'Jupax apnaqiri [[$2|aymar aru]]xa [[$1|yurawita]] yatiniwa.',
);

/** Bavarian (Boarisch)
 * @author Man77
 */
$messages['bar'] = array(
	'babel' => 'Babel-Benutza-Infoamazion',
	'babel-desc' => "Eagänzt de <tt>#babel</tt>-Parserfunkzion fia'd automatische Eastellung vu Babel-Benutzaboxen-Zeun mid da Meglichkeid, dass ma eigne Voalång einbindt",
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => "Da ausgwöihte Benutzanãm wiad fia'd automatische Eastellung vu [[$1|Babel]]-Kategorien braucht. Desweng kã a ned registriad wean.",
	'babel-autocreate-reason' => 'Automatisch eastöide [[$1|Babel]]-Kategorie.',
	'babel-autocreate-text-levels' => 'Benutza in dea Kategorie hãm Kenntnisse in da Stufn $1 in da Språch $2.',
	'babel-autocreate-text-main' => 'Benutza in dea Kategorie hãm Kenntnisse vu da Språch $1.',
	'babel-0' => 'Dea Benutza kã koa [[$2|$3]] [[$1|ned]] (oda ea vastehd de Språch netta mid gscheide Schwiarichkeitn).',
	'babel-1' => 'Dea Benutza kã [[$1|a bissl]] [[$2|$3]].',
	'babel-2' => 'Dea Benutza kã [[$2|$3]] schãu [[$1|relativ guad]].',
	'babel-3' => 'Dea Benutza kã [[$1|wiakli guad]] [[$2|$3]].',
	'babel-4' => "Dea Benutza kã [[$2|$3]] [[$1|fåst so guad, wia wãun's sei Muataspråch warad]].",
	'babel-5' => 'Dea Benutza kã [[$2|$3]] [[$1|wia a Muataspråchla]].',
	'babel-N' => 'Dem Benutza sei [[$1|Muataspråch]] is [[$2|$3]].',
	'babel-0-n' => "Dea Benutza kã koa [[$2|Boarisch]] [[$1|ned]] (oda ea vasteht's netta mid gscheide Schwiarichkeitn).",
	'babel-1-n' => 'Dea Benutza kã [[$1|a bissl]] [[$2|Boarisch]].',
	'babel-2-n' => 'Dea Benutza kã schã [[$1|relativ guad]] [[$2|Boarisch]].',
	'babel-3-n' => 'Dea Benutza kã schãu [[$1|wiakli guad]] [[$2|Boarisch]].',
	'babel-4-n' => "Dea Benutza kã [[$2|Boarisch]] [[$1|schãu fåst so guad, wia wãun's sei Muataspråch warad]].",
	'babel-5-n' => 'Dea Benutza kã [[$2|Boarisch]] so guad wiar a [[$1|Muataspråchla]].',
	'babel-N-n' => "Dem Benutza sei [[$1|Muataspråch]] is s'[[$2|Boarische]].",
);

/** Southern Balochi (بلوچی مکرانی)
 * @author Mostafadaneshvar
 */
$messages['bcc'] = array(
	'babel' => 'اطلاعات کاربری بابل',
	'babel-desc' => 'اضافه کنت <tt>#babel</tt>  عملگر وانوک په اجازه داتن په یک ستون جعبه کاربری گون توانایی اضافه کتن وتی تمپلتان',
	'babel-url' => 'Project:بابل',
	'babel-directionality' => 'rtl',
	'babel-0' => 'ای کاربر [[$2|$3]] را در حد [[$1|سرپد نه بیت]] (یاپه سختی سرپد بیت).',
	'babel-1' => 'ای کاربر [[$2|$3]] را در حد [[$1|مقدماتی]] سرپد بیت.',
	'babel-2' => 'ای کاربر [[$2|$3]] را در حد [[$1|متوسط]] سرپد بیت.',
	'babel-3' => 'ای کاربر [[$2|$3]] را در حد [[$1|پیشرفته]] سرپد بیت.',
	'babel-4' => 'ای کاربر [[$2|$3]] را در حد [[$1|نزدیک په ماتی زبان]] سرپد بیت.',
	'babel-5' => 'ای کاربر [[$2|$3]] را در حد [[$1|حرفه‌ای]] سرپد بیت.',
	'babel-N' => 'ای کاربر [[$2|$3]] را در حد [[$1|ماتی زبان]] سرپد بیت.',
	'babel-0-n' => 'ای کاربر [[$2|بلوچی مکرانی]] را [[$1|سرپد نه بیت]] (یا په سختی سرپد بیت).',
	'babel-1-n' => 'ای کاربر [[$2|بلوچی مکرانی]] را در حد [[$1|مقدماتی]] سرپد بیت.',
	'babel-2-n' => 'ای کاربر [[$2|بلوچی مکرانی]] را در حد [[$1|متوسط]] سرپد بیت.',
	'babel-3-n' => 'ای کاربر [[$2|بلوچی مکرانی]] را در حد [[$1|پیشرفته]] سرپد بیت.',
	'babel-4-n' => 'ای کاربر [[$2|بلوچی مکرانی]] را در حد [[$1|نزدیک په ماتی زبان]] سرپد بیت.',
	'babel-5-n' => 'ای کاربر [[$2|بلوچی مکرانی]] را در حد [[$1|حرفه‌ای]] سرپد بیت.',
	'babel-N-n' => 'ای کاربر [[$2|بلوچی مکرانی]] را در حد [[$1|ماتی زبان]] سرپد بیت.',
);

/** Belarusian (Беларуская)
 * @author Yury Tarasievich
 */
$messages['be'] = array(
	'babel' => 'Моўныя звесткі ўдзельніка',
	'babel-desc' => 'Дадае парсеру здольнасць разбіраць <tt>#babel</tt> і аўтаматычна генераваць паласу юзербоксаў і ўлучаць свае шаблоны',
	'babel-url' => '{{ns:Project}}:Babel',
	'babel-0' => '[[$1|Не разумею]] або ледзьве разумею [[$2|$3]].',
	'babel-1' => 'Разумею [[$2|$3]] [[$1|збольшага]].',
	'babel-2' => 'Разумею [[$2|$3]] [[$1|пасярэдне]].',
	'babel-3' => 'Разумею [[$2|$3]] [[$1|добра]].',
	'babel-4' => 'Разумею [[$2|$3]] [[$1|амаль як родную]].',
	'babel-5' => 'Разумею [[$2|$3]] [[$1|прафесійна]].',
	'babel-N' => 'Разумею [[$2|$3]] [[$1|як родную]].',
	'babel-0-n' => '[[$1|Не ведаю]] [[$2|беларускай]] мовы (або ледзьве разумею).',
	'babel-1-n' => 'Ведаю [[$2|беларускую]] мову [[$1|збольшага]].',
	'babel-2-n' => 'Ведаю [[$2|беларускую]] мову [[$1|пасярэдне]].',
	'babel-3-n' => 'Ведаю [[$2|беларускую]] мову [[$1|добра]].',
	'babel-4-n' => 'Ведаю [[$2|беларускую]] мову [[$1|амаль як родную]].',
	'babel-5-n' => 'Ведаю [[$2|беларускую]] мову [[$1|прафесійна]].',
	'babel-N-n' => '[[$2|Беларуская]] — [[$1|родная]] мова ўдзельніка.',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 */
$messages['be-tarask'] = array(
	'babel' => 'Зьвесткі пра мовы, якімі валодае ўдзельнік',
	'babel-url' => 'Project:Бабілёнская вежа',
	'babel-autocreate-reason' => 'Аўтаматычнае стварэньне катэгорыі для [[$1|Бабілёнскай вежы]].',
	'babel-0' => '{{GENDER:$4|Гэты ўдзельнік|Гэтая ўдзельніца}} [[$1|не разумее]] [[$2|$3]] (ці разумее яе зь цяжкасьцю).',
	'babel-1' => '{{GENDER:$4|Гэты ўдзельнік|Гэтая ўдзельніца}} ведае [[$2|$3]] на [[$1|пачатковым]] узроўні.',
	'babel-2' => '{{GENDER:$4|Гэты ўдзельнік|Гэтая ўдзельніца}} ведае [[$2|$3]] на [[$1|сярэднім]] узроўні.',
	'babel-3' => '{{GENDER:$4|Гэты ўдзельнік|Гэтая ўдзельніца}} [[$1|выдатна]] ведае [[$2|$3]].',
	'babel-4' => '{{GENDER:$4|Гэты ўдзельнік|Гэтая ўдзельніца}} ведае [[$2|$3]] амаль [[$1|як родную]].',
	'babel-5' => '{{GENDER:$4|Гэты ўдзельнік|Гэтая ўдзельніца}} ведае [[$2|$3]] на [[$1|прафэсійным]] узроўні.',
	'babel-N' => '[[$2|$3]] — [[$1|родная мова]] {{GENDER:$4|гэтага ўдзельніка|гэтай ўдзельніцы}}.',
	'babel-0-n' => '{{GENDER:$4|Гэты ўдзельнік|Гэтая ўдзельніца}} [[$1|не разумее]] [[$2|беларускую мову]] (ці разумее яе зь цяжкасьцю).',
	'babel-1-n' => '{{GENDER:$4|Гэты ўдзельнік|Гэтая ўдзельніца}} ведае [[$2|беларускую мову]] на [[$1|пачатковым]] узроўні.',
	'babel-2-n' => '{{GENDER:$4|Гэты ўдзельнік|Гэтая ўдзельніца}} ведае [[$2|беларускую мову]] на [[$1|сярэднім]] узроўні.',
	'babel-3-n' => '{{GENDER:$4|Гэты ўдзельнік|Гэтая ўдзельніца}} [[$1|выдатна]] ведае [[$2|беларускую мову]].',
	'babel-4-n' => '{{GENDER:$4|Гэты ўдзельнік|Гэтая ўдзельніца}} ведае [[$2|беларускую мову]] амаль [[$1|як родную]].',
	'babel-5-n' => '{{GENDER:$4|Гэты ўдзельнік|Гэтая ўдзельніца}} ведае [[$2|беларускую мову]] на [[$1|прафэсійным]] узроўні.',
	'babel-N-n' => '[[$2|Беларуская мова]] — [[$1|родная мова]] {{GENDER:$4|гэтага ўдзельніка|гэтай ўдзельніцы}}.',
);

/** Bulgarian (Български)
 * @author DCLXVI
 * @author Spiritia
 * @author Петър Петров
 */
$messages['bg'] = array(
	'babel' => 'Вавилонски данни за потребителя',
	'babel-desc' => 'Прибавяне на парсерна функция <tt>#babel</tt>, която позволява автоматично създаване на вавилонски потребителски кутийки, а може също да включва и други потребителски шаблони',
	'babel-url' => 'Project:Вавилон',
	'babel-autocreate-abort' => 'Посоченото от вас потребителско име се използва за автоматично създаване на [[$1|вавилонски категории]] и не може да бъде регистрирано.',
	'babel-autocreate-reason' => 'Автоматично създаване на [[$1|вавилонска категория]].',
	'babel-autocreate-text-levels' => 'Потребителите в тази категория са посочили, че владеят $2 език на $1 ниво.',
	'babel-autocreate-text-main' => 'Потребителите в тази категория са посочили, че имат познания по $1 език.',
	'babel-0' => '{{GENDER:$4|Този потребител|Тази потребителка}} [[$1|не владее]] [[$2|$3]] (или го разбира с големи затруднения).',
	'babel-1' => '{{GENDER:$4|Този потребител|Тази потребителка}} има [[$1|основни]] познания по [[$2|$3]].',
	'babel-2' => '{{GENDER:$4|Този потребител|Тази потребителка}} владее [[$2|$3]] на [[$1|средно ниво]].',
	'babel-3' => '{{GENDER:$4|Този потребител|Тази потребителка}} има [[$1|задълбочени]] познания по [[$2|$3]].',
	'babel-4' => '{{GENDER:$4|Този потребител|Тази потребителка}} владее [[$2|$3]] [[$1|почти като роден]].',
	'babel-5' => '{{GENDER:$4|Този потребител|Тази потребителка}} има [[$1|професионални]] познания по [[$2|$3]].',
	'babel-N' => '[[$1|Родният език]] на {{GENDER:$4|този потребител|тази потребителка}} е [[$2|$3]].',
	'babel-0-n' => '{{GENDER:$4|Този потребител|Тази потребителка}} [[$1|не владее]] [[$2|български език]] (или разбира с големи затруднения).',
	'babel-1-n' => '{{GENDER:$4|Този потребител|Тази потребителка}} има [[$1|основни]] познания по [[$2|български език]].',
	'babel-2-n' => '{{GENDER:$4|Този потребител|Тази потребителка}} владее [[$2|български език]] на [[$1|средно ниво]].',
	'babel-3-n' => '{{GENDER:$4|Този потребител|Тази потребителка}} има [[$1|задълбочени]] познания по [[$2|български език]].',
	'babel-4-n' => '{{GENDER:$4|Този потребител|Тази потребителка}} владее [[$2|български език]] на ниво [[$1|почти като роден]].',
	'babel-5-n' => '{{GENDER:$4|Този потребител|Тази потребителка}} има [[$1|професионални]] познания по [[$2|български език]].',
	'babel-N-n' => 'За {{GENDER:$4|този потребител|тази потребителка}} [[$2|българският език]] се явява [[$1|роден]].',
);

/** Bengali (বাংলা)
 * @author Bellayet
 */
$messages['bn'] = array(
	'babel' => 'ব্যবহারকারীর বাবেল তথ্য',
	'babel-desc' => 'নিজের করা টেম্পলেটে সয়ংক্রিয় বাবেল ব্যবহারকারী বাক্স কলাম যোগ করতে <tt>#babel</tt> পার্সার ফাংসন যোগ করুন',
	'babel-url' => 'Project:বাবেল',
	'babel-0' => 'এ ব্যবহারকারীর [[$2|$3]] এর উপর কোন ধারণা [[$1|নাই]] (অথবা তা খুব কষ্টে বুঝতে পারেন)।',
	'babel-1' => 'এ ব্যবহারকারী [[$2|$3]] এর উপর [[$1|সাধারণ]] ধারণা রয়েছে।',
	'babel-2' => 'এ ব্যবহারকারীর [[$2|$3]] এর উপরে [[$1|মাধ্যমিক]] জ্ঞান রয়েছে।',
	'babel-3' => 'এ ব্যবহারকারীর [[$2|$3]] এর উপরে [[$1|ভাল]] ধারণা রয়েছে।',
	'babel-4' => 'এ ব্যবহারকারীর [[$2|$3]] এর উপরে [[$1|প্রায় মাতৃভাষার কাছাকাছি]] ধারণা রয়েছে।',
	'babel-5' => 'এ ব্যবহারকারীর [[$2|$3]] এর উপরে [[$1|খুব ভাল]] ধারণা রয়েছে।',
	'babel-N' => 'এ ব্যবহারকারীর [[$2|$3]] এর উপরে [[$1|মাতৃভাষার মতন]] ধারণা রয়েছে।',
	'babel-0-n' => 'এ ব্যবহারকারীর [[$2|English]] এর উপরে কোন ধারণা [[$1|নাই]] (অথবা তা খুব কষ্টে বুঝতে পারেন)।',
	'babel-1-n' => 'এ ব্যবহারকারীর [[$2|English]] এর উপরে [[$1|সাধারণ]] ধারণা রয়েছে।',
	'babel-2-n' => 'এ ব্যবহারকারীর [[$2|English]] এর উপরে [[$1|মাধ্যমিক]] ধারণা রয়েছে।',
	'babel-3-n' => 'এ ব্যবহারকারীর [[$2|English]] এর উপরে [[$1|ভাল]] ধারণা রয়েছে।',
	'babel-4-n' => 'এ ব্যবহারকারীর [[$2|English]] এর উপরে [[$1|প্রায় মাতৃভাষার কাছাকাছি]] ধারণা রয়েছে।',
	'babel-5-n' => 'এ ব্যবহারকারীর [[$2|English]] এর উপরে [[$1|খুব ভাল]] ধারণা রয়েছে।',
	'babel-N-n' => 'এ ব্যবহারকারীর [[$2|English]] এর উপরে [[$1|মাতৃভাষার মতন]] ধারণা রয়েছে।',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'babel-0' => 'Ne oar an impljer-mañ tamm [[$2|brezhoneg]] ebet (pe en deus mil boan kompren anezhañ).',
	'babel-1' => 'Ul live [[$2|brezhoneg]] [[$1|diazez]] zo gant an implijer-mañ.',
	'babel-2' => 'Ul live [[$2|brezhoneg]] [[$1|etre]] zo gant an implijer-mañ.',
	'babel-3' => 'Ul live [[$2|brezhoneg]] [[$1|a-feson]] zo gant an implijer-mañ.',
	'babel-4' => 'An implijer-mañ a gomz [[$2|brezhoneg]] [[$1|evel pa vefe e yezh-vamm]].',
	'babel-5' => 'An implijer-mañ en deus ul live [[$2|brezhoneg]] [[$1|a-vicher]].',
	'babel-N' => 'An implijer-mañ zo ar [[$2|brezhoneg]] e [[$1|yezh-vamm]].',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'babel' => 'Babel korisničke informacije',
	'babel-desc' => 'Dodaje <tt>#babel</tt> parsersku funkciju koja omogućava automatsko pravljenje babel korisničke kutije u stupcu sa mogućnostima uključivanja prilagođenih šablona',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Korisničko ime koje ste naveli se koristi za automatsko pravljenje [[$1|Babel]] kategorija i ne može biti registrovano.',
	'babel-autocreate-reason' => 'Automatski napravljena stranica [[$1|Babel]] kategorije.',
	'babel-autocreate-text-levels' => 'Korisnici u ovoj kategoriji su naveli da imaju nivo $1 znanja $2 jezika.',
	'babel-autocreate-text-main' => 'Korisnici u ovoj kategoriji su označeni da imaju znanje $1 jezika.',
	'babel-0' => 'Ovaj korisnik [[$1|ne]] govori [[$2|$3]] (ili ga razumije sa velikim poteškoćama).',
	'babel-1' => 'Ovaj korisnik ima [[$1|osnovno]] poznavanje [[$2|$3]] jezika.',
	'babel-2' => 'Ovaj korisnik [[$1|dobro]] poznaje [[$2|$3]].',
	'babel-3' => 'Ovaj korisnik [[$1|napredno]] poznaje [[$2|$3]].',
	'babel-4' => 'Ovaj korisnik poznaje [[$2|$3]] gotovo na nivou [[$1|maternjeg jezika]]',
	'babel-5' => 'Ovaj korisnik ima znanje [[$2|$3]] na [[$1|profesionalnom nivou]].',
	'babel-N' => 'Ovaj korisnik govori [[$2|$3]] kao [[$1|maternji jezik]].',
	'babel-0-n' => 'Ovaj korisnik [[$1|ne]] govori [[$2|bosanski]] (ili ga razumije sa velikim poteškoćama).',
	'babel-1-n' => 'Ovaj korisnik ima [[$1|osnovno]] znanje [[$2|bosanskog jezika]].',
	'babel-2-n' => 'Ovaj korisnik ima [[$1|osrednje]] znanje [[$2|bosanskog jezika]].',
	'babel-3-n' => 'Ovaj korisnik ima [[$1|napredno]] znanje [[$2|bosanskog jezika]].',
	'babel-4-n' => 'Ovaj korisnik ima [[$1|odlično]] znanje [[$2|bosanskog jezika]].',
	'babel-5-n' => 'Ovaj korisnik ima [[$1|profesionalno]] znanje [[$2|bosanskog jezika]].',
	'babel-N-n' => 'Ovaj korisnik ima znanje [[$2|bosanskog]] na nivou [[$1|maternjeg jezika]].',
);

/** Catalan (Català)
 * @author SMP
 * @author Toniher
 */
$messages['ca'] = array(
	'babel' => "Informació Babel d'usuari",
	'babel-desc' => "Afegeix la funció d'anàlisi <tt>#babel</tt> per a permetre la generació automàtica d'una columna babel de quadres d'usuari amb l'habilitat d'incloure plantilles personalitzades.",
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => "El nom d'usuari especificat s'utilitza per a la creació automàtica de categories [[$1|Babel]].",
	'babel-autocreate-reason' => 'Creant automàticament la categoria de [[$1|Babel]].',
	'babel-autocreate-text-levels' => "Els usuaris d'aquesta categoria indiquen que tenen un nivell $1 per l'idioma $2.",
	'babel-autocreate-text-main' => "Els usuaris d'aquesta categoria indiquen que tenen coneixements de l'idioma $1.",
	'babel-0' => "Aquest usuari [[$1|no té]] cap coneixement de l'idioma [[$2|$3]] (o bé l'entén amb moltes dificultats).",
	'babel-1' => "Aquest usuari té un coneixement [[$1|bàsic]] de l'idioma [[$2|$3]].",
	'babel-2' => "Aquest usuari té un coneixement [[$1|mitjà]] de l'idioma [[$2|$3]].",
	'babel-3' => "Aquest usuari té un coneixement [[$1|avançat]] de l'idioma [[$2|$3]].",
	'babel-4' => "Aquest usuari és parlant de l'idioma [[$2|$3]] amb nivell [[$1|gairebé natiu]].",
	'babel-5' => "Aquest usuari té coneixement [[$1|professional]] de l'idioma [[$2|$3]].",
	'babel-N' => "Aquest usuari utilitza l'idioma [[$2|$3]] com a parlant [[$1|natiu]].",
	'babel-0-n' => "Aquest usuari [[$1|no]] té cap coneixement de [[$2|català]] (o bé l'entén amb moltes dificultats).",
	'babel-1-n' => 'Aquest usuari té un coneixement [[$1|bàsic]] de [[$2|català]].',
	'babel-2-n' => 'Aquest usuari té un coneixement [[$1|mitjà]] de [[$2|català]].',
	'babel-3-n' => 'Aquest usuari té un coneixement [[$1|avançat]] de [[$2|català]].',
	'babel-4-n' => 'Aquest usuari té un coneixement [[$1|gairebé natiu]] de [[$2|català]].',
	'babel-5-n' => 'Aquest usuari té coneixement [[$1|professional]] de la llengua [[$2|catalana]].',
	'babel-N-n' => 'Aquest usuari és un parlant [[$1|natiu]] de [[$2|català]].',
);

/** Chechen (Нохчийн)
 * @author Purodha
 */
$messages['ce'] = array(
	'babel-0-n' => 'ХIокхо юзеро [[$2|Нохчйин мотт]] [[$1|хууш бац]].',
	'babel-1-n' => 'ХIокхо юзеро [[$1|кІеззиг]] бийц хаъ [[$2|Нохчийн мотт]].',
	'babel-2-n' => 'ХIокхо юзеро [[$1|къамелахь]] бийц хаъ [[$2|Нохчийн мотт]].',
	'babel-3-n' => 'ХIокхо юзеро [[$1|дика]] бийц хаъ [[$2|Нохчийн мотт]].',
	'babel-4-n' => 'ХIокхо юзеро [[$2|Нохчийн мотт]] ше [[$1|ненан]] мотт санна бийц.',
	'babel-5-n' => 'ХIокхо юзеро [[$1|профессионан]] бийц хаъ [[$2|Нохчийн мотт]].',
	'babel-N-n' => 'ХІокхо юзеро [[$1|шейр]] бийц хаъ [[$2|Нохчийн]] мотт.',
);

/** Sorani (Soranî / کوردی)
 * @author GerardM
 */
$messages['ckb'] = array(
	'babel-directionality' => 'rtl',
);

/**
 * @author Asoxor
 */
$messages['ckb-arab'] = array(
	'babel-0' => 'ئەم بەکارھێنەرە [[$1|ھیچ]] ئاگاداریەکی لە [[$2|$3]] نیە ( یان زۆر بە سەختی تێ ئەگات).',
	'babel-1' => 'ئەم بەکارھێنەرە ئاگادارییەکی [[$1|سەرەتایی]] لە [[$2|$3]] ھەیە.',
	'babel-2' => 'ئەم بەکارھێنەرە ئاگادارییەکی [[$1|ناوەنجی]] لە [[$2|$3]] ھەیە.',
	'babel-3' => 'ئەم بەکارھێنەرە ئاگادارییەکی [[$1|پێشکەوتوو]]ی لە [[$2|$3]] ھەیە.',
	'babel-4' => 'ئەم بەکارھێنەرە ئاگادارییەکی [[$1|نزیک بە زمانی دایکی]]ی لە [[$2|$3]] ھەیە.',
);

/** Crimean Turkish (Qırımtatarca)
 * @author Alessandro
 */
$messages['crh'] = array(
	'babel-0' => 'Bu qullanıcı [[$2|Qırımtatar tili]]ni [[$1|iç bilmey]].',
	'babel-1' => 'Bu qullanıcı [[$2|Qırımtatar tili]]ni [[$1|başlanğıç seviyede]] bile.',
	'babel-2' => 'Bu qullanıcı [[$2|Qırımtatar tili]]ni [[$1|orta seviyede]] bile.',
	'babel-3' => 'Bu qullanıcı [[$2|Qırımtatar tili]]ni [[$1|yahşı]] bile.',
	'babel-4' => 'Bu qullanıcı [[$2|Qırımtatar tili]]ni [[$1|ana tili kibi]] bile.',
	'babel-5' => 'Bu qullanıcı [[$2|Qırımtatar tili]]ni [[$1|ihtisasiy seviyede]] bile.',
	'babel-N' => 'Bu qullanıcınıñ [[$1|ana tili]] [[$2|Qırımtatar tili]]dir.',
);

/** Czech (Česky)
 * @author Danny B.
 * @author Li-sung
 * @author Matěj Grabovský
 * @author Mormegil
 */
$messages['cs'] = array(
	'babel' => 'Jazykové znalosti uživatele',
	'babel-desc' => 'Přidává funkci <code><nowiki>{{#babel:}}</nowiki></code>, umožňující automatickou tvorbu rámečku s informacemi o jazykových schopnostech uživatele s možností používat vlastní šablony.',
	'babel-url' => 'Project:Babylon',
	'babel-0-n' => 'Tento uživatel [[$1|nerozumí]] [[$2|česky]] (nebo rozumí se značnými problémy).',
	'babel-1-n' => 'Tento uživatel má [[$1|základní]] znalosti [[$2|češtiny]].',
	'babel-2-n' => 'Tento uživatel má [[$1|střední]] znalosti [[$2|češtiny]].',
	'babel-3-n' => 'Tento uživatel má [[$1|pokročilé]] znalosti [[$2|češtiny]].',
	'babel-4-n' => 'Tento uživatel má znalosti [[$2|češtiny]] [[$1|téměř na úrovni rodilého mluvčího]].',
	'babel-5-n' => 'Tento uživatel má [[$1|profesionální]] znalosti [[$2|češtiny]].',
	'babel-N-n' => 'Tento uživatel je [[$1|rodilý mluvčí]] [[$2|češtiny]].',
);

/** Kashubian (Kaszëbsczi)
 * @author Kaszeba
 */
$messages['csb'] = array(
	'babel' => 'Wieżô Babel brëkòwnika',
	'babel-desc' => 'Dodôwô fùnkcëjã parsera <tt>#babel</tt> zezwalającą na aùtomatné ùsôdzanié kastczi brëkòwnika z mòżnotą wstôwianiô swòjich szblonów',
	'babel-url' => 'Project:Wieżô Babel',
	'babel-autocreate-abort' => 'Wëbróné miono brëkòwnika je brëkòwóné do aùtomatnegò ùsôdzaniô kategòrëji [[$1|wieżë Babel]] ë ni mòże bëc registrowóné.',
	'babel-autocreate-reason' => 'Starna aùtomatno ùsôdzony kategòrëji [[$1|wieżë Babel]].',
	'babel-autocreate-text-levels' => 'Brëkòwnicë w ti kategòrëji zeswiôdczają znajemòtã jãzëka $2 jakno $1.',
	'babel-autocreate-text-main' => 'Brëkòwnicë w ti kategòrëji zeswiôdczają znajemòtã jãzëka $1.',
	'babel-0' => '[[$2|$3 ]] jãzëk [[$1|nie je zrozmiałi]] dlô negò brëkòwnika (abò mô òn z nim stolemné problemë).',
	'babel-1' => 'Nen brëkòwnik rozmieje [[$2|$3 jãzëk]] w [[$1|spòdlowim]] gradze.',
	'babel-2' => 'Nen brëkòwnik rozmieje [[$2|$3 jãzëk]] w [[$1|strzédnoawansowónym]] gradze.',
	'babel-3' => 'Nen brëkòwnik rozmieje [[$2|$3 jãzëk]] w [[$1|awansowónym]] gradze.',
	'babel-4' => 'Nen brëkòwnik rozmieje [[$2|$3 jãzëk]] wnetka jakno [[$1|rodną mòwã]].',
	'babel-5' => 'Nen brëkòwnik rozmieje [[$2|$3 jãzëk]] na równi z [[$1|rodną mòwą]].',
	'babel-N' => '[[$2|$3 jãzëk]] je [[$1|rodną mòwą]] negò brëkòwnika.',
	'babel-0-n' => '[[$2|Kaszëbsczi]] jãzëk [[$1|nie je zrozmiałi]] dlô negò brëkòwnika (abò mô òn z nim stolemné problemë).',
	'babel-1-n' => 'Nen brëkòwnik rozmieje [[$2|kaszëbsczi jãzëk]] w [[$1|spòdlowim]] gradze.',
	'babel-2-n' => 'Nen brëkòwnik rozmieje [[$2|kaszëbsczi jãzëk]] w [[$1|strzédnoawansowónym]] gradze.',
	'babel-3-n' => 'Nen brëkòwnik rozmieje [[$2|kaszëbsczi jãzëk]] w [[$1|awansowónym]] gradze.',
	'babel-4-n' => 'Nen brëkòwnik rozmieje [[$2|kaszëbsczi jãzëk]] wnetka jakno [[$1|rodną mòwã]].',
	'babel-5-n' => 'Nen brëkòwnik rozmieje [[$2|kaszëbsczi jãzëk]] na równi z [[$1|rodną mòwą]].',
	'babel-N-n' => '[[$2|Kaszëbsczi jãzëk]] je [[$1|rodną mòwą]] negò brëkòwnika.',
);

/** Church Slavic (Словѣ́ньскъ / ⰔⰎⰑⰂⰡⰐⰠⰔⰍⰟ)
 * @author ОйЛ
 */
$messages['cu'] = array(
	'babel-url' => 'Project:Вавѷлѡ́нъ',
	'babel-0' => 'Сь́ по́льꙃєватєл҄ь [[$1|нє]] раꙁоумѣ́ѥтъ [[$2|$3]] · и́ли раꙁоумѣ́ѥтъ съ вєли́кꙑ оуси́лии',
	'babel-1' => 'Сь по́льꙃєватєл҄ь глаго́лѥтъ [[$2|$3]] [[$1|зълѣ́]]',
	'babel-2' => 'Сь́ по́льꙃєватєл҄ь глаго́лѥтъ [[$2|$3]] [[$1|трьпи́мо]]',
	'babel-3' => 'Сь по́льꙃєватєл҄ь глаго́лѥтъ [[$2|$3]] [[$1|до́брѣ]]',
	'babel-4' => 'Сь по́льꙃєватєл҄ь глаго́лѥтъ [[$2|$3]] [[$1|вєльми до́брѣ]]',
	'babel-N' => 'Сѥмоу́ по́льꙃєватєл҄ю [[$2|$3]] ꙗ́ко [[$1|родьнъ]] ѥ́стъ',
	'babel-0-n' => 'Сь́ по́льꙃєватєл҄ь [[$1|нє]] раꙁоумѣ́ѥтъ [[$2|словѣ́ньскꙑ]] · и́ли раꙁоумѣ́ѥтъ съ вєли́кꙑ оуси́лии',
	'babel-1-n' => 'Сь по́льꙃєватєл҄ь глаго́лѥтъ [[$2|словѣ́ньскꙑ]] [[$1|зълѣ́]]',
	'babel-2-n' => 'Сь по́льꙃєватєл҄ь глаго́лѥтъ [[$2|словѣ́ньскꙑ]] [[$1|трьпи́мо]]',
	'babel-3-n' => 'Сь по́льꙃєватєл҄ь глаго́лѥтъ [[$2|словѣ́ньскꙑ]] [[$1|до́брѣ]]',
	'babel-4-n' => 'Сь по́льꙃєватєл҄ь глаго́лѥтъ [[$2|словѣ́ньскꙑ]] [[$1|вєльми до́брѣ]]',
	'babel-N-n' => 'Сѥмоу́ по́льꙃєватєл҄ю [[$2|словѣ́ньскъ ѩꙁꙑ́къ]] ꙗ́ко [[$1|ро́дьнъ]] ѥ́стъ',
);

/** Chuvash (Чăвашла)
 * @author PCode
 */
$messages['cv'] = array(
	'babel' => 'Чĕлхе пĕлĕвĕ',
	'babel-url' => 'Project:Пайпел',
	'babel-0' => 'Ку хутшăнакан [[$2|чăваш чĕлхине]] пĕлмест (е ăна чĕлхене ăнланма йывăр).',
	'babel-1' => 'Ку хутшăнакан [[$2|чăваш чĕлхине]] [[$1|кăштах]] пĕлет.',
	'babel-2' => 'Ку хутшăнакан [[$1|вăтамран илсен]] [[$2|чăваш чĕлхине]] пĕлет.',
	'babel-3' => 'Ку хутшăнакан [[$2|чăваш чĕлхине]] лайăх пĕлет.',
	'babel-4' => 'Ку хутшăнакан [[$2|чăвашла]] [[$1|тăван чĕлхене пĕлнĕ пек]] пĕлет.',
	'babel-5' => 'Ку хутшăнакан [[$2|чăваш чĕлхине]] питĕ лайăх, [[$1|профессионал шайĕнче]] пĕлет.',
	'babel-N' => 'Ку хутшăнакан валли [[$2|чăваш чĕлхи]] [[$1|тăван чĕлхе]] шутланать.',
);

/** Welsh (Cymraeg)
 * @author Lloffiwr
 */
$messages['cy'] = array(
	'babel' => 'Gwybodaeth am ieithoedd y defnyddiwr',
	'babel-desc' => "Yn ychwanegu'r ffwythiant dosrannu <tt>#babel</tt> er mwyn gosod blwch ieithoedd y defnyddiwr yn awtomatig, a chyda'r modd i gynnwys nodiadau pwrpasol",
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Defnyddir yr enw defnyddiwr y dewisoch ar gyfer creu categori [[$1|Babel]] yn awtomatig, ac ni ellir ei gofrestri.',
	'babel-autocreate-reason' => 'Yn creu tudalen gategoreiddio [[$1|Babel]] yn awtomatig.',
	'babel-autocreate-text-levels' => 'Mae defnyddwyr yn y categori hwn yn crybwyll bod ganddynt gallu ieithyddol ar lefel $1 mewn $2.',
	'babel-autocreate-text-main' => 'Mae defnyddwyr yn y categori hwn yn crybwyll bod rhywfaint o allu $1 ganddynt.',
	'babel-0' => "[[$1|Nid]] yw{{GENDER:$4| hwn| hon|'r defnyddiwr hwn}} yn medru [[$2|$3]] (neu mae'n cael hi'n anodd iawn ei deall).",
	'babel-1' => "Mae{{GENDER:$4| hwn| hon|'r defnyddiwr hwn}} yn medru [[$2|$3]] ar lefel [[$1|syml]].",
	'babel-2' => "Mae{{GENDER:$4| hwn| hon|'r defnyddiwr hwn}} yn medru [[$2|$3]] ar lefel [[$1|ganolradd]].",
	'babel-3' => "Mae{{GENDER:$4| hwn| hon|'r defnyddiwr hwn}} yn medru [[$2|$3]] ar lefel [[$1|uwchradd]].",
	'babel-4' => 'Mae [[$2|$3]] [[$1|rhugl]] gan {{GENDER:$4|hwn|hon|y defnyddiwr hwn}}.',
	'babel-5' => "Mae{{GENDER:$4| hwn| hon|'r defnyddiwr hwn}} yn medru [[$2|$3]] ar lefel [[$1|broffesiynol]].",
	'babel-N' => '[[$2|$3]] yw [[$1|mamiaith]] {{GENDER:$4|hwn|hon|y defnyddiwr hwn}}.',
	'babel-0-n' => "[[$1|Nid]] yw{{GENDER:$4| hwn| hon|'r defnyddiwr hwn}} yn medru'r [[$2|Gymraeg]] (neu mae'n cael hi'n anodd iawn ei deall).",
	'babel-1-n' => "Mae{{GENDER:$4| hwn| hon|'r defnyddiwr hwn}} yn medru'r [[$2|Gymraeg]] ar lefel [[$1|syml]].",
	'babel-2-n' => "Mae{{GENDER:$4| hwn| hon|'r defnyddiwr hwn}} yn medru'r [[$2|Gymraeg]] ar lefel [[$1|ganolradd]].",
	'babel-3-n' => "Mae{{GENDER:$4| hwn| hon|'r defnyddiwr hwn}} yn medru'r [[$2|Gymraeg]] ar lefel [[$1|uwchradd]].",
	'babel-4-n' => 'Mae [[$2|Cymraeg]] [[$1|rhugl]] gan {{GENDER:$4|hwn|hon|y defnyddiwr hwn}}.',
	'babel-5-n' => "Mae{{GENDER:$4| hwn| hon|'r defnyddiwr hwn}} yn medru'r [[$2|Gymraeg]] ar lefel [[$1|broffesiynol]].",
	'babel-N-n' => '[[$2|Cymraeg]] yw [[$1|mamiaith]] {{GENDER:$4|hwn|hon|y defnyddiwr hwn}}.',
);

/** Danish (Dansk)
 * @author Byrial
 * @author Jan Friberg
 */
$messages['da'] = array(
	'babel' => 'Babelinformation',
	'babel-desc' => 'Tilføjer parserfunktionen <tt>#babel</tt> for at tillade automatisk at generere at babelboks med muglighed for at inkludere tilpassede skabeloner',
	'babel-url' => 'Project:Babel',
	'babel-0' => 'Denne bruger har [[$1|ingen]] kendskab til [[$2|$3]] (eller har meget svært ved at forstå det).',
	'babel-1' => 'Denne bruger har [[$1|grundlæggende]] kendskab til [[$2|$3]].',
	'babel-2' => 'Denne bruger har et [[$1|godt]] kendskab til [[$2|$3]].',
	'babel-3' => 'Denne bruger har et [[$1|avanceret]] kendskab til [[$2|$3]].',
	'babel-4' => 'Denne bruger kan [[$2|$3]] næsten på [[$1|modersmålsniveau]].',
	'babel-5' => 'Denne bruger har [[$1|professionel]] kendskab til [[$2|$3]].',
	'babel-N' => 'Denne bruger har [[$2|$3]] som [[$1|modersmål]].',
	'babel-0-n' => 'Denne bruger har [[$1|intet]] kendskab til [[$2|dansk]] (eller forstår det kun med stor vanskelighed).',
	'babel-1-n' => 'Denne bruger har [[$1|grundlæggende]] kendskab til [[$2|dansk]].',
	'babel-2-n' => 'Denne bruger har et [[$1|godt]] kendskab til [[$2|dansk]].',
	'babel-3-n' => 'Denne bruger har et [[$1|avanceret]] kendskab til [[$2|dansk]].',
	'babel-4-n' => 'Denne bruger kan [[$2|dansk]] næsten på [[$1|modersmålsniveau]].',
	'babel-5-n' => 'Denne bruger har [[$1|professionelt]] kendskab til [[$2|dansk]].',
	'babel-N-n' => 'Denne bruger har [[$2|dansk]] som [[$1|modersmål]].',
);

/** German (Deutsch)
 * @author ChrisiPK
 * @author Forrester
 * @author Metalhead64
 * @author Purodha
 * @author Raimond Spekking
 * @author Revolus
 * @author Umherirrender
 */
$messages['de'] = array(
	'babel' => 'Babel-Benutzer-Information',
	'babel-desc' => 'Ergänzt die <tt>#babel</tt>-Parserfunktion zur automatischen Erstellung von Babel-Benutzerboxen-Zeilen mit der Möglichkeit, eigene Vorlagen einzubinden',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Der ausgewählte Benutzername wird für die automatische Erstellung von [[$1|Babel]]-Kategorien benötigt und kann nicht registriert werden.',
	'babel-autocreate-reason' => 'Automatisch erstellte [[$1|Babel]]-Kategorie.',
	'babel-autocreate-text-levels' => 'Benutzer in dieser Kategorie haben Kenntnisse der Stufe $1 in der Sprache $2.',
	'babel-autocreate-text-main' => 'Benutzer in dieser Kategorie haben Kenntnisse der Sprache $1.',
	'babel-0' => 'Dieser Benutzer beherrscht [[$2|$3]] [[$1|nicht]] (oder versteht es nur mit beträchtlichen Schwierigkeiten).',
	'babel-1' => 'Dieser Benutzer beherrscht [[$2|$3]] auf [[$1|grundlegendem]] Niveau.',
	'babel-2' => 'Dieser Benutzer beherrscht [[$2|$3]] auf [[$1|fortgeschrittenem]] Niveau.',
	'babel-3' => 'Dieser Benutzer beherrscht [[$2|$3]] auf [[$1|hohem]] Niveau.',
	'babel-4' => 'Dieser Benutzer beherrscht [[$2|$3]] auf [[$1|muttersprachlichem Niveau]].',
	'babel-5' => 'Dieser Benutzer beherrscht [[$2|$3]] auf [[$1|professionellem]] Niveau.',
	'babel-N' => 'Dieser Benutzer spricht [[$2|$3]] als [[$1|Muttersprache]].',
	'babel-0-n' => 'Dieser Benutzer beherrscht [[$2|Deutsch]] [[$1|nicht]] (oder versteht es nur mit beträchtlichen Schwierigkeiten).',
	'babel-1-n' => 'Dieser Benutzer beherrscht [[$2|Deutsch]] auf [[$1|grundlegendem]] Niveau.',
	'babel-2-n' => 'Dieser Benutzer beherrscht [[$2|Deutsch]] auf [[$1|fortgeschrittenem]] Niveau.',
	'babel-3-n' => 'Dieser Benutzer beherrscht [[$2|Deutsch]] auf [[$1|hohem]] Niveau.',
	'babel-4-n' => 'Dieser Benutzer beherrscht [[$2|Deutsch]] auf [[$1|muttersprachlichem Niveau]].',
	'babel-5-n' => 'Dieser Benutzer beherrscht [[$2|Deutsch]] auf [[$1|professionellem]] Niveau.',
	'babel-N-n' => 'Dieser Benutzer spricht [[$2|Deutsch]] als [[$1|Muttersprache]].',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'babel' => 'Babelowe wužywarske informacije',
	'babel-desc' => 'Pśidawa parserowu funkciju <tt>#babel</tt> za awtomatiske twórjenje słupa babelowych wužywarskich kašćikow, z móžnosću, swójske pśedłogi zapśěgnuś',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Pódane wužywarske mě wužywa se za awtomatiske wutwórjenje [[$1|Babelowych]] kategorijow a njedajo se registrěrowaś.',
	'babel-autocreate-reason' => 'Awtomatiske wutwórjenje [[$1|Babeloweje]] kategorije.',
	'babel-autocreate-text-levels' => 'Wužywarje w toś tej kategoriji pódawaju, až maju stopjeń znajobnosćow $1 za rěc $2.',
	'babel-autocreate-text-main' => 'Wužywarje w toś tej kategoriji pódawaju, až maju znajobnosći rěcy $1.',
	'babel-0' => 'Toś ten wužywaŕ [[$1|njama]] znajobnosći [[$2|$3]] (abo rozmějo ju jano z wjelikimi śěźami).',
	'babel-1' => 'Toś ten wužywaŕ ma [[$1|zakładne]] znajobnosći [[$2|$3]].',
	'babel-2' => 'Toś ten wužywaŕ ma [[$1|pśerězne]] znajobnosći [[$2|$3]].',
	'babel-3' => 'Toś ten wužywaŕ ma [[$1|póstupjone]] znajobnosći [[$2|$3]].',
	'babel-4' => 'Toś ten wužywaŕ ma znajobnosći [[$2|$3]] na [[$1|maminorěcnem]] niwowje.',
	'babel-5' => 'Toś ten wužywaŕ ma [[$1|profesionelne]] znajobnosći [[$2|$3]].',
	'babel-N' => 'Toś ten wužywaŕ powĕda [[$2|$3]] ako [[$1|maminu]] rĕc.',
	'babel-0-n' => 'Toś ten wužywaŕ njama [[$1|žedne]] znajobnosći [[$2|dolnoserbšćiny]] (abo rozmějo ju jano z bejnymi śěžkosćami).',
	'babel-1-n' => 'Toś ten wužywaŕ ma [[$1|zakładne]] znajobnosći [[$2|dolnoserbšćiny]].',
	'babel-2-n' => 'Toś ten wužywaŕ ma [[$1|pśerězne]] znajobnosći [[$2|dolnoserbšćiny]].',
	'babel-3-n' => 'Toś ten wužywaŕ ma [[$1|póstupjone]] znajobnosći [[$2|dolnoserbšćiny]].',
	'babel-4-n' => 'Toś ten wužywaŕ powěda [[$2|dolnoserbšćinu]] kaž [[$1|maminorěcny]].',
	'babel-5-n' => 'Toś ten wužywaŕ ma [[$1|profesionelne]] znajobnosći [[$2|dolnoserbšćiny]].',
	'babel-N-n' => 'Toś ten wužywaŕ powěda [[$2|dolnoserbšćinu]] ako [[$1|maminu rěc]].',
);

/** Divehi (ދިވެހިބަސް)
 * @author GerardM
 */
$messages['dv'] = array(
	'babel-directionality' => 'rtl',
);

/** Greek (Ελληνικά)
 * @author Consta
 * @author Omnipaedista
 */
$messages['el'] = array(
	'babel' => 'Πληροφορίες Βαβέλ Χρήστη',
	'babel-desc' => 'Προσθέτει την #babel λεξιαναλυτική λειτουργία η οποία επιτρέπει την αυτόματη παραγωγή στήλης βαβέλ με την δυνατότητα περίληψης προκαθορισμένων προτύπων',
	'babel-url' => 'Project:Βαβέλ',
	'babel-autocreate-abort' => 'Το όνομα χρήστη που έδωσες χρησιμοποιείται για τη κατηγορία αυτοδημιουργίας [[$1|Βαβέλ]] και δεν μπορεί να κατοχυρωθεί.',
	'babel-autocreate-reason' => 'Αυτόματη δημιουργία σελίδας κατηγορίας [[$1|Βαβέλ]].',
	'babel-autocreate-text-levels' => 'Οι χρήστες στην κατηγορία αυτή δηλώνουν πως ομιλούν την γλώσσα $2 σε επίπεδο $1',
	'babel-autocreate-text-main' => 'Οι χρήστες σε αυτή την κατηγορία δηλώνουν ότι γνωρίζουν τη γλώσσα σε επίπεδο $1.',
	'babel-0' => 'Αυτός ο χρήστης [[$1|δεν καταλαβαίνει]] τα [[$2|$3]] (ή με μεγάλη δυσκολία).',
	'babel-1' => 'Αυτός ο χρήστης μπορεί να συνεισφέρει σε [[$1|βασικού]] επιπέδου [[$2|$3]].',
	'babel-2' => 'Αυτός ο χρήστης μπορεί να συνεισφέρει σε [[$1|μετρίου]] επιπέδου [[$2|$3]].',
	'babel-3' => 'Αυτός ο χρήστης μπορεί να συνεισφέρει σε [[$1|προχωρημένου]] επιπέδου [[$2|$3]].',
	'babel-4' => 'Αυτός ο χρήστης έχει [[$1|σχεδόν ως μητρική]] του γλώσσα τα [[$2|$3]].',
	'babel-5' => 'Αυτός ο χρήστης μπορεί να συνεισφέρει σε [[$1|επαγγελματικού]] επιπέδου [[$2|$3]].',
	'babel-N' => 'Αυτός ο χρήστης έχει ως [[$1|μητρική]] του γλώσσα τα [[$2|$3]].',
	'babel-0-n' => 'Αυτός ο χρήστης [[$1|δεν καταλαβαίνει]] τα [[$2|Ελληνικά]] (ή με μεγάλη δυσκολία).',
	'babel-1-n' => 'Αυτός ο χρήστης μπορεί να συνεισφέρει σε [[$1|βασικού]] επιπέδου [[$2|Ελληνικά]].',
	'babel-2-n' => 'Αυτός ο χρήστης μπορεί να συνεισφέρει σε [[$1|μετρίου]] επιπέδου [[$2|Ελληνικά]].',
	'babel-3-n' => 'Αυτός ο χρήστης μπορεί να συνεισφέρει σε [[$1|προχωρημένου]] επιπέδου [[$2|Ελληνικά]].',
	'babel-4-n' => 'Αυτός ο χρήστης έχει [[$1|σχεδόν ως μητρική]] του γλώσσα τα [[$2|Ελληνικά]].',
	'babel-5-n' => 'Αυτός ο χρήστης μπορεί να συνεισφέρει σε [[$1|επαγγελματικού]] επιπέδου [[$2|Ελληνικά]].',
	'babel-N-n' => 'Αυτός ο χρήστης έχει ως [[$1|μητρική]] του γλώσσα τα [[$2|Ελληνικά]].',
);

/** Esperanto (Esperanto)
 * @author Malafaya
 * @author Yekrats
 */
$messages['eo'] = array(
	'babel' => 'Babela Informo pri Uzanto',
	'babel-desc' => 'Aldonas la <tt>#babel</tt> sintaksanalizilan funkcion por aŭtomate generi kolumnon de babel-uzantoskatolo kun la ebleco inkluzivi sxablonojn de uzanto.',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'La salutnomo kiun vi specifis estas uzata por Babel-kategoria aŭtomata kreado, kaj ne povas esti registrita.',
	'babel-autocreate-reason' => 'Aŭtomate kreante kategorio-paĝo por Babel.',
	'babel-autocreate-text-levels' => 'Uzantoj en ĉi tiu kategorio indikas ke ili havas spertnivelo $1 por $2.',
	'babel-autocreate-text-main' => 'Uzantoj en ĉi tiu kategorio indikas ke ili havas lingvoscio de $1.',
	'babel-0' => 'Ĉi tiu uzanto [[$1|ne komprenas]] la lingvon [[$2|$3]], aŭ tre malfacile komprenas.',
	'babel-1' => 'Ĉi tiu uzanto povas komuniki per [[$1|baza]] nivelo de [[$2|$3]].',
	'babel-2' => 'Tiu ĉi uzanto havas [[$1|meznivelan]] scion de [[$2|$3]].',
	'babel-3' => 'Ĉi tiu uzanto povas komuniki per [[$1|alta aŭ flua]] nivelo de [[$2|$3]].',
	'babel-4' => 'Ĉi tiu uzanto parolas kun [[$1|preskaŭ denaska]] scio de [[$2|$3]].',
	'babel-5' => 'Ĉi tiu uzanto estas [[$1|profesia]] parolanto de [[$2|$3]].',
	'babel-N' => 'Ĉi tiu uzanto estas [[$1|denaska parolanto]] de [[$2|$3]].',
	'babel-0-n' => 'Ĉi tiu uzanto [[$1|ne komprenas]] [[$2|Esperanton]], aŭ tre malfacile komprenas.',
	'babel-1-n' => 'Ĉi tiu uzanto povas komuniki per [[$1|baza]] nivelo de [[$2|Esperanto]].',
	'babel-2-n' => 'Ĉi tiu uzanto havas [[$1|meznivelan]] scion de [[$2|Esperanto]].',
	'babel-3-n' => 'Ĉi tiu uzanto povas komuniki per [[$1|alta aŭ flua]] nivelo de [[$2|Esperanto]].',
	'babel-4-n' => 'Ĉi tiu uzanto parolas kun [[$1|preskaŭ denaska]] scio de [[$2|Esperanto]].',
	'babel-5-n' => 'Ĉi tiu uzanto estas [[$1|profesia]] parolanto de [[$2|Esperanto]].',
	'babel-N-n' => 'Ĉi tiu uzanto estas [[$1|denaska parolanto]] de [[$2|Esperanto]].',
);

/** Spanish (Español)
 * @author Bengoa
 * @author Crazymadlover
 * @author Fluence
 * @author GerardM
 * @author Sanbec
 */
$messages['es'] = array(
	'babel' => 'Información de usuario Babel',
	'babel-desc' => 'Agregar la <tt>#babel</tt> función analítica para permitir generación automática de una columna de cuadro de usuario Babel con la habilidad de incluir plantillas propias.',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'El nombre de usuario que ha especificado es usado para auto-creación de categorías [[$1|Babel]] y no puede ser registrado.',
	'babel-autocreate-reason' => 'Creando automáticamente página de categorías [[$1|Babel]].',
	'babel-autocreate-text-levels' => 'Los usuarios de esta categoría declaran que tienen un nivel de dominio $1 del idioma $2.',
	'babel-autocreate-text-main' => 'Los usuarios en esta categoría indican que tienen conocimiento del lenguaje $1.',
	'babel-0' => 'Este usuario [[$1|desconoce]] el [[$2|$3]] (o lo entiende con considerable dificultad).',
	'babel-1' => 'Este usuario tiene un conocimiento [[$1|básico]] del [[$2|$3]].',
	'babel-2' => 'Este usuario tiene un conocimiento [[$1|intermedio]] del [[$2|$3]].',
	'babel-3' => 'Este usuario tiene un conocimiento [[$1|avanzado]] del [[$2|$3]].',
	'babel-4' => 'Este usuario tiene un conocimiento [[$1|casi nativo]] del [[$2|$3]].',
	'babel-5' => 'Este usuario tiene un conocimiento [[$1|profesional]] del [[$2|$3]]',
	'babel-N' => 'Este usuario tiene una comprensión [[$1|nativa]] del [[$2|$3]].',
	'babel-0-n' => 'Este usuario [[$1|desconoce]] el [[$2|español]] (o lo entiende con considerable dificultad).',
	'babel-1-n' => 'Este usuario tiene un conocimiento [[$1|básico]] del [[$2|español]].',
	'babel-2-n' => 'Este usuario tiene un conocimiento [[$1|intermedio]] del [[$2|español]].',
	'babel-3-n' => 'Este usuario tiene un conocimiento [[$1|avanzado]] del [[$2|español]].',
	'babel-4-n' => 'Este usuario tiene un conocimiento [[$1|casi nativo]] del [[$2|español]].',
	'babel-5-n' => 'Este usuario tiene un conocimiento [[$1|profesional]] del [[$2|Español]].',
	'babel-N-n' => 'Este usuario tiene una comprensión [[$1|nativa]] del [[$2|español]].',
);

/** Estonian (Eesti)
 * @author Ker
 */
$messages['et'] = array(
	'babel' => 'Kasutaja keelteoskus',
	'babel-desc' => 'Lisab parsimisfunktsiooni <tt>#babel</tt>, mis võimaldab kasutaja keelteoskuse infokasti lisamist.',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Kasutajanime, mille sisestasid, kasutatakse [[$1|Babeli]] kategooriate automaatseks genereerimiseks, mistõttu seda ei ole võimalik registreerida.',
	'babel-autocreate-reason' => '[[$1|Babeli]] kategoorialehe automaatne genereerimine.',
	'babel-autocreate-text-levels' => 'Kasutajad selles kategoorias on märkinud, et oskavad $2t tasemel $1.',
	'babel-autocreate-text-main' => 'Kasutajad selles katekoorias on märkinud, et valdavad $1t.',
	'babel-0' => '[[$2|$3]] — [[$1|oskus väga nõrk või puudub]]',
	'babel-1' => '[[$2|$3]] — [[$1|algtase]]',
	'babel-2' => '[[$2|$3]] — [[$1|keskmine tase]]',
	'babel-3' => '[[$2|$3]] — [[$1|hea tase]]',
	'babel-4' => '[[$2|$3]] — [[$1|emakeele lähedane tase]]',
	'babel-5' => '[[$2|$3]] — [[$1|professionaalne tase]]',
	'babel-N' => '[[$2|$3]] — [[$1|emakeel]]',
	'babel-0-n' => 'See kasutaja [[$1|ei valda]] [[$2|eesti keelt]].',
	'babel-1-n' => 'See kasutaja valdab [[$2|eesti keelt]] [[$1|algtasemel]].',
	'babel-2-n' => 'See kasutaja valdab [[$2|eesti keelt]] [[$1|keskmisel tasemel]].',
	'babel-3-n' => 'See kasutaja valdab [[$2|eesti keelt]] [[$1|heal tasemel]].',
	'babel-4-n' => 'See kasutaja valdab [[$2|eesti keelt]] [[$1|peaaegu nagu emakeelt]].',
	'babel-5-n' => 'See kasutaja valdab [[$2|eesti keelt]] [[$1|professionaalsel tasemel]].',
	'babel-N-n' => 'See kasutaja valdab [[$2|eesti keelt]] [[$1|emakeelena]].',
);

/** Basque (Euskara)
 * @author An13sa
 * @author Kobazulo
 * @author Theklan
 */
$messages['eu'] = array(
	'babel' => 'Lankideen babel informazioa',
	'babel-desc' => '<tt>#babel</tt> sintaxi-analizatzaile (parser) funtzioa gehitzen du automatikoki sorturiko babel lankide-kutxen zutabea baimeduz eta lankide txantiloiak sartzea baimenduz',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Sartu duzun lankide izena [[$1|Babel]] kategorien auto-sorkuntzarako erabiltzen da eta ezin da erregistratu.',
	'babel-autocreate-reason' => 'Automatikoki sorturiko [[$1|Babel]] kategoria orrialdea.',
	'babel-autocreate-text-levels' => 'Kategoria honetako lankideek $1 maila dutela $2 hizkuntzan adierazten du.',
	'babel-autocreate-text-main' => 'Kategoria honetan dauden lankideek $1 hizkuntzaren jakintza dute.',
	'babel-autocreate-user' => 'Babel AutoSorrera',
	'babel-directionality' => 'ltr',
	'babel-0' => 'Lankide honek [[$1|ez daki]] [[$2|$3]]z (edo oso zaila da berarentzat ulertzea).',
	'babel-1' => 'Lankide honek [[$2|$3]]zko [[$1|oinarrizko ezagutza]] du.',
	'babel-2' => 'Lankide honek [[$2|$3]]zko [[$1|ezagutza ertaina]] du.',
	'babel-3' => 'Lankide honek [[$2|$3]]zko [[$1|ezagutza aurreratua]] du.',
	'babel-4' => 'Lankide honek [[$2|$3]]z [[$1|euskaldun zahar baten antzeko]] maila du.',
	'babel-5' => 'Lankide honek [[$2|$3]]zko [[$1|ezagutza profesionala]] du.',
	'babel-N' => 'Lankide honek [[$2|$3]] du [[$1|ama hizkuntza]].',
	'babel-0-n' => 'Erabiltzaile honek [[$2|euskara]]rik [[$1|ez du  ulertzen]] (edo nekez ulertzen du).',
	'babel-1-n' => 'Erabiltzaile honek [[$1|oinarrizko mailan]] lagun dezake [[$2|euskara]]z.',
	'babel-2-n' => 'Erabiltzaile honek [[$1|maila ertainean]] lagun dezake [[$2|euskara]]z.',
	'babel-3-n' => 'Erabiltzaile honek [[$2|euskara]]z [[$1|maila aurreratuan]] lagun dezake.',
	'babel-4-n' => 'Erabiltzaile honek [[$1|euskaldun zahar baten antzeko mailan]] lagun dezake [[$2|euskara]]z.',
	'babel-5-n' => 'Erabiltzaile honek [[$2|euskara]] [[$1|aditu]] mailan erabiltzen du.',
	'babel-N-n' => 'Erabiltzaile hau [[$1|euskaldun zaharra]] da ([[$2|euskara]] du ama hizkuntza).',
);

/** Persian (فارسی)
 * @author Huji
 * @author Ladsgroup
 */
$messages['fa'] = array(
	'babel' => 'اطلاعات کاربری بابل',
	'babel-desc' => 'دستور تجزیه‌گر <tt>#babel</tt> را اضافه می‌کند که امکان ایجاد خودکار جعبه‌های کاربری بابل با قابلیت گنجاندن الگوهای دلخواه را فراهم می‌کند',
	'babel-url' => 'Project:بابل',
	'babel-autocreate-text-levels' => 'کاربران این رده توانایی $1 را در زبان $2 دارند',
	'babel-directionality' => 'rtl',
	'babel-0' => 'این کاربر [[$2|$3]] را در حد [[$1|نمی‌فهمد]] (یا به سختی می‌فهمد).',
	'babel-1' => 'این کاربر [[$2|$3]] را در حد [[$1|مقدماتی]] می‌فهمد.',
	'babel-2' => 'این کاربر [[$2|$3]] را در حد [[$1|متوسط]] می‌فهمد.',
	'babel-3' => 'این کاربر [[$2|$3]] را در حد [[$1|پیشرفته]] می‌فهمد.',
	'babel-4' => 'این کاربر [[$2|$3]] را در حد [[$1|نزدیک به زبان مادری]] می‌فهمد.',
	'babel-5' => 'این کاربر [[$2|$3]] را در حد [[$1|حرفه‌ای]] می‌فهمد.',
	'babel-N' => 'این کاربر [[$2|$3]] را در حد [[$1|زبان مادری]] می‌فهمد.',
	'babel-0-n' => 'این کاربر [[$2|فارسی]] را [[$1|نمی‌فهمد]] (یا به سختی می‌فهمد).',
	'babel-1-n' => 'این کاربر [[$2|فارسی]] را در حد [[$1|مقدماتی]] می‌فهمد.',
	'babel-2-n' => 'این کاربر [[$2|فارسی]] را در حد [[$1|متوسط]] می‌فهمد.',
	'babel-3-n' => 'این کاربر [[$2|فارسی]] را در حد [[$1|پیشرفته]] می‌فهمد.',
	'babel-4-n' => 'این کاربر [[$2|فارسی]] را در حد [[$1|نزدیک به زبان مادری]] می‌فهمد.',
	'babel-5-n' => 'این کاربر [[$2|فارسی]] را در حد [[$1|حرفه‌ای]] می‌فهمد.',
	'babel-N-n' => 'این کاربر [[$2|فارسی]] را در حد [[$1|زبان مادری]] می‌فهمد.',
);

/** Finnish (Suomi)
 * @author Crt
 * @author Ilaiho
 * @author Jaakonam
 * @author Nike
 */
$messages['fi'] = array(
	'babel' => 'Käyttäjän kielitaito',
	'babel-desc' => 'Lisää <tt>#babel</tt>-funktion, jotta käyttäjän kielitaidosta kertova babel-käyttäjälaatikkosarake voidaan luoda automaattisesti ja sisällyttää räätälöityihin mallineisiin.',
	'babel-url' => 'Project:Kielitaito',
	'babel-autocreate-abort' => 'Antamasi käyttäjätunnus on varattu [[$1|kielitaitoluokkien]] automaattiseen luomiseen, joten et voi rekisteröidä sitä.',
	'babel-autocreate-reason' => '[[$1|Kielitaidon]] luokkasivun automaattinen luonti.',
	'babel-autocreate-text-levels' => 'Käyttäjät tässä luokassa ovat ilmoittaneet osaavansa kieltä $1 tasolla $2.',
	'babel-autocreate-text-main' => 'Käyttäjät tässä luokassa ovat ilmoittaneet ymmärtävänsä kieltä $1.',
	'babel-0' => 'Tämä käyttäjä osaa [[$1|hyvin vähän tai ei lainkaan]] kieltä [[$2|$3]].',
	'babel-1' => 'Tällä käyttäjällä on kielen [[$2|$3]] [[$1|perustaidot]]',
	'babel-2' => 'Tämä käyttäjä osaa kieltä [[$2|$3]] [[$1|kohtalaisesti]].',
	'babel-3' => 'Tämä käyttäjä osaa kieltä [[$2|$3]] [[$1|erinomaisesti]].',
	'babel-4' => 'Tämä käyttäjä osaa kieltä [[$2|$3]] [[$1|äidinkielen tavoin]].',
	'babel-5' => 'Tämä käyttäjä osaa käyttää kieltä [[$2|$3]] [[$1|ammattimaisesti]].',
	'babel-N' => 'Tämä käyttäjä puhuu kieltä [[$2|$3]] [[$1|äidinkielenään]].',
	'babel-0-n' => 'Tämä käyttäjä osaa [[$1|hyvin vähän tai ei lainkaan]] [[$2|suomea]].',
	'babel-1-n' => 'Tämä käyttäjä puhuu [[$2|suomea]] [[$1|vähän]].',
	'babel-2-n' => 'Tämä käyttäjä osaa [[$2|suomea]] [[$1|kohtalaisesti]].',
	'babel-3-n' => 'Tämä käyttäjä osaa [[$2|suomea]] [[$1|erinomaisesti]].',
	'babel-4-n' => 'Tämä käyttäjä osaa [[$2|suomea]] [[$1|melkein äidinkielen tavoin]].',
	'babel-5-n' => 'Tämä käyttäjä käyttää [[$2|suomea]] [[$1|ammattimaisesti]].',
	'babel-N-n' => 'Tämä käyttäjä puhuu [[$2|suomea]] [[$1|äidinkielenään]].',
);

/** Faroese (Føroyskt)
 * @author Quackor
 */
$messages['fo'] = array(
	'babel' => 'Bable brúkara upplýsing',
	'babel-url' => 'Verkætlan:Babel',
	'babel-0' => 'Hesin brúkarin skilur [[$1|ikki]] [[$2|$3]] (ella skilir tað ikki gott).',
	'babel-1' => 'Hesin brúkarin hevur [[$1|grundleggjandi]] kunnleika til [[$2|$3]].',
	'babel-2' => 'Hesin brúkarin hevur [[$1|miðal]] kunnleika til [[$2|$3]].',
	'babel-3' => 'Hesin brúkarin hevur kunnleika á [[$1|hástigi]] um [[$2]|$3]].',
	'babel-N' => 'Hesin brúkarin hevur [[$2|$3]] sum [[$1|móðurmál]].',
);

/** French (Français)
 * @author Cedric31
 * @author Grondin
 * @author IAlex
 * @author Louperivois
 * @author UV
 * @author Verdy p
 */
$messages['fr'] = array(
	'babel' => 'Informations sur l’utilisateur de Babel',
	'babel-desc' => 'Ajoute une fonction parseur <tt>#babel</tt> permettant la création automatique d’une boîte utilisateur Babel avec la possibilité d’y inclure des modèles locaux',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => "Le nom d'utilisateur que vous avez entré est utilisé pour créer automatiquement les catégorie [[$1|Babel]] et ne peut pas être enregistré.",
	'babel-autocreate-reason' => 'Création automatique de la catégorie [[$1|Babel]].',
	'babel-autocreate-text-levels' => "Les utilisateurs dans cette catégorie ont indiqué qu'ils ont le niveau $1 pour la langue $2.",
	'babel-autocreate-text-main' => "Les utilisateurs dans cette catégorie ont indiqué qu'ils ont une connaissance en $1.",
	'babel-0' => 'Cet utilisateur n’a [[$1|aucune]] connaissance en [[$2|$3]] (ou le comprend avec de grandes difficultés).',
	'babel-1' => 'Cet utilisateur peut contribuer avec un niveau [[$1|élémentaire]] en [[$2|$3]].',
	'babel-2' => 'Cet utilisateur a une connaissance [[$1|moyenne]] en [[$2|$3]].',
	'babel-3' => 'Cet utilisation dispose d’une connaissance [[$1|avancée]] en [[$2|$3]].',
	'babel-4' => 'Cet utilisateur a une connaissance proche de la [[$1|langue maternelle]] en [[$2|$3]].',
	'babel-5' => 'Ce contributeur a une connaissance [[$1|professionnelle]] en [[$2|$3]].',
	'babel-N' => 'Cet utilisateur dispose d’une compréhension comme [[$1|langue maternelle]] en [[$2|$3]].',
	'babel-0-n' => 'Cet utilisateur n’a [[$1|aucune]] connaissance en [[$2|français]] (ou le comprend avec de grandes difficultés).',
	'babel-1-n' => 'Cet utilisateur dispose de connaissances [[$1|de base]] en [[$2|français]].',
	'babel-2-n' => "Cet utilisateur dispose d'un [[$1|niveau intermédiaire]] de connaissance en [[$2|français]].",
	'babel-3-n' => 'Cet utilisateur dispose de connaissances [[$1|avancées]] en [[$2|français]].',
	'babel-4-n' => 'Cet utilisateur dispose de connaissances proches de la [[$1|langue maternelle]] en [[$2|français]].',
	'babel-5-n' => 'Cet utilisateur dispose d’un niveau de connaissances [[$1|professionel]] du [[$2|français]].',
	'babel-N-n' => 'Cet utilisateur a pour [[$1|langue maternelle]] le [[$2|français]].',
);

/** Western Frisian (Frysk)
 * @author Crazymadlover
 * @author Snakesteuben
 */
$messages['fy'] = array(
	'babel-0' => 'Dizze meidogger praat [[$1|gjin]] [[$2|$3]].',
	'babel-1' => 'It [[$2|$3]] fan dizze meidogger is [[$1|minimaal]].',
	'babel-2' => 'It [[$2|$3]] fan dizze meidogger is [[$1|ridlik]].',
	'babel-3' => 'It [[$2|$3]] fan dizze meidogger is [[$1|treflik]].',
	'babel-4' => 'It [[$2|$3]] is benei de [[$1|memmetaal]] fan dizze meidogger.',
	'babel-5' => 'It [[$2|$3]] fan dizze meidogger is [[$1|professional]].',
	'babel-N' => 'It [[$2|$3]] is de [[$1|memmetaal]] fan dizze meidogger.',
);

/** Irish (Gaeilge)
 * @author Alison
 * @author GerardM
 * @author Moilleadóir
 */
$messages['ga'] = array(
	'babel' => 'Eolas Báibil don Úsáideoir',
	'babel-desc' => 'Cruthaíonn sé seo an fheidhm pharsálaí <tt>#babel</tt> a chuireann ar chumas an úsáideora colún a ghiniúint go huathoibríoch i mbosca Báibil agus teimpléid saincheaptha a chur ann.',
	'babel-url' => 'Project:Báibil',
	'babel-autocreate-abort' => "Ní féidir leis d'ainm úsáideora seo a bheith cláraithe mar tá sé in úsáid faoi chatagóir [[$1|Báibil]] a uathchruthú.",
	'babel-autocreate-reason' => 'Ag cruthú sa ghnáthchúrsa leathanach chatagóir [[$1|Báibil]].',
	'babel-autocreate-text-levels' => 'Tá leibhéal scil $1 ar na n-úsáideoirí seo faoin teanga $2.',
	'babel-autocreate-text-main' => 'Tá eolas ar na n-úsáideoirí seo faoin teanga $1.',
	'babel-0' => 'Níl [[$2|$3]] [[$1|ar bith]] ag an t-úsáideoir seo (nó is deacair dó í a thuiscint).',
	'babel-1' => 'Tá [[$1|bun]]-[[$2|$3]] ag an úsáideoir seo.',
	'babel-2' => 'Tá leibhéal [[$1|meánach]] na [[$2|$3]] ag an úsáideoir seo.',
	'babel-3' => 'Tá [[$1|ard]]-[[$2|$3]] ag an úsáideoir seo.',
	'babel-4' => 'Tá [[$2|$3]] [[$1|beagnach dúchasach]] ag an úsáideoir seo.',
	'babel-5' => 'Tá [[$2|$3]] [[$1|gairmiúil]] ag an úsáideoir seo.',
	'babel-N' => 'Tá [[$2|$3]] [[$1|dúchasach]] ag an úsáideoir seo.',
	'babel-0-n' => 'Níl [[$2|Gaeilge]] [[$1|ar bith]] ag an t-úsáideoir seo (nó is deacair dó í a thuiscint).',
	'babel-1-n' => 'Tá [[$1|bun]]-[[$2|Ghaeilge]] ag an úsáideoir seo.',
	'babel-2-n' => 'Tá leibhéal [[$1|meánach]] na [[$2|Gaeilge]] ag an úsáideoir seo.',
	'babel-3-n' => 'Tá [[$1|ard]]-[[$2|Ghaeilge]] ag an úsáideoir seo.',
	'babel-4-n' => 'Tá [[$2|Gaeilge]] [[$1|beagnach dúchasach]] ag an úsáideoir seo.',
	'babel-5-n' => 'Tá [[$2|Gaeilge]] [[$1|gairmiúil]] ag an úsáideoir seo.',
	'babel-N-n' => 'Tá [[$2|Gaeilge]] [[$1|dúchasach]] ag an úsáideoir seo.',
);

/** Gan (贛語)
 * @author Symane
 */
$messages['gan'] = array(
	'babel' => '巴別用戶資料',
	'babel-desc' => '加隻<tt>#babel</tt>處理功能去容許自動產生一隻巴別用戶盒欄，同到含到可自定化嗰模板',
	'babel-url' => 'Project:巴別',
	'babel-autocreate-abort' => '倷特試要求嗰用戶名已經自動係[[$1|Babel]]嗰分類，咁就登記不正。',
	'babel-autocreate-reason' => '自動建立[[$1|Babel]]分類頁。',
	'babel-autocreate-text-levels' => '箇隻分類嗰用戶都有 $2 語言嗰 $1 水平嗰交流能力。',
	'babel-autocreate-text-main' => '箇隻分類嗰用戶都有 $1 語言嗰知識。',
	'babel-0' => '箇隻用戶[[$1|冇滴子]][[$2|$3]]嗰水平（或者好艱難去聽轉佢）。',
	'babel-1' => '箇隻用戶有[[$1|滴把子]]嗰[[$2|$3]]水平。',
	'babel-2' => '箇隻用戶有[[$1|一般子]]嗰[[$2|$3]]水平。',
	'babel-3' => '箇隻用戶有[[$1|蠻靚]]嗰[[$2|$3]]水平。',
	'babel-4' => '箇隻用戶有[[$1|好喫價]]嗰[[$2|$3]]水平。',
	'babel-5' => '箇隻用戶有[[$1|專業]]嗰[[$2|$3]]能力。',
	'babel-N' => '箇隻用戶曉得[[$2|$3]]嗰[[$1|母語]]。',
	'babel-0-n' => '箇隻用戶[[$1|冇滴子]][[$2|贛語]]嗰水平（或者好艱難去聽轉佢）。',
	'babel-1-n' => '箇隻用戶有[[$1|滴把子]]嗰[[$2|贛語]]水平。',
	'babel-2-n' => '箇隻用戶有[[$1|一般子]]嗰[[$2|贛語]]水平。',
	'babel-3-n' => '箇隻用戶有[[$1|蠻靚]]嗰[[$2|贛語]]水平。',
	'babel-4-n' => '箇隻用戶有[[$1|好喫價]]嗰[[$2|贛語]]水平。',
	'babel-5-n' => '箇隻用戶有[[$1|專業]]嗰[[$2|贛語]]能力。',
	'babel-N-n' => '箇隻用戶曉得[[$2|贛語]]嗰[[$1|母語]]。',
);

/** Scottish Gaelic (Gàidhlig)
 * @author Caoimhin
 * @author Sionnach
 * @author Steafan31
 */
$messages['gd'] = array(
	'babel' => 'Fiosrachadh Babel mun neach-cleachdaidh',
	'babel-desc' => 'A’ cur parser function <tt>#babel</tt> ris an duilleig, gus an téid colbh babel a chruthachadh mun neach-cleachdaidh.  Gabhaidh templates sònraichte a chleachdadh.',
	'babel-url' => 'Pròiseact:Babel',
	'babel-autocreate-text-levels' => 'Tha na daoine seo ag innse gu bheil comas ìre $1 aca sa chànan $2.',
	'babel-autocreate-text-main' => 'Tha na daoine seo ag innse gu bheil iad eòlach air a’ chànan $1.',
	'babel-0' => 'Tha an neach-cleachdaidh [[$1|gun eòlas idir]] air [[$2|$3]] (no tha {{GENDER:$4|e|i}} ga tuigsinn air éiginn).',
	'babel-1' => 'Tha comas [[$1|ìre bhunaitich]] aig an neach-cleachdaidh seo air [[$2|$3]].',
	'babel-2' => 'Tha comas [[$1|ìre mheadhanaich]] aig an neach-cleachdaidh seo air [[$2|$3]].',
	'babel-3' => 'Tha comas [[$1|ìre adhartaich]] aig an neach-cleachdaidh seo air [[$2|$3]].',
	'babel-4' => 'Tha comas [[$1|ìre dhùchasaich cha mhór]] aig an neach-cleachdaidh seo air [[$2|$3]].',
	'babel-5' => 'Tha comas [[$1|ìre phroifeiseanta]] aig an neach-cleachdaidh seo air [[$2|$3]].',
	'babel-N' => 'Tha [[$1|tuigse dhùthchasach]] aig an neach-cleachdaidh seo air [[$2|$3]].',
	'babel-0-n' => 'Tha an neach-cleachdaidh seo [[$1|gun eòlas idir]] air [[$2|a’ Ghàidhlig]] (no tha {{GENDER:$4|e|i}} ga tuigsinn air éiginn).',
	'babel-1-n' => 'Tha comas [[$1|ìre bhunaitich]] aig an neach-cleachdaidh seo air [[$2|a’ Ghàidhlig]].',
	'babel-2-n' => 'Tha comas [[$1|ìre mheadhanaich]] aig an neach-cleachdaidh seo air [[$2|a’ Ghàidhlig]].',
	'babel-3-n' => 'Tha comas [[$1|ìre adhartaich]] aig an neach-cleachdaidh seo air [[$2|a’ Ghàidhlig]].',
	'babel-4-n' => 'Tha comas [[$1|ìre dhùthchasaich cha mhór]] aig an neach-cleachdaidh seo air [[$2|a’ Ghàidhlig]].',
	'babel-5-n' => 'Tha comas [[$1|ìre phroifeiseanta]] aig an neach-cleachdaidh seo air [[$2|a’ Ghàidhlig]].',
	'babel-N-n' => 'Tha [[$1|tuigse dhùthchasach]] aig an neach-cleachdaidh seo air [[$2|a’ Ghàidhlig]].',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'babel' => 'Información Babel do usuario',
	'babel-desc' => 'Engade a función analítica <tt>#babel</tt> para permitir a xeración automática dunha caixa de usuario Babel coa posibilidade de incluír modelos personalizados',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'O nome de usuario especificado é usado para a creación automática de categorías [[$1|Babel]], polo que non pode ser rexistrado.',
	'babel-autocreate-reason' => 'Creación automática da categoría [[$1|Babel]].',
	'babel-autocreate-text-levels' => 'Os usuarios que están nesta categoría teñen un nivel $1 de destreza en lingua $2.',
	'babel-autocreate-text-main' => 'Os usuarios desta categoría teñen un alto coñecemento da lingua $1.',
	'babel-0' => 'Este usuario [[$1|non]] ten ningún coñecemento de [[$2|$3]] (ou ten dificultades para entendelo).',
	'babel-1' => 'Este usuario ten un coñecemento [[$1|básico]] de [[$2|$3]].',
	'babel-2' => 'Este usuario ten un coñecemento [[$1|intermedio]] de [[$2|$3]].',
	'babel-3' => 'Este usuario ten un coñecemento [[$1|avanzado]] de [[$2|$3]].',
	'babel-4' => 'Este usuario ten un coñecemento [[$1|similar ao dun nativo]] de [[$2|$3]].',
	'babel-5' => 'Este usuario ten un coñecemento [[$1|profesional]] de [[$2|$3]].',
	'babel-N' => 'Este usuario é un falante [[$1|nativo]] de [[$2|$3]].',
	'babel-0-n' => 'Este usuario [[$1|non]] ten ningún coñecemento de [[$2|galego]] (ou ten dificultades para entendelo).',
	'babel-1-n' => 'Este usuario ten un coñecemento [[$1|básico]] de [[$2|galego]].',
	'babel-2-n' => 'Este usuario ten un coñecemento [[$1|intermedio]] de [[$2|galego]].',
	'babel-3-n' => 'Este usuario ten un coñecemento [[$1|avanzado]] de [[$2|galego]].',
	'babel-4-n' => 'Este usuario ten un coñecemento [[$1|similar ao dun nativo]] de [[$2|galego]].',
	'babel-5-n' => 'Este usuario ten un coñecemento [[$1|profesional]] de [[$2|galego]].',
	'babel-N-n' => 'Este usuario é un falante [[$1|nativo]] de [[$2|galego]].',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 * @author LeighvsOptimvsMaximvs
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'babel' => 'Πληροφορίαι "Βαβὲλ" Χρήστου',
	'babel-desc' => 'Προσθέτει τὴν <tt>#babel</tt> λεξιαναλυτικὴν λειτουργίαν ἐπιτρέπουσαν τὴν αὐτόματην δημιουργίαν στήλης κυτίων χρήστου τινός, ἐχούσης τὴν δυνατότηταν περίληψεως συνήθων προτύπων',
	'babel-url' => 'Project:Βαβέλ',
	'babel-autocreate-abort' => 'Tὸ ὄνομα χρωμένου τὸ καθωρισμένον ὑπἔσοῦ χρήσιμον ἐστὶ ἐν τῇ αὐτομάτῳ ποιήσει κατηγοριῶν [[$1|Βαβὲλ]] ἄρα οὐκ ἔξεστι τούτῳ ἐγγεγραμμένον ἐστίν.',
	'babel-autocreate-reason' => 'Ποιεῖν αύτομάτως δέλτον κατηγοριῶν [[$1|Βαβέλ]].',
	'babel-autocreate-text-levels' => 'Χρώμενοι ἐν τοιαύτῃ τῇ κατηγορίᾳ δηλοῦσι τὴν ἑαυτῶν κλίμακα ἱκανοτητος $1 διὰ τὴν γλῶσσαν $2.',
	'babel-autocreate-text-main' => 'Χρώμενοι ἐν τοιαύτῃ τῇ κατηγορίᾳ δηλοῦσι τὴν ἑαυτῶν γνῶσιν τῆς γλώσσης $1.',
	'babel-0' => 'Ὅδε ὁ χρώμενος [[$1|οὐδὲν]] περὶ τῆς [[$2|$3]] γιγνώσκει (ἢ αὐτὴν μόλις καταλαμβάνει).',
	'babel-1' => 'Ὅδε ὁ χρώμενος [[$1|στοιχειωδὼς]] τὴν [[$2|$3]] χρῆται.',
	'babel-2' => 'Ὅδε ὁ χρώμενος [[$1|μέσως]] τὴν [[$2|$3]] χρῆται.',
	'babel-3' => 'Ὅδε ὁ χρώμενος [[$1|ἀνωτέρως]] τὴν [[$2|$3]] χρῆται.',
	'babel-4' => 'Ὅδε ὁ χρώμενος [[$1|σχεδὸν ὡς μητρικὴν γλῶσσαν]] τὴν [[$2|$3]] ἔχει.',
	'babel-5' => 'Ὅδε ὁ χρώμενος [[$1|ἐπαγγελματικὼς]] τὴν [[$2|$3]] χρῆται.',
	'babel-N' => 'Ὅδε ὁ χρώμενος [[$1|ἰθαγενὴς ὁμιλητὴς]] τῆς [[$2|$3]] ἐστίν.',
	'babel-0-n' => 'Ὅδε ὁ χρώμενος [[$1|οὐδὲν]] περὶ τῆς [[$2|ἀρχαίας ἑλληνικῆς]] γιγνώσκει (ἢ αὐτὴν μόλις καταλαμβάνει).',
	'babel-1-n' => 'Ὅδε ὁ χρώμενος [[$1|στοιχειώδην]] γνῶσιν τῆς [[$2|ἀρχαίας ἑλληνικῆς]] ἔχει.',
	'babel-2-n' => 'Ὅδε ὁ χρώμενος [[$1|μέσην]] γνῶσιν τῆς [[$2|ἀρχαίας ἑλληνικῆς]] ἔχει.',
	'babel-3-n' => 'Ὅδε ὁ χρώμενος [[$1|ἀνωτέραν]] γνῶσιν τῆς [[$2|ἀρχαίας ἑλληνικῆς]] ἔχει.',
	'babel-4-n' => 'Ὅδε ὁ χρώμενος [[$1|σχεδὸν ὡς μητρικὴν γλῶσσαν]] τὴν [[$2|ἀρχαίαν ἑλληνικὴν]] ἔχει.',
	'babel-5-n' => 'Ὅδε ὁ χρώμενος [[$1|ἐπαγγελματικὴν]] γνῶσιν τῆς [[$2|ἀρχαίας ἑλληνικῆς]] ἔχει.',
	'babel-N-n' => 'Ὅδε ὁ χρώμενος [[$1|αὐτόπρεμνον]] αἴσθησιν τῆς [[$2|ἀρχαίας ἑλληνικῆς]] ἔχει.',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 * @author Strommops
 */
$messages['gsw'] = array(
	'babel' => 'Babel-Benutzer-Information',
	'babel-desc' => 'Ergänzt d <tt>#babel</tt>-Parserfunktion fir s automatisch Aalege vu Babel-Benutzerchäschtli-Zyyle mit dr Megligkeit, eigeni Vorlagen yyzbinde',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Dr uusgwählt Benutzername wird fir s automatisch Aalege vu [[$1|Babel]]-Kategorie bruucht un cha nit regischtriert wäre.',
	'babel-autocreate-reason' => 'Automatisch aagleiti [[$1|Babel]]-Kategorie.',
	'babel-autocreate-text-levels' => 'Benutzer in däre Kategorii hän s Chänntnis-Level $1 fir d Sproch $2.',
	'babel-autocreate-text-main' => 'Benutzer in däre Kategorii hän Chänntnis vu dr Sproch $1.',
	'babel-0' => "Dä Benutzer cha [[$1|kei]] [[$2|$3]] (oder verstoht's numme mit größere Schwyrigkeite).",
	'babel-1' => 'Dä Benutzer cha [[$1|e bitz]] [[$2|$3]].',
	'babel-2' => 'Dä Benutzer cha [[$2|$3]] uff [[$1|fortgschrittenem]] Niveau.',
	'babel-3' => 'Dä Benutzer cha [[$1|sehr güet]] [[$2|$3]].',
	'babel-4' => 'Dä Benutzer cha [[$2|$3]] uff em Niveau vo me [[$1|Müetersprochler]].',
	'babel-5' => 'Dä Benutzer cha [[$2|$3]] uff [[$1|professionällem]] Niveau.',
	'babel-N' => 'Dem Benutzer sini [[$1|Müetersproch]] isch [[$2|$3]].',
	'babel-0-n' => 'Dää Benutzer cha [[$1|kei]] [[$2|Alemannisch]] (oder verstoht s nume mit greschte Schwirigkeite).',
	'babel-1-n' => 'Dää Benutzer cha [[$1|e bitzeli]] [[$2|Alemannisch]].',
	'babel-2-n' => 'Dää Benutzer cha [[$2|Alemannisch]] uf [[$1|fortgschrittenem]] Niveau.',
	'babel-3-n' => 'Dää Benutzer cha [[$1|seli guet]] [[$2|Alemannisch]].',
	'babel-4-n' => 'Dää Benutzer cha [[$2|Alemannisch]] [[$1|wie ne Muetterspröchler]].',
	'babel-5-n' => 'Dää Benutzer cha [[$2|Alemannisch]] uf [[$1|professionällem]] Niveau.',
	'babel-N-n' => 'Däm Benutzer syyni [[$1|Muettersproch]] isch [[$2|Alemannisch]].',
);

/** Gujarati (ગુજરાતી)
 * @author Dineshjk
 */
$messages['gu'] = array(
	'babel' => 'બબેલ સબ્ય માહિતી',
	'babel-desc' => 'કસ્ટમ ઢાંચા સહીત, સ્વસંચાલિત બબેલ સભ્યબોકસ કૉલમ બનાવવા માટે <tt>#babel</tt> પાર્સર વિધેય ઉમેરે છે.',
	'babel-url' => 'Project:બબેલ',
	'babel-autocreate-abort' => 'તમે જે સભ્યનામ દર્શાવ્યું છે તે [[$1|બબેલ]] શ્રેણીના સ્વયંભુ પ્રાકટ્ય માટે આરક્ષિત છે અને તે નામ પર નોંધણી શક્ય નથી.',
	'babel-autocreate-reason' => '[[$1|બબેલ]]નું સ્વયંભુ પ્રાકટ્ય થઇ રહ્યું છે.',
	'babel-autocreate-text-levels' => 'આ શ્રેણીના સભ્યોને $2 ભાષામાં $1 જેટલી પ્રવીણતા છે.',
	'babel-autocreate-text-main' => 'આ શ્રેણીના સભ્યો $1 ભાષા જાણે છે.',
	'babel-0' => 'આ સભ્યને [[$2|$3]] ભાષાની [[$1|જરાપણ]] જાણકારી નથી (અથવા મહામુશ્કેલીથી સમજી શકે છે).',
	'babel-1' => 'આ સભ્યને [[$2|$3]]ની  [[$1|પ્રાથમિક]] જાણકારી છે.',
	'babel-2' => 'આ સભ્યને [[$2|$3]]ની [[$1|થોડીક]] જાણકારી છે.',
	'babel-3' => 'આ સભ્યને [[$2|$3]]ની [[$1|ખૂબજ સારી]] જાણકારી છે.',
	'babel-4' => 'આ [[$2|$3]]ની આ સભ્યને [[$1|માતૃભાષી]] જેટલી જાણકારી છે.',
	'babel-5' => 'આ સભ્યને [[$2|$3]] ઉપર [[$1|પ્રભુત્વ]] છે.',
	'babel-N' => '[[$2|$3]] આ સભ્યની  [[$1|માતૃભાષા]] છે.',
	'babel-0-n' => 'આ સભ્યને [[$2|અંગ્રેજી]]ની [[$1|જરાપણ]] જાણકારી નથી (અથવા તે મહામુસીબતે સમજી શકે છે).',
	'babel-1-n' => 'આ સભ્યને [[$2|અંગ્રેજી]]નું [[$1|પ્રાથમિક કક્ષાનું]] જ્ઞાન છે.',
	'babel-2-n' => 'આ સભ્યને [[$2|અંગ્રેજી]]નું [[$1|થોડુંક]] જ્ઞાન છે.',
	'babel-3-n' => 'આ સભ્યને [[$2|અંગ્રેજી]]ની [[$1|ખૂબજ સારી]] જાણકારી છે.',
	'babel-4-n' => '[[$2|અંગ્રેજી]]ની આ સભ્યને [[$1|માતૃભાષી]] જેટલી જાણકારી છે.',
	'babel-5-n' => 'આ સભ્યને [[$2|અંગ્રેજી]] ઉપર [[$1|પ્રભુત્વ]] છે.',
	'babel-N-n' => '[[$2|અંગ્રેજી]] આ સભ્યની [[$1|માતૃભાષા]] છે.',
);

/** Manx (Gaelg)
 * @author Shimmin Beg
 */
$messages['gv'] = array(
	'babel' => 'Fys ymmydeyr Babel',
	'babel-autocreate-abort' => 'Yn ennym ymmydeyr hug shiu stiagh, cha nod shiu goaill eh; ta ymmyd jeant jeh liorish Babel son hene-chroo ronnaghyn.',
	'babel-autocreate-reason' => 'Croo duillag ronney Babel gyn smooinaght.',
	'babel-autocreate-text-levels' => "Ymmydeyryn ayns y ronneys shoh, t'ad cowraghey dy vel schlei $1 oc er $2.",
	'babel-autocreate-text-main' => "Ymmydeyryn ayns y ronney shoh, t'ad cowraghey dy vel $1 ennagh oc.",
	'babel-0' => "Cha nel [[$2|$3]] [[$1|erbee]] ec yn ymmydeyr shoh (ny s'feer doillee da toiggal ee).",
	'babel-1' => 'Ta [[$2|$3]] [[$1|veg]] ec yn ymmydeyr shoh.',
	'babel-2' => 'Ta [[$2|$3]] [[$1|veanagh]] ec yn ymmydeyr shoh.',
	'babel-3' => 'Ta [[$2|$3]] [[$1|vie]] ec yn ymmydeyr shoh.',
	'babel-4' => 'Ta [[$2|$3]] [[$1|feer vie]] ec yn ymmydeyr shoh.',
	'babel-5' => 'Ta [[$2|$3]] [[$1|cheirdey]] ec yn ymmydeyr shoh.',
	'babel-N' => 'Ta [[$2|$3]] [[$1|ghlen]] ec yn ymmydeyr shoh.',
	'babel-0-n' => "Cha nel [[$2|Gaelg]] [[$1|erbee]] ec yn ymmydeyr shoh (ny s'feer doillee da toiggal ee).",
	'babel-1-n' => 'Ta [[$2|Gaelg]] [[$1|veg]] ec yn ymmydeyr shoh.',
	'babel-2-n' => 'Ta [[$2|Gaelg]] [[$1|veanagh]] ec yn ymmydeyr shoh.',
	'babel-3-n' => 'Ta [[$2|Gaelg]] [[$1|vie]] ec yn ymmydeyr shoh.',
	'babel-4-n' => 'Ta [[$2|Gaelg]] [[$1|feer vie]] ec yn ymmydeyr shoh.',
	'babel-5-n' => 'Ta [[$2|Gaelg]] [[$1|cheirdey]] ec yn ymmydeyr shoh.',
	'babel-N-n' => 'Ta [[$2|Gaelg]] [[$1|ghlen]] ec yn ymmydeyr shoh.',
);

/** Hawaiian (Hawai`i)
 * @author Singularity
 */
$messages['haw'] = array(
	'babel' => 'E pili ana i keia mea ho‘ohana ma Babel',
	'babel-desc' => 'Ho‘ohui ‘oia i ka <tt>#babel</tt> hana pāsā e ho‘oku‘u i ka hana hana nona iho o ke kolamu o ka pahu o ka mea ho‘ohana o Babel, me ka hiki e helu i nā anakuhi pilikino',
	'babel-url' => 'Project:Babel',
	'babel-0' => '[[$1|‘A‘ole hiki]] i kēia mea ho‘ohana ke hā‘awi ma ka [[$2|$3]].',
	'babel-1' => 'Hiki i kēia mea ho‘ohana ke hā‘awi me [[$1|kahi kūlana ha‘aha‘a]] ma ka [[$2|$3]].',
	'babel-2' => 'Hiki i kēia mea ho‘ohana ke hā‘awi me [[$1|kahi kūlana o waena]] ma ka [[$2|$3]].',
	'babel-3' => 'Hiki i kēia mea ho‘ohana ke hā‘awi me [[$1|kahi kūlana ki‘eki‘e]] ma ka [[$2|$3]].',
	'babel-4' => 'Hiki i kēia mea ho‘ohana ke hā‘awi me [[$1|kahi kūlana kokoke]] i kō ka mānaleo ma ka [[$2|$3]].',
	'babel-5' => 'Hiki i kēia mea ho‘ohana ke hā‘awi me [[$1|kahi kūlana ‘oihana]] ma ka [[$2|$3]].',
	'babel-N' => 'He [[$1|mānaleo]] kēia kanaka ma ka [[$2|$3]].',
	'babel-0-n' => '[[$1|‘A‘ole hiki]] i kēia mea ho‘ohana ke hā‘awi ma ka [[$2|‘ōlelo Hawai‘i]].',
	'babel-1-n' => 'Hiki i kēia mea ho‘ohana ke hā‘awi me [[$1|kahi kūlana ha‘aha‘a]] ma ka [[$2|‘ōlelo Hawai‘i]].',
	'babel-2-n' => 'Hiki i kēia mea ho‘ohana ke hā‘awi me [[$1|kahi kūlana o waena]] ma ka [[$2|‘ōlelo Hawai‘i]].',
	'babel-3-n' => 'Hiki i kēia mea ho‘ohana ke hā‘awi me [[$1|kahi kūlana ki‘eki‘e]] ma ka [[$2|‘ōlelo Hawai‘i]].',
	'babel-4-n' => 'Hiki i kēia mea ho‘ohana ke hā‘awi me [[$1|kahi kūlana kokoke]] i kō ka mānaleo ma ka [[$2|‘ōlelo Hawai‘i]].',
	'babel-5-n' => 'Hiki i kēia mea ho‘ohana ke hā‘awi me [[$1|kahi kūlana ‘oihana]] ma ka [[$2|‘ōlelo Hawai‘i]].',
	'babel-N-n' => 'He [[$1|mānaleo]] kēia kanaka ma ka [[$2|‘ōlelo Hawai‘i]].',
);

/** Hebrew (עברית)
 * @author Agbad
 * @author GerardM
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'babel' => 'מידע על כישורי שפה של המשתמש',
	'babel-desc' => 'הוספת הוראת התנאי <tt>#babel</tt> כדי לאפשר יצירה אוטומטית של תבניות כישורי שפה, עם אפשרות להכללת תבניות מותאמות אישית',
	'babel-url' => 'Project:כישורי שפה',
	'babel-autocreate-abort' => 'שם המשתמש שציינתם משמש ליצירה אוטומטית של קטגוריות [[$1|כישורי שפה]], ולכן לא ניתן לרשום אותו.',
	'babel-autocreate-reason' => 'יצירה אוטומטית של דף קטגוריה ל[[$1|כישורי שפה]]',
	'babel-autocreate-text-levels' => 'המשתמשים בקטגוריה זו מציינים כי רמת השפה שלהם הינה $1 בשפה ה$2.',
	'babel-autocreate-text-main' => 'המשתמשים בקטגוריה זו מציינים כי יש להם ידע בשפה ה$1.',
	'babel-autocreate-user' => 'יצירה אוטומטית של כישורי שפה',
	'babel-directionality' => 'rtl',
	'babel-0' => 'משתמש זה [[$1|אינו מבין]] [[$2|$3]] (או מבין אותה בקשיים ניכרים).',
	'babel-1' => 'משתמש זה מסוגל לתרום ברמה [[$1|בסיסית]] של [[$2|$3]].',
	'babel-2' => 'משתמש זה מסוגל לתרום ברמה [[$1|בינונית]] של [[$2|$3]].',
	'babel-3' => 'משתמש זה מסוגל לתרום ברמה [[$1|מתקדמת]] של [[$2|$3]].',
	'babel-4' => 'משתמש זה מסוגל לתרום ברמה [[$1|קרובה לשפת אם]] של [[$2|$3]].',
	'babel-5' => 'משתמש זה מסוגל לתרום ברמה [[$1|מקצועית]] של [[$2|$3]].',
	'babel-N' => 'משתמש זה דובר [[$2|$3]] כ[[$1|שפת אם]].',
	'babel-0-n' => 'משתמש זה [[$1|אינו מבין]] [[$2|עברית]] (או מבין אותה בקשיים ניכרים).',
	'babel-1-n' => 'משתמש זה מסוגל לתרום ברמה [[$1|בסיסית]] של [[$2|עברית]].',
	'babel-2-n' => 'משתמש זה מסוגל לתרום ברמה [[$1|בינונית]] של [[$2|עברית]].',
	'babel-3-n' => 'משתמש זה מסוגל לתרום ברמה [[$1|מתקדמת]] של [[$2|עברית]].',
	'babel-4-n' => 'משתמש זה מסוגל לתרום ברמה [[$1|קרובה לשפת אם]] של [[$2|עברית]].',
	'babel-5-n' => 'משתמש זה מסוגל לתרום ברמה [[$1|מקצועית]] של [[$2|עברית]].',
	'babel-N-n' => 'משתמש זה דובר [[$2|עברית]] כ[[$1|שפת אם]].',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 */
$messages['hi'] = array(
	'babel' => 'बाबेल सदस्य ज़ानकारी',
	'babel-desc' => 'एक सदस्यके बाबेल सदस्यबक्से अपनेआप देने के लिय उपयुक्त ऐसी <tt>#babel</tt> पार्सर क्रिया बढाता हैं। इसमें खुद बनायें सदस्यबक्से भी दिये जा सकतें हैं।',
	'babel-url' => 'Project:बाबेल',
	'babel-0' => 'इस सदस्यको [[$2|$3]] का ज्ञान [[$1|नहीं]] हैं। (या समझने के लिये बहुत प्रयास लेने पडते हैं)।',
	'babel-1' => 'इस सदस्यको [[$2|$3]] का [[$1|प्राथमिक]] ज्ञान हैं।',
	'babel-2' => 'इस सदस्यको [[$2|$3]] का [[$1|मध्यम स्तर]] का ज्ञान हैं।',
	'babel-3' => 'इस सदस्यको [[$2|$3]] का [[$1|उच्च स्तर]] का ज्ञान हैं।',
	'babel-4' => 'इस सदस्यको [[$2|$3]] का [[$1|अति-उच्च स्तर]] का ज्ञान हैं।',
	'babel-5' => 'इस सदस्यको [[$2|$3]] का [[$1|व्यावसायिक स्तर]] का ज्ञान है।',
	'babel-N' => 'इस सदस्यको [[$2|$3]] का [[$1|स्थानिक स्तर]] का ज्ञान है।',
	'babel-0-n' => 'इस सदस्यको [[$2|हिन्दी]] का ज्ञान [[$1|नहीं]] हैं। (या समझने के लिये बहुत प्रयास लेने पडते हैं)।',
	'babel-1-n' => 'इस सदस्यको [[$2|हिन्दी]] का [[$1|प्राथमिक]] ज्ञान हैं।',
	'babel-2-n' => 'इस सदस्यको [[$2|हिन्दी]] का [[$1|मध्यम स्तर]] का ज्ञान हैं।',
	'babel-3-n' => 'इस सदस्यको [[$2|हिन्दी]] का [[$1|उच्च स्तर]] का ज्ञान हैं।',
	'babel-4-n' => 'इस सदस्यको [[$2|हिन्दी]] का [[$1|अति-उच्च स्तर]] का ज्ञान हैं।',
	'babel-5-n' => 'इस सदस्यको [[$2|हिन्दी]] का [[$1|व्यावसायिक स्तर]] का ज्ञान है।',
	'babel-N-n' => 'इस सदस्यको [[$2|हिन्दी]] का [[$1|स्थानिक स्तर]] का ज्ञान है।',
);

/** Hiligaynon (Ilonggo)
 * @author Kguirnela
 */
$messages['hil'] = array(
	'babel-0-n' => 'This user has [[$1|no]] knowledge of [[$2|Hiligaynon]] (or understands it with considerable difficulty).',
	'babel-1-n' => 'This user has [[$1|basic]] knowledge of [[$2|Hiligaynon]].',
	'babel-2-n' => 'This user has [[$1|intermediate]] knowledge of [[$2|Hiligaynon]].',
	'babel-3-n' => 'This user has [[$1|advanced]] knowledge of [[$2|Hiligaynon]].',
	'babel-4-n' => 'This user has [[$1|near native speaker]] knowledge of [[$2|Hiligaynon]].',
	'babel-5-n' => 'This user has [[$1|professional]] knowledge of [[$2|Hiligaynon]].',
	'babel-N-n' => 'This user has a [[$1|native]] understanding of [[$2|Hiligaynon]].',
);

/** Croatian (Hrvatski)
 * @author Suradnik13
 */
$messages['hr'] = array(
	'babel' => 'Babel suradničke informacije',
	'babel-desc' => 'Dodaje <tt>#babel</tt> parser funkciju kako bi se omogućilo automatsko generiranje kolumne s babel suradničkim okvirićima s mogućnošću uključivanja vlastitih predložaka',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Suradničko ime koje ste naveli rabi se za samokreiranje kategorije [[$1|babel]] i ne može biti registrirano.',
	'babel-autocreate-reason' => 'Automatsko stvaranje [[$1|babel]] stranice kategorije.',
	'babel-autocreate-text-levels' => 'Suradnici u ovoj kategoriji ukazuju da su na razini vještine $1 za jezik $2.',
	'babel-autocreate-text-main' => 'Suradnici u ovoj kategoriji ukazuju da imaju znanje jezika $1.',
	'babel-0' => 'Ovaj suradnik [[$1|ne]] govori [[$2|$3]] (ili ga slabo poznaje).',
	'babel-1' => 'Ovaj suradnik posjeduje [[$1|osnovno]] znanje [[$2|$3]].',
	'babel-2' => 'Ovaj suradnik ima [[$1|osrednje]] znanje [[$2|$3]].',
	'babel-3' => 'Ovaj suradnik [[$1|napredno]] poznaje [[$2|$3]].',
	'babel-4' => 'Ovaj suradnik poznaje [[$2|$3]] [[$1|gotovo kao izvorni govornik]].',
	'babel-5' => 'Ovaj suradnik posjeduje [[$1|profesionalno]] znanje [[$2|$3]].',
	'babel-N' => 'Ovaj suradnik govori [[$2|$3]] kao [[$1|materinskim jezikom]].',
	'babel-0-n' => 'Ovaj suradnik [[$1|ne]] govori [[$2|hrvatski jezik]] (ili ga slabo poznaje).',
	'babel-1-n' => 'Ovaj suradnik posjeduje [[$1|osnovno]] znanje [[$2|hrvatskog jezika]].',
	'babel-2-n' => 'Ovaj suradnik ima [[$1|osrednje]] znanje [[$2|hrvatskog jezika]].',
	'babel-3-n' => 'Ovaj suradnik [[$1|napredno]] poznaje [[$2|hrvatski jezik]].',
	'babel-4-n' => 'Ovaj suradnik poznaje [[$2|hrvatski jezik]] [[$1|gotovo kao izvorni govornik]].',
	'babel-5-n' => 'Ovaj suradnik posjeduje [[$1|profesionalno]] znanje [[$2|hrvatskog jezika]].',
	'babel-N-n' => 'Ovaj suradnik govori [[$2|hrvatskim]] kao [[$1|materinskim jezikom]].',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'babel' => 'Babelowe wužiwarske informacije',
	'babel-desc' => 'Přidawa parserowu funkciju <tt>#babel</tt> za awtomatiske wutworjenje špalty z babelowymi wužiwarskimi kašćikami, z móžnosću, swójske předłohi zapřijeć',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Podate wužiwarske mjeno wužiwa so za awtomatiske wutworjenje [[$1|Babelowych]] kategorijow a njeda so registrować.',
	'babel-autocreate-reason' => 'Awtomatiske wutworjenje [[$1|Babeloweje]] kategorije.',
	'babel-autocreate-text-levels' => 'Wužiwarjo w tutej kategoriji podawaja, zo maja stopjeń znajomosćow $1 za rěč $2.',
	'babel-autocreate-text-main' => 'Wužiwarjo w tutej kategoriji podawaja, zo maja znajomosće rěče $1.',
	'babel-0' => 'Tutón wužiwar nima [[$1|žane]] znajomosće [[$2|$3]] (abo rozumi ju jenož z wulkimi ćežemi).',
	'babel-1' => 'Tutón wužiwar ma [[$1|zakładne]] znajomosće [[$2|$3]].',
	'babel-2' => 'Tutón wužiwar ma [[$1|přerězne]] znajomosće [[$2|$3]].',
	'babel-3' => 'Tutón wužiwar ma [[$1|pokročene]] znajomosće [[$2|$3]].',
	'babel-4' => 'Tutón wužiwar ma znajomosće [[$2|$3]] na [[$1|maćernorěčnym niwowje]].',
	'babel-5' => 'Tutón wužiwar ma [[$1|profesionelne]] znajomosće [[$2|$3]].',
	'babel-N' => '[[$1|Maćeršćina]] tutoho wužiwarja je [[$2|$3]].',
	'babel-0-n' => 'Tutón wužiwar nima [[$1|žane]] znajomosće [[$2|hornjoserbšćiny]] (abo rozumi ju jenož z wulkimi ćežemi).',
	'babel-1-n' => 'Tutón wužiwar ma [[$1|zakładne]] znajomosće [[$2|hornjoserbšćiny]].',
	'babel-2-n' => 'Tutón wužiwar ma [[$1|přerězne]] znajomosće [[$2|hornjoserbšćiny]].',
	'babel-3-n' => 'Tutón wužiwar ma [[$1|pokročene]] znajomosće [[$2|hornjoserbšćiny]]',
	'babel-4-n' => 'Tutón wužiwar [[$2|hornjoserbšćinu]] kaž [[$1|maćernorěčnik]] wobknježi.',
	'babel-5-n' => 'Tutón wužiwar ma [[$1|profesionelne]] znajomosće [[$2|hornjoserbšćiny]].',
	'babel-N-n' => 'Tutón wužiwar rěči [[$2|hornjoserbšćinu]] jako [[$1|maćeršćinu]].',
);

/** Haitian (Kreyòl ayisyen)
 * @author Masterches
 */
$messages['ht'] = array(
	'babel' => 'Enfòmasyon sou itilizatè Babel',
	'babel-desc' => 'Ap ajoute yon fonksyon pasè <tt>#babel</tt> ki ap pèmèt kreyasyon otomatik de yon bwat itilizatè Babel ak posibilite mete anndan l modèl definisyon lokal, tankou lang itilizatè a pale.',
	'babel-url' => 'Project:Babel',
	'babel-0' => 'Itilizatè sa [[$1|pa genyen]] konesans nan [[$2|$3]] (oubyen li ap konprann ak anpil difikilte).',
	'babel-1' => 'Itilizatè sa genyen [[$1|kèk baz]] nan [[$2|$3]].',
	'babel-2' => 'Itilizatè sa genyen [[$1|yon nivo entèmedyè]] nan [[$2|$3]].',
	'babel-3' => 'Itilizatè sa genyen [[$1|yon nivo avanse]] nan [[$2|$3]].',
	'babel-4' => 'Itilizatè sa pale [[$2|$3]] près tankou l te [[$1|lang matènèl l]].',
	'babel-5' => 'Itilizatè sa genyen [[$1|nivo pwofesyonèl]] nan [[$2|$3]].',
	'babel-N' => 'Itilizatè sa konprann [[$2|$3]] tankou l te [[$1|lang matènèl l]].',
	'babel-0-n' => 'Itilizatè sa [[$1|pa konnen anyen]] nan [[$2|Kreyòl ayisyen]] (oubyen li ap konprann li ak anpil anpil difikilte)',
	'babel-1-n' => 'Itilizatè sa [[$1|konnen kèk baz]] nan [[$2|Kreyòl ayisyen]].',
	'babel-2-n' => 'Itilizatè sa [[$1|genyen bon nivo, entèmedyè]] nan [[$2|Kreyòl ayisyen]].',
	'babel-3-n' => 'Itilizatè sa [[$1|genyen nivo avanse]] nan [[$2|Kreyòl ayisyen]].',
	'babel-4-n' => 'Itilizatè sa pale [[$2|Kreyòl ayisyen]] près tankou li te [[$1|lang matènèl l]].',
	'babel-5-n' => 'Itilizatè sa genyen [[$1|nivo pwofesyonèl]] nan [[$2|Kreyòl ayisyen]].',
	'babel-N-n' => 'Itilizatè sa pale [[$2|Kreyòl ayisyen]] tankou li te [[$1|lang matènèl l]].',
);

/** Hungarian (Magyar)
 * @author Dani
 */
$messages['hu'] = array(
	'babel' => 'Bábel szerkesztői információk',
	'babel-desc' => '<tt>#babel</tt> értelmes függvény bábel-információkat tartalmazó oszlop automatikus generálásához, saját sablononok beillesztésének lehetőségével',
	'babel-url' => 'Project:Bábel',
	'babel-autocreate-abort' => 'Az általad választott név a bábelkategóriák automatikus létrehozásához van használva, így nem lehet regisztrálni.',
	'babel-autocreate-reason' => 'Bábel kategóriaoldal automatikus létrehozása.',
	'babel-autocreate-text-levels' => 'Az ebben a kategóriában szereplő szerkesztők $1 szinten beszélik a(z) $2 nyelvet.',
	'babel-autocreate-text-main' => 'Az ebben a kategóriában szereplő szerkesztők valamilyen szinten beszélik a(z) $1 nyelvet.',
	'babel-0' => 'Ez a szerkesztő [[$1|nem]] beszéli a(z) [[$2|$3]] nyelvet (vagy csak nagy nagyon nehezen érti meg).',
	'babel-1' => 'Ez a szerkesztő [[$1|alapszinten]] beszéli a(z) [[$2|$3]] nyelvet.',
	'babel-2' => 'Ez a szerkesztő [[$1|középszinten]] beszéli a(z) [[$2|$3]] nyelvet.',
	'babel-3' => 'Ez a szerkesztő [[$1|haladó]] szinten beszéli a(z) [[$2|$3]] nyelvet.',
	'babel-4' => 'Ez a szerkesztő [[$1|közel anyanyelvi]] szinten beszéli a(z) [[$2|$3]] nyelvet.',
	'babel-5' => 'Ez a szerkesztő [[$1|professzionális]] szinten beszéli a(z) [[$2|$3]] nyelvet.',
	'babel-N' => 'Ennek a szerkesztőnek [[$2|$3]] az [[$1|anyanyelve]].',
	'babel-0-n' => 'Ez a szerkesztő [[$1|nem]] beszéli a [[$2|magyar]] nyelvet (vagy csak nagy nagyon nehezen érti meg).',
	'babel-1-n' => 'Ez a szerkesztő [[$1|alapszinten]] beszéli a [[$2|magyar]] nyelvet.',
	'babel-2-n' => 'Ez a szerkesztő [[$1|középszinten]] beszéli a [[$2|magyar]] nyelvet.',
	'babel-3-n' => 'Ez a szerkesztő [[$1|haladó]] szinten beszéli a [[$2|magyar]] nyelvet.',
	'babel-4-n' => 'Ez a szerkesztő [[$1|közel anyanyelvi]] szinten beszéli a [[$2|magyar]] nyelvet.',
	'babel-5-n' => 'Ez a szerkesztő [[$1|professzionális]] szinten beszéli a [[$2|magyar]] nyelvet.',
	'babel-N-n' => 'Ennek a szerkesztőnek [[$2|magyar]] az [[$1|anyanyelve]].',
);

/** Armenian (Հայերեն)
 * @author Teak
 * @author Togaed
 */
$messages['hy'] = array(
	'babel' => 'Մասնակցի լեզուների տվյլաները (Բաբելոն)',
	'babel-desc' => 'Ավելացնում է <tt>#babel</tt> պարսեր ֆունկցիան, որը թույլ է տալիս ավտոմատիկ կերպով ստեղծել մասնակցի լեզուների տվյալներով սյունյակ՝ այլ կաղապարների ընդգրկման հնարավորությամբ',
	'babel-url' => 'Project:Բաբելոն',
	'babel-autocreate-abort' => 'Նշված մասնակցի անունը օգտագործվում է Բաբելոն կատեգորիաների ավտոմատիկ ստեղծման համար և չի կարող գրանցվել։',
	'babel-autocreate-reason' => 'Բաբելոն կատեգորիաների էջերի ավտոմատիկ ստեղծում։',
	'babel-autocreate-text-levels' => 'Այս կատեգորիայի մասնակիցները նշել են մակարդակ $1 իմացություն $2 լեզվի համար։',
	'babel-autocreate-text-main' => 'Այս կատեգորիայի մասնակիցները նշել են $1 լեզվի իմացություն։',
	'babel-0' => '[[$2|$3]] — [[$1|չի տիրապետում]] (կամ հասկանում է դժվարությամբ)։',
	'babel-1' => '[[$2|$3]] ― [[$1|սկզբնական իմացություն]]',
	'babel-2' => '[[$2|$3]] — [[$1|միջին իմացություն]]',
	'babel-3' => '[[$2|$3]] — [[$1|լավ իմացություն]]',
	'babel-4' => '[[$2|$3]] — [[$1|համարյա մայրենի իմացություն]]',
	'babel-5' => '[[$2|$3]] — [[$1|մասնագետի իմացություն]]',
	'babel-N' => '[[$2|$3]] — [[$1|մայրենի տիրապետում]]',
	'babel-0-n' => '[[$2|Հայերեն]] — [[$1|չի տիրապետում]] (կամ հասկանում է դժվարությամբ)։',
	'babel-1-n' => '[[$2|Հայերեն]] ― [[$1|սկզբնական իմացություն]]',
	'babel-2-n' => '[[$2|Հայերեն]] — [[$1|միջին իմացություն]]',
	'babel-3-n' => '[[$2|Հայերեն]] — [[$1|լավ իմացություն]]',
	'babel-4-n' => '[[$2|Հայերեն]] — [[$1|համարյա մայրենի իմացություն]]',
	'babel-5-n' => '[[$2|Հայերեն]] — [[$1|մասնագետի իմացություն]]',
	'babel-N-n' => '[[$2|Հայերենը]] այս անձի [[$1|մայրենի լեզուն]] է։',
);

/** Interlingua (Interlingua)
 * @author Malafaya
 * @author McDutchie
 */
$messages['ia'] = array(
	'babel' => 'Informationes Babel del usator',
	'babel-desc' => "Adde le function <tt>#babel</tt> al analysator syntactic, pro permitter le generation automatic de un columna con un quadro de usator 'Babel' con le capacitate de includer patronos personalisate.",
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Le nomine de usator que tu ha specificate es usate pro le creation automatic de categorias [[$1|Babel]] e non pote esser registrate.',
	'babel-autocreate-reason' => 'Le pagina del categoria [[$1|Babel]] ha essite create automaticamente.',
	'babel-autocreate-text-levels' => 'Le usatores in iste categoria declara haber un nivello de cognoscentia $1 del lingua $2.',
	'babel-autocreate-text-main' => 'Le usatores in iste categoria declara haber cognoscentia del lingua $1.',
	'babel-0' => 'Iste usator ha [[$1|nulle]] cognoscentia de [[$2|$3]] (o lo comprende con difficultates considerabile).',
	'babel-1' => 'Iste usator ha cognoscentias [[$1|de base]] de [[$2|$3]].',
	'babel-2' => 'Iste usator ha cognoscentias [[$1|medie]] de [[$2|$3]].',
	'babel-3' => 'Iste usator ha cognoscentias [[$1|avantiate]] de [[$2|$3]].',
	'babel-4' => 'Iste usator ha cognoscentias a nivello [[$1|quasi native]] de [[$2|$3]].',
	'babel-5' => 'Iste usator ha cognoscentias [[$1|professional]] de [[$2|$3]].',
	'babel-N' => 'Iste usator ha cognoscentias a nivello [[$1|native]] de [[$2|$3]].',
	'babel-0-n' => 'Iste usator ha [[$1|nulle]] cognoscentia de [[$2|interlingua]] (o lo comprende con difficultate considerabile).',
	'babel-1-n' => 'Iste usator ha cognoscentias [[$1|de base]] de [[$2|interlingua]].',
	'babel-2-n' => 'Iste usator ha cognoscentias [[$1|medie]] de [[$2|interlingua]].',
	'babel-3-n' => 'Iste usator ha cognoscentias [[$1|avantiate]] de [[$2|interlingua]].',
	'babel-4-n' => 'Iste usator ha cognoscentias a nivello [[$1|quasi native]] de [[$2|interlingua]].',
	'babel-5-n' => 'Iste usator ha cognoscentias [[$1|professional]] de [[$2|interlingua]].',
	'babel-N-n' => 'Iste usator ha cognoscentias a nivello [[$1|native]] de [[$2|interlingua]].',
);

/** Indonesian (Bahasa Indonesia)
 * @author Meursault2004
 * @author Rex
 */
$messages['id'] = array(
	'babel' => 'Informasi Babel Pengguna',
	'babel-desc' => 'Menambahkan fungsi parser <tt>#babel</tt> untuk menampilkan kolom babel kotak pengguna secara otomatis dengan kemampuan menggunakan templat dinamis',
	'babel-url' => 'Project:Babel',
	'babel-0' => 'Pengguna ini [[$1|tidak]] mengerti [[$2|$3]] (atau hanya dengan sangat sulit).',
	'babel-1' => 'Pengguna ini mampu bersumbangsih dengan [[$2|$3]] tingkat [[$1|dasar]].',
	'babel-2' => 'Pengguna ini mampu bersumbangsih dengan [[$2|$3]] tingkat [[$1|menengah]].',
	'babel-3' => 'Pengguna ini mampu bersumbangsih dengan [[$2|$3]] tingkat [[$1|mahir]].',
	'babel-4' => 'Pengguna ini mampu bersumbangsih dengan [[$2|$3]] [[$1|mendekati penutur ibu]].',
	'babel-5' => 'Pengguna ini memiliki pengetahuan [[$1|profesional]] [[$2|$3]].',
	'babel-N' => 'Pengguna ini adalah [[$1|penutur ibu]] [[$2|$3]].',
	'babel-0-n' => 'Pengguna ini [[$1|tidak]] mengerti [[$2|bahasa Inggris]] (atau hanya dengan sangat sulit).',
	'babel-1-n' => 'Pengguna ini mampu bersumbangsih dengan [[$2|bahasa Inggris]] tingkat [[$1|dasar]].',
	'babel-2-n' => 'Pengguna ini mampu bersumbangsih dengan [[$2|bahasa Inggris]] tingkat [[$1|menengah]].',
	'babel-3-n' => 'Pengguna ini mampu bersumbangsih dengan [[$2|bahasa Inggris]] tingkat [[$1|mahir]].',
	'babel-4-n' => 'Pengguna ini mampu bersumbangsih dengan [[$2|bahasa Indonesia]] [[$1|mendekati penutur ibu]].',
	'babel-5-n' => 'Pengguna ini memiliki pengetahuan [[$1|profesional]] [[$2|bahasa Indonesia]].',
	'babel-N-n' => 'Pengguna ini adalah [[$1|penutur ibu]] [[$2|bahasa Indonesia]].',
);

/** Ido (Ido)
 * @author Malafaya
 */
$messages['io'] = array(
	'babel-url' => 'Project:Babel',
	'babel-0' => 'Ca uzanto havas [[$1|nula]] savo pri [[$2|$3]] (o komprenas olu kun kelka desfacileso).',
	'babel-1' => 'Ca uzanto havas [[$1|bazala]] savo pri [[$2|$3]].',
	'babel-2' => 'Ca uzanto havas [[$1|meza]] savo pri [[$2|$3]].',
	'babel-3' => 'Ca uzanto havas [[$1|bona]] savo pri [[$2|$3]].',
	'babel-5' => 'Ca uzanto havas [[$1|profesionala]] savo pri [[$2|$3]].',
);

/** Italian (Italiano)
 * @author Cruccone
 * @author Darth Kule
 * @author Melos
 */
$messages['it'] = array(
	'babel' => 'Babel utente',
	'babel-desc' => 'Aggiunge la parser function <tt>#babel</tt> per permettere la generazione automatica di una colonna box utente babel con la possibilità di includere template personalizzati',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Il nome utente specificato è usato per la creazione automatica di categorie [[$1|Babel]] e non può essere registrato.',
	'babel-autocreate-reason' => 'Creo automaticamente la pagina della categoria [[$1|Babel]].',
	'babel-autocreate-text-levels' => 'Gli utenti in questa categoria indicano che hanno un livello di conoscenza $1 della lingua $2.',
	'babel-autocreate-text-main' => 'Gli utenti in questa categoria indicano che conoscono la lingua $1.',
	'babel-0' => 'Questo utente [[$1|non è in grado di comunicare]] in [[$2|$3]] (o lo capisce solo con notevole difficoltà).',
	'babel-1' => 'Questo utente può contribuire con un un livello [[$1|elementare]] in [[$2|$3]].',
	'babel-2' => 'Questo utente può contribuire con un un livello [[$1|intermedio]] in [[$2|$3]].',
	'babel-3' => 'Questo utente può contribuire con un un livello [[$1|avanzato]] in [[$2|$3]].',
	'babel-4' => 'Questo utente può contribuire con un un livello [[$1|quasi madrelingua]] in [[$2|$3]].',
	'babel-5' => 'Questo utente può contribuire con un un livello [[$1|professionale]] in [[$2|$3]].',
	'babel-N' => 'Questo utente può contribuire con un un livello [[$1|madrelingua]] in [[$2|$3]].',
	'babel-0-n' => 'Questo utente [[$1|non è in grado di comunicare]] in [[$2|italiano]] (o lo capisce solo con notevole difficoltà).',
	'babel-1-n' => 'Questo utente può contribuire con un un livello [[$1|elementare]] in [[$2|italiano]].',
	'babel-2-n' => 'Questo utente può contribuire con un un livello [[$1|intermedio]] in [[$2|italiano]].',
	'babel-3-n' => 'Questo utente può contribuire con un un livello [[$1|avanzato]] in [[$2|italiano]].',
	'babel-4-n' => 'Questo utente può contribuire con un un livello [[$1|quasi madrelingua]] in [[$2|italiano]].',
	'babel-5-n' => 'Questo utente può contribuire con un un livello [[$1|professionale]] in [[$2|italiano]].',
	'babel-N-n' => 'Questo utente può contribuire con un un livello [[$1|madrelingua]] in [[$2|italiano]].',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fryed-peach
 * @author Kwj2772
 * @author Marine-Blue
 */
$messages['ja'] = array(
	'babel' => 'バベル利用者情報',
	'babel-desc' => 'バベル・ユーザーボックスを自動的に生成する関数 <tt>#babel</tt> を追加する',
	'babel-url' => 'Project:バベル',
	'babel-autocreate-abort' => '指定した利用者名は[[$1|バベル]]用カテゴリの自動作成に使用されているため登録できません。',
	'babel-autocreate-reason' => '[[$1|バベル]]用カテゴリのページを自動的に作成しています。',
	'babel-autocreate-text-levels' => 'このカテゴリに属している利用者は$2について$1レベルの能力を有しています。',
	'babel-autocreate-text-main' => 'このカテゴリに属している利用者は$1についての自身の能力について表明しています。',
	'babel-autocreate-user' => 'バベル自動作成係',
	'babel-0' => 'この利用者は[[$2|$3]]が[[$1|わかりません]]（または理解するのがかなり困難です）。',
	'babel-1' => 'この利用者は[[$1|初級]]の[[$2|$3]]ができます。',
	'babel-2' => 'この利用者は[[$1|中級]]の[[$2|$3]]ができます。',
	'babel-3' => 'この利用者は[[$1|上級]]の[[$2|$3]]ができます。',
	'babel-4' => 'この利用者は[[$1|母語話者に近い]][[$2|$3]]の知識を有しています。',
	'babel-5' => 'この利用者は[[$1|専門的な]][[$2|$3]]の知識を有しています。',
	'babel-N' => 'この利用者は[[$2|$3]]を[[$1|母語]]としています。',
	'babel-0-n' => 'この利用者は[[$2|日本語]]が[[$1|わかりません]]（または理解するのがかなり困難です）。',
	'babel-1-n' => 'この利用者は[[$1|初級]]の[[$2|日本語]]ができます。',
	'babel-2-n' => 'この利用者は[[$1|中級]]の[[$2|日本語]]ができます。',
	'babel-3-n' => 'この利用者は[[$1|上級]]の[[$2|日本語]]ができます。',
	'babel-4-n' => 'この利用者は[[$1|母語話者に近い]][[$2|日本語]]の知識を有しています。',
	'babel-5-n' => 'この利用者は[[$1|専門的な]][[$2|日本語]]の知識を有しています。',
	'babel-N-n' => 'この利用者は[[$2|日本語]]を[[$1|母語]]としています。',
);

/** Lojban (Lojban)
 * @author Malafaya
 */
$messages['jbo'] = array(
	'babel-1' => "ti poi prenu cu ka'e cusku je jimpe [[$1|lo sampu]] bau [[$2|la $3]]",
	'babel-1-n' => "ti poi prenu cu ka'e cusku je jimpe [[$1|lo sampu]] bau [[$2|la lojban]]",
);

/** Javanese (Basa Jawa)
 * @author Malafaya
 * @author Meursault2004
 */
$messages['jv'] = array(
	'babel' => 'Informasi Babel Panganggo',
	'babel-desc' => 'Nambahaké fungsi parse <tt>#babel</tt> sing marengaké générasi otomatis kolom kothak panganggo babel mawa kamungkinan nglebokaké cithakan kustomisasi',
	'babel-url' => 'Project:Babel',
	'babel-0' => 'Panganggo iki [[$1|ora]] duwé kawruh [[$2|$3]] (utawa angèl banget mangertèni).',
	'babel-1' => 'Panganggo iki duwé kawruh [[$1|dhasar]] [[$2|$3]].',
	'babel-2' => 'Panganggo iki duwé kawruh [[$1|madya]] [[$2|$3]].',
	'babel-3' => 'Panganggo iki duwé kawruh [[$1|dhuwur]] [[$2|$3]].',
	'babel-4' => 'Panganggo iki duwé kawruh [[$1|sing nyedhaki panutur ibu]] saka [[$2|$3]].',
	'babel-5' => 'Panganggo iki duwé kawruh [[$1|profésional]] [[$2|$3]].',
	'babel-N' => 'Panganggo iki [[$1|panutur ibu]] [[$2|$3]].',
	'babel-0-n' => 'Panganggo iki [[$1|ora]] bisa [[$2|basa Jawa]] (utawa angèl banget mangertèni).',
	'babel-1-n' => 'Panganggo iki duwé kawruh [[$1|dhasar]] [[$2|basa Jawa]].',
	'babel-2-n' => 'Panganggo iki duwé kawruh [[$1|madya]] [[$2|basa Jawa]].',
	'babel-3-n' => 'Panganggo iki duwé kawruh [[$1|dhuwur]] [[$2|basa Jawa]].',
	'babel-4-n' => 'Panganggo iki duwé kawruh [[$1|sing nyedhaki panutur ibu]] saka [[$2|basa Jawa]].',
	'babel-5-n' => 'Panganggo iki duwé kawruh [[$1|profésional]] [[$2|basa Jawa]].',
	'babel-N-n' => 'Panganggo iki [[$1|panutur ibu]] [[$2|basa Jawa]].',
);

/** Georgian (ქართული)
 * @author Malafaya
 * @author Temuri rajavi
 */
$messages['ka'] = array(
	'babel-url' => 'Project:ბაბილონი',
	'babel-0' => 'ამ მომხმარებელს [[$1|არ ესმის]] [[$2|$3]].',
	'babel-1' => 'ამ მომხმარებელს შეუძლია წვლილი შეიტანოს [[$2|$3 ენის]] ცოდნის [[$1|ელემენტარულ]] დონეზე.',
	'babel-2' => 'ამ მომხმარებელს შეუძლია წვლილი შეიტანოს [[$2|$3 ენის]] ცოდნის [[$1|საშუალო]] დონეზე.',
	'babel-3' => 'ამ მომხმარებელს შეუძლია წვლილი შეიტანოს [[$2|$3 ენის]] ცოდნის [[$1|მაღალ]] დონეზე.',
	'babel-4' => 'ამ მომხმარებელმა [[$2|$3 ენა]] იცის [[$1|თითქმის მშობლიური ენის]] დონეზე.',
	'babel-N' => 'ამ მომხმარებლის [[$1|მშობლიური ენა]] არის [[$2|$3]].',
	'babel-0-n' => 'ამ მომხმარებელს [[$1|არ ესმის]] [[$2|ქართული ენა]].',
	'babel-1-n' => 'ამ მომხმარებელს შეუძლია წვლილი შეიტანოს [[$2|ქართული ენის]] ცოდნის [[$1|ელემენტარულ]] დონეზე.',
	'babel-2-n' => 'ამ მომხმარებელს შეუძლია წვლილი შეიტანოს [[$2|ქართული ენის]] ცოდნის [[$1|საშუალო]] დონეზე.',
	'babel-3-n' => 'ამ მომხმარებელს შეუძლია წვლილი შეიტანოს [[$2|ქართული ენის]] ცოდნის [[$1|მაღალ]] დონეზე.',
	'babel-4-n' => 'ამ მომხმარებელმა [[$2|ქართული ენა]] იცის [[$1|თითქმის მშობლიური ენის]] დონეზე.',
	'babel-5-n' => 'ამ მომხმარებელს შეუძლია წვლილი შეიტანოს [[$2|ქართული ენის]] ცოდნის [[$1|პროფესიონალურ]] დონეზე.',
	'babel-N-n' => 'ამ მომხმარებლის [[$1|მშობლიური ენა]] არის [[$2|ქართული]].',
);

/** Kazakh (Cyrillic) (Қазақша (Cyrillic))
 * @author AlefZet
 * @author GaiJin
 */
$messages['kk-cyrl'] = array(
	'babel' => 'Бабыл қатысушы ақпараты',
	'babel-desc' => 'Бабыл пайдаланушылық жолағын өздіктік жарату үшін <tt>#babel</tt> деген құрылымдық талдатқыш жетесін үстейді (бапталған үлгілерді де кірістіру мүмкін)',
	'babel-url' => 'Project:Бабыл',
	'babel-0' => 'Бұл қатысушы [[$2|$3]] [[$1|меңгермейді]] (немесе айтарлықтай қиыншылықпен түсінеді).',
	'babel-1' => 'Бұл қатысушы [[$2|$3]] [[$1|бастапқы деңгейде]] меңгереді.',
	'babel-2' => 'Бұл қатысушы [[$2|$3]] [[$1|аралық деңгейде]] меңгереді',
	'babel-3' => 'Бұл қатысушы [[$2|$3]] [[$1|кәміл деңгейде]] меңгереді.',
	'babel-4' => 'Бұл қатысушы [[$2|$3]] [[$1|ана тіліне жақын деңгейде]] меңгереді.',
	'babel-5' => 'Бұл қатысушы [[$2|$3]] [[$1|кәсіби деңгейде]] меңгереді.',
	'babel-N' => '[[$2|$3]] бұл қатысушының [[$1|ана тілі]] боп саналады.',
	'babel-0-n' => 'Бұл қатысушы [[$2|қазақ тілін]] [[$1|меңгермейді]] (немесе айтарлықтай қиыншылықпен түсінеді).',
	'babel-1-n' => 'Бұл қатысушы [[$2|қазақ тілін]] [[$1|бастапқы деңгейде]] меңгереді.',
	'babel-2-n' => 'Бұл қатысушы [[$2|қазақ тілін]] [[$1|аралық деңгейде]] меңгереді',
	'babel-3-n' => 'Бұл қатысушы [[$2|қазақ тілін]] [[$1|кәміл деңгейде]] меңгереді.',
	'babel-4-n' => 'Бұл қатысушы [[$2|қазақ тілін]] [[$1|ана тіліне жақын деңгейде]] меңгереді.',
	'babel-5-n' => 'Бұл қатысушы [[$2|қазақ тілін]] [[$1|кәсіби деңгейде]] меңгереді.',
	'babel-N-n' => '[[$2|Қазақ тілі]] бұл қатысушының [[$1|ана тілі]] боп саналады.',
);

/** Khmer (ភាសាខ្មែរ)
 * @author GerardM
 * @author Thearith
 * @author គីមស៊្រុន
 * @author វ័ណថារិទ្ធ
 */
$messages['km'] = array(
	'babel' => 'ព័ត៌មាន​អ្នក​ប្រើ​ប្រាស់​ Babel',
	'babel-url' => 'គម្រោង​:Babel',
	'babel-autocreate-reason' => 'កំពុង​បង្កើត​ទំព័រ​ចំណាត់​ថ្នាក់​ក្រុម [[$1|Babel]] ដោយ​ស្វ័យ​ប្រវត្តិ​។​',
	'babel-autocreate-text-levels' => 'អ្នកប្រើប្រាស់​ទាំងឡាយណា ដែល​ស្ថិតនៅក្នុង​ចំណាត់ថ្នាក់ក្រុម​នេះ បញ្ជាក់​ថា​ពួកគេ​មាន​ការយល់ដឹង​កម្រិត​ $1 សម្រាប់​ភាសា $2 ។',
	'babel-autocreate-text-main' => 'អ្នកប្រើប្រាស់​ទាំងឡាយណា ដែល​ស្ថិតនៅក្នុង​ចំណាត់ថ្នាក់ក្រុម​នេះ បញ្ជាក់​ថា​ពួកគេ​ចេះ​និយាយ​​ភាសា $1 ។',
	'babel-0' => 'អ្នកប្រើប្រាស់នេះ[[$1|មិនមាន]]ចំណេះដឹង [[$2|$3]] (ឬយល់បានខ្លះៗទាំងលំបាក)។',
	'babel-1' => 'អ្នកប្រើប្រាស់នេះចេះ [[$2|$3]] [[$1|ថ្នាក់មូលដ្ឋាន]]​។',
	'babel-2' => 'អ្នកប្រើប្រាស់នេះចេះ [[$2|$3]] [[$1|ថ្នាក់មធ្យម]]។',
	'babel-3' => 'អ្នកប្រើប្រាស់នេះចេះ [[$2|$3]] [[$1|ថ្នាក់ខ្ពស់]]​។',
	'babel-4' => 'អ្នកប្រើប្រាស់នេះមានចំណេះដឹង [[$2|$3]] [[$1|ប្រហាក់ប្រហែលជនជាតិខ្មែរ]]។',
	'babel-5' => 'អ្នកប្រើប្រាស់នេះចេះ [[$2|$3]] [[$1|ថ្នាក់អាជីព]]។',
	'babel-N' => 'អ្នកប្រើប្រាស់​នេះ​និយាយ​[[$2|$3]] ជា​[[$1|ភាសាកំណើត]]​។',
	'babel-0-n' => 'អ្នកប្រើប្រាស់នេះ[[$1|មិនចេះ]] (ឬយល់បានខ្លះៗទាំងលំបាក) [[$2|ភាសាខ្មែរ]]ទេ។',
	'babel-1-n' => 'អ្នកប្រើប្រាស់នេះចេះ [[$2|ភាសាខ្មែរ]] [[$1|ថ្នាក់មូលដ្ឋាន]]។',
	'babel-2-n' => 'អ្នកប្រើប្រាស់នេះចេះ [[$2|ភាសាខ្មែរ]] [[$1|ថ្នាក់មធ្យម]]។',
	'babel-3-n' => 'អ្នកប្រើប្រាស់នេះចេះ [[$2|ភាសាខ្មែរ]] [[$1|ថ្នាក់ខ្ពស់]]។',
	'babel-4-n' => 'អ្នកប្រើប្រាស់នេះមានចំណេះដឹង [[$2|ភាសាខ្មែរ]] [[$1|ប្រហាក់ប្រហែលជនជាតិខ្មែរ]]។',
	'babel-5-n' => 'អ្នកប្រើប្រាស់នេះចេះ [[$2|ភាសាខ្មែរ]] [[$1|ថ្នាក់អាជីព]]។',
	'babel-N-n' => 'អ្នកប្រើប្រាស់នេះនិយាយ [[$2|ភាសាខ្មែរ]]ជា[[$1|ភាសាកំណើត]]។',
);

/** Kannada (ಕನ್ನಡ)
 * @author NamwikiTL
 */
$messages['kn'] = array(
	'babel' => 'ಬೇಬಲ್ ಬಳಕೆದಾರರ ಮಾಹಿತಿ',
	'babel-desc' => '<tt>#babel</tt> ಪಾರ್ಸರ್ ಫ೦ಕ್ಷನ್ ಅನ್ನು ಸೇರಿಸುತ್ತೆ ಮತ್ತು ಅದು ಕಸ್ಟಮ್ ಬೇಬಲ್ ಟೆ೦ಪ್ಲೇಟ್ ಗಳಿರುವ ಬೇಬಲ್ ಬಳಕೆದಾರರ ಕಾಲ೦ ಅನ್ನು ಸೇರಿಸಲು ಉಪಯುಕ್ತ',
	'babel-url' => 'ಯೋಜನೆ:ಬೇಬಲ್',
	'babel-directionality' => 'ಎಡದಿ೦ದ ಬಲ',
	'babel-0' => 'ಈ ಬಳಕೆದಾರರಿಗೆ [[$2|$3]] ಬಗ್ಗೆ [[$1|ಶೂನ್ಯ]] ಜ್ನಾನವಿದೆ (ಅಥವಾ ಬಹಳ ಕಷ್ಟಪಟ್ಟು ಇದನ್ನು ಅರ್ಥಮಾಡಿಕೊಳ್ಳುತ್ತಾರೆ)',
	'babel-1' => 'ಈ ಬಳಕೆದಾರರಿಗೆ [[$2|$3]] ಬಗ್ಗೆ [[$1|ಪ್ರಾಥಮಿಕ]] ಜ್ನಾನವಿದೆ',
	'babel-2' => 'ಈ ಬಳಕೆದಾರರಿಗೆ [[$2|$3]] ಬಗ್ಗೆ [[$1|ಮಧ್ಯಮ ಮಟ್ಟದ]] ಜ್ನಾನವಿದೆ',
	'babel-3' => 'ಈ ಬಳಕೆದಾರರಿಗೆ [[$2|$3]] ಬಗ್ಗೆ [[$1|ಉನ್ನತ ಮಟ್ಟದ]] ಜ್ನಾನವಿದೆ',
	'babel-4' => 'ಈ ಬಳಕೆದಾರರಿಗೆ [[$2|$3]] ಬಗ್ಗೆ [[$1|ಮೂಲಭಾಷಿಕರಿಗೆ ಸಮನಾದ]] ಜ್ನಾನವಿದೆ',
	'babel-5' => 'ಈ ಬಳಕೆದಾರರಿಗೆ [[$2|$3]] ಬಗ್ಗೆ [[$1|ವೃತ್ತಿಪರ]] ಜ್ನಾನವಿದೆ',
	'babel-N' => 'ಈ ಬಳಕೆದಾರರಿಗೆ [[$2|$3]] ಬಗ್ಗೆ [[$1|ಮೂಲಭಾಷಿಕರ]] ಜ್ನಾನವಿದೆ',
	'babel-0-n' => 'ಈ ಬಳಕೆದಾರರಿಗೆ [[$2|ಕನ್ನಡ ಭಾಷೆ]] ಬಗ್ಗೆ [[$1|ಶೂನ್ಯ]] ಜ್ನಾನವಿದೆ (ಅಥವಾ ಬಹಳ ಕಷ್ಟಪಟ್ಟು ಅರ್ಥ ಮಾಡಿಕೊಳ್ಳುತ್ತಾರೆ)',
	'babel-1-n' => 'ಈ ಬಳಕೆದಾರರಿಗೆ [[$2|ಕನ್ನಡ ಭಾಷೆ]] ಬಗ್ಗೆ [[$1|ಪ್ರಾಥಮಿಕ]] ಜ್ನಾನವಿದೆ',
	'babel-2-n' => 'ಈ ಬಳಕೆದಾರರಿಗೆ [[$2|ಕನ್ನಡ ಭಾಷೆ]] ಬಗ್ಗೆ [[$1|ಮಧ್ಯಮ ಮಟ್ಟದ]] ಜ್ನಾನವಿದೆ',
	'babel-3-n' => 'ಈ ಬಳಕೆದಾರರಿಗೆ [[$2|ಕನ್ನಡ ಭಾಷೆ]] ಬಗ್ಗೆ [[$1|ಉನ್ನತ ಮಟ್ಟದ]] ಜ್ನಾನವಿದೆ',
	'babel-4-n' => 'ಈ ಬಳಕೆದಾರರಿಗೆ [[$2|ಕನ್ನಡ ಭಾಷೆ]] ಬಗ್ಗೆ [[$1|ಮೂಲಭಾಷಿಕರಿಗೆ ಸಮನಾದ]] ಜ್ನಾನವಿದೆ',
	'babel-5-n' => 'ಈ ಬಳಕೆದಾರರಿಗೆ [[$2|ಕನ್ನಡ ಭಾಷೆ]] ಬಗ್ಗೆ [[$1|ವೃತ್ತಿಪರ]] ಜ್ನಾನವಿದೆ',
	'babel-N-n' => 'ಈ ಬಳಕೆದಾರರಿಗೆ [[$2|ಕನ್ನಡ ಭಾಷೆ]] ಬಗ್ಗೆ [[$1|ಮೂಲಭಾಷಿಕರ]] ಜ್ನಾನವಿದೆ',
);

/** Korean (한국어)
 * @author Kwj2772
 */
$messages['ko'] = array(
	'babel' => '사용자 언어 정보',
	'babel-desc' => '일반 틀을 포함할 수 있는 바벨 유저박스 단을 생성할 수 있도록 <tt>#babel</tt> 파서 기능을 추가',
	'babel-url' => 'Project:바벨',
	'babel-autocreate-abort' => '당신이 입력한 계정 이름은 [[$1|바벨]] 분류 자동 생성을 위해 사용되고 있어서 등록할 수 없습니다.',
	'babel-autocreate-reason' => '[[$1|사용자 언어]] 분류를 자동적으로 생성함',
	'babel-autocreate-text-levels' => '이 분류 안에 있는 사용자는 $2를 $1단계 수준으로 사용할 수 있다는 것을 나타냅니다.',
	'babel-autocreate-text-main' => '이 분류 안에 있는 사용자들은 $1를 사용할 수 있습니다.',
	'babel-0' => '이 사용자는 [[$2|$3]]를 [[$1|모르거나]], 이해하는 데 어려움이 있습니다.',
	'babel-1' => '이 사용자는 [[$2|$3]]를 [[$1|조금]] 할 수 있습니다.',
	'babel-2' => '이 사용자는 [[$2|$3]]를 [[$1|어느 정도]] 할 수 있습니다.',
	'babel-3' => '이 사용자는 [[$2|$3]]를 [[$1|고급 수준]]으로 할 수 있습니다.',
	'babel-4' => '이 사용자는 [[$2|$3]]를 [[$1|모국어에 준하는 수준]]으로 할 수 있습니다.',
	'babel-5' => '이 사용자는 [[$2|$3]]를 [[$1|전문가 수준]]으로 할 수 있습니다.',
	'babel-N' => '이 사용자는 [[$2|$3]]가 [[$1|모국어]]입니다.',
	'babel-0-n' => '이 사용자는 [[$2|한국어]]를 [[$1|모르거나]], 이해하는 데 어려움이 있습니다.',
	'babel-1-n' => '이 사용자는 [[$2|한국어]]를 [[$1|조금]] 할 수 있습니다.',
	'babel-2-n' => '이 사용자는 [[$2|한국어]]를 [[$1|어느 정도]] 할 수 있습니다.',
	'babel-3-n' => '이 사용자는 [[$2|한국어]]를 [[$1|고급 수준]]으로 할 수 있습니다.',
	'babel-4-n' => '이 사용자는 [[$2|한국어]]를 [[$1|모국어에 준하는 수준]]으로 할 수 있습니다.',
	'babel-5-n' => '이 사용자는 [[$2|한국어]]를 [[$1|전문가 수준]]으로 할 수 있습니다.',
	'babel-N-n' => '이 사용자는 [[$2|한국어]]가 [[$1|모국어]]입니다.',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'babel' => '{{GENDER:$4|Dem Medmaacher $4 sing|Dä Metmaacheren $4 ier}} Shprooche-Weße',
	'babel-desc' => 'Brengk de <tt>#babel</tt>-Paaserfongxjohn, womet me automatesch ene Babel-Medmaacher-Kaste opboue kann, un dobeij och selfßjemaate Schabloone nozze kan.',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Dä Metmaachername es ald verjovve för [[$1|Babel]]-{{int:categories}} automattesch aanzelääje, dä kanns De nit han.',
	'babel-autocreate-reason' => 'En automattesch aanjelaate Saachjrupp fum [[$1|Babel]]-Süsteem.',
	'babel-autocreate-text-levels' => 'De Metmaacher un Metmaacherenne en hee dä Saachjrupp han jesaat, se künnte de Shprooch $1 $2.',
	'babel-autocreate-text-main' => 'Metmaacher en hee dä Saachjrupp han jesaat, se künnte vum $1 jet.',
	'babel-0' => '{{GENDER:$4|Dä Medmaacher|Heh di Metmaacheren}} hät [[$1|keij]] Aahnong fon [[$2|$3]], odder fershteijt di Shprooch esu joot wi jaa nit.',
	'babel-1' => '{{GENDER:$4|Dä Medmaacher|Heh di Metmaacheren}} hät [[$1|Jrondlaare]] fon [[$2|$3]] drop.',
	'babel-2' => '{{GENDER:$4|Dä Medmaacher|Heh di Metmaacheren}} kann [[$1|meddeljoot]] met [[$2|$3]] ömjonn.',
	'babel-3' => 'Heh {{GENDER:$4|dä Medmaacher|di Metmaacheren}} kann [[$2|$3]] [[$1|reschtesch joot]].',
	'babel-4' => 'För {{GENDER:$4|dä Medmaacher heh|heh di Metmaacheren}} eß [[$2|$3]] [[$1|bahl wi {{GENDER:$4|sing|de}} Mottershprooch]].',
	'babel-5' => 'Heh {{GENDER:$4|dä Medmaacher|di Metmaacheren}} bruch [[$2|$3]] [[$1|berohflesh]].',
	'babel-N' => 'Heh {{GENDER:$4|däm Medmaacher sing|dä Metmaacheren ier}} [[$1|Mottershprooch]] eß [[$2|$3]].',
	'babel-0-n' => '{{GENDER:$4|Dä Medmaacher heh|Heh di Metmaacheren}} hät [[$1|keij Aahnong]] fon enne [[$2|ripoaresche Shprooch]], odder fershteijt di Shprooche esu joot wi nit.',
	'babel-1-n' => 'Heh {{GENDER:$4|dä Medmaacher|di Metmaacheren}} hät [[$1|Jrondlaare]] fon ennem [[$2|ripoaresch Platt]] drop.',
	'babel-2-n' => '{{GENDER:$4|Dä Medmaacher heh|Heh di Metmaacheren}} kann med_ennem [[$2|ripoaresch Platt]] [[$1|meddeljoot]] ömjonn.',
	'babel-3-n' => '{{GENDER:$4|Dä Medmaacher heh|Heh di Metmaacheren}} kann [[$2|en ripoaresch Shprooch]] [[$1|reschtesch joot]].',
	'babel-4-n' => 'För {{GENDER:$4|dä Medmaacher heh|heh di Metmaacheren}} eß [[$2|e ripoaresch Platt]] [[$1|bahl wi sing Mottershprooch]].',
	'babel-5-n' => 'Heh {{GENDER:$4|dä Medmaacher|di Metmaacheren}} brur_en [[$2|ripoaresche Sproor]]_[[$1|em Berohf]].',
	'babel-N-n' => 'Heh {{GENDER:$4|däm Medmaacher sing|dä Metmaacheren ier}} [[$1|Mottershprooch]] es_en [[$2|ripoaresche Shprooch]].',
);

/** Cornish (Kernewek)
 * @author Kw-Moon
 */
$messages['kw'] = array(
	'babel-0' => '[[$1|Ny wor]] an devnydhyer ma konvedhes [[$2|$3]].',
	'babel-1' => 'An devnydhyer ma a wor skrifa [[$2|$3]] orth nivel [[$1|sempel]].',
	'babel-2' => 'An devnydhyer ma a wor skrifa [[$2|$3]] orth nivel [[$1|kres]].',
	'babel-3' => 'An devnydhyer ma a wor skrifa [[$2|$3]] orth nivel [[$1|avonsys]].',
	'babel-4' => 'An devnydhyer ma a skrif [[$2|$3]] [[$1|ogas hag avel mammyeth]].',
	'babel-5' => 'An devnydhyer ma a wor skrifa [[$2|$3]] orth nivel [[$1|galwesik]].',
	'babel-N' => 'An devnydhyer ma a skrif [[$2|$3]] avel [[$1|mammyeth]].',
	'babel-0-n' => '[[$1|Ny wor]] an devnydhyer ma konvedhes [[$2|Kernewek]].',
	'babel-1-n' => 'An devnydhyer ma a wor skrifa [[$2|Kernewek]] orth nivel [[$1|sempel]].',
	'babel-2-n' => 'An devnydhyer ma a wor skrifa [[$2|Kernewek]] orth nivel [[$1|kres]].',
	'babel-3-n' => 'An devnydhyer ma a wor skrifa [[$2|Kernewek]] orth nivel [[$1|avonsys]].',
	'babel-4-n' => 'An devnydhyer ma a skrif [[$2|Kernewek]] [[$1|ogas hag avel mammyeth]].',
	'babel-5-n' => 'An devnydhyer ma a wor skrifa [[$2|Kernewek]] orth nivel [[$1|galwesik]].',
	'babel-N-n' => 'An devnydhyer ma a skrif [[$2|Kernewek]] avel [[$1|mammyeth]].',
);

/** Latin (Latina)
 * @author SPQRobin
 * @author UV
 */
$messages['la'] = array(
	'babel-autocreate-user' => 'Babel AutoCreator',
	'babel-0-n' => 'Hic usor [[$1|nullo pacto]] aut aegre [[$2|Latinitate]] contribuere potest.',
	'babel-1-n' => 'Hic usor [[$1|simplice]] [[$2|Latinitate]] contribuere potest.',
	'babel-2-n' => 'Hic usor [[$1|media]] [[$2|Latinitate]] contribuere potest.',
	'babel-3-n' => 'Hic usor [[$1|callidissima]] [[$2|Latinitate]] contribuere potest.',
);

/** Ladino (Ladino)
 * @author Purodha
 */
$messages['lad'] = array(
	'babel-url' => 'Project:Babel',
	'babel-0-n' => 'Este usuario [[$1|no entiende]] [[$2|djudeo-espanyol]] <small>(o lo entiende kon muncha difikultad)</small>.',
	'babel-1-n' => 'Este usuario puede kontribuir kon un nivel [[$1|báziko]] de [[$2|djudeo-espanyol]].',
	'babel-2-n' => 'Este usuario puede kontribuir kon un nivel [[$1|intermedio]] de [[$2|djudeo-espanyol]].',
	'babel-3-n' => 'Este usuario puede kontribuir kon un nivel [[$1|avansado]] de [[$2|djudeo-espanyol]].',
	'babel-4-n' => 'Este usuario puede kontribuir kon un nivel [[$1|xx]] de [[$2|djudeo-espanyol]].',
	'babel-N-n' => 'Este usuario es avlante [[$1|nativo]] de [[$2|djudeo-espanyol]].',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'babel' => 'Babel-Benotzer-Informatioun',
	'babel-desc' => "Setzt d'<tt>#babel</tt> Parserfunktioun derbäi, fir déi automatesch Generatioun vun enger Babel-Benotzerbox Kolonn, mat der Méiglechkeet fir ege Schablounen anzebannen",
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => "De Benotzernumm den Dir uginn hutt gëtt fir d'[[$1|Babel]]-Kategorie Automatesch-Maache benotzt a kann net gespäichert ginn.",
	'babel-autocreate-reason' => 'Automatesch eng [[$1|Babel]]-Kategorie-Säit maachen.',
	'babel-autocreate-text-levels' => 'Benotzer an dëser Kategorie ginn un datt si an der Sprooch $2 den Niveau $1 hun.',
	'babel-autocreate-text-main' => 'Benotzer an dëser Kategorie ginn un dat si Kenntnisser vun der Sprooch $1 hun.',
	'babel-autocreate-user' => 'Babel automatesch uleeën',
	'babel-0' => 'Dëse Benotzer huet [[$1|keng]] Kenntnisser vun [[$2|$3]] (oder versteet et just mat grousse Schwieregkeeten).',
	'babel-1' => 'Dëse Benotzer huet [[$1|Grondkenntnisser]] vun [[$2|$3]].',
	'babel-2' => 'Dëse Benotzer huet [[$1|erweidert]] Kenntnisser vun [[$2|$3]].',
	'babel-3' => 'De Benotzer huet [[$1|gaz gudd]] Kenntnisser vun [[$2|$3]].',
	'babel-4' => 'De Bemotzer beherrscht [[$2|$3]] [[$1|bal wéi seng Mammesprooch]].',
	'babel-5' => 'De Benotzer huet [[$1|professionnell]] Kenntnisser vun [[$2|$3]].',
	'babel-N' => 'Dësem Benotzer seng [[$1|Mammesprooch]] ass [[$2|$3]].',
	'babel-0-n' => 'Dëse Benotzer versteet [[$1|kee]] [[$2|Lëtzebuergesch]] (oder versteet et just mat grousse Schwieregkeeten).',
	'babel-1-n' => 'Dëse Benotzer huet [[$1|Grondkenntnisser]] vun der [[$2|Lëtzebuergescher Sprooch]].',
	'babel-2-n' => 'Dëse Benotzer huet [[$1|erweidert]] Kenntnisser vun der [[$2|Lëtzebuergescher Sprooch]].',
	'babel-3-n' => 'Dëse Benotzer huet [[$1|ganz gutt]] [[$2|lëtzebuergesch]] Kenntnisser.',
	'babel-4-n' => 'Dëse Benotzer beherrscht [[$2|Lëtzebuergesch]] [[$1|bal wéi seng Mammesprooch]].',
	'babel-5-n' => 'Dëse Benotzer huet [[$1|professionnell]] Kenntnisser vum [[$2|Lëtzebuergeschen]].',
	'babel-N-n' => 'Dësem Benotzer seng [[$1|Mammesprooch]] ass [[$2|Lëtzebuergesch]].',
);

/** Lingua Franca Nova (Lingua Franca Nova)
 * @author Purodha
 */
$messages['lfn'] = array(
	'babel-url' => 'Project:Babel',
	'babel-0' => 'Esta usor ave [[$1|no capas]] de [[$2|$3]].',
	'babel-1' => 'Esta usor es [[$1|poca capas]] de [[$2|$3]].',
	'babel-2' => 'Esta usor es [[$1|medial capas]] de [[$2|$3]].',
	'babel-3' => 'Esta usor es [[$1|bon capas]] de [[$2|$3]].',
	'babel-4' => 'Esta usor es [[$1|la plu perfeta capas]] de [[$2|$3]].',
	'babel-N' => 'Esta usor ave [[$2|$3]] se [[$1|lingua propre]].',
	'babel-1-n' => 'Esta usor es [[$1|poca capas]] de [[$2|Lingua Franca Nova]].',
	'babel-2-n' => 'Esta usor es [[$1|medial capas]] de [[$2|Lingua Franca Nova]].',
	'babel-3-n' => 'Esta usor es [[$1|bon capas]] de [[$2|Lingua Franca Nova]].',
	'babel-4-n' => 'Esta usor es [[$1|la plu perfeta capas]] de [[$2|Lingua Franca Nova]].',
	'babel-N-n' => 'Esta usor ave [[$2|Lingua Franca Nova]] se [[$1|lingua propre]].',
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 */
$messages['li'] = array(
	'babel' => 'Babel Gebroekersinfermasie',
	'babel-desc' => "Veug de <tt>#babel</tt>-parserfunksie d'rbie óm automatische generasie van 'ne babelgebroekersbóks door te laote gaon mit de meugelikheid óm aangepasdje sjablone in te voge",
	'babel-url' => 'Project:Babel',
	'babel-0' => "Deze gebroeker haet [[$1|gein]] kinnes van 't [[$2|$3]] (of kin 't alikszins 'n bietje begriepe)",
	'babel-1' => "Deze gebroeker bezèt kinnes van 't [[$2|$3]] op [[$1|illementaer huuegdje]].",
	'babel-2' => "Deze gebroeker behieërs 't [[$2|$3]] op [[$1|bazes huuegdje]].",
	'babel-3' => "Deze gebroeker behieërs 't [[$2|$3]] [[$1|good]].",
	'babel-4' => "Deze gebroeker behieërs 't [[$2|$3]] op 'ne huuegdje van [[$1|bekans modertaalwaerdigheid]].",
	'babel-5' => "Deze gebroeker haet 'ne [[$1|perfèsjenieële]] kinnes van 't [[$2|$3]].",
	'babel-N' => "Deze gebroeker behieërs 't [[$2|$3]] op [[$1|modertaal huuegdje]].",
	'babel-0-n' => "Deze gebroeker haet [[$1|gein]] kinnes van 't [[$2|Plat]] (of kin 't alikszins 'n bietje begriepe)",
	'babel-1-n' => "Deze gebroeker bezèt kinnes van 't [[$2|Plat]] op [[$1|illementaer huuegdje]].",
	'babel-2-n' => "Deze gebroeker behieërs 't [[$2|Plat]] op [[$1|bazes huuegdje]].",
	'babel-3-n' => "Deze gebroeker behieërs 't [[$2|Plat]] [[$1|good]].",
	'babel-4-n' => "Deze gebroeker behieërs 't [[$2|Plat]] op 'ne huuegdje van [[$1|bekans modertaalwaerdigheid]].",
	'babel-5-n' => "Deze gebroeker haet 'ne [[$1|perfèsjenieële]] kinnes van 't [[$2|Plat]].",
	'babel-N-n' => "Deze gebroeker behieërs 't [[$2|Plat]] op [[$1|modertaal huuegdje]].",
);

/** Lumbaart (Lumbaart)
 * @author Sprüngli
 */
$messages['lmo'] = array(
	'babel-0' => "Chestu dovratt al gh'a [[$1|mia]] da cognossenza de [[$2|$3]] (o al comprend con considerabla dificultaa)",
	'babel-1' => "Chestu dovratt al gh'a una cognossenza [[$1|basiga]] de [[$2|$3]].",
	'babel-2' => "Chestu dovratt al gh'à una cognossenza [[$1|intermedia]] de [[$2|$3]].",
	'babel-3' => "Chestu dovratt al gh'a una cognossenza [[$1|avanzada]] de [[$2|$3]].",
	'babel-4' => "Chestu dovratt al gh'a una cognossenza [[$1|debòt madrelengua]] de [[$2|$3]].",
	'babel-5' => "Chestu dovratt al gh'a una cognossenza [[$1|professionala]] de [[$2|$3]].",
	'babel-N' => "Chestu dovratt al gh'a una comprension [[$1|madrelengua]] de [[$2|$3]].",
	'babel-0-n' => "Chestu dovratt al gh'a [[$1|miga]] de cognossenza de [[$2|Lombard]] (o al le comprend con considerabla dificultaa).",
	'babel-1-n' => 'Chestu dovratt al una cognossenza [[$1|basiga]] de [[$2|Lombard]].',
);

/** Lingala (Lingála)
 * @author Moyogo
 */
$messages['ln'] = array(
	'babel' => 'Liyébisi Babel ya moto',
	'babel-0' => 'Moto óyo ayébí koloba [[$2|$3]] [[$1|tɛ̂]] (tǒ akokí koyóka na mpási).',
	'babel-1' => 'Moto óyo ayébí koloba [[$2|$3]] [[$1|mwâ mokɛ́]].',
	'babel-2' => 'Moto óyo ayébí koloba [[$2|$3]] [[$1|mokɛ́]].',
	'babel-3' => 'Moto óyo ayébí koloba [[$2|$3]] [[$1|malámu]].',
	'babel-4' => 'Moto óyo ayébí koloba [[$2|$3]] [[$1|malámu mpenza]].',
	'babel-N' => 'Moto óyo ayébí koloba [[$2|$3]] [[$1|bandá mbótama]].',
	'babel-0-n' => 'Moto óyo ayébí koloba [[$2|lingála]] [[$1|tɛ̂]] (tǒ akokí koyóka na mpási).',
	'babel-1-n' => 'Moto óyo ayébí koloba [[$2|lingála]] [[$1|mwâ mokɛ́]].',
	'babel-2-n' => 'Moto óyo ayébí koloba [[$2|lingála]] [[$1|mokɛ́]].',
	'babel-3-n' => 'Moto óyo ayébí koloba [[$2|lingála]] [[$1|malámu]].',
	'babel-4-n' => 'Moto óyo ayébí koloba [[$2|lingála]] [[$1|malámu mpenza]].',
	'babel-N-n' => 'Moto óyo ayébí koloba [[$2|lingála]] [[$1|bandá mbótama]].',
);

/** Lithuanian (Lietuvių)
 * @author Garas
 * @author Homo
 * @author Hugo.arg
 * @author Vpovilaitis
 */
$messages['lt'] = array(
	'babel' => 'Naudotojo informacijos Babelio bokštas',
	'babel-desc' => 'Prideda parserio funkciją <tt>#babel</tt>, leidžiančią automatiškai sudaryti stulpelį su informacija apie kalbas su gailmybe įtraukti kitus šablonus',
	'babel-url' => 'Project:Babelis',
	'babel-autocreate-abort' => 'Nurodytas naudotojo vardas naudojamas automatiškam kategorijos „[[$1|Babel]]“ sudarymui, todėl negali būti užregistruotas',
	'babel-autocreate-reason' => 'Automatiškas kategorijos „[[$1|Babel]]“ puslapio sukūrimas.',
	'babel-autocreate-text-levels' => 'Naudotojai, esantys šioje kategorijoje, yra nurodę kad geba $1 lygiu naudoti $2 kalbą.',
	'babel-autocreate-text-main' => 'Naudotojai, esantys šioje kategorijoje, nurodę, kad supranta $1 kalbą.',
	'babel-0' => 'Šis naudotojas nesupranta [[$2|lietuvių kalbos]] (arba supranta labai ribotai).',
	'babel-1' => 'Šis naudotojas turi [[$2|lietuvių kalbos]] [[$1|pradinio lygio]] žinias.',
	'babel-2' => 'Šis naudotojas turi [[$2|lietuvių kalbos]] [[$1|vidutinio lygio]] žinias.',
	'babel-3' => 'Šis naudotojas turi [[$2|lietuvių kalbos]] [[$1|aukšto lygio]] žinias.',
	'babel-4' => 'Šis vartotojas kalba [[$2|lietuviškai]] beveik taip, lyg ši kalba būtų jo [[$1|gimtoji kalba]]',
	'babel-5' => 'Šis naudotojas kalba [[$2|lietuviškai]] [[$1|ypač gerai]].',
	'babel-N' => 'Šio naudotojo [[$1|gimtoji kalba]] yra [[$2|lietuvių]].',
	'babel-0-n' => 'Šis naudotojas [[$1|negali]] rašyti ir skaityti [[$2|lietuvių]] kalba (arba ją supranta labai sunkiai).',
	'babel-1-n' => 'Šis naudotojas gali rašyti ir skaityti [[$1|pradinio]] lygio [[$2|lietuvių]] kalba',
	'babel-2-n' => 'Šis naudotojas gali rašyti ir skaityti [[$1|vidutinio]] lygio [[$2|lietuvių]] kalba',
	'babel-3-n' => 'Šis naudotojas gali rašyti ir skaityti [[$1|aukšto]] lygio [[$2|lietuvių]] kalba',
	'babel-4-n' => 'Šis naudotojas gali rašyti ir skaityti [[$2|lietuvių]] kalba [[$1|beveik kaip gimtąja]]',
	'babel-5-n' => 'Šis naudotojas gali rašyti ir skaityti [[$1|profesionalia]] [[$2|lietuvių]] kalba',
	'babel-N-n' => 'Šis naudotojas gali rašyti ir skaityti [[$1|gimtąja]] [[$2|lietuvių]] kalba',
);

/** Latvian (Latviešu)
 * @author Yyy
 */
$messages['lv'] = array(
	'babel-0' => 'Šis lietotājs [[$2|$3]] valodu [[$1|neprot]]. (vai saprot ar ievērojamām grūtībām).',
	'babel-1' => 'Šis lietotājs [[$2|$3]] valodu prot [[$1|pamatlīmenī]].',
	'babel-2' => 'Šis lietotājs [[$2|$3]] valodu prot [[$1|vidējā]] līmenī.',
	'babel-3' => 'Šis lietotājs [[$2|$3]] valodu prot [[$1|padziļinātā]] līmenī.',
	'babel-4' => 'Šis lietotājs [[$2|$3]] valodu pārzina [[$1|gandrīz kā dzimto valodu]].',
	'babel-5' => 'Šis lietotājs [[$2|$3]] valodu pārzina [[$1|profesionālā]] līmenī.',
	'babel-N' => 'Šim lietotājam [[$2|$3]] valoda ir [[$1|dzimtā valoda]].',
	'babel-0-n' => 'Šis lietotājs [[$2|Latviešu valodu]] [[$1|neprot]] (vai saprot ar ievērojamām grūtībām).',
	'babel-1-n' => 'Šis lietotājs [[$2|Latviešu valodu]] prot [[$1|pamatlīmenī]].',
	'babel-2-n' => 'Šis lietotājs [[$2|Latviešu valodu]] prot [[$1|vidējā]] līmenī.',
	'babel-3-n' => 'Šis lietotājs [[$2|Latviešu valodu]] prot [[$1|padziļinātā]] līmenī.',
	'babel-4-n' => 'Šis lietotājs [[$2|Latviešu valodu]] pārzina [[$1|gandrīz kā dzimto valodu]].',
	'babel-5-n' => 'Šis lietotājs [[$2|Latviešu valodu]] pārzina [[$1|profesionālā]] līmenī.',
	'babel-N-n' => 'Šim lietotājam [[$2|Latviešu valoda]] ir [[$1|dzimtā valoda]].',
);

/** Literary Chinese (文言)
 * @author Itsmine
 */
$messages['lzh'] = array(
	'babel-0-n' => '此君[[$1|不通]][[$2|文言]]也。',
	'babel-1-n' => '此君[[$1|粗通]][[$2|文言]]也。',
	'babel-2-n' => '此君[[$1|有志]][[$2|文言]]也。',
	'babel-3-n' => '此君[[$1|工於]][[$2|文言]]也。',
	'babel-4-n' => '此君[[$1|出口成文]]，精於[[$2|文言]]之道也。',
	'babel-5-n' => '此君[[$1|下筆如神]]，[[$2|文言]]之道，瞭然於心也。',
	'babel-N-n' => '此君三歲能屬文，[[$2|文言]]無異[[$1|母語]]也。',
);

/** Moksha (Мокшень)
 * @author Khazar II
 */
$messages['mdf'] = array(
	'babel' => 'Вавилонца тиить кяльхнень содаманц колга информацись',
	'babel-desc' => 'Поладсы <tt>#babel</tt> синтаксонь анализаторть функциесь, конань вельде сувафневи  информациень палманць вавилонца тиить кяльхнень содаманц колга ди иля шаблоттне',
	'babel-url' => 'Project:Вавилон',
	'babel-0' => 'Тя тиись [[$1|аф шарьхкоди ]]  [[$2|$3]] (эли шарьхкоди пяк кальдявста).',
	'babel-1' => 'Тя тиись [[$1|аф лама шарьхкоди ]] [[$2|$3]].',
	'babel-2' => 'Тят тиись [[$1|шарьхкоди ]] [[$2|$3]].',
	'babel-3' => 'Тя тиись [[$1|лац содасы]] [[$2|$3]].',
	'babel-4' => 'Тя тиись  [[$1|кода эсь кяль]] содасы [[$2|$3]].',
	'babel-5' => 'Тя тиись  [[$1|кода кялень содайсь]] содасы [[$2|$3]].',
	'babel-N' => 'Тя тиись [[$1|идькспингстонза ]] содасы [[$2|$3]].',
	'babel-0-n' => 'Тя тиись [[$1|аф шарьхкоди ]]  [[$2|мокшекс]].',
	'babel-1-n' => 'Тя тиись [[$1|аф лама шарьхкоди ]] [[$2|мокшекс]].',
	'babel-2-n' => 'Тят тиись машты [[$1| шарьхкодемс ди аф лама корхтамс ]] [[$2|мокшекс]].',
	'babel-3-n' => 'Тя тиись машты [[$1|лац корхтамс ди сёрмадомс ]] [[$2|мокшекс]].',
	'babel-4-n' => 'Тя тиись машты [[$1|кода эсь кяльса]] корхтамс [[$2|мокшекс]].',
	'babel-5-n' => 'Тя тиись машты [[$1|кода кялень содайсь корхтамс ]]  [[$2|мокшекс]].',
	'babel-N-n' => 'Тя тиись [[$1|идькспингстонза корхтай ]]  [[$2|мокшекс]].',
);

/** Malagasy (Malagasy)
 * @author Jagwar
 */
$messages['mg'] = array(
	'babel' => "Fampandrenesana momba ny mpampiasa ny '''Babel'''",
	'babel-desc' => "Manampy ny Parser function <tt>#babel</tt> mampamela ny fanamboarana userbox hoazy. Afaka mampiditra endrika tsy natao tany amin'ny mediawiki ilay izy",
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Ilay anaram-pikambana nampidirinao mba hanao sokajy [[$1|Babel]] hoazy tsy afaka tehirizina',
	'babel-autocreate-reason' => 'Natao hoazy ilay sokajy [[$1|Babel]].',
	'babel-autocreate-text-levels' => "Niteny ny mpikambana anatin'ity sokajy ity fa $1 hono ny lentany amin'ny fiteny $2.",
	'babel-autocreate-text-main' => "Ny mpikambana anatin'ity sokajy ity niteny fa $1 hono ny fahaizany.",
	'babel-0' => '[[$1|Tsy mahay]] miteny [[$2|$3]] ity mpikambana ity (na sarotra aminy no miteny azy).

== Lohateny anankiray ==',
	'babel-1' => 'Ity mpikambana ity dia miteny [[$2|$3]] [[$1|tsotsotra]].',
	'babel-2' => "[[$1|Antonontonony]] ny lenta n'ity mpikambana ity amin'ny teny [[$2|$3]].",
	'babel-3' => "Ity mpikambana ity dia [[$1|havanana]] amin'ny teny [[$2|$3]].",
	'babel-4' => "Ity mpikambana ity dia miteny [[$2|$3]] [[$1|mira-lenta amin'ny tenin-dreniny]].",
	'babel-5' => 'Ity mpikambana ity dia miteny [[$2|$3]] [[$1|ara-asa]].',
	'babel-N' => "Ny teny [[$2|$3]] no [[$1|tenim-pirenena nahabe]] an'ity mpikambana ity.",
	'babel-0-n' => 'Ity mpikambana ity dia [[$1|tsy mahay]] miteny [[$2|malagasy]] (na sarotra aminy no miteny azy).',
	'babel-1-n' => 'Ity mpikambana ity dia miteny [[$2|malagasy]] [[$1|tsotsotra]].',
	'babel-2-n' => 'Ity mpikambana ity dia miteny [[$2|Malagasy]] [[$1|antonontonony]].',
	'babel-3-n' => "Ity mpikambana ity dia [[$1|havanana]] amin'ny teny [[$2|frantsay]].",
	'babel-4-n' => "Ity mpikambana ity dia miteny [[$2|malagasy]] [[$1|mira-lenta amin'ny tenin-dreniny]].",
	'babel-5-n' => 'Ity mpikambana ity dia miteny [[$2|malagasy]] [[$1|ara-asa]]',
	'babel-N-n' => "Ny teny [[$2|malagasy]] no [[$1|tenim-pirenena nahabe]] an'ity mpikambana ity.",
);

/** Eastern Mari (Олык Марий)
 * @author Сай
 */
$messages['mhr'] = array(
	'babel-N' => 'Тиде пайдаланыше лан [[$2|$3]] — [[$1|шочмо]] йылме улеш.',
);

/** Macedonian (Македонски)
 * @author Brest
 * @author INkubusse
 */
$messages['mk'] = array(
	'babel' => 'Кориснички информации за јазици',
	'babel-desc' => 'Ја додава парсер функцијата <tt>#babel</tt> со што се дозволува автоматизирано генерирање на колони со кориснички кутии од типот „Вавилон“, со можноста да се додаваат сопствени шаблони',
	'babel-url' => 'Project:Вавилон',
	'babel-autocreate-abort' => 'Корисничкото име кое го наведовте се користи за [[$1|Babel]] категорија која автоматски се креира и не може да се регистрирате под тоа име.',
	'babel-autocreate-reason' => 'Автоматско креирање на [[$1|Babel]] категорија.',
	'babel-autocreate-text-levels' => 'Корисниците во оваа категорија навеле дека имаат $1 ниво на познавање на $2 јазик.',
	'babel-autocreate-text-main' => 'Корисниците во оваа категорија навеле дека имаат познавање на $1 јазик.',
	'babel-autocreate-user' => 'Babel AutoCreate',
	'babel-directionality' => 'ltr',
	'babel-0' => 'Овој корисник [[$1|не]] разбира [[$2|$3]] (или разбира со значајни тешкотии).',
	'babel-1' => 'Овој корисник разбира [[$2|$3]] на [[$1|основно]] ниво.',
	'babel-2' => 'Овој корисник разбира [[$2|$3]] на [[$1|средно]] ниво.',
	'babel-3' => 'Овој корисник разбира [[$2|$3]] на [[$1|напредно]] ниво.',
	'babel-4' => 'Овој корисник разбира [[$2|$3]] речиси како [[$1|мајчин јазик]].',
	'babel-5' => 'Овој корисник разбира [[$2|$3]] на [[$1|професионално]] ниво.',
	'babel-N' => 'Овој корисник зборува [[$2|$3]] како [[$1|мајчин јазик]].',
	'babel-0-n' => 'Овој корисник [[$1|не]] разбира [[$2|македонски]] (или разбира со значајни тешкотии).',
	'babel-1-n' => 'Овој корисник разбира [[$2|македонски]] на [[$1|основно]] ниво.',
	'babel-2-n' => 'Овој корисник разбира [[$2|македонски]] на [[$1|средно]] ниво.',
	'babel-3-n' => 'Овој корисник разбира [[$2|македонски]] на [[$1|напредно]] ниво.',
	'babel-4-n' => 'Овој корисник разбира [[$2|македонски]] речиси како [[$1|мајчин јазик]].',
	'babel-5-n' => 'Овој корисник разбира [[$2|македонски]] на [[$1|професионално]] ниво.',
	'babel-N-n' => 'Овој корисник зборува [[$2|македонски]] како [[$1|мајчин јазик]].',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'babel' => 'ഉപയോക്താവിന്റെ ബാബേല്‍ വിവരണം',
	'babel-desc' => '<tt>#babel</tt> എന്ന പാര്‍സര്‍ ഫങ്ഷന്‍ ചേര്‍ക്കുന്നു. ഇതു ബാബേല്‍ യൂസര്‍ ബോക്സ് കോളത്തിന്റെ യാന്ത്രികമായ രൂപീകരണത്തിനും കസ്റ്റം ഫലകങ്ങള്‍ ഉള്‍പ്പെടുത്തുവാനും സഹായകരമാകുന്നു.',
	'babel-url' => 'Project:ബാബേല്‍',
	'babel-0' => 'ഈ ഉപയോക്താവിനു [[$2|$3]] [[$1|ഒട്ടുമേ അറിയില്ല]] (അല്ലെങ്കില്‍ വളരെ ബുദ്ധിമുട്ടോടെ മനസ്സിലാക്കാന്‍ സാധിക്കും).',
	'babel-1' => 'ഈ ഉപയോക്താവിനു [[$2|$3യില്‍]] [[$1|അടിസ്ഥാനജ്ഞാനം മാത്രമേ ഉള്ളൂ]].',
	'babel-2' => 'ഈ ഉപയോക്താവിനു [[$2|$3]] എന്ന ഭാഷയില്‍ [[$1|സാമാന്യ]] ജ്ഞാനമുണ്ട്.',
	'babel-3' => 'ഈ ഉപയോക്താവിനു [[$2|$3]] എന്ന ഭാഷയില്‍ [[$1|ഉന്നത]] ജ്ഞാനമുണ്ട്.',
	'babel-4' => 'ഈ ഉപയോക്താവ് [[$2|$3]] എന്ന ഭാഷയില്‍ പ്രസ്തുത ഭാഷ [[$1|മാതൃഭാഷയായിട്ടുള്ളവര്‍ക്കുള്ള]] ജ്ഞാനമുണ്ട്.',
	'babel-5' => 'ഈ ഉപയോക്താവിനു [[$2|$3]] എന്ന ഭാഷയില്‍ [[$1|പണ്ഡിതസമാനമായ]] ജ്ഞാനമുണ്ട്.',
	'babel-N' => 'ഈ ഉപയോക്താവിനു [[$2|$3]] എന്ന ഭാഷയില്‍ പ്രസ്തുത ഭാഷ [[$1|മാതൃഭാഷയായിട്ടുപയോഗിക്കുന്നവര്‍ക്ക്]] സമാനമായുള്ള ജ്ഞാനമുണ്ട്.',
	'babel-0-n' => 'ഈ ഉപയോക്താവിനു [[$2|മലയാള ഭാഷയില്‍]] ഒട്ടുമേ അറിവ് [[$1|ഇല്ല]] (അല്ലെങ്കില്‍ മലയാളം വളരെ ബുദ്ധിമുട്ടിയാണു മനസ്സിലാക്കിയെടുക്കുന്നത്)',
	'babel-1-n' => 'ഈ ഉപയോക്താവിനു [[$2|മലയാള ഭാഷയില്‍]] [[$1|അടിസ്ഥാനപരമായ]] ജ്ഞാനമുണ്ട്.',
	'babel-2-n' => 'ഈ ഉപയോക്താവിനു [[$2|മലയാള ഭാഷയില്‍]] [[$1|സാമാന്യം]] ജ്ഞാനമുണ്ട്.',
	'babel-3-n' => 'ഈ ഉപയോക്താവിനു [[$2|മലയാള ഭാഷയില്‍]] [[$1|ഉന്നത നിലവാരത്തിലുള്ള]] ജ്ഞാനമുണ്ട്.',
	'babel-4-n' => 'ഈ ഉപയോക്താവിനു [[$2|മലയാള ഭാഷയില്‍]] പ്രസ്തുത ഭാഷ [[$1|മാതൃഭാഷയായിട്ടുപയോഗിക്കുന്നവര്‍ക്കു]] സമാനമായുള്ള ജ്ഞാനമുണ്ട്.',
	'babel-5-n' => 'ഈ ഉപയോക്താവിനു [[$2|മലയാള ഭാഷയില്‍]] [[$1|പണ്ഡിത]] സമാനമായുള്ള ജ്ഞാനമുണ്ട്.',
	'babel-N-n' => 'ഈ ഉപയോക്താവിനു [[$2|മലയാള ഭാഷയില്‍]] പ്രസ്തുത ഭാഷ [[$1|മാതൃഭാഷാ]] സമാനമായുള്ള ജ്ഞാനമുണ്ട്.',
);

/** Marathi (मराठी)
 * @author Kaustubh
 */
$messages['mr'] = array(
	'babel' => 'बाबेल सदस्य माहिती',
	'babel-desc' => 'एखाद्या सदस्याच्या बाबेल सदस्यपेट्या आपोआप देण्यासाठी उपयुक्त अशी <tt>#babel</tt> पार्सर क्रिया वाढवितो. यामध्ये स्वत: निर्माण केलेले सदस्य साचे सुद्धा देता येतात.',
	'babel-url' => 'Project:बाबेल',
	'babel-0' => 'या सदस्याला [[$2|$3]] चे ज्ञान [[$1|नाही]] (किंवा समजण्यासाठी खूप कष्ट पडतात).',
	'babel-1' => 'या सदस्याला [[$2|$3]] चे [[$1|प्राथमिक]] ज्ञान आहे.',
	'babel-2' => 'या सदस्याला [[$2|$3]] चे [[$1|मध्यम स्तराचे]] ज्ञान आहे.',
	'babel-3' => 'या सदस्याला [[$2|$3]] चे [[$1|उच्च स्तराचे]] ज्ञान आहे.',
	'babel-4' => 'या सदस्याला [[$2|$3]] चे [[$1|अति उच्च स्तराचे]] ज्ञान आहे.',
	'babel-5' => 'या सदस्याला [[$2|$3]] चे [[$1|व्यावसायिक स्तराचे]] ज्ञान आहे.',
	'babel-N' => 'या सदस्याला [[$2|$3]] चे [[$1|स्थानिक स्तराचे]] ज्ञान आहे.',
	'babel-0-n' => 'या सदस्याला [[$2|मराठी]] चे ज्ञान [[$1|नाही]] (किंवा समजण्यासाठी खूप कष्ट पडतात).',
	'babel-1-n' => 'या सदस्याला [[$2|मराठी]] चे [[$1|प्राथमिक]] ज्ञान आहे.',
	'babel-2-n' => 'या सदस्याला [[$2|मराठी]] चे [[$1|मध्यम स्तराचे]] ज्ञान आहे.',
	'babel-3-n' => 'या सदस्याला [[$2|मराठी]] चे [[$1|उच्च स्तराचे]] ज्ञान आहे.',
	'babel-4-n' => 'या सदस्याला [[$2|मराठी]] चे [[$1|अति उच्च स्तराचे]] ज्ञान आहे.',
	'babel-5-n' => 'या सदस्याला [[$2|मराठी]] चे [[$1|व्यावसायिक स्तराचे]] ज्ञान आहे.',
	'babel-N-n' => 'या सदस्याला [[$2|मराठी]] चे [[$1|स्थानिक स्तराचे]] ज्ञान आहे.',
);

/** Malay (Bahasa Melayu)
 * @author Aviator
 * @author Kurniasan
 */
$messages['ms'] = array(
	'babel' => 'Maklumat bahasa pengguna',
	'babel-desc' => 'Menambah fungsi penghurai <tt>#babel</tt> untuk membolehkan penjanaan automatik kotak bahasa pengguna dan tempahan templat',
	'babel-url' => 'Project:Bahasa',
	'babel-autocreate-abort' => 'Nama pengguna yang anda nyatakan telah ditempah untuk penciptaan automatik kategori [[$1|Bahasa]] dan tidak boleh didaftarkan.',
	'babel-autocreate-reason' => 'Mencipta laman kategori [[$1|Bahasa]] secara automatik.',
	'babel-autocreate-text-levels' => 'Pengguna yang tergolong dalam kategori ini mengisyaratkan bahawa mereka memiliki kemahiran aras $1 dalam bahasa $2.',
	'babel-autocreate-text-main' => 'Pengguna yang tergolong dalam kategori ini mengisyaratkan bahawa mereka memiliki pengetahuan dalam bahasa $1.',
	'babel-0' => 'Pengguna ini [[$1|tidak mampu]] bertutur dalam (atau sukar memahami) [[$2|$3]].',
	'babel-1' => 'Pengguna ini memiliki kemahiran [[$1|asas]] dalam [[$2|$3]].',
	'babel-2' => 'Pengguna ini memiliki kemahiran [[$1|sederhana]] dalam [[$2|$3]].',
	'babel-3' => 'Pengguna ini memiliki kemahiran [[$1|tinggi]] dalam [[$2|$3]].',
	'babel-4' => 'Pengguna ini memiliki kemahiran [[$1|hampir sempurna]] dalam [[$2|$3]].',
	'babel-5' => 'Pengguna ini memiliki kemahiran [[$1|profesional]] dalam [[$2|$3]].',
	'babel-N' => 'Pengguna ini adalah penutur [[$1|asli]] [[$2|$3]].',
	'babel-0-n' => 'Pengguna ini [[$1|tidak mampu]] bertutur dalam (atau sukar memahami) [[$2|bahasa Melayu]].',
	'babel-1-n' => 'Pengguna ini memiliki kemahiran [[$1|asas]] dalam [[$2|bahasa Melayu]].',
	'babel-2-n' => 'Pengguna ini memiliki kemahiran [[$1|sederhana]] dalam [[$2|bahasa Melayu]].',
	'babel-3-n' => 'Pengguna ini memiliki kemahiran [[$1|tinggi]] dalam [[$2|bahasa Melayu]].',
	'babel-4-n' => 'Pengguna ini memiliki kemahiran [[$1|hampir sempurna]] dalam [[$2|bahasa Melayu]].',
	'babel-5-n' => 'Pengguna ini memiliki kemahiran [[$1|profesional]] dalam [[$2|bahasa Melayu]].',
	'babel-N-n' => 'Pengguna ini adalah penutur [[$1|asli]] [[$2|bahasa Melayu]].',
);

/** Mirandese (Mirandés)
 * @author Cecílio
 */
$messages['mwl'] = array(
	'babel' => 'Anformaçon Babel de Outelizador',
	'babel-desc' => 'Ajunta la funçon de l analisador parser <tt>#babel</tt> pa premitir la criaçon outomatica dua coluna de caixas de outelizador babel cula possiblidade de ancluir modelos pessonalizadas',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'L nome de outelizador que deziste ye ousado pula criaçon outomática de catadories [[$1|Babel]] i, por esso, nun puode ser registrado.',
	'babel-autocreate-reason' => 'A criar outomaticamiente la páigina de la catadorie [[$1|Babel]].',
	'babel-autocreate-text-levels' => 'Ls outelizadores nesta catadorie dízen que ténen un nible de coincimiento $1 na lhéngua $2.',
	'babel-autocreate-text-main' => 'Ls outelizadores nesta catadorie dízen que ténen coincimientos de la lhéngua $1.',
	'babel-0' => '{{GENDER:$4|Este outelizador|Esta outelizadora}} [[$1|nun antende]] [[$2|$3]] (ó antende cun muitas deficuldades).',
	'babel-1' => '{{GENDER:$4|Este outelizador|Esta outelizadora}} puode ajudar cun un nible [[$1|básico]] de [[$2|$3]].',
	'babel-2' => '{{GENDER:$4|Este outelizador|Esta outelizadora}} puode ajudar cun un nible [[$1|médio]] de [[$2|$3]].',
	'babel-3' => '{{GENDER:$4|Este outelizador|Esta outelizadora}} puode ajudar cun un nible [[$1|abançado]] de [[$2|$3]].',
	'babel-4' => '{{GENDER:$4|Este outelizador|Esta outelizadora}} puode ajudar cun un nible [[$1|quaijeque cumo de quien l mamou a la nacença]] de [[$2|$3]].',
	'babel-5' => '{{GENDER:$4|Este outelizador|Esta outelizadora}} puode ajudar cun un nible [[$1|porfissional]] de [[$2|$3]].',
	'babel-N' => '{{GENDER:$4|Este outelizador|Esta outelizadora}} ten cumo lhéngua [[$1|de nacença]] l [[$2|$3]].',
	'babel-0-n' => '{{GENDER:$4|Este outelizador|Esta outelizadora}} [[$1|nun antende]] [[$2|Mirandés]] (ó antende cun algun custo).',
	'babel-1-n' => '{{GENDER:$4|Este outelizador|Esta outelizadora}} puode ajudar cun un nible [[$1|básico]] de [[$2|mirandés]].',
	'babel-2-n' => '{{GENDER:$4|Este outelizador|Esta outelizadora}} puode ajudar cun un nible [[$1|médio]] de [[$2|mirandés]].',
	'babel-3-n' => '{{GENDER:$4|Este outelizador|Esta outelizadora}} puode ajudar cun un nible [[$1|abançado]] de [[$2|mirandés]].',
	'babel-4-n' => '{{GENDER:$4|Este outelizador|Esta outelizadora}} puode ajudar cun un nible [[$1|quaijeque cumo de quien l mamou a la nacença]] de [[$2|mirandés]].',
	'babel-5-n' => '{{GENDER:$4|Este outelizador|Esta outelizadora}} puode ajudar cun un nible [[$1|porfissional]] de [[$2|mirandés]].',
	'babel-N-n' => '{{GENDER:$4|Este outelizador|Esta outelizadora}} ten cumo lhéngua [[$1|de nacença]] l [[$2|mirandés]].',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'babel' => 'Вавилононь тевс нолдыця ломанень келень содамочыде информация',
	'babel-desc' => 'Поладсы <tt>#babel</tt> парсерэнь функциянть, конань вельде совавтови теицянь вавилон уминес келень содамочыде информация ды лия лопа парцунт (шаблонт).',
	'babel-url' => 'Project:Вавилон',
	'babel-0' => 'Те ломансь [[$1|а чарькоди ]] [[$2|$3]]кс (эли пек стакасто чарькоди сонзэ).',
	'babel-1' => 'Те ломансь [[$1|аламошка чарькоди]]  [[$2|$3]]кс.',
	'babel-2' => 'Те ломансь [[$1|чарькоди ]] [[$2|$3]]-кс.',
	'babel-3' => 'Те ломансь [[$1|парсте содасы]] [[$2|$3]]-нь келенть.',
	'babel-4' => 'Те ломансь чарькоди [[$2|$3]]-кс [[$1|малав кода тиринь келень кортыця]].',
	'babel-5' => 'Те ломансь чарькоди [[$2|$3]]-нть [[$1|кода эйне паро кортыця-професионал]].',
	'babel-N' => 'Те ломаненть [[$1|тиринь келезэ ]] [[$2|$3]].',
	'babel-0-n' => 'Те ломансь [[$1|а чарькоди ]]  [[$2|эрзякс]] (эли пек стакасто чарькоди сонзэ).',
	'babel-1-n' => 'Те ломансь [[$1|аламошка чарькоди ]] [[$2|эрзякс]].',
	'babel-2-n' => 'Те ломансь [[$1|чарькоди ]] [[$2|Эрзякс]].',
	'babel-3-n' => 'Те ломансь [[$1|парсте содасы]] [[$2|эрзя]]-нь келенть.',
	'babel-4-n' => 'Те ломансь чарькоди [[$2|эрзя]]-кс [[$1|малав кода тиринь келень кортыця]].',
	'babel-5-n' => 'Те ломансь чарькоди [[$2|эрзя]]-кс [[$1|кода эйне паро кортыця-професионал]].',
	'babel-N-n' => 'Те ломаненть [[$1|тиринь келезэ ]] [[$2|эрзя]].',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 * @author Purodha
 */
$messages['nah'] = array(
	'babel' => 'Babel tlatēquitiltilīllanōnōtzaliztli',
	'babel-0' => 'Inīn tlatequitiltilīlli [[$1|ahmo huelīti]] quitlahtoa [[$2|$3]] (nozo monequi quitlahtoa).',
	'babel-1' => 'Inīn tlatequitiltilīlli quipiya āxcāyōtl [[$1|monequi]] ic [[$2|$3]].',
	'babel-2' => 'Inīn tlatequitiltilīlli [[$1|tepitzin]] quitlahtoa [[$2|$3]].',
	'babel-3' => 'Inīn tlatequitiltilīlli [[$1|cualli]] quitlahtoa [[$2|$3]].',
	'babel-4' => 'Inīn tlatequitiltilīlli quitlahtoa [[$2|$3]] iuh [[$1|tlācatlahtohqui]].',
	'babel-5' => 'Inīn tlatequitiltilīlli [[$1|huēyi cualtzin]] quitlahtoa [[$2|$3]].',
	'babel-N' => 'Inīn tlatequitiltilīlli cah [[$2|$3]] [[$1|tlācatlahtohqui]].',
	'babel-0-n' => 'Inīn tlatequitiltilīlli [[$1|ahmo huelīti]] quitlahtoa [[$2|Nāhuatlahtōlli]] (nozo monequi quitlahtoa).',
	'babel-1-n' => 'Inīn tlatequitiltilīlli quipiya āxcāyōtl [[$1|monequi]] ic [[$2|Nāhuatlahtōlli]].',
	'babel-2-n' => 'Inīn tlatequitiltilīlli [[$1|tepitzin]] quitlahtoa [[$2|Nāhuatlahtōlli]].',
	'babel-3-n' => 'Inīn tlatequitiltilīlli [[$1|cualli]] quitlahtoa [[$2|Nāhuatlahtōlli]].',
	'babel-4-n' => 'Inīn tlatequitiltilīlli quitlahtoa [[$2|Nāhuatlahtōlli]] iuh [[$1|tlācatlahtohqui]].',
	'babel-5-n' => 'Inīn tlatequitiltilīlli [[$1|huēyi cualtzin]] quitlahtoa [[$2|Nāhuatlahtōlli]].',
	'babel-N-n' => 'Inīn tlatequitiltilīlli cah [[$2|Nāhuatlahtōlli]] [[$1|tlācatlahtohqui]].',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'babel' => 'Babel-Bruker-Infos',
	'babel-desc' => 'Föögt de <tt>#babel</tt>-Parserfunkschoon för dat automaatsche Opstellen vun Babel-Brukerboxen to. Verlöövt ok dat Inbinnen vun egene Vörlagen.',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'De utwählt Brukernaam warrt för dat automaatsch Opstellen vun [[$1|Babel]]-Kategorien bruukt un kann nich registreert warrn.',
	'babel-autocreate-reason' => 'Automaatsch opstellt [[$1|Babel]]-Kategorie.',
	'babel-autocreate-text-levels' => 'Brukers in disse Kategorie köönt de Spraak $2 op Niveau $1 snacken.',
	'babel-autocreate-text-main' => 'Brukers in disse Kategorie kennt vun de Spraak $1 wat af.',
	'babel-0' => 'Disse Bruker versteiht [[$1|nix]] vun [[$2|$3]] (oder versteiht dat blot mit ganz grote Swierigkeiten).',
	'babel-1' => 'Disse Bruker versteiht en [[$1|beten]] wat vun [[$2|$3]].',
	'babel-2' => 'Disse Bruker versteiht [[$1|good]] wat vun [[$2|$3]].',
	'babel-3' => 'Disse Bruker versteiht [[$1|temlich]] wat vun [[$2|$3]].',
	'babel-4' => 'Disse Bruker versteiht wat vun [[$2|$3]] as wenn dat sien [[$1|Moderspraak]] weer.',
	'babel-5' => 'Disse Bruker versteiht temlich wat vun [[$2|$3]], dat maakt he vun [[$1|Beroop]] ut.',
	'babel-N' => 'Disse Bruker hett [[$2|$3]] as [[$1|Moderspraak]].',
	'babel-0-n' => 'Disse Bruker versteiht [[$1|nix]] vun [[$2|Plattdüütsch]] (oder versteiht dat blot mit ganz grote Swierigkeiten).',
	'babel-1-n' => 'Disse Bruker versteiht en [[$1|beten]] wat vun [[$2|Plattdüütsch]].',
	'babel-2-n' => 'Disse Bruker versteiht [[$1|good]] wat vun [[$2|Plattdüütsch]].',
	'babel-3-n' => 'Disse Bruker versteiht [[$1|temlich]] wat vun [[$2|Plattdüütsch]].',
	'babel-4-n' => 'Disse Bruker versteiht wat vun [[$2|Plattdüütsch]] as wenn dat sien [[$1|Moderspraak]] weer.',
	'babel-5-n' => 'Disse Bruker versteiht temlich wat vun [[$2|Plattdüütsch]], dat maakt he vun [[$1|Beroop]] ut.',
	'babel-N-n' => 'Disse Bruker hett [[$2|Plattdüütsch]] as [[$1|Moderspraak]].',
);

/** Dutch (Nederlands)
 * @author GerardM
 * @author Hamaryns
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'babel' => 'Babel-gebruikersinformatie',
	'babel-desc' => 'Voegt de <tt>#babel</tt>-parserfunctie toe om automatische generatie van een babelgebruikersbox mogelijk te maken met de mogelijkheid om aangepaste sjablonen in te voegen',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'De gebruikersnaam die u hebt opgegeven wordt gebruikt voor het automatisch aanmaken van [[$1|Babel]]-categorieën en kan niet geregistreerd worden.',
	'babel-autocreate-reason' => 'Automatisch aangemaakte [[$1|Babel]]-categorie.',
	'babel-autocreate-text-levels' => 'Gebruikers in deze categorie geven aan dat hun niveau voor de taal $2 $1 is.',
	'babel-autocreate-text-main' => 'Gebruikers in deze categorie geven aan dat zij kennis van de taal $1 hebben.',
	'babel-0' => 'Deze gebruiker heeft [[$1|geen]] kennis van het [[$2|$3]] (of heeft moeite om het te begrijpen).',
	'babel-1' => 'Deze gebruiker bezit kennis van het [[$2|$3]] op [[$1|elementair niveau]].',
	'babel-2' => 'Deze gebruiker beheerst het [[$2|$3]] op [[$1|basisniveau]].',
	'babel-3' => 'Deze gebruiker beheerst het [[$2|$3]] [[$1|goed]].',
	'babel-4' => 'Deze gebruiker beheerst het [[$2|$3]] op [[$1|bijna-moedertaalniveau]].',
	'babel-5' => 'Deze gebruiker heeft een [[$1|professionele]] kennis van het [[$2|$3]].',
	'babel-N' => 'Deze gebruiker beheerst het [[$2|$3]] op [[$1|moedertaalniveau]].',
	'babel-0-n' => 'Deze gebruiker heeft [[$1|geen]] kennis van het [[$2|Nederlands]] (of begrijpt het met grote moeite).',
	'babel-1-n' => 'Deze gebruiker heeft [[$1|elementaire]] kennis van het [[$2|Nederlands]].',
	'babel-2-n' => 'Deze gebruiker heeft een [[$1|basis]]kennis van het [[$2|Nederlands]].',
	'babel-3-n' => 'De gebruiker heeft een [[$1|gevorderde]] kennis van het [[$2|Nederlands]].',
	'babel-4-n' => 'Deze gebruiker beheerst het [[$2|Nederlands]] als ware het zijn [[$1|moedertaal]].',
	'babel-5-n' => 'Deze gebruiker heeft een [[$1|professionele]] kennis van het [[$2|Nederlands]].',
	'babel-N-n' => 'Deze gebruiker heeft het [[$2|Nederlands]] als [[$1|moedertaal]].',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Eirik
 * @author Finnrind
 * @author Harald Khan
 */
$messages['nn'] = array(
	'babel' => 'Babelinformasjon',
	'babel-desc' => 'Legg til parserfunksjonen <tt>#babel</tt> for å automatisk lage ein babelboks der ein kan bruka sjølvlaga malar',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Brukarnamnet du valte er i bruk for automatisk oppretting av [[$1|Babel]]-kategoriar og kan difor ikkje verta registrert.',
	'babel-autocreate-reason' => 'Oprettar automatisk ei [[$1|Babel]]-kategori-sida.',
	'babel-autocreate-text-levels' => 'Brukarar i denne kategorien har eit språkdugleiksnivå på $1 for $2.',
	'babel-autocreate-text-main' => 'Brukarar i denne kategorien kjenner til $1.',
	'babel-0' => 'Denne brukaren har [[$1|små eller ingen]] kunnskapar i [[$2|$3]].',
	'babel-1' => 'Denne brukaren har [[$1|litt]] kjennskap til [[$2|$3]].',
	'babel-2' => 'Denne brukaren kan [[$1|ganske godt]] [[$2|$3]].',
	'babel-3' => 'Denne brukaren kan [[$1|svært godt]] [[$2|$3]].',
	'babel-4' => 'Denne brukaren kan [[$2|$3]] nesten på [[$1|morsmålnivå]]',
	'babel-5' => 'Denne brukaren nyttar [[$2|$3]] [[$1|profesjonelt]].',
	'babel-N' => 'Denne brukaren har [[$2|$3]] som [[$1|morsmål]].',
	'babel-0-n' => 'Denne brukaren verken skriv eller les [[$2|norsk (nynorsk)]] (eller forstår det berre så vidt).',
	'babel-1-n' => 'Denne brukaren kan [[$1|litt]] [[$2|norsk (nynorsk)]].',
	'babel-2-n' => 'Denne brukaren har [[$1|god kjennskap]] til [[$2|norsk (nynorsk)]].',
	'babel-3-n' => 'Denne brukaren meistrar [[$2|norsk (nynorsk)]] [[$1|flytande]].',
	'babel-4-n' => 'Denne brukaren snakkar og skriv [[$2|norsk (nynorsk)]] om lag på [[$1|morsmålsnivå]].',
	'babel-5-n' => 'Denne brukaren har [[$1|profesjonell]] kjennskap til [[$2|norsk (nynorsk)]].',
	'babel-N-n' => 'Denne brukaren har [[$2|norsk]] som [[$1|morsmål]] og meistrar nynorsk.',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 * @author Laaknor
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'babel' => 'Babelinformasjon',
	'babel-desc' => 'Legger til parserfunksjonen <tt>#babel</tt> for å automatisk generere en babelboks med  mulighet for å inkludere egendefinerte maler',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Brukernavnet du valgte er i bruk for automatisk oppretting av [[$1|Babel]]-kategorier og kan derfor ikke registreres.',
	'babel-autocreate-reason' => 'Oppretter automatisk en [[$1|Babel]]-kategoriside.',
	'babel-autocreate-text-levels' => 'Brukeren i denne kategorien har et språkkunnskapsnivå på $1 for $2.',
	'babel-autocreate-text-main' => 'Brukeren i denne kategorien kjenner til $1.',
	'babel-0' => 'Denne brukeren har [[$1|lite eller ingen]] kjennskap til [[$2|$3]] (eller har svært vanskelig for å forstå det).',
	'babel-1' => 'Denne brukeren kan [[$1|litt]] [[$2|$3]].',
	'babel-2' => 'Denne brukeren har [[$1|god]] kjennskap til [[$2|$3]].',
	'babel-3' => 'Denne brukeren behersker [[$2|$3]] [[$1|flytende]].',
	'babel-4' => 'Denne brukeren snakker [[$2|$3]] på [[$1|morsmålsnivå]].',
	'babel-5' => 'Denne brukeren bruker [[$2|$3]] [[$1|profesjonelt]].',
	'babel-N' => 'Denne brukeren har [[$2|$3]] som [[$1|morsmål]].',
	'babel-0-n' => 'Denne brukeren [[$1|kan ikke]] skrive eller lese [[$2|norsk]] (eller forstår det kun med store vanskeligheter).',
	'babel-1-n' => 'Denne brukeren kan [[$1|litt]] [[$2|norsk (bokmål)]].',
	'babel-2-n' => 'Denne brukeren har [[$1|god kjennskap]] til [[$2|norsk (bokmål)]].',
	'babel-3-n' => 'Denne brukeren behersker [[$2|norsk (bokmål)]] [[$1|flytende]].',
	'babel-4-n' => 'Denne brukeren snakker og skriver [[$2|norsk (bokmål)]] på [[$1|morsmålsnivå]].',
	'babel-5-n' => 'Denne brukeren bruker [[$2|norsk (bokmål)]] [[$1|profesjonelt]].',
	'babel-N-n' => 'Denne brukeren har [[$2|norsk]] som [[$1|morsmål]] og behersker bokmål.',
);

/** Novial (Novial)
 * @author Malafaya
 */
$messages['nov'] = array(
	'babel-0' => 'Dis usere [[$1|non komprenda]] [[$2|$3]] (o komprenda nur tre pokim).',
	'babel-1' => 'Dis usere pove komunika per [[$1|basal]] nivele de [[$2|$3]].',
	'babel-2' => 'Dis usere pove komunika per [[$1|medi]] nivele de [[$2|$3]].',
	'babel-3' => 'Dis usere pove komunika per [[$1|alti]] nivele de [[$2|$3]].',
	'babel-4' => 'Dis usere skripte [[$2|$3]] [[$1|preske kom sen patrial lingue]].',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'babel' => 'Entresenhas sus l’utilizaire de Babel',
	'babel-desc' => "Apond una foncion parser <tt>#babel</tt> que permet la creacion automatica d'una bóstia d’utilizaire Babèl amb la possibilitat d’i enclure de modèls locals.",
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => "Lo nom d'utilizaire qu'avètz picat es utilizat per crear automaticament las categorias [[$1|Babel]] e pòt pas èsser enregistrat.",
	'babel-autocreate-reason' => 'Creacion automatica de la categoria [[$1|Babel]].',
	'babel-autocreate-text-levels' => "Los utilizaires dins aquesta categoria an indicat qu'an lo nivèl $1 per la lenga $2.",
	'babel-autocreate-text-main' => "Los utilizaires dins aquesta categoria an indicat qu'an una coneissença en $1.",
	'babel-0' => 'Aqueste utilizaire a [[$1|pas cap]] de coneissença en [[$2|$3]] (o comprend amb de dificultats grandas).',
	'babel-1' => 'Aqueste utilizaire pòt contribuir amb un nivèl [[$1|elementari]] en [[$2|$3]].',
	'babel-2' => 'Aqueste utilizaire a una coneissença [[$1|mejana]] en [[$2|$3]].',
	'babel-3' => 'Aqueste utilizaire dispausa d’una coneissença [[$1|avançada]] en [[$2|$3]].',
	'babel-4' => 'Aqueste utilizaire a una coneissença pròcha de la de [[$1|lenga mairala]] en [[$2|$3]].',
	'babel-5' => 'Aqueste utilizaire a una coneissença [[$1|professionala]] en [[$2|$3]].',
	'babel-N' => 'Aqueste utilizaire dispausa d’una compreneson coma [[$1|lenga mairala]] en [[$2|$3]].',
	'babel-0-n' => 'Aqueste utilizaire a [[$1|pas cap]] de coneissença en [[$2|occitan]] (o lo compren amb de dificultats grandas).',
	'babel-1-n' => 'Aqueste utilizaire dispausa de coneissenças [[$1|de basa]] en [[$2|occitan]].',
	'babel-2-n' => "Aqueste utilizaire dispausa d'un [[$1|nivèl intermediari]] de coneissença en [[$2|occitan]].",
	'babel-3-n' => 'Aqueste utilizaire dispausa de coneissenças [[$1|avançadas]] en [[$2|occitan]].',
	'babel-4-n' => 'Aqueste utilizaire dispausa de coneissenças pròchas de la [[$1|lenga mairala]] en [[$2|occitan]].',
	'babel-5-n' => "Aqueste utilizaire dispausa d'un nivèl de coneissenças [[$1|professional]] en [[$2|occitan]].",
	'babel-N-n' => "Aqueste utilizaire a per [[$1|lenga mairala]] l'[[$2|occitan]].",
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$messages['os'] = array(
	'babel-url' => 'Project:Вавилон',
	'babel-3' => 'Ацы архайæг  [[$2|$3]] [[$1|тынг хорз]] кæсын æмæ фыссын зоны.',
	'babel-0-n' => 'Ацы архайæг [[$2|ирон æвзаг]] [[$1|бынтон не ’мбары]].',
	'babel-1-n' => 'Ацы архайæг [[$2|иронау]] [[$1|гыццыл зоны]].',
	'babel-2-n' => 'Ацы архайæг [[$2|иронау]] [[$1|æмбары хорз]].',
	'babel-3-n' => 'Ацы архайæг [[$2|иронау]] кæсын æмæ фыссын [[$1|тынг хорз]] зоны.',
	'babel-4-n' => 'Ацы архаæйджы [[$2|ирон æвзаг]] у [[$1|мадæлон æвзаджы уавæрмæ ’ввæхс]].',
	'babel-N-n' => '[[$2|Ирон]] у ацы архайæджы [[$1|мадæлон æвзаг]].',
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'babel-0-n' => 'Daer Yuuser do schwetzt [[$1|net]] [[$2|Pennsilfaanisch Deitsch]].',
	'babel-1-n' => 'Daer Yuuser do schwetzt [[$1|ebbes]] [[$2|Pennsilfaanisch Deitsch]].',
	'babel-N-n' => 'Daer Yuuser do [[$1|schwetzt]] [[$2|Pennsilfaanisch Deitsch]].',
);

/** Pfälzisch (Pfälzisch)
 * @author Als-Holder
 */
$messages['pfl'] = array(
	'babel' => 'Babel-Benutzer-Information',
	'babel-desc' => 'Ergänzt die <tt>#babel</tt>-Parserfunktion fer zum automatische Aaleche vun  Babel-Benutzerkäschtel-Zaile mit de Mechlichkäät, äächene Vorlache aizbinne',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'De Benutzername, wu Du ausgewählt hoscht, werd gebraucht fer s automatische Aaleche vun [[$1|Babel]]-Kategorie un kann nid regischtriert werre.',
	'babel-autocreate-reason' => 'Automatisch aagelechte [[$1|Babel]]-Kategorie.',
	'babel-autocreate-text-levels' => 'Benutzer in derre Kategorie hänn d Kenntnis-Ewene $1 fer die Sproch $2.',
	'babel-autocreate-text-main' => 'Benutzer in derre Kategorie hänn Kenntnisse vun de Sproch $1.',
	'babel-0' => 'Der Benutzer kann [[$1|ken]] [[$2|$3]] (oder er versteht s numme mit greßere Schwierichkääte).',
	'babel-1' => 'Der Benutzer kann [[$1|e bissel]] [[$2|$3]].',
	'babel-2' => 'Der Benutzer kann [[$1|ganz gut]] [[$2|$3]] .',
	'babel-3' => 'Der Benutzer kann [[$1|arich gut]] [[$2|$3]].',
	'babel-4' => 'Der Benutzer kann [[$2|$3]], wie wenn s sai [[$1|Muddersproch]] wär.',
	'babel-5' => 'Der Benutzer kann [[$2|$3]] uff [[$1|professionellem]] Niveau.',
	'babel-N' => 'Dem Benutzer sai [[$1|Muddersproch]] isch [[$2|$3]].',
	'babel-0-n' => 'Der Benutzer kann [[$1|ken]] [[$2|Pälzisch]] (oder er versteht s numme mit greßere Schwierichkääte).',
	'babel-1-n' => 'Der Benutzer kann [[$1|e bissel]] [[$2|Pälzisch]].',
	'babel-2-n' => 'Der Benutzer kann [[$1|ganz gut]] [[$2|Pälzisch]] .',
	'babel-3-n' => 'Der Benutzer kann [[$1|arich gut]] [[$2|Pälzisch]].',
	'babel-4-n' => 'Der Benutzer kann [[$2|Pälzisch]], wie wenn s sai [[$1|Muddersproch]] wär.',
	'babel-5-n' => 'Der Benutzer kann [[$2|Pälzisch]] uff [[$1|professionellem]] Niveau.',
	'babel-N-n' => 'Dem Benutzer sai [[$1|Muddersproch]] isch [[$2|Pälzisch]].',
);

/** Polish (Polski)
 * @author Sp5uhe
 * @author Ymar
 */
$messages['pl'] = array(
	'babel' => 'Wieża Babel użytkownika',
	'babel-desc' => 'Dodaje funkcję parsera <tt>#babel</tt> ułatwiającą tworzenie ramki informującej o językowych lub innych umiejętnościach użytkownika',
	'babel-url' => 'Project:Wieża Babel',
	'babel-autocreate-abort' => 'Wybrana nazwa użytkownika jest wykorzystywana do automatycznego tworzenia kategorii [[$1|wieży Babel]] i nie może zostać zarejestrowana.',
	'babel-autocreate-reason' => 'Strona automatycznie utworzonej kategorii [[$1|wieży Babel]].',
	'babel-autocreate-text-levels' => 'Użytkownicy znajdujący się w tej kategorii deklarują znajomość języka $2 na poziomie $1.',
	'babel-autocreate-text-main' => 'Użytkownicy znajdujący się w tej kategorii deklarują znajomość języka $1.',
	'babel-0' => '{{GENDER:$4|Ten użytkownik|Ta użytkowniczka}} [[$1|nie rozumie]] języka [[$2|$3]] (albo ma z nim olbrzymie trudności).',
	'babel-1' => '{{GENDER:$4|Ten użytkownik|Ta użytkowniczka}} posługuje się [[$2|językiem $3]] na poziomie [[$1|podstawowym]].',
	'babel-2' => '{{GENDER:$4|Ten użytkownik|Ta użytkowniczka}} posługuje się [[$2|językiem $3]] na poziomie [[$1|średnio zaawansowanym]].',
	'babel-3' => '{{GENDER:$4|Ten użytkownik|Ta użytkowniczka}} posługuje się [[$2|językiem $3]] na poziomie [[$1|zaawansowanym]].',
	'babel-4' => '{{GENDER:$4|Ten użytkownik|Ta użytkowniczka}} posługuje się [[$2|językiem $3]] prawie tak samo biegle, jak [[$1|językiem ojczystym]].',
	'babel-5' => '{{GENDER:$4|Ten użytkownik|Ta użytkowniczka}} posługuje się [[$2|językiem $3]] na równi z [[$1|językiem ojczystym]].',
	'babel-N' => '[[$2|$3]] jest [[$1|językiem ojczystym]] {{GENDER:$4|tego użytkownika|tej użytkowniczki}}.',
	'babel-0-n' => '{{GENDER:$4|Ten użytkownik|Ta użytkowniczka}} [[$1|nie rozumie]] języka [[$2|polskiego]] (albo ma z nim olbrzymie trudności).',
	'babel-1-n' => '{{GENDER:$4|Ten użytkownik|Ta użytkowniczka}} posługuje się [[$2|językiem polskim]] na poziomie [[$1|podstawowym]].',
	'babel-2-n' => '{{GENDER:$4|Ten użytkownik|Ta użytkowniczka}} posługuje się [[$2|językiem polskim]] na poziomie [[$1|średnio zaawansowanym]].',
	'babel-3-n' => '{{GENDER:$4|Ten użytkownik|Ta użytkowniczka}} posługuje się [[$2|językiem polskim]] na poziomie [[$1|zaawansowanym]].',
	'babel-4-n' => '{{GENDER:$4|Ten użytkownik|Ta użytkowniczka}} posługuje się [[$2|językiem polskim]] prawie tak samo biegle, jak [[$1|językiem ojczystym]].',
	'babel-5-n' => '{{GENDER:$4|Ten użytkownik|Ta użytkowniczka}} posługuje się [[$2|językiem polskim]] na równi z [[$1|językiem ojczystym]].',
	'babel-N-n' => '[[$2|Polski]] jest [[$1|językiem ojczystym]] {{GENDER:$4|tego użytkownika|tej użytkowniczki}}.',
);

/** Pontic (Ποντιακά)
 * @author Consta
 * @author Crazymadlover
 * @author Omnipaedista
 * @author Sinopeus
 * @author ZaDiak
 */
$messages['pnt'] = array(
	'babel' => 'Πληροφορίας Βαβέλ τη χρήστε',
	'babel-desc' => 'Προστέτει την <tt>#babel</tt> λεξιαναλυτικήν λειτουργίαν ας αφήκει την αυτόματην παραγωγήν στήλης βαβέλ με την δυνατότηταν περίληψης παραγγελτών προτυπίων',
	'babel-url' => 'Project:Βαβέλ',
	'babel-autocreate-abort' => "Τ' όνεμα χρήστε π' εδώθεν εν όνεμα για την κατηγορίαν αυτόματου δημιουργίας [[$1|Βαβέλ]] και 'κ επορεί να κατοχυρωνέται.",
	'babel-autocreate-reason' => 'Αυτόματα εγέντον η σελίδα κατηγορίας [[$1|Βαβέλ]].',
	'babel-autocreate-text-levels' => "Οι χρήστς ση κατηγορίαν ατή λέν' πως μιλούν την γλώσσαν $2 σ' επίπεδον $1.",
	'babel-autocreate-text-main' => "Οι χρήστς ση κατηγορίαν ατή γνωρίζ'ν την γλώσσαν $1.",
	'babel-0' => "Ατός ο χρήστες [[$1|'κ εγροικά]] τα [[$2|$3]] (ή με τρανόν ζορ).",
	'babel-1' => 'Ατός ο χρήστες καλατσέβ [[$1|έναν ξάι]] [[$2|$3]].',
	'babel-2' => 'Ατός ο χρήστες καλατσέβ [[$1|ολίγα]] [[$2|$3]].',
	'babel-3' => 'Ατός ο χρήστες καλατσέβ [[$1|τσιπ καλά]] [[$2|$3]].',
	'babel-4' => 'Ατός ο χρήστες καλατσέβ [[$1|σκυρά]] [[$2|$3]].',
	'babel-5' => 'Ατός ο χρήστες καλατσέβ [[$1|επαγγελματικά]] [[$2|$3]].',
	'babel-N' => "Ατός ο χρήστες εχ' [[$1|μητρικόν]] λαλίαν τα [[$2|$3]].",
	'babel-0-n' => "Ατός ο χρήστες [[$1|ξάι]] 'κ εγροικά τα [[$2|Ποντιακά]] (ή με τρανόν ζορ).",
	'babel-1-n' => 'Ατός ο χρήστες καλατσέβ [[$1|έναν ξάι]] [[$2|Ποντιακά]].',
	'babel-2-n' => 'Ατός ο χρήστες καλατσέβ [[$1|ολίγα]] [[$2|Ποντιακά]].',
	'babel-3-n' => 'Ατός ο χρήστες καλατσέβ [[$1|τσιπ καλά]] [[$2|Ποντιακά]].',
	'babel-4-n' => 'Ατός ο χρήστες καλατσέβ [[$1|σκυρά]] [[$2|Ποντιακά]].',
	'babel-5-n' => 'Ατός ο χρήστες καλατσέβ [[$1|επαγγελματικά]] [[$2|Ποντιακά]].',
	'babel-N-n' => "Ατός ο χρήστες εχ' [[$1|μητρικόν]] λαλίαν τα [[$2|Ποντιακά]].",
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'babel' => 'د بابل د کارونکي مالومات',
	'babel-desc' => 'د <tt>#babel</tt> شننونکې کړنه په دې موخه ده چې په خپلسري توګه د بابل د کارنبکس ستنه رامېنځ ته کړي چېرته چې څوک خپل د خوښې کينډۍ ورټومبلی شي',
	'babel-url' => 'پروژه:بابل',
	'babel-directionality' => 'rtl',
	'babel-0' => 'همدا کارونکی په [[$2|$3]] ژبه [[$1|هېڅ نه]] پوهېږي (او يا هم په ډېرې سختۍ سره ډېر لږ پرې پوهېږي).',
	'babel-1' => 'همدا کارونکی تر [[$1|بنسټيزې کچې]] په [[$2|$3]] ژبې پوهېږي.',
	'babel-2' => 'همدا کارونکی تر [[$1|منځوۍ کچې]] په [[$2|$3]] ژبې پوهېږي.',
	'babel-3' => 'همدا کارونکی تر [[$1|پرمختللې کچې]] په [[$2|$3]] ژبې پوهېږي.',
	'babel-4' => 'همدا کارونکی تر [[$1|مورنۍ کچې]] په [[$2|$3]] ژبې پوهېږي.',
	'babel-5' => 'همدا کارونکی تر [[$1|کارپوهنيزې کچې]] په [[$2|$3]] ژبې پوهېږي.',
	'babel-N' => 'د همدې کارونکي [[$1|مورنۍ]] ژبه [[$2|$3]] ده.',
	'babel-0-n' => 'همدا کارونکی په [[$2|پښتو]] ژبه [[$1|هېڅ نه]] پوهېږي (او يا هم په ډېرې سختۍ سره ډېر لږ پرې پوهېږي).',
	'babel-1-n' => 'همدا کارونکی تر [[$1|بنسټيزې کچې]] په [[$2|پښتو]] ژبې پوهېږي.',
	'babel-2-n' => 'همدا کارونکی تر [[$1|منځوۍ کچې]] په [[$2|پښتو]] ژبې پوهېږي.',
	'babel-3-n' => 'همدا کارونکی تر [[$1|پرمختللې کچې]] په [[$2|پښتو]] ژبې پوهېږي.',
	'babel-4-n' => 'همدا کارونکی تر [[$1|مورنۍ کچې]] په [[$2|پښتو]] ژبې پوهېږي.',
	'babel-5-n' => 'همدا کارونکی تر [[$1|کارپوهنيزې کچې]] په [[$2|پښتو]] ژبې پوهېږي.',
	'babel-N-n' => 'د همدې کارونکي [[$1|مورنۍ]] ژبه [[$2|پښتو]] ده.',
);

/** Portuguese (Português)
 * @author 555
 * @author Malafaya
 * @author Waldir
 */
$messages['pt'] = array(
	'babel' => 'Informação Babel de Utilizador',
	'babel-desc' => 'Adiciona a função do analisador parser <tt>#babel</tt> para permitir a geração automatizada de um coluna de caixas de utilizador babel coma possibilidade de incluir predefinições personalizadas',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'O nome de utilizador que especificou é usado pela criação automática de categorias [[$1|Babel]] e, por isso, não pode ser registado.',
	'babel-autocreate-reason' => 'A criar automaticamente a página da categoria [[$1|Babel]].',
	'babel-autocreate-text-levels' => 'Os utilizadores nesta categoria indicam que possuem um nível de conhecimento $1 na língua $2.',
	'babel-autocreate-text-main' => 'Os utilizadores nesta categoria indicam que possuem conhecimentos da língua $1.',
	'babel-0' => '{{GENDER:$4|Este utilizador|Esta utilizadora}} [[$1|não compreende]] [[$2|$3]] (ou compreende com dificuldades consideráveis).',
	'babel-1' => '{{GENDER:$4|Este utilizador|Esta utilizadora}} pode contribuir com um nível [[$1|básico]] de [[$2|$3]].',
	'babel-2' => '{{GENDER:$4|Este utilizador|Esta utilizadora}} pode contribuir com um nível [[$1|médio]] de [[$2|$3]].',
	'babel-3' => '{{GENDER:$4|Este utilizador|Esta utilizadora}} pode contribuir com um nível [[$1|avançado]] de [[$2|$3]].',
	'babel-4' => '{{GENDER:$4|Este utilizador|Esta utilizadora}} pode contribuir com um nível [[$1|quase nativo]] de [[$2|$3]].',
	'babel-5' => '{{GENDER:$4|Este utilizador|Esta utilizadora}} pode contribuir com um nível [[$1|profissional]] de [[$2|$3]].',
	'babel-N' => '{{GENDER:$4|Este utilizador|Esta utilizadora}} tem como língua [[$1|materna]] o [[$2|$3]].',
	'babel-0-n' => '{{GENDER:$4|Este utilizador|Esta utilizadora}} [[$1|não compreende]] [[$2|português]] (ou compreende com dificuldades consideráveis).',
	'babel-1-n' => '{{GENDER:$4|Este utilizador|Esta utilizadora}} pode contribuir com um nível [[$1|básico]] de [[$2|português]].',
	'babel-2-n' => '{{GENDER:$4|Este utilizador|Esta utilizadora}} pode contribuir com um nível [[$1|médio]] de [[$2|português]].',
	'babel-3-n' => '{{GENDER:$4|Este utilizador|Esta utilizadora}} pode contribuir com um nível [[$1|avançado]] de [[$2|português]].',
	'babel-4-n' => '{{GENDER:$4|Este utilizador|Esta utilizadora}} pode contribuir com um nível [[$1|quase nativo]] de [[$2|português]].',
	'babel-5-n' => '{{GENDER:$4|Este utilizador|Esta utilizadora}} pode contribuir com um nível [[$1|profissional]] de [[$2|português]].',
	'babel-N-n' => '{{GENDER:$4|Este utilizador|Esta utilizadora}} tem como língua [[$1|materna]] o [[$2|português]].',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Brunoy Anastasiya Seryozhenko
 * @author Eduardo.mps
 */
$messages['pt-br'] = array(
	'babel' => 'Informação Babel de Usuário',
	'babel-desc' => 'Adiciona a função do analisador parser <tt>#babel</tt> para permitir a geração automática de um coluna de caixas de babel de um usuário coma possibilidade de incluir predefinições personalizadas',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'O nome de utilizador que especificou é usado pela criação automática de categorias [[$1|Babel]] e, por isso, não pode ser registrado.',
	'babel-autocreate-reason' => 'Criando automaticamente a página da categoria [[$1|Babel]].',
	'babel-autocreate-text-levels' => 'Os utilizadores nesta categoria indicam que possuem um nível de conhecimento $1 na língua $2.',
	'babel-autocreate-text-main' => 'Os utilizadores nesta categoria indicam que possuem conhecimentos da língua $1.',
	'babel-0' => 'Este usuário [[$1|não]] têm conhecimento de [[$2|$3]] (ou compreende com dificuldades consideráveis).',
	'babel-1' => 'Este usuário têm um [[$1|básico]] conhecimento de [[$2|$3]].',
	'babel-2' => 'Este usuário têm um conhecimento [[$1|intermediário]] de [[$2|$3]].',
	'babel-3' => 'Este usuário têm um [[$1|avançado]] conhecimento de [[$2|$3]].',
	'babel-4' => 'Este usuário possui um conhecimento [[$1|próximo ao nativo]] de [[$2|$3]].',
	'babel-5' => 'Este usuário têm um conhecimento [[$1|profissional]] de [[$2|$3]].',
	'babel-N' => 'Este usuário é um [[$1|falante nativo]] de [[$2|$3]].',
	'babel-0-n' => 'Este utilizador [[$1|não compreende]] [[$2|português]] (ou compreende com dificuldades consideráveis).',
	'babel-1-n' => 'Este utilizador pode contribuir com um nível [[$1|básico]] de [[$2|português]].',
	'babel-2-n' => 'Este utilizador pode contribuir com um nível [[$1|médio]] de [[$2|português]].',
	'babel-3-n' => 'Este utilizador pode contribuir com um nível [[$1|avançado]] de [[$2|português]].',
	'babel-4-n' => 'Este utilizador pode contribuir com um nível [[$1|quase nativo]] de [[$2|português]].',
	'babel-5-n' => 'Este utilizador pode contribuir com um nível [[$1|profissional]] de [[$2|português]].',
	'babel-N-n' => 'Este utilizador tem como língua [[$1|materna]] o [[$2|português]].',
);

/** Quechua (Runa Simi)
 * @author AlimanRuna
 */
$messages['qu'] = array(
	'babel-0' => "Kay ruraqqa [[$2|$3]]ta [[$1|manam]] rimanchu (icha ancha sasallata hap'iqan).",
	'babel-1' => 'Kay ruraqqa [[$2|$3]]ta [[$1|aslla]] yachaywanmi riman.',
	'babel-2' => 'Kay ruraqqa [[$2|$3]]ta [[$1|chawpi]] yachaywanmi riman.',
	'babel-3' => 'Kay ruraqqa [[$2|$3]]ta [[$1|ñawparikusqa]] yachaywanmi riman.',
	'babel-4' => 'Kay ruraqqa [[$2|$3]]ta [[$1|yaqa mama rimaynin hina]] yachaywanmi riman.',
	'babel-5' => 'Kay ruraqqa [[$2|$3]]ta [[$1|amawtap]] yachayninwanmi riman.',
	'babel-N' => 'Kay ruraqpa [[$1|mama siminqa]] [[$2|$3]]m.',
	'babel-0-n' => "Kay ruraqqa [[$2|Runa Simita]] [[$1|manam]] rimanchu (icha ancha sasallata hap'iqan).",
	'babel-1-n' => 'Kay ruraqqa [[$2|Runa Simita]] [[$1|aslla]] yachaywanmi riman.',
	'babel-2-n' => 'Kay ruraqqa [[$2|Runa Simita]] [[$1|chawpi]] yachaywanmi riman.',
	'babel-3-n' => 'Kay ruraqqa [[$2|Runa Simita]] [[$1|ñawparikusqa]] yachaywanmi riman.',
	'babel-4-n' => 'Kay ruraqqa [[$2|Runa Simita]] [[$1|yaqa mama rimaynin hina]] yachaywanmi riman.',
	'babel-5-n' => 'Kay ruraqqa [[$2|Runa Simita]] [[$1|amawtap]] yachayninwanmi riman.',
	'babel-N-n' => 'Kay ruraqpa [[$1|mama siminqa]] [[$2|Runa Simim]].',
);

/** Rhaeto-Romance (Rumantsch)
 * @author Gion
 */
$messages['rm'] = array(
	'babel' => "infurmaziuns d'utilisader da Babel",
	'babel-desc' => "Agiunta la funcziun da generar automaticamain ina chascha cun las indicaziuns da babel davart l'utilisader e che pussibilitescha d'includer agens templates.",
	'babel-url' => 'Project: Babel',
	'babel-autocreate-abort' => "Il num d'utilisader vegn duvrà per la craziun automatica da la categoria [[$1|Babel]] e na sa betg vegnir registrà.",
	'babel-autocreate-reason' => 'Categoria da paginas [[$1|Babel]] creada automaticamain.',
	'babel-autocreate-text-levels' => 'Il utilisaders en questa categoria han inditgà il nivel $1 per la lingua $2.',
	'babel-autocreate-text-main' => 'Utilisaders en questa categoria han inditgà la conuschientscha dal lingua $1.',
	'babel-0' => 'Quest utilisader ha [[$1|naginas]] conuschientschas da [[$2|$3]] (u chapescha mo cun considerablas difficultads).',
	'babel-1' => 'Quest utilisader ha conuschientschas [[$1|fundamentalas]] da [[$2|$3]].',
	'babel-2' => 'Quest utilisader ha conuschientschas [[$1|d’in principiant avanzà]] da [[$2|$3]].',
	'babel-3' => 'Quest utilisader ha conuschientschas [[$1|avanzadas]] da [[$2|$3]].',
	'babel-4' => 'Quest utilisader sa [[$2|$3]] prest sco ina [[$1|persuna da lingua materna]].',
	'babel-5' => 'Quest utilisader ha conuschientschas [[$1|professiunalas]] da [[$2|$3]].',
	'babel-N' => 'Per quest utilisader è [[$2|$3]] la [[$1|lingua materna]].',
	'babel-0-n' => 'Quest utilisader ha [[$1|naginas]] conuschientschas dal [[$2|rumantsch]] (u chapescha mo cun considerablas difficultads).',
	'babel-1-n' => 'Quest utilisader ha conuschientschas [[$1|fundamentalas]] dal [[$2|rumantsch]].',
	'babel-2-n' => "Quest utilisader ha conuschientschas dal [[$2|rumantsch]] [[$1|d'in principiant avanzà]].",
	'babel-3-n' => 'Quest utilisader ha conuschientschas [[$1|avanzads]] dal [[$2|rumantsch]].',
	'babel-4-n' => 'Quest utilisader sa [[$2|rumantsch]] prost sco ina [[$1|persuna da lingua materna]].',
	'babel-5-n' => 'Quest utilisader ha conuschientschas [[$1|professiunalas]] dal [[$2|rumantsch]].',
	'babel-N-n' => 'Per quest utilisader è [[$2|rumantsch]] la [[$1|lingua materna]].',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'babel' => 'Informaţii despre utilizatorul Babel',
	'babel-desc' => 'Adaugă funcţia de parsare <tt>#babel</tt> pentru generarea automată a coloanei de cutii de utilizator babel, cu posibilitatea de a include formate personalizate',
	'babel-url' => 'Project:Babel',
	'babel-0' => 'Acest utilizator [[$1|nu]] are cunoştinţe de [[$2|$3]] (sau înţelege cu mare dificultate).',
	'babel-1' => 'Acest utilizator poate contribui cu un nivel [[$1|de bază]] de [[$2|$3]].',
	'babel-2' => 'Acest utilizator poate contribui cu un nivel [[$1|intermediar]] de [[$2|$3]].',
	'babel-3' => 'Acest utilizator poate contribui cu un nivel [[$1|avansat]] de [[$2|$3]].',
	'babel-4' => 'Acest utilizator poate contribui cu un nivel [[$1|aproape nativ]] de [[$2|$3]].',
	'babel-5' => 'Acest utilizator contribuie folosind un nivel [[$1|profesional]] de [[$2|$3]].',
	'babel-N' => 'Acest utilizator este un vorbitor [[$1|nativ]] al [[$2|$3]].',
	'babel-0-n' => 'Acest utilizator [[$1|nu]] are cunoştinţe de [[$2|română]] (sau înţelege cu mare dificultate).',
	'babel-1-n' => 'Acest utilizator poate contribui cu un nivel [[$1|de bază]] de [[$2|română]].',
	'babel-2-n' => 'Acest utilizator poate contribui cu un nivel [[$1|intermediar]] de [[$2|română]].',
	'babel-3-n' => 'Acest utilizator poate contribui cu un nivel [[$1|avansat]] de [[$2|română]].',
	'babel-4-n' => 'Acest utilizator poate contribui cu un nivel [[$1|aproape nativ]] de [[$2|română]].',
	'babel-5-n' => 'Acest utilizator contribuie folosind un nivel [[$1|profesional]] de [[$2|română]].',
	'babel-N-n' => 'Acest utilizator este un vorbitor [[$1|nativ]] al [[$2|limbii române]].',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 * @author Kwj2772
 */
$messages['roa-tara'] = array(
	'babel-url' => 'Project:Babel',
	'babel-0' => "'Stu crestiáne ste'''[[$1|'nderre a le carvune]]''' cu 'u '''[[$2|$3]]'''.",
	'babel-1' => "'Stu crestiáne pô ajutà' cu 'na canoscènze '''[[$1|tèrra-tèrre]]''' d'u '''[[$2|$3]]'''.",
	'babel-2' => "'Stu crestiáne pô ajutà' cu 'nna canoscènze '''[[$2|'ndermdèdie]]''' d'u '''[[$2|$3]]'''.",
	'babel-3' => "'Stu crestiáne pô ajutà' cu 'nna canoscènze '''[[$2|accellènde]]''' d'u '''[[$2|$3]]'''.",
	'babel-4' => "Stu crestiáne quase quase parle 'u '''[[$2|$3]]''' cumme a 'a '''[[$1|lènga madre]]'''.",
	'babel-5' => "Stu crestiáne è proprie 'nu '''[[$1|professore]]''' de '''[[$2|$3]]'''.",
	'babel-N-n' => 'Quìste utende jè de [[$1|madrelènga]] [[$2|tarandine]].',
);

/** Russian (Русский)
 * @author EugeneZelenko
 * @author Ferrer
 * @author Spiritia
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'babel' => 'Сведения о языках участника (Вавилон)',
	'babel-desc' => 'Добавляет функцию парсера <tt>#babel</tt>, позволяющую автоматически создавать колонку с информацией о языках с возможностью включения других шаблонов',
	'babel-url' => 'Project:Вавилон',
	'babel-autocreate-abort' => 'Указанное имя участника используется для автоматического создания категорий [[$1|Вавилон]] и не может быть зарегистрировано.',
	'babel-autocreate-reason' => 'Автоматическое создание страницы категории [[$1|Вавилон]].',
	'babel-autocreate-text-levels' => 'Участники из этой категории указали уровень знаний $1 для языка $2.',
	'babel-autocreate-text-main' => 'Участники в этой категории указали знание языка $1.',
	'babel-0' => '[[$2|$3]] — [[$1|не владеет]] (или с трудом понимает)',
	'babel-1' => '[[$2|$3]] — [[$1|начальный уровень]]',
	'babel-2' => '[[$2|$3]] — [[$1|средний уровень]]',
	'babel-3' => '[[$2|$3]] — [[$1|хороший уровень]]',
	'babel-4' => '[[$2|$3]] — [[$1|почти как родной]]',
	'babel-5' => '[[$2|$3]] — [[$1|профессиональный уровень]]',
	'babel-N' => '[[$2|$3]] — [[$1|родной]]',
	'babel-0-n' => '{{GENDER:$4|Этот участник|Эта участница}} [[$1|не владеет]] [[$2|русским языком]] (или с трудом его понимает).',
	'babel-1-n' => '{{GENDER:$4|Этот участник|Эта участница}} владеет [[$2|русским языком]] на [[$1|начальном уровне]].',
	'babel-2-n' => '{{GENDER:$4|Этот участник|Эта участница}} владеет [[$2|русским языком]] на [[$1|среднем уровне]].',
	'babel-3-n' => '{{GENDER:$4|Этот участник|Эта участница}} [[$1|свободно]] владеет [[$2|русским языком]].',
	'babel-4-n' => '{{GENDER:$4|Этот участник|Эта участница}} владеет [[$2|русским языком]] [[$1|почти как родным]].',
	'babel-5-n' => '{{GENDER:$4|Этот участник|Эта участница}} [[$1|профессионально]] владеет [[$2|русским языком]].',
	'babel-N-n' => 'Для {{GENDER:$4|этого участника|этой участницы}} [[$2|русский язык]] является [[$1|родным]].',
);

/** Sanskrit (संस्कृत)
 * @author Kaustubh
 */
$messages['sa'] = array(
	'babel-0' => 'एष उपयोजक: [[$2|$3]] लिखितुं [[$1|न]] शक्नोति (अतीव प्रयत्नान्ते पढितुं शक्नोति च)।',
	'babel-1' => 'एष उपयोजक: [[$1|प्राथमिक]]-[[$2|$3]] लिखितुं शक्नोति।',
	'babel-2' => 'एष उपयोजक: [[$1|मध्यम]]-[[$2|$3]] लिखितुं शक्नोति।',
	'babel-3' => 'एष उपयोजकः [[$1|उत्तम]]-[[$2|$3]] लिखितुं शक्नोति।',
	'babel-4' => 'एष उपयोजक: [[$1|उच्चतम]]-[[$2|$3]] लिखितुं शक्नोति।',
	'babel-5' => 'एष उपयोजक: [[$1|अति-उच्चतम]]-[[$2|$3]] लिखितुं शक्नोति।',
	'babel-N' => 'एष उपयोजकस्य [[$1|मातृभाषा]] [[$2|$3]] अस्ति।',
	'babel-0-n' => 'एष उपयोजक: [[$2|संस्कृते]] लिखितुं [[$1|न]] शक्नोति (अतीव प्रयत्नान्ते पढितुं शक्नोति च)।',
	'babel-1-n' => 'एष उपयोजक: [[$1|प्राथमिक]]-[[$2|संस्कृते]] लिखितुं शक्नोति।',
	'babel-2-n' => 'एष उपयोजक: [[$1|मध्यम]]-[[$2|संस्कृते]] लिखितुं शक्नोति।',
	'babel-3-n' => 'एष उपयोजकः [[$1|उत्तम]]-[[$2|संस्कृते]] लिखितुं शक्नोति।',
	'babel-4-n' => 'एष उपयोजक: [[$1|उच्चतम]]-[[$2|संस्कृते]] लिखितुं शक्नोति।',
	'babel-5-n' => 'एष उपयोजक: [[$1|अति-उच्चतम]]-[[$2|संस्कृते]] लिखितुं शक्नोति।',
	'babel-N-n' => 'एष उपयोजकस्य [[$1|मातृभाषा]] [[$2|संस्कृतम्‌]] अस्ति।',
);

/** Yakut (Саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'babel' => 'Кыттааччы тылы билиитэ (Вавилон)',
	'babel-desc' => '<tt>#babel</tt> парсер функциятын эбэр, ол атын халыыптары туһанан тыллары билии туһунан колуоҥканы оҥорого туттуллар.',
	'babel-url' => 'Бырайыак:Вавилон',
	'babel-autocreate-abort' => 'Талбыт аатыҥ [[$1|Вавилон]] категорияларын аптамаатынан оҥорорго туттуллар эбит, онон туттуллар кыаҕа суох.',
	'babel-autocreate-reason' => '[[$1|Вавилон]] категориятын аптамаатынан оҥоруу.',
	'babel-autocreate-text-levels' => 'Бу категорияҕа киирээччилэр $2 тылы маннык таһымынан билэбит диэбиттэр: $1.',
	'babel-autocreate-text-main' => 'Бу категорияҕа киирээччилэр тылы билиилэрин таһыма $1.',
	'babel-0' => '[[$2|$3]] — [[$1|билбэт]] (эбэтэр нэһиилэ өйдүүр)',
	'babel-1' => '[[$2|$3]] — [[$1|кыратык билэр]]',
	'babel-2' => '[[$2|$3]] — [[$1|орто таһым]]',
	'babel-3' => '[[$2|$3]] — [[$1|бэркэ билэр]]',
	'babel-4' => '[[$2|$3]] — [[$1|төрөөбүт тылын курдук билэр]]',
	'babel-5' => '[[$2|$3]] — [[$1|анал үөрэхтээх таһыма]]',
	'babel-N' => '[[$2|$3]] — [[$1|төрөөбүт тыла]]',
	'babel-0-n' => '{{GENDER:$4|Бу эр киһи|Бу дьахтар}} [[$2|саха тылын]] [[$1|билбэт]] (эбэтэр мөлтөхтүк өйдүүр).',
	'babel-1-n' => '{{GENDER:$4|Бу кыттааччы эр киһи|Бу кыттааччы дьахтар}} [[$2|саха тылын]] [[$1|син кыратык]] билэр.',
	'babel-2-n' => '{{GENDER:$4|Бу кыттааччы эр киһи|Бу кыттааччы дьахтар}} [[$2|саха тылын]] [[$1|ортотук]] билэр.',
	'babel-3-n' => '{{GENDER:$4|Бу кыттааччы эр киһи|Бу кыттааччы дьахтар}} [[$2|саха тылын]] [[$1|бэркэ]] билэр.',
	'babel-4-n' => '{{GENDER:$4|Бу кыттааччы эр киһи|Бу кыттааччы дьахтар}} [[$2|саха тылын]] [[$1|төрөөбүт тылын курдук]] билэр.',
	'babel-5-n' => '{{GENDER:$4|Бу кыттааччы эр киһи|Бу кыттааччы дьахтар}} [[$2|саха тылын]] [[$1|тыл үөрэхтээҕин таһымынан]] билэр.',
	'babel-N-n' => '{{GENDER:$4|Бу кыттааччы эр киһиэхэ|Бу кыттааччы дьахтарга}} [[$2|саха тыла]] [[$1|төрөөбүт тыла]] буолар.',
);

/** Sardinian (Sardu)
 * @author Andria
 * @author Marzedu
 */
$messages['sc'] = array(
	'babel' => 'Babel usuàriu',
	'babel-desc' => 'Aciungit sa funtzioni parser <tt>#babel</tt> pro permitiri sa generatzioni automatica de una colunna box usuàriu babel cun sa possibilidade de insertai templates personalitzaus',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Su nòmene usuàriu ispetzificau est impreau pro sa creatzione automatiga de is categorias [[$1|Babel]] e non podet èssere registradu.',
	'babel-autocreate-reason' => 'Crea automatigamente sa pàgina de sa categoria [[$1|Babel]]',
	'babel-autocreate-text-levels' => 'Is usuàrios de custa categoria narant de tènnere unu livellu $1 pro sa limba $2.',
	'babel-autocreate-text-main' => 'Is usuàrios de custa categoria narant de tènnere una connoscientzia de sa limba $1.',
	'babel-0' => 'Custu usuàriu [[$1|non]] connoschet su [[$2|$3]] (o ddu cumprendet cun aprentu mannu).',
	'babel-1' => 'Custu usuàriu tenet una connoscéntzia [[$1|basica]] de su [[$2|$3]].',
	'babel-2' => 'Custu usuàriu tenet una connoscéntzia [[$1|intermedia]] de su [[$2|$3]].',
	'babel-3' => 'Custu usuàriu tenet una connoscéntzia [[$1|avanzada]] de su [[$2|$3]].',
	'babel-4' => 'Custu usuàriu tenet una connoscéntzia [[$1|cante sa limba mama]] de su [[$2|$3]].',
	'babel-5' => 'Custu usuàriu tenet una connoscéntzia [[$1|professionale]] de su [[$2|$3]].',
	'babel-N' => 'Custu usuàriu tenet su [[$2|$3]] comente [[$1|limba mama]].',
	'babel-0-n' => "Custu usuàriu [[$1|non cumprendet]] su '''[[$2|Sardu]]''', o ddu cumprendet cun aprentu mannu.",
	'babel-1-n' => "Custu usuàriu podet azudare, ca unu '''[[$1|azicu]]''' de '''[[$2|Sardu]]''' lu connoschet.",
	'babel-2-n' => "Custu usuàriu podet azudare, ca connoschet su '''[[$2|Sardu]]''' e lu '''[[$1|cumprendet]]'''.",
	'babel-3-n' => "Custu usuàriu potet azudare '''[[$1|meda]]''' pro ite ischit faeddare e iscrìere su '''[[$2|Sardu]]'''.",
	'babel-4-n' => "Custu usuàriu faeddat su '''[[$2|Sardu]]''' in modu '''[[$1|perfetu]]'''.",
	'babel-5-n' => 'Custu usuàriu connoschet su [[$2|Sardu]] a livellu [[$1|profesionale]].',
	'babel-N-n' => 'Custu usuàriu faeddat su [[$2|Sardu]]  comente [[$1|limba mama]].',
);

/** Sicilian (Sicilianu)
 * @author Melos
 * @author Santu
 */
$messages['scn'] = array(
	'babel' => "Nfurmazzioni di Babel supra a l'utenti",
	'babel-desc' => 'Junci la parser function <tt>#babel</tt> pi fari la ginirazzioni autumàtica di na culonna babel utenti cu la pussibbilitati di nclùdiri template pirsunalizzati',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Lu nomu utenti spicificatu è usatu pâ criazzioni autumàtica di catigurìi Babel e non pò èssiri riggistratu.',
	'babel-autocreate-reason' => 'Criu autumàticamenti la pàggina dâ catigurìa Babel.',
	'babel-autocreate-text-levels' => "L'utenti nti sta catigurìa dìciunu ca d'aviri nu liveddu di canuscenza $1 dâ lingua $2.",
	'babel-autocreate-text-main' => "L'utenti nti sta catigurìa dìciunu ca canùsciunu la lingua $1.",
	'babel-autocreate-user' => 'Babel AutoCreate',
	'babel-0' => "St'utenti [[$1|nun canusci]] lu [[$2|$3]], o sulu pò liggìrilu nanticchia.",
	'babel-1' => "St'utenti pò cuntribbuìricci c'un [[$2|$3]] ôn [[$1|liveddu vasciu]].",
	'babel-2' => "St'utenti pò cuntribbuìricci c'un [[$2|$3]] ôn [[$1|liveddu mediu]].",
	'babel-3' => "St'utenti pò cuntribbuìricci c'un [[$2|$3]] ôn [[$1|liveddu avanzatu]].",
	'babel-4' => "St'utenti canusci lu [[$2|$3]] quasi comu la sò [[$1|lingua matri]].",
	'babel-5' => "St'utenti pò cuntribbuìricci c'un [[$2|$3]] ôn liveddu [[$1|prufissionali]].",
	'babel-N' => "St'utenti pò cuntribbuìricci c'un liveddu [[$1|matrilingua]] 'n [[$2|$3]].",
	'babel-0-n' => "St'utenti [[$1|non sapi cumunicari]] 'n [[$2|sicilianu]] (o sulu lu capisci cu assai difficultati).",
	'babel-1-n' => "St'utenti pò cuntribbuìri cu nu liveddu [[$1|nicu]] 'n [[$2|sicilianu]].",
	'babel-2-n' => "St'utenti pò cuntribbuiri cu nu liveddu [[$1|minzanu]] 'n [[$2|sicilianu]].",
	'babel-3-n' => "St'utenti pò cuntribbuiri cu nu liveddu [[$1|àutu]] 'n [[$2|sicilianu]].",
	'babel-4-n' => "St'utenti pò cuntribbuiri cu nu liveddu [[$1|quasi matrilingua]] 'n [[$2|sicilianu]].",
	'babel-5-n' => "St'utenti pò cuntribbuiri cu nu liveddu [[$1|prufussiunali]] 'n [[$2|sicilianu]].",
	'babel-N-n' => "St'utenti pò cuntribbuiri c'un  liveddu [[$1|matrilingua]] 'n [[$2|sicilianu]].",
);

/** Sindhi (سنڌي)
 * @author Aursani
 */
$messages['sd'] = array(
	'babel-5' => 'هن يُوزر کي [[$2|$3]] جي [[$1|پيشورانه]] ڄاڻ آهي.',
	'babel-1-n' => 'هن يُوزر کي [[$2|انگريزي]]ءَ جي [[$1|بنيادي]] ڄاڻ آهي.',
	'babel-5-n' => 'هن يُوزر کي [[$2|انگريزي]]ءَ جي [[$1|پيشورانه]] ڄاڻ آهي.',
);

/** Serbo-Croatian (Srpskohrvatski / Српскохрватски)
 * @author OC Ripper
 */
$messages['sh'] = array(
	'babel' => 'Babel korisničke informacije',
	'babel-desc' => 'Dodaje <tt>#babel</tt> parsersku funkciju koja omogućava automatsko pravljenje babel korisničke kutije u stupcu sa mogućnostima uključivanja prilagođenih šablona/predložaka',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Korisničko ime koje ste naveli se koristi za automatsko pravljenje [[$1|Babel]] kategorija i ne može se registrirati.',
	'babel-autocreate-reason' => 'Automatsko stvaranje stranica [[$1|Babel]] kategorija.',
	'babel-autocreate-text-levels' => 'Korisnici u ovoj kategoriji su označeni da imaju nivo $1 znanja $2 jezika.',
	'babel-autocreate-text-main' => 'Korisnici u ovoj kategoriji su označeni da imaju znanje $1 jezika.',
	'babel-0' => 'Ovaj korisnik [[$1|ne]] razumije [[$2|$3]] (ili ga razumije s velikim poteškoćama).',
	'babel-1' => 'Ovaj korisnik posjeduje [[$1|osnovno]] razumijevanje [[$2|$3]] jezika.',
	'babel-2' => 'Ovaj korisnik [[$1|srednje]] razumije [[$2|$3]].',
	'babel-3' => 'Ovaj korisnik [[$1|napredno]] razumije [[$2|$3]].',
	'babel-4' => 'Ovaj korisnik razumije [[$2|$3]] [[$1|gotovo kao maternji]] jezik.',
	'babel-5' => 'Ovaj korisnik [[$2|$3]] na [[$1|profesionalnom]] nivou.',
	'babel-N' => 'Ovaj korisnik razumije [[$2|$3]] kao [[$1|maternji]] jezik.',
	'babel-0-n' => 'Ovaj korisnik [[$1|ne razumije]] [[$2|srpskohrvatski]] (ili ga razumije s velikim poteškoćama).',
	'babel-1-n' => 'Ovaj korisnik ima [[$1|osnovno]] poznavanje [[$2|srpskohrvatskog jezika]].',
	'babel-2-n' => 'Ovaj korisnik [[$1|srednje]] razumije [[$2|srpskohrvatski jezik]].',
	'babel-3-n' => 'Ovaj korisnik ima [[$1|napredno]] poznavanje [[$2|srpskohrvatskog jezika]].',
	'babel-4-n' => 'Ovaj korisnik razumije [[$2|srpskohrvatski]] [[$1|gotovo kao maternji jezik]].',
	'babel-5-n' => 'Ovaj korisnik govori [[$2|srpskohrvatski jezik]] na [[$1|profesionalnoj]] razini.',
	'babel-N-n' => 'Ovaj korisnik razumije [[$2|srpskohrvatski]] kao [[$1|maternji]] jezik.',
);

/** Sinhala (සිංහල)
 * @author Asiri wiki
 * @author නන්දිමිතුරු
 */
$messages['si'] = array(
	'babel' => 'බාබෙල් පරිශීලක තොරතුරු',
	'babel-url' => 'ව්‍යාපෘතිය: බාබෙල්',
	'babel-0' => 'මෙම පරිශීලකයා‍ට [[$2|$3]] පිළිබඳ දැනුමක් [[$1|නැත]].',
	'babel-1' => 'මෙම පරිශීලකයා‍ට [[$2|$3]] පිළිබඳ [[$1|මූලික]] දැනුමක් ඇත.',
	'babel-3' => 'මෙම පරිශීලකයා‍ට [[$2|$3]] පිළිබඳ [[$1|උසස්]] දැනුමක් ඇත.',
	'babel-5' => 'මෙම පරිශීලකයා‍ට [[$2|$3]] පිළිබඳ [[$1| ඉතා උසස්]] දැනුමක් ඇත.',
	'babel-N' => 'මෙම පරිශීලකයාට [[$2|$3]] පිළිබඳ [[$1|ස්වදේශීය]] අවබෝධයක් ඇත.',
	'babel-0-n' => 'මෙම පරිශීලකයා‍ට [[$2|සිංහල භාෂාව]] පිළිබඳ දැනුමක් [[$1|නැත]] (හෝ ඉතාමත් අපහසුවෙන් එය තේරුම් ගනියි).',
	'babel-1-n' => 'මෙම පරිශීලකයා‍ට [[$2|සිංහල භාෂාව]] පිළිබඳ [[$1|මූලික]] දැනුමක් ඇත.',
	'babel-2-n' => 'මෙම පරිශීලකයාහට [[$2|සිංහල භාෂාව]] පිළිබඳ [[$1|අතරමැදි]] දැනුමක් ඇත.',
	'babel-3-n' => 'මෙම පරිශීලකයා‍ට [[$2|සිංහල භාෂාව]] පිළිබඳ [[$1|උසස්]] දැනුමක් ඇත.',
	'babel-4-n' => 'මෙම පරිශීලකයාහට [[$2|සිංහල භාෂාව]] පිළිබඳ [[$1|ස්වදේශීය කථකයෙකුට සමීප]] දැනුමක් ඇත.',
	'babel-5-n' => 'මෙම පරිශීලකයා‍ට [[$2|සිංහල භාෂාව]] පිළිබඳ [[$1| වෘත්තිමය]] දැනුමක් ඇත.',
	'babel-N-n' => 'මෙම පරිශීලකයාහට [[$2|සිංහල භාෂාව]] පිළිබඳ [[$1|ස්වදේශීය]] දැනුමක් ඇත.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 * @author Meno25
 */
$messages['sk'] = array(
	'babel' => 'Babylon - informácie o používateľovi',
	'babel-desc' => 'Pridáva funkciu syntaktického analyzátora <tt>#babel</tt>, ktorá umožňuje automatickú tvorbu babylonských šablón používateľov s možnosťou používať prispôsobené šablóny.',
	'babel-url' => 'Project:Babylon',
	'babel-autocreate-abort' => 'Používateľ, ktorého ste zadali sa používa na automatickú tvorbu kategórií [[$1|Babylonu]] a nie je možné ho zaregistrovať.',
	'babel-autocreate-reason' => 'Automaticky sa vytvára stránka kategórie [[$1|Babylon]].',
	'babel-autocreate-text-levels' => 'Používatelia v tejto kategórii označili svoju úroveň v jazyku $2 ako $1.',
	'babel-autocreate-text-main' => 'Používatelia v tejto kategórii označili, že poznajú jazyk $1.',
	'babel-0' => 'Tento používateľ [[$1|nemá]] znalosti [[$2|{{GRAMMAR:genitív|$3}}]] (alebo jej rozumie so značnými problémami).',
	'babel-1' => 'Tento používateľ má [[$1|základné]] znalosti [[$2|{{GRAMMAR:genitív|$3}}]].',
	'babel-2' => 'Tento používateľ má [[$1|stredné]] znalosti [[$2|{{GRAMMAR:genitív|$3}}]].',
	'babel-3' => 'Tento používateľ má [[$1|pokročilé]] znalosti [[$2|{{GRAMMAR:genitív|$3}}]].',
	'babel-4' => 'Tento používateľ má znalosti [[$2|{{GRAMMAR:genitív|$3}}]] takmer na úrovni [[$1|rodného jazyka]].',
	'babel-5' => 'Tento používateľ má [[$1|profesionálne]] znalosti [[$2|{{GRAMMAR:genitív|$3}}]].',
	'babel-N' => 'Tento používateľ má [[$2|{{GRAMMAR:akuzatív|$3}}]] ako [[$1|rodný jazyk]].',
	'babel-0-n' => 'Tento redaktor [[$1|nerozumie]] po [[$2|anglicky]] (alebo rozumie so značnými problémami).',
	'babel-1-n' => 'Tento redaktor má [[$1|základné]] znalosti [[$2|slovenčiny]].',
	'babel-2-n' => 'Tento redaktor má [[$1|stredné]] znalosti [[$2|slovenčiny]].',
	'babel-3-n' => 'Tento redaktor má [[$1|pokročilé]] znalosti [[$2|slovenčiny]].',
	'babel-4-n' => 'Tento redaktor má znalosti [[$2|slovenčiny]] [[$1|takmer na úrovni materinského jazyka]].',
	'babel-5-n' => 'Tento redaktor má [[$1|profesionálne]] znalosti [[$2|slovenčiny]].',
	'babel-N-n' => 'Tento redaktor má [[$2|angličtinu]] ako [[$1|materinský jazyk]].',
);

/** Slovenian (Slovenščina)
 * @author Smihael
 */
$messages['sl'] = array(
	'babel-0' => 'Ta uporabnik [[$1|nima]] znanja [[$2|$3]] (ali pa ima težave z razumevanjem).',
	'babel-1' => 'Ta uporabnik ima [[$1|osnovno]] znanje [[$2|$3]].',
	'babel-2' => 'Uporabnik [[$1|srednje dobro]] govori [[$2|$3]].',
	'babel-3' => 'Uporabnik [[$1|zelo dobro]] govori [[$2|$3]].',
	'babel-4' => 'Uporabnik govori [[$2|$3]] [[$1|skoraj enako dobro kakor prvi jezik]].',
	'babel-5' => 'Uporabnik govori [[$2|$3]] na [[$1|profesionalni]] ravni.',
	'babel-N' => 'Ta uporabnik govori [[$2|{{GRAMMAR:akuzativ|$3}}]] kot materni jezik.',
	'babel-0-n' => 'Ta uporabnik [[$1|ne govori]] [[$2|slovenščine]] oz. ima velike težave pri razumevanju.',
	'babel-1-n' => "Uporabnik pozna '''[[$1|osnove]]''' '''[[$1|slovenskega jezika]].",
	'babel-2-n' => "Uporabnik '''[[$1|srednje dobro]]''' govori '''[[$2|slovenščino]].",
	'babel-3-n' => "Uporabnik '''[[$1|zelo dobro]]''' govori '''[[$2|slovenščino]].",
	'babel-4-n' => "Uporabnik govori '''[[$1|slovensko]]''' skoraj '''[[$2|enako dobro kakor prvi jezik]]'''.",
	'babel-5-n' => 'Uporabnik govori [[$2|slovenščino]] na [[$1|profesionalni]] ravni.',
	'babel-N-n' => "Ta uporabnik govori '''[[$1|slovenščino]]''' kot '''[[$2|materni jezik]]'''.",
);

/** Lower Silesian (Schläsch)
 * @author Jonny84
 * @author Piotron
 */
$messages['sli'] = array(
	'babel' => 'Babel-Benutzer-Information',
	'babel-desc' => 'Ergänzt de <tt>#babel</tt>-Parserfunktion zur automatischen Erstellung vo Babel-Benutzerboxen-Zeilen mit der Möglichkeit, eigene Vorlagen einzubinden',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Dar oausgewählte Nutzername werd fier de automatische Arstellung voo [[$1|Babel]]-Kategoria benötigt un kaon nä registriert werda.',
	'babel-autocreate-reason' => 'Automatisch arstellte [[$1|Babel]]-Kategorie.',
	'babel-autocreate-text-levels' => 'Benutzer ei dieser Kategorie haben den Kenntnis-Level $1 für die Sproache $2.',
	'babel-autocreate-text-main' => 'Benutzer ei dieser Kategorie haben Kenntnisse der Sproache $1.',
	'babel-0' => 'Dieser Benutzer beherrscht [[$2|$3]] [[$1|nicht]] (oder versteht es nur mit beträchtlichen Schwierigkeiten).',
	'babel-1' => 'Dieser Benutzer beherrscht [[$2|$3]] auf [[$1|grundlegendem]] Niveau.',
	'babel-2' => 'Dieser Benutzer beherrscht [[$2|$3]] uff [[$1|fortgeschrittenem]] Niveau.',
	'babel-3' => 'Dieser Benutzer beherrscht [[$2|$3]] uff [[$1|hohem]] Niveau.',
	'babel-4' => 'Dieser Benutzer beherrscht [[$2|$3]] uff [[$1|muttersprachlichem Niveau]].',
	'babel-5' => 'Dieser Benutzer beherrscht [[$2|$3]] uff [[$1|professionellem]] Niveau.',
	'babel-N' => 'Dieser Benutzer spricht [[$2|$3]] als [[$1|Muttersproache]].',
	'babel-0-n' => 'Dieser Benutzer beherrscht [[$2|Schläsch]] [[$1|nä]] (oder versteht es nur mit beträchtlicha Schwierigkeita).',
	'babel-1-n' => 'Dieser Benutzer koann a wing [[$2|Schläsch]].',
	'babel-2-n' => 'Dieser Benutzer beherrscht [[$2|Schläsch]] uff [[$1|fortgeschrittenem]] Niveau.',
	'babel-3-n' => 'Dieser Benutzer beherrscht [[$2|Schläsch]] uff [[$1|hohem]] Niveau.',
	'babel-4-n' => 'Dieser Benutzer beherrscht [[$2|Schläsch]] uff [[$1|muttersproachlichem Niveau]].',
	'babel-5-n' => 'Dieser Benutzer beherrscht [[$2|Schläsch]] uff [[$1|professionellem]] Niveau.',
	'babel-N-n' => 'Dieser Benutzer ies a echte schläsche Lerge un spricht [[$2|Schläsch]] als [[$1|Muttersproache]].',
);

/** Albanian (Shqip)
 * @author Dori
 * @author Eagleal
 */
$messages['sq'] = array(
	'babel' => 'Informacioni Babel i Përdoruesit',
	'babel-desc' => 'Shton mundësinë <tt>#babel</tt> për të lejuar krijimin automatik të kutive babel me mundësinë për të shtuar stampa vetjake.',
	'babel-url' => 'Project:Babel',
	'babel-0' => 'Ky përdorues [[$1|nuk ka]] njohuri të [[$2|$3]] (ose e kupton me shumë vështirësi).',
	'babel-1' => 'Ky përdorues ka njohuri [[$1|të kufizuar]] të [[$2|$3]].',
	'babel-2' => 'Ky përdorues ka njohuri [[$1|thelbësore]] të [[$2|$3]].',
	'babel-3' => 'Ky përdorues ka njohuri [[$1|të thellë]] të [[$2|$3]].',
	'babel-4' => 'Ky përdorues ka njohuri [[$1|afërsisht amtare]] të [[$2|$3]].',
	'babel-5' => 'Ky përdorues ka njohuri [[$1|profesionale]] të [[$2|$3]].',
	'babel-N' => 'Ky përdorues ka njohuri [[$1|amtare]] të [[$2|$3]].',
	'babel-0-n' => 'Ky përdorues [[$1|nuk ka]] njohuri të [[$2|anglishtes]] (ose e kupton me vështirësi të madhe).',
	'babel-1-n' => 'Ky përdorues ka njohuri [[$1|të kufizuar]] të [[$2|gjuhës Shqipe]].',
	'babel-2-n' => 'Ky përdorues ka njohuri [[$1|thelbësore]] të [[$2|gjuhës Shqipe]].',
	'babel-3-n' => 'Ky përdorues ka njohuri [[$1|të thellë]] të [[$2|gjuhës Shqipe]].',
	'babel-4-n' => 'Ky përdorues ka njohuri [[$1|afërsisht amtare]] të [[$2|gjuhës Shqipe]].',
	'babel-5-n' => 'Ky përdorues ka njohuri [[$1|profesionale]] të [[$2|gjuhës Shqipe]].',
	'babel-N-n' => 'Ky përdorues ka njohuri [[$1|amtare]] të [[$2|gjuhës Shqipe]].',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'babel' => 'Језичке кутијице',
	'babel-desc' => 'Додаје парсер-функцију <tt>#babel</tt>, која омогућује аутоматизовано додавање језичких кутијица уз могућност укључивања сопствених шаблона',
	'babel-0' => 'Овај корисник [[$1|не]] зна [[$2|$3]] језик (или га разуме са знатним потешкоћама)',
	'babel-1' => 'Овај корисник говори [[$2|$3]] језик [[$1|почетнички]].',
	'babel-2' => 'Овај корисник [[$1|средње]] познаје [[$2|$3]] језик.',
	'babel-3' => 'Овај корисник [[$1|доста добро]] говори [[$2|$3]] језик.',
	'babel-4' => 'Овај корисник [[$1|течно]] говори [[$2|$3]] језик.',
	'babel-5' => 'Овај корисник зна [[$2|$3]] језик на [[$1|професионалном]] нивоу.',
	'babel-N' => '[[$1|Матерњи језик]] овог корисника је [[$2|$3]] језик.',
	'babel-0-n' => 'Овај корисник [[$1|не]] зна [[$2|српски језик]] (или га разуме са знатним потешкоћама)',
	'babel-1-n' => 'Овај корисник има [[$1|основно]] познавање [[$2|српског језика]].',
	'babel-2-n' => 'Овај корисник [[$1|средње]] говори [[$2|српски језик]].',
	'babel-3-n' => 'Овај корисник [[$1|доста добро]] говори [[$2|српски језик]].',
	'babel-4-n' => 'Овај корисник [[$1|течно]] говори [[$2|српски језик]].',
	'babel-5-n' => 'Овај корисник има [[$1|професионално]] знање [[$2|српског језика]].',
	'babel-N-n' => '[[$1|Матерњи језик]] овог корисника је [[$2|српски језик]].',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'babel' => 'Babel-Benutser-Information',
	'babel-desc' => 'Föiget an ju <tt>#babel</tt>-Parserfunktion foar automatisk Deerstaalen fon Babel-Benutserboxen-Riegen ju Muugelkhaid tou, oaine Foarloagen ientoubienden',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Die uutwäälde Benutsernoome wäd foar dät automatisk Moakjen fon Babel-Kategorien benöödiged un kon nit registrierd wäide.',
	'babel-autocreate-reason' => 'Automatisk moakede Babel-Kategorie.',
	'babel-autocreate-text-levels' => 'Benutsere in disse Kategorie hääbe ju Kunde-Ieuwene $1 foar ju Sproake $2.',
	'babel-autocreate-text-main' => 'Benutsere in disse Kategorie hääbe Kunde fon ju Sproake $1.',
	'babel-0' => 'Dissen Benutser boalt un ferstoant [[$1|neen]] [[$2|$3]].',
	'babel-1' => 'Dissen Benutser [[$1|boalt un ferstoant n Bitje]] [[$2|$3]].',
	'babel-2' => 'Dissen Benutser kon [[$1|oarich]] [[$2|$3]] baale.',
	'babel-3' => 'Dissen Benutser kon [[$1|goud]] [[$2|$3]] baale.',
	'babel-4' => 'Dissen Benutser [[$1|boalt slonk]] [[$2|$3]].',
	'babel-5' => 'Dissen Benutser behärsket [[$2|$3]] ap [[$1|professionelle]] Ieuwene.',
	'babel-N' => 'Dissen Benutser häd [[$2|$3]] [[$1|as Määmesproake]].',
	'babel-0-n' => 'Dissen Benutser behärsket [[$2|Düütsk]] [[$1|nit]] (of ferstoant et man stuur).',
	'babel-1-n' => 'Dissen Benutser behärsket [[$2|Düütsk]] ap [[$1|gruundlääsende]] Ieuwene.',
	'babel-2-n' => 'Dissen Benutser kon [[$1|oarich]] [[$2|Düütsk]] baale.',
	'babel-3-n' => 'Dissen Benutser kon [[$1|goud]] [[$2|Düütsk]] baale.',
	'babel-4-n' => 'Dissen Benutser boalt [[$1|slonk]] [[$2|Düütsk].',
	'babel-5-n' => 'Dissen Benutser behärsket [[$2|Düütsk]] ap [[$1|professionelle]] Ieuwene.',
	'babel-N-n' => 'Dissen Benutser boalt [[$2|Seeltersk]] as [[$1|Määmesproake]].',
);

/** Sundanese (Basa Sunda)
 * @author Irwangatot
 */
$messages['su'] = array(
	'babel' => 'Katerangan Babel Pamaké',
	'babel-desc' => 'Nambahan fungsi parser <tt>#babel</tt> pikeun mintonkeun lajur babel kotak pamaké sacara otomatis jeung pangabisa ngagunakeun citakan dinamis',
	'babel-url' => 'Project:Babel',
	'babel-0' => 'Pamaké ieu [[$1|teu]] ngarti [[$2|$3]] (atawa saeutik-saeutik ngartina).',
	'babel-1' => 'Pamaké ieu gaduh kamampuan [[$2|$3]] hambalan [[$1|dasar]].',
	'babel-2' => 'Pamaké ieu gaduh kamampuan [[$2|$3]] hambalan [[$1|panengah]].',
	'babel-3' => 'Pamaké ieu [[$1|mahér]] [[$2|$3]].',
	'babel-4' => 'Pamaké ieu tiasa [[$2|$3]] anu [[$1|sampurna]].',
	'babel-5' => 'Pamaké ieu tiasa [[$2|$3]] anu [[$1|mahér tur sampurna]].',
	'babel-N' => 'Pamaké ieu [[$1|tulen]] bisa [[$2|$3]].',
	'babel-0-n' => 'Pamaké ieu [[$1|teu]] ngarti [[$2|basa Sunda]] (atawa saeutik-saeutik ngartina).',
	'babel-1-n' => 'Pamaké ieu gaduh kamampuan [[$2|basa Sunda]] hambalan [[$1|dasar]].',
	'babel-2-n' => 'Pamaké ieu gaduh kamampuan [[$2|basa Sunda]] hambalan [[$1|panengah]].',
	'babel-3-n' => 'Pamaké ieu [[$1|mahér]] [[$2|basa Sunda]].',
	'babel-4-n' => 'Pamaké ieu tiasa [[$2|basa Sunda]] anu [[$1|sampurna]].',
	'babel-5-n' => 'Pamaké ieu tiasa [[$2|basa Sunda]] anu [[$1|mahér tur sampurna]].',
	'babel-N-n' => 'Pamaké ieu [[$1|tulen]] bisa [[$2|basa Sunda]] .',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author Jon Harald Søby
 * @author Lejonel
 * @author M.M.S.
 * @author Najami
 */
$messages['sv'] = array(
	'babel' => 'Babel Användarinformation',
	'babel-desc' => 'Lägger till parserfunktionen <tt>#babel</tt> för att tillåta att det automatiskt skapas en babelboxkolumn med möjligheten att lägga till anpassade mallar',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Användarnamnet du valde används för automatiskt skapande av [[$1|Babel]]-kategorier och kan därför inte registreras.',
	'babel-autocreate-reason' => 'Skapar automatiskt en [[$1|Babel]]-kategorisida.',
	'babel-autocreate-text-levels' => 'Användare i den här kategorin visar att de kan språket $2 på en kunskapsnivå av $1.',
	'babel-autocreate-text-main' => 'Användare i den här kategorin visar att de har kunskap i språket $1.',
	'babel-0' => 'Den här användaren förstår [[$1|inte]] [[$2|$3]] (eller förstår det bara med stor svårighet).',
	'babel-1' => 'Den här användaren har [[$1|grundläggande]] kunskaper i [[$2|$3]].',
	'babel-2' => 'Den här användaren har [[$1|medelgoda]] kunskaper i [[$2|$3]].',
	'babel-3' => 'Den här användaren har [[$1|avancerade]] kunskaper i [[$2|$3]].',
	'babel-4' => 'Den här användaren kan [[$2|$3]] [[$1|nästan på modersmålsnivå]].',
	'babel-5' => 'Den här användaren har [[$1|professionella]] kunskaper i [[$2|$3]].',
	'babel-N' => 'Den här användaren har [[$2|$3]] som [[$1|modersmål]].',
	'babel-0-n' => 'Den här användaren har [[$1|inga]] kunskaper i [[$2|svenska]] (eller förstår det med en betydande svårighet).',
	'babel-1-n' => 'Den här användaren har [[$1|grundläggande]] kunskaper i [[$2|svenska]].',
	'babel-2-n' => 'Den här användaren har [[$1|medelgoda]] kunskaper i [[$2|svenska]].',
	'babel-3-n' => 'Den här användaren har [[$1|avancerade]] kunskaper i [[$2|svenska]].',
	'babel-4-n' => 'Den här användaren talar nästan [[$2|svenska]] som en [[$1|modersmålstalare]].',
	'babel-5-n' => 'Den här användaren har [[$1|professionella]] kunskaper i [[$2|svenska]].',
	'babel-N-n' => 'Den här användaren har [[$2|svenska]] som [[$1|modersmål]].',
);

/** Swahili (Kiswahili)
 * @author Malangali
 */
$messages['sw'] = array(
	'babel-0' => 'Mtumiaji huyu [[$1|hajui]] [[$2|$3]] (au anaelewa kidogo sana).',
	'babel-1' => 'Mtumiaji huyu ni mwongeaji wa [[$2|$3]] cha kiwango cha [[$1|Msingi]].',
	'babel-2' => 'Mtumiaji huyu ni mwongeaji wa [[$2|$3]] cha kiwango cha [[$1|Wastani]].',
	'babel-3' => 'Mtumiaji huyu ni mwongeaji wa [[$2|$3]] kiwango [[$1|cha Juu]].',
	'babel-4' => 'Mtumiaji huyu ni mwongeaji wa [[$2|$3]] cha kiwango cha [[$1|Juu Kabisa]].',
	'babel-5' => 'Mtumiaji huyu ni mwongeaji wa [[$2|$3]] cha kiwango cha [[$1|Utaalamu]].',
	'babel-N' => 'Mtumiaji huyu ni mwongeaji wa [[$2|$3]] [[$1|Fasaha]].',
	'babel-0-n' => 'Mtumiaji huyu [[$1|hajui]] [[$2|Kiswahili]] (au anaelewa kidogo sana).',
	'babel-1-n' => 'Mtumiaji huyu ni mwongeaji wa [[$2|Kiswahili]] cha kiwango cha [[$1|Msingi]].',
	'babel-2-n' => 'Mtumiaji huyu ni mwongeaji wa [[$2|Kiswahili]] cha kiwango cha [[$1|Wastani]].',
	'babel-3-n' => 'Mtumiaji huyu ni mwongeaji wa [[$2|Kiswahili]] kiwango [[$1|cha Juu]].',
	'babel-4-n' => 'Mtumiaji huyu ni mwongeaji wa [[$2|Kiswahili]] cha kiwango cha [[$1|Juu Kabisa]].',
	'babel-5-n' => 'Mtumiaji huyu ni mwongeaji wa [[$2|Kiswahili]] cha kiwango cha [[$1|Utaalamu]].',
	'babel-N-n' => 'Mtumiaji huyu ni mwongeaji wa [[$2|Kiswahili]] [[$1|Fasaha]].',
);

/** Silesian (Ślůnski)
 * @author Purodha
 */
$messages['szl'] = array(
	'babel-url' => 'Project:Babel',
	'babel-0-n' => 'Tyn užytkowńik [[$1|ńy godo]] we [[$2|ślůnskij godce]] (abo mo s ńům wjelge trudnośći).',
	'babel-1-n' => 'Tyn užytkowńik zno ino [[$1|trocha]] godka [[$2|ślůnsko]].',
	'babel-2-n' => 'Tyn užytkowńik godo [[$1|středńo]] pů [[$2|ślůnsko]].',
	'babel-3-n' => 'Tyn užytkowńik godo [[$1|fest dobře]] pů [[$2|ślůnsko]].',
	'babel-4-n' => 'Tyn užytkowńik zno [[$2|godka ślůnsko]] [[$1|prowje jak uojčysto]].',
	'babel-N-n' => '[[$2|Ślůnski]] je [[$1|uojčystům godkům]] tygo užytkowńika.',
);

/** Tamil (தமிழ்)
 * @author Trengarasu
 */
$messages['ta'] = array(
	'babel' => 'பாபேல் பயனர் தகவல்கள்',
	'babel-desc' => 'தனிப்பட்ட வார்ப்புருக்கள் உள்ளடங்களாக தானியக்கமாக பாபேல் பயனர் பெட்டிகளை ஆக்குவதை முடுக்கும் வகையில் <tt>#babel</tt>இலக்கணப் பாகுபடுத்தி சார்பை இணைக்கிறது.',
	'babel-url' => 'Project:பாபேல்',
	'babel-0' => 'இந்தப் பயனர் [[$2|$3]] மொழியில் [[$1|பயிற்சி இல்லாதவர்]] (அல்லது கடினப்பாடுகளுடன் விளங்கிக் கொள்ளகிறார்).',
	'babel-1' => 'இந்தப் பயனர் [[$2|$3]] மொழியில் [[$1|அடிப்படை அறிவைக்]] கொண்டவர்.',
	'babel-2' => 'இந்தப் பயனர் [[$2|$3]] மொழியில் [[$1|இடைநிலை அறிவைக்]] கொண்டவர்.',
	'babel-3' => 'இந்தப் பயனர் [[$2|$3]] மொழியில் [[$1|மேம்பட்ட அறிவைக்]] கொண்டவர்.',
	'babel-4' => 'இந்தப் பயனர் [[$2|$3]] மொழியில் [[$1|தாய்மொழிக்குக் கிட்டிய அறிவைக்]] கொண்டவர்.',
	'babel-5' => 'இந்தப் பயனர் [[$2|$3]] மொழியில் [[$1|தொழில் நெறிஞர் தரத்திலான அறிவைக்]] கொண்டவர்.',
	'babel-N' => 'இந்தப் பயனர் [[$2|$3]] மொழியில் [[$1|தாய்மொழி அறிவைக்]] கொண்டவர்.',
	'babel-0-n' => 'இந்தப் பயனர் [[$2|தமிழில்]] [[$1|பயிற்சி இல்லாதவர்]] (அல்லது கடினப்பாடுகளுடன் விளங்கிக் கொள்ளகிறார்).',
	'babel-1-n' => 'இந்தப் பயனர் [[$2|தமிழில்]] [[$1|அடிப்படை அறிவைக்]] கொண்டவர்.',
	'babel-2-n' => 'இந்தப் பயனர் [[$2|தமிழில்]] [[$1|இடைநிலை அறிவைக்]] கொண்டவர்.',
	'babel-3-n' => 'இந்தப் பயனர் [[$2|தமிழில்]] [[$1|மேம்பட்ட அறிவைக்]] கொண்டவர்.',
	'babel-4-n' => 'இந்தப் பயனர் [[$2|தமிழில்]] [[$1|தாய்மொழிக்குக் கிட்டிய அறிவைக்]] கொண்டவர்.',
	'babel-5-n' => 'இந்தப் பயனர் [[$2|தமிழில்]] [[$1|தொழில் நெறிஞர் தரத்திலான அறிவைக்]] கொண்டவர்.',
	'babel-N-n' => 'இந்தப் பயனர் [[$2|தமிழில்]] [[$1|தாய்மொழி அறிவைக்]] கொண்டவர்.',
);

/** Tulu (ತುಳು)
 * @author NamwikiTL
 */
$messages['tcy'] = array(
	'babel' => 'ಬೇಬಲ್ ಬಳಕೆದಾರೆರ್ನ ಮಾಹಿತಿ',
	'babel-desc' => '<tt>#babel</tt> ಪಾರ್ಸರ್ ಫ೦ಕ್ಷನ್ ನ್ ಸೇರ್ಸಾವು೦ಡು. ಈ ಪಾರ್ಸರ್ ಫ೦ಕ್ಷನ್ ಬೇಬಲ್ ಬಳಕೆದಾರೆರ್ನ ಬಾಕ್ಸ್ ನ್ ಸೃಷ್ಟಿ ಮಲ್ಪು೦ಡು. ನೆನೆ ಬುಕ ಕಸ್ಟಮ್ ಟೆ೦ಪ್ಲಟ್ ಡ್ ಪಾಡೊಲಿ.',
	'babel-url' => 'ಯೋಜನೆ:ಬೇಬಲ್',
	'babel-directionality' => 'ಎಡರ್ದ್ ಬಲ',
	'babel-0' => 'ಈ ಬಳಕೆದಾರೆರ್ಗ್  [[$2|$3]] ನೆತ ಬಗ್ಗೆ [[$1|ಶೂನ್ಯ]] ಜ್ನಾನ ಉ೦ಡು (ಅತ್ತ೦ಡ ಭಾರಿ ಕಷ್ಟೊಡು ಅರ್ಥ ಮಲ್ತೊನ್ವೆರ್)',
	'babel-1' => 'ಈ ಬಳಕೆದಾರೆರ್ಗ್ [[$2|$3]] ನೆತ ಬಗ್ಗೆ [[$1|ಪ್ರಾಥಮಿಕ]] ಜ್ನಾನ ಉ೦ಡು.',
	'babel-2' => 'ಈ ಬಳಕೆದಾರೆರ್ಗ್ [[$2|$3]] ನೆತ ಬಗ್ಗೆ [[$1|ಮಧ್ಯಮ ಮಟ್ಟದ]] ಜ್ನಾನ ಉ೦ಡು',
	'babel-3' => 'ಈ ಬಳಕೆದಾರೆರ್ಗ್ [[$2|$3]] ನೆತ ಬಗ್ಗೆ [[$1|ಉನ್ನತ ಮಟ್ಟದ]] ಜ್ನಾನ ಉ೦ಡು',
	'babel-4' => 'ಈ ಬಳಕೆದಾರೆರ್ಗ್ [[$2|$3]] ನೆತ ಬಗ್ಗೆ [[$1|ಮೂಲಭಾಷಿಕೆರ್ನ ಮಟ್ಟದ]] ಜ್ನಾನ ಉ೦ಡು',
	'babel-5' => 'ಈ ಬಳಕೆದಾರೆರ್ಗ್ [[$2|$3]] ನೆತ ಬಗ್ಗೆ [[$1|ವೃತ್ತಿ ನಿರತೆರ್ನ ಲೆಕದ]] ಜ್ನಾನ ಉ೦ಡು',
	'babel-N' => 'ಈ ಬಳಕೆದಾರೆರ್ಗ್ [[$2|$3]] ನೆತ ಬಗ್ಗೆ [[$1|ಮೂಲ ಭಾಷಿಕೆರ್ನ]] ಜ್ನಾನ ಉ೦ಡು',
	'babel-0-n' => 'ಈ ಬಳಕೆದಾರೆರ್ಗ್ [[$2|ತುಳು]]ತ ಬಗ್ಗೆ [[$1|ಶೂನ್ಯ]] ಜ್ನಾನ ಉ೦ಡು (ಅತ್ತ೦ಡ ಭಾರಿ ಕಷ್ಟೊಡು ಅರ್ಥ ಮಲ್ತೊನ್ವೆರ್)',
	'babel-1-n' => 'ಈ ಬಳಕೆದಾರೆರ್ಗ್  [[$2|ತುಳು]]ತ ಬಗ್ಗೆ [[$1|ಪ್ರಾಥಮಿಕ]] ಜ್ನಾನ ಉ೦ಡು',
	'babel-2-n' => 'ಈ ಬಳಕೆದಾರೆರ್ಗ್ [[$2|ತುಳು]]ತ ಬಗ್ಗೆ [[$1|ಮಧ್ಯಮ ಮಟ್ಟದ]] ಜ್ನಾನ ಉ೦ಡು',
	'babel-3-n' => 'ಈ ಬಳಕೆದಾರೆರ್ಗ್ [[$2|ತುಳು]]ತ ಬಗ್ಗೆ [[$1|ಉನ್ನತ ಮಟ್ಟದ]] ಜ್ನಾನ ಉ೦ಡು',
	'babel-4-n' => 'ಈ ಬಳಕೆದಾರೆರ್ಗ್ [[$2|ತುಳು]]ತ ಬಗ್ಗೆ [[$1|ಮೂಲಭಾಷಿಕೆರ್ನ ಮಟ್ಟದ]] ಜ್ನಾನ ಉ೦ಡು',
	'babel-5-n' => 'ಈ ಬಳಕೆದಾರೆರ್ಗ್ [[$2|ತುಳು]]ತ ಬಗ್ಗೆ [[$1|ವೃತ್ತಿಪರೆರ್ನ]] ಜ್ನಾನ ಉ೦ಡು',
	'babel-N-n' => 'ಈ ಬಳಕೆದಾರೆರ್ಗ್ [[$2|ತುಳು]]ತ ಬಗ್ಗೆ [[$1|ಮೂಲಭಾಷಿಕೆರ್ನ]] ಜ್ನಾನ ಉ೦ಡು',
);

/** Telugu (తెలుగు)
 * @author Mpradeep
 * @author Veeven
 */
$messages['te'] = array(
	'babel' => 'సభ్యుని బేబెల్ సమాచారం',
	'babel-desc' => '<tt>#babel</tt> పార్సరు ఫంక్సనుని కలపటం ద్వారా, బేబెల్ వాడుకరి పెట్టెల వరుసలో, ఇతర మూసలను కూడా జతపరచగలిగేటటు సృష్టిస్తుంది',
	'babel-url' => 'Project:బేబెల్',
	'babel-0' => 'ఈ వాడుకరికి [[$2|$3]] భాషపై ఎటువంటి పరిజ్ఞానం [[$1|లేదు]] (లేదా అర్థంచేసుకోవడానికి చాలా కష్టపడతాడు).',
	'babel-1' => 'ఈ వాడుకరికి [[$2|$3]] భాషపై [[$1|ప్రాధమిక]] అవగాహన ఉంది.',
	'babel-2' => 'ఈ వాడుకరికి [[$2|$3]] భాషపై [[$1|మధ్య స్థాయి]] అవగాహన ఉంది.',
	'babel-3' => 'ఈ వాడుకరికి [[$2|$3]] భాషపై [[$1|చాలా మంచి]] అవగాహన ఉంది.',
	'babel-4' => 'ఈ వాడుకరికి [[$2|$3]] భాషపై [[$1|మాతృభాషపై ఉన్నంత]] అవగాహన ఉంది.',
	'babel-5' => 'ఈ వాడుకరికి [[$2|$3]] భాషపై [[$1|వృత్తి నైపుణ్యం]] ఉంది.',
	'babel-N' => 'ఈ వాడుకరి [[$1|మాతృభాష]] [[$2|$3]].',
	'babel-0-n' => 'ఈ వాడుకరికి [[$2|తెలుగు]] భాషపై ఎటువంటి పరిజ్ఞానం [[$1|లేదు]] (లేదా అర్థంచేసుకోవడానికి చాలా కష్టపడతాడు).',
	'babel-1-n' => 'ఈ వాడుకరికి [[$2|తెలుగు]] భాషపై [[$1|ప్రాధమిక]] అవగాహన ఉంది.',
	'babel-2-n' => 'ఈ వాడుకరికి [[$2|తెలుగు]] భాషపై [[$1|మధ్య స్థాయి]] అవగాహన ఉంది.',
	'babel-3-n' => 'ఈ వాడుకరికి [[$2|తెలుగు]] భాషపై [[$1|చాలా మంచి]] అవగాహన ఉంది.',
	'babel-4-n' => 'ఈ వాడుకరికి [[$2|తెలుగు]] భాషపై [[$1|మాతృభాషపై ఉన్నంత]] అవగాహన ఉంది.',
	'babel-5-n' => 'ఈ వాడుకరికి [[$2|తెలుగు]] భాషపై [[$1|వృత్తి నైపుణ్యం]] ఉంది.',
	'babel-N-n' => 'ఈ వాడుకరి [[$1|మాతృభాష]] [[$2|తెలుగు]].',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'babel' => 'Иттилооти Корбари Бобул',
	'babel-desc' => 'Дастури таҷзеҳгарро <tt>#babel</tt> изофа мекунад, ки имкони эҷоди худкори ҷаъбаҳои коргарии бобул бо қобилияти ғунҷонидани шаблонҳои дихоҳро фароҳам мекунад',
	'babel-url' => 'Project:Бобул',
	'babel-0' => 'Ин корбар [[$2|$3]]ро [[$1|намефаҳмад]] (ё онро бо душворӣ мефаҳмад).',
	'babel-1' => 'Ин корбар [[$2|$3]]ро дар сатҳи [[$1|муқаддамотӣ]] мефаҳмад.',
	'babel-2' => 'Ин корбар [[$2|$3]]ро дар сатҳи [[$1|миёна]] мефаҳмад.',
);

/** Thai (ไทย)
 * @author Manop
 * @author Passawuth
 */
$messages['th'] = array(
	'babel' => 'ข้อมูลภาษาของผู้ใช้',
	'babel-desc' => 'ใส่ฟังก์ชัน <tt>#babel</tt> เพื่อที่จะใส่คอลัมน์กล่องผู้ใช้บาเบลอัตโนมัติ รวมทั้งความสามารถที่จะใส่แม่แบบที่ต้องการได้ด้วย',
	'babel-url' => 'Project:บาเบล',
	'babel-autocreate-abort' => 'ผู้้้ใช้ที่คุณระบุถูกใช้ในการสร้างหน้าหมวดหมู่[[$1|บาเบล]]อัตโนมัติ และไม่สามารถสมัครได้',
	'babel-autocreate-reason' => 'สร้างหน้าหมวดหมู่[[$1|บาเบล]]อัตโนมัติ',
	'babel-autocreate-text-levels' => 'ผู้ใช้ในหมวดหมู่นี้ มีทักษะในการใช้ภาษา$2 ในระดับที่ $1',
	'babel-autocreate-text-main' => 'ผู้ใช้ในหมวดหมมู่นี้ มีความรู้เกี่ยวกับภาษา$1',
	'babel-0' => 'ผู้ใช้คนนี้[[$1|ไม่มี]]ความรู้เกี่ยวกับ[[$2|$3]] (หรือเข้าใจได้ด้วยความยากลำบาก)',
	'babel-1' => 'ผู้ใช้คนนี้มีความรู้[[$1|พื้นฐาน]]เกี่ยวกับ[[$2|$3]]',
	'babel-2' => 'ผู้ใช้คนนี้มีความรู้[[$1|ระดับกลาง]]เกี่ยวกับ[[$2|$3]]',
	'babel-3' => 'ผู้ใช้คนนี้มีความรู้[[$1|ระดับสูง]]เกี่ยวกับ[[$2|$3]]',
	'babel-4' => 'ผู้ใช้คนนี้สามารถใช้[[$2|$3]]ได้เหมือน[[$1|ภาษาแม่]]',
	'babel-5' => 'ผู้ใช้คนนี้สามารถใช้[[$2|$3]]ได้อย่าง[[$1|เชี่ยวชาญ]]',
	'babel-N' => 'ผู้ใช้คนนี้ใช้[[$2|$3]]เป็น[[$1|ภาษาแม่]]',
	'babel-0-n' => 'ผู้ใช้คนนี้[[$1|ไม่มี]]ความรู้เกี่ยวกับ[[$2|ภาษาไทย]] (หรือเข้าใจได้ด้วยความยากลำบาก)',
	'babel-1-n' => 'ผู้ใช้คนนี้มีความรู้[[$1|พื้นฐาน]]เกี่ยวกับ[[$2|ภาษาไทย]]',
	'babel-2-n' => 'ผู้ใช้คนนี้มีความรู้[[$1|ระดับกลาง]]เกี่ยวกับ[[$2|ภาษาไทย]]',
	'babel-3-n' => 'ผู้ใช้คนนี้มีความรู้[[$1|ระดับสูง]]เกี่ยวกับ[[$2|ภาษาไทย]]',
	'babel-4-n' => 'ผู้ใช้คนนี้สามารถใช้[[$2|ภาษาไทย]]ได้เหมือน[[$1|ภาษาแม่]]',
	'babel-5-n' => 'ผู้ใช้คนนี้สามารถใช้[[$2|ภาษาไทย]]ได้อย่าง[[$1|เชี่ยวชาญ]]',
	'babel-N-n' => 'ผู้ใช้คนนี้ใช้[[$2|ภาษาไทย]]เป็น[[$1|ภาษาแม่]]',
);

/** Turkmen (Türkmençe)
 * @author Hanberke
 */
$messages['tk'] = array(
	'babel' => 'Babyl ulanyjy maglumaty',
	'babel-desc' => 'Ýörite şablonlary öz içine almak häsiýeti bar bolan Babyl ulanyjy gutusy sütüniniň awtomatik usulda döredilmegi üçin <tt>#babel</tt> parser funksiýasyny goşýar',
	'babel-url' => 'Project:Babyl',
	'babel-autocreate-abort' => 'Görkezen ulanyjy adyňyz [[$1|Babyl]] kategoriýasynyň awtomatik usulda döredilmeginde ulanylýar we ony alyp bolmaýar.',
	'babel-autocreate-reason' => 'Awtomatik usulda [[$1|Babyl]] kategoriýa sahypasy döredilýär.',
	'babel-autocreate-text-levels' => 'Bu kategoriýadaky ulanyjylar $1 derejede $2 dilini bilýändiklerini görkezýär.',
	'babel-autocreate-text-main' => 'Bu kategoriýadaky ulanyjylar $1 dilini bilýändiklerini görkezýär.',
	'babel-0' => 'Bu ulanyjy [[$1|hiç hili]] [[$2|$3]] bilmeýär (ýa-da örän kynlyk bilen düşünýär).',
	'babel-1' => 'Bu ulanyjy [[$1|başlangyç derejede]] [[$2|$3]] bilýär.',
	'babel-2' => 'Bu ulanyjy [[$1|orta derejede]] [[$2|$3]] bilýär.',
	'babel-3' => 'Bu ulanyjy [[$1|ýokary derejede]] [[$2|$3]] bilýär.',
	'babel-4' => 'Bu ulanyjy [[$1|öz ene dili ýaly]] [[$2|$3]] bilýär.',
	'babel-5' => 'Bu ulanyjy [[$1|professional derejede]] [[$2|$3]] bilýär.',
	'babel-N' => 'Bu ulanyjynyň [[$1|öz ene dili]] [[$2|$3]]dir.',
	'babel-0-n' => 'Bu ulanyjy [[$1|hiç hili]] [[$2|Türkmençe]] bilmeýär (ýa-da örän kynlyk bilen düşünýär).',
	'babel-1-n' => 'Bu ulanyjy [[$1|başlangyç derejede]] [[$2|Türkmençe]] bilýär.',
	'babel-2-n' => 'Bu ulanyjy [[$1|orta derejede]] [[$2|Türkmençe]] bilýär.',
	'babel-3-n' => 'Bu ulanyjy [[$1|ýokary derejede]] [[$2|Türkmençe]] bilýär.',
	'babel-4-n' => 'Bu ulanyjy [[$1|öz ene dili ýaly]] [[$2|Türkmençe]] bilýär.',
	'babel-5-n' => 'Bu ulanyjy [[$1|professional derejede]] [[$2|Türkmençe]] bilýär.',
	'babel-N-n' => 'Bu ulanyjynyň [[$1|öz ene dili]] [[$2|Türkmençe]]dir.',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'babel' => 'Kabatirang pangtagagamit ng Babel',
	'babel-desc' => "Nagdaragdag ng tungkuling pambanghay (''parser'') na <tt>#babel</tt> para payagan ang kusang paglitaw ng isang hanay sa kahong pantagagamit ng babel na may kakayahang magsali ng nakahandang mga suleras",
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Ang tinukoy mong pangalan ng tagagamit ay ginagamit para sa kusang paglikha ng kauriang pam-[[$1|Babel]] at hindi maitatala.',
	'babel-autocreate-reason' => 'Kusang lumilikha ng pahina ng kauriang pam-[[$1|Babel]].',
	'babel-autocreate-text-levels' => 'Nagpapakita na may kakayahang pang-antas $1 sa wikang $2 ang mga tagagamit na nasa kauriang ito.',
	'babel-autocreate-text-main' => 'Nagpapakitang may kaalaman sa wikang $1 ang mga tagagamit na nasa kauriang ito.',
	'babel-autocreate-user' => 'Babel Likhain-ng-Kusa',
	'babel-directionality' => 'Kapupuntahan ng isinasalin mong wika (tinatanggap na halaga: "ltr" para mula sa kaliwa pakanan", o "rtl" para mula sa kanan pakaliwa).',
	'babel-0' => '[[$1|Walang]] kaalaman sa [[$2|$3]] (o may malaking kahirapan sa pagunawa dito) ang tagagamit na ito.',
	'babel-1' => 'May [[$1|payak]] na kaalaman sa [[$2|$3]] ang tagagamit na ito.',
	'babel-2' => 'May [[$1|panggitnang]] kaalaman sa [[$2|$3]] ang tagagamit na ito.',
	'babel-3' => 'May [[$1|mahigit]] na kaalaman sa [[$2|$3]] ang tagagamit na ito.',
	'babel-4' => 'May [[$1|malakatutubong]] kaalaman sa pagsasalita ng [[$2|$3]] ang tagagamit na ito.',
	'babel-5' => 'May [[$1|dalubhasang]] kaalaman sa [[$2|$3]] ang tagagamit na ito.',
	'babel-N' => 'May [[$1|katutubong]] pang-unawa sa [[$2|$3]] ang tagagamit na ito.',
	'babel-0-n' => '[[$1|Walang]] kaalaman sa [[$2|Tagalog]] (o may kahirapan sa pagunawa dito) ang tagagamit na ito.',
	'babel-1-n' => 'May [[$1|payak]] na kaalaman sa [[$2|Tagalog]] ang tagagamit na ito.',
	'babel-2-n' => 'May [[$1|panggitnang]] kaalaman sa [[$2|Tagalog]] ang tagagamit na ito.',
	'babel-3-n' => 'May [[$1|mahigit]] na kaalaman sa [[$2|Tagalog]] ang tagagamit na ito.',
	'babel-4-n' => 'May [[$1|malakatutubong]] kaalaman sa pagsasalita ng [[$2|Tagalog]] ang tagagamit na ito.',
	'babel-5-n' => 'May [[$1|dalubhasang]] kaalaman sa [[$2|Tagalog]] ang tagagamit na ito.',
	'babel-N-n' => 'May [[$1|katutubong]] pang-unawa sa [[$2|Tagalog]] ang tagagamit na ito.',
);

/** Tok Pisin (Tok Pisin)
 * @author Iceflow
 */
$messages['tpi'] = array(
	'babel-0-n' => 'Dispela yusa i [[$1|no save]] long [[$2|Tok Pisin]]',
	'babel-1-n' => 'Dispela yusa i save [[$1|liklik tasol]] long [[$2|Tok Pisin]].',
	'babel-2-n' => 'Dispela yusa i save [[$1|hap hap]] long [[$2|Tok Pisin]].',
	'babel-3-n' => 'Dispela yusa i save [[$1|gut tru]] long [[$2|Tok Pisin]].',
	'babel-4-n' => 'Dispela yusa i save long [[$2|Tok Pisin]] [[$1|kain klostu wanpela lokol]].',
	'babel-5-n' => 'Dispela yusa i [[$1|man bilong]] save long [[$2|Tok Pisin]].',
	'babel-N-n' => 'Dispela yusa i save long [[$2|Tok Pisin]] [[$1|kain olsem wanpela lokol]].',
);

/** Turkish (Türkçe)
 * @author Joseph
 * @author Karduelis
 */
$messages['tr'] = array(
	'babel' => 'Babil kullanıcı bilgileri',
	'babel-desc' => 'Özel şablonlar içerme özelliği olan Babil kullanıcı kutusu sütununun otomatik oluşturulması için <tt>#babel</tt> derleyici fonksiyonunu ekler',
	'babel-url' => 'Proje:Babil',
	'babel-autocreate-abort' => 'Belirttiğiniz kullanıcı adı [[$1|Babil]] kategorisinin otomatik oluşturulması için kullanılıyor ve alınamaz.',
	'babel-autocreate-reason' => 'Otomatik olarak [[$1|Babil]] kategori sayfası oluşturuluyor.',
	'babel-autocreate-text-levels' => 'Bu kategorideki kullanıcılar $1 seviyede $2 dilini bildiklerini belirtiyor.',
	'babel-autocreate-text-main' => 'Bu kategorideki kullanıcılar $1 dilini bildiklerini belirtiyor.',
	'babel-autocreate-user' => 'Babil OtomatikOluştur',
	'babel-directionality' => 'soldansağa',
	'babel-0' => 'Bu kullanıcı [[$1|hiç]] [[$2|$3]] bilmiyor (ya da bir hayli zor anlıyor).',
	'babel-1' => 'Bu kullanıcı [[$1|temel düzeyde]] [[$2|$3]] bilir.',
	'babel-2' => 'Bu kullanıcı [[$1|orta düzeyde]] [[$2|$3]] bilir.',
	'babel-3' => 'Bu kullanıcı [[$1|ileri seviyede]] [[$2|$3]] bilir.',
	'babel-4' => 'Bu kullanıcı [[$1|anadili gibi]] [[$2|$3]] konuşabilir.',
	'babel-5' => 'Bu kullanıcı [[$1|profesyonel]] [[$2|$3]] bilgisine sahiptir.',
	'babel-N' => "Bu kullanıcının [[$1|anadili]] [[$2|$3]]'dir.",
	'babel-0-n' => 'Bu kullanıcı [[$1|hiç]] [[$2|Türkçe]] bilmiyor (ya da bir hayli zor anlıyor).',
	'babel-1-n' => 'Bu kullanıcı [[$1|temel düzeyde]] [[$2|Türkçe]] bilir.',
	'babel-2-n' => 'Bu kullanıcı [[$1|orta düzeyde]] [[$2|Türkçe]] bilir.',
	'babel-3-n' => 'Bu kullanıcı [[$1|ileri seviyede]] [[$2|Türkçe]] bilir.',
	'babel-4-n' => 'Bu kullanıcı [[$1|anadili gibi]] [[$2|Türkçe]] konuşabilir.',
	'babel-5-n' => 'Bu kullanıcı [[$1|profesyonel]] [[$2|Türkçe]] bilgisine sahiptir.',
	'babel-N-n' => "Bu kullanıcının [[$1|anadili]] [[$2|Türkçe]]'dir.",
);

/** Ukrainian (Українська)
 * @author AS
 * @author Ahonc
 */
$messages['uk'] = array(
	'babel' => 'Babel User Information',
	'babel-desc' => 'Додає функцію парсера <tt>#babel</tt>, яка дозволяє автоматично створювати стовпець про володіння мовами з можливістю включення інших шаблонів',
	'babel-url' => 'Project:Вавилон',
	'babel-0' => 'Цей користувач [[$1|не володіє]] [[$2|$3]] (або розуміє її дуже погано).',
	'babel-1' => 'Цей користувач володіє [[$2|$3]] на [[$1|початковому рівні]].',
	'babel-2' => 'Цей користувач володіє [[$2|$3]] на [[$1|середньому рівні]].',
	'babel-3' => 'Цей користувач володіє [[$2|$3]] на [[$1|високому рівні]].',
	'babel-4' => 'Цей користувач володіє [[$2|$3]] майже [[$1|як рідною]].',
	'babel-5' => 'Цей користувач [[$1|професійно]] володіє [[$2|$3]].',
	'babel-N' => 'Для цього користувача [[$2|$3]] є [[$1|рідною]].',
	'babel-0-n' => 'Цей користувач [[$1|не володіє]] [[$2|українською мовою]] (або розуміє її дуже погано).',
	'babel-1-n' => 'Цей користувач володіє [[$2|українською мовою]] на [[$1|початковому рівні]].',
	'babel-2-n' => 'Цей користувач володіє [[$2|українською мовою]] на [[$1|середньому рівні]].',
	'babel-3-n' => 'Цей користувач володіє [[$2|українську мову]] на [[$1|високому рівні]].',
	'babel-4-n' => 'Цей користувач володіє [[$2|українською мовою]] майже [[$1|як рідною]].',
	'babel-5-n' => 'Цей користувач [[$1|професійно]] володіє [[$2|українською мовою]].',
	'babel-N-n' => 'Для цього користувача [[$2|українська мова]] є [[$1|рідною]].',
);

/** Urdu (اردو)
 * @author GerardM
 * @author محبوب عالم
 */
$messages['ur'] = array(
	'babel' => 'بابل معلوماتِ صارف',
	'babel-url' => 'Project:بابل',
	'babel-autocreate-abort' => 'آپ کا مختص کردہ اسمِ‌صارف خودکار [[$1|بابل]] زمرہ تخلیق کیلئے مستعمل ہے اور یہ درج نہیں کیا جاسکتا.',
	'babel-autocreate-reason' => '[[$1|بابل]] زمرہ‌جاتی صفحہ کی خودکار تخلیق ہورہی ہے.',
	'babel-autocreate-text-levels' => 'اِس زمرہ کے صارفین یہ نشاندہی کرتے ہیں کہ $2 زبان کیلئے اُن کی مہارتی سطح $1 ہے.',
	'babel-autocreate-text-main' => 'اِس زمرہ کے صارفین یہ نشاندہی کرتے ہیں کہ وہ $1 زبان کا علم رکھتے ہیں.',
	'babel-directionality' => 'rtl',
	'babel-0' => 'یہ صارف [[$2|$3]] [[$1|نہیں]] جانتا (یا اِسے کافی مشکل سے سمجھتا ہے).',
	'babel-1' => 'یہ صارف [[$2|$3]] کا [[$1|بنیادی]] علم رکھتا ہے.',
	'babel-2' => 'یہ صارف [[$2|$3]] کا [[$1|متوسط]] علم رکھتا ہے.',
	'babel-3' => 'یہ صارف [[$2|$3]] کا [[$1|اعلیٰ]] علم رکھتا ہے.',
	'babel-4' => 'یہ صارف [[$2|$3]] کا [[$1|پیدائشی بولنے والے کے قریب]] علم رکھتا ہے.',
	'babel-5' => 'یہ صارف [[$2|$3]] کا [[$1|پیشہ‌ورانہ]] علم رکھتا ہے.',
	'babel-N' => 'یہ صارف [[$2|$3]] کا [[$1|پیدائشی]] متکلم ہے.',
	'babel-0-n' => 'یہ صارف [[$2|انگریزی]] [[$1|نہیں]] جانتا (یا اِسے کافی مشکل سے سمجھتا ہے).',
	'babel-1-n' => 'یہ صارف [[$2|انگریزی]] کا [[$1|بنیادی]] علم رکھتا ہے.',
	'babel-2-n' => 'یہ صارف [[$2|انگریزی]] کا [[$1|متوسط]] علم رکھتا ہے.',
	'babel-3-n' => 'یہ صارف [[$2|انگریزی]] کا [[$1|اعلیٰ]] علم رکھتا ہے.',
	'babel-4-n' => 'یہ صارف [[$2|انگریزی]] کے بارے میں [[$1|پیدائشی متکلم]] کے قریب قریب دانش رکھتا ہے.',
	'babel-5-n' => 'یہ صارف [[$2|انگریزی]] کا [[$1|پیشہ ورانہ]] دانش رکھتا ہے.',
	'babel-N-n' => 'یہ صارف [[$2|انگریزی]] کا [[$1|پیدائشی متکلم]] ہے.',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'babel' => "Informassion su l'utente de Babel",
	'babel-desc' => 'Zonta la funsion parser <tt>#babel</tt> par permétar la generazion automatica de un riquadro "utente Babel" con la possibilità de inserir template personalizà',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'El nome utente speçificà el xe doparà par la creassion automàtega de categorie [[$1|Babel]] e no se pol registrarlo.',
	'babel-autocreate-reason' => 'Creo automaticamente la pàxena de la categoria [[$1|Babel]].',
	'babel-autocreate-text-levels' => 'I utenti in sta categoria i gà indicà de verghe un livèl de conossensa $1 de la lengua $2.',
	'babel-autocreate-text-main' => 'I utenti in sta categoria i gà indicà che i conosse la lengua $1.',
	'babel-0' => "Sto utente qua [[$1|no'l parla]] par gnente el [[$2|$3]] (o el lo capisse con gran fadiga).",
	'babel-1' => 'Sto utente qua el parla [[$1|na s-cianta]] el [[$2|$3]].',
	'babel-2' => "Sto utente qua el parla [[$1|'bastansa ben]] el [[$2|$3]].",
	'babel-3' => 'Sto utente qua el parla el [[$2|$3]] [[$1|ben assè]].',
	'babel-4' => 'Sto utente qua el parla el [[$2|$3]] squasi [[$1|come la so lengua mare]].',
	'babel-5' => 'Sto utente qua el parla el [[$2|$3]] a [[$1|livèi da professionista]].',
	'babel-N' => "Sto utente qua el parla el [[$2|$3]] [[$1|da co che'l xe nato]].",
	'babel-0-n' => "Sto utente qua [[$1|no'l parla]] par gnente la [[$2|lengua veneta]] (o el la capisse con gran fadiga).",
	'babel-1-n' => 'Sto utente qua el parla [[$1|na s-cianta]] la [[$2|lengua veneta]].',
	'babel-2-n' => "Sto utente qua el parla [[$1|'bastansa ben]] la [[$2|lengua veneta]].",
	'babel-3-n' => 'Sto utente qua el parla la [[$2|lengua veneta]] [[$1|ben assè]].',
	'babel-4-n' => 'Sto utente qua el parla la [[$2|lengua veneta]] squasi [[$1|come la so lengua mare]].',
	'babel-5-n' => 'Sto utente qua el parla la [[$2|lengua veneta]] a [[$1|livèi da professionista]].',
	'babel-N-n' => "Sto utente qua el parla la [[$2|lengua veneta]] [[$1|da co che'l xe nato]].",
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'babel' => 'Andmused ühtnijan keliš',
	'babel-desc' => 'Ližadab <tt>#babel</tt>-parseran funkcii, kudamb laskeb säta avtomatižešti pacaz informacijanke keliš, kudambha sab ližata toižid-ki šablonoid',
	'babel-url' => 'Projekt:Vavilon',
	'babel-autocreate-abort' => 'Teil kirjutadud ühtnijan nimi kävutadas [[$1|Babel]]-projektan kategorijoiden avtomatižen sädandan täht, i sikš sidä ei sa registriruida.',
	'babel-autocreate-reason' => '[[$1|Babel]]-projektan avtomatine lehtpolen sädand.',
	'babel-autocreate-text-levels' => 'Necen kategorijan kävutajad oma ozutadud tedonmär $1 $2-kelen täht.',
	'babel-autocreate-text-main' => 'Necen kategorijan kävutajad ozutiba $1-kelen tedmine.',
	'babel-0' => "Nece kävutai [[$1|ei el'genda]] kel't [[$2|$3]] (vai el'gendab lujiden jügedusidenke)",
	'babel-1' => "Nece kävutai tedab kel't [[$2|$3]] [[$1|augotižmäras]]",
	'babel-2' => "Nece kävutai tedab kel't [[$2|$3]] [[$1|keskmäras]].",
	'babel-3' => "Nece kävutai tedab kel't [[$2|$3]] [[$1|hüväs märas]].",
	'babel-4' => "Nece kävutai tedab kel't [[$2|$3]] [[$1|läz mamankelen kävutamišt]].",
	'babel-5' => "Nece kävutai tedab kel't [[$2|$3]] [[$1|professionaližes märas]].",
	'babel-N' => "[[$2|$3]] kel' om kävutajan [[$1|mamankel']]",
	'babel-0-n' => "Nece kävutai [[$1|ei el'genda]] [[$2|vepsän kel't]] (vai el'gendab lujiden jügedusidenke).",
	'babel-1-n' => "Nece kävutai tedab [[$2|vepsän kel't]] [[$1|augotižmäras]].",
	'babel-2-n' => "Nece kävutai tedab [[$2|vepsän kel't]] [[$1|keskmäras]].",
	'babel-3-n' => "Nece kävutai tedab [[$2|vepsän kel't]] [[$1|hüväs märas]].",
	'babel-4-n' => "Nece kävutai tedab [[$2|vepsän kel't]] [[$1|läz mamankelen kävutamišt]].",
	'babel-5-n' => "Nece kävutai tedab [[$2|vepsän kel't]] [[$1|professionaližes märas]].",
	'babel-N-n' => "[[$2|Vepsän kel']] om necen kävutajan [[$1|mamankel']].",
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'babel' => 'Thông tin Ngôn ngữ Thành viên',
	'babel-desc' => 'Thêm hàm cú pháp <tt>#babel</tt> để cho phép tự động sinh ra một hộp thông tin ngôn ngữ thành viên và có thể thêm vào những tiêu bản tùy chọn',
	'babel-url' => 'Project:Ngôn ngữ',
	'babel-autocreate-abort' => 'Tên người dùng bạn yêu cầu được dùng để tự động tạo thể loại [[$1|Babel]] và không thể đăng ký.',
	'babel-autocreate-reason' => 'Tự động tạo trang thể loại [[$1|Babel]].',
	'babel-autocreate-text-levels' => 'Người dùng trong thể loại này cho thấy họ thành thạo ngôn ngữ $2 ở mức $1.',
	'babel-autocreate-text-main' => 'Người dùng trong thể loại này cho thấy họ có kiến thức về ngôn ngữ $1.',
	'babel-0' => 'Thành viên này [[$1|hoàn toàn không biết]] [[$2|$3]] (hoặc rất khó khăn để hiểu).',
	'babel-1' => 'Thành viên này biết [[$2|$3]] ở mức độ [[$1|cơ bản]].',
	'babel-2' => 'Thành viên này biết [[$2|$3]] ở mức độ [[$1|khá]].',
	'babel-3' => 'Thành viên này biết [[$2|$3]] ở mức độ [[$1|tốt]].',
	'babel-4' => 'Thành viên này có thể hiểu [[$2|$3]] gần như [[$1|người bản xứ]].',
	'babel-5' => 'Thành viên này biết [[$2|$3]] ở mức độ của một [[$1|chuyên gia]].',
	'babel-N' => 'Thành viên này xem [[$2|$3]] là ngôn ngữ [[$1|mẹ đẻ]].',
	'babel-0-n' => 'Thành viên này [[$1|hoàn toàn không biết]] [[$2|tiếng Việt]] (hoặc rất khó khăn để hiểu).',
	'babel-1-n' => 'Người dùng này biết [[$2|tiếng Việt]] với trình độ [[$1|cơ bản]].',
	'babel-2-n' => 'Người dùng này biết [[$2|tiếng Việt]] với trình độ [[$1|khá]].',
	'babel-3-n' => 'Người dùng này biết [[$2|tiếng Việt]] với trình độ [[$1|tốt]].',
	'babel-4-n' => 'Người dùng này có thể hiểu [[$2|tiếng Việt]] [[$1|gần như người Việt]].',
	'babel-5-n' => 'Người dùng này biết [[$2|tiếng Việt]] với trình độ của một [[$1|chuyên gia]].',
	'babel-N-n' => 'Thành viên này xem [[$2|tiếng Việt]] là ngôn ngữ [[$1|mẹ đẻ]].',
);

/** Volapük (Volapük)
 * @author Malafaya
 * @author Smeira
 */
$messages['vo'] = array(
	'babel' => 'Gebananüns-Babel',
	'babel-url' => 'Project:Babel',
	'babel-autocreate-abort' => 'Gebananem fa ol pavilöl pagebon pö jafam itjäfidik [[$1|Babel]]-kladas e no dalon paregistarön.',
	'babel-autocreate-reason' => '[[$1|Babel]]-kladapad pajafon itjäfidiko',
	'babel-autocreate-text-levels' => 'Gebans in klad at sagons, das labons nivoda: $1 tefü pük: $2.',
	'babel-autocreate-text-main' => 'Gebans in klad at sagons, das sevons püki: $1.',
	'babel-0' => 'Geban at [[$1|no suemon]] [[$2|$3]]i (u suemon oni mu fikuliko).',
	'babel-1' => 'Geban at kanon kompenön pö spikots me [[$2|$3]] nivoda [[$1|balugik]].',
	'babel-2' => 'Geban at kanon kompenön pö spikots me [[$2|$3]] nivoda [[$1|vüik]].',
	'babel-3' => 'Geban at kanon kompenön pö spikots me [[$2|$3]] nivoda [[$1|löpik]].',
	'babel-4' => 'Geban at kanon gebön [[$2|$3]]i [[$1|ti so gudiko, äsä lomapüki oka]].',
	'babel-5' => 'Geban at kanon gebön [[$2|$3]]i [[$1|caliko]].',
	'babel-N' => 'Geban at labon [[$2|$3]]i as [[$1|lomapük]] oka.',
	'babel-0-n' => 'Geban a [[$1|no suemon]] [[$2|Volapük]]i (u suemon oni mu fikuliko).',
	'babel-1-n' => 'Geban at labon sevi [[$1|stabik]] [[$2|Volapük]]a.',
	'babel-2-n' => 'Geban at labon sevi [[$1|vüik]] [[$2|Volapük]]a.',
	'babel-3-n' => 'Geban at labon sevi [[$1|löpik]] [[$2|Volapük]]a.',
	'babel-4-n' => 'Geban at labon sevi [[$1|sümik ad ut lomapükana]] [[$2|Volapük]]a.',
	'babel-5-n' => 'Geban at labon sevi [[$1|calik]] [[$2|Volapük]]a.',
	'babel-N-n' => 'Geban at labon nivodi [[$1|lomapükik]] [[$2|Volapük]]a.',
);

/** Võro (Võro)
 * @author Võrok
 */
$messages['vro'] = array(
	'babel' => 'Pruukja keelemõistminõ (Paabõli perrä)',
	'babel-desc' => 'Tege <tt>#babel</tt>-abinõvvo, miä luu esiq pruukja keelemõistmisõ tabõli, kohe saa pandaq näüdüssit.',
	'babel-url' => 'Project:Paabõl',
	'babel-0' => 'Taa pruukja mõist [[$1|väega veidüq vai ei sukugi]] [[$2|$3]] kiilt.',
	'babel-1' => 'Taa pruukja mõist [[$1|veidükese]] [[$2|$3]] kiilt.',
	'babel-2' => 'Taa pruukja mõist [[$1|küländ häste]] [[$2|$3]] kiilt.',
	'babel-3' => 'Taa pruukja mõist [[$1|väega häste]] [[$2|$3]] kiilt.',
	'babel-4' => 'Taa pruukja mõist [[$2|$3]] kiilt [[$1|pia nigu imäkiilt]].',
	'babel-5' => 'Taa pruukja om [[$2|$3]] keele pääle [[$1|vällä opnuq]].',
	'babel-N' => 'Taa pruukja [[$1|imäkiil]] om [[$2|$3]] kiil.',
	'babel-0-n' => 'Taa pruukja mõist [[$1|väega veidüq vai ei sukugi]] [[$2|võro]] kiilt.',
	'babel-1-n' => 'Taa pruukja mõist [[$1|veidükese]] [[$2|võro]] kiilt.',
	'babel-2-n' => 'Taa pruukja mõist [[$1|küländ häste]] [[$2|võro]] kiilt.',
	'babel-3-n' => 'Taa pruukja mõist [[$1|väega häste]] [[$2|võro]] kiilt.',
	'babel-4-n' => 'Taa pruukja mõist [[$2|võro]] kiilt [[$1|pia nigu imäkiilt]].',
	'babel-5-n' => 'Taa pruukja om [[$2|võro]] keele pääle [[$1|vällä opnuq]].',
	'babel-N-n' => 'Taa pruukja [[$1|imäkiil]] om [[$2|võro]] kiil.',
);

/** Walloon (Walon)
 * @author Lucyin
 */
$messages['wa'] = array(
	'babel' => "racsegnes so l' uzeu d' Babel",
	'babel-0' => "Cist(e) uzeu(se) ci n' a [[$1|nole]] kinoxhance do [[$2|$3]] (oudon-bén, nel comprinde k' a schipe)",
	'babel-1' => "Cist(e) uzeu(se) ci ni sait l' [[$2|$3]] ki come [[$1|onk (ene) ki cmince]].",
	'babel-2' => 'Cist(e) uzeu(se) ci kinoxhe [[$1|ene miete]] li [[$2|$3]].',
	'babel-3' => "Cist(e) uzeu(se) ci sait [[$1|bén]] l' [[$2|$3]].",
	'babel-0-n' => "Cist(e) uzeu(se) cial ni sait [[$1|nén]] l' [[$2|walon]] (oudon-bén nel comprinde k' a poenne).",
	'babel-1-n' => "Cist(e) uzeu(se) ci ni sait l' [[$2|walon]] ki come [[$1|onk (ene) ki cmince]].",
	'babel-2-n' => 'Cist(e) uzeu(se) ci kinoxhe [[$1|ene miete]] li [[$2|walon]].',
	'babel-3-n' => "Cist(e) uzeu(se) ci sait [[$1|bén]] l' [[$2|walon]].",
);

/** Wolof (Wolof)
 * @author Ibou
 */
$messages['wo'] = array(
	'babel' => 'Ay xibaari ci jëfandikukatu babel bi',
	'babel-url' => 'Project:Babel',
	'babel-0' => 'Bii jëfandikukat [[$1|déggul dara]] ci [[$2|$3]] (walla di na ci sonn laataa mu ciy nand dara)',
	'babel-1' => 'Bii jëfandikukat dégg na [[$2|$3]] [[$1|tuuti rekk]].',
	'babel-2' => 'Bii jëfandikukat dégg na [[$2|$3]] yu [[$1|diggdoomu]].',
	'babel-3' => 'Bii jëfandikukat dégg na [[$2|$3]] bu [[$1|baax]].',
	'babel-4' => 'Bii jëfandikukat dégg na [[$2|$3]] yu [[$1|jege ku ci juddu]].',
	'babel-5' => 'Bii jëfandikukat dégg na [[$2|$3]] yu [[$1|xereñ]].',
	'babel-N' => 'Bii jëfandikukat dégg na [[$2|$3]] ni [[$1|ku ci juddu]].',
	'babel-0-n' => 'Bii jëfandikukat déggul [[$1|dara]] ci [[$2|wolof]] (walla di na ci sonn laataa mu ciy nand dara).',
	'babel-1-n' => 'Bii jëfandikukat dégg na [[$2|wolof]] [[$1|tuuti rekk]].',
	'babel-2-n' => 'Bii jëfandikukat dégg na [[$2|wolof]] yu [[$1|diggdoomu]].',
	'babel-3-n' => 'Bii jëfandikukat dégg na [[$2|wolof]] bu [[$1|baax]].',
	'babel-4-n' => 'Bii jëfandikukat dégg na [[$2|wolof]] yu [[$1|jege ku ci juddu]].',
	'babel-5-n' => 'Bii jëfandikukat dégg na [[$2|wolof]] yu [[$1|xereñ]].',
	'babel-N-n' => 'Bii jëfandikukat dégg na [[$2|wolof]] ni [[$1|ku ci juddu]].',
);

/** Yiddish (ייִדיש)
 * @author GerardM
 * @author פוילישער
 */
$messages['yi'] = array(
	'babel' => 'באבעל באניצער אינפארמאציע',
	'babel-desc' => 'לייגט צו די <tt>#babel</tt> פארזער פונקציע צו דערלויבן אויטאמאטישע גענערירונג פון א באבעל באניצער-קעסטל זייל, מיט דער מעגלעכקייט איינשליסן אייגענע מוסטערן',
	'babel-url' => 'Project:באבעל',
	'babel-directionality' => 'rtl',
	'babel-0' => 'דער באניצער האט [[$1|נישט קיין]] ידיעה אין [[$2|$3]] (אדער פארשטייט די שפראך מיט גרויסע שוועריקייט).',
	'babel-1' => 'דער באניצער האט א [[$1|גרונטיקע]] ידיעה אין [[$2|$3]].',
	'babel-2' => 'דער באניצער האט א [[$1|מיטלע]] ידיעה אין [[$2|$3]].',
	'babel-3' => 'דער באניצער האט א [[$1|פֿארגעשריטענע]] ידיעה אין [[$2|$3]].',
	'babel-4' => 'דער באניצער האט א בקיאות אין [[$2|$3]] [[$1|כמעט ווי מוטערשפראך]].',
	'babel-5' => 'דער באניצער האט א  [[$1|פראפֿעסיאנעלע]] ידיעה אין [[$2|$3]].',
	'babel-N' => 'דער באניצער רעדט [[$2|$3]] אלס  [[$1|מוטערשפראך]].',
	'babel-0-n' => 'דער באניצער האט [[$1|נישט קיין]] ידיעה אין [[$2|יידיש]] (אדער פארשטייט די שפראך מיט גרויסער שוועריקייט).',
	'babel-1-n' => 'דער באניצער האט א [[$1|גרונטיקע]] ידיעה אין [[$2|יידיש]].',
	'babel-2-n' => 'דער באניצער האט א [[$1|מיטלע]] ידיעה אין [[$2|יידיש]].',
	'babel-3-n' => 'דער באניצער האט א [[$1|פֿארגעשריטענע]] ידיעה אין [[$2|יידיש]].',
	'babel-4-n' => '.דער באניצער האט א בקיאות אין [[$2|יידיש]] [[$1|כמעט ווי מאמע-לשון]].',
	'babel-5-n' => 'דער באניצער האט א  [[$1|פראפֿעסיאנעלע]] ידיעה אין [[$2|יידיש]].',
	'babel-N-n' => 'דער באניצער רעדט [[$2|יידיש]] אלס  [[$1|מאמע-לשון]].',
);

/** Yoruba (Yorùbá)
 * @author Demmy
 */
$messages['yo'] = array(
	'babel-url' => 'Project:Babel',
	'babel-autocreate-text-levels' => 'Àwọn oníṣe nínú ẹ̀ka yìí tọ́ka pé àwọn ní òye $1 fún èdè $2.',
	'babel-autocreate-text-main' => 'Àwọn oníṣe nínú ẹ̀ka yìí tọ́ka pé àwọn ní òye nínú èdè $1.',
	'babel-0' => 'Oníṣe yìí kò ní ìmọ̀ [[$1|rárá]] nínú èdè [[$2|$3]] (tàbí kọ̀ ní òye rẹ̀ dáadáa).',
	'babel-1' => 'Oníṣe yìí [[$1|bíntín]] ní ìmọ̀ rẹ̀ nínú èdè [[$2|$3]].',
	'babel-2' => 'Oníṣe yìí [[$1|àbọ̀]] ni ìmọ̀ rẹ̀ nínú èdè [[$2|$3]].',
	'babel-3' => "Oníṣe yìí [[$1|dáradára]] ni ìmọ̀ rẹ̀ nínú èdè [[$2|$3]]'''.",
	'babel-4' => "Oníṣe yìí [[$1|bíi pé abínibí]] ni ìmọ̀ rẹ̀ nínú èdè [[$2|$3]]'''.",
	'babel-5' => 'Oníṣe yìí mọ èdè [[$2|$3]] dáadáa tó láti fi [[$1|ṣe iṣẹ́]].',
	'babel-N' => "Oníṣe yìí èdè [[$1|abínibí]] rẹ̀ ni [[$2|$3]]'''.",
	'babel-0-n' => 'Oníṣe yìí kò ní ìmọ̀ [[$1|rárá]] nínú èdè [[$2|Yorùbá]] (tàbí kò ní òye rẹ̀ dáadáa).',
	'babel-1-n' => 'Oníṣe yìí [[$1|bíntín]] ní ìmọ̀ rẹ̀ nínú èdè [[$2|Yorùbá]].',
	'babel-2-n' => 'Oníṣe yìí [[$1|àbọ̀]] ni ìmọ̀ rẹ̀ nínú èdè [[$2|Yorùbá]].',
	'babel-3-n' => 'Oníṣe yìí [[$1|dáradára]] ni ìmọ̀ rẹ̀ nínú èdè [[$2|Yorùbá]].',
	'babel-4-n' => 'Oníṣe yìí [[$1|bíi pé abínibí]] ni ìmọ̀ rẹ̀ nínú èdè [[$2|Yorùbà]].',
	'babel-5-n' => 'Oníṣe yìí mọ èdè [[$2|Yorùbá]] dáadáa tó láti fi [[$1|ṣe iṣẹ́]].',
	'babel-N-n' => 'Oníṣe yìí èdè [[$1|abínibí]] rẹ̀ ni [[$2|Yorùbá]].',
);

/** Yue (粵語)
 * @author Shinjiman
 */
$messages['yue'] = array(
	'babel' => '巴別用戶資料',
	'babel-desc' => '加一個<tt>#babel</tt>處理功能去容許自動產生一個巴別用戶盒欄及包含可自定化嘅模',
	'babel-url' => 'Project:巴別',
	'babel-0' => '呢位用戶[[$1|無]][[$2|$3]]嘅知識（或好難噉去明白佢）。',
	'babel-1' => '呢位用戶有[[$1|基本]]嘅[[$2|$3]]知識。',
	'babel-2' => '呢位用戶有[[$1|中等]]嘅[[$2|$3]]知識。',
	'babel-3' => '呢位用戶有[[$1|高等]]嘅[[$2|$3]]知識。',
	'babel-4' => '呢位用戶有[[$1|接近母語講者]]嘅[[$2|$3]]知識。',
	'babel-5' => '呢位用戶有[[$1|專業]]嘅[[$2|$3]]知識。',
	'babel-N' => '呢位用戶明白[[$2|$3]]嘅[[$1|母語]]。',
	'babel-0-n' => '呢位用戶[[$1|無]][[$2|廣東話]]嘅知識（或好難噉去明白佢）。',
	'babel-1-n' => '呢位用戶有[[$1|基本]]嘅[[$2|廣東話]]知識。',
	'babel-2-n' => '呢位用戶有[[$1|中等]]嘅[[$2|廣東話]]知識。',
	'babel-3-n' => '呢位用戶有[[$1|高等]]嘅[[$2|廣東話]]知識。',
	'babel-4-n' => '呢位用戶有[[$1|接近母語講者]]嘅[[$2|廣東話]]知識。',
	'babel-5-n' => '呢位用戶有[[$1|專業]]嘅[[$2|廣東話]]知識。',
	'babel-N-n' => '呢位用戶明白以[[$1|母語]]為主嘅[[$2|廣東話]]。',
);

/** Chinese (China) (‪中文(中国大陆)‬)
 * @author Shinjiman
 */
$messages['zh-cn'] = array(
	'babel-0-n' => '这位用户[[$1|无]][[$2|大陆式中文]]的知识（或很难地去明白它）。',
	'babel-1-n' => '这位用户有[[$1|基本]]的[[$2|大陆式中文]]知识。',
	'babel-2-n' => '这位用户有[[$1|中等]]的[[$2|大陆式中文]]知识。',
	'babel-3-n' => '这位用户有[[$1|高等]]的[[$2|大陆式中文]]知识。',
	'babel-4-n' => '这位用户有[[$1|接近母语讲者]]的[[$2|大陆式中文]]知识。',
	'babel-5-n' => '这位用户有[[$1|专业]]的[[$2|大陆式中文]]知识。',
	'babel-N-n' => '这位用户明白以[[$1|母语]]为主的[[$2|大陆式中文]]。',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gzdavidwong
 * @author Shinjiman
 */
$messages['zh-hans'] = array(
	'babel' => '巴别用户细节',
	'babel-desc' => '加一个<tt>#babel</tt>处理功能去容许自动产生一个巴别用户框栏及包含可自定化的模版',
	'babel-url' => 'Project:巴别',
	'babel-autocreate-reason' => '自动建立巴别分类页。',
	'babel-0' => '这位用户[[$1|无]][[$2|$3]]的知识（或很难地去明白它）。',
	'babel-1' => '这位用户有[[$1|基本]]的[[$2|$3]]知识。',
	'babel-2' => '这位用户有[[$1|中等]]的[[$2|$3]]知识。',
	'babel-3' => '这位用户有[[$1|高等]]的[[$2|$3]]知识。',
	'babel-4' => '这位用户有[[$1|接近母语讲者]]的[[$2|$3]]知识。',
	'babel-5' => '这位用户有[[$1|专业]]的[[$2|$3]]知识。',
	'babel-N' => '这位用户明白[[$2|$3]]的[[$1|母语]]。',
	'babel-0-n' => '这位用户[[$1|无]][[$2|简化中文字]]的知识（或很难地去明白它）。',
	'babel-1-n' => '这位用户有[[$1|基本]]的[[$2|简化中文字]]知识。',
	'babel-2-n' => '这位用户有[[$1|中等]]的[[$2|简化中文字]]知识。',
	'babel-3-n' => '这位用户有[[$1|高等]]的[[$2|简化中文字]]知识。',
	'babel-4-n' => '这位用户有[[$1|接近母语讲者]]的[[$2|简化中文字]]知识。',
	'babel-5-n' => '这位用户有[[$1|专业]]的[[$2|简化中文字]]知识。',
	'babel-N-n' => '这位用户明白以[[$1|母语]]为主的[[$2|简化中文字]]。',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Shinjiman
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'babel' => '巴別用戶資料',
	'babel-desc' => '加一個<tt>#babel</tt>處理功能去容許自動產生一個巴別用戶框欄及包含可自定化的模版',
	'babel-url' => 'Project:巴別',
	'babel-autocreate-reason' => '自動建立巴別分類頁。',
	'babel-0' => '這位用戶[[$1|無]][[$2|$3]]的知識（或很難地去明白它）。',
	'babel-1' => '這位用戶有[[$1|基本]]的[[$2|$3]]知識。',
	'babel-2' => '這位用戶有[[$1|中等]]的[[$2|$3]]知識。',
	'babel-3' => '這位用戶有[[$1|高等]]的[[$2|$3]]知識。',
	'babel-4' => '這位用戶有[[$1|接近母語講者]]的[[$2|$3]]知識。',
	'babel-5' => '這位用戶有[[$1|專業]]的[[$2|$3]]知識。',
	'babel-N' => '這位用戶明白[[$2|$3]]的[[$1|母語]]。',
	'babel-0-n' => '這位用戶[[$1|無]][[$2|傳統中文字]]的知識（或很難地去明白它）。',
	'babel-1-n' => '這位用戶有[[$1|基本]]的[[$2|傳統中文字]]知識。',
	'babel-2-n' => '這位用戶有[[$1|中等]]的[[$2|傳統中文字]]知識。',
	'babel-3-n' => '這位用戶有[[$1|高等]]的[[$2|傳統中文字]]知識。',
	'babel-4-n' => '這位用戶有[[$1|接近母語講者]]的[[$2|傳統中文字]]知識。',
	'babel-5-n' => '這位用戶有[[$1|專業]]的[[$2|傳統中文字]]知識。',
	'babel-N-n' => '這位用戶明白以[[$1|母語]]為主的[[$2|傳統中文字]]。',
);

/** Chinese (Hong Kong) (‪中文(香港)‬)
 * @author Shinjiman
 */
$messages['zh-hk'] = array(
	'babel-0-n' => '這位用戶[[$1|無]][[$2|港式中文]]的知識（或很難地去明白它）。',
	'babel-1-n' => '這位用戶有[[$1|基本]]的[[$2|港式中文]]知識。',
	'babel-2-n' => '這位用戶有[[$1|中等]]的[[$2|港式中文]]知識。',
	'babel-3-n' => '這位用戶有[[$1|高等]]的[[$2|港式中文]]知識。',
	'babel-4-n' => '這位用戶有[[$1|接近母語講者]]的[[$2|港式中文]]知識。',
	'babel-5-n' => '這位用戶有[[$1|專業]]的[[$2|港式中文]]知識。',
	'babel-N-n' => '這位用戶明白以[[$1|母語]]為主的[[$2|港式中文]]。',
);

/** Chinese (Singapore) (‪中文(新加坡)‬)
 * @author Shinjiman
 */
$messages['zh-sg'] = array(
	'babel-0-n' => '这位用户[[$1|无]][[$2|星式中文]]的知识（或很难地去明白它）。',
	'babel-1-n' => '这位用户有[[$1|基本]]的[[$2|星式中文]]知识。',
	'babel-2-n' => '这位用户有[[$1|中等]]的[[$2|星式中文]]知识。',
	'babel-3-n' => '这位用户有[[$1|高等]]的[[$2|星式中文]]知识。',
	'babel-4-n' => '这位用户有[[$1|接近母语讲者]]的[[$2|星式中文]]知识。',
	'babel-5-n' => '这位用户有[[$1|专业]]的[[$2|星式中文]]知识。',
	'babel-N-n' => '这位用户明白以[[$1|母语]]为主的[[$2|星式中文]]。',
);

/** Chinese (Taiwan) (‪中文(台灣)‬)
 * @author Shinjiman
 */
$messages['zh-tw'] = array(
	'babel-0-n' => '這位用戶[[$1|無]][[$2|台式中文]]的知識（或很難地去明白它）。',
	'babel-1-n' => '這位用戶有[[$1|基本]]的[[$2|台式中文]]知識。',
	'babel-2-n' => '這位用戶有[[$1|中等]]的[[$2|台式中文]]知識。',
	'babel-3-n' => '這位用戶有[[$1|高等]]的[[$2|台式中文]]知識。',
	'babel-4-n' => '這位用戶有[[$1|接近母語講者]]的[[$2|台式中文]]知識。',
	'babel-5-n' => '這位用戶有[[$1|專業]]的[[$2|台式中文]]知識。',
	'babel-N-n' => '這位用戶明白以[[$1|母語]]為主的[[$2|台式中文]]。',
);

