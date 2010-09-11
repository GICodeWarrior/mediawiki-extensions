<?php

/**
 * Internationalization file for the Validator extension
 *
 * @file Validator.i18n.php
 * @ingroup Validator
 *
 * @author Jeroen De Dauw
*/

$messages = array();

/** English
 * @author Jeroen De Dauw
 */
$messages['en'] = array(
	'validator-desc' => 'Provides generic parameter handling support for other extensions',

	'validator_error_parameters' => 'The following {{PLURAL:$1|error has|errors have}} been detected in your syntax:',
	'validator_warning_parameters' => 'There {{PLURAL:$1|is an error|are errors}} in your syntax.',

	// General errors
	'validator_error_unknown_argument' => '$1 is not a valid parameter.',
	'validator_error_required_missing' => 'The required parameter $1 is not provided.',
	'validator-error-override-argument' => 'Tried to override parameter $1 (value: $2) with value "$3"', 

	// Criteria errors for single values
	'validator_error_empty_argument' => 'Parameter $1 can not have an empty value.',
	'validator_error_must_be_number' => 'Parameter $1 can only be a number.',
	'validator_error_must_be_integer' => 'Parameter $1 can only be an integer.',
	'validator-error-must-be-float' => 'Parameter $1 can only be a floating point number.',
	'validator_error_invalid_range' => 'Parameter $1 must be between $2 and $3.',
	'validator-error-invalid-length' => 'Parameter $1 must have a length of $2.',
	'validator-error-invalid-length-range' => 'Parameter $1 must have a length between $2 and $3.',
	'validator_error_invalid_argument' => 'The value $1 is not valid for parameter $2.',

	// Criteria errors for lists
	'validator_list_error_empty_argument' => 'Parameter $1 does not accept empty values.',
	'validator_list_error_must_be_number' => 'Parameter $1 can only contain numbers.',
	'validator_list_error_must_be_integer' => 'Parameter $1 can only contain integers.',
	'validator_list_error_invalid_range' => 'All values of parameter $1 must be between $2 and $3.',
	'validator_list_error_invalid_argument' => 'One or more values for parameter $1 are invalid.',

	'validator_list_omitted' => 'The {{PLURAL:$2|value|values}} $1 {{PLURAL:$2|has|have}} been omitted.',

	// Criteria errors for single values & lists
	'validator_error_accepts_only' => 'The value "$4" is not valid for parameter $1. It only accepts {{PLURAL:$3|this value|these values}}: $2.',
);

/** Message documentation (Message documentation)
 * @author Fryed-peach
 * @author Purodha
 */
$messages['qqq'] = array(
	'validator-desc' => '{{desc}}',
	'validator_error_parameters' => 'Parameters:
* $1 is the number of syntax errors, for PLURAL support (optional)',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'validator-desc' => 'Die valideerder gee ander uitbreidings die vermoë om parameters van ontlederfunksies en etiket-uitbreidings te valideer, op hulle verstekwaardes in te stel en om foutboodskappe te genereer',
	'validator_error_parameters' => 'Die volgende {{PLURAL:$1|fout|foute}} is in u sintaks waargeneem:',
	'validator_error_unknown_argument' => "$1 is nie 'n geldige parameter nie.",
	'validator_error_required_missing' => 'Die verpligte parameter $1 is nie verskaf nie.',
	'validator_error_empty_argument' => 'Die parameter $1 mag nie leeg wees nie.',
	'validator_error_must_be_number' => "Die parameter $1 mag net 'n getal wees.",
	'validator_error_must_be_integer' => "Die parameter $1 kan slegs 'n heelgetal wees.",
	'validator_error_invalid_range' => 'Die parameter $1 moet tussen $2 en $3 lê.',
	'validator_error_invalid_argument' => 'Die waarde $1 is nie geldig vir parameter $2 nie.',
	'validator_error_accepts_only' => 'Die parameter $1 kan slegs die volgende {{PLURAL:$3|waarde|waardes}} hê: $2.',
);

/** Gheg Albanian (Gegë)
 * @author Mdupont
 */
$messages['aln'] = array(
	'validator-desc' => 'Validator është një zgjerim MediaWiki që ofron parametër përgjithshme trajtimin mbështetje të shtesave të tjera',
	'validator_error_parameters' => 'Më poshtë {{PLURAL:$1|gabim ka gabime|kanë}} është zbuluar në sintaksën e juaj:',
	'validator_warning_parameters' => 'Ka {{PLURAL:$1|është|janë gabime gabim}} në sintaksë tuaj.',
	'validator_error_unknown_argument' => '$1 nuk është një parametër i vlefshëm.',
	'validator_error_required_missing' => 'Parametrat e nevojshëm $1 nuk jepet.',
	'validator_error_empty_argument' => 'Parametër $1 nuk mund të ketë një vlerë bosh.',
	'validator_error_must_be_number' => 'Parametër $1 mund të jetë vetëm një numër.',
	'validator_error_must_be_integer' => 'Parametër $1 mund të jetë vetëm një numër i plotë.',
	'validator_error_invalid_range' => 'Parametër $1 duhet të jetë në mes të $2 dhe $3.',
	'validator_error_invalid_argument' => 'Vlera $1 nuk është i vlefshëm për parametër $2.',
	'validator_list_error_empty_argument' => 'Parametër $1 nuk e pranon vlerat bosh.',
	'validator_list_error_must_be_number' => 'Parametër $1 mund të përmbajë vetëm numrat.',
	'validator_list_error_must_be_integer' => 'Parametër $1 mund të përmbajë vetëm numra të plotë.',
	'validator_list_error_invalid_range' => 'Të gjitha vlerat e parametrit $1 duhet të jetë në mes të $2 dhe $3.',
	'validator_list_error_invalid_argument' => 'Një ose më shumë vlera për parametër $1 janë të pavlefshme.',
	'validator_list_omitted' => '{{PLURAL:$2 |vlerë|vlerat}} $1 {{PLURAL:$2|ka|kanë}} janë lënë jashtë.',
	'validator_error_accepts_only' => 'Parametër $1 vetëm pranon {{PLURAL:$3|kjo vlerë|këtyre vlerave}}: $2.',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'validator-desc' => 'المحقق يوفر طريقة سهلة للامتدادات الأخرى للتحقق من محددات دوال المحلل وامتدادات الوسوم، وضبط القيم الافتراضية وتوليد رسائل الخطأ',
	'validator_error_parameters' => '{{PLURAL:$1|الخطأ التالي|الاخطاء التالية}} تم كشفها في صياغتك:',
	'validator_warning_parameters' => 'هناك {{PLURAL:$1|خطأ|أخطاء}} في صياغتك.',
	'validator_error_unknown_argument' => '$1 ليس محددا صحيحا.',
	'validator_error_required_missing' => 'المحدد المطلوب $1 ليس متوفرا.',
	'validator_error_empty_argument' => 'المحدد $1 لا يمكن أن تكون قيمته فارغة.',
	'validator_error_must_be_number' => 'المحدد $1 يمكن أن يكون فقط عددا.',
	'validator_error_must_be_integer' => 'المحدد $1 يمكن أن يكون عددا صحيحا فقط.',
	'validator_error_invalid_range' => 'المحدد $1 يجب أن يكون بين $2 و $3.',
	'validator_error_invalid_argument' => 'القيمة $1 ليست صحيحة للمحدد $2.',
	'validator_list_error_empty_argument' => 'المحدد $1 لا يقبل القيم الفارغة.',
	'validator_list_error_must_be_number' => 'المحدد $1 يمكن أن يحتوي فقط على أرقام.',
	'validator_list_error_must_be_integer' => 'المحدد $1 يمكن أن يحتوي فقط على أرقام صحيحة.',
	'validator_list_error_invalid_range' => 'كل قيم المحدد $1 يجب أن تكون بين $2 و$3.',
	'validator_list_error_invalid_argument' => 'قيمة واحدة أو أكثر للمحدد $1 غير صحيحة.',
	'validator_list_omitted' => '{{PLURAL:$2|القيمة|القيم}} $1 {{PLURAL:$2|تم|تم}} مسحها.',
	'validator_error_accepts_only' => 'المحدد $1 يقبل فقط {{PLURAL:$3|هذه القيمة|هذه القيم}}: $2.',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 */
$messages['be-tarask'] = array(
	'validator-desc' => 'Правяраючы палягчае іншым пашырэньням працу па праверцы парамэтраў функцыяў парсэру і тэгаў пашырэньняў, устанаўлівае значэньні па змоўчваньні і стварае паведамленьні пра памылкі',
	'validator_error_parameters' => 'У сынтаксісе {{PLURAL:$1|выяўленая наступная памылка|выяўленыя наступныя памылкі}}:',
	'validator_warning_parameters' => 'У Вашы сынтаксісе {{PLURAL:$1|маецца памылка|маюцца памылкі}}.',
	'validator_error_unknown_argument' => 'Няслушны парамэтар $1.',
	'validator_error_required_missing' => 'Не пададзены абавязковы парамэтар $1.',
	'validator-error-override-argument' => 'Спрабаваў памяняць значэньне парамэтру $1 з «$2» на «$3»',
	'validator_error_empty_argument' => 'Парамэтар $1 ня можа мець пустое значэньне.',
	'validator_error_must_be_number' => 'Парамэтар $1 можа быць толькі лікам.',
	'validator_error_must_be_integer' => 'Парамэтар $1 можа быць толькі цэлым лікам.',
	'validator_error_invalid_range' => 'Парамэтар $1 павінен быць паміж $2 і $3.',
	'validator_error_invalid_argument' => 'Значэньне $1 не зьяўляецца слушным для парамэтру $2.',
	'validator_list_error_empty_argument' => 'Парамэтар $1 ня можа прымаць пустыя значэньні.',
	'validator_list_error_must_be_number' => 'Парамэтар $1 можа ўтрымліваць толькі лікі.',
	'validator_list_error_must_be_integer' => 'Парамэтар $1 можа ўтрымліваць толькі цэлыя лікі.',
	'validator_list_error_invalid_range' => 'Усе значэньні парамэтру $1 павінны знаходзіцца паміж $2 і $3.',
	'validator_list_error_invalid_argument' => 'Адно ці болей значэньняў парамэтру $1 зьяўляюцца няслушнымі.',
	'validator_list_omitted' => '{{PLURAL:$2|Значэньне|Значэньні}} $1 {{PLURAL:$2|было прапушчанае|былі прапушчаныя}}.',
	'validator_error_accepts_only' => 'Значэньне «$4» зьяўляецца няслушным для парамэтру $1. Ён можа прымаць толькі {{PLURAL:$3|гэтае значэньне|гэтыя значэньні}}: $2.',
);

/** Bulgarian (Български)
 * @author DCLXVI
 * @author Reedy
 */
$messages['bg'] = array(
	'validator_error_empty_argument' => 'Параметърът $1 не може да има празна стойност.',
);

/** Breton (Brezhoneg)
 * @author Fohanno
 * @author Fulup
 * @author Gwendal
 * @author Y-M D
 */
$messages['br'] = array(
	'validator-desc' => 'Un doare aes eo kadarnataer evit an astennoù all da gadarnaat arventennoù ar fonksionoù parser hag astennoù ar balizennoù, evit termeniñ talvoudennoù dre ziouer ha sevel kemennoù fazioù',
	'validator_error_parameters' => "Kavet eo bet ar {{PLURAL:$1|fazi|fazioù}} da-heul en hoc'h ereadur :",
	'validator_warning_parameters' => "{{PLURAL:$1|Ur fazi|Fazioù}} zo en hoc'h ereadur.",
	'validator_error_unknown_argument' => "$1 n'eo ket un arventenn reizh.",
	'validator_error_required_missing' => "N'eo ket bet pourchaset an arventenn rekis $1",
	'validator-error-override-argument' => 'Klasket eo bet divankañ an arventenn $1 (talvoud : $2) gant an talvoud "$3"',
	'validator_error_empty_argument' => "N'hall ket an arventenn $1 bezañ goullo he zalvoudenn",
	'validator_error_must_be_number' => 'Un niver e rank an arventenn $1 bezañ hepken.',
	'validator_error_must_be_integer' => 'Rankout a ra an arventenn $1 bezañ un niver anterin.',
	'validator_error_invalid_range' => 'Rankout a ra an arventenn $1 bezañ etre $2 hag $3.',
	'validator_error_invalid_argument' => "N'eo ket reizh an dalvoudenn $1 evit an arventenn $2.",
	'validator_list_error_empty_argument' => 'Ne zegemer ket an arventenn $1 an talvoudennoù goullo.',
	'validator_list_error_must_be_number' => "N'hall bezañ nemet niveroù en arventenn $1.",
	'validator_list_error_must_be_integer' => "N'hall bezañ nemet niveroù anterin en arventenn $1.",
	'validator_list_error_invalid_range' => 'An holl talvoudennoù eus an arventenn $1 a rank bezañ etre $2 ha $3.',
	'validator_list_error_invalid_argument' => 'Faziek eo unan pe meur a dalvoudenn eus an arventenn $1.',
	'validator_list_omitted' => 'Disoñjet eo bet an {{PLURAL:$2|talvoudenn|talvoudennoù}} $1.',
	'validator_error_accepts_only' => 'An arventenn $1 ne zegemer ket an talvoud "$4". Degemeret e vez {{PLURAL:$3|an dalvoudenn|an talvoudennoù}}-mañ : $2.',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'validator-desc' => 'Validator pruža jednostavni način za druga proširenja u svrhu validacije parametara parserskih funkcija i proširenja oznaka, postavlja pretpostavljene vrijednosti i generira poruke pogrešaka.',
	'validator_error_parameters' => 'U Vašoj sintaksi {{PLURAL:$1|je|su}} {{PLURAL:$1|otkivena slijedeća greška|otkrivene slijedeće greške}}:',
	'validator_warning_parameters' => '{{PLURAL:$1|Postoji greška|Postoje greške}} u Vašoj sintaksi.',
	'validator_error_unknown_argument' => '$1 nije valjan parametar.',
	'validator_error_required_missing' => 'Obavezni parametar $1 nije naveden.',
	'validator-error-override-argument' => 'Pokušano da se preskoči parametar $1 (vrijednost: $2) vrijednošću "$3"',
	'validator_error_empty_argument' => 'Parametar $1 ne može imati praznu vrijednost.',
	'validator_error_must_be_number' => 'Parametar $1 može biti samo broj.',
	'validator_error_must_be_integer' => 'Parametar $1 može biti samo cijeli broj.',
	'validator_error_invalid_range' => 'Parametar $1 mora biti između $2 i $3.',
	'validator_error_invalid_argument' => 'Vrijednost $1 nije valjana za parametar $2.',
	'validator_list_error_empty_argument' => 'Parametar $1 ne prima prazne vrijednosti.',
	'validator_list_error_must_be_number' => 'Parametar $1 može sadržavati samo brojeve.',
	'validator_list_error_must_be_integer' => 'Parametar $1 može sadržavati samo cijele brojeve.',
	'validator_list_error_invalid_range' => 'Sve vrijednosti parametra $1 moraju biti između $2 i $3.',
	'validator_list_error_invalid_argument' => 'Jedna ili više vrijednosti za parametar $1 nisu valjane.',
	'validator_list_omitted' => '{{PLURAL:$2|Vrijednost|Vrijednosti}} $1 {{PLURAL:$2|je ispuštena|su ispuštene}}.',
	'validator_error_accepts_only' => 'Vrijednost "$4" nije valjana za parametar $1. On prihvata samo {{PLURAL:$3|ovu vrijednost|ove vrijednosti}}: $2.',
);

/** Czech (Česky)
 * @author Matěj Grabovský
 * @author Mormegil
 * @author Reaperman
 */
$messages['cs'] = array(
	'validator-desc' => 'Validátor poskytuje ostatním rozšířením snadnější způsob ověřování parametrů funkcí parseru a značek, nastavování výchozích hodnot a vytváření chybových zpráv.',
	'validator_error_parameters' => 'Ve vaší syntaxi {{PLURAL:$1|byla nalezena následující chyba|byly nalezeny následující chyby}}:',
	'validator_warning_parameters' => 'Ve vaší syntaxi {{PLURAL:$1|je chyba|jsou chyby}}.',
	'validator_error_unknown_argument' => '$1 není platný parametr.',
	'validator_error_required_missing' => 'Povinný parameter $1 nebyl specifikován.',
	'validator_error_empty_argument' => 'Parametr $1 nemůže být prázdný.',
	'validator_error_must_be_number' => 'Parametr $1 může být pouze číslo.',
	'validator_error_must_be_integer' => 'Parametr $1 může být pouze celé číslo.',
	'validator_error_invalid_range' => 'Parametr $1 musí být v rozmezí $2 až $3.',
	'validator_error_invalid_argument' => '$1 není platná hodnota pro parametr $2.',
	'validator_list_error_empty_argument' => 'Parametr $1 npeřijímá prázdné hoodnoty.',
	'validator_list_error_must_be_number' => 'Parametr $1 může obsahovat pouze čísla.',
	'validator_list_error_must_be_integer' => 'Paramter $1 může obsahovat pouze celá čísla.',
	'validator_list_error_invalid_range' => 'Všechny hodnoty parametru $1 musí být v rozmezí $2 až $3.',
	'validator_list_error_invalid_argument' => 'Jedna nebo více hodnot parametru $1 jsou neplatné.',
	'validator_list_omitted' => '{{PLURAL:$2|Hodnota $1 byla vynechána|Hodnoty $1 byly vynechány}}.',
	'validator_error_accepts_only' => 'Parametr $1 nemůže mít hodnotu „$4“; přijímá pouze {{PLURAL:$3|tuto hodnotu|tyto hodnoty}}: $2.',
);

/** German (Deutsch)
 * @author DaSch
 * @author Imre
 * @author Kghbln
 * @author LWChris
 */
$messages['de'] = array(
	'validator-desc' => 'Ermöglicht es anderen Softwareerweiterungen Parameter verarbeiten zu können',
	'validator_error_parameters' => '{{PLURAL:$1|Der folgende Fehler wurde|Die folgenden Fehler wurden}} in der Syntax gefunden:',
	'validator_warning_parameters' => '{{PLURAL:$1|Es ist ein Fehler|Es sind Fehler}} in der Syntax.',
	'validator_error_unknown_argument' => '$1 ist kein gültiger Parameter.',
	'validator_error_required_missing' => 'Der notwendige Parameter $1 wurde nicht angegeben.',
	'validator-error-override-argument' => 'Es wurde versucht Parameter $1 ($2) mit dem Wert „$3“ zu überschreiben.',
	'validator_error_empty_argument' => 'Parameter $1 kann keinen leeren Wert haben.',
	'validator_error_must_be_number' => 'Parameter $1 kann nur eine Nummer sein.',
	'validator_error_must_be_integer' => 'Parameter $1 kann nur eine ganze Zahl sein.',
	'validator_error_invalid_range' => 'Parameter $1 muss zwischen $2 und $3 liegen.',
	'validator_error_invalid_argument' => 'Der Wert „$1“ ist nicht gültig für Parameter $2.',
	'validator_list_error_empty_argument' => 'Parameter $1 akzeptiert keine leeren Werte.',
	'validator_list_error_must_be_number' => 'Parameter $1 kann nur Nummern enthalten.',
	'validator_list_error_must_be_integer' => 'Parameter $1 kann nur ganze Zahlen enthalten.',
	'validator_list_error_invalid_range' => 'Alle Werte des Parameters $1 müssen zwischen „$2“ und „$3“ liegen.',
	'validator_list_error_invalid_argument' => 'Einer oder mehrere Werte für Parameter $1 sind ungültig.',
	'validator_list_omitted' => '{{PLURAL:$2|Der Wert|Die Werte}} $1 {{PLURAL:$2|wurde|wurden}} ausgelassen.',
	'validator_error_accepts_only' => 'Der Wert „$4“ ist nicht gültig für Parameter $1. Nur {{PLURAL:$3|der folgende Wert wird|die folgenden Werte werden}} akzeptiert: „$2“.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'validator-desc' => 'Validator stoj lažki nałog za druge rozšyrjenja k dispoziciji, aby se pśekontrolěrowali parametry parserowych funkcijow a toflickich rozšyrjenjow, nastajili standardne gódnoty a napórali zmólkowe powěsći',
	'validator_error_parameters' => '{{PLURAL:$1|Slědujuca zmólka jo se namakała|Slědujucej zmólce stej se namakałej|Slědujuce zmólki su se namakali|Slědujuce zmólki su se namakali}} w twójej syntaksy:',
	'validator_warning_parameters' => '{{PLURAL:$1|Jo zmólka|Stej zmólce|Su zmólki|Su zmólki}} w twójej syntaksy.',
	'validator_error_unknown_argument' => '$1 njejo płaśiwy parameter.',
	'validator_error_required_missing' => 'Trěbny parameter $1 njejo pódany.',
	'validator_error_empty_argument' => 'Parameter $1 njamóžo proznu gódnotu měś.',
	'validator_error_must_be_number' => 'Parameter $1 móžo jano licba byś.',
	'validator_error_must_be_integer' => 'Parameter $1 móžo jano ceła licba byś.',
	'validator_error_invalid_range' => 'Parameter $1 musy mjazy $2 a $3 byś.',
	'validator_error_invalid_argument' => 'Gódnota $1 njejo płaśiwa za parameter $2.',
	'validator_list_error_empty_argument' => 'Parameter $1 njeakceptěrujo prozne gódnoty.',
	'validator_list_error_must_be_number' => 'Parameter $1 móžo jano licby wopśimjeś.',
	'validator_list_error_must_be_integer' => 'Parameter $1 móžo jano cełe licby wopśimjeś.',
	'validator_list_error_invalid_range' => 'Wšykne gódnoty parametra $1 muse mjazy $2 a $3 byś.',
	'validator_list_error_invalid_argument' => 'Jadna gódnota abo wěcej gódnotow za parameter $1 su njepłaśiwe.',
	'validator_list_omitted' => '{{PLURAL:$2|Gódnota|Gódnośe|Gódnoty|Gódnoty}} $1 {{PLURAL:$2|jo se wuwóstajiła|stej se wuwóstajiłej|su se wuwóstajili|su se wuwostajili}}.',
	'validator_error_accepts_only' => 'Parameter $1 akceptěrujo jano {{PLURAL:$3|toś tu gódnotu|toś tej gódnośe|toś te gódnoty|toś te gódnoty}}: $2.',
);

/** Greek (Ελληνικά)
 * @author Dada
 * @author Lou
 * @author ZaDiak
 * @author Απεργός
 */
$messages['el'] = array(
	'validator_error_unknown_argument' => '$1 δεν είναι μια έγκυρη παράμετρος.',
	'validator_error_required_missing' => 'Λείπει η απαιτούμενη παράμετρος $1.',
	'validator_error_must_be_number' => 'Η παράμετρος $1 μπορεί να είναι μόνο αριθμός.',
	'validator_error_must_be_integer' => 'Η παράμετρος $1 μπορεί να είναι μόνο ακέραιος αριθμός.',
	'validator_list_error_must_be_number' => 'Η παράμετρος $1 μπορεί να περιέχει μόνο αριθμούς.',
	'validator_list_error_must_be_integer' => 'Η παράμετρος $1 μπορεί να περιέχει μόνο ακέραιους αριθμούς.',
	'validator_list_error_invalid_range' => 'Όλες οι τιμές της παραμέτρου $1 πρέπει να είναι μεταξύ $2 και $3.',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'validator_error_unknown_argument' => '$1 ne estas valida parametro.',
	'validator_error_required_missing' => 'La nepra parametro $1 mankas.',
	'validator_error_empty_argument' => 'Parametro $1 ne povas esti nula valoro.',
	'validator_error_must_be_number' => 'Parametro $1 nur povas esti numero.',
	'validator_error_must_be_integer' => 'Parametro $1 nur povas esti entjero.',
	'validator_error_invalid_range' => 'Parametro $1 estu inter $2 kaj $3.',
	'validator_list_error_invalid_argument' => 'Unu aŭ pliaj valoroj por parametro $1 estas malvalida.',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Imre
 * @author Translationista
 */
$messages['es'] = array(
	'validator-desc' => 'FUZZY!!! El validador es una herramienta para que otras funciones validen fácilmente parámetros de funciones de análisis y extensiones de etiquetas, establecer valores predeterminados y generar mensajes de error',
	'validator_error_parameters' => 'Se detectó {{PLURAL:$1|el siguiente error|los siguientes errores}} en la sintaxis empleada:',
	'validator_warning_parameters' => 'Hay {{PLURAL:$1|un error|errores}} en tu sintaxis.',
	'validator_error_unknown_argument' => '$1 no es un parámetro válido.',
	'validator_error_required_missing' => 'No se ha provisto el parámetro requerido $1.',
	'validator_error_empty_argument' => 'El parámetro $1 no puede tener un valor vacío.',
	'validator_error_must_be_number' => 'El parámetro $1 sólo puede ser un número.',
	'validator_error_must_be_integer' => 'El parámetro $1 sólo puede ser un número entero.',
	'validator_error_invalid_range' => 'El parámetro $1 debe ser entre $2 y $3.',
	'validator_error_invalid_argument' => 'El valor $1 no es válido para el parámetro $2.',
	'validator_list_error_empty_argument' => 'El parámetro $1 no acepta valores vacíos.',
	'validator_list_error_must_be_number' => 'El parámetro $1 sólo puede contener números.',
	'validator_list_error_must_be_integer' => 'El parámetro $1 sólo puede contener números enteros.',
	'validator_list_error_invalid_range' => 'Todos los valores del parámetro $1 deben ser entre $2 y $3.',
	'validator_list_error_invalid_argument' => 'Uno o más valores del parámetros $1 son inválidos.',
	'validator_list_omitted' => '{{PLURAL:$2|El valor|Los valores}} $1 {{PLURAL:$2|ha sido omitido|han sido omitidos}}.',
	'validator_error_accepts_only' => 'El parámetro $1 sólo acepta {{PLURAL:$3|este valor|estos valores}}: $2.',
);

/** Finnish (Suomi)
 * @author Crt
 * @author Silvonen
 * @author Str4nd
 */
$messages['fi'] = array(
	'validator-desc' => 'Tarkastaja tarjoaa helpon tavan muille laajennuksille jäsenninfunktioiden ja tagilaajennusten parametrien tarkastukseen, oletusarvojen asettamiseen ja virheilmoitusten luomiseen.',
	'validator_error_must_be_number' => 'Parametrin $1 on oltava luku.',
	'validator_error_must_be_integer' => 'Parametrin $1 on oltava kokonaisluku.',
);

/** French (Français)
 * @author Cedric31
 * @author Crochet.david
 * @author IAlex
 * @author Jean-Frédéric
 * @author McDutchie
 * @author Peter17
 * @author PieRRoMaN
 * @author Urhixidur
 * @author Verdy p
 */
$messages['fr'] = array(
	'validator-desc' => 'Le validateur fournit aux autres extensions un moyen simple de valider les paramètres des fonctions parseur et des extensions de balises, de définir des valeurs par défaut et de générer des messages d’erreur',
	'validator_error_parameters' => '{{PLURAL:$1|L’erreur suivante a été détectée|Les erreurs suivantes ont été détectées}} dans votre syntaxe :',
	'validator_warning_parameters' => 'Il y a {{PLURAL:$1|une erreur|des erreurs}} dans votre syntaxe.',
	'validator_error_unknown_argument' => '$1 n’est pas un paramètre valide.',
	'validator_error_required_missing' => 'Le paramètre requis $1 n’est pas fourni.',
	'validator-error-override-argument' => 'Le logiciel a essayé de remplacer le paramètre $1 (valeur : $2) avec la valeur « $3 »',
	'validator_error_empty_argument' => 'Le paramètre $1 ne peut pas avoir une valeur vide.',
	'validator_error_must_be_number' => 'Le paramètre $1 peut être uniquement un nombre.',
	'validator_error_must_be_integer' => 'Le paramètre $1 peut seulement être un entier.',
	'validator_error_invalid_range' => 'Le paramètre $1 doit être entre $2 et $3.',
	'validator_error_invalid_argument' => 'La valeur $1 n’est pas valide pour le paramètre $2.',
	'validator_list_error_empty_argument' => 'Le paramètre $1 n’accepte pas les valeurs vides.',
	'validator_list_error_must_be_number' => 'Le paramètre $1 ne peut contenir que des nombres.',
	'validator_list_error_must_be_integer' => 'Le paramètre $1 ne peut contenir que des entiers.',
	'validator_list_error_invalid_range' => 'Toutes les valeurs du paramètre $1 doivent être comprises entre $2 et $3.',
	'validator_list_error_invalid_argument' => 'Une ou plusieurs valeurs du paramètre $1 sont invalides.',
	'validator_list_omitted' => '{{PLURAL:$2|La valeur|Les valeurs}} $1 {{PLURAL:$2|a été oubliée|ont été oubliées}}.',
	'validator_error_accepts_only' => "La valeur « $4 » n'est pas valable pour le paramètre $1. Il accepte uniquement {{PLURAL:$3|cette valeur|ces valeurs}} : $2.",
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'validator_error_parameters' => '{{PLURAL:$1|Ceta èrror at étâ dècelâ|Cetes èrrors ont étâ dècelâs}} dens voutra sintaxa :',
	'validator_warning_parameters' => 'Y at {{PLURAL:$1|una èrror|des èrrors}} dens voutra sintaxa.',
	'validator_error_unknown_argument' => '$1 est pas un paramètre valido.',
	'validator_error_required_missing' => 'Lo paramètre nècèssèro $1 est pas balyê.',
	'validator_error_empty_argument' => 'Lo paramètre $1 pôt pas avêr una valor voueda.',
	'validator_error_must_be_number' => 'Lo paramètre $1 pôt étre ren qu’un nombro.',
	'validator_error_must_be_integer' => 'Lo paramètre $1 pôt étre ren qu’un entiér.',
	'validator_error_invalid_range' => 'Lo paramètre $1 dêt étre entre-mié $2 et $3.',
	'validator_error_invalid_argument' => 'La valor $1 est pas valida por lo paramètre $2.',
	'validator_list_error_empty_argument' => 'Lo paramètre $1 accèpte pas les valors vouedes.',
	'validator_list_error_must_be_number' => 'Lo paramètre $1 pôt contegnir ren que des nombros.',
	'validator_list_error_must_be_integer' => 'Lo paramètre $1 pôt contegnir ren que des entiérs.',
	'validator_list_error_invalid_range' => 'Totes les valors du paramètre $1 dêvont étre entre-mié $2 et $3.',
	'validator_list_error_invalid_argument' => 'Yona ou ben un mouél de valors du paramètre $1 sont envalides.',
	'validator_list_omitted' => '{{PLURAL:$2|La valor|Les valors}} $1 {{PLURAL:$2|at étâ oubliâ|ont étâ oubliâs}}.',
	'validator_error_accepts_only' => 'La valor « $4 » est pas valida por lo paramètre $1. Accèpte ren que {{PLURAL:$3|ceta valor|cetes valors}} : $2.',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'validator-desc' => 'O servizo de validación ofrece un medio sinxelo a outras extensións para validar os parámetros de funcións analíticas e etiquetas de extensións, para establecer os valores por defecto e para xerar mensaxes de erro',
	'validator_error_parameters' => '{{PLURAL:$1|Detectouse o seguinte erro|Detectáronse os seguintes erros}} na sintaxe empregada:',
	'validator_warning_parameters' => 'Hai {{PLURAL:$1|un erro|erros}} na súa sintaxe.',
	'validator_error_unknown_argument' => '"$1" non é un parámetro válido.',
	'validator_error_required_missing' => 'Non se proporcionou o parámetro $1 necesario.',
	'validator-error-override-argument' => 'Intentouse sobrescribir o parámetro $1 (valor: $2) co valor "$3"',
	'validator_error_empty_argument' => 'O parámetro $1 non pode ter un valor baleiro.',
	'validator_error_must_be_number' => 'O parámetro $1 só pode ser un número.',
	'validator_error_must_be_integer' => 'O parámetro $1 só pode ser un número enteiro.',
	'validator_error_invalid_range' => 'O parámetro $1 debe estar entre $2 e $3.',
	'validator_error_invalid_argument' => 'O valor $1 non é válido para o parámetro $2.',
	'validator_list_error_empty_argument' => 'O parámetro $1 non acepta valores en branco.',
	'validator_list_error_must_be_number' => 'O parámetro $1 só pode conter números.',
	'validator_list_error_must_be_integer' => 'O parámetro $1 só pode conter números enteiros.',
	'validator_list_error_invalid_range' => 'Todos os valores do parámetro $1 deben estar comprendidos entre $2 e $3.',
	'validator_list_error_invalid_argument' => 'Un ou varios valores do parámetro $1 non son válidos.',
	'validator_list_omitted' => '{{PLURAL:$2|O valor|Os valores}} $1 {{PLURAL:$2|foi omitido|foron omitidos}}.',
	'validator_error_accepts_only' => 'O valor "$4" non é válido para o parámetro "$1". Só acepta {{PLURAL:$3|este valor|estes valores}}: $2.',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'validator-desc' => 'Validator stellt e eifachi Form z Verfiegig fir anderi Erwyterige go Parameter validiere vu Parser- un Tag-Funktione, go Standardwärt definiere un Fählermäldige generiere',
	'validator_error_parameters' => '{{PLURAL:$1|Dää Fähler isch|Die Fähler sin}} in Dyyre Syntax gfunde wore:',
	'validator_warning_parameters' => 'S het {{PLURAL:$1|e Fähler|Fähler}} in dyyre Syntax.',
	'validator_error_unknown_argument' => '$1 isch kei giltige Parameter.',
	'validator_error_required_missing' => 'Dr Paramter $1, wu aagforderet woren isch, wird nit z Verfiegig gstellt.',
	'validator-error-override-argument' => 'S isch versuecht wore, dr Parameter $1 (Wärt: $2) mit em Wärt „$3“ z iberschryybe',
	'validator_error_empty_argument' => 'Dr Parameter $1 cha kei lääre Wärt haa.',
	'validator_error_must_be_number' => 'Dr Parameter $1 cha nume ne Zahl syy.',
	'validator_error_must_be_integer' => 'Parameter $1 cha nume ne giltigi Zahl syy.',
	'validator_error_invalid_range' => 'Dr Parameter $1 muess zwische $2 un $3 syy.',
	'validator_error_invalid_argument' => 'Dr Wärt $1 isch nit giltig fir dr Parameter $2.',
	'validator_list_error_empty_argument' => 'Bim Parameter $1 sin keini lääre Wärt zuegloo.',
	'validator_list_error_must_be_number' => 'Fir dr Parameter $1 si nume Zahle zuegloo.',
	'validator_list_error_must_be_integer' => 'Fir dr Parameter $1 sin nume ganzi Zahle zuegloo.',
	'validator_list_error_invalid_range' => 'Alli Wärt fir dr Parameter $1 mien zwische $2 un $3 lige.',
	'validator_list_error_invalid_argument' => 'Ein oder mehreri Wärt fir dr Parameter $1 sin nit giltig.',
	'validator_list_omitted' => '{{PLURAL:$2|Dr Wärt|D Wärt}} $1 {{PLURAL:$2|isch|sin}} uusgloo wore.',
	'validator_error_accepts_only' => 'Dr Wärt „$4“ isch nit giltig fir dr Parameter $1. Nume {{PLURAL:$3|dää Wärt wird|die Wärt wäre}} akzeptiert: „$2“.',
);

/** Hebrew (עברית)
 * @author Amire80
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'validator_warning_parameters' => '{{PLURAL:$1|ישנה שגיאה|ישנן שגיאות}} בתחביר שלכם.',
	'validator_error_unknown_argument' => '$1 אינו פרמטר תקני.',
	'validator_error_required_missing' => 'הפרמטר הדרוש $1 לא צוין.',
	'validator_error_empty_argument' => 'הפרמטר $1 לא יכול להיות ערך ריק.',
	'validator_error_must_be_number' => 'הפרמטר $1 יכול להיות מספר בלבד.',
	'validator_error_must_be_integer' => 'הפרמטר $1 יכול להיות מספר שלם בלבד.',
	'validator_error_invalid_range' => 'הפרמטר $1 חייב להיות בין $2 ל־$3.',
	'validator_error_invalid_argument' => 'הערך $1 אינו תקני עבור הפרמטר $2.',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'validator-desc' => 'Validator skići lochke wašnje za druhe rozšěrjenja, zo bychu so parametry parserowych funkcijow a tafličkowych rozšěrjenjow přepruwowali, standardne hódnoty nastajili a zmylkowe powěsće wutworili',
	'validator_error_parameters' => '{{PLURAL:$1|Slědowacy zmylk bu|Slědowacej zmylkaj buštej|Slědowace zmylki buchu|Slědowace zmylki buchu}} w twojej syntaksy {{PLURAL:$1|wotkryty|wotkrytej|wotkryte|wotkryte}}:',
	'validator_warning_parameters' => '{{PLURAL:$1|Je zmylk|Stej zmylkaj|Su zmylki|Su zmylki}} w twojej syntaksy.',
	'validator_error_unknown_argument' => '$1 płaćiwy parameter njeje.',
	'validator_error_required_missing' => 'Trěbny parameter $1 njeje podaty.',
	'validator_error_empty_argument' => 'Parameter $1 njemóže prózdnu hódnotu měć.',
	'validator_error_must_be_number' => 'Parameter $1 móže jenož ličba być.',
	'validator_error_must_be_integer' => 'Parameter $1 móže jenož cyła ličba być.',
	'validator_error_invalid_range' => 'Parameter $1 dyrbi mjez $2 a $3 być.',
	'validator_error_invalid_argument' => 'Hódnota $1 njeje płaćiwa za parameter $2.',
	'validator_list_error_empty_argument' => 'Parameter $1 njeakceptuje prózdne hódnoty.',
	'validator_list_error_must_be_number' => 'Parameter $1 móže jenož ličby wobsahować.',
	'validator_list_error_must_be_integer' => 'Parameter $1 móže jenož cyłe ličby wobsahować.',
	'validator_list_error_invalid_range' => 'Wšě hódnoty parametra $1 dyrbja mjez $2 a $3 być.',
	'validator_list_error_invalid_argument' => 'Jedna hódnota abo wjace hódnotow za parameter $1 su njepłaćiwe.',
	'validator_list_omitted' => '{{PLURAL:$2|Hódnota|Hódnoće|Hódnoty|Hódnoty}} $1 {{PLURAL:$2|je so wuwostajiła|stej so wuwostajiłoj|su so wuwostajili|su so wuwostajili}}.',
	'validator_error_accepts_only' => 'Parameter $1 akceptuje jenož {{PLURAL:$3|tutu hódnotu|tutej hódnoće|tute hódnoty|tute hódnoty}}: $2.',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Glanthor Reviol
 */
$messages['hu'] = array(
	'validator-desc' => 'Az érvényesség-ellenőrző egyszerű lehetőséget nyújt más kiterjesztéseknek az elemzőfüggvények és tagek paramétereinek ellenőrzésére, alapértelmezett értékek beállítására, valamint hibaüzenetek generálására.',
	'validator_error_parameters' => 'A következő {{PLURAL:$1|hiba található|hibák találhatóak}} a szintaxisban:',
	'validator_warning_parameters' => '{{PLURAL:$1|Hiba van|Hibák vannak}} a szintaxisodban.',
	'validator_error_unknown_argument' => 'A(z) $1 nem érvényes paraméter.',
	'validator_error_required_missing' => 'A(z) $1 kötelező paraméter nem lett megadva.',
	'validator_error_empty_argument' => 'A(z) $1 paraméter értéke nem lehet üres.',
	'validator_error_must_be_number' => 'A(z) $1 paraméter csak szám lehet.',
	'validator_error_must_be_integer' => 'A(z) $1 paraméter csak egész szám lehet.',
	'validator_error_invalid_range' => 'A(z) $1 paraméter értékének $2 és $3 között kell lennie.',
	'validator_error_invalid_argument' => 'A(z) $1 érték nem érvényes a(z) $2 paraméterhez.',
	'validator_list_error_empty_argument' => 'A(z) $1 paraméter nem fogad el üres értékeket.',
	'validator_list_error_must_be_number' => 'A(z) $1 paraméter csak számokat tartalmazhat.',
	'validator_list_error_must_be_integer' => 'A(z) $1 paraméter csak egész számokat tartalmazhat.',
	'validator_list_error_invalid_range' => 'A(z) $1 paraméter összes értékének $2 és $3 közöttinek kell lennie.',
	'validator_list_error_invalid_argument' => 'A(z) $1 paraméter egy vagy több értéke érvénytelen.',
	'validator_list_omitted' => 'A(z) $1 {{PLURAL:$2|érték mellőzve lett.|értékek mellőzve lettek.}}',
	'validator_error_accepts_only' => 'A(z) $1 paraméter csak a következő {{PLURAL:$3|értéket|értékeket}} fogadja el: $2',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'validator-desc' => 'Validator provide un modo facile a altere extensiones de validar parametros de functiones del analysator syntactic e extensiones de etiquettas, predefinir valores e generar messages de error',
	'validator_error_parameters' => 'Le sequente {{PLURAL:$1|error|errores}} ha essite detegite in tu syntaxe:',
	'validator_warning_parameters' => 'Il ha {{PLURAL:$1|un error|errores}} in tu syntaxe.',
	'validator_error_unknown_argument' => '$1 non es un parametro valide.',
	'validator_error_required_missing' => 'Le parametro requisite $1 non ha essite fornite.',
	'validator-error-override-argument' => 'Tentava supplantar le parametro $1 (valor: $2) con le valor "$3"',
	'validator_error_empty_argument' => 'Le parametro $1 non pote haber un valor vacue.',
	'validator_error_must_be_number' => 'Le parametro $1 pote solmente esser un numero.',
	'validator_error_must_be_integer' => 'Le parametro $1 pote solmente esser un numero integre.',
	'validator_error_invalid_range' => 'Le parametro $1 debe esser inter $2 e $3.',
	'validator_error_invalid_argument' => 'Le valor $1 non es valide pro le parametro $2.',
	'validator_list_error_empty_argument' => 'Le parametro $1 non accepta valores vacue.',
	'validator_list_error_must_be_number' => 'Le parametro $1 pote solmente continer numeros.',
	'validator_list_error_must_be_integer' => 'Le parametro $1 pote solmente continer numeros integre.',
	'validator_list_error_invalid_range' => 'Tote le valores del parametro $1 debe esser inter $2 e $3.',
	'validator_list_error_invalid_argument' => 'Un o plus valores pro le parametro $1 es invalide.',
	'validator_list_omitted' => 'Le {{PLURAL:$2|valor|valores}} $1 ha essite omittite.',
	'validator_error_accepts_only' => 'Le valor "$4" non es valide pro le parametro $1. Illo accepta solmente iste {{PLURAL:$3|valor|valores}}: $2.',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 * @author Farras
 * @author Irwangatot
 * @author IvanLanin
 */
$messages['id'] = array(
	'validator-desc' => 'Validator memberikan cara mudah untuk ekstensi lain untuk memvalidasi parameter ParserFunction dan ekstensi tag, mengatur nilai biasa dan membuat pesan kesalahan',
	'validator_error_parameters' => '{{PLURAL:$1|Kesalahan|Kesalahan}} berikut telah terdeteksi pada sintaksis Anda:',
	'validator_warning_parameters' => '{{PLURAL:$1|kesalahan|kesalahan}} ini  pada sintaks anda.',
	'validator_error_unknown_argument' => '$1 bukan parameter yang benar.',
	'validator_error_required_missing' => 'Parameter $1 yang diperlukan tidak diberikan.',
	'validator_error_empty_argument' => 'Parameter $1 tidak dapat bernilai kosong.',
	'validator_error_must_be_number' => 'Parameter $1 hanya dapat berupa angka.',
	'validator_error_must_be_integer' => 'Parameter $1 hanya dapat berupa integer.',
	'validator_error_invalid_range' => 'Parameter $1 harus antara $2 dan $3.',
	'validator_error_invalid_argument' => 'Nilai $1 tidak valid untuk parameter $2.',
	'validator_list_error_empty_argument' => 'Parameter $1 tidak menerima nilai kosong.',
	'validator_list_error_must_be_number' => 'Parameter $1 hanya dapat berisi angka.',
	'validator_list_error_must_be_integer' => 'Parameter $1 hanya dapat berisi bilangan bulat.',
	'validator_list_error_invalid_range' => 'Semua nilai parameter $1 harus antara $2 dan $3.',
	'validator_list_error_invalid_argument' => 'Satu nilai atau lebih untuk parameter $1 tidak sah.',
	'validator_list_omitted' => '{{PLURAL:$2|Nilai|Nilai}} $1 {{PLURAL:$2|telah|telah}} dihapus.',
	'validator_error_accepts_only' => 'Parameter $1 hanya menerima {{PLURAL:$3|nilai ini|nilai ini}}: $2.',
);

/** Italian (Italiano)
 * @author Civvì
 * @author HalphaZ
 */
$messages['it'] = array(
	'validator-desc' => 'Validator fornisce ad altre estensiono un modo semplice per la convalida dei parametri delle funzioni parser e dei tag introdotti, per impostare i valori di default e per generare messaggi di errore.',
	'validator_error_parameters' => 'Nella tua sintassi {{PLURAL:$1|è stato individuato il seguente errore|sono stati individuati i seguenti errori}}:',
	'validator_warning_parameters' => "Nella tua sintassi {{PLURAL:$1|c'è un errore|ci sono errori}}.",
	'validator_error_unknown_argument' => '$1 non è un parametro valido.',
	'validator_error_required_missing' => 'Il parametro richiesto $1 non è stato fornito.',
	'validator_error_empty_argument' => 'Il parametro $1 non può avere un valore vuoto.',
	'validator_error_must_be_number' => 'Il parametro $1 può essere solo un numero.',
	'validator_error_must_be_integer' => 'Il parametro $1 può essere solo un intero.',
	'validator_error_invalid_range' => 'Il parametro $1 deve essere compreso tra $2 e $3.',
	'validator_error_invalid_argument' => 'Il valore $1 non è valido per il parametro $2.',
	'validator_list_error_empty_argument' => 'Il parametro $1 non accetta valori vuoti.',
	'validator_list_error_must_be_number' => 'Il parametro $1 può contenere solo numeri.',
	'validator_list_error_must_be_integer' => 'Il parametro $1 può contenere solo numeri interi.',
	'validator_list_error_invalid_range' => 'Tutti i valori del parametro $1 devono essere compresi tra $2 e $3.',
	'validator_list_error_invalid_argument' => 'Uno o più valori del parametro $1 non sono validi.',
	'validator_list_omitted' => '{{PLURAL:$2|Il valore|I valori}} $1 {{PLURAL:$2|è stato omesso|sono stati omessi}}.',
	'validator_error_accepts_only' => 'Il parametro $1 accetta solo {{PLURAL:$3|questo valore|questi valori}}: $2.',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fryed-peach
 * @author Whym
 */
$messages['ja'] = array(
	'validator-desc' => '妥当性評価器は他の拡張機能にパーサー関数やタグ拡張の引数の妥当性を確認したり、規定値を設定したり、エラーメッセージを生成する手段を提供する',
	'validator_error_parameters' => 'あなたの入力から以下の{{PLURAL:$1|エラー|エラー}}が検出されました:',
	'validator_warning_parameters' => 'あなたの入力した構文には{{PLURAL:$1|エラー}}があります。',
	'validator_error_unknown_argument' => '$1 は有効な引数ではありません。',
	'validator_error_required_missing' => '必須の引数「$1」が入力されていません。',
	'validator_error_empty_argument' => '引数「$1」は空の値をとることができません。',
	'validator_error_must_be_number' => '引数「$1」は数値でなければなりません。',
	'validator_error_must_be_integer' => '引数「$1」は整数でなければなりません。',
	'validator_error_invalid_range' => '引数「$1」は $2 と $3 の間の値でなければなりません。',
	'validator_error_invalid_argument' => '値「$1」は引数「$2」として妥当ではありません。',
	'validator_list_error_empty_argument' => '引数「$1」は空の値をとりません。',
	'validator_list_error_must_be_number' => '引数「$1」は数値しかとることができません。',
	'validator_list_error_must_be_integer' => '引数「$1」は整数値しかとることができません。',
	'validator_list_error_invalid_range' => '引数「$1」の値はすべて $2 と $3 の間のものでなくてはなりません。',
	'validator_list_error_invalid_argument' => '引数「$1」の値に不正なものが1つ以上あります。',
	'validator_list_omitted' => '{{PLURAL:$2|値}} $1 は省かれました。',
	'validator_error_accepts_only' => '引数 $1 は次の{{PLURAL:$3|値}}以外を取ることはできません: $2',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'validator-desc' => '{{int:validator_name}} brängk eine eijfache Wääsch, der Parrammeetere fun Paaser-Fungkßjohne un Zohsatzprojramme ze prööve, Schtandatt-Wääte enzefööje, un Fähler ze mällde.',
	'validator_error_parameters' => '{{PLURAL:$1|Heh dä|Heh di|Keine}} Fähler {{PLURAL:$1|es|sin|es}} en Dinge Syntax opjevalle:',
	'validator_error_unknown_argument' => '„$1“ es keine jöltijje Parameeter.',
	'validator_error_required_missing' => 'Dä Parameeter $1 moß aanjejovve sin, un fählt.',
	'validator_error_empty_argument' => 'Dä Parameeter $1 kann keine Wäät met nix dren hann.',
	'validator_error_must_be_number' => 'Dä Parameeter $1 kann blohß en Zahl sin.',
	'validator_error_must_be_integer' => 'Dä Parrameeter $1 kann bloß en jannze Zahl sin.',
	'validator_error_invalid_range' => 'Dä Parameeter $1 moß zwesche $2 un $3 sin.',
	'validator_error_invalid_argument' => 'Däm Parameeter $2 singe Wäät es $1, dat es ävver doför nit jöltesch.',
	'validator_error_accepts_only' => 'Dä Parameeter $1 kann {{PLURAL:$3|bloß dä eine Wäät|bloß eine vun dä Wääte|keine Wäät}} han: $2',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Les Meloures
 * @author Robby
 */
$messages['lb'] = array(
	'validator-desc' => 'Validator erlaabt et op eng einfach Manéier fir Parametere vu Parser-Fonctiounen an Tag-Erweiderungen ze validéieren, fir Standard-Wäerter festzeleeën a fir Feeler-Messagen ze generéieren',
	'validator_error_parameters' => '{{PLURAL:$1|Dëse Feeler gouf|Dës Feeler goufen}} an Ärer Syntax fonnt:',
	'validator_warning_parameters' => 'Et {{PLURAL:$1|ass ee|si}} Feeler an Ärer Syntax.',
	'validator_error_unknown_argument' => '$1 ass kee valbele Parameter.',
	'validator_error_required_missing' => 'Den obligatoresche Parameter $1 war net derbäi.',
	'validator-error-override-argument' => 'huet versicht de Parameter $1 (Wäert: $2) mam Wäert "$3" z\'iwwerschreiwen',
	'validator_error_empty_argument' => 'De Parameter $1 ka keen eidele Wert hunn.',
	'validator_error_must_be_number' => 'De Parameter $1 ka just eng Zuel sinn',
	'validator_error_must_be_integer' => 'De Parameter $1 ka just eng ganz Zuel sinn.',
	'validator_error_invalid_range' => 'De Parameter $1 muss tëschent $2 an $3 leien.',
	'validator_error_invalid_argument' => 'De Wert $1 ass net valabel fir de Parameter $2.',
	'validator_list_error_empty_argument' => 'De Parameter $1 hëlt keng eidel Wäerter un.',
	'validator_list_error_must_be_number' => 'Am Parameter $1 kënnen nëmmen Zuelen dra sinn.',
	'validator_list_error_must_be_integer' => 'Am Parameter $1 kënnen nëmme ganz Zuele sinn.',
	'validator_list_error_invalid_range' => 'All Wäerter vum Parameter $1 mussen tëschent $2 an $3 leien.',
	'validator_list_error_invalid_argument' => 'Een oder méi Wäerter fir de Parameter $1 sinn net valabel.',
	'validator_list_omitted' => "{{PLURAL:$2|De Wäert|D'Wäerter}} $1 {{PLURAL:$2|gouf|goufe}} vergiess.",
	'validator_error_accepts_only' => 'De Wäert $4 ass net valabel fir de Parameter $1. En akzeptéiert just {{PLURAL:$3|dëse Wäert|dës Wäerter}}: $2',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 * @author McDutchie
 */
$messages['mk'] = array(
	'validator-desc' => 'Потврдувачот овозможува лесен начин другите додатоци да ги потврдат параметрите на парсерските функции и додатоците со ознаки, да поставаат основно зададени вредности и да создаваат пораки за грешки',
	'validator_error_parameters' => 'Во вашата синтакса {{PLURAL:$1|е откриена следнава грешка|се откриени следниве грешки}}:',
	'validator_warning_parameters' => 'Имате {{PLURAL:$1|грешка|грешки}} во синтаксата.',
	'validator_error_unknown_argument' => '$1 не е важечки параметар.',
	'validator_error_required_missing' => 'Бараниот параметар $1 не е наведен.',
	'validator-error-override-argument' => 'Се обидовте да презапишете врз параметарот $1 (вредност: $2) со вредност „$3“',
	'validator_error_empty_argument' => 'Параметарот $1 не може да има празна вредност.',
	'validator_error_must_be_number' => 'Параметарот $1 може да биде само број.',
	'validator_error_must_be_integer' => 'Параметарот $1 може да биде само цел број.',
	'validator_error_invalid_range' => 'Параметарот $1 мора да изнесува помеѓу $2 и $3.',
	'validator_error_invalid_argument' => 'Вредноста $1 е неважечка за параметарот $2.',
	'validator_list_error_empty_argument' => 'Параметарот $1 не прифаќа празни вредности.',
	'validator_list_error_must_be_number' => 'Параметарот $1 може да содржи само бројки.',
	'validator_list_error_must_be_integer' => 'Параметарот $1 може да содржи само цели броеви.',
	'validator_list_error_invalid_range' => 'Сите вредности на параметарот $1 мора да бидат помеѓу $2 и $3.',
	'validator_list_error_invalid_argument' => 'Една или повеќе вредности на параметарот $1 се неважечки.',
	'validator_list_omitted' => '{{PLURAL:$2|Вредноста|Вредностите}} $1 {{PLURAL:$2|беше испуштена|беа испуштени}}.',
	'validator_error_accepts_only' => 'Вредноста „$4“ е неважечка за параметарот $1. Се {{PLURAL:$3|прифаќа само следнава вредност|прифаќаат само следниве вредности}}: $2.',
);

/** Dutch (Nederlands)
 * @author Jeroen De Dauw
 * @author Siebrand
 */
$messages['nl'] = array(
	'validator-desc' => 'Validator geeft andere uitbreidingen de mogelijkheid om parameters van parserfuncties en taguitbreidingen te valideren, in te stellen op hun standaardwaarden en foutberichten te genereren',
	'validator_error_parameters' => 'In uw syntaxis {{PLURAL:$1|is de volgende fout|zijn de volgende fouten}} gedetecteerd:',
	'validator_warning_parameters' => 'Er {{PLURAL:$1|zit een fout|zitten $1 fouten}} in uw syntaxis.',
	'validator_error_unknown_argument' => '$1 is geen geldige parameter.',
	'validator_error_required_missing' => 'De verplichte parameter $1 is niet opgegeven.',
	'validator-error-override-argument' => 'Geprobeerd de parameter $1 (waarde: $2) te overschrijven met waarde "$3".',
	'validator_error_empty_argument' => 'De parameter $1 mag niet leeg zijn.',
	'validator_error_must_be_number' => 'De parameter $1 mag alleen een getal zijn.',
	'validator_error_must_be_integer' => 'De parameter $1 kan alleen een heel getal zijn.',
	'validator_error_invalid_range' => 'De parameter $1 moet tussen $2 en $3 liggen.',
	'validator_error_invalid_argument' => 'De waarde $1 is niet geldig voor de parameter $2.',
	'validator_list_error_empty_argument' => 'Voor de parameter $1 zijn lege waarden niet toegestaan.',
	'validator_list_error_must_be_number' => 'Voor de parameter $1 zijn alleen getallen toegestaan.',
	'validator_list_error_must_be_integer' => 'Voor de parameter $1 zijn alleen hele getallen toegestaan.',
	'validator_list_error_invalid_range' => 'Alle waarden voor de parameter $1 moeten tussen $2 en $3 liggen.',
	'validator_list_error_invalid_argument' => 'Een of meerdere waarden voor de parameter $1 zijn ongeldig.',
	'validator_list_omitted' => 'De {{PLURAL:$2|waarde|waarden}} $1 {{PLURAL:$2|mist|missen}}.',
	'validator_error_accepts_only' => 'De waarde "$4" is ongeldig voor parameter $1. Deze kan alleen de volgende {{PLURAL:$3|waarde|waarden}} hebben: $2.',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'validator-desc' => 'Validering gir en enkel måte for utvidelser å validere parametere av parserfunksjoner og taggutvidelser, sette standardverdier og generere feilbeskjeder.',
	'validator_error_parameters' => 'Følgende {{PLURAL:$1|feil|feil}} har blitt oppdaget i syntaksen din:',
	'validator_warning_parameters' => 'Det er {{PLURAL:$1|én feil|flere feil}} i syntaksen din.',
	'validator_error_unknown_argument' => '$1 er ikke en gyldig parameter.',
	'validator_error_required_missing' => 'Den nødvendige parameteren $1 er ikke angitt.',
	'validator-error-override-argument' => 'Prøvde å overkjøre parameter $1 (verdi: $2) med verdien «$3»',
	'validator_error_empty_argument' => 'Parameteren $1 kan ikke ha en tom verdi.',
	'validator_error_must_be_number' => 'Parameter $1 må være et tall.',
	'validator_error_must_be_integer' => 'Parameteren $1 må være et heltall.',
	'validator_error_invalid_range' => 'Parameter $1 må være mellom $2 og $3.',
	'validator_error_invalid_argument' => 'Verdien $1 er ikke en gyldig parameter for $2.',
	'validator_list_error_empty_argument' => 'Parameteren $1 godtar ikke tomme verdier.',
	'validator_list_error_must_be_number' => 'Parameteren $1 kan bare inneholde tall.',
	'validator_list_error_must_be_integer' => 'Parameteren $1 kan bare inneholder heltall.',
	'validator_list_error_invalid_range' => 'Alle verdier av parameteren $1 må være mellom $2 og $3.',
	'validator_list_error_invalid_argument' => 'Parameteren $1 har en eller flere ugyldige verdier.',
	'validator_list_omitted' => '{{PLURAL:$2|Verdien|Verdiene}} $1 har blitt utelatt.',
	'validator_error_accepts_only' => 'Verdien «$4» er ikke gyldig for parameteren $1. Den aksepterer kun {{PLURAL:$3|denne verdien|disse verdiene}}: $2.',
);

/** Occitan (Occitan)
 * @author Cedric31
 * @author Jfblanc
 */
$messages['oc'] = array(
	'validator-desc' => "Validator porgís a d'autras extensions un biais per validar aisidament los paramètres de foncions d'analisi e las extensions de mercas, definir de valors per manca e crear de messatges d'error",
	'validator_error_parameters' => '{{PLURAL:$1|Aquela error es estada detectada|Aquelas errors son estadas detectadas}} dins la sintaxi',
	'validator_error_unknown_argument' => '$1 es pas un paramètre valedor.',
	'validator_error_required_missing' => "Manca lo paramètre $1 qu'es obligatòri.",
	'validator_error_empty_argument' => 'Lo paramètre $1 pòt pas estar voide.',
	'validator_error_must_be_number' => 'Lo paramètre $1 deu èsser un nombre.',
	'validator_error_must_be_integer' => 'Lo paramètre $1 deu èsser un nombre entièr.',
	'validator_error_invalid_range' => 'Lo paramètre $1 deu èsser entre $2 e $3.',
	'validator_error_invalid_argument' => '$1 es pas valedor pel paramètre $2.',
	'validator_error_accepts_only' => 'Sonque {{PLURAL:$3|aquela valor es valedora|aquelas valors son valedoras}}pel paramètre $1 : $2.',
);

/** Polish (Polski)
 * @author Fizykaa
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'validator-desc' => 'Dostarcza innym rozszerzeniom ogólną obsługę parametrów',
	'validator_error_parameters' => 'W Twoim kodzie {{PLURAL:$1|został wykryty następujący błąd|zostały wykryte następujące błędy}} składni:',
	'validator_warning_parameters' => 'W Twoim kodzie {{PLURAL:$1|wystąpił błąd|wystąpiły błędy}} składni.',
	'validator_error_unknown_argument' => '$1 jest niepoprawnym parametrem.',
	'validator_error_required_missing' => 'Obowiązkowy parametr $1 nie został przekazany.',
	'validator-error-override-argument' => 'Próba nadpisania parametru $1 o wartości „$2” nową wartością „$3”',
	'validator_error_empty_argument' => 'Parametr $1 nie może być pusty.',
	'validator_error_must_be_number' => 'Parametr $1 musi być liczbą.',
	'validator_error_must_be_integer' => 'Parametr $1 musi być liczbą całkowitą.',
	'validator_error_invalid_range' => 'Parametr $1 musi zawierać się w przedziale od $2 do $3.',
	'validator_error_invalid_argument' => 'Nieprawidłowa wartość $1 parametru $2.',
	'validator_list_error_empty_argument' => 'Parametr $1 nie może być pusty.',
	'validator_list_error_must_be_number' => 'Parametrem $1 mogą być wyłącznie liczby.',
	'validator_list_error_must_be_integer' => 'Parametrem $1 mogą być wyłącznie liczby całkowite.',
	'validator_list_error_invalid_range' => 'Wartości parametru $1 muszą zawierać się w przedziale od $2 do $3.',
	'validator_list_error_invalid_argument' => 'Przynajmniej jedna wartość parametru $1 jest nieprawidłowa.',
	'validator_list_omitted' => '{{PLURAL:$2|Parametr|Parametry}} $1 {{PLURAL:$2|został opuszczony|zostały opuszczone}}.',
	'validator_error_accepts_only' => 'Wartość „$4” jest nieprawidłowa dla parametru $1. {{PLURAL:$3|Dopuszczalna jest wyłącznie wartość|Dopuszczalne są wyłącznie wartości:}} $2.',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 * @author McDutchie
 */
$messages['pms'] = array(
	'validator-desc' => "Validator a dà na manera bel fé për àutre estension ëd validé ij paràmetr ëd le funsion dël parser e j'estension dij tag, d'amposté ij valor ëd default e generé mëssagi d'eror",
	'validator_error_parameters' => "{{PLURAL:$1|L'eror sì-sota a l'é stàit|J'eror sì-sota a son ëstàit}} trovà an soa sintassi:",
	'validator_warning_parameters' => "{{PLURAL:$1|A-i é n'|A-i son dj'}}eror ant soa sintassi.",
	'validator_error_unknown_argument' => "$1 a l'é un paràmetr pa bon.",
	'validator_error_required_missing' => "Ël paràmetr obligatòri $1 a l'é pa dàit.",
	'validator-error-override-argument' => 'Provà a coaté ël paràmetr $1 (valor: $2) con ël valor "$3"',
	'validator_error_empty_argument' => 'Ël paràmetr $1 a peul pa avèj un valor veuid.',
	'validator_error_must_be_number' => 'Ël paràmetr $1 a peul mach esse un nùmer.',
	'validator_error_must_be_integer' => "Ël paràmetr $1 a peul mach esse n'antregh.",
	'validator_error_invalid_range' => 'Ël paràmetr $1 a deuv esse an tra $2 e $3.',
	'validator_error_invalid_argument' => "Ël valor $1 a l'é pa bon për ël paràmetr $2.",
	'validator_list_error_empty_argument' => 'Ël paràmetr $1 a aceta pa dij valor veuid.',
	'validator_list_error_must_be_number' => 'Ël paràmetr $1 a peul mach conten-e dij nùmer.',
	'validator_list_error_must_be_integer' => "Ël paràmetr $1 a peul mach conten-e dj'antegr.",
	'validator_list_error_invalid_range' => 'Tùit ij valor dël paràmetr $1 a deuvo esse tra $2 e $3.',
	'validator_list_error_invalid_argument' => 'Un o pi valor dël paràmetr $1 a son pa bon.',
	'validator_list_omitted' => "{{PLURAL:$2|Ël valor|Ij valor}} $1 {{PLURAL:$2|a l'é|a son}} pa stàit butà.",
	'validator_error_accepts_only' => 'Ël valor "$4" a l\'é pa bon për ël paràmetr $1. A aceta mach {{PLURAL:$3|sto valor-sì|sti valor-sì}}: $2.',
);

/** Portuguese (Português)
 * @author Giro720
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'validator-desc' => 'O Serviço de Validação permite que, de forma simples, as outras extensões possam validar parâmetros das funções do analisador sintáctico e das extensões dos elementos HTML, definir valores por omissão e gerar mensagens de erro',
	'validator_error_parameters' => '{{PLURAL:$1|Foi detectado o seguinte erro sintáctico|Foram detectados os seguintes erros sintácticos}}:',
	'validator_warning_parameters' => '{{PLURAL:$1|Existe um erro sintáctico|Existem erros sintácticos}}.',
	'validator_error_unknown_argument' => '$1 não é um parâmetro válido.',
	'validator_error_required_missing' => 'O parâmetro obrigatório $1 não foi fornecido.',
	'validator-error-override-argument' => 'Tentativa de sobrepor o parâmetro $1 (valor: $2) com o valor "$3"',
	'validator_error_empty_argument' => 'O parâmetro $1 não pode estar vazio.',
	'validator_error_must_be_number' => 'O parâmetro $1 só pode ser numérico.',
	'validator_error_must_be_integer' => 'O parâmetro $1 só pode ser um número inteiro.',
	'validator_error_invalid_range' => 'O parâmetro $1 tem de ser entre $2 e $3.',
	'validator_error_invalid_argument' => 'O valor $1 não é válido para o parâmetro $2.',
	'validator_list_error_empty_argument' => 'O parâmetro $1 não pode estar vazio.',
	'validator_list_error_must_be_number' => 'O parâmetro $1 só pode ser numérico.',
	'validator_list_error_must_be_integer' => 'O parâmetro $1 só pode ser um número inteiro.',
	'validator_list_error_invalid_range' => 'Todos os valores do parâmetro $1 têm de ser entre $2 e $3.',
	'validator_list_error_invalid_argument' => 'Um ou mais valores do parâmetro $1 são inválidos.',
	'validator_list_omitted' => '{{PLURAL:$2|O valor $1 foi omitido|Os valores $1 foram omitidos}}.',
	'validator_error_accepts_only' => 'O valor "$4" não é válido para o parâmetro $1. O parâmetro só aceita {{PLURAL:$3|este valor|estes valores}}: $2.',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Giro720
 * @author Luckas Blade
 */
$messages['pt-br'] = array(
	'validator-desc' => 'Fornece suporte a manipulação de parâmetros genéricos para outras extensões',
	'validator_error_parameters' => '{{PLURAL:$1|Foi detectado o seguinte erro sintáctico|Foram detectados os seguintes erros sintácticos}}:',
	'validator_warning_parameters' => '{{PLURAL:$1|Existe um erro|Existem erros}} em sua sintaxe.',
	'validator_error_unknown_argument' => '$1 não é um parâmetro válido.',
	'validator_error_required_missing' => 'O parâmetro obrigatório $1 não foi fornecido.',
	'validator-error-override-argument' => 'Tentativa de sobrepor o parâmetro $1 (valor: $2) com o valor "$3"',
	'validator_error_empty_argument' => 'O parâmetro $1 não pode estar vazio.',
	'validator_error_must_be_number' => 'O parâmetro $1 só pode ser numérico.',
	'validator_error_must_be_integer' => 'O parâmetro $1 só pode ser um número inteiro.',
	'validator_error_invalid_range' => 'O parâmetro $1 tem de ser entre $2 e $3.',
	'validator_error_invalid_argument' => 'O valor $1 não é válido para o parâmetro $2.',
	'validator_list_error_empty_argument' => 'O parâmetro $1 não pode estar vazio.',
	'validator_list_error_must_be_number' => 'O parâmetro $1 só pode ser numérico.',
	'validator_list_error_must_be_integer' => 'O parâmetro $1 só pode ser um número inteiro.',
	'validator_list_error_invalid_range' => 'Todos os valores do parâmetro $1 têm de ser entre $2 e $3.',
	'validator_list_error_invalid_argument' => 'Um ou mais valores do parâmetro $1 são inválidos.',
	'validator_list_omitted' => '{{PLURAL:$2|O valor $1 foi omitido|Os valores $1 foram omitidos}}.',
	'validator_error_accepts_only' => 'O valor $4 não é válido para o parâmetro $1. Esse parâmetro só aceita {{PLURAL:$3|este valor|estes valores}}: $2.',
);

/** Russian (Русский)
 * @author Aleksandrit
 * @author Eleferen
 * @author Lockal
 * @author McDutchie
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'validator-desc' => 'Валидатор предоставляет другим расширениям возможности проверки параметров функций парсера и тегов, установки значения по умолчанию и создания сообщения об ошибках',
	'validator_error_parameters' => 'В вашем синтаксисе {{PLURAL:$1|обнаружена следующая ошибка|обнаружены следующие ошибки}}:',
	'validator_warning_parameters' => 'В вашем синтаксисе {{PLURAL:$1|имеется ошибка|имеются ошибки}}.',
	'validator_error_unknown_argument' => '$1 не является допустимым параметром.',
	'validator_error_required_missing' => 'Не указан обязательный параметр $1.',
	'validator-error-override-argument' => 'Попытка переопределения параметра $1 (значение: $2) значением «$3»',
	'validator_error_empty_argument' => 'Параметр $1 не может принимать пустое значение.',
	'validator_error_must_be_number' => 'Значением параметра $1 могут быть только числа.',
	'validator_error_must_be_integer' => 'Параметр $1 может быть только целым числом.',
	'validator_error_invalid_range' => 'Параметр $1 должен быть от $2 до $3.',
	'validator_error_invalid_argument' => 'Значение $1 не является допустимым параметром $2',
	'validator_list_error_empty_argument' => 'Параметр $1 не может принимать пустые значения.',
	'validator_list_error_must_be_number' => 'Параметр $1 может содержать только цифры.',
	'validator_list_error_must_be_integer' => 'Параметр $1 может содержать только целые числа.',
	'validator_list_error_invalid_range' => 'Все значения параметра $1 должна находиться в диапазоне от $2 до $3.',
	'validator_list_error_invalid_argument' => 'Одно или несколько значений параметра $1 ошибочны.',
	'validator_list_omitted' => '{{PLURAL:$2|Значение $1 было пропущено|Значения $1 были пропущены}}.',
	'validator_error_accepts_only' => 'Значение «$4» не подходит для параметра $1. Оно может принимать только {{PLURAL:$3|следующее значение|следующие значения}}: $2.',
);

/** Sinhala (සිංහල)
 * @author Calcey
 */
$messages['si'] = array(
	'validator-desc' => 'තහවුරු කරන්නා ටැග් දිඟුවන් හා parser ශ්‍රිතවල පරාමිතීන් තහවුරු කිරීමට අනෙක් දිඟුවන් සඳහා පහසු ක්‍රමයක් සපයයි,පෙරනිමි අගයන් පිහිටුවීම හා දෝෂ පණිවුඩ ජනනය කිරීම ද සිදු කරයි',
	'validator_error_parameters' => 'ඔබේ වාග් රීතිය මඟින් පහත {{PLURAL:$1|දෝෂය|දෝෂයන්}} අනාවරණය කරනු ලැබ ඇත',
	'validator_error_unknown_argument' => '$1 වලංගු පරාමිතියක් නොවේ.',
	'validator_error_required_missing' => 'අවශ්‍ය වන $1 පරාමිතිය සපයා නොමැත.',
	'validator_error_empty_argument' => '$1 පරාමිතියට හිස් අගයක් තිබිය නොහැක.',
	'validator_error_must_be_number' => '$1 පරාමිතිය විය හැක්කේ ඉලක්කමක් පමණි.',
	'validator_error_invalid_range' => '$1 පරාමිතිය $2 හා $3 අතර විය යුතුය.',
	'validator_error_invalid_argument' => '$2 පරාමිතිය සඳහා $1 අගය වලංගු නොවේ.',
	'validator_error_accepts_only' => '$1 පරාමිතිය විසින් පිළිගනු ලබන්නේ {{PLURAL:$3|මෙම අගය|මෙම අගයන්}}: $2 පමණි.',
);

/** Swedish (Svenska)
 * @author Fluff
 * @author Ozp
 * @author Per
 * @author Sertion
 */
$messages['sv'] = array(
	'validator-desc' => 'Valideraren skapar ett smidigt sätt för andra tillägg att validera olika parserfunktioners parametrar och taggar, sätta standardvärden för tilläggen samt att generera felmeddelanden',
	'validator_error_parameters' => 'Följande {{PLURAL:$1|fel|fel}} har upptäckts i din syntax:',
	'validator_warning_parameters' => 'Det finns {{PLURAL:$1|ett|flera}} fel i din syntax.',
	'validator_error_unknown_argument' => '$1 är inte en giltig paramter.',
	'validator_error_required_missing' => 'Den nödvändiga parametern $1 har inte angivits.',
	'validator_error_empty_argument' => 'Parametern $1 kan inte lämnas tom.',
	'validator_error_must_be_number' => 'Parameter $1 måste bestå av ett tal.',
	'validator_error_must_be_integer' => 'Parametern $1 måste vara ett heltal.',
	'validator_error_invalid_range' => 'Parameter $1 måste vara i mellan $2 och $3.',
	'validator_error_invalid_argument' => 'Värdet $1 är inte giltigt som parameter $2.',
	'validator_list_error_empty_argument' => 'Parameter $1 accepterar inte tomma värden.',
	'validator_list_error_must_be_number' => 'Parameter $1 får endast innehålla siffror.',
	'validator_list_error_must_be_integer' => 'Parameter $1 får endast innehålla heltal.',
	'validator_list_error_invalid_range' => 'Alla värden av parameter $1 måste vara mellan $2 och $3.',
	'validator_list_error_invalid_argument' => 'Ett eller flera värden av parameter $1 är ogiltiga.',
	'validator_list_omitted' => '{{PLURAL:$2|Värdet|Värdena}} $1 har blivit {{PLURAL:$2|utelämnat|utelämnade}}.',
	'validator_error_accepts_only' => 'Parametern $1 måste ha {{PLURAL:$3|detta värde|ett av dessa värden}}: $2.',
);

/** Telugu (తెలుగు)
 * @author Ravichandra
 */
$messages['te'] = array(
	'validator_error_unknown_argument' => '$1 అనేది సరైన పరామితి కాదు.',
	'validator_error_required_missing' => 'తప్పకుండా కావాల్సిన $1 పరామితిని ఇవ్వలేదు.',
	'validator_error_empty_argument' => '$1 పరామితి ఖాళీగా ఉండకూడదు',
	'validator_error_must_be_number' => '$1 పరామితి ఖచ్చితంగా ఓ సంఖ్య అయిఉండాలి',
	'validator_error_must_be_integer' => '$1 పరామితి ఒక పూర్ణసంఖ్య అయిఉండాలి',
	'validator_error_invalid_range' => '$1 పరామితి $2,  $3 మద్యలో ఉండాలి.',
	'validator_error_invalid_argument' => '$2 పరామితి కోసం $1 విలువ సరైంది కాదు',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'validator-desc' => 'Nagbibigay ng panlahatang magtangkilik na paghawak sa ibang mga dugtong',
	'validator_error_parameters' => 'Ang sumusunod na {{PLURAL:$1|kamalian|mga kamalian}} ay napansin sa iyong sintaks:',
	'validator_warning_parameters' => 'May {{PLURAL:$1|mali|mga mali}} sa sintaks mo.',
	'validator_error_unknown_argument' => 'Ang $1 ay isang hindi tanggap na parametro.',
	'validator_error_required_missing' => 'Hindi ibinigay ang kailangang parametro na $1.',
	'validator_error_empty_argument' => 'Hindi dapat na isang halagang walang laman ang parametrong $1.',
	'validator_error_must_be_number' => 'Dapat na bilang lang ang parametrong $1.',
	'validator_error_must_be_integer' => 'Dapat na tambilang lang ang parametrong $1.',
	'validator_error_invalid_range' => 'Dapat na nasa pagitan ng $2 at $3 ang parametrong $1.',
	'validator_error_invalid_argument' => 'Ang halagang $1 ay hindi tanggap para sa parametrong $2.',
	'validator_list_error_empty_argument' => 'Hindi tumatanggap ng halagang walang laman ang parametrong $1.',
	'validator_list_error_must_be_number' => 'Dapat na naglalaman lang ng mga bilang ang parametrong $1.',
	'validator_list_error_must_be_integer' => 'Dapat na naglalaman lang ng mga tambilang ang parametrong $1.',
	'validator_list_error_invalid_range' => 'Dapat na nasa pagitan ng $2 at $3 ang lahat ng mga halaga ng parametrong $1.',
	'validator_list_error_invalid_argument' => 'Hindi tanggap ang isa o higit pang mga halaga para sa parametrong $1.',
	'validator_list_omitted' => 'Tinanggal {{PLURAL:$2|na ang|na ang mga}} {{PLURAL:$2|halaga|halaga}} ng $1.',
	'validator_error_accepts_only' => 'Tumatanggap lang ang parametrong $1 ng {{PLURAL:$3|ganitong halaga|ganitong mga halaga}}: $2.',
);

/** Turkish (Türkçe)
 * @author Vito Genovese
 */
$messages['tr'] = array(
	'validator_error_unknown_argument' => '$1, geçerli bir parametre değildir.',
	'validator_error_empty_argument' => '$1 parametresi boş bir değere sahip olamaz.',
	'validator_error_must_be_number' => '$1 parametresi sadece sayı olabilir.',
	'validator_error_must_be_integer' => '$1 parametresi sadece bir tamsayı olabilir',
	'validator_list_error_empty_argument' => '$1 parametresi boş değerleri kabul etmemektedir.',
	'validator_list_error_must_be_number' => '$1 parametresi sadece sayı içerebilir.',
);

/** Ukrainian (Українська)
 * @author NickK
 * @author Prima klasy4na
 */
$messages['uk'] = array(
	'validator-desc' => 'Валідатор забезпечує іншим розширенням можливості перевірки параметрів функцій парсера і тегів, встановлення значень за умовчанням та створення повідомлень про помилки',
	'validator_error_parameters' => 'У вашому синтаксисі {{PLURAL:$1|виявлена така помилка|виявлені такі помилки}}:',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'validator-desc' => 'Bộ phê chuẩn cho phép các phần mở rộng khác phê chuẩn tham số của hàm cú pháp và thẻ mở rộng, đặt giá trị mặc định, và báo cáo lỗi.',
	'validator_error_parameters' => '{{PLURAL:$1|Lỗi|Các lỗi}} cú pháp sau được nhận ra trong mã của bạn:',
	'validator_warning_parameters' => 'Có {{PLURAL:$1|lỗi|lỗi}} cú pháp trong mã của bạn.',
	'validator_error_unknown_argument' => '$1 không phải là tham số hợp lệ.',
	'validator_error_required_missing' => 'Không định rõ tham số bắt buộc “$1”.',
	'validator_error_empty_argument' => 'Tham số “$1” không được để trống.',
	'validator_error_must_be_number' => 'Tham số “$1” phải là con số.',
	'validator_error_must_be_integer' => 'Tham số “$1” phải là số nguyên.',
	'validator_error_invalid_range' => 'Tham số “$1” phải nằm giữa $2 và $3.',
	'validator_error_invalid_argument' => 'Giá trị “$1” không hợp tham số “$2”.',
	'validator_list_error_empty_argument' => 'Không được để trống tham số “$1”.',
	'validator_list_error_must_be_number' => 'Tham số “$1” chỉ được phép bao gồm con số.',
	'validator_list_error_must_be_integer' => 'Tham số “$1” chỉ được phép bao gồm số nguyên.',
	'validator_list_error_invalid_range' => 'Tất cả các giá trị của tham số “$1” phải nằm giữa $2 và $3.',
	'validator_list_error_invalid_argument' => 'Ít nhất một giá trị của tham số “$1” không hợp lệ.',
	'validator_list_omitted' => '{{PLURAL:$2|Giá trị|Các giá trị}} “$1” bị bỏ qua.',
	'validator_error_accepts_only' => 'Tham số $1 chỉ nhận được {{PLURAL:$3|giá trị|các giá trị}} này: $2.',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Wilsonmess
 */
$messages['zh-hans'] = array(
	'validator_error_unknown_argument' => '$1 不是合法参数。',
	'validator_error_required_missing' => '未能提供所需要的参数 $1 。',
	'validator_error_empty_argument' => '参数 $1 不能为空。',
	'validator_error_must_be_number' => '参数 $1 只能为数字。',
	'validator_error_must_be_integer' => '参数 $1 只能为整数。',
	'validator_error_invalid_range' => '参数 $1 的范围必须介于 $2 与 $3 之间。',
	'validator_error_invalid_argument' => '值 $1 对于参数 $2 不合法。',
	'validator_list_error_empty_argument' => '参数 $1 不接受空值。',
	'validator_list_error_must_be_number' => '参数 $1 只能包含数字。',
	'validator_list_error_must_be_integer' => '参数 $1 只能包含整数。',
	'validator_list_error_invalid_range' => '参数 $1 所有合法的值都必须介于 $2 与 $3 之间。',
	'validator_list_error_invalid_argument' => '参数 $1 的一个或多个值不合法。',
);

