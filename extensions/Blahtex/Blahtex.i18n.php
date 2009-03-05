<?php
/**
 * Internationalisation file for extension Blahtex.
 *
 * @addtogroup Extensions
*/

$messages = array();

$messages['en'] = array(
	'math_noblahtex'                        => 'Cannot execute blahtex, which should be at $1',
	'math-desc'				=> 'MathML output for &lt;math&gt; tags',
	'math_AmbiguousInfix'                   => 'Ambiguous placement of "$1".
Try using additional braces "{ ... }" to disambiguate.',
	'math_CannotChangeDirectory'            => 'Cannot change working directory',
	'math_CannotCreateTexFile'              => 'Cannot create tex file',
	'math_CannotRunDvipng'                  => 'Cannot run dvipng',
	'math_CannotRunLatex'                   => 'Cannot run latex',
	'math_CannotWritePngDirectory'          => 'Cannot write to output PNG directory',
	'math_CannotWriteTexFile'               => 'Cannot write to tex file',
	'math_CasesRowTooBig'                   => 'There can only be two entries in each row of a "cases" block',
	'math_DoubleSubscript'                  => 'Encountered two subscripts attached to the same base.
Only one is allowed.',
	'math_DoubleSuperscript'                => 'Encountered two superscripts attached to the same base.
Only one is allowed.',
	'math_IllegalCharacter'                 => 'Illegal character in input',
	'math_IllegalCommandInMathMode'         => 'The command "$1" is illegal in math mode',
	'math_IllegalCommandInMathModeWithHint' => 'The command "$1" is illegal in math mode
Perhaps you intended to use "$2" instead?',
	'math_IllegalCommandInTextMode'         => 'The command "$1" is illegal in text mode',
	'math_IllegalCommandInTextModeWithHint' => 'The command "$1" is illegal in text mode
Perhaps you intended to use "$2" instead?',
	'math_IllegalDelimiter'                 => 'Illegal delimiter following "$1"',
	'math_IllegalFinalBackslash'            => 'Illegal backslash "\\" at end of input',
	'math_IllegalNestedFontEncodings'       => 'Font encoding commands may not be nested',
	'math_IllegalRedefinition'              => 'The command "$1" has already been defined; you cannot redefine it',
	'math_InvalidColour'                    => 'The colour "$1" is invalid',
	'math_InvalidUtf8Input'                 => 'The input string was not valid UTF-8',
	'math_LatexFontNotSpecified'            => 'No LaTeX font has been specified for "$1"',
	'math_LatexPackageUnavailable'          => 'Unable to render PNG because the LaTeX package "$1" is unavailable',
	'math_MismatchedBeginAndEnd'            => 'Commands "$1" and "$2" do not match',
	'math_MisplacedLimits'                  => 'The command "$1" can only appear after a math operator.
Consider using "\\mathop".',
	'math_MissingCommandAfterNewcommand'    => 'Missing or illegal new command name after "\\newcommand".
There must be precisely one command defined;
it must begin with a backslash "\\" and contain only alphabetic characters.',
	'math_MissingDelimiter'                 => 'Missing delimiter after "$1"',
	'math_MissingOpenBraceAfter'            => 'Missing open brace "{" after "$1"',
	'math_MissingOpenBraceAtEnd'            => 'Missing open brace "{" at end of input',
	'math_MissingOpenBraceBefore'           => 'Missing open brace "{" before "$1"',
	'math_MissingOrIllegalParameterCount'   => 'Missing or illegal parameter count in definition of "$1".
Must be a single digit between 1 and 9 inclusive.',
	'math_MissingOrIllegalParameterIndex'   => 'Missing or illegal parameter index in definition of "$1"',
	'math_NonAsciiInMathMode'               => 'Non-ASCII characters may only be used in text mode
Try enclosing the problem characters in "\\text{...}".',
	'math_NotEnoughArguments'               => 'Not enough arguments were supplied for "$1"',
	'math_PngIncompatibleCharacter'         => 'Unable to correctly generate PNG containing the character $1',
	'math_ReservedCommand'                  => 'The command "$1" is reserved for internal use by blahtex',
	'math_SubstackRowTooBig'                => 'There can only be one entry in each row of a "substack" block',
	'math_TooManyMathmlNodes'               => 'There are too many nodes in the MathML tree',
	'math_TooManyTokens'                    => 'The input is too long',
	'math_UnavailableSymbolFontCombination' => 'The symbol "$1" is not available in the font "$2"',
	'math_UnexpectedNextCell'               => 'The command "&" may only appear inside a "\\begin ... \\end" block',
	'math_UnexpectedNextRow'                => 'The command "\\\\" may only appear inside a "\\begin ... \\end" block',
	'math_UnmatchedBegin'                   => 'Encountered "\\begin" without matching "\\end"',
	'math_UnmatchedCloseBrace'              => 'Encountered close brace "}" without matching open brace "{"',
	'math_UnmatchedEnd'                     => 'Encountered "\\end" without matching "\\begin"',
	'math_UnmatchedLeft'                    => 'Encountered "\\left" without matching "\\right"',
	'math_UnmatchedOpenBrace'               => 'Encountered open brace "{" without matching close brace "}"',
	'math_UnmatchedOpenBracket'             => 'Encountered open bracket "[" without matching close bracket "]"',
	'math_UnmatchedRight'                   => 'Encountered "\\right" without matching "\\left"',
	'math_UnrecognisedCommand'              => 'Unrecognised command "$1"',
	'math_WrongFontEncoding'                => 'The symbol "$1" may not appear in font encoding "$2"',
	'math_WrongFontEncodingWithHint'        => 'The symbol "$1" may not appear in font encoding "$2".
Try using the "$3{...}" command.',
);

/** Message documentation (Message documentation)
 * @author Malafaya
 * @author Purodha
 */
$messages['qqq'] = array(
	'math-desc' => 'Short description of this extension, shown on [[Special:Version]]. Do not translate or change links.',
	'math_NotEnoughArguments' => 'Parameter $1 can be something like: <tt>\\sqrt</tt>, <tt>\\newcommand</tt> or some other token.',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'math_IllegalCharacter' => 'Ongeldig karakter in die invoer',
	'math_InvalidColour' => 'Die kleur "$1" is ongeldig',
	'math_TooManyTokens' => 'Die invoer is te lank',
	'math_UnrecognisedCommand' => 'Opdrag "$1" is ongeldig',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'math_noblahtex' => 'لم يمكن تنفيذ بلاه تك، والتي ينبغي أن تكون في $1',
	'math-desc' => 'خرج MathML لوسوم &lt;math&gt;',
	'math_AmbiguousInfix' => 'وضع غير مريح ل"$1".
حاول استخدام أقواس إضافية "{ ... }" للتوضيح',
	'math_CannotChangeDirectory' => 'لا يمكن تغيير مجلد العمل',
	'math_CannotCreateTexFile' => 'لا يمكن إنشاء ملف تك',
	'math_CannotRunDvipng' => 'لا يمكن تنفيذ dvipng',
	'math_CannotRunLatex' => 'لا يمكن تشغيل لاتك',
	'math_CannotWritePngDirectory' => 'لا يمكن الكتابة لمجلد PNG الخرج',
	'math_CannotWriteTexFile' => 'لا يمكن الكتابة إلى ملف تك',
	'math_CasesRowTooBig' => 'يمكن فقط أن تكون هناك مدخلتان في كل صف في منع "حالات"',
	'math_DoubleSubscript' => 'صادف سكريبتين فرعيين مرتبطين بنفس القاعدة (فقط واحد مسموح به)',
	'math_DoubleSuperscript' => 'صادف سكريبتين أعلى مرتبطين بنفس القاعدة (فقط واحد مسموح به)',
	'math_IllegalCharacter' => 'حرف غير قانوني في المدخل',
	'math_IllegalCommandInMathMode' => 'الأمر "$1" غير قانوني في نمط الرياضيات',
	'math_IllegalCommandInMathModeWithHint' => 'الأمر "$1" غير قانوني في نمط الرياضيات
ربما قصدت استخدام "$2" بدلا منه؟',
	'math_IllegalCommandInTextMode' => 'الأمر "$1" غير قانوني في نمط النص',
	'math_IllegalCommandInTextModeWithHint' => 'الأمر "$1" غير قانوني في نمط النص
ربما كنت تقصد استخدام "$2" بدلا منه؟',
	'math_IllegalDelimiter' => 'delimiter غير قانوني يتبع "$1"',
	'math_IllegalFinalBackslash' => 'فاصلة غير قانونية "\\" في نهاية المدخل',
	'math_IllegalNestedFontEncodings' => 'أوامر تكويد الخط لا ينبغي أن تكون نستد',
	'math_IllegalRedefinition' => 'الأمر "$1" تم تعريفه بالفعل؛ لا يمكنك إعادة تعريفه',
	'math_InvalidColour' => 'اللون "$1" غير صحيح',
	'math_InvalidUtf8Input' => 'النص المدخل ليس UTF-8 صحيحا',
	'math_LatexFontNotSpecified' => 'لا خط لاتك تم تحديده ل"$1"',
	'math_LatexPackageUnavailable' => 'غير قادر على عرض PNG لأن رزمة لاتك "$1" غير متوفرة',
	'math_MismatchedBeginAndEnd' => 'الأمران "$1" و "$2" لا يتطابقان',
	'math_MisplacedLimits' => 'الأمر "$1" يمكن أن يظهر فقط بعد عامل رياضيات.
فكر في استخدام "\\mathop".',
	'math_MissingCommandAfterNewcommand' => 'اسم أمر جديد مفقود أو غير قانوني بعد "\\newcommand".
يجب أن يكون هناك أمر واحد معرف بالضبط؛
يجب أن يبدأ بباك سلاش "\\" ويحتوي فقط على حروف أبجدية.',
	'math_MissingDelimiter' => 'delimiter مفقود بعد "$1"',
	'math_MissingOpenBraceAfter' => 'قوس مفتوح مفقود "{" بعد "$1"',
	'math_MissingOpenBraceAtEnd' => 'قوس مفتوح مفقود "{" في نهاية المدخل',
	'math_MissingOpenBraceBefore' => 'قوس مفتوح مفقود "{" قبل "$1"',
	'math_MissingOrIllegalParameterCount' => 'عدد محددات مفقود أو غير قانوني "$1".
يجب أن يكون رقما وحيدا بين 1 و 9 حصريا.',
	'math_MissingOrIllegalParameterIndex' => 'محدد فهرس مفقود أو غير قانوني في تعريف "$1"',
	'math_NonAsciiInMathMode' => 'الحروف التي ليست ASCII يمكن أن تستخدم فقط في نمط النص
حاول إحاطة الحروف المشكلة في "\\text{...}".',
	'math_NotEnoughArguments' => 'لا محددات كافية تم توفيرها ل"$1"',
	'math_PngIncompatibleCharacter' => 'غير قادر على توليد PNG يحتوي على الحرف $1 بطريقة صحيحة',
	'math_ReservedCommand' => 'الأمر "$1" محفوظ للاستخدام الداخلي بواسطة بلاه تك',
	'math_SubstackRowTooBig' => 'يمكن أن يكون هناك مدخلة واحدة في كل صف من منع "سبستاك"',
	'math_TooManyMathmlNodes' => 'توجد عقد كثيرة جدا في شجرة MathML',
	'math_TooManyTokens' => 'المدخل طويل جدا',
	'math_UnavailableSymbolFontCombination' => 'الرمز "$1" غير متوفر في الخط "$2"',
	'math_UnexpectedNextCell' => 'الأمر "&" يمكن أن يظهر فقط بداخل منع "\\begin ... \\end"',
	'math_UnexpectedNextRow' => 'الأمر "\\\\" يمكن أن يظهر فقط بداخل منع "\\begin ... \\end"',
	'math_UnmatchedBegin' => 'صادف "\\begin" بدون "\\end" مطابقة',
	'math_UnmatchedCloseBrace' => 'صادف قوسا مغلقا "}" بدون قوس مفتوح مطابق "{"',
	'math_UnmatchedEnd' => 'صادف "\\end" بدون "\\begin" مطابقة',
	'math_UnmatchedLeft' => 'صادف "\\left" بدون "\\right" مطابقة',
	'math_UnmatchedOpenBrace' => 'صادف قوسا مفتوحا "{" بدون قوس مغلق مطابق "}"',
	'math_UnmatchedOpenBracket' => 'صادف قوسا مفتوحا "[" بدون قوس مغلق مطابق "]"',
	'math_UnmatchedRight' => 'صادف "\\right" بدون "\\left" مطابقة',
	'math_UnrecognisedCommand' => 'أمر غير متعرف عليه "$1"',
	'math_WrongFontEncoding' => 'الرمز "$1" ربما لا يظهر في تكويد الخط "$2"',
	'math_WrongFontEncodingWithHint' => 'الرمز "$1" ربما لا يظهر في تكويد الخط "$2".
حاول استخدام أمر "$3{...}".',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 */
$messages['arz'] = array(
	'math_noblahtex' => 'لم يمكن تنفيذ بلاه تك، والتى ينبغى أن تكون فى $1',
	'math-desc' => 'خرج MathML لوسوم &lt;math&gt;',
	'math_AmbiguousInfix' => 'وضع غير مريح ل"$1".
حاول استخدام أقواس إضافية "{ ... }" للتوضيح',
	'math_CannotChangeDirectory' => 'لا يمكن تغيير مجلد العمل',
	'math_CannotCreateTexFile' => 'لا يمكن إنشاء ملف تك',
	'math_CannotRunDvipng' => 'لا يمكن تنفيذ dvipng',
	'math_CannotRunLatex' => 'لا يمكن تشغيل لاتك',
	'math_CannotWritePngDirectory' => 'لا يمكن الكتابة لمجلد PNG الخرج',
	'math_CannotWriteTexFile' => 'لا يمكن الكتابة إلى ملف تك',
	'math_CasesRowTooBig' => 'يمكن فقط أن تكون هناك مدخلتان فى كل صف فى منع "حالات"',
	'math_DoubleSubscript' => 'صادف سكريبتين فرعيين مرتبطين بنفس القاعدة (فقط واحد مسموح به)',
	'math_DoubleSuperscript' => 'صادف سكريبتين أعلى مرتبطين بنفس القاعدة (فقط واحد مسموح به)',
	'math_IllegalCharacter' => 'حرف غير قانونى فى المدخل',
	'math_IllegalCommandInMathMode' => 'الأمر "$1" غير قانونى فى نمط الرياضيات',
	'math_IllegalCommandInMathModeWithHint' => 'الأمر "$1" غير قانونى فى نمط الرياضيات
ربما قصدت استخدام "$2" بدلا منه؟',
	'math_IllegalCommandInTextMode' => 'الأمر "$1" غير قانونى فى نمط النص',
	'math_IllegalCommandInTextModeWithHint' => 'الأمر "$1" غير قانونى فى نمط النص
ربما كنت تقصد استخدام "$2" بدلا منه؟',
	'math_IllegalDelimiter' => 'delimiter غير قانونى يتبع "$1"',
	'math_IllegalFinalBackslash' => 'فاصلة غير قانونية "\\" فى نهاية المدخل',
	'math_IllegalNestedFontEncodings' => 'أوامر تكويد الخط لا ينبغى أن تكون نستد',
	'math_IllegalRedefinition' => 'الأمر "$1" تم تعريفه بالفعل؛ لا يمكنك إعادة تعريفه',
	'math_InvalidColour' => 'اللون "$1" غير صحيح',
	'math_InvalidUtf8Input' => 'النص المدخل ليس UTF-8 صحيحا',
	'math_LatexFontNotSpecified' => 'لا خط لاتك تم تحديده ل"$1"',
	'math_LatexPackageUnavailable' => 'غير قادر على عرض PNG لأن رزمة لاتك "$1" غير متوفرة',
	'math_MismatchedBeginAndEnd' => 'الأمران "$1" و "$2" لا يتطابقان',
	'math_MisplacedLimits' => 'الأمر "$1" يمكن أن يظهر فقط بعد عامل رياضيات.
فكر فى استخدام "\\mathop".',
	'math_MissingCommandAfterNewcommand' => 'اسم أمر جديد مفقود أو غير قانونى بعد "\\newcommand".
يجب أن يكون هناك أمر واحد معرف بالضبط؛
يجب أن يبدأ بباك سلاش "\\" ويحتوى فقط على حروف أبجدية.',
	'math_MissingDelimiter' => 'delimiter مفقود بعد "$1"',
	'math_MissingOpenBraceAfter' => 'قوس مفتوح مفقود "{" بعد "$1"',
	'math_MissingOpenBraceAtEnd' => 'قوس مفتوح مفقود "{" فى نهاية المدخل',
	'math_MissingOpenBraceBefore' => 'قوس مفتوح مفقود "{" قبل "$1"',
	'math_MissingOrIllegalParameterCount' => 'عدد محددات مفقود أو غير قانونى "$1".
يجب أن يكون رقما وحيدا بين 1 و 9 حصريا.',
	'math_MissingOrIllegalParameterIndex' => 'محدد فهرس مفقود أو غير قانونى فى تعريف "$1"',
	'math_NonAsciiInMathMode' => 'الحروف التى ليست ASCII يمكن أن تستخدم فقط فى نمط النص
حاول إحاطة الحروف المشكلة فى "\\text{...}".',
	'math_NotEnoughArguments' => 'لا محددات كافية تم توفيرها ل"$1"',
	'math_PngIncompatibleCharacter' => 'غير قادر على توليد PNG يحتوى على الحرف $1 بطريقة صحيحة',
	'math_ReservedCommand' => 'الأمر "$1" محفوظ للاستخدام الداخلى بواسطة بلاه تك',
	'math_SubstackRowTooBig' => 'يمكن أن يكون هناك مدخلة واحدة فى كل صف من منع "سبستاك"',
	'math_TooManyMathmlNodes' => 'توجد عقد كثيرة جدا فى شجرة MathML',
	'math_TooManyTokens' => 'المدخل طويل جدا',
	'math_UnavailableSymbolFontCombination' => 'الرمز "$1" غير متوفر فى الخط "$2"',
	'math_UnexpectedNextCell' => 'الأمر "&" يمكن أن يظهر فقط بداخل منع "\\begin ... \\end"',
	'math_UnexpectedNextRow' => 'الأمر "\\\\" يمكن أن يظهر فقط بداخل منع "\\begin ... \\end"',
	'math_UnmatchedBegin' => 'صادف "\\begin" بدون "\\end" مطابقة',
	'math_UnmatchedCloseBrace' => 'صادف قوسا مغلقا "}" بدون قوس مفتوح مطابق "{"',
	'math_UnmatchedEnd' => 'صادف "\\end" بدون "\\begin" مطابقة',
	'math_UnmatchedLeft' => 'صادف "\\left" بدون "\\right" مطابقة',
	'math_UnmatchedOpenBrace' => 'صادف قوسا مفتوحا "{" بدون قوس مغلق مطابق "}"',
	'math_UnmatchedOpenBracket' => 'صادف قوسا مفتوحا "[" بدون قوس مغلق مطابق "]"',
	'math_UnmatchedRight' => 'صادف "\\right" بدون "\\left" مطابقة',
	'math_UnrecognisedCommand' => 'أمر غير متعرف عليه "$1"',
	'math_WrongFontEncoding' => 'الرمز "$1" ربما لا يظهر فى تكويد الخط "$2"',
	'math_WrongFontEncodingWithHint' => 'الرمز "$1" ربما لا يظهر فى تكويد الخط "$2".
حاول استخدام أمر "$3{...}".',
);

/** Kotava (Kotava)
 * @author Wikimistusik
 */
$messages['avk'] = array(
	'math_InvalidColour' => '"$1" kseva tir meenafa',
);

/** Bulgarian (Български)
 * @author Borislav
 * @author DCLXVI
 * @author Spiritia
 */
$messages['bg'] = array(
	'math_CannotChangeDirectory' => 'Не може да се смени работната директория',
	'math_CannotCreateTexFile' => 'Не може да се генерира tex файл',
	'math_CannotRunDvipng' => 'dvipng не може да бъде стартиран',
	'math_CannotRunLatex' => 'LaTeX не може да бъде стартиран',
	'math_CannotWriteTexFile' => 'Не може да се пише в tex файла',
	'math_CasesRowTooBig' => 'В блока "cases" може да има само по два записа на ред',
	'math_DoubleSubscript' => 'Срещнати два долни индекса към една и съща основа (разрешен е само един)',
	'math_DoubleSuperscript' => 'Срещнати два горни индекса към една и съща основа (разрешен е само един)',
	'math_IllegalCharacter' => 'Въведен е непозволен символ',
	'math_IllegalCommandInMathMode' => 'Командата "$1" е невалидна във формулен режим',
	'math_IllegalCommandInMathModeWithHint' => 'Командата "$1" е невалидна във формулен режим (може би имахте предвид "$2"?)',
	'math_IllegalCommandInTextMode' => 'Командата "$1" е невалидна в текстов режим',
	'math_IllegalCommandInTextModeWithHint' => 'Командата "$1" е невалидна в текстов режим (може би имахте предвид "$2"?)',
	'math_IllegalDelimiter' => 'Непозволен разделител след "$1"',
	'math_IllegalFinalBackslash' => 'Непозволена обратна наклонена черта "\\" в края на входа',
	'math_IllegalRedefinition' => 'Командата "$1" вече е била дефинирана и не може да се предефинира',
	'math_InvalidColour' => '"$1" е невалиден цвят',
	'math_InvalidUtf8Input' => 'Въведеният низ не е валиден UTF-8',
	'math_LatexFontNotSpecified' => 'Не е указан LaTeX шрифт за "$1"',
	'math_LatexPackageUnavailable' => 'Тъй като не е наличен пакетът "$1" на LaTeX, PNG не може да се визуализира',
	'math_MismatchedBeginAndEnd' => 'Командите "$1" и "$2" не си съответстват',
	'math_MisplacedLimits' => 'Командата "$1" може да стои единствено след математически оператор (опитайте с "\\mathop")',
	'math_MissingCommandAfterNewcommand' => 'Липсващо или непозволено име на нова команда след "\\newcommand" (трябва да е дефинирана точно една команда, тя да започва с обратна наклонена черта "\\" и да съдържа в името си само букви от азбуката)',
	'math_MissingDelimiter' => 'Липсващ разделител след "$1"',
	'math_MissingOpenBraceAfter' => 'Липсваща отваряща скоба „{“ след „$1“',
	'math_MissingOpenBraceAtEnd' => 'Липсваща отваряща скоба „{“ в края на въведения текст',
	'math_MissingOpenBraceBefore' => 'Липсваща отваряща скоба „{“ пред „$1“',
	'math_NonAsciiInMathMode' => 'Символи извън ASCII могат да се използват единствено в текстов режим (например оградени с "\\text{...}")',
	'math_NotEnoughArguments' => 'Недостатъчен брой аргументи за "$1"',
	'math_PngIncompatibleCharacter' => 'Не може коректно да се генерира PNG изображение, съдържащо символа $1',
	'math_ReservedCommand' => 'Командата „$1“ е запазена само за вътрешно използване от blahtex',
	'math_SubstackRowTooBig' => 'В блока "substack" може да има само по един запис на ред',
	'math_TooManyMathmlNodes' => 'Има твърде много възли в MathML-дървото',
	'math_UnavailableSymbolFontCombination' => 'В шрифта "$2" няма на разположение символ "$1"',
	'math_UnexpectedNextCell' => 'Командата "&" може да се среща единствено в команден блок "\\begin ... \\end"',
	'math_UnexpectedNextRow' => 'Командата "\\\\" може да се среща единствено в команден блок "\\begin ... \\end"',
	'math_UnmatchedBegin' => 'Срещната команда "\\begin" без съответната команда "\\end"',
	'math_UnmatchedCloseBrace' => 'Срещната затваряща скоба "}" без съответната отваряща "{"',
	'math_UnmatchedEnd' => 'Срещната командата "\\end" без съответната команда "\\begin"',
	'math_UnmatchedLeft' => 'Срещната командата "\\left" без съответната команда "\\right"',
	'math_UnmatchedOpenBrace' => 'Срещната отваряща скоба "{" без съответната затваряща "}"',
	'math_UnmatchedOpenBracket' => 'Срещната отваряща скоба "[" без съответната затваряща "]"',
	'math_UnmatchedRight' => 'Срещната команда "\\right" без съответната команда "\\left"',
	'math_UnrecognisedCommand' => 'Неразпозната команда "$1"',
	'math_WrongFontEncoding' => 'Възможно е символът "$1" да не се визуализира правилно при "$2" кодиране',
	'math_WrongFontEncodingWithHint' => 'Възможно е символът "$1" да не се визуализира правилно при "$2" кодиране (опитайте с командата "$3{...}")',
);

/** Bengali (বাংলা)
 * @author Zaheen
 */
$messages['bn'] = array(
	'math_noblahtex' => 'blahtex চালানো গেল না, যেটি $1-এ থাকার কথা',
	'math-desc' => '&lt;math&gt; ট্যাগের জন্য ম্যাথএমএল আউটপুট',
	'math_AmbiguousInfix' => '"$1"-এর অবস্থান দ্ব্যর্থবোধক (অতিরিক্ত দ্বিতীয় বন্ধনী "{ ... }" ব্যবহার করে দ্ব্যর্থতা নিরসনের চেষ্টা করুন)',
	'math_CannotChangeDirectory' => 'সক্রিয় ডিরেক্টরি পরিবর্তন করা যাচ্ছে না',
	'math_CannotCreateTexFile' => 'টেক ফাইল সৃষ্টি করা যাচ্ছে না',
	'math_CannotRunDvipng' => 'dvipng নির্বাহ করা যাচ্ছে না',
	'math_CannotRunLatex' => 'লেটেক চালানো যাচ্ছে না',
	'math_CannotWritePngDirectory' => 'আউটপুট PNG ডিরেক্টরিতে লেখা যাচ্ছে না',
	'math_CannotWriteTexFile' => 'টেক ফাইলে লেখা যাচ্ছে না',
	'math_CasesRowTooBig' => 'একটি "ক্ষেত্রগুলি" ব্লকের প্রতি সারিতে কেবল দুইটি ভুক্তি থাকতে পারবে',
	'math_DoubleSubscript' => 'একই ভিত্তির সাথে দুইটি সাবস্ক্রিপ্ট সংযুক্ত (কেবল একটি অনুমোদিত)',
	'math_DoubleSuperscript' => 'একই ভিত্তির সাথে দুইটি সুপারস্ক্রিপ্ট সংযুক্ত (কেবল একটি অনুমোদিত)',
	'math_IllegalCharacter' => 'ইনপুটে অবৈধ ক্যারেক্টার',
	'math_IllegalCommandInMathMode' => 'গণিত মোডে "$1" নির্দেশটি অবৈধ',
	'math_IllegalCommandInMathModeWithHint' => 'গণিত মোডে "$1" নির্দেশটি অবৈধ (হয়ত আপনি এর পরিবর্তে "$2" ব্যবহার করতে চেয়েছিলেন?)',
	'math_IllegalCommandInTextMode' => '"$1" নির্দেশটি টেক্সট মোডে অবৈধ',
	'math_IllegalCommandInTextModeWithHint' => '"$1" নির্দেশটি টেক্সট মোডে অবৈধ (হয়ত আপনি এর পরিবর্তে "$2" ব্যবহার করতে চেয়েছিলেন?)',
	'math_IllegalDelimiter' => '"$1"-কে অনুসরণকারী সীমায়কটি অবৈধ',
	'math_IllegalFinalBackslash' => 'ইনপুটের শেষে অবৈধ ব্যাকস্ল্যাশ "\\"',
	'math_IllegalNestedFontEncodings' => 'ফন্ট এনকোডিং নির্দেশগুলি হয়ত নেস্টেড আকারে নেই',
	'math_IllegalRedefinition' => '"$1" নির্দেশটি ইতিমধ্যেই সংজ্ঞায়িত; আপনি এটিকে পুনরায় সংজ্ঞায়িত করতে পারবেন না',
	'math_InvalidColour' => '"$1" রঙটি অবৈধ',
	'math_InvalidUtf8Input' => 'ইনপুট স্ট্রিংটি বৈধ UTF-8 ছিল না',
	'math_LatexFontNotSpecified' => '"$1"-এর জন্য কোন লেটেক ফন্ট নির্দিষ্ট করে দেওয়া হয়নি',
	'math_LatexPackageUnavailable' => 'PNG রেন্ডার করা যাচ্ছে না, কারণ "$1" লেটেক প্যাকেজটি লভ্য নয়',
	'math_MismatchedBeginAndEnd' => '"$1" এবং "$2" নির্দেশ দুইটি মিলছে না',
	'math_MisplacedLimits' => '"$1" কমান্ডটি শুধুমাত্র একটি গাণিতিক অপারেটরের পরেই ব্যবহৃত হতে পারে ("\\mathop" ব্যবহার করতে পারেন)',
	'math_MissingCommandAfterNewcommand' => '"\\newcommand"-এর পরে নতুন কমান্ড নামটি অনুপস্থিত কিংবা অবৈধ (কেবল একটি কমান্ড সংজ্ঞায়িত থাকতে হবে; এটি অবশ্যই একটি ব্যাকস্ল্যাশ "\\" দিয়ে শুরু হতে হবে এবং এতে শুধু বর্ণমালার ক্যারেক্টার থাকতে পারবে)',
	'math_MissingDelimiter' => '"$1"-এর পরে সীমায়ক নেই',
	'math_MissingOpenBraceAfter' => '"$1"-এর পরে উন্মুক্ত বন্ধনী "{" নেই',
	'math_MissingOpenBraceAtEnd' => 'ইনপুটের শেষে দরকারী উন্মুক্ত বন্ধনী "{" নেই',
	'math_MissingOpenBraceBefore' => '"$1"-এর আগে দরকারী উন্মুক্ত বন্ধনী "{" নেই',
	'math_MissingOrIllegalParameterCount' => '"$1"-এর সংজ্ঞায় প্যারামিটার সংখ্যা অনুপস্থিত কিংবা অবৈধ (এটিকে অবশ্যই ১ থেকে ৯ পর্যন্ত সংখ্যাগুলির যেকোন একটি সংখ্যা হতে হবে)',
	'math_MissingOrIllegalParameterIndex' => '"$1"-এর সংজ্ঞায় প্যারামিটার সূচক অনুপস্থিত কিংবা অবৈধ',
	'math_NonAsciiInMathMode' => 'অ-আস্কি ক্যারেক্টারগুলি কেবল টেক্সট মোডে ব্যবহার করা যাবে (সমস্যাযুক্ত ক্যারেক্টারগুলি "\\text{...}"-এর ভেতরে লেখার চেষ্টা করুন)',
	'math_NotEnoughArguments' => '"$1"-এর জন্য যথেষ্ট আর্গুমেন্ট সরবরাহ করা হয়নি',
	'math_PngIncompatibleCharacter' => '$1 ক্যারেক্টার ধারণকারী PNG সঠিকভাবে সৃষ্টি করা যায়নি',
	'math_ReservedCommand' => '"$1" কমান্ডটি ব্লাটেকের অভ্যন্তরীণ ব্যবহারের জন্য রক্ষিত',
	'math_SubstackRowTooBig' => '"সাবস্ট্যাক" ব্লকের প্রতি সারিতে কেবলমাত্র একটি ভুক্তি থাকতে পারবে',
	'math_TooManyMathmlNodes' => 'ম্যাথএমএল বৃক্ষে গ্রন্থির (node) সংখ্যা অত্যধিক',
	'math_TooManyTokens' => 'ইনপুট অতিরিক্ত দীর্ঘ',
	'math_UnavailableSymbolFontCombination' => '"$1" প্রতীকটি "$2" ফন্টে নেই',
	'math_UnexpectedNextCell' => '"&" কমান্ডটি শুধুমাত্র একটি "\\begin ... \\end" ব্লকের মধ্যেই স্থান পেতে পারে',
	'math_UnexpectedNextRow' => '"\\\\" কমান্ডটি শুধুমাত্র একটি "\\begin ... \\end" ব্লকের মধ্যেই স্থান পেতে পারে',
	'math_UnmatchedBegin' => '"\\begin" খুঁজে পাওয়া গেছে যার কোন সংশ্লিষ্ট "\\end" নেই',
	'math_UnmatchedCloseBrace' => 'সমাপ্তকারী বন্ধনী "}" খুঁজে পাওয়া গেছে যার কোন সংশ্লিষ্ট আরম্ভকারী বন্ধনী "{" নেই',
	'math_UnmatchedEnd' => '"\\end" খুঁজে পাওয়া গেছে যার কোন সংশ্লিষ্ট "\\begin" নেই',
	'math_UnmatchedLeft' => '"\\left" খুঁজে পাওয়া গেছে যার কোন সংশ্লিষ্ট "\\right" নেই',
	'math_UnmatchedOpenBrace' => 'আরম্ভকারী বন্ধনী "{" খুঁজে পাওয়া গেছে যার কোন সংশ্লিষ্ট সমাপ্তকারী বন্ধনী "}" নেই',
	'math_UnmatchedOpenBracket' => 'আরম্ভকারী বর্গাকার বন্ধনী "[" খুঁজে পাওয়া গেছে যার কোন সংশ্লিষ্ট সমাপ্তকারী বর্গাকার বন্ধনী "]" নেই',
	'math_UnmatchedRight' => '"\\right" খুঁজে পাওয়া গেছে যার কোন সংশ্লিষ্ট "\\left" নেই',
	'math_UnrecognisedCommand' => '"$1" কমান্ডটি পরিচিত নয়',
	'math_WrongFontEncoding' => '"$1" প্রতীকটি "$2" ফন্ট এনকোডিং-এ উপস্থিত না-ও থাকতে পারে',
	'math_WrongFontEncodingWithHint' => '"$1" প্রতীকটি "$2" ফন্ট এনকোডিং-এ উপস্থিত না-ও থাকতে পারে ("$3{...}" কমান্ডটি চেষ্টা করে দেখুন)',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'math_noblahtex' => 'Dibosupl erounit Blahtex, a zlefe bezañ e $1',
	'math-desc' => 'Ezvont MathML evit ar balizennoù &lt;math&gt;',
	'math_AmbiguousInfix' => 'Amjestr eo lec\'hiadur "$1" (klaskit ouzhpennañ balizennoù "{ ... }" evit sevel an amjestregezh)',
	'math_CannotChangeDirectory' => 'Dibosupl cheñch teuliad labour',
	'math_CannotCreateTexFile' => 'Dibosupl krouiñ ur restr tex',
	'math_CannotRunDvipng' => 'Dibosupl erounit dvipng',
	'math_CannotRunLatex' => 'Dibosupl erounit LateX',
	'math_CannotWritePngDirectory' => 'Dibosupl skrivañ e teuliad ar restroù PNG',
	'math_CannotWriteTexFile' => 'Dibosupl skrivañ en ur restr tex',
	'math_CasesRowTooBig' => 'N\'hall bezañ nemet daou voned e pep renkennad ur bloc\'h "cases"',
	'math_DoubleSubscript' => "Kavet ez eus bet daou isskript stag ouzh an hevelep diaz (n'haller degemer nemet unan)",
	'math_DoubleSuperscript' => "Kavet ez eus bet daou usskript stag ouzh an hevelep diaz (n'haller degemer nemet unan)",
	'math_IllegalCharacter' => 'Arouezenn difennet er vaezienn skrivañ',
	'math_IllegalCommandInMathMode' => 'N\'haller ket ober gant an urzhiad  "$1" er mod jedoniezh.',
	'math_IllegalCommandInMathModeWithHint' => 'N\'haller ket ober gant an urzhiad "$1" er mod jedoniezh (marteze e felle deoc\'h ober gant "$2" e plas?)',
	'math_IllegalCommandInTextMode' => 'N\'haller ket ober gant an urzhiad "$1" er mod testenn.',
	'math_IllegalCommandInTextModeWithHint' => 'N\'haller ket ober gant an urzhiad "$1" er mod testenn (marteze e felle deoc\'h ober gant "$2" e plas)',
	'math_IllegalDelimiter' => 'Bevenner difennet war-lerc\'h "$1"',
	'math_IllegalFinalBackslash' => 'N\'haller ket lakaat ur c\'hilveskell "\\" e dibenn ar skrivadenn',
	'math_IllegalNestedFontEncodings' => "N'haller ket rouestlañ urzhiadoù enkodañ ar fontoù",
	'math_IllegalRedefinition' => 'Termenet eo bet c\'hoazh an urzhiad "$1"; n\'hall ket bezañ adtermenet ganeoc\'h.',
	'math_InvalidColour' => 'Kamm eo al liv "$1"',
	'math_InvalidUtf8Input' => "N'eo ket ar steudad arouezennoù skrivet diouzh ar furmad reizh UTF8",
	'math_LatexFontNotSpecified' => 'N\'eus bet spisaet font LaTeX ebet evit "$1"',
	'math_LatexPackageUnavailable' => 'Dibosupl rentañ ar restr PNG rak n\'haller ket kavout ar pakad LaTeX "$1"',
	'math_MismatchedBeginAndEnd' => 'Ne glot ket an urzhiadoù "$1" ha "$2"',
	'math_MisplacedLimits' => 'Er mod jedoniezh, n\'hall an urzhiad "$1" dont war-wel nemet war-lerc\'h un oberataer (klaskit gant "\\mathop")',
	'math_MissingCommandAfterNewcommand' => 'Un anv urzhiad nevez a vank pe a zo kamm war-lerc\'h "\\newcommand" (ret eo kaout rik un urzhiad termenet a rank kregiñ gant "\\" ha na vo enni nemet arouezennoù alfabetek).',
	'math_MissingDelimiter' => 'Mankout a ra ur bevenner war-lerc\'h "$1"',
	'math_MissingOpenBraceAfter' => 'Mankout a ra ur valizenn "{" war-lerc\'h "$1"',
	'math_MissingOpenBraceAtEnd' => 'Mankout a ra ar valizenn "{" e fin ar skrivadenn',
	'math_MissingOpenBraceBefore' => 'Mankout a ra ar valizenn "{" dirak "$1"',
	'math_MissingOrIllegalParameterCount' => 'Mankout a ra ar gont arventennoù pe unan fall zo e termenadur "$1" (ret eo lakaat ur sifr hepken, etre 1 ha 9)',
	'math_MissingOrIllegalParameterIndex' => 'Mankout a ra ar veneger arventennoù pe unan fall zo e termenadur "$1"',
	'math_NonAsciiInMathMode' => 'N\'haller implijout arouezennoù an-ASCII nemet er mod testenn (klaskit enframmañ an arouezennoù kudennek e "\\text{...}")',
	'math_NotEnoughArguments' => 'N\'eus ket bet lakaet a-walc\'h a arguzennoù evit "$1"',
	'math_PngIncompatibleCharacter' => 'Dibosubl eo sevel ent reizh ar restr PNG enni an arouezenn $1',
	'math_ReservedCommand' => 'Miret eo an urzhiad "$1" evit un implij diabarzh gant Blahtex',
	'math_SubstackRowTooBig' => 'N\'haller kaout nemet ur moned e pep renkennad ur bloc\'h "isberniet"',
	'math_TooManyMathmlNodes' => 'Re a skloulmoù zo er wezenn  MathML',
	'math_TooManyTokens' => 'Re hir eo ar skrivad',
	'math_UnavailableSymbolFontCombination' => 'N\'haller ket implijout an arouezenn "$1" gant ar font "$2"',
	'math_UnexpectedNextCell' => 'N\'hall an urzhiad "&" dont war wel nemet en ur bloc\'h "\\begin ... \\end"',
	'math_UnexpectedNextRow' => 'N\'hall an urzhiad "\\\\" dont war wel nemet en ur bloc\'h "\\begin ... \\end"',
	'math_UnmatchedBegin' => 'Kavet ez eus bet ur valizenn "\\begin" hep balizenn "\\end" da glotañ ganti',
	'math_UnmatchedCloseBrace' => 'Kavet ez eus bet ur valizenn serr "}" hep balizenn digor "{" da glotañ ganti',
	'math_UnmatchedEnd' => 'Kavet ez eus bet ur valizenn "\\end" hep balizenn "\\digor" da glotañ ganti',
	'math_UnmatchedLeft' => 'Kavet ez eus bet ur valizenn "\\left" hep balizenn "\\right" da glotañ ganti',
	'math_UnmatchedOpenBrace' => 'Kavet ez eus bet ur valizenn digor "{" hep balizenn serr "}" da glotañ ganti',
	'math_UnmatchedOpenBracket' => 'Kavet ez eus bet ur sonell digor "[" hep sonnell serr "]" da glotañ ganti',
	'math_UnmatchedRight' => 'Kavet ez eus bet ur valizenn "\\right" hep balizenn "\\left" da glotañ ganti',
	'math_UnrecognisedCommand' => 'Urzhiad "$1" dianav',
	'math_WrongFontEncoding' => 'Marteze ne zeuio ket war wel an arouezenn "$1" ma vez enkodet ar font "$2"',
	'math_WrongFontEncodingWithHint' => 'Marteze ne zeuio ket war wel an arouezenn "$1" ma vez enkodet ar font "$2" (klaskit kentoc\'h gant an urzhiad "$3{...}")',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'math_noblahtex' => 'Ne može se izvršiti blahtex, koji bi trebao biti na $1',
	'math-desc' => 'MathML izlaz za &lt;math&gt; oznake',
	'math_CannotChangeDirectory' => 'Ne mogu promijeniti radni direktorijum',
	'math_IllegalCharacter' => 'Nevaljan znak u unosu',
	'math_IllegalCommandInTextMode' => 'Komanda "$1" nije valjana u tekstualnom modu',
	'math_IllegalFinalBackslash' => 'Nevaljana kosa crta "\\" na kraju unosa',
	'math_MissingOpenBraceAfter' => 'Nedostaje otvorena zagrada "{" poslije "$1"',
	'math_MissingOpenBraceAtEnd' => 'Nedostaje otvorena zagrada "{" na kraju unosa',
	'math_MissingOpenBraceBefore' => 'Nedostaje otvorena zagrada "{" ispred "$1"',
	'math_UnexpectedNextRow' => 'Komanda "\\\\" se može nalaziti samo unutar "\\begin ... \\end" bloka',
	'math_UnmatchedEnd' => 'Pronađen "\\end" bez pripadajućeg "\\begin"',
	'math_UnmatchedLeft' => 'Pronađeno "\\left" bez pripadajućeg "\\right"',
	'math_UnmatchedOpenBrace' => 'Pronađena otvorena zagrada "{" bez pripadajuće zatvorene zagrade "}"',
	'math_UnmatchedRight' => 'Pronađeno "\\right" bez pripadajućeg "\\left"',
	'math_UnrecognisedCommand' => 'Neprepoznata komanda "$1"',
);

/** Catalan (Català)
 * @author Aleator
 */
$messages['ca'] = array(
	'math_InvalidColour' => 'El color "$1" és invàlid',
);

/** Czech (Česky)
 * @author Li-sung
 * @author Matěj Grabovský
 */
$messages['cs'] = array(
	'math_noblahtex' => 'Nelze spustit blahtex, který by měl být v $1',
	'math-desc' => 'MathML výstup značek &lt;math&gt;',
	'math_AmbiguousInfix' => 'Nejednoznačné umístění „$1“ (zkuste použít další závorky „{ ... }“ pro rozlišení)',
	'math_CannotChangeDirectory' => 'Nelze změnit pracovní adresář',
	'math_CannotCreateTexFile' => 'Nelze vytvořit tex soubor',
	'math_CannotRunDvipng' => 'Nelze spustit dvipng',
	'math_CannotRunLatex' => 'nelze spustit latex',
	'math_CannotWritePngDirectory' => 'Nelze zapisovat do výstupního adresáře pro PNG',
	'math_CannotWriteTexFile' => 'Nelze zapisovat do tex souboru',
	'math_CasesRowTooBig' => 'Můžou být pouze dva záznamy v každém řádku bloku „cases“',
	'math_DoubleSubscript' => 'Byly nalezeny dva dolní indexy patřící ke stejnému základu (je povolený jen jeden)',
	'math_DoubleSuperscript' => 'Byly nalezeny dva horní indexy patřící ke stejnému základu (je povolený jen jeden)',
	'math_IllegalCharacter' => 'Neplatný znak na vstupu',
	'math_IllegalCommandInMathMode' => 'Příkaz „$1“ není platný v matematickém režimu',
	'math_IllegalCommandInMathModeWithHint' => 'Příkaz „$1“ není platný v matematickém režimu (možná jste chtěli místo něho použít „$2“?)',
	'math_IllegalCommandInTextMode' => 'Příkaz „$1“ není platný v textovém režimu',
	'math_IllegalCommandInTextModeWithHint' => 'Příkaz „$1“ není platný v textovém režimu (možná jste chtěli místo něho použít „$2“?)',
	'math_IllegalDelimiter' => 'Neplatný oddělovač za „$1“',
	'math_IllegalFinalBackslash' => 'Neplatné zpětné lomítko „\\“ na konci vstupu',
	'math_IllegalNestedFontEncodings' => 'Příkazy kódování písma nemohou být být vnořené',
	'math_IllegalRedefinition' => 'Příkaz „$1“ už byl definovaný; nemůžete ho předefinovat',
	'math_InvalidColour' => 'Barva „$1“ není platná',
	'math_InvalidUtf8Input' => 'Vstupní řetězec nebyl platný UTF-8',
	'math_LatexFontNotSpecified' => 'Nebylo nalezeno uvedené písmo LaTeXu pro „$1“',
	'math_LatexPackageUnavailable' => 'Nebylo možno vykreslit PNG, protože balík LaTeXu „$1“ není dostupný',
	'math_MismatchedBeginAndEnd' => 'Příkazy „$1“ a „$2“ se neshodují',
	'math_MisplacedLimits' => 'Příkaz „$1“ může následovat jen za matematickým operátorem (zvažte použití „\\mathop“)',
	'math_MissingCommandAfterNewcommand' => 'Chybějící nebo neplatný nový název po příkazu „\\newcommand“ (musí být definován jen jeden příkaz; musí začínat zpětným lomítkem „\\“ a obsahovat jen alfabetické znaky)',
	'math_MissingDelimiter' => 'Chybí oddělovač za „$1“',
	'math_MissingOpenBraceAfter' => 'Chybí otevírající složená závorka „{“ za „$1“',
	'math_MissingOpenBraceAtEnd' => 'Chybí otevírající složená závorka „{“ na konci vstupu',
	'math_MissingOpenBraceBefore' => 'Chybí otevírající složená závorka „{“ před „$1“',
	'math_MissingOrIllegalParameterCount' => 'Chybějící nebo neplatný počet parametrů v definici „$1“ (musí být jediná číslice mezi 1 a 9 včetně)',
	'math_MissingOrIllegalParameterIndex' => 'Chybějící nebo neplatný počet parametrů v definici „$1“',
	'math_NonAsciiInMathMode' => 'Ne-ASCII znaky je možné použít pouze v textovém režimu (zkuste uzavřít problematické znaky do „\\text{...}“)',
	'math_NotEnoughArguments' => 'Nebyl poskytnut dostatek parametrů pro „$1“',
	'math_PngIncompatibleCharacter' => 'Nebylo možné správně vygenerovat PNG obsahující znak $1',
	'math_ReservedCommand' => 'Příkaz „$1“ je vyhrazen pro vnitřní použití blahtexem',
	'math_SubstackRowTooBig' => 'V každém řádku bloku „substack“ může být jen jeden záznam',
	'math_TooManyMathmlNodes' => 'Ve stromu MathML je příliš moc uzlů',
	'math_TooManyTokens' => 'Vstup je příliš dlouhý',
	'math_UnavailableSymbolFontCombination' => 'Symbol „$1“ není dostupný v písmu „$2“',
	'math_UnexpectedNextCell' => 'Příkaz „&“ se může vyskytovat jen uvnitř bloku „\\begin ... \\end“',
	'math_UnexpectedNextRow' => 'Příkaz „\\\\“ se může vyskytovat jen uvnitř bloku „\\begin ... \\end“',
	'math_UnmatchedBegin' => 'Vyskytl se „\\begin“ bez odpovídajícího „\\end“',
	'math_UnmatchedCloseBrace' => 'vyskytla se uzavírající složená závorka „}“ bez odpovídající otevírající složené závorky „{“',
	'math_UnmatchedEnd' => 'Vyskytl se „\\end“ bez odpovídajícího „\\begin“',
	'math_UnmatchedLeft' => 'Vyskytl se „\\left“ bez odpovídajícího „\\right“',
	'math_UnmatchedOpenBrace' => 'Vyskytla se otevírající složená závorka „{“ bez odpovídající uzavírající složené závorky „}“',
	'math_UnmatchedOpenBracket' => 'Vyskytla se otevírající hranatá závorka „[“ bez odpovídající uzavírající hranaté závorky „]“',
	'math_UnmatchedRight' => 'Vyskytl se „\\right“ bez odpovídajícího „\\left“',
	'math_UnrecognisedCommand' => 'Nerozpoznatelný příkaz „$1“',
	'math_WrongFontEncoding' => 'Symbol „$1“ se nemůže nacházet v kódování písma „$2“',
	'math_WrongFontEncodingWithHint' => 'Symbol „$1“ se nemůže nacházet v kódování písma „$2“ (zkuste použít příkaz „$3{...}“)',
);

/** German (Deutsch)
 * @author Als-Holder
 * @author ChrisiPK
 * @author Revolus
 * @author Umherirrender
 */
$messages['de'] = array(
	'math_noblahtex' => 'blahtex konnte in $1 nicht ausgeführt werden.',
	'math-desc' => 'MathML-Ausgabe für &lt;math&gt;-Tags',
	'math_AmbiguousInfix' => 'An dieser Stelle ist „$1“ mehrdeutig.
Versuche weitere geschwungene Klammern „{ … }“ einzufügen, um die Eingabe eindeutig zu machen.',
	'math_CannotChangeDirectory' => 'Arbeitsverzeichnis konnte nicht gewechselt werden',
	'math_CannotCreateTexFile' => 'tex-Datei konnte nicht erstellt werden',
	'math_CannotRunDvipng' => 'dvipng konnte nicht ausgeführt werden',
	'math_CannotRunLatex' => 'latex konnte nicht ausgeführt werden',
	'math_CannotWritePngDirectory' => 'Das PNG-Verzeichnis ist nicht beschreibbar',
	'math_CannotWriteTexFile' => 'Es war nicht möglich in die tex-Datei zu schreiben',
	'math_CasesRowTooBig' => 'Es kann pro Zeile eines „cases“-Block bloß zwei Einträge geben',
	'math_DoubleSubscript' => 'Es kamen zwei Indices an der gleichen Basis vor.
Nur ein Index ist erlaubt.',
	'math_DoubleSuperscript' => 'Es kamen zwei Exponenten an der gleichen Basis vor.
Nur ein Index ist erlaubt.',
	'math_IllegalCharacter' => 'Ungültiges Zeichen in der Eingabe',
	'math_IllegalCommandInMathMode' => 'Im mathematischen Modus ist die Anweisung „$1“ nicht erlaubt',
	'math_IllegalCommandInMathModeWithHint' => 'Im mathematischen Modus ist die Anweisung „$1“ nicht erlaubt.
Vielleicht magst du „$2“ stattdessen verwenden?',
	'math_IllegalCommandInTextMode' => 'Im Texmodus ist die Anweisung „$1“ nicht erlaubt',
	'math_IllegalCommandInTextModeWithHint' => 'Im Textmodus ist die Anweisung „$1“ nicht erlaubt.
Vielleicht magst du „$2“ stattdessen verwenden?',
	'math_IllegalDelimiter' => 'Ungültiges Trennzeichen hinter „$1“',
	'math_IllegalFinalBackslash' => 'Ungültiger Backslash „\\“ am Ende der Eingabe',
	'math_IllegalNestedFontEncodings' => 'Zeichenkodierungsanweisungen können nicht geschachtelt werden',
	'math_IllegalRedefinition' => 'Die Anweisung „$1“ wurde bereits definiert. Du kannst sie nicht überschreiben',
	'math_InvalidColour' => 'Die Farbe „$1“ ist ungültig',
	'math_InvalidUtf8Input' => 'Die Eingabe ist keine gültige UTF-8-Zeichenkette',
	'math_LatexFontNotSpecified' => 'Es wurde keine LaTeX-Schriftart für „$1” angegeben',
	'math_LatexPackageUnavailable' => 'Die PNG konnte nicht erstellt werden, weil das LaTeX-Paket „$1“ nicht verfügbar ist',
	'math_MismatchedBeginAndEnd' => 'Die öffnende Anweisung „$1“ entspricht nicht der schließenden „$2“',
	'math_MisplacedLimits' => 'Die Anweisung „$1“ kann nur hinter einem mathematischen Operator vorkommen.
Überlege es dir „\\mathop“ zu verwenden.',
	'math_MissingCommandAfterNewcommand' => 'Fehlender oder ungültiger Befehlsname nach „\\newcommand“.
Es muss genau ein Befehl definiert werden;
er muss mit einem umgekehrten Schrägstrich (Backslash) „\\“ beginnen und darf nur alphabetische Zeichen enthalten.',
	'math_MissingDelimiter' => 'Fehlendes Trennzeichen hinter „$1“',
	'math_MissingOpenBraceAfter' => 'Öffnende Klammer „{“ hinter „$1“ fehlt',
	'math_MissingOpenBraceAtEnd' => 'Öffnende Klammer „{“ am Ende der Eingabe fehlt',
	'math_MissingOpenBraceBefore' => 'Öffnende Klammer „{“ vor „$1“ fehlt',
	'math_MissingOrIllegalParameterCount' => 'Fehlende oder ungültige Parameterzahl in der Definition von „$1“.
Es muss eine einzelne Ziffer zwischen einschließlich 1 und 9 sein.',
	'math_MissingOrIllegalParameterIndex' => 'Fehlender oder falscher Parameterindex in der Definition von „$1“',
	'math_NonAsciiInMathMode' => 'Sonderzeichen (Nicht-ASCII-Zeichen) dürfen nur im Textmodus verwendet werden
Versuche die problematischen Zeichen in „\\text{…}“ einzuschließen.',
	'math_NotEnoughArguments' => 'Es wurden nicht genügend Parameter für „$1“ übergeben',
	'math_PngIncompatibleCharacter' => 'PNG mit dem Zeichen $1 kann nicht fehlerfrei generiert werden',
	'math_ReservedCommand' => 'Die Anweisung „$1“ ist für die interne Verwendung in blahtex reserviert',
	'math_SubstackRowTooBig' => 'Pro Zeile eines „substack“-Blockes darf es einen Eintrag geben',
	'math_TooManyMathmlNodes' => 'Der MathML-Verarbeitungsbaum enthält zu viele Knoten',
	'math_TooManyTokens' => 'Die Eingabe ist zu lang',
	'math_UnavailableSymbolFontCombination' => 'Das Symbol „$1“ ist in der Schriftart „$2“ nicht vorhanden',
	'math_UnexpectedNextCell' => 'Die Anweisung „&amp;“ kann nur in einem „\\begin … \\block“-Block stehen',
	'math_UnexpectedNextRow' => 'Die Anweisung „\\\\“ kann nur in einem „\\begin … \\block“-Block stehen',
	'math_UnmatchedBegin' => '„\\begin“ ohne zugehöriges „\\end“',
	'math_UnmatchedCloseBrace' => 'Schließende Klammer „}” ohne zugehörige öffnende Klammer „{”',
	'math_UnmatchedEnd' => '„\\end” ohne zugehöriges „\\begin”',
	'math_UnmatchedLeft' => '„\\left” ohne zugehöriges „\\right”',
	'math_UnmatchedOpenBrace' => 'Öffnende Klammer „{” ohne zugehörige schließende Klammer „}”',
	'math_UnmatchedOpenBracket' => 'Öffnende Klammer „[” ohne zugehörige schließende Klammer „]”',
	'math_UnmatchedRight' => '„\\right” ohne zugehöriges „\\left”',
	'math_UnrecognisedCommand' => 'Unbekannte Anweisung „$1“',
	'math_WrongFontEncoding' => 'Das Symbol „$1“ darf in der Zeichenkodierung „$2“ nicht vorkommen',
	'math_WrongFontEncodingWithHint' => 'Das Symbol „$1“ darf in der Zeichenkodierung „$2“ nicht vorkommen
Probiere die Anweisung „$3{…}“ aus.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'math_noblahtex' => 'blahtex njedajo se wuwjesć, kótaryž by  měła pla $1 byś',
	'math-desc' => 'Wudaśe MathML za toflicki &lt;math&gt;',
	'math_AmbiguousInfix' => '"$1" jo how wěcej zmysłowy.
Wopytaj pśidatne wugibnjone spinki "{ ... }" wužywaś, aby wótpórał wěcejzmysłowosć.',
	'math_CannotChangeDirectory' => 'Źěłowy zapis njedajo se změniś',
	'math_CannotCreateTexFile' => 'tex-dataja njedajo se napóraś',
	'math_CannotRunDvipng' => 'dvipng njedajo se wuwjesć',
	'math_CannotRunLatex' => 'latex njedajo se wuwjesć',
	'math_CannotWritePngDirectory' => 'Njejo móžno do PNG-zapisa pisaś',
	'math_CannotWriteTexFile' => 'Njejo móžno do tex-dataje pisaś',
	'math_CasesRowTooBig' => 'W kuždej smužce bloka "cases" stej jano dwa zapis móžno',
	'math_DoubleSubscript' => 'Dwa indeksa na samkej bazy.
Jano jaden indeks jo dowólony.',
	'math_DoubleSuperscript' => 'Dwa eksponenta na samkej bazy.
Jano jaden eksponent jo dowólony.',
	'math_IllegalCharacter' => 'Njedowólone znamješko w zapódaśu',
	'math_IllegalCommandInMathMode' => 'Pśikaz "$1" njejo dowólony w modusu math',
	'math_IllegalCommandInMathModeWithHint' => 'Pśikaz "$1" njejo dowólony w modusu math.
Snaź coš město togo "$2" wužywaś?',
	'math_IllegalCommandInTextMode' => 'Pśikaz "$1" njejo dowólony w tekstowem modusu',
	'math_IllegalCommandInTextModeWithHint' => 'Pśikaz "$1" njejo dowólony w tekstowem modusu.
Snaź coš město togo "$2" wužywaś?',
	'math_IllegalDelimiter' => 'Njedowólone źěleńske znamuško slězy "$1"',
	'math_IllegalFinalBackslash' => 'Njedowólona nawopacna nakósna smužka "\\" na kóńcu zapódaśa',
	'math_IllegalNestedFontEncodings' => 'Pśikaze znamješkowego kodowanja njesměju se zašachtelikaś',
	'math_IllegalRedefinition' => 'Pśikaz "$1" jo južo definěrowany, njamóžoš jen hyšći raz definěrowaś',
	'math_InvalidColour' => 'Barwa "$1" jo njepłaśiwa',
	'math_InvalidUtf8Input' => 'Zapódawański tekst njejo płaśiwy rěd znamješkow UTF-8',
	'math_LatexFontNotSpecified' => 'Za "$1" njejo žedne pismo LaTeX pódane',
	'math_LatexPackageUnavailable' => 'Njemóžno PNG kresliś, dokulaž pakśik LaTeX "$1" njestoj k dispoziciji',
	'math_MismatchedBeginAndEnd' => 'Pśikaza "$1" a "$2" se njemakatej',
	'math_MisplacedLimits' => 'Pśikaz "$1" móžo jano za matematiskim operatorom wustupowaś.
Rozmysl wó wužywanju "\\mathop".',
	'math_MissingCommandAfterNewcommand' => 'Felujuce abo njedowólone nowe pśikazowe mě "\\newcommand".
Musy rowno jaden pśikaz definěrowany byś;
musy se z nawopacneju nakósneju smužku "\\" zachopiś a smějo jano alfabetiske znamješka wopśimjeś.',
	'math_MissingDelimiter' => 'Felujuce źěleńske znamuško za "$1"',
	'math_MissingOpenBraceAfter' => 'Felujuca wócynjajuca wugibnjona spinka "&#123;" za "$1"',
	'math_MissingOpenBraceAtEnd' => 'Felujuca wócynjajuca wugibnjona spinka "&#123;" na kóńcu zapódaśa',
	'math_MissingOpenBraceBefore' => 'Felujuca wócynjajuca wugibnjona spinka "&#123;" pśed "$1"',
	'math_MissingOrIllegalParameterCount' => 'Felujuca abo njedowólona licba w definiciji "$1".
Musy to jadnotliwa cyfra mjazy 1 a inkluziwnje 9 byś.',
	'math_MissingOrIllegalParameterIndex' => 'Felujucy abo njedowólony parametrowy indeks w definiciji "$1"',
	'math_NonAsciiInMathMode' => 'Znamješka nic-ASCII směju se jano w tekstowem modusu wužywaś.
Wopytaj problematiske znamješka pśez "\\text{...}" wobedaś.',
	'math_NotEnoughArguments' => 'Nic dosć argumentow za "$1" pśepódane',
	'math_PngIncompatibleCharacter' => 'PNG njedajo se ze znamuškom $1 korektnje napóraś',
	'math_ReservedCommand' => 'Pśikaz "$1" jo za interne wužywanje pśez blahtex rezerwěrowany',
	'math_SubstackRowTooBig' => 'W kuždej smužce bloka "substack" móžo jano jaden zapisk byś',
	'math_TooManyMathmlNodes' => 'Jo pśewjele sukow w bomje MathML',
	'math_TooManyTokens' => 'Zapódaśe jo pśedłujko',
	'math_UnavailableSymbolFontCombination' => 'Symbol "$1" njestoj w pismje "$2" k dispoziciji',
	'math_UnexpectedNextCell' => 'Pśikaz "&" móžo jano w bloku "\\begin ... \\end" wustupowaś',
	'math_UnexpectedNextRow' => 'Pśikaz "\\\\" móžo jano w bloku "\\begin ... \\end" wustupowaś',
	'math_UnmatchedBegin' => '"\\begin" bźez pśisłušajucego "\\end"',
	'math_UnmatchedCloseBrace' => 'Zacynjajuca wugibnjona spinka "<nowiki>}</nowiki>" bźez pśisłušajuceje wócynjajuceje wugibnjoneje spinki "<nowiki>{</nowiki>"',
	'math_UnmatchedEnd' => '"\\end" bźez pśisłušajucego "\\begin"',
	'math_UnmatchedLeft' => '"\\left" bźez pśisłušajucego "\\right"',
	'math_UnmatchedOpenBrace' => 'Wócynjajuca wugibnjona spinka "<nowiki>{</nowiki>" bźez pśisłušajuceje zacynjajuceje wugibnjoneje spinki "<nowiki>}</nowiki>"',
	'math_UnmatchedOpenBracket' => 'Wócynjajuca rožkata spinka "<nowiki>[</nowiki>" bźez pśisłušajuceje zacynjajuceje rožkateje spinki "<nowiki>]</nowiki>"',
	'math_UnmatchedRight' => '"\\right" bźez pśisłušajucego "\\left"',
	'math_UnrecognisedCommand' => 'Njespóznaty pśikaz "$1"',
	'math_WrongFontEncoding' => 'Symbol "$1" njesmějo w znamješkowem kodowanju "$2" wustupowaś',
	'math_WrongFontEncodingWithHint' => 'Symbol "$1" njesmějo w znamješkowem kodowanju "$2" wustupowaś.
Wopytaj pśikaz "$3{...}" wužywaś.',
);

/** Greek (Ελληνικά)
 * @author Consta
 */
$messages['el'] = array(
	'math_InvalidColour' => 'Το χρώμα "$1" είναι άκυρο',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'math_noblahtex' => 'Ne povas voki blahtex-on, kiu estu ĉe $1',
	'math-desc' => 'MathML-eligo por &lt;math&gt; etikedoj',
	'math_AmbiguousInfix' => 'Malklara loko de "$1" (Provu uzi pliajn krampojn "{ ... }" por apartigi)',
	'math_CannotChangeDirectory' => 'Ne povas ŝanĝi labor-dosierujon',
	'math_CannotCreateTexFile' => 'Ne povas krei tex-dosieron',
	'math_CannotRunDvipng' => 'Ne povas voki dvipng-on',
	'math_CannotRunLatex' => 'Ne povas voki latex-on',
	'math_CannotWritePngDirectory' => 'Ne povas skribi al eliga PNG-dosierujo',
	'math_CannotWriteTexFile' => 'Ne povas skribi tex-dosieron',
	'math_IllegalCharacter' => 'Nevalida signo en enigo',
	'math_IllegalCommandInMathMode' => 'La komando "$1" estas nevalida en matematika reĝimo',
	'math_IllegalCommandInMathModeWithHint' => 'La komando "$1" estas nevalida en matematika reĝimo (eble vi intenciis uzi "$2" anstataŭe?)',
	'math_IllegalCommandInTextMode' => 'La komando "$1" estas nevalida en teksta reĝimo',
	'math_IllegalCommandInTextModeWithHint' => 'La komando "$1" estas nevalida en teksta reĝimo (eble vi intenciis uzi "$2" anstataŭe?)',
	'math_IllegalDelimiter' => 'Nevalida disigilo post "$1"',
	'math_IllegalFinalBackslash' => 'Nevalida deklivo "\\" ĉe fino de enigo',
	'math_IllegalNestedFontEncodings' => 'Kodoprezentaj komandoj de tiparoj ne povas esti ingitaj',
	'math_IllegalRedefinition' => 'La komando "$1" jam estis difinita; vi ne povas redifini ĝin',
	'math_InvalidColour' => 'La koloro "$1" estas nevalida',
	'math_InvalidUtf8Input' => 'La enigo-ĉeno ne estis valida UTF-8',
	'math_LatexFontNotSpecified' => 'Neniu LaTeX tiparo estis specifigita por "$1"',
	'math_LatexPackageUnavailable' => 'Neeblas bildigi PNG-on ĉar la LaTeX-pakaĵo "$1" ne estas atingebla',
	'math_MismatchedBeginAndEnd' => 'Komandoj "$1" kaj "$2" ne kongruas',
	'math_MissingDelimiter' => 'Mankas disigilo post "$1"',
	'math_MissingOpenBraceAfter' => 'Mankas malferma krampo "{" post "$1"',
	'math_MissingOpenBraceAtEnd' => 'Mankas malferma krampo "{" ĉe fino de enigo',
	'math_MissingOpenBraceBefore' => 'Mankas malferma krampo "{" antaŭ "$1"',
	'math_MissingOrIllegalParameterIndex' => 'Mankanta aŭ nevalida parametro-indekso en difino de "$1"',
	'math_NotEnoughArguments' => 'Ne sufiĉaj argumentoj estis provizitaj por "$1"',
	'math_PngIncompatibleCharacter' => 'Neeblas korekte generi PNG-on enhavantan la signon $1',
	'math_ReservedCommand' => 'La komando "$1" estas rezervita por interna uzado de blatex',
	'math_TooManyMathmlNodes' => 'Estas tro da nodoj en la MathML-arbo',
	'math_TooManyTokens' => 'La enigo estas tro longa',
	'math_UnavailableSymbolFontCombination' => 'La simbolo "$1" ne estas havebla en la tiparo "$2"',
	'math_UnexpectedNextCell' => 'La komando "&" nur povas aperi inter bloko de "\\begin ... \\end"',
	'math_UnmatchedBegin' => 'Estas trovita "\\begin" sen para "\\end"',
	'math_UnmatchedCloseBrace' => 'Trovis ferman krampon "}" sen para malferma krampo "{"',
	'math_UnmatchedEnd' => 'Trovis etikedon "\\end" sen kongrua "\\begin"',
	'math_UnmatchedLeft' => 'Trovis etikedon "\\left" sen kongrua "\\right"',
	'math_UnmatchedOpenBrace' => 'Trovis malferman krampon "{" sen kongrua ferma krampo "}"',
	'math_UnmatchedOpenBracket' => 'Trovis malferman krampon "[" sen kongrua ferma krampo "]"',
	'math_UnmatchedRight' => 'Trovis etikedon "\\right" sen kongrua "\\left"',
	'math_UnrecognisedCommand' => 'Nekonata komando "$1"',
	'math_WrongFontEncoding' => 'La simbolo "$1" eble ne aperos en tiparo kodprezento "$2"',
	'math_WrongFontEncodingWithHint' => 'La simbolo "$1" eble ne aperos en tiparo kodprezento "$2" (provu uzi la komandon "$3{...}" anstataŭe)',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Drini
 */
$messages['es'] = array(
	'math_noblahtex' => 'No se puede ejecutar blahtex, que deberia estar en $1',
	'math-desc' => 'Salida MathML para etiquetas &lt;math&gt;',
	'math_AmbiguousInfix' => 'Colocación ambigua de "$1".
Intenta usar llaves adicionales "{ ... }" para precisar.',
	'math_CannotChangeDirectory' => 'No se puede cambiar directorio actual',
	'math_CannotCreateTexFile' => 'No se puede crear archivo tex',
	'math_CannotRunDvipng' => 'No se puede ejecutar dvipng',
	'math_CannotRunLatex' => 'No se puede ejecutar latex',
	'math_CannotWritePngDirectory' => 'No se puede escribir al directorio de salida PNG',
	'math_CannotWriteTexFile' => 'No se puede escribir en el archivo tex',
	'math_CasesRowTooBig' => 'Sólo puede haber dos entradas en cada línea de un bloque "cases" (casos).',
	'math_DoubleSubscript' => 'Se encontraron dos subíndices anexos a una misma base.
Sólo se permite uno.',
	'math_DoubleSuperscript' => 'Se encontraro dos superíndices anexos a una misma base.
Sólo se permite uno.',
	'math_IllegalCharacter' => 'Caracter ilegal en la entrada',
	'math_IllegalCommandInMathMode' => 'El comando "$1" es ilegal en modo matemático',
	'math_IllegalCommandInMathModeWithHint' => 'El comando "$1" es ilegal en modo matemático.
¿Quizás querías usar "$2" ?',
	'math_IllegalCommandInTextMode' => 'El comando "$1" es ilegal en modo texto',
	'math_IllegalCommandInTextModeWithHint' => 'El comando $1$ es ilegal en modo texto.
¿Quizás querías usar "$2" ?',
	'math_IllegalDelimiter' => 'Delimitador ilegal a continuación de "$1"',
	'math_IllegalFinalBackslash' => 'Barra ilegal "\\" al final de la entrada',
	'math_IllegalNestedFontEncodings' => 'Comandos de codificación de fuentes no pueden estar anidados',
	'math_IllegalRedefinition' => 'El comando "$1" ya ha sido definido; usted no puede redefinirlo',
	'math_InvalidColour' => 'El color "$1" es inválido',
	'math_TooManyMathmlNodes' => 'Hay demasiados nodos en el árbol MathML',
	'math_TooManyTokens' => 'La entrada es demasiado larga',
	'math_UnrecognisedCommand' => 'Comando irreconocible "$1"',
);

/** Basque (Euskara)
 * @author Kobazulo
 */
$messages['eu'] = array(
	'math_CannotCreateTexFile' => 'Ezin da tex fitxategia sortu',
	'math_CannotRunDvipng' => 'dvipng ezin da exekutatu',
	'math_CannotRunLatex' => 'latex ezin da exekutatu',
	'math_CannotWriteTexFile' => 'Ezin da tex fitxategia idatzi',
	'math_InvalidColour' => '"$1" kolorea ez da baliozkoa',
	'math_MismatchedBeginAndEnd' => '"$1" eta "$2" komandoek ez datoz bat',
	'math_UnexpectedNextCell' => '"&" komandoa "\\begin ... \\end" blokearen barruan egon daiteke bakarrik',
	'math_UnexpectedNextRow' => '"\\\\" komandoa "\\begin ... \\end" blokearen barruan egon daiteke bakarrik',
	'math_UnrecognisedCommand' => '"$1" komandoa ezezaguna da',
);

/** Persian (فارسی)
 * @author Mardetanha
 */
$messages['fa'] = array(
	'math_IllegalCharacter' => 'نویسه غیراستاندارد در ورودی',
	'math_TooManyTokens' => 'ورودی بسیار طولانی است',
);

/** Finnish (Suomi)
 * @author Cimon Avaro
 * @author Nike
 * @author Str4nd
 * @author Vililikku
 */
$messages['fi'] = array(
	'math_noblahtex' => 'Blahtexin suorittaminen epäonnistui. Sen pitäisi sijaita kohteessa $1.',
	'math-desc' => 'MathML-ulostulo &lt;math&gt;-elementeille.',
	'math_CannotChangeDirectory' => 'Työhakemiston vaihtaminen epäonnistui.',
	'math_CannotCreateTexFile' => 'Tex-tiedoston luominen epäonnistui.',
	'math_CannotRunDvipng' => 'Ei voida suorittaa ohjelmaa dvipng',
	'math_CannotRunLatex' => 'Ei voida suorittaa ohjelmaa latex',
	'math_CannotWritePngDirectory' => 'PNG-kuvien kohdehakemistoon kirjoittaminen epäonnistui',
	'math_CannotWriteTexFile' => 'Tex-tiedostoon kirjoittaminen epäonnistui.',
	'math_IllegalCharacter' => 'Kelpaamaton merkki syötteessä',
	'math_IllegalCommandInMathMode' => 'Komento ”$1” on kielletty matematiikkatilassa.',
	'math_IllegalCommandInMathModeWithHint' => 'Komento ”$1” on virheellinen matematiikkatilassa.
Ehkä sinun piti käyttää komentoa ”$2”?',
	'math_IllegalCommandInTextMode' => 'Komento ”$1” on virheellinen tekstitilassa.',
	'math_IllegalCommandInTextModeWithHint' => 'Komento ”$1” on virheellinen tekstitilassa.
Ehkä sinun piti käyttää komentoa ”$2”?',
	'math_IllegalRedefinition' => 'Komento ”$1” on jo määritelty, joten et voi määritellä sitä uudelleen.',
	'math_InvalidColour' => 'Väri ”$1” on virheellinen',
	'math_InvalidUtf8Input' => 'Tekstisyöte ei ole UTF-8-merkistökoodattu',
	'math_LatexFontNotSpecified' => 'LaTeX-kirjasinta ei ole määritelty kohteelle ”$1”.',
	'math_LatexPackageUnavailable' => 'PNG-kuvaa piirtäminen ei onnistu, koska LaTeX-paketti ”$1” ei ole saatavilla.',
	'math_MismatchedBeginAndEnd' => 'Komennot ”$1” ja ”$2” eivät täsmää.',
	'math_NotEnoughArguments' => 'Liian vähän argumentteja komennolle $1.',
	'math_PngIncompatibleCharacter' => 'Merkin $1 sisältävän PNG-tiedoston luominen oikein ei onnistu',
	'math_ReservedCommand' => 'Komento <tt>$1</tt> on varattu blahtexin sisäiseen käyttöön',
	'math_TooManyTokens' => 'Syöte on liian pitkä.',
	'math_UnavailableSymbolFontCombination' => 'Symbolia <tt>$1</tt> ei löydy fontista $2.',
	'math_UnrecognisedCommand' => 'Tunnistamaton komento ”$1”',
);

/** French (Français)
 * @author Grondin
 * @author Sherbrooke
 * @author Urhixidur
 * @author Verdy p
 */
$messages['fr'] = array(
	'math_noblahtex' => 'Ne peut exécuter blahtex, qui devrait être à $1',
	'math-desc' => 'Rendu MathML du contenu des balises &lt;math&gt;',
	'math_AmbiguousInfix' => "La position de « $1 » est ambiguë (ajouter des balises additionnelles « { ... } » peut lever l'ambiguïté)",
	'math_CannotChangeDirectory' => 'Ne peut changer de dossier de travail',
	'math_CannotCreateTexFile' => 'Ne peut créer un fichier tex',
	'math_CannotRunDvipng' => 'Ne peut exécuter dvipng',
	'math_CannotRunLatex' => 'Ne peut exécuter LaTeX',
	'math_CannotWritePngDirectory' => 'Ne peut écrire dans le dossier des fichiers PNG',
	'math_CannotWriteTexFile' => 'Ne peut écrire dans un fichier tex',
	'math_CasesRowTooBig' => "Il ne peut y avoir que deux entrées dans chaque rangée d'un bloc « cases ».",
	'math_DoubleSubscript' => 'Deux indices sont rattachés à la même base, un seul est permis.',
	'math_DoubleSuperscript' => 'Deux exposants sont rattachés à la même base, un seul est permis.',
	'math_IllegalCharacter' => 'Caractère interdit dans la donnée saisie',
	'math_IllegalCommandInMathMode' => 'La commande « $1 » est interdite en mode math.',
	'math_IllegalCommandInMathModeWithHint' => 'La commande « $1 » est interdite en mode math (peut-être vouliez-vous utiliser « $2 » à la place ?)',
	'math_IllegalCommandInTextMode' => 'La commande « $1 » est interdite en mode texte.',
	'math_IllegalCommandInTextModeWithHint' => 'La commande « $1 » est interdite en mode texte (peut-être vouliez-vous utiliser « $2 » à la place ?)',
	'math_IllegalDelimiter' => 'Délimiteur interdit après « $1 »',
	'math_IllegalFinalBackslash' => 'Le caractère « \\ » ne peut apparaître à la fin de la saisie.',
	'math_IllegalNestedFontEncodings' => "Les commandes d'encodage de caractères ne peuvent être imbriquées.",
	'math_IllegalRedefinition' => 'La commande « $1 » est déjà définie, vous ne pouvez la redéfinir.',
	'math_InvalidColour' => "La couleur « $1 » n'est pas valide.",
	'math_InvalidUtf8Input' => "La chaîne de caractères saisie n'est pas au format UTF-8.",
	'math_LatexFontNotSpecified' => "Aucune police de caractères LaTeX n'a été précisée pour « $1 ».",
	'math_LatexPackageUnavailable' => "Ne peut rendre le fichier PNG car le paquetage LaTeX « $1 » n'est pas accessible.",
	'math_MismatchedBeginAndEnd' => 'Les commandes « $1 » et « $2 » ne correspondent pas.',
	'math_MisplacedLimits' => "La commande « $1 » doit apparaître après un opérateur lorsqu'en mode math (suggestion : essayez « mathop »).",
	'math_MissingCommandAfterNewcommand' => 'Un nouveau nom de commande est manquant ou fautif après « \\newcommand » (il doit y avoir précisément une commande définie, elle doit commencer par « \\ » et ne contenir que des caractères alphabétiques).',
	'math_MissingDelimiter' => 'Un délimiteur manque après « $1 ».',
	'math_MissingOpenBraceAfter' => 'La balise « { » manque après « $1 »',
	'math_MissingOpenBraceAtEnd' => 'La balise « { » manque à la fin de la saisie.',
	'math_MissingOpenBraceBefore' => 'La balise « { » manque avant « $1 »',
	'math_MissingOrIllegalParameterCount' => 'Décompte de paramètre manquant ou fautif dans la définition de « $1 » (doit être un seul chiffre compris entre 1 et 9 inclusivement)',
	'math_MissingOrIllegalParameterIndex' => 'Index de paramètre manquant ou fautif dans la définition de « $1 »',
	'math_NonAsciiInMathMode' => 'Les caractères hors ASCII peuvent seulement être utilisés en mode texte (essayez de mettre les caractères problématiques dans « \\text{...} »).',
	'math_NotEnoughArguments' => "Pas assez d'arguments saisis pour « $1 »",
	'math_PngIncompatibleCharacter' => 'Ne peut générer le fichier PNG qui contient le caractère $1.',
	'math_ReservedCommand' => 'La commande « $1 » est réservée à blahtex.',
	'math_SubstackRowTooBig' => "Il ne peut y avoir qu'une seule entrée dans chaque rangée d'un bloc « sous-pilé ».",
	'math_TooManyMathmlNodes' => 'Il y a trop de nœuds dans l’arbre MathML.',
	'math_TooManyTokens' => 'La donnée saisie est trop longue.',
	'math_UnavailableSymbolFontCombination' => "Le symbole « $1 » n'est pas disponible pour la police de caractères « $2 ».",
	'math_UnexpectedNextCell' => 'La commande « & » peut seulement apparaître dans un bloc « \\begin ... \\end ».',
	'math_UnexpectedNextRow' => 'La commande « \\\\ » peut seulement apparaître dans un bloc « \\begin ... \\end ».',
	'math_UnmatchedBegin' => "La balise « \\begin » n'est pas balancée par la balise « \\end ».",
	'math_UnmatchedCloseBrace' => "La balise « } » n'est pas précédée par la balise « { ».",
	'math_UnmatchedEnd' => "La balise « \\end » n'est pas précédée par la balise « \\begin ».",
	'math_UnmatchedLeft' => "La balise « \\left » n'est pas balancée par la balise « \\right ».",
	'math_UnmatchedOpenBrace' => "La balise « { » n'est pas balancée par la balise « } ».",
	'math_UnmatchedOpenBracket' => "La balise « [ » n'est pas balancée par la balise « ] ».",
	'math_UnmatchedRight' => "La balise « \\right » n'est pas balancée par la balise « \\left ».",
	'math_UnrecognisedCommand' => 'Commande inconnue « $1 »',
	'math_WrongFontEncoding' => "Le symbole « $1 » peut ne pas apparaître dans l'encodage de caractères « $2 ».",
	'math_WrongFontEncodingWithHint' => "Le symbole « $1 » pourrait ne pas être affiché par l'encodage de caractères « $2 » (essayez la commande « $3{...} »).",
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'math_noblahtex' => 'Pôt pas ègzécutar blahtex, que devrêt étre a $1.',
	'math_AmbiguousInfix' => 'La posicion de « $1 » est pas cllâra (apondre des balises adicionèles « { ... } » pôt la rendre ples cllâra).',
	'math_CannotChangeDirectory' => 'Pôt pas changiér de dossiér de travâly.',
	'math_CannotCreateTexFile' => 'Pôt pas crèar un fichiér TeX.',
	'math_CannotRunDvipng' => 'Pôt pas ègzécutar dvipng.',
	'math_CannotRunLatex' => 'Pôt pas ègzécutar LaTeX.',
	'math_CannotWritePngDirectory' => 'Pôt pas ècrire dens lo dossiér des fichiérs PNG.',
	'math_CannotWriteTexFile' => 'Pôt pas ècrire dens un fichiér TeX.',
	'math_CasesRowTooBig' => 'Pôt y avêr ren que doves entrâs dens châque renchiê d’un bloco « câses ».',
	'math_DoubleSubscript' => 'Doux segnos sont rapondus a la méma bâsa, yon solèt est pèrmês.',
	'math_DoubleSuperscript' => 'Doux èxposents sont rapondus a la méma bâsa, yon solèt est pèrmês.',
	'math_IllegalCharacter' => 'Caractèro dèfendu dens la balyê buchiê',
	'math_IllegalCommandInMathMode' => 'La comanda « $1 » est dèfendua en môdo math.',
	'math_IllegalCommandInMathModeWithHint' => 'La comanda « $1 » est dèfendua en môdo math (pôt-étre voliâd-vos utilisar « $2 » a la place ?).',
	'math_IllegalCommandInTextMode' => 'La comanda « $1 » est dèfendua en môdo tèxte.',
	'math_IllegalCommandInTextModeWithHint' => 'La comanda « $1 » est dèfendua en môdo tèxte (pôt-étre voliâd-vos utilisar « $2 » a la place ?).',
	'math_IllegalDelimiter' => 'Dèlimitior dèfendu aprés « $1 »',
	'math_IllegalFinalBackslash' => 'Lo caractèro « \\ » pôt pas aparêtre a la fin de la buchiê.',
	'math_IllegalNestedFontEncodings' => 'Les comandes d’encodâjo de caractèros pôvont pas étre embrecâs.',
	'math_IllegalRedefinition' => 'La comanda « $1 » est ja dèfenia, vos pouede pas la tornar dèfenir.',
	'math_InvalidColour' => 'La color « $1 » est envalida.',
	'math_InvalidUtf8Input' => 'La chêna de caractèros buchiê est pas u format UTF-8.',
	'math_LatexFontNotSpecified' => 'Niona police de caractèros LaTeX at étâ spècefiâ por « $1 ».',
	'math_LatexPackageUnavailable' => 'Pôt pas rendre lo fichiér PNG perce que lo paquetâjo LaTeX « $1 » est pas accèssiblo.',
	'math_MismatchedBeginAndEnd' => 'Les comandes « $1 » et « $2 » corrèspondont pas.',
	'math_MisplacedLimits' => 'La comanda « $1 » dêt aparêtre aprés un opèrator quand en môdo math (suggèstion : èprovâd « mathop »).',
	'math_MissingCommandAfterNewcommand' => 'Un novél nom de comanda est manquent ou fôtif aprés « \\newcommand » (dêt y avêr cllârament una comanda dèfenia, dêt comenciér per « \\ » et contegnir ren que des caractèros alfabèticos).',
	'math_MissingDelimiter' => 'Un dèlimitior manque aprés « $1 ».',
	'math_MissingOpenBraceAfter' => 'La balisa « { » manque aprés « $1 ».',
	'math_MissingOpenBraceAtEnd' => 'La balisa « { » manque a la fin de la buchiê.',
	'math_MissingOpenBraceBefore' => 'La balisa « { » manque devant « $1 ».',
	'math_MissingOrIllegalParameterCount' => 'Dècompto de paramètres manquents ou fôtifs dens la dèfinicion de « $1 » (dêt étre un solèt chifro comprês entre-mié 1 et 9 encllusivament)',
	'math_MissingOrIllegalParameterIndex' => 'Endèxe de paramètres manquents ou fôtifs dens la dèfinicion de « $1 »',
	'math_NonAsciiInMathMode' => 'Los caractèros en defôr d’ASCII pôvont solament étre utilisâs en môdo tèxte (tâchiéd de betar los caractèros pas de sûr dens « \\text{...} »).',
	'math_NotEnoughArguments' => 'Pas prod d’arguments buchiês por « $1 »',
	'math_PngIncompatibleCharacter' => 'Pôt pas g·ènèrar lo fichiér PNG que contint lo caractèro $1.',
	'math_ReservedCommand' => 'La comanda « $1 » est resèrvâ a blahtex.',
	'math_SubstackRowTooBig' => 'Pôt y avêr ren que yona solèta entrâ dens châque renchiê d’un bloco « sot-pila ».',
	'math_TooManyMathmlNodes' => 'Y at trop de nuods dens l’âbro MathML.',
	'math_TooManyTokens' => 'La balyê buchiê est trop longe.',
	'math_UnavailableSymbolFontCombination' => 'Lo simbolo « $1 » est pas disponiblo por la police de caractèros « $2 ».',
	'math_UnexpectedNextCell' => 'La comanda « & » pôt solament aparêtre dens un bloco « \\begin ... \\end ».',
	'math_UnexpectedNextRow' => 'La comanda « \\\\ » pôt solament aparêtre dens un bloco « \\begin ... \\end ».',
	'math_UnmatchedBegin' => 'La balisa « \\begin » est pas balanciê per la balisa « \\end ».',
	'math_UnmatchedCloseBrace' => 'La balisa « } » est pas prècèdâ per la balisa « { ».',
	'math_UnmatchedEnd' => 'La balisa « \\end » est pas prècèdâ per la balisa « \\begin ».',
	'math_UnmatchedLeft' => 'La balisa « \\left » est pas balanciê per la balisa « \\right ».',
	'math_UnmatchedOpenBrace' => 'La balisa « { » est pas balanciê per la balisa « } ».',
	'math_UnmatchedOpenBracket' => 'La balisa « [ » est pas balanciê per la balisa « ] ».',
	'math_UnmatchedRight' => 'La balisa « \\right » est pas balanciê per la balisa « \\left ».',
	'math_UnrecognisedCommand' => 'Comanda encognua « $1 »',
	'math_WrongFontEncoding' => 'Lo simbolo « $1 » pôt pas aparêtre dens l’encodâjo de caractèros « $2 ».',
	'math_WrongFontEncodingWithHint' => 'Lo simbolo « $1 » porrêt pas étre afichiê per l’encodâjo de caractèros « $2 » (èprovâd la comanda « $3{...} »).',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 * @author Xosé
 */
$messages['gl'] = array(
	'math_noblahtex' => 'Non se pode executar blahtex, que debe estar en $1',
	'math-desc' => 'Saída MathML para as etiquetas &lt;math&gt;',
	'math_AmbiguousInfix' => 'Colocación ambigua de "$1" (tente usar chaves adicionais "{ ... }" para que fique claro)',
	'math_CannotChangeDirectory' => 'Non se pode mudar o directorio de traballo',
	'math_CannotCreateTexFile' => 'Non se pode crear unha fila de texto',
	'math_CannotRunDvipng' => 'Non se pode executar dvipng',
	'math_CannotRunLatex' => 'Non se pode executar latex',
	'math_CannotWritePngDirectory' => 'Non se pode escribir ao directorio de saída de PNG',
	'math_CannotWriteTexFile' => 'Non se puido escribir no ficheiro de tex',
	'math_CasesRowTooBig' => 'Só pode haber dúas entradas en cada fila do bloque "cases"',
	'math_DoubleSubscript' => 'Atopados dous subíndices adxuntos á mesma base (só a un se lle permite)',
	'math_DoubleSuperscript' => 'Atopados dous superíndices adxuntos á mesma base (só a un se lle permite)',
	'math_IllegalCharacter' => 'Carácter non válido na entrada',
	'math_IllegalCommandInMathMode' => 'O comando "$1" non é válido no modo math',
	'math_IllegalCommandInMathModeWithHint' => 'O comando "$1" non é válido no modo math (tal vez pretendía usar "$2" no seu sitio?)',
	'math_IllegalCommandInTextMode' => 'O comando "$1" non é válido no modo texto',
	'math_IllegalCommandInTextModeWithHint' => 'O comando "$1" non é válido no modo texto (tal vez pretendía usar "$2" no seu lugar?)',
	'math_IllegalDelimiter' => 'Delimitador non válido a continuación de "$1"',
	'math_IllegalFinalBackslash' => 'Barra para atrás "\\" non válida ao final da entrada',
	'math_IllegalNestedFontEncodings' => 'Os comandos de codificación da fonte non poden estar aniñados',
	'math_IllegalRedefinition' => 'Xa se definiu o comando "$1"; non o pode redefinir',
	'math_InvalidColour' => 'A cor "$1" non é válida.',
	'math_InvalidUtf8Input' => 'A cadea de entrada non era UTF-8 válido',
	'math_LatexFontNotSpecified' => 'Non se especificou fonte de LaTeX para "$1"',
	'math_LatexPackageUnavailable' => 'É imposíbel producir un PNG porque o paquete LaTeX "$1" non está dispoñíbel',
	'math_MismatchedBeginAndEnd' => 'Os comandos "$1" e "$2" non coinciden',
	'math_MisplacedLimits' => 'O comando "$1" só pode aparecer a continuación dun operador matemático (considere utilizar "\\mathop")',
	'math_MissingCommandAfterNewcommand' => 'Novo nome de comando desaparecido ou ilegal despois de "\\newcommand" (debe definirse un comando con precisión; este debe comezar cunha barra invertida "\\" e conter só caracteres alfabéticos)',
	'math_MissingDelimiter' => 'Falta un delimitador a continuación de "$1"',
	'math_MissingOpenBraceAfter' => 'Falta unha chave de apertura "{" a continuación de "$1"',
	'math_MissingOpenBraceAtEnd' => 'Falta unha chave de peche "{" no final da entrada',
	'math_MissingOpenBraceBefore' => 'Falta unha chave de apertura "{" antes de "$1"',
	'math_MissingOrIllegalParameterCount' => 'Falta ou non é válida a contaxe de parámetros na definición de "$1".
Debe ser un díxito único entre 1 e 9, ambos os dous inclusive.',
	'math_MissingOrIllegalParameterIndex' => 'Falta ou non é válido un índice de parámetro na definición de "$1"',
	'math_NonAsciiInMathMode' => 'Os caracteres fóra do conxunto ASCII só se poden usar no modo texto (tente encerrar os caracteres problemáticos dentro de "\\text{...}")',
	'math_NotEnoughArguments' => 'Non se forneceron argumentos dabondo para "$1"',
	'math_PngIncompatibleCharacter' => 'Non se pode xerar correctamente un PNG que conteña o carácter $1',
	'math_ReservedCommand' => 'O comando "$1" está reservado para uso interno de blahtex',
	'math_SubstackRowTooBig' => 'Só pode haber unha entrada en cada liña dun bloque "substack"',
	'math_TooManyMathmlNodes' => 'Hai demasiados nodos na árbore de MathML',
	'math_TooManyTokens' => 'A entrada é demasiado longa',
	'math_UnavailableSymbolFontCombination' => 'O símbolo "$1" non está permitido na fonte "$2"',
	'math_UnexpectedNextCell' => 'O comando "&" só pode aparecer dentro dun bloque "\\begin ... \\end"',
	'math_UnexpectedNextRow' => 'O comando "\\\\" só pode aparecer dentro dun bloque "\\begin ... \\end"',
	'math_UnmatchedBegin' => 'Atopouse un "\\begin" sen o "\\end" correspondente',
	'math_UnmatchedCloseBrace' => 'Atopouse unha chave de pechar "}" sen a chave de abrir "{" correspondente',
	'math_UnmatchedEnd' => 'Atopouse un "\\end" sen o "\\begin" correspondente',
	'math_UnmatchedLeft' => 'Atopouse un "\\left" sen o "\\right" correspondente',
	'math_UnmatchedOpenBrace' => 'Atopouse unha chave de apertura "{" sen a chave de peche "}" correspondente',
	'math_UnmatchedOpenBracket' => 'Atopouse un corchete de apertura "[" sen sen o corchete de peche "]" correspondente',
	'math_UnmatchedRight' => 'Atopouse un "\\right" sen o "\\left" correspondente',
	'math_UnrecognisedCommand' => 'O comando "$1" non é recoñecido',
	'math_WrongFontEncoding' => 'O símbolo "$1" non pode aparecer na codificación de fonte "$2"',
	'math_WrongFontEncodingWithHint' => 'O símbolo "$1" non pode aparecer na codificación de fonte "$2" (tente usando o comando "$3{...}")',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'math_LatexFontNotSpecified' => 'Οὐδεμία γραμματοσειρά LaTeX κεκαθωρισμένη ἐστὶν διὰ τὴν "$1"',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'math_noblahtex' => 'blahtex het nit chenne uusgfiert wäre in $1',
	'math-desc' => 'MathML-Uusgab fir &lt;math&gt;-Tag',
	'math_AmbiguousInfix' => 'An däre Stell isch „$1“ mehdytig.
Versuech wyteri gschwungeni Chlammere „{ … }“ yyzfiege go d Yygab eidytig z mache.',
	'math_CannotChangeDirectory' => 'Arbetsverzeichnis het nit chenne gwägslet wäre',
	'math_CannotCreateTexFile' => 'tex-Datei het nit chenne aagleit wäre',
	'math_CannotRunDvipng' => 'dvipng het nit chenne uusgfiert wäre',
	'math_CannotRunLatex' => 'latex het nit chenne uusgfiert wäre',
	'math_CannotWritePngDirectory' => 'S PNG-Verzeichnis isch nit bschryybbar',
	'math_CannotWriteTexFile' => 'S isch nit megli gsi in d tex-Datei z schryybe',
	'math_CasesRowTooBig' => 'Pro Zyylete vun eme „cases“-Block cha s nume zwee Yyträg gee',
	'math_DoubleSubscript' => 'S sin zwee Indices an dr glyyche Basis vorchu.
Nume ei Index isch erlaubt.',
	'math_DoubleSuperscript' => 'S sin zwee Exponente an dr glyyche Basis vorchu.
Nume ein Exponent isch erlaubt.',
	'math_IllegalCharacter' => 'Nit giltig Zeiche in dr Yygab',
	'math_IllegalCommandInMathMode' => 'm mathematische Modus isch d Aawyysig „$1“ nit erlaubt',
	'math_IllegalCommandInMathModeWithHint' => 'Im mathematische Modus isch d Aawyysig „$1“ nit erlaubt.
Villicht witt „$2“ defir bruuche?',
	'math_IllegalCommandInTextMode' => 'Im Texmodus isch d Aawyysig „$1“ nit erlaubt',
	'math_IllegalCommandInTextModeWithHint' => 'Im Textmodus isch d Aawyysig „$1“ nit erlaubt.
Villicht witt „$2“ defir bruuche?',
	'math_IllegalDelimiter' => 'Nit giltig Trännzeiche hinter „$1“',
	'math_IllegalFinalBackslash' => 'Nit giltige Backslash „\\“ am Änd vu dr Yygab',
	'math_IllegalNestedFontEncodings' => 'Zeichekodierisgaawyysige hän nit chenne gschachtlet wäre',
	'math_IllegalRedefinition' => 'D Aawyysig „$1“ isch scho definiert wore. Du chasch si nit iberschryybe',
	'math_InvalidColour' => 'D Farb „$1“ isch nit giltig',
	'math_InvalidUtf8Input' => 'D Yygab isch kei giltigi UTF-8-Zeichechette',
	'math_LatexFontNotSpecified' => 'S isch kei LaTeX-Schriftart fir „$1” aagee wore',
	'math_LatexPackageUnavailable' => 'D PNG het nit chenne aagleit wäre, wel s LaTeX-Paket „$1“ nit verfiegbar isch',
	'math_MismatchedBeginAndEnd' => 'D Aaweisig „$1“ passt nit zue „$2“',
	'math_MisplacedLimits' => 'D Aawyysig „$1“ cha nume hinter eme mathematische Operator vorchu.
Iberleg Dir s „\\mathop“ z neh.',
	'math_MissingCommandAfterNewcommand' => 'Befählsname no „\\newcommand“ fählt oder isch nit giltig.
S muess genau ei Befähl definiert wäre;
är muess mit eme umgchehrte Schregstrich (Backslash) „\\“ aafange un s derf nume alfabetischi Zeichen din haa.',
	'math_MissingDelimiter' => 'Trännzeiche hinter „$1“ fählt',
	'math_MissingOpenBraceAfter' => 'Ufigi Chlammere „{“ hinter „$1“ fählt',
	'math_MissingOpenBraceAtEnd' => 'Ufigi Chlammere „{“ am Änd vu dr Yygab fählt',
	'math_MissingOpenBraceBefore' => 'Ufigi Chlammere „{“ vor „$1“ fählt',
	'math_MissingOrIllegalParameterCount' => 'Parameterzahl in dr Definition vu „$1“ fählt oder isch nit giltig.
S muess e einzelni Ziffer zwische 1 un 9 syy.',
	'math_MissingOrIllegalParameterIndex' => 'Parameterindex in dr Definition vu „$1“ fählt oder isch nit giltig',
	'math_NonAsciiInMathMode' => 'Sonderzeiche (Nit-ASCII-Zeiche) derfe nume im Textmodus bruucht wäre
Versuech di problematische Zeiche in „\\text{…}“ yyzschliesse.',
	'math_NotEnoughArguments' => 'S sin nit gnue Parameter fir „$1“ ibergee wore',
	'math_PngIncompatibleCharacter' => 'PNG mit em Zeiche $1 chenne nit korräkt aagleit wäre',
	'math_ReservedCommand' => 'D Aawyysig „$1“ isch fir di intärn Verwändig in blahtex reserviert',
	'math_SubstackRowTooBig' => 'Pro Zyylete vun eme „substack“-Block derf s nume ei Yytrag gee',
	'math_TooManyMathmlNodes' => 'Im MathML-Verarbeitigsbaum het s zvyyl Chnote',
	'math_TooManyTokens' => 'D Yygab isch z lang',
	'math_UnavailableSymbolFontCombination' => 'S Symbol „$1“ git s in dr Schriftart „$2“ nit',
	'math_UnexpectedNextCell' => 'D Aawyysig „&amp;“ cha nume in eme „\\begin … \\block“-Block stoh',
	'math_UnexpectedNextRow' => 'D Aawyysig „\\\\“ cha nume in eme „\\begin … \\block“-Block stoh',
	'math_UnmatchedBegin' => '„\\begin“ ohni zuegherig „\\end“',
	'math_UnmatchedCloseBrace' => 'Zuenigi Chlammere „}” ohni zuegherigi ufigi Chlammere „{”',
	'math_UnmatchedEnd' => '„\\end” ohni zuegherig „\\begin”',
	'math_UnmatchedLeft' => '„\\left” ohni zuegherig „\\right”',
	'math_UnmatchedOpenBrace' => 'Ufigi Chlammere „{” ohni zuegherigi zuenigi Chlammere „}”',
	'math_UnmatchedOpenBracket' => 'Ufigi Chlammere „[” ohni zuegherigi zuenigi Chlammere „]”',
	'math_UnmatchedRight' => '„\\right” ohni zuegherig „\\left”',
	'math_UnrecognisedCommand' => 'Nit bekannti Aawyysig „$1“',
	'math_WrongFontEncoding' => 'S Symbol „$1“ derf in dr Zeichekodierig „$2“ nit vorchu',
	'math_WrongFontEncodingWithHint' => 'S Symbol „$1“ derf in dr Zeichekodierig „$2“ nit vorchu
Versuech d Aawyysig „$3{…}“.',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'math_noblahtex' => 'לא ניתן להפעיל את blahtex, האמור להיות ב־$1',
	'math-desc' => 'פלט MathML עבור תגיות &lt;math&gt;',
	'math_AmbiguousInfix' => 'הצבה דו־משמעית של "$1".
נסו להשתמש בסוגריים נוספים "{ ... }" להתרת כפל המשמעות.',
	'math_CannotChangeDirectory' => 'לא ניתן לשנות את תיקיית העבודה',
	'math_CannotCreateTexFile' => 'לא ניתן ליצור קובץ tex',
	'math_CannotRunDvipng' => 'לא ניתן להפעיל את dvipng',
	'math_CannotRunLatex' => 'לא ניתן להפעיל את latex',
	'math_CannotWritePngDirectory' => 'לא ניתן לכתוב אל תיקיית פלט ה־PNG',
	'math_CannotWriteTexFile' => 'לא ניתן לכתוב אל קובץ ה־tex',
	'math_CasesRowTooBig' => 'יכולות להיות שתי רשומות בלבד בכל שורה של מקטע "cases"',
	'math_DoubleSubscript' => 'מופיעות שתי מחרוזות בכתב תחתי עם אותו הבסיס.
מותרת מחרוזת אחת בלבד.',
	'math_DoubleSuperscript' => 'מופיעות שתי מחרוזות בכתב עילי עם אותו הבסיס.
מותרת מחרוזת אחת בלבד.',
	'math_IllegalCharacter' => 'תו לא חוקי בקלט',
	'math_IllegalCommandInMathMode' => 'הפקודה "$1" אינה חוקית במצב מתמטיקה',
	'math_IllegalCommandInMathModeWithHint' => 'הפקודה "$1" אינה חוקית במצב מתמטיקה.
האם התכוונתם להשתמש ב־"$2" במקום זאת?',
	'math_IllegalCommandInTextMode' => 'הפקודה "$1" אינה חוקית במצב טקסט',
	'math_IllegalCommandInTextModeWithHint' => 'הפקודה "$1" אינה חוקית במצב טקסט.
האם התכוונתם להשתמש ב־"$2" במקום זאת?',
	'math_IllegalDelimiter' => 'תו מפריד בלתי חוקי לאחר "$1"',
	'math_IllegalFinalBackslash' => 'לוכסן הפוך לא חוקי "\\" בסוף הקלט',
	'math_IllegalNestedFontEncodings' => 'לא ניתן לקנן פקודות קידוד גופנים',
	'math_IllegalRedefinition' => 'הפקודה "$1" כבר הוגדרה; לא ניתן להגדיר אותה מחדש',
	'math_InvalidColour' => 'הצבע "$1" שגוי',
	'math_InvalidUtf8Input' => 'מחרוזת הקלט אינה מחרוזת UTF-8 תקנית',
	'math_LatexFontNotSpecified' => 'לא צוין גופן LaTeX עבור "$1"',
	'math_LatexPackageUnavailable' => 'לא ניתן לעבד את ה־PNG כיוון שחבילת LaTeX "$1" אינה זמינה',
	'math_MismatchedBeginAndEnd' => 'הפקודות "$1" ו־"$2" אינן תואמות',
	'math_MisplacedLimits' => 'הפקודה "$1" יכולה להופיע רק לאחר פעולה מתמטית.
שקלו להשתמש ב־"\\mathop".',
	'math_MissingCommandAfterNewcommand' => 'שם פקודה חדש חסר או בלתי תקין לאחר "\\newcommand".
יש להגדיר פקודה אחת בדיוק;
על הפקודה להתחיל בלוכסן הפוך "\\" ולהכיל תווים אלפביתיים בלבד.',
	'math_MissingDelimiter' => 'חסר תו מפריד לאחר "$1"',
	'math_MissingOpenBraceAfter' => 'חסר סוגר פתיחה "}" לאחר "$1"',
	'math_MissingOpenBraceAtEnd' => 'חסר סוגר פתיחה "}" בסוף הקלט',
	'math_MissingOpenBraceBefore' => 'חסר סוגר פתיחה "}" לפני "$1"',
	'math_MissingOrIllegalParameterCount' => 'מספר המשתנים חסר או בלתי תקין בהגדרת "$1".
המספר חייב להיות ספרה בודדת בין 1 ל־9 כולל.',
	'math_MissingOrIllegalParameterIndex' => 'אינדקס פרמטר חסר או בלתי תקין בהגדרת "$1"',
	'math_NonAsciiInMathMode' => 'ניתן להשתמש בתווים שאינם מתקן ASCII במצב טקסט בלבד.
נסו לבודד את התו הבעייתי באמצעות "\\text{...}".',
	'math_NotEnoughArguments' => 'לא סופקו די ארגומנטים עבור "$1"',
	'math_PngIncompatibleCharacter' => 'לא ניתן לייצר PNG כראוי שיכיל את התו $1',
	'math_ReservedCommand' => 'הפקודה "$1" שמורה לשימוש פנימי של blahtex',
	'math_SubstackRowTooBig' => 'יכולה להיות רשומה אחת בלבד בכל שורה של מקטע "substack"',
	'math_TooManyMathmlNodes' => 'ישנם יותר מדי צמתים בעץ ה־MathML',
	'math_TooManyTokens' => 'הקלט ארוך מדי',
	'math_UnavailableSymbolFontCombination' => 'הסימן "$1" אינו זמין בגופן "$2"',
	'math_UnexpectedNextCell' => 'הפקודה "&" יכולה להופיע אך ורק בתוך מקטע "\\begin ... \\end"',
	'math_UnexpectedNextRow' => 'הפקודה "\\\\" יכולה להופיע אך ורק בתוך מקטע "\\begin ... \\end"',
	'math_UnmatchedBegin' => 'מופיע "\\begin" ללא "\\end" תואם',
	'math_UnmatchedCloseBrace' => 'מופיע סוגר סגירה "}" ללא סוגר פתיחה "}"',
	'math_UnmatchedEnd' => 'מופיע "\\end" ללא "\\begin" תואם',
	'math_UnmatchedLeft' => 'מופיע "\\left" ללא "\\right" תואם',
	'math_UnmatchedOpenBrace' => 'מופיע סוגר פתיחה "{" ללא סוגר סגירה "}" תואם',
	'math_UnmatchedOpenBracket' => 'מופיע סוגר פתיחה "[" ללא סוגר סגירה "]" תואם',
	'math_UnmatchedRight' => 'מופיע "\\right" ללא "\\left" תואם',
	'math_UnrecognisedCommand' => 'פקודה לא מזוהה "$1"',
	'math_WrongFontEncoding' => 'לא ניתן להציג את הסימן "$1" בקידוד הגופן "$2"',
	'math_WrongFontEncodingWithHint' => 'הסימן "$1" עלול לא להופיע בקידוד הגופן "$2".
נסו להשתמש בפקודה "$3{...}".',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 */
$messages['hi'] = array(
	'math_noblahtex' => '$1 की जगह पाये जाने वाले blahtex को शुरू नहीं कर सकतें हैं',
	'math-desc' => '&lt;math&gt; चिन्होंका MathML आउटपुट',
	'math_AmbiguousInfix' => '"$1" की गलत जगह।
ज्यादा "{ ... }" का इस्तेमाल करके ठीक करने की कोशीश करें।',
	'math_CannotChangeDirectory' => 'जिस डाइरेक्टरीमें काम चल रहा हैं उसे बदल नहीं सकतें',
	'math_CannotCreateTexFile' => 'tex फ़ाईल बना नहीं पा रहे हैं',
	'math_CannotRunDvipng' => 'dvipng चला नहीं पा रहें हैं',
	'math_CannotRunLatex' => 'latex चला नहीं पा रहे हैं',
	'math_CannotWritePngDirectory' => 'आउटपुट PNG डाइरेक्टरीमें लिख नहीं पा रहें हैं',
	'math_CannotWriteTexFile' => 'tex फ़ाईलमें लिख नहीं पा रहें हैं',
	'math_CasesRowTooBig' => '"cases" ब्लॉकमें एक लाईन पर सिर्फ दो ही एन्ट्री हो सकती हैं',
	'math_DoubleSubscript' => 'एकही बेस से जुडे हुए दो सबस्क्रीप्ट मिले हैं।
सिर्फ एक का इस्तेमाल किया जा सकता हैं।',
	'math_DoubleSuperscript' => 'एकही बेस से जुडे हुए दो सुपरस्क्रीप्ट मिले हैं।
सिर्फ एक का ही इस्तेमाल कर सकते हैं।',
	'math_IllegalCharacter' => 'इनपुटमें अवैध अक्षर हैं',
	'math_IllegalCommandInMathMode' => 'मॅथ मोडमें "$1" यह क्रिया अवैध हैं',
	'math_IllegalCommandInMathModeWithHint' => 'मॅथ मोड में "$1" यह क्रिया अवैध हैं।
क्या आप "$2" का इस्तेमाल करना चाहेंगे?',
	'math_IllegalCommandInTextMode' => 'टेक्स्ट मोडमें "$1" यह क्रिया अवैध हैं',
	'math_IllegalCommandInTextModeWithHint' => '"$1" यह क्रिया टेक्स्ट मोड में अवैध हैं।
क्या आप "$2" का इस्तेमाल करना चाहेंगे?',
	'math_IllegalDelimiter' => '"$1" के आगे अवैध डिलीमीटर दिया हैं',
	'math_IllegalFinalBackslash' => 'इनपुटके आखिरीमें अवैध बॅक स्लॅश "\\" दिया हैं',
	'math_IllegalNestedFontEncodings' => 'फॉन्ट एन्कोड करनेवाली क्रियायें एक दूसरेमें मिला नहीं सकते',
	'math_IllegalRedefinition' => '"$1" यह क्रिया पहले से डिफाईन की गई हैं; आप उसे फिरसे बदल नहीं सकते',
	'math_InvalidColour' => '"$1" यह रंग अवैध हैं',
	'math_InvalidUtf8Input' => 'इनपुट वैध UTF-8 में नहीं हैं',
	'math_LatexFontNotSpecified' => '"$1" के लिये कोईभी LaTeX फॉन्ट दिया नहीं हैं',
	'math_LatexPackageUnavailable' => '"$1" यह लॅटेक्स पॅकेज उपलब्ध ना होने के कारण PNG नहीं बना पा रहें हैं',
	'math_MismatchedBeginAndEnd' => '"$1" और "$2" क्रियारें मेल नहीं खाती',
	'math_MisplacedLimits' => '"$1" यह क्रिया सिर्फ गणिती सूत्रोंमें ही आ सकती हैं।
कृपया "\\mathop" का इस्तेमाल करें।',
	'math_MissingCommandAfterNewcommand' => '"\\newcommand" के बाद दी हुई नयी क्रिया अवैध अथवा अनुपलब्ध हैं।
एक क्रिया देना आवश्यक हैं;
जो "\\" से शुरू होती हैं और जिसमें सिर्फ अक्षर हैं।',
	'math_MissingDelimiter' => '"$1" के बाद डिलिमीटर दिया नहीं हैं',
	'math_MissingOpenBraceAfter' => '"$1" के बाद खुलनेवाला ब्रैकेट "{" दिया नहीं हैं',
	'math_MissingOpenBraceAtEnd' => 'इनपुट के आखिरी में खुलनेवाला ब्रैकेट "{" दिया नहीं हैं',
	'math_MissingOpenBraceBefore' => '"$1" के पहले खुलनेवाला ब्रैकेट "{" दिया नहीं हैं',
	'math_MissingOrIllegalParameterCount' => '"$1" में अवैध अथवा अनुपलब्ध पॅरॅमीटर काऊंट दिया हुआ हैं।
१ से ९ के बीच की एक संख्या देन आवश्यक हैं।',
	'math_MissingOrIllegalParameterIndex' => '"$1" में अवैध अथवा अनुपलब्ध पॅरॅमीटरका अनुक्रम दिया हुआ हैं',
	'math_NonAsciiInMathMode' => 'नॉन-ASCII अक्षर सिर्फ टेक्स्ट मोडमें दिये जा सकते हैं
इन्हें "\\text{...}" के बीच लिखने का प्रयास करें।',
	'math_NotEnoughArguments' => '"$1" के लिये जरूरी सारी अर्ग्युमेंट्स नहीं दी हैं',
	'math_PngIncompatibleCharacter' => '$1 यह चिन्ह (अक्षर) होनेवाला पीएनजी ठीक से तैयार नहीं कर पा रहें हैं',
	'math_ReservedCommand' => 'blahtex के इस्तेमाल के लिये "$1" यह क्रिया रिज़र्व हैं',
	'math_SubstackRowTooBig' => '"substack" ब्लॉकके हर लाईनमें सिर्फ एक ही एन्ट्री होनी चाहिये',
	'math_TooManyMathmlNodes' => 'MathML ट्रीमें बहुत ज्यादा नोड हैं',
	'math_TooManyTokens' => 'इनपुट बहुत लंबा हैं',
	'math_UnavailableSymbolFontCombination' => '"$2" इस फॉन्टमें "$1" यह अक्षर नहीं हैं',
	'math_UnexpectedNextCell' => '"&" यह क्रिया सिर्फ "\\begin ... \\end" इस ब्लॉकमें ही हो सकती हैं',
	'math_UnexpectedNextRow' => '"\\\\" यह क्रिया सिर्फ "\\begin ... \\end" इस ब्लॉकमें ही हो सकती हैं',
	'math_UnmatchedBegin' => '"\\begin" से जुडनेवाला "\\end" मिला नहीं',
	'math_UnmatchedCloseBrace' => 'क्लोजिंग ब्रैकेट "}" से जुडनेवाला ओपनिंग ब्रैकेट "{" मिला नहीं',
	'math_UnmatchedEnd' => '"\\end" को जुडनेवाला "\\begin" मिला नहीं',
	'math_UnmatchedLeft' => '"\\left" को जुडनेवाला "\\right" मिला नहीं',
	'math_UnmatchedOpenBrace' => 'ओपनिंग ब्रैकेट "{" से जुडनेवाला क्लोजिंग ब्रैकेट "}" मिला नहीं',
	'math_UnmatchedOpenBracket' => 'ओपनिंग ब्रैकेट "[" से जुडनेवाला क्लोजिंग ब्रैकेट "]" मिला नहीं',
	'math_UnmatchedRight' => '"\\right" को जुडनेवाला "\\left" मिला नहीं',
	'math_UnrecognisedCommand' => 'अज्ञात क्रिया "$1"',
	'math_WrongFontEncoding' => '"$2" के फॉन्ट एन्कोडिंग में शायद "$1" चिन्ह मिलेगा नहीं',
	'math_WrongFontEncodingWithHint' => '"$2" के फॉन्ट एन्कोडिंगमें शायद "$1" मिलेगा नहीं।
"$3{...}" यह क्रिया इस्तेमाल करके देखें।',
);

/** Croatian (Hrvatski)
 * @author Dnik
 * @author SpeedyGonsales
 */
$messages['hr'] = array(
	'math_noblahtex' => 'Ne mogu izvršiti blahtex, koji bi trebao biti na $1',
	'math-desc' => "MathML izlaz za &lt;math&gt; ''tagove''",
	'math_AmbiguousInfix' => 'Dvosmisleno smješten "$1" (probajte koristiti dodatne zagrade "{ ... }" da pojasnite)',
	'math_CannotChangeDirectory' => 'Ne mogu promijeniti direktorij (folder)',
	'math_CannotCreateTexFile' => 'Ne mogu kreirati tex-datoteku',
	'math_CannotRunDvipng' => 'Ne mogu pokrenuti dvipng',
	'math_CannotRunLatex' => 'Ne mogu pokrenuti latex',
	'math_CannotWritePngDirectory' => 'Ne mogu pisati u PNG direktorij (folder)',
	'math_CannotWriteTexFile' => 'Ne mogu pisati u tex-datoteku',
	'math_CasesRowTooBig' => 'U svakom redu "cases" bloka mogu biti samo dvije stavke',
	'math_DoubleSubscript' => 'Nađena dva supskripta spojena na istu bazu (samo jedan je dozvoljen)',
	'math_DoubleSuperscript' => 'Nađena dva superskripta spojena na istu bazu (samo jedan je dozvoljen)',
	'math_IllegalCharacter' => 'Nedozvoljeni znak u ulazu',
	'math_IllegalCommandInMathMode' => 'Naredba "$1" nije dozvoljena u matematičkom načinu',
	'math_IllegalCommandInMathModeWithHint' => 'Naredba "$1" je nedozvoljena u matematičkom načinu (možda ste namjeravali koristiti "$2"?)',
	'math_IllegalCommandInTextMode' => 'Naredba "$1" nije dozvoljena u tekstualnom načinu',
	'math_IllegalCommandInTextModeWithHint' => 'Naredba "$1" je nedozvoljena u tekstualnom načinu (možda ste namjeravali koristiti "$2"?)',
	'math_IllegalDelimiter' => 'Nedozvoljeni graničnik (delimiter) poslije "$1"',
	'math_IllegalFinalBackslash' => 'Nedozvoljena obrnuta kosa crta "\\" na kraju ulaza',
	'math_IllegalNestedFontEncodings' => 'Naredbe za kodiranje fontova ne mogu biti ugnježđene',
	'math_IllegalRedefinition' => 'Naredba "$1" je već definirana, ne možete je redefinirati',
	'math_InvalidColour' => 'Boja "$1" je loše zadana',
	'math_InvalidUtf8Input' => 'Ulaz nije ispravan UTF-8 niz',
	'math_LatexFontNotSpecified' => 'Nije specificiran LaTeX-font za "$1"',
	'math_LatexPackageUnavailable' => 'Ne mogu stvoriti PNG jer LaTeX-paket "$1" nije dostupan',
	'math_MismatchedBeginAndEnd' => 'Naredbe "$1" i "$2" ne odgovaraju',
	'math_MisplacedLimits' => 'Naredba "$1" se može pojaviti samo nakon matematičkog operatora (razmislite o korištenju "\\mathop")',
	'math_MissingCommandAfterNewcommand' => 'Nedostaje ili nedozvoljena nova naredba nakon "\\newcommand" (mora biti definirana točno jedna naredba; mora počinjati obrnutom kosom crtom "\\" i sadržavati samo slova)',
	'math_MissingDelimiter' => 'Nedostaje graničnik (delimiter) nakon "$1"',
	'math_MissingOpenBraceAfter' => 'Nedostaje otvorena vitičasta zagrada "{" poslije "$1"',
	'math_MissingOpenBraceAtEnd' => 'Nedostaje otvorena vitičasta zagrada "{" na kraju ulaza',
	'math_MissingOpenBraceBefore' => 'Nedostaje otvorena vitičasta zagrada "{" prije "$1"',
	'math_MissingOrIllegalParameterCount' => 'Nedostaje ili ne valja broj parametara u definiciji "$1" (mora biti jedna znamenka od 1-9, uključujući i njih)',
	'math_MissingOrIllegalParameterIndex' => 'Nedostaje ili ne valja indeks parametara u definiciji "$1"',
	'math_NonAsciiInMathMode' => 'Ne-ASCII znakovi se mogu koristiti samo u tekstualnom načinu (probajte staviti problematične znakove unutar "\\text{...}")',
	'math_NotEnoughArguments' => 'Nema dovoljno argumenata za "$1"',
	'math_PngIncompatibleCharacter' => 'Ne mogu ispravno generirati PNG koji sadrži znak $1',
	'math_ReservedCommand' => 'Naredba "$1" je rezervirana za unutrašnju upotrebu u blahtexu',
	'math_SubstackRowTooBig' => 'U svakom redu "substack" bloka može biti samo jedna stavka',
	'math_TooManyMathmlNodes' => 'Previše čvorova u MathML-stablu',
	'math_TooManyTokens' => 'Predugačak ulaz',
	'math_UnavailableSymbolFontCombination' => 'Simbol "$1" nije podržan u fontu "$2"',
	'math_UnexpectedNextCell' => 'Naredba "&" se može pojaviti samo unutar "\\begin ... \\end" bloka',
	'math_UnexpectedNextRow' => 'Naredba "\\\\" se može pojaviti samo unutar "\\begin ... \\end" bloka',
	'math_UnmatchedBegin' => 'Nađen \\begin bez pripadnog \\end',
	'math_UnmatchedCloseBrace' => 'Nađena zatvorena vitičasta zagrada "}" bez pripadne otvorene zagrade "{"',
	'math_UnmatchedEnd' => 'Nađen \\end bez pripadnog \\begin',
	'math_UnmatchedLeft' => 'Nađen \\left bez pripadnog \\right',
	'math_UnmatchedOpenBrace' => 'Nađena otvorena vitičasta zagrada "{" bez pripadne zatvorene zagrade "}"',
	'math_UnmatchedOpenBracket' => 'Nađena otvorena uglata zagrada "[" bez pripadne zatvorene zagrade "]"',
	'math_UnmatchedRight' => 'Nađen \\right bez pripadnog \\left',
	'math_UnrecognisedCommand' => 'Neprepoznata naredba "$1"',
	'math_WrongFontEncoding' => 'Znak "$1" se ne može pojaviti u kodiranju fonta "$2"',
	'math_WrongFontEncodingWithHint' => 'Znak "$1" se ne može pojaviti u kodiranju fonta "$2" (probajte koristiti naredbu "$3{...}")',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'math_noblahtex' => 'Njeje móžno blahtex wuwjesć, kotryž měł pola $1 być',
	'math-desc' => 'Wudaće MathML za taflički &lt;math&gt;',
	'math_AmbiguousInfix' => 'Wjacezmyslne zaměstnjenje "$1" (spytaj přidatne zhibowane spinki wužiwać "{ ... }", zo by jednozmyslnosć wutworił)',
	'math_CannotChangeDirectory' => 'Dźěłowy zapis njeda so změnić',
	'math_CannotCreateTexFile' => 'Njeje móžno tex-dataju wutworić',
	'math_CannotRunDvipng' => 'dvipng njeda so startować',
	'math_CannotRunLatex' => 'latex njeda so startować',
	'math_CannotWritePngDirectory' => 'Wudaće njeda so do zapisa PNG pisać',
	'math_CannotWriteTexFile' => 'Njeje móžno do tex-dataje pisać',
	'math_CasesRowTooBig' => 'Smětej jenož dwaj zapiskaj w kóždej rjadce bloka "cases" być',
	'math_DoubleSubscript' => 'Namakaštej so dwaj indeksaj pola samsneje bazy (jenož jedyn je dowoleny)',
	'math_DoubleSuperscript' => 'Namakaštej so dwaj eksponentaj pola samsneje bazy (jenož jedyn je dowoleny)',
	'math_IllegalCharacter' => 'Njedowolene znamješko w zapodaću',
	'math_IllegalCommandInMathMode' => 'Přikaz "$1" njeje w modusu math dowoleny.',
	'math_IllegalCommandInMathModeWithHint' => 'Přikaz "$1" njeje w modusu math dowoleny (chcyše ty snano město toho "$2" wužiwać?)',
	'math_IllegalCommandInTextMode' => 'Přikaz "$1" njeje w tekstowym modusu dowoleny',
	'math_IllegalCommandInTextModeWithHint' => 'Přikaz "$1" njeje w tekstowym modusu dowoleny (chcyše ty snano město toho "$2" wužiwać?)',
	'math_IllegalDelimiter' => 'Njedowolene dźělatko zady "$1"',
	'math_IllegalFinalBackslash' => 'Njedowolena wróćosmužka "\\" na kóncu zapodaća',
	'math_IllegalNestedFontEncodings' => 'Pismokodowanske přikazy njehodźa so zakašćikować',
	'math_IllegalRedefinition' => 'Přikaz "$1" je so hižo definował; njemóžeš jón znowa definować',
	'math_InvalidColour' => 'Barba "$1" je njepłaćiwa',
	'math_InvalidUtf8Input' => 'Zapodaty znamješkowy rjećazk njeje w płaćiwym UTF-8',
	'math_LatexFontNotSpecified' => 'Žane pismo LaTeX njebu za "$1" podane',
	'math_LatexPackageUnavailable' => 'Njemóžno PNG předźěłać, dokelž pakćik "$1" za LaTeX k dispoziciji njesteji',
	'math_MismatchedBeginAndEnd' => 'Přikazaj "$1" a "$2" njekryjetej so',
	'math_MisplacedLimits' => 'Přikaz "$1" móže so jenož za operatorom math jewić (rozpomń wužiwanje přikaza "\\mathop")',
	'math_MissingCommandAfterNewcommand' => 'Falowace abo njedowolene přikazowe mjeno za přikazom "\\newcommand" (dyrbi eksaktnje jedyn přikaz definowany być; dyrbi so z wróćosmužku "\\" započeć a smě jenož alfabetiske znamješka wobsahować)',
	'math_MissingDelimiter' => 'Dźělatko zady "$1" faluje',
	'math_MissingOpenBraceAfter' => 'Spočatna zhibowana spinka "&#x007B;" za "$1" faluje',
	'math_MissingOpenBraceAtEnd' => 'Spočatna zhibowana spinka "&#x007B;" na kóncu zapodaća faluje',
	'math_MissingOpenBraceBefore' => 'Spočatna zhibowana spinka "&#x007B;" před "$1" faluje',
	'math_MissingOrIllegalParameterCount' => 'Falowace abo njedowolene parametrowe ličenje w definiciji "$1"  (dyrbi cyfra mjez 1 a inkluziwnje 9 być)',
	'math_MissingOrIllegalParameterIndex' => 'Falowacy abo njedowoleny parametrowy indeks w definiciji "$1"',
	'math_NonAsciiInMathMode' => 'Znamješka nje-ASCII smědźa so jenož w tekstowym modusu wužiwać (spytaj problematiske znamješka w "\\text{...}" zapřijeć)',
	'math_NotEnoughArguments' => 'Nic dosć argumentow za "$1" dodate',
	'math_PngIncompatibleCharacter' => 'Njemóžno PNG ze znamješkom $1 korektnje płodźić',
	'math_ReservedCommand' => 'Přikaz "$1" je za interne wužiwanje přez blahtex rezerwowany',
	'math_SubstackRowTooBig' => 'Smě jenož jedyn zapisk w kóždej rjadce bloka "substack" być',
	'math_TooManyMathmlNodes' => 'Je přewjele sukow w štomje MathML',
	'math_TooManyTokens' => 'Zapodaće je předołho.',
	'math_UnavailableSymbolFontCombination' => 'Symbol "$1" w pismje "$2" k dispoziciji njesteji',
	'math_UnexpectedNextCell' => 'Přikaz "&" smě so jenož znutřka bloka "\\begin ... \\end" jewić',
	'math_UnexpectedNextRow' => 'Přikaz "\\\\" smě so jenož znutřka bloka "\\begin ... \\end" jewić',
	'math_UnmatchedBegin' => '"\\begin" bjez přisłušneho "\\end" namakany',
	'math_UnmatchedCloseBrace' => 'Kónčna zhibowana spinka "}" bjez přisłušneje spočatneje zhibowaneje spinki "{" namakana',
	'math_UnmatchedEnd' => '"\\end" bjez přisłušneho "\\begin" namakany',
	'math_UnmatchedLeft' => '"\\left" bjez přisłušneho "\\right" namakany',
	'math_UnmatchedOpenBrace' => 'Spočatna zhibowana spinka "{" bjez přisłušneje kónčneje spinki "}" namakana',
	'math_UnmatchedOpenBracket' => 'Spočatna róžkata spinka "[" bjez přisłušneje kónčneje róžkateje spinki "]" namakana',
	'math_UnmatchedRight' => '"\\right" bjez přisłušneho "\\left" namakany',
	'math_UnrecognisedCommand' => 'Njespóznaty přikaz "$1"',
	'math_WrongFontEncoding' => 'Symbol "$1" njesmě so w pismowym kodowanju "$2" jewić',
	'math_WrongFontEncodingWithHint' => 'Symbol "$1" njesmě so w pismowym kodowanju "$2" jewić (spytaj přikaz "$3{...}" wužiwać)',
);

/** Hungarian (Magyar)
 * @author Dani
 */
$messages['hu'] = array(
	'math_noblahtex' => 'A blahtex nem futtatható, itt kellene lennie: $1',
	'math-desc' => 'MathML kimenet a &lt;math&gt; tagekhez',
	'math_AmbiguousInfix' => '„$1” kétértelműen van elhelyezve (próbálj meg egyértelműsíteni újabb „{ ... }” zárójelek használatával)',
	'math_CannotChangeDirectory' => 'Nem sikerült megváltoztatni a munkakönyvtárat',
	'math_CannotCreateTexFile' => 'Nem sikerült elkészíteni a tex fájlt',
	'math_CannotRunDvipng' => 'Nem sikerült futtatni a dvipng-t',
	'math_CannotRunLatex' => 'Nem sikerült futtatni a latexet',
	'math_CannotWritePngDirectory' => 'Nem sikerült írni a PNG kimeneti könyvtárba',
	'math_CannotWriteTexFile' => 'Nem sikerült írni a tex fájlba',
	'math_CasesRowTooBig' => 'Csak két bejegyzés szerepelhet a „cases” blokk minden sorában',
	'math_DoubleSubscript' => 'Két alsó index van csatolva ugyanahhoz az alaphoz (csak egy engedélyezett)',
	'math_DoubleSuperscript' => 'Két felső index van csatolva ugyanahhoz az alaphoz (csak egy engedélyezett)',
	'math_IllegalCharacter' => 'Hibás karakter található a bemenetben',
	'math_IllegalCommandInMathMode' => 'A(z) „$1” parancs nem érvényes math módban',
	'math_IllegalCommandInMathModeWithHint' => 'A(z) „$1” parancs nem érvényes math módban (nem „$2”-t akartál használni helyette?)',
	'math_IllegalCommandInTextMode' => 'A(z) „$1” parancs nem érvényes szöveg módban',
	'math_IllegalCommandInTextModeWithHint' => 'A(z) „$1” parancs nem érvényes szöveg módban (nem „$2”-t akartál használni helyette?)',
	'math_IllegalDelimiter' => 'Érvénytelen határolójel „$1” után',
	'math_IllegalFinalBackslash' => 'Érvénytelen visszaper-jel „\\” a bemenet végén',
	'math_IllegalNestedFontEncodings' => 'A betűtípuskódolási parancsokat nem lehet halmozni',
	'math_IllegalRedefinition' => 'A(z) „$1” parancs már definiálva van; nem definiálhatod újra',
	'math_InvalidColour' => 'A szín „$1” érvénytelen',
	'math_InvalidUtf8Input' => 'A bemenet során megadott szöveg nem megfelelően kódolt UTF-8 sztring',
	'math_LatexFontNotSpecified' => 'Nincs megadva LaTeX betűtípus „$1” számára',
	'math_LatexPackageUnavailable' => 'A PNG-t nem lehet elkészíteni, mert a „$1” LaTeX csomag nem elérhető',
	'math_MismatchedBeginAndEnd' => '„$1” és „$2” parancsok nem illeszkednek',
	'math_MisplacedLimits' => 'A(z) „$1” parancs csak a math operátor után állhat (használd a „\\mathop”-ot)',
	'math_MissingCommandAfterNewcommand' => 'Hibás vagy érvénytelen új parancs név a „\\newcommand” után (pontosan egy parancsot kell megadni; visszaperjellel „\\” kell kezdődnie, és csak alfanumerikus karaktereket tartalmazhat)',
	'math_MissingDelimiter' => 'Hiányzó határolókarakter „$1” után',
	'math_MissingOpenBraceAfter' => 'Hiányzó nyitó „{” zárójel  „$1” után',
	'math_MissingOpenBraceAtEnd' => 'Hiányzó nyitó „{” zárójel a bemenet végén',
	'math_MissingOpenBraceBefore' => 'Hiányzó nyitó „{” zárójel „$1” előtt',
	'math_MissingOrIllegalParameterCount' => 'Hiányzó vagy érvénytelen paraméterindex a(z) „$1” definíciójában (egyjegyű számnak kell lennie 1 és 9 között)',
	'math_MissingOrIllegalParameterIndex' => 'Hiányzó vagy érvénytelen paraméterindex a(z) „$1” definíciójában',
	'math_NonAsciiInMathMode' => 'Nem-ASCII karakterek csak szövegmódban használhatóak (zárd a problémás karaktert „\\text{...}” közé)',
	'math_NotEnoughArguments' => 'Nem lett elég argumentum megadva „$1” számára',
	'math_PngIncompatibleCharacter' => 'A(z) $1 karaktert tartalmazó PNG-t nem lehet helyesen elkészíteni',
	'math_ReservedCommand' => 'A(z) „$1” parancs fenn van tartva a blahtex számára',
	'math_SubstackRowTooBig' => 'Csak egyetlen bejegyzés lehet minden sorban a „substack” blokkon belül',
	'math_TooManyMathmlNodes' => 'Túl sok csomópont van a MathML fában',
	'math_TooManyTokens' => 'A bemenet túl hosszú',
	'math_UnavailableSymbolFontCombination' => 'A „$1” szimbólum csak a „$2” betűtípusban található meg',
	'math_UnexpectedNextCell' => 'Az „&” parancs csak egy „\\begin ... \\end” blokkon belül állhat',
	'math_UnexpectedNextRow' => 'A „\\\\” parancs csak egy „\\begin ... \\end” blokkon belül állhat',
	'math_UnmatchedBegin' => 'A „\\begin”-hez nincs illeszkedő „\\end” pár',
	'math_UnmatchedCloseBrace' => 'A záró „}” zárójelhez nincs illeszkedő nyitó „{” zárójel',
	'math_UnmatchedEnd' => 'Az „\\end”-hez nincs illeszkedő „\\begin” pár',
	'math_UnmatchedLeft' => 'A „\\left”-hez nincs illeszkedő „\\right” pár',
	'math_UnmatchedOpenBrace' => 'A nyitó „{” zárójelhez nincs illeszkedő záró „}” zárójel',
	'math_UnmatchedOpenBracket' => 'A nyitó „[” zárójelhez nincs illeszkedő záró „]” zárójel',
	'math_UnmatchedRight' => 'A „\\right”-hoz nincs illeszkedő „\\left” pár',
	'math_UnrecognisedCommand' => 'Ismeretlen parancs: „$1”',
	'math_WrongFontEncoding' => 'A „$1” szimbólum nem jelenhet meg a „$2” betűtípus-kódolásban',
	'math_WrongFontEncodingWithHint' => 'A „$1” szimbólum nem jelenhet meg a „$2” betűtípus-kódolásban (próbáld meg használni a „$3{...}” parancsot)',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'math_noblahtex' => 'Impossibile executar blahtex, que deberea trovar se in $1',
	'math-desc' => 'Output de MathML pro le etiquettas &lt;math&gt;',
	'math_AmbiguousInfix' => 'Position ambigue de "$1".
Proba usar accolladas additional "{ ... }" pro disambiguar.',
	'math_CannotChangeDirectory' => 'Non pote cambiar de directorio de labor',
	'math_CannotCreateTexFile' => 'Non pote crear le file tex',
	'math_CannotRunDvipng' => 'Non pote executar dvipng',
	'math_CannotRunLatex' => 'Non pote executar latex',
	'math_CannotWritePngDirectory' => 'Non pote scriber in le directorio de destination pro le files PNG',
	'math_CannotWriteTexFile' => 'Non pote scriber in le file tex',
	'math_CasesRowTooBig' => 'Il pote solmente haber duo entratas in cata rango de un bloco "cases"',
	'math_DoubleSubscript' => 'Incontrava duo subscriptos attachate al mesme base.
Solmente un es permittite.',
	'math_DoubleSuperscript' => 'Incontrava duo superscriptos attachate al mesme base.
Solmente un es permittite.',
	'math_IllegalCharacter' => 'Character prohibite in input',
	'math_IllegalCommandInMathMode' => 'Le commando "$1" es prohibite in modo de mathematica',
	'math_IllegalCommandInMathModeWithHint' => 'Le commando "$1" es prohibite in modo de mathematica.
Forsan tu voleva usar "$2" in so loco?',
	'math_IllegalCommandInTextMode' => 'Le commando "$1" es prohibite in modo de texto',
	'math_IllegalCommandInTextModeWithHint' => 'Le commando "$1" es prohibite in modo de texto.
Forsan tu voleva usar "$2" in so loco?',
	'math_IllegalDelimiter' => 'Delimitator invalide post "$1"',
	'math_IllegalFinalBackslash' => 'Barra inverse "\\" invalide al fin del input',
	'math_IllegalNestedFontEncodings' => 'Le commandos de codification de typos de litteras non pote esser incapsulate le un in le altere',
	'math_IllegalRedefinition' => 'Le commando "$1" ha ja essite definite; tu non pote redefinir lo',
	'math_InvalidColour' => 'Le color "$1" es invalide',
	'math_InvalidUtf8Input' => 'Le serie de characteres de input non esseva in formato UTF-8 valide',
	'math_LatexFontNotSpecified' => 'Nulle typo de litteras LaTeX ha essite specificate pro "$1"',
	'math_LatexPackageUnavailable' => 'Impossibile facer le file PNG proque le pacchetto LaTeX "$1" non es disponibile',
	'math_MismatchedBeginAndEnd' => 'Le commandos "$1" e "$2" non corresponde',
	'math_MisplacedLimits' => 'Le commando "$1" pote solmente apparer post un operator mathematic.
Considera usar "\\mathop".',
	'math_MissingCommandAfterNewcommand' => 'Nove nomine de commando mancante o prohibite post "\\newcommand".
Il debe haber precisemente un commando definite;
illo debe comenciar con un barra inverse "\\" e continer solmente characteres alphabetic.',
	'math_MissingDelimiter' => 'Delimitator manca post "$1"',
	'math_MissingOpenBraceAfter' => 'Accollada aperte "{" manca post "$1"',
	'math_MissingOpenBraceAtEnd' => 'Accollada aperte "{" manca al fin del input',
	'math_MissingOpenBraceBefore' => 'Accollada aperte "{" manca ante "$1"',
	'math_MissingOrIllegalParameterCount' => 'Numero de parametros mancante o invalide in definition de "$1".
Debe esser un singule digito inter 1 e 9 inclusive.',
	'math_MissingOrIllegalParameterIndex' => 'Indice de parametros mancante o invalide in definition de "$1"',
	'math_NonAsciiInMathMode' => 'Le characteres non-ASCII pote solmente esser usate in modo de texto.
Proba mitter le characteres problematic in un bloco "\\text{...}".',
	'math_NotEnoughArguments' => 'Numero de parametros insufficiente pro "$1"',
	'math_PngIncompatibleCharacter' => 'Impossibile generar correctemente un imagine PNG continente le character $1',
	'math_ReservedCommand' => 'Le commando "$1" es reservate pro uso interne per blahtex',
	'math_SubstackRowTooBig' => 'Il pote solmente haber un entrata in cata rango de un bloco "substack"',
	'math_TooManyMathmlNodes' => 'Il ha troppo de nodos in le arbore MathML',
	'math_TooManyTokens' => 'Le input es troppo longe',
	'math_UnavailableSymbolFontCombination' => 'Le symbolo "$1" non es disponibile in le typo de litteras "$2"',
	'math_UnexpectedNextCell' => 'Le commando "&" pote solmente apparer intra un bloco "\\begin ... \\end"',
	'math_UnexpectedNextRow' => 'Le commando "\\\\" pote solmente apparer intra un bloco "\\begin ... \\end"',
	'math_UnmatchedBegin' => 'Incontrava "\\begin" sin "\\end" correspondente',
	'math_UnmatchedCloseBrace' => 'Incontrava accollada clause "}" sin accollada aperte "{" correspondente',
	'math_UnmatchedEnd' => 'Incontrava "\\end" sin "\\begin" correspondente',
	'math_UnmatchedLeft' => 'Incontrava "\\left" sin "\\right" correspondente',
	'math_UnmatchedOpenBrace' => 'Incontrava accollada aperte "{" sin accollada clause "}" correspondente',
	'math_UnmatchedOpenBracket' => 'Incontrava parenthese recte aperte "[" sin parenthese recte clause "]" correspondente',
	'math_UnmatchedRight' => 'Incontrava "\\right" sin "\\left" correspondente',
	'math_UnrecognisedCommand' => 'Commando "$1" non recognoscite',
	'math_WrongFontEncoding' => 'Le symbolo "$1" non pote apparer in le codification de characteres "$2"',
	'math_WrongFontEncodingWithHint' => 'Le symbolo "$1" non pote apparer in le codification de characteres "$2".
Proba usar le commando "$3{...}".',
);

/** Italian (Italiano)
 * @author BrokenArrow
 * @author Pietrodn
 */
$messages['it'] = array(
	'math_noblahtex' => 'Impossibile eseguire blahtex, che dovrebbe trovarsi in $1',
	'math-desc' => 'Output MathML per i tag &lt;math&gt;',
	'math_AmbiguousInfix' => 'La posizione di "$1" è ambigua; aggiungere delle parentesi graffe "{ ... }" per risolvere l\'ambiguità',
	'math_CannotChangeDirectory' => 'Impossibile modificare la directory di lavoro',
	'math_CannotCreateTexFile' => 'Impossibile creare il file tex',
	'math_CannotRunDvipng' => 'Impossibile eseguire dvipng',
	'math_CannotRunLatex' => 'Impossibile eseguire latex',
	'math_CannotWritePngDirectory' => 'Impossibile scrivere nella directory di destinazione per i file PNG',
	'math_CannotWriteTexFile' => 'Impossibile scrivere sul file tex',
	'math_CasesRowTooBig' => 'In ciascuna riga di un blocco "case" sono consentiti al massimo due elementi',
	'math_DoubleSubscript' => 'È consentito legare al massimo un pedice alla stessa base',
	'math_DoubleSuperscript' => 'È consentito legare al massimo un apice alla stessa base',
	'math_IllegalCharacter' => "L'input contiene un carattere non consentito",
	'math_IllegalCommandInMathMode' => 'Il comando "$1" non è valido in modalità math',
	'math_IllegalCommandInMathModeWithHint' => 'Il comando "$1" non è valido in modalità math (il comando corretto potrebbe essere "$2")',
	'math_IllegalCommandInTextMode' => 'Il comando "$1" non è valido in modalità text',
	'math_IllegalCommandInTextModeWithHint' => 'Il comando "$1" non è valido in modalità text (il comando corretto potrebbe essere "$2")',
	'math_IllegalDelimiter' => 'Delimitatore non valido dopo "$1"',
	'math_IllegalFinalBackslash' => 'Barra inversa "\\" non valida alla fine dell\'input',
	'math_IllegalNestedFontEncodings' => 'Non è consentito annidare più comandi per la codifica dei font',
	'math_IllegalRedefinition' => 'Comando "$1" già definito, impossibile ridefinirlo',
	'math_InvalidColour' => 'Colore "$1" non valido',
	'math_InvalidUtf8Input' => 'La stringa di input non è in formato UTF-8 valido',
	'math_LatexFontNotSpecified' => 'Nessun font LaTeX indicato per "$1"',
	'math_LatexPackageUnavailable' => 'Impossibile eseguire il rendering del file PNG in quanto non è presente il pacchetto LaTeX "$1"',
	'math_MismatchedBeginAndEnd' => 'I comandi "$1" e "$2" non corrispondono',
	'math_MisplacedLimits' => 'Il comando "$1" deve seguire un operatore matematico (se necessario, usare "\\mathop")',
	'math_MissingCommandAfterNewcommand' => 'Nuovo nome di comando mancante o non valido dopo "\\newcommand" (la definizione dev\'essere una ed una sola, deve iniziare con una barra inversa "\\" e contenere solo caratteri alfabetici)',
	'math_MissingDelimiter' => 'Delimitatore mancante dopo "$1"',
	'math_MissingOpenBraceAfter' => 'Parentesi graffa aperta "{" mancante dopo "$1"',
	'math_MissingOpenBraceAtEnd' => 'Parentesi graffa aperta "{" mancante alla fine dell\'input',
	'math_MissingOpenBraceBefore' => 'Parentesi graffa aperta "{" mancante prima di "$1"',
	'math_MissingOrIllegalParameterCount' => 'Parametro mancante o numero di parametri non valido nella definizione di "$1" (è ammessa una sola cifra compresa tra 1 e 9)',
	'math_MissingOrIllegalParameterIndex' => 'Indice parametro mancante o non valido nella definizione di "$1"',
	'math_NonAsciiInMathMode' => 'I caratteri non ASCII sono utilizzabili soltanto in modalità text (se necessario, includere i caratteri in un blocco "\\text{...}")',
	'math_NotEnoughArguments' => 'Numero di argomenti insufficiente per "$1"',
	'math_PngIncompatibleCharacter' => "Impossibile generare correttamente un'immagine PNG contenente il carattere $1",
	'math_ReservedCommand' => 'Il comando "$1" è riservato per uso interno di blahtex',
	'math_SubstackRowTooBig' => 'In ciascuna riga di un blocco "substack" è consentito al massimo un elemento',
	'math_TooManyMathmlNodes' => "Numero di nodi eccessivo nell'albero MathML",
	'math_TooManyTokens' => 'Input di dimensioni eccessive',
	'math_UnavailableSymbolFontCombination' => 'Simbolo "$1" non disponibile nel font "$2"',
	'math_UnexpectedNextCell' => 'Il comando "&" è valido unicamente all\'interno di un blocco "\\begin ... \\end"',
	'math_UnexpectedNextRow' => 'Il comando "\\\\" è valido unicamente all\'interno di un blocco "\\begin ... \\end"',
	'math_UnmatchedBegin' => 'Rilevato "\\begin" senza "\\end" corrispondente',
	'math_UnmatchedCloseBrace' => 'Rilevata una parentesi graffa chiusa "}" senza la corrispondente parentesi graffa aperta "{"',
	'math_UnmatchedEnd' => 'Rilevato "\\end" senza "\\begin" corrispondente',
	'math_UnmatchedLeft' => 'Rilevato "\\left" senza "\\right" corrispondente',
	'math_UnmatchedOpenBrace' => 'Rilevata una parentesi graffa aperta "{" senza la corrispondente parentesi graffa chiusa "}"',
	'math_UnmatchedOpenBracket' => 'Rilevata una parentesi quadra aperta "[" senza la corrispondente parentesi quadra chiusa "]"',
	'math_UnmatchedRight' => 'Rilevato "\\right" senza "\\left" corrispondente',
	'math_UnrecognisedCommand' => 'Comando "$1" non riconosciuto',
	'math_WrongFontEncoding' => 'Il simbolo "$1" non è consentito nella codifica di font "$2"',
	'math_WrongFontEncodingWithHint' => 'Il simbolo "$1" non è consentito nella codifica di font "$2" (se necessario, usare il comando "$3{...}")',
);

/** Japanese (日本語)
 * @author JtFuruhata
 */
$messages['ja'] = array(
	'math_noblahtex' => '$1にあるべきblahtexを実行できません',
	'math-desc' => '&lt;math&gt;タグを用いたMathML出力',
	'math_AmbiguousInfix' => '"$1"が曖昧な場所にあります（修正するには、"{ ... }"のくくりを追加するなどしてください）',
	'math_CannotChangeDirectory' => '作業用ディレクトリに移動できません',
	'math_CannotCreateTexFile' => 'texファイルを作成できません',
	'math_CannotRunDvipng' => 'dvipngを実行できません',
	'math_CannotRunLatex' => 'latexを実行できません',
	'math_CannotWritePngDirectory' => 'PNG出力ディレクトリに書き込みできません',
	'math_CannotWriteTexFile' => 'texファイルを書き込みできません',
	'math_CasesRowTooBig' => '"cases" ブロックの各行には2項目のみ記述可能です',
	'math_DoubleSubscript' => '同一ベースライン上に2つの下付き文字があります（1つのみ有効です）',
	'math_DoubleSuperscript' => '同一ベースライン上に2つの上付き文字があります（1つのみ有効です）',
	'math_IllegalCharacter' => '入力文字列中に不正な文字を検出しました',
	'math_IllegalCommandInMathMode' => 'コマンド "$1" は数式モードでは使えません',
	'math_IllegalCommandInMathModeWithHint' => 'コマンド "$1" は数式モードでは使えません（"$2" を使うつもりではありませんでしたか？）',
	'math_IllegalCommandInTextMode' => 'コマンド "$1" はテキストモードでは使えません',
	'math_IllegalCommandInTextModeWithHint' => 'コマンド "$1" はテキストモードでは使えません（"$2" を使うつもりではありませんでしたか？）',
	'math_IllegalDelimiter' => '"$1" 以降の区切り文字が不正です',
	'math_IllegalFinalBackslash' => '入力文字列の終わりに不正な "\\"（バックスラッシュまたは円記号）を検知しました',
	'math_IllegalNestedFontEncodings' => '文字エンコードコマンドはネストできません',
	'math_IllegalRedefinition' => 'コマンド "$1" は定義済みであり、再定義できません',
	'math_InvalidColour' => '"$1" は有効な色指定ではありません',
	'math_InvalidUtf8Input' => '入力文字列は有効なUTF-8形式ではありません',
	'math_LatexFontNotSpecified' => '"$1" というフォントはLaTeXに登録されていません',
	'math_LatexPackageUnavailable' => 'LaTeXパッケージ "$1" が利用できないため、PNGを出力できません',
	'math_MismatchedBeginAndEnd' => 'コマンド "$1" と "$2"　は有効な組み合わせではありません',
	'math_MisplacedLimits' => 'コマンド "$1" は数式演算子の後でのみ使用可能です（"\\mathop" の使用をご検討ください）',
	'math_MissingCommandAfterNewcommand' => '"\\newcommand" に続く新しいコマンドが存在しないか不正です（"\\" から始まりアルファベットのみで記述される、1コマンドの正確な定義でなくてはいけません）',
	'math_MissingDelimiter' => '"$1" に続く区切り文字がありません',
	'math_MissingOpenBraceAfter' => '"$1" の後に、始め波括弧 "{" がありません',
	'math_MissingOpenBraceAtEnd' => '入力文字列の終わりに、始め波括弧 "{" がありません',
	'math_MissingOpenBraceBefore' => '"$1" の前に、始め波括弧 "{" がありません',
	'math_MissingOrIllegalParameterCount' => '"$1" の定義に引数の数が指定されていないか不正です（1から9までの一桁の数字を指定します）',
	'math_MissingOrIllegalParameterIndex' => '"$1" の定義に引数の添え字がないか不正です',
	'math_NonAsciiInMathMode' => 'ASCII以外の文字はテキストモードのみ利用可能です（問題のある文字は "\\text{...}" 中で使用してください）',
	'math_NotEnoughArguments' => '"$1" に渡される引数が足りません',
	'math_PngIncompatibleCharacter' => '文字 $1 を含んだPNGは正しく出力できません',
	'math_ReservedCommand' => 'コマンド "$1" はblahtexの予約語です。',
	'math_SubstackRowTooBig' => '"substack" ブロックの各行には1項目のみ記述可能です',
	'math_TooManyMathmlNodes' => 'MathMLツリーにあるノードが多すぎます',
	'math_TooManyTokens' => '入力文字列が長すぎます',
	'math_UnavailableSymbolFontCombination' => 'シンボル "$1" は、フォント "$2" で利用できません',
	'math_UnexpectedNextCell' => 'コマンド "&" は "\\begin ... \\end" ブロック内でのみ利用可能です',
	'math_UnexpectedNextRow' => 'コマンド "\\\\" は "\\begin ... \\end" ブロック内でのみ利用可能です',
	'math_UnmatchedBegin' => '対となる "\\end" のない "\\begin" があります',
	'math_UnmatchedCloseBrace' => '対となる "}" のない "{" があります',
	'math_UnmatchedEnd' => '対となる "\\begin" のない "\\end" があります',
	'math_UnmatchedLeft' => '対となる "\\right" のない "\\left" があります',
	'math_UnmatchedOpenBrace' => '対となる "}" のない "{" があります',
	'math_UnmatchedOpenBracket' => '対となる "]" のない "[" があります',
	'math_UnmatchedRight' => '対となる "\\left" のない "\\right" があります',
	'math_UnrecognisedCommand' => 'コマンド "$1" は有効なコマンドではありません',
	'math_WrongFontEncoding' => 'シンボル "$1" は、文字エンコード "$2" で利用できません',
	'math_WrongFontEncodingWithHint' => 'シンボル "$1" は、文字エンコード "$2" で利用できません（"$3{...}" をお試しください）',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 */
$messages['jv'] = array(
	'math_CannotChangeDirectory' => 'Ora bisa ngowahi dirèktori kerja',
	'math_CannotCreateTexFile' => 'Ora bisa nggawé berkas tex',
	'math_CannotRunDvipng' => 'Ora bisa nglakokaké dvipng',
	'math_CannotRunLatex' => 'Ora bisa nglakokaké latex',
	'math_CannotWritePngDirectory' => 'Ora bisa nulis menyang dirèktori wetonan PNG',
	'math_CannotWriteTexFile' => 'Ora bisa nulis in berkas tex',
	'math_CasesRowTooBig' => 'Namung olèh ana rong élemèn ing saben rèk saka blok "cases"',
	'math_IllegalCharacter' => 'Ana karakter ilegal sing dilebokaké',
	'math_IllegalCommandInMathMode' => 'Paréntah "$1" iku ilegal ing modus math',
	'math_IllegalCommandInTextMode' => 'Paréntah "$1" iku ilegal ing modus tèks',
	'math_InvalidColour' => 'Warna "$1" iku ora absah',
	'math_LatexFontNotSpecified' => 'Ora ana font LaTeX sing dispésifikasi kanggo "$1"',
	'math_LatexPackageUnavailable' => 'Ora bisa nggawé PNG amerga pakèt LaTeX "$1" ora ana',
	'math_MissingOpenBraceAfter' => 'Ora ana akolade "{" sawisé "$1"',
	'math_MissingOpenBraceAtEnd' => 'Ora ana akolade "{" ing pungkasané input',
	'math_MissingOpenBraceBefore' => 'Ora ana akolade "{" sadurungé "$1"',
	'math_NonAsciiInMathMode' => 'Karakter non-ASCII namung olèh dienggo ing modus tèks
Coba dokoken karakter sing problematis iki antara "\\text{...}".',
	'math_NotEnoughArguments' => 'Ora cukup argumèn sing diwènèhaké kanggo "$1"',
	'math_PngIncompatibleCharacter' => 'Ora bisa nggawé PNG sacara bener sing ngandhut karakter $1',
	'math_TooManyMathmlNodes' => 'Ana kakèhan node ing uwit MathML',
	'math_TooManyTokens' => 'Input-é kedawan',
	'math_UnrecognisedCommand' => 'Paréntah "$1" ora ditepungi',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author Thearith
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'math_noblahtex' => 'មិនអាចប្រើប្រាស់ blahtex, ដែលគួរតែ នៅ $1',
	'math-desc' => 'ឱ្យចេញជា អក្សរកូដ MathML កាលបើ ជួប ប្លាក &lt;math&gt;',
	'math_CannotChangeDirectory' => 'មិនអាចផ្លាស់ប្តូរ​ថតឯកសារកំពុងធ្វើការ',
	'math_CannotCreateTexFile' => 'មិនអាច​បង្កើត​ឯកសារ​អក្សរសុទ្ធ',
	'math_CannotRunDvipng' => 'មិនអាចដំណើរការ dvipng',
	'math_CannotRunLatex' => 'មិនអាចដំណើរការ latex',
	'math_CannotWritePngDirectory' => 'មិនអាច​សរសេរ​ទៅ​ថតឯកសារ PNG',
	'math_CannotWriteTexFile' => 'មិនអាចសរសេរ​ទៅ​ឯកសារ​អក្សរសុទ្ធ',
	'math_IllegalCharacter' => 'តួអក្សរ​ដែល​ត្រូវ​ហាម​ក្នុង​ការ​បញ្ចូល',
	'math_IllegalCommandInMathMode' => 'បញ្ជា "$1" ត្រូវហាម ក្នុងរបបគណិត',
	'math_IllegalCommandInMathModeWithHint' => 'បញ្ជា "$1" ត្រូវហាម ក្នុងរបបគណិត (អ្នកចង់ប្រើប្រាស់ "$2" ជំនួស ?)',
	'math_IllegalCommandInTextMode' => 'បញ្ជា "$1" ត្រូវហាម ក្នុងរបបអត្ថបទ',
	'math_IllegalCommandInTextModeWithHint' => 'បញ្ជា "$1" ត្រូវហាម ក្នុងរបបអត្ថបទ

ប្រហែលជា អ្នក​មានបំណង​​ប្រើប្រាស់ "$2" ជំនួស​ហើយ​?',
	'math_InvalidColour' => 'ពណ៌ "$1" មិនត្រឹមត្រូវ',
	'math_LatexFontNotSpecified' => 'គ្មាន ក្រមអក្សរ LaTeX ត្រូវបានបញ្ជាក់ សម្រាប់ "$1"',
	'math_LatexPackageUnavailable' => 'មិនអាច ទៅជា PNG ព្រោះ គ្មានកញ្ចប់ LaTeX "$1"',
	'math_MismatchedBeginAndEnd' => 'បញ្ជា "$1" និង "$2" មិនសមគ្នា',
	'math_UnavailableSymbolFontCombination' => 'និមិត្តសញ្ញា "$1" មិនមាន ក្នុង ក្រមអក្សរ "$2"',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'math_noblahtex' => 'Kunnt en $1 <code>blahtex</code> nit ußföhre.',
	'math-desc' => 'MathML Ußjaaf för de <code>&lt;math&gt;</code> Befäähle.',
	'math_AmbiguousInfix' => 'Dat „<code>$1</code>“ kann hee aan dämm Plaz mieh wie eine Senn han.
Versök enß, met mieh jeschwunge Klammere „{…}“ dat Dinge kloh ze krijje.',
	'math_CannotChangeDirectory' => 'Kunnt et Verzeichnes för ze Ärbeide nit wahßelle.',
	'math_CannotCreateTexFile' => 'Kunnt de <code>tex</code>-Datei nit aanlääje.',
	'math_CannotRunDvipng' => 'Kunnt <code>dvipng</code> nit ußföhre.',
	'math_CannotRunLatex' => 'Kunnt <code>latex</code> nit ußföhre.',
	'math_CannotWritePngDirectory' => 'Kunnt nit en dat Verzeichnes schriive, för <code>PNG</code> dren ußzejävve.',
	'math_CannotWriteTexFile' => 'Kunnt nit en de <code>tex</code>-Datei schriive.',
	'math_CasesRowTooBig' => 'En ene Reih fun enem <code>case</code>-Block künne bloß zwei Endrääch stonn.',
	'math_DoubleSubscript' => 'Aan eine Basis kann bloß eine Index shtonn, hee woren_er zwei.',
	'math_DoubleSuperscript' => 'Aan eine Basis kann bloß ein huhjestellt Superskripp shtonn, hee woren_er zwei.',
	'math_IllegalCharacter' => 'En onjöltech Zeiche es en däm Textstöck.',
	'math_IllegalCommandInMathMode' => 'Dat Kommando „<code>$1</code>“ jeiht nit en mattemattesche Formelle.',
	'math_IllegalCommandInMathModeWithHint' => 'Dat Kommando „<code>$1</code>“ jeiht nit en mattemattesche Formelle.
Künnt et sin, dat De „<code>$2</code>“ häs nämme welle?',
	'math_IllegalCommandInTextMode' => 'Dat Kommando „<code>$1</code>“ jeiht nit en enem Täx.',
	'math_IllegalCommandInTextModeWithHint' => 'Dat Kommando „<code>$1</code>“ jeiht nit en enem Täx.
Künnt et sin, dat De „<code>$2</code>“ häs nämme welle?',
	'math_IllegalDelimiter' => 'Do es e onjöltesch Trennzeiche henger „<code>$1</code>“.',
	'math_IllegalFinalBackslash' => 'Do es ene onjöltejje „<code>\\</code>“ am Engk vun dä Formel.',
	'math_IllegalNestedFontEncodings' => 'Kommandos för Schreffte künne nit innennein jeschachtelt wääde.',
	'math_IllegalRedefinition' => 'Dat Kommando „<code>$1</code>“ es alld faßjelaat woode.
Do kanns et nit norr_ens faßlääje udder övverschriive.',
	'math_InvalidColour' => 'De Färv „<code>$1</code>“ es verkeeht.',
	'math_InvalidUtf8Input' => 'En däm Täxstöck es kei jöltesch UTF-8 dren.',
	'math_LatexFontNotSpecified' => 'För „<code>$1</code>“ es kei LaTeX-Schreffaat aanjejovve.',
	'math_LatexPackageUnavailable' => 'Kunnt die <code>PNG</code>-Datei nit opboue, weil dat LaTeX-Pakätt „$1“ nit do es.',
	'math_MismatchedBeginAndEnd' => 'De Kommandos „<code>$1</code>“ un „<code>$2</code>“ donn nit zosamme paße.',
	'math_MisplacedLimits' => 'Dat Kommando „<code>$1</code>“ darf bloß henger enem matemattesche Opperaator opdouche.
Övverlääch ens, „<code>\\mathop</code>“ ze bruche.',
	'math_MissingCommandAfterNewcommand' => 'Dat neu Kommando henger „<code>\\newcommand</code>“ es kapott, onjöltsch udder jaa nit doh.
Et moß jenou ei Kommando bestemmp wääde.
Et moß met enem Röckwäätsschrächstrech „<code>\\</code>“aanfange,
un moß uß luuter Bochstabe puur bestonn.',
	'math_MissingDelimiter' => 'Dä Trenner henger „<code>$1</code>“ es nit do.',
	'math_MissingOpenBraceAfter' => 'De „<code>{</code>“ henger „<code>$1</code>“ es nit do.',
	'math_MissingOpenBraceAtEnd' => 'De „<code>{</code>“ henger allem es nit do.',
	'math_MissingOpenBraceBefore' => 'De „<code>{</code>“ för „<code>$1</code>“ es nit do.',
	'math_MissingOrIllegalParameterCount' => 'Kein, odder en onjöltijje Aanzahl Parrrameetere bem Faßlääje vun „<code>$1</code>“.
Do mööt en einzel Zeffer „<code>1</code>“…„<code>9</code>“… sen.',
	'math_MissingOrIllegalParameterIndex' => 'Keine, udder ene verkeehte Parrameeter Index, es en de Definizjuhn fun „<code>$1</code>“.',
	'math_NonAsciiInMathMode' => 'Alles, wat kein ASCII Zeiche sin, kann bloß en enem Täx jebruch wäde.
Övverlääsch Der, de problemaatesche zeiche en „<code>\\text{…}</code>“ enzeschleeße.',
	'math_NotEnoughArguments' => 'Et sen nit jenooch Parrameetere för „<code>$1</code>“ do.',
	'math_PngIncompatibleCharacter' => 'En <code>PNG</code>-Datei mt däm Zeiche „<code>$1</code>“ dren kunnt nit ööndlech opjebout wäde.',
	'math_ReservedCommand' => 'Dat Kommando „<code>$1</code>“ es reserveet för entärrne Aufjabe vun <code>blahtex</code>.',
	'math_SubstackRowTooBig' => 'Et darf bloß eine Enndraach en jede Reih för ene „<code lang="en">>substack</code>“-Block jevve.',
	'math_TooManyMathmlNodes' => 'Dä Boum met dä Date vum MathML hät ze vill einzel Knote.',
	'math_TooManyTokens' => 'Dat Täxstöck es zo lang.',
	'math_UnavailableSymbolFontCombination' => 'Dat Sümbohl „$1“ deiht en dä Schreff „$2“ nit vörkumme.',
	'math_UnexpectedNextCell' => 'Dat Kommando „<code>&amp;</code>“ darf bloß zwesche „<code>\\begin</code>“ un „<code>\\end</code>“ stonn.',
	'math_UnexpectedNextRow' => 'Dat Kommando „<code>\\\\</code>“ darf bloß zwesche „<code>\\begin</code>“ un „<code>\\end</code>“ stonn.',
	'math_UnmatchedBegin' => '„<code>\\begin</code>“ ohne zopaß „<code>\\end</code>“ jevonge.',
	'math_UnmatchedCloseBrace' => '„<code>}</code>“ ohne zopaß „<code>{</code>“ jevonge.',
	'math_UnmatchedEnd' => '„<code>\\end</code>“ ohne zopaß „<code>\\begin</code>“ jevonge.',
	'math_UnmatchedLeft' => '„<code>\\left</code>“ ohne zopaß „<code>\\right</code>“ jevonge.',
	'math_UnmatchedOpenBrace' => '„<code>{</code>“ ohne zopaß „<code>}</code>“ jevonge.',
	'math_UnmatchedOpenBracket' => '„<code>[</code>“ ohne zopaß „<code>]</code>“ jevonge.',
	'math_UnmatchedRight' => '„<code>\\right</code>“ ohne zopaß „<code>\\left</code>“ jevonge.',
	'math_UnrecognisedCommand' => 'Dat Kommando „$1“ kenne mer nit.',
	'math_WrongFontEncoding' => 'Dat Sümbohl „$1“ darf nit en däm Zeichekood „$2“ vörkumme.',
	'math_WrongFontEncodingWithHint' => 'Dat Sümbohl „$1“ darf nit en däm Zeichekood „$2“ vörkumme.
Versöhk ens dat Kommando „<code>$3{…}</code>“.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'math-desc' => 'MathML Resultat fir &lt;math&gt; Taggen',
	'math_CannotChangeDirectory' => 'Den Aarbechtsrepertoire kann net geännert ginn',
	'math_IllegalFinalBackslash' => 'D\'Zeechen "\\" kann net um Enn vun enger Saisie stoen',
	'math_IllegalRedefinition' => 'D\'Uweisung "$1" ass schonn definéiert; Dir kënnt se net nach emol definéieren',
	'math_InvalidColour' => 'D\'Faarw "$1" gëtt et net',
	'math_MissingOpenBraceAtEnd' => 'Eng "{" feelt um Ënn vun der Saisie',
	'math_NotEnoughArguments' => 'Dir hutt net genuch Parameter ugi fir "$1"',
	'math_TooManyTokens' => 'Dat wat Dir aginn hutt ass ze laang',
	'math_UnavailableSymbolFontCombination' => 'D\'Symbol "$1" gëtt et an der Schrëft "$2" net.',
	'math_UnmatchedOpenBracket' => 'D\'Klammer "[" as net mat der Klammer "]" zougemaach',
	'math_UnrecognisedCommand' => 'Unbekannte Commande "$1"',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'math-desc' => '&lt;math&gt; എന്നീ ടാഗുകള്‍ക്കുള്ള MathML ഔട്ട്പുട്ട്',
	'math_CannotChangeDirectory' => 'നിലവില്‍ പ്രവര്‍ത്തിക്കുന്ന ഡയറക്ടറി മാറ്റുവാന്‍ പറ്റില്ല',
	'math_CannotCreateTexFile' => 'tex പ്രമാണം സൃഷ്ടിക്കുവാന്‍ കഴിഞ്ഞില്ല',
	'math_CannotRunLatex' => 'latex പ്രവര്‍ത്തിപ്പിക്കുവാന്‍ കഴിഞ്ഞില്ല',
	'math_CannotWriteTexFile' => 'tex പ്രമാണത്തിലേക്ക് എഴുതുവാന്‍ കഴിഞ്ഞില്ല',
	'math_DoubleSubscript' => 'ഒരേ ബേസില്‍ രണ്ട് സബ്‌സ്ക്രിപ്റ്റുകള്‍ ചേര്‍ത്തിരിക്കുന്നു.
ഒന്നു മാത്രമേ അനുവദനീയമായുള്ളൂ.',
	'math_DoubleSuperscript' => 'ഒരേ ബേസില്‍ രണ്ട് സൂപ്പര്‍സ്ക്രിപ്റ്റുകള്‍ ചേര്‍ത്തിരിക്കുന്നു.
ഒന്നു മാത്രമേ അനുവദനീയമായുള്ളൂ.',
	'math_IllegalCharacter' => 'ഇന്‍പുട്ടില്‍ അസാധുവായ അക്ഷരം',
	'math_IllegalCommandInMathMode' => 'മാത്ത് മോഡില്‍ "$1" എന്നത് അനുവദനീയമല്ലാത്ത ഒരു ആജ്ഞയാണ്‌',
	'math_IllegalCommandInMathModeWithHint' => 'മാത്ത് മോഡില്‍ "$1" എന്നത് അനുവദനീയമല്ലാത്ത ഒരു ആജ്ഞയാണ്‌. താങ്കള്‍ "$2" എന്ന് ഉപയോഗിക്കാനാണൊ ഉദ്ദേശിച്ചത്?',
	'math_IllegalCommandInTextMode' => 'ടെക്സ്റ്റ് മോഡില്‍ "$1" എന്നത് അനുവദനീയമല്ലാത്ത ഒരു ആജ്ഞയാണ്‌',
	'math_IllegalCommandInTextModeWithHint' => 'ടെക്സ്റ്റ് മോഡില്‍ "$1" എന്നത് അനുവദനീയമല്ലാത്ത ഒരു ആജ്ഞയാണ്‌. താങ്കള്‍ "$2" എന്ന് ഉപയോഗിക്കാനാണൊ ഉദ്ദേശിച്ചത്?',
	'math_IllegalFinalBackslash' => 'ഇന്‍‌പുട്ടിന്റെ അവസാനത്തില്‍ അനുവദനീയമല്ലാത്ത "\\" (ബാക്ക്സ്ലാഷ്)',
	'math_IllegalRedefinition' => '"$1" എന്ന ആജ്ഞ ഇതിനകം നിര്‍‌വചിച്ചു കഴിഞ്ഞു. താങ്കള്‍ക്ക് അതു പുനര്‍നിര്‍‌വചനം നടത്തുന്നതിനു സാദ്ധ്യമല്ല.',
	'math_InvalidColour' => '"$1" എന്ന നിറം അസാധുവാണ്‌',
	'math_InvalidUtf8Input' => 'ഇന്‍‌പുട്ട് സ്ട്രിങ്ങ് സാധുവായ UTF-8 അല്ല.',
	'math_LatexFontNotSpecified' => '"$1"നു LaTeX ഫോണ്ട് തിരഞ്ഞെടുത്തിട്ടില്ല.',
	'math_MismatchedBeginAndEnd' => '"$1"  "$2" എന്നീ രണ്ട് നിര്‍ദ്ദേശങ്ങള്‍ തമ്മില്‍ യോജിക്കുന്നില്ല',
	'math_MisplacedLimits' => '"$1"  എന്ന ആജ്ഞ ഒരു മാത്ത് ഓപ്പറേറ്ററിനു ശേഷം മാത്രമേ വരാവൂ. "\\mathop" എന്ന ഓപ്പറേറ്റര്‍ ഉപയോഗിക്കുന്നതു പരിഗണിക്കൂ.',
	'math_MissingOpenBraceAfter' => '"$1" നു ശേഷം "{" എന്ന ബ്രാക്കറ്റ് ചേര്‍ത്തിട്ടില്ല',
	'math_MissingOpenBraceAtEnd' => 'ഇന്‍‌പുട്ടിന്റെ അവസാനം "{" എന്ന ബ്രാക്കറ്റ് ചേര്‍ത്തിട്ടില്ല',
	'math_MissingOpenBraceBefore' => '"$1" നു മുന്‍പ് "{" എന്ന ബ്രാക്കറ്റ് ചേര്‍ത്തിട്ടില്ല',
	'math_TooManyTokens' => 'ഇന്‍പുട്ടിനു നീളം വളരെ കൂടുതലാണ്‌',
	'math_UnavailableSymbolFontCombination' => '"$1" എന്ന ചിഹ്നം "$2" എന്ന ഫോണ്ടില്‍ ലഭ്യമല്ല',
	'math_UnexpectedNextCell' => '"&" എന്ന നിര്‍ദ്ദേശം "\\begin ... \\end" എന്നീ ടാഗുകള്‍ക്ക് അകത്തേ അനുവദനീയമായുള്ളൂ',
	'math_UnexpectedNextRow' => '"\\\\" എന്ന നിര്‍ദ്ദേശം "\\begin ... \\end" എന്നീ ടാഗുകള്‍ക്ക് അകത്തേ അനുവദനീയമായുള്ളൂ',
	'math_UnmatchedBegin' => '"\\begin"  ടാഗ് "\\end" ടാഗില്ലാതെ കാണുന്നു',
	'math_UnmatchedCloseBrace' => 'ബ്രാക്കറ്റ് അടയ്ക്കുന്ന ചിഹ്നമായ "}"  ബ്രാക്കറ്റ് തുറക്കുന്ന ചിഹ്നമായ "{" ഇല്ലാതെ കാണുന്നു',
	'math_UnmatchedEnd' => '"\\end" ടാഗ് "\\begin" ടാഗില്ലാതെ കാണുന്നു',
	'math_UnmatchedLeft' => '"\\left" ടാഗ് "\\right" ടാഗില്ലാതെ കാണുന്നു',
	'math_UnmatchedOpenBrace' => 'ബ്രാക്കറ്റ് തുറക്കുന്ന ചിഹ്നമായ "{" ബ്രാക്കറ്റ് അടയ്ക്കുന്ന ചിഹ്നമായ "}" ഇല്ലാതെ കാണുന്നു',
	'math_UnmatchedOpenBracket' => '"[" എന്ന ബ്രാക്കറ്റ്ചിഹ്നം "]" എന്ന ബ്രാകറ്റ്ചിഹ്നമില്ലാതെ കാണുന്നു',
	'math_UnmatchedRight' => '"\\right" ടാഗ് "\\left" ടാഗില്ലാതെ കാണുന്നു',
	'math_UnrecognisedCommand' => 'തിരച്ചറിയാന്‍ പറ്റാഞ്ഞ നിര്‍ദ്ദേശം "$1"',
	'math_WrongFontEncoding' => '"$1" എന്ന ചിഹ്നം "$2" എന്ന ഫോണ്ട് എന്‍‌കോഡിങ്ങില്‍ അനുവദനീയമല്ല.',
	'math_WrongFontEncodingWithHint' => '"$1" എന്ന ചിഹ്നം "$2" എന്ന ഫോണ്ട് എന്‍‌കോഡിങ്ങില്‍ അനുവദനീയമല്ല. ദയവായി "$3{...}" എന്ന കമാന്റ് പരീക്ഷിക്കുക.',
);

/** Marathi (मराठी)
 * @author Kaustubh
 */
$messages['mr'] = array(
	'math_noblahtex' => '$1 ठिकाणी जे असायला हवे ते ब्लाहटेक्स (blahtex) चालू करू शकत नाही',
	'math-desc' => '&lt;math&gt; खूणांचे MathML आउटपुट',
	'math_AmbiguousInfix' => '"$1" ची संदिग्ध जागा (अधिक "{ ... }" कंस वापरून नि:संदिग्धीकरण करण्याचा प्रयत्न करा)',
	'math_CannotChangeDirectory' => 'काम चालू असलेली डिरेक्टरी बदलू शकत नाही',
	'math_CannotCreateTexFile' => 'tex संचिका तयार करू शकत नाही',
	'math_CannotRunDvipng' => 'dvipng चालू करू शकत नाही',
	'math_CannotRunLatex' => 'लॅटेक्स (latex) चालू करू शकत नाही',
	'math_CannotWritePngDirectory' => 'आउटपुट पीएन्‌जी डिरेक्टरी मध्ये लिहू शकत नाही',
	'math_CannotWriteTexFile' => 'tex संचिकेत लिहू शकत नाही',
	'math_CasesRowTooBig' => '"केसेस" ब्लॉकमध्ये प्रत्येक ओळीत फक्त दोनच नोंदी असू शकतात',
	'math_DoubleSubscript' => 'एकाच बेसशी संलग्न असणार्‍या दोन सबस्क्रीप्ट सापडल्या आहेत (फक्त एकच वापरण्याची परवानगी आहे)',
	'math_DoubleSuperscript' => 'एकाच बेसशी संलग्न असणार्‍या दोन सुपरस्क्रीप्ट सापडल्या आहेत (फक्त एकच वापरण्याची परवानगी आहे)',
	'math_IllegalCharacter' => 'इनपुटमध्ये चुकीचे चिन्ह आहे',
	'math_IllegalCommandInMathMode' => 'मॅथ मोड मध्ये "$1" ही क्रिया चुकीची आहे',
	'math_IllegalCommandInMathModeWithHint' => 'मॅथ मोड मध्ये "$1" ही क्रिया चुकीची आहे (तुम्ही "$2" ही क्रिया वापरू इच्छिता का?)',
	'math_IllegalCommandInTextMode' => '"$1" ही क्रिया टेक्स्ट मोड मध्ये करता येत नाही',
	'math_IllegalCommandInTextModeWithHint' => '"$1" ही क्रिया टेक्स्ट मोड मध्ये करता येत नाही (तुम्ही "$2" ही क्रिया वापरू इच्छिता का?)',
	'math_IllegalDelimiter' => '"$1" च्या पुढे चुकीचा डिलिमीटर (Delimiter) दिलेला आहे',
	'math_IllegalFinalBackslash' => 'इन्पुट च्या शेवटी दिलेला बॅक स्लॅश "\\" चुकीचा आहे',
	'math_IllegalNestedFontEncodings' => 'टंक एन्कोड करणार्‍या क्रिया एकमेकांत मिसळता (nested) येत नाहीत',
	'math_IllegalRedefinition' => '"$1" ही क्रिया अगोदरच ठरविलेली आहे; तुम्ही ती पुन्हा बदलू शकत नाही',
	'math_InvalidColour' => '"$1" हा रंग चुकीचा आहे',
	'math_InvalidUtf8Input' => 'इन्पुट UTF-8 मध्ये नाही',
	'math_LatexFontNotSpecified' => '"$1" साठी कुठलाही लॅटेक्स (LaTeX) टंक दिलेला नाही',
	'math_LatexPackageUnavailable' => '"$1" हे लॅटेक्स पॅकेज उपलब्ध नसल्याने पीएनजी रेखाटू (render) शकत नाही',
	'math_MismatchedBeginAndEnd' => '"$1" आणि "$2" या क्रिया जुळत नाहीत',
	'math_MisplacedLimits' => '"$1" ही क्रिया फक्त गणितीय सूत्रातच येऊ शकते (कृपया "\\mathop" चा वापर करा)',
	'math_MissingCommandAfterNewcommand' => '"\\newcommand" नंतर दिलेली नवीन क्रिया चुकीची आहे अथवा उपलब्ध नाही (एक क्रिया दिलेली असणे आवश्यक आहे; जी "\\" ने सुरु होईल व जिच्या नावात फक्त अक्षरे आहेत)',
	'math_MissingDelimiter' => '"$1" नंतर डिलिमीटर (delimiter) दिलेला नाही',
	'math_MissingOpenBraceAfter' => '"$1" नंतरचा सुरुवातीचा महिरपी कंस "{" दिलेला नाही',
	'math_MissingOpenBraceAtEnd' => 'इन्पुट च्या शेवटी सुरुवातीचा महिरपी कंस "{" दिलेला नाही',
	'math_MissingOpenBraceBefore' => '"$1" च्यापूर्वी उघडणारा महिरपी कंस "{" दिलेला नाही',
	'math_MissingOrIllegalParameterCount' => '"$1" च्या व्याख्येमध्ये चुकीचा अथवा अनुपलब्ध पॅरॅमीटर काऊंट दिलेला आहे (१ ते ९ मधील एक आकडा असणे आवश्यक)',
	'math_MissingOrIllegalParameterIndex' => '"$1" च्या व्याख्येमध्ये चुकीची अथवा अनुपलब्ध पॅरॅमीटरची अनुक्रमणिका दिलेली आहे',
	'math_NonAsciiInMathMode' => 'आस्की (ASCII) नसलेली अक्षरे फक्त टेक्स्ट मोड मध्येच वापरता येतात (ती अक्षरे "\\text{...}") मध्ये लिहिण्याचा प्रयत्न करा',
	'math_NotEnoughArguments' => '"$1" साठी पुरेशी अर्ग्युमेंट्स दिलेली नाहीत',
	'math_PngIncompatibleCharacter' => '$1 हे चिन्ह (अक्षर) असणारी पीएनजी बरोबर तयार करू शकत नाही',
	'math_ReservedCommand' => 'ब्लाहटेक्स (blahtex) च्या अंतर्गत वापरासाठी "$1" ही क्रिया राखून ठेवण्यात आलेली आहे',
	'math_SubstackRowTooBig' => '"substack" ब्लॉकच्या प्रत्येक ओळीत एकच नोंद असू शकते',
	'math_TooManyMathmlNodes' => 'मॅथएमएल (MathML) च्या वृक्षात खूप जास्त नोडस आहेत',
	'math_TooManyTokens' => 'इनपुट खूप लांब आहे',
	'math_UnavailableSymbolFontCombination' => '"$2" या टंकामध्ये "$1" हे चिन्ह उपलब्ध नाही',
	'math_UnexpectedNextCell' => '"&" ही क्रिया फक्त "\\begin ... \\end" या ब्लॉकमध्येच असू शकते',
	'math_UnexpectedNextRow' => '"\\\\" ही क्रिया फक्त "\\begin ... \\end" ब्लॉकमध्येच असू शकते',
	'math_UnmatchedBegin' => '"\\begin" ला जुळणारे "\\end" सापडले नाही',
	'math_UnmatchedCloseBrace' => 'समाप्तीच्या महिरपी कंसाला "}" जुळणारा उघडणारा महिरपी कंस "{" सापडला नाही',
	'math_UnmatchedEnd' => '"\\end" ला जुळणारे "\\begin" सापडले नाही',
	'math_UnmatchedLeft' => '"\\left" ला जुळणारे "\\right" सापडले नाही',
	'math_UnmatchedOpenBrace' => 'उघडणार्‍या महिरपी कंसाला "{" जुळणारा समाप्तीचा महिरपी कंस "}" सापडला नाही',
	'math_UnmatchedOpenBracket' => 'उघडणार्‍या चौकोनी कंसाला "[" जुळणारा समाप्तीचा चौकोनी कंस "]" सापडला नाही',
	'math_UnmatchedRight' => '"\\right" शी जुळणारे "\\left" सापडले नाही',
	'math_UnrecognisedCommand' => '"$1" ही क्रिया ओळखता आलेली नाही',
	'math_WrongFontEncoding' => '"$2" च्या टंक एन्कोडिंग मध्ये कदाचित "$1" मिळणार नाही',
	'math_WrongFontEncodingWithHint' => '"$2" च्या टंक एन्कोडिंगमध्ये कदाचित "$1" मिळणार नाही ("$3{...}" ही क्रिया वापरून पहा)',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'math_CannotCreateTexFile' => 'Kann kene Tex-Datei anleggen',
	'math_CannotWriteTexFile' => 'Kann Tex-Datei nich schrieven',
);

/** Dutch (Nederlands)
 * @author Annabel
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'math_noblahtex' => 'Blahtex kan niet uitgevoerd worden. Het programma zou hier moeten staan: $1',
	'math-desc' => 'MathML-uitvoer voor &lt;math&gt; tags',
	'math_AmbiguousInfix' => 'Ambigue plaatsing van "$1" (probeer het op te lossen met accolades "{ … }" om te disambigueren)',
	'math_CannotChangeDirectory' => 'Kan de werkmap niet wijzigen',
	'math_CannotCreateTexFile' => 'Kan geen tex-bestand aanmaken',
	'math_CannotRunDvipng' => 'Kan dvipng niet uitvoeren',
	'math_CannotRunLatex' => 'Kan latex niet uitvoeren',
	'math_CannotWritePngDirectory' => 'Kan niet schrijven naar de uitvoermap voor PNG',
	'math_CannotWriteTexFile' => 'Kan niet schrijven naar het tex-bestand',
	'math_CasesRowTooBig' => 'Er kunnen maar twee elementen staan in iedere rij van een blok "cases"',
	'math_DoubleSubscript' => 'Er stonden twee subscripts die aan dezelfde basis waren gekoppeld (slechts één is toegestaan)',
	'math_DoubleSuperscript' => 'Er stonden twee superscripts die aan dezelfde basis waren gekoppeld (slechts één is toegestaan)',
	'math_IllegalCharacter' => 'Ongeldig teken in de invoer',
	'math_IllegalCommandInMathMode' => 'Het commando "$1" is niet toegestaan in math-modus',
	'math_IllegalCommandInMathModeWithHint' => 'Het commando "$1" is ongeldig in math-modus. Wellicht wilde u "$2" gebruiken?',
	'math_IllegalCommandInTextMode' => 'Het commando "$1" is ongeldig in tekstmodus',
	'math_IllegalCommandInTextModeWithHint' => 'Het commando "$1" is ongeldig in tekstmodus. Wellicht wilde u "$2" gebruiken?',
	'math_IllegalDelimiter' => 'Ongeldig scheidingsteken na "$1"',
	'math_IllegalFinalBackslash' => 'Ongeldige backslach "\\" aan het einde van de invoer',
	'math_IllegalNestedFontEncodings' => "Commando's voor de codering van lettertypen kunnen niet genest worden",
	'math_IllegalRedefinition' => 'Het commando "$1" werd reeds gedefinieerd; u kunt het niet herdefiniëren',
	'math_InvalidColour' => 'De kleur "$1" is ongeldig',
	'math_InvalidUtf8Input' => 'De invoertekst was geen geldig UTF-8',
	'math_LatexFontNotSpecified' => 'Er werd geen LaTeX lettertype opgegeven voor "$1"',
	'math_LatexPackageUnavailable' => 'Het is niet mogelijk om naar PNG te renderen, omdat het LaTeX pakket "$1" niet beschikbaar is',
	'math_MismatchedBeginAndEnd' => 'De commando\'s "$1" en "$2" komen niet overeen',
	'math_MisplacedLimits' => 'Het commando "$1" kan alleen verschijnen na een math operator (overweeg om "\\mathop" te gebruiken)',
	'math_MissingCommandAfterNewcommand' => 'Niet aanwezig of niet toegestaan nieuw commando gebruikt na "\\newcommand" (er mag maar één commando gedefinieerd worden; het moet voorafgegaan worden door een backslash "\\" en mag enkel alfabetische karakters bevatten)',
	'math_MissingDelimiter' => 'Ontbrekend scheidingsteken na "$1"',
	'math_MissingOpenBraceAfter' => 'Ontbrekende openende accolade "{" na "$1"',
	'math_MissingOpenBraceAtEnd' => 'Ontbrekende sluitende accolade "}" op het einde van de invoer',
	'math_MissingOpenBraceBefore' => 'Ontbrekende openende accolade "{" na "$1"',
	'math_MissingOrIllegalParameterCount' => 'Ontbrekende of een ongeldig aantal parameters in de definitie van "$1" (dit moet één cijfer zijn tussen 1 en 9)',
	'math_MissingOrIllegalParameterIndex' => 'Ontbrekende of ongeldige parameterindex in de definitie van "$1"',
	'math_NonAsciiInMathMode' => 'Niet-ASCII karakters mogen enkel in text-modus gebruikt worden (tracht de probleemkarakters te plaatsen tussen "\\text{…}")',
	'math_NotEnoughArguments' => 'Er werden niet genoeg argumenten opgegeven voor "$1"',
	'math_PngIncompatibleCharacter' => 'Het is niet mogelijk om een correcte PNG te maken met het karakter $1',
	'math_ReservedCommand' => 'Het commando "$1" is gereserveerd voor intern gebruik door blahtex',
	'math_SubstackRowTooBig' => 'Er mag maar één ingave zijn in iedere rij van een "substack"-blok',
	'math_TooManyMathmlNodes' => 'Er zijn te veel nodes in de boomstructuur van MathML',
	'math_TooManyTokens' => 'De invoer is te lang',
	'math_UnavailableSymbolFontCombination' => 'Het symbool "$1" is niet beschikbaar in het lettertype "$2"',
	'math_UnexpectedNextCell' => 'Het commando "&" kan alleen voorkomen in een "\\begin … \\end" constructie',
	'math_UnexpectedNextRow' => 'Het commando "\\\\" kan alleen voorkomen in een "\\begin … \\end" constructie',
	'math_UnmatchedBegin' => 'Er is een "\\begin" zonder bijbehorende "\\end"',
	'math_UnmatchedCloseBrace' => 'Er is een accolade sluiten "}" zonder bijbehorende accolade openen "{"',
	'math_UnmatchedEnd' => 'Er is een "\\end" zonder bijbehorende "\\begin"',
	'math_UnmatchedLeft' => 'Er is een "\\left" zonder bijbehorende "\\right"',
	'math_UnmatchedOpenBrace' => 'Er is een accolade openen "{" zonder bijbehorende accolade sluiten "}"',
	'math_UnmatchedOpenBracket' => 'Er is een blokhaak openen "[" zonder bijbehorende blokhaak sluiten "]"',
	'math_UnmatchedRight' => 'Er is een "\\right" zonder bijbehorende "\\left"',
	'math_UnrecognisedCommand' => 'Commando "$1" niet herkend',
	'math_WrongFontEncoding' => 'Het symbool "$1" mag niet voorkomen in lettertypecodering "$2"',
	'math_WrongFontEncodingWithHint' => 'Het symbool "$1" mag niet voorkomen in lettertypecodering "$2". Probeer het commando "$3{…}" te gebruiken.',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Harald Khan
 */
$messages['nn'] = array(
	'math_noblahtex' => 'Kan ikkje køyra blahtex, som burde vera på $1',
	'math-desc' => 'MathML-resultat for &lt;math&gt;-merke',
	'math_AmbiguousInfix' => 'Tvetydig plassering av «$1» (prøv å nytta ekstra parentesar «{ ... }» for å gjera eintydig)',
	'math_CannotChangeDirectory' => 'Kan ikkje endra arbeidsmappa',
	'math_CannotCreateTexFile' => 'Kan ikkje oppretta tex-fil',
	'math_CannotRunDvipng' => 'Kan ikkje køyra dvipng',
	'math_CannotRunLatex' => 'Kan ikkje køyra latex',
	'math_CannotWritePngDirectory' => 'Kan ikkje skriva til PNG-mappa',
	'math_CannotWriteTexFile' => 'Kan ikkje skriva til tex-fil',
	'math_CasesRowTooBig' => 'Det kan berre vera to element i kvar rad av ei «cases»-blokk',
	'math_DoubleSubscript' => 'Fann to instansar av senka tekst kopla til same base (berre éin er tillaten)',
	'math_DoubleSuperscript' => 'Fann to instansar av heva tekst kopla til same base (berre éin er tillaten)',
	'math_IllegalCharacter' => 'Ulovleg teikn i opphavstekst',
	'math_IllegalCommandInMathMode' => 'Kommandoen «$1» er ulovleg i mattemodus',
	'math_IllegalCommandInMathModeWithHint' => 'Kommandoen «$1» er ulovleg i mattemodus (kanskje du meinte å nytta «$2» i staden?)',
	'math_IllegalCommandInTextMode' => 'Kommandoen «$1» er ulovleg i tekstmodus',
	'math_IllegalCommandInTextModeWithHint' => 'Kommandoen «$1» er ulovleg i tekstmodus (kanskje du meinte å nytta «$2» i staden?)',
	'math_IllegalDelimiter' => 'Ugyldig skiljeteikn etter «$1»',
	'math_IllegalFinalBackslash' => 'Ugyldig omvend skråstrek «\\» på slutten av innskriven tekst',
	'math_IllegalNestedFontEncodings' => 'Teiknkodingskommandoar kan ikkje bli nøsta',
	'math_IllegalRedefinition' => 'Kommandoen «$1» har allereie blitt definert; du kan ikkje omdefinera han',
	'math_InvalidColour' => 'Fargen «$1» er ugyldig',
	'math_InvalidUtf8Input' => 'Den innskrivne teksten var ikkje gyldig UTF-8',
	'math_LatexFontNotSpecified' => 'Ingen LaTeX-skrifttype har blitt oppgjeven for «$1»',
	'math_LatexPackageUnavailable' => 'Kunne ikkje teikna PNG av di LaTeX-pakken «$1» ikkje er tilgjengeleg',
	'math_MismatchedBeginAndEnd' => 'Kommandoane «$1» og «$2» samsvarer ikkje',
	'math_MisplacedLimits' => 'Kommandoen «$1» kan berre førekomma etter ein matteoperatør (vurder å nytta «\\mathop»)',
	'math_MissingCommandAfterNewcommand' => 'Manglande eller ulovleg ny kommando etter «\\newcommand» (nøyaktig éin kommentar må vera definert; den må starta med ein omvend skråstrek «\\» og berre innehalda bokstavar)',
	'math_MissingDelimiter' => 'Manglande skiljeteikn etter «$1»',
	'math_MissingOpenBraceAfter' => 'Manglar open krøllparentes «{» etter «$1»',
	'math_MissingOpenBraceAtEnd' => 'Manglar open krøllparentes «{» på slutten av den innskrivne teksten',
	'math_MissingOpenBraceBefore' => 'Manglar open krøllparentes «{» før «$1»',
	'math_MissingOrIllegalParameterCount' => 'Manglande eller ulovleg parametertal funne i definisjonen av «$1» (må vera eitt enkelt siffer i intervallet 1-9)',
	'math_MissingOrIllegalParameterIndex' => 'Manglande eller ulovleg parameterindeks i definisjonen av «$1»',
	'math_NonAsciiInMathMode' => 'Teikn som ikkje er ASCII kan berre bli nytta i tekstmodus (prøv å kringsetja problemteikna med «\\text{...}»)',
	'math_NotEnoughArguments' => 'For få argument blei gjevne for «$1»',
	'math_PngIncompatibleCharacter' => 'Kunne ikkje oppretta PNG med teiknet $1',
	'math_ReservedCommand' => 'Kommandoen «$1» er halden av for intern bruk av blahtex',
	'math_SubstackRowTooBig' => 'Det kan berre vera eitt element i kvar rad av ei «substack»-blokk',
	'math_TooManyMathmlNodes' => 'Det er for mange knutepunkt i MathML-treet',
	'math_TooManyTokens' => 'Den innskrivne teksten er for lang',
	'math_UnavailableSymbolFontCombination' => 'Symbolet «$1» er ikkje tilgjengeleg i skrifttypen «$2»',
	'math_UnexpectedNextCell' => 'Kommandoen «&» kan berre førekomma inne i ei «\\begin ... \\end»-blokk',
	'math_UnexpectedNextRow' => 'Kommandoen «\\\\» kan berre førekomma inne i ei «\\begin ... \\end»-blokk',
	'math_UnmatchedBegin' => 'Fann «\\begin» utan samsvarande «\\end»',
	'math_UnmatchedCloseBrace' => 'Fann lukka krøllparentes «}» utan samsvarande open krøllparentes «{»',
	'math_UnmatchedEnd' => 'Fann «\\end» utan samsvarande «\\begin»',
	'math_UnmatchedLeft' => 'Fann «\\left» utan samsvarande «\\right»',
	'math_UnmatchedOpenBrace' => 'Fann open krøllparentes «{» utan samsvarande lukka krøllparentes «}»',
	'math_UnmatchedOpenBracket' => 'Fann open hakeparentes «[» utan samsvarande lukka hakeparentes «]»',
	'math_UnmatchedRight' => 'Fann «\\right» utan samsvarande «\\left»',
	'math_UnrecognisedCommand' => 'Ukjend kommando «$1»',
	'math_WrongFontEncoding' => 'Symbolet «$1» kan ikkje førekomma i teiknkodinga «$2»',
	'math_WrongFontEncodingWithHint' => 'Symbolet «$1» kan ikkje førekomma i teiknkodinga «$2» (prøv å nytta kommandoen «$3{...}»)',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'math_noblahtex' => 'Kan ikke kjøre blahtex, som burde være på $1',
	'math-desc' => 'MathML-resultat for &lt;math&gt;-tagger',
	'math_AmbiguousInfix' => 'Tvetydig plassering av «$1» (prøv å bruke ekstra parenteser «{ ... }» for å gjøre entydig)',
	'math_CannotChangeDirectory' => 'Kan ikke endre arbeidsmappe',
	'math_CannotCreateTexFile' => 'Kan ikke opprette tex-fil',
	'math_CannotRunDvipng' => 'Kan ikke kjøre dvipng',
	'math_CannotRunLatex' => 'Kan ikke kjøre latex',
	'math_CannotWritePngDirectory' => 'Kan ikke skrive til PNG-mappe',
	'math_CannotWriteTexFile' => 'Kan ikke skriv til tex-fil',
	'math_CasesRowTooBig' => 'Det kan kun være ett element i hver rad av en «cases»-blokk',
	'math_DoubleSubscript' => 'Fant to instanser av senket tekst koblet til samme base (kun én er tillatt)',
	'math_DoubleSuperscript' => 'Fant to instanser av hevet tekst koblet til samme base (kun én er tillatt)',
	'math_IllegalCharacter' => 'Ulovlig tegn i opphavstekst',
	'math_IllegalCommandInMathMode' => 'Kommandoen «$1» er ulovlig i mattemodus',
	'math_IllegalCommandInMathModeWithHint' => 'Kommandoen «$1» er ulovlig i mattemodus (kanskje du mente å bruke «$2» i stedet?)',
	'math_IllegalCommandInTextMode' => 'Kommandoen «$1» er ulovlig i tekstmodus',
	'math_IllegalCommandInTextModeWithHint' => 'Kommandoen «$1» er ulovlig i tekstmodus (kanskje du mente å bruke «$2» i stedet?)',
	'math_IllegalDelimiter' => 'Ugyldig skilletegn etter «$1»',
	'math_IllegalFinalBackslash' => 'Ugyldig omvendt skråstrek «\\» på slutten av innskrevet tekst',
	'math_IllegalNestedFontEncodings' => 'Tegnkodingskommandoer kan ikke nøstes',
	'math_IllegalRedefinition' => 'Kommandoen «$1» har allerede blitt definert; du kan ikke omdefinere den',
	'math_InvalidColour' => 'Fargen «$1» er ugyldig',
	'math_InvalidUtf8Input' => 'Den innskrevne teksten var ikke gyldig UTF-8',
	'math_LatexFontNotSpecified' => 'Ingen LaTeX-skrifttype har blitt angitt for «$1»',
	'math_LatexPackageUnavailable' => 'Kunne ikke tegne PNG fordi LaTeX-pakken «$1» ikke er tilgjengelig',
	'math_MismatchedBeginAndEnd' => 'Kommandoene «$1» og «$2» stemmer ikke overens',
	'math_MisplacedLimits' => 'Kommandoen «$1» kan bare opptre etter en matteoperator (overvei å bruke «\\mathop»)',
	'math_MissingCommandAfterNewcommand' => 'Manglende eller ulovlig ny kommando etter «\\newcommand» (nøyaktig én kommentar må være definert; den må begynne med en omvendt skråstrek «\\» og inneholde kun bokstaver)',
	'math_MissingDelimiter' => 'Manglende skilletegn etter «$1»',
	'math_MissingOpenBraceAfter' => 'Mangler åpen krøllparentes «{» etter «$1»',
	'math_MissingOpenBraceAtEnd' => 'Mangler åpen krøllparentes «{» på slutten av den innskrevne teksten',
	'math_MissingOpenBraceBefore' => 'Mangler åpen krøllparentes «{» før «$1»',
	'math_MissingOrIllegalParameterCount' => 'Manglende eller ulovlig parameterantall funnet i definisjonen av «$1» (må være et enkelt siffer fra og med 1 til og med 9)',
	'math_MissingOrIllegalParameterIndex' => 'Manglende eller ulovlig parameterindeks i definisjonen av «$1»',
	'math_NonAsciiInMathMode' => 'Tegn som ikke er i ASCII kan kun brukes i tekstmodus (prøv å omringe problemtegnene med «\\text{...}»)',
	'math_NotEnoughArguments' => 'For få argumenter ble gitt for «$1»',
	'math_PngIncompatibleCharacter' => 'Kunne ikke generere PNG med tegnet $1',
	'math_ReservedCommand' => 'Kommandoen «$1» er reservert for intern bruk av blahtex',
	'math_SubstackRowTooBig' => 'Det kan kun være ett element i hver rad av en «substack»-blokk',
	'math_TooManyMathmlNodes' => 'Det er for mange noder i MathML-treet',
	'math_TooManyTokens' => 'Den innskrevne teksten er for lang',
	'math_UnavailableSymbolFontCombination' => 'Symbolet «$1» er ikke tilgjengelig i skrifttypen «$2»',
	'math_UnexpectedNextCell' => 'Kommandoen «&» kan kun opptre inne i en «\\begin ... \\end»-blokk',
	'math_UnexpectedNextRow' => 'Kommandoen «\\\\» kan kun opptre inne i en «\\begin ... \\end»-blokk',
	'math_UnmatchedBegin' => 'Fant «\\begin» uten tilsvarende «\\end»',
	'math_UnmatchedCloseBrace' => 'Fant lukkende krøllparentes «}» uten tilsvarende åpen krøllparentes «{»',
	'math_UnmatchedEnd' => 'Fant «\\end» uten tilsvarende «\\begin»',
	'math_UnmatchedLeft' => 'Fant «\\left» uten tilsvarende «\\right»',
	'math_UnmatchedOpenBrace' => 'Fant åpen krøllparentes «{» uten tilsvarende lukkende krøllparentes «}»',
	'math_UnmatchedOpenBracket' => 'Fant åpen hakeparentes «[» uten tilsvarende lukkende hakeparentes «]»',
	'math_UnmatchedRight' => 'Fant «\\right» uten tilsvarende «\\left»',
	'math_UnrecognisedCommand' => 'Ugjenkjennelig kommando «$1»',
	'math_WrongFontEncoding' => 'Symbolet «$1» kan ikke opptre i tegnkodingen «$2»',
	'math_WrongFontEncodingWithHint' => 'Symbolet «$1» kan ikke opptre i tegnkodingen «$2» (prøv å bruke kommandoen «$3{...}»)',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'math_noblahtex' => 'Pòt pas executar blahtex, que deuriá èsser a $1',
	'math-desc' => 'Sortida MathML per las balisas &lt;math&gt;',
	'math_AmbiguousInfix' => "La posicion de « $1 » es ambigua (apondre de balisas adicionalas « { ... } » pòt levar l'ambigüitat)",
	'math_CannotChangeDirectory' => 'Pòt pas cambiar de dorsièr de trabalh',
	'math_CannotCreateTexFile' => 'Pòt pas crear un fichièr tex',
	'math_CannotRunDvipng' => 'Pòt pas executar dvipng',
	'math_CannotRunLatex' => 'Pòt pas executar LaTeX',
	'math_CannotWritePngDirectory' => 'Pòt pas escriure dins lo dorsièr dels fichièrs PNG',
	'math_CannotWriteTexFile' => 'Pòt pas escriure dins un fichièr tex',
	'math_CasesRowTooBig' => "I pòt pas aver que doas entradas dins cada rengada d'un blòt « casas ».",
	'math_DoubleSubscript' => "Dos indicis son ligats a la meteissa basa, pas qu'un sol es permes.",
	'math_DoubleSuperscript' => "Dos expausants son ligams a la meteissa basa, pas qu'un sol es permes.",
	'math_IllegalCharacter' => 'Caractèr interdich dins la donada picada',
	'math_IllegalCommandInMathMode' => 'La comanda « $1 » es interdicha en mòde math.',
	'math_IllegalCommandInMathModeWithHint' => 'La comanda « $1 » es interdicha en mòde math (benlèu voliatz utilizar « $2 » a la plaça ?)',
	'math_IllegalCommandInTextMode' => 'La comanda « $1 » es interdicha en mòde tèxt.',
	'math_IllegalCommandInTextModeWithHint' => 'La comanda « $1 » es interdicha en mòde tèxt (Benlèu voliatz utilizar « $2 » a la plaça ?)',
	'math_IllegalDelimiter' => 'Delimitaire interdich aprèp « $1 »',
	'math_IllegalFinalBackslash' => 'Lo caractèr « \\ » pòt pas aparéisser a la fin de la picada.',
	'math_IllegalNestedFontEncodings' => "Las comandas d'encodatge de caractèrs pòdon èsser imbricadas.",
	'math_IllegalRedefinition' => 'La comanda « $1 » ja es definida, la podètz pas tornar definir.',
	'math_InvalidColour' => 'La color « $1 » es pas valida.',
	'math_InvalidUtf8Input' => 'La cadena de caractèrs picada es pas al format UTF-8.',
	'math_LatexFontNotSpecified' => 'Cap de poliça de caractèrs LaTeX es pas estada precisada per « $1 ».',
	'math_LatexPackageUnavailable' => 'Pòt pas rendre lo fichièr PNG perque lo paquetatge LaTeX « $1 » es pas accessible.',
	'math_MismatchedBeginAndEnd' => 'Las comandas « $1 » e « $2 » correspondon pas.',
	'math_MisplacedLimits' => 'La comanda « $1 » deu aparéisser aprèp un operator quand es en mòde math (suggestion : ensajatz « mathop »).',
	'math_MissingCommandAfterNewcommand' => 'Un nom de comanda novèl es mancant o fautiu aprèp « \\newcommand » (deu i aver precisament una comanda definida, deu començar per « \\ » e conténer pas que de caractèrs alfabetics).',
	'math_MissingDelimiter' => 'Un delimitaire manca aprèp « $1 ».',
	'math_MissingOpenBraceAfter' => 'La balisa « { » manca aprèp « $1 »',
	'math_MissingOpenBraceAtEnd' => 'La balisa « { » manca a la fin de la picada.',
	'math_MissingOpenBraceBefore' => 'La balisa « { » manca abans « $1 »',
	'math_MissingOrIllegalParameterCount' => "Descompte de paramètres mancants o fautius dins la definicion de « $1 » (deu èsser pas qu'una sola chifra compresa entre 1 e 9 inclusivament)",
	'math_MissingOrIllegalParameterIndex' => 'Indèx de paramètre mancant o fautiu dins la definicion de « $1 »',
	'math_NonAsciiInMathMode' => 'Los caractèrs en defòra de ASCII pòdon solament èsser utilizats en mòde tèxt (ensajatz de metre los caractèrs problematics dins « \\text{...} »).',
	'math_NotEnoughArguments' => "Pas pro d'arguments picats per « $1 »",
	'math_PngIncompatibleCharacter' => 'Pòt pas generir lo fichièr PNG que conten lo caractèr $1.',
	'math_ReservedCommand' => 'La comanda « $1 » es reservada a blahtex.',
	'math_SubstackRowTooBig' => "I pòt pas aver qu'una sola entrada dins cada rengada d'un blt « sospilat ».",
	'math_TooManyMathmlNodes' => "I a tròp de noses dins l'arbre MathML.",
	'math_TooManyTokens' => 'La donada picada es tròp longa.',
	'math_UnavailableSymbolFontCombination' => 'Lo simbòl « $1 » es pas disponible per la poliça de caractèrs « $2 ».',
	'math_UnexpectedNextCell' => 'La comanda « & » pòt pas solament aparéisser dins un blòt « \\begin ... \\end ».',
	'math_UnexpectedNextRow' => 'La comanda « \\\\ » pòt pas solament aparéisser dins un blòt « \\begin ... \\end ».',
	'math_UnmatchedBegin' => 'La balisa « \\begin » es pas balançada per la balisa « \\end ».',
	'math_UnmatchedCloseBrace' => 'La balisa « } » es pas precedida per la balisa « { ».',
	'math_UnmatchedEnd' => 'La balisa « \\end » es pas precedida per la balisa « \\begin ».',
	'math_UnmatchedLeft' => 'La balisa « \\left » es pas balançada per la balisa « \\right ».',
	'math_UnmatchedOpenBrace' => 'La balisa « { » es pas balançada per la balisa « } ».',
	'math_UnmatchedOpenBracket' => 'La balisa « [ » es pas balançada per la balisa « ] ».',
	'math_UnmatchedRight' => 'La balisa « \\right » es pas balançada per la balisa « \\left ».',
	'math_UnrecognisedCommand' => 'Comanda desconeguda « $1 »',
	'math_WrongFontEncoding' => "Lo simbòl « $1 » pòt aparéisser pas dins l'encodatge de caractèrs « $2 ».",
	'math_WrongFontEncodingWithHint' => "Lo simbòl « $1 » poiriá èsser pas afichat per l'encodatge de caractèrs « $2 » (ensajatz la comanda « $3{...} »).",
);

/** Polish (Polski)
 * @author Derbeth
 * @author Dodek
 * @author Equadus
 * @author McMonster
 * @author Sp5uhe
 * @author Wpedzich
 */
$messages['pl'] = array(
	'math_noblahtex' => 'Nie udało sie uruchomić rozszerzenia blahtex, które powinno znajdować się w $1',
	'math-desc' => 'Informacje wyjściowe znaczników &lt;math&gt; w MathML',
	'math_AmbiguousInfix' => 'Niejednoznaczne ustawienie „$1” (spróbuj użyć dodatkowych nawiasów „{ ... }” by ujednoznacznić)',
	'math_CannotChangeDirectory' => 'Nie można zmienić katalogu roboczego',
	'math_CannotCreateTexFile' => 'Nie udało się stworzyć pliku tex',
	'math_CannotRunDvipng' => 'Nie można uruchomić dvipng',
	'math_CannotRunLatex' => 'Nie można uruchomić LaTeX-a',
	'math_CannotWritePngDirectory' => 'Nie można zapisać do wyjściowego katalogu PNG',
	'math_CannotWriteTexFile' => 'Nie można pisać do pliku tex',
	'math_CasesRowTooBig' => 'W każdym wierszu bloku „cases” mogą być jedynie dwa wpisy',
	'math_DoubleSubscript' => 'Znaleziono dwa indeksy dolne dołączone do tej samej bazy.
Możliwe jest korzystanie tylko z jednego.',
	'math_DoubleSuperscript' => 'Znaleziono dwa indeksy górne dołączone do tej samej bazy.
Możliwe jest korzystanie tylko z jednego.',
	'math_IllegalCharacter' => 'Nieprawidłowy znak w danych wejściowych',
	'math_IllegalCommandInMathMode' => 'Polecenie „$1” jest niedozwolone w trybie obliczeń',
	'math_IllegalCommandInMathModeWithHint' => 'Polecenie „$1” jest niedozwolone w trybie obliczeń (może miałeś na myśli „$2”?)',
	'math_IllegalCommandInTextMode' => 'Polecenie „$1” jest niedozwolone w trybie tekstowym',
	'math_IllegalCommandInTextModeWithHint' => 'Polecenie „$1” nie jest dozwolone w trybie tekstowym
Podobnym poleceniem jest „$2”.',
	'math_IllegalDelimiter' => 'Niedozwolony separator przed „$1”',
	'math_IllegalFinalBackslash' => 'Niedozwolony backslash „\\” na końcu wejścia',
	'math_IllegalNestedFontEncodings' => 'Komendy kodowania czcionek nie mogą być zagnieżdżane',
	'math_IllegalRedefinition' => 'Polecenie „$1” jest już zdefiniowane; nie możesz go przedefiniować',
	'math_InvalidColour' => 'Kolor „$1” jest niepoprawny',
	'math_InvalidUtf8Input' => 'Ciąg danych wejściowych nie był zgodny z UTF-8',
	'math_LatexFontNotSpecified' => 'Nie określono czcionki LaTeX-a dla „$1”',
	'math_LatexPackageUnavailable' => 'Nie udało się wygenerować pliku w formacie PNG, ponieważ pakiet „$1” LaTeX nie jest dostępny',
	'math_MismatchedBeginAndEnd' => 'Polecenia „$1” i „$2” nie pasują',
	'math_MisplacedLimits' => 'Polecenie „$1” może wystąpić tylko po operatorze matematycznym.
Zaleca sie skorzystanie z „\\mathop”.',
	'math_MissingCommandAfterNewcommand' => 'Brakująca lub nieprawidłowa nazwa nowego polecenia za „\\newcommand”.
Musi to być definicja dokładnie jednego polecenia,
zaczynać się od ukośnika lewego „\\” i zawierać wyłącznie litery.',
	'math_MissingDelimiter' => 'Brak separatora po „$1”',
	'math_MissingOpenBraceAfter' => 'Brak otwierającego nawiasu klamrowego „{” po „$1”',
	'math_MissingOpenBraceAtEnd' => 'Brakujący nawias otwierający „{” na końcu',
	'math_MissingOpenBraceBefore' => 'Brakujący nawias otwierający „{” przed „$1”',
	'math_MissingOrIllegalParameterCount' => 'Brakujący lub nieprawidłowy licznik liczby parametrów w definicji „$1”.
Musi to być pojedyncza cyfra z zakresu od 1 do 9 włącznie.',
	'math_MissingOrIllegalParameterIndex' => 'Brakujący lub nieprawidłowy indeks parametru w definicji „$1”.',
	'math_NonAsciiInMathMode' => 'Znaki spoza ASCII mogą być użyte jedynie w trybie tekstowym (spróbuj zamknąć znaki w „\\text{...}”)',
	'math_NotEnoughArguments' => 'Zbyt mało argumentów dla „$1”',
	'math_PngIncompatibleCharacter' => 'Nie można poprawnie wygenerować pliku PNG zawierającego znak $1',
	'math_ReservedCommand' => 'Polecenie „$1” jest zarezerwowane do wewnętrznego użycia przez blahtex',
	'math_SubstackRowTooBig' => 'W każdym wierszu bloku „substack” może być tylko jeden wpis',
	'math_TooManyMathmlNodes' => 'Zbyt dużo węzłów w drzewie MathML',
	'math_TooManyTokens' => 'Zbyt długie dane wejściowe',
	'math_UnavailableSymbolFontCombination' => 'Brak znaku „$1” w czcionce „$2”',
	'math_UnexpectedNextCell' => 'Polecenie „&” może występować jedynie wewnątrz bloku „\\begin ... \\end”',
	'math_UnexpectedNextRow' => 'Polecenie „\\\\” może występować jedynie wewnątrz bloku „\\begin ... \\end”',
	'math_UnmatchedBegin' => 'Napotkano „\\begin” bez odpowiadającego „\\end”',
	'math_UnmatchedCloseBrace' => 'Napotkano na nawias zamykający „}” bez bez odpowiadającego mu nawiasu otwierającego „{”',
	'math_UnmatchedEnd' => 'Napotkano „\\end” bez odpowiadającego „\\begin”',
	'math_UnmatchedLeft' => 'Napotkano „\\left” bez pasującego „\\right”',
	'math_UnmatchedOpenBrace' => 'Napotkano nawias otwierający „{” bez odpowiadającego mu nawiasu zamykającego „}”',
	'math_UnmatchedOpenBracket' => 'Napotkano nawias otwierający „[” bez odpowiadającego mu nawiasu zamykającego „]”',
	'math_UnmatchedRight' => 'Napotkano „\\right” bez odpowiadającego mu „\\left”',
	'math_UnrecognisedCommand' => 'Nierozpoznane polecenie „$1”',
	'math_WrongFontEncoding' => 'Symbol „$1” może być niewidoczny przy kodowaniu czcionką „$2”',
	'math_WrongFontEncodingWithHint' => 'Znak „$1” może nie występować w czcionce „$2”.
Spróbuj użyć polecenia „$3{...}”.',
);

/** Portuguese (Português)
 * @author Malafaya
 */
$messages['pt'] = array(
	'math_noblahtex' => 'Não é possível executar blahtex, que deveria estar em $1',
	'math-desc' => 'Resultado MathML para marcas &lt;math&gt;',
	'math_AmbiguousInfix' => 'Posicionamento ambígua de "$1" (experimente usar chavetas adicionais "{ ... }" para desfazer a ambiguidade)',
	'math_CannotChangeDirectory' => 'Não foi possível mudar directoria de trabalho',
	'math_CannotCreateTexFile' => 'Não foi possível criar ficheiro tex',
	'math_CannotRunDvipng' => 'Não foi possível executar dvipng',
	'math_CannotRunLatex' => 'Não é possível executar latex',
	'math_CannotWritePngDirectory' => 'Não foi possível escrever para a directoria de saída de PNGs',
	'math_CannotWriteTexFile' => 'Não foi possível escrever para ficheiro tex',
	'math_CasesRowTooBig' => 'Só pode haver duas entradas em cada linha de um bloco "cases"',
	'math_DoubleSubscript' => 'Foram encontrados dois subscritos ligados à mesma base (apenas um é permitido)',
	'math_DoubleSuperscript' => 'Foram encontrados dois superscritos ligados à mesma base (apenas um é permitido)',
	'math_IllegalCharacter' => 'Caracter inválido nos dados introduzidos',
	'math_IllegalCommandInMathMode' => 'O comando "$1" é inválido em modo matemático',
	'math_IllegalCommandInMathModeWithHint' => 'O comando "$1" é inválido em modo matemático (talvez pretendesse usar "$2"?)',
	'math_IllegalCommandInTextMode' => 'O comando "$1" é inválido em modo de texto',
	'math_IllegalCommandInTextModeWithHint' => 'O comando "$1" é inválido em modo de texto (talvez pretendesse usar "$2"?)',
	'math_IllegalDelimiter' => 'Delimitador inválido após "$1"',
	'math_IllegalFinalBackslash' => 'Barra inversa "\\" inválida no fim dos dados introduzidos',
	'math_IllegalNestedFontEncodings' => 'Comandos de codificação de tipo de letra não podem ser encapsulados uns nos outros',
	'math_IllegalRedefinition' => 'O comando "$1" já foi definido; não é possível redefini-lo',
	'math_InvalidColour' => 'A cor "$1" é inválida',
	'math_InvalidUtf8Input' => 'O texto introduzido não é UTF-8 válido',
	'math_LatexFontNotSpecified' => 'Nenhum tipo de letra LaTeX foi especificado para "$1"',
	'math_LatexPackageUnavailable' => 'Impossível criar PNG porque o pacote LaTeX "$1" não está disponível',
	'math_MismatchedBeginAndEnd' => 'Os comandos "$1" e "$2" não correspondem',
	'math_MisplacedLimits' => 'O comando "$1" apenas pode aparecer depois de um operador matemático (considere a utilização de "\\mathop")',
	'math_MissingCommandAfterNewcommand' => 'Nome de novo comando em falta ou inválido após "\\newcommand" (tem de haver exactamente um comando definido; este deverá começar com contrabarra "\\" e conter apenas caracteres alfabéticos)',
	'math_MissingDelimiter' => 'Falta delimitador depois de "$1"',
	'math_MissingOpenBraceAfter' => 'Falta chaveta de abertura "{" depois de "$1"',
	'math_MissingOpenBraceAtEnd' => 'Falta chaveta de abertura "{" no fim do texto introduzido',
	'math_MissingOpenBraceBefore' => 'Falta chaveta de abertura "{" antes de "$1"',
	'math_MissingOrIllegalParameterCount' => 'Parâmetros em falta ou em número inválido na definição de "$1" (deverá ser um único dígito entre 1 e 9 inclusive)',
	'math_MissingOrIllegalParameterIndex' => 'Índice de parâmetro em falta ou inválido na definição de "$1"',
	'math_NonAsciiInMathMode' => 'Caracteres não ASCII só podem ser usados em modo de texto (experimente inscrever os caracteres problemáticos dentro de "\\text{...}")',
	'math_NotEnoughArguments' => 'Não foram fornecidos argumentos suficientes para "$1"',
	'math_PngIncompatibleCharacter' => 'Não foi possível gerar correctamente o PNG contendo o caracter $1',
	'math_ReservedCommand' => 'O comando "$1" está reservado para uso interno pelo blahtex',
	'math_SubstackRowTooBig' => 'Só pode haver uma entrada em cada linha de um bloco "substack"',
	'math_TooManyMathmlNodes' => 'Há demasiados nós na árvore MathML',
	'math_TooManyTokens' => 'O texto introduzido é demasiado longo',
	'math_UnavailableSymbolFontCombination' => 'O símbolo "$1" não está disponível no tipo de letra "$2"',
	'math_UnexpectedNextCell' => 'O comando "&" só pode aparecer dentro de um bloco "\\begin ... \\end"',
	'math_UnexpectedNextRow' => 'O comando "\\\\" apenas pode aparecer dentro de um block "\\begin ... \\end"',
	'math_UnmatchedBegin' => 'Foi encontrado "\\begin" sem "\\end" correspondente',
	'math_UnmatchedCloseBrace' => 'Foi encontrada chaveta de fecho "{" sem chaveta de abertura "}" correspondente',
	'math_UnmatchedEnd' => 'Foi encontrado "\\end" sem "\\begin" correspondente',
	'math_UnmatchedLeft' => 'Foi encontrado "\\left" sem "\\right" correspondente',
	'math_UnmatchedOpenBrace' => 'Foi encontrada chaveta de abertura "{" sem chaveta de fecho "}" correspondente',
	'math_UnmatchedOpenBracket' => 'Foi encontrado parêntese recto de abertura "[" sem parêntese recto de fecho "]" correspondente',
	'math_UnmatchedRight' => 'Foi encontrado "\\right" sem "\\left" correspondente',
	'math_UnrecognisedCommand' => 'Comando "$1" não reconhecido',
	'math_WrongFontEncoding' => 'O símbolo "$1" não pode aparecer na codificação de tipo de letra "$2"',
	'math_WrongFontEncodingWithHint' => 'O símbolo "$1" não pode aparecer na codificação de tipo de letra "$2" (experimente usar o comando "$3{...}")',
);

/** Romanian (Română)
 * @author Firilacroco
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'math_noblahtex' => 'Nu se poate executa blahtex, care ar trebui să fie la $1',
	'math-desc' => 'Date de ieşire MathML pentru tag-ul &lt;math&gt;',
	'math_AmbiguousInfix' => 'Amplasare ambiguă pentru "$1" (încercaţi folosirea acoladelor "{ ... }" pentru dezambiguizare)',
	'math_CannotChangeDirectory' => 'Nu se poate schmba directorul în lucru',
	'math_CannotCreateTexFile' => 'Nu se poate crea fişierul tex',
	'math_CannotRunDvipng' => 'Nu se poate rula dvipng',
	'math_CannotRunLatex' => 'Nu se poate rula latex',
	'math_CannotWritePngDirectory' => 'Nu se poate scrie în directorul PNG de ieşire',
	'math_CannotWriteTexFile' => 'Nu se poate scrie fişierul tex',
	'math_CasesRowTooBig' => 'Pot exista doar două intrări pe fiecare rând al unui bloc "cases"',
	'math_DoubleSubscript' => 'S-au găsit doi indici pentru aceeaşi bază (numai unul este permis)',
	'math_DoubleSuperscript' => 'S-au găsit doi exponenţi pentru aceeaşi bază (numai unul este permis)',
	'math_IllegalCharacter' => 'Caracter nepermis introdus',
	'math_IllegalCommandInMathMode' => 'Comanda "$1" nu este permisă în modul math',
	'math_IllegalCommandInMathModeWithHint' => 'Comanda "$1" nu este permisă în modul math (doreaţi să folosiţi "$2" în loc?)',
	'math_IllegalCommandInTextMode' => 'Comanda "$1" nu este permisă în modul text',
	'math_IllegalCommandInTextModeWithHint' => 'Comanda "$1" nu este permisă în modul text (doreaţi să folosiţi "$2" în loc?)',
	'math_IllegalDelimiter' => 'Delimitator nepermis după "$1"',
	'math_IllegalFinalBackslash' => 'Backslash "\\" nepermis la sfârşitul intrării',
	'math_IllegalNestedFontEncodings' => 'Comenzile de codare a fontului nu pot fi imbricate',
	'math_IllegalRedefinition' => 'Comanda "$1" a fost deja definită; nu o puteţi redefini',
	'math_InvalidColour' => 'Culoarea "$1" nu este validă',
	'math_InvalidUtf8Input' => 'Şirul de intrare nu a fost valid UTF-8',
	'math_LatexFontNotSpecified' => 'Nici un font LaTeX nu a fost specificat pentru "$1"',
	'math_LatexPackageUnavailable' => 'Nu se poate reda ca PNG deoarece pachetul "$1" LaTeX nu este disponibil',
	'math_MismatchedBeginAndEnd' => 'Comenzile "$1" şi "$2" nu se potrivesc',
	'math_MisplacedLimits' => 'Comanda "$1" poate apărea doar după un operator math (utilizaţi "\\mathop")',
	'math_MissingCommandAfterNewcommand' => 'Nume de comandă lipsă sau nepermis după "\\newcommand" (trebuie să fie exact o comandă definită; trebuie să înceapă cu un backslash "\\" şi să conţină doar caractere alfabetice)',
	'math_MissingDelimiter' => 'Delimitator lipsă după "$1"',
	'math_MissingOpenBraceAfter' => 'Acoladă deschisă "{" lipsă după "$1"',
	'math_MissingOpenBraceAtEnd' => 'Acoladă deschisă "{" lipsă la sfârşitul intrării',
	'math_MissingOpenBraceBefore' => 'Acoladă dechisă "{" lipsă înainte de "$1"',
	'math_MissingOrIllegalParameterCount' => 'Număr de parametri lipsă sau nepermis în definiţia pentru "$1" (trebuie să fie doar o cifră între 1 şi 9 inclusiv)',
	'math_MissingOrIllegalParameterIndex' => 'Index de parametri lipsă sau nepermis în definiţia pentru "$1"',
	'math_NonAsciiInMathMode' => 'Caracterele non-ASCII pot fi folosite doar în modul text (încercaţi imbricarea caracterelor problemă în "\\text{...}")',
	'math_NotEnoughArguments' => 'Număr insuficient de argumente pentru "$1"',
	'math_PngIncompatibleCharacter' => 'Imposibil de generat PNG corect conţinând caracterul $1',
	'math_ReservedCommand' => 'Comanda "$1" este rezervată pentru uz intern de către blahtex',
	'math_SubstackRowTooBig' => 'Poate exista doar o intrare pe fiecare rând al unui bloc "substack"',
	'math_TooManyMathmlNodes' => 'Sunt prea multe noduri în arborele MathML',
	'math_TooManyTokens' => 'Intrarea este prea lungă',
	'math_UnavailableSymbolFontCombination' => 'Simbolul "$1" nu este disponibil în fontul "$2"',
	'math_UnexpectedNextCell' => 'Comanda "&" poate apărea doar în interiorul unui bloc "\\begin ... \\end"',
	'math_UnexpectedNextRow' => 'Comanda "\\\\" poate apărea doar în interiorul unui bloc "\\begin ... \\end"',
	'math_UnmatchedBegin' => 'S-a găsit "\\begin" fără "\\end" corespunzător',
	'math_UnmatchedCloseBrace' => 'S-a găsit acoladă închisă "}" fără acoladă deschisă "{" corespunzătoare',
	'math_UnmatchedEnd' => 'S-a găsit "\\end" fără "\\begin" corespunzător',
	'math_UnmatchedLeft' => 'S-a găsit "\\left" fără "\\right" corespunzător',
	'math_UnmatchedOpenBrace' => 'S-a găsit acoladă deschisă "}" fără acoladă închisă "{" corespunzătoare',
	'math_UnmatchedOpenBracket' => 'S-a găsit paranteză pătrată deschisă "[" fără paranteză pătrată închisă "]" corespunzătoare',
	'math_UnmatchedRight' => 'S-a găsit "\\right" fără "\\left" corespunzător',
	'math_UnrecognisedCommand' => 'Comanda "$1" necunoscută',
	'math_WrongFontEncoding' => 'Simbolul "$1" nu poate apărea în fontul "$2"',
	'math_WrongFontEncodingWithHint' => 'Simbolul "$1" nu poate apărea în fontul "$2" (încercaţi să folosiţi comanda "$3{...}")',
);

/** Russian (Русский)
 * @author Ahonc
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'math_noblahtex' => 'Невозможно запустить blahtex, его ожидаемое расположение: $1',
	'math-desc' => 'MathML-вывод для тега &lt;math&gt;',
	'math_AmbiguousInfix' => 'Неоднозначное расположение «$1» (попробуйте использовать дополнительные скобки «{ ... }» для разрешения неоднозначности)',
	'math_CannotChangeDirectory' => 'Невозможно изменить рабочую директорию',
	'math_CannotCreateTexFile' => 'Невозможно создать tex-файл',
	'math_CannotRunDvipng' => 'Невозможно запустить dvipng',
	'math_CannotRunLatex' => 'Невозможно запустить latex',
	'math_CannotWritePngDirectory' => 'Невозможно записать результат в выходную директорию PNG',
	'math_CannotWriteTexFile' => 'Невозможно записать в tex-файл',
	'math_CasesRowTooBig' => 'Могут быть только две записи в каждой строке блока «cases».',
	'math_DoubleSubscript' => 'Обнаружено два подстрочных элемента, присоединённых к одному основанию (может быть только один)',
	'math_DoubleSuperscript' => 'Обнаружено два надстрочных элемента, присоединённых к одному основанию (может быть только один)',
	'math_IllegalCharacter' => 'Запрещённый символ в исходных данных',
	'math_IllegalCommandInMathMode' => 'Команда «$1» запрещена в math-режиме',
	'math_IllegalCommandInMathModeWithHint' => 'Команда «$1» запрещена в math-режиме (возможно, следует использовать «$2» вместо неё)',
	'math_IllegalCommandInTextMode' => 'Команда «$1» запрещена в text-режиме',
	'math_IllegalCommandInTextModeWithHint' => 'Команда «$1» запрещена в text-режиме (возможно, следует использовать «$2» вместо неё)',
	'math_IllegalDelimiter' => 'Ошибочный разделитель после «$1»',
	'math_IllegalFinalBackslash' => 'Ошибочная обратная косая черта «\\» в конце входных данных',
	'math_IllegalNestedFontEncodings' => 'Команды установок шрифта не могут быть вложенными',
	'math_IllegalRedefinition' => 'Команда «$1» уже была определена, вы не можете переопределить её',
	'math_InvalidColour' => 'Цвет «$1» не является допустимым',
	'math_InvalidUtf8Input' => 'Входная строка не допустима по UTF-8',
	'math_LatexFontNotSpecified' => 'Не указан шрифт LaTeX для «$1»',
	'math_LatexPackageUnavailable' => 'Невозможно создать изображение PNG, так как недоступен LaTeX-пакет «$1»',
	'math_MismatchedBeginAndEnd' => 'Команды «$1» и «$2» не соответствуют',
	'math_MisplacedLimits' => 'Команда «$1» может использоваться только после оператора math (вероятно, следует использовать «\\mathop»)',
	'math_MissingCommandAfterNewcommand' => 'Отсутствует или неправильное название новой команды после "\\newcommand".
Должна быть определена только одна команда;
она должна начинаться со знака обратной косой черты и содержать только буквы.',
	'math_MissingDelimiter' => 'Отсутствует разделитель после «$1»',
	'math_MissingOpenBraceAfter' => 'Отсутствует открывающая скобка «{» после «$1»',
	'math_MissingOpenBraceAtEnd' => 'Отсутствует открывающая скобка «{» в конце входных данных',
	'math_MissingOpenBraceBefore' => 'Отсутствует открывающая скобка «{» перед «$1»',
	'math_MissingOrIllegalParameterCount' => 'Не указано или указано ошибочно число параметров в определении «$1»
(должна быть одна цифра от 1 до 9)',
	'math_MissingOrIllegalParameterIndex' => 'Не указан или указан ошибочно индекс параметра в определении «$1»',
	'math_NonAsciiInMathMode' => 'Не-ASCII символы могут использоваться только в text-режиме (попробуйте заключить такие символы в «\\text{...}»)',
	'math_NotEnoughArguments' => 'Не все аргументы были указаны для «$1»',
	'math_PngIncompatibleCharacter' => 'Невозможно правильно создать PNG, содержащий символ «$1»',
	'math_ReservedCommand' => 'Команда «$1» зарезервирована blahtex для внутреннего использования',
	'math_SubstackRowTooBig' => 'В каждой строке блока «substack» может быть только одна запись',
	'math_TooManyMathmlNodes' => 'Слишком много узлов в дереве MathML',
	'math_TooManyTokens' => 'Слишком большие входные данные',
	'math_UnavailableSymbolFontCombination' => 'В шрифте «$2» отсутствует символ «$1»',
	'math_UnexpectedNextCell' => 'Команда «&» может использоваться только внутри блока «\\begin ... \\end»',
	'math_UnexpectedNextRow' => 'Команда «\\\\» может использоваться только внутри блока «\\begin ... \\end»',
	'math_UnmatchedBegin' => 'Использование «\\begin» без соответствующего «\\end»',
	'math_UnmatchedCloseBrace' => 'Использование закрывающей фигурной скобки «}» без соответствующей открывающей «{»',
	'math_UnmatchedEnd' => 'Использование «\\end» без соответствующего «\\begin»',
	'math_UnmatchedLeft' => 'Использование «\\left» без соответствующего «\\right»',
	'math_UnmatchedOpenBrace' => 'Использование открывающей фигурной скобки «{» без соответствующей закрывающей «}»',
	'math_UnmatchedOpenBracket' => 'Использование открывающей квадратной скобки «[» без соответствующей закрывающей «]»',
	'math_UnmatchedRight' => 'Использование «\\right» без соответствующего «\\left»',
	'math_UnrecognisedCommand' => 'Команда «$1» не опознана',
	'math_WrongFontEncoding' => 'Символ «$1» не может использоваться в кодировке шрифта «$2»',
	'math_WrongFontEncodingWithHint' => 'Символ «$1» не может использоваться в кодировке шрифта «$2» (попробуйте использовать команду «$3{...}»)',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'math_noblahtex' => 'Nedá sa spustiť blahtex, ktorý by mal byť v $1',
	'math-desc' => 'MathML výstup značiek &lt;math&gt;',
	'math_AmbiguousInfix' => 'Nejednoznačné umiestnenie „$1“ (skúste použiť ďalšie zátvorky „{ ... }“ na rozlíšenie)',
	'math_CannotChangeDirectory' => 'Nedá sa zmeniť pracovný adresár',
	'math_CannotCreateTexFile' => 'Nedá sa vytvoriť tex súbor',
	'math_CannotRunDvipng' => 'Nedá sa spustiť dvipng',
	'math_CannotRunLatex' => 'Nedá sa spustiť latex',
	'math_CannotWritePngDirectory' => 'Nedá sa zapísať do výstupného adresár PNG',
	'math_CannotWriteTexFile' => 'Nedá sa zapísať do tex súboru',
	'math_CasesRowTooBig' => 'Môžu byť iba dva záznamy v každom riadku bloku „cases“',
	'math_DoubleSubscript' => 'Boli nájdené dva dolné indexy patriace k rovnakému základu (je povolený iba jeden)',
	'math_DoubleSuperscript' => 'Boli nájdené dva horné indexy patriace k rovnakému základu (je povolený iba jeden)',
	'math_IllegalCharacter' => 'Neplatný znak na vstupe',
	'math_IllegalCommandInMathMode' => 'Príkaz „$1“ nie je platný v matematickom režime',
	'math_IllegalCommandInMathModeWithHint' => 'Príkaz „$1“ nie je platný v matematickom režime (možno ste chceli namiesto neho použiť „$2“?)',
	'math_IllegalCommandInTextMode' => 'Príkaz „$1“ nie je platný v textovom režime',
	'math_IllegalCommandInTextModeWithHint' => 'Príkaz „$1“ nie je platný v textovom režime (možno ste chceli namiesto neho použiť „$2“?)',
	'math_IllegalDelimiter' => 'Neplatný oddeľovač za „$1“',
	'math_IllegalFinalBackslash' => 'Neplatná spätná lomka „\\“ na konci vstupu',
	'math_IllegalNestedFontEncodings' => 'Príkazy kódovania písma nemôžu byť vnorené',
	'math_IllegalRedefinition' => 'Príkaz „$1“ už bol definovaný; nemôžete ho predefinovať',
	'math_InvalidColour' => 'Farba „$1“ nie je platná',
	'math_InvalidUtf8Input' => 'Vstupný reťazec nebol platný UTF-8',
	'math_LatexFontNotSpecified' => 'Pre „$1“ nebolo uvedené písmo LaTeX',
	'math_LatexPackageUnavailable' => 'Nebolo možné vykresliť PNG, pretože balík LaTeXu „$1“ nie je dostupný',
	'math_MismatchedBeginAndEnd' => 'Príkazy „$1“ a „$2“ sa nezhodujú',
	'math_MisplacedLimits' => 'Príkaz „$1“ môže nasledovať iba za matematickým operátorok (zvážte použitie „\\mathop“)',
	'math_MissingCommandAfterNewcommand' => 'Chýbajúci alebo neplatný nový názov po príkaze „\\newcommand“ (musí byť definovaný práve jeden príkaz ;musí začínať spätnou lomkou „\\“ a obsahovať iba abecedné znaky)',
	'math_MissingDelimiter' => 'Chýba oddeľovač za „$1“',
	'math_MissingOpenBraceAfter' => 'Chýba otvárajúca zložená zátvorka „{“ za „$1“',
	'math_MissingOpenBraceAtEnd' => 'Chýba otvárajúca zložená zátvorka „{“ na konci vstupu',
	'math_MissingOpenBraceBefore' => 'Chýba otvárajúca zložená zátvorka „{“ pred „$1“',
	'math_MissingOrIllegalParameterCount' => 'Chýbajúci alebo neplatný počet parametrov v definícii „$1“ (musí byť jediná číslica medzi 1 a 9 vrátane)',
	'math_MissingOrIllegalParameterIndex' => 'Chýbajúci alebo neplatný počet parametrov v definícii „$1“',
	'math_NonAsciiInMathMode' => 'Ne-ASCII znaky je možné použiť iba v textovom režime (skúste uzavrieť problematické znaky do „\\text{...}“)',
	'math_NotEnoughArguments' => 'Nebol poskytnutý dostatok parametrov pre „$1“',
	'math_PngIncompatibleCharacter' => 'Nebolo možné správne vygenerovať PNG obsahujúce znak $1',
	'math_ReservedCommand' => 'Príkaz „$1“ je vyhradený pre vnútorné použitie blahtexom',
	'math_SubstackRowTooBig' => 'V každom riadku bloku „substack“ môže byť iba jeden záznam',
	'math_TooManyMathmlNodes' => 'V strome MathML je príliš veľa uzlov',
	'math_TooManyTokens' => 'Vstup je príliš dlhý',
	'math_UnavailableSymbolFontCombination' => 'Symbol „$1“ nie je dostupný v písme „$2“',
	'math_UnexpectedNextCell' => 'Príkaz „&“ sa môže vyskytovať iba vnútri bloku „\\begin ... \\end“',
	'math_UnexpectedNextRow' => 'Príkaz „\\\\“ sa môže vyskytovať iba vnútri bloku „\\begin ... \\end“',
	'math_UnmatchedBegin' => 'Vyskytol sa „\\begin“ bez zodpovedajúceho „\\end“',
	'math_UnmatchedCloseBrace' => 'Vyskytla sa zatvárajúca zložená zátvorka „}“ bez zodpovedajúcej otvárajúcej zloženej zátvorky „{“',
	'math_UnmatchedEnd' => 'Vyskytol sa „\\end“ bez zodpovedajúceho „\\begin“',
	'math_UnmatchedLeft' => 'Vyskytol sa „\\left“ bez zodpovedajúceho „\\right“',
	'math_UnmatchedOpenBrace' => 'Vyskytla sa otvárajúca zložená zátvorka „{“ bez zodpovedajúcej zatvárajúcej zloženej zátvorky „}“',
	'math_UnmatchedOpenBracket' => 'Vyskytla sa otvárajúca hranatá zátvorka „[“ bez zodpovedajúcej zatvárajúcej hranatej zátvorky „]“',
	'math_UnmatchedRight' => 'Vyskytol sa „\\right“ bez zodpovedajúceho „\\left“',
	'math_UnrecognisedCommand' => 'Nerozpoznaný príkaz „$1“',
	'math_WrongFontEncoding' => 'Symbol „$1“ sa nemôže nachádzať v kódovaní písma „$2“',
	'math_WrongFontEncodingWithHint' => 'Symbol „$1“ sa nemôže nachádzať v kódovaní písma „$2“ (skúste použiť príkaz „$3{...}“)',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Sasa Stefanovic
 */
$messages['sr-ec'] = array(
	'math_TooManyTokens' => 'Унос је превише дугачак',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'math_noblahtex' => 'Kon nit uutfiere blahtex, ju der ap $1 weese schuul',
	'math-desc' => 'MathML-Uutgoawe foar &lt;math&gt;-Tags',
	'math_AmbiguousInfix' => 'An disse Steede is „$1“ moortjuudich.
Fersäik wiedere swoangene Klammere „{ … }“ ientouföigjen, uum ju Iengoawe eentjuudich tou moakjen.',
	'math_CannotChangeDirectory' => 'Oarbaidsferteeknis kuud nit wikseld wäide',
	'math_CannotCreateTexFile' => 'tex-Doatäi kuud nit moaked wäide',
	'math_CannotRunDvipng' => 'dvipng kuud nit uutfierd wäide',
	'math_CannotRunLatex' => 'latex kuud nit uutfierd wäide',
	'math_CannotWritePngDirectory' => 'Dät PNG-Ferteeknis is nit beschrieuwboar',
	'math_CannotWriteTexFile' => 'Dät waas nit muugelk in ju tex-Doatäi tou schrieuwen',
	'math_CasesRowTooBig' => 'Dät kon pro Riege fon n "cases"-Blok bloot twäin Iendraage reeke',
	'math_DoubleSubscript' => 'Der koomen two Indices an dän glieke Basis foar.
Der duur bloot een Index weese.',
	'math_DoubleSuperscript' => 'Der koomen two Exponente an dän glieke Basis foar.
Der duur bloot een Exponent weese.',
	'math_IllegalCharacter' => 'Uungultich Teeken in ju Iengoawe',
	'math_IllegalCommandInMathMode' => 'In dän mathematisken Modus is ju Anwiesenge „$1“ nit ferlööwed',
	'math_IllegalCommandInMathModeWithHint' => 'In dän mathematiske Modus is ju Anwiesenge „$1“ nit ferlööwed.
Fielicht maist du „$2“ insteede deerfon ferweende?',
	'math_IllegalCommandInTextMode' => 'In dän Textmodus is ju Anwiesenge „$1“ nit ferlööwed',
	'math_IllegalCommandInTextModeWithHint' => 'In dän Textmodus is ju Anwiesenge „$1“ nit ferlööwed.
Fielicht maist du „$2“ insteede deerfon ferweende?',
	'math_IllegalDelimiter' => 'Uungultich Tränteeken bääte "$1"',
	'math_IllegalFinalBackslash' => 'Uungultigen Backslash „\\“ ap Eende fon ju Iengoawe',
	'math_IllegalNestedFontEncodings' => 'Teekenkodierengsanwiesengen konnen nit schachteld wäide',
	'math_IllegalRedefinition' => 'Ju Anwiesenge „$1“ wuud al definierd. Du koast se nit uurschrieuwe',
	'math_InvalidColour' => 'Ju Faawe „$1“ is nit gultich',
	'math_InvalidUtf8Input' => 'Ju Iengoawe is neen gultige UTF-8-Teekenkätte',
	'math_LatexFontNotSpecified' => 'Der wuud neen LaTeX-Schriftoard foar „$1” anroat',
	'math_LatexPackageUnavailable' => 'Ju PNG kuud nit moaked wäide, deeruum dät dät LaTeX-Paket „$1“ nit ferföigboar is',
	'math_MismatchedBeginAndEnd' => 'Ju eepenjende Anwiesenge „$1“ äntspräkt nit ju sluutende „$2“',
	'math_MisplacedLimits' => 'Ju Anwiesenge „$1“ kon bloot bääte n mathematisken Operator foarkuume.
Uurlääs et die „\\mathop“ tou ferweenden.',
	'math_MissingCommandAfterNewcommand' => 'Failjenden of uungultigen Befeelsnoome ätter "\\newcommand".
Der mout genau n Befeel definierd wäide;
hie mout mäd n uumekierden Scheeuwstriek (Backslash) "\\" ounfange un duur bloot alphabetiske Teekene änthoolde.',
	'math_MissingDelimiter' => 'Failjend Tränteeken bääte „$1“',
	'math_MissingOpenBraceAfter' => 'Eepenjende Klammer „{“ bääte „$1“ failt',
	'math_MissingOpenBraceAtEnd' => 'Eepenjende Klammer „{“ ap Eende fon ju Iengoawe failt',
	'math_MissingOpenBraceBefore' => 'Eepenjende Klammer „{“ foar „$1“ failt',
	'math_MissingOrIllegalParameterCount' => 'Failjende of uungultige Parametertaal in ju Definition fon „$1“.
Dät mout ne eenpelde Ziffer twiske iensluutend 1 un 9 weese.',
	'math_MissingOrIllegalParameterIndex' => 'Failjenden of falsken Parameterindex in ju Definition fon „$1“',
	'math_NonAsciiInMathMode' => 'Sunnerteekene (Nit-ASCII-Teekene) duuren bloot in dän Textmodus ferwoand wäide. 
Fersäik do problematiske Teekene in „\\text{…}“ ientousluuten.',
	'math_NotEnoughArguments' => 'Der wuuden nit genöigend Parametere foar „$1“ uurroat',
	'math_PngIncompatibleCharacter' => 'PNG mäd dät Teeken $1 kon nit failerfräi generierd wäide',
	'math_ReservedCommand' => 'Ju Anwiesenge „$1“ is foar ju interne Ferweendenge in blahtex reservierd',
	'math_SubstackRowTooBig' => 'Pro Riege fon n „substack“-Blok duur et aan Iendraach reeke',
	'math_TooManyMathmlNodes' => 'Die MathML-Feroarbaidengsboom änthaalt tou fuul Knätte',
	'math_TooManyTokens' => 'Ju Iengoawe is tou loang',
	'math_UnavailableSymbolFontCombination' => 'Dät Symbol „$1“ is in ju Schriftoard „$2“ nit foarhounden',
	'math_UnexpectedNextCell' => 'Ju Anwiesenge „&amp;“ kon bloot twiske in n „\\begin … \\block“-Blok stounde',
	'math_UnexpectedNextRow' => 'Ju Anwiesenge „\\\\“ kon bloot twiske in n „\\begin … \\block“-Blok stounde',
	'math_UnmatchedBegin' => '„\\begin“ sunner touheerend „\\end“',
	'math_UnmatchedCloseBrace' => 'Sluutende Klammer „}” sunner touheerige eepenjende Klammer „{”',
	'math_UnmatchedEnd' => '„\\end” sunner touheerich „\\begin”',
	'math_UnmatchedLeft' => '„\\left” sunner touheerich „\\right”',
	'math_UnmatchedOpenBrace' => 'Eepenjende Klammer „{” sunner touheerige sluutende Klammer „}”',
	'math_UnmatchedOpenBracket' => 'Eepenjende Klammer „[” sunner touheerige sluutende Klammer „]”',
	'math_UnmatchedRight' => '„\\right” sunner touheerich „\\left”',
	'math_UnrecognisedCommand' => 'Uunbekoande Anwiesenge „$1“',
	'math_WrongFontEncoding' => 'Dät Symbol „$1“ duur in ju Teekenkodierenge „$2“ nit foarkuume',
	'math_WrongFontEncodingWithHint' => 'Dät Symbol „$1“ duur in ju Teekenkodierenge „$2“ nit foarkuume. 
Probier ju Anwiesenge „$3{…}“ uut.',
);

/** Sundanese (Basa Sunda)
 * @author Kandar
 */
$messages['su'] = array(
	'math_noblahtex' => 'Teu bisa maréntah blahtex nu kuduna di $1',
	'math-desc' => 'Output MathML pikeun tag &lt;math&gt;',
	'math_AmbiguousInfix' => 'Tempat “$1” teu merenah.
Coba paké tambahan “{ ... }” pikeun disambiguasi.',
	'math_CannotChangeDirectory' => 'Teu bisa ngarobah diréktori nu dipaké',
	'math_CannotCreateTexFile' => 'Teu bisa nyieun koropak tex',
	'math_CannotRunDvipng' => 'Teu bisa ngajalankeun dvipng',
	'math_CannotRunLatex' => 'Teu bisa ngajalankeun latex',
	'math_CannotWritePngDirectory' => 'Teu bisa nulis ka diréktori PNG output',
	'math_CannotWriteTexFile' => 'Teu bisa nulis ka koropak tex',
	'math_DoubleSubscript' => 'Ngalaman dua subskrip napel kana dasar nu sarua. Nu diwidian ukur hiji.',
	'math_DoubleSuperscript' => 'Ngalaman dua superskrip napel kana dasar nu sarua. Nu diwidian ukur hiji.',
	'math_IllegalCharacter' => 'Karakter ilégal dina input',
	'math_IllegalCommandInMathMode' => 'Paréntah “$1” ilégal dina modeu math',
	'math_IllegalCommandInMathModeWithHint' => 'Paréntah “$1” ilégal dina modeu math.
Maksudna mah “$2” meureun?',
	'math_IllegalCommandInTextMode' => 'Paréntah “$1” ilégal dina modeu téks',
	'math_IllegalCommandInTextModeWithHint' => 'Paréntah “$1” ilégal dina modeu téks. Maksudna mah “$2” meureun?',
	'math_IllegalFinalBackslash' => "''Backslash'' “\\” ilégal dina tungtung input",
	'math_IllegalRedefinition' => 'Paréntah “$1” geus ditangtukeun, teu bisa diulang',
	'math_InvalidColour' => 'Kelir “$1” teu sah',
	'math_InvalidUtf8Input' => 'String input lain UTF-8 nu sah',
	'math_LatexFontNotSpecified' => 'Euweuh aksara LaTeX nu dipilih pikeun “$1”',
	'math_LatexPackageUnavailable' => 'Teu bisa milih PNG sabab pakét LaTeX “$1” euweuh',
	'math_MismatchedBeginAndEnd' => 'Paréntah “$1” jeung “$2” teu cocog',
	'math_MisplacedLimits' => 'Paréntah “$1” ngan bisa némbongan sanggeus hiji operator math.
Coba maké "\\mathop".',
	'math_MissingCommandAfterNewcommand' => 'Paréntah leungit atawa ilegal sanggeus "\\newcommand".
Sahanteuna kudu aya hiji paréntah nu bener;
dimimitian ku backslash "\\" sarta ngandung karakter alfabét wungkul.',
	'math_MissingOpenBraceAfter' => 'Kaleungitan kurawal buka “{” sanggeus “$1”',
	'math_MissingOpenBraceAtEnd' => 'Kaleungitan kurawal buka “{” dina tungtung input',
	'math_MissingOpenBraceBefore' => 'Kaleungitan kurawal buka “{” saméméh “$1”',
	'math_MissingOrIllegalParameterCount' => 'Angka paraméterna leungit atawa ilegal dina watesan "$1".
Eusi ku angka tunggal antara 1 jeung 9 wungkul.',
	'math_MissingOrIllegalParameterIndex' => 'Kaleungitan atawa paraméter ilégal dina watesan “$1”',
	'math_NonAsciiInMathMode' => 'Karakter non-ASCII ngan bisa dipaké dina modeu téks. Coba tuliskeun karakterna dina "\\text{...}".',
	'math_NotEnoughArguments' => 'Argumén pikeun "$1" kurang',
	'math_PngIncompatibleCharacter' => 'Teu bisa ngahasilkeun PNG nu bener nu ngandung karakter $1',
	'math_ReservedCommand' => 'Paréntah “$1” diajangkeun keur blahtex wungkul',
	'math_TooManyMathmlNodes' => 'Cabangna loba teuing dina tangkal MathML',
	'math_TooManyTokens' => 'Inputna panjang teuing',
	'math_UnavailableSymbolFontCombination' => 'Lambang “$1” mah euweuh dina aksara “$2”',
	'math_UnexpectedNextCell' => 'Paréntah “&” ngan bisa némbongan di jero blok “\\begin ... \\end”',
	'math_UnexpectedNextRow' => 'Paréntah “\\\\” ngan bisa némbongan di jero blok “\\begin ... \\end”',
	'math_UnmatchedBegin' => 'Ngalaman “\\begin” tanpa “\\end”',
	'math_UnmatchedCloseBrace' => 'Ngalaman kurawal tutup “}” tanpa kurawal buka “{”',
	'math_UnmatchedEnd' => 'Ngalaman “\\end” tanpa “\\begin”',
	'math_UnmatchedLeft' => 'Ngalaman “\\left” tanpa nyocogkeun “\\right”',
	'math_UnmatchedOpenBrace' => 'Ngalaman kurawal buka “{” tanpa kurawal tutup “}”',
	'math_UnmatchedOpenBracket' => 'Ngalaman kurung siku buka “[” tanpa kurung siki tutup “]”',
	'math_UnmatchedRight' => 'Ngalaman “\\right” tanpa nyocogkeun “\\left”',
	'math_UnrecognisedCommand' => 'Paréntah “$1” teu dipikawanoh',
	'math_WrongFontEncoding' => 'Lambang “$1” teu bisa némbongan dina aksara “$2”',
	'math_WrongFontEncodingWithHint' => 'Lambang “$1” teu bisa némbongan dina aksara “$2”.
Coba maké paréntah “$3{...}”.',
);

/** Swedish (Svenska)
 * @author Lejonel
 * @author M.M.S.
 */
$messages['sv'] = array(
	'math_noblahtex' => 'Kan inte köra blahtex, som borde finnas på $1',
	'math-desc' => 'MathML-resultat för &lt;math&gt;-taggar',
	'math_AmbiguousInfix' => 'Tvetydig placering av "$1" (försök att förtydliga genom att använda extra paranteser "{ ... }")',
	'math_CannotChangeDirectory' => 'Kan inte byta arbetskatalog',
	'math_CannotCreateTexFile' => 'Kan inte skapa tex-fil',
	'math_CannotRunDvipng' => 'Kan inte köra dvipng',
	'math_CannotRunLatex' => 'Kan inte köra latex',
	'math_CannotWritePngDirectory' => 'Kan inte skriva till katalogen för PNG-filer',
	'math_CannotWriteTexFile' => 'Kan inte skriva till tex-fil',
	'math_CasesRowTooBig' => 'Det kan bara finnas två element på varje rad i ett "cases"-block',
	'math_DoubleSubscript' => 'Hittade två index som är kopplade till samma bas (endast ett är tillåtet)',
	'math_DoubleSuperscript' => 'Hittade två exponenter som är kopplade till samma bas (endast en är tillåten)',
	'math_IllegalCharacter' => 'Otillåtet tecken i indata',
	'math_IllegalCommandInMathMode' => 'Kommandot "$1" är inte tillåtet i matematik-läge',
	'math_IllegalCommandInMathModeWithHint' => 'Kommandot "$1" är inte tillåtet i matematik-läge (du menade kanske "$2"?)',
	'math_IllegalCommandInTextMode' => 'Kommandot "$1" är inte tillåtet i text-läge',
	'math_IllegalCommandInTextModeWithHint' => 'Kommandot "$1" är inte tillåtet i text-läge (du menade kanske "$2"?)',
	'math_IllegalDelimiter' => 'Ogiltigt skiljetecken efter "$1"',
	'math_IllegalFinalBackslash' => 'Ogiltigt bakstreck "\\" i slutet av indata',
	'math_IllegalNestedFontEncodings' => 'Teckenkodningskommandon kan inte nästlas',
	'math_IllegalRedefinition' => 'Kommandot "$1" har redan definierats; du kan inte omdefiniera det',
	'math_InvalidColour' => 'Färgen "$1" är ogiltig',
	'math_InvalidUtf8Input' => 'Indata-strängen var inte giltig UTF-8',
	'math_LatexFontNotSpecified' => 'Inget LaTeX-teckensnitt har angivits för "$1"',
	'math_LatexPackageUnavailable' => 'Kunde inte skapa PNG eftersom LaTeX-paketet "$1" inte är tillgängligt',
	'math_MismatchedBeginAndEnd' => 'Kommandona "$1" och "$2" stämmer inte överens',
	'math_MisplacedLimits' => 'Kommandot "$1" kan endast förekomma efter en matematisk operator (överväg att använda "\\mathop")',
	'math_MissingCommandAfterNewcommand' => 'Saknat eller otillåtet nytt kommando efter "\\newcommand" (exakt ett kommando måste definieras; det måste börja med ett bakstreck, "\\", och endast innehålla bokstäver)',
	'math_MissingDelimiter' => 'Skiljetecken saknas efter "$1"',
	'math_MissingOpenBraceAfter' => 'Vänsterparantesen "{" saknas efter "$1"',
	'math_MissingOpenBraceAtEnd' => 'Vänsterparantesen "{" saknas vid slutet av indata',
	'math_MissingOpenBraceBefore' => 'Vänsterparentesen "{" saknas före "$1"',
	'math_MissingOrIllegalParameterCount' => 'Parameterantalet saknas eller är felaktigt i definitionen av "$1" (det måste vara en siffra från 1 till 9)',
	'math_MissingOrIllegalParameterIndex' => 'Saknat eller otillåtet parameterindex i definitionen av "$1"',
	'math_NonAsciiInMathMode' => 'Tecken som inte är i ASCII kan endast användas i text-läge (försök att omsluta de problematiska tecknen med "\\text{...}")',
	'math_NotEnoughArguments' => 'För få argument angavs för "$1"',
	'math_PngIncompatibleCharacter' => 'Kunde inte generera PNG med tecknet $1',
	'math_ReservedCommand' => 'Kommandot "$1" är reserverat för internt bruk av blahtex',
	'math_SubstackRowTooBig' => 'Det kan endast finnas ett element på varje rad i ett "substack"-block',
	'math_TooManyMathmlNodes' => 'Det är för många noder i MathML-trädet',
	'math_TooManyTokens' => 'Indata är för långt',
	'math_UnavailableSymbolFontCombination' => 'Symbolen "$1" är inte tillgänglig i teckensnittet "$2"',
	'math_UnexpectedNextCell' => 'Kommandot "&" kan endast användas inuti ett "\\begin ... \\end"-block',
	'math_UnexpectedNextRow' => 'Kommandot "\\\\" kan endast användas inuti ett "\\begin ... \\end"-block',
	'math_UnmatchedBegin' => 'Hittade "\\begin" utan motsvarande "\\end"',
	'math_UnmatchedCloseBrace' => 'Hittade högerparentesen "}" utan motsvarande vänsterparentesen "{"',
	'math_UnmatchedEnd' => 'Hittade "\\end" utan motsvarande "\\begin"',
	'math_UnmatchedLeft' => 'Hittade "\\left" utan motsvarande "\\right"',
	'math_UnmatchedOpenBrace' => 'Hittade vänsterparentesen "{" utan motsvarande högerparentesen "}"',
	'math_UnmatchedOpenBracket' => 'Hittade vänsterparentesen "[" utan motsvarande högerparentesen "]"',
	'math_UnmatchedRight' => 'Hittade "\\right" utan motsvarande "\\left"',
	'math_UnrecognisedCommand' => 'Okänt kommando "$1"',
	'math_WrongFontEncoding' => 'Symbolen "$1" kan inte visas i teckenkodningen "$2"',
	'math_WrongFontEncodingWithHint' => 'Symbolen "$1" kan inte framträda i teckenkodningen "$2" (pröva att använda "$3{...}" kommandot)',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'math_CannotCreateTexFile' => 'tex ఫైలు సృష్టించలేకున్నాం',
	'math_CannotRunDvipng' => 'dvipngని నడపలేకున్నాం',
	'math_CannotRunLatex' => 'latexని నడపలేకున్నాం',
	'math_IllegalRedefinition' => '"$1" అనే ఆదేశం ఈపాటికే నిర్వచించబడిందిచ మీరు దాన్నీ మళ్ళీ నిర్వచించలేరు',
	'math_InvalidColour' => '"$1" అనే రంగు సరైంది కాదు',
	'math_TooManyTokens' => 'ఇన్&zwnj;పుట్ మరీ పెద్దగా ఉంది',
	'math_UnavailableSymbolFontCombination' => '"$1" అనే గుర్తు "$2" ఫాంటులో లేదు.',
	'math_UnrecognisedCommand' => '"$1" అనేది గుర్తుతెలియని ఆదేశం',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'math_noblahtex' => 'Наметавон blahtex иҷро кард, чун он бояд дар $1 бошад',
	'math-desc' => 'Додаҳои хуруҷии MathML барои барчасбҳои &lt;math&gt;',
	'math_AmbiguousInfix' => 'Ҷойгиркунии нофаҳмои "$1".
Барои ибҳомзудоӣ кӯшиш кунед аз қафсҳои иловагии "{ ... }" истифода баред.',
	'math_CannotChangeDirectory' => 'Пӯшаи дар ҳоли корро наметавон тағйир дод',
	'math_CannotCreateTexFile' => 'Наметавон парвандаи tex эҷод кард',
	'math_CannotRunDvipng' => 'Наметавон dvipng-ро ба кор андохт',
	'math_CannotRunLatex' => 'Наметавон latex-ро ба кор андохт',
	'math_CannotWritePngDirectory' => 'Наметавон ба пӯшаи судури PNG навишт',
	'math_CannotWriteTexFile' => 'Наметавон ба парвандани tex навишт',
	'math_CasesRowTooBig' => 'Танҳо ду сабт дар ҳар сатри ҷаъбаи "маворид" бошад',
	'math_DoubleSubscript' => 'Бо ду зерскрипт пайваста ба як пойгоҳ бархӯрд.
Танҳо ба яке иҷозат аст.',
	'math_DoubleSuperscript' => 'Бо ду зерскрипт пайваста ба як пойгоҳ бархӯрд.
Танҳо ба яке иҷозат аст.',
	'math_IllegalCharacter' => 'Аломати ғайри миҷоз дар вуруди',
	'math_IllegalCommandInMathMode' => 'Фармони "$1"  дар тарзи риёзӣ ғайри миҷоз аст',
	'math_IllegalCommandInMathModeWithHint' => 'Фармони "$1" дар тарзи риёзӣ ғайри миҷоз аст
Шояд шумо мехостед баҷои он аз "$2" истифода баред?',
	'math_IllegalCommandInTextMode' => 'Фармони "$1"  дар тарзи матнӣ ғайри миҷоз аст',
	'math_IllegalCommandInTextModeWithHint' => 'Фармони "$1" дар тарзи матнӣ ғайри миҷоз аст
Шояд шумо мехостед баҷои он аз "$2" истифода баред?',
	'math_IllegalDelimiter' => 'Маҳдудкунандаи ғайри миҷоз баъд аз "$1"',
	'math_IllegalFinalBackslash' => 'Касри ғайри миҷоз "\\" дар охири вуруди',
	'math_IllegalNestedFontEncodings' => 'Фармонҳои рамзгузории ҳуруф наметавонад ошёнавӣ шавад',
	'math_IllegalRedefinition' => 'Фармони "$1" аллакай мушаххас шудааст; шумо наметавонед онро дубора мушаххас кунед',
	'math_InvalidColour' => 'Ранги "$1" номӯътабар аст',
	'math_InvalidUtf8Input' => 'Риштаи вуруди UTF-8-и мӯътабар нест',
	'math_LatexFontNotSpecified' => 'Ҳеҷ ҳуруфи LaTeX барои "$1" мушаххас нашудааст',
	'math_LatexPackageUnavailable' => 'Наметавон PNG-ро ироаъ дода чун бастаи LaTeX "$1" дастнорас аст',
	'math_MismatchedBeginAndEnd' => 'Фармонҳои "$1" ва "$2" рост намеоянд',
	'math_MisplacedLimits' => 'Фармони "$1" танҳо метавонад баъд аз амалгари риёзӣ намоён шавад.
Истифодаи "\\mathop" ба назар гиред.',
	'math_MissingCommandAfterNewcommand' => 'Номи фармони ҷадид баъд аз "\\newcommand" нопадид ё номӯътабар аст.
Дақиқан як фармон бояд мушаххас шавад;
он бояд бо каср шурӯъ шавад "\\" ва дорои танҳо аломатҳои алифбоӣ бошад.',
	'math_MissingDelimiter' => 'Маҳдудкунандаи нопадид баъд аз "$1"',
	'math_MissingOpenBraceAfter' => 'Қафси кушоди нопадид "{" баъд аз "$1"',
	'math_MissingOpenBraceAtEnd' => 'Қафси кушоди нопадид "{" дар охири вуруди',
	'math_MissingOpenBraceBefore' => 'Қафси кушоди нопадид "{" пеш аз "$1"',
	'math_MissingOrIllegalParameterCount' => 'Параметри шумори нопадид ё номӯътабар дар таърифи "$1".
Бояд адади шомили танхо байни 1 ва 9 бошад.',
	'math_MissingOrIllegalParameterIndex' => 'Параметри индекси гумшуда ё ғайримиҷоз дар таърифи "$1"',
	'math_NonAsciiInMathMode' => 'Аломатҳои ғайри-ASCII метавонанд танҳо дар тарзи матнӣ истифода шаванд
Ба миён гузоштани аломатҳои мушкил кӯшиш кунед "\\text{...}".',
	'math_NotEnoughArguments' => 'Мунозираи нокифоя барои "$1" пешниҳод шудааст',
	'math_PngIncompatibleCharacter' => 'Наметавон дурурст PNG-и аломати $1 доштаро тавлид кард',
	'math_ReservedCommand' => 'Фармони "$1" барои истифодаи дохилӣ тавассути blahtex банд карда шудааст',
	'math_SubstackRowTooBig' => 'Танҳо як мудохила метавонад дар ҳар қатори блоки "зертӯда" бошад',
	'math_TooManyMathmlNodes' => 'Теъдоди хеле зиёди гиреҳҳо дар шохаи MathML',
	'math_TooManyTokens' => 'Вуруди хеле дароз аст',
	'math_UnavailableSymbolFontCombination' => 'Аломати "$1" дар ҳуруфи "$2" дастрас нест',
	'math_UnexpectedNextCell' => 'Фармони "&" метавонад танҳо байни блоки "\\begin ... \\end" намоён шавад',
	'math_UnexpectedNextRow' => 'Фармони "\\\\" метавонад танҳо байни блоки "\\begin ... \\end" намоён шавад',
	'math_UnmatchedBegin' => 'Бархӯрд бо "\\begin" бидуни мутобиқат бо "\\end"',
	'math_UnmatchedCloseBrace' => 'Бархӯрд бо қафси пӯшида "}" бидуни мутобиқат бо қафси кушода "{"',
	'math_UnmatchedEnd' => 'Бархӯрд бо "\\end" бидуни мутобиқат бо "\\begin"',
	'math_UnmatchedLeft' => 'Бархӯрд бо "\\left" бидуни мутобиқат бо "\\right"',
	'math_UnmatchedOpenBrace' => 'Бархӯрд бо қафси кушод "{" бидуни мутобиқат бо қафси пӯшида "}"',
	'math_UnmatchedOpenBracket' => 'Бархӯрд бо қолаби кушод "[" бидуни мутобиқат бо қолаби пӯшида "]"',
	'math_UnmatchedRight' => 'Бархӯрд бо "\\right" бидуни мутобиқат бо "\\left',
	'math_UnrecognisedCommand' => 'Фармони ношиноси "$1"',
	'math_WrongFontEncoding' => 'Аломати "$1" наметавонад дар рамзгузории ҳуруфи "$2" намоён шавад',
	'math_WrongFontEncodingWithHint' => 'Аломати "$1" наметавонад дар рамзгузории ҳуруфи "$2" намоён шавад.
Ба истифодаи фармони "$3{...}" кӯшиш кунед.',
);

/** Thai (ไทย)
 * @author Passawuth
 */
$messages['th'] = array(
	'math_TooManyTokens' => 'สิ่งที่ใส่ลงไปยาวเกินกว่าที่ระบบจะรับได้',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'math_noblahtex' => 'Hindi maisakatuparan ang blahtex, na dapat na nasa $1',
	'math-desc' => 'Kinalabasang MathML para sa mga tatak na &lt;math&gt;',
	'math_AmbiguousInfix' => 'Alanganin ang pagkakalagay ng "$1".
Subuking gumamit ng dagdag na mga brakete "{ ... }" upang maging malinaw.',
	'math_CannotChangeDirectory' => 'Hindi mabago ang direktoryong panggawain',
	'math_CannotCreateTexFile' => 'Hindi malikha ang talaksang tex',
	'math_CannotRunDvipng' => 'Hindi mapaandar ang dvipng',
	'math_CannotRunLatex' => 'Hindi mapaandar ang latex',
	'math_CannotWritePngDirectory' => 'Hindi maisulat sa kinalabasang direktoryong PNG',
	'math_CannotWriteTexFile' => 'Hindi maisulat sa talaksang tex',
	'math_CasesRowTooBig' => 'Maaaring magkaroon lamang ng dalawang mga ipinasok sa loob ng bawat pahalang na hanay ng isang bloke ng "mga kaso"',
	'math_DoubleSubscript' => 'Nakatagpo ng dalawang pang-ibabang mga panitik na nakakabit sa magkaparehong pamulaan.
Isa lamang ang pinapahintulutan.',
	'math_DoubleSuperscript' => 'Nakatagpo ng dalawang pang-itaas na mga panitik na nakakabit sa magkaparehong pamulaan.
Isa lamang ang pinapahintulutan.',
	'math_IllegalCharacter' => 'May labag na panitik sa ipinasok',
	'math_IllegalCommandInMathMode' => 'Ang utos na "$1" ay labag sa modalidad na pangmatematika',
	'math_IllegalCommandInMathModeWithHint' => 'Ang utos na "$1" ay labag sa modalidad na pangmatematika
Marahil ang "$2" ang talagang binabalak mong gamitin?',
	'math_IllegalCommandInTextMode' => 'Ang utos na "$1" ay labag sa modalidad na pangteksto',
	'math_IllegalCommandInTextModeWithHint' => 'Ang utos na "$1" ay labag sa modalidad na pangteksto
Marahil ang "$2" ang talagang binabalak mong gamitin?',
	'math_IllegalDelimiter' => 'May labag na panghangga na sumusunod sa "$1"',
	'math_IllegalFinalBackslash' => 'May labag na bantas na pabalik-pahilis "\\" sa hulihan ng ipinasok',
	'math_IllegalNestedFontEncodings' => 'Ang mga kautusan sa pagsasakodigo ng uri ng titik ay maaaring hindi nakalangkay',
	'math_IllegalRedefinition' => 'Nabigyang kahulugan na ang kautusang "$1"; hindi mo na ito maaaring pakahuluganan pang muli',
	'math_InvalidColour' => 'Hindi tanggap ang kulay na "$1"',
	'math_InvalidUtf8Input' => 'Ang bagting na ipinasok ay hindi isang tanggap na UTF-8',
	'math_LatexFontNotSpecified' => 'Walang uri ng titik ng LaTeX na tinukoy para sa "$1"',
	'math_LatexPackageUnavailable' => 'Hindi nagawang ihain ang PNG dahil hindi makuha ang paketeng "$1" ng LaTeX',
	'math_MismatchedBeginAndEnd' => 'Hindi nagtutugma ang mga kautusang "$1" at "$2"',
	'math_MisplacedLimits' => 'Ang utos na "$1" ay maaaring lumitaw lamang pagkaraan ng tagapagpaandar (\'\'operator\'\') ng matematika.
Isaalang-alang ang paggamit ng "\\mathop".',
	'math_MissingCommandAfterNewcommand' => 'Nawawala o labag na pangalan ng bagong kautusan pagkaraan ng "\\newcommand".
Dapat na may tamang-tamang nag-iisang utos lamang na binibigyan ng kahulugan;
dapat itong magsimula na mayroong isang bantas na pabalik-pahilis "\\" at naglalaman lamang ng alpabetikong mga panitik.',
	'math_MissingDelimiter' => 'Kulang ng panghangga pagkaraan ng "$1"',
	'math_MissingOpenBraceAfter' => 'Kulang ng pambukas na brakete "{" pagkaraan ng "$1"',
	'math_MissingOpenBraceAtEnd' => 'Kulang ng pambukas na brakete "{" sa hulihan ng ipinasok',
	'math_MissingOpenBraceBefore' => 'Kulang ng pambukas na brakete "{" bago sumapit ang "$1"',
	'math_MissingOrIllegalParameterCount' => "Nawawala o labag na bilang ng parametro sa kahulugan ng \"\$1\".
Dapat na isahang tambilang (''digit'') sa pagitan ng 1 at 9 na kasama ang lahat at mga nabanggit.",
	'math_MissingOrIllegalParameterIndex' => 'Nawawala o labag na talatuntunan ng parametro sa kahulugan ng "$1"',
	'math_NonAsciiInMathMode' => 'Ang mga panitik na hindi ASCII ay maaaring gamitin lamang sa modalidad na pangteksto
Subuking ilakip ang suliraning mga panitik sa loob ng "\\text{...}".',
	'math_NotEnoughArguments' => 'Hindi sapat ang ibinigay na mga argumento o pangangatwiran para sa "$1"',
	'math_PngIncompatibleCharacter' => 'Hindi naging tama ang pagkakagawa ng PNG na naglalaman ng panitik na $1',
	'math_ReservedCommand' => 'Ang utos na "$1" ay nakalaan lamang para sa panloob na paggamit ng blahtex',
	'math_SubstackRowTooBig' => "Maaaring magkaroon lamang ng isang ipapasok sa loob ng bawat pahalang na hanay ng isang tipak ng \"kabahaging salansan\" (''substack'')",
	'math_TooManyMathmlNodes' => "Napakarami ng mga bugkol (''node'') sa loob ng puno ng MathML",
	'math_TooManyTokens' => 'Napakahaba ng ipinasok',
	'math_UnavailableSymbolFontCombination' => 'Ang sagisag na "$1" ay hindi makukuha mula sa uri ng titik na "$2"',
	'math_UnexpectedNextCell' => 'Ang kautusang "&" ay maaaring lumitaw lamang sa loob ng isang tipak ng "\\begin ... \\end"',
	'math_UnexpectedNextRow' => 'Ang kautusang "\\\\" ay maaaring lumitaw lamang sa loob ng isang tipak ng "\\begin ... \\end"',
	'math_UnmatchedBegin' => 'Nakatagpo ng "\\begin" na wala ang katugmang "\\end"',
	'math_UnmatchedCloseBrace' => 'Nakatagpo ng pansarang brakete "}" na wala ang katugmang pambukas na brakete "{"',
	'math_UnmatchedEnd' => 'Nakatagpo ng "\\end" na wala ang katugmang "\\begin"',
	'math_UnmatchedLeft' => 'Nakatagpo ng "\\left" na wala ang katugmang "\\right"',
	'math_UnmatchedOpenBrace' => 'Nakatagpo ng pambukas na brakete "{" na wala ang katugmang pansarang brakete "}"',
	'math_UnmatchedOpenBracket' => 'Nakatagpo ng pambukas na kasingay "[" na wala ang katugmang pansarang kasingay "]"',
	'math_UnmatchedRight' => 'Nakatagpo ng "\\right" na wala ang katugmang pansarang "\\left"',
	'math_UnrecognisedCommand' => 'Hindi nakikilalang utos ang "$1"',
	'math_WrongFontEncoding' => 'Ang sagisag na "$1" ay hindi maaaring lumitaw sa pagsasakodigong "$2" ng uri ng titik',
	'math_WrongFontEncodingWithHint' => 'Ang sagisag na "$1" ay hindi maaaring lumitaw sa pagsasakodigong "$2" ng uri ng titik.
Subuking gamitin ang "$3{...}" na kautusan.',
);

/** Ukrainian (Українська)
 * @author Ahonc
 */
$messages['uk'] = array(
	'math_noblahtex' => 'Неможливо запустити blahtex, його очікуване розташування: $1',
	'math-desc' => 'MathML-виведення для тегу &lt;math&gt;',
	'math_AmbiguousInfix' => "Неоднозначне розташування «$1» (спробуйте використати додаткові дужки «{ ... }» для розв'язання неоднозначності)",
	'math_CannotChangeDirectory' => 'Неможливо змінити робочу директорію',
	'math_CannotCreateTexFile' => 'Неможливо створити tex-файл',
	'math_CannotRunDvipng' => 'Неможливо запустити dvipng',
	'math_CannotRunLatex' => 'Неможливо запустити latex',
	'math_CannotWritePngDirectory' => 'Неможливо записати результат до вихідної директорії PNG',
	'math_CannotWriteTexFile' => 'Неможливо записати до tex-файлу',
	'math_CasesRowTooBig' => 'Можуть бути тільки два записи у кожному рядку блоку «cases».',
	'math_DoubleSubscript' => 'Виявлено два підрядкових елементи, приєднаних до однієї основи.
Може бути лише один.',
	'math_DoubleSuperscript' => 'Виявлено два надрядкових елементи, приєднаних до однієї основи.
Може бути лише один.',
	'math_IllegalCharacter' => 'Заборонений символ у вихідних даних',
	'math_IllegalCommandInMathMode' => 'Команда «$1» заборонена в math-режимі',
	'math_IllegalCommandInMathModeWithHint' => 'Команда «$1» заборонена в math-режимі
(можливо, слід використати «$2» замість неї)',
	'math_IllegalCommandInTextMode' => 'Команда «$1» заборонена в текстовому режимі',
	'math_IllegalCommandInTextModeWithHint' => 'Команда «$1» заборонена в текстовому режимі
(можливо, слід використати «$2» замість неї)',
	'math_IllegalDelimiter' => 'Помилковий роздільник після «$1»',
	'math_IllegalFinalBackslash' => 'Заборонений зворотний слеш «\\» в конці вхідних даних',
	'math_IllegalNestedFontEncodings' => 'Команди установок шрифту не можуть бути вкладеними',
	'math_IllegalRedefinition' => 'Команда «$1» вже була визначена, ви не можете перевизначити її',
	'math_InvalidColour' => 'Колір «$1» недопустимий',
	'math_InvalidUtf8Input' => 'Вхідний рядок недопустимий у UTF-8',
	'math_LatexFontNotSpecified' => 'Не зазначений шрифт LaTeX для «$1»',
	'math_LatexPackageUnavailable' => 'Неможливо створити зображення PNG, оскільки недоступний LaTeX-пакет «$1»',
	'math_MismatchedBeginAndEnd' => 'Команди «$1» і «$2» не відповідні',
	'math_MisplacedLimits' => 'Команда «$1» може використовуватися тільки після оператора math.
Імовірно, слід використовувати «\\mathop».',
	'math_MissingCommandAfterNewcommand' => 'Відсутня або неправильна назва нової команди після "\\newcommand".
Повинна бути визначена тільки одна команда;
вона повинна починатися зі зворотного слеша і містити тільки літери.',
	'math_MissingDelimiter' => 'Відсутній роздільник після «$1»',
	'math_MissingOpenBraceAfter' => 'Відсутня відкриваюча дужка «{» після «$1»',
	'math_MissingOpenBraceAtEnd' => 'Відсутня відкриваюча дужка «{» в кінці вхідних даних',
	'math_MissingOpenBraceBefore' => 'Відсутня відкриваюча дужка «{» перед «$1»',
	'math_MissingOrIllegalParameterCount' => 'Не зазначена або зазначена помилкова кількість параметрів у визначенні «$1».
Має бути одна цифра від 1 до 9.',
	'math_MissingOrIllegalParameterIndex' => 'Відсутній або неправильний індекс параметра у визначенні «$1»',
	'math_NonAsciiInMathMode' => 'Не-ASCII символи можуть використовуватися тільки в текстовому режимі
(спробуйте взяти такі символи в «\\text{...}»).',
	'math_NotEnoughArguments' => 'Не всі аргументи були зазначені для «$1»',
	'math_PngIncompatibleCharacter' => 'Неможливо правильно згенерувати PNG, що містить символ «$1»',
	'math_ReservedCommand' => 'Команда «$1» зарезервована blahtex для внутрішнього використання',
	'math_SubstackRowTooBig' => 'У кожному рядку блоку «substack» може бути тільки один запис',
	'math_TooManyMathmlNodes' => 'Дуже багато вузлів у дереві MathML',
	'math_TooManyTokens' => 'Дуже великі вхідні дані',
	'math_UnavailableSymbolFontCombination' => 'У шрифті «$2» відсутній символ «$1»',
	'math_UnexpectedNextCell' => 'Команда «&» може використовуватися тільки всередині блоку «\\begin ... \\end»',
	'math_UnexpectedNextRow' => 'Команда «\\\\» може використовуватися тільки всередині блоку «\\begin ... \\end»',
	'math_UnmatchedBegin' => 'Використання «\\begin» без відповідного «\\end»',
	'math_UnmatchedCloseBrace' => 'Використання закритої фігурної дужки «}» без відповідної відкритої «{»',
	'math_UnmatchedEnd' => 'Використання «\\end» без відповідного «\\begin»',
	'math_UnmatchedLeft' => 'Використання «\\left» без відповідного «\\right»',
	'math_UnmatchedOpenBrace' => 'Використання відкритої фігурної дужки «{» без відповідної закритої «}»',
	'math_UnmatchedOpenBracket' => 'Використання відкритої квадратної дужки «[» без без відповідної закритої «]»',
	'math_UnmatchedRight' => 'Використання «\\right» без відповідного «\\left»',
	'math_UnrecognisedCommand' => 'Команда «$1» не розпізнана',
	'math_WrongFontEncoding' => 'Символ «$1» не може використовуватися в кодуванні шрифту «$2»',
	'math_WrongFontEncodingWithHint' => 'Символ «$1» не може використовуватися в кодуванні шрифту «$2».
Спробуйте використати команду «$3{...}».',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'math_noblahtex' => 'Không thể thực thi blahtex, đáng ra phải ở $1',
	'math-desc' => 'Cho ra mã MathML khi gặp những thẻ &lt;math&gt;',
	'math_AmbiguousInfix' => 'Dùng "$1" gây khó hiểu (hãy thử dùng thêm dấu ngoặc móc "{ ... }" để rõ ràng hơn)',
	'math_CannotChangeDirectory' => 'Không thể thay đổi thư mục hiện hành',
	'math_CannotCreateTexFile' => 'Không thể tạo được tập tin tex',
	'math_CannotRunDvipng' => 'Không thể chạy dvipng',
	'math_CannotRunLatex' => 'Không thể chạy latex',
	'math_CannotWritePngDirectory' => 'Không thể ghi ra thư mục xuất PNG',
	'math_CannotWriteTexFile' => 'Không thể ghi ra tập tin tex',
	'math_CasesRowTooBig' => 'Chỉ có thể có hai mục ở mỗi hàng của khóa "cases"',
	'math_DoubleSubscript' => 'Tìm thấy hai chữ nhỏ phía dưới trên cùng một nền (chỉ cho phép một)',
	'math_DoubleSuperscript' => 'Tìm thấy hai chữ nhỏ phía trên trên cùng một nền (chỉ cho phép một)',
	'math_IllegalCharacter' => 'Ký tự nhập vào không hợp lệ',
	'math_IllegalCommandInMathMode' => 'Lệnh "$1" không hợp lệ trong chế độ toán học',
	'math_IllegalCommandInMathModeWithHint' => 'Lệnh "$1" không hợp lệ trong chế độ toán học (chắc bạn đang định dùng "$2"?)',
	'math_IllegalCommandInTextMode' => 'Lệnh "$1" không hợp lệ trong chế độ văn bản',
	'math_IllegalCommandInTextModeWithHint' => 'Lệnh "$1" không hợp lệ trong chế độ văn bản (chắc bạn đang định dùng "$2"?)',
	'math_IllegalDelimiter' => 'Dấu giới hạn theo sau "$1" không hợp lệ',
	'math_IllegalFinalBackslash' => 'Dấu xuyệt ngược "\\" không hợp lệ ở cuối dòng nhập',
	'math_IllegalNestedFontEncodings' => 'Lệnh mã hóa phông chữ không thể lồng nhau',
	'math_IllegalRedefinition' => 'Lệnh "$1" đã được định nghĩa; bạn không thể định nghĩa lại',
	'math_InvalidColour' => 'Màu "$1" không hợp lệ',
	'math_InvalidUtf8Input' => 'Chuỗi nhập không phải là UTF-8 hợp lệ',
	'math_LatexFontNotSpecified' => 'Không tìm thấy phông LaTeX cho "$1"',
	'math_LatexPackageUnavailable' => 'Không thể tạo PNG vì không có gói LaTeX "$1"',
	'math_MismatchedBeginAndEnd' => 'Lệnh “$1” và “$2” không khớp',
	'math_MisplacedLimits' => 'Lệnh "$1" chỉ có thể xuất hiện sau toán tử (xem xét việc sử dụng "\\mathop")',
	'math_MissingCommandAfterNewcommand' => 'Tên lệnh mới sau "\\newcommand" thiếu hoặc không hợp lệ (phải có chính xác một lệnh được định nghĩa; nó phải bắt đầu bằng dấu "\\" và chỉ chứa ký tự)',
	'math_MissingDelimiter' => 'Thiếu dấu giới hạn sau "$1"',
	'math_MissingOpenBraceAfter' => 'Thiếu mở ngoặc “{” sau “$1”',
	'math_MissingOpenBraceAtEnd' => 'Thiếu mở ngoặc “{” ở phía cuối dòng nhập',
	'math_MissingOpenBraceBefore' => 'Thiếu mở ngoặc “{” trước “$1”',
	'math_MissingOrIllegalParameterCount' => 'Số tham số bị thiếu hoặc không hợp lệ trong định nghĩa "$1" (phải là một con số từ 1 đến 9)',
	'math_MissingOrIllegalParameterIndex' => 'Chỉ số tham số bị thiếu hoặc không hợp lệ trong định nghĩa "$1"',
	'math_NonAsciiInMathMode' => 'Ký tự không phải ASCII chỉ được dùng trong chế độ văn bản (hãy thử đóng ký tự có vấn đề trong \\text{...}")',
	'math_NotEnoughArguments' => 'Không cung cấp đủ tham số trong "$1"',
	'math_PngIncompatibleCharacter' => 'Không thể tạo được PNG đúng đắn có chứa ký tự $1',
	'math_ReservedCommand' => 'Lệnh "$1" được bảo lưu để blahtex dùng nội bộ',
	'math_SubstackRowTooBig' => 'Chỉ có thể có một mục tại mỗi hàng của khóa "substack"',
	'math_TooManyMathmlNodes' => 'Có quá nhiều nút trong cây MathML',
	'math_TooManyTokens' => 'Dữ liệu nhập quá dài',
	'math_UnavailableSymbolFontCombination' => 'Ký hiệu "$1" không có trong phông chữ "$2"',
	'math_UnexpectedNextCell' => 'Lệnh "&" chỉ có thể xuất hiện bên trong khóa "\\begin ... \\end"',
	'math_UnexpectedNextRow' => 'Lệnh "\\\\" chỉ có thể xuất hiện bên trong khóa "\\begin ... \\end"',
	'math_UnmatchedBegin' => 'Tìm thấy "\\begin" mà không thấy "\\end" tương ứng',
	'math_UnmatchedCloseBrace' => 'Tìm thấy dấu đóng ngoặc "}" mà không thấy dấu mở ngoặc "{" tương ứng',
	'math_UnmatchedEnd' => 'Tìm thấy "\\end" mà không thấy "\\begin" tương ứng',
	'math_UnmatchedLeft' => 'Tìm thấy "\\left" mà không thấy "\\right" tương ứng',
	'math_UnmatchedOpenBrace' => 'Tìm thấy dấu mở ngoặc "{" mà không thấy dấu đóng ngoặc "}" tương ứng',
	'math_UnmatchedOpenBracket' => 'Tìm thấy dấu mở ngoặc "[" mà không thấy dấu đóng ngoặc "]" tương ứng',
	'math_UnmatchedRight' => 'Tìm thấy "\\right" mà không thấy "\\left" tương ứng',
	'math_UnrecognisedCommand' => 'Không hiểu lệnh "$1"',
	'math_WrongFontEncoding' => 'Ký hiệu "$1" không xuất hiện trong phông chữ mã hóa "$2"',
	'math_WrongFontEncodingWithHint' => 'Ký hiệu "$1" không xuất hiện trong phông chữ mã hóa "$2" (thử dùng lệnh "$3{...}")',
);

/** Volapük (Volapük)
 * @author Smeira
 */
$messages['vo'] = array(
	'math_CannotChangeDirectory' => 'Vobaragiviär no kanon pavotükön',
	'math_CannotCreateTexFile' => 'Ragiv fomätü tex no kanon pajafön',
	'math_InvalidColour' => 'Köl: „$1“ no lonöfon',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gzdavidwong
 */
$messages['zh-hans'] = array(
	'math_TooManyTokens' => '输入过长',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'math_TooManyTokens' => '輸入過長',
);

