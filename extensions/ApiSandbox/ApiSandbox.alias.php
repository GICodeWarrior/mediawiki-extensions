<?php
/**
 * Aliases for Special:ApiSandbox
 *
 * @file
 * @ingroup Extensions
 */

$specialPageAliases = array();

/** English (English) */
$specialPageAliases['en'] = array(
	'ApiSandbox' => array( 'ApiSandbox' ),
);

/** Arabic (العربية) */
$specialPageAliases['ar'] = array(
	'ApiSandbox' => array( 'ساحة_تجربة_إيه_بي_آي' ),
);

/** Esperanto (Esperanto) */
$specialPageAliases['eo'] = array(
	'ApiSandbox' => array( 'Provejo_de_API' ),
);

/** Macedonian (Македонски) */
$specialPageAliases['mk'] = array(
	'ApiSandbox' => array( 'ApiПесочник' ),
);

/** Nedersaksisch (Nedersaksisch) */
$specialPageAliases['nds-nl'] = array(
	'ApiSandbox' => array( 'API-zaandbak' ),
);

/** Dutch (Nederlands) */
$specialPageAliases['nl'] = array(
	'ApiSandbox' => array( 'APIZandbak' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;