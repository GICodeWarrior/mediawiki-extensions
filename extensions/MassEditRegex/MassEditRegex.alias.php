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
	'MassEditRegex' => array( 'MassEditRegex' ),
);

/** Arabic (العربية) */
$specialPageAliases['ar'] = array(
	'MassEditRegex' => array( 'ريجيكس_التعديلات_الكمية' ),
);

/** Macedonian (Македонски) */
$specialPageAliases['mk'] = array(
	'MassEditRegex' => array( 'РегуларенИзразЗаМасовноУредување' ),
);

/** Nedersaksisch (Nedersaksisch) */
$specialPageAliases['nds-nl'] = array(
	'MassEditRegex' => array( 'Bulk_regex_bewarken' ),
);

/** Dutch (Nederlands) */
$specialPageAliases['nl'] = array(
	'MassEditRegex' => array( 'BulkRegexBewerken' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;