<?php
/**
 * Internationalisation file for the extension DataTransclusion
 *
 * @file
 * @ingroup Extensions
 * @author Daniel Kinzler for Wikimedia Deutschland
 * @copyright © 2010 Wikimedia Deutschland (Author: Daniel Kinzler)
 * @licence GNU General Public Licence 2.0 or later
 */

$messages = array();

/** English
 */
$messages['en'] = array(
	'datatransclusion-desc'         => 'Import and rendering of data records from external data sources',

	'datatransclusion-test-wikitext' => 'some <span class="test">html</span> and \'\'markup\'\'.', // Do not translate.
	'datatransclusion-test-evil-html' => 'some <object>evil</object> html.', // Do not translate.
	'datatransclusion-test-nowiki' => 'some <nowiki>{{nowiki}}</nowiki> code.', // Do not translate.

	'datatransclusion-missing-source'            => 'No data source specified.
Second or "source" argument is required.', #FUZZ!
	'datatransclusion-unknown-source'            => 'Bad data source specified.
"$1" is not known.',
	'datatransclusion-missing-key'           => 'No key specified.
$2 are valid keys in data source $1.',
	'datatransclusion-bad-argument-by'           => 'Bad key field specified.
"$2" is not a key field in data source "$1".
{{PLURAL:$4|Valid key|Valid keys are}}: $3.',
	'datatransclusion-missing-argument-key'      => 'No key value specified.
Second or "key" argument is required.',
	'datatransclusion-missing-argument-template' => 'No template specified.
First or "template" argument is required.', #FUZZ!
	'datatransclusion-record-not-found'          => 'No record matching $2 = $3 was found in data source $1.',
	'datatransclusion-bad-template-name'         => 'Bad template name: $1.',
	'datatransclusion-unknown-template'          => '<nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki> does not exist.',
);

/** Message documentation (Message documentation)
 * @author Siebrand
 */
$messages['qqq'] = array(
	'datatransclusion-desc' => '{{desc}}',
	'datatransclusion-missing-source' => 'Issued if no data "source" or second positional argument was specified.',
	'datatransclusion-unknown-source' => 'Issued if an unknown data source was specified. Parameters:
* $1 is the name of the data source.',
	'datatransclusion-missing-key' => 'Issued if no argument matches an entry in the list of key field. Parameters:
* $1 is the name of the data source
* $2 is a list of all valid keys for this data source
* $3 is the number of valid keys for this data source.',
	'datatransclusion-missing-argument-template' => 'Issued if no "template" or first positional argument was given provided. A target template is always required.',
	'datatransclusion-record-not-found' => 'issued if the record specified using the "by" and "key" arguments was nout found in the data source.  Parameters:
* $1 is the name of the data source
* $2 is the key filed used
* $3 is the key value to select by.',
	'datatransclusion-bad-template-name' => 'Issued if the template name specified is not valid. Parameters:
* $1 is the given template name.',
	'datatransclusion-unknown-template' => 'Issued if the template specified does not exist. Parameters:
* $1 is the given template name.',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'datatransclusion-desc' => 'Імпарт і паказ зьвестак з вонкавых крыніц',
	'datatransclusion-missing-source' => 'Крыніца зьвестак не пазначаная.
Першы парамэтар — абавязковы.',
	'datatransclusion-unknown-source' => 'Няслушная крыніца зьвестак.
$1 — невядомая.',
	'datatransclusion-missing-argument-template' => 'Шаблён не пазначаны. 
Неабходны трэці ці «шаблённы» аргумэнт.',
	'datatransclusion-record-not-found' => 'Ня знойдзеныя супадаючыя запісы $2 = $3 ў крыніцы зьвестак $1.',
	'datatransclusion-bad-template-name' => 'Няслушная назва шаблёну: $1.',
	'datatransclusion-unknown-template' => '<nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki> не існуе.',
);

/** Breton (Brezhoneg)
 * @author Y-M D
 */
$messages['br'] = array(
	'datatransclusion-bad-template-name' => 'Anv patrom direizh : $1.',
	'datatransclusion-unknown-template' => "N'eus ket eus <nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki>.",
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'datatransclusion-desc' => 'Ermöglicht den Import und die Darstellung von Datensätzen aus externen Datenquellen',
	'datatransclusion-missing-source' => 'Es wurde keine Datenquelle angegeben.
Das erste Argument ist erforderlich.',
	'datatransclusion-unknown-source' => 'Es wurde eine mangelhafte Datenquelle angegeben.
$1 ist nicht bekannt.',
	'datatransclusion-missing-argument-template' => 'Es wurde keine Vorlage angegeben.
Ein drittes oder ein Vorlagen-Argument ist erforderlich.',
	'datatransclusion-record-not-found' => 'Es wurde kein passender Datensatz $2 = $3 in der Datenquelle $1 gefunden.',
	'datatransclusion-bad-template-name' => 'Mangelhafter Vorlagenname: $1.',
	'datatransclusion-unknown-template' => '<nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki> existiert nicht.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'datatransclusion-desc' => 'Importowanje a pśedstajenje datowych sajźbow z eksternych datowych žrědłow',
	'datatransclusion-missing-source' => 'Žedne datowe žrědło pódane.
Prědny argument jo trěbny.',
	'datatransclusion-unknown-source' => 'Wopacne datowe žrědło pódane.
$1 jo njeznaty.',
	'datatransclusion-missing-argument-template' => 'Žedna pśedłoga pódana.
Tśeśi abo "pśedłogowy" argument jo trěbny.',
	'datatransclusion-record-not-found' => 'W datowem žrědle $1 njejo se žedna sajźba namakała, kótaraž $2=$3 wótpowědujo.',
	'datatransclusion-bad-template-name' => 'Wopacne mě pśedłogi: $1.',
	'datatransclusion-unknown-template' => '<nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki> njeeksistěrujo.',
);

/** Spanish (Español)
 * @author Crazymadlover
 */
$messages['es'] = array(
	'datatransclusion-desc' => 'Importación y representación de registro de datos desde fuentes externas de datos',
	'datatransclusion-missing-source' => 'Ninguna fuente de datos especificada.
Primer argumento es obligatorio.',
	'datatransclusion-unknown-source' => 'Fuente de datos mal especificado.
$1 es desconocido.',
	'datatransclusion-missing-argument-template' => 'Ninguna plantilla especificada.
Argumento tercero o "plantilla" es obligatorio.',
	'datatransclusion-record-not-found' => 'Ningún registro coincidente $2 = $3 fue encontrado en la fuente de datos $1.',
	'datatransclusion-bad-template-name' => 'Mal nombre de plantilla: $1.',
	'datatransclusion-unknown-template' => '<nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki> no existe.',
);

/** French (Français)
 * @author Peter17
 */
$messages['fr'] = array(
	'datatransclusion-desc' => 'Importer et mettre en forme des données depuis des sources externes',
	'datatransclusion-missing-source' => 'Aucune source de données n’est spécifiée.
Le premier argument est obligatoire.',
	'datatransclusion-unknown-source' => 'Mauvaise source de données spécifiée.
$1 est inconnu.',
	'datatransclusion-missing-argument-template' => 'Aucun modèle spécifié.
Le troisième argument ou « modèle » est obligatoire.',
	'datatransclusion-record-not-found' => 'Aucun enregistrement vérifiant $2 = $3 n’a été trouvé dans la source de données $1.',
	'datatransclusion-bad-template-name' => 'Mauvais nom de modèle : $1.',
	'datatransclusion-unknown-template' => '<nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki> n’existe pas.',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'datatransclusion-desc' => 'Importación e procesamento de rexistros de datos de fontes externas',
	'datatransclusion-missing-source' => 'Non se especificou ningunha fonte de datos.
Necesítase o primeiro argumento.',
	'datatransclusion-unknown-source' => 'A fonte de datos que se especificou é incorrecta.
Descoñécese o que é "$1".',
	'datatransclusion-bad-argument-by' => 'A clave de campo que se especificou é incorrecta.
"$2" non é unha clave de campo na fonte de datos "$1"; exemplos de claves válidas: $3.',
	'datatransclusion-missing-argument-key' => 'Non se especificou ningún valor para a chave.
Necesítase o segundo argumento ou "clave".',
	'datatransclusion-missing-argument-template' => 'Non se especificou ningún modelo.
Necesítase o terceiro argumento ou "modelo".',
	'datatransclusion-record-not-found' => 'Non se atopou ningún rexistro que coincidise $2 = $3 na fonte de datos "$1".',
	'datatransclusion-bad-template-name' => 'O nome do modelo é incorrecto: $1.',
	'datatransclusion-unknown-template' => '<nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki> non existe.',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'datatransclusion-desc' => 'Importowanje a předstajenje datowych sadźbow z eksternych datowych žórłow',
	'datatransclusion-missing-source' => 'Žane datowe žórło podate.
Prěni argument je trěbny.',
	'datatransclusion-unknown-source' => 'Wopačne datowe žórło podate.
$1 je njeznaty.',
	'datatransclusion-missing-argument-template' => 'Žana předłoha podata.
Třeći abo "předłohowy" argument je trěbny.',
	'datatransclusion-record-not-found' => 'W datowym žórle $1 njeje so žana datowa sadźba namakała, kotraž $2=$3 wotpowěduje.',
	'datatransclusion-bad-template-name' => 'Wopačne mjeno předłohi: $1.',
	'datatransclusion-unknown-template' => '<nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki> njeeksistuje.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'datatransclusion-desc' => 'Importation e rendition de datos ex fontes externe',
	'datatransclusion-missing-source' => 'Nulle fonte de datos specificate.
Le prime parametro es obligatori.',
	'datatransclusion-unknown-source' => 'Un fonte de datos invalide ha essite specificate.
$1 non es cognoscite.',
	'datatransclusion-missing-argument-template' => 'Nulle patrono specificate.
Un tertie parametro "template" es obligatori.',
	'datatransclusion-record-not-found' => 'Nulle dato correspondente a $2 = $3 ha essite trovate in le fonte de datos $1.',
	'datatransclusion-bad-template-name' => 'Nomine de patrono incorrecte: $1.',
	'datatransclusion-unknown-template' => '<nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki> non existe.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'datatransclusion-bad-template-name' => 'Schlechten Numm fir eng Schabloun: $1.',
	'datatransclusion-unknown-template' => '<nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki> gëtt et net.',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'datatransclusion-desc' => 'Увоз и обликување на податотечни записи од надворешни податотечни извори',
	'datatransclusion-missing-source' => 'не е укажан податотечен извор (се бара првиот аргумент)',
	'datatransclusion-unknown-source' => 'укажан е лош податотечен извор ($1 е непознат)',
	'datatransclusion-missing-argument-template' => 'нема укажано шаблон (се бара третиот аргумент или „шаблон“)',
	'datatransclusion-record-not-found' => 'во податочниот извор $1 нема пронајдено запис што одговара на $2 = $3',
	'datatransclusion-bad-template-name' => 'лошо име на шаблон: $1',
	'datatransclusion-unknown-template' => '<nowiki>{{</nowiki>[[Template:$1|$1]]<nowiki>}}</nowiki> не постои.',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'datatransclusion-desc' => 'Importeren en renderen van gegevens uit externe bronnen',
	'datatransclusion-missing-source' => 'Er is geen gegevensbron aangegeven.
Het eerste argument is verplicht.',
	'datatransclusion-unknown-source' => 'Er is een ongeldige gegevensbron aangegeven.
$1 is niet bekend.',
	'datatransclusion-missing-argument-template' => 'Geen sjabloon aangegeven.
Een derde argument of "template" is verplicht.',
	'datatransclusion-record-not-found' => 'Er is geen overeenkomstig gegeven $2 = $3 gevonden in de gegevensbron $1.',
	'datatransclusion-bad-template-name' => 'Ongeldige sjabloonnaam: $1.',
	'datatransclusion-unknown-template' => '<nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki>  bestaat niet.',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'datatransclusion-desc' => 'Importação e apresentação de registos de dados vindos de fontes externas',
	'datatransclusion-missing-source' => 'Não foi especificada a fonte dos dados.
O primeiro argumento é obrigatório.',
	'datatransclusion-unknown-source' => 'A fonte de dados especificada é incorrecta.
$1 não é conhecido.',
	'datatransclusion-missing-argument-template' => 'Não foi especificada uma predefinição.
O terceiro argumento, ou argumento "predefinição", é obrigatório.',
	'datatransclusion-record-not-found' => 'Não foi encontrado nenhum registo $2 = $3 na fonte de dados $1.',
	'datatransclusion-bad-template-name' => 'Nome da predefinição incorrecto: $1.',
	'datatransclusion-unknown-template' => '<nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki> não existe.',
);

/** Russian (Русский)
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'datatransclusion-desc' => 'Импорт и обработка данных из внешних источников данных',
	'datatransclusion-missing-source' => 'Не указан источник данных.
Первый аргумент является обязательным.',
	'datatransclusion-unknown-source' => 'Указан неправильный источник данных.
$1 — неизвестен.',
	'datatransclusion-missing-argument-template' => 'Не указан шаблон.
Третий или «шаблонный» аргумент является обязательным.',
	'datatransclusion-record-not-found' => 'В источнике данных $1 не найдено записи, соответствующей $2 = $3',
	'datatransclusion-bad-template-name' => 'Неправильное название шаблона: $1.',
	'datatransclusion-unknown-template' => '<nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki>  не существуе.',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'datatransclusion-desc' => 'Pag-aangkat at pagdudulog ng mga talaan ng dato mula sa mga pinagmulan ng datong panlabas',
	'datatransclusion-missing-source' => 'Walang tinukoy na pinagmulan ng dato.
Kailangan ang unang argumento.',
	'datatransclusion-unknown-source' => 'Natukoy ang masamang pinagmulan ng dato.
Hindi alam ang $1.',
	'datatransclusion-missing-argument-template' => 'Walang tinukoy na suleras.
Kailangan ang pangatlo o argumentong "suleras".',
	'datatransclusion-record-not-found' => 'Walang natagpuang rekord na tumutugma sa $2 = $3 na nasa loob ng pinagmulan ng dato na $1.',
	'datatransclusion-bad-template-name' => 'Masamang pangalan ng suleras: $1.',
	'datatransclusion-unknown-template' => 'Hindi umiiral ang <nowiki>{{</nowiki>[[{{ns:template}}:$1|$1]]<nowiki>}}</nowiki>.',
);

