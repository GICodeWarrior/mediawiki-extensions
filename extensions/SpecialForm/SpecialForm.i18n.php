<?php
/**
 * SpecialForm.i18n.php -- I18N for form-based interface to start new pages
 * Copyright 2007 Vinismo, Inc. (http://vinismo.com/)
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @author Evan Prodromou <evan@vinismo.com>
 * @addtogroup Extensions
 */

$messages = array();

$messages['en'] = array(
	'form' => 'Form',
	'formnoname' => 'No Form Name',
	'formnonametext' => 'You must provide a form name, like "Special:Form/Nameofform".',
	'formbadname' => 'Bad Form Name',
	'formbadnametext' => 'There is no form by that name.',
	'formpattern' => '$1-form',
	'formtemplatepattern' => '$1', # Don't translate this message
	'formtitlepattern' => 'Add New $1',
	'formsave' => 'Save',
	'formindexmismatch' => 'This form has mismatched name patterns and templates starting at index $1.',
	'formarticleexists' => 'Page Exists',
	'formarticleexiststext' => 'The page [[$1]] already exists.',
	'formbadpagename' => 'Bad Page Name',
	'formbadpagenametext' => 'The form data you entered makes a bad page name, "$1".',
	'formrequiredfieldpluralerror' => 'The fields $1 are required for this form. Please fill them in.',		  
	'formrequiredfielderror' => 'The field $1 is required for this form. Please fill it in.',
	'formsavesummary' => 'New page using [[Special:Form/$1]]',
	'formsaveerror' => 'Error Saving Form',
	'formsaveerrortext' => 'There was an unknown error saving page \'$1\'.',
);

/** Afrikaans (Afrikaans)
 * @author SPQRobin
 */
$messages['af'] = array(
	'formsave' => 'Stoor',
);

$messages['ar'] = array(
	'form' => 'استمارة',
	'formnoname' => 'لا اسم استمارة',
	'formnonametext' => 'يجب أن توفر اسم استمارة، مثل "Special:Form/Nameofform".',
	'formbadname' => 'اسم استمارة سيء',
	'formbadnametext' => 'لا توجد استمارة بهذا الاسم.',
	'formpattern' => '$1-استمارة',
	'formtitlepattern' => 'أضف $1 جديدا',
	'formsave' => 'حفظ',
	'formindexmismatch' => 'هذه الاستمارة بها أنماط أسماء وقوالب غير متطابقة بدءا عند الفهرس $1.',
	'formarticleexists' => 'الصفحة موجودة',
	'formarticleexiststext' => 'الصفحة [[$1]] موجودة بالفعل.',
	'formbadpagename' => 'اسم صفحة سيء',
	'formbadpagenametext' => 'بيانات الاستمارة التي أدخلتها تصنع اسم صفحة سيئا، "$1".',
	'formrequiredfieldpluralerror' => 'الحقول $1 مطلوبة لهذه الاستمارة. من فضلك املأهم.',
	'formrequiredfielderror' => 'الحقل $1 مطلوب لهذه الاستمارة. من فضلك املأه.',
	'formsavesummary' => 'صفحة جديدة باستخدام [[Special:Form/$1]]',
	'formsaveerror' => 'خطأ في حفظ الاستمارة',
	'formsaveerrortext' => 'حدث خطأ غير معروف أثناء حفظ الاستمارة \'$1\'.',
);

$messages['bcl'] = array(
	'formtitlepattern' => 'Magdugang nin Bâgong $1',
	'formsave' => 'Itagama',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'form'                         => 'Формуляр',
	'formnonametext'               => 'Необходимо е да се посочи име на формуляр, напр. „Special:Form/ИмеНаФормуляр“',
	'formbadname'                  => 'Грешно име на формуляр',
	'formbadnametext'              => 'Не съществува формуляр с това име.',
	'formsave'                     => 'Съхранение',
	'formarticleexists'            => 'Страницата съществува',
	'formarticleexiststext'        => 'Страницата [[$1]] вече съществува.',
	'formbadpagename'              => 'Грешно име на страница',
	'formrequiredfieldpluralerror' => 'Този формуляр изисква полетата $1 да бъдат попълнени.',
	'formrequiredfielderror'       => 'Този формуляр изисква полето $1 да бъде попълнено.',
	'formsaveerror'                => 'Грешка при съхранение на формуляра',
);

/** Czech (Česky)
 * @author Matěj Grabovský
 */
$messages['cs'] = array(
	'form'                         => 'Formulář',
	'formnoname'                   => 'Nebyl zadán název formuláře',
	'formnonametext'               => 'Musíte zadat název formuláře ve tavru „Special:Form/Názevformuláře“',
	'formbadname'                  => 'Špatný název formuláře',
	'formbadnametext'              => 'Formulář se zadaným názvem neexistuje',
	'formpattern'                  => 'formulář-$1',
	'formtitlepattern'             => 'Přidat nový $1',
	'formsave'                     => 'Uložit',
	'formarticleexists'            => 'Stránka existuje',
	'formarticleexiststext'        => 'Stránka [[$1]] už existuje',
	'formbadpagename'              => 'Špatný název stránky',
	'formbadpagenametext'          => "Údaj formuláře, který jste zadali tvoří chybný název stránky - ''$1''.",
	'formrequiredfieldpluralerror' => 'Tento formulář vyžaduje vyplnění polí $1. Prosím, vyplňte je.',
	'formrequiredfielderror'       => 'Tento formulář vyžaduje vyplnění pole $1. Prosím, vyplňte ho.',
	'formsavesummary'              => 'Nová stránka pomocí [[Special:Form/$1]]',
	'formsaveerror'                => 'Chyba při ukládání formuláře',
	'formsaveerrortext'            => "Při ukládání formuláře se vyskytla neznámá chyba: ''$1''.",
);

$messages['de'] = array(
	'form'                         => 'Formular',
	'formnoname'                   => 'Kein Formularname',
	'formnonametext'               => 'Du musst einen Formularnamen angeben, z.B. „{{ns:Special}}:Form/Formularname“.',
	'formbadname'                  => 'Falscher Formularname',
	'formbadnametext'              => 'Es gibt kein Formular mit diesem Namen',
	'formpattern'                  => '$1-Formular',
	'formtitlepattern'             => 'Füge neue $1 hinzu',
	'formsave'                     => 'Speichern',
	'formindexmismatch'            => 'Dieses Formular hat ein Ungleichgewicht zwischen Namensmustern und Vorlagen, beginnend bei Index $1.',
	'formarticleexists'            => 'Seite bereits vorhanden',
	'formarticleexiststext'        => 'Die Seite „[[$1]]“ ist bereits vorhanden.',
	'formbadpagename'              => 'Unzulässiger Seitenname',
	'formbadpagenametext'          => 'Die eingegebenen Formulardaten erzeugen einen unzulässigen Seitennamen: „$1“.',
	'formrequiredfieldpluralerror' => 'Die Felder $1 sind Pflichtfelder. Bitte fülle sie aus.',		  
	'formrequiredfielderror'       => 'Das Feld $1 ist ein Pfichtfeld. Bitte fülle es aus.',
	'formsavesummary'              => 'Neue Seite, die auf [[{{ns:Special}}:Form/$1]] basiert',
	'formsaveerror'                => 'Fehler beim Speichern des Formulares',
	'formsaveerrortext'            => 'Es gab einen unbekannten Fehler beim Speichern der Seite „$1“.',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'formsave' => 'Konservu',
);

$messages['fr'] = array(
	'form' => 'Formulaire',
	'formnoname' => 'Aucun nom',
	'formnonametext' => 'Veuillez spécifier le nom du formulaire, sous la forme "Special:Formulaire/NomDuFormulaire".',
	'formbadname' => 'Nom incorrect',
	'formbadnametext' => 'Le nom choisi pour le formulaire est incorrect. Aucun formulaire n\'existe sous ce nom.',
	'formpattern' => 'formulaire-$1',
	'formtitlepattern' => 'Ajouter un(e) $1',
	'formsave' => 'Sauvegarder',
	'formindexmismatch' => 'Ce formulaire a des patrons et des modèles qui ne correspondent pas à partir de $1.',
	'formarticleexists' => 'L\'article existe déjà.',
	'formarticleexiststext' => 'L\'article nommé [[$1]] existe déjà.',
	'formbadpagename' => 'Mauvais nom de page',
	'formbadpagenametext' => 'Les données saisies forment un mauvais nom de page, « $1 ».',
	'formrequiredfieldpluralerror' => 'Les champs $1 sont requis dans ce formulaire.',
	'formrequiredfielderror' => 'Le champ $1 est requis dans ce formulaire.',
	'formsavesummary' => 'Créer un nouvel article à l\'aide de [[Special:Formulaire/$1]]',
	'formsaveerror' => 'Une erreur s\'est produite pendant la sauvegarde.',
	'formsaveerrortext' => 'Une erreur inconnue s\'est produite pendant la sauvegarde de \'\'$1\'\'.',
);

$messages['gl'] = array(
	'form' => 'Formulario',
	'formnoname' => 'Formulario sen Nome',
	'formnonametext' => 'Tenlle que dar un nome ao formulario, como "Special:Form/Nomedoformulario".',
	'formbadname' => 'Formulario con Nome incorrecto',
	'formbadnametext' => 'Non hai ningún formulario con ese nome.',
	'formpattern' => 'formulario-$1',
	'formtitlepattern' => 'Engadir Novo $1',
	'formsave' => 'Gardar',
	'formarticleexists' => 'A páxina Existe',
	'formarticleexiststext' => 'A páxina [[$1]] xa existe.',
	'formbadpagename' => 'Nome de Páxina incorrecto',
	'formbadpagenametext' => 'O formulario de datos que vostede introduciu fixo un nome de páxina incorrecto, "$1".',
	'formrequiredfieldpluralerror' => 'Os campos $ 1 son requeridos para este formulario. Énchaos.',
	'formrequiredfielderror' => 'O campo $1 é requerido para este formulario. Énchao.',
	'formsavesummary' => 'Nova páxina usando [[Special:Form/$1]]',
	'formsaveerror' => 'Erro ao gardar o formulario',
	'formsaveerrortext' => 'Houbo un erro descoñecido ao gardar a páxina \'$1\'.',
);

$messages['hsb'] = array(
	'form' => 'Formular',
	'formnoname' => 'Žane formularne mjeno',
	'formnonametext' => 'Dyrbiš formularne mjeno podać, na př. „{{ns:Special}}:Form/Formularnemjeno“.',
	'formbadname' => 'Wopačne formularne mjeno',
	'formbadnametext' => 'Njeje formular z tutym mjenom',
	'formpattern' => '$1 formular',
	'formtitlepattern' => 'Nowe $1 přidać',
	'formsave' => 'Składować',
	'formindexmismatch' => 'Tutón formular ma njejenake mjenowe mustry a předłohi wot indeksa $1.',
	'formarticleexists' => 'Nastawk hižo eksistuje',
	'formarticleexiststext' => 'Nastawk [[$1]] hižo eksistuje.',
	'formbadpagename' => 'Njedowolene mjeno strony',
	'formbadpagenametext' => 'Zapodate formularne daty tworja njedowolene mjeno strony: "$1".',
	'formrequiredfieldpluralerror' => 'Pola $1 su trěbne pola. Prošu wupjelń je.',
	'formrequiredfielderror' => 'Polo $1 je trěbne polo. Prošu wupjelń je.',
	'formsavesummary' => 'Nowy nastawk, kotryž na [{{ns:Special}}:Form/$1]] bazěruje.',
	'formsaveerror' => 'Zmylk při składowanju formulara',
	'formsaveerrortext' => 'Bě njeznaty zmylk při składowanju nastawka "$1".',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 */
$messages['km'] = array(
	'form'            => 'បែបបទ',
	'formnoname'      => 'គ្មាន ឈ្មោះបែបបទ',
	'formbadname'     => 'ឈ្មោះបែបបទ មិនល្អ',
	'formbadnametext' => 'គ្មានឈ្មោះបែបបទ នោះទេ ។',
	'formpattern'     => '$1-បែបបទ',
	'formsave'        => 'រក្សាទុក',
	'formbadpagename' => 'ឈ្មោះទំព័រ មិនល្អ',
	'formsavesummary' => 'ទំព័រថ្មី ប្រើប្រាស់ [[Special:Form/$1]]',
	'formsaveerror'   => 'កំហុស រក្សាទុក បែបបទ',
);

$messages['la'] = array(
	'formsave' => 'Servare',
	'formarticleexiststext' => 'Pagina [[$1]] iam existit.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'formtitlepattern'      => 'Nei $1 derbäisetzen',
	'formsave'              => 'Späicheren',
	'formarticleexists'     => "D'Säit gëtt et schonn.",
	'formarticleexiststext' => "D'Säit [[$1]] gëtt et schonn.",
	'formbadpagename'       => 'Falsche Säitennumm',
);

/** Marathi (मराठी)
 * @author Mahitgar
 */
$messages['mr'] = array(
	'formsave' => 'जतन करा',
);

$messages['nl'] = array(
	'form' => 'Formulier',
	'formnoname' => 'Geen formuliernaam',
	'formnonametext' => 'Geef een formuliernaam op, bijvoorbeeld "Special:Form/Formuliernaam".',
	'formbadname' => 'Ongeldige formuliernaam',
	'formbadnametext' => 'Er bestaat geen formulier met die naam.',
	'formpattern' => '$1-form',#identical but defined
	'formtitlepattern' => 'Voeg nieuw $1 toe',
	'formsave' => 'Opslaan',
	'formindexmismatch' => 'Dit formulier heeft ongekoppelde naampatronen en sjablonen vanaf index $1.',
	'formarticleexists' => 'Pagina bestaat al',
	'formarticleexiststext' => 'De pagina [[$1]] bestaat al.',
	'formbadpagename' => 'Onjuiste paginanaam',
	'formbadpagenametext' => 'De formuliergegevens die u hebt opgegeven zorgen voor een onjuiste pagina, "$1".',
	'formrequiredfieldpluralerror' => 'De velden $1 zijn verplicht voor dit formulier. Vul ze alstublieft in.',
	'formrequiredfielderror' => 'Het veld $1 is verplicht voor dit formulier. Vul het alstublieft in.',
	'formsavesummary' => 'Nieuwe pagina via [[Special:Form/$1]]',
	'formsaveerror' => 'Fout bij opslaan formulier',
	'formsaveerrortext' => 'Er is een onbekende fout opgetreden bij het opslaan van pagina \'$1\'.',
);

/** Norwegian (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'form'                         => 'Skjema',
	'formnoname'                   => 'Intet skjemanavn',
	'formnonametext'               => 'Du må angi et skjemanavn, som «Special:Form/Skjemanavn».',
	'formbadname'                  => 'Ugyldig skjemanavn',
	'formbadnametext'              => 'Det er ingen skjema ved det navnet.',
	'formpattern'                  => '$1-skjema',
	'formtitlepattern'             => 'Legger til nytt $1',
	'formsave'                     => 'Lagre',
	'formindexmismatch'            => 'Dette skjemaet har upassende navnemønstre og maler som starter på indeks $1.',
	'formarticleexists'            => 'Siden eksisterer',
	'formarticleexiststext'        => 'Siden [[$1]] eksisterer allerede.',
	'formbadpagename'              => 'Ugyldig sidenavn',
	'formbadpagenametext'          => 'Skjemadataene du skrev inn utgjør et ugyldig sidenavn, «$1».',
	'formrequiredfieldpluralerror' => 'Feltene $1 er påkrevde for dette skjemaet. Vennligst fyll dem inn.',
	'formrequiredfielderror'       => 'Feltet $1 er påkrevd for dette skjemaet. Vennligst fyll det inn.',
	'formsavesummary'              => 'Ny side vha. [[Special:Form/$1]]',
	'formsaveerror'                => 'Feil under skjemalagring',
	'formsaveerrortext'            => 'Det var en ukjent feil under lagring av siden ‘$1’.',
);

$messages['oc'] = array(
	'form' => 'Formulari',
	'formnoname' => 'Cap de nom',
	'formnonametext' => 'Especificatz lo nom del formulari, jos la forma "Special:Formulari/NomDelFormulari".',
	'formbadname' => 'Nom incorrècte',
	'formbadnametext' => 'Lo nom causit pel formulari es incorrècte. Cap de formulari existís jos aqueste nom.',
	'formpattern' => 'formulari-$1',
	'formtitlepattern' => 'Ajustar un(a) $1',
	'formsave' => 'Salvagadar',
	'formindexmismatch' => 'Aqueste formulari a de patrons e de modèls que correspòndon pas a partir de $1.',
	'formarticleexists' => 'L\'article existís ja.',
	'formarticleexiststext' => 'L\'article nomenat [[$1]] existís ja.',
	'formbadpagename' => 'Marrit nom de pagina',
	'formbadpagenametext' => 'Las donadas picadas fòrman un marrit nom de pagina, « $1 ».',
	'formrequiredfieldpluralerror' => 'Los camps $1 son requeses dins aqueste formulari.',
	'formrequiredfielderror' => 'Lo camp $1 es requés dins aqueste formulari.',
	'formsavesummary' => 'Crear un article novèl amb l\'ajuda de [[Special:Formulari/$1]]',
	'formsaveerror' => 'Una error s\'es producha pendent la salvagàrdia.',
	'formsaveerrortext' => 'Una error desconeguda s\'es producha pendent la salvagàrdia de \'\'$1\'\'.',
);

$messages['pl'] = array(
	'form' => 'Formularz',
	'formnoname' => 'Brak nazwy formularza',
	'formnonametext' => 'Musisz podać nazwę formularza, np. "{{ns:special}}:Formularz/Nazwaformularza".',
	'formbadname' => 'Zła nazwa formularza',
	'formbadnametext' => 'Nie ma formularza o takiej nazwie.',
	'formtitlepattern' => 'Dodaj nowy $1',
	'formsave' => 'Zapisz',
	'formarticleexists' => 'Strona istnieje',
	'formarticleexiststext' => 'Strona [[$1]] już istnieje.',
	'formbadpagename' => 'Zła nazwa strony',
	'formbadpagenametext' => 'Dane wpisane do formularza tworzą złą nazwę strony, "$1".',
	'formrequiredfieldpluralerror' => 'Pola $1 są wymagane w tym formularzu. Prosimy o wypełnienie ich.',
	'formrequiredfielderror' => 'Pole $1 jest wymagane w tym formularzu. Wypełnij je.',
	'formsavesummary' => 'Nowa strona za pomocą [[Special:Form/$1]]',
	'formsaveerror' => 'Błąd przy zapisywaniu formularza',
	'formsaveerrortext' => 'Wystąpił nieznany błąd przy zapisywaniu strony \'$1\'.',
);

$messages['pms'] = array(
	'form' => 'Domanda',
	'formnoname' => 'Domanda sensa tìtol',
	'formnonametext' => 'A venta deje un tìtol al mòdulo ëd domanda, coma "Special:Form/nòm_dla_domanda".',
	'formbadname' => 'Nòm dla domanda nen bon',
	'formbadnametext' => 'A-i é pa gnun mòdulo ëd domanda ch\'as ciama parej.',
	'formpattern' => '$1-domanda',
	'formtitlepattern' => 'Gionté $1 neuv',
	'formsave' => 'Salvé',
	'formindexmismatch' => 'Ës mòdulo-sì a l\'ha në schema ëd nòm e stamp malcobià a parte da \'nt l\'ìndess $1.',
	'formarticleexists' => 'La pàgina a-i é',
	'formarticleexiststext' => 'La pàgina [[$1]] a-i é già',
	'formbadpagename' => 'Nòm ëd pàgina pa bon',
	'formbadpagenametext' => 'Ij dat ant sël mòdulo ëd domanda ch\'a l\'ha butà a dan un nòm ëd pàgina nen bon, "$1".',
	'formrequiredfieldpluralerror' => 'Ij camp $1 a son obligatòri për ës mòdulo ëd domanda-sì. Për piasì, ch\'a jë compila.',
	'formrequiredfielderror' => 'Ël camp $1 a l\'é obligatòri për ës mòdulo ëd domanda-sì. Për piasì, ch\'a lo compila.',
	'formsavesummary' => 'Neuva pàgina ch\'a dòvra [[Special:Form/$1]]',
	'formsaveerror' => 'Eror ën salvand ël mòdulo ëd domanda',
	'formsaveerrortext' => 'A-i é sta-ie n\'eror amprevist ën salvand la pàgina \'$1\'.',
);

/** Portuguese (Português)
 * @author Lijealso
 * @author Malafaya
 */
$messages['pt'] = array(
	'form'                         => 'Formulário',
	'formtitlepattern'             => 'Adicionar Novo $1',
	'formsave'                     => 'Salvar',
	'formarticleexists'            => 'Página Existe',
	'formarticleexiststext'        => 'A página [[$1]] já existe.',
	'formrequiredfieldpluralerror' => 'Os campos $1 são obrigatórios neste formulário. Por favor, preencha-os.',
	'formsavesummary'              => 'Nova página usando [[Special:Form/$1]]',
	'formsaveerror'                => 'Erro ao salvar formulário',
	'formsaveerrortext'            => "Houve um erro desconhecido ao salvar a página '$1'.",
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'form'                         => 'Formulár',
	'formnoname'                   => 'Nezadali ste názov formulára',
	'formnonametext'               => 'Musíte zadať názov formulára v tvare „Special:Form/Názovformulára“',
	'formbadname'                  => 'Chybný názov formulára',
	'formbadnametext'              => 'Formulár s takým názvom neexistuje.',
	'formpattern'                  => 'formulár-$1',
	'formtitlepattern'             => 'Pridať nový $1',
	'formsave'                     => 'Uložiť',
	'formindexmismatch'            => 'Vzory názvu tohto formulára sa nezhodujú a šablóny začínajú od indexu $1.',
	'formarticleexists'            => 'Stránka existuje',
	'formarticleexiststext'        => 'Stránka [[$1]] úž existuje.',
	'formbadpagename'              => 'Chybný názov stránky',
	'formbadpagenametext'          => 'Údaje formulára, ktoré ste zadali tvoria chybný názov stránky - „$1“.',
	'formrequiredfieldpluralerror' => 'Tento formulár vyžaduje vyplnenie polí $1. Prosím, vyplňte ich.',
	'formrequiredfielderror'       => 'Tento formulár vyžaduje vyplnenie poľa $1. Prosím, vyplňte ho.',
	'formsavesummary'              => 'Nová stránka pomocou [[Special:Form/$1]]',
	'formsaveerror'                => 'Chyba pri ukladaní formulára',
	'formsaveerrortext'            => 'Pri ukladaní formulára sa vyskytla neznáma chyba „$1“.',
);

/** Somali (Soomaaliga)
 * @author Yariiska
 */
$messages['so'] = array(
	'formsave' => 'Kaydi',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'form'                         => 'Formular',
	'formnoname'                   => 'Naan Formularnoome',
	'formnonametext'               => 'Du moast n Formularnoome ounreeke, t.B. „{{ns:Special}}:Form/Formularnoome“.',
	'formbadname'                  => 'Falsken Formularnoome',
	'formbadnametext'              => 'Dät rakt neen Formular mäd dissen Noome',
	'formpattern'                  => '$1-Formular',
	'formtitlepattern'             => 'Föigje näie $1 bietou',
	'formsave'                     => 'Spiekerje',
	'formindexmismatch'            => 'Dit Formular häd n Uungliekgewicht twiske Noomensmustere un Foarloagen, ounfangend bie Index $1.',
	'formarticleexists'            => 'Siede is al deer',
	'formarticleexiststext'        => 'Ju Siede „[[$1]]“ is al deer.',
	'formbadpagename'              => 'Ferkierde Siedennoome',
	'formbadpagenametext'          => 'Do ienroate Formulardoaten moakje n ferkierden Siedennoome: „$1“.',
	'formrequiredfieldpluralerror' => 'Do Fäildere $1 sunt Plichtfäildere. Jädden uutfälle.',
	'formrequiredfielderror'       => 'Dät Fäild $1 is n Plichtfäild. Jädden uutfälle.',
	'formsavesummary'              => 'Näie Siede, ju der ap [[{{ns:Special}}:Form/$1]] basiert',
	'formsaveerror'                => 'Failer bie dät Spiekerjen fon dät Formular',
	'formsaveerrortext'            => 'Dät roate n uunbekoanden Failer bie dät Spiekerjen fon ju Siede „$1“.',
);

/** Sundanese (Basa Sunda)
 * @author Kandar
 */
$messages['su'] = array(
	'form'                         => 'Formulir',
	'formnoname'                   => 'Formulir can dingaranan',
	'formnonametext'               => 'Formulir anjeun kudu boga ngaran, misalna waé "Husus:Formulir/Ngaranformulir".',
	'formbadname'                  => 'Ngaran formulirna teu payus.',
	'formbadnametext'              => 'Euweuh formulir nu ngaranna kitu.',
	'formpattern'                  => 'Formulir-$1',
	'formtitlepattern'             => 'Tambahan $1 Anyar',
	'formsave'                     => 'Simpen',
	'formindexmismatch'            => 'Ieu formulir mibanda pola jeung citakan ngaran nu pasalia ti indéks $1 ka handap.',
	'formarticleexists'            => 'Kaca Aya',
	'formarticleexiststext'        => 'Kaca [[$1]] geus aya.',
	'formbadpagenametext'          => 'Data formulir nu diasupkeun ngahasilkeun ngaran kaca nu teu payus, "$1".',
	'formrequiredfieldpluralerror' => 'Eusieun $1 kudu dieusian. Mangga eusian heula.',
	'formsaveerrortext'            => "Aya éror nu teu kanyahoan nalika nyimpen kaca '$1'.",
);

/** Swedish (Svenska)
 * @author Lejonel
 * @author M.M.S.
 * @author M.M.S.
 */
$messages['sv'] = array(
	'form'                  => 'Formulär',
	'formnoname'            => 'Formulärnamn saknas',
	'formnonametext'        => 'Du måste ange ett formulärnamn på formen "Special:Form/Formulärnamn".',
	'formbadname'           => 'Felaktigt formulärnamn',
	'formbadnametext'       => 'Det finns inget formulär med det namnet.',
	'formpattern'           => '$1-formulär',
	'formtitlepattern'      => 'Lägg till ny $1',
	'formsave'              => 'Spara',
	'formarticleexists'     => 'Sidan existerar',
	'formarticleexiststext' => 'Sidan [[$1]] finns redan.',
	'formbadpagename'       => 'Dåligt sidnamn',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'form'                  => 'ఫారం',
	'formnoname'            => 'ఫారం పేరు లేదు',
	'formnonametext'        => 'మీరు తప్పనిసరిగా ఫారానికి ఓ పేరు, "Special:Form/Nameofform" వంటిది ఇవ్వాలి.',
	'formbadnametext'       => 'అటువంటి పేరుతో ఫారం లేదు.',
	'formsave'              => 'భద్రపరచు',
	'formarticleexists'     => 'పేజీ ఉంది',
	'formarticleexiststext' => '[[$1]] అనే పేజీ ఇప్పటికే ఉంది.',
	'formbadpagename'       => 'తప్పుడు పేజీ పేరు',
);

