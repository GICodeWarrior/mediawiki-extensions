<?php
/**
 * Internationalization file for the AdManager extension.
 *
 * @file
 * @ingroup Extensions
 */
$messages = array();

/** English
 * @author Ike Hecht
 */
$messages['en'] = array(
	'admanager' => 'Ad Manager',
	'admanagerzones' => 'Ad Manager Zones',
	'admanager-desc' => 'Provides a [[Special:AdManager|special page]] which allows sysops to set the zone for pages or categories',
	'admanager_docu' => 'To add or remove the ad zone of a page or entire category, add or remove its title below.',
	'admanagerzones_docu' => 'Enter each ad zone number on its own line.',
	'admanager_invalidtargetpage' => 'No page found with title "$1".',
	'admanager_invalidtargetcategory' => 'No category found with title "$1".',
	'admanager_notable' => 'Error! A required database table was not found! Run update.php first.',
	'admanager_noAdManagerZones' => 'Error! You must add some ad zones. Enter them at [[Special:AdManagerZones|Ad Manager Zones]].',
	'admanager_labelPage' => 'Page titles',
	'admanager_labelCategory' => 'Category names',
	'admanager_submit' => 'Submit',
	'admanager_noads' => 'Display no ads',
	'admanager_Page' => 'Pages',
	'admanager_Category' => 'Categories',
	'admanager_added' => 'Your changes have been saved',
	'admanager_noadsset' => '$1 has been set to show no ads',
	'admanager_addedzone' => 'Added zone',
	'admanager_zonenum' => 'Zone #: $1',
	'admanager_zonenotnumber' => 'Error! $1 is not a number.',
	'admanager_return' => 'Return to [[Special:AdManager|Ad Manager]]',
	'admanager_gotoads' => '[[Special:AdManager|Edit ad placement]]',
	'admanager_gotozones' => '[[Special:AdManagerZones|Edit ad zones]]',
	'right-admanager' => '[[Special:AdManager|Manage advertising configuration]]',
);

/** Breton (Brezhoneg)
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'admanager_labelPage' => 'Titloù ar bajenn',
	'admanager_labelCategory' => 'Anvioù ar rummad :',
	'admanager_submit' => 'Kas',
	'admanager_noads' => 'Na ziskouez bruderezh',
	'admanager_Page' => 'Pajennoù',
	'admanager_Category' => 'Rummadoù',
	'admanager_added' => 'Enrollet eo bet ho kemmoù',
	'admanager_addedzone' => 'Takad ouzhpennet',
	'admanager_zonenum' => 'Takad #: $1',
	'admanager_zonenotnumber' => "Fazi ! $1 n'eo ket un niver.",
	'admanager_return' => 'Distreiñ da [[Special:AdManager|Ad Manager]]',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'admanager' => 'Anzeigenverwaltung',
	'admanagerzones' => 'Anzeigenverwaltung - Anzeigenbereiche',
	'admanager-desc' => 'Ergänzt eine [[Special:AdManager|Spezialseite]], die es Administratoren ermöglicht einen Anzeigenbereich für Seiten und Kategorien festzulegen',
	'admanager_docu' => 'Um einen Anzeigenbereich bei einer Seite oder Kategorie hinzuzufügen oder zu entfernen, muss deren Name hinzugefügt oder entfernt werden.',
	'admanagerzones_docu' => 'Bitte die Nummer jedes Anzeigenbereichs in einer eigenen Zeile angeben.',
	'admanager_invalidtargetpage' => 'Es wurde keine Seite mit dem Namen „$1“ gefunden.',
	'admanager_invalidtargetcategory' => 'Es wurde keine Kategorie mit dem Namen „$1“ gefunden.',
	'admanager_notable' => 'Fehler: Die erforderliche Datenbanktabelle wurde nicht gefunden. Bitte update.php ausführen.',
	'admanager_noAdManagerZones' => 'Fehler: Es müssen zunächst Anzeigebereiche hinzugefügt werden. Dies ist auf der Spezialseite [[Special:AdManagerZones|Anzeigenverwaltung - Anzeigenbereiche]] möglich.',
	'admanager_labelPage' => 'Seitennamen',
	'admanager_labelCategory' => 'Kategorienamen',
	'admanager_submit' => 'Speichern',
	'admanager_noads' => 'Keine Anzeigen anzeigen',
	'admanager_Page' => 'Seiten',
	'admanager_Category' => 'Kategorien',
	'admanager_added' => 'Die Änderungen wurden gespeichert',
	'admanager_noadsset' => 'Für $1 wurde festgelegt, keine Anzeigen anzuzeigen',
	'admanager_addedzone' => 'Anzeigenbereich wurde hinzugefügt',
	'admanager_zonenum' => 'Anzeigenbereichsnummer: $1',
	'admanager_zonenotnumber' => 'Fehler: Bei $1 handelt es sich nicht um eine Anzeigenbereichsnummer.',
	'admanager_return' => 'Zurück zur [[Special:AdManager|Anzeigenverwaltung]]',
	'admanager_gotoads' => '[[Special:AdManager|Anzeigen bearbeiten]]',
	'admanager_gotozones' => '[[Special:AdManagerZones|Anzeigenbereiche bearbeiten]]',
	'right-admanager' => '[[Special:AdManager|Anzeigen konfigurieren]]',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'admanager' => 'Gestor de annuncios',
	'admanagerzones' => 'Zonas del gestor de annuncios',
	'admanager-desc' => 'Forni un [[Special:AdManager|pagina special]] que permitte al administratores de definir le zona pro paginas o categorias',
	'admanager_docu' => 'Pro adder o remover le zona de annuncios de un pagina o de un tote categoria, adde o remove su titulo hic infra.',
	'admanagerzones_docu' => 'Entra le numero de cata zona de annuncios in su proprie linea.',
	'admanager_invalidtargetpage' => 'Nulle pagina trovate con titulo "$1".',
	'admanager_invalidtargetcategory' => 'Nulle categoria trovate con titulo "$1".',
	'admanager_notable' => 'Error! Un tabella requisite non esseva trovate in le base de datos! Executa update.php primo.',
	'admanager_noAdManagerZones' => 'Error! Es necessari adder alcun zonas de annuncios. Entra los in le pagina [[Special:AdManagerZones|Zonas del gestor de annuncios]].',
	'admanager_labelPage' => 'Titulos de pagina',
	'admanager_labelCategory' => 'Nomines de categoria',
	'admanager_submit' => 'Submitter',
	'admanager_noads' => 'Non monstrar annuncios',
	'admanager_Page' => 'Paginas',
	'admanager_Category' => 'Categorias',
	'admanager_added' => 'Le cambiamentos ha essite salveguardate.',
	'admanager_noadsset' => '$1 ha essite configurate pro non monstrar annuncios',
	'admanager_addedzone' => 'Zona addite',
	'admanager_zonenum' => '№ de zona: $1',
	'admanager_zonenotnumber' => 'Error! $1 non es un numero.',
	'admanager_return' => 'Retornar al [[Special:AdManager|gestor de annuncios]]',
	'admanager_gotoads' => '[[Special:AdManager|Modificar placiamento de annuncio]]',
	'admanager_gotozones' => '[[Special:AdManagerZones|Modificar zonas de annuncios]]',
	'right-admanager' => '[[Special:AdManager|Gerer configuration de publicitate]]',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'admanager_invalidtargetpage' => 'Keng Säit mam Titel "$1" fonnt.',
	'admanager_invalidtargetcategory' => 'Keng Kategorie mam Titel "$1" fonnt.',
	'admanager_labelPage' => 'Säitennimm',
	'admanager_noads' => 'Keng Reklamme weisen',
	'admanager_Page' => 'Säiten',
	'admanager_Category' => 'Kategorien',
	'admanager_added' => 'Är Ännerunge goufe gespäichert',
	'admanager_noadsset' => '$1 gouf esou agestallt datt keng Reklamme gewise ginn',
	'admanager_zonenotnumber' => 'Feeler! $1 ass keng Zuel.',
);

/** Lithuanian (Lietuvių)
 * @author Eitvys200
 */
$messages['lt'] = array(
	'admanager' => 'Skelbimų tvarkyklė',
	'admanagerzones' => 'Skelbimų tvarkyklės zonos',
	'admanager_invalidtargetpage' => 'Puslapis nerastas su pavadinimu "$1".',
	'admanager_invalidtargetcategory' => 'Kategorija nerasta su pavadinimu "$1".',
	'admanager_labelPage' => 'Puslapio pavadinimai',
	'admanager_labelCategory' => 'Kategorijų pavadinimai',
	'admanager_submit' => 'Siųsti',
	'admanager_noads' => 'Nerodyti reklamų',
	'admanager_Page' => 'Puslapiai',
	'admanager_Category' => 'Kategorijos',
	'admanager_added' => 'Jūsų pakeitimai buvo įrašyti',
	'admanager_noadsset' => '$1 buvo nustatytas nerodyti jokių reklamų',
	'admanager_addedzone' => 'Pridėta zona',
	'admanager_zonenum' => 'Zona #: $1',
	'admanager_zonenotnumber' => 'Klaida! $1 nėra skaičius.',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'admanager' => 'Раководител со реклами',
	'admanagerzones' => 'Зони - Раководител со реклами',
	'admanager-desc' => 'Дава [[Special:AdManager|специјална страница]] каде системските оператори можат да ја зададат зоната за страниците или категориите',
	'admanager_docu' => 'За да додадете или отстраните рекламна зона на една страница или цела категорија, подолу додајте/отстранете го нејзиниот наслов.',
	'admanagerzones_docu' => 'Внесете го ги броевите на рекламните зони, секој во посебен ред.',
	'admanager_invalidtargetpage' => 'Не пронајдов страница со наслов „$1“.',
	'admanager_invalidtargetcategory' => 'Не пронајдов категорија со наслов „$1“.',
	'admanager_notable' => 'Грешка! Не ја пронајдов потребната табела во базата! Најпрвин направете поднова со update.php.',
	'admanager_noAdManagerZones' => 'Грешка! Мора да додадете некои рекламни зони. Внесете ги во „[[Special:AdManagerZones|Зони - Раководител со реклами]]“.',
	'admanager_labelPage' => 'Наслови на страниците',
	'admanager_labelCategory' => 'Имиња на категориите',
	'admanager_submit' => 'Поднеси',
	'admanager_noads' => 'Не прикажувај реклами',
	'admanager_Page' => 'Страници',
	'admanager_Category' => 'Категории',
	'admanager_added' => 'Вашите измени се зачувани',
	'admanager_noadsset' => '$1 е наместено да не прикажува реклами',
	'admanager_addedzone' => 'Додадена зона',
	'admanager_zonenum' => 'Зона бр: $1',
	'admanager_zonenotnumber' => 'Грешка! $1 не претставува број.',
	'admanager_return' => 'Назад на [[Special:AdManager|Раководителот со реклами]]',
	'admanager_gotoads' => '[[Special:AdManager|Смени положба на рекламата]]',
	'admanager_gotozones' => '[[Special:AdManagerZones|Уреди рекламни зони]]',
	'right-admanager' => '[[Special:AdManager|Поставки за рекламирање]]',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 */
$messages['nl'] = array(
	'admanager' => 'Advertentiebeheer',
	'admanagerzones' => 'Zones voor advertentiebeheer',
	'admanager-desc' => "Voegt een [[Special:AdManager|speciale pagina]] toe die beheerders toelaat om de zone voor pagina's of categorieën in te stellen",
	'admanager_docu' => 'U kunt een advertentiezone van een pagina of volledige categorie toevoegen of verwijderen door de titel ervan toe te voegen of te verwijderen.',
	'admanagerzones_docu' => 'Voer elke advertentiezone op zijn eigen regel in.',
	'admanager_invalidtargetpage' => 'Geen pagina gevonden met de titel "$1".',
	'admanager_invalidtargetcategory' => 'Geen categorie gevonden met de titel "$1".',
	'admanager_notable' => 'Fout: een vereiste databasetabel werd niet gevonden. Voer eerst update.php uit.',
	'admanager_noAdManagerZones' => 'Fout: u moet advertentiezones toevoegen. Voer ze in op [[Special:AdManagerZones|deze speciale pagina]].',
	'admanager_labelPage' => 'Paginanamen',
	'admanager_labelCategory' => 'Categorienamen',
	'admanager_submit' => 'Opslaan',
	'admanager_noads' => 'Geen advertenties weergeven',
	'admanager_Page' => "Pagina's",
	'admanager_Category' => 'Categorieën',
	'admanager_added' => 'Uw wijzigingen zijn opgeslagen',
	'admanager_noadsset' => '$1 is ingesteld om geen advertenties weer te geven',
	'admanager_addedzone' => 'Zone toegevoegd',
	'admanager_zonenum' => 'Zone #: $1',
	'admanager_zonenotnumber' => 'Fout: $1 is geen getal.',
	'admanager_return' => 'Terugkeren naar het [[Special:AdManager|advertentiebeheer]]',
	'admanager_gotoads' => '[[Special:AdManager|Advertentieplaatsing bewerken]]',
	'admanager_gotozones' => '[[Special:AdManagerZones|Advertentiezones bewerken]]',
	'right-admanager' => '[[Special:AdManager|Adverteerconfiguratie beheren]]',
);

/** Portuguese (Português)
 * @author SandroHc
 */
$messages['pt'] = array(
	'admanager_labelCategory' => 'Nomes da categoria',
	'admanager_submit' => 'Enviar',
	'admanager_noads' => 'Não apresentar anúncios',
	'admanager_Page' => 'Páginas',
	'admanager_Category' => 'Categorias',
	'admanager_added' => 'As suas alterações foram salvas',
	'admanager_noadsset' => '$1 definiu para não mostrar anúncios',
	'admanager_addedzone' => 'Zona adicionada',
	'admanager_zonenum' => 'Zona #: $1',
	'admanager_zonenotnumber' => 'Erro! $1 não é um número.',
	'admanager_return' => 'Voltar para [[Special:AdManager|Ad Manager]]',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'admanager_labelCategory' => 'వర్గాల పేర్లు',
	'admanager_submit' => 'దాఖలుచెయ్యి',
	'admanager_Page' => 'పుటలు',
	'admanager_Category' => 'వర్గాలు',
	'admanager_added' => 'మీ మార్పుల భద్రమయ్యాయి',
);

