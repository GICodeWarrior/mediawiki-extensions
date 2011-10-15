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

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Umherirrender
 */
$messages['qqq'] = array(
	'admanager_submit' => '{{Identical|Submit}}',
	'admanager_Page' => '{{Identical|Pages}}',
	'admanager_Category' => '{{Identical|Categories}}',
	'right-admanager' => '{{doc-right|admanager}}',
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 * @author Jim-by
 */
$messages['be-tarask'] = array(
	'admanager' => 'Кіраўнік рэклямы',
	'admanagerzones' => 'Кіраваньне зонамі рэклямы',
	'admanager-desc' => 'Дадае [[Special:AdManager|спэцыяльную старонку]], якая дазваляе адміністратарам прызначаць зону для старонак ці катэгорыяў',
	'admanager_docu' => 'Для даданьня ці выдаленьня зоны рэклямы на старонцы ці ўсёй катэгорыі, трэба дадаць ці выдаліць назву ўнізе.',
	'admanagerzones_docu' => 'Увядзіце нумар кожнай зоны рэклямы ў асобным радку.',
	'admanager_invalidtargetpage' => 'Старонка з назвай «$1» ня знойдзеная.',
	'admanager_invalidtargetcategory' => 'Катэгорыя з назвай «$1» ня знойдзеная.',
	'admanager_notable' => 'Памылка! Неабходная табліца базы зьвестак ня знойдзеная! Спачатку запусьціце update.php.',
	'admanager_noAdManagerZones' => 'Памылка! Вам неабходна дадаць зоны рэклямы. Увядзіце іх у [[Special:AdManagerZones|Кіраваньні зонамі рэклямы]].',
	'admanager_labelPage' => 'Назвы старонак',
	'admanager_labelCategory' => 'Назвы катэгорыяў',
	'admanager_submit' => 'Захаваць',
	'admanager_noads' => 'Не паказваць рэкляму',
	'admanager_Page' => 'Старонкі',
	'admanager_Category' => 'Катэгорыі',
	'admanager_added' => 'Вашыя зьмены былі захаваныя',
	'admanager_noadsset' => '$1 быў устаноўлены так, каб не паказваць рэкляму',
	'admanager_addedzone' => 'Дададзеная зона',
	'admanager_zonenum' => 'Зона № $1',
	'admanager_zonenotnumber' => 'Памылка: $1 не зьяўляецца лікам.',
	'admanager_return' => 'Вярнуцца ў [[Special:AdManager|кіраваньне рэклямай]]',
	'admanager_gotoads' => '[[Special:AdManager|Рэдагаваць разьмяшчэньне рэклямы]]',
	'admanager_gotozones' => '[[Special:AdManagerZones|Рэдагаваць зоны рэклямы]]',
	'right-admanager' => '[[Special:AdManager|кіраваньне наладамі рэклямы]]',
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

/** French (Français)
 * @author Gomoko
 * @author Hashar
 */
$messages['fr'] = array(
	'admanager' => 'Gestionnaire de publicité',
	'admanagerzones' => 'Zones de gestionnaire de publicité',
	'admanager-desc' => 'Fournit une [[Special:AdManager|page spéciale]] qui permet aux sysops de fixer la zone pour les pages ou les catégories',
	'admanager_docu' => "Pour ajouter ou supprimer la zone de publicité d'une page ou d'une catégorie complète, ajoutez ou supprimez son titre ci-dessous.",
	'admanagerzones_docu' => 'Entrez chaque numéro de zone de publicité sur sa propre ligne.',
	'admanager_invalidtargetpage' => 'Aucune page trouvé avec le titre « $1 ».',
	'admanager_invalidtargetcategory' => 'Pas de catégorie trouvée avec le titre "$1".',
	'admanager_notable' => "Erreur! Une table de base de données requise n'a pas été trouvée! Lancez d'abord update.php.",
	'admanager_noAdManagerZones' => 'Erreur! Vous devez ajouter des zones de publicité. Entrez-les dans les [[Special:AdManagerZones|zones de gestionnaire de publicité]].',
	'admanager_labelPage' => 'Titres de page',
	'admanager_labelCategory' => 'Noms de catégorie',
	'admanager_submit' => 'Soumettre',
	'admanager_noads' => 'Ne pas afficher de publicité',
	'admanager_Page' => 'Pages',
	'admanager_Category' => 'Catégories',
	'admanager_added' => 'Vos modifications ont été enregistrées',
	'admanager_noadsset' => "$1 a été paramétré pour n'afficher aucune publicité",
	'admanager_addedzone' => 'Zone ajoutée',
	'admanager_zonenum' => 'Zone #: $1',
	'admanager_zonenotnumber' => "Erreur ! « $1 » n'est pas un nombre.",
	'admanager_return' => 'Revenir à [[Special:AdManager|Gestionnaire de publicité]]',
	'admanager_gotoads' => "[[Special:AdManager|Modifier l'emplacement d'une publicité]]",
	'admanager_gotozones' => '[[Special:AdManagerZones|Modifier les zones de publicité]]',
	'right-admanager' => '[[Special:AdManager|Gérer la configuration des publicités]]',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'admanager' => 'Administrator de recllâmes',
	'admanagerzones' => 'Zones de l’administrator de recllâmes',
	'admanager_invalidtargetpage' => 'Niona pâge avouéc lo titro « $1 » at étâ trovâ.',
	'admanager_invalidtargetcategory' => 'Niona catègorie avouéc lo titro « $1 » at étâ trovâ.',
	'admanager_labelPage' => 'Titros de pâges',
	'admanager_labelCategory' => 'Noms de catègories',
	'admanager_submit' => 'Sometre',
	'admanager_noads' => 'Fâre vêre gins de recllâma',
	'admanager_Page' => 'Pâges',
	'admanager_Category' => 'Catègories',
	'admanager_added' => 'Voutros changements ont étâ encartâs',
	'admanager_noadsset' => '$1 at étâ dèfeni por fâre vêre gins de recllâma',
	'admanager_addedzone' => 'Zona apondua',
	'admanager_zonenum' => 'Numerô de zona : $1',
	'admanager_zonenotnumber' => 'Èrror ! $1 est pas un nombro.',
	'admanager_return' => 'Retôrn a l’[[Special:AdManager|administrator de recllâmes]]',
	'admanager_gotoads' => '[[Special:AdManager|Changiér lo placement de recllâma]]',
	'admanager_gotozones' => '[[Special:AdManagerZones|Changiér les zones de recllâmes]]',
	'right-admanager' => '[[Special:AdManager|Administrar la configuracion de la recllâma]]',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'admanager' => 'Xestor de anuncios',
	'admanagerzones' => 'Xestor das zonas de anuncios',
	'admanager-desc' => 'Proporciona unha [[Special:AdManager|páxina especial]] que permite aos administradores definir a zona das páxinas ou categorías',
	'admanager_docu' => 'Para engadir ou eliminar a zona de anuncios dunha páxina ou categoría enteira, engada ou elimine o seu título a continuación.',
	'admanagerzones_docu' => 'Escriba cada número de zona de anuncios na súa propia liña.',
	'admanager_invalidtargetpage' => 'Non se atopou ningunha páxina co título "$1".',
	'admanager_invalidtargetcategory' => 'Non se atopou ningunha categoría co título "$1".',
	'admanager_notable' => 'Erro! Non se atopou a táboa da base de datos necesaria para continuar! Execute update.php primeiro.',
	'admanager_noAdManagerZones' => 'Erro! Ten que engadir algunhas zonas de anuncios. Insíraas no [[Special:AdManagerZones|Xestor das zonas de anuncios]].',
	'admanager_labelPage' => 'Títulos da páxinas',
	'admanager_labelCategory' => 'Nomes da categorías',
	'admanager_submit' => 'Enviar',
	'admanager_noads' => 'Non mostrar os anuncios',
	'admanager_Page' => 'Páxinas',
	'admanager_Category' => 'Categorías',
	'admanager_added' => 'Gardáronse os seus cambios',
	'admanager_noadsset' => '$1 definiuse para non mostrar os anuncios',
	'admanager_addedzone' => 'Zona engadida',
	'admanager_zonenum' => 'Zona nº: $1',
	'admanager_zonenotnumber' => 'Erro! "$1" non é un número.',
	'admanager_return' => 'Volver ao [[Special:AdManager|Xestor de anuncios]]',
	'admanager_gotoads' => '[[Special:AdManager|Editar a posición do anuncio]]',
	'admanager_gotozones' => '[[Special:AdManagerZones|Editar as zonas dos anuncios]]',
	'right-admanager' => '[[Special:AdManager|Xestionar a configuración dos anuncios]]',
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
	'admanager' => 'Gestioun vun de Reklammen',
	'admanagerzones' => 'Gestioun vun den Zone vun de Reklammen',
	'admanager_invalidtargetpage' => 'Keng Säit mam Titel "$1" fonnt.',
	'admanager_invalidtargetcategory' => 'Keng Kategorie mam Titel "$1" fonnt.',
	'admanager_notable' => "Feeler: Déi erfuerdert Datebanktabell gouf net fonnt! Start d'éischt update.php.",
	'admanager_labelPage' => 'Säitennimm',
	'admanager_labelCategory' => 'Nimm vun de Kategorien:',
	'admanager_submit' => 'Späicheren',
	'admanager_noads' => 'Keng Reklamme weisen',
	'admanager_Page' => 'Säiten',
	'admanager_Category' => 'Kategorien',
	'admanager_added' => 'Är Ännerunge goufe gespäichert',
	'admanager_noadsset' => '$1 gouf esou agestallt datt keng Reklamme gewise ginn',
	'admanager_zonenum' => 'Zone #: $1',
	'admanager_zonenotnumber' => 'Feeler! $1 ass keng Zuel.',
	'admanager_return' => "Zréck op d'[[Special:AdManager|Gestioun vun de Reklammen]]",
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
 * @author Siebrand
 */
$messages['nl'] = array(
	'admanager' => 'Advertentiebeheer',
	'admanagerzones' => 'Zones voor advertentiebeheer',
	'admanager-desc' => "Voegt een [[Special:AdManager|speciale pagina]] toe die beheerders in staat stelt om de zone voor pagina's of categorieën in te stellen",
	'admanager_docu' => 'U kunt een advertentiezone van een pagina of volledige categorie toevoegen of verwijderen door de naam ervan toe te voegen of te verwijderen.',
	'admanagerzones_docu' => 'Voer elke advertentiezone op een eigen regel in.',
	'admanager_invalidtargetpage' => 'Geen pagina gevonden met de naam "$1".',
	'admanager_invalidtargetcategory' => 'Geen categorie gevonden met de naam "$1".',
	'admanager_notable' => 'Fout: een vereiste databasetabel is niet gevonden. Voer eerst update.php uit.',
	'admanager_noAdManagerZones' => 'Fout: u moet advertentiezones toevoegen. Voer ze in op de [[Special:AdManagerZones|speciale pagina]].',
	'admanager_labelPage' => 'Paginanamen',
	'admanager_labelCategory' => 'Categorienamen',
	'admanager_submit' => 'Opslaan',
	'admanager_noads' => 'Geen advertenties weergeven',
	'admanager_Page' => "Pagina's",
	'admanager_Category' => 'Categorieën',
	'admanager_added' => 'Uw wijzigingen zijn opgeslagen',
	'admanager_noadsset' => '$1 is ingesteld om geen advertenties weer te geven',
	'admanager_addedzone' => 'Zone toegevoegd',
	'admanager_zonenum' => 'Zonenummer: $1',
	'admanager_zonenotnumber' => 'Fout: $1 is geen getal.',
	'admanager_return' => 'Terug naar [[Special:AdManager|advertentiebeheer]]',
	'admanager_gotoads' => '[[Special:AdManager|Advertentieplaatsing bewerken]]',
	'admanager_gotozones' => '[[Special:AdManagerZones|Advertentiezones bewerken]]',
	'right-admanager' => '[[Special:AdManager|Advertentie-instellingen beheren]]',
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

/** Russian (Русский)
 * @author Engineering
 */
$messages['ru'] = array(
	'admanager_invalidtargetpage' => 'Не найдена страница " $1 ".',
	'admanager_Page' => 'Страницы',
	'admanager_Category' => 'Категории',
	'admanager_zonenum' => 'Зона #:$1',
	'admanager_zonenotnumber' => 'Ошибка!  $1  не является числом.',
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

