<?php
$messages = array();

/** English
 * @author Nimish Gautam
 * @author Sam Reed
 * @author Brandon Harris
 */
$messages['en'] = array(
	'articleassessment' => 'Article assessment',
	'articleassessment-desc' => 'Article assessment (pilot version)',
	'articleassessment-yourfeedback' => 'Your feedback',
	'articleassessment-pleaserate' => 'Please take a moment to rate this page below.',
	'articleassessment-submit' => 'Submit',
	'articleassessment-rating-wellsourced' => 'Well-Sourced:',
	'articleassessment-rating-neutrality' => 'Neutral:',
	'articleassessment-rating-completeness' => 'Complete:',
	'articleassessment-rating-readability' => 'Readable:',
	'articleassessment-rating-wellsourced-tooltip' => 'Do you feel this page has sufficient citations and that those citations come from trustworthy sources?',
	'articleassessment-rating-neutrality-tooltip' => 'Do you feel that this page shows a fair representation of all perspectives on the issue?',
	'articleassessment-rating-completeness-tooltip' => 'Do you feel that this page covers the essential topic areas that it should?',
	'articleassessment-rating-readability-tooltip' => 'Do you feel that this page is well-organized and well written?',
	'articleassessment-articlerating' => 'Page rating',
	'articleassessment-error' => 'An error has occurred.
Please try again later.',
	'articleassessment-thanks' => 'Thanks! Your ratings have been saved.',
	'articleassessment-featurefeedback' => 'Give us <span class="feedbacklink">feedback</span> about this feature.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|rating|ratings}})',
	'articleassessment-stalemessage-norevisioncount' => "This page has been ''revised'' since you last reviewed it.
You may wish to rate it again.",
	'articleassessment-results-show' => '(Results hidden. <span class="showlink">Show</span> them.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Hide results</span>)',
	'articleassessment-survey-question-whyrated' => 'Please let us know why you rated this page today (check all that apply):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'I wanted to contribute to the overall rating of the page',
	'articleassessment-survey-answer-whyrated-development' => 'I hope that my rating would positively affect the development of the page',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'I wanted to contribute to {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'I like sharing my opinion',
	'articleassessment-survey-answer-whyrated-didntrate' => "I didn't provide ratings today, but wanted to give feedback on the feature",
	'articleassessment-survey-answer-whyrated-other' => 'Other',
	'articleassessment-survey-question-useful' => 'Do you believe the ratings provided are useful and clear?',
	'articleassessment-survey-question-useful-iffalse' => 'Why?',
	'articleassessment-survey-question-expert' => 'Do you consider yourself an expert in the field this page covers?',
	'articleassessment-survey-question-expert-iftrue' => 'Can you describe your expertise?',
	'articleassessment-survey-question-comments' => 'Do you have any additional comments?',
	'articleassessment-survey-submit' => 'Submit',
	'articleassessment-survey-title' => 'Please answer a few questions',
	'articleassessment-survey-thanks' => 'Thanks for filling out the survey.',
);

/** Message documentation (Message documentation)
 * @author Brandon Harris
 * @author EugeneZelenko
 * @author Sam Reed
 */
$messages['qqq'] = array(
	'articleassessment' => 'The title of the feature. It is about reader feedback.
	
Please visit http://prototype.wikimedia.org/articleassess/Main_Page for a prototype installation.',
	'articleassessment-desc' => '{{desc}}',
	'articleassessment-yourfeedback' => 'This is a box or section header.  It indicates that the contents of the box are personal to the user.',
	'articleassessment-pleaserate' => 'This is a call to action for the user to provide their ratings about the page.',
	'articleassessment-submit' => '{{Identical|Submit}}',
	'articleassessment-rating-wellsourced' => 'This is a rating metric label. The metric is for measuring how researched the article is.',
	'articleassessment-rating-neutrality' => "This is a rating metric label. The metric is for measuring an article's NPOV.",
	'articleassessment-rating-completeness' => 'This is a rating metric label. The metric is for measuring how comprehensive the article is.',
	'articleassessment-rating-readability' => 'This is a rating metric label. The metric is for measuring how well written the article is.',
	'articleassessment-rating-wellsourced-tooltip' => 'This is a tool tip that is designed to explain what the "well-sourced" metric means.',
	'articleassessment-rating-neutrality-tooltip' => 'This is a tool tip that is designed to explain what the "neutrality" metric means.',
	'articleassessment-rating-completeness-tooltip' => 'This is a tool tip that is designed to explain what the "completeness" metric means.',
	'articleassessment-rating-readability-tooltip' => 'This is a tool tip that is designed to explain what the "readability" metric means.',
	'articleassessment-articlerating' => 'This is a box or section header. It indicates that the contents of the box are the average ratings for the article.',
	'articleassessment-error' => 'A generic error message to display on any error.',
	'articleassessment-thanks' => 'The message to display when the user has successfully submitted a rating.',
	'articleassessment-featurefeedback' => 'This is a call to action link for users to provide feedback about the feature.  It takes them to a survey.',
	'articleassessment-noratings' => 'This indicates the number of ratings that the article has received.
Note that PLURAL does not currently work in this message but defaults to the zero; it will work properly in the near future, so keep the calls in.',
	'articleassessment-stalemessage-norevisioncount' => 'This is a message shown to the user when their ratings are "stale" and does NOT include the number of revisions. This is an ambiguous reason, and allows for us to have complicated staleness patterns. This is the preferred message.',
	'articleassessment-results-show' => 'This is an explanatory control that, when clicked, will display hidden aggregate ratings.
The span tag gets rewritten in JavaScript to become a link.',
	'articleassessment-results-hide' => 'This is a control that, when clicked, will hide the aggregate ratings.
The span tag gets rewritten in JavaScript to become a link.',
	'articleassessment-survey-question-whyrated' => 'This is a question in the survey with checkboxes for the answers. The user can check multiple answers.',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articleassessment-survey-answer-whyrated-development' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articleassessment-survey-answer-whyrated-didntrate' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articleassessment-survey-answer-whyrated-other' => 'This is a possible answer for the "Why did you rate this article today?" survey question. The user can check this to fill out an answer that wasn\'t provided as a checkbox.
{{Identical|Other}}',
	'articleassessment-survey-question-useful' => 'This is a question in the survey with "yes" and "no" (prefswitch-survey-true and prefswitch-survey-false) as possible answers.',
	'articleassessment-survey-question-useful-iffalse' => 'This question appears when the user checks "no" for the "Do you believe the ratings provided are useful and clear?" question. The user can enter their answer in a text box.',
	'articleassessment-survey-question-expert' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articleassessment-survey-question-expert-iftrue' => 'This question appears when the user checks "no" for the "Do you consider yourself an expert?" question. The user can enter their answer in a text box.',
	'articleassessment-survey-question-comments' => 'This is a question in the survey with a text box that the user can enter their answer in.',
	'articleassessment-survey-submit' => 'This is the caption for the button that submits the survey.
{{Identical|Submit}}',
	'articleassessment-survey-title' => 'This text appears in the title bar of the survey dialog.',
	'articleassessment-survey-thanks' => 'This text appears when the user has successfully submitted the survey.',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'articleassessment-yourfeedback' => 'U terugvoer',
	'articleassessment-submit' => 'Dien in',
	'articleassessment-rating-wellsourced' => 'Goed van bronne voorsien:',
	'articleassessment-rating-neutrality' => 'Neutraal:',
	'articleassessment-rating-completeness' => 'Volledig:',
	'articleassessment-rating-readability' => 'Leesbaar:',
	'articleassessment-articlerating' => 'Artikel gradering',
	'articleassessment-results-show' => '(Resultate versteek. <span class="showlink">Wys</span> hulle.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Versteek resultate</span>)',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 */
$messages['be-tarask'] = array(
	'articleassessment' => 'Адзнака артыкулаў',
	'articleassessment-desc' => 'Адзнака артыкулаў (пачатковая вэрсія)',
	'articleassessment-yourfeedback' => 'Ваш водгук',
	'articleassessment-pleaserate' => 'Калі ласка, знайдзіце час, каб адзначыць старонку ўнізе.',
	'articleassessment-submit' => 'Даслаць',
	'articleassessment-rating-wellsourced' => 'Спасылкі на крыніцы:',
	'articleassessment-rating-neutrality' => 'Нэўтральнасьць:',
	'articleassessment-rating-completeness' => 'Скончанасьць:',
	'articleassessment-rating-readability' => 'Лёгкасьць чытаньня:',
	'articleassessment-rating-wellsourced-tooltip' => 'Вы лічыце, што гэты артыкул мае дастаткова цытатаў, і яны спасылаюцца на крыніцы, якія заслугоўваюць даверу?',
	'articleassessment-rating-neutrality-tooltip' => 'Вы лічыце, што на гэтай старонцы адлюстраваныя усе пункты гледжаньня на пытаньне?',
	'articleassessment-rating-completeness-tooltip' => 'Вы лічыце, што гэтая старонка раскрывае асноўныя пытаньні тэмы як сьлед?',
	'articleassessment-rating-readability-tooltip' => 'Вы лічыце, што гэтая старонка добра арганізаваная і добра напісаная?',
	'articleassessment-articlerating' => 'Адзнака старонкі',
	'articleassessment-error' => 'Узьнікла памылка.
Калі ласка, паспрабуйце потым.',
	'articleassessment-thanks' => 'Дзякуй! Вашая адзнака была захаваная.',
	'articleassessment-featurefeedback' => 'Паведаміце нам <span class="feedbacklink">Вашае меркаваньне</span> пра гэтую магчымасьць.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|адзнака|адзнакі|адзнакаў}})',
	'articleassessment-stalemessage-norevisioncount' => "Гэтая старонка была ''рэдагаваная'' пасьля Вашага апошняга рэцэнзаваная.
Верагодна, Вы жадаеце адзначыць яе яшчэ раз.",
	'articleassessment-results-show' => '(Вынікі схаваныя. <span class="showlink">Паказаць</span> іх.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Схаваць вынікі</span>)',
	'articleassessment-survey-question-whyrated' => 'Калі ласка, паведаміце нам, чаму Вы адзначылі сёньня гэтую старонку (пазначце ўсе падыходзячыя варыянты):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Я жадаю зрабіць унёсак у агульную адзнаку старонкі',
	'articleassessment-survey-answer-whyrated-development' => 'Я спадзяюся, што мая адзнака пазытыўна паўплывае на разьвіцьцё старонкі',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Я жадаю садзейнічаць разьвіцьцю {{GRAMMAR:родны|{{SITENAME}}}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Я жадаю падзяліцца маім пунктам гледжаньня',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Я не адзначыў сёньня, але хацеў даць водгук пра гэтую магчымасьць',
	'articleassessment-survey-answer-whyrated-other' => 'Іншае',
	'articleassessment-survey-question-useful' => 'Вы верыце, што пададзеныя адзнакі карысныя і зразумелыя?',
	'articleassessment-survey-question-useful-iffalse' => 'Чаму?',
	'articleassessment-survey-question-expert' => 'Вы лічыце сябе экспэртам у галіне, якая датычыцца тэма гэтай старонцы?',
	'articleassessment-survey-question-expert-iftrue' => 'Вы можаце апісаць узровень Вашых ведаў?',
	'articleassessment-survey-question-comments' => 'Вы маеце якія-небудзь дадатковыя камэнтары?',
	'articleassessment-survey-submit' => 'Даслаць',
	'articleassessment-survey-title' => 'Калі ласка, адкажыце на некалькі пытаньняў',
	'articleassessment-survey-thanks' => 'Дзякуй за адказы на пытаньні.',
);

/** Breton (Brezhoneg)
 * @author Gwendal
 */
$messages['br'] = array(
	'articleassessment' => 'Priziadenn pennadoù',
	'articleassessment-desc' => 'Priziadenn pennadoù (stumm stur)',
	'articleassessment-yourfeedback' => 'Ho soñjoù',
	'articleassessment-pleaserate' => 'Trugarez da gemer amzer evit priziañ ar bajenn amañ dindan.',
	'articleassessment-submit' => 'Kas',
	'articleassessment-rating-wellsourced' => 'Titouret mat :',
	'articleassessment-rating-neutrality' => 'Diberzh :',
	'articleassessment-rating-completeness' => 'Graet :',
	'articleassessment-rating-readability' => 'Lennus :',
	'articleassessment-rating-wellsourced-tooltip' => "Hag-eñ e soñjoc'h emañ ar bajenn-mañ gant trawalc'h a arroudennoù?  Ha diwar mammennoù sirius e teuont?",
	'articleassessment-rating-neutrality-tooltip' => "Hag-eñ e soñjoc'h e pled ar bajenn-mañ d'un doare reizh ha gant ur sav-gwel ar sujed ?",
	'articleassessment-rating-completeness-tooltip' => "Hag-eñ e soñjoc'h he deus ar bajenn-mañ goleet temoù pouezusañ ar sujed?",
	'articleassessment-rating-readability-tooltip' => "Hag-eñ e soñjoc'h emañ ar bajenn-mañ aozet mat ha skrivet mat?",
	'articleassessment-articlerating' => 'Priziadenn ar bajenn',
	'articleassessment-error' => "Ur fazi zo bet.
Klaskit en-dro diwezhatoc'h.",
	'articleassessment-thanks' => 'Trugarez! Ho priziadenn zo bet enrollet.',
	'articleassessment-featurefeedback' => 'Roit deomp ho <span class="feedbacklink">soñjoù</span> diwar-benn an arc\'hweladur-mañ.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|briziadenn|priziadenn}})',
	'articleassessment-stalemessage-norevisioncount' => "Ar bajenn-mañ a zo bet ''adwelet'' abaoe ho priziadenn.
Priziañ anezhi en-dro ho pefe c'hoant marteze.",
	'articleassessment-results-show' => '(Disoc\'hoù kuzhet. <span class="showlink">Diskouez</span> anezho.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Kuzhat an disoc\'hoù</span>)',
	'articleassessment-survey-question-whyrated' => "Roit deomp an abeg d'ar perak ho peus priziet ar bajenn-mañ hiziv (kevaskit an abegoù gwirion) :",
	'articleassessment-survey-answer-whyrated-contribute-rating' => "C'hoant em boa reiñ sikour evit priziañ d'un doare hollek ar bajenn",
	'articleassessment-survey-answer-whyrated-development' => "Spi am eus e servijo d'un doare pozitivel ma friziadenn evit dioreiñ ar bajenn",
	'articleassessment-survey-answer-whyrated-contribute-wiki' => "C'hoant em boa kenober da {{SITENAME}}",
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Plijout a ra din reiñ ma ali',
	'articleassessment-survey-answer-whyrated-didntrate' => "N'am eus ket priziet ar bajenn hiziv, reiñ ma soñj diwar-benn an arc'hweladur an hini eo",
	'articleassessment-survey-answer-whyrated-other' => 'All',
	'articleassessment-survey-question-useful' => "Hag-eñ e soñjoc'h ez eo ar briziadennoù roet talvoudus ha sklaer?",
	'articleassessment-survey-question-useful-iffalse' => 'Perak ?',
	'articleassessment-survey-question-expert' => "Hag-eñ e soñjoc'h emaoc'h arbennigour war an dachenn pledet er bajenn ?",
	'articleassessment-survey-question-expert-iftrue' => 'Gallout a rit diskrivañ ho prizacherezh?',
	'articleassessment-survey-question-comments' => 'Evezhiadennoù all ho pefe?',
	'articleassessment-survey-submit' => 'Kas',
	'articleassessment-survey-title' => "Trugarez da respont d'un nebeut goulennoù",
	'articleassessment-survey-thanks' => 'Trugarez da vezañ leuniet ar goulennaoueg.',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'articleassessment-yourfeedback' => 'Vaše povratne informacije',
	'articleassessment-submit' => 'Pošalji',
	'articleassessment-rating-wellsourced' => 'Dobro referencirano:',
	'articleassessment-rating-neutrality' => 'Neutralnost:',
	'articleassessment-rating-completeness' => 'Završenost:',
	'articleassessment-rating-readability' => 'Čitljivost:',
	'articleassessment-articlerating' => 'Rejting stranice',
	'articleassessment-error' => 'Desila se greška.
Molimo pokušajte kasnije.',
	'articleassessment-thanks' => 'Hvala! Vaše ocjene su sačuvane.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|ocjena|ocjene|ocjena}})',
	'articleassessment-results-show' => '(Rezultati sakriveni. <span class="showlink">Prikaži</span> ih.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Sakrij rezultate</span>)',
	'articleassessment-survey-answer-whyrated-other' => 'Ostalo',
	'articleassessment-survey-question-useful-iffalse' => 'Zašto?',
	'articleassessment-survey-submit' => 'Pošalji',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'articleassessment' => 'Artikeleinschätzung',
	'articleassessment-desc' => 'Ermöglicht die Einschätzung von Artikeln (Pilotversion)',
	'articleassessment-yourfeedback' => 'Deine Rückmeldung',
	'articleassessment-pleaserate' => 'Bitte nehme dir kurz Zeit diesen Artikel unten auf dieser Seite einzuschätzen.',
	'articleassessment-submit' => 'Speichern',
	'articleassessment-rating-wellsourced' => 'Gut belegt:',
	'articleassessment-rating-neutrality' => 'Neutral:',
	'articleassessment-rating-completeness' => 'Vollständig:',
	'articleassessment-rating-readability' => 'Verständlich:',
	'articleassessment-rating-wellsourced-tooltip' => 'Hast du den Eindruck, dass dieser Artikel über genügend Quellenangaben verfügt und diese zudem aus vertrauenswürdigen Quellen stammen?',
	'articleassessment-rating-neutrality-tooltip' => 'Hast du den Eindruck, dass dieser Artikel eine ausgewogene Darstellung aller mit dessen Inhalt verbundenen Aspekte enthält?',
	'articleassessment-rating-completeness-tooltip' => 'Hast du den Eindruck, dass dieser Artikel alle wichtigen Aspekte enthält, die mit dessen Inhalt zusammenhängen?',
	'articleassessment-rating-readability-tooltip' => 'Hast du den Eindruck, dass dieser Artikel gut strukturiert sowie geschrieben wurde?',
	'articleassessment-articlerating' => 'Einschätzung des Artikels',
	'articleassessment-error' => 'Ein Fehler ist aufgetreten.
Bitte versuche es später erneut.',
	'articleassessment-thanks' => 'Vielen Dank! Deine Einschätzung wurde gespeichert.',
	'articleassessment-featurefeedback' => 'Gebe uns bitte eine <span class="feedbacklink">Rückmeldung</span> zu dieser Funktion zur Einschätzung eines Artikels.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|Einschätzung|Einschätzungen}})',
	'articleassessment-stalemessage-norevisioncount' => "Dieser Artikel wurde seit deiner letzten Einschätzung ''bearbeitet''.
Vielleicht möchtest du ihn erneut einschätzen.",
	'articleassessment-results-show' => '(Ergebnisse sind ausgeblendet. <span class="showlink">Einblenden</span>.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Ergebnisse ausblenden</span>)',
	'articleassessment-survey-question-whyrated' => 'Bitte lasse uns wissen, warum du diesen Artikel heute eingeschätzt hast (Zutreffendes bitte ankreuzen):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Ich wollte mich an der Einschätzung des Artikels beteiligen',
	'articleassessment-survey-answer-whyrated-development' => 'Ich hoffe, dass meine Einschätzung die künftige Entwicklung des Artikels positiv beeinflusst',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Ich wollte mich hier ({{SITENAME}}) beteiligen',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Ich teile meine Einschätzung gerne mit',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Ich habe heute keine Einschätzung vorgenommen, wollte allerdings eine Rückmeldung zu dieser Funktion zur Einschätzung des Artikels geben',
	'articleassessment-survey-answer-whyrated-other' => 'Anderes',
	'articleassessment-survey-question-useful' => 'Glaubst du, dass die abgegebenen Einschätzungen nützlich und verständlich sind?',
	'articleassessment-survey-question-useful-iffalse' => 'Warum?',
	'articleassessment-survey-question-expert' => 'Hältst du dich für kompetent auf dem Gebiet, mit dem sich der Inhalt dieses Artikels beschäftigt?',
	'articleassessment-survey-question-expert-iftrue' => 'Kannst du deine Sachkenntnisse beschreiben?',
	'articleassessment-survey-question-comments' => 'Hast du noch weitere Anmerkungen?',
	'articleassessment-survey-submit' => 'Speichern',
	'articleassessment-survey-title' => 'Bitte beantworte uns ein paar Fragen',
	'articleassessment-survey-thanks' => 'Vielen Dank für deine Rückmeldung.',
);

/** French (Français)
 * @author Crochet.david
 * @author Peter17
 */
$messages['fr'] = array(
	'articleassessment' => 'Évaluation d’article',
	'articleassessment-desc' => 'Évaluation d’article (version pilote)',
	'articleassessment-yourfeedback' => 'Votre retour',
	'articleassessment-pleaserate' => 'Veuillez prendre un moment pour évaluer cette page ci-dessous.',
	'articleassessment-submit' => 'Soumettre',
	'articleassessment-rating-wellsourced' => 'Bien sourcé :',
	'articleassessment-rating-neutrality' => 'Neutre :',
	'articleassessment-rating-completeness' => 'Complet :',
	'articleassessment-rating-readability' => 'Lisible :',
	'articleassessment-rating-wellsourced-tooltip' => 'Pensez-vous que cette page a suffisamment de citations et que celles-ci proviennent de sources dignes de confiance.',
	'articleassessment-rating-neutrality-tooltip' => 'Pensez-vous que cette page fournit une présentation équitable de toutes les perspectives du sujet traité ?',
	'articleassessment-rating-completeness-tooltip' => 'Pensez-vous que cette page couvre les thèmes essentiels du sujet ?',
	'articleassessment-rating-readability-tooltip' => 'Pensez-vous que cette page soit bien organisée et bien écrite ?',
	'articleassessment-articlerating' => 'Évaluation de la page',
	'articleassessment-error' => 'Une erreur est survenue.
Veuillez ré-essayer plus tard.',
	'articleassessment-thanks' => 'Merci ! Votre évaluation a été enregistrée.',
	'articleassessment-featurefeedback' => 'Donnez-nous vos <span class="feedbacklink">commentaires</span> sur cette fonctionnalité.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|évaluation|évaluations}})',
	'articleassessment-stalemessage-norevisioncount' => 'Cette page a été révisée depuis que vous l’avez évaluée.
Vous pourriez vouloir l’évaluer à nouveau.',
	'articleassessment-results-show' => '(Résultats masqués. <span class="showlink">Les afficher.</span>)',
	'articleassessment-results-hide' => '(<span class="hidelink">Masquer les résultats</span>)',
	'articleassessment-survey-question-whyrated' => 'Veuillez nous indiquer pourquoi vous avez évalué cette page aujourd’hui (cochez tout ce qui s’applique) :',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Je voulais contribuer à l’évaluation globale de la page',
	'articleassessment-survey-answer-whyrated-development' => 'J’espère que mon évaluation aura une incidence positive sur le développement de la page',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Je voulais contribuer à {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'J’aime partager mon opinion',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Je n’ai pas évalué la page, mais je voulais donner un retour sur cette fonctionnalité',
	'articleassessment-survey-answer-whyrated-other' => 'Autre',
	'articleassessment-survey-question-useful' => 'Pensez-vous que les évaluations fournies soient utiles et claires ?',
	'articleassessment-survey-question-useful-iffalse' => 'Pourquoi ?',
	'articleassessment-survey-question-expert' => 'Vous considérez-vous comme un expert dans le domaine couvert par cette page ?',
	'articleassessment-survey-question-expert-iftrue' => 'Pouvez-vous décrire votre expertise ?',
	'articleassessment-survey-question-comments' => 'Avez-vous d’autres commentaires ?',
	'articleassessment-survey-submit' => 'Soumettre',
	'articleassessment-survey-title' => 'Veuillez répondre à quelques questions',
	'articleassessment-survey-thanks' => 'Merci d’avoir rempli le questionnaire.',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'articleassessment' => 'Avaliación do artigo',
	'articleassessment-desc' => 'Versión piloto da avaliación dos artigos',
	'articleassessment-yourfeedback' => 'Os seus comentarios',
	'articleassessment-pleaserate' => 'Por favor, tome uns intres para avaliar esta páxina.',
	'articleassessment-submit' => 'Enviar',
	'articleassessment-rating-wellsourced' => 'Ben documentado:',
	'articleassessment-rating-neutrality' => 'Neutral:',
	'articleassessment-rating-completeness' => 'Completo:',
	'articleassessment-rating-readability' => 'Lexible:',
	'articleassessment-rating-wellsourced-tooltip' => 'Cre que esta páxina ten citas suficientes e que estas son de fontes fiables?',
	'articleassessment-rating-neutrality-tooltip' => 'Cre que esta páxina mostra unha representación xusta de todas as perspectivas do tema?',
	'articleassessment-rating-completeness-tooltip' => 'Cre que esta páxina aborda as áreas esenciais do tema que debería?',
	'articleassessment-rating-readability-tooltip' => 'Cre que esta páxina está ben organizada e escrita?',
	'articleassessment-articlerating' => 'Avaliación do artigo',
	'articleassessment-error' => 'Houbo un erro.
Inténteo de novo máis tarde.',
	'articleassessment-thanks' => 'Grazas! Gardáronse as súas valoracións.',
	'articleassessment-featurefeedback' => 'Déanos <span class="feedbacklink">a súa opinión</span> sobre esta característica.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|avaliación|avaliacións}})',
	'articleassessment-stalemessage-norevisioncount' => "Alguén fixo unha ''revisión'' da páxina desde a súa última visita.
Quizais queira avaliala novamente.",
	'articleassessment-results-show' => '(Resultados agochados. <span class="showlink">Mostralos</span>.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Agochar os resultados</span>)',
	'articleassessment-survey-question-whyrated' => 'Díganos por que valorou esta páxina (marque todas as opcións que cumpran):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Quería colaborar na valoración da páxina',
	'articleassessment-survey-answer-whyrated-development' => 'Agardo que a miña valoración afecte positivamente ao desenvolvemento da páxina',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Quería colaborar con {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Gústame dar a miña opinión',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Non dei ningunha valoración, só quería deixar os meus comentarios sobre a característica',
	'articleassessment-survey-answer-whyrated-other' => 'Outra',
	'articleassessment-survey-question-useful' => 'Cre que as valoracións dadas son útiles e claras?',
	'articleassessment-survey-question-useful-iffalse' => 'Por que?',
	'articleassessment-survey-question-expert' => 'Considérase un experto no campo que abrangue esta páxina?',
	'articleassessment-survey-question-expert-iftrue' => 'Pode describir a súa experiencia?',
	'articleassessment-survey-question-comments' => 'Ten algún comentario adicional?',
	'articleassessment-survey-submit' => 'Enviar',
	'articleassessment-survey-title' => 'Responda algunhas preguntas',
	'articleassessment-survey-thanks' => 'Grazas por encher a enquisa.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'articleassessment' => 'Evalutation de articulos',
	'articleassessment-desc' => 'Evalutation de articulos (version pilota)',
	'articleassessment-yourfeedback' => 'Tu opinion',
	'articleassessment-pleaserate' => 'Per favor prende un momento pro evalutar iste pagina hic infra.',
	'articleassessment-submit' => 'Submitter',
	'articleassessment-rating-wellsourced' => 'Ben referentiate:',
	'articleassessment-rating-neutrality' => 'Neutral:',
	'articleassessment-rating-completeness' => 'Complete:',
	'articleassessment-rating-readability' => 'Legibile:',
	'articleassessment-rating-wellsourced-tooltip' => 'Pensa tu que iste articulo ha sufficiente citationes e que iste citationes refere a fontes digne de fide?',
	'articleassessment-rating-neutrality-tooltip' => 'Pensa tu que iste articulo monstra un representation juste de tote le perspectivas super le question?',
	'articleassessment-rating-completeness-tooltip' => 'Pensa tu que iste articulo coperi le themas essential que illo deberea coperir?',
	'articleassessment-rating-readability-tooltip' => 'Pensa tu que iste articulo es ben organisate e ben scribite?',
	'articleassessment-articlerating' => 'Evalutation del articulo',
	'articleassessment-error' => 'Un error ha occurrite.
Per favor reproba plus tarde.',
	'articleassessment-thanks' => 'Gratias! Tu evalutation ha essite salveguardate.',
	'articleassessment-featurefeedback' => 'Da nos [[Special:Article Assessment Feedback|tu opinion]] super iste functionalitate.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|evalutation|evalutationes}})',
	'articleassessment-stalemessage-norevisioncount' => "Iste articulo ha essite ''re-elaborate'' post tu ultime evalutation.
Es recommendate que tu lo re-evaluta.",
	'articleassessment-results-show' => '(Resultatos celate. <span class="showlink">Revelar</span> los.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Celar resultatos</span>)',
	'articleassessment-survey-question-whyrated' => 'Per favor dice nos proque tu ha evalutate iste pagina hodie (marca tote le optiones applicabile):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Io voleva contribuer al evalutation general del pagina',
	'articleassessment-survey-answer-whyrated-development' => 'Io spera que mi evalutation ha un effecto positive sur le disveloppamento del pagina',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Io voleva contribuer a {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Me place condivider mi opinion',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Io non dava un evalutation hodie, ma io voleva dar mi opinion super le functionalitate',
	'articleassessment-survey-answer-whyrated-other' => 'Altere',
	'articleassessment-survey-question-useful' => 'Crede tu que le evalutationes providite es utile e clar?',
	'articleassessment-survey-question-useful-iffalse' => 'Proque?',
	'articleassessment-survey-question-expert' => 'Esque tu te considera un experto in le campo que iste pagina coperi?',
	'articleassessment-survey-question-expert-iftrue' => 'Pote tu describer tu expertise?',
	'articleassessment-survey-question-comments' => 'Ha tu additional commentos?',
	'articleassessment-survey-submit' => 'Submitter',
	'articleassessment-survey-title' => 'Per favor responde a alcun questiones',
	'articleassessment-survey-thanks' => 'Gratias pro completar le questionario.',
);

/** Japanese (日本語)
 * @author Marine-Blue
 * @author Yanajin66
 * @author 青子守歌
 */
$messages['ja'] = array(
	'articleassessment' => '記事の評価',
	'articleassessment-desc' => '記事の評価（パイロット版）',
	'articleassessment-yourfeedback' => 'あなたのフィードバック',
	'articleassessment-pleaserate' => 'このページの評価を算出していますので、少しお待ちください。',
	'articleassessment-submit' => '送信',
	'articleassessment-rating-wellsourced' => '良くソース化できたもの:',
	'articleassessment-rating-neutrality' => '中立的なもの:',
	'articleassessment-rating-completeness' => '完了:',
	'articleassessment-rating-readability' => '読み込み可能なもの:',
	'articleassessment-rating-wellsourced-tooltip' => 'あなたはこの記事が十分な引用を含んでいて、それらの引用は信憑性のあるソースからのものだと感じますか？',
	'articleassessment-rating-neutrality-tooltip' => 'あなたはこの記事が問題点における全ての見解の中で公正な表現だと感じますか？',
	'articleassessment-rating-completeness-tooltip' => 'あなたはこの記事が不可欠な話題の領域をカバーしていると感じますか？',
	'articleassessment-rating-readability-tooltip' => 'あなたはこの記事が良く整理され、良く書かれていると感じますか？',
	'articleassessment-articlerating' => '記事の評価',
	'articleassessment-error' => 'エラーが発生しました。
後でもう一度試みてください。',
	'articleassessment-thanks' => 'ありがとうございます！あなたの評価は保存されました。',
	'articleassessment-featurefeedback' => 'この機能について<span class="feedbacklink">フォードバック</span>をお願いします。',
	'articleassessment-noratings' => '$1（$2の{{PLURAL:$2|評価}}）',
	'articleassessment-stalemessage-norevisioncount' => "この記事はあなたが最後にレビューしてから、''修正''されました。
再度レビューしたほうが良いかもしれません。",
	'articleassessment-results-show' => '（結果は隠されています。<span class="showlink">表示</span>する。）',
	'articleassessment-results-hide' => '（<span class="hidelink">結果を隠す</span>）',
	'articleassessment-survey-question-whyrated' => '今日、なぜあなたがこのページを評価したか我々に教えてください（適用するすべてにチェックを入れてください）:',
	'articleassessment-survey-answer-whyrated-contribute-rating' => '私はページの全ての評価に貢献したいです',
	'articleassessment-survey-answer-whyrated-development' => '私は自分の評価が積極的にこのページの開発に影響を与えることを希望している',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => '私は{{サイト名}}に貢献したい',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'I like sharing my opinion',
	'articleassessment-survey-answer-whyrated-didntrate' => '私は今日はレーティングを提供しなかったが、この機能に関するフィードバックを提供したかった',
	'articleassessment-survey-answer-whyrated-other' => 'その他',
	'articleassessment-survey-question-useful' => 'あなたはこれらの評価が有用で明確だと信じていますか？',
	'articleassessment-survey-question-useful-iffalse' => 'なぜですか？',
	'articleassessment-survey-question-expert' => 'あなたは自分自身がこのページが扱う領域の専門家だと思いますか？',
	'articleassessment-survey-question-expert-iftrue' => 'あなたは専門知識を述べることができますか？',
	'articleassessment-survey-question-comments' => 'あなたには追加すべきコメントがありますか？',
	'articleassessment-survey-submit' => '送信',
	'articleassessment-survey-title' => '質問に少し答えてください',
	'articleassessment-survey-thanks' => '調査に記入していただき、ありがとうございます。',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'articleassessment' => 'Artikelaschätzung',
	'articleassessment-desc' => 'Artikelaschätzung Pilotversioun',
	'articleassessment-yourfeedback' => 'Äre Feedback',
	'articleassessment-pleaserate' => 'Huelt Iech w.e.g. een Ament fir déi Säit hei drënner ze bewäerten.',
	'articleassessment-submit' => 'Späicheren',
	'articleassessment-rating-wellsourced' => 'Gudd dokumentéiert:',
	'articleassessment-rating-neutrality' => 'Neutral:',
	'articleassessment-rating-completeness' => 'Komplett:',
	'articleassessment-rating-readability' => 'Verständlech:',
	'articleassessment-rating-wellsourced-tooltip' => 'Hutt Dir den Androck datt dës Säit genuch Zitater huet an datt dës Zitater aus vertrauenswierdege Quelle kommen?',
	'articleassessment-rating-neutrality-tooltip' => 'Hutt Dir den Androck datt dës Säit eng ausgeglache Presentatioun vun alle Perspektive vun dësem Thema weist?',
	'articleassessment-rating-completeness-tooltip' => 'Hutt dir den Androck datt dës Säit déi wesentlech Aspekter vun dësem Sujet behandelt déi solle beliicht ginn?',
	'articleassessment-rating-readability-tooltip' => 'Hutt Dir den Androck datt dës Säit gutt organiséiert a gutt geschriwwen ass?',
	'articleassessment-articlerating' => 'Bewäertung vum Artikel',
	'articleassessment-error' => 'Et ass e Feeler geschitt.
Probéiert w.e.g. méi spéit nach emol.',
	'articleassessment-thanks' => 'Merci! Är Bewäertung gouf gespäichert.',
	'articleassessment-featurefeedback' => 'Gitt eis Äre [[Special:Article Assessment Feedback|Feedback]] vun dëser Fonctioun.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|Bewäertung|Bewäertungen}})',
	'articleassessment-stalemessage-norevisioncount' => "Dësen Artikel gouf zënter datt Dir e fir d'lescht nogekuckt hutt ''verännert''.
Et kéint sinn datt dir en nei bewäerte wëllt.",
	'articleassessment-results-show' => '(D\'Resultater si verstopp. Resultater <span class="showlink">weisen</span>.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Resultater verstoppen</span>)',
	'articleassessment-survey-question-whyrated' => 'Sot eis w.e.g. firwat datt Dir dës säit bewäert hutt (klickt alles u wat zoutrëfft):',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Ech deele meng Meenung gäre mat',
	'articleassessment-survey-answer-whyrated-other' => 'Anerer',
	'articleassessment-survey-question-useful-iffalse' => 'Firwat?',
	'articleassessment-survey-title' => 'Beäntwert w.e.g. e puer Froen',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'articleassessment' => 'Оценување на статија',
	'articleassessment-desc' => 'Пилотна верзија на Оценување на статија',
	'articleassessment-yourfeedback' => 'Ваше мислење',
	'articleassessment-pleaserate' => 'Одвојте момент за да ја оцените страницава подолу',
	'articleassessment-submit' => 'Поднеси',
	'articleassessment-rating-wellsourced' => 'Доволно извори:',
	'articleassessment-rating-neutrality' => 'Неутрална:',
	'articleassessment-rating-completeness' => 'Исцрпна:',
	'articleassessment-rating-readability' => 'Читлива:',
	'articleassessment-rating-wellsourced-tooltip' => 'Дали сметате дека статијава има доволно наводи и дека се преземени од доверливи извори?',
	'articleassessment-rating-neutrality-tooltip' => 'Дали сметате дека статијава на праведен начин ги застапува сите гледишта на оваа проблематика?',
	'articleassessment-rating-completeness-tooltip' => 'Дали сметате дека статијава ги обработува најважните основни теми што треба да се обработат?',
	'articleassessment-rating-readability-tooltip' => 'Дали сметате дека статијава е добро организирана и убаво напишана?',
	'articleassessment-articlerating' => 'Оценки за статијата',
	'articleassessment-error' => 'Се појави грешка.
Обидете се подоцна.',
	'articleassessment-thanks' => 'Ви благодариме! Вашите оценки се зачувани.',
	'articleassessment-featurefeedback' => 'Дајте ваше <span class="feedbacklink">мислење</span> за оваа функција.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|оценка|оценки}})',
	'articleassessment-stalemessage-norevisioncount' => "Статијава е ''преработена'' од последниот преглеед наваму.
Ви предлагаме да ја преоцените.",
	'articleassessment-results-show' => '(Резултатите се скриени. <span class="showlink">Прикажи</span> ги.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Сокриј резултати</span>)',
	'articleassessment-survey-question-whyrated' => 'Кажете ни зошто ја оценивте страницава денес (штиклирајте ги сите релевантни одговори)',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Сакав да придонесам кон севкупната оцена на страницата',
	'articleassessment-survey-answer-whyrated-development' => 'Се надевам дека мојата оценка ќе влијае позитивно на развојот на страницата',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Сакав да придонесам кон {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Сакам да го искажувам моето мислење',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Не оценував денес, туку сакав да искажам мое мислење за функцијата',
	'articleassessment-survey-answer-whyrated-other' => 'Друго',
	'articleassessment-survey-question-useful' => 'Дали сметате дека дадените оценки се полезни и јасни?',
	'articleassessment-survey-question-useful-iffalse' => 'Зошто?',
	'articleassessment-survey-question-expert' => 'Дали се сметате за стручњак во тематиката што се обработува на страницава?',
	'articleassessment-survey-question-expert-iftrue' => 'Можете ли да ги опишете вашите стручни познавања?',
	'articleassessment-survey-question-comments' => 'Имате некои други забелешки?',
	'articleassessment-survey-submit' => 'Поднеси',
	'articleassessment-survey-title' => 'Ве молиме одговорете на неколку прашања',
	'articleassessment-survey-thanks' => 'Ви благодариме што ја пополнивте анкетата.',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'articleassessment' => 'Paginabeoordeling',
	'articleassessment-desc' => 'Paginabeoordeling (testversie)',
	'articleassessment-yourfeedback' => 'Uw terugkoppeling',
	'articleassessment-pleaserate' => 'Geef alstublieft een beoordeling van deze pagina.',
	'articleassessment-submit' => 'Opslaan',
	'articleassessment-rating-wellsourced' => 'Goed van bronnen voorzien:',
	'articleassessment-rating-neutrality' => 'Neutraal:',
	'articleassessment-rating-completeness' => 'Compleet:',
	'articleassessment-rating-readability' => 'Leesbaar:',
	'articleassessment-rating-wellsourced-tooltip' => 'Vindt u dat deze pagina voldoende bronvermeldingen heeft en dat de bronvermeldingen betrouwbaar zijn?',
	'articleassessment-rating-neutrality-tooltip' => 'Vindt u dat deze pagina een eerlijke weergave is van alle invalshoeken voor dit onderwerp?',
	'articleassessment-rating-completeness-tooltip' => 'Vindt u dat deze pagina de essentie van dit onderwerp bestrijkt?',
	'articleassessment-rating-readability-tooltip' => 'Vindt u dat deze pagina een correcte opbouw heeft een goed is geschreven?',
	'articleassessment-articlerating' => 'Paginawaardering',
	'articleassessment-error' => 'Er is een fout opgetreden. 
Probeer het later opnieuw.',
	'articleassessment-thanks' => 'Bedankt!
Uw beoordeling is opgeslagen.',
	'articleassessment-featurefeedback' => 'Geef ons [[Special:ArticleAssessmentFeedback|terugkoppeling]] over deze functie.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|beoordeling|beoordelingen}})',
	'articleassessment-stalemessage-norevisioncount' => "Deze pagina is ''aangepast'' sinds uw beoordeling.
Wilt u de pagina opnieuw beoordelen?",
	'articleassessment-results-show' => '(<span class="showlink">resultaten weergeven</span>)',
	'articleassessment-results-hide' => '(<span class="hidelink">resultaten verbergen</span>)',
	'articleassessment-survey-question-whyrated' => 'Laat ons weten waarom u deze pagina vandaag hebt beoordeeld (kies alle redenen die van toepassing zijn):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Ik wil bijdragen aan de beoordelingen van de pagina',
	'articleassessment-survey-answer-whyrated-development' => 'Ik hoop dat mijn beoordeling een positief effect heeft op de ontwikkeling van de pagina',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Ik wilde bijdragen aan {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Ik vind het fijn om mijn mening te delen',
	'articleassessment-survey-answer-whyrated-didntrate' => "Ik heb vandaag geen pagina's beoordeeld, maar in de toekomst wil ik wel terugkoppeling geven",
	'articleassessment-survey-answer-whyrated-other' => 'Anders',
	'articleassessment-survey-question-useful' => 'Vindt u dat de beoordelingen bruikbaar en duidelijk zijn?',
	'articleassessment-survey-question-useful-iffalse' => 'Waarom?',
	'articleassessment-survey-question-expert' => 'Vindt u zichzelf een expert in de materie waarover deze pagina gaat?',
	'articleassessment-survey-question-expert-iftrue' => 'Kunt u uw expertise beschrijven?',
	'articleassessment-survey-question-comments' => 'Hebt u nog opmerkingen?',
	'articleassessment-survey-submit' => 'Opslaan',
	'articleassessment-survey-title' => 'Beantwoord alstublieft een paar vragen',
	'articleassessment-survey-thanks' => 'Bedankt voor het beantwoorden van de vragen.',
);

/** Polish (Polski)
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'articleassessment' => 'Ocena artykułu',
	'articleassessment-desc' => 'Ocena artykułu (wersja pilotażowa)',
	'articleassessment-yourfeedback' => 'Twoja opinia',
	'articleassessment-pleaserate' => 'Poświeć chwilę, aby ocenić poniższą stronę.',
	'articleassessment-submit' => 'Zapisz',
	'articleassessment-rating-wellsourced' => 'Dobre źródła',
	'articleassessment-rating-neutrality' => 'Neutralny punkt widzenia',
	'articleassessment-rating-completeness' => 'Wyczerpanie tematu',
	'articleassessment-rating-readability' => 'Zrozumiałość',
	'articleassessment-rating-wellsourced-tooltip' => 'Czy uważasz, że strona ma wystarczającą liczbę odnośników i że odnoszą się one do wiarygodnych źródeł?',
	'articleassessment-rating-neutrality-tooltip' => 'Czy uważasz, że strona prezentuje wszystkie punkty widzenia na to zagadnienie?',
	'articleassessment-rating-completeness-tooltip' => 'Czy uważasz, że strona porusza wszystkie istotne aspekty, które powinna?',
	'articleassessment-rating-readability-tooltip' => 'Czy uważasz, że strona jest poprawnie sformatowana oraz zrozumiale napisana?',
	'articleassessment-articlerating' => 'Ocena strony',
	'articleassessment-error' => 'Wystąpił błąd. 
Spróbuj ponownie później.',
	'articleassessment-thanks' => 'Wystawiona przez Ciebie ocena została zapisana.',
	'articleassessment-featurefeedback' => '<span class="feedbacklink">Napisz do autorów</span> co myślisz o tym rozszerzeniu.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|ocena|oceny|ocen}})',
	'articleassessment-stalemessage-norevisioncount' => "Strona została ''zmieniona'' od czasu, gdy ją oceniałeś.
Możesz ocenić ją ponownie.",
	'articleassessment-results-show' => '(Wyniki ukryte. <span class="showlink">Pokaż</span> je.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Ukryj wyniki</span>)',
	'articleassessment-survey-question-whyrated' => 'Dlaczego oceniłeś dziś tę stronę (zaznacz wszystkie pasujące):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Chciałem mieć wpływ na ogólną ocenę strony',
	'articleassessment-survey-answer-whyrated-development' => 'Mam nadzieję, że moja ocena pozytywnie wpłynie na rozwój strony',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Chciałem mieć swój wkład w rozwój {{GRAMMAR:D.lp|{{SITENAME}}}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Lubię dzielić się swoją opinią',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Nie oceniałem dziś, ale chcę podzielić się swoją opinią na temat tego rozszerzenia',
	'articleassessment-survey-answer-whyrated-other' => 'Inny powód',
	'articleassessment-survey-question-useful' => 'Czy uważasz, że taka metoda oceniania jest użyteczna i czytelna?',
	'articleassessment-survey-question-useful-iffalse' => 'Dlaczego?',
	'articleassessment-survey-question-expert' => 'Czy uważasz się za eksperta w tematyce, którą porusza ta strona?',
	'articleassessment-survey-question-expert-iftrue' => 'Czy możesz opisać swój poziom wiedzy?',
	'articleassessment-survey-question-comments' => 'Czy masz jakieś dodatkowe uwagi?',
	'articleassessment-survey-submit' => 'Zapisz',
	'articleassessment-survey-title' => 'Proszę udzielić odpowiedzi na kilka pytań',
	'articleassessment-survey-thanks' => 'Dziękujemy za wypełnienie ankiety.',
);

/** Piedmontese (Piemontèis)
 * @author Dragonòt
 */
$messages['pms'] = array(
	'articleassessment' => "Valutassion ëd j'artìcoj",
	'articleassessment-desc' => "Vërsion pilòta dla valutassion ëd j'artìcoj",
	'articleassessment-yourfeedback' => 'Tò artorn',
	'articleassessment-pleaserate' => 'Për piasì pija un moment për valuté sta pàgina sota.',
	'articleassessment-submit' => 'Spediss',
	'articleassessment-rating-wellsourced' => 'Bon-e-Sorgiss:',
	'articleassessment-rating-neutrality' => 'Neutral:',
	'articleassessment-rating-completeness' => 'Completa:',
	'articleassessment-rating-readability' => 'Lesìbil:',
	'articleassessment-rating-wellsourced-tooltip' => "Pensës-to che sto artìcol a l'abia basta citassion e che ste citassion a rivo da sorziss sigure?",
	'articleassessment-rating-neutrality-tooltip' => 'Pensës-to che sto artìcol a mosta na giusta rapresentassion ëd tute le prospetive ant sua edission?',
	'articleassessment-rating-completeness-tooltip' => "Pensës-to che sto artìcol a coata le aire essensial ëd l'argoment com a dovrìa?",
	'articleassessment-rating-readability-tooltip' => 'Pensës-to che sto artìcol a sia bin-organisà e bin scrivù?',
	'articleassessment-articlerating' => "Valutassion ëd l'artìcol",
	'articleassessment-error' => "Un eror a l'é capità.
Për piasì preuva torna pi tard.",
	'articleassessment-thanks' => 'Mersì! Toe valutassion a son ëstàite salvà.',
	'articleassessment-featurefeedback' => 'Dane <span class="feedbacklink">artorn</span> a propòsit dë sta funsion.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|valutassion|valutassion}})',
	'articleassessment-stalemessage-norevisioncount' => "Sto artìcol a l'é stàit ''revisionà'' da quand ch'it l'has revisionalo.
It podrìe vorejlo revaluté.",
	'articleassessment-results-show' => '(Arzultà stërmà. <span class="showlink">Mostlo</span>.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Stërma arzultà</span>)',
	'articleassessment-survey-question-whyrated' => "Për piasì fane savèj përchè it l'has valutà sta pàgina ancheuj (signa tut lòn ch'a centra):",
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'I veui contribuì a la valutassin antera dla pàgina',
	'articleassessment-survey-answer-whyrated-development' => 'I sper che mia valutassion a peussa toché positivament ël dësvilup ëd la pàgina',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'I veui contribuì a {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Am pias condivide mia opinion',
	'articleassessment-survey-answer-whyrated-didntrate' => "I l'heu pa dàit valutassion ancheuj, ma i veui dé d'artorn an sla funsion",
	'articleassessment-survey-answer-whyrated-other' => 'Àutr',
	'articleassessment-survey-question-useful' => 'Chërdës-to che le valutassion dàite a sio ùtij e ciàire?',
	'articleassessment-survey-question-useful-iffalse' => 'Përchè?',
	'articleassessment-survey-question-expert' => "Considërës-to ti midem n'espert ant ël camp che sta pàgina a coata?",
	'articleassessment-survey-question-expert-iftrue' => 'Peuss-to descrive toa esperiensa?',
	'articleassessment-survey-question-comments' => "L'has-to quaich coment adissionaj?",
	'articleassessment-survey-submit' => 'Spediss',
	'articleassessment-survey-title' => 'Për piasì arspond a quaich custion',
	'articleassessment-survey-thanks' => 'Mersì për avej vempì ël questionari.',
);

/** Portuguese (Português)
 * @author Giro720
 * @author Hamilton Abreu
 * @author Waldir
 */
$messages['pt'] = array(
	'articleassessment' => 'Avaliação do artigo',
	'articleassessment-desc' => 'Avaliação do artigo (versão de testes)',
	'articleassessment-yourfeedback' => 'Os seus comentários',
	'articleassessment-pleaserate' => 'Dedique um momento a avaliar esta página abaixo, por favor.',
	'articleassessment-submit' => 'Enviar',
	'articleassessment-rating-wellsourced' => 'Bem referenciado:',
	'articleassessment-rating-neutrality' => 'Neutro:',
	'articleassessment-rating-completeness' => 'Completo:',
	'articleassessment-rating-readability' => 'Fácil de ler:',
	'articleassessment-rating-wellsourced-tooltip' => 'Considera que esta página tem citações suficientes e que essas citações provêm de fontes fiáveis?',
	'articleassessment-rating-neutrality-tooltip' => 'Acha que esta página representa, de forma equilibrada, todos os pontos de vista sobre o assunto?',
	'articleassessment-rating-completeness-tooltip' => 'Considera que esta página aborda os temas essenciais que deviam ser cobertos?',
	'articleassessment-rating-readability-tooltip' => 'Acha que esta página está bem organizada e bem escrita?',
	'articleassessment-articlerating' => 'Avaliação da página',
	'articleassessment-error' => 'Ocorreu um erro. 
Tente novamente mais tarde, por favor.',
	'articleassessment-thanks' => 'Obrigado! As suas avaliações foram gravadas.',
	'articleassessment-featurefeedback' => 'Envie-nos os seus <span class="feedbacklink">comentários</span> sobre esta funcionalidade.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|avaliação|avaliações}})',
	'articleassessment-stalemessage-norevisioncount' => "Esta página foi ''alterada'' desde a sua última revisão. 
Talvez queira voltar a avaliá-la.",
	'articleassessment-results-show' => '(Resultados ocultados. <span class="showlink">Mostrá-los</span>.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Ocultar os resultados</span>)',
	'articleassessment-survey-question-whyrated' => 'Diga-nos porque é que classificou esta página hoje (marque todas as opções verdadeiras):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Queria contribuir para a classificação global da página',
	'articleassessment-survey-answer-whyrated-development' => 'Espero que a minha classificação afecte positivamente o desenvolvimento da página',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Queria colaborar com a {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Gosto de dar a minha opinião',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Hoje não classifiquei páginas, mas queria deixar o meu comentário sobre a funcionalidade',
	'articleassessment-survey-answer-whyrated-other' => 'Outra',
	'articleassessment-survey-question-useful' => 'Acredita que as classificações dadas são úteis e claras?',
	'articleassessment-survey-question-useful-iffalse' => 'Porquê?',
	'articleassessment-survey-question-expert' => 'Considera-se um perito na área descrita nesta página?',
	'articleassessment-survey-question-expert-iftrue' => 'Pode descrever a sua experiência?',
	'articleassessment-survey-question-comments' => 'Tem mais comentários?',
	'articleassessment-survey-submit' => 'Enviar',
	'articleassessment-survey-title' => 'Por favor, responda a algumas perguntas',
	'articleassessment-survey-thanks' => 'Obrigado por preencher o inquérito.',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Giro720
 */
$messages['pt-br'] = array(
	'articleassessment' => 'Avaliação do artigo',
	'articleassessment-desc' => 'Avaliação do artigo (versão de testes)',
	'articleassessment-yourfeedback' => 'Os seus comentários',
	'articleassessment-pleaserate' => 'Dedique um momento para avaliar esta página abaixo, por favor.',
	'articleassessment-submit' => 'Enviar',
	'articleassessment-rating-wellsourced' => 'Bem referenciado:',
	'articleassessment-rating-neutrality' => 'Neutro:',
	'articleassessment-rating-completeness' => 'Completo:',
	'articleassessment-rating-readability' => 'Fácil de ler:',
	'articleassessment-rating-wellsourced-tooltip' => 'Você considera que esta página tem citações suficientes e que essas citações provêm de fontes fiáveis?',
	'articleassessment-rating-neutrality-tooltip' => 'Você acha que esta página representa, de forma equilibrada, todos os pontos de vista sobre o assunto?',
	'articleassessment-rating-completeness-tooltip' => 'Você considera que esta página aborda os temas essenciais que deviam ser cobertos?',
	'articleassessment-rating-readability-tooltip' => 'Você acha que esta página está bem organizada e bem escrita?',
	'articleassessment-articlerating' => 'Avaliação da página',
	'articleassessment-error' => 'Ocorreu um erro. 
Por favor, tente novamente mais tarde.',
	'articleassessment-thanks' => 'Obrigado! As suas avaliações foram salvas.',
	'articleassessment-featurefeedback' => 'Envie-nos os seus <span class="feedbacklink">comentários</span> sobre esta funcionalidade.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|avaliação|avaliações}})',
	'articleassessment-stalemessage-norevisioncount' => "Esta página foi ''alterada'' desde a sua última revisão. 
Talvez queira voltar a avaliá-la.",
	'articleassessment-results-show' => '(Resultados ocultados. <span class="showlink">Mostrá-los</span>.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Ocultar os resultados</span>)',
	'articleassessment-survey-question-whyrated' => 'Diga-nos porque é que classificou esta página hoje, por favor (marque todas as opções as quais se aplicam):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Eu queria contribuir para a classificação global da página',
	'articleassessment-survey-answer-whyrated-development' => 'Eu espero que a minha classificação afete positivamente o desenvolvimento da página',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Eu queria colaborar com a {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Eu gosto de dar a minha opinião',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Hoje não classifiquei páginas, mas queria deixar o meu comentário sobre a funcionalidade',
	'articleassessment-survey-answer-whyrated-other' => 'Outra',
	'articleassessment-survey-question-useful' => 'Você acredita que as classificações dadas são úteis e claras?',
	'articleassessment-survey-question-useful-iffalse' => 'Por quê?',
	'articleassessment-survey-question-expert' => "Você se considera um ''expert'' na área descrita nesta página?",
	'articleassessment-survey-question-expert-iftrue' => 'Você pode descrever a sua experiência?',
	'articleassessment-survey-question-comments' => 'Você tem mais algum comentário?',
	'articleassessment-survey-submit' => 'Enviar',
	'articleassessment-survey-title' => 'Por favor, responda a algumas perguntas',
	'articleassessment-survey-thanks' => 'Obrigado por preencher o questionário.',
);

/** Russian (Русский)
 * @author MaxSem
 * @author Александр Сигачёв
 * @author Сrower
 */
$messages['ru'] = array(
	'articleassessment' => 'Оценка статьи',
	'articleassessment-desc' => 'Оценка статьи (экспериментальный вариант)',
	'articleassessment-yourfeedback' => 'Ваш отзыв',
	'articleassessment-pleaserate' => 'Пожалуйста, уделите минуту, чтобы оценить статью ниже.',
	'articleassessment-submit' => 'Сохранить',
	'articleassessment-rating-wellsourced' => 'Из хорошего источника:',
	'articleassessment-rating-neutrality' => 'Нейтральная:',
	'articleassessment-rating-completeness' => 'Завершённая:',
	'articleassessment-rating-readability' => 'Читаемая:',
	'articleassessment-rating-wellsourced-tooltip' => 'Считаете ли Вы, что на этой странице достаточно цитат и что они взяты из достоверных источников?',
	'articleassessment-rating-neutrality-tooltip' => 'Считаете ли Вы, что эта страница объективно отражает все точки зрения по этому вопросу?',
	'articleassessment-rating-completeness-tooltip' => 'Считаете ли Вы, что эта страница в достаточной мере расскрывает основные вопросы темы.',
	'articleassessment-rating-readability-tooltip' => 'Считаете ли Вы, что эта страница хорошо организована и хорошо написана?',
	'articleassessment-articlerating' => 'Рейтинг страницы',
	'articleassessment-error' => 'Произошла ошибка. 
Пожалуйста, повторите попытку позже.',
	'articleassessment-thanks' => 'Спасибо! Ваши оценки сохранены.',
	'articleassessment-featurefeedback' => 'Сообщите [[Special:ArticleAssessmentFeedback|Ваше мнение]] об этой функции.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL: $ 2 | оценка | оценки}})',
	'articleassessment-stalemessage-norevisioncount' => 'Эта страница редактировалась после Вашего просмотра. 
Вы можете оценить её еще раз.',
	'articleassessment-results-show' => '(Результаты скрыты. <span class="showlink">Показать</span> их).',
	'articleassessment-results-hide' => '(<span class="hidelink">Скрыть результаты</span>)',
	'articleassessment-survey-question-whyrated' => 'Пожалуйста, дайте нам знать, почему вы сегодня дали оценку этой странице (отметьте все подходящие варианты):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Я хотел повлиять на итоговый рейтинг этой страницы',
	'articleassessment-survey-answer-whyrated-development' => 'Я надеюсь, что моя оценка положительно повлияет на развитие этой странице',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Я хочу содействовать развитию {{GRAMMAR:genitive|{{SITENAME}}}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Мне нравится делиться своим мнением',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Я не поставил сегодня оценку, но хочу оставить отзыв о данной функции',
	'articleassessment-survey-answer-whyrated-other' => 'Иное',
	'articleassessment-survey-question-useful' => 'Считаете ли вы, что проставленные оценки являются полезными и понятными?',
	'articleassessment-survey-question-useful-iffalse' => 'Почему?',
	'articleassessment-survey-question-expert' => 'Считаете ли вы себя специалистом в области, к которой относится тема этой страницы?',
	'articleassessment-survey-question-expert-iftrue' => 'Можете ли вы привести экспертную оценку?',
	'articleassessment-survey-question-comments' => 'Есть ли у вас какие-либо дополнительные замечания?',
	'articleassessment-survey-submit' => 'Отправить',
	'articleassessment-survey-title' => 'Пожалуйста, ответьте на несколько вопросов',
	'articleassessment-survey-thanks' => 'Спасибо за участие в опросе.',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'articleassessment' => 'Pagsusuri ng lathalain',
	'articleassessment-desc' => 'Pagsusuri ng lathalain (paunang bersyon)',
	'articleassessment-yourfeedback' => 'Ang iyong puna',
	'articleassessment-pleaserate' => 'Mangyaring maglaan ng isang sanali upang antasan ang pahinang nasa ibaba.',
	'articleassessment-submit' => 'Ipadala',
	'articleassessment-rating-wellsourced' => 'Sapat at tumpak ang mga pinagkunan',
	'articleassessment-rating-neutrality' => 'Walang pinapanigan:',
	'articleassessment-rating-completeness' => 'Kumpleto:',
	'articleassessment-rating-readability' => 'Nababasa:',
	'articleassessment-rating-wellsourced-tooltip' => 'Sa tingin mo ba ang pahinang ito ay may sapat ng mga pagbanggit at ang mga pagbanggit na ito ay nagbuhat sa mapagkakatiwalaang mga pinagkunan?',
	'articleassessment-rating-neutrality-tooltip' => 'Sa tingin mo ba ang pahinang ito ay nagpapakita ng isang patas na kinatawan ng lahat ng mga pananaw hinggil sa paksa?',
	'articleassessment-rating-completeness-tooltip' => 'Sa tingin mo ba ang pahinang ito ay sumasaklaw sa nararapat na mahahalagang mga lugar ng paksa?',
	'articleassessment-rating-readability-tooltip' => 'Sa tingin mo ba ang pahinang ito ay talagang maayos at mabuti ang pagkakasulat?',
	'articleassessment-articlerating' => 'Pagkakaantas ng pahina',
	'articleassessment-error' => 'Naganap ang isang kamalian.
Subukan uli mamaya.',
	'articleassessment-thanks' => 'Salamat! Nasagip na ang iyong mga pag-aantas.',
	'articleassessment-featurefeedback' => 'Bigyan kami ng <span class="feedbacklink">puna</span> hinggil sa tampok na ito.',
	'articleassessment-noratings' => ' $1 ($2 {{PLURAL:$2|pag-aantas|mga pag-aantas}})',
	'articleassessment-stalemessage-norevisioncount' => "''Nabago'' ang pahinang ito magmula noong huli mong pagsuri nito.
Maaari mo itong antasang muli.",
	'articleassessment-results-show' => '(Nakatago ang mga resulta. <span class="showlink">Ipakita</span> ang mga ito.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Itago ang mga resulta</span>)',
	'articleassessment-survey-question-whyrated' => 'Mangyari sabihin sa amin kung bakit mo inantasan ng ganito ang pahinang ito ngayon (lagyan ng tsek ang lahat ng maaari):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Nais kong umambag sa pangkalahatang kaantasan ng pahina',
	'articleassessment-survey-answer-whyrated-development' => 'Umaasa ako na ang aking pag-aantas ay positibong makakaapekto sa pagpapaunlad ng pahina',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Nais kong makapag-ambag sa {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Nais ko ang pagpapamahagi ng aking opinyon',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Hindi ako nagbigay ng pag-aantas ngayon, subalit nais kong magbigay ng puna sa hinaharap',
	'articleassessment-survey-answer-whyrated-other' => 'Iba pa',
	'articleassessment-survey-question-useful' => 'Naniniwala ka ba na ang mga pag-aantas na ibinigay ay magagamit at malinaw?',
	'articleassessment-survey-question-useful-iffalse' => 'Bakit?',
	'articleassessment-survey-question-expert' => 'Itinuturing mo ba ang sarili mo bilang isang dalubhasa sa larangang sakop ng pahinang ito?',
	'articleassessment-survey-question-expert-iftrue' => 'Maaari mo bang ilarawan ang iyong kadalubhasaan?',
	'articleassessment-survey-question-comments' => 'Mayroon ka pa bang karagdagang mga puna?',
	'articleassessment-survey-submit' => 'Ipasa',
	'articleassessment-survey-title' => 'Pakisagot ang ilang mga katanungan',
	'articleassessment-survey-thanks' => 'Salamat sa pagsagot sa mga pagtatanong.',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'articleassessment-pleaserate' => 'Xin hãy dành một chút thì giờ để đánh giá trang này ở dưới:',
	'articleassessment-submit' => 'Đánh giá',
	'articleassessment-rating-wellsourced' => 'Đầy đủ nguồn:',
	'articleassessment-rating-neutrality' => 'Trung lập:',
	'articleassessment-rating-completeness' => 'Đầy đủ:',
	'articleassessment-rating-readability' => 'Dễ đọc:',
	'articleassessment-rating-wellsourced-tooltip' => 'Bạn có cảm thấy rằng bày này chú thích nguồn gốc đầy đủ và đáng tin các nguồn?',
	'articleassessment-rating-neutrality-tooltip' => 'Bạn có cảm thấy rằng bài này đại diện công bằng cho tất cả các quan điểm về các vấn đề?',
	'articleassessment-rating-completeness-tooltip' => 'Bạn có cảm thấy rằng bài này bao gồm các đề tài cần thiết?',
	'articleassessment-rating-readability-tooltip' => 'Bạn có cảm thấy rằng bài này được sắp xếp đàng hoàng có văn bản hay?',
	'articleassessment-articlerating' => 'Đánh giá bài',
	'articleassessment-error' => 'Đã gặp lỗi.
Xin hãy thử lại sau.',
	'articleassessment-thanks' => 'Cám ơn! Đánh giá của bạn đã được lưu.',
	'articleassessment-noratings' => '$1 ($2 đánh giá)',
	'articleassessment-stalemessage-norevisioncount' => "Bài này đã được ''chỉnh sửa'' sau lần cuối bạn xem xét nó.
Bạn có thể muốn đánh giá nó một lần nữa.",
	'articleassessment-results-show' => '(Các kết quả được ẩn. <span class="showlink">Hiện</span> kết quả.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Ẩn kết quả</span>)',
);

