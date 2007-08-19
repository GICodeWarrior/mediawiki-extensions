<?php
/**
 * @author Javier Calzada Prado, Carmen Jorge García-Reyes, Universidad Carlos III de Madrid, Jesús Espino García
 */

global $smwgIP;
include_once($smwgIP . '/languages/SMW_Language.php');

class SMW_LanguageEs extends SMW_Language {

protected $smwContentMessages = array(
	'smw_edithelp' => 'Ayuda a la redacción de relaciones y atributos',
	'smw_helppage' => 'Relaciones y atributos',
	'smw_viewasrdf' => 'Ver como RDF',
	'smw_finallistconjunct' => ' y',					//utilizado en "A, B, y C"
	'smw_factbox_head' => 'Hechos relativos a à $1 — Búsqueda de páginas similares con <span class="smwsearchicon">+</span>.',
	'smw_spec_head' => 'Propiedades especiales',
	/*URIs that should not be used in objects in cases where users can provide URIs */
	'smw_uri_blacklist' => " http://www.w3.org/1999/02/22-rdf-syntax-ns#\n http://www.w3.org/2000/01/rdf-schema#\n http://www.w3.org/2002/07/owl#",					// http://www.w3.org/1999/02/22-rdf-syntax-ns#\n http://www.w3.org/2000/01/rdf-schema#\n http://www.w3.org/2002/07/owl#
	'smw_baduri' => 'Lo sentimos. Las URIs del dominio $1 no están disponibles en este emplazamiento',
	/*Messages and strings for inline queries*/
	'smw_iq_disabled' => "<span class='smwwarning'>Lo sentimos. Las búsquedas en los artículos de este wiki no están autorizadas</span>",
	'smw_iq_moreresults' => '&hellip; siguientes resultados',
	'smw_iq_nojs' => 'Use un navegador con JavaScript habilitado para ver este elemento, o directamente <a href="$1">vea la lista de resultados</a>.',
	/*Messages and strings for ontology resued (import) */
	'smw_unknown_importns' => 'Ninguna función de importación está disponible para el espacio de nombres "$1".',
	'smw_nonright_importtype' => 'El elemento "$1" no puede ser empleado más que para los artículos del espacio de nombres "$2".',
	'smw_wrong_importtype' => 'El elemento "$1" no puede ser utilizado para los artículos del espacio de nombres dominio "$2".',
	'smw_no_importelement' => 'El elemento "$1" no está disponible para la importación.',
	/*Messages and strings for basic datatype processing*/
	'smw_decseparator' => ',',
	'smw_kiloseparator' => '.',
	'smw_unknowntype' => 'El tipo de datos "$1" no soportado ha sido devuelto al atributo.',
	'smw_nomanytypes' => 'Demasiados tipos de datos han sido asignados al atributo.',
	'smw_emptystring' => 'No se aceptan cadenas vacías.',
	'smw_maxstring' => 'La representación de la cadena $1 es demasiado grande para este sitio.',
	'smw_nopossiblevalues' => 'Los posibles valores para este atributo no están enumerados',
	'smw_notinenum' => '"$1" no esta en la lista de posibles valores ($2) para este atributo.',
	'smw_noboolean' => '"$1" no es reconocido como un valor booleano (verdadero/falso).',
	'smw_true_words' => 't,si,s',
	'smw_false_words' => 'f,no,n',
	'smw_nointeger' => '"$1" no es un número entero.',
	'smw_nofloat' => '"$1" no es un número con coma flotante.',
	'smw_infinite' => 'El número $1 es demasiado largo.',
	'smw_infinite_unit' => 'La conversión en la unidad $1 es imposible : el número es demasiado largo.',
	// Currently unused, floats silently store units.  'smw_unexpectedunit' => 'Este atributo no soporta ninguna conversión de unidad',
	'smw_unsupportedprefix' => 'prefijos ("$1") no esta soportados actualmente',
	'smw_unsupportedunit' => 'La conversión de la unidad "$1" no está soportada',
	/*Messages for geo coordinates parsing*/
	'smw_err_latitude' => 'Las indicaciones de latitud (N, S) deben estar comprendidas entre 0 et 90. "$1" no se encuentra dentro de estos límites !',
	'smw_err_longitude' => 'Las indicaciones de longitud (E, O) deben estar comprendidas entre 0 y 180. "$1" no se encuentra dentro de estos límites !',
	'smw_err_noDirection' => 'Algo no funciona con la indicación "$1".',
	'smw_err_parsingLatLong' => 'Algo no funciona con la indicación "$1". Se espera algo con la forma "1°2′3.4′′O" o como mínimo algo parecido !',
	'smw_err_wrongSyntax' => 'Algo no funciona con la indicación "$1". Se espera algo con la forma "1°2′3.4′′ O, 5°6′7.8′ N" o como mínimo algo parecido !',
	'smw_err_sepSyntax' => 'La expresión "$1" parece ser correcta, pero los valores de la latitud y de la longitud deben ser separados por signos como "," o ";".',
	'smw_err_notBothGiven' => 'Se debe dar un valor para la latitud (N, S) <i>y</i> la longitud (E, O).',
	/* additionals ... */
	'smw_label_latitude' => 'Latitud :',
	'smw_label_longitude' => 'Longitud :',
	'smw_abb_north' => 'N',
	'smw_abb_east' => 'E',
	'smw_abb_south' => 'S',
	'smw_abb_west' => 'O',
	/* some links for online maps; can be translated to different language versions of services, but need not*/
	'smw_service_online_maps' => " Mapas&nbsp;geográficos|http://tools.wikimedia.de/~magnus/geo/geohack.php?language=es&params=\$9_\$7_\$10_\$8\n Google&nbsp;maps|http://maps.google.com/maps?ll=\$11\$9,\$12\$10&spn=0.1,0.1&t=k\n Mapquest|http://www.mapquest.com/maps/map.adp?searchtype=address&formtype=latlong&latlongtype=degrees&latdeg=\$11\$1&latmin=\$3&latsec=\$5&longdeg=\$12\$2&longmin=\$4&longsec=\$6&zoom=6",
	/*Messages for datetime parsing */
	'smw_nodatetime' => 'La fecha "$1" no ha sido comprendida. El soporte de datos de calendario son todavía experimentales.'
);

protected $smwUserMessages = array(
	'smw_devel_warning' => 'Esta función está aún en desarrollo y quizá aun no sea operativa. Es quizá recomendable hacer una copia de seguridad del wiki antes de utilizar esta función.',
	// Messages for article pages of types, relations, and attributes
	'smw_type_header' => 'Atributos de tipo “$1”',
	'smw_typearticlecount' => 'Mostrando $1 atributos usando este tipo.',
	'smw_attribute_header' => 'Paginas usando el atributo “$1”',
	'smw_attributearticlecount' => '<p>Mostrando $1 páginas usando este atributo.</p>',
	/*Messages for Export RDF Special*/
	'exportrdf' => 'Exportar el artículo como RDF', //name of this special
	'smw_exportrdf_docu' => '<p> En esta página, las partes de contenido de un artículo pueden ser exportadas a formato RDF. Introduzca el nombre de las páginas deseadas en el cuadro de texto que se encuentra debajo, <i>un nombre por línea </i>.<p/>',
	'smw_exportrdf_recursive' => 'Exportar igualmente todas las páginas pertinentes de forma recurrente. Esta posibilidad puede conseguir un gran número de resultados !',
	'smw_exportrdf_backlinks' => 'Exportar igualmente todas las páginas que reenvían a páginas exportadas. Resulta un RDF en el que se facilita la navegación.',
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
// 	/*Messages for Relation Special*/
// 	'relations' => 'Relaciones',
// 	'smw_relations_docu' => 'En este wiki existen las siguientes relaciones:',
// 	// Messages for WantedRelations Special
// 	'wantedrelations' => 'Relaciones buscadas',
// 	'smw_wanted_relations' => 'Las relaciones siguientes no tienen una página explicativa todavía, aunque ya están siendo usadas para describir otras páginas.',
// 	/*Messages for Attributes Special*/
// 	'attributes' => 'Atributos',
// 	'smw_attributes_docu' => 'En este wiki existen los siguientes atributos:',
// 	'smw_attr_type_join' => ' &ndash; $1',
// 	/*Messages for Unused Relations Special*/
// 	'unusedrelations' => 'Relaciones huérfanas',
// 	'smw_unusedrelations_docu' => 'Existen páginas para las relaciones siguientes, pero no son utilizadas.',
// 	/*Messages for Unused Attributes Special*/
// 	'unusedattributes' => 'Atributos huérfanos',
// 	'smw_unusedattributes_docu' => 'Existen páginas para los atributos siguientes, pero no son utilizadas.',
	/* Messages for the refresh button */
	'tooltip-purge' => 'Volver a actualizar todas las búsquedas y borradores de esta página.',
	'purge' => 'Volver a actualizar',
	/*Messages for Import Ontology Special*/
	'ontologyimport' => 'Importar la ontología',
	'smw_ontologyimport_docu' => 'Esta página especial permite importar datos de una ontología externa. Dicha ontología debe estar en un formato RDF simplificado. Información adicional disponible en <a href="http://wiki.ontoworld.org/index.php/Help:Ontology_import">Documentación relativa a la importación de ontologías en lengua inglesa.',
	'smw_ontologyimport_action' => 'Importar',
	'smw_ontologyimport_return' => 'Volver a <a href="$1">Importar la ontología</a>.',	//Différence avec la version anglaise
	/*Messages for (data)Types Special*/
	'tipos' => 'Tipos de datos',
	'smw_types_docu' => 'Los tipos de datos siguientes pueden ser asignados a los atributos. Cada tipo de datos tiene su propio artículo, en el que puede figurar información más precisa.',
	'smw_types_units' => 'Unidad estándar: $1; unidades soportadas: $2',
	'smw_types_builtin' => 'Built-in types',
	/*Messages for SemanticStatistics Special*/
	'semanticstatistics' => 'Semantic Statistics', // TODO translate
	'smw_semstats_text' => 'This wiki contains <b>$1</b> property values for a total of <b>$2</b> different <a href="$3">properties</a>. <b>$4</b> properties have an own page, and the intended datatype is specified for <b>$5</b> of those. Some of the existing properties might by <a href="$6">unused properties</a>. Properties that still lack a page are found on the <a href="$7">list of wanted properties</a>.', // TODO translate
	/*Messages for Flawed Attributes Special --disabled--*/
	'flawedattributes' => 'Flawed Attributes',
	'smw_fattributes' => 'The pages listed below have an incorrectly defined attribute. The number of incorrect attributes is given in the brackets.',
	// Name of the URI Resolver Special (no content)
	'uriresolver' => 'Traductor de URI',
	'smw_uri_doc' => '<p>El traductor de URI implementa <a href="http://www.w3.org/2001/tag/issues.html#httpRange-14">W3C TAG finding on httpRange-14</a>. Esto se preocupa de cosas que los humanos no lo hacen en los sitios web..</p>',
	/*Messages for ask Special*/
	'ask' => 'Búsqueda semántica',
	'smw_ask_docu' => '<p>Buscar páginas introduciendo una consulta en el campo de búsqueda de abajo. Más información es mostrada en la <a href="$1">página de ayuda para búsqueda semántica</a>.</p>',
	'smw_ask_doculink' => 'Búsqueda semántica',
	'smw_ask_sortby' => 'Ordenar por columna',
	'smw_ask_ascorder' => 'Ascendente',
	'smw_ask_descorder' => 'Descendente',
	'smw_ask_submit' => 'Buscar resultados',
	// Messages for the search by property special
	'searchbyproperty' => 'Buscar por atributo',
	'smw_sbv_docu' => '<p>Buscar por todas las páginas que tiene un atributo y valor dado.</p>',
	'smw_sbv_noproperty' => '<p>Por favor introduzca un atributo.</p>',
	'smw_sbv_novalue' => '<p>Por favor introduzca un valor, o ver todos los valores de atributo para $1.</p>',
	'smw_sbv_displayresult' => 'Una lista de todas las páginas que tienen un atributo $1 con el valor $2.',
	'smw_sbv_property' => 'Atributo',
	'smw_sbv_value' => 'Valor',
	'smw_sbv_submit' => 'Buscar resultados',
	// Messages for the browsing system
	'browse' => 'Explorar artículos',
	'smw_browse_article' => 'Introduzca el nombre de la página para empezar a explorar.',
	'smw_browse_go' => 'Ir',
	'smw_browse_more' => '&hellip;',
	// Messages for the page property special
	'pageproperty' => 'Page property search', // TODO: translate
	'smw_pp_docu' => 'Search for all the fillers of a property on a given page. Please enter both a page and a property.', // TODO: translate
	'smw_pp_from' => 'From page', // TODO: translate
	'smw_pp_type' => 'Property', // TODO: translate
	'smw_pp_submit' => 'Find results', // TODO: translate
	// Generic messages for result navigation in all kinds of search pages
	'smw_result_prev' => 'Anterior',
	'smw_result_next' => 'Siguiente',
	'smw_result_results' => 'Resultados',
	'smw_result_noresults' => 'Lo siento, no hay resultados.'
);

protected $smwDatatypeLabels = array(
	'smw_wikipage' => 'Page', // name of page datatype  //TODO translate
	'smw_string' => 'Cadena de caracteres',  // name of the string type
	'smw_text' => 'Texto',  // name of the text type (very long strings)
	'smw_enum' => 'Enumeración',  // name of the enum type
	'smw_bool' => 'Booleano',  // name of the boolean type
	'smw_int' => 'Número entero',  // name of the int type
	'smw_float' => 'Número con coma',  // name of the floating point type
	'smw_length' => 'Largo',  // name of the length type
	'smw_area' => 'Extensión',  // name of the area type
	'smw_geolength' => 'Longitud',  // OBSOLETE name of the geolength type
	'smw_geoarea' => 'Área geográfica',  // OBSOLETE name of the geoarea type
	'smw_geocoordinate' => 'Coordenadas geográficas', // name of the geocoord type
	'smw_mass' => 'Masa',  // name of the mass type
	'smw_time' => 'Duración',  // name of the time type
	'smw_temperature' => 'Temperatura',  // name of the temperature type
	'smw_datetime' => 'Fecha',  // name of the datetime (calendar) type
	'smw_email' => 'Dirección electrónica',  // name of the email (URI) type
	'smw_url' => 'URL',  // name of the URL type (string datatype property)
	'smw_uri' => 'URI',  // name of the URI type (object property)
	'smw_annouri' => 'Anotación-URI'  // name of the annotation URI type (annotation property)
);

protected $smwSpecialProperties = array(
	//always start upper-case
	SMW_SP_HAS_TYPE  => 'Tiene tipo de datos',
	SMW_SP_HAS_URI   => 'URI equivalente',
	SMW_SP_SUBPROPERTY_OF => 'Subproperty of', // TODO: translate
	SMW_SP_MAIN_DISPLAY_UNIT => 'Unidad de medida principal para la visualización',
	SMW_SP_DISPLAY_UNIT => 'Unidad de medida',
	SMW_SP_IMPORTED_FROM => 'Importado de',
	SMW_SP_CONVERSION_FACTOR => 'Corresponde a',
	SMW_SP_CONVERSION_FACTOR_SI => 'Corresponde a SI',
	SMW_SP_SERVICE_LINK => 'Provee servicio',
	SMW_SP_POSSIBLE_VALUE => 'Permite el valor'
);

	/**
	 * Function that returns the namespace identifiers.
	 */
	function getNamespaceArray() {
		return array(
			SMW_NS_RELATION       => "Relación",
			SMW_NS_RELATION_TALK  => "Discusión_relación",
			SMW_NS_PROPERTY       => "Atributo",
			SMW_NS_PROPERTY_TALK  => "Discusión_atributo",
			SMW_NS_TYPE           => "Tipos_de_datos",
			SMW_NS_TYPE_TALK      => "Discusión_tipos_de_datos"
		);
	}
}


