<?php
/**
 * @author Javier Calzada Prado, Carmen Jorge García-Reyes, Universidad Carlos III de Madrid 
 */

class SMW_LanguageEs {

/* private */ var $smwContentMessages = array(
	'smw_edithelp' => 'Ayuda a la redacción de relaciones y atributos',
	'smw_helppage' => 'Relaciones y atributos',
	'smw_viewasrdf' => 'Ver como RDF',
	'smw_finallistconjunct' => ' y',					//utilizado en "A, B, y C"
	'smw_factbox_head' => 'Hechos relativos a à $1 — Búsqueda de páginas similares con <span class="smwsearchicon">+</span>.',
	'smw_att_head' => 'Atributos',
	'smw_rel_head' => 'Relaciones con otros articulos',
	'smw_spec_head' => 'Propiedades especiales',
	/*URIs that should not be used in objects in cases where users can provide URIs */
	'smw_uri_blacklist' => " http://www.w3.org/1999/02/22-rdf-syntax-ns#\n http://www.w3.org/2000/01/rdf-schema#\n http://www.w3.org/2002/07/owl#",					// http://www.w3.org/1999/02/22-rdf-syntax-ns#\n http://www.w3.org/2000/01/rdf-schema#\n http://www.w3.org/2002/07/owl#
	'smw_baduri' => 'Lo sentimos. Las URIs del dominio $1 no están disponibles en este emplazamiento',
	/*Messages and strings for inline queries*/
	'smw_iq_disabled' => "<span class='smwwarning'>Lo sentimos. Las búsquedas en los artículos de este wiki no están autorizadas</span>",
	'smw_iq_moreresults' => '&hellip; further results', // TODO: translate
	'smw_iq_nojs' => 'Use a JavaScript-enabled browser to view this element, or directly <a href="$1">browse the result list</a>.', // TODO: translate
	/*Messages and strings for ontology resued (import) */
	'smw_unknown_importns' => '[Lo sentimos. Ninguna función de importación está disponible para el espacio de nombres "$1".]',
	'smw_nonright_importtype' => '[El elemento "$1" no puede ser empleado más que para los artículos del espacio de nombres "$2".]',
	'smw_wrong_importtype' => '[El elemento "$1" no puede ser utilizado para los artículos del espacio de nombres dominio "$2".]',
	'smw_no_importelement' => '[Lo sentimos. El elemento "$1" no está disponible para la importación.]',
	/*Messages and strings for basic datatype processing*/
	'smw_decseparator' => ',', 
	'smw_kiloseparator' => '.',
	'smw_unknowntype' => '[Ups ! El tipo de datos "$1" no soportado ha sido devuelto al atributo]',
	'smw_noattribspecial' => '[Ups ! La propiedad especial "$1" no es un atributo (utilice "::" en lugar de ":=")]',
	'smw_notype' => '[Ups ! Ningún tipo de datos ha sido asignado al atributo]',
	'smw_nomanytypes' => '[Ups ! Demasiados tipos de datos han sido asignados al atributo]',
	'smw_emptystring' => '[Ups ! No se aceptan cadenas vacías]',
	'smw_maxstring' => '[Sorry, string representation $1 is too long for this site.]', //TODO: translate
	'smw_nopossiblevalues' => '[Oops! possible values for this attribute are not enumerated]',	//TODO translate
	'smw_notinenum' => '[Oops! "$1" is not in the list of possible values ($2) for this attribute]',	//TODO translate
	'smw_noboolean' => '[Oops! "$1" is not recognized as a boolean (true/false) value]',
	'smw_true_words' => 't,yes,y',	// comma-separated synonyms for boolean TRUE besides 'true' and '1' TODO: translate
	'smw_false_words' => 'f,no,n',	// comma-separated synonyms for boolean FALSE besides 'false' and '0' TODO: translate
	'smw_nointeger' => '[Ups ! "$1" no es un número entero]',
	'smw_nofloat' => '[Ups ! "$1" no es un número con coma flotante]',
	'smw_infinite' => '[Lo sentimos, el número $1 es demasiado largo.]',
	'smw_infinite_unit' => '[Lo sentimos, la conversion en la unidad $1 es imposible : el número es demasiado largo.]',
	// Currently unused, floats silently store units.  'smw_unexpectedunit' => 'Este atributo no soporta ninguna conversión de unidad',
	'smw_unsupportedprefix' => 'prefixes ("$1") are not currently supported',	 // TODO: translate
	'smw_unsupportedunit' => 'La conversion de la unidad "$1" no está soportada',
	/*Messages for geo coordinates parsing*/
	'smw_err_latitude' => 'Las indicaciones de latitud (N, S) deben estar comprendidas entre 0 et 90. "$1" no se encuentra dentro de estos límites !',
	'smw_err_longitude' => 'Las indicaciones de longitud (E, O) deben estar comprendidas entre 0 y 180. "$1" no se encuentra dentro de estos límites !',
	'smw_err_noDirection' => '[Ups ! Algo no funciona con la indicación "$1"]',
	'smw_err_parsingLatLong' => '[Ups ! Algo no funciona con la indicación "$1". Se espera algo con la forma "1°2′3.4′′O" o como mínimo algo parecido !]',
	'smw_err_wrongSyntax' => '[Ups ! Algo no funciona con la indicación "$1". Se espera algo con la forma "1°2′3.4′′ O, 5°6′7.8′ N" o como mínimo algo parecido !]',
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
	'smw_service_online_maps' => " Mapas&nbsp;geográficos|http://kvaleberg.com/extensions/mapsources/?params=\$1_\$3_\$5_\$7_\$2_\$4_\$6_\$8_region:EN_type:city\n Google&nbsp;maps|http://maps.google.com/maps?ll=\$11\$9,\$12\$10&spn=0.1,0.1&t=k\n Mapquest|http://www.mapquest.com/maps/map.adp?searchtype=address&formtype=latlong&latlongtype=degrees&latdeg=\$11\$1&latmin=\$3&latsec=\$5&longdeg=\$12\$2&longmin=\$4&longsec=\$6&zoom=6",
	/*Messages for datetime parsing */
	'smw_nodatetime' => '[Ups ! La fecha "$1" no ha sido comprendida. El soporte de datos de calendario son todavía experimentales.]'
);

/* private */ var $smwUserMessages = array(
	'smw_devel_warning' => 'Esta función está aún en desarrollo y quizá aun no sea operativa. Es quizá recomendable hacer una copia de seguridad del wiki antes de utilizar esta función.',
	/*Messages for Export RDF Special*/
	'exportrdf' => 'Exportar el artículo como RDF', //name of this special
	'smw_exportrdf_docu' => '<p> En esta página, las partes de contenido de un artículo pueden ser exportadas a formato RDF. Introduzca el nombre de las páginas deseadas en el cuadro de texto que se encuentra debajo, <i>un nombre por línea </i>.<p/>',
	'smw_exportrdf_recursive' => 'Exportar igualmente todas las páginas pertinentes de forma recurrente. Esta posibilidad puede conseguir un gran número de resultados !',
	'smw_exportrdf_backlinks' => 'Exportar igualmente todas las páginas que reenvían a páginas exportadas. Resulta un RDF en el que se facilita la navegación.',
	/*Messages for Search Triple Special*/
	'searchtriple' => 'Búsqueda semántica simple', //name of this special : Einfache semantische Suche
	'smw_searchtriple_header' => '<h1>Búsqueda de relaciones y atributos</h1>',
	'smw_searchtriple_docu' => "<p>Utilice la casilla de búsqueda para buscar artículos en función de ciertas propiedades. La línea superior está destinada a la búsqueda por relación, la línea inferior a la búsqueda por atributo. Ciertos campos pueden ser dejados en blanco para obtener más resultados. Siempre que se introduzca el valor de un atributo (con la unidad de medida correspondiente), el nombre del atributo debe ser también indicado </p>\n\n<p> Observe que existen dos botones de búsqueda. Presionar la tecla \"Enter\" no le llevará probablemente al resultado de su búsqueda.</p>",
	'smw_searchtriple_subject' => 'Nombre del artículo (sujeto):',
	'smw_searchtriple_relation' => 'Nombre de la relación:',
	'smw_searchtriple_attribute' => 'Nombre de los atributos:',
	'smw_searchtriple_object' => 'Nombre del artículo (objeto) (Objekt):',
	'smw_searchtriple_attvalue' => 'Valor de los atributos:',
	'smw_searchtriple_searchrel' => 'Búsqueda por Relación',
	'smw_searchtriple_searchatt' => 'Búsqueda por atributo',
	'smw_searchtriple_resultrel' => 'Resultados de la búsqueda (Relación)',
	'smw_searchtriple_resultatt' => 'Resultados de la búsqueda (atributos)',
	/*Messages for Relation Special*/
	'relations' => 'Relaciones',
	'smw_relations_docu' => 'En este wiki existen las siguientes relaciones:',
	/*Messages for Attributes Special*/
	'attributes' => 'Atributos',
	'smw_attributes_docu' => 'En este wiki existen los siguientes atributos:',
	'smw_attr_type_join' => ' &ndash; $1',
	/*Messages for Unused Relations Special*/
	'unusedrelations' => 'Relaciones huérfanas',
	'smw_unusedrelations_docu' => 'Existen páginas para las relaciones siguientes, pero no son utilizadas.',
	/*Messages for Unused Attributes Special*/
	'unusedattributes' => 'Atributos huérfanos',
	'smw_unusedattributes_docu' => 'Existen páginas para los atributos siguientes, pero no son utilizadas.',
	/*Messages for ask Special*/
	'ask' => 'Semantic search',  //TODO: translate
	'smw_ask_docu' => '<p>Search the wiki by entering an inline query into the search field below. Further information is given on the <a href="$1">help page for semantic search</a>.</p>',  //TODO: translate
	'smw_ask_doculink' => 'Semantic search',  //TODO: translate
	'smw_ask_prev' => 'Previous',  //TODO: translate
	'smw_ask_next' => 'Next',  //TODO: translate
	'smw_ask_results' => 'Results',  //TODO: translate
	'smw_ask_noresults' => 'Sorry, no results.',  //TODO: translate
	'smw_ask_sortby' => 'Sort by column', //TODO: translate
	'smw_ask_ascorder' => 'Ascending', //TODO: translate
	'smw_ask_descorder' => 'Descending', //TODO: translate
	'smw_ask_submit' => 'Find results', //TODO: translate
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
	'smw_types_units' => 'Standard unit: $1; supported units: $2',
	'smw_types_builtin' => 'Built-in types'
);

/* private */ var $smwDatatypeLabels = array(
	'smw_string' => 'Cadena de caracteres',  // name of the string type
	'smw_enum' => 'Enumeration',  // name of the enum type TODO: translate
	'smw_bool' => 'Boolean',  // name of the boolean type TODO: translate
	'smw_int' => 'Número entero',  // name of the int type
	'smw_float' => 'Número con coma',  // name of the floating point type
	'smw_length' => 'Largo',  // name of the length type
	'smw_area' => 'Extensión',  // name of the area type
	'smw_geolength' => 'Longitud',  // OBSOLETE name of the geolength type
	'smw_geoarea' => 'Área geográfica',  // OBSOLETE name of the geoarea type
	'smw_geocoordinate' => 'Cordenadas geográficas', // name of the geocoord type
	'smw_mass' => 'Masa',  // name of the mass type
	'smw_time' => 'Duración',  // name of the time type
	'smw_temperature' => 'Temperatura',  // name of the temperature type
	'smw_datetime' => 'Fecha',  // name of the datetime (calendar) type	
	'smw_email' => 'Dirección electrónica',  // name of the email (URI) type
	'smw_url' => 'URL',  // name of the URL type (string datatype property)
	'smw_uri' => 'URI',  // name of the URI type (object property)
	'smw_annouri' => 'Anotación-URI'  // name of the annotation URI type (annotation property)
);

/* private */ var $smwSpecialProperties = array(
	//always start upper-case
	SMW_SP_HAS_TYPE  => 'Tiene tipo de datos',
	SMW_SP_HAS_URI   => 'URI equivalente',
	SMW_SP_IS_SUBRELATION_OF => 'Es una subrelación de',
	SMW_SP_IS_SUBATTRIBUTE_OF => 'Es un subatributo de',
	SMW_SP_MAIN_DISPLAY_UNIT => 'Unidad de medida principal para la visualización',
	SMW_SP_DISPLAY_UNIT => 'Unidad de medida',
	SMW_SP_IMPORTED_FROM => 'Importado de',
	SMW_SP_CONVERSION_FACTOR => 'Corresponde a',
	SMW_SP_SERVICE_LINK => 'Provides service', //TODO: translate
	SMW_SP_POSSIBLE_VALUES => 'Possible values'	//TODO translate
);

	/**
	 * Function that returns the namespace identifiers.
	 */
	function getNamespaceArray() {
		return array(
			SMW_NS_RELATION       => "Relación",
			SMW_NS_RELATION_TALK  => "Discusión_relación",
			SMW_NS_ATTRIBUTE      => "Atributo",
			SMW_NS_ATTRIBUTE_TALK => "Discusión_atributo",
			SMW_NS_TYPE           => "Tipos_de_datos",
			SMW_NS_TYPE_TALK      => "Discusión_tipos_de_datos"
		);
	}

	/**
	 * Function that returns the localized label for a datatype.
	 */
	function getDatatypeLabel($msgid) {
		return $this->smwDatatypeLabels[$msgid];
	}

	/**
	 * Function that returns the labels for the special relations and attributes.
	 */
	function getSpecialPropertiesArray() {
		return $this->smwSpecialProperties;
	}

	/**
	 * Function that returns all content messages (those that are stored 
	 * in some article, and can thus not be translated to individual users).
	 */
	function getContentMsgArray() {
		return $this->smwContentMessages;
	}

	/**
	 * Function that returns all user messages (those that are given only to 
	 * the current user, and can thus be given in the individual user language).
	 */
	function getUserMsgArray() {
		return $this->smwUserMessages;
	}

}

?>
