<?php
$messages = array();

/** English
 * @author Nimish Gautam
 * @author Sam Reed
 * @author Brandon Harris
 */
$messages['en'] = array(
	'articlefeedback' => 'Article Feedback',
	'articlefeedback-desc' => 'Article Feedback',
	'articlefeedback-yourfeedback' => 'Your feedback',
	'articlefeedback-pleaserate' => 'Please take a moment to rate this page below.',
	'articlefeedback-submit' => 'Submit',
	'articlefeedback-rating-wellsourced' => 'Well-Sourced:',
	'articlefeedback-rating-neutrality' => 'Neutral:',
	'articlefeedback-rating-completeness' => 'Complete:',
	'articlefeedback-rating-readability' => 'Readable:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Do you feel this page has sufficient citations and that those citations come from trustworthy sources?',
	'articlefeedback-rating-neutrality-tooltip' => 'Do you feel that this page shows a fair representation of all perspectives on the issue?',
	'articlefeedback-rating-completeness-tooltip' => 'Do you feel that this page covers the essential topic areas that it should?',
	'articlefeedback-rating-readability-tooltip' => 'Do you feel that this page is well-organized and well written?',
	'articlefeedback-articlerating' => 'Page rating',
	'articlefeedback-error' => 'An error has occurred.
Please try again later.',
	'articlefeedback-thanks' => 'Thanks! Your ratings have been saved.',
	'articlefeedback-featurefeedback' => 'Give us <span class="feedbacklink">feedback</span> about this feature.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|rating|ratings}})',
	'articlefeedback-stalemessage-norevisioncount' => "This page has been ''revised'' since you last reviewed it.
You may wish to rate it again.",
	'articlefeedback-results-show' => '(Results hidden. <span class="showlink">Show</span> them.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Hide results</span>)',
	'articlefeedback-survey-question-whyrated' => 'Please let us know why you rated this page today (check all that apply):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'I wanted to contribute to the overall rating of the page',
	'articlefeedback-survey-answer-whyrated-development' => 'I hope that my rating would positively affect the development of the page',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'I wanted to contribute to {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'I like sharing my opinion',
	'articlefeedback-survey-answer-whyrated-didntrate' => "I didn't provide ratings today, but wanted to give feedback on the feature",
	'articlefeedback-survey-answer-whyrated-other' => 'Other',
	'articlefeedback-survey-question-useful' => 'Do you believe the ratings provided are useful and clear?',
	'articlefeedback-survey-question-useful-iffalse' => 'Why?',
	'articlefeedback-survey-question-expert' => 'Do you consider yourself an expert in the field this page covers?',
	'articlefeedback-survey-question-expert-iftrue' => 'Can you describe your expertise?',
	'articlefeedback-survey-question-comments' => 'Do you have any additional comments?',
	'articlefeedback-survey-submit' => 'Submit',
	'articlefeedback-survey-title' => 'Please answer a few questions',
	'articlefeedback-survey-thanks' => 'Thanks for filling out the survey.',
);

/** Message documentation (Message documentation)
 * @author Brandon Harris
 * @author EugeneZelenko
 * @author Sam Reed
 */
$messages['qqq'] = array(
	'articlefeedback' => 'The title of the feature. It is about reader feedback.
	
Please visit http://prototype.wikimedia.org/articleassess/Main_Page for a prototype installation.',
	'articlefeedback-desc' => '{{desc}}',
	'articlefeedback-yourfeedback' => 'This is a box or section header.  It indicates that the contents of the box are personal to the user.',
	'articlefeedback-pleaserate' => 'This is a call to action for the user to provide their ratings about the page.',
	'articlefeedback-submit' => '{{Identical|Submit}}',
	'articlefeedback-rating-wellsourced' => 'This is a rating metric label. The metric is for measuring how researched the article is.',
	'articlefeedback-rating-neutrality' => "This is a rating metric label. The metric is for measuring an article's NPOV.",
	'articlefeedback-rating-completeness' => 'This is a rating metric label. The metric is for measuring how comprehensive the article is.',
	'articlefeedback-rating-readability' => 'This is a rating metric label. The metric is for measuring how well written the article is.',
	'articlefeedback-rating-wellsourced-tooltip' => 'This is a tool tip that is designed to explain what the "well-sourced" metric means.',
	'articlefeedback-rating-neutrality-tooltip' => 'This is a tool tip that is designed to explain what the "neutrality" metric means.',
	'articlefeedback-rating-completeness-tooltip' => 'This is a tool tip that is designed to explain what the "completeness" metric means.',
	'articlefeedback-rating-readability-tooltip' => 'This is a tool tip that is designed to explain what the "readability" metric means.',
	'articlefeedback-articlerating' => 'This is a box or section header. It indicates that the contents of the box are the average ratings for the article.',
	'articlefeedback-error' => 'A generic error message to display on any error.',
	'articlefeedback-thanks' => 'The message to display when the user has successfully submitted a rating.',
	'articlefeedback-featurefeedback' => 'This is a call to action link for users to provide feedback about the feature.  It takes them to a survey.',
	'articlefeedback-noratings' => 'This indicates the number of ratings that the article has received.
Note that PLURAL does not currently work in this message but defaults to the zero; it will work properly in the near future, so keep the calls in.',
	'articlefeedback-stalemessage-norevisioncount' => 'This is a message shown to the user when their ratings are "stale" and does NOT include the number of revisions. This is an ambiguous reason, and allows for us to have complicated staleness patterns. This is the preferred message.',
	'articlefeedback-results-show' => 'This is an explanatory control that, when clicked, will display hidden aggregate ratings.
The span tag gets rewritten in JavaScript to become a link.',
	'articlefeedback-results-hide' => 'This is a control that, when clicked, will hide the aggregate ratings.
The span tag gets rewritten in JavaScript to become a link.',
	'articlefeedback-survey-question-whyrated' => 'This is a question in the survey with checkboxes for the answers. The user can check multiple answers.',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articlefeedback-survey-answer-whyrated-development' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articlefeedback-survey-answer-whyrated-other' => 'This is a possible answer for the "Why did you rate this article today?" survey question. The user can check this to fill out an answer that wasn\'t provided as a checkbox.
{{Identical|Other}}',
	'articlefeedback-survey-question-useful' => 'This is a question in the survey with "yes" and "no" (prefswitch-survey-true and prefswitch-survey-false) as possible answers.',
	'articlefeedback-survey-question-useful-iffalse' => 'This question appears when the user checks "no" for the "Do you believe the ratings provided are useful and clear?" question. The user can enter their answer in a text box.',
	'articlefeedback-survey-question-expert' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articlefeedback-survey-question-expert-iftrue' => 'This question appears when the user checks "no" for the "Do you consider yourself an expert?" question. The user can enter their answer in a text box.',
	'articlefeedback-survey-question-comments' => 'This is a question in the survey with a text box that the user can enter their answer in.',
	'articlefeedback-survey-submit' => 'This is the caption for the button that submits the survey.
{{Identical|Submit}}',
	'articlefeedback-survey-title' => 'This text appears in the title bar of the survey dialog.',
	'articlefeedback-survey-thanks' => 'This text appears when the user has successfully submitted the survey.',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'articlefeedback' => 'Bladsybeoordeling',
	'articlefeedback-yourfeedback' => 'U terugvoer',
	'articlefeedback-submit' => 'Dien in',
	'articlefeedback-rating-wellsourced' => 'Goed van bronne voorsien:',
	'articlefeedback-rating-neutrality' => 'Neutraal:',
	'articlefeedback-rating-completeness' => 'Volledig:',
	'articlefeedback-rating-readability' => 'Leesbaar:',
	'articlefeedback-articlerating' => 'Artikel gradering',
	'articlefeedback-error' => "'n Fout het voorgekom. 
Probeer asseblief later weer.",
	'articlefeedback-thanks' => 'Dankie! U graderings is gestoor.',
	'articlefeedback-featurefeedback' => 'Gee ons <span class="feedbacklink">terugvoer</span> oor hierdie funksie.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|beoordeling|beoordelings}})',
	'articlefeedback-results-show' => '(Resultate versteek. <span class="showlink">Wys</span> hulle.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Versteek resultate</span>)',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Ek wil bydrae tot {{site name}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Ek hou daarvan om my mening te deel',
	'articlefeedback-survey-answer-whyrated-other' => 'Ander',
	'articlefeedback-survey-question-useful-iffalse' => 'Hoekom?',
	'articlefeedback-survey-question-expert-iftrue' => 'Kan u u ondervinding beskryf?',
	'articlefeedback-survey-question-comments' => 'Het u enige addisionele kommentaar?',
	'articlefeedback-survey-submit' => 'Dien in',
	'articlefeedback-survey-title' => "Antwoord asseblief 'n paar vrae",
	'articlefeedback-survey-thanks' => 'Dankie dat u die opname ingevul het.',
);

/** Aramaic (ܐܪܡܝܐ)
 * @author Basharh
 */
$messages['arc'] = array(
	'articlefeedback-submit' => 'ܫܕܪ',
	'articlefeedback-survey-answer-whyrated-other' => 'ܐܚܪܢܐ',
	'articlefeedback-survey-question-useful-iffalse' => 'ܠܡܢܐ?',
	'articlefeedback-survey-submit' => 'ܫܕܪ',
);

/** Bashkir (Башҡорт)
 * @author Assele
 */
$messages['ba'] = array(
	'articlefeedback' => 'Мәҡәләне баһалау',
	'articlefeedback-desc' => 'Мәҡәләне баһалау (һынау өсөн)',
	'articlefeedback-yourfeedback' => 'Һеҙҙең баһаламағыҙ',
	'articlefeedback-pleaserate' => 'Зинһар, был мәҡәләне баһалар өсөн бер генә минут ваҡытығыҙҙы бүлегеҙ.',
	'articlefeedback-submit' => 'Ебәрергә',
	'articlefeedback-rating-wellsourced' => 'Сығанаҡтар:',
	'articlefeedback-rating-neutrality' => 'Битарафлыҡ:',
	'articlefeedback-rating-completeness' => 'Тулылыҡ:',
	'articlefeedback-rating-readability' => 'Уҡымлылыҡ:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Һеҙ был биттә етәрлек сығанаҡтар бар һәм сығанаҡтар ышаныслы, тип һанайһығыҙмы?',
	'articlefeedback-rating-neutrality-tooltip' => 'Һеҙ был бит ҡағылған һорау буйынса бөтә фекерҙәрҙе лә ғәҙел сағылдыра, тип һанайһығыҙмы?',
	'articlefeedback-rating-completeness-tooltip' => 'Һеҙ был бит төп һорауҙарҙы етәрлек кимәлдә аса, тип һанайһығыҙмы?',
	'articlefeedback-rating-readability-tooltip' => 'Һеҙ был бит яҡшы ойошторолған һәм яҡшы яҙылған, тип һанайһығыҙмы?',
	'articlefeedback-articlerating' => 'Бит баһаһы',
	'articlefeedback-error' => 'Хата килеп сыҡты.
Зинһар, һуңынан ҡабатлап ҡарағыҙ.',
	'articlefeedback-thanks' => 'Рәхмәт! Һеҙҙең баһағыҙ һаҡланды.',
	'articlefeedback-featurefeedback' => 'Был мөмкинлек тураһында <span class="feedbacklink">үҙ фекерегеҙҙе</span> беҙгә ебәрегеҙ.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|баһа}})',
	'articlefeedback-stalemessage-norevisioncount' => "Был бит һеҙ ҡарап сыҡҡандан һуң ''мөхәррирләнгән''.
Һеҙ уны яңынан баһалай алаһығыҙ.",
	'articlefeedback-results-show' => '(Һөҙөмтәләр йәшерелгән. <span class="showlink">Күрһәтергә</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Һөҙөмтәләрҙе йәшерергә</span>)',
	'articlefeedback-survey-question-whyrated' => 'Зинһар, ниңә һеҙ бөгөн был биткә баһа биреүегеҙҙе беҙгә белгертегеҙ (бөтә тап килгән яуаптарҙы билдәләгеҙ):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Минең был биттең дөйөм баһаһына өлөш индергем килде.',
	'articlefeedback-survey-answer-whyrated-development' => 'Минең баһам был биттең үҫешенә ыңғай йоғонто яһар, тип өмөт итәм.',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Минең {{SITENAME}} проектына өлөш индергем килде.',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Мин үҙ фекерем менән бүлешергә ярятам',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Бин бөгөн баһа ҡуйманым, әммә был мөмкинлек тураһында үҙ фекеремде ҡалдырырға теләйем',
	'articlefeedback-survey-answer-whyrated-other' => 'Башҡа',
	'articlefeedback-survey-question-useful' => 'Ҡуйылған баһалар файҙалы һәм аңлайышлы, тип иҫәпләйһегеҙме?',
	'articlefeedback-survey-question-useful-iffalse' => 'Ниңә?',
	'articlefeedback-survey-question-expert' => 'Һеҙ үҙегеҙҙе был бит ҡағылған өлкәлә белгес тип иҫәпләйһегеҙме?',
	'articlefeedback-survey-question-expert-iftrue' => 'Һеҙ үҙегеҙҙең баһағыҙҙы тасуирлай алаһығыҙмы?',
	'articlefeedback-survey-question-comments' => 'Һеҙҙең берәй төрлө өҫтәмә иҫкәрмәләрегеҙ бармы?',
	'articlefeedback-survey-submit' => 'Ебәрергә',
	'articlefeedback-survey-title' => 'Зинһар, бер нисә һорауға яуап бирегеҙ',
	'articlefeedback-survey-thanks' => 'Һорауҙарға яуап биреүегеҙ өсөн рәхмәт.',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 */
$messages['be-tarask'] = array(
	'articlefeedback' => 'Адзнака артыкулаў',
	'articlefeedback-desc' => 'Адзнака артыкулаў (пачатковая вэрсія)',
	'articlefeedback-yourfeedback' => 'Ваш водгук',
	'articlefeedback-pleaserate' => 'Калі ласка, знайдзіце час, каб адзначыць старонку ўнізе.',
	'articlefeedback-submit' => 'Даслаць',
	'articlefeedback-rating-wellsourced' => 'Спасылкі на крыніцы:',
	'articlefeedback-rating-neutrality' => 'Нэўтральнасьць:',
	'articlefeedback-rating-completeness' => 'Скончанасьць:',
	'articlefeedback-rating-readability' => 'Лёгкасьць чытаньня:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Вы лічыце, што гэты артыкул мае дастаткова цытатаў, і яны спасылаюцца на крыніцы, якія заслугоўваюць даверу?',
	'articlefeedback-rating-neutrality-tooltip' => 'Вы лічыце, што на гэтай старонцы адлюстраваныя усе пункты гледжаньня на пытаньне?',
	'articlefeedback-rating-completeness-tooltip' => 'Вы лічыце, што гэтая старонка раскрывае асноўныя пытаньні тэмы як сьлед?',
	'articlefeedback-rating-readability-tooltip' => 'Вы лічыце, што гэтая старонка добра арганізаваная і добра напісаная?',
	'articlefeedback-articlerating' => 'Адзнака старонкі',
	'articlefeedback-error' => 'Узьнікла памылка.
Калі ласка, паспрабуйце потым.',
	'articlefeedback-thanks' => 'Дзякуй! Вашая адзнака была захаваная.',
	'articlefeedback-featurefeedback' => 'Паведаміце нам <span class="feedbacklink">Вашае меркаваньне</span> пра гэтую магчымасьць.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|адзнака|адзнакі|адзнакаў}})',
	'articlefeedback-stalemessage-norevisioncount' => "Гэтая старонка была ''рэдагаваная'' пасьля Вашага апошняга рэцэнзаваная.
Верагодна, Вы жадаеце адзначыць яе яшчэ раз.",
	'articlefeedback-results-show' => '(Вынікі схаваныя. <span class="showlink">Паказаць</span> іх.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Схаваць вынікі</span>)',
	'articlefeedback-survey-question-whyrated' => 'Калі ласка, паведаміце нам, чаму Вы адзначылі сёньня гэтую старонку (пазначце ўсе падыходзячыя варыянты):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Я жадаю зрабіць унёсак у агульную адзнаку старонкі',
	'articlefeedback-survey-answer-whyrated-development' => 'Я спадзяюся, што мая адзнака пазытыўна паўплывае на разьвіцьцё старонкі',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Я жадаю садзейнічаць разьвіцьцю {{GRAMMAR:родны|{{SITENAME}}}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Я жадаю падзяліцца маім пунктам гледжаньня',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Я не адзначыў сёньня, але хацеў даць водгук пра гэтую магчымасьць',
	'articlefeedback-survey-answer-whyrated-other' => 'Іншае',
	'articlefeedback-survey-question-useful' => 'Вы верыце, што пададзеныя адзнакі карысныя і зразумелыя?',
	'articlefeedback-survey-question-useful-iffalse' => 'Чаму?',
	'articlefeedback-survey-question-expert' => 'Вы лічыце сябе экспэртам у галіне, якая датычыцца тэма гэтай старонцы?',
	'articlefeedback-survey-question-expert-iftrue' => 'Вы можаце апісаць узровень Вашых ведаў?',
	'articlefeedback-survey-question-comments' => 'Вы маеце якія-небудзь дадатковыя камэнтары?',
	'articlefeedback-survey-submit' => 'Даслаць',
	'articlefeedback-survey-title' => 'Калі ласка, адкажыце на некалькі пытаньняў',
	'articlefeedback-survey-thanks' => 'Дзякуй за адказы на пытаньні.',
);

/** Bulgarian (Български)
 * @author Turin
 */
$messages['bg'] = array(
	'articlefeedback-submit' => 'Изпращане',
	'articlefeedback-articlerating' => 'Оценка на страницата',
	'articlefeedback-error' => 'Възникна грешка. 
Опитайте по-късно.',
	'articlefeedback-thanks' => 'Благодарим ви! Вашите оценки са записани.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|оценка|оценки}})',
	'articlefeedback-results-show' => '(Резултатите се скрити. <span class="showlink">Показване</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Скриване на резултатите</span>)',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Исках да допринеса за общата оценка на страницата',
	'articlefeedback-survey-answer-whyrated-development' => 'Надявам се, че оценката ми ще се отрази положително върху развитието на страницата',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Исках да допринеса за {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Харесва ми да споделям мнението си',
	'articlefeedback-survey-answer-whyrated-other' => 'Друго',
	'articlefeedback-survey-question-useful-iffalse' => 'Защо?',
	'articlefeedback-survey-question-comments' => 'Имате ли някакви допълнителни коментари?',
	'articlefeedback-survey-submit' => 'Изпращане',
	'articlefeedback-survey-title' => 'Моля, отговорете на няколко въпроса',
	'articlefeedback-survey-thanks' => 'Благодарим ви, че попълнихте въпросника!',
);

/** Breton (Brezhoneg)
 * @author Gwendal
 * @author Y-M D
 */
$messages['br'] = array(
	'articlefeedback' => 'Priziadenn pennadoù',
	'articlefeedback-desc' => 'Priziadenn pennadoù (stumm stur)',
	'articlefeedback-yourfeedback' => 'Ho soñjoù',
	'articlefeedback-pleaserate' => 'Trugarez da gemer amzer evit priziañ ar bajenn amañ dindan.',
	'articlefeedback-submit' => 'Kas',
	'articlefeedback-rating-wellsourced' => 'Titouret mat :',
	'articlefeedback-rating-neutrality' => 'Diberzh :',
	'articlefeedback-rating-completeness' => 'Graet :',
	'articlefeedback-rating-readability' => 'Lennus :',
	'articlefeedback-rating-wellsourced-tooltip' => "Hag-eñ e soñjoc'h emañ ar bajenn-mañ gant trawalc'h a arroudennoù ? Ha diwar mammennoù sirius e teuont ?",
	'articlefeedback-rating-neutrality-tooltip' => "Hag-eñ e soñjoc'h e pled ar bajenn-mañ d'un doare reizh ha gant ur sav-gwel ar sujed ?",
	'articlefeedback-rating-completeness-tooltip' => "Hag-eñ e soñjoc'h he deus ar bajenn-mañ goloet temoù pouezusañ ar sujed ?",
	'articlefeedback-rating-readability-tooltip' => "Hag-eñ e soñjoc'h emañ ar bajenn-mañ aozet mat ha skrivet mat ?",
	'articlefeedback-articlerating' => 'Priziadenn ar bajenn',
	'articlefeedback-error' => "Ur fazi zo bet.
Klaskit en-dro diwezhatoc'h.",
	'articlefeedback-thanks' => 'Trugarez ! Ho priziadenn zo bet enrollet.',
	'articlefeedback-featurefeedback' => 'Roit deomp ho <span class="feedbacklink">soñjoù</span> diwar-benn an arc\'hweladur-mañ.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|briziadenn|priziadenn}})',
	'articlefeedback-stalemessage-norevisioncount' => "Ar bajenn-mañ a zo bet ''adwelet'' abaoe ho priziadenn.
Priziañ anezhi en-dro ho pefe c'hoant marteze.",
	'articlefeedback-results-show' => '(Disoc\'hoù kuzhet. <span class="showlink">Diskouez</span> anezho.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Kuzhat an disoc\'hoù</span>)',
	'articlefeedback-survey-question-whyrated' => "Roit deomp an abeg d'ar perak ho peus priziet ar bajenn-mañ hiziv (kevaskit an abegoù gwirion) :",
	'articlefeedback-survey-answer-whyrated-contribute-rating' => "C'hoant em boa reiñ sikour evit priziañ d'un doare hollek ar bajenn",
	'articlefeedback-survey-answer-whyrated-development' => "Spi am eus e servijo d'un doare pozitivel ma friziadenn evit dioreiñ ar bajenn",
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => "C'hoant em boa kenober da {{SITENAME}}",
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Plijout a ra din reiñ ma ali',
	'articlefeedback-survey-answer-whyrated-didntrate' => "N'am eus ket priziet ar bajenn hiziv, reiñ ma soñj diwar-benn an arc'hweladur an hini eo",
	'articlefeedback-survey-answer-whyrated-other' => 'All',
	'articlefeedback-survey-question-useful' => "Hag-eñ e soñjoc'h ez eo ar briziadennoù roet talvoudus ha sklaer ?",
	'articlefeedback-survey-question-useful-iffalse' => 'Perak ?',
	'articlefeedback-survey-question-expert' => "Hag-eñ e soñjoc'h emaoc'h arbennigour war an dachenn pledet er bajenn ?",
	'articlefeedback-survey-question-expert-iftrue' => 'Gallout a rit diskrivañ ho prizacherezh ?',
	'articlefeedback-survey-question-comments' => 'Evezhiadennoù all ho pefe ?',
	'articlefeedback-survey-submit' => 'Kas',
	'articlefeedback-survey-title' => "Trugarez da respont d'un nebeut goulennoù",
	'articlefeedback-survey-thanks' => 'Trugarez da vezañ leuniet ar goulennaoueg.',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'articlefeedback' => 'Ocjenjivanje članaka',
	'articlefeedback-desc' => 'Ocjenjivanje članaka (probna verzija)',
	'articlefeedback-yourfeedback' => 'Vaše povratne informacije',
	'articlefeedback-pleaserate' => 'Molimo odvojite trenutak vremena da ispod ocijenite ovu stranicu.',
	'articlefeedback-submit' => 'Pošalji',
	'articlefeedback-rating-wellsourced' => 'Dobro referencirano:',
	'articlefeedback-rating-neutrality' => 'Neutralnost:',
	'articlefeedback-rating-completeness' => 'Završenost:',
	'articlefeedback-rating-readability' => 'Čitljivost:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Da li smatrate da ova stranica ima dovoljno izvora i da su oni iz provjerljivih izvora?',
	'articlefeedback-rating-neutrality-tooltip' => 'Da li smatrate da ova stranica prikazuje neutralni prikaz iz svih perspektiva o temi?',
	'articlefeedback-rating-completeness-tooltip' => 'Da li mislite da ova stranica pokriva osnovna područja teme koja bi trebala?',
	'articlefeedback-rating-readability-tooltip' => 'Da li mislite da je ova stranica dobro organizirana i dobro napisana?',
	'articlefeedback-articlerating' => 'Rejting stranice',
	'articlefeedback-error' => 'Desila se greška.
Molimo pokušajte kasnije.',
	'articlefeedback-thanks' => 'Hvala! Vaše ocjene su sačuvane.',
	'articlefeedback-featurefeedback' => 'Dajte nam <span class="feedbacklink">povratne podatke</span> o ovoj mogućnosti.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|ocjena|ocjene|ocjena}})',
	'articlefeedback-stalemessage-norevisioncount' => "Ova stranica je ''provjerena'' od kako ste je posljednji put pregledali.
Da li je želite ocijeniti ponovo.",
	'articlefeedback-results-show' => '(Rezultati sakriveni. <span class="showlink">Prikaži</span> ih.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Sakrij rezultate</span>)',
	'articlefeedback-survey-question-whyrated' => 'Molimo recite nam zašto se ocijenili danas ovu stranicu (označite sve koje se može primijeniti):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Želio sam da pridonesem sveukupnoj ocjeni stranice',
	'articlefeedback-survey-answer-whyrated-development' => 'Nadam se da će moja ocjena imati pozitivan odjek na uređivanje stranice',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Želim da pridonosim na projektu {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Volim dijeliti svoje mišljenje',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Nisam dao ocjene danas, ali sam želio da dadnem povratne podatke o mogućnostima',
	'articlefeedback-survey-answer-whyrated-other' => 'Ostalo',
	'articlefeedback-survey-question-useful' => 'Da li vjerujete da su date ocjene korisne i jasne?',
	'articlefeedback-survey-question-useful-iffalse' => 'Zašto?',
	'articlefeedback-survey-question-expert' => 'Da li Vi sebe smatrate ekspertom u oblasti o kojoj ovaj članak piše?',
	'articlefeedback-survey-question-expert-iftrue' => 'Možete li opisati svoju eksperizu?',
	'articlefeedback-survey-question-comments' => 'Da li imate dodatnih komentara?',
	'articlefeedback-survey-submit' => 'Pošalji',
	'articlefeedback-survey-title' => 'Molimo odgovorite na nekoliko pitanja',
	'articlefeedback-survey-thanks' => 'Hvala vam na popunjavanju ankete.',
);

/** Catalan (Català)
 * @author Solde
 */
$messages['ca'] = array(
	'articlefeedback-submit' => 'Enviar',
	'articlefeedback-rating-neutrality' => 'Neutre:',
	'articlefeedback-rating-completeness' => 'Completar:',
	'articlefeedback-rating-readability' => 'Llegible:',
	'articlefeedback-survey-answer-whyrated-other' => 'Altres',
	'articlefeedback-survey-question-useful-iffalse' => 'Per què?',
	'articlefeedback-survey-question-expert' => 'Et consideres un expert en el camp que aquesta pàgina cobreix?',
	'articlefeedback-survey-question-expert-iftrue' => 'Pots descriure la teva experiència?',
	'articlefeedback-survey-question-comments' => 'Tens algun comentari addicional?',
	'articlefeedback-survey-submit' => 'Trametre',
	'articlefeedback-survey-title' => 'Si us plau, contesti algunes preguntes',
	'articlefeedback-survey-thanks' => "Gràcies per omplir l'enquesta.",
);

/** Czech (Česky)
 * @author Mormegil
 */
$messages['cs'] = array(
	'articlefeedback' => 'Hodnocení článku',
	'articlefeedback-desc' => 'Hodnocení článků (pilotní verze)',
	'articlefeedback-yourfeedback' => 'Váš názor',
	'articlefeedback-pleaserate' => 'Věnujte prosím chvilku ohodnocení této stránky.',
	'articlefeedback-submit' => 'Odeslat',
	'articlefeedback-rating-wellsourced' => 'Podloženost:',
	'articlefeedback-rating-neutrality' => 'Nezaujatost:',
	'articlefeedback-rating-completeness' => 'Úplnost:',
	'articlefeedback-rating-readability' => 'Čitelnost:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Máte pocit, že tato stránka dostatečně odkazuje na zdroje a použité zdroje jsou důvěryhodné?',
	'articlefeedback-rating-neutrality-tooltip' => 'Máte pocit, že tato stránka spravedlivě pokrývá všechny pohledy na dané téma?',
	'articlefeedback-rating-completeness-tooltip' => 'Máte pocit, že tato stránka pokrývá všechny důležité části tématu?',
	'articlefeedback-rating-readability-tooltip' => 'Máte pocit, že tato stránka je správně organizována a dobře napsána?',
	'articlefeedback-articlerating' => 'Hodnocení stránky',
	'articlefeedback-error' => 'Došlo k chybě.
Zkuste to prosím později.',
	'articlefeedback-thanks' => 'Děkujeme! Vaše hodnocení bylo uloženo.',
	'articlefeedback-featurefeedback' => 'Sdělte nám svůj <span class="feedbacklink">názor</span> na tuto funkci.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|hodnocení|hodnocení}})',
	'articlefeedback-stalemessage-norevisioncount' => "Od chvíle, co jste stránku {{GENDER:|hodnotil|hodnotila|hodnotili}}, byla ''upravena''.
Možná ji budete chtít ohodnotit znovu.",
	'articlefeedback-results-show' => '(Výsledky jsou skryty. <span class="showlink">Zobrazit</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Skrýt výsledky</span>)',
	'articlefeedback-survey-question-whyrated' => 'Proč jste dnes hodnotili tuto stránku (zaškrtněte všechny platné možnosti)?',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Chtěl jsem ovlivnit výsledné ohodnocení stránky',
	'articlefeedback-survey-answer-whyrated-development' => 'Doufám, že mé hodnocení pozitivně ovlivní budoucí vývoj stránky',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Chtěl jsem pomoci {{grammar:3sg|{{SITENAME}}}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Rád sděluji svůj názor',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Dnes jsem nehodnotil, ale chtěl jsem poskytnout svůj názor na tuto funkci',
	'articlefeedback-survey-answer-whyrated-other' => 'Jiný důvod',
	'articlefeedback-survey-question-useful' => 'Myslíte si, že poskytovaná hodnocení jsou užitečná a pochopitelná?',
	'articlefeedback-survey-question-useful-iffalse' => 'Proč?',
	'articlefeedback-survey-question-expert' => 'Považujete se za odborníka na téma, o kterém tato stránka pojednává?',
	'articlefeedback-survey-question-expert-iftrue' => 'Můžete popsat svou odbornost?',
	'articlefeedback-survey-question-comments' => 'Máte nějaké další komentáře?',
	'articlefeedback-survey-submit' => 'Odeslat',
	'articlefeedback-survey-title' => 'Odpovězte prosím na několik otázek',
	'articlefeedback-survey-thanks' => 'Děkujeme za vyplnění průzkumu.',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'articlefeedback' => 'Artikeleinschätzung',
	'articlefeedback-desc' => 'Ermöglicht die Einschätzung von Artikeln (Pilotversion)',
	'articlefeedback-yourfeedback' => 'Deine Einschätzung',
	'articlefeedback-pleaserate' => 'Bitte nimm dir kurz Zeit, diesen Artikel einzuschätzen.',
	'articlefeedback-submit' => 'Speichern',
	'articlefeedback-rating-wellsourced' => 'Gut belegt:',
	'articlefeedback-rating-neutrality' => 'Neutral:',
	'articlefeedback-rating-completeness' => 'Vollständig:',
	'articlefeedback-rating-readability' => 'Verständlich:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Hast du den Eindruck, dass dieser Artikel über genügend Quellenangaben verfügt und diese zudem aus vertrauenswürdigen Quellen stammen?',
	'articlefeedback-rating-neutrality-tooltip' => 'Hast du den Eindruck, dass dieser Artikel eine ausgewogene Darstellung aller mit dessen Inhalt verbundenen Aspekte enthält?',
	'articlefeedback-rating-completeness-tooltip' => 'Hast du den Eindruck, dass dieser Artikel alle wichtigen Aspekte enthält, die mit dessen Inhalt zusammenhängen?',
	'articlefeedback-rating-readability-tooltip' => 'Hast du den Eindruck, dass dieser Artikel gut strukturiert sowie geschrieben wurde?',
	'articlefeedback-articlerating' => 'Einschätzung des Artikels',
	'articlefeedback-error' => 'Ein Fehler ist aufgetreten.
Bitte versuche es später erneut.',
	'articlefeedback-thanks' => 'Vielen Dank! Deine Einschätzung wurde gespeichert.',
	'articlefeedback-featurefeedback' => 'Gib uns bitte eine <span class="feedbacklink">Rückmeldung</span> zu dieser Möglichkeit der Einschätzung eines Artikels.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|Einschätzung|Einschätzungen}})',
	'articlefeedback-stalemessage-norevisioncount' => "Dieser Artikel wurde seit deiner letzten Einschätzung ''bearbeitet''.
Vielleicht möchtest du ihn erneut einschätzen.",
	'articlefeedback-results-show' => '(Ergebnisse sind ausgeblendet. <span class="showlink">Einblenden</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Ergebnisse ausblenden</span>)',
	'articlefeedback-survey-question-whyrated' => 'Bitte lasse uns wissen, warum du diesen Artikel heute eingeschätzt hast (Zutreffendes bitte ankreuzen):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Ich wollte mich an der Einschätzung des Artikels beteiligen',
	'articlefeedback-survey-answer-whyrated-development' => 'Ich hoffe, dass meine Einschätzung die künftige Entwicklung des Artikels positiv beeinflusst',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Ich wollte mich an {{SITENAME}} beteiligen',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Ich teile meine Einschätzung gerne mit',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Ich habe heute keine Einschätzung vorgenommen, wollte allerdings eine Rückmeldung zu dieser Funktion zur Einschätzung des Artikels geben',
	'articlefeedback-survey-answer-whyrated-other' => 'Anderes',
	'articlefeedback-survey-question-useful' => 'Glaubst du, dass die abgegebenen Einschätzungen nützlich und verständlich sind?',
	'articlefeedback-survey-question-useful-iffalse' => 'Warum?',
	'articlefeedback-survey-question-expert' => 'Hältst du dich für kompetent auf dem Gebiet, mit dem sich der Inhalt dieses Artikels beschäftigt?',
	'articlefeedback-survey-question-expert-iftrue' => 'Kannst du deine Sachkenntnisse beschreiben?',
	'articlefeedback-survey-question-comments' => 'Hast du noch weitere Anmerkungen?',
	'articlefeedback-survey-submit' => 'Speichern',
	'articlefeedback-survey-title' => 'Bitte beantworte uns ein paar Fragen',
	'articlefeedback-survey-thanks' => 'Vielen Dank für deine Rückmeldung.',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author Catrope
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'articlefeedback-yourfeedback' => 'Ihre Einschätzung',
	'articlefeedback-pleaserate' => 'Bitte nehmen Sie sich kurz Zeit, diesen Artikel einzuschätzen.',
	'articlefeedback-rating-wellsourced-tooltip' => 'Haben Sie den Eindruck, dass dieser Artikel über genügend Quellenangaben verfügt und diese zudem aus vertrauenswürdigen Quellen stammen?',
	'articlefeedback-rating-neutrality-tooltip' => 'Haben Sie den Eindruck, dass dieser Artikel eine ausgewogene Darstellung aller mit dessen Inhalt verbundenen Aspekte enthält?',
	'articlefeedback-rating-completeness-tooltip' => 'Haben Sie den Eindruck, dass dieser Artikel alle wichtigen Aspekte enthält, die mit dessen Inhalt zusammenhängen?',
	'articlefeedback-rating-readability-tooltip' => 'Haben Sie den Eindruck, dass dieser Artikel gut strukturiert sowie geschrieben wurde?',
	'articlefeedback-error' => 'Ein Fehler ist aufgetreten.
Bitte versuchen Sie es später erneut.',
	'articlefeedback-thanks' => 'Vielen Dank! Ihre Einschätzung wurde gespeichert.',
	'articlefeedback-featurefeedback' => 'Geben Sie uns bitte eine <span class="feedbacklink">Rückmeldung</span> zu dieser Möglichkeit der Einschätzung eines Artikels.',
	'articlefeedback-stalemessage-norevisioncount' => "Dieser Artikel wurde seit Ihrer letzten Einschätzung ''bearbeitet''.
Vielleicht möchten Sie ihn erneut einschätzen.",
	'articlefeedback-survey-question-whyrated' => 'Bitte lassen Sie uns wissen, warum Sie diesen Artikel heute eingeschätzt haben (Zutreffendes bitte ankreuzen):',
	'articlefeedback-survey-question-useful' => 'Glauben Sie, dass die abgegebenen Einschätzungen nützlich und verständlich sind?',
	'articlefeedback-survey-question-expert' => 'Halten Sie sich für kompetent auf dem Gebiet, mit dem sich der Inhalt dieses Artikels beschäftigt?',
	'articlefeedback-survey-question-expert-iftrue' => 'Können Sie Ihre Sachkenntnisse beschreiben?',
	'articlefeedback-survey-question-comments' => 'Haben Sie noch weitere Anmerkungen?',
	'articlefeedback-survey-title' => 'Bitte beantworten Sie uns ein paar Fragen',
	'articlefeedback-survey-thanks' => 'Vielen Dank für Ihre Rückmeldung.',
);

/** Greek (Ελληνικά)
 * @author Glavkos
 */
$messages['el'] = array(
	'articlefeedback' => 'Αξιολόγηση Άρθρου',
	'articlefeedback-desc' => 'Αξιολόγηση Άρθρου (πιλοτική έκδοση)',
	'articlefeedback-yourfeedback' => 'Η ανατροφοδότησή σας',
	'articlefeedback-submit' => 'Υποβολή',
	'articlefeedback-rating-wellsourced' => 'Καλά Τεκμηριωμένο',
	'articlefeedback-rating-neutrality' => 'Ουδέτερο:',
	'articlefeedback-rating-completeness' => 'Ολοκλήρωση:',
	'articlefeedback-rating-readability' => 'Αναγνώσιμο:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Αισθάνεστε ότι αυτή η σελίδα έχει επαρκείς παραπομπές και ότι αυτές οι παραπομπές προέρχονται από αξιόπιστες πηγές;',
	'articlefeedback-rating-neutrality-tooltip' => 'Πιστεύετε ότι αυτή η σελίδα εμφανίζει μια δίκαιη εκπροσώπηση όλων των απόψεων σχετικά με το θέμα;',
	'articlefeedback-rating-completeness-tooltip' => 'Πιστεύετε ότι αυτή η σελίδα καλύπτει  στις βασικές θεματικές περιοχές που θα έπρεπε;',
	'articlefeedback-rating-readability-tooltip' => 'Πιστεύετε ότι αυτή η σελίδα είναι καλά οργανωμένη και καλογραμμένη;',
	'articlefeedback-articlerating' => 'βαθμολόγηση Σελίδας',
	'articlefeedback-error' => 'Παρουσιάστηκε ένα σφάλμα.
Παρακαλώ δοκιμάστε ξανά αργότερα.',
	'articlefeedback-thanks' => 'Ευχαριστώ! Οι βαθμολογήσεις  σας έχουν αποθηκευτεί.',
	'articlefeedback-featurefeedback' => 'Δώστε μας<span class="feedbacklink">ανατροφοδότηση</span> σχετικά με αυτό το χαρακτηριστικό.',
);

/** Esperanto (Esperanto)
 * @author Eliovir
 * @author Yekrats
 */
$messages['eo'] = array(
	'articlefeedback' => 'Takso de artikolo',
	'articlefeedback-desc' => 'Artikola takso (testa versio)',
	'articlefeedback-yourfeedback' => 'Via komento',
	'articlefeedback-pleaserate' => 'Bonvolu atendi momenton por aprezi ĉi tiun suban.',
	'articlefeedback-submit' => 'Enigi',
	'articlefeedback-rating-wellsourced' => 'Bone dokumentita:',
	'articlefeedback-rating-neutrality' => 'Neŭtrala:',
	'articlefeedback-rating-completeness' => 'Kompleta:',
	'articlefeedback-rating-readability' => 'Legebla:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Ĉu vi opinias ke ĉi tiu paĝo havas sufiĉajn citaĵojn kaj ties citaĵoj estas el fidindaj fontoj?',
	'articlefeedback-rating-neutrality-tooltip' => 'Ĉu vi opinias ke ĉi tiu paĝo donas justan prezenton de ĉiuj perspektivoj de la temo?',
	'articlefeedback-rating-completeness-tooltip' => 'Ĉu vi opinias ke ĉi tiu paĝo traktas la esencajn traktendajn tempunktojn?',
	'articlefeedback-rating-readability-tooltip' => 'Ĉu vi opinias ke ĉi tiu paĝo estas bone organizita kaj bone verkita?',
	'articlefeedback-articlerating' => 'Taksado de paĝo',
	'articlefeedback-error' => 'Eraro okazis.
Bonvolu reprovi poste.',
	'articlefeedback-thanks' => 'Dankon! Viaj taksoj estis konservitaj.',
	'articlefeedback-featurefeedback' => 'Doni al ni <span class="feedbacklink">komentojn</span> pri ĉi tiu ilo.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|takso|taksoj}})',
	'articlefeedback-stalemessage-norevisioncount' => "Ĉi tiu paĝo estis ''revizita'' ekde vi laste revizis ĝin.
Vi eble volus taksi ĝin denove.",
	'articlefeedback-results-show' => '(Rezultoj kaŝitaj. <span class="showlink">Montri</span> ilin.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Kaŝi rezultojn</span>)',
	'articlefeedback-survey-question-whyrated' => 'Bonvolu informigi nin  kial vi taksis ĉi tiun paĝon hodiaŭ (marku ĉion taŭgan):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Mi volis kontribui al la suma taksado de la paĝo',
	'articlefeedback-survey-answer-whyrated-development' => 'Mi esperas ke mia takso pozitive influus la disvolvadon de la paĝo',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Mi volis kontribui al {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Plaĉas al mi doni mian opinion.',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Mi ne provizas taksojn hodiaŭ, se volis doni komentojn pri la ilo',
	'articlefeedback-survey-answer-whyrated-other' => 'Alia',
	'articlefeedback-survey-question-useful' => 'Ĉu vi konsideras ke la taksoj provizitaj estas utilaj kaj klara?',
	'articlefeedback-survey-question-useful-iffalse' => 'Kial?',
	'articlefeedback-survey-question-expert' => 'Ĉu vi konsideras ke vi mem estas spertulo en la fako kiu tiun paĝo temas?',
	'articlefeedback-survey-question-expert-iftrue' => 'Bonvolu priskribi vian fako-sperton',
	'articlefeedback-survey-question-comments' => 'Ĉu vi havas iujn suplementajn komentojn?',
	'articlefeedback-survey-submit' => 'Enigi',
	'articlefeedback-survey-title' => 'Bonvolu respondi al kelkaj demandoj',
	'articlefeedback-survey-thanks' => 'Dankon pro plenumante la enketon.',
);

/** Spanish (Español)
 * @author Locos epraix
 * @author Translationista
 */
$messages['es'] = array(
	'articlefeedback' => 'Evaluación del artículo',
	'articlefeedback-desc' => 'Evaluación del artículo (versión de pruebas)',
	'articlefeedback-yourfeedback' => 'Tus comentarios',
	'articlefeedback-pleaserate' => 'Por favor, dedica unos segundos a evaluar esta página.',
	'articlefeedback-submit' => 'Enviar',
	'articlefeedback-rating-wellsourced' => 'Bien documentado:',
	'articlefeedback-rating-neutrality' => 'Neutro:',
	'articlefeedback-rating-completeness' => 'Completo:',
	'articlefeedback-rating-readability' => 'Legible:',
	'articlefeedback-rating-wellsourced-tooltip' => '¿Consideras que esta página tiene suficientes citas y que estas provienen de fuentes fiables?',
	'articlefeedback-rating-neutrality-tooltip' => '¿Consideras que esta página muestra una arepresentación justa de todas las perspectivas posibles en este tema?',
	'articlefeedback-rating-completeness-tooltip' => '¿Consideras que esta página aborda los temas esenciales del área que debería?',
	'articlefeedback-rating-readability-tooltip' => '¿Consideras que esta página está bien estructurada y bien escrita?',
	'articlefeedback-articlerating' => 'Valoración de página',
	'articlefeedback-error' => 'Ha ocurrido un error. 
 Por favor, inténtalo de nuevo más tarde.',
	'articlefeedback-thanks' => '¡Gracias! Tu evaluación se ha guardado.',
	'articlefeedback-featurefeedback' => 'Quisiéramos tus <span class="feedbacklink">comentarios</span> acerca de esta función.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|evaluación|evaluaciones}})',
	'articlefeedback-stalemessage-norevisioncount' => "Esta página ha sido ''revisada'' desde la última vez que la valoraste.
Quizá quisieras valorarla de nuevo.",
	'articlefeedback-results-show' => '(Resultados escondido. <span class="showlink">Mostrarlos</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Esconder resultados</span>)',
	'articlefeedback-survey-question-whyrated' => 'Por favor, dinos por qué has valorado esta página hoy (marca todas las opciones que correspondan):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Quería contribuir a la calificación global de la página',
	'articlefeedback-survey-answer-whyrated-development' => 'Espero que mi calificación afecte positivamante el desarrollo de la página',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Quería contribuir a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Me gusta compartir mi opinión',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Hoy no evalué ninguna página. Sólo quise dejar mis comentarios sobre la funcionalidad.',
	'articlefeedback-survey-answer-whyrated-other' => 'Otro',
	'articlefeedback-survey-question-useful' => '¿Crees las valoraciones proporcionadas son útiles y claras?',
	'articlefeedback-survey-question-useful-iffalse' => '¿Por qué?',
	'articlefeedback-survey-question-expert' => '¿Te consideras un experto en el campo del que trata esta página?',
	'articlefeedback-survey-question-expert-iftrue' => '¿Puedes describir tu nivel de especialización?',
	'articlefeedback-survey-question-comments' => '¿Tienes algún comentario adicional?',
	'articlefeedback-survey-submit' => 'Enviar',
	'articlefeedback-survey-title' => 'Por favor, contesta algunas preguntas',
	'articlefeedback-survey-thanks' => 'Gracias por completar la encuesta.',
);

/** Estonian (Eesti)
 * @author Avjoska
 * @author Pikne
 */
$messages['et'] = array(
	'articlefeedback' => 'Artikli hindamine',
	'articlefeedback-desc' => 'Artikli hindamine (prooviversioon)',
	'articlefeedback-yourfeedback' => 'Sinu tagasiside',
	'articlefeedback-pleaserate' => 'Palun leia mõni hetk allpool oleva lehekülje hindamiseks.',
	'articlefeedback-submit' => 'Saada',
	'articlefeedback-rating-wellsourced' => 'Viidatus:',
	'articlefeedback-rating-neutrality' => 'Neutraalne:',
	'articlefeedback-rating-completeness' => 'Täielikkus:',
	'articlefeedback-rating-readability' => 'Loetavus:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Kas leheküljel on piisavalt viiteid ja kas need pärinevad usalduväärsetest allikatest.',
	'articlefeedback-rating-neutrality-tooltip' => 'Kas kõik antud küsimuse tahud on leheküljel võrdselt esindatud?',
	'articlefeedback-rating-completeness-tooltip' => 'Kas see lehekülg annab teemast piisava ülevaate?',
	'articlefeedback-rating-readability-tooltip' => 'Kas see lehekülg on hästi üles ehitatud ja kirjutatud?',
	'articlefeedback-articlerating' => 'Lehekülje hinnang',
	'articlefeedback-error' => 'Ilmnes tõrge. 
Palun proovi hiljem uuesti.',
	'articlefeedback-thanks' => 'Aitäh! Sinu hinnangud on salvestatud.',
	'articlefeedback-featurefeedback' => 'Anna meile <span class="feedbacklink">tagasisidet</span> selle hindamismeetodi kohta.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|hindamine|hindamist}})',
	'articlefeedback-stalemessage-norevisioncount' => "Seda lehekülge on pärast sinu viimast ülevaatamist ''muudetud''.
Võib-olla soovid seda uuesti hinnata.",
	'articlefeedback-results-show' => '(Tulemused on peidetud. <span class="showlink">Näita</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Peida tulemused</span>)',
	'articlefeedback-survey-question-whyrated' => 'Miks seda lehekülge täna hindasid (vali kõik sobivad):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Tahtsin leheküljele üldist hinnangut anda',
	'articlefeedback-survey-answer-whyrated-development' => 'Loodan, et minu hinnang aitab lehekülje arendamisele kaasa',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Tahtsin {{GRAMMAR:inessive|{{SITENAME}}}} kaastööd teha',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Mulle meeldib oma arvamust jagada',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Ma ei hinnanud täna seda lehekülge, vaid tahtsin tagasisidet anda',
	'articlefeedback-survey-answer-whyrated-other' => 'Muu',
	'articlefeedback-survey-question-useful' => 'Kas pead antud hinnanguid kasulikuks ja selgeks?',
	'articlefeedback-survey-question-useful-iffalse' => 'Miks?',
	'articlefeedback-survey-question-expert' => 'Kas pead ennast sellel leheküljel käsitletud teema asjatundjaks?',
	'articlefeedback-survey-question-expert-iftrue' => 'Kas saad kirjeldada, milles sinu asjatundlikkus väljendub?',
	'articlefeedback-survey-question-comments' => 'Kas sul on lisamärkusi?',
	'articlefeedback-survey-submit' => 'Saada',
	'articlefeedback-survey-title' => 'Palun vasta mõnele küsimusele.',
	'articlefeedback-survey-thanks' => 'Aitäh küsitlusele vastamast!',
);

/** Persian (فارسی)
 * @author Huji
 * @author ZxxZxxZ
 */
$messages['fa'] = array(
	'articlefeedback' => 'ارزیابی مقاله‌ها',
	'articlefeedback-desc' => 'ارزیابی مقاله‌ها (نسخهٔ آزمایشی)',
	'articlefeedback-yourfeedback' => 'نظر شما',
	'articlefeedback-pleaserate' => 'لطفاً لحظه‌ای از وقت خود را صرف نمره دادن به این صفحه از طریق بخش زیری کنید',
	'articlefeedback-submit' => 'ارسال',
	'articlefeedback-rating-wellsourced' => 'دارای منابع خوب:',
	'articlefeedback-rating-neutrality' => 'بی‌طرف:',
	'articlefeedback-rating-completeness' => 'کامل:',
	'articlefeedback-rating-readability' => 'خوانا:',
	'articlefeedback-rating-wellsourced-tooltip' => 'به نظر شما این صفحه دارای ارجاعات کافی به منابع قابل اعتماد هست؟',
	'articlefeedback-rating-neutrality-tooltip' => 'به نظر شما این صفحه دیدگاه‌های مختلف در مورد موضوعش را به طور متناسبی ارائه می‌دهد؟',
	'articlefeedback-rating-completeness-tooltip' => 'به نظر شما عنوان‌های اساسی که باید پوشش دهد را شامل می‌شود؟',
	'articlefeedback-rating-readability-tooltip' => 'به نظر شما این صفحه به‌خوبی ساختاربندی شده و به‌خوبی نوشته شده‌است؟',
	'articlefeedback-articlerating' => 'نمرهٔ مقاله',
	'articlefeedback-error' => 'خطایی رخ داده‌است.
لطفاً بعداً دوباره تلاش کنید.',
	'articlefeedback-thanks' => 'متشکریم! نمرهٔ شما ذخیره شد.',
	'articlefeedback-featurefeedback' => 'در مورد این قابلیت به ما <span class="feedbacklink">نظر بدهید</span>.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|نمره|نمره}})',
	'articlefeedback-stalemessage-norevisioncount' => "این صفحه از آخرین باری که آن را بازبینی کردید ''تغییر کرده‌است''.
می‌توانید دوباره به آن نمره دهید.",
	'articlefeedback-results-show' => '(نتایج مخفی است. <span class="showlink">نمایش نتایج</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">نهفتن نتایج</span>)',
	'articlefeedback-survey-question-whyrated' => 'لطفاً به ما اطلاع دهید که چرا شما امروز به این صفحه نمره دادید (تمام موارد مرتبط را انتخاب کنید):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'می‌خواستم در نمره کلی صفحه مشارکت کنم',
	'articlefeedback-survey-answer-whyrated-development' => 'امیدوارم که نمره‌ای که دادم اثر مثبتی روی پیشرفت صفحه داشته باشد',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'می‌خواستم به {{SITENAME}} کمک کنم',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'علاقه دارم نظر خودم را به اشتراک بگذارم',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'امروز نمره‌ای ندادم، اما می‌خواهم راجع به این ویژگی نظر بدهم',
	'articlefeedback-survey-answer-whyrated-other' => 'غیره',
	'articlefeedback-survey-question-useful' => 'آیا فکر می‌کنید نمره‌های ارائه شده مفید و واضح هستند؟',
	'articlefeedback-survey-question-useful-iffalse' => 'چرا؟',
	'articlefeedback-survey-question-expert' => 'آیا خودتان را در زمینه موضوع این صفحه متخصص می‌دانید؟',
	'articlefeedback-survey-question-expert-iftrue' => 'آیا می‌توانید تخصص خود را توضیح دهید؟',
	'articlefeedback-survey-question-comments' => 'آیا هر گونه نظر اضافی دارید؟',
	'articlefeedback-survey-submit' => 'ارسال',
	'articlefeedback-survey-title' => 'لطفاً به چند پرسش پاسخ دهید',
	'articlefeedback-survey-thanks' => 'از این که نظرسنجی را تکمیل کردید متشکریم.',
);

/** Finnish (Suomi)
 * @author Nike
 * @author Olli
 */
$messages['fi'] = array(
	'articlefeedback' => 'Artikkelin arviointi',
	'articlefeedback-desc' => 'Artikkelin arviointi (kokeiluversio)',
	'articlefeedback-yourfeedback' => 'Omat palautteet',
	'articlefeedback-pleaserate' => 'Käyttäisitkö hetken alla olevan sivun arviointiin.',
	'articlefeedback-submit' => 'Lähetä',
	'articlefeedback-rating-wellsourced' => 'Hyvin lähteistetty:',
	'articlefeedback-rating-neutrality' => 'Neutraali:',
	'articlefeedback-rating-completeness' => 'Täydellinen:',
	'articlefeedback-rating-readability' => 'Luettavuus:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Onko tällä sivulla mielestäsi hyvät lainaukset ja ovatko ne peräisin luotettavista lähteistä?',
	'articlefeedback-rating-neutrality-tooltip' => 'Käsitteleekö artikkeli mielestäsi asiaa reilusti kaikista mahdollisista näkökulmista?',
	'articlefeedback-rating-completeness-tooltip' => 'Sisältääkö sivu mielestäsi kaikki olennaiset alueet kyseessä olevasta aiheesta?',
	'articlefeedback-rating-readability-tooltip' => 'Onko artikkeli mielestäsi hyvin järjestetty ja hyvin kirjoitettu?',
	'articlefeedback-articlerating' => 'Sivun arvostelu',
	'articlefeedback-error' => 'Tapahtui virhe.
Ole hyvä ja yritä myöhemmin uudelleen.',
	'articlefeedback-thanks' => 'Kiitos! Arvostelusi tallennettiin.',
	'articlefeedback-featurefeedback' => 'Anna meille <span class="feedbacklink">palautetta</span> tästä ominaisuudesta.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|arvio|arviota}})',
	'articlefeedback-stalemessage-norevisioncount' => "Tätä sivua on ''muutettu'' viimeisimmän arvostelusi jälkeen.
Haluaisit ehkä arvostella sen uudelleen.",
	'articlefeedback-results-show' => '(Tulokset on piilotettu. <span class="showlink">Näytä</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Piilota tulokset</span>)',
	'articlefeedback-survey-question-whyrated' => 'Kerro meille, miksi arvostelit tämän sivun tänään (lisää merkki kaikkiin, jotka pitävät paikkaansa):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Haluan vaikuttaa sivun kokonaisarvosanaan',
	'articlefeedback-survey-answer-whyrated-development' => 'Toivon, että arvosteluni vaikuttaisi positiivisesti sivun kehitykseen',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Haluan osallistua {{SITENAME}}-sivuston kehitykseen',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Pidän mielipiteeni kertomisesta',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'En antanut arvosteluja tänään, mutta halusin antaa palautetta arvosteluominaisuudesta',
	'articlefeedback-survey-answer-whyrated-other' => 'Muu',
	'articlefeedback-survey-question-useful' => 'Ovatko annetut arvostelut mielestäsi hyödyllisiä ja todellisia?',
	'articlefeedback-survey-question-useful-iffalse' => 'Miksi?',
	'articlefeedback-survey-question-expert' => 'Oletko mielestäsi asiantuntija asiassa, jota käsitellään tällä sivulla?',
	'articlefeedback-survey-question-expert-iftrue' => 'Voitko kuvailla asiantuntemustasi?',
	'articlefeedback-survey-question-comments' => 'Onko sinulla muita kommentteja?',
	'articlefeedback-survey-submit' => 'Lähetä',
	'articlefeedback-survey-title' => 'Vastaathan muutamiin kysymyksiin',
	'articlefeedback-survey-thanks' => 'Kiitos kyselyn täyttämisestä.',
);

/** French (Français)
 * @author Crochet.david
 * @author Peter17
 */
$messages['fr'] = array(
	'articlefeedback' => 'Évaluation d’article',
	'articlefeedback-desc' => 'Évaluation d’article (version pilote)',
	'articlefeedback-yourfeedback' => 'Votre retour',
	'articlefeedback-pleaserate' => 'Veuillez prendre un moment pour évaluer cette page ci-dessous.',
	'articlefeedback-submit' => 'Soumettre',
	'articlefeedback-rating-wellsourced' => 'Bien sourcé :',
	'articlefeedback-rating-neutrality' => 'Neutre :',
	'articlefeedback-rating-completeness' => 'Complet :',
	'articlefeedback-rating-readability' => 'Lisible :',
	'articlefeedback-rating-wellsourced-tooltip' => 'Pensez-vous que cette page a suffisamment de citations et que celles-ci proviennent de sources dignes de confiance.',
	'articlefeedback-rating-neutrality-tooltip' => 'Pensez-vous que cette page fournit une présentation équitable de toutes les perspectives du sujet traité ?',
	'articlefeedback-rating-completeness-tooltip' => 'Pensez-vous que cette page couvre les thèmes essentiels du sujet ?',
	'articlefeedback-rating-readability-tooltip' => 'Pensez-vous que cette page soit bien organisée et bien écrite ?',
	'articlefeedback-articlerating' => 'Évaluation de la page',
	'articlefeedback-error' => 'Une erreur est survenue.
Veuillez ré-essayer plus tard.',
	'articlefeedback-thanks' => 'Merci ! Votre évaluation a été enregistrée.',
	'articlefeedback-featurefeedback' => 'Donnez-nous vos <span class="feedbacklink">commentaires</span> sur cette fonctionnalité.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|évaluation|évaluations}})',
	'articlefeedback-stalemessage-norevisioncount' => 'Cette page a été révisée depuis que vous l’avez évaluée.
Vous pourriez vouloir l’évaluer à nouveau.',
	'articlefeedback-results-show' => '(Résultats masqués. <span class="showlink">Les afficher.</span>)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Masquer les résultats</span>)',
	'articlefeedback-survey-question-whyrated' => 'Veuillez nous indiquer pourquoi vous avez évalué cette page aujourd’hui (cochez tout ce qui s’applique) :',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Je voulais contribuer à l’évaluation globale de la page',
	'articlefeedback-survey-answer-whyrated-development' => 'J’espère que mon évaluation aura une incidence positive sur le développement de la page',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Je voulais contribuer à {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'J’aime partager mon opinion',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Je n’ai pas évalué la page, mais je voulais donner un retour sur cette fonctionnalité',
	'articlefeedback-survey-answer-whyrated-other' => 'Autre',
	'articlefeedback-survey-question-useful' => 'Pensez-vous que les évaluations fournies soient utiles et claires ?',
	'articlefeedback-survey-question-useful-iffalse' => 'Pourquoi ?',
	'articlefeedback-survey-question-expert' => 'Vous considérez-vous comme un expert dans le domaine couvert par cette page ?',
	'articlefeedback-survey-question-expert-iftrue' => 'Pouvez-vous décrire votre expertise ?',
	'articlefeedback-survey-question-comments' => 'Avez-vous d’autres commentaires ?',
	'articlefeedback-survey-submit' => 'Soumettre',
	'articlefeedback-survey-title' => 'Veuillez répondre à quelques questions',
	'articlefeedback-survey-thanks' => 'Merci d’avoir rempli le questionnaire.',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'articlefeedback' => 'Èstimacion d’articllo',
	'articlefeedback-desc' => 'Èstimacion d’articllo (vèrsion pilote)',
	'articlefeedback-yourfeedback' => 'Voutron avis',
	'articlefeedback-submit' => 'Sometre',
	'articlefeedback-rating-wellsourced' => 'Bien fondâ :',
	'articlefeedback-rating-neutrality' => 'Netro :',
	'articlefeedback-rating-completeness' => 'Complèt :',
	'articlefeedback-rating-readability' => 'Liésiblo :',
	'articlefeedback-articlerating' => 'Èstimacion de la pâge',
	'articlefeedback-featurefeedback' => 'Balyéd-nos voutron <span class="feedbacklink">avis</span> sur cela fonccionalitât.',
	'articlefeedback-noratings' => '$1 ($2 èstimacion{{PLURAL:$2||s}})',
	'articlefeedback-results-show' => '(Rèsultats cachiês. Los <span class="showlink">fâre vêre</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Cachiér los rèsultats</span>)',
	'articlefeedback-survey-answer-whyrated-other' => 'Ôtra',
	'articlefeedback-survey-question-useful-iffalse' => 'Porquè ?',
	'articlefeedback-survey-submit' => 'Sometre',
);

/** Friulian (Furlan)
 * @author Klenje
 */
$messages['fur'] = array(
	'articlefeedback-articlerating' => 'Judizi de pagjine',
	'articlefeedback-survey-submit' => 'Invie',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'articlefeedback' => 'Avaliación do artigo',
	'articlefeedback-desc' => 'Versión piloto da avaliación dos artigos',
	'articlefeedback-yourfeedback' => 'Os seus comentarios',
	'articlefeedback-pleaserate' => 'Por favor, tome uns intres para avaliar esta páxina.',
	'articlefeedback-submit' => 'Enviar',
	'articlefeedback-rating-wellsourced' => 'Ben documentado:',
	'articlefeedback-rating-neutrality' => 'Neutral:',
	'articlefeedback-rating-completeness' => 'Completo:',
	'articlefeedback-rating-readability' => 'Lexible:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Cre que esta páxina ten citas suficientes e que estas son de fontes fiables?',
	'articlefeedback-rating-neutrality-tooltip' => 'Cre que esta páxina mostra unha representación xusta de todas as perspectivas do tema?',
	'articlefeedback-rating-completeness-tooltip' => 'Cre que esta páxina aborda as áreas esenciais do tema que debería?',
	'articlefeedback-rating-readability-tooltip' => 'Cre que esta páxina está ben organizada e escrita?',
	'articlefeedback-articlerating' => 'Avaliación do artigo',
	'articlefeedback-error' => 'Houbo un erro.
Inténteo de novo máis tarde.',
	'articlefeedback-thanks' => 'Grazas! Gardáronse as súas valoracións.',
	'articlefeedback-featurefeedback' => 'Déanos <span class="feedbacklink">a súa opinión</span> sobre esta característica.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|avaliación|avaliacións}})',
	'articlefeedback-stalemessage-norevisioncount' => "Alguén fixo unha ''revisión'' da páxina desde a súa última visita.
Quizais queira avaliala novamente.",
	'articlefeedback-results-show' => '(Resultados agochados. <span class="showlink">Mostralos</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Agochar os resultados</span>)',
	'articlefeedback-survey-question-whyrated' => 'Díganos por que valorou esta páxina (marque todas as opcións que cumpran):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Quería colaborar na valoración da páxina',
	'articlefeedback-survey-answer-whyrated-development' => 'Agardo que a miña valoración afecte positivamente ao desenvolvemento da páxina',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Quería colaborar con {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Gústame dar a miña opinión',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Non dei ningunha valoración, só quería deixar os meus comentarios sobre a característica',
	'articlefeedback-survey-answer-whyrated-other' => 'Outra',
	'articlefeedback-survey-question-useful' => 'Cre que as valoracións dadas son útiles e claras?',
	'articlefeedback-survey-question-useful-iffalse' => 'Por que?',
	'articlefeedback-survey-question-expert' => 'Considérase un experto no campo que abrangue esta páxina?',
	'articlefeedback-survey-question-expert-iftrue' => 'Pode describir a súa experiencia?',
	'articlefeedback-survey-question-comments' => 'Ten algún comentario adicional?',
	'articlefeedback-survey-submit' => 'Enviar',
	'articlefeedback-survey-title' => 'Responda algunhas preguntas',
	'articlefeedback-survey-thanks' => 'Grazas por encher a enquisa.',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'articlefeedback' => 'Artikelyyschetzig',
	'articlefeedback-desc' => 'Macht d Yyschetzig vu Artikel megli (Pilotversion)',
	'articlefeedback-yourfeedback' => 'Dyy Yyschetzig',
	'articlefeedback-pleaserate' => 'Bitte nimm Dir churz Zyt un tue dää Artikel yyschetze.',
	'articlefeedback-submit' => 'Ibertrage',
	'articlefeedback-rating-wellsourced' => 'Guet beleit:',
	'articlefeedback-rating-neutrality' => 'Neutral:',
	'articlefeedback-rating-completeness' => 'Vollständig:',
	'articlefeedback-rating-readability' => 'Verständli:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Hesch Du dr Yydruck, ass es in däm Artikel gnue Quällenaagabe het un ass mer däne Quälle cha tröue?',
	'articlefeedback-rating-neutrality-tooltip' => 'Hesch Du dr Yydruck, ass dää Artikel e uusgwogeni Darstellig isch vu allne Aschpäkt, wu mit däm Thema verbunde sin?',
	'articlefeedback-rating-completeness-tooltip' => 'Hesch Du dr Yydruck, ass in däm Artikel aali Aschpäkt ufgfiert sin, wu mit däm Thema zämmehange?',
	'articlefeedback-rating-readability-tooltip' => 'Hesch Du dr Yydruck, ass dää Artikel guet strukturiert un gschribe isch?',
	'articlefeedback-articlerating' => 'Yyschetzig vum Artikel',
	'articlefeedback-error' => 'E Fähler isch ufträtte.
Bitte versuech s nomol.',
	'articlefeedback-thanks' => 'Dankschen! Dyy Yyschetzig isch gspycheret wore.',
	'articlefeedback-featurefeedback' => 'Gib s bitte ne <span class="feedbacklink">Ruckmäldig</span> zue däre Funktion.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|Yyschetzig|Yyschetzige}})',
	'articlefeedback-stalemessage-norevisioncount' => "Dää Artikel isch syt Dyyre letschte Yyschetzig ''bearbeitet'' wore.
Villicht witt e nomol yyschetze.",
	'articlefeedback-results-show' => '(Ergebnis sin uusbländet. <span class="showlink">Yyblände</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Ergebnis uusblände</span>)',
	'articlefeedback-survey-question-whyrated' => 'Bitte loss es is wisse, wurum Du dää Artikel hite yygschetzt hesch (bitte aachryzle, was zuetrifft):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Ich haa welle mitmache bi dr Yyschetzig vu däm Artikel',
	'articlefeedback-survey-answer-whyrated-development' => 'Ich hoffe, ass myy Yyschetzig e positive Yyfluss het uf di chimftig Entwicklig vum Artikel',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Ich haa welle mitmache bi {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Ich tue gärn myy Meinig teile',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Ich haa hite kei Yyschetzig vorgnuu, haa aber e Ruckmäldig zue däre Funktion welle gee',
	'articlefeedback-survey-answer-whyrated-other' => 'Anderi',
	'articlefeedback-survey-question-useful' => 'Glaubsch, ass d Yyschetzige, wu abgee wore sin, nitzli un verständli sin?',
	'articlefeedback-survey-question-useful-iffalse' => 'Wurum?',
	'articlefeedback-survey-question-expert' => 'Haltesch Du di fir kompetänt uf em Biet vum Syteinhalt?',
	'articlefeedback-survey-question-expert-iftrue' => 'Chasch Du dyy Sachchänntnis bschryybe?',
	'articlefeedback-survey-question-comments' => 'Hesch no meh Aamerkige?',
	'articlefeedback-survey-submit' => 'Ibertrage',
	'articlefeedback-survey-title' => 'Bitte gib Antworte uf e paar Froge',
	'articlefeedback-survey-thanks' => 'Dankschen fir Dyy Ruckmäldig.',
);

/** Hebrew (עברית)
 * @author YaronSh
 */
$messages['he'] = array(
	'articlefeedback' => 'הערכת ערך',
	'articlefeedback-desc' => 'הערכת ערך (גרסה ניסיונית)',
	'articlefeedback-yourfeedback' => 'המשוב שלך',
	'articlefeedback-pleaserate' => 'נא להשקיע דקה בדירוג הדף שלהלן.',
	'articlefeedback-submit' => 'שליחה',
	'articlefeedback-rating-wellsourced' => 'עם מקורות תקינים:',
	'articlefeedback-rating-neutrality' => 'ניטרלי:',
	'articlefeedback-rating-completeness' => 'שלם:',
	'articlefeedback-rating-readability' => 'קריא:',
	'articlefeedback-rating-wellsourced-tooltip' => 'האם לדעתך לדף זה יש די ציטוטים והאם ציטוטים אלה מגיעים ממקורות מהימנים?',
	'articlefeedback-rating-neutrality-tooltip' => 'האם לדעתך דף זה מייצג באופן הוגן את כל ההיבטים בנושא?',
	'articlefeedback-rating-completeness-tooltip' => 'האם לדעתך דף זה מכסה את התחומים החיוניים לנושא כפי שהוא אמור?',
	'articlefeedback-rating-readability-tooltip' => 'האם לדעתך דף זה מסודר היטב וכתוב כראוי?',
	'articlefeedback-articlerating' => 'דירוג הדף',
	'articlefeedback-error' => 'אירעה שגיאה. 
נא לנסות שוב מאוחר יותר.',
	'articlefeedback-thanks' => 'תודה רבה! הדירוגים שלך נשמרו.',
	'articlefeedback-featurefeedback' => 'הוספת <span class="feedbacklink">משוב</span> על תכונה זו.',
	'articlefeedback-noratings' => '$1 ({{PLURAL:$2|דירוג אחד|$2 דירוגים}})',
	'articlefeedback-stalemessage-norevisioncount' => "דף זה ''נסקר'' מאחר שסקרת אותו לאחרונה.
יתכן שיהיה ברצונך לסקור אותו שוב.",
	'articlefeedback-results-show' => '(התוצאות מוסתרות. <span class="showlink">הצגתן</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">הסתרת התוצאות</span>)',
	'articlefeedback-survey-question-whyrated' => 'נא ליידע אותנו מדובר דירגת דף זה היום (יש לסמן את כל העונים לשאלה):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'ברצוני לתרום לדירוג הכללי של הדף',
	'articlefeedback-survey-answer-whyrated-development' => 'כולי תקווה שהדירוג שלי ישפיע לטובה על פיתוח הדף',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'ברצוני לתרום ל{{grammar:תחילית|{{SITENAME}}}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'מוצא חן בעיני לשתף את דעתי ברבים',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'לא סיפקתי אף דירוגים היום, אך ברצוני לתת משוב על תכונה',
	'articlefeedback-survey-answer-whyrated-other' => 'אחר',
	'articlefeedback-survey-question-useful' => 'האם קיבלת את התחושה שהדירוגים שסיפקת שימושיים וברורים?',
	'articlefeedback-survey-question-useful-iffalse' => 'מדוע?',
	'articlefeedback-survey-question-expert' => 'האם יש לך מומחיות בתחום שדף זה מכסה?',
	'articlefeedback-survey-question-expert-iftrue' => 'האם באפשרותך לתאר את תחום ההתמחות שלך?',
	'articlefeedback-survey-question-comments' => 'האם יש לך הערות נוספות?',
	'articlefeedback-survey-submit' => 'שליחה',
	'articlefeedback-survey-title' => 'נא לענות על מספר שאלות',
	'articlefeedback-survey-thanks' => 'תודה לך על מילוי הסקר.',
);

/** Croatian (Hrvatski)
 * @author Herr Mlinka
 * @author SpeedyGonsales
 */
$messages['hr'] = array(
	'articlefeedback' => 'Ocjenjivanje članaka',
	'articlefeedback-desc' => 'Ocjenjivanje članaka (probna inačica)',
	'articlefeedback-yourfeedback' => 'Vaše povratne informacije',
	'articlefeedback-pleaserate' => 'Molimo vas odvojite trenutak vremena kako bi ocijenili stranicu u nastavku.',
	'articlefeedback-submit' => 'Pošalji',
	'articlefeedback-rating-wellsourced' => 'Dobro potkrijepljeno izvorima:',
	'articlefeedback-rating-neutrality' => 'Neutralnost:',
	'articlefeedback-rating-completeness' => 'Zaokruženost (pokrivanja teme):',
	'articlefeedback-rating-readability' => 'Čitljivost:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Mislite li da ova stranica ima dovoljno citata koji imaju pouzdane izvore?',
	'articlefeedback-rating-neutrality-tooltip' => 'Mislite li da ova stranica prikazuje temu neutralno iz svih perspektiva?',
	'articlefeedback-rating-completeness-tooltip' => 'Mislite li da ova stranica pokriva osnovna područja teme koja bi trebala biti pokrivena?',
	'articlefeedback-rating-readability-tooltip' => 'Mislite li da je ova stranica dobro organizirana i dobro napisana?',
	'articlefeedback-articlerating' => 'Ocjena stranice',
	'articlefeedback-error' => 'Došlo je do pogreške. 
Molimo, pokušajte ponovno kasnije.',
	'articlefeedback-thanks' => 'Hvala! Vaše ocjene su sačuvane.',
	'articlefeedback-featurefeedback' => 'Dajte nam <span class="feedbacklink">povratne informacije</span> o mogućnosti ocjenjivanja članaka.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|ocjena|ocjene|ocjena}})',
	'articlefeedback-stalemessage-norevisioncount' => "Ova stranica je ''uređivana'' nakon vašeg ocjenjivanja.
Možda ju želite ocijeniti ponovo.",
	'articlefeedback-results-show' => '(Rezultati su skriveni. <span class="showlink">Pokažite</span> ih.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Sakrij rezultate</span>)',
	'articlefeedback-survey-question-whyrated' => 'Molimo recite nam zašto ste ocijenili danas ovu stranicu (označite sve što se može primijeniti):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Želio sam pridonijeti sveukupnoj ocjeni stranice',
	'articlefeedback-survey-answer-whyrated-development' => 'Nadam se da će moja ocjena imati pozitivno uticati na razvoj stranice',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Želim pridonijeti projektu {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Volim dijeliti svoje mišljenje',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Nisam dao ocjene danas, ali sam želio dati mišljenje o dogradnji',
	'articlefeedback-survey-answer-whyrated-other' => 'Ostalo',
	'articlefeedback-survey-question-useful' => 'Jesu li dane ocjene korisne i jasne?',
	'articlefeedback-survey-question-useful-iffalse' => 'Zašto?',
	'articlefeedback-survey-question-expert' => 'Smatrate li se stručnjakom za područje koje obrađuje ova stranica?',
	'articlefeedback-survey-question-expert-iftrue' => 'Možete li opisati svoju stručnost?',
	'articlefeedback-survey-question-comments' => 'Imate li neki dodatni komentar?',
	'articlefeedback-survey-submit' => 'Pošalji',
	'articlefeedback-survey-title' => 'Molimo odgovorite na nekoliko pitanja',
	'articlefeedback-survey-thanks' => 'Hvala vam na popunjavanju ankete.',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'articlefeedback' => 'Pohódnoćenje nastawkow',
	'articlefeedback-desc' => 'Pohódnoćenje nastawkow (pilotowa wersija)',
	'articlefeedback-yourfeedback' => 'Twój posudk',
	'articlefeedback-pleaserate' => 'Prošu bjer sej trochu časa, zo by slědowacu stronu pohódnoćił.',
	'articlefeedback-submit' => 'Wotpósłać',
	'articlefeedback-rating-wellsourced' => 'Derje dokładźeny:',
	'articlefeedback-rating-neutrality' => 'Neutralny:',
	'articlefeedback-rating-completeness' => 'Dospołny:',
	'articlefeedback-rating-readability' => 'Čitajomny:',
	'articlefeedback-rating-readability-tooltip' => 'Měniš, zo tuta strona je derje zorganizowana a derje napisana?',
	'articlefeedback-articlerating' => 'Pohódnoćenje strony',
	'articlefeedback-error' => 'Zmylk je wustupił.
Prošu spytaj pozdźišo hišće raz.',
	'articlefeedback-thanks' => 'Wulki dźak! Twoje pohódnoćenja su so składowali.',
	'articlefeedback-featurefeedback' => 'Prošu pósćel nam <span class="feedbacklink">pohódnoćenje</span> wo tutej funkciji.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|pohódnoćenje|pohódnoćeni|pohódnoćenja|pohódnoćenjow}})',
	'articlefeedback-results-show' => '(Wuslědki schowane. <span class="showlink">Pokazać</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Wuslědki schować</span>)',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Chcych k {{SITENAME}} přinošować',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Bych rady moje měnjenje dźělił',
	'articlefeedback-survey-answer-whyrated-other' => 'Druhe',
	'articlefeedback-survey-question-useful-iffalse' => 'Čehodla?',
	'articlefeedback-survey-question-expert-iftrue' => 'Móžeš swój wěcywustojnosć wopisać?',
	'articlefeedback-survey-question-comments' => 'Maš hišće dalše komentary?',
	'articlefeedback-survey-submit' => 'Wotpósłać',
	'articlefeedback-survey-title' => 'Prošu wotmołw na někotre prašenja',
	'articlefeedback-survey-thanks' => 'Dźakujemy so za twój posudk.',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Misibacsi
 */
$messages['hu'] = array(
	'articlefeedback' => 'Szócikk értékelése',
	'articlefeedback-desc' => 'Cikk értékelése (kísérleti változat)',
	'articlefeedback-yourfeedback' => 'Visszajelzés',
	'articlefeedback-pleaserate' => 'Kérjük, szánj rá egy kis időt, hogy értékeld ezt az alábbi oldalt.',
	'articlefeedback-submit' => 'Küldés',
	'articlefeedback-rating-wellsourced' => 'forrásokkal megfelelően alátámasztott',
	'articlefeedback-rating-neutrality' => 'Semleges:',
	'articlefeedback-rating-completeness' => 'Teljes:',
	'articlefeedback-rating-readability' => 'Olvashatóság:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Úgy érzed, ez az oldal a megfelelő hivatkozásokkal van ellátva és ezek megbízható forrásból származnak?',
	'articlefeedback-rating-neutrality-tooltip' => 'Úgy érzed, ez az oldal méltányosan bemutatja a témát minden szempontból?',
	'articlefeedback-rating-completeness-tooltip' => 'Úgy érzed, hogy ez az oldal tartalmaz minden lényeges témát ami ide tartozik?',
	'articlefeedback-rating-readability-tooltip' => 'Úgy érzed, hogy ez az oldal jól szervezett és jól meg van írva?',
	'articlefeedback-articlerating' => 'A lap értékelése',
	'articlefeedback-error' => 'Hiba történt. 
Kérjük, próbálkozz később.',
	'articlefeedback-thanks' => 'Köszönjük! Értékelésedet eltároltuk.',
	'articlefeedback-featurefeedback' => 'Írj nekünk <span class="feedbacklink">visszajelzést</span> erről a funkcióról.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL: $2 | értékelés | értékelés}})',
	'articlefeedback-stalemessage-norevisioncount' => 'Ezt az oldalt módosították, amióta utoljára értékelted. Érdemes lenne újból átnézni.',
	'articlefeedback-results-show' => '(Az eredmények rejtve vannak. <span class="showlink">Mutasd</span> őket.)',
	'articlefeedback-results-hide' => '<span class="hidelink">(Eredmények elrejtése)</span>',
	'articlefeedback-survey-question-whyrated' => 'Kérjük, mondd el nekünk, miért értékelted ezt az oldalt (jelöld meg a megfelelőket):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Azt akartam, hogy hozzájáruljak az oldal összesített értékeléséhez',
	'articlefeedback-survey-answer-whyrated-development' => 'Remélem, hogy az értékelésem pozitívan befolyásolja az oldal fejlődését',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Azt akartam, hogy hozzájáruljak ehhez: {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Szerettem volna megosztani a véleményemet',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Ma még nem adtam értékelést, de szerettem volna visszajelzést adni erről a funkcióról',
	'articlefeedback-survey-answer-whyrated-other' => 'Egyéb',
	'articlefeedback-survey-question-useful' => 'Hiszel abban, hogy az értékelések hasznosak és világosak?',
	'articlefeedback-survey-question-useful-iffalse' => 'Miért?',
	'articlefeedback-survey-question-expert' => 'Szakértőnek tartod magad abban a témában, amiről ez az oldal szól?',
	'articlefeedback-survey-question-expert-iftrue' => 'Le tudnád írni a szakértelmedet?',
	'articlefeedback-survey-question-comments' => 'Van még további észrevételed?',
	'articlefeedback-survey-submit' => 'Értékelés küldése',
	'articlefeedback-survey-title' => 'Kérjük, válaszolj néhány kérdésre',
	'articlefeedback-survey-thanks' => 'Köszönjük a kérdőív kitöltését!',
);

/** Interlingua (Interlingua)
 * @author Catrope
 * @author McDutchie
 */
$messages['ia'] = array(
	'articlefeedback' => 'Evalutation de articulos',
	'articlefeedback-desc' => 'Evalutation de articulos (version pilota)',
	'articlefeedback-yourfeedback' => 'Tu opinion',
	'articlefeedback-pleaserate' => 'Per favor prende un momento pro evalutar iste pagina hic infra.',
	'articlefeedback-submit' => 'Submitter',
	'articlefeedback-rating-wellsourced' => 'Ben referentiate:',
	'articlefeedback-rating-neutrality' => 'Neutral:',
	'articlefeedback-rating-completeness' => 'Complete:',
	'articlefeedback-rating-readability' => 'Legibile:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Pensa tu que iste articulo ha sufficiente citationes e que iste citationes refere a fontes digne de fide?',
	'articlefeedback-rating-neutrality-tooltip' => 'Pensa tu que iste articulo monstra un representation juste de tote le perspectivas super le question?',
	'articlefeedback-rating-completeness-tooltip' => 'Pensa tu que iste articulo coperi le themas essential que illo deberea coperir?',
	'articlefeedback-rating-readability-tooltip' => 'Pensa tu que iste articulo es ben organisate e ben scribite?',
	'articlefeedback-articlerating' => 'Evalutation del articulo',
	'articlefeedback-error' => 'Un error ha occurrite.
Per favor reproba plus tarde.',
	'articlefeedback-thanks' => 'Gratias! Tu evalutation ha essite salveguardate.',
	'articlefeedback-featurefeedback' => 'Da nos <span class="feedbacklink">tu opinion</span> super iste functionalitate.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|evalutation|evalutationes}})',
	'articlefeedback-stalemessage-norevisioncount' => "Iste articulo ha essite ''re-elaborate'' post tu ultime evalutation.
Es recommendate que tu lo re-evaluta.",
	'articlefeedback-results-show' => '(Resultatos celate. <span class="showlink">Revelar</span> los.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Celar resultatos</span>)',
	'articlefeedback-survey-question-whyrated' => 'Per favor dice nos proque tu ha evalutate iste pagina hodie (marca tote le optiones applicabile):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Io voleva contribuer al evalutation general del pagina',
	'articlefeedback-survey-answer-whyrated-development' => 'Io spera que mi evalutation ha un effecto positive sur le disveloppamento del pagina',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Io voleva contribuer a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Me place condivider mi opinion',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Io non dava un evalutation hodie, ma io voleva dar mi opinion super le functionalitate',
	'articlefeedback-survey-answer-whyrated-other' => 'Altere',
	'articlefeedback-survey-question-useful' => 'Crede tu que le evalutationes providite es utile e clar?',
	'articlefeedback-survey-question-useful-iffalse' => 'Proque?',
	'articlefeedback-survey-question-expert' => 'Esque tu te considera un experto in le campo que iste pagina coperi?',
	'articlefeedback-survey-question-expert-iftrue' => 'Pote tu describer tu expertise?',
	'articlefeedback-survey-question-comments' => 'Ha tu additional commentos?',
	'articlefeedback-survey-submit' => 'Submitter',
	'articlefeedback-survey-title' => 'Per favor responde a alcun questiones',
	'articlefeedback-survey-thanks' => 'Gratias pro completar le questionario.',
);

/** Indonesian (Bahasa Indonesia)
 * @author Farras
 */
$messages['id'] = array(
	'articlefeedback' => 'Penilaian artikel',
	'articlefeedback-desc' => 'Penilaian artikel (versi percobaan)',
	'articlefeedback-yourfeedback' => 'Umpan balik Anda',
	'articlefeedback-pleaserate' => 'Mohon luangkan waktu untuk menilai halaman di bawah.',
	'articlefeedback-submit' => 'Kirim',
	'articlefeedback-rating-wellsourced' => 'Sumber terpercaya:',
	'articlefeedback-rating-neutrality' => 'Netral:',
	'articlefeedback-rating-completeness' => 'Selesai:',
	'articlefeedback-rating-readability' => 'Dapat dibaca:',
	'articlefeedback-articlerating' => 'Peringkat halaman',
	'articlefeedback-error' => 'Kesalahan terjadi.
Silakan coba lagi.',
	'articlefeedback-thanks' => 'Terima kasih! Penilaian Anda telah disimpan.',
	'articlefeedback-featurefeedback' => 'Beri kami <span class="feedbacklink">umpan balik</span> tentang fitur ini.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|penilaian|penilaian}})',
	'articlefeedback-results-show' => '(Hasil disembunyikan. <span class="showlink">Tampilkan</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Sembunyikan hasil</span>)',
	'articlefeedback-survey-answer-whyrated-development' => 'Saya harap penilaian saya akan memberi dampak positif terhadap pengembangan halaman ini',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Saya ingin berkontribusi ke {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Saya ingin berbagi pendapat',
	'articlefeedback-survey-answer-whyrated-other' => 'Lainnya',
	'articlefeedback-survey-question-useful-iffalse' => 'Mengapa?',
	'articlefeedback-survey-question-expert-iftrue' => 'Dapatkah Anda menjelaskan keahlian Anda?',
	'articlefeedback-survey-question-comments' => 'Apakah Anda memiliki komentar tambahan?',
	'articlefeedback-survey-submit' => 'Kirim',
	'articlefeedback-survey-title' => 'Silakan jawab beberapa pertanyaan',
	'articlefeedback-survey-thanks' => 'Terima kasih telah mengisi survei ini.',
);

/** Italian (Italiano)
 * @author Beta16
 */
$messages['it'] = array(
	'articlefeedback' => 'Valutazione pagina',
	'articlefeedback-desc' => 'Valutazione pagina (versione pilota)',
	'articlefeedback-yourfeedback' => 'La tua opinione',
	'articlefeedback-pleaserate' => "Per favore, concedici un po' del tuo tempo per valutare questa pagina qui sotto.",
	'articlefeedback-submit' => 'Invia',
	'articlefeedback-rating-wellsourced' => 'Ben documentata:',
	'articlefeedback-rating-neutrality' => 'Neutrale:',
	'articlefeedback-rating-completeness' => 'Completa:',
	'articlefeedback-rating-readability' => 'Leggibile:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Ritieni che questa pagina abbia citazioni sufficienti e che queste citazioni provengano da fonti attendibili?',
	'articlefeedback-rating-neutrality-tooltip' => 'Ritieni che questa pagina mostri una rappresentazione equa di tutti i punti di vista sul tema?',
	'articlefeedback-rating-completeness-tooltip' => 'Ritieni che questa pagina copra le aree tematiche essenziali che dovrebbe?',
	'articlefeedback-rating-readability-tooltip' => 'Ritieni che questa pagina sia ben organizzata e ben scritta?',
	'articlefeedback-articlerating' => 'Giudizio pagina',
	'articlefeedback-error' => 'Si è verificato un errore. 
Si prega di riprovare più tardi.',
	'articlefeedback-thanks' => 'Grazie! Il tuo voto è stato salvato.',
	'articlefeedback-featurefeedback' => 'Inviaci i tuoi <span class="feedbacklink">commenti</span> su questa funzionalità.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|voto|voti}})',
	'articlefeedback-stalemessage-norevisioncount' => "Questa pagina è stata ''modificata'' dal tuo ultimo giudizio.
Probabilmente vuoi valutarla di nuovo.",
	'articlefeedback-results-show' => '(Risultati nascosti. <span class="showlink">Mostrali</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Nascondi risultati</span>)',
	'articlefeedback-survey-question-whyrated' => 'Esprimi il motivo per cui oggi hai valutato questa pagina (puoi selezionare più opzioni):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Ho voluto contribuire alla valutazione complessiva della pagina',
	'articlefeedback-survey-answer-whyrated-development' => 'Spero che il mio giudizio influenzi positivamente lo sviluppo della pagina',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Ho voluto contribuire a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Mi piace condividere la mia opinione',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Non ho fornito valutazioni oggi, ma ho voluto lasciare un feedback sulla funzionalità',
	'articlefeedback-survey-answer-whyrated-other' => 'Altro',
	'articlefeedback-survey-question-useful' => 'Pensi che le valutazioni fornite siano utili e chiare?',
	'articlefeedback-survey-question-useful-iffalse' => 'Perché?',
	'articlefeedback-survey-question-expert' => 'Ti consideri un esperto nel settore a cui appartiene il tema di questa pagina?',
	'articlefeedback-survey-question-expert-iftrue' => 'Ci puoi descrivere le tue competenze?',
	'articlefeedback-survey-question-comments' => 'Hai altri commenti?',
	'articlefeedback-survey-submit' => 'Invia',
	'articlefeedback-survey-title' => 'Per favore, rispondi ad alcune domande',
	'articlefeedback-survey-thanks' => 'Grazie per aver compilato il questionario.',
);

/** Japanese (日本語)
 * @author Marine-Blue
 * @author Yanajin66
 * @author 青子守歌
 */
$messages['ja'] = array(
	'articlefeedback' => '記事の評価',
	'articlefeedback-desc' => '記事の評価（パイロット版）',
	'articlefeedback-yourfeedback' => 'あなたの感想',
	'articlefeedback-pleaserate' => 'このページの評価を算出していますので、少しお待ちください。',
	'articlefeedback-submit' => '送信',
	'articlefeedback-rating-wellsourced' => '出典がよく示されている：',
	'articlefeedback-rating-neutrality' => '中立的：',
	'articlefeedback-rating-completeness' => '完成度：',
	'articlefeedback-rating-readability' => '読みやすさ：',
	'articlefeedback-rating-wellsourced-tooltip' => 'このページは、十分な出典を含んでいて、それらの出典は信憑性のある情報源によるものだと思いますか？',
	'articlefeedback-rating-neutrality-tooltip' => 'このページは、ある問題に対する全ての観点を平等に説明していると思いますか？',
	'articlefeedback-rating-completeness-tooltip' => 'この記事は、不可欠な話題を、説明していると思いますか？',
	'articlefeedback-rating-readability-tooltip' => 'この記事は、良く整理され、良く書かれていると思いますか？',
	'articlefeedback-articlerating' => 'ページの評価',
	'articlefeedback-error' => 'エラーが発生しました。
後でもう一度試みてください。',
	'articlefeedback-thanks' => 'ありがとうございます！評価は保存されました。',
	'articlefeedback-featurefeedback' => 'この機能について<span class="feedbacklink">フィードバック</span>をお願いします。',
	'articlefeedback-noratings' => '$1（$2の{{PLURAL:$2|評価}}）',
	'articlefeedback-stalemessage-norevisioncount' => "このページは、最後に評価してから、''修正''されました。
もう一度、評価してはいかがでしょうか。",
	'articlefeedback-results-show' => '（結果は隠されています。<span class="showlink">表示</span>する。）',
	'articlefeedback-results-hide' => '（<span class="hidelink">結果を隠す</span>）',
	'articlefeedback-survey-question-whyrated' => '今日、なぜこのページを評価したか教えてください（該当するものすべてにチェックを入れてください）：',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'ページの総合的評価を投稿したかった',
	'articlefeedback-survey-answer-whyrated-development' => '自分の評価が、このページの成長に良い影響を与えることを望んでいる',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => '{{SITENAME}}に貢献したい',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => '意見を共有したい',
	'articlefeedback-survey-answer-whyrated-didntrate' => '評価は与えなかったが、この機能に関するフィードバックをしたかった。',
	'articlefeedback-survey-answer-whyrated-other' => 'その他',
	'articlefeedback-survey-question-useful' => 'これらの評価は、分かりやすく、役に立つものだと思いますか？',
	'articlefeedback-survey-question-useful-iffalse' => 'なぜですか？',
	'articlefeedback-survey-question-expert' => '自分が、このページが扱う領域の専門家だと思いますか？',
	'articlefeedback-survey-question-expert-iftrue' => '専門知識を述べることができますか？',
	'articlefeedback-survey-question-comments' => '他に追加すべきコメントがありますか？',
	'articlefeedback-survey-submit' => '送信',
	'articlefeedback-survey-title' => '質問に少しお答えください',
	'articlefeedback-survey-thanks' => '調査に記入していただき、ありがとうございます。',
);

/** Korean (한국어)
 * @author Kwj2772
 */
$messages['ko'] = array(
	'articlefeedback' => '문서 평가',
	'articlefeedback-desc' => '문서 평가 (파일럿 버전)',
	'articlefeedback-yourfeedback' => '피드백',
	'articlefeedback-pleaserate' => '이 문서를 평가하는 데 잠시 시간을 내 주십시오.',
	'articlefeedback-submit' => '제출',
	'articlefeedback-rating-wellsourced' => '출처가 잘 제시됨:',
	'articlefeedback-rating-neutrality' => '중립성:',
	'articlefeedback-rating-completeness' => '완성도:',
	'articlefeedback-rating-readability' => '가독성:',
	'articlefeedback-rating-wellsourced-tooltip' => '이 문서가 출처를 충분히 제시하고 있고 그 출처가 신뢰할 수 있다고 생각하십니까?',
	'articlefeedback-rating-neutrality-tooltip' => '이 문서가 대상에 대해 중립적인 관점에서 쓰여 있다고 생각하십니까?',
	'articlefeedback-rating-completeness-tooltip' => '당신은 이 문서가 다루어야 할 중요한 주제에 대해 잘 다루고 있다고 생각하십니까?',
	'articlefeedback-rating-readability-tooltip' => '당신은 이 문서의 구성이 잘 짜여져 있고 글이 잘 쓰여있다고 생각하십니까?',
	'articlefeedback-articlerating' => '문서 평가',
	'articlefeedback-error' => '오류가 발생했습니다.
잠시 후에 대시 시도하십시오.',
	'articlefeedback-thanks' => '감사합니다! 당신이 평가한 내용이 저장되었습니다.',
	'articlefeedback-featurefeedback' => '이 기능에 대한 <span class="feedbacklink">피드백</span>을 남겨주세요.',
	'articlefeedback-noratings' => '$1 ($2{{PLURAL:$2|명이 평가}})',
	'articlefeedback-stalemessage-norevisioncount' => '이 문서는 당신이 평가한 이후 내용이 바뀌었습니다.
다시 평가하실 수 있습니다.',
	'articlefeedback-results-show' => '(결과가 숨겨져 있습니다. <span class="showlink">결과 보기</span>)',
	'articlefeedback-results-hide' => '(<span class="hidelink">결과 숨기기</span>)',
	'articlefeedback-survey-question-whyrated' => '오늘 이 문서를 왜 평가했는지 알려주십시오 (해당되는 모든 항목에 체크해주세요):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => '이 문서에 대한 전체적인 평가에 기여하고 싶어서',
	'articlefeedback-survey-answer-whyrated-development' => '내가 한 평가가 문서 발전에 긍정적인 영향을 줄 수 있다고 생각해서',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => '{{SITENAME}}에 기여하고 싶어서',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => '내 의견을 공유하고 싶어서',
	'articlefeedback-survey-answer-whyrated-didntrate' => '오늘 평가를 하지는 않았지만 이 기능에 대해 피드백을 남기고 싶어서',
	'articlefeedback-survey-answer-whyrated-other' => '기타',
	'articlefeedback-survey-question-useful' => '당신은 평가한 것이 유용하고 명확할 것이라 생각하십니까?',
	'articlefeedback-survey-question-useful-iffalse' => '왜 그렇게 생각하십니까?',
	'articlefeedback-survey-question-expert' => '당신은 이 문서가 다루고 있는 분야에 대해 전문가라고 생각하십니까?',
	'articlefeedback-survey-question-expert-iftrue' => '당신의 전문 지식에 대해 설명해주실 수 있습니까?',
	'articlefeedback-survey-question-comments' => '다른 의견이 있으십니까?',
	'articlefeedback-survey-submit' => '제출',
	'articlefeedback-survey-title' => '몇 가지 질문에 답해 주시기 바랍니다.',
	'articlefeedback-survey-thanks' => '설문에 응해 주셔서 감사합니다.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Catrope
 * @author Robby
 */
$messages['lb'] = array(
	'articlefeedback' => 'Artikelaschätzung',
	'articlefeedback-desc' => 'Artikelaschätzung Pilotversioun',
	'articlefeedback-yourfeedback' => 'Äre Feedback',
	'articlefeedback-pleaserate' => 'Huelt Iech w.e.g. een Ament fir déi Säit hei drënner ze bewäerten.',
	'articlefeedback-submit' => 'Späicheren',
	'articlefeedback-rating-wellsourced' => 'Gudd dokumentéiert:',
	'articlefeedback-rating-neutrality' => 'Neutral:',
	'articlefeedback-rating-completeness' => 'Komplett:',
	'articlefeedback-rating-readability' => 'Verständlech:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Hutt Dir den Androck datt dës Säit genuch Zitater huet an datt dës Zitater aus vertrauenswierdege Quelle kommen?',
	'articlefeedback-rating-neutrality-tooltip' => 'Hutt Dir den Androck datt dës Säit eng ausgeglache Presentatioun vun alle Perspektive vun dësem Thema weist?',
	'articlefeedback-rating-completeness-tooltip' => 'Hutt dir den Androck datt dës Säit déi wesentlech Aspekter vun dësem Sujet behandelt déi solle beliicht ginn?',
	'articlefeedback-rating-readability-tooltip' => 'Hutt Dir den Androck datt dës Säit gutt organiséiert a gutt geschriwwen ass?',
	'articlefeedback-articlerating' => 'Bewäertung vum Artikel',
	'articlefeedback-error' => 'Et ass e Feeler geschitt.
Probéiert w.e.g. méi spéit nach emol.',
	'articlefeedback-thanks' => 'Merci! Är Bewäertung gouf gespäichert.',
	'articlefeedback-featurefeedback' => 'Gitt eis Äre <span class="feedbacklink">Feedback</span> vun dëser Fonctioun.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|Bewäertung|Bewäertungen}})',
	'articlefeedback-stalemessage-norevisioncount' => "Dësen Artikel gouf zënter datt Dir e fir d'lescht nogekuckt hutt ''verännert''.
Et kéint sinn datt dir en nei bewäerte wëllt.",
	'articlefeedback-results-show' => '(D\'Resultater si verstopp. Resultater <span class="showlink">weisen</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Resultater verstoppen</span>)',
	'articlefeedback-survey-question-whyrated' => 'Sot eis w.e.g. firwat datt Dir dës säit bewäert hutt (klickt alles u wat zoutrëfft):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Ech wollt zur allgemenger Bewäertung vun der Säit bedroen',
	'articlefeedback-survey-answer-whyrated-development' => "Ech hoffen datt meng Bewäertung d'Entwécklung vun der Säit positiv beaflosst",
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Ech wollt mech un {{SITENAME}} bedeelegen',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Ech deele meng Meenung gäre mat',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Ech hunn haut keng Bewäertung ofginn, awer ech wollt mäi Feedback zu dëser Fonctionalitéit ginn',
	'articlefeedback-survey-answer-whyrated-other' => 'Anerer',
	'articlefeedback-survey-question-useful' => "Mengt Dir datt d'Bewäertungen hei nëtzlech a kloer sinn?",
	'articlefeedback-survey-question-useful-iffalse' => 'Firwat?',
	'articlefeedback-survey-question-expert' => 'Betruecht Dir Iech selwer als Expert am Gebitt dat op dëser Säit behandelt gëtt?',
	'articlefeedback-survey-question-expert-iftrue' => 'Kënnt Dir Äert Wësse beschreiwen?',
	'articlefeedback-survey-question-comments' => 'Hutt Dir nach aner Bemierkungen?',
	'articlefeedback-survey-submit' => 'Späicheren',
	'articlefeedback-survey-title' => 'Beäntwert w.e.g. e puer Froen',
	'articlefeedback-survey-thanks' => 'Merci datt Dir eis Ëmfro ausgefëllt hutt.',
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 */
$messages['li'] = array(
	'articlefeedback' => 'Paginabeoordeiling',
	'articlefeedback-desc' => 'Paginabeoordeiling (tesversie)',
	'articlefeedback-yourfeedback' => 'Diene feedback',
	'articlefeedback-pleaserate' => "Gaef e.t.b. 'n beoordeiling van dees pagina.",
	'articlefeedback-submit' => 'Slaon óp',
	'articlefeedback-rating-wellsourced' => 'Good van brónne veurzeen:',
	'articlefeedback-rating-neutrality' => 'Neutraal:',
	'articlefeedback-rating-completeness' => 'Compleet:',
	'articlefeedback-rating-readability' => 'Laesber:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Vinjs se det dees pagina zat brónne haet en det de brónne betroewber zeen?',
	'articlefeedback-rating-neutrality-tooltip' => "Vinjs se det dees pagina 'n ieërlike waergaaf is van alle invalsheuk veur dit óngerwerp?",
	'articlefeedback-rating-completeness-tooltip' => 'Vinjs se det dees pagina de essentie van dit óngerwerp bestriek?',
	'articlefeedback-rating-readability-tooltip' => "Vinjs se det dees pagina 'ne krekten ópboew haet en good is gesjreve?",
	'articlefeedback-articlerating' => 'Paginawaardering',
	'articlefeedback-survey-answer-whyrated-other' => 'Anges',
	'articlefeedback-survey-question-useful-iffalse' => 'Wróm?',
);

/** Latvian (Latviešu)
 * @author Papuass
 */
$messages['lv'] = array(
	'articlefeedback-yourfeedback' => 'Tavas atsauksmes',
	'articlefeedback-pleaserate' => 'Lūdzu, velti laiku, lai novērtētu šo lapu.',
	'articlefeedback-submit' => 'Iesniegt',
	'articlefeedback-rating-wellsourced' => 'Korektas atsauces:',
	'articlefeedback-rating-neutrality' => 'Neitralitāte:',
	'articlefeedback-rating-completeness' => 'Pilnīgums:',
	'articlefeedback-rating-readability' => 'Lasāmība:',
	'articlefeedback-articlerating' => 'Lapas vērtējums',
	'articlefeedback-error' => 'Notika kļūda. 
Lūdzu, mēģini vēlreiz vēlāk.',
	'articlefeedback-thanks' => 'Paldies! Tavs vērtējums ir saglabāts.',
	'articlefeedback-results-show' => '(Rezultāti paslēpti. <span class="showlink">Parādīt</span> tos.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Paslēpt rezultātus</span>)',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Man patīk dalīties ar viedokli',
	'articlefeedback-survey-answer-whyrated-other' => 'Cits',
	'articlefeedback-survey-question-useful-iffalse' => 'Kāpēc?',
	'articlefeedback-survey-question-expert-iftrue' => 'Vai tu vari aprakstīt savu specializāciju?',
	'articlefeedback-survey-question-comments' => 'Vai tev ir kādi papildus komentāri?',
	'articlefeedback-survey-submit' => 'Iesniegt',
	'articlefeedback-survey-title' => 'Lūdzu, atbildi uz dažiem jautājumiem',
	'articlefeedback-survey-thanks' => 'Paldies par piedalīšanos aptaujā.',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'articlefeedback' => 'Оценување на статија',
	'articlefeedback-desc' => 'Пилотна верзија на Оценување на статија',
	'articlefeedback-yourfeedback' => 'Ваше мислење',
	'articlefeedback-pleaserate' => 'Одвојте момент за да ја оцените страницава подолу',
	'articlefeedback-submit' => 'Поднеси',
	'articlefeedback-rating-wellsourced' => 'Доволно извори:',
	'articlefeedback-rating-neutrality' => 'Неутрална:',
	'articlefeedback-rating-completeness' => 'Исцрпна:',
	'articlefeedback-rating-readability' => 'Читлива:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Дали сметате дека статијава има доволно наводи и дека се преземени од доверливи извори?',
	'articlefeedback-rating-neutrality-tooltip' => 'Дали сметате дека статијава на праведен начин ги застапува сите гледишта на оваа проблематика?',
	'articlefeedback-rating-completeness-tooltip' => 'Дали сметате дека статијава ги обработува најважните основни теми што треба да се обработат?',
	'articlefeedback-rating-readability-tooltip' => 'Дали сметате дека статијава е добро организирана и убаво напишана?',
	'articlefeedback-articlerating' => 'Оценки за статијата',
	'articlefeedback-error' => 'Се појави грешка.
Обидете се подоцна.',
	'articlefeedback-thanks' => 'Ви благодариме! Вашите оценки се зачувани.',
	'articlefeedback-featurefeedback' => 'Дајте ваше <span class="feedbacklink">мислење</span> за оваа функција.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|оценка|оценки}})',
	'articlefeedback-stalemessage-norevisioncount' => "Статијава е ''преработена'' од последниот преглеед наваму.
Ви предлагаме да ја преоцените.",
	'articlefeedback-results-show' => '(Резултатите се скриени. <span class="showlink">Прикажи</span> ги.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Сокриј резултати</span>)',
	'articlefeedback-survey-question-whyrated' => 'Кажете ни зошто ја оценивте страницава денес (штиклирајте ги сите релевантни одговори)',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Сакав да придонесам кон севкупната оцена на страницата',
	'articlefeedback-survey-answer-whyrated-development' => 'Се надевам дека мојата оценка ќе влијае позитивно на развојот на страницата',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Сакав да придонесам кон {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Сакам да го искажувам моето мислење',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Не оценував денес, туку сакав да искажам мое мислење за функцијата',
	'articlefeedback-survey-answer-whyrated-other' => 'Друго',
	'articlefeedback-survey-question-useful' => 'Дали сметате дека дадените оценки се полезни и јасни?',
	'articlefeedback-survey-question-useful-iffalse' => 'Зошто?',
	'articlefeedback-survey-question-expert' => 'Дали се сметате за стручњак во тематиката што се обработува на страницава?',
	'articlefeedback-survey-question-expert-iftrue' => 'Можете ли да ги опишете вашите стручни познавања?',
	'articlefeedback-survey-question-comments' => 'Имате некои други забелешки?',
	'articlefeedback-survey-submit' => 'Поднеси',
	'articlefeedback-survey-title' => 'Ве молиме одговорете на неколку прашања',
	'articlefeedback-survey-thanks' => 'Ви благодариме што ја пополнивте анкетата.',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'articlefeedback' => 'ലേഖനത്തിന്റെ മൂല്യനിർണ്ണയം',
	'articlefeedback-desc' => 'ലേഖനത്തിന്റെ മൂല്യനിർണ്ണയം (പ്രാരംഭ പതിപ്പ്)',
	'articlefeedback-yourfeedback' => 'താങ്കളുടെ അഭിപ്രായങ്ങൾ',
	'articlefeedback-pleaserate' => 'താഴെ ഈ താളിന്റെ മൂല്യനിർണ്ണയം നടത്താൻ ഒരു നിമിഷം ചിലവാക്കുക.',
	'articlefeedback-submit' => 'സമർപ്പിക്കുക',
	'articlefeedback-rating-wellsourced' => 'സ്രോതസ്സധിഷ്ഠിതം:',
	'articlefeedback-rating-neutrality' => 'നിഷ്പക്ഷം:',
	'articlefeedback-rating-completeness' => 'സമ്പൂർണ്ണം:',
	'articlefeedback-rating-readability' => 'വായനായോഗ്യം:',
	'articlefeedback-rating-wellsourced-tooltip' => 'ഈ താളിൽ വിശ്വസനീയങ്ങളായ സ്രോതസ്സുകളെ ആശ്രയിക്കുന്ന ആവശ്യമായത്ര അവലംബങ്ങൾ ഉണ്ടെന്ന് താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articlefeedback-rating-neutrality-tooltip' => 'ഈ താളിൽ വിഷയത്തിന്റെ എല്ലാ വശത്തിനും അർഹമായ പ്രാതിനിധ്യം ലഭിച്ചതായി താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articlefeedback-rating-completeness-tooltip' => 'ഈ താൾ അത് ഉൾക്കൊള്ളേണ്ട എല്ലാ മേഖലകളും ഉൾക്കൊള്ളുന്നതായി താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articlefeedback-rating-readability-tooltip' => 'ഈ താൾ നന്നായി ക്രമീകരിക്കപ്പെട്ടതും നന്നായി എഴുതപ്പെട്ടതുമാണെന്ന് താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articlefeedback-articlerating' => 'താളിന്റെ നിലവാരം',
	'articlefeedback-error' => 'എന്തോ പിഴവുണ്ടായിരിക്കുന്നു.
ദയവായി വീണ്ടും ശ്രമിക്കുക.',
	'articlefeedback-thanks' => 'നന്ദി! താങ്കൾ നടത്തിയ മൂല്യനിർണ്ണയം സേവ് ചെയ്തിരിക്കുന്നു.',
	'articlefeedback-featurefeedback' => 'ഈ സൗകര്യത്തെക്കുറിച്ചുള്ള <span class="feedbacklink">അഭിപ്രായങ്ങൾ</span> അറിയിക്കുക.',
	'articlefeedback-noratings' => '$1 ({{PLURAL:$2|ഒരു നിലവാരമിടൽ|$2 നിലവാരമിടലുകൾ}})',
	'articlefeedback-stalemessage-norevisioncount' => "താങ്കൾ നിലവാരമിട്ട ശേഷം ഈ താൾ ''മെച്ചപ്പെടുത്തിയിരിക്കുന്നു''
ആവശ്യമെങ്കിൽ താങ്കൾക്ക് വീണ്ടും നിലവാരമിടാവുന്നതാണ്.",
	'articlefeedback-results-show' => '(ഫലങ്ങൾ ദൃശ്യമല്ല. അവ <span class="showlink">പ്രദർശിപ്പിക്കുക</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">ഫലങ്ങൾ മറയ്ക്കുക</span>)',
	'articlefeedback-survey-question-whyrated' => 'ഈ താളിന് താങ്കൾ ഇന്ന് നിലവാരമിട്ടതെന്തുകൊണ്ടാണെന്ന് ദയവായി പറയാമോ (ബാധകമാകുന്ന എല്ലാം തിരഞ്ഞെടുക്കുക):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'താളിന്റെ ആകെ നിലവാരം നിർണ്ണയിക്കാൻ ഞാനാഗ്രഹിക്കുന്നു',
	'articlefeedback-survey-answer-whyrated-development' => 'ഞാനിട്ട നിലവാരം താളിന്റെ വികസനത്തിൽ ക്രിയാത്മകമായ ഫലങ്ങൾ സൃഷ്ടിക്കുമെന്ന് കരുതുന്നു',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'ഞാൻ {{SITENAME}} സംരംഭത്തിൽ സംഭാവന ചെയ്യാൻ ആഗ്രഹിക്കുന്നു',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'എന്റെ അഭിപ്രായം പങ്ക് വെയ്ക്കുന്നതിൽ സന്തോഷമേയുള്ളു',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'ഞാനിന്ന് നിലവാരനിർണ്ണയം നടത്തിയിട്ടില്ല, പക്ഷേ ഈ സൗകര്യം സംബന്ധിച്ച അഭിപ്രായം അറിയിക്കാൻ ആഗ്രഹിക്കുന്നു',
	'articlefeedback-survey-answer-whyrated-other' => 'മറ്റുള്ളവ',
	'articlefeedback-survey-question-useful' => 'നൽകിയിരിക്കുന്ന നിലവാരം ഉപകാരപ്രദവും വ്യക്തവുമാണെന്ന് താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articlefeedback-survey-question-useful-iffalse' => 'എന്തുകൊണ്ട്?',
	'articlefeedback-survey-question-expert' => 'ഈ താളിലെ വിഷയത്തിൽ താങ്കൾ വിദഗ്ദ്ധനാണെന്ന് താങ്കൾ സ്വയം കരുതുന്നുണ്ടോ?',
	'articlefeedback-survey-question-expert-iftrue' => 'താങ്കളുടെ വൈദഗ്ദ്ധ്യം വിവരിക്കാമോ?',
	'articlefeedback-survey-question-comments' => 'താങ്കൾക്ക് മറ്റെന്തെങ്കിലും അഭിപ്രായങ്ങൾ പങ്ക് വെയ്ക്കാനുണ്ടോ?',
	'articlefeedback-survey-submit' => 'സമർപ്പിക്കുക',
	'articlefeedback-survey-title' => 'ദയവായി ഏതാനം ചോദ്യങ്ങൾക്ക് ഉത്തരം നൽകുക',
	'articlefeedback-survey-thanks' => 'സർവേ പൂരിപ്പിച്ചതിനു നന്ദി',
);

/** Mongolian (Монгол)
 * @author Chinneeb
 */
$messages['mn'] = array(
	'articlefeedback-submit' => 'Явуулах',
	'articlefeedback-survey-submit' => 'Явуулах',
);

/** Malay (Bahasa Melayu)
 * @author Aviator
 */
$messages['ms'] = array(
	'articlefeedback' => 'Pentaksiran rencana',
	'articlefeedback-desc' => 'Pentaksiran rencana (versi percubaan)',
	'articlefeedback-yourfeedback' => 'Maklum balas anda',
	'articlefeedback-pleaserate' => 'Sila luangkan masa untuk menilai laman ini di bawah.',
	'articlefeedback-submit' => 'Serah',
	'articlefeedback-rating-wellsourced' => 'Bersumber:',
	'articlefeedback-rating-neutrality' => 'Neutral:',
	'articlefeedback-rating-completeness' => 'Lengkap:',
	'articlefeedback-rating-readability' => 'Mudah dibaca:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Adakah laman ini mempunyai pemetikan-pemetikan yang cukup dan diambil daripada sumber-sumber yang boleh dipercayai?',
	'articlefeedback-rating-readability-tooltip' => 'Adakah laman ini teratur dan ditulis dengan baik?',
	'articlefeedback-articlerating' => 'Penilaian laman',
	'articlefeedback-error' => 'Berlaku ralat. Sila cuba lagi lain kali.',
	'articlefeedback-thanks' => 'Terima kasih! Penilaian anda telah disimpan.',
	'articlefeedback-featurefeedback' => 'Beri kami <span class="feedbacklink">maklum balas</span> mengenai ciri ini.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|penilaian|penilaian}})',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'articlefeedback-survey-answer-whyrated-other' => 'Лия',
	'articlefeedback-survey-question-useful-iffalse' => 'Мезекс?',
	'articlefeedback-survey-submit' => 'Максомс',
);

/** Dutch (Nederlands)
 * @author Catrope
 * @author Siebrand
 */
$messages['nl'] = array(
	'articlefeedback' => 'Paginabeoordeling',
	'articlefeedback-desc' => 'Paginabeoordeling (testversie)',
	'articlefeedback-yourfeedback' => 'Uw terugkoppeling',
	'articlefeedback-pleaserate' => 'Geef alstublieft een beoordeling van deze pagina.',
	'articlefeedback-submit' => 'Opslaan',
	'articlefeedback-rating-wellsourced' => 'Goed van bronnen voorzien:',
	'articlefeedback-rating-neutrality' => 'Neutraal:',
	'articlefeedback-rating-completeness' => 'Compleet:',
	'articlefeedback-rating-readability' => 'Leesbaar:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Vindt u dat deze pagina voldoende bronvermeldingen heeft en dat de bronvermeldingen betrouwbaar zijn?',
	'articlefeedback-rating-neutrality-tooltip' => 'Vindt u dat deze pagina een eerlijke weergave is van alle invalshoeken voor dit onderwerp?',
	'articlefeedback-rating-completeness-tooltip' => 'Vindt u dat deze pagina de essentie van dit onderwerp bestrijkt?',
	'articlefeedback-rating-readability-tooltip' => 'Vindt u dat deze pagina een correcte opbouw heeft een goed is geschreven?',
	'articlefeedback-articlerating' => 'Paginawaardering',
	'articlefeedback-error' => 'Er is een fout opgetreden. 
Probeer het later opnieuw.',
	'articlefeedback-thanks' => 'Bedankt!
Uw beoordeling is opgeslagen.',
	'articlefeedback-featurefeedback' => 'Geef ons <span class="feedbacklink">terugkoppeling</span> over deze functie.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|beoordeling|beoordelingen}})',
	'articlefeedback-stalemessage-norevisioncount' => "Deze pagina is ''aangepast'' sinds uw beoordeling.
Wilt u de pagina opnieuw beoordelen?",
	'articlefeedback-results-show' => '(<span class="showlink">resultaten weergeven</span>)',
	'articlefeedback-results-hide' => '(<span class="hidelink">resultaten verbergen</span>)',
	'articlefeedback-survey-question-whyrated' => 'Laat ons weten waarom u deze pagina vandaag hebt beoordeeld (kies alle redenen die van toepassing zijn):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Ik wil bijdragen aan de beoordelingen van de pagina',
	'articlefeedback-survey-answer-whyrated-development' => 'Ik hoop dat mijn beoordeling een positief effect heeft op de ontwikkeling van de pagina',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Ik wilde bijdragen aan {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Ik vind het fijn om mijn mening te delen',
	'articlefeedback-survey-answer-whyrated-didntrate' => "Ik heb vandaag geen pagina's beoordeeld, maar in de toekomst wil ik wel terugkoppeling geven",
	'articlefeedback-survey-answer-whyrated-other' => 'Anders',
	'articlefeedback-survey-question-useful' => 'Vindt u dat de beoordelingen bruikbaar en duidelijk zijn?',
	'articlefeedback-survey-question-useful-iffalse' => 'Waarom?',
	'articlefeedback-survey-question-expert' => 'Vindt u zichzelf een expert in de materie waarover deze pagina gaat?',
	'articlefeedback-survey-question-expert-iftrue' => 'Kunt u uw expertise beschrijven?',
	'articlefeedback-survey-question-comments' => 'Hebt u nog opmerkingen?',
	'articlefeedback-survey-submit' => 'Opslaan',
	'articlefeedback-survey-title' => 'Beantwoord alstublieft een paar vragen',
	'articlefeedback-survey-thanks' => 'Bedankt voor het beantwoorden van de vragen.',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Nghtwlkr
 */
$messages['nn'] = array(
	'articlefeedback-survey-question-useful-iffalse' => 'Kvifor?',
	'articlefeedback-survey-submit' => 'Send',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'articlefeedback' => 'Artikkelvurdering',
	'articlefeedback-desc' => 'Artikkelvurdering (pilotversjon)',
	'articlefeedback-yourfeedback' => 'Din tilbakemelding',
	'articlefeedback-pleaserate' => 'Vennligst ta deg tid til å vurdere denne siden nedenfor.',
	'articlefeedback-submit' => 'Send',
	'articlefeedback-rating-wellsourced' => 'Gode kildehenvisninger:',
	'articlefeedback-rating-neutrality' => 'Nøytral:',
	'articlefeedback-rating-completeness' => 'Komplett:',
	'articlefeedback-rating-readability' => 'Lesbar:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Føler du at denne siden har tilstrekkelig med siteringer og at disse siteringene kommer fra pålitelige kilder?',
	'articlefeedback-rating-neutrality-tooltip' => 'Føler du at denne siden viser en rettferdig representasjon av alle perspektiv på problemet?',
	'articlefeedback-rating-completeness-tooltip' => 'Føler du at denne siden dekker de grunnleggende emneområdene som det burde?',
	'articlefeedback-rating-readability-tooltip' => 'Føler du at denne siden er godt organisert og godt skrevet?',
	'articlefeedback-articlerating' => 'Sidevurdering',
	'articlefeedback-error' => 'En feil har oppstått.
Prøv igjen senere.',
	'articlefeedback-thanks' => 'Takk! Din vurdering har blitt lagret.',
	'articlefeedback-featurefeedback' => 'Gi oss <span class="feedbacklink">tilbakemelding</span> på denne funksjonen.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|vurdering|vurderinger}})',
	'articlefeedback-stalemessage-norevisioncount' => "Denne siden har blitt ''revidert'' siden du siste vurderte den.
Du vil kanskje vurdere den på nytt.",
	'articlefeedback-results-show' => '(Resultat skjult. <span class="showlink">Vis</span> dem.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Skjul resultat</span>)',
	'articlefeedback-survey-question-whyrated' => 'Gi oss beskjed om hvorfor du vurderte denne siden idag (huk av alle som passer):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Jeg ønsket å bidra til den generelle vurderingen av denne siden',
	'articlefeedback-survey-answer-whyrated-development' => 'Jeg håper at min vurdering vil påvirke utviklingen av siden positivt',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Jeg ønsket å bidra til {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Jeg liker å dele min mening',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Jeg ga ingen vurderinger idag, men ønsket å gi tilbakemelding på denne funksjonen',
	'articlefeedback-survey-answer-whyrated-other' => 'Annet',
	'articlefeedback-survey-question-useful' => 'Tror du at vurderingene som blir gitt er nyttige og klare?',
	'articlefeedback-survey-question-useful-iffalse' => 'Hvorfor?',
	'articlefeedback-survey-question-expert' => 'Anser du degselv for å være en ekspert på feltet som denne siden dekker?',
	'articlefeedback-survey-question-expert-iftrue' => 'Kan du beskrive din ekspertise?',
	'articlefeedback-survey-question-comments' => 'Har du noen ytterligere kommentarer?',
	'articlefeedback-survey-submit' => 'Send',
	'articlefeedback-survey-title' => 'Svar på noen få spørsmål',
	'articlefeedback-survey-thanks' => 'Takk for at du fylte ut undersøkelsen.',
);

/** Polish (Polski)
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'articlefeedback' => 'Ocena artykułu',
	'articlefeedback-desc' => 'Ocena artykułu (wersja pilotażowa)',
	'articlefeedback-yourfeedback' => 'Twoja opinia',
	'articlefeedback-pleaserate' => 'Poświeć chwilę, aby ocenić poniższą stronę.',
	'articlefeedback-submit' => 'Zapisz',
	'articlefeedback-rating-wellsourced' => 'Dobre źródła',
	'articlefeedback-rating-neutrality' => 'Neutralny punkt widzenia',
	'articlefeedback-rating-completeness' => 'Wyczerpanie tematu',
	'articlefeedback-rating-readability' => 'Zrozumiałość',
	'articlefeedback-rating-wellsourced-tooltip' => 'Czy uważasz, że strona ma wystarczającą liczbę odnośników i że odnoszą się one do wiarygodnych źródeł?',
	'articlefeedback-rating-neutrality-tooltip' => 'Czy uważasz, że strona prezentuje wszystkie punkty widzenia na to zagadnienie?',
	'articlefeedback-rating-completeness-tooltip' => 'Czy uważasz, że strona porusza wszystkie istotne aspekty, które powinna?',
	'articlefeedback-rating-readability-tooltip' => 'Czy uważasz, że strona jest poprawnie sformatowana oraz zrozumiale napisana?',
	'articlefeedback-articlerating' => 'Ocena strony',
	'articlefeedback-error' => 'Wystąpił błąd. 
Spróbuj ponownie później.',
	'articlefeedback-thanks' => 'Wystawiona przez Ciebie ocena została zapisana.',
	'articlefeedback-featurefeedback' => '<span class="feedbacklink">Napisz do autorów</span> co myślisz o tym rozszerzeniu.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|ocena|oceny|ocen}})',
	'articlefeedback-stalemessage-norevisioncount' => "Strona została ''zmieniona'' od czasu, gdy ją oceniałeś.
Możesz ocenić ją ponownie.",
	'articlefeedback-results-show' => '(Wyniki ukryte. <span class="showlink">Pokaż</span> je.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Ukryj wyniki</span>)',
	'articlefeedback-survey-question-whyrated' => 'Dlaczego oceniłeś dziś tę stronę (zaznacz wszystkie pasujące):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Chciałem mieć wpływ na ogólną ocenę strony',
	'articlefeedback-survey-answer-whyrated-development' => 'Mam nadzieję, że moja ocena pozytywnie wpłynie na rozwój strony',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Chciałem mieć swój wkład w rozwój {{GRAMMAR:D.lp|{{SITENAME}}}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Lubię dzielić się swoją opinią',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Nie oceniałem dziś, ale chcę podzielić się swoją opinią na temat tego rozszerzenia',
	'articlefeedback-survey-answer-whyrated-other' => 'Inny powód',
	'articlefeedback-survey-question-useful' => 'Czy uważasz, że taka metoda oceniania jest użyteczna i czytelna?',
	'articlefeedback-survey-question-useful-iffalse' => 'Dlaczego?',
	'articlefeedback-survey-question-expert' => 'Czy uważasz się za eksperta w tematyce, którą porusza ta strona?',
	'articlefeedback-survey-question-expert-iftrue' => 'Czy możesz opisać swój poziom wiedzy?',
	'articlefeedback-survey-question-comments' => 'Czy masz jakieś dodatkowe uwagi?',
	'articlefeedback-survey-submit' => 'Zapisz',
	'articlefeedback-survey-title' => 'Proszę udzielić odpowiedzi na kilka pytań',
	'articlefeedback-survey-thanks' => 'Dziękujemy za wypełnienie ankiety.',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'articlefeedback' => "Valutassion ëd j'artìcoj",
	'articlefeedback-desc' => "Version pilòta dla valutassion ëd j'artìcoj",
	'articlefeedback-yourfeedback' => 'Sò coment',
	'articlefeedback-pleaserate' => "Për piasì, ch'a dédica un moment për valuté la pàgina sì-sota.",
	'articlefeedback-submit' => 'Spediss',
	'articlefeedback-rating-wellsourced' => 'Con dle bon-e sorgiss:',
	'articlefeedback-rating-neutrality' => 'Neutral:',
	'articlefeedback-rating-completeness' => 'Completa:',
	'articlefeedback-rating-readability' => 'Lesìbil:',
	'articlefeedback-rating-wellsourced-tooltip' => "Pens-lo che st'artìcol a l'abia a basta ëd citassion e che ste citassion a rivo da 'd sorgiss fidà?",
	'articlefeedback-rating-neutrality-tooltip' => 'Pens-lo che sta pàgina a smon-a na giusta rapresentassion ëd tuti ij pont ëd vista dla chestion?',
	'articlefeedback-rating-completeness-tooltip' => "Pens-lo che sta pàgina a coata ij tema essensiaj ëd l'argoment com a dovrìa?",
	'articlefeedback-rating-readability-tooltip' => 'Pens-lo che sta pàgina a sia bin organisà e bin scrivùa?',
	'articlefeedback-articlerating' => 'Valutassion ëd la pàgina',
	'articlefeedback-error' => "A l'é capitaje n'eror.
Për piasì, ch'a preuva torna pi tard.",
	'articlefeedback-thanks' => 'Mersì! Toe valutassion a son ëstàite salvà.',
	'articlefeedback-featurefeedback' => 'Ch\'an manda dij <span class="feedbacklink">coment</span> a propòsit ëd costa fonsionalità.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|valutassion|valutassion}})',
	'articlefeedback-stalemessage-norevisioncount' => "Sta pàgina a l'é stàita ''revisionà'' da quand ch'a l'ha revisionala chiel.
A podrìa vorèj valutela torna.",
	'articlefeedback-results-show' => '(Arzultà stërmà. <span class="showlink">Smonje</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Stërmé j\'arzultà</span>)',
	'articlefeedback-survey-question-whyrated' => "Për piasì, ch'an fasa savèj përchè a l'ha valutà costa pàgina ancheuj (ch'a marca tut lòn ch'a-i intra):",
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'I vorìa contribuì a la valutassion global ëd la pàgina',
	'articlefeedback-survey-answer-whyrated-development' => 'I spero che mia valutassion a peussa toché positivament ël dësvlup ëd la pàgina',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'I veui contribuì a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Am pias condivide mia opinion',
	'articlefeedback-survey-answer-whyrated-didntrate' => "I l'heu pa dàit ëd valutassion ancheuj, ma i vorìa dé un coment an sla fonsionalità",
	'articlefeedback-survey-answer-whyrated-other' => 'Àutr',
	'articlefeedback-survey-question-useful' => 'Chërdës-to che le valutassion dàite a sio ùtij e ciàire?',
	'articlefeedback-survey-question-useful-iffalse' => 'Përchè?',
	'articlefeedback-survey-question-expert' => "As consìdera chiel midem n'espert ant ël camp che sta pàgina a coata?",
	'articlefeedback-survey-question-expert-iftrue' => 'Peuss-to descrive toa esperiensa?',
	'articlefeedback-survey-question-comments' => "Ha-lo d'àutri coment?",
	'articlefeedback-survey-submit' => 'Spediss',
	'articlefeedback-survey-title' => "Për piasì, ch'a risponda a chèich chestion",
	'articlefeedback-survey-thanks' => "Mersì d'avèj compilà ël questionari.",
);

/** Portuguese (Português)
 * @author Giro720
 * @author Hamilton Abreu
 * @author Waldir
 */
$messages['pt'] = array(
	'articlefeedback' => 'Avaliação do artigo',
	'articlefeedback-desc' => 'Avaliação do artigo (versão de testes)',
	'articlefeedback-yourfeedback' => 'Os seus comentários',
	'articlefeedback-pleaserate' => 'Dedique um momento a avaliar esta página abaixo, por favor.',
	'articlefeedback-submit' => 'Enviar',
	'articlefeedback-rating-wellsourced' => 'Bem referenciado:',
	'articlefeedback-rating-neutrality' => 'Neutro:',
	'articlefeedback-rating-completeness' => 'Completo:',
	'articlefeedback-rating-readability' => 'Fácil de ler:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Considera que esta página tem citações suficientes e que essas citações provêm de fontes fiáveis?',
	'articlefeedback-rating-neutrality-tooltip' => 'Acha que esta página representa, de forma equilibrada, todos os pontos de vista sobre o assunto?',
	'articlefeedback-rating-completeness-tooltip' => 'Considera que esta página aborda os temas essenciais que deviam ser cobertos?',
	'articlefeedback-rating-readability-tooltip' => 'Acha que esta página está bem organizada e bem escrita?',
	'articlefeedback-articlerating' => 'Avaliação da página',
	'articlefeedback-error' => 'Ocorreu um erro. 
Tente novamente mais tarde, por favor.',
	'articlefeedback-thanks' => 'Obrigado! As suas avaliações foram gravadas.',
	'articlefeedback-featurefeedback' => 'Envie-nos os seus <span class="feedbacklink">comentários</span> sobre esta funcionalidade.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|avaliação|avaliações}})',
	'articlefeedback-stalemessage-norevisioncount' => "Esta página foi ''alterada'' desde a sua última revisão. 
Talvez queira voltar a avaliá-la.",
	'articlefeedback-results-show' => '(Resultados ocultados. <span class="showlink">Mostrá-los</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Ocultar os resultados</span>)',
	'articlefeedback-survey-question-whyrated' => 'Diga-nos porque é que classificou esta página hoje (marque todas as opções verdadeiras):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Queria contribuir para a classificação global da página',
	'articlefeedback-survey-answer-whyrated-development' => 'Espero que a minha classificação afecte positivamente o desenvolvimento da página',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Queria colaborar com a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Gosto de dar a minha opinião',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Hoje não classifiquei páginas, mas queria deixar o meu comentário sobre a funcionalidade',
	'articlefeedback-survey-answer-whyrated-other' => 'Outra',
	'articlefeedback-survey-question-useful' => 'Acredita que as classificações dadas são úteis e claras?',
	'articlefeedback-survey-question-useful-iffalse' => 'Porquê?',
	'articlefeedback-survey-question-expert' => 'Considera-se um perito na área descrita nesta página?',
	'articlefeedback-survey-question-expert-iftrue' => 'Pode descrever a sua experiência?',
	'articlefeedback-survey-question-comments' => 'Tem mais comentários?',
	'articlefeedback-survey-submit' => 'Enviar',
	'articlefeedback-survey-title' => 'Por favor, responda a algumas perguntas',
	'articlefeedback-survey-thanks' => 'Obrigado por preencher o inquérito.',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Giro720
 */
$messages['pt-br'] = array(
	'articlefeedback' => 'Avaliação do artigo',
	'articlefeedback-desc' => 'Avaliação do artigo (versão de testes)',
	'articlefeedback-yourfeedback' => 'Os seus comentários',
	'articlefeedback-pleaserate' => 'Dedique um momento para avaliar esta página abaixo, por favor.',
	'articlefeedback-submit' => 'Enviar',
	'articlefeedback-rating-wellsourced' => 'Bem referenciado:',
	'articlefeedback-rating-neutrality' => 'Neutro:',
	'articlefeedback-rating-completeness' => 'Completo:',
	'articlefeedback-rating-readability' => 'Fácil de ler:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Você considera que esta página tem citações suficientes e que essas citações provêm de fontes fiáveis?',
	'articlefeedback-rating-neutrality-tooltip' => 'Você acha que esta página representa, de forma equilibrada, todos os pontos de vista sobre o assunto?',
	'articlefeedback-rating-completeness-tooltip' => 'Você considera que esta página aborda os temas essenciais que deviam ser cobertos?',
	'articlefeedback-rating-readability-tooltip' => 'Você acha que esta página está bem organizada e bem escrita?',
	'articlefeedback-articlerating' => 'Avaliação da página',
	'articlefeedback-error' => 'Ocorreu um erro. 
Por favor, tente novamente mais tarde.',
	'articlefeedback-thanks' => 'Obrigado! As suas avaliações foram salvas.',
	'articlefeedback-featurefeedback' => 'Envie-nos os seus <span class="feedbacklink">comentários</span> sobre esta funcionalidade.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|avaliação|avaliações}})',
	'articlefeedback-stalemessage-norevisioncount' => "Esta página foi ''alterada'' desde a sua última revisão. 
Talvez queira voltar a avaliá-la.",
	'articlefeedback-results-show' => '(Resultados ocultados. <span class="showlink">Mostrá-los</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Ocultar os resultados</span>)',
	'articlefeedback-survey-question-whyrated' => 'Diga-nos porque é que classificou esta página hoje, por favor (marque todas as opções as quais se aplicam):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Eu queria contribuir para a classificação global da página',
	'articlefeedback-survey-answer-whyrated-development' => 'Eu espero que a minha classificação afete positivamente o desenvolvimento da página',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Eu queria colaborar com a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Eu gosto de dar a minha opinião',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Hoje não classifiquei páginas, mas queria deixar o meu comentário sobre a funcionalidade',
	'articlefeedback-survey-answer-whyrated-other' => 'Outra',
	'articlefeedback-survey-question-useful' => 'Você acredita que as classificações dadas são úteis e claras?',
	'articlefeedback-survey-question-useful-iffalse' => 'Por quê?',
	'articlefeedback-survey-question-expert' => "Você se considera um ''expert'' na área descrita nesta página?",
	'articlefeedback-survey-question-expert-iftrue' => 'Você pode descrever a sua experiência?',
	'articlefeedback-survey-question-comments' => 'Você tem mais algum comentário?',
	'articlefeedback-survey-submit' => 'Enviar',
	'articlefeedback-survey-title' => 'Por favor, responda a algumas perguntas',
	'articlefeedback-survey-thanks' => 'Obrigado por preencher o questionário.',
);

/** Romanian (Română)
 * @author Firilacroco
 * @author Minisarm
 * @author Stelistcristi
 * @author Strainu
 */
$messages['ro'] = array(
	'articlefeedback' => 'Evaluare articol',
	'articlefeedback-desc' => 'Evaluare articol (versiunea pilot)',
	'articlefeedback-yourfeedback' => 'Reacția dumneavoastră',
	'articlefeedback-pleaserate' => 'Vă rugăm să acordați un moment evaluării acestei pagini, mai jos.',
	'articlefeedback-submit' => 'Trimite',
	'articlefeedback-rating-wellsourced' => 'Bine referențiat:',
	'articlefeedback-rating-neutrality' => 'Neutru:',
	'articlefeedback-rating-completeness' => 'Complet:',
	'articlefeedback-rating-readability' => 'Citeț:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Considerați că această pagină are suficiente citate/note și acestea provin din surse de încredere?',
	'articlefeedback-rating-neutrality-tooltip' => 'Considerați că această pagină conține o reprezentare echitabilă a tuturor perspectivelor privitoare la subiect?',
	'articlefeedback-rating-completeness-tooltip' => 'Considerați că această pagină abordează subiectele esențiale care ar trebui acoperite?',
	'articlefeedback-rating-readability-tooltip' => 'Considerați că această pagină este bine organizată și bine scrisă?',
	'articlefeedback-articlerating' => 'Evaluarea paginii',
	'articlefeedback-error' => 'A apărut o eroare.
Vă rugăm să încercați din nou mai târziu.',
	'articlefeedback-thanks' => 'Vă mulțumim! Evaluările dumneavoastră au fost salvate.',
	'articlefeedback-featurefeedback' => 'Oferiți-ne <span class="feedbacklink">reacții</span> la această funcție.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|evaluare|evaluări}})',
	'articlefeedback-stalemessage-norevisioncount' => "Această pagină a fost ''revizuită'' de la ultima dumneavoastră examinare.
Poate doriți să o reevaluați.",
	'articlefeedback-results-show' => '(Rezultate ascunse. <span class="showlink">Arată-le</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Ascunde rezultatele</span>)',
	'articlefeedback-survey-question-whyrated' => 'Vă rugăm să ne spuneți de ce ați evaluat această pagină astăzi (bifați tot ce se aplică):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Am vrut să contribui la evaluarea paginii',
	'articlefeedback-survey-answer-whyrated-development' => 'Sper ca evaluarea mea să afecteze pozitiv dezvoltarea paginii',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Am vrut să contribui la {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Îmi place să îmi împărtășesc opinia',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Nu am furnizat evaluări astăzi, însă am dorit să ofer reacții pe viitor',
	'articlefeedback-survey-answer-whyrated-other' => 'Altul',
	'articlefeedback-survey-question-useful' => 'Considerați că evaluările furnizate sunt folositoare și clare?',
	'articlefeedback-survey-question-useful-iffalse' => 'De ce?',
	'articlefeedback-survey-question-expert' => 'Vă considerați un expert în domeniul pe care îl acoperă această pagină?',
	'articlefeedback-survey-question-expert-iftrue' => 'Ne puteți descrie expertiza dumneavoastră?',
	'articlefeedback-survey-question-comments' => 'Aveți comentarii suplimentare?',
	'articlefeedback-survey-submit' => 'Trimite',
	'articlefeedback-survey-title' => 'Vă rugăm să răspundeți la câteva întrebări',
	'articlefeedback-survey-thanks' => 'Vă mulțumim pentru completarea sondajului.',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 * @author Reder
 */
$messages['roa-tara'] = array(
	'articlefeedback' => 'Artichele de valutazione',
	'articlefeedback-desc' => 'Artichele de valutazione (versiune guidate)',
	'articlefeedback-yourfeedback' => "'U giudizie tune",
	'articlefeedback-submit' => 'Conferme',
	'articlefeedback-rating-wellsourced' => 'Belle probbie:',
	'articlefeedback-rating-neutrality' => 'Neutrale:',
	'articlefeedback-rating-completeness' => 'Comblete:',
	'articlefeedback-rating-readability' => 'Leggibbele:',
	'articlefeedback-articlerating' => "Pundegge d'a pàgene",
	'articlefeedback-error' => "S'è verifecate 'nu errore.
Se preghe de pruvà cchiù nnande.",
	'articlefeedback-thanks' => "Grazie! 'A valutaziona toje ha state reggistrate.",
	'articlefeedback-results-hide' => '(<span class="hidelink">Scunne le resultate</span>)',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => "Ije amm'a condrebbuì a {{SITENAME}}",
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => "Me chiace dìcere 'u penziere mèje",
	'articlefeedback-survey-answer-whyrated-other' => 'Otre',
	'articlefeedback-survey-question-useful-iffalse' => 'Purcé?',
	'articlefeedback-survey-question-expert-iftrue' => 'Puè descrivere le esperienze tue?',
	'articlefeedback-survey-question-comments' => 'Tìne otre commende?',
	'articlefeedback-survey-submit' => 'Conferme',
	'articlefeedback-survey-title' => 'Se preghe de responnere a quacche dumanne',
	'articlefeedback-survey-thanks' => "Grazzie pè avè combilate 'u sondagge.",
);

/** Russian (Русский)
 * @author Assele
 * @author Catrope
 * @author MaxSem
 * @author Александр Сигачёв
 * @author Сrower
 */
$messages['ru'] = array(
	'articlefeedback' => 'Оценка статьи',
	'articlefeedback-desc' => 'Оценка статьи (экспериментальный вариант)',
	'articlefeedback-yourfeedback' => 'Ваш отзыв',
	'articlefeedback-pleaserate' => 'Пожалуйста, уделите минуту, чтобы оценить данную статью.',
	'articlefeedback-submit' => 'Отправить',
	'articlefeedback-rating-wellsourced' => 'Источники:',
	'articlefeedback-rating-neutrality' => 'Нейтральность:',
	'articlefeedback-rating-completeness' => 'Полнота:',
	'articlefeedback-rating-readability' => 'Читаемость:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Считаете ли вы, что на этой странице достаточно ссылок на источники, что источники являются достоверными?',
	'articlefeedback-rating-neutrality-tooltip' => 'Считаете ли вы, что эта страница объективно отражает все точки зрения по данной теме?',
	'articlefeedback-rating-completeness-tooltip' => 'Считаете ли вы, что эта страница в достаточной мере раскрывает основные вопросы темы?',
	'articlefeedback-rating-readability-tooltip' => 'Считаете ли вы, что эта страница хорошо организована и хорошо написана?',
	'articlefeedback-articlerating' => 'Рейтинг страницы',
	'articlefeedback-error' => 'Произошла ошибка. 
Пожалуйста, повторите попытку позже.',
	'articlefeedback-thanks' => 'Спасибо! Ваши оценки сохранены.',
	'articlefeedback-featurefeedback' => 'Сообщите <span class="feedbacklink">ваше мнение</span> об этой функции.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|оценка|оценки|оценок}})',
	'articlefeedback-stalemessage-norevisioncount' => 'Эта страница редактировалась после Вашего просмотра. 
Вы можете оценить её еще раз.',
	'articlefeedback-results-show' => '(Результаты скрыты. <span class="showlink">Показать</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Скрыть результаты</span>)',
	'articlefeedback-survey-question-whyrated' => 'Пожалуйста, дайте нам знать, почему вы сегодня дали оценку этой странице (отметьте все подходящие варианты):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Я хотел повлиять на итоговый рейтинг этой страницы',
	'articlefeedback-survey-answer-whyrated-development' => 'Я надеюсь, что моя оценка положительно повлияет на развитие этой страницы',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Я хочу содействовать развитию {{GRAMMAR:genitive|{{SITENAME}}}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Мне нравится делиться своим мнением',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Я не поставил сегодня оценку, но хочу оставить отзыв о данной функции',
	'articlefeedback-survey-answer-whyrated-other' => 'Иное',
	'articlefeedback-survey-question-useful' => 'Считаете ли вы, что проставленные оценки являются полезными и понятными?',
	'articlefeedback-survey-question-useful-iffalse' => 'Почему?',
	'articlefeedback-survey-question-expert' => 'Считаете ли вы себя специалистом в области, к которой относится тема этой страницы?',
	'articlefeedback-survey-question-expert-iftrue' => 'Вы не могли бы высказать экспертную оценку?',
	'articlefeedback-survey-question-comments' => 'Есть ли у вас какие-либо дополнительные замечания?',
	'articlefeedback-survey-submit' => 'Отправить',
	'articlefeedback-survey-title' => 'Пожалуйста, ответьте на несколько вопросов',
	'articlefeedback-survey-thanks' => 'Спасибо за участие в опросе.',
);

/** Rusyn (Русиньскый)
 * @author Gazeb
 */
$messages['rue'] = array(
	'articlefeedback' => 'Оцінка статї',
	'articlefeedback-desc' => 'Оцінка статї (експеріменталный варіант)',
	'articlefeedback-yourfeedback' => 'Ваш назор',
	'articlefeedback-pleaserate' => 'Просиме, найдьте собі час про оцінку той статї.',
	'articlefeedback-submit' => 'Одослати',
	'articlefeedback-rating-wellsourced' => 'Жрідла:',
	'articlefeedback-rating-neutrality' => 'Невтралность:',
	'articlefeedback-rating-completeness' => 'Комплетность:',
	'articlefeedback-rating-readability' => 'Чітательность:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Маєте чутя, же тота сторінка достаточно одказує на жрідла і хоснованы жрідла суть способны довірованя?',
	'articlefeedback-rating-neutrality-tooltip' => 'Маєте чутя, же тота сторінка справедливо покрывать вшыткы погляды на даны темы?',
	'articlefeedback-rating-completeness-tooltip' => 'Маєте чутя, же тота сторінка покрывать вшыткы важны части темы?',
	'articlefeedback-rating-readability-tooltip' => 'Маєте чутя, же тота сторінка є правилно орґанізована о добрі написана?',
	'articlefeedback-articlerating' => 'Рейтінґ сторінкы',
	'articlefeedback-error' => 'Дішло ку хыбі.
Просиме, спробуйте то пізнїше.',
	'articlefeedback-thanks' => 'Дякуєме! Вашы оцінкы были уложены.',
	'articlefeedback-featurefeedback' => 'Сдїляйте нам свій <span class="feedbacklink">назор</span> на тоту функцію.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|оцінка|оцінкы|оцінок}})',
	'articlefeedback-stalemessage-norevisioncount' => "Од коли сьте сторінку {{GENDER:|оцінив|оцінила|оцінили}}, была ''управлена''.
Може єй будете хотїти оцінити знову.",
	'articlefeedback-results-show' => '(Резултаты схованы. <span class="showlink">Указати</span> їх.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Сховати резултаты</span>)',
	'articlefeedback-survey-question-whyrated' => 'Чом сьте днесь оцінили тоту сторінку (зачаркните вшыткы платны можности):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Хотїв єм овпливнити цалкову оцінку сторінкы',
	'articlefeedback-survey-answer-whyrated-development' => 'Сподїваю ся, же мій рейтінґ буде позітівно впливати на вывой сторінкы',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Хотїв єм помочі {{grammar:3sg|{{SITENAME}}}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Люблю здїляти свій назор',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Днесь єм не оцінёвав, але хотїв єм додати свій назор на тоту функцію',
	'articlefeedback-survey-answer-whyrated-other' => 'Інше',
	'articlefeedback-survey-question-useful' => 'Думаєте собі, же доданы оцінкы суть хосновны і зрозумітельны?',
	'articlefeedback-survey-question-useful-iffalse' => 'Чом?',
	'articlefeedback-survey-question-expert' => 'Поважуєте себе за шпеціалісти на область, о котрій тота сторінка їднає?',
	'articlefeedback-survey-question-expert-iftrue' => 'Можете описати свою шпеціалізацію?',
	'articlefeedback-survey-question-comments' => 'Маєте даякы додаточны коментарї?',
	'articlefeedback-survey-submit' => 'Одослати',
	'articlefeedback-survey-title' => 'Просиме, одповіджте на пару вопросів',
	'articlefeedback-survey-thanks' => 'Дякуєме за выповнїня звідованя.',
);

/** Yakut (Саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'articlefeedback' => 'Ыстатыйаны сыаналааһын',
	'articlefeedback-desc' => 'Ыстатыйаны сыаналааһын (тургутуллар барыла)',
	'articlefeedback-yourfeedback' => 'Эн санааҥ',
	'articlefeedback-pleaserate' => 'Бука диэн, сынньана таарыйа, бу ыстатыйаны сыаналаа эрэ',
	'articlefeedback-submit' => 'Ыытарга',
	'articlefeedback-rating-wellsourced' => 'Источниктар:',
	'articlefeedback-rating-neutrality' => 'Тэҥ сыһыан:',
	'articlefeedback-rating-completeness' => 'Толорута:',
	'articlefeedback-rating-readability' => 'Ааҕыллыыта:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Бу сирэйгэ баар билии источниктара төһө толору бэриллибиттэрий уонна онтуктара төһө бигэлэрий?',
	'articlefeedback-rating-neutrality-tooltip' => 'Бу сирэй бу тиэмэҕэ баар туох баар санаалары барыларын тэҥҥэ биэрбит дуо?',
	'articlefeedback-rating-completeness-tooltip' => 'Бу тиэмэ сүрүн суолталара ыстатыйаҕа толору арыллыбыттар дуо?',
	'articlefeedback-rating-readability-tooltip' => 'Бу сирэй сөпкө аттарыллан, бэркэ суруллубут дии саныыгын дуо?',
	'articlefeedback-articlerating' => 'Сирэйи сыаналааһын',
	'articlefeedback-error' => 'Алҕас таҕыста.
Бука диэн хойутуу хос боруобалаар.',
	'articlefeedback-thanks' => 'Махтал! Сыанабылыҥ бигэргэтилиннэ.',
	'articlefeedback-featurefeedback' => 'Бу туһунан <span class="feedbacklink">бэйэҥ санааҕын</span> эт эрэ.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|сыанабыл|ахсааннаах сыанабыл}})',
	'articlefeedback-stalemessage-norevisioncount' => 'Бу сирэй эн көрбүтүҥ кэннэ уларытыллыбыт.
Өссө биирдэ сыаналыаххын сөп.',
	'articlefeedback-results-show' => '(Түмүктэрэ кистэммиттэр. <span class="showlink">Көрдөр</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Түмүктэрин кистээ</span>)',
	'articlefeedback-survey-question-whyrated' => 'Бука диэн эт эрэ, тоҕо бүгүн бу сирэйи сыаналаатыҥ (туох баар сөп түбэһэр барыллары бэлиэтээ):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Бу сирэй түмүк рейтинин уларытаары',
	'articlefeedback-survey-answer-whyrated-development' => 'Сыанам бу сирэй тупсарыгар көмөлөһүө диэн санааттан',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => '{{GRAMMAR:genitive|{{SITENAME}}}} сайдыытыгар көмөлөһүөхпүн баҕарабын',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Бэйэм санаабын дьоҥҥо биллэрэрбин сөбүлүүбүн',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Бүгүн сыана бирбэтим, ол эрээри бу функция туһунан суруйуохпун баҕарабын',
	'articlefeedback-survey-answer-whyrated-other' => 'Атын',
	'articlefeedback-survey-question-useful' => 'Баар сыанабыллар туһаланы аҕалыахтара дуо, өйдөнөллөр дуо?',
	'articlefeedback-survey-question-useful-iffalse' => 'Тоҕо?',
	'articlefeedback-survey-question-expert' => 'Бу сирэй тиэмэтигэр бэйэҕин специалист быһыытынан ааҕынаҕын дуо?',
	'articlefeedback-survey-question-expert-iftrue' => 'Эксперт быһыытынан сыана биэрэр кыахтааххын дуо?',
	'articlefeedback-survey-question-comments' => 'Ханнык эмит эбии этиилээххин дуо?',
	'articlefeedback-survey-submit' => 'Ыытарга',
	'articlefeedback-survey-title' => 'Бука диэн аҕыйах ыйытыыга хоруйдаа эрэ',
	'articlefeedback-survey-thanks' => 'Ыйытыыларга хоруйдаабыккар махтанабыт.',
);

/** Sicilian (Sicilianu)
 * @author Aushulz
 */
$messages['scn'] = array(
	'articlefeedback-survey-answer-whyrated-other' => 'Àutru',
	'articlefeedback-survey-question-useful-iffalse' => 'Picchì?',
	'articlefeedback-survey-question-expert-iftrue' => "Po' diri soccu ti firi a fari?",
	'articlefeedback-survey-question-comments' => 'Vò diri autri cosi?',
	'articlefeedback-survey-title' => "Arrispunni a 'na pocu di dumanni",
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'articlefeedback' => 'Hodnotenie článku',
	'articlefeedback-desc' => 'Hodnotenie článku (pilotná verzia)',
	'articlefeedback-yourfeedback' => 'Vaše komentáre',
	'articlefeedback-pleaserate' => 'Prosím, venujte chvíľku ohodnoteniu tejto stránky dolu.',
	'articlefeedback-submit' => 'Odoslať',
	'articlefeedback-rating-wellsourced' => 'Dobré zdroje:',
	'articlefeedback-rating-neutrality' => 'Neutralita:',
	'articlefeedback-rating-completeness' => 'Úplnosť:',
	'articlefeedback-rating-readability' => 'Čitateľnosť:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Máte pocit, že táto stránka má dostatok citácií a že tieto citácie pochádzajú z dôveryhodných zdrojov?',
	'articlefeedback-rating-neutrality-tooltip' => 'Máte pocit, že táto stránka férovo prezentuje všetky perspektívy na danú tému?',
	'articlefeedback-rating-completeness-tooltip' => 'Máte pocit, že táto stránka pokrýva všetky dôležité témy, ktoré by mala?',
	'articlefeedback-rating-readability-tooltip' => 'Máte pocit, že táto stránka je dobre zorganizovaná a napísaná dobrým štýlom?',
	'articlefeedback-articlerating' => 'Hodnotenie stránky',
	'articlefeedback-error' => 'Vyskytla sa chyba.
Prosím, skúste to neskôr.',
	'articlefeedback-thanks' => 'Ďakujeme! Vaše hodnotenie bolo uložené.',
	'articlefeedback-featurefeedback' => 'Pošlite nám <span class="feedbacklink">vaše komentáre</span> k tejto službe.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|hodnotenie|hodnotenia|hodnotení}})',
	'articlefeedback-stalemessage-norevisioncount' => "Táto stránka bola ''revidovaná'' odvtedy, čo ste ju naposledy skontrolovali.
Možno ju budete chcieť znova ohodnotiť.",
	'articlefeedback-results-show' => '(Výsledky skryté. <span class="showlink">Zobraziť ich</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Skryť výsledky</span>)',
	'articlefeedback-survey-question-whyrated' => 'Prosím, dajte nám vedieť prečo ste dnes ohodnotili túto stránku (zaškrtnite všetky možnosti, ktoré považujete za pravdivé):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Chcel som prispieť k celkovému ohodnoteniu stránky',
	'articlefeedback-survey-answer-whyrated-development' => 'Dúfam, že moje hodnotenie pozitívne ovplyvní vývoj stránky',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Chcel som prispieť do {{GRAMMAR:genitív|{{SITENAME}}}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Rád sa delím o svoj názor',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Dnes som neposkytol hodnotenie, ale chcel som okomentovať túto možnosť',
	'articlefeedback-survey-answer-whyrated-other' => 'Iné',
	'articlefeedback-survey-question-useful' => 'Veríte, že poskytnuté hodnotenia sú užitočné a jasné?',
	'articlefeedback-survey-question-useful-iffalse' => 'Prečo?',
	'articlefeedback-survey-question-expert' => 'Považujete sa za experta v oblasti, ktorú pokrýva táto stránka?',
	'articlefeedback-survey-question-expert-iftrue' => 'Môžete popísať svoju expertízu?',
	'articlefeedback-survey-question-comments' => 'Máte nejaké ďalšie komentáre?',
	'articlefeedback-survey-submit' => 'Odoslať',
	'articlefeedback-survey-title' => 'Prosím, zodpovedajte niekoľko otázok',
	'articlefeedback-survey-thanks' => 'Ďakujeme za vyplnenie dotazníka.',
);

/** Slovenian (Slovenščina)
 * @author Dbc334
 */
$messages['sl'] = array(
	'articlefeedback' => 'Ocenjevanje člankov',
	'articlefeedback-desc' => 'Ocenjevanje člankov (pilotska različica)',
	'articlefeedback-yourfeedback' => 'Vaša povratna informacija',
	'articlefeedback-pleaserate' => 'Prosimo, vzemite si trenutek in spodaj ocenite to stran.',
	'articlefeedback-submit' => 'Pošlji',
	'articlefeedback-rating-wellsourced' => 'Dobro dokumentirano:',
	'articlefeedback-rating-neutrality' => 'Nevtralnost:',
	'articlefeedback-rating-completeness' => 'Celovitost:',
	'articlefeedback-rating-readability' => 'Bralnost:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Menite, da ima ta stran dovolj navedkov in da ta navajanja prihajajo iz zanesljivih virov?',
	'articlefeedback-rating-neutrality-tooltip' => 'Menite, da ta stran prikazuje pravično zastopanost vseh pogledov na obravnavano temo?',
	'articlefeedback-rating-completeness-tooltip' => 'Menite, da ta stran zajema temeljna tematska področja, ki bi jih naj?',
	'articlefeedback-rating-readability-tooltip' => 'Menite, da je ta stran dobro organizirana in dobro napisana?',
	'articlefeedback-articlerating' => 'Ocena strani',
	'articlefeedback-error' => 'Prišlo je do napake.
Prosimo, poskusite znova pozneje.',
	'articlefeedback-thanks' => 'Hvala! Vaša ocena je bila zabeležena.',
	'articlefeedback-featurefeedback' => 'Podajte nam <span class="feedbacklink">povratno informacijo</span> o tej funkciji.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|ocena|oceni|ocene|ocen}})',
	'articlefeedback-stalemessage-norevisioncount' => "Stran je bila ''pregledana'' odkar ste jo nazadnje ocenili.
Morda jo želite ponovno oceniti.",
	'articlefeedback-results-show' => '(Rezultati so skriti. <span class="showlink">Prikaži</span> jih.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Skrij rezultate</span>)',
	'articlefeedback-survey-question-whyrated' => 'Prosimo, povejte nam, zakaj ste danes ocenili to stran (izberite vse, kar ustreza):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Želel sem prispevati splošni oceni strani',
	'articlefeedback-survey-answer-whyrated-development' => 'Upam, da bo moja ocena dobro vplivala na razvoj strani',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Želel sem prispevati k projektu {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Rad delim svoje mnenje',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Danes nisem podal ocene, ampak sem želel podati povratno informacijo o funkciji',
	'articlefeedback-survey-answer-whyrated-other' => 'Drugo',
	'articlefeedback-survey-question-useful' => 'Ali verjamete, da so posredovane ocene uporabne in jasne?',
	'articlefeedback-survey-question-useful-iffalse' => 'Zakaj?',
	'articlefeedback-survey-question-expert' => 'Menite, da ste strokovnjak na področju, ki ga pokriva članek?',
	'articlefeedback-survey-question-expert-iftrue' => 'Lahko pojasnite svoje izvedensko mnenje?',
	'articlefeedback-survey-question-comments' => 'Imate kakšne dodatne pripombe?',
	'articlefeedback-survey-submit' => 'Pošlji',
	'articlefeedback-survey-title' => 'Prosimo, odgovorite na nekaj vprašanj',
	'articlefeedback-survey-thanks' => 'Zahvaljujemo se vam za izpolnitev vprašalnika.',
);

/** Swedish (Svenska)
 * @author Ainali
 * @author Fluff
 */
$messages['sv'] = array(
	'articlefeedback' => 'Artikelbedömning',
	'articlefeedback-desc' => 'Artikelbedömning (pilotversion)',
	'articlefeedback-yourfeedback' => 'Din feedback',
	'articlefeedback-pleaserate' => 'Ta en stund för att betygsätta denna sida nedan.',
	'articlefeedback-submit' => 'Skicka in',
	'articlefeedback-rating-wellsourced' => 'Bra källbelagd',
	'articlefeedback-rating-neutrality' => 'Neutral:',
	'articlefeedback-rating-completeness' => 'Komplett:',
	'articlefeedback-rating-readability' => 'Läsbar:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Tycker du att denna sida har tillräckligt med källhänvisningar och att dessa hänvisningar kommer från pålitliga källor?',
	'articlefeedback-rating-neutrality-tooltip' => 'Tycker du att den här sidan visar en rättvis representation av alla perspektiv på frågan?',
	'articlefeedback-rating-completeness-tooltip' => 'Tycker du att den här sidan täcker de väsentliga ämnesområden som det borde?',
	'articlefeedback-rating-readability-tooltip' => 'Tycker du att den här sidan är välorganiserad och välskriven?',
	'articlefeedback-articlerating' => 'Sidbetyg',
	'articlefeedback-error' => 'Ett fel har uppstått. 
 Försök igen senare.',
	'articlefeedback-thanks' => 'Tack! Ditt betyg har sparats.',
	'articlefeedback-featurefeedback' => 'Ge oss <span class="feedbacklink">feedback</span> om den här funktionen.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|rating|ratings}})',
	'articlefeedback-stalemessage-norevisioncount' => "Den här sidan har ''ändrats'' sedan du senast granskade den. 
 Du kanske vill att betygsätta den igen.",
	'articlefeedback-results-show' => '(Resultat dolda. <span class="showlink">Visa</span> dem.)',
	'articlefeedback-results-hide' => '<span class="hidelink">(Dölj resultat)</span>',
	'articlefeedback-survey-question-whyrated' => 'Låt oss gärna veta varför du bedömt denna sida i dag (markera alla som gäller):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Jag ville bidra till den övergripande bedömningen av sidan',
	'articlefeedback-survey-answer-whyrated-development' => 'Jag hoppas att min bedömning skulle påverka utvecklingen av sidan positivt',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Jag ville bidra till {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Jag gillar att ge min åsikt',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Jag har inte gjort en bedömning idag, men ville ge feedback på funktionen',
	'articlefeedback-survey-answer-whyrated-other' => 'Annat',
	'articlefeedback-survey-question-useful' => 'Tror du att bedömningarna är användbara och tydliga?',
	'articlefeedback-survey-question-useful-iffalse' => 'Varför?',
	'articlefeedback-survey-question-expert' => 'Anser du dig själv vara en expert på området den här sidan behandlar?',
	'articlefeedback-survey-question-expert-iftrue' => 'Kan du beskriva dina kunskaper?',
	'articlefeedback-survey-question-comments' => 'Har du några ytterligare kommentarer?',
	'articlefeedback-survey-submit' => 'Skicka in',
	'articlefeedback-survey-title' => 'Svara på några få frågor',
	'articlefeedback-survey-thanks' => 'Tack för att du fyllde i enkäten.',
);

/** Tamil (தமிழ்)
 * @author TRYPPN
 */
$messages['ta'] = array(
	'articlefeedback-yourfeedback' => 'தங்களின் பின்னூட்டக்கருத்துக்கள்',
	'articlefeedback-submit' => 'சமர்ப்பி',
	'articlefeedback-rating-neutrality' => 'நடுநிலையானது:',
	'articlefeedback-rating-completeness' => 'முழுதும்:',
	'articlefeedback-rating-readability' => 'படிக்கக்கூடியது:',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'இந்த தளத்திற்கு நான் பங்களிக்க வேண்டும் {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'நான் என்னுடைய கருத்துக்களை மற்றவர்களுடன் பகிர்ந்துகொள்ள விரும்புகிறேன்',
	'articlefeedback-survey-answer-whyrated-other' => 'மற்றவை',
	'articlefeedback-survey-question-useful-iffalse' => 'ஏன் ?',
	'articlefeedback-survey-question-expert-iftrue' => 'தங்களது திறமைகளை கொஞ்சம் விவரித்துக்கூற முடியுமா ?',
	'articlefeedback-survey-question-comments' => 'தாங்கள் மேலும் அதிகமான கருத்துக்களை கூற விரும்புகிறீர்களா ?',
	'articlefeedback-survey-submit' => 'சமர்ப்பி',
	'articlefeedback-survey-title' => 'தயவு செய்து ஒரு சில கேள்விகளுக்கு பதில் அளியுங்கள்',
	'articlefeedback-survey-thanks' => 'ஆய்வுக்கான படிவத்தை பூர்த்தி செய்தமைக்கு நன்றி.',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'articlefeedback' => 'వ్యాసపు మూల్యాంకన',
	'articlefeedback-yourfeedback' => 'మీ ప్రతిస్పందన',
	'articlefeedback-pleaserate' => 'ఈ పుటని మూల్యాంకన చేయడానికి ఒక క్షణం వెచ్చించండి.',
	'articlefeedback-submit' => 'దాఖలుచెయ్యి',
	'articlefeedback-rating-neutrality' => 'తటస్థం:',
	'articlefeedback-rating-completeness' => 'సంపూర్ణత:',
	'articlefeedback-rating-readability' => 'పఠనీయం:',
	'articlefeedback-articlerating' => 'పుట మూల్యాంకన',
	'articlefeedback-error' => 'ఏదో పొరపాటు జరిగింది.
దయచేసి కాసేపాగి మళ్ళీ ప్రయత్నించండి.',
	'articlefeedback-thanks' => 'కృతజ్ఞతలు! మీ మూల్యాంకన భద్రమయ్యింది.',
	'articlefeedback-featurefeedback' => 'ఈ సౌలభ్యంపై <span class="feedbacklink">ప్రతిస్పందన</span>ని మాకు తెలియజేయండి.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|మూల్యాంకన|మూల్యాంకనలు}})',
	'articlefeedback-stalemessage-norevisioncount' => "మీరు చివరిసారి సమీక్షించిన తర్వాత ఈ పుటని ''సవరించారు''.
మీరు దీన్ని మళ్ళీ మూల్యాంకన చేయవచ్చు.",
	'articlefeedback-results-show' => '(ఫలితాలు దాగివున్నాయి. వాటిని <span class="showlink">చూపించు</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">ఫలితాలను దాచు</span>)',
	'articlefeedback-survey-question-whyrated' => 'ఈ పుటని ఈరోజు మీరు ఎందుకు మూల్యాంకన చేసారో మాకు దయచేసి తెలియజేయండి (వర్తించే వాటినన్నీ ఎంచుకోండి):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'నేను ఈ పుట యొక్క స్థూల మూల్యాంకనకి తోడ్పాలనుకున్నాను',
	'articlefeedback-survey-answer-whyrated-development' => 'నా మూల్యాంకన ఈ పుట యొక్క అభివృద్ధికి సానుకూలంగా ప్రభావితం చేస్తుందని ఆశిస్తున్నాను',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'నేను {{SITENAME}}కి తోడ్పడాలనుకున్నాను',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'నా అభిప్రాయాన్ని పంచుకోవడం నాకిష్టం',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'నేను ఈ రోజు మాల్యాంకన చేయలేదు, కానీ ఈ సౌలభ్యంపై నా ప్రతిస్పందనని తెలియజేయాలనుకున్నాను',
	'articlefeedback-survey-answer-whyrated-other' => 'ఇతర',
	'articlefeedback-survey-question-useful' => 'ఈ మూల్యాంకనలు ఉపయోగకరంగా మరియు స్పష్టంగా ఉన్నాయని మీరు నమ్ముతున్నారా?',
	'articlefeedback-survey-question-useful-iffalse' => 'ఎందుకు?',
	'articlefeedback-survey-question-expert' => 'ఈ పుట విషయపు రంగంలో మిమ్మల్ని మీరు నిపుణులుగా పరిగణిస్తారా?',
	'articlefeedback-survey-question-expert-iftrue' => 'మీ ప్రావీణ్యతని వివరించగలరా?',
	'articlefeedback-survey-question-comments' => 'అదనపు వ్యాఖ్యలు ఏమైనా ఉన్నాయా?',
	'articlefeedback-survey-submit' => 'దాఖలుచెయ్యి',
	'articlefeedback-survey-title' => 'దయచేసి కొన్ని ప్రశ్నలకి సమాధానమివ్వండి',
	'articlefeedback-survey-thanks' => 'ఈ సర్వేని పూరించినందుకు కృతజ్ఞతలు.',
);

/** Turkmen (Türkmençe)
 * @author Hanberke
 */
$messages['tk'] = array(
	'articlefeedback' => 'Makala berlen baha',
	'articlefeedback-desc' => 'Makala berlen baha (synag warianty)',
	'articlefeedback-yourfeedback' => 'Seslenmäňiz',
	'articlefeedback-pleaserate' => 'Bu sahypany derejelendirmek üçin biraz egleniň.',
	'articlefeedback-submit' => 'Tabşyr',
	'articlefeedback-rating-wellsourced' => 'Çeşmeler:',
	'articlefeedback-rating-neutrality' => 'Bitarap:',
	'articlefeedback-rating-completeness' => 'Doly:',
	'articlefeedback-rating-readability' => 'Okap bolýar:',
	'articlefeedback-articlerating' => 'Sahypa derejelendirmesi',
	'articlefeedback-error' => 'Bir säwlik ýüze çykdy.',
	'articlefeedback-thanks' => 'Sag boluň! Derejelendirmeleriňiz ýazdyryldy.',
	'articlefeedback-featurefeedback' => 'Bu funksiýa hakda bize <span class="feedbacklink">seslenme</span> iberiň.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|derejelendirme|derejelendirme}})',
	'articlefeedback-results-show' => '(Netijeler gizlenilgi. Olary <span class="showlink">görkez</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Netijeleri gizle</span>)',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Men sahypanyň umumy derejesine goşant goşmak isledim.',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => '{{SITENAME}} saýtyna goşant goşmak isledim.',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Öz pikirimi paýlaşmagy halaýaryn.',
	'articlefeedback-survey-answer-whyrated-other' => 'Başga',
	'articlefeedback-survey-question-useful' => 'Berlen derejeleriň peýdalydygyna we düşnüklidigine ynanýarsyňyzmy?',
	'articlefeedback-survey-question-useful-iffalse' => 'Näme üçin?',
	'articlefeedback-survey-question-expert-iftrue' => 'Öz ekspert bahaňyzy suratlandyryp bilersiňizmi?',
	'articlefeedback-survey-question-comments' => 'Goşmaça bellikleriňiz barmy?',
	'articlefeedback-survey-submit' => 'Tabşyr',
	'articlefeedback-survey-title' => 'Käbir soraglara jogap beriň',
	'articlefeedback-survey-thanks' => 'Soragnamany dolduranyňyz üçin sag boluň.',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'articlefeedback' => 'Pagsusuri ng lathalain',
	'articlefeedback-desc' => 'Pagsusuri ng lathalain (paunang bersyon)',
	'articlefeedback-yourfeedback' => 'Ang iyong puna',
	'articlefeedback-pleaserate' => 'Mangyaring maglaan ng isang sanali upang antasan ang pahinang nasa ibaba.',
	'articlefeedback-submit' => 'Ipadala',
	'articlefeedback-rating-wellsourced' => 'Sapat at tumpak ang mga pinagkunan',
	'articlefeedback-rating-neutrality' => 'Walang pinapanigan:',
	'articlefeedback-rating-completeness' => 'Kumpleto:',
	'articlefeedback-rating-readability' => 'Nababasa:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Sa tingin mo ba ang pahinang ito ay may sapat ng mga pagbanggit at ang mga pagbanggit na ito ay nagbuhat sa mapagkakatiwalaang mga pinagkunan?',
	'articlefeedback-rating-neutrality-tooltip' => 'Sa tingin mo ba ang pahinang ito ay nagpapakita ng isang patas na kinatawan ng lahat ng mga pananaw hinggil sa paksa?',
	'articlefeedback-rating-completeness-tooltip' => 'Sa tingin mo ba ang pahinang ito ay sumasaklaw sa nararapat na mahahalagang mga lugar ng paksa?',
	'articlefeedback-rating-readability-tooltip' => 'Sa tingin mo ba ang pahinang ito ay talagang maayos at mabuti ang pagkakasulat?',
	'articlefeedback-articlerating' => 'Pagkakaantas ng pahina',
	'articlefeedback-error' => 'Naganap ang isang kamalian.
Subukan uli mamaya.',
	'articlefeedback-thanks' => 'Salamat! Nasagip na ang iyong mga pag-aantas.',
	'articlefeedback-featurefeedback' => 'Bigyan kami ng <span class="feedbacklink">puna</span> hinggil sa tampok na ito.',
	'articlefeedback-noratings' => ' $1 ($2 {{PLURAL:$2|pag-aantas|mga pag-aantas}})',
	'articlefeedback-stalemessage-norevisioncount' => "''Nabago'' ang pahinang ito magmula noong huli mong pagsuri nito.
Maaari mo itong antasang muli.",
	'articlefeedback-results-show' => '(Nakatago ang mga resulta. <span class="showlink">Ipakita</span> ang mga ito.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Itago ang mga resulta</span>)',
	'articlefeedback-survey-question-whyrated' => 'Mangyari sabihin sa amin kung bakit mo inantasan ng ganito ang pahinang ito ngayon (lagyan ng tsek ang lahat ng maaari):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Nais kong umambag sa pangkalahatang kaantasan ng pahina',
	'articlefeedback-survey-answer-whyrated-development' => 'Umaasa ako na ang aking pag-aantas ay positibong makakaapekto sa pagpapaunlad ng pahina',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Nais kong makapag-ambag sa {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Nais ko ang pagpapamahagi ng aking opinyon',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Hindi ako nagbigay ng pag-aantas ngayon, subalit nais kong magbigay ng puna sa hinaharap',
	'articlefeedback-survey-answer-whyrated-other' => 'Iba pa',
	'articlefeedback-survey-question-useful' => 'Naniniwala ka ba na ang mga pag-aantas na ibinigay ay magagamit at malinaw?',
	'articlefeedback-survey-question-useful-iffalse' => 'Bakit?',
	'articlefeedback-survey-question-expert' => 'Itinuturing mo ba ang sarili mo bilang isang dalubhasa sa larangang sakop ng pahinang ito?',
	'articlefeedback-survey-question-expert-iftrue' => 'Maaari mo bang ilarawan ang iyong kadalubhasaan?',
	'articlefeedback-survey-question-comments' => 'Mayroon ka pa bang karagdagang mga puna?',
	'articlefeedback-survey-submit' => 'Ipasa',
	'articlefeedback-survey-title' => 'Pakisagot ang ilang mga katanungan',
	'articlefeedback-survey-thanks' => 'Salamat sa pagsagot sa mga pagtatanong.',
);

/** Turkish (Türkçe)
 * @author CnkALTDS
 * @author Karduelis
 */
$messages['tr'] = array(
	'articlefeedback' => 'Madde değerlendirmesi',
	'articlefeedback-articlerating' => 'Sayfa derecelendirmesi',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Fikirlerimi paylaşmayı seviyorum',
	'articlefeedback-survey-question-useful-iffalse' => 'Neden?',
	'articlefeedback-survey-thanks' => 'Anketi doldurduğunuz için teşekkür ederiz.',
);

/** Ukrainian (Українська)
 * @author Arturyatsko
 */
$messages['uk'] = array(
	'articlefeedback' => 'Оцінка статті',
	'articlefeedback-desc' => 'Оцінка статті (експериментальний варіант)',
	'articlefeedback-yourfeedback' => 'Ваші відгуки',
	'articlefeedback-pleaserate' => 'Будь ласка, знайдіть час, щоб оцінити цю статтю.',
	'articlefeedback-submit' => 'Відправити',
	'articlefeedback-rating-wellsourced' => 'Джерела:',
	'articlefeedback-rating-neutrality' => 'Нейтральність:',
	'articlefeedback-rating-completeness' => 'Готовність:',
	'articlefeedback-rating-readability' => 'Легкість читання:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Чи вважаєте Ви, що сторінка має достатньо посилань на джерела та що джерела надійні?',
	'articlefeedback-rating-neutrality-tooltip' => "Чи вважаєте ви, що ця сторінка об'єктивно розкриває всі точки зору з цього питання?",
	'articlefeedback-rating-completeness-tooltip' => 'Чи вважаєте ви, що ця сторінка охоплює основні сфери теми?',
	'articlefeedback-rating-readability-tooltip' => 'Чи вважаєте ви, що ця сторінка є добре організованою і добре написано?',
	'articlefeedback-articlerating' => 'Рейтинг сторінки',
	'articlefeedback-error' => 'Сталася помилка. 
 Будь ласка, повторіть спробу пізніше.',
	'articlefeedback-thanks' => 'Спасибі! Ваші оцінки були збережені.',
	'articlefeedback-featurefeedback' => '<span class="feedbacklink">Поділіться</span> своєю думкою про цю функцію.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|оцінка|оцінки|оцінок}})',
	'articlefeedback-stalemessage-norevisioncount' => 'Ця сторінка була змінена після Вашого останнього перегляду.
Ви можете оцінити її ще раз.',
	'articlefeedback-results-show' => '(Результати приховані. <span class="showlink">Показати</span> їх.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Приховати результати</span>)',
	'articlefeedback-survey-question-whyrated' => 'Будь ласка, розкажіть нам, чому Ви оцінили цю сторінку сьогодні (позначте все, що відповідає):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Я хотів внести свій внесок у загальний рейтинг сторінки',
	'articlefeedback-survey-answer-whyrated-development' => 'Я сподіваюся, що мій рейтинг буде позитивно впливати на розвиток сторінки',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Я хотів внести свій внесок у {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Мені подобається ділитися своєю думкою',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Я не оцінив сторінку сьогодні, але хочу залишити відгук про цю функцію',
	'articlefeedback-survey-answer-whyrated-other' => 'Інше',
	'articlefeedback-survey-question-useful' => 'Чи вважаєте Ви поставлені оцінки корисними та зрозумілими?',
	'articlefeedback-survey-question-useful-iffalse' => 'Чому?',
	'articlefeedback-survey-question-expert' => 'Чи вважаєте ви себе спеціалістом в області, що охоплює ця сторінка?',
	'articlefeedback-survey-question-expert-iftrue' => 'Чи можете Ви описати свій досвід?',
	'articlefeedback-survey-question-comments' => 'Чи є у Вас якісь додаткові коментарі?',
	'articlefeedback-survey-submit' => 'Відправити',
	'articlefeedback-survey-title' => 'Будь ласка, дайте відповідь на кілька питань',
	'articlefeedback-survey-thanks' => 'Дякуємо за заповнення опитування.',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'articlefeedback' => 'Valutassion pagina',
	'articlefeedback-desc' => 'Valutassion pagina (version de prova)',
	'articlefeedback-yourfeedback' => 'La to opinion',
	'articlefeedback-pleaserate' => 'Par piaser, spendi du minuti par valutar sta pagina.',
	'articlefeedback-submit' => 'Manda',
	'articlefeedback-rating-wellsourced' => 'Ben fornìa de fonti:',
	'articlefeedback-rating-neutrality' => 'Neutrale:',
	'articlefeedback-rating-completeness' => 'Conpleta:',
	'articlefeedback-rating-readability' => 'Legibile:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Te pare che sta pagina la gabia citassion in bisogno e che le vegna da fonti atendibili?',
	'articlefeedback-rating-neutrality-tooltip' => 'Te pare che sta pagina la mostra na rapresentassion equa de tuti i punti de vista sul tema?',
	'articlefeedback-rating-completeness-tooltip' => 'Te pare che sta pagina la cuerza i temi essensiali che la dovarìa?',
	'articlefeedback-rating-readability-tooltip' => 'Te pare che sta pagina la sia ben organizà e ben scrita?',
	'articlefeedback-articlerating' => 'Valutassion de la pagina',
	'articlefeedback-error' => 'Xe capità un eror.
Par piaser, proa pi tardi.',
	'articlefeedback-thanks' => 'Grassie! El to voto el xe stà salvà.',
	'articlefeedback-featurefeedback' => 'Dane i to <span class="feedbacklink">comenti</span> su sta funsionalità.',
	'articlefeedback-noratings' => '$1 ($2 {{PLURAL:$2|voto|voti}})',
	'articlefeedback-stalemessage-norevisioncount' => "Sta pagina la xe stà ''canbià'' dal to ultimo giudissio.
Magari te voli valutarla da novo.",
	'articlefeedback-results-show' => '(Risultati sconti. <span class="showlink">Mòstreli</span>.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Scondi risultati</span>)',
	'articlefeedback-survey-question-whyrated' => 'Dine el motivo par cui te ghè valutà sta pagina (te poli selessionar più opzioni):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Voléa contribuir a la valutassion conplessiva de la pagina',
	'articlefeedback-survey-answer-whyrated-development' => "Spero che el me giudissio l'influensa positivamente el svilupo de sta pagina",
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Go vossù contribuire a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Me piase condivìdar la me opinion',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'No go dato valutassion uncuò, ma go volù lassar un comento su la funsionalità',
	'articlefeedback-survey-answer-whyrated-other' => 'Altro',
	'articlefeedback-survey-question-useful' => 'Pensito che le valutassion fornìe le sia utili e ciare?',
	'articlefeedback-survey-question-useful-iffalse' => 'Parché?',
	'articlefeedback-survey-question-expert' => 'Te ritiento un esperto nel canpo de cui sta pagina la parla?',
	'articlefeedback-survey-question-expert-iftrue' => 'Podaressito descrìvare le to conpetense?',
	'articlefeedback-survey-question-comments' => 'Gheto altre robe da dir?',
	'articlefeedback-survey-submit' => 'Manda',
	'articlefeedback-survey-title' => 'Par piaser, rispondi a qualche domanda',
	'articlefeedback-survey-thanks' => 'Grassie de aver conpilà el questionario.',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'articlefeedback' => 'Đánh giá bài',
	'articlefeedback-desc' => 'Đánh giá bài (phiên bản thử nghiệm)',
	'articlefeedback-yourfeedback' => 'Phản hồi của bạn',
	'articlefeedback-pleaserate' => 'Xin hãy dành một chút thì giờ để đánh giá trang này ở dưới:',
	'articlefeedback-submit' => 'Đánh giá',
	'articlefeedback-rating-wellsourced' => 'Đầy đủ nguồn:',
	'articlefeedback-rating-neutrality' => 'Trung lập:',
	'articlefeedback-rating-completeness' => 'Đầy đủ:',
	'articlefeedback-rating-readability' => 'Dễ đọc:',
	'articlefeedback-rating-wellsourced-tooltip' => 'Bạn có cảm thấy rằng bày này chú thích nguồn gốc đầy đủ và đáng tin các nguồn?',
	'articlefeedback-rating-neutrality-tooltip' => 'Bạn có cảm thấy rằng bài này đại diện công bằng cho tất cả các quan điểm về các vấn đề?',
	'articlefeedback-rating-completeness-tooltip' => 'Bạn có cảm thấy rằng bài này bao gồm các đề tài cần thiết?',
	'articlefeedback-rating-readability-tooltip' => 'Bạn có cảm thấy rằng bài này được sắp xếp đàng hoàng có văn bản hay?',
	'articlefeedback-articlerating' => 'Đánh giá bài',
	'articlefeedback-error' => 'Đã gặp lỗi.
Xin hãy thử lại sau.',
	'articlefeedback-thanks' => 'Cám ơn! Đánh giá của bạn đã được lưu.',
	'articlefeedback-featurefeedback' => 'Hãy <span class="feedbacklink">phản hồi</span> về tính năng này.',
	'articlefeedback-noratings' => '$1 ($2 đánh giá)',
	'articlefeedback-stalemessage-norevisioncount' => "Bài này đã được ''chỉnh sửa'' sau lần cuối bạn xem xét nó.
Bạn có thể muốn đánh giá nó một lần nữa.",
	'articlefeedback-results-show' => '(Các kết quả được ẩn. <span class="showlink">Hiện</span> kết quả.)',
	'articlefeedback-results-hide' => '(<span class="hidelink">Ẩn kết quả</span>)',
	'articlefeedback-survey-question-whyrated' => 'Xin hãy cho chúng tôi biết lý do tại sao bạn đánh giá trang này hôm nay (kiểm tra các hộp thích hợp):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Tôi muốn có ảnh hưởng đến đánh giá tổng cộng của trang',
	'articlefeedback-survey-answer-whyrated-development' => 'Tôi hy vọng rằng đánh giá của tôi sẽ có ảnh hưởng tích cực đến sự phát triển của trang',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Tôi muốn đóng góp vào {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Tôi thích đưa ý kiến của tôi',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Tôi không đánh giá hôm nay, nhưng vẫn muốn phản hồi về tính năng',
	'articlefeedback-survey-answer-whyrated-other' => 'Khác',
	'articlefeedback-survey-question-useful' => 'Bạn có tin rằng các đánh giá được cung cấp là hữu ích và dễ hiểu?',
	'articlefeedback-survey-question-useful-iffalse' => 'Tạo sao?',
	'articlefeedback-survey-question-expert' => 'Bạn có coi mình là chuyên gia trong lĩnh vực của trang này không?',
	'articlefeedback-survey-question-expert-iftrue' => 'Làm sao giải thích chuyên môn của bạn?',
	'articlefeedback-survey-question-comments' => 'Bạn có ý kiến bổ sung?',
	'articlefeedback-survey-submit' => 'Gửi',
	'articlefeedback-survey-title' => 'Xin vui lòng trả lời một số câu hỏi',
	'articlefeedback-survey-thanks' => 'Cám ơn bạn đã điền khảo sát.',
);

/** Yoruba (Yorùbá)
 * @author Demmy
 */
$messages['yo'] = array(
	'articlefeedback-rating-completeness' => 'Parí:',
	'articlefeedback-error' => 'Àsìṣe kan ti ṣẹlẹ̀.
Ẹ jọ̀wọ́ ẹ gbìyànjú lẹ́ẹ̀kansíi láìpẹ́.',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Chenxiaoqino
 * @author Jimmy xu wrk
 */
$messages['zh-hans'] = array(
	'articlefeedback' => '条目评级',
	'articlefeedback-desc' => '条目评级（测试版）',
	'articlefeedback-yourfeedback' => '您的反馈',
	'articlefeedback-pleaserate' => '请花点时间给这个条目打分',
	'articlefeedback-submit' => '提交',
	'articlefeedback-rating-wellsourced' => '有良好来源：',
	'articlefeedback-rating-neutrality' => '中立性：',
	'articlefeedback-rating-completeness' => '完整度：',
	'articlefeedback-rating-readability' => '可读性：',
	'articlefeedback-rating-wellsourced-tooltip' => '您认为这个页面有充足的脚注并且这些脚注都是来自可信的来源的吗？',
	'articlefeedback-rating-neutrality-tooltip' => '您认为这个页面公平地展现了此问题的所有方面吗？',
	'articlefeedback-rating-completeness-tooltip' => '您认为这个页面写到了所有它应该涉及的方面吗？',
	'articlefeedback-rating-readability-tooltip' => '您认为这个页面组织得很好吗？',
	'articlefeedback-articlerating' => '页面评分',
	'articlefeedback-error' => '发生了一个错误。
请稍后重试。',
	'articlefeedback-thanks' => '谢谢！您的评级已经保存。',
	'articlefeedback-featurefeedback' => '请给我们关于此功能的<span class="feedbacklink">反馈</span>',
	'articlefeedback-noratings' => '$1（$2 个评分）',
	'articlefeedback-stalemessage-norevisioncount' => "此页面在你上次访问之后已被''修订''，你可以重新对其评分。",
	'articlefeedback-results-show' => '(结果已隐藏。<span class="showlink">点击此处已显示</span>。)',
	'articlefeedback-results-hide' => '(<span class="hidelink">隐藏结果</span>)',
	'articlefeedback-survey-question-whyrated' => '请告诉我们今天你为何评价了此页面(选择所有符合的):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => '我想对网页的总体评价作贡献',
	'articlefeedback-survey-answer-whyrated-development' => '我希望我的评价能给此网页带来正面的影响',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => '我想对{{SITENAME}}做出贡献',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => '我愿意共享我的观点',
	'articlefeedback-survey-answer-whyrated-didntrate' => '我今天没有进行评价，但我希望对特性进行反馈。',
	'articlefeedback-survey-answer-whyrated-other' => '其他',
	'articlefeedback-survey-question-useful' => '你认为提供的评价有用并清晰吗？',
	'articlefeedback-survey-question-useful-iffalse' => '为什么？',
	'articlefeedback-survey-question-expert' => '你认为你在本页面覆盖的领域中是专家吗？',
	'articlefeedback-survey-question-expert-iftrue' => '你能描述一下你的专长吗？',
	'articlefeedback-survey-question-comments' => '你还有什么想说的吗？',
	'articlefeedback-survey-submit' => '提交',
	'articlefeedback-survey-title' => '请回答几个问题',
	'articlefeedback-survey-thanks' => '谢谢您回答问卷。',
);

