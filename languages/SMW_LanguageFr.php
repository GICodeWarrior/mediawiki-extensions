<?php
/**
 * @author Pierre Matringe
 */

global $smwgIP;
include_once($smwgIP . '/languages/SMW_Language.php');

class SMW_LanguageFr extends SMW_Language {

protected $smwContentMessages = array(
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
	'smw_unknown_importns' => 'Aucune fonction d\'import n\'est disponible pour l\'espace de nommage "$1".',
	'smw_nonright_importtype' => 'L\'élément "$1" ne peut être employé que pour des articles de l\'espace de nommage "$2".',
	'smw_wrong_importtype' => 'L\'élément "$1" ne peut être employé pour des articles de l\'espace de nommage domaine "$2".',
	'smw_no_importelement' => 'L\'élément "$1" n\'est pas disponible pour l\'importation.',
	/*Messages and strings for basic datatype processing*/
	'smw_decseparator' => ',',
	'smw_kiloseparator' => '.',
	'smw_unknowntype' => 'Le type de données "$1" non supporté a été retourné à l\'attribut.',
	'smw_noattribspecial' => 'La propriété spéciale "$1" n\'est pas un attribut (utilisez "::" au lieu de ":=").',
	'smw_notype' => 'Aucun type de donné n\'a été assigné à l\'attribut.',
	'smw_manytypes' => 'Plusieurs types de données ont été assignés à l\'attribut.',
	'smw_emptystring' => 'Les chaînes vides ne sont pas acceptées.',
	'smw_maxstring' => 'La chaîne de représentation $1 est trop grande pour ce site.',
	'smw_nopossiblevalues' => 'Les valeurs possibles pour cet attribut ne sont pas énumérées.',
	'smw_notinenum' => '"$1" ne fait pas partie des valeurs possibles ($2) pour cet attribut.',
	'smw_noboolean' => '"$1" n\'est pas reconnu comme une valeur boléenne (vrai/faux).',
	'smw_true_words' => 'v,oui',	// comma-separated synonyms for boolean TRUE besides 'true' and '1'
	'smw_false_words' => 'f,non',	// comma-separated synonyms for boolean FALSE besides 'false' and '0'
	'smw_nointeger' => '"$1" n\'est pas un nombre entier.',
	'smw_nofloat' => '"$1" n\'est pas un nombre à virgule flottante.',
	'smw_infinite' => 'Le nombre $1 est trop long.',
	'smw_infinite_unit' => 'La conversion dans l\'unité $1 est impossible : le nombre est trop long.',
	// Currently unused, floats silently store units.  'smw_unexpectedunit' => 'Cet attribut ne supporte aucune conversion d\'unité',
	'smw_unsupportedprefix' => 'Des préfixes ("$1") ne sont pas supportés actuellement',
	'smw_unsupportedunit' => 'La conversion de l\'unité "$1" n\'est pas supportée',
	/*Messages for geo coordinates parsing*/
	'smw_err_latitude' => 'Les indications sur la latitude (N, S) doivent être comprises entre 0 et 90. "$1" ne se trouve pas à l\'intérieur de ces limites !',
	'smw_err_longitude' => 'Les indications sur la longitude (E, O) doivent être comprises entre 0 et 180. "$1" ne se trouve pas à l\'intérieur de ces limites !',
	'smw_err_noDirection' => 'Quelque chose ne va pas avec l\'indication "$1".',
	'smw_err_parsingLatLong' => 'Quelque chose ne va pas avec l\'indication "$1". Quelque chose dans la forme "1°2′3.4′′O" ou au minimum y ressemblant est attendu !',
	'smw_err_wrongSyntax' => 'Quelque chose ne va pas avec l\'indication "$1". Quelque chose dans la forme "1°2′3.4′′ O, 5°6′7.8′ N" ou au minimum y ressemblant est attendu !',
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
	'smw_service_online_maps' => " Cartes&nbsp;géographiques|http://tools.wikimedia.de/~magnus/geo/geohack.php?language=fr&params=\$9_\$7_\$10_\$8\n Google&nbsp;maps|http://maps.google.com/maps?ll=\$11\$9,\$12\$10&spn=0.1,0.1&t=k\n Mapquest|http://www.mapquest.com/maps/map.adp?searchtype=address&formtype=latlong&latlongtype=degrees&latdeg=\$11\$1&latmin=\$3&latsec=\$5&longdeg=\$12\$2&longmin=\$4&longsec=\$6&zoom=6",
	/*Messages for datetime parsing */
	'smw_nodatetime' => 'La date "$1" n\'a pas été comprise. Le support des données calendaires est encore expérimental.'
);

protected $smwUserMessages = array(
	'smw_devel_warning' => 'Cette fonction est encore en développement et n\'est peut-être pas encore opérationnelle. Il est peut-être judicieux de faire une sauvegarde du contenu du wiki avant toute utilisation de cette fonction.',
	// Messages for article pages of types, relations, and attributes
	'smw_type_header' => 'Attributes of type “$1”', // TODO translate
	'smw_typearticlecount' => 'Showing $1 attributes using this type.', // TODO translate
	'smw_attribute_header' => 'Pages using the attribute “$1”', // TODO translate
	'smw_attributearticlecount' => '<p>Showing $1 pages using this attribute.</p>', // TODO translate
	'smw_relation_header' => 'Pages using the relation “$1”', // TODO translate
	'smw_relationarticlecount' => '<p>Showing $1 pages using this relation.</p>', // TODO translate
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
	// Messages for WantedRelations Special
	'wantedrelations' => 'Relations demandées',
	'smw_wanted_relations' => 'Les relations suivantes n\'ont pas encore de page d\'explication, mais elles sont déjà utilisées pour décrire d\'autrees pages',
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
	'smw_types_builtin' => 'Types intégrés',
	/*Messages for ExtendedStatistics Special*/
	'extendedstatistics' => 'Statistiques détaillées',
	'smw_extstats_general' => 'Statistiques globales',
	'smw_extstats_totalp' => 'Nombre total de pages :',
	'smw_extstats_totalv' => 'Nombre total de pages vues:',
	'smw_extstats_totalpe' => 'Nombre total d\'éditions :',
	'smw_extstats_totali' => 'Nombre total d\'images :',
	'smw_extstats_totalu' => 'Nombre total d\'utilisateurs :',
	'smw_extstats_totalr' => 'Nombre total de relations :',
	'smw_extstats_totalri' => 'Nombre total d\'instances de la relation :',
	'smw_extstats_totalra' => 'Nombre moyen d\'instances par relation :',
	'smw_extstats_totalpr' => 'Nombre total de pages sur des relations :',
	'smw_extstats_totala' => 'Nombre total d\'attributs :',
	'smw_extstats_totalai' => 'Nombre total d\instances de l\'attribt :',
	'smw_extstats_totalaa' => 'Nombre moyen d\instances par attribut :',
	/*Messages for Flawed Attributes Special --disabled--*/
	'flawedattributes' => 'Attributs défectueux',
	'smw_fattributes' => 'Les pages ci-dessous ont un attribut qui n\'est pas défini correctement. Le nombre d\'attributs incorrects est donné entre les parenthèses.',
	// Name of the URI Resolver Special (no content)
	'uriresolver' => 'Résolveur d\'URI',
	'smw_uri_doc' => '<p>Le résolveur d\'URI implémente la <a href="http://www.w3.org/2001/tag/issues.html#httpRange-14">Conclusion du TAG du W3C à propos du httpRange-14</a>. Il peut garde à ce que les humaines ne deviennent pas des sites web.',
	/*Messages for ask Special*/
	/*Messages for ask Special*/
	'ask' => 'Recherche sémantique',
	'smw_ask_docu' => '<p>Cherchez dans le wiki en entrant une requête intégrée dans le champ de recherche ci-dessous. Des informations plus complètes sont disponibles sur la <a href="$1">page d\'aide à la recherche sémantique</a>.</p>',
	'smw_ask_doculink' => 'Recherche sémantique',
	'smw_ask_sortby' => 'Trier par colonnes',
	'smw_ask_ascorder' => 'Croissant',
	'smw_ask_descorder' => 'Décroissant',
	'smw_ask_submit' => 'Trouver des résultats',
	// Messages for the search by property special
	'searchbyproperty' => 'Rechercher par attribut',
	'smw_sbv_docu' => '<p>Rechercher toutes les pages qui ont un attribut donné avec un certaine valeur.</p>',
	'smw_sbv_noproperty' => '<p>Veuillez entrer un attribut.</p>',
	'smw_sbv_novalue' => '<p>Veuillez entrer une valeur ou consulter toutes les valeurs des attributs pour $1.</p>',
	'smw_sbv_displayresult' => 'Liste de toutes les pages qui ont un attribut $1 avec la valeur $2.',
	'smw_sbv_property' => 'Attribut',
	'smw_sbv_value' => 'Valeur',
	'smw_sbv_submit' => 'Trouver des résultats',
	// Messages for the browsing system
	'browse' => 'Browse wiki', //TODO: translate
	'smw_browse_article' => 'Enter the name of the page to start browsing from.', //TODO: translate
	'smw_browse_go' => 'Go', //TODO: translate
	'smw_browse_more' => '&hellip;', //TODO: translate
	// Generic messages for result navigation in all kinds of search pages
	'smw_result_prev' => 'Précédent',
	'smw_result_next' => 'Suivant',
	'smw_result_results' => 'Résultats',
	'smw_result_noresults' => 'Désolé, aucun résultat.',
);

protected $smwDatatypeLabels = array(
	'smw_wikipage' => 'Page', // name of page datatype  //TODO translate
	'smw_string' => 'Chaîne de caractères',  // name of the string type
	'smw_text' => 'Text',  // name of the text type (very long strings) //TODO: translate
	'smw_enum' => 'Énumeration',  // name of the enum type
	'smw_bool' => 'Booléen',  // name of the boolean type
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

protected $smwSpecialProperties = array(
	//always start upper-case
	SMW_SP_HAS_TYPE  => 'A le type',
	SMW_SP_HAS_URI   => 'URI équivalente',
	SMW_SP_SUBPROPERTY_OF => 'Subproperty of', // TODO: translate
	SMW_SP_MAIN_DISPLAY_UNIT => 'Unité de mesure principale pour l\'affichage',
	SMW_SP_DISPLAY_UNIT => 'Unité de mesure',
	SMW_SP_IMPORTED_FROM => 'Importé de',
	SMW_SP_CONVERSION_FACTOR => 'Correspond à',
	SMW_SP_CONVERSION_FACTOR_SI => 'Correspond à SI', //TODO: check translation
	SMW_SP_SERVICE_LINK => 'Fournit le service',
	SMW_SP_POSSIBLE_VALUE => 'Valeur possible'
);

	/**
	 * Function that returns the namespace identifiers.
	 */
	public function getNamespaceArray() {
		return array(
			SMW_NS_RELATION       => "Relation",
			SMW_NS_RELATION_TALK  => "Discussion_relation",
			SMW_NS_PROPERTY       => "Attribut",
			SMW_NS_PROPERTY_TALK  => "Discussion_attribut",
			SMW_NS_TYPE           => "Type",
			SMW_NS_TYPE_TALK      => "Discussion_type"
		);
	}
}


