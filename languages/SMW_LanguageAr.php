<?php
/**
 * @author Mahmoud Zouari  mahmoudzouari@yahoo.fr http://www.cri.ensmp.fr
 * @author Meno25
 */

/**
 * Protect against register_globals vulnerabilities.
 * This line must be present before any global variable is referenced.
 */
if (!defined('MEDIAWIKI')) die();

global $smwgIP;
include_once($smwgIP . '/languages/SMW_Language.php');

class SMW_LanguageAr extends SMW_Language {

protected $m_DatatypeLabels = array(
	'_wpg' => 'الصفحة', // name of page datatype
	'_str' => 'سلسلة أحرف',  // name of the string type
	'_txt' => 'نص',  // name of the text type
	'_boo' => 'منطقي',  // name of the boolean type
	'_num' => 'عدد',  // name for the datatype of numbers
	'_geo' => 'الإحداثيات', // name of the geocoord type
	'_tem' => 'الحرارة',  // name of the temperature type
	'_dat' => 'التاريخ',  // name of the datetime (calendar) type
	'_ema' => 'البريد الإلكتروني',  // name of the email type
	'_uri' => 'عنوان الصفحة',  // name of the URL type
	'_anu' => 'التعليق علي معرف الموارد الموحد'  // name of the annotation URI type (OWL annotation property)
);

protected $m_DatatypeAliases = array(
	'URI'         => '_uri',
	'Float'       => '_num',
	'Integer'     => '_num',
	'Enumeration' => '_str'
);

protected $m_SpecialProperties = array(
	//always start upper-case
	SMW_SP_HAS_TYPE  => 'نوع لديه',
	SMW_SP_HAS_URI   => 'معرف الموارد الموحد معادلة',
	SMW_SP_SUBPROPERTY_OF => 'الخاصية الفرعية ل',
	SMW_SP_DISPLAY_UNITS => 'عرض الوحدات',
	SMW_SP_IMPORTED_FROM => 'المستوردة من',
	SMW_SP_CONVERSION_FACTOR => 'يقابل',
	SMW_SP_SERVICE_LINK => 'توفر الخدمة',
	SMW_SP_POSSIBLE_VALUE => 'تسمح القيمة'
);

protected $m_SpecialPropertyAliases = array(
	'عرض الوحدات' => SMW_SP_DISPLAY_UNITS
);

protected $m_Namespaces = array(
	SMW_NS_RELATION       => 'العلاقة',
	SMW_NS_RELATION_TALK  => 'فيما يتعلق الحديث',
	SMW_NS_PROPERTY       => 'الخاصية',
	SMW_NS_PROPERTY_TALK  => 'الحديث عن السمة',
	SMW_NS_TYPE           => 'النوع',
	SMW_NS_TYPE_TALK      => 'نوع الحديث'
);

}




