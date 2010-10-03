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
 * @author Y-M D
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
	'articleassessment-rating-wellsourced-tooltip' => "Hag-eñ e soñjoc'h emañ ar bajenn-mañ gant trawalc'h a arroudennoù ? Ha diwar mammennoù sirius e teuont ?",
	'articleassessment-rating-neutrality-tooltip' => "Hag-eñ e soñjoc'h e pled ar bajenn-mañ d'un doare reizh ha gant ur sav-gwel ar sujed ?",
	'articleassessment-rating-completeness-tooltip' => "Hag-eñ e soñjoc'h he deus ar bajenn-mañ goloet temoù pouezusañ ar sujed ?",
	'articleassessment-rating-readability-tooltip' => "Hag-eñ e soñjoc'h emañ ar bajenn-mañ aozet mat ha skrivet mat ?",
	'articleassessment-articlerating' => 'Priziadenn ar bajenn',
	'articleassessment-error' => "Ur fazi zo bet.
Klaskit en-dro diwezhatoc'h.",
	'articleassessment-thanks' => 'Trugarez ! Ho priziadenn zo bet enrollet.',
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
	'articleassessment-survey-question-useful' => "Hag-eñ e soñjoc'h ez eo ar briziadennoù roet talvoudus ha sklaer ?",
	'articleassessment-survey-question-useful-iffalse' => 'Perak ?',
	'articleassessment-survey-question-expert' => "Hag-eñ e soñjoc'h emaoc'h arbennigour war an dachenn pledet er bajenn ?",
	'articleassessment-survey-question-expert-iftrue' => 'Gallout a rit diskrivañ ho prizacherezh ?',
	'articleassessment-survey-question-comments' => 'Evezhiadennoù all ho pefe ?',
	'articleassessment-survey-submit' => 'Kas',
	'articleassessment-survey-title' => "Trugarez da respont d'un nebeut goulennoù",
	'articleassessment-survey-thanks' => 'Trugarez da vezañ leuniet ar goulennaoueg.',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'articleassessment' => 'Ocjenjivanje članaka',
	'articleassessment-desc' => 'Ocjenjivanje članaka (probna verzija)',
	'articleassessment-yourfeedback' => 'Vaše povratne informacije',
	'articleassessment-pleaserate' => 'Molimo odvojite trenutak vremena da ispod ocijenite ovu stranicu.',
	'articleassessment-submit' => 'Pošalji',
	'articleassessment-rating-wellsourced' => 'Dobro referencirano:',
	'articleassessment-rating-neutrality' => 'Neutralnost:',
	'articleassessment-rating-completeness' => 'Završenost:',
	'articleassessment-rating-readability' => 'Čitljivost:',
	'articleassessment-rating-wellsourced-tooltip' => 'Da li smatrate da ova stranica ima dovoljno izvora i da su oni iz provjerljivih izvora?',
	'articleassessment-rating-neutrality-tooltip' => 'Da li smatrate da ova stranica prikazuje neutralni prikaz iz svih perspektiva o temi?',
	'articleassessment-rating-completeness-tooltip' => 'Da li mislite da ova stranica pokriva osnovna područja teme koja bi trebala?',
	'articleassessment-rating-readability-tooltip' => 'Da li mislite da je ova stranica dobro organizirana i dobro napisana?',
	'articleassessment-articlerating' => 'Rejting stranice',
	'articleassessment-error' => 'Desila se greška.
Molimo pokušajte kasnije.',
	'articleassessment-thanks' => 'Hvala! Vaše ocjene su sačuvane.',
	'articleassessment-featurefeedback' => 'Dajte nam <span class="feedbacklink">povratne podatke</span> o ovoj mogućnosti.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|ocjena|ocjene|ocjena}})',
	'articleassessment-stalemessage-norevisioncount' => "Ova stranica je ''provjerena'' od kako ste je posljednji put pregledali.
Da li je želite ocijeniti ponovo.",
	'articleassessment-results-show' => '(Rezultati sakriveni. <span class="showlink">Prikaži</span> ih.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Sakrij rezultate</span>)',
	'articleassessment-survey-question-whyrated' => 'Molimo recite nam zašto se ocijenili danas ovu stranicu (označite sve koje se može primijeniti):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Želio sam da pridonesem sveukupnoj ocjeni stranice',
	'articleassessment-survey-answer-whyrated-development' => 'Nadam se da će moja ocjena imati pozitivan odjek na uređivanje stranice',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Želim da pridonosim na projektu {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Volim dijeliti svoje mišljenje',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Nisam dao ocjene danas, ali sam želio da dadnem povratne podatke o mogućnostima',
	'articleassessment-survey-answer-whyrated-other' => 'Ostalo',
	'articleassessment-survey-question-useful' => 'Da li vjerujete da su date ocjene korisne i jasne?',
	'articleassessment-survey-question-useful-iffalse' => 'Zašto?',
	'articleassessment-survey-question-expert' => 'Da li Vi sebe smatrate ekspertom u oblasti o kojoj ovaj članak piše?',
	'articleassessment-survey-question-expert-iftrue' => 'Možete li opisati svoju eksperizu?',
	'articleassessment-survey-question-comments' => 'Da li imate dodatnih komentara?',
	'articleassessment-survey-submit' => 'Pošalji',
	'articleassessment-survey-title' => 'Molimo odgovorite na nekoliko pitanja',
	'articleassessment-survey-thanks' => 'Hvala vam na popunjavanju ankete.',
);

/** Czech (Česky)
 * @author Mormegil
 */
$messages['cs'] = array(
	'articleassessment' => 'Hodnocení článku',
	'articleassessment-desc' => 'Hodnocení článků (pilotní verze)',
	'articleassessment-yourfeedback' => 'Váš názor',
	'articleassessment-pleaserate' => 'Věnujte prosím chvilku ohodnocení této stránky.',
	'articleassessment-submit' => 'Odeslat',
	'articleassessment-rating-wellsourced' => 'Podloženost:',
	'articleassessment-rating-neutrality' => 'Nezaujatost:',
	'articleassessment-rating-completeness' => 'Úplnost:',
	'articleassessment-rating-readability' => 'Čitelnost:',
	'articleassessment-rating-wellsourced-tooltip' => 'Máte pocit, že tato stránka dostatečně odkazuje na zdroje a použité zdroje jsou důvěryhodné?',
	'articleassessment-rating-neutrality-tooltip' => 'Máte pocit, že tato stránka spravedlivě pokrývá všechny pohledy na dané téma?',
	'articleassessment-rating-completeness-tooltip' => 'Máte pocit, že tato stránka pokrývá všechny důležité části tématu?',
	'articleassessment-rating-readability-tooltip' => 'Máte pocit, že tato stránka je správně organizována a dobře napsána?',
	'articleassessment-articlerating' => 'Hodnocení stránky',
	'articleassessment-error' => 'Došlo k chybě.
Zkuste to prosím později.',
	'articleassessment-thanks' => 'Děkujeme! Vaše hodnocení bylo uloženo.',
	'articleassessment-featurefeedback' => 'Sdělte nám svůj <span class="feedbacklink">názor</span> na tuto funkci.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|hodnocení|hodnocení}})',
	'articleassessment-stalemessage-norevisioncount' => "Od chvíle, co jste stránku {{GENDER:|hodnotil|hodnotila|hodnotili}}, byla ''upravena''.
Možná ji budete chtít ohodnotit znovu.",
	'articleassessment-results-show' => '(Výsledky jsou skryty. <span class="showlink">Zobrazit</span>.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Skrýt výsledky</span>)',
	'articleassessment-survey-question-whyrated' => 'Proč jste dnes hodnotili tuto stránku (zaškrtněte všechny platné možnosti)?',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Chtěl jsem ovlivnit výsledné ohodnocení stránky',
	'articleassessment-survey-answer-whyrated-development' => 'Doufám, že mé hodnocení pozitivně ovlivní budoucí vývoj stránky',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Chtěl jsem pomoci {{grammar:3sg|{{SITENAME}}}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Rád sděluji svůj názor',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Dnes jsem nehodnotil, ale chtěl jsem poskytnout svůj názor na tuto funkci',
	'articleassessment-survey-answer-whyrated-other' => 'Jiný důvod',
	'articleassessment-survey-question-useful' => 'Myslíte si, že poskytovaná hodnocení jsou užitečná a pochopitelná?',
	'articleassessment-survey-question-useful-iffalse' => 'Proč?',
	'articleassessment-survey-question-expert' => 'Považujete se za odborníka na téma, o kterém tato stránka pojednává?',
	'articleassessment-survey-question-expert-iftrue' => 'Můžete popsat svou odbornost?',
	'articleassessment-survey-question-comments' => 'Máte nějaké další komentáře?',
	'articleassessment-survey-submit' => 'Odeslat',
	'articleassessment-survey-title' => 'Odpovězte prosím na několik otázek',
	'articleassessment-survey-thanks' => 'Děkujeme za vyplnění průzkumu.',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'articleassessment' => 'Artikeleinschätzung',
	'articleassessment-desc' => 'Ermöglicht die Einschätzung von Artikeln (Pilotversion)',
	'articleassessment-yourfeedback' => 'Deine Einschätzung',
	'articleassessment-pleaserate' => 'Bitte nimm dir kurz Zeit, diesen Artikel einzuschätzen.',
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
	'articleassessment-featurefeedback' => 'Gib uns bitte eine <span class="feedbacklink">Rückmeldung</span> zu dieser Möglichkeit der Einschätzung eines Artikels.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|Einschätzung|Einschätzungen}})',
	'articleassessment-stalemessage-norevisioncount' => "Dieser Artikel wurde seit deiner letzten Einschätzung ''bearbeitet''.
Vielleicht möchtest du ihn erneut einschätzen.",
	'articleassessment-results-show' => '(Ergebnisse sind ausgeblendet. <span class="showlink">Einblenden</span>.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Ergebnisse ausblenden</span>)',
	'articleassessment-survey-question-whyrated' => 'Bitte lasse uns wissen, warum du diesen Artikel heute eingeschätzt hast (Zutreffendes bitte ankreuzen):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Ich wollte mich an der Einschätzung des Artikels beteiligen',
	'articleassessment-survey-answer-whyrated-development' => 'Ich hoffe, dass meine Einschätzung die künftige Entwicklung des Artikels positiv beeinflusst',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Ich wollte mich an {{SITENAME}} beteiligen',
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

/** German (formal address) (Deutsch (Sie-Form))
 * @author Catrope
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'articleassessment-yourfeedback' => 'Ihre Rückmeldung',
	'articleassessment-pleaserate' => 'Bitte nehmen Sie sich kurz Zeit diesen Artikel unten auf dieser Seite einzuschätzen.',
	'articleassessment-rating-wellsourced-tooltip' => 'Haben Sie den Eindruck, dass dieser Artikel über genügend Quellenangaben verfügt und diese zudem aus vertrauenswürdigen Quellen stammen?',
	'articleassessment-rating-neutrality-tooltip' => 'Haben Sie den Eindruck, dass dieser Artikel eine ausgewogene Darstellung aller mit dessen Inhalt verbundenen Aspekte enthält?',
	'articleassessment-rating-completeness-tooltip' => 'Haben Sie den Eindruck, dass dieser Artikel alle wichtigen Aspekte enthält, die mit dessen Inhalt zusammenhängen?',
	'articleassessment-rating-readability-tooltip' => 'Haben Sie den Eindruck, dass dieser Artikel gut strukturiert sowie geschrieben wurde?',
	'articleassessment-error' => 'Ein Fehler ist aufgetreten.
Bitte versuchen Sie es später erneut.',
	'articleassessment-thanks' => 'Vielen Dank! Ihre Einschätzung wurde gespeichert.',
	'articleassessment-featurefeedback' => 'Geben Sie uns bitte eine <span class="feedbacklink">Rückmeldung</span> zu dieser Funktion zur Einschätzung eines Artikels.',
	'articleassessment-stalemessage-norevisioncount' => "Dieser Artikel wurde seit Ihrer letzten Einschätzung ''bearbeitet''.
Vielleicht möchten Sie ihn erneut einschätzen.",
	'articleassessment-survey-question-whyrated' => 'Bitte lassen Sie uns wissen, warum Sie diesen Artikel heute eingeschätzt haben (Zutreffendes bitte ankreuzen):',
	'articleassessment-survey-question-useful' => 'Glauben Sie, dass die abgegebenen Einschätzungen nützlich und verständlich sind?',
	'articleassessment-survey-question-expert' => 'Halten Sie sich für kompetent auf dem Gebiet, mit dem sich der Inhalt dieses Artikels beschäftigt?',
	'articleassessment-survey-question-expert-iftrue' => 'Können Sie Ihre Sachkenntnisse beschreiben?',
	'articleassessment-survey-question-comments' => 'Haben Sie noch weitere Anmerkungen?',
	'articleassessment-survey-title' => 'Bitte beantworten Sie uns ein paar Fragen',
	'articleassessment-survey-thanks' => 'Vielen Dank für Ihre Rückmeldung.',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'articleassessment-survey-question-useful-iffalse' => 'Kial?',
);

/** Spanish (Español)
 * @author Locos epraix
 */
$messages['es'] = array(
	'articleassessment-rating-neutrality' => 'Neutro:',
	'articleassessment-rating-completeness' => 'Completo:',
	'articleassessment-rating-readability' => 'Legible:',
	'articleassessment-results-hide' => '(<span class="hidelink">Esconder resultados</span>)',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Quería contribuir a {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-other' => 'Otro',
	'articleassessment-survey-question-useful-iffalse' => '¿Por qué?',
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

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'articleassessment' => 'Èstimacion d’articllo',
	'articleassessment-desc' => 'Èstimacion d’articllo (vèrsion pilote)',
	'articleassessment-yourfeedback' => 'Voutron avis',
	'articleassessment-submit' => 'Sometre',
	'articleassessment-rating-wellsourced' => 'Bien fondâ :',
	'articleassessment-rating-neutrality' => 'Netro :',
	'articleassessment-rating-completeness' => 'Complèt :',
	'articleassessment-rating-readability' => 'Liésiblo :',
	'articleassessment-articlerating' => 'Èstimacion de la pâge',
	'articleassessment-featurefeedback' => 'Balyéd-nos voutron <span class="feedbacklink">avis</span> sur cela fonccionalitât.',
	'articleassessment-noratings' => '$1 ($2 èstimacion{{PLURAL:$2||s}})',
	'articleassessment-results-show' => '(Rèsultats cachiês. Los <span class="showlink">fâre vêre</span>.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Cachiér los rèsultats</span>)',
	'articleassessment-survey-answer-whyrated-other' => 'Ôtra',
	'articleassessment-survey-question-useful-iffalse' => 'Porquè ?',
	'articleassessment-survey-submit' => 'Sometre',
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

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'articleassessment' => 'Artikelyyschetzig',
	'articleassessment-desc' => 'Macht d Yyschetzig vu Artikel megli (Pilotversion)',
	'articleassessment-yourfeedback' => 'Dyy Yyschetzig',
	'articleassessment-pleaserate' => 'Bitte nimm Dir churz Zyt un tue dää Artikel yyschetze.',
	'articleassessment-submit' => 'Ibertrage',
	'articleassessment-rating-wellsourced' => 'Guet beleit:',
	'articleassessment-rating-neutrality' => 'Neutral:',
	'articleassessment-rating-completeness' => 'Vollständig:',
	'articleassessment-rating-readability' => 'Verständli:',
	'articleassessment-rating-wellsourced-tooltip' => 'Hesch Du dr Yydruck, ass es in däm Artikel gnue Quällenaagabe het un ass mer däne Quälle cha tröue?',
	'articleassessment-rating-neutrality-tooltip' => 'Hesch Du dr Yydruck, ass dää Artikel e uusgwogeni Darstellig isch vu allne Aschpäkt, wu mit däm Thema verbunde sin?',
	'articleassessment-rating-completeness-tooltip' => 'Hesch Du dr Yydruck, ass in däm Artikel aali Aschpäkt ufgfiert sin, wu mit däm Thema zämmehange?',
	'articleassessment-rating-readability-tooltip' => 'Hesch Du dr Yydruck, ass dää Artikel guet strukturiert un gschribe isch?',
	'articleassessment-articlerating' => 'Yyschetzig vum Artikel',
	'articleassessment-error' => 'E Fähler isch ufträtte.
Bitte versuech s nomol.',
	'articleassessment-thanks' => 'Dankschen! Dyy Yyschetzig isch gspycheret wore.',
	'articleassessment-featurefeedback' => 'Gib s bitte ne <span class="feedbacklink">Ruckmäldig</span> zue däre Funktion.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|Yyschetzig|Yyschetzige}})',
	'articleassessment-stalemessage-norevisioncount' => "Dää Artikel isch syt Dyyre letschte Yyschetzig ''bearbeitet'' wore.
Villicht witt e nomol yyschetze.",
	'articleassessment-results-show' => '(Ergebnis sin uusbländet. <span class="showlink">Yyblände</span>.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Ergebnis uusblände</span>)',
	'articleassessment-survey-question-whyrated' => 'Bitte loss es is wisse, wurum Du dää Artikel hite yygschetzt hesch (bitte aachryzle, was zuetrifft):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Ich haa welle mitmache bi dr Yyschetzig vu däm Artikel',
	'articleassessment-survey-answer-whyrated-development' => 'Ich hoffe, ass myy Yyschetzig e positive Yyfluss het uf di chimftig Entwicklig vum Artikel',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Ich haa welle mitmache bi {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Ich tue gärn myy Meinig teile',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Ich haa hite kei Yyschetzig vorgnuu, haa aber e Ruckmäldig zue däre Funktion welle gee',
	'articleassessment-survey-answer-whyrated-other' => 'Anderi',
	'articleassessment-survey-question-useful' => 'Glaubsch, ass d Yyschetzige, wu abgee wore sin, nitzli un verständli sin?',
	'articleassessment-survey-question-useful-iffalse' => 'Wurum?',
	'articleassessment-survey-question-expert' => 'Haltesch Du di fir kompetänt uf em Biet vum Syteinhalt?',
	'articleassessment-survey-question-expert-iftrue' => 'Chasch Du dyy Sachchänntnis bschryybe?',
	'articleassessment-survey-question-comments' => 'Hesch no meh Aamerkige?',
	'articleassessment-survey-submit' => 'Ibertrage',
	'articleassessment-survey-title' => 'Bitte gib Antworte uf e paar Froge',
	'articleassessment-survey-thanks' => 'Dankschen fir Dyy Ruckmäldig.',
);

/** Croatian (Hrvatski)
 * @author Herr Mlinka
 * @author SpeedyGonsales
 */
$messages['hr'] = array(
	'articleassessment' => 'Ocjenjivanje članaka',
	'articleassessment-desc' => 'Ocjenjivanje članaka (probna inačica)',
	'articleassessment-yourfeedback' => 'Vaše povratne informacije',
	'articleassessment-pleaserate' => 'Molimo vas odvojite trenutak vremena kako bi ocijenili stranicu u nastavku.',
	'articleassessment-submit' => 'Pošalji',
	'articleassessment-rating-wellsourced' => 'Dobro potkrijepljeno izvorima:',
	'articleassessment-rating-neutrality' => 'Neutralnost:',
	'articleassessment-rating-completeness' => 'Zaokruženost (pokrivanja teme):',
	'articleassessment-rating-readability' => 'Čitljivost:',
	'articleassessment-rating-wellsourced-tooltip' => 'Mislite li da ova stranica ima dovoljno citata koji imaju pouzdane izvore?',
	'articleassessment-rating-neutrality-tooltip' => 'Mislite li da ova stranica prikazuje temu neutralno iz svih perspektiva?',
	'articleassessment-rating-completeness-tooltip' => 'Mislite li da ova stranica pokriva osnovna područja teme koja bi trebala biti pokrivena?',
	'articleassessment-rating-readability-tooltip' => 'Mislite li da je ova stranica dobro organizirana i dobro napisana?',
	'articleassessment-articlerating' => 'Ocjena stranice',
	'articleassessment-error' => 'Došlo je do pogreške. 
Molimo, pokušajte ponovno kasnije.',
	'articleassessment-thanks' => 'Hvala! Vaše ocjene su sačuvane.',
	'articleassessment-featurefeedback' => 'Dajte nam <span class="feedbacklink">povratne informacije</span> o mogućnosti ocjenjivanja članaka.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|ocjena|ocjene|ocjena}})',
	'articleassessment-stalemessage-norevisioncount' => "Ova stranica je ''uređivana'' nakon vašeg ocjenjivanja.
Možda ju želite ocijeniti ponovo.",
	'articleassessment-results-show' => '(Rezultati su skriveni. <span class="showlink">Pokažite</span> ih.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Sakrij rezultate</span>)',
	'articleassessment-survey-question-whyrated' => 'Molimo recite nam zašto ste ocijenili danas ovu stranicu (označite sve što se može primijeniti):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Želio sam pridonijeti sveukupnoj ocjeni stranice',
	'articleassessment-survey-answer-whyrated-development' => 'Nadam se da će moja ocjena imati pozitivno uticati na razvoj stranice',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Želim pridonijeti projektu {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Volim dijeliti svoje mišljenje',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Nisam dao ocjene danas, ali sam želio dati mišljenje o dogradnji',
	'articleassessment-survey-answer-whyrated-other' => 'Ostalo',
	'articleassessment-survey-question-useful' => 'Jesu li dane ocjene korisne i jasne?',
	'articleassessment-survey-question-useful-iffalse' => 'Zašto?',
	'articleassessment-survey-question-expert' => 'Smatrate li se stručnjakom za područje koje obrađuje ova stranica?',
	'articleassessment-survey-question-expert-iftrue' => 'Možete li opisati svoju stručnost?',
	'articleassessment-survey-question-comments' => 'Imate li neki dodatni komentar?',
	'articleassessment-survey-submit' => 'Pošalji',
	'articleassessment-survey-title' => 'Molimo odgovorite na nekoliko pitanja',
	'articleassessment-survey-thanks' => 'Hvala vam na popunjavanju ankete.',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Misibacsi
 */
$messages['hu'] = array(
	'articleassessment-yourfeedback' => 'Visszajelzés',
	'articleassessment-submit' => 'Küldés',
	'articleassessment-rating-neutrality' => 'Semleges:',
	'articleassessment-rating-completeness' => 'Teljes:',
	'articleassessment-rating-readability' => 'Olvashatóság:',
	'articleassessment-articlerating' => 'A lap értékelése',
	'articleassessment-error' => 'Hiba történt. 
Kérjük, próbálkozz később.',
	'articleassessment-survey-answer-whyrated-other' => 'Egyéb',
	'articleassessment-survey-question-useful-iffalse' => 'Miért?',
	'articleassessment-survey-thanks' => 'Köszönjük a kérdőív kitöltését!',
);

/** Interlingua (Interlingua)
 * @author Catrope
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
	'articleassessment-featurefeedback' => 'Da nos <span class="feedbacklink">tu opinion</span> super iste functionalitate.',
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

/** Italian (Italiano)
 * @author Beta16
 */
$messages['it'] = array(
	'articleassessment-submit' => 'Invia',
	'articleassessment-rating-wellsourced' => 'Ben documentata:',
	'articleassessment-rating-neutrality' => 'Neutrale:',
	'articleassessment-rating-completeness' => 'Completa:',
	'articleassessment-error' => 'Si è verificato un errore. 
Si prega di riprovare più tardi.',
	'articleassessment-survey-answer-whyrated-other' => 'Altro',
	'articleassessment-survey-question-useful-iffalse' => 'Perché?',
	'articleassessment-survey-submit' => 'Invia',
);

/** Japanese (日本語)
 * @author Marine-Blue
 * @author Yanajin66
 * @author 青子守歌
 */
$messages['ja'] = array(
	'articleassessment' => '記事の評価',
	'articleassessment-desc' => '記事の評価（パイロット版）',
	'articleassessment-yourfeedback' => 'あなたの感想',
	'articleassessment-pleaserate' => 'このページの評価を算出していますので、少しお待ちください。',
	'articleassessment-submit' => '送信',
	'articleassessment-rating-wellsourced' => '出典がよく示されている：',
	'articleassessment-rating-neutrality' => '中立的：',
	'articleassessment-rating-completeness' => '完成度：',
	'articleassessment-rating-readability' => '読みやすさ：',
	'articleassessment-rating-wellsourced-tooltip' => 'このページは、十分な出典を含んでいて、それらの出典は信憑性のある情報源によるものだと思いますか？',
	'articleassessment-rating-neutrality-tooltip' => 'このページは、ある問題に対する全ての観点を平等に説明していると思いますか？',
	'articleassessment-rating-completeness-tooltip' => 'この記事は、不可欠な話題を、説明していると思いますか？',
	'articleassessment-rating-readability-tooltip' => 'この記事は、良く整理され、良く書かれていると思いますか？',
	'articleassessment-articlerating' => 'ページの評価',
	'articleassessment-error' => 'エラーが発生しました。
後でもう一度試みてください。',
	'articleassessment-thanks' => 'ありがとうございます！評価は保存されました。',
	'articleassessment-featurefeedback' => 'この機能について<span class="feedbacklink">フィードバック</span>をお願いします。',
	'articleassessment-noratings' => '$1（$2の{{PLURAL:$2|評価}}）',
	'articleassessment-stalemessage-norevisioncount' => "このページは、最後に評価してから、''修正''されました。
もう一度、評価してはいかがでしょうか。",
	'articleassessment-results-show' => '（結果は隠されています。<span class="showlink">表示</span>する。）',
	'articleassessment-results-hide' => '（<span class="hidelink">結果を隠す</span>）',
	'articleassessment-survey-question-whyrated' => '今日、なぜこのページを評価したか教えてください（該当するものすべてにチェックを入れてください）：',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'ページの総合的評価を投稿したかった',
	'articleassessment-survey-answer-whyrated-development' => '自分の評価が、このページの成長に良い影響を与えることを望んでいる',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => '{{SITENAME}}に貢献したい',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => '意見を共有したい',
	'articleassessment-survey-answer-whyrated-didntrate' => '評価は与えなかったが、この機能に関するフィードバックをしたかった。',
	'articleassessment-survey-answer-whyrated-other' => 'その他',
	'articleassessment-survey-question-useful' => 'これらの評価は、分かりやすく、役に立つものだと思いますか？',
	'articleassessment-survey-question-useful-iffalse' => 'なぜですか？',
	'articleassessment-survey-question-expert' => '自分が、このページが扱う領域の専門家だと思いますか？',
	'articleassessment-survey-question-expert-iftrue' => '専門知識を述べることができますか？',
	'articleassessment-survey-question-comments' => '他に追加すべきコメントがありますか？',
	'articleassessment-survey-submit' => '送信',
	'articleassessment-survey-title' => '質問に少しお答えください',
	'articleassessment-survey-thanks' => '調査に記入していただき、ありがとうございます。',
);

/** Korean (한국어)
 * @author Kwj2772
 */
$messages['ko'] = array(
	'articleassessment' => '문서 평가',
	'articleassessment-desc' => '문서 평가 (파일럿 버전)',
	'articleassessment-yourfeedback' => '피드백',
	'articleassessment-pleaserate' => '이 문서를 평가하는 데 잠시 시간을 내 주십시오.',
	'articleassessment-submit' => '제출',
	'articleassessment-rating-wellsourced' => '출처가 잘 제시됨:',
	'articleassessment-rating-neutrality' => '중립성:',
	'articleassessment-rating-completeness' => '완성도:',
	'articleassessment-rating-readability' => '가독성:',
	'articleassessment-rating-wellsourced-tooltip' => '이 문서가 출처를 충분히 제시하고 있고 그 출처가 신뢰할 수 있다고 생각하십니까?',
	'articleassessment-rating-neutrality-tooltip' => '이 문서가 대상에 대해 중립적인 관점에서 쓰여 있다고 생각하십니까?',
	'articleassessment-rating-completeness-tooltip' => '당신은 이 문서가 다루어야 할 중요한 주제에 대해 잘 다루고 있다고 생각하십니까?',
	'articleassessment-rating-readability-tooltip' => '당신은 이 문서의 구성이 잘 짜여져 있고 글이 잘 쓰여있다고 생각하십니까?',
	'articleassessment-articlerating' => '문서 평가',
	'articleassessment-error' => '오류가 발생했습니다.
잠시 후에 대시 시도하십시오.',
	'articleassessment-thanks' => '감사합니다! 당신이 평가한 내용이 저장되었습니다.',
	'articleassessment-featurefeedback' => '이 기능에 대한 <span class="feedbacklink">피드백</span>을 남겨주세요.',
	'articleassessment-noratings' => '$1 ($2{{PLURAL:$2|명이 평가}})',
	'articleassessment-stalemessage-norevisioncount' => '이 문서는 당신이 평가한 이후 내용이 바뀌었습니다.
다시 평가하실 수 있습니다.',
	'articleassessment-results-show' => '(결과가 숨겨져 있습니다. <span class="showlink">결과 보기</span>)',
	'articleassessment-results-hide' => '(<span class="hidelink">결과 숨기기</span>)',
	'articleassessment-survey-question-whyrated' => '오늘 이 문서를 왜 평가했는지 알려주십시오 (해당되는 모든 항목에 체크해주세요):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => '이 문서에 대한 전체적인 평가에 기여하고 싶어서',
	'articleassessment-survey-answer-whyrated-development' => '내가 한 평가가 문서 발전에 긍정적인 영향을 줄 수 있다고 생각해서',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => '{{SITENAME}}에 기여하고 싶어서',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => '내 의견을 공유하고 싶어서',
	'articleassessment-survey-answer-whyrated-didntrate' => '오늘 평가를 하지는 않았지만 이 기능에 대해 피드백을 남기고 싶어서',
	'articleassessment-survey-answer-whyrated-other' => '기타',
	'articleassessment-survey-question-useful' => '당신은 평가한 것이 유용하고 명확할 것이라 생각하십니까?',
	'articleassessment-survey-question-useful-iffalse' => '왜 그렇게 생각하십니까?',
	'articleassessment-survey-question-expert' => '당신은 이 문서가 다루고 있는 분야에 대해 전문가라고 생각하십니까?',
	'articleassessment-survey-question-expert-iftrue' => '당신의 전문 지식에 대해 설명해주실 수 있습니까?',
	'articleassessment-survey-question-comments' => '다른 의견이 있으십니까?',
	'articleassessment-survey-submit' => '제출',
	'articleassessment-survey-title' => '몇 가지 질문에 답해 주시기 바랍니다.',
	'articleassessment-survey-thanks' => '설문에 응해 주셔서 감사합니다.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Catrope
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
	'articleassessment-featurefeedback' => 'Gitt eis Äre <span class="feedbacklink">Feedback</span> vun dëser Fonctioun.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|Bewäertung|Bewäertungen}})',
	'articleassessment-stalemessage-norevisioncount' => "Dësen Artikel gouf zënter datt Dir e fir d'lescht nogekuckt hutt ''verännert''.
Et kéint sinn datt dir en nei bewäerte wëllt.",
	'articleassessment-results-show' => '(D\'Resultater si verstopp. Resultater <span class="showlink">weisen</span>.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Resultater verstoppen</span>)',
	'articleassessment-survey-question-whyrated' => 'Sot eis w.e.g. firwat datt Dir dës säit bewäert hutt (klickt alles u wat zoutrëfft):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Ech wollt zur allgemenger Bewäertung vun der Säit bedroen',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Ech wollt mech un {{SITENAME}} bedeelegen',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Ech deele meng Meenung gäre mat',
	'articleassessment-survey-answer-whyrated-other' => 'Anerer',
	'articleassessment-survey-question-useful' => "Mengt Dir datt d'Bewäertungen hei nëtzlech a kloer sinn?",
	'articleassessment-survey-question-useful-iffalse' => 'Firwat?',
	'articleassessment-survey-question-expert' => 'Betruecht Dir Iech selwer als Expert am Gebitt dat op dëser Säit behandelt gëtt?',
	'articleassessment-survey-question-comments' => 'Hutt Dir nach aner Bemierkungen?',
	'articleassessment-survey-submit' => 'Späicheren',
	'articleassessment-survey-title' => 'Beäntwert w.e.g. e puer Froen',
	'articleassessment-survey-thanks' => 'Merci datt Dir eis Ëmfro ausgefëllt hutt.',
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 */
$messages['li'] = array(
	'articleassessment' => 'Paginabeoordeiling',
	'articleassessment-desc' => 'Paginabeoordeiling (tesversie)',
	'articleassessment-yourfeedback' => 'Diene feedback',
	'articleassessment-pleaserate' => "Gaef e.t.b. 'n beoordeiling van dees pagina.",
	'articleassessment-submit' => 'Slaon óp',
	'articleassessment-rating-wellsourced' => 'Good van brónne veurzeen:',
	'articleassessment-rating-neutrality' => 'Neutraal:',
	'articleassessment-rating-completeness' => 'Compleet:',
	'articleassessment-rating-readability' => 'Laesber:',
	'articleassessment-rating-wellsourced-tooltip' => 'Vinjs se det dees pagina zat brónne haet en det de brónne betroewber zeen?',
	'articleassessment-rating-neutrality-tooltip' => "Vinjs se det dees pagina 'n ieërlike waergaaf is van alle invalsheuk veur dit óngerwerp?",
	'articleassessment-rating-completeness-tooltip' => 'Vinjs se det dees pagina de essentie van dit óngerwerp bestriek?',
	'articleassessment-rating-readability-tooltip' => "Vinjs se det dees pagina 'ne krekten ópboew haet en good is gesjreve?",
	'articleassessment-articlerating' => 'Paginawaardering',
	'articleassessment-survey-answer-whyrated-other' => 'Anges',
	'articleassessment-survey-question-useful-iffalse' => 'Wróm?',
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

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'articleassessment' => 'ലേഖനത്തിന്റെ മൂല്യനിർണ്ണയം',
	'articleassessment-desc' => 'ലേഖനത്തിന്റെ മൂല്യനിർണ്ണയം (പ്രാരംഭ പതിപ്പ്)',
	'articleassessment-yourfeedback' => 'താങ്കളുടെ അഭിപ്രായങ്ങൾ',
	'articleassessment-pleaserate' => 'താഴെ ഈ താളിന്റെ മൂല്യനിർണ്ണയം നടത്താൻ ഒരു നിമിഷം ചിലവാക്കുക.',
	'articleassessment-submit' => 'സമർപ്പിക്കുക',
	'articleassessment-rating-wellsourced' => 'സ്രോതസ്സധിഷ്ഠിതം:',
	'articleassessment-rating-neutrality' => 'നിഷ്പക്ഷം:',
	'articleassessment-rating-completeness' => 'സമ്പൂർണ്ണം:',
	'articleassessment-rating-readability' => 'വായനായോഗ്യം:',
	'articleassessment-rating-wellsourced-tooltip' => 'ഈ താളിൽ വിശ്വസനീയങ്ങളായ സ്രോതസ്സുകളെ ആശ്രയിക്കുന്ന ആവശ്യമായത്ര അവലംബങ്ങൾ ഉണ്ടെന്ന് താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articleassessment-rating-neutrality-tooltip' => 'ഈ താളിൽ വിഷയത്തിന്റെ എല്ലാ വശത്തിനും അർഹമായ പ്രാതിനിധ്യം ലഭിച്ചതായി താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articleassessment-rating-completeness-tooltip' => 'ഈ താൾ അത് ഉൾക്കൊള്ളേണ്ട എല്ലാ മേഖലകളും ഉൾക്കൊള്ളുന്നതായി താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articleassessment-rating-readability-tooltip' => 'ഈ താൾ നന്നായി ക്രമീകരിക്കപ്പെട്ടതും നന്നായി എഴുതപ്പെട്ടതുമാണെന്ന് താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articleassessment-articlerating' => 'താളിന്റെ നിലവാരം',
	'articleassessment-error' => 'എന്തോ പിഴവുണ്ടായിരിക്കുന്നു.
ദയവായി വീണ്ടും ശ്രമിക്കുക.',
	'articleassessment-thanks' => 'നന്ദി! താങ്കൾ നടത്തിയ മൂല്യനിർണ്ണയം സേവ് ചെയ്തിരിക്കുന്നു.',
	'articleassessment-featurefeedback' => 'ഈ സൗകര്യത്തെക്കുറിച്ചുള്ള <span class="feedbacklink">അഭിപ്രായങ്ങൾ</span> അറിയിക്കുക.',
	'articleassessment-noratings' => '$1 ({{PLURAL:$2|ഒരു നിലവാരമിടൽ|$2 നിലവാരമിടലുകൾ}})',
	'articleassessment-stalemessage-norevisioncount' => "താങ്കൾ നിലവാരമിട്ട ശേഷം ഈ താൾ ''മെച്ചപ്പെടുത്തിയിരിക്കുന്നു''
ആവശ്യമെങ്കിൽ താങ്കൾക്ക് വീണ്ടും നിലവാരമിടാവുന്നതാണ്.",
	'articleassessment-results-show' => '(ഫലങ്ങൾ ദൃശ്യമല്ല. അവ <span class="showlink">പ്രദർശിപ്പിക്കുക</span>.)',
	'articleassessment-results-hide' => '(<span class="hidelink">ഫലങ്ങൾ മറയ്ക്കുക</span>)',
	'articleassessment-survey-question-whyrated' => 'ഈ താളിന് താങ്കൾ ഇന്ന് നിലവാരമിട്ടതെന്തുകൊണ്ടാണെന്ന് ദയവായി പറയാമോ (ബാധകമാകുന്ന എല്ലാം തിരഞ്ഞെടുക്കുക):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'താളിൽ ആകപ്പാടെയുള്ള നിലവാര നിർണ്ണയം ചെയ്യാൻ ഞാനാഗ്രഹിക്കുന്നു',
	'articleassessment-survey-answer-whyrated-development' => 'ഞാനിട്ട നിലവാരം താളിന്റെ വികസനത്തിൽ ക്രിയാത്മകമായ ഫലങ്ങൾ സൃഷ്ടിക്കുമെന്ന് കരുതുന്നു',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'ഞാൻ {{SITENAME}} സംരംഭത്തിൽ സംഭാവന ചെയ്യാൻ ആഗ്രഹിക്കുന്നു',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'എന്റെ അഭിപ്രായം പങ്ക് വെയ്ക്കുന്നതിൽ സന്തോഷമേയുള്ളു',
	'articleassessment-survey-answer-whyrated-didntrate' => 'ഞാനിന്ന് നിലവാരനിർണ്ണയം നടത്തിയിട്ടില്ല, പക്ഷേ ഈ സൗകര്യം സംബന്ധിച്ച അഭിപ്രായം അറിയിക്കാൻ ആഗ്രഹിക്കുന്നു',
	'articleassessment-survey-answer-whyrated-other' => 'മറ്റുള്ളവ',
	'articleassessment-survey-question-useful' => 'നൽകിയിരിക്കുന്ന നിലവാരം ഉപകാരപ്രദവും വ്യക്തവുമാണെന്ന് താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articleassessment-survey-question-useful-iffalse' => 'എന്തുകൊണ്ട്?',
	'articleassessment-survey-question-expert' => 'ഈ താളിലെ വിഷയത്തിൽ താങ്കൾ വിദഗ്ദ്ധനാണെന്ന് താങ്കൾ സ്വയം കരുതുന്നുണ്ടോ?',
	'articleassessment-survey-question-expert-iftrue' => 'താങ്കളുടെ വൈദഗ്ദ്ധ്യം വിവരിക്കാമോ?',
	'articleassessment-survey-question-comments' => 'താങ്കൾക്ക് മറ്റെന്തെങ്കിലും അഭിപ്രായങ്ങൾ പങ്ക് വെയ്ക്കാനുണ്ടോ?',
	'articleassessment-survey-submit' => 'സമർപ്പിക്കുക',
	'articleassessment-survey-title' => 'ദയവായി ഏതാനം ചോദ്യങ്ങൾക്ക് ഉത്തരം നൽകുക',
	'articleassessment-survey-thanks' => 'സർവേ പൂരിപ്പിച്ചതിനു നന്ദി',
);

/** Malay (Bahasa Melayu)
 * @author Aviator
 */
$messages['ms'] = array(
	'articleassessment' => 'Pentaksiran rencana',
	'articleassessment-desc' => 'Pentaksiran rencana (versi percubaan)',
	'articleassessment-yourfeedback' => 'Maklum balas anda',
	'articleassessment-pleaserate' => 'Sila luangkan masa untuk menilai laman ini di bawah.',
	'articleassessment-submit' => 'Serah',
	'articleassessment-rating-wellsourced' => 'Bersumber:',
	'articleassessment-rating-neutrality' => 'Neutral:',
	'articleassessment-rating-completeness' => 'Lengkap:',
	'articleassessment-rating-readability' => 'Mudah dibaca:',
	'articleassessment-rating-wellsourced-tooltip' => 'Adakah laman ini mempunyai pemetikan-pemetikan yang cukup dan diambil daripada sumber-sumber yang boleh dipercayai?',
	'articleassessment-rating-readability-tooltip' => 'Adakah laman ini teratur dan ditulis dengan baik?',
	'articleassessment-articlerating' => 'Penilaian laman',
	'articleassessment-error' => 'Berlaku ralat. Sila cuba lagi lain kali.',
	'articleassessment-thanks' => 'Terima kasih! Penilaian anda telah disimpan.',
	'articleassessment-featurefeedback' => 'Beri kami <span class="feedbacklink">maklum balas</span> mengenai ciri ini.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|penilaian|penilaian}})',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'articleassessment-survey-answer-whyrated-other' => 'Лия',
	'articleassessment-survey-question-useful-iffalse' => 'Мезекс?',
	'articleassessment-survey-submit' => 'Максомс',
);

/** Dutch (Nederlands)
 * @author Catrope
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
	'articleassessment-featurefeedback' => 'Geef ons <span class="feedbacklink">terugkoppeling</span> over deze functie.',
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

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'articleassessment' => 'Artikkelvurdering',
	'articleassessment-desc' => 'Artikkelvurdering (pilotversjon)',
	'articleassessment-yourfeedback' => 'Din tilbakemelding',
	'articleassessment-pleaserate' => 'Vennligst ta deg tid til å vurdere denne siden nedenfor.',
	'articleassessment-submit' => 'Send',
	'articleassessment-rating-wellsourced' => 'Gode kildehenvisninger:',
	'articleassessment-rating-neutrality' => 'Nøytral:',
	'articleassessment-rating-completeness' => 'Komplett:',
	'articleassessment-rating-readability' => 'Lesbar:',
	'articleassessment-rating-wellsourced-tooltip' => 'Føler du at denne siden har tilstrekkelig med siteringer og at disse siteringene kommer fra pålitelige kilder?',
	'articleassessment-rating-neutrality-tooltip' => 'Føler du at denne siden viser en rettferdig representasjon av alle perspektiv på problemet?',
	'articleassessment-rating-completeness-tooltip' => 'Føler du at denne siden dekker de grunnleggende emneområdene som det burde?',
	'articleassessment-rating-readability-tooltip' => 'Føler du at denne siden er godt organisert og godt skrevet?',
	'articleassessment-articlerating' => 'Sidevurdering',
	'articleassessment-error' => 'En feil har oppstått.
Prøv igjen senere.',
	'articleassessment-thanks' => 'Takk! Din vurdering har blitt lagret.',
	'articleassessment-featurefeedback' => 'Gi oss <span class="feedbacklink">tilbakemelding</span> på denne funksjonen.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|vurdering|vurderinger}})',
	'articleassessment-stalemessage-norevisioncount' => "Denne siden har blitt ''revidert'' siden du siste vurderte den.
Du vil kanskje vurdere den på nytt.",
	'articleassessment-results-show' => '(Resultat skjult. <span class="showlink">Vis</span> dem.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Skjul resultat</span>)',
	'articleassessment-survey-question-whyrated' => 'Gi oss beskjed om hvorfor du vurderte denne siden idag (huk av alle som passer):',
	'articleassessment-survey-answer-whyrated-contribute-rating' => 'Jeg ønsket å bidra til den generelle vurderingen av denne siden',
	'articleassessment-survey-answer-whyrated-development' => 'Jeg håper at min vurdering vil påvirke utviklingen av siden positivt',
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Jeg ønsket å bidra til {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Jeg liker å dele min mening',
	'articleassessment-survey-answer-whyrated-didntrate' => 'Jeg ga ingen vurderinger idag, men ønsket å gi tilbakemelding på denne funksjonen',
	'articleassessment-survey-answer-whyrated-other' => 'Annet',
	'articleassessment-survey-question-useful' => 'Tror du at vurderingene som blir gitt er nyttige og klare?',
	'articleassessment-survey-question-useful-iffalse' => 'Hvorfor?',
	'articleassessment-survey-question-expert' => 'Anser du degselv for å være en ekspert på feltet som denne siden dekker?',
	'articleassessment-survey-question-expert-iftrue' => 'Kan du beskrive din ekspertise?',
	'articleassessment-survey-question-comments' => 'Har du noen ytterligere kommentarer?',
	'articleassessment-survey-submit' => 'Send',
	'articleassessment-survey-title' => 'Svar på noen få spørsmål',
	'articleassessment-survey-thanks' => 'Takk for at du fylte ut undersøkelsen.',
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
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'articleassessment' => "Valutassion ëd j'artìcoj",
	'articleassessment-desc' => "Version pilòta dla valutassion ëd j'artìcoj",
	'articleassessment-yourfeedback' => 'Sò coment',
	'articleassessment-pleaserate' => "Për piasì, ch'a dédica un moment për valuté la pàgina sì-sota.",
	'articleassessment-submit' => 'Spediss',
	'articleassessment-rating-wellsourced' => 'Con dle bon-e sorgiss:',
	'articleassessment-rating-neutrality' => 'Neutral:',
	'articleassessment-rating-completeness' => 'Completa:',
	'articleassessment-rating-readability' => 'Lesìbil:',
	'articleassessment-rating-wellsourced-tooltip' => "Pens-lo che st'artìcol a l'abia a basta ëd citassion e che ste citassion a rivo da 'd sorgiss fidà?",
	'articleassessment-rating-neutrality-tooltip' => 'Pens-lo che sta pàgina a smon-a na giusta rapresentassion ëd tuti ij pont ëd vista dla chestion?',
	'articleassessment-rating-completeness-tooltip' => "Pens-lo che sta pàgina a coata ij tema essensiaj ëd l'argoment com a dovrìa?",
	'articleassessment-rating-readability-tooltip' => 'Pens-lo che sta pàgina a sia bin organisà e bin scrivùa?',
	'articleassessment-articlerating' => 'Valutassion ëd la pàgina',
	'articleassessment-error' => "A l'é capitaje n'eror.
Për piasì, ch'a preuva torna pi tard.",
	'articleassessment-thanks' => 'Mersì! Toe valutassion a son ëstàite salvà.',
	'articleassessment-featurefeedback' => 'Ch\'an manda dij <span class="feedbacklink">coment</span> a propòsit ëd costa fonsionalità.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|valutassion|valutassion}})',
	'articleassessment-stalemessage-norevisioncount' => "Sta pàgina a l'é stàita ''revisionà'' da quand ch'a l'ha revisionala chiel.
A podrìa vorèj valutela torna.",
	'articleassessment-results-show' => '(Arzultà stërmà. <span class="showlink">Smonje</span>.)',
	'articleassessment-results-hide' => '(<span class="hidelink">Stërmé j\'arzultà</span>)',
	'articleassessment-survey-question-whyrated' => "Për piasì, ch'an fasa savèj përchè a l'ha valutà costa pàgina ancheuj (ch'a marca tut lòn ch'a-i intra):",
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
 * @author Catrope
 * @author MaxSem
 * @author Александр Сигачёв
 * @author Сrower
 */
$messages['ru'] = array(
	'articleassessment' => 'Оценка статьи',
	'articleassessment-desc' => 'Оценка статьи (экспериментальный вариант)',
	'articleassessment-yourfeedback' => 'Ваш отзыв',
	'articleassessment-pleaserate' => 'Пожалуйста, уделите минуту, чтобы оценить данную статью.',
	'articleassessment-submit' => 'Отправить',
	'articleassessment-rating-wellsourced' => 'Источники:',
	'articleassessment-rating-neutrality' => 'Нейтральность:',
	'articleassessment-rating-completeness' => 'Полнота:',
	'articleassessment-rating-readability' => 'Читаемость:',
	'articleassessment-rating-wellsourced-tooltip' => 'Считаете ли вы, что на этой странице достаточно ссылок на источники, что источники являются достоверными?',
	'articleassessment-rating-neutrality-tooltip' => 'Считаете ли вы, что эта страница объективно отражает все точки зрения по данной теме?',
	'articleassessment-rating-completeness-tooltip' => 'Считаете ли вы, что эта страница в достаточной мере раскрывает основные вопросы темы?',
	'articleassessment-rating-readability-tooltip' => 'Считаете ли вы, что эта страница хорошо организована и хорошо написана?',
	'articleassessment-articlerating' => 'Рейтинг страницы',
	'articleassessment-error' => 'Произошла ошибка. 
Пожалуйста, повторите попытку позже.',
	'articleassessment-thanks' => 'Спасибо! Ваши оценки сохранены.',
	'articleassessment-featurefeedback' => 'Сообщите <span class="feedbacklink">ваше мнение</span> об этой функции.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|оценка|оценки|оценок}})',
	'articleassessment-stalemessage-norevisioncount' => 'Эта страница редактировалась после Вашего просмотра. 
Вы можете оценить её еще раз.',
	'articleassessment-results-show' => '(Результаты скрыты. <span class="showlink">Показать</span>.)',
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
	'articleassessment-survey-question-expert-iftrue' => 'Вы не могли бы высказать экспертную оценку?',
	'articleassessment-survey-question-comments' => 'Есть ли у вас какие-либо дополнительные замечания?',
	'articleassessment-survey-submit' => 'Отправить',
	'articleassessment-survey-title' => 'Пожалуйста, ответьте на несколько вопросов',
	'articleassessment-survey-thanks' => 'Спасибо за участие в опросе.',
);

/** Yakut (Саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'articleassessment' => 'Ыстатыйаны сыаналааһын',
	'articleassessment-desc' => 'Ыстатыйаны сыаналааһын (тургутуллар барыла)',
	'articleassessment-yourfeedback' => 'Эн санааҥ',
	'articleassessment-pleaserate' => 'Бука диэн, сынньана таарыйа, бу ыстатыйаны сыаналаа эрэ',
	'articleassessment-submit' => 'Ыытарга',
	'articleassessment-rating-wellsourced' => 'Источниктар:',
	'articleassessment-rating-neutrality' => 'Тэҥ сыһыан:',
	'articleassessment-rating-completeness' => 'Толорута:',
	'articleassessment-rating-readability' => 'Ааҕыллыыта:',
	'articleassessment-rating-wellsourced-tooltip' => 'Бу сирэйгэ баар билии источниктара төһө толору бэриллибиттэрий уонна онтуктара төһө бигэлэрий?',
	'articleassessment-rating-neutrality-tooltip' => 'Бу сирэй бу тиэмэҕэ баар туох баар санаалары барыларын тэҥҥэ биэрбит дуо?',
	'articleassessment-rating-completeness-tooltip' => 'Бу тиэмэ сүрүн суолталара ыстатыйаҕа толору арыллыбыттар дуо?',
	'articleassessment-rating-readability-tooltip' => 'Бу сирэй сөпкө аттарыллан, бэркэ суруллубут дии саныыгын дуо?',
	'articleassessment-articlerating' => 'Сирэйи сыаналааһын',
	'articleassessment-error' => 'Алҕас таҕыста.
Бука диэн хойутуу хос боруобалаар.',
	'articleassessment-thanks' => 'Махтал! Сыанабылыҥ бигэргэтилиннэ.',
	'articleassessment-featurefeedback' => 'Бу туһунан <span class="feedbacklink">бэйэҥ санааҕын</span> эт эрэ.',
	'articleassessment-noratings' => '$1 ($2 {{PLURAL:$2|сыанабыл|ахсааннаах сыанабыл}})',
);

/** Tamil (தமிழ்)
 * @author TRYPPN
 */
$messages['ta'] = array(
	'articleassessment-submit' => 'சமர்ப்பி',
	'articleassessment-rating-neutrality' => 'நடுநிலையானது:',
	'articleassessment-rating-completeness' => 'முழுதும்:',
	'articleassessment-rating-readability' => 'படிக்கக்கூடியது:',
	'articleassessment-survey-answer-whyrated-other' => 'மற்றவை',
	'articleassessment-survey-question-useful-iffalse' => 'ஏன் ?',
	'articleassessment-survey-submit' => 'சமர்ப்பி',
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

/** Turkish (Türkçe)
 * @author CnkALTDS
 */
$messages['tr'] = array(
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Fikirlerimi paylaşmayı seviyorum',
	'articleassessment-survey-question-useful-iffalse' => 'Neden?',
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
	'articleassessment-survey-answer-whyrated-contribute-wiki' => 'Tôi muốn đóng góp vào {{SITENAME}}',
	'articleassessment-survey-answer-whyrated-sharing-opinion' => 'Tôi thích đưa ý kiến của tôi',
	'articleassessment-survey-answer-whyrated-other' => 'Khác',
	'articleassessment-survey-question-useful-iffalse' => 'Tạo sao?',
	'articleassessment-survey-title' => 'Xin vui lòng trả lời một số câu hỏi',
);

