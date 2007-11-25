<?php
/**
 * Internationalisation file for Review extension.
 *
 * @addtogroup Extensions
*/

$messages = array();

$messages['en'] = array(
	'review_sidebar_title' => "Review",
	'review_topics' => "# The following is the list of topics and ranges for the review extension.
# Each topic is defined by a line of five values, separated by ':' (all other lines are ignored).
# The order is: numerical key (>0), name, max range (>1; 2=yes/no), meaning of lowest value (e.g., 'bad'), meaning of highest value (e.g., 'good').
1:Quality:5:bad:good
2:Ready for 1.0:2:no:yes",
	'review_topic_page' => "Review topics",
	'review_sidebar_explanation' => "The leftmost checkbox always means 'no opinion'.",
	'review_save' => "Store review",
	'review_your_review' => "Your review of this page/revision:",
	'review_sidebar_you_have_other_reviews_for_this_article' => "You have already reviewed other versions of this article. Your other ratings will be merged into this one where you selected 'no opinion'.",
	'review_page_link' => "review statistics",
	'review_sidebar_final' => "For review data of this page view, see its $1",
	'review_for_page' => "Review for page \"$1\"",
	'review_for_user' => "Review for user \"$1\"",
	'review_error' => "Something's wrong!",
	'review_no_reviews_for_page' => "There are currently no reviews for \"$1\".",
	'review_total_statistics' => "Total",
	'review_statistics_left_corner' => "Revision",
	'review_version_link' => "Revision #$1",
	'review_statistic_cell' => "Average: $1 of $2<br />($4 users, $5 anons)",
	'review_version_statistic_cell' => "$1 of $2",
	'review_version_reviews_link' => "<small>(version reviews)</small>",
	'review_concerns_page' => "This review is about the page \"$1\".",
	'review_concerns_user' => "This is about reviews by user \"$1\".",
	'review_user_reviews' => "<small>(reviews by this user)</small>",
	'review_user_page_list' => "The user reviewed the following pages:",
	'review_user_details_link' => "(details)",
	'review_do_merge' => "Merge my reviews of other revisions of this page into this one",
	'review_has_been_stored' => "<font id='review_has_been_stored'>Your review has been stored!</font>",
	'revision_review_this_page_version_link' => "Review this version of the page.",
	'review_page_review' => "Review of page \"$1\"",
	'review_blocked' => "You're blocked, go away.",
	'review_wrong_namespace' => "Pages in this namespace cannot be reviewed!",
	'review_topic' => "Topic",
	'review_no_opinion' => "No opinion",
	'review_rating' => "Rating",
	'review_comment' => "Comment",
);

$messages['ar'] = array(
	'review_sidebar_title' => 'مراجعة',
	'review_topics' => '# التالي هو قائمة المواضيع والنطاقات لامتداد المراجعة.
# كل موضوع معرف بواسطة سطر من خمس قيم، مفصولة بواسطة \':\' (كل السطور الأخرى سيتم تجاهلها).
# الترتيب هو: مفتاح رقمي (>0)، اسم، أقصى نطاق (>1؛ 2=نعم/لا)، معنى أقل قيمة (مثال، \'سيء\')، معنى أعلى قيمة (مثال، \'جيد\').
1:الجودة:5:سيء:جيد
2:مستعد ل 1.0:2:لا:نعم',
	'review_topic_page' => 'مراجعة المواضيع',
	'review_sidebar_explanation' => 'الصندوق في أقصى اليسار دائما يعني \'لا رأي\'.',
	'review_save' => 'خزن المراجعة',
	'review_your_review' => 'مراجعتك لهذه الصفحة/النسخة:',
	'review_sidebar_you_have_other_reviews_for_this_article' => 'لقد راجعت بالفعل نسخا أخرى من هذه المقالة. تقييماتك الأخرى ستدمج إلى هذه المراجعة حيث اخترت \'لا رأي\'.',
	'review_page_link' => 'مراجعة الإحصاءات',
	'review_sidebar_final' => 'لبيانات مراجعة رؤية هذه الصفحة، انظر $1',
	'review_for_page' => 'المراجعة للصفحة "$1"',
	'review_for_user' => 'المراجعة للمستخدم "$1"',
	'review_error' => 'هناك شيء ما خطأ!',
	'review_no_reviews_for_page' => 'لا توجد حاليا مراجعات ل"$1".',
	'review_total_statistics' => 'الإجمالي',
	'review_statistics_left_corner' => 'النسخة',
	'review_version_link' => 'النسخة #$1',
	'review_statistic_cell' => 'المتوسط: $1 من $2<br />($4 مستخدم، $5 مجهول)',
	'review_version_statistic_cell' => '$1 من $2',
	'review_version_reviews_link' => '<small>(مراجعات النسخة)</small>',
	'review_concerns_page' => 'هذه المراجعة هي حول الصفحة "$1".',
	'review_concerns_user' => 'هذا حول المراجعات بواسطة المستخدم "$1".',
	'review_user_reviews' => '<small>(المراجعات بواسطة هذا المستخدم)</small>',
	'review_user_page_list' => 'المستخدم راجع الصفحات التالية:',
	'review_user_details_link' => '(تفاصيل)',
	'review_do_merge' => 'ادمج مراجعاتي للنسخ الأخرى لهذه الصفحة إلى هذه المراجعة',
	'review_has_been_stored' => '<font id=\'review_has_been_stored\'>مراجعتك تم تخزينها!</font>',
	'revision_review_this_page_version_link' => 'مراجعة هذه النسخة من الصفحة.',
	'review_page_review' => 'مراجعة صفحة "$1"',
	'review_blocked' => 'أنت ممنوع، اذهب بعيدا.',
	'review_wrong_namespace' => 'الصفحات في هذا النطاق لا يمكن مراجعتها!',
	'review_topic' => 'الموضوع',
	'review_no_opinion' => 'لا رأي',
	'review_rating' => 'التقييم',
	'review_comment' => 'تعليق',
);

$messages['fr'] = array(
	'review_sidebar_title' => 'Révision',
	'review_topics' => '# Liste de sujets pour l\'extension « review » de MediaWiki.
# ....
# Chaque sujet est défini par une liste de données séparées par « : » (toute autre liste est ignorée).
# ....
# Les données dans l\'ordre sont :
## identifiant numérique (>0)
## nom
## étendue (>1)
## signification de la plus petite valeur (ex. « mauvais »)
## signification de la plus grande valeur (ex. « bon »)
# ....
# Par exemple, s\'il faut seulement choisir « non » ou « oui », l\'étendue vaut 2.
# Par exemple, s\'il faut choisir entre « médiocre », « mauvais », « à améliorer », « bien » ou « très bien », l\'étendue vaut 5.
# ....
1:Qualité:5:mauvais:bon
2:Prêt pour 1.0:2:non:oui',
	'review_topic_page' => 'Sujets à révision',
	'review_sidebar_explanation' => 'La boîte à cocher à la gauche toute signifie toujours « sans opinion ».',
	'review_your_review' => 'Votre révision de cette page ou révision :',
	'review_sidebar_you_have_other_reviews_for_this_article' => 'Vous avez déjà révisé les autres versions de cette page. Vos autres évaluations seront fusionnées avec celle-ci si vous avez sélectionné « sans opinion ».',
	'review_page_link' => 'Statistiques de révisions',
	'review_for_page' => 'Révision pour la page « $1 »',
	'review_for_user' => 'Révision pour contributeur « $1 »',
	'review_error' => 'Quelque chose est brisé.',
	'review_no_reviews_for_page' => 'Il n\'y a pas de révisions pour « $1 ».',
	'review_total_statistics' => 'Total',#identical but defined
	'review_statistics_left_corner' => 'Révision',
	'review_version_link' => 'Révision #$1',
	'review_statistic_cell' => 'Moyenne : $1 de $2<br/>(contributeurs : $4 inscrits, $5 anonymes)',
	'review_version_statistic_cell' => '$1 de $2',
	'review_version_reviews_link' => '<small>(révisions de version)</small>',
	'review_concerns_page' => 'Cete révision est à propos de la page « $1 ».',
	'review_concerns_user' => 'C\'est à propos des revisions faites par le contributeur « $1 ».',
	'review_user_reviews' => '<small>(révisions par ce contributeur)</small>',
	'review_user_page_list' => 'Le contributeur a révisé les pages suivantes :',
	'review_user_details_link' => '(détails)',
	'review_has_been_stored' => '<font id=\'review_has_been_stored\'>Votre révision a été sauvegardée.</font>',
	'revision_review_this_page_version_link' => 'Réviser cette version de la page',
	'review_page_review' => 'Révision de la page « $1 »',
	'review_blocked' => 'Vous êtes bloqué.',
	'review_wrong_namespace' => 'Les pages dans cet espace de nom ne peuvent être révisées.',
	'review_topic' => 'Sujet',
	'review_no_opinion' => 'Sans opinion',
	'review_rating' => 'Évaluation',
	'review_comment' => 'Commentaire',
);

$messages['hsb'] = array(
	'review_sidebar_title' => 'Přepruwować',
	'review_topics' => '# Deleka je lisćina temow a wobwodow za rozšěrjenje Review.
# Kóžda tema definuje so přez linku pjeć hódnotow wotdźělenych přez \':\' (wšě druhe linki ignoruja so).
# Porjad je: numeriski kluč (>0), mjeno, maksimalny wobwod (>1; 2=haj/ně), woznam najnišeje hódnoty (na př. \'špatny\'), woznam najwyšeje hódnoty (na př. \'dobry\').
1:Kajkosć:5:špatny:dobry
2:Hotowy za 1.0:2:ně:haj',
	'review_topic_page' => 'Temy přepruwować',
	'review_sidebar_explanation' => 'Lěwy kontrolowy kašćik přeco \'žane měnjenje\' woznamjenja.',
	'review_save' => 'Přepruwowanje składować',
	'review_your_review' => 'Waše přepruwowanje tuteje strony/wersije:',
	'review_sidebar_you_have_other_reviews_for_this_article' => 'Sy hižo druhe wersije tutoho nastawka přepruwował. Twoje druhe pohódnoćenja budu so z tutym zjednoćeć, hdźež sy \'žane měnjenje\' wubrał.',
	'review_page_link' => 'Statistiku přepruwować',
	'review_sidebar_final' => 'Za přepruwowanske daty tutoho napohlada strony, hlej jeho $1',
	'review_for_page' => 'Přepruwowanje za stronu "$1"',
	'review_for_user' => 'Přepruwowanje za wužiwarja "$1"',
	'review_error' => 'Je někajki zmylk!',
	'review_no_reviews_for_page' => 'Tuchwilu žane přepruwowanja za "$1" njejsu.',
	'review_total_statistics' => 'Dohromady',
	'review_statistics_left_corner' => 'Wersija',
	'review_version_link' => 'Wersija #$1',
	'review_statistic_cell' => 'Přerězk: $1 z $2<br />($4 {{PLURAL:$4|wužiwar|wužiwarjej|wužiwarjo|wužiwarjow}}, $5 {{PLURAL:$5|anonymny|anonymnej|anonymne|anonymnych}})',
	'review_version_statistic_cell' => '$1 z $2',
	'review_version_reviews_link' => '<small>(wersijowe přepruwowanja)</small>',
	'review_concerns_page' => 'Tute přepruwowanje je za stronu "$1".',
	'review_concerns_user' => 'To je wo přepruwowanjach wot wužiwarja "$1".',
	'review_user_reviews' => '<small>(přepruwowanja wot tutoho wužiwarja)</small>',
	'review_user_page_list' => 'Wužiwar je slědowace strony přepruwował:',
	'review_user_details_link' => '(podrobnosće)',
	'review_do_merge' => 'Moje přepruwowanja druhich wersijow tuteje strony z tutym zjednoćić',
	'review_has_been_stored' => '<font id=\'review_has_been_stored\'>Waše přepruwowanje je so składowało!</font>',
	'revision_review_this_page_version_link' => 'Přepruwuj tutu wersiju strony.',
	'review_page_review' => 'Přepruwowanje strony "$1"',
	'review_blocked' => 'Sy blokowany, dźi preč.',
	'review_wrong_namespace' => 'Strony w tutym mjenowym rumje njehodźa so přepruwować!',
	'review_topic' => 'Tema',
	'review_no_opinion' => 'Žane měnjenje',
	'review_rating' => 'Pohódnoćenje',
	'review_comment' => 'Komentar',
);

$messages['nl'] = array(
	'review_sidebar_title' => 'Beoordelen',
	'review_topics' => '# The following is the list of topics and ranges for the review extension.
# Each topic is defined by a line of five values, separated by \':\' (all other lines are ignored).
# The order is: numerical key (>0), name, max range (>1; 2=yes/no), meaning of lowest value (e.g., \'bad\'), meaning of highest value (e.g., \'good\').
1:Kwaliteit:5:slecht:goed
2:Klaar voor 1.0:2:nee:ja',
	'review_topic_page' => 'Onderwerpen beoordelen',
	'review_sidebar_explanation' => 'Het meest linkse vakje betekent altijd \'geen mening\'.',
	'review_save' => 'Beoordeling opslaan',
	'review_your_review' => 'Uw beoordeling van deze pagina/versie:',
	'review_sidebar_you_have_other_reviews_for_this_article' => 'U heeft al een beoordeling gedaan voor andere versies van deze pagina. Uw andere waarderingen worden samengevoegd met deze waar u \'geen mening\' heeft opgegeven.',
	'review_page_link' => 'beoordelingsstatistieken',
	'review_sidebar_final' => 'Zie $1 voor beoordelingsgegevens van deze pagina',
	'review_for_page' => 'Beoordeling voor pagina "$1"',
	'review_for_user' => 'Beoordeling voor gebruiker "$1"',
	'review_error' => 'Er is iets niet in orde!',
	'review_no_reviews_for_page' => 'Er zijn op dit moment geen beoordelingen voor "$1".',
	'review_total_statistics' => 'Totaal',
	'review_statistics_left_corner' => 'Versie',
	'review_version_link' => 'Versie #$1',
	'review_statistic_cell' => 'Gemiddelde: $1 van $2<br />($4 gebruikers, $5 anomienen)',
	'review_version_statistic_cell' => '$1 van $2',
	'review_version_reviews_link' => '<small>(versiebeoordelingen)</small>',
	'review_concerns_page' => 'Deze beoordeling gaat over de pagina "$1".',
	'review_concerns_user' => 'Dit gaat over beoordelingen van gebruiker "$1".',
	'review_user_reviews' => '<small>(beoordelingen van deze gebruiker)</small>',
	'review_user_page_list' => 'De gebruiker beoordeelde de volgende pagina\'s:',
	'review_user_details_link' => '(details)',#identical but defined
	'review_do_merge' => 'Mijn beoordelingen van andere versies van deze pagina met deze versie samenvoegen',
	'review_has_been_stored' => '<font id=\'review_has_been_stored\'>Uw beoordeling is opgeslagen!</font>',
	'revision_review_this_page_version_link' => 'Deze versie van de pagina beoordelen.',
	'review_page_review' => 'Beoordeling van pagina "$1"',
	'review_blocked' => 'U bent geblokkeerd. Ga weg.',
	'review_wrong_namespace' => 'Pagina\'s in deze naamruimte kunnen niet beoordeeld worden!',
	'review_topic' => 'Onderwerp',
	'review_no_opinion' => 'Geen mening',
	'review_rating' => 'Waardering',
	'review_comment' => 'Opmerking',
);
