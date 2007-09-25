<?php
/**
 * Internationalisation file for BoardVote extension.
 *
 * @addtogroup Extensions
*/

$wgBoardVoteMessages = array();

$wgBoardVoteMessages['en'] = array(
	'boardvote'               => "Wikimedia Board of Trustees election",
	'boardvote_entry'         => "* [[Special:Boardvote/vote|Vote]]
* [[Special:Boardvote/list|List votes to date]]
* [[Special:Boardvote/dump|Dump encrypted election record]]",
	'boardvote_intro'         => "
<p>Welcome to the second elections for the Wikimedia Board of Trustees. We are
voting for two people to represent the community of users on the various
Wikimedia projects. They will help to determine the future direction
that the Wikimedia projects will take, individually and as a group, and
represent <em>your</em> interests and concerns to the Board of Trustees. They will
decide on ways to generate income and the allocation of moneys raised.</p>

<p>Please read the candidates' statements and responses to queries carefully
before voting. Each of the candidates is a respected user, who has contributed
considerable time and effort to making these projects a welcoming environment
committed to the pursuit and free distribution of human knowledge.</p>

<p>You may vote for as many candidates as you want. The
candidate with the most votes in each position will be declared the winner of that
position. In the event of a tie, a run-off election will be held.</p>

<p>For more information, see:</p>
<ul><li><a href=\"http://meta.wikimedia.org/wiki/Election_FAQ_2006\" class=\"external\">Election FAQ</a></li>
<li><a href=\"http://meta.wikimedia.org/wiki/Election_Candidates_2006\" class=\"external\">Candidates</a></li></ul>
",
	'boardvote_intro_change'  => "<p>You have voted before. However you may change
your vote using the form below. Please check the boxes next to each candidate whom
you approve of.</p>",
	'boardvote_footer'        => "&nbsp;", # Don't translate this
	'boardvote_entered'       => "Thank you, your vote has been recorded.

If you wish, you may record the following details. Your voting record is:

<pre>$1</pre>

It has been encrypted with the public key of the Election Administrators:

<pre>$2</pre>

The resulting encrypted version follows. It will be displayed publicly on [[Special:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|Back]]",
	'boardvote_nosession'     => "I can't determine your Wikimedia user ID. Please log in to the wiki where you are qualified, and go to <nowiki>[[Special:Boardvote]]</nowiki>. You must use an account with at least $1 contributions before $2, and with a first edit before $3.",
	'boardvote_notloggedin'   => "You are not logged in. To vote, you must use an account with at least $1 contributions before $2, and with a first edit before $3.",
	'boardvote_notqualified'  => "You are not qualified to vote in this election. You need to have made $3 edits before $2, and your first edit must be before $5.",
	'boardvote_novotes'       => "Nobody has voted yet.",
	'boardvote_time'          => "Time",
	'boardvote_user'          => "User",
	'boardvote_edits'         => "Edits",
	'boardvote_days'          => "Days",
	'boardvote_ip'            => "IP",
	'boardvote_ua'            => "User agent",
	'boardvote_listintro'     => "<p>This is a list of all votes which have been recorded
to date. $1 for the encrypted data.</p>",
	'boardvote_dumplink'      => "Click here",
	'boardvote_submit'        => 'OK',
	'boardvote_strike'        => "Strike",
	'boardvote_unstrike'      => "Unstrike",
	'boardvote_needadmin'     => "Only election administrators can perform this operation.",
	'boardvote_sitenotice'    => "<a href=\"{{localurle:Special:Boardvote/vote}}\">Wikimedia Board Elections</a>:  Vote open until July 12",
	'boardvote_notstarted'    => 'Voting has not yet started',
	'boardvote_closed'        => 'Voting is now closed, see [http://meta.wikimedia.org/wiki/Elections_for_the_Board_of_Trustees_of_the_Wikimedia_Foundation%2C_2006/En the elections page for results] soon.',
	'boardvote_edits_many'    => 'many',
	'group-boardvote'         => 'Board vote admins',
	'group-boardvote-member'  => 'Board vote admin',
	'grouppage-boardvote'     => '{{ns:project}}:Board vote admin',
	'boardvote_blocked'       => 'Sorry, you have been blocked on your registered wiki. Blocked users are not allowed to vote.',
	'boardvote_welcome'       => "Welcome '''$1'''!",
	'go_to_board_vote'        => 'Wikimedia Board Elections 2007',
	'boardvote_redirecting'   => 'For improved security and transparency, we are running the vote on an
external, independently controlled server.

You will be redirected to this external server in 20 seconds. [$1 Click here] to go there now.

A security warning about an unsigned certificate may be displayed.',
);

/* Arabic (Meno25) */
$wgBoardVoteMessages['ar'] = array(
	'boardvote'               => 'انتخابات مجلس أمناء ويكيميديا',
	'boardvote_entry'         => '* [[Special:Boardvote/vote|صوّت]]
* [[Special:Boardvote/list|التصويت لغاية اليوم]]
* [[Special:Boardvote/dump|Dump encrypted election record]]',
	'boardvote_intro'         => '<p>مرحبا في الانتخابات الثانية لمجلس إدارة ويكيميديا. يتم التصويت على تمثيل مجتمع المساهمين في مشاريع ويكيميديا المختلفة بشخص واحد.هولاء سيقومون بتحديد التوجه المستقبلي لمشاريع ويكيميديا، بشكل شخصي أو بشكل مجموعة، و تمثيل <em>اهتماماتك</em>  و توصيلها لمجلس الإدارة. و سيقومون أيضا بتحديد كيفية جلب المال و أوجه إنفاقه.</p>

<p>من فضلك قم بقراءة كلمات المرشحين و ردودهم جيدا قبل التصويت.
 كل مستخدم منهم هو مستخدم جدير بالاحترام، بذل وقتا و جهدا كبيرا
لجعل هذه المشاريع مجتمع جيد يهدف إلى المشاركة و التوزيع الحر للمعرفة الإنسانية.</p>

<p>يمكنك التصويت للعدد الذي تريده من المرشحين. المستخدم الذي يحصل على
العدد الأكبر من الأصوات يفوز بالمنصب.
 في حالة التعادل، ستقام جولة إعادة.</p>

<p>من فضلك تذكر أنه لديك فقط صوت واحد.
 حتى لو كان عندك أكثر من 400 مشاركة على كذا مشروع، فهذا لا يعطيك الحق في التصويت مرتين. إذا أردت تغيير ترشيحك، قم بهذا عن طريق المشروع الذي صوت من خلاله.</p>

<p>لمعلومات أكثر، انظر:</p>
<ul>
<li><a href="http://meta.wikipedia.org/wiki/Election_FAQ_2006" class="external">أسئلة متكررة حول الانتخابات</a></li>
<li><a href="http://meta.wikipedia.org/wiki/Election_Candidates_2006" class="external">المرشحين</a></li>
</ul>',
	'boardvote_intro_change'  => '<p>لقد قمت بالتصويت من قبل. إذا أردت تغيير صوتك، من الممكن عمل ذلك من النموذج التالي. 
يرجى وضع إشارة في الصندوق بجانب المرشح الذي تود التصويت له.</p>',
	'boardvote_entered'       => 'شكرا لك، لقد تم اعتماد صوتك.

إذا كنت ترغب بحفظ المعلومات التالية، هي لسجل تصويتك:

<pre>$1</pre>
تم تشفيرها باستعمال مفتاح خاص بالمشرفين على الانتخابات:

<pre>$2</pre>

نتيجة التشفير تأتي في التالي، وسيتم حفظها وإظهارها في الصفحة [[Special:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|Back]]',
	'boardvote_nosession'     => 'لا يمكنني تحديد رقم المستخدم الخاص بك. من فضلك، ادخل للويكي الذي أنت مؤهل به و اذهب إلى<nowiki>[[Special:Boardvote]]</nowiki>. يجب أن تستخدم حسابا لديه على الأقل $1 مساهمة قبل $2، و المساهمة الأولى قبل $3',
	'boardvote_notloggedin'   => 'لم تقم بتسجيل الدخول. لكي تستطيع التصويت، يجب أن يكون لديك حساب و أجريت $1 تعديل قبل $2، و تكون مساهمتك الأولى قبل $3.',
	'boardvote_notqualified'  => 'أنت غير مؤهل للتصويت في هذه الانتخابات. يجب أن يكون لديك $3 مساهمة قبل $2، و مساهمتك الأولى يجب أن تكون قبل $5.',
	'boardvote_novotes'       => 'لم يقم أي شخص بالتصويت بعد.',
	'boardvote_time'          => 'الزمن',
	'boardvote_user'          => 'المستخدم',
	'boardvote_edits'         => 'التعديلات',
	'boardvote_days'          => 'الأيام',
	'boardvote_ip'            => 'الأيبي',
	'boardvote_ua'            => 'وسيط المستخدم',
	'boardvote_listintro'     => '<p>فيما يلي قائمة بكافة عمليات التصويت إلى هذه اللحظة. للبيانات المشفرة $1.</p>',
	'boardvote_dumplink'      => 'اضغط هنا',
	'boardvote_submit'        => 'موافق',
	'boardvote_strike'        => 'شطب',
	'boardvote_unstrike'      => 'احتساب',
	'boardvote_needadmin'     => 'فقط إداريو الانتخابات يمكنهم أن يقوموا بهذه العملية.',
	'boardvote_sitenotice'    => '<a href="{{localurle:Special:Boardvote/vote}}">انتخابات مجلس ويكيميديا</a>:  التصويت مفتوح حتى 12 يوليو',
	'boardvote_notstarted'    => 'لم يبدأ التصويت بعد',
	'boardvote_closed'        => 'تم غلق باب التصويت، انظر [http://meta.wikimedia.org/w/index.php?title=Election_results_2006/ar هذه الصفحة لمشاهدة النتائج]',
	'boardvote_edits_many'    => 'كثير',
	'group-boardvote'         => 'إداريو انتخابات المجلس',
	'group-boardvote-member'  => 'إداري انتخابات المجلس',
	'grouppage-boardvote'     => '{{ns:project}}:إداري انتخابات المجلس',
	'boardvote_blocked'       => 'عذرا، لقد تم منعك في الويكي الذي أنت مسجل به. المستخدمون الممنوعون غير مسموح لهم بالتصويت.',
	'boardvote_welcome'       => 'مرحبا \'\'\'$1\'\'\'!',
	'go_to_board_vote'        => 'انتخابات مجلس أمناء ويكيميديا 2007',
	'boardvote_redirecting'   => 'من أجل مزيد من السرية و الشفافية، ندير الانتخابات من خلال خادم خارجي مستقل.

سيتم تحويلك لهذا الخادم الخارجي خلال 20 ثانية. [$1 اضغط هنا] للذهاب هناك الآن.

قد يتم عرض تحذير للسرية حول شهادة غير موقعة.',
);
$wgBoardVoteMessages['bcl'] = array(
	'boardvote_novotes'       => 'Mayô pang naboto.',
	'boardvote_time'          => 'Oras',
	'boardvote_user'          => 'Parágamit',
	'boardvote_edits'         => 'Mga hira',
	'boardvote_days'          => 'Aldaw',
	'boardvote_dumplink'      => 'Lagatik digdi',
	'boardvote_notstarted'    => 'Dai pa napoon an pirilian',
	'boardvote_edits_many'    => 'dakol',
	'boardvote_blocked'       => 'Despensa, pigbágat ka sa pagrehistrohan mong wiki. An mga pigbágat na parágamit dai pigtotogotan na makaboto.',
	'boardvote_welcome'       => 'Dagos \'\'\'$1\'\'\'!',
);
$wgBoardVoteMessages['br'] = array(
	'boardvote_novotes'       => 'Den n\'eus votet c\'hoazh.',
	'boardvote_time'          => 'Eur',
	'boardvote_user'          => 'Implijer',
	'boardvote_edits'         => 'Degasadennoù',
);
$wgBoardVoteMessages['ca'] = array(
	'boardvote'               => 'Eleccions al Consell d\'Administració de la Fundació Wikimedia',
	'boardvote_redirecting'   => 'Per millorar la seguretat i la transparència de la votació, aquesta es farà en un servidor independent extern.

D\'aquí 20 segons sereu redirigit a aquesta pàgina. [$1 Cliqueu aquí] per anar-hi ara mateix.

Tingueu en compte que us pot aparèixer un avís de certificat de seguretat.',
);
$wgBoardVoteMessages['cs'] = array(
	'boardvote'               => "Volby do Správní rady nadace Wikimedia",
	'boardvote_entry'         => "* [[Special:Boardvote/vote|Hlasovat]]
* [[Special:Boardvote/list|Seznam již hlasujících]]
* [[Special:Boardvote/dump||Šifrovaný záznam hlasování]]",
	'boardvote_intro'         => '
<blockquote>
<p>Vítejte u čtvrtých voleb do Správní rady nadace Wikimedia. Hlasováním bude zvoleni tři zástupci komunity uživatelů všech projektů nadace na dvouleté období do Správní rady. Tito zástupci budou pomáhat v rozhodování o budoucím směru rozvoje projektů, jednotlivě i jako skupina, a budou reprezentovat <em>vaše</em> zájmy a ohledy ve Správní radě. Budou také rozhodovat o způsobech získávání finančních prostředků a využívání získaných peněz.</p>

<p>Před hlasováním si laskavě důkladně přečtěte vyjádření kandidátů a jejich odpovědi na dotazy. Všichni kandidáti jsou respektovanými uživateli, kteří přispěli velkým množstvím času a úsilí při snaze učinit z projektů přátelské prostředí cílené na shromažďování a volné šíření znalostí lidstva.</p>

<p>Můžete hlasovat pro libovolně mnoho kandidátů. Tři kandidáti, kteří bude mít nejvíce hlasů, bude do této pozice zvoleni. V případě shody bude pořádáno druhé kolo hlasování.</p>

<p>Pamatujte, že můžete hlasovat jen jednou. I pokud máte více než 400 editací na více projektech, tak to neznamená, že máte právo volit dvakrát. Pokud se později rozhodnete změnit své hlasy, učiňte tak na projektu, kde jste hlasování provedl(a) předtím.</p> 

<p>Další informace (anglicky a v dalších jazycích) najdete na následujících stránkách:</p> <ul><li><a href="http://meta.wikipedia.org/wiki/Board_elections/2007/FAQ" class="external">Často kladené otázky o hlasování</a></li> <li><a href="http://meta.wikipedia.org/wiki/Board_elections/2007/Candidates/cs" class="external">Kandidáti</a></li></ul>
</blockquote>',
	'boardvote_intro_change'  => "<p>Již jste hlasoval(a). Můžete však svůj hlas změnit prostřednictvím níže uvedeného formuláře. Zaškrtněte čtvereček u každého kandidáta, kterého schvalujete.</p>",
	'boardvote_entered'       => "Děkujeme vám, váš hlas byl zaznamenán.

Pokud si přejete, můžete si poznamenat podrobnosti. Váš záznam o hlasování je:

<pre>$1</pre>

Byl zašifrován s použitím veřejného klíče volebních úředníků:

<pre>$2</pre>

Výsledná šifrovaná podoba následuje. Bude veřejně dostupná na stránce [[Speciální:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|Zpět]]",
  'boardvote_nosession'     => "Nemohu určit vaše ID uživatele Wikimedie. Přihlaste se na wiki, kde splňujete podmínky a a přejděte na stránku <nowiki>[[Special:Boardvote]]</nowiki>. Musíte mít učet s alespoň $1 editacemi před $2 a první editací před $3.",
  'boardvote_notloggedin'   => 'Nejste přihlášen(a). Pro hlasování musíte použít účet s nejméně $1 příspěvky před $2 a první editací před $3.',
  'boardvote_notqualified'  => 'Litujeme, nejste oprávněn(a) hlasovat v těchto volbách. Musíte mít $3 editací před datem $2 a vaše první editace musí být provedena před $5.',
  'boardvote_notstarted'    => 'Volby ještě nezačaly.',
  'boardvote_novotes'       => 'Nikdo dosud nehlasoval.',
	'boardvote_time'          => "Datum a čas",
	'boardvote_user'          => "Uživatel",
	'boardvote_edits'         => "Editací",
	'boardvote_days'          => "Dní",
	'boardvote_ip'            => "IP",
	'boardvote_ua'            => "Klient",
	'boardvote_listintro'     => "<p>Toto je seznam všech dosud zaznamenaných hlasů. Také můžete získat $1.</p>",
	'boardvote_dumplink'      => "šifrovaný záznam hlasování",
	'boardvote_submit'        => 'OK',
	'boardvote_strike'        => "Zaškrtnout",
	'boardvote_unstrike'      => "Odškrtnout",
	'boardvote_needadmin'     => "Pouze volební správci mohou provést tuto operaci.",
	'boardvote_sitenotice'    => "<a href=\"{{localurle:Special:Boardvote/vote}}\">Volby do správní rady nadace Wikimedia</a>:",
	'boardvote_notstarted'    => 'Volby ještě nezačaly.',
	'boardvote_closed'        => 'Volby skončily. Podívejte se na [http://meta.wikimedia.org/wiki/Elections_for_the_Board_of_Trustees_of_the_Wikimedia_Foundation%2C_2006/Cs výsledky].',
	'boardvote_edits_many'    => 'mnoho',
	'group-boardvote'         => 'Volební správci',
	'group-boardvote-member'  => 'Volební správce',
	'grouppage-boardvote'     => '{{ns:project}}:Volební správce',
	'boardvote_blocked'       => 'Je nám líto, ale na své wiki jste zablokován. Zablokovaní uživatelé nemohou hlasovat.',
	'boardvote_welcome'       => "Vítáme uživatele '''$1'''!",
);
$wgBoardVoteMessages['de'] = array(
	'boardvote'               => "Wahlen zum Wikimedia-Kuratorium",
	'boardvote_entry'         => "* [[meta:Board elections/2007/Candidates/de|Kandidatenvorstellungen]]
* [[{{ns:special}}:Boardvote/vote|Abstimmen]]
* [[{{ns:special}}:Boardvote/list|Bislang abgegebene Stimmen]]
* [[{{ns:special}}:Boardvote/dump|Verschlüsselte Wahleinträge]]",
	'boardvote_intro'         => '<blockquote>
<p>
Willkommen zur vierten Wahl zum Wikimedia-Kuratorium, dem Verwaltungsorgan der Wikimedia-Foundation. Es werden drei Benutzer gewählt, um die Community der Wikimedianer in den verschiedenen Wikimedia-Projekten zu repräsentieren. Diese drei Benutzer werden für einen Zeitraum von zwei Jahren gewählt. Sie werden dabei helfen, die künftige Richtung der Wikimedia-Projekte festzulegen, einzeln und als Gruppe und sie repräsentieren <em>deine</em> Interessen und Belange. Sie werden neben vielen anderen Dingen über die Einnahmen und Ausgaben entscheiden.
</p>

<p>Vor deiner Wahl lies bitte die Kandidatenvorstellungen und ihre Antworten auf Fragen. Jeder Kandidat ist ein respektierter Benutzer, der bereits beträchtliche Zeit aufgewendet hat, um den Projekten ein positives Umfeld für die freie Verbreitung menschlichen Wissens zu verschaffen.</p>

<p>Du darfst für so viele Kandidaten stimmen wie du möchtest. Die drei Kandidaten mit den meisten Stimmen werden die Sieger sein. Gibt es ein Unentschieden, wird es eine Stichwahl geben.</p>

<p>Bitte beachte, dass du nur aus einem Projekt heraus wählen darfst. Auch wenn du jeweils mehr als 400 Bearbeitungen in mehreren Projekten hast, so berechtigt dies nicht zu einer Doppelabstimmung. Wenn du deine Stimmabgabe ändern möchtest, wähle bitte erneut von dem Projekt, in dem du bereits vorher abgestimmt hast.</p>

<p>Weitere Informationen:</p>
<ul><li><a href="http://meta.wikimedia.org/wiki/Board_elections/2007/FAQ/de" class="external">Election FAQ</a></li>
<li><a href="http://meta.wikimedia.org/wiki/Board_elections/2007/Candidates/de" class="external">Candidates</a></li></ul>
</blockquote>',
	'boardvote_intro_change'  => "<p>Du hast bereits abgestimmt. Jedoch kannst du deine Stimme(n) mit dem folgenden Formular ändern. Markiere dazu die Kästchen der Kandidaten, die du befürwortest.</p>",
	'boardvote_entered'       => "Danke, deine Stimme wurde gespeichert.

Wenn du möchtest, kannst du folgende Details festhalten. Deine Abstimmungsaufzeichnung ist:

<pre>$1</pre>

Diese wurde mit dem Public Key der Wahladministratoren verschlüsselt:

<pre>$2</pre>

Die daraus folgende, verschlüsselte Version folgt unten. Sie wird öffentlich auf [[{{ns:special}}:Boardvote/dump]] angezeigt.

<pre>$3</pre>

[[{{ns:special}}:Boardvote/entry|Zurück]]",
	'boardvote_nosession'     => "Deine Wikimedia-Benutzer-ID kann nicht ermittelt werden. Bitte melde dich in dem Wiki an, in dem du zur Wahl zugelassen bist und gehe dort nach <nowiki>[[Special:Boardvote]]</nowiki>. Wählen darf, dessen Benutzerkonto mindestens $1 Bearbeitungen vor dem $2 aufweist, die erste Bearbeitung muss vor dem $3 erfolgt sein.

Dein Browser muss so konfiguriert sein, dass er Cookies von dem externen Wahlcomputer <tt>wikimedia.spi-inc.org</tt> akzeptiert.",
	'boardvote_notloggedin'   => "Du bist nicht eingeloggt. Um abstimmen zu können, musst du eingeloggt sein und ein Benutzerkonto verwenden, mit dem bereits vor dem Stichtag ($2) mindestens $1 Bearbeitungen gemacht wurden.",
	'boardvote_notqualified'  => "Du bist nicht berechtigt an dieser Wahl teilzunehmen. Du musst $3 Bearbeitungen vor dem $2 getätigt haben und deine erste Bearbeitung muss vor dem $5 erfolgt sein. Alle Bedingungen müssen zur Wahlteilnahme erfüllt sein.",
	'boardvote_novotes'       => "Bislang hat noch keiner abgestimmt.",
	'boardvote_time'          => "Zeit",
	'boardvote_user'          => "Benutzer",
	'boardvote_edits'         => "Bearbeitungen",
	'boardvote_days'          => "Tage",
	'boardvote_ip'            => "IP",
	'boardvote_ua'            => "User-Agent",
	'boardvote_listintro'     => "<p>Dies ist eine Liste aller Stimmen, die bisher abgegeben wurden. $1 für die verschlüsselten Daten.</p>",
	'boardvote_dumplink'      => "Hier klicken",
	'boardvote_submit'        => 'Abstimmen',
	'boardvote_strike'        => "Stimme streichen",
	'boardvote_unstrike'      => "Stimmstreichung zurücknehmen",
	'boardvote_needadmin'     => "Nur Wahladministratoren können diese Aktion durchführen.",
	'boardvote_sitenotice'    => "<a href=\"{{localurle:Special:Boardvote/vote}}\">Wahlen zum Wikimedia-Kuratorium</a>:  ", # to be updated before the next election
	'boardvote_notstarted'    => 'Die Wahl hat noch nicht begonnen',
	'boardvote_closed'        => 'Die Wahl ist beendet. Das Ergebnis ist [http://meta.wikimedia.org/wiki/Election_results_2006/De im Meta-Wiki] einsehbar.', # to be updated before the next election
	'boardvote_edits_many'    => 'viele',
	'group-boardvote'         => 'Wahl-Administratoren',
	'group-boardvote-member'  => 'Wahl-Administrator',
	'grouppage-boardvote'     => '{{ns:project}}:Wahl-Administrator',
	'boardvote_blocked'       => 'Entschuldigung, aber du wurdest in deinem Wiki gesperrt. Gesperrten Benutzern ist es nicht erlaubt an der Wahl teilzunehmen.',
	'boardvote_welcome'       => "Willkommen '''$1'''!",
	'go_to_board_vote'        => 'Wahlen zum Wikimedia-Kuratorium 2007',
	'boardvote_redirecting'   => 'Um eine erhöhte Sicherung und Transparenz zu gewährleisten, findet die Wahl auf einem externen, unabhängig kontrollierten Server statt.

Du wirst in 20 Sekunden zu diesem externen Server weitergeleitet. [$1 klicke hier], um sofort dorthin zu gelangen.

Eine Sicherheitswarnung über ein unsigniertes Zertifikat kann angezeigt werden.',
);
$wgBoardVoteMessages['es'] = array(
	'boardvote_redirecting'   => 'Para mejorar la seguridad y la transparencia, la votación se está realizando en un servidor externo y controlado independientemente.

Serás redireccionado a este servidor externo en 20 segundos. [$1 Haz click aquí] para ir ahora.

Un aviso de seguridad sobre un certificado no cifrado podría aparacer.',
);
$wgBoardVoteMessages['fi'] = array(
	'boardvote_entry'         => '* [[Special:Boardvote/vote|Äänestä]]
* [[Special:Boardvote/list|Listaa tähänastiset äänet]]
* [[Special:Boardvote/dump|Salattu äänestystallenne]]',
	'boardvote_intro_change'  => '<p>Olet jo äänestänyt. Voit kuitenkin muuttaa ääntäsi käyttämällä alla olevaa lomaketta. Napsauta kunkin hyväksymäsi ehdokkaan vieressä olevaa ruutua.</p>',
	'boardvote_notloggedin'   => 'Et ole kirjautunut sisään. Äänestääksesi sinulla täytyy olla käyttäjätunnus, vähintään $1 muokkausta ennen $2 ja ensimmäisen muokkaus ennen $3.',
	'boardvote_notqualified'  => 'Et ole äänioikeutettu näissä vaaleissa. Sinulla täytyy olla $3 muokkausta ennen $2, ja ensimmäinen muokkauksesi pitää olla tehty ennen $5.',
	'boardvote_novotes'       => 'Kukaan ei ole vielä äänestänyt.',
	'boardvote_time'          => 'Aika',
	'boardvote_user'          => 'Käyttäjä',
	'boardvote_edits'         => 'Muokkausta',
	'boardvote_days'          => 'Päivää',
	'boardvote_ua'            => 'Käyttäjäagentti',
	'boardvote_listintro'     => '<p>Tämä on lista kaikista äänistä, jotka on kirjattu tähän mennessä. $1 nähdäksesi tiedot salattuna.</p>',
	'boardvote_dumplink'      => 'Napsauta tästä',
	'boardvote_notstarted'    => 'Äänestys ei ole vielä alkanut',
	'boardvote_edits_many'    => 'monta',
	'boardvote_welcome'       => 'Tervetuloa \'\'\'$1\'\'\'!',
);
$wgBoardVoteMessages['fr'] = array(
	'boardvote'               => "Élections au conseil d’administration de la Wikimedia Foundation",
	'boardvote_entry'         => "* [[Special:Boardvote/vote|Vote]]
* [[Special:Boardvote/list|Liste des votes enregistrés]]
* [[Special:Boardvote/dump|Enregistrements cryptés]]",
	'boardvote_intro'         => "
<p>Bienvenue aux troisièmes élections du conseil d'administration de <i><a href=\"http://wikimediafoundation.org/wiki/Accueil\" class=\"extiw\" title=\"foundation:Accueil\">Wikimedia Foundation Inc.</a></i>.
Nous votons pour une personne qui représentera la communauté des utilisateurs sur les différents projets Wikimedia.
Cette personne et le conseil d'administration contribueront à orienter la direction de ces projets et représenteront <i>vos</i> intérêts et préoccupations auprès du conseil d'administration.
Ils décideront des moyens de financement et de l'affectation des fonds.</p>

<p>Lisez attentivement les déclarations des candidats et leurs réponses aux questions avant de voter.
Tous les candidats sont des utilisateurs respectés, qui ont donné beaucoup de temps et d'effort pour faire de ces projets un endroit accueillant dédié au développement de la libre diffusion du savoir humain.</p>

<p>Vous pouvez voter pour autant de candidats que vous le souhaitez. Celui qui remportera le plus de voix sera déclaré élu pour le poste auquel il s'est présenté. En cas de ballotage, il y aura un vote de départage.</p>

<p>Pour plus d'information, voyez :</p>
<ul><li><a href=\"http://meta.wikimedia.org/wiki/Election_FAQ_2006/Fr\" class=\"extiw\" title=\"meta:Election_FAQ_2006/Fr\">FAQ sur les élections</a></li>
<li><a href=\"http://meta.wikimedia.org/wiki/Election_candidates_2006/Fr\" class=\"extiw\" title=\"meta:Election_candidates_2006/Fr\">Candidat-e-s</a></li></ul>
",
	'boardvote_intro_change'  => "<p>Vous avez déjà voté. Cependant vous pouvez modifier votre vote en utilisant le formulaire ci-dessous. Merci de cocher les cases en regard de chaque candidat qui a votre support.</p></p>",
	'boardvote_entered'       => "Merci, votre vote a été enregistré.

Si vous le souhaitez, vous pouvez enregistrer les détails suivants. Votre historique de vote est :

<pre>$1</pre>

Il a été crypté avec la clé publique des scrutateurs officiels pour l’élection :

<pre>$2</pre>

La version cryptée suit. Elle sera affichée publiquement sur [[Special:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|Retour]]",
	'boardvote_nosession'     => "Impossible de déterminer votre identifiant Wikimedia. Veuillez vous rendre sur votre wiki d’origine, vous enregistrer, et vous rendre sur la page <nowiki>[[Special:Boardvote]]</nowiki>. Vous devez posséder un compte avec au moins $1 contributions effectuées avant le $2, et avoir effectué votre première édition avant le $3.",
	'boardvote_notloggedin'   => "Vous n’êtes actuellement pas authentifié. Pour voter, vous devez utiliser un compte comportant au moins $1 contributions avant le $2, et dont la première remonte au $3.",
	'boardvote_notqualified'  => "Vous ne répondez pas à l’une des conditions requises pour voter lors de ce scrutin. Il est nécessaire d’avoir $3 contributions avant le $2,  et vous en avez effectuées $1. En outre, votre première modification date du $4, et elle doit avoir été faite avant le $5.",
	'boardvote_novotes'       => "Personne n’a encore voté.",
	'boardvote_time'          => "Heure ",
	'boardvote_user'          => "Utilisateur",
	'boardvote_edits'         => "Modifications ",
	'boardvote_days'          => "Jours",
	'boardvote_ip'            => "IP",
	'boardvote_ua'            => "Représentant de l’utilisateur",
	'boardvote_listintro'     => "Liste des personnes ayant voté :<br /><br />",
	'boardvote_dumplink'      => "Cliquez ici",
	'boardvote_submit'        => 'OK',
	'boardvote_strike'        => "biffer ",
	'boardvote_unstrike'      => "débiffer ",
	'boardvote_needadmin'     => "Seuls les administrateurs du vote peuvent effectuer cette opération.",
	'boardvote_sitenotice'    => "<a href=\"{{localurle:Special:Boardvote/vote}}\">Élections au conseil d’administration Wikimedia</a> :  Vote ouvert jusqu’au 12 juillet",
	'boardvote_notstarted'    => 'Le vote n’est pas encore commencé.',
	'boardvote_closed'        => 'L’élection est désormais close. Le résultat est proclamé sur [[meta:Election results 2006/fr|la page de résultats]] (fr).',
	'boardvote_edits_many'    => 'plusieurs ',
	'group-boardvote'         => 'Membres votants du conseil d’administration',
	'group-boardvote-member'  => 'Membre votant du conseil d’administration',
	'grouppage-boardvote'     => '{{ns:project}}:membre votant du conseil d’administration',
	'boardvote_blocked'       => 'Désolé, mais vous avez été bloqué sur votre wiki d’origine. Les utilisateurs bloqués ne peuvent pas voter.',
	'boardvote_welcome'       => "Bienvenue '''$1'''!",
	'go_to_board_vote'        => 'Wikimedia Board Elections 2007',
	'boardvote_redirecting'   => 'Pour plus de transparence et sécurité le vote se déroule sur un serveur externe et indépendant.

Vous serez redirigé à ce serveur externe en 20 secondes. [$1 Cliquez ici] pour y aller maintenant.

Un avertissement concernant un certificat non signé sera peut-être affiché.',
);
$wgBoardVoteMessages['frp'] = array(
	'boardvote'               => 'Èlèccions u Consèly d’administracion de la Wikimedia Foundation',
	'boardvote_entry'         => '* [[Special:Boardvote/vote|Voto/votacion]]
* [[Special:Boardvote/list|Lista des votos/de les votacions enregistrâs]]
* [[Special:Boardvote/dump|Enregistraments criptâs]]',
	'boardvote_intro'         => '<p>Benvegnua a les trêsiémes èlèccions du Consèly d’administracion de la <i><a href="http://wikimediafoundation.org/wiki/Accueil" class="extiw" title="Pâge de reçua en francês">Wikimedia Foundation Inc.</a></i>.
Nos votens por una pèrsona que reprèsenterat la comunôtât des utilisators sur los difèrents projèts Wikimedia.
Cela pèrsona et los ôtros membros votants du Consèly d’administracion contribueront a oriantar la dirèccion de celos projèts et reprèsenteront <i>voutros</i> entèrèts et soucis vers lo Consèly d’administracion.
Dècideront des moyens de financement et de l’afèctacion des fonds.</p>

<p>Liéséd bien les dècllaracions des candidats et lors rèponses a les quèstions devant que votar.
Tôs los candidats sont des utilisators rèspèctâs, qu’ont balyê tot plen de temps et d’èfôrt por fére/fâre de celos projèts un endrêt recevent consacrâ u dèvelopament de l’abada difusion du savêr humen.</p>

<p>Vos pouede votar por atant de candidats que vos lo souhètâd. Celi que remporterat lo més de vouèx serat dècllarâ èlu por lo pôsto uquint s’est presentâ. En câs de balotâjo, y arat un voto/una votacion de dèpartâjo.</p>

<p>Por més d’enformacion, vêde :</p>
<ul><li><a href="http://meta.wikimedia.org/wiki/Election_FAQ_2006" class="extiw" title="« meta:Election FAQ 2006 » : pâge multilinga">FAQ sur les èlèccions</a></li>
<li><a href="http://meta.wikimedia.org/wiki/Election_candidates_2006/Fr" class="extiw" title="« meta:Election candidates 2006/Fr » : pâge en francês">Candidat(e)s</a></li></ul>',
	'boardvote_intro_change'  => '<p>Vos éd ja votâ. Portant vos pouede modifiar
voutron voto/voutra votacion en utilisent lo formulèro ce-desot. Marci de marcar les câses en regârd de châque candidat qu’at voutron supôrt.</p>',
	'boardvote_entered'       => 'Marci, voutron voto/voutra votacion at étâ enregistrâ.

Se vos lo souhètâd, vos pouede enregistrar los dètalys siuvents. Voutron historico de voto/votacion est :

<pre>$1</pre>

Il at étâ criptâ avouéc la cllâf publica des scrutators oficièls por l’èlèccion :

<pre>$2</pre>

La vèrsion criptâ siut. Serat afichiêe publicament dessus [[Special:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|Retôrn]]',
	'boardvote_nosession'     => 'Empossiblo de dètèrmenar voutron identifiant Wikimedia. Volyéd tornar a voutron vouiqui d’origina, vos enregistrar, et pués alar a la pâge <nowiki>[[Special:Boardvote]]</nowiki>. Vos dête avêr un compto avouéc u muens $1 contribucions fêtes devant lo $2, et avêr fêt voutra premiére èdicion devant lo $3.',
	'boardvote_notloggedin'   => 'Orendrêt vos éte pas ôtentifiâ. Por votar, vos dête utilisar un compto comportent u muens $1 contribucions devant lo $2, et que la premiére remonte u $3.',
	'boardvote_notqualified'  => 'Vos rèpondéd pas a yona de les condicions requises por votar pendent ceta èlèccion. O fôt avêr $3 contribucions devant lo $2, et vos en éd fêtes $1. Et pués, voutra premiére modificacion dâte du $4, et dêt avêr étâ fêta devant lo $5.',
	'boardvote_novotes'       => 'Nion at adés votâ.',
	'boardvote_time'          => 'Hora',
	'boardvote_user'          => 'Utilisator',
	'boardvote_edits'         => 'Modificacions',
	'boardvote_days'          => 'Jorns',
	'boardvote_ua'            => 'Reprèsentent de l’utilisator',
	'boardvote_listintro'     => 'Lista de les gens èyent votâ :<br /><br />',
	'boardvote_dumplink'      => 'Clicâd ique',
	'boardvote_submit'        => 'D’acôrd',
	'boardvote_strike'        => 'Traciér',
	'boardvote_unstrike'      => 'Dètraciér',
	'boardvote_needadmin'     => 'Solèts los administrators du voto/de la votacion pôvont fére/fâre cela opèracion.',
	'boardvote_sitenotice'    => '<a href="{{localurle:Special:Boardvote/vote}}">Èlèccions u Consèly d’administracion de la Wikimedia Foundation</a> : voto uvèrt/votacion uvèrta tant qu’u 12 de julyèt 2005.',
	'boardvote_notstarted'    => 'Lo voto/la votacion est p’oncor comenciê(e).',
	'boardvote_closed'        => 'L’èlèccion est dês ora cllôsa. Lo rèsultat est procllamâ sur [[:meta:Board elections/2006/Results/fr|<span title="« Board elections/2006/Results/fr » : pâge en francês" style="text-decoration:none">la pâge des rèsultats</span>]].',
	'boardvote_edits_many'    => 'plusiors',
	'group-boardvote'         => 'Membros votants du Consèly d’administracion',
	'group-boardvote-member'  => 'Membro votant du Consèly d’administracion',
	'grouppage-boardvote'     => '{{ns:project}}:Membros votants du Consèly d’administracion',
	'boardvote_blocked'       => 'Dèsolâ, mas vos avéd étâ blocâ sur voutron vouiqui d’origina. Los utilisators blocâs pôvont pas votar.',
	'boardvote_welcome'       => 'Benvegnua \'\'\'$1\'\'\' !',
	'go_to_board_vote'        => 'Èlèccions u Consèly d’administracion de la Wikimedia Foundation 2007',
	'boardvote_redirecting'   => 'Por més de transparence et de sècuritât lo voto/la votacion sè pâsse sur un sèrvior de defôr et endèpendent.

Vos seréd redirigiê vers cél sèrvior de defôr en 20 secondes. [$1 Clicâd ique] por y alar orendrêt.

Un avèrtissement regardent un cèrtificat pas signê serat pôt-étre afichiê.',
);
$wgBoardVoteMessages['he'] = array(
	'boardvote'               => "בחירות לחבר הנאמנים של ויקימדיה",
	'boardvote_entry'         => "* [[{{ns:special}}:Boardvote/vote|הצבעה]]
* [[{{ns:special}}:Boardvote/list|רשימת ההצבעות נכון לעכשיו]]
* [[{{ns:special}}:Boardvote/dump|ההעתק המוצפן של הבחירות]]",
	'boardvote_intro'         => "
<p>ברוכים הבאים לבחירות השניות לחבר הנאמנים של קרן ויקימדיה. בהצבעה זו ייבחרו שני נציגים אשר ייצגו את הקהילה של משתמשי המיזמים השונים של ויקימדיה. הם יעזרו להחליט על כיוון התפתחותם העתידי של המיזמים השונים, כבודדים וכקבוצה, וייצגו את האינטרסים והדאגות <em>שלך</em> בחבר הנאמנים. הם יחליטו על הדרכים לבקשת תרומות ועל חלוקת המשאבים הכספיים.</p>

<p>אנא קראו בעיון, בטרם ההצבעה, את פרטי המועמדים ואת תשובותיהם לשאלות. כל אחד מן המועמדים והמועמדות הוא משתמש מוכר, אשר השקיע זמן רב ומאמץ להפוך את המיזמים הללו לסביבה נעימה המחויבת למטרת ההפצה חופשית של הידע האנושי.</p>

<p>באפשרותכם להצביע עבור מספר מועמדים. המועמדים עם מירב ההצבעות בכל עמדה יוכרזו כמנצחים בעמדה זו. במידה ויתקיים שיוויון בין מספר מועמדים, תתבצע הצבעה נוספת ביניהם.</p>

<p>למידע נוסף, ראו:</p>
<ul><li><a href=\"http://meta.wikimedia.org/wiki/Election_FAQ_2006\" class=\"external\">שאלות נפוצות על הבחירות</a></li>
<li><a href=\"http://meta.wikimedia.org/wiki/Election_Candidates_2006\" class=\"external\">המועמדים</a></li></ul>
",
	'boardvote_intro_change'  => "<p>כבר הצבעתם בעבר. עם זאת, באפשרותכם לשנות את הצבעתכם באמצעות הטופס המצורף למטה. אנא סמנו את תיבת הסימון ליד כל אחד מהמועמדים המועדפים עליכם.</p>",
	'boardvote_entered'       => "תודה לכם, הצבעתכם נרשמה.

אם ברצונכם בכך, אתם יכולים לרשום את הפרטים הבאים. ההצבעה נרשמה כ:

<pre>$1</pre>

היא הוצפנה באמצעות המפתח הציבורי של ועדת הבחירות:

<pre>$2</pre>

תוצאות ההצפנה מופיעות בהמשך. הן גם תופענה בפומבי בקישור [[{{ns:special}}:Boardvote/entry]].

<pre>$3</pre>

[[{{ns:special}}:Boardvote/entry|חזרה]]",
	'boardvote_nosession'     => "לא ניתן לוודא את מספר המשתמש שלכם בוויקימדיה. אנא היכנסו לוויקי שבו אתם רשאים להצביע, ואז היכנסו ל<nowiki>[[מיוחד:Boardvote]]</nowiki>. עליכם להשתמש בחשבון שיש לו לפחות $1 תרומות לפני $2, ושעריכתו הראשונה בוצעה לפני $3.",
	'boardvote_notloggedin'   => "אינכם רשומים לחשבון. כדי להצביע, עליכם להשתמש בחשבון שיש לו לפחות $1 תרומות לפני $2, ושעריכתו הראשונה בוצעה לפני $3.",
	'boardvote_notqualified'  => "אינכם רשאים להצביע בבחירות הללו. תנאי הסף הם ביצוע $3 עריכות לפני $2, ועריכתכם הראשונה צריכה להיות לפני $5.",
	'boardvote_novotes'       => "איש לא הצביע עדיין.",
	'boardvote_time'          => "שעה",
	'boardvote_user'          => "משתמש",
	'boardvote_edits'         => "עריכות",
	'boardvote_days'          => "ימים",
	'boardvote_ip'            => "IP",
	'boardvote_ua'            => "זיהוי הדפדפן",
	'boardvote_listintro'     => "<p>זוהי רשימה של כל ההצבעות שנרשמו עד כה. $1 כדי להגיע לנתונים המוצפנים.</p>",
	'boardvote_dumplink'      => "לחצו כאן",
	'boardvote_submit'        => 'הצבעה',
	'boardvote_strike'        => "גילוי",
	'boardvote_unstrike'      => "הסתרה",
	'boardvote_needadmin'     => "רק מנהלי הבחירות יכולים לבצע פעולה זו.",
	'boardvote_sitenotice'    => "<a href=\"{{localurle:{{ns:special}}:Boardvote/vote}}\">בחירות לחבר הנאמנים של ויקימדיה</a>: ההצבעה פתוחה עד 12 ביולי",
	'boardvote_notstarted'    => 'ההצבעה עדיין לא התחילה',
	'boardvote_closed'        => 'ההצבעה סגורה כעת, ראו [http://meta.wikimedia.org/wiki/Elections_for_the_Board_of_Trustees_of_the_Wikimedia_Foundation%2C_2006/En את הדף על תוצאות הבחירות] בקרוב.',
	'boardvote_edits_many'    => 'הרבה',
	'group-boardvote'         => 'מנהלי הבחירות לחבר הנאמנים',
	'group-boardvote-member'  => 'מנהל הבחירות לחבר הנאמנים',
	'grouppage-boardvote'     => '{{ns:project}}:מנהל הבחירות לחבר הנאמנים',
	'boardvote_blocked'       => 'מצטערים, אתה חסום בוויקי הרשומה שלך. משתמשים חסומים לא יכולים להצביע.',
	'boardvote_welcome'       => "ברוכים הבאים, '''$1'''!",
	'go_to_board_vote'        => 'בחירות לחבר הנאמנים של ויקימדיה, 2007',
	'boardvote_redirecting'   => 'לשם אבטחה ושקיפות רבות יותר בתהליך ההצבעה, אנו מריצים שרתים חיצוניים ובלתי תלויים.

בתוך 20 שניות תבוצע הפניה לשרת החיצוני הזה.. [$1 לחצו כאן] כדי להגיע לשם עכשיו.

ייתכן שתוצג אזהרת אבטחה בגלל תעודת אישור בלתי חתומה.',
);

'hsb' => array(
	'block_title_error_page_title' => 'Mjeno nastawka zablokowane',
	'block_title_error' => 'Wodaj, ale njeje dowolene nastawk z tutym mjenom składować.',
),

$wgBoardVoteMessages['hsb'] = array(
	'boardvote'               => 'Wólby za kuratorij Wikimedia',
	'boardvote_entry'         => '* [[{{ns:special}}:Boardvote/vote|Wothłosować]]
* [[{{ns:special}}:Boardvote/list|Dotal wotedate hłosy]]
* [[{{ns:special}}:Boardvote/dump|Zaklučowane wólbne zapiski]]',
	'boardvote_intro'         => '<blockquote>
<p>
Witaj k štwórtej wólbje do kuratorija Wikimedija. Wola so třo wužiwarjo, zo bychu zhromadźenstwo wužiwarjow we wšelakich projektach reprezentowali. Tući třo wužiwarjo wola so za dobu dweju lět. Budu pomhać, přichodny směr projektow Wikimedije postajić, jednotliwje a jako skupina a reprezentuja <em>twoje</em> zajimy a naležnosće. Budu nimo wjele druhich wěcow wo dochodach a wudawkach rozsudźeć.
</p>

<p>Přečitaj přošu před twojim hłosowanjom předstajenja kandidatow a jich wotmołwy na prašenja. Kóždy kandidat je respektowany wužiwar, kiž je hižo wjele časa a prócy inwestował, zo by projektam pozitiwnu wokolinu za swobodne rozšerjowanje čłowječeje wědy wutworił.</p>

<p>Směš za telko kandidatow hłosować, kaž chceš. Třo kandidaća z najwjace hłosami budu dobyćerjo. Jeli je jenaki staw, budu so rozsudne wólby wotměwać.</p>

<p>Prošu kedźbuj, zo směš jenož z jednoho projekta hłosować. Tež jeli maš přez 400 změnow we wjacorych projektach, njesměš dwójce hłosować. Jeli chceš swój hłós změnić, wothłosuj prošu znowa z toho projekta, w kotrymž sy hižo prjedy wothłosował.</p>

<p>Dalše informacije:</p>
<ul><li><a href="http://meta.wikimedia.org/wiki/Board_elections/2007/FAQ/de" class="external">FAQ k wólbam</a></li>
<li><a href="http://meta.wikimedia.org/wiki/Board_elections/2007/Candidates/hsb" class="external">Kandidaća</a></li></ul>
</blockquote>',
	'boardvote_intro_change'  => '<p>Sy hižo wothłosował. Ale móžeš swoje wothłosowanje ze slědowacym formularom změnić. Markěruj prošu kašćiki pódla kandidatow, za kotrychž hłosuješ.</p>',
	'boardvote_entered'       => 'Dźakujemy so ći, twój hłós bu zregistrowany.

Jeli chceš, móžeš slědowace podrobnosce zapisować. Twoje zregistrowane wothłosowanje je:

<pre>$1</pre>

Bu ze zjawnym klučom wólbnych administratorow zaklučowane:

<pre>$2</pre>

Slěduje nastata zaklučowana wersija. Budźe so na [[{{ns:special}}:Boardvote/dump]] zjawnje zwobraznjeć.

<pre>$3</pre>

[[{{ns:special}}:Boardvote/entry|Wróćo]]',
	'boardvote_nosession'     => 'Twój wužiwarski ID za Wikimediju njehodźi so zwěsćić. Prošu přizjew so w tym wikiju, w kotrymž sy za wólbu pušćeny a dźi tam k <nowiki>[[Special:Boardvote]]</nowiki>. Zo by wolić móhł, dyrbiš wužiwarske konto měć, kotrež znajmjeńša $1 přinoškow před $2 pokazuje, přeni přinošk dyrbi před $3 być.',
	'boardvote_notloggedin'   => 'Njejsy so přizjewił. Zo by wohthłosować móhł, dyrbiš přizjewjeny być a wužiwarske konto wužiwać, z kotrymž sy znajmjeńša $1 změnow před $2 činił a hdźež prěnja změna je před $3.',
	'boardvote_notqualified'  => 'Njejsy woprawnjeny so na tutej wólbje wobdźělić. Dyrbiš $3 změnow před $2 činić a twoja prěnja změna dyrbi před $5 być.',
	'boardvote_novotes'       => 'Dotal nichtó njeje hłosował.',
	'boardvote_time'          => 'Čas',
	'boardvote_user'          => 'Wužiwar',
	'boardvote_edits'         => 'Změny',
	'boardvote_days'          => 'Dny',
	'boardvote_ip'            => 'IP-adresa',
	'boardvote_ua'            => 'Klient',
	'boardvote_listintro'     => '<p>To je lisćina wšěch hłosow, kotrež buchu dotal wotedate. $1 za zaklučowane daty.</p>',
	'boardvote_dumplink'      => 'Tu kliknyć',
	'boardvote_submit'        => 'Hłosować',
	'boardvote_strike'        => 'Hłos wušmórnyć',
	'boardvote_unstrike'      => 'Wušmórnjenje hłosu cofnyć',
	'boardvote_needadmin'     => 'Jenož wólbni administratorojo móža tutu akciju přewjesć.',
	'boardvote_sitenotice'    => '<a href="{{localurle:Special:Boardvote/vote}}">Wólby za kuratorij Wikimedija</a>:',
	'boardvote_notstarted'    => 'Wólba hišće njeje so započała.',
	'boardvote_closed'        => 'Wólba je zakónčena. Wuslědki móžeš na [http://meta.wikimedia.org/wiki/Election_results_2006/hsb na Wikimediji] widźeć.',
	'boardvote_edits_many'    => 'mnohe',
	'group-boardvote'         => 'Wólbni administratorojo',
	'group-boardvote-member'  => 'Wólbny administrator',
	'grouppage-boardvote'     => '{{ns:project}}:Wólbny administrator',
	'boardvote_blocked'       => 'Wodaj, ale ty bu we swojim wikiju zablokowany. Zablokowani wužiwarjo njesmědźa so na wólbje wobdźělić.',
	'boardvote_welcome'       => 'Witaj \'\'\'$1\'\'\'!',
	'go_to_board_vote'        => 'Wólby k Wikimedija-kuratorijej 2007',
	'boardvote_redirecting'   => 'Zo bychmy wěstosć a transparencu zaručili, přewjedźemy wólby na eksternym, njewotwisnje kontrolowanym serwerje. Sposrědkujemy tam w běhu 20 sekundow. [$1 Klikń tu] zo by so bjesporědnje tam dóstał. Je móžno, zo widźiš naprjedy wěstotne warnowanje wo njesignowanym certifikaće.',
);

$wgBoardVoteMessages['id'] = array(
	'boardvote'               => "Pemilihan Anggota Dewan Kepercayaan Yayasan Wikimedia",
	'boardvote_entry'         => "* [[Special:Boardvote/vote|Berikan suara]]
* [[Special:Boardvote/list|Daftar suara hingga saat ini]]
* [[Special:Boardvote/dump|Data pemilihan terenkripsi]]",
	'boardvote_intro'         => "
<p>Selamat datang di pemilihan keempat Dewan Kepercayaan Wikimedia, otoritas pemerintahan bagi Yayasan Wikimedia. Kita akan memilih tiga orang untuk mewakili komunitas pengguna untuk berbagai proyek Wikimedia. Tiga orang terpilih tersebut akan bertugas selama dua tahun di Dewan Kepercayaan. Mereka akan membantu menentukan arah ke depan dari proyek-proyek Wikimedia, baik untuk tiap proyek maupun secara keseluruhan, dan mereka akan mewakili kepentingan dan kepedulian <em>Anda</em>. Mereka akan menentukan cara-cara mendapatkan pemasukan dan alokasinya serta berbagai isu lainnya.</p>

<p>Sebelum memberikan suara, harap baca dengan seksama pernyataan dan jawaban kandidat terhadap pertanyaan. Tiap kandidat adalah pengguna yang diakui, yang telah menyumbangkan cukup waktu dan upaya untuk menjadikan proyek-proyek ini menjadi suatu lingkungan yang ramah dan berkomitmen untuk pencapaian dan penyebaran bebas pengetahuan manusia.</p>

<p>Anda dapat memberikan suara untuk sebanyak mungkin kandidat yang Anda inginkan. Tiga kandidat dengan suara terbanyak akan dinyatakan sebagai pemenang. Jika terjadi seri, akan dilakukan suatu pemilihan lanjutan.</p>

<p>Harap diingat bahwa Anda hanya dapat memberikan suara dari satu proyek. Bahkan jika Anda memiliki 400 suntingan pada berbagai proyek, tidak berarti bahwa Anda memiliki hak memberikan suara dua kali. Jika Anda kemudian ingin mengganti pilihan Anda, silakan memberikannya melalui proyek yang telah Anda pilih sebelumnya.</p>

<p>Untuk informasi tambahan, lihat:</p>
<ul><li><a href=\"http://meta.wikimedia.org/wiki/Board_elections/2007/FAQ\" class=\"external\">Tanya jawab Pemilihan</a></li>
<li><a href=\"http://meta.wikimedia.org/wiki/Board_elections/2007/Candidates/en\" class=\"external\">Kandidat</a></li></ul>",
	'boardvote_intro_change'  => "<p>Anda telah memilih sebelumnya. Meskipun demikian, Anda masih dapat mengganti pilihan Anda pada isian berikut. Harap pilih kotak disamping masing-masing kandidat yang Anda pilih.</p>",
	'boardvote_footer'        => "&nbsp;", # Don't translate this
	'boardvote_entered'       => "Terima kasih, pilihan Anda telah dicatat.

Jika mau, Anda dapat mencatat detil berikut. Catatan suara Anda adalah:

<pre>$1</pre>

Catatan tersebut telah dienkripsi dengan kunci publik Administrator Pemilihan:

<pre>$2</pre>

Versi terenkripsi tercantum di bawah ini. Hasil tersebut akan ditampilkan untuk publik di [[Special:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|Back]]",
	'boardvote_nosession'     => "Saya tak dapat menentukan ID pengguna Wikimedia Anda. Harap masuk log pada Wiki yang dapat mengkualifikasikan Anda, dan gunakan <nowiki>[[Special:Boardvote]]</nowiki>. Anda harus menggunakan suatu akun yang paling tidak telah memiliki $1 kontribusi sebelum $2, dengan suntingan pertama sebelum $3.",
	'boardvote_notloggedin'   => "Anda tidak masuk log. Untuk dapat memilih Anda harus menggunakan akun dengan paling tidak $1 suntingan sebelum $2, dan dengan suntingan pertama sebelum $3.",
	'boardvote_notqualified'  => "Anda tidak memiliki hak untuk memberikan suara dalam pemilihan ini. Anda harus memiliki $3 suntingan sebelum $2, dan suntingan pertama Anda harus sebelum $5.",
	'boardvote_novotes'       => "Belum ada pemilih.",
	'boardvote_time'          => "Waktu",
	'boardvote_user'          => "Pengguna",
	'boardvote_edits'         => "Suntingan",
	'boardvote_days'          => "Hari",
	'boardvote_ip'            => "IP",
	'boardvote_ua'            => "Agen pengguna",
	'boardvote_listintro'     => "<p>Berikut adalah daftar semua suara yang telah masuk sampai hari ini. $1 untuk data terenkripsi.</p>",
	'boardvote_dumplink'      => "Klik di sini",
	'boardvote_submit'        => 'Kirim',
	'boardvote_strike'        => "Coret",
	'boardvote_unstrike'      => "Hapus coretan",
	'boardvote_needadmin'     => "Hanya pengurus pemilihan yang dapat melakukan tindakan ini.",
	'boardvote_sitenotice'    => "<a href=\"{{localurle:Special:Boardvote/vote}}\">Pemilihan Dewan Wikimedia</a>: Pemilihan dibuka sampai 12 Juli",
	'boardvote_notstarted'    => 'Pemilihan belum dimulai',
	'boardvote_closed'        => 'Pemilihan telah ditutup, lihat [http://meta.wikimedia.org/wiki/Elections_for_the_Board_of_Trustees_of_the_Wikimedia_Foundation%2C_2006/En halaman pemilihan untuk mengetahui hasilnya] sebentar lagi.',
	'boardvote_edits_many'    => 'banyak',
	'group-boardvote'         => 'Pengurus pemilihan anggota dewan',
	'group-boardvote-member'  => 'Pengurus pemilihan anggota dewan',
	'grouppage-boardvote'     => '{{ns:project}}:Pengurus pemilihan anggota dewan',
	'boardvote_blocked'       => 'Maaf, Anda telah diblokir pada wiki tempat Anda terdaftar. Pengguna yang diblokir tidak diizinkan untuk memberikan suaranya.',
	'boardvote_welcome'       => "Selamat datang '''$1'''!",
	'go_to_board_vote'        => 'Pemilihan Dewan Wikimedia 2007',
);
$wgBoardVoteMessages['it'] = array(
	'boardvote'               => "Elezioni del Consiglio direttivo della Wikimedia Foundation",
	'boardvote_entry'         => "* [[Special:Boardvote/vote|Vota]]
* [[Special:Boardvote/list|Visualizza i voti espressi sinora]]
* [[Special:Boardvote/dump|Scarica i voti in forma cifrata]]",
	'boardvote_intro'         => "<blockquote>
<p>
Benvenuto/a alla quarta elezione per il consiglio direttivo Wikimedia, l'autorità a capo della Wikimedia Foundation. Si vota per le tre persone che rappresenteranno la comunità di utenti dei vari progetti Wikimedia. Gli eletti rimarranno in carica per due anni nel consiglio direttivo ed aiuteranno a determinare il futuro orientamento dei progetti Wikimedia, individualmente e come gruppo, rappresentando i <em>tuoi</em> interessi e le tue idee. Decideranno in merito a vari temi, tra cui, in particolare, le modalità di raccolta e investimento dei fondi.</p>

<p>Per favore, prima di votare, leggi attentamente le presentazioni dei candidati e le risposte alle domande che sono state loro poste. Ognuno dei candidati è un utente rispettato, che ha contribuito con molto del proprio tempo e con notevoli sforzi a rendere questi progetti un ambiente accogliente e dedicato alla libera raccolta, organizzazione e distribuzione della conoscenza umana.</p>  

<p>Puoi votare per più candidati a tua scelta: i tre con il maggior numero di voti saranno dichiarati eletti. Nel caso di pareggio, sarà tenuta una votazione di ballottaggio.</p>

<p>Per favore, ricorda che puoi effettuare il tuo voto solamente in un progetto. Anche se hai 400 edit su più progetti, non significa che tu abbia il diritto di votare più di una volta. Se successivamente vorrai cambiare il tuo voto, ricorda di votare dal progetto da cui hai precedentemente votato.</p>

<p>Per maggiori informazioni, vedi:</p>
<ul><li><a href=\"http://meta.wikimedia.org/wiki/Board_elections/2007/FAQ\" class=\"external\">FAQ sulle elezioni (in inglese)</a></li>
<li><a href=\"http://meta.wikimedia.org/wiki/Board_elections/2007/Candidates/it\" class=\"external\">Candidati</a></li></ul>
</blockquote>",
	'boardvote_intro_change'  => "<p>Il voto è già stato espresso. Per cambiarlo, usare il modulo sottostante. Spuntare la casella a fianco di ciascuno dei candidati che si desidera sostenere.</p>",
	'boardvote_entered'       => "Il voto è stato registrato. Grazie.

Se lo si desidera, è possibile registrare i dettagli del proprio voto, riportati di seguito:

<pre>$1</pre>

Il voto è stato cifrato con la chiave pubblica della commissione elettorale:

<pre>$2</pre>

Il voto espresso in forma cifrata è riportato di seguito. È inoltre visibile al pubblico all'indirizzo [[Special:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|Indietro]]",
        'boardvote_nosession'     => "Non siamo in grado di determinare il tuo ID utente Wikimedia. Per favore, esegui il login nel progetto in cui hai i requisiti per votare, e vai alla pagina <nowiki>[[Speciale:Boardvote]]</nowiki>. Devi usare un account con almeno $1 contributi prima di $2 e con il primo contributo precedente a $3.

È necessario impostare il proprio browser affinché accetti i cookie dal nostro server di voto esterno: '''wikimedia.spi-inc.org'''.",
	'boardvote_notloggedin'   => "Accesso non effettuato. Per esprimere un voto è necessario disporre di un'utenza che abbia effettuato almeno $1 contributi prima del $2; la prima modifica registrata deve essere precedente al $3.",
	'boardvote_notqualified'  => "Non hai i requisiti necessari per votare in questa elezione. Devi necessariamente avere $3 contributi prima di $2, e il tuo primo contributo deve essere stato compiuto prima di $5.",
	'boardvote_novotes'       => "Non ha ancora votato nessuno.",
	'boardvote_time'          => "Data e ora",
	'boardvote_user'          => "Utente",
	'boardvote_edits'         => "Modifiche",
	'boardvote_days'          => "Giorni",
	'boardvote_ip'            => "IP",
	'boardvote_ua'            => "User agent",
	'boardvote_listintro'     => "<p>Di seguito viene riportato l'elenco dei voti registrati sinora. $1 per scaricare i dati in forma cifrata.</p>",
	'boardvote_dumplink'      => "Fare clic qui",
	'boardvote_submit'        => 'OK',
	'boardvote_strike'        => "Annulla questo voto",
	'boardvote_unstrike'      => "Elimina annullamento",
	'boardvote_needadmin'     => "Operazione riservata ai componenti della commissione elettorale.",
	'boardvote_sitenotice'    => "<a href=\"{{localurle:Special:Boardvote/vote}}\">Elezioni del Consiglio direttivo Wikimedia</a>: è possibile votare fino al 12 luglio",
	'boardvote_notstarted'    => 'La votazione non è ancora iniziata',
	'boardvote_closed'        => 'La votazione è conclusa, si invita a consultare  [http://meta.wikimedia.org/wiki/Elections_for_the_Board_of_Trustees_of_the_Wikimedia_Foundation%2C_2006/It la pagina dei risultati].',
	'boardvote_edits_many'    => 'molti',
	'group-boardvote'         => 'Commissione elettorale',
	'group-boardvote-member'  => 'Commissario elettorale',
	'grouppage-boardvote'     => '{{ns:project}}:Commissario elettorale',
        'boardvote_blocked'       => 'Siamo spiacenti, sei stato bloccato nel progetto in cui sei registrato. Gli utenti bloccati non hanno diritto di voto.',
        'boardvote_welcome'       => "Benvenuto/a '''$1'''!",
);
$wgBoardVoteMessages['ja'] = array(
	'boardvote_redirecting'   => 'セキュリティと透明性を確保するため、外部の独立したサーバ上で投票を行っています。

20秒後に外部サーバへ転送されます。[$1 ここをクリック]するとすぐに投票ページに移動できます。

サーバ証明書のセキュリティに関する警告が表示される場合があります。',
);
$wgBoardVoteMessages['kk-kz'] = array(
	'boardvote'               => "Wikimedia қорының Уәкілдер еңесінің сайлауы ",
	'boardvote_entry'         => "* [[{{ns:special}}:Boardvote/vote|Дауыс беру]]
* [[{{ns:Special}}:Boardvote/list|Күн бойынша дауыс беру тізімі]]
* [[{{ns:Special}}:Boardvote/dump|Мұқамдалған сайлау жазбаларының арқауы]]",

	'boardvote_intro_change'  => "<p>Даусыңызды әуелде беріпсіз.
  Дегенмен, төмендегі үлгітті пайдаланып даусыңызды өзгертей аласыз.
  Сіз таңдаған әрбір ұсынылған тұлғалар қасына белгі қойңыз.</p>",

	'boardvote_entered'       => "Рахмет, дауысыңыз жазылыпп алынды.

Егер дітте болсаңыз, келесі егжей-тегжейлерін жазуыңызға болады. Дауыс беруіңіздің жазбасы:

<pre>$1</pre>

Бұл Сайлау Әкімшілерінің жариялы електронды кілтімен мұқамдалған:

<pre>$2</pre>

Нәтижелі мұқамдалған нұсқасы келесіде көрсетіледі. Бұл [[{{ns:special}}:Boardvote/dump]] бетінде баршаға жарияланады.

<pre>$3</pre>

[[{{ns:special}}:Boardvote/entry|Кері қайту]]",
	'boardvote_notloggedin'   => "Осы жобаға кірмепсіз. Дауыс беру үшін $2 кезіне дейін ең кемінде $1 үлес берген тіркелгініз болу қажет, және де бірінші түзетуіңіз $3 кезіне дейін болу қажет.",
	'boardvote_notqualified'  => "Осы сайлауда дауыс беруге жуытылмайсыз. $2 кезіне дейін $3 түзетіңіз болу қажет; сізде тек $1 болыпты. Тағы да, бірінші түзетуіңіз $4 кезінде осы уикиде істеліпті; бұл $5 кезіне дейін болу қажет.",
	'boardvote_novotes'       => "Ешкім дауысын берген жоқ.",
	'boardvote_time'          => "Уақыт",
	'boardvote_user'          => "Қатысушы",
	'boardvote_edits'         => "Түзету",
	'boardvote_days'          => "Күн",
	'boardvote_ip'            => "IP жай",
	'boardvote_ua'            => "Пайдаланушы әрекеткіші",
	'boardvote_listintro'     => "<p>Осында жазылып алынған барлық дауыс берушілердің күн-айы бойынша тізімі беріліп тұр.
Мұқамдалған деректер үшін $1.</p>",
	'boardvote_dumplink'      => "мынаны нұқыңыз",
	'boardvote_submit'        => 'Жарайды',
	'boardvote_strike'        => "Сызып тастау",
	'boardvote_unstrike'      => "Сызуды өшіру",
	'boardvote_needadmin'     => "Бұл әрекетті тек сайлау әкімшілер орындай алады.",
	'boardvote_notstarted'    => 'Дауыс беру әлі басталмаған',
	'boardvote_edits_many'    => 'көп',
	'group-boardvote'         => 'Кеңес сайлау әкімшілері',
	'group-boardvote-member'  => 'Кеңес сайлау әкімші',
	'grouppage-boardvote'     => '{{ns:project}}:Кеңес сайлау әкімшілері',
);
$wgBoardVoteMessages['kk-tr'] = array(
	'boardvote'               => "Wikimedia qorınıñ Wäkilder eñesiniñ saýlawı ",
	'boardvote_entry'         => "* [[{{ns:special}}:Boardvote/vote|Dawıs berw]]
* [[{{ns:Special}}:Boardvote/list|Kün boýınşa dawıs berw tizimi]]
* [[{{ns:Special}}:Boardvote/dump|Muqamdalğan saýlaw jazbalarınıñ arqawı]]",

	'boardvote_intro_change'  => "<p>Dawsıñızdı äwelde beripsiz.
  Degenmen, tömendegi ülgitti paýdalanıp dawsıñızdı özgerteý alasız.
  Siz tañdağan ärbir usınılğan tulğalar qasına belgi qoýñız.</p>",

	'boardvote_entered'       => "Raxmet, dawısıñız jazılıpp alındı.

Eger ditte bolsañız, kelesi egjeý-tegjeýlerin jazwıñızğa boladı. Dawıs berwiñizdiñ jazbası:

<pre>$1</pre>

Bul Saýlaw Äkimşileriniñ jarïyalı elektrondı kiltimen muqamdalğan:

<pre>$2</pre>

Nätïjeli muqamdalğan nusqası keleside körsetiledi. Bul [[{{ns:special}}:Boardvote/dump]] betinde barşağa jarïyalanadı.

<pre>$3</pre>

[[{{ns:special}}:Boardvote/entry|Keri qaýtw]]",
	'boardvote_notloggedin'   => "Osı jobağa kirmepsiz. Dawıs berw üşin $2 kezine deýin eñ keminde $1 üles bergen tirkelginiz bolw qajet, jäne de birinşi tüzetwiñiz $3 kezine deýin bolw qajet.",
	'boardvote_notqualified'  => "Osı saýlawda dawıs berwge jwıtılmaýsız. $2 kezine deýin $3 tüzetiñiz bolw qajet; sizde tek $1 bolıptı. Tağı da, birinşi tüzetwiñiz $4 kezinde osı wïkïde istelipti; bul $5 kezine deýin bolw qajet.",
	'boardvote_novotes'       => "Eşkim dawısın bergen joq.",
	'boardvote_time'          => "Waqıt",
	'boardvote_user'          => "Qatıswşı",
	'boardvote_edits'         => "Tüzetw",
	'boardvote_days'          => "Kün",
	'boardvote_ip'            => "IP jaý",
	'boardvote_ua'            => "Paýdalanwşı äreketkişi",
	'boardvote_listintro'     => "<p>Osında jazılıp alınğan barlıq dawıs berwşilerdiñ kün-aýı boýınşa tizimi berilip tur.
Muqamdalğan derekter üşin $1.</p>",
	'boardvote_dumplink'      => "mınanı nuqıñız",
	'boardvote_submit'        => 'Jaraýdı',
	'boardvote_strike'        => "Sızıp tastaw",
	'boardvote_unstrike'      => "Sızwdı öşirw",
	'boardvote_needadmin'     => "Bul äreketti tek saýlaw äkimşiler orındaý aladı.",
	'boardvote_notstarted'    => 'Dawıs berw äli bastalmağan',
	'boardvote_edits_many'    => 'köp',
	'group-boardvote'         => 'Keñes saýlaw äkimşileri',
	'group-boardvote-member'  => 'Keñes saýlaw äkimşi',
	'grouppage-boardvote'     => '{{ns:project}}:Keñes saýlaw äkimşileri',
);
$wgBoardVoteMessages['kk-cn'] = array(
	'boardvote'               => "Wikimedia قورىنىڭ ۋٴاكٴىلدەر ەڭەسٴىنٴىڭ سايلاۋى ",
	'boardvote_entry'         => "* [[{{ns:special}}:Boardvote/vote|داۋىس بەرۋ]]
* [[{{ns:Special}}:Boardvote/list|كٴۇن بويىنشا داۋىس بەرۋ تٴىزٴىمٴى]]
* [[{{ns:Special}}:Boardvote/dump|مۇقامدالعان سايلاۋ جازبالارىنىڭ ارقاۋى]]",

	'boardvote_intro_change'  => "<p>داۋسىڭىزدى ٴاۋەلدە بەرٴىپسٴىز.
  دەگەنمەن, تٴومەندەگٴى ٴۇلگٴىتتٴى پايدالانىپ داۋسىڭىزدى ٴوزگەرتەي الاسىز.
  سٴىز تاڭداعان ٴاربٴىر ۇسىنىلعان تۇلعالار قاسىنا بەلگٴى قويڭىز.</p>",

	'boardvote_entered'       => "راحمەت, داۋىسىڭىز جازىلىپپ الىندى.

ەگەر دٴىتتە بولساڭىز, كەلەسٴى ەگجەي-تەگجەيلەرٴىن جازۋىڭىزعا بولادى. داۋىس بەرۋٴىڭٴىزدٴىڭ جازباسى:

<pre>$1</pre>

بۇل سايلاۋ ٴاكٴىمشٴىلەرٴىنٴىڭ جارييالى ەلەكتروندى كٴىلتٴىمەن مۇقامدالعان:

<pre>$2</pre>

نٴاتيجەلٴى مۇقامدالعان نۇسقاسى كەلەسٴىدە كٴورسەتٴىلەدٴى. بۇل [[{{ns:special}}:Boardvote/dump]] بەتٴىندە بارشاعا جارييالانادى.

<pre>$3</pre>

[[{{ns:special}}:Boardvote/entry|كەرٴى قايتۋ]]",
	'boardvote_notloggedin'   => "وسى جوباعا كٴىرمەپسٴىز. داۋىس بەرۋ ٴۇشٴىن $2 كەزٴىنە دەيٴىن ەڭ كەمٴىندە $1 ٴۇلەس بەرگەن تٴىركەلگٴىنٴىز بولۋ قاجەت, جٴانە دە بٴىرٴىنشٴى تٴۇزەتۋٴىڭٴىز $3 كەزٴىنە دەيٴىن بولۋ قاجەت.",
	'boardvote_notqualified'  => "وسى سايلاۋدا داۋىس بەرۋگە جۋىتىلمايسىز. $2 كەزٴىنە دەيٴىن $3 تٴۇزەتٴىڭٴىز بولۋ قاجەت; سٴىزدە تەك $1 بولىپتى. تاعى دا, بٴىرٴىنشٴى تٴۇزەتۋٴىڭٴىز $4 كەزٴىندە وسى ۋيكيدە ٴىستەلٴىپتٴى; بۇل $5 كەزٴىنە دەيٴىن بولۋ قاجەت.",
	'boardvote_novotes'       => "ەشكٴىم داۋىسىن بەرگەن جوق.",
	'boardvote_time'          => "ۋاقىت",
	'boardvote_user'          => "قاتىسۋشى",
	'boardvote_edits'         => "تٴۇزەتۋ",
	'boardvote_days'          => "كٴۇن",
	'boardvote_ip'            => "IP جاي",
	'boardvote_ua'            => "پايدالانۋشى ٴارەكەتكٴىشٴى",
	'boardvote_listintro'     => "<p>وسىندا جازىلىپ الىنعان بارلىق داۋىس بەرۋشٴىلەردٴىڭ كٴۇن-ايى بويىنشا تٴىزٴىمٴى بەرٴىلٴىپ تۇر.
مۇقامدالعان دەرەكتەر ٴۇشٴىن $1.</p>",
	'boardvote_dumplink'      => "مىنانى نۇقىڭىز",
	'boardvote_submit'        => 'جارايدى',
	'boardvote_strike'        => "سىزىپ تاستاۋ",
	'boardvote_unstrike'      => "سىزۋدى ٴوشٴىرۋ",
	'boardvote_needadmin'     => "بۇل ٴارەكەتتٴى تەك سايلاۋ ٴاكٴىمشٴىلەر ورىنداي الادى.",
	'boardvote_notstarted'    => 'داۋىس بەرۋ ٴالٴى باستالماعان',
	'boardvote_edits_many'    => 'كٴوپ',
	'group-boardvote'         => 'كەڭەس سايلاۋ ٴاكٴىمشٴىلەرٴى',
	'group-boardvote-member'  => 'كەڭەس سايلاۋ ٴاكٴىمشٴى',
	'grouppage-boardvote'     => '{{ns:project}}:كەڭەس سايلاۋ ٴاكٴىمشٴىلەرٴى',
);
$wgBoardVoteMessages['kk'] = $wgBoardVoteMessages['kk-kz'];
$wgBoardVoteMessages['la'] = array(
	'boardvote_time'          => 'Tempus',
	'boardvote_user'          => 'Usor',
	'boardvote_edits'         => 'Recensiones',
	'boardvote_days'          => 'Dies',
	'boardvote_dumplink'      => 'Imprime hic',
	'boardvote_edits_many'    => 'plurimae',
	'boardvote_welcome'       => 'Salve \'\'\'$1\'\'\'!',
);
$wgBoardVoteMessages['nl'] = array(
	'boardvote'               => 'Wikimedia Board of Trustees-verkiezing',
	'boardvote_entry'         => '* [[Special:Boardvote/vote|Stemmen]]
* [[Special:Boardvote/list|Toon uitgebrachte stemmen]]
* [[Special:Boardvote/dump|Dump encrypted election record]]',
	'boardvote_intro'         => '
<p>Welkom bij de tweede verkiezingen voor de Wikimedia Board of Trustees. We
kiezen twee personen die de gebruikersgemeenschap vertegenwoordigen in de
verschillden Wikimedia-projecten. Ze bepalen mede de toekomstige richting
van Wikimedia-projecten, individueel en als groep, en behartigen <em>uw</em>
belangen en zorgen bij de Board of Trustees. Ze beslissen ook over hoe
inkomsten gemaakt kunnen worden en waar het opgehaalde geld aan wordt
besteed.</p>

<p>Lees alstublieft de kandidaatstelling en de antwoorden op vragen zorgvuldig
voordat u stemt. Iedere kandidaat is een gewaardeerde gebruiker die
aanzielijke hoeveelheden tijd en moeite heeft besteed aan het bouwen van
uitnodigende omgevingen die toegewijd zijn aan het nastreven en vrij verspreiden
van menselijke kennis.</p>

<p>U mag voor zoveel kandidaten stemmen als u wilt. De kandidaat met de meeste
stemmen voor iedere positie wordt tot winnaar uitgeroepen voor de betreffende
positie. In geval de stemmen staken wordt er een tweede ronde gehouden.</p>

<p>Meer informatie:</p>
<ul><li><a href="http://meta.wikimedia.org/wiki/Election_FAQ_2006" class="external">Bestuursverkiezing FAQ</a></li>
<li><a href="http://meta.wikimedia.org/wiki/Election_Candidates_2006" class="external">Kandidaten</a></li></ul>
',
	'boardvote_intro_change'  => '<p>U heeft al gestemd. U kunt uw stem wijzigen via
het onderstaande formulier. Vink alstublieft de vakjes naar iedere kandidaat die
u steunt aan.</p>',
	'boardvote_entered'       => 'Dank u. Uw stem is verwerkt.

Als u wilt kunt u de volgende gegevens bewaren. Uw stem:

<pre>$1</pre>

Deze is versleuteld met de publieke sleutel van de Verkiezingscommissie:

<pre>$2</pre>

Nu volgt de versleutelde versie. Deze is openbaar en na te zien op [[Special:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|Terug]]',
	'boardvote_nosession'     => 'Uw Wikimedia-gebruikersnummer kan niet bepaald worden. Meldt u zich aan in wiki waar u voldoet aan de eisen, en ga naar <nowiki>[[Special:Boardvote]]</nowiki>. Gebruik een gebruiker met tenminste $1 bijdragen voor $2, en met uw eerste bewerking voor $3.',
	'boardvote_notloggedin'   => 'U bent niet aangemeld. U kunt stemmen als u voor $2 ten minste
$1 bewerkingen heeft gemaakt.',
	'boardvote_notqualified'  => 'Sorry, u heeft voor $2 $1 bewerkingen gemaakt. Om te kunnen
stemmen heeft u er $3 nodig.',
	'boardvote_novotes'       => 'Er is nog niet gestemd.',
	'boardvote_time'          => 'Tijd',
	'boardvote_user'          => 'Gebruiker',
	'boardvote_edits'         => 'Bewerkingen',
	'boardvote_days'          => 'Dagen',
	'boardvote_ip'            => 'IP-adres',
	'boardvote_ua'            => 'User-agent',
	'boardvote_listintro'     => '<p>Hieronder staan alle stemmen die tot nu toe zijn
uitgebracht. $1 voor de versleutelde gegevens.</p>',
	'boardvote_dumplink'      => 'Klik hier',
	'boardvote_strike'        => 'Ongeldig',
	'boardvote_unstrike'      => 'Geldig',
	'boardvote_needadmin'     => 'Alleen leden van de Verkiezingscommissie kunnen deze handeling uitvoeren.',
	'boardvote_sitenotice'    => '<a href="{{localurle:Special:Boardvote/vote}}">Wikimedia Bestuursverkiezingen</a>:<!--  Vote open until July 12 -->',
	'boardvote_notstarted'    => 'Het stemmen is nog niet gestart',
	'boardvote_edits_many'    => 'veel',
	'group-boardvote'         => 'Board vote beheerders',
	'group-boardvote-member'  => 'Board vote beheerder',
	'grouppage-boardvote'     => '{{ns:project}}:Board vote beheerder',
	'boardvote_blocked'       => 'Sorry, u bent geblokkeerd op uw geregistreerde wiki. Geblokkeerde gebruikers mogen niet stemmen.',
	'boardvote_welcome'       => 'Welkom, \'\'\'$1\'\'\'!',
	'go_to_board_vote'        => 'Wikimedia Bestuursverkiezing 2007',
	'boardvote_redirecting'   => 'Vanwege een betere beveiliging en meer transparantie vinden de verkiezingen plaats op een externe, onafhankelijke beheerde server.

U wordt over 20 seconden omgeleid naar deze externe server. [$1 Klik hier] om er nu heen te gaan.

Het is mogelijk dat u een waarschuwing krijgt vanwege een niet ondertekend certificaat.',
);

$wgBoardVoteMessages['no'] = array(
	'boardvote_entry'         => '* [[Special:Boardvote/vote|Stem]]
* [[Special:Boardvote/list|Liste over stemmer]]
* [[Special:Boardvote/dump|Dump med kryptert stemmehistorie]]',
	'boardvote_intro_change'  => '<p>Du har stemt før. Du kan imidlertid endre din stemme ved hjelp av skjemaet nedenunder. Vennligst merk av boksene ved siden av kandidatene du vil gå god for.</p>',
	'boardvote_entered'       => 'Takk, din stemme er registrert.

Om du ønsker, kan du ta vare på følgende resultater. Din stemmegivingshistorikk er:

<pre>$1</pre>

Det er blitt kryptert med den offentlige nøkkelen fra valgadminsitratorene:

<pre>$2</pre>

Dette resulterer i den følgende krypterte versjonen. Den vil vises offentlig på [[Special:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|Tilbake]]',
	'boardvote_notloggedin'   => 'Du er ikke logget inn. For å stemme må du bruke en konto med minst $1&nbsp;redigeringer før $2, og må ha redigert før $3.',
	'boardvote_notqualified'  => 'Du er ikke kvalifisert til å stemme i dette valget. Du må ha hatt minst $3&nbsp;redigeringer før $2, du hadde $1. Din første redigering måtte også være før $5, mens din var $4.',
	'boardvote_novotes'       => 'Ingen har stemt enda.',
	'boardvote_time'          => 'Tid',
	'boardvote_user'          => 'Bruker',
	'boardvote_edits'         => 'Redigeringer',
	'boardvote_days'          => 'Dager',
	'boardvote_ua'            => 'Brukeragent',
	'boardvote_listintro'     => '<p>Dette er en liste over alle stemmer som har blitt registrert hittil. $1 for krypterte data.</p>',
	'boardvote_dumplink'      => 'Klikk her',
	'boardvote_strike'        => 'Stryk',
	'boardvote_unstrike'      => 'Fjern strykning',
	'boardvote_needadmin'     => 'Kun valgadministratorer kan utføre dette.',
	'boardvote_notstarted'    => 'Valget har ikke startet',
	'boardvote_edits_many'    => 'mange',
	'group-boardvote'         => 'valgadministratorer',
	'group-boardvote-member'  => 'valgadministrator',
	'grouppage-boardvote'     => '{{ns:project}}:Valgadministrator',
);
$wgBoardVoteMessages['oc'] = array(
	'boardvote'               => 'Eleccions al conselh d’administracion de la Wikimedia Foundation',
	'boardvote_entry'         => '* [[Special:Boardvote/vote|Vòte]]
* [[Special:Boardvote/list|Lista dels vòtes enregistrats]]
* [[Special:Boardvote/dump|Enregistraments criptats]]',
	'boardvote_intro'         => '<p>Benvenguda a las tresenas eleccions del conselh d\'administracion de <i><a href="http://wikimediafoundation.org/wiki/Acuèlh" class="extiw" title="foundation:Acuèlh">Wikimedia Foundation Inc.</a></i>. Votam per una persona que representarà la comunautat dels utilizaires suls diferents projèctes Wikimedia. Aquesta persona e lo conselh d\'administracion contribuiràn a orientar la direccion d\'aquestes projèctes e representaràn <i>vòstres</i> interèsses e preocupacions alprèp del conselh d\'administracion. Decidiràn dels mejans de finançament e de l\'afectacion dels fonses.</p> <p>Legissètz atentivament las declaracions dels candidats e lors responsas a las questions abans de votar. Totes los candidats son d\'utilizaires respectats, qu\'an balhat fòrça de temps e d\'esfòrces per far d\'aquestes projèctes un endrech acuelhant dedicat al desvolopament de la liura difusion del saber uman.</p> <p>Podètz votar per autant de candidats qu\'o desiratz. Lo que remportarà mai de voses serà declarat elegit pel pòst alqual s\'es presentat. En cas de balotatge, i aurà un vòte de departatge.</p> <p>Per mai d\'informacion, vejatz :</p> <ul><li><a href="http://meta.wikimedia.org/wiki/Election_FAQ_2006/Oc" class="extiw" title="meta:Election_FAQ_2006/Oc">FAQ sus las eleccions</a></li> <li><a href="http://meta.wikimedia.org/wiki/Election_candidates_2006/Oc" class="extiw" title="meta:Election_candidates_2006/Oc">Candidat-a-s</a></li></ul>',
	'boardvote_intro_change'  => '<p>Ja avètz votat. Podètz çaquelà modificar vòstre vòte en utilizant lo formulari çai jos. Mercé de marcar las casas en regard de cada candidat qu\'a vòtre supòrt.</p></p>',
	'boardvote_entered'       => 'Mercé, vòstre vòte es estat enregistrat. 

S\'o desiratz, podètz enregistrar los detalhs seguents. Vòstre istoric de vòte es :

<pre>$1</pre>

Es estat criptat amb la clau publica dels escrutators oficials per l’eleccion : 

<pre>$2</pre> 

La version criptada seguís. Serà afichada publicament sus [[Special:Boardvote/dump]].

<pre>$3</pre> 

[[Special:Boardvote/entry|Retorn]]',
	'boardvote_notloggedin'   => 'Actualament sètz pas autentificat. Per votar, devètz utilizar un compte comportant al mens $1 contribucions abans lo $2, e que la primièra remonte al $3.',
	'boardvote_notqualified'  => 'Respondètz pas a una de las condicions requesidas per votar a aqueste escrutin. Es necessari d’aver $3 contribucions abans lo $2, e n\'avètz efectuadas $1. En mai, vòstra primièra modificacion data del $4, e deu aver estada facha abans lo $5.',
	'boardvote_novotes'       => 'Degun a pas encara votat.',
	'boardvote_time'          => 'Ora',
	'boardvote_user'          => 'Utilizaire',
	'boardvote_edits'         => 'Modificacions',
	'boardvote_days'          => 'Jorns',
	'boardvote_ua'            => 'Representant de l’utilizaire',
	'boardvote_listintro'     => 'Lista de las personas qua ja an votat :<br /><br />',
	'boardvote_dumplink'      => 'Clicatz aicí',
	'boardvote_submit'        => 'D\'acòrdi',
	'boardvote_strike'        => 'Raiar',
	'boardvote_unstrike'      => 'Desraiar',
	'boardvote_needadmin'     => 'Sols los administrators del vòte pòdon efectuar aquesta operacion.',
	'boardvote_sitenotice'    => '<a href="{{localurle:Special:Boardvote/vote}}">Eleccions al conselh d’administracion Wikimedia</a> : Vòte dobert fins al 12 de julhet',
	'boardvote_notstarted'    => 'Lo vòte a pas encara començat',
	'boardvote_closed'        => 'L’eleccion es d\'ara enlà clausa. Lo resultat es proclamat sus [[meta:Election results 2006/oc|la pagina de resultats]] (oc).',
	'boardvote_edits_many'    => 'mantun',
	'group-boardvote'         => 'Membres votants del conselh d’administracion',
	'group-boardvote-member'  => 'Membre votant del conselh d’administracion',
	'grouppage-boardvote'     => '{{ns:project}}:membre votant del conselh d’administracion',
	'boardvote_blocked'       => 'O planhem, mas sètz estat(ada) blocat(ada) sus vòstra wiki d’origina. Los utilizaires blocats pòdon pas votar.',
	'boardvote_welcome'       => 'Benvengut \'\'\'$1\'\'\'!',
	'boardvote_redirecting'   => 'Per mai de transparéncia e de seguretat lo vòte se desenròtla sus un serveire extèrn e independent. Seretz redirigit vèrs aqueste serveire extèrn en 20 segondas. [$1 Clicatz aicí] per i anar ara. Un avertiment concernent un certificat non signat benlèu serà afichat.',
);
$wgBoardVoteMessages['pl'] = array(
	'boardvote'               => "Wybory do Rady Powierniczej Fundacji Wikimedia",
	'boardvote_entry'         => "* [[Special:Boardvote/vote|Głosuj]]
* [[Special:Boardvote/list|Pokaż listę głosów]]
* [[Special:Boardvote/dump|Zrzut zakodowanych danych wyborów]]",
	'boardvote_intro_change'  => "<p>Już głosowałeś w tych wyborach. Możesz jednak zmienić swoje głosy za pomocą poniższego formularza. Zaznacz kandydatów, na których głosujesz.</p>",
	'boardvote_entered'       => "Dziękujemy, twój głos został zapisany.

Jeśli chcesz, możesz zapisać poniższe informacje. Oto zapis twojego głosu:

<pre>$1</pre>

Został on zakodowany poniższym kluczem publicznym Koordynatorów Wyborów:

<pre>$2</pre>

Oto zakodowana wersja. Będzie ona publicznie wyświetlona w [[Special:Boardvote/dump|zrzucie danych]].

<pre>$3</pre>

[[Special:Boardvote/entry|Wstecz]]",
	'boardvote_notloggedin'   => "Nie jesteś zalogowany. Aby głosować musisz posiadać konto z wkładem minimum $1 edycji od $2 oraz pierwszą edycją wykonaną przed $3.",
	'boardvote_notqualified'  => "Niestety nie jesteś uprawniony do głosowania, ponieważ wykonałeś tylko $1 edycji. Aby móc głosować musisz mieć minimum $3 edycji wykonanych przed $2, a twoja pierwsza edycja powinna mieć miejsce przed $5. Swoją pierwszą edycję wykonałeś $4.",
	'boardvote_novotes'       => "Nikt jeszcze nie głosował.",
	'boardvote_time'          => "Czas",
	'boardvote_user'          => "Użytkownik",
	'boardvote_edits'         => "Edycje",
	'boardvote_days'          => "dni",
	'boardvote_ip'            => "IP",
	'boardvote_ua'            => "Klient",
	'boardvote_listintro'     => "<p>Oto lista wszystkich głosów oddanych jak dotąd. $1 dla zakodowanych danych.</p>",
	'boardvote_dumplink'      => "Kliknij tutaj",
	'boardvote_submit'        => 'zagłosuj',
	'boardvote_strike'        => "Skreślenie głosu",
	'boardvote_unstrike'      => "Przywrócenie głosu",
	'boardvote_needadmin'     => "Tylko koordynatorzy wyborów mogą wykonać tę akcję.",
	'boardvote_sitenotice'    => '<a href="{{localurle:Special:Boardvote/vote}}">Wybory Rady Powierniczej Fudacji Wikimedia</a>:  głosowanie otwarte do 21 września',
	'boardvote_notstarted'    => 'Głosowanie nie zostało jeszcze rozpoczęte',
	'boardvote_closed'        => 'Głosowanie zostało zakończone, niedługo [http://meta.wikimedia.org/wiki/Elections_for_the_Board_of_Trustees_of_the_Wikimedia_Foundation%2C_2006/Pl na stronie wyborów] pojawią się wyniki.',
	'boardvote_edits_many'    => 'dużo',
	'group-boardvote'         => 'Koordynatorzy wyborów',
	'group-boardvote-member'  => 'Koordynator wyborów',
);
$wgBoardVoteMessages['pms'] = array(
	'boardvote'               => 'Elession dël Consej ëd Gestion dla Fondassion Wikimedia',
	'boardvote_entry'         => '* [[Special:Boardvote/vote|Voté]]
* [[Special:Boardvote/list|Vardé ij vot ch\'a-i son al dì d\'ancheuj]]
* [[Special:Boardvote/dump|Dëscarié la version segretà dij vot]]',
	'boardvote_intro'         => '<blockquote>
<p>
Bin ëvnù a la quarta elession dël Consej ëd Gestion dla Wikimedia, visadì dl\'aotorità ch\'a la goèrna la Fondassion Wikimedia. I soma antramentr ch\'i votoma për sërne tre person-e ch\'a rapresento la comun-a dj\'utent dij vàire proget dla Wikimedia. Ste tre person-e ch\'a saran elegiùe a travajeran për doj agn ant ël Consej ëd Gestion. A giutëran a determiné le diression che ij proget dla Wikimedia a l\'avran ant lë vnì, tant pijait un për un che tuti ansema, e a rapresenteran j\'anteressi e ij but <em>dj\'eletor</em>. A l\'avran da decide coma fé dl\'incass për andé anans e coma spend-lo, antra vàire àotre ròbe.</p>

<p>Anans dë voté, për piasì ch\'as lesa bin ij programa dij candidà e lòn ch\'a l\'han arspondù a vàire question. Minca candidà a l\'é n\'utent ch\'a l\'é vagnasse sò rispet ant sël camp, ën dand-se da fé con sò temp e sò sfòrs a fé an manera che sti proget a fusso un pòst ch\'a fa piasì ess-ie, e ch\'a fusso motobin dedicà a arsërchè e a spantié a gràtis la conossensa dl\'òmo.</p>

<p>A peul voté për vàire candidà ch\'a veul. Ij tre candidà che a la fin dle fin a l\'avran pì \'d vot a saran elegiù. S\'a-i dovèissa mai riveie na parità as ciamërìa n\'elession supletiva antra coj ch\'a son a pari mèrit.</p>

<p>Për piasì, ch\'as visa ch\'a peul mach voté da \'nt un proget sol. Bele che se a l\'avèissa fait pì che 400 modìfiche an pì che un proget, lòn a vorerìa nen dì ch\'a peul voté doe vire. Se pì anans a vorèissa cambié sò vot a podrìa felo, ma sempe da \'nt ël proget d\'andova ch\'a l\'ha votà la prima vira.</p>

<p>Për savejne dë pì, ch\'a varda:</p>
<ul><li><a href="http://meta.wikimedia.org/wiki/Board_elections/2007/FAQ" class="external">Soèns an ciamo - Elession</a></li>
<li><a href="http://meta.wikimedia.org/wiki/Board_elections/2007/Candidates/en" class="external">Candidà</a></li></ul>
</blockquote>',
	'boardvote_intro_change'  => '<p>Chiel/Chila a l\'ha già votà. Comsëssìa, a peul sempe cambié sò vot ën dovrand la domanda ambelessì sota.
Për piasì, ch\'a-i buta la crosëtta ansima a le casele dij candidà ch\'a veul voté.</p>',
	'boardvote_entered'       => 'Motobin mersì, sò vot a l\'é stait registrà.

S\'a veul, a peul marchesse sò detaj dla votassion. Sò vot a resta:

<pre>$1</pre>

A l\'é stait butà via segretà con la ciav pùblica dj\'Aministrator dj\'Elession:

<pre>$2</pre>

Coma arzultà a në ven la version segretà ch\'i jë smonoma ambelessì sota. A resta smonù al pùblich ant sla pàgina [[Special:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|André]]',
	'boardvote_nosession'     => 'Ël sistema a-i la fa pa a determiné soa utensa ant la Wikimedia. Për piasì, ch\'a rintra ant ël sistema da \'nt la wiki andova ch\'a l\'ha drit ëd vot, e d\'ambelelì ch\'a vada a<nowiki>[[Special:Boardvote]]</nowiki>. A dev dovré un cont ch\'a l\'abia fait almanch $1 contribussion anans dël $2, e dont soa prima modìfica a sia staita faita anans dël $3.

Ch\'as visa ch\'a l\'ha dë regolé sò navigator (browser) an manera ch\'a pija ij cookies da \'nt la màchina serventa esterna dle votassion: \'\'\'wikimedia.spi-inc.org\'\'\'.',
	'boardvote_notloggedin'   => 'A l\'é anco\' pa rintra ant ël sistema. Për voté a venta dovré un cont con almanch $1 modìfiche faite anans dij $2, e dont prima modìfica a la sia staita faita anans dij $3.',
	'boardvote_notqualified'  => 'Chiel a l\'ha nen drit al vot an st\'elession-sì. Un për podej voté a dev avej fait almanch $3 modìfiche anans dël $2, e soa prima modìfica a dovrìa esse staita faita anans dël $5.',
	'boardvote_novotes'       => 'A l\'ha anco\' pa votà gnun.',
	'boardvote_user'          => 'Utent',
	'boardvote_edits'         => 'Modìfiche',
	'boardvote_days'          => 'Dì',
	'boardvote_ua'            => 'Agent dl\'utent',
	'boardvote_listintro'     => '<p>Sòn a l\'é la lista ëd tuti ij vot ch\'a son ëstait registrà al dì d\'ancheuj. $1 për ës-ciairé ij dat segretà.</p>',
	'boardvote_dumplink'      => 'Ch\'a-i bata ansima a sossì',
	'boardvote_submit'        => 'Bin parèj',
	'boardvote_strike'        => 'Gava ës vot-sì',
	'boardvote_unstrike'      => 'Gava via l\'anulament',
	'boardvote_needadmin'     => 'Sossì a peulo felo mach j\'aministrator dj\'elession.',
	'boardvote_sitenotice'    => '<a href="{{localurle:Special:Boardvote/vote}}">Elession dël Consej ëd Gestion dla Wikimedia</a>:  vot doèrt fin-a ij 12 ëd Luj',
	'boardvote_notstarted'    => 'Ël vot a l\'é anco\' pa doèrt',
	'boardvote_closed'        => 'La votassion a l\'é già sarà, ch\'a varda [http://meta.wikimedia.org/wiki/Elections_for_the_Board_of_Trustees_of_the_Wikimedia_Foundation%2C_2006/Pms la pàgina dj\'elession] antra nen vàire për vëdde j\'arzultà.',
	'boardvote_edits_many'    => 'vàire',
	'group-boardvote'         => 'Comità Eletoral',
	'group-boardvote-member'  => 'Comissari eletoral',
	'grouppage-boardvote'     => '{{ns:project}}:Comissari eletoral',
	'boardvote_blocked'       => 'Ch\'a në scusa, ma chiel/chila a l\'é stait(a) blocà ansima a la wiki andova a l\'é registrà. J\'utent blocà as ësmon-o sò drit ëd vot.',
	'boardvote_welcome'       => 'Bin ëvnù(a) \'\'\'$1\'\'\'!',
	'go_to_board_vote'        => 'Elession dël Consej ëd Gestion dla Wikimedia dël 2007',
	'boardvote_redirecting'   => 'Për na question a sigurëssa e trasparensa, ël vot as fa ansima a na màchina esterna, controlà daspërchila da an manera andipendenta.
A sarà ëmnà a sta màchina esterna antra 20 second. [$1 Ch;a bata ambelessì] për tramudesse prima.

Ch\'a ten-a da ment che ën bogiandse a peul arsèive n\'avis dla sigurëssa ëd sò calcolator, rësgoard a un certificà sensa firma.',
);
$wgBoardVoteMessages['pt'] = array(
	'boardvote'               => "Eleições para o Comité da Fundação Wikimedia",
	'boardvote_entry'         => "<!--* [[Special:Boardvote/vote|Votar]]-->
* [[Special:Boardvote/list|Listar votos por data]]
* [[Special:Boardvote/dump|Dados encriptados da eleição]]",
	'boardvote_intro'         => "
<p>Bem-vindo à segunda edição das eleições para o Comité da Fundação Wikimedia. A votação irá designar duas pessoas para representar a comunidade de utilizadores nos vários projectos Wikimedia. Essas duas pessoas irão ajudar a determinar a orientação futura a seguir pelos projectos Wikimedia, individualmente ou como um todo, e representar os <em>seus</em> interesses e preocupações em relação ao Comité. Irão, também, tomar as decisões respeitantes ao financiamento e alocação de fundos.</p>

<p>Por favor, leia cuidadosamente os discursos dos candidatos e respostas a perguntas antes de votar. Cada um dos candidatos é um utilizador respeitado, consideravelmente em tempo e dedicação para tornar estes projectos um ambiente acolhedor empenhado na procura e livre distribuição do conhecimento humano.</p>

<p>Poderá votar em tantos candidatos quantos desejar. O candidato que apurar mais votos em cada posição será declarado vencedor dessa posição. Em caso de empate, serão lançadas votações para desempate.</p>

<p>Para mais informações, consulte:</p>
<ul><li><a href=\"http://meta.wikimedia.org/wiki/Election_FAQ_2006\" class=\"external\">FAQ de eleição</a></li>
<li><a href=\"http://meta.wikimedia.org/wiki/Election_Candidates_2006\" class=\"external\">Candidatos</a></li></ul>
",
	'boardvote_intro_change'  => "<p>Já votou anteriormente. Contudo pode alterar o seu voto utilizando o formulário abaixo. Por favor marque a caixa ao lado de cada candidato que aprovar.</p>",
	'boardvote_entered'       => "Obrigado, o seu voto foi registado.

Se desejar pode guardar os seguintes detalhes. O seu registo de voto é:

<pre>$1</pre>

Foi encriptado com a chave pública dos Administradores da Eleição:

<pre>$2</pre>

A versão da encriptação segue-se, e será publicada em [[Especial:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|Voltar]]",
	'boardvote_notloggedin'   => "Não se encontra autentificado. De modo a poder votar, deve utilizar uma conta com pelo menos $1 contribuições antes de $2.",
	'boardvote_notqualified'  => "Desculpe, mas só fez $1 edições antes de $2. Precisa de ter no mínimo $3 edições de modo a poder votar.",
	'boardvote_novotes'       => "Ninguém votou até ao momento.",
	'boardvote_time'          => "Data",
	'boardvote_user'          => "Utilizador",
	'boardvote_edits'         => "Contribuições",
	'boardvote_days'          => "Dias",
	'boardvote_ip'            => "IP",
	'boardvote_ua'            => "Agente do utilizador",
	'boardvote_listintro'     => "<p>Esta é uma lista de todos votos registados até à data. $1 para os dados encriptados.</p>",
	'boardvote_dumplink'      => "Clique aqui",
	'boardvote_strike'        => "Riscar",
	'boardvote_unstrike'      => "Limpar risco",
	'boardvote_needadmin'     => "Apenas administradores podem efectuar esta operação.",
	'boardvote_sitenotice'    => "<a href=\"{{localurle:Especial:Boardvote/vote}}\">Comité da Fundação Wikimedia</a>: Votação aberta até 12 de Julho",
	'boardvote_closed'        => 'As eleições estão agora encerradas, ver [http://meta.wikimedia.org/wiki/Elections_for_the_Board_of_Trustees_of_the_Wikimedia_Foundation%2C_2006/Pt a página de eleições para os resultados] brevemente.',
	'boardvote_edits_many'    => 'muitos',
	'group-boardvote'         => 'Board vote administradores',
	'group-boardvote-member'  => 'Board vote administrador',
	'grouppage-boardvote'     => '{{ns:project}}:Board vote admin',
);
$wgBoardVoteMessages['ru'] = array(
	'boardvote'               => "Выборы в Совет поверенных фонда «Викимедиа»",
	'boardvote_entry'         => "* [[Special:Boardvote/vote|Проголосовать]]
* [[Special:Boardvote/list|Посмотреть список уже проголосовавших]]
* [[Special:Boardvote/dump|Посмотреть зашифрованную запись голосов]]",
	'boardvote_intro'         => "
<p>Добро пожаловать на выборы в Совет поверенных фонда «Викимедиа». Мы голосуем с целью избрать двух представителей сообществ участников различных проектов Викимедиа. Они должны будут помогать нам определить вектор будущего развития проектов Викимедиа и представлять <em>ваши</em> интересы в Совете поверенных. Они призваны решать проблемы привлечения финансирования и размещения привлеченных ресурсов.</p>

<p>Пожалуйста, внимательно прочитайте заявления кандидатов и ответы на вопросы прежде чем голосовать. Все кандидаты — уважаемые пользователи, пожертвовавшие существенным временем и усилиями, чтобы улучшить наши проекты и сделать их привлекательной средой, цель которой поиск и свободное распространение знаний человечества.</p>

<p>Вы можете голосовать за любое число кандидатов. Кандидат, набравший наибольшее число голосов на любую из двух позиций, будет объявлен победителем в выборах на эту позицию. В случае равенства кандидатов будет проведено повторное голосование с выбыванием наименее популярных кандидатов.</p>

<p>Дополнительная информация:</p>
<ul><li><a href=\"http://meta.wikimedia.org/wiki/Election_FAQ_2006\" class=\"external\">Часто задаваемые вопросы о выборах</a></li> <li><a href=\"http://meta.wikimedia.org/wiki/Election_Candidates_2006/Ru\" class=\"external\">Кандидаты</a></li></ul>
",
	'boardvote_intro_change'  => "<p>Вы уже проголосовали. Тем не менее, с помощью приведённой ниже формы вы можете изменить свое решение. Пожалуйста, отметьте тех кандидатов, кандидатуры которых вы поддерживаете.</p>",
	'boardvote_entered'       => "Спасибо, ваш голос учтён.

При желании, вы можете записать следующую информацию. Номер вашего бюллетеня:

<pre>$1</pre>

Он зашифрован с открытым ключом администрации выборов:

<pre>$2</pre>

Зашифрованный текст приведен ниже. Любой желающий сможет найти его на странице [[Special:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|Назад]]",
	'boardvote_notloggedin'   => "Вы не представились. Чтобы проголосовать, вы должны быть зарегистрированным пользователем и сделать не менее $1 правок до $2, первая правка должна быть до $3.",
	'boardvote_notqualified'  => "Извините, на вашем счету лишь $3 правок до $2. Необходимо как минимум $1 для участия в голосовании. Ваше первая правка была сделана $4, к голосованию допускаются только участники сделавшие первую правку до $5.",
	'boardvote_novotes'       => "Никто ещё не проголосовал. ",
	'boardvote_time'          => "Время",
	'boardvote_user'          => "Участник",
	'boardvote_edits'         => "Число правок",
	'boardvote_days'          => "Дни",
	'boardvote_ip'            => "IP",
	'boardvote_ua'            => "Браузер",
	'boardvote_listintro'     => "<p>Это список всех принятых на данный момент бюллетеней для голосования. В зашифрованном виде они доступны $1.</p>",
	'boardvote_dumplink'      => "здесь",
	'boardvote_submit'        => 'OK',
	'boardvote_strike'        => "Зачеркнуть",
	'boardvote_unstrike'      => "Убрать зачёркивание",
	'boardvote_needadmin'     => "Эта операция доступна только администрации выборов.",
	'boardvote_sitenotice'    => "<a href=\"{{localurle:Special:Boardvote/vote}}\">Выборы в Совет поверенных фонда «Викимедиа»</a>: Голосование открыто до 12 июля",
	'boardvote_notstarted'    => 'Голосование ещё не началось',
	'boardvote_closed'        => 'Голосование окончено, см. [[m:Elections for the Board of Trustees of the Wikimedia Foundation, 2006/En|страницу результатов]].',
	'boardvote_edits_many'    => 'много',
	'group-boardvote'         => 'Члены избиркома',
	'group-boardvote-member'  => 'член избиркома',
	'grouppage-boardvote'     => '{{ns:project}}:Член избиркома',
);
$wgBoardVoteMessages['sr-ec'] = array(
	'boardvote'               => "Избор за Одбор повереника Викимедија Фондације",
	'boardvote_entry'         => "* [[Special:Boardvote/vote|Vote]]
* [[Special:Boardvote/list|Списак гласова до датума]]
* [[Special:Boardvote/dump|Енкриптован запис гласања]]",
	'boardvote_intro'         => "
<p>Добро дошли на треће изборе за Викимедијин Одбор повереника.
Гласамо за једну особу која би представљала заједницу корисника разних Викимедијиних пројеката.
Она ће помоћи да се утврди будући смер којим ће Викимедијини пројекти да се крећу,
индивидуално и као група, и представљаће <em>ваше</em> интересе и бриге Одбору повереника.
Одлучиће како да се стварају приноси и како да се расподели прикупљен новац.</p>

<p>Молимо прочитајте изјаве кандидата и одговоре на претраге пажљиво пре него што гласате.
Сваки од кандидата је поштовани корисник, који је допринео значајним временом и напорима да
ови пројекти буду добродошло окружење са слободном дистрибуцијом људског знања као циљем.</p>

<p>Можете гласати за онолико кандидата за колико желите. Кандидат са највише гласова у сваком положају
ће бити проглашени победником тог положаја. У случају нерешеног, ново гласање ће бити одржано.</p>

<p>За више информација, погледајте:</p>
<ul><li><a href=\"http://meta.wikimedia.org/wiki/Election_FAQ_2006\" class=\"external\">Најчешће постављена питања избора</a></li>
<li><a href=\"http://meta.wikimedia.org/wiki/Election_Candidates_2006\" class=\"external\">Кандидати</a></li></ul>
",
	'boardvote_intro_change'  => "<p>Гласали сте раније. Међутим, можете променити ваш глас користећи формулар испод.
Молимо одаберите кандидате за које гласате.</p>",
	'boardvote_footer'        => "&nbsp;", # Don't translate this
	'boardvote_entered'       => "Хвала вам, ваш глас је снимљен.

Уколико желите, можете сачувати следеће детаље. Ваше гласачки снимак је:

<pre>$1</pre>

Шифриран је јавним кључем администратора гласања:

<pre>$2</pre>

Следи резултујућа шифрирана верзија. Биће јавно представљена на [[Special:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|Назад]]",
	'boardvote_notloggedin'   => "Нисте пријављени. Да бисте гласали, морате да имате налог са бар $1 измена пре $2, где је прва измена пре $3.",
	'boardvote_notqualified'  => "Жао нам је, нисте квалификовани да гласате на овом избору. Морате да имате овде бар $3 измена пре $2, а ви имате $1. Такође, ваша прва измена на овом викију је била у $4, а треба да буде пре $5.",
	'boardvote_novotes'       => "Још нико није гласао.",
	'boardvote_time'          => "Време",
	'boardvote_user'          => "Корисник",
	'boardvote_edits'         => "Измена",
	'boardvote_days'          => "Дана",
	'boardvote_ip'            => "ИП",
	'boardvote_ua'            => "Кориснички агент",
	'boardvote_listintro'     => "<p>Ово је списак свих гласова који су снимљени до сада. $1 за шифриране податке.</p>",
	'boardvote_dumplink'      => "Кликните овде",
	'boardvote_submit'        => 'У реду',
	'boardvote_strike'        => "Прецртано",
	'boardvote_unstrike'      => "Непрецртано",
	'boardvote_needadmin'     => "Само администратори гласања могу да изводе ову операцију.",
	'boardvote_sitenotice'    => "<a href=\"{{localurle:Special:Boardvote/vote}}\">Избори за Викимедијин Одбор</a>:  Гласање отворено до 21. септембра",
	'boardvote_notstarted'    => 'Гласање још није почело',
	'boardvote_closed'        => 'Гласање је завршено, погледајте [http://meta.wikimedia.org/wiki/Elections_for_the_Board_of_Trustees_of_the_Wikimedia_Foundation%2C_2006/En страницу за гласање за резултате] ускоро.',
	'boardvote_edits_many'    => 'много',
	'group-boardvote'         => 'изборна комисија',
	'group-boardvote-member'  => 'изборна комисија',
	'grouppage-boardvote'     => '{{ns:project}}:Администратор гласања за Одбор',
);
$wgBoardVoteMessages['sr-el'] = array(
	'boardvote'               => "Izbor za Odbor poverenika Vikimedija Fondacije",
	'boardvote_entry'         => "* [[Special:Boardvote/vote|Vote]]
* [[Special:Boardvote/list|Spisak glasova do datuma]]
* [[Special:Boardvote/dump|Enkriptovan zapis glasanja]]",
	'boardvote_intro'         => "
<p>Dobro došli na treće izbore za Vikimedijin Odbor poverenika.
Glasamo za jednu osobu koja bi predstavljala zajednicu korisnika raznih Vikimedijinih projekata.
Ona će pomoći da se utvrdi budući smer kojim će Vikimedijini projekti da se kreću,
individualno i kao grupa, i predstavljaće <em>vaše</em> interese i brige Odboru poverenika.
Odlučiće kako da se stvaraju prinosi i kako da se raspodeli prikupljen novac.</p>

<p>Molimo pročitajte izjave kandidata i odgovore na pretrage pažljivo pre nego što glasate.
Svaki od kandidata je poštovani korisnik, koji je doprineo značajnim vremenom i naporima da
ovi projekti budu dobrodošlo okruženje sa slobodnom distribucijom ljudskog znanja kao ciljem.</p>

<p>Možete glasati za onoliko kandidata za koliko želite. Kandidat sa najviše glasova u svakom položaju
će biti proglašeni pobednikom tog položaja. U slučaju nerešenog, novo glasanje će biti održano.</p>

<p>Za više informacija, pogledajte:</p>
<ul><li><a href=\"http://meta.wikimedia.org/wiki/Election_FAQ_2006\" class=\"external\">Najčešće postavljena pitanja izbora</a></li>
<li><a href=\"http://meta.wikimedia.org/wiki/Election_Candidates_2006\" class=\"external\">Kandidati</a></li></ul>
",
	'boardvote_intro_change'  => "<p>Glasali ste ranije. Međutim, možete promeniti vaš glas koristeći formular ispod.
Molimo odaberite kandidate za koje glasate.</p>",
	'boardvote_footer'        => "&nbsp;", # Don't translate this
	'boardvote_entered'       => "Hvala vam, vaš glas je snimljen.

Ukoliko želite, možete sačuvati sledeće detalje. Vaše glasački snimak je:

<pre>$1</pre>

Šifriran je javnim ključem administratora glasanja:

<pre>$2</pre>

Sledi rezultujuća šifrirana verzija. Biće javno predstavljena na [[Special:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|Nazad]]",
	'boardvote_notloggedin'   => "Niste prijavljeni. Da biste glasali, morate da imate nalog sa bar $1 izmena pre $2, gde je prva izmena pre $3.",
	'boardvote_notqualified'  => "Žao nam je, niste kvalifikovani da glasate na ovom izboru. Morate da imate ovde bar $3 izmena pre $2, a vi imate $1. Takođe, vaša prva izmena na ovom vikiju je bila u $4, a treba da bude pre $5.",
	'boardvote_novotes'       => "Još niko nije glasao.",
	'boardvote_time'          => "Vreme",
	'boardvote_user'          => "Korisnik",
	'boardvote_edits'         => "Izmena",
	'boardvote_days'          => "Dana",
	'boardvote_ip'            => "IP",
	'boardvote_ua'            => "Korisnički agent",
	'boardvote_listintro'     => "<p>Ovo je spisak svih glasova koji su snimljeni do sada. $1 za šifrirane podatke.</p>",
	'boardvote_dumplink'      => "Kliknite ovde",
	'boardvote_submit'        => 'U redu',
	'boardvote_strike'        => "Precrtano",
	'boardvote_unstrike'      => "Neprecrtano",
	'boardvote_needadmin'     => "Samo administratori glasanja mogu da izvode ovu operaciju.",
	'boardvote_sitenotice'    => "<a href=\"{{localurle:Special:Boardvote/vote}}\">Izbori za Vikimedijin Odbor</a>:  Glasanje otvoreno do 21. septembra",
	'boardvote_notstarted'    => 'Glasanje još nije počelo',
	'boardvote_closed'        => 'Glasanje je završeno, pogledajte [http://meta.wikimedia.org/wiki/Elections_for_the_Board_of_Trustees_of_the_Wikimedia_Foundation%2C_2006/En stranicu za glasanje za rezultate] uskoro.',
	'boardvote_edits_many'    => 'mnogo',
	'group-boardvote'         => 'izborna komisija',
	'group-boardvote-member'  => 'izborna komisija',
	'grouppage-boardvote'     => '{{ns:project}}:Administrator glasanja za Odbor',
);

$wgBoardVoteMessages['sr'] = $wgBoardVoteMessages['sr-ec'];

$wgBoardVoteMessages['su'] = array(
	'boardvote'               => 'Saémbara Anggota Déwan Kapercayaan Yayasan Wikimedia',
	'boardvote_novotes'       => 'Acan aya pamilih.',
	'boardvote_time'          => 'Wanci',
	'boardvote_user'          => 'Pamaké',
	'boardvote_edits'         => 'Édit',
	'boardvote_days'          => 'Poé',
	'boardvote_dumplink'      => 'Klik di dieu',
	'boardvote_submit'        => 'Kintun',
	'boardvote_unstrike'      => 'Hapus nu dicoret',
	'boardvote_needadmin'     => 'Ngan kuncén saémbara nu bisa ngalakukeun ieu.',
	'boardvote_notstarted'    => 'Saémbara can dimimitian',
	'boardvote_closed'        => 'Saémbara geus ditutup, tempo [http://meta.wikimedia.org/wiki/Elections_for_the_Board_of_Trustees_of_the_Wikimedia_Foundation%2C_2006/En kaca saémbara keur hasilna] teu lila.',
	'boardvote_edits_many'    => 'loba',
	'group-boardvote'         => 'Kuncén saémbara anggota dewan',
	'group-boardvote-member'  => 'Kuncén saémbara anggota dewan',
	'grouppage-boardvote'     => '{{ns:project}}:Kuncén saémbara anggota dewan',
);

$wgBoardVoteMessages['sv'] = array(
	'boardvote'               => "Val till Wikimedias styrelse (Wikimedia Board of Trustees)",
	'boardvote_entry'         => "* [[m:Election_candidates_2006/Sv|Kandidaternas presentationer]]
* [[Special:Boardvote/vote|Rösta]]
* [[Special:Boardvote/list|Lista röster]]
* [[Special:Boardvote/dump|Dumpa krypterad röstpost]]",
	'boardvote_intro'         => "<p>Välkommen till det tredje valet till Wikimedia Foundations styrelse. Vi ska välja en person som ska representera wikigemenskapen, det vill säga användarna på de olika Wikimedia-projekten. Denna person ska, tillsammans med styrelsens andra användarrepresentant, hjälpa till att bestämma Wikimediaprojektens framtida inriktning vart för sig och som grupp, och i styrelsen representera <em>dina</em> intressen och bekymmer. Styrelsen ska besluta om sätt att få in pengar och hur dessa ska fördelas.</p>

<p>Innan du röstar, läs kandidaternas programförklaringar och deras svar på andra användares frågor. Alla kandidaterna är respekterade anvädnare som lagt ner åtskillig tid och möda för att göra projekten till en välkomnande miljö, ägnat åt inskaffande och fri spridning av mänsklig kunskap.</p>

<p>Du kan rösta på så många kandidater som du önskar. Den kandidat som fått flest röster kommer att bli vald. Om det skulle bli oavgjort mellan några kandidater, kommer en extra valomgång att arrangeras.</p>

<p>En påminnelse: du får bara rösta en gång. Även om du har 400 redigeringar på flera olika projekt, innebär inte det att du har rätt att rösta flera gånger. Om du vill ändra din röst innan valet är slut, var snäll gör det från det projekt som du tidigare röstat ifrån.</p>

<p>Mera information hittas på:</p>
<ul><li><a href=\"http://meta.wikipedia.org/wiki/Election_FAQ_2006/Sv\" class=\"external\">Vanliga frågor</a></li>
<li><a href=\"http://meta.wikipedia.org/wiki/Election_candidates_2006/Sv\" class=\"external\">Kandidaterna</a></li></ul>",
	'boardvote_intro_change'  => "<p>Du har redan röstat. Emellertid kan du ändra din röst genom att använda nedanstående formulär. Var god markera rutorna invid de kandidater du röstar på.</p>

<ul><li><a href=\"http://meta.wikimedia.org/wiki/Election_candidates_2006/Sv\" class=\"external\">Kandidaternas presentationer</a></li>",
	'boardvote_entered'       => "Tack för det. Din röst är registrerad.

Om du så önskar, kan du notera följande detaljer. Din röst är registrerad som :

<pre>$1</pre>

Den är krypterad med valadministratörernas publika nyckel:

<pre>$2</pre>

Den resulterande krypterade versionen följer här. Den kommer att visas öppet på [[Special:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|Tillbaka]]",
	'boardvote_notloggedin'   => "Du är inte inloggad. För att rösta måste du ha ett konto med minst $1 bidrag före $2.",
	'boardvote_notqualified'  => "Tyvärr har du enbart gjort $1 redigeringar före $2. Du måste ha minst $3 redigeringar för att få rösta.

Om du fick detta meddelande trots att du '''har gjort''' fler än $1 redigeringar i ett Wikimediaprojekt, v g försäkra dig om att du röstar från rätt projekt.",
	'boardvote_novotes'       => "Ingen har röstat ännu.",
	'boardvote_time'          => "Tid",
	'boardvote_user'          => "Användare",
	'boardvote_edits'         => "Redigeringar",
	'boardvote_listintro'     => "<p>Det här är en lista över alla röster som har registrerats hittills.
$1 för de krypterade uppgifterna.</p>",
	'boardvote_dumplink'      => "Klicka här",
	'boardvote_needadmin'     => "Endast valadministratörer kan utföra denna operation.",
	'boardvote_sitenotice'    => "<a href=\"{{localurle:Special:Boardvote/vote}}\">Styrelseval i Wikimediastiftelsen</a>:  Valet pågår till och med den 12 juli kl 02:00 (CEST)",
);
$wgBoardVoteMessages['wa'] = array(
	'boardvote' => 'Vôtaedje po les manaedjeus del fondåcion Wikimedia',
	'boardvote_entry' => '* [[Special:Boardvote/vote|Vôter]]
* [[Special:Boardvote/list|Djivêye des vôtaedjes dedja fwaits]]
* [[Special:Boardvote/dump|Djiveye des bultins]] (tchaeke bultin est on blok ecripté)',
	'boardvote_intro' => '<p>
Bénvnowe å prumî vôtaedje po les manaedjeus del fondåcion Wikimedia.
Li vôtaedje c\' est po tchoezi deus djins ki cåzront å consey des manaedjeus po les contribouweus des diferins pordjets Wikimedia k\' overnut félmint po lzès fé viker:
on <strong>rprezintant des mimbes ki sont des contribouweus actifs</strong>,
eyet on <strong>rprezintant des uzeus volontaires</strong>.
Il aidront a defini l\' voye ki prindront les pordjets Wikimedia, ossu bén tchaeke pordjet ki zels tos come groupe, dj\' ô bén k\' i rprezintèt <em>vos</em> interesses divant l\' consey des manaedjes. I decidront so des sudjets come l\' ecwårlaedje eyet l\' atribouwaedje des çanses ås diferinnès bouyes.
</p>

<p>
Prindoz s\' i vs plait li tins di bén lére li prezintaedje di tchaesconk des candidats dvant d\' vôter.
Tchaeke des candidats est èn uzeu respecté del kiminaalté, k\' a contribouwé bråmint do tins eyet ds efoirts po fé di ces pordjets èn evironmint amiståve ey ahessåve, et ki croeyèt fel å franc cossemaedje del kinoxhaence amon l\' djin.
</p>

<p>
Vos ploz vôter po ostant d\' candidats ki vos vloz dins tchaeke plaece.
Li candidat avou l\' pus d\' vwès po tchaeke plaece serè rclamé wangneu
Dins l\' cas k\' i gn årè ewalisté inte deus prumîs candidats, on deujhinme vôtaedje serè fwait po les dispårti.
</p>

<p>
Po pus di racsegnes, loukîz a:
</p>
<ul>
<li><a href="http://meta.wikimedia.org/wiki/Election_FAQ" class="external">FAQ sol vôtaedje</a> (en inglès)</li>
<li><a href="http://meta.wikimedia.org/wiki/Election_Candidates" class="external">Candidats</a></li>
</ul>',
	'boardvote_intro_change' => '<p>
Vos avoz ddja voté.
Mins vos ploz tot l\' minme candjî vosse vôte, po çoula
rifjhoz ene tchuze tot clitchant so les boesses a clitchîz des
candidats ki vos estoz d\' acoird avou zels.
</p>',
	'boardvote_entered' => 'Gråces, vosse vôtaedje a stî conté.

Si vos vloz, vos ploz wårder les informåcions shuvantes.
Vosse bultin a stî eredjîstré come:

<pre>$1</pre>

Il a stî ecripté avou l\' clé publike des manaedjeus do vôtaedje:

<pre>$2</pre>

Vosse bultins ecripté est chal pa dzo. Tos les bultins ecriptés polèt
esse publicmint veyous so [[Special:Boardvote/dump]].

<pre>$3</pre>

[[Special:Boardvote/entry|En erî]]',
	'boardvote_notloggedin' => 'Vos n\' estoz nén elodjî.
Po pleur vôter vos dvoz esse elodjî eyet vosse conté
doet aveur stî ahivé i gn a 90 djoûs pol moens.',
	'boardvote_notqualified' => 'Dji rgrete, mins vosse prumî contribouwaedje a stî fwait
i gn a $1 djoûs seulmint.
Po pleur vôter vos dvoz aveur contribouwé po pus long ki
90 djoûs.',
	'boardvote_novotes' => 'I gn a co nolu k\' a vôté.',
	'boardvote_time' => 'Date ey eure',
	'boardvote_user' => 'Uzeu',
	'boardvote_edits' => 'Contribs',
	'boardvote_days' => 'Djoûs',
	'boardvote_listintro' => '<p>Çouchal, c\' est ene djivêye di totes les djins
k\' ont ddja vote disk\' asteure.
$1 po les dnêyes sourdant des bultins.</p>',
	'boardvote_dumplink' => 'Clitchîz chal',
);
$wgBoardVoteMessages['yue'] = array(
	'boardvote'               => "Wikimedia理事委員會選舉",
	'boardvote_entry'         => "* [[Special:Boardvote/vote|投票]]
* [[Special:Boardvote/list|列示至今已經投咗票嘅投票]]
* [[Special:Boardvote/dump|選舉記錄傾印]]",
	'boardvote_intro'         => "
<p>歡迎嚟到Wikimedia理事委員會嘅第二次選舉。我哋而家去為我哋嘅Wikimedia計劃進行投票，選出兩位人兄。佢哋會幫手去決定Wikimedia計劃將來嘅發展方向，無論個人定係團體，係畀理事委員之中代表<em>你</em>嘅興趣同埋關懷。另外佢哋會決定點樣運用所得來嘅錢同埋點樣整收入。</p>

<p>響投票之前，請小心咁去睇吓有關候選人嘅表達同埋有關嘅回應。每一個候選人係一位受到尊重嘅用戶，佢哋係用咗唔少時間同埋動力去令到呢啲計劃繼續進行到一個受歡迎嘅環境同埋自由咁發放人類嘅知識。</p>

<p>你可以向幾多位候選人投票都得。響每個位置中獲得最多票數嘅候選人會成為優勝者。如果有打和嘅情況，會另設決勝回合。</p>

<p>要睇更多嘅資料，睇吓：</p>
<ul><li><a href=\"http://meta.wikimedia.org/wiki/Election_FAQ_2006\" class=\"external\">選舉FAQ</a></li>
<li><a href=\"http://meta.wikimedia.org/wiki/Election_Candidates_2006\" class=\"external\">候選人</a></li></ul>
",
	'boardvote_intro_change'  => "<p>你已經投咗票。
但係你可以利用下面嘅表格去改你嘅投票。請響每一位心目中嘅候選人打剔。</p>",
	'boardvote_entered'       => "多謝，你嘅投票已經被記錄落嚟。

如果你想記低你嘅投票記錄，你可以記住你嘅投票記錄。你嘅投票記錄係：

<pre>$1</pre>

佢係利用選舉管理員嘅公眾匙嘅信息：

<pre>$2</pre>

所加密嘅結果響下面列示。佢會響[[Special:Boardvote/dump]]度畀公眾顯示。

<pre>$3</pre>

[[Special:Boardvote/entry|返去]]",
	'boardvote_nosession'     => "我唔知你嘅維基媒體用戶ID。 唔該登入你合資格嘅維基，然後去嗰度嘅<nowiki>[[Special:Boardvote]]</nowiki>。你要喺$2之前要有至少$1次編輯，第一次編輯要早過$3。",
	'boardvote_notloggedin'   => "你仲未登入。要投票，你一定要用一個響$2之前最少有$1次貢獻，而且響$3之前作第一次編輯嘅戶口。",
	'boardvote_notqualified'  => "你仲未有資格響呢次選舉度投票。你需要用響$2之前最少有$1次編輯，你而家有$1次編輯。而且，你嘅第一次編輯響$4，佢係需要響$5之前。",
	'boardvote_novotes'       => "仲未有人投票。",
	'boardvote_time'          => "時間",
	'boardvote_user'          => "用戶",
	'boardvote_edits'         => "編輯數",
	'boardvote_days'          => "日",
	'boardvote_ip'            => "IP",
	'boardvote_ua'            => "用戶代理",
	'boardvote_listintro'     => "<p>嘅個係到而家所被記錄落嚟嘅全部票數嘅名單。
$1去睇加密嘅資料。</p>",
	'boardvote_dumplink'      => "撳呢度",
	'boardvote_submit'        => 'OK',
	'boardvote_strike'        => "刪除綫",
	'boardvote_unstrike'      => "取消刪除綫",
	'boardvote_needadmin'     => "只有選舉管理員可以執行呢一個操作。",
	'boardvote_sitenotice'    => "<a href=\"{{localurle:Special:Boardvote/vote}}\">Wikimedia理事委員會選舉</a>：投票開放到9月20日",
	'boardvote_notstarted'    => '投票仲未開始',
	'boardvote_closed'        => '投票已經結束咗，請響之後睇吓[http://meta.wikimedia.org/wiki/Elections_for_the_Board_of_Trustees_of_the_Wikimedia_Foundation%2C_2006/En 選舉頁嘅結果]。',
	'boardvote_edits_many'    => '好多',
	'group-boardvote'         => '理事會投票管理員',
	'group-boardvote-member'  => '理事會投票管理員',
	'grouppage-boardvote'     => '{{ns:project}}:理事會投票管理員',
	'boardvote_blocked'       => '對唔住，響你註冊咗嘅維基度，你被封住咗。封住咗嘅用戶係唔畀投票嘅。',
	'boardvote_welcome'       => "'''$1'''，歡迎你！",
	'go_to_board_vote'        => 'Wikimedia理事委員會選舉2007',
	'boardvote_redirecting'   => '為咗好啲嘅保安同埋透明度，我哋用一個外置、獨立控制嘅伺服器去搞呢次嘅投票。

20秒之內你會彈去呢個外置伺服器。如果你想即刻去，就[$1 撳呢度]。

你有可能會收到一個安全警告，話個憑證冇簽到。',
);
$wgBoardVoteMessages['zh-classical'] = array(
	'boardvote_time'          => "時辰",
	'boardvote_user'          => "編者",
	'boardvote_submit'        => '確定',
);
$wgBoardVoteMessages['zh-hans'] = array(
	'boardvote'               => "维基媒体基金会理事会选举",
	'boardvote_entry'         => "* [[Special:Boardvote/vote|参与投票]]
* [[Special:Boardvote/list|至今已投票列表]]
* [[Special:Boardvote/dump|加密的选举数据]]",
	'boardvote_intro'         => "
<p>欢迎参与维基媒体基金会理事会第三届选举。我们将选出一人，代表各维基计划的用户社群。他/她将独力或与团队一起，帮助决定维基媒体计划的未来走向，同时在理事会中代表<b>你</b>的利益及考虑。他/她会决定创造收入的方式，及募得款项的分配。</p>

<p>请在投票前，仔细阅读参选人陈述及对质问的回应。每位参选人都是受尊重的用户，贡献了相当多的时间与精力来营造维基计划的友善环境，使其为人类知识的追求及自由分散服务。</p>

<p>你可以投票给任意多个参选人。得票最多的参选人将会公布为胜选。若最高票数相同，他们将进入第二轮选举。</p>

<p>请留意，你有且只有一票。即便你在多个计划有超过400次编辑，你仍只可投一票。若你要改变投票选择，请在原投票计划处修改。</p>
<p>更多信息，见：</p>
<ul><li><a href=\"http://meta.wikipedia.org/wiki/Election_FAQ_2006\" class=\"external\">选举的常见问题解答</a></li>
<li><a href=\"http://meta.wikipedia.org/wiki/Election_Candidates_2006\" class=\"external\">参选人</a></li></ul>
",
	'boardvote_intro_change'  => "<p>你已经参与过投票。但是你还可以在下面修改你的投票。请勾选你所支持的候选人名字的选择框。</p>",
	'boardvote_entered'       => "谢谢您，您的投票已经被记录。

您可以记录下以下详情。您的投票记录是：

<pre>$1</pre>

已经用选举管理员的公钥加密。

<pre>$2</pre>

以下是加密后的版本。它将在[[Special:Boardvote/dump]]列表中公开展示。

<pre>$3</pre>

[[Special:Boardvote/entry|返回]]",
	'boardvote_nosession'     => "我不能确定您的维基媒体账户名称。请您登入到合乎资格的维基计划，然后转到 <nowiki>[[Special:Boardvote]]</nowiki>。您必须用一个账户，在 $2 以前有 $1 次编辑，而且其首次编辑必须在 $3 以前。",
	'boardvote_notloggedin'   => "您还没有登录。要参与投票，您必须在$2之前至少贡献了$1次以上，而且在$3前作出第一次编辑。",
	'boardvote_notqualified'  => "抱歉，您在$2之前只有$1次贡献。 您必须至少贡献了$3次以上才可以参与本次投票。而且，您的第一次编辑是在$4，这需要在$5之前。",
	'boardvote_novotes'       => "目前还没有人投票。",
	'boardvote_time'          => "时间",
	'boardvote_user'          => "用户",
	'boardvote_edits'         => "编辑次数",
	'boardvote_days'          => "日",
	'boardvote_ip'            => "IP",
	'boardvote_ua'            => "用户代理",
	'boardvote_listintro'     => "<p>本列表列出了迄今为止所有被登记的选票。$1是加密信息。</p>",
	'boardvote_dumplink'      => "点击这里",
	'boardvote_submit'        => 'OK',
	'boardvote_strike'        => "删除线",
	'boardvote_unstrike'      => "取消删除线",
	'boardvote_needadmin'     => "只有选举管理员才能进行本项操作。",
	'boardvote_sitenotice'    => "<a href=\"/wiki/Special:Boardvote/vote\">维基媒体基金会理事会选举</a>: 投票截止到9月20日",
	'boardvote_notstarted'    => '投票尚未开始',
	'boardvote_closed'        => '投票已经结束，请在稍后时间参看[http://meta.wikimedia.org/wiki/Elections_for_the_Board_of_Trustees_of_the_Wikimedia_Foundation%2C_2006/Zh 投票结果]。',
	'boardvote_edits_many'    => '很多',
	'group-boardvote'         => '理事会投票管理员',
	'group-boardvote-member'  => '理事会投票管理员',
	'grouppage-boardvote'     => '{{ns:project}}:理事会投票管理员',
	'boardvote_blocked'       => '很抱歉，您在已注册的维基计划里遭到封禁。被封禁的用户并不能在选举中投票。',
	'boardvote_welcome'       => "欢迎您， '''$1'''！",
	'go_to_board_vote'        => '维基媒体基金会理事会选举2007',
	'boardvote_redirecting'   => '为改善投票的保安和透明度，这次选举将会在一个站外独立的服务器上进行。

20秒后浏览器将会自动转到这个站外服务器。您也可以马上[$1 点击这里]直接到那里。

稍后，您的浏览器可能会弹出未验证安全凭证的警告。',

);
$wgBoardVoteMessages['zh-hant'] = array(
	'boardvote'               => "維基媒體基金會理事會選舉",
	'boardvote_entry'         => "* [[Special:Boardvote/vote|參與投票]]
* [[Special:Boardvote/list|至今已投票列表]]
* [[Special:Boardvote/dump|加密的選舉資料]]",
	'boardvote_intro'         => "
<p>歡迎參與維基媒體基金會理事會第三屆選舉。我們將選出一人，代表各維基計畫的用戶社群。他/她將獨力或與團隊一起，幫助決定維基媒體計畫的未來走向，同時在理事會中代表<b>你</b>的利益及考量。他/她會決定創造收入的方式，及募得款項的分配。</p>

<p>請在投票前，仔細閱讀參選人陳述及對質問的回應。每位參選人都是受尊重的用戶，貢獻了相當多的時間與精力來營造維基計畫的友善環境，使其為人類知識的追求及自由分散服務。</p>

<p>你可以投票給任意多個參選人。得票最多的參選人將會公布為勝選。若最高票數相同，他們將進入第二輪選舉。</p>

<p>請留意，你有且只有一票。即便你在多個計畫有超過400次編輯，你仍只可投一票。若你要改變投票選擇，請在原投票計畫處修改。</p>
<p>更多資訊，見：</p>
<ul><li><a href=\"http://meta.wikipedia.org/wiki/Election_FAQ_2006\" class=\"external\">選舉的常見問題解答</a></li>
<li><a href=\"http://meta.wikipedia.org/wiki/Election_Candidates_2006\" class=\"external\">參選人</a></li></ul>
",
	'boardvote_intro_change'  => "<p>你已經參與過投票。但是你還可以在下面修改你的投票。請勾選你所支持的候選人名字的選擇框。</p>",
	'boardvote_entered'       => "謝謝您，您的投票已經被記錄。

您可以記錄下以下詳情。您的投票記錄是：

<pre>$1</pre>

已經用選舉管理員的公眾鑰匙加密。

<pre>$2</pre>

以下是加密後的版本。它將在[[Special:Boardvote/dump]]列表中公開展示。

<pre>$3</pre>

[[Special:Boardvote/entry|返回]]",
	'boardvote_nosession'     => "我不能確定您的維基媒體帳號名稱。請您登入到合乎資格的維基計劃，然後轉到 <nowiki>[[Special:Boardvote]]</nowiki>。您必須用一個帳號，在 $2 以前有 $1 次編輯，而且其首次編輯必須在 $3 以前。",
	'boardvote_notloggedin'   => "您還沒有登錄。要參與投票，您必須在$2之前至少貢獻了$1次以上，而且在$3前作出第一次編輯。",
	'boardvote_notqualified'  => "對不起，您在$2之前只有$1次貢獻。 您必須至少貢獻了$3次以上才可以參與本次投票。而且，您的第一次編輯是在$4，這需要在$5之前。",
	'boardvote_novotes'       => "目前還沒有人投票。",
	'boardvote_time'          => "時間",
	'boardvote_user'          => "用戶",
	'boardvote_edits'         => "編輯次數",
	'boardvote_days'          => "日",
	'boardvote_ip'            => "IP",
	'boardvote_ua'            => "用戶代理",
	'boardvote_listintro'     => "<p>本列表列出了迄今為止所有被登記的選票。$1是加密信息。</p>",
	'boardvote_dumplink'      => "點擊這裏",
	'boardvote_submit'        => 'OK',
	'boardvote_strike'        => "刪除綫",
	'boardvote_unstrike'      => "取消刪除綫",
	'boardvote_needadmin'     => "只有選舉管理員才能進行本項操作。",
	'boardvote_sitenotice'    => "<a href=\"/wiki/Special:Boardvote/vote\">維基媒體基金會理事會選舉</a>: 投票截止到9月20日",
	'boardvote_notstarted'    => '投票尚未開始',
	'boardvote_closed'        => '投票已經結束，請在稍後時間參看[http://meta.wikimedia.org/wiki/Elections_for_the_Board_of_Trustees_of_the_Wikimedia_Foundation%2C_2006/Zh 投票結果]。',
	'boardvote_edits_many'    => '很多',
	'group-boardvote'         => '理事會投票管理員',
	'group-boardvote-member'  => '理事會投票管理員',
	'grouppage-boardvote'     => '{{ns:project}}:理事會投票管理員',
	'boardvote_blocked'       => '很抱歉，您在已註冊的維基計劃裡遭到封禁。被封禁的用戶並不能在選舉中投票。',
	'boardvote_welcome'       => "歡迎您， '''$1'''！",
	'go_to_board_vote'        => '維基媒體基金會理事會選舉2007',
	'boardvote_redirecting'   => '為改善投票的保安和透明度，這次選舉將會在一個站外獨立的伺服器上進行。

20秒後瀏覽器將會自動轉到這個站外伺服器。您也可以馬上[$1 點擊這裡]直接到那裡。

稍後，您的瀏覽器可能會彈出未驗證安全憑證的警告。',
);
$wgBoardVoteMessages['zh'] = $wgBoardVoteMessages['zh-hans'];
$wgBoardVoteMessages['zh-cn'] = $wgBoardVoteMessages['zh-hans'];
$wgBoardVoteMessages['zh-hk'] = $wgBoardVoteMessages['zh-hant'];
$wgBoardVoteMessages['zh-sg'] = $wgBoardVoteMessages['zh-hans'];
$wgBoardVoteMessages['zh-tw'] = $wgBoardVoteMessages['zh-hant'];
$wgBoardVoteMessages['zh-yue'] = $wgBoardVoteMessages['yue'];







