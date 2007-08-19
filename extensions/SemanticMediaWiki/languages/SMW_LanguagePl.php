<?php
/**
 * @author Łukasz Bolikowski
 * @version 0.2
 */

/*
 * To further translators: some key terms appear * in multiple strings.
 * If you wish to change them, please be consistent.  The following
 * translations are currently used:
 *   relation = relacja
 *   attribute = atrybut
 *   property = własność
 *   subject article = artykuł podmiotowy
 *   object article = artykuł przedmiotowy
 *   statement = zdanie
 *   conversion = konwersja
 *   search (n) = szukanie
 *   sorry, oops ~ niestety, ojej
 * These ones may need to be refined:
 *   to support = wspierać
 *   on this site = w tym miejscu
 */

global $smwgIP;
include_once($smwgIP . '/languages/SMW_Language.php');

class SMW_LanguagePl extends SMW_Language {

protected $smwContentMessages = array(
	'smw_edithelp' => 'Pomoc edycyjna odnośnie relacji i atrybutów',
	'smw_helppage' => 'Relacja',
	'smw_viewasrdf' => 'RDF feed', //TODO: translate?
	'smw_finallistconjunct' => ' i', //used in "A, B, and C"
	'smw_factbox_head' => 'Fakty o $1 &mdash; Kliknij <span class="smwsearchicon">+</span> aby znaleźć podobne strony.',
	'smw_spec_head' => 'Własności specjalne',
	/*URIs that should not be used in objects in cases where users can provide URIs */
	'smw_uri_blacklist' => " http://www.w3.org/1999/02/22-rdf-syntax-ns#\n http://www.w3.org/2000/01/rdf-schema#\n http://www.w3.org/2002/07/owl#",
	'smw_baduri' => 'Niestety, URI z przestrzeni "$1" nie są w tym miejscu dostępne.',
	/*Messages and strings for inline queries*/
	'smw_iq_disabled' => "<span class='smwwarning'>Niestety, w tym wiki wyłączono możliwość tworzenia zapytań w artykułach.</span>",
	'smw_iq_moreresults' => '&hellip; dalsze wyniki',
	'smw_iq_nojs' => 'Aby obejrzeć ten element, włącz w przeglądarce obsługę JavaScript, lub <a href="$1">przeglądaj listę wyników</a> bezpośrednio.',
	/*Messages and strings for ontology resued (import) */
	'smw_unknown_importns' => 'Nie ma możliwości importu z przestrzeni nazw "$1".',
	'smw_nonright_importtype' => '$1 może być użyte tylko dla artykułów z przestrzeni nazw "$2".',
	'smw_wrong_importtype' => '$1 nie może być użyte dla artykułów z przestrzeni nazw "$2".',
	'smw_no_importelement' => 'Nie można zaimportować elementu "$1".',
	/*Messages and strings for basic datatype processing*/
	'smw_decseparator' => ',',
	'smw_kiloseparator' => '.',
	'smw_unknowntype' => '"$1" jako typ atrybutu nie jest wspierany.',
	'smw_manytypes' => 'Zdefiniowano więcej niż jeden typ dla atrybutu.',
	'smw_emptystring' => 'Puste łańcuchy znakowe są niedozwolone.',
	'smw_maxstring' => 'Reprezentacja znakowa $1 jest za długa jak na to miejsce.',
	'smw_nopossiblevalues' => 'Dozwolone wartości dla tego atrybutu nie zostały wyliczone.',
	'smw_notinenum' => '“$1” nie jest na liście dozwolonych wartości ($2) dla tego atrybutu.',
	'smw_noboolean' => '“$1” nie zostało rozpoznane jako wartość logiczna (prawda/fałsz).',
	'smw_true_words' => 't,yes,y,tak,prawda',	// comma-separated synonyms for boolean TRUE besides 'true' and '1'
	'smw_false_words' => 'f,no,n,nie,fałsz',	// comma-separated synonyms for boolean FALSE besides 'false' and '0'
	'smw_nointeger' => '"$1" nie jest liczbą całkowitą.',
	'smw_nofloat' => '"$1" nie jest liczbą zmiennoprzecinkową.',
	'smw_infinite' => 'Liczby tak duże jak $1 nie są w tym miejscu wspierane.',
	'smw_infinite_unit' => 'Konwersja do jednostki $1 zwróciła liczbę, która jest za duża jak na to miejsce.',
	// Currently unused, floats silently store units.  'smw_unexpectedunit' => 'ten atrybut nie wspiera konwersji jednostek',
	'smw_unsupportedprefix' => 'Przedrostki dla liczb (“$1”) nie są obecnie wspierane.',
	'smw_unsupportedunit' => 'Konwersja dla jednostki "$1" nie jest wspierana.',
	/*Messages for geo coordinates parsing*/
	'smw_err_latitude' => 'Wartości dla szerokości geograficznej (N, S) muszą być w zakresie od 0 do 90. "$1" nie spełnia tego warunku!',
	'smw_err_longitude' => 'Wartości dla długości geograficznej (E, W) muszą być w zakresie od 0 do 180. "$1" nie spełnia tego warunku!',
	'smw_err_noDirection' => 'Coś jest nie tak z podaną wartością "$1".',
	'smw_err_parsingLatLong' => 'Coś jest nie tak z podaną wartością "$1". W tym miejscu oczekujemy wartości w rodzaju "1°2′3.4′′ W"!',
	'smw_err_wrongSyntax' => 'Coś jest nie tak z podaną wartością "$1". W tym miejscu oczekujemy wartości w rodzaju "1°2′3.4′′ W, 5°6′7.8′′ N"!',
	'smw_err_sepSyntax' => 'Podana wartość "$1" wydaje się być poprawna, ale wartości dla długości i szerokości geograficznej powinny być oddzielone przy pomocy "," lub ";".',
	'smw_err_notBothGiven' => 'Musisz podać prawidłowe wartości zarówno dla długości (E, W) jak i szerokości (N, S)! Brakuje co najmniej jednej z nich!',
	/* additionals ... */
	'smw_label_latitude' => 'Długość:',
	'smw_label_longitude' => 'Szerokość:',
	'smw_abb_north' => 'N',
	'smw_abb_east' => 'E',
	'smw_abb_south' => 'S',
	'smw_abb_west' => 'W',
	/* some links for online maps; can be translated to different language versions of services, but need not*/
	// TODO: translate "find maps" below (translation of "maps" would also do)
	'smw_service_online_maps' => " find&nbsp;maps|http://tools.wikimedia.de/~magnus/geo/geohack.php?language=pl&params=\$9_\$7_\$10_\$8\n Google&nbsp;maps|http://maps.google.com/maps?ll=\$11\$9,\$12\$10&spn=0.1,0.1&t=k\n Mapquest|http://www.mapquest.com/maps/map.adp?searchtype=address&formtype=latlong&latlongtype=degrees&latdeg=\$11\$1&latmin=\$3&latsec=\$5&longdeg=\$12\$2&longmin=\$4&longsec=\$6&zoom=6",
	/*Messages for datetime parsing */
	'smw_nodatetime' => 'Data "$1" nie została zrozumiana. Wsparcie dla dat jest jednak wciąż w fazie eksperymentalnej.',
	// Errors and notices related to queries // TODO: translate
	'smw_toomanyclosing' => 'There appear to be too many occurrences of “$1” in the query.',
	'smw_noclosingbrackets' => 'Some use of “[&#x005B;” in your query was not closed by a matching “]]”.',
	'smw_misplacedsymbol' => 'The symbol “$1” was used in a place where it is not useful.',
	'smw_unexpectedpart' => 'The part “$1” of the query was not understood. Results might not be as expected.',
	'smw_emtpysubquery' => 'Some subquery has no valid condition.',
	'smw_misplacedsubquery' => 'Some subquery was used in a place where no subqueries are allowed.',
	'smw_valuesubquery' => 'Subqueries not supported for values of property “$1”.',
	'smw_overprintoutlimit' => 'The query contains too many printout requests.',
	'smw_badprintout' => 'Some print statement in the query was misshaped.',
	'smw_badtitle' => 'Sorry, but “$1” is no valid page title.',
	'smw_badqueryatom' => 'Some part “[#x005B;&hellip]]” of the query was not understood.',
	'smw_propvalueproblem' => 'The value of property “$1” was not understood.',
	'smw_nodisjunctions' => 'Disjunctions in queries are not supported in this wiki and part of the query was dropped ($1).',
	'smw_querytoolarge' => 'The following query conditions could not be considered due to the wikis restrictions in query size or depth: $1.'
);


protected $smwUserMessages = array(
	'smw_devel_warning' => 'Ta opcja jest obecnie w fazie rozwoju, może nie być w pełni funkcjonalna. Przed użyciem zabezpiecz swoje dane.',
	// Messages for article pages of types, relations, and attributes
	'smw_type_header' => 'Atrybuty typu “$1”',
	'smw_typearticlecount' => 'Pokazano $1 atrybutów używających tego typu.',
	'smw_attribute_header' => 'Strony używające atrybutu “$1”',
	'smw_attributearticlecount' => '<p>Pokazano $1 stron używających tego atrybutu.</p>',
	/*Messages for Export RDF Special*/
	'exportrdf' => 'Eksport stron do RDF', //name of this special
	'smw_exportrdf_docu' => '<p>Ta strona pozwala eksportować fragmenty artykułu w formacie RDF.  Aby wyeksportować artykuły, wpisz ich tytuły w poniższym polu tekstowym, po jednym tytule w wierszu.</p>',
	'smw_exportrdf_recursive' => 'Rekursywny eksport wszystkich powiązanych stron.  Zwróć uwagę, że wynik może być olbrzymi!',
	'smw_exportrdf_backlinks' => 'Eksportuj także wszystkie strony, które odwołują się do eksportowanych stron.  Tworzy przeglądalny RDF.',
	'smw_exportrdf_lastdate' => 'Do not export pages that were not changed since the given point in time.', // TODO: translate
	// Messages for Properties Special
	'properties' => 'Properties', //TODO: translate
	'smw_properties_docu' => 'The following properties are used in the wiki.', //TODO: translate
	'smw_property_template' => '$1 of type $2 ($3)', // <propname> of type <type> (<count>) //TODO: translate
	'smw_propertylackspage' => 'All properties should be described by a page!', //TODO: translate
	'smw_propertylackstype' => 'No type was specified for this property (assuming type $1 for now).', //TODO: translate
	'smw_propertyhardlyused' => 'This property is hardly used within the wiki!', //TODO: translate
	// Messages for Unused Properties Special
	'unusedproperties' => 'Unused Properties', //TODO: translate
	'smw_unusedproperties_docu' => 'The following properties exist although no other page makes use of them.', //TODO: translate
	'smw_unusedproperty_template' => '$1 of type $2', // <propname> of type <type> //TODO: translate
	// Messages for Wanted Properties Special
	'wantedproperties' => 'Wanted Properties', //TODO: translate
	'smw_wantedproperties_docu' => 'The following properties are used in the wiki but do not yet have a page for describing them.', //TODO: translate
	'smw_wantedproperty_template' => '$1 ($2 uses)', // <propname> (<count> uses) //TODO: translate
//// Note to translators:
//// The following messages in comments were kept for reference to facilitate the translation of the property messages above.
//// Delete them when no longer needed.
// 	/*Messages for Relations Special*/
// 	'relations' => 'Relacje',
// 	'smw_relations_docu' => 'W wiki istnieją następujące relacje.',
// 	// Messages for WantedRelations Special
// 	'wantedrelations' => 'Potrzebne relacje',
// 	'smw_wanted_relations' => 'Następujące relacje nie mają jeszcze strony objaśniającej, choć są już używane do opisu innych stron.',
// 	/*Messages for Attributes Special*/
// 	'attributes' => 'Atrybuty',
// 	'smw_attributes_docu' => 'W wiki istnieją następujące atrybuty.',
// 	'smw_attr_type_join' => ' z $1',
// 	/*Messages for Unused Relations Special*/
// 	'unusedrelations' => 'Nieużywane relacje',
// 	'smw_unusedrelations_docu' => 'Następujące relacje posiadają własne strony, choć Żadna inna strona z nich nie korzysta.',
// 	/*Messages for Unused Attributes Special*/
// 	'unusedattributes' => 'Nieużywane atrybuty',
// 	'smw_unusedattributes_docu' => 'Następujące atrybuty posiadają własne strony, choć żadna inna strona z nich nie korzysta.',
	/* Messages for the refresh button */
	'tooltip-purge' => 'Kliknij tutaj, aby odświeżyć wszystkie zapytania i szablony na tej stronie',
	'purge' => 'Odśwież',
	/*Messages for Import Ontology Special*/
	'ontologyimport' => 'Importuj ontologię',
	'smw_oi_docu' => 'Ta strona specjalna pozwala na import ontologii.  Ontologie muszą być reprezentowane w odpowiednim formacie, opisanym na <a href="http://wiki.ontoworld.org/index.php/Help:Ontology_import">stronie pomocy poświęconej importowi ontologii</a>.',
	'smw_oi_action' => 'Import',
	'smw_oi_return' => 'Powrót do <a href="$1">Special:OntologyImport</a>.',
	'smw_oi_noontology' => 'Nie podano ontologii, lub podana ontologia nie mogła być załadowana.',
	'smw_oi_select' => 'Wybierz zdania do importu, a następnie kliknij przycisk importu.',
	'smw_oi_textforall' => 'Nagłówek do dodania dla wszystkich importów (może być pusty):',
	'smw_oi_selectall' => 'Zaznacz lub odznacz wszystkie zdania',
	'smw_oi_statementsabout' => 'Zdania o',
	'smw_oi_mapto' => 'Mapuj encję na',
	'smw_oi_comment' => 'Dodaj następujący tekst:',
	'smw_oi_thisissubcategoryof' => 'Jest podkategorią',
	'smw_oi_thishascategory' => 'Jest częścią',
	'smw_oi_importedfromontology' => 'Import z ontologii',
	/*Messages for (data)Types Special*/
	'types' => 'Typy',
	'smw_types_docu' => 'Poniżej znajduje się lista wszystkich typów które mogą być przypisane atrybutom.  Każdy typ posiada artykuł, w którym mogą znajdować się dodatkowe informacje.',
	'smw_types_units' => 'Standardowa jednostka: $1; obsługiwane jednostki: $2',
	'smw_types_builtin' => 'Wbudowane typy',
	/*Messages for SemanticStatistics Special*/
	'semanticstatistics' => 'Semantic Statistics', // TODO: translate
	'smw_semstats_text' => 'This wiki contains <b>$1</b> property values for a total of <b>$2</b> different <a href="$3">properties</a>. <b>$4</b> properties have an own page, and the intended datatype is specified for <b>$5</b> of those. Some of the existing properties might by <a href="$6">unused properties</a>. Properties that still lack a page are found on the <a href="$7">list of wanted properties</a>.', // TODO: translate
	/*Messages for Flawed Attributes Special --disabled--*/
	'flawedattributes' => 'Flawed Attributes',
	'smw_fattributes' => 'The pages listed below have an incorrectly defined attribute. The number of incorrect attributes is given in the brackets.',
	// Name of the URI Resolver Special (no content)
	'uriresolver' => 'Resolver URI',
	'smw_uri_doc' => '<p>Resolver URI implementuje <a href="http://www.w3.org/2001/tag/issues.html#httpRange-14">W3C TAG finding on httpRange-14</a>. Dzięki temu ludzie nie zamieniają się w strony WWW ;)</p>', //TODO: is this the intended meaning?
	/*Messages for ask Special*/
	/*Messages for ask Special*/
	'ask' => 'Szukanie semantyczne',
	'smw_ask_docu' => '<p>Szukaj w wiki wpisując zapytanie w poniższe pole. Dalsze informacje znajdują się na <a href="$1">stronie pomocy poświęconej szukaniu semantycznemu</a>.</p>',
	'smw_ask_doculink' => 'Szukanie semantyczne',
	'smw_ask_sortby' => 'Sortuj po kolumnie',
	'smw_ask_ascorder' => 'Rosnąco',
	'smw_ask_descorder' => 'Malejąco',
	'smw_ask_submit' => 'Szukaj wyników',
	// Messages for the search by property special
	'searchbyproperty' => 'Szukaj po atrybucie',
	'smw_sbv_docu' => '<p>Szukanie wszystkich stron, które mają dany atrybut i wartość.</p>',
	'smw_sbv_noproperty' => '<p>Wpisz atrybut.</p>',
	'smw_sbv_novalue' => '<p>Wpisz wartość, lub zobacz wszystkie wartości atrybutów dla $1.</p>',
	'smw_sbv_displayresult' => 'Lista wszystkich stron, które mają atrybut $1 z wartością $2.',
	'smw_sbv_property' => 'Atrybut',
	'smw_sbv_value' => 'Wartość',
	'smw_sbv_submit' => 'Znajdź wyniki',
	// Messages for the browsing system
	'browse' => 'Przeglądaj artykuły',
	'smw_browse_article' => 'Wpisz nazwę artykułu, od którego chcesz rozpocząć przeglądanie.',
	'smw_browse_go' => 'Idź',
	'smw_browse_more' => '&hellip;',
	// Messages for the page property special
	'pageproperty' => 'Szukanie własności stron',
	'smw_pp_docu' => 'Szukanie wszystkich wartości danej własności na danej stronie. Proszę podać zarówno stronę, jak i własność.',
	'smw_pp_from' => 'Od strony',
	'smw_pp_type' => 'Własność',
	'smw_pp_submit' => 'Znajdź wyniki',
	// Generic messages for result navigation in all kinds of search pages
	'smw_result_prev' => 'Poprzednie',
	'smw_result_next' => 'Następne',
	'smw_result_results' => 'Wyniki',
	'smw_result_noresults' => 'Niestety, brak wyników.'
);

protected $smwDatatypeLabels = array(
	'smw_wikipage' => 'Page', // name of page datatype  //TODO translate
	'smw_string' => 'Łańcuch znaków',  // name of the string type
	'smw_text' => 'Text',  // name of the text type (very long strings) //TODO: translate
	'smw_enum' => 'Wyliczenie',  // name of the enum type
	'smw_bool' => 'Wartość logiczna',  // name of the boolean type
	'smw_int' => 'Liczba całkowita',  // name of the int type
	'smw_float' => 'Liczba zmiennoprzecinkowa',  // name of the floating point type
	'smw_geocoordinate' => 'Współrzędne geograficzne', // name of the geocoord type
	'smw_temperature' => 'Temperatura',  // name of the temperature type
	'smw_datetime' => 'Data',  // name of the datetime (calendar) type
	'smw_email' => 'Email',  // name of the email (URI) type
	'smw_url' => 'URL',  // name of the URL type (string datatype property)
	'smw_uri' => 'URI',  // name of the URI type (object property)
	'smw_annouri' => 'Annotation URI'  // name of the annotation URI type (annotation property) //TODO: translate
);

protected $smwSpecialProperties = array(
	//always start upper-case
	SMW_SP_HAS_TYPE  => 'Ma typ',
	SMW_SP_HAS_URI   => 'Równoważne URI',
	SMW_SP_SUBPROPERTY_OF => 'Subproperty of', // TODO: translate
	SMW_SP_MAIN_DISPLAY_UNIT => 'Główna wyświetlana jednostka',
	SMW_SP_DISPLAY_UNIT => 'Wyświetlana jednostka',
	SMW_SP_IMPORTED_FROM => 'Zaimportowane z',
	SMW_SP_CONVERSION_FACTOR => 'Odpowiada',
	SMW_SP_CONVERSION_FACTOR_SI => 'Corresponds to SI', // TODO translate
	SMW_SP_SERVICE_LINK => 'Zapewnia usługę',
	SMW_SP_POSSIBLE_VALUE => 'Dopuszcza wartość'
);


	/**
	 * Function that returns the namespace identifiers.
	 */
	public function getNamespaceArray() {
		return array(
			SMW_NS_RELATION       => 'Relacja',
			SMW_NS_RELATION_TALK  => 'Dyskusja_relacji',
			SMW_NS_PROPERTY       => 'Atrybut',
			SMW_NS_PROPERTY_TALK  => 'Dyskusja_atrybutu',
			SMW_NS_TYPE           => 'Typ',
			SMW_NS_TYPE_TALK      => 'Dyskusja_typu'
		);
	}
}


