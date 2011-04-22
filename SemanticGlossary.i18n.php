<?php
/**
 * Language file for Semantic Glossary
 */

$messages = array();

/** English
 * @author F.trott
 */
$messages['en'] = array(
	'semanticglossary-desc' => 'A glossary extension with a [http://semantic-mediawiki.org Semantic MediaWiki] backend',
	'semanticglossary-browsertitle' => 'Glossary',
	'semanticglossary-deleteselected' => 'Delete selected',
	'semanticglossary-savechanges' => 'Save changes',
	'semanticglossary-createnew' => 'Create new term',

	'semanticglossary-termsdefined' => 'These are the terms defined in the wiki:',
	'semanticglossary-notermsdefined' => 'There are currently no terms defined in the wiki.',
	'semanticglossary-enternewterm' => 'You can enter a new term and definition here:',

	'semanticglossary-messageheader' => 'Messages:',
	'semanticglossary-storedtermdefinedinarticle' => 'The term "$1" was originally defined in page [[$2]]. The definition was changed as required for now. However, as soon as the original page is edited again, the definition there takes precedence.',
	'semanticglossary-deletedtermdefinedinarticle' => 'The term "$1" was originally defined in page [[$2]]. The definition was deleted as required for now. However, as soon as the original page is edited again, the definition there takes precedence.',
	'semanticglossary-termdeleted' => 'Deleted $1.',
	'semanticglossary-termchanged' => 'Changed $1.',
	'semanticglossary-termadded' => 'Added $1.',
	'semanticglossary-storedtermdefinedtwice' => 'The page [[$1]] contains more than one property named $2. Will not store data for term "$3".',
	'semanticglossary-termdefinedtwice' => 'The page [[$1]] contains more than one term and/or more than one definition. The entries will not be available for the glossary.',
	'semanticglossary-brokensession' => 'Action not allowed. Broken session data.',
	'semanticglossary-norights' => 'Action not allowed. Insufficient rights.',

	'semanticglossary-prop-glt' => 'Glossary-Term',
	'semanticglossary-prop-gld' => 'Glossary-Definition',
	'semanticglossary-prop-gll' => 'Glossary-Link',

);

/** Message documentation (Message documentation)
 * @author F.trott
 * @author Purodha
 */
$messages['qqq'] = array(
	'semanticglossary-desc' => '{{desc}}',
	'semanticglossary-deleteselected' => 'This is the label of a button.',
	'semanticglossary-savechanges' => 'This is the label of a button.',
	'semanticglossary-createnew' => 'This is the label of a button.',
	'semanticglossary-prop-glt' => 'This is the name of a [http://semantic-mediawiki.org/wiki/Property property] in the sense of [http://semantic-mediawiki.org/ Semantic MediaWiki].',
	'semanticglossary-prop-gld' => 'This is the name of a [http://semantic-mediawiki.org/wiki/Property property] in the sense of [http://semantic-mediawiki.org/ Semantic MediaWiki].',
	'semanticglossary-prop-gll' => 'This is the name of a [http://semantic-mediawiki.org/wiki/Property property] in the sense of [http://semantic-mediawiki.org/ Semantic MediaWiki].',
);

/** Old English (Ænglisc)
 * @author Gott wisst
 */
$messages['ang'] = array(
	'semanticglossary-desc' => 'Ȝetæl ƿorda mid [http://semantic-mediawiki.org Semantic MediaǷiki] bæcende',
	'semanticglossary-browsertitle' => 'Ȝetæl ƿorda',
	'semanticglossary-deleteselected' => 'Forlēos þā ȝecorenan',
	'semanticglossary-savechanges' => 'Horda hƿearfunȝa',
	'semanticglossary-createnew' => 'Sciepp nīƿe ƿord',
	'semanticglossary-termsdefined' => 'Þās sind þā amearcodan ƿord on þissus ƿiki:',
	'semanticglossary-notermsdefined' => 'Þǣr sind nū nǣnȝu amearcod ƿord on þissum ƿiki.',
	'semanticglossary-enternewterm' => 'Þū mōst inƿrītan nīƿe ƿord and amearcunȝe hēr:',
	'semanticglossary-messageheader' => 'Ǣrendȝeƿritu:',
	'semanticglossary-storedtermdefinedinarticle' => 'Þæt ƿord "$1" ƿæs ǣrost amearcod on þǣm [[$2]] tramete. Sēo amearcunȝ ƿæs āƿend sƿā nū is þearf. Þēahhƿæðere, sōna se ǣra tramet sīe eft āƿend, sēo amearcunȝ bēo hefiȝre.',
	'semanticglossary-deletedtermdefinedinarticle' => 'Þæt ƿord "$1" ƿæs ǣrost amearcod on þǣm [[$2]] tramete. Sēo amearcunȝ ƿæs forloren sƿā is nū þearf. Þēahhƿæðere, sōna se ǣra tramet sīe eft āƿend, sēo amearcunȝ þǣr bēo hefiȝre.',
	'semanticglossary-termdeleted' => 'Forlēas $1.',
	'semanticglossary-termchanged' => 'Āƿende $1.',
	'semanticglossary-termadded' => 'Ēacnode mid $1.',
	'semanticglossary-storedtermdefinedtwice' => 'Se tramet [[$1]] innaþ mā þonne ān þāra ƿeorða mid þǣm naman $2. Ne hordaþ ȝeƿitnesse þæs ƿordes "$3".',
	'semanticglossary-termdefinedtwice' => 'Se tramet [[$1]] innaþ mā þonne ān ƿord oþþe mā þonne āne amearcunȝe. Þā ȝeƿritu ne bēoþ ȝearu on þǣm ȝetæle ƿorda.',
	'semanticglossary-brokensession' => 'Dǣd nis alȳfedlīc. Ȝebrocen tīman ȝeƿitness.',
	'semanticglossary-norights' => 'Dǣd nis alȳfedlīc. Ne sind ȝenōh riht.',
	'semanticglossary-prop-glt' => 'Ƿordȝetælƿord',
	'semanticglossary-prop-gld' => 'Ƿordȝetælamearcunȝ',
	'semanticglossary-prop-gll' => 'Ƿordȝetælhlence',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'semanticglossary-browsertitle' => 'Geriaoueg',
	'semanticglossary-deleteselected' => 'Dilemel ar re diuzet',
	'semanticglossary-savechanges' => "Enrollañ ar c'hemmoù",
	'semanticglossary-createnew' => 'Krouiñ un termen nevez',
	'semanticglossary-termsdefined' => 'Setu aze an termenoù termenet er wiki :',
	'semanticglossary-notermsdefined' => "N'eus bet termenet termen ebet er wiki evit poent.",
	'semanticglossary-enternewterm' => 'Gallout a rit merkañ un termen nevez gant e dermandur amañ :',
	'semanticglossary-messageheader' => 'Kemennadennoù :',
	'semanticglossary-termdeleted' => 'Diverket $1',
	'semanticglossary-termchanged' => 'Kemmet $1.',
	'semanticglossary-termadded' => 'Ouzhpennet $1.',
	'semanticglossary-termdefinedtwice' => "Muioc'h eget un termen ha/pe un termenadur zo er bajenn [[$1]]. N'hallo ket ar pennger-se bezañ implijet er c'heriaoueg.",
	'semanticglossary-norights' => "N'eo ket aotreet an ober-mañ. Re skort eo ho gwirioù.",
	'semanticglossary-prop-glt' => 'Geriaoueg-Termen',
	'semanticglossary-prop-gld' => 'Geriaoueg-Termenadur',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'semanticglossary-browsertitle' => 'Rječnik',
	'semanticglossary-deleteselected' => 'Obriši označeno',
	'semanticglossary-savechanges' => 'Spremi izmjene',
	'semanticglossary-createnew' => 'Napravi novi pojam',
	'semanticglossary-messageheader' => 'Poruke:',
	'semanticglossary-termdeleted' => 'Obrisano $1.',
	'semanticglossary-norights' => 'Akcija nije dopuštena. Nemate dovoljno prava.',
	'semanticglossary-prop-glt' => 'Rječnički-Pojam',
	'semanticglossary-prop-gld' => 'Rječnička-Definicija',
);

/** German (Deutsch)
 * @author F.trott
 * @author Kghbln
 */
$messages['de'] = array(
	'semanticglossary-desc' => 'Ermöglicht die Erstellung und Nutzung eines Glossars mit [http://semantic-mediawiki.org/wiki/Semantic_MediaWiki_–_Startseite Semantic MediaWiki] als Basis',
	'semanticglossary-browsertitle' => 'Glossar',
	'semanticglossary-deleteselected' => 'Ausgewählte löschen',
	'semanticglossary-savechanges' => 'Änderungen speichern',
	'semanticglossary-createnew' => 'Neuen Begriff anlegen',
	'semanticglossary-termsdefined' => 'Diese Begriffe sind im Wiki definiert:',
	'semanticglossary-notermsdefined' => 'Es sind derzeit keine Begriffe im Wiki definiert.',
	'semanticglossary-enternewterm' => 'Hier kann ein neuer Begriff mit seiner Definition eingegeben werden:',
	'semanticglossary-messageheader' => 'Meldungen:',
	'semanticglossary-storedtermdefinedinarticle' => 'Der Begriff „$1“ wurde ursprünglich auf Seite [[$2]] definiert. Die Definition wurde vorerst entsprechend den Eingaben geändert. Allerdings wird, sobald die ursprüngliche Seite bearbeitet wird, die dort angegebene Definition wieder den Vorrang erhalten.',
	'semanticglossary-deletedtermdefinedinarticle' => 'Der Begriff „$1“ wurde ursprünglich auf Seite [[$2]] definiert. Die Definition wurde vorerst gelöscht. Allerdings wird, sobald die ursprüngliche Seite bearbeitet wird, die dort angegebene Definition wieder den Vorrang erhalten.',
	'semanticglossary-termdeleted' => 'Der Begriff „$1“ wurde gelöscht.',
	'semanticglossary-termchanged' => 'Der Begriff „$1“ wurde geändert.',
	'semanticglossary-termadded' => 'Der Begriff „$1“ wurde hinzugefügt.',
	'semanticglossary-storedtermdefinedtwice' => 'Die Seite [[$1]] enthält mehr als ein Attribut namens $2. Die Daten für den Begriff „$3“ werden nicht gespeichert.',
	'semanticglossary-termdefinedtwice' => 'Die Seite [[$1]] enthält mehr als einen Begriff und/ oder mehr als eine Definition. Die Eingaben werden daher nicht im Glossar verfügbar sein.',
	'semanticglossary-brokensession' => 'Diese Aktion ist nicht zulässig: Abgelaufene Sitzungsdaten.',
	'semanticglossary-norights' => 'Diese Aktion ist nicht zulässig: Unzureichende Berechtigungen.',
	'semanticglossary-prop-glt' => 'Glossar (Begriff)',
	'semanticglossary-prop-gld' => 'Glossar (Definition)',
	'semanticglossary-prop-gll' => 'Glossar (Link)',
);

/** French (Français)
 * @author IAlex
 */
$messages['fr'] = array(
	'semanticglossary-desc' => 'Une extension de glossaire utilisant [http://semantic-mediawiki.org Semantic MediaWiki]',
	'semanticglossary-browsertitle' => 'Glossaire',
	'semanticglossary-deleteselected' => 'Supprimer la sélection',
	'semanticglossary-savechanges' => 'Sauvegarder les modifications',
	'semanticglossary-createnew' => 'Créer un nouveau terme',
	'semanticglossary-termsdefined' => 'Voici les termes définis sur le wiki :',
	'semanticglossary-notermsdefined' => "Il n'y a actuellement aucun terme défini sur le wiki.",
	'semanticglossary-enternewterm' => 'Vous pouvez entrer un nouveau terme et sa définition ici :',
	'semanticglossary-messageheader' => 'Messages :',
	'semanticglossary-termdeleted' => '$1 supprimé.',
	'semanticglossary-termchanged' => '$1 modifié.',
	'semanticglossary-termadded' => '$1 ajouté.',
);

/** Hebrew (עברית)
 * @author Amire80
 */
$messages['he'] = array(
	'semanticglossary-desc' => 'הרחבה ליצירת מונחון עם מנוע של [http://semantic-mediawiki.org מדיה־ויקי סמנטית]',
	'semanticglossary-browsertitle' => 'מונחון',
	'semanticglossary-deleteselected' => 'מחיקת הפריטים שנבחרו',
	'semanticglossary-savechanges' => 'שמירת שינויים',
	'semanticglossary-createnew' => 'יצירת מונח חדש',
	'semanticglossary-termsdefined' => 'אלה המונחים שהוגדרו בוייקי הזאת:',
	'semanticglossary-notermsdefined' => 'כעת אין מונחים שהוגדרו בוויקי הזה.',
	'semanticglossary-enternewterm' => 'אפשר להוסיף מונח חדש עם הגדרה כאן:',
	'semanticglossary-messageheader' => 'הודעות:',
	'semanticglossary-storedtermdefinedinarticle' => 'המונח "$1" הוגדר במקור בדף [[$2]]. ההגדרה שונתה כפי שנדרש עכשיו. אולם כאשר הדף המקורי ייערך שוב, ההגדרה שם תוחל.',
	'semanticglossary-deletedtermdefinedinarticle' => 'המונח "$1" הוגדר במקור בדף [[$2]]. ההגדרה נמחקה כפי שנדרש עכשיו. אולם כאשר הדף המקורי ייערך שוב, ההגדרה שם תוחל.',
	'semanticglossary-termdeleted' => '$1 נמחק.',
	'semanticglossary-termchanged' => '$1 שוּנה.',
	'semanticglossary-termadded' => '$1 נוסף.',
	'semanticglossary-storedtermdefinedtwice' => 'הדף [[$1]] מכיל יותר ממאפיין אחד בשם $2. נתונים על המונח "$3" לא יישמרו.',
	'semanticglossary-termdefinedtwice' => 'הדף [[$1]] מכיל יותר ממונח אחד או יותר מהגדרה אחת. הערכים לא יהיו זמינים למונחון.',
	'semanticglossary-brokensession' => 'פעולה לא מורשית. נתוני שיח מקולקלים.',
	'semanticglossary-norights' => 'פעולה לא מורשית. אין הרשאות מספיקות.',
	'semanticglossary-prop-glt' => 'מונח-במונחון',
	'semanticglossary-prop-gld' => 'הגדרה-במונחון',
	'semanticglossary-prop-gll' => 'קישור-במונחון',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'semanticglossary-desc' => 'Un extension pro glossarios a base de [http://semantic-mediawiki.org Semantic MediaWiki]',
	'semanticglossary-browsertitle' => 'Glossario',
	'semanticglossary-deleteselected' => 'Deler selection',
	'semanticglossary-savechanges' => 'Salveguardar modificationes',
	'semanticglossary-createnew' => 'Crear nove termino',
	'semanticglossary-termsdefined' => 'Istes es le terminos definite in iste wiki:',
	'semanticglossary-notermsdefined' => 'Actualmente il non ha terminos definite in le wiki.',
	'semanticglossary-enternewterm' => 'Tu pote entrar un nove termino e definition hic:',
	'semanticglossary-messageheader' => 'Messages:',
	'semanticglossary-storedtermdefinedinarticle' => 'Le termino "$1" esseva originalmente definite in le pagina [[$2]]. Le definition esseva cambiate como necessari pro le momento. Nonobstante, si tosto que le pagina original es modificate de novo, le definition de illo habera le precedentia.',
	'semanticglossary-deletedtermdefinedinarticle' => 'Le termino "$1" esseva originalmente definite in le pagina [[$2]]. Le definition esseva delite como necessari pro le momento. Nonobstante, si tosto que le pagina original es modificate de novo, le definition de illo habera le precedentia.',
	'semanticglossary-termdeleted' => '$1 delite.',
	'semanticglossary-termchanged' => '"$1" modificate.',
	'semanticglossary-termadded' => '"$1" addite.',
	'semanticglossary-storedtermdefinedtwice' => 'Le pagina [[$1]] contine plus de un proprietate con nomine $2. Le datos pro le termino "$3" non essera immagazinate.',
	'semanticglossary-termdefinedtwice' => 'Le pagina [[$1]] contine plus de un termino e/o plus de un definition. Le entratas non essera disponibile in le glossario.',
	'semanticglossary-brokensession' => 'Action non permittite. Datos de session defectuose.',
	'semanticglossary-norights' => 'Action non permittite. Derectos insufficiente.',
	'semanticglossary-prop-glt' => 'Termino de glossario',
	'semanticglossary-prop-gld' => 'Definition de glossario',
	'semanticglossary-prop-gll' => 'Ligamine-a-glossario',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'semanticglossary-desc' => 'E Zohsazprojramm för e Verzeishneß met makeerte Bejreffe met [http://semantic-mediawiki.org Semantesch MediaWiki] dohenger.',
	'semanticglossary-browsertitle' => 'Wööterverzeischneß',
	'semanticglossary-deleteselected' => 'Donn de ußjewählte fottschmieße!',
	'semanticglossary-savechanges' => 'Änderunge faßhallde',
	'semanticglossary-createnew' => 'Donn ene neue Bejreff aanlääje',
	'semanticglossary-termsdefined' => 'Heh di Bejreffe sin em Wiki singem Wööterverzeischneß:',
	'semanticglossary-notermsdefined' => 'Em Momang sinn_er kein Bejreffe em Wiki singem Wööterverzeischneß faßjehallde.',
	'semanticglossary-enternewterm' => 'Heh kam_mer ne neuje Bejreff enjävve un ussenander possemänteere, wat dä bedügg:',
	'semanticglossary-messageheader' => 'Nohreschte:',
	'semanticglossary-storedtermdefinedinarticle' => 'Di Bedügdenis vun däm Bejreff „$1“ wood et eets op dä Sigg „[[$2]]“ ussenander possemänteert.
Jäz eß di Bedüggdeneß wi nüüdesch aanjepaß woode.
Allerdengs, wann di orschprönglesche Sigg norr_ens verändert weed, kritt dat, wat doh shtund, widder der Vörrang.',
	'semanticglossary-deletedtermdefinedinarticle' => 'Di Bedüggdeneß vun däm Bejreff „$1“ wood et eets op dä Sigg „[[$2]]“ ussenander possemänteert.
Jäz eß di Bedüggdeneß wi nüüdesch fott jeschmeße woode.
Allerdengs, esubalt di orschprönglesche Sigg norr_ens verändert weed, kritt dat, wat doh shtund, widder der Vörrang.',
	'semanticglossary-termdeleted' => '„$1“ es fottjeschmeße.',
	'semanticglossary-termchanged' => 'Dä Bejreff „$1“ es jeändert.',
	'semanticglossary-termadded' => 'Dä Bejreff „$1“ es dobei jekumme.',
	'semanticglossary-storedtermdefinedtwice' => 'En dä Sigg „[[$1]]“ es mieh wi ein Eijeschaff mem Naame „$2“ dren. Di Daate för dä Bejreff „$3“ wääde nit faßjehallde.',
	'semanticglossary-termdefinedtwice' => 'En dä Sigg „[[$1]]“ es mieh wie eine Bejreff, udder miehj wi ein Bedüggdeneß usseneijn possemänteert, udder beeds. Di wääde nit em Wööter_Verzeishneß faßjehallde.',
	'semanticglossary-brokensession' => 'Dat jeiht nit. Ding Daate fum Enlogge sin fott.',
	'semanticglossary-norights' => 'Dat es nit zohjelohße.
Ding Zohjreffsrräschte ricke doh nit för.',
	'semanticglossary-prop-glt' => 'Bejreff em Wööterverzeijschneß',
	'semanticglossary-prop-gld' => 'Bedüggdeneß em Wööterverzeischneß',
	'semanticglossary-prop-gll' => 'Lenk en et Wööterverzeischneß',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'semanticglossary-browsertitle' => 'Glossaire',
	'semanticglossary-savechanges' => 'Ännerunge späicheren',
	'semanticglossary-createnew' => 'Neie Begrëff uleeën',
	'semanticglossary-messageheader' => 'Messagen:',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'semanticglossary-desc' => 'Додаток со поимник за [http://semantic-mediawiki.org Семантички МедијаВики]',
	'semanticglossary-browsertitle' => 'Поимник',
	'semanticglossary-deleteselected' => 'Избриши одбрано',
	'semanticglossary-savechanges' => 'Зачувај промени',
	'semanticglossary-createnew' => 'Создај нова поим',
	'semanticglossary-termsdefined' => 'Еве ги поимите определени во викито:',
	'semanticglossary-notermsdefined' => 'Моментално нема поими определени во викито.',
	'semanticglossary-enternewterm' => 'Тука можете да внесете нов поим и значење:',
	'semanticglossary-messageheader' => 'Пораки:',
	'semanticglossary-storedtermdefinedinarticle' => 'Поимот „$1“ бил првично утврден на страницата [[$2]]. Толкувањето е сменето според тековните потреби. Но штом повторно ќе се уреди изворната страница, тамошното толкување добива предност.',
	'semanticglossary-deletedtermdefinedinarticle' => 'Поимот „$1“ бил првично утврден на страницата [[$2]]. Толкувањето е избришано според тековните потреби. Но штом повторно ќе се уреди изворната страница, тамошното толкување добива предност.',
	'semanticglossary-termdeleted' => 'Го избришав $1.',
	'semanticglossary-termchanged' => 'Изменето: $1.',
	'semanticglossary-termadded' => 'Додадено: $1.',
	'semanticglossary-storedtermdefinedtwice' => 'Страницата [[$1]] содржи повеќе од едно својство со име $2. Нема да зачувам податоци за поимот „$3“.',
	'semanticglossary-termdefinedtwice' => 'Оваа страница [[$1]] содржи повеќе од еден поим и/или повеќе од едно толкување. Овие записи нема да бидат достапни во поимникот.',
	'semanticglossary-brokensession' => 'Дејството не е допуштено. Сесиските податоци се расипани.',
	'semanticglossary-norights' => 'Дејството не е допуштено. Немате доволно права.',
	'semanticglossary-prop-glt' => 'Поимник-Поим',
	'semanticglossary-prop-gld' => 'Поимник-Толкување',
	'semanticglossary-prop-gll' => 'Поимник-Врска',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'semanticglossary-desc' => 'Begrippenlijst die gebruik maakt van [http://semantic-mediawiki.org Semantic MediaWiki]',
	'semanticglossary-browsertitle' => 'Begrippenlijst',
	'semanticglossary-deleteselected' => 'Selectie verwijderen',
	'semanticglossary-savechanges' => 'Wijzigingen opslaan',
	'semanticglossary-createnew' => 'Nieuwe begrip aanmaken',
	'semanticglossary-termsdefined' => 'Dit zijn de in de wiki gedefinieerde begrippen:',
	'semanticglossary-notermsdefined' => 'Er zijn momenteel geen begrippen gedefinieerd in de wiki.',
	'semanticglossary-enternewterm' => 'U kunt hier een nieuw begrip met definitie hier invoeren:',
	'semanticglossary-messageheader' => 'Berichten:',
	'semanticglossary-storedtermdefinedinarticle' => 'Het begrip "$1" was oorspronkelijk gedefinieerd op de pagina [[$2]]. De definitie is gewijzigd. Echter, wanneer de oorspronkelijke pagina opnieuw wordt bewerkt, heeft die definitie weer voorrang.',
	'semanticglossary-deletedtermdefinedinarticle' => 'Het begrip "$1" was oorspronkelijk gedefinieerd op de pagina [[$2]]. De definitie is verwijderd. Echter, wanneer de oorspronkelijke pagina opnieuw wordt bewerkt, heeft die definitie weer voorrang.',
	'semanticglossary-termdeleted' => '"$1" verwijderd',
	'semanticglossary-termchanged' => '"$1" gewijzigd.',
	'semanticglossary-termadded' => '"$1" toegevoegd.',
	'semanticglossary-storedtermdefinedtwice' => 'De pagina [[$1]] bevat meerdere eigenschappen met de naam $2. De gegevens voor Het begrip "$3" worden niet opgeslagen.',
	'semanticglossary-termdefinedtwice' => 'De pagina [[$1]] bevat meerdere begrippen of definities van/voor hetzelfde. De gegevens zijn niet beschikbaar in de begrippenlijst.',
	'semanticglossary-brokensession' => 'De handeling is niet toegestaan. De sessie is afgebroken.',
	'semanticglossary-norights' => 'De handeling is niet toegestaan. Onvoldoende rechten.',
	'semanticglossary-prop-glt' => 'Begrippenlijstbegrip',
	'semanticglossary-prop-gld' => 'Begrippenlijstdefinitie',
	'semanticglossary-prop-gll' => 'Begrippenlijstverwijzing',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'semanticglossary-browsertitle' => 'وييپانګه',
	'semanticglossary-deleteselected' => 'ټاکل شوی ړنګول',
	'semanticglossary-savechanges' => 'بدلونونه خوندي کول',
	'semanticglossary-messageheader' => 'پيغامونه:',
);

/** Russian (Русский)
 * @author Lockal
 * @author Ичи
 */
$messages['ru'] = array(
	'semanticglossary-browsertitle' => 'Глоссарий',
	'semanticglossary-deleteselected' => 'Удалить выбранные',
	'semanticglossary-savechanges' => 'Сохранить изменения',
	'semanticglossary-createnew' => 'Создать новый термин',
	'semanticglossary-termsdefined' => 'Это термины, определяемые в вики:',
	'semanticglossary-enternewterm' => 'Здесь вы можете ввести новый термин и определение:',
	'semanticglossary-messageheader' => 'Сообщения:',
	'semanticglossary-storedtermdefinedinarticle' => 'Термин «$1» был первоначально определён на странице [[$2]]. Определение было изменено в соответствии с текущими требованиями. Однако, после следующего редактирования, определение будет приоритетным.',
	'semanticglossary-termdeleted' => 'Термин $1 удалён.',
	'semanticglossary-termchanged' => 'Термин $1 изменён.',
	'semanticglossary-termadded' => 'Добавлен термин $1.',
	'semanticglossary-brokensession' => 'Действие не допускается. Данные сессии повреждены.',
	'semanticglossary-norights' => 'Действие не допускается. Недостаточно прав.',
	'semanticglossary-prop-glt' => 'Глоссарий-Термин',
	'semanticglossary-prop-gld' => 'Глоссарий-Определение',
	'semanticglossary-prop-gll' => 'Глоссарий-Ссылка',
);

/** Serbian Cyrillic ekavian (‪Српски (ћирилица)‬)
 * @author Rancher
 */
$messages['sr-ec'] = array(
	'semanticglossary-browsertitle' => 'Речник',
	'semanticglossary-deleteselected' => 'Обриши изабрано',
	'semanticglossary-savechanges' => 'Сачувај измене',
	'semanticglossary-createnew' => 'Направи нови појам',
	'semanticglossary-termsdefined' => 'Ово су појмови одређени у викију:',
	'semanticglossary-notermsdefined' => 'Нема појмова одређених у викију.',
	'semanticglossary-enternewterm' => 'Можете унети нови појам и дефиницију овде:',
	'semanticglossary-messageheader' => 'Поруке:',
	'semanticglossary-storedtermdefinedinarticle' => 'Појам „$1“ је изворно одређен у страници [[$2]]. Дефиниција је промењена. Када се изворна страница поново измени, дефиниција ће стећи предност.',
	'semanticglossary-deletedtermdefinedinarticle' => 'Појам „$1“ је изворно одређен у страници [[$2]]. Дефиниција је обрисана. Када се изворна страница поново измени, дефиниција ће стећи предност.',
	'semanticglossary-termdeleted' => 'Обрисано $1.',
	'semanticglossary-storedtermdefinedtwice' => 'Страница [[$1]] садржи више од једног својства с називом $2. Она неће смештати податке за појам „$3“.',
	'semanticglossary-termdefinedtwice' => 'Страница [[$1]] садржи више од једног појма и дефиниције. Уноси неће бити доступни речнику.',
	'semanticglossary-brokensession' => 'Радња није дозвољена. Подаци о сесији су изгубљени.',
	'semanticglossary-norights' => 'Радња није дозвољена. Немате потребна права.',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'semanticglossary-browsertitle' => 'పదకోశం',
	'semanticglossary-deleteselected' => 'ఎంచుకున్నవాటిని తొలగించు',
	'semanticglossary-savechanges' => 'మార్పులను భద్రపరచు',
	'semanticglossary-createnew' => 'కొత్త పదాన్ని సృష్టించు',
	'semanticglossary-termsdefined' => 'ఈ వికీలో నిర్వచించిన పదాలు:',
	'semanticglossary-messageheader' => 'సందేశాలు:',
	'semanticglossary-termdeleted' => '$1ని తొలగించారు.',
	'semanticglossary-termchanged' => '$1ని మార్చారు.',
	'semanticglossary-termadded' => '$1ని చేర్చారు.',
	'semanticglossary-norights' => 'చర్యను అనుమతించము. తగినన్ని అధికారాలు లేవు.',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'semanticglossary-desc' => 'Isang dugtong ng glosaryo na may isang dulong panlikod na [http://semantic-mediawiki.org Semantikong MediaWiki]',
	'semanticglossary-browsertitle' => 'Glosaryo',
	'semanticglossary-deleteselected' => 'Burahin ang napili',
	'semanticglossary-savechanges' => 'Sagipin ang mga pagbabago',
	'semanticglossary-createnew' => 'Lumikha ng bagong kataga',
	'semanticglossary-termsdefined' => 'Ito ang mga katagang binigyan ng kahulugan sa loob ng wiki:',
	'semanticglossary-notermsdefined' => 'Pangkasalukuyang walang mga katagang binigyan ng kahulugan sa loob ng wiki.',
	'semanticglossary-enternewterm' => 'Makapagpapasok ka rito ng isang bagong kataga at kahulugan:',
	'semanticglossary-messageheader' => 'Mga mensahe:',
	'semanticglossary-storedtermdefinedinarticle' => 'Ang katagang "$1" ay orihinal na binigyan ng kahulugan sa pahinang [[$2]].  Binago ang kahulugan ayon sa pangangailangan para sa ngayon.  Subalit, kapag nabago na ulit ang orihinal na pahina, ang kahulugan doon ang magkakamit ng mas mahigit na kahalagan.',
	'semanticglossary-deletedtermdefinedinarticle' => 'Ang katagang "$1" ay orihinal na nabigyan ng kahulugan sa pahina [[$2]].  Nabura ang kahulugan ayon sa pangangailangan sa ngayon.  Subalit, kapag binago na ulit ang orihinal na pahina, ang kahulugan doon ang magkakamit ng mas mahigit na kahalagahan.',
	'semanticglossary-termdeleted' => 'Binura ang $1.',
	'semanticglossary-termchanged' => 'Binago ang $1.',
	'semanticglossary-termadded' => 'Idinagdag ang $1.',
	'semanticglossary-storedtermdefinedtwice' => 'Ang pahinang [[$1]] ay naglalaman ng mas mahigit kaysa isang ari-arian na pinangalanang $2.  Hindi mag-iimbak ng dato para sa katagang "$3".',
	'semanticglossary-termdefinedtwice' => 'Ang pahinang [[$1]] ay naglalaman ng mas mahigit kaysa isang kataga at/o mas mahigit pa sa isang kahulugan.  Ang mga pagpapasok ay hindi makukuha para sa glosaryo.',
	'semanticglossary-brokensession' => 'Hindi pinapayagan ang kilos.  Sira ang dato ng inilaang panahon.',
	'semanticglossary-norights' => 'Hindi pinapahintulutan ang galaw.  Hindi sapat ang mga karapatan.',
	'semanticglossary-prop-glt' => 'Kataga sa Glosaryo',
	'semanticglossary-prop-gld' => 'Kahulugan sa Glosaryo',
	'semanticglossary-prop-gll' => 'Kawing sa Glosaryo',
);

