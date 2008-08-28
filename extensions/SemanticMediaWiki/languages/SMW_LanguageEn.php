<?php
/**
 * @file
 * @author Markus Krötzsch
 * @ingroup Language
 */

/*
 * Protect against register_globals vulnerabilities.
 * This line must be present before any global variable is referenced.
 */
if (!defined('MEDIAWIKI')) die();

global $smwgIP;
include_once($smwgIP . '/languages/SMW_Language.php');

class SMWLanguageEn extends SMWLanguage {

protected $m_DatatypeLabels = array(
	'_wpg' => 'Page', // name of page datatype
	'_str' => 'String',  // name of the string type
	'_txt' => 'Text',  // name of the text type
	'_cod' => 'Code',  // name of the (source) code type
	'_boo' => 'Boolean',  // name of the boolean type
	'_num' => 'Number',  // name for the datatype of numbers
	'_geo' => 'Geographic coordinate', // name of the geocoord type
	'_tem' => 'Temperature',  // name of the temperature type
	'_dat' => 'Date',  // name of the datetime (calendar) type
	'_ema' => 'Email',  // name of the email type
	'_uri' => 'URL',  // name of the URL type
	'_anu' => 'Annotation URI'  // name of the annotation URI type (OWL annotation property)
);

protected $m_DatatypeAliases = array(
	'URI'         => '_uri',
	'Float'       => '_num',
	'Integer'     => '_num',
	'Enumeration' => '_str'
);

protected $m_SpecialProperties = array(
	//always start upper-case
	SMW_SP_HAS_TYPE  => 'Has type',
	SMW_SP_HAS_URI   => 'Equivalent URI',
	SMW_SP_SUBPROPERTY_OF => 'Subproperty of',
	SMW_SP_DISPLAY_UNITS => 'Display units',
	SMW_SP_IMPORTED_FROM => 'Imported from',
	SMW_SP_CONVERSION_FACTOR => 'Corresponds to',
	SMW_SP_SERVICE_LINK => 'Provides service',
	SMW_SP_POSSIBLE_VALUE => 'Allows value'
);

protected $m_SpecialPropertyAliases = array(
	'Display unit' => SMW_SP_DISPLAY_UNITS
);

protected $m_Namespaces = array(
	SMW_NS_RELATION       => 'Relation',
	SMW_NS_RELATION_TALK  => 'Relation_talk',
	SMW_NS_PROPERTY       => 'Property',
	SMW_NS_PROPERTY_TALK  => 'Property_talk',
	SMW_NS_TYPE           => 'Type',
	SMW_NS_TYPE_TALK      => 'Type_talk',
	SMW_NS_CONCEPT        => 'Concept',
	SMW_NS_CONCEPT_TALK   => 'Concept_talk'
);

}


