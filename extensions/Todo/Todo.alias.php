<?php
/**
 * Aliases for special pages of Todo extension.
 *
 * @file
 */

$specialPageAliases = array();

/** English (English) */
$specialPageAliases['en'] = array(
	'Todo' => array( 'Todo' ),
);

/** Arabic (العربية) */
$specialPageAliases['ar'] = array(
	'Todo' => array( 'للعمل' ),
);

/** Breton (Brezhoneg) */
$specialPageAliases['br'] = array(
	'Todo' => array( 'DaOber' ),
);

/** French (Français) */
$specialPageAliases['fr'] = array(
	'Todo' => array( 'ÀFaire', 'À_faire' ),
);

/** Franco-Provençal (Arpetan) */
$specialPageAliases['frp'] = array(
	'Todo' => array( 'A_fâre', 'AFâre' ),
);

/** Haitian (Kreyòl ayisyen) */
$specialPageAliases['ht'] = array(
	'Todo' => array( 'PouFè' ),
);

/** Macedonian (Македонски) */
$specialPageAliases['mk'] = array(
	'Todo' => array( 'Задачи' ),
);

/** Malayalam (മലയാളം) */
$specialPageAliases['ml'] = array(
	'Todo' => array( 'ചെയ്യേണ്ടവ' ),
);

/** Nedersaksisch (Nedersaksisch) */
$specialPageAliases['nds-nl'] = array(
	'Todo' => array( 'Te_doon' ),
);

/** Dutch (Nederlands) */
$specialPageAliases['nl'] = array(
	'Todo' => array( 'TeDoen' ),
);

/** Polish (Polski) */
$specialPageAliases['pl'] = array(
	'Todo' => array( 'Do_zrobienia' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;