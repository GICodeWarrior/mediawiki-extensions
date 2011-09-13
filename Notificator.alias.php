<?php
/**
 * Aliases for special pages
 *
 * @file
 * @ingroup Extensions
 */

$specialPageAliases = array();

/** English (English) */
$specialPageAliases['en'] = array(
	'Notificator' => array( 'Notificator' ),
);

/** Arabic (العربية) */
$specialPageAliases['ar'] = array(
	'Notificator' => array( 'مخطر' ),
);

/** Franco-Provençal (Arpetan) */
$specialPageAliases['frp'] = array(
	'Notificator' => array( 'Notifior' ),
);

/** Macedonian (Македонски) */
$specialPageAliases['mk'] = array(
	'Notificator' => array( 'Известувач' ),
);

/** Nedersaksisch (Nedersaksisch) */
$specialPageAliases['nds-nl'] = array(
	'Notificator' => array( 'Melder' ),
);

/** Traditional Chinese (‪中文(繁體)‬) */
$specialPageAliases['zh-hant'] = array(
	'Notificator' => array( '通知者' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;