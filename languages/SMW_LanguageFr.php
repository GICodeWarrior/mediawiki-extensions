<?php
/**
 * @author Pierre Matringe
 */

class SMW_LanguageFr {

/* private */ var $smwContentMessages = array(
	'smw_edithelp' => 'Aide à la rédaction de relations et d\'attributs',
	'smw_helppage' => 'Relations et attributs',
	'smw_viewasrdf' => 'Voir comme RDF',
	'smw_finallistconjunct' => ' et',					//utilisé dans "A, B, et C"
	'smw_factbox_head' => 'Faits relatifs à $1 &mdash; Recherche de pages similaires avec <span class="smwsearchicon">+</span>.',
	'smw_att_head' => 'Attributs',
	'smw_rel_head' => 'Relations à d\'autres articles',
	'smw_spec_head' => 'Propriétés spéciales',
	/*URIs that should not be used in objects in cases where users can provide URIs */
	'smw_uri_blacklist' => " http://www.w3.org/1999/02/22-rdf-syntax-ns#\n http://www.w3.org/2000/01/rdf-schema#\n http://www.w3.org/2002/07/owl#",
	'smw_baduri' => 'Désolé. Les URIs du domaine $1 ne sont pas disponible à cet emplacement',
	/*Messages and strings for inline queries*/
	'smw_iq_disabled' => "<span class='smwwarning'>Désolé. Les recherches dans les articles de ce wiki ne sont pas autorisées</span>",
	'smw_iq_moreresults' => '&hellip; autres résultats',
	'smw_iq_nojs' => 'Utilisez un navigateur avec JavaScript pour voir cet élément, ou <a href="$1">consultez la liste des résultats</a> directement.',
	/*Messages and strings for ontology resued (import) */
	'smw_unknown_importns' => '[Désolé. Aucune fonction d\'import n\'est disponible pour l\'espace de nommage "$1".]',
	'smw_nonright_importtype' => '[L\'élément "$1" ne peut être employé que pour des articles de l\'espace de nommage "$2".]',
	'smw_wrong_importtype' => '[L\'élément "$1" ne peut être employé pour des articles de l\'espace de nommage domaine "$2".]',
	'smw_no_importelement' => '[Désolé. L\'élément "$1" n\'est pas disponible pour l\'importation.]',
	/*Messages and strings for basic datatype processing*/
	'smw_decseparator' => ',', 
	'smw_kiloseparator' => '.',
	'smw_unknowntype' => '[Oups ! Le type de données "$1" non supporté a été retourné à l\'attribut]',
	'smw_noattribspecial' => '[Oups ! La propriété spéciale "$1" n\'est pas un attribut (utilisez "::" au lieu de ":=")]',
	'smw_notype' => '[Oups ! Aucun type de donné n\'a été assigné à l\'attribut]',
	'smw_manytypes' => '[Oups ! Plusieurs types de données ont été assignés à l\'attribut]',
	'smw_emptystring' => '[Oups ! Les chaînes vides ne sont pas acceptées]',
	'smw_maxstring' => '[Désolé, la chaîne de représentation $1 est trop grande pour ce site.]',
	'smw_nopossiblevalues' => '[Oops! possible values for this attribute are not enumerated]',	//TODO translate
	'smw_notinenum' => '[Oops! "$1" is not in the list of possible values ($2) for this attribute]',	//TODO translate
	'smw_noboolean' => '[Oops! "$1" is not recognized as a boolean (true/false) value]', // TODO: Translate
	'smw_true_words' => 't,oui',	// comma-separated synonyms for boolean TRUE besides 'true' and '1' TODO: Translate
	'smw_false_words' => 'f,non',	// comma-separated synonyms for boolean FALSE besides 'false' and '0' TODO: Translate
	'smw_nointeger' => '[Oups ! "$1" n\'est pas un nombre entier]',
	'smw_nofloat' => '[Oups ! "$1" n\'est pas un nombre à virgule flottante]',
	'smw_infinite' => '[Désolé, le nombre $1 est trop long.]',
	'smw_infinite_unit' => '[Désolé, la conversion dans l\'unité $1 est impossible : le nombre est trop long.]',
	// Currently unused, floats silently store units.  'smw_unexpectedunit' => 'Cet attribut ne supporte aucune conversion d\'unité',
	'smw_unsupportedprefix' => 'prefixes ("$1") are not currently supported',	 // TODO: translate
	'smw_unsupportedunit' => 'La conversion de l\'unité "$1" n\'est pas supportée',
	/*Messages for geo coordinates parsing*/
	'smw_err_latitude' => 'Les indications sur la latitude (N, S) doivent être comprises entre 0 et 90. "$1" ne se trouve pas à l\'intérieur de ces limites !',
	'smw_err_longitude' => 'Les indications sur la longitude (E, O) doivent être comprises entre 0 et 180. "$1" ne se trouve pas à l\'intérieur de ces limites !',
	'smw_err_noDirection' => '[Oups ! Quelque chose ne va pas avec l\'indication "$1"]',
	'smw_err_parsingLatLong' => '[Oups ! Quelque chose ne va pas avec l\'indication "$1". Quelque chose dans la forme "1°2′3.4′′O" ou au minimum y ressemblant est attendu !]',
	'smw_err_wrongSyntax' => '[Oups ! Quelque chose ne va pas avec l\'indication "$1". Quelque chose dans la forme "1°2′3.4′′ O, 5°6′7.8′ N" ou au minimum y ressemblant est attendu !]',
	'smw_err_sepSyntax' => 'L\'expression "$1" semble être exacte, mais les valeurs de la latitude et de la longitude doivent être séparées par des signes tels que "," ou ";".',
	'smw_err_notBothGiven' => 'Une valeur doit être donnée pour la latitude (N, S) <i>et</i> la longitude (E, O).',
	/* additionals ... */
	'smw_label_latitude' => 'Latitude :',
	'smw_label_longitude' => 'Longitude :',
	'smw_abb_north' => 'N',
	'smw_abb_east' => 'E',
	'smw_abb_south' => 'S',
	'smw_abb_west' => 'O',
	/* some links for online maps; can be translated to different language versions of services, but need not*/
	'smw_service_online_maps' => " Cartes&nbsp;géographiques|http://kvaleberg.com/extensions/mapsources/?params=\$1_\$3_\$5_\$7_\$2_\$4_\$6_\$8_region:EN_type:city\n Google&nbsp;maps|http://maps.google.com/maps?ll=\$11\$9,\$12\$10&spn=0.1,0.1&t=k\n Mapquest|http://www.mapquest.com/maps/map.adp?searchtype=address&formtype=latlong&latlongtype=degrees&latdeg=\$11\$1&latmin=\$3&latsec=\$5&longdeg=\$12\$2&longmin=\$4&longsec=\$6&zoom=6",
	/*Messages for datetime parsing */
	'smw_nodatetime' => '[Oups ! La date "$1" n\'a pas été comprise. Le support des données calendaires est encore expérimental.]'
);

/* private */ var $smwUserMessages = array(
	'smw_devel_warning' => 'Cette fonction est encore en développement et n\'est peut-être pas encore opérationnelle. Il est peut-être judicieux de faire une sauvegarde du contenu du wiki avant toute utilisation de cette fonction.',
	/*Messages for Export RDF Special*/
	'exportrdf' => 'Exporter l\'article comme RDF', //name of this special
	'smw_exportrdf_docu' => '<p>Sur cette page, des parties du contenu d\'un article peuvent être exportées dans le format RDF. Veuillez entrer le nom des pages souhaitées dans la boîte de texte ci-dessous, <i>un nom par ligne </i>.</p>',
	'smw_exportrdf_recursive' => 'Exporter également toutes les pages pertinentes de manière récursive. Cette possibilité peut aboutir à un très grand nombre de résultats !',
	'smw_exportrdf_backlinks' => 'Exporter également toutes les pages qui renvoient à des pages exportées. Produit un RDF dans lequel la navigation est facilitée.',
	/*Messages for Search Triple Special*/
	'searchtriple' => 'Recherche sémantique simple', //name of this special : Einfache semantische Suche
	'smw_searchtriple_header' => '<h1>Recherche de relations et d\'attributs</h1>',
	'smw_searchtriple_docu' => "<p>Utilisez le masque de recherche pour rechercher des articles selon certaines propriétés. La ligne supérieur est destinée à la recherche par relation, la ligne inférieure à la recherche par attribut. Certains champs peuvent être laissés vide pour obtenir plus de résultats. Cependant si la valeur d'un attribut est entrée (avec l'unité de mesure correspondante), le nom de l'attribut doit également être indiqué.</p>\n\n<p>Veuillez constater qu'il y a deux boutons de recherche. Appuyer sur la touche Entrée ne conduira peut-être pas à ce que soit menée la recherche souhaitée.</p>",
	'smw_searchtriple_subject' => 'Nom de l\'article (sujet):',
	'smw_searchtriple_relation' => 'Nom de la relation:',
	'smw_searchtriple_attribute' => 'Nom des attributs:',
	'smw_searchtriple_object' => 'Nom de l\'article (objet) :',
	'smw_searchtriple_attvalue' => 'Valeur des attributs :',
	'smw_searchtriple_searchrel' => 'Recherche par relation',
	'smw_searchtriple_searchatt' => 'Recherche par attribut',
	'smw_searchtriple_resultrel' => 'Résultats de la recherche (relations)',
	'smw_searchtriple_resultatt' => 'Résultats de la recherche (attributs)',
	/*Messages for Relation Special*/
	'relations' => 'Relations',
	'smw_relations_docu' => 'Sur ce wiki, existent les relations suivantes:',
	/*Messages for Attributes Special*/
	'attributes' => 'Attributs',
	'smw_attributes_docu' => 'Sur ce wiki, existent les attributs suivants:',
	'smw_attr_type_join' => ' avec $1',
	/*Messages for Unused Relations Special*/
	'unusedrelations' => 'Relations orphelines',
	'smw_unusedrelations_docu' => 'Des pages pour les relations suivantes existent, mais elles ne sont pas utilisées.',
	/*Messages for Unused Attributes Special*/
	'unusedattributes' => 'Attributs orphelins',
	'smw_unusedattributes_docu' => 'Des pages pour les attribut suivants existent, mais ils ne sont pas utilisés.',
	/*Messages for ask Special*/
	'ask' => 'Recherche sémantique',
	'smw_ask_docu' => '<p>Cherchez dans le wiki en entrant une requête intégrée dans le champ de recherche ci-dessous. Des informations plus complètes sont disponibles sur la <a href="$1">page d\'aide à la recherche sémantique</a>.</p>',
	'smw_ask_doculink' => 'Recherche sémantique',
	'smw_ask_prev' => 'Précédent',
	'smw_ask_next' => 'Suivant',
	'smw_ask_results' => 'Résultats',
	'smw_ask_noresults' => 'Désolé, aucun résultat.',
	'smw_ask_sortby' => 'Trier par colonnes',
	'smw_ask_ascorder' => 'Croissant',
	'smw_ask_descorder' => 'Décroissant',
	'smw_ask_submit' => 'Trouver des résultats',
	/* Messages for the refresh button */
	'tooltip-purge' => 'Réactualiser toutes les recherches et tous les brouillons de cette page.',
	'purge' => 'Réactualiser',
	/*Messages for Import Ontology Special*/
	'ontologyimport' => 'Importer une ontologie',
	'smw_ontologyimport_docu' => 'Cette page spéciale permet d\'importer des informations d\'une ontologie externe. Cette ontologie doit être dans un format RDF simplifié. Des informations supplémentaires sont disponibles dans la <a href="http://wiki.ontoworld.org/index.php/Help:Ontology_import">Documentation relative à l\'import d\'ontologie</a> en langues anglaise.',
	'smw_ontologyimport_action' => 'Importer',
	'smw_ontologyimport_return' => 'Revenir à <a href="$1">Importer l\'ontologie</a>.',	//Différence avec la version anglaise
	/*Messages for (data)Types Special*/
	'types' => 'Types de données',
	'smw_types_docu' => 'Les types de données suivants peuvent être assignées aux attributs. Chaque type de données a son propre article, dans lequel peuvent figurer des informations plus précises.',
	'smw_types_units' => 'Unité standard : $1 ; Unités supportées : $2',
	'smw_types_builtin' => 'Types intégrés'
);

/* private */ var $smwDatatypeLabels = array(
	'smw_string' => 'Chaîne de caractères',  // name of the string type
	'smw_enum' => 'Enumeration',  // name of the enum type TODO: translate
	'smw_bool' => 'Boolean',  // name of the boolean type TODO: translate
	'smw_int' => 'Nombre entier',  // name of the int type
	'smw_float' => 'Nombre décimal',  // name of the floating point type
	'smw_length' => 'Longueur',  // name of the length type
	'smw_area' => 'Étendue',  // name of the area type
	'smw_geolength' => 'Longitude',  // OBSOLETE name of the geolength type
	'smw_geoarea' => 'Aire géographique',  // OBSOLETE name of the geoarea type
	'smw_geocoordinate' => 'Coordonnées géographiques', // name of the geocoord type
	'smw_mass' => 'Masse',  // name of the mass type
	'smw_time' => 'Durée',  // name of the time type
	'smw_temperature' => 'Température',  // name of the temperature type
	'smw_datetime' => 'Date',  // name of the datetime (calendar) type	
	'smw_email' => 'Adresse électronique',  // name of the email (URI) type
	'smw_url' => 'URL',  // name of the URL type (string datatype property)
	'smw_uri' => 'URI',  // name of the URI type (object property)
	'smw_annouri' => 'Annotation-URI'  // name of the annotation URI type (annotation property)
);

/* private */ var $smwSpecialProperties = array(
	//always start upper-case
	SMW_SP_HAS_TYPE  => 'A le type',
	SMW_SP_HAS_URI   => 'URI équivalente',
	SMW_SP_IS_SUBRELATION_OF => 'Est une sous-relation de',
	SMW_SP_IS_SUBATTRIBUTE_OF => 'Est un sous-attribut de',
	SMW_SP_MAIN_DISPLAY_UNIT => 'Unité de mesure principale pour l\'affichage',
	SMW_SP_DISPLAY_UNIT => 'Unité de mesure',
	SMW_SP_IMPORTED_FROM => 'Importé de',
	SMW_SP_CONVERSION_FACTOR => 'Correspond à',
	SMW_SP_SERVICE_LINK => 'Fournit le service',
	SMW_SP_POSSIBLE_VALUES => 'Possible values'	//TODO translate
);

	/**
	 * Function that returns the namespace identifiers.
	 */
	function getNamespaceArray() {
		return array(
			SMW_NS_RELATION       => "Relation",
			SMW_NS_RELATION_TALK  => "Discussion_relation",
			SMW_NS_ATTRIBUTE      => "Attribut",
			SMW_NS_ATTRIBUTE_TALK => "Discussion_attribut",
			SMW_NS_TYPE           => "Type",
			SMW_NS_TYPE_TALK      => "Discussion_type"
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