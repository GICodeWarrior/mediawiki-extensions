<?php
/**
 * @author Pierre Matringe
 */

global $smwgIP;
include_once($smwgIP . '/languages/SMW_Language.php');

class SMW_LanguageFr extends SMW_Language {

protected $m_DatatypeLabels = array(
	'_wpg' => 'Page', // name of page datatype
	'_str' => 'Chaîne de caractères',  // name of the string type
	'_txt' => 'Texte',  // name of the text type (very long strings)
	'_boo' => 'Booléen',  // name of the boolean type
	'_num' => 'Nombre', // name for the datatype of numbers
	'_geo' => 'Coordonnées géographiques', // name of the geocoord type
	'_tem' => 'Température',  // name of the temperature type
	'_dat' => 'Date',  // name of the datetime (calendar) type
	'_ema' => 'Adresse électronique',  // name of the email type
	'_uri' => 'URL',  // name of the URI type
	'_anu' => 'Annotation-URI'  // name of the annotation URI type (OWL annotation property)
);

protected $m_DatatypeAliases = array(
	'URI'                   => '_uri',
	'Nombre entier'         => '_num',
	'Nombre décimal'        => '_num',
	'Énumeration'           => '_str',
	// support English aliases:
	'Page'                  => '_wpg',
	'String'                => '_str',
	'Text'                  => '_txt',
	'Boolean'               => '_boo',
	'Number'                => '_num',
	'Geographic coordinate' => '_geo',
	'Temperature'           => '_tem',
	'Date'                  => '_dat',
	'Email'                 => '_ema',
	'Annotation URI'        => '_anu'
);

protected $m_SpecialProperties = array(
	//always start upper-case
	SMW_SP_HAS_TYPE  => 'A le type',
	SMW_SP_HAS_URI   => 'URI équivalente',
	SMW_SP_SUBPROPERTY_OF => 'Sous^-propriété de',
	SMW_SP_DISPLAY_UNITS => 'Unités de mesure',
	SMW_SP_IMPORTED_FROM => 'Importé de',
	SMW_SP_CONVERSION_FACTOR => 'Correspond à',
	SMW_SP_SERVICE_LINK => 'Fournit le service',
	SMW_SP_POSSIBLE_VALUE => 'Valeur possible'
);

protected $m_SpecialPropertyAliases = array(
	'Unité de mesure'   => SMW_SP_DISPLAY_UNITS,
	// support English aliases for special properties
	'Has type'          => SMW_SP_HAS_TYPE,
	'Equivalent URI'    => SMW_SP_HAS_URI,
	'Subproperty of'    => SMW_SP_SUBPROPERTY_OF,
	'Display units'     => SMW_SP_DISPLAY_UNITS,
	'Imported from'     => SMW_SP_IMPORTED_FROM,
	'Corresponds to'    => SMW_SP_CONVERSION_FACTOR,
	'Provides service'  => SMW_SP_SERVICE_LINK,
	'Allows value'      => SMW_SP_POSSIBLE_VALUE
);

protected $m_Namespaces = array(
	SMW_NS_RELATION       => "Relation",
	SMW_NS_RELATION_TALK  => "Discussion_relation",
	SMW_NS_PROPERTY       => "Attribut",
	SMW_NS_PROPERTY_TALK  => "Discussion_attribut",
	SMW_NS_TYPE           => "Type",
	SMW_NS_TYPE_TALK      => "Discussion_type"
);

protected $m_NamespaceAliases = array(
	// support English aliases for namespaces
	//'Relation'      => SMW_NS_RELATION,
	'Relation_talk' => SMW_NS_RELATION_TALK,
	'Property'      => SMW_NS_PROPERTY,
	'Property_talk' => SMW_NS_PROPERTY_TALK,
	'Type'          => SMW_NS_TYPE,
	'Type_talk'     => SMW_NS_TYPE_TALK
);

}


