<?php
/**
 * Aliases for OpenStackManager special pages
 *
 * @file
 * @ingroup Extensions
 */

$specialPageAliases = array();

/** English (English) */
$specialPageAliases['en'] = array(
	'OpenStackManager' => array( 'OpenStackManager' ),
	'OpenStackManageInstance' => array( 'Manage Instance' ),
);

/** Arabic (العربية) */
$specialPageAliases['ar'] = array(
	'OpenStackManager' => array( 'مدير_ستاك_مفتوح' ),
	'OpenStackManageInstance' => array( 'التحكم_بها' ),
);

/** Macedonian (Македонски) */
$specialPageAliases['mk'] = array(
	'OpenStackManager' => array( 'РаководителСоOpenStack' ),
	'OpenStackManageInstance' => array( 'РаководиСоПримерок' ),
);

/** Nedersaksisch (Nedersaksisch) */
$specialPageAliases['nds-nl'] = array(
	'OpenStackManager' => array( 'Open_beuntbeheerder' ),
	'OpenStackManageInstance' => array( 'Instansie_beheren' ),
);

/** Dutch (Nederlands) */
$specialPageAliases['nl'] = array(
	'OpenStackManager' => array( 'OpenStackBeheren' ),
	'OpenStackManageInstance' => array( 'InstantieBeheren' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;