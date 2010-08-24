<?php
/**
 * Internationalization file for the Approved Revs extension.
 *
 * @file
 * @ingroup Extensions
*/

$messages = array();

/** English
 * @author Yaron Koren
 */
$messages['en'] = array(
	// user messages
	'approvedrevs-desc' => 'Set a single revision of a page as approved',
	'approvedrevs-logname' => 'Revision approval log',
	'approvedrevs-logdesc' => 'This is the log of revisions that have been approved.',
	'approvedrevs-approve' => 'approve',
	'approvedrevs-unapprove' => 'unapprove',
	'approvedrevs-approvesuccess' => 'This revision of the page has been set as the approved version.',
	'approvedrevs-unapprovesuccess' => 'There is no longer an approved version for this page.
Instead, the most recent revision will be shown.',
	'approvedrevs-approveaction' => 'set $2 as the approved revision for "[[$1]]"',
	'approvedrevs-unapproveaction' => 'unset approved revision for "[[$1]]"',
	'approvedrevs-notlatest' => 'This is the approved revision of this page; it is not the most recent.',
	'approvedrevs-approvedandlatest' => 'This is the approved revision of this page, as well as being the most recent.',
	'approvedrevs-viewlatest' => 'View most recent revision.',
	'approvedpages' => 'Approved pages',
	'approvedrevs-approvedpages-docu' => 'The following are the pages in the wiki that have an approved revision.',
	'right-approverevisions' => 'Set a certain revision of a wiki page as approved',
	'right-viewlinktolatest' => 'View explanatory text at the top of pages that have an approved revision',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 */
$messages['qqq'] = array(
	'approvedrevs-approve' => '{{Identical|Approve}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'approvedrevs-approve' => 'keur goed',
	'approvedrevs-viewlatest' => 'Wys mees onlangse hersiening.',
	'approvedpages' => 'Goedgekeurde bladsye',
);

/** Arabic (العربية)
 * @author Moemin05
 */
$messages['ar'] = array(
	'approvedrevs-approve' => 'موافقة',
	'approvedrevs-unapprove' => 'إزالة موافقة',
	'approvedpages' => 'صفحات تمّت الموافقة عليها',
	'approvedrevs-approvedpages-docu' => 'صفحات الويكي التالية لها مراجعات موافق عليها.',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'approvedrevs-desc' => 'Зацьвердзіць адну вэрсію старонкі',
	'approvedrevs-logname' => 'Журнал зацьверджаньня вэрсіяў',
	'approvedrevs-logdesc' => 'Гэта журнал зацьверджаных вэрсіяў.',
	'approvedrevs-approve' => 'зацьвердзіць',
	'approvedrevs-unapprove' => 'адхіліць',
	'approvedrevs-approvesuccess' => 'Гэтая вэрсія старонкі была зацьверджаная.',
	'approvedrevs-unapprovesuccess' => 'Болей не існуе зацьверджанай вэрсіі гэтай старонкі.
Замест яе будзе паказаная апошняя вэрсія.',
	'approvedrevs-approveaction' => 'зацьвердзіць $2 як зацьверджаную вэрсію старонкі «[[$1]]»',
	'approvedrevs-unapproveaction' => 'зьняць зацьверджаньне з вэрсіі старонкі «[[$1]]»',
	'approvedrevs-notlatest' => 'Гэта зацьверджаная вэрсія гэтай старонкі; гэта не апошняя вэрсія.',
	'approvedrevs-approvedandlatest' => 'Гэта зацьверджаная вэрсія гэтай старонкі, адначасова яна зьяўляецца апошняй вэрсіяй.',
	'approvedrevs-viewlatest' => 'Паказаць апошнюю вэрсію.',
	'approvedpages' => 'Зацьверджаныя старонкі',
	'approvedrevs-approvedpages-docu' => 'Ніжэй пададзеныя старонкі {{GRAMMAR:родны|{{SITENAME}}}}, якія маюць зацьверджаныя вэрсіі.',
	'right-approverevisions' => 'зацьверджаньне вызначаных вэрсіяў вікі-старонак',
	'right-viewlinktolatest' => 'прагляд тлумачальнага тэксту ў версе старонак, якія маюць зацьверджаныя вэрсіі',
);

/** Breton (Brezhoneg)
 * @author Y-M D
 */
$messages['br'] = array(
	'approvedrevs-desc' => 'Merkañ un adweladenn hepken eus ur bajenn evel aprouet',
	'approvedrevs-logname' => 'Marilh aprouadennoù an adweladennoù',
	'approvedrevs-logdesc' => 'Marilh an adweladennoù bet merket evel aprouet eo.',
	'approvedrevs-approve' => 'aprouiñ',
	'approvedrevs-unapprove' => 'Dizaprouiñ',
	'approvedrevs-approvesuccess' => 'An adweladenn-mañ eus ar bajenn a zo bet merket evel ar stumm aprouet.',
	'approvedrevs-unapprovesuccess' => "N'eus stumm aprouet ebet ken eus ar bajenn-mañ.
E plas e vo lakaet an adweladenn nevesañ.",
	'approvedrevs-approveaction' => 'en deus merket $2 evel adweladenn aprouet "[[$1]]"',
	'approvedrevs-unapproveaction' => 'en deus nullet merkadur un adweladenn aprouet evit "[[$1]]"',
	'approvedrevs-notlatest' => "Adweladenn aprouet ar bajenn-mañ eo ; n'eo ket an hini nevesañ.",
	'approvedrevs-approvedandlatest' => 'Adweladenn aprouet ar bajenn-mañ eo, hag ivez an hini nevesañ.',
	'approvedrevs-viewlatest' => 'Gwelet an adweladenn nevesañ.',
	'approvedpages' => 'Pajennoù aprouet',
	'approvedrevs-approvedpages-docu' => 'Setu ar pajennoù wiki hag o deus un adweladenn aprouet.',
	'right-approverevisions' => 'Merkañ un adweladenn bennak eus ur bajenn wiki evel aprouet',
	'right-viewlinktolatest' => 'Gwelet an destenn displegañ e penn uhelañ ar pajennoù hag o deus un adweladenn aprouet',
);

/** Bosnian (Bosanski)
 * @author CERminator
 * @author Palapa
 */
$messages['bs'] = array(
	'approvedrevs-desc' => 'Postavljanje jedne revizije stranice kao odobrene',
	'approvedrevs-logname' => 'Zapisnik odobravanje revizija',
	'approvedrevs-logdesc' => 'Ovo je zapis revizija koje su odobrene.',
	'approvedrevs-approve' => 'odobri',
	'approvedrevs-unapprove' => 'neodobreno',
	'approvedrevs-approvesuccess' => 'Ova revizija stranice je postavljena kao odobrena verzija.',
	'approvedrevs-unapprovesuccess' => 'Više ne postoji odobrena verzija ove stranice.
Umjesto toga, zadnja revizija će biti prikazana.',
	'approvedrevs-approveaction' => 'postavi $2 kao odobrenu reviziju za "[[$1]]"',
	'approvedrevs-unapproveaction' => 'ukloni odobrenu reviziju za "[[$1]]"',
	'approvedrevs-notlatest' => 'Ovo je odobrena verzija ove stranice; to nije najnovija verzija.',
	'approvedrevs-approvedandlatest' => 'Ovo je odobrena verzija ove stranice, a ujedno i najnovija.',
	'approvedrevs-viewlatest' => 'Pogledaj zadnju reviziju.',
	'approvedpages' => 'Odobrene stranice',
	'approvedrevs-approvedpages-docu' => 'Slijede stranice na ovoj wiki koje imaju odobrene revizije.',
	'right-approverevisions' => 'Postavi određenu reviziju wiki stranice kao odobrenu',
	'right-viewlinktolatest' => 'Vidi tekst objašnjenja na vrhu stranica koje imaju odobrenu reviziju',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'approvedrevs-desc' => 'Ermöglicht es, stets eine bestimmte Version einer Seite als bestätigte Version anzuzeigen',
	'approvedrevs-logname' => 'Versionsbestätigungs-Logbuch',
	'approvedrevs-logdesc' => 'In diesem Logbuch werden die Versionsbestätigungen von Seiten protokolliert.',
	'approvedrevs-approve' => 'bestätigen',
	'approvedrevs-unapprove' => 'ablehnen',
	'approvedrevs-approvesuccess' => 'Diese Version der Seite wurde als bestätigte Version festgelegt.',
	'approvedrevs-unapprovesuccess' => 'Nunmehr existiert keine bestätigte Version dieser Seite.
Stattdessen wird die neueste Version angezeigt.',
	'approvedrevs-approveaction' => '$2 als bestätigte Version für „[[$1]]“ festlegen',
	'approvedrevs-unapproveaction' => 'bestätigte Version für „[[$1]]“ zurücknehmen',
	'approvedrevs-notlatest' => 'Dies ist die bestätigte Version dieser Seite, allerdings nicht die neueste Version.',
	'approvedrevs-approvedandlatest' => 'Dies ist die bestätigte sowie die neueste Version dieser Seite.',
	'approvedrevs-viewlatest' => 'Die neueste Version ansehen.',
	'approvedpages' => 'Bestätigte Seiten',
	'approvedrevs-approvedpages-docu' => 'Die folgenden Seiten, sind die Seiten dieses Wikis, die eine bestätigte Version haben.',
	'right-approverevisions' => 'Eine bestimmte Version einer Wikiseite als bestätigt festlegen',
	'right-viewlinktolatest' => 'Erläuternde Hinweise im Kopf der Seiten anzeigen, die eine bestätigte Version haben.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'approvedrevs-desc' => 'Wěstu wersiju boka ako pśizwólonu nastajiś',
	'approvedrevs-logname' => 'Protokol pśizwólonych wersijow',
	'approvedrevs-logdesc' => 'To jo protokol wersijow, kótarež su se pśizwólili.',
	'approvedrevs-approve' => 'pśizwóliś',
	'approvedrevs-unapprove' => 'zakazaś',
	'approvedrevs-approvesuccess' => 'Toś ta wersija boka jo se ako pśizwólona wersija nastajiła.',
	'approvedrevs-unapprovesuccess' => 'Njejo wěcej pśizwólona wersija za toś ten bok.
Město togo nejnowša wersija se pokažo.',
	'approvedrevs-approveaction' => '$2 ako pśizwólonu wersiju za "[[$1]]" nastajiś',
	'approvedrevs-unapproveaction' => 'Pśizwólonu wersiju za "[[$1]]" anulěrowaś',
	'approvedrevs-notlatest' => 'To jo pśizwólona wersija toś togo boka; njejo nejnowša.',
	'approvedrevs-approvedandlatest' => 'To jo pśizwólona wersija toś togo boka a teke nejnowša.',
	'approvedrevs-viewlatest' => 'Nejnowšu wersiju pokazaś',
	'approvedpages' => 'Pśizwólone boki',
	'approvedrevs-approvedpages-docu' => 'Slědujuce boki we wikiju maju pśizwólonu wersiju.',
	'right-approverevisions' => 'Wěstu wersiju wikiboka ako pśizwólonu nastajiś',
	'right-viewlinktolatest' => 'Tekst wujasnjenja górjejce na bokach pokazaś, kótarež maju pśizwólonu wersiju',
);

/** Greek (Ελληνικά)
 * @author Περίεργος
 */
$messages['el'] = array(
	'approvedrevs-desc' => 'Καθορίζει μια ενιαία αναθεώρηση μιας σελίδας όπως έχει εγκριθεί',
	'approvedrevs-logname' => 'Ημερολόγιο καταγραφής της αποδοχής των αναθεωρήσεων',
	'approvedrevs-logdesc' => 'Αυτό είναι το ημερολόγιο των αναθεωρήσεων που έχουν εγκριθεί.',
	'approvedrevs-approve' => 'έγκριση',
	'approvedrevs-unapprove' => 'μη έγκριση',
	'approvedrevs-approvesuccess' => 'Αυτή η αναθεώρηση της σελίδας έχει οριστεί ως η εγκεκριμένη έκδοση.',
	'approvedrevs-unapprovesuccess' => 'Δεν υπάρχει πλέον μια εγκεκριμένη έκδοση για αυτή τη σελίδα.
Σε αντικατάσταση, θα εμφανιστεί η πιο πρόσφατη αναθεώρηση.',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Locos epraix
 */
$messages['es'] = array(
	'approvedrevs-desc' => 'Establecer una revisión única de una página como aprovada',
	'approvedrevs-logname' => 'Registro de revisiones aprobadas',
	'approvedrevs-logdesc' => 'Este es el registro de las revisiones que han sido aprobadas.',
	'approvedrevs-approve' => 'aprobar',
	'approvedrevs-unapprove' => 'desaprobar',
	'approvedrevs-approvesuccess' => 'Esta revisión de la página ha sido establecida como la versión aprobada.',
	'approvedrevs-unapprovesuccess' => 'Ya no hay una versión aprobada para esta página.
En su lugar, se muestra la revisión más reciente.',
	'approvedrevs-approveaction' => 'establecer $2 como la revisión aprobada para para "[[$1]]"',
	'approvedrevs-unapproveaction' => 'desestablecer la revisión aprobada para "[[$1]]"',
	'approvedrevs-notlatest' => 'Esta es la revisión aprobada de esta página, no es la más reciente.',
	'approvedrevs-approvedandlatest' => 'Esta es la revisión aprobada de esta página, siendo también la más reciente.',
	'approvedrevs-viewlatest' => 'Ver revisión más reciente.',
	'approvedpages' => 'Páginas aprobadas',
	'approvedrevs-approvedpages-docu' => 'Las siguientes son las páginas en la wiki que tienen una versión aprobada.',
	'right-approverevisions' => 'Establecer una cierta revisión de una página wiki como aprobada',
	'right-viewlinktolatest' => 'Ver texto explicativo en la parte superior de las páginas que tienen una revisión aprobada',
);

/** Finnish (Suomi)
 * @author Centerlink
 * @author Crt
 * @author Nike
 */
$messages['fi'] = array(
	'approvedrevs-desc' => 'Aseta yksittäinen sivuversio hyväksytyksi',
	'approvedrevs-logname' => 'Versiohyväksynnän loki',
	'approvedrevs-logdesc' => 'Tämä on hyväksyttyjen versioiden loki.',
	'approvedrevs-approve' => 'hyväksy',
	'approvedrevs-unapprove' => 'älä hyväksy',
	'approvedrevs-approvesuccess' => 'Tämä sivuversio on asetettu hyväksytyksi versioksi.',
	'approvedrevs-unapprovesuccess' => 'Tästä sivusta ei ole enää hyväksyttyä versiota.
Sen sijaan, viimeisin versio näytetään.',
	'approvedrevs-notlatest' => 'Tämä on  tämän sivun hyväksytty versio; se ei ole viimeisin.',
	'approvedrevs-approvedandlatest' => 'Tämä on tämän sivun hyväksytty ja samalla viimeisin versio.',
	'approvedrevs-viewlatest' => 'Näytä viimeisin versio.',
	'approvedpages' => 'Hyväksytyt sivut',
	'approvedrevs-approvedpages-docu' => 'Seuraavat ovat wikisivuja, joilla on hyväksytty versio.',
	'right-approverevisions' => 'Asettaa wikisivun tietty versio hyväksytyksi',
	'right-viewlinktolatest' => 'Nähdä selittävä teksti niiden sivujen yläosassa, joilla on hyväksytty versio',
);

/** French (Français)
 * @author Peter17
 */
$messages['fr'] = array(
	'approvedrevs-desc' => 'Marquer une seule révision d’une page comme approuvée',
	'approvedrevs-logname' => 'Journal des approbations de révisions',
	'approvedrevs-logdesc' => 'Ceci est le journal des révisions qui ont été marquées comme approuvées.',
	'approvedrevs-approve' => 'approuver',
	'approvedrevs-unapprove' => 'désapprouver',
	'approvedrevs-approvesuccess' => 'Cette révision de la page a été marquée comme étant la version approuvée.',
	'approvedrevs-unapprovesuccess' => 'Il n’y a plus de version approuvée de cette page.
Au lieu de cela, la révision la plus récente sera affichée.',
	'approvedrevs-approveaction' => 'a marqué $2 comme la révision approuvée de « [[$1]] »',
	'approvedrevs-unapproveaction' => 'a annulé le marquage d’une révision approuvée pour « [[$1]] »',
	'approvedrevs-notlatest' => 'Ceci est la révision approuvée de cette page. Ce n’est pas la plus récente.',
	'approvedrevs-approvedandlatest' => 'Ceci est la révision approuvée de la page, et aussi la plus récente.',
	'approvedrevs-viewlatest' => 'Voir la révision la plus récente.',
	'approvedpages' => 'Pages approuvées',
	'approvedrevs-approvedpages-docu' => 'Voici les pages du wiki qui ont une révision approuvée.',
	'right-approverevisions' => 'Marquer une révision précise d’une page comme approuvée',
	'right-viewlinktolatest' => 'Voir le texte explicatif en haut des pages qui ont une révision approuvée',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'approvedrevs-desc' => 'Marcar como aprobada unha única revisión dunha páxina',
	'approvedrevs-logname' => 'Rexistro de aprobación de revisións',
	'approvedrevs-logdesc' => 'Este é o rexistro das revisións aprobadas.',
	'approvedrevs-approve' => 'aprobar',
	'approvedrevs-unapprove' => 'desaprobar',
	'approvedrevs-approvesuccess' => 'Esta é a revisión aprobada da páxina.',
	'approvedrevs-unapprovesuccess' => 'Esta páxina xa non ten ningunha versión aprobada.
No canto dela, móstrase a revisión máis recente.',
	'approvedrevs-approveaction' => 'marcou $2 como a revisión aprobada de "[[$1]]"',
	'approvedrevs-unapproveaction' => 'anulou unha revisión aprobada de "[[$1]]"',
	'approvedrevs-notlatest' => 'Esta é a revisión aprobada da páxina, pero non é a máis recente.',
	'approvedrevs-approvedandlatest' => 'Esta é a revisión aprobada da páxina, e tamén a máis recente.',
	'approvedrevs-viewlatest' => 'Ollar a revisión máis recente.',
	'approvedpages' => 'Páxinas aprobadas',
	'approvedrevs-approvedpages-docu' => 'A continuación están as páxinas do wiki que posúen unha revisión aprobada.',
	'right-approverevisions' => 'Marcar como aprobada unha revisión específica dunha páxina do wiki',
	'right-viewlinktolatest' => 'Ollar o texto explicativo ao comezo das páxinas que posúen unha revisión aprobada',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'approvedrevs-desc' => 'E Version vun eree Syte as „aagluegt“ markiere',
	'approvedrevs-logname' => 'Versions-Markierigs-Logbuech',
	'approvedrevs-logdesc' => 'Des isch s Logbuech vu dr aagluegte Version',
	'approvedrevs-approve' => "As ''aagluegt'' markiere",
	'approvedrevs-unapprove' => 'nit frejgee',
	'approvedrevs-approvesuccess' => 'Die Version vu dr Syte isch as „aagluegti Version“ gsetzt wore.',
	'approvedrevs-unapprovesuccess' => 'S git kei aaglkeugti Version me vu däre Syte. 
Statt däm wird di nejscht Version aazeigt.',
	'approvedrevs-approveaction' => '$2 as aaglugti Version fir „[[$1]]“ setze',
	'approvedrevs-unapproveaction' => 'd Markierig as aagluegti Version fir „[[$1]]“ uuseneh',
	'approvedrevs-notlatest' => 'Des isch di aagluegt Version vu däre Syte; s isch nit di nejscht Version.',
	'approvedrevs-approvedandlatest' => 'Des isch di aagluegt Version vu däre Syte un au di nejscht.',
	'approvedrevs-viewlatest' => 'Di nejscht Version aaluege.',
	'approvedpages' => 'Aagluegti Syte',
	'approvedrevs-approvedpages-docu' => 'Des sin d Syte, wu s e aagluegti Version het.',
	'right-approverevisions' => 'E sicheri Version vun ere Wikisyte as aagluegt markiere',
	'right-viewlinktolatest' => 'Dr Erklerigstext aaluege obe uf Syte, wu s e aagluegti Version git',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'approvedrevs-desc' => 'Jednotliwu wersiju strony jako schwalenu stajić',
	'approvedrevs-logname' => 'Protokol schwalenja wersijow',
	'approvedrevs-logdesc' => 'To je protokol wersije, kotrež buchu schwalene.',
	'approvedrevs-approve' => 'schwalić',
	'approvedrevs-unapprove' => 'zakazać',
	'approvedrevs-approvesuccess' => 'Tuta wersija strony je so jako schwalena wersija stajiła.',
	'approvedrevs-unapprovesuccess' => 'Schwalena wersija za tutu stronu wjace njeje.
Město toho so najnowša wersija pokaza.',
	'approvedrevs-approveaction' => 'je $2 jako schwalenu wersiju za "[[$1]]" nastajił',
	'approvedrevs-unapproveaction' => 'je status schwalena wersija za "[[$1]]" wotstronił',
	'approvedrevs-notlatest' => 'To je schwalena wersija tuteje strony; njeje najnowša.',
	'approvedrevs-approvedandlatest' => 'To je schwalena wersija tuteje strony, kotraž je tež najnowša.',
	'approvedrevs-viewlatest' => 'Najnowšu wersiju pokazać',
	'approvedpages' => 'Schwalene wersije',
	'approvedrevs-approvedpages-docu' => 'Slědowace strony we wikiju maja schwalenu wersiju.',
	'right-approverevisions' => 'Wěstu wersiju wikistrony jako schwalenu nastajić',
	'right-viewlinktolatest' => 'Rozłožowacy tekst horjeka na stronach pokazać, kotrež maja schwalenu wersiju.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'approvedrevs-desc' => 'Marcar un sol version de un pagina como approbate',
	'approvedrevs-logname' => 'Registro de approbation de versiones',
	'approvedrevs-logdesc' => 'Isto es le registro del versiones que ha essite approbate.',
	'approvedrevs-approve' => 'approbar',
	'approvedrevs-unapprove' => 'disapprobar',
	'approvedrevs-approvesuccess' => 'Iste version del pagina ha essite marcate como le version approbate.',
	'approvedrevs-unapprovesuccess' => 'Il non ha plus un version approbate de iste pagina.
In loco de isto, le version le plus recente essera monstrate.',
	'approvedrevs-approveaction' => 'marcava $2 como le version approbate de "[[$1]]"',
	'approvedrevs-unapproveaction' => 'dismarcava le version approbate de "[[$1]]"',
	'approvedrevs-notlatest' => 'Isto es le version approbate de iste pagina; non es le plus recente.',
	'approvedrevs-approvedandlatest' => 'Isto es le version approbate de iste pagina, e tamben le plus recente.',
	'approvedrevs-viewlatest' => 'Vider le version le plus recente.',
	'approvedpages' => 'Paginas approbate',
	'approvedrevs-approvedpages-docu' => 'Le sequente paginas in le wiki ha un version approbate.',
	'right-approverevisions' => 'Marcar un certe version de un pagina wiki como approbate',
	'right-viewlinktolatest' => 'Vider le texto explicative in alto del paginas que ha un version approbate',
);

/** Indonesian (Bahasa Indonesia)
 * @author Farras
 */
$messages['id'] = array(
	'approvedrevs-desc' => 'Tetapkan revisi tunggal halaman ini sebagai disetujui',
	'approvedrevs-logname' => 'Log penyetujuan revisi',
	'approvedrevs-logdesc' => 'Ini adalah log revisi yang telah disetujui.',
	'approvedrevs-approve' => 'setujui',
	'approvedrevs-unapprove' => 'tidak setujui',
	'approvedrevs-approvesuccess' => 'Revisi halaman ini telah ditetapkan sebagai revisi disetujui.',
	'approvedrevs-unapprovesuccess' => 'Tidak ada lagi versi disetujui untuk halaman ini.
Revisi terkini akan ditampilkan.',
	'approvedrevs-approveaction' => 'tetapkan $2 sebagai revisi disetujui untuk "[[$1]]"',
	'approvedrevs-unapproveaction' => 'jangan tetapkan revisi disetujui untuk "[[$1]]"',
	'approvedrevs-notlatest' => 'Ini adalah revisi disetujui dari halaman ini; bukan revisi terkini.',
	'approvedrevs-approvedandlatest' => 'Ini adalah revisi disetujui dari halaman ini, juga revisi terkini.',
	'approvedrevs-viewlatest' => 'Lihat revisi terkini.',
	'approvedpages' => 'Halaman yang disetujui',
	'approvedrevs-approvedpages-docu' => 'Berikut adalah halaman di wiki yang memiliki revisi disetujui.',
	'right-approverevisions' => 'Tetapkan revisi tertentu dari halaman wiki sebagai disetujui',
	'right-viewlinktolatest' => 'Lihat penjelasan di atas halaman yang memiliki revisi disetujui',
);

/** Igbo (Igbo)
 * @author Ukabia
 */
$messages['ig'] = array(
	'approvedrevs-approve' => 'kwé',
	'approvedrevs-unapprove' => 'ékwèkwàlà',
	'approvedpages' => 'Ihü hé kwèrè',
);

/** Japanese (日本語)
 * @author W.CC
 */
$messages['ja'] = array(
	'approvedrevs-desc' => '履歴からページの版に承認済みとして印をつける',
	'approvedrevs-logname' => '特定版の承認記録',
	'approvedrevs-logdesc' => '以下は、承認された版の記録です。',
	'approvedrevs-approve' => '承認',
	'approvedrevs-unapprove' => '承認の取り消し',
	'approvedrevs-approvesuccess' => 'この版は承認済みとしてマークされました。',
	'approvedrevs-unapprovesuccess' => 'このページには承認された版はありません。代わりに最新版が表示されます。',
	'approvedrevs-approveaction' => '"[[$1]]" の第$2版を承認済みとしてマーク',
	'approvedrevs-unapproveaction' => '"[[$1]]" の承認を取り消し',
	'approvedrevs-notlatest' => 'このページは承認されています;この版の変更はまだ承認されていません',
	'approvedrevs-approvedandlatest' => 'このページは承認されています;この版は承認されています',
	'approvedrevs-viewlatest' => '承認されている最新の版を見る',
	'approvedpages' => '承認されたページ',
	'approvedrevs-approvedpages-docu' => '次のページには承認された版があります。',
	'right-approverevisions' => 'ページの特定版を承認',
	'right-viewlinktolatest' => '承認された最新の版へのリンクを上部に表示する',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'approvedrevs-desc' => 'Eng eenzel Versioun vun enger Säit als nogekuckt markéieren',
	'approvedrevs-logname' => 'Logbuch vun den nogekuckt Säiten déi fräigi sinn',
	'approvedrevs-logdesc' => "Dëst ass d'Logbuch vun de Versiounen déi nogekuckt sinn.",
	'approvedrevs-approve' => 'zoustëmmen',
	'approvedrevs-unapprove' => 'Zoustëmmung zréckzéien',
	'approvedrevs-approvesuccess' => 'Dës Versioun vun der Säit gouf als nogekuckte Versioun fräiginn.',
	'approvedrevs-unapprovesuccess' => 'Et gëtt vun dëser Säit  keng nogekuckte Versioun méi.
Dofir gëtt déi rezentst Versioun gewisen.',
	'approvedrevs-approveaction' => '$2 als nogekuckt Versioun fir "[[$1]]" festleeën',
	'approvedrevs-unapproveaction' => 'nogekuckt Versioun fir "[[$1]]" zréckzéien',
	'approvedrevs-notlatest' => 'Dëst ass déi nogekuckte Versioun vun dëser Säit; et ass net déi rezentst.',
	'approvedrevs-approvedandlatest' => 'Dëst ass esouwuel déi nogekuckt wéi och déi rezentst Versioun vun dëser Säit.',
	'approvedrevs-viewlatest' => 'Déi rezentst Versioun weisen.',
	'approvedpages' => 'Nogekuckte Säiten',
	'approvedrevs-approvedpages-docu' => 'Dës Säiten an der Wiki hunn eng nogekuckte Versioun.',
	'right-approverevisions' => 'Eng bestëmmte Versioun vun enger Säit als nogekuckt markéieren',
	'right-viewlinktolatest' => 'Kuckt den Erklärungstext uewen op de Säiten déi nogekuckt Versiounen hunn',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'approvedrevs-desc' => 'Поставање на една единствена ревизија на страницата како одобрена',
	'approvedrevs-logname' => 'Дневник на одобрени ревизии',
	'approvedrevs-logdesc' => 'Ова е дневникот на одобрени ревизии.',
	'approvedrevs-approve' => 'одобри',
	'approvedrevs-unapprove' => 'неодобрена',
	'approvedrevs-approvesuccess' => 'Оваа ревизија на страницата е поставена како одобрена.',
	'approvedrevs-unapprovesuccess' => 'Оваа страница повеќе нема одобрена верзија.
Наместо тоа ќе се прикажува најновата верзија.',
	'approvedrevs-approveaction' => 'постави ја $2 за одобрена верзија на „[[$1]]“',
	'approvedrevs-unapproveaction' => 'отстрани одобрена верзија на „[[$1]]“',
	'approvedrevs-notlatest' => 'Ова е одобрената ревизија на страницава, но не е најновата.',
	'approvedrevs-approvedandlatest' => 'Ова е одобрената ревизија на страницава, а воедно и најновата.',
	'approvedrevs-viewlatest' => 'Види најнова ревизија.',
	'approvedpages' => 'Одобрени страници',
	'approvedrevs-approvedpages-docu' => 'Ова се страници на викито што имаат одобрена ревизија.',
	'right-approverevisions' => 'Поставете извесна ревизија на вики-страница како одобрена',
	'right-viewlinktolatest' => 'Погледајте го објаснувањето на врвот од страниците што имаат одобрена верзија',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'approvedrevs-desc' => 'Een versie van een pagina als goedgekeurd instellen',
	'approvedrevs-logname' => 'Logboek versiegoedkeuring',
	'approvedrevs-logdesc' => 'Dit is het logboek met de versies die zijn goedgekeurd.',
	'approvedrevs-approve' => 'goedkeuren',
	'approvedrevs-unapprove' => 'afkeuren',
	'approvedrevs-approvesuccess' => 'Deze versie van de pagina is ingesteld als de goedgekeurde versie.',
	'approvedrevs-unapprovesuccess' => 'Deze pagina heeft niet langer een goedgekeurde versie.
Daarom wordt de laatste versie weergegeven.',
	'approvedrevs-approveaction' => 'heeft $2 ingesteld als de goedgekeurde versie voor "[[$1]]"',
	'approvedrevs-unapproveaction' => 'heeft de goedgekeurde versie verwijderd voor "[[$1]]"',
	'approvedrevs-notlatest' => 'Dit is de goedgekeurde versie van deze pagina.
Het is niet de meeste recente versie.',
	'approvedrevs-approvedandlatest' => 'Dit is de goedgekeurde versie van deze pagina. Er is geen nieuwere versie.',
	'approvedrevs-viewlatest' => 'Laatste versie bekijken',
	'approvedpages' => "Goedgekeurde pagina's",
	'approvedrevs-approvedpages-docu' => "De volgende pagina's in de wiki hebben een goedgekeurde versie.",
	'right-approverevisions' => 'Een versie van een wikipagina markeren als goedgekeurd.',
	'right-viewlinktolatest' => "De verklarende tekst bovenaan pagina's zien die die een goedgekeurde versie hebben",
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'approvedrevs-desc' => 'Sett en enkelt revisjon av en side som godkjent',
	'approvedrevs-logname' => 'Godkjenningslogg for revisjoner',
	'approvedrevs-logdesc' => 'Dette er loggen over revisjoner som har blitt godkjent.',
	'approvedrevs-approve' => 'godkjenn',
	'approvedrevs-unapprove' => 'ikke godkjenn',
	'approvedrevs-approvesuccess' => 'Denne revisjonen av siden har blitt satt som den godkjente versjonen.',
	'approvedrevs-unapprovesuccess' => 'Det er ikke lenger en godkjent versjon av denne siden.
I stedet vil den nyeste revisjonen bli vist.',
	'approvedrevs-approveaction' => 'sett $2 som den godkjente revisjonen for «[[$1]]»',
	'approvedrevs-unapproveaction' => 'fjern godkjenning av revisjon for «[[$1]]»',
	'approvedrevs-notlatest' => 'Dette er den godkjente revisjonen av denne siden; det er ikke den nyeste.',
	'approvedrevs-approvedandlatest' => 'Dette er den godkjente revisjonen av denne siden, samt den nyeste.',
	'approvedrevs-viewlatest' => 'Se den nyeste revisjonen.',
	'approvedpages' => 'Godkjente sider',
	'approvedrevs-approvedpages-docu' => 'De følgende sidene er de som har en godkjent revisjon i wikien.',
	'right-approverevisions' => 'Sett en viss revisjon av en wikiside som godkjent',
	'right-viewlinktolatest' => 'Vis forklarende tekst på toppen av sider som har en godkjent revisjon',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'approvedrevs-desc' => 'Ampòsta na sola revision ëd na pàgina com aprovà',
	'approvedrevs-logname' => "Registr d'aprovassion dle revision",
	'approvedrevs-logdesc' => "Sto-sì a l'é ël registr dle revision ch'a son ëstàite aprovà.",
	'approvedrevs-approve' => 'apreuva',
	'approvedrevs-unapprove' => 'apreuva pa',
	'approvedrevs-approvesuccess' => "Costa revision-sì ëd la pàgina a l'é stàita ampostà com la version aprovà.",
	'approvedrevs-unapprovesuccess' => 'A-i é pa pi na version aprovà për sta pàgina-sì.
Al pòst, a sarà mostrà la revision pi recenta.',
	'approvedrevs-approveaction' => 'a l\'ha marcà $2 tanme revision aprovà për "[[$1]]"',
	'approvedrevs-unapproveaction' => 'gava ampostassion ëd la revision aprovà për "[[$1]]"',
	'approvedrevs-notlatest' => "Costa a l'é la revision aprovà ëd sa pàgina; a l'é pa la pi recenta.",
	'approvedrevs-approvedandlatest' => "Costa a l'é la revision aprovà ëd sa pàgina, e a l'é ëdcò la pi recenta.",
	'approvedrevs-viewlatest' => 'Varda la revision pi recenta.',
	'approvedpages' => 'Pàgine aprovà',
	'approvedrevs-approvedpages-docu' => "Cole sì-sota a son le pàgine ant la wiki che a l'han na revision aprovà.",
	'right-approverevisions' => 'Ampòsta na certa revision ëd na pàgina wiki com aprovà',
	'right-viewlinktolatest' => "Vëdde ël test dë spiegassion an cò dle pàgine ch'a l'han na revision aprovà",
);

/** Portuguese (Português)
 * @author Alchimista
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'approvedrevs-desc' => 'Marcar como aprovada uma das revisões de uma página',
	'approvedrevs-logname' => 'Registo de revisões aprovadas',
	'approvedrevs-logdesc' => 'Este é o registo das revisões que foram aprovadas.',
	'approvedrevs-approve' => 'aprovar',
	'approvedrevs-unapprove' => 'reprovar',
	'approvedrevs-approvesuccess' => 'Esta revisão da página foi definida como a versão aprovada.',
	'approvedrevs-unapprovesuccess' => 'Deixou de existir uma versão aprovada para esta página.
Em vez dela, será apresentada a revisão mais recente.',
	'approvedrevs-approveaction' => 'definir $2 como a revisão aprovada de "[[$1]]"',
	'approvedrevs-unapproveaction' => 'desfazer a definição da revisão aprovada de "[[$1]]"',
	'approvedrevs-notlatest' => 'Esta é a revisão aprovada desta página; não é a revisão mais recente.',
	'approvedrevs-approvedandlatest' => 'Esta é a revisão aprovada desta página e também a revisão mais recente.',
	'approvedrevs-viewlatest' => 'Ver a revisão mais recente.',
	'approvedpages' => 'Páginas aprovadas',
	'approvedrevs-approvedpages-docu' => 'As seguintes páginas desta wiki têm uma revisão aprovada.',
	'right-approverevisions' => 'Definir como aprovada uma revisão específica de uma página da wiki',
	'right-viewlinktolatest' => 'Ver um texto explicativo no topo das páginas que têm uma revisão aprovada',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Giro720
 */
$messages['pt-br'] = array(
	'approvedrevs-desc' => 'Marcar como aprovada uma das revisões de uma página',
	'approvedrevs-logname' => 'Registro de revisões aprovadas',
	'approvedrevs-logdesc' => 'Este é o registro das revisões que foram aprovadas.',
	'approvedrevs-approve' => 'aprovar',
	'approvedrevs-unapprove' => 'reprovar',
	'approvedrevs-approvesuccess' => 'Esta revisão da página foi definida como a versão aprovada.',
	'approvedrevs-unapprovesuccess' => 'Deixou de existir uma versão aprovada para esta página.
Em vez dela, será apresentada a revisão mais recente.',
	'approvedrevs-approveaction' => 'definir $2 como a revisão aprovada de "[[$1]]"',
	'approvedrevs-unapproveaction' => 'desfazer a definição da revisão aprovada de "[[$1]]"',
	'approvedrevs-notlatest' => 'Esta é a revisão aprovada desta página; não é a revisão mais recente.',
	'approvedrevs-approvedandlatest' => 'Esta é a revisão aprovada desta página e também a revisão mais recente.',
	'approvedrevs-viewlatest' => 'Ver a revisão mais recente.',
	'approvedpages' => 'Páginas aprovadas',
	'approvedrevs-approvedpages-docu' => 'As seguintes páginas desta wiki têm uma revisão aprovada.',
	'right-approverevisions' => 'Definir como aprovada uma revisão específica de uma página da wiki',
	'right-viewlinktolatest' => 'Ver um texto explicativo no topo das páginas que têm uma revisão aprovada',
);

/** Russian (Русский)
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'approvedrevs-desc' => 'Установка одной из версий страниц как подтверждённой',
	'approvedrevs-logname' => 'Журнал подтверждения версий',
	'approvedrevs-logdesc' => 'Это журнал версий страниц, которые были подтверждены.',
	'approvedrevs-approve' => 'подтвердить',
	'approvedrevs-unapprove' => 'снять подтверждение',
	'approvedrevs-approvesuccess' => 'Это версия страницы была отмечена как подтверждённая.',
	'approvedrevs-unapprovesuccess' => 'Не существует подтверждённой версии этой страницы.
Вместо неё будет показана последняя версия.',
	'approvedrevs-approveaction' => 'установить $2 как подтверждённую версию «[[$1]]»',
	'approvedrevs-unapproveaction' => 'снять утверждённую версию для «[[$1]]»',
	'approvedrevs-notlatest' => 'Это утверждённая версия страницы. Существуют более свежие версии.',
	'approvedrevs-approvedandlatest' => 'Это утверждённая версия страницы. Она же является наиболее свежей версией.',
	'approvedrevs-viewlatest' => 'Просмотреть самую свежую версию.',
	'approvedpages' => 'Подтверждённые страницы',
	'approvedrevs-approvedpages-docu' => 'Ниже показан список вики-страниц, имеющих подтверждённые версии.',
	'right-approverevisions' => 'отметка определённых версий вики-страниц как подтверждённых',
	'right-viewlinktolatest' => 'просмотр пояснительного текста в верхней части страниц, имеющих утверждённые версии',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'approvedrevs-logname' => 'కూర్పుల అనుమతులు చిట్టా',
	'approvedrevs-approve' => 'అనుమతించు',
	'approvedpages' => 'అనుమతించిన పుటలు',
);

/** Turkish (Türkçe)
 * @author Srhat
 */
$messages['tr'] = array(
	'approvedrevs-desc' => 'Bir sayfanın belirli bir revizyonunu onaylanmış olarak ayarla',
	'approvedrevs-logname' => 'Revizyon onay günlüğü',
	'approvedrevs-logdesc' => 'Bu liste onaylanmış revizyon günlüğüdür.',
	'approvedrevs-approve' => 'onayla',
	'approvedrevs-unapprove' => 'onayı kaldır',
	'approvedrevs-approvesuccess' => 'Sayfaya ait bu revizyon onaylanmış revizyon olarak ayarlandı.',
	'approvedrevs-unapprovesuccess' => 'Bu sayfanın artık onaylanmış sürümü yok.
Onun yerine, en son revizyon gösterilecektir.',
	'approvedrevs-approveaction' => '$2 revizyonunu "[[$1]]" sayfasının onaylanmış revizyonu olarak ayarladı',
	'approvedrevs-unapproveaction' => '"[[$1]]" sayfasının onaylanmış revizyonunun onayını kaldırdı.',
	'approvedrevs-notlatest' => 'Bu sayfanın onaylanmış revizyonudur; en son revizyon değildir.',
	'approvedrevs-approvedandlatest' => 'Bu revizyon, sayfanın hem onaylanmış hem de en son revizyonudur.',
	'approvedrevs-viewlatest' => 'En son revizyonu görüntüle',
	'approvedpages' => 'Onaylanmış sayfalar',
	'approvedrevs-approvedpages-docu' => 'Aşağıdakiler, onaylanmış revizyonu bulunan viki sayfalardır.',
	'right-approverevisions' => 'Bir viki sayfasının belirli bir revizyonunu onaylanmış olarak ayarla',
	'right-viewlinktolatest' => 'Onaylanmış revizyonu bulunan sayfaların başındaki açıklayıcı metni görüntüle',
);

